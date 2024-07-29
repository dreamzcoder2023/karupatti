<?php $this->load->view("common.php");?>
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
  #cheque_cr_lab #down{
		  display: none;
			}
	#cheque_cr_lab:hover #down{
	  display: block;
	  position: absolute;
	  margin-top: 0.2em;
	  margin-left: -0.7em !important;
	  color: white;
	  background: black;
	  padding: 3px 13px 3px 10px;
	  border-radius: 5px;
	  font-size: 14px;
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
			min-width:100%;
			/*width: 170px !important;*/
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
<link href="<?php echo base_url();?>assets/multi/fileinput.css" media="all" rel="stylesheet" type="text/css"/>

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
				<?php $this->load->view( "sidebar.php");?>
				<!--begin::Wrapper-->
				<div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
				<?php $this->load->view( "header.php");?>
				<!--begin::Toolbar-->
					<div class="toolbar py-2" id="kt_toolbar">
						<!--begin::Container-->
						<div id="kt_toolbar_container" class="container-fluid d-flex align-items-center">
							<!--begin::Page title-->
							<div class="flex-grow-1 flex-shrink-0 me-5">
								<!--begin::Page title-->
								<div data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
									<!--begin::Title-->
									<h1 class="d-flex align-items-center text-dark fw-bold my-1 fs-3">New Sale
									<!--begin::Separator-->
									<span class="h-20px border-gray-400 border-start ms-3 mx-2"></span>
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
											<!--begin::Table-->
											<!--  -->
											<form method="POST" autocomplete="off" action="<?php echo base_url(); ?>Realestatesale/property_save" enctype="multipart/form-data" onsubmit="return property_sale_validation()">
												<div class="row">
													<div class="col-lg-12">
														<div class="row">
															<label class="col-lg-2 col-form-label required fw-semibold fs-6">Date</label>
															<div class="col-lg-3 fv-row">
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
																	<input class="form-control form-control-solid ps-12 flatpickr-input" name="prop_date" placeholder="Date" id="kt_daterangepicker_pro_sale_add_date" value="<?php echo date("d-m-Y"); ?>" type="text" readonly="readonly">
																</div>
															</div>
															<label class="col-lg-2 col-form-label required fw-semibold fs-6">Property ID</label>
															<div class="col-lg-5 fv-row fv-plugins-icon-container">
																<select class="form-select form-control form-control-solid ps-12" data-control="select2" name="property_id_ac" id="property_id_ac" onchange="property_id()">
																<option value="">Select</option>
																<?php  foreach($purchase_id_get as $plist) {?>
																	<option value="<?php echo $plist['property_id']?>"><?php echo $plist['property_id'];?></option>
																	<?php }?>
																</select>
															<div class="fv-plugins-message-container invalid-feedback" id="property_id_ac_err"></div>
															</div>
														</div>
														<div class="row">
															<label class="col-lg-2 col-form-label required fw-semibold fs-6">Party <i class="fa-solid fa-circle-info fs-7"  title="AutoComplete Select Party Name"></i></label>
															<div class="col-lg-3 fv-row fv-plugins-icon-container">
																<input type="text" name="prop_party" id="prop_party"class="form-control form-control-lg form-control-solid" placeholder="Select Party Name" >
																<div class="fv-plugins-message-container invalid-feedback" id="prop_party_err"></div>
																<div class="fv-plugins-message-container invalid-feedback" id="party_id_hidden_err"></div>
																<input type="hidden" name="party_id_hidden" id="party_id_hidden">
																<input type="hidden" name="first_name_id_hidden" id="first_name_id_hidden" value="">
															</div>
															<div class="col-lg-2">
																<label class="col-form-label fw-semibold fs-6">Current Sold</label>
															</div>
															<div class="col-lg-3" title="Plot Area">
																<svg version="1.1" id="Uploaded to svgrepo.com" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" 
																 width="30px" height="30px" viewBox="0 0 32 32" xml:space="preserve"><title>Purchase Plot Area</title><style type="text/css">.blueprint_een{fill:#3A3A5D;}.st0{fill:#3A3A5D;}</style>
																<path class="blueprint_een" d="M20,8H8v5h1v4.586l-3-3l-5,5V29h18V13h1V8z M8.585,20H3.414L6,17.414L8.585,20z M7,27H6v-2h1V27zM8,27v-3H5v3H3v-6h7v6H8z M15,27h-2v-2h2V27z M17,27h-1v-3h-4v3h-1V12h6V27z M18,11h-8v-1h8V11z M16,19h-4v4h4V19z M15,22h-2v-2h2
																V22z M16,14h-4v4h4V14z M15,17h-2v-2h2V17z M19,7h-1V6h1V7z M19,5h-1V4h1V5z M20,4h1v1h-1V4z M22,4h1v1h-1V4z M24,4h1v1h-1V4z M26,4
																h1v1h-1V4z M28,4h1v1h-1V4z M31,4v1h-1V4H31z M30,6h1v1h-1V6z M30,8h1v1h-1V8z M30,10h1v1h-1V10z M30,12h1v1h-1V12z M30,14h1v1h-1
																V14z M30,16h1v1h-1V16z M30,18h1v1h-1V18z M30,20h1v1h-1V20z M30,22h1v1h-1V22z M30,24h1v1h-1V24z M30,26h1v1h-1V26z M30,28h1v1h-1
																V28z M28,28h1v1h-1V28z M26,28h1v1h-1V28z M24,28h1v1h-1V28z M22,28h1v1h-1V28z M20,28h1v1h-1V28z"/>
															</svg> &emsp;
															<i class="fas fa-list-ol fs-4"></i>&nbsp;
															<label class="col-form-label fs-6 fw-bold" title="Number of Plot Area" id="cur_ploat_no">-</label>&emsp;
															<i 	class="fas fa-layer-group fs-6" title="Type Plot Area"></i>&nbsp;
															<label class="col-form-label fw-bold fs-6" title="Total of Plot Area" id="cur_ploat_type"></label>&emsp;
															<i class="fas fa-money-bill-wave fs-6" title="Total Price of Plot Area"></i>&nbsp;
															<label class="col-form-label fw-bold fs-6" title="Total Price of Plot Area" id="cur_pro_amount">0.00</label>
															</div>
														</div>	
														<div class="row mt-4">
															<div class="col-lg-7">
																<div class="row">
																	<div class="col-lg-5 mt-4">
																		<div class="row">
																			<div class="col-lg-2">
																				<span>
																				<i class="fa fa-user fs-6" aria-hidden="true" title="Last Name"></i>
																				</span>
																			</div>
																			<div class="col-lg-9">
																				<span class="col-form-label fw-bold fs-6" name="last_name" id="last_name">C/o XXXXXXX  
																			</span>
																			</div>
																		</div>
																	</div>
																	<div class="col-lg-5">
																		<div class="row mt-3">
																			<div class="col-lg-2">
																				<span>
																					<i class="fas fa-mobile-android-alt fs-6" aria-hidden="true" title="Mobile"></i>
																				</span>
																			</div>
																			<div class="col-lg-8">	
																				<span class="col-form-label fw-bold fs-6" name="mobile" id="mobile">9999999999</span> 
																			</div>
																		</div>
																	</div>
																	<div class="col-lg-5">
																		<div class="row">
																			<div class="col-lg-3">
																				<label class="col-form-label fw-semibold fs-6">Rating</label>
																			</div>
																			<div class="col-lg-9">
																				<label class="col-form-label fw-bold fs-5" >
																				<span name="rating" id="rating"><i class="fa-solid fa-star" ></i>&nbsp;&nbsp;</span>
																				</label>
																			</div>
																		</div>
																	</div>
																	<div class="col-lg-5">
																		<div class="row mt-3">
																			<div class="col-lg-2">
																				<span>
																					<i class="fa-solid fa-location-dot fs-6" aria-hidden="true" title="Address"></i>
																				</span>
																			</div>
																			<div class="col-lg-10">
																				<span class="col-form-label fw-bold fs-6" name="address" id="address">No, street, city</span>
																			</div>
																		</div>
																	</div>
																</div>
															</div>
															<div class="col-lg-1">
																<div class="row">
																	<div class="col-lg-12">
																		<div class="row">
																			<div class="col-lg-12 fv-row">
																				<div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url(assets/media/svg/avatars/blank.svg)" id="party_photo" name="party_photo">
																					<div class="image-input-wrapper"  style="background-image: url(<?php echo base_url();?>assets/images/party.jpg)"></div>
																				</div>
																			</div>
																		</div>
																	</div>
																</div>
															</div>
														</div>
														

														<div class="row mt-4">
														   <label class="col-lg-12 col-form-label fw-bold fs-4">Property Details</label>
														</div>
														<div class="row">
															<div class="col-lg-3" title="Reference Name">
																<div class="row">
																	<div class="col-lg-1 fv-row">
																		<i class="fas fa-search-location fs-3 mt-3" title="Reference Name"></i>
																    </div>
																    <div class="col-lg-10 fv-row">
																		&emsp;<label class="col-form-label fw-bold fs-6" title="Reference Name" id="refname">-</label>
																	</div>
																</div>
															</div>
															<div class="col-lg-3" title="Party Info">
																<div class="row">
																	<div class="col-lg-1 fv-row">
																		<i class="fa fa-user fs-3 mt-3"></i>
																    </div>
																    <div class="col-lg-10 fv-row">
																		&emsp;<label class="col-form-label fw-bold fs-6" id="party_name">-</label>
																	</div>
																</div>
															</div>
															<div class="col-lg-3" title="Property type">
																<div class="row">
																	<div class="col-lg-2 fv-row">
																		<i class="fas fa-laptop-house fs-3 mt-4" title="Property Type"></i>
																    </div>
																    <div class="col-lg-10 fv-row">
																		<label class="col-form-label fw-bold fs-6" title="Property Type" id="property_type">-</label>
																	</div>
																</div>
															</div>
															<div class="col-lg-3" title="Plot Area">
																<div class="row">
																	<div class="col-lg-2 fv-row fs-3 mt-2" >
																			<svg version="1.1" id="Uploaded to svgrepo.com" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" 
																				 width="30px" height="30px" viewBox="0 0 32 32" xml:space="preserve"><title>Purchase Plot Area</title><style type="text/css">.blueprint_een{fill:#3A3A5D;}.st0{fill:#3A3A5D;}</style>
																			<path class="blueprint_een" d="M20,8H8v5h1v4.586l-3-3l-5,5V29h18V13h1V8z M8.585,20H3.414L6,17.414L8.585,20z M7,27H6v-2h1V27zM8,27v-3H5v3H3v-6h7v6H8z M15,27h-2v-2h2V27z M17,27h-1v-3h-4v3h-1V12h6V27z M18,11h-8v-1h8V11z M16,19h-4v4h4V19z M15,22h-2v-2h2
																				V22z M16,14h-4v4h4V14z M15,17h-2v-2h2V17z M19,7h-1V6h1V7z M19,5h-1V4h1V5z M20,4h1v1h-1V4z M22,4h1v1h-1V4z M24,4h1v1h-1V4z M26,4
																				h1v1h-1V4z M28,4h1v1h-1V4z M31,4v1h-1V4H31z M30,6h1v1h-1V6z M30,8h1v1h-1V8z M30,10h1v1h-1V10z M30,12h1v1h-1V12z M30,14h1v1h-1
																				V14z M30,16h1v1h-1V16z M30,18h1v1h-1V18z M30,20h1v1h-1V20z M30,22h1v1h-1V22z M30,24h1v1h-1V24z M30,26h1v1h-1V26z M30,28h1v1h-1
																				V28z M28,28h1v1h-1V28z M26,28h1v1h-1V28z M24,28h1v1h-1V28z M22,28h1v1h-1V28z M20,28h1v1h-1V28z"/>
																			</svg>&emsp;
																    </div>
																    <div class="col-lg-10 fv-row">
																		<i class="fas fa-list-ol fs-4"></i>&nbsp;
																			<label class="col-form-label fs-6 fw-bold" title="Number of Plot Area" id="ploat_no">-</label>&emsp;
																			<i 	class="fas fa-layer-group fs-6" title="Type Plot Area"></i>&nbsp;
																			<label class="col-form-label fw-bold fs-6" title="Total of Plot Area" id="ploat_type"></label>&emsp;
																			<i class="fas fa-money-bill-wave fs-6" title="Total Price of Plot Area"></i>&nbsp;
																			<label class="col-form-label fw-bold fs-6" title="Total Price of Plot Area" id="pro_amount">0.00</label>
																	</div>
																</div>
															</div>
														</div>
														<div class="row">
															<div class="col-lg-3" title="Latitude Longtitude">
																<div class="row">
																	<div class="col-lg-1 fv-row mt-3">
																		<i class="bi bi-geo-alt-fill fs-3"></i>&nbsp;
																    </div>
																    <div class="col-lg-10 fv-row">
																		&emsp;<label class="col-form-label fw-bold fs-6" id="Latitude">-</label>&nbsp;
																		<label class="col-form-label fw-bold fs-6" id="Longtitude">-</label>
																	</div>
																</div>
															</div>
															<div class="col-lg-3" title="Total Purchase Amount">
																<div class="row">
																	<div class="col-lg-1 fv-row">
																		<label>
																			<i class="fas fa-money-bill-alt fs-3 mt-4"></i>
																		</label>
																    </div>
																    <div class="col-lg-10 fv-row">
																		&emsp;<label class="col-form-label fw-bold fs-6" id="total_property_amount">0.00</label>
																	</div>
																</div>
															</div>
														   <div class="col-lg-3">
																<div class="row">
																	<div class="col-lg-2 fv-row">
																		<label class="col-form-label fw-semibold fs-6">
																			<svg width="20px" height="20px" version="1.1" id="Icons" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 32 32" xml:space="preserve"><title>Amenitites</title><style type="text/css">.st0{color:#3A3A5D;fill:none;stroke:#3A3A5D;stroke-width:2;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;}</style><polyline class="st0" points="11,31 11,10 21,10 21,31 "/><polyline class="st0" points="21,31 21,16 30,16 30,31 "/><polyline class="st0" points="2,31 2,21 11,21 11,31 "/><rect x="12" y="7" class="st0" width="8" height="3"/><rect x="14" y="4" class="st0" width="4" height="3"/><line class="st0" x1="16" y1="1" x2="16" y2="4"/><line class="st0" x1="14" y1="14" x2="18" y2="14"/><line class="st0" x1="3" y1="25" x2="7" y2="25"/><line class="st0" x1="3" y1="29" x2="7" y2="29"/><line class="st0" x1="14" y1="18" x2="18" y2="18"/><line class="st0" x1="14" y1="22" x2="18" y2="22"/><line class="st0" x1="14" y1="26" x2="18" y2="26"/><line class="st0" x1="14" y1="30" x2="18" y2="30"/><line class="st0" x1="24" y1="20" x2="24" y2="21"/><line class="st0" x1="27" y1="20" x2="27" y2="21"/><line class="st0" x1="24" y1="24" x2="24" y2="25"/><line class="st0" x1="27" y1="24" x2="27" y2="25"/><line class="st0" x1="24" y1="28" x2="24" y2="29"/><line class="st0" x1="27" y1="28" x2="27" y2="29"/></svg>
																		</label>
																    </div>
																    <div class="col-lg-10 fv-row">
																			<label class="col-form-label fw-bold fs-6" id="amenitites">-</label>&emsp;
																	</div>
																</div>
															</div>
														   <div class="col-lg-3 col-form-label" title="Address">
															   	<div class="row">
																       <div class="col-lg-2">
																       	<span>
																       		<svg width="25px" height="25px" class="fw-bold" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg">
																				<title>Address</title>><style type="text/css">.st0{fill:none;stroke:#3A3A5D;stroke-width:2;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;}</style>
																				<g id="Direction">
																				<path d="M18.091,26.344a1.995,1.995,0,0,0-.689-1.456,2.1117,2.1117,0,0,0-2.834,0,1.995,1.995,0,0,0-.689,1.456,2.7129,2.7129,0,0,0-2.522,2.704v.65h9.256v-.65A2.7129,2.7129,0,0,0,18.091,26.344Z" style="fill:#3A3A5D"/>
																				<polygon points="13.268 9.925 13.268 6.194 8.211 6.194 6.157 8.053 8.211 9.925 13.268 9.925" style="fill:#3A3A5D"/>
																				<polygon points="23.863 10.211 18.702 10.211 18.702 13.955 23.863 13.955 25.943 12.083 23.863 10.211" style="fill:#3A3A5D"/>
																				<polygon points="13.268 14.228 8.211 14.228 6.157 16.1 8.211 17.972 13.268 17.972 13.268 14.228" style="fill:#3A3A5D"/>
																				<path d="M14.568,6.805V23.354a3.3738,3.3738,0,0,1,2.834,0V6.818a3.2831,3.2831,0,0,1-1.417.325A3.1179,3.1179,0,0,1,14.568,6.805Z" style="fill:#3A3A5D"/>
																				<path d="M15.985,5.843a1.8952,1.8952,0,0,0,1.417-.624,1.86,1.86,0,0,0,.52-1.3,1.937,1.937,0,0,0-3.874,0,1.86,1.86,0,0,0,.52,1.3A1.8952,1.8952,0,0,0,15.985,5.843Z" style="fill:#3A3A5D"/>
																				</g>
																			</svg>
																       	</span>
																       </div>
																       <div class="col-lg-10">
																       		<label class="fw-bold fs-6" id="street">-,</label>
																			<label class="fw-bold fs-6" id="area">-,</label>
																			<label class="fw-bold fs-6" id="city">-,</label>
																			<label class="fw-bold fs-6" id="pincode">-,</label>
																			<label class="fw-bold fs-6" id="state">-,</label>
																       </div>
																 </div>
															</div>
														</div>
														<div class="row">
															<div class="col-lg-12" title="Description">
																<div class="row">
																	<div class="col-lg-1 fv-row mt-3 fs-6">
																		<svg width="20px" height="20px" viewBox="0 0 24 24" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
																	    <title>Description</title><style type="text/css">.st0{color:#3A3A5D;fill:none;stroke:#3A3A5D;stroke-width:2;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;}</style><g id="🔍-System-Icons" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><g id="ic_fluent_text_description_24_filled" fill="#212121" fill-rule="nonzero"><path d="M3,17 L15,17 C15.5522847,17 16,17.4477153 16,18 C16,18.5128358 15.6139598,18.9355072 15.1166211,18.9932723 L15,19 L3,19 C2.44771525,19 2,18.5522847 2,18 C2,17.4871642 2.38604019,17.0644928 2.88337887,17.0067277 L3,17 L15,17 L3,17 Z M3,13 L21,13 C21.5522847,13 22,13.4477153 22,14 C22,14.5128358 21.6139598,14.9355072 21.1166211,14.9932723 L21,15 L3,15 C2.44771525,15 2,14.5522847 2,14 C2,13.4871642 2.38604019,13.0644928 2.88337887,13.0067277 L3,13 L21,13 L3,13 Z M3,9 L21,9 C21.5522847,9 22,9.44771525 22,10 C22,10.5128358 21.6139598,10.9355072 21.1166211,10.9932723 L21,11 L3,11 C2.44771525,11 2,10.5522847 2,10 C2,9.48716416 2.38604019,9.06449284 2.88337887,9.00672773 L3,9 L21,9 L3,9 Z M3,5 L21,5 C21.5522847,5 22,5.44771525 22,6 C22,6.51283584 21.6139598,6.93550716 21.1166211,6.99327227 L21,7 L3,7 C2.44771525,7 2,6.55228475 2,6 C2,5.48716416 2.38604019,5.06449284 2.88337887,5.00672773 L3,5 L21,5 L3,5 Z" id="🎨-Color">
																		</path></g></g>
																		</svg>
																    </div>
																    <div class="col-lg-10 fv-row">
																		<label class="col-form-label fw-bold fs-6" id="description">----</label>
																	</div>
																</div>
															</div>
														</div>

															<div id="acre_div" class="row" style="display:none;">
																
															</div>
															<div id="cent_div" class="row"  style="display:none;">
																
															</div>

															<div id="square_div" style="display:none;" class="row">
																
															</div>

														<!-- </div> -->
														<div class="row">
															<label class="col-lg-3 required col-form-label fs-6	 fw-semibold">Sale Price Per Plot Area</label>
															
															<div class="col-lg-2">
																<select class="form-select form-select-solid" data-control="select2" data-hide-search="true" title="Select Your Plot Area Type" name="prop_spa_type" id="prop_spa_type" onchange="acres_cent_sq_change()">
																	<option value="">Select</option>
																	<option value="Sq.ft">Sq.ft</option>
																	<option value="Cent">Cent</option>
																	<option value="Acre">Acre</option>
																	
																</select>
																<div class="fv-plugins-message-container invalid-feedback" id="prop_spa_type_err"></div>
															</div>
															<div class="col-lg-1 fv-row fv-plugins-icon-container">
																<input type="text" name="prop_spa_no" id="prop_spa_no" class="form-control form-control-lg form-control-solid" placeholder="No" value="" title="Enter Your Number of Count" onkeyup="pay_to_property_calc()" maxlength="8"  oninput="this.value = this.value.replace(/[^/0-9.]/g, '').replace(/(\..*)\./g, '$1'); ">
																<div class="fv-plugins-message-container invalid-feedback" id="prop_spa_no_err"></div>
															</div>


															<div class="col-lg-2 fv-row fv-plugins-icon-container">
																<input type="text" name="prop_price_spa" id="prop_price_spa" class="form-control form-control-lg form-control-solid" placeholder="Price" value="" title="Enter Your Per Plot Area Amount" onkeyup="pay_to_property_calc()" maxlength="11" oninput="this.value = this.value.replace(/[^/0-9.]/g, '').replace(/(\..*)\./g, '$1'); " >
																<div class="fv-plugins-message-container invalid-feedback" id="prop_price_spa_err"></div>
															</div>
															
															
															<div class="col-lg-4" title="Sale Amount">
																<label>
																	<i class="fas fa-money-bill-alt fs-3"></i>&emsp;
																</label>
																<label class="col-form-label fw-bold fs-3" id="lbl_total_amt" onkeyup="pay_to_property_calc()">0.00</label>
															</div>
														</div>
														<div class="row">
															<div class="row mt-6 text-start">
																<label class="col-lg-2 col-form-label fw-semibold fs-6 ">Agent Counts</label>
														    	<label class="col-lg-3 col-form-label fw-bold fs-3 " name="agent_count" id="agent_count">0</label>
                                  <label class="col-lg-2 col-form-label fw-semibold fs-6">Agent Amounts</label>
															    <label class="col-lg-3 col-form-label fw-bold fs-3" name="agent_tot_amt" id="agent_tot_amt">0.00</label>
															    <input type="hidden" name="agent_count_hidden" id="agent_count_hidden" value="0">
																<input type="hidden" name="agent_tot_amt_hidden" id="agent_tot_amt_hidden" value="0">
															    <div class="col-lg-2">
															    	<div class="d-flex justify-content-end ">
																	<button type="button" class="btn btn-primary" data-bs-toggle="modal"data-bs-target="#kt_modal_agent">Add Agents</button>
																	</div>
															    </div>
														    </div>
														    <?php for($i=1;$i<=10;$i++) { ?> 
														    <input type="hidden" name="agent_name_hid[]" id="agent_name_hid<?php echo $i;?>" >
														    <input type="hidden" name="agent_amt_hid[]"  id="agent_amt_hid<?php echo $i;?>" >
														    <?php } ?>
												    </div>
														<div class="row">
															<label class="col-lg-2 col-form-label fs-6	 fw-semibold">Actual Buying Rate</label>
															<div class="col-lg-3 fv-row fv-plugins-icon-container">
																<input type="hidden" name="actual_buying_rate" id="actual_buying_rate"  value="0"  oninput="this.value = this.value.replace(/[^/0-9.]/g, '').replace(/(\..*)\./g, '$1'); " >
																 <label class="col-form-label fw-bold fs-3" id="actual_buying_rate_lab">0.00</label>
																<div class="fv-plugins-message-container invalid-feedback" id="actual_buying_rate_err"></div>
															</div>
															<label class="col-lg-2 required col-form-label fs-6	 fw-semibold">By Buying Rate</label>
															<div class="col-lg-3">
															<input type="text" name="by_buying_rate" id="by_buying_rate" class="py-2 form-control form-control-lg form-control-solid" value="0"  oninput="this.value = this.value.replace(/[^/0-9.]/g, '').replace(/(\..*)\./g, '$1'); " >

															<div class="fv-plugins-message-container invalid-feedback" id="by_buying_rate_err"></div>
															</div>
															
														</div>
														
													</div>
												</div>
												<div class="row mt-4">
													<div class="col-lg-6 mt-4">
														<label class="col-form-label required fw-semibold fs-6">KYC</label>
														<div class="container my-4">
															<input type="file" id="kyc_mul_img" name="kyc_mul_img[]" multiple>
														</div>
														<div class="fv-plugins-message-container invalid-feedback text-center"id="kyc_mul_img_err" ></div>
													</div>
													<div class="col-lg-6 mt-4">
														<label class="col-form-label required fw-semibold fs-6">Registeration Documents</label>
														<div class="container my-4">
															<input type="file" id="reg_doc_mul" name="reg_doc_mul[]" multiple>
														</div>
														<div class="fv-plugins-message-container invalid-feedback text-center"id="reg_doc_mul_err" ></div>
													</div>
												</div>
												<div class="row mt-4">
													<div class="col-lg-6">
														<label class="col-form-label required fw-semibold fs-6">Others</label>
														<div class="container my-4">
															<input type="file" id="others_mul_img" name="others_mul_img[]" multiple>
														</div>
														<div class="fv-plugins-message-container invalid-feedback text-center"id="others_mul_img_err" ></div>
													</div>
												</div>
												<div class="row">
													<label class="col-form-label fw-bold fs-5">Purchase Payment Details</label>
													<div class="col-lg-2">
														<div class="d-flex align-items-center ">
															<label class="form-check form-check-inline form-check-solid me-5 is-invalid">
																<input class=" form-check-input" name="cash_chk" value="Cash" type="checkbox"  id="cash_create_radio" onclick="cash_cr_radio()">
															</label>
															<label class="col-form-label fw-semibold fs-6">Cash</label>
														</div>
													</div>
													<div class="col-lg-2">
														<div class="d-flex align-items-center ">
															<label class="form-check form-check-inline form-check-solid me-5 is-invalid">
																<input class=" form-check-input" name="bank_chk" type="checkbox" value="Cheque" id="bank_create_radio" onclick="bank_cr_radio()">
															</label>
															<label class=" col-form-label fw-semibold fs-6">Bank</label>
														</div>
													</div>
													<div class="col-lg-2">
														<div class="d-flex align-items-center ">
															<label class="form-check form-check-inline form-check-solid me-5 is-invalid">
																<input class=" form-check-input" name="upi_chk" type="checkbox" value="UPI" id="upi_create_radio" onclick="upi_cr_radio()">
															</label>
															<label class=" col-form-label fw-semibold fs-6">UPI</label>
														</div>
													</div>
													<div class="fv-plugins-message-container invalid-feedback" id="payment_err" ></div>
												</div>
												<div class="row">
													<label class="col-lg-1 col-form-label required fw-semibold fs-6" id="cash_cr_lab" style="display: none;">Cash</label>
													<div class="col-lg-2" id="cash_cr_tbox" style="display: none;">
														<input type="text" name="cashamount"  id="cashamount" value="0" class="form-control form-control-lg form-control-solid" placeholder="Amount" oninput="this.value = this.value.replace(/[^/0-9.]/g, '').replace(/(\..*)\./g, '$1');" onkeyup="cal_payment()">
														<div class="fv-plugins-message-container invalid-feedback"></div>
													</div>
													<label class="col-lg-1 col-form-label  fw-semibold fs-6" id="detail_ca_cr_lab" style="display: none;">Details</label>
													<div class="col-lg-2 fv-row fv-plugins-icon-container" id="detail_ca_cr_tbox" style="display: none;">
														<textarea class="form-control form-control-solid" rows="1" placeholder="Details" name="cashdetail" id="cashdetail"></textarea>
													</div>
												</div>
												<div class="row">
													<label class="col-lg-1 col-form-label required fw-semibold fs-6" id="cash_bk_cr_lab" style="display: none;">Bank</label>
													<div class="col-lg-2" id="cash_bk_cr_tbox" style="display: none;">
														<input type="text" name="chequeamount" id="chequeamount" value="0" class="form-control form-control-lg form-control-solid" placeholder="Amount" oninput="this.value = this.value.replace(/[^/0-9.]/g, '').replace(/(\..*)\./g, '$1');" onkeyup="cal_payment()">
														<div class="fv-plugins-message-container invalid-feedback"></div>
													</div>
													<label class="col-lg-1 col-form-label fw-semibold fs-6" id="bank_cr_lab" style="display: none;">Name</label>
													<div class="col-lg-2" id="bank_cr_sel" style="display: none;">
														<select class="form-select form-select-solid"  data-control="select2" name="chequebank" id="chequebank" >
															<option value="">Select Bank</option>
															<?php
																$bnk_det=$this->db->query("select * from BANKS where ACTIVE='Y'")->result_array();
																foreach ($bnk_det as $blist) {
																?>
																<option value="<?php echo $blist['BANKNAME'];?>"><?php echo $blist['BANKNAME'];?></option>
																<?php
																}
																?>
														</select>
														<div class="fv-plugins-message-container invalid-feedback" id="chequebank_err"></div>
													</div>
													<div class="col-lg-1" id="cheque_cr_lab" style="display: none;">
														<label class="col-form-label fw-semibold fs-6" ><span class="me-1">Cheq.No</span></label>
														<span  class="text-dark"><i class="fa fa-circle-info fs-7"></i></span>
														<span id="down">Ex:123456</span>
													</div>
													
													<div class="col-lg-2" id="cheque_cr_tbox" style="display: none;">
														<input type="text" name="chequerefno" id="chequerefno" class="form-control form-control-lg form-control-solid" placeholder="Cheque No" >
														<div class="fv-plugins-message-container invalid-feedback" id="chequerefno_err"></div>
														<div class="fv-plugins-message-container invalid-feedback" id="cheq_no_err"></div>

													</div>
													<label class="col-lg-1 col-form-label  fw-semibold fs-6" id="detail_bk_cr_lab" style="display: none;">Details</label>
													<div class="col-lg-2 fv-row fv-plugins-icon-container" id="detail_bk_cr_tbox" style="display: none;">
														<textarea class="form-control form-control-solid" rows="1" placeholder="Details" name="chequedetail" id="chequedetail"></textarea>
													</div>
												</div>
												<div class="row">
													<label class="col-lg-1 col-form-label required fw-semibold fs-6" id="cash_upi_cr_lab" style="display: none;">UPI</label>
													<div class="col-lg-2" id="cash_upi_cr_tbox" style="display: none;">
														<input type="text" name="upiamount" id="upiamount" value="0" class="form-control form-control-lg form-control-solid" onkeyup="cal_payment()" placeholder="Amount" oninput="this.value = this.value.replace(/[^/0-9.]/g, '').replace(/(\..*)\./g, '$1');">
														<div class="fv-plugins-message-container invalid-feedback"></div>
													</div>
													<label class="col-lg-1 col-form-label  fw-semibold fs-6" id="trans_cr_lab" style="display: none;">Trans.No</label>
													<div class="col-lg-2" id="trans_cr_tbox" style="display: none;">
														<input type="text" name="upirefno" id="upirefno" class="form-control form-control-lg form-control-solid" placeholder="Transaction No">
														<div class="fv-plugins-message-container invalid-feedback" id="upirefno_err"></div>
													</div>
													<label class="col-lg-1 col-form-label  fw-semibold fs-6" id="detail_upi_cr_lab" style="display: none;">Details</label>
													<div class="col-lg-2 fv-row fv-plugins-icon-container" id="detail_upi_cr_tbox" style="display: none;">
														<textarea class="form-control form-control-solid" rows="1" placeholder="Details" name="upidetail" id="upidetail"></textarea>
													</div>
												</div>
												<div class="row mt-4">
													<div class="col-lg-4 text-center">
														<label class="col-form-label fw-bold fs-4">Net Amount &emsp;</label>
														<label class="col-form-label fw-bold fs-3" id="lbl_total_amt_lab_2" onkeyup="pay_to_property_calc()">0.00</label>
														<input type="hidden" name="lbl_total_amt_val" id="lbl_total_amt_val" value="0">
													</div>
													<div class="col-lg-4 text-center">
														<label class="col-form-label fw-bold fs-4">Paid Amount &emsp;</label>
														<label class="col-form-label fw-bold fs-3" id="paid_amount_lab">0.00</label>
													</div>
													<div class="col-lg-4 text-center">
														<label class="col-form-label fw-bold fs-4">Balance Amount &emsp;</label>
														<label class="col-form-label fw-bold fs-3" id="lbl_bal_amt">0.00</label>
													</div>
												</div>
												<div class="d-flex justify-content-end">
													<button type="reset" class="btn btn-secondary me-3" data-bs-dismiss="modal">Cancel</button>
													<button type="submit" class="btn btn-primary" id="save_changes_add_product">Sale</button>
												</div>
												<div class="row">
													<input type="hidden" name="refname_hidden" id="refname_hidden">
													<input type="hidden" name="property_type_hidden" id="property_type_hidden">
													<input type="hidden" name="ploat_areano_hidden" id="ploat_areano_hidden">
													<input type="hidden" name="ploat_areatype_hidden" id="ploat_areatype_hidden">
													<input type="hidden" name="price_per_ploat_hidden" id="price_per_ploat_hidden">
													<input type="hidden" name="street_hidden" id="street_hidden">
													<input type="hidden" name="area_hidden" id="area_hidden">
													<input type="hidden" name="city_hidden" id="city_hidden">
													<input type="hidden" name="state_hidden" id="state_hidden">
													<input type="hidden" name="Latitude_hidden" id="Latitude_hidden">
													<input type="hidden" name="Longtitude_hidden" id="Longtitude_hidden">
													<input type="hidden" name="amenitites_hidden" id="amenitites_hidden" value="[]">
													<input type="hidden" name="description_hidden" id="description_hidden">
													<input type="hidden" name="pro_amount_hidden" id="pro_amount_hidden">
													<input type="hidden" name="paid_amount" id="paid_amount">

													<input type="hidden" name="agent_name_hidden" id="agent_name_hidden">
													<input type="hidden" name="agent_amt_hidden" id="agent_amt_hidden">
													<input type="hidden" name="agent_name2_hidden" id="agent_name2_hidden">
													<input type="hidden" name="agent_amt2_hidden" id="agent_amt2_hidden">
													<input type="hidden" name="agent_name3_hidden" id="agent_name3_hidden">
													<input type="hidden" name="agent_amt3_hidden" id="agent_amt3_hidden">
													<input type="hidden" name="agent_name4_hidden" id="agent_name4_hidden">
													<input type="hidden" name="agent_amt4_hidden" id="agent_amt4_hidden">

													<input type="hidden" name="vao_group_hidden" id="vao_group_hidden">
													<input type="hidden" name="register_office_hidden" id="register_office_hidden">
													<input type="hidden" name="servey_no_hidden" id="servey_no_hidden">
													<input type="hidden" name="partental_dno_hidden" id="partental_dno_hidden">
													<input type="hidden" name="document_curno_hidden" id="document_curno_hidden">
													<input type="hidden" name="patta_no_hidden" id="patta_no_hidden">
													<input type="hidden" name="ploat_no_hidden" id="ploat_no_hidden">
													<input type="hidden" name="ploat_type_hidden" id="ploat_type_hidden">
													<input type="hidden" name="balance_amount_hidden" id="balance_amount_hidden">
													<input type="hidden" name="total_prop_amt_hidden" id="total_prop_amt_hidden">
													<input type="hidden" name="prop_amt_hidden" id="prop_amt_hidden">
													<input type="hidden" name="land_lord_hidden" id="land_lord_hidden">
													<input type="hidden" name="land_name_hidden" id="land_name_hidden">
													<input type="hidden" name="pincode_hidden" id="pincode_hidden">
													<input type="hidden"   name="ploat_no_val" id="ploat_no_val" value="0">
													<input type="hidden"   name="cur_ploat_no_val" id="cur_ploat_no_val" value="0">


													<input type="hidden" name="acre_hidden" id="acre_hidden" value="0">
													<input type="hidden" name="cent_hidden" id="cent_hidden" value="0">
													<input type="hidden" name="square_hidden" id="square_hidden" value="0">
													<input type="hidden" name="match_value" id="match_value" value="0">

												</div>
												<script>
												 	function pay_to_property_calc(id){

						                var plot_input=parseFloat($('#ploat_no_val').val());
												 		var cur_plot=parseFloat($('#match_value').val());

															if (isNaN(plot_input)) plot_input = 0;
															if (isNaN(cur_plot)) cur_plot = 0;
															// if (isNaN(plot)) plot = 0;

												 				// var plot = plot_input -  cur_plot;	
												 				// if (isNaN(plot)) plot = 0;

												 						// alert	(plot)													
																			if ($('#prop_spa_no').val() > cur_plot){
																		    // alert("Enter Count is Exceed ");
																		    Swal.fire({
																					title:'Error !',
																					text: 'Please Check The Enter Count is Exceed..',
																					icon: 'error',
																					confirmButtonText: 'Okay'
																					});
																		    $('#prop_spa_no').val(0);
																		    $('#prop_price_spa').val(0);
																		    var zero = 0;
																		    var zero_val = zero.toLocaleString('en-IN', {
																				    maximumFractionDigits: 2,
																				    style: 'currency',
																				    currency: 'INR'
																				});
																		    $('#lbl_total_amt').html(zero_val);

																		  }
																		  else{



																  		var price=parseFloat($('#prop_price_spa').val());
																			var prop_count=parseFloat($('#prop_spa_no').val());
																			var ag_toatl_amount =parseFloat($('#agent_tot_amt_hidden').val());

																			if (isNaN(ag_toatl_amount)) ag_toatl_amount = 0;
																			if (isNaN(price)) price = 0;
																			if (isNaN(prop_count)) prop_count = 0;

																			var tot_amt = price * prop_count;
																			var total_price = tot_amt + ag_toatl_amount;

																			
																			var lab_tot = tot_amt.toLocaleString('en-IN', {
																				    maximumFractionDigits: 2,
																				    style: 'currency',
																				    currency: 'INR'
																				});


																			$('#lbl_total_amt').html(lab_tot);
																			$('#prop_amt_hidden').val(tot_amt);



																			var price=parseFloat($('#prop_price_spa').val());
																			var prop_count=parseFloat($('#prop_spa_no').val());
																			var ag_toatl_amount =parseFloat($('#agent_tot_amt_hidden').val());
																			if (isNaN(ag_toatl_amount)) ag_toatl_amount = 0;
																			if (isNaN(price)) price = 0;
																			if (isNaN(prop_count)) prop_count = 0;
																			// alert(price+'price');
																			// alert(ag_toatl_amount+'ag_amount');
																			// alert(prop_count+'prop');
																			var tot_amt = price * prop_count;
																			var total_price = tot_amt + ag_toatl_amount;

																			var lab_tot = tot_amt.toLocaleString('en-IN', {
																				    maximumFractionDigits: 2,
																				    style: 'currency',
																				    currency: 'INR'
																				});

																			$('#lbl_total_amt').html(lab_tot);
																			$('#prop_amt_hidden').val(tot_amt);
																			// alert(tot_amt)
																			
																			$('#lbl_total_amt_lab_2').html(lab_tot);
																			$('#actual_buying_rate_lab').html(lab_tot);
																			$('#actual_buying_rate').val(tot_amt);
																			$('#lbl_total_amt_val').val(tot_amt);

																			
																			// if (id!='') {
																		 		var name=$('#agent_names'+id).val();
																				var amt=parseFloat($('#agent_amount'+id).val());
																				if (isNaN(amt)) amt = 0;

																				if(ag_toatl_amount>0)
																				    {
																				    	var lab_tot2 = total_price.toLocaleString('en-IN', {
																							    maximumFractionDigits: 2,
																							    style: 'currency',
																							    currency: 'INR'
																							});
																							// alert(lab_tot2)
																				      $('#lbl_total_amt_lab_2').html(lab_tot2);
																				      $('#lbl_total_amt_val').val(total_price);
																				      $('#actual_buying_rate_lab').html(lab_tot2);
																							$('#actual_buying_rate').val(total_price);
																				    	$('#total_prop_amt_hidden').val(total_price);
																				    }
																				    else
																				    {

																							// alert(lab_tot)

																							var lab_tot3 = tot_amt.toLocaleString('en-IN', {
																							    maximumFractionDigits: 2,
																							    style: 'currency',
																							    currency: 'INR'
																							});
																				       
																						$('#lbl_total_amt_lab_2').html(lab_tot3);
																						$('#lbl_total_amt_val').val(tot_amt);
																						$('#total_prop_amt_hidden').val(total_price);
																						
																				    }
																				    if(name.trim()==''){

																								// $('#agent_count').html();
																								// $('#agent_count_hidden').val('');
																								$('#agent_name_hid'+id).val('');
																								$('#agent_amt_hid'+id).val('');
																								// $('#agent_tot_amt').html('');
																								// $('#agent_tot_amt_hidden').val(''); 
																						}
																					  else{ 

																					  	// $('#agent_count').html(id);
																							$('#agent_count_hidden').val(id);
																							$('#agent_name_hid'+id).val(name);
																							$('#agent_amt_hid'+id).val(amt);
																						  var tot_amount=0;													
																						  var tot_count=0;													
																							for(var i=1; i<=10; i++){
																								 var agent_amount_get=$('#agent_amount'+i).val();
																								 tot_amount += parseFloat(agent_amount_get);

																								 var agent_count_get=$('#agent_amount'+i).val();
																								 // var tot_ag_count += parseFloat(agent_count_get);

																								 if (agent_count_get>0) {
																								 	  tot_count=tot_count+1;	
																								 }
								 															}

								 															var agent_tot_lab = tot_amount.toLocaleString('en-IN', {
																							    maximumFractionDigits: 2,
																							    style: 'currency',
																							    currency: 'INR'
																							});

																						$('#agent_tot_amt').html(agent_tot_lab);
																						$('#agent_count').html(tot_count);
																						$('#agent_tot_amt_hidden').val(tot_amount);
																						$('#agent_count_hidden').val(tot_count);
																						// alert(tot_count);
																					 }
																			}															
														}
													</script>
													<script>
														function cal_payment(){

																		var cash = parseFloat($('#cashamount').val());
																		var cheque = parseFloat($('#chequeamount').val());
																		var upi = parseFloat($('#upiamount').val());
																		var rc_tot = parseFloat($('#lbl_total_amt_val').val());
																		if (isNaN(cash)) cash = 0;
																		if (isNaN(cheque)) cheque = 0;
																		if (isNaN(upi)) upi = 0;
																		if (isNaN(rc_tot)) rc_tot = 0;
																		var tot = cash + cheque + upi;

																		var paid_amt = tot.toLocaleString('en-IN', {
																							    maximumFractionDigits: 2,
																							    style: 'currency',
																							    currency: 'INR'
																							});
																		$('#lbl_paid_amt').html(paid_amt);
																		$('#paid_amount').val(tot);
																		$('#paid_amount_lab').html(paid_amt);

																		var diff = rc_tot - parseFloat(tot);

																		var diff_amt = diff.toLocaleString('en-IN', {
																							    maximumFractionDigits: 2,
																							    style: 'currency',
																							    currency: 'INR'
																							});
																		$('#lbl_bal_amt').html(diff_amt);
																		$('#balance_amount_hidden').val(diff);

																		if (diff < 0) {
																		    // alert("Please check if the entered amount exceeds the total");
																		    Swal.fire({
																					title: 'Amount Mismatch!',
																					text: 'Please Check The Enter Amount is Exceed..!',
																					icon: 'error',
																					confirmButtonText: 'Okay'
																					});
																		    var zero = 0;
																		    var zero_val = zero.toLocaleString('en-IN', {
																				    maximumFractionDigits: 2,
																				    style: 'currency',
																				    currency: 'INR'
																				});
																		    $('#cashamount').val('0');
																		    $('#chequeamount').val('0');
																		    $('#upiamount').val('0');
																		    $('#paid_amount_lab').html(zero_val);
																		    $('#lbl_bal_amt').html(zero_val);
																		    $('#label_paid_amount').html(zero_val);
																		    $('#balance_amount_hidden').val('0');
																		    $('#paid_amount_hidden').val('0');
																		}
													}
											    </script>
											</form>
										</div>
									</div>
									<!--start add agent popup -->
										<div class="modal fade" id="kt_modal_agent" tabindex="-1" data-bs-backdrop="static" aria-hidden="true">
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
														<div class="modal-body pt-0 pb-15 px-5 px-xl-20">
															<!--begin::Heading-->
															<div class="mb-13 text-center">
																<h1 class="mb-3">Add Agent</h1>	
															</div>
															<!--end::Heading-->
															<div class="row">
																<table id="add_agent_table">											
															    <thead> 
															        <tr class="fw-bold fs-6 text-gray-600 text-uppercase gs-0 text-center">
																        <th class="min-w-25px ">S.No</th>
																				<th class="text-center">Agent Name</th>
																				<th class="text-center">Amount</th>
															        </tr>
															    </thead>
															    <tbody class="text-gray-600 fw-semibold">
																				 <?php for($i=1;$i<=10;$i++) { ?> 
																					    	<tr>
																					    		<td><?php echo $i;?></td>
																					    		<td>
																					    		    <div class="d-flex justify-content-center fv-row fv-plugins-icon-container">
															                         	<select 
															                         	data-width="290px" aria-label="Select a Currency" data-control="select2"   class="form-select form-select-solid"  name="agent_names[]" id="agent_names<?php echo $i;?>" onchange="pay_to_property_calc(<?php echo $i; ?>)" data-dropdown-parent="#kt_modal_agent">

																														<option value="">Select</option>
																														<?php foreach($agent_list as $ag_list)
																														{ 
																															$value = $ag_list['LEDGER_NAME'].'~'.$ag_list['LEDGER_SNO'];?>
																															
																														<option value="<?php echo $value?$value:''; ?>" >

																															<?php echo $ag_list['LEDGER_NAME'];?><?php echo $ag_list['PHONE']?' | '.$ag_list['PHONE']:''; ?>

																														</option>
																														<?php } ?>
																												</select>

															                        </div>
																					    		</td>
																					    		<td>
																					    			<div class="d-flex justify-content-center fv-row fv-plugins-icon-container">
																					    			 <input type="text" class="col-lg-4 form-control form-control-lg form-control-solid" value="0"   name="agent_amount[]" id="agent_amount<?php echo $i;?>" style=" text-align: right;" data-width="200px"  placeholder="Amount" onkeyup="pay_to_property_calc(<?php echo $i; ?>)" oninput="this.value = this.value.replace(/[^/0-9.]/g, '').replace(/(\..*)\./g, '$1');">

																					    			</div>
																					    		</td>
																					    	</tr>
																			    	 <?php } ?>
																				    </tbody>
																			</table>
																</div>
																<div class="row mt-4">
																	<div class="d-flex justify-content-end mt-4 ">
																		<p type="text" class="btn btn-secondary me-3" data-bs-dismiss="modal">Cancel</p>
																		<p type="text" data-bs-dismiss="modal"  class="btn btn-primary"   onclick="pay_to_property_calc()">Add</p>
																	</div>
																</div>
															</div>
															<!--end::Actions-->
														</div>
														<!--end::Modal body-->
												</div>
												<!--end::Modal dialog-->
										</div>
										<!-- end add agent popup -->
										<!--end::Card body-->
								</div>
									<!--end::Tables Widget 9-->
							</div>
								<!--end::Col-->
						</div>
							<!--end::Row-->
					</div>
					<!--begin::Card toolbar-->
					<!--end::Card toolbar-->
						<!--end::Container-->
				<?php $this->load->view( "footer.php");?>
				</div>
					<!--end::Content-->
			</div>
				<!--end::Wrapper-->
		</div>
			<!--end::Page-->
	</div>
		<!--end::Root-->
		<input type="hidden" id="baseurl" value="<?php echo base_url();?>">
		<?php $this->load->view( "script.php") ;?>
		
		<script src="<?php echo base_url();?>assets/jquery.autocomplete.js"></script>

		<script>
			var baseurl = $("#baseurl").val();
		    var span = document.querySelector('#last_name');

	        $("#prop_party").autocomplete({ 
	                valueKey:'title',
	                source:[{
	                url:baseurl+'Realestatesale/userList?query=%QUERY%',
	                type:'remote',
	                ajax:{
	                  dataType : 'json',
	                }
	            }]}).on('selected.xdsoft',function(e,suggestion,ui){ 
	                $("#prop_party").val(suggestion.firstname);
	                $('#party_id_hidden').val(suggestion.id);
	                $('#first_name_id_hidden').val(suggestion.id);


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
	                $("#address").html(suggestion.address);
	                $("#mobile").html(suggestion.phone);
	        });
	       $('#last_name').on('DOMSubtreeModified',function(){
		  var pid= $("#first_name_id_hidden").val();
	            $.ajax({
							type: "POST",
							url: baseurl+'Realestatesale/get_photo',
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

		<script src="<?php echo base_url();?>assets/multi/fileinput.js" type="text/javascript"></script>
		<!-- kyc Multiple image script -->
		<script>
			$(document).ready(function () 
			{
				$('#kyc_mul_img').fileinput({
           uploadUrl: '#',
           showUpload: false,
           //uploadUrl: 'http://localhost/plugins/test-upload',
           initialPreviewAsData: true
          });
          });
		</script>
      <!-- reg doc Multiple Image Script -->
		<script>
			$(document).ready(function () 
			{
				$('#reg_doc_mul').fileinput({
           uploadUrl: '#',
           showUpload: false,
           //uploadUrl: 'http://localhost/plugins/test-upload',
           initialPreviewAsData: true
           });
           });
		</script>
		<!-- others Multiple Image Script -->
		<script>
			$(document).ready(function () 
			{
				$('#others_mul_img').fileinput({
           uploadUrl: '#',
           showUpload: false,
           //uploadUrl: 'http://localhost/plugins/test-upload',
           initialPreviewAsData: true
           });
           });
		</script>
		<!-- <script src="js/products-list.js"></script> -->
		<!-- Cash cr -->
		<script src="<?php echo base_url();?>assets/jquery.autocomplete.js"></script>

		<script>
			
			function property_sale_validation()
			{
				var err = 0;
				var dateval         = $('#kt_daterangepicker_pro_sale_add_date').val();
				var party           = $('#prop_party').val();
				var prop_price_spa  = $('#prop_price_spa').val();
				var prop_spa_no     = $('#prop_spa_no').val();
				var prop_spa_type   = $('#prop_spa_type').val();
				var property_id_ac  = $('#property_id_ac').val();
				var cash_amt        = $('#cashamount').val();
				var upi_amt         = $('#upiamount').val();
				var cheque_amt      = $('#chequeamount').val();
				var party_id_hidden = $('#party_id_hidden').val();

				if(party_id_hidden=='')
			    {
			        $('#party_id_hidden_err').html('Enter Valid Party Name!');
			        err++;
			    }
			    else
			    {
			       
					$('#party_id_hidden_err').html('');
					
			    }
 				 if((cash_amt<=0) && (upi_amt<=0) && (cheque_amt<=0))
				{
					$('#payment_err').html('Please select Any one of the payment mode And Enter Amount!');
					err++;
				}
				else
				{
					$('#payment_err').html('');
				}
				
				if(upi_amt>0){

					var upirefno=$('#upirefno').val();
					if(upirefno.trim()=='')
				    {
				        $('#upirefno_err').html('Enter Cheque No Required!');
				        err++;
				    }
				    else
				    {
						$('#upirefno_err').html('');
				    }

				}
				if(cheque_amt>0){

					var chequerefno=$('#chequerefno').val();
					if(chequerefno.trim()=='')
				    {
				        $('#chequerefno_err').html('Enter Transaction No Required!');
				        err++;
				    }
				    else
				    {
						$('#chequerefno_err').html('');
				    }
				    var length=chequerefno.length;
			
					if(parseInt(length)<6){
						
		                $('#cheq_no_err').html('cheq number is not correct format!');
		                err++;
		            }else{
		            	$('#cheq_no_err').html('');
		            }

				    var chequebank=$('#chequebank').val();
					if(chequebank.trim()=='')
				    {
				        $('#chequebank_err').html('Select Bank!');
				        err++;
				    }
				    else
				    {
						$('#chequebank_err').html('');
				    }

				}
				if(prop_spa_no<=0)
			    {
			        $('#prop_spa_no_err').html('Enter No of Count !');
			        err++;
			    }
			    else
			    {
			       
					$('#prop_spa_no_err').html('');
					
			    }
			    if(property_id_ac=='')
			    {
			        $('#property_id_ac_err').html('Select Purchase Id !');
			        err++;
			    }
			    else
			    {
			       
					$('#property_id_ac_err').html('');
					
			    }
			    if(prop_spa_type=='')
			    {
			        $('#prop_spa_type_err').html('Select Plot Area Type !');
			        err++;
			    }
			    else
			    {
			       
					$('#prop_spa_type_err').html('');
					
			    }
				
				if(party.trim()=='')
			    {
			        $('#prop_party_err').html('Enter Party Name!');
			        err++;
			    }
			    else
			    {
			       
					$('#prop_party_err').html('');
					
			    }

			    if(prop_price_spa<=0)
			    {
			        $('#prop_price_spa_err').html('Enter Sale Price Per Plot !');
			        err++;
			    }
			    else
			    {
			       
					$('#prop_price_spa_err').html('');
					
			    }
			   	var kyc_mul_img = $('#kyc_mul_img').val();
				if(kyc_mul_img.trim()=='')
			    {
			        $('#kyc_mul_img_err').html('Select KYC !');
			        err++;
			    }
			    else
			    {
			       
					$('#kyc_mul_img_err').html('');
					
			    }
			    var reg_doc_mul = $('#reg_doc_mul').val();
				if(reg_doc_mul.trim()=='')
			    {
			        $('#reg_doc_mul_err').html('Select Registeration Document !');
			        err++;
			    }
			    else
			    {
			       
					$('#reg_doc_mul_err').html('');
					
			    }
			    var others_mul_img = $('#others_mul_img').val();
				if(others_mul_img.trim()=='')
			    {
			        $('#others_mul_img_err').html('Select Others !');
			        err++;
			    }
			    else
			    {
			       
					$('#others_mul_img_err').html('');
					
			    }
			    var actual_buying_rate = $('#actual_buying_rate').val();
				if(actual_buying_rate.trim()=='')
			    {
			        $('#actual_buying_rate_err').html('Enter Actual Buying Rate !');
			        err++;
			    }
			    else
			    {
			       
					$('#actual_buying_rate_err').html('');
					
			    }
			    var by_buying_rate = $('#by_buying_rate').val();
				if(by_buying_rate.trim()=='')
			    {
			        $('#by_buying_rate_err').html('Enter By Buying Rate !');
			        err++;
			    }
			    else
			    {
			       
					$('#by_buying_rate_err').html('');
					
			    }
               
       

               if(err>0){ return false; }else{ return true; }
			}	
		</script>
		<script>
				function property_id(){
		      var pid = $('#property_id_ac').val();
              // alert(pid);

            var baseurl= $("#baseurl").val();
			//alert(val);
			$.ajax({
			type: "POST",
			url: baseurl+'Realestatesale/get_property_details',
			async: false,
			type: "POST",
			data: "id="+pid,
			dataType: "html",
		
			success: function(response)
			{

				


				var resp = response.split('||');
				$('#refname').html(resp[1]);
				$('#party_name').html(resp[2]);
				$('#property_type').html(resp[3]);
				$('#ploat_areano').html(resp[4]);
				$('#ploat_areatype').html(resp[5]);
				$('#price_per_ploat').html(resp[6]);
				$('#street').html(resp[7]);
				$('#area').html(resp[8]);
				$('#city').html(resp[9]);
				$('#state').html(resp[10]);


				var values =JSON.parse(resp[11]);
				var len =JSON.parse(resp[11]).length;
				var html="";
				for (var i = 0; len>i; i++) {

					html+="<span>"+values[i]+" , "+"</span>";

					
				}



				$('#amenitites').html(html);
				$('#Latitude').html(resp[12]);
				$('#Longtitude').html(resp[13]);
				$('#description').html(resp[14]);
				$('#pro_amount').html(resp[15]);
				$('#agent_name').html(resp[16]);
				$('#agent_amt').html(resp[17]);
				$('#vao_group').html(resp[18]);
				$('#register_office').html(resp[19]);
				$('#property_type').html(resp[20]);
				$('#servey_no').html(resp[21]);
				$('#partental_dno').html(resp[22]);
				$('#document_curno').html(resp[23]);
				$('#patta_no').html(resp[24]);
				$('#ploat_no').html(resp[25]);
				$('#ploat_no_val').val(resp[25]);
				$('#ploat_type').html(resp[26]);
				$('#total_property_amount').html(resp[27]);
				$('#cur_ploat_no').html(resp[28]);
				$('#cur_ploat_no_val').val(resp[28]);
				$('#cur_ploat_type').html(resp[29]);
				$('#cur_pro_amount').html(resp[30]);
				$('#pincode').html(resp[31]);
				$('#pincode_hidden').val(resp[31]);
				$('#land_lord_hidden').val(resp[32]);
				$('#land_name_hidden').val(resp[33]);


				$('#refname_hidden').val(resp[1]);
				$('#party_name_property_hidden').val(resp[2]);
				$('#property_type_hidden').val(resp[3]);
				$('#ploat_areano_hidden').val(resp[4]);
				$('#ploat_areatype_hidden').val(resp[5]);
				$('#price_per_ploat_hidden').val(resp[6]);
				$('#street_hidden').val(resp[7]);
				$('#area_hidden').val(resp[8]);
				$('#city_hidden').val(resp[9]);
				$('#state_hidden').val(resp[10]);

				$('#amenitites_hidden').val(resp[11]);
				$('#Latitude_hidden').val(resp[12]);
				$('#Longtitude_hidden').val(resp[13]);
				$('#description_hidden').val(resp[14]);
				$('#pro_amount_hidden').val(resp[15]);
				$('#agent_name_hidden').val(resp[16]);
				$('#agent_amt_hidden').val(resp[17]);
				$('#vao_group_hidden').val(resp[18]);
				$('#register_office_hidden').val(resp[19]);
				$('#property_type_hidden').val(resp[20]);
				$('#servey_no_hidden').val(resp[21]);
				$('#partental_dno_hidden').val(resp[22]);
				$('#document_curno_hidden').val(resp[23]);
				$('#patta_no_hidden').val(resp[24]);
				$('#ploat_no_hidden').val(resp[25]);
				$('#ploat_type_hidden').val(resp[25]);
				$('#total_property_amount_hidden').val(resp[26]);
				$('#party_name_hidden').val(resp[27]);
				$('#cur_ploat_no_hidden').val(resp[28]);
				$('#cur_ploat_type_hidden').val(resp[29]);
				$('#cur_pro_amount_hidden').val(resp[30]);


				$('#acre_hidden').val(resp[34]);
				$('#cent_hidden').val(resp[35]);
				$('#square_hidden').val(resp[36]);

				var plot_type = resp[29];
				// alert(plot_type);




				if (plot_type == 'Acre') {

					$('#prop_spa_type').html('<option value="">Select</option><option value="Sq.ft">Sq.ft</option><option value="Cent">Cent</option><option value="Acre">Acre</option>');

					$('#cent_div').hide();
					$('#square_div').hide();
					$('#acre_div').show();
					$('#match_value').val(0);

					$('#acre_div').html('<label class="col-form-label fs-6 fw-semibold">Current Balance</label><div class="col-lg-3"><div class="row"><label class="col-lg-4 col-form-label fs-6	 fw-semibold"><i 	class="fas fa-layer-group fs-6" title="Type Plot Area"></i>&nbsp;Acre</label><label class="col-lg-8 col-form-label fs-6	 fw-semibold"><i class="fas fa-list-ol fs-4"></i>&nbsp;'+resp[34]+'</label></div></div><div class="col-lg-3"><div class="row"><label class="col-lg-4 col-form-label fs-6	 fw-semibold"><i 	class="fas fa-layer-group fs-6" title="Type Plot Area"></i>&nbsp;Cent</label><label class="col-lg-8 col-form-label fs-6	 fw-semibold"> <i class="fas fa-list-ol fs-4"></i>&nbsp;'+resp[35]+'</label></div></div><div class="col-lg-4"><div class="row"><label class="col-lg-4 col-form-label fs-6	 fw-semibold"><i 	class="fas fa-layer-group fs-6" title="Type Plot Area"></i>&nbsp;Square Feet</label><label class="col-lg-8 col-form-label fs-6	 fw-semibold"><i class="fas fa-list-ol fs-4"></i>&nbsp;'+resp[36]+'</label></div></div>');


				}

				else if (plot_type == 'Cent') {

					$('#prop_spa_type').html('<option value="">Select</option><option value="Sq.ft">Sq.ft</option><option value="Cent">Cent</option>');
					$('#cent_div').show();
					$('#square_div').hide();
					$('#acre_div').hide();
					$('#match_value').val(0);

					$('#cent_div').html('<label class="col-form-label fs-6 fw-semibold">Current Balance</label><div class="col-lg-3"><div class="row"><label class="col-lg-4 col-form-label fs-6fw-semibold"><i class="fas fa-layer-group fs-6" title="Type Plot Area"></i>&nbsp;Cent</label><label class="col-lg-8 col-form-label fs-6	fw-semibold"> <i class="fas fa-list-ol fs-4"></i>&nbsp;'+resp[35]+'</label></div></div><div class="col-lg-4"><div class="row"><label class="col-lg-4 col-form-label fs-6	 fw-semibold"><i 	class="fas fa-layer-group fs-6" title="Type Plot Area"></i>&nbsp;Square Feet</label><label class="col-lg-8 col-form-label fs-6 fw-semibold"><i class="fas fa-list-ol fs-4"></i>&nbsp;'+resp[36]+'</label></div></div>');
				}
				else if (plot_type == 'Sq.ft') {

					$('#prop_spa_type').html('<option value="">Select</option><option value="Sq.ft">Sq.ft</option>');

					$('#cent_div').hide();
					$('#square_div').show();
					$('#acre_div').hide();
					$('#match_value').val(0);

						$('#square_div').html('<label class="col-form-label fs-6	 fw-semibold">Current Balance</label><div class="col-lg-4"><div class="row"><label class="col-lg-4 col-form-label fs-6	 fw-semibold"><i 	class="fas fa-layer-group fs-6" title="Type Plot Area"></i>&nbsp;Square Feet</label><label class="col-lg-8 col-form-label fs-6 fw-semibold"><i class="fas fa-list-ol fs-4"></i>&nbsp;'+resp[36]+'</label></div></div>');

				}else{

					$('#cent_div').hide();
					$('#square_div').hide();
					$('#acre_div').hide();
					$('#match_value').val(0);
				}
				


			}
			});

		}

		function acres_cent_sq_change() {

			var type = $('#prop_spa_type').val();

			var acre = $('#acre_hidden').val();
			var cent = $('#cent_hidden').val();
			var square = $('#square_hidden').val();

			if (type == 'Acre') {

					$('#match_value').val(acre);
				}

				if (type == 'Cent') {

					$('#match_value').val(cent);

				}
				if (type == 'Sq.ft') {

					$('#match_value').val(square);

				}


		}
		
		
    </script>

		<script>
			function cash_cr_radio()
					{
						var cash_create_radio = document.getElementById("cash_create_radio");

						var cash_cr_lab = document.getElementById("cash_cr_lab");
						var cash_cr_tbox = document.getElementById("cash_cr_tbox");
						var detail_ca_cr_lab = document.getElementById("detail_ca_cr_lab");
						var detail_ca_cr_tbox = document.getElementById("detail_ca_cr_tbox");

						if (cash_create_radio.checked == true)
						{
						    cash_cr_lab.style.display = "block";
						    cash_cr_tbox.style.display = "block";
						    detail_ca_cr_lab.style.display = "block";
						    detail_ca_cr_tbox.style.display = "block";
						    
					  	} else 
					  	{
					     	cash_cr_lab.style.display = "none";
					     	cash_cr_tbox.style.display = "none";
					     	detail_ca_cr_lab.style.display = "none";
					     	detail_ca_cr_tbox.style.display = "none";
						    
					  	}
					};
		</script>
		<!-- bank cr -->
		<script>
			function bank_cr_radio()
					{
						var bank_create_radio = document.getElementById("bank_create_radio");

						var cash_bk_cr_lab = document.getElementById("cash_bk_cr_lab");
						var cash_bk_cr_tbox = document.getElementById("cash_bk_cr_tbox");
						var bank_cr_lab = document.getElementById("bank_cr_lab");
						var bank_cr_sel = document.getElementById("bank_cr_sel");
						var cheque_cr_lab = document.getElementById("cheque_cr_lab");
						var cheque_cr_tbox = document.getElementById("cheque_cr_tbox");
						var detail_bk_cr_lab = document.getElementById("detail_bk_cr_lab");
						var detail_bk_cr_tbox = document.getElementById("detail_bk_cr_tbox");

						if (bank_create_radio.checked == true)
						{
							cash_bk_cr_lab.style.display = "block";
						    cash_bk_cr_tbox.style.display = "block";
						    bank_cr_lab.style.display = "block";
						    bank_cr_sel.style.display = "block";
						    cheque_cr_lab.style.display = "block";
						    cheque_cr_tbox.style.display = "block";
						    detail_bk_cr_lab.style.display = "block";
						    detail_bk_cr_tbox.style.display = "block";
						    
					  	} else 
					  	{
					  		cash_bk_cr_lab.style.display = "none";
						    cash_bk_cr_tbox.style.display = "none";
					     	bank_cr_lab.style.display = "none";
						    bank_cr_sel.style.display = "none";
						    cheque_cr_lab.style.display = "none";
						    cheque_cr_tbox.style.display = "none";
						    detail_bk_cr_lab.style.display = "none";
						    detail_bk_cr_tbox.style.display = "none";
						    
					  	}
					};
		</script>
		<!-- UPI cr -->
		<script>
			function upi_cr_radio()
					{
						var upi_create_radio = document.getElementById("upi_create_radio");

						var cash_upi_cr_lab = document.getElementById("cash_upi_cr_lab");
						var cash_upi_cr_tbox = document.getElementById("cash_upi_cr_tbox");
						var trans_cr_lab = document.getElementById("trans_cr_lab");
						var trans_cr_tbox = document.getElementById("trans_cr_tbox");
						var detail_upi_cr_lab = document.getElementById("detail_upi_cr_lab");
						var detail_upi_cr_tbox = document.getElementById("detail_upi_cr_tbox");

						if (upi_create_radio.checked == true)
						{
							cash_upi_cr_lab.style.display = "block";
						    cash_upi_cr_tbox.style.display = "block";
						    trans_cr_lab.style.display = "block";
						    trans_cr_tbox.style.display = "block";
						    detail_upi_cr_lab.style.display = "block";
						    detail_upi_cr_tbox.style.display = "block";
						    
					  	} else 
					  	{
					  		cash_upi_cr_lab.style.display = "none";
						    cash_upi_cr_tbox.style.display = "none";
						    trans_cr_lab.style.display = "none";
						    trans_cr_tbox.style.display = "none";
						    detail_upi_cr_lab.style.display = "none";
						    detail_upi_cr_tbox.style.display = "none";
						    
					  	}
					};
		</script>
		<script>
		$("#kt_daterangepicker_pro_sale_add_date").flatpickr({
						dateFormat: "d-m-Y",
					});
		</script>
	</body>
	<!--end::Body-->
</html>