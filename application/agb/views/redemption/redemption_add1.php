<?php $this->load->view("common");?>
<link href="<?php echo base_url();?>assets/jquery.autocomplete.css" rel="stylesheet" type="text/css" />
<script src="<?php echo base_url();?>assets/js/webcam/webcam.min.js"></script>
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
   background-color: #ec9629;
    z-index: 2;
  }

  .dataTables_scroll_witness
    {
        position: relative;
        overflow: auto;
        max-height: 95px;/*the maximum height you want to achieve*/
        width: 100%;
    }
  .dataTables_scroll_witness thead{
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
									<h1 class="d-flex align-items-center text-dark fw-bold my-1 fs-3">New Redemption
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
										<form method="POST" id="frm_redemption" action="<?php echo base_url(); ?>redemption/redemption_save" enctype="multipart/form-data" onsubmit=" return redemption_validation();" >
											<div class="card-body py-4">
												<div class="loader">
												</div>
												<div class="row">
													<div class="col-lg-12">
														<!-- <div class="px-4" style="border-radius: 10px;padding-bottom: 10px;box-shadow: 0 5px 10px #00002947;"> -->
															<div class="row">
																<label class="col-lg-1 col-form-label required fw-semibold fs-6">Loan No</label>
																<div class="col-lg-2 fv-row fv-plugins-icon-container">
																	<input type="text" name="redemp_bill_no" id="redemp_bill_no" class="form-control form-control-lg1 form-control-solid" placeholder="Enter Loan No" id="" value="">
																	<div class="fv-plugins-message-container invalid-feedback" id="redemp_bill_no_err"></div>
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
																		<input class="form-control form-control-solid ps-12" name="r_date" id="r_date" placeholder="Date" id="kt_datepicker_new_loan_date" value="<?php echo date("d-m-Y"); ?>"/>
																	</div>
																</div>
																<div class="col-lg-1">
																	<label class="col-form-label required fw-semibold fs-6">Company</label>
																</div>
																<div class="col-lg-2 fv-row fv-plugins-icon-container">
																	<select class="form-select form-select-solid" name="r_company_select" id="r_company_select" data-control="select2" data-hide-search="true">	
																		<option value="">Select</option>
																		Select Company</option>
																			<?php foreach($company_list as $clist) {?>
																			<option value="<?php echo $clist['COMPANYCODE']?>" <?php echo ($clist['COMPANYCODE']==$_SESSION['COMPANYCODE'])?'selected':''; ?>><?php echo $clist['COMPANYNAME'];?></option>
																			<?php }?>
																	</select>
																	<div class="fv-plugins-message-container invalid-feedback" id="r_company_select_err"></div>
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
																		<label class="col-lg-12 col-form-label fw-bold fs-6" id="r_no_card" name="r_no_card" style="display: none"><i class="fa fa-address-card fs-6" aria-hidden="true" title="Card No"></i>&emsp;<a href="<?php echo base_url();?>/membershipcard" target="_blank"><span style="color: red" >Click Here for<br> <b>New Membership Card</b></span></a>
																					
																					<!-- <i class="fas fa-check-circle fs-5" style="color:green;"></i> -->
																				</label>
																				<label class="col-lg-12 col-form-label fw-bold fs-6" id="r_lbl_mem_card_no"><i class="fa fa-address-card fs-6" aria-hidden="true" title="Card No"></i>&emsp;<span id="r_card_no" name="r_card_no">xxxx-xxxx-xxxx-xxxx</span>
																					<span id="verify_icon"><i class="fas fa-times-circle fs-5" style="color:red;"></i></span>
																					<!-- <i class="fas fa-check-circle fs-5" style="color:green;"></i> -->
																				</label>
																				<label class="col-lg-4 col-form-label fw-bold fs-6 text-center" name="r_card_type" id="r_card_type" >
																					
																					</label> 
																				<label class="col-lg-4 col-form-label fw-bold fs-6" name="" id="lbl_mem_point"><span id="r_card_points" name="r_card_points"><i class="fa-solid fa-coins fs-6" title="Points"></i>&emsp;000</span></label>
																				<div class="col-lg-4" id="r_lbl_mem_verify">
																					<p class="btn btn-sm btn-outline btn-outline-solid btn-outline-warning btn-active-light-primary me-2" data-bs-toggle="modal" data-bs-target="#kt_modal_verify_membership_card" id="btn_verify_popup" name="btn_verify_popup" >Verify</p>
																				</div>
																		
																		<label class="col-lg-12 col-form-label fw-bold fs-6 mt-2" title="Nominee">
																		<span><i class="fas fa-user-friends fs-5" title="Nominee"></i>&emsp;</span>
																		<span title="Nominee" name="r_nominee" id="r_nominee">Kumar - Brother - 9795963214</span></label>
																		<div class="col-lg-12" title="Rating">
																			<label class="col-form-label fw-bold fs-4">
																				<i class="fas fa-star-half-alt"></i>&emsp;
																			</label>
																			<label class="col-form-label fw-bold fs-6" name="r_rating" id="r_rating">
																					<i class="fa-solid fa-star fs-3" style="color:#50cd89;"></i>
																				&nbsp;<span>Good</span></label>
																		</div>
																	</div>
																</div>
																<div class="col-lg-6">
																	<div class="row">
																		<label class="col-lg-12 col-form-label fw-bold fs-6" >
																			<i class="fa fa-user fs-6" aria-hidden="true" title="Last Name"></i>&emsp;<span name="r_firstname" id="r_firstname">SUBRAMANIAN</span></label>
																			<input type="hidden" name="r_pid" id="r_pid">
																		<label class="col-lg-12 col-form-label fw-bold fs-6">
																			<i class="fa-solid fa-location-dot fs-6" aria-hidden="true" title="Address"></i>
																		&emsp;<span  name="r_address" id="r_address">12, Street, City</span></label>
																		<label class="col-lg-12 col-form-label fw-bold fs-6">
																				<i class="fas fa-mobile-android-alt fs-6" aria-hidden="true" title="Mobile"></i>
																			&emsp;<span  name="r_phone_no" id="r_phone_no">0000000000</span>
																			<a href="javascript:;" data-bs-toggle="modal" data-bs-target="#kt_modal_verify_mobile_no" title="Verify Mobile No"><!-- <i class="fas fa-square-check" data-bs-toggle="modal" data-bs-target="#kt_modal_verify_mobile_no" ></i> --><svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 505 505" xml:space="preserve" height="35" width="35">
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
																				</svg></a>
																		</label>
																		<div class="col-lg-12">
																			<label class="col-form-label fw-semibold fs-2" style="color: #1a21e3 !important;font-weight: 600 !important;">H/L Bal &emsp;</label>
																			<label class="col-form-label fw-bold fs-2" style="color: #1a21e3 !important;font-weight: 600 !important;" id="lbl_hl_bal_rem">2000.00</label>
																		</div>
																	</div>
																</div>
															</div>
															<div class="row mt-4">
																<div class="col-lg-4 fv-row">
																	<div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url(<?php echo base_url();?>assets/images/Party.jpg)" id="div_r_party_photo">
																		<div class="image-input-wrapper"  style="background-image: url(<?php echo base_url();?>assets/images/Party.jpg)"></div>
																	</div>
																</div>
																<div class="col-lg-4 fv-row">
																	<div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url(<?php echo base_url();?>assets/media/svg/avatars/aadhaar_blank.png)" >
																		<div class="image-input-wrapper"  style="background-image: url(<?php echo base_url();?>assets/media/svg/avatars/aadhaar_blank.png)"></div>
																	</div>
																</div>
																<div class="col-lg-4 fv-row">
																	<div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url(<?php echo base_url();?>assets/media/svg/avatars/signature_blank.png)">
																		<div class="image-input-wrapper"  style="background-image: url(<?php echo base_url();?>assets/media/svg/avatars/signature_blank.png)"></div>
																	</div>
																</div>
															</div><br>
														</div>
													</div>
													<div class="col-lg-6">
														<div class="px-4" style="border-radius: 10px;padding-bottom: 20px;box-shadow: 0 5px 10px #00002947;">
															<div class="row">
																<label class="col-lg-7 col-form-label fw-bold fs-5 text-end">Loan Information</label>
																<label class="col-lg-5 col-form-label text-center fw-semibold fs-6" id="r_loan_status" name="r_loan_status"><span style="background-color:#5aad52;border-radius: 8px;padding: 5px 15px 5px 15px;">Loan status</span>
																</label>
															</div>
															<div class="row">
																<label class="col-lg-2 col-form-label fw-semibold fs-6">Company</label>
																<label class="col-lg-10 col-form-label fw-bold fs-6" id="r_company_name" name="r_company_name">AGB - MAIN BRANCH SAYALKUDI</label>
																<label class="col-lg-2 col-form-label fw-semibold fs-6">Int Type</label>
																<label class="col-lg-4 col-form-label fw-bold fs-6" id="r_interest_type" name="r_interest_type">MIP-2.5</label>
																<div class="col-lg-2" id="r_due_status">
																	<label class="col-form-label fw-bold fs-5 bg-success" style="border-radius: 8px;padding: 5px 10px 5px 10px;" >Normal</label>
																</div>
																<div class="col-lg-4">
																	<label class="col-form-label fw-bold fs-6" id="r_period">3 Month 16 Days</label>
																</div>
																<label class="col-lg-2 col-form-label fw-semibold fs-6">Loan Date</label>
																<label class="col-lg-4 col-form-label fw-bold fs-6" id="r_loan_date">22-01-2023</label>
																<label class="col-lg-2 col-form-label fw-semibold fs-6">Exp.Date</label>
																<label class="col-lg-4 col-form-label fw-bold fs-6" id="r_expiry_date">22-02-2023</label>
																<div class="col-lg-6" title="Principal Amount">
																	<label class="col-form-label"><i class="fas fa-money-bill-wave fs-4"></i>&emsp;</span></label>
																	<label class="col-form-label fw-bold fs-2" id="r_loan_amount">10000.00</label>
																</div>
																<div class="col-lg-2" title="Pledge Items Count">
																	<a href="javascript:;"><i class="fas fa-list-ol fa-spin fs-4" title="Pledge Items Count" data-bs-toggle="modal" data-bs-target="#kt_modal_pledge_items"></i></a>
																	
																	<label class="col-form-label fw-bold fs-4" id="r_pledge_count">2</label>
																</div>
																<div class="col-lg-4" title="Weight">
																	<label class="col-form-label"><span><i class="fas fa-balance-scale fs-4"></i></span>&emsp;</label>
																	<label class="col-form-label fw-bold fs-4" id="r_net_weight">3.200</label>
																</div>
																<div class="col-lg-4 fv-row mt-6">
																	<div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url(<?php echo base_url();?>assets/media/svg/avatars/signature_blank.png)" id="div_r_item_photo">
																		<div class="image-input-wrapper"  style="background-image: url(<?php echo base_url();?>assets/images/Jewel.jpg)"></div>
																	</div>
																</div>
																<div class="col-lg-8">
																	<div class="row">
																		<div class="col-lg-12">
																			<label class="fw-semibold fs-6">Ren.No &emsp;</label>
																			<label class="fw-bold fs-5" id="rene_no">-</label>
																		</div>
																	</div>
																	<div class="row">
																		<label class="col-lg-6 col-form-label fw-semibold fs-6">Last Rcpt Count & Date</label>
																		<label class="col-lg-2 col-form-label fw-bold fs-6" id="r_receipt_count">1</label>
																		<label class="col-lg-4 col-form-label fw-bold fs-6" id="r_receipt_date">18-03-2023</label>
																	</div>
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
																						<span id="r_loan_principal">10557.50</span>
																						<input type="hidden" name="txt_hidden_loan_principal" id="txt_hidden_loan_principal" value="0">
																					</td>
																					<td class="col-lg-4" id="r_paid_principal">10000.00</td><input type="hidden" name="txt_hidden_paid_principal" id="txt_hidden_paid_principal" value="0">

																					<td class="col-lg-4" id="r_bal_principal">557.50</td>
																					<input type="hidden" name="txt_hidden_bal_principal" id="txt_hidden_bal_principal" value="0">
																				</tr>
																				<tr>
																					<td class="col-lg-4">
																						<span>Int : </span>
																						<span id="r_loan_interest">369.51</span>

																						<input type="hidden" name="txt_hidden_loan_interest" id="txt_hidden_loan_interest" value="0">
																					</td>
																					<td class="col-lg-4" id="r_paid_interest">0.00</td>
																					<input type="hidden" name="txt_hidden_paid_interest" id="txt_hidden_paid_interest" value="0">
																					<td class="col-lg-4" id="r_bal_interest">369.51</td>
																					<input type="hidden" name="txt_hidden_bal_interest" id="txt_hidden_bal_interest" value="0">
																				</tr>
																				<tr>
																					<td class="col-lg-4 fw-bold fs-5">
																						<span>Tot : </span>
																						<span id="r_actual_total">10927.01</span>
																						<input type="hidden" name="txt_hidden_actual_total" id="txt_hidden_actual_total" value="0">
																					</td>
																					<td class="col-lg-4 fw-bold fs-5" id="r_paid_total">10000.00</td><input type="hidden" name="txt_hidden_paid_total" id="txt_hidden_paid_total" value="0">
																					<td class="col-lg-4 fw-bold fs-5" id="r_bal_total">927.01</td><input type="hidden" name="txt_hidden_bal_total" id="txt_hidden_bal_total" value="0">
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
													<div class="accordion" id="kt_accordion_item_receipt_pending_list">
												    <div class="accordion-item">
												        <h2 class="accordion-header" id="kt_accordion_item_receipt_pending_list_header_1">
												            <button class="accordion-button fw-bold fs-6 collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#kt_accordion_item_receipt_pending_list_body_1" aria-expanded="true" aria-controls="kt_accordion_item_receipt_pending_list_body_1">
												            Pending Payment Details &emsp; - &emsp; Total Amount &emsp; <span id="span_acc_total_amount">10927.01</span> &emsp;
												            </button>
												        </h2>
												        <div id="kt_accordion_item_receipt_pending_list_body_1" class="accordion-collapse collapse show" aria-labelledby="kt_accordion_item_receipt_pending_list_header_1" data-bs-parent="#kt_accordion_item_receipt_pending_list">
												            <div class="accordion-body">
												            	<div class="row">
																				<!-- <label class="col-form-label fw-bold fs-4">Pending Payment Details</label> -->
																	<table class="table align-middle table-row-dashed table-striped table-hover fs-7 gy-4 gs-2" id="view_receipt_payment_history">
																		<thead>
																			<tr class="text-start text-muted fw-bold fs-7 gs-0">
																				<!-- <th class="min-w-25px">Sno</th> -->
																	            <th class="min-w-80px">Exp.Date</th>
																	            <th class="min-w-50px">Int %</th>
																	            <th class="min-w-80px">Principal Amount</th>
																	            <th class="min-w-80px">Interest Amount</th>
																	            <th class="min-w-80px">Total Amount</th>
																			</tr>
																		</thead>
																		<tbody class="text-gray-600 fw-semibold" id="r_mul_jwl_tbody_pending_payment">
																									
																	    </tbody>
																	</table>
																</div>
												            </div>
												        </div>
												    </div>
													</div>
												</div>
												<!-- <div class="px-4" style="border-radius: 10px;padding-bottom: 5px;box-shadow: 0 5px 10px #00002947;"> -->
													<!-- <div class="row mt-4">
														<div class="col-lg-4">
															<label class="col-form-label fw-bold fs-3">Total Amount &emsp;</label>
															<label class="col-form-label fw-bold fs-3">10927.01</label>
														</div>
														<div class="col-lg-4">
															<label class="col-form-label fw-bold fs-3">Paid Amount &emsp;</label>
															<label class="col-form-label fw-bold fs-3">10000.00</label>
														</div>
														<div class="col-lg-4">
															<label class="col-form-label fw-bold fs-3">Balance Amount &emsp;</label>
															<label class="col-form-label fw-bold fs-3">369.51</label>
														</div>
													</div> -->
													<div class="row mt-4">
														<div class="col-lg-2">
															<div class="d-flex align-items-center mt-1">
																<label class="form-check form-check-inline form-check-solid me-5 is-invalid">
																	<input class=" form-check-input" name="redemp_radio" type="radio" value="redp_cus_c_radio_val" id="redp_cus_c_radio_val">
																</label>
																<label class=" col-form-label fw-semibold fs-6" style="background-color:#ffdf6f;border-radius: 8px;padding: 5px 5px 5px 5px;">Customer Close</label>
															</div>
														</div>
														<div class="col-lg-3">
															<div class="d-flex align-items-center mt-1 ms-6">
																<label class="form-check form-check-inline form-check-solid me-5 is-invalid">
																	<input class=" form-check-input" name="redemp_radio" type="radio" value="redp_cus_t_radio_val" id="redp_cus_t_radio_val">
																</label>
																<label class=" col-form-label fw-semibold fs-6" style="background-color:#fed4df;border-radius: 8px;padding: 5px 5px 5px 5px;">Customer Transfer</label>
															</div>
														</div>
														<div class="col-lg-2">
															<div class="d-flex align-items-center mt-1">
																<label class="form-check form-check-inline form-check-solid me-5 is-invalid">
																	<input class=" form-check-input" name="redemp_radio" type="radio" value="redp_cmy_c_radio_val" id="redp_cmy_c_radio_val">
																</label>
																<label class=" col-form-label fw-semibold fs-6" style="background-color:#b0dfff;border-radius: 8px;padding: 5px 5px 5px 5px;">Company Close</label>
															</div>
														</div>
														<div class="col-lg-3">
															<div class="d-flex align-items-center mt-1 ms-6">
																<label class="form-check form-check-inline form-check-solid me-5 is-invalid">
																	<input class=" form-check-input" name="redemp_radio" type="radio" value="redp_cmy_sl_radio_val" id="redp_cmy_sl_radio_val">
																</label>
																<label class=" col-form-label fw-semibold fs-6" style="background-color:#fbe2d5;border-radius: 8px;padding: 5px 5px 5px 5px;">Customer Sale</label>
															</div>
														</div>
														<div class="col-lg-2">
															<div class="d-flex align-items-center mt-1">
																<label class="form-check form-check-inline form-check-solid me-5 is-invalid">
																	<input class=" form-check-input" name="redemp_radio" type="radio" value="redp_mul_jl_radio_val" id="redp_mul_jl_radio_val">
																</label>
																<label class=" col-form-label fw-semibold fs-6" style="background-color:#a3ff9b;border-radius: 8px;padding: 5px 5px 5px 5px;">Multi Jewel</label>
															</div>
														</div>
													</div>
												<!-- </div> -->
												<!-- Customer Close Start -->
												<div class="px-4" id="cus_close_tbox" style="display: none;">
													<div class="row mt-4">
														<label class="col-lg-2 col-form-label fw-bold fs-3">Customer Close</label>
														<div class="col-lg-10">
															<label class="col-form-label fw-bold fs-3">Total Balance &emsp;</label>
															<label class="col-form-label fw-bold fs-3"><span id="cust_cls_total_amount">10927.01</span></label>
															<span class="fw-bold fs-3">&emsp;(&nbsp;</span>
															<label class="col-form-label fw-bold fs-3" >Principal &emsp;</label>
															<label class="col-form-label fw-bold fs-3"><span id="cust_cls_total_principal">10557.50</span></label>&emsp;
															<label class="col-form-label fw-bold fs-3">Interest &emsp;</label>
															<label class="col-form-label fw-bold fs-3"><span id="cust_cls_total_interest"> 369.51</span></label>
															<span class="fw-bold fs-3">&nbsp;)</span>
														</div>
														<div class="col-lg-4">
															<div class="row">
																<label class="col-lg-6 col-form-label fw-semibold fs-6">Paper Action Charge</label>
																<div class="col-lg-6">
																	<input type="text"class="form-control form-control-lg form-control-solid" placeholder="" value="0" name="cust_cls_pap_act_chg" id="cust_cls_pap_act_chg" onkeyup="cust_close_calc();">
																	<div class="fv-plugins-message-container invalid-feedback" id=""></div>
																</div>
																<label class="col-lg-6 col-form-label fw-semibold fs-6">Notice Charge</label>
																<div class="col-lg-6">
																	<input type="text"class="form-control form-control-lg form-control-solid" placeholder="" value="0" name="cust_cls_not_chg" id="cust_cls_not_chg" onkeyup="cust_close_calc();">
																	<div class="fv-plugins-message-container invalid-feedback" id=""></div>
																</div>
																<div class="col-lg-6">
																	<div class="d-flex align-items-center">
																		<label class="form-check form-check-inline form-check-solid me-5 is-invalid">
																			<input class="form-check-input" name="cus_cl_form_missing" type="checkbox" value="1" id="cus_cl_form_missing" onclick="cus_cl_frm_missing()">
																		</label>
																		<label class="col-form-label fw-semibold fs-6 me-5">Form Missing</label>
																	</div>
																</div>
																<div class="col-lg-6" id="cus_cl_form_miss_print_but" style="display: none;">
																	
																	<!-- <p class="btn btn-sm btn-outline btn-outline-solid btn-outline-warning btn-active-light-primary me-1" onclick=" cus_close_print1_verify();" >Print 1</p> -->
																	<a class="btn btn-sm btn-outline btn-outline-solid btn-outline-warning btn-active-light-primary me-1" id="cust_cls_btn_print1" target="_blank">Print 1</a>
																	<a class="btn btn-sm btn-outline btn-outline-solid btn-outline-warning btn-active-light-primary me-1" id="cust_cls_btn_print2" target="_blank">Print 2</a>
																	<a  id="cust_cls_btn_print3" target="_blank"><i class="fa fa-print" title ="Legal Print" aria-hidden="true"></i></a>
																</div>
																<!-- <label class="col-lg-6 col-form-label fw-semibold fs-6">Form Missing</label> -->
																<!-- <div class="col-lg-6"> -->
																	<input type="hidden"class="form-control form-control-lg form-control-solid" placeholder="" value="100" name="cust_cls_frm_miss_chg" id="cust_cls_frm_miss_chg" onkeyup="cust_close_calc();">
																	<!-- <div class="fv-plugins-message-container invalid-feedback" id=""></div> -->
																<!-- </div> -->
																
															</div>
														</div>
														<div class="col-lg-4">
															<div class="row">
																<label class="col-lg-6 col-form-label fw-semibold fs-6">On Account</label>
																<div class="col-lg-6">
																	<input type="text"class="form-control form-control-lg form-control-solid" placeholder="" value="0" style="background-color: #ff5b5b; color: white" name="cust_cls_on_acc_chg" id="cust_cls_on_acc_chg" onkeyup="cust_close_calc();">
																	<div class="fv-plugins-message-container invalid-feedback"></div>
																</div>
																<label class="col-lg-6 col-form-label fw-semibold fs-6">Discount</label>
																<div class="col-lg-6">
																	<input type="text"class="form-control form-control-lg form-control-solid" placeholder="" value="0" name="cust_cls_disc_chg" id="cust_cls_disc_chg" onkeyup="cust_close_calc();">
																	<div class="fv-plugins-message-container invalid-feedback" id=""></div>
																</div>
																<div class="col-lg-2" id="cus_cl_upload_doc" style="display: block;">
																	<div class="image-input image-input-outline " data-kt-image-input="true" style="background-image: url(assets/images/Document.jpg)">
																		<div class="image-input-wrapper w-50px h-50px" style="background-image: url(assets/images/Document.jpg)"></div>
																		<label class="btn btn-icon btn-circle btn-active-color-primary w-20px h-20px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" data-kt-initialized="1">
																			<i class="bi bi-pencil-fill fs-8"></i>
																			<input type="file" name="add_c_logo" accept=".png, .jpg, .jpeg">
																			<input type="hidden" name="add_c_logo_remove">
																		</label>
																		<span class="btn btn-icon btn-circle btn-active-color-primary w-20px h-20px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" data-kt-initialized="1">
																			<i class="bi bi-x fs-4"></i>
																		</span>
																		<span class="btn btn-icon btn-circle btn-active-color-primary w-20px h-20px bg-body shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" data-kt-initialized="1">
																			<i class="bi bi-x fs-4"></i>
																		</span>
																	</div>
																</div>
																<div class="col-lg-10 text-center">
																	<label class="col-form-label fw-bold fs-2">Net Pay &emsp;</label>
																	<label class="col-form-label fw-bold fs-2" id="lbl_cust_cls_net_pay">11977.01</label>
																</div>
															</div>
														</div>
														<div class="col-lg-4">
															<div class="row">
																<label class="col-lg-6 col-form-label required fw-semibold fs-6">Closed By</label>
																<div class="col-lg-6 fv-row fv-plugins-icon-container">
																	<select class="form-select form-select-solid" name="cus_close_closed_by" id="cus_close_closed_by" data-control="select2" data-hide-search="true" onchange="cus_cl_cls_by();">	
																		<!-- <option value="">Select</option> -->
																		<option value="party" selected>Party</option>
																		<option value="nominee">Nominee</option>
																		<option value="others">Others</option>
																	</select>
																</div>
																<label class="col-lg-6 col-form-label required fw-semibold fs-6" id="cus_cl_closed_by_name_lab" style="display:none;">Name</label>
																<div class="col-lg-6" id="cus_cl_closed_by_name_tbox" style="display:none;">
																	<input type="text"class="form-control form-control-lg form-control-solid" placeholder="" value="" name="cust_cls_by_others" id="cust_cls_by_others" >
																	<div class="fv-plugins-message-container invalid-feedback" id="cust_cls_by_others_err"></div>
																</div>
																<!-- <label class="col-lg-6 col-form-label fw-semibold fs-6">Received Cash</label>
																<div class="col-lg-6">
																	<input type="text"class="form-control form-control-lg form-control-solid" placeholder="">
																	<div class="fv-plugins-message-container invalid-feedback"></div>
																</div> -->
															</div>
														</div>
													</div>
													<div class="row">
														<label class="col-form-label fw-bold fs-5">Party Payment Details</label>
													</div>
													<div class="row">
														<div class="col-lg-2 fv-row fv-plugins-icon-container fv-plugins-bootstrap5-row-invalid">
															<div class="d-flex align-items-center mt-1">
																<label class="form-check form-check-inline form-check-solid me-5 is-invalid">
																	<input class="form-check-input" name="cash_cus_close_paid_from_party_add_radio" type="checkbox" value="1" id="cash_cus_close_paid_from_party_add_radio" onclick="cash_cus_cl_pdfrm_party_add_radio()">
																</label>
																<label class="col-form-label fw-semibold fs-6 me-5">Cash</label>
															</div>
														</div>
														<div class="col-lg-2 fv-row fv-plugins-icon-container fv-plugins-bootstrap5-row-invalid">
															<div class="d-flex align-items-center mt-1">
																<label class="form-check form-check-inline form-check-solid me-5 is-invalid">
																	<input class="form-check-input" name="cheque_cus_close_paid_from_party_add_radio" type="checkbox" value="1" id="cheque_cus_close_paid_from_party_add_radio" onclick="cheque_cus_cl_pdfrm_party_add_radio()">
																</label>
																<label class="col-form-label fw-semibold fs-6">Cheque</label>
															</div>
														</div>
														<div class="col-lg-2 fv-row fv-plugins-icon-container fv-plugins-bootstrap5-row-invalid">
															<div class="d-flex align-items-center mt-1">
																<label class="form-check form-check-inline form-check-solid me-5 is-invalid">
																	<input class="form-check-input" name="rtgs_cus_close_paid_from_party_add_radio" type="checkbox" value="1" id="rtgs_cus_close_paid_from_party_add_radio" onclick="rtgs_cus_cl_pdfrm_party_add_radio()">
																</label>
																<label class="col-form-label fw-semibold fs-6">RTGS</label>
															</div>
														</div>
														<div class="col-lg-2 fv-row fv-plugins-icon-container fv-plugins-bootstrap5-row-invalid">
															<div class="d-flex align-items-center mt-1">
																<label class="form-check form-check-inline form-check-solid me-5 is-invalid">
																	<input class="form-check-input" name="upi_cus_close_paid_from_party_add_radio" type="checkbox" value="1" id="upi_cus_close_paid_from_party_add_radio" onclick="upi_cus_cl_pdfrm_party_add_radio()">
																</label>
																<label class="col-form-label fw-semibold fs-6">UPI</label>
															</div>
														</div>
														<div class="col-lg-2 fv-row fv-plugins-icon-container fv-plugins-bootstrap5-row-invalid">
															<div class="d-flex align-items-center mt-1">
																<label class="form-check form-check-inline form-check-solid me-5 is-invalid">
																	<input class="form-check-input" name="mcard_cus_close_paid_from_party_add_radio" type="checkbox" value="1" id="mcard_cus_close_paid_from_party_add_radio" onclick="mcard_cus_cl_pdfrm_party_add_radio()">
																</label>
																<label class="col-form-label fw-semibold fs-6">Membership Card</label>
															</div>
														</div>
														<div class="col-lg-2 fv-row fv-plugins-icon-container fv-plugins-bootstrap5-row-invalid">
															<div class="d-flex align-items-center mt-1">
																<label class="form-check form-check-inline form-check-solid me-5 is-invalid">
																	<input class="form-check-input" name="chit_cus_close_paid_from_party_add_radio" type="checkbox" value="1" id="chit_cus_close_paid_from_party_add_radio" onclick="chit_cus_cl_pdfrm_party_add_radio()">
																</label>
																<label class="col-form-label fw-semibold fs-6">Chit</label>
															</div>
														</div>
													</div>
													<div class="row">
														<label class="col-lg-1 col-form-label fw-semibold fs-6" id="cus_cl_cash_party_label" style="display:none;">Cash</label>
														<div class="col-lg-2 fv-row fv-plugins-icon-container" id="cus_cl_cash_party_label_tbox" style="display:none;">
															<input type="text" class="form-control form-control-lg form-control-solid" placeholder="Amount" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" name="cust_cls_ppcash_amt" id="cust_cls_ppcash_amt" onkeyup="cust_close_party_payment_calc();" value="0">
															<div class="fv-plugins-message-container invalid-feedback" id="cust_cls_ppcash_amt_err"></div>
														</div>
														<div class="col-lg-3 fv-row fv-plugins-icon-container" id="cus_cl_cash_party_detail_tbox" style="display:none;">
															<textarea class="form-control form-control-solid" rows="1" placeholder="Details"  name="cust_cls_ppcash_details" id="cust_cls_ppcash_details"></textarea>
															<div class="fv-plugins-message-container invalid-feedback" id="cust_cls_ppcash_details_err"></div>
														</div>
													</div>
													<div class="row">
														<label class="col-lg-1 col-form-label fw-semibold fs-6" id="cus_cl_cheque_party_amt" style="display:none;">Cheque</label>
														<div class="col-lg-2 fv-row fv-plugins-icon-container" id="cus_cl_cheque_party_amt_tbox" style="display:none;">
															<input type="text" class="form-control form-control-lg form-control-solid" placeholder="Amount" oninput="this.value = this.value.replace(/[^A-Za-z/0-9.]/g, '').replace(/(\..*)\./g, '$1');" name="cust_cls_ppchq_amt" id="cust_cls_ppchq_amt" onkeyup="cust_close_party_payment_calc();" value="0">
															<div class="fv-plugins-message-container invalid-feedback" id="cust_cls_ppchq_amt_err"></div>
														</div>
														<div class="col-lg-3 fv-row fv-plugins-icon-container"  id="cus_cl_cheque_party_bank_tbox" style="display:none;">
															<select class="form-select form-select-solid" data-control="select2" data-placeholder="Select Party Bank" name="cust_cls_ppchq_party_bank" id="cust_cls_ppchq_party_bank">
																<option value="">Select</option>
																<option value="1">SBI</option>				
																<option value="2">TMB</option>
																<option value="3">IOB</option>
																<option value="4">CUB</option>
																<option value="4">KVB</option>
																<option value="4">IB</option>
															</select>
															<div class="fv-plugins-message-container invalid-feedback" id="cust_cls_ppchq_party_bank_err"></div>
														</div>
														<div class="col-lg-3 fv-row fv-plugins-icon-container" id="cus_cl_cheque_party_chq_no_tbox" style="display:none;">
															<input type="text" name="cust_cls_ppchq_ref_no" id="cust_cls_ppchq_ref_no" class="form-control form-control-lg form-control-solid" placeholder="Cheque/Ref Number" oninput="this.value = this.value.replace(/[^A-Za-z/0-9.]/g, '').replace(/(\..*)\./g, '$1');">
															<div class="fv-plugins-message-container invalid-feedback" id="cust_cls_ppchq_ref_no_err"></div>
														</div>
														<div class="col-lg-3 fv-row fv-plugins-icon-container" id="cus_cl_cheque_party_detail_tbox" style="display:none;">
															<textarea class="form-control form-control-solid" rows="1" placeholder="Details" name="cust_cls_ppchq_details" id="cust_cls_ppchq_details"></textarea>
															<div class="fv-plugins-message-container invalid-feedback" id="cust_cls_ppchq_details_err"></div>
														</div>
													</div>
													<div class="row">
														<label class="col-lg-1 col-form-label fw-semibold fs-6" id="cus_cl_rtgs_party_amt" style="display:none;">RTGS</label>
														<div class="col-lg-2 fv-row fv-plugins-icon-container" id="cus_cl_rtgs_party_amt_tbox" style="display:none;">
															<input type="text" name="cust_cls_pprtgs_amount" id="cust_cls_pprtgs_amount" class="form-control form-control-lg form-control-solid" placeholder="Amount" oninput="this.value = this.value.replace(/[^A-Za-z/0-9.]/g, '').replace(/(\..*)\./g, '$1');" onkeyup="cust_close_party_payment_calc();" value="0">
															<div class="fv-plugins-message-container invalid-feedback" id="cust_cls_pprtgs_amount_err"></div>
														</div>
														<div class="col-lg-3 fv-row fv-plugins-icon-container" id="cus_cl_rtgs_party_no_tbox" style="display:none;">
															<input type="text" name="cust_cls_pprtgs_ref_no" id="cust_cls_pprtgs_ref_no" class="form-control form-control-lg form-control-solid" placeholder="Trans/Ref Number" oninput="this.value = this.value.replace(/[^A-Za-z/0-9.]/g, '').replace(/(\..*)\./g, '$1');">
															<div class="fv-plugins-message-container invalid-feedback" id="cust_cls_pprtgs_ref_no_err"></div>
														</div>
														<div class="col-lg-3 fv-row fv-plugins-icon-container" id="cus_cl_rtgs_party_bank_tbox" style="display:none;">
															<select class="form-select form-select-solid" data-control="select2" data-placeholder="Select Company Bank" data-hide-search="true" name="cust_cls_pprtgs_company_bank" id="cust_cls_pprtgs_company_bank">
																<option value="">Select</option>
																<?php
																	$bnk_det=$this->db->query("select * from BANKS where ACTIVE='Y'")->result_array();
																	foreach ($bnk_det as $blist) 
																	{
																?>
																
																<option value="<?php echo $blist['SNO'];?>"><?php
																$len=strlen( $blist['ACCOUNTNO']);
																$acc_no=substr($blist['ACCOUNTNO'], $len-4);
																 echo $blist['BANKNAME']." - ".$acc_no." - ".$blist['BRANCH']." - ".$blist['PERSONNAME'];?></option>
																<?php 	} 	?>
															</select>
															<div class="fv-plugins-message-container invalid-feedback" id="cust_cls_pprtgs_company_bank_err"></div>
														</div>
														<div class="col-lg-3 fv-row fv-plugins-icon-container" id="cus_cl_rtgs_party_detail_tbox" style="display:none;">
															<textarea class="form-control form-control-solid" rows="1" placeholder="Details" name="cust_cls_pprtgs_details" id="cust_cls_pprtgs_details"></textarea>
															<div class="fv-plugins-message-container invalid-feedback" id="cust_cls_pprtgs_details_err"></div>
														</div>
													</div>
													<div class="row">
														<label class="col-lg-1 col-form-label fw-semibold fs-6" id="cus_cl_upi_party_amt" style="display:none;">UPI</label>
														<div class="col-lg-2 fv-row fv-plugins-icon-container" id="cus_cl_upi_party_amt_tbox" style="display:none;">
															<input type="text" name="cust_cls_ppupi_amount" id="cust_cls_ppupi_amount"class="form-control form-control-lg form-control-solid" placeholder="Amount" onkeyup="cust_close_party_payment_calc();" value="0">
															<div class="fv-plugins-message-container invalid-feedback" id="cust_cls_ppupi_amount_err"></div>
														</div>
														<div class="col-lg-3 fv-row fv-plugins-icon-container" id="cus_cl_upi_party_trans_no_tbox" style="display:none;">
															<input type="text" name="cust_cls_ppupi_ref_no" id="cust_cls_ppupi_ref_no" class="form-control form-control-lg form-control-solid" placeholder="Trans/Ref Number">
															<div class="fv-plugins-message-container invalid-feedback" id="cust_cls_ppupi_ref_no_err"></div>
														</div>
														<div class="col-lg-3 fv-row fv-plugins-icon-container" id="cus_cl_upi_party_bank_tbox" style="display:none;">
															<select class="form-select form-select-solid" data-control="select2" data-placeholder="Select Company Bank" data-hide-search="true" name="cust_cls_ppupi_company_bank" id="cust_cls_ppupi_company_bank">
																<option value="">Select</option>
																<?php
																	$bnk_det=$this->db->query("select * from BANKS where ACTIVE='Y'")->result_array();
																	foreach ($bnk_det as $blist) 
																	{
																?>
																<option value="<?php echo $blist['SNO'];?>"><?php
																$len=strlen( $blist['ACCOUNTNO']);
																$acc_no=substr($blist['ACCOUNTNO'], $len-4);
																 echo $blist['BANKNAME']." - ".$acc_no." - ".$blist['BRANCH']." - ".$blist['PERSONNAME'];?></option>
																<?php 	} 	?>
															</select>
															<div class="fv-plugins-message-container invalid-feedback" id="cust_cls_ppupi_company_bank_err"></div>
														</div>
														<div class="col-lg-3 fv-row fv-plugins-icon-container" id="cus_cl_upi_party_detail_tbox" style="display:none;">
															<textarea class="form-control form-control-solid" rows="1" placeholder="Details" name="cust_cls_ppupi_details" id="cust_cls_ppupi_details"></textarea>
															<div class="fv-plugins-message-container invalid-feedback" id="cust_cls_ppupi_details_err"></div>
														</div>
													</div>
													<div class="row">
														<label class="col-lg-1 col-form-label fw-semibold fs-6" id="cus_cl_card_no_paid_from_pty" style="display:none;">M.card No</label>
														<div class="col-lg-2" id="cus_cl_card_no_paid_from_pty_tbox" style="display:none;">
															<input type="text" class="form-control form-control-lg form-control-solid" placeholder="Membership Card No" name="cust_cls_ppmem_card" id="cust_cls_ppmem_card">
															<div class="fv-plugins-message-container invalid-feedback"></div>
														</div>
														<div class="col-lg-3" id="cus_cl_points_paid_from_pty" style="display:none;">
															<label class="col-form-label fw-bold fs-6">Available Points</label>&emsp;
															<label class="col-form-label fw-bold fs-5" id="cust_cls_ppmem_points">10052</label>
														</div>
														<!-- <label class="col-lg-1 col-form-label fw-semibold fs-6" id="cus_cl_redeem_paid_from_cmy" style="display:none;">Redeem</label> -->
														<div class="col-lg-2" id="cus_cl_redeem_paid_from_pty_tbox" style="display:none;">
															<input type="text" class="form-control form-control-lg form-control-solid" placeholder="Redeem Points" name="cust_cls_ppmem_red_points" id="cust_cls_ppmem_red_points"  onkeyup="cust_close_party_payment_calc();" value="0">
															<div class="fv-plugins-message-container invalid-feedback" id="cust_cls_ppmem_red_points_err"></div>
														</div>
														<div class="col-lg-2 fv-row fv-plugins-icon-container" id="cus_cl_mcard_detail_paid_from_pty_tbox" style="display:none;">
															<textarea class="form-control form-control-solid" rows="1" placeholder="Details" name="cust_cls_ppmem_details" id="cust_cls_ppmem_details"></textarea>
															<div class="fv-plugins-message-container invalid-feedback" id="cust_cls_ppmem_details	_err"></div>
														</div>
													</div>
													<div class="row">
														<label class="col-lg-1 col-form-label fw-semibold fs-6" id="cus_cl_sch_paid_from_pty" style="display:none;">Scheme</label>
														<div class="col-lg-2 fv-row fv-plugins-icon-container" id="cus_cl_sch_paid_from_pty_tbox" style="display:none;">
															<select class="form-select form-select-solid" data-control="select2" data-placeholder="Select Scheme" id="cust_cls_ppchit_scheme" name="cust_cls_ppchit_scheme" data-hide-search="true">
																<option value="">Select</option>
																<option value="1">Selvamagal</option>				
																<option value="2">Thangamagan</option>
															</select>
														</div>
														<div class="col-lg-3 fv-row fv-plugins-icon-container" id="cus_cl_avai_bal_paid_from_pty" style="display:none;">
															<select class="form-select form-select-solid" data-control="select2" data-placeholder="Select Chit ID" data-hide-search="true" name="cust_cls_ppchit_number" id="cust_cls_ppchit_number">
																<option value="">Select Chit ID</option>
																<option value="1">CH-001/23 - 45863.00</option>				
																<option value="2">CH-002/23 - 85964.00</option>
															</select>
														</div>
														<div class="col-lg-2" id="cus_cl_redeem_amt_paid_from_pty_tbox" style="display:none;">
															<input type="text" class="form-control form-control-lg form-control-solid" placeholder="Redeem Amount" name="cust_cls_ppchit_red_amount" id="cust_cls_ppchit_red_amount"  onkeyup="cust_close_party_payment_calc();" value="0">
															<div class="fv-plugins-message-container invalid-feedback"></div>
														</div>
														<div class="col-lg-2 fv-row fv-plugins-icon-container" id="cus_cl_redeem_detail_paid_from_pty_tbox" style="display:none;">
															<textarea class="form-control form-control-solid" rows="1" placeholder="Details" name="cust_cls_ppchit_details" id="cust_cls_ppchit_details"></textarea>
														</div>
													</div>
													<div class="row">
														<div class="col-lg-6 text-center">
															<label class="col-form-label fw-semibold fs-6">Net Payable &emsp;</label>
															<label class="col-form-label fw-bold fs-2"><span id="span_cust_cls_net_pay">11977.01</span><input type="hidden" name="txt_hidden_cust_cls_net_pay" id="txt_hidden_cust_cls_net_pay"></label>
														</div>
														<div class="col-lg-6 text-center">
															<label class="col-form-label fw-semibold fs-6">Paid Amount &emsp;</label>
															<label class="col-form-label fw-bold fs-2"><span id="span_cust_cls_paid_amt">11977.01</span><input type="hidden" name="txt_hidden_cust_cls_paid_amount" id="txt_hidden_cust_cls_paid_amount"></label>
														</div>
													</div>
												</div>
												<!-- Customer Close end -->
												<!-- Customer Transfer Start -->
												<div class="px-4" id="cus_trans_tbox" style="display: none;">
													<div class="row mt-4">
														<label class="col-lg-2 col-form-label fw-bold fs-3">Customer Transfer</label>
														<div class="col-lg-10">
															<label class="col-form-label fw-bold fs-3">Total Balance &emsp;</label>
															<label class="col-form-label fw-bold fs-3" id="cust_trans_total_amount">10927.01</label>
															<span class="fw-bold fs-3">&emsp;(&nbsp;</span>
															<label class="col-form-label fw-bold fs-3">Principal &emsp;</label>
															<label class="col-form-label fw-bold fs-3" id="cust_trans_total_principal">10557.50</label>&emsp;
															<label class="col-form-label fw-bold fs-3">Interest &emsp;</label>
															<label class="col-form-label fw-bold fs-3" id="cust_trans_total_interest">369.51</label>
															<span class="fw-bold fs-3">&nbsp;)</span>
														</div>
														<div class="col-lg-4">
															<div class="row">
																<label class="col-lg-6 col-form-label fw-semibold fs-6">Paper Action Charge</label>
																<div class="col-lg-6">
																	<input type="text"class="form-control form-control-lg form-control-solid" placeholder="" value="0" name="cust_trans_pap_act_chg" id="cust_trans_pap_act_chg" onkeyup="cust_trans_calc();">
																	<div class="fv-plugins-message-container invalid-feedback" id=""></div>
																</div>
																<label class="col-lg-6 col-form-label fw-semibold fs-6">Notice Charge</label>
																<div class="col-lg-6">
																	<input type="text"class="form-control form-control-lg form-control-solid" placeholder="" value="0" name="cust_trans_not_chg" id="cust_trans_not_chg" onkeyup="cust_trans_calc();">
																	<div class="fv-plugins-message-container invalid-feedback" id=""></div>
																</div>
																<div class="col-lg-6">
																<div class="d-flex align-items-center">
																	<label class="form-check form-check-inline form-check-solid me-5 is-invalid">
																		<input class="form-check-input" name="cus_tr_form_missing" type="checkbox" value="1" id="cus_tr_form_missing" onclick="cus_tr_frm_missing()">
																	</label>
																	<label class="col-form-label fw-semibold fs-6 me-5">Form Missing</label>
																</div>
															</div>
															<div class="col-lg-6" id="cus_tr_form_miss_print_but" style="display:none;">
																<a class="btn btn-sm btn-outline btn-outline-solid btn-outline-warning btn-active-light-primary me-1" target="_blank" id="cust_trans_btn_print1">Print 1</a>
																<a class="btn btn-sm btn-outline btn-outline-solid btn-outline-warning btn-active-light-primary me-1" target="_blank" id="cust_trans_btn_print2">Print 2</a>
																<a id="cust_trans_btn_print3" target="_blank"><i class="fa fa-print" title="Legal Print" aria-hidden="true"></i></a>
															</div>
																<!-- <label class="col-lg-6 col-form-label fw-semibold fs-6">Form Missing</label> -->
																<!-- <div class="col-lg-6"> -->
																	<input type="hidden"class="form-control form-control-lg form-control-solid" placeholder="" value="100" name="cust_trans_frm_miss_chg" id="cust_trans_frm_miss_chg" onkeyup="cust_trans_calc();">
																	<!-- <div class="fv-plugins-message-container invalid-feedback" id=""></div> -->
																<!-- </div> -->
																
															</div>
														</div>
														<div class="col-lg-4">
															<div class="row">
																<label class="col-lg-6 col-form-label fw-semibold fs-6">On Account</label>
																<div class="col-lg-6">
																	<input type="text"class="form-control form-control-lg form-control-solid" placeholder="" value="0" style="background-color: #ff5b5b; color: white" name="cust_trans_on_acc_chg" id="cust_trans_on_acc_chg" onkeyup="cust_trans_calc();">
																	<div class="fv-plugins-message-container invalid-feedback"></div>
																</div>
																<label class="col-lg-6 col-form-label fw-semibold fs-6">Discount</label>
																<div class="col-lg-6">
																	<input type="text"class="form-control form-control-lg form-control-solid" placeholder="" value="0" name="cust_trans_disc_chg" id="cust_trans_disc_chg" onkeyup="cust_trans_calc();">
																	<div class="fv-plugins-message-container invalid-feedback" id=""></div>
																</div>
																<div class="col-lg-2 mb-2" id="cus_tr_upload_doc" style="display:none;">
																<div class="image-input image-input-outline " data-kt-image-input="true" style="background-image: url(assets/images/Document.jpg)">
																	<div class="image-input-wrapper w-50px h-50px" style="background-image: url(assets/images/Document.jpg)"></div>
																	<label class="btn btn-icon btn-circle btn-active-color-primary w-20px h-20px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" data-kt-initialized="1">
																		<i class="bi bi-pencil-fill fs-8"></i>
																		<input type="file" name="add_c_logo" accept=".png, .jpg, .jpeg">
																		<input type="hidden" name="add_c_logo_remove">
																	</label>
																	<span class="btn btn-icon btn-circle btn-active-color-primary w-20px h-20px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" data-kt-initialized="1">
																		<i class="bi bi-x fs-4"></i>
																	</span>
																	<span class="btn btn-icon btn-circle btn-active-color-primary w-20px h-20px bg-body shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" data-kt-initialized="1">
																		<i class="bi bi-x fs-4"></i>
																	</span>
																</div>
															</div>
																<div class="col-lg-10 text-center">
																	<label class="col-form-label fw-bold fs-2">Net Pay &emsp;</label>
																	<label class="col-form-label fw-bold fs-2" id="lbl_cust_trans_net_pay">11977.01</label>
																</div>
															</div>
														</div>
														<div class="col-lg-4">
															<div class="row">
																<label class="col-lg-6 col-form-label required fw-semibold fs-6">Closed By</label>
																<div class="col-lg-6 fv-row fv-plugins-icon-container">
																	<select class="form-select form-select-solid" name="cus_trans_closed_by" id="cus_trans_closed_by" data-control="select2" data-hide-search="true" onchange="cus_tr_cls_by();">	
																		<option value="">Select</option>
																		<option value="party" selected>Party</option>
																		<option value="nominee">Nominee</option>
																		<option value="others">Others</option>
																	</select>
																</div>
																<label class="col-lg-6 col-form-label required fw-semibold fs-6" id="cus_trans_closed_by_name_lab" style="display:none;">Name</label>
																<div class="col-lg-6" id="cus_trans_closed_by_name_tbox" style="display:none;">
																	<input type="text"class="form-control form-control-lg form-control-solid" placeholder="" value="Selvam" name="cust_trans_by_others" id="cust_trans_by_others">
																	<div class="fv-plugins-message-container invalid-feedback"></div>
																</div>
															</div>
														</div>
													</div>
													<div class="row">
														<!-- <label class="col-form-label fw-bold fs-5">Party Need More Cash</label> -->
														<label class="col-lg-2 col-form-label fw-semibold fs-6">Payable Amount</label>
														<div class="col-lg-2">
															<input type="text"class="form-control form-control-lg form-control-solid" placeholder="" value="0" name="cust_trans_payable_amount" id="cust_trans_payable_amount" onkeyup="cust_trans_calc()">
															<div class="fv-plugins-message-container invalid-feedback" id="cust_trans_payable_amount_err"></div>
														</div>
														<div class="col-lg-2">
															<div class="btn btn-sm btn-outline btn-outline-solid btn-outline-warning btn-active-light-primary me-2" data-bs-toggle="modal" data-bs-target="#kt_modal_view_payment_pay_now_party">Pay Now Party</div>
														</div>
													</div>
													<div class="row">
														<label class="col-lg-2 col-form-label fw-semibold fs-6">Balance in Current Loan</label>
														<div class="col-lg-2">
															<input type="text"class="form-control form-control-lg form-control-solid" placeholder="" value="0" name="cust_trans_bal_in_loan" id="cust_trans_bal_in_loan">
															<div class="fv-plugins-message-container invalid-feedback" id="cust_trans_bal_in_loan_err"></div>
														</div>
														<label class="col-lg-2 col-form-label fw-semibold fs-6">Request from New Loan</label>
														<div class="col-lg-2">
															<input type="text"class="form-control form-control-lg form-control-solid fw-bold fs-4" placeholder="" value="0" name="cust_trans_req_frm_new_loan" id="cust_trans_req_frm_new_loan" onkeyup="cust_trans_calc();">
															<div class="fv-plugins-message-container invalid-feedback" id="cust_trans_req_frm_new_loan_err"></div>
														</div>
														
													</div>
													<div class="row mt-4">
														<div class="accordion" id="kt_accordion_item_redemption_new_loan">
													    <div class="accordion-item">
													        <h2 class="accordion-header" id="kt_accordion_item_redemption_new_loan_header_1">
													            <button class="accordion-button fw-bold fs-6 collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#kt_accordion_item_redemption_new_loan_body_1" aria-expanded="true" aria-controls="kt_accordion_item_redemption_new_loan_body_1">
													            New Loan Entry</button>
													        </h2>
													        <div id="kt_accordion_item_redemption_new_loan_body_1" class="accordion-collapse collapse show" aria-labelledby="kt_accordion_item_redemption_new_loan_header_1" data-bs-parent="#kt_accordion_item_redemption_new_loan">
													            <div class="accordion-body">
													            	<div class="row">
													            		<div class="col-lg-1">
													            			<label class="col-form-label required fw-semibold fs-6">JewelType</label>
													            		</div>
																		<div class="col-lg-2 fv-row fv-plugins-icon-container">
																			<select class="form-select form-select-solid" name="cust_trans_new_ln_jewel_type" id="cust_trans_new_ln_jewel_type" data-control="select2" data-hide-search="true">	
																				<option value="">Select</option>
																				<?php 
																					$jeweltype=$this->db->query("select * from jewel_type")->result_array();
																					foreach ($jeweltype as $jtlist) {
																				?>
																					<option value="<?php echo $jtlist['jewel_type_id']; ?>"> <?php echo $jtlist['jewel_type']; ?> </option>
																				<?php
																					}
																				?>
																			</select>
																			<div class="fv-plugins-message-container invalid-feedback" id="cust_trans_new_ln_jewel_type_err"></div>
																		</div>
																		<label class="col-lg-1 col-form-label required fw-semibold fs-6">Scheme</label>
																		<div class="col-lg-2 fv-row fv-plugins-icon-container">
																			<select class="form-select form-select-solid" name="cust_trans_new_ln_scheme" id="cust_trans_new_ln_scheme" data-control="select2" data-hide-search="true" onchange="loan_interest();">	
																				<option value="">Select</option>
																				<?php 
																					foreach ($int_grp_list as $ilist) 
																					{
																				?>
																					<option value="<?php echo $ilist['INT_GROUP'];?>"><?php echo $ilist['INT_GROUP'];?></option>
																				<?php
																					}
																				?>
																			</select>
																			<div class="fv-plugins-message-container invalid-feedback" id="cust_trans_new_ln_scheme_err"></div>
																		</div>
																		<label class="col-lg-1 col-form-label required fw-semibold fs-6">Int Type</label>
																		<div class="col-lg-2 fv-row fv-plugins-icon-container">
																			<select class="form-select form-select-solid" name="cust_trans_new_ln_int_type" id="cust_trans_new_ln_int_type" data-control="select2" data-hide-search="true" onchange="get_exp_int_amt();">	
																				<option value="">Select</option>
																				
																			</select>
																			<div class="fv-plugins-message-container invalid-feedback" id="cust_trans_new_ln_int_type_err"></div>
																		</div>
																		<div class="col-lg-3">
																			<label class="col-form-label fw-semibold fs-6">Expiry Date &emsp;</label>
																			<label class="col-form-label fw-bold fs-5" id="cust_trans_new_ln_exp_dt">25-06-2023</label>
																		</div>
										            				</div>
													            	
																	<div class="row mt-4">
																		<div class="col-lg-4">
																			<div class="px-4" style="border-radius: 10px;padding-bottom: 10px;box-shadow: 0 5px 10px #00002947;">
																				<label class="col-lg-12 col-form-label fw-bold fs-5 text-center">Loan Payment Information</label>
																				<div class="row">
																					<!--begin::Label-->
																					<label class="col-lg-6 col-form-label required fw-semibold fs-6">Loan Amount</label>
																					<!--end::Label-->
																					<!--begin::Col-->
																					<div class="col-lg-6 fv-row fv-plugins-icon-container">
																						<input type="text" name="cust_trans_new_ln_loan_amount" id="cust_trans_new_ln_loan_amount" class="form-control form-control-lg1 form-control-solid" value="16977.01" style="font-size: 18px !important;font-weight: 700 !important;color: #1B439E !important;" onkeyup="cust_trans_calc();">
																						<div class="fv-plugins-message-container invalid-feedback" id="cust_trans_new_ln_loan_amount_err"></div>
																					</div>
																					<!--end::Col-->
																				</div>
																				<div class="row">
																					<!--begin::Label-->
																					<label class="col-lg-6 col-form-label fw-semibold fs-6">Monthly Interest</label>
																					<label class="col-lg-6 col-form-label fw-bold fs-5"><span style="background-color:#C6C6C6;border-radius: 8px;padding: 5px 15px 5px 15px;"  id="cust_trans_new_ln_monthly_interest">250.00</span></label>
																				</div>
																				<div class="row">
																					<!--begin::Label-->
																					<label class="col-lg-6 col-form-label required fw-semibold fs-6">Redemption period</label>
																					<!--end::Label-->
																					<!--begin::Col-->
																					<div class="col-lg-3 fv-row fv-plugins-icon-container">
																						<input type="text" name="cust_trans_new_ln_redemption_period" id="cust_trans_new_ln_redemption_period" class="form-control form-control-lg1 form-control-solid" value="30">
																						<div class="fv-plugins-message-container invalid-feedback" id="cust_trans_new_ln_redemption_period_err"></div>
																					</div>
																					<!--end::Col-->
																					<label class="col-lg-3 col-form-label fw-semibold fs-6" id="loan_per_mon_days">Days</label>
																				</div>
																				<div class="row">
																					<div class="d-flex justify-content-center align-items-center">
																						<label class="col-form-label fw-bold fs-3">Total Loan Amount &emsp; <span id="cust_trans_new_ln_total_amount">16977.01</span></label>
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
																						<label class="col-form-label fw-bold fs-3" id="cust_trans_new_ln_ptr_curr_loan_net_pay">11977.01</label>
																					</div>
																					<label class="col-lg-6 col-form-label fw-semibold fs-6">Processing Charge</label>
																					<div class="col-lg-6 fv-row fv-plugins-icon-container">
																						<input type="text" name="cust_trans_new_ln_process_chg" id="cust_trans_new_ln_process_chg" class="form-control form-control-lg1 form-control-solid" placeholder="Processing Charge" value="50" onkeyup="cust_trans_calc();">
																						<div class="fv-plugins-message-container invalid-feedback"></div>
																					</div>
																					<label class="col-lg-6 col-form-label fw-semibold fs-6">Document Charge</label>
																					<label class="col-lg-6 col-form-label fw-bold fs-5" id="cust_trans_new_ln_doc_chg">50</label>
																					<input type="hidden" name="cust_trans_new_ln_doc_chg_hidden" id="cust_trans_new_ln_doc_chg_hidden">
																				</div>
																				<div class="row mt-1">
																					<label class="col-lg-12 col-form-label fw-bold fs-3 text-center">Total &emsp; <span id="cust_trans_new_ln_ptr_total_amount">12077.01</span></label>
																				</div>
																			</div>
																		</div>
																		<div class="col-lg-4">
																			<div class="px-4" style="padding-bottom: 5px;border-radius: 10px;box-shadow: 0 5px 10px #00002947;">
																				<label class="col-lg-12 col-form-label fw-bold fs-5 text-center">To Pay</label>
																				<div class="row">
																					<label class="col-lg-4 col-form-label fw-bold fs-3">Net Pay</label>
																					<label class="col-lg-4 col-form-label fw-bold fs-3" id="cust_trans_new_ln_topay_net_pay">4900.00</label>
																					<div class="col-lg-4">
																						<div class="btn btn-sm btn-outline btn-outline-solid btn-outline-warning btn-active-light-primary me-2" data-bs-toggle="modal" data-bs-target="#kt_modal_view_payment_cus_trans">Pay Now</div>
																					</div>
																				</div>
																				<div class="row">
																					<label class="col-lg-4 col-form-label fw-semibold fs-6">Remarks</label>
																				</div>
																				<div class="row mb-2">
																					<div class="col-lg-12 fv-row fv-plugins-icon-container">
																						<textarea class="form-control form-select-solid fw-semibold fs-5" rows="3" id="cust_trans_new_ln_topay_remarks" name="cust_trans_new_ln_topay_remarks"></textarea>
																						<div class="fv-plugins-message-container invalid-feedback"></div>
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
													
													<div class="row">
														<div class="col-lg-4 text-center">
															<label class="col-form-label fw-semibold fs-6">Net Payable &emsp;</label>
															<label class="col-form-label fw-bold fs-2" id="cust_trans_fin_net_payable">4900.00</label>
														</div>
														<div class="col-lg-4 text-center">
															<label class="col-form-label fw-semibold fs-6">Paid Amount &emsp;</label>
															<label class="col-form-label fw-bold fs-2" id="cust_trans_fin_paid_amt">4900.00</label>
														</div>
														<div class="col-lg-4 text-center">
															<label class="col-form-label fw-semibold fs-6">Balance Amount &emsp;</label>
															<label class="col-form-label fw-bold fs-2" id="cust_trans_fin_bal_amt">0.00</label>
														</div>
													</div>
												</div>
												<!-- </div> -->
												<!-- Customer Transfer end -->
												<!-- Customer Sale Start -->
												<div class="px-4" id="cus_sale_tbox" style="display: none;">
													<div class="row mt-4">
														<label class="col-lg-2 col-form-label fw-bold fs-3">Customer Sale</label>
														<div class="col-lg-10">
															<label class="col-form-label fw-bold fs-3">Total Balance &emsp;</label>
															<label class="col-form-label fw-bold fs-3" id="cust_sale_total_amount">10927.01</label>
															<span class="fw-bold fs-3">&emsp;(&nbsp;</span>
															<label class="col-form-label fw-bold fs-3">Principal &emsp;</label>
															<label class="col-form-label fw-bold fs-3" id="cust_sale_total_principal">10557.50</label>&emsp;
															<label class="col-form-label fw-bold fs-3">Interest &emsp;</label>
															<label class="col-form-label fw-bold fs-3" id="cust_sale_total_interest">369.51</label>
															<span class="fw-bold fs-3">&nbsp;)</span>
														</div>
														<div class="col-lg-4">
															<div class="row">
																<label class="col-lg-6 col-form-label fw-semibold fs-6">Paper Action Charge</label>
																<div class="col-lg-6">
																	<input type="text"class="form-control form-control-lg form-control-solid" placeholder="" value="0" name="cust_sale_pap_act_chg" id="cust_sale_pap_act_chg" onkeyup="cust_sale_calc();">
																	<div class="fv-plugins-message-container invalid-feedback" id=""></div>
																</div>
																<label class="col-lg-6 col-form-label fw-semibold fs-6">Notice Charge</label>
																<div class="col-lg-6">
																	<input type="text"class="form-control form-control-lg form-control-solid" placeholder="" value="0" name="cust_sale_not_chg" id="cust_sale_not_chg" onkeyup="cust_sale_calc();">
																	<div class="fv-plugins-message-container invalid-feedback" id=""></div>
																</div>
																<!-- <label class="col-lg-6 col-form-label fw-semibold fs-6">Form Missing</label> -->
																<!-- <div class="col-lg-6"> -->
																	<input type="hidden"class="form-control form-control-lg form-control-solid" placeholder="" value="100" name="cust_sale_frm_miss_chg" id="cust_sale_frm_miss_chg" onkeyup="cust_sale_calc();">
																	<!-- <div class="fv-plugins-message-container invalid-feedback" id=""></div> -->
																<!-- </div> -->
																<div class="col-lg-6">
																	<div class="d-flex align-items-center">
																		<label class="form-check form-check-inline form-check-solid me-5 is-invalid">
																			<input class="form-check-input" name="cus_sl_form_missing" type="checkbox" value="1" id="cus_sl_form_missing" onclick="cus_sl_frm_missing()">
																		</label>
																		<label class="col-form-label fw-semibold fs-6 me-5">Form Missing</label>
																	</div>
																</div>
																<div class="col-lg-6" id="cus_sl_form_miss_print_but" style="display:none;">
																	<a class="btn btn-sm btn-outline btn-outline-solid btn-outline-warning btn-active-light-primary me-1" target="_blank" id="cust_sal_btn_print1">Print 1</a>
																	<a class="btn btn-sm btn-outline btn-outline-solid btn-outline-warning btn-active-light-primary me-1" target="_blank" id="cust_sal_btn_print2">Print 2</a>
																	<a id="cust_sal_btn_print3" target="_blank" ><i class="fa fa-print" title="Legal Print" aria-hidden="true"></i></a>
																</div>
															</div>
														</div>
														<div class="col-lg-4">
															<div class="row">
																<label class="col-lg-6 col-form-label fw-semibold fs-6">On Account</label>
																<div class="col-lg-6">
																	<input type="text"class="form-control form-control-lg form-control-solid" placeholder="" value="0" style="background-color: #ff5b5b; color: white" name="cust_sale_on_acc_chg" id="cust_sale_on_acc_chg" onkeyup="cust_sale_calc();">
																	<div class="fv-plugins-message-container invalid-feedback"></div>
																</div>
																<label class="col-lg-6 col-form-label fw-semibold fs-6">Discount</label>
																<div class="col-lg-6">
																	<input type="text"class="form-control form-control-lg form-control-solid" placeholder="" value="0" name="cust_sale_disc_chg" id="cust_sale_disc_chg" onkeyup="cust_sale_calc();">
																	<div class="fv-plugins-message-container invalid-feedback" id=""></div>
																</div>
																<div class="col-lg-2" id="cus_sl_upload_doc" style="display:none;">
																	<div class="image-input image-input-outline " data-kt-image-input="true" style="background-image: url(assets/images/Document.jpg)">
																		<div class="image-input-wrapper w-50px h-50px" style="background-image: url(assets/images/Document.jpg)"></div>
																		<label class="btn btn-icon btn-circle btn-active-color-primary w-20px h-20px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" data-kt-initialized="1">
																			<i class="bi bi-pencil-fill fs-8"></i>
																			<input type="file" name="add_c_logo" accept=".png, .jpg, .jpeg">
																			<input type="hidden" name="add_c_logo_remove">
																		</label>
																		<span class="btn btn-icon btn-circle btn-active-color-primary w-20px h-20px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" data-kt-initialized="1">
																			<i class="bi bi-x fs-4"></i>
																		</span>
																		<span class="btn btn-icon btn-circle btn-active-color-primary w-20px h-20px bg-body shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" data-kt-initialized="1">
																			<i class="bi bi-x fs-4"></i>
																		</span>
																	</div>
																</div>
																<div class="col-lg-10 text-center">
																	<label class="col-form-label fw-bold fs-2">Net Pay &emsp;</label>
																	<label class="col-form-label fw-bold fs-2" id="lbl_cust_sale_net_pay">11977.01</label>
																</div>
															</div>
														</div>
														<div class="col-lg-4">
															<div class="row">
																<label class="col-lg-6 col-form-label required fw-semibold fs-6">Closed By</label>
																<div class="col-lg-6 fv-row fv-plugins-icon-container">
																	<select class="form-select form-select-solid" name="cus_sale_closed_by" id="cus_sale_closed_by" data-control="select2" data-hide-search="true" onchange="cus_sl_cls_by();">	
																		<option value="">Select</option>
																		<option value="party" selected>Party</option>
																		<option value="nominee">Nominee</option>
																		<option value="others">Others</option>
																	</select>
																</div>
																<label class="col-lg-6 col-form-label required fw-semibold fs-6" id="cus_sale_closed_by_name_lab" style="display:none;">Name</label>
																<div class="col-lg-6" id="cus_sale_closed_by_name_tbox" style="display:none;">
																	<input type="text"class="form-control form-control-lg form-control-solid" placeholder="" value="Selvam" name="cust_sale_by_others" id="cust_sale_by_others">
																	<div class="fv-plugins-message-container invalid-feedback" id="cust_sale_by_others_err"></div>
																</div>
															</div>
														</div>
													</div>
													<div class="row mt-4">
														<div class="col-lg-7">
															<div class="row">
																<label class="col-lg-3 col-form-label required fw-semibold fs-6">Purchase Amount</label>
																<div class="col-lg-3">
																	<input type="text"class="form-control form-control-lg form-control-solid fw-bold fs-4" placeholder="Pur. Amount" value="0" name="r_purhcase_amount" id="r_purhcase_amount" onkeyup="cust_sale_calc_remaining_amount();">
																	<div class="fv-plugins-message-container invalid-feedback" id="r_purhcase_amount_err"></div>
																</div>
																<label class="col-lg-2 col-form-label required fw-semibold fs-6">Balance</label>
																<div class="col-lg-4">
																	<input type="text"class="form-control form-control-lg form-control-solid fw-bold fs-4" placeholder="Bal. Amount" value="0" name="r_remaining_amount" id="r_remaining_amount" onkeyup="cust_sale_check_remaining_amount();">
																	<div class="fv-plugins-message-container invalid-feedback" id="r_remaining_amount_err"></div>
																</div>
																<label class="col-form-label fw-bold fs-5">Payment From Company</label>
															
																<div class="col-lg-3 fv-row fv-plugins-icon-container fv-plugins-bootstrap5-row-invalid">
																	<div class="d-flex align-items-center mt-1">
																		<label class="form-check form-check-inline form-check-solid me-5 is-invalid">
																			<input class="form-check-input" name="cash_cus_sale_paid_from_company_add_radio" type="checkbox" value="1" id="cash_cus_sale_paid_from_company_add_radio" onclick="cash_cus_sl_pdfrm_cmy_add_radio()">
																		</label>
																		<label class="col-form-label fw-semibold fs-6 me-5">Cash</label>
																	</div>
																</div>
																<div class="col-lg-3 fv-row fv-plugins-icon-container fv-plugins-bootstrap5-row-invalid">
																	<div class="d-flex align-items-center mt-1">
																		<label class="form-check form-check-inline form-check-solid me-5 is-invalid">
																			<input class="form-check-input" name="cheque_cus_sale_paid_from_company_add_radio" type="checkbox" value="1" id="cheque_cus_sale_paid_from_company_add_radio" onclick="cheque_cus_sl_pdfrm_cmy_add_radio()">
																		</label>
																		<label class="col-form-label fw-semibold fs-6">Cheque</label>
																	</div>
																</div>
																<div class="col-lg-3 fv-row fv-plugins-icon-container fv-plugins-bootstrap5-row-invalid">
																	<div class="d-flex align-items-center mt-1">
																		<label class="form-check form-check-inline form-check-solid me-5 is-invalid">
																			<input class="form-check-input" name="rtgs_cus_sale_paid_from_company_add_radio" type="checkbox" value="1" id="rtgs_cus_sale_paid_from_company_add_radio" onclick="rtgs_cus_sl_pdfrm_cmy_add_radio()">
																		</label>
																		<label class="col-form-label fw-semibold fs-6">RTGS</label>
																	</div>
																</div>
																<div class="col-lg-3 fv-row fv-plugins-icon-container fv-plugins-bootstrap5-row-invalid">
																	<div class="d-flex align-items-center mt-1">
																		<label class="form-check form-check-inline form-check-solid me-5 is-invalid">
																			<input class="form-check-input" name="upi_cus_sale_paid_from_company_add_radio" type="checkbox" value="1" id="upi_cus_sale_paid_from_company_add_radio" onclick="upi_cus_sl_pdfrm_cmy_add_radio()">
																		</label>
																		<label class="col-form-label fw-semibold fs-6">UPI</label>
																	</div>
																</div>
															</div>
															<!-- </div> -->
														</div>
														<div class="col-lg-5">
															<div class="row">
																<label class="col-form-label fw-bold fs-3 text-center">Witness Details</label>
																<table class="table align-middle table-hover fs-7 gy-1 gs-2" id="kt_datatable_redemp_add_multi_jwl_witness">
																	<thead>
																		<tr class="text-start text-muted fw-bold fs-7 gs-0">
																			<th class="min-w-50px">Name</th>
																			<th class="min-w-50px">Relation</th>
																			<th class="min-w-50px">Mobile</th>
																			<th class="min-w-50px">Remarks</th>
																		</tr>
																	</thead>
																	<tbody class="text-gray-600 fw-semibold">
																		<tr>
																			<td>
																				<div style="width:100px !important;">
																					<input type="text" class="form-control form-control-lg form-control-solid fs-7" id="w_name1" name="w_name[]" >
																				</div>
																			</td>
																			<td>
																				<div style="width:120px !important;">
																					<select class="form-select form-select-solid fs-7" data-control="select2"  id="w_relation1" name="w_relation[]" >	
																						<option value="">Select</option>
																						<option value="Mother">Mother</option>
																						<option value="Father">Father</option>				
																						<option value="Brother">Brother</option>
																						<option value="Sister">Sister</option>
																						<option value="Wife">Wife</option>
																						<option value="Husband">Husband</option>
																						<option value="Son">Son</option>
																						<option value="Daughter">Daughter</option>
																						<option value="Father in Law">Father in Law</option>
																						<option value="Mother in Law">Mother in Law</option>
																						<option value="Son in Law">Son in Law</option>
																						<option value="Daughter in Law">Daughter in Law</option>
																						<option value="Grand Father">Grand Father</option>
																						<option value="Grand Mother">Grand Mother</option>
																						<option value="Uncle">Uncle</option>
																						<option value="Aunty">Aunty</option>
																						<option value="Others">Others</option>
																					</select>
																				</div>
																			</td>
																			<td>
																				<div style="width:85px !important;">
																					<input type="text" class="form-control form-control-lg form-control-solid fs-7" id="w_phone1" name="w_phone[]" >
																				</div>
																			</td>
																			<td>
																				<div style="width:85px !important;">
																					<textarea class="form-control form-control-solid fs-7" id="w_remarks1" name="w_remarks[]" ></textarea>
																				</div>
																			</td>
																		</tr>
																		<tr>
																			<td>
																				<div style="width:100px !important;">
																					<input type="text" class="form-control form-control-lg form-control-solid fs-7" id="w_name2" name="w_name[]">
																				</div>
																			</td>
																			<td>
																				<div style="width:120px !important;">
																					<select class="form-select form-select-solid fs-7" data-control="select2" id="w_relation2" name="w_relation[]">	
																						<option value="">Select</option>
																						<option value="Mother">Mother</option>
																						<option value="Father">Father</option>				
																						<option value="Brother">Brother</option>
																						<option value="Sister">Sister</option>
																						<option value="Wife">Wife</option>
																						<option value="Husband">Husband</option>
																						<option value="Son">Son</option>
																						<option value="Daughter">Daughter</option>
																						<option value="Father in Law">Father in Law</option>
																						<option value="Mother in Law">Mother in Law</option>
																						<option value="Son in Law">Son in Law</option>
																						<option value="Daughter in Law">Daughter in Law</option>
																						<option value="Grand Father">Grand Father</option>
																						<option value="Grand Mother">Grand Mother</option>
																						<option value="Uncle">Uncle</option>
																						<option value="Aunty">Aunty</option>
																						<option value="Others">Others</option>
																					</select>
																				</div>
																			</td>
																			<td>
																				<div style="width:85px !important;">
																					<input type="text" class="form-control form-control-lg form-control-solid fs-7" id="w_phone2" name="w_phone[]" >
																				</div>
																			</td>
																			<td>
																				<div style="width:85px !important;">
																					<textarea class="form-control form-control-solid fs-7" name="w_remarks[]" id="w_remarks2"></textarea>
																				</div>
																			</td>
																		</tr>
																		<tr>
																			<td>
																				<div style="width:100px !important;">
																					<input type="text" class="form-control form-control-lg form-control-solid fs-7" id="w_name3" name="w_name[]">
																				</div>
																			</td>
																			<td>
																				<div style="width:120px !important;">
																					<select class="form-select form-select-solid fs-7" data-control="select2" id="w_relation3" name="w_relation[]" >	
																						<option value="">Select</option>
																						<option value="Mother">Mother</option>
																						<option value="Father">Father</option>				
																						<option value="Brother">Brother</option>
																						<option value="Sister">Sister</option>
																						<option value="Wife">Wife</option>
																						<option value="Husband">Husband</option>
																						<option value="Son">Son</option>
																						<option value="Daughter">Daughter</option>
																						<option value="Father in Law">Father in Law</option>
																						<option value="Mother in Law">Mother in Law</option>
																						<option value="Son in Law">Son in Law</option>
																						<option value="Daughter in Law">Daughter in Law</option>
																						<option value="Grand Father">Grand Father</option>
																						<option value="Grand Mother">Grand Mother</option>
																						<option value="Uncle">Uncle</option>
																						<option value="Aunty">Aunty</option>
																						<option value="Others">Others</option>
																					</select>
																				</div>
																			</td>
																			<td>
																				<div style="width:85px !important;">
																					<input type="text" class="form-control form-control-lg form-control-solid fs-7" id="w_phone3" name="w_phone[]" >
																				</div>
																			</td>
																			<td>
																				<div style="width:85px !important;">
																					<textarea class="form-control form-control-solid fs-7" name="w_remarks[]" id="w_remarks3"></textarea>
																				</div>
																			</td>
																		</tr>
																		<tr>
																			<td>
																				<div style="width:100px !important;">
																					<input type="text" class="form-control form-control-lg form-control-solid fs-7" id="w_name4" name="w_name[]">
																				</div>
																			</td>
																			<td>
																				<div style="width:120px !important;">
																					<select class="form-select form-select-solid fs-7" data-control="select2" id="w_relation4" name="w_relation[]">	
																						<option value="">Select</option>
																						<option value="Mother">Mother</option>
																						<option value="Father">Father</option>				
																						<option value="Brother">Brother</option>
																						<option value="Sister">Sister</option>
																						<option value="Wife">Wife</option>
																						<option value="Husband">Husband</option>
																						<option value="Son">Son</option>
																						<option value="Daughter">Daughter</option>
																						<option value="Father in Law">Father in Law</option>
																						<option value="Mother in Law">Mother in Law</option>
																						<option value="Son in Law">Son in Law</option>
																						<option value="Daughter in Law">Daughter in Law</option>
																						<option value="Grand Father">Grand Father</option>
																						<option value="Grand Mother">Grand Mother</option>
																						<option value="Uncle">Uncle</option>
																						<option value="Aunty">Aunty</option>
																						<option value="Others">Others</option>
																					</select>
																				</div>
																			</td>
																			<td>
																				<div style="width:85px !important;"> 
																					<input type="text" class="form-control form-control-lg form-control-solid fs-7"  id="w_phone4" name="w_phone[]" >
																				</div>
																			</td>
																			<td>
																				<div style="width:85px !important;">
																					<textarea class="form-control form-control-solid fs-7" name="w_remarks[]" id="w_remarks4"></textarea>
																				</div>
																			</td>
																		</tr>
																		<tr>
																			<td>
																				<div style="width:100px !important;">
																					<input type="text" class="form-control form-control-lg form-control-solid fs-7" id="w_name5" name="w_name[]">
																				</div>
																			</td>
																			<td>
																				<div style="width:120px !important;">
																					<select class="form-select form-select-solid fs-7" data-control="select2" id="w_relation5" name="w_relation[]">	
																						<option value="">Select</option>
																						<option value="Mother">Mother</option>
																						<option value="Father">Father</option>				
																						<option value="Brother">Brother</option>
																						<option value="Sister">Sister</option>
																						<option value="Wife">Wife</option>
																						<option value="Husband">Husband</option>
																						<option value="Son">Son</option>
																						<option value="Daughter">Daughter</option>
																						<option value="Father in Law">Father in Law</option>
																						<option value="Mother in Law">Mother in Law</option>
																						<option value="Son in Law">Son in Law</option>
																						<option value="Daughter in Law">Daughter in Law</option>
																						<option value="Grand Father">Grand Father</option>
																						<option value="Grand Mother">Grand Mother</option>
																						<option value="Uncle">Uncle</option>
																						<option value="Aunty">Aunty</option>
																						<option value="Others">Others</option>
																					</select>
																				</div>
																			</td>
																			<td>
																				<div style="width:85px !important;">
																					<input type="text" class="form-control form-control-lg form-control-solid fs-7" id="w_phone5" name="w_phone[]" >
																				</div>
																			</td>
																			<td>
																				<div style="width:85px !important;">
																					<textarea class="form-control form-control-solid fs-7" name="w_remarks[]" id="w_remarks5"></textarea>
																				</div>
																			</td>
																		</tr>
																	</tbody>
																</table>
															</div>
														</div>
													</div>
													<div class="row">
														<label class="col-lg-1 col-form-label fw-semibold fs-6" id="cus_sl_cash_paid_from_cmy_label" style="display:none;">Cash</label>
														<div class="col-lg-2 fv-row fv-plugins-icon-container" id="cus_sl_cash_paid_from_cmy_tbox" style="display:none;">
															<input type="text" class="form-control form-control-lg form-control-solid" placeholder="Amount" name="cust_sale_cpcash_amt" id="cust_sale_cpcash_amt"  onkeyup="cust_sale_company_payment_calc();" value="0">
															<div class="fv-plugins-message-container invalid-feedback" id="cust_sale_cpcash_amt_err"></div>
														</div>
														<div class="col-lg-2 fv-row fv-plugins-icon-container" id="cus_sl_cash_paid_from_detail_cmy_tbox" style="display:none;">
															<textarea class="form-control form-control-solid" rows="1" placeholder="Details" name="cust_sale_cpcash_details" id="cust_sale_cpcash_details"></textarea>
															<div class="fv-plugins-message-container invalid-feedback" id="cust_sale_cpcash_details_err"></div>
														</div>
													</div>
													<div class="row">
														<label class="col-lg-1 col-form-label fw-semibold fs-6" id="cus_sl_cheque_paid_from_cmy" style="display:none;">Cheque</label>
														<div class="col-lg-2 fv-row fv-plugins-icon-container"id="cus_sl_cheque_amt_paid_from_cmy_tbox" style="display:none;" >
															<input type="text" class="form-control form-control-lg form-control-solid" placeholder="Amount" name="cust_sale_cpchq_amt" id="cust_sale_cpchq_amt"  onkeyup="cust_sale_company_payment_calc();" value="0" >
															<div class="fv-plugins-message-container invalid-feedback" id="cust_sale_cpchq_amt_err"></div>
														</div>
														<div class="col-lg-2 fv-row fv-plugins-icon-container" id="cus_sl_cheque_no_paid_from_cmy_tbox" style="display:none;">
															<input type="text" class="form-control form-control-lg form-control-solid" placeholder="Cheque No"  name="cust_sale_cpchq_no" id="cust_sale_cpchq_no">
															<div class="fv-plugins-message-container invalid-feedback" id="cust_sale_cpchq_no_err"></div>
														</div>
														<div class="col-lg-3 fv-row fv-plugins-icon-container" id="cus_sl_cheque_com_bank_paid_from_cmy_tbox" style="display:none;">
															<select class="form-select form-select-solid" data-control="select2" data-hide-search="true" name="cust_sale_cpchq_comp_bank" id="cust_sale_cpchq_comp_bank" data-placeholder="Company Bank">
																<option value="">Select</option>
																<?php
																	$bnk_det=$this->db->query("select * from BANKS where ACTIVE='Y'")->result_array();
																	foreach ($bnk_det as $blist) 
																	{
																?>
																<option value="<?php echo $blist['SNO'];?>"><?php
																$len=strlen( $blist['ACCOUNTNO']);
																$acc_no=substr($blist['ACCOUNTNO'], $len-4);
																 echo $blist['BANKNAME']." - ".$acc_no." - ".$blist['BRANCH']." - ".$blist['PERSONNAME'];?></option>
																<?php 	} 	?>
															</select>
															<div class="fv-plugins-message-container invalid-feedback" id="cust_sale_cpchq_comp_bank_err"></div>
														</div>
														<div class="col-lg-2 fv-row fv-plugins-icon-container" id="cus_sl_cheque_par_bank_paid_from_cmy_tbox" style="display:none;">
															<select class="form-select form-select-solid" data-control="select2" data-placeholder="Party Bank" data-hide-search="true" name="cust_sale_cpchq_party_bank" id="cust_sale_cpchq_party_bank">
																<option value="">Select</option>
																<option value="1">UPI-12546875-kumar</option>				
																<option value="2">Bank-1254867-Kumar</option>
															</select>
															<div class="fv-plugins-message-container invalid-feedback" id="cust_sale_cpchq_party_bank_err"></div>
														</div>
														<div class="col-lg-2 fv-row fv-plugins-icon-container"  id="cus_sl_cheque_detail_paid_from_cmy_tbox" style="display:none;">
															<textarea class="form-control form-control-solid" rows="1" placeholder="Details" name="cust_sale_cpchq_details" id="cust_sale_cpchq_details"></textarea>
															<div class="fv-plugins-message-container invalid-feedback" id="cust_sale_cpchq_details_err"></div>
														</div>
													</div>
													<div class="row">
														<label class="col-lg-1 col-form-label fw-semibold fs-6" id="cus_sl_rtgs_paid_from_cmy" style="display:none;">RTGS</label>
														<div class="col-lg-2 fv-row fv-plugins-icon-container" id="cus_sl_rtgs_amt_paid_from_cmy_tbox" style="display:none;">
															<input type="text" class="form-control form-control-lg form-control-solid" placeholder="Amount" name="cust_sale_cprtgs_amount" id="cust_sale_cprtgs_amount"  onkeyup="cust_sale_company_payment_calc();" value="0">
															<div class="fv-plugins-message-container invalid-feedback" id="cust_sale_cprtgs_amount_err"></div>
														</div>
														<div class="col-lg-2 fv-row fv-plugins-icon-container" id="cus_sl_rtgs_ref_paid_from_cmy_tbox" style="display:none;">
															<input type="text" class="form-control form-control-lg form-control-solid" placeholder="Reference No" name="cust_sale_cprtgs_ref_no" id="cust_sale_cprtgs_ref_no">
															<div class="fv-plugins-message-container invalid-feedback" id="cust_sale_cprtgs_ref_no_err"></div>
														</div>
														<div class="col-lg-3 fv-row fv-plugins-icon-container" id="cus_sl_rtgs_com_bank_paid_from_cmy_tbox" style="display:none;">
															<select class="form-select form-select-solid" data-control="select2" data-placeholder="Company Bank" data-hide-search="true" name="cust_sale_cprtgs_comp_bank" id="cust_sale_cprtgs_comp_bank">
																<option value="">Select</option>
																<?php
																	$bnk_det=$this->db->query("select * from BANKS where ACTIVE='Y'")->result_array();
																	foreach ($bnk_det as $blist) 
																	{
																?>
																<option value="<?php echo $blist['SNO'];?>"><?php
																$len=strlen( $blist['ACCOUNTNO']);
																$acc_no=substr($blist['ACCOUNTNO'], $len-4);
																 echo $blist['BANKNAME']." - ".$acc_no." - ".$blist['BRANCH']." - ".$blist['PERSONNAME'];?></option>
																<?php 	} 	?>
															</select>
															<div class="fv-plugins-message-container invalid-feedback" id="cust_sale_cprtgs_comp_bank_err"></div>
														</div>
														<div class="col-lg-2 fv-row fv-plugins-icon-container" id="cus_sl_rtgs_par_bank_paid_from_cmy_tbox" style="display:none;">
															<select class="form-select form-select-solid" data-control="select2" data-placeholder="Party Bank" data-hide-search="true" name="cust_sale_cprtgs_party_bank" id="cust_sale_cprtgs_party_bank">
																<option value="">Select</option>
																<option value="1">UPI-12546875-kumar</option>				
																<option value="2">Bank-1254867-Kumar</option>
															</select>
															<div class="fv-plugins-message-container invalid-feedback" id="cust_sale_cprtgs_party_bank_err"></div>
														</div>
														<div class="col-lg-2 fv-row fv-plugins-icon-container" id="cus_sl_rtgs_detail_paid_from_cmy_tbox" style="display:none;">
															<textarea class="form-control form-control-solid" rows="1" placeholder="Details"name="cust_sale_cprtgs_details" id="cust_sale_cprtgs_details"></textarea>
															<div class="fv-plugins-message-container invalid-feedback" id="cust_sale_cprtgs_details_err"></div>
														</div>
													</div>
													<div class="row">
														<label class="col-lg-1 col-form-label fw-semibold fs-6" id="cus_sl_upi_paid_from_cmy" style="display:none;">UPI</label>
														<div class="col-lg-2 fv-row fv-plugins-icon-container" id="cus_sl_upi_amt_paid_from_cmy_tbox" style="display:none;">
															<input type="text" class="form-control form-control-lg form-control-solid" placeholder="Amount" name="cust_sale_cpupi_amount" id="cust_sale_cpupi_amount"  onkeyup="cust_sale_company_payment_calc();" value="0">
															<div class="fv-plugins-message-container invalid-feedback" id="cust_sale_cpupi_amount_err"></div>
														</div>
														<div class="col-lg-2 fv-row fv-plugins-icon-container" id="cus_sl_upi_ref_paid_from_cmy_tbox" style="display:none;">
															<input type="text" class="form-control form-control-lg form-control-solid" placeholder="Reference No" name="cust_sale_cpupi_ref_no" id="cust_sale_cpupi_ref_no" >
															<div class="fv-plugins-message-container invalid-feedback" id="cust_sale_cpupi_ref_no_err"></div>
														</div>
														<div class="col-lg-3 fv-row fv-plugins-icon-container" id="cus_sl_upi_com_bank_paid_from_cmy_tbox" style="display:none;">
															<select class="form-select form-select-solid" data-control="select2" data-placeholder="Company Bank" data-hide-search="true" name="cust_sale_cpupi_comp_bank" id="cust_sale_cpupi_comp_bank">
																<option value="">Select</option>
																<?php
																	$bnk_det=$this->db->query("select * from BANKS where ACTIVE='Y'")->result_array();
																	foreach ($bnk_det as $blist) 
																	{
																?>
																<option value="<?php echo $blist['SNO'];?>"><?php
																$len=strlen( $blist['ACCOUNTNO']);
																$acc_no=substr($blist['ACCOUNTNO'], $len-4);
																 echo $blist['BANKNAME']." - ".$acc_no." - ".$blist['BRANCH']." - ".$blist['PERSONNAME'];?></option>
																<?php 	} 	?>
															</select>
															<div class="fv-plugins-message-container invalid-feedback" id="cust_sale_cpupi_comp_bank_err"></div>
														</div>
														<div class="col-lg-2 fv-row fv-plugins-icon-container" id="cus_sl_upi_par_bank_paid_from_cmy_tbox" style="display:none;">
															<select class="form-select form-select-solid" data-control="select2" data-placeholder="Party Bank" data-hide-search="true" name="cust_sale_cpupi_party_bank" id="cust_sale_cpupi_party_bank">
																<option value="">Select</option>
																<option value="1">UPI-12546875-kumar</option>				
																<option value="2">Bank-1254867-Kumar</option>
															</select>
															<div class="fv-plugins-message-container invalid-feedback" id="cust_sale_cpupi_party_bank_err"></div>
														</div>
														<div class="col-lg-2 fv-row fv-plugins-icon-container" id="cus_sl_upi_detail_paid_from_cmy_tbox" style="display:none;">
															<textarea class="form-control form-control-solid" rows="1" placeholder="Details" name="cust_sale_cpupi_details" id="cust_sale_cpupi_details"></textarea>
															<div class="fv-plugins-message-container invalid-feedback" id="cust_sale_cpupi_details_err"></div>
														</div>
													</div>
													<div class="row">
														<div class="col-lg-4 text-center">
															<label class="col-form-label fw-semibold fs-6">Net Payable &emsp;</label>
															<label class="col-form-label fw-bold fs-2" id="span_cust_sale_net_pay">2538.19</label>
														</div>
														<div class="col-lg-4 text-center">
															<label class="col-form-label fw-semibold fs-6">Paid Amount &emsp;</label>
															<label class="col-form-label fw-bold fs-2" id="span_cust_sale_paid_amt">2538.19</label>
														</div>
														<div class="col-lg-4 text-center">
															<label class="col-form-label fw-semibold fs-6">Balance Amount &emsp;</label>
															<label class="col-form-label fw-bold fs-2" id="span_cust_sale_bal_amt">0.00</label>
														</div>
													</div>
												</div>
												<!-- Customer Sale end -->
												<!-- Multi Jewel start -->
												<div class="px-4" id="multi_jwl_tbox" style="display: none;">
													<div class="row mt-4">
														<label class="col-lg-2 col-form-label fw-bold fs-3">Multi Jewel</label>
														<div class="col-lg-10">
															<label class="col-form-label fw-bold fs-3">Total Amount &emsp;</label>
															<label class="col-form-label fw-bold fs-3" id="mul_jwl_total_amount">10927.01</label>
															<span class="fw-bold fs-3">&emsp;(&nbsp;</span>
															<label class="col-form-label fw-bold fs-3">Principal &emsp;</label>
															<label class="col-form-label fw-bold fs-3" id="mul_jwl_total_principal">10557.50</label>&emsp;
															<label class="col-form-label fw-bold fs-3">Interest &emsp;</label>
															<label class="col-form-label fw-bold fs-3" id="mul_jwl_total_interest">369.51</label>
															<span class="fw-bold fs-3">&nbsp;)</span>
														</div>
														<div class="col-lg-4">
															<div class="row">
																<label class="col-lg-6 col-form-label fw-semibold fs-6">Paper Action Charge</label>
																<div class="col-lg-6">
																	<input type="text"class="form-control form-control-lg form-control-solid" placeholder="" value="0" name="mul_jwl_pap_act_chg" id="mul_jwl_pap_act_chg" onkeyup="multi_jewel_charges_calc();">
																	<div class="fv-plugins-message-container invalid-feedback" id=""></div>
																</div>
																<label class="col-lg-6 col-form-label fw-semibold fs-6">Notice Charge</label>
																<div class="col-lg-6">
																	<input type="text"class="form-control form-control-lg form-control-solid" placeholder="" value="0" name="mul_jwl_not_chg" id="mul_jwl_not_chg" onkeyup="multi_jewel_charges_calc();">
																	<div class="fv-plugins-message-container invalid-feedback" id=""></div>
																</div>
																<div class="col-lg-6">
																	<div class="d-flex align-items-center">
																		<label class="form-check form-check-inline form-check-solid me-5 is-invalid">
																			<input class="form-check-input" name="mul_jwl_form_missing" type="checkbox" value="1" id="mul_jwl_form_missing" onclick="mul_jwl_frm_missing()">
																		</label>
																		<label class="col-form-label fw-semibold fs-6 me-5">Form Missing</label>
																	</div>
																</div>
																<div class="col-lg-6" id="mul_jwl_form_miss_print_but" style="display:none;">
																	<a class="btn btn-sm btn-outline btn-outline-solid btn-outline-warning btn-active-light-primary me-2" target="_blank" id="mul_jwl_btn_print1">Print 1</a>
																	<a class="btn btn-sm btn-outline btn-outline-solid btn-outline-warning btn-active-light-primary me-2" target="_blank" id="mul_jwl_btn_print2">Print 2</a>
																	<a id="mul_jwl_btn_print3" target="_blank" ><i class="fa fa-print" title="Legal Print" aria-hidden="true"></i></a>
																</div>
																<!-- <label class="col-lg-6 col-form-label fw-semibold fs-6">Form Missing</label> -->
																<!-- <div class="col-lg-6"> -->
																	<input type="hidden"class="form-control form-control-lg form-control-solid" placeholder="" value="100" name="mul_jwl_frm_miss_chg" id="mul_jwl_frm_miss_chg" onkeyup="multi_jewel_charges_calc();">
																	<!-- <div class="fv-plugins-message-container invalid-feedback" id=""></div> -->
																<!-- </div> -->
																
															</div>
														</div>
														<div class="col-lg-4">
															<div class="row">
																<label class="col-lg-6 col-form-label fw-semibold fs-6">On Account</label>
																<div class="col-lg-6">
																	<input type="text"class="form-control form-control-lg form-control-solid" placeholder="" value="0" style="background-color: #ff5b5b; color: white" name="mul_jwl_on_acc_chg" id="mul_jwl_on_acc_chg" onkeyup="multi_jewel_charges_calc();">
																	<div class="fv-plugins-message-container invalid-feedback"></div>
																</div>
																<label class="col-lg-6 col-form-label fw-semibold fs-6">Discount</label>
																<div class="col-lg-6">
																	<input type="text"class="form-control form-control-lg form-control-solid" placeholder="" value="0" name="mul_jwl_disc_chg" id="mul_jwl_disc_chg" onkeyup="multi_jewel_charges_calc();">
																	<div class="fv-plugins-message-container invalid-feedback" id=""></div>
																</div>
																<div class="col-lg-2" id="mul_jwl_upload_doc" style="display:none;">
																	<div class="image-input image-input-outline " data-kt-image-input="true" style="background-image: url(assets/images/Document.jpg)">
																		<div class="image-input-wrapper w-50px h-50px" style="background-image: url(assets/images/Document.jpg)"></div>
																		<label class="btn btn-icon btn-circle btn-active-color-primary w-20px h-20px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" data-kt-initialized="1">
																			<i class="bi bi-pencil-fill fs-8"></i>
																			<input type="file" name="add_c_logo" accept=".png, .jpg, .jpeg">
																			<input type="hidden" name="add_c_logo_remove">
																		</label>
																		<span class="btn btn-icon btn-circle btn-active-color-primary w-20px h-20px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" data-kt-initialized="1">
																			<i class="bi bi-x fs-4"></i>
																		</span>
																		<span class="btn btn-icon btn-circle btn-active-color-primary w-20px h-20px bg-body shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" data-kt-initialized="1">
																			<i class="bi bi-x fs-4"></i>
																		</span>
																	</div>
																</div>
																<div class="col-lg-10 text-center">
																	<label class="col-form-label fw-bold fs-2">Net Pay &emsp;</label>
																	<label class="col-form-label fw-bold fs-2" id="lbl_mul_jwl_net_pay">11977.01</label>
																</div>
															</div>
														</div>
														<div class="col-lg-4">
															<div class="row">
																<label class="col-lg-6 col-form-label required fw-semibold fs-6">Closed By</label>
																<div class="col-lg-6 fv-row fv-plugins-icon-container">
																	<select class="form-select form-select-solid" name="mul_jewel_closed_by" id="mul_jewel_closed_by" data-control="select2" data-hide-search="true" onchange="mul_jwl_cls_by();">	
																		<option value="">Select</option>
																		<option value="party" selected>Party</option>
																		<option value="nominee">Nominee</option>
																		<option value="others">Others</option>
																	</select>
																</div>
																<label class="col-lg-6 col-form-label required fw-semibold fs-6" id="mul_jewel_closed_by_name_lab" style="display:none;">Name</label>
																<div class="col-lg-6" id="mul_jewel_closed_by_name_tbox" style="display:none;">
																	<input type="text"class="form-control form-control-lg form-control-solid" placeholder="" value="Selvam" name="mul_jwl_others" id="mul_jwl_others">
																	<div class="fv-plugins-message-container invalid-feedback"></div>
																</div>
															</div>
														</div>
													</div>
													
													<div class="row mt-4">
														<div class="accordion" id="kt_accordion_item_redemption_new_loan_mul_jwl">
													    <div class="accordion-item">
													        <h2 class="accordion-header" id="kt_accordion_item_redemption_new_loan_mul_jwl_header_1">
													            <button class="accordion-button fw-bold fs-6 collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#kt_accordion_item_redemption_new_loan_mul_jwl_body_1" aria-expanded="true" aria-controls="kt_accordion_item_redemption_new_loan_mul_jwl_body_1">
													            New Loan Entry</button>
													        </h2>
													        <div id="kt_accordion_item_redemption_new_loan_mul_jwl_body_1" class="accordion-collapse collapse show" aria-labelledby="kt_accordion_item_redemption_new_loan_mul_jwl_header_1" data-bs-parent="#kt_accordion_item_redemption_new_loan_mul_jwl">
													            <div class="accordion-body">
													            	<div class="row">
													            		<div class="col-lg-10">
															            	<div class="row">
															            		<div class="col-lg-2">
															            			<label class="col-form-label required fw-semibold fs-6">JewelType</label>
															            		</div>
																				<div class="col-lg-2 fv-row fv-plugins-icon-container">
																					<select class="form-select form-select-solid" name="mul_jwl_jewel_type" id="mul_jwl_jewel_type" data-control="select2" data-hide-search="true">	
																						<option value="">Select</option>
																						<?php 
																							$jeweltype=$this->db->query("select * from jewel_type")->result_array();
																							foreach ($jeweltype as $jtlist) {
																						?>
																							<option value="<?php echo $jtlist['jewel_type_id']; ?>"> <?php echo $jtlist['jewel_type']; ?> </option>
																						<?php
																							}
																						?>
																					</select>
																					<div class="fv-plugins-message-container invalid-feedback" id="mul_jwl_jewel_type_err"></div>
																				</div>
																				<label class="col-lg-2 col-form-label required fw-semibold fs-6">Scheme</label>
																				<div class="col-lg-2 fv-row fv-plugins-icon-container">
																					<select class="form-select form-select-solid" name="mul_jwl_new_ln_scheme" id="mul_jwl_new_ln_scheme" data-control="select2" data-hide-search="true" onchange="mul_jwl_loan_interest();">	
																						<option value="">Select</option>
																						<?php 
																						foreach ($int_grp_list as $ilist)
																							{
																						?>
																						<option value="<?php echo $ilist['INT_GROUP'];?>"><?php echo $ilist['INT_GROUP'];?></option>
																						<?php
																						}
																						?>
																					</select>
																					<div class="fv-plugins-message-container invalid-feedback" id="mul_jwl_new_ln_scheme_err"></div>
																				</div>
																				<label class="col-lg-2 col-form-label required fw-semibold fs-6">Int Type</label>
																				<div class="col-lg-2 fv-row fv-plugins-icon-container">
																					<select class="form-select form-select-solid" name="mul_jwl_new_ln_int_type" id="mul_jwl_new_ln_int_type" data-control="select2" data-hide-search="true" onchange="mj_get_int_due_details()">	
																						<option value="">Select</option>
																					</select>
																					<div class="fv-plugins-message-container invalid-feedback" id="mul_jwl_new_ln_int_type_err"></div>
																				</div>
																				<label class="col-lg-2 col-form-label fw-semibold fs-6">Expiry Date &emsp;</label>
																				<label class="col-lg-2 col-form-label fw-bold fs-5" id="mul_jwl_new_ln_exp_dt">25-06-2023</label>
															            	</div>
															            </div>
															            <div class="col-lg-2">
															            	<div class="row">
													            				<div class="col-lg-12">
																					<div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url('assets/Images/Jewel.jpg')">
																						<div class="image-input-wrapper w-125px h-125px" style="background-image: url(assets/Images/Jewel.jpg)" id="load_image_selected"></div>
																						<label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" data-kt-initialized="1">
																							<i class="fas fa-camera fs-6" data-bs-toggle="modal" data-bs-target="#kt_modal_camera"></i>
																							<!-- <input type="file" name="avatar" accept=".png, .jpg, .jpeg">
																							<input type="hidden" name="avatar_remove"> -->
																						</label>
																						<span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" data-kt-initialized="1">
																							<i class="bi bi-x fs-3"></i>
																						</span>
																						<span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" data-kt-initialized="1">
																							<i class="bi bi-x fs-3"></i>
																						</span>
																					</div>
																					<textarea hidden="hidden" name="loan_jewel_image_data" id="loan_jewel_image_data"></textarea>
																				</div>
												            				</div>
															            </div>
															        </div>
													            	<div class="row mt-2">
																		<label class="col-lg-12 col-form-label fw-bold fs-3 text-center">Pledge Details</label>
																		<!--begin::Col-->
																		<div class="col-lg-2 fv-row fv-plugins-icon-container">
																			<label class=" fw-bold fs-7 ">Pledge Name</label>
																			<input type="text" name="pledge_item" id="pledge_item" class="form-control form-control-lg1 form-control-solid" placeholder="Select Pledge Name">
																			<input type="hidden" name="pledge_item_name_hidden" id="pledge_item_id_hidden" value="">
																			<div class="fv-plugins-message-container invalid-feedback"></div>
																		</div>
																		<div class="col-lg-1 fv-row fv-plugins-icon-container">
																			<label class=" fw-bold fs-7 ">Description</label>
																			<input type="text" name="pl_description" id="pl_description" class="form-control form-control-lg1 form-control-solid" placeholder="Description">
																			<div class="fv-plugins-message-container invalid-feedback"></div>
																		</div>
																		<div class="col-lg-1 fv-row fv-plugins-icon-container">
																			
																			<label class=" fw-bold fs-7 ">Quality</label>
																			<select class="form-select form-select-solid" data-control="select2" data-hide-search="true" name="add_ptyname_new_loan" id="add_ptyname_new_loan" onchange="purity_percent()">
																				<option value="">Select Quality</option>
																				<?php 
																				foreach ($item_purity_list as $iplist) {
																					?>
																					<option value="<?php echo $iplist['ITEMPURITYID']?>"><?php echo $iplist['ITEMPURITYNAME'];
																				?></option>
																					<?php 
																				}
																				?>
																				
																			</select>
																			<div class="fv-plugins-message-container invalid-feedback" id="add_ptyname_new_loan_err"></div>
																		</div>
																		<div class="col-lg-1 fv-row fv-plugins-icon-container">
																			<label class=" fw-bold fs-7 ">Pur %</label>

																			<input type="text" name="purity_per" id="purity_per" class="form-control form-control-lg1 form-control-solid" placeholder="Purity %">
																			<div class="fv-plugins-message-container invalid-feedback"></div>
																		</div>
																		<div class="col-lg-1 fv-row fv-plugins-icon-container">
																			<label class=" fw-bold fs-7 ">Weight</label>

																			<input type="text" name="weight_ple" id="weight_ple" class="form-control form-control-lg1 form-control-solid" placeholder="Weight" value="0">
																			<div class="fv-plugins-message-container invalid-feedback"></div>
																		</div>
																		<div class="col-lg-1 fv-row fv-plugins-icon-container">
																			<label class=" fw-bold fs-7 ">Stone Wt</label>
																			<input type="text" name="stone_weight" id="stone_weight" class="form-control form-control-lg1 form-control-solid" placeholder="St.Wgt" value="0" onkeyup="calc_net_wght_display();">
																			<div class="fv-plugins-message-container invalid-feedback"></div>
																		</div>
																		<div class="col-lg-1 fv-row fv-plugins-icon-container">
																			<label class=" fw-bold fs-7 ">Less</label>

																			<input type="text" name="less_ple" id="less_ple" class="form-control form-control-lg1 form-control-solid" placeholder="Less" value="0"  onkeyup="calc_net_wght_display();">
																			<div class="fv-plugins-message-container invalid-feedback"></div>
																		</div>
																		<div class="col-lg-1 fv-row fv-plugins-icon-container">
																			<label class=" fw-bold fs-7 ">Nt.Wgt</label><br><br>
																			<label class=" fw-bold fs-7 " id="lbl_nt_wgt" >0.00</label>
																			<div class="fv-plugins-message-container invalid-feedback"></div>
																		</div>
																		<div class="col-lg-1 d-flex align-items-center">
																			<label class="form-check form-check-inline form-check-solid is-invalid">
																				<input class="form-check-input" name="is_damage" type="checkbox"  id="is_damage">
																				<span class="col-form-label fw-semibold fs-6">Damage</span>
																			</label>
																		</div>
																		<div class="col-lg-1">
																			<div class="image-input mt-2 me-6" data-kt-image-input="true">
																				<div class="image-input-wrapper w-40px h-40px" style="background-image: url(<?php echo base_url();?>assets/media/svg/avatars/blank_jwl.svg)" id="pl_load_image_selected"></div>
																				<!--end::Preview existing avatar-->
																				<!--begin::Label-->
																				<div class="btn btn-icon btn-active-color-primary" data-kt-image-input-action="change" data-kt-menu-trigger="click" data-kt-menu-placement="top-end">
																					<!-- <i class="bi bi-pencil-fill fs-8 ms-3"></i> -->
																					<a href="#" class="menu-link flex-stack px-3" data-bs-toggle="modal" data-bs-target="#kt_modal_camera_pledge"><i class="fa fa-camera" aria-hidden="true"></i></a>
																					<!-- <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px py-1 fs-6" data-kt-menu="true" style="">
																						<div class="menu-item px-3">
																							<a href="#" class="menu-link px-3">Upload File</a>
																						</div>
																						<div class="menu-item px-3">
																							<a href="#" class="menu-link flex-stack px-3">Camera</a>
																						</div>
																					</div> -->
																					<!-- <input type="file" name="add_party_redemp" accept=".png, .jpg, .jpeg">
																					<input type="hidden" name="add_party_remove_redemp"> -->
																				</div>
																				<!--end::Label-->
																				<!--begin::Cancel-->
																				<span class="btn btn-icon btn-active-color-primary w-25px h-20px" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" data-kt-initialized="1">
																					<i class="bi bi-x fs-3 ms-2"></i>
																				</span>
																				<!--end::Cancel-->
																				<!--begin::Remove-->
																				<span class="btn btn-icon btn-active-color-primary w-25px h-20px" data-kt-image-input-action="remove" data-bs-toggle="tooltip" data-kt-initialized="1">
																					<i class="bi bi-x fs-3 ms-2"></i>
																				</span>

																				<!--end::Remove-->
																			</div>
																			<textarea hidden="hidden" name="pl_loan_jewel_image_data" id="pl_loan_jewel_image_data"></textarea>
																		</div>
																		<div class="col-lg-1">	
																			<button type="button" class="btn btn-sm btn-success mb-2 mt-2" onclick="add_pledge_it()" >
																				<span class="svg-icon svg-icon-2">
																					<svg width="24" height="24" viewBox="0 0 24 24" fill="#50cd89" xmlns="http://www.w3.org/2000/svg">
																						<rect opacity="0.5" x="11.364" y="20.364" width="16" height="2" rx="1" transform="rotate(-90 11.364 20.364)" fill="currentColor"></rect>
																						<rect x="4.36396" y="11.364" width="16" height="2" rx="1" fill="currentColor"></rect>
																					</svg>
																				</span>
																			</button>
																			<input type="hidden" name="add_pledge_item" id="add_pledge_item" value="0">
																			<input type="hidden" name="delete_pledge_item" id="delete_pledge_item" value="0">

																		</div>
																	</div>
																	<table class="table table-row-bordered fs-7 gy-1 gs-2" id="multi_jwl_add_loan">
														<thead>
															<tr class="fw-semibold fs-7 text-gray-800">
													            <th class="min-w-150px">Pledge</th>
													            <th class="min-w-100px">Description</th>
													            <th class="min-w-40px">Quality</th>
													            <th class="min-w-40px">Purity%</th>
													            <th class="min-w-80px">Weight(gms)</th>
													            <th class="min-w-80px">Stone Wgt(gms)</th>
													            <th class="min-w-80px">Less(gms)</th>
													            <th class="min-w-80px">Nt Wgt(gms)</th>
													            <th class="min-w-50px">Damage</th>
													            <th class="min-w-50px">Img</th>
													            <th class="min-w-100px">Loan Amount</th>
													            <th class="min-w-100px">Action</th>
													            <!-- <th class="min-w-80px">Status</th>
													            <th class="min-w-100px">RP.No</th>
													            <th class="min-w-100px">Bank</th> -->
															</tr>
														</thead>
														<tbody id="mul_jwl_new_ln_pl_tbody">
																												   		
													    </tbody>
													</table>
													<br>
													<div class="row">
														<label class="col-lg-1 col-form-label fw-semibold fs-6">Weight</label>
														<label class="col-lg-1 col-form-label fw-bold fs-6" id="tot_pl_weight">0.000</label>
														<label class="col-lg-1 col-form-label fw-semibold fs-6">Stoneless</label>
														<label class="col-lg-1 col-form-label fw-bold fs-6" id="tot_stone_weight">0.000</label>
														<label class="col-lg-1 col-form-label fw-semibold fs-6">Less</label>
														<label class="col-lg-1 col-form-label fw-bold fs-6" id="tot_less_weight">0.000</label>
														<label class="col-lg-1 col-form-label fw-semibold fs-6" >Net.Wght</label>
														<label class="col-lg-1 col-form-label fw-bold fs-6" id="tot_net_weight">0.000</label>
														<label class="col-lg-1 col-form-label fw-semibold fs-6">CurrRate</label>
														<!-- <label class="col-lg-1 col-form-label fw-semibold fs-6">Old Rate</label> -->
														<label class="col-lg-1 col-form-label fw-bold fs-6"  id="curr_rate"><?php echo $_SESSION['CUR_GOLD_RATE']; ?></label>
														<label class="col-lg-1 col-form-label fw-bold fs-6" id="tot_old_curr_rate" style="display: none;">
															<!-- <?php 
															// $cur_rate=$this->db->query("select * from general_settings")->row();
															// echo number_format($cur_rate->gold_rate,2);
															 ?> -->
															 <input type="hidden" name="current_rate" id="current_rate" value="<?php echo $_SESSION['CUR_GOLD_RATE']; ?>">
														</label>
														<label class="col-lg-1 col-form-label fw-semibold fs-6">Purity%</label>
														<div class="col-lg-1 fv-row fv-plugins-icon-container">
															<input type="text" name="add_qual_new_loan" id="add_qual_new_loan" class="form-control form-control-lg1 form-control-solid" placeholder="Quality" onkeyup ="ple_calculation();" onfocus="ple_calculation();">
															<div class="fv-plugins-message-container invalid-feedback"></div>
														</div>
													</div>
													<div class="row">
														<label class="col-lg-1 col-form-label fw-semibold fs-6">Gram.Val</label>
														<label class="col-lg-1 col-form-label fw-bold fs-6" id="grm_val">0.00
															<input type="hidden" name="grm_val_hidden" id="grm_val_hidden">
														</label>
														<label class="col-lg-1 col-form-label fw-semibold fs-6" >SalesRate</label>
														<label class="col-lg-1 col-form-label fw-bold fs-6"  id="sale_rate">0.00<input type="hidden" name="sale_rate_hidden" id="sale_rate_hidden"></label>
														<label class="col-lg-1 col-form-label fw-semibold fs-6" style="color: #1a21e3 !important;font-weight: 600 !important;">H/L Bal</label>
														<label class="col-lg-1 col-form-label fw-bold fs-5" style="color: #1a21e3 !important;font-weight: 600 !important;" id="tot_hl_bal">0.00</label>
														<label class="col-lg-1 col-form-label fw-semibold fs-6" title="Redeemed Pledge Item count"> Redeem Pl.Count</label>
														<label class="col-lg-1 col-form-label fw-bold fs-6"  id="lbl_red_pl_count" title="Redeemed Pledge Item count">0</label><input type="hidden" name="red_pl_count" id="red_pl_count" value="0">
														<label class="col-lg-1 col-form-label fw-semibold fs-6" title="Redeemed Pledge Item count"> Redeem Pl.Amount</label>
														<label class="col-lg-1 col-form-label fw-bold fs-6"  id="lbl_red_pl_amt" title="Redeemed Pledge Item amt">0.00</label><input type="hidden" name="red_pl_amt" id="red_pl_amt" value="0">
														<div class="col-lg-2 ">
															<p class="btn btn-sm btn-outline btn-outline-solid btn-outline-warning btn-active-light-primary me-2" data-bs-toggle="modal" data-bs-target="#kt_modal_payment_to_receive" id="btn_receive_payment">Receive</p>
														</div>
														<!-- <label class="col-lg-1 col-form-label fw-semibold fs-6" >CurrRate</label> -->
														<!-- <label class="col-lg-1 col-form-label fw-bold fs-6"  id="curr_rate"><?php echo $_SESSION['CUR_GOLD_RATE']; ?></label> -->
														<!-- <div class="btn btn-icon btn-active-light-primary w-30px h-30px w-md-40px h-md-40px" id="kt_activities_toggle" data-bs-toggle="modal" data-bs-target="#kt_modal_loan_calculator">
															<i class="bi bi-calculator" style="font-size: 1.5rem !important;"></i>
														</div> -->
													</div>
																	<div class="row mt-4">
																		<div class="col-lg-4">
																			<div class="px-4" style="border-radius: 10px;padding-bottom: 10px;box-shadow: 0 5px 10px #00002947;">
																				<label class="col-lg-12 col-form-label fw-bold fs-5 text-center">Loan Payment Information</label>
																				<div class="row">
																					<!--begin::Label-->
																					<label class="col-lg-6 col-form-label required fw-semibold fs-6">Loan Amount</label>
																					<!--end::Label-->
																					<!--begin::Col-->
																					<div class="col-lg-6 fv-row fv-plugins-icon-container">
																						<input type="text" name="mul_jwl_new_ln_loan_amount" id="mul_jwl_new_ln_loan_amount" class="form-control form-control-lg1 form-control-solid" value="20000.00" style="font-size: 18px !important;font-weight: 700 !important;color: #1B439E !important;" onkeyup="calc_interest();">
																						<div class="fv-plugins-message-container invalid-feedback" id="mul_jwl_new_ln_loan_amount_err"></div>
																					</div>
																					<!--end::Col-->
																				</div>
																				<div class="row">
																					<!--begin::Label-->
																					<label class="col-lg-6 col-form-label fw-semibold fs-6">Monthly Interest</label>
																					<label class="col-lg-6 col-form-label fw-bold fs-5"><span style="background-color:#C6C6C6;border-radius: 8px;padding: 5px 15px 5px 15px;" id="mul_jwl_new_ln_monthly_interest">250.00</span></label>
																				</div>
																				<div class="row">
																					<label class="col-lg-6 col-form-label required fw-semibold fs-6">Redemption period</label>
																					<div class="col-lg-3 fv-row fv-plugins-icon-container">
																						<input type="text" name="mul_jwl_new_ln_redemption_period" id="mul_jwl_new_ln_redemption_period" class="form-control form-control-lg1 form-control-solid" value="30">
																						<div class="fv-plugins-message-container invalid-feedback" id="mul_jwl_new_ln_redemption_period_err" ></div>
																					</div>
																					<label class="col-lg-3 col-form-label fw-semibold fs-6" id="loan_per_mon_days">Days</label>
																				</div>
																				<div class="row">
																					<div class="d-flex justify-content-center align-items-center">
																						<label class="col-form-label fw-bold fs-3">Total Loan Amount &emsp; <span id="mul_jwl_new_ln_total_amount">20000.00</span></label>
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
																						<label class="col-form-label fw-bold fs-3" id="mul_jwl_new_ln_ptr_curr_loan_net_pay">11977.01</label>
																					</div>
																					<label class="col-lg-6 col-form-label fw-semibold fs-6">Processing Charge</label>
																					<div class="col-lg-6 fv-row fv-plugins-icon-container">
																						<input type="text" name="mul_jwl_new_ln_process_chg" id="mul_jwl_new_ln_process_chg" class="form-control form-control-lg form-control-solid" placeholder="Processing Charge" value="50">
																						<div class="fv-plugins-message-container invalid-feedback"></div>
																					</div>
																				</div>
																				<div class="row">
																					<label class="col-lg-6 col-form-label fw-semibold fs-6">Document Charge</label>
																					<label class="col-lg-6 col-form-label fw-bold fs-5" id="mul_jwl_new_ln_doc_chg">50</label>
																					<input type="hidden" name="mul_jwl_new_ln_doc_chg_hidden" id="mul_jwl_new_ln_doc_chg_hidden">
																				</div>
																				<div class="row mt-1">
																					<label class="col-lg-12 col-form-label fw-bold fs-3 text-center" >Total &emsp; <span id="mul_jwl_new_ln_ptr_total_amount">12077.01</span></label>
																				</div>
																			</div>
																		</div>
																		<div class="col-lg-4">
																			<div class="px-4" style="padding-bottom: 5px;border-radius: 10px;box-shadow: 0 5px 10px #00002947;">
																				<label class="col-lg-12 col-form-label fw-bold fs-5 text-center">To Pay</label>
																				<div class="row">
																					<label class="col-lg-4 col-form-label fw-bold fs-3">Net Pay</label>
																					<label class="col-lg-4 col-form-label fw-bold fs-3" id="mul_jwl_new_ln_topay_net_pay">7922.99</label>
																					<div class="col-lg-4">
																						<div class="btn btn-sm btn-outline btn-outline-solid btn-outline-warning btn-active-light-primary me-2" data-bs-toggle="modal" data-bs-target="#kt_modal_view_payment_multi_jwl">Pay Now</div>
																					</div>
																				</div>
																				<div class="row">
																					<label class="col-lg-4 col-form-label fw-semibold fs-6">Remarks</label>
																				</div>
																				<div class="row">
																					<div class="col-lg-12 mt-2">
																						<textarea class="form-control form-select-solid fw-semibold fs-5" rows="3" id="mul_jwl_new_ln_topay_remarks" name="mul_jwl_new_ln_topay_remarks"></textarea>
																						<div class="fv-plugins-message-container invalid-feedback"></div>
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
													
													<div class="row">
														<div class="col-lg-4 text-center">
															<label class="col-form-label fw-semibold fs-6">Net Payable &emsp;</label>
															<label class="col-form-label fw-bold fs-2" id="mul_jwl_fin_net_payable">7922.99</label>
														</div>
														<div class="col-lg-4 text-center">
															<label class="col-form-label fw-semibold fs-6">Paid Amount &emsp;</label>
															<label class="col-form-label fw-bold fs-2" id="mul_jwl_fin_paid_amt">7922.99</label>
														</div>
														<div class="col-lg-4 text-center">
															<label class="col-form-label fw-semibold fs-6">Balance Amount &emsp;</label>
															<label class="col-form-label fw-bold fs-2" id="mul_jwl_fin_bal_amt">0.00</label>
														</div>
													</div>
												</div>
												<!-- Multi Jewel end -->
												<div class="row mt-4">
													<label class="col-lg-1 col-form-label fw-semibold fs-6">Customer Rating</label>
													<div class="col-lg-2 fv-row fv-plugins-icon-container">
														<select class="form-select form-select-solid" data-control="select2" data-hide-search="true" name="redemp_cust_rating" id="redemp_cust_rating">
															<option value="">Select Rating</option>
															<option value="3" selected>Good</option>
															<option value="2">Average</option>
															<option value="1">Bad</option>
														</select>
													</div>
													<label class="col-lg-1 col-form-label fw-semibold fs-6">M.Points Add</label>
													<div class="col-lg-2 fv-row fv-plugins-icon-container">
														<input type="text" name="m_points_ad" id="m_points_ad" class="form-control form-control-lg1 form-control-solid" value="0" readonly>
														<div class="fv-plugins-message-container invalid-feedback"></div>
													</div>
												</div>
												<div class="d-flex justify-content-end mt-4">
													<button type="reset" class="btn btn-secondary me-2" data-bs-dismiss="modal">Cancel</button>
													<button type="submit" class="btn btn-primary" id="save_changes_add_new_loan">Submit</button>
												</div>
										  </div>
										<!--end::Card body-->

										</form>
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
						<!-- <div class="row">
							<label class="col-lg-1 col-form-label fw-semibold fs-6">Company</label>
							<label class="col-lg-4 col-form-label fw-bold fs-5">AGB - Main Branch Sayalkudi</label>
							<label class="col-lg-1 col-form-label fw-semibold fs-6">Loan No</label>
							<label class="col-lg-2 col-form-label fw-bold fs-5">MIP-256/23</label>
							<label class="col-lg-1 col-form-label fw-semibold fs-6">Type</label>
							<label class="col-lg-1 col-form-label fw-bold fs-5">Gold</label>
							<label class="col-lg-1 col-form-label fw-semibold fs-6">Count</label>
							<label class="col-lg-1 col-form-label fw-bold fs-5">2</label>
							<div class="col-lg-4">
								<label class="col-form-label fw-semibold fs-6">Nt.Wgt(gms) &emsp;</label>
								<label class="col-form-label fw-bold fs-5">3.200</label>
							</div>
						</div> -->
						<div class="row">
          		<!-- <label class="col-form-label fw-bold fs-5">Pledge Items</label> -->
          		<table class="table align-middle table-row-dashed table-striped table-hover fs-7 gy-1 gs-2" id="view_redemp_pledge_item">
								<thead>
									<tr class="text-start text-muted fw-bold fs-7 gs-0">
										<!-- <th class="min-w-50px">Sno</th> -->
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
								<tbody class="text-gray-600 fw-semibold" id="r_pl_tbody">
									
							   </tbody>
							   <tfoot>
									<tr class="text-start text-muted fw-bold fs-6 gs-0" id="r_pl_tfoot">
										
									</tr>
								</tfoot>
							</table>
          	</div>
          	<div class="row">
							<label class="col-lg-1 col-form-label fw-semibold fs-6">Weight</label>
							<label class="col-lg-1 col-form-label fw-bold fs-6" id="r_pl_weight">3.600</label>
							<label class="col-lg-1 col-form-label fw-semibold fs-6">Stoneless</label>
							<label class="col-lg-1 col-form-label fw-bold fs-6" id="r_pl_stone_less">0.200</label>
							<label class="col-lg-1 col-form-label fw-semibold fs-6">Less</label>
							<label class="col-lg-1 col-form-label fw-bold fs-6" id="r_pl_less">0.200</label>
							<label class="col-lg-1 col-form-label fw-semibold fs-6">Net.Wght</label>
							<label class="col-lg-1 col-form-label fw-bold fs-6" id="r_pl_net_weight">3.200</label>
							<label class="col-lg-1 col-form-label fw-semibold fs-6">CurrRate</label>
							<label class="col-lg-1 col-form-label fw-bold fs-6" id="r_pl_curr_rate">4571.00</label>
							<label class="col-lg-1 col-form-label fw-semibold fs-6">Purity%</label>
							<label class="col-lg-1 col-form-label fw-bold fs-6" id="r_pl_purity">91</label>
						</div>
						<div class="row">
							<label class="col-lg-1 col-form-label fw-semibold fs-6">Gram.Val</label>
							<label class="col-lg-1 col-form-label fw-bold fs-6" id="r_pl_grm_val">5784.00</label>
							<label class="col-lg-1 col-form-label fw-semibold fs-6">SalesRate</label>
							<label class="col-lg-1 col-form-label fw-bold fs-6" id="r_pl_sale_rate">14589.00</label>
							<label class="col-lg-1 col-form-label fw-semibold fs-6" style="color: #1a21e3 !important;font-weight: 600 !important;">H/L Bal</label>
							<label class="col-lg-1 col-form-label fw-bold fs-5" style="color: #1a21e3 !important;font-weight: 600 !important;" id="r_pl_hl_bal">5000.00</label>
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
							<label class="col-lg-2 col-form-label fw-bold fs-4" id="r_pop_loan_date">22-12-2022</label>
							<label class="col-lg-2 col-form-label fw-semibold fs-6">Loan Amount</label>
							<label class="col-lg-2 col-form-label fw-bold fs-4" id="r_pop_loan_amount">10000.00</label>
							<label class="col-lg-2 col-form-label fw-semibold fs-6">Int Type</label>
							<label class="col-lg-2 col-form-label fw-bold fs-4" id="r_pop_interest">MIP-2.5</label>

							<table class="table align-middle table-row-dashed table-striped table-hover fs-7 gy-4 gs-2" id="add_receipt_payment_history">
								<thead>
									<tr class="text-start text-muted fw-bold fs-7 gs-0">
										<!-- <th class="min-w-25px">Sno</th> -->
							            <th class="min-w-80px">Exp.Date</th>
							            <th class="min-w-80px">Recpt Date</th>
							            <th class="min-w-25px">Int %</th>
							            <th class="min-w-80px">Prin Amt</th>
							            <th class="min-w-80px">Int Amt</th>
							            <th class="min-w-80px">Paid Amt</th>
							            <th class="min-w-80px">Bal Amt</th>
									</tr>
								</thead>
								<tbody class="text-gray-600 fw-semibold" id="tbody_paid_history">
									
																	
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
		<div class="modal fade" id="kt_modal_view_payment_cus_trans" tabindex="-1" aria-hidden="true">
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
							<h1 class="mb-3">Payment and Transaction Details</h1>
						</div>
						<!--end::Heading-->
						<!--end::Heading-->
							<!-- <div style="padding: 10px 10px 10px 10px !important;box-shadow: 0 3px 6px #00002947;border-radius: 5px;background-color:#f5f5f1 !important;"> -->
								<!-- <div><label class="col-form-label fw-bold fs-6"><u>Payment Details</u></label></div> -->
								<div class="row">
									<label class="col-lg-2 col-form-label fw-bold fs-3">Net Pay</label>
									<label class="col-lg-2 col-form-label fw-bold fs-3" id="cust_trans_ptp_net_pay">4900.00</label>
								</div>
								<div class="row">
									<div class="col-lg-2 fv-row fv-plugins-icon-container fv-plugins-bootstrap5-row-invalid">
										<div class="d-flex align-items-center mt-1">
											<label class="form-check form-check-inline form-check-solid me-5 is-invalid">
												<input class="form-check-input" name="" type="checkbox" value="1" id="cash_loan_paynow_add_radio" onclick="cash_ln_paynow_add_radio();">
											</label>
											<label class="col-form-label fw-semibold fs-6 me-5">Cash</label>
										</div>
									</div>
									<div class="col-lg-2 fv-row fv-plugins-icon-container fv-plugins-bootstrap5-row-invalid">
										<div class="d-flex align-items-center mt-1">
											<label class="form-check form-check-inline form-check-solid me-5 is-invalid">
												<input class="form-check-input" name="" type="checkbox" value="1" id="cheque_loan_paynow_add_radio" onclick="cheque_ln_paynow_add_radio();">
											</label>
											<label class="col-form-label fw-semibold fs-6">Cheque</label>
										</div>
									</div>
									<div class="col-lg-2 fv-row fv-plugins-icon-container fv-plugins-bootstrap5-row-invalid">
										<div class="d-flex align-items-center mt-1">
											<label class="form-check form-check-inline form-check-solid me-5 is-invalid">
												<input class="form-check-input" name="" type="checkbox" value="1" id="rtgs_loan_paynow_add_radio" onclick="rtgs_ln_paynow_add_radio()">
											</label>
											<label class="col-form-label fw-semibold fs-6">RTGS</label>
										</div>
									</div>
									<div class="col-lg-2 fv-row fv-plugins-icon-container fv-plugins-bootstrap5-row-invalid">
										<div class="d-flex align-items-center mt-1">
											<label class="form-check form-check-inline form-check-solid me-5 is-invalid">
												<input class="form-check-input" name="" type="checkbox" value="1" id="upi_loan_paynow_add_radio" onclick="upi_ln_paynow_add_radio()">
											</label>
											<label class="col-form-label fw-semibold fs-6">UPI</label>
										</div>
									</div>
								</div>
								<div class="row">
									<label class="col-lg-1 col-form-label fw-semibold fs-6" id="cash_label_ln_pay" style="display:none;">Cash</label>
									<div class="col-lg-2 fv-row fv-plugins-icon-container" id="cash_label_ln_pay_tbox" style="display:none;">
										<input type="text" class="form-control form-control-lg form-control-solid" placeholder="Amount" name="cust_trans_ptp_cash_amt" id="cust_trans_ptp_cash_amt" value="0" onkeyup="cust_trans_company_payment_calc();">
										<div class="fv-plugins-message-container invalid-feedback"></div>
									</div>
									<div class="col-lg-2 fv-row fv-plugins-icon-container" id="cash_detail_ln_pay_tbox" style="display:none;">
										<textarea class="form-control form-control-solid" rows="1" placeholder="Details" name="cust_trans_ptp_cash_details" id="cust_trans_ptp_cash_details"></textarea>
									</div>
								</div>
								<div class="row">
									<label class="col-lg-1 col-form-label fw-semibold fs-6" id="cheque_label_ln_pay" style="display:none;">Cheque</label>
									<div class="col-lg-2 fv-row fv-plugins-icon-container"id="cheque_amt_ln_pay_tbox" style="display:none;">
										<input type="text" class="form-control form-control-lg form-control-solid" placeholder="Amount" name="cust_trans_ptp_chq_amt" id="cust_trans_ptp_chq_amt" value="0" onkeyup="cust_trans_company_payment_calc();">
										<div class="fv-plugins-message-container invalid-feedback"></div>
									</div>
									<div class="col-lg-2 fv-row fv-plugins-icon-container" id="cheque_no_ln_pay_tbox" style="display:none;">
										<input type="text" class="form-control form-control-lg form-control-solid" placeholder="Cheque No" name="cust_trans_ptp_chq_no" id="cust_trans_ptp_chq_no">
										<div class="fv-plugins-message-container invalid-feedback"></div>
									</div>
									<div class="col-lg-3 fv-row fv-plugins-icon-container" id="cheque_com_bank_ln_pay_tbox" style="display:none;">
										<select class="form-select form-select-solid" data-control="select2" data-hide-search="true" name="cust_trans_ptp_chq_comp_bank" id="cust_trans_ptp_chq_comp_bank" data-placeholder="Company Bank">
											<option value="">Select</option>
											<?php
												$bnk_det=$this->db->query("select * from BANKS where ACTIVE='Y'")->result_array();
												foreach ($bnk_det as $blist) 
												{
											?>
											<option value="<?php echo $blist['SNO'];?>"><?php
											$len=strlen( $blist['ACCOUNTNO']);
											$acc_no=substr($blist['ACCOUNTNO'], $len-4);
											 echo $blist['BANKNAME']." - ".$acc_no." - ".$blist['BRANCH']." - ".$blist['PERSONNAME'];?></option>
											<?php 	} 	?>
										</select>
									</div>
									<div class="col-lg-2 fv-row fv-plugins-icon-container" id="cheque_par_bank_ln_pay_tbox" style="display:none;">
										<select class="form-select form-select-solid" data-control="select2" data-placeholder="Party Bank" data-hide-search="true" name="cust_trans_ptp_chq_party_bank" id="cust_trans_ptp_chq_party_bank">
											<option value="">Select</option>
											<option value="1">UPI-12546875-kumar</option>				
											<option value="2">Bank-1254867-Kumar</option>
										</select>
									</div>
									<div class="col-lg-2 fv-row fv-plugins-icon-container"  id="cheque_detail_ln_pay_tbox" style="display:none;">
										<textarea class="form-control form-control-solid" rows="1" placeholder="Details" name="cust_trans_ptp_chq_details" id="cust_trans_ptp_chq_details"></textarea>
									</div>
								</div>
								<div class="row">
									<label class="col-lg-1 col-form-label fw-semibold fs-6" id="rtgs_label_ln_pay" style="display:none;">RTGS</label>
									<div class="col-lg-2 fv-row fv-plugins-icon-container" id="rtgs_amt_ln_pay_tbox" style="display:none;">
										<input type="text" class="form-control form-control-lg form-control-solid" placeholder="Amount" name="cust_trans_ptp_rtgs_amt" id="cust_trans_ptp_rtgs_amt" value="0" onkeyup="cust_trans_company_payment_calc();">
										<div class="fv-plugins-message-container invalid-feedback"></div>
									</div>
									<div class="col-lg-2 fv-row fv-plugins-icon-container" id="rtgs_ref_ln_pay_tbox" style="display:none;">
										<input type="text" class="form-control form-control-lg form-control-solid" placeholder="Reference No" name="cust_trans_ptp_rtgs_ref_no" id="cust_trans_ptp_rtgs_ref_no">
										<div class="fv-plugins-message-container invalid-feedback"></div>
									</div>
									<div class="col-lg-3 fv-row fv-plugins-icon-container" id="rtgs_com_bank_ln_pay_tbox" style="display:none;">
										<select class="form-select form-select-solid" data-control="select2" data-placeholder="Company Bank" data-hide-search="true" name="cust_trans_ptp_rtgs_comp_bank" id="cust_trans_ptp_rtgs_comp_bank">
											<option value="">Select</option>
											<?php
												$bnk_det=$this->db->query("select * from BANKS where ACTIVE='Y'")->result_array();
												foreach ($bnk_det as $blist) 
												{
											?>
											<option value="<?php echo $blist['SNO'];?>"><?php
												$len=strlen( $blist['ACCOUNTNO']);
												$acc_no=substr($blist['ACCOUNTNO'], $len-4);
												 echo $blist['BANKNAME']." - ".$acc_no." - ".$blist['BRANCH']." - ".$blist['PERSONNAME'];?></option>
											<?php 	} 	?>
										</select>
									</div>
									<div class="col-lg-2 fv-row fv-plugins-icon-container" id="rtgs_par_bank_ln_pay_tbox" style="display:none;">
										<select class="form-select form-select-solid" data-control="select2" data-placeholder="Party Bank" data-hide-search="true" name="cust_trans_ptp_rtgs_party_bank" id="cust_trans_ptp_rtgs_party_bank">
											<option value="">Select</option>
											<option value="1">UPI-12546875-kumar</option>				
											<option value="2">Bank-1254867-Kumar</option>
										</select>
									</div>
									<div class="col-lg-2 fv-row fv-plugins-icon-container" id="rtgs_detail_ln_pay_tbox" style="display:none;">
										<textarea class="form-control form-control-solid" rows="1" placeholder="Details" name="cust_trans_ptp_rtgs_details" id="cust_trans_ptp_rtgs_details"></textarea>
									</div>
								</div>
								<div class="row">
									<label class="col-lg-1 col-form-label fw-semibold fs-6" id="upi_label_ln_pay" style="display:none;">UPI</label>
									<div class="col-lg-2 fv-row fv-plugins-icon-container" id="upi_amt_ln_pay_tbox" style="display:none;">
										<input type="text" class="form-control form-control-lg form-control-solid" placeholder="Amount" name="cust_trans_ptp_upi_amt" id="cust_trans_ptp_upi_amt" value="0" onkeyup="cust_trans_company_payment_calc();">
										<div class="fv-plugins-message-container invalid-feedback"></div>
									</div>
									<div class="col-lg-2 fv-row fv-plugins-icon-container" id="upi_ref_ln_pay_tbox" style="display:none;">
										<input type="text" class="form-control form-control-lg form-control-solid" placeholder="Reference No" name="cust_trans_ptp_upi_ref_no" id="cust_trans_ptp_upi_ref_no" >
										<div class="fv-plugins-message-container invalid-feedback"></div>
									</div>
									<div class="col-lg-3 fv-row fv-plugins-icon-container" id="upi_com_bank_ln_pay_tbox" style="display:none;">
										<select class="form-select form-select-solid" data-control="select2" data-placeholder="Company Bank" data-hide-search="true" name="cust_trans_ptp_upi_comp_bank" id="cust_trans_ptp_upi_comp_bank">
											<option value="">Select</option>
											<?php
												$bnk_det=$this->db->query("select * from BANKS where ACTIVE='Y'")->result_array();
												foreach ($bnk_det as $blist) 
												{
											?>
											<option value="<?php echo $blist['SNO'];?>"><?php
												$len=strlen( $blist['ACCOUNTNO']);
												$acc_no=substr($blist['ACCOUNTNO'], $len-4);
												 echo $blist['BANKNAME']." - ".$acc_no." - ".$blist['BRANCH']." - ".$blist['PERSONNAME'];?></option>
											<?php 	} 	?>
										</select>
									</div>
									<div class="col-lg-2 fv-row fv-plugins-icon-container" id="upi_par_bank_ln_pay_tbox" style="display:none;">
										<select class="form-select form-select-solid" data-control="select2" data-placeholder="Party Bank" data-hide-search="true" name="cust_trans_ptp_upi_party_bank" id="cust_trans_ptp_upi_party_bank">
											<option value="">Select</option>
											<option value="1">UPI-12546875-kumar</option>				
											<option value="2">Bank-1254867-Kumar</option>
										</select>
									</div>
									<div class="col-lg-2 fv-row fv-plugins-icon-container" id="upi_detail_ln_pay_tbox" style="display:none;">
										<textarea class="form-control form-control-solid" rows="1" placeholder="Details" name="cust_trans_ptp_upi_details" id="cust_trans_ptp_upi_details"></textarea>
									</div>
								</div>
								<div class="row mt-4">
									<div class="col-lg-6 text-center">
										<label class="col-form-label fw-bold fs-3">Paid Amount &emsp;</label>
										<label class="col-form-label fw-bold fs-3" id="cust_trans_ptp_paid_amount">4900.00</label>
									</div>
									<div class="col-lg-6 text-center">
										<label class="col-form-label fw-bold fs-3">Balance Amount &emsp;</label>
										<label class="col-form-label fw-bold fs-3" id="cust_trans_ptp_bal_amount">0.00</label>
									</div>
								</div>
								<div class="d-flex justify-content-end mt-6 px-9">
									<button type="reset" class="btn btn-secondary me-3" data-bs-dismiss="modal">Cancel</button>
									<div type="submit" class="btn btn-primary" onclick="cust_trans_pay_to_party();">Pay</div>
								</div>
							<!-- </div> -->
							<!--end::Modal body-->
					</div>
					<!--end::Modal content-->
				</div>
				<!--end::Modal dialog-->
			</div>
		</div>
		<!--end::Modal - view payment-->

		<!--begin::Modal - view party payment from customer transfer -->
		<div class="modal fade" id="kt_modal_view_payment_pay_now_party" tabindex="-1" aria-hidden="true">
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
							<h1 class="mb-3">Party Payment Details</h1>
						</div>
						<!--end::Heading-->
						<!--end::Heading-->
							<!-- <div style="padding: 10px 10px 10px 10px !important;box-shadow: 0 3px 6px #00002947;border-radius: 5px;background-color:#f5f5f1 !important;"> -->
								<!-- <div><label class="col-form-label fw-bold fs-6"><u>Payment Details</u></label></div> -->
								<div class="row">
									<label class="col-lg-2 col-form-label fw-bold fs-3">Net Pay</label>
									<label class="col-lg-2 col-form-label fw-bold fs-3" id="cust_trans_ppnetpay_amt">0.00</label>
								</div>
								<div class="row">
									<div class="col-lg-2 fv-row fv-plugins-icon-container fv-plugins-bootstrap5-row-invalid">
										<div class="d-flex align-items-center mt-1">
											<label class="form-check form-check-inline form-check-solid me-5 is-invalid">
												<input class="form-check-input" name="" type="checkbox" value="1" id="cash_cus_transfer_paid_from_party_add_radio" onclick="cash_cus_tr_pdfrm_party_add_radio()">
											</label>
											<label class="col-form-label fw-semibold fs-6 me-5">Cash</label>
										</div>
									</div>
									<div class="col-lg-2 fv-row fv-plugins-icon-container fv-plugins-bootstrap5-row-invalid">
										<div class="d-flex align-items-center mt-1">
											<label class="form-check form-check-inline form-check-solid me-5 is-invalid">
												<input class="form-check-input" name="" type="checkbox" value="1" id="cheque_cus_transfer_paid_from_party_add_radio" onclick="cheque_cus_tr_pdfrm_party_add_radio()">
											</label>
											<label class="col-form-label fw-semibold fs-6">Cheque</label>
										</div>
									</div>
									<div class="col-lg-2 fv-row fv-plugins-icon-container fv-plugins-bootstrap5-row-invalid">
										<div class="d-flex align-items-center mt-1">
											<label class="form-check form-check-inline form-check-solid me-5 is-invalid">
												<input class="form-check-input" name="" type="checkbox" value="1" id="rtgs_cus_transfer_paid_from_party_add_radio" onclick="rtgs_cus_tr_pdfrm_party_add_radio()">
											</label>
											<label class="col-form-label fw-semibold fs-6">RTGS</label>
										</div>
									</div>
									<div class="col-lg-2 fv-row fv-plugins-icon-container fv-plugins-bootstrap5-row-invalid">
										<div class="d-flex align-items-center mt-1">
											<label class="form-check form-check-inline form-check-solid me-5 is-invalid">
												<input class="form-check-input" name="" type="checkbox" value="1" id="upi_cus_transfer_paid_from_party_add_radio" onclick="upi_cus_tr_pdfrm_party_add_radio()">
											</label>
											<label class="col-form-label fw-semibold fs-6">UPI</label>
										</div>
									</div>
									<div class="col-lg-2 fv-row fv-plugins-icon-container fv-plugins-bootstrap5-row-invalid">
										<div class="d-flex align-items-center mt-1">
											<label class="form-check form-check-inline form-check-solid me-5 is-invalid">
												<input class="form-check-input" name="mcard_cus_transfer_paid_from_party_add_radio" type="checkbox" value="1" id="mcard_cus_transfer_paid_from_party_add_radio" onclick="mcard_cus_tr_pdfrm_party_add_radio()">
											</label>
											<label class="col-form-label fw-semibold fs-6">M.Card</label>
										</div>
									</div>
									<!-- <div class="col-lg-2 fv-row fv-plugins-icon-container fv-plugins-bootstrap5-row-invalid">
										<div class="d-flex align-items-center mt-1">
											<label class="form-check form-check-inline form-check-solid me-5 is-invalid">
												<input class="form-check-input" name="chit_cus_transfer_paid_from_party_add_radio" type="checkbox" value="1" id="chit_cus_transfer_paid_from_party_add_radio" onclick="chit_cus_tr_pdfrm_party_add_radio()">
											</label>
											<label class="col-form-label fw-semibold fs-6">Chit</label>
										</div>
									</div> -->
								</div>
								<div class="row">
									<label class="col-lg-1 col-form-label fw-semibold fs-6" id="cus_tr_cash_party_label" style="display:none;">Cash</label>
									<div class="col-lg-2 fv-row fv-plugins-icon-container" id="cus_tr_cash_party_label_tbox" style="display:none;">
										<input type="text" class="form-control form-control-lg form-control-solid" placeholder="Amount" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" name="cust_trans_ppcash_amt" id="cust_trans_ppcash_amt" onkeyup="cust_trans_party_payment_calc();" value="0">
										<div class="fv-plugins-message-container invalid-feedback"></div>
									</div>
									<div class="col-lg-3 fv-row fv-plugins-icon-container" id="cus_tr_cash_party_detail_tbox" style="display:none;">
										<textarea class="form-control form-control-solid" rows="1" placeholder="Details" name="cust_trans_ppcash_details" id="cust_trans_ppcash_details" ></textarea>
									</div>
								</div>
								<div class="row">
									<label class="col-lg-1 col-form-label fw-semibold fs-6" id="cus_tr_cheque_party_amt" style="display:none;">Cheque</label>
									<div class="col-lg-2 fv-row fv-plugins-icon-container" id="cus_tr_cheque_party_amt_tbox" style="display:none;">
										<input type="text" name="cust_trans_ppchq_amt" id="cust_trans_ppchq_amt" class="form-control form-control-lg form-control-solid" placeholder="Amount" oninput="this.value = this.value.replace(/[^A-Za-z/0-9.]/g, '').replace(/(\..*)\./g, '$1');" onkeyup="cust_trans_party_payment_calc();" value="0">
										<div class="fv-plugins-message-container invalid-feedback"></div>
									</div>
									<div class="col-lg-3 fv-row fv-plugins-icon-container"  id="cus_tr_cheque_party_bank_tbox" style="display:none;">
										<select class="form-select form-select-solid" data-control="select2" data-placeholder="Select Party Bank">
											<option value="">Select</option>
											<option value="canara bank">Canara Bank</option>
											<option value="iob">IOB</option>
										</select>
									</div>
									<div class="col-lg-3 fv-row fv-plugins-icon-container" id="cus_tr_cheque_party_chq_no_tbox" style="display:none;">
										<input type="text" name="" class="form-control form-control-lg form-control-solid" placeholder="Cheque/Ref Number" oninput="this.value = this.value.replace(/[^A-Za-z/0-9.]/g, '').replace(/(\..*)\./g, '$1');" >
										<div class="fv-plugins-message-container invalid-feedback"></div>
									</div>
									<div class="col-lg-3 fv-row fv-plugins-icon-container" id="cus_tr_cheque_party_detail_tbox" style="display:none;">
										<textarea class="form-control form-control-solid" rows="1" placeholder="Details" name="cust_trans_ppcchq_details" id="cust_trans_ppcchq_details"></textarea>
									</div>
								</div>
								<div class="row">
									<label class="col-lg-1 col-form-label fw-semibold fs-6" id="cus_tr_rtgs_party_amt" style="display:none;">RTGS</label>
									<div class="col-lg-2 fv-row fv-plugins-icon-container" id="cus_tr_rtgs_party_amt_tbox" style="display:none;">
										<input type="text" name="cust_trans_pprtgs_amt" id="cust_trans_pprtgs_amt" class="form-control form-control-lg form-control-solid" placeholder="Amount" oninput="this.value = this.value.replace(/[^A-Za-z/0-9.]/g, '').replace(/(\..*)\./g, '$1');" onkeyup="cust_trans_party_payment_calc();" value="0">
										<div class="fv-plugins-message-container invalid-feedback"></div>
									</div>
									<div class="col-lg-3 fv-row fv-plugins-icon-container" id="cus_tr_rtgs_party_no_tbox" style="display:none;">
										<input type="text" name="" class="form-control form-control-lg form-control-solid" placeholder="Trans/Ref Number" oninput="this.value = this.value.replace(/[^A-Za-z/0-9.]/g, '').replace(/(\..*)\./g, '$1');">
										<div class="fv-plugins-message-container invalid-feedback"></div>
									</div>
									<div class="col-lg-3 fv-row fv-plugins-icon-container" id="cus_tr_rtgs_party_bank_tbox" style="display:none;">
										<select class="form-select form-select-solid" data-control="select2" data-placeholder="Select Company Bank" data-hide-search="true">
											<option value="">Select</option>
											<?php
												$bnk_det=$this->db->query("select * from BANKS where ACTIVE='Y'")->result_array();
												foreach ($bnk_det as $blist) 
												{
											?>
											<option value="<?php echo $blist['SNO'];?>"><?php
												$len=strlen( $blist['ACCOUNTNO']);
												$acc_no=substr($blist['ACCOUNTNO'], $len-4);
												 echo $blist['BANKNAME']." - ".$acc_no." - ".$blist['BRANCH']." - ".$blist['PERSONNAME'];?></option>
											<?php 	} 	?>
										</select>
									</div>
									<div class="col-lg-3 fv-row fv-plugins-icon-container" id="cus_tr_rtgs_party_detail_tbox" style="display:none;">
										<textarea class="form-control form-control-solid" rows="1" placeholder="Details" name="cust_trans_pprtgs_details" id="cust_trans_pprtgs_details"></textarea>
									</div>
								</div>
								<div class="row">
									<label class="col-lg-1 col-form-label fw-semibold fs-6" id="cus_tr_upi_party_amt" style="display:none;">UPI</label>
									<div class="col-lg-2 fv-row fv-plugins-icon-container" id="cus_tr_upi_party_amt_tbox" style="display:none;">
										<input type="text" name="cust_trans_ppupi_amt" id="cust_trans_ppupi_amt" class="form-control form-control-lg form-control-solid" placeholder="Amount" onkeyup="cust_trans_party_payment_calc();" value="0">
										<div class="fv-plugins-message-container invalid-feedback"></div>
									</div>
									<div class="col-lg-3 fv-row fv-plugins-icon-container" id="cus_tr_upi_party_trans_no_tbox" style="display:none;">
										<input type="text" name="" class="form-control form-control-lg form-control-solid" placeholder="Trans/Ref Number">
										<div class="fv-plugins-message-container invalid-feedback"></div>
									</div>
									<div class="col-lg-3 fv-row fv-plugins-icon-container" id="cus_tr_upi_party_bank_tbox" style="display:none;">
										<select class="form-select form-select-solid" data-control="select2" data-placeholder="Select Company Bank" data-hide-search="true">
											<option value="">Select</option>
											<?php
												$bnk_det=$this->db->query("select * from BANKS where ACTIVE='Y'")->result_array();
												foreach ($bnk_det as $blist) 
												{
											?>
											<option value="<?php echo $blist['SNO'];?>"><?php
												$len=strlen( $blist['ACCOUNTNO']);
												$acc_no=substr($blist['ACCOUNTNO'], $len-4);
												 echo $blist['BANKNAME']." - ".$acc_no." - ".$blist['BRANCH']." - ".$blist['PERSONNAME'];?></option>
											<?php 	} 	?>
										</select>
									</div>
									<div class="col-lg-3 fv-row fv-plugins-icon-container" id="cus_tr_upi_party_detail_tbox" style="display:none;">
										<textarea class="form-control form-control-solid" rows="1" placeholder="Details" name="cust_trans_ppupi_details" id="cust_trans_ppupi_details"></textarea>
									</div>
								</div>
								<div class="row">
									<label class="col-lg-1 col-form-label fw-semibold fs-6" id="cus_tr_card_no_paid_from_pty" style="display:none;">M.card No</label>
									<div class="col-lg-2" id="cus_tr_card_no_paid_from_pty_tbox" style="display:none;">
										<input type="text" class="form-control form-control-lg form-control-solid" placeholder="M.Card No" >
										<div class="fv-plugins-message-container invalid-feedback"></div>
									</div>
									<div class="col-lg-3" id="cus_tr_points_paid_from_pty" style="display:none;">
										<label class="col-form-label fw-bold fs-6">Available Points</label>&emsp;
										<label class="col-form-label fw-bold fs-5">10052</label>
									</div>
									<!-- <label class="col-lg-1 col-form-label fw-semibold fs-6" id="cus_tr_redeem_paid_from_cmy" style="display:none;">Redeem</label> -->
									<div class="col-lg-2" id="cus_tr_redeem_paid_from_pty_tbox" style="display:none;">
										<input type="text" class="form-control form-control-lg form-control-solid" placeholder="Redeem Points" >
										<div class="fv-plugins-message-container invalid-feedback"></div>
									</div>
									<div class="col-lg-2 fv-row fv-plugins-icon-container" id="cus_tr_mcard_detail_paid_from_pty_tbox" style="display:none;">
										<textarea class="form-control form-control-solid" rows="1" placeholder="Details" name="" id=""></textarea>
									</div>
								</div>
								<div class="row">
									<label class="col-lg-1 col-form-label fw-semibold fs-6" id="cus_tr_sch_paid_from_pty" style="display:none;">Scheme</label>
									<div class="col-lg-2 fv-row fv-plugins-icon-container" id="cus_tr_sch_paid_from_pty_tbox" style="display:none;">
										<select class="form-select form-select-solid" data-control="select2" data-placeholder="Select Scheme" id="" data-hide-search="true">
											<option value="">Select</option>
											<option value="selvamagal">Selvamagal</option>				
											<option value="thangamagan">Thangamagan</option>
										</select>
									</div>
									<div class="col-lg-3 fv-row fv-plugins-icon-container" id="cus_tr_avai_bal_paid_from_pty" style="display:none;">
										<select class="form-select form-select-solid" data-control="select2" data-placeholder="Select Chit ID" data-hide-search="true">
											<option value="">Select Chit ID</option>
											<option value="1">CH-001/23 - 45863.00</option>				
											<option value="2">CH-002/23 - 85964.00</option>
										</select>
									</div>
									<div class="col-lg-2" id="cus_tr_redeem_amt_paid_from_pty_tbox" style="display:none;">
										<input type="text" class="form-control form-control-lg form-control-solid" placeholder="Redeem Amount" >
										<div class="fv-plugins-message-container invalid-feedback"></div>
									</div>
									<div class="col-lg-2 fv-row fv-plugins-icon-container" id="cus_tr_redeem_detail_paid_from_pty_tbox" style="display:none;">
										<textarea class="form-control form-control-solid" rows="1" placeholder="Details" name="" id=""></textarea>
									</div>
								</div>
								<div class="row mt-4">
									<div class="col-lg-6 text-center">
										<label class="col-form-label fw-bold fs-3">Paid Amount &emsp;</label>
										<label class="col-form-label fw-bold fs-3" id="cust_trans_pp_paid_amt">0.00</label>
									</div>
									<div class="col-lg-6 text-center">
										<label class="col-form-label fw-bold fs-3">Balance Amount &emsp;</label>
										<label class="col-form-label fw-bold fs-3" id="cust_trans_pp_bal_amt">0.00</label>
									</div>
								</div>
								<div class="d-flex justify-content-end mt-6 px-9">
									<button type="reset" class="btn btn-secondary me-3" data-bs-dismiss="modal">Cancel</button>
									<button type="submit" class="btn btn-primary" onclick="cust_trans_payment_from_party();">Pay</button>
								</div>
							<!-- </div> -->
							<!--end::Modal body-->
					</div>
					<!--end::Modal content-->
				</div>
				<!--end::Modal dialog-->
			</div>
		</div>
		<!--end::Modal - view party payment from customer transfer-->

		<!--begin::Modal - view payment -->
		<div class="modal fade" id="kt_modal_view_payment_multi_jwl" tabindex="-1" aria-hidden="true">
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
							<h1 class="mb-3">Payment and Transaction Details</h1>
						</div>
						<!--end::Heading-->
						<!--end::Heading-->
							<!-- <div style="padding: 10px 10px 10px 10px !important;box-shadow: 0 3px 6px #00002947;border-radius: 5px;background-color:#f5f5f1 !important;"> -->
								<!-- <div><label class="col-form-label fw-bold fs-6"><u>Payment Details</u></label></div> -->
								<div class="row">
									<label class="col-lg-2 col-form-label fw-bold fs-3">Net Pay</label>
									<label class="col-lg-2 col-form-label fw-bold fs-3" id="mul_jwl_ptp_net_pay">7922.99</label>
								</div>
								<div class="row">
									<div class="col-lg-2 fv-row fv-plugins-icon-container fv-plugins-bootstrap5-row-invalid">
										<div class="d-flex align-items-center mt-1">
											<label class="form-check form-check-inline form-check-solid me-5 is-invalid">
												<input class="form-check-input" name="" type="checkbox" value="1" id="mj_cash_loan_paynow_add_radio" onclick="cash_ln_paynow_add_radio1();">
											</label>
											<label class="col-form-label fw-semibold fs-6 me-5">Cash</label>
										</div>
									</div>
									<div class="col-lg-2 fv-row fv-plugins-icon-container fv-plugins-bootstrap5-row-invalid">
										<div class="d-flex align-items-center mt-1">
											<label class="form-check form-check-inline form-check-solid me-5 is-invalid">
												<input class="form-check-input" name="" type="checkbox" value="1" id="mj_cheque_loan_paynow_add_radio" onclick="cheque_ln_paynow_add_radio1();">
											</label>
											<label class="col-form-label fw-semibold fs-6">Cheque</label>
										</div>
									</div>
									<div class="col-lg-2 fv-row fv-plugins-icon-container fv-plugins-bootstrap5-row-invalid">
										<div class="d-flex align-items-center mt-1">
											<label class="form-check form-check-inline form-check-solid me-5 is-invalid">
												<input class="form-check-input" name="" type="checkbox" value="1" id="mj_rtgs_loan_paynow_add_radio" onclick="rtgs_ln_paynow_add_radio1()">
											</label>
											<label class="col-form-label fw-semibold fs-6">RTGS</label>
										</div>
									</div>
									<div class="col-lg-2 fv-row fv-plugins-icon-container fv-plugins-bootstrap5-row-invalid">
										<div class="d-flex align-items-center mt-1">
											<label class="form-check form-check-inline form-check-solid me-5 is-invalid">
												<input class="form-check-input" name="" type="checkbox" value="1" id="mj_upi_loan_paynow_add_radio" onclick="upi_ln_paynow_add_radio1()">
											</label>
											<label class="col-form-label fw-semibold fs-6">UPI</label>
										</div>
									</div>
								</div>
								<div class="row">
									<label class="col-lg-1 col-form-label fw-semibold fs-6" id="mj_cash_label_ln_pay" style="display:none;">Cash</label>
									<div class="col-lg-2 fv-row fv-plugins-icon-container" id="mj_cash_label_ln_pay_tbox" style="display:none;">
										<input type="text" class="form-control form-control-lg form-control-solid" placeholder="Amount"  name="mul_jwl_ptp_cash_amt" id="mul_jwl_ptp_cash_amt" onkeyup="mul_jwl_company_payment_calc();"	value="0">
										<div class="fv-plugins-message-container invalid-feedback"></div>
									</div>
									<div class="col-lg-2 fv-row fv-plugins-icon-container" id="mj_cash_detail_ln_pay_tbox" style="display:none;">
										<textarea class="form-control form-control-solid" rows="1" placeholder="Details" name="mul_jwl_ptp_cash_details" id="mul_jwl_ptp_cash_details"></textarea>
									</div>
								</div>
								<div class="row">
									<label class="col-lg-1 col-form-label fw-semibold fs-6" id="mj_cheque_label_ln_pay" style="display:none;">Cheque</label>
									<div class="col-lg-2 fv-row fv-plugins-icon-container"id="mj_cheque_amt_ln_pay_tbox" style="display:none;">
										<input type="text" class="form-control form-control-lg form-control-solid" placeholder="Amount" name="mul_jwl_ptp_chq_amt" id="mul_jwl_ptp_chq_amt" onkeyup="mul_jwl_company_payment_calc();"	value="0">
										<div class="fv-plugins-message-container invalid-feedback"></div>
									</div>
									<div class="col-lg-2 fv-row fv-plugins-icon-container" id="mj_cheque_no_ln_pay_tbox" style="display:none;">
										<input type="text" class="form-control form-control-lg form-control-solid" placeholder="Cheque No" name="mul_jwl_ptp_chq_no" name="mul_jwl_ptp_chq_no">
										<div class="fv-plugins-message-container invalid-feedback"></div>
									</div>
									<div class="col-lg-3 fv-row fv-plugins-icon-container" id="mj_cheque_com_bank_ln_pay_tbox" style="display:none;">
										<select class="form-select form-select-solid" data-control="select2" data-hide-search="true" name="mul_jwl_ptp_chq_comp_bank" id="mul_jwl_ptp_chq_comp_bank" data-placeholder="Company Bank">
											<option value="">Select</option>
											<?php
												$bnk_det=$this->db->query("select * from BANKS where ACTIVE='Y'")->result_array();
												foreach ($bnk_det as $blist) 
												{
											?>
											<option value="<?php echo $blist['SNO'];?>"><?php
												$len=strlen( $blist['ACCOUNTNO']);
												$acc_no=substr($blist['ACCOUNTNO'], $len-4);
												 echo $blist['BANKNAME']." - ".$acc_no." - ".$blist['BRANCH']." - ".$blist['PERSONNAME'];?></option>
											<?php 	} 	?>
										</select>
									</div>
									<div class="col-lg-2 fv-row fv-plugins-icon-container" id="mj_cheque_par_bank_ln_pay_tbox" style="display:none;">
										<select class="form-select form-select-solid" data-control="select2" data-placeholder="Party Bank" data-hide-search="true" id="mul_jwl_ptp_chq_party_bank" name="mul_jwl_ptp_chq_party_bank">
											<option value="">Select</option>
											<option value="1">UPI-12546875-kumar</option>				
											<option value="2">Bank-1254867-Kumar</option>
										</select>
									</div>
									<div class="col-lg-2 fv-row fv-plugins-icon-container"  id="mj_cheque_detail_ln_pay_tbox" style="display:none;">
										<textarea class="form-control form-control-solid" rows="1" placeholder="Details" name="mul_jwl_ptp_chq_details" id="mul_jwl_ptp_chq_details"></textarea>
									</div>
								</div>
								<div class="row">
									<label class="col-lg-1 col-form-label fw-semibold fs-6" id="mj_rtgs_label_ln_pay" style="display:none;">RTGS</label>
									<div class="col-lg-2 fv-row fv-plugins-icon-container" id="mj_rtgs_amt_ln_pay_tbox" style="display:none;">
										<input type="text" class="form-control form-control-lg form-control-solid" placeholder="Amount" id="mul_jwl_ptp_rtgs_amt" name="mul_jwl_ptp_rtgs_amt" onkeyup="mul_jwl_company_payment_calc();"	value="0">
										<div class="fv-plugins-message-container invalid-feedback"></div>
									</div>
									<div class="col-lg-2 fv-row fv-plugins-icon-container" id="mj_rtgs_ref_ln_pay_tbox" style="display:none;">
										<input type="text" class="form-control form-control-lg form-control-solid" placeholder="Reference No" name="mul_jwl_ptp_rtgs_ref_no" id="mul_jwl_ptp_rtgs_ref_no" >
										<div class="fv-plugins-message-container invalid-feedback"></div>
									</div>
									<div class="col-lg-3 fv-row fv-plugins-icon-container" id="mj_rtgs_com_bank_ln_pay_tbox" style="display:none;">
										<select class="form-select form-select-solid" data-control="select2" data-placeholder="Company Bank" data-hide-search="true" name="mul_jwl_ptp_rtgs_comp_bank" id="mul_jwl_ptp_rtgs_comp_bank">
											<option value="">Select</option>
											<?php
												$bnk_det=$this->db->query("select * from BANKS where ACTIVE='Y'")->result_array();
												foreach ($bnk_det as $blist) 
												{
											?>
											<option value="<?php echo $blist['SNO'];?>"><?php
												$len=strlen( $blist['ACCOUNTNO']);
												$acc_no=substr($blist['ACCOUNTNO'], $len-4);
												 echo $blist['BANKNAME']." - ".$acc_no." - ".$blist['BRANCH']." - ".$blist['PERSONNAME'];?></option>
											<?php 	} 	?>
										</select>
									</div>
									<div class="col-lg-2 fv-row fv-plugins-icon-container" id="mj_rtgs_par_bank_ln_pay_tbox" style="display:none;">
										<select class="form-select form-select-solid" data-control="select2" data-placeholder="Party Bank" data-hide-search="true" id="mul_jwl_ptp_rtgs_party_bank" name="mul_jwl_ptp_rtgs_party_bank">
											<option value="">Select</option>
											<option value="1">UPI-12546875-kumar</option>				
											<option value="2">Bank-1254867-Kumar</option>
										</select>
									</div>
									<div class="col-lg-2 fv-row fv-plugins-icon-container" id="mj_rtgs_detail_ln_pay_tbox" style="display:none;">
										<textarea class="form-control form-control-solid" rows="1" placeholder="Details" name="mul_jwl_ptp_rtgs_details" id="mul_jwl_ptp_rtgs_details"></textarea>
									</div>
								</div>
								<div class="row">
									<label class="col-lg-1 col-form-label fw-semibold fs-6" id="mj_upi_label_ln_pay" style="display:none;">UPI</label>
									<div class="col-lg-2 fv-row fv-plugins-icon-container" id="mj_upi_amt_ln_pay_tbox" style="display:none;">
										<input type="text" class="form-control form-control-lg form-control-solid" placeholder="Amount" name="mul_jwl_ptp_upi_amt" id="mul_jwl_ptp_upi_amt" onkeyup="mul_jwl_company_payment_calc();"	value="0">
										<div class="fv-plugins-message-container invalid-feedback"></div>
									</div>
									<div class="col-lg-2 fv-row fv-plugins-icon-container" id="mj_upi_ref_ln_pay_tbox" style="display:none;">
										<input type="text" class="form-control form-control-lg form-control-solid" placeholder="Reference No" name="mul_jwl_ptp_upi_ref_no" id="mul_jwl_ptp_upi_ref_no">
										<div class="fv-plugins-message-container invalid-feedback"></div>
									</div>
									<div class="col-lg-3 fv-row fv-plugins-icon-container" id="mj_upi_com_bank_ln_pay_tbox" style="display:none;">
										<select class="form-select form-select-solid" data-control="select2" data-placeholder="Company Bank" data-hide-search="true" id="mul_jwl_ptp_upi_comp_bank" name="mul_jwl_ptp_upi_comp_bank">
											<option value="">Select</option>
											<?php
												$bnk_det=$this->db->query("select * from BANKS where ACTIVE='Y'")->result_array();
												foreach ($bnk_det as $blist) 
												{
											?>
											<option value="<?php echo $blist['SNO'];?>"><?php
												$len=strlen( $blist['ACCOUNTNO']);
												$acc_no=substr($blist['ACCOUNTNO'], $len-4);
												 echo $blist['BANKNAME']." - ".$acc_no." - ".$blist['BRANCH']." - ".$blist['PERSONNAME'];?></option>
											<?php 	} 	?>
										</select>
									</div>
									<div class="col-lg-2 fv-row fv-plugins-icon-container" id="mj_upi_par_bank_ln_pay_tbox" style="display:none;">
										<select class="form-select form-select-solid" data-control="select2" data-placeholder="Party Bank" data-hide-search="true" id="mul_jwl_ptp_upi_party_bank" name="mul_jwl_ptp_upi_party_bank">
											<option value="">Select</option>
											<option value="1">UPI-12546875-kumar</option>				
											<option value="2">Bank-1254867-Kumar</option>
										</select>
									</div>
									<div class="col-lg-2 fv-row fv-plugins-icon-container" id="mj_upi_detail_ln_pay_tbox" style="display:none;">
										<textarea class="form-control form-control-solid" rows="1" placeholder="Details" name="mul_jwl_ptp_upi_details" id="mul_jwl_ptp_upi_details"></textarea>
									</div>
								</div>
								<div class="row mt-4">
									<div class="col-lg-6 text-center">
										<label class="col-form-label fw-bold fs-3">Paid Amount &emsp;</label>
										<label class="col-form-label fw-bold fs-3" id="mul_jwl_ptp_paid_amount">7922.99</label>
									</div>
									<div class="col-lg-6 text-center">
										<label class="col-form-label fw-bold fs-3">Balance Amount &emsp;</label>
										<label class="col-form-label fw-bold fs-3" id="mul_jwl_ptp_bal_amount">0.00</label>
									</div>
								</div>
								<div class="d-flex justify-content-end mt-6 px-9">
									<button type="reset" class="btn btn-secondary me-3" data-bs-dismiss="modal">Cancel</button>
									<button type="submit" class="btn btn-primary">Pay</button>
								</div>
							<!-- </div> -->
							<!--end::Modal body-->
					</div>
					<!--end::Modal content-->
				</div>
				<!--end::Modal dialog-->
			</div>
		</div>
		<!--end::Modal - view payment-->

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

		<div class="modal fade" id="kt_modal_payment_to_receive" tabindex="-1" aria-hidden="true">
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
					<!-- <form method="POST" enctype="multipart/form-data" action="<?php echo base_url();?>loan/pay_to_party" > -->
						<div class="modal-body pt-0 pb-15 px-5 px-xl-20">
							<!--begin::Heading-->
							<div class="mb-13 text-center">
								<h1 class="mb-3">Payment to Receive</h1>
							</div>
							<!--end::Heading-->
							
							<div class="row">
								<!-- <div style="padding: 10px 10px 10px 10px !important;box-shadow: 0 3px 6px #00002947;border-radius: 5px;background-color:#f5f5f1 !important;"> -->
									<!-- <div><label class="col-form-label fw-bold fs-6"><u>Payment Details</u></label></div> -->
									<div class="row">
										<label class="col-lg-2 col-form-label fw-bold fs-3">Total to Receive</label>
										<label class="col-lg-2 col-form-label fw-bold fs-3" id="lbl_tot_to_rcv">0.00</label>
										<input type="hidden" name="tot_to_receive" id="tot_to_receive" value="0">
									</div>
									<div class="row">
										<div class="col-lg-2 fv-row fv-plugins-icon-container fv-plugins-bootstrap5-row-invalid">
											<div class="d-flex align-items-center mt-1">
												<label class="form-check form-check-inline form-check-solid me-5 is-invalid">
													<input class="form-check-input" name="cash_loan_received_add_radio" type="checkbox" value="1" id="cash_loan_received_add_radio" onclick="cash_ln_recev_add_radio()">
												</label>
												<label class="col-form-label fw-semibold fs-6 me-5">Cash</label>
											</div>
										</div>
										<div class="col-lg-2 fv-row fv-plugins-icon-container fv-plugins-bootstrap5-row-invalid">
											<div class="d-flex align-items-center mt-1">
												<label class="form-check form-check-inline form-check-solid me-5 is-invalid">
													<input class="form-check-input" name="cheque_loan_received_add_radio" type="checkbox" value="1" id="cheque_loan_received_add_radio" onclick="cheque_ln_recev_add_radio()">
												</label>
												<label class="col-form-label fw-semibold fs-6">Cheque</label>
											</div>
										</div>
										<div class="col-lg-2 fv-row fv-plugins-icon-container fv-plugins-bootstrap5-row-invalid">
											<div class="d-flex align-items-center mt-1">
												<label class="form-check form-check-inline form-check-solid me-5 is-invalid">
													<input class="form-check-input" name="rtgs_loan_received_add_radio" type="checkbox" value="1" id="rtgs_loan_received_add_radio" onclick="rtgs_ln_recev_add_radio()">
												</label>
												<label class="col-form-label fw-semibold fs-6">RTGS</label>
											</div>
										</div>
										<div class="col-lg-2 fv-row fv-plugins-icon-container fv-plugins-bootstrap5-row-invalid">
											<div class="d-flex align-items-center mt-1">
												<label class="form-check form-check-inline form-check-solid me-5 is-invalid">
													<input class="form-check-input" name="upi_loan_received_add_radio" type="checkbox" value="1" id="upi_loan_received_add_radio" onclick="upi_ln_recev_add_radio()">
												</label>
												<label class="col-form-label fw-semibold fs-6">UPI</label>
											</div>
										</div>
										<div class="col-lg-2 fv-row fv-plugins-icon-container fv-plugins-bootstrap5-row-invalid">
											<div class="d-flex align-items-center mt-1">
												<label class="form-check form-check-inline form-check-solid me-5 is-invalid">
													<input class="form-check-input" name="mem_card_loan_received_add_radio" type="checkbox" value="1" id="mem_card_loan_received_add_radio" onclick="mem_card_ln_recev_add_radio()">
												</label>
												<label class="col-form-label fw-semibold fs-6">Membership Card</label>
											</div>
										</div>
										<!-- <div class="col-lg-2 fv-row fv-plugins-icon-container fv-plugins-bootstrap5-row-invalid">
											<div class="d-flex align-items-center mt-1">
												<label class="form-check form-check-inline form-check-solid me-5 is-invalid">
													<input class="form-check-input" name="chit_loan_received_add_radio" type="checkbox" value="1" id="chit_loan_received_add_radio" onclick="chit_ln_recev_add_radio()">
												</label>
												<label class="col-form-label fw-semibold fs-6">Chit</label>
											</div>
										</div> -->
									</div>
									<div class="row">
										<label class="col-lg-1 col-form-label fw-semibold fs-6" id="cash_label" style="display:none;">Cash</label>
										<div class="col-lg-2 fv-row fv-plugins-icon-container" id="cash_label_tbox" style="display:none;">
											<input type="text" class="form-control form-control-lg form-control-solid" placeholder="Amount" onkeyup="payment_receive_calc()" value="0" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" name="p_receive_cash" id="p_receive_cash">
											<div class="fv-plugins-message-container invalid-feedback"></div>
										</div>
										<div class="col-lg-3 fv-row fv-plugins-icon-container" id="cash_detail_tbox" style="display:none;">
											<textarea class="form-control form-control-solid" rows="1" placeholder="Details" name="p_receive_cash_details" id="p_receive_cash_details"></textarea>
										</div>
									</div>
									<div class="row">
										<label class="col-lg-1 col-form-label fw-semibold fs-6" id="cheque_amt" style="display:none;">Cheque</label>
										<div class="col-lg-2 fv-row fv-plugins-icon-container" id="cheque_amt_tbox" style="display:none;">
											<input type="text" name="p_receive_cheque_amount" id="p_receive_cheque_amount" class="form-control form-control-lg form-control-solid" placeholder="Amount" onkeyup="payment_receive_calc()" value="0" oninput="this.value = this.value.replace(/[^A-Za-z/0-9.]/g, '').replace(/(\..*)\./g, '$1');">
											<div class="fv-plugins-message-container invalid-feedback"></div>
										</div>
										<!-- <label class="col-lg-1 col-form-label fw-semibold fs-6" id="cheque_bank" style="display:none;">Bank</label> -->
										<div class="col-lg-3 fv-row fv-plugins-icon-container" id="cheque_bank_tbox" style="display:none;">
											<input type="text" name="p_receive_cheque_party_bank" id="p_receive_cheque_party_bank" class="form-control form-control-lg form-control-solid" placeholder="Enter Party Bank" oninput="this.value = this.value.replace(/[^A-Za-z/0-9.]/g, '').replace(/(\..*)\./g, '$1');">
											<div class="fv-plugins-message-container invalid-feedback"></div>
										</div>
										<!-- <label class="col-lg-1 col-form-label fw-semibold fs-6" id="cheque_chq_no" style="display:none;">Cheque no</label> -->
										<div class="col-lg-3 fv-row fv-plugins-icon-container" id="cheque_chq_no_tbox" style="display:none;">
											<input type="text" name="p_receive_cheque_ref_no" id="p_receive_cheque_ref_no" class="form-control form-control-lg form-control-solid" placeholder="Cheque/Ref Number" oninput="this.value = this.value.replace(/[^A-Za-z/0-9.]/g, '').replace(/(\..*)\./g, '$1');">
											<div class="fv-plugins-message-container invalid-feedback"></div>
										</div>
										<!-- <label class="col-lg-1 col-form-label fw-semibold fs-6" id="cheque_detail" style="display:none;">Details</label> -->
										<div class="col-lg-3 fv-row fv-plugins-icon-container" id="cheque_detail_tbox" style="display:none;">
											<textarea class="form-control form-control-solid" rows="1" placeholder="Details" name="p_receive_cheque_details" id="p_receive_cheque_details"></textarea>
										</div>
									</div>
									<div class="row">
										<label class="col-lg-1 col-form-label fw-semibold fs-6" id="rtgs_amt" style="display:none;">RTGS</label>
										<div class="col-lg-2 fv-row fv-plugins-icon-container" id="rtgs_amt_tbox" style="display:none;">
											<input type="text" class="form-control form-control-lg form-control-solid" name="p_receive_rtgs_amount" id="p_receive_rtgs_amount" placeholder="Amount" onkeyup="payment_receive_calc()" value="0" oninput="this.value = this.value.replace(/[^A-Za-z/0-9.]/g, '').replace(/(\..*)\./g, '$1');">
											<div class="fv-plugins-message-container invalid-feedback"></div>
										</div>
										<!-- <label class="col-lg-1 col-form-label fw-semibold fs-6" id="rtgs_no" style="display:none;">RTGS No</label> -->
										<div class="col-lg-3 fv-row fv-plugins-icon-container" id="rtgs_no_tbox" style="display:none;">
											<input type="text" name="p_receive_rtgs_ref_no" id="p_receive_rtgs_ref_no" class="form-control form-control-lg form-control-solid" placeholder="Trans/Ref Number" oninput="this.value = this.value.replace(/[^A-Za-z/0-9.]/g, '').replace(/(\..*)\./g, '$1');">
											<div class="fv-plugins-message-container invalid-feedback"></div>
										</div>
										<div class="col-lg-3 fv-row fv-plugins-icon-container" id="rtgs_bank_tbox" style="display:none;">
											<select class="form-select form-select-solid" name="p_receive_rtgs_company_bank" id="p_receive_rtgs_company_bank" data-control="select2" data-placeholder="Select Company Bank" data-hide-search="true">
												<option value="">Select</option>
												<?php
													$bnk_det=$this->db->query("select * from BANKS where ACTIVE='Y'")->result_array();
													foreach ($bnk_det as $blist) {
													?>
													<option value="<?php echo $blist['SNO'];?>"><?php
													$len=strlen( $blist['ACCOUNTNO']);
													$acc_no=substr($blist['ACCOUNTNO'], $len-4);
													 echo $blist['BANKNAME']." - ".$acc_no." - ".$blist['BRANCH']." - ".$blist['PERSONNAME'];?></option>
													<?php
													}
													?>
											</select>
										</div>
										<!-- <label class="col-lg-1 col-form-label fw-semibold fs-6" id="rtgs_detail" style="display:none;">Details</label> -->
										<div class="col-lg-3 fv-row fv-plugins-icon-container" id="rtgs_detail_tbox" style="display:none;">
											<textarea class="form-control form-control-solid" rows="1" placeholder="Details" name="p_receive_rtgs_details" id="p_receive_rtgs_details"></textarea>
										</div>
									</div>
									<div class="row">
										<label class="col-lg-1 col-form-label fw-semibold fs-6" id="upi_amt" style="display:none;">UPI</label>
										<div class="col-lg-2 fv-row fv-plugins-icon-container" id="upi_amt_tbox" style="display:none;">
											<input type="text" name="p_receive_upi_amount" id="p_receive_upi_amount" class="form-control form-control-lg form-control-solid" placeholder="Amount" onkeyup="payment_receive_calc()" value="0">
											<div class="fv-plugins-message-container invalid-feedback"></div>
										</div>
										<!-- <label class="col-lg-1 col-form-label fw-semibold fs-6" id="upi_trans_no" style="display:none;">Trans No</label> -->
										<div class="col-lg-3 fv-row fv-plugins-icon-container" id="upi_trans_no_tbox" style="display:none;">
											<input type="text" name="p_receive_upi_ref_no" id="p_receive_upi_ref_no" class="form-control form-control-lg form-control-solid" placeholder="Trans/Ref Number">
											<div class="fv-plugins-message-container invalid-feedback"></div>
										</div>
										<div class="col-lg-3 fv-row fv-plugins-icon-container" id="upi_bank_tbox" style="display:none;">
											<select name="p_receive_upi_company_bank" id="p_receive_upi_company_bank" class="form-select form-select-solid" data-control="select2" data-placeholder="Select Company Bank" data-hide-search="true">
												<option value="">Select</option>
												<?php
													$bnk_det=$this->db->query("select * from BANKS where ACTIVE='Y'")->result_array();
													foreach ($bnk_det as $blist) {
													?>
													<option value="<?php echo $blist['SNO'];?>"><?php
													$len=strlen( $blist['ACCOUNTNO']);
													$acc_no=substr($blist['ACCOUNTNO'], $len-4);
													 echo $blist['BANKNAME']." - ".$acc_no." - ".$blist['BRANCH']." - ".$blist['PERSONNAME'];?></option>
													<?php
													}
													?>
											</select>
										</div>
										<!-- <label class="col-lg-1 col-form-label fw-semibold fs-6" id="upi_detail" style="display:none;">Details</label> -->
										<div class="col-lg-3 fv-row fv-plugins-icon-container" id="upi_detail_tbox" style="display:none;">
											<textarea class="form-control form-control-solid" rows="1" placeholder="Details"  name="p_receive_upi_details" id="p_receive_upi_details"></textarea>
										</div>
									</div>
									<div class="row">
										<label class="col-lg-1 col-form-label fw-semibold fs-6" id="lbl_mem_card_no_pop" style="display:none;">M.card No</label>
										<div class="col-lg-2" id="mem_card_no_tbox" style="display:none;">
											<input type="text" class="form-control form-control-lg form-control-solid" placeholder="Membership Card No" name="mem_card_no" id="mem_card_no" readonly>
											<div class="fv-plugins-message-container invalid-feedback"></div>
										</div>
										<div class="col-lg-3" id="mem_card_avail_points_tbox" style="display:none;">
											<label class="col-form-label fw-bold fs-6">Available Points</label>&emsp;
											<label class="col-form-label fw-bold fs-5" id="mem_card_points">10052</label>
										</div>
										<!-- <label class="col-lg-1 col-form-label fw-semibold fs-6" id="cus_cl_redeem_paid_from_cmy" style="display:none;">Redeem</label> -->
										<div class="col-lg-2" id="mem_card_redeem_tbox" style="display:none;">
											<input type="text" class="form-control form-control-lg form-control-solid" placeholder="Redeem Points" name="mem_card_redeem_points" id="mem_card_redeem_points"  onkeyup="payment_receive_calc();" value="0">
											<div class="fv-plugins-message-container invalid-feedback"></div>
										</div>
										<div class="col-lg-2 fv-row fv-plugins-icon-container" id="mem_card_details_tbox" style="display:none;">
											<textarea class="form-control form-control-solid" rows="1" placeholder="Details" name="mem_card_details" id="mem_card_details"></textarea>
										</div>
									</div>
									<div class="row">
										<label class="col-lg-1 col-form-label fw-semibold fs-6" id="cus_cl_sch_paid_from_pty" style="display:none;">Scheme</label>
										<div class="col-lg-2 fv-row fv-plugins-icon-container" id="cus_cl_sch_paid_from_pty_tbox" style="display:none;">
											<select class="form-select form-select-solid" data-control="select2" data-placeholder="Select Scheme" id="cust_cls_ppchit_scheme" name="cust_cls_ppchit_scheme" data-hide-search="true">
												<option value="">Select</option>
												<option value="1">Selvamagal</option>				
												<option value="2">Thangamagan</option>
											</select>
										</div>
										<div class="col-lg-3 fv-row fv-plugins-icon-container" id="cus_cl_avai_bal_paid_from_pty" style="display:none;">
											<select class="form-select form-select-solid" data-control="select2" data-placeholder="Select Chit ID" data-hide-search="true" name="cust_cls_ppchit_number" id="cust_cls_ppchit_number">
												<option value="">Select Chit ID</option>
												<option value="1">CH-001/23 - 45863.00</option>				
												<option value="2">CH-002/23 - 85964.00</option>
											</select>
										</div>
										<div class="col-lg-2" id="cus_cl_redeem_amt_paid_from_pty_tbox" style="display:none;">
											<input type="text" class="form-control form-control-lg form-control-solid" placeholder="Redeem Amount" name="cust_cls_ppchit_red_amount" id="cust_cls_ppchit_red_amount"  onkeyup="cust_close_party_payment_calc();" value="0">
											<div class="fv-plugins-message-container invalid-feedback"></div>
										</div>
										<div class="col-lg-2 fv-row fv-plugins-icon-container" id="cus_cl_redeem_detail_paid_from_pty_tbox" style="display:none;">
											<textarea class="form-control form-control-solid" rows="1" placeholder="Details" name="cust_cls_ppchit_details" id="cust_cls_ppchit_details"></textarea>
										</div>
									</div>
									<div class="row mt-4">
										<div class="col-lg-6 text-center">
											<label class="col-form-label fw-bold fs-3">Paid Amount &emsp;</label>
											<label class="col-form-label fw-bold fs-3" id="lbl_ptr_paid_amt">0.00</label>
										</div>
										<div class="col-lg-6 text-center">
											<label class="col-form-label fw-bold fs-3">Balance Amount &emsp;</label>
											<label class="col-form-label fw-bold fs-3" id="lbl_ptr_bal_amt">0.00</label>
										</div>
									</div>
									<div class="d-flex justify-content-end mt-6 px-9">
										<button type="reset" class="btn btn-secondary me-3" data-bs-dismiss="modal">Cancel</button>
										<button  class="btn btn-primary" onclick="receive_from_party()" id="btn_deduct">Deduct</button>
										<!-- <button class="btn btn-primary" onclick="pay_to_party();" data-bs-toggle="modal" data-bs-target="#kt_modal_view_payment">Pay</button> -->
									</div>
								<!-- </div> -->
								</div>
								<!--end::Modal body-->
						</div>
					<!--end::Modal content-->
					<!-- </form> -->
				</div>
				<!--end::Modal dialog-->
			</div>
		</div>

		<!--begin::Modal - view capture image -->
		<div class="modal fade" id="kt_modal_camera" tabindex="-1" aria-hidden="true">
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

		<!--begin::Modal - view capture image for pledge -->
		<div class="modal fade" id="kt_modal_camera_pledge" tabindex="-1" aria-hidden="true">
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
							<h1 class="mb-3">Capture Pledge Item</h1>
						</div>
						<!--end::Heading-->
						<!--end::Heading-->	
						<div class="row">
							<div class="col-lg-6">
								<div class="row">
									<div id="pl_my_camera" style="max-height: 330px;height: 330px;width: 100%;max-width: 100%;border: 1px solid;">
										
									</div>
								</div>
								<div class="d-flex justify-content-center align-items-center mt-6">
									<div class="btn btn-primary" id="pl_take_jewel_photo1" onclick="pl_take_jewel_photo()">Take Pledge Item Photo</div>
									<button type="submit" class="btn btn-primary" id="pl_capture" onclick="pl_jewel_snapshot()" style="display: none;">Capture</button>
								</div>
							</div>
							<div class="col-lg-6">
								<div class="row">
									<input type="hidden" name="pl_img_count" id="pl_img_count" value="1">
									<div class="col-lg-4 fv-row">
										<a href="javascript:;" onclick="pl_select_image_1();">
											<div class="image-input image-input-outline" data-kt-image-input="true" id="pl_img_1" style="background-image: url(<?php echo base_url();?>assets/images/Jewel.jpg);">
													<div class="image-input-wrapper w-150px h-150px"   style="background-image: url(<?php echo base_url();?>assets/images/Jewel.jpg)" ></div>
											</div>
											<textarea hidden="hidden" name="pl_img_1_data" id="pl_img_1_data"></textarea>
										</a>
									</div>
									<div class="col-lg-4 fv-row">
										<a href="javascript:;" onclick="pl_select_image_2();">
											<div class="image-input image-input-outline" data-kt-image-input="true" id="pl_img_2" style="background-image: url(<?php echo base_url();?>assets/images/Jewel.jpg)">
													<div class="image-input-wrapper w-150px h-150px"  style="background-image: url(<?php echo base_url();?>assets/images/Jewel.jpg)"></div>
											</div>
											<textarea hidden="hidden" name="pl_img_2_data" id="pl_img_2_data"></textarea>
										</a>
									</div>
									<div class="col-lg-4 fv-row">
										<a href="javascript:;" onclick="pl_select_image_3();">
											<div class="image-input image-input-outline" data-kt-image-input="true" id="pl_img_3" style="background-image: url(<?php echo base_url();?>assets/images/Jewel.jpg)">
													<div class="image-input-wrapper w-150px h-150px"  style="background-image: url(<?php echo base_url();?>assets/images/Jewel.jpg)"></div>
											</div>
											<textarea hidden="hidden" name="pl_img_3_data" id="pl_img_3_data"></textarea>
										</a>
									</div>
								</div>
								<div class="row mt-4">
									
									<div class="col-lg-4 fv-row">
										<a href="javascript:;" onclick="pl_select_image_4();">
											<div class="image-input image-input-outline" data-kt-image-input="true" id="pl_img_4" style="background-image: url(<?php echo base_url();?>assets/images/Jewel.jpg)">
													<div class="image-input-wrapper w-150px h-150px"  style="background-image: url(<?php echo base_url();?>assets/images/Jewel.jpg)"></div>
											</div>
											<textarea hidden="hidden" name="pl_img_4_data" id="pl_img_4_data"></textarea>
										</a>
									</div>
									<div class="col-lg-4 fv-row">
										<a href="javascript:;" onclick="pl_select_image_5();">
											<div class="image-input image-input-outline" data-kt-image-input="true" id="pl_img_5" style="background-image: url(<?php echo base_url();?>assets/images/Jewel.jpg)">
													<div class="image-input-wrapper w-150px h-150px"  style="background-image: url(<?php echo base_url();?>assets/images/Jewel.jpg)"></div>
											</div>
											<textarea hidden="hidden" name="pl_img_5_data" id="pl_img_5_data"></textarea>
										</a>
									</div>
									<div class="col-lg-4 fv-row">
										<a href="javascript:;" onclick="pl_select_image_6();">
											<div class="image-input image-input-outline" data-kt-image-input="true" id="pl_img_6" style="background-image: url(<?php echo base_url();?>assets/images/Jewel.jpg)">
													<div class="image-input-wrapper w-150px h-150px"  style="background-image: url(<?php echo base_url();?>assets/images/Jewel.jpg)"></div>
											</div>
											<textarea hidden="hidden" name="pl_img_6_data" id="pl_img_6_data"></textarea>
										</a>
									</div>
									<input type="hidden" name="pl_img_selected_id" value="" id="pl_img_selected_id" value="">
									<div class="d-flex justify-content-center align-items-center mt-13">
										<div type="submit" class="btn btn-primary" onclick="pl_put_capture_jewel_photo()">Submit</div>
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
		<!--end::Modal - view capture image-->

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
		<input type="hidden" id="baseurl" value="<?php echo base_url(); ?>">
		<script src="<?php echo base_url();?>assets/jquery.autocomplete.js"></script>
		<script>
		$("#kt_datatable_redemp_add_multi_jwl_witness").DataTable({
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
			  // "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
			  // "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
			  ">"
			});
			$('#kt_datatable_redemp_add_multi_jwl_witness').wrap('<div class="dataTables_scroll_witness" />');
	</script>

<script>
			// Customer Close Form Missing start
			function cus_cl_frm_missing()
			{
				var cus_cl_form_missing = document.getElementById("cus_cl_form_missing");
				var cus_cl_form_miss_print_but = document.getElementById("cus_cl_form_miss_print_but");
				var cus_cl_upload_doc = document.getElementById("cus_cl_upload_doc");
				if (cus_cl_form_missing.checked) 
				{
					cus_cl_form_miss_print_but.style.display = "block";
					cus_cl_upload_doc.style.display = "block";
					var v=parseFloat($('#lbl_cust_cls_net_pay').html());
					// var t_amt=parseFloat($('#mul_jwl_total_amount').html());
					var fc=parseFloat($('#cust_cls_frm_miss_chg').val());
					var chg_tot=v+fc;
					$('#lbl_cust_cls_net_pay').html(chg_tot);
					$('#span_cust_cls_net_pay').html(chg_tot);

					var bno=$('#redemp_bill_no').val();
					if(bno!='')
					{
							var str=bno.replace("/","_");
							
							var path=baseurl+"redemption/print_1_legal/"+str;
							document.getElementById('cust_cls_btn_print1').setAttribute('href', path);
							var path1=baseurl+"redemption/print_2_legal/"+str;
							document.getElementById('cust_cls_btn_print2').setAttribute('href', path1);
							var path2=baseurl+"redemption/print_3_legal/"+str;
							document.getElementById('cust_cls_btn_print3').setAttribute('href', path2);
						}
						else
						{
							$('#redemp_bill_no_err').html('Enter Redemption Bill No');
								document.getElementById('redemp_bill_no').focus();
								cus_cl_form_missing.checked=false;
								cus_cl_form_miss_print_but.style.display = "none";
								cus_cl_upload_doc.style.display = "none";

						}
				}
				else
				{
					cus_cl_form_miss_print_but.style.display = "none";
					cus_cl_upload_doc.style.display = "none";
					var v=parseFloat($('#lbl_cust_cls_net_pay').html());
					// var t_amt=parseFloat($('#mul_jwl_total_amount').html());
					var fc=parseFloat($('#cust_cls_frm_miss_chg').val());
					var chg_tot=v-fc;
					$('#lbl_cust_cls_net_pay').html(chg_tot);
					$('#span_cust_cls_net_pay').html(chg_tot);
					
				}
			};
			// Customer Close Form Missing end

			// Customer Transfer Form Missing start
			function cus_tr_frm_missing()
			{
				var cus_tr_form_missing = document.getElementById("cus_tr_form_missing");
				var cus_tr_form_miss_print_but = document.getElementById("cus_tr_form_miss_print_but");
				var cus_tr_upload_doc = document.getElementById("cus_tr_upload_doc");
				if (cus_tr_form_missing.checked) 
				{

					
					cus_tr_form_miss_print_but.style.display = "block";
					cus_tr_upload_doc.style.display = "block";
					var v=parseFloat($('#lbl_cust_trans_net_pay').html());
					// var t_amt=parseFloat($('#mul_jwl_total_amount').html());
					var fc=parseFloat($('#cust_trans_frm_miss_chg').val());
					var chg_tot=v+fc;
					$('#lbl_cust_trans_net_pay').html(chg_tot);
					$('#cust_trans_new_ln_ptr_curr_loan_net_pay').html(chg_tot);
					var bno=$('#redemp_bill_no').val();
					if(bno!='')
					{
							var str=bno.replace("/","_");
							
							var path=baseurl+"redemption/print_1_legal/"+str;
							document.getElementById('cust_trans_btn_print1').setAttribute('href', path);
							var path1=baseurl+"redemption/print_2_legal/"+str;
							document.getElementById('cust_trans_btn_print2').setAttribute('href', path1);
							var path2=baseurl+"redemption/print_3_legal/"+str;
							document.getElementById('cust_trans_btn_print3').setAttribute('href', path2);
						}
						else
						{
							$('#redemp_bill_no_err').html('Enter Redemption Bill No');
								document.getElementById('redemp_bill_no').focus();
								cus_tr_form_missing.checked=false;
								cus_tr_form_miss_print_but.style.display = "none";
								cus_tr_upload_doc.style.display = "none";

						}

				}
				else
				{
					cus_tr_form_miss_print_but.style.display = "none";
					cus_tr_upload_doc.style.display = "none";
					var v=parseFloat($('#lbl_cust_trans_net_pay').html());
					// var t_amt=parseFloat($('#mul_jwl_total_amount').html());
					var fc=parseFloat($('#cust_trans_frm_miss_chg').val());
					var chg_tot=v-fc;
					$('#lbl_cust_trans_net_pay').html(chg_tot);
					$('#cust_trans_new_ln_ptr_curr_loan_net_pay').html(chg_tot);
					
				}
			};
			// Customer Transfer Form Missing end

			// Customer Sale Form Missing start
			function cus_sl_frm_missing()
			{
				var cus_sl_form_missing = document.getElementById("cus_sl_form_missing");
				var cus_sl_form_miss_print_but = document.getElementById("cus_sl_form_miss_print_but");
				var cus_sl_upload_doc = document.getElementById("cus_sl_upload_doc");
				
				if (cus_sl_form_missing.checked) 
				{
					cus_sl_form_miss_print_but.style.display = "block";
					cus_sl_upload_doc.style.display = "block";
					var v=parseFloat($('#lbl_cust_sale_net_pay').html());
					// var t_amt=parseFloat($('#mul_jwl_total_amount').html());
					var fc=parseFloat($('#cust_sale_frm_miss_chg').val());
					var chg_tot=v+fc;
					$('#lbl_cust_sale_net_pay').html(chg_tot);
					$('#span_cust_sale_net_pay').html(chg_tot);
					// $('#mul_jwl_new_ln_ptr_total_amount').html(chg_tot);
						var bno=$('#redemp_bill_no').val();
					if(bno!='')
					{
							var str=bno.replace("/","_");
							
							var path=baseurl+"redemption/print_1_legal/"+str;
							document.getElementById('cust_sal_btn_print1').setAttribute('href', path);
							var path1=baseurl+"redemption/print_2_legal/"+str;
							document.getElementById('cust_sal_btn_print2').setAttribute('href', path1);
							var path2=baseurl+"redemption/print_3_legal/"+str;
							document.getElementById('cust_sal_btn_print3').setAttribute('href', path2);
						}
						else
						{
							$('#redemp_bill_no_err').html('Enter Redemption Bill No');
								document.getElementById('redemp_bill_no').focus();
								cus_sl_form_missing.checked=false;
								cus_sl_form_miss_print_but.style.display = "none";
								cus_sl_upload_doc.style.display = "none";

						}
				}
				else
				{
					cus_sl_form_miss_print_but.style.display = "none";
					cus_sl_upload_doc.style.display = "none";
					var v=parseFloat($('#lbl_cust_sale_net_pay').html());
					// var t_amt=parseFloat($('#mul_jwl_total_amount').html());
					var fc=parseFloat($('#cust_sale_frm_miss_chg').val());
					var chg_tot=v-fc;
					$('#lbl_cust_sale_net_pay').html(chg_tot);
					$('#span_cust_sale_net_pay').html(chg_tot);
					// $('#mul_jwl_new_ln_ptr_total_amount').html(chg_tot);
				}
			};
			// Customer Sale Form Missing end

			// Multi Jewel Form Missing start
			function mul_jwl_frm_missing()
			{
				var mul_jwl_form_missing = document.getElementById("mul_jwl_form_missing");
				var mul_jwl_form_miss_print_but = document.getElementById("mul_jwl_form_miss_print_but");
				var mul_jwl_upload_doc = document.getElementById("mul_jwl_upload_doc");
				if (mul_jwl_form_missing.checked) 
				{
					mul_jwl_form_miss_print_but.style.display = "block";
					mul_jwl_upload_doc.style.display = "block";
					var v=parseFloat($('#lbl_mul_jwl_net_pay').html());
					// var t_amt=parseFloat($('#mul_jwl_total_amount').html());
					var fc=parseFloat($('#mul_jwl_frm_miss_chg').val());
					var chg_tot=v+fc;
					$('#lbl_mul_jwl_net_pay').html(chg_tot);
					$('#mul_jwl_new_ln_ptr_curr_loan_net_pay').html(chg_tot);
					$('#mul_jwl_new_ln_ptr_total_amount').html(chg_tot);

					var bno=$('#redemp_bill_no').val();
					if(bno!='')
					{
							var str=bno.replace("/","_");
							
							var path=baseurl+"redemption/print_1_legal/"+str;
							document.getElementById('mul_jwl_btn_print1').setAttribute('href', path);
							var path1=baseurl+"redemption/print_2_legal/"+str;
							document.getElementById('mul_jwl_btn_print2').setAttribute('href', path1);
							var path2=baseurl+"redemption/print_3_legal/"+str;
							document.getElementById('mul_jwl_btn_print3').setAttribute('href', path2);
						}
						else
						{
							$('#redemp_bill_no_err').html('Enter Redemption Bill No');
								document.getElementById('redemp_bill_no').focus();
								mul_jwl_form_missing.checked=false;
								mul_jwl_form_miss_print_but.style.display = "none";
								mul_jwl_upload_doc.style.display = "none";

						}
				}
				else
				{
					mul_jwl_form_miss_print_but.style.display = "none";
					mul_jwl_upload_doc.style.display = "none";
					var v=parseFloat($('#lbl_mul_jwl_net_pay').html());
					// var t_amt=parseFloat($('#mul_jwl_total_amount').html());
					var fc=parseFloat($('#mul_jwl_frm_miss_chg').val());
					var chg_tot=v-fc;
					$('#lbl_mul_jwl_net_pay').html(chg_tot);
					$('#mul_jwl_new_ln_ptr_curr_loan_net_pay').html(chg_tot);
					$('#mul_jwl_new_ln_ptr_total_amount').html(chg_tot);
				}
			};
			// Multi Jewel Form Missing end
		</script>
		<script>
			// customer close - closed by dropdown box start
			function cus_cl_cls_by()
			{
				var cus_close_closed_by = document.getElementById("cus_close_closed_by").value;

				 if (cus_close_closed_by=="others" || cus_close_closed_by=="nominee") 
				  {
				  	document.getElementById('cus_cl_closed_by_name_lab').style.display="block";
						document.getElementById('cus_cl_closed_by_name_tbox').style.display="block";
				  }
				  else
				  {
				  	document.getElementById('cus_cl_closed_by_name_lab').style.display="none";
						document.getElementById('cus_cl_closed_by_name_tbox').style.display="none";
				  }
			}
			// customer close - closed by dropdown box end

			// customer tranfer - closed by dropdown box start
			function cus_tr_cls_by()
			{
				var cus_trans_closed_by = document.getElementById("cus_trans_closed_by").value;

				 if (cus_trans_closed_by=="others" || cus_trans_closed_by=="nominee") 
				  {
				  	document.getElementById('cus_trans_closed_by_name_lab').style.display="block";
						document.getElementById('cus_trans_closed_by_name_tbox').style.display="block";
				  }
				  else
				  {
				  	document.getElementById('cus_trans_closed_by_name_lab').style.display="none";
						document.getElementById('cus_trans_closed_by_name_tbox').style.display="none";
				  }
			}
			// customer tranfer - closed by dropdown box end

			// customer sale - closed by dropdown box start
			function cus_sl_cls_by()
			{
				var cus_sale_closed_by = document.getElementById("cus_sale_closed_by").value;

				 if (cus_sale_closed_by=="others" || cus_sale_closed_by=="nominee") 
				  {
				  	document.getElementById('cus_sale_closed_by_name_lab').style.display="block";
						document.getElementById('cus_sale_closed_by_name_tbox').style.display="block";
				  }
				  else
				  {
				  	document.getElementById('cus_sale_closed_by_name_lab').style.display="none";
						document.getElementById('cus_sale_closed_by_name_tbox').style.display="none";
				  }
			}
			// customer sale - closed by dropdown box end

			// multi jewel - closed by dropdown box start
			function mul_jwl_cls_by()
			{
				var mul_jewel_closed_by = document.getElementById("mul_jewel_closed_by").value;

				 if (mul_jewel_closed_by=="others" || mul_jewel_closed_by=="nominee") 
				  {
				  	document.getElementById('mul_jewel_closed_by_name_lab').style.display="block";
						document.getElementById('mul_jewel_closed_by_name_tbox').style.display="block";
				  }
				  else
				  {
				  	document.getElementById('mul_jewel_closed_by_name_lab').style.display="none";
						document.getElementById('mul_jewel_closed_by_name_tbox').style.display="none";
				  }
			}
			// multi jewel - closed by dropdown box end
			
		</script>
		<script>
			function txt_show_hide()
			{
				if(document.getElementById('charges_loan_amt').checked==true)
				{
					document.getElementById('lbl_charges_loan_pay_amt').style.display="block";
					document.getElementById('charges_loan_pay_amt').style.display="block";
				}
				else
				{
					document.getElementById('lbl_charges_loan_pay_amt').style.display="none";
					document.getElementById('charges_loan_pay_amt').style.display="none";
				}
				if(document.getElementById('charges_pay_separate').checked==true)
				{
					document.getElementById('lbl_charges_pay_separate_amt').style.display="block";
					document.getElementById('charges_pay_separate_amt').style.display="block";
				}
				else
				{
					document.getElementById('lbl_charges_pay_separate_amt').style.display="none";
					document.getElementById('charges_pay_separate_amt').style.display="none";
				}
				if(document.getElementById('on_acc_loan_pay').checked==true)
				{
					document.getElementById('lbl_on_acc_loan_pay_amt').style.display="block";
					document.getElementById('on_acc_loan_pay_amt').style.display="block";
				}
				else
				{
					document.getElementById('lbl_on_acc_loan_pay_amt').style.display="none";
					document.getElementById('on_acc_loan_pay_amt').style.display="none";
				}
				if(document.getElementById('on_acc_pay_separate').checked==true)
				{
					document.getElementById('lbl_on_acc_pay_separate_amt').style.display="block";
					document.getElementById('on_acc_pay_separate_amt').style.display="block";
				}
				else
				{
					document.getElementById('lbl_on_acc_pay_separate_amt').style.display="none";
					document.getElementById('on_acc_pay_separate_amt').style.display="none";
				}
			}
		</script>
		<script>

			var cus_close_tbox = document.getElementById("cus_close_tbox");
			var cus_trans_tbox = document.getElementById("cus_trans_tbox");
			var cus_sale_tbox = document.getElementById("cus_sale_tbox");
			var multi_jwl_tbox = document.getElementById("multi_jwl_tbox");

			$('input:radio[name="redemp_radio"]').change(function() {
		        if ($(this).val()=='redp_cus_c_radio_val') 
		        {
		            cus_close_tbox.style.display="block";
		            cus_trans_tbox.style.display="none";
		            cus_sale_tbox.style.display="none";
		            multi_jwl_tbox.style.display="none";
		            document.getElementById('rene_no').innerHTML="-";
		            
		        } 
		        
		        else if($(this).val()=='redp_cus_t_radio_val')
		        {
		        		cus_close_tbox.style.display="none";
		            cus_trans_tbox.style.display="block";
		            cus_sale_tbox.style.display="none";
		            multi_jwl_tbox.style.display="none";
		            document.getElementById('rene_no').innerHTML="MIP-124/23";
		        }
		        else if($(this).val()=='redp_cmy_sl_radio_val')
		        {
		        		cus_close_tbox.style.display="none";
		            cus_trans_tbox.style.display="none";
		            cus_sale_tbox.style.display="block";
		            multi_jwl_tbox.style.display="none";
		            document.getElementById('rene_no').innerHTML="-";
		        }
		        else if($(this).val()=='redp_mul_jl_radio_val')
		        {
		        		cus_close_tbox.style.display="none";
		            cus_trans_tbox.style.display="none";
		            cus_sale_tbox.style.display="none";
		            multi_jwl_tbox.style.display="block";
		            document.getElementById('rene_no').innerHTML="MIP-124/23";
		        }
		        else 
		        {
		        	cus_close_tbox.style.display="none";
		        	cus_trans_tbox.style.display="none";
		        	cus_sale_tbox.style.display="none";
		        	multi_jwl_tbox.style.display="none";
		        	document.getElementById('rene_no').innerHTML="-";
		        }
		    });
		</script>
		<!-- Paid from Party customer close Start -->
		<script>
			function cash_cus_cl_pdfrm_party_add_radio()
			{
				var cash_cus_close_paid_from_party_add_radio = document.getElementById("cash_cus_close_paid_from_party_add_radio");

				var cus_cl_cash_party_label = document.getElementById("cus_cl_cash_party_label");
				var cus_cl_cash_party_label_tbox = document.getElementById("cus_cl_cash_party_label_tbox");
				var cus_cl_cash_party_detail_tbox = document.getElementById("cus_cl_cash_party_detail_tbox");

				if (cash_cus_close_paid_from_party_add_radio.checked)
				{
				    cus_cl_cash_party_label.style.display = "block";
				    cus_cl_cash_party_label_tbox.style.display = "block";
				    cus_cl_cash_party_detail_tbox.style.display = "block";
			  	} else 
			  	{
			  		cus_cl_cash_party_label.style.display = "none";
			  		cus_cl_cash_party_label_tbox.style.display = "none";
			  		cus_cl_cash_party_detail_tbox.style.display = "none";
			  	}
			}

			function cheque_cus_cl_pdfrm_party_add_radio()
			{
				var cheque_cus_close_paid_from_party_add_radio = document.getElementById("cheque_cus_close_paid_from_party_add_radio");

				var cus_cl_cheque_party_amt = document.getElementById("cus_cl_cheque_party_amt");
				var cus_cl_cheque_party_amt_tbox = document.getElementById("cus_cl_cheque_party_amt_tbox");
				// var cheque_bank = document.getElementById("cheque_bank");
				var cus_cl_cheque_party_bank_tbox = document.getElementById("cus_cl_cheque_party_bank_tbox");
				// var cheque_chq_no = document.getElementById("cheque_chq_no");
				var cus_cl_cheque_party_chq_no_tbox = document.getElementById("cus_cl_cheque_party_chq_no_tbox");
				// var cheque_detail = document.getElementById("cheque_detail");
				var cus_cl_cheque_party_detail_tbox = document.getElementById("cus_cl_cheque_party_detail_tbox");

				if (cheque_cus_close_paid_from_party_add_radio.checked)
				{
				    cus_cl_cheque_party_amt.style.display = "block";
				    cus_cl_cheque_party_amt_tbox.style.display = "block";
				    // cheque_bank.style.display = "block";
				    cus_cl_cheque_party_bank_tbox.style.display = "block";
				    // cheque_chq_no.style.display = "block";
				    cus_cl_cheque_party_chq_no_tbox.style.display = "block";
				    // cheque_detail.style.display = "block";
				    cus_cl_cheque_party_detail_tbox.style.display = "block";
			  	} 
			  	else 
			  	{
			     	cus_cl_cheque_party_amt.style.display = "none";
				    cus_cl_cheque_party_amt_tbox.style.display = "none";
				    // cheque_bank.style.display = "none";
				    cus_cl_cheque_party_bank_tbox.style.display = "none";
				    // cheque_chq_no.style.display = "none";
				    cus_cl_cheque_party_chq_no_tbox.style.display = "none";
				    // cheque_detail.style.display = "none";
				    cus_cl_cheque_party_detail_tbox.style.display = "none";
			  	}
			}

			function rtgs_cus_cl_pdfrm_party_add_radio()
			{
				var rtgs_cus_close_paid_from_party_add_radio = document.getElementById("rtgs_cus_close_paid_from_party_add_radio");

				var cus_cl_rtgs_party_amt = document.getElementById("cus_cl_rtgs_party_amt");
				var cus_cl_rtgs_party_amt_tbox = document.getElementById("cus_cl_rtgs_party_amt_tbox");
				// var rtgs_bank = document.getElementById("rtgs_bank");
				var cus_cl_rtgs_party_bank_tbox = document.getElementById("cus_cl_rtgs_party_bank_tbox");
				// var rtgs_no = document.getElementById("rtgs_no");
				var cus_cl_rtgs_party_no_tbox = document.getElementById("cus_cl_rtgs_party_no_tbox");
				// var rtgs_detail = document.getElementById("rtgs_detail");
				var cus_cl_rtgs_party_detail_tbox = document.getElementById("cus_cl_rtgs_party_detail_tbox");

				if (rtgs_cus_close_paid_from_party_add_radio.checked == true)
				{
				    cus_cl_rtgs_party_amt.style.display = "block";
				    cus_cl_rtgs_party_amt_tbox.style.display = "block";
				    // rtgs_bank.style.display = "block";
				    cus_cl_rtgs_party_bank_tbox.style.display = "block";
				    // rtgs_no.style.display = "block";
				    cus_cl_rtgs_party_no_tbox.style.display = "block";
				    // rtgs_detail.style.display = "block";
				    cus_cl_rtgs_party_detail_tbox.style.display = "block";
			  	} else 
			  	{
			     	cus_cl_rtgs_party_amt.style.display = "none";
				    cus_cl_rtgs_party_amt_tbox.style.display = "none";
				    // rtgs_bank.style.display = "none";
				    cus_cl_rtgs_party_bank_tbox.style.display = "none";
				    // rtgs_no.style.display = "none";
				    cus_cl_rtgs_party_no_tbox.style.display = "none";
				    // rtgs_detail.style.display = "none";
				    cus_cl_rtgs_party_detail_tbox.style.display = "none";
			  	}
			}

			function upi_cus_cl_pdfrm_party_add_radio()
			{
				var upi_cus_close_paid_from_party_add_radio = document.getElementById("upi_cus_close_paid_from_party_add_radio");

				var cus_cl_upi_party_amt = document.getElementById("cus_cl_upi_party_amt");
				var cus_cl_upi_party_amt_tbox = document.getElementById("cus_cl_upi_party_amt_tbox");
				// var upi_trans_no = document.getElementById("upi_trans_no");
				var cus_cl_upi_party_trans_no_tbox = document.getElementById("cus_cl_upi_party_trans_no_tbox");
				var cus_cl_upi_party_bank_tbox = document.getElementById("cus_cl_upi_party_bank_tbox");
				var cus_cl_upi_party_detail_tbox = document.getElementById("cus_cl_upi_party_detail_tbox");

				if (upi_cus_close_paid_from_party_add_radio.checked == true)
				{
				    cus_cl_upi_party_amt.style.display = "block";
				    cus_cl_upi_party_amt_tbox.style.display = "block";
				    // upi_trans_no.style.display = "block";
				    cus_cl_upi_party_trans_no_tbox.style.display = "block";
				    cus_cl_upi_party_bank_tbox.style.display = "block";
				    cus_cl_upi_party_detail_tbox.style.display = "block";
			  	} else 
			  	{
			     	cus_cl_upi_party_amt.style.display = "none";
				    cus_cl_upi_party_amt_tbox.style.display = "none";
				    // upi_trans_no.style.display = "none";
				    cus_cl_upi_party_trans_no_tbox.style.display = "none";
				    cus_cl_upi_party_bank_tbox.style.display = "none";
				    cus_cl_upi_party_detail_tbox.style.display = "none";
			  	}
			}
			function mcard_cus_cl_pdfrm_party_add_radio()
			{
				var mcard_cus_close_paid_from_party_add_radio = document.getElementById("mcard_cus_close_paid_from_party_add_radio");
				var cus_cl_card_no_paid_from_pty = document.getElementById("cus_cl_card_no_paid_from_pty");
				var cus_cl_card_no_paid_from_pty_tbox = document.getElementById("cus_cl_card_no_paid_from_pty_tbox");
				var cus_cl_points_paid_from_pty = document.getElementById("cus_cl_points_paid_from_pty");
				// var cus_cl_redeem_paid_from_cmy = document.getElementById("cus_cl_redeem_paid_from_cmy");
				var cus_cl_redeem_paid_from_pty_tbox = document.getElementById("cus_cl_redeem_paid_from_pty_tbox");
				var cus_cl_mcard_detail_paid_from_pty_tbox = document.getElementById("cus_cl_mcard_detail_paid_from_pty_tbox");

				if (mcard_cus_close_paid_from_party_add_radio.checked == true)
				{
				    cus_cl_card_no_paid_from_pty.style.display = "block";
				    cus_cl_card_no_paid_from_pty_tbox.style.display = "block";
				    cus_cl_points_paid_from_pty.style.display = "block";
				    // cus_cl_redeem_paid_from_cmy.style.display = "block";
				    cus_cl_redeem_paid_from_pty_tbox.style.display = "block";
				    cus_cl_mcard_detail_paid_from_pty_tbox.style.display = "block";
			  	} else 
			  	{
			     	cus_cl_card_no_paid_from_pty.style.display = "none";
				    cus_cl_card_no_paid_from_pty_tbox.style.display = "none";
				    cus_cl_points_paid_from_pty.style.display = "none";
				    // cus_cl_redeem_paid_from_cmy.style.display = "none";
				    cus_cl_redeem_paid_from_pty_tbox.style.display = "none";
				    cus_cl_mcard_detail_paid_from_pty_tbox.style.display = "none";
			  	}
			}

			function chit_cus_cl_pdfrm_party_add_radio()
			{
				var chit_cus_close_paid_from_party_add_radio = document.getElementById("chit_cus_close_paid_from_party_add_radio");
				var cus_cl_sch_paid_from_pty = document.getElementById("cus_cl_sch_paid_from_pty");
				var cus_cl_sch_paid_from_pty_tbox = document.getElementById("cus_cl_sch_paid_from_pty_tbox");
				var cus_cl_avai_bal_paid_from_pty = document.getElementById("cus_cl_avai_bal_paid_from_pty");
				var cus_cl_redeem_amt_paid_from_pty_tbox = document.getElementById("cus_cl_redeem_amt_paid_from_pty_tbox");
				var cus_cl_redeem_detail_paid_from_pty_tbox = document.getElementById("cus_cl_redeem_detail_paid_from_pty_tbox");

				if (chit_cus_close_paid_from_party_add_radio.checked == true)
				{
				    cus_cl_sch_paid_from_pty.style.display = "block";
				    cus_cl_sch_paid_from_pty_tbox.style.display = "block";
				    cus_cl_avai_bal_paid_from_pty.style.display = "block";
				    cus_cl_redeem_amt_paid_from_pty_tbox.style.display = "block";
				    cus_cl_redeem_detail_paid_from_pty_tbox.style.display = "block";
			  	} else 
			  	{
			     	cus_cl_sch_paid_from_pty.style.display = "none";
				    cus_cl_sch_paid_from_pty_tbox.style.display = "none";
				    cus_cl_avai_bal_paid_from_pty.style.display = "none";
				    cus_cl_redeem_amt_paid_from_pty_tbox.style.display = "none";
				    cus_cl_redeem_detail_paid_from_pty_tbox.style.display = "none";
			  	}
			}
		</script>
		
		<!-- Payment from Company customer sale Start -->
			<script>
				var cash_cus_sale_paid_from_company_add_radio = document.getElementById("cash_cus_sale_paid_from_company_add_radio");
				var cus_sl_cash_paid_from_cmy_label = document.getElementById("cus_sl_cash_paid_from_cmy_label");
				var cus_sl_cash_paid_from_cmy_tbox = document.getElementById("cus_sl_cash_paid_from_cmy_tbox");
				var cus_sl_cash_paid_from_detail_cmy_tbox = document.getElementById("cus_sl_cash_paid_from_detail_cmy_tbox");

				function cash_cus_sl_pdfrm_cmy_add_radio()
				{
					if (cash_cus_sale_paid_from_company_add_radio.checked)
					{
					    cus_sl_cash_paid_from_cmy_label.style.display = "block";
					    cus_sl_cash_paid_from_cmy_tbox.style.display = "block";
					    cus_sl_cash_paid_from_detail_cmy_tbox.style.display = "block";
				  	} else 
				  	{
				  		cus_sl_cash_paid_from_cmy_label.style.display = "none";
				  		cus_sl_cash_paid_from_cmy_tbox.style.display = "none";
				  		cus_sl_cash_paid_from_detail_cmy_tbox.style.display = "none";
				  	}
				}

				var cheque_cus_sale_paid_from_company_add_radio = document.getElementById("cheque_cus_sale_paid_from_company_add_radio");
				var cus_sl_cheque_paid_from_cmy = document.getElementById("cus_sl_cheque_paid_from_cmy");
				var cus_sl_cheque_amt_paid_from_cmy_tbox = document.getElementById("cus_sl_cheque_amt_paid_from_cmy_tbox");
				var cus_sl_cheque_no_paid_from_cmy_tbox = document.getElementById("cus_sl_cheque_no_paid_from_cmy_tbox");
				var cus_sl_cheque_com_bank_paid_from_cmy_tbox = document.getElementById("cus_sl_cheque_com_bank_paid_from_cmy_tbox");
				var cus_sl_cheque_par_bank_paid_from_cmy_tbox = document.getElementById("cus_sl_cheque_par_bank_paid_from_cmy_tbox");
				var cus_sl_cheque_detail_paid_from_cmy_tbox = document.getElementById("cus_sl_cheque_detail_paid_from_cmy_tbox");

				function cheque_cus_sl_pdfrm_cmy_add_radio()
				{
					if (cheque_cus_sale_paid_from_company_add_radio.checked)
					{
					    cus_sl_cheque_paid_from_cmy.style.display = "block";
					    cus_sl_cheque_amt_paid_from_cmy_tbox.style.display = "block";
					    cus_sl_cheque_no_paid_from_cmy_tbox.style.display = "block";
					    cus_sl_cheque_com_bank_paid_from_cmy_tbox.style.display = "block";
					    cus_sl_cheque_par_bank_paid_from_cmy_tbox.style.display = "block";
					    cus_sl_cheque_detail_paid_from_cmy_tbox.style.display = "block";
				  	} else 
				  	{
				     	cus_sl_cheque_paid_from_cmy.style.display = "none";
					    cus_sl_cheque_amt_paid_from_cmy_tbox.style.display = "none";
					    cus_sl_cheque_no_paid_from_cmy_tbox.style.display = "none";
					    cus_sl_cheque_com_bank_paid_from_cmy_tbox.style.display = "none";
					    cus_sl_cheque_par_bank_paid_from_cmy_tbox.style.display = "none";
					    cus_sl_cheque_detail_paid_from_cmy_tbox.style.display = "none";
				  	}
				}

				var rtgs_cus_sale_paid_from_company_add_radio = document.getElementById("rtgs_cus_sale_paid_from_company_add_radio");
				var cus_sl_rtgs_paid_from_cmy = document.getElementById("cus_sl_rtgs_paid_from_cmy");
				var cus_sl_rtgs_amt_paid_from_cmy_tbox = document.getElementById("cus_sl_rtgs_amt_paid_from_cmy_tbox");
				var cus_sl_rtgs_ref_paid_from_cmy_tbox = document.getElementById("cus_sl_rtgs_ref_paid_from_cmy_tbox");
				var cus_sl_rtgs_com_bank_paid_from_cmy_tbox = document.getElementById("cus_sl_rtgs_com_bank_paid_from_cmy_tbox");
				var cus_sl_rtgs_par_bank_paid_from_cmy_tbox = document.getElementById("cus_sl_rtgs_par_bank_paid_from_cmy_tbox");
				var cus_sl_rtgs_detail_paid_from_cmy_tbox = document.getElementById("cus_sl_rtgs_detail_paid_from_cmy_tbox");

				function rtgs_cus_sl_pdfrm_cmy_add_radio()
				{
					if (rtgs_cus_sale_paid_from_company_add_radio.checked == true)
					{
					    cus_sl_rtgs_paid_from_cmy.style.display = "block";
					    cus_sl_rtgs_amt_paid_from_cmy_tbox.style.display = "block";
					    cus_sl_rtgs_ref_paid_from_cmy_tbox.style.display = "block";
					    cus_sl_rtgs_com_bank_paid_from_cmy_tbox.style.display = "block";
					    cus_sl_rtgs_par_bank_paid_from_cmy_tbox.style.display = "block";
					    cus_sl_rtgs_detail_paid_from_cmy_tbox.style.display = "block";
				  	} else 
				  	{
				     	cus_sl_rtgs_paid_from_cmy.style.display = "none";
					    cus_sl_rtgs_amt_paid_from_cmy_tbox.style.display = "none";
					   	cus_sl_rtgs_ref_paid_from_cmy_tbox.style.display = "none";
					    cus_sl_rtgs_com_bank_paid_from_cmy_tbox.style.display = "none";
					    cus_sl_rtgs_par_bank_paid_from_cmy_tbox.style.display = "none";
					    cus_sl_rtgs_detail_paid_from_cmy_tbox.style.display = "none";
				  	}
				}
				var upi_cus_sale_paid_from_company_add_radio = document.getElementById("upi_cus_sale_paid_from_company_add_radio");
				var cus_sl_upi_paid_from_cmy = document.getElementById("cus_sl_upi_paid_from_cmy");
				var cus_sl_upi_amt_paid_from_cmy_tbox = document.getElementById("cus_sl_upi_amt_paid_from_cmy_tbox");
				var cus_sl_upi_ref_paid_from_cmy_tbox = document.getElementById("cus_sl_upi_ref_paid_from_cmy_tbox");
				var cus_sl_upi_com_bank_paid_from_cmy_tbox = document.getElementById("cus_sl_upi_com_bank_paid_from_cmy_tbox");
				var cus_sl_upi_par_bank_paid_from_cmy_tbox = document.getElementById("cus_sl_upi_par_bank_paid_from_cmy_tbox");
				var cus_sl_upi_detail_paid_from_cmy_tbox = document.getElementById("cus_sl_upi_detail_paid_from_cmy_tbox");

				function upi_cus_sl_pdfrm_cmy_add_radio()
				{
					if (upi_cus_sale_paid_from_company_add_radio.checked == true)
					{
					    cus_sl_upi_paid_from_cmy.style.display = "block";
					    cus_sl_upi_amt_paid_from_cmy_tbox.style.display = "block";
					    cus_sl_upi_ref_paid_from_cmy_tbox.style.display = "block";
					    cus_sl_upi_com_bank_paid_from_cmy_tbox.style.display = "block";
					    cus_sl_upi_par_bank_paid_from_cmy_tbox.style.display = "block";
					    cus_sl_upi_detail_paid_from_cmy_tbox.style.display = "block";
				  	} else 
				  	{
				     	cus_sl_upi_paid_from_cmy.style.display = "none";
					    cus_sl_upi_amt_paid_from_cmy_tbox.style.display = "none";
					    cus_sl_upi_ref_paid_from_cmy_tbox.style.display = "none";
					    cus_sl_upi_com_bank_paid_from_cmy_tbox.style.display = "none";
					    cus_sl_upi_par_bank_paid_from_cmy_tbox.style.display = "none";
					    cus_sl_upi_detail_paid_from_cmy_tbox.style.display = "none";
				  	}
				}
			</script>
		<!-- Payment from Company customer sale End -->
		
		<script>
		$("#multi_jwl_add_loan").DataTable({
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
		$('#multi_jwl_add_loan').wrap('<div class="dataTables_scroll" />');
</script>
<script>
		      $("#multi_jwl_add_loan").kendoTooltip({
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
		$("#view_pledge_item_redemp_loan").DataTable({
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
		$('#view_pledge_item_redemp_loan').wrap('<div class="dataTables_scroll" />');
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
		<!-- Received From Party in Total Charges Start -->
		<script>
			function cash_ln_recev_add_radio()
			{
				var cash_loan_received_add_radio = document.getElementById("cash_loan_received_add_radio");

				var cash_label = document.getElementById("cash_label");
				var cash_label_tbox = document.getElementById("cash_label_tbox");
				var cash_detail_tbox = document.getElementById("cash_detail_tbox");

				if (cash_loan_received_add_radio.checked)
				{
				    cash_label.style.display = "block";
				    cash_label_tbox.style.display = "block";
				    cash_detail_tbox.style.display = "block";
			  	} else 
			  	{
			  		cash_label.style.display = "none";
			  		cash_label_tbox.style.display = "none";
			  		cash_detail_tbox.style.display = "none";
			  	}
			}

			function cheque_ln_recev_add_radio()
			{
				var cheque_loan_received_add_radio = document.getElementById("cheque_loan_received_add_radio");

				var cheque_amt = document.getElementById("cheque_amt");
				var cheque_amt_tbox = document.getElementById("cheque_amt_tbox");
				// var cheque_bank = document.getElementById("cheque_bank");
				var cheque_bank_tbox = document.getElementById("cheque_bank_tbox");
				// var cheque_chq_no = document.getElementById("cheque_chq_no");
				var cheque_chq_no_tbox = document.getElementById("cheque_chq_no_tbox");
				// var cheque_detail = document.getElementById("cheque_detail");
				var cheque_detail_tbox = document.getElementById("cheque_detail_tbox");

				if (cheque_loan_received_add_radio.checked)
				{
				    cheque_amt.style.display = "block";
				    cheque_amt_tbox.style.display = "block";
				    // cheque_bank.style.display = "block";
				    cheque_bank_tbox.style.display = "block";
				    // cheque_chq_no.style.display = "block";
				    cheque_chq_no_tbox.style.display = "block";
				    // cheque_detail.style.display = "block";
				    cheque_detail_tbox.style.display = "block";
			  	} else 
			  	{
			     	cheque_amt.style.display = "none";
				    cheque_amt_tbox.style.display = "none";
				    // cheque_bank.style.display = "none";
				    cheque_bank_tbox.style.display = "none";
				    // cheque_chq_no.style.display = "none";
				    cheque_chq_no_tbox.style.display = "none";
				    // cheque_detail.style.display = "none";
				    cheque_detail_tbox.style.display = "none";
			  	}
			}

			function rtgs_ln_recev_add_radio()
			{
				var rtgs_loan_received_add_radio = document.getElementById("rtgs_loan_received_add_radio");

				var rtgs_amt = document.getElementById("rtgs_amt");
				var rtgs_amt_tbox = document.getElementById("rtgs_amt_tbox");
				// var rtgs_bank = document.getElementById("rtgs_bank");
				var rtgs_bank_tbox = document.getElementById("rtgs_bank_tbox");
				// var rtgs_no = document.getElementById("rtgs_no");
				var rtgs_no_tbox = document.getElementById("rtgs_no_tbox");
				// var rtgs_detail = document.getElementById("rtgs_detail");
				var rtgs_detail_tbox = document.getElementById("rtgs_detail_tbox");

				if (rtgs_loan_received_add_radio.checked == true)
				{
				    rtgs_amt.style.display = "block";
				    rtgs_amt_tbox.style.display = "block";
				    // rtgs_bank.style.display = "block";
				    rtgs_bank_tbox.style.display = "block";
				    // rtgs_no.style.display = "block";
				    rtgs_no_tbox.style.display = "block";
				    // rtgs_detail.style.display = "block";
				    rtgs_detail_tbox.style.display = "block";
			  	} else 
			  	{
			     	rtgs_amt.style.display = "none";
				    rtgs_amt_tbox.style.display = "none";
				    // rtgs_bank.style.display = "none";
				    rtgs_bank_tbox.style.display = "none";
				    // rtgs_no.style.display = "none";
				    rtgs_no_tbox.style.display = "none";
				    // rtgs_detail.style.display = "none";
				    rtgs_detail_tbox.style.display = "none";
			  	}
			}

			function upi_ln_recev_add_radio()
			{
				var upi_loan_received_add_radio = document.getElementById("upi_loan_received_add_radio");

				var upi_amt = document.getElementById("upi_amt");
				var upi_amt_tbox = document.getElementById("upi_amt_tbox");
				// var upi_trans_no = document.getElementById("upi_trans_no");
				var upi_trans_no_tbox = document.getElementById("upi_trans_no_tbox");
				var upi_bank_tbox = document.getElementById("upi_bank_tbox");
				var upi_detail_tbox = document.getElementById("upi_detail_tbox");

				if (upi_loan_received_add_radio.checked == true)
				{
				    upi_amt.style.display = "block";
				    upi_amt_tbox.style.display = "block";
				    // upi_trans_no.style.display = "block";
				    upi_trans_no_tbox.style.display = "block";
				    upi_bank_tbox.style.display = "block";
				    upi_detail_tbox.style.display = "block";
			  	} else 
			  	{
			     	upi_amt.style.display = "none";
				    upi_amt_tbox.style.display = "none";
				    // upi_trans_no.style.display = "none";
				    upi_trans_no_tbox.style.display = "none";
				    upi_bank_tbox.style.display = "none";
				    upi_detail_tbox.style.display = "none";
			  	}
			}
			function mem_card_ln_recev_add_radio()
			{
				var mem_card_loan_received_add_radio = document.getElementById("mem_card_loan_received_add_radio");
				var mem_card_no = document.getElementById("lbl_mem_card_no_pop");
				var mem_card_no_tbox = document.getElementById("mem_card_no_tbox");
				// var mem_card_trans_no = document.getElementById("mem_card_trans_no");
				var mem_card_avail_points_tbox = document.getElementById("mem_card_avail_points_tbox");
				var mem_card_redeem_tbox = document.getElementById("mem_card_redeem_tbox");
				var mem_card_details_tbox = document.getElementById("mem_card_details_tbox");

				if (mem_card_loan_received_add_radio.checked == true)
				{
				    mem_card_no.style.display = "block";
				    mem_card_no_tbox.style.display = "block";
				    mem_card_avail_points_tbox.style.display = "block";
				    mem_card_redeem_tbox.style.display = "block";
				    mem_card_details_tbox.style.display = "block";
			  	} else 
			  	{
			     	mem_card_no.style.display = "none";
				    mem_card_no_tbox.style.display = "none";
				    mem_card_avail_points_tbox.style.display = "none";
				    mem_card_redeem_tbox.style.display = "none";
				    mem_card_details_tbox.style.display = "none";
			  	}
			}
		</script>
		<!-- Received From Party in Total Charges End -->
		<!-- Payment Now From Party Start -->
		<script>
			function cash_ln_paynow_add_radio()
			{
				var cash_loan_paynow_add_radio = document.getElementById("cash_loan_paynow_add_radio");

				var cash_label_ln_pay = document.getElementById("cash_label_ln_pay");
				var cash_label_ln_pay_tbox = document.getElementById("cash_label_ln_pay_tbox");
				var cash_detail_ln_pay_tbox = document.getElementById("cash_detail_ln_pay_tbox");

				if (cash_loan_paynow_add_radio.checked)
				{
				    cash_label_ln_pay.style.display = "block";
				    cash_label_ln_pay_tbox.style.display = "block";
				    cash_detail_ln_pay_tbox.style.display = "block";
			  	} else 
			  	{
			  		cash_label_ln_pay.style.display = "none";
			  		cash_label_ln_pay_tbox.style.display = "none";
			  		cash_detail_ln_pay_tbox.style.display = "none";
			  	}
			};

			function cheque_ln_paynow_add_radio()
			{
				var cheque_loan_paynow_add_radio = document.getElementById("cheque_loan_paynow_add_radio");

				var cheque_label_ln_pay = document.getElementById("cheque_label_ln_pay");
				var cheque_amt_ln_pay_tbox = document.getElementById("cheque_amt_ln_pay_tbox");
				var cheque_no_ln_pay_tbox = document.getElementById("cheque_no_ln_pay_tbox");
				var cheque_com_bank_ln_pay_tbox = document.getElementById("cheque_com_bank_ln_pay_tbox");
				var cheque_par_bank_ln_pay_tbox = document.getElementById("cheque_par_bank_ln_pay_tbox");
				var cheque_detail_ln_pay_tbox = document.getElementById("cheque_detail_ln_pay_tbox");

				if (cheque_loan_paynow_add_radio.checked)
				{
				    cheque_label_ln_pay.style.display = "block";
				    cheque_amt_ln_pay_tbox.style.display = "block";
				    cheque_no_ln_pay_tbox.style.display = "block";
				    cheque_com_bank_ln_pay_tbox.style.display = "block";
				    cheque_par_bank_ln_pay_tbox.style.display = "block";
				    cheque_detail_ln_pay_tbox.style.display = "block";
			  	} else 
			  	{
			     	cheque_label_ln_pay.style.display = "none";
				    cheque_amt_ln_pay_tbox.style.display = "none";
				    cheque_no_ln_pay_tbox.style.display = "none";
				    cheque_com_bank_ln_pay_tbox.style.display = "none";
				    cheque_par_bank_ln_pay_tbox.style.display = "none";
				    cheque_detail_ln_pay_tbox.style.display = "none";
			  	}
			}

			function rtgs_ln_paynow_add_radio()
			{
				var rtgs_loan_paynow_add_radio = document.getElementById("rtgs_loan_paynow_add_radio");

				var rtgs_label_ln_pay = document.getElementById("rtgs_label_ln_pay");
				var rtgs_amt_ln_pay_tbox = document.getElementById("rtgs_amt_ln_pay_tbox");
				var rtgs_ref_ln_pay_tbox = document.getElementById("rtgs_ref_ln_pay_tbox");
				var rtgs_com_bank_ln_pay_tbox = document.getElementById("rtgs_com_bank_ln_pay_tbox");
				var rtgs_par_bank_ln_pay_tbox = document.getElementById("rtgs_par_bank_ln_pay_tbox");
				var rtgs_detail_ln_pay_tbox = document.getElementById("rtgs_detail_ln_pay_tbox");

				if (rtgs_loan_paynow_add_radio.checked == true)
				{
				    rtgs_label_ln_pay.style.display = "block";
				    rtgs_amt_ln_pay_tbox.style.display = "block";
				    rtgs_ref_ln_pay_tbox.style.display = "block";
				    rtgs_com_bank_ln_pay_tbox.style.display = "block";
				    rtgs_par_bank_ln_pay_tbox.style.display = "block";
				    rtgs_detail_ln_pay_tbox.style.display = "block";
			  	} else 
			  	{
			     	rtgs_label_ln_pay.style.display = "none";
				    rtgs_amt_ln_pay_tbox.style.display = "none";
				   	rtgs_ref_ln_pay_tbox.style.display = "none";
				    rtgs_com_bank_ln_pay_tbox.style.display = "none";
				    rtgs_par_bank_ln_pay_tbox.style.display = "none";
				    rtgs_detail_ln_pay_tbox.style.display = "none";
			  	}
			}

			function upi_ln_paynow_add_radio()
			{
				var upi_loan_paynow_add_radio = document.getElementById("upi_loan_paynow_add_radio");

				var upi_label_ln_pay = document.getElementById("upi_label_ln_pay");
				var upi_amt_ln_pay_tbox = document.getElementById("upi_amt_ln_pay_tbox");
				var upi_ref_ln_pay_tbox = document.getElementById("upi_ref_ln_pay_tbox");
				var upi_com_bank_ln_pay_tbox = document.getElementById("upi_com_bank_ln_pay_tbox");
				var upi_par_bank_ln_pay_tbox = document.getElementById("upi_par_bank_ln_pay_tbox");
				var upi_detail_ln_pay_tbox = document.getElementById("upi_detail_ln_pay_tbox");

				if (upi_loan_paynow_add_radio.checked == true)
				{
				    upi_label_ln_pay.style.display = "block";
				    upi_amt_ln_pay_tbox.style.display = "block";
				    upi_ref_ln_pay_tbox.style.display = "block";
				    upi_com_bank_ln_pay_tbox.style.display = "block";
				    upi_par_bank_ln_pay_tbox.style.display = "block";
				    upi_detail_ln_pay_tbox.style.display = "block";
			  	} else 
			  	{
			     	upi_label_ln_pay.style.display = "none";
				    upi_amt_ln_pay_tbox.style.display = "none";
				    upi_ref_ln_pay_tbox.style.display = "none";
				    upi_com_bank_ln_pay_tbox.style.display = "none";
				    upi_par_bank_ln_pay_tbox.style.display = "none";
				    upi_detail_ln_pay_tbox.style.display = "none";
			  	}
			}
		</script>
		<!-- Payment Now From Party End -->
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
	      });
	</script>

	<script>
		$("#kt_datatable_dom_positioning").DataTable({
			// "ordering": false,
			"responsive": true,
			"aaSorting":[],
			 "language": {
			  "lengthMenu": "Show _MENU_",
			 },
			 "dom":
			  "<'row'" +
			  "<'col-sm-6 d-flex align-items-center justify-conten-start'l>" +
			  "<'col-sm-6 d-flex align-items-center justify-content-end'f>" +
			  ">" +

			  "<'table-responsive'tr>" +

			  "<'row'" +
			  "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
			  "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
			  ">"
			});
	</script>
	<script>
			$("#kt_datatable_dom_positioning_edit_loan").DataTable({
				// "ordering": false,
				"aaSorting":[],
				 "language": {
				  "lengthMenu": "Show _MENU_",
				 },
				 "dom":
				  "<'row'" +
				  ">" +

				  "<'table-responsive'tr>" +

				  "<'row'" +
				  ">"
				 
				});
	</script>
	<script>
			$("#kt_datatable_dom_positioning_view_loan").DataTable({
				// "ordering": false,
				"aaSorting":[],
				 "language": {
				  "lengthMenu": "Show _MENU_",
				 },
				 "dom":
				  "<'row'" +
				  ">" +

				  "<'table-responsive'tr>" +

				  "<'row'" +
				  ">"
				 
				});
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
	<script>
		// Paid Cash Payment Mode
	  jQuery($ => {
	  $(document).on('change', '.sare-fields', e => {
	    let $select = $(e.target);
	    let id = $select.data("id");
	    let value = $select.val();

	    let $container = $select.closest('.repeater');
	    if (value == "CASH") 
	    {
	    	console.log("if");
	    	$container.find('.row .data-fields[data-parent=' + id + ']').hide();
	    	$container.find('.data-fields[data-parent=' + id + '][data-sub=' + value + ']').hide();
	    }
	    else
	    {
	    	console.log("else");
	    	$container.find('.row .data-fields[data-parent=' + id + ']').show();
	    	$container.find('.data-fields[data-parent=' + id + '][data-sub=' + value + ']').show();
	    }
	  });

		  // repeater functionality...
		  $('.btn-add').on('click', e => {
		     let $clone = $('.repeater').first().clone().hide();
		     if ($('.btn-add').val() == "1") 
		     {
		     	$('.del').hide();
		     }
		     else
		     {
		     	$('.del').show();
		     }
		    $clone.insertBefore('.repeater:first').slideDown();
		  });

		  $(document).on('click', '.repeater .btn-delete', e => 
		  {
		  	$(e.target).closest('.repeater').slideUp(400, function() { $(this).remove() });
		  });
		});
	</script>
	<script>
		// Document Charge Payment Mode
	  jQuery($ => {
	  $(document).on('change', '.sare-fields_dc', e => {
	    let $select = $(e.target);
	    let id = $select.data("id");
	    let value = $select.val();

	    let $container = $select.closest('.repeater_dc');
	    if (value == "CASH") 
	    {
	    	console.log("if");
	    	$container.find('.row .data-fields_dc[data-parent=' + id + ']').hide();
	    	$container.find('.data-fields_dc[data-parent=' + id + '][data-sub=' + value + ']').hide();
	    }
	    else
	    {
	    	console.log("else");
	    	$container.find('.row .data-fields_dc[data-parent=' + id + ']').show();
	    	$container.find('.data-fields_dc[data-parent=' + id + '][data-sub=' + value + ']').show();
	    }
	  	});

	  // repeater functionality...
	  $('.btn-add_dc').on('click', e => {
		     let $clone = $('.repeater_dc').first().clone().hide();
		     if ($('.btn-add_dc').val() == "1") 
		     {
		     	$('.del_dc').hide();
		     }
		     else
		     {
		     	$('.del_dc').show();
		     }
		    $clone.insertBefore('.repeater_dc:first').slideDown();
		  });

		  $(document).on('click', '.repeater_dc .btn-delete_dc', e => 
		  {
		  	$(e.target).closest('.repeater_dc').slideUp(400, function() { $(this).remove() });
		  });
		});
	</script>
	<script>
		  jQuery($ => {
		  $(document).on('change', '.sare-fields', e => {
		    let $select = $(e.target);
		    let id = $select.data("id");
		    let value = $select.val();

		    let $container = $select.closest('.repeater');
		    if (value == "CASH") 
		    {
		    	console.log("if");
		    	$container.find('.row .data-fields[data-parent=' + id + ']').hide();
		    	$container.find('.data-fields[data-parent=' + id + '][data-sub=' + value + ']').hide();
		    }
		    else
		    {
		    	console.log("else");
		    	$container.find('.row .data-fields[data-parent=' + id + ']').show();
		    	$container.find('.data-fields[data-parent=' + id + '][data-sub=' + value + ']').show();
		    }
		  });

		  // repeater functionality...
		  $('.btn-add').on('click', e => {
		     let $clone = $('.repeater').first().clone().hide();
		     if ($('.btn-add').val() == "1") 
		     {
		     	$('.del').hide();
		     }
		     else
		     {
		     	$('.del').show();
		     }
		    //$clone.find(':text').val('');
		    //$clone.find('select option:first').prop('selected', true);
		    // $clone.insertAfter('.repeater:first').slideDown();
		    $clone.insertBefore('.repeater:first').slideDown();
		  });

		  $(document).on('click', '.repeater .btn-delete', e => 
		  {
		  	$(e.target).closest('.repeater').slideUp(400, function() { $(this).remove() });
		  });
		});
	</script>
	<script >
		var baseurl="<?php echo base_url();?>";
		 $("#redemp_bill_no").autocomplete({ 
	                valueKey:'title',
	                source:[{
	                url:baseurl+'redemption/loanList?query=%QUERY%',
	                type:'remote',
	                ajax:{
	                  dataType : 'json',
	                }
	            }]}).on('selected.xdsoft',function(e,suggestion,ui){ 
	            	if(suggestion == false)
	            	{
	            		alert ("Bill no already closed");
	            	}
	            	else
	            	{
	            	 $("#r_firstname").html(suggestion.firstname);
	            	
	            	
	                $('#r_pid').val(suggestion.pid);
	                // $("#r_address").html(suggestion.address);
	                $("#r_phone_no").html(suggestion.phone);
	                
	                if(suggestion.rating==1){
	                	r='<i class="fa-solid fa-star" style="color:red;"></i>&nbsp;Bad';	
	                }
	                else if(suggestion.rating==2){
	                	r='<i class="fa-solid fa-star" style="color:#ffc700;"></i>&nbsp;Average';	
	                }
	                else if(suggestion.rating==3){
	                	r='<i class="fa-solid fa-star" style="color:#50cd89;"></i>&nbsp;Good';	
	                }
	                else{
	                	r='<i class="fa-solid fa-star" style="color:#d2d4dc;"></i>&nbsp; Nil';	
	                }
	                $("#r_rating").html(r);

	                            ic='<i class="fas fa-info-circle fs-6" title="'+suggestion.address+'"></i>';
	                $("#icon_txt").html(ic);
	                $nic=suggestion.nom_det+'&nbsp; <i class="fas fa-info-circle fs-6" title="'+suggestion.inom_det+'"></i>';
	    //             // $("#nominee_icon_txt").html($nic);
	                $('#r_nominee').html($nic);
	                
					$("#r_company_name").html(suggestion.company);
					$("#r_interest_type").html(suggestion.interest);
					$("#r_pop_interest").html(suggestion.interest);
					$("#r_loan_date").html(suggestion.loan_dt);
					$("#r_pop_loan_date").html(suggestion.loan_dt);
					$("#r_expiry_date").html(suggestion.expiry_dt);
					$("#r_loan_amount").html(suggestion.loan_amt);
					$("#r_pop_loan_amount").html(suggestion.loan_amt);
					$("#r_net_weight").html(suggestion.weight);
					$("#r_pledge_count").html(suggestion.pl_count);
					// $("#acc_pl_cnt").html(suggestion.pl_count);
					// $("#acc_net_weight").html(suggestion.weight);
					$("#r_pl_tbody").html(suggestion.tbody);
					$("#r_pl_tfoot").html(suggestion.tfoot);
					// $('#r_loan_status').html(suggestion.loan_status)
	                $('#div_r_party_photo').html(suggestion.party_photo);
	                // $('#div_r_item_photo').html(suggestion.item_photo);
	                if(suggestion.member_points==0)
	                {
	                	document.getElementById('r_no_card').style.display="block";
	                	document.getElementById('r_lbl_mem_card_no').style.display="none";
	                	document.getElementById('r_card_type').style.display="none";
	                	document.getElementById('r_card_points').style.display="none";
	                	document.getElementById('lbl_mem_point').style.display="none";
	                	document.getElementById('r_lbl_mem_verify').style.display="none";
	                }
	            	else
	            	{
	            		document.getElementById('r_no_card').style.display="none";
	                	document.getElementById('r_lbl_mem_card_no').style.display="block";
	                	document.getElementById('r_card_type').style.display="block";
	                	document.getElementById('r_card_points').style.display="block";
	                	document.getElementById('lbl_mem_point').style.display="block";
	                	document.getElementById('r_lbl_mem_verify').style.display="block";
	                	var str_card_points='<i class="fa-solid fa-coins fs-6" title="Points"></i>&emsp;'+suggestion.member_points;
		                $("#r_card_no").html(suggestion.member_id);
		                $("#r_card_type").html(suggestion.card_type);
		                // $("#pop_member_card").html(suggestion.member_id);
		                $("#r_card_points").html(str_card_points);
		                // $("#pop_member_points").html(suggestion.member_points);
	                
	                }
	                $("#r_address").html(suggestion.address);

	                // $('#r_loan_status').html(suggestion.loan_status);
	                }

	            });

$('#r_firstname').on('DOMSubtreeModified',function(){
  // alert('changed');
  var pid= $("#r_pid").val();
  var bill_no= $("#redemp_bill_no").val();
 

  		$.ajax({
					type: "POST",
					url: baseurl+'redemption/load_popup_receipt_info',
					async: false,
					type: "POST",
					data: "&bill_no="+bill_no,
					dataType: "html",
					success: function(response)
					{	
						res=response.split("||");
						// alert(response);
						if(res[3]==''){ res[3]=0;}
						if(res[4]==''){ res[4]=0;}
						$('#r_loan_principal').html(res[7]);
						var ln_amt=$('#r_loan_principal').html();
                $('#tbody_paid_history').html(res[1]);
                $('#r_loan_interest').html(res[2]);
                $('#txt_hidden_loan_interest').val(res[2]);
                $('#r_paid_principal').html(res[3]);
                $('#txt_hidden_paid_principal').val(res[3]);
						$('#r_paid_interest').html(res[4]);
						$('#txt_hidden_paid_interest').val(res[4]);
						$('#r_bal_principal').html(res[7]-res[3]);
						var bal_p=res[7]-res[3];
						$('#cust_cls_total_principal').html(bal_p);
						$('#cust_sale_total_principal').html(bal_p);
						$('#cust_trans_total_principal').html(bal_p);
						$('#mul_jwl_total_principal').html(bal_p);
						$('#txt_hidden_bal_principal').val(bal_p);
						var bal_i=res[2]-res[4];
						$('#r_bal_interest').html(bal_i);
						$('#cust_cls_total_interest').html(bal_i);
						$('#cust_sale_total_interest').html(bal_i);
						$('#cust_trans_total_interest').html(bal_i);
						$('#mul_jwl_total_interest').html(bal_i);
						$('#txt_hidden_bal_interest').val(bal_i);
						$('#r_actual_total').html(parseFloat(ln_amt)+parseFloat(res[2]));
						$('#span_acc_total_amount').html(parseFloat(ln_amt)+parseFloat(res[2]));
						$('#txt_hidden_actual_total').val(parseFloat(ln_amt)+parseFloat(res[2]));
						$('#r_paid_total').html(parseFloat(res[3])+parseFloat(res[4]));
						$('#txt_hidden_paid_total').val(parseFloat(res[3])+parseFloat(res[4]));
						var bal=(res[7]-res[3])+(res[2]-res[4]);
						$('#r_bal_total').html(bal);
						$('#cust_cls_total_amount').html(bal);
						$('#cust_sale_total_amount').html(bal);
						$('#cust_trans_total_amount').html(bal);
						$('#mul_jwl_total_amount').html(bal);
						$('#txt_hidden_bal_total').html(bal);
						$('#r_mul_jwl_tbody_pending_payment').html(res[8]);
						$('#lbl_mul_jwl_net_pay').html(bal);
					}
				});
  
	});
	        </script>
	        <script >
		

$('#r_address').on('DOMSubtreeModified',function(){
	var pid= $("#r_pid").val();
	var bill_no= $("#redemp_bill_no").val();
	$.ajax({
				type: "POST",
				url: baseurl+'redemption/load_other_info?',
				async: false,
				type: "POST",
				data: "id="+pid+"&bill_no="+bill_no,
				dataType: "html",
				success: function(response)
				{	
					res=response.split("||");
					// alert(response);
					$("#r_due_status").html(res[1]);
					$("#r_receipt_count").html(res[2]);
					$("#r_receipt_date").html(res[3]);
					var ln_period=res[5]+" Months "+res[4]+" Days";
					$("#r_period").html(ln_period);
					$('#r_loan_principal').html(res[6]);
					$('#txt_hidden_loan_principal').val(res[6]);
					$("#r_loan_status").html(res[13]);
	                $("#tot_hl_bal").html(res[14]);
	                $("#lbl_hl_bal_rem").html(res[14]);
	                $('#div_r_item_photo').empty().append(res[12]);
	                
				}
			});
	// var bill_no= $("#redemp_bill_no").val();
	$.ajax({
				type: "POST",
				url: baseurl+'redemption/load_party_bank',
				async: false,
				type: "POST",
				data: "id="+pid,
				dataType: "html",
				success: function(response)
				{	
					// alert(pid);
					res=response.split("||");
					// alert(response);
					$('#cust_cls_ppchq_party_bank').empty().append(res[1]);
				}
			});
	// var bill_no= $("#redemp_bill_no").val();
	$.ajax({
					type: "POST",
					url: baseurl+'redemption/load_pledge_info',
					async: false,
					type: "POST",
					data: "&bill_no="+bill_no,
					dataType: "html",
					success: function(response)
					{	
						res=response.split("||");
						// alert(response);
						$('#mul_jwl_new_ln_pl_tbody').html(res[2]);
						// $('#mul_jwl_new_ln_tfoot_total').html(res[3]);
						$('#r_pl_weight').html(res[4]);
						$('#r_pl_stone_less').html(res[5]);
						$('#r_pl_less').html(res[6]);
						$('#r_pl_net_weight').html(res[7]);
						$('#r_pl_curr_rate').html(res[8]);
						$('#r_pl_purity').html(res[9]);
						$('#r_pl_grm_val').html(res[10]);
						$('#r_pl_sale_rate').html(res[11]);
						$('#r_pl_hl_bal').html(res[12]);

						$('#tot_pl_weight').html(res[4]);
						$('#tot_stone_weight').html(res[5]);
						$('#tot_less_weight').html(res[6]);
						$('#tot_net_weight').html(res[7]);
						$('#tot_old_curr_rate').html(res[8]);
						$('#add_qual_new_loan').val(res[9]);
						$('#grm_val').html(res[10]);
						$('#sale_rate').html(res[11]);
						// $('#tot_hl_bal').html(res[12]);

						$('#add_pledge_item').val(res[1]);
						$('#delete_pledge_item').val(res[1]);

					}
					});
});
	</script>
	<script>
		$('#lbl_mul_jwl_net_pay').on('DOMSubtreeModified',function(){
	
	var bill_no= $("#redemp_bill_no").val();
	var net_pay= $("#lbl_mul_jwl_net_pay").html();
	$.ajax({
				type: "POST",
				url: baseurl+'redemption/load_pledge_info_net_pay?',
				async: false,
				type: "POST",
				data: "np="+net_pay+"&bill_no="+bill_no,
				dataType: "html",
				success: function(response)
				{	
					// alert(response);
					res=response.split("||");
					$('#mul_jwl_new_ln_pl_tbody').html(res[1]);

				}
			});
	});
	</script>
	<script >
		function cust_trans_pay_to_party()
		{
			var cash_loan_paynow_add_radio = document.getElementById("cash_loan_paynow_add_radio");
			var cheque_loan_paynow_add_radio = document.getElementById("cheque_loan_paynow_add_radio");
			var rtgs_loan_paynow_add_radio = document.getElementById("rtgs_loan_paynow_add_radio");
			var upi_loan_paynow_add_radio = document.getElementById("upi_loan_paynow_add_radio");
			var tot_to_rec=parseFloat($('#cust_trans_ptp_net_pay').html());
			// alert(tot_to_rec);
			var cash_status=0;
			var chq_status=0;
			var rtgs_status=0;
			var upi_status=0;

			var bal=parseFloat($('#cust_trans_ptp_bal_amount').html());
			if(bal!=0)
			{
				alert("Still balance amount exists");
				document.getElementById('btn_pay').style.display="block";
			}
			else
			{

				if(cash_loan_paynow_add_radio.checked)
				{
					var module_name='New Redemption - Customer Transfer - Pay to Party';
					var pay_type='Cash';
					var pay_amt=parseFloat($('#cust_trans_ptp_cash_amt').val());
					var pay_amt1=parseFloat($('#cust_trans_ptp_chq_amt').val());
					var pay_amt2=parseFloat($('#cust_trans_ptp_rtgs_amt').val());
					var pay_amt3=parseFloat($('#cust_trans_ptp_upi_amt').val());
					var pay_details=$('#cust_trans_ptp_cash_details').val();
					var p_bank='';
					var ref_no='';
					var c_bank='';
					var p_bill_no=$('#redemp_bill_no').val();
					var p_pid=$('#r_pid').val();
	     			
	     			var datastring="pay_type="+pay_type+"&pay_amt="+pay_amt+"&pay_details="+pay_details+"&p_bank="+p_bank+"&ref_no="+ref_no+"&c_bank="+c_bank+"&p_bill_no="+p_bill_no+"&p_pid="+p_pid;
	     			var tot=pay_amt+pay_amt1+pay_amt2+pay_amt3;
	     			if(tot==tot_to_rec)
						$('#cust_trans_ptp_bal_amount').html("0");
	     			if(tot>tot_to_rec)
	     			{
	     				alert("Enter value less than total amount");
	     				document.getElementById('cust_trans_ptp_cash_amt').focus();
	     			}
	     			else
	     			{
						$.ajax({
							type: "POST",
							url: baseurl+'loan/pay_to_party?',
							async: false,
							type: "POST",
							data: datastring,
							dataType: "html",
							success: function(response)
							{	
								cash_status=1;
							}
							});
					}
				}
				if(cheque_loan_paynow_add_radio.checked)
				{
					var module_name='New Redemption - Customer Transfer - Pay to Party';
					var pay_type='Cheque';
					var pay_amt1=parseFloat($('#cust_trans_ptp_cash_amt').val());
					var pay_amt=parseFloat($('#cust_trans_ptp_chq_amt').val());
					var pay_amt2=parseFloat($('#cust_trans_ptp_rtgs_amt').val());
					var pay_amt3=parseFloat($('#cust_trans_ptp_upi_amt').val());
					var pay_details=$('#cust_trans_ptp_chq_details').val();
					var p_bank=$('#cust_trans_ptp_chq_party_bank').val();
					var ref_no=$('#cust_trans_ptp_chq_no').val();
					var c_bank=$('#cust_trans_ptp_chq_comp_bank').val();
					var p_bill_no=$('#redemp_bill_no').val();
					var p_pid=$('#r_pid').val();
	     			
	     			var datastring="pay_type="+pay_type+"&pay_amt="+pay_amt+"&pay_details="+pay_details+"&p_bank="+p_bank+"&ref_no="+ref_no+"&c_bank="+c_bank+"&p_bill_no="+p_bill_no+"&p_pid="+p_pid;
	     			var tot=pay_amt+pay_amt1+pay_amt2+pay_amt3;
	     			if(tot==tot_to_rec)
						$('#cust_trans_ptp_bal_amount').html("0");
	     			if(tot>tot_to_rec)
	     			{
	     				alert("Enter value less than total amount");
	     				document.getElementById('cust_trans_ptp_chq_amt').focus();
	     			}
	     			else
	     			{
						$.ajax({
							type: "POST",
							url: baseurl+'loan/pay_to_party?',
							async: false,
							type: "POST",
							data: datastring,
							dataType: "html",
							success: function(response)
							{	
								chq_status=1;
							}
							});
					}
				}
				if(rtgs_loan_paynow_add_radio.checked)
				{
					var module_name='New Redemption - Customer Transfer - Pay to Party';
					var pay_type='RTGS';
					var pay_amt1=parseFloat($('#cust_trans_ptp_cash_amt').val());
					var pay_amt2=parseFloat($('#cust_trans_ptp_chq_amt').val());
					var pay_amt=parseFloat($('#cust_trans_ptp_rtgs_amt').val());
					var pay_amt3=parseFloat($('#cust_trans_ptp_upi_amt').val());
					var pay_details=$('#cust_trans_ptp_rtgs_details').val();
					var p_bank=$('#cust_trans_ptp_rtgs_party_bank').val();
					var ref_no=$('#cust_trans_ptp_rtgs_ref_no').val();
					var c_bank=$('#cust_trans_ptp_rtgs_comp_bank').val();
					var p_bill_no=$('#redemp_bill_no').val();
					var p_pid=$('#r_pid').val();
	     			
	     			var datastring="pay_type="+pay_type+"&pay_amt="+pay_amt+"&pay_details="+pay_details+"&p_bank="+p_bank+"&ref_no="+ref_no+"&c_bank="+c_bank+"&p_bill_no="+p_bill_no+"&p_pid="+p_pid;
	     			var tot=pay_amt+pay_amt1+pay_amt2+pay_amt3;
	     			if(tot==tot_to_rec)
						$('#cust_trans_ptp_bal_amount').html("0");
	     			if(tot>tot_to_rec)
	     			{
	     				alert("Enter value less than total amount");
	     				document.getElementById('cust_trans_ptp_rtgs_amt').focus();
	     			}
	     			else
	     			{
						$.ajax({
							type: "POST",
							url: baseurl+'loan/pay_to_party?',
							async: false,
							type: "POST",
							data: datastring,
							dataType: "html",
							success: function(response)
							{	
								rtgs_status=1;
							}
							});
					}
				}
				if(upi_loan_paynow_add_radio.checked)
				{
					var module_name='New Redemption - Customer Transfer - Pay to Party';
					var pay_type='UPI';
					var pay_amt1=parseFloat($('#cust_trans_ptp_cash_amt').val());
					var pay_amt2=parseFloat($('#cust_trans_ptp_chq_amt').val());
					var pay_amt3=parseFloat($('#cust_trans_ptp_rtgs_amt').val());
					var pay_amt=parseFloat($('#cust_trans_ptp_upi_amt').val());
					var pay_details=$('#cust_trans_ptp_upi_details').val();
					var p_bank=$('#cust_trans_ptp_upi_comp_bank').val();
					var ref_no=$('#cust_trans_ptp_upi_ref_no').val();
					var c_bank=$('#cust_trans_ptp_upi_party_bank').val();
					var p_bill_no=$('#redemp_bill_no').val();
					var p_pid=$('#r_pid').val();
	     			
	     			var datastring="pay_type="+pay_type+"&pay_amt="+pay_amt+"&pay_details="+pay_details+"&p_bank="+p_bank+"&ref_no="+ref_no+"&c_bank="+c_bank+"&p_bill_no="+p_bill_no+"&p_pid="+p_pid;
	     			var tot=pay_amt+pay_amt1+pay_amt2+pay_amt3;
	     			if(tot==tot_to_rec)
						$('#cust_trans_ptp_bal_amount').html("0");
	     			if(tot>tot_to_rec)
	     			{
	     				alert("Enter value less than total amount");
	     				document.getElementById('cust_trans_ptp_upi_amt').focus();
	     			}
	     			else
	     			{
						$.ajax({
							type: "POST",
							url: baseurl+'loan/pay_to_party?',
							async: false,
							type: "POST",
							data: datastring,
							dataType: "html",
							success: function(response)
							{	
								upi_status=1;
							}
							});
					}
				}
			}
			
			if(cash_status==1 || chq_status==1 || rtgs_status==1 || upi_status==1)
			{
					var pay_amt1=parseFloat($('#cust_trans_ptp_cash_amt').val());
					var pay_amt2=parseFloat($('#cust_trans_ptp_chq_amt').val());
					var pay_amt3=parseFloat($('#cust_trans_ptp_rtgs_amt').val());
					var pay_amt=parseFloat($('#cust_trans_ptp_upi_amt').val());
					var tot=pay_amt+pay_amt1+pay_amt2+pay_amt3;
					if(tot==tot_to_rec)
						$('#cust_trans_ptp_bal_amount').html("0");
					var bal=parseFloat($('#cust_trans_ptp_bal_amount').html());
							
				if(bal==0)
				{
					alert("Payment to Party has been completed");
					document.getElementById('btn_pay').style.display="none";	
					document.getElementById('btn_pay_now').style.display="none";
					
					// $('#kt_modal_view_payment').removeClass('show');
					// $('.modal-backdrop').removeClass('show');
					$('#kt_modal_view_payment').hide();
					$('.modal-backdrop').hide();
					var $body = $(document.body);
					$body.css("overflow", "auto");
					$body.width("auto");
				}
			}
			
		}
		</script>
		<script >
		function cust_trans_payment_from_party()
		{
			var cash_loan_paynow_add_radio = document.getElementById("cash_cus_transfer_paid_from_party_add_radio");
			var cheque_loan_paynow_add_radio = document.getElementById("cheque_cus_transfer_paid_from_party_add_radio");
			var rtgs_loan_paynow_add_radio = document.getElementById("rtgs_cus_transfer_paid_from_party_add_radio");
			var upi_loan_paynow_add_radio = document.getElementById("upi_cus_transfer_paid_from_party_add_radio");
			var tot_to_rec=parseFloat($('#cust_trans_ptp_net_pay').html());
			// alert(tot_to_rec);
			var cash_status=0;
			var chq_status=0;
			var rtgs_status=0;
			var upi_status=0;

			var bal=parseFloat($('#cust_trans_pp_bal_amt').html());
			if(bal!=0)
			{
				alert("Still balance amount exists");
				document.getElementById('btn_pay').style.display="block";
			}
			else
			{

				if(cash_loan_paynow_add_radio.checked)
				{
					var module_name='New Redemption - Customer Transfer - Party Payment';
					var pay_type='Cash';
					var pay_amt=parseFloat($('#cust_trans_ppcash_amt').val());
					var pay_amt1=parseFloat($('#cust_trans_ppchq_amt').val());
					var pay_amt2=parseFloat($('#cust_trans_pprtgs_amt').val());
					var pay_amt3=parseFloat($('#cust_trans_ppupi_amt').val());
					var pay_details=$('#cust_trans_ppcash_details').val();
					var p_bank='';
					var ref_no='';
					var c_bank='';
					var p_bill_no=$('#redemp_bill_no').val();
					var p_pid=$('#r_pid').val();
	     			
	     			var datastring="pay_type="+pay_type+"&pay_amt="+pay_amt+"&pay_details="+pay_details+"&p_bank="+p_bank+"&ref_no="+ref_no+"&c_bank="+c_bank+"&p_bill_no="+p_bill_no+"&p_pid="+p_pid;
	     			var tot=pay_amt+pay_amt1+pay_amt2+pay_amt3;
	     			if(tot==tot_to_rec)
						$('#cust_trans_pp_bal_amt').html("0");
	     			if(tot>tot_to_rec)
	     			{
	     				alert("Enter value less than total amount");
	     				document.getElementById('cust_trans_ppcash_amt').focus();
	     			}
	     			else
	     			{
						$.ajax({
							type: "POST",
							url: baseurl+'loan/party_payment?',
							async: false,
							type: "POST",
							data: datastring,
							dataType: "html",
							success: function(response)
							{	
								cash_status=1;
							}
							});
					}
				}
				if(cheque_loan_paynow_add_radio.checked)
				{
					var module_name='New Redemption - Customer Transfer - Party Payment';
					var pay_type='Cheque';
					var pay_amt1=parseFloat($('#cust_trans_ppcash_amt').val());
					var pay_amt=parseFloat($('#cust_trans_ppchq_amt').val());
					var pay_amt2=parseFloat($('#cust_trans_pprtgs_amt').val());
					var pay_amt3=parseFloat($('#cust_trans_ppupi_amt').val());
					var pay_details=$('#cust_trans_ptp_chq_details').val();
					var p_bank=$('#cust_trans_ptp_chq_party_bank').val();
					var ref_no=$('#cust_trans_ptp_chq_no').val();
					var c_bank=$('#cust_trans_ptp_chq_comp_bank').val();
					var p_bill_no=$('#redemp_bill_no').val();
					var p_pid=$('#r_pid').val();
	     			
	     			var datastring="pay_type="+pay_type+"&pay_amt="+pay_amt+"&pay_details="+pay_details+"&p_bank="+p_bank+"&ref_no="+ref_no+"&c_bank="+c_bank+"&p_bill_no="+p_bill_no+"&p_pid="+p_pid;
	     			var tot=pay_amt+pay_amt1+pay_amt2+pay_amt3;
	     			if(tot==tot_to_rec)
						$('#cust_trans_ptp_bal_amount').html("0");
	     			if(tot>tot_to_rec)
	     			{
	     				alert("Enter value less than total amount");
	     				document.getElementById('cust_trans_ppchq_amt').focus();
	     			}
	     			else
	     			{
						$.ajax({
							type: "POST",
							url: baseurl+'loan/party_payment?',
							async: false,
							type: "POST",
							data: datastring,
							dataType: "html",
							success: function(response)
							{	
								chq_status=1;
							}
							});
					}
				}
				if(rtgs_loan_paynow_add_radio.checked)
				{
					var module_name='New Redemption - Customer Transfer - Party Payment';
					var pay_type='RTGS';
					var pay_amt1=parseFloat($('#cust_trans_ppcash_amt').val());
					var pay_amt2=parseFloat($('#cust_trans_ppchq_amt').val());
					var pay_amt=parseFloat($('#cust_trans_pprtgs_amt').val());
					var pay_amt3=parseFloat($('#cust_trans_ppupi_amt').val());
					var pay_details=$('#cust_trans_ptp_rtgs_details').val();
					var p_bank=$('#cust_trans_ptp_rtgs_party_bank').val();
					var ref_no=$('#cust_trans_ptp_rtgs_ref_no').val();
					var c_bank=$('#cust_trans_ptp_rtgs_comp_bank').val();
					var p_bill_no=$('#redemp_bill_no').val();
					var p_pid=$('#r_pid').val();
	     			
	     			var datastring="pay_type="+pay_type+"&pay_amt="+pay_amt+"&pay_details="+pay_details+"&p_bank="+p_bank+"&ref_no="+ref_no+"&c_bank="+c_bank+"&p_bill_no="+p_bill_no+"&p_pid="+p_pid;
	     			var tot=pay_amt+pay_amt1+pay_amt2+pay_amt3;
	     			if(tot==tot_to_rec)
						$('#cust_trans_ptp_bal_amount').html("0");
	     			if(tot>tot_to_rec)
	     			{
	     				alert("Enter value less than total amount");
	     				document.getElementById('cust_trans_pprtgs_amt').focus();
	     			}
	     			else
	     			{
						$.ajax({
							type: "POST",
							url: baseurl+'loan/party_payment?',
							async: false,
							type: "POST",
							data: datastring,
							dataType: "html",
							success: function(response)
							{	
								rtgs_status=1;
							}
							});
					}
				}
				if(upi_loan_paynow_add_radio.checked)
				{
					var module_name='New Redemption - Customer Transfer - Party Payment';
					var pay_type='UPI';
					var pay_amt1=parseFloat($('#cust_trans_ppcash_amt').val());
					var pay_amt2=parseFloat($('#cust_trans_ppchq_amt').val());
					var pay_amt3=parseFloat($('#cust_trans_pprtgs_amt').val());
					var pay_amt=parseFloat($('#cust_trans_ppupi_amt').val());
					var pay_details=$('#cust_trans_ptp_upi_details').val();
					var p_bank=$('#cust_trans_ptp_upi_comp_bank').val();
					var ref_no=$('#cust_trans_ptp_upi_ref_no').val();
					var c_bank=$('#cust_trans_ptp_upi_party_bank').val();
					var p_bill_no=$('#redemp_bill_no').val();
					var p_pid=$('#r_pid').val();
	     			
	     			var datastring="pay_type="+pay_type+"&pay_amt="+pay_amt+"&pay_details="+pay_details+"&p_bank="+p_bank+"&ref_no="+ref_no+"&c_bank="+c_bank+"&p_bill_no="+p_bill_no+"&p_pid="+p_pid;
	     			var tot=pay_amt+pay_amt1+pay_amt2+pay_amt3;
	     			if(tot==tot_to_rec)
						$('#cust_trans_ptp_bal_amount').html("0");
	     			if(tot>tot_to_rec)
	     			{
	     				alert("Enter value less than total amount");
	     				document.getElementById('cust_trans_ppupi_amt').focus();
	     			}
	     			else
	     			{
						$.ajax({
							type: "POST",
							url: baseurl+'loan/party_payment?',
							async: false,
							type: "POST",
							data: datastring,
							dataType: "html",
							success: function(response)
							{	
								upi_status=1;
							}
							});
					}
				}
			}
			
			if(cash_status==1 || chq_status==1 || rtgs_status==1 || upi_status==1)
			{
					var pay_amt1=parseFloat($('#cust_trans_ppcash_amt').val());
					var pay_amt2=parseFloat($('#cust_trans_ppchq_amt').val());
					var pay_amt3=parseFloat($('#cust_trans_pprtgs_amt').val());
					var pay_amt=parseFloat($('#cust_trans_ppupi_amt').val());
					var tot=pay_amt+pay_amt1+pay_amt2+pay_amt3;
					if(tot==tot_to_rec)
						$('#cust_trans_ptp_bal_amount').html("0");
					var bal=parseFloat($('#cust_trans_ptp_bal_amount').html());
							
				if(bal==0)
				{
					alert("Party Payment to Company has been completed");
					document.getElementById('btn_pay').style.display="none";	
					document.getElementById('btn_pay_now').style.display="none";
					
					// $('#kt_modal_view_payment').removeClass('show');
					// $('.modal-backdrop').removeClass('show');
					$('#kt_modal_view_payment_pay_now_party').hide();
					$('.modal-backdrop').hide();
					var $body = $(document.body);
					$body.css("overflow", "auto");
					$body.width("auto");
				}
			}
			
		}
		</script>
		<script >
		function cust_close_calc()
		{

			var t_amt=parseFloat($('#cust_cls_total_amount').html());
			var pc=parseFloat($('#cust_cls_pap_act_chg').val());
			var nc=parseFloat($('#cust_cls_not_chg').val());

			var fc=parseFloat($('#cust_cls_frm_miss_chg').val());
			var oa=parseFloat($('#cust_cls_on_acc_chg').val());
			var dis=parseFloat($('#cust_cls_disc_chg').val());

			if(document.getElementById("cus_cl_form_missing").checked==false)
			{
				fc=0;
			}

			var chg_tot=(t_amt+pc+nc+fc+oa)-dis;
			// alert(chg_tot);
			$('#lbl_cust_cls_net_pay').html(chg_tot);
			$('#span_cust_cls_net_pay').html(chg_tot);
		}
		function cust_close_party_payment_calc()
		{
			var np=$('#span_cust_cls_net_pay').html();	
			var cash=$('#cust_cls_ppcash_amt').val();
			var chq=$('#cust_cls_ppchq_amt').val();
			var rtgs=$('#cust_cls_pprtgs_amount').val();
			var upi=$('#cust_cls_ppupi_amount').val();
			var mc=$('#cust_cls_ppmem_red_points').val();
			var ct=$('#cust_cls_ppchit_red_amount').val();

			var pa_tot=parseFloat(cash)+parseFloat(chq)+parseFloat(rtgs)+parseFloat(upi)+parseFloat(mc)+parseFloat(ct);
			$('#span_cust_cls_paid_amt').html(pa_tot.toFixed(2));	
			
			var fbal=parseFloat(np)-parseFloat(pa_tot);
			
		}
		function cust_sale_calc()
		{

			var t_amt=parseFloat($('#cust_sale_total_amount').html());

			var pc=parseFloat($('#cust_sale_pap_act_chg').val());

			var nc=parseFloat($('#cust_sale_not_chg').val());

			var fc=parseFloat($('#cust_sale_frm_miss_chg').val());
			var oa=parseFloat($('#cust_sale_on_acc_chg').val());
			var dis=parseFloat($('#cust_sale_disc_chg').val());
			if(document.getElementById("cus_sl_form_missing").checked==false)
			{
				fc=0;
			}
			var chg_tot=(t_amt+pc+nc+fc+oa)-dis;
			// alert(chg_tot);
			$('#lbl_cust_sale_net_pay').html(chg_tot);
			$('#span_cust_sale_net_pay').html(chg_tot);
		}
		function cust_sale_calc_remaining_amount()
		{
			var np=$('#lbl_cust_sale_net_pay').html();
			var pa=$('#r_purhcase_amount').val();

			var rem=parseFloat(pa)-parseFloat(np);
			$('#r_remaining_amount').val(rem.toFixed(2));
			$('#span_cust_sale_net_pay').html(rem.toFixed(2));
			
		}
		function cust_sale_check_remaining_amount()
		{
			var cur_rem_val=parseFloat($('#r_remaining_amount').val());
			var cur_span_val=parseFloat($('#span_cust_sale_net_pay').html());
			if(cur_span_val!=cur_rem_val)
			{
				$('#span_cust_sale_net_pay').html(cur_rem_val.toFixed(2));
			}
		}
		function cust_sale_company_payment_calc()
		{
			var np=$('#span_cust_sale_net_pay').html();	
			var cash=$('#cust_sale_cpcash_amt').val();
			var chq=$('#cust_sale_cpchq_amt').val();
			var rtgs=$('#cust_sale_cprtgs_amount').val();
			var upi=$('#cust_sale_cpupi_amount').val();

			var pa_tot=parseFloat(cash)+parseFloat(chq)+parseFloat(rtgs)+parseFloat(upi);
			$('#span_cust_sale_paid_amt').html(pa_tot.toFixed(2));	
			
			var fbal=parseFloat(np)-parseFloat(pa_tot);
			$('#span_cust_sale_bal_amt').html(fbal.toFixed(2));	
		}
		function cust_trans_calc()
		{

			var t_amt=parseFloat($('#cust_trans_total_amount').html());

			var pc=parseFloat($('#cust_trans_pap_act_chg').val());

			var nc=parseFloat($('#cust_trans_not_chg').val());

			var fc=parseFloat($('#cust_trans_frm_miss_chg').val());
			var oa=parseFloat($('#cust_trans_on_acc_chg').val());
			var dis=parseFloat($('#cust_trans_disc_chg').val());

			if(document.getElementById("cus_tr_form_missing").checked==false)
			{
				fc=0;
			}
			var chg_tot=(t_amt+pc+nc+fc+oa)-dis;
			// alert(chg_tot);
			$('#lbl_cust_trans_net_pay').html(chg_tot);
			$('#cust_trans_new_ln_ptr_curr_loan_net_pay').html(chg_tot);
			var pamt=parseFloat($('#cust_trans_payable_amount').val());
			if(pamt==0)
			{
				$('#cust_trans_bal_in_loan').val(chg_tot);
			}
			else
			{
				var tot=chg_tot-pamt;
				$('#cust_trans_bal_in_loan').val(tot);	
			}

			var req_amt=parseFloat($('#cust_trans_req_frm_new_loan').val());

			var rem_amt=parseFloat($('#cust_trans_bal_in_loan').val());
			var new_loan_amt=req_amt+rem_amt;
			$('#cust_trans_new_ln_loan_amount').val(new_loan_amt);
			$('#cust_trans_new_ln_total_amount').html(new_loan_amt);

			var pro=parseFloat($('#cust_trans_new_ln_process_chg').val());
			var doc=parseFloat($('#cust_trans_new_ln_doc_chg').html());

			var chg_amt=pro+doc+chg_tot;
			$('#cust_trans_new_ln_ptr_total_amount').html(chg_amt);

			var t1=parseFloat($('#cust_trans_new_ln_ptr_total_amount').html());
			var t2=parseFloat($('#cust_trans_new_ln_total_amount').html());
			var diff=t2-t1;
			$('#cust_trans_new_ln_topay_net_pay').html(diff);
			$('#cust_trans_ptp_net_pay').html(diff);
			$('#cust_trans_fin_net_payable').html(diff);
			// $('#span_cust_sale_net_pay').html(chg_tot);
		}
		function cust_trans_company_payment_calc()
		{
			var np=$('#cust_trans_ptp_net_pay').html();	
			var cash=$('#cust_trans_ptp_cash_amt').val();
			var chq=$('#cust_trans_ptp_chq_amt').val();
			var rtgs=$('#cust_trans_ptp_rtgs_amt').val();
			var upi=$('#cust_trans_ptp_upi_amt').val();
			
			var pa_tot=parseFloat(cash)+parseFloat(chq)+parseFloat(rtgs)+parseFloat(upi);
			$('#cust_trans_ptp_paid_amount').html(pa_tot.toFixed(2));	
			// $('#cust_trans_fin_paid_amt').html(pa_tot.toFixed(2));	
			
			var fbal=parseFloat(np)-parseFloat(pa_tot);
			$('#cust_trans_ptp_bal_amount').html(fbal.toFixed(2));
			// $('#cust_trans_fin_bal_amt').html(fbal.toFixed(2));
			
		}
		function cust_trans_party_payment_calc()
		{
			// alert("hi");
			var np=$('#cust_trans_ppnetpay_amt').html();	
			var cash=$('#cust_trans_ppcash_amt').val();
			var chq=$('#cust_trans_ppchq_amt').val();
			var rtgs=$('#cust_trans_pprtgs_amt').val();
			var upi=$('#cust_trans_ppupi_amt').val();
			// var mc=$('#cust_trans_ppmem_red_points').val();
			// var ct=$('#cust_trans_ppchit_red_amount').val();

			var pa_tot=parseFloat(cash)+parseFloat(chq)+parseFloat(rtgs)+parseFloat(upi);
			alert(pa_tot);
			$('#cust_trans_pp_paid_amt').html(pa_tot.toFixed(2));	
			
			var fbal=parseFloat(np)-parseFloat(pa_tot);
			$('#cust_trans_pp_bal_amt').html(fbal.toFixed(2));
			
		}
		function mul_jwl_calc()
		{

			var t_amt=parseFloat($('#cust_trans_total_amount').html());

			var pc=parseFloat($('#cust_trans_pap_act_chg').val());

			var nc=parseFloat($('#cust_trans_not_chg').val());

			var fc=parseFloat($('#cust_trans_frm_miss_chg').val());
			var oa=parseFloat($('#cust_trans_on_acc_chg').val());
			var dis=parseFloat($('#cust_trans_disc_chg').val());

			var chg_tot=(t_amt+pc+nc+fc+oa)-dis;
			// alert(chg_tot);
			$('#lbl_cust_trans_net_pay').html(chg_tot);
			$('#cust_trans_new_ln_ptr_curr_loan_net_pay').html(chg_tot);
			var pamt=parseFloat($('#cust_trans_payable_amount').val());
			if(pamt==0)
			{
				$('#cust_trans_bal_in_loan').val(chg_tot);
			}
			else
			{
				var tot=chg_tot-pamt;
				$('#cust_trans_bal_in_loan').val(tot);	
			}

			var req_amt=parseFloat($('#cust_trans_req_frm_new_loan').val());

			var rem_amt=parseFloat($('#cust_trans_bal_in_loan').val());
			var new_loan_amt=req_amt+rem_amt;
			$('#cust_trans_new_ln_loan_amount').val(new_loan_amt);
			$('#cust_trans_new_ln_total_amount').html(new_loan_amt);

			var pro=parseFloat($('#cust_trans_new_ln_process_chg').val());
			var doc=parseFloat($('#cust_trans_new_ln_doc_chg').html());

			var chg_amt=pro+doc+chg_tot;
			$('#cust_trans_new_ln_ptr_total_amount').html(chg_amt);

			var t1=parseFloat($('#cust_trans_new_ln_ptr_total_amount').html());
			var t2=parseFloat($('#cust_trans_new_ln_total_amount').html());
			var diff=t2-t1;
			$('#cust_trans_new_ln_topay_net_pay').html(diff);
			$('#cust_trans_ptp_net_pay').html(diff);
			$('#cust_trans_fin_net_payable').html(diff);
			// $('#span_cust_sale_net_pay').html(chg_tot);
		}
		function mul_jwl_company_payment_calc()
		{
			var np=$('#mul_jwl_ptp_net_pay').html();	
			var cash=$('#mul_jwl_ptp_cash_amt').val();
			var chq=$('#mul_jwl_ptp_chq_amt').val();
			var rtgs=$('#mul_jwl_ptp_rtgs_amt').val();
			var upi=$('#mul_jwl_ptp_upi_amt').val();
			
			var pa_tot=parseFloat(cash)+parseFloat(chq)+parseFloat(rtgs)+parseFloat(upi);
			$('#mul_jwl_ptp_paid_amount').html(pa_tot.toFixed(2));	
			$('#mul_jwl_fin_paid_amt').html(pa_tot.toFixed(2));	
			
			var fbal=parseFloat(np)-parseFloat(pa_tot);
			$('#mul_jwl_ptp_bal_amount').html(fbal.toFixed(2));
			$('#mul_jwl_fin_bal_amt').html(fbal.toFixed(2));
			
		}

	</script>
	<script >
		function loan_interest()
		{
			var int_grp=$('#cust_trans_new_ln_scheme').val();
			 $.ajax({
						type: "POST",
						url: baseurl+'loan/get_int_type_list',
						async: false,
						type: "POST",
						data: "group_name="+int_grp,
						dataType: "html",
						success: function(response)
						{
							// alert(response);
			                $('#cust_trans_new_ln_int_type').empty().append(response);
			                // $('#expiry_dt').
						}
					});
			 var loan_amt=$('#cust_trans_new_ln_loan_amount').val();
			 $.ajax({
						type: "POST",
						url: baseurl+'loan/get_document_charge?',
						async: false,
						type: "POST",
						data: "ln_amt="+loan_amt,
						dataType: "html",
						success: function(response)
						{	
							res=response.split('||');
							$('#cust_trans_new_ln_doc_chg').html(res[1]);
							$('#cust_trans_new_ln_doc_chg_hidden').val(res[1]);
							$('#cust_trans_new_ln_monthly_interest').html(res[3]);
						}
					});
			
		}
		function get_exp_int_amt()
		{
			var int_grp=$('#cust_trans_new_ln_scheme').val();
			var int_type=$('#cust_trans_new_ln_int_type').val();
			 $.ajax({
						type: "POST",
						url: baseurl+'redemption/get_exp_int_amt?',
						async: false,
						type: "POST",
						data: "group_name="+int_grp+"&int_type="+int_type,
						dataType: "html",
						success: function(response)
						{
							// alert(response);
							var res=response.split('||');
							$('#cust_trans_new_ln_exp_dt').html(res[1])
			                // $('#cust_trans_new_ln_monthly_interest').html(res[3]);
						}
					});
		}


	</script>
	<script >
		function add_pledge_it()
		{

			var p_item=$('#pledge_item').val();
			//$('select[name=pledge_item]').find(':selected').text();
			var p_description=$('#pl_description').val();
			var p_purity=$('select[name=add_ptyname_new_loan]').find(':selected').text();
			var p_pur =  $('select[name=add_ptyname_new_loan]').val();
			var p_pur_per=$('#purity_per').val();
			var p_weight=$('#weight_ple').val();
			var p_st_weight=$('#stone_weight').val();
			var p_less=$('#less_ple').val();
			var dmg;
			if(document.getElementById('is_damage').checked==true){dmg= 'Yes';}
			else {dmg='No';}

			
			// var net_weight=parseFloat(p_weight)-parseFloat(p_st_weight)-parseFloat(p_less);
			var net_weight=parseFloat((p_weight)-(p_st_weight)-(p_less)).toFixed(3);

		    var count=$('#add_pledge_item').val();
		    var cont = $("#mul_jwl_new_ln_pl_tbody");
		    var dec=2;
		    var w,tw,t,t1,t2;

		    if ($('#pledge_item').val()=="" || $('#pl_description').val()=="" || $('select[name=add_ptyname_new_loan]').val()=="" ||  $('#purity_per').val()==""  || $('#weight_ple').val()=="" || $('#stone_weight').val()=="" || $('#less_ple').val()== "") 
		    {
		    	alert("Please Fill All Pledged Items.");
		    }
		    else
		    {
		    	if(count==0)
			    {
			    	var txt_area_data=$('#pl_loan_jewel_image_data').val();
			    	// alert(txt_area_data);
			    	if(txt_area_data!='')
			    	{
			    		var img_data='<div class="image-input mt-2 me-6" data-kt-image-input="true"><img src="'+txt_area_data+'" height="40" width="40"><textarea hidden="hidden" id="pledge_image_hidden0" name="pledge_image_hidden[]">'+txt_area_data+'</textarea>';
			    	}
			    	else
			    	{
			    		var img_data='<div class="image-input mt-2 me-6" data-kt-image-input="true"><div class="image-input-wrapper w-40px h-40px"style="background-image: url(<?php echo base_url();?>assets/images/jewel.jpg)"></div></div><textarea hidden="hidden" id="pledge_image_hidden0" name="pledge_image_hidden[]"></textarea>';
			    	}

			    	cont.empty().append('<tr class="chk_tr" id="tr_id'+count+'"><td id="td_id_1'+count+'">'+p_item+'<input type="hidden" id="pledge_item_hidden'+count+'" name="pledge_item_hidden[]" value="'+p_item+'"></td><td id="td_id_2'+count+'">'+p_description+'<input type="hidden" id="pledge_description_hidden'+count+'" name="pledge_description_hidden[]" value="'+p_description+'"> </td> <td id="td_id_3'+count+'">'+p_purity+'<input type="hidden" id="pledge_purity_hidden'+count+'" name="pledge_purity_hidden[]" value="'+p_purity+'"></td><td id="td_id_4'+count+'">'+p_pur_per+'<input type="hidden" id="pledge_purity_percent_hidden'+count+'" name="pledge_purity_percent_hidden[]" value="'+p_pur_per+'"></td> <td id="td_id_5'+count+'">'+p_weight+'<input type="hidden" id="pledge_weight_hidden'+count+'" name="pledge_weight_hidden[]" value="'+p_weight+'"></td><td id="td_id_6'+count+'">'+p_st_weight+'<input type="hidden" id="pledge_stone_weight_hidden'+count+'" name="pledge_stone_weight_hidden[]" value="'+p_st_weight+'"></td> <td  id="td_id_7'+count+'">'+p_less+'<input type="hidden" id="pledge_less_hidden'+count+'" name="pledge_less_hidden[]" value="'+p_less+'"></td><td id="td_id_8'+count+'">'+net_weight+'<input type="hidden" id="pledge_net_weight_hidden'+count+'" name="pledge_net_weight_hidden[]" value="'+net_weight+'"></td><td id="td_id_9'+count+'">'+dmg+'<input type="hidden" id="pledge_is_damage_hidden'+count+'" name="pledge_is_damage_hidden[]" value="'+dmg+'"></td><td id="td_id_10'+count+'">'+img_data+'</td><td id="td_id_11'+count+'"> - </td> <td id="td_id_12'+count+'"><a href="javascript:;" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1" data-bs-toggle="modal" data-bs-target="#" onclick="edit_row('+count+','+p_pur+')"><span class="svg-icon svg-icon-3"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path opacity="0.3" d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z" fill="currentColor"></path><path d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z" fill="currentColor"></path></svg></span></a> <a href="#" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm" data-bs-toggle="modal" data-bs-target="#" onclick="remove_row('+count+');"><span class="svg-icon svg-icon-3"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z" fill="currentColor"></path><path opacity="0.5" d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z" fill="currentColor"></path><path opacity="0.5" d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z" fill="currentColor"></path></svg></span></a></td></tr>');
			    	
			    	$('#pledge_item').val("");
			    	$('#pl_description').val("");
			    	$('#purity_per').val("");
			    	$('#weight_ple').val("");
			    	$('#stone_weight').val("");
			    	$('#less_ple').val("");
			    	// $('#weight').val("");
			    	document.getElementById('is_damage').checked=false;
			    	$('#add_ptyname_new_loan').val("");
			    	$('#add_ptyname_new_loan').select2().val("");
			    	// $('#add_ptyname_new_loan').select2({
				    //     dropdownParent: $('#kt_modal_newloan')
				    // });
			    	//alert(p_weight);
			    	var pw = parseFloat(p_weight).toFixed('3');
			    	// $('#add_weight_new_loan').val(pw);
			    	$('#tot_pl_weight').html(parseFloat(p_weight).toFixed('3'));
			    	$('#tot_stone_weight').html(parseFloat(p_st_weight).toFixed('3'));
			    	$('#tot_less_weight').html(parseFloat(p_less).toFixed('3'));
			    	$('#tot_net_weight').html(parseFloat(net_weight).toFixed('3'));

					var cr=parseFloat( $('#current_rate').val());
					$('#add_qual_new_loan').val(p_pur_per);
					// alert(cr);
					var tot=cr*(p_pur_per/100);
					// alert(tot);
					var tot_wt=parseFloat( tot*net_weight).toFixed(2);
					$('#grm_val').html(parseFloat(Math.round(tot)).toFixed(2));
					$('#grm_val_hidden').val(parseFloat(Math.round(tot)).toFixed(2));
					$('#sale_rate').html(Math.round(tot_wt));
					$('#sale_rate_hidden').val(Math.round(tot_wt));

					// var pl_it=$('#pledge_item_hidden'+count).val();
					// alert(pl_it);
			    }
			    else
			    {
			    	var txt_area_data=$('#pl_loan_jewel_image_data').val();
			    	// alert(txt_area_data);
			    	if(txt_area_data!='')
			    	{
			    		var img_data='<div class="image-input mt-2 me-6" data-kt-image-input="true"><img src="'+txt_area_data+'" height="40" width="40"><textarea hidden="hidden" id="pledge_image_hidden'+count+'" name="pledge_image_hidden[]">'+txt_area_data+'</textarea>';
			    	}
			    	else
			    	{
			    		var img_data='<div class="image-input mt-2 me-6" data-kt-image-input="true"><div class="image-input-wrapper w-40px h-40px"style="background-image: url(<?php echo base_url();?>assets/images/jewel.jpg)"></div></div><textarea hidden="hidden" id="pledge_image_hidden0" name="pledge_image_hidden[]"></textarea>';
			    	}

			    	cont.append('<tr class="chk_tr" id="tr_id'+count+'"><td id="td_id_1'+count+'">'+p_item+'<input type="hidden" id="pledge_item_hidden'+count+'" name="pledge_item_hidden[]" value="'+p_item+'"></td><td id="td_id_2'+count+'">'+p_description+'<input type="hidden" id="pledge_description_hidden'+count+'" name="pledge_description_hidden[]" value="'+p_description+'"> </td> <td id="td_id_3'+count+'">'+p_purity+'<input type="hidden" id="pledge_purity_hidden'+count+'" name="pledge_purity_hidden[]" value="'+p_purity+'"></td><td id="td_id_4'+count+'">'+p_pur_per+'<input type="hidden" id="pledge_purity_percent_hidden'+count+'" name="pledge_purity_percent_hidden[]" value="'+p_pur_per+'"></td> <td id="td_id_5'+count+'">'+p_weight+'<input type="hidden" id="pledge_weight_hidden'+count+'" name="pledge_weight_hidden[]" value="'+p_weight+'"></td><td id="td_id_6'+count+'">'+p_st_weight+'<input type="hidden" id="pledge_stone_weight_hidden'+count+'" name="pledge_stone_weight_hidden[]" value="'+p_st_weight+'"></td> <td  id="td_id_7'+count+'">'+p_less+'<input type="hidden" id="pledge_less_hidden'+count+'" name="pledge_less_hidden[]" value="'+p_less+'"></td><td id="td_id_8'+count+'">'+net_weight+'<input type="hidden" id="pledge_net_weight_hidden'+count+'" name="pledge_net_weight_hidden[]" value="'+net_weight+'"></td><td id="td_id_9'+count+'">'+dmg+'<input type="hidden" id="pledge_is_damage_hidden'+count+'" name="pledge_is_damage_hidden[]" value="'+dmg+'"></td><td id="td_id_10'+count+'">'+img_data+'</td> <td id="td_id_11'+count+'"> - </td><td id="td_id_12'+count+'"><a href="javascript:;" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1" data-bs-toggle="modal" data-bs-target="#"  onclick="edit_row('+count+','+p_pur+')"><span class="svg-icon svg-icon-3"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path opacity="0.3" d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z" fill="currentColor"></path><path d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z" fill="currentColor"></path></svg></span></a> <a href="#" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm" data-bs-toggle="modal" data-bs-target="#" onclick="remove_row('+count+');"><span class="svg-icon svg-icon-3"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z" fill="currentColor"></path><path opacity="0.5" d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z" fill="currentColor"></path><path opacity="0.5" d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z" fill="currentColor"></path></svg></span></a></td></tr>');

			    	$('#pledge_item').val("");
			    	$('#pl_description').val("");
			    	$('#purity_per').val("");
			    	$('#weight_ple').val("");
			    	$('#stone_weight').val("");
			    	$('#less_ple').val("");
			    	// $('#weight').val("");
			    	document.getElementById('is_damage').checked=false;
			    	$('#add_ptyname_new_loan').val("");
			    	$('#add_ptyname_new_loan').select2().val("");

			    	var t_pl_w=$('#tot_pl_weight').html();
			    	var t_pl_sw=$('#tot_stone_weight').html();
			    	var t_pl_lw=$('#tot_less_weight').html();
			    	var t_pl_nw=$('#tot_net_weight').html();

			    	t_pl_w=parseFloat(t_pl_w)+parseFloat(p_weight);
			    	t_pl_sw=parseFloat(t_pl_sw)+parseFloat(p_st_weight);
			    	t_pl_lw=parseFloat(t_pl_lw)+ parseFloat(p_less);
			    	t_pl_nw=parseFloat(t_pl_nw)+ parseFloat(net_weight);

			    	$('#tot_pl_weight').html(parseFloat(t_pl_w).toFixed('3'));
			    	$('#tot_stone_weight').html(parseFloat(t_pl_sw).toFixed('3'));
			    	$('#tot_less_weight').html(parseFloat(t_pl_lw).toFixed('3'));
			    	$('#tot_net_weight').html(parseFloat(t_pl_nw).toFixed('3'));

			  		var cr=parseFloat( $('#current_rate').val());
					var prev_pur= $('#add_qual_new_loan').val();
					// alert(prev_pur);
					
					// alert(tot_pur);
					
					if(prev_pur==0)
					{
						var pur=p_pur_per;
					}
					else
					{
						var tot_pur= (parseFloat(prev_pur)*Number(count)) + parseFloat(p_pur_per);
						var div=(Number(count)+1);
						var pur=(tot_pur/div);
					}
					// alert(pur);
					$('#add_qual_new_loan').val(pur);
					var tot=cr*(pur/100);
					var tot_wt=tot*t_pl_nw;
					
					$('#grm_val').html(parseFloat(Math.round(tot)).toFixed(2));
					$('#grm_val_hidden').val(parseFloat(Math.round(tot)).toFixed(2));
					$('#sale_rate').html(Math.round(tot_wt));
					$('#sale_rate_hidden').val(Math.round(tot_wt));
			    }
			     count=Number(count)+1;
			     $('#add_ptyname_new_loan').val("");
			    $('#add_ptyname_new_loan').select2().val("");
			    //count=1;
			    $('#add_pledge_item').val(count);
			    $('#delete_pledge_item').val(count);
		    }
		}
		
	</script>
	<script >
		function mul_jwl_loan_interest()
		{
			var int_grp=$('#mul_jwl_new_ln_scheme').val();
			 $.ajax({
						type: "POST",
						url: baseurl+'Redemption/get_int_type_list',
						async: false,
						type: "POST",
						data: "group_name="+int_grp,
						dataType: "html",
						success: function(response)
						{
							// alert(response);
			                $('#mul_jwl_new_ln_int_type').empty().append(response);
			                // $('#expiry_dt').
						}
					});
		}
		function purity_percent()
		{
			var pure=$('#add_ptyname_new_loan').val();
			if(pure!='')
			{
				$('#add_ptyname_new_loan_err').html('')
			$.ajax({
					type: "POST",
					url: baseurl+'loan/get_purity_percent',
					async: false,
					type: "POST",
					data: "id="+pure,
					dataType: "html",
					success: function(response)
					{	
		                $('#purity_per').val(response.trim());
					}
					});
			}
			else
			{
				alert('Choose Purity');
				$('#add_ptyname_new_loan_err').html('Enter Purity')
			}
		}
		</script>
		<script >
		function remove_row(t)
		{
			var cont = $("#mul_jwl_new_ln_pl_tbody");
			var count=$('#delete_pledge_item').val();

			var p_pur=$('#td_id_4'+t).text();
			var p_weight=$('#td_id_5'+t).text();
			var p_st_weight=$('#td_id_6'+t).text();
			var p_less=$('#td_id_7'+t).text();
			var net_weight=$('#td_id_8'+t).text();

			var t_pl_w=$('#tot_pl_weight').html();
	    	var t_pl_sw=$('#tot_stone_weight').html();
	    	var t_pl_lw=$('#tot_less_weight').html();
	    	var t_pl_nw=$('#tot_net_weight').html();

	  
	    	t_pl_w=parseFloat(t_pl_w)-parseFloat(p_weight);
	    	t_pl_sw=parseFloat(t_pl_sw)-parseFloat(p_st_weight);
	    	t_pl_lw=parseFloat(t_pl_lw)- parseFloat(p_less);
	    	t_pl_nw=parseFloat(t_pl_nw)- parseFloat(net_weight);

	    	$('#tot_pl_weight').html(parseFloat(t_pl_w).toFixed('3'));
	    	$('#tot_stone_weight').html(parseFloat(t_pl_sw).toFixed('3'));
	    	$('#tot_less_weight').html(parseFloat(t_pl_lw).toFixed('3'));
	    	$('#tot_net_weight').html(parseFloat(t_pl_nw).toFixed('3'));

	    	var cr=parseFloat( $('#current_rate').val());
			var prev_pur= $('#add_qual_new_loan').val();
			var pur_cal= parseFloat(prev_pur*count)-parseFloat(p_pur);
			var div=Number(count)-1;
			var tot_pur=parseFloat(pur_cal/div);
			// var tot_pur= parseFloat(prev_pur) + parseFloat(p_pur_per);
			// var div=Number(count)+1;
			// var pur=parseFloat(tot_pur/div);
			$('#add_qual_new_loan').val(tot_pur);
			var tot=cr*(tot_pur/100);
			var tot_wt=parseFloat( tot*t_pl_nw).toFixed(2);
			$('#grm_val').html(parseFloat(Math.round(tot)).toFixed(2));
			$('#grm_val_hidden').val(parseFloat(Math.round(tot)).toFixed(2));
			$('#sale_rate').html(Math.round(tot_wt));
			$('#sale_rate_hidden').val(Math.round(tot_wt));

			$('#tr_id'+t).remove();
			 count=Number(count)-1;
		    // $('#add_pledge_item').val(count);
		    $('#delete_pledge_item').val(count);
		}
	</script>
	<script >
		function edit_row(t,p)
		{
			var cont = $("#mul_jwl_new_ln_pl_tbody");
			var count=$('#delete_pledge_item').val();

			var p_name=$('#td_id_1'+t).text();
			var p_desc=$('#td_id_2'+t).text();
			var p_qlty=$('#td_id_3'+t).text();
			var p_pur=$('#td_id_4'+t).text();
			var p_weight=$('#td_id_5'+t).text();
			var p_st_weight=$('#td_id_6'+t).text();
			var p_less=$('#td_id_7'+t).text();
			var net_weight=$('#td_id_8'+t).text();
			var is_dam=$('#td_id_9'+t).text();

			// alert(p_name);
			// alert(p_desc);
			// alert(p_qlty);
			// alert(p_pur);
			// alert(p_weight);

			var t_pl_w=$('#tot_pl_weight').html();
	    	var t_pl_sw=$('#tot_stone_weight').html();
	    	var t_pl_lw=$('#tot_less_weight').html();
	    	var t_pl_nw=$('#tot_net_weight').html();

	  		
	    	t_pl_w=parseFloat(t_pl_w)-parseFloat(p_weight);
	    	t_pl_sw=parseFloat(t_pl_sw)-parseFloat(p_st_weight);
	    	t_pl_lw=parseFloat(t_pl_lw)- parseFloat(p_less);
	    	t_pl_nw=parseFloat(t_pl_nw)- parseFloat(net_weight);

	    	$('#tot_pl_weight').html(parseFloat(t_pl_w).toFixed('3'));
	    	$('#tot_stone_weight').html(parseFloat(t_pl_sw).toFixed('3'));
	    	$('#tot_less_weight').html(parseFloat(t_pl_lw).toFixed('3'));
	    	$('#tot_net_weight').html(parseFloat(t_pl_nw).toFixed('3'));

	    	var cr=parseFloat( $('#current_rate').val());
			var prev_pur= $('#add_qual_new_loan').val();
			if(prev_pur!=0){
			var pur_cal= parseFloat(prev_pur*count)-parseFloat(p_pur);
			}
			
			if(pur_cal==0){
				var tot_pur=0;
			}
			else
			{
				var div=Number(count)-1;
				var tot_pur=parseFloat(pur_cal/div);
			}
			// var tot_pur= parseFloat(prev_pur) + parseFloat(p_pur_per);
			// var div=Number(count)+1;
			// var pur=parseFloat(tot_pur/div);
			$('#add_qual_new_loan').val(tot_pur);
			var tot=cr*(tot_pur/100);
			var tot_wt=parseFloat( tot*t_pl_nw).toFixed(2);
			$('#grm_val').html(parseFloat(Math.round(tot)).toFixed(2));
			$('#grm_val_hidden').val(parseFloat(Math.round(tot)).toFixed(2));
			$('#sale_rate').html(Math.round(tot_wt));
			$('#sale_rate_hidden').val(Math.round(tot_wt));

			$('#tr_id'+t).remove();


			$('#pledge_item').val(p_name);
	  		$('#pl_description').val(p_desc);
	  		$('#purity_per').val(p_pur);
	  		$('#weight_ple').val(p_weight);
	  		$('#stone_weight').val(p_st_weight);
	  		$('#less_ple').val(p_less);
	  		$('#add_ptyname_new_loan').val(p).select2();

	  		if(is_dam=='Yes')
	  		{
			 	document.getElementById('is_damage').checked=true;
	  		}
	  		else
	  		{
	  			document.getElementById('is_damage').checked=false;
	  		}
	  		count=Number(count)-1;
		    // $('#add_pledge_item').val(count);
		    $('#delete_pledge_item').val(count);
		}
	</script>
	<script >
		$("#pledge_item").autocomplete({ 
	                valueKey:'title',
	                source:[{
	                //type: 'post',
	                url:baseurl+'redemption/pledgedList?query=%QUERY%',
	                type:'remote',
	                ajax:{
	                  dataType : 'json',
	                }
	            }]}).on('selected.xdsoft',function(e,suggestion,ui){ 
	                $("#pledge_item").val(suggestion.itemname);
	                $('#pledge_item_id_hidden').val(suggestion.id);
	              
	        });
	</script>

	<!-- Payment Now From Party Start -->
		<script>
			function cash_ln_paynow_add_radio1()
			{
				var cash_loan_paynow_add_radio = document.getElementById("mj_cash_loan_paynow_add_radio");

				var cash_label_ln_pay = document.getElementById("mj_cash_label_ln_pay");
				var cash_label_ln_pay_tbox = document.getElementById("mj_cash_label_ln_pay_tbox");
				var cash_detail_ln_pay_tbox = document.getElementById("mj_cash_detail_ln_pay_tbox");

				if (cash_loan_paynow_add_radio.checked)
				{
				    cash_label_ln_pay.style.display = "block";
				    cash_label_ln_pay_tbox.style.display = "block";
				    cash_detail_ln_pay_tbox.style.display = "block";
			  	} else 
			  	{
			  		cash_label_ln_pay.style.display = "none";
			  		cash_label_ln_pay_tbox.style.display = "none";
			  		cash_detail_ln_pay_tbox.style.display = "none";
			  	}
			};

			function cheque_ln_paynow_add_radio1()
			{
				var cheque_loan_paynow_add_radio = document.getElementById("mj_cheque_loan_paynow_add_radio");

				var cheque_label_ln_pay = document.getElementById("mj_cheque_label_ln_pay");
				var cheque_amt_ln_pay_tbox = document.getElementById("mj_cheque_amt_ln_pay_tbox");
				var cheque_no_ln_pay_tbox = document.getElementById("mj_cheque_no_ln_pay_tbox");
				var cheque_com_bank_ln_pay_tbox = document.getElementById("mj_cheque_com_bank_ln_pay_tbox");
				var cheque_par_bank_ln_pay_tbox = document.getElementById("mj_cheque_par_bank_ln_pay_tbox");
				var cheque_detail_ln_pay_tbox = document.getElementById("mj_cheque_detail_ln_pay_tbox");

				if (cheque_loan_paynow_add_radio.checked)
				{
				    cheque_label_ln_pay.style.display = "block";
				    cheque_amt_ln_pay_tbox.style.display = "block";
				    cheque_no_ln_pay_tbox.style.display = "block";
				    cheque_com_bank_ln_pay_tbox.style.display = "block";
				    cheque_par_bank_ln_pay_tbox.style.display = "block";
				    cheque_detail_ln_pay_tbox.style.display = "block";
			  	} else 
			  	{
			     	cheque_label_ln_pay.style.display = "none";
				    cheque_amt_ln_pay_tbox.style.display = "none";
				    cheque_no_ln_pay_tbox.style.display = "none";
				    cheque_com_bank_ln_pay_tbox.style.display = "none";
				    cheque_par_bank_ln_pay_tbox.style.display = "none";
				    cheque_detail_ln_pay_tbox.style.display = "none";
			  	}
			}

			function rtgs_ln_paynow_add_radio1()
			{
				var rtgs_loan_paynow_add_radio = document.getElementById("mj_rtgs_loan_paynow_add_radio");

				var rtgs_label_ln_pay = document.getElementById("mj_rtgs_label_ln_pay");
				var rtgs_amt_ln_pay_tbox = document.getElementById("mj_rtgs_amt_ln_pay_tbox");
				var rtgs_ref_ln_pay_tbox = document.getElementById("mj_rtgs_ref_ln_pay_tbox");
				var rtgs_com_bank_ln_pay_tbox = document.getElementById("mj_rtgs_com_bank_ln_pay_tbox");
				var rtgs_par_bank_ln_pay_tbox = document.getElementById("mj_rtgs_par_bank_ln_pay_tbox");
				var rtgs_detail_ln_pay_tbox = document.getElementById("mj_rtgs_detail_ln_pay_tbox");

				if (rtgs_loan_paynow_add_radio.checked == true)
				{
				    rtgs_label_ln_pay.style.display = "block";
				    rtgs_amt_ln_pay_tbox.style.display = "block";
				    rtgs_ref_ln_pay_tbox.style.display = "block";
				    rtgs_com_bank_ln_pay_tbox.style.display = "block";
				    rtgs_par_bank_ln_pay_tbox.style.display = "block";
				    rtgs_detail_ln_pay_tbox.style.display = "block";
			  	} else 
			  	{
			     	rtgs_label_ln_pay.style.display = "none";
				    rtgs_amt_ln_pay_tbox.style.display = "none";
				   	rtgs_ref_ln_pay_tbox.style.display = "none";
				    rtgs_com_bank_ln_pay_tbox.style.display = "none";
				    rtgs_par_bank_ln_pay_tbox.style.display = "none";
				    rtgs_detail_ln_pay_tbox.style.display = "none";
			  	}
			}

			function upi_ln_paynow_add_radio1()
			{
				var upi_loan_paynow_add_radio = document.getElementById("mj_upi_loan_paynow_add_radio");

				var upi_label_ln_pay = document.getElementById("mj_upi_label_ln_pay");
				var upi_amt_ln_pay_tbox = document.getElementById("mj_upi_amt_ln_pay_tbox");
				var upi_ref_ln_pay_tbox = document.getElementById("mj_upi_ref_ln_pay_tbox");
				var upi_com_bank_ln_pay_tbox = document.getElementById("mj_upi_com_bank_ln_pay_tbox");
				var upi_par_bank_ln_pay_tbox = document.getElementById("mj_upi_par_bank_ln_pay_tbox");
				var upi_detail_ln_pay_tbox = document.getElementById("mj_upi_detail_ln_pay_tbox");

				if (upi_loan_paynow_add_radio.checked == true)
				{
				    upi_label_ln_pay.style.display = "block";
				    upi_amt_ln_pay_tbox.style.display = "block";
				    upi_ref_ln_pay_tbox.style.display = "block";
				    upi_com_bank_ln_pay_tbox.style.display = "block";
				    upi_par_bank_ln_pay_tbox.style.display = "block";
				    upi_detail_ln_pay_tbox.style.display = "block";
			  	} else 
			  	{
			     	upi_label_ln_pay.style.display = "none";
				    upi_amt_ln_pay_tbox.style.display = "none";
				    upi_ref_ln_pay_tbox.style.display = "none";
				    upi_com_bank_ln_pay_tbox.style.display = "none";
				    upi_par_bank_ln_pay_tbox.style.display = "none";
				    upi_detail_ln_pay_tbox.style.display = "none";
			  	}
			}
		</script>
		<!-- Payment Now From Party End -->
	<script >
		function multi_jewel_charges_calc()
		{

			var t_amt=parseFloat($('#mul_jwl_total_amount').html());

			var pc=parseFloat($('#mul_jwl_pap_act_chg').val());

			var nc=parseFloat($('#mul_jwl_not_chg').val());

			var fc=parseFloat($('#mul_jwl_frm_miss_chg').val());
			var oa=parseFloat($('#mul_jwl_on_acc_chg').val());
			var dis=parseFloat($('#mul_jwl_disc_chg').val());


			if(document.getElementById("mul_jwl_form_missing").checked==false)
			{
				fc=0;
			}
			var chg_tot=(t_amt+pc+nc+fc+oa)-dis;	

			// alert(chg_tot);
			$('#lbl_mul_jwl_net_pay').html(chg_tot);
			$('#mul_jwl_new_ln_ptr_curr_loan_net_pay').html(chg_tot);
			 $('#mul_jwl_new_ln_ptr_total_amount').html(chg_tot);
			
		}
		function calc_net_wght_display()
		{
			var wght=parseFloat($('#weight_ple').val());
			var st_wght=parseFloat($('#stone_weight').val());
			var le_wght=parseFloat($('#less_ple').val());
			// alert(wght);
			var res=parseFloat(wght-st_wght-le_wght).toFixed(2);
			$('#lbl_nt_wgt').html(res);
		}
	</script>
	<script >

		function calc_val_adjustment(rno)
		{
				var pl_tot_cnt=parseFloat($('#mj_pl_item_count').val());

				var redeem_actl_val=parseFloat($('#old_ln_pl_val'+rno).val());
				var redeem_entry_val=parseFloat($('#new_ln_pl_val'+rno).val());


				var diff_amt1=parseFloat(redeem_actl_val)-parseFloat(redeem_entry_val);
				var diff_amt=(diff_amt1).toFixed(2);

				// alert(diff_amt);
				var cnt=0;
				for (i=0; i<pl_tot_cnt;i++)
				{
						if(i!=rno)
						{
								var rec_st=$('#rec_status'+i).val();
								if(rec_st=='O' || rec_st=='N' )
								{
										cnt+=1;
								}
						}
				}

				var seg_amt1 = parseFloat(diff_amt)/parseFloat(cnt);
				var seg_amt=seg_amt1.toFixed(2);
				// alert(seg_amt);
				if(diff_amt>0)
				{
						for(j=0;j<pl_tot_cnt;j++)
						{
								if(j!=rno)
								{
										var rec_st1=$('#rec_status'+j).val();
										if(rec_st1=='O' || rec_st1=='N' )
										{
												var old_ln_pl_val=parseFloat($('#old_ln_pl_val'+j).val());
												// var new_ln_pl_val=parseFloat($('#new_ln_pl_val'+j).val());

												var new_val=parseFloat(old_ln_pl_val+(seg_amt));
												// alert(new_val);
												// $('#old_ln_pl_val'+j).val(new_val);
												$('#new_ln_pl_val'+j).val(new_val.toFixed(2));

										}
								}

						}
				}
				else if(diff_amt<0)
				{
						for(j=0;j<pl_tot_cnt;j++)
						{
								if(j!=rno)
								{
										var rec_st1=$('#rec_status'+j).val();
										if(rec_st1=='O' || rec_st1=='N' )
										{
												var old_ln_pl_val=parseFloat($('#old_ln_pl_val'+j).val());
												// var new_ln_pl_val=parseFloat($('#new_ln_pl_val'+j).val());
												// alert(seg_amt);
												var new_val=parseFloat(old_ln_pl_val)+parseFloat(seg_amt);
												// alert(new_val);
												// $('#old_ln_pl_val'+j).val(new_val);
												$('#new_ln_pl_val'+j).val(new_val.toFixed(2));

										}
								}
						}
				}
				$('#rec_status'+rno).val('C');
				

				for(j=0;j<pl_tot_cnt;j++)
				{
						if(j!=rno)
						{
								var rec_st1=$('#rec_status'+j).val();
								if( rec_st1=='O' || rec_st1=='N' )
								{
										var old_ln_pl_val=parseFloat($('#old_ln_pl_val'+j).val());
										var new_ln_pl_val=parseFloat($('#new_ln_pl_val'+j).val());
										
											if(old_ln_pl_val !=new_ln_pl_val)
											{
													$('#old_ln_pl_val'+j).val(new_ln_pl_val);
											}
										// $('#new_ln_pl_val'+j).val(new_val.toFixed(2));

								}
						}
				}
				// $('#old_ln_pl_val'+rno).val(redeem_entry_val);
				// document.getElementById('new_ln_pl_val'+rno).disabled=true;
				// $('#new_ln_pl_val'+rno).val(redeem_entry_val);
				// alert(redeem_entry_val);	
		}

	</script>
	<script >
		function redeem(rno)
		{

			// alert(rno);
			var redeem_actl_val=$('#old_ln_pl_val'+rno).val();
			var redeem_entry_val=$('#new_ln_pl_val'+rno).val();
			var pl_id=$('#old_pl_id'+rno).val();
			var bill_no=$('#redemp_bill_no').val();
			var r_pl_cnt=$('#red_pl_count').val();
			var r_pl_amt=$('#red_pl_amt').val();

			$.ajax({
					type: "POST",
					url: baseurl+'redemption/redeem_pledge?',
					async: false,
					type: "POST",
					data: "pl_id="+pl_id+"&bill_no="+bill_no+"&redeem_actl_val="+redeem_actl_val+"&redeem_calc_val="+redeem_entry_val,
					dataType: "html",
					success: function(response)
					{	
		                if(response==1)
		                {
			                document.getElementById('old_ln_pl_val'+rno).style.display="none";
							// $('#td_id_11'+rno).html(redeem_actl_val);	
							$('#td_id_11'+rno).html(redeem_entry_val);	
							$('#td_id_12'+rno).html('');
							// document.getElementById('tr_id'+rno).style="background:red";
							document.getElementById('tr_id'+rno).style="color:red; font-weight:bold";
							
							$('#rec_status'+rno).val('R');
							$('#red_pl_count').val(parseFloat(r_pl_cnt)+1);
							$('#lbl_red_pl_count').html(parseFloat(r_pl_cnt)+1);
							$('#red_pl_amt').val(parseFloat(r_pl_amt)+parseFloat(redeem_entry_val));
							$('#lbl_red_pl_amt').html(parseFloat(r_pl_amt)+parseFloat(redeem_entry_val));

							var p_pur=$('#td_id_4'+rno).text();
							var p_weight=$('#td_id_5'+rno).text();
							var p_st_weight=$('#td_id_6'+rno).text();
							var p_less=$('#td_id_7'+rno).text();
							var net_weight=$('#td_id_8'+rno).text();

							var cal_pur_per=0;
							var pl_tot_cnt=$('#add_pledge_item').val();
							for(i=0;i<pl_tot_cnt;i++)
							{
									var row_val=parseFloat($('#td_id_4'+i).text());
									if($('#rec_status'+i).val()!='R')
									{
											cal_pur_per+=row_val;
									}
							}

							 var div=Number(pl_tot_cnt)-1;
							 var new_pur1=parseFloat(cal_pur_per)/div;
							 var new_pur=new_pur1.toFixed(2);


								var t_pl_w=$('#tot_pl_weight').html();
					    	var t_pl_sw=$('#tot_stone_weight').html();
					    	var t_pl_lw=$('#tot_less_weight').html();
					    	var t_pl_nw=$('#tot_net_weight').html();

					  
					    	t_pl_w=parseFloat(t_pl_w)-parseFloat(p_weight);
					    	t_pl_sw=parseFloat(t_pl_sw)-parseFloat(p_st_weight);
					    	t_pl_lw=parseFloat(t_pl_lw)- parseFloat(p_less);
					    	t_pl_nw=parseFloat(t_pl_nw)- parseFloat(net_weight);

					    	$('#add_qual_new_loan').html(new_pur);
					    	$('#tot_pl_weight').html(parseFloat(t_pl_w).toFixed('3'));
					    	$('#tot_stone_weight').html(parseFloat(t_pl_sw).toFixed('3'));
					    	$('#tot_less_weight').html(parseFloat(t_pl_lw).toFixed('3'));
					    	$('#tot_net_weight').html(parseFloat(t_pl_nw).toFixed('3'));

					    	var count=$('#add_pledge_item').val();
					    	var cr=parseFloat( $('#current_rate').val());
							var prev_pur= $('#add_qual_new_loan').val();
							var pur_cal= parseFloat(prev_pur*count)-parseFloat(p_pur);
							var div=Number(count)-1;
							var tot_pur=parseFloat(pur_cal/div);
							
							$('#add_qual_new_loan').val(tot_pur);
							var tot=cr*(tot_pur/100);
							var tot_wt=parseFloat( tot*t_pl_nw).toFixed(2);
							$('#grm_val').html(parseFloat(Math.round(tot)).toFixed(2));
							$('#grm_val_hidden').val(parseFloat(Math.round(tot)).toFixed(2));
							$('#sale_rate').html(Math.round(tot_wt));
							$('#sale_rate_hidden').val(Math.round(tot_wt));

						}
						else
						{
							alert("Redeem error");
						}
					}
				});
			}
	</script>
	<script>
	function mj_get_int_due_details()
	{
		var baseurl = $("#baseurl").val();
		var int_grp=$('#mul_jwl_new_ln_scheme').val();
		var int_type=$('#mul_jwl_new_ln_int_type').val();
		var loan_dt=$('#r_date').val()
		// alert(loan_dt);
		$.ajax({
				type: "POST",
				url: baseurl+'Redemption/get_expiry_dt?',
				async: false,
				type: "POST",
				data: "grp="+int_grp+"&itype="+int_type+"&loan_dt="+loan_dt,
				dataType: "html",
				success: function(response)
				{
					var res=response.split('||');
	                $('#mul_jwl_new_ln_exp_dt').html(res[1]);
	                
				}	
			});
	}

	function calc_interest()
			{
				var int_per_val=$('#mul_jwl_new_ln_int_type').val();
				var cmp=$('#r_company_select').val();
				var jt=$('#mul_jwl_jewel_type').val();
				var int_grp=$('#mul_jwl_new_ln_scheme').val();
				var int_per=$('select[name=mul_jwl_new_ln_int_type]').find(':selected').text();

				var loan_amt=$('#mul_jwl_new_ln_loan_amount').val();
				$('#mul_jwl_new_ln_total_amount').html(loan_amt);
				if(cmp=="") 
				{
					alert("Select Company");
					document.getElementById('r_company_select').focus();
					$('#mul_jwl_new_ln_loan_amount').val('');
				}
				else
				{
					if(jt=="")
					{
						alert("Select Jewel Type");
						document.getElementById('mul_jwl_jewel_type').focus();
						$('#mul_jwl_new_ln_loan_amount').val('');
					}
					else
					{
						if(int_grp=="")
						{
							alert("Select Interest Scheme");
							document.getElementById('mul_jwl_new_ln_scheme').focus();
							$('#mul_jwl_new_ln_loan_amount').val('');
						}
						else
						{
							if(int_per_val=="") 
							{
								alert("Choose Interest Type first");
								document.getElementById('mul_jwl_new_ln_int_type').focus();
								$('#mul_jwl_new_ln_loan_amount').val('');
								// int_per=0;	
							}
							// alert(int_per);
							else{
								var m_interest=parseFloat(loan_amt)*parseFloat(int_per/100);
								$('#mul_jwl_new_ln_monthly_interest').html(m_interest.toFixed(2));
								var d_l_amt=parseFloat(loan_amt).toFixed(2);
								$('#mul_jwl_new_ln_total_amount').html(d_l_amt);
								

								// lbl_net_pay
								$.ajax({
									type: "POST",
									url: baseurl+'loan/get_document_charge?',
									async: false,
									type: "POST",
									data: "ln_amt="+loan_amt,
									dataType: "html",
									success: function(response)
									{	
										res=response.split('||');
										$('#mul_jwl_new_ln_doc_chg').html(res[1]);
						                $('#mul_jwl_new_ln_doc_chg_hidden').val(res[1]);
						                var dc_amt=parseFloat(res[1]);
						                var pc=parseFloat( $('#mul_jwl_new_ln_process_chg').val());
						                var np=parseFloat($('#mul_jwl_new_ln_ptr_curr_loan_net_pay').html());
						                var tot=dc_amt+pc+np;
						                
						                $('#mul_jwl_new_ln_ptr_total_amount').html(tot);
						                var fin_np=loan_amt-tot;
						                $('#mul_jwl_new_ln_topay_net_pay').html(fin_np);
						                $('#mul_jwl_fin_net_payable').html(fin_np);
						                $('#mul_jwl_ptp_net_pay').html(fin_np);
						                $('multil_jwl_ptp_bal_amount').html(fin_np);
						                $('#mul_jwl_fin_bal_amt').html(fin_np);
						                $('#m_points_ad').val(res[2]);
									}
									});


							}
						}
					}
				}
			}
	</script>
	<script>
			function select_image_1()
			{
				document.getElementById("img_1").style.border = "3px solid #ec9629";
				document.getElementById("img_2").style.border = "none";
				document.getElementById("img_3").style.border = "none";
				document.getElementById("img_4").style.border = "none";
				document.getElementById("img_5").style.border = "none";
				document.getElementById("img_6").style.border = "none";
				$('#img_selected_id').val('img_1');
			};
			function select_image_2()
			{
				document.getElementById("img_1").style.border = "none";
				document.getElementById("img_2").style.border = "3px solid #ec9629";
				document.getElementById("img_3").style.border = "none";
				document.getElementById("img_4").style.border = "none";
				document.getElementById("img_5").style.border = "none";
				document.getElementById("img_6").style.border = "none";
				$('#img_selected_id').val('img_2');
			};
			function select_image_3()
			{
				document.getElementById("img_1").style.border = "none";
				document.getElementById("img_2").style.border = "none";
				document.getElementById("img_3").style.border = "3px solid #ec9629";
				document.getElementById("img_4").style.border = "none";
				document.getElementById("img_5").style.border = "none";
				document.getElementById("img_6").style.border = "none";
				$('#img_selected_id').val('img_3');
			};
			function select_image_4()
			{
				document.getElementById("img_1").style.border = "none";
				document.getElementById("img_2").style.border = "none";
				document.getElementById("img_3").style.border = "none";
				document.getElementById("img_4").style.border = "3px solid #ec9629";
				document.getElementById("img_5").style.border = "none";
				document.getElementById("img_6").style.border = "none";
				$('#img_selected_id').val('img_4');
			};
			function select_image_5()
			{
				document.getElementById("img_1").style.border = "none";
				document.getElementById("img_2").style.border = "none";
				document.getElementById("img_3").style.border = "none";
				document.getElementById("img_4").style.border = "none";
				document.getElementById("img_5").style.border = "3px solid #ec9629";
				document.getElementById("img_6").style.border = "none";
				$('#img_selected_id').val('img_5');
			};
			function select_image_6()
			{
				document.getElementById("img_1").style.border = "none";
				document.getElementById("img_2").style.border = "none";
				document.getElementById("img_3").style.border = "none";
				document.getElementById("img_4").style.border = "none";
				document.getElementById("img_5").style.border = "none";
				document.getElementById("img_6").style.border = "3px solid #ec9629";
				$('#img_selected_id').val('img_6');
			};
		</script>		
		<script language="JavaScript">
		    

		    function take_jewel_photo()

		    {
		    	// alert("hi");
		    	Webcam.set({
		        width: 494,
		        height: 330,
		        image_format: 'jpeg',
		        jpeg_quality: 90
		    	});
		  		Webcam.attach('#my_camera');
		  		document.getElementById('take_jewel_photo1').style.display="none";
		  		document.getElementById('capture').style.display="block";
		  		// document.getElementById('my_camera').style.display="block";
		        // document.getElementById('results').style.display="none";
		    }
		  
		    function jewel_snapshot() 
		    {
		    	// alert("hi");
		    	var cnt=Number($("#img_count").val());
		        	// alert(cnt);
		      //   Webcam.start('#my_camera')
					   // .then(result =>{
					   //    console.log("webcam started");
					   // })
					   // .catch(err => {
					   //     console.log(err);
					   // });
		        Webcam.snap( function(data_uri) {
		        	if(cnt<=6)
		        	{
			            // $(".image-tag").val(data_uri);
			            document.getElementById('img_'+cnt).innerHTML = '<img src="'+data_uri+'" id="jewel_photo_'+cnt+'" name="jewel_photo_'+cnt+'" height="150" width="150" />';
			            document.getElementById('img_'+cnt+'_data').innerHTML=data_uri;

			            // document.getElementById('party_photo_data').innerHTML =data_uri;
			            // document.getElementById('my_camer	a').style.display="none";
			            // document.getElementById('results').style.display="block";
			            document.getElementById('take_jewel_photo1').style.display="block";
			            document.getElementById('capture').style.display="none";
			            $("#img_count").val(Number(cnt)+1);
			            Webcam.reset('#my_camera');
		            }
		            else
		            {
		            	alert("Choose anyone image from 6 images");

		            }

		        } );
		    }
		    function put_capture_jewel_photo()
		    {
		    	var sel_id=$('#img_selected_id').val();
		    	// alert(sel_id);

		    	var img_data=$('#'+sel_id+'_data').val();
		    	// alert(img_data);
		    	document.getElementById('load_image_selected').innerHTML='<img src="'+img_data+'" id="loan_jewel_photo" name="loan_jewel_photo" height="125" width="125" />';
		    	document.getElementById('loan_jewel_image_data').innerHTML=img_data;
		    	// $('#kt_modal_camera').removeClass('show');
		    	// $('.modal-backdrop').removeClass('show');
		    	$('#kt_modal_camera').hide();
					$('.modal-backdrop').hide();
					var $body = $(document.body);
					$body.css("overflow", "auto");
					$body.width("auto");
		    	// document.getElementById('pledge_item').focus();
		    }
		    
		</script>
		<script>
		function payment_receive_calc()
		{
			var c=parseFloat($('#p_receive_cash').val());
			var ch=parseFloat($('#p_receive_cheque_amount').val());
			var rt=parseFloat($('#p_receive_rtgs_amount').val());
			var up=parseFloat($('#p_receive_upi_amount').val());
			var mc=parseFloat($('#mem_card_redeem_points').val());

			var rc_tot=parseFloat($('#lbl_tot_to_rcv').html());
			if(c=='') c=0;
			if(ch=='') ch=0;
			if(rt=='') rt=0;
			if(up=='') up=0;
			if(mc=='') mc=0;
			if(mc>0)
			{
				var mcp=parseFloat($('#mem_card_points').html());
				if(mc>mcp)
				{
					alert("Enter value less than Available Points");
					$('#mem_card_redeem_points').val('0');
					mc=0;
					document.getElementById("mem_card_redeem_points").focus();
				}
			}
			// alert(c);
			var tot= c+ch+rt+up+mc;


			// alert(tot);
			$('#lbl_ptr_paid_amt').html(tot);
			
			var diff=rc_tot - parseFloat(tot);
			$('#lbl_ptr_bal_amt').html(diff);
			// alert(diff);
		}

		</script>
		<script >
		function receive_from_party()
		{
			var cash_loan_received_add_radio = document.getElementById("cash_loan_received_add_radio");
			var cheque_loan_received_add_radio = document.getElementById("cheque_loan_received_add_radio");
			var rtgs_loan_received_add_radio = document.getElementById("rtgs_loan_received_add_radio");
			var upi_loan_received_add_radio = document.getElementById("upi_loan_received_add_radio");
			var mem_card_loan_received_add_radio = document.getElementById("mem_card_loan_received_add_radio");

			var tot_to_rec=parseFloat($('#lbl_tot_to_rcv').html());
			// alert(tot_to_rec);
			var cash_status=0;
			var chq_status=0;
			var rtgs_status=0;
			var upi_status=0;
			var bal=parseFloat($('#lbl_ptr_bal_amt').html());

			if(bal==0)
			{
				if(cash_loan_received_add_radio.checked)
				{
					var pay_type='Cash';
					var pay_amt=parseFloat($('#p_receive_cash').val());
					var pay_amt1=parseFloat($('#p_receive_cheque_amount').val());
					var pay_amt2=parseFloat($('#p_receive_rtgs_amount').val());
					var pay_amt3=parseFloat($('#p_receive_upi_amount').val());
					var pay_amt4=parseFloat($('#mem_card_redeem_points').val());
					var pay_details=$('#p_receive_cash_details').val();
					var p_bank='';
					var ref_no='';
					var c_bank='';
					var p_bill_no=$('#redemp_bill_no').val();
					var p_pid=$('#r_pid').val();
	     			
	     			var datastring="pay_type="+pay_type+"&pay_amt="+pay_amt+"&pay_details="+pay_details+"&p_bank="+p_bank+"&ref_no="+ref_no+"&c_bank="+c_bank+"&p_bill_no="+p_bill_no+"&p_pid="+p_pid;

	     			if(pay_amt=='' || pay_amt==0 || pay_details=='')
	     			{
	     				alert("Please fill all the fields");
	     				return false;
	     			}
	     			var tot=pay_amt+pay_amt1+pay_amt2+pay_amt3+pay_amt4;

	     			if(tot>tot_to_rec)
	     			{
	     				alert("Enter value less than total amount");
	     				document.getElementById('p_receive_cash').focus();
	     			}
	     			else
	     			{
						$.ajax({
							type: "POST",
							url: baseurl+'redemption/receive_from_party?',
							async: false,
							type: "POST",
							data: datastring,
							dataType: "html",
							success: function(response)
							{	
								 cash_status= 1;
							}
							});
					}
				}
				if(cheque_loan_received_add_radio.checked)
				{
					var pay_type='Cheque';
					var pay_amt=parseFloat($('#p_receive_cheque_amount').val());
					var pay_amt1=parseFloat($('#p_receive_cash').val());
					var pay_amt2=parseFloat($('#p_receive_rtgs_amount').val());
					var pay_amt3=parseFloat($('#p_receive_upi_amount').val());
					var pay_amt4=parseFloat($('#mem_card_redeem_points').val());
					var pay_details=$('#p_receive_cheque_details').val();
					var p_bank=$('#p_receive_cheque_party_bank').val();
					var ref_no=$('#p_receive_cheque_ref_no').val();
					var c_bank='';
					var p_bill_no=$('#redemp_bill_no').val();
					var p_pid=$('#r_pid').val();
	     			
	     			var datastring="pay_type="+pay_type+"&pay_amt="+pay_amt+"&pay_details="+pay_details+"&p_bank="+p_bank+"&ref_no="+ref_no+"&c_bank="+c_bank+"&p_bill_no="+p_bill_no+"&p_pid="+p_pid;
	     			var tot=pay_amt+pay_amt1+pay_amt2+pay_amt3+pay_amt4;

	     			if(tot>tot_to_rec)
	     			{
	     				alert("Enter value less than total amount");
	     				document.getElementById('p_receive_cheque_amount').focus();
	     			}
	     			else
	     			{
						$.ajax({
							type: "POST",
							url: baseurl+'redemption/receive_from_party?',
							async: false,
							type: "POST",
							data: datastring,
							dataType: "html",
							success: function(response)
							{	
								 chq_status= 1;
							}
							});
					}
				}
				if(rtgs_loan_received_add_radio.checked)
				{
					var pay_type='RTGS';
					var pay_amt=parseFloat($('#p_receive_rtgs_amount').val());
					var pay_amt1=parseFloat($('#p_receive_cash').val());
					var pay_amt2=parseFloat($('#p_receive_cheque_amount').val());
					var pay_amt3=parseFloat($('#p_receive_upi_amount').val());
					var pay_amt4=parseFloat($('#mem_card_redeem_points').val());
					var pay_details=$('#pay_to_party_rtgs_details').val();
					var p_bank='';
					var ref_no=$('#p_receive_rtgs_ref_no').val();
					var c_bank=$('#p_receive_rtgs_company_bank').val();
					var p_bill_no=$('#redemp_bill_no').val();
					var p_pid=$('#r_pid').val();
	     			
	     			var datastring="pay_type="+pay_type+"&pay_amt="+pay_amt+"&pay_details="+pay_details+"&p_bank="+p_bank+"&ref_no="+ref_no+"&c_bank="+c_bank+"&p_bill_no="+p_bill_no+"&p_pid="+p_pid;
	     			var tot=pay_amt+pay_amt1+pay_amt2+pay_amt3+pay_amt4;

	     			if(tot>tot_to_rec)
	     			{
	     				alert("Enter value less than total amount");
	     				document.getElementById('p_receive_rtgs_amount').focus();
	     			}
	     			else
	     			{
						$.ajax({
							type: "POST",
							url: baseurl+'redemption/receive_from_party?',
							async: false,
							type: "POST",
							data: datastring,
							dataType: "html",
							success: function(response)
							{	
								 rtgs_status= 1;
							}
							});
					}
				}
				if(upi_loan_received_add_radio.checked)
				{
					var pay_type='UPI';
					var pay_amt=parseFloat($('#p_receive_upi_amount').val());
					var pay_details=$('#p_receive_upi_details').val();
					var pay_amt1=parseFloat($('#p_receive_cash').val());
					var pay_amt2=parseFloat($('#p_receive_cheque_amount').val());
					var pay_amt3=parseFloat($('#p_receive_rtgs_amount').val());
					var pay_amt4=parseFloat($('#mem_card_redeem_points').val());
					var p_bank='';
					var ref_no=$('#p_receive_upi_ref_no').val();
					var c_bank=$('#p_receive_upi_company_bank').val();
					var p_bill_no=$('#redemp_bill_no').val();
					var p_pid=$('#r_pid').val();
	     			
	     			var datastring="pay_type="+pay_type+"&pay_amt="+pay_amt+"&pay_details="+pay_details+"&p_bank="+p_bank+"&ref_no="+ref_no+"&c_bank="+c_bank+"&p_bill_no="+p_bill_no+"&p_pid="+p_pid;
	     			var tot=pay_amt+pay_amt1+pay_amt2+pay_amt3+pay_amt4;

	     			if(tot>tot_to_rec)
	     			{
	     				alert("Enter value less than total amount");
	     				document.getElementById('p_receive_upi_amount').focus();
	     			}
	     			else
	     			{
						$.ajax({
							type: "POST",
							url: baseurl+'redemption/receive_from_party?',
							async: false,
							type: "POST",
							data: datastring,
							dataType: "html",
							success: function(response)
							{	
								 upi_status= 1;
							}
							});
					}
				}
				if(mem_card_loan_received_add_radio.checked)
				{
					var pay_type='Membership Card';
					var pay_amt=parseFloat($('#mem_card_redeem_points').val());
					var pay_details=$('#mem_card_details').val();
					var pay_amt1=parseFloat($('#p_receive_cash').val());
					var pay_amt2=parseFloat($('#p_receive_cheque_amount').val());
					var pay_amt3=parseFloat($('#p_receive_rtgs_amount').val());
					var pay_amt4=parseFloat($('#p_receive_upi_amount').val());
					var p_bank='';
					var ref_no=$('#mem_card_no').val();
					var c_bank='';
					var p_bill_no=$('#redemp_bill_no').val();
					var p_pid=$('#r_pid').val();
	     			
	     			var datastring="pay_type="+pay_type+"&pay_amt="+pay_amt+"&pay_details="+pay_details+"&p_bank="+p_bank+"&ref_no="+ref_no+"&c_bank="+c_bank+"&p_bill_no="+p_bill_no+"&p_pid="+p_pid;
	     			var tot=pay_amt+pay_amt1+pay_amt2+pay_amt3+pay_amt4;

	     			if(tot>tot_to_rec)
	     			{
	     				alert("Enter value less than total amount");
	     				document.getElementById('mem_card_redeem_points').focus();
	     			}
	     			else
	     			{
						$.ajax({
							type: "POST",
							url: baseurl+'redemption/receive_from_party?',
							async: false,
							type: "POST",
							data: datastring,
							dataType: "html",
							success: function(response)
							{	
								 mem_card_status= 1;
								 $.ajax({
									type: "POST",
									url: baseurl+'redemption/redeem_mem_points?',
									async: false,
									type: "POST",
									data: "pid="+p_pid+"&points="+pay_amt+"&mem_card="+ref_no+"&bill_no="+p_bill_no,
									dataType: "html",
									success: function(response)
									{
										alert("mem point Deducted");
									}
								});
							}	
						});
					}
				}
			}
			else
			{
				alert("Still balance amount exists");
				document.getElementById('btn_deduct').style.display="block";
			}
			
			if(cash_status==1 || chq_status==1 || rtgs_status==1 || upi_status==1 || mem_card_status=1)
			{
				if(bal==0)
				{
					document.getElementById('btn_deduct').style.display="none";	
					alert("Amount to Receive from Party as Separate Deducted");
					document.getElementById('btn_receive_payment').style.display="none";
					// $('#kt_modal_payment_to_receive').removeClass('show');
					// $('.modal-backdrop').removeClass('show');
					$('#kt_modal_payment_to_receive').hide();
					$('.modal-backdrop').hide();
					var $body = $(document.body);
					$body.css("overflow", "auto");
					$body.width("auto");
				}
			}
			
		}
		</script>

<script>
			function cash_cus_tr_pdfrm_party_add_radio()
			{
				var cash_loan_received_add_radio = document.getElementById("cash_cus_transfer_paid_from_party_add_radio");

				var cash_label = document.getElementById("cus_tr_cash_party_label");
				var cash_label_tbox = document.getElementById("cus_tr_cash_party_label_tbox");
				var cash_detail_tbox = document.getElementById("cus_tr_cash_party_detail_tbox");

				if (cash_loan_received_add_radio.checked)
				{
				    cash_label.style.display = "block";
				    cash_label_tbox.style.display = "block";
				    cash_detail_tbox.style.display = "block";
			  	} else 
			  	{
			  		cash_label.style.display = "none";
			  		cash_label_tbox.style.display = "none";
			  		cash_detail_tbox.style.display = "none";
			  	}
			};

			function cheque_cus_tr_pdfrm_party_add_radio()
			{
				var cheque_loan_received_add_radio = document.getElementById("cheque_cus_transfer_paid_from_party_add_radio");

				var cheque_amt = document.getElementById("cus_tr_cheque_party_amt");
				var cheque_amt_tbox = document.getElementById("cus_tr_cheque_party_amt_tbox");
				// var cheque_bank = document.getElementById("cheque_bank");
				var cheque_bank_tbox = document.getElementById("cus_tr_cheque_party_bank_tbox");
				// var cheque_chq_no = document.getElementById("cheque_chq_no");
				var cheque_chq_no_tbox = document.getElementById("cus_tr_cheque_party_chq_no_tbox");
				// var cheque_detail = document.getElementById("cheque_detail");
				var cheque_detail_tbox = document.getElementById("cus_tr_cheque_party_detail_tbox");

				if (cheque_loan_received_add_radio.checked)
				{
				    cheque_amt.style.display = "block";
				    cheque_amt_tbox.style.display = "block";
				    // cheque_bank.style.display = "block";
				    cheque_bank_tbox.style.display = "block";
				    // cheque_chq_no.style.display = "block";
				    cheque_chq_no_tbox.style.display = "block";
				    // cheque_detail.style.display = "block";
				    cheque_detail_tbox.style.display = "block";
			  	} else 
			  	{
			     	cheque_amt.style.display = "none";
				    cheque_amt_tbox.style.display = "none";
				    // cheque_bank.style.display = "none";
				    cheque_bank_tbox.style.display = "none";
				    // cheque_chq_no.style.display = "none";
				    cheque_chq_no_tbox.style.display = "none";
				    // cheque_detail.style.display = "none";
				    cheque_detail_tbox.style.display = "none";
			  	}
			};

			function rtgs_cus_tr_pdfrm_party_add_radio()
			{
				var rtgs_loan_received_add_radio = document.getElementById("rtgs_cus_transfer_paid_from_party_add_radio");

				var rtgs_amt = document.getElementById("cus_tr_rtgs_party_amt");
				var rtgs_amt_tbox = document.getElementById("cus_tr_rtgs_party_amt_tbox");
				// var rtgs_bank = document.getElementById("rtgs_bank");
				var rtgs_bank_tbox = document.getElementById("cus_tr_rtgs_party_no_tbox");
				// var rtgs_no = document.getElementById("rtgs_no");
				var rtgs_no_tbox = document.getElementById("cus_tr_rtgs_party_bank_tbox");
				// var rtgs_detail = document.getElementById("rtgs_detail");
				var rtgs_detail_tbox = document.getElementById("cus_tr_rtgs_party_detail_tbox");

				if (rtgs_loan_received_add_radio.checked == true)
				{
				    rtgs_amt.style.display = "block";
				    rtgs_amt_tbox.style.display = "block";
				    // rtgs_bank.style.display = "block";
				    rtgs_bank_tbox.style.display = "block";
				    // rtgs_no.style.display = "block";
				    rtgs_no_tbox.style.display = "block";
				    // rtgs_detail.style.display = "block";
				    rtgs_detail_tbox.style.display = "block";
			  	} else 
			  	{
			     	rtgs_amt.style.display = "none";
				    rtgs_amt_tbox.style.display = "none";
				    // rtgs_bank.style.display = "none";
				    rtgs_bank_tbox.style.display = "none";
				    // rtgs_no.style.display = "none";
				    rtgs_no_tbox.style.display = "none";
				    // rtgs_detail.style.display = "none";
				    rtgs_detail_tbox.style.display = "none";
			  	}
			};

			function upi_cus_tr_pdfrm_party_add_radio()
			{
				var upi_loan_received_add_radio = document.getElementById("upi_cus_transfer_paid_from_party_add_radio");

				var upi_amt = document.getElementById("cus_tr_upi_party_amt");
				var upi_amt_tbox = document.getElementById("cus_tr_upi_party_amt_tbox");
				// var upi_trans_no = document.getElementById("upi_trans_no");
				var upi_trans_no_tbox = document.getElementById("cus_tr_upi_party_trans_no_tbox");
				var upi_bank_tbox = document.getElementById("cus_tr_upi_party_bank_tbox");
				var upi_detail_tbox = document.getElementById("cus_tr_upi_party_detail_tbox");

				if (upi_loan_received_add_radio.checked == true)
				{
				    upi_amt.style.display = "block";
				    upi_amt_tbox.style.display = "block";
				    // upi_trans_no.style.display = "block";
				    upi_trans_no_tbox.style.display = "block";
				    upi_bank_tbox.style.display = "block";
				    upi_detail_tbox.style.display = "block";
			  	} else 
			  	{
			     	upi_amt.style.display = "none";
				    upi_amt_tbox.style.display = "none";
				    // upi_trans_no.style.display = "none";
				    upi_trans_no_tbox.style.display = "none";
				    upi_bank_tbox.style.display = "none";
				    upi_detail_tbox.style.display = "none";
			  	}
			}
			function mcard_cus_tr_pdfrm_party_add_radio()
			{
				var mem_card_loan_received_add_radio = document.getElementById("mcard_cus_transfer_paid_from_party_add_radio");
				var mem_card_no = document.getElementById("cus_tr_card_no_paid_from_pty");
				var mem_card_no_tbox = document.getElementById("cus_tr_card_no_paid_from_pty_tbox");
				// var mem_card_trans_no = document.getElementById("mem_card_trans_no");
				var mem_card_avail_points_tbox = document.getElementById("cus_tr_points_paid_from_pty");
				var mem_card_redeem_tbox = document.getElementById("cus_tr_redeem_paid_from_pty_tbox");
				var mem_card_details_tbox = document.getElementById("cus_tr_mcard_detail_paid_from_pty_tbox");

				if (mem_card_loan_received_add_radio.checked == true)
				{
				    mem_card_no.style.display = "block";
				    mem_card_no_tbox.style.display = "block";
				    mem_card_avail_points_tbox.style.display = "block";
				    mem_card_redeem_tbox.style.display = "block";
				    mem_card_details_tbox.style.display = "block";
			  	} else 
			  	{
			     	mem_card_no.style.display = "none";
				    mem_card_no_tbox.style.display = "none";
				    mem_card_avail_points_tbox.style.display = "none";
				    mem_card_redeem_tbox.style.display = "none";
				    mem_card_details_tbox.style.display = "none";
			  	}
			}

			function chit_cus_tr_pdfrm_party_add_radio()
			{
				var chit_cus_close_paid_from_party_add_radio = document.getElementById("chit_cus_transfer_paid_from_party_add_radio");
				var cus_cl_sch_paid_from_pty = document.getElementById("cus_tr_sch_paid_from_pty");
				var cus_cl_sch_paid_from_pty_tbox = document.getElementById("cus_tr_sch_paid_from_pty_tbox");
				var cus_cl_avai_bal_paid_from_pty = document.getElementById("cus_tr_avai_bal_paid_from_pty");
				var cus_cl_redeem_amt_paid_from_pty_tbox = document.getElementById("cus_tr_redeem_amt_paid_from_pty_tbox");
				var cus_cl_redeem_detail_paid_from_pty_tbox = document.getElementById("cus_tr_redeem_detail_paid_from_pty_tbox");

				if (chit_cus_close_paid_from_party_add_radio.checked == true)
				{
				    cus_cl_sch_paid_from_pty.style.display = "block";
				    cus_cl_sch_paid_from_pty_tbox.style.display = "block";
				    cus_cl_avai_bal_paid_from_pty.style.display = "block";
				    cus_cl_redeem_amt_paid_from_pty_tbox.style.display = "block";
				    cus_cl_redeem_detail_paid_from_pty_tbox.style.display = "block";
			  	} else 
			  	{
			     	cus_cl_sch_paid_from_pty.style.display = "none";
				    cus_cl_sch_paid_from_pty_tbox.style.display = "none";
				    cus_cl_avai_bal_paid_from_pty.style.display = "none";
				    cus_cl_redeem_amt_paid_from_pty_tbox.style.display = "none";
				    cus_cl_redeem_detail_paid_from_pty_tbox.style.display = "none";
			  	}
			}

			
		</script>

		<!-- Pledge item image capture -->
		<script>
			function pl_select_image_1()
			{
				document.getElementById("pl_img_1").style.border = "3px solid #ec9629";
				document.getElementById("pl_img_2").style.border = "none";
				document.getElementById("pl_img_3").style.border = "none";
				document.getElementById("pl_img_4").style.border = "none";
				document.getElementById("pl_img_5").style.border = "none";
				document.getElementById("pl_img_6").style.border = "none";
				$('#pl_img_selected_id').val('pl_img_1');
			};
			function pl_select_image_2()
			{
				document.getElementById("pl_img_1").style.border = "none";
				document.getElementById("pl_img_2").style.border = "3px solid #ec9629";
				document.getElementById("pl_img_3").style.border = "none";
				document.getElementById("pl_img_4").style.border = "none";
				document.getElementById("pl_img_5").style.border = "none";
				document.getElementById("pl_img_6").style.border = "none";
				$('#pl_img_selected_id').val('pl_img_2');
			};
			function pl_select_image_3()
			{
				document.getElementById("pl_img_1").style.border = "none";
				document.getElementById("pl_img_2").style.border = "none";
				document.getElementById("pl_img_3").style.border = "3px solid #ec9629";
				document.getElementById("pl_img_4").style.border = "none";
				document.getElementById("pl_img_5").style.border = "none";
				document.getElementById("pl_img_6").style.border = "none";
				$('#pl_img_selected_id').val('pl_img_3');
			};
			function pl_select_image_4()
			{
				document.getElementById("pl_img_1").style.border = "none";
				document.getElementById("pl_img_2").style.border = "none";
				document.getElementById("pl_img_3").style.border = "none";
				document.getElementById("pl_img_4").style.border = "3px solid #ec9629";
				document.getElementById("pl_img_5").style.border = "none";
				document.getElementById("pl_img_6").style.border = "none";
				$('#pl_img_selected_id').val('pl_img_4');
			};
			function pl_select_image_5()
			{
				document.getElementById("pl_img_1").style.border = "none";
				document.getElementById("pl_img_2").style.border = "none";
				document.getElementById("pl_img_3").style.border = "none";
				document.getElementById("pl_img_4").style.border = "none";
				document.getElementById("pl_img_5").style.border = "3px solid #ec9629";
				document.getElementById("pl_img_6").style.border = "none";
				$('#pl_img_selected_id').val('pl_img_5');
			};
			function pl_select_image_6()
			{
				document.getElementById("pl_img_1").style.border = "none";
				document.getElementById("pl_img_2").style.border = "none";
				document.getElementById("pl_img_3").style.border = "none";
				document.getElementById("pl_img_4").style.border = "none";
				document.getElementById("pl_img_5").style.border = "none";
				document.getElementById("pl_img_6").style.border = "3px solid #ec9629";
				$('#pl_img_selected_id').val('pl_img_6');
			};
		</script>
		<script language="JavaScript">
		    

		    function pl_take_jewel_photo()

		    {
		    	// alert("hi");
		    	Webcam.set({
		        width: 494,
		        height: 330,
		        image_format: 'jpeg',
		        jpeg_quality: 90
		    	});
		  		Webcam.attach('#pl_my_camera');
		  		document.getElementById('pl_take_jewel_photo1').style.display="none";
		  		document.getElementById('pl_capture').style.display="block";
		  		// document.getElementById('my_camera').style.display="block";
		        // document.getElementById('results').style.display="none";
		    }
		  
		    function pl_jewel_snapshot() {
		    	// alert("hi");
		    	var cnt=Number($("#pl_img_count").val());
		        	// alert(cnt);
		      //   Webcam.start('#my_camera')
					   // .then(result =>{
					   //    console.log("webcam started");
					   // })
					   // .catch(err => {
					   //     console.log(err);
					   // });
		        Webcam.snap( function(data_uri) {
		        	if(cnt<=6)
		        	{
			            // $(".image-tag").val(data_uri);
			            document.getElementById('pl_img_'+cnt).innerHTML = '<img src="'+data_uri+'" id="pl_jewel_photo_'+cnt+'" name="pl_jewel_photo_'+cnt+'" height="150" width="150" />';
			            document.getElementById('pl_img_'+cnt+'_data').innerHTML=data_uri;

			            // document.getElementById('party_photo_data').innerHTML =data_uri;
			            // document.getElementById('my_camer	a').style.display="none";
			            // document.getElementById('results').style.display="block";
			            document.getElementById('pl_take_jewel_photo1').style.display="block";
			            document.getElementById('pl_capture').style.display="none";
			            $("#pl_img_count").val(Number(cnt)+1);
			            Webcam.reset('#pl_my_camera');
		            }
		            else
		            {
		            	alert("Choose anyone image from 6 images");
		            	
		            }

		        } );
		    }
		    function pl_put_capture_jewel_photo()
		    {
		    	var sel_id=$('#pl_img_selected_id').val();
		    	// alert(sel_id);

		    	var img_data=$('#'+sel_id+'_data').val();
		    	alert(img_data);
		    	document.getElementById('pl_load_image_selected').innerHTML='<img src="'+img_data+'" id="pl_loan_jewel_photo" name="pl_loan_jewel_photo" height="40" width="40" />';
		    	document.getElementById('pl_loan_jewel_image_data').innerHTML=img_data;
		    	document.getElementById('pledge_item').focus();
		    	// $('#kt_modal_camera_pledge').removeClass('show');
		    	// $('.modal-backdrop').removeClass('show');
		    	$('#kt_modal_camera_pledge').hide();
					$('.modal-backdrop').hide();
					var $body = $(document.body);
					$body.css("overflow", "auto");
					$body.width("auto");
		    	
		    }
		    
		</script>

		<script >
	function redemption_validation()
	{
		var err=0;
		var bill_no= $('#redemp_bill_no').val();
		
		if(bill_no=="")
		{
			$('#redemp_bill_no_err').html('Enter Redemption Bill No');
			err++;
			document.getElementById("redemp_bill_no").focus();

		}
		else
		{
			$('#redemp_bill_no_err').html('');
			var cmp=$('#r_company_select').val();
			if(cmp=='')
			{
				$('#r_company_select_err').html('Select a Company');
				document.getElementById("r_company_select").focus();
				err++;	
			}
			else
			{
				$('#r_company_select_err').html('');
			}
			var cus_cls=document.getElementById('redp_cus_c_radio_val');
			var cus_tran=document.getElementById('redp_cus_t_radio_val');
			var cmp_cls=document.getElementById('redp_cmy_c_radio_val');
			var cus_sl=document.getElementById('redp_cmy_sl_radio_val');
			var mul_jwl=document.getElementById('redp_mul_jl_radio_val');

			//check closing option selected or not
			if(cus_cls.checked==false && cus_tran.checked==false && cmp_cls.checked==false && cus_sl.checked==false && mul_jwl.checked==false)
			{
				alert("Select one closing option");
				document.getElementById('save_changes_add_new_loan').style.display="none";
				err++;
			}

			//customer close pattern selected validate this
			if(cus_cls.checked==true)
			{

				// alert("customer_close");
				document.getElementById('save_changes_add_new_loan').style.display="block";
				var cls_by=$('#cus_close_closed_by').val();
				var cls_name=$('#cust_cls_by_others').val();

				if(cls_by=='nominee')
				{
					if(cls_name=='')
					{
						$('#cust_cls_by_others_err').html('Enter Nominee Name');
						err++;
					}
					else
					{
						$('#cust_cls_by_others_err').html('');
					}
				}
				else if(cls_by=='others')
				{
					if(cls_name=='')
					{
						$('#cust_cls_by_others_err').html('Enter Others Name');
						err++;
					}
					else
					{
						$('#cust_cls_by_others_err').html('');
					}
				}

				//party payment details - cash
				var chk=document.getElementById('cash_cus_close_paid_from_party_add_radio');
				if(chk.checked==true)
				{
					var amt=$('#cust_cls_ppcash_amt').val();
					if(amt==0 || amt=='')
					{
						$('#cust_cls_ppcash_amt_err').html('Enter a value');
						document.getElementById("cust_cls_ppcash_amt").focus();
						err++;
					}
					else
					{
						$('#cust_cls_ppcash_amt_err').html('');
					}

					var det=$('#cust_cls_ppcash_details').val();
					if(det=='')
					{
						$('#cust_cls_ppcash_details_err').html('Enter Remarks');
						document.getElementById("cust_cls_ppcash_details").focus();
						err++;
					}
					else
					{
						$('#cust_cls_ppcash_details_err').html('');
					}
						
				}
				//party payment details - cheque
				var chk=document.getElementById('cheque_cus_close_paid_from_party_add_radio');
				if(chk.checked==true)
				{
					var amt=$('#cust_cls_ppchq_amt').val();
					if(amt==0 || amt=='')
					{
						$('#cust_cls_ppchq_amt_err').html('Enter a value');
						document.getElementById("cust_cls_ppchq_amt").focus();
						err++;
					}
					else
					{
						$('#cust_cls_ppchq_amt_err').html('');
					}

					var bank=$('#cust_cls_ppchq_party_bank').val();
					if(bank=='')
					{
						$('#cust_cls_ppchq_party_bank_err').html('Select a bank');
						document.getElementById("cust_cls_ppchq_party_bank").focus();
						err++;
					}
					else
					{
						$('#cust_cls_ppchq_party_bank_err').html('');
					}

					var chq_no=$('#cust_cls_ppchq_ref_no').val();
					if(chq_no=='')
					{
						$('#cust_cls_ppchq_ref_no_err').html('Enter cheque number');
						document.getElementById("cust_cls_ppchq_ref_no").focus();
						err++;
					}
					else
					{
						$('#cust_cls_ppchq_ref_no_err').html('');
					}

					var det=$('#cust_cls_ppchq_details').val();
					if(det=='')
					{
						$('#cust_cls_ppchq_details_err').html('Enter Remarks');
						document.getElementById("cust_cls_ppchq_details").focus();
						err++;
					}
					else
					{
						$('#cust_cls_ppchq_details_err').html('');
					}
				}
				//party payment details - RTGS
				var chk=document.getElementById('rtgs_cus_close_paid_from_party_add_radio');
				if(chk.checked==true)
				{
					var amt=$('#cust_cls_pprtgs_amount').val();
					if(amt==0 || amt=='')
					{
						$('#cust_cls_pprtgs_amount_err').html('Enter a value');
						document.getElementById("cust_cls_pprtgs_amount").focus();
						err++;
					}
					else
					{
						$('#cust_cls_pprtgs_amount_err').html('');
					}

					var bank=$('#cust_cls_pprtgs_company_bank').val();
					if(bank=='')
					{
						$('#cust_cls_pprtgs_company_bank_err').html('Select a bank');
						document.getElementById("cust_cls_pprtgs_company_bank").focus();
						err++;
					}
					else
					{
						$('#cust_cls_pprtgs_company_bank_err').html('');
					}

					var chq_no=$('#cust_cls_pprtgs_ref_no').val();
					if(chq_no=='')
					{
						$('#cust_cls_pprtgs_ref_no_err').html('Enter cheque number');
						document.getElementById("cust_cls_pprtgs_ref_no").focus();
						err++;
					}
					else
					{
						$('#cust_cls_pprtgs_ref_no_err').html('');
					}

					var det=$('#cust_cls_pprtgs_details').val();
					if(det=='')
					{
						$('#cust_cls_pprtgs_details_err').html('Enter Remarks');
						document.getElementById("cust_cls_pprtgs_details").focus();
						err++;
					}
					else
					{
						$('#cust_cls_pprtgs_details_err').html('');
					}
				}
				//party payment details - UPI
				var chk=document.getElementById('upi_cus_close_paid_from_party_add_radio');
				if(chk.checked==true)
				{
					var amt=$('#cust_cls_ppupi_amount').val();
					if(amt==0 || amt=='')
					{
						$('#cust_cls_ppupi_amount_err').html('Enter a value');
						document.getElementById("cust_cls_ppupi_amount").focus();
						err++;
					}
					else
					{
						$('#cust_cls_ppupi_amount_err').html('');
					}

					var bank=$('#cust_cls_ppupi_company_bank').val();
					if(bank=='')
					{
						$('#cust_cls_ppupi_company_bank_err').html('Select a bank');
						document.getElementById("cust_cls_ppupi_company_bank").focus();
						err++;
					}
					else
					{
						$('#cust_cls_ppupi_company_bank_err').html('');
					}

					var chq_no=$('#cust_cls_ppupi_ref_no').val();
					if(chq_no=='')
					{
						$('#cust_cls_ppupi_ref_no_err').html('Enter cheque number');
						document.getElementById("cust_cls_ppupi_ref_no").focus();
						err++;
					}
					else
					{
						$('#cust_cls_ppupi_ref_no_err').html('');
					}

					var det=$('#cust_cls_ppupi_details').val();
					if(det=='')
					{
						$('#cust_cls_ppupi_details_err').html('Enter Remarks');
						document.getElementById("cust_cls_ppupi_details").focus();
						err++;
					}
					else
					{
						$('#cust_cls_ppupi_details_err').html('');
					}
				}
				//party payment details - Mem. Card
				var chk=document.getElementById('mcard_cus_close_paid_from_party_add_radio');
				if(chk.checked==true)
				{
					var amt=$('#cust_cls_ppmem_red_points').val();
					if(amt==0 || amt=='')
					{
						$('#cust_cls_ppmem_red_points_err').html('Enter a value');
						document.getElementById("cust_cls_ppmem_red_points").focus();
						err++;
					}
					else
					{
						$('#cust_cls_ppmem_red_points_err').html('');
					}

					var det=$('#cust_cls_ppmem_details').val();
					if(det=='')
					{
						$('#cust_cls_ppmem_details_err').html('Enter Remarks');
						document.getElementById("cust_cls_ppmem_details").focus();
						err++;
					}
					else
					{
						$('#cust_cls_ppmem_details_err').html('');
					}
				}
				
			}
			else if(cus_tran.checked==true)
			{
				// alert("customer_transfer");

				document.getElementById('save_changes_add_new_loan').style.display="block";

				var cls_by=$('#cus_trans_closed_by').val();
				var cls_name=$('#cust_trans_by_others').val();
				// alert("cls_by");

				if(cls_by=='nominee')
				{
					if(cls_name=='')
					{
						$('#cust_trans_by_others_err').html('Enter Nominee Name');
						err++;
					}
					else
					{
						$('#cust_trans_by_others_err').html('');
					}
				}
				else if(cls_by=='others')
				{
					if(cls_name=='')
					{
						$('#cust_trans_by_others_err').html('Enter Others Name');
						err++;
					}
					else
					{
						$('#cust_trans_by_others_err').html('');
					}
				}
				// alert("cls_name");

				var pay_amt=$('#cust_trans_payable_amount').val();
				var bal=$('#cust_trans_bal_in_loan').val();
				var req=$('#cust_trans_req_frm_new_loan').val()

				if(pay_amt==0 || pay_amt =='')
				{
					$('#cust_trans_payable_amount_err').html('Enter Payable Amount');
						err++;
				}
				else
				{
					$('#cust_trans_payable_amount_err').html('');
				}

				if(bal==0 || bal =='')
				{
					$('#cust_trans_bal_in_loan_err').html('Enter Balance Amount');
						err++;
				}
				else
				{
					$('#cust_trans_bal_in_loan_err').html('');
				}

				if(req==0 || req =='')
				{
					$('#cust_trans_bal_in_loan_err').html('Enter Balance Amount');
						err++;
				}
				else
				{
					$('#cust_trans_bal_in_loan_err').html('');
				}

				var jt=('#cust_trans_new_ln_jewel_type').val();
				var sch=('#cust_trans_new_ln_scheme').val();
				var int=('#cust_trans_new_ln_int_type').val();
				if(jt =='')
				{
					$('#cust_trans_new_ln_jewel_type_err').html('Select Jewel Type');
						err++;
				}
				else
				{
					$('#cust_trans_new_ln_jewel_type_err').html('');
				}

				if(sch =='')
				{
					$('#cust_trans_new_ln_scheme_err').html('Select Scheme');
						err++;
				}
				else
				{
					$('#cust_trans_new_ln_scheme_err').html('');
				}

				if(int =='')
				{
					$('#cust_trans_new_ln_int_type_err').html('Select Interest');
						err++;
				}
				else
				{
					$('#cust_trans_new_ln_int_type_err').html('');
				}
				var ln_amt=$('#cust_trans_new_ln_loan_amount').val();
				if(ln_amt==0 || ln_amt=='')
				{
					$('#cust_trans_new_ln_loan_amount_err').html('Enter Loan Amount');
						err++;	
				}
				else
				{
					$('#cust_trans_new_ln_loan_amount_err').html('');
				}

				var red_p=$('#cust_trans_new_ln_redemption_period').val();
				if(red_p==0 || red_p=='')
				{
					$('#cust_trans_new_ln_redemption_period_err').html('Enter Redemption period');
						err++;	
				}
				else
				{
					$('#cust_trans_new_ln_redemption_period_err').html('');
				}
			}
			else if(cmp_cls.checked==true)
			{	
				// alert("company_close");
				document.getElementById('save_changes_add_new_loan').style.display="block";
			}
			else if(cus_sl.checked==true)
			{
				
				var cls_by=$('#cus_sale_closed_by').val();
				var cls_name=$('#cust_sale_by_others').val();
				// alert("cls_by");

				if(cls_by=='nominee')
				{
					if(cls_name=='')
					{
						$('#cust_sale_by_others_err').html('Enter Nominee Name');
						err++;
					}
					else
					{
						$('#cust_sale_by_others_err').html('');
					}
				}
				else if(cls_by=='others')
				{
					if(cls_name=='')
					{
						$('#cust_sale_by_others_err').html('Enter Others Name');
						err++;
					}
					else
					{
						$('#cust_sale_by_others_err').html('');
					}
				}
				// alert("cls_name");

				var pur_amt=$('#r_purhcase_amount').val();
				var bal=$('#r_remaining_amount').val();

				if(pur_amt==0 || pur_amt =='')
				{
					$('#r_purhcase_amount_err').html('Enter Purchase Amount');
						err++;
				}
				else
				{
					$('#r_purhcase_amount_err').html('');
				}

				if(bal=='')
				{
					$('#r_remaining_amount_err').html('Enter Balance Amount');
						err++;
				}
				else
				{
					$('#r_remaining_amount_err').html('');
				}


				//party payment details - cash
				var chk=document.getElementById('cash_cus_sale_paid_from_company_add_radio');
				if(chk.checked==true)
				{
					var amt=$('#cust_sale_cpcash_amt').val();
					if(amt==0 || amt=='')
					{
						$('#cust_sale_cpcash_amt_err').html('Enter a value');
						document.getElementById("cust_sale_cpcash_amt").focus();
						err++;
					}
					else
					{
						$('#cust_sale_cpcash_amt_err').html('');
					}

					var det=$('#cust_sale_cpcash_details').val();
					if(det=='')
					{
						$('#cust_sale_cpcash_details_err').html('Enter Remarks');
						document.getElementById("cust_sale_cpcash_details").focus();
						err++;
					}
					else
					{
						$('#cust_sale_cpcash_details_err').html('');
					}
						
				}
				//party payment details - cheque
				var chk=document.getElementById('cheque_cus_sale_paid_from_company_add_radio');
				if(chk.checked==true)
				{
					var amt=$('#cust_sale_cpchq_amt').val();
					if(amt==0 || amt=='')
					{
						$('#cust_sale_cpchq_amt_err').html('Enter a value');
						document.getElementById("cust_sale_cpchq_amt").focus();
						err++;
					}
					else
					{
						$('#cust_sale_cpchq_amt_err').html('');
					}

					var c_bank=$('#cust_sale_cpchq_comp_bank').val();
					if(c_bank=='')
					{
						$('#cust_sale_cpchq_comp_bank_err').html('Select a bank');
						document.getElementById("cust_sale_cpchq_comp_bank").focus();
						err++;
					}
					else
					{
						$('#cust_sale_cpchq_comp_bank_err').html('');
					}

					var chq_no=$('#cust_sale_cpchq_no').val();
					if(chq_no=='')
					{
						$('#cust_sale_cpchq_no_err').html('Enter cheque number');
						document.getElementById("cust_sale_cpchq_no").focus();
						err++;
					}
					else
					{
						$('#cust_sale_cpchq_no_err').html('');
					}

					var p_bank=$('#cust_sale_cpchq_party_bank').val();
					if(p_bank=='')
					{
						$('#cust_sale_cpchq_party_bank_err').html('Select a bank');
						document.getElementById("cust_sale_cpchq_party_bank").focus();
						err++;
					}
					else
					{
						$('#cust_sale_cpchq_party_bank_err').html('');
					}

					var det=$('#cust_sale_cpchq_details').val();
					if(det=='')
					{
						$('#cust_sale_cpchq_details_err').html('Enter Remarks');
						document.getElementById("cust_sale_cpchq_details").focus();
						err++;
					}
					else
					{
						$('#cust_sale_cpchq_details_err').html('');
					}
				}
				//party payment details - RTGS
				var chk=document.getElementById('rtgs_cus_sale_paid_from_company_add_radio');
				if(chk.checked==true)
				{
					var amt=$('#cust_sale_cprtgs_amount').val();
					if(amt==0 || amt=='')
					{
						$('#cust_sale_cprtgs_amount_err').html('Enter a value');
						document.getElementById("cust_sale_cprtgs_amount").focus();
						err++;
					}
					else
					{
						$('#cust_sale_cprtgs_amount_err').html('');
					}

					var c_bank=$('#cust_sale_cprtgs_comp_bank').val();
					if(c_bank=='')
					{
						$('#cust_sale_cprtgs_comp_bank_err').html('Select a bank');
						document.getElementById("cust_sale_cprtgs_comp_bank").focus();
						err++;
					}
					else
					{
						$('#cust_sale_cprtgs_comp_bank_err').html('');
					}

					var p_bank=$('#cust_sale_cprtgs_party_bank').val();
					if(p_bank=='')
					{
						$('#cust_sale_cprtgs_party_bank_err').html('Select a bank');
						document.getElementById("cust_sale_cprtgs_party_bank").focus();
						err++;
					}
					else
					{
						$('#cust_sale_cprtgs_party_bank_err').html('');
					}

					var chq_no=document.getElementById('cust_sale_cprtgs_ref_no').val();
					if(chq_no=='')
					{
						$('#cust_sale_cprtgs_ref_no_err').html('Enter cheque number');
						document.getElementById("cust_sale_cprtgs_ref_no").focus();
						err++;
					}
					else
					{
						$('#cust_sale_cprtgs_ref_no_err').html('');
					}

					var det=$('#cust_sale_cprtgs_details').val();
					if(det=='')
					{
						$('#cust_sale_cprtgs_details_err').html('Enter Remarks');
						document.getElementById("cust_sale_cprtgs_details").focus();
						err++;
					}
					else
					{
						$('#cust_sale_cprtgs_details_err').html('');
					}
				}
				//party payment details - UPI
				var chk=document.getElementById('upi_cus_sale_paid_from_company_add_radio');
				if(chk.checked==true)
				{
					var amt=$('#cust_sale_cpupi_amount').val();
					if(amt==0 || amt=='')
					{
						$('#cust_sale_cpupi_amount_err').html('Enter a value');
						document.getElementById("cust_sale_cpupi_amount").focus();
						err++;
					}
					else
					{
						$('#cust_sale_cpupi_amount_err').html('');
					}

					var c_bank=$('#cust_sale_cpupi_comp_bank').val();
					if(c_bank=='')
					{
						$('#cust_sale_cpupi_comp_bank_err').html('Select a bank');
						document.getElementById("cust_sale_cpupi_comp_bank").focus();
						err++;
					}
					else
					{
						$('#cust_sale_cpupi_comp_bank_err').html('');
					}

					var chq_no=$('#cust_sale_cpupi_ref_no').val();
					if(chq_no=='')
					{
						$('#cust_sale_cpupi_ref_no_err').html('Enter cheque number');
						document.getElementById("cust_sale_cpupi_ref_no").focus();
						err++;
					}
					else
					{
						$('#cust_sale_cpupi_ref_no_err').html('');
					}
					var p_bank=$('#cust_sale_cpupi_party_bank').val();
					if(p_bank=='')
					{
						$('#cust_sale_cpupi_party_bank_err').html('Select a bank');
						document.getElementById("cust_sale_cpupi_party_bank").focus();
						err++;
					}
					else
					{
						$('#cust_sale_cpupi_party_bank_err').html('');
					}

					var det=$('#cust_sale_cpupi_details').val();
					if(det=='')
					{
						$('#cust_sale_cpupi_details_err').html('Enter Remarks');
						document.getElementById("cust_sale_cpupi_details").focus();
						err++;
					}
					else
					{
						$('#cust_sale_cpupi_details_err').html('');
					}
				}
				
				document.getElementById('save_changes_add_new_loan').style.display="block";
			}
			else if(mul_jwl.checked==true)
			{
				// alert("multi_jewel");
				document.getElementById('save_changes_add_new_loan').style.display="block";
				var cls_by=$('#mul_jewel_closed_by').val();
				var cls_name=$('#mul_jwl_others').val();
				// alert("cls_by");

				if(cls_by=='nominee')
				{
					if(cls_name=='')
					{
						$('#mul_jwl_others_err').html('Enter Nominee Name');
						err++;
					}
					else
					{
						$('#mul_jwl_others_err').html('');
					}
				}
				else if(cls_by=='others')
				{
					if(cls_name=='')
					{
						$('#mul_jwl_others_err').html('Enter Others Name');
						err++;
					}
					else
					{
						$('#mul_jwl_others_err').html('');
					}
				}
				
				var jt=('#mul_jwl_jewel_type').val();
				var sch=('#mul_jwl_new_ln_scheme').val();
				var int=('#mul_jwl_new_ln_int_type').val();
				if(jt =='')
				{
					$('#mul_jwl_jewel_type_err').html('Select Jewel Type');
						err++;
				}
				else
				{
					$('#mul_jwl_jewel_type_err').html('');
				}

				if(sch =='')
				{
					$('#mul_jwl_new_ln_scheme_err').html('Select Scheme');
						err++;
				}
				else
				{
					$('#mul_jwl_new_ln_scheme_err').html('');
				}

				if(int =='')
				{
					$('#mul_jwl_new_ln_int_type_err').html('Select Interest');
						err++;
				}
				else
				{
					$('#mul_jwl_new_ln_int_type_err').html('');
				}
				var ln_amt=$('#mul_jwl_new_ln_loan_amount').val();
				if(ln_amt==0 || ln_amt=='')
				{
					$('#mul_jwl_new_ln_loan_amount_err').html('Enter Loan Amount');
						err++;	
				}
				else
				{
					$('#mul_jwl_new_ln_loan_amount_err').html('');
				}

				var red_p=$('#mul_jwl_new_ln_redemption_period').val();
				if(red_p==0 || red_p=='')
				{
					$('#mul_jwl_new_ln_redemption_period_err').html('Enter Redemption period');
						err++;	
				}
				else
				{
					$('#mul_jwl_new_ln_redemption_period_err').html('');
				}
			}
			// else
			// {
			// 	alert("Select one closing option");
			// 	document.getElementById('save_changes_add_new_loan').style.display="none";
			// 	err++;
			// }

		}

		if(err>0)
		{
			// alert(err);
			return false;
		}
		else
		{
			// alert(err);
			return true;
		}
	}
		</script>
		<script type="text/javascript">

			function cus_close_print1_verify()
			{
					var err=0;
					var bno=$('#redemp_bill_no').val();
					if(bno=='')
					{	
							$('#redemp_bill_no_err').html('Enter Redemption Bill No');
							err++;
							document.getElementById("redemp_bill_no").focus();
					}
					else
					{
						$('#redemp_bill_no_err').html('');
						var bno=$('#redemp_bill_no').val();
							var str=bno.replace("/","_");
							
							var path=baseurl+"redemption/print_1_legal/"+str;
							document.getElementById('cust_cls_btn_print1').setAttribute('href', path);
					}

					// if(err>0)
					// {
					// 	// alert(err);
					// 	return false;
					// }
					// else
					// {
					// 	// alert(bno);
					// 	$.ajax({
					// 				type: "POST",
					// 				url: baseurl+'redemption/print_1_legal?',
					// 				async: false,
					// 				type: "POST",
					// 				data: "bill_no="+bno,
					// 				dataType: "html",
					// 				success: function(response)
					// 				{	
					// 					// window.location.href=baseurl+"loan/loan_add";

					// 				}
					// 			});

					// 	// return true;
					// }
			}
			
		</script>
	</body>
	<!--end::Body-->
</html>