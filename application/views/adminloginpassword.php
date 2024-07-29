<!-- <div class="card rounded-3 w-md-500px min-h-350px"> -->
		<div class="text-center mt-n17">
            <div class="symbol symbol-circle symbol-125px badge badge-outline badge-primary">
            	<?php if($name=='eibsdemo'){ ?>
        		<img src="./assets/images/staff_7.jpg" alt="User">
        		<?php }else if($name=='spark') { ?>
        			<img src="./assets/images/staff_10.jpg" alt="User">
        		<?php }else{?>
        			<img src="./assets/images/staff_5.jpg" alt="User">
        		<?php } ?>
        		<span class="w-125px h-125px pulse-ring badge-outline" style="border-color:#ec9629 !important;border-radius: 60px;border-style: 5px solid;"></span>
            </div>
        </div>
		<!--begin::Card body-->
		<div class="card-body py-4 px-1 d-flex justify-content-center">
			<!--begin::Form-->
			<form class="form w-350px" novalidate="novalidate" id="kt_sign_in_form" method="POST" action="javascript:;">
				<!-- <div class="text-center">
	                <div class="symbol symbol-circle symbol-125px badge badge-outline badge-primary">
                		<img src="./assets/images/staff_2.png" alt="User">
                		<span class="w-125px h-125px pulse-ring badge-outline" style="border-color:#ec9629 1px solid !important"></span>
	                </div>
	            </div> -->
				<!--begin::Heading-->
				<div class="text-center mb-3">
					<!--begin::Title-->
					<h1 class="text-dark fw-bolder mb-3" id="labelname">
						<a href="<?php echo base_url(); ?>login" id="backbtn">
							<i class="fa-solid fa-circle-left fs-1 text-primary"></i></a>
						<label>Welcome</label>
						<label><?php echo $name?$name:''; ?></label>
						<label class="fs-1">&#128521;</label>
					</h1>
					<!--end::Title-->
				</div>
				<!--begin::Heading-->
				<input type="hidden" id="usernameget" name="username" value="<?php echo $name?$name:''; ?>"	>
				<!--begin::Input group=-->
				<!-- <div class="fv-row mb-3">				
					<input type="password" placeholder="Password" id="password" name="password" autocomplete="off" class="form-control bg-transparent" data-index="2" />
				</div> -->
				<div class="fv-row mb-3">
					<!--begin::Password-->
					<!-- <input type="password" placeholder="Password" name="password" id="password" autocomplete="off" class="form-control bg-transparent" tabIndex="2" /> -->
					<div class="input-group " id="passwordeye">
					    <input type="password" placeholder="Password" name="password" id="password" autocomplete="off" class="form-control bg-transparent fw-semibold" tabIndex="2" >
						<span class="input-group-text cursor-pointer" style="margin-top: 8.3px !important;padding: 0px 10px 0px 10px !important;">

							<i class="fa-solid fa-eye fs-4 " id="open_eye" onclick="password_eye(2);"></i>
							<i class="fa-solid fa-eye-slash fs-4" id="close_eye" style="display: none;"  onclick="password_eye(1);"></i>
			        	</span>
	        		</div>	
					<!--end::Password-->
				</div>
				<!-- for rememberme -->
				<!-- <div class="d-flex justify-content-between passwordeye">
				  	<label class="form-check form-check-inline form-check-solid me-5 is-invalid">
						< ?php  if(get_cookie('rememberme')!=""){?>
							<input class="form-check-input" name="rememberme"  type="checkbox" id="rememberme" checked>
						< ?php }else{?>
							<input class="form-check-input" name="rememberme"  type="checkbox" id="rememberme" >
						< ?php } ?> <span class="form-check-label fs-6">Remember Me</span>
					</label> -->
	             <!--  <a href="javascript:;" class="float-end mb-1 fs-6">
	                <span>Forgot Password?</span>
	              </a> -->
	            <!-- </div> -->
				<!--end::Input group=-->
				<div class="d-flex flex-stack flex-wrap gap-3 fs-base fw-semibold mb-4">
				</div>
				<!--begin::Submit button-->
				<div class="text-center">
				<!-- <div class="d-grid mb-10"> -->
					<button type="submit" data-index="3" id="passwordbtn" class="btn btn-primary" onclick="login_validate()">
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
	<!-- </div> -->

