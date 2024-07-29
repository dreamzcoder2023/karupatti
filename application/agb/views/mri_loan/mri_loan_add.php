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

  #company_err{

  	color: red;
  }
  #int_scheme_err{

color: red;
  }
</style>
<link href="<?php echo base_url();?>assets/jquery.autocomplete.css" rel="stylesheet" type="text/css" />
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
									<h1 class="d-flex align-items-center text-dark fw-bold my-1 fs-3">New MRI Loan
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
										<form method="POST" action="<?php echo base_url();?>mri_loan/mri_loan_save" onsubmit="return mri_loan_validation();">


											<div class="card-body py-4">
											<div class="row">
												<div class="col-lg-6">
													<div class="px-4" style="border-radius: 10px;padding-bottom: 20px;box-shadow: 0 5px 10px #00002947;">
														<div class="row">
															<label class="col-lg-12 col-form-label fw-bold fs-5 text-center">Loan Information</label>
														</div>
														<div class="row">
															<div class="col-lg-8">
																<div class="row">
																	<label class="col-lg-3 col-form-label required fw-semibold fs-6">CCL No</label>
																	<div class="col-lg-9 fv-row fv-plugins-icon-container">
																			<input type="text" name="ccl_no" class="form-control form-control-lg form-control-solid" placeholder="Enter CCL No" id="ccl_no" value="">
																			<input type="hidden" id="pid" name="pid" value=""/>
																			<div class="fv-plugins-message-container invalid-feedback" id="ccl_no_err"></div>
																	</div>
																	<div class="col-lg-3">
																		<label class="col-form-label required fw-semibold fs-6">Company</label>	
																	</div>
																	<div class="col-lg-9">
																		<select class="form-select form-select-solid" name="company" id="company" data-control="select2" data-hide-search="true">
																			<option value="">Select</option>
																			<?php 
																				foreach ($company_list as $ilist) {
																			?>
																				<option value="<?php echo $ilist['COMPANYCODE']; ?>"><?php echo $ilist['COMPANYNAME']; ?></option>
																				<?php
																			}?>
																		</select>
																		<span id="company_err"></span>
																	</div>
																	<label class="col-lg-3 col-form-label required fw-semibold fs-6">Int Type</label>
																	<div class="col-lg-9">
																		<select class="form-select form-select-solid" name="int_scheme" id="int_scheme" data-control="select2" data-hide-search="true" onchange="mri_intrestcalculate();">	
																				<option value="">Select</option>
																				<?php 
																					foreach ($interest_list as $ilist) 
																					{
																				?>
																					 <option value="<?php echo $ilist['INTID']; ?>"><?php echo $ilist['INTNAME']; ?></option>
																					 		
																				<?php

																					}
																				?>
																		</select>
																		<span id="int_scheme_err"></span>
																	</div>
																	<label class="col-lg-3 col-form-label required fw-semibold fs-6">Date</label>
																	<div class="col-lg-9 fv-row">
																		<div class="d-flex align-items-center">
																			<span class="svg-icon position-absolute ms-4 svg-icon-2 dt">
																				<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																					<path opacity="0.3" d="M21 22H3C2.4 22 2 21.6 2 21V5C2 4.4 2.4 4 3 4H21C21.6 4 22 4.4 22 5V21C22 21.6 21.6 22 21 22Z" fill="currentColor" />
																					<path d="M6 6C5.4 6 5 5.6 5 5V3C5 2.4 5.4 2 6 2C6.6 2 7 2.4 7 3V5C7 5.6 6.6 6 6 6ZM11 5V3C11 2.4 10.6 2 10 2C9.4 2 9 2.4 9 3V5C9 5.6 9.4 6 10 6C10.6 6 11 5.6 11 5ZM15 5V3C15 2.4 14.6 2 14 2C13.4 2 13 2.4 13 3V5C13 5.6 13.4 6 14 6C14.6 6 15 5.6 15 5ZM19 5V3C19 2.4 18.6 2 18 2C17.4 2 17 2.4 17 3V5C17 5.6 17.4 6 18 6C18.6 6 19 5.6 19 5Z" fill="currentColor" />
																					<path d="M8.8 13.1C9.2 13.1 9.5 13 9.7 12.8C9.9 12.6 10.1 12.3 10.1 11.9C10.1 11.6 10 11.3 9.8 11.1C9.6 10.9 9.3 10.8 9 10.8C8.8 10.8 8.59999 10.8 8.39999 10.9C8.19999 11 8.1 11.1 8 11.2C7.9 11.3 7.8 11.4 7.7 11.6C7.6 11.8 7.5 11.9 7.5 12.1C7.5 12.2 7.4 12.2 7.3 12.3C7.2 12.4 7.09999 12.4 6.89999 12.4C6.69999 12.4 6.6 12.3 6.5 12.2C6.4 12.1 6.3 11.9 6.3 11.7C6.3 11.5 6.4 11.3 6.5 11.1C6.6 10.9 6.8 10.7 7 10.5C7.2 10.3 7.49999 10.1 7.89999 10C8.29999 9.90003 8.60001 9.80003 9.10001 9.80003C9.50001 9.80003 9.80001 9.90003 10.1 10C10.4 10.1 10.7 10.3 10.9 10.4C11.1 10.5 11.3 10.8 11.4 11.1C11.5 11.4 11.6 11.6 11.6 11.9C11.6 12.3 11.5 12.6 11.3 12.9C11.1 13.2 10.9 13.5 10.6 13.7C10.9 13.9 11.2 14.1 11.4 14.3C11.6 14.5 11.8 14.7 11.9 15C12 15.3 12.1 15.5 12.1 15.8C12.1 16.2 12 16.5 11.9 16.8C11.8 17.1 11.5 17.4 11.3 17.7C11.1 18 10.7 18.2 10.3 18.3C9.9 18.4 9.5 18.5 9 18.5C8.5 18.5 8.1 18.4 7.7 18.2C7.3 18 7 17.8 6.8 17.6C6.6 17.4 6.4 17.1 6.3 16.8C6.2 16.5 6.10001 16.3 6.10001 16.1C6.10001 15.9 6.2 15.7 6.3 15.6C6.4 15.5 6.6 15.4 6.8 15.4C6.9 15.4 7.00001 15.4 7.10001 15.5C7.20001 15.6 7.3 15.6 7.3 15.7C7.5 16.2 7.7 16.6 8 16.9C8.3 17.2 8.6 17.3 9 17.3C9.2 17.3 9.5 17.2 9.7 17.1C9.9 17 10.1 16.8 10.3 16.6C10.5 16.4 10.5 16.1 10.5 15.8C10.5 15.3 10.4 15 10.1 14.7C9.80001 14.4 9.50001 14.3 9.10001 14.3C9.00001 14.3 8.9 14.3 8.7 14.3C8.5 14.3 8.39999 14.3 8.39999 14.3C8.19999 14.3 7.99999 14.2 7.89999 14.1C7.79999 14 7.7 13.8 7.7 13.7C7.7 13.5 7.79999 13.4 7.89999 13.2C7.99999 13 8.2 13 8.5 13H8.8V13.1ZM15.3 17.5V12.2C14.3 13 13.6 13.3 13.3 13.3C13.1 13.3 13 13.2 12.9 13.1C12.8 13 12.7 12.8 12.7 12.6C12.7 12.4 12.8 12.3 12.9 12.2C13 12.1 13.2 12 13.6 11.8C14.1 11.6 14.5 11.3 14.7 11.1C14.9 10.9 15.2 10.6 15.5 10.3C15.8 10 15.9 9.80003 15.9 9.70003C15.9 9.60003 16.1 9.60004 16.3 9.60004C16.5 9.60004 16.7 9.70003 16.8 9.80003C16.9 9.90003 17 10.2 17 10.5V17.2C17 18 16.7 18.4 16.2 18.4C16 18.4 15.8 18.3 15.6 18.2C15.4 18.1 15.3 17.8 15.3 17.5Z" fill="currentColor" />
																				</svg>
																			</span>
																			<input class="form-control form-control-solid ps-12" name="" placeholder="Date" id="kt_datepicker_new_loan_date" value="<?php echo date("d-m-Y"); ?>"/>
																		</div>
																	</div>
																</div>
															</div>

															<div class="col-lg-4 fv-row mt-6">
																	<div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url(assets/media/svg/avatars/signature_blank.png)">
																			<div class="image-input-wrapper w-150px h-150px"  style="background-image: url(<?php echo base_url();?>assets/images/Jewel.jpg)"></div>
																	</div>
															</div>

															<div class="col-lg-6 col-form-label text-center mt-2">
																<label class="fw-semibold fs-6 me-3">Renewal No</label>
																<label class="fw-bold fs-6 d-block">
																	<span class="badge badge-info">-</span>
																</label>
															</div>

															<div class="col-lg-6 col-form-label text-center mt-2">
																<label class="fw-semibold fs-6 me-3">Original Loan No</label>
																<label class="fw-bold fs-6 d-block">
																	<span class="badge badge-primary text-black" id="orginalloannumber">-</span>
																		<input type="hidden" name="orginalloannumberval" id="orginalloannumberval" value="">-</span>
																</label>
															</div>

														</div>
													</div>
												</div>
												<div class="col-lg-6">
													<div class="px-4" style="border-radius: 10px;padding-bottom: 10px;box-shadow: 0 5px 10px #00002947;">
														<label class="col-lg-12 col-form-label fw-bold fs-5 text-center">Party Basic Details</label>
														<div class="row">
																<div class="col-lg-6">
																	<div class="row">
																		<label class="col-lg-12 col-form-label fw-bold fs-6">
																			<span class="me-2" title="Last Name">
																				<i class="fa fa-user fs-6" aria-hidden="true"></i>
																			</span>
																			<span class="me-2" title="Last Name" id="firstname">XXXXXXX</span>
																			
																			<a href="javascript:;" title="View Party">
																				<i class="fa-solid fa-binoculars fs-3"></i>
																			</a>
																		</label>
																		<label class="col-lg-12 col-form-label fw-bold fs-6" title="Address">
																			<span class="me-2">
																				<i class="fa-solid fa-location-dot fs-6" aria-hidden="true"></i>
																			</span>
																			<span id="address">... &nbsp; </span>
																		</label>
																		<label class="col-lg-6 col-form-label fw-bold fs-6">
																			<span class="me-2" title="Mobile">
																				<i class="fas fa-mobile-android-alt fs-6" aria-hidden="true"></i>
																			</span>
																		
																			<span class="me-2" id="phone_no">-</span>
																		</label>
																		<label class="col-lg-6 col-form-label fw-semibold fs-6" title="Customer Rating">
																			<span class="me-2">
																				<i class="fa-solid fa-star" style="color:#50cd89;"></i>
																			</span>
																			<span>-</span>
																		</label>
																	</div>
																</div>
																<div class="col-lg-6">
																	<div class="row">
																		<label class="col-lg-12 col-form-label fw-semibold fs-6" title="Nominee">
																			<span class="me-2">
																				<i class="fas fa-user-friends fs-5"></i>
																			</span>
																			<span title="Nominee"  id="nominee">-&nbsp; <span id="nominee_icon_txt"></span></span>
																		</label>
																		<label class="col-lg-12 col-form-label fw-semibold fs-6" title="Nominee Relation">
																			<span class="me-2">
																				<i class="fa-solid fa-people-arrows fs-3"></i>
																			</span>
																			<span>-</span>
																		</label>
																		<label class="col-lg-12 col-form-label fw-semibold fs-6" title="Nominee Mobile No">
																			<span class="me-4">
																				<i class="fa-solid fa-mobile-retro fs-2"></i>
																			</span>
																			<span>-</span>
																		</label>
																	</div>
																</div>
														</div>
														<div class="row mb-1">
																<div class="col-lg-4 fv-row">
																	<div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url(<?php echo base_url();?>assets/images/Party.jpg)" id="div_party_photo">
																		<div class="image-input-wrapper"  style="background-image: url(<?php echo base_url();?>assets/images/Party.jpg)"></div>
																	</div>
																</div>
																<div class="col-lg-4 fv-row">
																	<div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url(<?php echo base_url();?>assets/media/svg/avatars/aadhaar_blank.png)" id="div_id_photo">
																		<div class="image-input-wrapper"  style="background-image: url(<?php echo base_url();?>assets/media/svg/avatars/aadhaar_blank.png)"></div>
																	</div>
																</div>
																<div class="col-lg-4 fv-row">
																	<div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url(<?php echo base_url();?>assets/media/svg/avatars/signature_blank.png)" id="div_sign_photo">
																		<div class="image-input-wrapper"  style="background-image: url(<?php echo base_url();?>assets/media/svg/avatars/signature_blank.png)"></div>
																	</div>
																</div>
															</div>
														</div>
													</div>
											</div>
												<div class="row">
												<div class="accordion" id="kt_accordion_item_list">
												    <div class="accordion-item">
												        <h2 class="accordion-header" id="kt_accordion_item_list_header_1">
												            <button class="accordion-button fw-bold fs-6 collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#kt_accordion_item_list_body_1" aria-expanded="false" aria-controls="kt_accordion_item_list_body_1">
												            Pledge Info &emsp; - &emsp; Count &emsp; <span id="acc_pl_cnt">0</span> &emsp; - &emsp;</span> Total Net Weight <span>&emsp; <span id="acc_net_weight">0.00 gms</span>
												            </button>
												        </h2>
												        <div id="kt_accordion_item_list_body_1" class="accordion-collapse collapse" aria-labelledby="kt_accordion_item_list_header_1" data-bs-parent="#kt_accordion_item_list">
												            <div class="accordion-body">
												            	<table class="table align-middle table-row-dashed table-striped table-hover fs-7 gy-1 gs-2" id="add_receipt_payment_history_table">
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
																	<tbody class="text-gray-600 fw-semibold" id="pl_tbody">
																		
																    </tbody>
																  
																</table>

																			<div class="row">
																				<label class="col-lg-1 col-form-label fw-semibold fs-6">Weight</label>
																				<label class="col-lg-1 col-form-label fw-bold fs-6" id="ln_weight">0.000</label>
																				<label class="col-lg-1 col-form-label fw-semibold fs-6">Stoneless</label>
																				<label class="col-lg-1 col-form-label fw-bold fs-6" id="ln_stone_weight">0.000</label>
																				<label class="col-lg-1 col-form-label fw-semibold fs-6">Less</label>
																				<label class="col-lg-1 col-form-label fw-bold fs-6" id="ln_less">0.400</label>
																				<label class="col-lg-1 col-form-label fw-semibold fs-6">Net.Wght</label>
																				<label class="col-lg-1 col-form-label fw-bold fs-6" id="ln_net_weight">0.00</label>
																				<!-- <label class="col-lg-1 col-form-label fw-semibold fs-6">CurrRate</label> --><label class="col-lg-1 col-form-label fw-semibold fs-6">CurrRate</label>
																				<label class="col-lg-1 col-form-label fw-bold fs-6" id="ln_curr_rate">0.00</label>
																				<label class="col-lg-1 col-form-label fw-semibold fs-6">Purity%</label>
																				<div class="col-lg-1 fv-row fv-plugins-icon-container">
																					<label class=" col-form-label fw-bold fs-6" id="ln_purity_percent">0.00</label>
																					<div class="fv-plugins-message-container invalid-feedback"></div>
																				</div>
																			</div>
																			<div class="row">
																				<label class="col-lg-1 col-form-label fw-semibold fs-6">Gram.Val</label>
																				<label class="col-lg-1 col-form-label fw-bold fs-6" id="ln_gram_val">0.00</label>
																				<label class="col-lg-1 col-form-label fw-semibold fs-6">SalesRate</label>
																				<label class="col-lg-1 col-form-label fw-bold fs-6" id="ln_sale_rate">0.00</label>
																				<label class="col-lg-1 col-form-label fw-semibold fs-6" style="color: #1a21e3 !important;font-weight: 600 !important;">H/L Bal</label>
																				<label class="col-lg-1 col-form-label fw-bold fs-5" style="color: #1a21e3 !important;font-weight: 600 !important;" id="ln_hl_bal">0.00</label>
																			</div>
												            </div>
												        </div>
												    </div>
												</div>
											</div>
											<div class="row mt-4">
												<div class="col-lg-6">
													<div class="px-4" style="border-radius: 10px;padding-bottom: 10px;box-shadow: 0 5px 10px #00002947;">
														<label class="col-lg-12 col-form-label fw-bold fs-5 text-center">MRI Loan Information</label>
														<div class="row">
															<!--begin::Label-->
															<label class="col-lg-6 col-form-label required fw-semibold fs-6">Loan Amount</label>
															<!--end::Label-->
															<!--begin::Col-->
															<div class="col-lg-6 fv-row fv-plugins-icon-container">
																<input type="text" name="mri_loan_amt" id="mri_loan_amt" class="form-control form-control-lg1 form-control-solid" style="font-size: 18px !important;font-weight: 700 !important;color: #1B439E !important;" onchange="mri_intrestcalculate();">
																<div class="fv-plugins-message-container invalid-feedback" id="mri_loan_amt_err"></div>
															</div>
															<!--end::Col-->
														</div>
														<div class="row">
															<!--begin::Label-->
															<label class="col-lg-6 col-form-label fw-semibold fs-6">Monthly Interest</label>
															<label class="col-lg-6 col-form-label fw-bold fs-5"><span style="background-color:#C6C6C6;border-radius: 8px;padding: 5px 15px 5px 15px;" id="mri_interest">0000</span></label>
															<input type="hidden" id="mri_interestval" name="mri_interestval" value="">
														</div>
														<div class="row">
															<!--begin::Label-->
															<label class="col-lg-6 col-form-label required fw-semibold fs-6">Redemption period</label>
															<!--end::Label-->
															<!--begin::Col-->
															<div class="col-lg-3 fv-row fv-plugins-icon-container">
																<input type="text" name="add_lnperiod_new_loan" id="add_lnperiod_new_loan" class="form-control form-control-lg1 form-control-solid" value="">
																<div class="fv-plugins-message-container invalid-feedback" id="add_lnperiod_new_loan_err"></div>
															</div>
															<!--end::Col-->
															<label class="col-lg-3 col-form-label fw-semibold fs-6" id="loan_per_mon_days">Days</label>
														</div>
															<br/>
														<div class="row mt-1 mb-1">
															<div class="d-flex justify-content-center align-items-center">
																<label class="col-form-label fw-bold fs-3 ">Total Loan Amount   <span id="total_mri_loan_amt">0.00</span></label>

																<input type="hidden" id="total_mri_loan_amtval" name="total_mri_loan_amtval" value="">
															</div>
														</div>

													</div>
												</div>
												<div class="col-lg-6">
													<div class="px-4" style="border-radius: 10px;padding-bottom: 15px;box-shadow: 0 5px 10px #00002947;">
														<label class="col-lg-12 col-form-label fw-bold fs-5 text-center">MRI Particulars</label>
														<div class="row">
															<!--begin::Label-->
															<label class="col-lg-6 col-form-label fw-semibold fs-6">MRI Int paid By Customer</label>
															<!--end::Label-->
															<!--begin::Col-->
															<div class="col-lg-6 fv-row fv-plugins-icon-container">
																<input type="text" name="processing_charge" id="processing_charge" class="form-control form-control-lg1 form-control-solid" placeholder="Processing Charge" value="0" onchange="changemriparticularstot();">
																<div class="fv-plugins-message-container invalid-feedback" id="processing_charge_err"></div>
															</div>
															<!--end::Col-->
														</div>
														<div class="row">
															<!--begin::Label-->
															<label class="col-lg-6 col-form-label fw-semibold fs-6">Reneval Extra Payment To Customer</label>
															<!--end::Label-->
															<!--begin::Col-->
															<div class="col-lg-6 fv-row fv-plugins-icon-container">
																<input type="text" name="renewal_extra_pay" id="renewal_extra_pay" class="form-control form-control-lg1 form-control-solid" placeholder="Processing Charge" value="0" onchange="changemriparticularstot();">
																<div class="fv-plugins-message-container invalid-feedback" id="renewal_extra_pay_err"></div>
															</div>
															<!--end::Col-->
														</div>
														<div class="row">
															<label class="col-lg-2 col-form-label fw-semibold fs-6 ">Remarks</label>
															<div class="col-lg-10 fv-row fv-plugins-icon-container">
																<textarea class="form-control form-select-solid fw-semibold fs-5" rows="1" name="remarks" id="remarks">Please Enter Your MRI-Loan Remarks</textarea>
																<div class="fv-plugins-message-container invalid-feedback" id="remarks_err"></div>
															</div>
														</div>
														<div class="row mt-4">
															<label class="col-lg-6 col-form-label fw-bold fs-3 text-center">Total MRI PAY   <span id="final_mri_total">0.00</span></label>

															<input type="hidden" id="final_mri_totalvalue" name="final_mri_totalvalue" value=""/>
														
														</div>
														
													</div>
												</div>
											</div>
											<div class="d-flex justify-content-end align-items-center pt-6">
												<button type="reset" class="btn btn-secondary me-2" data-bs-dismiss="modal">Cancel</button>
												<button type="submit" class="btn btn-primary" id="">Submit</button>
											</div>
									  </div>
										<!--end::Card body-->
										<!--NEW secound MRI begin::Card body-->
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
		<?php $this->load->view("script"); ?>
		<script src="<?php echo base_url();?>assets/jquery.autocomplete.js"></script>
		<script>
			function mri_intrestcalculate()
			{
				var inttype = $('#int_scheme').val();
				//alert(inttype);
				  $.ajax({
					type: "POST",
					url: baseurl+'Mri_loan/load_interstval',
					async: false,
					type: "POST",
					data: "&inttype="+inttype,
					dataType: "json",
					success: function(response)
					{	
						console.log(response[0].PERIOD);
						var loanamt = $('#mri_loan_amt').val();
					
						var intrest = loanamt * response[0].INTEREST;
						var totalmonthintrest = intrest/100;
						var totalintrest = totalmonthintrest * response[0].PERIOD;

						//alert(totalintrest)
						$('#mri_interest').html(totalintrest);
						$('#mri_interestval').val(totalintrest);

						var imptotint = $('#mri_interestval').val();
						var loanamt   = $('#mri_loan_amt').val();

						var finaltotloanamt = parseFloat(loanamt)+parseFloat(imptotint);
						$('#total_mri_loan_amt').html(finaltotloanamt);
						$('#total_mri_loan_amtval').val(finaltotloanamt);

						//console.log(response[0].INTEREST);

					}
				});
			}
			function changemriparticularstot()
			{
					var processing_charge_val = $('#processing_charge').val();
					var renewal_extra_pay = $('#renewal_extra_pay').val();
					var totalcharge = parseFloat(processing_charge_val) + parseFloat(renewal_extra_pay);
					$('#final_mri_total').html(totalcharge);
					$('#final_mri_totalvalue').val(totalcharge);
					//alert('processing_charge');
			}
	</script>
	<script >
	var span = document.querySelector('#firstname');
	var baseurl="<?php echo base_url();?>";	
	$("#ccl_no").autocomplete(
	{ 
		  valueKey:'title',
		  source:[{
		  url:baseurl+'mri_loan/loanList?query=%QUERY%',
		  type:'remote',
		  ajax:{
		    dataType : 'json',
		  }
	}]}).on('selected.xdsoft',function(e,suggestion,ui)
	{ 
			 console.log(suggestion.orginalbillno);
			 $('#pid').val(suggestion.pid);
			 $('#bill_no').val(suggestion.bill_no);
			 $("#firstname").html(suggestion.firstname);

			 $('#orginalloannumber').html(suggestion.orginalbillno);
			 $('#orginalloannumberval').val(suggestion.orginalbillno);

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

			  $("#rating").html(r);
			  $("#address").html(suggestion.address);
			  ic='<i class="fas fa-info-circle fs-6" title="'+suggestion.address+'"></i>';
			  $("#icon_txt").html(ic);
			  $nic=suggestion.nom_det+'&nbsp; <i class="fas fa-info-circle fs-6" title="'+suggestion.inom_det+'"></i>';

			  $('#nominee').html($nic)
			  $("#phone_no").html(suggestion.phone);
				$("#company_name").html(suggestion.company);
									$("#interest_type").html(suggestion.interest);
									$("#pop_interest").html(suggestion.interest);
									$("#loan_date").html(suggestion.loan_dt);
									$("#pop_loan_date").html(suggestion.loan_dt);
									$("#expiry_date").html(suggestion.expiry_dt);
									$("#loan_amount").html(suggestion.loan_amt);
									$("#pop_loan_amount").html(suggestion.loan_amt);
									$("#net_weight").html(suggestion.weight);
									$("#pledge_count").html(suggestion.pl_count);
									$("#acc_pl_cnt").html(suggestion.pl_count);
									$("#acc_net_weight").html(suggestion.weight);
									$("#pl_tbody").html(suggestion.tbody);
									$("#tfoot_total").html(suggestion.tfoot);
					
	                $('#div_party_photo').html(suggestion.party_photo);
	              
	               
            
	});

