<!--begin::Modal dialog-->
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
							<h1>Modify On Account - Handloan Receipts Entry</h1>
						</div>
						<!--end::Heading-->
						<form id="general_validate" style="width: 100%;" method="POST" action="<?php echo base_url(); ?>handloanreceipt/handloanreceipt_update" enctype="multipart/form-data" onsubmit="return handloanreceipt_edit_validation();">
							<input type="hidden" id="vHLTransNo" name="vHLTransNo" value="<?php echo $hl_payment_details->HL_TRANS_SNO;?>">
							<input type="hidden" id="voucher_master_sno" name="voucher_master_sno" value="<?php echo $hl_payment_details->VOUCHER_SNO;?>">
							<input type="hidden" id="vHLPaymentNo" name="vHLPaymentNo" value="<?php echo $hl_payment_details->HL_SNO;?>">
							<div class="row">
								<label class="col-lg-1 col-form-label required fw-semibold fs-6">Date</label>
								<div class="col-lg-2 fv-row">
									<div class="d-flex align-items-center">
										
										<!-- <input class="form-control form-control-solid ps-12" name="add_date_hand_loan_receipt" placeholder="Date" id="kt_datepicker_add_hand_loan_receipt_date" value="<?php //echo date("d m Y"); ?>"/> -->
										<input type="date" class="form-control form-control-solid" name="add_date_hand_loan_receipts" placeholder="Select Date" id="add_date_hand_loan_receipts_edit" value="<?php echo $voucher_master_details->TRANSDATE;?>" />
									</div>
									<div class="fv-plugins-message-container invalid-feedback" id="add_date_hand_loan_receipts_edit_err"></div>
								</div>
								<!--end::Col-->
								<div class="col-lg-1"></div>
								<!--begin::Label-->
								<label class="col-lg-1 col-form-label fw-semibold fs-6">Type</label>
								<!--end::Label-->
								<!--begin::Left Section-->
								<div class="col-lg-2">
									<input type="text" name="type" id="type_edit" class="form-control form-control-lg1 form-control-solid" placeholder="Type" Value="Advance" readonly>
								</div>
								<!--end::Left Section-->
								<div class="col-lg-1"></div>
								<!--begin::Label-->
								<label class="col-lg-1 col-form-label fw-semibold fs-6">#S.No</label>
								<!--end::Label-->
								<!--begin::Col-->
								<div class="col-lg-2 fv-row fv-plugins-icon-container">
									<input type="text" name="sno" id="sno_edit" class="form-control form-control-lg1 form-control-solid" placeholder="Party Name" Value="<?php echo $voucher_master_details->DETAILS_SNO;?>" style="background-color: #e6e7d1 !important; border-radius: 0px; border: none;" readonly>
									<div class="fv-plugins-message-container invalid-feedback"></div>
								</div>
								<!--end::Col-->
							</div>
							<div class="row">
								<div class="col-lg-6">
									<div class="row">
								        <div class="d-flex flex-column fv-row">
								            <div class="form-check form-check-custom form-check-solid">
								                <div class="col-lg-4">
									                <input class="form-check-input2 me-3" type="radio" id="select_int_handpay_report_edit" name="int_radio_handpay_report_edit" value="lno" <?php echo $hl_payment_details->BILLNO!=''?'checked':'';?> onclick="getRadioValueEdit();" />
									                <label class="form-check-label">
									                    <div class="fw-semibold required text-gray-800">Loan No</div>
									                </label>
									            </div>
								                <div class="col-lg-6 fv-row fv-plugins-icon-container">
													<!-- <input type="text" class="form-control form-control-lg form-control-solid" id="loan_no" name="loan_no"> -->
													<input type="text" class="form-control form-control-lg form-control-solid" name="loan_no" id="loan_no_edit" onkeyup="loan_autocomplete_edit();" <?php echo $hl_payment_details->BILLNO==''?'readonly':'';?> value="<?php echo $hl_payment_details->BILLNO;?>">
													<input type="hidden" class="form-control form-control-lg form-control-solid" name="loan_party_id" id="loan_party_id_edit" value="<?php echo $hl_payment_details->PID;?>">
													<div class="fv-plugins-message-container invalid-feedback" id="loan_no_edit_err"></div>
												</div>
								            </div>
								            <div class="form-check form-check-custom form-check-solid">
								            	<div class="col-lg-4">
									                <input class="form-check-input2 me-3" type="radio" id="int_group_handpay_report_edit" name="int_radio_handpay_report_edit" value="pname" <?php echo $hl_payment_details->BILLNO==''?'checked':'';?> onclick="getRadioValueEdit();"/>
									                <label class="form-check-label" for="kt_docs_formvalidation_radio_option_2">
									                    <div class="fw-semibold required text-gray-800">Party Name</div>
									                </label>
									            </div>
								                <div class="col-lg-6 fv-row fv-plugins-icon-container">
													<!-- <input type="text" class="form-control form-control-lg form-control-solid" id="int_group_tbox_handpay_report" name="int_radio_tbox_handpay_report"> -->
													<input type="text" class="form-control form-control-lg form-control-solid" name="party_name" id="party_name_edit" onkeyup="party_autocomplete_edit();" <?php echo $hl_payment_details->BILLNO!=''?'readonly':'';?> value="<?php echo $party_details->NAME;?>">
													<input type="hidden" class="form-control form-control-lg form-control-solid" name="party_id" id="party_id_edit" value="<?php echo $hl_payment_details->PID;?>">
													<div class="fv-plugins-message-container invalid-feedback" id="party_name_edit_err"></div>
												</div>
								            </div>
								        </div>
									</div>
									<div class="row">
										<!--begin::Label-->
										<label class="col-md-4 col-form-label required fw-semibold fs-6">Amount</label>
										<!--end::Label-->
										<!--begin::Col-->
										<div class="col-lg-6 fv-row fv-plugins-icon-container">
											<input type="text" name="amount" id="amount_edit" class="form-control form-control-lg1 form-control-solid" style="font-size: 17px !important;font-weight: 600 !important;"onkeypress="return isNumberKey(event,this);" value="<?php echo $hl_payment_details->AMOUNT;?>">
											<div class="fv-plugins-message-container invalid-feedback" id="amount_edit_err"></div>
										</div>
										<!--end::Col-->	
									</div>
									<?php $leddet = $this->Handloanreceipt_model->get_ledger_details_by_name($hl_payment_details->PAID_BY);?>
									<div class="row">
										<label class="col-lg-4 col-form-label required fw-semibold fs-6">Paid From</label>
										<div class="col-lg-6 fv-row">
											<!--begin::Select-->
											<!-- <select class="form-select form-select-solid" name="add_paid_from_hand_loan_receipt" data-control="select2" data-hide-search="true">	
												<option value="">Select</option>
												<option value="0">Ayyanar TMB A/c 306519</option>				
												<option value="1">Cash</option>
												<option value="2">Esakki PGB A/c</option>
											</select> -->
											<input type="text" class="form-control form-control-lg form-control-solid" name="paid_from" id="paid_from_edit" onkeyup="paid_ledger_autocomplete_edit();" value="<?php echo $hl_payment_details->PAID_BY;?>">
											<input type="hidden" class="form-control form-control-lg form-control-solid" name="paid_from_id" id="paid_from_id_edit" value="<?php echo $leddet->LEDGER_SNO;?>">
											<div class="fv-plugins-message-container invalid-feedback" id="paid_from_edit_err"></div>
										</div>
									</div>	
									<div class="row">
										<!--begin::Label-->
										<label class="col-md-4 col-form-label fw-semibold fs-6">Description</label>
										<!--end::Label-->
										<!--begin::Col-->
											<div class="col-lg-6 fv-row fv-plugins-icon-container">
												<textarea class="form-control form-control-solid" rows="4" id="description_edit" name="description"><?php echo $hl_payment_details->REMARKS;?></textarea>
												<div class="fv-plugins-message-container invalid-feedback"></div>
											</div>
										<!--end::Col-->
									</div>
									<div class="row">
										<!--begin--Actions-->
										<!-- <div class="col-lg-4 fv-row fv-plugins-icon-container fv-plugins-bootstrap5-row-invalid">
											<div class="d-flex align-items-center mt-3">
												<label class="form-check form-check-inline form-check-solid me-5 is-invalid">
													<input class="form-check-input" name="communication[]" type="checkbox">
												</label>
												<span class="col-form-label fw-semibold fs-6">Save & Print</span>
											</div>
										</div> -->
									</div>
									<div class="d-flex align-items-center justify-content-center mt-4">
										<button class="btn btn-secondary me-3" data-bs-dismiss="modal"  onclick="closeEditModal();">Cancel</button>
										<button type="submit" class="btn btn-primary" id="save_add_hand_loan_receipt">Save</button>
									</div>
								</div>
								<div class="col-lg-6">
									<div class="row">
										<!--begin::Label-->
										<label class="col-lg-4 col-form-label fw-semibold fs-6">Party ID</label>
										<!--end::Label-->
										<!--begin::Col-->
										<div class="col-lg-8 fv-row fv-plugins-icon-container">
											<input type="text" name="pid" id="pid_edit" class="form-control form-control-lg1 form-control-solid" placeholder="Party ID" readonly value="<?php echo $party_details->PID;?>">
											<div class="fv-plugins-message-container invalid-feedback"></div>
										</div>
										<!--end::Col-->
									</div>
									<div class="row">
										<!--begin::Label-->
										<label class="col-lg-4 col-form-label fw-semibold fs-6">Name</label>
										<!--end::Label-->
										<!--begin::Col-->
										<div class="col-lg-8 fv-row fv-plugins-icon-container">
											<input type="text" name="pname" id="pname_edit" class="form-control form-control-lg1 form-control-solid" placeholder="Party Name" readonly value="<?php echo $party_details->NAME;?>">
											<div class="fv-plugins-message-container invalid-feedback"></div>
										</div>
										<!--end::Col-->
									</div>
									<div class="row">
										<!--begin::Label-->
										<label class="col-lg-4 col-form-label fw-semibold fs-6">Last Name</label>
										<!--end::Label-->
										<div class="col-lg-3">
											<!-- <select class="form-select form-select-solid" data-control="select2" data-hide-search="true" id="select_interest_tbox_rem_report" name="int_radio_tbox_rem_report">	
												<option value="0">S/o</option>
												<option value="1">W/o</option>				
												<option value="2">H/o</option>
												<option value="3">D/o</option>
											</select> -->
											<input type="text" name="lname_prefix" id="lname_prefix_edit" class="form-control form-control-lg1 form-control-solid" placeholder="Prefix" readonly value="<?php echo $party_details->LASTNAME_PREFIX;?>">
										</div>
										<!--begin::Col-->
										<div class="col-lg-5 fv-row fv-plugins-icon-container">
											<input type="text" name="fname" id="fname_edit" class="form-control form-control-lg1 form-control-solid" placeholder="Last Name" readonly value="<?php echo $party_details->FATHERSNAME;?>">
											<div class="fv-plugins-message-container invalid-feedback"></div>
										</div>
										<!--end::Col-->
									</div>
									<div class="row">
										<label class="col-lg-4 col-form-label fw-semibold fs-6">Area</label>
										<div class="col-lg-8">
											<!-- <select class="form-select form-select-solid" data-control="select2" data-hide-search="true">	
												<option value="0">Select Area</option>
												<option value="1">MKR - 1 - KADALDI TOWN</option>				
												<option value="2">MKR - 2 - KADALDI TOWN</option>
												<option value="3">MKR - 3 - KADALDI TOWN</option>
											</select> -->
											<input type="text" name="area" id="area_edit" class="form-control form-control-lg1 form-control-solid" placeholder="Area" readonly value="<?php echo $party_details->AREA;?>">
										</div>
									</div>	
									<div class="row">													
										<label class="col-lg-4 col-form-label fw-semibold fs-6">Street</label>
										<div class="col-lg-3 fv-row fv-plugins-icon-container">
											<input type="text" name="dno" id="dno_edit" class="form-control form-control-lg1 form-control-solid" placeholder="D No" readonly value="<?php echo $party_details->DOORNO;?>">
											<div class="fv-plugins-message-container invalid-feedback"></div>
										</div>
										<div class="col-lg-5 fv-row fv-plugins-icon-container">
											<input type="text" name="address1" id="address1_edit" class="form-control form-control-lg1 form-control-solid" placeholder="Street" readonly value="<?php echo $party_details->ADDRESS1;?>">
											<div class="fv-plugins-message-container invalid-feedback"></div>
										</div>
									</div>
									<div class="row">													
										<!--begin::Label-->
										<label class="col-lg-4 col-form-label fw-semibold fs-6">Village</label>
										<!--end::Label-->
										<!--begin::Col-->
										<div class="col-lg-8 fv-row fv-plugins-icon-container">
											<input type="text" name="address2" id="address2_edit" class="form-control form-control-lg1 form-control-solid" placeholder="Village" readonly value="<?php echo $party_details->ADDRESS2;?>">
											<div class="fv-plugins-message-container invalid-feedback"></div>
										</div>
										<!--end::Col-->
									</div>
									<div class="row">		
										<!--begin::Label-->
										<label class="col-lg-4 col-form-label fw-semibold fs-6">Post</label>
										<!--end::Label-->
										<!--begin::Col-->
										<div class="col-lg-8 fv-row fv-plugins-icon-container">
											<input type="text" name="city" id="city_edit" class="form-control form-control-lg1 form-control-solid" placeholder="Post" readonly value="<?php echo $party_details->CITY;?>">
											<div class="fv-plugins-message-container invalid-feedback"></div>
										</div>
										<!--end::Col-->	
									</div>
									<div class="row">	
										<!--begin::Label-->
										<label class="col-lg-4 col-form-label fw-semibold fs-6">Phone no</label>
										<!--end::Label-->
										<!--begin::Col-->
										<div class="col-lg-8 fv-row fv-plugins-icon-container">
											<input type="text" name="pno" id="pno_edit" class="form-control form-control-lg1 form-control-solid" placeholder="Phone No" readonly value="<?php echo $party_details->PHONE;?>">
											<div class="fv-plugins-message-container invalid-feedback"></div>
										</div>
										<!--end::Col-->												
									</div>
								</div>
							</div>
						</form>
					</div>
					<!--end::Modal body-->
				</div>
				<!--end::Modal content-->
			</div>
			<!--end::Modal dialog-->