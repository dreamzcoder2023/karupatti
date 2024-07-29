<!--begin::Modal dialog-->
			<div class="modal-dialog modal-m">
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
					<form name="idtype_edit_form" id="idtype_edit_form" method="POST" action="<?php echo base_url(); ?>idtype/idtype_update" enctype="multipart/form-data" onsubmit="return idtype_edit_validation();">
						<input type="hidden" id="idtype_id" name="idtype_id" value="<?php echo $idtype_details->IDTYPEID;?>">
					<div class="modal-body pt-0 pb-15 px-5 px-xl-20">
						<!--begin::Heading-->
						<div class="mb-13 text-center">
							<h1 class="mb-3">Modify ID</h1>
							
						</div>
						<!--end::Heading-->
						<div class="row mb-6">
							<!--begin::Label-->
							<label class="col-lg-4 col-form-label required fw-semibold fs-6">ID-Type</label>
							<!--end::Label-->
							<!--begin::Col-->
							<div class="col-lg-8 fv-row fv-plugins-icon-container">
								<input type="text" name="idtype_edit_name" id="idtype_edit_name" class="form-control form-control-lg form-control-solid" placeholder="ID Type" Value="<?php echo $idtype_details->IDTYPENAME;?>" onkeyup="idtype_unique_edit(this.value,<?php echo $idtype_details->IDTYPEID;?>);">
								<div class="fv-plugins-message-container invalid-feedback" id="idtype_edit_err"></div>
							</div>
							<!--end::Col-->
						</div>
						<!--begin::Actions-->
						<div class="row">
							<div class="col-lg-4"></div>
							<div class="col-lg-2">
								<div class="d-flex flex-center flex-row-fluid pt-12">
									<button type="reset" class="btn btn-secondary me-3" data-bs-dismiss="modal">Cancel</button>
								</div>
							</div>
							<div class="col-lg-6">
								<div class="d-flex flex-center flex-row-fluid pt-12">
									<button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Save Changes</button>
								</div>
							</div>
						</div>
						<!--end::Actions-->
					</div>
					<!--end::Modal body-->
				</div>
				<!--end::Modal content-->
			</div>
			<!--end::Modal dialog-->