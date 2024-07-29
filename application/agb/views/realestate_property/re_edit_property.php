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
									<h1 class="d-flex align-items-center text-dark fw-bold my-1 fs-3">Edit Property
									<!--begin::Separator-->
									<span class="h-20px border-gray-400 border-start ms-3 mx-2"></span>
									<!--end::Separator-->
									<?php if(isset($edit_details)){echo $edit_details->property_id?$edit_details->property_id:'' ; }?>
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
										<?php if(isset($edit_details)){ ?>
										<div class="card-body py-4">
											<form method="POST" autocomplete="off" action="<?php echo base_url(); ?>Realestateproperty/property_edit_save" enctype="multipart/form-data" onsubmit="return property_validation()">
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
														<!-- <div class="col-lg-5">
															<label class="col-form-label fw-bold fs-6"><?php if(isset($party_details->NAME)){
																$lastname=$party_details->LASTNAME_PREFIX.','.$party_details->FATHERSNAME;
																
																echo $lastname; }
																?>
															</label>
														</div> -->
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
																			<input type="hidden" name="prop_id_hidden" id="prop_id_hidden" value="<?php echo $edit_details->property_id?$edit_details->property_id:'' ; ?>">
																			<input type="hidden" name="property_sno_hidden" id="property_sno_hidden" value="<?php echo $edit_details->property_id?$edit_details->property_id:'' ; ?>">
																			
																			
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
																								if($party_details->RATING==3) echo 'color:#50cd89;';
																								if($party_details->RATING==2) echo 'color:#ffc700;';
																								if($party_details->RATING ==1) echo 'color:#FF0000;';
																								if($party_details->RATING=='') echo 'color:#d2d4dc;';
																							?>">
																						</i>
																					</span>&nbsp;-&nbsp;
																					<?php 
																						if($party_details->RATING==3) echo 'Good';
																						if($party_details->RATING==2) echo 'Average';
																						if($party_details->RATING ==1) echo 'Bad';
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
																<label class="required col-form-label fw-semibold fs-6">State</label>
															</div> 
																<div class="col-lg-5 fv-row fv-plugins-icon-container">
																	<!-- <input type="text" name="prop_state" id="prop_state" class="form-control form-control-lg form-control-solid" placeholder="State" value=""> -->
																	<select id="prop_state" name="prop_state" aria-label="Select a Currency" data-control="select2" class="form-select form-select-solid form-select-lg fs-6" onchange="state_change()">
																		<?php $state = $edit_details->state?$edit_details->state:''; ?>
																			<option value="">Select State <?php echo $state ?></option>
																			<option value="Andra Pradesh" <?php echo $state == "Andra Pradesh"? 'selected':''; ?>>Andra Pradesh</option>
																			<option value="Arunachal Pradesh"<?php echo $state == "Arunachal Pradesh"? 'selected':''; ?>>Arunachal Pradesh</option>
																			<option value="Assam"<?php echo $state == "Assam"? 'selected':''; ?>>Assam</option>
																			<option value="Bihar"<?php echo $state == "Bihar"? 'selected':''; ?>>Bihar</option>
																			<option value="Chhattisgarh"<?php echo $state == "Chhattisgarh"? 'selected':''; ?>>Chhattisgarh</option>
																			<option value="Goa"<?php echo $state == "Goa"? 'selected':''; ?>>Goa</option>
																			<option value="Gujarat"<?php echo $state == "Gujarat"? 'selected':''; ?>>Gujarat</option>
																			<option value="Haryana"<?php echo $state == "Haryana"? 'selected':''; ?>>Haryana</option>
																			<option value="Himachal Pradesh"<?php echo $state == "Himachal Pradesh"? 'selected':''; ?>>Himachal Pradesh</option>
																			<option value="Jammu and Kashmir"<?php echo $state == "Jammu and Kashmir"? 'selected':''; ?>>Jammu and Kashmir</option>
																			<option value="Jharkhand"<?php echo $state == "Jharkhand"? 'selected':''; ?>>Jharkhand</option>
																			<option value="Karnataka"<?php echo $state == "Karnataka"? 'selected':''; ?>>Karnataka</option>
																			<option value="Kerala"<?php echo $state == "Kerala"? 'selected':''; ?>>Kerala</option>
																			<option value="Madya Pradesh"<?php echo $state == "Madya Pradesh"? 'selected':''; ?>>Madya Pradesh</option>
																			<option value="Maharashtra"<?php echo $state == "Maharashtra"? 'selected':''; ?>>Maharashtra</option>
																			<option value="Manipur"<?php echo $state == "Manipur"? 'selected':''; ?>>Manipur</option>
																			<option value="Meghalaya"<?php echo $state == "Meghalaya"? 'selected':''; ?>>Meghalaya</option>
																			<option value="Mizoram"<?php echo $state == "Mizoram"? 'selected':''; ?>>Mizoram</option>
																			<option value="Nagaland"<?php echo $state == "Nagaland"? 'selected':''; ?>>Nagaland</option>
																			<option value="Orissa"<?php echo $state == "Orissa"? 'selected':''; ?>>Orissa</option>
																			<option value="Punjab"<?php echo $state == "Punjab"? 'selected':''; ?>>Punjab</option>
																			<option value="Rajasthan"<?php echo $state == "Rajasthan"? 'selected':''; ?>>Rajasthan</option>
																			<option value="Sikkim"<?php echo $state == "Sikkim"? 'selected':''; ?>>Sikkim</option>
																			<option value="Tamil Nadu"  <?php echo $state == "Tamil Nadu"? 'selected':''; ?>>Tamil Nadu</option>
																			<option value="Telangana"<?php echo $state == "Telangana"? 'selected':''; ?>>Telangana</option>
																			<option value="Tripura"<?php echo $state == "Tripura"? 'selected':''; ?>>Tripura</option>
																			<option value="Uttaranchal"<?php echo $state == "Uttaranchal"? 'selected':''; ?>>Uttaranchal</option>
																			<option value="Uttar Pradesh"<?php echo $state == "Uttar Pradesh"? 'selected':''; ?>>Uttar Pradesh</option>
																			<option value="West Bengal"<?php echo $state == "West Bengal"? 'selected':''; ?>>West Bengal</option>
																			<option disabled style="background-color:#aaa; color:#fff">UNION Territories</option>
																			<option value="Andaman and Nicobar Islands"<?php echo $state == "Andaman and Nicobar Islands"? 'selected':''; ?>>Andaman and Nicobar Islands</option>
																			<option value="Chandigarh"<?php echo $state == "Chandigarh"? 'selected':''; ?>>Chandigarh</option>
																			<option value="Dadar and Nagar Haveli">Dadar and Nagar Dadar and Nagar Haveli</option>
																			<option value="Daman and Diu"<?php echo $state == "Daman and Diu"? 'selected':''; ?>>Daman and Diu</option>
																			<option value="Delhi"<?php echo $state == "Delhi"? 'selected':''; ?>>Delhi</option>
																			<option value="Lakshadeep"<?php echo $state == "Lakshadeep"? 'selected':''; ?>>Lakshadeep</option>
																			<option value="Pondicherry"<?php echo $state == "Pondicherry"? 'selected':''; ?>>Pondicherry</option> 
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
																	<input type="hidden" name="city_hidden" id="city_hidden"  value="<?php echo $edit_details->city?$edit_details->city:''; ?>">
																	<select id="prop_city" name="prop_city" aria-label="Select a Currency" data-control="select2" class="form-select form-select-solid form-select-lg fs-6" onchange="city_change()">
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
															<input type="text" name="pincode" id="pincode" class="form-control form-control-lg form-control-solid" placeholder="Pincode" maxlength="7" oninput="this.value = this.value.replace(/[^/0-9]/g, '').replace(/(\..*)\./g, '$1');" value="<?php echo $edit_details->pincode; ?>">
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
																		<input type="text" name="prop_ppa_no" id="prop_ppa_no" maxlength="8" class="form-control form-control-lg form-control-solid" placeholder="Plot Area No" value="<?php echo $edit_details->ploat_no; ?>" title="Enter Your Number of Count" onkeyup="pay_to_property_calc()" oninput="this.value = this.value.replace(/[^/0-9.]/g, '').replace(/(\..*)\./g, '$1');" maxlength="11">
																		<div class="fv-plugins-message-container invalid-feedback"id="prop_ppa_no_err" ></div>
																</div>
																<div class="col-lg-4 fv-row fv-plugins-icon-container">
																			<select class="form-select form-select-solid" data-control="select2" data-hide-search="true" title="Select Your Plot Area Type" name="prop_ppa_type" id="prop_ppa_type"  onkeyup="pay_to_property_calc()">
																				<option value="<?php echo $edit_details->ploat_type ; ?>">Select Type</option>
																				<option value="Sq.ft"<?php echo $edit_details->ploat_type == "Sq.ft"?'selected':''; ?>>Sq.ft</option>
																				<option value="Cent"<?php echo $edit_details->ploat_type == "Cent"?'selected':''; ?>>Cent</option>
																				<option value="Acre"<?php echo $edit_details->ploat_type == "Acre"?'selected':''; ?>>Acre</option>
																				
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
																	<label class="col-form-label fw-bold fs-5" name="lbl_total_amt" id="lbl_total_amt" onkeyup ="pay_to_property_calc()" ><?php echo $t_amount; ?></label>
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
														  <input type="hidden" name="agent_name_hid[]" id="agent_name_hid<?php echo $i+1;?>"  value="<?php echo $aview['agent_name']; ?>" onchange="pay_to_property_calc(<?php echo $i+1;?>)">
														  <input type="hidden" name="agent_amt_hid[]"  id="agent_amt_hid<?php echo $i+1;?>" value="<?php echo $aview['amount']; ?>" onchange="pay_to_property_calc(<?php echo $i+1;?>)"> 
														  <input type="hidden" name="agents_id_hidden[]" id="agents_id_hidden" value="<?php echo $aview['id']; ?>">														    
														<?php } ?>
														<div class="col-lg-2">
															<label class="col-form-label fw-semibold fs-6">Description</label>
														</div>
														<div class="col-lg-10 fv-row fv-plugins-icon-container">
															<textarea class="form-control form-control-solid" rows="2" placeholder="Description" name="prop_des" id="prop_des"><?php echo $edit_details->description ; ?> 
															</textarea>
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
																				<input type="text" name="stamp_paper_charges" id="stamp_paper_charges" class="form-control form-control-lg form-control-solid" placeholder="Stamp Paper Charges" value="<?php echo $edit_details->stamp_paper_charges?$edit_details->stamp_paper_charges:0; ?>" oninput="this.value = this.value.replace(/[^/0-9.]/g, '').replace(/(\..*)\./g, '$1');">
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
																					<input type="text" name="duty_charges" id="duty_charges" class="form-control form-control-lg form-control-solid" placeholder="Duty Charges" value="<?php echo $edit_details->duty_charges?$edit_details->duty_charges:0; ?>" oninput="this.value = this.value.replace(/[^/0-9.]/g, '').replace(/(\..*)\./g, '$1');">
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
																					<input type="text" name="vendor_charges" id="vendor_charges" class="form-control form-control-lg form-control-solid" placeholder="Vendor Charges" value="<?php echo $edit_details->vendor_charges?$edit_details->vendor_charges:0; ?>" oninput="this.value = this.value.replace(/[^/0-9.]/g, '').replace(/(\..*)\./g, '$1');">
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
																					<input type="text" name="process_fees" id="process_fees" class="form-control form-control-lg form-control-solid" placeholder="Process fees" value="<?php echo $edit_details->process_fees?$edit_details->process_fees:0; ?>" oninput="this.value = this.value.replace(/[^/0-9.]/g, '').replace(/(\..*)\./g, '$1');">
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
																				<input type="text" name="by_buying_rate" id="by_buying_rate" class="form-control form-control-lg form-control-solid" placeholder="By Buying Rate" value="<?php echo $edit_details->by_buying_rate?$edit_details->by_buying_rate:0; ?>" oninput="this.value = this.value.replace(/[^/0-9.]/g, '').replace(/(\..*)\./g, '$1');">
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
																		<input type="text" name="actual_stamp_paper_charges" id="actual_stamp_paper_charges" class="form-control form-control-lg form-control-solid" placeholder="Stamp Paper Charges" value="<?php echo $edit_details->actual_stamp_paper_charges?$edit_details->actual_stamp_paper_charges:0; ?>" oninput="this.value = this.value.replace(/[^/0-9.]/g, '').replace(/(\..*)\./g, '$1');" >
																		<div class="fv-plugins-message-container invalid-feedback"id="actual_stamp_paper_charges_err" ></div>
																</div>
															</div>
															<div class="row">
																<div class="col-lg-4">
																	<label class="col-form-label fw-semibold fs-6 required">Actual Duty Charges</label>
																</div>
																<div class="col-lg-8 fv-row fv-plugins-icon-container">
																		<input type="text" name="actual_duty_charges" id="actual_duty_charges" class="form-control form-control-lg form-control-solid" placeholder="Actual Buying Rate" value="<?php echo $edit_details->actual_duty_charges?$edit_details->actual_duty_charges:0; ?>" oninput="this.value = this.value.replace(/[^/0-9.]/g, '').replace(/(\..*)\./g, '$1');">
																	 <div class="fv-plugins-message-container invalid-feedback"id="actual_duty_charges_err" ></div>
																</div>
															</div>
															<div class="row">
																<div class="col-lg-4">
																	<label class="col-form-label fw-semibold fs-6 required">Actual Vendor Charges</label>
																</div>
																<div class="col-lg-8 fv-row fv-plugins-icon-container">
																			<input type="text" name="actual_vendor_charges" id="actual_vendor_charges" class="form-control form-control-lg form-control-solid" placeholder="Vendor Charges" value="<?php echo $edit_details->actual_vendor_charges?$edit_details->actual_vendor_charges:0; ?>" oninput="this.value = this.value.replace(/[^/0-9.]/g, '').replace(/(\..*)\./g, '$1');">
																		<div class="fv-plugins-message-container invalid-feedback"id="actual_vendor_charges_err" ></div>
																</div>
															</div>
															<div class="row">
																<div class="col-lg-4">
																	<label class="required col-form-label fw-semibold fs-6">Actual Process Fees</label>
																</div>
																<div class="col-lg-8 fv-row fv-plugins-icon-container">
																		<input type="text" name="actual_process_fees" id="actual_process_fees" class="form-control form-control-lg form-control-solid" placeholder="Actual Process fees" value="<?php echo $edit_details->actual_process_fees?$edit_details->actual_process_fees:0; ?>" oninput="this.value = this.value.replace(/[^/0-9.]/g, '').replace(/(\..*)\./g, '$1');">
																	<div class="fv-plugins-message-container invalid-feedback"id="actual_process_fees_err" ></div>
																</div>
															</div>
															<div class="row">
																<div class="col-lg-4">
																	<label class="col-form-label fw-semibold fs-6">Actual Buying Rate</label>
																</div>
																<div class="col-lg-8 fv-row fv-plugins-icon-container">
																		<input type="hidden" name="actual_buying_rate" id="actual_buying_rate"  value="<?php echo $edit_details->actual_buying_rate?$edit_details->actual_buying_rate:0; ?>" oninput="this.value = this.value.replace(/[^/0-9.]/g, '').replace(/(\..*)\./g, '$1');">
																		<label class="col-form-label fw-bold fs-3" id="actual_buying_rate_lab"><?php echo $edit_details->actual_buying_rate?$edit_details->actual_buying_rate:0; ?></label>
																	 <div class="fv-plugins-message-container invalid-feedback"id="actual_buying_rate_err" ></div>
																</div>
															</div>
														</div>
													</div>

													
													
													<div class="row mt-4 text-start">
														<label class="col-lg-2 col-form-label fw-semibold fs-6 ">Agent Counts</label>
											    	<label class="col-lg-2 col-form-label fw-bold fs-3 " name="agent_count" id="agent_count"><?php echo $edit_details->agent_name1 ; ?></label>
                            <label class="col-lg-2 col-form-label fw-semibold fs-6">Agent Amounts</label>
												    <label class="col-lg-2 col-form-label fw-bold fs-3 " name="agent_tot_amt" id="agent_tot_amt" ><?php echo $edit_details->agent_amt1?$edit_details->agent_amt1:0; ; ?></label>
												    <input type="hidden" name="agent_tot_amt_hidden" id="agent_tot_amt_hidden" onkeyup="pay_to_property_calc()" value="<?php echo $edit_details->agent_amt1?$edit_details->agent_amt1:0; ?>">
												    <input type="hidden" name="agent_count_hidden" id="agent_count_hidden" value="<?php echo $edit_details->agent_name1?$edit_details->agent_name1:0; ?>">
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

												<label class="col-form-label fw-bold fs-5">Purchase Payment Details</label> 
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
												<div class="fv-plugins-message-container invalid-feedback" id="payment_err" ></div>
											</div>
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
													
													<div class="fv-plugins-message-container invalid-feedback" id="chequebank_err"></div>
												</div>
												<label class="col-lg-1 col-form-label required fw-semibold fs-6" id="cheque_cr_lab" style="display: none;">Cheque</label>
												<div class="col-lg-2" id="cheque_cr_tbox" style="display: none;">
													<input type="text" name="chequerefno" id="chequerefno" class="form-control form-control-lg form-control-solid" placeholder="Cheque No" value="<?php echo $bank_detail?$bank_detail->cheque_ref_no :''; ?>" >
													<div class="fv-plugins-message-container invalid-feedback" id="chequerefno_err"></div>
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
													<input type="text" name="upirefno"  id="upirefno" value="<?php echo $upi_detail?$upi_detail->cheque_ref_no :0; ?>" class="form-control form-control-lg form-control-solid" placeholder="Transaction No">
													<div class="fv-plugins-message-container invalid-feedback" id="upirefno_err"></div>
												</div>
												<label class="col-lg-1 col-form-label  fw-semibold fs-6" id="detail_upi_cr_lab" style="display: none;">Details</label>
												<div class="col-lg-2 fv-row fv-plugins-icon-container" id="detail_upi_cr_tbox" style="display: none;">
													<textarea class="form-control form-control-solid" rows="1" placeholder="Details" name="upidetail" id="upidetail"><?php echo $upi_detail?$upi_detail->remarks :''; ?></textarea>
												</div>
											</div>
											
											
											<div class="row mt-4">
												<div class="col-lg-4 ">
													<label class="col-form-label fw-bold fs-4">Net Amount &emsp;</label>
													<label class="col-form-label fw-bold fs-3" id="lbl_total_amt_lab_2"><?php echo $edit_details->total_property_amount; ?></label>
												</div>
												<div class="col-lg-4 ">
													<label class="col-form-label fw-bold fs-4">Paid Amount &emsp;</label>
													<label class="col-form-label fw-bold fs-3" id="paid_amount_lab"><?php echo $edit_details->paid_amount; ?></label>
												</div>
												<div class="col-lg-4 ">
													<label class="col-form-label fw-bold fs-4">Balance Amount &emsp;</label>
													<label class="col-form-label fw-bold fs-3" id="lbl_bal_amt"><?php echo $edit_details->balance_amount; ?></label>
												</div>
											</div>
											<div class="d-flex justify-content-end">
												<a type="reset" class="btn btn-secondary me-3"  href="<?php echo base_url(); ?>Realestateproperty">Cancel</a>
												<button type="submit" class="btn btn-primary" id="save_changes_add_product">Save Changes</button>
											</div>
										</div>
										 <script>
										 	window.onload = function() {
											  pay_to_property_calc();
											};
										 	var baseurl = $("#baseurl").val();
										 	


											 	function pay_to_property_calc(id){

											 		// alert(id);

											 		// var tot_amt= 0;
										 			// var tot_paid_amt= 0;
										 			// var tot_bal_amt= 0;
									        var price=parseFloat($('#prop_price_ppa').val());

													var count=parseFloat($('#prop_ppa_no').val());

													var ag_toatl_amount =parseFloat($('#agent_tot_amt_hidden').val());
													// alert(ag_toatl_amount);

													if(ag_toatl_amount=='') ag_toatl_amount=0;

													if(isNaN(price)) price=0;
													if(isNaN(count)) count=0;

													 var tot_amt = price * count;

													// alert(tot_amt);

													var total_price = tot_amt + ag_toatl_amount ;
													// alert(total_price);
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
													// $('#lbl_total_amt').html(tamt);


													// $('#prop_amt_hidden').val(tot_amt);
													// alert(total_price);
													 if(ag_toatl_amount>0)
													    {
													        $('#lbl_total_amt_lab_2').html(tprice);
													        $('#total_prop_amt_hidden').val(total_price);		
													        $('#actual_buying_rate').val(total_price);													        
													        $('#actual_buying_rate_lab').html(tprice);											    
													    }
													    else
													    {
													       
															$('#lbl_total_amt_lab_2').html(tamt);
													        $('#total_prop_amt_hidden').val(tot_amt);
													        $('#actual_buying_rate_lab').html(tamt);
													        $('#actual_buying_rate').val(tot_amt);
															
													    }

													    $('#lbl_total_amt').html(tamt);
															$('#prop_amt_hidden').val(tot_amt);
													    // $('#lbl_total_amt_lab_2').html(total_price);

													var cash=parseFloat($('#cashamount').val());
													// alert (cash);

													var cheque=parseFloat($('#chequeamount').val());
													// alert(cheque);

													var upi=parseFloat($('#upiamount').val());

													// alert(upi);

													var rc_tot=parseFloat($('#total_prop_amt_hidden').val());

													if(isNaN(cash)) cash=0;
													if(isNaN(cheque)) cheque=0;
													if(isNaN(upi)) upi=0;
													
													 var tot_paid_amt= cash+cheque+upi;
														var paidlab = parseFloat(tot_paid_amt).toLocaleString('en-IN', {
														    maximumFractionDigits: 2,
														    style: 'currency',
														    currency: 'INR'
														});

													 var  tot_bal_amt = rc_tot - parseFloat(tot_paid_amt);

													var diff= rc_tot - parseFloat(tot_paid_amt);

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
														    $('#paid_amount_lab').html('0');
														    $('#balance_amount_hidden').val('0');
														    $('#paid_amount_hidden').val('0');
														}
													

													if (id==0){
														    
													  $('#cashamount').val('0');
														$('#chequeamount').val('0');
														$('#upiamount').val('0');
														$('#paid_amount_hidden').val('0');
														$('#paid_amount_lab').html('0');
														$('#lbl_bal_amt').html('0');
														$('#balance_amount_hidden').val('0');

														  }
														  else{

														$('#paid_amount_hidden').val(tot_paid_amt);
														$('#paid_amount_lab').html(paidlab);
														$('#lbl_bal_amt').html(ballab);
														$('#balance_amount_hidden').val(tot_bal_amt);

															
													}

													if (id==0) {}else{

															var name=$('#agent_names'+id).val();															
															var amt=parseFloat($('#agent_amount'+id).val());

													 	// if(isNaN(name)) name='';
											 			if(isNaN(amt)) amt=0;

															$('#agent_name_hid'+id).val(name);
															// alert(name);
															$('#agent_amt_hid'+id).val(amt);

															var agent_count_total = 0;
															var agent_tot_amount  = 0;
															var tot_count=0;		

															for(var i=1; i<10; i++){

															 var agent_amount     = $('#agent_amount'+i).val();
															 
															 if(agent_amount=='') agent_amount=0;
															 // alert(agent_amount)
															  agent_tot_amount    += parseInt(agent_amount);

															   var agent_count_get=$('#agent_amount'+i).val();
															 // var tot_ag_count += parseFloat(agent_count_get);

																	  if (agent_count_get>0) {
																	 	  tot_count=tot_count+1;		
																	 	}

																}
																// $('#agent_tot_amt').html(tot_amount);
																var amlab = parseFloat(agent_tot_amount).toLocaleString('en-IN', {
																	    maximumFractionDigits: 2,
																	    style: 'currency',
																	    currency: 'INR'
																	});
																let totaco = tot_count;
																let twoDigitNumber = totaco.toString().padStart(2,'0');
																// $('#agent_tot_amt').html(tot_amount);
																$('#agent_count').html(twoDigitNumber);
																$('#agent_count_hidden').val(tot_count);


															$('#agent_tot_amt').html(amlab);
															$('#agent_tot_amt_hidden').val(agent_tot_amount);

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
														<h1 class="mb-3">Edit Agent</h1>	
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
															 	  <?php foreach($agents_details as $a=> $aview){ ?> 															 		
																    	<tr>
																    		<td><?php echo $a+1;?></td>
																    		<td>
															    		    	 <div class="d-flex justify-content-center fv-row fv-plugins-icon-container">
															    		    		<?php if ($aview['agent_name']!='') { ?>
																    		    	<label class="col-form-label fw-semibold fs-5" name="agent_names[]" id="agent_names<?php echo $a+1;?>">
																    		    		<?php echo $aview['agent_name']; ?>
																    		    	</label>	
																    		    <?php }else{ ?>

																    		    	<select 	data-width="290px" aria-label="Select a Currency" data-control="select2"   class="form-select form-select-solid"  name="agent_names[]" id="agent_names<?php echo $a+1;?>" onchange="pay_to_property_calc(<?php echo $a+1; ?>)" data-dropdown-parent="#kt_modal_agent">

																									<option value="">Select</option>
																									<?php foreach($agent_list as $ag_list)
																									{ 
																										$value = $ag_list['LEDGER_NAME'].'~'.$ag_list['LEDGER_SNO'];?>
																										
																									<option value="<?php echo $value?$value:''; ?>" >

																										<?php echo $ag_list['LEDGER_NAME'];?><?php echo $ag_list['PHONE']?' | '.$ag_list['PHONE']:''; ?>

																									</option>
																									<?php } ?>
																							</select>		
																							<?php } ?>											                      
										                        </div>
																    		</td>
																    		<td>
																    			<div class="d-flex justify-content-center fv-row fv-plugins-icon-container">
																    			 <input type="text" class="col-lg-4 form-control form-control-lg form-control-solid"  name="agent_amount[]" id="agent_amount<?php echo $a+1;?>" onkeyup="pay_to_property_calc(<?php echo $a+1; ?>)" oninput="this.value = this.value.replace(/[^/0-9.]/g, '').replace(/(\..*)\./g, '$1');"
																    			 value="<?php echo $aview['amount']?$aview['amount']:''; ?>" style=" text-align: right;"  tabindex="1" data-width="200px" placeholder="Amount" >
																    			</div>
																    		</td>
																    	</tr>																    	
														    	<?php   } ?>
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
									<?php } ?>
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
		<script src="<?php echo base_url(); ?>assets/plugins/custom/fslightbox/fslightbox.bundle.js"></script> 
		<script src="<?php echo base_url();?>assets/multi/fileinput.js" type="text/javascript"></script>

		  <script>
			// $("#add_agent_table").DataTable({
				//"aaSorting":[],
				// "sorting":false,
				// "paging": false,
				// // "responsive": true,
				//  "language": {
				//   "lengthMenu": "Show _MENU_",
				//  },
				//  "dom":
				//   "<'row'" +
				//   // "<'col-sm-6 d-flex align-items-center justify-conten-start'l>" +
				//   // ">" +

				//   "<'table-responsive'tr>" +

				//   "<'row'" +
				//   // "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
				//   // "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
				//   ">"
				// });
			// $('#add_agent_table').wrap('<div class="dataTables_scroll" />');
		</script>

