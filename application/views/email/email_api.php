
		<!--<form id="kt_sms_setting_form" class="form"> JS Validation--> 
				<form class="form w-100" novalidate="novalidate" id="kt_email_setting_form" action="<?php echo base_url(); ?>Settings/email_update" method="post" enctype="multipart/form-data" onsubmit="return email_validation();">
					<input type="hidden" id="id" name="id" value="<?php echo $email_settings->gen_set_id;?>">
		<!--begin::Modal dialog-->
			<div class="modal-dialog modal-m">
				<!--begin::Modal content-->
				<div class="modal-content rounded">
					<div class="row mb-6"></div>
					<div class="row mb-6">
						<!--begin::Heading-->
						<div class="mb-13 text-center">
							<h1 class="mb-3">Email Setting</h1>
						</div>
						<!--end::Heading-->
						<div class="col-lg-1"></div>
						<!--begin::Label-->
						<label class="col-lg-4 col-form-label required fw-semibold fs-6">Host Name</label>
						<!--end::Label-->
						<!--begin::Col-->
						<div class="col-lg-6 fv-row fv-plugins-icon-container">
							<input type="text" name="hostname_email" id="hostname_email" class="form-control form-control-lg form-control-solid" placeholder="Host Name" 
							value="<?php echo $email_settings->hostname;?>">
							<div class="fv-plugins-message-container invalid-feedback" id="hostname_email_err"></div>
						</div>
						<!--end::Col-->
						<div class="col-lg-1"></div>
						<div class="col-lg-1"></div>
						<!--begin::Label-->
						<label class="col-lg-4 col-form-label required fw-semibold fs-6">Username</label>
						<!--end::Label-->
						<!--begin::Col-->
						<div class="col-lg-6 fv-row fv-plugins-icon-container">
							<input type="text" name="uname_email" id="uname_email" class="form-control form-control-lg form-control-solid" placeholder="Username" 
							value="<?php echo $email_settings->username;?>">
							<div class="fv-plugins-message-container invalid-feedback" id="uname_email_err"></div>
						</div>
						<!--end::Col-->
						<div class="col-lg-1"></div>
						<div class="col-lg-1"></div>
						<!--begin::Label-->
						<label class="col-lg-4 col-form-label required fw-semibold fs-6">Password</label>
						<!--end::Label-->
						<!--begin::Col-->
						<div class="col-lg-6 fv-row fv-plugins-icon-container">
							<input type="Password" name="passwd_email" id="passwd_email" class="form-control form-control-lg form-control-solid" placeholder="Password" 
							value="<?php echo $email_settings->password;?>">
							<div class="fv-plugins-message-container invalid-feedback" id="passwd_email_err"></div>
						</div>
						<!--end::Col-->
					</div>
						<div class="d-flex flex-center flex-row-fluid pt-12">
							<button type="reset" class="btn btn-secondary me-3" data-bs-dismiss="modal" onclick="closeEmailEditModal();">Cancel</button>
							<button type="submit" class="btn btn-primary" name="save_chngs_email" id="save_chngs_email">Save Changes</button>
						</div><br><br>
				</div>
				<!--end::Modal content-->
			</div>
			<!--end::Modal dialog-->
		</form>

	<script>
		function email_validation()
		{
			var err = 0;
			var hostname_email = $('#hostname_email').val();
			var uname_email = $('#uname_email').val();
			var passwd_email = $('#passwd_email').val();

		    if(hostname_email.trim()==''){
		        $('#hostname_email_err').html('Enter Host Name!');
		        err++;
		    }else{
		        $('#hostname_email_err').html('');
		    }

		    if(uname_email.trim()==''){
		        $('#uname_email_err').html('Enter Username!');
		        err++;
		    }else{
		        $('#uname_email_err').html('');
		    }
		    
		    if(passwd_email.trim()==''){
		        $('#passwd_email_err').html('Enter Password!');
		        err++;
		    }else{
		        $('#passwd_email_err').html('');
		    }
		    if(err>0){ return false;}else{ return true; }
		}
	</script>	