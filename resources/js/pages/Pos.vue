<template>
    <div>
        <div>
			<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="left-content">
						<div>
						  <h2 class="main-content-title tx-24 mg-b-1 mg-b-lg-1">Hi, welcome back!</h2>
						  <p class="mg-b-0">Sales monitoring dashboard template.</p>
						</div>
					</div>



					<div class="main-dashboard-header-right">
						<div>
							<label class="tx-13">Customer Ratings</label>
							<div class="main-star">
								<i class="typcn typcn-star active"></i> <i class="typcn typcn-star active"></i> <i class="typcn typcn-star active"></i> <i class="typcn typcn-star active"></i> <i class="typcn typcn-star"></i> <span>(14,873)</span>
							</div>
						</div>
						<div>
							<label class="tx-13">Online Sales</label>
							<h5>563,275</h5>
						</div>
						<div>
							<label class="tx-13">Offline Sales</label>
							<h5>783,675</h5>
						</div>
					</div>
				</div>
			<!-- breadcrumb -->

		</div>
        <div class="row row-sm">
                <div class="col-md-8">
                    <div class="card">
                            <div class="card-body">

											<input type="text" v-model="SearchProduct" @keyup.enter="GetAllStore()" class="form-control" id="inputName" placeholder="ຄົ້ນຫາ....." >

                            </div>
                        </div>
                        <!-- {{ DataProduct}} -->
                        <div class="row">
                            <div class="col-md-3" v-for="list in DataProduct.data" :key="list.id">
                                    <div class="card cursor-pointer" @click="AddToOrder(list.id)">
                                        <span v-for="listorder in ListOrder" :key="listorder.id">
                                            <div class="box-order" v-if="listorder.id == list.id">{{listorder.order_amount}}</div>
                                        </span>
                                        <img v-if="list.images" class="card-img-top" :src="urlLocation+'/assets/img/'+list.images" alt="Card image cap" style="width:100%; height: 140px; object-fit: cover; object-position: center;">
                                        <img v-if="!list.images" class="card-img-top" :src="urlLocation+'/assets/img/no_image.png'" alt="Card image cap" style="width:100%; height: 140px; object-fit: cover; object-position: center;">
                                        <div class="card-body text-center">
                                            <p class="card-text">{{list.name}}</p>
                                            <p class="card-text text-info">{{formatPrice(list.price_sell)}} ກີບ</p>
                                        </div>
                                    </div>
                            </div>


                        </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                    <div class="card-body">
                        <h4 class="card-title text-info d-flex justify-content-between">
                            <span><strong> ລວມຍອດເງິນ: </strong></span>
                            <span><strong>{{formatPrice(totalAmount)}} ກີບ</strong></span>
                        </h4>
                        <button
                            type="button"
                            class="btn btn-success text-white mb-2"
                            style="width: 100%"
                            :disabled="checkPay"
                            @click="BtPay"
                        >
                            <i class="mdi mdi-currency-usd"></i> ຊຳລະເງິນ
                        </button>
                        <div
                            class="table-responsive"
                            style="height: 65vh; overflow: auto"
                        >
                        <!-- {{ListOrder}} -->
                            <table class="table color-table muted-table border">
                                <thead>
                                    <tr>
                                        <th>ລາຍການ</th>
                                        <th width="120" class="text-center">
                                            ລາຄາ
                                        </th>
                                        <th width="130" class="text-end">
                                            ຍອດລວມ (<i @click="DelAllList()" class="fa fa-times-circle text-danger cursor-pointer"/>)
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="item in ListOrder" :key="item.id">
                                        <td>{{item.name}}</td>
                                        <td>{{formatPrice(item.price_sell)}} <br> <i @click="DelOne(item.id)" class="fa fa-minus-circle text-info cursor-pointer"/> {{formatPrice(item.order_amount)}} <i @click="AddOne(item.id)" class="fa fa-plus-circle text-info cursor-pointer"/> | <i @click="DelOneList(item.id)" class="fa fa-times-circle text-danger cursor-pointer"/></td>
                                        <td>{{formatPrice(item.price_sell * item.order_amount)}}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                </div>

        </div>

                                <div id="Modal_Pay" class="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="myModalLabel">ຊຳລະສິນຄ້າ</h4>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                                            </div>
                                             <div class="modal-body">
                                               <h4 class="card-title text-info d-flex justify-content-between">  <span> <strong> ລວມຍອດເງິນ: </strong></span> <span><strong>{{formatPrice(totalAmount)}} ກີບ</strong></span>  </h4>
                                               <h4 class="card-title text-info d-flex justify-content-between">  <span> <strong> ຮັບເງິນນຳລູກຄ້າ: </strong></span> <span><strong>{{formatPrice(CashAmount)}} ກີບ</strong></span>  </h4>
                                               <h4 class="card-title text-danger d-flex justify-content-between" v-if="CashBack>0">  <span> <strong> ເງິນທອນ: </strong></span> <span><strong>{{formatPrice(CashBack)}} ກີບ</strong></span>  </h4>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" v-model="CashAmount" style="text-align:right;" >
                                                    </div>
                                                 <div class="p-2 justify-content-center d-flex">
                                                        <div class="row" style="width:250px">
                                                        <div class="col-4 text-center  mt-2">
                                                            <a  class="btn btn-primary btn-lg text-white" @click="AddNum(1)" style="width:60px">1</a>
                                                        </div>
                                                        <div class="col-4 text-center mt-2">
                                                            <a class="btn btn-primary btn-lg text-white" @click="AddNum(2)" style="width:60px">2</a>
                                                        </div>
                                                        <div class="col-4 text-center mt-2">
                                                            <a class="btn btn-primary btn-lg text-white" @click="AddNum(3)" style="width:60px">3</a>
                                                        </div>
                                                        <div class="col-4 text-center mt-2">
                                                            <a class="btn btn-primary btn-lg text-white" @click="AddNum(4)" style="width:60px">4</a>
                                                        </div>
                                                        <div class="col-4 text-center mt-2">
                                                            <a class="btn btn-primary btn-lg text-white" @click="AddNum(5)" style="width:60px">5</a>
                                                        </div>
                                                        <div class="col-4 text-center mt-2">
                                                            <button type="button" class="btn btn-primary btn-lg text-white" @click="AddNum(6)" style="width:60px">6</button>
                                                        </div>
                                                        <div class="col-4 text-center mt-2">
                                                            <a class="btn btn-primary btn-lg text-white" @click="AddNum(7)" style="width:60px">7</a>
                                                        </div>
                                                        <div class="col-4 text-center mt-2">
                                                            <a class="btn btn-primary btn-lg text-white" @click="AddNum(8)" style="width:60px">8</a>
                                                        </div>
                                                        <div class="col-4 text-center mt-2">
                                                            <a class="btn btn-primary btn-lg text-white" @click="AddNum(9)" style="width:60px">9</a>
                                                        </div>
                                                        <div class="col-4 text-center mt-2">
                                                            <a class="btn btn-primary btn-lg text-white" @click="AddNum('00')" style="width:60px">00</a>
                                                        </div>
                                                        <div class="col-4 text-center mt-2">
                                                            <a class="btn btn-primary btn-lg text-white" @click="AddNum(0)" style="width:60px">0</a>
                                                        </div>
                                                        <div class="col-4 text-center mt-2">
                                                            <a  class="btn btn-danger btn-lg text-white" @click="AddNum('-')" style="width:60px"><i class="fas fa-long-arrow-alt-left"></i></a>
                                                        </div>
                                                        </div>
                                                    </div>
                                                    <div class="row justify-content-center d-flex mt-2 text-center">
                                                        <button type="button" class="btn btn-success" @click="ConfirmPay()"  style="width:180px;" :disabled="CheckCPay"><i class="fas fa-coins"></i> ຍືນຍັນຊຳລ່ະເງິນ </button>
                                                    </div>

                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-info waves-effect text-white" data-bs-dismiss="modal">ປິດ</button>
                                            </div>
                                        </div>
                                        <!-- /.modal-content -->
                                    </div>
                                    <!-- /.modal-dialog -->
                                </div>
    </div>
