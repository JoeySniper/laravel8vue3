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
				<div class="card mg-b-20">
								<div class="card-header pb-0">
									<div class="d-flex justify-content-between">
										<h4 class="card-title mg-b-0">Bordered Table</h4>
										<i class="mdi mdi-dots-horizontal text-gray"></i>
									</div>
									<p class="tx-12 tx-gray-500 mb-2">Example of Valex Bordered Table.. <a href="">Learn
											more</a></p>
								</div>
                                        <div class="row pd-b-10 justify-content-end">
                                            <div class="btn-group me-2" role="group" aria-label="Basic example" style="width:180px;">
                                                <button type="button" class="btn btn-secondary" @click="monthtype = 'm'"> <i class="mdi mdi-menu-right" v-if="monthtype == 'm'"></i> ເດືອນ</button>
                                                <button type="button" class="btn btn-secondary" @click="monthtype = 'y'"> <i class="mdi mdi-menu-right" v-if="monthtype == 'y'"></i> ປີ</button>
                                            </div>
                                            <input type="date" style="width: 180px;" v-model="dmy" class="form-control me-2">
                                            <button class="btn btn-success text-white me-2" @click="createReport()"  style="width:180px;">
                                                <i class="mdi mdi-view-list"></i> ສະແດງລາຍງານ
                                            </button>
                                        </div>


								<div class="card-body">
									Boby
								</div>



							</div>
			</div>
        <div class="col-md-4">
            <div class="row">
            <div class="col-12">
						<div class="card bg-primary-gradient text-white ">
							<div class="card-body">
								<div class="row">
									<div class="col-6">
										<div class="icon1 mt-2 text-center">
											<i class="fe fe-users tx-40"></i>
										</div>
									</div>
									<div class="col-6">
										<div class="mt-0 text-center">
											<span class="text-white">Members</span>
											<h2 class="text-white mb-0">600</h2>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
                    <div class="col-12">
						<div class="card bg-danger-gradient text-white">
							<div class="card-body">
								<div class="row">
									<div class="col-6">
										<div class="icon1 mt-2 text-center">
											<i class="fe fe-shopping-cart tx-40"></i>
										</div>
									</div>
									<div class="col-6">
										<div class="mt-0 text-center">
											<span class="text-white">Sales</span>
											<h2 class="text-white mb-0">854</h2>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
                    <div class="col-12">
						<div class="card bg-success-gradient text-white">
							<div class="card-body">
								<div class="row">
									<div class="col-6">
										<div class="icon1 mt-2 text-center">
											<i class="fe fe-bar-chart-2 tx-40"></i>
										</div>
									</div>
									<div class="col-6">
										<div class="mt-0 text-center">
											<span class="text-white">Profits</span>
											<h2 class="text-white mb-0">98K</h2>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
                </div>
        </div>
    </div>
    </div>
</template>

<script>
export default {
    name: 'Laravel9vue3Report',

    data() {
        return {
            monthtype:'m',
			dmy:'',
            data_income:[],
            data_expense:[],


        };
    },

    mounted() {

    },

    methods: {
        createReport(){
            this.$axios.get("/sanctum/csrf-cookie").then((response) => {

					this.$axios.post("/api/report", {
					monthtype: this.monthtype,
					dmy: this.dmy,
					})
					.then((response) => {
						//console.log(response.data)
						this.data_income = response.data.income;
						this.data_expense = response.data.expense;
						// this.GenGrap();
					})
					.catch((error) => {
						this.loading = false;
					});
            });

        }

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
