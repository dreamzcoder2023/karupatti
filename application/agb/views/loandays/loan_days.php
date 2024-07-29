
<!--<form id="kt_sms_setting_form" class="form"> JS Validation--> 
<form class="form w-100" novalidate="novalidate" id="kt_loan_days_setting_form" action="<?php echo base_url();?>settings/loandays_update" method="post" enctype="multipart/form-data" onsubmit="return loandays_validation();">
	<input type="hidden" id="id" name="id" value="<?php echo $loan_settings->SNO;?>">
	<!--begin::Modal dialog-->
			<div class="modal-dialog modal-m">
				<!--begin::Modal content-->
				<div class="modal-content rounded">
					<div class="row mb-6"></div>
					<div class="row mb-6">
						<!--begin::Heading-->
						<div class="mb-13 text-center">
							<h1 class="mb-3">Loan Days</h1>
						</div>
						<!--end::Heading-->
						<div class="col-lg-1"></div>
						<!--begin::Label-->
						<label class="col-lg-4 col-form-label required fw-semibold fs-6">Min Interest Days</label>
						<!--end::Label-->
						<!--begin::Col-->
						<div class="col-lg-6 fv-row fv-plugins-icon-container">
							<input type="text" name="min_interest" id="min_interest" class="form-control form-control-lg form-control-solid" placeholder="Min Int Days" 
							value="<?php echo $loan_settings->MIN_INT_DAYS;?>">
							<div class="fv-plugins-message-container invalid-feedback" id="min_interest_err"></div>
						</div>
						<!--end::Col-->
						<div class="col-lg-1"></div>
						<div class="col-lg-1"></div>
						<!--begin::Label-->
						<label class="col-lg-4 col-form-label required fw-semibold fs-6">Min Calc Days</label>
						<!--end::Label-->
						<!--begin::Col-->
						<div class="col-lg-6 fv-row fv-plugins-icon-container">
							<input type="text" name="min_calc" id="min_calc" class="form-control form-control-lg form-control-solid" placeholder="Min Calc Days" 
							value="<?php echo $loan_settings->MIN_CALC_DAYS;?>">
							<div class="fv-plugins-message-container invalid-feedback" id="min_calc_err" ></div>
						</div>
						<!--end::Col-->
						<div class="col-lg-1"></div>
						<div class="col-lg-1"></div>
						<!--begin::Label-->
						<label class="col-lg-4 col-form-label required fw-semibold fs-6">Grace Days</label>
						<!--end::Label-->
						<!--begin::Col-->
						<div class="col-lg-6 fv-row fv-plugins-icon-container">
							<input type="text" name="gracedays" id="gracedays" class="form-control form-control-lg form-control-solid" placeholder="Grace" 
							value="<?php echo $loan_settings->GRACE_DAYS;?>">
							<div class="fv-plugins-message-container invalid-feedback" id="gracedays_err"></div>
						</div>
						<!--end::Col-->
						<div class="d-flex flex-center flex-row-fluid pt-12">
							<button type="reset" class="btn btn-secondary me-3" data-bs-dismiss="modal" 
							onclick="closeLoandaysModal();">Cancel</button>
							<button type="submit" class="btn btn-primary me-3" name="save_changes_loan_days" id="save_changes_loan_days">Save Changes</button>
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
	function loandays_validation()
		{
			var err = 0;
			var min_interest = $('#min_interest').val();
			var min_calc = $('#min_calc').val();
			var gracedays = $('#gracedays').val();

		    if(min_interest.trim()==''){
		        $('#min_interest_err').html('Enter Interest Days!');
		        err++;
		    }else{
		        $('#min_interest_err').html('');
		    }

		    if(min_calc.trim()==''){
		        $('#min_calc_err').html('Enter Calculation Days!');
		        err++;
		    }else{
		        $('#min_calc_err').html('');
		    }

		    if(gracedays.trim()==''){
		        $('#gracedays_err').html('Enter Grace Days!');
		        err++;
		    }else{
		        $('#gracedays_err').html('');
		    }

		    if(err>0){ return false; }else{ return true; }
		}
</script>	