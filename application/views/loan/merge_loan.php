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

  #view_only
  {
  	background: rgba(80, 205, 137, 0.5) !important;
  	/*background-color: unset !important;
  	color: unset !important;*/
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

  #view_only
  {
  	background: rgba(80, 205, 137, 0.5) !important;
  	/*background-color: unset !important;
  	color: unset !important;*/
  }
  #kt_modal_view_individual_loan_party_2{

  	background-color: #0000007d !important;
  }
   #kt_modal_view_individual_loan_party_1{

  	background-color: #0000007d !important;
  }
    .error {
    border: solid 2px #f31700 !important;
	border-color:#f31700 !important;
}
</style>
<link href="assets/jquery.autocomplete.css" rel="stylesheet" type="text/css"/>
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
									<h1 class="d-flex align-items-center text-dark fw-bold my-1 fs-3">Merge Loan
									<!--begin::Separator-->
									<span class="h-20px border-gray-400 border-start ms-3 mx-2"></span>
									<!-- <label class="d-flex align-items-center text-primary fw-bold my-1 fs-5">
										<span>Company &emsp;-</span>
										<span>&emsp;All</span>
									</label>
									<span class="h-20px border-gray-400 border-start ms-3 mx-2"></span>
									<label class="d-flex align-items-center text-primary fw-bold my-1 fs-5">
										<span>Status &emsp;-</span>
										<span>&emsp;All</span>
									</label>
									<span class="h-20px border-gray-400 border-start ms-3 mx-2"></span>
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
									<!--begin::Tables Widget 9-->
									<div class="card card-xxl-stretch mb-5 mb-xl-8">
										<!--begin::Card body-->
										<div class="card-body py-4">
											<div class="row">
												<div class="col-lg-6">
													<div class="px-4" style="border-radius: 10px;padding-bottom: 10px;box-shadow: 0 5px 10px #00002947;">
														<label class="col-lg-12 col-form-label fw-bold fs-5 text-center">Party Basic Details</label>
														<div class="row">
															<div class="col-lg-6">
																<div class="row">
																	<label class="col-lg-4 col-form-label fw-semibold fs-6">Name</label>
																		<div class="col-lg-8 fv-row fv-plugins-icon-container">
																				<input type="text"  class="form-control form-control-lg1 form-control-solid" placeholder="Party Name" id="partynamesearch" name="partynamesearch" value=""/>

																				<input type="hidden" name="first_name_id_hidden" id="first_name_id_hidden" value="">
																				<div class="fv-plugins-message-container invalid-feedback" id=""></div>
																		</div>
																		<label class="col-lg-12 col-form-label fw-bold fs-6" id="no_card" name="no_card" style="display: none"><i class="fa fa-address-card fs-6" aria-hidden="true" title="Card No"></i>&emsp;<a href="<?php echo base_url();?>Membership" target="_blank"><span style="color: red" >Click Here for<br> <b>New Membership Card</b></span></a>
																		</label>
																		<label class="col-lg-12 col-form-label fw-bold fs-6"><i class="fa fa-address-card fs-6" aria-hidden="true" title="Card No"></i>&emsp;<span id="membership_card_no" name="membership_card_no">1234-5678-9123-1234</span>
																		<i class="fas fa-times-circle fs-5" style="color:red;"></i>
																		</label>
																		<label class="col-lg-4 col-form-label fw-bold fs-6 text-center" name="lbl_mem_card_no" id="lbl_mem_card_no" ><span style="background-color:#FFAA00;border-radius: 8px;padding: 5px 15px 5px 15px;">Gold</span></label>
																		<label class="col-lg-4 col-form-label fw-bold fs-6" name="" id="lbl_mem_point"><i class="fa-solid fa-coins fs-6" title="Points"></i>&emsp;<span id="membership_card_points" name="membership_card_points">000</span></label>
																		<div class="col-lg-4" id="lbl_mem_verify">
																			<p class="btn btn-sm btn-outline btn-outline-solid btn-outline-warning btn-active-light-primary me-2" data-bs-toggle="modal" data-bs-target="#kt_modal_verify_membership_card" id="btn_verify_popup" name="btn_verify_popup" tabindex="2">Verify</p>
																		</div>
																		<label class="col-lg-4 col-form-label fw-bold fs-6 text-center" name="card_type" id="card_type" ></label> 
																		<label class="col-lg-4 col-form-label fw-semibold fs-6">Nominee</label><div class="col-lg-4 fv-row fv-plugins-icon-container">
																		<input type="text" name="nom_name" id="nom_name" class="form-control form-control-lg1 form-control-solid" placeholder="Nominee Name" oninput="this.value = this.value.replace(/[^A-Za-z. ]/g, '').replace(/(\..*)\./g, '$1');" tabindex="3">
																		<input type="hidden" name="nom_id" id="nom_id" class="form-control form-control-lg1 form-control-solid" placeholder="Nominee Name" value="0">
																		</div>
																</div>
															</div>
															<div class="col-lg-6">
																<div class="row">
																	<label class="col-lg-12 col-form-label fw-bold fs-6" >
																		<i class="fa fa-user fs-6" aria-hidden="true" title="Last Name" ></i>&emsp;<span id="partylastname" >-</span></label>
																		<input type="hidden" name="partylastnameval" id="partylastnameval" value=""/>
																	<label class="col-lg-12 col-form-label fw-bold fs-6" >
																		<i class="fa-solid fa-location-dot fs-6" aria-hidden="true" title="Address"></i>
																	&emsp;<span name="address" id="address"></span> <i class="fas fa-info-circle fs-6" id="location" title=""></i></label>
																	<label class="col-lg-12 col-form-label fw-bold fs-6" name="" id="">
																			<i class="fas fa-mobile-android-alt fs-6" aria-hidden="true" title="Mobile"></i>
																		&emsp;<span name="mobile" id="mobile"></span></label>
																	<label class="col-lg-4 col-form-label fw-semibold fs-6">Rating</label>
																	<label class="col-lg-8 col-form-label fw-bold fs-6">
																		<span><i class="fa-solid fa-star" style="color:#50cd89;"></i></span>
																	&nbsp;Good</label>
																</div>
															</div>
														</div>
														<div class="row mt-4 mb-4">
															<div class="col-lg-4 fv-row">
																<div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url(assets/media/svg/avatars/blank.svg)" id="party_photo" name="party_photo">
																		<div class="image-input-wrapper"  style="background-image: url(<?php echo base_url();?>assets/images/party.jpg)"></div>
																	</div>
															</div>
															<div class="col-lg-4 fv-row">
															<div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url(assets/media/svg/avatars/aadhaar_blank.png)" id="id_photo" name="id_photo">
																		<div class="image-input-wrapper"  style="background-image: url(<?php echo base_url();?>assets/images/party_proof.jpg)"></div>
																	</div>
															</div>
															<div class="col-lg-4 fv-row">
																<div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url(assets/media/svg/avatars/signature_blank.png)">
																		<div class="image-input-wrapper"  style="background-image: url(<?php echo base_url();?>assets/images/signature.jpg)"></div>
																	</div>
															</div>
														</div>
													</div>
												</div>
												<div class="col-lg-6">
													<div class="px-4" style="border-radius: 10px;padding-bottom: 10px;box-shadow: 0 5px 10px #00002947;">
														<!-- <label class="col-lg-12 col-form-label fw-bold fs-5 text-center">Loan Information</label> -->
														<div class="row">
															<div class="col-lg-6 text-end">
																<label class="col-form-label fw-bold fs-5">Loan Information</label>
															</div>
															<div class="col-lg-6 text-center">
																<label class="col-form-label fw-bold fs-4" title="New Loan No" id="partybillno" name="partybillno">TIP-1234/23</label>
															</div>
														</div>
														<div class="row">
															<label class="col-lg-2 col-form-label fw-semibold fs-6">Company</label>
															<div class="col-lg-10 fv-row fv-plugins-icon-container">
																<select class="form-select form-select-solid" id="company" name="company" data-control="select2" data-hide-search="true">	
																	<option value="">Select Company</option>
																		<?php foreach($company_list as $clist) {?>
																		<option value="<?php echo $clist['COMPANYCODE']?>" <?php echo ($clist['COMPANYCODE']==$_SESSION['COMPANYCODE'])?'selected':''; ?>><?php echo $clist['COMPANYNAME'];?></option>
																		<?php }?>
																</select>
															</div>
															<div class="col-lg-8">
																<div class="row">
																	<label class="col-lg-3 col-form-label fw-semibold fs-6">Date</label>
																	<div class="col-lg-8 fv-row">
																		<div class="d-flex align-items-center">
																			<span class="svg-icon position-absolute ms-4 svg-icon-2 dt">
																				<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																					<path opacity="0.3" d="M21 22H3C2.4 22 2 21.6 2 21V5C2 4.4 2.4 4 3 4H21C21.6 4 22 4.4 22 5V21C22 21.6 21.6 22 21 22Z" fill="currentColor" />
																					<path d="M6 6C5.4 6 5 5.6 5 5V3C5 2.4 5.4 2 6 2C6.6 2 7 2.4 7 3V5C7 5.6 6.6 6 6 6ZM11 5V3C11 2.4 10.6 2 10 2C9.4 2 9 2.4 9 3V5C9 5.6 9.4 6 10 6C10.6 6 11 5.6 11 5ZM15 5V3C15 2.4 14.6 2 14 2C13.4 2 13 2.4 13 3V5C13 5.6 13.4 6 14 6C14.6 6 15 5.6 15 5ZM19 5V3C19 2.4 18.6 2 18 2C17.4 2 17 2.4 17 3V5C17 5.6 17.4 6 18 6C18.6 6 19 5.6 19 5Z" fill="currentColor" />
																					<path d="M8.8 13.1C9.2 13.1 9.5 13 9.7 12.8C9.9 12.6 10.1 12.3 10.1 11.9C10.1 11.6 10 11.3 9.8 11.1C9.6 10.9 9.3 10.8 9 10.8C8.8 10.8 8.59999 10.8 8.39999 10.9C8.19999 11 8.1 11.1 8 11.2C7.9 11.3 7.8 11.4 7.7 11.6C7.6 11.8 7.5 11.9 7.5 12.1C7.5 12.2 7.4 12.2 7.3 12.3C7.2 12.4 7.09999 12.4 6.89999 12.4C6.69999 12.4 6.6 12.3 6.5 12.2C6.4 12.1 6.3 11.9 6.3 11.7C6.3 11.5 6.4 11.3 6.5 11.1C6.6 10.9 6.8 10.7 7 10.5C7.2 10.3 7.49999 10.1 7.89999 10C8.29999 9.90003 8.60001 9.80003 9.10001 9.80003C9.50001 9.80003 9.80001 9.90003 10.1 10C10.4 10.1 10.7 10.3 10.9 10.4C11.1 10.5 11.3 10.8 11.4 11.1C11.5 11.4 11.6 11.6 11.6 11.9C11.6 12.3 11.5 12.6 11.3 12.9C11.1 13.2 10.9 13.5 10.6 13.7C10.9 13.9 11.2 14.1 11.4 14.3C11.6 14.5 11.8 14.7 11.9 15C12 15.3 12.1 15.5 12.1 15.8C12.1 16.2 12 16.5 11.9 16.8C11.8 17.1 11.5 17.4 11.3 17.7C11.1 18 10.7 18.2 10.3 18.3C9.9 18.4 9.5 18.5 9 18.5C8.5 18.5 8.1 18.4 7.7 18.2C7.3 18 7 17.8 6.8 17.6C6.6 17.4 6.4 17.1 6.3 16.8C6.2 16.5 6.10001 16.3 6.10001 16.1C6.10001 15.9 6.2 15.7 6.3 15.6C6.4 15.5 6.6 15.4 6.8 15.4C6.9 15.4 7.00001 15.4 7.10001 15.5C7.20001 15.6 7.3 15.6 7.3 15.7C7.5 16.2 7.7 16.6 8 16.9C8.3 17.2 8.6 17.3 9 17.3C9.2 17.3 9.5 17.2 9.7 17.1C9.9 17 10.1 16.8 10.3 16.6C10.5 16.4 10.5 16.1 10.5 15.8C10.5 15.3 10.4 15 10.1 14.7C9.80001 14.4 9.50001 14.3 9.10001 14.3C9.00001 14.3 8.9 14.3 8.7 14.3C8.5 14.3 8.39999 14.3 8.39999 14.3C8.19999 14.3 7.99999 14.2 7.89999 14.1C7.79999 14 7.7 13.8 7.7 13.7C7.7 13.5 7.79999 13.4 7.89999 13.2C7.99999 13 8.2 13 8.5 13H8.8V13.1ZM15.3 17.5V12.2C14.3 13 13.6 13.3 13.3 13.3C13.1 13.3 13 13.2 12.9 13.1C12.8 13 12.7 12.8 12.7 12.6C12.7 12.4 12.8 12.3 12.9 12.2C13 12.1 13.2 12 13.6 11.8C14.1 11.6 14.5 11.3 14.7 11.1C14.9 10.9 15.2 10.6 15.5 10.3C15.8 10 15.9 9.80003 15.9 9.70003C15.9 9.60003 16.1 9.60004 16.3 9.60004C16.5 9.60004 16.7 9.70003 16.8 9.80003C16.9 9.90003 17 10.2 17 10.5V17.2C17 18 16.7 18.4 16.2 18.4C16 18.4 15.8 18.3 15.6 18.2C15.4 18.1 15.3 17.8 15.3 17.5Z" fill="currentColor" />
																				</svg>
																			</span>
																			<input class="form-control form-control-solid ps-12" name="" placeholder="Date" id="kt_datepicker_merge_loan_date" value="<?php echo date("d-m-Y"); ?>"/>
																		</div>
																	</div>
																</div>
																<div class="row">
																	<label class="col-lg-3 col-form-label fw-semibold fs-6">JewelType</label>
																	<label class="col-lg-8 col-form-label fw-bold fs-6">Gold</label>
																</div>
																<div class="row">
																	<label class="col-lg-3 col-form-label fw-semibold fs-6">Scheme</label>
																	<div class="col-lg-8 fv-row fv-plugins-icon-container">
																		<select class="form-select form-select-solid" name="" id="" data-control="select2" data-hide-search="true">	
																			<option value="">Select</option>
																			<option value="mip">MIP</option>
																			<option value="tip">TIP</option>
																			<option value="sip">SIP</option>
																		</select>
																	</div>
																</div>
																<div class="row">
																	<label class="col-lg-3 col-form-label fw-semibold fs-6">Int Type</label>
																	<div class="col-lg-8 fv-row fv-plugins-icon-container">
																		<select class="form-select form-select-solid" name="int_type" id="int_type" data-control="select2" data-hide-search="true">	
																			<option value="">Select</option>
																			<option value="1.00">1.00</option>
																			<option value="1.25">1.25</option>
																			<option value="1.50">1.50</option>
																			<option value="1.75">1.75</option>
																			<option value="2.00">2.00</option>
																		</select>
																	</div>
																</div>
																<div class="row">
																	<label class="col-lg-4 col-form-label fw-semibold fs-6">Expiry Date</label>
																	<label class="col-lg-6 col-form-label fw-bold fs-6">17-06-2023</label>
																</div>
															</div>
															<div class="col-lg-4">
																<div class="row mt-4">
																	<div class="col-lg-8 fv-row">
																		<!--begin::Image input-->
																		<div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url(assets/media/svg/avatars/jewel_blank.png)">
																				<!--begin::Preview existing avatar-->
																				<div class="image-input-wrapper  w-150px h-150px"  style="background-image: url(assets/media/svg/avatars/jewel_blank.png)"></div>
																				<!--end::Preview existing avatar-->
																				<!--begin::Label-->
																				<label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" data-kt-initialized="1" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
																					<!-- <button class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
																						<i class="fas fa-ellipsis-v fs-6"></i>
																					</button> -->
																					<i class="fas fa-ellipsis-v fs-6"></i>
																					<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px py-1 fs-6" data-kt-menu="true" style="">
																						<div class="menu-item px-3">
																							<a href="#" class="menu-link px-3">Upload File</a>
																						</div>
																						<div class="menu-item px-3">
																							<a href="#" class="menu-link flex-stack px-3" data-bs-toggle="modal" data-bs-target="#kt_modal_camera">Camera</a>
																						</div>
																					</div>
																					<!-- <i class="bi bi-pencil-fill fs-10"></i> -->
																					<!--begin::Inputs-->
																					<input type="file" name="add_party_new_loan" accept=".png, .jpg, .jpeg">
																					<input type="hidden" name="add_party_remove_new_loan">
																					<!--end::Inputs-->
																				</label>
																				<!--end::Label-->
																				<!--begin::Cancel-->
																				<span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" data-kt-initialized="1">
																					<i class="bi bi-x fs-6"></i>
																				</span>
																				<!--end::Cancel-->
																				<!--begin::Remove-->
																				<span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" data-kt-initialized="1">
																					<i class="bi bi-x fs-6"></i>
																				</span>
																				<!--end::Remove-->
																		</div>
																		<!--end::Image input-->
																	</div>
																</div>
															</div>
														</div>
														<div class="row">
															<label class="col-lg-12 fw-bold fs-5 text-center">Interest Variation Details</label>
															<label class="col-lg-12 fw-bold fs-6 text-center">
																<span style="background-color:#1ecbe1;border-radius: 8px;padding: 5px 10px 5px 10px;">17-03-23</span>
																<span style="background-color:#ffb300;border-radius: 8px;padding: 5px 10px 5px 10px;">1.5</span>&emsp;
																<span style="background-color:#1ecbe1;border-radius: 8px;padding: 5px 10px 5px 10px;">17-04-23</span>
																<span style="background-color:#ffb300;border-radius: 8px;padding: 5px 10px 5px 10px;">1.75</span>&emsp;
																<span style="background-color:#1ecbe1;border-radius: 8px;padding: 5px 10px 5px 10px;">17-05-23</span>
																<span style="background-color:#ffb300;border-radius: 8px;padding: 5px 10px 5px 10px;">2.00</span>
															</label>
														</div><br>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-lg-12 mt-2">
													<div class="px-4" style="border-radius: 10px;padding-bottom: 10px;box-shadow: 0 5px 10px #00002947;">
														<h4 class="fw-bold py-3">Loan List</h4>
														<table class="table align-middle table-row-dashed table-striped table-hover fs-7 gy-1 gs-2" id="loan_list_table">
															<thead>
																<tr class="text-start text-muted fw-bold fs-7 gs-0">
																	<th class="w-25px">
											            	<!-- <label class="form-check form-check-solid is-invalid mt-4"> -->
																			<input class="form-check-input" type="checkbox" onclick="checkAll(this)">
																			 <!-- style="background-color:#508acd !important"> -->
																			<span class="fs-7">All</span>
																		<!-- </label> -->
											            </th>
											            <th class="w-25px">Company</th>
											            <th class="w-50px">Loan No</th>
											            <th class="w-25px">Pledge</th>
											            <th class="w-50px">No of Item</th>
											            <th class="w-50px">Weight<br>(gms)</th>
											            <th class="w-50px">St.Wgt<br>(gms)</th>
											            <th class="w-50px">Less<br>(gms)</th>
											            <th class="w-50px">Nt Wgt<br>(gms)</th>
											            <th class="w-50px">Pure Wgt<br>(gms)</th>
											            <th class="w-50px">Img</th>
											            <th class="w-50px" style="max-width:95px !important;">Prin.Amt</th>
											            <th class="w-50px" style="max-width:95px !important;">Int.Amt</th>
											            <th class="w-50px" style="max-width:95px !important;">Tot.Amt</th>
											            <th class="w-25px" style="max-width:80px !important;">Action</th>
																</tr>
															</thead>
															<tbody class="text-gray-600 fw-semibold">
																<tr>
																	<td>
													    			<label class="form-check form-check-inline form-check-solid is-invalid">
																			<input class="form-check-input" type="checkbox">
																		</label>
													    		</td>
													    		<td class="ple1">AGB - Main Branch Ayyanar Gold Bankers SKD</td>
													    		<td class="ple1">MIP-430/22</td>
											            <td class="ple1">MURUKKU  MATTAL-2(SEAL ILLAI), L.RING-1(VK GV 22 CT  SEA,L ULLATHU  ROSE GREEN WHITE STONE ULLATHU), L.RING-1(SS NB  22 CT SEAL ULLATHU ORU STONE ILLAI), TRAPS-2(SGR 22 CT SEAKL ULLATHU  1+1 STONE ULLATHU  5+5 CHAINE ULLATHU)</td>
											            <td>6</td>
											            <td>8.000</td>
											            <td>0.200</td>
											            <td>0.200</td>
											            <td>7.600</td>
											            <td>6.688</td>
											            <td>
											            	<div class="image-input mt-2 me-6" data-kt-image-input="true">
																			<div class="image-input-wrapper w-40px h-40px"style="background-image: url(assets/images/mip-430_22.jpg)"></div>
																		</div>
											            </td>
											            <td class="ple1">27,000.00</td>
											            <td class="ple1">4,000.00</td>
											            <td class="ple1">31,000.00</td>
											            <td>
											            	<a href="#" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm" data-bs-toggle="modal" data-bs-target="#kt_modal_view_individual_loan">
																			<i class="bi bi-eye-fill eyc" style="font-size: 16px !important;"></i>
																		</a>
											            </td>
											        	</tr>
											        	<tr>
																	<td>
													    			<label class="form-check form-check-inline form-check-solid is-invalid">
																			<input class="form-check-input" type="checkbox">
																		</label>
													    		</td>
													    		<td class="ple1">AGB - Main Branch Ayyanar Gold Bankers SKD</td>
													    		<td class="ple1">TIP-1452/22</td>
											            <td class="ple1">DRAPS-2(916 HALLMARK 22K M/M  SEALED. RED ENAMAL), DESIGN TRAPS-2(EJ 916 SEALED.2+2 CHAIN THONGUM)</td>
											            <td>4</td>
											            <td>5.300</td>
											            <td>0.200</td>
											            <td>0.300</td>
											            <td>4.800</td>
											            <td>4.368</td>
											            <td>
											            	<div class="image-input mt-2 me-6" data-kt-image-input="true">
																			<div class="image-input-wrapper w-40px h-40px"style="background-image: url(assets/images/tip-1452_22.jpg)"></div>
																		</div>
											            </td>
											            <td class="ple1">8,000.00</td>
											            <td class="ple1">1,000.00</td>
											            <td class="ple1">9,000.00</td>
											            <td>
											            	<a href="#" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm" data-bs-toggle="modal" data-bs-target="#kt_modal_view_individual_loan">
																			<i class="bi bi-eye-fill eyc" style="font-size: 16px !important;"></i>
																		</a>
											            </td>
											        	</tr>
														   </tbody>
														   <tfoot class="text-dark fw-bold fs-7" style="color: black !important;">
														   	<tr>
														   		<th class="w-25px"></th>
											            <th class="w-50px"></th>
											            <th class="w-50px"></th>
											            <th class="w-50px"></th>
											            <th class="w-50px">Total</th>
											            <th class="w-50px">13.300</th>
											            <th class="w-50px">0.400</th>
											            <th class="w-50px">0.500</th>
											            <th class="w-50px">12.400</th>
											            <th class="w-50px">11.056</th>
											            <th class="w-50px"></th>
											            <th class="w-50px" style="max-width:95px !important;">35,000.00</th>
											            <th class="w-50px" style="max-width:95px !important;">5,000.00</th>
											            <th class="w-50px" style="max-width:95px !important;">40,000.00</th>
											            <th class="w-25px" style="max-width:80px !important;"></th>
														   	</tr>
														   </tfoot>
														</table>
													</div>
												</div>
											</div>
											<div class="row mt-2">
												<div class="col-lg-4">
													<div class="row">
														<label class="col-lg-6 col-form-label required fw-semibold fs-6">Request From New Loan</label>
														<div class="col-lg-6">
															<input type="text" name="" id="" class="form-control form-control-lg form-control-solid" value="10,000.00">
															<div class="fv-plugins-message-container invalid-feedback" id=""></div>
														</div>
													</div>
												</div>
												<div class="col-lg-4">
													<div class="row">
														<label class="col-lg-4 col-form-label fw-bold fs-4">Net Amount</label>
														<label class="col-lg-8 col-form-label fw-bold fs-4">40,000.00</label>
													</div>
												</div>
												<div class="col-lg-4">
													<div class="row">
														<label class="col-lg-6 col-form-label fw-bold fs-4">New Loan Amount</label>
														<label class="col-lg-6 col-form-label fw-bold fs-4">50,000.00</label>
													</div>
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
																<input type="text" name="add_lnamt_new_loan" id="add_lnamt_new_loan" class="form-control form-control-lg1 form-control-solid" style="font-size: 18px !important;font-weight: 700 !important;color: #1B439E !important;" value="50,000.00">
																<div class="fv-plugins-message-container invalid-feedback"></div>
															</div>
															<!--end::Col-->
														</div>
														<div class="row">
															<!--begin::Label-->
															<label class="col-lg-6 col-form-label fw-semibold fs-6">Monthly Interest</label>
															<label class="col-lg-6 col-form-label fw-bold fs-5"><span style="background-color:#C6C6C6;border-radius: 8px;padding: 5px 15px 5px 15px;">0000</span></label>
														</div>
														<div class="row">
															<!--begin::Label-->
															<label class="col-lg-6 col-form-label required fw-semibold fs-6">Redemption period</label>
															<!--end::Label-->
															<!--begin::Col-->
															<div class="col-lg-3 fv-row fv-plugins-icon-container">
																<input type="text" name="add_lnperiod_new_loan" id="add_lnperiod_new_loan" class="form-control form-control-lg1 form-control-solid" value="">
																<div class="fv-plugins-message-container invalid-feedback"></div>
															</div>
															<!--end::Col-->
															<label class="col-lg-3 col-form-label fw-semibold fs-6" id="loan_per_mon_days">Days</label>
														</div>
														<div class="row">
															<label class="col-lg-6 col-form-label fw-semibold fs-6">M.Points Add</label>
															<div class="col-lg-3 fv-row fv-plugins-icon-container">
																<input type="text" name="m_points_ad" id="m_points_ad" class="form-control form-control-lg1 form-control-solid" value="0">
																<div class="fv-plugins-message-container invalid-feedback"></div>
															</div>
														</div>
														<div class="row">
															<label class="col-lg-6 col-form-label fw-semibold fs-6">Customer Rating</label>
															<div class="col-lg-6 fv-row fv-plugins-icon-container">
																<select class="form-select form-select-solid" data-control="select2" data-hide-search="true" name="cust_rating" id="cust_rating" onchange="set_customer_rating()">
																	<option value="">Select Rating</option>
																	<option value="916">Good</option>
																	<option value="NKM">Average</option>
																	<option value="STG">Bad</option>
																</select>
															</div>
														</div><br><br>
														<div class="row mt-3 mb-1">
															<div class="d-flex justify-content-center align-items-center">
																<label class="col-form-label fw-bold fs-3 mt-10">Total Loan Amount &emsp; <span>50,000.00</span></label>
															</div>
														</div>
													</div>
												</div>
												<div class="col-lg-4">
													<div class="px-4" style="border-radius: 10px;padding-bottom: 15px;box-shadow: 0 5px 10px #00002947;">
														<label class="col-lg-12 col-form-label fw-bold fs-5 text-center">Payment To Receive</label>
														<div class="row">
															<!--begin::Label-->
															<label class="col-lg-6 col-form-label fw-semibold fs-6">Processing Charge</label>
															<!--end::Label-->
															<!--begin::Col-->
															<div class="col-lg-6 fv-row fv-plugins-icon-container">
																<input type="text" name="processing_charge" id="processing_charge" class="form-control form-control-lg1 form-control-solid" placeholder="Processing Charge" value="20">
																<div class="fv-plugins-message-container invalid-feedback"></div>
															</div>
															<!--end::Col-->
														</div>
														<div class="row">
															<!--begin::Label-->
															<label class="col-lg-6 col-form-label fw-semibold fs-6">Document Charge</label>
															<label class="col-lg-6 col-form-label fw-bold fs-5">30</label>
														</div>
														<div class="row">
															<!--begin::Label-->
															<label class="col-lg-6 col-form-label fw-semibold fs-6">Total</label>
															<label class="col-lg-6 col-form-label fw-bold fs-5">50.00</label>
														</div>
														<div class="row">
															<!--begin::Label-->
															<label class="col-lg-6 col-form-label fw-semibold fs-6">Deduct From</label>
															<div class="col-lg-6">
																<label class="form-check form-check-inline form-check-solid is-invalid mb-1">
																	<input class="form-check-input" name="" type="checkbox" checked id="">
																	<span class="col-form-label fw-semibold fs-6">Loan Amt</span>
																</label>
																<label class="form-check form-check-inline form-check-solid is-invalid">
																	<input class="form-check-input" name="" type="checkbox" value="checked" id="">
																	<span class="col-form-label fw-semibold fs-6">Pay Separate</span>
																</label>
															</div>
														</div>
														<div class="row">
															<!--begin::Label-->
															<label class="col-lg-6 col-form-label required fw-semibold fs-6">On Account</label>
															<!--end::Label-->
															<!--begin::Col-->
															<div class="col-lg-6 fv-row fv-plugins-icon-container">
																<input type="text" name="on_account" id="on_account" class="form-control form-control-lg1 form-control-solid" placeholder="" style="background-color: #ff5b5b; color: white" value="0">
																<div class="fv-plugins-message-container invalid-feedback"></div>
															</div>
															<!--end::Col-->
														</div>
														<div class="row">
															<!--begin::Label-->
															<label class="col-lg-6 col-form-label fw-semibold fs-6">Deduct From</label>
															<div class="col-lg-6">
																<label class="form-check form-check-inline form-check-solid is-invalid mb-1">
																	<input class="form-check-input" name="" type="checkbox" value="checked" id="">
																	<span class="col-form-label fw-semibold fs-6">Loan Amt</span>
																</label>
																<label class="form-check form-check-inline form-check-solid is-invalid">
																	<input class="form-check-input" name="" type="checkbox" value="checked" id="">
																	<span class="col-form-label fw-semibold fs-6">Pay Separate</span>
																</label>
															</div>
														</div><br>
														<div class="row mt-4">
															<label class="col-lg-6 col-form-label fw-bold fs-3 text-center">Total &emsp; <span>50.00</span></label>
															<div class="col-lg-6 d-flex justify-content-end">
																<button class="btn btn-sm btn-outline btn-outline-solid btn-outline-warning btn-active-light-primary me-2" data-bs-toggle="modal" data-bs-target="#kt_modal_payment_to_receive">Receive</button>
															</div>
														</div>
													</div>
												</div>
												<div class="col-lg-4">
													<div class="px-4" style="border-radius: 10px;box-shadow: 0 5px 10px #00002947;">
														<label class="col-lg-12 col-form-label fw-bold fs-5 text-center">To Pay</label>
														<div class="row">
															<label class="col-lg-4 col-form-label fw-bold fs-3">Net Pay</label>
															<label class="col-lg-4 col-form-label fw-bold fs-3">9,950.00</label>
															<div class="col-lg-4">
																<button class="btn btn-sm btn-outline btn-outline-solid btn-outline-warning btn-active-light-primary me-2" data-bs-toggle="modal" data-bs-target="#kt_modal_view_payment">Pay Now</button>
															</div>
														</div>
														<div class="row">
															<label class="col-lg-4 col-form-label fw-semibold fs-6">Remarks</label>
														</div>
														<div class="row">
															<div class="col-lg-12 fv-row fv-plugins-icon-container">
																<textarea class="form-control form-select-solid fw-semibold fs-5" rows="11" id=""></textarea>
																<div class="fv-plugins-message-container invalid-feedback"></div>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="d-flex align-items-center">
													<label class="form-check form-check-inline form-check-solid me-5 is-invalid">
														<input class="form-check-input" name="" type="checkbox" value="checked" id="">
													</label>
													<span class="col-form-label fw-bold fs-4">I am promising that, I will be the responsible for any miscounting of money and fakeness of the jewel of this particular loan. I have properly checked all the jewels and its seal, Then submitting this application to sanction the loan for the Customer</span>
												</div>
											</div>
											<div class="d-flex justify-content-end align-items-center">
												<button type="reset" class="btn btn-secondary me-2" data-bs-dismiss="modal">Cancel</button>
												<button type="submit" class="btn btn-primary" id="save_changes_add_new_loan">Merge Loan</button>
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
		<!--begin::Modal - verify Lock Out-->
		<div class="modal fade" id="kt_modal_verify_lockout" tabindex="-1" aria-hidden="true">
			<!--begin::Modal dialog-->
			<div class="modal-dialog modal-m">
				<!--begin::Modal content-->
				<div class="modal-content rounded">
					<div class="swal2-icon swal2-warning swal2-icon-show" style="display: flex;">
						<div class="swal2-icon-content">&#x2713;</div></div>
						<div class="swal2-html-container" id="swal2-html-container" style="display: block;">
							<b><span>MIP-260/23</span></b>
							<p class="mt-2">Are you sure you want to Lock Out?</p></div>
						<div class="d-flex flex-center flex-row-fluid pt-3">
							<button type="submit" class="btn btn-primary me-3" data-bs-dismiss="modal">Yes</button>
							<button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
						</div><br><br>
				</div>
				<!--end::Modal content-->
			</div>
			<!--end::Modal dialog-->
		</div>
		<!--end::Modal - verify Lock Out-->
		<!--begin::Modal - Sale to CCL List Page-->
		<div class="modal fade" id="sale_to_ccl_list" tabindex="-1" aria-hidden="true">
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
							<h1 class="mb-3">Sale Value for Pledge Item</h1>
						</div>
						<div class="row">
							<label class="col-lg-1 col-form-label fw-semibold fs-6">Date</label>
							<label class="col-lg-2 col-form-label fw-bold fs-6">20-01-2023</label>
							<label class="col-lg-1 col-form-label fw-semibold fs-6">Company</label>
							<label class="col-lg-5 col-form-label fw-bold fs-6">AGB - Main Branch Sayalkudi</label>
							<label class="col-lg-1 col-form-label fw-semibold fs-6">Loan No</label>
							<label class="col-lg-2 col-form-label fw-bold fs-6">MIP-256/23</label>
						</div>
						<div class="row mt-4">
          		<!-- <label class="col-form-label fw-bold fs-5">Pledge Items</label> -->
          		<table class="table align-middle table-row-dashed table-striped table-hover fs-7 gy-1 gs-2" id="sale_entry_table">
								<thead>
									<tr class="text-start text-muted fw-bold fs-7 gs-0">
										<th class="min-w-25px">Sno</th>
				            <th class="min-w-100px">Item-Sub Item</th>
				            <th class="min-w-50px">Quality</th>
				            <th class="min-w-50px">Purity(%)</th>
				            <th class="min-w-80px">Weight(gms)</th>
				            <th class="min-w-50px">St.Wgt(gms)</th>
				            <th class="min-w-50px">Less(gms)</th>
				            <th class="min-w-80px">Nt Wgt(gms)</th>
				            <th class="min-w-50px">Img</th>
									</tr>
								</thead>
								<tbody class="text-gray-600 fw-semibold">
									<tr>
										<td>1</td>
				            <td class="ple1">Chain-Hand Chain</td>
				            <td>KDM</td>
				            <td>91</td>
				            <td>2.400</td>
				            <td>0.100</td>
				            <td>0.100</td>
				            <td>2.200</td>
				            <td>
				            	<div class="image-input mt-2 me-6" data-kt-image-input="true">
												<div class="image-input-wrapper w-40px h-40px"style="background-image: url(assets/images/sample_jewel.jpg)"></div>
											</div>
				            </td>
				        	</tr>
						   		<tr>
						   			<td>2</td>
				            <td>Chain-Baby Chain</td>
				            <td>KDM</td>
				            <td>91</td>
				            <td>1.200</td>
				            <td>0.100</td>
				            <td>0.100</td>
				            <td>1.000</td>
				            <td>
				            	<div class="image-input mt-2 me-6" data-kt-image-input="true">
												<div class="image-input-wrapper w-40px h-40px"style="background-image: url(assets/images/sample_jewel.jpg)"></div>
											</div>
				            </td>
						       </tr>
							   </tbody>
							</table>
          	</div>
          	<div class="row">
							<label class="col-lg-1 col-form-label fw-semibold fs-6">Weight</label>
							<label class="col-lg-1 col-form-label fw-bold fs-6">3.600</label>
							<label class="col-lg-1 col-form-label fw-semibold fs-6">Stoneless</label>
							<label class="col-lg-1 col-form-label fw-bold fs-6">0.200</label>
							<label class="col-lg-1 col-form-label fw-semibold fs-6">Less</label>
							<label class="col-lg-1 col-form-label fw-bold fs-6">0.200</label>
							<label class="col-lg-1 col-form-label fw-semibold fs-6">Net.Wght</label>
							<label class="col-lg-1 col-form-label fw-bold fs-6">3.200</label>
							<label class="col-lg-1 col-form-label fw-semibold fs-6">CurrRate</label>
							<label class="col-lg-1 col-form-label fw-bold fs-6">4571.00</label>
							<label class="col-lg-1 col-form-label fw-semibold fs-6">Purity%</label>
							<label class="col-lg-1 col-form-label fw-bold fs-6">91</label>
						</div>
						<div class="row">
							<label class="col-lg-1 col-form-label required fw-semibold fs-6">Sales Amount</label>
							<div class="col-lg-3">
								<input type="text" class="form-control form-control-lg1 form-control-solid" placeholder="Sales Amount" name="" id="" value="20000.00">
								<div class="fv-plugins-message-container invalid-feedback"></div>
							</div>
							<label class="col-lg-1 col-form-label fw-bold fs-6">
								<span style="background-color:#B6BD4F;border-radius: 8px;padding: 5px 15px 5px 15px;">Profit</span>
							</label>
							<!-- <label class="col-lg-1 col-form-label fw-bold fs-6">
								<span style="background-color:red;color: white; border-radius: 8px;padding: 5px 15px 5px 15px;">Loss</span>
							</label> -->
							<label class="col-lg-2 col-form-label fw-bold fs-5">5000.00</label>
							<label class="col-lg-1 col-form-label fw-semibold fs-6">Sales To</label>
							<label class="col-lg-4 col-form-label fw-bold fs-6">AGM - A GOLD MAIN - & OLD GOLD PURCHES</label>
						</div>
						<!-- <div class="row">
							<label class="col-lg-1 col-form-label fw-semibold fs-6">Sale To</label>
							<label class="col-lg-4 col-form-label fw-bold fs-6">AGM - A GOLD MAIN - & OLD GOLD PURCHES</label>
						</div> -->
						<div class="d-flex justify-content-end mt-4">
							<button type="reset" class="btn btn-secondary me-3" data-bs-dismiss="modal">Cancel</button>
							<button type="submit" class="btn btn-primary">Send Request</button>
						</div>
						<!--end::Modal body-->
					</div>

				</div>
				<!--end::Modal content-->
			</div>
		</div>
		<!--end::Modal - Sale to CCL List Page-->
		<!--begin::Modal - convert old gold pledge item-->
		<div class="modal fade" id="kt_modal_view_individual_loan" tabindex="-1" aria-hidden="true">
			<!--begin::Modal dialog-->
			<div class="modal-dialog modal-xl-loan">
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
						<div class="mb-3 text-center">
							<h1 class="mb-3">Individual Loan</h1>
						</div>
						<div class="row">
							<label class="col-lg-1 col-form-label fw-semibold fs-6">Date</label>
							<label class="col-lg-2 col-form-label fw-bold fs-6">20-01-2023</label>
							<label class="col-lg-1 col-form-label fw-semibold fs-6">Loan No</label>
							<label class="col-lg-2 col-form-label fw-bold fs-6">MIP-430/22</label>
							<label class="col-lg-1 col-form-label fw-semibold fs-6">Scheme/<br>Int(%)</label>
							<label class="col-lg-1 col-form-label fw-bold fs-6">
								<span>MIP</span>
								<span>/</span>
								<span>2.5</span>
								<!-- <span>&nbsp;%</span> -->
							</label>
							<label class="col-lg-1 col-form-label fw-semibold fs-6">Company</label>
							<label class="col-lg-3 col-form-label fw-bold fs-6">AGB - Main Branch Ayyanar Gold Bankers SKD</label>
						</div>
						<div class="row mt-4">
          		<!-- <label class="col-form-label fw-bold fs-5">Pledge Items</label> -->
          		<table class="table align-middle table-row-dashed table-striped table-hover fs-7 gy-3 gs-2" id="individual_loan_pledge_item">
								<thead>
									<tr class="text-start text-muted fw-bold fs-7 gs-0">
										<th class="min-w-25px">Sno</th>
				            <th class="min-w-80px">Pledge</th>
				            <th class="min-w-80px">Description</th>
				            <th class="min-w-50px">Quality</th>
				            <th class="min-w-50px">Purity(%)</th>
				            <th class="min-w-50px">Qty</th>
				            <th class="min-w-80px">Weight<br>(gms)</th>
				            <th class="min-w-50px">St.Wgt<br>(gms)</th>
				            <th class="min-w-50px">Less<br>(gms)</th>
				            <th class="min-w-80px">Nt Wgt<br>(gms)</th>
				            <th class="min-w-80px">Pure Wgt<br>(gms)</th>
				            <th class="min-w-50px">Damage</th>
				            <th class="min-w-50px">Img</th>
									</tr>
								</thead>
								<tbody class="text-gray-600 fw-semibold">
									<tr>
										<td>1</td>
				            <td class="ple1">MURUKKU  MATTAL</td>
				            <td class="ple1">SEAL ILLAI</td>
				            <td class="ple1">NON-KDM</td>
				            <td>88</td>
				            <td>2</td>
				            <td>2.000</td>
				            <td>0.050</td>
				            <td>0.050</td>
				            <td>1.900</td>
				            <td>1.672</td>
				            <td class="ple1">No</td>
				            <td>-</td>
				            <!-- <td>
				            	<div class="image-input mt-2 me-6" data-kt-image-input="true">
												<div class="image-input-wrapper w-40px h-40px"style="background-image: url(assets/images/sample_jewel.jpg)"></div>
											</div>
				            </td> -->
				        	</tr>
						   		<tr>
										<td>2</td>
				            <td class="ple1">L.RING</td>
				            <td class="ple1">VK GV 22 CT  SEA,L ULLATHU  ROSE GREEN WHITE STONE ULLATHU</td>
				            <td class="ple1">NON-KDM</td>
				            <td>88</td>
				            <td>1</td>
				            <td>2.000</td>
				            <td>0.050</td>
				            <td>0.050</td>
				            <td>1.900</td>
				            <td>1.672</td>
				            <td class="ple1">No</td>
				            <td>-</td>
				            <!-- <td>
				            	<div class="image-input mt-2 me-6" data-kt-image-input="true">
												<div class="image-input-wrapper w-40px h-40px"style="background-image: url(assets/images/sample_jewel.jpg)"></div>
											</div>
				            </td> -->
				        	</tr>
				        	<tr>
										<td>3</td>
				            <td class="ple1">L.RING</td>
				            <td class="ple1">SS NB  22 CT SEAL ULLATHU ORU STONE ILLAI</td>
				            <td class="ple1">NON-KDM</td>
				            <td>88</td>
				            <td>1</td>
				            <td>1.000</td>
				            <td>0.050</td>
				            <td>0.050</td>
				            <td>0.900</td>
				            <td>0.792</td>
				            <td class="ple1">No</td>
				            <td>-</td>
				            <!-- <td>
				            	<div class="image-input mt-2 me-6" data-kt-image-input="true">
												<div class="image-input-wrapper w-40px h-40px"style="background-image: url(assets/images/sample_jewel.jpg)"></div>
											</div>
				            </td> -->
				        	</tr>
				        	<tr>
										<td>4</td>
				            <td class="ple1">TRAPS</td>
				            <td class="ple1">SGR 22 CT SEAKL ULLATHU  1+1 STONE ULLATHU  5+5 CHAINE ULLATHU</td>
				            <td class="ple1">NON-KDM</td>
				            <td>88</td>
				            <td>2</td>
				            <td>3.000</td>
				            <td>0.050</td>
				            <td>0.050</td>
				            <td>2.900</td>
				            <td>2.552</td>
				            <td class="ple1">No</td>
				            <td>-</td>
				            <!-- <td>
				            	<div class="image-input mt-2 me-6" data-kt-image-input="true">
												<div class="image-input-wrapper w-40px h-40px"style="background-image: url(assets/images/sample_jewel.jpg)"></div>
											</div>
				            </td> -->
				        	</tr>
							   </tbody>
							   <tfoot>
									<tr class="text-black fw-bold fs-6 gs-0">
										<th class="min-w-25px"></th>
				            <th class="min-w-80px"></th>
				            <th class="min-w-80px"></th>
				            <th class="min-w-50px">Total</th>
				            <th class="min-w-50px">0.88</th>
				            <th class="min-w-50px">6</th>
				            <th class="min-w-80px">5.300</th>
				            <th class="min-w-50px">0.200</th>
				            <th class="min-w-50px">0.200</th>
				            <th class="min-w-80px">7.600</th>
				            <th class="min-w-80px">6.688</th>
				            <th class="min-w-50px"></th>
				            <th class="min-w-50px"></th>
									</tr>
								</tfoot>
							</table>
          	</div>
          	<div class="row">
          		<div class="col-lg-12">
          			<div class="row">
          				<label class="col-lg-1 col-form-label fw-semibold fs-6">CurrRate</label>
									<label class="col-lg-1 col-form-label fw-bold fs-6">4571.00</label>
									<label class="col-lg-1 col-form-label fw-semibold fs-6">Gram.Val</label>
									<label class="col-lg-1 col-form-label fw-bold fs-6">91</label>
									<label class="col-lg-1 col-form-label fw-semibold fs-6">SalesRate</label>
									<label class="col-lg-1 col-form-label fw-bold fs-6">91</label>
          			</div>
          		</div>
          		<div class="col-lg-3 mt-3">
          			<div class="px-4" style="border:1.9px solid black;border-radius: 10px;">
	          			<div class="row">
	          				<label class="col-lg-12 col-form-label text-center fw-bold fs-4">Basic Info</label>
	          			</div>
	          			<div class="row">
	          				<label class="col-lg-6 col-form-label fw-semibold fs-6">Loan Amt</label>
										<label class="col-lg-6 col-form-label fw-bold fs-6">27000.00</label>
										<label class="col-lg-6 col-form-label fw-semibold fs-6">Principal Amt</label>
										<label class="col-lg-6 col-form-label fw-bold fs-6">27000.00</label>
										<label class="col-lg-6 col-form-label fw-semibold fs-6">Int Amt</label>
										<label class="col-lg-6 col-form-label fw-bold fs-6">4,000.00</label>
	          			</div>
	          		</div>
          		</div>
          		<div class="col-lg-3 mt-3">
          			<div class="px-4" style="border:1.9px solid black;border-radius: 10px;height: 180px !important;">
	          			<div class="row">
	          				<label class="col-lg-12 col-form-label text-center fw-bold fs-4">Receipt Info</label>
	          			</div>
	          			<div class="row">
	          				<label class="col-lg-6 col-form-label fw-semibold fs-6">Receipt Count</label>
										<label class="col-lg-6 col-form-label fw-bold fs-6">0</label>
										<label class="col-lg-6 col-form-label fw-semibold fs-6">Receipt Amt</label>
										<label class="col-lg-6 col-form-label fw-bold fs-6">0.00</label>
	          			</div>
	          		</div>
          		</div>
          		<div class="col-lg-3 mt-3">
          			<div class="px-4" style="border:1.9px solid black;border-radius: 10px;">
	          			<div class="row">
	          				<label class="col-lg-12 col-form-label text-center fw-bold fs-4">Final Info</label>
	          			</div>
	          			<div class="row">
	          				<label class="col-lg-6 col-form-label fw-semibold fs-6">Total Pricipal</label>
										<label class="col-lg-6 col-form-label fw-bold fs-5">27,000.00</label>
										<label class="col-lg-6 col-form-label fw-semibold fs-6">Total Interest</label>
										<label class="col-lg-6 col-form-label fw-bold fs-5">4,000.00</label>
										<label class="col-lg-6 col-form-label fw-semibold fs-6">Total Amount</label>
										<label class="col-lg-6 col-form-label fw-bold fs-5">31,000.00</label>
	          			</div>
	          		</div>
          		</div>
						</div>
						<!--end::Modal body-->
					</div>

				</div>
				<!--end::Modal content-->
			</div>
		</div>
		<!--end::convert old gold pledge item-->
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
					
					<div class="modal-body pt-0 pb-15 px-5 px-xl-20">
						<!--begin::Heading-->
						<div class="mb-13 text-center">
							<h1 class="mb-3">Payment to Receive</h1>
						</div>
						<!--end::Heading-->
						<!--end::Heading-->
								<div class="row">
									<label class="col-lg-2 col-form-label fw-bold fs-3">Total to Receive</label>
									<label class="col-lg-2 col-form-label fw-bold fs-3">0.00</label>
								</div>
								<div class="row">
									<div class="col-lg-2 fv-row fv-plugins-icon-container fv-plugins-bootstrap5-row-invalid">
										<div class="d-flex align-items-center mt-1">
											<label class="form-check form-check-inline form-check-solid me-5 is-invalid">
												<input class="form-check-input" name="" type="checkbox" value="1" id="cash_loan_received_add_radio" onclick="cash_ln_recev_add_radio()">
											</label>
											<label class="col-form-label fw-semibold fs-6 me-5">Cash</label>
										</div>
									</div>
									<div class="col-lg-2 fv-row fv-plugins-icon-container fv-plugins-bootstrap5-row-invalid">
										<div class="d-flex align-items-center mt-1">
											<label class="form-check form-check-inline form-check-solid me-5 is-invalid">
												<input class="form-check-input" name="" type="checkbox" value="1" id="cheque_loan_received_add_radio" onclick="cheque_ln_recev_add_radio()">
											</label>
											<label class="col-form-label fw-semibold fs-6">Cheque</label>
										</div>
									</div>
									<div class="col-lg-2 fv-row fv-plugins-icon-container fv-plugins-bootstrap5-row-invalid">
										<div class="d-flex align-items-center mt-1">
											<label class="form-check form-check-inline form-check-solid me-5 is-invalid">
												<input class="form-check-input" name="" type="checkbox" value="1" id="rtgs_loan_received_add_radio" onclick="rtgs_ln_recev_add_radio()">
											</label>
											<label class="col-form-label fw-semibold fs-6">RTGS</label>
										</div>
									</div>
									<div class="col-lg-2 fv-row fv-plugins-icon-container fv-plugins-bootstrap5-row-invalid">
										<div class="d-flex align-items-center mt-1">
											<label class="form-check form-check-inline form-check-solid me-5 is-invalid">
												<input class="form-check-input" name="" type="checkbox" value="1" id="upi_loan_received_add_radio" onclick="upi_ln_recev_add_radio()">
											</label>
											<label class="col-form-label fw-semibold fs-6">UPI</label>
										</div>
									</div>
								</div>
								<div class="row">
									<label class="col-lg-1 col-form-label fw-semibold fs-6" id="cash_label" style="display:none;">Cash</label>
									<div class="col-lg-2 fv-row fv-plugins-icon-container" id="cash_label_tbox" style="display:none;">
										<input type="text" class="form-control form-control-lg form-control-solid" placeholder="Amount" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
										<div class="fv-plugins-message-container invalid-feedback"></div>
									</div>
									<div class="col-lg-3 fv-row fv-plugins-icon-container" id="cash_detail_tbox" style="display:none;">
										<textarea class="form-control form-control-solid" rows="1" placeholder="Details" name="" id=""></textarea>
									</div>
								</div>
								<div class="row">
									<label class="col-lg-1 col-form-label fw-semibold fs-6" id="cheque_amt" style="display:none;">Cheque</label>
									<div class="col-lg-2 fv-row fv-plugins-icon-container" id="cheque_amt_tbox" style="display:none;">
										<input type="text" name="" class="form-control form-control-lg form-control-solid" placeholder="Amount" oninput="this.value = this.value.replace(/[^A-Za-z/0-9.]/g, '').replace(/(\..*)\./g, '$1');">
										<div class="fv-plugins-message-container invalid-feedback"></div>
									</div>
									<!-- <label class="col-lg-1 col-form-label fw-semibold fs-6" id="cheque_bank" style="display:none;">Bank</label> -->
									<div class="col-lg-3 fv-row fv-plugins-icon-container" id="cheque_bank_tbox" style="display:none;">
										<input type="text" name="" class="form-control form-control-lg form-control-solid" placeholder="Enter Party Bank" oninput="this.value = this.value.replace(/[^A-Za-z/0-9.]/g, '').replace(/(\..*)\./g, '$1');">
										<div class="fv-plugins-message-container invalid-feedback"></div>
									</div>
									<!-- <label class="col-lg-1 col-form-label fw-semibold fs-6" id="cheque_chq_no" style="display:none;">Cheque no</label> -->
									<div class="col-lg-3 fv-row fv-plugins-icon-container" id="cheque_chq_no_tbox" style="display:none;">
										<input type="text" name="" class="form-control form-control-lg form-control-solid" placeholder="Cheque/Ref Number" oninput="this.value = this.value.replace(/[^A-Za-z/0-9.]/g, '').replace(/(\..*)\./g, '$1');">
										<div class="fv-plugins-message-container invalid-feedback"></div>
									</div>
									<!-- <label class="col-lg-1 col-form-label fw-semibold fs-6" id="cheque_detail" style="display:none;">Details</label> -->
									<div class="col-lg-3 fv-row fv-plugins-icon-container" id="cheque_detail_tbox" style="display:none;">
										<textarea class="form-control form-control-solid" rows="1" placeholder="Details" name="" id=""></textarea>
									</div>
								</div>
								<div class="row">
									<label class="col-lg-1 col-form-label fw-semibold fs-6" id="rtgs_amt" style="display:none;">RTGS</label>
									<div class="col-lg-2 fv-row fv-plugins-icon-container" id="rtgs_amt_tbox" style="display:none;">
										<input type="text" name="" class="form-control form-control-lg form-control-solid" placeholder="Amount" oninput="this.value = this.value.replace(/[^A-Za-z/0-9.]/g, '').replace(/(\..*)\./g, '$1');">
										<div class="fv-plugins-message-container invalid-feedback"></div>
									</div>
									<!-- <label class="col-lg-1 col-form-label fw-semibold fs-6" id="rtgs_no" style="display:none;">RTGS No</label> -->
									<div class="col-lg-3 fv-row fv-plugins-icon-container" id="rtgs_no_tbox" style="display:none;">
										<input type="text" name="" class="form-control form-control-lg form-control-solid" placeholder="Trans/Ref Number" oninput="this.value = this.value.replace(/[^A-Za-z/0-9.]/g, '').replace(/(\..*)\./g, '$1');">
										<div class="fv-plugins-message-container invalid-feedback"></div>
									</div>
									<div class="col-lg-3 fv-row fv-plugins-icon-container" id="rtgs_bank_tbox" style="display:none;">
										<select class="form-select form-select-solid" data-control="select2" data-placeholder="Select Company Bank" data-hide-search="true">
											<option value="">Select</option>
											<option value="1">SBI</option>				
											<option value="2">TMB</option>
											<option value="3">IOB</option>
											<option value="4">CUB</option>
											<option value="4">KVB</option>
											<option value="4">IB</option>
										</select>
									</div>
									<!-- <label class="col-lg-1 col-form-label fw-semibold fs-6" id="rtgs_detail" style="display:none;">Details</label> -->
									<div class="col-lg-3 fv-row fv-plugins-icon-container" id="rtgs_detail_tbox" style="display:none;">
										<textarea class="form-control form-control-solid" rows="1" placeholder="Details" name="" id=""></textarea>
									</div>
								</div>
								<div class="row">
									<label class="col-lg-1 col-form-label fw-semibold fs-6" id="upi_amt" style="display:none;">UPI</label>
									<div class="col-lg-2 fv-row fv-plugins-icon-container" id="upi_amt_tbox" style="display:none;">
										<input type="text" name="" class="form-control form-control-lg form-control-solid" placeholder="Amount">
										<div class="fv-plugins-message-container invalid-feedback"></div>
									</div>
									<!-- <label class="col-lg-1 col-form-label fw-semibold fs-6" id="upi_trans_no" style="display:none;">Trans No</label> -->
									<div class="col-lg-3 fv-row fv-plugins-icon-container" id="upi_trans_no_tbox" style="display:none;">
										<input type="text" name="" class="form-control form-control-lg form-control-solid" placeholder="Trans/Ref Number">
										<div class="fv-plugins-message-container invalid-feedback"></div>
									</div>
									<div class="col-lg-3 fv-row fv-plugins-icon-container" id="upi_bank_tbox" style="display:none;">
										<select class="form-select form-select-solid" data-control="select2" data-placeholder="Select Company Bank" data-hide-search="true">
											<option value="">Select</option>
											<option value="1">SBI</option>				
											<option value="2">TMB</option>
											<option value="3">IOB</option>
											<option value="4">CUB</option>
											<option value="4">KVB</option>
											<option value="4">IB</option>
										</select>
									</div>
									<!-- <label class="col-lg-1 col-form-label fw-semibold fs-6" id="upi_detail" style="display:none;">Details</label> -->
									<div class="col-lg-3 fv-row fv-plugins-icon-container" id="upi_detail_tbox" style="display:none;">
										<textarea class="form-control form-control-solid" rows="1" placeholder="Details" name="" id=""></textarea>
									</div>
								</div>
								<div class="row mt-4">
									<div class="col-lg-6 text-center">
										<label class="col-form-label fw-bold fs-3">Paid Amount &emsp;</label>
										<label class="col-form-label fw-bold fs-3">0.00</label>
									</div>
									<div class="col-lg-6 text-center">
										<label class="col-form-label fw-bold fs-3">Balance Amount &emsp;</label>
										<label class="col-form-label fw-bold fs-3">0.00</label>
									</div>
								</div>
								<div class="d-flex justify-content-end mt-6 px-9">
									<button type="reset" class="btn btn-secondary me-3" data-bs-dismiss="modal">Cancel</button>
									<button type="submit" class="btn btn-primary">Deduct</button>
								</div>
							<!-- </div> -->
							<!--end::Modal body-->
					</div>
					<!--end::Modal content-->
				</div>
				<!--end::Modal dialog-->
			</div>
		</div>
		<div class="modal fade" id="kt_modal_view_payment" tabindex="-1" aria-hidden="true">
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
						<input type="hidden" name="p_bill_no" id="p_bill_no" value="">
							<input type="hidden" name="p_pid" id="p_pid" value="">
						<!--end::Heading-->
							<!-- <div style="padding: 10px 10px 10px 10px !important;box-shadow: 0 3px 6px #00002947;border-radius: 5px;background-color:#f5f5f1 !important;"> -->
								<!-- <div><label class="col-form-label fw-bold fs-6"><u>Payment Details</u></label></div> -->
								<div class="row">
									<label class="col-lg-2 col-form-label fw-bold fs-3">Net Pay</label>
									<label class="col-lg-2 col-form-label fw-bold fs-3" id="lbl_net_pay">9,950.00</label>
								</div>
								<div class="row">
									<div class="col-lg-2 fv-row fv-plugins-icon-container fv-plugins-bootstrap5-row-invalid">
										<div class="d-flex align-items-center mt-1">
											<label class="form-check form-check-inline form-check-solid me-5 is-invalid">
												<input class="form-check-input" name="" type="checkbox" value="1" id="cash_loan_paynow_add_radio" onclick="cash_ln_paynow_add_radio()">
											</label>
											<label class="col-form-label fw-semibold fs-6 me-5">Cash</label>
										</div>
									</div>
									<div class="col-lg-2 fv-row fv-plugins-icon-container fv-plugins-bootstrap5-row-invalid">
										<div class="d-flex align-items-center mt-1">
											<label class="form-check form-check-inline form-check-solid me-5 is-invalid">
												<input class="form-check-input" name="" type="checkbox" value="1" id="cheque_loan_paynow_add_radio" onclick="cheque_ln_paynow_add_radio()">
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
									<div class="col-lg-2 fv-row fv-plugins-icon-container fv-plugins-bootstrap5-row-invalid">
											<div class="d-flex align-items-center mt-1">
												<label class="form-check form-check-inline form-check-solid me-5 is-invalid">
													<input class="form-check-input" name="mem_card_loan_received_add_radio" type="checkbox" value="1" id="mem_card_loan_received_add_radio" onclick="mem_card_ln_recev_add_radio()">
												</label>
												<label class="col-form-label fw-semibold fs-6">Membership Card</label>
											</div>
										</div>
								<div class="row">
									<label class="col-lg-1 col-form-label fw-semibold fs-6" id="cash_label_ln_pay" style="display:none;">Cash</label>
									<div class="col-lg-2 fv-row fv-plugins-icon-container" id="cash_label_ln_pay_tbox" style="display:none;">
										<input type="text" class="form-control form-control-lg form-control-solid" placeholder="Amount" >
										<div class="fv-plugins-message-container invalid-feedback"></div>
									</div>
									<div class="col-lg-2 fv-row fv-plugins-icon-container" id="cash_detail_ln_pay_tbox" style="display:none;">
										<textarea class="form-control form-control-solid" rows="1" placeholder="Details" name="" id=""></textarea>
									</div>
								</div>
								<div class="row">
									<label class="col-lg-1 col-form-label fw-semibold fs-6" id="cheque_label_ln_pay" style="display:none;">Cheque</label>
									<div class="col-lg-2 fv-row fv-plugins-icon-container"id="cheque_amt_ln_pay_tbox" style="display:none;">
										<input type="text" class="form-control form-control-lg form-control-solid" placeholder="Amount" >
										<div class="fv-plugins-message-container invalid-feedback"></div>
									</div>
									<div class="col-lg-2 fv-row fv-plugins-icon-container" id="cheque_no_ln_pay_tbox" style="display:none;">
										<input type="text" class="form-control form-control-lg form-control-solid" placeholder="Cheque No" >
										<div class="fv-plugins-message-container invalid-feedback"></div>
									</div>
									<div class="col-lg-3 fv-row fv-plugins-icon-container" id="cheque_com_bank_ln_pay_tbox" style="display:none;">
										<select class="form-select form-select-solid" data-control="select2" data-hide-search="true" name="" id="" data-placeholder="Company Bank">
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
									</div>
									<div class="col-lg-2 fv-row fv-plugins-icon-container" id="cheque_par_bank_ln_pay_tbox" style="display:none;">
										<select class="form-select form-select-solid" data-control="select2" data-placeholder="Party Bank" data-hide-search="true">
											<option value="">Select</option>
											<option value="1">UPI-12546875-kumar</option>				
											<option value="2">Bank-1254867-Kumar</option>
										</select>
									</div>
									<div class="col-lg-2 fv-row fv-plugins-icon-container"  id="cheque_detail_ln_pay_tbox" style="display:none;">
										<textarea class="form-control form-control-solid" rows="1" placeholder="Details" name="" id=""></textarea>
									</div>
								</div>
								<div class="row">
									<label class="col-lg-1 col-form-label fw-semibold fs-6" id="rtgs_label_ln_pay" style="display:none;">RTGS</label>
									<div class="col-lg-2 fv-row fv-plugins-icon-container" id="rtgs_amt_ln_pay_tbox" style="display:none;">
										<input type="text" class="form-control form-control-lg form-control-solid" placeholder="Amount" >
										<div class="fv-plugins-message-container invalid-feedback"></div>
									</div>
									<div class="col-lg-2 fv-row fv-plugins-icon-container" id="rtgs_ref_ln_pay_tbox" style="display:none;">
										<input type="text" class="form-control form-control-lg form-control-solid" placeholder="Reference No" >
										<div class="fv-plugins-message-container invalid-feedback"></div>
									</div>
									<div class="col-lg-3 fv-row fv-plugins-icon-container" id="rtgs_com_bank_ln_pay_tbox" style="display:none;">
										<select class="form-select form-select-solid" data-control="select2" data-placeholder="Company Bank" data-hide-search="true">
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
									</div>
									<div class="col-lg-2 fv-row fv-plugins-icon-container" id="rtgs_par_bank_ln_pay_tbox" style="display:none;">
										<select class="form-select form-select-solid" data-control="select2" data-placeholder="Party Bank" data-hide-search="true">
											<option value="">Select</option>
											<option value="1">UPI-12546875-kumar</option>				
											<option value="2">Bank-1254867-Kumar</option>
										</select>
									</div>
									<div class="col-lg-2 fv-row fv-plugins-icon-container" id="rtgs_detail_ln_pay_tbox" style="display:none;">
										<textarea class="form-control form-control-solid" rows="1" placeholder="Details" name="" id=""></textarea>
									</div>
								</div>
								<div class="row">
									<label class="col-lg-1 col-form-label fw-semibold fs-6" id="upi_label_ln_pay" style="display:none;">UPI</label>
									<div class="col-lg-2 fv-row fv-plugins-icon-container" id="upi_amt_ln_pay_tbox" style="display:none;">
										<input type="text" class="form-control form-control-lg form-control-solid" placeholder="Amount" >
										<div class="fv-plugins-message-container invalid-feedback"></div>
									</div>
									<div class="col-lg-2 fv-row fv-plugins-icon-container" id="upi_ref_ln_pay_tbox" style="display:none;">
										<input type="text" class="form-control form-control-lg form-control-solid" placeholder="Reference No" >
										<div class="fv-plugins-message-container invalid-feedback"></div>
									</div>
									<div class="col-lg-3 fv-row fv-plugins-icon-container" id="upi_com_bank_ln_pay_tbox" style="display:none;">
										<select class="form-select form-select-solid" data-control="select2" data-placeholder="Company Bank" data-hide-search="true">
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
									</div>
									<div class="col-lg-2 fv-row fv-plugins-icon-container" id="upi_par_bank_ln_pay_tbox" style="display:none;">
										<select class="form-select form-select-solid" data-control="select2" data-placeholder="Party Bank" data-hide-search="true">
											<option value="">Select</option>
											<option value="1">UPI-12546875-kumar</option>				
											<option value="2">Bank-1254867-Kumar</option>
										</select>
									</div>
									<div class="col-lg-2 fv-row fv-plugins-icon-container" id="upi_detail_ln_pay_tbox" style="display:none;">
										<textarea class="form-control form-control-solid" rows="1" placeholder="Details" name="" id=""></textarea>
									</div>
								</div>
								<div class="row mt-4">
									<div class="col-lg-6 text-center">
										<label class="col-form-label fw-bold fs-3">Paid Amount &emsp;</label>
										<label class="col-form-label fw-bold fs-3">9,950.00</label>
									</div>
									<div class="col-lg-6 text-center">
										<label class="col-form-label fw-bold fs-3">Balance Amount &emsp;</label>
										<label class="col-form-label fw-bold fs-3">0.00</label>
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
							<label class="col-lg-12 col-form-label fw-bold fs-5"><i class="fa fa-address-card fs-5" aria-hidden="true" title="Card No"></i>&emsp;<span id="pop_member_card"></span>
							</label>
							<label class="col-lg-4 col-form-label fw-bold fs-6" name="pop_card_type" id="pop_card_type" ></label>
							<label class="col-lg-4 col-form-label fw-bold fs-5" name="" id=""><i class="fa-solid fa-coins fs-5" title="Points"></i>&emsp;<span id="pop_member_points"></span></label>
						</div>
						<div class="row">
							<label class="col-lg-4 col-form-label fw-semibold fs-6">Scan Here</label>
							<div class="col-lg-8 fv-row fv-plugins-icon-container">
								<input type="text" class="form-control form-control-lg form-control-solid" placeholder="Scan Here" name="check_card_no" id="check_card_no">
								<div class="fv-plugins-message-container invalid-feedback"></div>
							</div>
						</div>
						<div class="row">
							<label class="col-lg-8 col-form-label fw-bold fs-6 text-end" name="status" id="status" >
								<!-- <span style="background-color:#f1416c;border-radius: 8px;padding: 5px 15px 5px 15px;color: white;">Not Matched...</span> -->
								<span style="background-color:#50cd89;border-radius: 8px;padding: 5px 15px 5px 15px;">Verifying...</span>
								<!-- <span style="background-color:#50cd89;border-radius: 8px;padding: 5px 15px 5px 15px;">Matched...</span> -->
							</label>
							<div class="col-lg-4 d-flex justify-content-end">
								<button class="btn btn-sm btn-outline btn-outline-solid btn-outline-warning btn-active-light-primary me-2" data-bs-toggle="modal" data-bs-target="#kt_modal_verify_membership_card" onclick="check_card();">Verify</button>
							</div>
						</div>
						<div class="d-flex justify-content-end mt-6 px-9">
							<button type="reset" class="btn btn-secondary me-3" data-bs-dismiss="modal">Cancel</button>
							<!-- <button class="btn btn-primary">Ok</button> -->
						</div>
						<!--end::Modal body-->
					</div>
				</div>
				<!--end::Modal dialog-->
			</div>
			<!--end::Modal - view payment-->
		</div>
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
									<div id="camera" style="max-height: 330px;height: 330px;width: 100%;max-width: 100%;border: 1px solid;">
										
									</div>
								</div>
								<div class="d-flex justify-content-center align-items-center mt-6">
									<button type="submit" class="btn btn-primary">Capture</button>
								</div>
							</div>
							<div class="col-lg-6">
								<div class="row">
									<!-- <div class="col-lg-4">
										<div class="d-flex align-items-center mt-1">
											<label class="form-check form-check-inline form-check-solid me-1 is-invalid">
												<input class=" form-check-input" name="img_radio" type="radio">
											</label>
											<div class="image-input image-input-outline" id="img_1" data-kt-image-input="true" style="background-image: url(assets/images/Jewel.jpg)">
													<div class="image-input-wrapper w-125px h-125px"  style="background-image: url(assets/images/Jewel.jpg)"></div>
											</div>
										</div>
									</div>
									<div class="col-lg-4">
										<div class="d-flex align-items-center mt-1">
											<label class="form-check form-check-inline form-check-solid me-1 is-invalid">
												<input class=" form-check-input" name="img_radio" type="radio">
											</label>
											<div class="image-input image-input-outline" id="img_2" data-kt-image-input="true" style="background-image: url(assets/images/Jewel.jpg)">
													<div class="image-input-wrapper w-125px h-125px"  style="background-image: url(assets/images/Jewel.jpg)"></div>
											</div>
										</div>
									</div>
									<div class="col-lg-4">
										<div class="d-flex align-items-center mt-1">
											<label class="form-check form-check-inline form-check-solid me-1 is-invalid">
												<input class=" form-check-input" name="img_radio" type="radio">
											</label>
											<div class="image-input image-input-outline" id="img_3" data-kt-image-input="true" style="background-image: url(assets/images/Jewel.jpg)">
													<div class="image-input-wrapper w-125px h-125px"  style="background-image: url(assets/images/Jewel.jpg)"></div>
											</div>
										</div>
									</div> -->
									<div class="col-lg-4 fv-row">
										<a href="javascript:;" onclick="select_image_1();">
											<div class="image-input image-input-outline" data-kt-image-input="true" id="img_1" style="background-image: url(assets/images/Jewel.jpg);">
													<div class="image-input-wrapper w-150px h-150px"  style="background-image: url(assets/images/Jewel.jpg)"></div>
											</div>
										</a>
									</div>
									<div class="col-lg-4 fv-row">
										<a href="javascript:;" onclick="select_image_2();">
											<div class="image-input image-input-outline" data-kt-image-input="true" id="img_2" style="background-image: url(assets/images/Jewel.jpg)">
													<div class="image-input-wrapper w-150px h-150px"  style="background-image: url(assets/images/Jewel.jpg)"></div>
											</div>
										</a>
									</div>
									<div class="col-lg-4 fv-row">
										<a href="javascript:;" onclick="select_image_3();">
											<div class="image-input image-input-outline" data-kt-image-input="true" id="img_3" style="background-image: url(assets/images/Jewel.jpg)">
													<div class="image-input-wrapper w-150px h-150px"  style="background-image: url(assets/images/Jewel.jpg)"></div>
											</div>
										</a>
									</div>
								</div>
								<div class="row mt-4">
									<!-- <div class="col-lg-4">
										<div class="d-flex align-items-center mt-1">
											<label class="form-check form-check-inline form-check-solid me-1 is-invalid">
												<input class=" form-check-input" name="img_radio" type="radio">
											</label>
											<div class="image-input image-input-outline" id="img_4" data-kt-image-input="true" style="background-image: url(assets/images/Jewel.jpg)">
													<div class="image-input-wrapper w-125px h-125px"  style="background-image: url(assets/images/Jewel.jpg)"></div>
											</div>
										</div>
									</div>
									<div class="col-lg-4">
										<div class="d-flex align-items-center mt-1">
											<label class="form-check form-check-inline form-check-solid me-1 is-invalid">
												<input class=" form-check-input" name="img_radio" type="radio">
											</label>
											<div class="image-input image-input-outline" id="img_5" data-kt-image-input="true" style="background-image: url(assets/images/Jewel.jpg)">
													<div class="image-input-wrapper w-125px h-125px"  style="background-image: url(assets/images/Jewel.jpg)"></div>
											</div>
										</div>
									</div>
									<div class="col-lg-4">
										<div class="d-flex align-items-center mt-1">
											<label class="form-check form-check-inline form-check-solid me-1 is-invalid">
												<input class=" form-check-input" name="img_radio" type="radio">
											</label>
											<div class="image-input image-input-outline" id="img_6" data-kt-image-input="true" style="background-image: url(assets/images/Jewel.jpg)">
													<div class="image-input-wrapper w-125px h-125px"  style="background-image: url(assets/images/Jewel.jpg)"></div>
											</div>
										</div>
									</div> -->
									<div class="col-lg-4 fv-row">
										<a href="javascript:;" onclick="select_image_4();">
											<div class="image-input image-input-outline" data-kt-image-input="true" id="img_4" style="background-image: url(assets/images/Jewel.jpg)">
													<div class="image-input-wrapper w-150px h-150px"  style="background-image: url(assets/images/Jewel.jpg)"></div>
											</div>
										</a>
									</div>
									<div class="col-lg-4 fv-row">
										<a href="javascript:;" onclick="select_image_5();">
											<div class="image-input image-input-outline" data-kt-image-input="true" id="img_5" style="background-image: url(assets/images/Jewel.jpg)">
													<div class="image-input-wrapper w-150px h-150px"  style="background-image: url(assets/images/Jewel.jpg)"></div>
											</div>
										</a>
									</div>
									<div class="col-lg-4 fv-row">
										<a href="javascript:;" onclick="select_image_6();">
											<div class="image-input image-input-outline" data-kt-image-input="true" id="img_6" style="background-image: url(assets/images/Jewel.jpg)">
													<div class="image-input-wrapper w-150px h-150px"  style="background-image: url(assets/images/Jewel.jpg)"></div>
											</div>
										</a>
									</div>
									<div class="d-flex justify-content-center align-items-center mt-13">
										<button type="submit" class="btn btn-primary">Submit</button>
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
	<?php $this->load->view("script"); ?>
	<!-- <script src="js/newloan-list.js"></script> -->
	<script src="<?php echo base_url();?>assets/jquery.autocomplete.js"></script>
	<input type="hidden" id="baseurl" value="<?php echo base_url();?>">
			<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

	<script>
				  var baseurl = $("#baseurl").val();
				  $("#partynamesearch").autocomplete({ 
						 valueKey:'title',
		            source:[{
		            url:baseurl+'loan/searchpartydetails?query=%QUERY%',
		            type:'remote',
		            ajax:{
		              dataType : 'json',
		            }
			    }]}).on('selected.xdsoft',function(e,suggestion,ui)
			    { 	
	    	 			$("#partylastname").html(suggestion.firstname);
	    	  	  $("#partylastnameval").val(suggestion.firstname);

              $('#first_name_id_hidden').val(suggestion.id);
              $('#p_pid').val(suggestion.id);
              
              var txt=suggestion.lastname+'&emsp; &emsp;<a target="_blank" href="<?php echo base_url();?>party/party_view/'+suggestion.id+'"><i class="fas fa-mail-bulk" title=" View Party"></i></a>';
              $("#last_name").html(txt);


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
              $("#address").html(suggestion.location);
							document.getElementById("location").setAttribute("title", suggestion.address);
							
              $("#mobile").html(suggestion.phone);
              $("#pop_mobile_no").html(suggestion.phone);
							
              if(suggestion.member_id=='')
              {
              	document.getElementById('no_card').style.display="block";
              	document.getElementById('lbl_mem_card_no').style.display="none";
              	document.getElementById('card_type').style.display="none";
              	document.getElementById('lbl_mem_point').style.display="none";
              	document.getElementById('lbl_mem_verify').style.display="none";
              	document.getElementById("mem_card_loan_received_add_radio").disabled = true;
              	document.getElementById("mem_card_loan_received_add_radio").checked = false;
              	$("#mem_card_no").val('');
                $("#mem_card_points").html('');
                document.getElementById("lbl_mem_card_no").style.display = "none";
                document.getElementById("mem_card_no").style.display = "none";
					    	document.getElementById("mem_card_no_tbox").style.display = "none";
					    	document.getElementById("mem_card_avail_points_tbox").style.display = "none";
					    	document.getElementById("mem_card_redeem_tbox").style.display = "none";
					    	document.getElementById("mem_card_details_tbox").style.display = "none";
              	
              }
          		else
          		{
          			document.getElementById('no_card').style.display="none";
              	document.getElementById('lbl_mem_card_no').style.display="block";
              	document.getElementById('card_type').style.display="block";
              	document.getElementById('lbl_mem_point').style.display="block";
              	document.getElementById('lbl_mem_verify').style.display="block";
			
                $("#membership_card_no").html(suggestion.member_id);
                $("#pop_member_card").html(suggestion.member_id);
                $("#membership_card_points").html(suggestion.member_points);
                $("#pop_member_points").html(suggestion.member_points);
                $("#mem_card_no").val(suggestion.member_id);
                $("#mem_card_points").html(suggestion.member_points);
                document.getElementById("mem_card_loan_received_add_radio").disabled = false;
              
            }
		    		console.log(suggestion);
		        $("#partynamesearch").val(suggestion.title);   
		        getsearchpartydetails(suggestion.partyID);
			  });
			</script>
			<script>
		  	function getsearchpartydetails(PID)
		  	{
		  		var formData = new FormData();
				  formData.append('partyID', PID);

				  $.ajax(
				  {
							url: baseurl+'loan/getsearchpartydetails',
							type: 'POST',
							data: formData,
							async: false,
							cache: false,
							contentType: false,
							processData: false,
							success: function (response) 
							{
									var returnedData = JSON.parse(response);
									console.log(returnedData);
									if(returnedData.return_code == 0)
									{
											
									}
									else
									{
											Swal.fire({
												title: 'Error!',
												text: 'Incorrect party.Please check Party Name..!',
												icon: 'error',
												confirmButtonText: 'Okay'
											})
									}
							}
					});
			  }
		  	function check_card()
				{
						var chk=$('#check_card_no').val();
						var no=$('#pop_member_card').html();
						
						if(no!="" && chk!="")
						{
						
						if(no==chk)
						{
								// alert('matched');
								$('#verify_icon').html('<i class="fas fa-check-circle fs-5" style="color:green;"></i>');
								document.getElementById('btn_verify_popup').style.display='none';
						}
						else
						{
							 //alert('not matched');
							$('#verify_icon').html('<i class="fas fa-times-circle fs-5" style="color:red;"></i>');
							//document.getElementById('btn_verify_popup').style.display='block';	
						}	
						}
						else
						{
							alert("Enter Card no to Verify");
						}

					}
			  </script>
	<script>
		function checkAll(bx) 
		{
			  var cbs = document.getElementsByTagName('input');
			  for(var i=0; i < cbs.length; i++) {
			    if(cbs[i].type == 'checkbox') {
			      cbs[i].checked = bx.checked;
			    }
			  }
			};
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
			};
			function select_image_2()
			{
				document.getElementById("img_1").style.border = "none";
				document.getElementById("img_2").style.border = "3px solid #ec9629";
				document.getElementById("img_3").style.border = "none";
				document.getElementById("img_4").style.border = "none";
				document.getElementById("img_5").style.border = "none";
				document.getElementById("img_6").style.border = "none";
			};
			function select_image_3()
			{
				document.getElementById("img_1").style.border = "none";
				document.getElementById("img_2").style.border = "none";
				document.getElementById("img_3").style.border = "3px solid #ec9629";
				document.getElementById("img_4").style.border = "none";
				document.getElementById("img_5").style.border = "none";
				document.getElementById("img_6").style.border = "none";
			};
			function select_image_4()
			{
				document.getElementById("img_1").style.border = "none";
				document.getElementById("img_2").style.border = "none";
				document.getElementById("img_3").style.border = "none";
				document.getElementById("img_4").style.border = "3px solid #ec9629";
				document.getElementById("img_5").style.border = "none";
				document.getElementById("img_6").style.border = "none";
			};
			function select_image_5()
			{
				document.getElementById("img_1").style.border = "none";
				document.getElementById("img_2").style.border = "none";
				document.getElementById("img_3").style.border = "none";
				document.getElementById("img_4").style.border = "none";
				document.getElementById("img_5").style.border = "3px solid #ec9629";
				document.getElementById("img_6").style.border = "none";
			};
			function select_image_6()
			{
				document.getElementById("img_1").style.border = "none";
				document.getElementById("img_2").style.border = "none";
				document.getElementById("img_3").style.border = "none";
				document.getElementById("img_4").style.border = "none";
				document.getElementById("img_5").style.border = "none";
				document.getElementById("img_6").style.border = "3px solid #ec9629";
			};
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
			};

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
			};

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
			};
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
			};
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
			};

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
			};

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
			};
		</script>
			<script>
			function set_customer_rating()
			{
				// alert("hi")
				
				var pid=$('#first_name_id_hidden').val();
			
				// alert(r);
				if(pid=="")
				{
					alert("Enter Party name");
					// $('#cust_rating').val("");
					document.getElementById("first_name").focus();
				}
				else
				{
					var r=$('#cust_rating').val();
				$.ajax({
					type: "POST",
					url: baseurl+'loan/set_customer_rating?',
					async: false,
					type: "POST",
					data: "val="+r+"&id="+pid,
					dataType: "html",
					success: function(response)
					{	
		                alert('Rating updated');
					}
					});
				}

			}
		</script>
		<!-- Payment Now From Party End -->
	
		<script>
		      $("#loan_list_table").kendoTooltip({
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
		      $("#individual_loan_pledge_item").kendoTooltip({
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
			$("#individual_loan_pledge_item").DataTable({
				"ordering": false,
				// "aaSorting":[],
				 "language": {
				  "lengthMenu": "Show _MENU_",
				 },
				 "dom":
				  "<'row'" +
				  // "<'col-sm-6 d-flex align-items-center justify-conten-start'l>" +
				  // "<'col-sm-6 d-flex align-items-center justify-content-end'f>" +
				  ">" +

				  "<'table-responsive'tr>" +

				  "<'row'" +
				  "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
				  // "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
				  ">"
				});
			$('#sale_entry_table').wrap('<div class="dataTables_scroll" />');
		</script>
   		<script>
			$("#loan_list_table").DataTable({
				"ordering": false,
				// "aaSorting":[],
				 "language": {
				  "lengthMenu": "Show _MENU_",
				 },
				 "dom":
				  "<'row'" +
				  // "<'col-sm-6 d-flex align-items-center justify-conten-start'l>" +
				  // "<'col-sm-6 d-flex align-items-center justify-content-end'f>" +
				  ">" +

				  "<'table-responsive'tr>" +

				  "<'row'" +
				  "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
				  // "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
				  ">"
				});
			$('#sale_entry_table').wrap('<div class="dataTables_scroll" />');
		</script>
		<script>
			$("#kt_datepicker_merge_loan_date").flatpickr({
				dateFormat: "d-m-Y",
			});
		</script>
	</body>
	<!--end::Body-->
	</html>