<!--begin::Modal dialog-->
			<div class="modal-dialog modal-m">
				<!--begin::Modal content-->
				<div class="modal-content rounded">
					<!--begin::Modal header-->
					<div class="modal-header justify-content-end border-0 pb-0">
						<!--begin::Close-->
						<div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal" onclick="closeEditModal();">
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
					<!--begin::Modal body--><form name="interest_group_edit_form" id="interest_group_edit_form" method="POST" action="<?php echo base_url(); ?>interestgroup/interest_group_update" enctype="multipart/form-data" onsubmit="return edit_interest_group_validation();">
						<input type="hidden" id="sno" name="sno" value="<?php echo $interest_group_details->INT_GROUP_SNO;?>">
						<div class="modal-body pt-0 pb-15 px-5 px-xl-20">
							<!--begin::Heading-->
							<div class="mb-13 text-center">
								<h1 class="mb-3">Modify Interest Group</h1>
							</div>

										<div class="row mb-6">
											<!--begin::Label-->
													<label class="col-lg-4 col-form-label required fw-semibold fs-6">Interest Group</label>
													<!--end::Label-->
													<!--begin::Col-->
													<div class="col-lg-8 fv-row fv-plugins-icon-container">
														<input type="text" id="interest_group_edit" name="interest_group" class="form-control form-control-lg form-control-solid" placeholder="Interest Group" Value="<?php echo $interest_group_details->INT_GROUP_NAME;?>" onkeyup="interest_group_unique_edit(this.value,'<?php echo $interest_group_details->INT_GROUP_SNO;?>');">
														<div class="fv-plugins-message-container invalid-feedback" id="interest_group_edit_err"></div>
													</div>
													<!--end::Col-->	
										</div>
											<!--begin::Actions-->
											<div class="row">
												<div class="col-lg-4"></div>
												<div class="col-lg-2">
													<div class="d-flex flex-center flex-row-fluid pt-12">
														<button type="reset" class="btn btn-secondary me-3" data-bs-dismiss="modal" onclick="closeEditModal();">Cancel</button>
													</div>
												</div>
												<div class="col-lg-6">
													<div class="d-flex flex-center flex-row-fluid pt-12">
														<button type="submit" class="btn btn-success">Save Changes</button>
													</div>
												</div>
											</div>
											<!--end::Actions-->
						</div>
					</form>
						<!--end::Modal body-->
				</div>
				<!--end::Modal content-->
			</div>
			<!--end::Modal dialog-->