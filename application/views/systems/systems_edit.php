<!-- <form id="kt_edit_systems_list_form" class="form"> JS Validation ID-->
				<!--begin::Modal dialog-->
				<div class="modal-dialog modal-m">
					<!--begin::Modal content-->
					<div class="modal-content rounded">
						<!--begin::Modal header-->
						<div class="modal-header justify-content-end border-0 pb-0">
							<!--begin::Close-->
							<div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal" onclick="closeEditModalsystems();">
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
					<form name="edit_systems_list_form" id="edit_systems_list_form" method="POST" action="<?php echo base_url();?>systems/systems_update" enctype="multipart/form-data" onsubmit="return systems_edit_validation();">
						<input type="hidden" id="sys_id_edit" name="sys_id_edit" value="<?php echo $systems_details->SYS_ID;?>">
						<div class="modal-body pt-0 pb-15 px-5 px-xl-20">
							<!--begin::Heading-->
							<div class="mb-13 text-center">
								<h1 class="mb-3">Modify System Details</h1>
							</div>
							<!--end::Heading-->
						
							<div class="row mb-6">
								<!--begin::Label-->
								<label class="col-lg-4 col-form-label required fw-semibold fs-6">System Name</label>
								<!--end::Label-->
								<!--begin::Col-->
								<div class="col-lg-8 fv-row fv-plugins-icon-container">
									<input type="text" id="systems_name_edit" name="systems_name_edit" class="form-control form-control-lg form-control-solid" placeholder="System Name" value="<?php echo $systems_details->SYS_NAME;?>" 
									onkeyup="systems_name_unique_edit(this.value,<?php echo $systems_details->SYS_ID;?>);">
									<div class="fv-plugins-message-container invalid-feedback" id="systems_name_edit_err"></div>
								</div>
								<!--end::Col-->
							</div>	
							<div class="row mb-6">
								<!--begin::Label-->
								<label class="col-lg-4 col-form-label required fw-semibold fs-6">System Code</label>
								<!--end::Label-->
								<!--begin::Col-->
								<div class="col-lg-8 fv-row fv-plugins-icon-container">
									<input type="text" id="systems_code_edit" name="systems_code_edit" class="form-control form-control-lg form-control-solid" placeholder="System Code" value="<?php echo $systems_details->SYS_CODE;?>" onkeyup="systems_code_unique_edit(this.value,<?php echo $systems_details->SYS_CODE;?>);">
									<div class="fv-plugins-message-container invalid-feedback" id="systems_code_edit_err"></div>
								</div>
								<!--end::Col-->
							</div>
							<div class="row mb-6">
								<!--begin::Label-->
								<label class="col-lg-4 col-form-label required fw-semibold fs-6">Loan Prefix</label>
								<!--end::Label-->
								<!--begin::Col-->
								<div class="col-lg-8 fv-row fv-plugins-icon-container">
									<input type="text" id="loanprefix_edit" name="loanprefix_edit" class="form-control form-control-lg form-control-solid" placeholder="Loan Prefix" value="<?php echo $systems_details->LOANPREFIX;?>" onkeyup="loanprefix_unique_edit(this.value,<?php echo $systems_details->LOANPREFIX;?>);">
									<div class="fv-plugins-message-container invalid-feedback" id="loanprefix_edit_err"></div>
								</div>
								<!--end::Col-->
							</div>
							<!--begin::Actions-->
							<div class="row">
								<div class="col-lg-4"></div>
								<div class="col-lg-2">
									<div class="d-flex flex-center flex-row-fluid pt-12">
										<button type="reset" class="btn btn-secondary me-3" data-bs-dismiss="modal" onclick="closeEditModalsystems();">Cancel</button>
									</div>
								</div>
								<div class="col-lg-6">
									<div class="d-flex flex-center flex-row-fluid pt-12">
										<button type="submit" class="btn btn-primary" id="save_changes_edit_systems">Save Changes</button>
									</div>
								</div>
							</div>
							<!--end::Actions-->
						</div>
						<!--end::Modal body-->
					</form>
				</div>
			<!--end::Modal content-->
			</div>
		<!--end::Modal dialog-->