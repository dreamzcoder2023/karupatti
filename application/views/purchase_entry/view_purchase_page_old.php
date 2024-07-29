<!--begin::Modal dialog-->
		<div class="modal-dialog modal-xl">
			<!--begin::Modal content-->
			<div class="modal-content rounded">
				<!--begin::Modal header-->
				<div class="modal-header justify-content-end border-0 pb-0">
					<!--begin::Close-->
					<div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal" onclick="CloseViewModallotentry();">
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

				<form name="purchase_entry_view" id="purchase_entry_view" method="POST" action="<?php echo base_url(); ?>Purchase_entry/purchaseentry_view" enctype="multipart/form-data">
						<!-- <input type="hidden" id="lotentry_view_id" name="lotentry_view_id" value="<?php echo $purchaseentry_view_list->LOT_ID;?>"> -->
				<div class="modal-body pt-0 pb-15 px-5 px-xl-20">
					<!--begin::Heading-->
					<div class="mb-13 text-center">
						<h1 class="mb-3">View Purchase Entry</h1>	
					</div>
					<!--end::Heading-->
						<div class="row">
											<label class="col-lg-1 col-form-label fw-semibold fs-6">Date</label>
											<div class="col-lg-2 fv-row">
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
													<input class="form-control form-control-solid ps-12" name="date" placeholder="Date" id="kt_daterangepicker_lot_entry_add_date" value="<?php echo $purchaseentry_view_list->ENTRY_DATE;?>"/>
												</div>
												<div class="fv-plugins-message-container invalid-feedback" id="date_err"></div>
											</div>
											<label class="col-lg-1 col-form-label fw-semibold fs-6">Supplier</label>
											<!--begin::Left Section-->
											<div class="col-lg-3 fv-row fv-plugins-icon-container">
												<input type="text" name="" class="form-control form-control-lg form-control-solid" value="<?php echo $purchaseentry_view_list->SUPPLIER;?>" readonly>
												<div class="fv-plugins-message-container invalid-feedback"></div>
											</div>
											<!--end::Left Section-->
												<!-- <div class="col-lg-1 fv-row fv-plugins-icon-container">
													<input type="text" name="" class="form-control form-control-lg form-control-solid" placeholder="" value = "10000" style="background-color: lightgreen;">
													<div class="fv-plugins-message-container invalid-feedback"></div>
												</div> -->
											<label class="col-lg-1 col-form-label fw-semibold fs-6">Metal</label>
											<div class="col-lg-2 fv-row fv-plugins-icon-container">
												<input type="text" name="" class="form-control form-control-lg form-control-solid" value="<?php echo $purchaseentry_view_list->METAL_TYPE;?>" readonly>
												<div class="fv-plugins-message-container invalid-feedback"></div>
											</div>

											<!-- <div class="col-lg-1 fv-row fv-plugins-icon-container fv-plugins-bootstrap5-row-invalid">
												<div class="d-flex align-items-center mt-1">
													<label class="form-check form-check-inline form-check-solid me-5 is-invalid">
														<input class="form-check-input" name="communication[]" type="checkbox" value="1" id="" onclick="">
													</label>
													<label class="col-form-label fw-semibold fs-6 me-5">RTGS</label>
												</div>
											</div> -->

											<div class="fv-plugins-message-container invalid-feedback" id="metal_type_err"></div>
										</div><br>
									<!--<div class="row">

											<div class="row">
													<label class="col-lg-1 col-form-label fw-bold fs-6 text-underlined">Curr.Rate  </label>
													<label class="col-lg-1 col-form-label fw-semibold fs-6" name="gold_new_purchase" id="gold_new_purchase">Gold : </label>
													<label class="col-lg-1 col-form-label fw-bold fs-6">4563.00 </label>
													<label class="col-lg-1 col-form-label fw-semibold fs-6" name="silver_new_purchase" id="silver_new_purchase">Silver : </label>
													<label class="col-lg-1 col-form-label fw-bold fs-6">57.53</label>			
											</div>
										</div> -->
										<div class="row mb-6" id="lot_gold">
											<div class="accordion" id="kt_accordion_1">
											    <div class="accordion-item">
											        <h2 class="accordion-header" id="kt_accordion_1_header_1">
											            <button class="accordion-button fw-semibold fs-6 collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#kt_accordion_1_body_1" aria-expanded="false" aria-controls="kt_accordion_1_body_1" id="item_select">
											                Items
											            </button>
											        </h2>
											        <div id="kt_accordion_1_body_1" class="accordion-collapse collapse" aria-labelledby="kt_accordion_1_header_1" data-bs-parent="#kt_accordion_1" style="overflow: scroll !important;">
											            <div class="accordion-body" style="height: auto !important;overflow: show;">
											           	  <table class="table table-striped border rounded table-hover fs-7 gs-2 gy-1" id="">
															    <thead style=" background-color: #A7D3F0 !important;border: 1px solid #606060 !important;color: black !important; text-align: center;">
															        <tr class="fw-bold fs-6 gs-0">
															            <th class="min-w-125px cy">LOT_ID</th>
															            <th class="min-w-150px">Item Name</th>
															             <th class="min-w-350px">Sub Item Name</th>
															            <th class="min-w-125px">Purity</th>
															            <th class="min-w-100px">Count</th>
															            <th class="min-w-100px">Weight</th>
															            
															        </tr>
															    </thead>
															    <tbody>

																<tr>
														            <td>
														            	<?php echo $purchaseentry_items_list->LOT_ID;?>
														            </td>
													            <td>
													            	
														         <?php echo $purchaseentry_items_list->ITEM_NAME;?>
													            </td>
													            <td>
													            	<?php echo $purchaseentry_items_list->SUBITEM_NAME;?>
													            </td>
													             <td>
													             	<?php echo $purchaseentry_items_list->PURITY ;?>
													            </td>
													            <td>
													            	<?php echo $purchaseentry_items_list->COUNT;?>
													            </td>
													            <td>
													            	<?php echo $purchaseentry_items_list->WEIGHT;?>
													            </td>  
															    </tr>
															   
																
															     </tbody>
															</table>
											            </div>
											        </div>
											    </div>
											</div>
										</div><br>
											<div style="padding: 5px 5px 5px 5px !important;box-shadow: 0 3px 6px #00002947;border-radius: 5px;background-color: #f5f5f1;">
												<label class="col-form-label fw-bold fs-6"><u>Total Calculation</u></label>
												<div class="row">
													<label class="col-lg-1 col-form-label fw-semibold fs-6"> Count</label>
													<div class="col-lg-1 fv-row fv-plugins-icon-container">
														<input type="text" name="total_count" id="total_count" class="form-control form-control-lg form-control-solid" placeholder="Count" value="<?php echo $purchaseentry_view_list->TOTAL_COUNT;?>" readonly>
														<div class="fv-plugins-message-container invalid-feedback"></div>
													</div>
													<label class="col-lg-1 col-form-label fw-semibold fs-6"> Weight</label>
													<div class="col-lg-1 fv-row fv-plugins-icon-container">
														<input type="text" name="total_weight" id="total_weight" class="form-control form-control-lg form-control-solid" placeholder="Weight" value="<?php echo $purchaseentry_view_list->TOTAL_WEIGHT;?>" readonly>
														<div class="fv-plugins-message-container invalid-feedback"></div>
													</div>
													<label class="col-lg-2 col-form-label fw-semibold fs-6">Other charges</label>
													<div class="col-lg-1 fv-row fv-plugins-icon-container">
														<input type="text" name="other_charges" id="other_charges" class="form-control form-control-lg form-control-solid" placeholder="charges" value="<?php echo $purchaseentry_view_list->CHARGES;?>" readonly>
														<div class="fv-plugins-message-container invalid-feedback"></div>
													</div>
													<label class="col-lg-1 col-form-label fw-semibold fs-6">Amount</label>
													<div class="col-lg-1 fv-row fv-plugins-icon-container">
														<input type="text" name="amount_pay" id="amount_pay" class="form-control form-control-lg form-control-solid" placeholder="Amount" value="<?php echo $purchaseentry_view_list->METAL_AMT;?>" readonly >
														<div class="fv-plugins-message-container invalid-feedback"></div>
													</div>
												</div>
											</div><br>
					
									<div style="padding: 5px 5px 5px 5px !important;box-shadow: 0 3px 6px #00002947;border-radius: 5px;background-color: #f5f5f1;">
												<label class="col-form-label fw-bold fs-6"><u>PAYMENT DETAILS</u></label>

												<div class="row">
													<label class="col-lg-1 col-form-label fw-semibold fs-6" id="cash_lt_ey_label">Cash</label>
													<div class="col-lg-2 fv-row fv-plugins-icon-container" id="cash_lt_ey_tbox">
														<input type="text" class="form-control form-control-lg form-control-solid" name="cash_pay" id="cash_pay" placeholder="Cash Amount" value="<?php echo $purchaseentry_view_list->PAID_AMOUNT;?>" readonly>

														<!-- oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" -->
														<div class="fv-plugins-message-container invalid-feedback"></div>
													</div>
												</div>
												<div class="row">
													<label class="col-lg-1 col-form-label fw-semibold fs-6" id="cheque_lt_ey_label">Cheque</label>
													<div class="col-lg-2 fv-row fv-plugins-icon-container" id="cheque_lt_ey_tbox" >
														<input type="text" name="cheq_pay" id="cheq_pay" class="form-control form-control-lg form-control-solid" placeholder="Cheque Amount" value="<?php echo $purchaseentry_view_list->CHEQUE_AMOUNT;?>" readonly >
														<div class="fv-plugins-message-container invalid-feedback"></div>
													</div>
													<label class="col-lg-1 col-form-label fw-semibold fs-6" id="bank_lt_ey_label">Bank</label>
												<div class="col-lg-2 fv-row fv-plugins-icon-container">
													<input type="text" name="" class="form-control form-control-lg form-control-solid" value="<?php echo $purchaseentry_view_list->CHEQUE_BANK;?>" readonly>
													<div class="fv-plugins-message-container invalid-feedback"></div>
												</div>
													<label class="col-lg-1 col-form-label fw-semibold fs-6" id="cheque_lt_ey_label">Cheq.no</label>
													<div class="col-lg-2 fv-row fv-plugins-icon-container" id="cheque_lt_ey_tbox" >
														<input type="text" name="cheq_no" id="cheq_no" class="form-control form-control-lg form-control-solid" placeholder="Cheque Number" value="<?php echo $purchaseentry_view_list->CHEQUE_NUMBER;?>" readonly>
														<div class="fv-plugins-message-container invalid-feedback"></div>
													</div>
												
												</div>
												<div class="row">

													<label class="col-lg-1 col-form-label fw-semibold fs-6" id="rtgs_lt_ey_label">RTGS</label>
													<div class="col-lg-2 fv-row fv-plugins-icon-container" id="rtgs_lt_ey_tbox">
														<input type="text" name="rtgs_pay" id="rtgs_pay" class="form-control form-control-lg form-control-solid" placeholder="RTGS Amount" value="<?php echo $purchaseentry_view_list->RTGS;?>" readonly>
														<div class="fv-plugins-message-container invalid-feedback"></div>
													</div>
													<label class="col-lg-1 col-form-label fw-semibold fs-6" id="bank_lt_ey_label">Bank</label>
													<div class="col-lg-2 fv-row fv-plugins-icon-container">
													<input type="text" name="" class="form-control form-control-lg form-control-solid" value="<?php echo $purchaseentry_view_list->BANK;?>" readonly>
													<div class="fv-plugins-message-container invalid-feedback"></div>
												</div>
													<label class="col-lg-1 col-form-label fw-semibold fs-6" id="bank_lt_ey_label">RTGS No</label>
													<div class="col-lg-2 fv-row fv-plugins-icon-container" id="rtgs_lt_ey_tbox">
														<input type="text" name="rtgs_trans" id="rtgs_trans" class="form-control form-control-lg form-control-solid" placeholder="RTGS Trans No" value="">
														<div class="fv-plugins-message-container invalid-feedback"></div>
													</div>
												</div>
												<div class="row">
													<!-- <label class="col-lg-1 col-form-label fw-semibold fs-6" id="metal_lt_ey_label">Metal</label>
													<div class="col-lg-2 fv-row fv-plugins-icon-container" id="metal_lt_ey_tbox">
														<input type="text" name="" class="form-control form-control-lg form-control-solid" placeholder="Metal" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
														<div class="fv-plugins-message-container invalid-feedback"></div>
													</div> -->
													<label class="col-lg-1 col-form-label fw-semibold fs-6" id="purity_lt_ey_label" >Purity</label>
													<div class="col-lg-2 fv-row fv-plugins-icon-container" id="purity_lt_ey_tbox">
														<input type="text" name="purity_pay" id="purity_pay" class="form-control form-control-lg form-control-solid" placeholder="Purity" value="<?php echo $purchaseentry_view_list->METAL_PURITY;?>" readonly>
														<div class="fv-plugins-message-container invalid-feedback"></div>
													</div>
													<label class="col-lg-1 col-form-label fw-semibold fs-6" id="rate_lt_ey_label">Rate</label>
													<div class="col-lg-2 fv-row fv-plugins-icon-container" id="rate_lt_ey_tbox">
														<input type="text" name="rate_pay" id="rate_pay" class="form-control form-control-lg form-control-solid" placeholder="Pure Rate" value="<?php echo $purchaseentry_view_list->METAL_RATE;?>" readonly>
														<div class="fv-plugins-message-container invalid-feedback"></div>
													</div>
													<label class="col-lg-1 col-form-label fw-semibold fs-6" id="mtamt_lt_ey_label" >Mt Amt</label>
													<div class="col-lg-2 fv-row fv-plugins-icon-container" id="mtamt_lt_ey_tbox" >
														<input type="text" name="metal_pay" id="metal_pay" class="form-control form-control-lg form-control-solid" placeholder="Metal Amount"  value="" readonly>
														<div class="fv-plugins-message-container invalid-feedback"></div>
													</div>
												</div>
												<div class="row">
													<label class="col-lg-2 col-form-label fw-semibold fs-6">Total Amt :</label>
													<label class="col-lg-1 col-form-label fw-bold fs-2" id="total_amount"><?php echo $purchaseentry_view_list->METAL_AMT;?></label>

													<!-- <input type="hidden" id="total_amount1" name="total_amount" value="<?php echo $purchaseentry_view_list->TOTAL_AMOUNT;?>" readonly> -->
													<label class="col-lg-2 col-form-label fw-semibold fs-6">Paid Amount :</label>
													<label class="col-lg-1 col-form-label fw-bold fs-2" id="paid_amount_pay"><?php echo $purchaseentry_view_list->PAID_AMOUNT;?></label>
													<!-- <input type="hidden" id="paid_amount_pay1" name="paid_amount_pay" value="<?php echo $purchaseentry_view_list->PAID_AMOUNT;?>" readonly> -->
													<label class="col-lg-2 col-form-label fw-semibold fs-6">Balance Amount :</label>
													<label class="col-lg-1 col-form-label fw-bold fs-2" id="bal_amount"><?php echo $purchaseentry_view_list->BALANCE_AMT;?></label>
													<!-- <input type="hidden" id="bal_amount1" name="bal_amount" value="<?php echo $purchaseentry_view_list->BALANCE_AMT;?>" readonly> -->
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