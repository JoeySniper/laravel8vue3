<template>
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

        <div class="row row-sm">
					<div class="col-sm-6 col-lg-6 col-xl-3">
						<div class="card">
							<div class="card-body">
								<div class="row">
									<div class="col">
										<div class="">App Views</div>
										<div class="h3 mt-2 mb-2"><b>19.89K</b><span class="text-success tx-13 ms-2">(+25%)</span></div>
									</div>
									<div class="col-auto align-self-center ">
										<div class="feature mt-0 mb-0">
											<i class="fe fe-eye project bg-primary-transparent text-primary "></i>
										</div>
									</div>
								</div>
								<div class="">
									<p class="mb-1">Overview of Last month</p>
									<div class="progress progress-sm h-1 mb-1">
										<div class="progress-bar bg-primary wd-80 " role="progressbar"></div>
									</div>
									<small class="mb-0 text-muted">Monthly<span class="float-end text-muted">60%</span></small>
								</div>
							</div>
						</div>
					</div>
					<div class="col-sm-6 col-lg-6 col-xl-3">
						<div class="card">
							<div class="card-body">
								<div class="row">
									<div class="col">
										<div class="">New Users</div>
										<div class="h3 mt-2 mb-2"><b>692</b><span class="text-success tx-13 ms-2">(+15%)</span></div>
									</div>
									<div class="col-auto align-self-center ">
										<div class="feature mt-0 mb-0">
											<i class="fe fe-users project bg-pink-transparent text-pink "></i>
										</div>
									</div>
								</div>
								<div class="">
									<p class="mb-1">Overview of Last month</p>
									<div class="progress progress-sm h-1 mb-1">
										<div class="progress-bar bg-secondary wd-50 " role="progressbar"></div>
									</div>
									<small class="mb-0 text-muted">Monthly<span class="float-end text-muted">50%</span></small>
								</div>
							</div>
						</div>
					</div>
					<div class="col-sm-6 col-lg-6 col-xl-3">
						<div class="card">
							<div class="card-body">
								<div class="row">
									<div class="col">
										<div class="">Churned Users</div>
										<div class="h3 mt-2 mb-2"><b>286</b><span class="text-success tx-13 ms-2">(+08%)</span></div>
									</div>
									<div class="col-auto align-self-center ">
										<div class="feature mt-0 mb-0">
											<i class="ti-pulse project bg-warning-transparent text-warning "></i>
										</div>
									</div>
								</div>
								<div class="">
									<p class="mb-1">Overview of Last month</p>
									<div class="progress progress-sm h-1 mb-1">
										<div class="progress-bar bg-danger wd-30 " role="progressbar"></div>
									</div>
									<small class="mb-0 text-muted">Monthly<span class="float-end text-muted">30%</span></small>
								</div>
							</div>
						</div>
					</div>
					<div class="col-sm-6 col-lg-6 col-xl-3">
						<div class="card">
							<div class="card-body">
								<div class="row">
									<div class="col">
										<div class="">Total Revenue</div>
										<div class="h3 mt-2 mb-2"><b>$2.98M</b><span class="text-success tx-13 ms-2">(+35%)</span></div>
									</div>
									<div class="col-auto align-self-center ">
										<div class="feature mt-0 mb-0">
											<i class="ti-bar-chart-alt project bg-success-transparent text-success "></i>
										</div>
									</div>
								</div>
								<div class="">
									<p class="mb-1">Overview of Last month</p>
									<div class="progress progress-sm h-1 mb-1">
										<div class="progress-bar bg-success wd-25 " role="progressbar"></div>
									</div>
									<small class="mb-0 text-muted">Monthly<span class="float-end text-muted">25%</span></small>
								</div>
							</div>
						</div>
					</div>
				</div>

            <div class="row row-sm">
                <div class="col-xl-12">
						<div class="card">
							<div class="card-header pb-0">
								<div class="d-flex justify-content-between">
									<h4 class="card-title mg-b-0">STRIPED ROWS</h4>
                                    <span>
                                        <button class="btn btn-primary-gradient " @click="add_store()" v-if="!FormShow">????????????????????????</button>
                                        <button class="btn btn-success-gradient me-2" @click="add_product()" v-if="FormShow">??????????????????</button>
                                        <button class="btn btn-danger-gradient " @click="close_form()" v-if="FormShow">?????????????????????</button>
                                    </span>

									<!-- <i class="mdi mdi-dots-horizontal text-gray"></i> -->
								</div>
								<p class="tx-12 tx-gray-500 mb-2">Example of Valex Striped Rows.. <a href="">Learn
										more</a></p>
							</div>
							<div class="card-body">
                                <div class="row">
                                    <div class="col-md-6"></div>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" v-model="SearchProduct" @keyup.enter="GetAllStore()" id="product-name" placeholder="??????????????????...">

                                    </div>
                                </div>

                                <!-- FormShow : {{ FormShow}} <hr>
                                FormProduct:  {{ FormProduct}} <hr>
                                Data : {{ FormData}} -->
                                <div class="form-store row" v-if="FormShow">
                                    <div class="col-md-3">
                                        <img :src="imagePreview" class="mb-1" style="width:100%">
                                        <input type="file" class="form-control" @change="onSelected">
                                    </div>
                                    <div class="col-md-9">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="product-name">???????????????????????????</label>
                                                    <input type="text" class="form-control" v-model="FormProduct.name" id="product-name" placeholder="???????????????????????????????????????...">
                                                </div>

                                                <div class="form-group">
                                                    <label for="product-count">???????????????</label>
                                                    <cleave :options="options" class="form-control" v-model="FormProduct.amount" id="product-count" placeholder="?????????????????????????????????..."/>

                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="product-buy">?????????????????????</label>
                                                    <cleave :options="options" class="form-control" v-model="FormProduct.price_buy" id="product-buy" placeholder="?????????????????????..."/>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="product-sell">?????????????????????</label>
                                                    <cleave :options="options" class="form-control" v-model="FormProduct.price_sell" id="product-sell" placeholder="?????????????????????..."/>
                                                </div>
                                            </div>

                                        </div>

                                    </div>

                                </div>
                                <!-- <button class="btn btn-info btn-icon" @click="showalert()"><i class="fa fa-edit"></i></button> -->
								<div class="table-responsive" v-if="!FormShow">
									<table class="table table-striped mg-b-0 text-md-nowrap">
										<thead>
											<tr>
												<th width="30">#</th>
												<th>???????????????????????????</th>
												<th width="80">???????????????</th>
												<th  width="100">?????????????????????</th>
                                                <th  width="120">??????????????????</th>

											</tr>
										</thead>
										<tbody>
											<tr v-for="list in FormData.data" :key="list.id">
												<th scope="row">{{ list.id }}</th>
												<td>{{ list.name }}</td>
												<td>{{formatPrice(list.amount)}}</td>
												<td>{{formatPrice(list.price_buy)}}</td>

                                                <td class="btn-icon-list text-center">
                                                    <button class="btn btn-info btn-icon" @click="edit_product(list.id)"><i class="fa fa-edit"></i></button>
                                                    <button class="btn btn-danger btn-icon"  @click="del_product(list.id)"><i class="far fa-trash-alt"></i></button>
                                                </td>

											</tr>

										</tbody>
									</table>
                                    <pagination :pagination="FormData" @paginate="GetAllStore($event)" :offset="4"></pagination>

								</div><!-- bd -->
							</div><!-- bd -->
						</div><!-- bd -->
					</div>
            </div>
    </div>
