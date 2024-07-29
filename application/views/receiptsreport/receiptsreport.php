<?php $this->load->view("common");?>
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
									<h1 class="d-flex align-items-center text-dark fw-bold my-1 fs-3">Receipts Report
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
									<!--begin::Card toolbar-->
									<div class="card-toolbar">
										<!--begin::Toolbar-->
										<div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
						
										</div>
										<!--end::Toolbar-->
										<!--begin::Group actions-->
										<div class="d-flex justify-content-end align-items-center d-none" data-kt-user-table-toolbar="selected">
											<!--<div class="fw-bold me-5">
											<span class="me-2" data-kt-user-table-select="selected_count"></span>Selected</div>-->
											<button type="button" class="btn btn-danger" data-kt-user-table-select="delete_selected">Delete Selected</button>
										</div>
										<!--end::Group actions-->
										<!--begin::Modal - Adjust Balance-->
										<div class="modal fade" id="kt_modal_export_users" tabindex="-1" aria-hidden="true">
											<!--begin::Modal dialog-->
											<div class="modal-dialog modal-dialog-centered mw-650px">
												<!--begin::Modal content-->
												<div class="modal-content">
													<!--begin::Modal header-->
													<div class="modal-header">
														<!--begin::Modal title-->
														<h2 class="fw-bold">Export Party</h2>
														<!--end::Modal title-->
														<!--begin::Close-->
														<div class="btn btn-icon btn-sm btn-active-icon-primary" data-kt-users-modal-action="close">
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
													<div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
														<!--begin::Form-->
														<form id="kt_modal_export_users_form" class="form" action="#">
															<!--begin::Input group-->
															<div class="fv-row mb-10">
																<!--begin::Label-->
																<label class="fs-6 fw-semibold form-label mb-2">Select Party Details:</label>
																<!--end::Label-->
																<!--begin::Input-->
																<select name="role" data-control="select2" data-placeholder="Based on" data-hide-search="true" class="form-select form-select-solid fw-bold">
																	<option></option>
																	<option value="city">All</option>
																	<!-- <option value="zone">Zone</option>
																	<option value="area">Area</option>
																	<option value="customer_rating">Customer Rating</option> -->
																</select>
																<!--end::Input-->
															</div>
															<!--end::Input group-->
															<!--begin::Input group-->
															<div class="fv-row mb-10">
																<!--begin::Label-->
																<label class="required fs-6 fw-semibold form-label mb-2">Select Export Format:</label>
																<!--end::Label-->
																<!--begin::Input-->
																<select name="format" data-control="select2" data-placeholder="Select a format" data-hide-search="true" class="form-select form-select-solid fw-bold">
																	<option></option>
																	<option value="excel">Excel</option>
																	<option value="pdf">PDF</option>
																	<option value="cvs">CVS</option>
																	<option value="zip">ZIP</option>
																</select>
																<!--end::Input-->
															</div>
															<!--end::Input group-->
															<!--begin::Actions-->
															<div class="text-center">
																<button type="reset" class="btn btn-light me-3" data-kt-users-modal-action="cancel">Discard</button>
																<button type="submit" class="btn btn-primary" data-kt-users-modal-action="submit">
																	<span class="indicator-label">Submit</span>
																	<span class="indicator-progress">Please wait...
																	<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
																</button>
															</div>
															<!--end::Actions-->
														</form>
														<!--end::Form-->
													</div>
													<!--end::Modal body-->
												</div>
												<!--end::Modal content-->
											</div>
											<!--end::Modal dialog-->
										</div>
										<!--end::Modal - New Card-->
									</div>
									<!--end::Card toolbar-->
							
								<!--end::Card header-->

							<!--begin::Card body-->
						<div class="card-body py-4">
						<form name="receiptsreport_form" id="receiptsreport_form" method="POST" action="<?php echo base_url(); ?>Receiptsreport" enctype="multipart/form-data">	
						<div class="row">
							<div class="col-lg-6">
								<div style="padding:10px 10px 10px 10px !important;box-shadow: 0 3px 6px #00002947; border-radius: 5px; background-color: #f5f5f1 !important;">
									<div class="row">
										<!--begin::Label-->
										<label class="col-md-3 col-form-label required fw-bold fs-6">Company</label>
										<!--end::Label-->
										<!--begin::Col-->
										<div class="col-lg-6 fv-row fv-plugins-icon-container">
											<!--begin::Select-->
													<select class="form-select form-select-solid" data-control="select2" name="company_list_receiptsreport"  id="company_list_receiptsreport" data-hide-search="true" data-placeholder="Select Company" onchange="selectcompany();">
														<option value="ALL">ALL</option>

														<?php foreach($company_list as $comlist)
														{?>
														<option value="<?php echo $comlist['COMPANYCODE'];?>" 
															<?php if(isset($_POST['company_list_receiptsreport']) && $_POST['company_list_receiptsreport'] == $comlist['COMPANYCODE']) echo "selected";?>><?php echo $comlist['COMPANYNAME'];?></option><?php
														 }?> 
													</select>
												<div class="fv-plugins-message-container invalid-feedback" id="company_list_receiptsreport_err"></div>		
											<!--end::Select-->
										</div>
										<!--end::Col-->	
									</div>
									<div class="row">
										<!--begin::Label-->
										<label class="col-md-3 col-form-label fw-bold fs-6">Zone</label>
										<!--end::Label-->
										<!--begin::Col-->
										<div class="col-lg-6 fv-row fv-plugins-icon-container">
											<!--begin::Select-->
											<select class="form-select form-select-solid" data-control="select2" data-placeholder="Select Zone"name="zone_list_receiptsreport" id="zone_list_receiptsreport" data-hide-search="true" onchange="listarea();">
											<option value="">Select Zone</option>
											<?php foreach($zone_list as $zonelist)
											{?>
											<option value="<?php echo $zonelist['SNO'];?>"

												<?php if(isset($_POST['zone_list_receiptsreport'])){

													if($_POST['zone_list_receiptsreport'] == $zonelist['SNO']) echo "selected";
												
													}
												?>
											>
												<?php echo $zonelist['ZONENAME'];?></option><?php
											}?> 
											</select>
											<!--end::Select-->
											<div class="fv-plugins-message-container invalid-feedback" id="zone_list_receiptsreport_err">
											</div>
											<!--end::Col-->
										</div>	
									</div>
									<div class="row">
									<!--begin::Label-->
									<label class="col-md-3 col-form-label fw-bold fs-6">Area</label>
									<!--end::Label-->
									<!--begin::Col-->
									<div class="col-lg-6 fv-row fv-plugins-icon-container">
										<!--begin::Select-->
										<select class="form-select form-select-solid" data-control="select2" data-placeholder="Select Area" name="Area_list_receiptsreport" id="Area_list_receiptsreport" data-hide-search="true" onchange="listcity();">
													<option value="">ALL</option>

														<?php  
														// print_r($area_list);
														foreach($area_list as $arealist)
														{?>
														<option value="<?php echo $arealist['AREANAME'];?>"

														<?php if(isset($_POST['Area_list_receiptsreport'])){

															if($_POST['Area_list_receiptsreport'] == $arealist['SNO']) echo "selected";
															}
														?>

															><?php echo $arealist['AREANAME'];?></option>

															<?php
														}?> 
													</select>

												<div class="fv-plugins-message-container invalid-feedback" id="Area_list_receiptsreport_err"></div>	
										<!--end::Select-->
									</div>
									<!--end::Col-->	
									</div>
									<div class="row">
										<!--begin::Label-->
										<label class="col-md-3 col-form-label fw-bold fs-6">City</label>
										<!--end::Label-->
										<!--begin::Col-->
										<div class="col-lg-6 fv-row fv-plugins-icon-container">
											<!--begin::Select-->
											<select class="form-select form-select-solid" data-control="select2" data-placeholder="Select City" name="city_list_receiptsreport" id="city_list_receiptsreport" data-hide-search="true" onchange="listvillage();">
														<option value="">ALL</option>
														<?php  foreach($city_list as $citylist)
														{?>
														<option value="<?php echo $citylist['CITYNAME'];?>"

														<?php if(isset($_POST['city_list_receiptsreport'])){

															if($_POST['city_list_receiptsreport'] == $citylist['CITYID']) echo "selected";
															}
														?>
															><?php echo $citylist['CITYNAME'];?></option>

															<?php
														}?> 
														</select>
											<!--end::Select-->
										</div>
										<!--end::Col-->	
									</div>

									<div class="row">
									<!--begin::Label-->
									<label class="col-md-3 col-form-label fw-bold fs-6">Village</label>
									<!--end::Label-->
									<!--begin::Col-->
									<div class="col-lg-6 fv-row fv-plugins-icon-container">
										<!--begin::Select-->
											<select class="form-select form-select-solid" data-control="select2" data-placeholder="Select Village" name="village_list_receiptsreport" id="village_list_receiptsreport" data-hide-search="true" onchange="liststreet();">
													<option value="">ALL</option>
													<?php  foreach($village_list as $villagelist)
														{?>
														<option value="<?php echo $villagelist['VILLAGENAME'];?>"

														<?php if(isset($_POST['village_list_receiptsreport'])){

															if($_POST['village_list_receiptsreport'] == $villagelist['VILLAGEID']) echo "selected";
															}
														?>
															><?php echo $villagelist['VILLAGENAME'];?></option>

															<?php
														}?> 
													</select>
										<!--end::Select-->
									</div>
									<!--end::Col-->	
									</div>
									<div class="row">
									<!--begin::Label-->
									<label class="col-md-3 col-form-label fw-bold fs-6">Street</label>
									<!--end::Label-->
									<!--begin::Col-->
									<div class="col-lg-6 fv-row fv-plugins-icon-container">
										<!--begin::Select-->
										<select class="form-select form-select-solid" data-control="select2" data-placeholder="Select Street" name="street_list_receiptsreport"  id="street_list_receiptsreport" data-hide-search="true">
											<option value="">ALL</option>
											<?php  foreach($street_list as $streetlist)
											{?>
											<option value="<?php echo $streetlist['STREETNAME'];?>"

											<?php if(isset($_POST['street_list_receiptsreport'])){

												if($_POST['street_list_receiptsreport'] == $streetlist['STREETID']) echo "selected";
												}
											?>
												><?php echo $streetlist['STREETNAME'];?></option>

												<?php
											}?>
										</select>
										<!--end::Select-->
									</div>
									<!--end::Col-->	
									</div>
								</div>
							</div>
							<br>
							<div class="col-lg-6">
								<div class="row">
									<!--begin::Col-->
									<div class="col-lg-12 fv-row fv-plugins-icon-container">
										<div style="padding:10px 10px 10px 10px !important;box-shadow: 0 3px 6px #00002947; border-radius: 5px; background-color: #f5f5f1 !important;">
												<div class="row">
														<div class="col-lg-1 d-flex align-items-center mt-3">
														<!--begin:Input-->
														<div class="form-check form-check-custom">
															<input class="form-check-input2" type="radio" name="all_rcptreport" value="" checked />
														</div>
														<!--end:Input-->
														<!--begin::Description-->
														<div class="d-flex flex-column">
															<div class="fs-6 fw-semibold text-muted" style="padding-left: 10px; margin right: 50px !important;">All</div>
														</div>
														<!--end:Description-->
														</div>
														<div class="col-lg-1"></div>
														<div class="col-lg-1"></div>
														<div class="col-lg-1 d-flex align-items-center mt-3">
																<!--begin:Input-->
																<div class="form-check form-check-custom">
																	<input class="form-check-input2" type="radio" name="all_rcptreport" value="active"<?php if(isset($_POST['all_rcptreport']) && $_POST['all_rcptreport']=="active") echo "checked";?>  />
																</div>
																<!--end:Input-->
																<!--begin::Description-->
																<div class="d-flex flex-column">
																	<div class="fs-6 fw-semibold text-muted" style="padding-left: 10px; margin right: 50px !important;">Active</div>
																</div>
																<!--end:Description-->
														</div>
														<div class="col-lg-1"></div>
														<div class="col-lg-1"></div>
														<div class="col-lg-1 d-flex align-items-center mt-3">
																<!--begin:Input-->
															<div class="form-check form-check-custom">
																<input class="form-check-input2" type="radio" name="all_rcptreport" value="closed" <?php if(isset($_POST['all_rcptreport']) && $_POST['all_rcptreport']=="closed") echo "checked";?>/>
															</div>
																<!--end:Input-->
																<!--begin::Description-->
																<div class="d-flex flex-column">
																	<div class="fs-6 fw-semibold text-muted" style="padding-left: 10px; margin right: 50px !important;">Closed</div>
																</div>
																<!--end:Description-->
														</div>
													</div>
										<div class="fv-plugins-message-container invalid-feedback"></div>
									</div>
									<!--end::Col-->	
								</div>
							</div>
							<br>
							<div class="row">
								<div class="col-lg-12">
									<div style="padding:10px 10px 10px 10px !important;box-shadow: 0 3px 6px #00002947; border-radius: 5px; background-color: #f5f5f1 !important;">
										<div class="col-lg-6 fv-row fv-plugins-icon-container fv-plugins-bootstrap5-row-invalid">
											<div class="d-flex align-items-center">
												<label class="form-check form-check-inline form-check-solid me-5 is-invalid">
													<input class="form-check-input" name="principal_check" type="checkbox" value="YES" id="principal_check" <?php if(isset($_POST['principal_check']) && $_POST['principal_check']!="") echo "checked";?>>
												</label>
												<span class="col-form-label fw-semibold fs-6">Principal Amount is > 0</span>
											</div>
										</div>
									</div>
								</div>	
							</div>
							<br>
							<div style="padding:10px 10px 10px 10px !important;box-shadow: 0 3px 6px #00002947; border-radius: 5px; background-color: #f5f5f1 !important;">
								<div class="row">
									<div class="col-lg-6 d-flex align-items-center">
										<div class="form-check form-check-custom">
											<input class="form-check-input2" type="radio" id="select_int_re_re_report" name="int_radio_re_re_report" value="select_int_value_re_re_col_report" checked/>
										</div>
										<div class="d-flex flex-column">
											<div class="fs-6 fw-semibold text-muted" style="padding-left: 10px;">Select Interest</div>
										</div>
									</div>	
									<!--begin::Col-->
									<div class="col-lg-6 fv-row fv-plugins-icon-container">
										<!--begin::Select-->
										<select class="form-select form-select-solid" data-control="select2" data-hide-search="true" id="int_radio_tbox_re_re_report" name="int_radio_tbox_re_re_report">	
											<option value="ALL" selected>ALL</option>
											<?php foreach($int_list as $intlst)
												{?>
												<option value="<?php echo $intlst['INTNAME'];?>" 
													<?php if(isset($_POST['int_radio_tbox_re_re_report']) && $_POST['int_radio_tbox_re_re_report'] == $intlst['INTNAME']) echo "selected";?>><?php echo $intlst['INTNAME'];?></option>
													<?php
												 }?>
										</select>
										<!--end::Select-->
									</div>
									<!--end::Col-->	
								</div>
								<div class="row">	
									<div class="col-lg-6 d-flex align-items-center">
										<div class="form-check form-check-custom">
											<input class="form-check-input2" type="radio" id="int_group_rere_report" name="int_radio_re_re_report" value="int_group_value_re_re_report" 

											<?php if(isset($_POST['int_group_radio_tbox_re_re_report']) && $_POST['int_group_radio_tbox_re_re_report']!="") echo "checked";
											?> 
											/>
										</div>
										<div class="d-flex flex-column">
											<div class="fs-6 fw-semibold text-muted" style="padding-left: 10px;">Int Group</div>
										</div>
									</div>	
									<!--begin::Col-->
									<div class="col-lg-6 fv-row fv-plugins-icon-container">
										<!--begin::Select-->
										<select class="form-select form-select-solid" data-control="select2"  data-hide-search="true" id="int_group_radio_tbox_re_re_report" name="int_group_radio_tbox_re_re_report">
										<option value="">Select Interest Group</option>
										<?php foreach($int_grp_list as $intgrplist)
										{?>
										<option value="<?php echo $intgrplist['INT_GROUP_NAME'];?>" 
										<?php if(isset($_POST['int_group_radio_tbox_re_re_report']) && $_POST['int_group_radio_tbox_re_re_report'] == $intgrplist['INT_GROUP_NAME']) echo "selected";?>><?php echo $intgrplist['INT_GROUP_NAME'];?>
										</option>
										<?php
									 	}?>
										</select>
										<!--end::Select-->
									</div>
									<!--end::Col-->	
								</div>
							</div>
						</div>
					</div>
					<br>
					<div class="row">
						<div class="col-lg-2">
							<div style="padding:10px 10px 10px 10px !important;box-shadow: 0 3px 6px #00002947; border-radius: 5px; background-color: #f5f5f1 !important;">
								<div class="row">
									<div class="col-lg-1 d-flex align-items-center mt-3">
											<!--begin:Input-->
											<div class="form-check form-check-custom">
												<input class="form-check-input2" type="radio" id="daily_re_re" onclick="daily_re_re_click()" name="selection_date" value="daily" checked/>
											</div>
											<!--end:Input-->
											<!--begin::Description-->
											<div class="d-flex flex-column">
												<div class="fs-6 fw-semibold text-muted" style="padding-left: 10px; margin right: 50px !important;">Daily</div>
											</div>
											<!--end:Description-->
									</div>
								</div>
								<br>
								<div class="row">
									<div class="col-lg-1 d-flex align-items-center mt-3">
									<!--begin:Input-->
									<div class="form-check form-check-custom">
										<input class="form-check-input2" type="radio" id="monthly_re_re" onclick="monthly_re_re_click()" name="selection_date" value="monthly"
										
										<?php if(isset($_POST['selection_date']) && $_POST['selection_date']=="monthly") echo "checked";?> />
									</div>
									<!--end:Input-->
									<!--begin::Description-->
									<div class="d-flex flex-column">
										<div class="fs-6 fw-semibold text-muted" style="padding-left: 10px; margin right: 50px !important;">Monthly</div>
									</div>
									<!--end:Description-->
									</div>
								</div>
								<br>
								<div class="row">	
									<div class="col-lg-1 d-flex align-items-center mt-3">
										<!--begin:Input-->
										<div class="form-check form-check-custom">
											<input class="form-check-input2" type="radio" id="period_re_re" onclick="period_re_re_click()" name="selection_date" value="period"

											<?php if(isset($_POST['selection_date']) && $_POST['selection_date']=="period") echo "checked";?> />
										</div>
										<!--end:Input-->
										<!--begin::Description-->
										<div class="d-flex flex-column">
											<div class="fs-6 fw-semibold text-muted" style="padding-left: 10px; margin right: 50px !important;">Period</div>
										</div>
										<!--end:Description-->
										</div>
									</div>
								</div>
							</div>	
								<div class="col-lg-4">
									<div style="padding:10px 10px 10px 10px !important;box-shadow: 0 3px 6px #00002947; border-radius: 5px; background-color: #f5f5f1 !important;" >
										<div class="row">
												<div class="col-lg-6 fv-row" id="start_date_re_re"
												<?php if(isset($selection_date)){

												if($_POST['selection_date']=="daily"&&$_POST['selection_date']!="period") 		

													echo "style=display:block;";

													else echo "style=display:none;";
													
													}?>>
														<label class="form-label">Start Date</label>
															<div class="d-flex align-items-center">
															<!--begin::Svg Icon | path: icons/duotune/general/gen014.svg-->
															<span class="svg-icon position-absolute ms-4 svg-icon-2 dt">
																<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																	<path opacity="0.3" d="M21 22H3C2.4 22 2 21.6 2 21V5C2 4.4 2.4 4 3 4H21C21.6 4 22 4.4 22 5V21C22 21.6 21.6 22 21 22Z" fill="currentColor" />
																	<path d="M6 6C5.4 6 5 5.6 5 5V3C5 2.4 5.4 2 6 2C6.6 2 7 2.4 7 3V5C7 5.6 6.6 6 6 6ZM11 5V3C11 2.4 10.6 2 10 2C9.4 2 9 2.4 9 3V5C9 5.6 9.4 6 10 6C10.6 6 11 5.6 11 5ZM15 5V3C15 2.4 14.6 2 14 2C13.4 2 13 2.4 13 3V5C13 5.6 13.4 6 14 6C14.6 6 15 5.6 15 5ZM19 5V3C19 2.4 18.6 2 18 2C17.4 2 17 2.4 17 3V5C17 5.6 17.4 6 18 6C18.6 6 19 5.6 19 5Z" fill="currentColor" />
																	<path d="M8.8 13.1C9.2 13.1 9.5 13 9.7 12.8C9.9 12.6 10.1 12.3 10.1 11.9C10.1 11.6 10 11.3 9.8 11.1C9.6 10.9 9.3 10.8 9 10.8C8.8 10.8 8.59999 10.8 8.39999 10.9C8.19999 11 8.1 11.1 8 11.2C7.9 11.3 7.8 11.4 7.7 11.6C7.6 11.8 7.5 11.9 7.5 12.1C7.5 12.2 7.4 12.2 7.3 12.3C7.2 12.4 7.09999 12.4 6.89999 12.4C6.69999 12.4 6.6 12.3 6.5 12.2C6.4 12.1 6.3 11.9 6.3 11.7C6.3 11.5 6.4 11.3 6.5 11.1C6.6 10.9 6.8 10.7 7 10.5C7.2 10.3 7.49999 10.1 7.89999 10C8.29999 9.90003 8.60001 9.80003 9.10001 9.80003C9.50001 9.80003 9.80001 9.90003 10.1 10C10.4 10.1 10.7 10.3 10.9 10.4C11.1 10.5 11.3 10.8 11.4 11.1C11.5 11.4 11.6 11.6 11.6 11.9C11.6 12.3 11.5 12.6 11.3 12.9C11.1 13.2 10.9 13.5 10.6 13.7C10.9 13.9 11.2 14.1 11.4 14.3C11.6 14.5 11.8 14.7 11.9 15C12 15.3 12.1 15.5 12.1 15.8C12.1 16.2 12 16.5 11.9 16.8C11.8 17.1 11.5 17.4 11.3 17.7C11.1 18 10.7 18.2 10.3 18.3C9.9 18.4 9.5 18.5 9 18.5C8.5 18.5 8.1 18.4 7.7 18.2C7.3 18 7 17.8 6.8 17.6C6.6 17.4 6.4 17.1 6.3 16.8C6.2 16.5 6.10001 16.3 6.10001 16.1C6.10001 15.9 6.2 15.7 6.3 15.6C6.4 15.5 6.6 15.4 6.8 15.4C6.9 15.4 7.00001 15.4 7.10001 15.5C7.20001 15.6 7.3 15.6 7.3 15.7C7.5 16.2 7.7 16.6 8 16.9C8.3 17.2 8.6 17.3 9 17.3C9.2 17.3 9.5 17.2 9.7 17.1C9.9 17 10.1 16.8 10.3 16.6C10.5 16.4 10.5 16.1 10.5 15.8C10.5 15.3 10.4 15 10.1 14.7C9.80001 14.4 9.50001 14.3 9.10001 14.3C9.00001 14.3 8.9 14.3 8.7 14.3C8.5 14.3 8.39999 14.3 8.39999 14.3C8.19999 14.3 7.99999 14.2 7.89999 14.1C7.79999 14 7.7 13.8 7.7 13.7C7.7 13.5 7.79999 13.4 7.89999 13.2C7.99999 13 8.2 13 8.5 13H8.8V13.1ZM15.3 17.5V12.2C14.3 13 13.6 13.3 13.3 13.3C13.1 13.3 13 13.2 12.9 13.1C12.8 13 12.7 12.8 12.7 12.6C12.7 12.4 12.8 12.3 12.9 12.2C13 12.1 13.2 12 13.6 11.8C14.1 11.6 14.5 11.3 14.7 11.1C14.9 10.9 15.2 10.6 15.5 10.3C15.8 10 15.9 9.80003 15.9 9.70003C15.9 9.60003 16.1 9.60004 16.3 9.60004C16.5 9.60004 16.7 9.70003 16.8 9.80003C16.9 9.90003 17 10.2 17 10.5V17.2C17 18 16.7 18.4 16.2 18.4C16 18.4 15.8 18.3 15.6 18.2C15.4 18.1 15.3 17.8 15.3 17.5Z" fill="currentColor" />
																</svg>
															</span>
															<!--end::Svg Icon-->
															<input class="form-control form-control-solid ps-12" name="from_date"value="<?php if(isset($_POST['from_date']) && $_POST['from_date']!="") echo ($_POST['from_date']); else echo date("d-m-Y");?>" placeholder="From Date" id="kt_datepicker_receipts_report_from" />
														</div>
												</div>
												<div class="col-lg-4"
												></div>
												<!--begin::Col-->
												<div class="col-lg-6 fv-row" id="end_date_re_re"
												<?php if(isset($selection_date)){

												if($_POST['selection_date']=="period" && $_POST['selection_date']!="daily" && $_POST['selection_date']!="monthly") 		

													echo "style=display:block;";

													else echo "style=display:none;";
													
													}?> >
														<label class="form-label">End Date</label>
														<div class="d-flex align-items-center">
														<!--begin::Svg Icon | path: icons/duotune/general/gen014.svg-->
														<span class="svg-icon position-absolute ms-4 svg-icon-2 dt">
															<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																<path opacity="0.3" d="M21 22H3C2.4 22 2 21.6 2 21V5C2 4.4 2.4 4 3 4H21C21.6 4 22 4.4 22 5V21C22 21.6 21.6 22 21 22Z" fill="currentColor" />
																<path d="M6 6C5.4 6 5 5.6 5 5V3C5 2.4 5.4 2 6 2C6.6 2 7 2.4 7 3V5C7 5.6 6.6 6 6 6ZM11 5V3C11 2.4 10.6 2 10 2C9.4 2 9 2.4 9 3V5C9 5.6 9.4 6 10 6C10.6 6 11 5.6 11 5ZM15 5V3C15 2.4 14.6 2 14 2C13.4 2 13 2.4 13 3V5C13 5.6 13.4 6 14 6C14.6 6 15 5.6 15 5ZM19 5V3C19 2.4 18.6 2 18 2C17.4 2 17 2.4 17 3V5C17 5.6 17.4 6 18 6C18.6 6 19 5.6 19 5Z" fill="currentColor" />
																<path d="M8.8 13.1C9.2 13.1 9.5 13 9.7 12.8C9.9 12.6 10.1 12.3 10.1 11.9C10.1 11.6 10 11.3 9.8 11.1C9.6 10.9 9.3 10.8 9 10.8C8.8 10.8 8.59999 10.8 8.39999 10.9C8.19999 11 8.1 11.1 8 11.2C7.9 11.3 7.8 11.4 7.7 11.6C7.6 11.8 7.5 11.9 7.5 12.1C7.5 12.2 7.4 12.2 7.3 12.3C7.2 12.4 7.09999 12.4 6.89999 12.4C6.69999 12.4 6.6 12.3 6.5 12.2C6.4 12.1 6.3 11.9 6.3 11.7C6.3 11.5 6.4 11.3 6.5 11.1C6.6 10.9 6.8 10.7 7 10.5C7.2 10.3 7.49999 10.1 7.89999 10C8.29999 9.90003 8.60001 9.80003 9.10001 9.80003C9.50001 9.80003 9.80001 9.90003 10.1 10C10.4 10.1 10.7 10.3 10.9 10.4C11.1 10.5 11.3 10.8 11.4 11.1C11.5 11.4 11.6 11.6 11.6 11.9C11.6 12.3 11.5 12.6 11.3 12.9C11.1 13.2 10.9 13.5 10.6 13.7C10.9 13.9 11.2 14.1 11.4 14.3C11.6 14.5 11.8 14.7 11.9 15C12 15.3 12.1 15.5 12.1 15.8C12.1 16.2 12 16.5 11.9 16.8C11.8 17.1 11.5 17.4 11.3 17.7C11.1 18 10.7 18.2 10.3 18.3C9.9 18.4 9.5 18.5 9 18.5C8.5 18.5 8.1 18.4 7.7 18.2C7.3 18 7 17.8 6.8 17.6C6.6 17.4 6.4 17.1 6.3 16.8C6.2 16.5 6.10001 16.3 6.10001 16.1C6.10001 15.9 6.2 15.7 6.3 15.6C6.4 15.5 6.6 15.4 6.8 15.4C6.9 15.4 7.00001 15.4 7.10001 15.5C7.20001 15.6 7.3 15.6 7.3 15.7C7.5 16.2 7.7 16.6 8 16.9C8.3 17.2 8.6 17.3 9 17.3C9.2 17.3 9.5 17.2 9.7 17.1C9.9 17 10.1 16.8 10.3 16.6C10.5 16.4 10.5 16.1 10.5 15.8C10.5 15.3 10.4 15 10.1 14.7C9.80001 14.4 9.50001 14.3 9.10001 14.3C9.00001 14.3 8.9 14.3 8.7 14.3C8.5 14.3 8.39999 14.3 8.39999 14.3C8.19999 14.3 7.99999 14.2 7.89999 14.1C7.79999 14 7.7 13.8 7.7 13.7C7.7 13.5 7.79999 13.4 7.89999 13.2C7.99999 13 8.2 13 8.5 13H8.8V13.1ZM15.3 17.5V12.2C14.3 13 13.6 13.3 13.3 13.3C13.1 13.3 13 13.2 12.9 13.1C12.8 13 12.7 12.8 12.7 12.6C12.7 12.4 12.8 12.3 12.9 12.2C13 12.1 13.2 12 13.6 11.8C14.1 11.6 14.5 11.3 14.7 11.1C14.9 10.9 15.2 10.6 15.5 10.3C15.8 10 15.9 9.80003 15.9 9.70003C15.9 9.60003 16.1 9.60004 16.3 9.60004C16.5 9.60004 16.7 9.70003 16.8 9.80003C16.9 9.90003 17 10.2 17 10.5V17.2C17 18 16.7 18.4 16.2 18.4C16 18.4 15.8 18.3 15.6 18.2C15.4 18.1 15.3 17.8 15.3 17.5Z" fill="currentColor" />
															</svg>
														</span>
														<!--end::Svg Icon-->
														<input class="form-control form-control-solid ps-12" name="to_date" placeholder="To Date" id="kt_datepicker_receipts_report_to" value="<?php if(isset($_POST['to_date']) && $_POST['to_date']!="") echo ($_POST['to_date']);?>"/>
														</div>
													</div>
												<!--end::Col-->
												<div class="col-lg-4"></div>
												<!--begin::Col-->
												<div class="col-lg-6 fv-row" id="start_month_re_re" style="display: none;">
														<label class="form-label">Select Month</label>
														<div class="d-flex align-items-center">
														<!--begin::Svg Icon | path: icons/duotune/general/gen014.svg-->
														<span class="svg-icon position-absolute ms-4 svg-icon-2 dt">
															<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																<path opacity="0.3" d="M21 22H3C2.4 22 2 21.6 2 21V5C2 4.4 2.4 4 3 4H21C21.6 4 22 4.4 22 5V21C22 21.6 21.6 22 21 22Z" fill="currentColor" />
																<path d="M6 6C5.4 6 5 5.6 5 5V3C5 2.4 5.4 2 6 2C6.6 2 7 2.4 7 3V5C7 5.6 6.6 6 6 6ZM11 5V3C11 2.4 10.6 2 10 2C9.4 2 9 2.4 9 3V5C9 5.6 9.4 6 10 6C10.6 6 11 5.6 11 5ZM15 5V3C15 2.4 14.6 2 14 2C13.4 2 13 2.4 13 3V5C13 5.6 13.4 6 14 6C14.6 6 15 5.6 15 5ZM19 5V3C19 2.4 18.6 2 18 2C17.4 2 17 2.4 17 3V5C17 5.6 17.4 6 18 6C18.6 6 19 5.6 19 5Z" fill="currentColor" />
																<path d="M8.8 13.1C9.2 13.1 9.5 13 9.7 12.8C9.9 12.6 10.1 12.3 10.1 11.9C10.1 11.6 10 11.3 9.8 11.1C9.6 10.9 9.3 10.8 9 10.8C8.8 10.8 8.59999 10.8 8.39999 10.9C8.19999 11 8.1 11.1 8 11.2C7.9 11.3 7.8 11.4 7.7 11.6C7.6 11.8 7.5 11.9 7.5 12.1C7.5 12.2 7.4 12.2 7.3 12.3C7.2 12.4 7.09999 12.4 6.89999 12.4C6.69999 12.4 6.6 12.3 6.5 12.2C6.4 12.1 6.3 11.9 6.3 11.7C6.3 11.5 6.4 11.3 6.5 11.1C6.6 10.9 6.8 10.7 7 10.5C7.2 10.3 7.49999 10.1 7.89999 10C8.29999 9.90003 8.60001 9.80003 9.10001 9.80003C9.50001 9.80003 9.80001 9.90003 10.1 10C10.4 10.1 10.7 10.3 10.9 10.4C11.1 10.5 11.3 10.8 11.4 11.1C11.5 11.4 11.6 11.6 11.6 11.9C11.6 12.3 11.5 12.6 11.3 12.9C11.1 13.2 10.9 13.5 10.6 13.7C10.9 13.9 11.2 14.1 11.4 14.3C11.6 14.5 11.8 14.7 11.9 15C12 15.3 12.1 15.5 12.1 15.8C12.1 16.2 12 16.5 11.9 16.8C11.8 17.1 11.5 17.4 11.3 17.7C11.1 18 10.7 18.2 10.3 18.3C9.9 18.4 9.5 18.5 9 18.5C8.5 18.5 8.1 18.4 7.7 18.2C7.3 18 7 17.8 6.8 17.6C6.6 17.4 6.4 17.1 6.3 16.8C6.2 16.5 6.10001 16.3 6.10001 16.1C6.10001 15.9 6.2 15.7 6.3 15.6C6.4 15.5 6.6 15.4 6.8 15.4C6.9 15.4 7.00001 15.4 7.10001 15.5C7.20001 15.6 7.3 15.6 7.3 15.7C7.5 16.2 7.7 16.6 8 16.9C8.3 17.2 8.6 17.3 9 17.3C9.2 17.3 9.5 17.2 9.7 17.1C9.9 17 10.1 16.8 10.3 16.6C10.5 16.4 10.5 16.1 10.5 15.8C10.5 15.3 10.4 15 10.1 14.7C9.80001 14.4 9.50001 14.3 9.10001 14.3C9.00001 14.3 8.9 14.3 8.7 14.3C8.5 14.3 8.39999 14.3 8.39999 14.3C8.19999 14.3 7.99999 14.2 7.89999 14.1C7.79999 14 7.7 13.8 7.7 13.7C7.7 13.5 7.79999 13.4 7.89999 13.2C7.99999 13 8.2 13 8.5 13H8.8V13.1ZM15.3 17.5V12.2C14.3 13 13.6 13.3 13.3 13.3C13.1 13.3 13 13.2 12.9 13.1C12.8 13 12.7 12.8 12.7 12.6C12.7 12.4 12.8 12.3 12.9 12.2C13 12.1 13.2 12 13.6 11.8C14.1 11.6 14.5 11.3 14.7 11.1C14.9 10.9 15.2 10.6 15.5 10.3C15.8 10 15.9 9.80003 15.9 9.70003C15.9 9.60003 16.1 9.60004 16.3 9.60004C16.5 9.60004 16.7 9.70003 16.8 9.80003C16.9 9.90003 17 10.2 17 10.5V17.2C17 18 16.7 18.4 16.2 18.4C16 18.4 15.8 18.3 15.6 18.2C15.4 18.1 15.3 17.8 15.3 17.5Z" fill="currentColor" />
															</svg>
														</span>
														<!--end::Svg Icon-->
														<input class="form-control form-control-solid ps-12" name="from_month" value="<?php if(isset($_POST['from_month']) && $_POST['from_month']!="") echo ($_POST['from_month']);?>" placeholder="Month" id="kt_datepicker_receipts_report_month"/>
														</div>
												</div>
												<!--end::Col-->
											</div>
										</div>
									</div>			
									<div class="col-lg-6">
										<div style="padding:10px 10px 10px 10px !important;box-shadow: 0 3px 6px #00002947; border-radius: 5px; background-color: #f5f5f1 !important;">
											<div class="row">
												<div class="col-lg-3 fv-row fv-plugins-icon-container fv-plugins-bootstrap5-row-invalid">
													<div class="d-flex align-items-center">
													<label class="form-check form-check-inline form-check-solid me-5 is-invalid">
														<input class="form-check-input" name="weight" type="checkbox" value="checked" id="weight_radio_re_re" onclick="wt_radio_re()" <?php if(isset($_POST['wt_radio_tbox_re_re']) && $_POST['wt_radio_tbox_re_re']!="") echo "checked";?>>
													</label>
													<span class="col-form-label fw-semibold fs-6">Weight</span>
													</div>
												</div>
											<div class="col-lg-3" id="weight_radio_tbox_re_re"

											<?php if(isset($_POST['wt_radio_tbox_re_re']) && $_POST['wt_radio_tbox_re_re']!="") echo "style=display:block;"; else echo "style=display:none;";?>
											>
											
											<select class="form-select form-select-solid" data-control="select2"data-hide-search="true" onchange="wt_tbox_re()" id="wt_radio_tbox_re_re" name="wt_radio_tbox_re_re">
												<!-- <option value="0"></option> -->
												<option value="">Select One</option>
												<option value="=" <?php if(isset($_POST['wt_radio_tbox_re_re']) && $_POST['wt_radio_tbox_re_re'] =="=") echo "selected";?>>=</option>
												<option value="<" <?php if(isset($_POST['wt_radio_tbox_re_re']) && $_POST['wt_radio_tbox_re_re'] =="<") echo "selected";?> ><</option>
												<option value=">" <?php if(isset($_POST['wt_radio_tbox_re_re']) && $_POST['wt_radio_tbox_re_re'] ==">") echo "selected";?>>></option>
												<option value="<=" <?php if(isset($_POST['wt_radio_tbox_re_re']) && $_POST['wt_radio_tbox_re_re'] =="<=") echo "selected";?>><=</option>
												<option value=">=" <?php if(isset($_POST['wt_radio_tbox_re_re']) && $_POST['wt_radio_tbox_re_re'] ==">=") echo "selected";?>>>=</option>
												<option value="between" <?php if(isset($_POST['wt_radio_tbox_re_re']) && $_POST['wt_radio_tbox_re_re'] =="between") echo "selected";?>>Between</option>
											</select>
										</div>
										<div class="col-lg-3 fv-row fv-plugins-icon-container">
											<input type="text" name="wt_radio_textboxone" class="form-control form-control-lg form-control-solid" id="weight_radio_tf1_re_re" value="<?php if(isset($_POST['wt_radio_textboxone']) && $_POST['wt_radio_textboxone']!="") echo ($_POST['wt_radio_textboxone']); else echo "";?>"

											<?php if(isset($_POST['wt_radio_textboxone']) && $_POST['wt_radio_textboxone']!="") echo "style=display:block;"; else echo "style=display:none;";?>> <!-- style="display: none;"> -->
											<div class="fv-plugins-message-container invalid-feedback"></div>
										</div>
										<div class="col-lg-3 fv-row fv-plugins-icon-container">
											<input type="text" name="wt_radio_textboxtwo" class="form-control form-control-lg form-control-solid" id="weight_radio_tf2_re_re" value="<?php if(isset($_POST['wt_radio_textboxtwo']) && $_POST['wt_radio_textboxtwo']!="") echo ($_POST['wt_radio_textboxtwo']); else echo "";?>"

														<?php if(isset($_POST['wt_radio_tbox_re_re']) && $_POST['wt_radio_tbox_re_re']=="between") echo "style=display:block;"; else echo "style=display:none;";?>> <!-- style="display: none;"> -->
											<div class="fv-plugins-message-container invalid-feedback"></div>
										</div>
									</div>
										<div class="row">
											<div class="col-lg-3 fv-row fv-plugins-icon-container fv-plugins-bootstrap5-row-invalid">
												<div class="d-flex align-items-center">
												<label class="form-check form-check-inline form-check-solid me-5 is-invalid">
													<input class="form-check-input" name="" type="checkbox" value="" id="amount_radio_re_re" onclick="amt_radio_re()"<?php if(isset($_POST['amount_rptrpt']) && $_POST['amount_rptrpt']!="") echo "checked";?>>
												</label>
												<span class="col-form-label fw-semibold fs-6">Amount</span>
												</div>
											</div>
											<div class="col-lg-3" id="amount_radio_tbox_re_re" <?php if(isset($_POST['amount_rptrpt']) && $_POST['amount_rptrpt']!="") echo "style=display:block;"; else echo "style=display:none;";?>> <!-- style="display: none;"> -->
												<select class="form-select form-select-solid" data-control="select2"data-hide-search="true" onchange="amt_tbox_re()" id="amt_radio_tbox_re_re" name="amount_rptrpt">
												<!-- <option value="0"></option> -->
											<option value="">Select One</option>
											<option value="=" <?php if(isset($_POST['amount_rptrpt']) && $_POST['amount_rptrpt'] =="=") echo "selected";?>>=</option>
											<option value="<" <?php if(isset($_POST['amount_rptrpt']) && $_POST['amount_rptrpt'] =="<") echo "selected";?> ><</option>
											<option value=">" <?php if(isset($_POST['amount_rptrpt']) && $_POST['amount_rptrpt'] ==">") echo "selected";?>>></option>
											<option value="<=" <?php if(isset($_POST['amount_rptrpt']) && $_POST['amount_rptrpt'] =="<=") echo "selected";?>><=</option>
											<option value=">=" <?php if(isset($_POST['amount_rptrpt']) && $_POST['amount_rptrpt'] ==">=") echo "selected";?>>>=</option>
											<option value="between" <?php if(isset($_POST['amount_rptrpt']) && $_POST['amount_rptrpt'] =="between") echo "selected";?>>Between</option>
											</select>
										</div>
										<div class="col-lg-3 fv-row fv-plugins-icon-container">
											<input type="text" name="amount_textone" class="form-control form-control-lg form-control-solid" id="amount_radio_tf1_re_re" value="<?php if(isset($_POST['amount_textone']) && $_POST['amount_textone']!="") echo ($_POST['amount_textone']); else echo "";?>"

											<?php if(isset($_POST['amount_textone']) && $_POST['amount_textone']!="") echo "style=display:block;"; else echo "style=display:none;";?>> <!-- style="display: none;"> -->
											<div class="fv-plugins-message-container invalid-feedback"></div>
										</div>
										<div class="col-lg-3 fv-row fv-plugins-icon-container">
											<input type="text" name="amount_texttwo" class="form-control form-control-lg form-control-solid" id="amount_radio_tf2_re_re" value="<?php if(isset($_POST['amount_texttwo']) && $_POST['amount_texttwo']!="") echo ($_POST['amount_texttwo']); else echo "";?>"

											<?php if(isset($_POST['amount_rptrpt']) && $_POST['amount_rptrpt']=="between") echo "style=display:block;"; else echo "style=display:none;";?>> <!-- style="display: none;"> -->
											<div class="fv-plugins-message-container invalid-feedback"></div>
										</div>
									</div>

								</div>
							</div>
						</div>	
						<!--End - Actions-->
							<div class="row">
								<div class="col-lg-10"></div>
								<div class="col-lg-1 d-flex flex-center">
									<button type="reset" class="btn btn-secondary me-3" data-bs-dismiss="modal">Cancel</button>
								</div>
								<div class="col-lg-1 d-flex flex-center">
								<button type="submit" class="btn btn-primary me-3" data-bs-toggle="modal" data-bs-target="">Go</button>
								</div>
							</div>
							<!--End::Actions-->
							<br>
							<!--begin::Table-->
							<table class="table table-striped table-hover table-row-bordered fs-7 gy-2 gs-1" id="kt_datatable_receipts_reports">
								<thead>
	    							<tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">
							            <!-- <th class="min-w-50px">S.No</th> -->
							            <th class="min-w-50px">Date</th>
							            <th class="min-w-100px">Receipt No</th>
							            <th class="min-w-80px">Bill No</th>
							            <th class="min-w-100px">Name</th>
							            <th class="min-w-80px">Principal</th>
							            <th class="min-w-80px">Interest</th>
							            <th class="min-w-80px">Total</th>
	    							</tr>
								</thead>

								<tbody class="text-gray-600 fw-semibold">
									<?php

									$val=[];
									$val2=[];
									$val3=[];
									//print_r($receipt_list_view['RECEIPT_SNO']);exit();
									foreach ($receipt_list_view as $key => $value) {
										# code...
										$val[]=$value['PRINCIPAL'];
										$val2[]=$value['INT_AMOUNT'];
										$val3[]=$value['PRINCIPAL']+$value['INT_AMOUNT'];
										//print_r($value);
									?>
									<tr>

							            <!-- <td>$key+1</td> -->
							            <td><?php echo $value['RECEIPT_DATE'];?></td>
							            <td><?php echo $value['RECEIPT_SNO'];?></td>
							            <td><?php echo $value['BILLNO'];?></td>
							            <td><?php echo $value['NAME'];?></td>
							            <td><?php echo $value['PRINCIPAL'];?></td>
							            <td><?php echo $value['INT_AMOUNT'];?></td>
							            <td><?php echo $value['PRINCIPAL']+$value['INT_AMOUNT'];?></td>

							        </tr> 

							    <?php }

							    ?>
							    </tbody>
							    <tfoot>
	    							<tr class="text-start text-muted fw-bold fs-6 text-uppercase gs-0">
							            <th class="min-w-50px"></th>
							            <th class="min-w-50px"></th>
							            <th class="min-w-100px"></th>
							            <th class="min-w-80px">Total</th>
							            <th class="min-w-80px"><?php echo array_sum($val);?></th>
							            <th class="min-w-80px"><?php echo array_sum($val2);?></th>
							            <th class="min-w-80px"><?php echo array_sum($val3);?></th>
	    							</tr>
								</tfoot>
							</table>
									<!--end::Table-->
								</div>
							</form>								
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

		<input type="hidden" value=<?php echo base_url();?>>
		<?php $this->load->view("script.php");?>

	<script>
		$("#kt_datepicker_receipts_report_from").flatpickr({
				dateFormat: "d-m-Y",
			});
			$("#kt_datepicker_receipts_report_to").flatpickr({
				dateFormat: "d-m-Y",
			});
			$("#kt_datepicker_receipts_report_month").flatpickr({
				dateFormat: "d-m-Y",
			});
	</script>
	<script>
	function wt_radio_re()
	{
		var weight_radio_re_re = document.getElementById("weight_radio_re_re");
		var weight_radio_tbox_re_re = document.getElementById("weight_radio_tbox_re_re");
		var weight_radio_tf1_re_re = document.getElementById("weight_radio_tf1_re_re");
		var weight_radio_tf2_re_re = document.getElementById("weight_radio_tf2_re_re");

		if (weight_radio_re_re.checked == true)
		{
		    weight_radio_tbox_re_re.style.display = "block";
		    weight_radio_tf1_re_re.style.display = "block";
	  	} else 
	  	{
	     	weight_radio_tbox_re_re.style.display = "none";
	     	weight_radio_tf1_re_re.style.display = "none";
	     	weight_radio_tf2_re_re.style.display = "none";
	  	}
	}
