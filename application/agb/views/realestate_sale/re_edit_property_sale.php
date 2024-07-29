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
									<h1 class="d-flex align-items-center text-dark fw-bold my-1 fs-3">Edit Sale
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
											<form method="POST" autocomplete="off" action="<?php echo base_url(); ?>Realestatesale/property_edit_save" enctype="multipart/form-data" onsubmit="return property_sale_validation()">
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
																	<?php 
																       $date=date('d-m-Y',strtotime($edit_details->date));
															     	 ?>
																	<input class="form-control form-control-solid ps-12 flatpickr-input" name="prop_date" placeholder="Date" id="kt_daterangepicker_pro_sale_add_date" value="<?php echo $date; ?>" type="text" readonly="readonly">
																	<!-- <input class="form-control form-control-solid ps-12 flatpickr-input" name="porp_date" placeholder="Date"  id="" value="11-03-2023" type="text" readonly="readonly"> -->
																</div>
															</div>
															<label class="col-lg-2 col-form-label required fw-semibold fs-6">Property ID</label>
														
																<div class="col-lg-5 fv-row fv-plugins-icon-container">
																	<label class="col-form-label fw-bold fs-5" title="Property ID"><?php  echo $edit_details->property_id;?></label>
																	<input type="hidden" name="sale_id_hidden" id="sale_id_hidden" value="<?php  echo $edit_details->sale_id;?>">
														   	    </div>
															
															
														</div>
														<div class="row">
															<label class="col-lg-2 col-form-label required fw-semibold fs-6">Party</label>
															<div class="col-lg-3 fv-row fv-plugins-icon-container">
																<label class="col-form-label fw-bold fs-6">
																	<?php if(isset($party_details->NAME)){
																		echo $party_details->NAME; }
																	?>
																</label>
																	<div class="fv-plugins-message-container invalid-feedback" id="prop_party_err"></div>
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
															</svg>&emsp;
															<i class="fas fa-list-ol fs-4"></i>&nbsp;
															<label class="col-form-label fs-6 fw-bold" title="Number of Plot Area" id="cur_ploat_no"><?php echo $cur_ploat_no; ?></label>&emsp;
															<i 	class="fas fa-layer-group fs-6" title="Type Plot Area"></i>&nbsp;
															<label class="col-form-label fw-bold fs-6" title="Total of Plot Area" id="cur_ploat_type"><?php echo $cur_ploat_type; ?></label>&emsp;
															<i class="fas fa-money-bill-wave fs-6" title="Total Price of Plot Area"></i>&nbsp;
															<label class="col-form-label fw-bold fs-6" title="Total Price of Plot Area" id="cur_pro_amount"><?php echo $cur_total_property_amount; ?></label>
															</div>
														</div>	
														<div class="row mt-4">
															<div class="col-lg-7">
																<div class="row">
																	<div class="col-lg-5 mt-4">
																		<div class="row">
																			<div class="col-lg-3">
																				<span>
																				<i class="fa fa-user fs-6" aria-hidden="true" title="Last Name"></i>
																				</span>
																			</div>
																			<div class="col-lg-9">
																				<span class="col-form-label fw-bold fs-6" name="last_name" id="last_name"><?php if(isset($party_details->NAME)){
																					$lastname=$party_details->LASTNAME_PREFIX.', '.$party_details->FATHERSNAME;
																						echo $lastname; }
																						?>
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
																				<span class="col-form-label fw-bold fs-6" name="mobile" id="mobile"><?php if(isset($party_details->NAME)){echo $party_details->PHONE; }?></span> 
																			</div>
																		</div>
																	</div>
																	<div class="col-lg-5">
																		<div class="row">
																			<div class="col-lg-3">
																				<label class="col-form-label fw-semibold fs-6">Rating</label>
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
																	<div class="col-lg-5">
																		<div class="row mt-3">
																			<div class="col-lg-2">
																				<span>
																					<i class="fa-solid fa-location-dot fs-6" aria-hidden="true" title="Address"></i>
																				</span>
																			</div>
																			<div class="col-lg-10">
																				<span class="col-form-label fw-bold fs-6" name="address" id=""><?php if(isset($party_details->NAME)){
																			$address=$party_details->ADDRESS1.', '.$party_details->ADDRESS2.', '.$party_details->CITY;
																			echo $address; }
																			?></span>
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
																		&emsp;<label class="col-form-label fw-bold fs-6" title="Reference Name" id="refname"><?php echo $edit_details->ref_name ; ?></label>
																	</div>
																</div>
															</div>
															<div class="col-lg-3" title="Purchase Party">
																<div class="row">
																	<div class="col-lg-1 fv-row">
																		<i class="fa fa-user fs-3 mt-3"></i>
																    </div>
																    <div class="col-lg-10 fv-row">
																		&emsp;<label class="col-form-label fw-bold fs-6" id="party_name"><?php echo $pur_party_details->party_name ; ?></label>
																	</div>
																</div>
															</div>
															<div class="col-lg-3" title="Property type">
																<div class="row">
																	<div class="col-lg-2 fv-row">
																		<i class="fas fa-laptop-house fs-3 mt-4" title="Property Type"></i>
																    </div>
																    <div class="col-lg-10 fv-row">
																		<label class="col-form-label fw-bold fs-6" title="Property Type" id="property_type"><?php echo $edit_details->property_type ; ?></label>
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
																			<label class="col-form-label fs-6 fw-bold" title="Number of Plot Area" id="ploat_no"><?php echo $pur_party_details->ploat_no ; ?></label>&emsp;
																			<i 	class="fas fa-layer-group fs-6" title="Type Plot Area"></i>&nbsp;
																			<label class="col-form-label fw-bold fs-6" title="Total of Plot Area" id="ploat_type"><?php echo $pur_party_details->ploat_type ; ?></label>&emsp;
																			<i class="fas fa-money-bill-wave fs-6" title="Total Price of Plot Area"></i>&nbsp;
																			<label class="col-form-label fw-bold fs-6" title="Total Price of Plot Area" id="pro_amount"><?php echo $pur_party_details->pro_amount ; ?></label>
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
																		&emsp;<label class="col-form-label fw-bold fs-6" id="Latitude"><?php echo $edit_details->lattitude ; ?></label>&nbsp;
																		<label class="col-form-label fw-bold fs-6" id="Longtitude"><?php echo $edit_details->longtitude ; ?></label>
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
																		&emsp;<label class="col-form-label fw-bold fs-6" id="total_property_amount"><?php echo $edit_details->total_property_amount ; ?></label>
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
																			<label class="col-form-label fw-bold fs-6" id="amenitites"><?php $values= json_decode($edit_details->amenities); foreach ($values as  $val) {?> <?php } ?><?php echo $val; ?> </label>&emsp;
																	</div>
																</div>
															</div>
														   <div class="col-lg-3 col-form-label" title="Address">
															   	<div class="row">
																       <div class="col-lg-1">
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
																       <div class="col-lg-11">
																       		<label class="fw-bold fs-6"><?php echo $edit_details->street; ?>,</label>
																			<label class="fw-bold fs-6">&nbsp;<?php echo $edit_details->area;   ?>,</label>
																			<label class="fw-bold fs-6">&nbsp;<?php echo $edit_details->city;   ?>,</label>
																			<label class="fw-bold fs-6">&nbsp;<?php echo $edit_details->pincode;   ?>,</label>
																			<label class="fw-bold fs-6">&nbsp;<?php echo $edit_details->state; ?>.</label>
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
																		<label class="col-form-label fw-bold fs-6" id="description"><?php echo $edit_details->description; ?></label>
																	</div>
																</div>
															</div>
														</div>
														<div class="row">
															<div class="row mt-6 text-start">
																<label class="col-lg-2 col-form-label fw-semibold fs-6 ">Agent Counts</label>
														    	<label class="col-lg-2 col-form-label fw-bold fs-3 " name="agent_count" id="agent_count"><?php echo $edit_details? $edit_details->agent_name1 : '0'; ?></label>
		                                                        <label class="col-lg-3 col-form-label fw-semibold fs-6">Agent Amounts</label>
															    <label class="col-lg-2 col-form-label fw-bold fs-3 " name="agent_tot_amt" id="agent_tot_amt"><?php echo $edit_details->agent_amt1; ?></label>
															    <input type="hidden" name="agent_count_hidden" id="agent_count_hidden" value="<?php echo $edit_details->agent_name1; ?>">
																<input type="hidden" name="agent_tot_amt_hidden" id="agent_tot_amt_hidden" name="<?php echo $edit_details->agent_amt1; ?>">
															    <div class="col-lg-3">
															    	<div class="d-flex justify-content-end ">
																	<button type="button" class="btn btn-primary" data-bs-toggle="modal"data-bs-target="#kt_modal_agent">Edit Agents</button>
																	</div>
															    </div>
														    </div>

														    <?php foreach($agents_details as $i=> $aview){ ?> 

														    <input type="hidden" name="agent_name_hid[]" id="agent_name_hid<?php echo $i;?>" >

														    <input type="hidden" name="agent_amt_hid[]"  id="agent_amt_hid<?php echo $i+1;?>" value="<?php echo $aview['amount']; ?>" onchange="pay_to_property_calc(<?php echo $i;?>)">
														    
														    <input type="hidden" name="agents_id_hidden[]" id="agents_id_hidden" value="<?php echo $aview['id']; ?>">
														    
														    <?php } ?>
													    </div>
														<div class="row">
															<label class="col-lg-3 required col-form-label fs-6	 fw-semibold">Sale Price Per Plot Area</label>
															<div class="col-lg-2 fv-row fv-plugins-icon-container">
																<input type="text" name="prop_price_spa" id="prop_price_spa" class="form-control form-control-lg form-control-solid" placeholder="Price" value="<?php echo $edit_details->price_per_ploat; ?>" title="Enter Your Per Plot Area Amount" onkeyup="pay_to_property_calc()" oninput="this.value = this.value.replace(/[^/0-9.]/g, '').replace(/(\..*)\./g, '$1'); " >
																<div class="fv-plugins-message-container invalid-feedback" id="prop_price_spa_err"></div>
															</div>
															<div class="col-lg-1 fv-row fv-plugins-icon-container">
																<input type="text" name="prop_spa_no" id="prop_spa_no" class="form-control form-control-lg form-control-solid" placeholder="No." value="<?php echo $edit_details->ploat_no; ?>" title="Enter Your Number of Count" onkeyup="pay_to_property_calc()" oninput="this.value = this.value.replace(/[^/0-9.]/g, '').replace(/(\..*)\./g, '$1'); ">
																<div class="fv-plugins-message-container invalid-feedback" id="prop_spa_no_err"></div>
															</div>
															<div class="col-lg-2">
																<select class="form-select form-select-solid" data-control="select2" data-hide-search="true" title="Select Your Plot Area Type" name="prop_spa_type" id="prop_spa_type">
																<option value="<?php echo $edit_details->ploat_type ; ?>">Type</option>
																<option value="Cent"<?php echo $edit_details->ploat_type == "Cent"?'selected':''; ?>>Cent</option>
																<option value="Acre"<?php echo $edit_details->ploat_type == "Acre"?'selected':''; ?>>Acre</option>
																<option value="Sq.ft"<?php echo $edit_details->ploat_type == "Sq.ft"?'selected':''; ?>>Sq.ft</option>
															</select>
															<div class="fv-plugins-message-container invalid-feedback" id="prop_spa_type_err"></div>
															</div>
															<div class="col-lg-4" title="Sale Amount">
																<label>
																	<i class="fas fa-money-bill-alt fs-3"></i>&emsp;
																</label>
																<label class="col-form-label fw-bold fs-3" id="lbl_total_amt" onkeyup="pay_to_property_calc()"><?php echo $edit_details->pro_amount;  ?></label>
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
													</div>
													<div class="col-lg-6 mt-4">
														<label class="col-form-label required fw-semibold fs-6">Registeration Documents</label>
														<div class="container my-4">
															<input type="file" id="reg_doc_mul" name="reg_doc_mul[]" multiple>
														</div>
													</div>
												</div>
												<div class="row mt-4">
													<div class="col-lg-6">
														<label class="col-form-label required fw-semibold fs-6">Others</label>
														<div class="container my-4">
															<input type="file" id="others_mul_img" name="others_mul_img[]" multiple>
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
												<div class="col-lg-3 text-center">
													<label class="col-form-label fw-bold fs-4">Net Amount &emsp;</label>
													<label class="col-form-label fw-bold fs-3" id="lbl_total_amt_lab_2"><?php echo $edit_details->total_property_amount; ?></label>
												</div>
												<div class="col-lg-3 text-center">
													<label class="col-form-label fw-bold fs-4">Paid Amount &emsp;</label>
													<label class="col-form-label fw-bold fs-3" id="paid_amount_lab"><?php echo $edit_details->paid_amount; ?></label>
												</div>
												<div class="col-lg-3 text-center">
													<label class="col-form-label fw-bold fs-4">Balance Amount &emsp;</label>
													<label class="col-form-label fw-bold fs-3" id="lbl_bal_amt"><?php echo $edit_details->balance_amount; ?></label>
												</div>
											</div>
												<div class="d-flex justify-content-end">
													<button type="reset" class="btn btn-secondary me-3" data-bs-dismiss="modal">Cancel</button>
													<button type="submit" class="btn btn-primary" id="save_changes_add_product">Sale</button>
												</div>
												<div class="row">
													
													<input type="hidden" name="paid_amount" id="paid_amount" value="<?php echo $edit_details->paid_amount?>">
													<input type="hidden" name="balance_amount_hidden" id="balance_amount_hidden"  value="<?php echo $edit_details->balance_amount?>">
													<input type="hidden" name="total_prop_amt_hidden" id="total_prop_amt_hidden" value="<?php echo $edit_details->total_property_amount?>">

													<input type="hidden" name="prop_amt_hidden" id="prop_amt_hidden">
												</div>
												<script>
												 	function pay_to_property_calc(id){
												 		// alert(id)
												 		
										                var plot_input=parseFloat($('#ploat_no').html());
												 		var cur_plot=parseFloat($('#cur_ploat_no').html());
												 		var plot = plot_input -  cur_plot;
															
														if ($('#prop_spa_no').val() > plot){
														    // alert("Enter Count is Exceed ");
														    Swal.fire({
																					title: 'Error!',
																					text: 'Please Check The Enter Count is Exceed..!',
																					icon: 'error',
																					confirmButtonText: 'Okay'
																					});
														    $('#prop_spa_no').val('');
														  }
														  else{

												 		if(amt=='') amt=0;

														var name=$('#agent_names'+id).val();
														var amt=parseFloat($('#agent_amount'+id).val());


														$('#agent_count').html(id);
														$('#agent_count_hidden').val(id);
														$('#agent_name_hid'+id).val(name);
														$('#agent_amt_hid'+id).val(amt);

														var tot_amount=0;

														var count=<?php echo count($agents_details) ?>;


														for(var i=1; i<=count; i++){

														 var agent_amount_get=$('#agent_amount'+i).val();
														 tot_amount += parseFloat(agent_amount_get);
														}
														// alert(agent_amount_get);

														$('#agent_tot_amt').html(tot_amount);
														$('#agent_tot_amt_hidden').val(tot_amount);

														var price=parseFloat($('#prop_price_spa').val());
														var count=parseFloat($('#prop_spa_no').val());
														var ag_toatl_amount =parseFloat($('#agent_tot_amt_hidden').val());

														if(ag_toatl_amount=='') ag_toatl_amount=0;
														
														if(price=='') price=0;
														if(count=='') count=0;

														var tot_amt = price * count;
														var total_price = tot_amt + ag_toatl_amount;
														$('#lbl_total_amt').html(tot_amt);
														$('#prop_amt_hidden').val(tot_amt);

														if(ag_toatl_amount>0)
														    {
														        $('#lbl_total_amt_lab_2').html(total_price);
														    	$('#total_prop_amt_hidden').val(total_price);
														    }
														    else
														    {
														       
																$('#lbl_total_amt_lab_2').html(tot_amt);
																$('#total_prop_amt_hidden').val(total_price);
																
														    }
														// $('#lbl_total_amt_lab_2').html(tot_amt);

														var cash=parseFloat($('#cashamount').val());
														// alert (cash);

														var cheque=parseFloat($('#chequeamount').val());
														var upi=parseFloat($('#upiamount').val());

														var rc_tot=parseFloat($('#lbl_total_amt_lab_2').html());
														if(cash=='') cash=0;
														if(cheque=='') cheque=0;
														if(upi=='') upi=0;
														// alert(c);
														var tot= cash+cheque+upi;
														// alert(tot);
														$('#lbl_paid_amt').html(tot);
														$('#paid_amount').val(tot);
														$('#paid_amount_lab').html(tot);

															var diff= rc_tot - parseFloat(tot);
															$('#lbl_bal_amt').html(diff);
															$('#balance_amount_hidden').val(diff);
												            }
														}
											    </script>
											</form>
										</div>
									</div>
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


																	 <?php foreach($agents_details as $a=> $aview){ 
																	 	// print_r($aview['id']); 
																	 	 ?> 
															 		
																    	<tr>
																    		<td><?php echo $a+1;?></td>
																    		<td>
																    		    <div class="d-flex justify-content-center fv-row fv-plugins-icon-container">

																    		    	<label  type="text" class="col-form-label fw-semibold fs-5"    name="agent_names[]" id="agent_names<?php echo $a+1;?>">    <?php echo $aview['agent_name']; ?>
																    		    	</label>
																    		    	
														                        
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
																				 <!-- <?php for($i=1;$i<=10;$i++) { ?> 
																					    	<tr>
																					    		<td><?php echo $i;?></td>
																					    		<td>

																					    		    <div class="d-flex justify-content-center fv-row fv-plugins-icon-container">
																			                         <input type="text" class="col-lg-4 form-control form-control-lg form-control-solid"  placeholder="Enter Name"  name="agent_names[]" id="agent_names<?php echo $i;?>"  style="width:200px !important;" onkeyup="pay_to_property_calc(<?php echo $i; ?>)" oninput="this.value = this.value.replace(/[^A-Za-z/0-9.]/g, '').replace(/(\..*)\./g, '$1');">
																			                        </div>
																					    		</td>
																					    		<td>
																					    			<div class="d-flex justify-content-center fv-row fv-plugins-icon-container">
																					    			 <input type="text" class="col-lg-4 form-control form-control-lg form-control-solid" value="0"   name="agent_amount[]" id="agent_amount<?php echo $i;?>" style=" text-align: right; width: 200px !important;" placeholder="Amount" onkeyup="pay_to_property_calc(<?php echo $i; ?>)" oninput="this.value = this.value.replace(/[^/0-9.]/g, '').replace(/(\..*)\./g, '$1');">
																					    			

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
																		<p type="text" data-bs-dismiss="modal"  class="btn btn-primary"  onclick="()">Add</p>
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
	                if(suggestion.rating==3){
	                	r='<i class="fa-solid fa-star" style="color:red;"></i>&nbsp;Bad';	
	                }
	                else if(suggestion.rating==2){
	                	r='<i class="fa-solid fa-star" style="color:#ffc700;"></i>&nbsp;Average';	
	                }
	                else if(suggestion.rating==1){
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
				var dateval       = $('#kt_daterangepicker_pro_sale_add_date').val();
				var party         = $('#prop_party').val();
				var prop_price_spa = $('#prop_price_spa').val();
				var prop_spa_no         = $('#prop_spa_no').val();
				var prop_spa_type          = $('#prop_spa_type').val();
				var property_id_ac          = $('#property_id_ac').val();
				var cash_amt = $('#cashamount').val();
				var upi_amt = $('#upiamount').val();
				var cheque_amt = $('#chequeamount').val();
 				 if((cash_amt<=0) && (upi_amt<=0) && (cheque_amt<=0))
				{

				$('#payment_err').html('Please select Any one of the payment mode !');
				err++;

				}
				else
				{
					$('#payment_err').html('');
				}
		

				if(prop_spa_no.trim()=='')
			    {
			        $('#prop_spa_no_err').html('Enter No of Count !');
			        err++;
			    }
			    else
			    {
			       
					$('#prop_spa_no_err').html('');
					
			    }
			    if(property_id_ac=='0')
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

			    if(prop_price_spa.trim()=='')
			    {
			        $('#prop_price_spa_err').html('Enter Sale Price Per Plot !');
			        err++;
			    }
			    else
			    {
			       
					$('#prop_price_spa_err').html('');
					
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
				$('#ploat_type').html(resp[26]);
				$('#total_property_amount').html(resp[27]);
				$('#cur_ploat_no').html(resp[28]);
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

				$('#amenitites_hidden').val(11);
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



				// $('#refname_hidden').val(resp[1]);
				// $('#refname_hidden_property').val(resp[2]);
				// $('#property_type_hidden').val(resp[3]);
				// $('#ploat_areano_hidden').val(resp[3]);
				// $('#ploat_areatype_hidden').val(resp[4]);
				// $('#price_per_ploat_hidden').val(resp[5]);
				// $('#street_hidden').val(resp[6]);
				// $('#area_hidden').val(resp[7]);
				// $('#city_hidden').val(resp[8]);
				// $('#state_hidden').val(resp[9]);
				$('#amenitites_hidden').val(resp[11]);
				// $('#Latitude_hidden').val(resp[11]);
				// $('#Longtitude_hidden').val(resp[12]);
				// $('#description_hidden').val(resp[13]);
				// $('#pro_amount_hidden').val(resp[14]);
				// $('#agent_name_hidden').val(resp[15]);
				// $('#agent_amt_hidden').val(resp[16]);
				// $('#agent_name2_hidden').val(resp[17]);
				// $('#agent_amt2_hidden').val(resp[18]);
				// $('#agent_name3_hidden').val(resp[19]);
				// $('#agent_amt3_hidden').val(resp[20]);
				// $('#agent_name4_hidden').val(resp[21]);
				// $('#agent_amt4_hidden').val(resp[22]);
				// $('#vao_group_hidden').val(resp[23]);
				// $('#register_office_hidden').val(resp[24]);
				// $('#property_type_hidden').val(resp[25]);
				// $('#servey_no_hidden').val(resp[26]);
				// $('#partental_dno_hidden').val(resp[27]);
				// $('#document_curno_hidden').val(resp[28]);
				// $('#patta_no_hidden').val(resp[29]);
				// $('#ploat_no_hidden').val(resp[30]);
				// $('#ploat_type_hidden').val(resp[31]);
				
				

			}
			});

		}

		
		
			    </script>

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
		$("#kt_daterangepicker_pro_sale_add_date").flatpickr({
						dateFormat: "d-m-Y",
					});
		</script>
	</body>
	<!--end::Body-->
</html>