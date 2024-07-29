<?php $this->load->view("common.php") ?>
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


		 /*Auto complete css start*/

		.agxdsoft_autocomplete,
		.agxdsoft_autocomplete div,
		.agxdsoft_autocomplete span{
		/*	-moz-box-sizing: border-box !important;
			box-sizing: border-box !important;*/
		}

		.agxdsoft_autocomplete{
		display:inline;
		position:relative;
		word-spacing: normal;
		text-transform: none;
		text-indent: 0px;
		text-shadow: none;
		text-align: start;
		}
		/*.agxdsoft_autocomplete_dropdown
		{
			left: 0px !important;
			top: 31px !important;
			margin-left: 0px !important;
			margin-right: 0px !important;
			width: 500px !important;
			display: none !important;
			max-height: 475px !important;
		}*/

		.agxdsoft_autocomplete .xdsoft_input{
			position:relative;
			z-index:2;
		}
		.agxdsoft_autocomplete .agxdsoft_autocomplete_dropdown{
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
		.agxdsoft_autocomplete .agxdsoft_autocomplete_hint{
			position:absolute;
			z-index:1;
			color:#ccc !important;
			-webkit-text-fill-color:#ccc !important;
			text-fill-color:#ccc  !important;
			overflow:hidden !important;
			white-space: pre  !important;
		}

		.agxdsoft_autocomplete .agxdsoft_autocomplete_hint span{
			color:transparent;
			opacity: 0.0;
		}

		.agxdsoft_autocomplete .agxdsoft_autocomplete_dropdown > .agxdsoft_autocomplete_copyright{
			color:#ddd;
			font-size:10px;
			text-decoration:none;
			right:5px;
			position:absolute;
			margin-top:-15px;
			z-index:1002;
		}
		.agxdsoft_autocomplete .agxdsoft_autocomplete_dropdown > div{
			background:#fff;
			white-space: nowrap;
			cursor: pointer;
			line-height: 1.5em;
			padding: 2px 0px 2px 0px;
		}
		.agxdsoft_autocomplete .agxdsoft_autocomplete_dropdown > div.active{
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
				<?php $this->load->view("sidebar.php") ?>
				<!--begin::Wrapper-->
				<div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
				<?php $this->load->view("header.php") ?>
				<!--begin::Toolbar-->
					<div class="toolbar py-2" id="kt_toolbar">
						<!--begin::Container-->
						<div id="kt_toolbar_container" class="container-fluid d-flex align-items-center">
							<!--begin::Page title-->
							<div class="flex-grow-1 flex-shrink-0 me-5">
								<!--begin::Page title-->
								<div data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
									<!--begin::Title-->
									<h1 class="d-flex align-items-center text-dark fw-bold my-1 fs-3">New Property Purchase
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
											<form method="POST" autocomplete="off" action="<?php echo base_url(); ?>Realestatepurchase/property_save" enctype="multipart/form-data" onsubmit="return property_validation()">
											<!--begin::Table-->
											<div class="row">
												<div class="col-lg-12">
													<div class="row">
														<div class="col-lg-5">
															
															<div class="row">
														<label class="col-lg-4 col-form-label required fw-semibold fs-6">Date</label>
														<div class="col-lg-8 fv-row">
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
																<input class="form-control form-control-solid ps-12 flatpickr-input" name="prop_date" placeholder="Date" id="kt_daterangepicker_lot_entry_add_date" value="<?php echo date("d-m-Y"); ?>" type="text" readonly="readonly">
															</div>
															<div class="fv-plugins-message-container invalid-feedback" id="prop_date_err"></div>
														</div>
													</div>
												</div>
														<label class="col-lg-2 col-form-label fw-semibold fs-6">Party <i class="fa-solid fa-circle-info fs-7"  title="AutoComplete Select Party Name"></i></label>
														<div class="col-lg-5 fv-row fv-plugins-icon-container">
															<input type="text" name="prop_party" id="prop_party" class="form-control form-control-lg form-control-solid" placeholder="Select Party Name" >
															<input type="hidden" name="first_name_id_hidden" id="first_name_id_hidden" value="">
															<div class="fv-plugins-message-container invalid-feedback" id="prop_party_err"></div>
															<div class="fv-plugins-message-container invalid-feedback" id="vprop_party_err"></div>
															<input type="hidden" name="party_id_hidden" id="party_id_hidden">
														</div>
													</div>
													<div class="row mt-4">
														<div class="col-lg-5">
															
															<div class="row">
																<!-- <div class="col-lg-12"> -->
																	<div class="col-lg-4 fv-row">
																	     <label class=" required col-form-label fw-semibold fs-6">Land Name</label>
																      </div>
																		<div class="col-lg-8 fv-row fv-plugins-icon-container">
																			<input type="text" name="land_name" id="land_name" class="form-control form-control-lg form-control-solid" placeholder="Land Name" >
																			<div class="fv-plugins-message-container invalid-feedback" id="land_name_err"></div>
																		</div>
																<!-- </div> -->
																
															</div>
															<div class="row">
																	<div class="col-lg-4 fv-row" >
																	<label class=" required col-form-label fw-semibold fs-6">Land Lord</label>
																	</div>
																	<div class="col-lg-8 fv-row fv-plugins-icon-container">

																	<input type="text" name="land_lord" id="land_lord" class="form-control form-control-lg form-control-solid" placeholder="Land Lord Name" >
																	<div class="fv-plugins-message-container invalid-feedback" id="land_lord_err"></div>
																</div>
															</div>
															<div class="row">
																<div class="col-lg-4 fv-row" >
																<label class="required col-form-label fw-semibold fs-6">Ref.Name</label>
															     </div>
																<div class="col-lg-8 fv-row fv-plugins-icon-container">
																	<input type="text" name="prop_ref_name" id="prop_ref_name" class="form-control form-control-lg form-control-solid" placeholder="Reference Name" >
																	<div class="fv-plugins-message-container invalid-feedback" id="prop_ref_name_err"></div>
																</div>
															</div>
														</div>
														<!-- <div class="col-lg-1">
														</div> -->
														<div class="col-lg-4">
														  <div class="row">
															<div class="col-lg-12 mt-4">
																<div class="row">
																	<div class="col-lg-3">
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
															<div class="col-lg-12 mt-4">
																<div class="row mt-4">
																	<div class="col-lg-3">
																		<span>
																			<i class="fa-solid fa-location-dot fs-6" aria-hidden="true" title="Address"></i>
																		</span>
																	</div>
																	<div class="col-lg-9">
																		<span class="col-form-label fw-bold fs-6" name="address" id="address">No, street, city</span>
																	</div>
																</div>
															</div>
															<div class="col-lg-12">
																<div class="row mt-4">
																	<div class="col-lg-6">
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
																	<div class="col-lg-6">
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
																</div>
															</div>
														</div>
														</div>
														<div class="col-lg-3">
															<div class="row">
																<div class="col-lg-12 fv-row">
																	<div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url(assets/media/svg/avatars/blank.svg)" id="party_photo" name="party_photo">
																		<div class="image-input-wrapper"  style="background-image: url(<?php echo base_url();?>assets/images/party.jpg)"></div>
																	</div>
																</div>
															</div>
														</div>
													</div>

													<div class="row">
														<div class="col-lg-5">
														 	<div class="row">
														 		<div class="col-lg-4">
																	<label class="required col-form-label fw-semibold fs-6">Register Office</label>
																</div> 
																<div class="col-lg-8 fv-row fv-plugins-icon-container">
																	<input type="text" name="prop_reg" id="prop_reg" class="form-control form-control-lg form-control-solid" placeholder="Register Office" value="">
																	<div class="fv-plugins-message-container invalid-feedback" id="prop_reg_err"></div>
																</div>
														 	</div>
														 </div>
														
														
														<div class="col-lg-2">
															<label class="required col-form-label fw-semibold fs-6">VAO Group</label>
														</div>
														<div class="col-lg-5 fv-row fv-plugins-icon-container">
															<select class="form-select form-select-solid" data-control="select2" data-hide-search="false" name="prop_vao_type" id="prop_vao_type" >
															<option value="">Select</option>
															<?php  foreach($vao_group as $vlist) {?>

																		<option value="<?php echo $vlist['VAO_NAME']?>"><?php echo $vlist['VAO_NAME'];?></option>

																		<?php }?>
														   </select>
															<div class="fv-plugins-message-container invalid-feedback" id="prop_vao_type_err"></div>
														</div>
														
													</div>
													<div class="row">
														
														<div class="col-lg-5">
														 	<div class="row">
														 		<div class="col-lg-4">
																	<label class="required col-form-label fw-semibold fs-6">Survey No</label>
																</div> 
																<div class="col-lg-8 fv-row fv-plugins-icon-container">
																		<input type="text" name="prop_servey_no" id="prop_servey_no" class="form-control form-control-lg form-control-solid" placeholder="Survey No" value="">
																		<div class="fv-plugins-message-container invalid-feedback" id="prop_servey_no_err"></div>
																</div>
														 	</div>
														 </div>
														
														<label class="col-lg-2 col-form-label required fw-semibold fs-6">Property Type</label>
														<div class="col-lg-5">
															<select class="form-select form-select-solid" data-control="select2" data-hide-search="false" name="prop_type_prop" id="prop_type_prop">
															<option value="">Select Type</option>
															<option value="Land">Land</option>
															<option value="House">House</option>
															<option value="Commercial">Commercial</option>
															<option value="Industrial">Industrial</option>
															<option value="Agriculture">Agriculture</option>
															</select>
															<div class="fv-plugins-message-container invalid-feedback" id="prop_type_prop_err"></div>
														</div>
														
													</div>
													<div class="row">
														<div class="col-lg-5">
														 	<div class="row">
														 		<div class="col-lg-4">
																	<label class="required col-form-label fw-semibold fs-6">Parental Doc</label>
																</div> 
																<div class="col-lg-8 fv-row fv-plugins-icon-container">
																		<input type="text" name="prop_pdoc" id="prop_pdoc" class="form-control form-control-lg form-control-solid" placeholder="Parental Documents No" value="">
																		<div class="fv-plugins-message-container invalid-feedback" id="prop_pdoc_err"></div>
																</div>
														 	</div>
														 </div>
														<div class="col-lg-2">
															<label class="required col-form-label fw-semibold fs-6">Current Doc</label>
														</div>
														<div class="col-lg-5 fv-row fv-plugins-icon-container">
															<input type="text" name="prop_curr_doc_no" id="prop_curr_doc_no" class="form-control form-control-lg form-control-solid" placeholder="Current Doucument No" value="">
															<div class="fv-plugins-message-container invalid-feedback" id="prop_curr_doc_no_err"></div>
														</div>
														
													</div>
													<div class="row">
														<div class="col-lg-5">
														 	<div class="row">
														 		<div class="col-lg-4">
																<label class="required col-form-label fw-semibold fs-6">Patta No</label>
																</div> 
																<div class="col-lg-8 fv-row fv-plugins-icon-container">
																	<input type="text" name="prop_patta_no" id="prop_patta_no" class="form-control form-control-lg form-control-solid" placeholder="Patta No" value="">
																<div class="fv-plugins-message-container invalid-feedback" id="prop_patta_no_err"></div>
																</div>
														 	</div>
														 </div>
														
														<div class="col-lg-2">
															<label class="required col-form-label fw-semibold fs-6">Street</label>
														</div>
														<div class="col-lg-5 fv-row fv-plugins-icon-container">
															<input type="text" name="prop_street" id="prop_street" class="form-control form-control-lg form-control-solid" placeholder="Street" value="">
															<div class="fv-plugins-message-container invalid-feedback" id="prop_street_err"></div>
														</div>
														
													</div>
													<div class="row">
														<div class="col-lg-5">
														 	<div class="row">
														 		<div class="col-lg-4">
																	<label class="required col-form-label fw-semibold fs-6">Area</label>
																</div> 
																<div class="col-lg-8 fv-row fv-plugins-icon-container">
																	<input type="text" name="prop_area"  id="prop_area" class="form-control form-control-lg form-control-solid" placeholder="Area" value="">
																	<div class="fv-plugins-message-container invalid-feedback" id="prop_area_err" ></div>
																</div>
														 	</div>
														 </div>
													 		<div class="col-lg-2">
																<label class="required col-form-label fw-semibold fs-6">State</label>
															</div> 
																<div class="col-lg-5 fv-row fv-plugins-icon-container">
																	<!-- <input type="text" name="prop_state" id="prop_state" class="form-control form-control-lg form-control-solid" placeholder="State" value=""> -->
																	<select id="prop_state" name="prop_state" aria-label="Select a Currency" data-control="select2" class="form-select form-select-solid form-select-lg fs-6" onchange="state_change()">
																			<option value="">Select State</option>
																			<option value="Andra Pradesh">Andra Pradesh</option>
																			<option value="Arunachal Pradesh">Arunachal Pradesh</option>
																			<option value="Assam">Assam</option>
																			<option value="Bihar">Bihar</option>
																			<option value="Chhattisgarh">Chhattisgarh</option>
																			<option value="Goa">Goa</option>
																			<option value="Gujarat">Gujarat</option>
																			<option value="Haryana">Haryana</option>
																			<option value="Himachal Pradesh">Himachal Pradesh</option>
																			<option value="Jammu and Kashmir">Jammu and Kashmir</option>
																			<option value="Jharkhand">Jharkhand</option>
																			<option value="Karnataka">Karnataka</option>
																			<option value="Kerala">Kerala</option>
																			<option value="Madya Pradesh">Madya Pradesh</option>
																			<option value="Maharashtra">Maharashtra</option>
																			<option value="Manipur">Manipur</option>
																			<option value="Meghalaya">Meghalaya</option>
																			<option value="Mizoram">Mizoram</option>
																			<option value="Nagaland">Nagaland</option>
																			<option value="Orissa">Orissa</option>
																			<option value="Punjab">Punjab</option>
																			<option value="Rajasthan">Rajasthan</option>
																			<option value="Sikkim">Sikkim</option>
																			<option value="Tamil Nadu" selected>Tamil Nadu</option>
																			<option value="Telangana">Telangana</option>
																			<option value="Tripura">Tripura</option>
																			<option value="Uttaranchal">Uttaranchal</option>
																			<option value="Uttar Pradesh">Uttar Pradesh</option>
																			<option value="West Bengal">West Bengal</option>
																			<option disabled style="background-color:#aaa; color:#fff">UNION Territories</option>
																			<option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
																			<option value="Chandigarh">Chandigarh</option>
																			<option value="Dadar and Nagar Haveli">Dadar and Nagar Haveli</option>
																			<option value="Daman and Diu">Daman and Diu</option>
																			<option value="Delhi">Delhi</option>
																			<option value="Lakshadeep">Lakshadeep</option>
																			<option value="Pondicherry">Pondicherry</option> 
																		</select>
																	<div class="fv-plugins-message-container invalid-feedback"id="prop_state_err" ></div>
																</div>
													</div>
													<div class="row">

														<div class="col-lg-5">
														 	<div class="row">
														 		<div class="col-lg-4">
																	<label class="required col-form-label fw-semibold fs-6">City</label>
																</div> 
																<div class="col-lg-8 fv-row fv-plugins-icon-container">
																	<!-- <input type="text" name="prop_city" id="prop_city" class="form-control form-control-lg form-control-solid" placeholder="City" value=""> -->
																	<select id="prop_city" name="prop_city" aria-label="Select a Currency" data-control="select2" class="form-select form-select-solid form-select-lg fs-6">
																		<option value="">Select City</option>
																	</select>
																	<div class="fv-plugins-message-container invalid-feedback"id="prop_city_err" ></div>
																</div>
														 	</div>
														 </div>
														<div class="col-lg-2">
															<label class="required col-form-label fw-semibold fs-6">Pincode</label>
														</div>
														<div class="col-lg-5 fv-row fv-plugins-icon-container">
															<input type="text" name="pincode" id="pincode" class="form-control form-control-lg form-control-solid" placeholder="Pincode" maxlength="7" oninput="this.value = this.value.replace(/[^/0-9]/g, '').replace(/(\..*)\./g, '$1');">
															<div class="fv-plugins-message-container invalid-feedback"id="pincode_err" ></div>
														</div>
													</div>

													<div class="row">
														<div class="col-lg-5">
														 	<div class="row">
														 		<div class="col-lg-4">
																	<label class="required col-form-label fw-semibold fs-6">Latitude</label>
																</div> 
																<div class="col-lg-8 fv-row fv-plugins-icon-container">
																		<input type="text" name="prop_lati" id="prop_lati" class="form-control form-control-lg form-control-solid" placeholder="Latitude" value="">
																		<div class="fv-plugins-message-container invalid-feedback"id="prop_lati_err" ></div>
																</div>
														 	</div>
														 </div>
														
														<div class="col-lg-2">
															<label class="required col-form-label fw-semibold fs-6">Longtitude</label>
														</div>
														<div class="col-lg-5 fv-row fv-plugins-icon-container">
															<input type="text" name="prop_longi" id="prop_longi" class="form-control form-control-lg form-control-solid" placeholder="Longtitude" value="">
															<div class="fv-plugins-message-container invalid-feedback"id="prop_longi_err" ></div>
														</div>
													</div>
													<div class="row">
														<div class="col-lg-5">
														 	<div class="row">
														 		<div class="col-lg-4">
																	<label class="required col-form-label fs-6	 fw-semibold">Plot Area</label>
																</div> 
																<div class="col-lg-4 fv-row fv-plugins-icon-container">
																		<input type="text" name="prop_ppa_no" id="prop_ppa_no" class="form-control form-control-lg form-control-solid" placeholder="Plot Area No" value="" title="Enter Your Number of Count" onkeyup="pay_to_property_calc()" oninput="this.value = this.value.replace(/[^/0-9.]/g, '').replace(/(\..*)\./g, '$1');" maxlength="8">
																		<div class="fv-plugins-message-container invalid-feedback"id="prop_ppa_no_err" ></div>
																</div>
																<div class="col-lg-4 fv-row fv-plugins-icon-container">
																			<select class="form-select form-select-solid" data-control="select2" data-hide-search="false" title="Select Your Plot Area Type" name="prop_ppa_type" id="prop_ppa_type"  onkeyup="pay_to_property_calc()">
																				<option value="">Select Type</option>																				
																				<option value="Sq.ft">Sq.ft</option>
																				<option value="Cent">Cent</option>
																				<option value="Acre">Acre</option>
																			</select>
																		<div class="fv-plugins-message-container invalid-feedback" id="prop_ppa_type_err" ></div>
																</div>
														 	</div>
														 </div>

														<label class="col-lg-2 required col-form-label fs-6	 fw-semibold">Price Per Plot Area</label>
														<div class="col-lg-5 fv-row fv-plugins-icon-container">
															<input type="text" name="prop_price_ppa" id="prop_price_ppa" class="form-control form-control-lg form-control-solid" placeholder="Price" value="" title="Enter Your Per Plot Area Amount"  onkeyup="pay_to_property_calc()" oninput="this.value = this.value.replace(/[^/0-9.]/g, '').replace(/(\..*)\./g, '$1');" maxlength="11">
															<div class="fv-plugins-message-container invalid-feedback"id="prop_price_ppa_err"></div>
															<input type="hidden" name="paid_amount_hidden" id="paid_amount_hidden" value="">
															<input type="hidden" name="balance_amount_hidden" id="balance_amount_hidden" value="">
															<input type="hidden" name="prop_amt_hidden" id="prop_amt_hidden" value="">
															<input type="hidden" name="total_prop_amt_hidden" id="total_prop_amt_hidden" value="">
														</div>												
														
													</div>
													<div class="row">
														<div class="col-lg-5">
														 	<div class="row">
														 		<div class="col-lg-5">
																	<label class="col-form-label fw-semibold fs-6">Amount</label>
																</div> 
																<div class="col-lg-7 fv-row fv-plugins-icon-container">
																	<label class="col-form-label fw-bold fs-3" name="lbl_total_amt" id="lbl_total_amt">0.00</label>
																</div>
															 </div>
														 </div>
														
														<div class="col-lg-2">
															<label class="required col-form-label fw-semibold fs-6">Amenities</label>
														</div>
														<div class="col-lg-5 fv-row fv-plugins-icon-container">
															<select class="form-select form-select-solid fw-semibold" data-control="select2" data-close-on-select="true" data-allow-clear="true" multiple="multiple" title="Select Your Plot Area Type" name="prop_amenities_type[]" id="prop_amenities_type">
															
															<option value="All" selected="">All</option>
															<option value="Near by School">Near by School</option>
															<option value="Near by College">Near by College</option>
															<option value="Near by Hospital">Near by Hospital</option>
														</select>
														<div class="fv-plugins-message-container invalid-feedback" id="prop_amenities_type_err" ></div>
														</div>
														
													</div>
													
													<div class="row">
														 <?php for($i=1;$i<=10;$i++) { ?> 

													    <input type="hidden" name="agent_name_hid[]" id="agent_name_hid<?php echo $i;?>" >
													    <input type="hidden" name="agent_amt_hid[]"  id="agent_amt_hid<?php echo $i;?>" >
													  
													    <?php } ?>
														<div class="col-lg-2">
															<label class="col-form-label fw-semibold fs-6">Description</label>
														</div>
														<div class="col-lg-10 fv-row fv-plugins-icon-container">
															<textarea class="form-control form-control-solid" rows="2" placeholder="Description" name="prop_des" id="prop_des"></textarea>
															<!-- <div class="fv-plugins-message-container invalid-feedback" id="prop_des_err" ></div> -->
														</div>
														
													</div>
													<div class="row mt-4 text-start">
														<label class="col-lg-2 col-form-label fw-semibold fs-6 ">Agent Counts</label>
												    	<label class="col-lg-2 col-form-label fw-bold fs-3 " name="agent_count" id="agent_count">0</label> 
												    	<label class="col-lg-2 col-form-label fw-semibold fs-6">Agent Amounts</label>
													    <label class="col-lg-2 col-form-label fw-bold fs-3 " name="agent_tot_amt" id="agent_tot_amt">0.00</label>
													    <input type="hidden" name="agent_tot_amt_hidden" id="agent_tot_amt_hidden" name="" onkeyup="pay_to_property_calc()">
													    <input type="hidden" name="agent_count_hidden" id="agent_count_hidden" value="0">

													    <div class="col-lg-3">
													    	<div class="d-flex justify-content-end ">
															<button type="button" class="btn btn-primary" data-bs-toggle="modal"data-bs-target="#kt_modal_agent">Add Agents</button>
														</div>
													    </div>
													    
														</div>
													<div class="row mt-3">
														<div class="col-lg-5">
															<div class="row">
																<div class="col-lg-12">
														 			<div class="row">
															 			<div class="col-lg-5">
																			<label class="col-form-label fw-semibold fs-6 required">Stamp Paper Charges</label>
																		</div> 
																		<div class="col-lg-7 fv-row fv-plugins-icon-container">
																				<input type="text" name="stamp_paper_charges" id="stamp_paper_charges" class="form-control form-control-lg form-control-solid" placeholder="Stamp Paper Charges" value="0" oninput="this.value = this.value.replace(/[^/0-9.]/g, '').replace(/(\..*)\./g, '$1');">
																				<div class="fv-plugins-message-container invalid-feedback"id="stamp_paper_charges_err" ></div>
																		</div>
															 		</div>
																</div>
																<div class="col-lg-12">
														 			<div class="row">
															 			<div class="col-lg-5">
																			<label class="required col-form-label fw-semibold fs-6">Duty Charges</label>
																		</div> 
																		<div class="col-lg-7 fv-row fv-plugins-icon-container">
																					<input type="text" name="duty_charges" id="duty_charges" class="form-control form-control-lg form-control-solid" placeholder="Duty Charges" value="0" oninput="this.value = this.value.replace(/[^/0-9.]/g, '').replace(/(\..*)\./g, '$1');">
																					<div class="fv-plugins-message-container invalid-feedback"id="duty_charges_err" ></div>
																		</div>
															 		</div>
																</div>
																<div class="col-lg-12">
															 			<div class="row">
															 			<div class="col-lg-5">
																			<label class="col-form-label fw-semibold fs-6 required">Vendor Charges</label>
																		</div> 
																		<div class="col-lg-7 fv-row fv-plugins-icon-container">
																					<input type="text" name="vendor_charges" id="vendor_charges" class="form-control form-control-lg form-control-solid" placeholder="Vendor Charges" value="0" oninput="this.value = this.value.replace(/[^/0-9.]/g, '').replace(/(\..*)\./g, '$1');">
																					<div class="fv-plugins-message-container invalid-feedback"id="vendor_charges_err" ></div>
																		</div>
															 		</div>
																</div>
																<div class="col-lg-12">
															 		<div class="row">
															 			<div class="col-lg-5">
																			<label class="col-form-label fw-semibold fs-6 required">Process Fees</label>
																		</div> 
																		<div class="col-lg-7 fv-row fv-plugins-icon-container">
																					<input type="text" name="process_fees" id="process_fees" class="form-control form-control-lg form-control-solid" placeholder="Process fees" value="0" oninput="this.value = this.value.replace(/[^/0-9.]/g, '').replace(/(\..*)\./g, '$1');">
																					<div class="fv-plugins-message-container invalid-feedback"id="process_fees_err" ></div>
																		</div>
															 		</div>
																</div>
																<div class="col-lg-12">
														 			<div class="row">
															 			<div class="col-lg-5">
																			<label class="required col-form-label fw-semibold fs-6">By Buying Rate</label>
																		</div> 
																		<div class="col-lg-7 fv-row fv-plugins-icon-container">
																				<input type="text" name="by_buying_rate" id="by_buying_rate" class="form-control form-control-lg form-control-solid" placeholder="By Buying Rate" value="0" oninput="this.value = this.value.replace(/[^/0-9.]/g, '').replace(/(\..*)\./g, '$1');">
																			<div class="fv-plugins-message-container invalid-feedback"id="by_buying_rate_err" ></div>
																		</div>
															 		</div>
																</div>




															</div>
														</div>

														<div class="col-lg-1"></div>

														<div class="col-lg-6">
															<div class="row">
																<div class="col-lg-4">
																	<label class="col-form-label fw-semibold fs-6 required">Actual&nbsp;Stamp&nbsp;Paper.Chr</label>
																</div>
																<div class="col-lg-8 fv-row fv-plugins-icon-container">
																		<input type="text" name="actual_stamp_paper_charges" id="actual_stamp_paper_charges" class="form-control form-control-lg form-control-solid" placeholder="Stamp Paper Charges" value="0" oninput="this.value = this.value.replace(/[^/0-9.]/g, '').replace(/(\..*)\./g, '$1');">
																		<div class="fv-plugins-message-container invalid-feedback"id="actual_stamp_paper_charges_err" ></div>
																</div>
															</div>
															<div class="row">
																<div class="col-lg-4">
																	<label class="col-form-label fw-semibold fs-6 required">Actual Duty Charges</label>
																</div>
																<div class="col-lg-8 fv-row fv-plugins-icon-container">
																		<input type="text" name="actual_duty_charges" id="actual_duty_charges" class="form-control form-control-lg form-control-solid" placeholder="Actual Buying Rate" value="0" oninput="this.value = this.value.replace(/[^/0-9.]/g, '').replace(/(\..*)\./g, '$1');">
																	 <div class="fv-plugins-message-container invalid-feedback"id="actual_duty_charges_err" ></div>
																</div>
															</div>
															<div class="row">
																<div class="col-lg-4">
																	<label class="col-form-label fw-semibold fs-6 required">Actual Vendor Charges</label>
																</div>
																<div class="col-lg-8 fv-row fv-plugins-icon-container">
																			<input type="text" name="actual_vendor_charges" id="actual_vendor_charges" class="form-control form-control-lg form-control-solid" placeholder="Vendor Charges" value="0" oninput="this.value = this.value.replace(/[^/0-9.]/g, '').replace(/(\..*)\./g, '$1');">
																		<div class="fv-plugins-message-container invalid-feedback"id="actual_vendor_charges_err" ></div>
																</div>
															</div>
															<div class="row">
																<div class="col-lg-4">
																	<label class="required col-form-label fw-semibold fs-6">Actual Process Fees</label>
																</div>
																<div class="col-lg-8 fv-row fv-plugins-icon-container">
																		<input type="text" name="actual_process_fees" id="actual_process_fees" class="form-control form-control-lg form-control-solid" placeholder="Actual Process fees" value="0" oninput="this.value = this.value.replace(/[^/0-9.]/g, '').replace(/(\..*)\./g, '$1');">
																	<div class="fv-plugins-message-container invalid-feedback"id="actual_process_fees_err" ></div>
																</div>
															</div>
															<div class="row">
																<div class="col-lg-4">
																	<label class="col-form-label fw-semibold fs-6 ">Actual Buying Rate</label>
																</div>
																<div class="col-lg-8 fv-row fv-plugins-icon-container">
																		<input type="hidden" name="actual_buying_rate" id="actual_buying_rate" class="form-control form-control-lg form-control-solid" placeholder="Actual Buying Rate" value="0" oninput="this.value = this.value.replace(/[^/0-9.]/g, '').replace(/(\..*)\./g, '$1');" readonly>
																		<label class="col-form-label fw-bold fs-3" id="actual_buying_rate_lab">0.00</label>
																	 <div class="fv-plugins-message-container invalid-feedback"id="actual_buying_rate_err" ></div>
																</div>
															</div>
														</div>
													</div>													
													
												</div>
										<div class="row mt-4">
											<div class="col-lg-6 mt-4">
												<label class="col-form-label required fw-semibold fs-6">Base Document</label>
											    	<div class="container my-4">
														<input type="file" id="base_mul_img" name="base_mul_img[]" multiple>
													</div>
													<div class="fv-plugins-message-container invalid-feedback text-center"id="base_mul_img_err" ></div>
											</div>
											<div class="col-lg-6 mt-4">
												<label class=" col-form-label required fw-semibold fs-6">Layout</label>
												<div class="col-lg-12">
													<div class="container my-4">
														<input type="file" id="layout_mul_img" name="layout_mul_img[]" multiple>
													</div>
													<div class="fv-plugins-message-container invalid-feedback text-center"id="layout_mul_img_err" ></div>
												</div>
											</div>
										</div>
										<div class="row mt-4">
											<div class="col-lg-6 mt-4">
												<label class="col-form-label required fw-semibold fs-6">EC</label>
											
													<div class="container my-4">
														<input type="file" id="ec_mul_img" name="ec_mul_img[]" multiple>
													</div>
													<div class="fv-plugins-message-container invalid-feedback text-center"id="ec_mul_img_err" ></div>
											</div>
											<div class="col-lg-6 mt-4">
												<label class="col-form-label required fw-semibold fs-6">Property</label>
													<div class="container my-4">
														<input type="file" id="property_mul_img" name="property_mul_img[]" multiple>
													</div>
													<div class="fv-plugins-message-container invalid-feedback text-center"id="property_mul_img_err" ></div>												
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
										</div>	
												
											
											<div class="row">
												<label class="col-form-label fw-bold fs-5">Property Payment Details</label>
												<div class="col-lg-2">
													<div class="d-flex align-items-center ">
														<label class="form-check form-check-inline form-check-solid me-5 is-invalid">
															<input class=" form-check-input" name="cash_chk" value="Cash" type="checkbox"  id="cash_create_radio" onclick="cash_cr_radio()">
														</label>
														<label class=" col-form-label fw-semibold fs-6">Cash</label>
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
													<input type="text" name="cashamount"  id="cashamount" value="0" class="form-control form-control-lg form-control-solid" placeholder="Amount" oninput="this.value = this.value.replace(/[^/0-9.]/g, '').replace(/(\..*)\./g, '$1');" onkeyup="pay_to_property_calc()">
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
													<input type="text" name="chequeamount" id="chequeamount" value="0" class="form-control form-control-lg form-control-solid" placeholder="Amount" oninput="this.value = this.value.replace(/[^/0-9.]/g, '').replace(/(\..*)\./g, '$1');" onkeyup="pay_to_property_calc()">
													<div class="fv-plugins-message-container invalid-feedback"></div>
												</div>
												<label class="col-lg-1 col-form-label required fw-semibold fs-6" id="bank_cr_lab" style="display: none;">Name</label>
												<div class="col-lg-2" id="bank_cr_sel" style="display: none;">
													<select class="form-select form-select-solid" data-control="select2" data-hide-search="false" name="chequebank" id="chequebank" >
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
												<label class="col-lg-1 col-form-label required fw-semibold fs-6" id="cheque_cr_lab" style="display: none;">Cheque</label>
												<div class="col-lg-2" id="cheque_cr_tbox" style="display: none;">
													<input type="text" name="chequerefno" id="chequerefno" class="form-control form-control-lg form-control-solid" placeholder="Cheque No" >
													<div class="fv-plugins-message-container invalid-feedback" id="chequerefno_err"></div>
												</div>
												<label class="col-lg-1 col-form-label  fw-semibold fs-6" id="detail_bk_cr_lab" style="display: none;">Details</label>
												<div class="col-lg-2 fv-row fv-plugins-icon-container" id="detail_bk_cr_tbox" style="display: none;">
													<textarea class="form-control form-control-solid" rows="1" placeholder="Details" name="chequedetail" id="chequedetail"></textarea>
												</div>
											</div>
											<div class="row">
												<label class="col-lg-1 col-form-label required fw-semibold fs-6" id="cash_upi_cr_lab" style="display: none;">UPI</label>
												<div class="col-lg-2" id="cash_upi_cr_tbox" style="display: none;">
													<input type="text" name="upiamount" id="upiamount" value="0" class="form-control form-control-lg form-control-solid" onkeyup="pay_to_property_calc()" placeholder="Amount" oninput="this.value = this.value.replace(/[^/0-9.]/g, '').replace(/(\..*)\./g, '$1');">
													<div class="fv-plugins-message-container invalid-feedback"></div>
												</div>
												<label class="col-lg-1 col-form-label required fw-semibold fs-6" id="trans_cr_lab" style="display: none;">Trans.No</label>
												<div class="col-lg-2" id="trans_cr_tbox" style="display: none;">
													<input type="text" name="upirefno" id="upirefno" class="form-control form-control-lg form-control-solid" placeholder="Transaction No" >
													<div class="fv-plugins-message-container invalid-feedback" id="upirefno_err"></div>
												</div>
												<label class="col-lg-1 col-form-label  fw-semibold fs-6" id="detail_upi_cr_lab" style="display: none;">Details</label>
												<div class="col-lg-2 fv-row fv-plugins-icon-container" id="detail_upi_cr_tbox" style="display: none;">
													<textarea class="form-control form-control-solid" rows="1" placeholder="Details" name="upidetail" id="upidetail"></textarea>
												</div>
											</div>
											<div class="row mt-4">
												<div class="col-lg-4">
													<label class="col-form-label fw-bold fs-4">Net Amount &emsp;</label>
													<label class="col-form-label fw-bold fs-3" id="lbl_total_amt_lab_2">0.00</label>
												</div>
												<div class="col-lg-4">
													<label class="col-form-label fw-bold fs-4">Paid Amount &emsp;</label>
													<label class="col-form-label fw-bold fs-3" id="paid_amount_lab">0.00</label>
												</div>
												<div class="col-lg-4">
													<label class="col-form-label fw-bold fs-4">Balance Amount &emsp;</label>
													<label class="col-form-label fw-bold fs-3" id="lbl_bal_amt">0.00</label>
												</div>
											</div>
											
											<div class="d-flex justify-content-end">
												<a type="reset" class="btn btn-secondary me-3"  href="<?php echo base_url(); ?>Realestatepurchase">Cancel</a>
												<button type="submit" class="btn btn-primary" id="save_changes_add_product">Add Property</button>
											</div>
										</div>
										<input type="hidden" id="baseurl" value="<?php echo base_url();?>">
										 <script>
										 	var baseurl = document.getElementById("baseurl").value;
											 	function pay_to_property_calc(id){
											 		
											 		var name = $('#agent_names'+id).val();
													var amt  = parseFloat($('#agent_amount'+id).val());
											 		// if(isNaN(name)) name='';
											 		if(isNaN(amt)) amt=0;		

					                var price=parseFloat($('#prop_price_ppa').val());
													var count=parseFloat($('#prop_ppa_no').val());

													var ag_toatl_amount =parseFloat($('#agent_tot_amt_hidden').val());


													if(ag_toatl_amount=='') ag_toatl_amount=0;
													
													if(isNaN(price)) price=0;
											 		if(isNaN(count)) count=0;	

													var tot_amt = price * count;


													var total_price = tot_amt + ag_toatl_amount ;

													var tamt = parseFloat(tot_amt).toLocaleString('en-IN', {
														    maximumFractionDigits: 2,
														    style: 'currency',
														    currency: 'INR'
														});

													var tprice = parseFloat(total_price).toLocaleString('en-IN', {
														    maximumFractionDigits: 2,
														    style: 'currency',
														    currency: 'INR'
														});
													
													$('#lbl_total_amt').html(tamt);


													$('#prop_amt_hidden').val(tot_amt);


													 if(ag_toatl_amount>0)
													    {
													        $('#lbl_total_amt_lab_2').html(tprice);
													        $('#actual_buying_rate').val(total_price);
													        
													        $('#actual_buying_rate_lab').html(tprice);
													        $('#total_prop_amt_hidden').val(total_price);

													    
													    }
													    else
													    {
													       
																$('#lbl_total_amt_lab_2').html(tamt);
																$('#actual_buying_rate').val(tot_amt);
																
																$('#actual_buying_rate_lab').html(tamt);

													    	$('#total_prop_amt_hidden').val(total_price);
															
													    }

													// $('#lbl_total_amt_lab_2').html(total_price);

													var cash=parseFloat($('#cashamount').val());
													// alert (cash);

													var cheque=parseFloat($('#chequeamount').val());
													var upi=parseFloat($('#upiamount').val());

													var rc_tot=parseFloat($('#actual_buying_rate').val());

													if (isNaN(cash))   cash = 0;
													if (isNaN(cheque)) cheque = 0;
													if (isNaN(upi))    upi = 0;
													// alert(cash);
													var tot= cash+cheque+upi;
													// alert(tot);
													var paidlab = parseFloat(tot).toLocaleString('en-IN', {
														    maximumFractionDigits: 2,
														    style: 'currency',
														    currency: 'INR'
														});
												
													$('#paid_amount_hidden').val(tot);
													$('#paid_amount_lab').html(paidlab);

													var diff = rc_tot - parseFloat(tot);

													var ballab = parseFloat(diff).toLocaleString('en-IN', {
														    maximumFractionDigits: 2,
														    style: 'currency',
														    currency: 'INR'
														});
													$('#lbl_bal_amt').html(ballab);
													$('#balance_amount_hidden').val(diff);


													if (diff < 0) {

															// alert("Please Check The Enter Amount is Exceed");
															Swal.fire({
																			title: 'Amount Mismatch!',
																			text: 'Please Check The Enter Amount is Exceed..',
																			icon: 'error',
																			confirmButtonText: 'Okay'
																			});

														    $('#cashamount').val('0');
														    $('#chequeamount').val('0');
														    $('#upiamount').val('0');
														    $('#paid_amount_lab').html('0');
														    $('#lbl_bal_amt').html('0');
														    $('#label_paid_amount').html('0');
														    $('#balance_amount_hidden').val('0');
														    $('#paid_amount_hidden').val('0');
														}

														// alert(name);
													 if(name.trim()==''){

													// $('#agent_count').html('');
													// $('#agent_count_hidden').val('');
													$('#agent_name_hid'+id).val('');
													$('#agent_amt_hid'+id).val('');
													// $('#agent_tot_amt').html('');
													// $('#agent_tot_amt_hidden').val('');



													 }
													 else{

														$('#agent_count').html(id);
														$('#agent_count_hidden').val(id);
														$('#agent_name_hid'+id).val(name);
														$('#agent_amt_hid'+id).val(amt);
													
													
													 
													  var tot_amount=0;													
													  var tot_count=0;													
														for(var i=1; i<=10; i++){
															 var agent_amount_get=$('#agent_amount'+i).val();
															 tot_amount += parseFloat(agent_amount_get);

															 var agent_count_get=$('#agent_amount'+i).val();

															 if (agent_count_get>0) {

															 	  tot_count=tot_count+1;	
															 	}


 														}
 														var amlab = parseFloat(tot_amount).toLocaleString('en-IN', {
														    maximumFractionDigits: 2,
														    style: 'currency',
														    currency: 'INR'
														});
														let totaco = tot_count;
														let twoDigitNumber = totaco.toString().padStart(2,'0');
														$('#agent_tot_amt').html(amlab);
														$('#agent_count').html(twoDigitNumber);
														// alert(tot_amount);
														$('#agent_tot_amt_hidden').val(tot_amount);
														$('#agent_count_hidden').val(tot_count);

													 }
												}
										</script> 
										</form>
										<!--start add agent popup -->
										<div class="modal fade" id="kt_modal_agent" tabindex="-1" aria-hidden="true" data-bs-keyboard="false" data-bs-backdrop="static">
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
																		<th class="min-w-290px text-center">Agent Name</th>
																		<th class="text-center">Amount</th>
															        </tr>
															    </thead>
															    <tbody class="text-gray-600 fw-semibold">
																	 <?php for($i=1;$i<=10;$i++) { ?> 
															    	<tr>
															    		<td class="text-center"><?php echo $i;?></td>
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
															    			<div class="d-flex justify-content-center">
														    			 		<input type="text" class="form-control form-control-lg form-control-solid" value="0" tabindex="1" data-width="200px" name="agent_amount[]" id="agent_amount<?php echo $i;?>" style="text-align:right;"placeholder="Amount"onkeyup="pay_to_property_calc(<?php echo $i; ?>)" oninput="this.value = this.value.replace(/[^/0-9.]/g, '').replace(/(\..*)\./g, '$1');">
															    			</div>
															    		</td>
															    	</tr>
															    	 <?php   } ?>
															    </tbody>
																</table> 
															</div>
																<div class="row mt-4">
																	<div class="d-flex justify-content-end mt-4 ">
																		<p type="reset" class="btn btn-secondary me-3" data-bs-dismiss="modal" >Cancel</p>
																		<p type="text" data-bs-dismiss="modal"  class="btn btn-primary"  onclick="pay_to_property_calc()">Add</p>
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
									
									</div>
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
				<?php $this->load->view("footer.php") ?>
				</div>
					<!--end::Content-->
			</div>
				<!--end::Wrapper-->
		</div>
			<!--end::Page-->
	</div>
		<!--end::Root-->
		
		<?php $this->load->view("script.php") ?>
		<script src="<?php echo base_url();?>assets/jquery.autocomplete.js"></script>

		<script>
			var baseurl = document.getElementById("baseurl").value
		    var span = document.querySelector('#last_name');

	        $("#prop_party").autocomplete({ 
	                valueKey:'title',
	                source:[{
	                url:baseurl+'Realestatepurchase/userList?query=%QUERY%',
	                type:'remote',
	                ajax:{
	                  dataType : 'json',
	                }
	            }]}).on('selected.xdsoft',function(e,suggestion,ui){ 
	                $("#prop_party").val(suggestion.firstname);
	                $('#party_id_hidden').val(suggestion.id);
	                $('#first_name_id_hidden').val(suggestion.id);


	                 var txt=suggestion.lastname+'&emsp; &emsp;<a target="_blank" href="<?php echo base_url();?>party/party_view/'+suggestion.id+'"><i class="fa-solid fa-binoculars fs-3" title=" View Party"></i></a>';
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
		  // alert('changed');
		  var pid= $("#first_name_id_hidden").val();
		  // alert(pid);
	            $.ajax({
							type: "POST",
							url: baseurl+'Realestatepurchase/get_photo',
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

		<!-- base Multiple image script -->
		<script>
			$(document).ready(function () 
			{
				$('#base_mul_img').fileinput({
           uploadUrl: '#',
           showUpload: false,
           //uploadUrl: 'http://localhost/plugins/test-upload',
           initialPreviewAsData: true
          });
          });
		</script>
		<!-- ec Multiple image script -->
		<script>
			$(document).ready(function () 
			{
				$('#ec_mul_img').fileinput({
           uploadUrl: '#',
           showUpload: false,
           //uploadUrl: 'http://localhost/plugins/test-upload',
           initialPreviewAsData: true
          });
          });
		</script>
		<!-- layout Multiple Image Script -->
		<script>
			$(document).ready(function () 
			{
				$('#layout_mul_img').fileinput({
           uploadUrl: '#',
           showUpload: false,
           //uploadUrl: 'http://localhost/plugins/test-upload',
           initialPreviewAsData: true
           });
           });
		</script>
		<!-- Property Multiple Image Script -->
		<script>
			$(document).ready(function () 
			{
				$('#property_mul_img').fileinput({
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
		<!-- validaion -->
		<script>
			function property_validation()
			{
				var err = 0;
				var dateval       = $('#kt_daterangepicker_lot_entry_add_date').val();
				var party         = $('#prop_party').val();
				var ref           = $('#prop_ref_name').val();
				var vao           = $('#prop_vao_type').val();
				var prop_reg      = $('#prop_reg').val();
				var prop_type_prop          = $('#prop_type_prop').val();
				var prop_servey_no          = $('#prop_servey_no').val();
				var prop_patta_no          = $('#prop_patta_no').val();
				var prop_pdoc          = $('#prop_pdoc').val();
				var prop_curr_doc_no          = $('#prop_curr_doc_no').val();
				var prop_street         = $('#prop_street').val();
				var prop_area         = $('#prop_area').val();
				var prop_state          = $('#prop_state').val();
				var prop_city          = $('#prop_city').val();
				var prop_lati          = $('#prop_lati').val();
				var prop_longi         = $('#prop_longi').val();

				var pincode          = $('#pincode').val();
				var land_lord          = $('#land_lord').val();

				var prop_price_ppa          = $('#prop_price_ppa').val();
				var prop_ppa_no         = $('#prop_ppa_no').val();
				var prop_ppa_type          = $('#prop_ppa_type').val();
				var prop_amenities_type          = $('#prop_amenities_type').val();
				var land_name           = $('#land_name').val();

				var actual_buying_rate      = $('#actual_buying_rate').val();
				var by_buying_rate          = $('#by_buying_rate').val();
				var stamp_paper_charges     = $('#stamp_paper_charges').val();
				var duty_charges           = $('#duty_charges').val();
				var vendor_charges           = $('#vendor_charges').val();
				var actual_process_fees           = $('#actual_process_fees').val();

				


				var first_name_id_hidden = $('#first_name_id_hidden').val();
				 if(party!='')
			    {
				if(first_name_id_hidden=='')
			    {
			        $('#vprop_party_err').html('Select Valid Party Name!');
			        err++;
			    }
			    else
			    {
			       
					$('#vprop_party_err').html('');
					
			    }

			  }

				if(dateval.trim()=='')
			    {
			        $('#prop_date_err').html('select date !');
			        err++;
			    }
			    else
			    { 
					$('#prop_date_err').html('');
			    }
			    if(party.trim()=='')
			    {
			        $('#prop_party_err').html('Select Party Name!');
			        err++;
			    }
			    else
			    {
			       
					$('#prop_party_err').html('');
					
			    }
			     if(ref.trim()=='')
			    {
			        $('#prop_ref_name_err').html('Enter Reference Name!');
			        err++;
			    }
			    else
			    {
			       
					$('#prop_ref_name_err').html('');
					
			    }
			     if(vao =='')
			    {
			        $('#prop_vao_type_err').html('Select VAO Group!');
			        err++;
			    }
			    else
			    {
			       
					$('#prop_vao_type_err').html('');
					
			    }
			     if(prop_reg.trim()=='')
			    {
			        $('#prop_reg_err').html('Enter Register Office !');
			        err++;
			    }
			    else
			    {
			       
					$('#prop_reg_err').html('');
					
			    }
			     if(prop_type_prop.trim()=='')
			    {
			        $('#prop_type_prop_err').html('Select Property Type !');
			        err++;
			    }
			    else
			    {
			       
					$('#prop_type_prop_err').html('');
					
			    }
			     if(prop_servey_no.trim()=='')
			    {
			        $('#prop_servey_no_err').html('Enter Servey No !');
			        err++;
			    }
			    else
			    {
			       
					$('#prop_servey_no_err').html('');
					
			    }

			 	if(prop_patta_no.trim()=='')
			    {
			        $('#prop_patta_no_err').html('Enter Patta No !');
			        err++;
			    }
			    else
			    {
			       
					$('#prop_patta_no_err').html('');
					
			    }
			    if(prop_pdoc.trim()=='')
			    {
			        $('#prop_pdoc_err').html('Enter Parental Documents No');
			        err++;
			    }
			    else
			    {
			       
					$('#prop_pdoc_err').html('');
					
			    }
			    if(prop_curr_doc_no.trim()=='')
			    {
			        $('#prop_curr_doc_no_err').html('Enter Current Doucument No');
			        err++;
			    }
			    else
			    {
			       
					$('#prop_curr_doc_no_err').html('');
					
			    }
			    if(prop_street.trim()=='')
			    {
			        $('#prop_street_err').html('Enter Street !');
			        err++;
			    }
			    else
			    {
			       
					$('#prop_street_err').html('');
					
			    }
			    if(prop_area.trim()=='')
			    {
			        $('#prop_area_err').html('Enter Area !');
			        err++;
			    }
			    else
			    {
			       
					$('#prop_area_err').html('');
					
			    }
			    if(prop_city.trim()=='')
			    {
			        $('#prop_city_err').html('Enter City !');
			        err++;
			    }
			    else
			    {
			       
					$('#prop_city_err').html('');
					
			    }
			    if(prop_state.trim()=='')
			    {
			        $('#prop_state_err').html('Enter State !');
			        err++;
			    }
			    else
			    {
			       
					$('#prop_state_err').html('');
					
			    }
			    if(prop_lati.trim()=='')
			    {
			        $('#prop_lati_err').html('Enter Latitude !');
			        err++;
			    }
			    else
			    {
			       
					$('#prop_lati_err').html('');
					
			    }
			    if(prop_longi.trim()=='')
			    {
			        $('#prop_longi_err').html('Enter Longtitude !');
			        err++;
			    }
			    else
			    {
			       
					$('#prop_longi_err').html('');
					
			    }
			    if(land_lord=='')
			    {
			        $('#land_lord_err').html('Enter Land Lord !');
			        err++;
			    }
			    else
			    {
			       
					$('#land_lord_err').html('');
					
			    }
			    if(pincode.trim()=='')
			    {
			        $('#pincode_err').html('Enter Pincode !');
			        err++;
			    }
			    else
			    {
			       
					$('#pincode_err').html('');
					
			    }
			    if(prop_price_ppa.trim()=='')
			    {
			        $('#prop_price_ppa_err').html('Enter Price Per Plot ');
			        err++;
			    }
			    else
			    {
			       
					$('#prop_price_ppa_err').html('');
					
			    }
			    if(prop_ppa_no.trim()=='')
			    {
			        $('#prop_ppa_no_err').html('Enter No of Count !');
			        err++;
			    }
			    else
			    {
			       
					$('#prop_ppa_no_err').html('');
					
			    }
			    if(prop_ppa_type=='')
			    {
			        $('#prop_ppa_type_err').html('Select Plot Area Type !');
			        err++;
			    }
			    else
			    {
			       
					$('#prop_ppa_type_err').html('');
					
			    }
			    if(prop_amenities_type=='')
			    {
			        $('#prop_amenities_type_err').html('Select Amenities !');
			        err++;
			    }
			    else
			    {
			       
					$('#prop_amenities_type_err').html('');
					
			    }
			    if(land_name.trim()=='')
			    {
			        $('#land_name_err').html('Enter Land Name !');
			        err++;
			    }
			    else
			    {
			       
					$('#land_name_err').html('');
					
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
			    var stamp_paper_charges = $('#stamp_paper_charges').val();
				if(stamp_paper_charges.trim()=='')
			    {
			        $('#stamp_paper_charges_err').html('Enter Stamp Paper Charges !');
			        err++;
			    }
			    else
			    {
			       
					$('#stamp_paper_charges_err').html('');
					
			    }
			    var duty_charges = $('#duty_charges').val();
				if(duty_charges.trim()=='')
			    {
			        $('#duty_charges_err').html('Enter Duty Charges !');
			        err++;
			    }
			    else
			    {
			       
					$('#duty_charges_err').html('');
					
			    }
			    var vendor_charges = $('#vendor_charges').val();
				if(vendor_charges.trim()=='')
			    {
			        $('#vendor_charges_err').html('Enter Vendor Charges !');
			        err++;
			    }
			    else
			    {
			       
					$('#vendor_charges_err').html('');
					
			    }
			    var actual_process_fees = $('#actual_process_fees').val();
				if(actual_process_fees.trim()=='')
			    {
			        $('#actual_process_fees_err').html('Enter Actual Process fees !');
			        err++;
			    }
			    else
			    {
			       
					$('#actual_process_fees_err').html('');
					
			    }
			    var base_mul_img = $('#base_mul_img').val();
				if(base_mul_img.trim()=='')
			    {
			        $('#base_mul_img_err').html('Select Base Document !');
			        err++;
			    }
			    else
			    {
			       
					$('#base_mul_img_err').html('');
					
			    }
			    var layout_mul_img = $('#layout_mul_img').val();
				if(layout_mul_img.trim()=='')
			    {
			        $('#layout_mul_img_err').html('Select Layout !');
			        err++;
			    }
			    else
			    {
			       
					$('#layout_mul_img_err').html('');
					
			    }
			    var ec_mul_img = $('#ec_mul_img').val();
				if(ec_mul_img.trim()=='')
			    {
			        $('#ec_mul_img_err').html('Select EC !');
			        err++;
			    }
			    else
			    {
			       
					$('#ec_mul_img_err').html('');
					
			    }
			    var property_mul_img = $('#property_mul_img').val();
				if(property_mul_img.trim()=='')
			    {
			        $('#property_mul_img_err').html('Select Property !');
			        err++;
			    }
			    else
			    {
			       
					$('#property_mul_img_err').html('');
					
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
			    var cash_amt = $('#cashamount').val();
				var upi_amt = $('#upiamount').val();
				var cheque_amt = $('#chequeamount').val();
			     if((cash_amt<=0) && (upi_amt<=0) && (cheque_amt<=0))
				{

					$('#payment_err').html('Please select Any one of the payment mode And Enter Amount!');
					err++;

				}
				else
				{
					$('#payment_err').html('');
					// $('#ac_amount_err').html('');
				}
			    if (cheque_amt>0) {

			    	var chequebank = $('#chequebank').val();
			    	if (chequebank=="") {

				    	$('#chequebank_err').html('Please select Bank !');
						err++;
					}
					else{
						$('#chequebank_err').html('');
					}

					var chequerefno = $('#chequerefno').val();
			    	if (chequerefno.trim()=='') {

				    	$('#chequerefno_err').html('Reference No is Required !');
						err++;
					}
					else{
						$('#chequerefno_err').html('');
					}

			    }
			     if (upi_amt>0) {

			    	

					var upirefno = $('#upirefno').val();
			    	if (upirefno.trim()=='') {

				    	$('#upirefno_err').html('Transaction No is Required !');
						err++;
					}
					else{
						$('#upirefno_err').html('');
					}

			    }

			    var actual_stamp_paper_charges = $('#actual_stamp_paper_charges').val();
				if(actual_stamp_paper_charges.trim()=='')
			    {
			        $('#actual_stamp_paper_charges_err').html('Enter Actual Stamp Paper Charges !');
			        err++;
			    }
			    else
			    {
			       
					$('#actual_stamp_paper_charges_err').html('');
					
			    }
			    var actual_duty_charges = $('#actual_duty_charges').val();
				if(actual_duty_charges.trim()=='')
			    {
			        $('#actual_duty_charges_err').html('Enter Actual Duty Charges !');
			        err++;
			    }
			    else
			    {
			       
					$('#actual_duty_charges_err').html('');
					
			    }
			    var actual_vendor_charges = $('#actual_vendor_charges').val();
				if(actual_vendor_charges.trim()=='')
			    {
			        $('#actual_vendor_charges_err').html('Enter Actual Vendor Charges !');
			        err++;
			    }
			    else
			    {
			       
					$('#actual_vendor_charges_err').html('');
					
			    }
			    var process_fees = $('#process_fees').val();
				if(process_fees.trim()=='')
			    {
			        $('#process_fees_err').html('Enter Process fees !');
			        err++;
			    }
			    else
			    {
			       
					$('#process_fees_err').html('');
					
			    }

			   

			     if(err>0){ return false; }else{ return true; }
			}		
		</script>
		<!-- payments -->
	
		<!-- Cash cr -->
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
			$("#kt_daterangepicker_lot_entry_add_date").flatpickr({
							dateFormat: "d-m-Y",
						});
		</script>

		<!-- state city  -->
		<script>
			state_change()
			function state_change(){

				// alert('yes');

				var AndraPradesh = ["Anantapur","Chittoor","East Godavari","Guntur","Kadapa","Krishna","Kurnool","Prakasam","Nellore","Srikakulam","Visakhapatnam","Vizianagaram","West Godavari"];
				var ArunachalPradesh = ["Anjaw","Changlang","Dibang Valley","East Kameng","East Siang","Kra Daadi","Kurung Kumey","Lohit","Longding","Lower Dibang Valley","Lower Subansiri","Namsai","Papum Pare","Siang","Tawang","Tirap","Upper Siang","Upper Subansiri","West Kameng","West Siang","Itanagar"];
				var Assam = ["Baksa","Barpeta","Biswanath","Bongaigaon","Cachar","Charaideo","Chirang","Darrang","Dhemaji","Dhubri","Dibrugarh","Goalpara","Golaghat","Hailakandi","Hojai","Jorhat","Kamrup Metropolitan","Kamrup (Rural)","Karbi Anglong","Karimganj","Kokrajhar","Lakhimpur","Majuli","Morigaon","Nagaon","Nalbari","Dima Hasao","Sivasagar","Sonitpur","South Salmara Mankachar","Tinsukia","Udalguri","West Karbi Anglong"];
				var Bihar = ["Araria","Arwal","Aurangabad","Banka","Begusarai","Bhagalpur","Bhojpur","Buxar","Darbhanga","East Champaran","Gaya","Gopalganj","Jamui","Jehanabad","Kaimur","Katihar","Khagaria","Kishanganj","Lakhisarai","Madhepura","Madhubani","Munger","Muzaffarpur","Nalanda","Nawada","Patna","Purnia","Rohtas","Saharsa","Samastipur","Saran","Sheikhpura","Sheohar","Sitamarhi","Siwan","Supaul","Vaishali","West Champaran"];
				var Chhattisgarh = ["Balod","Baloda Bazar","Balrampur","Bastar","Bemetara","Bijapur","Bilaspur","Dantewada","Dhamtari","Durg","Gariaband","Janjgir Champa","Jashpur","Kabirdham","Kanker","Kondagaon","Korba","Koriya","Mahasamund","Mungeli","Narayanpur","Raigarh","Raipur","Rajnandgaon","Sukma","Surajpur","Surguja"];
				var Goa = ["North Goa","South Goa"];
				var Gujarat = ["Ahmedabad","Amreli","Anand","Aravalli","Banaskantha","Bharuch","Bhavnagar","Botad","Chhota Udaipur","Dahod","Dang","Devbhoomi Dwarka","Gandhinagar","Gir Somnath","Jamnagar","Junagadh","Kheda","Kutch","Mahisagar","Mehsana","Morbi","Narmada","Navsari","Panchmahal","Patan","Porbandar","Rajkot","Sabarkantha","Surat","Surendranagar","Tapi","Vadodara","Valsad"];
				var Haryana = ["Ambala","Bhiwani","Charkhi Dadri","Faridabad","Fatehabad","Gurugram","Hisar","Jhajjar","Jind","Kaithal","Karnal","Kurukshetra","Mahendragarh","Mewat","Palwal","Panchkula","Panipat","Rewari","Rohtak","Sirsa","Sonipat","Yamunanagar"];
				var HimachalPradesh = ["Bilaspur","Chamba","Hamirpur","Kangra","Kinnaur","Kullu","Lahaul Spiti","Mandi","Shimla","Sirmaur","Solan","Una"];
				var JammuKashmir = ["Anantnag","Bandipora","Baramulla","Budgam","Doda","Ganderbal","Jammu","Kargil","Kathua","Kishtwar","Kulgam","Kupwara","Leh","Poonch","Pulwama","Rajouri","Ramban","Reasi","Samba","Shopian","Srinagar","Udhampur"];
				var Jharkhand = ["Bokaro","Chatra","Deoghar","Dhanbad","Dumka","East Singhbhum","Garhwa","Giridih","Godda","Gumla","Hazaribagh","Jamtara","Khunti","Koderma","Latehar","Lohardaga","Pakur","Palamu","Ramgarh","Ranchi","Sahebganj","Seraikela Kharsawan","Simdega","West Singhbhum"];
				var Karnataka = ["Bagalkot","Bangalore Rural","Bangalore Urban","Belgaum","Bellary","Bidar","Vijayapura","Chamarajanagar","Chikkaballapur","Chikkamagaluru","Chitradurga","Dakshina Kannada","Davanagere","Dharwad","Gadag","Gulbarga","Hassan","Haveri","Kodagu","Kolar","Koppal","Mandya","Mysore","Raichur","Ramanagara","Shimoga","Tumkur","Udupi","Uttara Kannada","Yadgir"];
				var Kerala = ["Alappuzha","Ernakulam","Idukki","Kannur","Kasaragod","Kollam","Kottayam","Kozhikode","Malappuram","Palakkad","Pathanamthitta","Thiruvananthapuram","Thrissur","Wayanad"];
				var MadhyaPradesh = ["Agar Malwa","Alirajpur","Anuppur","Ashoknagar","Balaghat","Barwani","Betul","Bhind","Bhopal","Burhanpur","Chhatarpur","Chhindwara","Damoh","Datia","Dewas","Dhar","Dindori","Guna","Gwalior","Harda","Hoshangabad","Indore","Jabalpur","Jhabua","Katni","Khandwa","Khargone","Mandla","Mandsaur","Morena","Narsinghpur","Neemuch","Panna","Raisen","Rajgarh","Ratlam","Rewa","Sagar","Satna",
				"Sehore","Seoni","Shahdol","Shajapur","Sheopur","Shivpuri","Sidhi","Singrauli","Tikamgarh","Ujjain","Umaria","Vidisha"];
				var Maharashtra = ["Ahmednagar","Akola","Amravati","Aurangabad","Beed","Bhandara","Buldhana","Chandrapur","Dhule","Gadchiroli","Gondia","Hingoli","Jalgaon","Jalna","Kolhapur","Latur","Mumbai City","Mumbai Suburban","Nagpur","Nanded","Nandurbar","Nashik","Osmanabad","Palghar","Parbhani","Pune","Raigad","Ratnagiri","Sangli","Satara","Sindhudurg","Solapur","Thane","Wardha","Washim","Yavatmal"];
				var Manipur = ["Bishnupur","Chandel","Churachandpur","Imphal East","Imphal West","Jiribam","Kakching","Kamjong","Kangpokpi","Noney","Pherzawl","Senapati","Tamenglong","Tengnoupal","Thoubal","Ukhrul"];
				var Meghalaya = ["East Garo Hills","East Jaintia Hills","East Khasi Hills","North Garo Hills","Ri Bhoi","South Garo Hills","South West Garo Hills","South West Khasi Hills","West Garo Hills","West Jaintia Hills","West Khasi Hills"];
				var Mizoram = ["Aizawl","Champhai","Kolasib","Lawngtlai","Lunglei","Mamit","Saiha","Serchhip","Aizawl","Champhai","Kolasib","Lawngtlai","Lunglei","Mamit","Saiha","Serchhip"];
				var Nagaland = ["Dimapur","Kiphire","Kohima","Longleng","Mokokchung","Mon","Peren","Phek","Tuensang","Wokha","Zunheboto"];
				var Odisha = ["Angul","Balangir","Balasore","Bargarh","Bhadrak","Boudh","Cuttack","Debagarh","Dhenkanal","Gajapati","Ganjam","Jagatsinghpur","Jajpur","Jharsuguda","Kalahandi","Kandhamal","Kendrapara","Kendujhar","Khordha","Koraput","Malkangiri","Mayurbhanj","Nabarangpur","Nayagarh","Nuapada","Puri","Rayagada","Sambalpur","Subarnapur","Sundergarh"];
				var Punjab = ["Amritsar","Barnala","Bathinda","Faridkot","Fatehgarh Sahib","Fazilka","Firozpur","Gurdaspur","Hoshiarpur","Jalandhar","Kapurthala","Ludhiana","Mansa","Moga","Mohali","Muktsar","Pathankot","Patiala","Rupnagar","Sangrur","Shaheed Bhagat Singh Nagar","Tarn Taran"];
				var Rajasthan = ["Ajmer","Alwar","Banswara","Baran","Barmer","Bharatpur","Bhilwara","Bikaner","Bundi","Chittorgarh","Churu","Dausa","Dholpur","Dungarpur","Ganganagar","Hanumangarh","Jaipur","Jaisalmer","Jalore","Jhalawar","Jhunjhunu","Jodhpur","Karauli","Kota","Nagaur","Pali","Pratapgarh","Rajsamand","Sawai Madhopur","Sikar","Sirohi","Tonk","Udaipur"];
				var Sikkim = ["East Sikkim","North Sikkim","South Sikkim","West Sikkim"];
				var TamilNadu = ["Ariyalur","Chennai","Coimbatore","Cuddalore","Dharmapuri","Dindigul","Erode","Kanchipuram","Kanyakumari","Karur","Krishnagiri","Madurai","Nagapattinam","Namakkal","Nilgiris","Perambalur","Pudukkottai","Ramanathapuram","Salem","Sivaganga","Thanjavur","Theni","Thoothukudi","Tiruchirappalli","Tirunelveli","Tiruppur","Tiruvallur","Tiruvannamalai","Tiruvarur","Vellore","Viluppuram","Virudhunagar"];
				var Telangana = ["Adilabad","Bhadradri Kothagudem","Hyderabad","Jagtial","Jangaon","Jayashankar","Jogulamba","Kamareddy","Karimnagar","Khammam","Komaram Bheem","Mahabubabad","Mahbubnagar","Mancherial","Medak","Medchal","Nagarkurnool","Nalgonda","Nirmal","Nizamabad","Peddapalli","Rajanna Sircilla","Ranga Reddy","Sangareddy","Siddipet","Suryapet","Vikarabad","Wanaparthy","Warangal Rural","Warangal Urban","Yadadri Bhuvanagiri"];
				var Tripura = ["Dhalai","Gomati","Khowai","North Tripura","Sepahijala","South Tripura","Unakoti","West Tripura"];
				var UttarPradesh = ["Agra","Aligarh","Allahabad","Ambedkar Nagar","Amethi","Amroha","Auraiya","Azamgarh","Baghpat","Bahraich","Ballia","Balrampur","Banda","Barabanki","Bareilly","Basti","Bhadohi","Bijnor","Budaun","Bulandshahr","Chandauli","Chitrakoot","Deoria","Etah","Etawah","Faizabad","Farrukhabad","Fatehpur","Firozabad","Gautam Buddha Nagar","Ghaziabad","Ghazipur","Gonda","Gorakhpur","Hamirpur","Hapur","Hardoi","Hathras","Jalaun","Jaunpur","Jhansi","Kannauj","Kanpur Dehat","Kanpur Nagar","Kasganj","Kaushambi","Kheri","Kushinagar","Lalitpur","Lucknow","Maharajganj","Mahoba","Mainpuri","Mathura","Mau","Meerut","Mirzapur","Moradabad","Muzaffarnagar","Pilibhit","Pratapgarh","Raebareli","Rampur","Saharanpur","Sambhal","Sant Kabir Nagar","Shahjahanpur","Shamli","Shravasti","Siddharthnagar","Sitapur","Sonbhadra","Sultanpur","Unnao","Varanasi"];
				var Uttarakhand  = ["Almora","Bageshwar","Chamoli","Champawat","Dehradun","Haridwar","Nainital","Pauri","Pithoragarh","Rudraprayag","Tehri","Udham Singh Nagar","Uttarkashi"];
				var WestBengal = ["Alipurduar","Bankura","Birbhum","Cooch Behar","Dakshin Dinajpur","Darjeeling","Hooghly","Howrah","Jalpaiguri","Jhargram","Kalimpong","Kolkata","Malda","Murshidabad","Nadia","North 24 Parganas","Paschim Bardhaman","Paschim Medinipur","Purba Bardhaman","Purba Medinipur","Purulia","South 24 Parganas","Uttar Dinajpur"];
				var AndamanNicobar = ["Nicobar","North Middle Andaman","South Andaman"];
				var Chandigarh = ["Chandigarh"];
				var DadraHaveli = ["Dadra Nagar Haveli"];
				var DamanDiu = ["Daman","Diu"];
				var Delhi = ["Central Delhi","East Delhi","New Delhi","North Delhi","North East Delhi","North West Delhi","Shahdara","South Delhi","South East Delhi","South West Delhi","West Delhi"];
				var Lakshadweep = ["Lakshadweep"];
				var Puducherry = ["Karaikal","Mahe","Puducherry","Yanam"];

				// var StateSelected='Tamil Nadu';

				// $("#prop_state").change(function(){
				  var StateSelected = $("#prop_state").val();
				  $("#state_hidden").val(StateSelected);  
				  var optionsList;
				  var htmlString = "";

				  switch (StateSelected) {
				    case "Andra Pradesh":
				        optionsList = AndraPradesh;
				        break;
				    case "Arunachal Pradesh":
				        optionsList = ArunachalPradesh;
				        break;
				    case "Assam":
				        optionsList = Assam;
				        break;
				    case "Bihar":
				        optionsList = Bihar;
				        break;
				    case "Chhattisgarh":
				        optionsList = Chhattisgarh;
				        break;
				    case "Goa":
				        optionsList = Goa;
				        break;
				    case  "Gujarat":
				        optionsList = Gujarat;
				        break;
				    case "Haryana":
				        optionsList = Haryana;
				        break;
				    case "Himachal Pradesh":
				        optionsList = HimachalPradesh;
				        break;
				    case "Jammu and Kashmir":
				        optionsList = JammuKashmir;
				        break;
				    case "Jharkhand":
				        optionsList = Jharkhand;
				        break;
				    case  "Karnataka":
				        optionsList = Karnataka;
				        break;
				    case "Kerala":
				        optionsList = Kerala;
				        break;
				    case  "Madya Pradesh":
				        optionsList = MadhyaPradesh;
				        break;
				    case "Maharashtra":
				        optionsList = Maharashtra;
				        break;
				    case  "Manipur":
				        optionsList = Manipur;
				        break;
				    case "Meghalaya":
				        optionsList = Meghalaya ;
				        break;
				    case  "Mizoram":
				        optionsList = Mizoram;
				        break;
				    case "Nagaland":
				        optionsList = Nagaland;
				        break;
				    case  "Orissa":
				        optionsList = Orissa;
				        break;
				    case "Punjab":
				        optionsList = Punjab;
				        break;
				    case  "Rajasthan":
				        optionsList = Rajasthan;
				        break;
				    case "Sikkim":
				        optionsList = Sikkim;
				        break;
				    case  "Tamil Nadu":
				        optionsList = TamilNadu;
				        break;
				    case  "Telangana":
				        optionsList = Telangana;
				        break;
				    case "Tripura":
				        optionsList = Tripura ;
				        break;
				    case  "Uttaranchal":
				        optionsList = Uttaranchal;
				        break;
				    case  "Uttar Pradesh":
				        optionsList = UttarPradesh;
				        break;
				    case "West Bengal":
				        optionsList = WestBengal;
				        break;
				    case  "Andaman and Nicobar Islands":
				        optionsList = AndamanNicobar;
				        break;
				    case "Chandigarh":
				        optionsList = Chandigarh;
				        break;
				    case  "Dadar and Nagar Haveli":
				        optionsList = DadraHaveli;
				        break;
				    case "Daman and Diu":
				        optionsList = DamanDiu;
				        break;
				    case  "Delhi":
				        optionsList = Delhi;
				        break;
				    case "Lakshadeep":
				        optionsList = Lakshadeep ;
				        break;
				    case  "Pondicherry":
				        optionsList = Pondicherry;
				        break;
				}

				  for(var i = 0; i < optionsList.length; i++){
				    htmlString = htmlString+"<option value='"+ optionsList[i] +"'>"+ optionsList[i] +"</option>";
				  }
				  $("#prop_city").html(htmlString);
			}
			// city_change()
			// function city_change(){

			// 	var city_selected = $("#prop_city").val();

			// 	  $("#city_hidden").val(city_selected);    
			// }
		</script>
	</body>
	<!--end::Body-->
</html>