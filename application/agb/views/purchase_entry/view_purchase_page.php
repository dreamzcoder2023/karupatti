begin::Modal dialog-->
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
											<label class="col-lg-1 col-form-label fw-semibold fs-6">Date :</label>
											<div class="col-lg-2 fv-row">
												<div class="d-flex align-items-center">
												
												
													<label class="col-lg-8 col-form-label fw-semibold fs-6"><?php echo $purchaseentry_view_list->ENTRY_DATE;?></label>
												</div>
												<div class="fv-plugins-message-container invalid-feedback" id="date_err"></div>
											</div>
											<label class="col-lg-1 col-form-label fw-semibold fs-6">Supplier :</label>
											<!--begin::Left Section-->
											<div class="col-lg-3 fv-row fv-plugins-icon-container">
											

												<label class="col-lg-8 col-form-label fw-semibold fs-6"><?php echo $purchaseentry_view_list->SUPPLIER;?></label>

												<div class="fv-plugins-message-container invalid-feedback"></div>
											</div>
											<!--end::Left Section-->
												
											<label class="col-lg-1 col-form-label fw-semibold fs-6">Metal :</label>
											<div class="col-lg-2 fv-row fv-plugins-icon-container">
												

												<label class="col-lg-8 col-form-label fw-semibold fs-6"><?php echo $purchaseentry_view_list->METAL_TYPE;?></label>

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
											<!-- <div class="accordion" id="kt_accordion_1">
											    <div class="accordion-item">
											        <h2 class="accordion-header" id="kt_accordion_1_header_1">
											            <button class="accordion-button fw-semibold fs-6 collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#kt_accordion_1_body_1" aria-expanded="false" aria-controls="kt_accordion_1_body_1" id="item_select">
											                Items
											            </button>
											        </h2>
											        <div id="kt_accordion_1_body_1" class="accordion-collapse collapse" aria-labelledby="kt_accordion_1_header_1" data-bs-parent="#kt_accordion_1" style="overflow: scroll !important;">
											            <div class="accordion-body" style="height: auto !important;overflow: show;">
											           	  
											            </div>
											        </div>
											    </div>
											</div> -->
										</div><br>
											<div style="padding: 5px 5px 5px 5px !important;box-shadow: 0 3px 6px #00002947;border-radius: 5px;background-color: #f5f5f1;">
												<label class="col-form-label fw-bold fs-6"><u>Total Calculation</u></label>
												<div class="row">
													<label class="col-lg-1 col-form-label fw-semibold fs-6"> Count :</label>
													<div class="col-lg-1 fv-row fv-plugins-icon-container">
														<!-- <input type="text" name="total_count" id="total_count" class="form-control form-control-lg form-control-solid" placeholder="Count" value="<?php echo $purchaseentry_view_list->TOTAL_COUNT;?>" readonly> -->

														<label class="col-lg-8 col-form-label fw-semibold fs-6"><?php echo $purchaseentry_view_list->TOTAL_COUNT;?></label>

														<div class="fv-plugins-message-container invalid-feedback"></div>
													</div>
													<label class="col-lg-1 col-form-label fw-semibold fs-6"> Weight : </label>
													<div class="col-lg-1 fv-row fv-plugins-icon-container">
														<!-- <input type="text" name="total_weight" id="total_weight" class="form-control form-control-lg form-control-solid" placeholder="Weight" value="<?php echo $purchaseentry_view_list->TOTAL_WEIGHT;?>" readonly> -->
															<label class="col-lg-8 col-form-label fw-semibold fs-6"><?php echo $purchaseentry_view_list->TOTAL_WEIGHT;?></label>
														<div class="fv-plugins-message-container invalid-feedback"></div>
													</div>
													<label class="col-lg-2 col-form-label fw-semibold fs-6">Other charges :</label>
													<div class="col-lg-1 fv-row fv-plugins-icon-container">
														<!-- <input type="text" name="other_charges" id="other_charges" class="form-control form-control-lg form-control-solid" placeholder="charges" value="<?php echo $purchaseentry_view_list->CHARGES;?>" readonly> -->

															<label class="col-lg-8 col-form-label fw-semibold fs-6"><?php echo $purchaseentry_view_list->CHARGES;?></label>

														<div class="fv-plugins-message-container invalid-feedback"></div>
													</div>
													<label class="col-lg-1 col-form-label fw-semibold fs-6">Amount :</label>
													<div class="col-lg-1 fv-row fv-plugins-icon-container">
														<!-- <input type="text" name="amount_pay" id="amount_pay" class="form-control form-control-lg form-control-solid" placeholder="Amount" value="<?php echo $purchaseentry_view_list->METAL_AMT;?>" readonly > -->

														<label class="col-lg-8 col-form-label fw-semibold fs-6"><?php echo $purchaseentry_view_list->METAL_AMT;?></label>

														<div class="fv-plugins-message-container invalid-feedback"></div>
													</div>
												</div>
											</div><br>
					
									<div style="padding: 5px 5px 5px 5px !important;box-shadow: 0 3px 6px #00002947;border-radius: 5px;background-color: #f5f5f1;">
												<label class="col-form-label fw-bold fs-6"><u>Payments Details</u></label>

												<div class="row">
													<label class="col-lg-1 col-form-label fw-semibold fs-6" id="cash_lt_ey_label">Cash :</label>
													<div class="col-lg-2 fv-row fv-plugins-icon-container" id="cash_lt_ey_tbox">
														<!-- <input type="text" class="form-control form-control-lg form-control-solid" name="cash_pay" id="cash_pay" placeholder="Cash Amount" value="<?php echo $purchaseentry_view_list->PAID_AMOUNT;?>" readonly>-->

														<label class="col-lg-8 col-form-label fw-semibold fs-6"><?php echo $purchaseentry_view_list->PAID_AMOUNT;?></label> 
														<!-- oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" -->
														<div class="fv-plugins-message-container invalid-feedback"></div>
													</div>
												</div>
												<div class="row">
													<label class="col-lg-1 col-form-label fw-semibold fs-6" id="cheque_lt_ey_label">Cheque :</label>
													<div class="col-lg-2 fv-row fv-plugins-icon-container" id="cheque_lt_ey_tbox" >
													<!-- 	<input type="text" name="cheq_pay" id="cheq_pay" class="form-control form-control-lg form-control-solid" placeholder="Cheque Amount" value="<?php echo $purchaseentry_view_list->CHEQUE_AMOUNT;?>" readonly > -->

													<label class="col-lg-8 col-form-label fw-semibold fs-6"><?php echo $purchaseentry_view_list->CHEQUE_AMOUNT;?></label> 

														<div class="fv-plugins-message-container invalid-feedback"></div>
													</div>
													<label class="col-lg-1 col-form-label fw-semibold fs-6" id="bank_lt_ey_label">Bank:</label>
												<div class="col-lg-2 fv-row fv-plugins-icon-container">
													<!-- <input type="text" name="" class="form-control form-control-lg form-control-solid" value="<?php echo $purchaseentry_view_list->CHEQUE_BANK;?>" readonly> -->

													<label class="col-lg-8 col-form-label fw-semibold fs-6"><?php echo $purchaseentry_view_list->CHEQUE_BANK;?></label> 

													<div class="fv-plugins-message-container invalid-feedback"></div>
												</div>
													<label class="col-lg-1 col-form-label fw-semibold fs-6" id="cheque_lt_ey_label">Cheq.no: </label>
													<div class="col-lg-2 fv-row fv-plugins-icon-container" id="cheque_lt_ey_tbox" >
														<!-- <input type="text" name="cheq_no" id="cheq_no" class="form-control form-control-lg form-control-solid" placeholder="Cheque Number" value="<?php echo $purchaseentry_view_list->CHEQUE_NUMBER;?>" readonly> -->

														<label class="col-lg-8 col-form-label fw-semibold fs-6"><?php echo $purchaseentry_view_list->CHEQUE_NUMBER;?></label>

														<div class="fv-plugins-message-container invalid-feedback"></div>
													</div>
												
												</div>
												<div class="row">

													<label class="col-lg-1 col-form-label fw-semibold fs-6" id="rtgs_lt_ey_label">RTGS:</label>
													<div class="col-lg-2 fv-row fv-plugins-icon-container" id="rtgs_lt_ey_tbox">
														<!-- <input type="text" name="rtgs_pay" id="rtgs_pay" class="form-control form-control-lg form-control-solid" placeholder="RTGS Amount" value="<?php echo $purchaseentry_view_list->RTGS;?>" readonly> -->

														<label class="col-lg-8 col-form-label fw-semibold fs-6"><?php echo $purchaseentry_view_list->RTGS;?></label>

														<div class="fv-plugins-message-container invalid-feedback"></div>
													</div>
													<label class="col-lg-1 col-form-label fw-semibold fs-6" id="bank_lt_ey_label">Bank:</label>
													<div class="col-lg-2 fv-row fv-plugins-icon-container">
													<!-- <input type="text" name="" class="form-control form-control-lg form-control-solid" value="<?php echo $purchaseentry_view_list->BANK;?>" readonly> -->

													<label class="col-lg-8 col-form-label fw-semibold fs-6"><?php echo $purchaseentry_view_list->BANK;?></label>

													<div class="fv-plugins-message-container invalid-feedback"></div>
												</div>
													<label class="col-lg-1 col-form-label fw-semibold fs-6" id="bank_lt_ey_label">RTGS No:</label>
													<div class="col-lg-2 fv-row fv-plugins-icon-container" id="rtgs_lt_ey_tbox">
														<!-- <input type="text" name="rtgs_trans" id="rtgs_trans" class="form-control form-control-lg form-control-solid" placeholder="RTGS Trans No" value=""> -->

														<label class="col-lg-8 col-form-label fw-semibold fs-6"><?php echo $purchaseentry_view_list->BANK;?></label>
														<div class="fv-plugins-message-container invalid-feedback"></div>
													</div>
												</div>
												<div class="row">
													<!-- <label class="col-lg-1 col-form-label fw-semibold fs-6" id="metal_lt_ey_label">Metal</label>
													<div class="col-lg-2 fv-row fv-plugins-icon-container" id="metal_lt_ey_tbox">
														<input type="text" name="" class="form-control form-control-lg form-control-solid" placeholder="Metal" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
														<div class="fv-plugins-message-container invalid-feedback"></div>
													</div> -->
													<label class="col-lg-1 col-form-label fw-semibold fs-6" id="purity_lt_ey_label"> Metal Purity :</label>
													<div class="col-lg-2 fv-row fv-plugins-icon-container" id="purity_lt_ey_tbox">
														<!-- <input type="text" name="purity_pay" id="purity_pay" class="form-control form-control-lg form-control-solid" placeholder="Purity" value="<?php echo $purchaseentry_view_list->METAL_PURITY;?>" readonly> -->
														<label class="col-lg-8 col-form-label fw-semibold fs-6"><?php echo $purchaseentry_view_list->METAL_PURITY;?></label>
														<div class="fv-plugins-message-container invalid-feedback"></div>
													</div>
													<label class="col-lg-1 col-form-label fw-semibold fs-6" id="rate_lt_ey_label">Metal Rate :</label>
													<div class="col-lg-2 fv-row fv-plugins-icon-container" id="rate_lt_ey_tbox">
														<!-- <input type="text" name="rate_pay" id="rate_pay" class="form-control form-control-lg form-control-solid" placeholder="Pure Rate" value="<?php echo $purchaseentry_view_list->METAL_RATE;?>" readonly> -->

														<label class="col-lg-8 col-form-label fw-semibold fs-6"><?php echo $purchaseentry_view_list->METAL_RATE;?></label>

														<div class="fv-plugins-message-container invalid-feedback"></div>
													</div>
													<label class="col-lg-1 col-form-label fw-semibold fs-6" id="mtamt_lt_ey_label" >Metal Amt :</label>
													<div class="col-lg-2 fv-row fv-plugins-icon-container" id="mtamt_lt_ey_tbox" >
														<!-- <input type="text" name="metal_pay" id="metal_pay" class="form-control form-control-lg form-control-solid" placeholder="Metal Amount"  value="" readonly> -->

														<label class="col-lg-8 col-form-label fw-semibold fs-6"><?php echo $purchaseentry_view_list->METAL_RATE;?></label>

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
							<!--end::Modal dialog