$('#firstname').on('DOMSubtreeModified',function()
{
   // alert('changed');
   var pid= $("#pid").val();
   var bill_no= $("#orginalloannumber").val();
   //alert(pid); 
   $.ajax(
   {
			type: "POST",
			url: baseurl+'Mri_loan/load_other_info?',
			async: false,
			type: "POST",
			data: "id="+pid+"&bill_no="+bill_no,
			dataType: "html",
			success: function(response)
			{	
					
         



          res=response.split("||");
          console.log(res[16]);
						// alert(response);
						$("#due_status").html(res[1]);
						$("#rcpt_count").html(res[2]);
						$("#rcpt_date").html(res[3]);
						var ln_period=res[5]+" Months "+res[4]+" Days";
						$("#period").html(ln_period);
						$('#loan_principal').html(res[6]);
						$('#loan_principalval').val(res[6]);
						$('#loan_interest').html(res[7]);
						 $('#paid_principal').html(res[8]);
						 $('#paid_interest').html(res[9]);
						 $('#bal_principal').html(res[10]);
						 $('#bal_interest').html(res[11]);
              $('#div_item_photo').empty().append(res[12]);
              $("#l_status").html(res[13]);
              $("#ln_weight").html(res[14]);
              $("#ln_stone_weight").html(res[15]);
              $("#ln_less").html(res[16]);
              $("#ln_net_weight").html(res[17]);
              $("#ln_curr_rate").html(res[18]);
              $("#ln_purity_percent").html(res[19]);
              $("#ln_gram_val").html(res[20]);
              $("#ln_sale_rate").html(res[21]);
              $("#ln_hl_bal").html(res[22]);

              
			}
	});
  $.ajax(
  {
			type: "POST",
			url: baseurl+'Mri_loan/load_popup_receipt_info',
			async: false,
			type: "POST",
			data: "&bill_no="+bill_no,
			dataType: "html",
			success: function(response)
			{	
					res=response.split("||");
						
		                $('#tbody_paid_history').html(res[1]);
		                $('#loan_interest').html(res[2]);
		                $('#paid_principal').html(res[3]);
						$('#paid_interest').html(res[4]);
						$('#bal_principal').html(res[7]-res[3]);
						$('#bal_interest').html(res[2]-res[4]);
						$('#calc_principal').html(res[7]-res[3]);
						$('#calc_interest').html(res[2]-res[4]);
						$('#txt_calc_principal').val(res[7]-res[3]);
						$('#txt_calc_interest').val(res[2]-res[4]);
						$('#tot_paid').html(parseFloat(res[3])+parseFloat(res[4]));
					
						var principalamtval = $('#loan_principalval').val();
						$('#tot_bal').html(parseFloat(res[7]-res[3]) + parseFloat(res[2]-res[4]));
						$('#tot_amt').html(parseFloat(principalamtval)+parseFloat(res[2]));
					}
			});
	});
