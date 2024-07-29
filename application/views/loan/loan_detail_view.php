<?php $this->load->view("common");?>
<link href="<?php echo base_url();?>assets/jquery.autocomplete.css" rel="stylesheet" type="text/css" />
<script src="<?php echo base_url();?>assets/js/webcam/webcam.min.js"></script>
<style>
	.dataTables_scroll
    {
        position: relative;
        overflow: auto;
        min-height: 270px;
        max-height: 270px;/*the maximum height you want to achieve*/
        width: 100%;
    }
  .dataTables_scroll thead{
    position: -webkit-sticky;
    position: sticky;
    top: 0;
   background-color: #ec9629;
    z-index: 2;
  }
</style>
	<!--begin::Body-->
	<body data-kt-name="metronic" id="kt_body" class="header-fixed header-tablet-and-mobile-fixed toolbar-enabled toolbar-fixed aside-enabled aside-fixed">
		<!--begin::Theme mode setup on page load-->
		<script>if ( document.documentElement ) { const defaultThemeMode = "system"; const name = document.body.getAttribute("data-kt-name"); let themeMode = localStorage.getItem("kt_" + ( name !== null ? name + "_" : "" ) + "theme_mode_value"); if ( themeMode === null ) { if ( defaultThemeMode === "system" ) { themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light"; } else { themeMode = defaultThemeMode; } } document.documentElement.setAttribute("data-theme", themeMode); }</script>
		<!--end::Theme mode setup on page load-->
		<!--begin::Main-->
		<!--begin::Root-->
		<div class="d-flex flex-column flex-root">
			<!--begin::Page-->
			<div class="page d-flex flex-row flex-column-fluid">
				<?php $this->load->view("sidebar");?>
				<!--begin::Wrapper-->
				<div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
				<?php $this->load->view("header");?>
				<!--begin::Toolbar-->
					<div class="toolbar py-2" id="kt_toolbar">
						<!--begin::Container-->
						<div id="kt_toolbar_container" class="container-fluid d-flex align-items-center">
							<!--begin::Page title-->
							<div class="flex-grow-1 flex-shrink-0 me-5">
								<!--begin::Page title-->
								<div data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
									<!--begin::Title-->
									<h1 class="d-flex align-items-center text-dark fw-bold my-1 fs-3">Loan View
									<span class="h-20px border-gray-400 border-start ms-3 mx-2"></span>
									<label class="d-flex align-items-center text-primary fw-bold my-1 fs-5">
										<span>Loan No &emsp;-</span>
										<span>&emsp;<?php echo $loan_details->BILLNO; ?></span>&emsp;&emsp;
										<label class="col-form-label fw-bold fs-5 bg-primary" style="border-radius: 8px;padding: 5px 10px 5px 10px;">Current Loan Value : <span name="new_loan_amount_board_rate" id="new_loan_amount_board_rate"> <?php echo number_format(($loan_details->NETWEIGHT*$_SESSION['CUR_GOLD_RATE']),2)?></span> </label>
										<input type="hidden" id="bill_no" name="bill_no" value="<?php echo $loan_details->BILLNO;?>">
										<input type="hidden" id="party_id" name="party_id" value="<?php echo $loan_details->PID;?>">
									</label>
									<!--begin::Description-->
									<!--end::Description--></h1>
									<!--end::Title-->
								</div>
								<!--end::Page title-->
							</div>
							<!--end::Page title-->
							
						</div>
						<!--end::Container-->
					</div>
					<!--end::Toolbar-->	
					<!--begin::Content-->
					<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
						<!--begin::Container-->
						<div id="kt_content_container" class="container-xxl">
							<!--begin::Row-->
							<div class="row gy-5 g-xl-8">
								<!--begin::Col-->
								<div class="col-xxl-8">
									<!--begin::Tables Widget 9-->
									<div class="card card-xxl-stretch mb-5 mb-xl-8">
										<!--begin::Card body-->
										<div class="card-body py-4">
											<div class="d-grid">
												<ul class="nav nav-tabs flex-nowrap text-nowrap">
													<li class="nav-item">
														<a class="nav-link active btn btn-active-light btn-color-black-800 btn-active-color-primary rounded-bottom-0 fw-bold fs-6" data-bs-toggle="tab" href="#kt_tab_pane_base_loan">Base</a>
													</li>
													<li class="nav-item">
														<a class="nav-link btn btn-active-light btn-color-black-800 btn-active-color-primary rounded-bottom-0 fw-bold fs-6" data-bs-toggle="tab" href="#kt_tab_pane_initial_loan">Initial</a>
													</li>
													<li class="nav-item">
														<a class="nav-link btn btn-active-light btn-color-black-800 btn-active-color-primary rounded-bottom-0 fw-bold fs-6" data-bs-toggle="tab" href="#kt_tab_pane_receipt_loan">Receipt</a>
													</li>
													<li class="nav-item">
														<a class="nav-link btn btn-active-light btn-color-black-800 btn-active-color-primary rounded-bottom-0 fw-bold fs-6" data-bs-toggle="tab" href="#kt_tab_pane_redemption_loan">Redemption</a>
													</li>
													<li class="nav-item">
														<a class="nav-link btn btn-active-light btn-color-black-800 btn-active-color-primary rounded-bottom-0 fw-bold fs-6" data-bs-toggle="tab" href="#kt_tab_pane_repledge_loan">Repledge</a>
													</li>
													<li class="nav-item">
														<a class="nav-link btn btn-active-light btn-color-black-800 btn-active-color-primary rounded-bottom-0 fw-bold fs-6" data-bs-toggle="tab" href="#kt_tab_pane_audit_history_loan">Audit History</a>
													</li>
													<li class="nav-item">
														<a class="nav-link btn btn-active-light btn-color-black-800 btn-active-color-primary rounded-bottom-0 fw-bold fs-6" data-bs-toggle="tab" href="#kt_tab_pane_lock_in_out">Lock In/Out</a>
													</li>
													<li class="nav-item">
														<a class="nav-link btn btn-active-light btn-color-black-800 btn-active-color-primary rounded-bottom-0 fw-bold fs-6" data-bs-toggle="tab" href="#kt_tab_pane_jewel_settlment">Jewel Settlement</a>
													</li>
												</ul>
											</div>
											<div class="tab-content" id="myTabContent">
												<div class="tab-pane fade show active" id="kt_tab_pane_base_loan" role="tabpanel">
													<div class="row mt-4">
														<div class="accordion" id="kt_accordion_item_party_details">
													    <div class="accordion-item">
													        <h2 class="accordion-header" id="kt_accordion_item_party_details_header_1">
													            <button class="accordion-button fw-bold fs-6 collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#kt_accordion_item_party_details_body_1" aria-expanded="true" aria-controls="kt_accordion_item_party_details_body_1">
													            Party Basic Details</button>
													        </h2>
													        <div id="kt_accordion_item_party_details_body_1" class="accordion-collapse collapse show" aria-labelledby="kt_accordion_item_party_details_header_1" data-bs-parent="#kt_accordion_item_party_details">
													            <div class="accordion-body">
													            	<div class="row">
													            		<div class="col-lg-6">
													            			<div class="row">
																				<label class="col-lg-12 col-form-label fw-bold fs-6" name="" id="" title="Party Name">
																				<i class="fa fa-user fs-6" aria-hidden="true" title="Party Name"></i>&emsp;<?php echo $loan_details->NAME; ?></label>
																				<label class="col-lg-12 col-form-label fw-bold fs-6" name="" id="" title="Address">
																				<i class="fa-solid fa-location-dot fs-6" aria-hidden="true" title="Address"></i>
																				<?php 
																				$party_address=$this->db->query("select * from PARTIES WHERE PID='".$loan_details->PID."'")->row();
																				
																				$village = $this->db->query("SELECT * FROM VILLAGE WHERE VILLAGEID = '".$party_address->ADDRESS2."'  ")->row();

           																		$street = $this->db->query("SELECT * FROM STREET WHERE STREETID = '".$party_address->STREET_ID."'  ")->row();
																				   $city = $this->db->query("SELECT * FROM 	CITY WHERE CITYID = '".$party_address->CITY."'  ")->row();
																				   echo $street->STREETNAME;
																				?>
																 				&nbsp; <span><i class="fas fa-info-circle fs-6" title="<?php echo $street->STREETNAME.", ".$village->VILLAGENAME.", ".$city->CITYNAME.".";?>"></i></span></label>
																				<label class="col-lg-6 col-form-label fw-bold fs-6" name="" id="" title="Mobile">
																					<i class="fas fa-mobile-android-alt fs-6" aria-hidden="true" title="Mobile"></i>
																					&emsp;<?php 
																					echo $party_address->PHONE;
																				?></label>
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
																				<label class="col-form-label fw-semibold fs-6">Nominee &nbsp;
																					<span class="fw-bold fs-6"><?php
																					if (is_null($loan_details->NOMINEE_ID))
																					{
																						$str= "--";
																					}
																					else
																					{
																					$nominee_details=$this->db->query("select * from NOMINEE where NOMINEE_ID=".$loan_details->NOMINEE_ID)->row();
																					if(is_null($nominee_details))
																					{
																						$str= "--";
																					}
																					else
																					{
																						$str= $nominee_details->NOMINEE_NAME." - ".$nominee_details->RELATION." - ".$nominee_details->MOBILE_NO;
																					}
																					}
																					echo $str;
																					?>
																					&nbsp; <span><i class="fas fa-info-circle fs-6" title="Kumar - Brother - 9795963214"></i></span></span></label>
																					</div>
													            		</div>
													            		<div class="col-lg-6">
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
																						<?php
																						if($party_address->OTHER_PHOTO!='')
																				         {
																				         $div='<img src="data:image/jpg;charset=utf8;base64,'.base64_encode($party_address->OTHER_PHOTO).'"  height="125px" width="125px">';
																				         }
																				         else
																				         {
																				          $div='<img src="'.base_url().'assets/images/Party_Proof.jpg" height="125px" width="125px" >';
																				         }
																				         echo $div;
																						?>
																					</div>
																				</div>
																				<div class="col-lg-4 fv-row">
																					<div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url(assets/images/Signature.jpg)">
																						<div class="image-input-wrapper"  style="background-image: url(<?php echo base_url();?>assets/images/Signature.jpg)"></div>
																					</div>
																				</div>
																			</div>
													            		</div>
													            	</div>
													            </div>
													        </div>
													    </div>
														</div>
													</div>
													<div class="row mt-4">
														<div class="accordion" id="kt_accordion_item_loan_details">
													    <div class="accordion-item">
													        <h2 class="accordion-header" id="kt_accordion_item_loan_details_header_1">
													            <button class="accordion-button fw-bold fs-6 collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#kt_accordion_item_loan_details_body_1" aria-expanded="true" aria-controls="kt_accordion_item_loan_details_body_1">
													            Loan Information Details</button>
													        </h2>
													        <div id="kt_accordion_item_loan_details_body_1" class="accordion-collapse collapse show" aria-labelledby="kt_accordion_item_loan_details_header_1" data-bs-parent="#kt_accordion_item_loan_details">
													            <div class="accordion-body">
													            	<div class="row">
													            		<label class="col-lg-1 col-form-label fw-semibold fs-6">Company</label>
																					<label class="col-lg-11 col-form-label fw-bold fs-6"><?php
																						if(isset($loan_details->COMPANYCODE))
																						{
																						$comp=$this->db->query("select * from COMPANY WHERE COMPANYCODE='".$loan_details->COMPANYCODE."'")->row();
																						echo $comp->COMPANYNAME;
																						}
																						else
																							{
																								echo $loan_details->COMPANYCODE;
																							}
																						?>
																					</label>
													            		<div class="col-lg-6">
													            			<div class="row">
																							<label class="col-lg-2 col-form-label fw-semibold fs-6">Int Type</label>
																							<label class="col-lg-10 col-form-label fw-bold fs-6"><?php echo $loan_details->INTERESTTYPE; ?></label>
																							<label class="col-lg-2 col-form-label fw-semibold fs-6">Loan Date</label>
																							<label class="col-lg-10 col-form-label fw-bold fs-6"><?php echo date_format(date_create($loan_details->ENDATE),'d-m-Y'); ?></label>
																							<div class="col-lg-12">
																								<label class="col-form-label"><i class="fas fa-money-bill-wave fs-4"></i>&emsp;</label>
																								<label class="col-form-label fw-bold fs-2"><?php echo $loan_details->AMOUNT;?></label>
																							</div>
													            			</div>
													            		</div>
													            		<?php
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
																	                // $data['lt_recetpt_date'] = $this->Loanreceipt_model->get_loan_receipts_details($bill_no);
																	                  $ln_dt = $loan_details->ENDATE;
																	                  $month_number = date("d-M-Y",strtotime($ln_dt));
																	                  $data['last_recetpt_date'] = $month_number;
																	                 
																	              }
															              
															              // $data['loan_receipts_details']=$this->Loanreceipt_model->get_loan_receipts_details($bill_no);
															                if ($ln_dt == $loan_details->ENDATE) 
															                {
															                    $endate = $loan_details->ENDATE;
															                    $sd = $endate.' '.'00:00:00';
															                    $e = date("Y-m-d");
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
															                    $e = date("Y-m-d");
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
															                $vCalcDate=date('Y-m-d');
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

															              if(isset($loan_details->CLOSING_STATUS))
															              {
															              		$due_status="<label class='col-form-label fw-bold fs-5 bg-success' style='border-radius: 8px;padding: 5px 10px 5px 10px;'  >Closed</label>";
															              }
																					?>
													            		<div class="col-lg-6">
													            			<div class="row">
													            				<div class="col-lg-4">
																								<?php
																								echo $due_status;
																								?>
																							</div>
																							<div class="col-lg-8">
																								<label class="col-form-label fw-bold fs-6"><?php echo $months1; ?> Month <?php echo $days1;?>  Days</label>
																							</div>
																							<label class="col-lg-2 col-form-label fw-semibold fs-6">Exp.Date</label>
																							<label class="col-lg-10 col-form-label fw-bold fs-6" id="lbl_loan_exp_date"><?php 
																								 $result  = $this->db->query("SELECT * from INTERESTLIST where ACTIVE='Y' AND INTNAME='".$loan_details->INTERESTTYPE."'")->row();
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
																								<div class="col-lg-4">
																									<label class="col-form-label"><span><i class="fas fa-list-ol fs-4"></i>&emsp;</span></label>
																									<label class="col-form-label fw-bold fs-4">
																										<?php 
																										$pl_info=$this->db->query("select * from PLEDGEINFO where BILLNO='".$loan_details->BILLNO."'")->result_array();
																										echo count((array)$pl_info);
																										?>
																									</label>
																								</div>
																								<div class="col-lg-8">
																									<label class="col-form-label"><span><i class="fas fa-balance-scale fs-4"></i></span>&emsp;</label>
																									<label class="col-form-label fw-bold fs-4"><?php echo $loan_details->NETWEIGHT; ?></label>
																								</div>
													            			</div>
													            		</div>
													            		<div class="col-lg-2 fv-row">
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
																							</div>
																						</div>
																					<div class="col-lg-4">
																						<div class="row">
																							<table>
																								<thead class="fw-bold fs-6 text-center">
																									<td class="col-lg-4">Actual</td>
																									<td class="col-lg-4">Paid</td>
																									<td class="col-lg-4">Balance</td>
																								</thead>
																								<tbody class="fw-semibold fs-6 text-center">
																									<tr>
																										<td class="col-lg-4">
																											<span>Pri : </span>
																											<span ><?php echo number_format($loan_details->AMOUNT,2); ?></span>
																										</td>
																										<td class="col-lg-4" id="td_paid_principal"><?php echo number_format($vPaidPrincipal,2); ?></td>
																										<td class="col-lg-4" id="td_balance_principal"><?php echo number_format($vLoanBalance,2); ?></td>
																									</tr>
																									<tr>
																										<td class="col-lg-4">
																											<span>Int : </span>
																											<span><?php 
																												$int_amt=($loan_details->AMOUNT*$loan_details->INTEREST*$loan_details->MONTHS)/100;
																												echo number_format($int_amt,2);
																												?></span>
																										</td>
																										<td class="col-lg-4" id="td_paid_interest"><?php echo number_format($vPaidInterest,2); ?></td>
																										<td class="col-lg-4" id="td_balance_interest"><?php echo number_format($vTotalInterest,2);?></td>
																									</tr>
																								</tbody>
																							</table>

																						</div>
																					</div>
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
														            	<table class="table align-middle table-row-dashed table-striped table-hover fs-7 gy-1 gs-2" id="kt_datatable_dom_positioning_view_loan">
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
																						            <td><?php echo $plist['PURITY']; ?></td>
																						            <td><?php echo $plist['PURITY']; ?></td>
																						            <td><?php echo $plist['WEIGHT']; ?></td>
																						            <td><?php echo $plist['STONEWEIGHT'];  ?></td>
																						            <td><?php echo $plist['LESS'];  ?></td>
																						            <td><?php echo $plist['NETWEIGHT']; ?></td>
																						            <td><?php echo ($plist['IS_DAMAGE']=='Y')?'Yes':'No';  ?></td>
																						            <td>
																						            	<div class="image-input mt-2 me-6" data-kt-image-input="true">
																											<div class="image-input-wrapper w-40px h-40px"style="background-image: url(assets/images/jewel.jpg)"></div>
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
												</div>
												<div class="tab-pane fade" id="kt_tab_pane_initial_loan" role="tabpanel">
													<div class="row mt-4">
														<div class="accordion" id="kt_accordion_item_list_charges">
														    <div class="accordion-item">
														        <h2 class="accordion-header" id="kt_accordion_item_list_charges_header_1">
														            <button class="accordion-button fw-bold fs-6 collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#kt_accordion_item_list_charges_body_1" aria-expanded="true" aria-controls="kt_accordion_item_list_charges_body_1">
														            Charges Details &emsp; - &emsp; Amount <span>&emsp; <?php 
														            if($loan_details->TYPE_OF_RECORD=='O')
														            echo number_format($loan_details->DCAMOUNT+$loan_details->PROCESSING_CHARGE+$loan_details->HL_AMOUNT,2);
														            else
														            echo number_format($loan_details->PARTY_REC_LOAN_CHG+$loan_details->PARTY_REC_LOAN_ON_ACC+$loan_details->PARTY_REC_SEPARATE_CHG+$loan_details->PARTY_REC_SEPARATE_ON_ACC,2);
														             ?> &emsp;</span>
														            </button>
														        </h2>
														        <div id="kt_accordion_item_list_charges_body_1" class="accordion-collapse collapse show" aria-labelledby="kt_accordion_item_list_charges_header_1" data-bs-parent="#kt_accordion_item_list_charges">
														            <div class="accordion-body">
														            	<div class="px-4" style="border-radius: 10px;padding-bottom: 20px;box-shadow: 0 5px 10px #00002947;">
															            	<div class="row">
																							<label class="col-lg-3 col-form-label fw-bold fs-4">Loan Payment Information</label>
																							<div class="col-lg-2">
																								<i class="fas fa-money-bill-wave fs-4" title="Total Amount"></i>&emsp;
																								<label class="col-form-label fw-bold fs-4" title="Total Amount"><?php echo number_format($loan_details->AMOUNT,2);?></label>
																							</div>
																						</div>
																						<div class="row">
																							<div class="col-lg-2" title="Loan Amount">
																								<label class="col-form-label" title="Loan Amount"><i class="fas fa-money-bill-wave-alt fs-3" title="Loan Amount"></i>&emsp;</label>
																								<label class="col-form-label fw-bold fs-5"><?php echo $loan_details->AMOUNT;?></label>
																							</div>
																							<div class="col-lg-2" title="Monthly Interest">
																								<label class="col-form-label" title="Monthly Interest">
																								<i class="fas fa-calendar-alt fs-3" title="Monthly Interest"> &emsp;</i></label>
																								<label class="col-form-label fw-bold fs-5"><?php 
																								$int_amt=($loan_details->AMOUNT*$loan_details->INTEREST*$loan_details->MONTHS)/100;
																								echo number_format($int_amt,2);
																								?></label>
																							</div>
																							<div class="col-lg-2" title="Redemption Period">
																								<label class="col-form-label"><i class="fas fa-hand-holding-usd fs-2" title="Redemption Period"></i> &emsp;</label>
																								<label class="col-form-label fw-bold fs-5"><?php echo (isset($loan_details->REDEMPTION_PERIOD))?$loan_details->REDEMPTION_PERIOD:'0'; ?></label>
																								<label class="col-form-label fw-semibold fs-6">&emsp;Days</label>
																							</div>
																							<div class="col-lg-2" title="Membership Points">
																								<label class="col-form-label">
																								<i class="fas fa-coins fs-3"></i> &emsp;</label>
																								<label class="col-form-label fw-bold fs-5">
																									 <?php 
																									// $loan_mem_point=$this->db->query("select * from MEMBERSHIP_HISTORY where BILLNO='".$loan_details->BILLNO."'")->row();
																									// if(isset($loan_mem_point))
																									// {
																									// 	echo $loan_mem_point->POINTS_EARNED;
																									// }
																									// else
																									// {
																									// 	echo "0";
																									// }
																									?>
																								</label>
																							</div>
																						</div>
																					</div><br>
																					<div class="px-4" style="border-radius: 10px;padding-bottom: 20px;box-shadow: 0 5px 10px #00002947;">
																						<div class="row">
																							<label class="col-lg-3 col-form-label fw-bold fs-4">Payment To Receive</label>
																							<div class="col-lg-3" title="Total Amount">
																								<i class="fas fa-money-bill-wave fs-4" title="Total Amount"></i>&emsp;
																								<label class="col-form-label fw-bold fs-4" title="Total Amount"><?php 
																		            if($loan_details->TYPE_OF_RECORD=='O')
																		            echo number_format($loan_details->DCAMOUNT+$loan_details->PROCESSING_CHARGE+$loan_details->HL_AMOUNT,2);
																		            else
																		            echo number_format($loan_details->PARTY_REC_LOAN_CHG+$loan_details->PARTY_REC_LOAN_ON_ACC+$loan_details->PARTY_REC_SEPARATE_CHG+$loan_details->PARTY_REC_SEPARATE_ON_ACC,2);
																		             ?></label>
																							</div>
																						</div>
																						<div class="row">
																							<div class="col-lg-2" title="Processing Charge">
																								<label class="col-form-label">
																								<i class="fas fa-file-powerpoint fs-2" title="Processing Charge"> &emsp;</i></label>
																								<label class="col-form-label fw-bold fs-5" title="Processing Charge"><?php 
																									echo number_format($loan_details->PROCESSING_CHARGE,2);
																								?></label>
																							</div>
																							<div 	class="col-lg-2" title="Document Charge">
																								<label class="col-form-label">
																								<i class="fas fa-file-invoice fs-2" title="Document Charge"></i> &emsp;</label>
																								<label class="col-form-label fw-bold fs-5" title="Document Charge"><?php 
																									echo number_format($loan_details->DCAMOUNT,2);
																								?></label>
																							</div>
																							<div class="col-lg-2" title="Processing & Document Charges Total">
																								<label class="col-form-label">
																								<i class="fas fa-money-bill-wave fs-4" title="Processing & Document Charges Total"></i>&emsp;</label>
																								<label class="col-form-label fw-bold fs-5" title="Processing & Document Charges Total"><?php 
																								echo number_format($loan_details->DCAMOUNT+$loan_details->PROCESSING_CHARGE,2);
																								?></label>
																							</div>
																							<div class="col-lg-3">
																								<div class=" text-center" style="background-color: #ff5b5b;border-radius: 10px;">
																									<label class="col-form-label fw-semibold fs-6 text-white">On Account &emsp;</label>
																									<label class="col-form-label fw-bold fs-5 text-white"><?php echo number_format($loan_details->HL_AMOUNT,2); ?></label>
																								</div>
																							</div>
																							<div class="col-lg-6">
																								<div class="row">
																									<label class="col-form-label fw-bold fs-5">Proc & Doc Charges Deduct from</label>
																									<div class="col-lg-6">
																										<label class="col-form-label fw-semibold fs-6">Loan Amt &emsp;</label>
																										<label class="col-form-label fw-bold fs-4"><?php echo number_format($loan_details->PARTY_REC_LOAN_CHG,2); ?></label>
																									</div>
																									<div class="col-lg-6">
																										<label class="col-form-label fw-semibold fs-6">Pay Seperate &emsp;</label>
																										<label class="col-form-label fw-bold fs-4"><?php echo number_format($loan_details->PARTY_REC_SEPARATE_CHG,2); ?></label>
																									</div>
																								</div>
																							</div>
																							<div class="col-lg-6">
																								<div class="row">
																									<label class="col-form-label fw-bold fs-5">On Account Charges Deduct from</label>
																									<div class="col-lg-6">
																										<label class="col-form-label fw-semibold fs-6">Loan Amt &emsp;</label>
																										<label class="col-form-label fw-bold fs-4"><?php echo number_format($loan_details->PARTY_REC_LOAN_ON_ACC,2); ?></label>
																									</div>
																									<div class="col-lg-6">
																										<label class="col-form-label fw-semibold fs-6">Pay Seperate &emsp;</label>
																										<label class="col-form-label fw-bold fs-4"><?php echo number_format($loan_details->PARTY_REC_SEPARATE_ON_ACC,2); ?></label>
																									</div>
																								</div>
																							</div>
																						</div>
																						<div class="row">
																							<!-- <label class="col-form-label fw-bold fs-4">To Pay</label> -->
																							<label class="col-lg-1 col-form-label fw-semibold fs-6">Remarks</label>
																							<label class="col-lg-4 col-form-label fw-bold fs-5">-</label>
																							<div class="col-lg-7">
																								<label class="col-form-label fw-bold fs-1">Net Pay &emsp;</label>
																								<label class="col-form-label fw-bold fs-1"><?php 
																								$net_pay=$loan_details->AMOUNT-$loan_details->PARTY_REC_LOAN_CHG-$loan_details->PARTY_REC_LOAN_ON_ACC;
																								echo number_format($net_pay,2); ?></label>
																							</div>
																						</div>
																					</div>
														            </div>
														        </div>
														    </div>
														</div>
													</div>
													<div class="row mt-4">
														<div class="accordion" id="kt_accordion_item_list_receive">
													    <div class="accordion-item">
													        <h2 class="accordion-header" id="kt_accordion_item_list_receive_header_1">
													            <button class="accordion-button fw-bold fs-6 collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#kt_accordion_item_list_receive_body_1" aria-expanded="false" aria-controls="kt_accordion_item_list_receive_body_1">
													            Payment To Receive Details &emsp; - &emsp; Amount <span>&emsp; <?php 
													            if($loan_details->TYPE_OF_RECORD=='O')
													            echo number_format($loan_details->DCAMOUNT+$loan_details->PROCESSING_CHARGE+$loan_details->HL_AMOUNT,2);
													            else
													            echo number_format($loan_details->PARTY_REC_SEPARATE_CHG+$loan_details->PARTY_REC_SEPARATE_ON_ACC,2);
													             ?> &emsp;</span>
													            </button>
													        </h2>
													        <div id="kt_accordion_item_list_receive_body_1" class="accordion-collapse collapse" aria-labelledby="kt_accordion_item_list_receive_header_1" data-bs-parent="#kt_accordion_item_list_receive">
												            <div class="accordion-body">
												            	<div class="row">
																				<label class="col-lg-2 col-form-label fw-bold fs-3">Total to Receive</label>
																				<label class="col-lg-2 col-form-label fw-bold fs-3"><?php 
																	            if($loan_details->TYPE_OF_RECORD=='O')
																	            echo number_format($loan_details->DCAMOUNT+$loan_details->PROCESSING_CHARGE+$loan_details->HL_AMOUNT,2);
																	            else
																	            echo number_format($loan_details->PARTY_REC_SEPARATE_CHG+$loan_details->PARTY_REC_SEPARATE_ON_ACC,2);
																	             ?>
																	      </label>
																			</div>
																			<?php
																				$payment_details_cash=$this->db->query("select * from party_payment_receive where type_of_payment='Cash' and bill_no='".$loan_details->BILLNO."' and party_id='".$loan_details->PID."'")->row();
																				if(isset($payment_details_cash))
																					{
																			?>
																			<div class="row">
																				<label class="col-lg-1 col-form-label fw-semibold fs-6">Cash</label>
																				<label class="col-lg-2 col-form-label fw-bold fs-5"><?php echo $payment_details_cash->amount;
																					// }
																					// else
																					// {
																					// 	echo number_format($loan_details->DCAMOUNT+$loan_details->PROCESSING_CHARGE+$loan_details->HL_AMOUNT,2);
																					// }
																				?></label>
																				<label class="col-lg-1 col-form-label fw-semibold fs-6">Details</label>
																				<label class="col-lg-2 col-form-label fw-bold fs-5"><?php 
																				// if(isset($payment_details_cash))
																				// 	{
																						echo $payment_details_cash->remarks;
																					// }
																					// else
																					// {
																					// 	echo "-";
																					// }
																					?></label>
																			</div>
																			<?php } ?>
																			<?php
																				$payment_details_chq=$this->db->query("select * from party_payment_receive where type_of_payment='Cheque' and bill_no='".$loan_details->BILLNO."' and party_id='".$loan_details->PID."'")->row();
																				if(isset($payment_details_chq))
																				{
																			?>
																			<div class="row">
																				<label class="col-lg-1 col-form-label fw-semibold fs-6">Cheque</label>
																				<label class="col-lg-2 col-form-label fw-bold fs-5"><?php echo $payment_details_chq->amount; ?></label>
																				<label class="col-lg-1 col-form-label fw-semibold fs-6">Party Bank</label>
																				<label class="col-lg-2 col-form-label fw-bold fs-5"><?php echo $payment_details_chq->party_bank; ?></label>
																				<label class="col-lg-1 col-form-label fw-semibold fs-6">Ref.No</label>
																				<label class="col-lg-2 col-form-label fw-bold fs-5"><?php echo $payment_details_chq->cheque_ref_no; ?></label>
																				<label class="col-lg-1 col-form-label fw-semibold fs-6">Details</label>
																				<label class="col-lg-2 col-form-label fw-bold fs-5"><?php echo $payment_details_chq->remarks; ?></label>
																			</div>
																			<?php }?>
																			<?php
																				$payment_details_rtgs=$this->db->query("select * from party_payment_receive where type_of_payment='RTGS' and bill_no='".$loan_details->BILLNO."' and party_id='".$loan_details->PID."'")->row();
																				if(isset($payment_details_rtgs))
																				{
																			?>
																			<div class="row">
																				<label class="col-lg-1 col-form-label fw-semibold fs-6">RTGS</label>
																				<label class="col-lg-2 col-form-label fw-bold fs-5"><?php echo $payment_details_rtgs->amount; ?></label>
																				<label class="col-lg-1 col-form-label fw-semibold fs-6">Ref.No</label>
																				<label class="col-lg-2 col-form-label fw-bold fs-5"><?php echo $payment_details_rtgs->cheque_ref_no; ?></label>
																				<label class="col-lg-1 col-form-label fw-semibold fs-6">Cmy.Bank</label>
																				<label class="col-lg-2 col-form-label fw-bold fs-5"><?php echo $payment_details_rtgs->company_bank; ?></label>
																				<label class="col-lg-1 col-form-label fw-semibold fs-6">Details</label>
																				<label class="col-lg-2 col-form-label fw-bold fs-5"><?php echo $payment_details_rtgs->remarks; ?></label>
																			</div>
																			<?php }?>
																			<?php
																				$payment_details_upi=$this->db->query("select * from party_payment_receive where type_of_payment='UPI' and bill_no='".$loan_details->BILLNO."' and party_id='".$loan_details->PID."'")->row();
																				if(isset($payment_details_upi))
																				{
																			?>
																			<div class="row">
																				<label class="col-lg-1 col-form-label fw-semibold fs-6">UPI</label>
																				<label class="col-lg-2 col-form-label fw-bold fs-5"><?php echo $payment_details_upi->amount; ?></label>
																				<label class="col-lg-1 col-form-label fw-semibold fs-6">Ref.No</label>
																				<label class="col-lg-2 col-form-label fw-bold fs-5"><?php echo $payment_details_upi->cheque_ref_no; ?></label>
																				<label class="col-lg-1 col-form-label fw-semibold fs-6">Cmy.Bank</label>
																				<label class="col-lg-2 col-form-label fw-bold fs-5"><?php echo $payment_details_upi->company_bank; ?></label>
																				<label class="col-lg-1 col-form-label fw-semibold fs-6">Details</label>
																				<label class="col-lg-2 col-form-label fw-bold fs-5"><?php echo $payment_details_upi->remarks; ?></label>
																			</div>
																			<?php }?>
																			<div class="row mt-4">
																				<div class="col-lg-6 text-center">
																					<label class="col-form-label fw-bold fs-3">Paid Amount &emsp;</label>
																					<label class="col-form-label fw-bold fs-3"><?php 
															            if($loan_details->TYPE_OF_RECORD=='O')
															            echo number_format($loan_details->DCAMOUNT+$loan_details->PROCESSING_CHARGE+$loan_details->HL_AMOUNT,2);
															            else
															            echo number_format($loan_details->PARTY_REC_SEPARATE_CHG+$loan_details->PARTY_REC_SEPARATE_ON_ACC,2);
															             ?></label>
																				</div>
																				<!-- <div class="col-lg-6 text-center">
																					<label class="col-form-label fw-bold fs-3">Balance Amount &emsp;</label>
																					<label class="col-form-label fw-bold fs-3">0.00</label>
																				</div> -->
																			</div>
												            </div>
													        </div>
													    </div>
														</div>
													</div>
													<?php 
													$to_pay_details_cash=$this->db->query("select * from payment_inward_outward where type_of_payment='Cash' and module_name='New Loan - Pay' and bill_no='".$loan_details->BILLNO."' and party_id='".$loan_details->PID."'")->row(); 
													$to_pay_details_chq=$this->db->query("select * from payment_inward_outward where type_of_payment='Cheque'  and bill_no='".$loan_details->BILLNO."' and party_id='".$loan_details->PID."'")->row();

													$to_pay_details_rtgs=$this->db->query("select * from payment_inward_outward where type_of_payment='RTGS' and bill_no='".$loan_details->BILLNO."' and party_id='".$loan_details->PID."'")->row();
													$to_pay_details_upi=$this->db->query("select * from payment_inward_outward where type_of_payment='UPI' and bill_no='".$loan_details->BILLNO."' and party_id='".$loan_details->PID."'")->row();
													?>
													<div class="row mt-4">
														<div class="accordion" id="kt_accordion_item_list_paynow">
													    <div class="accordion-item">
												        <h2 class="accordion-header" id="kt_accordion_item_list_paynow_header_1">
												            <button class="accordion-button fw-bold fs-6 collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#kt_accordion_item_list_paynow_body_1" aria-expanded="false" aria-controls="kt_accordion_item_list_paynow_body_1">
												            To Pay Details &emsp; - &emsp; Amount <span>&emsp; <?php echo number_format($net_pay,2);?> &emsp;</span>
												            </button>
												        </h2>
												        <div id="kt_accordion_item_list_paynow_body_1" class="accordion-collapse collapse" aria-labelledby="kt_accordion_item_list_paynow_header_1" data-bs-parent="#kt_accordion_item_list_paynow">
											            <div class="accordion-body">
											            	<div class="row">
																			<label class="col-lg-2 col-form-label fw-bold fs-3">Net Pay</label>
																			<label class="col-lg-2 col-form-label fw-bold fs-3"><?php echo number_format($net_pay,2);?></label>
																		</div>
																			
																			<div class="row">
																			<?php
																			$to_pay_details_cash=$this->db->query("select * from payment_inward_outward where type_of_payment='Cash' and module_name='New Loan - Pay' and bill_no='".$loan_details->BILLNO."' and party_id='".$loan_details->PID."'")->row(); 
																				if(isset($to_pay_details_cash))
																				{
																			?>
																			<label class="col-lg-1 col-form-label fw-semibold fs-6">Cash</label>
																			<label class="col-lg-2 col-form-label fw-bold fs-5"><?php echo $to_pay_details_cash->amount;
																				
																			?></label>
																			<label class="col-lg-1 col-form-label fw-semibold fs-6">Details</label>
																			<label class="col-lg-2 col-form-label fw-bold fs-5"><?php echo $to_pay_details_cash->remarks;
																				
																				?>
																			</label>
																			<?php } ?>
																		</div>
																		<div class="row">
																		<?php  
																		//$to_pay_details_chq=$this->db->query("select * from pay_to_party where type_of_payment='Cheque'  and bill_no='".$loan_details->BILLNO."' and party_id='".$loan_details->PID."'")->row();
																			if(isset($to_pay_details_chq))
																			{
																			?>
																			<div class="col-lg-3">
																				<label class="col-form-label fw-semibold fs-6">Cheque &emsp;</label>
																				<label class="col-form-label fw-bold fs-5 text-end"><?php
																					echo $to_pay_details_chq->amount;
																				?>
																				</label>
																			</div>
																			<div class="col-lg-2">
																				<label class="col-form-label fw-semibold fs-6">Ref.No &emsp;</label>
																				<label class="col-form-label fw-bold fs-5"><?php
																					echo $to_pay_details_chq->cheque_ref_no;
																				?></label>
																			</div>
																			<div class="col-lg-2">
																				<label class="col-form-label fw-semibold fs-6">Cmy.bank &emsp;</label>
																				<label class="col-form-label fw-bold fs-5"><?php
																					$bank=$this->db->query("select * from  BANKS where SNO='".$to_pay_details_rtgs->company_bank."'")->row();
																				echo $bank->BANKNAME;
																				?></label>
																			</div>
																			<div class="col-lg-2">
																				<label class="col-form-label fw-semibold fs-6">Party bank &emsp;</label>
																				<label class="col-form-label fw-bold fs-5"><?php
																					echo $to_pay_details_chq->party_bank;
																				?></label>
																			</div>
																			<div class="col-lg-3">
																				<label class="col-form-label fw-semibold fs-6">Details &emsp;</label>
																				<label class="col-form-label fw-bold fs-5"><?php
																					echo $to_pay_details_chq->remarks;?>
																				</label>
																			</div>
																			<?php }?>
																		</div>
																	
																		
																		<div class="row">
																		<?php 
																			//$to_pay_details_rtgs=$this->db->query("select * from pay_to_party where type_of_payment='RTGS' and bill_no='".$loan_details->BILLNO."' and party_id='".$loan_details->PID."'")->row();
																			if(isset($to_pay_details_rtgs))
																				{
																			?>
																			<div class="col-lg-3">
																				<label class="col-form-label fw-semibold fs-6">RTGS &emsp;</label>
																				<label class="col-form-label fw-bold fs-5 text-end"><?php 
																					echo $to_pay_details_rtgs->amount;
																				?></label>
																			</div>
																			<div class="col-lg-2">
																				<label class="col-form-label fw-semibold fs-6">Ref.No &emsp;</label>
																				<label class="col-form-label fw-bold fs-5"><?php
																					echo $to_pay_details_rtgs->cheque_ref_no;
																				?></label>
																			</div>
																			<div class="col-lg-2">
																				<label class="col-form-label fw-semibold fs-6">Cmy.bank &emsp;</label>
																				<label class="col-form-label fw-bold fs-5"><?php 
																					$bank=$this->db->query("select * from  BANKS where SNO='".$to_pay_details_rtgs->company_bank."'")->row();
																				echo $bank->BANKNAME;
																				?></label>
																			</div>
																			<div class="col-lg-2">
																				<label class="col-form-label fw-semibold fs-6">Party bank &emsp;</label>
																				<label class="col-form-label fw-bold fs-5"><?php
																					echo $to_pay_details_rtgs->party_bank;
																				?></label>
																			</div>
																			<div class="col-lg-3">
																				<label class="col-form-label fw-semibold fs-6">Details &emsp;</label>
																				<label class="col-form-label fw-bold fs-5"><?php
																					echo $to_pay_details_rtgs->remarks;
																				?></label>
																			</div>
																			<?php }?>
																		</div>
																	
																		<?php 
																		//$to_pay_details_upi=$this->db->query("select * from pay_to_party where type_of_payment='UPI' and bill_no='".$loan_details->BILLNO."' and party_id='".$loan_details->PID."'")->row();
																		if(isset($to_pay_details_upi))
																			{
																		?>
																		<div class="row">
																			<div class="col-lg-3">
																				<label class="col-form-label fw-semibold fs-6">UPI &emsp;</label>
																				<label class="col-form-label fw-bold fs-5 text-end"><?php
																					echo $to_pay_details_upi->amount;
																				?></label>
																			</div>
																			<div class="col-lg-2">
																				<label class="col-form-label fw-semibold fs-6">Ref.No &emsp;</label>
																				<label class="col-form-label fw-bold fs-5"><?php
																					echo $to_pay_details_upi->cheque_ref_no;
																				?></label>
																			</div>
																			<div class="col-lg-2">
																				<label class="col-form-label fw-semibold fs-6">Cmy.bank &emsp;</label>
																				<label class="col-form-label fw-bold fs-5"><?php 
																					$bank=$this->db->query("select * from  BANKS where SNO='".$to_pay_details_upi->company_bank."'")->row();
																					echo $bank->BANKNAME;
																				?></label>
																			</div>
																			<div class="col-lg-2">
																				<label class="col-form-label fw-semibold fs-6">Party bank &emsp;</label>
																				<label class="col-form-label fw-bold fs-5"><?php
																					echo $to_pay_details_upi->party_bank;
																				?></label>
																			</div>
																			<div class="col-lg-3">
																				<label class="col-form-label fw-semibold fs-6">Details &emsp;</label>
																				<label class="col-form-label fw-bold fs-5"><?php
																					echo $to_pay_details_upi->remarks;
																				?></label>
																			</div>
																		</div>
																		<?php }?>
																		<div class="row mt-4">
																			<div class="col-lg-6 text-center">
																				<label class="col-form-label fw-bold fs-3">Paid Amount &emsp;</label>
																				<label class="col-form-label fw-bold fs-3"><?php echo number_format($net_pay,2);?></label>
																			</div>
																		</div>
											            </div>
												        </div>
													    </div>
														</div>
													</div>
													</div>
												</div>
											</div>
											<div class="tab-content" id="myTabContent">
												<div class="tab-pane fade" id="kt_tab_pane_receipt_loan" role="tabpanel">
													<div class="row">
														<div class="col-lg-3" title="Loan Date">
															<!-- <label class="col-form-label"><i class="fas fa-calendar-day fs-4"></i> </label> -->
															<label class="col-form-label fw-semibold fs-6">Loan Date &emsp;</label>
															<label class="col-form-label fw-bold fs-5"><?php echo $loan_details->ENDATE; ?></label>
														</div>
														<div class="col-lg-3" title="Receipt Count">
															<!-- <label class="col-form-label"><i class="fas fa-calendar-day fs-4"></i> </label> -->
															<label class="col-form-label fw-semibold fs-6">Receipt Count &emsp;</label>
															<label class="col-form-label fw-bold fs-5" id="ls_rcpt_count">1</label>
														</div>
														<div class="col-lg-3" title="Loan Amount">
															<label class="col-form-label fw-semibold fs-6">Loan Amount &emsp;</label>
															<!-- <label class="col-form-label"><i class="fas fa-money-bill-wave fs-4"></i> </label> -->
															<label class="col-form-label fw-bold fs-5"><?php echo $loan_details->AMOUNT; ?></label>
														</div>
														<div class="col-lg-3" title="Total Amount">
															<!-- <label><i class="fas fa-money-check-alt fs-2" title="Total Amount"></i>&emsp;</label> -->
															<label class="col-form-label fw-semibold fs-6">Total Amount &emsp;</label>
															<label class="col-form-label fw-bold fs-5"><?php echo $loan_details->AMOUNT-$loan_details->PAIDPRINCIPAL; ?></label>
														</div>
														<div class="col-lg-3" title="Paid Amount">
															<!-- <label><i class="fas fa-money-bill-wave fs-4" title="Paid Amount"></i>&emsp;</label> -->
															<label class="col-form-label fw-semibold fs-6">Paid Amount &emsp;</label>
															<label class="col-form-label fw-bold fs-5"><?php echo number_format($vPaidInterest+$vPaidPrincipal,2);?></label>
														</div>
														<div class="col-lg-3" title="Balance Amount">
															<label class="col-form-label fw-semibold fs-6">Balance Amount &emsp;</label>
															<!-- <label><i class="fas fa-hand-holding-usd fs-2" title="Balance Amount">&emsp;</i></label> -->
															<label class="col-form-label fw-bold fs-5"><?php  echo $loan_details->AMOUNT-$loan_details->PAIDPRINCIPAL; ?></label>
														</div>
													</div>
													<div class="row mt-4">
														<div class="accordion" id="kt_accordion_item_receipt_pending_list">
													    <div class="accordion-item">
													        <h2 class="accordion-header" id="kt_accordion_item_receipt_pending_list_header_1">
													            <button class="accordion-button fw-bold fs-6 collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#kt_accordion_item_receipt_pending_list_body_1" aria-expanded="true" aria-controls="kt_accordion_item_receipt_pending_list_body_1">
													            Pending Payment Details &emsp; - &emsp; Total Amount &emsp;<span id="ls_acc_pending_bal_amount">&emsp; 10927.01 &emsp;</span>
													            </button>
													        </h2>
													        <div id="kt_accordion_item_receipt_pending_list_body_1" class="accordion-collapse collapse show" aria-labelledby="kt_accordion_item_receipt_pending_list_header_1" data-bs-parent="#kt_accordion_item_receipt_pending_list">
													            <div class="accordion-body">
													            	<div class="row">
																					<!-- <label class="col-form-label fw-bold fs-4">Pending Payment Details</label> -->
																					<table class="table align-middle table-row-dashed table-striped table-hover fs-7 gy-4 gs-2" id="view_receipt_payment_history">
																						<thead>
																							<tr class="text-start text-muted fw-bold fs-7 gs-0">
																								<!--<th class="min-w-25px">Sno</th>-->
																			            <th class="min-w-80px">Exp.Date</th>
																			            <th class="min-w-50px">Int %</th>
																			            <th class="min-w-80px">Principal Amount</th>
																			            <th class="min-w-80px">Interest Amount</th>
																			            <th class="min-w-80px">Total Amount</th>
																							</tr>
																						</thead>
																						<!--<tbody class="text-gray-600 fw-semibold">
																							<tr>
																								<td>1</td>
																								<td>22-01-2023</td>
																								<td>2.5</td>
																								<td>10000.00</td>
																								<td>250.00</td>
																								<td>10250.00</td>
																							</tr>
																							<tr>
																								<td>2</td>
																								<td>22-02-2023</td>
																								<td>3.0</td>
																								<td>10250.00</td>
																								<td>307.50</td>
																								<td>10557.50</td>
																							</tr>
																							<tr>
																								<td>3</td>
																								<td>22-03-2023</td>
																								<td>3.5</td>
																								<td>10557.50</td>
																								<td>369.51</td>
																								<td>10927.01</td>
																							</tr>							
																					    </tbody>-->
																						<tbody class="text-gray-600 fw-semibold" id="ls_acc_pending_detail">
																							
																							</tbody>
																					</table>
																				</div>
													            </div>
													        </div>
													    </div>
														</div>
													</div>
													<div class="row mt-4">
														<div class="accordion" id="kt_accordion_item_receipt_paid_list">
													    <div class="accordion-item">
													        <h2 class="accordion-header" id="kt_accordion_item_receipt_paid_list_header_1">
													            <button class="accordion-button fw-bold fs-6 collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#kt_accordion_item_receipt_paid_list_body_1" aria-expanded="true" aria-controls="kt_accordion_item_receipt_paid_list_body_1">
													            Paid Receipt Details &emsp; - &emsp; Paid Amount &emsp;<span id="ls_acc_paid_amount">&emsp; 2000.00 &emsp;</span>
													            </button>
													        </h2>
													        <div id="kt_accordion_item_receipt_paid_list_body_1" class="accordion-collapse collapse show" aria-labelledby="kt_accordion_item_receipt_paid_list_header_1" data-bs-parent="#kt_accordion_item_receipt_paid_list">
													            <div class="accordion-body">
													            	<div class="row">
																					<!-- <label class="col-form-label fw-bold fs-4">Paid Receipt Details</label> -->
																					<table class="table align-middle table-row-dashed table-striped table-hover fs-7 gy-4 gs-2" id="view_receipt_payment_history_paid">
																						<thead>
																							<tr class="text-start text-muted fw-bold fs-7 gs-0">
																								<!--<th class="min-w-25px">Sno</th> -->
																			            <th class="min-w-80px">Exp.Date</th>
																			            <th class="min-w-80px">Recpt Date</th>
																			            <th class="min-w-25px">Int %</th>
																			            <th class="min-w-80px">Prin Amt</th>
																			            <th class="min-w-80px">Int Amt</th>
																			            <th class="min-w-80px">Paid Amt</th>
																			            <th class="min-w-80px">Bal Amt</th>
																							</tr>
																						</thead>
																						<!--<tbody class="text-gray-600 fw-semibold">
																							<tr>
																								<td>1</td>
																								<td>22-03-2023</td>
																								<td>06-03-2023</td>
																								<td>3.5</td>
																								<td>10557.50</td>
																								<td>369.51</td>
																								<td>2000.00</td>
																								<td>8927.01</td>
																							</tr>							
																					  </tbody>-->
																					  <tbody class="text-gray-600 fw-semibold" id="ls_acc_receipt_detail">
																														
																					  </tbody>
																					</table>
																				</div>
													            </div>
													        </div>
													    </div>
														</div>
													</div>
												</div>
											</div>
											</div>
										</div>
										<!--end::Card body-->
									</div>
									<!--end::Tables Widget 9-->
								</div>
								<!--end::Col-->
							</div>
							<!--end::Row-->
						</div>
						<!--end::Container-->
					</div>
					<!--end::Content-->
				<?php $this->load->view("footer");?>
				</div>
				<!--end::Wrapper-->
			</div>
			<!--end::Page-->
		</div>
		<!--end::Root-->

		<?php $this->load->view("script"); ?>
		<input type="hidden" id="baseurl" value="<?php echo base_url(); ?>">
		<!-- <script src="js/purchaseregister-list.js"></script> -->
		<script>
		$(document).ready(function(){
  // alert('changed');
		var pid= $("#party_id").val();
		var bill_no= $("#bill_no").val();
		var baseurl=$('#baseurl').val();
		$.ajax({
					type: "POST",
					url: baseurl+'loan/load_other_info?',
					async: false,
					type: "POST",
					data: "id="+pid+"&bill_no="+bill_no,
					dataType: "html",
					success: function(response)
					{	
						res=response.split("||");
						$("#ls_due_status").html(res[1]);
						var ln_period=res[3]+" Months "+res[2]+" Days";
						$("#ls_loan_period").html(ln_period);
		                $('#ls_id_photo').empty().append(res[4]);
		                $('#ls_loan_status').empty().append(res[5]);
		                $('#ls_rcpt_count').html(res[6]);

					}
					});
 		 $.ajax({
					type: "POST",
					url: baseurl+'loan/load_popup_receipt_info',
					async: false,
					type: "POST",
					data: "&bill_no="+bill_no,
					dataType: "html",
					success: function(response)
					{	
						res=response.split("||");
						
		                $('#ls_acc_pending_detail').html(res[1]);
		                $('#ls_acc_receipt_detail').html(res[8]);
		                //$('#ls_loan_int').html(res[2]);
		                $('#ls_paid_prin').html(res[3]?res[3] :0.00 );
						$('#ls_paid_int').html(res[4]?res[4] :0.00 );
						var tot=parseFloat(res[4])+parseFloat(res[3]);
						$('#ls_acc_paid_amount').html(tot);
						$('#ls_rcpt_paid_amount').html(tot);
						$('#ls_bal_prin').html(res[7]-res[3]);
						$('#ls_bal_int').html(res[2]-res[4]);
						$('#ls_acc_pending_bal_amount').html((res[7]-res[3])+(res[2]-res[4]))
						$('#ls_rcpt_bal_amount').html((res[7]-res[3])+(res[2]-res[4]))
						$('#ls_rcpt_total_amount').html((res[7]-res[3])+(res[2]-res[4]))

					}
					});
  
  
});
		</script>

	</body>
	<!--end::Body-->
</html>