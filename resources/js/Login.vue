<template>
    <div id="kt_body"  class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading" @keyup.enter="login">
       <!--begin::Main-->
		<div  class="d-flex flex-column flex-root">
			<!--begin::Login-->
			<div  class="login login-1 login-signin-on d-flex flex-column flex-lg-row flex-row-fluid"  id="kt_login">
				<!--begin::Aside-->
			
				<!--begin::Aside-->
				<!--begin::Content-->
				<div  class="login-content bg-white flex-row-fluid d-flex flex-column justify-content-center mt-25 position-relative overflow-hidden p-7 ml-auto mr-auto ">
					<!--begin::Content body-->
					<div class="d-flex flex-column-fluid flex-center mt-6 mt-lg-0">
						<!--begin::Signin-->
						<div class="login-form login-signin">
							<!--begin::Form-->
							<form class="form" novalidate="novalidate" id="kt_login_signin_form">
								<!--begin::Title-->
								<div class="pt-lg-40 mt-lg-10 pb-15">
									<h3 class="font-weight-bolder text-dark display5">Welcome to HPME++ IS</h3>
								</div>
								<!--begin::Title-->
								<!--begin::Form group-->
								<div class="alert alert-custom alert-danger p-2 pl-5" role="alert" v-for="(error, index) in errors" :key="index">
									<div class="alert-icon"><i class="flaticon-warning"></i></div>
									<div class="alert-text">{{ error }}</div>
								</div>
								
								<div class="form-group">
									<label class="font-size-h6 font-weight-bolder text-dark">Username</label>
									<input class="form-control form-control-solid h-auto py-7 px-6 rounded-lg" autocomplete="off" id="username" name="username" type="text" v-model="email"/>
								</div>
								<!--end::Form group-->
								<!--begin::Form group-->
								<div class="form-group">
									<div class="d-flex justify-content-between mt-n5">
										<label class="font-size-h6 font-weight-bolder text-dark pt-5">Password</label>
										
									</div>
									<input class="form-control form-control-solid h-auto py-7 px-6 rounded-lg" autocomplete="off" id="password" name="password" type="password" v-model="password"/>
									<a href="javascript:;" class="text-dark font-size-h6 font-weight-bolder text-hover-dark pt-5" id="kt_login_forgot">Forgot Password ?</a>
								</div>
								<!--end::Form group-->
								<!--begin::Action-->
								<div class="pb-lg-0 pb-10 text-center">
									<button type="button" id="login-btn" class="btn btn-primary font-weight-bolder font-size-h6 py-4 my-3 mr-3" @click="login"  @keyup.enter="login">Login</button>
									<br/>
									<label>-or-</label>
									<br/>
									<button type="button" class="btn btn-primary font-weight-bolder px-5 py-3 my-3 font-size-lg">
									<span class="svg-icon svg-icon-md">
                                        <img src="/assets/media/logos/ISSO.png" class="h-30px" alt="">
									</span>Login with ISSO</button>
								</div>
								<!--end::Action-->
							</form>
							<!--end::Form-->
						</div>
						<!--end::Signin-->
						<!--begin::Signup-->
						<div class="login-form login-signup" >
							<!--begin::Form-->
							<form class="form" novalidate="novalidate" id="kt_login_signup_form" >
							</form>
							<!--end::Form-->
						</div>
						<!--end::Signup-->
						<!--begin::Forgot-->
						<div class="login-form login-forgot">
							<!--begin::Form-->
							<form class="form" novalidate="novalidate" id="kt_login_forgot_form">
								<!--begin::Title-->
								<div class="text-center pt-lg-40 mt-lg-20 pb-15">
									<h3 class="font-weight-bolder text-dark display5">Forgotten Password ?</h3>
									<p class="text-muted font-weight-bold font-size-h4">Enter your email to reset your password</p>
								</div>
								<!--end::Title-->
								<!--begin::Form group-->
								<div class="form-group">
									<input class="form-control form-control-solid h-auto py-7 px-6 rounded-lg font-size-h6" type="email" placeholder="Email" name="email" autocomplete="off" />
								</div>
								<!--end::Form group-->
								<!--begin::Form group-->
								<div class="form-group d-flex flex-wrap flex-center pb-lg-0">
									<button type="button" id="kt_login_forgot_submit" class="btn btn-primary font-weight-bolder font-size-h6 px-8 py-4 my-3 mx-4">Submit</button>
									<button type="button" id="kt_login_forgot_cancel" class="btn btn-light-primary font-weight-bolder font-size-h6 px-8 py-4 my-3 mx-4">Cancel</button>
								</div>
								<!--end::Form group-->
							</form>
							<!--end::Form-->
						</div>
						<!--end::Forgot-->
					</div>
					<!--end::Content body-->
					<!--begin::Content footer-->
				
					<!--end::Content footer-->
				</div>
				<!--end::Content-->


			</div>
			<!--end::Login-->
		</div>
    </div>
</template>

<script>
    export default {
        name: 'Login',
        props: {
            source: String,
        },
        data () {
            return {
                email: '',
                password: '',
                errors: [],
                req: axios.create({
                    baseUrl: BASE_URL
                })
            }
        },
        methods: {
            login() {
                this.errors = [];
                if (!this.email) {
                    this.errors.push('Email is required.');
                }

                if (!this.password) {
                    this.errors.push('Password is required.');
                }

                if (!this.errors.length) {
                    const data = {
                        email: this.email,
                        password: this.password
                    }
					$('#login-btn').addClass('spinner spinner-white spinner-right');
                    this.req.post('/login', data).then(response => {
						if (response.data[0].type == 'error') {
                        	this.errors.push(response.data[0].message);
							$('#login-btn').removeClass('spinner spinner-white spinner-right');
						} else {
	                        window.location = '/';
						}
                    }).catch(error => {
                        this.errors.push(error.response.data.errors[0][0]);
						$('#login-btn').removeClass('spinner spinner-white spinner-right');
                    });
                }
            }
        }
    }
</script>