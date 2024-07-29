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
					<form name="suppliers_edit_form" id="suppliers_edit_form" method="POST" action="<?php echo base_url(); ?>Suppliers/suppliers_update" enctype="multipart/form-data" onsubmit="return suppliers_validation_edit();">
						<input type="hidden" name="edit_suppliers" id="edit_suppliers" value="<?php echo $suppliers_list_edit->LEDGER_SNO;?>">
						<div class="modal-body pt-0 pb-15 px-5 px-xl-20">
						<!--begin::Heading-->
						<div class="mb-13 text-center">
							<h1 class="mb-3">Modify Supplier Details</h1>	
						</div>
						<!--end::Heading-->
						<div class="row">
							<div class="col-lg-6">
								<div style="padding: 10px 10px 10px 10px !important;box-shadow: 0 3px 6px #00002947;border-radius: 5px;background-color: white !important;">
									<!-- <div class="row">
										<label class="col-lg-5 col-form-label required fw-semibold fs-6">Supplier ID</label>
										<div class="col-lg-7 fv-row fv-plugins-icon-container">
											<input type="text" name="add_sup_id_supplier" id="" class="form-control form-control-lg form-control-solid" placeholder="Supplier ID" oninput="this.value = this.value.replace(/[^A-Za-z0-9/\\-]/g, '').replace(/(\..*)\./g, '$1');">
											<div class="fv-plugins-message-container invalid-feedback"></div>
										</div>
									</div> -->
									<!-- <div class="row">
										<label class="col-lg-5 col-form-label fw-semibold fs-6">Company</label>
										<div class="col-lg-7 fv-row fv-plugins-icon-container">
											<input type="text" name="company" class="form-control form-control-lg form-control-solid" placeholder="Company" oninput="this.value = this.value.replace(/[^A-Za-z]/g, '').replace(/(\..*)\./g, '$1');">
											<div class="fv-plugins-message-container invalid-feedback"></div>
										</div>
									</div> -->
									<div class="row">
										<label class="col-lg-5 col-form-label required fw-semibold fs-6">Supplier Name</label>
										<div class="col-lg-7 fv-row fv-plugins-icon-container">
											<input type="text" name="edit_suppname_supplier" id="edit_suppname_supplier" class="form-control form-control-lg form-control-solid" placeholder="Supplier Name"
											value="<?php echo $suppliers_list_edit->LEDGER_NAME;?>">
											<div class="fv-plugins-message-container invalid-feedback" id="edit_suppname_supplier_err"></div>
										</div>
									</div>

									<!-- <div class="row">
										<label class="col-lg-5 col-form-label required fw-semibold fs-6">Last Name</label>
										<div class="col-lg-7 fv-row fv-plugins-icon-container">
											<input type="text" name="add_lname_supplier" class="form-control form-control-lg form-control-solid" placeholder="Last Name" oninput="this.value = this.value.replace(/[^A-Za-z]/g, '').replace(/(\..*)\./g, '$1');">
											<div class="fv-plugins-message-container invalid-feedback"></div>
										</div>
									</div> -->
									<div class="row">
										<label class="col-lg-5 col-form-label required fw-semibold fs-6">Address</label>
										<div class="col-lg-7 fv-row fv-plugins-icon-container">
									
											<input type="text" name="edit_suppaddress_supplier" id="edit_suppaddress_supplier" class="form-control form-control-lg form-control-solid" placeholder="Supplier Name"
											value="<?php echo $suppliers_list_edit->ADDRESS;?>">
											<div class="fv-plugins-message-container invalid-feedback" id="edit_suppaddress_supplier_err"></div>
										</div>
									</div>
									<div class="row">
									<label class="col-lg-5 col-form-label fw-semibold fs-6">Zone</label>
								
										<div class="col-lg-7 fv-row fv-plugins-icon-container">
											<input type="text" name="edit_zone_supplier" id="edit_zone_supplier" class="form-control form-control-lg form-control-solid" placeholder="" oninput="this.value = this.value.replace(/[^A-Za-z]/g, '').replace(/(\..*)\./g, '$1');"
											value="<?php echo $suppliers_list_edit->ADDRESS2;?>">
											<div class="fv-plugins-message-container invalid-feedback"></div>
										</div>
									
									</div>
								<!-- 	<div class="row">
									<label class="col-lg-5 col-form-label fw-semibold fs-6">Area</label>
								
									<div class="col-lg-7 fv-row fv-plugins-icon-container">
										<input type="text" name="edit_area_supplier" id="edit_area_supplier" class="form-control form-control-lg form-control-solid" placeholder="">
										<div class="fv-plugins-message-container invalid-feedback"></div>
									</div>
								
									</div> -->
									<div class="row">
										<label class="col-lg-5 col-form-label required fw-semibold fs-6">City</label>
									<div class="col-lg-7 fv-row fv-plugins-icon-container">
										<input type="text" name="edit_city_supplier" id="edit_city_supplier" class="form-control form-control-lg form-control-solid" placeholder="" oninput="this.value = this.value.replace(/[^A-Za-z]/g, '').replace(/(\..*)\./g, '$1');"
										value="<?php echo $suppliers_list_edit->CITY;?>">
										<div class="fv-plugins-message-container invalid-feedback" id="edit_city_supplier"></div>
									</div>
									</div>
							<!-- 		<div class="row">
										<label class="col-lg-5 col-form-label fw-semibold fs-6">Village</label>
										<div class="col-lg-7 fv-row fv-plugins-icon-container">
										<input type="text" name="edit_village_supplier" id="edit_village_supplier" class="form-control form-control-lg form-control-solid" placeholder="" oninput="this.value = this.value.replace(/[^A-Za-z]/g, '').replace(/(\..*)\./g, '$1');">
										<div class="fv-plugins-message-container invalid-feedback"></div>
									</div>
									</div>
									<div class="row">
										<label class="col-lg-5 col-form-label fw-semibold fs-6">Street</label>
										<div class="col-lg-7 fv-row fv-plugins-icon-container">
										<input type="text" name="edit_street_supplier" id="edit_street_supplier" class="form-control form-control-lg form-control-solid" placeholder="" oninput="this.value = this.value.replace(/[^A-Za-z]/g, '').replace(/(\..*)\./g, '$1');">
										<div class="fv-plugins-message-container invalid-feedback"></div>
									</div>
									</div> -->
									<div class="row">
										<label class="col-lg-5 col-form-label required fw-semibold fs-6">State</label>
										<div class="col-lg-7 fv-row">
										<select class="form-select form-select-solid" data-control="select2" name="state_list_supplier_edit"  id="state_list_supplier_edit" data-hide-search="true">
									
										<option value="">Select State Name</option>
										<?php
										$j=1;
										foreach($states_list as $statelist)
										{
										?>
										<option value="<?php echo $statelist['STATE_NAME'];?>" 
											<?php if($statelist['STATE_NAME']==$suppliers_list_edit->STATE){echo "selected";}else{echo "";}?>><?php echo $statelist['STATE_NAME'];?>
											</option>
										<?php 
											$j++;
											}
										?>
										<!--end::Select-->	
									</select>
									<div class="fv-plugins-message-container invalid-feedback" id="state_list_supplier_edit_err"></div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-lg-6">
								<div style="padding: 10px 10px 10px 10px !important;box-shadow: 0 3px 6px #00002947;border-radius: 5px;background-color: white !important;">
									<div class="row">
										<label class="col-lg-5 col-form-label required fw-semibold fs-6">Account Group</label>
										<div class="col-lg-7 fv-row">
										<select class="form-select form-select-solid" data-control="select2" name="accgrp_list_supp_edit"  id="accgrp_list_supp_edit" data-hide-search="true">
										<!-- <option value="">Select Account Group</option> -->
											
											<option value="<?php echo 'SUPPLIERS';?>" <?php if($suppliers_list_edit->GROUP_NAME=='SUPPLIERS'){echo "selected";}else{echo "";}?>><?php echo 'Supplier';?></option>
											<option value="<?php echo 'Suppliers-karupatti';?>" <?php if($suppliers_list_edit->GROUP_NAME=='Karupatti-courier'){echo "selected";}else{echo "";}?>><?php echo 'Karupatti-courier';?></option>
											<option value="<?php echo 'Karupatti'; ?>"<?php if($suppliers_list_edit->GROUP_NAME=='Karupatti'){echo "selected";}else{echo "";}?>><?php echo 'Karupatti'; ?></option>
											<option value="<?php echo 'RE_AGENT'; ?>"<?php if($suppliers_list_edit->GROUP_NAME=='Realestate'){echo "selected";}else{echo "";}?>><?php echo 'Realestate'; ?></option>


										</select>
										<div class="fv-plugins-message-container invalid-feedback" id="accgrp_list_supp_edit_err"></div>
										</div>
									</div>
									<div class="row">
										<label class="col-lg-5 col-form-label required fw-semibold fs-6">Mobile</label>
										<div class="col-lg-7 fv-row fv-plugins-icon-container">
											<input type="text" name="edit_phone_supplier" id="edit_phone_supplier" class="form-control form-control-lg form-control-solid" placeholder="Mobile" value="<?php echo $suppliers_list_edit->PHONE;?>" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" onkeyup="suppliers_phone_unique_edit(this.value,<?php echo $suppliers_list_edit->PHONE;?>);" placeholder="Mobile number" pattern="^(?:(?:\+|0{0,2})91(\s*[\-]\s*)?|[0]?)?[6789]\d{9}$" title="Enter Valid mobile number ex.6311111111">
											<div class="fv-plugins-message-container invalid-feedback" id="edit_phone_supplier_err"></div>
										</div>
									</div>
									<div class="row">
										<label class="col-lg-5 col-form-label fw-semibold fs-6">Email ID</label>
										<div class="col-lg-7 fv-row fv-plugins-icon-container">
											<input type="text" name="edit_email_supplier" id="edit_email_supplier" class="form-control form-control-lg form-control-solid" placeholder="Email ID" value="<?php echo $suppliers_list_edit->EMAIL;?>">
											<div class="fv-plugins-message-container invalid-feedback"></div>
										</div>
									</div>
									<div class="row">
										<label class="col-lg-5 col-form-label required fw-semibold fs-6">ID NAME</label>
									<div class="col-lg-7 fv-row">
										<select class="form-select form-select-solid" data-control="select2" name="edit_id_ty_supplier"  id="edit_id_ty_supplier" data-hide-search="true">
											<option value="">Select ID Type</option>
											<?php
											$j=1;
											 foreach($idtype_list as $idtypelist)
											{
											?>
											<option value="<?php echo $idtypelist['IDTYPENAME'];?>" 
												<?php if($idtypelist['IDTYPENAME']==$suppliers_list_edit->IDTYPENAME){echo "selected";}else{echo "";}?>><?php echo $idtypelist['IDTYPENAME'];?></option>
											<?php 
												$j++;
												}
											?>
										</select>
										<div class="fv-plugins-message-container invalid-feedback" id="edit_id_ty_supplier_err"></div>
										</div>
									</div>
								<!-- 	<div class="row">
										<label class="col-lg-5 col-form-label required fw-semibold fs-6">ID No</label>
										<div class="col-lg-7 fv-row fv-plugins-icon-container">
											<input type="text" name="edit_id_no_supplier" id="edit_id_no_supplier" class="form-control form-control-lg form-control-solid" placeholder="ID Number" oninput="this.value = this.value.replace(/[^A-Za-z0-9/\\-]/g, '').replace(/(\..*)\./g, '$1');"
											value="< ?php echo $suppliers_list_edit->ID_NO;?>" >
											<div class="fv-plugins-message-container invalid-feedback"></div>
										</div>
									</div> -->
									<div class="row">
										<label class="col-lg-5 col-form-label fw-semibold fs-6">PAN No</label>
										<div class="col-lg-7 fv-row fv-plugins-icon-container">
											<input type="text" name="edit_pan_no_supplier" id="edit_pan_no_supplier" class="form-control form-control-lg form-control-solid" placeholder="PAN No" oninput="this.value = this.value.replace(/[^A-Za-z0-9]/g, '').replace(/(\..*)\./g, '$1');"
											value="<?php echo $suppliers_list_edit->PAN_NO;?>">
											<div class="fv-plugins-message-container invalid-feedback"></div>
										</div>
									</div>
									<!-- <div class="row">
										<label class="col-lg-5 col-form-label fw-semibold fs-6">CIN No</label>
										<div class="col-lg-7 fv-row fv-plugins-icon-container">
											<input type="text" name="edit_cin_no_supplier" class="form-control form-control-lg form-control-solid" placeholder="CIN No" oninput="this.value = this.value.replace(/[^A-Za-z0-9/\\-]/g, '').replace(/(\..*)\./g, '$1');"
											value="< ?php echo $suppliers_list_edit->CIN_NO;?>">
											<div class="fv-plugins-message-container invalid-feedback"></div>
										</div>
									</div> -->
									<div class="row">
										<label class="col-lg-5 col-form-label fw-semibold fs-6">GSTIN No</label>
										<div class="col-lg-7 fv-row fv-plugins-icon-container">
											<input type="text"  maxlength="15" name="edit_gstin_no_supplier" class="form-control form-control-lg form-control-solid" placeholder="GSTIN No" oninput="this.value = this.value.replace(/[^A-Za-z0-9/\\-]/g, '').replace(/(\..*)\./g, '$1');" value="<?php echo $suppliers_list_edit->GST_NO;?>">
											<div class="fv-plugins-message-container invalid-feedback"></div>
										</div>
									</div>
									<div class="row">
										<label class="col-lg-5 col-form-label required fw-semibold fs-6">Opening Balance</label>
										<div class="col-lg-4 fv-row fv-plugins-icon-container">
											<input type="text" name="edit_op_bal_supplier" id="edit_op_bal_supplier"class="form-control form-control-lg form-control-solid" placeholder="Opening Balance" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"
											value="<?php echo $suppliers_list_edit->OP_BALANCE;?>">
											<div class="fv-plugins-message-container invalid-feedback" id="edit_op_bal_supplier_err"></div>
										</div>
										<div class="col-lg-3 fv-row fv-plugins-icon-container">
										<select class="form-select form-select-solid" data-control="select2" name="edit_op_dr_supp"  id="edit_op_dr_supp" data-hide-search="true">

											<option value="CR"<?php if($suppliers_list_edit->OP_SIDE=='CR'){echo "selected";}else{echo "";}?>>CR</option>
											<option value="DR"<?php if($suppliers_list_edit->OP_SIDE=='DR'){echo "selected";}else{echo "";}?>>DR</option>
											
										</select>
										</div>
									</div>
									<div class="row">
										<label class="col-lg-5 col-form-label fw-semibold fs-6">Remarks</label>
										<div class="col-lg-7 fv-row fv-plugins-icon-container">

											<input type="text" name="edit_remarks_suppliers" class="form-control form-control-lg form-control-solid" placeholder="Opening Balance" 
											value="<?php echo $suppliers_list_edit->DESCRIPTION;?>">

											<div class="fv-plugins-message-container invalid-feedback"></div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!--begin::Actions-->
						<div class="row">
							<div class="col-lg-9"></div>
							<div class="col-lg-1">
								<div class="d-flex flex-center flex-row-fluid pt-12">
									<button type="reset" class="btn btn-secondary me-3" data-bs-dismiss="modal"
									>Cancel</button>
								</div>
							</div>
							<div class="col-lg-2">
								<div class="d-flex flex-center flex-row-fluid pt-12">
									<button type="submit" class="btn btn-primary" id="save_changes_edit_suppliers">Save Changes</button>
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

	<input type="hidden" id="baseurl" value="<?php echo base_url(); ?>">
		<!-- < ?php $this->load->view("script"); ?> -->