</script>
<script>
	function wt_tbox_re()
	{
		var wt_radio_tbox_re_re = document.getElementById("wt_radio_tbox_re_re").value;

		 if (wt_radio_tbox_re_re=="between") 
		  {
		  	$("#weight_radio_tf2_re_re").show();
		  }
		  else
		  {
		  	$("#weight_radio_tf2_re_re").hide();
		  }
	}
</script>
<script>
	function amt_radio_re()
	{
		var amount_radio_re_re = document.getElementById("amount_radio_re_re");
		var amount_radio_tbox_re_re = document.getElementById("amount_radio_tbox_re_re");
		var amount_radio_tf1_re_re = document.getElementById("amount_radio_tf1_re_re");
		var amount_radio_tf2_re_re = document.getElementById("amount_radio_tf2_re_re");

		if (amount_radio_re_re.checked == true)
		{
		    amount_radio_tbox_re_re.style.display = "block";
		    amount_radio_tf1_re_re.style.display = "block";
	  	} else 
	  	{
	     	amount_radio_tbox_re_re.style.display = "none";
	     	amount_radio_tf1_re_re.style.display = "none";
	     	amount_radio_tf2_re_re.style.display = "none";
	  	}
	}
</script>
<script>
	function amt_tbox_re()
	{
		var amt_radio_tbox_re_re = document.getElementById("amt_radio_tbox_re_re").value;

		 if (amt_radio_tbox_re_re=="between") 
		  {
		  	$("#amount_radio_tf2_re_re").show();
		  }
		  else
		  {
		  	$("#amount_radio_tf2_re_re").hide();
		  }
	}
