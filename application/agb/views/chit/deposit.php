<?php $this->load->view("common"); ?>
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
 		 /*Auto complete css start*/

		.xdsoft_autocomplete,
		.xdsoft_autocomplete div,
		.xdsoft_autocomplete span{
		/*	-moz-box-sizing: border-box !important;
			box-sizing: border-box !important;*/
		}

		.xdsoft_autocomplete{
		display:inline;
		position:relative;
		word-spacing: normal;
		text-transform: none;
		text-indent: 0px;
		text-shadow: none;
		text-align: start;
		}
		/*.xdsoft_autocomplete_dropdown
		{
			left: 0px !important;
			top: 31px !important;
			margin-left: 0px !important;
			margin-right: 0px !important;
			width: 500px !important;
			display: none !important;
			max-height: 475px !important;
		}*/

		.xdsoft_autocomplete .xdsoft_input{
			position:relative;
			z-index:2;
		}
		.xdsoft_autocomplete .xdsoft_autocomplete_dropdown{
			position:absolute;
			border: 1px solid #ccc;
			border-top-color: #d9d9d9;
			box-shadow: 0 2px 4px rgba(0,0,0,0.2);
			-webkit-box-shadow: 0 2px 4px rgba(0,0,0,0.2);
			cursor: default;
			display:none;
			z-index: 1001;
			margin-top:-1px;
			background-color:#fff;
			/*min-width:100%;*/
			width: 170px !important;
			overflow:auto;
			max-height: 300px !important;
			/*overflow-y: auto !important;
			overflow-x: auto !important;*/
			/*padding-right: 20px !important;*/
		}
		.xdsoft_autocomplete .xdsoft_autocomplete_hint{
			position:absolute;
			z-index:1;
			color:#ccc !important;
			-webkit-text-fill-color:#ccc !important;
			text-fill-color:#ccc  !important;
			overflow:hidden !important;
			white-space: pre  !important;
		}

		.xdsoft_autocomplete .xdsoft_autocomplete_hint span{
			color:transparent;
			opacity: 0.0;
		}

		.xdsoft_autocomplete .xdsoft_autocomplete_dropdown > .xdsoft_autocomplete_copyright{
			color:#ddd;
			font-size:10px;
			text-decoration:none;
			right:5px;
			position:absolute;
			margin-top:-15px;
			z-index:1002;
		}
		.xdsoft_autocomplete .xdsoft_autocomplete_dropdown > div{
			background:#fff;
			white-space: nowrap;
			cursor: pointer;
			line-height: 1.5em;
			padding: 2px 0px 2px 0px;
		}
		.xdsoft_autocomplete .xdsoft_autocomplete_dropdown > div.active{
			background: #0097CF;
			color: #FFFFFF;
		}

		/*Auto complete css end*/
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
									<h1 class="d-flex align-items-center text-dark fw-bold my-1 fs-3">Deposit Chit
									<!--begin::Separator-->
									<!-- <span class="h-20px border-gray-400 border-start ms-3 mx-2"></span>
									<label class="d-flex align-items-center text-primary fw-bold my-1 fs-5">
										<span>Party &emsp;-</span>
										<span>&emsp;All</span>
									</label> -->
									<!-- <span class="h-20px border-gray-400 border-start ms-3 mx-2"></span>
									<label class="d-flex align-items-center text-primary fw-bold my-1 fs-5">
										<span>Status &emsp;-</span>
										<span>&emsp;All</span>
									</label> -->
									<!-- <span class="h-20px border-gray-400 border-start ms-3 mx-2"></span>
									<label class="d-flex align-items-center text-primary fw-bold my-1 fs-5">
										<span>Date &emsp;-</span>
										<span>&emsp;Today</span>
									</label> -->
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
									<?php if(isset($_SESSION['Chit depositAdd'])){ if($_SESSION['Chit depositAdd']==1){?>
										<!--begin::Tables Widget 9-->
										<div class="card card-xxl-stretch mb-5 mb-xl-8">
											<!--begin::Card header-->
											<!--end::Card header-->
											<!--begin::Card body-->
											<div class="card-body py-4">
												<!--begin::Table-->
												<!--end::Heading-->
												<form method="POST" autocomplete="off" action="<?php echo base_url(); ?>Chit/deposit_chit" enctype="multipart/form-data" onsubmit="return deposit_chit_entry_validation();">
												<div class="row">
													<div class="col-lg-6">
														<div class="row">
															<label class="col-lg-2 col-form-label required fw-semibold fs-6">Date</label>
															<div class="col-lg-4 fv-row">
																<div class="d-flex align-items-center">
																	<!--begin::Svg Icon | path: icons/duotune/general/gen014.svg-->
																	<span class="svg-icon position-absolute ms-4 svg-icon-2 dt">
																		<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																			<path opacity="0.3" d="M21 22H3C2.4 22 2 21.6 2 21V5C2 4.4 2.4 4 3 4H21C21.6 4 22 4.4 22 5V21C22 21.6 21.6 22 21 22Z" fill="currentColor"></path>
																			<path d="M6 6C5.4 6 5 5.6 5 5V3C5 2.4 5.4 2 6 2C6.6 2 7 2.4 7 3V5C7 5.6 6.6 6 6 6ZM11 5V3C11 2.4 10.6 2 10 2C9.4 2 9 2.4 9 3V5C9 5.6 9.4 6 10 6C10.6 6 11 5.6 11 5ZM15 5V3C15 2.4 14.6 2 14 2C13.4 2 13 2.4 13 3V5C13 5.6 13.4 6 14 6C14.6 6 15 5.6 15 5ZM19 5V3C19 2.4 18.6 2 18 2C17.4 2 17 2.4 17 3V5C17 5.6 17.4 6 18 6C18.6 6 19 5.6 19 5Z" fill="currentColor"></path>
																			<path d="M8.8 13.1C9.2 13.1 9.5 13 9.7 12.8C9.9 12.6 10.1 12.3 10.1 11.9C10.1 11.6 10 11.3 9.8 11.1C9.6 10.9 9.3 10.8 9 10.8C8.8 10.8 8.59999 10.8 8.39999 10.9C8.19999 11 8.1 11.1 8 11.2C7.9 11.3 7.8 11.4 7.7 11.6C7.6 11.8 7.5 11.9 7.5 12.1C7.5 12.2 7.4 12.2 7.3 12.3C7.2 12.4 7.09999 12.4 6.89999 12.4C6.69999 12.4 6.6 12.3 6.5 12.2C6.4 12.1 6.3 11.9 6.3 11.7C6.3 11.5 6.4 11.3 6.5 11.1C6.6 10.9 6.8 10.7 7 10.5C7.2 10.3 7.49999 10.1 7.89999 10C8.29999 9.90003 8.60001 9.80003 9.10001 9.80003C9.50001 9.80003 9.80001 9.90003 10.1 10C10.4 10.1 10.7 10.3 10.9 10.4C11.1 10.5 11.3 10.8 11.4 11.1C11.5 11.4 11.6 11.6 11.6 11.9C11.6 12.3 11.5 12.6 11.3 12.9C11.1 13.2 10.9 13.5 10.6 13.7C10.9 13.9 11.2 14.1 11.4 14.3C11.6 14.5 11.8 14.7 11.9 15C12 15.3 12.1 15.5 12.1 15.8C12.1 16.2 12 16.5 11.9 16.8C11.8 17.1 11.5 17.4 11.3 17.7C11.1 18 10.7 18.2 10.3 18.3C9.9 18.4 9.5 18.5 9 18.5C8.5 18.5 8.1 18.4 7.7 18.2C7.3 18 7 17.8 6.8 17.6C6.6 17.4 6.4 17.1 6.3 16.8C6.2 16.5 6.10001 16.3 6.10001 16.1C6.10001 15.9 6.2 15.7 6.3 15.6C6.4 15.5 6.6 15.4 6.8 15.4C6.9 15.4 7.00001 15.4 7.10001 15.5C7.20001 15.6 7.3 15.6 7.3 15.7C7.5 16.2 7.7 16.6 8 16.9C8.3 17.2 8.6 17.3 9 17.3C9.2 17.3 9.5 17.2 9.7 17.1C9.9 17 10.1 16.8 10.3 16.6C10.5 16.4 10.5 16.1 10.5 15.8C10.5 15.3 10.4 15 10.1 14.7C9.80001 14.4 9.50001 14.3 9.10001 14.3C9.00001 14.3 8.9 14.3 8.7 14.3C8.5 14.3 8.39999 14.3 8.39999 14.3C8.19999 14.3 7.99999 14.2 7.89999 14.1C7.79999 14 7.7 13.8 7.7 13.7C7.7 13.5 7.79999 13.4 7.89999 13.2C7.99999 13 8.2 13 8.5 13H8.8V13.1ZM15.3 17.5V12.2C14.3 13 13.6 13.3 13.3 13.3C13.1 13.3 13 13.2 12.9 13.1C12.8 13 12.7 12.8 12.7 12.6C12.7 12.4 12.8 12.3 12.9 12.2C13 12.1 13.2 12 13.6 11.8C14.1 11.6 14.5 11.3 14.7 11.1C14.9 10.9 15.2 10.6 15.5 10.3C15.8 10 15.9 9.80003 15.9 9.70003C15.9 9.60003 16.1 9.60004 16.3 9.60004C16.5 9.60004 16.7 9.70003 16.8 9.80003C16.9 9.90003 17 10.2 17 10.5V17.2C17 18 16.7 18.4 16.2 18.4C16 18.4 15.8 18.3 15.6 18.2C15.4 18.1 15.3 17.8 15.3 17.5Z" fill="currentColor"></path>
																		</svg>
																	</span>
																	<!--end::Svg Icon-->
																	<input class="form-control form-control-solid ps-12" name="chit_date" placeholder="Date"  id="chit_date" value="<?php echo date("d-m-Y") ?>" />
																	<?php   $current_rate = $this->db->query("SELECT GOLDRATE FROM SETUP")->row(); ?>
																	<input type="hidden" name="current_gold_rate" id="current_gold_rate"  value="<?php echo $current_rate->GOLDRATE; ?>">
																	<input type="hidden" name="net_gm_lab1" id="net_gm_lab1" value="0">
																		</div>
																<span class="fv-plugins-message-container invalid-feedback text-danger" id="date_err"></span>
																<div class="fv-plugins-message-container invalid-feedback" id="date_err"></div>
															</div>
															<label class="col-lg-2 col-form-label required fw-semibold fs-6">Chit ID <i class="fa-solid fa-circle-info fs-7 "  title="AutoComplete Select Chit ID"></i></label>
															<div class="col-lg-4 fv-row fv-plugins-icon-container">
																<input type="text" name="chit_id" id="chit_id" class="form-control form-control-lg form-control-solid" placeholder="Chit ID" onkeyup="first_nm_party();">
																<input type="hidden" name="party_id_hidden" id="party_id_hidden" value="">
																<div class="fv-plugins-message-container invalid-feedback" id="chit_id_err"></div>
																<div class="fv-plugins-message-container invalid-feedback" id="chit_id2_err"></div>
															</div>
															
															<div id="old_membership">
																<label class="col-lg-6 col-form-label fw-bold fs-6" id="red" ><i class="fa fa-address-card fs-6" aria-hidden="true" name="membership_card_no"  title="Card No"></i>
																	  <span id="membership_card_no">XXXX-XXXX-XXXX</span> 
																	 <span id="verify_icon"></span>
																	 <input type="hidden" name="mem_card_no_hidden" id="mem_card_no_hidden" value="">
																</label>
																<label class="col-lg-2 col-form-label fw-bold fs-6" name="card_type" id="card_type"></label>
																<label class="col-lg-2 col-form-label fw-bold fs-6" name="" id=""><i class="fa-solid fa-coins fs-6" title="Points"></i>&nbsp;<span id="membership_card_points">XXX</span></label>
															</div>
														</div>
														<div class="row">
															<div class="col-lg-4" id="new_membership" style="display:none;">
																<label class="col-lg-12 col-form-label fw-bold fs-6" id="no_card" name="no_card"><i class="fa fa-address-card fs-6" aria-hidden="true" title="Card No"></i>&emsp;<a href="<?php echo base_url();?>Membership" target="_blank"><span style="color: red" >Click Here for<br> <b>New Membership Card</b></span></a>
															  </label>
															</div>
															<div class="col-lg-4" id="verify_membership" style="display:none;">
																<a href="javascript:;" class="btn btn-sm btn-outline btn-outline-solid btn-outline-warning btn-active-light-primary me-2" data-bs-toggle="modal" data-bs-target="#kt_modal_verify_membership_card">Verify</a>
															</div>
														</div>
													
													</div>
													<div class="col-lg-4">
														<div class="row">
															<label class="col-lg-12 col-form-label fw-bold fs-6" name="" id="">
																<i class="fa fa-user fs-6" aria-hidden="true" title="Party Name"></i>&nbsp;&nbsp;<span  name="lab_name" id="lab_name" ></span></label>
															<label class="col-lg-12 col-form-label fw-bold fs-6" name="" id="">
																<i class="fa-solid fa-location-dot fs-6" aria-hidden="true" title="Address"></i>&nbsp;&nbsp;<span name="address" id="address"></span></label>
															<label class="col-lg-4 col-form-label fw-bold fs-6" name="" id="">
																	<i class="fas fa-mobile-android-alt fs-6" aria-hidden="true" title="Mobile"></i>&nbsp;&nbsp;<span name="mobile" id="mobile"></span></label>
															<label class="col-lg-4 col-form-label fw-semibold fs-6">Rating</label>
															<label class="col-lg-4 col-form-label fw-bold fs-6">
															&nbsp;<span name="rating" id="rating"></span>
															&nbsp;</label>
														</div>
													</div>
													<div class="col-lg-2 fv-row">
														<div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url(assets/media/svg/avatars/blank.svg)" id="party_photo" name="party_photo">
															<div class="image-input-wrapper"  style="background-image: url(<?php echo base_url();?>assets/images/party.jpg)"></div>
														</div>
													</div>
													</div>
													<div class="row">
															<label class="col-lg-2 col-form-label fw-semibold fs-6">Scheme ID</label>
															<label class="col-lg-2 col-form-label fw-bold fs-5">
																<span name="scheme_id" id="scheme_id"></span>
																<input type="hidden" name="scheme_id1" id="scheme_id1" value="">
															</label>
															<label class="col-lg-2 col-form-label fw-semibold fs-6">Scheme</label>
															<label class="col-lg-2 col-form-label fw-bold fs-5" name="scheme_type" id="scheme_type"></label>
													</div>
													<div class="row">
														<label class="col-lg-2 col-form-label fw-semibold fs-6">Collection Type</label>
														<label class="col-lg-2 col-form-label fw-bold fs-5" name="collection_type" id="collection_type"></label>
														<div class="col-lg-4" id="collection_date_div" >
														</div>												
													</div>
												<div class="row">
													<label class="col-lg-2 col-form-label fw-semibold fs-6">Available </label>
													<label class="col-lg-1 col-form-label fw-bold fs-5" name="ava_amount" id="ava_amount" ></label>
													<input type="hidden" name="ava_balance" id="ava_balance" value="">
													<div id="ava_gold">	 												
													</div>												
												</div>
												
												<div class="row">
													<div id="cash_sm_scheme">

													</div> 
												</div> 
												<input type="hidden" name="net_amt_hidden" id="net_amt_hidden" value="0">
												<input type="hidden" name="mismatch" id="mismatch" value="">
												<input type="hidden" name="scheme_type_hidden" id="scheme_type_hidden" value="">
												
															
															
													
													<div class="row">
														<label class="col-form-label fw-bold fs-5">Party Payment Details</label>
														<div class="col-lg-2 fv-row fv-plugins-icon-container fv-plugins-bootstrap5-row-invalid">
															<div class="d-flex align-items-center mt-1">
																<label class="form-check form-check-inline form-check-solid me-5 is-invalid">
																	<input class="form-check-input" name="payment_type" type="checkbox" value="Cash" id="cash_add_radio" onclick="cash_sl_add_radio()">
																</label>
																<label class="col-form-label fw-semibold fs-6 me-5">Cash</label>
															</div>
														</div>
														<div class="col-lg-2 fv-row fv-plugins-icon-container fv-plugins-bootstrap5-row-invalid">
															<div class="d-flex align-items-center mt-1">
																<label class="form-check form-check-inline form-check-solid me-5 is-invalid">
																	<input class="form-check-input" name="payment_type" type="checkbox" value="Bank" id="cheque_add_radio" onclick="cheque_sl_add_radio()">
																</label>
																<label class="col-form-label fw-semibold fs-6">Bank</label>
															</div>
														</div>
														<div class="col-lg-2 fv-row fv-plugins-icon-container fv-plugins-bootstrap5-row-invalid">
															<div class="d-flex align-items-center mt-1">
																<label class="form-check form-check-inline form-check-solid me-5 is-invalid">
																	<input class="form-check-input" name="payment_type" type="checkbox" value="RTGS" id="rtgs_add_radio" onclick="rtgs_ln_recev_add_radio()">
																</label>
																<label class="col-form-label fw-semibold fs-6">RTGS</label>
															</div>
														</div>
														<div class="col-lg-2 fv-row fv-plugins-icon-container fv-plugins-bootstrap5-row-invalid">
															<div class="d-flex align-items-center mt-1">
																<label class="form-check form-check-inline form-check-solid me-5 is-invalid">
																	<input class="form-check-input" name="payment_type" type="checkbox" value="UPI" id="upi_add_radio" onclick="upi_sl_add_radio()">
																</label>
																<label class="col-form-label fw-semibold fs-6">UPI</label>
															</div>
														</div>
														<div class="fv-plugins-message-container invalid-feedback" id="payment_err" ></div>
													</div>
													<div class="row">
														<label class="col-lg-1 col-form-label fw-semibold fs-6" id="cash_sl_label" style="display: none;">Cash</label>
														<div class="col-lg-2 fv-row fv-plugins-icon-container" id="cash_sl_tbox" style="display: none;">
															<input type="text" class="form-control form-control-lg form-control-solid" placeholder="Amount" name="cash_amt" id="cash_amt" value="0" oninput="this.value = this.value.replace(/[^/0-9.]/g, '').replace(/(\..*)\./g, '$1');" onkeyup="payment_validation()">
															<div class="fv-plugins-message-container invalid-feedback"></div>
														</div>
														<label class="col-lg-1 col-form-label fw-semibold fs-6" id="cash_sl_detai_label" style="display: none;">Details</label>
														<div class="col-lg-2 fv-row fv-plugins-icon-container" id="cash_sl_detai_tbox" style="display: none;">
															<textarea class="form-control form-control-solid" rows="1" placeholder="Details" name="cash_details" id="cash_details"></textarea>
														</div>
													</div>
													<div class="row">
														<label class="col-lg-1 col-form-label fw-semibold fs-6" id="cheque_sl_amt_label" style="display: none;">Bank</label>
														<div class="col-lg-2 fv-row fv-plugins-icon-container" id="cheque_sl_amt_tbox" style="display: none;">
															<input type="text" class="form-control form-control-lg form-control-solid" placeholder="Amount" name="bank_amt" id="cheque_amt" value="0" oninput="this.value = this.value.replace(/[^/0-9.]/g, '').replace(/(\..*)\./g, '$1');" onkeyup="payment_validation()">
															<div class="fv-plugins-message-container invalid-feedback"></div>
														</div>
														<label class="col-lg-1 col-form-label fw-semibold fs-6" id="cheque_sl_bk_label" style="display: none;">Name</label>
														<div class="col-lg-2 fv-row fv-plugins-icon-container" id="cheque_sl_bk_tbox" style="display: none;">
															<select class="form-select form-select-solid" data-control="select2" data-placeholder="Select Bank" name="bank_name" id="cheque_bank" data-hide-search="false">
															<option value="">Select</option>
																<?php
																	$bnk_det=$this->db->query("select * from BANKS where ACTIVE='Y'")->result_array();
																	foreach ($bnk_det as $blist) {
																	?>
																	<option value="<?php echo $blist['SNO'];?>"><?php echo $blist['BANKNAME'];?></option>
																	<?php
																	}
																?>
															</select>
															<span class="m-form__help text-danger" id="cheque_bank_err"></span>
														</div>
														<label class="col-lg-1 col-form-label fw-semibold fs-6" id="cheque_sl_cqno_label" style="display: none;">Cheque no</label>
														<div class="col-lg-2 fv-row fv-plugins-icon-container" id="cheque_sl_cqno_tbox" style="display: none;">
															<input type="text" class="form-control form-control-lg form-control-solid" placeholder="Cheque Number" name="cheque_no" id="cheque_no" >
															<span class="m-form__help text-danger" id="cheque_no_err"></span>
															<div class="fv-plugins-message-container invalid-feedback"></div>
														</div>
														<label class="col-lg-1 col-form-label fw-semibold fs-6" id="cheque_sl_detail_label" style="display: none;">Details</label>
														<div class="col-lg-2 fv-row fv-plugins-icon-container" id="cheque_sl_detail_tbox" style="display: none;">
															<textarea class="form-control form-control-solid" rows="1" placeholder="Details" name="bank_details" id="bank_details"></textarea>
														</div>
													</div>
													<div class="row">
														<label class="col-lg-1 col-form-label fw-semibold fs-6" id="rtgs_amt" style="display:none;">RTGS</label>
														<div class="col-lg-2 fv-row fv-plugins-icon-container" id="rtgs_amt_tbox" style="display:none;">
															<input type="text" name="rtgs_amt" id="rtgs_amt_box" class="form-control form-control-lg form-control-solid" placeholder="Amount" value="0" oninput="this.value = this.value.replace(/[^/0-9.]/g, '').replace(/(\..*)\./g, '$1');" onkeyup="payment_validation()">
															<div class="fv-plugins-message-container invalid-feedback"></div>
														</div>
														<label class="col-lg-1 col-form-label fw-semibold fs-6" id="rtgs_bank" style="display: none;">Name</label>
														<div class="col-lg-2 fv-row fv-plugins-icon-container" id="rtgs_bank_tbox" style="display:none;">
															<select class="form-select form-select-solid" data-control="select2" id="rtgs_bank_name" name="rtgs_name" data-placeholder="Select Bank" data-hide-search="false">
															<option value="">Select</option>
																<?php
																	$bnk_det=$this->db->query("select * from BANKS where ACTIVE='Y'")->result_array();
																	foreach ($bnk_det as $blist) {
																	?>
																	<option value="<?php echo $blist['SNO'];?>"><?php echo $blist['BANKNAME'];?></option>
																	<?php
																	}
																?>
															</select>
															<span class="m-form__help text-danger" id="rtgs_bank_err"></span>
														</div>
														<label class="col-lg-1 col-form-label fw-semibold fs-6" id="rtgs_no" style="display: none;">Trans No</label>
														<div class="col-lg-2 fv-row fv-plugins-icon-container" id="rtgs_no_tbox" style="display:none;">
															<input type="text" name="rtgs_no" id="rtgs_number" class="form-control form-control-lg form-control-solid" placeholder="Trans/Ref Number" oninput="this.value = this.value.replace(/[^A-Za-z/0-9.]/g, '').replace(/(\..*)\./g, '$1');">
															<div class="fv-plugins-message-container invalid-feedback" id="rtgs_no_err"></div>
														</div>
														<label class="col-lg-1 col-form-label fw-semibold fs-6" id="rtgs_detail" style="display: none;">Details</label>
														<div class="col-lg-2 fv-row fv-plugins-icon-container" id="rtgs_detail_tbox" style="display:none;">
															<textarea class="form-control form-control-solid" rows="1" placeholder="Details" name="rtgs_details" id="cash_details"></textarea>
														</div>
													</div>
													<div class="row">
														<label class="col-lg-1 col-form-label fw-semibold fs-6" id="upi_sl_amt_label" style="display: none;">UPI</label>
														<div class="col-lg-2 fv-row fv-plugins-icon-container" id="upi_sl_amt_tbox" style="display: none;">
															<input type="text" class="form-control form-control-lg form-control-solid" value="0" placeholder="Amount" name="upi_amt" id="upi_amt" value="0" oninput="this.value = this.value.replace(/[^/0-9.]/g, '').replace(/(\..*)\./g, '$1');" onkeyup="payment_validation()">
															<div class="fv-plugins-message-container invalid-feedback"></div>
														</div>
														<label class="col-lg-1 col-form-label fw-semibold fs-6" id="upi_sl_trno_label" style="display: none;">Trans No</label>
														<div class="col-lg-2 fv-row fv-plugins-icon-container" id="upi_sl_trno_tbox" style="display: none;">
															<input type="text" class="form-control form-control-lg form-control-solid" placeholder="Transaction No" name="upi_no" id="upi_trans_no">
															<span class="m-form__help text-danger" id="upi_trans_no_err"></span>
															<div class="fv-plugins-message-container invalid-feedback"></div>
														</div>
														<label class="col-lg-1 col-form-label fw-semibold fs-6" id="upi_sl_detail_label" style="display: none;">Details</label>
														<div class="col-lg-2 fv-row fv-plugins-icon-container" id="upi_sl_detail_tbox" style="display: none;">
															<textarea class="form-control form-control-solid" rows="1" placeholder="Details" name="upi_details" id="cash_details"></textarea>
														</div>
													</div>	

													<div class="row">
													<label class="col-lg-2 col-form-label fw-semibold fs-6">Customer Rating</label>
													<div class="col-lg-2">
														<select class="form-select form-select-solid" id="cus_rating" name="cus_rating" data-control="select2" data-hide-search="false">
															<option value="">Select Rating	</option>
															<option value="3">Good</option>
															<option value="2">Average</option>
															<option value="1">Bad</option>
														</select>
														<div class="fv-plugins-message-container invalid-feedback" id="cus_rating_err"></div>
													</div>
														<div class="col-lg-4" id="verify_points" style="display:none;">
															<div class="row">
																<label class="col-lg-4 col-form-label fw-semibold fs-6">M.Points Add</label>
																	<div class="col-lg-4 fv-row fv-plugins-icon-container">
																		<input type="text" name="m_points_ad" id="m_points_ad" value="0" placeholder="Membership Point" class="form-control form-control-lg1 form-control-solid" value="">
																		<div class="fv-plugins-message-container invalid-feedback" id="m_points_ad_err"></div>
																	</div>
																</div>
														</div>
													</div>	
													<div class="fv-plugins-message-container invalid-feedback text-end" id="mismatch_err" ></div>
												<div class="d-flex justify-content-end mt-4">
													<button type="reset" class="btn btn-secondary me-3"onclick="closeadd()">Cancel</button>
													<button type="submit" class="btn btn-primary" id="save_changes_add_product">Deposit Chit</button>
												</div>
												<!--end::Actions-->
											</div>
												<!--end::Table-->
											</div>
											<!--end::Card body-->
										</div>
										<!--end::Tables Widget 9-->
									<?php }}else{?><?php $this->load->view("common_role_permission_err"); ?><?php } ?>
								</div>
								<!--end::Col-->
								</form>
							</div>
							<!--end::Row-->
						</div>
						<!--end::Container-->
					<!--end::Content-->
				<?php $this->load->view("footer");?>
				</div>
				</div>
				<!--end::Wrapper-->
			</div>
			<!--end::Page-->
		</div>
		<!--end::Root-->
		<!--start::Complete button-->
		<div class="modal fade" id="kt_modal_chit_error" tabindex="-1" aria-hidden="true">
			<!--begin::Modal dialog-->
			<div class="modal-dialog modal-dialog-centered modal-m">
				<!--begin::Modal content-->
				<div class="modal-content rounded">
					<div class="swal2-icon swal2-warning text-danger swal2-icon-show" style="display: flex;border-color: red !important;">
						<div class="swal2-icon-content">&#10006;</div></div>
						<div class="swal2-html-container" id="swal2-html-container" style="display: block;">This Chit couldn't withdraw</div>
						<div class="d-flex flex-center flex-row-fluid mt-8">
							<button type="submit" class="btn btn-primary" data-bs-dismiss="modal">OK</button>
						</div><br><br>
				</div>
				<!--end::Modal content-->
			</div>
			<!--end::Modal dialog-->
		</div>
		<!--end::Complete button-->
		<div class="modal fade" id="kt_modal_verify_membership_card" tabindex="-1" aria-hidden="true" data-bs-backdrop="static">
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
							<label class="col-lg-12 col-form-label fw-bold fs-5"><i class="fa fa-address-card fs-5" aria-hidden="true" title="Card No"></i>&emsp; <span id="pop_member_card"></span>
							</label>
							<label class="col-lg-4 col-form-label fw-bold fs-6" name="pop_card_type" id="pop_card_type" ></label>
							<label class="col-lg-4 col-form-label fw-bold fs-5" name="" id=""><i class="fa-solid fa-coins fs-5" title="Points"></i>&emsp;<span id="pop_member_points"></span></label>
						</div>
						<div class="row">
							<label class="col-lg-4 col-form-label fw-semibold fs-6">Scan Here</label>
							<div class="col-lg-8 fv-row fv-plugins-icon-container">
								<input type="text" class="form-control form-control-lg form-control-solid" id="scan_he" name="scan_he" placeholder="Scan Here" >
								<input type="hidden" name="scan_he_card" id="scan_he_card" value="">
								<div class="fv-plugins-message-container invalid-feedback text-danger" id="scan_he_err"></div>
							</div>
						</div>
						<div class="row">
						<div class="col-lg-3"></div>
							<label class="col-lg-5 col-form-label fw-bold fs-6 text-end" name="" id="" >
								 <span style="background-color:#f1416c;border-radius: 8px;padding: 8px 7px 8px 6px;color: white; display:none;" id="not_match">Not Matched...</span> 
								 <!-- <span style="background-color:#50cd89;border-radius: 8px;padding: 5px 15px 5px 15px;" id="verifying">Verifying...</span> -->
								<span style="background-color:#50cd89;border-radius: 8px;padding: 7px 13px 8px 15px; display:none;" id="matched">Matched...</span>
							</label>
							<div class="col-lg-4 d-flex justify-content-end" id="verify_btn_mem">
								<button class="btn btn-sm btn-outline btn-outline-solid btn-outline-warning btn-active-light-primary me-1" id="verify_button">Verify</button>
							</div>
						</div>
						<!-- <div class="d-flex justify-content-ce mt-6 px-9">
							<button type="reset" class="btn btn-secondary me-3" data-bs-dismiss="modal">Cancel</button>
							<button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Submit</button>
						</div> -->
						<!--end::Modal body-->
					</div>
					<!--end::Modal content-->
				</div>
				<!--end::Modal dialog-->
			</div>
			<!--end::Modal - view payment-->
		</div>
		<?php $this->load->view("script");?>
		<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
		<input type="hidden" id="baseurl" value="<?php echo base_url(); ?>">
		<script src="<?php echo base_url();?>assets/jquery.autocomplete.js"></script>
		<!-- <script src="js/products-list.js"></script> -->

		<script>
		function cash_on()
		{
		
			var req_cash = $('#current_gold_rate').val();
			var proc_cash = $('#tm_gold_box').val();
			
			var sub = proc_cash / req_cash ;
			
			$('#net_gm_lab').html(sub.toFixed(3));
			$('#net_gm_lab1').val(sub.toFixed(3));
			var tm_gold_box = $('#tm_gold_box').val();

					if(tm_gold_box!=''){

						$('#net_amt_hidden').val(tm_gold_box);
					}
			
		}
		</script>
		<script>
			function closeadd()
				{
					var baseurl= $("#baseurl").val();
					window.location.href = baseurl+'Chit';
				}
		</script>
		<!-- Sales list day filter start -->
		<script>

		function deposit_chit_entry_validation(){
				// alert("hi");
				var err = 0;
				var date = $('#chit_date').val();
				var chit_id = $('#chit_id').val();		
				var party_id_hidden = $('#party_id_hidden').val();		

				if(date.trim()==''){
					$('#date_err').html('Date is required!');
					err++;
				}else{
					$('#date_err').html('');
				}
				if(chit_id.trim()==''){
					$('#chit_id_err').html('Chit ID is required!');
					err++;
				}else{
					$('#chit_id_err').html('');
				}
				

				if (chit_id!='') {
					if(party_id_hidden.trim()==''){
						$('#chit_id2_err').html('Enter Valid Chit ID !');
						err++;
					}else{
						$('#chit_id2_err').html('');
					}
				}else{
					$('#chit_id2_err').html('');
				}

				  var cash    = parseFloat($('#cash_amt').val());
					var cheque  = parseFloat($('#cheque_amt').val());
					var rtgs    = parseFloat($('#rtgs_amt_box').val());
					var upi     = parseFloat($('#upi_amt').val());


					 if((cash<=0) && (cheque<=0) && (rtgs<=0) && (upi<=0))
						{

							$('#payment_err').html('Please select Any one of the payment mode And Enter Amount!');
							err++;

						}
						else
						{
							$('#payment_err').html('');
							// $('#ac_amount_err').html('');
						}


					    if (cheque>0) {

					    	var chequebank = $('#cheque_bank').val();
					    	if (chequebank.trim()=='') {
						    	$('#cheque_bank_err').html('Please select Bank !');
									err++;
								}
								else{
										$('#cheque_bank_err').html('');
								}

							var cheque_no = $('#cheque_no').val();
					    	if (cheque_no.trim()=='') {

						    	$('#cheque_no_err').html('Reference No is Required !');
								err++;
							}
							else{
								$('#cheque_no_err').html('');
							}

					   }
					   if (upi>0) {
								var upi_trans_no = $('#upi_trans_no').val();
						    	if (upi_trans_no.trim()=='') {

							    	$('#upi_trans_no_err').html('Transaction No is Required !');
									err++;
								}
								else{
									$('#upi_trans_no_err').html('');
								}
					    }

					    if (rtgs>0) {

					    	var rtgs_bank = $('#rtgs_bank_name').val();

					    	if (rtgs_bank.trim()=='') {
						    	$('#rtgs_bank_err').html('Please select Bank !');
									err++;
								}
								else{
										$('#rtgs_bank_err').html('');
								}

							var rtgs_no = $('#rtgs_number').val();
					    	if (rtgs_no.trim()=='') {

						    	$('#rtgs_no_err').html('Transaction No is Required !');
								err++;
							}
							else{

								$('#rtgs_no_err').html('');
							}

					   }

					  var mismatch = $('#mismatch').val();

					  if (mismatch!=0) {					  	
					  	$('#mismatch_err').html('Paid Amount is Mismatch !');
								err++;
					  }
				  	else{
				  		$('#mismatch_err').html('');
				   	}
					  var scheme_type_hidden = $('#scheme_type_hidden').val();
					  if(scheme_type_hidden==1) {			

					  		var sm_cash_box = $('#sm_cash_box').val();
								// alert(sm_cash_box)
								if (sm_cash_box.trim()=='') {

									$('#sm_cash_box_err').html('Enter Cash is Required ');
									err++;

								}
								else{
									$('#sm_cash_box_err').html('');
								}					  	
					  }
					  else if(scheme_type_hidden==2){

					  	var tm_cash_box = $('#tm_cash_box').val();
							if (tm_cash_box.trim()=='') {
								$('#tm_cash_box_err').html('Enter Cash is Required ');
								err++;
							}
							else{
								$('#tm_cash_box_err').html('');
							}

					  }else{
					  	var tm_gold_box = $('#tm_gold_box').val();
					  	if (tm_gold_box.trim()=='') {
								$('#tm_gold_box_err').html('Enter Cash is Required ');
								err++;
							}
							else{
								$('#tm_gold_box_err').html('');
							}

					  }

					   

						if(err>0){ return false; }else{ return true; }

			}


			

			function payment_validation(){ 

			  	var net_amt = parseFloat($('#net_amt_hidden').val());		
					var cash    = parseFloat($('#cash_amt').val());
					var cheque  = parseFloat($('#cheque_amt').val());
					var rtgs    = parseFloat($('#rtgs_amt_box').val());
					var upi     = parseFloat($('#upi_amt').val());

					if (isNaN(cash))   cash = 0;
					if (isNaN(cheque)) cheque = 0;
					if (isNaN(rtgs))   rtgs = 0;
					if (isNaN(upi))    upi = 0;

					var tot  = cash+cheque+rtgs+upi;
					var diff = net_amt - parseFloat(tot);
					// alert(net_amt)
					$('#mismatch').val(diff);
					if (diff < 0) {

							// alert("Please Check The Enter Amount is Exceed");
								Swal.fire({
									title: 'Amount Mismatch!',
									text: 'Please Check The Enter Amount is Exceed.. ',
									icon: 'error',
									confirmButtonText: 'Okay'
									});

						    $('#cash_amt').val('0');
						    $('#cheque_amt').val('0');
						    $('#rtgs_amt_box').val('0');
						    $('#upi_amt').val('0');
						    $('#mismatch').val('1');
						}

			}
		</script>
		<script>

			function first_nm_party()
			{
				var chit_id = $('#chit_id').val();
				var scheme_id = $('#scheme_id').val();
				var collection_type = $('#collection_type').val();
				if(chit_id == "")	
				{
					//alert("if");
					$('#chit_id').val("");
					$('#scheme_id').val("");
					$('#collection_type').val("");
				}
			}
			
			var baseurl = $("#baseurl").val();
			$("#chit_id").autocomplete({ 
					valueKey:'title',
					source:[{
					url:baseurl+'Chit/chit_list_det?query=%QUERY%',
					type:'remote',
					ajax:{
					dataType : 'json',
					}
				}]}).on('selected.xdsoft',function(e,suggestion,ui){ 
					// alert(1);
					// var day = '';
					$("#chit_id").val(suggestion.chit_id);
					$('#party_id_hidden').val(suggestion.party_id);
					$("#lab_name").html(suggestion.party_name);
					$("#party_photo").html(suggestion.party_photo);
					$("#address").html(suggestion.address);
					$("#mobile").html(suggestion.mobile);
					$("#lab_name").html(suggestion.party_name);
					$("#lab_name").html(suggestion.party_name);
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
						r='<i class="fa-solid fa-star" style="color:#d2d4dc;"></i>&nbsp;-';	
					}
					$("#rating").html(r);
					$("#scheme_id").html(suggestion.scheme_id);
					$("#scheme_id1").val(suggestion.scheme_id);
					$("#collection_day").val(suggestion.scheme_id);
					if(suggestion.collection_type==1){
	                	r='Daily';	
						div='';
	                }
	                else if(suggestion.collection_type==2){
	                	r='Weekly';	
	            if(suggestion.collection_day==1){
                   collection_date="Sunday";
								}
								else if(suggestion.collection_day==2){
                   collection_date="Monday";
								}
								else if(suggestion.collection_day==3){
                    collection_date="Tuesday";
								}
								else if(suggestion.collection_day==4){
                  collection_date="Wednesday";
								}
								else if(suggestion.collection_day==5){
                   collection_date="Thursday";
								}
								else if(suggestion.collection_day==6){
                   collection_date="Friday";
								}
								else if(suggestion.collection_day==7){
                    collection_date="Saturday";
								}
								else {
									collection_date="-";
								}
						div='<div class="col-lg-12"><div class="row"><label class="col-lg-4 col-form-label fw-semibold fs-6">Collection Day &emsp;</label><label class="col-lg-7 col-form-label fw-bold fs-5" ><span class="ms-20">'+collection_date+'</span></label></div></div>';

	                }
	                else if(suggestion.collection_type==3){
	                	r='Monthly';	
						div='<label class="col-form-label fw-semibold fs-6">Collection Date &emsp;</label>	<label class="col-form-label fw-bold fs-5" id="collection_date"></label>';
	                }
	                else{
	                	r='-';	
	                }

					$("#collection_type").html(r);
					$("#collection_date_div").empty().append(div);
					if (suggestion.scheme_ty == 1) {
					    r = 'Selvamagal';
					    div = '<div class="col-lg-6"><div class="row"><label class="col-lg-2 col-form-label fw-semibold fs-6">Cash</label><div class="col-lg-3"><input type="text" name="sm_cash_box" id="sm_cash_box" class="form-control form-control-lg form-control-solid" placeholder="Amount" oninput="this.value = this.value.replace(/[^0-9.]/g, \'\').replace(/(\\..*)\\./g, \'$1\');" onkeyup="net_amt_cal(1)"><div class="fv-plugins-message-container invalid-feedback me-8" id="sm_cash_box_err"></div></div></div></div>';
					    gold_div = '';
					}
	          else if(suggestion.scheme_ty==2){
	          r='Thangamagal Cash';	
						div='<div class="col-lg-6"><div class="row"><label class="col-lg-2 col-form-label fw-semibold fs-6">Cash</label><div class="col-lg-3"><input type="text" name="tm_cash_box" id="tm_cash_box" class="form-control form-control-lg form-control-solid" placeholder="Amount" oninput="this.value = this.value.replace(/[^0-9.]/g, \'\').replace(/(\\..*)\\./g, \'$1\');"  onkeyup="net_amt_cal(2)"><div class="fv-plugins-message-container invalid-feedback" id="tm_cash_box_err"></div></div></div></div>';
						gold_div='';
					}
	          else if(suggestion.scheme_ty==3){
	           r='Thangamagal Gold';	
						div='<div class="col-lg-12"><div class="row"><label class="col-lg-1 col-form-label fw-semibold fs-6">Cash</label><div class="col-lg-2"><input type="text" name="tm_gold_box" id="tm_gold_box" class="form-control form-control-lg form-control-solid" placeholder="Amount" onkeyup="cash_on()" oninput="this.value = this.value.replace(/[^0-9.]/g, \'\').replace(/(\\..*)\\./g, \'$1\');" onkeyup="cash_on()"><div class="fv-plugins-message-container invalid-feedback" id="tm_gold_box_err"></div></div><label class="col-lg-2 col-form-label fw-semibold fs-6">Net Weight(gms)</label><label class="col-lg-2 col-form-label fw-bold fs-5" id="net_gm_lab"></label></div></div>';
						gold_div='';
					}
	                else{
	                	r='-';	
	                }
					
					$("#cash_sm_scheme").empty().append(div);
					$("#ava_gold").empty().append(gold_div);
					$("#scheme_type").html(r);
					$("#scheme_type1").val(r);
					$("#tot_sel_trans").html(suggestion.tot_sel_trans);
					$("#membership_card_no").html(suggestion.member_id);
					$("#scheme_type_hidden").val(suggestion.scheme_ty);
					if(suggestion.member_id == '')
					{
						// document.getElementById('verify_btn').style.display="none"
						document.getElementById('new_membership').style.display = "block";
						document.getElementById('old_membership').style.display = "none";
						document.getElementById('verify_membership').style.display = "none";
					}
					else
					{
						// document.getElementById('verify_btn').style.display="block"
						document.getElementById('new_membership').style.display = "none";
						document.getElementById('old_membership').style.display = "block";
						document.getElementById('verify_membership').style.display = "block";
					}
					$("#membership_card_no").html(suggestion.member_id);
					$("#mem_card_no_hidden").val(suggestion.member_id);
					$("#pop_member_points").html(suggestion.member_points);

					$("#pop_member_card").html(suggestion.member_id);
					$("#membership_card_points").html(suggestion.member_points);
					$("#pop_member_points").html(suggestion.member_points);

					var mid = suggestion.member_id;
					var pid= $("#party_id_hidden").val();
					$('#scan_he_card').val(suggestion.member_id);
					$.ajax({
						type: "POST",
						url: baseurl+'Chit/get_card_type',
						async: false,
						type: "POST",
						data: "id="+pid,
						dataType: "html",
						success: function(response)
						{
							
							$('#card_type').html(response);
							$('#pop_card_type').html(response);
						}
						});
					$(document).ready(function(){

						$("#verify_button").click(function(){
							var scan = $("#scan_he").val();
							var mid  = $("#scan_he_card").val();

							if (scan!='') 
							{

								if (scan==mid) 
								{
									$("#not_match").hide();
									$("#matched").show();
									// document.getElementById("verifying").style.display="none";
									$("#verify_icon").html('<i class="fas fa-check-circle fs-5" style="color:#03A013;"></i>');
									$("#verify_membership").hide();
									$("#verify_btn_mem").hide();
									$("#verify_button").hide();
									// $("#scan_he").addClass("readonly");
									document.getElementById("scan_he").disabled = true;
									$("#verify_points").show();


									$("#scan_he_err").html('');

								}
								else
								{
									// alert('not match');
									
									$("#not_match").show();
									$("#verify_points").hide();
									$("#matched").hide();
									$("#verify_icon").html('<i class="fas fa-times-circle fs-5" style="color:red;"></i>');
									$("#verify_membership").show();
									$("#scan_he_err").html('');									
									
								}
							}
							else
							{
									$("#scan_he_err").html('Enter Card Number');
							}
						});
						});
					$("#membership_card_points").html(suggestion.member_points);
					if(suggestion.card_member_type=='Gold'){
              var card_type='<span style="background-color:#ffaa00;border-radius: 8px;padding: 5px 15px 5px 15px;">Gold</span>';
            }
            else if(suggestion.card_member_type=='Silver'){
              var card_type='<span style="background-color:#d2d4dc;border-radius: 8px;padding: 5px 15px 5px 15px;">Silver</span>';
            }
            else if(suggestion.card_member_type=='Platinum')
            {
             var card_type='<span style="background-color:#f4fdff;border-radius: 8px;padding: 5px 15px 5px 15px;">Platinum</span>';
            }
					// $("#card_type_label").html(card_type);	
					$("#tot_sel_chit").html(suggestion.sm_cc);
					$("#tot_tha_chit").html(suggestion.tm_cc);
					$("#tot_chit").html(suggestion.cc);
					$("#sel_amt").html(suggestion.sel_amt);
					$("#tha_amt").html(suggestion.tha_amt);
					$("#tha_gm").html(suggestion.tha_gm);
					$("#ava_amount").html(suggestion.cash);
					$("#ava_balance").val(suggestion.cash);
					var pid = suggestion.party_id;
					$.ajax({
					type: "POST",
					url: baseurl+'Chit/get_photo2',
					async: false,
					type: "POST",
					data: "id="+pid,
					dataType: "html",
					success: function(response)
					{
		        $('#party_photo').empty().append(response);
					}
					});
				});
				
		</script>
		<script>

			function net_amt_cal(id){
				

				var sm_cash_box = $('#sm_cash_box').val();
				var tm_cash_box = $('#tm_cash_box').val();

				
					if(id=='1'){
						$('#net_amt_hidden').val(sm_cash_box);
					}
					else if(id=='2'){

						$('#net_amt_hidden').val(tm_cash_box);
					}else{
						 $('#net_amt_hidden').val('');
					}				
			}

		</script>


		<script>


		function sel_cash(id){
				if(id == 0) {
					document.getElementById('sel_cash').style.display="block";
					document.getElementById('thanga_cash').style.display="none";
					
				}else if(id == 1){
						document.getElementById('sel_cash').style.display="none";
						document.getElementById('thanga_cash').style.display="block";
							
				}

			}

			function thanga_cash(id){
				if(id == 0) {
					document.getElementById('thang_cash').style.display="block";
					document.getElementById('thang_gold').style.display="none";
					
				}else if(id == 1){
					document.getElementById('thang_cash').style.display="none";
					document.getElementById('thang_gold').style.display="block";
							
				}
			}


			function cash_sl_add_radio()
			{
				var cash_add_radio = document.getElementById("cash_add_radio");

				var cash_sl_label = document.getElementById("cash_sl_label");
				var cash_sl_tbox = document.getElementById("cash_sl_tbox");
				var cash_sl_detai_label = document.getElementById("cash_sl_detai_label");
				var cash_sl_detai_tbox = document.getElementById("cash_sl_detai_tbox");

				if (cash_add_radio.checked == true)
				{
				    cash_sl_label.style.display = "block";
				    cash_sl_tbox.style.display = "block";
				    cash_sl_detai_label.style.display = "block";
				    cash_sl_detai_tbox.style.display = "block";
			  	} else 
			  	{
			  		cash_sl_label.style.display = "none";
				    cash_sl_tbox.style.display = "none";
				    cash_sl_detai_label.style.display = "none";
				    cash_sl_detai_tbox.style.display = "none";
			  	}
			};

			function cheque_sl_add_radio()
			{
				var cheque_add_radio = document.getElementById("cheque_add_radio");

				var cheque_sl_amt_label = document.getElementById("cheque_sl_amt_label");
				var cheque_sl_amt_tbox = document.getElementById("cheque_sl_amt_tbox");
				var cheque_sl_bk_label = document.getElementById("cheque_sl_bk_label");
				var cheque_sl_bk_tbox = document.getElementById("cheque_sl_bk_tbox");
				var cheque_sl_cqno_label = document.getElementById("cheque_sl_cqno_label");
				var cheque_sl_cqno_tbox = document.getElementById("cheque_sl_cqno_tbox");
				var cheque_sl_detail_label = document.getElementById("cheque_sl_detail_label");
				var cheque_sl_detail_tbox = document.getElementById("cheque_sl_detail_tbox");

				if (cheque_add_radio.checked == true)
				{
				    cheque_sl_amt_label.style.display = "block";
				    cheque_sl_amt_tbox.style.display = "block";
				    cheque_sl_bk_label.style.display = "block";
				    cheque_sl_bk_tbox.style.display = "block";
				    cheque_sl_cqno_label.style.display = "block";
				    cheque_sl_cqno_tbox.style.display = "block";
				    cheque_sl_detail_label.style.display = "block";
				    cheque_sl_detail_tbox.style.display = "block";
			  	} else 
			  	{
			  		cheque_sl_amt_label.style.display = "none";
				    cheque_sl_amt_tbox.style.display = "none";
				    cheque_sl_bk_label.style.display = "none";
				    cheque_sl_bk_tbox.style.display = "none";
				    cheque_sl_cqno_label.style.display = "none";
				    cheque_sl_cqno_tbox.style.display = "none";
				    cheque_sl_detail_label.style.display = "none";
				    cheque_sl_detail_tbox.style.display = "none";
			  	}
			};

			function rtgs_ln_recev_add_radio()
			{
				var rtgs_add_radio = document.getElementById("rtgs_add_radio");

				var rtgs_amt = document.getElementById("rtgs_amt");
				var rtgs_amt_tbox = document.getElementById("rtgs_amt_tbox");
				var rtgs_bank = document.getElementById("rtgs_bank");
				var rtgs_bank_tbox = document.getElementById("rtgs_bank_tbox");
				var rtgs_no = document.getElementById("rtgs_no");
				var rtgs_no_tbox = document.getElementById("rtgs_no_tbox");
				var rtgs_detail = document.getElementById("rtgs_detail");
				var rtgs_detail_tbox = document.getElementById("rtgs_detail_tbox");

				if (rtgs_add_radio.checked == true)
				{
				    rtgs_amt.style.display = "block";
				    rtgs_amt_tbox.style.display = "block";
				    rtgs_bank.style.display = "block";
				    rtgs_bank_tbox.style.display = "block";
				    rtgs_no.style.display = "block";
				    rtgs_no_tbox.style.display = "block";
				    rtgs_detail.style.display = "block";
				    rtgs_detail_tbox.style.display = "block";
			  	} else 
			  	{
			     	rtgs_amt.style.display = "none";
				    rtgs_amt_tbox.style.display = "none";
				    rtgs_bank.style.display = "none";
				    rtgs_bank_tbox.style.display = "none";
				    rtgs_no.style.display = "none";
				    rtgs_no_tbox.style.display = "none";
				    rtgs_detail.style.display = "none";
				    rtgs_detail_tbox.style.display = "none";
			  	}
			};

			function upi_sl_add_radio()
			{
				var upi_add_radio = document.getElementById("upi_add_radio");

				var upi_sl_amt_label = document.getElementById("upi_sl_amt_label");
				var upi_sl_amt_tbox = document.getElementById("upi_sl_amt_tbox");
				var upi_sl_trno_label = document.getElementById("upi_sl_trno_label");
				var upi_sl_trno_tbox = document.getElementById("upi_sl_trno_tbox");
				var upi_sl_detail_label = document.getElementById("upi_sl_detail_label");
				var upi_sl_detail_tbox = document.getElementById("upi_sl_detail_tbox");;

				if (upi_add_radio.checked == true)
				{
				    upi_sl_amt_label.style.display = "block";
				    upi_sl_amt_tbox.style.display = "block";
				    upi_sl_trno_label.style.display = "block";
				    upi_sl_trno_tbox.style.display = "block";
				    upi_sl_detail_label.style.display = "block";
				    upi_sl_detail_tbox.style.display = "block";
			  	} else 
			  	{
			  		upi_sl_amt_label.style.display = "none";
				    upi_sl_amt_tbox.style.display = "none";
				    upi_sl_trno_label.style.display = "none";
				    upi_sl_trno_tbox.style.display = "none";
				    upi_sl_detail_label.style.display = "none";
				    upi_sl_detail_tbox.style.display = "none";
			  	}
			};
			function date_fill_sales_list()
			{
				var dt_fill_sales_list = document.getElementById('dt_fill_sales_list').value;
				var today_dt_sales_list = document.getElementById('today_dt_sales_list');
				var week_from_dt_sales_list = document.getElementById('week_from_dt_sales_list');
				var week_to_dt_sales_list = document.getElementById('week_to_dt_sales_list');
				var monthly_dt_sales_list = document.getElementById('monthly_dt_sales_list');
				var from_dt_sales_list = document.getElementById('from_dt_sales_list');
				var to_dt_sales_list = document.getElementById('to_dt_sales_list');
				var from_date_fillter_sales_list = document.getElementById('from_date_fillter_sales_list');
				var to_date_fillter_sales_list = document.getElementById('to_date_fillter_sales_list');

				if (dt_fill_sales_list == "today") 
				{
					today_dt_sales_list.style.display = "block";
					monthly_dt_sales_list.style.display = "none";
					from_dt_sales_list.style.display = "none";
					to_dt_sales_list.style.display = "none";
					week_from_dt_sales_list.style.display = "none";
					week_to_dt_sales_list.style.display = "none";
					$("#today_date_fillter_sales_list").flatpickr({
								dateFormat: "d-m-Y",
							});
				}
				else if (dt_fill_sales_list == "week")
				{
					today_dt_sales_list.style.display = "none";
					week_from_dt_sales_list.style.display = "block";
					week_to_dt_sales_list.style.display = "block";
					monthly_dt_sales_list.style.display = "none";
					from_dt_sales_list.style.display = "none";
					to_dt_sales_list.style.display = "none";

					var curr = new Date; // get current date
					var first = curr.getDate() - curr.getDay(); // First day is the day of the month - the day of the week
					var last = first + 6; // last day is the first day + 6

					var firstday = new Date(curr.setDate(first)).toISOString().slice(0,10);
					firstday = firstday.split("-").reverse().join("-");
					var lastday = new Date(curr.setDate(last)).toISOString().slice(0,10);
					lastday = lastday.split("-").reverse().join("-");
					$('#week_from_date_fillter_sales_list').val(firstday);
					$('#week_to_date_fillter_sales_list').val(lastday);
					
				}
				else if (dt_fill_sales_list == "monthly")
				{
					today_dt_sales_list.style.display = "none";
					monthly_dt_sales_list.style.display = "block";
					from_dt_sales_list.style.display = "none";
					to_dt_sales_list.style.display = "none";
					week_from_dt_sales_list.style.display = "none";
					week_to_dt_sales_list.style.display = "none";
					$("#monthly_date_fillter_sales_list").flatpickr({
								dateFormat: "m-Y",
							});
				}
				else if (dt_fill_sales_list == "custom Date")
				{
					today_dt_sales_list.style.display = "none";
					monthly_dt_sales_list.style.display = "none";
					from_dt_sales_list.style.display = "block";
					to_dt_sales_list.style.display = "block";
					week_from_dt_sales_list.style.display = "none";
					week_to_dt_sales_list.style.display = "none";

					$("#from_date_fillter_sales_list").flatpickr({
								dateFormat: "d-m-Y",
							});
					$("#to_date_fillter_sales_list").flatpickr({
								dateFormat: "d-m-Y",
							});
				}
				else
				{
					today_dt_sales_list.style.display = "none";
					monthly_dt_sales_list.style.display = "none";
					from_dt_sales_list.style.display = "none";
					to_dt_sales_list.style.display = "none";
					week_from_dt_sales_list.style.display = "none";
					week_to_dt_sales_list.style.display = "none";
				}
			}
		</script>
		<!-- Sales list day fillter end -->
	
		<script>
				$("#chit_date").flatpickr({
					dateFormat: "d-m-Y",
				});
		</script>
	</body>
	<!--end::Body-->
</html>