<?php if(isset($edit_details)){ ?>
		<!-- base Multiple image script -->
		<!-- ******************************************************************************************************************** -->
<?php
$files = directory_map('./assets/images/realestate_property/base_document/'.$edit_details->document_images.'/', FALSE, TRUE); 
 if (is_dir('./assets/images/realestate_property/base_document/'.$edit_details->document_images.'/')) { ?>
		<script>
			$(document).ready(function () 
			{
				$('#base_mul_img').fileinput({
           // uploadUrl: '#',
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
																	 $files = directory_map('./assets/images/realestate_property/base_document/'.$edit_details->document_images.'/', FALSE, TRUE); 
																	 if (is_dir('./assets/images/realestate_property/base_document/'.$edit_details->document_images.'/')) {
																		foreach($files as $file){
																			if(is_string($file)){ ?>										
																				'<?php echo base_url()?>/assets/images/realestate_property/base_document/<?php echo $edit_details->document_images; ?>/<?php echo $file;?>',
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
           showUpload: false,
           //uploadUrl: 'http://localhost/plugins/test-upload',
           initialPreviewAsData: true
          });
          });
		</script>
	<?php } ?>
		<?php  $files = directory_map('./assets/images/realestate_property/ec/'.$edit_details->document_images.'/', FALSE, TRUE); 
						if (is_dir('./assets/images/realestate_property/ec/'.$edit_details->document_images.'/')) { ?>
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
																	 $files = directory_map('./assets/images/realestate_property/ec/'.$edit_details->document_images.'/', FALSE, TRUE); 
																	 if (is_dir('./assets/images/realestate_property/ec/'.$edit_details->document_images.'/')) {
																		foreach($files as $file){
																			if(is_string($file)){ ?>										
																				'<?php echo base_url()?>/assets/images/realestate_property/ec/<?php echo $edit_details->document_images; ?>/<?php echo $file;?>',
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
           showUpload: false,
           //uploadUrl: 'http://localhost/plugins/test-upload',
           initialPreviewAsData: true
          });
          });
		</script>
	<?php } ?>
<?php $files = directory_map('./assets/images/realestate_property/layout/'.$edit_details->document_images.'/', FALSE, TRUE); 
																	 if (is_dir('./assets/images/realestate_property/layout/'.$edit_details->document_images.'/')) { ?>
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
																	 $files = directory_map('./assets/images/realestate_property/layout/'.$edit_details->document_images.'/', FALSE, TRUE); 
																	 if (is_dir('./assets/images/realestate_property/layout/'.$edit_details->document_images.'/')) {
																		foreach($files as $file){
																			if(is_string($file)){ ?>										
																				'<?php echo base_url()?>/assets/images/realestate_property/layout/<?php echo $edit_details->document_images; ?>/<?php echo $file;?>',
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
           showUpload: false,
           //uploadUrl: 'http://localhost/plugins/test-upload',
           initialPreviewAsData: true

          });
          });
		</script>
	<?php } ?>
	<?php $files = directory_map('./assets/images/realestate_property/property/'.$edit_details->document_images.'/', FALSE, TRUE); 
																	 if (is_dir('./assets/images/realestate_property/property/'.$edit_details->document_images.'/')) {?>
																		
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
																	 $files = directory_map('./assets/images/realestate_property/property/'.$edit_details->document_images.'/', FALSE, TRUE); 
																	 if (is_dir('./assets/images/realestate_property/property/'.$edit_details->document_images.'/')) {
																		foreach($files as $file){
																			if(is_string($file)){ ?>										
																				'<?php echo base_url()?>/assets/images/realestate_property/property/<?php echo $edit_details->document_images; ?>/<?php echo $file;?>',
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
           showUpload: false,

           //uploadUrl: 'http://localhost/plugins/test-upload',
           initialPreviewAsData: true
          });
          });
		</script>
	<?php } ?>
	<?php  $files = directory_map('./assets/images/realestate_property/others/'.$edit_details->document_images.'/', FALSE, TRUE); 
																	 if (is_dir('./assets/images/realestate_property/others/'.$edit_details->document_images.'/')) { ?>
		<!-- others Multiple Image Script -->
		<script>
			$(document).ready(function () 
			{
				$('#others_mul_img').fileinput({
           uploadUrl: '#',
           showUpload: false,
				 		initialPreview: [
													 		<?php
																	 $files = directory_map('./assets/images/realestate_property/others/'.$edit_details->document_images.'/', FALSE, TRUE); 
																	 if (is_dir('./assets/images/realestate_property/others/'.$edit_details->document_images.'/')) {
																		foreach($files as $file){
																			if(is_string($file)){ ?>										
																				'<?php echo base_url()?>/assets/images/realestate_property/others/<?php echo $edit_details->document_images; ?>/<?php echo $file;?>',
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
           showUpload: false,
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
				

				if(dateval.trim()=='')
			    {
			        $('#prop_date_err').html('select date !');
			        err++;
			    }
			    else
			    { 
					$('#prop_date_err').html('');
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
			  //   var base_mul_img = $('#base_mul_img').val();
				// if(base_mul_img.trim()=='')
			  //   {
			  //       $('#base_mul_img_err').html('Select Base Document !');
			  //       err++;
			  //   }
			  //   else
			  //   {
			       
				// 	$('#base_mul_img_err').html('');
					
			  //   }
			  //   var layout_mul_img = $('#layout_mul_img').val();
				// if(layout_mul_img.trim()=='')
			  //   {
			  //       $('#layout_mul_img_err').html('Select Layout !');
			  //       err++;
			  //   }
			  //   else
			  //   {
			       
				// 	$('#layout_mul_img_err').html('');
					
			  //   }
			  //   var ec_mul_img = $('#ec_mul_img').val();
				// if(ec_mul_img.trim()=='')
			  //   {
			  //       $('#ec_mul_img_err').html('Select EC !');
			  //       err++;
			  //   }
			  //   else
			  //   {
			       
				// 	$('#ec_mul_img_err').html('');
					
			  //   }
			  //   var property_mul_img = $('#property_mul_img').val();
				// if(property_mul_img.trim()=='')
			  //   {
			  //       $('#property_mul_img_err').html('Select Property !');
			  //       err++;
			  //   }
			  //   else
			  //   {
			       
				// 	$('#property_mul_img_err').html('');
					
			  //   }
			  //   var others_mul_img = $('#others_mul_img').val();
				// if(others_mul_img.trim()=='')
			  //   {
			  //       $('#others_mul_img_err').html('Select Others !');
			  //       err++;
			  //   }
			  //   else
			  //   {
			       
				// 	$('#others_mul_img_err').html('');
					
			  //   }


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

				var city_selected = $("#city_hidden").val();

				  for(var i = 0; i < optionsList.length; i++){

				  		var val = '';
				  		if (city_selected==optionsList[i]) {

				  			val = 'selected';
				  		}else{
				  			val='';
				  		}
				    htmlString = htmlString+"<option value='"+optionsList[i]+"'"+val+">"+ optionsList[i] +"</option>";
				  }
				  $("#prop_city").html(htmlString);
			}
			city_change()
			function city_change(){

				var city_selected = $("#prop_city").val();

				  $("#city_hidden").val(city_selected);    
			}
		</script>
		<script>
			$("#kt_daterangepicker_lot_entry_add_date").flatpickr({
							dateFormat: "d-m-Y",
						});
		</script>
	</body>
	<!--end::Body-->
</html> -->