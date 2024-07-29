
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
				<h1 class="mb-3">View Scheme</h1>
			</div>
			<!--end::Heading-->
			<form name="intscheme_view_form" id="intscheme_view_form" method="POST" action="<?php echo base_url(); ?>interestscheme/intscheme_view" enctype="multipart/form-data">
				<div class="row">
					<div class="col-lg-6">
						<div style="padding:10px 10px 10px 10px !important;box-shadow: 0 3px 6px #00002947; border-radius: 5px; background-color: #f5f5f1 !important;">
							<div class="row">
								<label class="col-lg-4 col-form-label fw-semibold fs-6" >Company</label>
								<div class="col-lg-8 fv-row fv-plugins-icon-container">
									<input type="text" id="view_sl_company_int_scheme" name="view_sl_company_int_scheme" class="form-control form-control-lg form-control-solid" 
									value="<?php 
									if(is_null($interestscheme_view_details->COMPANYNAME))
									{echo '-'; }
									else{
										echo $interestscheme_view_details->COMPANYNAME; }?>" readonly>

									<!--if(count((array)$company_list_view)==0)
									{echo '-'; }
									else{
										echo $company_list_view->COMPANYNAME; }  -->
									
									<div class="fv-plugins-message-container invalid-feedback"></div>
								</div>
								<!-- <div class="col-lg-8 fv-row">
									<select class="form-select form-select-solid cdrop" data-control="select2" data-hide-search="true" name="view_sl_company_int_scheme" disabled>
										<option value="">Select Company</option>
										<?php
										$j=1;
										foreach($company_list_view as $intslist1_view)
										{

										?>
											<option value="<?php echo $intslist1_view['COMPANYCODE']; ?>" 
												<?php if($intslist1_view['COMPANYCODE']==$interestscheme_view_details->COMPANY){echo "selected";}else{echo "";}?> > <?php echo $intslist1_view['COMPANYNAME'];?></option>
										<?php 
											$j++;
											}
										?>
									</select>
								</div> -->
							</div>
							<div class="row">
								<label class="col-lg-4 col-form-label fw-semibold fs-6">Scheme Name</label>
								<div class="col-lg-8 fv-row fv-plugins-icon-container">
									<input type="text" id="view_sname_int_scheme" name="view_sname_int_scheme" class="form-control form-control-lg form-control-solid" placeholder="Scheme Name" value="<?php echo $interestscheme_view_details->INTNAME;?>" readonly>
									<div class="fv-plugins-message-container invalid-feedback"></div>
								</div>
							</div>
							<div class="row">
								<label class="col-lg-4 col-form-label fw-semibold fs-6" >Group</label>
								<div class="col-lg-8 fv-row fv-plugins-icon-container">
									<input type="text" id="view_sl_group_int_scheme" name="view_sl_group_int_scheme" class="form-control form-control-lg form-control-solid"
									 value="<?php 
									if(is_null($interestscheme_view_details->INT_GROUP))
									{echo '-'; }
									else{
										echo $interestscheme_view_details->INT_GROUP; }?>" readonly>
									<div class="fv-plugins-message-container invalid-feedback"></div>
								</div>
								<!-- <div class="col-lg-8 fv-row">
									<select class="form-select form-select-solid cdrop" data-control="select2" data-hide-search="true" name="view_sl_group_int_scheme" disabled>
										<option value="">Select Group</option>
										<?php
										$j=1;
										foreach($group_list_view as $grpslist1_view)
										{

										?>
											<option value="<?php echo $grpslist1_view['INT_GROUP']; ?>" 
												<?php if($grpslist1_view['INT_GROUP']==$interestscheme_view_details->INT_GROUP){echo "selected";}else{echo "";}?> > <?php echo $grpslist1_view['INT_GROUP'];?></option>
										<?php 
											$j++;
											}
										?>
									</select>
								</div> -->
							</div>
							<div class="row">
								<div class="col-lg-5 fv-row fv-plugins-icon-container fv-plugins-bootstrap5-row-invalid">
									<div class="d-flex align-items-center">
										<label class="form-check form-check-inline form-check-solid me-5 is-invalid">
											<input class="form-check-input" name="communication[]" type="checkbox" value="1" onclick="view_default_loan_type()" id="view_de_ln_ty" disabled>
										</label>
										<span class="col-form-label fw-semibold fs-6">Default Loan Type</span>
									</div>
								</div>
								<div class="col-lg-7 fv-row fv-plugins-icon-container" id="view_default_loan_type_tbox" style="display: none;">
									<input type="text" id="view_sl_def_ln_ty_int_scheme" name="view_sl_def_ln_ty_int_scheme" class="form-control form-control-lg form-control-solid"
									 value="<?php 
									if(is_null($interestscheme_view_details->LOAN_TYPE))
									{echo '-'; }
									else{
										echo $interestscheme_view_details->LOAN_TYPE; }?>" readonly>
									<div class="fv-plugins-message-container invalid-feedback"></div>
								</div>
								<!-- <div class="col-lg-7 fv-row" id="view_default_loan_type_tbox" style="display: none;">
									<select class="form-select form-select-solid cdrop" data-control="select2" data-hide-search="true" name="view_sl_def_ln_ty_int_scheme" disabled>
										<option value="">Select Default Loan Type</option>
										<option value="New" <?php if("New"==$interestscheme_view_details->LOAN_TYPE){echo "selected";}else{echo "";}?>>New</option>
										<option value="Renewal" <?php if("Renewal"==$interestscheme_view_details->LOAN_TYPE){echo "selected";}else{echo "";}?>>Renewal</option>
										<option value="Auctioned" <?php if("Auctioned"==$interestscheme_view_details->LOAN_TYPE){echo "selected";}else{echo "";}?>>Auctioned</option>
									</select>
								</div> -->
							</div>
						</div>
					</div>
					<div class="col-lg-6">
						<div style="padding:10px 10px 10px 10px !important;box-shadow: 0 3px 6px #00002947; border-radius: 5px; background-color: #f5f5f1 !important;">
							<div class="row">
								<label class="col-lg-4 col-form-label fw-semibold fs-6">Interest %</label>
								<div class="col-lg-8 fv-row fv-plugins-icon-container">
									<input type="text" name="view_interest_int_scheme" id="view_interest_int_scheme" class="form-control form-control-lg form-control-solid" placeholder="Interest %" value="<?php echo $interestscheme_view_details->INTEREST;?>" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" readonly>
									<div class="fv-plugins-message-container invalid-feedback"></div>
								</div>
							</div>
							<div class="row">
								<label class="col-lg-4 col-form-label fw-semibold fs-6">Loan Period</label>
								<div class="col-lg-3 fv-row fv-plugins-icon-container">
									<input type="text" name="view_ln_period_int_scheme" id="view_ln_period_int_scheme" class="form-control form-control-solid" value="<?php echo $interestscheme_view_details->PERIOD;?>" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" readonly>
									<div class="fv-plugins-message-container invalid-feedback"></div>
								</div>
								<div class="col-lg-5 fv-row fv-plugins-icon-container">
									<input type="text" id="view_lp_type_int_scheme" name="view_lp_type_int_scheme" class="form-control form-control-lg form-control-solid"
									 value="<?php 
									if(is_null($interestscheme_view_details->LP_TYPE))
									{echo '-'; }
									else{
										echo $interestscheme_view_details->LP_TYPE; }?>" readonly>
									<div class="fv-plugins-message-container invalid-feedback"></div>
								</div>
								<!-- <div class="col-lg-5 fv-row">
									<select class="form-select form-select-solid cdrop" data-control="select2" data-hide-search="true" name="view_lp_type_int_scheme" disabled>
										<option value="">Select Period Type</option>
											<option value="Months" <?php if("Months"==$interestscheme_view_details->LP_TYPE){echo "selected";}else{echo "";}?>>Month</option>
											<option value="Days" <?php if("Days"==$interestscheme_view_details->LP_TYPE){echo "selected";}else{echo "";}?>>Days</option>
									</select>
								</div> -->
							</div>
							<div class="row">
								<label class="col-lg-4 col-form-label fw-semibold fs-6">Max Period</label>
								<div class="col-lg-3 fv-row fv-plugins-icon-container">
									<input type="text" id="view_mx_period_int_scheme" name="view_mx_period_int_scheme" class="form-control form-control-solid" value="<?php echo $interestscheme_view_details->MAXPERIOD;?>" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" readonly>
									<div class="fv-plugins-message-container invalid-feedback"></div>
								</div>
								<div class="col-lg-5 fv-row fv-plugins-icon-container">
									<input type="text" name="view_mp_type_int_scheme" id="view_mp_type_int_scheme" class="form-control form-control-lg form-control-solid"
									 value="<?php 
									if(is_null($interestscheme_view_details->MP_TYPE))
									{echo '-'; }
									else{
										echo $interestscheme_view_details->MP_TYPE; }?>" readonly>
									<div class="fv-plugins-message-container invalid-feedback"></div>
								</div>
								<!-- <div class="col-lg-5 fv-row">
									<select class="form-select form-select-solid cdrop" data-control="select2" data-hide-search="true" name="view_mp_type_int_scheme" disabled>
											<option value="">Select Period Type</option>
											<option value="Months" <?php if("Months"==$interestscheme_view_details->MP_TYPE){echo "selected";}else{echo "";}?>>Month</option>
											<option value="Days" <?php if("Days"==$interestscheme_view_details->MP_TYPE){echo "selected";}else{echo "";}?>>Days</option>
									</select>
								</div> -->
							</div>
						</div>
					</div>
				</div>	
				<!-- <div class="row">
					<div class="col-lg-9"></div>
					<div class="col-lg-1">
						<div class="d-flex flex-center flex-row-fluid pt-12">
							<button type="reset" class="btn btn-secondary me-3" data-bs-dismiss="modal" onclick="closeViewModal();">Cancel</button>
						</div>
					</div>
					<div class="col-lg-2">
						<div class="d-flex flex-center flex-row-fluid pt-12">
							<button type="submit" class="btn btn-primary" id="save_changes_view_int_scheme">Save Changes</button>
						</div>
					</div>
				</div> -->
				<!--end::Actions-->
				<input type="hidden" id="view_intid" name="view_intid" value="<?php echo $interestscheme_view_details->INTID;?>">
			</form>
		</div>
		<!--end::Modal body-->
	</div>
	<!--end::Modal content-->
</div>
<!--end::Modal dialog-->
		