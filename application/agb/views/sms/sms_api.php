	
		<!--<form id="kt_sms_setting_form" class="form"> JS Validation--> 
				<form class="form w-100" novalidate="novalidate" id="kt_sms_setting_form" action="<?php echo base_url(); ?>settings/sms_update" method="post" enctype="multipart/form-data" onsubmit="return sms_validation();" >
					<input type="hidden" id="id" name="id" value="<?php echo $sms_settings->gen_set_id;?>">
				<!--begin::Modal dialog-->
				<div class="modal-dialog modal-m">
					<!--begin::Modal content-->
					<div class="modal-content rounded">
						<div class="row mb-6"></div>
						<div class="row mb-6">
							<!--begin::Heading-->
							<div class="mb-13 text-center">
								<h1 class="mb-3">SMS Setting</h1>
							</div>
							<!--end::Heading-->
							<div class="col-lg-1"></div>
							<!--begin::Label-->
							<label class="col-lg-4 col-form-label required fw-semibold fs-6">App Key</label>
							<!--end::Label-->
							<!--begin::Col-->
							<div class="col-lg-6 fv-row fv-plugins-icon-container">
								<input type="text" name="add_appkey_sms" id="add_appkey_sms" class="form-control form-control-lg form-control-solid" placeholder="APP Key" value="<?php echo $sms_settings->appkey;?>">
								<div class="fv-plugins-message-container invalid-feedback" id="add_appkey_sms_err"></div>
							</div>
							<!--end::Col-->
							<div class="col-lg-1"></div>
							<div class="col-lg-1"></div>
							<!--begin::Label-->
							<label class="col-lg-4 col-form-label required fw-semibold fs-6">Sender ID</label>
							<!--end::Label-->
							<!--begin::Col-->
							<div class="col-lg-6 fv-row fv-plugins-icon-container">
								<input type="text" name="add_senderid_sms" id="add_senderid_sms" class="form-control form-control-lg form-control-solid" placeholder="Sender ID"  value="<?php echo $sms_settings->senderid;?>">
								<div class="fv-plugins-message-container invalid-feedback" id="add_senderid_sms_err"></div>
							</div>
							<!--end::Col-->
							<div class="d-flex flex-center flex-row-fluid pt-12">
								<button type="reset" class="btn btn-secondary me-5" data-bs-dismiss="modal" onclick="closeSMSEditModal();">Cancel</button>
								<button type="submit" class="btn btn-primary " id="save_changes_sms_form" name="save_changes_sms_form">Save Changes</button>
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
function sms_validation()
{
	var err = 0;
	var add_appkey_sms = $('#add_appkey_sms').val();
	var add_senderid_sms = $('#add_senderid_sms').val();

    if(add_appkey_sms.trim()==''){
        $('#add_appkey_sms_err').html('Enter App Key!');
        err++;
    }else{
        $('#add_appkey_sms_err').html('');
    }

    if(add_senderid_sms.trim()==''){
        $('#add_senderid_sms_err').html('Enter Sender Id!');
        err++;
    }else{
        $('#add_senderid_sms_err').html('');
    }
    
    if(err>0){ return false; }else{ return true; }
}
</script>			


 <!-- <script src="<?php //echo base_url();?>assets/js/sms.js"></script> -->