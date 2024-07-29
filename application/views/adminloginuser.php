<?php $this->load->view("common");?>
<!--begin::Body-->
<style type="text/css">
	.shakeing {
		  
		  border: solid 2px #f31700 !important;
		  border-color:#f31700 !important;
/*		  animation-name: shake, glow-red;*/
		  animation-name: shake;
		  animation-duration: 0.7s, 0.35s;
		  animation-iteration-count: 1, 2;
		}

		@keyframes shake {
			  0%, 20%, 40%, 60%, 80% {
			    transform: translateX(15px);
			  }
			  10%,
			  30%,
			  50%,
			  70%,
			  90% {
			    transform: translateX(-8px);
			  }
			}
		/*@keyframes glow-red {
		  50% {
		    border-color: indianred;
		  }
		}*/
		

		    .sliding-div {
		      animation: slide-in 3s forwards;
		    }

		     @keyframes slide-in {
		      0% {
		        transform: translateX(100px);
		      }
		      25% {
		        transform: translateX(-15px);
		      }
		      /*50% {
		        transform: translateX(15%);
		      }
		      100% {
		        transform: translateX(0%);
		      }*/
		    }


</style>
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
				<div class="d-flex flex-center w-lg-50 p-2">
					<!-- <div class="card card-xxl-stretch"> -->
						<!-- <div class="badge badge-white h-125px w-125px me-5"> -->
							<!-- <div class="symbol symbol-circle symbol-125px badge badge-outline badge-primary">
		                		<img src="./assets/images/staff_2.png" alt="User">
		                		<span class="w-125px h-125px pulse-ring badge-outline" style="border-color:#ec9629 1px solid !important"></span>
			                </div> -->
						<!-- </div> -->
					<!-- </div> -->
					<!--begin::Card-->
					<!-- id="admin_div" -->
					<div class="card rounded-3 w-md-500px min-h-350px" id="admin_div">
						<div class="text-center mt-n17">
			                <div class="symbol symbol-circle symbol-125px badge badge-outline badge-primary">
		                		<img src="./assets/images/staff_2.png" alt="User">
		                		<span class="w-125px h-125px pulse-ring badge-outline" style="border-color:#ec9629 !important;border-radius: 60px;border-style: 5px solid;"></span>
			                </div>
			            </div>
						<!--begin::Card body-->
						<div class="card-body py-4 px-1 d-flex justify-content-center">
							<!--begin::Form-->
							<form class="form w-350px" novalidate="novalidate" id="kt_sign_in_form" action="#">
								<!-- <div class="text-center">
					                <div class="symbol symbol-circle symbol-125px badge badge-outline badge-primary">
				                		<img src="./assets/images/staff_2.png" alt="User">
				                		<span class="w-125px h-125px pulse-ring badge-outline" style="border-color:#ec9629 1px solid !important"></span>
					                </div>
					            </div> -->
								<!--begin::Heading-->
								<div class="text-center mb-3">
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
								<div class="text-center">
									<a href="javascript:;" type="submit" data-index="3" class="btn btn-primary" onclick="validateuser();">
										<!--begin::Indicator label-->
										<span class="indicator-label">Validate User</span>
										<!--end::Indicator label-->
									</a>
								</div>
								<div class=" d-flex justify-content-center align-item-center pt-15">
									<div id="err" class="help-block fw-bold fs-5 badge" style="border-radius: 8px;width: fit-content;font-weight: 700;"></div>
			                		<div id="success" class="help-block fw-bold fs-5 badge" style="border-radius: 8px;width: fit-content;font-weight: 700;"></div>
								</div>
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
		<input type="hidden" id="baseurl" value="<?php echo base_url(); ?>">
		<script type="text/javascript">
			window.addEventListener('load', function() {
			  var myDiv = document.getElementById('username');
			  // var slideButton = document.getElementById('backbtn');
			  
			  // slideButton.addEventListener('click', function() {
			    myDiv.classList.toggle('sliding-div');
			    $("#username").focus();
			  // });
			    setTimeout(function() {
					 $('#username').removeClass('sliding-div');
					}, 1000);
			});

		</script>
		<script>
			function password_eye(id)
			{
				var eye = id;
				var input = document.getElementById("password");
				// alert(eye);
				if(eye==1)
				{
					document.getElementById('open_eye').style.display='block';
					document.getElementById('close_eye').style.display='none';
					// input.attr("type", "password");
					input.type = "password";
				}
				else
				{
					document.getElementById('close_eye').style.display='block';
					document.getElementById('open_eye').style.display='none';
					// input.attr("type", "text");
					input.type = "text";
				}
			};
		</script>
		<script> 
		var baseurl = $("#baseurl").val();
		function validateuser()
		{
			var username   = $("#username").val(); 
			// alert(username)
			if(username.trim()!='') {

				$.ajax({
					type: "POST",
					url: baseurl+'Login/uservalidates_check',
					data: "name="+username,
					async: false,
					cache: false,     
					success: function(response)
					{
						if(response==0) 
						{
							$('div#err').show();
							
							$("div#err").css("padding", "10px");
							$("div#err").css("background", "#eb5d14");
							$('div#err').text('Invalid Username!');
							$('#username').addClass('shakeing');
						    $("#username").focus();
						}
						else
						{
							$.ajax({
								type: "POST",
								url: baseurl+'Login/passwordvalidate',
								data: "name="+username,
								async: false,
								cache: false,     
								success: function(response)
								{	
									$('#admin_div').empty().append(response);
									$("#password").focus();
								    var password = document.getElementById('password');
								      password.classList.toggle('sliding-div');
								    var passwordbtn = document.getElementById('passwordbtn');
								      passwordbtn.classList.toggle('sliding-div');
								    var labelname = document.getElementById('labelname');
								      labelname.classList.toggle('sliding-div');
								      
								      var passwordeye = document.getElementById('passwordeye');
								      passwordeye.classList.toggle('sliding-div');


								      
								}
							});
						}
					}
				});
				setTimeout(function() {
					 $('#password').removeClass('sliding-div');
					 $('#passwordbtn').removeClass('sliding-div');
					 $('#labelname').removeClass('sliding-div');
					 $('#passwordeye').removeClass('sliding-div');

					}, 1000);
			}
			else
			{
				$('div#err').show();
				$("div#err").css("padding", "10px");
				$("div#err").css("background", "#eb5d14");
				$('div#err').text('Please Enter Username!');
				$('#username').addClass('shakeing');
				$("#username").focus();
			}


				setTimeout(function() {
					 $('#username').removeClass('shakeing');
					}, 1000);
			

		}
		</script>
		<script>
			var baseurl = $("#baseurl").val();
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
				var usernames   = $("#usernameget").val(); 
				var password = $("#password").val(); 
				var company_code = 'agb';
			
				$.ajax({
					type: "POST",
					url: baseurl+'Login/admin_login_verify',
					data: "name="+usernames+"&password="+password+"&company_code="+company_code,
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
						$('#username').addClass('shakeing');
						$("#username").focus();


					}     
					else if(response == 2){
						$('div#err').show();
						$("div#err").css("padding", "10px");
						$("div#err").css("background", "#eb5d14");
						$('div#err').text('Please Enter Password');
						$('#password').addClass('shakeing');
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
						$('#password').addClass('shakeing');
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
						$('div#err').text('Invalid Password');
						$('#password').addClass('shakeing');
						$("#password").focus();
						$('div#success').text('');
						return false;
					}  
					else if(response == 7){
						$('div#err').show();
						$("div#err").css("padding", "10px");
						$("div#err").css("background", "#eb5d14");
						// $("div#err").addClass("badge-danger");
						$('div#err').text('Invalid Username / Password');
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
						window.location=baseurl+'Dashboard/karupatti';

					}

					}
				});

				setTimeout(function() {
					 // $('#username').removeClass('shakeing');
					 $('#password').removeClass('shakeing');
					}, 1000);
			}
		</script>


		<!--end::Javascript-->
	</body>
	<!--end::Body-->