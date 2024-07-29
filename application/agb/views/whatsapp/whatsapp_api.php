
		<!--<form id="kt_sms_setting_form" class="form"> JS Validation--> 
				<form class="form w-100" novalidate="novalidate" id="kt_whatsapp_setting_form" action="<?php echo base_url(); ?>Settings/whatsapp_update" method="post" enctype="multipart/form-data" onsubmit="return whatsapp_validation();">
					<input type="hidden" id="id" name="id" value="<?php echo $whatsapp_settings->gen_set_id;?>">
		<!--begin::Modal dialog-->
			<div class="modal-dialog modal-m">
				<!--begin::Modal content-->
				<div class="modal-content rounded">
					<div class="row mb-6"></div>
					<div class="row mb-6">
						<!--begin::Heading-->
						<div class="mb-13 text-center">
							<h1 class="mb-3">WhatsApp Setting</h1>
						</div>
						<!--end::Heading-->
						<div class="col-lg-1"></div>
						<!--begin::Label-->
						<label class="col-lg-4 col-form-label required fw-semibold fs-6">App Key</label>
						<!--end::Label-->
						<!--begin::Col-->
						<div class="col-lg-6 fv-row fv-plugins-icon-container">
							<input type="text" name="whatsappkey" id="whatsappkey" class="form-control form-control-lg form-control-solid" placeholder="APP Key" 
							value="<?php echo $whatsapp_settings->whatsappkey;?>">
							<div class="fv-plugins-message-container invalid-feedback" id="whatsappkey_err"></div>
						</div>
						<!--end::Col-->
						<div class="col-lg-1"></div>
						<div class="col-lg-1"></div>
						<!--begin::Label-->
						<label class="col-lg-4 col-form-label required fw-semibold fs-6">Sender ID</label>
						<!--end::Label-->
						<!--begin::Col-->
						<div class="col-lg-6 fv-row fv-plugins-icon-container">
							<input type="text" name="whatsappsenderid" id="whatsappsenderid" class="form-control form-control-lg form-control-solid" placeholder="Sender ID" 
							value="<?php echo $whatsapp_settings->whatssenderid;?>">
							<div class="fv-plugins-message-container invalid-feedback" id="whatsappsenderid_err" ></div>
						</div>
						<!--end::Col-->
						<div class="col-lg-1"></div>
						<div class="d-flex flex-center flex-row-fluid pt-12">
							<button type="reset" class="btn btn-secondary me-5" data-bs-dismiss="modal" onclick="closeWhatsappEditModal();">Cancel</button>
							<button type="submit" class="btn btn-primary me-3" name="save_chngs_whatsapp" id="save_chngs_whatsapp">Save Changes</button>
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
		function whatsapp_validation()
		{
			var err = 0;
			var whatsappkey = $('#whatsappkey').val();
			var whatsappsenderid = $('#whatsappsenderid').val();

		    if(whatsappkey.trim()==''){
		        $('#whatsappkey_err').html('Enter App Key!');
		        err++;
		    }else{
		        $('#whatsappkey_err').html('');
		    }

		    if(whatsappsenderid.trim()==''){
		        $('#whatsappsenderid_err').html('Enter Sender Id!');
		        err++;
		    }else{
		        $('#whatsappsenderid_err').html('');
		    }
		    
		    if(err>0){ return false;}else{ return true; }
		}
	</script>