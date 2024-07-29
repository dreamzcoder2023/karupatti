<!--begin::Modal dialog-->
			<div class="modal-dialog modal-lg">
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
					<!--begin::Modal body-->
					<form name="acc_ledger_edit_form" id="acc_ledger_edit_form" method="POST" action="<?php echo base_url(); ?>accountsledger/accountsledger_update" enctype="multipart/form-data" onsubmit="return acc_ledger_edit_validate()"> 
						<input type="hidden" id="ledger_sno_edit" name="ledger_sno_edit" value="<?php echo $acc_ledger_list->LEDGER_SNO;?>">
					<div class="modal-body pt-0 pb-15 px-5 px-xl-20">
						<!--begin::Heading-->
						<div class="mb-2 text-center">
							<h1 class="mb-3">Modify Ledger</h1>
						</div>
						<div class="row">
							<div class="col-lg-9"></div>
							<div class="col-lg-3">
								<label class="col-form-label fw-semibold fs-6">Code</label>
								<label class="col-form-label fw-semibold fs-6">: 
									<?php echo $acc_ledger_list->LEDGER_SNO;?>

								</label>
							</div>
						</div>
						
						<div class="row">
							<div class="col-lg-3">
											<!--begin::Label-->
							<label class=" col-form-label required fw-semibold fs-6">Ledger Name</label>
							</div>
							<!--end::Label-->
							<!--begin::Col-->
							<div class="col-lg-3">
							<!-- <div class="col-lg-4 fv-row fv-plugins-icon-container"> -->
								<input type="text" class="form-control form-control-lg form-control-solid" placeholder="Ledger Name" value="<?php echo $acc_ledger_list->LEDGER_NAME;?>" id="ledger_name_edit" name="ledger_name_edit" onkeyup="acc_ledger_unique_edit(this.value);">
								<div class="fv-plugins-message-container invalid-feedback" id="ledger_name_edit_err" name="ledger_name_edit_err"></div>
							</div>
							<!--end::Col-->
						<!-- </div>
						<div class="row"> -->
							
							<div class="col-lg-2">
							<label class=" col-form-label required fw-semibold fs-6">Acc Groups</label></div>
							<div class="col-lg-4">
							
							<!--begin::Col-->
							<!-- <div class="col-lg-4 fv-row fv-plugins-icon-container"> -->
								<!--begin::Select-->
								<select class="form-select form-select-solid" data-control="select2" name="under_grp_edit" id="under_grp_edit" onchange="return get_grp_details_edit(this.val)" >	
									<option value="">Select Groups</option>
									<?php 
										foreach($under_grp_list as $ulist)
										{
									?>
										<option value="<?php echo $ulist['GROUP_SNO']; ?>" <?php if( $ulist['GROUP_SNO']== $acc_ledger_list->GROUP_ID) {echo "selected";} ?>> <?php echo $ulist['GROUP_NAME'] ?></option>
									<?php 
										}
									?>
								</select>
								<div class="fv-plugins-message-container invalid-feedback" id="main_grp_name_edit_err" name="main_grp_name_edit_err"></div>
								<!--end::Select-->
							</div>
						</div>
						
						<div class="row">
							<label class="col-lg-3 col-form-label fw-semibold fs-6">Opg Balance</label>
							<!--end::Label-->
							<!--begin::Col-->
							<div class="col-lg-2 fv-row fv-plugins-icon-container">
								<input type="text" class="form-control form-control-lg form-control-solid" placeholder="0" value="<?php echo $acc_ledger_list->OP_BALANCE;?>" id="opg_bal_edit" name="opg_bal_edit">
								<div class="fv-plugins-message-container invalid-feedback"></div>
							</div>
							<!--end::Col-->
							<div class="col-lg-2 fv-row fv-plugins-icon-container">
								<!--begin::Select-->
								<select class="form-select form-select-solid" data-control="select2" data-hide-search="true" id="bal_side_edit" name="bal_side_edit">

									<option value="CR" <?php if($acc_ledger_list->OP_SIDE=='CR'){echo "selected"; } else {echo ""; } ?>>CR</option>				
									<option value="DR" <?php if($acc_ledger_list->OP_SIDE=='DR'){echo "selected"; } else {echo ""; } ?>>DR</option>
								</select>
								<!--end::Select-->
							</div>
								<label class="col-lg-2 col-form-label  fw-bold fs-6" id="main_grp_edit" name="main_grp_edit" style="color: blue;"><?php
								echo $acc_ledger_details->UNDER_GROUP; ?></label>

								<label class="col-lg-2 col-form-label  fw-bold fs-6" id="sub_grp_edit" name="sub_grp_edit" style="color: blue;"><?php  
										if($acc_ledger_details->AC_SUPER_ID==1 )
											{echo "ASSETS";}
										else if($acc_ledger_details->AC_SUPER_ID==2)
											{ echo "LIABILITIES"; }
										else if($acc_ledger_details->AC_SUPER_ID==3)
											{ echo "INCOME"; }
										else if($acc_ledger_details->AC_SUPER_ID==4)
											{ echo "EXPENSE"; }
									?></label>
						</div>
						<div class="row">
							<!--begin::Col-->
							<label class="col-lg-3 col-form-label fw-semibold fs-6">Remarks</label>
							<div class="col-lg-6 fv-row fv-plugins-icon-container">
								<textarea class="form-control" data-kt-autosize="true" rows="1" style="margin-top: 8px !important;" id="remarks_edit" name="remarks_edit"><?php echo $acc_ledger_list->DESCRIPTION; ?></textarea>
							</div>
							<!--end::Col-->
						</div><br>
						<div id="gaddr_edit" name="gaddr_edit" style="border: 1px solid black; padding: 20px; display: <?php if($acc_ledger_details->GETADDRESS=='Y'){echo "block"; } else { echo "none"; } ?>">
							<div class="row">
								<label class="col-lg-2 col-form-label fw-semibold fs-6">Address</label>
								<div class="col-lg-4 fv-row fv-plugins-icon-container"><textarea class="form-control" data-kt-autosize="true" rows="2" style="margin-top: 8px !important;" id="addr_edit" name="addr_edit"><?php echo $acc_ledger_list->ADDRESS.$acc_ledger_list->ADDRESS2;?></textarea></div>
							<!-- </div> -->
							<!-- <div class="row"> -->
								<label class="col-lg-2 col-form-label fw-semibold fs-6">City</label>
								<div class="col-lg-4 fv-row fv-plugins-icon-container">
								<input type="text" class="form-control form-control-lg form-control-solid" placeholder="City" value="<?php echo $acc_ledger_list->CITY;?>" id="city_edit" name="city_edit" >
								
								</div>
							</div>
							<div class="row">
								<label class="col-lg-2 col-form-label fw-semibold fs-6">State</label>
								<!--begin::Col-->
								<div class="col-lg-4 fv-row fv-plugins-icon-container">
									<!--begin::Select-->
									<select class="form-select form-select-solid" data-control="select2" name="state_edit" id="state_edit"  >	
										<option value="">Select States</option>
										<?php 
											$state=$this->db->query("SELECT * FROM STATES ORDER BY STATE_NAME")->result_array();

											foreach($state as $slist)
											{
										?>
											<option value="<?php echo $slist['STATE_NAME']; ?>" <?php if($slist['STATE_NAME']=='Tamil Nadu'){echo 'selected';} else {echo '';} ?> > <?php echo $slist['STATE_NAME']; ?></option>
										<?php 
											}
										?>
									</select>
									<!-- <div class="fv-plugins-message-container invalid-feedback" id=
									"main_grp_name_err" name="main_grp_name_err"></div> -->
									<!--end::Select-->
								</div>
							<!-- </div> -->
							<!-- <div class="row"> -->
								<label class="col-lg-2 col-form-label fw-semibold fs-6">Phone</label>
								<div class="col-lg-4 fv-row fv-plugins-icon-container">
								<input type="text" class="form-control form-control-lg form-control-solid" placeholder="phone" value="<?php echo $acc_ledger_list->PHONE;?>" id="phone_edit" name="phone_edit" >
								
							</div>
							</div>
							<div class="row">
								<label class="col-lg-2 col-form-label fw-semibold fs-6">Email</label>
								<div class="col-lg-4 fv-row fv-plugins-icon-container">
								<input type="text" class="form-control form-control-lg form-control-solid" placeholder="email" value="<?php echo $acc_ledger_list->EMAIL;?>" id="email_edit" name="email_edit" >
								
							</div>
							<!-- </div> -->
							<!-- <div class="row"> -->
								<label class="col-lg-2 col-form-label fw-semibold fs-6">GST IN</label>
								<div class="col-lg-4 fv-row fv-plugins-icon-container">
								<input type="text" class="form-control form-control-lg form-control-solid" placeholder="gst" value="<?php echo $acc_ledger_list->GST_NO;?>" id="gst_edit" name="gst_edit" >
								
								</div>
							</div>
							<div class="row">
								<label class="col-lg-2 col-form-label fw-semibold fs-6">PAN No</label>
								<div class="col-lg-4 fv-row fv-plugins-icon-container">
								<input type="text" class="form-control form-control-lg form-control-solid" placeholder="pan_no" value="<?php echo $acc_ledger_list->PAN_NO;?>" id="pan_no_edit" name="pan_no_edit" >
								
							</div>
							</div>
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
									<button type="submit" class="btn btn-success" >Save Changes</button>
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