
			<div class="modal-dialog modal-xl">
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
					<div class="modal-body pt-0 pb-15 px-5 px-xl-20">
						<!--begin::Heading-->
						<div class="mb-7 text-center">
							<h1>Update Journal Entry [Adjustments,Suspense]</h1>
						</div>
						<!--end::Heading-->
						<form id="general_validate" style="width: 100%;" method="POST" action="<?php echo base_url(); ?>journal/journal_update" enctype="multipart/form-data" onsubmit="return journal_edit_validation();">
							<input type="hidden" id="master_sno" name="master_sno" value="<?php echo $voucher_master_details->MASTER_SNO;?>">
							<div class="row">
								<div class="col-lg-8">
									<div class="row">
										<label class="col-lg-1 col-form-label required fw-semibold fs-6">Date</label>
										<div class="col-lg-3 fv-row">
											<div class="d-flex align-items-center">
												<input type="date" class="form-control form-control-solid" name="add_date_journals" placeholder="Select Date" id="add_date_journals_edit" value="<?php echo $voucher_master_details->TRANSDATE;?>" />
											</div>
											<div class="fv-plugins-message-container invalid-feedback" id="add_date_journals_edit_err"></div>
										</div>
										<label class="col-lg-1 col-form-label fw-semibold fs-6">Sno</label>
										<div class="col-lg-3 fv-row fv-plugins-icon-container">
											<input type="text" name="sno" id="sno_edit" class="form-control form-control-lg form-control-solid" value="<?php echo $voucher_master_details->DETAILS_SNO;?>" readonly>
											<div class="fv-plugins-message-container invalid-feedback"></div>
										</div>
										<div class="col-lg-3 fv-row fv-plugins-icon-container">
											<input type="text" name="detail_sno" id="detail_sno_edit" class="form-control form-control-lg form-control-solid" value="<?php echo $voucher_master_details->MASTER_SNO;?>" readonly>
											<div class="fv-plugins-message-container invalid-feedback" id="detail_sno_edit_err"></div>
										</div>
									</div>
								</div>
								<div class="col-lg-4">
									<div class="row">
										<label class="col-lg-3 col-form-label fw-bold fs-5">User :</label>
										<!-- <label class="col-lg-9 close-form close-form-solid fw-bold text-danger fs-4"><?php //echo $_SESSION['username'];?></label> -->
										<div class="col-lg-9 col-form-label">
											<label class="badge badge-primary text-black fw-bold fs-5"><?php echo $_SESSION['username'];?></label>
										</div>
									</div><br>
									<div class="row">
										<label class="col-lg-3 col-form-label fw-bold fs-5">Time :</label>
										<!-- <label class="col-lg-9 close-form close-form-solid fw-bold text-danger fs-4"><?php //date_default_timezone_set('Asia/Kolkata');echo date("d M Y h:i:sa"); ?></label> -->
										<div class="col-lg-9 col-form-label">
											<label class="badge badge-primary text-black fw-bold fs-5"><?php date_default_timezone_set('Asia/Kolkata');echo date("d M Y h:i:sa"); ?></label>
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-12">
									<div id="kt_docs_repeater_basic_add">
										<div class="form-group">
											<div id="mcontent_edit10">
												<?php $i=0;foreach($voucher_details as $vdet){
													?>
												<div class="row" id="mid_edit<?php echo $i;?>">
													<label class="col-lg-1 col-form-label fw-semibold fs-6">Ledger</label>
													<div class="col-lg-3">
														<input type="text" class="form-control form-control-lg form-control-solid" name="account_led_name[]" id="account_led_name_edit<?php echo $i;?>" onkeyup="ledger_autocomplete_edit(<?php echo $i;?>);" value="<?php echo $vdet['LEDGER_NAME'];?>">
														<input type="hidden" class="form-control form-control-lg form-control-solid" name="account_led_id[]" id="account_led_id_edit<?php echo $i;?>" value="<?php echo $vdet['LEDGER_SNO'];?>">
														<div class="fv-plugins-message-container invalid-feedback" id="account_led_id_edit_err<?php echo $i;?>"></div>
													</div>
													<label class="col-lg-1 col-form-label fw-semibold fs-6">Debit</label>
													<div class="col-lg-2">
														<input type="text" class="form-control mb-2 mb-md-0" placeholder="Enter Debit" name="debit[]" id="debit_edit<?php echo $i;?>" style="font-size: 17px !important;font-weight: 600 !important;" onkeypress="return isNumberKey(event,this);" onkeyup="getDebitAmountEdit(<?php echo $i;?>)" value="<?php echo $vdet['DEBIT']!='0.00'?$vdet['DEBIT']:'0';?>" onfocus="this.select();"/>
														<div class="fv-plugins-message-container invalid-feedback" id="debit_edit_err<?php echo $i;?>"></div>
													</div>
													<label class="col-lg-1 col-form-label fw-semibold fs-6">Credit</label>
													<div class="col-lg-2">
														<input type="text" class="form-control mb-2 mb-md-0" placeholder="Enter Credit" name="credit[]" id="credit_edit<?php echo $i;?>" style="font-size: 17px !important;font-weight: 600 !important;" onkeypress="return isNumberKey(event,this);" onkeyup="getCreditAmountEdit(<?php echo $i;?>)" value="<?php echo $vdet['CREDIT']!='0.00'?$vdet['CREDIT']:'0';?>" onfocus="this.select();"/>
														<div class="fv-plugins-message-container invalid-feedback" id="credit_edit_err<?php echo $i;?>"></div>
													</div>
													<?php if($i!=0){?>
													<div class="col-lg-2 fv-row">
														<a href="javascript:;" onclick="delete_journal_edit(<?php echo $i;?>)" class="btn btn-sm btn-danger mt-md-3"><i class="la la-trash-o fs-3"></i>Delete</a>
													</div>
													<?php }?>
												</div>
												<?php $i++;
											}?>
											</div>
										</div>
										<div class="col-lg-2 form-group fv-row">
											<a href="javascript:;" onclick="add_journal_edit()" class="btn btn-sm btn-outline btn-outline-solid btn-outline-warning btn-active-light-primary me-2">
											Add</a>
										</div>
									</div>
									<input type="hidden" id="acc_led_id_edit" value="<?php echo count((array)$voucher_details);?>">
								</div>
							</div>
							<div class="row">
								<label class="col-lg-1 col-form-label fw-semibold fs-6">Description</label>
								<div class="col-lg-3 fv-row fv-plugins-icon-container">
									<textarea class="form-control form-control-solid" rows="2" style="margin-top: 8px !important;" id="description_edit" name="description"><?php echo $voucher_master_details->DESCRIPTION;?></textarea>
								</div>
								<label class="col-lg-1 col-form-label required fw-semibold fs-6">Total</label>
								<div class="col-lg-2 fv-row">
									<input type="text" class="form-control mb-2 mb-md-0" value="<?php echo $voucher_master_details->AMOUNT;?>" style="font-size: 17px !important;font-weight: 600 !important;" id="total_debit_edit" name="total_debit" readonly/>
								</div>
								<div class="col-lg-1"></div>
								<div class="col-lg-2 fv-row">
									<input type="text" class="form-control mb-2 mb-md-0" value="<?php echo $voucher_master_details->AMOUNT;?>" style="font-size: 17px !important;font-weight: 600 !important;" id="total_credit_edit" name="total_credit" readonly/>
									<div class="fv-plugins-message-container invalid-feedback" id="amt_mismatch_edit_err"></div>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-3 fv-row fv-plugins-icon-container fv-plugins-bootstrap5-row-invalid">
									<div class="d-flex align-items-center">
										<label class="form-check form-check-inline form-check-solid me-5 is-invalid">
											<input class="form-check-input" name="communication[]" type="checkbox" value="1">
										</label>
										<span class="col-form-label fw-semibold fs-6">Save & Print</span>
									</div>
								</div>
								<!-- <div class="col-lg-3 fv-row fv-plugins-icon-container fv-plugins-bootstrap5-row-invalid">
									<div class="d-flex align-items-center">
										<label class="form-check form-check-inline form-check-solid me-5 is-invalid">
											<input class="form-check-input" name="show_party" id="show_party" type="checkbox">
										</label>
										<span class="col-form-label fw-semibold fs-6">Show Loans Parties</span>
									</div>
								</div> -->
								<!-- <div class="col-lg-1">
									<div class="d-flex flex-center flex-row-fluid pt-2">
										<button type="submit" class="btn btn-outline btn-outline-solid btn-outline-warning btn-active-light-primary me-10" data-bs-dismiss="modal">Print</button>
									</div>
								</div> -->
								<!-- <div class="col-lg-1">
									<div class="d-flex flex-center flex-row-fluid pt-2">
										<button type="reset" class="btn btn-secondary me-3" data-bs-dismiss="modal" onclick="closeEditModal();">Cancel</button>
									</div>
								</div>
								<div class="col-lg-2">
									<div class="d-flex flex-center flex-row-fluid pt-2">
										<button type="submit" class="btn btn-primary" id="save_changes_add_journals">Save Changes</button>
									</div>
								</div> -->
							</div>
							<div class="d-flex align-items-center justify-content-end mt-6">
								<button type="reset" class="btn btn-secondary me-3" data-bs-dismiss="modal" onclick="closeEditModal();">Cancel</button>
								<button type="submit" class="btn btn-primary" id="save_changes_add_journals">Save Changes</button>
							</div>
						</form>
					</div>
					<!--end::Modal body-->
				</div>
				<!--end::Modal content-->
			</div>
			<!--end::Modal dialog