</template>

<script>
export default {
    name: 'Laravel9vue3Pos',

    data() {
        return {
            DataProduct:[],
            SearchProduct:'',
            urlLocation: window.location.origin,
            ListOrder:[],
            CashAmount:'',
            CashBack:'',




        };
    },

    mounted() {

    },
    watch:{// ຕິດຕາມການເຮັດວຽກ
        SearchProduct(){
            if(this.SearchProduct == ''){
                this.GetAllStore();
            }
        },


    },
    computed:{ // ການຄຳນວນ
        totalAmount(){
            return   this.ListOrder.reduce((num, item)=> num + item.price_sell * item.order_amount, 0);
        },

        checkPay(){
            if(this.totalAmount>0){
                return false;
            }else{
                return true;
            }
        },

        CashBack(){
           return parseInt(this.CashAmount) - parseInt(this.totalAmount)
        },
        CheckCPay(){
            if(parseInt(this.CashAmount) - parseInt(this.totalAmount) >=0){
                return false;
            }else{
                return true;
            }
        }
    },
    methods: {

        ConfirmPay(){
            this.$axios.get("/sanctum/csrf-cookie").then((response) => {

                this.$axios.post("/api/transection/add",{
                    acc_type:'income',
                    listorder: this.ListOrder
                })
                .then((response) => {
                    if (response.data.success) {
                        $('#Modal_Pay').modal('hide');
                        this.ListOrder = [];
                        this.CashAmount = '';
                        this.GetAllStore();
                    } else {
                        console.log(response.data.message);
                    }
                    })
                    .catch((error) => {
                    console.log(error);
                    });

            });
        },

        AddNum(num){
            // console.log(num);
            if(num == "-"){
                this.CashAmount = this.CashAmount.slice(0,-1)
            }else{
                this.CashAmount = this.CashAmount+num
            }

        },
        BtPay(){
            $('#Modal_Pay').modal('show');
        },

        AddOne(id){
            let item = this.DataProduct.data.find((i)=>i.id == id);


            if(this.ListOrder.find((i)=>i.id == id)){

                let old_order_amount = this.ListOrder.find((i)=>i.id == id).order_amount;

                if(item.amount-old_order_amount > 0){
                    this.ListOrder.find((i)=>i.id ==id).order_amount = old_order_amount+1;
                }else{
                    // alert('ສິນຄ້າໝົດ!');

                    this.$swal.fire({
                        icon: 'error',
                        title: 'ສິນຄ້າໝົດ!',
                        })
                }
            }

        },
        DelOne(id){
            if(this.ListOrder.find((i)=>i.id == id)){
                 let old_order_amount = this.ListOrder.find((i)=>i.id == id).order_amount;

                 if(old_order_amount-1 > 0){
                    this.ListOrder.find((i)=>i.id == id).order_amount = old_order_amount-1;
                 }else{
                    this.ListOrder.splice(this.ListOrder.map(i=>i.id).indexOf(id),1);
                 }
            }
        },
        DelOneList(id){
            this.ListOrder.splice(this.ListOrder.map(i=>i.id).indexOf(id),1);
        },
        DelAllList(){
            this.ListOrder = [];
        },
        AddToOrder(id){
            let item = this.DataProduct.data.find((i)=>i.id == id);
            let old_order_amount = this.ListOrder.find((i)=>i.id == id);

            if(this.ListOrder.find((i)=>i.id == id)){


                if(item.amount-old_order_amount.order_amount > 0){
                    // this.ListOrder.find((i)=>i.id ==id).order_amount = old_order_amount+1;
                     this.ListOrder.find((i)=>i.id == id).order_amount++;
                }else{
                    // alert('ສິນຄ້າໝົດ!');

                    this.$swal.fire({
                        icon: 'error',
                        title: 'ສິນຄ້າໝົດ!',
                        })
                }

            }else{
                this.ListOrder.push({
                    id: item.id,
                    name: item.name,
                    price_sell: item.price_sell,
                    order_amount: 1
                })
            }


        },
        GetAllStore(page){
            this.$axios.get("/sanctum/csrf-cookie").then((respone)=>{
                this.$axios.get(`api/store?page=${page}&s=${this.SearchProduct}`).then((respone)=>{
                    this.DataProduct = respone.data;
                }).catch((error) => {
                    console.log(error);
                });
            });

        },
        formatPrice(value) {
			let val = (value / 1).toFixed(0).replace(",", ".");
			return val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
		},

    },
    created(){
        this.GetAllStore();
    },
    beforeRouteEnter(to, from, next) {
            //window.Laravel.urlpath = to.name
        if (!window.Laravel.isLoggedin) {
        window.location.href = "/login";
        }
        next();
    },
};
</script>

<style>
.box-order{
        position: absolute;
        right: 0px;
        background-color: crimson;
        color: white;
        padding: 5px;
        font-weight: bold;
        border-bottom-left-radius: 10px;
}

</style>
