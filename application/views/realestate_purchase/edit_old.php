<?php $this->load->view("common.php") ?>
<?php $this->load->helper('directory'); ?>
<style>
	.dataTables_scroll
    {
        position: relative;
        overflow: auto;
        max-height: 430px;/*the maximum height you want to achieve*/
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
									<h1 class="d-flex align-items-center text-dark fw-bold my-1 fs-3">Edit Purchase
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
											<form method="POST" autocomplete="off" action="<?php echo base_url(); ?>Realestate_purchase/property_edit_save" enctype="multipart/form-data" onsubmit="return property_validation()">
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
																<?php 
																   $date=date('d-m-Y',strtotime($edit_details->date));
																 ?>
																<input class="form-control form-control-solid ps-12 flatpickr-input" name="prop_date" placeholder="Date" id="kt_daterangepicker_lot_entry_add_date" value="<?php echo $date; ?>" type="text">

															</div>
															<div class="fv-plugins-message-container invalid-feedback" id="prop_date_err"></div>
														</div>
													</div>
												</div>
												<div class="col-lg-4">
													<div class="row">
														<div class="col-lg-2 mt-4">
															<span>
															<i class="fa fa-user fs-3" aria-hidden="true" title="Party Name"></i>
															</span>
														</div>
														<div class="col-lg-10">
															<label class="col-form-label fw-bold fs-6"><?php if(isset($party_details->NAME)){
																echo $party_details->NAME; }
																?>
															</label>
														</div>
													</div>
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
																			<input type="text" name="land_name" id="land_name" class="form-control form-control-lg form-control-solid" placeholder="Land Name" value="<?php echo $edit_details->land_name ; ?>">
																			<input type="hidden" name="prop_id_hidden" id="prop_id_hidden" value="<?php echo $edit_details->property_id ; ?>">
																			
																			<div class="fv-plugins-message-container invalid-feedback" id="land_name_err"></div>
																		</div>
																<!-- </div> -->
																
															</div>
															<div class="row">
																	<div class="col-lg-4 fv-row" >
																	<label class=" required col-form-label fw-semibold fs-6">Land Lord</label>
																	</div>
																	<div class="col-lg-8 fv-row fv-plugins-icon-container">

																	<input type="text" name="land_lord" id="land_lord" class="form-control form-control-lg form-control-solid" placeholder="Land Lord Name" value="<?php echo $edit_details->land_lord ; ?>">
																	<div class="fv-plugins-message-container invalid-feedback" id="land_lord_err"></div>
																</div>
															</div>
															<div class="row">
																<div class="col-lg-4 fv-row" >
																<label class="required col-form-label fw-semibold fs-6">Ref.Name</label>
															     </div>
																<div class="col-lg-8 fv-row fv-plugins-icon-container">
																	<input type="text" name="prop_ref_name" id="prop_ref_name" class="form-control form-control-lg form-control-solid" placeholder="Reference Name" value="<?php echo $edit_details->ref_name ; ?>">
																	<div class="fv-plugins-message-container invalid-feedback" id="prop_ref_name_err"></div>
																</div>
															</div>
														</div>
														<!-- <div class="col-lg-1">
														</div> -->
														<div class="col-lg-4">
														  <div class="row">
															<div class="col-lg-12">
																<div class="row">
																	<div class="col-lg-2 mt-4">
																		<span>
																			<i class="fa-solid fa-location-dot fs-3" aria-hidden="true" title="Address"></i>
																		</span>
																	</div>
																	<div class="col-lg-9">
																		<label class="col-form-label fw-bold fs-6"><?php if(isset($party_details->NAME)){
																			$address=$party_details->ADDRESS1.', '.$party_details->ADDRESS2.', '.$party_details->CITY;
																			echo $address; }
																			?>
																		</label>
																	</div>
																</div>
															</div>
															<div class="col-lg-12">

																<div class="row">
																	<div class="col-lg-6">
																		<div class="row">
																			<div class="col-lg-4 mt-4">
																				<span>
																					<i class="fas fa-mobile-android-alt fs-3" aria-hidden="true" title="Mobile"></i>
																				</span>
																			</div>
																			<div class="col-lg-8">	
																				<label class="col-form-label fw-bold fs-6">
																					<?php if(isset($party_details->NAME)){echo $party_details->PHONE; }?>
																				</label>
																			</div>
																		</div>
																	</div>	
																	<div class="col-lg-6">
																		<div class="row">
																			<div class="col-lg-3">
																				<label class="col-form-label fw-bold fs-6">Rating</label>
																			</div>
																			<div class="col-lg-9">
																				<label class="col-form-label fw-bold fs-5">
																					<span>
																						<i class="fa-solid fa-star fs-4" style="
																							<?php 
																								if($party_details->RATING==1) echo 'color:#50cd89;';
																								if($party_details->RATING==2) echo 'color:#ffc700;';
																								if($party_details->RATING ==3) echo 'color:#FF0000;';
																								if($party_details->RATING=='') echo 'color:#d2d4dc;';
																							?>">
																						</i>
																					</span>&nbsp;-&nbsp;
																					<?php 
																						if($party_details->RATING==1) echo 'Good';
																						if($party_details->RATING==2) echo 'Average';
																						if($party_details->RATING ==3) echo 'Bad';
																						if($party_details->RATING=='') echo '';
																					?>
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
															<div class="col-lg-4 fv-row">
																<div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url(assets/images/Party.jpg)">
																	<?php
																	if($party_details->PHOTO!='')
																         {
																         $div='<img src="data:image/jpg;charset=utf8;base64,'.base64_encode($party_details->PHOTO).'"  height="110px" width="125px">';
																         }
																         else
																         {
																          $div='<img src="'.base_url().'assets/images/party.jpg" height="125px" width="125px" >';
																         }
																         echo $div;
																	?>
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
																	<input type="text" name="prop_reg" id="prop_reg" class="form-control form-control-lg form-control-solid" placeholder="Register Office" value="<?php echo $edit_details->register_office; ?>">
																	<div class="fv-plugins-message-container invalid-feedback" id="prop_reg_err"></div>
																</div>
														 	</div>
														 </div>
														
														
														<div class="col-lg-2">
															<label class="required col-form-label fw-semibold fs-6">VAO Group</label>
														</div>
														<div class="col-lg-5 fv-row fv-plugins-icon-container">
															<select class="form-select form-select-solid" data-control="select2" data-hide-search="true" name="prop_vao_type" id="prop_vao_type" >

															<option value="">Select</option>
															<?php  foreach($vao_group as $vlist) {?>

																		<option value="<?php echo $vlist['VAO_NAME']?>"
																		 <?php if($edit_details->vao_group==$vlist['VAO_NAME']) 
																		 {
																		 echo "selected";
																		  } ?> >

																		  <?php echo $vlist['VAO_NAME'];?></option>

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
																		<input type="text" name="prop_servey_no" id="prop_servey_no" class="form-control form-control-lg form-control-solid" placeholder="Survey No" value="<?php echo $edit_details->servey_no; ?>">
																		<div class="fv-plugins-message-container invalid-feedback" id="prop_servey_no_err"></div>
																</div>
														 	</div>
														 </div>
														
														<label class="col-lg-2 col-form-label required fw-semibold fs-6">Property Type</label>
														<div class="col-lg-5">
															<select class="form-select form-select-solid" data-control="select2" data-hide-search="true" name="prop_type_prop" id="prop_type_prop" >
															<option value="">Select Type</option>
															<option value="Land" <?php echo $edit_details->property_type == "Land"? 'selected':''; ?>>Land</option>
															<option value="House" <?php echo $edit_details->property_type == "House"?  'selected':''; ?>>House</option>
															<option value="Commercial" <?php echo $edit_details->property_type == "Commercial"?'selected':''; ?>>Commercial</option>
															<option value="Industrial" <?php echo $edit_details->property_type == "Industrial"?'selected':''; ?>>Industrial</option>
															<option value="Agriculture" <?php echo $edit_details->property_type == "Agriculture"?'selected':''; ?>>Agriculture</option>
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
																		<input type="text" name="prop_pdoc" id="prop_pdoc" class="form-control form-control-lg form-control-solid" placeholder="Parental Documents No" value="<?php echo $edit_details->partental_dno; ?>">
																		<div class="fv-plugins-message-container invalid-feedback" id="prop_pdoc_err"></div>
																</div>
														 	</div>
														 </div>
														<div class="col-lg-2">
															<label class="required col-form-label fw-semibold fs-6">Current Doc</label>
														</div>
														<div class="col-lg-5 fv-row fv-plugins-icon-container">
															<input type="text" name="prop_curr_doc_no" id="prop_curr_doc_no" class="form-control form-control-lg form-control-solid" placeholder="Current Doucument No" value="<?php echo $edit_details->document_curno ; ?>">
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
																	<input type="text" name="prop_patta_no" id="prop_patta_no" class="form-control form-control-lg form-control-solid" placeholder="Patta No" value="<?php echo $edit_details->patta_no ; ?>">
																<div class="fv-plugins-message-container invalid-feedback" id="prop_patta_no_err"></div>
																</div>
														 	</div>
														 </div>
														
														<div class="col-lg-2">
															<label class="required col-form-label fw-semibold fs-6">Street</label>
														</div>
														<div class="col-lg-5 fv-row fv-plugins-icon-container">
															<input type="text" name="prop_street" id="prop_street" class="form-control form-control-lg form-control-solid" placeholder="Street" value="<?php echo $edit_details->street ; ?>">
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
																	<input type="text" name="prop_area"  id="prop_area" class="form-control form-control-lg form-control-solid" placeholder="Area" value="<?php echo $edit_details->area ; ?>">
																	<div class="fv-plugins-message-container invalid-feedback" id="prop_area_err" ></div>
																</div>
														 	</div>
														 </div>

														<div class="col-lg-2">
															<label class="required col-form-label fw-semibold fs-6">City</label>
														</div>
														<div class="col-lg-5 fv-row fv-plugins-icon-container">
															<input type="text" name="prop_city" id="prop_city" class="form-control form-control-lg form-control-solid" placeholder="City" value="<?php echo $edit_details->city ; ?>">
															<div class="fv-plugins-message-container invalid-feedback"id="prop_city_err" ></div>
														</div>
													</div>
													<div class="row">
														<div class="col-lg-5">
														 	<div class="row">
														 		<div class="col-lg-4">
																	<label class="required col-form-label fw-semibold fs-6">State</label>
																</div> 
																<div class="col-lg-8 fv-row fv-plugins-icon-container">
																	<input type="text" name="prop_state" id="prop_state" class="form-control form-control-lg form-control-solid" placeholder="State" value="<?php echo $edit_details->state ; ?>">
																	<div class="fv-plugins-message-container invalid-feedback"id="prop_state_err" ></div>
																</div>
														 	</div>
														 </div>
														<div class="col-lg-2">
															<label class="required col-form-label fw-semibold fs-6">Pincode</label>
														</div>
														<div class="col-lg-5 fv-row fv-plugins-icon-container">
															<input type="text" name="pincode" id="pincode" class="form-control form-control-lg form-control-solid" placeholder="Pincode" value="<?php echo $edit_details->pincode; ?>">
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
																		<input type="text" name="prop_lati" id="prop_lati" class="form-control form-control-lg form-control-solid" placeholder="Latitude" value="<?php echo $edit_details->lattitude ; ?>">
																		<div class="fv-plugins-message-container invalid-feedback"id="prop_lati_err" ></div>
																</div>
														 	</div>
														 </div>
														
														<div class="col-lg-2">
															<label class="required col-form-label fw-semibold fs-6">Longtitude</label>
														</div>
														<div class="col-lg-5 fv-row fv-plugins-icon-container">
															<input type="text" name="prop_longi" id="prop_longi" class="form-control form-control-lg form-control-solid" placeholder="Longtitude" value="<?php echo $edit_details->longtitude; ?>">
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
																		<input type="text" name="prop_ppa_no" id="prop_ppa_no" class="form-control form-control-lg form-control-solid" placeholder="No Count" value="<?php echo $edit_details->ploat_no; ?>" title="Enter Your Number of Count" onkeyup="pay_to_property_calc()" oninput="this.value = this.value.replace(/[^/0-9.]/g, '').replace(/(\..*)\./g, '$1');">
																		<div class="fv-plugins-message-container invalid-feedback"id="prop_ppa_no_err" ></div>
																</div>
																<div class="col-lg-4 fv-row fv-plugins-icon-container">
																			<select class="form-select form-select-solid" data-control="select2" data-hide-search="true" title="Select Your Plot Area Type" name="prop_ppa_type" id="prop_ppa_type"  onkeyup="pay_to_property_calc()">
																				<option value="<?php echo $edit_details->ploat_type ; ?>">Type</option>
																				<option value="Cent"<?php echo $edit_details->ploat_type == "Cent"?'selected':''; ?>>Cent</option>
																				<option value="Acre"<?php echo $edit_details->ploat_type == "Acre"?'selected':''; ?>>Acre</option>
																				<option value="Sq.ft"<?php echo $edit_details->ploat_type == "Sq.ft"?'selected':''; ?>>Sq.ft</option>
																			</select>
																		<div class="fv-plugins-message-container invalid-feedback" id="prop_ppa_type_err" ></div>
																</div>
														 	</div>
														 </div>

														<label class="col-lg-2 required col-form-label fs-6	 fw-semibold">Price Per Plot Area</label>
														<div class="col-lg-5 fv-row fv-plugins-icon-container">
															<input type="text" name="prop_price_ppa" id="prop_price_ppa" class="form-control form-control-lg form-control-solid" placeholder="Price" value="<?php echo $edit_details->price_per_ploat ; ?>" title="Enter Your Per Plot Area Amount"  onkeyup="pay_to_property_calc(0)" oninput="this.value = this.value.replace(/[^/0-9.]/g, '').replace(/(\..*)\./g, '$1');">
															<div class="fv-plugins-message-container invalid-feedback"id="prop_price_ppa_err"></div>
															<input type="hidden" name="paid_amount_hidden" id="paid_amount_hidden" value="<?php echo $edit_details->paid_amount ; ?>">
															<input type="hidden" name="balance_amount_hidden" id="balance_amount_hidden" value="<?php echo $edit_details->balance_amount ; ?>">
															<input type="hidden" name="prop_amt_hidden" id="prop_amt_hidden" value="<?php echo $edit_details->pro_amount ; ?>">
															<input type="hidden" name="total_prop_amt_hidden" id="total_prop_amt_hidden" value="<?php echo $edit_details->total_property_amount; ?>">
														</div>
														
														
													</div>
													<div class="row">
														<div class="col-lg-5">
														 	<div class="row">
														 		<div class="col-lg-5">
																	<label class="col-form-label fw-semibold fs-6">Amount</label>
																</div> 
																<?php 

																$plot = $edit_details->ploat_no;
																$ppa  = $edit_details->price_per_ploat;

																 $t_amount = $ppa * $plot ;


																 ?>
																<div class="col-lg-7 fv-row fv-plugins-icon-container">
																	<label class="col-form-label fw-bold fs-6" name="lbl_total_amt" id="lbl_total_amt" onkeyup ="pay_to_property_calc()" ><?php echo $t_amount; ?></label>
																</div>
															 </div>
														 </div>
														
														<div class="col-lg-2">
															<label class="required col-form-label fw-semibold fs-6">Amenities</label>
														</div>
														<div class="col-lg-5 fv-row fv-plugins-icon-container">
															<select class="form-select form-select-solid fw-semibold" data-control="select2" data-close-on-select="true" data-allow-clear="true" multiple="multiple" title="Select Your Plot Area Type" name="prop_amenities_type[]" id="prop_amenities_type" data-placeholder="select">
															

															<label class="col-form-label fw-bold fs-6"><?php $values= json_decode($edit_details->amenities); foreach ($values as  $val) {?> <?php } ?> 

															<option value="All" <?php echo $val == "All"? 'selected':''; ?>>All</option>
															<option value="Near by School"  <?php echo $val == "Near by School"? 'selected':''; ?>>Near by School</option>
															<option value="Near by College" <?php echo $val == "Near by College"? 'selected':''; ?>>Near by College</option>
															<option value="Near by Hospital" <?php echo $val == "Near by Hospital"? 'selected':''; ?>>Near by Hospital</option>
														</select>
														<div class="fv-plugins-message-container invalid-feedback" id="prop_amenities_type_err" ></div>
														</div>
														
													</div>
													<div class="row">
															
														 <?php foreach($agents_details as $i=> $aview){ ?> 

														    <input type="hidden" name="agent_name_hid[]" id="agent_name_hid<?php echo $i;?>" >

														    <input type="hidden" name="agent_amt_hid[]"  id="agent_amt_hid<?php echo $i+1;?>" value="<?php echo $aview['amount']; ?>" onchange="pay_to_property_calc(<?php echo $i;?>)">
														    
														    <input type="hidden" name="agents_id_hidden[]" id="agents_id_hidden" value="<?php echo $aview['id']; ?>">
														    
														    <?php } ?>
														<div class="col-lg-2">
															<label class="col-form-label fw-semibold fs-6">Description</label>
														</div>
														<div class="col-lg-10 fv-row fv-plugins-icon-container">
															<textarea class="form-control form-control-solid" rows="2" placeholder="Description" name="prop_des" id="prop_des" value="<?php echo $edit_details->description ; ?>" /><?php echo $edit_details->description ; ?></textarea>
															<!-- <div class="fv-plugins-message-container invalid-feedback" id="prop_des_err" ></div> -->
														</div>
														
													</div>
													<div class="row">
														<div class="col-lg-5">
														 	<div class="row">
														 		<div class="col-lg-5">
																	<label class="col-form-label fw-semibold fs-6 required">Actual Buying Rate</label>
																</div> 
																<div class="col-lg-7 fv-row fv-plugins-icon-container">
																<input type="text" name="actual_buying_rate" id="actual_buying_rate" class="form-control form-control-lg form-control-solid" placeholder="Actual Buying Rate" value="<?php echo $edit_details->actual_buying_rate?$edit_details->actual_buying_rate:0; ?>" oninput="this.value = this.value.replace(/[^/0-9.]/g, '').replace(/(\..*)\./g, '$1');">
															<div class="fv-plugins-message-container invalid-feedback"id="actual_buying_rate_err" ></div>
																</div>
															 </div>
														 </div>
														
														<div class="col-lg-2">
															<label class="required col-form-label fw-semibold fs-6">By Buying Rate</label>
														</div>
														<div class="col-lg-5 fv-row fv-plugins-icon-container">
														<input type="text" name="by_buying_rate" id="by_buying_rate" class="form-control form-control-lg form-control-solid" placeholder="By Buying Rate" value="<?php echo $edit_details->by_buying_rate?$edit_details->by_buying_rate:0; ?>" oninput="this.value = this.value.replace(/[^/0-9.]/g, '').replace(/(\..*)\./g, '$1');">
															<div class="fv-plugins-message-container invalid-feedback"id="by_buying_rate_err" ></div>
														</div>														
													</div>
													<div class="row">
														<div class="col-lg-5">
														 	<div class="row">
														 		<div class="col-lg-5">
																	<label class="col-form-label fw-semibold fs-6 required">Stamp Paper Charges</label>
																</div> 
																<div class="col-lg-7 fv-row fv-plugins-icon-container">
																<input type="text" name="stamp_paper_charges" id="stamp_paper_charges" class="form-control form-control-lg form-control-solid" placeholder="Stamp Paper Charges" value="<?php echo $edit_details->stamp_paper_charges?$edit_details->stamp_paper_charges:0; ?>" oninput="this.value = this.value.replace(/[^/0-9.]/g, '').replace(/(\..*)\./g, '$1');">
															<div class="fv-plugins-message-container invalid-feedback"id="stamp_paper_charges_err" ></div>
																</div>
															 </div>
														 </div>
														
														<div class="col-lg-2">
															<label class="required col-form-label fw-semibold fs-6">Duty Charges</label>
														</div>
														<div class="col-lg-5 fv-row fv-plugins-icon-container">
														<input type="text" name="duty_charges" id="duty_charges" class="form-control form-control-lg form-control-solid" placeholder="Duty Charges" value="<?php echo $edit_details->duty_charges?$edit_details->duty_charges:0; ?>" oninput="this.value = this.value.replace(/[^/0-9.]/g, '').replace(/(\..*)\./g, '$1');">
															<div class="fv-plugins-message-container invalid-feedback"id="duty_charges_err" ></div>
														</div>														
													</div>
													<div class="row">
														<div class="col-lg-5">
														 	<div class="row">
														 		<div class="col-lg-5">
																	<label class="col-form-label fw-semibold fs-6 required">Vendor Charges</label>
																</div> 
																<div class="col-lg-7 fv-row fv-plugins-icon-container">
																<input type="text" name="vendor_charges" id="vendor_charges" class="form-control form-control-lg form-control-solid" placeholder="Vendor Charges" value="<?php echo $edit_details->vendor_charges?$edit_details->vendor_charges:0; ?>" oninput="this.value = this.value.replace(/[^/0-9.]/g, '').replace(/(\..*)\./g, '$1');">
															<div class="fv-plugins-message-container invalid-feedback"id="vendor_charges_err" ></div>
																</div>
															 </div>
														 </div>
														
														<div class="col-lg-2">
															<label class="required col-form-label fw-semibold fs-6">Actual Process fees</label>
														</div>
														<div class="col-lg-5 fv-row fv-plugins-icon-container">
														<input type="text" name="actual_process_fees" id="actual_process_fees" class="form-control form-control-lg form-control-solid" placeholder="Actual Process fees" value="<?php echo $edit_details->actual_process_fees?$edit_details->actual_process_fees:0; ?>" oninput="this.value = this.value.replace(/[^/0-9.]/g, '').replace(/(\..*)\./g, '$1');">
															<div class="fv-plugins-message-container invalid-feedback"id="actual_process_fees_err" ></div>
														</div>														
													</div>
													
													<div class="row mt-4 text-start">
														<label class="col-lg-2 col-form-label fw-semibold fs-6 ">Agent Counts</label>
												    	<label class="col-lg-2 col-form-label fw-bold fs-3 " name="agent_count" id=""><?php echo $edit_details->agent_name1 ; ?></label>
												    	
                            <label class="col-lg-2 col-form-label fw-semibold fs-6">Agent Amounts</label>
													    <label class="col-lg-2 col-form-label fw-bold fs-3 " name="agent_tot_amt" id="agent_tot_amt" ><?php echo $edit_details->agent_amt1 ; ?></label>
													    <input type="hidden" name="agent_tot_amt_hidden" id="agent_tot_amt_hidden" onkeyup="pay_to_property_calc()">
													    <input type="hidden" name="agent_count_hidden" id="agent_count_hidden" value="">

													    <div class="col-lg-3">
													    	<div class="d-flex justify-content-end ">
															<button type="button" class="btn btn-primary" data-bs-toggle="modal"data-bs-target="#kt_modal_agent">Edit Agents</button>
														</div>
													    </div>
													    
														</div>
												</div>
										<div class="row mt-4">
													<div class="col-lg-6 mt-4">
														<label class="col-form-label required fw-semibold fs-6">Base Document</label>
													    	<div class="container my-4">
																<input type="file" id="base_mul_img" name="base_mul_img[]" value="<?php echo $edit_details->document_images; ?>" multiple>
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

												<label class="col-form-label fw-bold fs-5">Purchase Payment Details</label>
												
												<!-- <?php foreach ($payment_details as $val) {
													
													$pay_detail = $val['type_of_payment'];
													print_r($pay_detail);
													echo json_encode($pay_detail[0]);

												 }?> -->
												 <!-- <?php if(isset($cash_detail->amount)){

												if($cash_detail->amount>0){

										         $cash_chk = 'checked';
												}
												else{

													$cash_amt='0';
													$cash_chk = '0';
												} }?> -->
												
												
												<div class="col-lg-2">
													<div class="d-flex align-items-center ">
														<label class="form-check form-check-inline form-check-solid me-5 is-invalid">
															<input class=" form-check-input" name="cash_chk" value="Cash" type="checkbox" <?php echo $cash_detail ? 'checked': 'disabled'; ?> id="cash_create_radio" onclick="cash_cr_radio()">
														</label>
														<label class=" col-form-label fw-semibold fs-6">Cash</label>
													</div>
												</div>
												<div class="col-lg-2">
													<div class="d-flex align-items-center ">
														<label class="form-check form-check-inline form-check-solid me-5 is-invalid">
															<input class=" form-check-input" name="bank_chk" type="checkbox" value="Cheque" <?php echo $bank_detail ? 'checked': 'disabled'; ?>  id="bank_create_radio" onclick="bank_cr_radio()">
														</label>
														<label class=" col-form-label fw-semibold fs-6">Bank</label>
													</div>
												</div>
												<div class="col-lg-2">
													<div class="d-flex align-items-center ">
														<label class="form-check form-check-inline form-check-solid me-5 is-invalid">
															<input <?php echo $upi_detail ? 'checked': 'disabled'; ?>   class="form-check-input" name="upi_chk" type="checkbox" value="UPI"  id="upi_create_radio" onclick="upi_cr_radio()">
														</label>
														<label class=" col-form-label fw-semibold fs-6">UPI</label>
													</div>
												</div>
											</div>
											<?php if(isset($cash_detail->amount)){?>

												
											<?php  } ?>
											<div class="row">
												<label class="col-lg-1 col-form-label required fw-semibold fs-6" id="cash_cr_lab" style="display: none;">Cash</label>
												<div class="col-lg-2" id="cash_cr_tbox" style="display: none;">
													<input  type="text" name="cashamount"  id="cashamount" value="<?php echo  $cash_detail? $cash_detail->amount : 0 ; ?>" class="form-control form-control-lg form-control-solid" placeholder="Amount" oninput="this.value = this.value.replace(/[^/0-9.]/g, '').replace(/(\..*)\./g, '$1');" onkeyup="pay_to_property_calc()" >
													<div class="fv-plugins-message-container invalid-feedback"></div>
												</div>
												<label class="col-lg-1 col-form-label  fw-semibold fs-6" id="detail_ca_cr_lab" style="display: none;">Details</label>
												<div class="col-lg-2 fv-row fv-plugins-icon-container" id="detail_ca_cr_tbox" style="display: none;">
													<textarea class="form-control form-control-solid" rows="1" placeholder="Details" name="cashdetail" id="cashdetail"><?php echo $cash_detail?$cash_detail->remarks :''; ?></textarea>
												</div>
											</div>
											<?php if(isset($bank_detail->amount)){

												
												}?>
											<div class="row">
												<label class="col-lg-1 col-form-label required fw-semibold fs-6" id="cash_bk_cr_lab" style="display: none;">Bank</label>
												<div class="col-lg-2" id="cash_bk_cr_tbox" style="display: none;">
													<input type="text" name="chequeamount" id="chequeamount" value="<?php echo  $bank_detail? $bank_detail->amount : 0 ; ?>" class="form-control form-control-lg form-control-solid" placeholder="Amount" oninput="this.value = this.value.replace(/[^/0-9.]/g, '').replace(/(\..*)\./g, '$1');" onkeyup="pay_to_property_calc()">
													<div class="fv-plugins-message-container invalid-feedback"></div>
												</div>
												<label class="col-lg-1 col-form-label required fw-semibold fs-6" id="bank_cr_lab" style="display: none;">Name</label>
												<div class="col-lg-2" id="bank_cr_sel" style="display: none;">
													<select class="form-select form-select-solid" data-control="select2" data-hide-search="true" name="chequebank" id="chequebank" >
														<option value="">Select Bank</option>
														<?php
															$bnk_det=$this->db->query("select * from BANKS where ACTIVE='Y'")->result_array();
															foreach ($bnk_det as $blist) {

																$bank_name  = $bank_detail->party_bank;
															?>
															<option value="<?php echo $blist['BANKNAME']?>"
																		 <?php if($bank_name==$blist['BANKNAME']) 
																		 {
																		 echo "selected";
																		  } ?> >

																		  <?php echo $blist['BANKNAME'];?></option>
															<?php } ?>
													</select>
												</div>
												<label class="col-lg-1 col-form-label required fw-semibold fs-6" id="cheque_cr_lab" style="display: none;">Cheque</label>
												<div class="col-lg-2" id="cheque_cr_tbox" style="display: none;">
													<input type="text" name="chequerefno" class="form-control form-control-lg form-control-solid" placeholder="Cheque No" value="<?php echo $bank_detail?$bank_detail->cheque_ref_no :''; ?>" >
													<div class="fv-plugins-message-container invalid-feedback"></div>
												</div>
												<label class="col-lg-1 col-form-label  fw-semibold fs-6" id="detail_bk_cr_lab" style="display: none;">Details</label>
												<div class="col-lg-2 fv-row fv-plugins-icon-container" id="detail_bk_cr_tbox" style="display: none;">
													<textarea class="form-control form-control-solid" rows="1" placeholder="Details" name="chequedetail" id="chequedetail"><?php echo $bank_detail?$bank_detail->remarks :''; ?></textarea>
												</div>
											</div>
											
											<?php if(isset($upi_detail->amount)){  } ?>

											<div class="row">
												<label class="col-lg-1 col-form-label required fw-semibold fs-6" id="cash_upi_cr_lab" style="display: none;">UPI</label>
												<div class="col-lg-2" id="cash_upi_cr_tbox" style="display: none;">
													<input type="text" name="upiamount" id="upiamount" value="<?php echo  $upi_detail? $upi_detail->amount : 0 ; ?>" class="form-control form-control-lg form-control-solid" onkeyup="pay_to_property_calc()" placeholder="Amount" oninput="this.value = this.value.replace(/[^/0-9.]/g, '').replace(/(\..*)\./g, '$1');">
													<div class="fv-plugins-message-container invalid-feedback"></div>
												</div>
												<label class="col-lg-1 col-form-label required fw-semibold fs-6" id="trans_cr_lab" style="display: none;">Trans.No</label>
												<div class="col-lg-2" id="trans_cr_tbox" style="display: none;">
													<input type="text" name="upirefno" value="<?php echo $upi_detail?$upi_detail->cheque_ref_no :0; ?>" class="form-control form-control-lg form-control-solid" placeholder="Transaction No">
													<div class="fv-plugins-message-container invalid-feedback"></div>
												</div>
												<label class="col-lg-1 col-form-label  fw-semibold fs-6" id="detail_upi_cr_lab" style="display: none;">Details</label>
												<div class="col-lg-2 fv-row fv-plugins-icon-container" id="detail_upi_cr_tbox" style="display: none;">
													<textarea class="form-control form-control-solid" rows="1" placeholder="Details" name="upidetail" id="upidetail"><?php echo $upi_detail?$upi_detail->remarks :''; ?></textarea>
												</div>
											</div>
											
											
											<div class="row mt-4">
												<div class="col-lg-4 text-center">
													<label class="col-form-label fw-bold fs-4">Net Amount &emsp;</label>
													<label class="col-form-label fw-bold fs-3" id="lbl_total_amt_lab_2"><?php echo $edit_details->total_property_amount; ?></label>
												</div>
												<div class="col-lg-4 text-center">
													<label class="col-form-label fw-bold fs-4">Paid Amount &emsp;</label>
													<label class="col-form-label fw-bold fs-3" id="paid_amount_lab"><?php echo $edit_details->paid_amount; ?></label>
												</div>
												<div class="col-lg-4 text-center">
													<label class="col-form-label fw-bold fs-4">Balance Amount &emsp;</label>
													<label class="col-form-label fw-bold fs-3" id="lbl_bal_amt"><?php echo $edit_details->balance_amount; ?></label>
												</div>
											</div>
											<div class="d-flex justify-content-end">
												<a type="reset" class="btn btn-secondary me-3"  href="<?php echo base_url(); ?>Realestate_purchase">Cancel</a>
												<button type="submit" class="btn btn-primary" id="save_changes_add_product">Save Changes</button>
											</div>
										</div>
										 <script>

										 	var baseurl = '<?php echo base_url(); ?>';


										 			

											 	function pay_to_property_calc(id){

											 		// var tot_amt= 0;
										 			// var tot_paid_amt= 0;
										 			// var tot_bal_amt= 0;

													
									                var price=parseFloat($('#prop_price_ppa').val());

													var count=parseFloat($('#prop_ppa_no').val());

													var ag_toatl_amount =parseFloat($('#agent_tot_amt_hidden').val());
													// alert(ag_toatl_amount);

													if(ag_toatl_amount=='') ag_toatl_amount=0;

													if(price=='') price=0;
													if(count=='') count=0;

													 var tot_amt = price * count;

													// alert(tot_amt);

													var total_price = tot_amt + ag_toatl_amount ;
													// alert(total_price);
													 if(ag_toatl_amount>0)
													    {
													        $('#lbl_total_amt_lab_2').html(total_price);
													        $('#total_prop_amt_hidden').val(total_price);

													    
													    }
													    else
													    {
													       
															$('#lbl_total_amt_lab_2').html(tot_amt);
													        $('#total_prop_amt_hidden').val(tot_amt);
															
													    }

													    $('#lbl_total_amt').html(tot_amt);
														$('#prop_amt_hidden').val(tot_amt);
													    // $('#lbl_total_amt_lab_2').html(total_price);

													var cash=parseFloat($('#cashamount').val());
													// alert (cash);

													var cheque=parseFloat($('#chequeamount').val());
													// alert(cheque);

													var upi=parseFloat($('#upiamount').val());

													// alert(upi);

													var rc_tot=parseFloat($('#lbl_total_amt_lab_2').html());

													if(cash=='') cash=0;
													if(cheque=='') cheque=0;
													if(upi=='') upi=0;
													
													 var tot_paid_amt= cash+cheque+upi;

													 // alert(tot_paid_amt);

													 var  tot_bal_amt= rc_tot - parseFloat(tot_paid_amt);


													

													if (id==0){
														    
													    $('#cashamount').val('0');
														$('#chequeamount').val('0');
														$('#upiamount').val('0');
														$('#paid_amount_hidden').val('0');
														$('#paid_amount_lab').html('0');
														$('#lbl_bal_amt').html(tot_bal_amt);
														$('#balance_amount_hidden').val(tot_bal_amt);

														  }
														  else{

														$('#paid_amount_hidden').val(tot_paid_amt);
														$('#paid_amount_lab').html(tot_paid_amt);
														$('#lbl_bal_amt').html(tot_bal_amt);
														$('#balance_amount_hidden').val(tot_bal_amt);

															
													}

													// var net=parseFloat($('#lbl_total_amt_lab_2').html());

														
													// 	if (tot_paid_amt >= tot_bal_amt){
															
													// 	    alert("Enter Amount is Exceed ");
													// 	    // $('#prop_spa_no').val('');
													// 	  }
													 



													 var name=$('#agent_names'+id).val();
													 var amt=parseFloat($('#agent_amount'+id).val());
											 		if(name=='') name=0;
											 		if(amt=='') amt=0;
											 		 // var name=$('#agent_names1').val();
											 		 // alert(amt);
													$('#agent_name_hid'+id).val(name);
													$('#agent_amt_hid'+id).val(amt);

													var agent_count_total = 0;
													var agent_tot_amount  = 0;
													var count=<?php echo count($agents_details) ?>;

													// alert(count)

													for(var i=1; i<=count; i++){

													 var agent_amount     = $('#agent_amount'+i).val();

													 // alert(agent_amount);

													  agent_tot_amount    += parseInt(agent_amount);

														}
													// alert(agent_tot_amount);
													// $('#agent_count').html(id);
													// $('#agent_count_hidden').val(id);
													$('#agent_tot_amt').html(agent_tot_amount);
													$('#agent_tot_amt_hidden').val(agent_tot_amount);
													}	
										</script> 
										</form>
										<!--start add agent popup -->
										<div class="modal fade" id="kt_modal_agent" tabindex="-1" aria-hidden="true">
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
														<h1 class="mb-3">Edit Agent</h1>	
													</div>
													<!--end::Heading-->
													<div class="row">
														<?php 

															 	$current_count = count($agents_details);

															 	$remain_count = 10 - $current_count;

															 	$height = $current_count * 30 ;
															 	 

															 	?>
														<table id="add_agent_table" class="hover-scroll h-<?php echo $height ;?>px px-5">
											                <thead> 
														        <tr class="fw-bold fs-6 text-gray-600 text-uppercase gs-0 text-center">
														        	<th class="min-w-25px ">S.No</th>
																	<th class="text-center">Agent Name</th>
																	<th class="text-center">Amount</th>
														        </tr>
														    </thead>
															 <tbody class="text-gray-600 fw-semibold">


															 	 <?php  foreach($agents_details as $a=> $aview){ ?> 
															 		
																    	<tr>
																    		<td><?php echo $a+1;?></td>
																    		<td>

																    		    <div class="d-flex justify-content-center fv-row fv-plugins-icon-container">

																    		    	<label  type="text" class="col-form-label fw-semibold fs-5"    name="agent_names[]" id="agent_names<?php echo $a+1;?>">    <?php echo $aview['agent_name']; ?>
																    		    	</label>

														                        <!--  <input type="text" class="col-lg-4 form-control form-control-lg form-control-solid"  placeholder="Enter Name"  name="agent_names[]" id="agent_names<?php echo $a+1;?>"  style="width:200px !important;" onkeyup="pay_to_property_calc(<?php echo $a+1; ?>)" value="<?php echo $aview['agent_name']; ?>" >	 -->
														                        </div>
																    		</td>
																    		<td>
																    			<div class="d-flex justify-content-center fv-row fv-plugins-icon-container">
																    			 <input type="text" class="col-lg-4 form-control form-control-lg form-control-solid"  name="agent_amount[]" id="agent_amount<?php echo $a+1;?>" style=" text-align: right; width: 200px !important;" placeholder="Amount" onkeyup="pay_to_property_calc(<?php echo $a+1; ?>)" oninput="this.value = this.value.replace(/[^/0-9.]/g, '').replace(/(\..*)\./g, '$1');"
																    			 value="<?php echo $aview['amount']; ?>">
																    			</div>
																    		</td>
																    	</tr>
																    	
																    	 <?php   } ?>


													    	 <!-- <?php for($i=$current_count;$i<=$remain_count;$i++) { 

															 


															 ?> 
														    	<tr>
														    		<td><?php echo $i+1;?></td>
														    		<td>
														    		    <div class="d-flex justify-content-center fv-row fv-plugins-icon-container">
												                         <input type="text" class="col-lg-4 form-control form-control-lg form-control-solid"  placeholder="Enter Name"  name="agent_names[]" id="agent_names<?php echo $i+1;?>"  style="width:200px !important;" onkeyup="pay_to_property_calc(<?php echo $i+1; ?>)" value="" >	
												                        </div>
														    		</td>
														    		<td>
														    			<div class="d-flex justify-content-center fv-row fv-plugins-icon-container">
														    			 <input type="text" class="col-lg-4 form-control form-control-lg form-control-solid"  name="agent_amount[]" id="agent_amount<?php echo $i+1;?>" style=" text-align: right; width: 200px !important;" placeholder="Amount" onkeyup="pay_to_property_calc(<?php echo $i+1; ?>)" oninput="this.value = this.value.replace(/[^/0-9.]/g, '').replace(/(\..*)\./g, '$1');"
														    			 value="0">
														    			</div>
														    		</td>
														    	</tr>
														    	
														    	 <?php   } ?> -->
														    	
															    </tbody>
															</table>
																		

																</div>
																<div class="row mt-4">
																	<div class="d-flex justify-content-end mt-4 ">
																		<p type="text" class="btn btn-secondary me-3" data-bs-dismiss="modal">Cancel</p>
																		<p type="text" data-bs-dismiss="modal"  class="btn btn-primary">Add</p>
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
		<input type="hidden" id="baseurl" value="<?php echo base_url();?>">
		<?php $this->load->view("script.php") ?>
		<script src="<?php echo base_url();?>assets/jquery.autocomplete.js"></script>

		
			
		<script src="<?php echo base_url();?>assets/multi/fileinput.js" type="text/javascript"></script>

		  <script>
			$("#add_agent_table").DataTable({
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
				  // ">" +

				  "<'table-responsive'tr>" +

				  "<'row'" +
				  // "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
				  // "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
				  ">"
				});
			$('#add_agent_table').wrap('<div class="dataTables_scroll" />');
		</script>

		<?php if(isset($edit_details)){ ?>
		<!-- base Multiple image script -->
		<!-- ******************************************************************************************************************** -->
<?php
$files = directory_map('./assets/images/realestate_purchase/base_document/'.$edit_details->document_images.'/', FALSE, TRUE); 
 if (is_dir('./assets/images/realestate_purchase/base_document/'.$edit_details->document_images.'/')) { ?>
		<script>
			$(document).ready(function () 
			{
				$('#base_mul_img').fileinput({
           uploadUrl: '#',
           //uploadUrl: 'http://localhost/plugins/test-upload',
           uploadUrl: '#',
           showUpload: false,
            showRemove: true,
					    	showDrag: false,
    						showClose: true,
    						overwriteInitial: false,
    						initialPreviewDelete: true,
           //uploadUrl: 'http://localhost/plugins/test-upload',
				 		initialPreview: [
													 		<?php
																	 $files = directory_map('./assets/images/realestate_purchase/base_document/'.$edit_details->document_images.'/', FALSE, TRUE); 
																	 if (is_dir('./assets/images/realestate_purchase/base_document/'.$edit_details->document_images.'/')) {
																		foreach($files as $file){
																			if(is_string($file)){ ?>										
																				'<?php echo base_url();?>/assets/images/realestate_purchase/base_document/<?php echo $edit_details->document_images; ?>/<?php echo $file;?>',
															<?php } } } ?>				       
					    							],
						initialPreviewConfig: [

					    <?php foreach($files as $file){
																			if(is_string($file)){ ?>			

           			 {caption: "<?php echo $file; ?>", },

           			<?php }} ?>
		        ],
		          
		        layoutTemplates: {
        actionDrag: '',
    },
           initialPreviewAsData: true

          });
          });
		</script>
	<?php }else{ ?>
		<script>
			$(document).ready(function () 
			{
				$('#base_mul_img').fileinput({
           uploadUrl: '#',
           //uploadUrl: 'http://localhost/plugins/test-upload',
           initialPreviewAsData: true
          });
          });
		</script>
	<?php } ?>
		<?php  $files = directory_map('./assets/images/realestate_purchase/ec/'.$edit_details->document_images.'/', FALSE, TRUE); 
						if (is_dir('./assets/images/realestate_purchase/ec/'.$edit_details->document_images.'/')) { ?>
		<!-- ec Multiple image script -->
		<script>
			$(document).ready(function () 
			{
				$('#ec_mul_img').fileinput({
           uploadUrl: '#',
           showUpload: false,
            showRemove: true,
					    	showDrag: false,
    						showClose: true,
    						overwriteInitial: false,
    						initialPreviewDelete: true,
           //uploadUrl: 'http://localhost/plugins/test-upload',
				 		initialPreview: [
													 		<?php
																	 $files = directory_map('./assets/images/realestate_purchase/ec/'.$edit_details->document_images.'/', FALSE, TRUE); 
																	 if (is_dir('./assets/images/realestate_purchase/ec/'.$edit_details->document_images.'/')) {
																		foreach($files as $file){
																			if(is_string($file)){ ?>										
																				'<?php echo base_url();?>/assets/images/realestate_purchase/ec/<?php echo $edit_details->document_images; ?>/<?php echo $file;?>',
															<?php } } } ?>				       
					    							],
						initialPreviewConfig: [

					    <?php foreach($files as $file){
																			if(is_string($file)){ ?>			

           			 {caption: "<?php echo $file; ?>", },

           			<?php }} ?>
		        ],
		          
		        layoutTemplates: {
        actionDrag: '',
    },
           initialPreviewAsData: true
          });
          });
		</script>


		<?php }else{ ?>
		<script>
			$(document).ready(function () 
			{
				$('#ec_mul_img').fileinput({
           uploadUrl: '#',
           //uploadUrl: 'http://localhost/plugins/test-upload',
           initialPreviewAsData: true
          });
          });
		</script>
	<?php } ?>
<?php $files = directory_map('./assets/images/realestate_purchase/layout/'.$edit_details->document_images.'/', FALSE, TRUE); 
																	 if (is_dir('./assets/images/realestate_purchase/layout/'.$edit_details->document_images.'/')) { ?>
		<!-- layout Multiple Image Script -->
		<script>
			$(document).ready(function () 
			{
				$('#layout_mul_img').fileinput({
           uploadUrl: '#',
           showUpload: false,
            showRemove: true,
					    	showDrag: false,
    						showClose: true,
    						overwriteInitial: false,
    						initialPreviewDelete: true,
           //uploadUrl: 'http://localhost/plugins/test-upload',
				 		initialPreview: [
													 		<?php
																	 $files = directory_map('./assets/images/realestate_purchase/layout/'.$edit_details->document_images.'/', FALSE, TRUE); 
																	 if (is_dir('./assets/images/realestate_purchase/layout/'.$edit_details->document_images.'/')) {
																		foreach($files as $file){
																			if(is_string($file)){ ?>										
																				'<?php echo base_url();?>/assets/images/realestate_purchase/layout/<?php echo $edit_details->document_images; ?>/<?php echo $file;?>',
															<?php } } }else{ echo'';} ?>				       
					    							],
					    							initialPreviewConfig: [

					    <?php foreach($files as $file){
																			if(is_string($file)){ ?>			

           			 {caption: "<?php echo $file; ?>", },

           			<?php }} ?>
		        ],
		        layoutTemplates: {
        actionDrag: '',
    },
           initialPreviewAsData: true
           });
           });
		</script>

		<?php }else{ ?>
		<script>
			$(document).ready(function () 
			{
				$('#layout_mul_img').fileinput({
           uploadUrl: '#',
           //uploadUrl: 'http://localhost/plugins/test-upload',
           initialPreviewAsData: true
          });
          });
		</script>
	<?php } ?>
	<?php $files = directory_map('./assets/images/realestate_purchase/property/'.$edit_details->document_images.'/', FALSE, TRUE); 
																	 if (is_dir('./assets/images/realestate_purchase/property/'.$edit_details->document_images.'/')) {?>
																		
		<!-- Property Multiple Image Script -->
		<script>
			$(document).ready(function () 
			{
				$('#property_mul_img').fileinput({
           uploadUrl: '#',
           showUpload: false,
            showRemove: true,
					    	showDrag: false,
    						showClose: true,
    						overwriteInitial: false,
    						initialPreviewDelete: true,
				 		initialPreview: [
													 		<?php
																	 $files = directory_map('./assets/images/realestate_purchase/property/'.$edit_details->document_images.'/', FALSE, TRUE); 
																	 if (is_dir('./assets/images/realestate_purchase/property/'.$edit_details->document_images.'/')) {
																		foreach($files as $file){
																			if(is_string($file)){ ?>										
																				'<?php echo base_url();?>/assets/images/realestate_purchase/property/<?php echo $edit_details->document_images; ?>/<?php echo $file;?>',
															<?php } } } ?>				       
					    							],
					    							initialPreviewConfig: [

					    <?php foreach($files as $file){
																			if(is_string($file)){ ?>			

           			 {caption: "<?php echo $file; ?>", },

           			<?php }} ?>
		        ],
		        layoutTemplates: {
        actionDrag: '',
    },
           //uploadUrl: 'http://localhost/plugins/test-upload',
           initialPreviewAsData: true
           });
           });
		</script>

		<?php }else{ ?>
		<script>
			$(document).ready(function () 
			{
				$('#property_mul_img').fileinput({
           uploadUrl: '#',
           //uploadUrl: 'http://localhost/plugins/test-upload',
           initialPreviewAsData: true
          });
          });
		</script>
	<?php } ?>
	<?php  $files = directory_map('./assets/images/realestate_purchase/others/'.$edit_details->document_images.'/', FALSE, TRUE); 
																	 if (is_dir('./assets/images/realestate_purchase/others/'.$edit_details->document_images.'/')) { ?>
		<!-- others Multiple Image Script -->
		<script>
			$(document).ready(function () 
			{
				$('#others_mul_img').fileinput({
           uploadUrl: '#',
           showUpload: false,
				 		initialPreview: [
													 		<?php
																	 $files = directory_map('./assets/images/realestate_purchase/others/'.$edit_details->document_images.'/', FALSE, TRUE); 
																	 if (is_dir('./assets/images/realestate_purchase/others/'.$edit_details->document_images.'/')) {
																		foreach($files as $file){
																			if(is_string($file)){ ?>										
																				'<?php echo base_url();?>/assets/images/realestate_purchase/others/<?php echo $edit_details->document_images; ?>/<?php echo $file;?>',
															<?php } } } ?>				       
					    							],

					    							initialPreviewConfig: [

					    <?php foreach($files as $file){
																			if(is_string($file)){ ?>			

           			 {caption: "<?php echo $file; ?>", },

           			<?php }} ?>
		        ],
		        layoutTemplates: {
        actionDrag: '',
    },
           //uploadUrl: 'http://localhost/plugins/test-upload',
           initialPreviewAsData: true
           });
           });
		</script>

		<?php }else{ ?>
		<script>
			$(document).ready(function () 
			{
				$('#others_mul_img').fileinput({
           uploadUrl: '#',
           //uploadUrl: 'http://localhost/plugins/test-upload',
           initialPreviewAsData: true
          });
          });
		</script>
	<?php } ?>
<?php } ?>




			<!-- validaion -->
		<script>
			function property_validation()
			{
				var err = 0;
				var dateval       = $('#kt_daterangepicker_lot_entry_add_date').val();
				// var party         = $('#prop_party').val();
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

				// var first_name_id_hidden = $('#first_name_id_hidden').val();

				// if(first_name_id_hidden=='')
			 //    {
			 //        $('#vprop_party_err').html('Enter Valid Party Name!');
			 //        err++;
			 //    }
			 //    else
			 //    {
			       
				// 	$('#vprop_party_err').html('');
					
			 //    }
				

				if(dateval.trim()=='')
			    {
			        $('#prop_date_err').html('select date !');
			        err++;
			    }
			    else
			    { 
					$('#prop_date_err').html('');
			    }
			  //   if(party.trim()=='')
			  //   {
			  //       $('#prop_party_err').html('Enter Party Name!');
			  //       err++;
			  //   }
			  //   else
			  //   {
			       
					// $('#prop_party_err').html('');
					
			  //   }
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
			 //    var actual_process_fees = $('#actual_process_fees').val();
				// if(actual_process_fees.trim()=='')
			 //    {
			 //        $('#actual_process_fees_err').html('Enter Actual Process fees !');
			 //        err++;
			 //    }
			 //    else
			 //    {
			       
				// 	$('#actual_process_fees_err').html('');
					
			 //    }
			 //    var base_mul_img = $('#base_mul_img').val();
				// if(base_mul_img.trim()=='')
			 //    {
			 //        $('#base_mul_img_err').html('Select Base Document !');
			 //        err++;
			 //    }
			 //    else
			 //    {
			       
				// 	$('#base_mul_img_err').html('');
					
			 //    }
			 //    var layout_mul_img = $('#layout_mul_img').val();
				// if(layout_mul_img.trim()=='')
			 //    {
			 //        $('#layout_mul_img_err').html('Select Layout !');
			 //        err++;
			 //    }
			 //    else
			 //    {
			       
				// 	$('#layout_mul_img_err').html('');
					
			 //    }
			 //    var ec_mul_img = $('#ec_mul_img').val();
				// if(ec_mul_img.trim()=='')
			 //    {
			 //        $('#ec_mul_img_err').html('Select EC !');
			 //        err++;
			 //    }
			 //    else
			 //    {
			       
				// 	$('#ec_mul_img_err').html('');
					
			 //    }
			 //    var property_mul_img = $('#property_mul_img').val();
				// if(property_mul_img.trim()=='')
			 //    {
			 //        $('#property_mul_img_err').html('Select Property !');
			 //        err++;
			 //    }
			 //    else
			 //    {
			       
				// 	$('#property_mul_img_err').html('');
					
			 //    }
			 //    var others_mul_img = $('#others_mul_img').val();
				// if(others_mul_img.trim()=='')
			 //    {
			 //        $('#others_mul_img_err').html('Select Others !');
			 //        err++;
			 //    }
			 //    else
			 //    {
			       
				// 	$('#others_mul_img_err').html('');
					
			 //    }
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

			     if(err>0){ return false; }else{ return true; }
			}		
		</script>
		<!-- payments -->
	
		<!-- Cash cr -->
		<script>
			cash_cr_radio()
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
			bank_cr_radio()

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
			upi_cr_radio()
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
	</body>
	<!--end::Body-->
</html> 