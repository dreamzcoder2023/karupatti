
<!--begin::Modal dialog-->
<div class="modal-dialog modal-xl">
	<!--begin::Modal content-->
	<div class="modal-content rounded">
		<!--begin::Modal header-->
		<div class="modal-header justify-content-end border-0 pb-0">
			<!--begin::Close-->
			<div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal" onclick="closeViewModal();">
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
				<h1 class="mb-3">Modify Scheme</h1>
			</div>
			<!--end::Heading-->
			<form name="intscheme_edit_form" id="intscheme_edit_form" method="POST" action="<?php echo base_url(); ?>interestscheme/interestscheme_update" enctype="multipart/form-data" onsubmit="return interest_scheme_validation_edit();">
				<div class="row">
					<div class="col-lg-6">
						<div style="padding:10px 10px 10px 10px !important;box-shadow: 0 3px 6px #00002947; border-radius: 5px; background-color: #f5f5f1 !important;">
							<div class="row">
								<label class="col-lg-4 col-form-label required fw-semibold fs-6" >Company</label>
								<div class="col-lg-8 fv-row">
									<select class="form-select form-select-solid cdrop" data-control="select2" data-hide-search="true" id="company_edit_err_tbox" name="edit_sl_company_int_scheme">
										<option value="">Select Company</option>
										<?php
										$j=1;
										foreach($company_list as $intslist1)
										{

										?>
											<option value="<?php echo $intslist1['COMPANYCODE']; ?>" 
												<?php if($intslist1['COMPANYCODE']==$interestscheme_edit_details->COMPANY){echo "selected";}else{echo "";}?> > <?php echo $intslist1['COMPANYNAME'];?></option>
										<?php 
											$j++;
											}
										?>
									</select>
									<div class="fv-plugins-message-container invalid-feedback" id="company_edit_err"></div>
								</div>
							</div>
							<div class="row">
								<label class="col-lg-4 col-form-label required fw-semibold fs-6">Scheme Name</label>
								<div class="col-lg-8 fv-row fv-plugins-icon-container">
									<input type="text" name="edit_sname_int_scheme" class="form-control form-control-lg form-control-solid" onkeyup="scheme_name_unique_edit(this.value);" placeholder="Scheme Name" id="scheme_name_edit_err_tbox" value="<?php echo $interestscheme_edit_details->INTNAME;?>" oninput="this.value = this.value.replace(/[^A-Za-z0-9.-]/g, '').replace(/(\..*)\./g, '$1');">
									<div class="fv-plugins-message-container invalid-feedback" id="scheme_name_edit_err"></div>
								</div>
							</div>
							<div class="row">
								<label class="col-lg-4 col-form-label required fw-semibold fs-6" >Group</label>
								<div class="col-lg-8 fv-row">
									<select class="form-select form-select-solid cdrop" data-control="select2" data-hide-search="true" id="group_name_edit_err_tbox" name="edit_sl_group_int_scheme">
										<option value="">Select Group</option>
										<?php
										$j=1;
										foreach($group_list as $grpslist1)
										{

										?>
											<option value="<?php echo $grpslist1['INT_GROUP']; ?>" 
												<?php if($grpslist1['INT_GROUP']==$interestscheme_edit_details->INT_GROUP){echo "selected";}else{echo "";}?> > <?php echo $grpslist1['INT_GROUP'];?></option>
										<?php 
											$j++;
											}
										?>
									</select>
									<div class="fv-plugins-message-container invalid-feedback" id="group_name_edit_err"></div>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-5 fv-row fv-plugins-icon-container fv-plugins-bootstrap5-row-invalid">
									<div class="d-flex align-items-center">
										<label class="form-check form-check-inline form-check-solid me-5 is-invalid">
											<input class="form-check-input" name="edit_de_ln_ty" type="checkbox"  onclick="edit_default_loan_type()" id="edit_de_ln_ty">
											<!-- <input type="hidden" id="default_loan_type" value="<?php echo "$company_name->ACTIVECOMPANY";?>"> -->
										</label>
										<span class="col-form-label fw-semibold fs-6">Default Loan Type</span>
									</div>
									<div class="fv-plugins-message-container invalid-feedback" id="loan_ty_edit_err_check"></div>
								</div>
								<div class="col-lg-7 fv-row" id="edit_default_loan_type_tbox" style="display: none;">
									<select class="form-select form-select-solid cdrop" data-control="select2" data-hide-search="true" id="loan_type_edit_err_tbox" name="edit_sl_def_ln_ty_int_scheme">
										<option value="">Select Default Loan Type</option>
										<option value="New" <?php if("New"==$interestscheme_edit_details->LOAN_TYPE){echo "selected";}else{echo "";}?>>New</option>
										<option value="Renewal" <?php if("Renewal"==$interestscheme_edit_details->LOAN_TYPE){echo "selected";}else{echo "";}?>>Renewal</option>
										<option value="Auctioned" <?php if("Auctioned"==$interestscheme_edit_details->LOAN_TYPE){echo "selected";}else{echo "";}?>>Auctioned</option>
									</select>
									<div class="fv-plugins-message-container invalid-feedback" id="loan_type_edit_err"></div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-6">
						<div style="padding:10px 10px 10px 10px !important;box-shadow: 0 3px 6px #00002947; border-radius: 5px; background-color: #f5f5f1 !important;">
							<div class="row">
								<label class="col-lg-4 col-form-label required fw-semibold fs-6">Interest %</label>
								<div class="col-lg-8 fv-row fv-plugins-icon-container">
									<input type="text" id="interest_edit_err_tbox" name="edit_interest_int_scheme" class="form-control form-control-lg form-control-solid" placeholder="Interest %" value="<?php echo $interestscheme_edit_details->INTEREST;?>" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
									<div class="fv-plugins-message-container invalid-feedback" id="interest_edit_err"></div>
								</div>
							</div>
							<div class="row">
								<label class="col-lg-4 col-form-label required fw-semibold fs-6">Loan Period</label>
								<div class="col-lg-3 fv-row fv-plugins-icon-container">
									<input type="text" name="edit_ln_period_int_scheme" id="loan_period_edit_err_tbox" class="form-control form-control-solid" value="<?php echo $interestscheme_edit_details->PERIOD;?>" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">
									<div class="fv-plugins-message-container invalid-feedback" id="loan_period_edit_err"></div>
								</div>
								<div class="col-lg-5 fv-row">
									<select class="form-select form-select-solid cdrop" data-control="select2" data-hide-search="true" name="edit_lp_type_int_scheme" id="loan_period_type_edit_err_tbox">
										<option value="">Select Period Type</option>
											<option value="Months" <?php if("Months"==$interestscheme_edit_details->LP_TYPE){echo "selected";}else{echo "";}?>>Month</option>
											<option value="Days" <?php if("Days"==$interestscheme_edit_details->LP_TYPE){echo "selected";}else{echo "";}?>>Days</option>
									</select>
									<div class="fv-plugins-message-container invalid-feedback" id="loan_period_type_edit_err"></div>
								</div>
							</div>
							<div class="row">
								<label class="col-lg-4 col-form-label required fw-semibold fs-6">Max Period</label>
								<div class="col-lg-3 fv-row fv-plugins-icon-container">
									<input type="text" id="max_period_edit_err_tbox" name="edit_mx_period_int_scheme" class="form-control form-control-solid" value="<?php echo $interestscheme_edit_details->MAXPERIOD;?>" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">
									<div class="fv-plugins-message-container invalid-feedback" id="max_period_edit_err"></div>
								</div>
								<div class="col-lg-5 fv-row">
									<select class="form-select form-select-solid cdrop" data-control="select2" data-hide-search="true" name="edit_mp_type_int_scheme" id="max_period_type_edit_err_tbox">
											<option value="">Select Period Type</option>
											<option value="Months" <?php if("Months"==$interestscheme_edit_details->MP_TYPE){echo "selected";}else{echo "";}?>>Month</option>
											<option value="Days" <?php if("Days"==$interestscheme_edit_details->MP_TYPE){echo "selected";}else{echo "";}?>>Days</option>
									</select>
									<div class="fv-plugins-message-container invalid-feedback" id="max_period_type_edit_err"></div>
								</div>
							</div>
						</div>
					</div>
				</div>	
				<div class="row">
					<div class="col-lg-9"></div>
					<div class="col-lg-1">
						<div class="d-flex flex-center flex-row-fluid pt-12">
							<button type="reset" class="btn btn-secondary me-3" data-bs-dismiss="modal" onclick="closeEditModal();">Cancel</button>
						</div>
					</div>
					<div class="col-lg-2">
						<div class="d-flex flex-center flex-row-fluid pt-12">
							<button type="submit" class="btn btn-primary" id="save_changes_edit_int_scheme">Save Changes</button>
						</div>
					</div>
				</div>
				<!--end::Actions-->
				<input type="hidden" id="edit_intid" name="edit_intid" value="<?php echo $interestscheme_edit_details->INTID;?>">
			</form>
		</div>
		<!--end::Modal body-->
	</div>
	<!--end::Modal content-->
</div>
<!--end::Modal dialog-->
		