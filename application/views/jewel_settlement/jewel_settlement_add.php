<?php $this->load->view("common");?>
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
									<h1 class="d-flex align-items-center text-dark fw-bold my-1 fs-3">Jewel Final Settlement
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
												<form method="POST" id="frm_js_submit" action="<?php echo base_url(); ?>jewelsettlement/jewelsettelement_save" enctype="multipart/form-data" onsubmit=" return fsd_validation();" >
														<div class="row">
															<div class="col-lg-12">
																<!-- <div class="px-4" style="border-radius: 10px;padding-bottom: 10px;box-shadow: 0 5px 10px #00002947;"> -->
																	<div class="row">
																		<div class="col-lg-3">
																			<label class="col-form-label fw-Semibold fs-6">Loan No</label>&emsp;
																			<label class="col-form-label fw-bold fs-4"><?php echo $loan_details->BILLNO;?>  <?php echo $bj_status;?></label>
																			<input type="hidden" name="bill_no" id="bill_no" value="<?php echo $loan_details->BILLNO;?>">
																		</div>
																		<label class="col-lg-1 col-form-label required fw-semibold fs-6">Date</label>
																		<div class="col-lg-2 fv-row">
																			<div class="d-flex align-items-center">
																				<span class="svg-icon position-absolute ms-4 svg-icon-2 dt">
																					<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																						<path opacity="0.3" d="M21 22H3C2.4 22 2 21.6 2 21V5C2 4.4 2.4 4 3 4H21C21.6 4 22 4.4 22 5V21C22 21.6 21.6 22 21 22Z" fill="currentColor" />
																						<path d="M6 6C5.4 6 5 5.6 5 5V3C5 2.4 5.4 2 6 2C6.6 2 7 2.4 7 3V5C7 5.6 6.6 6 6 6ZM11 5V3C11 2.4 10.6 2 10 2C9.4 2 9 2.4 9 3V5C9 5.6 9.4 6 10 6C10.6 6 11 5.6 11 5ZM15 5V3C15 2.4 14.6 2 14 2C13.4 2 13 2.4 13 3V5C13 5.6 13.4 6 14 6C14.6 6 15 5.6 15 5ZM19 5V3C19 2.4 18.6 2 18 2C17.4 2 17 2.4 17 3V5C17 5.6 17.4 6 18 6C18.6 6 19 5.6 19 5Z" fill="currentColor" />
																						<path d="M8.8 13.1C9.2 13.1 9.5 13 9.7 12.8C9.9 12.6 10.1 12.3 10.1 11.9C10.1 11.6 10 11.3 9.8 11.1C9.6 10.9 9.3 10.8 9 10.8C8.8 10.8 8.59999 10.8 8.39999 10.9C8.19999 11 8.1 11.1 8 11.2C7.9 11.3 7.8 11.4 7.7 11.6C7.6 11.8 7.5 11.9 7.5 12.1C7.5 12.2 7.4 12.2 7.3 12.3C7.2 12.4 7.09999 12.4 6.89999 12.4C6.69999 12.4 6.6 12.3 6.5 12.2C6.4 12.1 6.3 11.9 6.3 11.7C6.3 11.5 6.4 11.3 6.5 11.1C6.6 10.9 6.8 10.7 7 10.5C7.2 10.3 7.49999 10.1 7.89999 10C8.29999 9.90003 8.60001 9.80003 9.10001 9.80003C9.50001 9.80003 9.80001 9.90003 10.1 10C10.4 10.1 10.7 10.3 10.9 10.4C11.1 10.5 11.3 10.8 11.4 11.1C11.5 11.4 11.6 11.6 11.6 11.9C11.6 12.3 11.5 12.6 11.3 12.9C11.1 13.2 10.9 13.5 10.6 13.7C10.9 13.9 11.2 14.1 11.4 14.3C11.6 14.5 11.8 14.7 11.9 15C12 15.3 12.1 15.5 12.1 15.8C12.1 16.2 12 16.5 11.9 16.8C11.8 17.1 11.5 17.4 11.3 17.7C11.1 18 10.7 18.2 10.3 18.3C9.9 18.4 9.5 18.5 9 18.5C8.5 18.5 8.1 18.4 7.7 18.2C7.3 18 7 17.8 6.8 17.6C6.6 17.4 6.4 17.1 6.3 16.8C6.2 16.5 6.10001 16.3 6.10001 16.1C6.10001 15.9 6.2 15.7 6.3 15.6C6.4 15.5 6.6 15.4 6.8 15.4C6.9 15.4 7.00001 15.4 7.10001 15.5C7.20001 15.6 7.3 15.6 7.3 15.7C7.5 16.2 7.7 16.6 8 16.9C8.3 17.2 8.6 17.3 9 17.3C9.2 17.3 9.5 17.2 9.7 17.1C9.9 17 10.1 16.8 10.3 16.6C10.5 16.4 10.5 16.1 10.5 15.8C10.5 15.3 10.4 15 10.1 14.7C9.80001 14.4 9.50001 14.3 9.10001 14.3C9.00001 14.3 8.9 14.3 8.7 14.3C8.5 14.3 8.39999 14.3 8.39999 14.3C8.19999 14.3 7.99999 14.2 7.89999 14.1C7.79999 14 7.7 13.8 7.7 13.7C7.7 13.5 7.79999 13.4 7.89999 13.2C7.99999 13 8.2 13 8.5 13H8.8V13.1ZM15.3 17.5V12.2C14.3 13 13.6 13.3 13.3 13.3C13.1 13.3 13 13.2 12.9 13.1C12.8 13 12.7 12.8 12.7 12.6C12.7 12.4 12.8 12.3 12.9 12.2C13 12.1 13.2 12 13.6 11.8C14.1 11.6 14.5 11.3 14.7 11.1C14.9 10.9 15.2 10.6 15.5 10.3C15.8 10 15.9 9.80003 15.9 9.70003C15.9 9.60003 16.1 9.60004 16.3 9.60004C16.5 9.60004 16.7 9.70003 16.8 9.80003C16.9 9.90003 17 10.2 17 10.5V17.2C17 18 16.7 18.4 16.2 18.4C16 18.4 15.8 18.3 15.6 18.2C15.4 18.1 15.3 17.8 15.3 17.5Z" fill="currentColor" />
																					</svg>
																				</span>
																				<input class="form-control form-control-solid ps-12" name="kt_datepicker_new_loan_date" placeholder="Date" id="kt_datepicker_new_loan_date" value="<?php echo date("d-m-Y"); ?>"/>
																			</div>
																		</div>
																		<div class="col-lg-1">
																			<label class="col-form-label required fw-semibold fs-6">Company</label>
																		</div>
																		<div class="col-lg-2 fv-row fv-plugins-icon-container">
																			<select class="form-select form-select-solid" name="js_company" id="js_company" data-control="select2" data-hide-search="true">	
																				<option value="">Select</option>
																				<?php foreach($company_list as $clist) {?>
																				<option value="<?php echo $clist['COMPANYCODE']?>" <?php echo ($clist['COMPANYCODE']==$loan_details->COMPANYCODE)?'selected':''; ?>><?php echo $clist['COMPANYNAME'];?></option>
																				<?php }?>
																			</select>
																		</div>
																	</div>
																<!-- </div> -->
															</div>
														</div>
														<div class="row mt-4">
																<div class="col-lg-6">
																	<div class="px-4" style="border-radius: 10px;padding-bottom: 10px;box-shadow: 0 5px 10px #00002947;">
																		<label class="col-lg-12 col-form-label fw-bold fs-5 text-center">Party Basic Details</label>
																		<div class="row">
																			<div class="col-lg-6">
																				<div class="row">
																					<label class="col-lg-12 col-form-label fw-bold fs-6" id="r_no_card" name="r_no_card" style="display: <?php echo (isset($card_details))?'none':'block';?>"><i class="fa fa-address-card fs-6" aria-hidden="true" title="Card No"></i>&emsp;<a href="<?php echo base_url();?>membershipcard" target="_blank"><span style="color: red" >Click Here for<br> <b>New Membership Card</b></span></a>
																								
																								<!-- <i class="fas fa-check-circle fs-5" style="color:green;"></i> -->
																							</label>
																							<label class="col-lg-12 col-form-label fw-bold fs-6" id="r_lbl_mem_card_no" style="display: <?php echo (isset($card_details))?'block':'none';?>"><i class="fa fa-address-card fs-6" aria-hidden="true" title="Card No"  style="display: <?php echo (isset($card_details))?'block':'none';?>"></i>&emsp;<span id="r_card_no" name="r_card_no" style="display: <?php echo (isset($card_details))?'block':'none';?>"><?php echo $card_details->MEMBERSHIP_NO;?></span>
																								<span id="verify_icon" style="display: <?php echo (isset($card_details))?'block':'none';?>"><!-- <i class="fas fa-times-circle fs-5" style="color:red;"></i> -->
																								<i class="fas fa-check-circle fs-5" style="color:green;"></i>
																								</span>
																							</label>
																							<label class="col-lg-4 col-form-label fw-bold fs-6 text-center" name="r_card_type" id="r_card_type" style="display: <?php echo (isset($card_details))?'block':'none';?>" >
																								<?php 
																								if($card_details->CARD_TYPE=='Gold'){
																			                    $card_type="<span style='background-color:#ffaa00;border-radius: 8px;padding: 5px 15px 5px 15px;'>Gold</span>";
																			                  // $card_type=$card_details->CARD_TYPE;
																			                  // $card_type="gold";

																			                  }
																			                  else if($card_details->CARD_TYPE=='Silver'){
																			                    $card_type="<span style='background-color:#d2d4dc;border-radius: 8px;padding: 5px 15px 5px 15px;'>Silver</span>";
																			                  }
																			                  else if($card_details->CARD_TYPE=='Platinum')
																			                  {
																			                    $card_type="<span style='background-color:#f4fdff;border-radius: 8px;padding: 5px 15px 5px 15px;'>Platinum</span>";
																			                  }
																			                  echo $card_type;
																			                  ?>
																								</label> 
																							<label class="col-lg-4 col-form-label fw-bold fs-6" name="" id="lbl_mem_point" style="display: <?php echo (isset($card_details))?'block':'none';?>"><span id="r_card_points" name="r_card_points"><i class="fa-solid fa-coins fs-6" title="Points"></i>&emsp;<?php echo $card_details->POINTS;?></span></label>
																							
																					<label class="col-lg-12 col-form-label fw-bold fs-6 mt-2" title="Nominee">
																					<span><i class="fas fa-user-friends fs-5" title="Nominee"></i>&emsp;</span>
																					<span title="Nominee" name="r_nominee" id="r_nominee"><?php 
																					echo $nom_det;?></span></label>
																					<div class="col-lg-12" title="Rating">
																						<label class="col-form-label fw-bold fs-4">
																							<i class="fas fa-star-half-alt"></i>&emsp;
																						</label>
																						<label class="col-form-label fw-bold fs-6" name="r_rating" id="r_rating">
																						<?php 
																						if($party_details->RATING==3)
																						{
																							// echo '<b><span class="badge badge-success" style=>GOOD</span></b>';
																							echo '<span><i class="fa-solid fa-star fs-3" style="color:#50cd89;"></i>  Good</span>';
																						}
																						else if($party_details->RATING==2)
																						{
																							// echo '<b><span class="badge badge-warning">AVERAGE</span></b>';
																							echo '<span><i class="fa-solid fa-star fs-3" style="color:#ffc700;"></i> Average</span>';
																						}
																						else if($party_details->RATING==1)
																						{
																							// echo '<b><span class="badge badge-danger">BAD</span></b>';
																							echo '<span><i class="fa-solid fa-star fs-3" style="color:red;"></i> Bad</span>';
																						}
																						else
																						{
																							echo '<span><i class="fa-solid fa-star fs-3" style="color:#d2d4dc;"></i> Nil </span>';
																						}
																						?>
																					
																						</label>
																					</div>
																				</div>
																			</div>
																			<div class="col-lg-6">
																				<div class="row">
																					<label class="col-lg-12 col-form-label fw-bold fs-6" >
																						<i class="fa fa-user fs-6" aria-hidden="true" title="Last Name"></i>&emsp;<span name="r_firstname" id="r_firstname"><?php echo $party_details->NAME; ?></span></label>
																						<input type="hidden" name="r_pid" id="r_pid">
																					<label class="col-lg-12 col-form-label fw-bold fs-6">
																						<i class="fa-solid fa-location-dot fs-6" aria-hidden="true" title="Address"></i>
																					&emsp;<span  name="r_address" id="r_address"><?php
																					$village = $this->db->query("SELECT * FROM VILLAGE WHERE VILLAGEID = '".$party_details->ADDRESS2."'  ")->row();

																					$street = $this->db->query("SELECT * FROM STREET WHERE STREETID = '".$party_details->STREET_ID."'  ")->row();
																			
																					$city = $this->db->query("SELECT * FROM CITY WHERE CITYID = '".$party_details->CITY."'  ")->row();
																					 echo $street->STREETNAME.", ".$village->VILLAGENAME;?></span></label>
																					<label class="col-lg-12 col-form-label fw-bold fs-6">
																							<i class="fas fa-mobile-android-alt fs-6" aria-hidden="true" title="Mobile"></i>
																						&emsp;<span  name="r_phone_no" id="r_phone_no"><?php echo $party_details->PHONE; ?></span>
																							
																					</label>
																					<div class="col-lg-12">
																						<label class="col-form-label fw-semibold fs-2" style="color: #1a21e3 !important;font-weight: 600 !important;">H/L Bal &emsp;</label>
																						<label class="col-form-label fw-bold fs-2" style="color: #1a21e3 !important;font-weight: 600 !important;" id="lbl_hl_bal_rem"><?php echo $loan_details->HL_AMOUNT;?></label>
																					</div>
																				</div>
																			</div>
																		</div>
																		<div class="row mt-4">
																			<div class="col-lg-4 fv-row">
																				<div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url(<?php echo base_url();?>assets/images/Party.jpg)" id="div_r_party_photo">
																					<?php 
																						if($party_details->PHOTO == '')
																						{
																					?>
																					<div class="image-input-wrapper w-125px h-125px" style="background-image: url('<?php echo base_url();?>assets/images/staff_1.png')">
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
																				<div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url(<?php echo base_url();?>assets/media/svg/avatars/aadhaar_blank.png)" >
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
																				</div>
																			</div>
																			<div class="col-lg-4 fv-row">
																				<div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url(<?php echo base_url();?>assets/media/svg/avatars/signature_blank.png)">
																					<?php 
																						if($party_details->SIGNATURE == '')
																						{
																					?>
																					<div class="image-input-wrapper w-125px h-125px" style="background-image: url('<?php echo base_url();?>assets/images/Signature.jpg')">
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
																				<!-- </div> -->
																			</div>
																		</div><br>
																	</div>
																</div>
																<div class="col-lg-6">
																	<div class="px-4" style="border-radius: 10px;padding-bottom: 20px;box-shadow: 0 5px 10px #00002947;">
																		<div class="row">
																			<label class="col-lg-7 col-form-label fw-bold fs-5 text-end">Loan Information</label>
																			
																		</div>
																		<div class="row">
																			<label class="col-lg-2 col-form-label fw-semibold fs-6">Company</label>
																			<label class="col-lg-10 col-form-label fw-bold fs-6" id="r_company_name" name="r_company_name"><?php 
																			$res=$this->db->query("select * from COMPANY where COMPANYCODE='".$loan_details->COMPANYCODE."'")->row();
																			echo $res->COMPANYNAME;
																			?></label>
																			<label class="col-lg-2 col-form-label fw-semibold fs-6">Int Type</label>
																			<label class="col-lg-4 col-form-label fw-bold fs-6" id="r_interest_type" name="r_interest_type"><?php echo $loan_details->INTERESTTYPE;?></label>
																			<div class="col-lg-4" id="r_due_status"><b>
																				<?php echo $due_status;?></b>
																			</div>
																			<div class="col-lg-2">
																				
																			</div>
																			<label class="col-lg-2 col-form-label fw-semibold fs-6">Loan Date</label>
																			<label class="col-lg-4 col-form-label fw-bold fs-6" id="r_loan_date"><?php echo $loan_details->ENDATE; ?></label>
																			<label class="col-lg-2 col-form-label fw-semibold fs-6">Exp.Date</label>
																			<label class="col-lg-4 col-form-label fw-bold fs-6" id="r_expiry_date"><?php echo $vLoanLastDate;?></label>
																			<div class="col-lg-6" title="Principal Amount">
																				<label class="col-form-label"><i class="fas fa-money-bill-wave fs-4"></i>&emsp;</label>
																				<label class="col-form-label fw-bold fs-2" id="r_loan_amount"><?php echo $loan_details->AMOUNT;?></label>
																			</div>
																			<div class="col-lg-2" title="Pledge Items Count">
																				<a href="javascript:;"><i class="fas fa-list-ol fa-spin fs-4" title="Pledge Items Count" data-bs-toggle="modal" data-bs-target="#kt_modal_pledge_items"></i></a>
																				
																				<label class="col-form-label fw-bold fs-4" id="r_pledge_count"><?php 
																				echo $pledge_count;?></label>
																			</div>
																			<div class="col-lg-4" title="Weight">
																				<label class="col-form-label"><span><i class="fas fa-balance-scale fs-4"></i></span>&emsp;</label>
																				<label class="col-form-label fw-bold fs-4" id="r_net_weight"><?php 
																				echo $loan_details->NETWEIGHT;?></label>
																			</div>
																			<div class="col-lg-4 fv-row mt-6">
																				<div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url(<?php echo base_url();?>assets/media/svg/avatars/signature_blank.png)" id="div_r_item_photo">
																					<?php 
																						if($loan_details->ITEM_PHOTO == '')
																						{
																					?>
																					<div class="image-input-wrapper w-125px h-125px" style="background-image: url('<?php echo base_url();?>assets/images/Jewel.jpg')">
																					</div>
																				<?php }
																					else
																					{
																						if($loan_details->TYPE_OF_RECORD=='N')
																						{
																				?>
																				<img class="image-input-wrapper"  src="<?php echo $loan_details->ITEM_PHOTO; ?>" height="125px" width="125px" >
																					
																				<?php }
																				else
																				{?>
																					<img class="image-input-wrapper"  src="data:image/jpeg;base64,<?php echo base64_encode($loan_details->ITEM_PHOTO); ?>" height="125px" width="125px" >
																					<?php 
																				 }
																				}?>
																				</div>
																			</div>
																			<div class="col-lg-8">
																				
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
														<input type="hidden" name="close_type" id="close_type" value="<?php echo $loan_details->CLOSING_STATUS; ?>"> 
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
														<!-- Customer Close end -->
											
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
											<!-- Company Close end -->
											
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
											<!-- Customer Sale end -->
											
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
											<!-- Multi Jewel end -->
											<div class="d-flex justify-content-end mt-4">
												<button type="reset" class="btn btn-secondary me-2" data-bs-dismiss="modal">Cancel</button>
												<button type="submit" class="btn btn-primary" id="save_changes_add_new_loan">Submit</button>
											</div>
											</form>
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

		<!--begin::Modal - view capture image -->
		<div class="modal fade" id="kt_modal_party_camera" tabindex="-1" aria-hidden="true">
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
							<h1 class="mb-3">Capture Image</h1>
						</div>
						<!--end::Heading-->
						<!--end::Heading-->	
						<div class="row">
							<div class="col-lg-6">
								<div class="row">
									<div id="my_camera" style="max-height: 330px;height: 330px;width: 100%;max-width: 100%;border: 1px solid;">
										
									</div>
								</div>
								<div class="d-flex justify-content-center align-items-center mt-6">
									<div class="btn btn-primary" id="take_jewel_photo1" onclick="take_jewel_photo()">Take Jewel Photo</div>
									<button type="submit" class="btn btn-primary" id="capture" onclick="jewel_snapshot()" style="display: none;">Capture</button>
								</div>
							</div>
							<div class="col-lg-6">
								<div class="row">
									<input type="hidden" name="img_count" id="img_count" value="1">
									<div class="col-lg-4 fv-row">
										<a href="javascript:;" onclick="select_image_1();">
											<div class="image-input image-input-outline" data-kt-image-input="true" id="img_1" style="background-image: url(<?php echo base_url();?>assets/images/Jewel.jpg);">
													<div class="image-input-wrapper w-150px h-150px"   style="background-image: url(<?php echo base_url();?>assets/images/Jewel.jpg)"></div>
											</div>
											<textarea hidden="hidden" name="img_1_data" id="img_1_data"></textarea>
										</a>
									</div>
									<div class="col-lg-4 fv-row">
										<a href="javascript:;" onclick="select_image_2();">
											<div class="image-input image-input-outline" data-kt-image-input="true" id="img_2" style="background-image: url(<?php echo base_url();?>assets/images/Jewel.jpg)">
													<div class="image-input-wrapper w-150px h-150px"  style="background-image: url(<?php echo base_url();?>assets/images/Jewel.jpg)"></div>
											</div>
											<textarea hidden="hidden" name="img_2_data" id="img_2_data"></textarea>
										</a>
									</div>
									<div class="col-lg-4 fv-row">
										<a href="javascript:;" onclick="select_image_3();">
											<div class="image-input image-input-outline" data-kt-image-input="true" id="img_3" style="background-image: url(<?php echo base_url();?>assets/images/Jewel.jpg)">
													<div class="image-input-wrapper w-150px h-150px"  style="background-image: url(<?php echo base_url();?>assets/images/Jewel.jpg)"></div>
											</div>
											<textarea hidden="hidden" name="img_3_data" id="img_3_data"></textarea>
										</a>
									</div>
								</div>
								<div class="row mt-4">
									
									<div class="col-lg-4 fv-row">
										<a href="javascript:;" onclick="select_image_4();">
											<div class="image-input image-input-outline" data-kt-image-input="true" id="img_4" style="background-image: url(<?php echo base_url();?>assets/images/Jewel.jpg)">
													<div class="image-input-wrapper w-150px h-150px"  style="background-image: url(<?php echo base_url();?>assets/images/Jewel.jpg)"></div>
											</div>
											<textarea hidden="hidden" name="img_4_data" id="img_4_data"></textarea>
										</a>
									</div>
									<div class="col-lg-4 fv-row">
										<a href="javascript:;" onclick="select_image_5();">
											<div class="image-input image-input-outline" data-kt-image-input="true" id="img_5" style="background-image: url(<?php echo base_url();?>assets/images/Jewel.jpg)">
													<div class="image-input-wrapper w-150px h-150px"  style="background-image: url(<?php echo base_url();?>assets/images/Jewel.jpg)"></div>
											</div>
											<textarea hidden="hidden" name="img_5_data" id="img_5_data"></textarea>
										</a>
									</div>
									<div class="col-lg-4 fv-row">
										<a href="javascript:;" onclick="select_image_6();">
											<div class="image-input image-input-outline" data-kt-image-input="true" id="img_6" style="background-image: url(<?php echo base_url();?>assets/images/Jewel.jpg)">
													<div class="image-input-wrapper w-150px h-150px"  style="background-image: url(<?php echo base_url();?>assets/images/Jewel.jpg)"></div>
											</div>
											<textarea hidden="hidden" name="img_6_data" id="img_6_data"></textarea>
										</a>
									</div>
									<input type="hidden" name="img_selected_id" value="" id="img_selected_id" value="">
									<div class="d-flex justify-content-center align-items-center mt-13">
										<div type="submit" class="btn btn-primary" onclick="put_capture_jewel_photo()">Submit</div>
									</div>
								</div>
							</div>
						</div>
						<!--end::Modal body-->
					</div>
					<!--end::Modal content-->
				</div>
				<!--end::Modal dialog-->
			</div>
			<!--end::Modal - view payment-->
		</div>
		<!--end::Modal - view capture image for loan-->
		<!--begin::Modal - view capture image -->
		<div class="modal fade" id="kt_modal_jewel_camera" tabindex="-1" aria-hidden="true">
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
							<h1 class="mb-3">Capture Image</h1>
						</div>
						<!--end::Heading-->
						<!--end::Heading-->	
						<div class="row">
							<div class="col-lg-6">
								<div class="row">
									<div id="my_camera" style="max-height: 330px;height: 330px;width: 100%;max-width: 100%;border: 1px solid;">
										
									</div>
								</div>
								<div class="d-flex justify-content-center align-items-center mt-6">
									<div class="btn btn-primary" id="take_jewel_photo1" onclick="take_jewel_photo()">Take Jewel Photo</div>
									<button type="submit" class="btn btn-primary" id="capture" onclick="jewel_snapshot()" style="display: none;">Capture</button>
								</div>
							</div>
							<div class="col-lg-6">
								<div class="row">
									<input type="hidden" name="img_count" id="img_count" value="1">
									<div class="col-lg-4 fv-row">
										<a href="javascript:;" onclick="select_image_1();">
											<div class="image-input image-input-outline" data-kt-image-input="true" id="img_1" style="background-image: url(<?php echo base_url();?>assets/images/Jewel.jpg);">
													<div class="image-input-wrapper w-150px h-150px"   style="background-image: url(<?php echo base_url();?>assets/images/Jewel.jpg)"></div>
											</div>
											<textarea hidden="hidden" name="img_1_data" id="img_1_data"></textarea>
										</a>
									</div>
									<div class="col-lg-4 fv-row">
										<a href="javascript:;" onclick="select_image_2();">
											<div class="image-input image-input-outline" data-kt-image-input="true" id="img_2" style="background-image: url(<?php echo base_url();?>assets/images/Jewel.jpg)">
													<div class="image-input-wrapper w-150px h-150px"  style="background-image: url(<?php echo base_url();?>assets/images/Jewel.jpg)"></div>
											</div>
											<textarea hidden="hidden" name="img_2_data" id="img_2_data"></textarea>
										</a>
									</div>
									<div class="col-lg-4 fv-row">
										<a href="javascript:;" onclick="select_image_3();">
											<div class="image-input image-input-outline" data-kt-image-input="true" id="img_3" style="background-image: url(<?php echo base_url();?>assets/images/Jewel.jpg)">
													<div class="image-input-wrapper w-150px h-150px"  style="background-image: url(<?php echo base_url();?>assets/images/Jewel.jpg)"></div>
											</div>
											<textarea hidden="hidden" name="img_3_data" id="img_3_data"></textarea>
										</a>
									</div>
								</div>
								<div class="row mt-4">
									
									<div class="col-lg-4 fv-row">
										<a href="javascript:;" onclick="select_image_4();">
											<div class="image-input image-input-outline" data-kt-image-input="true" id="img_4" style="background-image: url(<?php echo base_url();?>assets/images/Jewel.jpg)">
													<div class="image-input-wrapper w-150px h-150px"  style="background-image: url(<?php echo base_url();?>assets/images/Jewel.jpg)"></div>
											</div>
											<textarea hidden="hidden" name="img_4_data" id="img_4_data"></textarea>
										</a>
									</div>
									<div class="col-lg-4 fv-row">
										<a href="javascript:;" onclick="select_image_5();">
											<div class="image-input image-input-outline" data-kt-image-input="true" id="img_5" style="background-image: url(<?php echo base_url();?>assets/images/Jewel.jpg)">
													<div class="image-input-wrapper w-150px h-150px"  style="background-image: url(<?php echo base_url();?>assets/images/Jewel.jpg)"></div>
											</div>
											<textarea hidden="hidden" name="img_5_data" id="img_5_data"></textarea>
										</a>
									</div>
									<div class="col-lg-4 fv-row">
										<a href="javascript:;" onclick="select_image_6();">
											<div class="image-input image-input-outline" data-kt-image-input="true" id="img_6" style="background-image: url(<?php echo base_url();?>assets/images/Jewel.jpg)">
													<div class="image-input-wrapper w-150px h-150px"  style="background-image: url(<?php echo base_url();?>assets/images/Jewel.jpg)"></div>
											</div>
											<textarea hidden="hidden" name="img_6_data" id="img_6_data"></textarea>
										</a>
									</div>
									<input type="hidden" name="img_selected_id" value="" id="img_selected_id" value="">
									<div class="d-flex justify-content-center align-items-center mt-13">
										<div type="submit" class="btn btn-primary" onclick="put_capture_jewel_photo()">Submit</div>
									</div>
								</div>
							</div>
						</div>
						<!--end::Modal body-->
					</div>
					<!--end::Modal content-->
				</div>
				<!--end::Modal dialog-->
			</div>
			<!--end::Modal - view payment-->
		</div>
		<!--end::Modal - view capture image for loan-->
		<!--begin::Modal - view capture image -->
		<div class="modal fade" id="kt_modal_doc_camera" tabindex="-1" aria-hidden="true">
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
							<h1 class="mb-3">Capture Image</h1>
						</div>
						<!--end::Heading-->
						<!--end::Heading-->	
						<div class="row">
							<div class="col-lg-6">
								<div class="row">
									<div id="my_camera" style="max-height: 330px;height: 330px;width: 100%;max-width: 100%;border: 1px solid;">
										
									</div>
								</div>
								<div class="d-flex justify-content-center align-items-center mt-6">
									<div class="btn btn-primary" id="take_jewel_photo1" onclick="take_jewel_photo()">Take Jewel Photo</div>
									<button type="submit" class="btn btn-primary" id="capture" onclick="jewel_snapshot()" style="display: none;">Capture</button>
								</div>
							</div>
							<div class="col-lg-6">
								<div class="row">
									<input type="hidden" name="img_count" id="img_count" value="1">
									<div class="col-lg-4 fv-row">
										<a href="javascript:;" onclick="select_image_1();">
											<div class="image-input image-input-outline" data-kt-image-input="true" id="img_1" style="background-image: url(<?php echo base_url();?>assets/images/Jewel.jpg);">
													<div class="image-input-wrapper w-150px h-150px"   style="background-image: url(<?php echo base_url();?>assets/images/Jewel.jpg)"></div>
											</div>
											<textarea hidden="hidden" name="img_1_data" id="img_1_data"></textarea>
										</a>
									</div>
									<div class="col-lg-4 fv-row">
										<a href="javascript:;" onclick="select_image_2();">
											<div class="image-input image-input-outline" data-kt-image-input="true" id="img_2" style="background-image: url(<?php echo base_url();?>assets/images/Jewel.jpg)">
													<div class="image-input-wrapper w-150px h-150px"  style="background-image: url(<?php echo base_url();?>assets/images/Jewel.jpg)"></div>
											</div>
											<textarea hidden="hidden" name="img_2_data" id="img_2_data"></textarea>
										</a>
									</div>
									<div class="col-lg-4 fv-row">
										<a href="javascript:;" onclick="select_image_3();">
											<div class="image-input image-input-outline" data-kt-image-input="true" id="img_3" style="background-image: url(<?php echo base_url();?>assets/images/Jewel.jpg)">
													<div class="image-input-wrapper w-150px h-150px"  style="background-image: url(<?php echo base_url();?>assets/images/Jewel.jpg)"></div>
											</div>
											<textarea hidden="hidden" name="img_3_data" id="img_3_data"></textarea>
										</a>
									</div>
								</div>
								<div class="row mt-4">
									
									<div class="col-lg-4 fv-row">
										<a href="javascript:;" onclick="select_image_4();">
											<div class="image-input image-input-outline" data-kt-image-input="true" id="img_4" style="background-image: url(<?php echo base_url();?>assets/images/Jewel.jpg)">
													<div class="image-input-wrapper w-150px h-150px"  style="background-image: url(<?php echo base_url();?>assets/images/Jewel.jpg)"></div>
											</div>
											<textarea hidden="hidden" name="img_4_data" id="img_4_data"></textarea>
										</a>
									</div>
									<div class="col-lg-4 fv-row">
										<a href="javascript:;" onclick="select_image_5();">
											<div class="image-input image-input-outline" data-kt-image-input="true" id="img_5" style="background-image: url(<?php echo base_url();?>assets/images/Jewel.jpg)">
													<div class="image-input-wrapper w-150px h-150px"  style="background-image: url(<?php echo base_url();?>assets/images/Jewel.jpg)"></div>
											</div>
											<textarea hidden="hidden" name="img_5_data" id="img_5_data"></textarea>
										</a>
									</div>
									<div class="col-lg-4 fv-row">
										<a href="javascript:;" onclick="select_image_6();">
											<div class="image-input image-input-outline" data-kt-image-input="true" id="img_6" style="background-image: url(<?php echo base_url();?>assets/images/Jewel.jpg)">
													<div class="image-input-wrapper w-150px h-150px"  style="background-image: url(<?php echo base_url();?>assets/images/Jewel.jpg)"></div>
											</div>
											<textarea hidden="hidden" name="img_6_data" id="img_6_data"></textarea>
										</a>
									</div>
									<input type="hidden" name="img_selected_id" value="" id="img_selected_id" value="">
									<div class="d-flex justify-content-center align-items-center mt-13">
										<div type="submit" class="btn btn-primary" onclick="put_capture_jewel_photo()">Submit</div>
									</div>
								</div>
							</div>
						</div>
						<!--end::Modal body-->
					</div>
					<!--end::Modal content-->
				</div>
				<!--end::Modal dialog-->
			</div>
			<!--end::Modal - view payment-->
		</div>
		<!--end::Modal - view capture image for loan-->
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
										<!-- <th class="min-w-50px">Sno</th> -->
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
										<!-- <th class="min-w-25px">Sno</th> -->
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
		<?php $this->load->view("script"); ?>

<script>
	$("#multi_jwl_fsd_loan").DataTable({
		//"aaSorting":[],
		"sorting":false,
		"paging": false,
		// "responsive": true,
		 "language": {
		  "lengthMenu": "Show _MENU_",
		 },
		 "dom":
		  "<'row'" +
		  // "<'col-sm-6 d-flex align-items-center justify-conten-start'l>" +
		  ">" +

		  "<'table-responsive'tr>" +

		  "<'row'" +
		  "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
		  // "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
		  ">"
		});
	$('#multi_jwl_fsd_loan').wrap('<div class="dataTables_scroll" />');
</script>
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
	<script >
		function fsd_validation() 
		{
				var type=$('#close_type').val();
				alert(type);
		}
	</script>

	</body>
	<!--end::Body-->
</html>