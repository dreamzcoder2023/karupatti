
		<!--<form id="kt_sms_setting_form" class="form"> JS Validation--> 
				<form class="form w-100" novalidate="novalidate" id="kt_mobileapp_setting_form" action="<?php echo base_url(); ?>Settings/mobileapp_update" method="post" enctype="multipart/form-data" onsubmit="return mobile_validation();" >
					<input type="hidden" id="id" name="id" value="<?php echo $mobileapp_settings->gen_set_id;?>">
		<!--begin::Modal dialog-->
			<div class="modal-dialog modal-m">
				<!--begin::Modal content-->
				<div class="modal-content rounded">
					<div class="row mb-6"></div>
					<div class="row mb-6">
						<!--begin::Heading-->
						<div class="mb-13 text-center">
							<h1 class="mb-3">MobileApp Setting</h1>
						</div>
						<!--end::Heading-->
						<div class="col-lg-1"></div>
						<!--begin::Label-->
						<label class="col-lg-4 col-form-label required fw-semibold fs-6">App Key</label>
						<!--end::Label-->
						<!--begin::Col-->
						<div class="col-lg-6 fv-row fv-plugins-icon-container">
							<input type="text" name="mobileappkey" id="mobileappkey" class="form-control form-control-lg form-control-solid" placeholder="APP Key" 
							value="<?php echo $mobileapp_settings->mobileappkey;?>">
							<div class="fv-plugins-message-container invalid-feedback" id="mobileappkey_err"></div>
						</div>
						<!--end::Col-->
						<div class="col-lg-1"></div>
						<div class="col-lg-1"></div>
						<!--begin::Label-->
						<label class="col-lg-4 col-form-label required fw-semibold fs-6">Sender ID</label>
						<!--end::Label-->
						<!--begin::Col-->
						<div class="col-lg-6 fv-row fv-plugins-icon-container">
							<input type="text" name="mobilesenderid" id="mobilesenderid" class="form-control form-control-lg form-control-solid" placeholder="Sender ID" 
							value="<?php echo $mobileapp_settings->mobilesenderid;?>">
							<div class="fv-plugins-message-container invalid-feedback" id="mobilesenderid_err"></div>
						</div>
						<!--end::Col-->
						<div class="col-lg-1"></div>
						<div class="d-flex flex-center flex-row-fluid pt-12">
							<button type="reset" class="btn btn-secondary me-5" data-bs-dismiss="modal" onclick="closeMobileappEditModal();">Cancel</button>
							<button type="submit" class="btn btn-primary me-3" name="save_chngs_mobileapp" id="save_chngs_mobileapp">Save Changes</button>
						</div><br><br>
					</div>
						<!-- <div class="d-flex flex-center flex-row-fluid pt-12">
							<button type="submit" class="btn btn-success me-3" data-bs-dismiss="modal">Save Changes</button>
							<button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
						</div><br><br> -->
				</div>
				<!--end::Modal content-->
			</div>
			<!--end::Modal dialog-->
		</form>

<script>

		function mobile_validation()
		{
			var err = 0;
			var mobileappkey = $('#mobileappkey').val();
			var mobilesenderid = $('#mobilesenderid').val();

		    if(mobileappkey.trim()==''){
		        $('#mobileappkey_err').html('Enter App Key!');
		        err++;
		    }else{
		        $('#mobileappkey_err').html('');
		    }

		    if(mobilesenderid.trim()==''){
		        $('#mobilesenderid_err').html('Enter Sender Id!');
		        err++;
		    }else{
		        $('#mobilesenderid_err').html('');
		    }
		    
		    if(err>0){ return false;}else{ return true; }
		}
</script>			
