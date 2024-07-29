<?php  $this->load->view("common");?>

<style>
	.dataTables_scroll
    {
        position: relative;
        overflow: auto;
        max-height: 218px;/*the maximum height you want to achieve*/
        width: 100%;
    }
  .dataTables_scroll thead{
    position: -webkit-sticky;
    position: sticky;
    top: 0;
    background-color: #fff;
    z-index: 2;
  }
</style>
<link href="assets/jquery.autocomplete.css" rel="stylesheet" type="text/css" />
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
				<?php  $this->load->view("header");?>
				<!--begin::Toolbar-->
					<div class="toolbar py-2" id="kt_toolbar">
						<!--begin::Container-->
						<div id="kt_toolbar_container" class="container-fluid d-flex align-items-center">
							<!--begin::Page title-->
							<div class="flex-grow-1 flex-shrink-0 me-5">
								<!--begin::Page title-->
								<div data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
									<!--begin::Title-->
									<h1 class="d-flex align-items-center text-dark fw-bold my-1 fs-3">View Jewel Settlement
									<!--begin::Separator-->
									<span class="h-20px border-gray-200 border-start ms-3 mx-2"></span>
									<!--end::Separator-->
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
										<!--begin::Card header-->
										<!-- <div class="card-header1 border-0 pt-6">
										</div> -->
										<!--end::Card header-->
										<!--begin::Card body-->
										<div class="card-body py-4">
											<div class="row">
												<label class="col-lg-1 col-form-label fw-Semibold fs-6">Loan No</label>
												<label class="col-lg-2 col-form-label fw-bold fs-5"><?php echo $loan_details->BILLNO;?>  <?php echo $bj_status;?></label>
												<input type="hidden" name="bill_no" id="bill_no" value="<?php echo $loan_details->BILLNO;?>">
												<label class="col-lg-1  col-form-label fw-semibold fs-6">Date</label>
												<label class="col-lg-2 col-form-label fw-bold fs-5"><?php echo date("d-m-Y",strtotime($jewelsettle_details->ISSUE_DATE)) ;?></label>
												<label class="col-lg-1  col-form-label fw-semibold fs-6">Company</label>
												<label class="col-lg-5 col-form-label fw-bold fs-5"><?php  $clist=$this->db->query("select * from  COMPANY where COMPANYCODE='".$loan_details->COMPANYCODE."'")->row();
									echo $clist->COMPANYNAME;?></label>
											</div>
											<div class="row mt-4">
												<div class="col-lg-6">
													<div class="px-4" style="border-radius: 10px;padding-bottom: 6px;box-shadow: 0 5px 10px #00002947;">
														<label class="col-lg-12 col-form-label fw-bold fs-5 text-center">Party Basic Details</label>
														<div class="row">
															<div class="col-lg-6">
																<div class="row">
																	<label class="col-lg-12 col-form-label fw-bold fs-6"><i class="fa fa-address-card fs-6" aria-hidden="true" title="Card No"></i>&emsp;<?php echo  $membership_details['MEMBERSHIP_NO'] ? $membership_details['MEMBERSHIP_NO'] : '-' ?>
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
																	<!-- <div class="col-lg-4">
																		<button class="btn btn-sm btn-outline btn-outline-solid btn-outline-warning btn-active-light-primary me-2" data-bs-toggle="modal" data-bs-target="#kt_modal_verify_membership_card">Verify</button>
																	</div> -->
																	<label class="col-lg-12 col-form-label fw-bold fs-6 mt-2" title="Nominee">
																	<span><i class="fas fa-user-friends fs-5" title="Nominee"></i>&emsp;</span>
																	<span title="Nominee"><?php $nominee = $this->db->query("SELECT * FROM NOMINEE WHERE NOMINEE_ID = '".$loan_details->NOMINEE_ID."'")->row();
											echo $nominee->NOMINEE_NAME." - ".$nominee->RELATION." - ".$nominee->MOBILE_NO; ?></span></label>
																	<div class="col-lg-12" title="Rating">
																		<label class="col-form-label fw-bold fs-4">
																			<i class="fas fa-star-half-alt"></i>&emsp;
																		</label>
																		<label class="col-form-label fw-bold fs-6">
																				<i class="fa-solid fa-star fs-3" style="color:#50cd89;"></i>
																			&nbsp;<span>Good</span></label>
																	</div>
																</div>
															</div>
															<div class="col-lg-6">
																<div class="row">
																	<label class="col-lg-12 col-form-label fw-bold fs-6" name="" id="">
																		<i class="fa fa-user fs-6" aria-hidden="true" title="Last Name"></i>&emsp;<?php echo $party_details->NAME; ?></label>
																	<label class="col-lg-12 col-form-label fw-bold fs-6" name="" id="">
																		<i class="fa-solid fa-location-dot fs-6" aria-hidden="true" title="Address"></i>
																	&emsp;<?php 
																	$village = $this->db->query("SELECT * FROM VILLAGE WHERE VILLAGEID = '".$party_details->ADDRESS2."'  ")->row();

																	$street = $this->db->query("SELECT * FROM STREET WHERE STREETID = '".$party_details->STREET_ID."'  ")->row();
															
																	$city = $this->db->query("SELECT * FROM CITY WHERE CITYID = '".$party_details->CITY."'  ")->row();

																	echo $street->STREETNAME.", ".$village->VILLAGENAME;
																	?></label>
																	<label class="col-lg-12 col-form-label fw-bold fs-6" name="" id="">
																			<i class="fas fa-mobile-android-alt fs-6" aria-hidden="true" title="Mobile"></i>
																		&emsp;<span><?php echo $party_details->PHONE; ?></span>
																		<!-- <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#kt_modal_verify_mobile_no" title="Verify Mobile No">
																			<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 505 505" xml:space="preserve" height="35" width="35">
																			<circle style="fill:#FFD05B;" cx="252.5" cy="252.5" r="252.5"></circle>
																			<path style="fill:#324A5E;" d="M316,416.7H119c-4.7,0-8.4-3.8-8.4-8.4V96.7c0-4.7,3.8-8.4,8.4-8.4h197c4.7,0,8.4,3.8,8.4,8.4v311.6
																				C324.5,412.9,320.7,416.7,316,416.7z"></path>
																			<rect x="131" y="128.6" style="fill:#54C0EB;" width="173.1" height="228.6"></rect>
																			<path style="fill:#ACB3BA;" d="M238.8,111.8h-42.5c-2.4,0-4.3-1.9-4.3-4.3l0,0c0-2.4,1.9-4.3,4.3-4.3h42.5c2.4,0,4.3,1.9,4.3,4.3
																				l0,0C243.1,109.9,241.2,111.8,238.8,111.8z"></path>
																			<circle style="fill:#2B3B4E;" cx="278.4" cy="109.3" r="9.7"></circle>
																			<circle style="fill:#ACB3BA;" cx="217.5" cy="385.6" r="17.4"></circle>
																			<path style="fill:#FF7058;" d="M372,309H220.8c-12.3,0-22.3-10-22.3-22.3v-93.6c0-12.3,10-22.3,22.3-22.3h151.3
																				c12.3,0,22.3,10,22.3,22.3v93.6C394.4,299,384.4,309,372,309z"></path>
																			<path style="fill:#F1543F;" d="M387.9,302.4c-4,4.1-9.7,6.6-15.9,6.6H220.8c-6.2,0-11.9-2.6-15.9-6.6l62.5-62.5l29-29l29,29
																				L387.9,302.4z"></path>
																			<path style="fill:#E6E9EE;" d="M387.9,177.4l-62.5,62.5l-13.2,13.2c-8.7,8.7-22.9,8.7-31.7,0l-13.2-13.2l-62.5-62.5
																				c4-4.1,9.7-6.6,15.9-6.6h151.2C378.2,170.8,383.9,173.3,387.9,177.4z"></path>
																			</svg></a> -->
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
													<div class="px-4" style="border-radius: 10px;padding-bottom: 14px;box-shadow: 0 5px 10px #00002947;">
														<div class="row">
															<label class="col-lg-12 col-form-label fw-bold fs-5 text-center">Loan Information</label>
															<!-- <label class="col-lg-5 col-form-label text-center fw-semibold fs-6">
															<span style="background-color:<?php echo $loan_status->color_code; ?>;border-radius: 8px;padding: 5px 15px 5px 15px;"><?php echo $loan_status->loan_stage; ?></span>
															</label> -->
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
							                    $e = $redemp_details->RETURNDATE;
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
							                    $e = $redemp_details->RETURNDATE;
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
											$vCalcDate=$redemp_details->RETURNDATE;
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
															 <label class="col-lg-4 col-form-label fw-bold fs-6"><!-- 22-02-2023 --></label> 															<div class="col-lg-6" title="Principal Amount">
																<label class="col-form-label"><i class="fas fa-money-bill-wave fs-4"></i>&emsp;</span></label>
																<label class="col-form-label fw-bold fs-2"><?php echo $loan_details->AMOUNT; ?> </label>
															</div>
															<div class="col-lg-2" title="Pledge Items Count">
																<a href="javascript:;"><i class="fas fa-list-ol fa-spin fs-4" title="Pledge Items Count" data-bs-toggle="modal" data-bs-target="#kt_modal_pledge_items"></i></a>
																<label class="col-form-label fw-bold fs-4"><?php echo count((array)$pledge_details); ?></label>
															</div>
															<div class="col-lg-4" title="Weight">
																<label class="col-form-label"><span><i class="fas fa-balance-scale fs-4"></i></span>&emsp;</label>
																<label class="col-form-label fw-bold fs-4"><?php echo $loan_details->NETWEIGHT; ?></label>
															</div>
															<div class="col-lg-4 fv-row mt-4">
																<div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url(assets/gallery/1.jpg)">
																	<div class="image-input-wrapper"  style="background-image: url(assets/gallery/1.jpg)">
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
															</div>
															<div class="col-lg-8">
																<!-- <div class="row">
																	<div class="col-lg-12">
																		<label class="fw-semibold fs-6">Ren.No &emsp;</label>
																		<label class="fw-bold fs-5" id="rene_no">-</label>
																	</div>
																</div> -->
																<!-- <div class="row">
																	<label class="col-lg-6 col-form-label fw-semibold fs-6">Last Rcpt Count & Date</label>
																	<label class="col-lg-2 col-form-label fw-bold fs-6">1</label>
																	<label class="col-lg-4 col-form-label fw-bold fs-6">18-03-2023</label>
																</div> -->
																<div class="row">
																	<table>
																		<thead class="fw-bold fs-6 text-center">
																			<td class="col-lg-4">Actual</td>
																			<td class="col-lg-4">Paid
																				<a href="javascript:;"><i class="fas fa-receipt fa-spin fs-4" title="Payment History" data-bs-toggle="modal" data-bs-target="#kt_modal_receipt_amount_history"></i></a></td>
																			<td class="col-lg-4">Balance</td>
																		</thead>
																		<tbody class="fw-semibold fs-6 text-center">
																							<tr>
																								<td class="col-lg-4">
																									<span>Pri : </span>
																									<span id="r_loan_principal"><?php echo $vLoanAmount;?></span>
																									<input type="hidden" name="txt_hidden_loan_principal" id="txt_hidden_loan_principal" value="0">
																								</td>
																								<td class="col-lg-4" id="r_paid_principal"><?php echo $txtPaidPrincipal;?></td><input type="hidden" name="txt_hidden_paid_principal" id="txt_hidden_paid_principal" value="0">

																								<td class="col-lg-4" id="r_bal_principal"><?php $pbal=$vLoanAmount-$txtPaidPrincipal;echo $pbal; ?></td>
																								<input type="hidden" name="txt_hidden_bal_principal" id="txt_hidden_bal_principal" value="0">
																							</tr>
																							<tr>
																								<td class="col-lg-4">
																									<span>Int : </span>
																									<span id="r_loan_interest"><?php echo $vTotalInterest;?></span>

																									<input type="hidden" name="txt_hidden_loan_interest" id="txt_hidden_loan_interest" value="0">
																								</td>
																								<td class="col-lg-4" id="r_paid_interest"><?php echo $txtPaidInterest;?></td>
																								<input type="hidden" name="txt_hidden_paid_interest" id="txt_hidden_paid_interest" value="0">
																								<td class="col-lg-4" id="r_bal_interest"><?php $ibal= $vTotalInterest-$txtPaidInterest; echo $ibal ?></td>
																								<input type="hidden" name="txt_hidden_bal_interest" id="txt_hidden_bal_interest" value="0">
																							</tr>
																							<tr>
																								<td class="col-lg-4 fw-bold fs-5">
																									<span>Tot : </span>
																									<span id="r_actual_total"><?php echo $vLoanAmount+$vTotalInterest; ?> </span>
																									<input type="hidden" name="txt_hidden_actual_total" id="txt_hidden_actual_total" value="0">
																								</td>
																								<td class="col-lg-4 fw-bold fs-5" id="r_paid_total"><?php echo $txtPaidPrincipal+$txtPaidInterest; ?></td><input type="hidden" name="txt_hidden_paid_total" id="txt_hidden_paid_total" value="0">
																								<td class="col-lg-4 fw-bold fs-5" id="r_bal_total"><?php echo $pbal+$ibal; ?></td><input type="hidden" name="txt_hidden_bal_total" id="txt_hidden_bal_total" value="0">
																							</tr>
																						</tbody>
																	</table>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
											<!-- </div> -->
											<!-- Customer Close Start -->
											<div id="cus_cl" style="display: <?php echo ($loan_details->CLOSING_STATUS=='CUSTOMER_CLOSE')?'block':'none'; ?>">
															<div class="row mt-4">
																<label class="col-form-label fw-bold fs-2">Customer Close</label>
															</div>
															<div class="row mt-4">
																<label class="col-form-label fw-bold fs-2">Verification Images</label>
																<div class="col-lg-6">
																	<div class="row">
																		<div class="col-lg-4">
																			<div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url('<?php echo base_url();?>assets/images/Party.jpg')">
																				<div class="image-input-wrapper w-125px h-125px" style="background-image: url(<?php echo base_url();?>assets/images/Party.jpg)"></div>
																				<label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" data-kt-initialized="1">
																					<i class="fa fa-pencil" aria-hidden="true"></i>
																					<!-- <a href="#" class="menu-link flex-stack px-3" data-bs-toggle="modal" data-bs-target="#kt_modal_party_camera" tabindex="11"><i class="fa fa-camera" aria-hidden="true"></i></a> -->
																					<input type="file" name="cust_cls_party" accept=".png, .jpg, .jpeg">
																					<input type="hidden" name="cust_cls_party_remove">
																				</label>
																				<span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" data-kt-initialized="1">
																					<i class="bi bi-x fs-2"></i>
																				</span>
																				<span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" data-kt-initialized="1">
																					<i class="bi bi-x fs-2"></i>
																				</span>
																			</div>
																		</div>
																		<div class="col-lg-4">
																			<div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url('<?php echo base_url();?>assets/images/Jewel.jpg')">
																				<div class="image-input-wrapper w-125px h-125px" style="background-image: url(<?php echo base_url();?>assets/images/Jewel.jpg)"></div>
																				<label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" data-kt-initialized="1">
																					<i class="fa fa-pencil" aria-hidden="true"></i>
																					<!-- <a href="#" class="menu-link flex-stack px-3" data-bs-toggle="modal" data-bs-target="#kt_modal_jewel_camera" tabindex="11"><i class="fa fa-camera" aria-hidden="true"></i></a> -->
																					<input type="file" name="cust_cls_jewel" accept=".png, .jpg, .jpeg">
																					<input type="hidden" name="cust_cls_jewel_remove">
																				</label>
																				<span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" data-kt-initialized="1">
																					<i class="bi bi-x fs-2"></i>
																				</span>
																				<span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" data-kt-initialized="1">
																					<i class="bi bi-x fs-2"></i>
																				</span>
																			</div>
																		</div>
																		<div class="col-lg-4">
																			<div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url('<?php echo base_url();?>assets/images/Document.jpg')">
																				<div class="image-input-wrapper w-125px h-125px" style="background-image: url(<?php echo base_url();?>assets/images/Document.jpg)"></div>
																				<label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" data-kt-initialized="1">
																					<!-- <a href="#" class="menu-link flex-stack px-3" data-bs-toggle="modal" data-bs-target="#kt_modal_doc_camera" tabindex="11"><i class="fa fa-camera" aria-hidden="true"></i></a> -->
																					<i class="bi bi-pencil-fill fs-7"></i>
																					<input type="file" name="cust_cls_document" accept=".png, .jpg, .jpeg">
																					<input type="hidden" name="cust_cls_document_remove">
																				</label>
																				<span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" data-kt-initialized="1">
																					<i class="bi bi-x fs-2"></i>
																				</span>
																				<span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" data-kt-initialized="1">
																					<i class="bi bi-x fs-2"></i>
																				</span>
																			</div>
																			<textarea hidden="hidden" name="cus_cls_party_img_data" id="cus_cls_party_img_data"></textarea>
																		</div>
																	</div>
																</div>
																<div class="col-lg-6">
																	<div class="row">
																		<label class="col-lg-2 col-form-label fw-semibold fs-6">Customer Rating</label>
																		<div class="col-lg-4 fv-row fv-plugins-icon-container">
																			<select class="form-select form-select-solid" data-control="select2" data-hide-search="true" name="cus_cls_rating" id="cus_cls_rating">
																				<option value="">Select Rating</option>
																				<option value="3" selected>Good</option>
																				<option value="2">Average</option>
																				<option value="1">Bad</option>
																			</select>
																		</div>
																		<label class="col-lg-2 col-form-label fw-semibold fs-6">M.Points Add</label>
																		<div class="col-lg-4 fv-row fv-plugins-icon-container">
																			<input type="text" name="cus_cls_m_points_ad" id="cus_cls_m_points_ad" class="form-control form-control-lg1 form-control-solid" value="30">
																			<div class="fv-plugins-message-container invalid-feedback"></div>
																		</div>
																	</div>
																</div>
															</div>
														</div>
											<!-- Customer Close End -->
											
											<!-- Company Close Start -->
											<div id="cmy_cl" style="display: <?php echo ($loan_details->CLOSING_STATUS=='COMPANY_CLOSE')?'block':'none'; ?>">
												<div class="row mt-4">
													<label class="col-form-label fw-bold fs-2">Company Close</label>
													<label class="col-lg-2 col-form-label fw-semibold fs-6">Customer Rating</label>
													<div class="col-lg-2 fv-row fv-plugins-icon-container">
														<select class="form-select form-select-solid" data-control="select2" data-hide-search="true" name="cmp_cls_rating" id="cmp_cls_rating">
															<!-- <option value="">Select Rating</option> -->
															<option value="3" selected>Good</option>
															<option value="2">Average</option>
															<option value="1">Bad</option>
														</select>
													</div>
													<label class="col-lg-2 col-form-label fw-semibold fs-6">M.Points Add</label>
													<div class="col-lg-2 fv-row fv-plugins-icon-container">
														<input type="text" name="cmp_cls_m_points_ad" id="cmp_cls_m_points_ad" class="form-control form-control-lg1 form-control-solid" value="30">
														<div class="fv-plugins-message-container invalid-feedback"></div>
													</div>
												</div>
											</div>	
											<!-- Company Close End -->
										
											<!-- Customer Sale Start -->
											<div id="cus_sl" style="display: <?php echo ($loan_details->CLOSING_STATUS=='CUSTOMER_SALE')?'block':'none'; ?>">
												<div class="row mt-4">
													<label class="col-form-label fw-bold fs-2">Customer Sale</label>
													
												</div>
												
												<div class="row mt-4">
													<!-- <label class="col-form-label fw-bold fs-2">Verification Images</label> -->
													<div class="col-lg-6">
														<div class="row">
															<div class="col-lg-4">
																<div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url('<?php echo base_url();?>assets/images/Party.jpg')">
																	<div class="image-input-wrapper w-125px h-125px" style="background-image: url(<?php echo base_url();?>assets/images/Party.jpg)"></div>
																	<label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" data-kt-initialized="1">
																		<!-- <i class="fas fa-camera fs-6" data-bs-toggle="modal" data-bs-target="#kt_modal_camera"></i> -->
																		<i class="bi bi-pencil-fill fs-7"></i>
																		<input type="file" name="cust_sale_party" accept=".png, .jpg, .jpeg">
																		<input type="hidden" name="cust_sale_party_remove">
																	</label>
																	<span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" data-kt-initialized="1">
																		<i class="bi bi-x fs-2"></i>
																	</span>
																	<span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" data-kt-initialized="1">
																		<i class="bi bi-x fs-2"></i>
																	</span>
																</div>
																<textarea hidden="hidden" name="cus_sal_party_img_data" id="cus_sal_party_img_data"></textarea>
															</div>
															<div class="col-lg-4">
																<div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url('<?php echo base_url();?>assets/images/Jewel.jpg')">
																	<div class="image-input-wrapper w-125px h-125px" style="background-image: url(<?php echo base_url();?>assets/images/Jewel.jpg)"></div>
																	<label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" data-kt-initialized="1">
																		<!-- <i class="fas fa-camera fs-6" data-bs-toggle="modal" data-bs-target="#kt_modal_camera"></i> -->
																		<i class="bi bi-pencil-fill fs-7"></i>
																		<input type="file" name="cust_sale_jewel" accept=".png, .jpg, .jpeg">
																		<input type="hidden" name="cust_sale_jewel_remove">
																	</label>
																	<span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" data-kt-initialized="1">
																		<i class="bi bi-x fs-2"></i>
																	</span>
																	<span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" data-kt-initialized="1">
																		<i class="bi bi-x fs-2"></i>
																	</span>
																</div>
																<textarea hidden="hidden" name="cus_sal_jewel_img_data" id="cus_sal_jewel_img_data"></textarea>
															</div>
															<div class="col-lg-4">
																<div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url('<?php echo base_url();?>assets/images/Document.jpg')">
																	<div class="image-input-wrapper w-125px h-125px" style="background-image: url(<?php echo base_url();?>assets/images/Document.jpg)"></div>
																	<label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" data-kt-initialized="1">
																		<!-- <i class="fas fa-camera fs-6" data-bs-toggle="modal" data-bs-target="#kt_modal_camera"></i> -->
																		<i class="bi bi-pencil-fill fs-7"></i>
																		<input type="file" name="cust_sale_document" accept=".png, .jpg, .jpeg">
																		<input type="hidden" name="cust_sale_document_remove">
																	</label>
																	<span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" data-kt-initialized="1">
																		<i class="bi bi-x fs-2"></i>
																	</span>
																	<span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" data-kt-initialized="1">
																		<i class="bi bi-x fs-2"></i>
																	</span>
																</div>
																<textarea hidden="hidden" name="cus_sal_doc_img_data" id="cus_sal_doc_img_data"></textarea>
															</div>
														</div>
													</div>
													<div class="col-lg-6">
														<div class="row">
															<label class="col-lg-2 col-form-label fw-semibold fs-6">Pur. Amt</label>
															<label class="col-lg-4 col-form-label fw-bold fs-4"><?php echo $redemp_details->PURCHASE_AMOUNT;?></label>
															<label class="col-lg-2 col-form-label fw-semibold fs-6">Bal. Amt</label>
															<label class="col-lg-4 col-form-label fw-bold fs-4"><?php echo $redemp_details->PUR_BALANCE;?></label>
															
														</div>
														<div class="row mt-6">
															<label class="col-lg-2 col-form-label fw-semibold fs-6">Cus. Rating</label>
															<div class="col-lg-4 fv-row fv-plugins-icon-container">
																<select class="form-select form-select-solid" data-control="select2" data-hide-search="true" name="cus_sal_rating" id="cus_sal_rating">
																	
																	<option value="3" selected>Good</option>
																	<option value="2">Average</option>
																	<option value="1">Bad</option>
																</select>
															</div>
															<label class="col-lg-2 col-form-label fw-semibold fs-6">M.Points Add</label>
															<div class="col-lg-4 fv-row fv-plugins-icon-container">
																<input type="text" name="cus_sal_m_points_ad" id="cus_sal_m_points_ad" class="form-control form-control-lg1 form-control-solid" value="30">
																<div class="fv-plugins-message-container invalid-feedback"></div>
															</div>
														</div>
													</div>
												</div>
											</div>
											<!-- Customer Sale End -->
											
											<!-- Multi Jewel Start -->
											<div id="mul_jwl" style="display: <?php echo ($loan_details->CLOSING_STATUS=='MULTI_JEWEL')?'block':'none'; ?>">
												<div class="row mt-4">
													<label class="col-form-label fw-bold fs-2">Multi Jewel</label>
													<label class="col-lg-12 col-form-label fw-bold fs-3 text-center">Pledge Details</label>
												</div>
												<table class="table align-middle table-hover fs-7 gy-1 gs-2" id="multi_jwl_fsd_loan">
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

														<?php foreach($pledge_details as $plist){
															if($plist['IS_REDEEM']=='Y'){
															?>
															<tr style="color: red!important;">
									            <td style="pointer-events: none;" class="ple1"><?php echo $plist['PLEDGENAME']; ?></td>
									            <td style="pointer-events: none;" class="ple1"><?php echo $plist['DESCRIPTION']; ?></td>
									            <td style="pointer-events: none;"><?php echo $plist['PURITY']; ?></td>
									            <td style="pointer-events: none;"><?php echo $plist['PURITY_PERCENT']; ?></td>
									            <td style="pointer-events: none;"><?php echo $plist['WEIGHT']; ?></td>
									            <td style="pointer-events: none;"><?php echo $plist['STONEWEIGHT']; ?></td>
									            <td style="pointer-events: none;"><?php echo $plist['LESS']; ?></td>
									            <td style="pointer-events: none;"><?php echo $plist['NETWEIGHT']; ?></td>
									            <td style="pointer-events: none;"><?php echo ($plist['IS_DAMAGE']=='Y')?'Yes':'No'; ?></td>
									            <td style="pointer-events: none;">
									            	<div class="image-input mt-2 me-6" data-kt-image-input="true">
																	<div class="image-input-wrapper w-40px h-40px"style="background-image: url(<?php echo base_url();?>assets/images/sample_jewel.jpg)"></div>
																</div>
									            </td>
									            <td><?php echo $plist['PL_ACTL_RED_PAID']; ?></td>
												    </tr>
															<?php 
															}
														} ?>
														<?php foreach ($new_pledge_details as $npd_list) {
															
														?>
														<tr >
									            <td style="pointer-events: none;" class="ple1"><?php echo $npd_list['PLEDGENAME']; ?></td>
									            <td style="pointer-events: none;" class="ple1"><?php echo $npd_list['DESCRIPTION']; ?></td>
									            <td style="pointer-events: none;"><?php echo $npd_list['PURITY']; ?></td>
									            <td style="pointer-events: none;"><?php echo $npd_list['PURITY_PERCENT']; ?></td>
									            <td style="pointer-events: none;"><?php echo $npd_list['WEIGHT']; ?></td>
									            <td style="pointer-events: none;"><?php echo $npd_list['STONEWEIGHT']; ?></td>
									            <td style="pointer-events: none;"><?php echo $npd_list['LESS']; ?></td>
									            <td style="pointer-events: none;"><?php echo $npd_list['NETWEIGHT']; ?></td>
									            <td style="pointer-events: none;"><?php echo ($npd_list['IS_DAMAGE']=='Y')?'Yes':'No'; ?></td>
									            <td style="pointer-events: none;">
									            	<div class="image-input mt-2 me-6" data-kt-image-input="true">
																	<div class="image-input-wrapper w-40px h-40px"style="background-image: url(<?php echo base_url();?>assets/images/sample_jewel.jpg)"></div>
																</div>
									            </td>
									            <td><?php echo $npd_list['PL_ACTL_RED_PAID']; ?></td>
												    </tr>
												  <?php }?>
											    </tbody>
												</table><br>
												<div class="row">
													<label class="col-lg-1 col-form-label fw-semibold fs-6">Weight</label>
													<label class="col-lg-1 col-form-label fw-bold fs-6"><?php echo $new_loan_details->WEIGHT; ?></label>
													<label class="col-lg-1 col-form-label fw-semibold fs-6">Stoneless</label>
													<label class="col-lg-1 col-form-label fw-bold fs-6"><?php echo $new_loan_details->STONELESS; ?></label>
													<label class="col-lg-1 col-form-label fw-semibold fs-6">Less</label>
													<label class="col-lg-1 col-form-label fw-bold fs-6"><?php echo $new_loan_details->LESS; ?></label>
													<label class="col-lg-1 col-form-label fw-semibold fs-6">Net.Wght</label>
													<label class="col-lg-1 col-form-label fw-bold fs-6"><?php echo $new_loan_details->NETWEIGHT; ?></label>
													<!-- <label class="col-lg-1 col-form-label fw-semibold fs-6">CurrRate</label> --><label class="col-lg-1 col-form-label fw-semibold fs-6">CurrRate</label>
													<label class="col-lg-1 col-form-label fw-bold fs-6"><?php echo $new_loan_details->CURRENTRATE; ?></label>
													<label class="col-lg-1 col-form-label fw-semibold fs-6">Purity%</label>
													<label class="col-lg-1 col-form-label fw-bold fs-6"><?php echo $new_loan_details->QUALITY; ?></label>
													<label class="col-lg-1 col-form-label fw-semibold fs-6">Gram.Val</label>
													<label class="col-lg-1 col-form-label fw-bold fs-6"><?php 
													$grm_val=$new_loan_details->CURRENTRATE*$new_loan_details->QUALITY/100;
													$purity_wgt=$new_loan_details->NETWEIGHT*$new_loan_details->QUALITY/100;
											
													$sales_rate=$new_loan_details->CURRENTRATE*$purity_wgt;
													echo $grm_val; ?></label>
													<label class="col-lg-1 col-form-label fw-semibold fs-6">SalesRate</label>
													<label class="col-lg-1 col-form-label fw-bold fs-6"><?php echo $sales_rate; ?></label>
												</div>
												<div class="row mt-4">
													<label class="col-form-label fw-bold fs-2">Verification Images</label>
													<div class="col-lg-6">
														<div class="row">
															<div class="col-lg-4">
																<div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url('<?php echo base_url();?>assets/images/Party.jpg')">
																	<div class="image-input-wrapper w-125px h-125px" style="background-image: url(<?php echo base_url();?>assets/images/Party.jpg)" id="mul_jwl_party_photo"></div>
																	<label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" data-kt-initialized="1">
																		<i class="bi bi-pencil-fill fs-7"></i>
																		<input type="file" name="mul_jwl_party" accept=".png, .jpg, .jpeg">
																		<input type="hidden" name="mul_jwl_party_remove">
																	</label>
																	<span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" data-kt-initialized="1">
																		<i class="bi bi-x fs-2"></i>
																	</span>
																	<span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" data-kt-initialized="1">
																		<i class="bi bi-x fs-2"></i>
																	</span>

																</div>
																<textarea hidden="hidden" name="mul_jwl_party_img_data" id="mul_jwl_party_img_data"></textarea>
															</div>
															<div class="col-lg-4">
																<div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url('<?php echo base_url();?>assets/images/Jewel.jpg')">
																	<div class="image-input-wrapper w-125px h-125px" style="background-image: url(<?php echo base_url();?>assets/images/Jewel.jpg)" id="mul_jwl_jewel_photo"></div>
																	<label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" data-kt-initialized="1">
																		<i class="bi bi-pencil-fill fs-7"></i>
																		<input type="file" name="mul_jwl_jewel" accept=".png, .jpg, .jpeg">
																		<input type="hidden" name="mul_jwl_jewel_remove">
																	</label>
																	<span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" data-kt-initialized="1">
																		<i class="bi bi-x fs-2"></i>
																	</span>
																	<span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" data-kt-initialized="1">
																		<i class="bi bi-x fs-2"></i>
																	</span>
																	<textarea hidden="hidden" name="mul_jwl_jewel_img_data" id="mul_jwl_jewel_img_data"></textarea>
																</div>
															</div>
															<div class="col-lg-4">
																<div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url('<?php echo base_url();?>assets/images/Document.jpg')">
																	<div class="image-input-wrapper w-125px h-125px" style="background-image: url(<?php echo base_url();?>assets/images/Document.jpg)" id="mul_jwl_doc_photo"></div>
																	<label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" data-kt-initialized="1">
																		<i class="bi bi-pencil-fill fs-7"></i>
																		<input type="file" name="mul_jwl_document" accept=".png, .jpg, .jpeg, .pdf">
																		<input type="hidden" name="mul_jwl_document_remove">
																	</label>
																	<span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" data-kt-initialized="1">
																		<i class="bi bi-x fs-2"></i>
																	</span>
																	<span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" data-kt-initialized="1">
																		<i class="bi bi-x fs-2"></i>
																	</span>
																	<textarea hidden="hidden" name="mul_jwl_doc_img_data" id="mul_jwl_doc_img_data"></textarea>
																</div>
															</div>
														</div>
													</div>
													<div class="col-lg-6">
														<div class="row">
															<label class="col-lg-2 col-form-label fw-semibold fs-6">Customer Rating</label>
															<div class="col-lg-4 fv-row fv-plugins-icon-container">
																<select class="form-select form-select-solid" data-control="select2" data-hide-search="true" name="mul_jwl_rating" id="mul_jwl_rating">
																	<option value="">Select Rating</option>
																	<option value="3" selected>Good</option>
																	<option value="2">Average</option>
																	<option value="1">Bad</option>
																</select>
															</div>
															<label class="col-lg-2 col-form-label fw-semibold fs-6">M.Points Add</label>
															<div class="col-lg-4 fv-row fv-plugins-icon-container">
																<input type="text" name="mul_jwl_m_points_ad" id="mul_jwl_m_points_ad" class="form-control form-control-lg1 form-control-solid" value="30">
																<div class="fv-plugins-message-container invalid-feedback"></div>
															</div>
														</div>
													</div>
												</div>
											</div>
											<!-- Multi Jewel End -->
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
				<?php  $this->load->view("footer");?>
				</div>
				<!--end::Wrapper-->
			</div>
			<!--end::Page-->
		</div>
		<!--end::Root-->
		<!--begin::Modal - add loan view individual pledge item-->
		<div class="modal fade" id="kt_modal_pledge_items" tabindex="-1" aria-hidden="true">
			<!--begin::Modal dialog-->
			<div class="modal-dialog modal-xl">
				<!--begin::Modal content-->
				<div class="modal-content rounded">
					<!--begin::Modal header-->
					<div class="modal-header justify-content-end border-0 pb-0">
						<!--begin::Close-->
						<div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
							<!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
							<span class="svg-icon svg-icon-1">
								<svg width="24" height="24" viewBox="0 0 24 24" fill="none"
									xmlns="http://www.w3.org/2000/svg">
									<rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1"
										transform="rotate(-45 6 17.3137)" fill="currentColor" />
									<rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)"
										fill="currentColor" />
								</svg>
							</span>
							<!--end::Svg Icon-->
						</div>
						<!--end::Close-->
					</div>
					<!--end::Modal header-->
					<!--begin::Modal body-->
					<!--begin::Modal body-->
					<div class="modal-body pt-0 pb-15 px-5 px-xl-20">
						<!--begin::Heading-->
						<div class="mb-13 text-center">
							<h1 class="mb-3">Pledge Item</h1>
						</div>
						<div class="row">
          		<!-- <label class="col-form-label fw-bold fs-5">Pledge Items</label> -->
          		<table class="table align-middle table-row-dashed table-striped table-hover fs-7 gy-1 gs-2" id="view_redemp_pledge_item">
								<thead>
									<tr class="text-start text-muted fw-bold fs-7 gs-0">
										<th class="min-w-50px">Sno</th>
				            <th class="min-w-100px">Item-Sub Item</th>
				            <th class="min-w-50px">Quality</th>
				            <th class="min-w-50px">Purity(%)</th>
				            <th class="min-w-80px">Weight(gms)</th>
				            <th class="min-w-50px">St.Wgt(gms)</th>
				            <th class="min-w-50px">Less(gms)</th>
				            <th class="min-w-80px">Nt Wgt(gms)</th>
				            <th class="min-w-50px">Img</th>
				            <!-- <th class="min-w-50px">Status</th>
				            <th class="min-w-50px">RP.No</th>
				            <th class="min-w-50px">Bank</th> -->
									</tr>
								</thead>
								<tbody class="text-gray-600 fw-semibold">
								<?php echo $pl_tbody;?>
							   </tbody>
							   <tfoot>
									<tr class="text-start text-muted fw-bold fs-6 gs-0">
										<?php echo $pl_tfoot;?>
									</tr>
								</tfoot>
							</table>
          	</div>
          	<div class="row">
							<label class="col-lg-1 col-form-label fw-semibold fs-6">Weight</label>
							<label class="col-lg-1 col-form-label fw-bold fs-6"><?php echo $loan_details->WEIGHT;?></label>
							<label class="col-lg-1 col-form-label fw-semibold fs-6">Stoneless</label>
							<label class="col-lg-1 col-form-label fw-bold fs-6"><?php echo $loan_details->STONELESS;?></label>
							<label class="col-lg-1 col-form-label fw-semibold fs-6">Less</label>
							<label class="col-lg-1 col-form-label fw-bold fs-6"><?php echo $loan_details->LESS;?></label>
							<label class="col-lg-1 col-form-label fw-semibold fs-6">Net.Wght</label>
							<label class="col-lg-1 col-form-label fw-bold fs-6"><?php echo $loan_details->NETWEIGHT;?></label>
							<label class="col-lg-1 col-form-label fw-semibold fs-6">CurrRate</label>
							<label class="col-lg-1 col-form-label fw-bold fs-6"><?php echo $loan_details->CURRENTRATE;?></label>
							<label class="col-lg-1 col-form-label fw-semibold fs-6">Purity%</label>
							<label class="col-lg-1 col-form-label fw-bold fs-6"><?php echo $loan_details->QUALITY;?></label>
						</div>
						<div class="row">
							<label class="col-lg-1 col-form-label fw-semibold fs-6">Gram.Val</label>
							<label class="col-lg-1 col-form-label fw-bold fs-6"><?php 
							$grm_val=$loan_details->CURRENTRATE*$loan_details->QUALITY/100;
							$purity_wgt=$loan_details->NETWEIGHT*$loan_details->QUALITY/100;
					
							$sales_rate=$loan_details->CURRENTRATE*$purity_wgt;
							echo $grm_val;?></label>
							<label class="col-lg-1 col-form-label fw-semibold fs-6">SalesRate</label>
							<label class="col-lg-1 col-form-label fw-bold fs-6"><?php echo $sales_rate;?></label><!-- 
							<label class="col-lg-1 col-form-label fw-semibold fs-6" style="color: #1a21e3 !important;font-weight: 600 !important;">H/L Bal</label>
							<label class="col-lg-1 col-form-label fw-bold fs-5" style="color: #1a21e3 !important;font-weight: 600 !important;">5000.00</label> -->
						</div>
						<!--end::Modal body-->
					</div>

				</div>
				<!--end::Modal content-->
			</div>
		</div>
		<!--end::add loan view individual pledge item-->
		<!--begin::Modal - kt_modal_receipt_amount_history-->
		<div class="modal fade" id="kt_modal_receipt_amount_history" tabindex="-1" aria-hidden="true">
			<!--begin::Modal dialog-->
			<div class="modal-dialog modal-lg">
				<!--begin::Modal content-->
				<div class="modal-content rounded">
					<!--begin::Modal header-->
					<div class="modal-header justify-content-end border-0 pb-0">
						<!--begin::Close-->
						<div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
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
						<div class="mb-3 text-center">
							<h1 class="mb-3">Payment History</h1>
						</div>
						<!--end::Heading-->
						<!--end::Heading-->	
						<div class="row">
						<label class="col-lg-2 col-form-label fw-semibold fs-6">Loan Date</label>
							<label class="col-lg-2 col-form-label fw-bold fs-4"><?php echo $loan_details->ENDATE;?></label>
							<label class="col-lg-2 col-form-label fw-semibold fs-6">Loan Amount</label>
							<label class="col-lg-2 col-form-label fw-bold fs-4"><?php echo $loan_details->AMOUNT;?></label>
							<label class="col-lg-2 col-form-label fw-semibold fs-6">Int Type</label>
							<label class="col-lg-2 col-form-label fw-bold fs-4"><?php echo $loan_details->INTERESTTYPE;?></label>

							<table class="table align-middle table-row-dashed table-striped table-hover fs-7 gy-4 gs-2" id="add_receipt_payment_history">
								<thead>
									<tr class="text-start text-muted fw-bold fs-7 gs-0">
										<!--<th class="min-w-25px">Sno</th>-->
							            <th class="min-w-80px">Exp.Date</th>
							            <th class="min-w-100px">Redemp Date</th>
							            <th class="min-w-25px">Int %</th>
							            <th class="min-w-80px">Prin Amt</th>
							            <th class="min-w-80px">Int Amt</th>
							            <th class="min-w-80px">Paid Amt</th>
							            <th class="min-w-80px">Bal Amt</th>
									</tr>
								</thead>
								<tbody class="text-gray-600 fw-semibold">
									<?php echo $vIntStr;?>					
							    </tbody>
							</table>
						</div>	
						<!--end::Modal body-->
					</div>
					<!--end::Modal content-->
				</div>
				<!--end::Modal dialog-->
			</div>
			<!--end::Modal - kt_modal_verify_membership_card_receiptt-->
		</div>
		<!--end::Modal - kt_modal_receipt_amount_history-->

		<!--begin::Modal - view payment -->
		<div class="modal fade" id="kt_modal_verify_membership_card" tabindex="-1" aria-hidden="true">
			<!--begin::Modal dialog-->
			<div class="modal-dialog modal-md">
				<!--begin::Modal content-->
				<div class="modal-content rounded">
					<!--begin::Modal header-->
					<div class="modal-header justify-content-end border-0 pb-0">
						<!--begin::Close-->
						<div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
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
						<div class="mb-13 text-center">
							<h1 class="mb-3">Verify Membership Card</h1>
						</div>
						<!--end::Heading-->
						<!--end::Heading-->					
						<div class="row">
							<label class="col-lg-12 col-form-label fw-bold fs-5"><i class="fa fa-address-card fs-5" aria-hidden="true" title="Card No"></i>&emsp;1234-5678-9123-1234
							</label>
							<label class="col-lg-4 col-form-label fw-bold fs-6" name="" id="" ><span style="background-color:#FFAA00;border-radius: 8px;padding: 5px 15px 5px 15px;">Gold</span></label>
							<label class="col-lg-4 col-form-label fw-bold fs-5" name="" id=""><i class="fa-solid fa-coins fs-5" title="Points"></i>&emsp;10052</label>
						</div>
						<div class="row">
							<label class="col-lg-4 col-form-label fw-semibold fs-6">Scan Here</label>
							<div class="col-lg-8 fv-row fv-plugins-icon-container">
								<input type="text" class="form-control form-control-lg form-control-solid" placeholder="Scan Here" >
								<div class="fv-plugins-message-container invalid-feedback"></div>
							</div>
						</div>
						<div class="row">
							<label class="col-lg-8 col-form-label fw-bold fs-6 text-end" name="" id="" >
								<!-- <span style="background-color:#f1416c;border-radius: 8px;padding: 5px 15px 5px 15px;color: white;">Not Matched...</span> -->
								<!-- <span style="background-color:#50cd89;border-radius: 8px;padding: 5px 15px 5px 15px;">Verifying...</span> -->
								<span style="background-color:#50cd89;border-radius: 8px;padding: 5px 15px 5px 15px;">Matched...</span>
							</label>
							<div class="col-lg-4 d-flex justify-content-end">
								<button class="btn btn-sm btn-outline btn-outline-solid btn-outline-warning btn-active-light-primary me-2" data-bs-toggle="modal" data-bs-target="#kt_modal_verify_membership_card">Verify</button>
							</div>
						</div>
						<div class="d-flex justify-content-end mt-6 px-9">
							<button type="reset" class="btn btn-secondary me-3" data-bs-dismiss="modal">Cancel</button>
							<button type="submit" class="btn btn-primary">Ok</button>
						</div>
						<!--end::Modal body-->
					</div>
					<!--end::Modal content-->
				</div>
				<!--end::Modal dialog-->
			</div>
			<!--end::Modal - view payment-->
		</div>

		<div class="modal fade" id="kt_modal_verify_mobile_no" tabindex="-1" aria-hidden="true">
			<!--begin::Modal dialog-->
			<div class="modal-dialog modal-md">
				<!--begin::Modal content-->
				<div class="modal-content rounded">
					<!--begin::Modal header-->
					<div class="modal-header justify-content-end border-0 pb-0">
						<!--begin::Close-->
						<div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
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
						<div class="mb-13 text-center">
							<h1 class="mb-3">Verify Mobile No</h1>
						</div>
						<!--end::Heading-->
									
						<div class="row">
							<label class="col-lg-12 col-form-label fw-bold fs-5"><i class="fa fa-mobile-android-alt fs-5" aria-hidden="true" title="Mobile No"></i>&emsp;<span id="pop_mobile_no"></span>
							</label><br>
							<label class="form-check form-check-inline form-check-solid is-invalid">
								<input class="form-check-input" name="pop_mobile_no_is_change" type="checkbox" id="pop_mobile_no_is_change" onclick="change_mobile();">
								<span class="col-form-label fw-semibold fs-6">Change Mobile Number</span>
							</label>
						</div>
						<div class="row" id="div_change_mobile_no" style="display: none;">
							<div class="row">
								<label class="col-lg-3 col-form-label fw-semibold fs-6">Mobile No</label>
								<div class="col-lg-5 fv-row fv-plugins-icon-container">
									<input type="text" class="form-control form-control-lg form-control-solid" placeholder="Enter Mobile no" name="new_mobile_no" id="new_mobile_no" maxlength="10" minlength="10" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">
									<div class="fv-plugins-message-container invalid-feedback"></div>
								</div>
								<!-- <div class="col-lg-8 fv-row fv-plugins-icon-container"></div> -->
								<div class="col-lg-4 d-flex justify-content-end">
									<button class="btn btn-sm btn-outline btn-outline-solid btn-outline-warning btn-active-light-primary me-2" onclick="update_no();" >Change</button>
								</div>
							</div>
						</div>
						<div class="row">
							<!--generated_otp-->
							<span style="border-radius: 8px;padding: 5px 15px 5px 15px;color: #e41f7a; display: none;" id="generated_otp"> </span>
							<input type="hidden" name="generated_otp_hidden" id="generated_otp_hidden" value="">
						</div>
						<div class="row"  id="div_verify_mobile_no" >
							<div class="row">

							<label class="col-lg-6 col-form-label fw-semibold fs-6">OTP from Customer</label>
							<div class="col-lg-6 fv-row fv-plugins-icon-container">
								<input type="text" class="form-control form-control-lg form-control-solid" placeholder="Enter code" name="check_otp" id="check_otp">
								<div class="fv-plugins-message-container invalid-feedback"></div>
							</div>
						<!-- </div>
						<div class="row"> -->
						<!-- <div class="row"> -->
							<div class="d-flex justify-content-center">
								<label class="col-form-label fw-bold fs-6 text-center" name="status" id="status" >
									<span style="background-color:#f1416c;border-radius: 8px;padding: 5px 15px 5px 15px;color: white; display: none;" id="mb_err"> Not Matched...</span>
									<span style="background-color:#50cd89;border-radius: 8px;padding: 5px 15px 5px 15px;display: none;"  id="mb_success">Verified</span>
									<!-- <span style="background-color:#50cd89;border-radius: 8px;padding: 5px 15px 5px 15px;">Matched...</span> -->
								</label>
							</div>
						<!-- </div> -->
						
						<div class="row">

							<div class="col-lg-12 d-flex justify-content-center">
								<button class="btn btn-sm btn-outline btn-outline-solid btn-outline-warning btn-active-light-primary me-2" onclick="generate_otp();" id="generate_btn">Send OTP to Verify</button>
								<button class="btn btn-sm btn-outline btn-outline-solid btn-outline-warning btn-active-light-primary me-2" onclick="check_mobile();" id="verify_btn" style="display: none;">Verify</button>
								<button type="reset" id="cancel_btn" class="btn btn-secondary me-3" data-bs-dismiss="modal">Cancel</button>
							</div>
							</div>
						</div>
						<!-- <div class="d-flex justify-content-end mt-6 px-9">
							<button type="reset" class="btn btn-secondary me-3" data-bs-dismiss="modal">Cancel</button> -->
							<!-- <button class="btn btn-primary">Ok</button> -->
						<!-- </div> -->
						<!--end::Modal body-->
					</div>
					<!--end::Modal content-->
				</div>
				<!--end::Modal dialog-->
			</div>
			<!--end::Modal - view payment-->
		</div>
		<?php  $this->load->view("script");?>

		<script>
	$("#view_receipt_payment_history").DataTable({
		//"aaSorting":[],
		"sorting":false,
		"paging": false,
		// "responsive": true,
		 "language": {
		  "lengthMenu": "Show _MENU_",
		 },
		 "dom":
		  "<'row'" +
		  "<'col-sm-6 d-flex align-items-center justify-conten-start'l>" +
		  ">" +

		  "<'table-responsive'tr>" +

		  "<'row'" +
		  "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
		  // "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
		  ">"
		});
	$('#view_receipt_payment_history').wrap('<div class="dataTables_scroll" />');
