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
							<h1>Modify Loan Redemption</h1>
						</div>
						<form name="redemption_edit_form" id="redemption_edit_form" method="POST" action="<?php echo base_url(); ?>redemption/redemption_update" enctype="multipart/form-data" onsubmit="return redemp_edit_validation();" >
						<!--end::Heading-->
						<div class="row">
							<div class="col-lg-6">
								<div class="row">
									<!--begin::Label-->
									<label class="col-md-auto col-form-label required fw-bold fs-6">Bill No</label>
									<!--end::Label-->
									<!--begin::Col-->
									<div class="col-lg-4 fv-row fv-plugins-icon-container">
										<input type="text" class="form-control form-control-lg form-control-solid" placeholder="Bill No" style="margin-top: 8px !important;" id="bill_no_edit" name="bill_no_edit" readonly value="<?php echo $loan_details->BILLNO; ?>" >
										<div class="fv-plugins-message-container invalid-feedback"></div>
									</div>
									<!--end::Col-->	
									<!--begin::Label-->
									<label class="col-md-auto col-form-label required fw-bold fs-6">Receipt No</label>
									<!--end::Label-->
									<!--begin::Col-->
									<div class="col-lg-3 fv-row fv-plugins-icon-container">
										<input type="text"  class="form-control form-control-lg form-control-solid" placeholder="Receipt" style="margin-top: 8px !important;"  id="receipt_no_edit" name="receipt_no_edit" readonly value="<?php echo $redemption_details->SNO; ?>">
										<div class="fv-plugins-message-container invalid-feedback"></div>
									</div>
									<!--end::Col-->
								</div>
							</div>
							<div class="col-lg-6">
								<div class="row">
									<div class="col-lg-4" >
										<!-- <label class="col-form-label fw-bold fs-6">Last Bill</label> -->
										<!-- <label class="col-form-label fw-semibold fs-6">: TIP-2608/22</label>	 -->
									</div>
									<!--begin::Col-->
									<label class="col-lg-auto col-form-label required fw-bold fs-6">Close Date</label>
									<div class="col-lg-4 fv-row">
										<div class="d-flex align-items-center">
											<!--begin::Svg Icon | path: icons/duotune/general/gen014.svg-->
											<span class="svg-icon position-absolute ms-4 svg-icon-2 dt">
												<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
													<path opacity="0.3" d="M21 22H3C2.4 22 2 21.6 2 21V5C2 4.4 2.4 4 3 4H21C21.6 4 22 4.4 22 5V21C22 21.6 21.6 22 21 22Z" fill="currentColor" />
													<path d="M6 6C5.4 6 5 5.6 5 5V3C5 2.4 5.4 2 6 2C6.6 2 7 2.4 7 3V5C7 5.6 6.6 6 6 6ZM11 5V3C11 2.4 10.6 2 10 2C9.4 2 9 2.4 9 3V5C9 5.6 9.4 6 10 6C10.6 6 11 5.6 11 5ZM15 5V3C15 2.4 14.6 2 14 2C13.4 2 13 2.4 13 3V5C13 5.6 13.4 6 14 6C14.6 6 15 5.6 15 5ZM19 5V3C19 2.4 18.6 2 18 2C17.4 2 17 2.4 17 3V5C17 5.6 17.4 6 18 6C18.6 6 19 5.6 19 5Z" fill="currentColor" />
													<path d="M8.8 13.1C9.2 13.1 9.5 13 9.7 12.8C9.9 12.6 10.1 12.3 10.1 11.9C10.1 11.6 10 11.3 9.8 11.1C9.6 10.9 9.3 10.8 9 10.8C8.8 10.8 8.59999 10.8 8.39999 10.9C8.19999 11 8.1 11.1 8 11.2C7.9 11.3 7.8 11.4 7.7 11.6C7.6 11.8 7.5 11.9 7.5 12.1C7.5 12.2 7.4 12.2 7.3 12.3C7.2 12.4 7.09999 12.4 6.89999 12.4C6.69999 12.4 6.6 12.3 6.5 12.2C6.4 12.1 6.3 11.9 6.3 11.7C6.3 11.5 6.4 11.3 6.5 11.1C6.6 10.9 6.8 10.7 7 10.5C7.2 10.3 7.49999 10.1 7.89999 10C8.29999 9.90003 8.60001 9.80003 9.10001 9.80003C9.50001 9.80003 9.80001 9.90003 10.1 10C10.4 10.1 10.7 10.3 10.9 10.4C11.1 10.5 11.3 10.8 11.4 11.1C11.5 11.4 11.6 11.6 11.6 11.9C11.6 12.3 11.5 12.6 11.3 12.9C11.1 13.2 10.9 13.5 10.6 13.7C10.9 13.9 11.2 14.1 11.4 14.3C11.6 14.5 11.8 14.7 11.9 15C12 15.3 12.1 15.5 12.1 15.8C12.1 16.2 12 16.5 11.9 16.8C11.8 17.1 11.5 17.4 11.3 17.7C11.1 18 10.7 18.2 10.3 18.3C9.9 18.4 9.5 18.5 9 18.5C8.5 18.5 8.1 18.4 7.7 18.2C7.3 18 7 17.8 6.8 17.6C6.6 17.4 6.4 17.1 6.3 16.8C6.2 16.5 6.10001 16.3 6.10001 16.1C6.10001 15.9 6.2 15.7 6.3 15.6C6.4 15.5 6.6 15.4 6.8 15.4C6.9 15.4 7.00001 15.4 7.10001 15.5C7.20001 15.6 7.3 15.6 7.3 15.7C7.5 16.2 7.7 16.6 8 16.9C8.3 17.2 8.6 17.3 9 17.3C9.2 17.3 9.5 17.2 9.7 17.1C9.9 17 10.1 16.8 10.3 16.6C10.5 16.4 10.5 16.1 10.5 15.8C10.5 15.3 10.4 15 10.1 14.7C9.80001 14.4 9.50001 14.3 9.10001 14.3C9.00001 14.3 8.9 14.3 8.7 14.3C8.5 14.3 8.39999 14.3 8.39999 14.3C8.19999 14.3 7.99999 14.2 7.89999 14.1C7.79999 14 7.7 13.8 7.7 13.7C7.7 13.5 7.79999 13.4 7.89999 13.2C7.99999 13 8.2 13 8.5 13H8.8V13.1ZM15.3 17.5V12.2C14.3 13 13.6 13.3 13.3 13.3C13.1 13.3 13 13.2 12.9 13.1C12.8 13 12.7 12.8 12.7 12.6C12.7 12.4 12.8 12.3 12.9 12.2C13 12.1 13.2 12 13.6 11.8C14.1 11.6 14.5 11.3 14.7 11.1C14.9 10.9 15.2 10.6 15.5 10.3C15.8 10 15.9 9.80003 15.9 9.70003C15.9 9.60003 16.1 9.60004 16.3 9.60004C16.5 9.60004 16.7 9.70003 16.8 9.80003C16.9 9.90003 17 10.2 17 10.5V17.2C17 18 16.7 18.4 16.2 18.4C16 18.4 15.8 18.3 15.6 18.2C15.4 18.1 15.3 17.8 15.3 17.5Z" fill="currentColor" />
												</svg>
											</span>
											<!--end::Svg Icon-->
											<input class="form-control form-control-solid ps-12" name="close_date_edit" placeholder="Date" id="close_date_edit"  value="<?php echo $redemption_details->RETURNDATE; ?>"/>
										</div>
									</div>
									<!--end::Col-->
								</div>
							</div>
						</div>
						<input type="hidden" name="party_id_edit" id="party_id_edit" value="<?php echo $redemption_details->PID; ?>">
						<div class="row">
							<div class="col-lg-8">
								<div class="row">
									<!--begin::Label-->
									<label class="col-lg-auto col-form-label fw-bold fs-6">Name  : </label>
									<!--end::Label-->
									<label class="col-lg-3 col-form-label fw-semibold fs-6" name="pname_edit" id="pname_edit"><?php echo $redemption_details->NAME; ?> </label>	
									<!--begin::Label-->
									<label class="col-lg-auto col-form-label fw-bold fs-6">Address  : </label>
									<!--end::Label-->
									<label class="col-lg-6 col-form-label fw-semibold fs-6" name="paddress_edit" id="paddress_edit"><?php echo $loan_details->ADDRESS1. ", " .$loan_details->ADDRESS2; ?> </label>
								</div>
							</div>
							<div class="col-lg-4">
								<div class="row">
									<!--begin::Label-->
									<div class="col-lg-6">
										<label class="close-form close-form-solid fw-bold text-danger fs-4"><span id="myspan1_edit"><?php echo $redemption_details->CLOSING_TYPE; ?></span></label>
									</div>
									<!--end::Label-->
									<div class="col-lg-6">
										<label class="close-form close-form-solid fw-bold text-danger fs-4"><span id="myspan11_edit"><?php echo $lblODStatus; ?></span></label>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-8">
								<div><label class="col-lg-1 col-form-label fw-bold fs-6"><u>Calculation</u></label></div>
								<div style="padding: 10px 10px 10px 10px !important;box-shadow: 0 3px 6px #00002947;border-radius: 5px;background-color: #f5f5f1 !important;">
									<div class="row">
										
										<!--begin::Label-->
										<label class="col-lg-2 col-form-label fw-bold fs-6">Month</label>
										<!--end::Label-->
										<!--begin::Col-->
										<div class="col-lg-2 fv-row fv-plugins-icon-container">
											<input type="text"  class="form-control form-control-md form-control-solid" style="margin-top: 8px !important;" name="loan_period_edit" id="loan_period_edit" readonly value="<?php if($diffInMonths>0)
											{echo $diffInMonths;}else{	echo $loan_details->MONTHS; } ?>">
											<div class="fv-plugins-message-container invalid-feedback"></div>
										</div>
										<!--end::Col-->	
										<!--begin::Label-->
										<label class="col-lg-2 col-form-label fw-bold fs-6" name="period_type_edit" id="period_type_edit"><?php if($diffInDays>0)
											{echo $diffInDays+1;} ?> Days</label>
										<!--end::Label-->
										<!--begin::Col-->
										<div class="col-lg-2 fv-row fv-plugins-icon-container">
											<!-- <input type="text" class="form-control form-control-md form-control-solid" style="margin-top: 8px !important;" name="period_type" id="period_type"> -->
											<div class="fv-plugins-message-container invalid-feedback"></div>
										</div>
										<!--end::Col-->
										<label class="col-lg-2 col-form-label fw-bold fs-6">Total  : </label>
										<label class="col-lg-2 col-form-label fw-semibold fs-6"  name="total_edit" id="total_edit"><?php  echo $IntMonths; ?></label>
									</div>
									<div class="row">
										<!--begin::Label-->
										<label class="col-lg-2 col-form-label fw-bold fs-6">Principal</label>
										<!--end::Label-->
										<!--begin::Col-->
										<div class="col-lg-2 fv-row fv-plugins-icon-container">
											<input type="text" class="form-control form-control-lg form-control-solid" style="margin-top: 8px !important;" name="principal_edit" id="principal_edit" readonly value="<?php echo $redemption_details->PRINCIPAL; ?>" >
											<div class="fv-plugins-message-container invalid-feedback"></div>
										</div>
										<!--end::Col-->
										<!--begin::Label-->
										<label class="col-lg-2 col-form-label fw-bold fs-6">Paid</label>
										<!--end::Label-->
										<!--begin::Col-->
										<div class="col-lg-2 fv-row fv-plugins-icon-container">
											<input type="text" class="form-control form-control-lg form-control-solid" style="margin-top: 8px !important;" name="paid_amt_edit" id="paid_amt_edit" readonly value="<?php echo $redemption_details->PAIDPRINCIPAL; ?>">
											<div class="fv-plugins-message-container invalid-feedback"></div>
										</div>
										<!--end::Col-->
										<?php 
										$bal_princ=$redemption_details->PRINCIPAL-$redemption_details->PAIDPRINCIPAL;
										$bal_int=$redemption_details->INTEREST-$redemption_details->PAIDINTEREST;
										$bal_tot_pay=$bal_princ+$bal_int;
										?>
										<!--begin::Label-->
										<label class="col-lg-2 col-form-label fw-bold fs-6">Balance</label>
										<!--end::Label-->
										<!--begin::Col-->
										<div class="col-lg-2 fv-row fv-plugins-icon-container">
											<input type="text" class="form-control form-control-lg form-control-solid" style="margin-top: 8px !important;" name="balance1_edit" id="balance1_edit" value="<?php echo $bal_princ; ?>" readonly>
											<div class="fv-plugins-message-container invalid-feedback"></div>
										</div>
										<!--end::Col-->
									</div>
									<div class="row">
										<!--begin::Label-->
										<label class="col-lg-2 col-form-label fw-bold fs-6">Interest</label>
										<!--end::Label-->
										<!--begin::Col-->
										<div class="col-lg-2 fv-row fv-plugins-icon-container">
											<input type="text" class="form-control form-control-lg form-control-solid" style="margin-top: 8px !important;" name="interest_edit" id="interest_edit" readonly value="<?php echo $redemption_details->INTEREST; ?>">
											<div class="fv-plugins-message-container invalid-feedback"></div>
										</div>
										<!--end::Col-->
										<!--begin::Label-->
										<label class="col-lg-2 col-form-label fw-semibold fs-6"></label>
										<!--end::Label-->
										<!--begin::Col-->
										<div class="col-lg-2 fv-row fv-plugins-icon-container">
											<input type="text"  class="form-control form-control-lg form-control-solid" style="margin-top: 8px !important;" name="paid_amt2_edit" id="paid_amt2_edit" readonly value="<?php echo $redemption_details->PAIDINTEREST; ?>">
											<div class="fv-plugins-message-container invalid-feedback"></div>
										</div>
										<!--end::Col-->
										<!--begin::Label-->
										<label class="col-lg-2 col-form-label fw-semibold fs-6"></label>
										<!--end::Label-->
										<!--begin::Col-->
										<div class="col-lg-2 fv-row fv-plugins-icon-container">
											<input type="text"  class="form-control form-control-lg form-control-solid" style="margin-top: 8px !important;" name="balance2_edit" id="balance2_edit" readonly value="<?php echo $bal_int; ?>">
											<div class="fv-plugins-message-container invalid-feedback"></div>
										</div>
										<!--end::Col-->
									</div>
									<div class="row">
										<!--begin::Label-->
										<label class="col-lg-2 col-form-label fw-bold fs-6">Total Pay</label>
										<!--end::Label-->
										<?php 
											$total_pay=$redemption_details->PRINCIPAL+$redemption_details->INTEREST;
											$paid_total=$redemption_details->PAIDPRINCIPAL+$redemption_details->PAIDINTEREST;
										?>
										<!--begin::Col-->
										<div class="col-lg-2 fv-row fv-plugins-icon-container">
											<input type="text" class="form-control form-control-lg form-control-solid" style="margin-top: 8px !important;" name="total_pay_edit" id="total_pay_edit" readonly value="<?php echo $total_pay; ?>">
											<div class="fv-plugins-message-container invalid-feedback"></div>
										</div>
										<!--end::Col-->
										<!--begin::Label-->
										<label class="col-lg-2 col-form-label fw-semibold fs-6"></label>
										<!--end::Label-->
										<!--begin::Col-->
										<div class="col-lg-2 fv-row fv-plugins-icon-container">
											<input type="text" class="form-control form-control-lg form-control-solid" style="margin-top: 8px !important;" name="paid_amt3_edit" id="paid_amt3_edit" readonly value="<?php echo $paid_total; ?>">
											<div class="fv-plugins-message-container invalid-feedback"></div>
										</div>
										<!--end::Col-->
										<!--begin::Label-->
										<label class="col-lg-2 col-form-label fw-semibold fs-6"></label>
										<!--end::Label-->
										<!--begin::Col-->
										<div class="col-lg-2 fv-row fv-plugins-icon-container">
											<input type="text" class="form-control fw-bold form-control-lg form-control-solid" style="margin-top: 8px !important;" name="balance3_edit" id="balance3_edit" readonly value="<?php echo $bal_tot_pay; ?>">
											<div class="fv-plugins-message-container invalid-feedback"></div>
										</div>
										<!--end::Col-->
									</div>
									<div class="row">
										<!--begin::Col-->
										<label class="col-lg-2 col-form-label fw-bold fs-6">Payment History</label>
										<div class="col-lg-8 fv-row fv-plugins-icon-container">
											<textarea class="form-control form-control-solid"  rows="4" style="margin-top: 8px !important;" name="payment_history_edit" id="payment_history_edit" readonly ><?php 
											$format1=str_replace("<p>", "", $vIntStr);
											$format2=str_replace("</p>", "\n", $format1);
								// $format3=$format2.replace(/<>/g, "\n");
											echo $format2; ?></textarea>
											
											<textarea class="form-control form-control-solid"  style="display: none;" style="margin-top: 8px !important;" name="payment_history1_edit" id="payment_history1_edit"  ><?php echo $vIntstr; ?></textarea>
											<!-- <span class="text-danger fs-6">Click Here to print </span> -->

										</div>
										<div class="col-lg-2 fv-row fv-plugins-icon-container">
											<button type="button" class="btn btn-sm btn-outline btn-outline-solid btn-outline-warning btn-active-light-primary" style="margin-top: 25px !important;" name="print_btn_edit" id="print_btn_edit"  >Print</button>
										</div>
										<!--end::Col-->
									</div>
									<div class="row">
										<!--begin::Col-->
										<label class="col-lg-2 col-form-label fw-bold fs-6">Bank Status</label>
										<div class="col-lg-8 fv-row fv-plugins-icon-container">
											<input type="text" class="form-control btn-active-light-primary" name="bank_status_edit" id="bank_status_edit" readonly value="<?php echo $bank_details; ?>">
										</div>

										<!--end::Col-->
									</div>
								</div>
							</div>
							<div class="col-lg-4" style="margin-top: 7px !important;">
								<div style="padding: 10px 10px 10px 10px !important;box-shadow: 0 3px 6px #00002947;border-radius: 5px;background-color: #f5f5f1 !important;">
									<div class="row">
										<label class="col-lg-6 col-form-label fw-bold fs-6">Loan Date</label>
										<label class="col-lg-6 col-form-label fw-semibold fs-6" name="loan_date_edit" id="loan_date_edit" >: <?php echo $loan_details->ENDATE; ?> </label>
									</div>
									<div class="row">
										<label class="col-lg-6 col-form-label fw-bold fs-6">Interest</label>
										<label class="col-lg-6 col-form-label fw-semibold fs-6" name="lbl_interest_edit" id="lbl_interest_edit">: <?php echo $loan_details->INTEREST; ?></label>
									</div>
									<div class="row">
										<label class="col-lg-6 col-form-label fw-bold fs-6">Loan Amount</label>
										<label class="col-lg-6 col-form-label fw-semibold fs-6" name="loan_amt_edit" id="loan_amt_edit">: <?php echo $loan_details->AMOUNT; ?></label>
									</div>
									<div class="row">
										<label class="col-lg-6 col-form-label fw-bold fs-6">Pledge Detail</label>
										<label class="col-lg-6 col-form-label fw-semibold fs-6" name="pledge_details_edit" id="pledge_details_edit">: <?php echo $pledge_details; ?></label>
									</div>
									<div class="row">
										<label class="col-lg-6 col-form-label fw-bold fs-6">Weight</label>
										<label class="col-lg-6 col-form-label fw-semibold fs-6" name="weight_edit" id="weight_edit">: <?php echo $loan_details->WEIGHT; ?></label>
									</div>
									<div class="row">
										<label class="col-lg-6 col-form-label fw-bold fs-6">Period</label>
										<label class="col-lg-6 col-form-label fw-semibold fs-6" name="period_edit" id="period_edit">: <?php echo $loan_details->MONTHS." Months"; ?></label>
									</div>
									<div class="row">
										<label class="col-lg-6 col-form-label fw-bold fs-6">Loan Balance</label>
										<label class="col-lg-6 col-form-label fw-semibold fs-6" name="loan_balance_edit" id="loan_balance_edit">: <?php echo $loan_details->AMOUNT; ?></label>
									</div>
									<div class="row">
										<label class="col-lg-6 col-form-label fw-bold fs-6">Last Receipt Date</label>
										<label class="col-lg-6 col-form-label fw-semibold fs-6" name="receipt_date_edit" id="receipt_date_edit">: <?php 
										if (!is_null($loan_details->LASTRECEIPTDATE)){
										echo $loan_details->LASTRECEIPTDATE; }else{
											echo $loan_details->ENDATE; 
										} ?></label>
									</div>
								</div>
							</div>
						</div><br>
						<div style="padding: 10px 10px 10px 10px !important;box-shadow: 0 3px 6px #00002947;border-radius: 5px; background-color: #edf7d1;">
							<div class="row">
								<div class="col-lg-3 d-flex align-items-center mt-3">
									<!--begin::Option-->
									<label class="form-check form-check-inline form-check-solid">
										<input class="form-check-input" name="chkJewelReturned_edit" id="chkJewelReturned_edit" type="checkbox" value="1" />
										<span class="fs-6 fw-semibold text-muted">Jewels Not Returned</span>
									</label>
									<!--end::Option-->
								</div>
								<div class="col-lg-3 d-flex align-items-center mt-3">
									<!--begin:Input-->
									<div class="form-check form-check-custom">
										<input class="form-check-input2" type="radio" id="party_close_edit" onclick="party_cl_edit()" onchange="party_cl_edit()" name="close_type_edit" value="party_close" <?php 
										if($redemption_details->CLOSING_TYPE=='CUSTOMER_CLOSE'){ echo "checked";}
										?>/>
									</div>
									<!--end:Input-->
									<!--begin::Description-->
									<div class="d-flex flex-column">
										<div class="fs-6 fw-semibold text-muted" style="padding-left: 10px; color: #bd1941 !important;">Party Close</div>
									</div>
									<!--end:Description-->
								</div>
								<div class="col-lg-3 d-flex align-items-center mt-3">
									<!--begin:Input-->
									<div class="form-check form-check-custom">
										<input class="form-check-input2" type="radio" id="party_transfer_edit" onclick="party_cl_edit()" onchange="party_cl_edit()" name="close_type_edit" value="party_transfer" <?php 
										if($redemption_details->CLOSING_TYPE=='CUSTOMER_TRANSFER'){ echo "checked";}
										?> />
									</div>
									<!--end:Input-->
									<!--begin::Description-->
									<div class="d-flex flex-column">
										<div class="fs-6 fw-semibold text-muted" style="padding-left: 10px;color: #16acff !important;">Party Transfer</div>
									</div>
									<!--end:Description-->
								</div>
								<div class="col-lg-2 d-flex align-items-center mt-3">
									<!--begin:Input-->
									<div class="form-check form-check-custom">
										<input class="form-check-input2" type="radio" id="company_close_edit"  onclick="party_cl_edit()" onchange="party_cl_edit()" name="close_type_edit" value="company_close"  <?php 
										if($redemption_details->CLOSING_TYPE=='COMPANY_CLOSE'){ echo "checked";}
										?>/>
									</div>
									<!--end:Input-->
									<!--begin::Description-->
									<div class="d-flex flex-column">
										<div class="fs-6 fw-semibold text-muted" style="padding-left: 10px;color: #f1416c !important;">Company Close</div>
									</div>
									<!--end:Description-->
								</div>
								<div class="col-lg-3 d-flex align-items-center mt-3">
									<!--begin:Input-->
									<div class="form-check form-check-custom">
										<input class="form-check-input2" type="radio" id="company_transfer_edit" onclick="party_cl_edit()" onchange="party_cl_edit()" onselect="getOnAccount_edit();" name="close_type_edit" value="company_transfer" <?php 
										if($redemption_details->CLOSING_TYPE=='COMPANY_TRANSFER'){ echo "checked";}
										?>/>
									</div>
									<!--end:Input-->
									<!--begin::Description-->
									<div class="d-flex flex-column">
										<div class="fs-6 fw-semibold text-muted"  style="padding-left: 10px;color: #eb2c2c !important;">Company Transfer</div>
									</div>
									<!--end:Description-->
								</div>
								<div class="col-lg-3 d-flex align-items-center mt-3">
									<!--begin:Input-->
									<div class="form-check form-check-custom">
										<input class="form-check-input2" type="radio" id="party_sale_edit" onclick="party_cl_edit()" onchange="party_cl_edit()" name="close_type_edit" value="party_sale" <?php 
										if($redemption_details->CLOSING_TYPE=='CUSTOMER_SALE'){ echo "checked";}
										?> />
									</div>
									<!--end:Input-->
									<!--begin::Description-->
									<div class="d-flex flex-column">
										<div class="fs-6 fw-semibold text-muted"  style="padding-left: 10px;color: #571fcd !important;">Party Sale</div>
									</div>
									<!--end:Description-->
								</div>
							</div>
						</div>
							<div><label class="col-lg-2 col-form-label fw-bold fs-6"><u><span id="myspan_edit"></span></u></label></div>
							<div style="padding: 10px 10px 10px 10px !important;box-shadow: 0 3px 6px #00002947;border-radius: 5px;">
								<div id="div_party_close_edit" style="<?php if($redemption_details->CLOSING_TYPE=='CUSTOMER_CLOSE') {echo 'display: block;'; } else { echo 'display: none;'; }?>;">
								
									<div class="row">
										<!--begin::Label-->
										<label class="col-lg-2 col-form-label fw-bold fs-6">Paper Action Charge</label>
										<!--end::Label-->
										<!--begin::Col-->
										<div class="col-lg-1 fv-row fv-plugins-icon-container">
											<input type="text" name="pcl_pap_act_edit" id="pcl_pap_act" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" class="form-control form-control-lg form-control-solid" style="margin-top: 8px !important;" value="<?php echo $redemption_details->MAINTAINCHARGE; ?>">
											<div class="fv-plugins-message-container invalid-feedback"></div>
										</div>
										<!--end::Col-->
										<!--begin::Label-->
										<label class="col-lg-2 col-form-label fw-bold fs-6">Notice charge</label>
										<!--end::Label-->
										<!--begin::Col-->
										<div class="col-lg-1 fv-row fv-plugins-icon-container">
											<input type="text" name="pcl_not_chg_edit" id="pcl_not_chg_edit"  oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"  class="form-control form-control-lg form-control-solid" style="margin-top: 8px !important;" value="<?php echo $redemption_details->NOTICECHARGE; ?>">
											<div class="fv-plugins-message-container invalid-feedback"></div>
										</div>
										<!--end::Col-->
										<!--begin::Label-->
										<label class="col-lg-1 col-form-label fw-bold fs-6">Discount</label>
										<!--end::Label-->
										<!--begin::Col-->
										<div class="col-lg-1 fv-row fv-plugins-icon-container">
											<input type="text" name="pcl_discount_edit" id="pcl_discount_edit"  oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"  class="form-control form-control-lg form-control-solid" style="margin-top: 8px !important;" value="<?php echo $redemption_details->DISCOUNT; ?>">
											<div class="fv-plugins-message-container invalid-feedback"></div>
										</div>
										<!--end::Col-->
										<!-- <label class="col-lg-1 col-form-label fw-bold fs-6">Method</label> -->
										<!--begin::Left Section-->
										<div class="col-md-2">
											<!--begin::Select-->
											<select class="form-select form-select-solid" data-control="select2" data-hide-search="true" style="margin-top: 8px !important;" name="pcl_method_edit" id="pcl_method_edit" >	
												<option value="CASH">Cash</option>			
												<option value="CREDIT">Credit</option>
											</select>
											<!--end::Select-->
										</div>
										<div class="col-md-2" id="div_pcl_edit" style="display: none;">
											<!--begin::Select-->
											<select class="form-select form-select-solid" data-control="select2" data-hide-search="true" style="margin-top: 8px !important;" name="pcl_ledgers_edit" id="pcl_ledgers_edit" >	
												<option>select</option>
											</select>
											<!--end::Select-->
										</div>
									</div>
									<div class="row">
										
										<!--begin::Label-->
										<label class="col-lg-2 col-form-label fw-bold fs-6">Form Missing</label>
										<!--end::Label-->
										<!--begin::Col-->
										<div class="col-lg-1 fv-row fv-plugins-icon-container">
											<input type="text" name="pcl_form_miss_edit" id="pcl_form_miss_edit"  oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"  class="form-control form-control-lg form-control-solid" style="margin-top: 8px !important;" value="<?php echo $redemption_details->FORMCHARGE; ?>">
											<div class="fv-plugins-message-container invalid-feedback"></div>
										</div>
										<!--end::Col-->
										<!--begin::Label-->
										<label class="col-lg-2 col-form-label fw-bold fs-6">On Account </label>
										<!--end::Label-->
										<!--begin::Col-->
										<div class="col-lg-1 fv-row fv-plugins-icon-container">
											<input type="text" name="pcl_on_acc_edit" id="pcl_on_acc_edit" onfocus="getOnAccount_edit();"  class="form-control form-control-lg form-control-solid" style="margin-top: 8px !important;" value="<?php echo $redemption_details->HL_AMOUNT; ?>">
											<div class="fv-plugins-message-container invalid-feedback"></div>
										</div>
										<!--end::Col-->
										<!--begin::Label-->
										<label class="col-lg-1 col-form-label fw-bold fs-6">Net Pay</label>
										<!--end::Label-->
										<!--begin::Col-->
										<div class="col-lg-2 fv-row fv-plugins-icon-container">
											<input type="text" name="pcl_net_pay_edit" id="pcl_net_pay_edit" readonly class="form-control form-control-lg form-control-solid" style="margin-top: 8px !important;" value="<?php echo $redemption_details->NETPAYABLE; ?>">
											<div class="fv-plugins-message-container invalid-feedback"></div>
										</div>
										<!--end::Col-->	
										<!--begin::Label-->
										<label class="col-lg-1 col-form-label fw-bold fs-6">Received Cash</label>
										<!--end::Label-->
										<!--begin::Col-->
										<div class="col-lg-2 fv-row fv-plugins-icon-container">
											<input type="text" name="pcl_rcvd_cash_edit" id="pcl_rcvd_cash_edit" class="form-control form-control-lg form-control-solid" style="margin-top: 8px !important;" value="<?php echo $redemption_details->PAIDAMOUNT; ?>">
											<div class="fv-plugins-message-container invalid-feedback"></div>
										</div>
										<!--end::Col-->
									</div>
								
									<div class="row">
										<label class="col-lg-1 col-form-label fw-bold fs-6" id="closedby" >Cls By</label>
										<!--begin::Left Section-->
										<div class="col-md-2" id="closedby_dbox" >
											<!--begin::Select-->
											<select class="form-select form-select-solid" data-control="select2" data-hide-search="true" name="pcl_closed_by_edit" id="pcl_closed_by_edit">	
												<option value="CUSTOMER" <?php if($redemption_details->CLOSED_BY=='CUSTOMER'){ echo "selected"; } ?>>Party</option>	
												<option value="NOMINEE" <?php if($redemption_details->CLOSED_BY=='NOMINEE'){ echo "selected"; } ?>>Nominee</option>
												<option value="OTHERS" <?php if($redemption_details->CLOSED_BY=='OTHERS'){ echo "selected"; } ?>>Others</option>
											</select>
											<!--end::Select-->
										</div>
										<!--begin::Label-->
										<label class="col-md-1 col-form-label fw-bold fs-6" >Name</label>
										<!--end::Label-->
										<!--begin::Col-->
										<div class="col-lg-2 fv-row fv-plugins-icon-container" >
											<input type="text" name="pcl_party_name_edit" id="pcl_party_name_edit" class="form-control form-control-lg form-control-solid" style="margin-top: 8px !important;" value="<?php echo $redemption_details->CLOSED_NAME; ?>">
											<div class="fv-plugins-message-container invalid-feedback"></div>
										</div>
										<!--end::Col-->
										<label class="col-lg-1 col-form-label fw-bold fs-6">Verified : </label>
										<label class="col-lg-1 col-form-label fw-semibold fs-6" id="pcl_verified_by_edit" name="pcl_verified_by_edit"><?php echo $_SESSION['username']; ?> </label>
										<!--begin::Label-->
										<label class="col-md-auto col-form-label fw-bold fs-6">Balance</label>
										<!--end::Label-->
										<!--begin::Col-->
										<div class="col-lg-2 fv-row fv-plugins-icon-container"  >
											<input type="text" id="pcl_balance_edit" name="pcl_balance_edit" readonly class="form-control form-control-lg form-control-solid" style="margin-top: 8px !important;" value="<?php echo $redemption_details->BALANCE; ?>">
											<div class="fv-plugins-message-container invalid-feedback"></div>
										</div>
										<!--end::Col-->
									</div>
									<div class="row">
										<!--begin::Label-->
										<label class="col-md-1 col-form-label fw-bold fs-6">HL Bal</label>
										<!--end::Label-->
										<!--begin::Col-->
										<div class="col-lg-2 fv-row fv-plugins-icon-container">
											<input type="text" name="pcl_hl_bal_side1_edit" id="pcl_hl_bal_side1_edit" class="form-control form-control-lg form-control-solid" style="background-color: #cb431a !important;font-size: 16px !important;font-weight: 600 !important;color: white!important;">
											<div class="fv-plugins-message-container invalid-feedback"></div>
										</div>
										<!--end::Col-->
										<!--begin::Col-->
										<div class="col-lg-2 fv-row fv-plugins-icon-container">
											<input type="text" name="pcl_hl_bal_side2_edit" id="pcl_hl_bal_side2_edit" class="form-control form-control-lg form-control-solid" style="background-color: #cb431a !important;font-size: 16px !important;font-weight: 600 !important;color: white!important;">
											<div class="fv-plugins-message-container invalid-feedback"></div>
										</div>
										
									</div>
			
									<div class="row mb-6">
										<!--begin::Label-->
										<label class="col-lg-1 col-form-label fw-bold fs-6">Party</label>
										<!--end::Label-->
										<!--begin::Col-->
										<div class="col-lg-2">
											<!--begin::Image input-->
											<div id="pcl_party_photo_edit" class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url('assets/media/svg/avatars/blank.svg')">
												<?php 
												if($redemption_details->NETPAYABLE !="")
												{?>
													<img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($party_photo->PHOTO); ?>" height="125px" width="125px">
													
												<?php
												 }
												 else
												 {
												?>
												<!--begin::Preview existing avatar-->

												<div class="image-input-wrapper w-125px h-125px" style="background-image: url(assets/media/svg/avatars/blank.svg)">
													
												</div>
												<?php 
													}
												?>

												<!-- <img src="data:image/jpg;charset=utf8;base64," height="125px" width="125px"> -->
											</div>
											
										</div>
										<!--end::Col-->
										<!--begin::Label-->
										<label class="col-lg-1 col-form-label fw-bold fs-6">Jewel</label>
										<!--end::Label-->
										<!--begin::Col-->
										<div class="col-lg-2">
											<!--begin::Image input-->
											<div id= "pcl_jewel_photo_edit" class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url('assets/media/svg/avatars/blank.svg')">
												<?php 
												if($redemption_details->NETPAYABLE !="")
												{?>
													<img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($jewel_photo->ITEM_PHOTO); ?>" height="125px" width="125px">
													
												<?php
												 }
												 else
												 {
												?>
												<!--begin::Preview existing avatar-->
												<div class="image-input-wrapper w-125px h-125px" style="background-image: url(assets/media/svg/avatars/blank.svg)">
													
												</div>
												<?php 
													}
												?>
											</div>
										</div>
									</div>
								</div>

								<div id="div_party_transfer_edit" style="<?php if($redemption_details->CLOSING_TYPE=='CUSTOMER_TRANSFER') {echo 'display: block;'; } else { echo 'display: none;'; }?>;" >
									<div class="row">
										<!--begin::Label-->
										<label class="col-lg-2 col-form-label fw-bold fs-6">Paper Action Charge</label>
										<!--end::Label-->
										<!--begin::Col-->
										<div class="col-lg-1 fv-row fv-plugins-icon-container">
											<input type="text" name="pt_pap_act_edit" id="pt_pap_act_edit" class="form-control form-control-lg form-control-solid" style="margin-top: 8px !important;" value="<?php echo $redemption_details->MAINTAINCHARGE; ?>">
											<div class="fv-plugins-message-container invalid-feedback"></div>
										</div>
										<!--end::Col-->
										<!--begin::Label-->
										<label class="col-lg-2 col-form-label fw-bold fs-6">Notice charge</label>
										<!--end::Label-->
										<!--begin::Col-->
										<div class="col-lg-1 fv-row fv-plugins-icon-container">
											<input type="text" name="pt_not_chg_edit" id="pt_not_chg_edit" class="form-control form-control-lg form-control-solid" style="margin-top: 8px !important;" value="<?php echo $redemption_details->NOTICECHARGE; ?>">
											<div class="fv-plugins-message-container invalid-feedback"></div>
										</div>
										<!--end::Col-->
										<!--begin::Label-->
										<label class="col-lg-1 col-form-label fw-bold fs-6">Discount</label>
										<!--end::Label-->
										<!--begin::Col-->
										<div class="col-lg-1 fv-row fv-plugins-icon-container">
											<input type="text" name="pt_discount_edit" id="pt_discount_edit" class="form-control form-control-lg form-control-solid" style="margin-top: 8px !important;" value="<?php echo $redemption_details->DISCOUNT; ?>">
											<div class="fv-plugins-message-container invalid-feedback"></div>
										</div>
										<!--end::Col-->
										<!-- <label class="col-lg-1 col-form-label fw-bold fs-6">Method</label> -->
										<!--begin::Left Section-->
										<div class="col-md-2">
											<!--begin::Select-->
											<select class="form-select form-select-solid" data-control="select2" data-hide-search="true" style="margin-top: 8px !important;" name="pt_method_edit" id="pt_method_edit">	
												<option value="CASH">Cash</option>
												<option value="CREDIT">Credit</option>
											</select>
											<!--end::Select-->
										</div>
										<div class="col-md-2" id="div_pt_edit" name="div_pt_edit" style="display: none;">
											<!--begin::Select-->
											<select class="form-select form-select-solid" data-control="select2" data-hide-search="true" style="margin-top: 8px !important;" name="pt_ledgers_edit" id="pt_ledgers_edit">	
												<option value="">Select</option>
											</select>
											<!--end::Select-->
										</div>
									</div>
									<div class="row">
										<!--begin::Label-->
										<label class="col-lg-2 col-form-label fw-bold fs-6">Received Cash</label>
										<!--end::Label-->
										<!--begin::Col-->
										<div class="col-lg-1 fv-row fv-plugins-icon-container">
											<input type="text" name="pt_rcvd_cash_edit" id="pt_rcvd_cash_edit" class="form-control form-control-lg form-control-solid" style="margin-top: 8px !important;"  value="<?php echo $redemption_details->PAIDAMOUNT; ?>">
											<div class="fv-plugins-message-container invalid-feedback"></div>
										</div>
										<!--end::Col-->
										<!--begin::Label-->
										<label class="col-lg-2 col-form-label fw-bold fs-6">Form Missing</label>
										<!--end::Label-->
										<!--begin::Col-->
										<div class="col-lg-1 fv-row fv-plugins-icon-container">
											<input type="text" name="pt_form_miss_edit" id="pt_form_miss_edit" class="form-control form-control-lg form-control-solid" style="margin-top: 8px !important;" value="<?php echo $redemption_details->FORMCHARGE; ?>">
											<div class="fv-plugins-message-container invalid-feedback"></div>
										</div>
										<!--end::Col-->
										<!--begin::Label-->
										<label class="col-md-1 col-form-label fw-bold fs-6">On A/c</label>
										<!--end::Label-->
										<!--begin::Col-->
										<div class="col-lg-1 fv-row fv-plugins-icon-container">
											<input type="text" name="pt_on_acc_edit" id="pt_on_acc_edit" onfocus="getOnAccount_edit();" class="form-control form-control-lg form-control-solid" style="margin-top: 8px !important;" value="<?php echo $redemption_details->HL_AMOUNT; ?>">
											<div class="fv-plugins-message-container invalid-feedback"></div>
										</div>
										<!--end::Col-->
										<!--begin::Label-->
										<label class="col-lg-1 col-form-label fw-bold fs-6">Net Pay</label>
										<!--end::Label-->
										<!--begin::Col-->
										<div class="col-lg-2 fv-row fv-plugins-icon-container">
											<input type="text" name="pt_net_pay_edit" id="pt_net_pay_edit" class="form-control form-control-lg form-control-solid" style="margin-top: 8px !important;" value="<?php echo $redemption_details->NETPAYABLE; ?>">
											<div class="fv-plugins-message-container invalid-feedback"></div>
										</div>
										<!--end::Col-->	
									</div>
									<div class="row">
										<label class="col-lg-1 col-form-label fw-bold fs-6" id="closedby"  >Cls By</label>
										<!--begin::Left Section-->
										<div class="col-md-2" id="closedby_dbox"  >
											<!--begin::Select-->
											<select class="form-select form-select-solid" data-control="select2" data-hide-search="true" name="pt_closed_by_edit" id="pt_closed_by_edit">	
												<option value="CUSTOMER" <?php if($redemption_details->CLOSED_BY=='CUSTOMER'){ echo "selected"; } ?>>Party</option>				
												<option value="NOMINEE" <?php if($redemption_details->CLOSED_BY=='NOMINEE'){ echo "selected"; } ?>>Nominee</option>
												<option value="OTHERS" <?php if($redemption_details->CLOSED_BY=='OTHERS'){ echo "selected"; } ?>>Others</option>
											</select>
											<!--end::Select-->
										</div>
										<!--begin::Label-->
										<label class="col-md-1 col-form-label fw-bold fs-6" id="party_nm_edit"  >Name</label>
										<!--end::Label-->
										<!--begin::Col-->
										<div class="col-lg-2 fv-row fv-plugins-icon-container" id="party_nm_tbox"  >
											<input type="text" name="pt_name_edit" id="pt_name_edit" class="form-control form-control-lg form-control-solid" style="margin-top: 8px !important;" value="<?php echo $redemption_details->CLOSED_NAME; ?>">
											<div class="fv-plugins-message-container invalid-feedback"></div>
										</div>
										<!--end::Col-->
										<label class="col-lg-1 col-form-label fw-bold fs-6">Verified : </label>
										<label class="col-lg-1 col-form-label fw-semibold fs-6" id="pt_verified_by_edit"  name="pt_verified_by_edit"><?php echo $_SESSION['username']; ?></label>
										<label class="col-md-auto col-form-label fw-bold fs-6">Balance</label>
										<!--begin::Col-->
										<div class="col-lg-2 fv-row fv-plugins-icon-container" id="balance_tbox"  >
											<input type="text" name="pt_balance_edit" id="pt_balance_edit" class="form-control form-control-lg form-control-solid" style="margin-top: 8px !important;" value="<?php echo $redemption_details->BALANCE; ?>">
											<div class="fv-plugins-message-container invalid-feedback"></div>
										</div>
										<!--end::Col-->
									</div>
									<div class="row">
										<!--begin::Label-->
										<label class="col-md-1 col-form-label fw-bold fs-6">HL Bal</label>
										<!--end::Label-->
										<!--begin::Col-->
										<div class="col-lg-2 fv-row fv-plugins-icon-container">
											<input type="text" name="pt_hl_bal_side1_edit" id="pt_hl_bal_side1_edit" class="form-control form-control-lg form-control-solid" style="background-color: #cb431a !important;font-size: 16px !important;font-weight: 600 !important;color: white!important;">
											<div class="fv-plugins-message-container invalid-feedback"></div>
										</div>
										<!--end::Col-->
										<!--begin::Col-->
										<div class="col-lg-2 fv-row fv-plugins-icon-container">
											<input type="text"  class="form-control form-control-lg form-control-solid" style="background-color: #cb431a !important;font-size: 16px !important;font-weight: 600 !important;color: white!important;" name="pt_hl_bal_side2_edit" id="pt_hl_bal_side2_edit">
											<div class="fv-plugins-message-container invalid-feedback"></div>
										</div>
										<!--end::Col-->
										<!--begin::Label-->
										<label class="col-md-1 col-form-label fw-bold fs-6" id="newbill"  >New Bill</label>
										<!--end::Label-->
										<!--begin::Col-->
										<div class="col-lg-2 fv-row fv-plugins-icon-container" id="newbill_tbox"  >
											<input type="text" name="pt_new_bill_no_edit" id="pt_new_bill_no_edit" class="form-control form-control-lg form-control-solid" style="margin-top: 8px !important;" value="<?php echo $redemption_details->NEWBILLNO; ?>">
											<div class="fv-plugins-message-container invalid-feedback"></div>
										</div>
										<!--end::Col-->
										<!--begin::Label-->
										<label class="col-md-auto col-form-label fw-bold fs-6" id="loanamount"  >Loan Amt</label>
										<!--end::Label-->
										<!--begin::Col-->
										<div class="col-lg-2 fv-row fv-plugins-icon-container" id="loanamount_tbox"  >
											<input type="text" name="pt_new_loan_amount_edit" id="pt_new_loan_amount_edit" class="form-control form-control-lg form-control-solid" style="margin-top: 8px !important;" value="<?php echo $redemption_details->NEWLOANAMOUNT; ?>">
											<div class="fv-plugins-message-container invalid-feedback"></div>
										</div>
										<!--end::Col-->
									</div>
									<div class="row mb-6">
										<!--begin::Label-->
										<label class="col-lg-1 col-form-label fw-bold fs-6">Party</label>
										<!--end::Label-->
										<!--begin::Col-->
										<div class="col-lg-2">
											<!--begin::Image input-->
											<div id="pt_party_photo_edit" class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url('assets/media/svg/avatars/blank.svg')">
												<?php 
												if($redemption_details->NETPAYABLE !="")
												{?>
													<img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($party_photo->PHOTO); ?>" height="125px" width="125px">
													
												<?php
												 }
												 else
												 {
												?>
												<!--begin::Preview existing avatar-->
												<div class="image-input-wrapper w-125px h-125px" style="background-image: url(assets/media/svg/avatars/blank.svg)">
													
												</div>
												<?php 
													}
												?>
											</div>
											<!--end::Image input-->
											
										</div>
										<!--end::Col-->
										<!--begin::Label-->
										<label class="col-lg-1 col-form-label fw-bold fs-6">Jewel</label>
										<!--end::Label-->
										<!--begin::Col-->
										<div class="col-lg-2">
											<!--begin::Image input-->
											<div id="pt_jewel_photo_edit" class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url('assets/media/svg/avatars/blank.svg')">
												<?php 
												if($redemption_details->NETPAYABLE !="")
												{?>
													<img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($jewel_photo->ITEM_PHOTO); ?>" height="125px" width="125px">
													
												<?php
												 }
												 else
												 {
												?>
												<!--begin::Preview existing avatar-->
												<div class="image-input-wrapper w-125px h-125px" style="background-image: url(assets/media/svg/avatars/blank.svg)">
													
												</div>
												<?php 
													}
												?>
												
											</div>
											<!--end::Image input-->
											
										</div>
									</div>
								</div>

								<div id="div_company_close_edit" style="<?php if($redemption_details->CLOSING_TYPE=='COMPANY_CLOSE') {echo 'display: block;'; } else { echo 'display: none;'; }?>;" >
									<input type="hidden" name="ccl_on_acc_edit" id="ccl_on_acc_edit"  class="form-control form-control-lg form-control-solid" style="margin-top: 8px !important;">
									<div class="row">
										<label class="col-lg-1 col-form-label fw-bold fs-6">Verified : </label>
										<label class="col-lg-1 col-form-label fw-semibold fs-6" id="ccl_verified_by_edit"  name="ccl_verified_by_edit"><?php echo $_SESSION['username']; ?></label>
										
									</div>
									<div class="row">
										<!--begin::Label-->
										<label class="col-md-1 col-form-label fw-bold fs-6">HL Bal</label>
										<!--end::Label-->
										<!--begin::Col-->
										<div class="col-lg-2 fv-row fv-plugins-icon-container">
											<input type="text" name="ccl_hl_bal_side1_edit" id="ccl_hl_bal_side1_edit" class="form-control form-control-lg form-control-solid" style="background-color: #cb431a !important;font-size: 16px !important;font-weight: 600 !important;color: white!important;" readonly onfocus="getOnAccount_edit();" value="<?php echo $redemption_details->HL_AMOUNT; ?>">
											<div class="fv-plugins-message-container invalid-feedback"></div>
										</div>
										<!--end::Col-->
										<!--begin::Col-->
										<div class="col-lg-2 fv-row fv-plugins-icon-container">
											<input type="text" name="ccl_hl_bal_side2_edit" id="ccl_hl_bal_side2_edit" class="form-control form-control-lg form-control-solid" style="background-color: #cb431a !important;font-size: 16px !important;font-weight: 600 !important;color: white!important;" readonly value="<?php echo $redemption_details->HL_AMOUNT; ?>">
											<div class="fv-plugins-message-container invalid-feedback"></div>
										</div>
										<!--end::Col-->
										
									</div>
									
										<div class="row">
											<!-- <label class="col-lg-auto col-form-label fw-bold fs-6">Bill Mode</label> -->
											<!--begin::Left Section-->
											<div class="col-lg-auto">
												<!--begin::Select-->
												<select class="form-select form-select-solid" data-control="select2" data-hide-search="true" style="margin-top: 8px !important;" name="ccl_bill_mode_edit" id="ccl_bill_mode_edit" >	
													<option value="CASH">Cash</option>	
													<option value="CREDIT">Credit</option>
												</select>
												<!--end::Select-->
											</div>
											<div class="col-md-2" id="div_ccl_ledgers1_edit" style="display: none;">
												<!--begin::Select-->
												<select class="form-select form-select-solid" data-control="select2" data-hide-search="true" style="margin-top: 8px !important;" name="ccl_ledgers1_edit" id="ccl_ledgers1_edit" >	
													<option value="">select</option>	
													
												</select>
												<!--end::Select-->
											</div>
											<!--begin::Label-->
											<label class="col-md-auto col-form-label fw-bold fs-6">Sales Amount</label>
											<!--end::Label-->
											<!--begin::Col-->
											<div class="col-lg-2 fv-row fv-plugins-icon-container" >
												<input type="text"  class="form-control form-control-lg form-control-solid" style="margin-top: 8px !important;" name="ccl_sale_amt_edit" id="ccl_sale_amt_edit">
												<div class="fv-plugins-message-container invalid-feedback"></div>
											</div>
											<!--end::Col-->
											<div class="col-md-2">
												<!--begin::Select-->
												<select class="form-select form-select-solid" data-control="select2" data-hide-search="true" name="ccl_ledgers_edit" id="ccl_ledgers_edit">	
													<!-- <option value="0">Select</option>		 -->		
													<option value="Profit">Profit</option>
													<option value="Loss">Loss</option>
												</select>
												<!--end::Select-->
											</div>
											<div class="col-lg-2 fv-row fv-plugins-icon-container">
												<input type="text" name="ccl_profit_loss_edit" id="ccl_profit_loss_edit" class="form-control form-control-lg form-control-solid" style="margin-top: 8px !important;">
												<div class="fv-plugins-message-container invalid-feedback"></div>
											</div>
										</div>
										<div class="row">
											<!--begin::Label-->
											<label class="col-md-1 col-form-label fw-bold fs-6">Party</label>
											<!--end::Label-->
											<!--begin::Col-->
											<div class="col-lg-2 fv-row fv-plugins-icon-container">
												<input type="text"  class="form-control form-control-lg form-control-solid" style="margin-top: 8px !important;" value="<?php echo $loan_details->NAME; ?>">
												<div class="fv-plugins-message-container invalid-feedback"></div>
											</div>
											<!--end::Col-->
											<!--begin::Label-->
											<label class="col-md-auto col-form-label fw-bold fs-6">Received Cash</label>
											<!--end::Label-->
											<!--begin::Col-->
											<div class="col-lg-2 fv-row fv-plugins-icon-container">
												<input type="text" name="ccl_rcvd_cash_edit" id="ccl_rcvd_cash_edit" class="form-control form-control-lg form-control-solid" style="margin-top: 8px !important;" value="<?php echo $redemption_details->PAIDAMOUNT; ?>">
												<div class="fv-plugins-message-container invalid-feedback"></div>
											</div>
											<!--end::Col-->
											<!--begin::Label-->
											<label class="col-md-auto col-form-label fw-bold fs-6">Balance</label>
											<!--end::Label-->
											<!--begin::Col-->
											<div class="col-lg-2 fv-row fv-plugins-icon-container">
												<input type="text" name="ccl_balance_edit" id="ccl_balance_edit" class="form-control form-control-lg form-control-solid" style="margin-top: 8px !important;" value="<?php echo $redemption_details->BALANCE; ?>">
												<div class="fv-plugins-message-container invalid-feedback"></div>
											</div>
											<!--end::Col-->
										</div>
									<br>
									<div class="row mb-6">
										<!--begin::Label-->
										<label class="col-lg-1 col-form-label fw-bold fs-6">Party</label>
										<!--end::Label-->
										<!--begin::Col-->
										<div class="col-lg-2">
											<!--begin::Image input-->
											<div id="ccl_party_photo_edit" class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url('assets/media/svg/avatars/blank.svg')">
												<?php 
												if($redemption_details->NETPAYABLE !="")
												{?>
													<img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($party_photo->PHOTO); ?>" height="125px" width="125px">
													
												<?php
												 }
												 else
												 {
												?>
												<!--begin::Preview existing avatar-->
												<div class="image-input-wrapper w-125px h-125px" style="background-image: url(assets/media/svg/avatars/blank.svg)">
													
												</div>
												<?php 
													}
												?>
											</div>
											<!--end::Image input-->
										</div>
										<!--end::Col-->
										<!--begin::Label-->
										<label class="col-lg-1 col-form-label fw-bold fs-6">Jewel</label>
										<!--end::Label-->
										<!--begin::Col-->
										<div class="col-lg-2">
											<!--begin::Image input-->
											<div id="ccl_jewel_photo_edit" class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url('assets/media/svg/avatars/blank.svg')">
												<?php 
												if($redemption_details->NETPAYABLE !="")
												{?>
													<img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($jewel_photo->ITEM_PHOTO); ?>" height="125px" width="125px">
													
												<?php
												 }
												 else
												 {
												?>
												<!--begin::Preview existing avatar-->
												<div class="image-input-wrapper w-125px h-125px" style="background-image: url(assets/media/svg/avatars/blank.svg)">
													
												</div>
												<?php 
													}
												?>
												
											</div>
											<!--end::Image input-->
											
										</div>
										<!--begin::Col-->
										<label class="col-lg-1 col-form-label fw-bold fs-6" id="rem" >Remarks</label>
										<div class="col-lg-5 fv-row fv-plugins-icon-container" id="rem_tr" >
											<textarea class="form-control" name="ccl_remarks_edit" id="ccl_remarks_edit" data-kt-autosize="true" rows="2" style="margin-top: 8px !important; overflow: hidden; overflow-wrap: break-word; resize: none; height: 101px;" data-kt-initialized="1"><?php echo $redemption_details->SELLINGREMARKS; ?></textarea>
										</div>
										<!--end::Col-->
									</div>
								</div>

								<div id="div_company_transfer_edit" style="<?php if($redemption_details->CLOSING_TYPE=='COMPANY_TRANSFER') {echo 'display: block;'; } else { echo 'display: none;'; }?>;" >
									<div class="row">
										<!--begin::Label-->
										<label class="col-lg-2 col-form-label fw-bold fs-6">Paper Action Charge</label>
										<!--end::Label-->
										<!--begin::Col-->
										<div class="col-lg-1 fv-row fv-plugins-icon-container">
											<input type="text" name="ct_pap_act_edit" id="ct_pap_act_edit" class="form-control form-control-lg form-control-solid" style="margin-top: 8px !important;" value="<?php echo $redemption_details->MAINTAINCHARGE; ?>">
											<div class="fv-plugins-message-container invalid-feedback"></div>
										</div>
										<!--end::Col-->
										<!--begin::Label-->
										<label class="col-lg-2 col-form-label fw-bold fs-6">Notice charge</label>
										<!--end::Label-->
										<!--begin::Col-->
										<div class="col-lg-1 fv-row fv-plugins-icon-container">
											<input type="text" name="ct_not_chg_edit" id="ct_not_chg_edit" class="form-control form-control-lg form-control-solid" style="margin-top: 8px !important;" value="<?php echo $redemption_details->NOTICECHARGE; ?>">
											<div class="fv-plugins-message-container invalid-feedback"></div>
										</div>
										<!--end::Col-->
										<!--begin::Label-->
										<label class="col-lg-1 col-form-label fw-bold fs-6">Discount</label>
										<!--end::Label-->
										<!--begin::Col-->
										<div class="col-lg-1 fv-row fv-plugins-icon-container">
											<input type="text" name="ct_discount_edit" id="ct_discount_edit" class="form-control form-control-lg form-control-solid" style="margin-top: 8px !important;" value="<?php echo $redemption_details->DISCOUNT; ?>">
											<div class="fv-plugins-message-container invalid-feedback"></div>
										</div>
										<!--end::Col-->
										<label class="col-lg-1 col-form-label fw-bold fs-6">Method</label>
										<!--begin::Left Section-->
										<div class="col-md-2">
											<!--begin::Select-->
											<select class="form-select form-select-solid" data-control="select2" data-hide-search="true" style="margin-top: 8px !important;" name="ct_method_edit" id="ct_method_edit">	
												<option value="CASH">Cash</option>
												<option value="CREDIT">Credit</option>
											</select>
											<!--end::Select-->
										</div>
									</div>
									<div class="row">
										<!--begin::Label-->
										<label class="col-lg-2 col-form-label fw-bold fs-6">Received Cash</label>
										<!--end::Label-->
										<!--begin::Col-->
										<div class="col-lg-1 fv-row fv-plugins-icon-container">
											<input type="text"  class="form-control form-control-lg form-control-solid" style="margin-top: 8px !important;" name="ct_rcvd_cash_edit" id="ct_rcvd_cash_edit" value="<?php echo $redemption_details->PAIDAMOUNT; ?>">
											<div class="fv-plugins-message-container invalid-feedback"></div>
										</div>
										<!--end::Col-->
										<!--begin::Label-->
										<label class="col-lg-2 col-form-label fw-bold fs-6">Form Missing</label>
										<!--end::Label-->
										<!--begin::Col-->
										<div class="col-lg-1 fv-row fv-plugins-icon-container">
											<input type="text"  class="form-control form-control-lg form-control-solid" style="margin-top: 8px !important;" name="ct_form_miss_edit" id="ct_form_miss_edit" value="<?php echo $redemption_details->FORMCHARGE; ?>">
											<div class="fv-plugins-message-container invalid-feedback"></div>
										</div>
										<!--end::Col-->
										<!--begin::Label-->
										<label class="col-md-1 col-form-label fw-bold fs-6">On A/c</label>
										<!--end::Label-->
										<!--begin::Col-->
										<div class="col-lg-1 fv-row fv-plugins-icon-container">
											<input type="text" name="ct_on_acc_edit" id="ct_on_acc_edit" onfocus="getOnAccount_edit();" class="form-control form-control-lg form-control-solid" style="margin-top: 8px !important;" value="<?php echo $redemption_details->HL_AMOUNT; ?>">
											<div class="fv-plugins-message-container invalid-feedback"></div>
										</div>
										<!--end::Col-->
										<!--begin::Label-->
										<label class="col-lg-1 col-form-label fw-bold fs-6">Net Pay</label>
										<!--end::Label-->
										<!--begin::Col-->
										<div class="col-lg-2 fv-row fv-plugins-icon-container">
											<input type="text" name="ct_net_pay_edit" id="ct_net_pay_edit" class="form-control form-control-lg form-control-solid" style="margin-top: 8px !important;" value="<?php echo $redemption_details->NETPAYABLE; ?>">
											<div class="fv-plugins-message-container invalid-feedback"></div>
										</div>
										<!--end::Col-->	
									</div>
								
									<div class="row">
										
										<!--end::Col-->
										<label class="col-lg-1 col-form-label fw-bold fs-6">Verified : </label>
										<label class="col-lg-1 col-form-label fw-semibold fs-6" name="ct_verified_by_edit" id="ct_verified_by_edit"><?php echo $_SESSION['username']; ?></label>
										
									</div>
									<div class="row">
										<!--begin::Label-->
										<label class="col-md-1 col-form-label fw-bold fs-6">HL Bal</label>
										<!--end::Label-->
										<!--begin::Col-->
										<div class="col-lg-2 fv-row fv-plugins-icon-container">
											<input type="text"  class="form-control form-control-lg form-control-solid" name="ct_hl_bal_side1_edit" id="ct_hl_bal_side1_edit" style="background-color: #cb431a !important;font-size: 16px !important;font-weight: 600 !important;color: white!important;" value="<?php echo $redemption_details->HL_AMOUNT; ?>">
											<div class="fv-plugins-message-container invalid-feedback"></div>
										</div>
										<!--end::Col-->
										<!--begin::Col-->
										<div class="col-lg-2 fv-row fv-plugins-icon-container">
											<input type="text" name="ct_hl_bal_side2_edit" id="ct_hl_bal_side2_edit" class="form-control form-control-lg form-control-solid" style="background-color: #cb431a !important;font-size: 16px !important;font-weight: 600 !important;color: white!important;" value="<?php echo $redemption_details->HL_AMOUNT; ?>">
											<div class="fv-plugins-message-container invalid-feedback"></div>
										</div>
										<!--end::Col-->
										<!--begin::Label-->
										<label class="col-md-1 col-form-label fw-bold fs-6" id="newbill"   >New Bill</label>
										<!--end::Label-->
										<!--begin::Col-->
										<div class="col-lg-2 fv-row fv-plugins-icon-container" id="newbill_tbox_edit"   >
											<input type="text" name="ct_new_bill_no_edit_edit" id="ct_new_bill_no_edit_edit" class="form-control form-control-lg form-control-solid" style="margin-top: 8px !important;" value="<?php echo $redemption_details->NEWBILLNO; ?>">
											<div class="fv-plugins-message-container invalid-feedback"></div>
										</div>
										<!--end::Col-->
										<!--begin::Label-->
										<label class="col-md-auto col-form-label fw-bold fs-6" id="loanamount"   >Loan Amt</label>
										<!--end::Label-->
										<!--begin::Col-->
										<div class="col-lg-2 fv-row fv-plugins-icon-container" id="loanamount_tbox"   >
											<input type="text" name="ct_loan_amt_edit" id="ct_loan_amt_edit" class="form-control form-control-lg form-control-solid" style="margin-top: 8px !important;"  value="<?php echo $redemption_details->NEWLOANAMOUNT; ?>">
											<div class="fv-plugins-message-container invalid-feedback"></div>
										</div>
										<!--end::Col-->
									</div>
									
									<div class="row mb-6">
										<!--begin::Label-->
										<label class="col-lg-1 col-form-label fw-bold fs-6">Party</label>
										<!--end::Label-->
										<!--begin::Col-->
										<div class="col-lg-2">
											<!--begin::Image input-->
											<div id="ct_party_photo_edit" class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url('assets/media/svg/avatars/blank.svg')">
												<?php 
												if($redemption_details->NETPAYABLE !="")
												{?>
													<img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($party_photo->PHOTO); ?>" height="125px" width="125px">
													
												<?php
												 }
												 else
												 {
												?>
												<!--begin::Preview existing avatar-->
												<div class="image-input-wrapper w-125px h-125px" style="background-image: url(assets/media/svg/avatars/blank.svg)">
													
												</div>
												<?php 
													}
												?>
											</div>
											<!--end::Image input-->
										</div>
										<!--end::Col-->
										<!--begin::Label-->
										<label class="col-lg-1 col-form-label fw-bold fs-6">Jewel</label>
										<!--end::Label-->
										<!--begin::Col-->
										<div class="col-lg-2">
											<!--begin::Image input-->
											<div id="ct_jewel_photo_edit" class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url('assets/media/svg/avatars/blank.svg')">
												<?php 
												if($redemption_details->NETPAYABLE !="")
												{?>
													<img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($jewel_photo->ITEM_PHOTO); ?>" height="125px" width="125px">
													
												<?php
												 }
												 else
												 {
												?>
												<!--begin::Preview existing avatar-->
												<div class="image-input-wrapper w-125px h-125px" style="background-image: url(assets/media/svg/avatars/blank.svg)">
													
												</div>
												<?php 
													}
												?>
												
											</div>
											<!--end::Image input-->
										</div>
										
									</div>
								</div>
								<div id="div_party_sale_edit" style="display: none;">
									<div class="row">
										<!--begin::Label-->
										<label class="col-lg-2 col-form-label fw-bold fs-6">Paper Action Charge</label>
										<!--end::Label-->
										<!--begin::Col-->
										<div class="col-lg-1 fv-row fv-plugins-icon-container">
											<input type="text" name="ps_pap_act" id="ps_pap_act_edit" class="form-control form-control-lg form-control-solid" style="margin-top: 8px !important;">
											<div class="fv-plugins-message-container invalid-feedback"></div>
										</div>
										<!--end::Col-->
										<!--begin::Label-->
										<label class="col-lg-2 col-form-label fw-bold fs-6">Notice charge</label>
										<!--end::Label-->
										<!--begin::Col-->
										<div class="col-lg-1 fv-row fv-plugins-icon-container">
											<input type="text" name="ps_not_chg_edit" id="ps_not_chg_edit" class="form-control form-control-lg form-control-solid" style="margin-top: 8px !important;">
											<div class="fv-plugins-message-container invalid-feedback"></div>
										</div>
										<!--end::Col-->
										<!--begin::Label-->
										<label class="col-lg-1 col-form-label fw-bold fs-6">Discount</label>
										<!--end::Label-->
										<!--begin::Col-->
										<div class="col-lg-1 fv-row fv-plugins-icon-container">
											<input type="text" name="ps_discount_edit" id="ps_discount_edit" class="form-control form-control-lg form-control-solid" style="margin-top: 8px !important;">
											<div class="fv-plugins-message-container invalid-feedback"></div>
										</div>
										<!--end::Col-->
										<label class="col-lg-1 col-form-label fw-bold fs-6">Method</label>
										<!--begin::Left Section-->
										<div class="col-md-2">
											<!--begin::Select-->
											<select class="form-select form-select-solid" data-control="select2" name="ps_method_edit" id="ps_method_edit" data-hide-search="true">	
												<option value="CASH">Cash</option>
												<option value="CREDIT">Credit</option>
											</select>
											<!--end::Select-->
										</div>
									</div>
									<div class="row">
										<!--begin::Label-->
										<label class="col-lg-2 col-form-label fw-bold fs-6">Received Cash</label>
										<!--end::Label-->
										<!--begin::Col-->
										<div class="col-lg-1 fv-row fv-plugins-icon-container">
											<input type="text" name="ps_rcvd_cash_edit" id="ps_rcvd_cash_edit" class="form-control form-control-lg form-control-solid" style="margin-top: 8px !important;">
											<div class="fv-plugins-message-container invalid-feedback"></div>
										</div>
										<!--end::Col-->
										<!--begin::Label-->
										<label class="col-lg-2 col-form-label fw-bold fs-6">Form Missing</label>
										<!--end::Label-->
										<!--begin::Col-->
										<div class="col-lg-1 fv-row fv-plugins-icon-container">
											<input type="text" name="ps_form_miss_edit" id="ps_form_miss_edit" class="form-control form-control-lg form-control-solid" style="margin-top: 8px !important;">
											<div class="fv-plugins-message-container invalid-feedback"></div>
										</div>
										<!--end::Col-->
										<!--begin::Label-->
										<label class="col-md-1 col-form-label fw-bold fs-6">On A/c</label>
										<!--end::Label-->
										<!--begin::Col-->
										<div class="col-lg-1 fv-row fv-plugins-icon-container">
											<input type="text" name="ps_on_acc_edit" id="ps_on_acc_edit" onfocus="getOnAccount_edit();" class="form-control form-control-lg form-control-solid" style="margin-top: 8px !important;">
											<div class="fv-plugins-message-container invalid-feedback"></div>
										</div>
										<!--end::Col-->
										<!--begin::Label-->
										<label class="col-lg-1 col-form-label fw-bold fs-6">Net Pay</label>
										<!--end::Label-->
										<!--begin::Col-->
										<div class="col-lg-2 fv-row fv-plugins-icon-container">
											<input type="text" name="ps_net_pay_edit" id="ps_net_pay_edit" class="form-control form-control-lg form-control-solid" style="margin-top: 8px !important;">
											<div class="fv-plugins-message-container invalid-feedback"></div>
										</div>
										<!--end::Col-->	
									</div>
								
									<div class="row">
										<label class="col-lg-1 col-form-label fw-bold fs-6" id="closedby"  >Cls By</label>
										<!--begin::Left Section-->
										<div class="col-md-2" id="closedby_dbox"  >
											<!--begin::Select-->
											<select class="form-select form-select-solid" data-control="select2" name="ps_cls_by_edit" id="ps_cls_by_edit" data-hide-search="true">	
												<option value="0">Party</option>			
												<option value="1">Nominee</option>
												<option value="2">Others</option>
											</select>
											<!--end::Select-->
										</div>
										<!--begin::Label-->
										<label class="col-md-1 col-form-label fw-bold fs-6" id="party_nm"  >Name</label>
										<!--end::Label-->
										<!--begin::Col-->
										<div class="col-lg-2 fv-row fv-plugins-icon-container" id="party_nm_tbox"  >
											<input type="text" name="ps_party_name_edit" id="ps_party_name_edit" class="form-control form-control-lg form-control-solid" style="margin-top: 8px !important;">
											<div class="fv-plugins-message-container invalid-feedback"></div>
										</div>
										<!--end::Col-->
										<label class="col-lg-1 col-form-label fw-bold fs-6">Verified : </label>
										<label class="col-lg-1 col-form-label fw-semibold fs-6" id="ps_verified_by_edit" name="ps_verified_by_edit"><?php echo $_SESSION['username']; ?> </label>
										<label class="col-md-auto col-form-label fw-bold fs-6">Balance</label>
										<!--begin::Col-->
										<div class="col-lg-2 fv-row fv-plugins-icon-container" id="balance_tbox"  >
											<input type="text" name="ps_balance_edit" id="ps_balance_edit" class="form-control form-control-lg form-control-solid" style="margin-top: 8px !important;">
											<div class="fv-plugins-message-container invalid-feedback"></div>
										</div>
										<!--end::Col-->
									</div>
									<div class="row">
										<!--begin::Label-->
										<label class="col-md-1 col-form-label fw-bold fs-6">HL Bal</label>
										<!--end::Label-->
										<!--begin::Col-->
										<div class="col-lg-2 fv-row fv-plugins-icon-container">
											<input type="text" name="ps_hl_bal_side1_edit" id="ps_hl_bal_side1_edit" class="form-control form-control-lg form-control-solid" style="background-color: #cb431a !important;font-size: 16px !important;font-weight: 600 !important;color: white!important;"> 
											<!-- #cb431a -->
											<div class="fv-plugins-message-container invalid-feedback"></div>
										</div>
										<!--end::Col-->
										<!--begin::Col-->
										<div class="col-lg-2 fv-row fv-plugins-icon-container">
											<input type="text" name="ps_hl_bal_side2_edit" id="ps_hl_bal_side2_edit" class="form-control form-control-lg form-control-solid" style="background-color: #cb431a !important;font-size: 16px !important;font-weight: 600 !important;color: white!important;">
											<div class="fv-plugins-message-container invalid-feedback"></div>
										</div>
										<!--end::Col-->
										<!--begin::Label-->
										<label class="col-md-1 col-form-label fw-bold fs-6" id="newbill"  >New Pur. No</label>
										<!--end::Label-->
										<!--begin::Col-->
										<div class="col-lg-2 fv-row fv-plugins-icon-container" id="newbill_tbox"  >
											<input type="text" name="ps_new_bill_no_edit" id="ps_new_bill_no_edit" class="form-control form-control-lg form-control-solid" style="margin-top: 8px !important;">
											<div class="fv-plugins-message-container invalid-feedback"></div>
										</div>
										<!--end::Col-->
										<!--begin::Label-->
										<label class="col-md-auto col-form-label fw-bold fs-6" id="loanamount"  >Purchase Amt</label>
										<!--end::Label-->
										<!--begin::Col-->
										<div class="col-lg-2 fv-row fv-plugins-icon-container" id="loanamount_tbox"  >
											<input type="text" name="ps_loan_amt_edit" id="ps_loan_amt_edit" class="form-control form-control-lg form-control-solid" style="margin-top: 8px !important;">
											<div class="fv-plugins-message-container invalid-feedback"></div>
										</div>
										<!--end::Col-->
									</div>
									
									<div class="row mb-6">
										<!--begin::Label-->
										<label class="col-lg-1 col-form-label fw-bold fs-6">Party</label>
										<!--end::Label-->
										<!--begin::Col-->
										<div class="col-lg-2">
											<!--begin::Image input-->
											<div id="ps_party_photo_edit" class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url('assets/media/svg/avatars/blank.svg')">
												<?php 
												if($redemption_details->NETPAYABLE !="")
												{?>
													<img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($party_photo->PHOTO); ?>" height="125px" width="125px">
													
												<?php
												 }
												 else
												 {
												?>
												<!--begin::Preview existing avatar-->
												<div class="image-input-wrapper w-125px h-125px" style="background-image: url(assets/media/svg/avatars/blank.svg)">
													
												</div>
												<?php 
													}
												?>
											</div>
											<!--end::Image input-->
										</div>
										<!--end::Col-->
										<!--begin::Label-->
										<label class="col-lg-1 col-form-label fw-bold fs-6">Jewel</label>
										<!--end::Label-->
										<!--begin::Col-->
										<div class="col-lg-2">
											<!--begin::Image input-->
											<div id="ps_jewel_photo_edit" class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url('assets/media/svg/avatars/blank.svg')">
												<?php 
												if($redemption_details->NETPAYABLE !="")
												{?>
													<img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($jewel_photo->ITEM_PHOTO); ?>" height="125px" width="125px">
													
												<?php
												 }
												 else
												 {
												?>
												<!--begin::Preview existing avatar-->
												<div class="image-input-wrapper w-125px h-125px" style="background-image: url(assets/media/svg/avatars/blank.svg)">
													
												</div>
												<?php 
													}
												?>
												
											</div>
											<!--end::Image input-->
										</div>
										
									</div>
								</div>

							</div><br>
							<div class="row">
								<div class="col-lg-8"><input class="form-check-input" type="checkbox" name="chkprint_edit" id="chkprint_edit" checked> <label style="color: red; font-size: 14px;font-weight: bold;"> Save & Print </label></div>
								<div class="col-lg-1 d-flex flex-center">
									<button type="reset" class="btn btn-secondary me-3" id="cancel_butt" data-bs-dismiss="modal" onclick="closeEditModal();">Cancel</button>
								</div>
								<div class="col-lg-2 flex-center" >
									<!-- <input type="button" class="btn btn-primary"  id="btn_save" name ="btn_save" value="Save Changes" onclick="form_submit()"> -->
									<button  class="btn btn-primary"  id="btn_save_edit" name ="btn_save_edit"  onclick="return update_validation()">Save Changes</button>
								</div>
							</div>
						</div>
					</div>
					<!--end::Modal body-->
				</div>
				<!--end::Modal content-->
			</div>
			<!--end::Modal dialog-->