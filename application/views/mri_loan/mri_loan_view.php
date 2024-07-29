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
						<h1 class="mb-3">MRI Loan View</h1>
					</div>
					<div class="row">
						<div class="col-lg-6">
							<div class="px-4" style="border-radius: 10px;padding-bottom: 2px;box-shadow: 0 5px 10px #00002947;">
								<input type="hidden" name="bill_no" id="bill_no" value="<?php echo $loan_details->BILLNO; ?>">
								<label class="col-lg-12 col-form-label fw-bold fs-5 text-center">Party Basic Details</label>
								<div class="row">
									<label class="col-lg-12 col-form-label fw-bold fs-6" name="" id="">
										<i class="fa fa-user fs-6" aria-hidden="true" title="Party Name"></i>&emsp;<?php echo $loan_details->NAME; ?></label>
									<label class="col-lg-12 col-form-label fw-bold fs-6" name="" id="">
										<i class="fa-solid fa-location-dot fs-6" aria-hidden="true" title="Address"></i>
										<?php 
										$party_address=$this->db->query("SELECT * from PARTIES WHERE PID='".$loan_details->PID."'")->row();
										echo $party_address->ADDRESS1.", ".$party_address->ADDRESS2.", ".$party_address->CITY.".";
										?>
									  &nbsp; <span><i class="fas fa-info-circle fs-6" title="<?php echo $party_address->ADDRESS1.", ".$party_address->ADDRESS2.", ".$party_address->CITY.".";?>"></i></span></label>
									<label class="col-lg-6 col-form-label fw-bold fs-6" name="" id="">
										<i class="fas fa-mobile-android-alt fs-6" aria-hidden="true" title="Mobile"></i>
										&emsp;<?php echo $party_address->PHONE; ?></label>

									<label class="col-lg-2 col-form-label fw-semibold fs-6">Rating</label>
									<label class="col-lg-4 col-form-label fw-bold fs-6">
										<span><i class="fa-solid fa-star fs-6" style="<?php 
										if($party_address->RATING == 3){echo 'color:#50cd89;';}
										else if($party_address->RATING == 2){echo 'color:#ffc700;';}
										else if($party_address->RATING == 1){echo 'color:red;';}
										else{echo 'color:#d2d4dc;';}
										 ?>"></i></span>&nbsp;<?php 
										if($party_address->RATING == 3){echo 'Good';}
										else if($party_address->RATING == 2){echo 'Average';}
										else if($party_address->RATING == 1){echo 'Bad';}
										else{echo '-';}
										 ?></label>
									<label class="col-lg-5 col-form-label fw-bold fs-6"><i class="fa fa-address-card fs-6" aria-hidden="true" title="Membership Card Details"></i>&emsp;<span>
										<?php 
										$mem=$this->db->query("SELECT * FROM MEMBERSHIP_CARD WHERE PID='".$loan_details->PID."'")->row();
										if(isset($mem))
									   {

									   	$mem_id=$this->db->query("SELECT * FROM MEMBERSHIP_CARD WHERE PID='".$loan_details->PID."'")->row();

									   // $mem=$this->db->query("SELECT * from MEMBERSHIP_CARD WHERE PID='"$loan_details->PID."' ")->row();

									   echo $mem_id->MEMBERSHIP_NO;
									  }
									else
										{
											echo 'xxxx-xxxx-xxxx-xxxx';
										}

										?>
									</span>
										
									</label>

									<label class="col-lg-4 col-form-label fw-bold fs-6 text-center" name="card_type" id="card_type" >&emsp;<span><?php 
										$mem=$this->db->query("SELECT * FROM MEMBERSHIP_CARD WHERE PID='".$loan_details->PID."'")->row();
										if(isset($mem))
									   {

									   	// $mem_id=$this->db->query("SELECT * FROM MEMBERSHIP_CARD WHERE PID='".$loan_details->PID."'")->row();
									   	if($mem->CARD_TYPE=='Silver'){

									   		echo '<span style="background-color:#d2d4dc;border-radius: 8px;padding: 5px 15px 5px 15px;">Silver</span>';

									   	}
									   	if($mem->CARD_TYPE=='Gold'){

									   		echo '<span style="background-color:#ffaa00;border-radius: 8px;padding: 5px 15px 5px 15px;">Gold</span>';
									   	}
									   		if($mem->CARD_TYPE=='platinum'){

									   		echo '<span style="background-color:#E5E4E2;border-radius: 8px;padding: 5px 15px 5px 15px;">platinum</span>';
									   	}
									   
									  }
									else
										{
											echo '-';
										}

										?></span></label> 
									<label class="col-lg-3 col-form-label fw-bold fs-6" name="" id=""><i class="fa-solid fa-coins fs-6" title="Points"></i>&emsp;<span>
										<?php 
										$mem=$this->db->query("SELECT * FROM MEMBERSHIP_CARD WHERE PID='".$loan_details->PID."'")->row();
									
										if(isset($mem))
									   {

									   	$mem_id=$this->db->query("SELECT * FROM MEMBERSHIP_CARD WHERE PID='".$loan_details->PID."' ")->row();

									   

									   echo $mem_id->POINTS;
									  }
									else
										{
											echo '0';
										}

										?></span></label>

									<label class="col-form-label fw-semibold fs-6">Nominee &nbsp;
										<span class="fw-bold fs-6"><?php
										if (is_null($loan_details->NOMINEE))
										{
											$str= "--";
										}
										else
										{
										
											$str= $loan_details->NOMINEE;
										
										}
										echo $str;
										?>
										&nbsp; <span><i class="fas fa-info-circle fs-6" title="<?php echo $str; ?>"></i></span></span></label>
								</div>
								<div class="row mt-4 mb-4">
									<div class="col-lg-4 fv-row">
										<div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url(assets/images/Party.jpg)">
											<?php
											if($party_address->PHOTO!='')
										         {
										         $div='<img src="data:image/jpg;charset=utf8;base64,'.base64_encode($party_address->PHOTO).'"  height="125px" width="125px">';
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
										<div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url(assets/images/Party_Proof.jpg)">
											<div class="image-input-wrapper"  style="background-image: url(assets/images/Party_Proof.jpg)"></div>
										</div>
									</div>
									<div class="col-lg-4 fv-row">
										<div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url(assets/images/Signature.jpg)">
											<div class="image-input-wrapper"  style="background-image: url(assets/images/Signature.jpg)"></div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="px-4" style="border-radius: 10px;padding-bottom: 20px;box-shadow: 0 5px 10px #00002947;">
								<label class="col-lg-12 col-form-label fw-bold fs-5 text-center">Loan Information</label>
								<div class="row">
									<label class="col-lg-2 col-form-label fw-semibold fs-6">Company</label>
									<label class="col-lg-10 col-form-label fw-bold fs-6"><?php
									if(isset($loan_details->COMPANYCODE))
									{
									$comp=$this->db->query("SELECT * from COMPANY WHERE COMPANYCODE='".$loan_details->COMPANYCODE."'")->row();
									echo $comp->COMPANYNAME;
									}
									else
										{
											echo $loan_details->COMPANYCODE;
										}
									?></label>
									<label class="col-lg-2 col-form-label fw-semibold fs-6">Int Type</label>
									<label class="col-lg-4 col-form-label fw-bold fs-6"><?php echo $loan_details->INTERESTTYPE; ?></label>
									<label class="col-lg-2 col-form-label fw-semibold fs-7">Current Bill NO</label>
									<label class="col-lg-4 col-form-label fw-bold fs-6"><?php echo $loan_details->CCL_BILLNO; ?></label>

									<!-- <div class="col-lg-2">
										<label class="col-form-label fw-bold fs-5 bg-success" style="border-radius: 8px;padding: 5px 10px 5px 10px;">Normal</label>
									</div>
									<div class="col-lg-4">
										<label class="col-form-label fw-bold fs-6">3 Month 16 Days</label>
									</div> -->
									<label class="col-lg-2 col-form-label fw-semibold fs-6">Loan Date</label>
									<label class="col-lg-4 col-form-label fw-bold fs-6"><?php echo date_format(date_create($loan_details->ENDATE),'d-m-Y'); ?></label>
									<label class="col-lg-2 col-form-label fw-semibold fs-6">Exp.Date</label>
									<label class="col-lg-4 col-form-label fw-bold fs-6"><?php 
									 $result  = $this->db->query("SELECT * from INTERESTLIST where ACTIVE='Y' AND INTNAME='".$loan_details->INTERESTTYPE."'")->row();
									 //print_r( $result);exit;
									 $ln_dt=$loan_details->ENDATE;
									 if($result->LP_TYPE=='Days')
								        { 
								          $ex_dt=date('d-m-Y', strtotime($ln_dt. ' +'.round($result->PERIOD).' days'));
								         
								        }
								        if($result->LP_TYPE=='Months')
								        {
								          $ex_dt=date('d-m-Y', strtotime($ln_dt. ' +'.round($result->PERIOD).' months'));
								        }
								        echo $ex_dt;
									?></label>
									<div class="col-lg-6">
										<label class="col-form-label"><i class="fas fa-money-bill-wave fs-4"></i>&emsp;</span></label>
										<label class="col-form-label fw-bold fs-2"><?php echo $loan_details->AMOUNT;?></label>
									</div>
									<div class="col-lg-2">
										<label class="col-form-label"><span><i class="fas fa-list-ol fs-4"></i>&emsp;</span></label>
										<label class="col-form-label fw-bold fs-4">
										<?php 
										$pl_info=$this->db->query("SELECT * from PLEDGEINFO where BILLNO='".$loan_details->OLD_BILLNO."'")->result_array();
										echo count((array)$pl_info);
										?></label>
									</div>
									<div class="col-lg-4">
										<label class="col-form-label"><span><i class="fas fa-balance-scale fs-4"></i></span>&emsp;</label>
										<label class="col-form-label fw-bold fs-4"><?php echo $loan_details->NETWEIGHT; ?></label>
									</div>
									<div class="col-lg-4 fv-row">
										<div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url(assets/media/svg/avatars/signature_blank.png)">
											<?php
											if($loan_details->ITEM_PHOTO!='')
         {
         $div='<img src="data:image/jpg;charset=utf8;base64,'.base64_encode($loan_details->ITEM_PHOTO).'"  height="125px" width="125px">';
         }
         else
         {
          $div='<img src="'.base_url().'assets/images/Jewel.jpg" height="125px" width="125px" >';
         }
         echo $div;
											?>
											
										</div>
									</div>
									<div class="col-lg-8">
										
										<div class="row">
											<table>
												<thead class="fw-bold fs-6 text-center">

													<td class="col-lg-4">Actual</td>
													<td class="col-lg-4">Amount</td>
													<td class="col-lg-4">Paid</td>
													<td class="col-lg-4">Balance</td>
												</thead>
												<tbody class="fw-semibold fs-6 text-center">
													<tr>
														<td class="col-lg-4">
															<span class="fw-semibold fs-7 text-center">Loan Amt: </span></td>
															<td><span><?php echo number_format($loan_details->AMOUNT,2); ?></span></td>
															
													
														<td class="col-lg-4"><?php echo number_format($loan_details->PAID_CASH,2); ?></td>
														<td class="col-lg-4"><?php echo number_format($loan_details->BALANCE,2); ?></td>
													</tr>
													<tr>
														<td class="col-lg-4">
															<span class="fw-semibold fs-7 text-center">Intrest : </span></td>
															<td><span><?php 
															$int_amt=($loan_details->AMOUNT*$loan_details->INTEREST*$loan_details->MONTHS)/100;
															echo number_format($int_amt,2);
															?></span></td>
															
													
														<td class="col-lg-4"><?php echo number_format($loan_details->PAIDINTEREST,2); ?></td>
														<td class="col-lg-4"><?php echo number_format($int_amt,2);?></td>
													</tr>
													<!-- <tr>
														<td class="col-lg-4">
															<span class="fw-semibold fs-7 text-center">MRI Int paid By Customer : </span></td>
															
														<td class="col-lg-8 fw-semibold fs-5"><?php echo number_format($loan_details->PAIDINTEREST,2); ?></td>
														
													</tr>
													<tr>
														<td class="col-lg-4">
															<span class="fw-semibold fs-7 text-center">Reneval Extra Payment To Customer : </span></td>
															
														<td class="col-lg-8 fw-semibold fs-5"><?php echo number_format($loan_details->PAID_CASH,2); ?></td>
														
													</tr> -->
												</tbody>
											</table>

										</div>

										<div class="row mt-4">
											<label><span class="col-lg-4 fw-bold fs-6 text-center">MRI Int paid By Customer : </span>
											&emsp;<span class="col-lg-8 fw-bold fs-5"><?php echo number_format($loan_details->PAIDINTEREST,2); ?></span></label>
										</div>
										<div class="row mt-4">
											<label><span class="col-lg-4 fw-bold fs-6 text-center">Reneval Extra Payment To Customer : </span>
											&emsp;<span class="col-lg-8 fw-bold fs-5"><?php echo number_format($loan_details->PAID_CASH,2); ?></span></label>
										</div>

									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="row mt-4">
						<div class="accordion" id="kt_accordion_item_list">
						    <div class="accordion-item">
						        <h2 class="accordion-header" id="kt_accordion_item_list_header_1">
						            <button class="accordion-button fw-bold fs-6 collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#kt_accordion_item_list_body_1" aria-expanded="false" aria-controls="kt_accordion_item_list_body_1">
						            Pledge Info &emsp; - &emsp; Count <span>&emsp; <?php echo count((array)$pl_info); ?> &emsp; - &emsp;</span> Total Net Weight <span>&emsp; <?php echo $loan_details->NETWEIGHT; ?> gms</span>
						            </button>
						        </h2>
						        <div id="kt_accordion_item_list_body_1" class="accordion-collapse collapse" aria-labelledby="kt_accordion_item_list_header_1" data-bs-parent="#kt_accordion_item_list">
						            <div class="accordion-body">
						            	<table class="table align-middle table-row-dashed table-striped table-hover fs-7 gy-1 gs-2" id="kt_datatable_dom_positioning_add_loan">
											<thead>
												<tr class="text-start text-muted fw-bold fs-7 gs-0">
										            <th class="min-w-150px">Items</th>
										            <th class="min-w-100px">Description</th>
										            <th class="min-w-80px">Quality</th>
										            <th class="min-w-80px">Purity(%)</th>
										            <th class="min-w-80px">Weight(gms)</th>
										            <th class="min-w-100px">Stone Wgt(gms)</th>
										            <th class="min-w-80px">Less(gms)</th>
										            <th class="min-w-80px">Nt Wgt(gms)</th>
										            <th class="min-w-50px">Damage</th>
										            <th class="min-w-50px">Img</th>
												</tr>
											</thead>
											<tbody class="text-gray-600 fw-semibold">
												<?php foreach ($pl_info as $plist){?>
												<tr>

										            <td><?php echo $plist['PLEDGENAME']; ?> </td>
										            <td><?php echo $plist['DESCRIPTION']; ?></td>
										            <td><?php echo $plist['QTY']; ?></td>
										            <td><?php echo $plist['PURITY']; ?></td>
										            <td><?php echo $plist['WEIGHT']; ?></td>
										            <td><?php echo $plist['STONEWEIGHT'];  ?></td>
										            <td><?php echo $plist['LESS'];  ?></td>
										            <td><?php echo $plist['NETWEIGHT']; ?></td>
										            <td><?php echo ($plist['IS_DAMAGE']=='Y')?'Yes':'No';  ?></td>
										            <td>
										            	<div class="image-input mt-2 me-6" data-kt-image-input="true">
															<div class="image-input-wrapper w-40px h-40px"style="background-image: url(assets/images/sample_jewel.jpg)"></div>
															<!--end::Preview existing avatar-->
														</div>
										            </td>
										        </tr>
										    <?php } ?>
										    </tbody>
										   <tfoot>
												<tr class="text-start text-muted fw-bold fs-4 gs-0">
										            <th class="min-w-150px"></th>
										            <th class="min-w-100px"></th>
										            <th class="min-w-80px"></th>
										            <th class="min-w-80px">Total</th>
										            <th class="min-w-80px"><?php echo $loan_details->WEIGHT; ?></th>
										            <th class="min-w-100px"><?php echo $loan_details->STONELESS; ?></th>
										            <th class="min-w-80px"><?php echo $loan_details->LESS; ?></th>
										            <th class="min-w-80px"><?php echo $loan_details->NETWEIGHT; ?></th>
										            <th class="min-w-50px"></th>
										            <th class="min-w-50px"></th>
												</tr>
											</tfoot> 
										</table>
						            </div>
						        </div>
						    </div>
						</div>
					</div>
					<!-- <div class="d-flex justify-content-center mt-4">
						<a href="javascript:;">
						<button class="btn btn-primary me-2">Click Here to View Loan History</button></a>					
					</div> -->
				</div>
			</div>
			<!--end::Modal dialog-->
		</div>