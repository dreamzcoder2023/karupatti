<?php $this->load->view("common");?>
	<!--begin::Body-->
	<body data-kt-name="metronic" id="kt_body" class="app-blank bgi-size-cover bgi-position-center bgi-no-repeat">
		<!--begin::Theme mode setup on page load-->
		<script>if ( document.documentElement ) { const defaultThemeMode = "system"; const name = document.body.getAttribute("data-kt-name"); let themeMode = localStorage.getItem("kt_" + ( name !== null ? name + "_" : "" ) + "theme_mode_value"); if ( themeMode === null ) { if ( defaultThemeMode === "system" ) { themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light"; } else { themeMode = defaultThemeMode; } } document.documentElement.setAttribute("data-theme", themeMode); }</script>
		<!--end::Theme mode setup on page load-->
		<!--begin::Main-->
		<!--begin::Root-->
		<div class="d-flex flex-column flex-root">
			<!--begin::Page bg image-->
			<style>body { padding-top: 5% !important; background-image: url('assets/media/auth/agb2.jpg'); } [data-theme="dark"] body { background-image: url('assets/media/auth/bg4-dark.jpg'); }</style>
			<!--end::Page bg image-->
			<!--begin::Authentication - Sign-in -->
			<div class="d-flex flex-column flex-column-fluid flex-lg-row">
				<!--begin::Aside-->
				<div class="d-flex flex-center w-lg-50 pt-15 pt-lg-0 px-10">
					<!--begin::Aside-->
					<div class="d-flex flex-column">
						<!--begin::Logo-->
						<!-- <a href="../../demo6/dist/index.html" class="mb-7">
							<img alt="Logo" src="assets/media/logos/custom-3.svg" />
						</a> -->
						<!--end::Logo-->
						<!--begin::Title-->
						<!-- <h2 class="text-white fw-normal m-0">Branding tools designed for your business</h2> -->
						<!--end::Title-->
					</div>
					<!--begin::Aside-->
				</div>
				<!--begin::Aside-->
				<!--begin::Body-->
				<div class="d-flex flex-center w-lg-50 p-10">
					<!--begin::Card-->
					<div class="card rounded-3 w-md-550px">
						<!--begin::Card body-->
						<div class="card-body p-10 p-lg-20">
							<!--begin::Form-->
							<form class="form w-100" novalidate="novalidate" id="kt_sign_in_form" method="POST" action="<?php echo base_url(); ?>settings/general_settings_update" enctype="multipart/form-data" onsubmit="return gvalidation();">
								<!--begin::Heading-->
								<div class="text-center mb-11">
									<!--begin::Title-->
									<h1 class="text-dark fw-bolder mb-3">Login</h1>
									<!--end::Title-->
									<!--begin::Subtitle-->
									<div class="text-gray-500 fw-semibold fs-6">Entry door for your credentials</div>
									<!--end::Subtitle=-->
								</div>
								<!--begin::Heading-->
								<!--begin::Input group=-->
								<div class="fv-row mb-3">
									<!--begin::Email-->
									<input type="text" placeholder="Username" id="username" name="username" autocomplete="off" class="form-control bg-transparent" data-index="1"/>
									<!--end::Email-->
								</div>
								<!--end::Input group=-->
								<!--begin::Input group=-->
								<div class="fv-row mb-3">
									<!--begin::Password-->
									<input type="password" placeholder="Password" id="password" name="password" autocomplete="off" class="form-control bg-transparent" data-index="2" />
									<!--end::Password-->
								</div>
								<!--end::Input group=-->
								<!--begin::Input group=-->
								<!-- <div class="fv-row mb-3"> -->
									<!--begin::Password-->
									<!-- <input type="text" placeholder="Company Code" id="company_code" name="company_code" autocomplete="off" class="form-control bg-transparent" /> -->
									<!--end::Password-->
								<!-- </div> -->
								<!--end::Input group=-->
								<!--begin::Wrapper-->
								<div class="d-flex flex-stack flex-wrap gap-3 fs-base fw-semibold mb-8">
									<div></div>
									<!--begin::Link-->
									<!-- <a href="Javascript:;" class="link-primary">Forgot Password ?</a> -->
									<!--end::Link-->
								</div>
								<!--end::Wrapper-->
								<!--begin::Submit button-->
								<div class="d-grid mb-10">
									<button type="button" class="btn btn-primary"  data-index="3"  onclick="login_validate()">
										<!--begin::Indicator label-->
										<span class="indicator-label">Sign In</span>
										<!--end::Indicator label-->
										<!--begin::Indicator progress-->
										<span class="indicator-progress">Please wait...
										<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
										<!--end::Indicator progress-->
									</button>
									<div class=" d-flex justify-content-center align-item-center pt-15">
										<div id="err" class="help-block fw-bold fs-5 badge" style="border-radius: 8px;width: fit-content;font-weight: 700;"></div>
                                		<div id="success" class="help-block fw-bold fs-5 badge" style="border-radius: 8px;width: fit-content;font-weight: 700;"></div>
									</div>
									
								</div>
								<!--end::Submit button-->
							</form>
							<!--end::Form-->
						</div>
						<!--end::Card body-->
					</div>
					<!--end::Card-->
				</div>
				<!--end::Body-->
			</div>
			<!--end::Authentication - Sign-in-->
		</div>
		<!--end::Root-->
		<!--end::Main-->
		<!--begin::Javascript-->
		<?php $this->load->view("script");?>
		<!--end::Javascript-->

		<script>
			var baseurl = '<?php echo base_url(); ?>';

			var title = $('title').text() + ' | ' + 'Login';

			$(document).attr("title", title);

			$('#kt_sign_in_form').on('keydown', 'input', function (event) {
			    if (event.which == 13) {
			    	
			         event.preventDefault();
			         var $this = $(event.target);

			         var index = parseFloat($this.attr('data-index'));


			         $('[data-index="' + (index + 1).toString() + '"]').focus();
					if(index == 1){
			         	var password = $("#password").val();
			         	if(password){
			         		login_validate();
			         	} 
			         }else if(index == 2){
						login_validate();
			        	
			        }
			        

			    }

			});

			// $("#password").attr("onkeydown","if(event.keyCode==13) login_validate()");
			// $("#username").attr("onkeydown","if(event.keyCode==13) login_validate()");
			// $("#company_code").attr("onkeydown","if(event.keyCode==13) login_validate()");


			function login_validate()
			{
				var username   = $("#username").val(); 
				var password = $("#password").val(); 
				var company_code = 'agb';
				/*if($("#rememberMe").prop('checked')==true)
				{
					var re=1;
				}else{
					var re=0;
				}*/
			
				$.ajax({
					type: "POST",
					url: baseurl+'login/admin_login_check',
					data: "name="+username+"&password="+password+"&company_code="+company_code,
					async: false,
						cache: false,
					// timeout: 30000,
					beforeSend: function() {
						// setting a timeout
						$('div#err').text('');
						// $("div#success").css("padding", "10px");
						// $("div#success").css("background", "#46dcf9");
						$('div#success').text('Authenticating...');
					},           
					success: function(response)
					{
					if(response == 1){
						$('div#err').show();
						$("div#err").css("padding", "10px");
						$("div#err").css("background", "#eb5d14");
						$('div#err').text('Please Enter Username!');
						$('div#success').text('');
						return false;
					}     
					else if(response == 2){
						$('div#err').show();
						$("div#err").css("padding", "10px");
						$("div#err").css("background", "#eb5d14");
						$('div#err').text('Please Enter Password');
						$('div#success').text('');
						$("#password").focus();
						return false;
					}
					else if(response == 3){
						$('div#err').show();
						$("div#err").css("padding", "10px");
						// $("div#err").css("background", "#eb5d14");
						$("div#err").addClass("badge-secondary");
						$('div#err').text('Please Enter Username & Password');
						$("#username").focus();
						$('div#success').text('');
						return false;
					} 
					else if(response == 5){
						$('div#err').show();
						$("div#err").css("padding", "10px");
						$("div#err").css("background", "#eb5d14");
						$('div#err').text('Enter Company Code');
						$('div#success').text('');
						return false;
					}  
					else if(response == 4){
						$('div#err').show();
						$("div#err").css("padding", "10px");
						$("div#err").css("background", "#EB9F52");
						$('div#err').text('User Role Inactive');
						$('div#success').text('');
						return false;
					}  
					else if(response == 0){
						$('div#err').show();
						$("div#err").css("padding", "10px");
						$("div#err").css("background", "#eb5d14");
						$('div#err').text('Invalid Username / Password');
						$('div#success').text('');
						return false;
					}  
					else if(response == 7){
						$('div#err').show();
						$("div#err").css("padding", "10px");
						$("div#err").css("background", "#eb5d14");
						// $("div#err").addClass("badge-danger");
						$('div#err').text('Invalid Password');
						$('div#success').text('');
						return false;
					}       
					else
						{
							//var resp = response.split('-');
						$("div#err").css("background", "#ffffff");
						$('div#err').text('');
						$("div#success").css("padding", "10px");
						$("div#success").addClass("badge-success");
						$('div#success').text('Login Successfully');
						// document.getElementById("div#success").style.textAlign = "center";
						//alert(base+'settings');
						//setTimeout(function(){window.location=base+'settings'; }, 1000);
						//window.location=base+'dashboard';
						//window.location=baseurl+'dashboard';
						/*if(resp[1]==1)
							window.location=baseurl+'dashboard';
						else
							window.location=baseurl+'appraisal';*/
						window.location=baseurl+'Dashboard/karupatti';
					}

					}
				});
			}
		</script>
	</body>
	<!--end::Body-->