</script>
<script>
	$('input:radio[name="int_radio_re_re_report"]').change(function() {
        if ($(this).val()=='select_int_value_re_re_col_report') 
        {
        	// alert("if");
            $('#int_group_radio_tbox_re_re_report').attr('disabled',true);
        } else
        {
            $('#int_group_radio_tbox_re_re_report').removeAttr('disabled');
            // alert("else");
        }
    });
    $('input:radio[name="int_radio_re_re_report"]').change(function() {
        if ($(this).val()=='int_group_value_re_re_report') 
        {
            $('#int_radio_tbox_re_re_report').attr('disabled',true);
        } else
        {
            $('#int_radio_tbox_re_re_report').removeAttr('disabled');
        }
    });
</script>
<script>
	function daily_re_re_click()
	{
		var daily_re_re = document.getElementById("daily_re_re");
		var monthly_re_re = document.getElementById("monthly_re_re");
		var period_re_re = document.getElementById("period_re_re");
		var start_re_re = document.getElementById("start_date_re_re");
		var end_re_re = document.getElementById("end_date_re_re");

		if (daily_re_re.checked == true)
		{
		   start_date_re_re.style.display = "block";
		   end_date_re_re.style.display = "none";
		   start_month_re_re.style.display="none";
	  	} else 
	  	{
	     	start_date_re_re.style.display = "none";
		    end_date_re_re.style.display = "none";
		    start_month_re_re.style.display="none";
	  	}
	}