</template>

<script>
export default {
    name: 'Laravel9vue3Store',

    data() {
        return {
            imagePreview:window.location.origin+'/assets/img/add_image.png',
            imageProduct:'',
            SearchProduct:'',
            FormShow:false,
            FormType:true,
            FormID:'',
            FormData:[] ,
            FormProduct: {
                name:'',
                amount:'',
                price_buy:'',
                price_sell:''
            },
            options: {
                //prefix: '$',
				numeral: true,
				numeralPositiveOnly: true,
				noImmediatePrefix: true,
				rawValueTrimPrefix: true,
				numeralIntegerScale: 10,
				numeralDecimalScale: 2,
				numeralDecimalMark: '.',
				delimiter: ','

            }
        };
    },

    mounted() {

    },
    watch:{
        SearchProduct(){
            if(this.SearchProduct == ''){
                this.GetAllStore();
            }
        }
    },
    methods: {
        onSelected(event){
            this.imageProduct = event.target.files[0];
            let reader = new FileReader();
            reader.readAsDataURL(this.imageProduct);
            reader.addEventListener("load", function(){
                this.imagePreview = reader.result;
            }.bind(this), false)
        },

        add_store(){
            this.FormShow = true
            this.imagePreview = window.location.origin+'/assets/img/add_image.png'
            this.FormProduct.name = '';
            this.FormProduct.amount = '';
            this.FormProduct.price_buy = '';
            this.FormProduct.price_sell = '';
            this.imageProduct = '';

        },

        close_form(){
            this.FormShow = false
        },

        add_product(){

            if(this.FormType == true){
                // ?????????????????????????????????????????????

                // this.FormData.push({
                // id: Math.floor(Math.random() * 1000),
                // name: this.FormProduct.name,
                // amount: this.FormProduct.amount,
                // price_buy: this.FormProduct.price_buy,
                // price_sell: this.FormProduct.price_sell
                // });

                    let formData = new FormData();
                    formData.append('name', this.FormProduct.name);
                    formData.append('amount', this.FormProduct.amount);
                    formData.append('price_buy', this.FormProduct.price_buy);
                    formData.append('price_sell', this.FormProduct.price_sell);
                    formData.append('file', this.imageProduct);
                    formData.append('acc_type', 'expense');

                    this.$axios.get("/sanctum/csrf-cookie").then((response)=>{
                        this.$axios.post("/api/store/add", formData, {headers:{"Content-Type": "multipart/form-data"}})
                        .then((response)=>{
                            if(response.data.success){
                                this.GetAllStore();
                                console.log('??????????????????????????????????????????????????????');
                            }else{
                                console.log(response.data.message);
                            }
                        })
                        .catch((error)=>{
                            console.log(error);
                        });
                    })
                console.log('Add new');

            }else{
                // ????????????????????????????????????
                console.log('Update success');

                // this.FormData.find((i)=>i.id == this.FormID).name = this.FormProduct.name;
                // this.FormData.find((i)=>i.id == this.FormID).amount = this.FormProduct.amount;
                // this.FormData.find((i)=>i.id == this.FormID).price_buy = this.FormProduct.price_buy;
                // this.FormData.find((i)=>i.id == this.FormID).price_sell = this.FormProduct.price_sell;



                    let formData = new FormData();
                    formData.append('name', this.FormProduct.name);
                    formData.append('amount', this.FormProduct.amount);
                    formData.append('price_buy', this.FormProduct.price_buy);
                    formData.append('price_sell', this.FormProduct.price_sell);
                    formData.append('file', this.imageProduct);
                    // console.log(this.FormID);
                    let idupdate = this.FormID;
                this.$axios.get("/sanctum/csrf-cookie").then((response)=>{
                    this.$axios.post(`/api/store/update/${idupdate}`, formData, {headers:{"Content-Type": "multipart/form-data"}})
                    .then((response)=>{
                       if(response.data.success){
                        this.GetAllStore();
                       }
                    }).catch((error)=>{
                        console.log(error);
                    });
                });

                this.FormType = true;
            }

            this.FormProduct.name = '';
            this.FormProduct.amount = '';
            this.FormProduct.price_buy = '';
            this.FormProduct.price_sell = '';
            this.imageProduct = '';
            this.imagePreview = '';
            this.FormID = '';
            this.FormShow = false;
        },

        edit_product(id){
            console.log("id :"+id);

            // let item = this.FormData.data.find( (i)=>i.id == id); //??????????????????????????????????????????????????????????????????????????? item
            this.FormShow = true; // ??????????????? form
            this.FormType = false;  // ?????????????????????????????????????????????????????????
            this.FormID = id;
            // this.FormProduct.name = item.name;
            // this.FormProduct.amount = item.amount;
            // this.FormProduct.price_buy = item.price_buy;
            // this.FormProduct.price_sell = item.price_sell;

             this.$axios.get("/sanctum/csrf-cookie").then((response)=>{
                this.$axios.get(`/api/store/edit/${id}`)
                .then((respone)=>{
                    this.FormProduct.name = respone.data.name;
                    this.FormProduct.amount = respone.data.amount;
                    this.FormProduct.price_buy = respone.data.price_buy;
                    this.FormProduct.price_sell = respone.data.price_sell;

                    this.imageProduct = respone.data.images

                    if(respone.data.images){
                        this.imagePreview = window.location.origin +"/assets/img/"+respone.data.images;
                    }else{
                        this.imagePreview = window.location.origin +"/assets/img/add_image.png";
                    }


                }).catch((error)=>{
                    console.log(error);
                });
             });
        },


        del_product(id){
            this.$swal.fire({
            title: '?????????????????????????????????????',
            text: "???????????????????????????????????????????????????!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: '????????????????????????????????????',
            cancelButtonText: '?????????????????????'
            }).then((result) => {
            if (result.isConfirmed) {

                //  console.log("id :"+id);

                // let index = this.FormData.map((i)=>i.id).indexOf(id);
                // this.FormData.splice(index,1);

                this.$axios.get("/sanctum/csrf-cookie").then((response)=>{
                this.$axios.post(`/api/store/delete/${id}`)
                .then((respone)=>{

                    this.GetAllStore();
                }).catch((error)=>{
                    console.log(error);
                });
             });



                this.$swal.fire('??????????????????!','??????????????????????????????????????????????????????????????????','success');
            }
            });
        },
        formatPrice(value) {
			let val = (value / 1).toFixed(0).replace(",", ".");
			return val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
		},

        GetAllStore(page){
            this.$axios.get("/sanctum/csrf-cookie").then((respone)=>{
                this.$axios.get(`api/store?page=${page}&s=${this.SearchProduct}`).then((respone)=>{
                    this.FormData = respone.data;
                }).catch((error) => {
                    console.log(error);
                });
            });

        }
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

<style lang="scss" scoped>

</style>
