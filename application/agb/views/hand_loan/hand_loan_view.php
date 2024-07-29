<div class="modal-dialog modal-xl-loan">
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
				<div class="modal-body pt-0 pb-15 px-5 px-xl-20">
					<!--begin::Heading-->
					<div class="mb-3 text-center">
						<h1 class="mb-3">View Hand Loan</h1>
					</div>
					<div class="row mt-4">
						<div class="accordion" id="kt_accordion_item_list_party">
						    <div class="accordion-item">
						        <h2 class="accordion-header" id="kt_accordion_item_list_party_header_1">
						            <button class="accordion-button fw-bold fs-6 collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#kt_accordion_item_list_party_body_1" aria-expanded="true" aria-controls="kt_accordion_item_list_party_body_1">
						            Party Info</button>
						        </h2>
						        <div id="kt_accordion_item_list_party_body_1" class="accordion-collapse collapse show" aria-labelledby="kt_accordion_item_list_party_header_1" data-bs-parent="#kt_accordion_item_list_party">
						            <div class="accordion-body">
						            	<div class="row">
						            		<div class="col-lg-6">
						            			<div class="row">
						            				<label class="col-lg-12 col-form-label fw-bold fs-6" name="" id="">
																	<i class="fa fa-user fs-6" aria-hidden="true" title="<?php echo $party_details->NAME; ?>"></i>&emsp;<?php echo $party_details->NAME; ?></label>
																<label class="col-lg-12 col-form-label fw-bold fs-6" name="" id="">
																	<i class="fa-solid fa-location-dot fs-6" aria-hidden="true" title="Address"></i>
																	<?php 
																		
																		echo $party_details->ADDRESS1.", ".$party_details->ADDRESS2.", ".$party_details->CITY.".";
																		?>
																 &nbsp; <span><i class="fas fa-info-circle fs-6" title="<?php echo $party_details->ADDRESS1.", ".$party_details->ADDRESS2.", ".$party_details->CITY.".";?>"></i></span></label>
																<label class="col-lg-6 col-form-label fw-bold fs-6" name="" id="">
																	<i class="fas fa-mobile-android-alt fs-6" aria-hidden="true" title="Mobile"></i>
																	&emsp;<?php echo $party_details->PHONE; ?></label>
																<label class="col-lg-2 col-form-label fw-semibold fs-6">Rating</label>
																<label class="col-lg-4 col-form-label fw-bold fs-6">
																	<span><i class="fa-solid fa-star fs-6" style="<?php 
																	if($party_details->RATING == 3){echo 'color:#50cd89;';}
																	else if($party_details->RATING == 2){echo 'color:#ffc700;';}
																	else if($party_details->RATING == 1){echo 'color:red;';}
																	else{echo 'color:#d2d4dc;';}
																	 ?>"></i></span>&nbsp;<?php 
																			if($party_details->RATING == 3){echo 'Good';}
																			else if($party_details->RATING == 2){echo 'Average';}
																			else if($party_details->RATING == 1){echo 'Bad';}
																			else{echo '-';}
																	 ?></label>

																<label class="col-lg-12 col-form-label fw-semibold fs-6">Nominee &nbsp;
																	<span class="fw-bold fs-6">
																		 <?php
																			$company_det  = $this->db->query("SELECT * FROM COMPANY WHERE COMPANYCODE='".$hloan_details->COMPANYCODE."'")->row();

																			$nominee_details=$this->db->query("SELECT * FROM NOMINEE WHERE PID='".$party_details->PID."'")->row();

																			if(is_null($nominee_details))
																			{
																				$str= "--";
																			}
																			else
																			{
																				$str= $nominee_details->NOMINEE_NAME." - ".$nominee_details->RELATION." - ".$nominee_details->MOBILE_NO;
																			}
																			
																			echo $str;
																			?> 
																	&nbsp; <span><i class="fas fa-info-circle fs-6" title="Kumar - Brother - 9795963214"></i></span></span></label>
																<label class="col-lg-2 col-form-label fw-semibold fs-6">Company</label>
																<label class="col-lg-10 col-form-label fw-bold fs-6">
																	<?php echo $company_det->COMPANYNAME; ?>
																</label>
						            			</div>
						            		</div>
						            		<div class="col-lg-6">
						            			<div class="row">

																<div class="col-lg-4 fv-row">
																	<!-- <div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url(assets/images/Party.jpg)">
																		<div class="image-input-wrapper"  style="background-image: url(assets/images/Party.jpg)"></div>
																	</div> -->
																	<div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url(assets/images/Party.jpg)">
																		<?php
																		if($party_details->PHOTO!='')
																	         {
																	         $div='<img src="data:image/jpg;charset=utf8;base64,'.base64_encode($party_details->PHOTO).'" height="125px" width="125px">';
																	         }
																	         else
																	         {
																	          $div='<img src="'.base_url().'assets/images/party.jpg" height="125px" width="125px" >';
																	         }
																	         echo $div;
																		?>
																	</div>
																</div>
																<div class="col-lg-4 fv-row">
																	<!-- <div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url(assets/images/Party_Proof.jpg)">
																		<div class="image-input-wrapper"  style="background-image: url(assets/images/Party_Proof.jpg)"></div>
																	</div> -->
																	<?php
																		if($party_details->IDPROOF_IMAGE!='')
																	         {
																	         $div='<img src="data:image/jpg;charset=utf8;base64,'.base64_encode($party_details->IDPROOF_IMAGE).'"  height="125px" width="125px">';
																	         }
																	         else
																	         {
																	          $div='<img src="'.base_url().'assets/images/Party_Proof.jpg" height="125px" width="125px" >';
																	         }
																	         echo $div;
																		?>
																</div>
																<div class="col-lg-4 fv-row">
																	<?php
																		if($party_details->SIGNATURE_IMAGE!='')
																	         {
																	         $div='<img src="data:image/jpg;charset=utf8;base64,'.base64_encode($party_details->SIGNATURE_IMAGE).'"  height="125px" width="125px">';
																	         }
																	         else
																	         {
																	          $div='<img src="'.base_url().'assets/images/Signature.jpg" height="125px" width="125px" >';
																	         }
																	         echo $div;
																		?>
																</div>
																<label class="col-lg-2 col-form-label fw-semibold fs-6 mt-4">Date</label>
																<label class="col-lg-4 col-form-label fw-bold fs-6 mt-4">
																	<?php

																		$view_date=date('d-m-Y',strtotime($hloan_details->HL_DATE));
																	 echo $view_date; ?></label>
																<div class="col-lg-6">
																	<label class="col-form-label fw-bold fs-2 mt-4">H/L Balance</label>&emsp;
																	<label class="col-form-label fw-bold fs-2 mt-4">3000.00</label>
																</div>
															</div>
						            		</div>
													</div>
						            </div>
						        </div>
						    </div>
						</div>
					</div>

					<?php if($hloan_details->HL_DEBIT>0){ ?> 
						<div class="row mt-4">
						<div class="accordion" id="kt_accordion_item_list_hand_loan">
						    <div class="accordion-item">
						        <h2 class="accordion-header" id="kt_accordion_item_list_hand_loan_header_1">
						            <button class="accordion-button fw-bold fs-6 collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#kt_accordion_item_list_hand_loan_body_1" aria-expanded="true" aria-controls="kt_accordion_item_list_hand_loan_body_1">
						            Hand Loan</button>
						        </h2>
						        <div id="kt_accordion_item_list_hand_loan_body_1" class="accordion-collapse collapse show" aria-labelledby="kt_accordion_item_list_hand_loan_header_1" data-bs-parent="#kt_accordion_item_list_hand_loan">
						            <div class="accordion-body">
						            	<div class="row">
						            		<div class="col-lg-4">
						            			<label class="col-form-label fw-bold fs-4">H/L Amount</label>&emsp;
						            			<label class="col-form-label fw-bold fs-4">1000.00</label>&emsp;
						            		</div>
						            	</div>
						            	<div class="row">
						            		<label class="col-form-label fw-bold fs-4 text-center">Payment From Company</label>
						            	<table class="table align-middle fs-7 gy-2 gs-2" id="view_ln_dels_pyt_receive_frm_party">
												<thead>
													<tr class="text-start text-muted fw-semibold fs-5 gs-0">
											            <th class="min-w-100px">Mode</th>
											            <th class="min-w-100px">Amount</th>
											            <th class="min-w-100px">Party Bank</th>
											            <th class="min-w-100px">Ref No</th>
											            <th class="min-w-200px">Company Bank</th>
										                <th class="min-w-200px">Details</th>
													</tr>
												</thead>
												<tbody class="text-gray-600 fw-bold fs-4" id="party_hl_pay_table_payment">
												

											    </tbody>
										</table>				
									</div>	
						            </div>
						        </div>
						    </div>
						</div>
					</div>

						<?php  }?>
					<?php if($hloan_details->HL_CREDIT>0){ ?> 
						<div class="row mt-4">
						<div class="accordion" id="kt_accordion_item_list_receive">
						    <div class="accordion-item">
						        <h2 class="accordion-header" id="kt_accordion_item_list_receive_header_1">
						            <button class="accordion-button fw-bold fs-6 collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#kt_accordion_item_list_receive_body_1" aria-expanded="true" aria-controls="kt_accordion_item_list_receive_body_1">
						            On Account</button>
						        </h2>
						        <div id="kt_accordion_item_list_receive_body_1" class="accordion-collapse collapse show" aria-labelledby="kt_accordion_item_list_receive_header_1" data-bs-parent="#kt_accordion_item_list_receive">
						            <div class="accordion-body">
						            	        <div class="row">
														<label class="col-lg-1 col-form-label fw-bold fs-4">On A/c</label>
														<label class="col-lg-2 col-form-label fw-bold fs-4">1000.00</label>
													</div>
													<div class="row">
														<label class="col-form-label fw-bold fs-4 text-center">Party Payment Details</label>
														<table class="table align-middle fs-7 gy-2 gs-2" id="view_ln_dels_pyt_receive_frm_party">
												<thead>
													<tr class="text-start text-muted fw-semibold fs-5 gs-0">
											            <th class="min-w-100px">Mode</th>
											            <th class="min-w-100px">Amount</th>
											            <th class="min-w-100px">Party Bank</th>
											            <th class="min-w-100px">Ref No</th>
											            <th class="min-w-200px">Company Bank</th>
										                <th class="min-w-200px">Details</th>
													</tr>
												</thead>
												<tbody class="text-gray-600 fw-bold fs-4" id="party_ac_pay_table_payment">
													
											    </tbody>
										</table>
													
						            </div>
						        </div>
						    </div>
						</div>
					</div>
					<?php  }?>
					
				</div>
			</div>
			<!--end::Modal dialog-->
		</div>