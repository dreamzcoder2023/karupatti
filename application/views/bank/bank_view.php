<!--begin::Modal dialog-->
	<div class="modal-dialog modal-xl">
		<!--begin::Modal content-->
		<div class="modal-content rounded">
			<!--begin::Modal header-->
			<div class="modal-header justify-content-end border-0 pb-0">
				<!--begin::Close-->
				<div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal" >
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
			<div class="modal-body pt-0 pb-15 px-5 px-xl-20">
				<!--begin::Heading-->
				<div class="mb-13 text-center">
					<h1 class="mb-3">View Bank Details</h1>
				</div>
				<!--end::Heading-->
				<div class="row mb-6">
					<!--begin::Label-->
					<label class="col-lg-1 col-form-label fw-semibold fs-6">Bank</label>
					<!--end::Label-->
					<!--begin::Col-->
					<div class="col-lg-3 fv-row fv-plugins-icon-container">
						<label class="col-form-label fw-bold fs-4"><?php echo $bank_details->BANKNAME?$bank_details->BANKNAME:'-';?></label>
						
					</div>
					<!--end::Col-->
					
					<!--begin::Label-->
					<label class="col-lg-1 col-form-label fw-semibold fs-6">Branch</label>
					<!--end::Label-->
					<!--begin::Col-->
					<div class="col-lg-3 fv-row fv-plugins-icon-container">
						<label class="col-form-label fw-bold fs-4"><?php echo $bank_details->BRANCH?$bank_details->BRANCH:'-';?></label>
						
					</div>
					<!--end::Col-->
					
					<!--begin::Label-->
					<label class="col-lg-1 col-form-label fw-semibold fs-6">IFSC</label>
					<!--end::Label-->
					<!--begin::Col-->
					<div class="col-lg-3 fv-row fv-plugins-icon-container">
						<label class="col-form-label fw-bold fs-4"><?php echo $bank_details->IFSC?$bank_details->IFSC:'-';?></label>
						
					</div>
					<!--end::Col-->
					
					<!--begin::Label-->
					<label class="col-lg-1 col-form-label fw-semibold fs-6">Company</label>
					<!--end::Label-->
					<!--begin::Col-->
					<div class="col-lg-3 fv-row fv-plugins-icon-container">
						<label class="col-form-label fw-bold fs-4">
							<?php 
							
								$qry = $this->db->query("SELECT * FROM COMPANY WHERE COMPANYCODE='".$bank_details->COMPANYCODE."'")->row();
								if ($qry) {
								    echo $qry->COMPANYNAME ? $qry->COMPANYNAME : '-';
								} else {
								    echo '-';
								}

							?> 	
						</label>
						
					</div>
					<!--end::Col-->
					<!--begin::Label-->
					<label class="col-lg-1 col-form-label fw-semibold fs-6">Address</label>
					<!--end::Label-->
					<!--begin::Col-->
					<div class="col-lg-3 fv-row fv-plugins-icon-container">
						<label class="col-form-label fw-bold fs-4"><?php echo $bank_details->ADDRESS?$bank_details->ADDRESS:'-';?></label>
						
					</div>
					<!--end::Col-->
					<!--begin::Label-->
					<label class="col-lg-1 col-form-label fw-semibold fs-6">A/C No</label>
					<!--end::Label-->
					<!--begin::Col-->
					<div class="col-lg-3 fv-row fv-plugins-icon-container">
						<label class="col-form-label fw-bold fs-4"><?php echo $bank_details->ACCOUNTNO?$bank_details->ACCOUNTNO:'-';?></label>
						
					</div>
					<!--end::Col-->
					<!--begin::Label-->
					<label class="col-lg-1 col-form-label fw-semibold fs-6">Name</label>
					<!--end::Label-->
					<!--begin::Col-->
					<div class="col-lg-3 fv-row fv-plugins-icon-container">
						<label class="col-form-label fw-bold fs-4"><?php echo $bank_details->PERSONNAME?$bank_details->PERSONNAME:'-';?></label>
					</div>

					<!--end::Col-->			
				</div>
			<!--end::Modal body-->
			</div>				
		</div>
		<!--end::Modal content-->
	</div>
	<!--end::Modal dialog-->