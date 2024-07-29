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
									<h1 class="d-flex align-items-center text-dark fw-bold my-1 fs-3">New MRI Redemption
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
					<?php 
				//echo "<pre>";
					//print_r($mri_data[0]['PID']);
					//	echo "</pre>";exit;
					?>
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
											<div class="row">
												<div class="col-lg-6">
													<div class="px-4" style="border-radius: 10px;padding-bottom: 20px;box-shadow: 0 5px 10px #00002947;">
														<div class="row">
															<label class="col-lg-6 col-form-label fw-bold fs-5 text-end">Loan Information</label>
															<label class="col-lg-6 col-form-label fw-bold fs-3">
																<span class="me-1 ms-1">[</span>
																<span class="me-1 text-primary"><?php echo $mri_data[0]['CCL_BILLNO']; ?></span>

																<input type="hidden" name="cclbillno_mri" id="cclbillno_mri" value="<?php echo $mri_data[0]['CCL_BILLNO']; ?>">

																<input type="hidden" name="pidval" id="pidval" value="<?php echo $mri_data[0]['PID']; ?>">
																<span>]</span>
															</label>
														</div>
														<div class="row">
															<label class="col-lg-2 col-form-label required fw-semibold fs-6">Bill No</label>
															<div class="col-lg-4 fv-row fv-plugins-icon-container">
																<input type="text" name="mribillnumberval" class="form-control form-control-lg form-control-solid" placeholder="Enter Bill No" id="mribillnumberval" value="<?php echo $mri_data[0]['BILLNO']; ?>">
																<div class="fv-plugins-message-container invalid-feedback" id=""></div>
															</div>
															<label class="col-lg-2 col-form-label required fw-semibold fs-6">Date</label>
															<div class="col-lg-4 fv-row">
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
															<div class="col-lg-2">
																<label class="col-form-label required fw-semibold fs-6">Company</label>	
															</div>
															<div class="col-lg-4">
																<select class="form-select form-select-solid" name="company" id="company" data-control="select2" data-hide-search="true">	
																	<option value="">Select</option>
																	<?php 
																				foreach ($company_list as $ilist) {
																			?>
																				<option value="<?php echo $ilist['COMPANYCODE']; ?>"><?php echo $ilist['COMPANYNAME']; ?></option>
																				<?php
																			}?>
																</select>
															</div>
															<div class="col-lg-2">
																<?php
																	if($mri_data[0]['ACTIVE']=='Y')
																	{
																?>	
																	<label class="col-form-label fw-bold fs-5 bg-success mt-2" style="border-radius: 8px;padding: 5px 10px 5px 10px;">ACTIVE</label>
																<?php
																	}
																	else{

																		?>
																			<label class="col-form-label fw-bold fs-5 bg-success mt-2" style="border-radius: 8px;padding: 5px 10px 5px 10px;">CLOSE</label>
																		<?php
																	}
																?>
															
																<!-- <label class="col-form-label fw-bold fs-5 bg-success mt-2" style="border-radius: 8px; background-color: red !important;padding: 5px 10px 5px 10px;">Closed</label> -->
															</div>
															<div class="col-lg-4">
																<?php

																	$endate = $mri_data[0]['ENDATE'];
							                    $sd = $endate.' '.'00:00:00';
							                    $e = date("Y-m-d");
							                    $ed = $e.' '.'00:00:00';

							                    $start = new DateTime($sd);
							                    $end = new DateTime($ed);
							                    $diff = $start->diff($end);

							                    $yearsInMonths = $diff->format('%r%y') * 12;
							                    $months = $diff->format('%r%m');
							                    $days = $diff->format('%r%d');
							                    $totalMonths = $yearsInMonths + $months;
							                    $months1 = $totalMonths;
							                    $days1 = $days;
																?>
																<label class="col-form-label fw-bold fs-6 mt-1"><?php echo $months1; ?> Month <?php echo $days1; ?> Days</label>
															</div>
															<label class="col-lg-2 col-form-label fw-semibold fs-6">Int Type</label>
															<label class="col-lg-4 col-form-label fw-bold fs-6" id="mriloanint_type"><?php echo $mri_data[0]['INTERESTTYPE']; ?></label>
															<input type="hidden" id="mriinttypeval" name="mriinttypeval" value="<?php echo $mri_data[0]['INTERESTTYPE']; ?>"/>
															<label class="col-lg-2 col-form-label fw-semibold fs-6">MRI Date</label>
															<label class="col-lg-4 col-form-label fw-bold fs-6" id="mri_endate"><?php echo $mri_data[0]['ENDATE']; ?></label>
															<input type="hidden" id="mri_endateval" name="mri_endateval" value="<?php echo $mri_data[0]['ENDATE']; ?>" />
														</div>
														<div class="row">
															<div class="col-lg-3 fv-row">
																<div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url(assets/media/svg/avatars/signature_blank.png)">

																	<div class="image-input-wrapper"  style="background-image: url(assets/images/Jewel.jpg)">
																		
																		<?php 
																		if($party_details->PHOTO!="")
																		{
																			?>
																				<div class="image-input-wrapper"  style="background-image: url(<?php echo base_url();?>assets/images/jewel.jpg)"></div>
																			<?php

																		}
																		else{
																			?>
																			<div class="image-input-wrapper"  style="background-image: url(<?php echo base_url();?>assets/images/jewel.jpg)"></div>
																			<?php
																		}

																		?>
																	</div>
																</div>
															</div>
															<div class="col-lg-9">
																<div class="row">
																			<div class="col-lg-4">
																		<label class="col-form-label"><i class="fas fa-money-bill-wave fs-4"></i>&emsp;</span></label>
																		<label class="col-form-label fw-bold fs-2"><?php echo $mri_data[0]['AMOUNT']; ?></label>
																		<input type="hidden" id="mriloanamount" name="mriloanamount" value="<?php echo $mri_data[0]['AMOUNT']; ?>">
																	</div>
																	<div class="col-lg-6">
																	
																		<label class="col-form-label fw-bold fs-4">PAID:<?php echo $mri_data[0]['MRI_AMOUNT']; ?></label>
																		<input type="hidden" id="paidamountvalmri" name="paidamountvalmri" value="<?php echo $mri_data[0]['MRI_AMOUNT']; ?>" />
																	</div>
																	<div class="col-lg-7">
																	
																		<?php
																			$mritotamt = $mri_data[0]['AMOUNT'];
																			$mripayamt = $mri_data[0]['MRI_AMOUNT'];
																			$balmriamt = $mritotamt - $mripayamt;
																		?>
																		<label class="col-form-label fw-bold fs-3">Balance : <?php echo $balmriamt; ?></label>
																		<input type="hidden" id="Balanceamountval" id="Balanceamountval" value="<?php echo $balmriamt; ?>"/>
																	</div>
																	<div class="col-lg-6 col-form-label">
																		<label class="fw-semibold fs-6 me-3">Renewal No</label>
																		<label class="fw-bold fs-6 d-block">
																			<span class="badge badge-info">-</span>
																		</label>
																	</div>
																	<div class="col-lg-6 col-form-label">
																		<label class="fw-semibold fs-6 me-3">Original Loan No</label>
																		<label class="fw-bold fs-6 d-block">
																			<span class="badge badge-primary text-black">MIP-233/21</span>
																		</label>
																	</div>
																</div>
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
																		<span class="me-2" title="Last Name"><?php echo $party_details->NAME; ?></span>
																		<a href="javascript:;" title="View Party">
																			<i class="fa-solid fa-binoculars fs-3"></i>
																		</a>
																	</label>
																	<label class="col-lg-12 col-form-label fw-bold fs-6" title="Address">
																		<span class="me-2">
																			<i class="fa-solid fa-location-dot fs-6" aria-hidden="true"></i>
																		</span>
																		<span><?php echo $party_details->ADDRESS1; ?>,<?php echo $party_details->ADDRESS2; ?> </span>
																	</label>
																	<label class="col-lg-6 col-form-label fw-bold fs-6">
																		<span class="me-2" title="Mobile">
																			<i class="fas fa-mobile-android-alt fs-6" aria-hidden="true"></i>
																		</span>
																		<span class="me-2"><?php echo $party_details->PHONE; ?></span>
																	</label>

																</div>
															</div>

															<div class="col-lg-6">
																<div class="row">
																	<label class="col-lg-12 col-form-label fw-semibold fs-6" title="Nominee">
																		<span class="me-2">
																			<i class="fas fa-user-friends fs-5"></i>
																		</span>
																		<span><?php echo $party_details->NOMINEE; ?></span>
																	</label>
																	<label class="col-lg-12 col-form-label fw-semibold fs-6" title="Nominee Relation">
																		<span class="me-2">
																			<i class="fa-solid fa-people-arrows fs-3"></i>
																		</span>
																		<span><?php echo $party_details->RELATION; ?></span>
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
															<br/>
																
														<div class="row mb-4 mt-1">
															<div class="col-lg-4 fv-row">

																	<?php 
																		if($party_details->PHOTO!="")
																		{
																			?>
																				<div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url(assets/media/svg/avatars/blank.svg)">
																							<img class="image-input-wrapper"  src="data:image/jpeg;base64,<?php echo base64_encode($party_details->PHOTO); ?>" height="125px" width="125px" >
																	</div>
																			
																			<?php

																		}
																		else{
																			?>
																			<div class="image-input-wrapper"  style="background-image: url(<?php echo base_url();?>assets/images/Party.jpg)"></div>
																			<?php
																		}

																		?>
															
															</div>
															<div class="col-lg-4 fv-row">
															<?php 
																		if($party_details->OTHER_PHOTO!="")
																		{
																			?>
																				<div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url(assets/media/svg/avatars/blank.svg)">
																							<img class="image-input-wrapper"  src="data:image/jpeg;base64,<?php echo base64_encode($party_details->OTHER_PHOTO); ?>" height="125px" width="125px" >
																	</div>
																			
																			<?php

																		}
																		else{
																			?>
																			<div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url(assets/media/svg/avatars/blank.svg)">
																							<img class="image-input-wrapper"  src="<?php echo base_url();?>assets/images/signature.jpg" height="125px" width="125px" >
																	</div>
																			<?php
																		}

																		?>
															</div>
															<div class="col-lg-4 fv-row">
																<?php 
																		if($party_details->OTHER_PHOTO!="")
																		{
																			?>

																			
																					<div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url(assets/media/svg/avatars/blank.svg)">
																							<img class="image-input-wrapper"  src="<?php echo base_url();?>assets/images/Party_Proof.jpg" height="125px" width="125px" >
																	</div>
																			
																			<?php

																		}
																		else{
																			?>
																			<div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url(assets/media/svg/avatars/blank.svg)">
																							<img class="image-input-wrapper"  src="<?php echo base_url();?>assets/images/Party_Proof.jpg" height="125px" width="125px" >
																	</div>
																			<?php
																		}

																		?>
															
															</div>
														</div>
													</div>
												</div>
											</div>
											<div class="row mt-4">
												<div class="col-lg-12">
														<div class="row">
															<div class="col-lg-2 mt-4">
																<div class="d-flex align-items-center mt-1">
																	<label class="form-check form-check-inline form-check-solid me-1 is-invalid">
																		<input class=" form-check-input" name="mri_redemp_radio" type="radio" value="mri_redp_c_val" id="mri_redp_c_val">
																	</label>
																	<label class=" col-form-label fw-semibold fs-6" style="background-color:#ffdf6f;border-radius: 8px;padding: 5px 5px 5px 5px;">Closing</label>
																</div>
															</div>
															<div class="col-lg-2 mt-4">
																<div class="d-flex align-items-center mt-1">
																	<label class="form-check form-check-inline form-check-solid me-1 is-invalid">
																		<input class=" form-check-input" name="mri_redemp_radio" type="radio" value="mri_redp_t_val" id="mri_redp_t_val">
																	</label>
																	<label class=" col-form-label fw-semibold fs-6" style="background-color:#fed4df;border-radius: 8px;padding: 5px 5px 5px 5px;">Transfer</label>
																</div>
															</div>
														</div>
														<div class="row mt-4">
															<div class="col-lg-4">
																<div class="px-4" style="border-radius: 10px;padding-bottom: 10px;box-shadow: 0 5px 10px #00002947;">
																	<div class="row">
																		<label class="col-lg-6 col-form-label fw-semibold fs-6">Form Missing</label>
																		<div class="col-lg-6 fv-row fv-plugins-icon-container">
																			<input type="text" name="formchargeval" id="formchargeval" class="form-control form-control-lg1 form-control-solid" placeholder="Enter Form Misssing" value="0.00" onchange="calculatemrinetpay();">
																			<div class="fv-plugins-message-container invalid-feedback"></div>
																		</div>
																		<label class="col-lg-6 col-form-label fw-semibold fs-6">Notice Charge</label>
																		<div class="col-lg-6 fv-row fv-plugins-icon-container">
																			<input type="text" name="noticechargeval" id="noticechargeval" class="form-control form-control-lg1 form-control-solid" placeholder="Enter Notice Charge" value="0.00" onchange="calculatemrinetpay();">
																			<div class="fv-plugins-message-container invalid-feedback"></div>
																		</div>
																		<label class="col-lg-6 col-form-label fw-semibold fs-6">Discount</label>
																		<div class="col-lg-6 fv-row fv-plugins-icon-container">
																			<input type="text" name="discountval" id="discountval" class="form-control form-control-lg1 form-control-solid" placeholder="Enter Discount" value="0.00" onchange="calculatemrinetpay();">
																			<div class="fv-plugins-message-container invalid-feedback"></div>
																		</div>
																		<div class="col-lg-12 col-form-label text-center">
																			<label class="fw-bold fs-3 me-4">Total Amount</label>
																			<label class="d-block fw-bold fs-3" id="totalnetmriamount">0.00</label>
																			<input type="hidden" name="totalnetmriamountval" id="totalnetmriamountval" value=""/>
																		</div>
																	</div>
																</div>
															</div>
															<div class="col-lg-4">
																<div class="px-4" style="border-radius: 10px;padding-bottom: 10px;box-shadow: 0 5px 10px #00002947;">
																	<div class="row">
																		<label class="col-lg-6 col-form-label fw-semibold fs-6">Net Pay</label>
																		<label class="col-lg-6 col-form-label fw-bold fs-4" id="netamountmri">0.00</label>
																		<input type="hidden" id="netamountmrivalue" name="netamountmrivalue" value=""/>
																		<label class="col-lg-6 col-form-label required fw-semibold fs-6">Received Cash</label>
																		<div class="col-lg-6 fv-row fv-plugins-icon-container">
																			<input type="text" name="paymaribalanceamount" id="paymaribalanceamount" class="form-control form-control-lg1 form-control-solid" placeholder="Enter Received Cash" value="0.00" onchange="balancemriredemptionamtcal();">
																			<div class="fv-plugins-message-container invalid-feedback"></div>
																		</div>
																		<label class="col-lg-6 col-form-label required fw-semibold fs-6" id="mri_redemp_ln_amt_label" style="visibility:hidden;">New Loan Amount</label>
																		<div class="col-lg-6 fv-row fv-plugins-icon-container" id="mri_redemp_ln_amt_tbox" style="visibility:hidden;">
																			<input type="text" name="" id="" class="form-control form-control-lg1 form-control-solid" placeholder="Enter New Loan Amount" value="0.00">
																			<div class="fv-plugins-message-container invalid-feedback"></div>
																		</div>
																		<div class="col-lg-12 col-form-label text-center">
																			<label class="fw-bold fs-3 me-4">Total Balance Amount</label>
																			<label class="d-block fw-bold fs-3" id="totalmriredemptionbalamt">0.00</label>
																			<input type="hidden" id="totalmriredemptionbalamtval" name="totalmriredemptionbalamtval" value=""/>
																		</div>
																	</div>
																</div>
															</div>
															<div class="col-lg-4">
																<div class="px-4" style="border-radius: 10px;padding-bottom: 10px;box-shadow: 0 5px 10px #00002947;min-height: 222px !important;max-height: 222px !important;">
																	<div class="row">
																		<label class="col-lg-12 col-form-label fw-semibold fs-6">Remarks</label>
																			<textarea class="form-control form-select-solid fw-semibold fs-5" rows="1" name="remarks" id="remarks" style="width: 400px;height: 170px;"><?php echo $mri_data[0]['REMARKS']; ?></textarea>
																			<input type="hidden" id="remarksvalue" name="remarksvalue" value="" />
																			<div class="fv-plugins-message-container invalid-feedback" id="remarks_err"></div>
																		
																	</div>
																</div>
															</div>
														</div>
												</div>
											</div>
											<div class="d-flex justify-content-end align-items-center pt-6">
												<button type="reset" class="btn btn-secondary me-2" data-bs-dismiss="modal">Cancel</button>
												<button type="submit" class="btn btn-primary" id="submit" onclick="mriredemptionfunction();">Submit</button>
												<button type="submit" class="btn btn-primary" id="newmri" style="display:none;"  onclick="newmriloansave();">New MRI</button>
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
	<?php $this->load->view("script"); ?>
		<script src="<?php echo base_url();?>assets/jquery.autocomplete.js"></script>
			<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
		<script src="<?php echo base_url();?>assets/jquery.autocomplete.js"></script>
		<script>
				var baseurl= $("#baseurl").val();
			var mri_redemp_ln_amt_label = document.getElementById("mri_redemp_ln_amt_label");
			var mri_redemp_ln_amt_tbox = document.getElementById("mri_redemp_ln_amt_tbox");
			

			$('input:radio[name="mri_redemp_radio"]').change(function() {
		        if ($(this).val()=='mri_redp_c_val') 
		        {
		            mri_redemp_ln_amt_label.style.visibility = "hidden";
		            mri_redemp_ln_amt_tbox.style.visibility="hidden";  
		            $('#submit').show();
		              $('#newmri').hide();
		        } 
		        else
		        {
		        		mri_redemp_ln_amt_label.style.visibility = "visible";
		            mri_redemp_ln_amt_tbox.style.visibility="visible";
		             $('#submit').hide();
		              $('#newmri').show();
		             
		        }
		       });
		</script>
		<script>
			function calculatemrinetpay()
			{
				  var mribalanceloanamount = $('#Balanceamountval').val();
					var formcharge      			= $('#formchargeval').val();
					var noticechargeval 			= $('#noticechargeval').val();
					var discountval  					= $('#discountval').val();

					var totalmriamount =  parseInt(formcharge) + parseInt(noticechargeval);

					var finalmriamt = parseInt(mribalanceloanamount) + parseInt(totalmriamount);

					var finalmriloanamountval = parseInt(finalmriamt) - parseInt(discountval);

					$('#totalnetmriamount').html(finalmriloanamountval);
					$('#totalnetmriamountval').val(finalmriloanamountval);

					$('#netamountmri').html(finalmriloanamountval);
					$('#netamountmrivalue').val(finalmriloanamountval);
			}
			function balancemriredemptionamtcal()
			{
					var mrinetamount = $('#netamountmrivalue').val();
					var paymaribalanceamount = $('#paymaribalanceamount').val();

					var total = parseInt(mrinetamount) - parseInt(paymaribalanceamount);
					$('#totalmriredemptionbalamt').html(total);
					$('#totalmriredemptionbalamtval').val(total);
			}
			function mriredemptionfunction()
			{
					//alert('babu'); 
					if($('#mri_redp_c_val').prop('checked'))
					{
					  	status ='1';

					}
					else if($('#mri_redp_t_val').prop('checked'))
					{

							status = '2';
					}
					else
					{

							status = '0';
					}
					if(status='1')
					{

							var paymentvalue = $('#paymaribalanceamount').val();
							if(paymentvalue >0)
							{



							var totttt = $('#totalmriredemptionbalamtval').val();
							//alert(totttt);
							if(totttt>0)
							{
									Swal.fire({
											title: 'error!',
											text: 'please paid Net amount only..!',
											icon: 'error',
											confirmButtonText: 'Okay'
									})
									return false;
							}
							if(totttt<0)
							{
									Swal.fire({
											title: 'error!',
											text: 'please paid Net amount only..!',
											icon: 'error',
											confirmButtonText: 'Okay'
									})
									return false;
							}
							else
							{
								var mribillno        = $('#mribillnumberval').val();
								var company          = $('#company').val();
								var mriinttypeval    = $('#mriinttypeval').val();
								var mri_endateval    = $('#mri_endateval').val();
								var mriloanamount    = $('#mriloanamount').val();
								var Balanceamountval = $('#Balanceamountval').val();
								var paidamountvalmri = $('#paidamountvalmri').val();
								var paymaribalanceamount = $('#paymaribalanceamount').val();
								var formchargeval 	= $('#formchargeval').val();
								var noticechargeval = $('#noticechargeval').val();
								var discountval  		= $('#discountval').val();
								var remarksvalue = $('#remarksvalue').val();

								var pidval = $('#pidval').val();

								var formData = new FormData();
								formData.append('mribillno', mribillno);
								formData.append('company', company);
								formData.append('mriinttypeval', mriinttypeval);
								formData.append('mri_endateval', mri_endateval);
								formData.append('mriloanamount', mriloanamount);
								formData.append('Balanceamountval', Balanceamountval);
								formData.append('paidamountvalmri', paidamountvalmri);
								formData.append('paymaribalanceamount',paymaribalanceamount);
								formData.append('formchargeval',formchargeval);
								formData.append('noticechargeval',noticechargeval);
								formData.append('discountval',discountval);
								formData.append('remarksvalue',remarksvalue);
								formData.append('pidval',pidval);

								$.ajax(
								{
										url: baseurl+'mri_loan/saveredemptionclosefun',
										type: 'POST',
										data: formData,
										async: false,
										cache: false,
										contentType: false,
										processData: false,
										success: function (response) 
										{

											var returnedData = JSON.parse(response);

												if(returnedData.return_code == 0)
												{
													Swal.fire({
															title: 'Success!',
															text: 'MRI Loan Added Successfully.',
															icon: 'Success',
															confirmButtonText: 'Okay'
													})

												}
												else
												{
													Swal.fire({
															title: 'error!',
															text: 'MRI Loan Not Added.Please check..!',
															icon: 'error',
															confirmButtonText: 'Okay'
													})

												}
												//console.log(returnedData);	
										}
								});
							}
							}
							else
							{
									Swal.fire({
										title: 'error!',
										text: 'please paid Net amount only..!',
										icon: 'error',
										confirmButtonText: 'Okay'
									})
									return false;
							}
					}
			  }
			  function newmriloansave()
			  {
			  		//alert('new mri loan save process');
	  				var mribillno        = $('#mribillnumberval').val();
						var company          = $('#company').val();
						var mriinttypeval    = $('#mriinttypeval').val();
						var mri_endateval    = $('#mri_endateval').val();
						var mriloanamount    = $('#mriloanamount').val();
						var Balanceamountval = $('#Balanceamountval').val();
						var paidamountvalmri = $('#paidamountvalmri').val();

						var formData = new FormData();
						formData.append('mribillno', mribillno);
						formData.append('company', company);
						formData.append('mriinttypeval', mriinttypeval);
						formData.append('mri_endateval', mri_endateval);
						formData.append('mriloanamount', mriloanamount);
						formData.append('Balanceamountval', Balanceamountval);
						formData.append('paidamountvalmri', paidamountvalmri);

						$.ajax(
						{
								url: baseurl+'mri_loan/saveredemptiontransferfun',
								type: 'POST',
								data: formData,
								async: false,
								cache: false,
								contentType: false,
								processData: false,
								success: function (response) 
								{

									console.log(response);
						
											
								}
						});
						
			  }
	</script>
	<script>
	      $("#kt_datatable_dom_positioning_add_loan").kendoTooltip({
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
			$("#kt_datatable_dom_positioning_add_loan").DataTable({
				 "ordering": false,
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
			$('#kt_datatable_dom_positioning_add_loan').wrap('<div class="dataTables_scroll" />');
	</script>
	<script>
			$("#kt_datepicker_new_loan_date").flatpickr({
				dateFormat: "d-m-Y",
			});
	</script>
	</body>
	<!--end::Body-->
</html>