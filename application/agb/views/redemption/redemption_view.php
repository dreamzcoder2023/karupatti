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
						<h1 class="mb-3">View Redemption - 
							<!-- <label class="col-form-label fw-semibold fs-4">
								<span style="background-color:#ffdf6f;border-radius: 8px;padding: 5px 15px 5px 15px;">Customer Close</span>
							</label> -->
							<?php
								if($redemption_details->CLOSING_TYPE=='CUSTOMER_SALE')
								{
							?>
							<label class="col-form-label fw-semibold fs-7"><span style="background-color:#fbe2d5;border-radius: 8px;padding: 5px 15px 5px 15px;">Customer Sale</span>
															</label>
							<?php

								}
								else if($redemption_details->CLOSING_TYPE=='CUSTOMER_TRANSFER')
								{
							?>
							<label class="col-form-label fw-semibold fs-7"><span style="background-color:#fed4df;border-radius: 8px;padding: 5px 15px 5px 15px;">Customer Transfer</span>
							</label>
							<?php

								}
								else if($redemption_details->CLOSING_TYPE=='MULTI_JEWEL')
								{
							?>
							<label class="col-form-label fw-semibold fs-7"><span style="background-color:#a3ff9b;border-radius: 8px;padding: 5px 15px 5px 15px;">Multi Jewel</span>
															</label>
							<?php

								}
								else if($redemption_details->CLOSING_TYPE=='CUSTOMER_CLOSE')
								{
							?>
							<label class="col-form-label fw-semibold fs-7" name="" id=""><span style="background-color:#ffdf6f;border-radius: 8px;padding: 5px 15px 5px 15px;">Customer Close</span>
							</label>
							<?php

								}
								else if($redemption_details->CLOSING_TYPE=='COMPANY_CLOSE')
								{
							?>
							<label class="col-form-label fw-semibold fs-7"><span style="background-color:#b0dfff;border-radius: 8px;padding: 5px 15px 5px 15px;">Company Close</span>
															</label>
							<?php

								}
							?>
						</h1>
					</div>
					<div class="row">
						<div class="col-lg-6">
							<div class="px-4" style="border-radius: 10px;padding-bottom: 10px;box-shadow: 0 5px 10px #00002947;">
								<div class="row">
									<label class="col-lg-6 col-form-label fw-bold fs-5 text-end">Party Basic Details</label>
									<div class="col-lg-6 text-end">
										<label class="col-form-label fw-bold fs-3 text-primary">Redemp No  </label>
										<label class="col-form-label fw-bold fs-3 text-primary"><?php echo $redemption_details->BILLNO; ?></label>
									</div>
								</div>
								<div class="row">
									<div class="col-lg-6">
										<div class="row">
											<label class="col-lg-12 col-form-label fw-bold fs-6"><i class="fa fa-address-card fs-6" aria-hidden="true" title="Card No"></i>&emsp;<?php echo $membership_details['MEMBERSHIP_NO'] ? $membership_details['MEMBERSHIP_NO'] : '-' ; ?>
												<!-- <i class="fas fa-times-circle fs-5" style="color:red;"></i> -->
												<?php if($membership_details['MEMBERSHIP_NO']!='')
												{
													?>
												<i class="fas fa-check-circle fs-5" style="color:green;"></i>
												<?php
													}
												?>
											</label>
											<label class="col-lg-6 col-form-label fw-bold fs-6 text-center" name="" id="" >
												<?php if($membership_details['MEMBERSHIP_NO']!='')
												{
													$mem_card_det=$this->db->query("select * from  MEMBERSHIP_CARD where MEMBERSHIP_NO='".$membership_details['MEMBERSHIP_NO']."' ")->row();
														if(isset($mem_card_det))
														{
															 if($mem_card_det->CARD_TYPE=='Gold')
															 {
													?>
												<span style="background-color:#FFAA00;border-radius: 8px;padding: 5px 15px 5px 15px;">Gold</span>
												<?php }
												else if($mem_card_det->CARD_TYPE=='Silver'){
												?>
												<span style="background-color:#C0C0C0;border-radius: 8px;padding: 5px 15px 5px 15px;">Silver</span>
											<?php }
											else if($mem_card_det->CARD_TYPE=='Platinum'){
												?>
												<span style="background-color:#E5E4E2;border-radius: 8px;padding: 5px 15px 5px 15px;">Platinum</span>
											<?php }						
												?>
											
											<?php  }
											else{?>
													<span style="background-color:#f1416c;border-radius: 8px;padding: 5px 15px 5px 15px;">Nil</span>

												<?php 
											 }}else{?>
												<span style="background-color:#f1416c;border-radius: 8px;padding: 5px 15px 5px 15px;">Nil</span>

											<?php 
										 }?>
											 </label>
											<label class="col-lg-6 col-form-label fw-bold fs-6" name="" id=""><i class="fa-solid fa-coins fs-6" title="Points"></i>&emsp;<?php echo $membership_details['POINTS'] ? $membership_details['POINTS'] :'0' ; ?></label>
											
											<label class="col-lg-12 col-form-label fw-bold fs-6 mt-2" title="Nominee">
											<span><i class="fas fa-user-friends fs-5" title="Nominee"></i>&emsp;</span>
											<span title="Nominee"><?php $nominee = $this->db->query("SELECT * FROM NOMINEE WHERE NOMINEE_ID = '".$loan_details->NOMINEE_ID."'")->row();
											echo $nominee->NOMINEE_NAME." - ".$nominee->RELATION." - ".$nominee->MOBILE_NO; ?></span></label>
											<div class="col-lg-12" title="Rating">
												<label class="col-form-label fw-bold fs-4">
													<i class="fas fa-star-half-alt"></i>&emsp;
												</label>
												<label class="col-form-label fw-bold fs-6">
													<?php if($party_details->RATING==3){ ?>
														<i class="fa-solid fa-star fs-3" style="color:#50cd89;"></i>&nbsp;<span>Good</span>
													<?php } ?>
													<?php if($party_details->RATING==2){ ?>
														<i class="fa-solid fa-star fs-3" style="color:#ffc700;"></i>&nbsp;<span>Average</span>
													<?php } ?>
													<?php  if($party_details->RATING==1){ ?>
														<i class="fa-solid fa-star fs-3" style="color:#f1416c;"></i>&nbsp;<span>Bad</span>
													<?php } 
													if(!isset($party_details->RATING)) { ?>
														<i class="fa-solid fa-star fs-3" style="color:#d2d4dc;"></i>&nbsp;<span>Nil</span>
													<?php } ?>
													
													
												</label>
											</div>
										</div>
									</div>
									<div class="col-lg-6">
										<div class="row">
											<label class="col-lg-12 col-form-label fw-bold fs-6" name="" id="">
												<i class="fa fa-user fs-6" aria-hidden="true" title="Last Name"></i>&emsp;<?php echo $party_details->NAME; ?></label>
											<label class="col-lg-12 col-form-label fw-bold fs-6" name="" id="">
												<i class="fa-solid fa-location-dot fs-6" aria-hidden="true" title="Address"></i>
											&emsp;
											<?php 
											 $village = $this->db->query("SELECT * FROM VILLAGE WHERE VILLAGEID = '".$party_details->ADDRESS2."'  ")->row();

											 $street = $this->db->query("SELECT * FROM STREET WHERE STREETID = '".$party_details->STREET_ID."'  ")->row();
									 
											 $city = $this->db->query("SELECT * FROM CITY WHERE CITYID = '".$party_details->CITY."'  ")->row();

											echo $street->STREETNAME.", ".$village->VILLAGENAME;
											 ?></label>
											<label class="col-lg-12 col-form-label fw-bold fs-6" name="" id="">
													<i class="fas fa-mobile-android-alt fs-6" aria-hidden="true" title="Mobile"></i>
												&emsp;<span><?php echo $party_details->PHONE; ?></span>
											</label>
											<div class="col-lg-12">
												<label class="col-form-label fw-semibold fs-2" style="color: #1a21e3 !important;font-weight: 600 !important;">H/L Bal &emsp;</label>
												<label class="col-form-label fw-bold fs-2" style="color: #1a21e3 !important;font-weight: 600 !important;"><?php echo $loan_details->HL_AMOUNT; ?></label>
											</div>
										</div>
									</div>
								</div>
								<div class="row mt-8">
									<div class="col-lg-4 fv-row">
										<div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url(assets/images/Party.jpg)">
											<!-- <div class="image-input-wrapper"  style="background-image: url(assets/images/staff_1.png)"></div> -->
											<?php 
													if($party_details->PHOTO == '')
													{
												?>
												<div class="image-input-wrapper w-125px h-125px" style="background-image: url('assets/images/staff_1.png')">
												</div>
											<?php }
												else
												{
													if($party_details->TYPE_OF_RECORD=='N')
													{
											?>
											<img class="image-input-wrapper"  src="<?php echo $party_details->PHOTO; ?>" height="125px" width="125px" >
												
											<?php }
											else
											{?>
												<img class="image-input-wrapper"  src="data:image/jpeg;base64,<?php echo base64_encode($party_details->PHOTO); ?>" height="125px" width="125px" >
												<?php 
											 }
											}?>
										</div>
									</div>
									<div class="col-lg-4 fv-row">
										<div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url(assets/media/svg/avatars/aadhaar_blank.png)">
											<?php 
												if($party_details->OTHER_PHOTO == '')
												{
											?>
											<div class="image-input-wrapper w-125px h-125px" style="background-image: url('<?php echo base_url();?>assets/images/Party_Proof.jpg')">
											</div>
										<?php }
											else
											{
												if($party_details->TYPE_OF_RECORD=='N')
												{
										?>
										<img class="image-input-wrapper"  src="<?php echo $party_details->OTHER_PHOTO; ?>" height="125px" width="125px" >
											
										<?php }
										else
										{?>
											<img class="image-input-wrapper"  src="data:image/jpeg;base64,<?php echo base64_encode($party_details->OTHER_PHOTO); ?>" height="125px" width="125px" >
											<?php 
										 }
										}?>
											<!-- <div class="image-input-wrapper"  style="background-image: url(assets/images/Party_Proof.jpg)"></div> -->
										</div>
									</div>
									<div class="col-lg-4 fv-row">
										<div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url(assets/media/svg/avatars/signature_blank.png)">
											<!-- <div class="image-input-wrapper"  style="background-image: url(assets/images/Signature.jpg)"></div> -->
											<?php 
														if($party_details->SIGNATURE == '')
														{
													?>
													<div class="image-input-wrapper w-125px h-125px" style="background-image: url('assets/images/Signature.jpg')">
													</div>
												<?php }
													else
													{
														if($party_details->TYPE_OF_RECORD=='N')
														{
												?>
												<img class="image-input-wrapper"  src="<?php echo $party_details->SIGNATURE; ?>" height="125px" width="125px" >
													
												<?php }
												else
												{?>
													<img class="image-input-wrapper"  src="data:image/jpeg;base64,<?php echo base64_encode($party_details->SIGNATURE); ?>" height="125px" width="125px" >
													<?php 
												 }
												}?>
										</div>
									</div>
								</div><br>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="px-4" style="border-radius: 10px;padding-bottom: 20px;box-shadow: 0 5px 10px #00002947;">
								<div class="row">
									<label class="col-lg-8 col-form-label fw-bold fs-5 text-center">Loan Information</label>
									<div class="col-lg-4">
										<label class="col-form-label fw-semibold fs-6">
											<span style="background-color:<?php echo $loan_status->color_code; ?>;border-radius: 8px;padding: 5px 15px 5px 15px;"><?php echo $loan_status->loan_stage; ?></span>
										</label>
									</div>
								</div>
								<div class="row">
									<label class="col-lg-2 col-form-label fw-semibold fs-6">Company</label>
									<label class="col-lg-10 col-form-label fw-bold fs-6"><?php 
									$clist=$this->db->query("select * from  COMPANY where COMPANYCODE='".$loan_details->COMPANYCODE."'")->row();
									echo $clist->COMPANYNAME;
									?></label>
									<label class="col-lg-2 col-form-label fw-semibold fs-6">Int Type</label>
									<label class="col-lg-4 col-form-label fw-bold fs-6"><?php echo $loan_details->INTERESTTYPE ; ?></label>
									<div class="col-lg-2">
										<?php
											$receipt_detail=$this->db->query("select top 1 * from RECEIPT_MASTER where BILLNO='".$loan_details->BILLNO."' order by ROWNO DESC")->row();
							               if(isset($receipt_detail))
							               {
							                  $receipt_count=$receipt_detail->ROWNO;
							                  $receipt_date= date($_SESSION['DATE_PATTERN'],strtotime($receipt_detail->RECEIPT_DATE));
							                  // date($_SESSION['DATE_PATTERN'],strtotime($receipt_detail->RECEIPT_DATE))
							               }
							               else
							               {
							                  $receipt_count=0;
							                  $receipt_date="-";
							               }

							                $receipt_detail=$this->db->query("select top 1 * from RECEIPT_MASTER where BILLNO='".$loan_details->BILLNO."' order by ROWNO desc")->row();
							              if(isset($receipt_detail->ROWNO))
							              {
							                  $data['row_no']=$receipt_detail->ROWNO+1;
							                  $ln_dt = $receipt_detail->RECEIPT_DATE;
							                  $month_number = date("d-M-Y",strtotime($ln_dt));
							                  $data['last_receipt_date'] = $month_number;
							                  
							              }
							              else
							              {
							                $data['row_no']=1;  
							                $data['lt_recetpt_date'] = $this->Loanreceipt_model->get_loan_receipts_details($loan_details->BILLNO);
							                  $ln_dt = $data['lt_recetpt_date'][0]['ENDATE'];
							                  $month_number = date("d-M-Y",strtotime($ln_dt));
							                  $data['last_recetpt_date'] = $month_number;
							                 
							              }
							              
							              $data['loan_receipts_details']=$this->Loanreceipt_model->get_loan_receipts_details($loan_details->BILLNO);
							                if ($ln_dt == $data['loan_receipts_details'][0]['ENDATE']) 
							                {
							                    $endate = $data['loan_receipts_details'][0]['ENDATE'];
							                    $sd = $endate.' '.'00:00:00';
							                    $e = $redemption_details->RETURNDATE;
							                    $ed = $e.' '.'00:00:00';

							                    $start = new DateTime($sd);
							                    $end = new DateTime($ed);
							                    $diff = $start->diff($end);

							                    $yearsInMonths = $diff->format('%r%y') * 12;
							                    $months = $diff->format('%r%m');
							                    $days = $diff->format('%r%d');
							                    $totalMonths = $yearsInMonths + $months;
							                    $months1 = $totalMonths;
							                    $days1 = $days;
							                    
							                }
							                else
							                {
							                    $endate = $receipt_detail->RECEIPT_DATE;
							                    $sd = $endate.' '.'00:00:00';
							                    $e = $redemption_details->RETURNDATE;
							                    $ed = $e.' '.'00:00:00';

							                    $start = new DateTime($sd);
							                    $end = new DateTime($ed);
							                    $diff = $start->diff($end);

							                    $yearsInMonths = $diff->format('%r%y') * 12;
							                    $months = $diff->format('%r%m');
							                    $days = $diff->format('%r%d');
							                    $totalMonths = $yearsInMonths + $months;
							                    $months1 = $totalMonths;
							                    $days1 = $days;

							                }
											$vIntType = $loan_details->INTERESTTYPE;
											$vCalcDate=$redemption_details->RETURNDATE;
							                $vLoanDate = $loan_details->ENDATE;
							                $vLoanPeriod = $loan_details->MONTHS;

							             if(substr($vIntType, 0,2)=="F-")
							              {
							                  $data['vLoanLastDate']=date('Y-m-d',strtotime($vLoanDate."+50 Days"));
							              }
							              elseif(substr($vIntType, 0,2)=="H-")
							              {
							                  $data['vLoanLastDate']=date('Y-m-d',strtotime($vLoanDate."+100 Days"));
							              }
							              else
							              {
							                  $data['vLoanLastDate']=date('Y-m-d',strtotime($vLoanDate.' +'.$vLoanPeriod.' months'));
							              }

							              if($data['vLoanLastDate'] < $vCalcDate)
							              {
							                // $data['lblODStatus']="OVER DUE";

							              $due_status="<label class='col-form-label fw-bold fs-5 bg-danger' style='border-radius: 8px;padding: 5px 10px 5px 10px;'  >OverDue</label>";

							              }
							              else
							              {
							                // $data['lblODStatus']="NORMAL";
							                $due_status="<label class='col-form-label fw-bold fs-5 bg-success' style='border-radius: 8px;padding: 5px 10px 5px 10px;'  >Normal</label>";
							              }
							              echo $due_status;
										?>


										<!-- <label class="col-form-label fw-bold fs-5 bg-success" style="border-radius: 8px;padding: 5px 10px 5px 10px;">Normal</label> -->
									</div>
									<div class="col-lg-4">
										<label class="col-form-label fw-bold fs-6"><?php echo $months1; ?> Month <?php echo $days1; ?> Days</label>
									</div>
									<label class="col-lg-2 col-form-label fw-semibold fs-6">Loan Date</label>
									<label class="col-lg-4 col-form-label fw-bold fs-6"><?php echo date_format(date_create($loan_details->ENDATE),'d-m-Y'); ?></label>
									<label class="col-lg-2 col-form-label fw-semibold fs-6"><!-- Exp.Date --></label>
									<label class="col-lg-4 col-form-label fw-bold fs-6"><!-- 22-02-2023 --></label>
									<div class="col-lg-6" title="Principal Amount">
										<label class="col-form-label"><i class="fas fa-money-bill-wave fs-4"></i>&emsp;</span></label>
										<label class="col-form-label fw-bold fs-2"><?php echo $loan_details->AMOUNT; ?> </label>
									</div>
									<div class="col-lg-2" title="Pledge Items Count">
										<!-- <a href="javascript:;"><i class="fas fa-list-ol fs-4" title="Pledge Items Count" data-bs-toggle="modal" data-bs-target="#kt_modal_pledge_items"></i></a> -->
										<label class="col-form-label">
											<span><i class="fas fa-list-ol fs-4"></i>&emsp;</span>
										</label>
										<label class="col-form-label fw-bold fs-4"><?php echo count((array)$pledge_details); ?></label>
									</div>
									<div class="col-lg-4" title="Weight">
										<label class="col-form-label"><span><i class="fas fa-balance-scale fs-4"></i></span>&emsp;</label>
										<label class="col-form-label fw-bold fs-4"><?php echo $loan_details->NETWEIGHT; ?></label>
									</div>
									<div class="col-lg-4 fv-row mt-6">
										<div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url(assets/media/svg/avatars/signature_blank.png)">
											<?php
											if($loan_details->ITEM_PHOTO!='')
									         {
									         	$div='<img src="data:image/jpg;charset=utf8;base64,'.base64_encode($loan_details->ITEM_PHOTO).'"  height="125px" width="125px">';
									         }
									         else
									         {
									          	$div='<img src="'.base_url().'assets/images/jewel.jpg" height="125px" width="125px" >';
									         }
									         echo $div;
											?>
											<!-- <div class="image-input-wrapper"  style="background-image: url(assets/images/Jewel.jpg)"></div> -->
										</div>
									</div>
									<div class="col-lg-8">
										<div class="row">
											<div class="col-lg-12">
												<label class="fw-semibold fs-6">Ren.No &emsp;</label>
												<label class="fw-bold fs-5">-</label>
											</div>
										</div>
										<div class="row">
											<label class="col-lg-6 col-form-label fw-semibold fs-6">Last Rcpt Count & Date</label>
											<?php 
												$cnt=$this->db->query("select count(*) as rcpt_cnt from RECEIPT_MASTER where BILLNO='".$loan_details->BILLNO."'")->row();
												$last=$this->db->query("select top 1 RECEIPT_DATE from RECEIPT_MASTER where BILLNO='".$loan_details->BILLNO."' order by RECEIPT_DATE desc")->row();
											?>
											<label class="col-lg-2 col-form-label fw-bold fs-6"><?php echo $cnt->rcpt_cnt; ?></label>
											<label class="col-lg-4 col-form-label fw-bold fs-6"> <?php echo (isset($last))?$last->RECEIPT_DATE:"-"; ?></label>
										</div>

										<?php
											$bill_no=$loan_details->BILLNO;
											$vLoanPeriod = $loan_details->MONTHS;
								            $vIntType = $loan_details->INTERESTTYPE;
								            
								            $vLoanAmount=$loan_details->AMOUNT;
								            $vLoanIntPercent=$loan_details->INTEREST;
								            $vPaidPrincipal=$loan_details->PAIDPRINCIPAL;
								            $vPaidInterest=$loan_details->PAIDINTEREST;
								            $vPaidTotal = $vPaidPrincipal + $vPaidInterest;
								            $vLoanBalance = $loan_details->BALANCE;
								            $vLoanDate = $loan_details->ENDATE;
								            $vCalcDate=$redemption_details->RETURNDATE;
								            $calc_date=$redemption_details->RETURNDATE;
								            $vIntStr="";
								            $vFInt = 0;
								            $vSInt = 0;
								            $vTotalInt = 0;
								            $txtPaidPrincipal=0;
								            $txtPaidInterest=0;
								            $data['txtPaidPrincipal']=0;
								            $data['txtPaidInterest']=0;
								            $vpIntStr='-';
								            $vTotalInterest=0;


								            if(substr($vIntType, 0,2)=="F-")
								            {
								                $data['vLoanLastDate']=date('Y-m-d',strtotime($vLoanDate."+50 Days"));
								            }
								            elseif(substr($vIntType, 0,2)=="H-")
								            {
								                $data['vLoanLastDate']=date('Y-m-d',strtotime($vLoanDate."+100 Days"));
								            }
								            else
								            {
								                $data['vLoanLastDate']=date('Y-m-d',strtotime($vLoanDate.' +'.$vLoanPeriod.' months'));
								            }
							          
								           if($data['vLoanLastDate'] < $vCalcDate)
								           {
								                
								                $data['receipt_details'] = $this->Loanreceipt_model->get_receipt_details($bill_no);

								                
								                if(is_null($data['receipt_details']))
								                {
								                    $d1 = new DateTime($calc_date);
								                    $d2 = new DateTime($vLoanDate);
								                    $interval = $d1->diff($d2);
								                    $data['diffInSeconds'] = $interval->s; 
								                    $data['diffInMinutes'] = $interval->i; 
								                    $data['diffInHours']   = $interval->h; 
								                    $data['diffInDays']    = $interval->d; 
								                    $data['diffInMonths']  = $interval->m; 
								                    $data['diffInYears']   = $interval->y;
								                    $vChkReceipts=$this->Loanreceipt_model->check_receipt_entry($bill_no);
								                    $vChkRevised=false;
								                    $vChkOD = False;
								                    
								                }
								                else
								                {
								                    $d1 = new DateTime($data['receipt_details']->REVISED_DATE);
								                    $d2 = new DateTime($vLoanDate);
								                    $interval = $d1->diff($d2);
								                    $data['diffInSeconds'] = $interval->s; 
								                    $data['diffInMinutes'] = $interval->i; 
								                    $data['diffInHours']   = $interval->h; 
								                    $data['diffInDays']    = $interval->d; 
								                    $data['diffInMonths']  = $interval->m;
								                    
								                    $data['diffInYears']   = $interval->y;
								                    $vChkReceipts=$this->Loanreceipt_model->check_receipt_entry($bill_no);

								                    if($data['receipt_details']->CHK_REVISED =='Y')
								                    {
								                        $vChkRevised=true;
								                    }
								                    else
								                    {
								                        $vChkRevised=false;
								                    }
								                   
								                }
								                $vYear=$data['diffInYears'];
								                $vMonths2=$data['diffInMonths'] +($vYear * 12);
								                $vDays2=$data['diffInDays'];
								                //  $vMonths =$data['diffInMonths'];
								                // $vDays1=$data['diffInDays'];
								                $vMonths2 =$data['diffInMonths'];
								                $vDays2=$data['diffInDays'];


								                $vFullDays = $data['diffInDays'];
								                $vFullDays2 = $vFullDays;

								                if($vChkReceipts==true)
								                {
								                    $vMaxNo = $this->Loanreceipt_model->get_max_receipt_no($bill_no);
								                    $data['receipt_row_details']=$this->Loanreceipt_model->get_receipt_rowno($bill_no,$vMaxNo);
								                    if($data['receipt_row_details']->CHK_OD=='Y')
								                    {
								                        $vChkOD = True;
								                    }
								                    else
								                    {
								                        $vChkOD = False;
								                    }
								                    $data['txtPaidInterest'] = $loan_details->PAIDINTEREST;
								                    $data['txtPaidPrincipal'] = $loan_details->PAIDPRINCIPAL;
								                    $data['txtPaidTotal']= $data['txtPaidPrincipal'] + $data['txtPaidInterest'];

								                    if($data['receipt_row_details']->CHK_REVISED=='Y')
								                    {
								                        $vChkRevised = True;
								                        $vRevisedInt=$data['receipt_row_details']->REVISED_INT;
								                        $vRevisedDate=$data['receipt_row_details']->REVISED_DATE;
								                        $vLoanDate = $vRevisedDate;
								                    }
								                    else
								                    {
								                        $vChkRevised = False;
								                    }
								                }

								                    $d1 = new DateTime($calc_date);
								                    $d2 = new DateTime($vLoanDate);
								                    $interval = $d1->diff($d2);
								                    $data['diffInSeconds'] = $interval->s; 
								                    $data['diffInMinutes'] = $interval->i; 
								                    $data['diffInHours']   = $interval->h; 
								                    $data['diffInDays']    = $interval->d; 
								                    $data['diffInMonths']  = $interval->m; 
								                    $data['diffInYears']   = $interval->y;

								                    $vYear = $data['diffInYears'];
								                    $vMonths = $data['diffInMonths']+ ($vYear * 12);
								                    $vDays1 = $data['diffInDays'];

								                 $vExtraMonths = $vMonths - $vLoanPeriod;
								                if ($vChkRevised == true) {$vExtraMonths = $vMonths; }
								                $vExtraMonths1 = $vExtraMonths;
								                $vExtraDays = $vDays1;
								                // $vExtraDays = $vDays1+1;
								                $next_edt='';
								                $next_edt1='';
								                $next_edt2='';
								                
								                $vFullDays = $data['diffInDays'];
								                if ($vChkRevised == false){ $vFullDays = $vFullDays - $vLoanPeriod ;}
								                $vExtraFdays = $vFullDays;
								                $vExtraFdays2 = $vExtraFdays;
								                
								                
								                if($vExtraDays>0 && $vExtraDays<=7)
								                {
								                    $vIntDays=0.25;
								                    $vIntMonths=0.25;
								                }
								                elseif($vExtraDays>=8 && $vExtraDays<=15)
								                {
								                    $vIntDays=0.5;   
								                    $vIntMonths=0.5;
								                }
								                elseif($vExtraDays>=16 && $vExtraDays<=23)
								                {
								                    $vIntDays=0.75;   
								                    $vIntMonths=0.75;
								                }
								                elseif($vExtraDays>=24 && $vExtraDays<=31)
								                {
								                    $vIntDays=1;   
								                    $vIntMonths=1;
								                }
								                else
								                {
								                    $vIntDays=0; 
								                    $vIntMonths=0; 
								                }
								                

								                $vTotalInt =0;
								                 $vCurrentIntPercent = $loan_details->INTEREST;
								                $vNewP = $loan_details->AMOUNT + ($loan_details->AMOUNT * $loan_details->MONTHS * $loan_details->INTEREST / 100);
								                $vNewP2 = $vNewP;
								                $vNewPrincipal = $vNewP;

								                 $vFInt = ($vLoanAmount * $vLoanPeriod * $vLoanIntPercent / 100);
								                $vTotalInt = $vTotalInt + $vFInt;

								                if(substr($vIntType, 0,2)=="F-" or substr($vIntType, 0,2)=="H-")
								                {
								                    $vTotalInt=0;
								                    $vPerDayInterest =$vLoanAmount * $loan_details->INTEREST / 3000;
								                    $vNewP = $loan_details->AMOUNT + $loan_details->MONTHS * $vPerDayInterest;
								                    $vNewP2 = $vNewP;
								                    $vNewPrincipal = $vNewP;

								                     $vFInt = $loan_details->MONTHS * $vPerDayInterest;
								                    $vTotalInt = round($vTotalInt) + $vFInt;
								                }
								                if($vChkReceipts==true && $vChkOD==false)
								                {
								                    $vMaxNo = $this->Loanreceipt_model->get_max_receipt_no($bill_no);
								                    $interest_details=$this->Loanreceipt_model->get_paid_receipt_details($bill_no,$vChkOD,$vLoanPeriod, $vLoanIntPercent);
								                    
								                    $data['txtcalculation']=$interest_details;
								                    $vIntStr=$vIntStr.$interest_details;


								                    if(substr($vIntType, 0,2)=="F-" or substr($vIntType, 0,2)=="H-")
								                    {
								                        
								                        $vPerDayInterest=$vLoanAmount*10/10000;
								                        $vNewP=$vLoanAmount+($vLoanPeriod * $vPerDayInterest) - $vPaidTotal;
								                        $vNewP2=$vNewP;
								                        $vNewPrincipal=$vNewP;
								                    }
								                    else
								                    {
								                       
								                        $vNewP = $vLoanAmount + ($vLoanAmount * $vLoanPeriod * $vLoanIntPercent / 100) - $vPaidTotal;
								                        $vNewP2 = $vNewP;
								                        $vNewP3 = $vNewP;
								                        $vNewPrincipal = $vNewP;
								                    }
								                }
								                else if ($vChkReceipts==true && $vChkOD==true)
								                {
								                    $interest_details=$this->Loanreceipt_model->get_paid_receipt_details($bill_no,$vChkOD,$vLoanPeriod, $vLoanIntPercent);

								                    $data['txtcalculation']=$interest_details;
								                    $vIntStr=$vIntStr.$interest_details;
								                    $vCurrentIntPercent = $vRevisedInt - 0.5;
								                    $vNewP = $vLoanBalance;
								                    $vNewP2 = $vNewP;
								                    $vNewP3 = $vNewP;
								                    $vNewPrincipal = $vNewP;
								                    $vTotalInt = 0;

								                }
								                else
								                {

								                    if(substr($vIntType, 0,2)=="F-" or substr($vIntType, 0,2)=="H-")
								                    {
								                        
								                    }
								                    else
								                    {
								                         $edt=$data['vLoanLastDate'];
								                          $next_edt=$data['vLoanLastDate'];
								                    }

								                }
								                if (substr($vIntType, 0,2)!="F-" or substr($vIntType, 0,2)!="H-")
								                {
								                    $vPenalMonths = 3;
								                    if($vExtraMonths>0 )
								                    {
								                         $j = $vExtraMonths / $vPenalMonths;
								                        $M = round($j);
								                        if ($M == 0) {$M=1;}
								                        for($k=1; $k<=$M; $k++)
								                        {
								                            $N = fmod($vExtraMonths, $vPenalMonths);
								                            if( $vExtraMonths >= $vPenalMonths){
								                                $p=$vPenalMonths;
								                            }
								                            else
								                            {
								                                $p=$N;
								                            }
								                            
								                            if ($vCurrentIntPercent <= 3.5){
								                                $GetNewIntPercent = $vCurrentIntPercent + 0.5;
								                            }
								                            
								                            if ($GetNewIntPercent >= 3.5){
								                                $GetNewIntPercent = 3.5;
								                            }
								                            
								                            $vCalcInt = $GetNewIntPercent;
								                            $vCurrentIntPercent = $vCalcInt;
								                            
								                            $vSInt = ($vNewP * $p * $vCalcInt / 100);
								                            $vTotalInt = round($vTotalInt) + $vSInt;
								                           
								                            $next_edt1=date('Y-m-d',strtotime($next_edt.' +'.$p.' months'));
								                            $next_edt=$next_edt1;
								                            
								                            

								                            $vNewP2 = $vNewP2 + ($vNewP * $p * $vCalcInt / 100);
								                            if($vExtraMonths >= $vPenalMonths)
								                            {
								                                $vNewPrincipal = $vNewP2;
								                            }
								                            else
								                            {
								                                $vNewPrincipal = $vNewP;
								                            }
								                            
								                            $vExtraMonths = $vExtraMonths - $p;
								                            $vNewP = $vNewP2;
								                        }
								                    }
								                    if($vExtraDays>0)
								                    {
								                        if (fmod($vExtraMonths1,$vPenalMonths) == 0 )
								                        {
								                            if ($vCurrentIntPercent <= 3.5){
								                                $GetNewIntPercent = $vCurrentIntPercent + 0.5;
								                            }
								                            
								                            if ($GetNewIntPercent >= 3.5){
								                                $GetNewIntPercent = 3.5;
								                            }
								                            $vCalcInt = $GetNewIntPercent;
								                            $vIntforBaldays = $vNewPrincipal * $vIntMonths * $vCalcInt / 100;
								                            $vTotalInt = round($vTotalInt) + $vIntforBaldays;

								                           
								                            $next_edt2=date('Y-m-d',strtotime($next_edt1.' +'.$vExtraDays.' days'));

								                            $next_edt=$next_edt2;
								                           
								                        }
								                        else
								                        {
								                            $vIntforBaldays = $vNewPrincipal * $vIntMonths * $vCalcInt / 100;
								                            $vTotalInt = round($vTotalInt) + $vIntforBaldays;
								                            
								                            $next_edt2=date('Y-m-d',strtotime($next_edt1.' +'.$vFullDays.' days'));

								                            $next_edt=$next_edt2;
								                              
								                        }
								                    }
								                    else
								                    {
								                        $vIntforBaldays = 0;
								                        $vTotalInt = round($vTotalInt) + $vIntforBaldays;
								                    }

								                }

								                if (substr($vIntType, 0,2)=="F-" or substr($vIntType, 0,2)=="H-")
								                {
								                    if ($vExtraFdays > 0)
								                    {
								                        $j = $vExtraFdays / $vLoanPeriod;
								                        $M = round($j);
								                        for($k=1; $k<=$M; $k++)
								                        {
								                            $N = fmod($vExtraFdays, $vLoanPeriod);
								                            if ($vExtraFdays >= $vLoanPeriod){
								                                $p = $vLoanPeriod;
								                            }
								                            else{
								                                $p = $N;
								                            }
								                           
								                            if ($vCurrentIntPercent <= 3.5){
								                                $GetNewIntPercent = $vCurrentIntPercent + 0.5;
								                            }
								                            
								                            if ($GetNewIntPercent >= 3.5){
								                                $GetNewIntPercent = 3.5;
								                            }
								                            $vCalcInt = $GetNewIntPercent;
								                            $vCurrentIntPercent = $vCalcInt;
								                            
								                            $vPerDayInterest = ($vNewP2 * $vCalcInt) / 3000;
								                           
								                            $vSInt = ($p * $vPerDayInterest);
								                            $vTotalInt = round($vTotalInt) + $vSInt;
								                            
								                            $vNewP2 = $vNewP2 + ($p * $vPerDayInterest);
								                            if ($vExtraFdays >= $vLoanPeriod ){
								                                $vNewPrincipal = $vNewP2;
								                            }
								                            else{
								                                $vNewPrincipal = $vNewP;
								                            }
								                            $vExtraFdays = $vExtraFdays - $p;
								                            $vNewP = $vNewP2;
								                        }
								                    }
								                }

								                $get_receipt_summary = $this->Loanreceipt_model->get_receipt_summary($bill_no, "INT"); 
								                $data['txtPaidTotal']=0;
								                $vTotalInterest = round($get_receipt_summary) + round($vTotalInt);

								                $vTotalPaidAmount=$this->Loanreceipt_model->get_receipt_summary($bill_no, "PAIDAMOUNT");
								                $vNetAmount = $vLoanAmount + $vTotalInterest - $vTotalPaidAmount;
								                
								                

								                $data['IntMonths'] =($vMonths + $vIntMonths);
								                
								                if (substr($vIntType, 0,2)=="F-" or substr($vIntType, 0,2)=="H-")
								                {
								                    if($vChkOD==true)
								                    {
								                        $data['IntMonths']="Total : " .$vFullDays. " days";
								                    }
								                    else
								                    {
								                        $data['IntMonths']="Total : " .$vFullDays2. " days";
								                    }
								                    $data['diffInDays']=$vFullDays2." days";
								                    $data['diffInMonths']=0;
								                }  
								                if($vChkReceipts==true and $vChkOD==false)
								                {
								                    $data['txtInterest'] = round($vTotalInt);
								                }
								                elseif($vChkReceipts=true && $vChkOD==true)
								                {
								                    $data['txtPrincipal']=$vLoanAmount;
								                    $data['txtInterest']=$vTotalInterest;
								                    $data['txtTotal']=$vLoanAmount+$vTotalInterest;
								                    $data['txtPaidTotal']=$vTotalPaidAmount;
								                    $data['txtTotalPay']=$data['txtTotal']-$data['txtPaidTotal'];
								                } 
								                elseif($vChkReceipts==false)
								                {
								                    $data['txtPrincipal']=$vLoanAmount;
								                    $data['txtInterest']=round($vNewP2+$vIntforBaldays)-$vLoanAmount;
								                }
								                $data['txtTotal']=$data['txtPrincipal'] +$data['txtInterest'];
								                $data['txtTotalPay']=$data['txtTotal'] -$data['txtPaidTotal'];
								            }
								            else
								            {
								                // $data['pledge_details'] = $this->Redemption_model->get_pledge_details($bill_no);
								                 // $vIntStr = "";
								                 if(strlen($vLoanDate)>7)
								                 {
								                    $d1 = new DateTime($vLoanDate);
								                    $d2 = new DateTime($vCalcDate);
								                    $interval = $d1->diff($d2);
								                    $data['diffInSeconds'] = $interval->s; 
								                    $data['diffInMinutes'] = $interval->i; 
								                    $data['diffInHours']   = $interval->h; 
								                    $data['diffInDays']    = $interval->d; 
								                    $data['diffInMonths']  = $interval->m; 
								                    $data['diffInYears']   = $interval->y;
								                 }
								                
								                $vYear = $data['diffInYears'];
								                $vMonths = $data['diffInMonths'];
								                $vDays = $data['diffInDays'];
								                $vFullDays = $data['diffInDays'];
								                
								                 $data['txtMonths'] = $vMonths;
								                 $data['lbldays'] = $vDays;

								                $data['txtPaidInterest'] = $loan_details->PAIDINTEREST;
								                $data['txtPaidPrincipal'] = $loan_details->PAIDPRINCIPAL;
								                $data['txtPaidTotal']= $data['txtPaidPrincipal']+$data['txtPaidInterest'];
								                
								                $vChkReceipts = $this->Loanreceipt_model->check_receipt_entry($bill_no);
								                if($vChkReceipts == true)
								                {
								                    $vIntStr1= $this->Loanreceipt_model->get_paid_receipt_details1($bill_no);
								                    $vIntStr=$vIntStr.$vIntStr1;

								                }
								                
								                if($vMonths==0 && $vDays>=0)
								                {
								                    $vIntMonths=1;
								                }
								                else if($vMonths>0 && $vDays==0)
								                {
								                    $vIntMonths=$vMonths;
								                }
								                else if($vMonths>0 && $vDays>0)
								                {
								                    if($vDays>0 && $vDays<=7)
								                    {
								                        $vIntMonths=$vMonths+0.25;
								                    }
								                    else if($vDays>=8 && $vDays<=15)
								                    {
								                        $vIntMonths=$vMonths+0.5;
								                    }
								                    else if($vDays>=16 && $vDays<=23)
								                    {
								                        $vIntMonths=$vMonths+0.75;
								                    }
								                    else if($vDays>=24 && $vDays<=31)
								                    {
								                        $vIntMonths=$vIntMonths+1;
								                    }
								                }
								                
								                // Dim vIntpercent As Single, vIntPerMonth As Single
								                // $data['lblTotalMonths']  = "Total : " . $vIntMonths;
								                $vIntpercent = $loan_details->INTEREST/100;
								                
								                // $data['lblODStatus']="NORMAL";
								                $data['txtPrincipal'] = $vLoanAmount;
								                $data['txtInterest'] = round($vLoanAmount*$vIntMonths*$vIntpercent);
								                
								                if (substr($vIntType, 0,2)=="F-" or substr($vIntType, 0,2)=="H-")
								                {
								                    $vPerDayInterest=$vLoanAmount*$vIntpercent/30;
								                    if($vFullDays<30)
								                    {
								                        $data['txtInterest']=round(30*$vPerDayInterest);
								                    }
								                    else
								                    {   
								                        $data['txtInterest']=round($vFullDays*$vPerDayInterest);
								                    }
								                    // $data['lbldays']=$vFullDays." days";
								                    $data['lblTotalMonths']="Total : ".$vFullDays." days";
								                    $data['txtMonths']="0";
								                }           
								                $data['txtTotal'] =$data['txtPrincipal']+$data['txtInterest'];
								                $data['txtTotalPay']=$data['txtTotal']-$data['txtPaidTotal'];
								                
								                
								            }

									         //$result= "||".$vTotalInterest."||".$data['txtPaidPrincipal']."||".$data['txtPaidInterest']."||".$data['txtPaidTotal']."||".$data['txtTotal']."||".$vLoanAmount;

										?>

										<div class="row">
											<table>
												<thead class="fw-bold fs-6 text-center">
													<td class="col-lg-4">Actual</td>
													<td class="col-lg-4">Paid</td>
														<!-- <a href="javascript:;"><i class="fas fa-receipt fa-spin fs-4" title="Payment History" data-bs-toggle="modal" data-bs-target="#kt_modal_receipt_amount_history"></i></a></td> -->
													<td class="col-lg-4">Balance</td>
												</thead>
												<tbody class="fw-semibold fs-6 text-center">
													<tr>
														<td class="col-lg-4">
															<span>Pri : </span>
															<span><?php echo $loan_details->AMOUNT; ?> </span>
														</td>
														<td class="col-lg-4"><?php echo $data['txtPaidPrincipal']; ?></td>

														<td class="col-lg-4"><?php 
														$rem_prin=($loan_details->AMOUNT - $data['txtPaidPrincipal']);
														echo $rem_prin; ?></td>
													</tr>
													<tr>
														<td class="col-lg-4">
															<span>Int : </span>
															<span><?php echo $vTotalInterest; ?></span>
														</td>
														<td class="col-lg-4"><?php echo $data['txtPaidInterest']; ?></td>
														<td class="col-lg-4"><?php 
														$rem_int=($vTotalInterest- $data['txtPaidInterest']);
														echo $rem_int; ?></td>
													</tr>
													<tr>
														<td class="col-lg-4 fw-bold fs-5">
															<span>Tot : </span>
															<span><?php 
															$tot_pr_in=($loan_details->AMOUNT+$vTotalInterest);
															echo $tot_pr_in; ?> </span>
														</td>
														<td class="col-lg-4 fw-bold fs-5"><?php 
														$tot_paid_pr_in=($data['txtPaidPrincipal']+$data['txtPaidInterest']);
														echo $tot_paid_pr_in; ?></td>
														<td class="col-lg-4 fw-bold fs-5"><?php $to_pay_pr_in= $rem_prin+$rem_int; 
														echo $to_pay_pr_in; ?></td>
													</tr>
												</tbody>
											</table>
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
					            Pledge Info &emsp; - &emsp; Count <span>&emsp; <?php echo count((array)$pledge_details); ?> &emsp; - &emsp;</span> Total Net Weight <span>&emsp; <?php echo $loan_details->NETWEIGHT; ?>gms</span>
					            </button>
					        </h2>
					        <div id="kt_accordion_item_list_body_1" class="accordion-collapse collapse" aria-labelledby="kt_accordion_item_list_header_1" data-bs-parent="#kt_accordion_item_list">
					            <div class="accordion-body">
					            	<table class="table align-middle table-row-dashed table-striped table-hover fs-7 gy-1 gs-2" id="kt_datatable_dom_positioning_add_loan">
													<thead>
														<tr class="text-start text-muted fw-bold fs-7 gs-0">
															<th class="min-w-50px">Sno</th>
												            <th class="min-w-150px">Item-Sub Item</th>
												            <th class="min-w-80px">Quality</th>
												            <th class="min-w-80px">Purity(%)</th>
												            <th class="min-w-80px">Weight(gms)</th>
												            <th class="min-w-100px">Stone Wgt(gms)</th>
												            <th class="min-w-80px">Less(gms)</th>
												            <th class="min-w-80px">Nt Wgt(gms)</th>
												            <th class="min-w-50px">Img</th>
														</tr>
													</thead>
													<tbody class="text-gray-600 fw-semibold">

														<?php 
															 $i=1;
														 foreach($pledge_details as $plist){ ?>
														<tr>
															<td><?php echo $i; ?></td>
												            <td class="ple1"><?php echo $plist['PLEDGENAME']; ?></td>
												            <td><?php echo $plist['PURITY']; ?></td>
												            <td><?php echo (isset($plist['PURITY_PERCENT']))?$plist['PURITY_PERCENT']:$loan_details->QUALITY; ?></td>
												            <td><?php echo $plist['WEIGHT']; ?></td>
												            <td><?php echo $plist['STONEWEIGHT']; ?></td>
												            <td><?php echo $plist['LESS']; ?></td>
												            <td><?php echo $plist['NETWEIGHT']; ?></td>
												            <td>
												            	<div class="image-input mt-2 me-6" data-kt-image-input="true">
																	<div class="image-input-wrapper w-40px h-40px"style="background-image: url(assets/images/sample_jewel.jpg)"></div>
																</div>
												            </td>
									        			</tr>

											   		<?php $i++; } ?>
												   </tbody>
												   <tfoot>
														<tr class="text-start text-muted fw-bold fs-6 gs-0">
															<th class="min-w-50px"></th>
									            <th class="min-w-150px"></th>
									            <th class="min-w-80px"></th>
									            <th class="min-w-80px">Total</th>
									            <th class="min-w-80px"><?php echo $loan_details->WEIGHT; ?></th>
									            <th class="min-w-100px"><?php echo $loan_details->STONELESS; ?></th>
									            <th class="min-w-80px"><?php echo $loan_details->LESS; ?></th>
									            <th class="min-w-80px"><?php echo $loan_details->NETWEIGHT; ?></th>
									            <th class="min-w-50px"></th>
														</tr>
													</tfoot>
												</table>
												<div class="row">
													<label class="col-lg-1 col-form-label fw-semibold fs-6">Weight</label>
													<label class="col-lg-1 col-form-label fw-bold fs-6"><?php echo $loan_details->WEIGHT; ?></label>
													<label class="col-lg-1 col-form-label fw-semibold fs-6">Stoneless</label>
													<label class="col-lg-1 col-form-label fw-bold fs-6"><?php echo $loan_details->STONELESS; ?></label>
													<label class="col-lg-1 col-form-label fw-semibold fs-6">Less</label>
													<label class="col-lg-1 col-form-label fw-bold fs-6"><?php echo $loan_details->LESS; ?></label>
													<label class="col-lg-1 col-form-label fw-semibold fs-6">Net.Wght</label>
													<label class="col-lg-1 col-form-label fw-bold fs-6"><?php echo $loan_details->NETWEIGHT; ?></label>
													<label class="col-lg-1 col-form-label fw-semibold fs-6">CurrRate</label>
													<label class="col-lg-1 col-form-label fw-bold fs-6"><?php echo $loan_details->CURRENTRATE; ?></label>
													<label class="col-lg-1 col-form-label fw-semibold fs-6">Purity%</label>
													<label class="col-lg-1 col-form-label fw-bold fs-6"><?php echo $loan_details->QUALITY; ?></label>
												</div>
												<div class="row">
													<label class="col-lg-1 col-form-label fw-semibold fs-6">Gram.Val</label>
													<label class="col-lg-1 col-form-label fw-bold fs-6"><?php 
													$grm_val=$loan_details->CURRENTRATE*$loan_details->QUALITY/100;
													$purity_wgt=$loan_details->NETWEIGHT*$loan_details->QUALITY/100;
											
													$sales_rate=$loan_details->CURRENTRATE*$purity_wgt;
													echo $grm_val; ?></label>
													<label class="col-lg-1 col-form-label fw-semibold fs-6">SalesRate</label>
													<label class="col-lg-1 col-form-label fw-bold fs-6"><?php echo $sales_rate; ?></label>
												</div>
					          	</div>
					        </div>
					    </div>
					  </div>
					</div>
					
					<?php //echo $result; ?>
					<?php if($loan_details->CLOSING_STATUS=='CUSTOMER_CLOSE'){ ?>
					<!-- Customer Close Start -->
					<div id="cus_close_tbox_view">
						<div class="row mt-4">
							<div class="accordion" id="kt_accordion_item_cus_close">
						    <div class="accordion-item">
						        <h2 class="accordion-header" id="kt_accordion_item_cus_close_header_1">
						            <button class="accordion-button fw-bold fs-6 collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#kt_accordion_item_cus_close_body_1" aria-expanded="false" aria-controls="kt_accordion_item_cus_close_body_1">
						            Customer Close Details</button>
						        </h2>
						        <div id="kt_accordion_item_cus_close_body_1" class="accordion-collapse collapse" aria-labelledby="kt_accordion_item_cus_close_header_1" data-bs-parent="#kt_accordion_item_cus_close">
						            <div class="accordion-body">
						            	<div class="row mt-4">
											<label class="col-lg-2 col-form-label fw-bold fs-3">Customer Close</label>
											<div class="col-lg-10">
												<label class="col-form-label fw-bold fs-3">Total Balance &emsp;</label>
												<label class="col-form-label fw-bold fs-3"><?php echo $tot_pr_in; ?></label>
												<span class="fw-bold fs-3">&emsp;(&nbsp;</span>
												<label class="col-form-label fw-bold fs-3">Principal &emsp;</label>
												<label class="col-form-label fw-bold fs-3"><?php echo $loan_details->AMOUNT; ?></label>&emsp;
												<label class="col-form-label fw-bold fs-3">Interest &emsp;</label>
												<label class="col-form-label fw-bold fs-3"><?php echo $vTotalInterest; ?></label>
												<span class="fw-bold fs-3">&nbsp;)</span>
											</div>
											<div class="col-lg-4">
												<div class="row">
													<label class="col-lg-6 col-form-label fw-semibold fs-6">Paper Action Charge</label>
													<label class="col-lg-6 col-form-label fw-bold fs-5"><?php echo $redemption_details->MAINTAINCHARGE;?></label>
													<label class="col-lg-6 col-form-label fw-semibold fs-6">Notice Charge</label>
													<label class="col-lg-6 col-form-label fw-bold fs-5"><?php echo $redemption_details->NOTICECHARGE;?></label>
													<label class="col-lg-6 col-form-label fw-semibold fs-6">Form Missing</label>
													<label class="col-lg-6 col-form-label fw-bold fs-5"><?php echo $redemption_details->FORMCHARGE;?></label>
												</div>
											</div>
											<div class="col-lg-4">
												<div class="row">
													<label class="col-lg-6 col-form-label fw-semibold fs-6">On Account</label>
													<label class="col-lg-6 col-form-label fw-bold fs-5" style="background-color:#ff5b5b;color: white;border-radius: 8px;"><?php echo $redemption_details->HL_AMOUNT;?></label>
													<label class="col-lg-6 col-form-label fw-semibold fs-6">Discount</label>
													<label class="col-lg-6 col-form-label fw-bold fs-5"><?php echo $redemption_details->DISCOUNT;?></label>
													<div class="col-lg-12 text-center">
														<label class="col-form-label fw-bold fs-2">Net Pay &emsp;</label>
														<label class="col-form-label fw-bold fs-2"><?php 
														$other_amt=$redemption_details->MAINTAINCHARGE+$redemption_details->FORMCHARGE+$redemption_details->NOTICECHARGE+$redemption_details->HL_AMOUNT;
														$np=$tot_pr_in+$other_amt-$redemption_details->DISCOUNT;
														echo $np;

													?></label>
													</div>
												</div>
											</div>
											<div class="col-lg-4">
												<div class="row">
													<label class="col-lg-6 col-form-label fw-semibold fs-6">Closed By</label>
													<label class="col-lg-6 col-form-label fw-bold fs-5"><?php echo $redemption_details->CLOSED_BY; ?></label>
													<label class="col-lg-6 col-form-label fw-semibold fs-6">Name</label>
													<label class="col-lg-6 col-form-label fw-bold fs-5"><?php echo $redemption_details->CLOSED_NAME; ?></label>
												</div>
											</div>
										</div>
													<div class="row">
														<label class="col-form-label fw-bold fs-4">Party Payment Details</label>
														<?php if($redemption_details->TYPE_OF_RECORD=='O'){?>
														<label class="col-lg-1 col-form-label fw-semibold fs-6">Cash</label>
														<label class="col-lg-2 col-form-label fw-bold fs-5"><?php echo $redemption_details->NETPAYABLE;?></label>
														<label class="col-lg-1 col-form-label fw-semibold fs-6">Details</label>
														<label class="col-lg-2 col-form-label fw-bold fs-5"><?php echo "-";?>
														</label>
													</div>
													<?php }
														else
														{
									            		$pay_res=$this->db->query("select * from payment_inward_outward where bill_no='".$redemption_details->BILLNO."' and module_name='New Redemption - Customer Close'")->result_array();
									            		foreach ($pay_res as $plist) 
									            		{
														
									            			if($plist['type_of_payment']=='Cash')
									            			{
										            	?>
										            	<div class="row">

														<label class="col-lg-1 col-form-label fw-semibold fs-6">Cash</label>
														<label class="col-lg-2 col-form-label fw-bold fs-5"><?php echo $plist['amount'];?></label>
														<label class="col-lg-1 col-form-label fw-semibold fs-6">Details</label>
														<label class="col-lg-2 col-form-label fw-bold fs-5"><?php echo $plist['remarks'];?>
														</label>
														</div>
													<?php } ?>

													
													<?php 
													
														if($plist['type_of_payment']=='Cheque' && $redemption_details->TYPE_OF_RECORD=='N')
							            				{
													?>
													<div class="row">
														<label class="col-lg-1 col-form-label fw-semibold fs-6">Cheque</label>
														<label class="col-lg-2 col-form-label fw-bold fs-5"><?php echo $plist['amount']; ?></label>
														<label class="col-lg-1 col-form-label fw-semibold fs-6">Party Bank</label>
														<label class="col-lg-2 col-form-label fw-bold fs-5">-</label>
														<label class="col-lg-1 col-form-label fw-semibold fs-6">Ref.No</label>
														<label class="col-lg-2 col-form-label fw-bold fs-5"><?php echo $plist['cheque_ref_no']; ?></label>
														<label class="col-lg-1 col-form-label fw-semibold fs-6">Details</label>
														<label class="col-lg-2 col-form-label fw-bold fs-5"><?php echo $plist['remarks']; ?></label>
													</div>
													<?php }
														if($plist['type_of_payment']=='RTGS' && $redemption_details->TYPE_OF_RECORD=='N')
							            				{
													?>
													<div class="row">
														<label class="col-lg-1 col-form-label fw-semibold fs-6">RTGS</label>
														<label class="col-lg-2 col-form-label fw-bold fs-5"><?php echo $plist['amount']; ?></label>
														<label class="col-lg-1 col-form-label fw-semibold fs-6">Ref.No</label>
														<label class="col-lg-2 col-form-label fw-bold fs-5"><?php echo $plist['cheque_ref_no']; ?></label>
														<label class="col-lg-1 col-form-label fw-semibold fs-6">Cmy.Bank</label>
														<label class="col-lg-2 col-form-label fw-bold fs-5"><?php 
														$cmy_bank=$this->db->query("select * from  BANKS where SNO='".$plist['company_bank']."'")->row();
														echo $cmy_bank->BANKNAME." - ".$cmy_bank->BRANCH;
														?></label>
														<label class="col-lg-1 col-form-label fw-semibold fs-6">Details</label>
														<label class="col-lg-2 col-form-label fw-bold fs-5"><?php echo $plist['remarks']; ?></label>
													</div>
													<?php }
													if($plist['type_of_payment']=='UPI' && $redemption_details->TYPE_OF_RECORD=='N')
							            				{
													?>
													<div class="row">
														<label class="col-lg-1 col-form-label fw-semibold fs-6">UPI</label>
														<label class="col-lg-2 col-form-label fw-bold fs-5"><?php echo $plist['amount']; ?></label>
														<label class="col-lg-1 col-form-label fw-semibold fs-6">Ref.No</label>
														<label class="col-lg-2 col-form-label fw-bold fs-5"><?php echo $plist['cheque_ref_no']; ?></label>
														<label class="col-lg-1 col-form-label fw-semibold fs-6">Cmy.Bank</label>
														<label class="col-lg-2 col-form-label fw-bold fs-5"><?php 
														$cmy_bank=$this->db->query("select * from  BANKS where SNO='".$plist['company_bank']."'")->row();
														echo $cmy_bank->BANKNAME." - ".$cmy_bank->BRANCH;
														?></label>
														<label class="col-lg-1 col-form-label fw-semibold fs-6">Details</label>
														<label class="col-lg-2 col-form-label fw-bold fs-5"><?php echo $plist['remarks']; ?></label>
													</div>
													<?php } 
														if($plist['type_of_payment']=='Membership Card' && $redemption_details->TYPE_OF_RECORD=='N')
							            				{
							            					?>
													<div class="row">
														<label class="col-lg-1 col-form-label fw-semibold fs-6">M.Card No</label>
														<label class="col-lg-2 col-form-label fw-bold fs-5">-</label>
														
														<div class="col-lg-3">
															<label class="col-form-label fw-semibold fs-6">Redm.Points</label>&emsp;
															<label class="col-form-label fw-bold fs-5"><?php echo $plist['amount']; ?></label>
														</div>
														<label class="col-lg-1 col-form-label fw-semibold fs-6">Details</label>
														<label class="col-lg-2 col-form-label fw-bold fs-5"><?php echo $plist['remarks']; ?></label>
													</div>
													<?php } 
														if($plist['type_of_payment']=='Chit' && $redemption_details->TYPE_OF_RECORD=='N')
							            				{
													?>

													<div class="row">
														<label class="col-lg-1 col-form-label fw-semibold fs-6">Scheme</label>
														<label class="col-lg-2 col-form-label fw-bold fs-5">-</label>
														<div class="col-lg-3">
															<label class="col-form-label fw-semibold fs-6">Chit ID</label>&emsp;
															<label class="col-form-label fw-bold fs-5">-</label>
														</div>
														<div class="col-lg-3">
															<label class="col-form-label fw-semibold fs-6">Redm.Amt</label>&emsp;
															<label class="col-form-label fw-bold fs-5"><?php echo $plist['amount']; ?></label>
														</div>
														<label class="col-lg-1 col-form-label fw-semibold fs-6">Details</label>
														<label class="col-lg-2 col-form-label fw-bold fs-5"><?php echo $plist['remarks']; ?></label>
													</div>
												<?php } 
													} 
												}	?>
													<div class="row">
														<div class="col-lg-6 text-center">
															<label class="col-form-label fw-semibold fs-6">Net Payable &emsp;</label>
															<label class="col-form-label fw-bold fs-2"><?php echo $redemption_details->NETPAYABLE; ?></label>
														</div>
														<div class="col-lg-6 text-center">
															<label class="col-form-label fw-semibold fs-6">Paid Amount &emsp;</label>
															<label class="col-form-label fw-bold fs-2"><?php echo $redemption_details->PAIDAMOUNT; ?></label>
														</div>
														<!-- <div class="col-lg-4 text-center">
															<label class="col-form-label fw-semibold fs-6">Balance Amount &emsp;</label>
															<label class="col-form-label fw-bold fs-2">0.00</label>
														</div> -->
													</div>
													<div class="row mt-4">
														<label class="col-lg-2 col-form-label fw-semibold fs-6">Customer Rating</label>
														<label class="col-lg-1 col-form-label fw-bold fs-5"><?php if($redemption_details->TYPE_OF_RECORD=='O'){echo "-"; }else{?>

															<?php
															$rating_det=$this->db->query("select * from  CUSTOMER_RATING_HISTORY where BILLNO='".$loan_details->BILLNO."' and LOG_DATE='".$redemption_details->RETURNDATE."'")->row(); 
															$r=(isset($rating_det))?$rating_det->RATING:0;
															if($r==1) echo "Bad";
															if($r==2) echo "Average";
															if($r==3) echo "Good";
															if($r==0) echo "-";
															}?></label>
														<label class="col-lg-2 col-form-label fw-semibold fs-6">Membership Points Add</label>
														<label class="col-lg-2 col-form-label fw-bold fs-5"><?php if($redemption_details->TYPE_OF_RECORD=='O'){echo "-"; }else{?>

															<?php
															$history_det=$this->db->query("select * from  MEMBERSHIP_HISTORY where BILLNO='".$loan_details->BILLNO."' and LOG_DATE='".$redemption_details->RETURNDATE."'")->row(); 
															$r=(isset($history_det))?$history_det->POINTS_EARNED:0;
															echo $r;
															}?></label>
													</div>
						          	</div>
						        </div>
						    </div>
						  </div>
						</div>
					</div>
					<!-- <hr class="mt-2"> -->
					<!-- Customer Close end -->
					<?php } ?>
					<?php if($loan_details->CLOSING_STATUS=='CUSTOMER_TRANSFER'){ ?>
					<!-- Customer Transfer start -->
					<div id="cus_trans_tbox_view">
						<div class="row mt-4">
							<div class="accordion" id="kt_accordion_item_cus_trans">
						    <div class="accordion-item">
						        <h2 class="accordion-header" id="kt_accordion_item_cus_trans_header_1">
						            <button class="accordion-button fw-bold fs-6 collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#kt_accordion_item_cus_trans_body_1" aria-expanded="false" aria-controls="kt_accordion_item_cus_trans_body_1">
						            Customer Transfer Details</button>
						        </h2>
						        <div id="kt_accordion_item_cus_trans_body_1" class="accordion-collapse collapse" aria-labelledby="kt_accordion_item_cus_trans_header_1" data-bs-parent="#kt_accordion_item_cus_trans">
						            <div class="accordion-body">
						            	<div class="row mt-4">
											<label class="col-lg-3 col-form-label fw-bold fs-3">Customer Transfer</label>
											<div class="col-lg-9">
												<label class="col-form-label fw-bold fs-3">Total Balance &emsp;</label>
												<label class="col-form-label fw-bold fs-3"><?php echo $tot_pr_in; ?></label>
												<span class="fw-bold fs-3">&emsp;(&nbsp;</span>
												<label class="col-form-label fw-bold fs-3">Principal &emsp;</label>
												<label class="col-form-label fw-bold fs-3"><?php echo $loan_details->AMOUNT; ?></label>&emsp;
												<label class="col-form-label fw-bold fs-3">Interest &emsp;</label>
												<label class="col-form-label fw-bold fs-3"><?php echo $vTotalInterest; ?></label>
												<span class="fw-bold fs-3">&nbsp;)</span>
											</div>
											<div class="col-lg-4">
												<div class="row">
													<label class="col-lg-6 col-form-label fw-semibold fs-6">Paper Action Charge</label>
													<label class="col-lg-6 col-form-label fw-bold fs-5"><?php echo $redemption_details->MAINTAINCHARGE;?></label>
													<label class="col-lg-6 col-form-label fw-semibold fs-6">Notice Charge</label>
													<label class="col-lg-6 col-form-label fw-bold fs-5"><?php echo $redemption_details->NOTICECHARGE;?></label>
													<label class="col-lg-6 col-form-label fw-semibold fs-6">Form Missing</label>
													<label class="col-lg-6 col-form-label fw-bold fs-5"><?php echo $redemption_details->FORMCHARGE;?></label>
												</div>
											</div>
											<div class="col-lg-4">
												<div class="row">
													<label class="col-lg-6 col-form-label fw-semibold fs-6">On Account</label>
													<label class="col-lg-6 col-form-label fw-bold fs-5" style="background-color:#ff5b5b;color: white;border-radius: 8px;"><?php echo $redemption_details->HL_AMOUNT;?></label>
													<label class="col-lg-6 col-form-label fw-semibold fs-6">Discount</label>
													<label class="col-lg-6 col-form-label fw-bold fs-5">1<?php echo $redemption_details->DISCOUNT;?></label>
													<div class="col-lg-12 text-center">
														<label class="col-form-label fw-bold fs-2">Net Pay &emsp;</label>
														<label class="col-form-label fw-bold fs-2"><?php 
														$other_amt=$redemption_details->MAINTAINCHARGE+$redemption_details->FORMCHARGE+$redemption_details->NOTICECHARGE+$redemption_details->HL_AMOUNT;
														$np=$tot_pr_in+$other_amt-$redemption_details->DISCOUNT;
														echo $np;

													?></label>
													</div>
												</div>
											</div>
											<div class="col-lg-4">
												<div class="row">
													<label class="col-lg-6 col-form-label fw-semibold fs-6">Closed By</label>
													<label class="col-lg-6 col-form-label fw-bold fs-5"><?php echo $redemption_details->CLOSED_BY; ?></label>
													<label class="col-lg-6 col-form-label fw-semibold fs-6">Name</label>
													<label class="col-lg-6 col-form-label fw-bold fs-5"><?php echo $redemption_details->CLOSED_NAME; ?></label>
												</div>
											</div>
										</div>
										<div class="row">
											<!-- <label class="col-form-label fw-bold fs-5">Party Need More Cash</label> -->
											<label class="col-lg-2 col-form-label fw-semibold fs-6">Payable Amount</label>
											<label class="col-lg-2 col-form-label fw-bold fs-5"><?php echo $redemption_details->PAIDAMOUNT; ?></label>
											<label class="col-lg-2 col-form-label fw-semibold fs-6">Balance in Current Loan</label>
											<label class="col-lg-2 col-form-label fw-bold fs-5"><?php echo $redemption_details->BALANCE; ?></label>
											<label class="col-lg-2 col-form-label fw-semibold fs-6">Request from New Loan</label>
											<label class="col-lg-2 col-form-label fw-bold fs-5"><?php echo $redemption_details->NEWLOANAMOUNT; ?></label>
										</div>
						          	</div>
						        </div>
						    </div>
						  </div>
						</div>
						<div class="row mt-4">
							<div class="accordion" id="kt_accordion_item_redemption_cus_trans_party_payment">
						    <div class="accordion-item">
						        <h2 class="accordion-header" id="kt_accordion_item_redemption_cus_trans_party_payment_header_1">
						            <button class="accordion-button fw-bold fs-6 collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#kt_accordion_item_redemption_cus_trans_party_payment_body_1" aria-expanded="false" aria-controls="kt_accordion_item_redemption_cus_trans_party_payment_body_1">
						            Party Payment Details</button>
						        </h2>
						        <div id="kt_accordion_item_redemption_cus_trans_party_payment_body_1" class="accordion-collapse collapse" aria-labelledby="kt_accordion_item_redemption_cus_trans_party_payment_header_1" data-bs-parent="#kt_accordion_item_redemption_cus_trans_party_payment">
						            <div class="accordion-body">
						            	<div class="row">
														<label class="col-lg-1 col-form-label fw-semibold fs-6">Cash</label>
														<label class="col-lg-2 col-form-label fw-bold fs-5">0.00</label>
														<label class="col-lg-1 col-form-label fw-semibold fs-6">Details</label>
														<label class="col-lg-2 col-form-label fw-bold fs-5">-</label>
													</div>
													<div class="row">
														<label class="col-lg-1 col-form-label fw-semibold fs-6">Cheque</label>
														<label class="col-lg-2 col-form-label fw-bold fs-5">0.00</label>
														<label class="col-lg-1 col-form-label fw-semibold fs-6">Party Bank</label>
														<label class="col-lg-2 col-form-label fw-bold fs-5"></label>
														<label class="col-lg-1 col-form-label fw-semibold fs-6">Ref.No</label>
														<label class="col-lg-2 col-form-label fw-bold fs-5"></label>
														<label class="col-lg-1 col-form-label fw-semibold fs-6">Details</label>
														<label class="col-lg-2 col-form-label fw-bold fs-5">-</label>
													</div>
													<div class="row">
														<label class="col-lg-1 col-form-label fw-semibold fs-6">RTGS</label>
														<label class="col-lg-2 col-form-label fw-bold fs-5">0.00</label>
														<label class="col-lg-1 col-form-label fw-semibold fs-6">Ref.No</label>
														<label class="col-lg-2 col-form-label fw-bold fs-5"></label>
														<label class="col-lg-1 col-form-label fw-semibold fs-6">Cmy.Bank</label>
														<label class="col-lg-2 col-form-label fw-bold fs-5"></label>
														<label class="col-lg-1 col-form-label fw-semibold fs-6">Details</label>
														<label class="col-lg-2 col-form-label fw-bold fs-5">-</label>
													</div>
													<div class="row">
														<label class="col-lg-1 col-form-label fw-semibold fs-6">UPI</label>
														<label class="col-lg-2 col-form-label fw-bold fs-5">0.00</label>
														<label class="col-lg-1 col-form-label fw-semibold fs-6">Ref.No</label>
														<label class="col-lg-2 col-form-label fw-bold fs-5"></label>
														<label class="col-lg-1 col-form-label fw-semibold fs-6">Cmy.Bank</label>
														<label class="col-lg-2 col-form-label fw-bold fs-5"></label>
														<label class="col-lg-1 col-form-label fw-semibold fs-6">Details</label>
														<label class="col-lg-2 col-form-label fw-bold fs-5">-</label>
													</div>
													<div class="row">
														<label class="col-lg-1 col-form-label fw-semibold fs-6">M.Card No</label>
														<label class="col-lg-2 col-form-label fw-bold fs-5">-</label>
														
														<div class="col-lg-3">
															<label class="col-form-label fw-semibold fs-6">Redm.Points</label>&emsp;
															<label class="col-form-label fw-bold fs-5">-</label>
														</div>
														<label class="col-lg-1 col-form-label fw-semibold fs-6">Details</label>
														<label class="col-lg-2 col-form-label fw-bold fs-5">-</label>
													</div>
													<div class="row">
														<label class="col-lg-1 col-form-label fw-semibold fs-6">Scheme</label>
														<label class="col-lg-2 col-form-label fw-bold fs-5">-</label>
														<div class="col-lg-3">
															<label class="col-form-label fw-semibold fs-6">Chit ID</label>&emsp;
															<label class="col-form-label fw-bold fs-5">-</label>
														</div>
														<div class="col-lg-3">
															<label class="col-form-label fw-semibold fs-6">Redm.Amt</label>&emsp;
															<label class="col-form-label fw-bold fs-5">-</label>
														</div>
														<label class="col-lg-1 col-form-label fw-semibold fs-6">Details</label>
														<label class="col-lg-2 col-form-label fw-bold fs-5">-</label>
													</div>
													<div class="row">
														<div class="col-lg-6 text-center">
															<label class="col-form-label fw-semibold fs-6">Net Payable &emsp;</label>
															<label class="col-form-label fw-bold fs-2"><?php echo $redemption_details->NETPAYABLE; ?></label>
														</div>
														<div class="col-lg-6 text-center">
															<label class="col-form-label fw-semibold fs-6">Paid Amount &emsp;</label>
															<label class="col-form-label fw-bold fs-2"><?php echo $redemption_details->PAIDAMOUNT; ?></label>
														</div>
													</div>
						            </div>
						        </div>
						    </div>
							</div>
						</div>
						<div class="row mt-4">
							<div class="accordion" id="kt_accordion_item_redemption_new_loan">
						    <div class="accordion-item">
						        <h2 class="accordion-header" id="kt_accordion_item_redemption_new_loan_header_1">
						            <button class="accordion-button fw-bold fs-6 collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#kt_accordion_item_redemption_new_loan_body_1" aria-expanded="false" aria-controls="kt_accordion_item_redemption_new_loan_body_1">
						            New Loan Entry</button>
						        </h2>
						        <?php 
						        $new_loan_details=$this->db->query("select * from LOANS where BILLNO='".$redemption_details->NEWBILLNO."'")->row();
						        ?>
						        <div id="kt_accordion_item_redemption_new_loan_body_1" class="accordion-collapse collapse" aria-labelledby="kt_accordion_item_redemption_new_loan_header_1" data-bs-parent="#kt_accordion_item_redemption_new_loan">
						            <div class="accordion-body">
						            	<div class="row">
						            		<div class="col-lg-1">
						            			<label class="col-form-label fw-semibold fs-6">JewelType</label>
						            		</div>
						            		<label class="col-lg-2 col-form-label fw-bold fs-5">
						            			<?php 
						            			// if($new_loan_details->TYPE_OF_RECORD0=='N')
						            			// {

						            			// }
						            			// else
						            			// {
						            				echo $new_loan_details->JEWEL_TYPE;
						            			// }
						            			?>
						            		</label>
														<label class="col-lg-1 col-form-label fw-semibold fs-6">Scheme</label>
														<label class="col-lg-2 col-form-label fw-bold fs-5"><?php $res=explode('-',$new_loan_details->INTERESTTYPE); echo $res['0']; ?></label>
														<label class="col-lg-1 col-form-label fw-semibold fs-6">Int Type</label>
														<label class="col-lg-2 col-form-label fw-bold fs-5"><?php echo $new_loan_details->INTEREST; ?></label>
														<div class="col-lg-3">
															<label class="col-form-label fw-semibold fs-6">Loan Date &emsp;</label>
															<label class="col-form-label fw-bold fs-5"><?php echo date_format(date_create($new_loan_details->ENDATE),'d-m-Y'); ?></label>
														</div>
						            	</div>
													<div class="row mt-4">
														<div class="col-lg-4">
															<div class="px-4" style="border-radius: 10px;padding-bottom: 10px;box-shadow: 0 5px 10px #00002947;">
																<label class="col-lg-12 col-form-label fw-bold fs-5 text-center">Loan Payment Information</label>
																<div class="row">
																	<label class="col-lg-6 col-form-label fw-semibold fs-6">Loan Amount</label>
																	<label class="col-lg-6 col-form-label fw-bold fs-5" style="font-size: 18px !important;font-weight: 700 !important;color: #1B439E !important;"><?php echo $new_loan_details->AMOUNT;	?></label>
																	<label class="col-lg-6 col-form-label fw-semibold fs-6">Monthly Interest</label>
																	<label class="col-lg-6 col-form-label fw-bold fs-5"><span style="background-color:#C6C6C6;border-radius: 8px;padding: 5px 15px 5px 15px;"><?php 
																		$amt=($new_loan_details->AMOUNT*$new_loan_details->INTEREST*$new_loan_details->MONTHS)/100;
																		echo $amt;
																	?></span></label>
																	<label class="col-lg-6 col-form-label fw-semibold fs-6">Redemption period</label>
																	<label class="col-lg-2 col-form-label fw-bold fs-5"><?php
																	echo $new_loan_details->REDEMPTION_PERIOD; ?></label>
																	<label class="col-lg-3 col-form-label fw-semibold fs-6" id="loan_per_mon_days">Days</label>
																</div>
																<div class="row">
																	<div class="d-flex justify-content-center align-items-center">
																		<label class="col-form-label fw-bold fs-3">Total Loan Amount &emsp; <span><?php echo $new_loan_details->AMOUNT; ?></span></label>
																	</div>
																</div>
															</div>
														</div>
														<div class="col-lg-4">
															<div class="px-4" style="border-radius: 10px;padding-bottom: 8px;box-shadow: 0 5px 10px #00002947;">
																<label class="col-lg-12 col-form-label fw-bold fs-5 text-center">Payment To Receive</label>
																<div class="row">
																	<div class="col-lg-12 text-center">
																		<label class="col-form-label fw-bold fs-3">Current Loan Net Pay &emsp;</label>
																		<label class="col-form-label fw-bold fs-3"><?php 
																	// $other_amt=$redemption_details->MAINTAINCHARGE+$redemption_details->FORMCHARGE+$redemption_details->NOTICECHARGE+$redemption_details->HL_AMOUNT;
																	// $np=$tot_pr_in+$other_amt-$redemption_details->DISCOUNT;
																		 echo ($redemption_details->BALANCE+$redemption_details->NEWLOANAMOUNT-$redemption_details->PAIDAMOUNT); 
																	// echo $np; 
																	?></label>
																	</div>
																	<label class="col-lg-6 col-form-label fw-semibold fs-6">Processing Charge</label>
																	<label class="col-lg-2 col-form-label fw-bold fs-5"><?php ?></label>
																	<label class="col-lg-6 col-form-label fw-semibold fs-6">Document Charge</label>
																	<label class="col-lg-6 col-form-label fw-bold fs-5">50</label>
																</div>
																<div class="row mt-1">
																	<label class="col-lg-12 col-form-label fw-bold fs-3 text-center">Total &emsp; <span>12077.01</span></label>
																</div>
															</div>
														</div>
														<div class="col-lg-4">
															<div class="px-4" style="padding-bottom: 5px;border-radius: 10px;box-shadow: 0 5px 10px #00002947;">
																<label class="col-lg-12 col-form-label fw-bold fs-5 text-center">To Pay</label>
																<div class="row">
																	<label class="col-lg-4 col-form-label fw-bold fs-3">Net Pay</label>
																	<label class="col-lg-8 col-form-label fw-bold fs-3">4900.00</label>
																</div>
																<div class="row">
																	<label class="col-lg-4 col-form-label fw-semibold fs-6">Remarks</label>
																</div>
																<div class="row mb-17">
																	<label class="col-lg-12 col-form-label fw-bold fs-5">-</label>
																</div>
															</div>
														</div>
													</div>
													<div class="row mt-4">
						            		<label class="col-form-label fw-bold fs-4">Payment From Company</label>
														<label class="col-lg-1 col-form-label fw-semibold fs-6">Cash</label>
														<label class="col-lg-2 col-form-label fw-bold fs-5">4900.00</label>
														<label class="col-lg-1 col-form-label fw-semibold fs-6">Details</label>
														<label class="col-lg-2 col-form-label fw-bold fs-5">-</label>
													</div>
													<div class="row">
														<div class="col-lg-3">
															<label class="col-form-label fw-semibold fs-6">Cheque &emsp;</label>
															<label class="col-form-label fw-bold fs-5 text-end">0.00</label>
														</div>
														<div class="col-lg-2">
															<label class="col-form-label fw-semibold fs-6">Ref.No &emsp;</label>
															<label class="col-form-label fw-bold fs-5">-</label>
														</div>
														<div class="col-lg-2">
															<label class="col-form-label fw-semibold fs-6">Cmy.bank &emsp;</label>
															<label class="col-form-label fw-bold fs-5">-</label>
														</div>
														<div class="col-lg-2">
															<label class="col-form-label fw-semibold fs-6">Party bank &emsp;</label>
															<label class="col-form-label fw-bold fs-5">-</label>
														</div>
														<div class="col-lg-3">
															<label class="col-form-label fw-semibold fs-6">Details &emsp;</label>
															<label class="col-form-label fw-bold fs-5">-</label>
														</div>
													</div>
													<div class="row">
														<div class="col-lg-3">
															<label class="col-form-label fw-semibold fs-6">RTGS &emsp;</label>
															<label class="col-form-label fw-bold fs-5 text-end">0.00</label>
														</div>
														<div class="col-lg-2">
															<label class="col-form-label fw-semibold fs-6">Ref.No &emsp;</label>
															<label class="col-form-label fw-bold fs-5">-</label>
														</div>
														<div class="col-lg-2">
															<label class="col-form-label fw-semibold fs-6">Cmy.bank &emsp;</label>
															<label class="col-form-label fw-bold fs-5">-</label>
														</div>
														<div class="col-lg-2">
															<label class="col-form-label fw-semibold fs-6">Party bank &emsp;</label>
															<label class="col-form-label fw-bold fs-5">-</label>
														</div>
														<div class="col-lg-3">
															<label class="col-form-label fw-semibold fs-6">Details &emsp;</label>
															<label class="col-form-label fw-bold fs-5">-</label>
														</div>
													</div>
													<div class="row">
														<div class="col-lg-3">
															<label class="col-form-label fw-semibold fs-6">UPI &emsp;</label>
															<label class="col-form-label fw-bold fs-5 text-end">0.00</label>
														</div>
														<div class="col-lg-2">
															<label class="col-form-label fw-semibold fs-6">Ref.No &emsp;</label>
															<label class="col-form-label fw-bold fs-5">-</label>
														</div>
														<div class="col-lg-2">
															<label class="col-form-label fw-semibold fs-6">Cmy.bank &emsp;</label>
															<label class="col-form-label fw-bold fs-5">-</label>
														</div>
														<div class="col-lg-2">
															<label class="col-form-label fw-semibold fs-6">Party bank &emsp;</label>
															<label class="col-form-label fw-bold fs-5">-</label>
														</div>
														<div class="col-lg-3">
															<label class="col-form-label fw-semibold fs-6">Details &emsp;</label>
															<label class="col-form-label fw-bold fs-5">-</label>
														</div>
													</div>
						            </div>
						        </div>
						    </div>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-4 text-center">
								<label class="col-form-label fw-semibold fs-6">Net Payable &emsp;</label>
								<label class="col-form-label fw-bold fs-2"><?php echo $redemption_details->NETPAYABLE; ?></label>
							</div>
							<div class="col-lg-4 text-center">
								<label class="col-form-label fw-semibold fs-6">Paid Amount &emsp;</label>
								<label class="col-form-label fw-bold fs-2"><?php echo $redemption_details->PAIDAMOUNT; ?></label>
							</div>
							<div class="col-lg-4 text-center">
								<label class="col-form-label fw-semibold fs-6">Balance Amount &emsp;</label>
								<label class="col-form-label fw-bold fs-2">0.00</label>
							</div>
						</div>
						<div class="row mt-4">
							<label class="col-lg-2 col-form-label fw-semibold fs-6">Customer Rating</label>
							<label class="col-lg-1 col-form-label fw-bold fs-5">
								<?php if($redemption_details->TYPE_OF_RECORD=='O'){echo "-"; }else{?>

								<?php
								$rating_det=$this->db->query("select * from  CUSTOMER_RATING_HISTORY where BILLNO='".$loan_details->BILLNO."' and LOG_DATE='".$redemption_details->RETURNDATE."'")->row(); 
								$r=(isset($rating_det))?$rating_det->RATING:0;
								if($r==1) echo "Bad";
								if($r==2) echo "Average";
								if($r==3) echo "Good";
								if($r==0) echo "-";
								}?></label>
							<label class="col-lg-2 col-form-label fw-semibold fs-6">Membership Points Add</label>
							<label class="col-lg-2 col-form-label fw-bold fs-5"><?php if($redemption_details->TYPE_OF_RECORD=='O'){echo "-"; }else{?>

									<?php
									$history_det=$this->db->query("select * from  MEMBERSHIP_HISTORY where BILLNO='".$loan_details->BILLNO."' and LOG_DATE='".$redemption_details->RETURNDATE."'")->row(); 
									$r=(isset($history_det))?$history_det->POINTS_EARNED:0;
									echo $r;
									}?></label>
						</div>
					</div>
					<!-- <hr class="mt-2"> -->
					<!-- Customer Transfer End -->
					<?php } ?>
					<?php if($loan_details->CLOSING_STATUS=='CUSTOMER_SALE'){ ?>
					<!-- Customer Sale Start -->
					<div id="cus_sale_tbox_view">
						<div class="row mt-4">
							<div class="accordion" id="kt_accordion_item_cus_sale">
						    <div class="accordion-item">
						        <h2 class="accordion-header" id="kt_accordion_item_cus_sale_header_1">
						            <button class="accordion-button fw-bold fs-6 collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#kt_accordion_item_cus_sale_body_1" aria-expanded="false" aria-controls="kt_accordion_item_cus_sale_body_1">
						            Customer Sale</button>
						        </h2>
						        <div id="kt_accordion_item_cus_sale_body_1" class="accordion-collapse collapse" aria-labelledby="kt_accordion_item_cus_sale_header_1" data-bs-parent="#kt_accordion_item_cus_sale">
						            <div class="accordion-body">
						            	<div class="row">
						            		<label class="col-lg-3 col-form-label fw-bold fs-3">Customer Sale</label>
												<div class="col-lg-9">
													<label class="col-form-label fw-bold fs-3">Total Balance &emsp;</label>
													<label class="col-form-label fw-bold fs-3"><?php echo $tot_pr_in; ?></label>
													<span class="fw-bold fs-3">&emsp;(&nbsp;</span>
													<label class="col-form-label fw-bold fs-3">Principal &emsp;</label>
													<label class="col-form-label fw-bold fs-3"><?php echo $loan_details->AMOUNT; ?></label>&emsp;
													<label class="col-form-label fw-bold fs-3">Interest &emsp;</label>
													<label class="col-form-label fw-bold fs-3"><?php echo $vTotalInterest; ?></label>
													<span class="fw-bold fs-3">&nbsp;)</span>
												</div>
												<div class="col-lg-4">
													<div class="row">
														<label class="col-lg-6 col-form-label fw-semibold fs-6">Paper Action Charge</label>
														<label class="col-lg-6 col-form-label fw-bold fs-5"><?php echo $redemption_details->MAINTAINCHARGE;?></label>
														<label class="col-lg-6 col-form-label fw-semibold fs-6">Notice Charge</label>
														<label class="col-lg-6 col-form-label fw-bold fs-5"><?php echo $redemption_details->NOTICECHARGE;?></label>
														<label class="col-lg-6 col-form-label fw-semibold fs-6">Form Missing</label>
														<label class="col-lg-6 col-form-label fw-bold fs-5"><?php echo $redemption_details->FORMCHARGE;?> &emsp;
															<?php if($redemption_details->FORM_DOC_PATH !=''){?>
															<i class="fa fa-print" onclick="load_image('<?php echo $redemption_details->BILLNO; ?>')" title="Form Misssing Document"></i>
															<?php }?>
														</label>
													</div>
												</div>
												<div class="col-lg-4">
													<div class="row">
														<label class="col-lg-6 col-form-label fw-semibold fs-6">On Account</label>
														<label class="col-lg-6 col-form-label fw-bold fs-5" style="background-color:#ff5b5b;color: white;border-radius: 8px;"><?php echo $redemption_details->HL_AMOUNT;?></label>
														<label class="col-lg-6 col-form-label fw-semibold fs-6">Discount</label>
														<label class="col-lg-6 col-form-label fw-bold fs-5"><?php echo $redemption_details->DISCOUNT;?></label>
														<div class="col-lg-12 text-center">
															<label class="col-form-label fw-bold fs-2">Net Pay &emsp;</label>
															<label class="col-form-label fw-bold fs-2"><?php 
															$other_amt=$redemption_details->MAINTAINCHARGE+$redemption_details->FORMCHARGE+$redemption_details->NOTICECHARGE+$redemption_details->HL_AMOUNT;
															$np=$tot_pr_in+$other_amt-$redemption_details->DISCOUNT;
															echo $np;

														?></label>
														</div>
													</div>
												</div>
												<div class="col-lg-4">
													<div class="row">
														<label class="col-lg-6 col-form-label fw-semibold fs-6">Closed By</label>
														<label class="col-lg-6 col-form-label fw-bold fs-5"><?php echo $redemption_details->CLOSED_BY; ?></label>
														<label class="col-lg-6 col-form-label fw-semibold fs-6">Name</label>
														<label class="col-lg-6 col-form-label fw-bold fs-5"><?php echo $redemption_details->CLOSED_NAME; ?></label>
													</div>
												</div>
						            	</div>
						            	<div class="row">
														<label class="col-lg-2 col-form-label fw-semibold fs-6">Purchase Amount</label>
														<label class="col-lg-2 col-form-label fw-bold fs-4"><?php echo $redemption_details->PURCHASE_AMOUNT; ?></label>
														<label class="col-lg-1 col-form-label fw-semibold fs-6">Balance</label>
														<label class="col-lg-2 col-form-label fw-bold fs-4"><?php echo $redemption_details->PUR_BALANCE; ?></label>
													</div>
						          	</div>
						        </div>
						    </div>
						  </div>
						</div>
						<div class="row mt-4">
							<div class="accordion" id="kt_accordion_item_redemption_cus_sale_cmy_payment">
							    <div class="accordion-item">
							        <h2 class="accordion-header" id="kt_accordion_item_redemption_cus_sale_cmy_payment_header_1">
							            <button class="accordion-button fw-bold fs-6 collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#kt_accordion_item_redemption_cus_sale_cmy_payment_body_1" aria-expanded="false" aria-controls="kt_accordion_item_redemption_cus_sale_cmy_payment_body_1">
							            Payment From Company</button>
							        </h2>
							        <div id="kt_accordion_item_redemption_cus_sale_cmy_payment_body_1" class="accordion-collapse collapse" aria-labelledby="kt_accordion_item_redemption_cus_sale_cmy_payment_header_1" data-bs-parent="#kt_accordion_item_redemption_cus_sale_cmy_payment">
							            <div class="accordion-body">
							            	<?php 
							            		$pay_res=$this->db->query("select * from payment_inward_outward where bill_no='".$redemption_details->BILLNO."' and module_name='New Redemption - Customer Sale'")->result_array();
							            		if(!isset($pay_res))
							            		{?>
							            			<div class="row">
							            		
							            			

												<label class="col-lg-1 col-form-label fw-semibold fs-6">Cash</label>
												<label class="col-lg-2 col-form-label fw-bold fs-5">
													<?php 
													if($redemption_details->TYPE_OF_RECORD=='O')
													{
														$amt=$redemption_details->NETPAYABLE;
														echo $amt;
													}
													
												?></label>
												<label class="col-lg-1 col-form-label fw-semibold fs-6">Details</label>
												<label class="col-lg-2 col-form-label fw-bold fs-5">
													<?php
													
															echo "-";
													
													?>
												</label>
											</div>
											<?php 
							            		}
							            		else
							            		{

							            		foreach ($pay_res as $plist) 
							            		{
							            			if($plist['type_of_payment']=='Cash')
							            			{
							            	?>
							            	<div class="row">
							            		
							            			

												<label class="col-lg-1 col-form-label fw-semibold fs-6">Cash</label>
												<label class="col-lg-2 col-form-label fw-bold fs-5">
													<?php 
													if($redemption_details->TYPE_OF_RECORD=='O')
													{
														$amt=$redemption_details->NEWLOANAMOUNT-$redemption_details->NETPAYABLE;
														echo $amt;
													}
													else
													{
														echo $plist['amount'];
													}

												?></label>
												<label class="col-lg-1 col-form-label fw-semibold fs-6">Details</label>
												<label class="col-lg-2 col-form-label fw-bold fs-5">
													<?php
														if($redemption_details->TYPE_OF_RECORD=='O') {
															echo "-";
														}
														else{
															echo $plist['remarks'];

														}
													?>
												</label>
											</div>
											<?php } 
												if($plist['type_of_payment']=='Cheque' && $redemption_details->TYPE_OF_RECORD=='N')
							            		{?>


											<div class="row">
												<div class="col-lg-3">
													<label class="col-form-label fw-semibold fs-6">Cheque &emsp;</label>
													<label class="col-form-label fw-bold fs-5 text-end"><?php echo $plist['amount']; ?></label>
												</div>
												<div class="col-lg-2">
													<label class="col-form-label fw-semibold fs-6">Ref.No &emsp;</label>
													<label class="col-form-label fw-bold fs-5"><?php echo $plist['cheque_ref_no']; ?></label>
												</div>
												<div class="col-lg-2">
													<label class="col-form-label fw-semibold fs-6">Cmy.bank &emsp;</label>
													<label class="col-form-label fw-bold fs-5">
														<?php 
														$cmy_bank=$this->db->query("select * from  BANKS where SNO='".$plist['company_bank']."'")->row();
														echo $cmy_bank->BANKNAME." - ".$cmy_bank->BRANCH;
														?>
													</label>
												</div>
												<div class="col-lg-2">
													<label class="col-form-label fw-semibold fs-6">Party bank &emsp;</label>
													<label class="col-form-label fw-bold fs-5">-</label>
												</div>
												<div class="col-lg-3">
													<label class="col-form-label fw-semibold fs-6">Details &emsp;</label>
													<label class="col-form-label fw-bold fs-5"><?php echo $plist['remarks']; ?></label>
												</div>
											</div>
											<?php } 
											if($plist['type_of_payment']=='RTGS' && $redemption_details->TYPE_OF_RECORD=='N')
							            			{
											?>

											<div class="row">
												<div class="col-lg-3">
													<label class="col-form-label fw-semibold fs-6">RTGS &emsp;</label>
													<label class="col-form-label fw-bold fs-5 text-end"><?php echo $plist['amount']; ?></label>
												</div>
												<div class="col-lg-2">
													<label class="col-form-label fw-semibold fs-6">Ref.No &emsp;</label>
													<label class="col-form-label fw-bold fs-5"><?php echo $plist['cheque_ref_no']; ?></label>
												</div>
												<div class="col-lg-2">
													<label class="col-form-label fw-semibold fs-6">Cmy.bank &emsp;</label>
													<label class="col-form-label fw-bold fs-5">
														<?php 
														$cmy_bank=$this->db->query("select * from  BANKS where SNO='".$plist['company_bank']."'")->row();
														echo $cmy_bank->BANKNAME." - ".$cmy_bank->BRANCH;
														?></label>
												</div>
												<div class="col-lg-2">
													<label class="col-form-label fw-semibold fs-6">Party bank &emsp;</label>
													<label class="col-form-label fw-bold fs-5">-</label>
												</div>
												<div class="col-lg-3">
													<label class="col-form-label fw-semibold fs-6">Details &emsp;</label>
													<label class="col-form-label fw-bold fs-5"><?php echo $plist['remarks']; ?></label>
												</div>
											</div>
											<?php }
											if($plist['type_of_payment']=='UPI' && $redemption_details->TYPE_OF_RECORD=='N')
							            			{
											?>
											<div class="row">
												<div class="col-lg-3">
													<label class="col-form-label fw-semibold fs-6">UPI &emsp;</label>
													<label class="col-form-label fw-bold fs-5 text-end"><?php echo $plist['amount']; ?></label>
												</div>
												<div class="col-lg-2">
													<label class="col-form-label fw-semibold fs-6">Ref.No &emsp;</label>
													<label class="col-form-label fw-bold fs-5"><?php echo $plist['cheque_ref_no']; ?></label>
												</div>
												<div class="col-lg-2">
													<label class="col-form-label fw-semibold fs-6">Cmy.bank &emsp;</label>
													<label class="col-form-label fw-bold fs-5">
														<?php 
														$cmy_bank=$this->db->query("select * from  BANKS where SNO='".$plist['company_bank']."'")->row();
														echo $cmy_bank->BANKNAME." - ".$cmy_bank->BRANCH;
														?>
													</label>
												</div>
												<div class="col-lg-2">
													<label class="col-form-label fw-semibold fs-6">Party bank &emsp;</label>
													<label class="col-form-label fw-bold fs-5">-</label>
												</div>
												<div class="col-lg-3">
													<label class="col-form-label fw-semibold fs-6">Details &emsp;</label>
													<label class="col-form-label fw-bold fs-5"><?php echo $plist['remarks']; ?></label>
												</div>
											</div>
										<?php }	?>
										<?php } 
											}?>
							            </div>
							        </div>
							    </div>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-4 text-center">
								<label class="col-form-label fw-semibold fs-6">Net Payable &emsp;</label>
								<label class="col-form-label fw-bold fs-2"><?php echo $redemption_details->PUR_BALANCE; ?></label>
							</div>
							<div class="col-lg-4 text-center">
								<label class="col-form-label fw-semibold fs-6">Paid Amount &emsp;</label>
								<label class="col-form-label fw-bold fs-2"><?php echo $redemption_details->PUR_BALANCE; ?></label>
							</div>
							<div class="col-lg-4 text-center">
								<label class="col-form-label fw-semibold fs-6">Balance Amount &emsp;</label>
								<label class="col-form-label fw-bold fs-2">0.00</label>
							</div>
						</div>
						<div class="row mt-4">
							<label class="col-lg-2 col-form-label fw-semibold fs-6">Customer Rating</label>
							<label class="col-lg-1 col-form-label fw-bold fs-5"><?php if($redemption_details->TYPE_OF_RECORD=='O'){echo "-"; }else{?>

								<?php
								$rating_det=$this->db->query("select * from  CUSTOMER_RATING_HISTORY where BILLNO='".$loan_details->BILLNO."' and LOG_DATE='".$redemption_details->RETURNDATE."'")->row(); 
								$r=(isset($rating_det))?$rating_det->RATING:0;
								if($r==1) echo "Bad";
								if($r==2) echo "Average";
								if($r==3) echo "Good";
								if($r==0) echo "-";
								}?></label>
							<label class="col-lg-2 col-form-label fw-semibold fs-6">Membership Points Add</label>
							<label class="col-lg-2 col-form-label fw-bold fs-5">
								<?php if($redemption_details->TYPE_OF_RECORD=='O'){echo "-"; }else{?>

								<?php
								$history_det=$this->db->query("select * from  MEMBERSHIP_HISTORY where BILLNO='".$loan_details->BILLNO."' and LOG_DATE='".$redemption_details->RETURNDATE."'")->row(); 
								$r=(isset($history_det))?$history_det->POINTS_EARNED:0;
								echo $r;
								}?>
							</label>
						</div>
					</div>
					<!-- <hr class="mt-2"> -->
					<!-- Customer Sale end -->
					<?php } ?>
					<?php if($loan_details->CLOSING_STATUS=='MULTI_JEWEL'){ ?>
					<!-- Multi Jewel Start -->
					<div id="multi_jwl_tbox_view">
						<div class="row mt-4">
							<div class="accordion" id="kt_accordion_mul_jwl">
						    <div class="accordion-item">
						        <h2 class="accordion-header" id="kt_accordion_mul_jwl_header_1">
						            <button class="accordion-button fw-bold fs-6 collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#kt_accordion_mul_jwl_body_1" aria-expanded="false" aria-controls="kt_accordion_mul_jwl_body_1">
						            Multi Jewel Details</button>
						        </h2>
						        <div id="kt_accordion_mul_jwl_body_1" class="accordion-collapse collapse" aria-labelledby="kt_accordion_mul_jwl_header_1" data-bs-parent="#kt_accordion_mul_jwl">
						            <div class="accordion-body">
						            	<div class="row">
														<label class="col-lg-2 col-form-label fw-bold fs-3">Multi Jewel</label>
														<div class="col-lg-10">
															<label class="col-form-label fw-bold fs-3">Total Amount &emsp;</label>
															<label class="col-form-label fw-bold fs-3"><?php echo $tot_pr_in; ?></label>
															<span class="fw-bold fs-3">&emsp;(&nbsp;</span>
															<label class="col-form-label fw-bold fs-3">Principal &emsp;</label>
															<label class="col-form-label fw-bold fs-3"><?php echo $loan_details->AMOUNT; ?></label>&emsp;
															<label class="col-form-label fw-bold fs-3">Interest &emsp;</label>
															<label class="col-form-label fw-bold fs-3"><?php echo $vTotalInterest; ?></label>
															<span class="fw-bold fs-3">&nbsp;)</span>
														</div>
														<div class="col-lg-4">
															<div class="row">
																<label class="col-lg-6 col-form-label fw-semibold fs-6">Paper Action Charge</label>
																<label class="col-lg-6 col-form-label fw-bold fs-5"><?php echo $redemption_details->MAINTAINCHARGE;?></label>
																<label class="col-lg-6 col-form-label fw-semibold fs-6">Notice Charge</label>
																<label class="col-lg-6 col-form-label fw-bold fs-5"><?php echo $redemption_details->NOTICECHARGE;?></label>
																<label class="col-lg-6 col-form-label fw-semibold fs-6">Form Missing</label>
																<label class="col-lg-6 col-form-label fw-bold fs-5"><?php echo $redemption_details->FORMCHARGE;?></label>
															</div>
														</div>
														<div class="col-lg-4">
															<div class="row">
																<label class="col-lg-6 col-form-label fw-semibold fs-6">On Account</label>
																<label class="col-lg-6 col-form-label fw-bold fs-5" style="background-color:#ff5b5b;color: white;border-radius: 8px;"><?php echo $redemption_details->HL_AMOUNT;?></label>
																<label class="col-lg-6 col-form-label fw-semibold fs-6">Discount</label>
																<label class="col-lg-6 col-form-label fw-bold fs-5"><?php echo $redemption_details->DISCOUNT;?></label>
																<div class="col-lg-12 text-center">
																	<label class="col-form-label fw-bold fs-2">Net Pay &emsp;</label>
																	<label class="col-form-label fw-bold fs-2">
																<?php 
																	$other_amt=$redemption_details->MAINTAINCHARGE+$redemption_details->FORMCHARGE+$redemption_details->NOTICECHARGE+$redemption_details->HL_AMOUNT;
																	$np=$tot_pr_in+$other_amt-$redemption_details->DISCOUNT;
																	echo $np;

																?></label>
																</div>
															</div>
														</div>
														<div class="col-lg-4">
															<div class="row">
																<label class="col-lg-6 col-form-label fw-semibold fs-6">Closed By</label>
																<label class="col-lg-6 col-form-label fw-bold fs-5"><?php echo $redemption_details->CLOSED_BY; ?></label>
																<label class="col-lg-6 col-form-label fw-semibold fs-6">Name</label>
																<label class="col-lg-6 col-form-label fw-bold fs-5"><?php echo $redemption_details->CLOSED_NAME; ?></label>
															</div>
														</div>
													</div>
						            </div>
						        </div>
						    </div>
							</div>
						</div>
						<div class="row mt-4">
							<div class="accordion" id="kt_accordion_item_redemption_view_loan_mul_jwl">
						    <div class="accordion-item">
						        <h2 class="accordion-header" id="kt_accordion_item_redemption_view_loan_mul_jwl_header_1">
						            <button class="accordion-button fw-bold fs-6 collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#kt_accordion_item_redemption_view_loan_mul_jwl_body_1" aria-expanded="false" aria-controls="kt_accordion_item_redemption_view_loan_mul_jwl_body_1">
						            New Loan Entry</button>
						        </h2>
						        <div id="kt_accordion_item_redemption_view_loan_mul_jwl_body_1" class="accordion-collapse collapse" aria-labelledby="kt_accordion_item_redemption_view_loan_mul_jwl_header_1" data-bs-parent="#kt_accordion_item_redemption_view_loan_mul_jwl">
						            <div class="accordion-body">
						            	<div class="row">
						            		<div class="col-lg-1">
						            			<label class="col-form-label fw-semibold fs-6">JewelType</label>
						            		</div>
						            		<label class="col-lg-2 col-form-label fw-bold fs-5">Gold</label>
														<label class="col-lg-1 col-form-label fw-semibold fs-6">Scheme</label>
														<label class="col-lg-2 col-form-label fw-bold fs-5">MIP</label>
														<label class="col-lg-1 col-form-label fw-semibold fs-6">Int Type</label>
														<label class="col-lg-2 col-form-label fw-bold fs-5">2.75</label>
														<div class="col-lg-3">
															<label class="col-form-label fw-semibold fs-6">Expiry Date &emsp;</label>
															<label class="col-form-label fw-bold fs-5">25-06-2023</label>
														</div>
														<label class="col-lg-12 col-form-label fw-bold fs-3 text-center">Pledge Details</label>
													</div>
													<table class="table align-middle table-hover fs-7 gy-1 gs-2" id="multi_jwl_add_loan">
														<thead>
															<tr class="text-start text-muted fw-bold fs-7 gs-0">
										            <th class="min-w-100px">Pledge</th>
										            <th class="min-w-100px">Description</th>
										            <th class="min-w-50px">Quality</th>
										            <th class="min-w-50px">Purity(%)</th>
										            <th class="min-w-80px">Weight(gms)</th>
										            <th class="min-w-80px">Stone Wgt(gms)</th>
										            <th class="min-w-80px">Less(gms)</th>
										            <th class="min-w-80px">Nt Wgt(gms)</th>
										            <th class="min-w-50px">Damage</th>
										            <th class="min-w-50px">Img</th>
										            <th class="min-w-100px">Loan Amt</th>
															</tr>
														</thead>
														<tbody id="tbody">
															<tr style="background-color:red !important;">
										            <td style="pointer-events: none;" class="ple1">Ladies Ring</td>
										            <td style="pointer-events: none;" class="ple1">Ring</td>
										            <td style="pointer-events: none;">KDM</td>
										            <td style="pointer-events: none;">91</td>
										            <td style="pointer-events: none;">2.400</td>
										            <td style="pointer-events: none;">0.100</td>
										            <td style="pointer-events: none;">0.100</td>
										            <td style="pointer-events: none;">2.200</td>
										            <td style="pointer-events: none;">yes</td>
										            <td style="pointer-events: none;">
										            	<div class="image-input mt-2 me-6" data-kt-image-input="true">
																		<div class="image-input-wrapper w-40px h-40px"style="background-image: url(assets/images/sample_jewel.jpg)"></div>
																	</div>
										            </td>
										            <td style="pointer-events: none;">8234.19</td>
													    </tr>
												   		<tr>
										            <td class="ple1">Ladies Ring</td>
										            <td class="ple1">Ring</td>
										            <td>KDM</td>
										            <td>91</td>
										            <td>1.200</td>
										            <td>0.100</td>
										            <td>0.100</td>
										            <td>1.000</td>
										            <td>-</td>
										            <td></td>
										            <td>3742.81</td>
												      </tr>
												      <tr>
										            <td class="ple1">Ladies valayal</td>
										            <td class="ple1">valayal</td>
										            <td>KDM</td>
										            <td>91</td>
										            <td>2.400</td>
										            <td>0.100</td>
										            <td>0.100</td>
										            <td>2.200</td>
										            <td>yes</td>
										            <td>
										            	<div class="image-input mt-2 me-6" data-kt-image-input="true">
																		<div class="image-input-wrapper w-40px h-40px"style="background-image: url(assets/gallery/5.jpg)"></div>
																	</div>
										            </td>
										            <td>-</td>
										          </tr>
												    </tbody>
													</table><br>
													<div class="row">
														<label class="col-lg-1 col-form-label fw-semibold fs-6">Weight</label>
														<label class="col-lg-1 col-form-label fw-bold fs-6">6.000</label>
														<label class="col-lg-1 col-form-label fw-semibold fs-6">Stoneless</label>
														<label class="col-lg-1 col-form-label fw-bold fs-6">0.300</label>
														<label class="col-lg-1 col-form-label fw-semibold fs-6">Less</label>
														<label class="col-lg-1 col-form-label fw-bold fs-6">0.300</label>
														<label class="col-lg-1 col-form-label fw-semibold fs-6">Net.Wght</label>
														<label class="col-lg-1 col-form-label fw-bold fs-6">5.400</label>
														<!-- <label class="col-lg-1 col-form-label fw-semibold fs-6">CurrRate</label> --><label class="col-lg-1 col-form-label fw-semibold fs-6">CurrRate</label>
														<label class="col-lg-1 col-form-label fw-bold fs-6">4571.00</label>
														<label class="col-lg-1 col-form-label fw-semibold fs-6">Purity%</label>
														<label class="col-lg-1 col-form-label fw-bold fs-6">91</label>
													</div>
													<div class="row">
														<label class="col-lg-1 col-form-label fw-semibold fs-6">Gram.Val</label>
														<label class="col-lg-1 col-form-label fw-bold fs-6">5784.00</label>
														<label class="col-lg-1 col-form-label fw-semibold fs-6">SalesRate</label>
														<label class="col-lg-1 col-form-label fw-bold fs-6">22462.00</label>
													</div>
													<div class="row mt-4">
														<div class="col-lg-4">
															<div class="px-4" style="border-radius: 10px;padding-bottom: 10px;box-shadow: 0 5px 10px #00002947;">
																<label class="col-lg-12 col-form-label fw-bold fs-5 text-center">Loan Payment Information</label>
																<div class="row">
																	<label class="col-lg-6 col-form-label fw-semibold fs-6">Loan Amount</label>
																	<label class="col-lg-6 col-form-label fw-bold fs-6"style="font-size: 18px !important;font-weight: 700 !important;color: #1B439E !important;">20000.00</label>
																	<label class="col-lg-6 col-form-label fw-semibold fs-6">Monthly Interest</label>
																	<label class="col-lg-6 col-form-label fw-bold fs-5">
																		<span style="background-color:#C6C6C6;border-radius: 8px;padding: 5px 15px 5px 15px;">250.00</span>
																	</label>
																	<label class="col-lg-6 col-form-label required fw-semibold fs-6">Redemption period</label>
																	<label class="col-lg-3 col-form-label fw-bold fs-6">30</label>
																	<label class="col-lg-3 col-form-label fw-semibold fs-6" id="loan_per_mon_days">Days</label>
																</div>
																<div class="row">
																	<div class="d-flex justify-content-center align-items-center">
																		<label class="col-form-label fw-bold fs-3">Total Loan Amount &emsp; <span>20000.00</span></label>
																	</div>
																</div>
															</div>
														</div>
														<div class="col-lg-4">
															<div class="px-4" style="border-radius: 10px;padding-bottom: 8px;box-shadow: 0 5px 10px #00002947;">
																<label class="col-lg-12 col-form-label fw-bold fs-5 text-center">Payment To Receive</label>
																<div class="row">
																	<div class="col-lg-12 text-center">
																		<label class="col-form-label fw-bold fs-3">Current Loan Net Pay &emsp;</label>
																		<label class="col-form-label fw-bold fs-3"><?php 
																	$other_amt=$redemption_details->MAINTAINCHARGE+$redemption_details->FORMCHARGE+$redemption_details->NOTICECHARGE+$redemption_details->HL_AMOUNT;
																	$np=$tot_pr_in+$other_amt-$redemption_details->DISCOUNT;
																	echo $np;

																?></label>
																	</div>
																	<label class="col-lg-6 col-form-label fw-semibold fs-6">Processing Charge</label>
																	<label class="col-lg-6 col-form-label fw-bold fs-6">50.00</label>
																	<label class="col-lg-6 col-form-label fw-semibold fs-6">Document Charge</label>
																	<label class="col-lg-6 col-form-label fw-bold fs-5">50.00</label>
																</div>
																<div class="row mt-1">
																	<label class="col-lg-12 col-form-label fw-bold fs-3 text-center">Total &emsp; <span>12077.01</span></label>
																</div>
															</div>
														</div>
														<div class="col-lg-4">
															<div class="px-4" style="padding-bottom: 5px;border-radius: 10px;box-shadow: 0 5px 10px #00002947;">
																<label class="col-lg-12 col-form-label fw-bold fs-5 text-center">To Pay</label>
																<div class="row">
																	<label class="col-lg-4 col-form-label fw-bold fs-3">Net Pay</label>
																	<label class="col-lg-8 col-form-label fw-bold fs-3">7922.99</label>
																</div>
																<div class="row">
																	<label class="col-lg-4 col-form-label fw-semibold fs-6">Remarks</label>
																</div>
																<div class="row mb-17">
																	<label class="col-lg-12 col-form-label fw-bold fs-6">-</label>
																</div>
															</div>
														</div>
													</div>
													<div class="row mt-4">
						            		<label class="col-form-label fw-bold fs-4">Payment From Company</label>
														<label class="col-lg-1 col-form-label fw-semibold fs-6">Cash</label>
														<label class="col-lg-2 col-form-label fw-bold fs-5">4900.00</label>
														<label class="col-lg-1 col-form-label fw-semibold fs-6">Details</label>
														<label class="col-lg-2 col-form-label fw-bold fs-5">-</label>
													</div>
													<div class="row">
														<div class="col-lg-3">
															<label class="col-form-label fw-semibold fs-6">Cheque &emsp;</label>
															<label class="col-form-label fw-bold fs-5 text-end">0.00</label>
														</div>
														<div class="col-lg-2">
															<label class="col-form-label fw-semibold fs-6">Ref.No &emsp;</label>
															<label class="col-form-label fw-bold fs-5">-</label>
														</div>
														<div class="col-lg-2">
															<label class="col-form-label fw-semibold fs-6">Cmy.bank &emsp;</label>
															<label class="col-form-label fw-bold fs-5">-</label>
														</div>
														<div class="col-lg-2">
															<label class="col-form-label fw-semibold fs-6">Party bank &emsp;</label>
															<label class="col-form-label fw-bold fs-5">-</label>
														</div>
														<div class="col-lg-3">
															<label class="col-form-label fw-semibold fs-6">Details &emsp;</label>
															<label class="col-form-label fw-bold fs-5">-</label>
														</div>
													</div>
													<div class="row">
														<div class="col-lg-3">
															<label class="col-form-label fw-semibold fs-6">RTGS &emsp;</label>
															<label class="col-form-label fw-bold fs-5 text-end">0.00</label>
														</div>
														<div class="col-lg-2">
															<label class="col-form-label fw-semibold fs-6">Ref.No &emsp;</label>
															<label class="col-form-label fw-bold fs-5">-</label>
														</div>
														<div class="col-lg-2">
															<label class="col-form-label fw-semibold fs-6">Cmy.bank &emsp;</label>
															<label class="col-form-label fw-bold fs-5">-</label>
														</div>
														<div class="col-lg-2">
															<label class="col-form-label fw-semibold fs-6">Party bank &emsp;</label>
															<label class="col-form-label fw-bold fs-5">-</label>
														</div>
														<div class="col-lg-3">
															<label class="col-form-label fw-semibold fs-6">Details &emsp;</label>
															<label class="col-form-label fw-bold fs-5">-</label>
														</div>
													</div>
													<div class="row">
														<div class="col-lg-3">
															<label class="col-form-label fw-semibold fs-6">UPI &emsp;</label>
															<label class="col-form-label fw-bold fs-5 text-end">0.00</label>
														</div>
														<div class="col-lg-2">
															<label class="col-form-label fw-semibold fs-6">Ref.No &emsp;</label>
															<label class="col-form-label fw-bold fs-5">-</label>
														</div>
														<div class="col-lg-2">
															<label class="col-form-label fw-semibold fs-6">Cmy.bank &emsp;</label>
															<label class="col-form-label fw-bold fs-5">-</label>
														</div>
														<div class="col-lg-2">
															<label class="col-form-label fw-semibold fs-6">Party bank &emsp;</label>
															<label class="col-form-label fw-bold fs-5">-</label>
														</div>
														<div class="col-lg-3">
															<label class="col-form-label fw-semibold fs-6">Details &emsp;</label>
															<label class="col-form-label fw-bold fs-5">-</label>
														</div>
													</div>
						            </div>
						        </div>
						    </div>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-4 text-center">
								<label class="col-form-label fw-semibold fs-6">Net Payable &emsp;</label>
								<label class="col-form-label fw-bold fs-2"><?php echo $redemption_details->NETPAYABLE; ?></label>
							</div>
							<div class="col-lg-4 text-center">
								<label class="col-form-label fw-semibold fs-6">Paid Amount &emsp;</label>
								<label class="col-form-label fw-bold fs-2"><?php echo $redemption_details->PAIDAMOUNT; ?></label>
							</div>
							<div class="col-lg-4 text-center">
								<label class="col-form-label fw-semibold fs-6">Balance Amount &emsp;</label>
								<label class="col-form-label fw-bold fs-2">0.00</label>
							</div>
						</div>
						<div class="row mt-4">
							<label class="col-lg-2 col-form-label fw-semibold fs-6">Customer Rating</label>
							<label class="col-lg-1 col-form-label fw-bold fs-5"><?php if($redemption_details->TYPE_OF_RECORD=='O'){echo "-"; }else{?>

								<?php
								$rating_det=$this->db->query("select * from  CUSTOMER_RATING_HISTORY where BILLNO='".$loan_details->BILLNO."' and LOG_DATE='".$redemption_details->RETURNDATE."'")->row(); 
								$r=(isset($rating_det))?$rating_det->RATING:0;
								if($r==1) echo "Bad";
								if($r==2) echo "Average";
								if($r==3) echo "Good";
								if($r==0) echo "-";
								}?></label>
							<label class="col-lg-2 col-form-label fw-semibold fs-6">Membership Points Add</label>
							<label class="col-lg-2 col-form-label fw-bold fs-5">
								<?php if($redemption_details->TYPE_OF_RECORD=='O'){echo "-"; }else{?>

								<?php
								$history_det=$this->db->query("select * from  MEMBERSHIP_HISTORY where BILLNO='".$loan_details->BILLNO."' and LOG_DATE='".$redemption_details->RETURNDATE."'")->row(); 
								$r=(isset($history_det))?$history_det->POINTS_EARNED:0;
								echo $r;
								}?>
							</label>
						</div>
					</div>
					<!-- <hr> -->
					<!-- Multi Jewel End -->
					<?php } ?>
					</div>
					<!-- <div class="d-flex justify-content-center mt-4">
						<a href="redemption_view.php" target="_blank">
						<button class="btn btn-primary me-2">Click Here to View Redemption History</button></a>					
					</div> -->
				</div>
			</div>
			<!--end::Modal dialog-->
		</div>
<script type="text/javascript">
			function load_image(bno) 
			{
					var baseurl= $("#baseurl").val();
					$.ajax({
						type: "POST",
						url: baseurl+'redemption/redemption_form_miss_img',
						async: false,
						type: "POST",
						data: "bno="+bno,
						dataType: "html",
						success: function(response)
						{
							$('#form_miss_doc_img_display').empty().append(response);
							// $('#kt_modal_view_form_img').empty().append(response);
							$('#kt_modal_view_form_img').addClass('show');
							$('.modal-backdrop').addClass('show');
							$('#kt_modal_view_form_img').show();
				   		$('.modal-backdrop').show();
						//$("#kt_modal_editdept").css("display", "block");
						}
				});
					// form_miss_doc_img_display	
			}
			function CloseModalLoadImage()
			{
						$('#kt_modal_view_form_img').removeClass('show');
							// $('.modal-backdrop').removeClass('show');
							$('#kt_modal_view_form_img').hide();
				   		// $('.modal-backdrop').hide();
			}
		</script>