</script>
<script>
$("#view_redemp_pledge_item").DataTable(
{
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
$("#kt_datatable_dom_positioning").DataTable(
{
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
		$("#kt_datepicker_From").flatpickr({
			dateFormat: "d-m-Y",
		});
		$("#kt_datepicker_To").flatpickr({
			dateFormat: "d-m-Y",
		});
		$("#kt_datepicker_new_loan_date").flatpickr({
			dateFormat: "d-m-Y",
			maxDate:"<?php echo date('d-m-Y'); ?>",
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
  $(document).on('change', '.sare-fields', e => 
  {
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
  $('.btn-add').on('click', e => 
  {
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
$(document).on('change', '.sare-fields_dc', e => 
{
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
$('.btn-add_dc').on('click', e => 
{
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
$(document).on('change', '.sare-fields', e => 
{
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
$('.btn-add').on('click', e => 
{
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
<script type="text/javascript">
function mri_loan_validation()
{
		var err=0;
		var fn= $('#ccl_no').val();
		
		if(fn=="")
		{
			$('#ccl_no_err').html('Enter CCL no.');
			err++;
			document.getElementById("ccl_no").focus();
		}
		else
		{
			$('#ccl_no_err').html('');
			var int_per_val=$('#int_scheme').val();
			//alert(int_per_val);
			if(int_per_val=="") 
			{
				$('#int_scheme_err').html('Enter Interest Scheme');
				err++;
				// alert("Choose Interest first");
				document.getElementById('int_scheme').focus();
			}
			else
			{
					$('#int_scheme_err').html('');
			}

			var cmp=$('#company').val();
			if(cmp=="") 
			{
				$('#company_err').html('Enter Company');
				err++;
				// alert("Choose Interest first");
				document.getElementById('company').focus();
			}
			else
			{
					$('#company_err').html('');
			}


			var lamt=$('#mri_loan_amt').val();
			if(lamt=="") 
			{
				$('#mri_loan_amt_err').html('Enter MRI Loan Amount');
				err++;
				// alert("Choose Interest first");
				document.getElementById('mri_loan_amt').focus();
			}
			else
			{
					$('#mri_loan_amt_err').html('');
			}

			var rp=$('#add_lnperiod_new_loan').val();
			if(rp=="") 
			{
				$('#add_lnperiod_new_loan_err').html('Enter Redemption Days');
				err++;
				// alert("Choose Interest first");
				document.getElementById('add_lnperiod_new_loan').focus();
			}
			else
			{
					$('#add_lnperiod_new_loan_err').html('');
			}
			var renewal_extra_pay  = $('#renewal_extra_pay').val();
			if(renewal_extra_pay>0){
				$('#renewal_extra_pay_err').html('please Not  Enter Renewal Extra Pay(ex 0).');
				err++;
				// alert("Choose Interest first");
				 $('#renewal_extra_pay').val(0);
					
				document.getElementById('renewal_extra_pay').focus();

			}
			else{


			}
	}
	if(err>0){return false;}else{return true;}
}
	
</script>
	</body>
	<!--end::Body-->
</html>