</script>
		<script>
	$("#view_redemp_pledge_item").DataTable({
		//"aaSorting":[],
		"sorting":false,
		"paging": false,
		// "responsive": true,
		 "language": {
		  "lengthMenu": "Show _MENU_",
		 },
		 "dom":
		  "<'row'" +
		  "<'col-sm-6 d-flex align-items-center justify-conten-start'l>" +
		  ">" +

		  "<'table-responsive'tr>" +

		  "<'row'" +
		  "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
		  // "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
		  ">"
		});
	$('#view_redemp_pledge_item').wrap('<div class="dataTables_scroll" />');
</script>
<script>
	      $("#view_redemp_pledge_item").kendoTooltip({
	        filter: "td",
	        show: function(e){
	          if(this.content.text() !=""){
	            $('[role="tooltip"]').css("visibility", "visible");
	          }
	        },
	        hide: function(){
	          $('[role="tooltip"]').css("visibility", "hidden");
	        },
	        content: function(e){
	          var element = e.target[0];
	          if(element.offsetWidth < element.scrollWidth){
	            return e.target.text();
	          }else{
	            return "";
	          }
	        }
	      })
	</script>
		<script>
	$("#add_receipt_payment_history").DataTable({
		//"aaSorting":[],
		"sorting":false,
		"paging": false,
		// "responsive": true,
		 "language": {
		  "lengthMenu": "Show _MENU_",
		 },
		 "dom":
		  "<'row'" +
		  "<'col-sm-6 d-flex align-items-center justify-conten-start'l>" +
		  ">" +

		  "<'table-responsive'tr>" +

		  "<'row'" +
		  "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
		  "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
		  ">"
		});
	$('#add_receipt_payment_history').wrap('<div class="dataTables_scroll" />');