</script>
<script>
	function monthly_re_re_click()
	{
		var daily_re_re = document.getElementById("daily_re_re");
		var monthly_re_re = document.getElementById("monthly_re_re");
		var period_re_re = document.getElementById("period_re_re");
		var start_re_re_month = document.getElementById("start_month_re_re");
		

		if (monthly_re_re.checked == true)
		{
		   start_month_re_re.style.display = "block";
		   start_date_re_re.style.display = "none";
		   end_date_re_re.style.display = "none";
		   
	  	} else 
	  	{
	     	start_month_re_re.style.display = "none";
	     	start_date_re_re.style.display = "none";
		    end_date_re_re.style.display = "none";
	  	}
	}
</script>
<script>
	function period_re_re_click()
	{
		var daily_re_re = document.getElementById("daily_re_re");
		var monthly_re_re = document.getElementById("monthly_re_re");
		var period_re_re = document.getElementById("period_re_re");
		var start_re_re_month = document.getElementById("start_month_re_re");

		if (period_re_re.checked == true)
		{
		   start_date_re_re.style.display = "block";
		   end_date_re_re.style.display = "block";
		   start_month_re_re.style.display = "none";
	  	} else 
	  	{
	     	start_date_re_re.style.display = "none";
		    end_date_re_re.style.display = "none";
		    start_month_re_re.style.display = "none";
	  	}
	}
