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
					<form name="bank_edit_form" id="bank_edit_form" method="POST" action="<?php echo base_url(); ?>bank/bank_update" enctype="multipart/form-data" onsubmit="return bank_edit_validation();">
						<input type="hidden" id="bank_id" name="bank_id" value="<?php echo $bank_details->SNO;?>">
					<div class="modal-body pt-0 pb-15 px-5 px-xl-20">
						<!--begin::Heading-->
						<div class="mb-13 text-center">
							<h1 class="mb-3">Modify Bank</h1>
						</div>
						<!--end::Heading-->

						<div class="row mb-6">
												<!--begin::Label-->
												<label class="col-lg-1 col-form-label required fw-semibold fs-6">Bank</label>
												<!--end::Label-->
												<!--begin::Col-->
												<div class="col-lg-3 fv-row fv-plugins-icon-container">
													<input type="text" name="bank_name" id="bank_name_edit" class="form-control form-control-lg form-control-solid" placeholder="Bank Name" required  value="<?php echo $bank_details->BANKNAME;?>">
													<div class="fv-plugins-message-container invalid-feedback" name="bank_name_edit_err" id="bank_name_err"></div>
												</div>
												<!--end::Col-->
												
												<!--begin::Label-->
												<label class="col-lg-1 col-form-label required fw-semibold fs-6">Branch</label>
												<!--end::Label-->
												<!--begin::Col-->
												<div class="col-lg-3 fv-row fv-plugins-icon-container">
													<input type="text" name="branch_name" id="branch_name_edit" class="form-control form-control-lg form-control-solid" placeholder="Branch/Place" value="<?php echo $bank_details->BRANCH;?>">
													<div class="fv-plugins-message-container invalid-feedback" name="branch_name_err" id="branch_name_edit_err"></div>
												</div>
												<!--end::Col-->
												
												<!--begin::Label-->
												<label class="col-lg-1 col-form-label  fw-semibold fs-6">IFSC</label>
												<!--end::Label-->
												<!--begin::Col-->
												<div class="col-lg-3 fv-row fv-plugins-icon-container">
													<input type="text" name="ifsc" id="ifsc" class="form-control form-control-lg form-control-solid" placeholder="IFSC Code" value="<?php echo $bank_details->IFSC;?>">
													<div class="fv-plugins-message-container invalid-feedback"></div>
												</div>
												<!--end::Col-->
												
												<!--begin::Label-->
												<label class="col-lg-1 col-form-label  fw-semibold fs-6">Company</label>
												<!--end::Label-->
												<!--begin::Left Section-->
												<div class="col-lg-3">
													<!--begin::Select-->
													<select class="form-select form-select-solid" data-control="select2" data-placeholder="Select Zone" data-hide-search="true" name="company" id="company" >

														<option value="">Select Company</option>	
														<?php 
														
															$qry=$this->db->query("SELECT  COMPANYCODE,COMPANYNAME FROM COMPANY WHERE ACTIVE='Y'");
															$res=$qry->result();
															foreach ($res as $comp_list) 
															{
																?>
																<option value="<?php echo $comp_list->COMPANYCODE; ?>"
																	<?php 
																	if($bank_details->COMPANYCODE == $comp_list->COMPANYCODE)
																	{
																		echo "selected";
																	}
																	else
																	{

																	}
																	?>> <?php echo $comp_list->COMPANYNAME; ?></option>
																<?php
															}
															?> 	
													</select>
												</div>
													<!--end::Select-->
												<!--end::Col-->
												<!--begin::Label-->
												<label class="col-lg-1 col-form-label  fw-semibold fs-6">Address</label>
												<!--end::Label-->
												<!--begin::Col-->
												<div class="col-lg-3 fv-row fv-plugins-icon-container">
													<input type="text" name="address" id="address" class="form-control form-control-lg form-control-solid" placeholder="Address" value="<?php echo $bank_details->ADDRESS;?>">
													<div class="fv-plugins-message-container invalid-feedback"></div>
												</div>
												<!--end::Col-->
												<!--begin::Label-->
												<label class="col-lg-1 col-form-label  fw-semibold fs-6">A/C No</label>
												<!--end::Label-->
												<!--begin::Col-->
												<div class="col-lg-3 fv-row fv-plugins-icon-container">
													<input type="text" name="acc_no" id="acc_no" class="form-control form-control-lg form-control-solid" placeholder="Account Number" value="<?php echo $bank_details->ACCOUNTNO;?>">
													<div class="fv-plugins-message-container invalid-feedback"></div>
												</div>
												<!--end::Col-->
												<!--begin::Label-->
												<label class="col-lg-1 col-form-label  fw-semibold fs-6">Name</label>
												<!--end::Label-->
												<!--begin::Col-->
												<div class="col-lg-3 fv-row fv-plugins-icon-container">
													<input type="text" name="person_name" id="person_name" class="form-control form-control-lg form-control-solid" placeholder="Person Name" value="<?php echo $bank_details->PERSONNAME;?>">
													<div class="fv-plugins-message-container invalid-feedback"></div>
												</div>
												<!--end::Col-->
					     </div>
						<!--begin::Actions-->
						<div class="row">
							<div class="col-lg-9"></div>
							<div class="col-lg-1">
								<div class="d-flex flex-center flex-row-fluid pt-12">
									<button type="reset" class="btn btn-secondary me-3" data-bs-dismiss="modal" >Cancel</button>
								</div>
							</div>
							<div class="col-lg-2">
								<div class="d-flex flex-center flex-row-fluid pt-12">
									<button type="submit" class="btn btn-primary" data-bs-dismiss="modal"  >Save Changes</button>
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