</script>
		<script>
			function change_mobile()
			{
				if(document.getElementById('pop_mobile_no_is_change').checked==true)
				{
					document.getElementById('div_change_mobile_no').style.display="block";
					document.getElementById('div_verify_mobile_no').style.display="none";
					document.getElementById('generated_otp').style.display="none";
				}
				else
				{
					document.getElementById('div_change_mobile_no').style.display="none";
					document.getElementById('div_verify_mobile_no').style.display="block";	
					// document.getElementById('generated_otp').style.display="none";
				}
			}
		</script>
	<script>
	      $("#kt_datatable_dom_positioning").kendoTooltip({
	        filter: "td",
	        show: function(e){
	          if(this.content.text() !=""){
	            $('[role="tooltip"]').css("visibility", "visible");
	          }
	        },
	        hide: function(){
	          $('[role="tooltip"]').css("visibility", "hidden");
	        },
	        content: function(e){
	          var element = e.target[0];
	          if(element.offsetWidth < element.scrollWidth){
	            return e.target.text();
	          }else{
	            return "";
	          }
	        }
	      })
	</script>
	<script>
			$("#kt_datepicker_From").flatpickr({
				dateFormat: "d-m-Y",
			});
			$("#kt_datepicker_To").flatpickr({
				dateFormat: "d-m-Y",
			});
			$("#kt_datepicker_new_loan_date").flatpickr({
				dateFormat: "d-m-Y",
			});
			$("#kt_datepicker_edit_loan_date").flatpickr({
				dateFormat: "d-m-Y",
			});
			$("#kt_datepicker_view_loan_date").flatpickr({
				dateFormat: "d-m-Y",
			});
	</script>
	</body>
	<!--end::Body-->
</html>