</script>
<!-- <script>
	$("#kt_datatable_receipts_reports").DataTable({
	 "aaSorting":[],				// "ordering": false,
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
</script> -->
<script>

		$('#kt_datatable_receipts_reports').DataTable( {
		"aaSorting": [],
        dom: 'Bfrtip',
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5'
        ]
    } );	

</script>

<script>

function selectcompany()

{
	// var selectvalue= $("#company_list_loanlistview").value;
	// alert("sdhfsdj");

 	var selectBox = document.getElementById("company_list_receiptsreport");
    var selectedValue = selectBox.options[selectBox.selectedIndex].value;
      
}
function listarea()

{
	// var selectvalue= $("#zone_list_loanlistview").val();
	// alert(selectvalue);

 	var selectBox = document.getElementById("zone_list_receiptsreport");
    var selectedValue = selectBox.options[selectBox.selectedIndex].value;
    	
    if(selectedValue.length){

		var baseurl= $("#baseurl").val();
		//alert(val);
		$.ajax({
			type: "POST",
			url: baseurl+'Receiptsreport/show_arealist',
			async: false,
			type: "POST",
			data: "zone_id="+selectedValue,
			dataType: "html",
			success: function(response)
			{
			
			$('#Area_list_receiptsreport').empty().html(response);
			// $('#Area_list_receiptsreport').addClass('show');
			// $("#Area_list_receiptsreport").css("display", "block");
			$('#city_list_receiptsreport').empty();
			$('#village_list_receiptsreport').empty();
			$('#street_list_receiptsreport').empty();

			}
		});
    }else{
    	$('#Area_list_receiptsreport').empty().append("<option value= >Select Area</option>");
		$('#Area_list_receiptsreport').addClass('show');
		$("#Area_list_receiptsreport").css("display", "block");
    }		
      
}


function listcity()

{

	// var selectvalue= $("#zone_list_loanlistview").val();
	var zonevalue = document.getElementById("zone_list_receiptsreport").value;
	// var zonevalue = selectBox.options[selectzone.selectedIndex].value;

 	var areavalue = document.getElementById("Area_list_receiptsreport").value;
    //var areavalue = selectBox.options[selectarea.selectedIndex].value;
  	
  	// alert(areavalue);

    if(areavalue){

		var baseurl= $("#baseurl").val();
		//alert(val);
		$.ajax({
			type: "POST",
			url: baseurl+'Receiptsreport/show_citylist',
			async: false,
			type: "POST",
			data: "zonevalue="+zonevalue+"&areavalue="+areavalue,
			dataType: "html",
			success: function(response)
			{
			//	alert(response)
				$('#city_list_receiptsreport').empty().append(response);
				$('#city_list_receiptsreport').addClass('show');
				$("#city_list_receiptsreport").css("display", "block");
				$('#village_list_receiptsreport').empty();
				$('#street_list_receiptsreport').empty();

			}


		});
    }else{
    	$('#city_list_receiptsreport').empty().append("<option value= >Select City</option>");
		$('#city_list_receiptsreport').addClass('show');
		$("#city_list_receiptsreport").css("display", "block");
    }	
      
}

function listvillage()

{

	// var selectvalue= $("#zone_list_loanlistview").val();
	var zonevalue = document.getElementById("zone_list_receiptsreport").value;
 	var areavalue = document.getElementById("Area_list_receiptsreport").value;
  	var cityvalue = document.getElementById("city_list_receiptsreport").value;
  	// alert(cityvalue);

    if(cityvalue){

		var baseurl= $("#baseurl").val();
		//alert(val);
		$.ajax({
			type: "POST",
			url: baseurl+'Receiptsreport/show_villagelist',
			async: false,
			type: "POST",
			data: "zonevalue="+zonevalue+"&areavalue="+areavalue+"&cityvalue="+cityvalue,
			dataType: "html",
			success: function(response)
			{
				// alert(response)
				$('#village_list_receiptsreport').empty().append(response);
				$('#village_list_receiptsreport').addClass('show');
				$("#village_list_receiptsreport").css("display", "block");
				$('#street_list_receiptsreport').empty();
			}

		});
    }else{
    	$('#village_list_receiptsreport').empty().append("<option value=>Select Village</option>");
		$('#village_list_receiptsreport').addClass('show');
		$("#village_list_receiptsreport").css("display", "block");
    }		
      
}

function liststreet()

{

	// var selectvalue= $("#zone_list_loanlistview").val();
	var zonevalue    = document.getElementById("zone_list_receiptsreport").value;
 	var areavalue    = document.getElementById("Area_list_receiptsreport").value;
  	var cityvalue    = document.getElementById("city_list_receiptsreport").value;
  	var villagevalue = document.getElementById("village_list_receiptsreport").value;
  	//var streetvalue = document.getElementById("street_list_loanlistview").value;
  	
    if(villagevalue){

		var baseurl= $("#baseurl").val();
		//alert(val);
		$.ajax({
			type: "POST",
			url: baseurl+'Receiptsreport/show_streetlist',
			async: false,
			type: "POST",
			data: "zonevalue="+zonevalue+"&areavalue="+areavalue+"&cityvalue="+cityvalue+"&villagevalue="+villagevalue,
			dataType: "html",
			success: function(response)
			{
			//	alert(response)
				$('#street_list_receiptsreport').empty().append(response);
				$('#street_list_receiptsreport').addClass('show');
				$("#street_list_receiptsreport").css("display","block");
				}

		});
    }else{

    	$('#street_list_receiptsreport').empty().append("<option value= >Select Street</option>");
		$('#street_list_receiptsreport').addClass('show');
		$("#street_list_receiptsreport").css("display","block");
    }	
      
}
</script>
<!-- <script>
	function zone_validation()
{
	//system Name empty Check
	var err = 0;
	var zone_list_receiptsreport = $('#zone_list_receiptsreport').val();

    if(zone_list_receiptsreport.trim()==''){
        $('#zone_list_receiptsreport_err').html('Please select Zone!');
        err++;
    }else{
      
			$('#zone_list_receiptsreport_err').html('');
		}

	var Area_list_receiptsreport = $('#Area_list_receiptsreport').val();

    if(Area_list_receiptsreport.trim()==''){
        $('#Area_list_receiptsreport_err').html('Please select Area!');
        err++;
    }else{
      
			$('#Area_list_receiptsreport_err').html('');
		}	
	 
    if(err>0){ return false; }else { return true; }

} 

</script> -->

<script>
	
	var company_list_receiptsreport = $('#company_list_receiptsreport').val();

    if(company_list_receiptsreport.trim()==''){
        $('#company_list_receiptsreport_err').html('Please select any one field!');
        err++;
    }else{
      
			$('#company_list_receiptsreport_err').html('');
		}	
	 
    if(err>0){ return false; }else { return true; }

</script>	
	</body>
	<!--end::Body-->
</html>