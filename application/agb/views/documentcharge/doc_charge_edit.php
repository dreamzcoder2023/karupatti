<!-- <form id="kt_edit_itempurity_list_form" class="form"> -->
				<!--begin::Modal dialog-->
				<div class="modal-dialog modal-m">
					<!--begin::Modal content-->
					<div class="modal-content rounded">
						<!--begin::Modal header-->
						<div class="modal-header justify-content-end border-0 pb-0">
							<!--begin::Close-->
							<div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal"  onclick="closeEditModalDoccharge();">
								<!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
								<span class="svg-icon svg-icon-1">
									<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
										<rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="currentColor" />
										<rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="currentColor" />
									</svg>
								</span>
								<!--end::Svg Icon-->
							</div>
							<!--end::Close-->
						</div>
						<!--end::Modal header-->
						<!--begin::Modal body-->
						<form name="edit_doc_charge_form" id="edit_doc_charge_form" method="POST" action="<?php echo base_url();?>Documentcharge/doc_charge_update" enctype="multipart/form-data">
							<input type="hidden" id="doc_id_edit" name="doc_id_edit" value="<?php echo $doc_charge_details->DC_ID;?>">
						<div class="modal-body pt-0 pb-15 px-5 px-xl-20">
							<!--begin::Heading-->
							<div class="mb-10 text-center">
								<h1 class="mb-3">Modify Document Charge</h1>
								
							</div>
							<!--end::Heading-->
							<div class="row">
								<label class="col-lg-4 col-form-label required fw-semibold fs-6">From Amount</label>
								<div class="col-lg-8 fv-row fv-plugins-icon-container">
									<input type="text" name="from_amt_edit" class="form-control form-control-lg form-control-solid" placeholder="From Amount" value="<?php echo $doc_charge_details->FROM_AMT;?>">
									<div class="fv-plugins-message-container invalid-feedback"></div>
								</div>
							</div>
							<div class="row">
								<label class="col-lg-4 col-form-label required fw-semibold fs-6">To Amount</label>
								<div class="col-lg-8 fv-row fv-plugins-icon-container">
									<input type="text" name="to_amt_edit" class="form-control form-control-lg form-control-solid" placeholder="To Amount" value="<?php echo $doc_charge_details->TO_AMT;?>">
									<div class="fv-plugins-message-container invalid-feedback"></div>
								</div>
							</div>
							<div class="row">
								<label class="col-lg-4 col-form-label required fw-semibold fs-6">DC Amount</label>
								<div class="col-lg-8 fv-row fv-plugins-icon-container">
									<input type="text" name="dc_amt_edit" class="form-control form-control-lg form-control-solid" placeholder="DC Amount" value="<?php echo $doc_charge_details->DC_AMT;?>">
									<div class="fv-plugins-message-container invalid-feedback"></div>
								</div>
							</div>
							<div class="d-flex justify-content-center mt-3">
								<button type="reset" class="btn btn-secondary me-2" data-bs-dismiss="modal">Cancel</button>
								<button type="submit" class="btn btn-primary" id="">Save Changes</button>
							</div>
						</div>
						<!--end::Modal body-->
					</form>
				</div>
			<!--end::Modal content-->
		</div>
	<!--end::Modal dialog-->
<!-- </form> -->