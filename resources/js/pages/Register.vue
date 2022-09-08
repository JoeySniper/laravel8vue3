<template>
    <div>
        <div class="row no-gutter justify-content-center">

					<div class="col-md-6 col-lg-6 col-xl-5 bg-white">
						<div class="login d-flex align-items-center py-2">
							<!-- Demo content-->
							<div class="container p-0">
								<div class="row">
									<div class="col-md-10 col-lg-10 col-xl-9 mx-auto">
										<div class="card-sigin">
											<div class="mb-5 d-flex">
												<a href="index.html"><img src="assets/img/brand/favicon.png" class="sign-favicon-a ht-40" alt="logo">
												<img src="assets/img/brand/favicon-white.png" class="sign-favicon-b ht-40" alt="logo">
												</a>
												<h1 class="main-logo1 ms-1 me-0 my-auto tx-28">Va<span>le</span>x</h1>
											</div>
											<div class="main-signup-header">
												<h2 class="text-primary">Get Started</h2>
												<div class="alert alert-solid-warning" role="alert" v-if="showError">
                                                    <button aria-label="Close" class="close" data-bs-dismiss="alert" type="button">
                                                    <span aria-hidden="true">&times;</span></button>
                                                    <strong>X</strong> {{ textError }}.
                                                </div>
												
													<div class="form-group">
														<label>ຊື່ຜູ້ໃຊ້</label> <input class="form-control" placeholder="" type="text" v-model="name">
													</div>
													<div class="form-group">
														<label>ອີເມວ</label> <input class="form-control" placeholder="" type="text" v-model="email">
													</div>
													<div class="form-group">
														<label>ລະຫັດຜ່ານ</label> <input class="form-control" placeholder="" type="password" v-model="password">
													</div>
                                                    <div class="form-group">
														<label>ຢືນຢັນລະຫັດຜ່ານ</label> <input class="form-control" placeholder="" type="password" v-model="password2">
													</div>
                                                    <button class="btn btn-main-primary btn-block" @click="Register()">ລົງທະບຽນ</button>

												
												<div class="main-signup-footer mt-5">
													<p>Already have an account? <a href="signin.html">Sign In</a></p>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div><!-- End -->
						</div>
					</div><!-- End -->
				</div>
    </div>
</template>

<script>
export default {
    name: 'Laravel9vue3Register',

    data() {
        return {
            name:'',
            email:'',
            password:'',
            password2:'',
            showError:false,
            textError:''

        };
    },

    mounted() {

    },

    methods: {
        Register(){
            if(this.name == '' || this.email == '' || this.password == ''){
                this.showError = true;
                this.textError = 'ກະລຸນາເພີ່ມຂໍ້ມູນໃຫ້ຄົບຖ້ວນ';
            }else{
                this.showError = false;
                this.textError = '';

                if(this.password2 == '' && this.password != this.password2){
                    this.showError = true;
                    this.textError = 'ລະຫັດຜ່ານບໍ່ຄືກັນ';
                }else{

                    // song api pai database

                    axios.post("api/register",{
                        name: this.name,
                        email: this.email,
                        password: this.password
                    }).then( (respone)=>{
                        if(respone.data.success){
                            this.$router.push('login')
                        }else{
                            this.showError = true;
                            this.textError = 'ການລົງທະບຽນບໍ່ສຳເລັດ!';
                        }
                    } ).catch((error) => {
                        console.error(error);
                    });
                }

            }
        }
    },
};
</script>

<style lang="scss" scoped>

</style>
