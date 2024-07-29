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
									<h1 class="d-flex align-items-center text-dark fw-bold my-1 fs-3">Loan List Report
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
											<!--begin::Filter-->
											<!-- <button type="button" class="btn btn-primary me-3" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
											<span class="svg-icon svg-icon-2">
												<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="256" height="256" viewBox="0 0 256 256" xml:space="preserve">
													<g transform="translate(128 128) scale(0.72 0.72)" style="">
														<g style="stroke: none; stroke-width: 0; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: none; fill-rule: nonzero; opacity: 1;" transform="translate(-175.05 -175.05000000000004) scale(3.89 3.89)" >
															<path d="M 37.882 90 c -0.338 0 -0.676 -0.086 -0.981 -0.258 c -0.629 -0.354 -1.019 -1.02 -1.019 -1.742 V 45.354 L 3.923 3.208 C 3.464 2.604 3.388 1.791 3.726 1.11 S 4.758 0 5.517 0 h 78.966 c 0.76 0 1.453 0.43 1.791 1.11 s 0.262 1.493 -0.197 2.098 L 54.118 45.354 V 79.37 c 0 0.699 -0.365 1.348 -0.963 1.71 l -14.237 8.63 C 38.601 89.903 38.241 90 37.882 90 z M 9.543 4 l 29.932 39.474 c 0.264 0.348 0.406 0.772 0.406 1.208 v 39.767 l 10.236 -6.205 V 44.682 c 0 -0.437 0.143 -0.861 0.406 -1.208 L 80.457 4 H 9.543 z M 52.118 79.37 h 0.01 H 52.118 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(255,255,255); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" /></g></g>
												</svg>

											</span>Filter</button> -->
											<!--begin::Menu 1-->
											<!--<div class="menu menu-sub menu-sub-dropdown w-300px w-md-325px" data-kt-menu="true">
												
												<div class="px-7 py-5">
													<div class="fs-5 text-dark fw-bold">Filter Options</div>
												</div>
												
												<div class="separator border-gray-200"></div>
												<div class="px-7 py-5" data-kt-user-table-filter="form">
													<div class="mb-10">
														<label class="form-label fs-6 fw-semibold">Role:</label>
														<select class="form-select form-select-solid fw-bold" data-kt-select2="true" data-placeholder="Select option" data-allow-clear="true" data-kt-user-table-filter="role" data-hide-search="true">
															<option></option>
															<option value="Administrator">Administrator</option>
															<option value="Analyst">Analyst</option>
															<option value="Developer">Developer</option>
															<option value="Support">Support</option>
															<option value="Trial">Trial</option>
														</select>
													</div>
													<div class="mb-10">
														<label class="form-label fs-6 fw-semibold">Two Step Verification:</label>
														<select class="form-select form-select-solid fw-bold" data-kt-select2="true" data-placeholder="Select option" data-allow-clear="true" data-kt-user-table-filter="two-step" data-hide-search="true">
															<option></option>
															<option value="Enabled">Enabled</option>
														</select>
													</div>
													<div class="d-flex justify-content-end">
														<button type="reset" class="btn btn-light btn-active-light-primary fw-semibold me-2 px-6" data-kt-menu-dismiss="true" data-kt-user-table-filter="reset">Reset</button>
														<button type="submit" class="btn btn-primary fw-semibold px-6" data-kt-menu-dismiss="true" data-kt-user-table-filter="filter">Apply</button>
													</div>
													
												</div>
											
											</div>-->
											<!--end::Menu 1-->
											<!--end::Filter-->
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
														<h2 class="fw-bold">Export</h2>
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
																	<option value="">All</option>
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
								<form name="loanlist_report_form" id="loanlist_report_form" method="POST" action="<?php echo base_url();?>Loanslistview" enctype="multipart/form-data" onsubmit="return loanslistview_validation();">
											<div class="row">
												<div class="col-lg-6">
													<div style="padding:10px 10px 10px 10px !important;box-shadow: 0 3px 6px #00002947; border-radius: 5px; background-color: #f5f5f1 !important;">
														<div class="row">
														<!--begin::Label-->
														<label class="col-md-3 col-form-label fw-bold fs-6 required">Company</label>
														<!--end::Label-->
														<!--begin::Col-->
														<div class="col-lg-8 fv-row fv-plugins-icon-container">
															<!--begin::Select-->
														<select class="form-select form-select-solid" data-control="select2" name="company_list_loanlistview"  id="company_list_loanlistview" data-hide-search="true" onchange="selectcompany();">
														<option value="">Select Companylist</option>
														
														<!-- <?php foreach($company_list as $comlist)
														{?>

														<option value="<?php echo $comlist['COMPANYCODE'];?>"><?php echo $comlist['COMPANYNAME'];?></option><?php
														 }?> -->

														<?php foreach($company_list as $comlist)
														{?>
														<option value="<?php echo $comlist['COMPANYCODE'];?>" 
															<?php if(isset($_POST['company_list_loanlistview']) && $_POST['company_list_loanlistview'] == $comlist['COMPANYCODE']) echo "selected";?>><?php echo $comlist['COMPANYNAME'];?></option><?php
														 }?> 
														</select>
															<!--end::Select-->
														<div class="fv-plugins-message-container invalid-feedback" id="company_list_loanlistview_err"></div>	
														</div>
														<!--end::Col-->	
													</div>
													<div class="row">
														<!--begin::Label-->
														<label class="col-md-3 col-form-label fw-bold fs-6">Zone</label>
														<!--end::Label-->
														<!--begin::Col-->
														<div class="col-lg-8 fv-row fv-plugins-icon-container">
															<!--begin::Select-->
															<select class="form-select form-select-solid" data-control="select2" data-placeholder="Select Zone"name="zone_list_loanlistview" id="zone_list_loanlistview" data-hide-search="true" onchange="listarea();">
															<option value="">Select Zone</option>

														<?php foreach($zone_list as $zonelist)
															{?>
															<option value="<?php echo $zonelist['SNO'];?>"

																<?php if(isset($_POST['zone_list_loanlistview'])){

																	if($_POST['zone_list_loanlistview'] == $zonelist['SNO']) echo "selected";
																	}
																?>
															>
																<?php echo $zonelist['ZONENAME'];?></option><?php
															}?> 

													<!-- <<?php foreach($zone_list as $zonelist)
														{?>
														<option value="<?php echo $zonelist['SNO'];?>" 
															<?php if($zonelist['zone_list_loanlistview'] == $zonelist['SNO']) echo "selected";?>><?php echo $zonelist['ZONENAME'];?></option><?php
														 }?>  -->
															</select>
															<!--end::Select-->

														</div>
														<!--end::Col-->	
													</div>
													
													<div class="row">
														<!--begin::Label-->
														<label class="col-md-3 col-form-label fw-bold fs-6">Area</label>
														<!--end::Label-->
														<!--begin::Col-->
														<div class="col-lg-8 fv-row fv-plugins-icon-container">
															<!--begin::Select-->
														<select class="form-select form-select-solid" data-control="select2" data-placeholder="Select Area"name="area_list_loanlistview" id="area_list_loanlistview" data-placeholder="Select Area" data-hide-search="true" onchange="listcity();">
															<option value="">Select Area</option>
															<?php foreach($area_list as $arealist)
															{?>
															<option value="<?php echo $arealist['SNO'];?>"

															<?php if(isset($_POST['area_list_loanlistview'])){

																if($_POST['area_list_loanlistview'] == $arealist['SNO']) echo "selected";
																}
															?>
																><?php echo $arealist['AREANAME'];?></option>

																<?php
															}?>

												<!-- 	<?php foreach($area_list as $arealist)
													{?>
														<option value="<?php echo $arealist['SNO'];?>" 
															
															<?php if(isset($_POST['area_list_loanlistview']) && $_POST['area_list_loanlistview'] == $arealist['AREAID']) echo "selected";?>><?php echo $arealist['AREANAME'];?></option><?php
													}?>  -->


													<!-- <?php
													$j=1;
													foreach($area_list as $arealist)
													{											
													?>
													<option value="<?php echo $arealist['SNO']; ?>"<?php 
													if($_POST['area_list_loanlistview']== $arealist['SNO'])
														{ echo "selected";}?>> <?php echo $arealist['AREANAME'];?>
													</option>
														<?php 
															$j++;
															}
														?> -->
													</select>
															<!--end::Select-->
														</div>
														<!--end::Col-->	
													</div>
													<div class="row">
														<!--begin::Label-->
														<label class="col-md-3 col-form-label fw-bold fs-6">City</label>
														<!--end::Label-->
														<!--begin::Col-->
														<div class="col-lg-8 fv-row fv-plugins-icon-container">
															<!--begin::Select-->
															<select class="form-select form-select-solid" data-control="select2" data-placeholder="Select City" name="city_list_loanlistview" id="city_list_loanlistview" data-hide-search="true" onchange="listvillage();">
															<option value="">Select City</option>
															<?php foreach($city_list as $citylist)
															{?>
															<option value="<?php echo $citylist['ZONEID'];?>"><?php echo $citylist['CITYNAME'];?></option><?php
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
														<div class="col-lg-8 fv-row fv-plugins-icon-container">
															<!--begin::Select-->
															<select class="form-select form-select-solid" data-control="select2" data-placeholder="Select Village" name="village_list_loanlistview" id="village_list_loanlistview" data-hide-search="true" onchange="liststreet();">
															<option value="">Select Village</option>
															<?php foreach($village_list as $vgelist)
															{?>
															<option value="<?php echo $vgelist['ZONEID'];?>"><?php echo $vgelist['VILLAGENAME'];?></option><?php
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
														<div class="col-lg-8 fv-row fv-plugins-icon-container">
															<!--begin::Select-->
															<select class="form-select form-select-solid" data-control="select2" data-placeholder="Select Street" name="street_list_loanlistview"  id="street_list_loanlistview" data-hide-search="true">
														<!-- <option value="">Select Street</option> -->
														<?php foreach($street_list as $strtlist)
														{?>
														<option value="<?php echo $strtlist['STREETID'];?>"><?php echo $strtlist['STREETNAME'];?></option><?php
														 }?>
														</select>
															<!--end::Select-->
														</div>
														<!--end::Col-->	
													</div>
												</div>
												</div>
												<div class="col-lg-6">
													<div class="row">
														<!--begin::Col-->
														<div class="col-lg-12 fv-row fv-plugins-icon-container">
															<div style="padding:10px 10px 10px 10px !important;box-shadow: 0 3px 6px #00002947; border-radius: 5px; background-color: #f5f5f1 !important;">
																	<div class="row">
																			<div class="col-lg-1 d-flex align-items-center mt-3">
																					<!--begin:Input-->
																		<div class="form-check form-check-custom">
																		<input class="form-check-input2" type="radio" name="loanreport_status" value="YN" <?php if(isset($_POST['loanreport_status']) && $_POST['loanreport_status']=="YN") echo "checked";?>/>
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
																			<input class="form-check-input2" type="radio" name="loanreport_status" value="active_status"<?php if(isset($_POST['loanreport_status']) && $_POST['loanreport_status']=="active_status") echo "checked";?> />
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
																			<input class="form-check-input2" type="radio" name="loanreport_status" value="closed_status" <?php if(isset($_POST['loanreport_status']) && $_POST['loanreport_status']=="closed_status") echo "checked";?> />
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
											<div style="padding:10px 10px 10px 10px !important;box-shadow: 0 3px 6px #00002947; border-radius: 5px; background-color: #f5f5f1 !important;">
												<div class="row">
													<div class="col-lg-6 d-flex align-items-center">
													<div class="form-check form-check-custom">
													<input class="form-check-input2" type="radio" id="select_int_loanview_loanview_report" name="int_radio_loanview_loanview_report" value="select_int_value_loanview_loanview_report" 

													<?php if(isset($_POST['int_radio_loanview_loanview_report']) && $_POST['int_radio_loanview_loanview_report']!="") echo "checked";?>
													/>
													</div>
													<div class="d-flex flex-column">
														<div class="fs-6 fw-semibold text-muted" style="padding-left: 10px;">Select Interest</div>
													</div>
													</div>	
														<!--begin::Col-->
												<div class="col-lg-6 fv-row fv-plugins-icon-container">
													<!--begin::Select-->
													<select class="form-select form-select-solid" data-control="select2" name="int_list_loanlistview" data-placeholder="Select Interest" id="int_list_loanlistview" data-hide-search="true">

												<option value="">Select Interest</option>
											<!-- 	<?php foreach($int_list as $intlst)
												{?>
												<option value="<?php echo $intlst['INTNAME'];?>"><?php echo $intlst['INTNAME'];?></option><?php
												 }?> -->

												<?php foreach($int_list as $intlst)
												{?>
												<option value="<?php echo $intlst['INTNAME'];?>" 
													<?php if(isset($_POST['int_list_loanlistview']) && $_POST['int_list_loanlistview'] == $intlst['INTNAME']) echo "selected";?>><?php echo $intlst['INTNAME'];?></option><?php
												 }?>
											</select>
										<!--end::Select-->
									</div>
									<!--end::Col-->	
								</div>
								<div class="row">	
									<div class="col-lg-6 d-flex align-items-center">
										<div class="form-check form-check-custom">
											<input class="form-check-input2" type="radio" id="int_group_loanview_loanview_report" name="int_radio_loanview_loanview_report" value="int_group_value_loanview_loanview_report" 
											
											<?php if(isset($_POST['int_grp_loanlistview']) && $_POST['int_grp_loanlistview']!="") echo "checked";
											?>/>

										</div>
										<div class="d-flex flex-column">
											<div class="fs-6 fw-semibold text-muted" style="padding-left: 10px;">Select Int Group</div>
										</div>
								</div>	
									<!--begin::Col-->
									<div class="col-lg-6 fv-row fv-plugins-icon-container">
										<!--begin::Select-->
											<select class="form-select form-select-solid" data-control="select2" data-placeholder="Select Interest Group" name="int_grp_loanlistview" id="int_grp_loanlistview" data-hide-search="true">
												<option value="">Select Interest Group</option>
											<!-- 	<?php foreach($int_grp_list as $intgrplist)
												{?>
												<option value="<?php echo $intgrplist['INT_GROUP_NAME'];?>"><?php echo $intgrplist['INT_GROUP_NAME'];?></option><?php
												 }?> -->

												 <?php foreach($int_grp_list as $intgrplist)
												{?>
												<option value="<?php echo $intgrplist['INT_GROUP_NAME'];?>" 
													<?php if(isset($_POST['int_grp_loanlistview']) && $_POST['int_grp_loanlistview'] == $intgrplist['INT_GROUP_NAME']) echo "selected";?>><?php echo $intgrplist['INT_GROUP_NAME'];?></option>
													<?php
												 }?>
											</select>
										<!--end::Select-->
									</div>
									<!--end::Col-->	
								</div>
								</div>
								<br>
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
															<input class="form-check-input2" type="radio" id="daily_llv_page" onclick="daily_llv_click_page()" 
															name="loan_list_view_date" value="daily" <?php if(isset($_POST['loan_list_view_date']) && $_POST['loan_list_view_date']=="daily") echo "checked";?>/>
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
															<input class="form-check-input2" type="radio" id="monthly_llv_page" onclick="monthly_llv_click_page()" name="loan_list_view_date" value="monthly"  <?php if(isset($_POST['loan_list_view_date']) && $_POST['loan_list_view_date']=="monthly") echo "checked";?>/>
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
															<input class="form-check-input2" type="radio" id="period_llv_page" onclick="period_llv_click_page()" name="loan_list_view_date" value="period" <?php if(isset($_POST['loan_list_view_date']) && $_POST['loan_list_view_date']=="period") echo "checked";?>/>
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
											<div style="padding:10px 10px 10px 10px !important;box-shadow: 0 3px 6px #00002947; border-radius: 5px; background-color: #f5f5f1 !important;" style="display: none;">
												<div class="row">
														<div class="col-lg-6 fv-row" id="start_date_page"
														
															<?php if(isset($_POST['loan_list_view_date'])) {

																if($_POST['loan_list_view_date']!='monthly')

																echo "style=display:block;";  else echo "style=display:none;";
															} else echo " style=display:none;";?>
														>
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
																	<input class="form-control form-control-solid ps-12" name="start_date" placeholder="From Date" id="kt_datepicker_loan_list_view_report_daily_from" value="<?php if(isset($_POST['start_date']) && $_POST['start_date']!="") echo ($_POST['start_date']); else echo "";?>"/>
																</div>
															</div>
														<div class="col-lg-4"></div>
														<br>
														<!--begin::Col-->
														<div class="col-lg-6 fv-row" id="end_date_page"

															<?php if(isset($_POST['loan_list_view_date'])) {

																if($_POST['loan_list_view_date']=='period')

																echo "style=display:block;";  else echo "style=display:none;";
															} else echo " style=display:none;";?>

															>
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
																<input class="form-control form-control-solid ps-12" name="to_date" placeholder="To Date" id="kt_datepicker_loan_list_view_report_to" 
																value="<?php if(isset($_POST['to_date']) && $_POST['to_date']!="") echo ($_POST['to_date']); else echo "";?>"/>
																</div>
															</div>
														<!--end::Col-->
														<div class="col-lg-4"></div>
														<!--begin::Col-->
														<div class="col-lg-6 fv-row" id="start_month_page" <?php if(isset($_POST['loan_list_view_date'])) { 

															if($_POST['loan_list_view_date'] == 'period' || $_POST['loan_list_view_date'] == 'daily' )
																echo "style=display:none;"; else echo " style=display:block;";
															}else echo " style=display:none;"; ?>>
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
																<input class="form-control form-control-solid ps-12" name="from_date" placeholder="Month" id="kt_datepicker_loan_list_view_report_month"
																value="<?php if(isset($_POST['from_date']) && $_POST['from_date']!="") echo ($_POST['from_date']); else echo "";?>"/>
																</div>
															</div>
														<!--end::Col-->

													</div>
												</div>
										</div>
									<div class="col-lg-3">
										<div style="padding:10px 10px 10px 10px !important;box-shadow: 0 3px 6px #00002947; border-radius: 5px; background-color: #f5f5f1 !important;">
											<div class="row">
												<label class="col-form-label fw-bold fs-4"><u>Loan Type</u></label>
												<div class="col-lg-1 d-flex align-items-center mt-3">
												<!--begin:Input-->
												<div class="form-check form-check-custom">
													<input class="form-check-input2" type="radio" id="all_loanop_page" onclick="all_loanop_click_page()" name="loan_type_radio" value="loan_type_all" 
													<?php if(isset($_POST['loan_type_radio']) && 
													$_POST['loan_type_radio']=="loan_type_all") echo "checked";?>/>
												</div>
												<!--end:Input-->
												<!--begin::Description-->
												<div class="d-flex flex-column">
													<div class="fs-6 fw-semibold text-muted" style="padding-left: 10px; margin right: 50px !important;">All</div>
												</div>
												<!--end:Description-->
												</div>
											</div>
											<br>
											<div class="row">
												<div class="col-lg-1 d-flex align-items-center mt-3">
												<!--begin:Input-->
												<div class="form-check form-check-custom">
													<input class="form-check-input2" type="radio" id="select_loanop_page" onclick="select_loanop_click_page()"
													name="loan_type_radio" id="loan_type_radio_selection" value="loan_type_selection" 
													<?php if(isset($_POST['loan_type_radio']) && 
													$_POST['loan_type_radio']=="loan_type_selection") echo "checked";?>/>
												</div>
												<!--end:Input-->
												<!--begin::Description-->
												<div class="d-flex flex-column">
													<div class="fs-6 fw-semibold text-muted" style="padding-left: 10px; margin right: 50px !important;">Selection</div>
												</div>
												<!--end:Description-->
												</div>
											<div class="row">
											<!-- <div class="rounded_sys_opt border_sys_opt" style=" margin: 5px 5px 5px 5px !important;display: none;" id="options_loanop_page">
													<div class="col-lg-3 fv-row fv-plugins-icon-container fv-plugins-bootstrap5-row-invalid">
													<div class="d-flex align-items-center">
													<label class="form-check form-check-inline form-check-solid me-5 is-invalid">
														<input class="form-check-input" name="communication[]" type="checkbox" value="1">
													</label>
													<span class="col-form-label fw-semibold fs-6">New</span>
													</div>
												</div>
												<div class="col-lg-3 fv-row fv-plugins-icon-container fv-plugins-bootstrap5-row-invalid">
													<div class="d-flex align-items-center">
													<label class="form-check form-check-inline form-check-solid me-5 is-invalid">
														<input class="form-check-input" name="communication[]" type="checkbox" value="1">
													</label>
													<span class="col-form-label fw-semibold fs-6">Renewal</span>
													</div>
												</div>
												<div class="col-lg-3 fv-row fv-plugins-icon-container fv-plugins-bootstrap5-row-invalid">
													<div class="d-flex align-items-center">
													<label class="form-check form-check-inline form-check-solid me-5 is-invalid">
														<input class="form-check-input" name="communication[]" type="checkbox" value="1">
													</label>
													<span class="col-form-label fw-semibold fs-6">Auctioned</span>
													</div>
												</div>
											</div> -->

											<!--begin::Select-->
											<select class="form-select form-select-solid" data-control="select2" name="loantype_loanlist_view_selection" data-placeholder="Select Loan Type" id="loantype_loanlist_view_selection"  data-hide-search="true">
												<option value="">Select Loan Type</option>
												<option value="NEW"<?php if(isset($_POST['loantype_loanlist_view_selection']) && $_POST['loantype_loanlist_view_selection']=="NEW") echo "selected";?>>NEW</option>
												<option value="RENEWAL" <?php if(isset($_POST['loantype_loanlist_view_selection']) && $_POST['loantype_loanlist_view_selection']=="RENEWAL") echo "selected";?>>RENEWAL</option>
												<option value="AUCTIONED" <?php if(isset($_POST['loantype_loanlist_view_selection']) && $_POST['loantype_loanlist_view_selection'] =="AUCTIONED") echo "selected";?>>AUCTIONED</option>
											</select>
											<!--end::Select-->
										</div>
									</div>
								</div>
								<br>
							</div>
							<br>
							<div class="col-lg-3">
								<div style="padding:10px 10px 10px 10px !important;box-shadow: 0 3px 6px #00002947; border-radius: 5px; background-color: #f5f5f1 !important;">
									<div class="row">
										<label class="col-form-label fw-bold fs-4"><u>Jewel Type</u></label>
									<div class="col-lg-1 d-flex align-items-center mt-3">
									<!--begin:Input-->
									<div class="form-check form-check-custom">
										<input class="form-check-input2" type="radio" id="all_jewel_page" 
										onclick="all_jewel_click_page()" name="loan_list_jeweltype" value="loan_list_jeweltype_all" 
										<?php if(isset($_POST['loan_list_jeweltype']) && 
										$_POST['loan_list_jeweltype']=="loan_list_jeweltype_all") echo "checked";?> />
									</div>
									<!--end:Input-->
									<!--begin::Description-->
									<div class="d-flex flex-column">
										<div class="fs-6 fw-semibold text-muted" style="padding-left: 10px; margin right: 50px !important;">All</div>
									</div>
									<!--end:Description-->
									</div>
								</div>
								<br>
								<div class="row">
									<div class="col-lg-1 d-flex align-items-center mt-3">
									<!--begin:Input-->
									<div class="form-check form-check-custom">
										<input class="form-check-input2" type="radio" id="select_jewel_page" 
										onclick="select_jewel_click_page()" name="loan_list_jeweltype" value="loan_list_jeweltype_selection" 
										<?php if(isset($_POST['loan_list_jeweltype']) && 
										$_POST['loan_list_jeweltype']=="loan_list_jeweltype_selection") echo "checked";?>/>
									</div>
									<!--end:Input-->
									<!--begin::Description-->
									<div class="d-flex flex-column">
										<div class="fs-6 fw-semibold text-muted" style="padding-left: 10px; margin right: 50px !important;">Selection</div>
									</div>
									<!--end:Description-->
									</div>
										<div class="row">
											<!-- <div  class="rounded_sys_opt border_sys_opt" style=" margin: 5px 5px 5px 5px !important;display: none;" id="options_jewel_page">
												<div class="col-lg-3 fv-row fv-plugins-icon-container fv-plugins-bootstrap5-row-invalid">
													<div class="d-flex align-items-center">
													<label class="form-check form-check-inline form-check-solid me-5 is-invalid">
														<input class="form-check-input" name="communication[]" type="checkbox" value="1">
													</label>
													<span class="col-form-label fw-semibold fs-6">GOLD</span>
													</div>
												</div>
												<div class="col-lg-3 fv-row fv-plugins-icon-container fv-plugins-bootstrap5-row-invalid">
													<div class="d-flex align-items-center">
													<label class="form-check form-check-inline form-check-solid me-5 is-invalid">
														<input class="form-check-input" name="communication[]" type="checkbox" value="1" >
													</label>
													<span class="col-form-label fw-semibold fs-6">SILVER</span>
													</div>
												</div>
													<div class="col-lg-3 fv-row fv-plugins-icon-container fv-plugins-bootstrap5-row-invalid">
													<div class="d-flex align-items-center">
													<label class="form-check form-check-inline form-check-solid me-5 is-invalid">
														<input class="form-check-input" name="communication[]" type="checkbox" value="1">
													</label>
													<span class="col-form-label fw-semibold fs-6">STONEGOLD</span>
													</div>
												</div>
											</div> -->
											<!--begin::Select-->
											<select class="form-select form-select-solid" data-control="select2" name="jeweltype_loanlistview" data-placeholder="Select Jewel Type" id="jeweltype_loanlistview" data-hide-search="true">
												<option value="">Select Jewel Type</option>
												<option value="GOLD"<?php if(isset($_POST['jeweltype_loanlistview']) && $_POST['jeweltype_loanlistview'] =="GOLD") echo "selected";?>>GOLD</option>
												<option value="SILVER" <?php if(isset($_POST['jeweltype_loanlistview']) && $_POST['jeweltype_loanlistview'] =="SILVER") echo "selected";?>>SILVER</option>
												<option value="STONE GOLD" <?php if(isset($_POST['jeweltype_loanlistview']) && $_POST['jeweltype_loanlistview'] =="STONE GOLD") echo "selected";?>>STONE GOLD</option>
											</select>
											<!--end::Select-->	
										</div>
									</div>	
								</div>
								<br>
							</div>
							<br>
						</div>
							<div class="row">
								<div class="col-lg-6">
									<div style="padding:10px 10px 10px 10px !important;box-shadow: 0 3px 6px #00002947; border-radius: 5px; background-color: #f5f5f1 !important;">
											<div class="row">
												<div class="col-lg-3 fv-row fv-plugins-icon-container fv-plugins-bootstrap5-row-invalid">
													<div class="d-flex align-items-center">
													<label class="form-check form-check-inline form-check-solid me-5 is-invalid">
														<input class="form-check-input" type="checkbox" value="" id="weight_radio_lv_lv" onclick="wt_radio_lv()" <?php if(isset($_POST['wght_loanlistview']) && $_POST['wght_loanlistview']!="") echo "checked";?>>
													</label>
													<span class="col-form-label fw-semibold fs-6">Weight</span>
													</div>
												</div>
												<div class="col-lg-2" id="weight_radio_tbox_lv_lv" <?php if(isset($_POST['wght_loanlistview']) && $_POST['wght_loanlistview']!="") echo "style=display:block;"; else echo "style=display:none;";?>> <!-- style="display: none;"> -->
												<select class="form-select form-select-solid" data-control="select2"data-hide-search="true" name="wght_loanlistview" onchange="wt_tbox_lv()" id="wt_radio_tbox_lv_lv">
												<!-- <option value="0"></option> -->
												<option value="">Select One</option>
												<option value="="  <?php if(isset($_POST['wght_loanlistview']) && $_POST['wght_loanlistview'] =="=") echo "selected";?>>=</option>
													<option value=">" <?php if(isset($_POST['wght_loanlistview']) && $_POST['wght_loanlistview'] ==">") echo "selected";?>>></option>
													<option value="<" <?php if(isset($_POST['wght_loanlistview']) && $_POST['wght_loanlistview'] =="<") echo "selected";?>><</option>
													<option value=">=" <?php if(isset($_POST['wght_loanlistview']) && $_POST['wght_loanlistview'] ==">=") echo "selected";?>>>=</option>
													<option value="<=" <?php if(isset($_POST['wght_loanlistview']) && $_POST['wght_loanlistview'] =="<=") echo "selected";?>><=</option>
													<option value="between" <?php if(isset($_POST['wght_loanlistview']) && $_POST['wght_loanlistview'] =="between") echo "selected";?>>Between</option>
												</select>
										</div>
										<div class="col-lg-3 fv-row fv-plugins-icon-container">
											<input type="text" name="wght_textboxone" class="form-control form-control-lg form-control-solid" id="weight_radio_tf1_lv_lv" 
											value="<?php if(isset($_POST['wght_textboxone']) && $_POST['wght_textboxone']!="") echo ($_POST['wght_textboxone']); else echo "";?>" 
											<?php if(isset($_POST['wght_loanlistview']) && $_POST['wght_loanlistview']!="") echo "style=display:block;"; 
											else echo "style=display:none;";?>> <!-- style="display: none;"> -->
											<div class="fv-plugins-message-container invalid-feedback"></div>
										</div>
										<div class="col-lg-3 fv-row fv-plugins-icon-container">
											<input type="text" name="wght_textboxtwo" class="form-control form-control-lg form-control-solid" id="weight_radio_tf2_lv_lv" 
											value="<?php if(isset($_POST['wght_textboxtwo']) && $_POST['wght_textboxtwo']!="") echo ($_POST['wght_textboxtwo']); else echo "";?>"
											<?php if(isset($_POST['wght_loanlistview']) && $_POST['wght_loanlistview']=="between") echo "style=display:block;"; 
											else echo "style=display:none;";?>> <!-- style="display: none;"> -->
											<div class="fv-plugins-message-container invalid-feedback"></div>
										</div>
									</div>
									<div class="row">
										<div class="col-lg-3 fv-row fv-plugins-icon-container fv-plugins-bootstrap5-row-invalid">
											<div class="d-flex align-items-center">
											<label class="form-check form-check-inline form-check-solid me-5 is-invalid">
											<input class="form-check-input" name="" type="checkbox" value="" id="amount_radio_lv_lv" onclick="amt_radio_lv()" <?php if(isset($_POST['amt_loanlistview']) && $_POST['amt_loanlistview']!="") echo "checked";?>>
											</label>
											<span class="col-form-label fw-semibold fs-6">Amount</span>
											</div>
										</div>
										<div class="col-lg-2" id="amount_radio_tbox_lv_lv" <?php if(isset($_POST['amt_loanlistview']) && $_POST['amt_loanlistview']!="") echo "style=display:block;"; else echo "style=display:none;";?>> <!-- style="display: none;"> -->
										<select class="form-select form-select-solid" data-control="select2"data-hide-search="true"  name="amt_loanlistview" onchange="amt_tbox_lv()" id="amt_radio_tbox_lv_lv">
										<!-- <option value="0"></option> -->
										
										<option value="">select one</option> 
										<option value="="  <?php if(isset($_POST['amt_loanlistview']) && $_POST['amt_loanlistview'] =="=") echo "selected";?>>=</option>
										<option value=">" <?php if(isset($_POST['amt_loanlistview']) && $_POST['amt_loanlistview'] ==">") echo "selected";?>>></option>
										<option value="<" <?php if(isset($_POST['amt_loanlistview']) && $_POST['amt_loanlistview'] =="<") echo "selected";?>><</option>
										<option value=">=" <?php if(isset($_POST['amt_loanlistview']) && $_POST['amt_loanlistview'] ==">=") echo "selected";?>>>=</option>
										<option value="<=" <?php if(isset($_POST['amt_loanlistview']) && $_POST['amt_loanlistview'] =="<=") echo "selected";?>><=</option>
										<option value="between" <?php if(isset($_POST['amt_loanlistview']) && $_POST['amt_loanlistview'] =="between") echo "selected";?>>Between
										</option>
										</select>
										</div>
										<div class="col-lg-3 fv-row fv-plugins-icon-container">
										<input type="text" name="amt_loanvw_textboxone" class="form-control form-control-lg form-control-solid" id="amount_radio_tf1_lv_lv" 
										value="<?php if(isset($_POST['amt_loanvw_textboxone']) && $_POST['amt_loanvw_textboxone']!="") echo ($_POST['amt_loanvw_textboxone']); else echo "";?>" 
										<?php if(isset($_POST['amt_loanlistview']) && $_POST['amt_loanlistview']!="") echo "style=display:block;"; else echo "style=display:none;";?>
											> <!-- style="display: none;"> -->
											<div class="fv-plugins-message-container invalid-feedback"></div>
										</div>
										<div class="col-lg-3 fv-row fv-plugins-icon-container">
											<input type="text" name="amt_loanvw_textboxtwo" class="form-control form-control-lg form-control-solid" id="amount_radio_tf2_lv_lv"
											value="<?php if(isset($_POST['amt_loanvw_textboxtwo']) && $_POST['amt_loanvw_textboxtwo']!="") echo ($_POST['amt_loanvw_textboxtwo']); else echo "";?>"  <?php if(isset($_POST['amt_loanlistview']) && $_POST['amt_loanlistview']=="between") echo "style=display:block;"; else echo "style=display:none;";?>> <!-- style="display: none;"> -->
											<div class="fv-plugins-message-container invalid-feedback"></div>
										</div>
									</div>
								</div>
							</div>
								<div class="col-lg-3">
									<div style="padding:10px 10px 10px 10px !important;box-shadow: 0 3px 6px #00002947; border-radius: 5px; background-color: #f5f5f1 !important;">
										<div class="row">
										<label class="col-form-label fw-bold fs-4"><u>Bank Status</u></label>
										<div class="col-lg-1 d-flex align-items-center mt-3">
										<!--begin:Input-->
										<div class="form-check form-check-custom">
											<input class="form-check-input2" type="radio" id="" 
											onclick="" name="loanreport_bank" value="all_bank"
											<?php if(isset($_POST['loanreport_bank']) && 
											$_POST['loanreport_bank']=="all_bank") echo "checked";?>/>
										</div>
										<!--end:Input-->
										<!--begin::Description-->
										<div class="d-flex flex-column">
											<div class="fs-6 fw-semibold text-muted" style="padding-left: 10px; margin right: 50px !important;">All</div>
										</div>
										<!--end:Description-->
										</div>
									</div>
									<div class="row">
										<div class="col-lg-6 d-flex align-items-center mt-3">
										<!--begin:Input-->
										<div class="form-check form-check-custom">
											<input class="form-check-input2" type="radio" id="" onclick="" name="loanreport_bank" value="bank"
											<?php if(isset($_POST['loanreport_bank']) && 
											$_POST['loanreport_bank']=="bank") echo "checked";?>/>
										</div>
										<!--end:Input-->
										<!--begin::Description-->
										<div class="d-flex flex-column">
											<div class="fs-6 fw-semibold text-muted" style="padding-left: 10px; margin right: 50px !important;">Bank</div>
										</div>
										<!--end:Description-->
										</div>
									</div>
									<div class="row">
										<div class="col-lg-6 d-flex align-items-center mt-3">
										<!--begin:Input-->
										<div class="form-check form-check-custom">
											<input class="form-check-input2" type="radio" name="loanreport_bank" value="not_bank" <?php if(isset($_POST['loanreport_bank']) && 
											$_POST['loanreport_bank']=="not_bank") echo "checked";?> />
										</div>
										<!--end:Input-->
										<!--begin::Description-->
										<div class="d-flex flex-column">
											<div class="fs-6 fw-semibold text-muted" style="padding-left: 10px; margin right: 50px !important;">Not Bank</div>
										</div>
										<!--end:Description-->
										</div>
									</div>
									</div>
								</div>
								<div class="col-lg-3">
									<div style="padding:10px 10px 10px 10px !important;box-shadow: 0 3px 6px #00002947; border-radius: 5px; background-color: #f5f5f1 !important;">
									<div class="row">
											<label class="col-form-label fw-bold fs-4"><u>Alter Status</u></label>
										<div class="col-lg-6 d-flex align-items-center mt-3">
										<!--begin:Input-->
										<div class="form-check form-check-custom">
											<input class="form-check-input2" type="radio" name="loanreport_alter" value="all_alter" <?php if(isset($_POST['loanreport_alter']) && 
											$_POST['loanreport_alter']=="all_alter") echo "checked";?>/>
										</div>
										<!--end:Input-->
										<!--begin::Description-->
										<div class="d-flex flex-column">
											<div class="fs-6 fw-semibold text-muted" style="padding-left: 10px; margin right: 50px !important;">All</div>
										</div>
										<!--end:Description-->
										</div>
									</div>
									<div class="row">
										<div class="col-lg-6 d-flex align-items-center mt-3">
										<!--begin:Input-->
										<div class="form-check form-check-custom">
											<input class="form-check-input2" type="radio" name="loanreport_alter" value="alter_altonly"  <?php if(isset($_POST['loanreport_alter']) && 
											$_POST['loanreport_alter']=="alter_altonly") echo "checked";?>/>
										</div>
										<!--end:Input-->
										<!--begin::Description-->
										<div class="d-flex flex-column">
											<div class="fs-6 fw-semibold text-muted" style="padding-left: 10px; margin right: 50px !important;">Alt Only</div>
										</div>
										<!--end:Description-->
										</div>
									</div>
									<div class="row">
										<div class="col-lg-6 d-flex align-items-center mt-3">
										<!--begin:Input-->
										<div class="form-check form-check-custom">
											<input class="form-check-input2" type="radio" name="loanreport_alter" value="alter_notalt" <?php if(isset($_POST['loanreport_alter']) && 
											$_POST['loanreport_alter']=="alter_notalt") echo "checked";?> />
										</div>
										<!--end:Input-->
										<!--begin::Description-->
										<div class="d-flex flex-column">
											<div class="fs-6 fw-semibold text-muted" style="padding-left: 10px; margin right: 50px !important;">Not Alt</div>
										</div>
										<!--end:Description-->
										</div>
									</div>
								</div>
							</div>
						</div>
					<br>
						<div class="row">
							<div class="col-lg-10"></div>
							<div class="col-lg-1 d-flex flex-center">
								<button type="reset" class="btn btn-secondary me-3" data-bs-dismiss="modal">Cancel</button>
							</div>
							<div class="col-lg-1 d-flex flex-center">
								<button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Go</button>
							</div>
						</div>
							<!--begin::Table-->
							<table class="table table-striped table-hover table-row-bordered fs-7 gy-1 gs-2" id="kt_datatable_loanlist_view">
								<thead>
	    							<tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">
							          <!--   <th class="min-w-50px">S.No</th> -->
							            <th class="min-w-50px">Date</th>
							            <th class="min-w-100px">Bill No.</th>
							            <th class="min-w-80px">Name</th>
							            <th class="min-w-100px">Weight</th>
							            <th class="min-w-80px">Amount</th>
							            <th class="min-w-80px">Int%</th>
							            <th class="min-w-80px">Adv.Int</th>
							            <th class="min-w-80px">DC</th>
	    							</tr>
								</thead>
								<tbody class="text-gray-600 fw-semibold">
									<?php $i=1; foreach($loan_list_view as $loanlistview){?>
									<tr>
							         <!--    <td>1</td> -->
							            <td><?php echo $loanlistview['ENDATE'];?></td>
							            <td><?php echo $loanlistview['BILLNO'];?></td>
							            <td><?php echo $loanlistview['NAME'];?></td>
							            <td><?php echo $loanlistview['WEIGHT'];?></td>
							            <td><?php echo $loanlistview['AMOUNT'];?></td>
							            <td><?php echo $loanlistview['INTEREST'];?></td>
							            <td><?php echo $loanlistview['ADVANCEINTEREST'];?></td>
							            <td><?php echo $loanlistview['DCAMOUNT'];?></td>
							        </tr>
							        <?php $i++;}?>
							    </tbody>

							   <!--  <?php echo $loan_list_view ?>exit(); -->
								<!--<tfoot>
	    							<tr class="text-start text-muted fw-bold fs-6 text-uppercase gs-0">
							            <th class="min-w-50px"></th>
							            <th class="min-w-50px"></th>
							            <th class="min-w-100px"></th>
							            <th class="min-w-80px">Total</th>
							            <th class="min-w-100px">55.890</th>
							            <th class="min-w-80px">22546008</th>
							            <th class="min-w-80px"></th>
							            <th class="min-w-80px">125200</th>
							            <th class="min-w-80px">58000</th>
	    							</tr>
								</tfoot>-->
								</table>
									<!--end::Table-->
								</div>
								<!--end::Card body-->
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
		<input type="hidden" id="baseurl" value="<?php echo base_url();?>">
		<?php $this->load->view("script");?>
<script>
	$("#kt_datepicker_loan_list_view_report_daily_from").flatpickr({
			dateFormat: "d-m-Y",
		});
		$("#kt_datepicker_loan_list_view_report_to").flatpickr({
			dateFormat: "d-m-Y",
		});
		$("#kt_datepicker_loan_list_view_report_month").flatpickr({
			dateFormat: "d-m-Y",
		});
</script>
<script>
	function wt_radio_lv()
	{
		var weight_radio_lv_lv = document.getElementById("weight_radio_lv_lv");
		var weight_radio_tbox_lv_re = document.getElementById("weight_radio_tbox_lv_lv");
		var weight_radio_tf1_lv_lv = document.getElementById("weight_radio_tf1_lv_lv");
		var weight_radio_tf2_lv_lv = document.getElementById("weight_radio_tf2_lv_lv");

		if (weight_radio_lv_lv.checked == true)
		{
		    weight_radio_tbox_lv_lv.style.display = "block";
		    weight_radio_tf1_lv_lv.style.display = "block";
	  	} else 
	  	{
	     	weight_radio_tbox_lv_lv.style.display = "none";
	     	weight_radio_tf1_lv_lv.style.display = "none";
	     	weight_radio_tf2_lv_lv.style.display = "none";
	  	}
	}
</script>
<script>
	function wt_tbox_lv()
	{
		var wt_radio_tbox_lv_lv = document.getElementById("wt_radio_tbox_lv_lv").value;

		 if (wt_radio_tbox_lv_lv=="between") 
		  {
		  	$("#weight_radio_tf2_lv_lv").show();
		  }
		  else
		  {
		  	$("#weight_radio_tf2_lv_lv").hide();
		  }
}
</script>
<script>
	function amt_radio_lv()
	{
		var amount_radio_lv_lv = document.getElementById("amount_radio_lv_lv");
		var amount_radio_tbox_lv_lv = document.getElementById("amount_radio_tbox_lv_lv");
		var amount_radio_tf1_lv_lv = document.getElementById("amount_radio_tf1_lv_lv");
		var amount_radio_tf2_lv_lv = document.getElementById("amount_radio_tf2_lv_lv");

		if (amount_radio_lv_lv.checked == true)
		{
		    amount_radio_tbox_lv_lv.style.display = "block";
		    amount_radio_tf1_lv_lv.style.display = "block";
	  	} else 
	  	{
	     	amount_radio_tbox_lv_lv.style.display = "none";
	     	amount_radio_tf1_lv_lv.style.display = "none";
	     	amount_radio_tf2_lv_lv.style.display = "none";
	  	}
	}
</script>
<script>
	function amt_tbox_lv()
	{
		var amt_radio_tbox_lv_lv = document.getElementById("amt_radio_tbox_lv_lv").value;

		 if (amt_radio_tbox_lv_lv=="between") 
		  {
		  	$("#amount_radio_tf2_lv_lv").show();
		  }
		  else
		  {
		  	$("#amount_radio_tf2_lv_lv").hide();
		  }
}
</script>
<script>
	$('input:radio[name="int_radio_loanview_loanview_report"]').change(function() {
        if ($(this).val()=='select_int_value_loanview_loanview_report') 
        {
        	// alert("if");
            $('#int_grp_loanlistview').attr('disabled',true);
        } else
        {
            $('#int_grp_loanlistview').removeAttr('disabled');
            // alert("else");
        }
    });

    $('input:radio[name="int_radio_loanview_loanview_report"]').change(function() {
        if ($(this).val()=='int_group_value_loanview_loanview_report') 
        {
            $('#int_list_loanlistview').attr('disabled',true);
        } else
        {
            $('#int_list_loanlistview').removeAttr('disabled');
        }
    });
</script>
<script>
	$('input:radio[name="loan_type_radio"]').change(function() {
        if ($(this).val()=='loan_type_all') 
        {
        	// alert("if");
            $('#loantype_loanlist_view_selection').attr('disabled',true);
        } else
        {
            $('#loantype_loanlist_view_selection').removeAttr('disabled');
            // alert("else");
        }
    });
</script>

<script>
	$('input:radio[name="loan_list_jeweltype"]').change(function() {
        if ($(this).val()=='loan_list_jeweltype_all') 
        {
        	// alert("if");
            $('#jeweltype_loanlistview').attr('disabled',true);
        } else
        {
            $('#jeweltype_loanlistview').removeAttr('disabled');
            // alert("else");
        }
    });
</script>
	<script>
		function all_jewel_click_page()
		{
			var all_jewel_llv = document.getElementById("all_jewel_page");
			var select_jewel_llv = document.getElementById("select_jewel_page");
			var options_jewel_llv = document.getElementById("options_jewel_page");

			if (all_jewel_page.checked == true)
			{
			    options_jewel_page.style.display = "none";
		  	} else 
		  	{
		     	select_jewel_page.style.display = "block";
			    options_jewel_page.style.display = "block";
		  	}
		}
	</script>
	<script>
		function select_jewel_click_page()
		{
			var all_jewel_llv = document.getElementById("all_jewel_page");
			var select_jewel_llv = document.getElementById("select_jewel_page");
			var options_jewel_llv = document.getElementById("options_jewel_page"); 
		  	{
		     	select_jewel_page.style.display = "block";
			    options_jewel_page.style.display = "block";
		  	}
		}
	</script>
	<script>
		function all_loanop_click_page()
		{
			var all_loanop_llv = document.getElementById("all_loanop_page");
			var select_loanop_llv = document.getElementById("select_loanop_page");
			var options_loanop_llv = document.getElementById("options_loanop_page");

			if (all_loanop_page.checked == true)
			{
			    options_loanop_page.style.display = "none";
		  	} else 
		  	{
		     	select_loanop_page.style.display = "block";
			    options_loanop_page.style.display = "block";
		  	}
		}
	</script>
	<script>
		function select_loanop_click_page()
		{
			var all_loannop_llv = document.getElementById("all_loanop_page");
			var select_loanop_llv = document.getElementById("select_loanop_page");
			var options_loanop_llv = document.getElementById("options_loanop_page"); 
		  	{
		     	select_loanop_page.style.display = "block";
			    options_loanop_page.style.display = "block";
		  	}
		}
	</script>
	<script>
		function daily_llv_click_page()
		{
			var daily_llv = document.getElementById("daily_llv_page");
			var monthly_llv = document.getElementById("monthly_llv_page");
			var period_llv = document.getElementById("period_llv_page");
			var start_llv = document.getElementById("start_date_page");
			var end_llv = document.getElementById("end_date_page");

			if (daily_llv_page.checked == true)
			{
			   start_date_page.style.display = "block";
			   end_date_page.style.display = "none";
			   start_month_page.style.display="none";
		  	} else 
		  	{
		     	start_date_page.style.display = "none";
			    end_date_page.style.display = "none";
			    start_month_page.style.display="none";
		  	}
		}
	</script>
	<script>
		function monthly_llv_click_page()
		{
			var daily_llv = document.getElementById("daily_llv_page");
			var monthly_llv = document.getElementById("monthly_llv_page");
			var period_llv = document.getElementById("period_llv_page");
			var start_llv_month = document.getElementById("start_month_page");
			var end_llv_month = document.getElementById("end_month_page");

			if (monthly_llv.checked == true)
			{
			   start_month_page.style.display = "block";
			   start_date_page.style.display = "none";
			   end_date_page.style.display = "none";
			   
		  	} else 
		  	{
		     	start_month_page.style.display = "none";
		     	start_date_page.style.display = "none";
			    end_date_page.style.display = "none";
		  	}
		}
	</script>
	<script>
		function period_llv_click_page()
		{
			var daily_llv = document.getElementById("daily_llv_page");
			var monthly_llv = document.getElementById("monthly_llv_page");
			var period_llv = document.getElementById("period_llv_page");
			var start_llv = document.getElementById("start_date_page");
			var end_llv = document.getElementById("end_date_page");

			if (period_llv_page.checked == true)
			{
			   start_date_page.style.display = "block";
			   end_date_page.style.display = "block";
			   start_month_page.style.display = "none";
		  	} else 
		  	{
		     	start_date_page.style.display = "none";
			    end_date_page.style.display = "none";
			    start_month_page.style.display = "none";
		  	}
		}
	</script>
	<script>
	
	$('#kt_datatable_loanlist_view').DataTable( {
	"aaSorting": [],
    dom: 'Bfrtip',
    buttons: [
        'copyHtml5',
        'excelHtml5',
        'csvHtml5',
        'pdfHtml5'
    ]
	} );

function listarea()

{
	// var selectvalue= $("#zone_list_loanlistview").val();
	// alert(selectvalue);

 	var selectBox = document.getElementById("zone_list_loanlistview");
    var selectedValue = selectBox.options[selectBox.selectedIndex].value;
    	
    if(selectedValue.length){

		var baseurl= $("#baseurl").val();
		//alert(val);
		$.ajax({
			type: "POST",
			url: baseurl+'Loanslistview/show_arealist',
			async: false,
			type: "POST",
			data: "zone_id="+selectedValue,
			dataType: "html",
			success: function(response)
			{
			//	alert(response)
			$('#area_list_loanlistview').empty().append(response);
			$('#area_list_loanlistview').addClass('show');
			$("#area_list_loanlistview").css("display", "block");
			}
		});
    }else{
    	$('#area_list_loanlistview').empty().append("<option value= >Select Zone</option>");
		$('#area_list_loanlistview').addClass('show');
		$("#area_list_loanlistview").css("display", "block");
    }		
      
}

function listcity()

{

	// var selectvalue= $("#zone_list_loanlistview").val();
	var zonevalue = document.getElementById("zone_list_loanlistview").value;
	// var zonevalue = selectBox.options[selectzone.selectedIndex].value;

 	var areavalue = document.getElementById("area_list_loanlistview").value;
    //var areavalue = selectBox.options[selectarea.selectedIndex].value;
  	
  	// alert(areavalue);

    if(areavalue){

		var baseurl= $("#baseurl").val();
		//alert(val);
		$.ajax({
			type: "POST",
			url: baseurl+'Loanslistview/show_citylist',
			async: false,
			type: "POST",
			data: "zonevalue="+zonevalue+"&areavalue="+areavalue,
			dataType: "html",
			success: function(response)
			{
			//	alert(response)
				$('#city_list_loanlistview').empty().append(response);
				$('#city_list_loanlistview').addClass('show');
				$("#city_list_loanlistview").css("display", "block");
				}


		});
    }else{
    	$('#city_list_loanlistview').empty().append("<option value= >Select Zone</option>");
		$('#city_list_loanlistview').addClass('show');
		$("#city_list_loanlistview").css("display", "block");
    }	
      
}

function listvillage()

{

	// var selectvalue= $("#zone_list_loanlistview").val();
	var zonevalue = document.getElementById("zone_list_loanlistview").value;
 	var areavalue = document.getElementById("area_list_loanlistview").value;
  	var cityvalue = document.getElementById("city_list_loanlistview").value;
  	// alert(cityvalue);

    if(cityvalue){

		var baseurl= $("#baseurl").val();
		//alert(val);
		$.ajax({
			type: "POST",
			url: baseurl+'Loanslistview/show_villagelist',
			async: false,
			type: "POST",
			data: "zonevalue="+zonevalue+"&areavalue="+areavalue+"&cityvalue="+cityvalue,
			dataType: "html",
			success: function(response)
			{
				// alert(response)
				$('#village_list_loanlistview').empty().append(response);
				$('#village_list_loanlistview').addClass('show');
				$("#village_list_loanlistview").css("display", "block");
				}

		});
    }else{
    	$('#village_list_loanlistview').empty().append("<option value=>Select Zone</option>");
		$('#village_list_loanlistview').addClass('show');
		$("#village_list_loanlistview").css("display", "block");
    }		
      
}

function liststreet()

{

	
	// var selectvalue= $("#zone_list_loanlistview").val();
	var zonevalue    = document.getElementById("zone_list_loanlistview").value;
 	var areavalue    = document.getElementById("area_list_loanlistview").value;
  	var cityvalue    = document.getElementById("city_list_loanlistview").value;
  	var villagevalue = document.getElementById("village_list_loanlistview").value;
  	//var streetvalue = document.getElementById("street_list_loanlistview").value;
  	
    if(villagevalue){

		var baseurl= $("#baseurl").val();
		//alert(val);
		$.ajax({
			type: "POST",
			url: baseurl+'Loanslistview/show_streetlist',
			async: false,
			type: "POST",
			data: "zonevalue="+zonevalue+"&areavalue="+areavalue+"&cityvalue="+cityvalue+"&villagevalue="+villagevalue,
			dataType: "html",
			success: function(response)
			{
			//	alert(response)
				$('#street_list_loanlistview').empty().append(response);
				$('#street_list_loanlistview').addClass('show');
				$("#street_list_loanlistview").css("display","block");
				}

		});
    }else{

    	$('#street_list_loanlistview').empty().append("<option value= >Select Zone</option>");
		$('#street_list_loanlistview').addClass('show');
		$("#street_list_loanlistview").css("display","block");
    }	
      
}
function selectcompany()

{
	// var selectvalue= $("#company_list_loanlistview").value;
	// alert("sdhfsdj");

 	var selectBox = document.getElementById("company_list_loanlistview");
    var selectedValue = selectBox.options[selectBox.selectedIndex].value;
    	
  //   if(selectedValue){

		// var baseurl= $("#baseurl").val();
		// //alert(val);
		// $.ajax({
		// 	type: "POST",
		// 	url: baseurl+'Loanslistview/show_zonelist',

		// 	async: false,
		// 	type: "POST",
		// 	data: "company="+selectedValue,
		// 	dataType: "html",
		// 	success: function(response)
		// 	{
		// 	//	alert(response)
		// 		$('#zone_list_loanlistview').empty().append(response);
		// 		$('#zone_list_loanlistview').addClass('show');
		// 		$("#zone_list_loanlistview").css("display", "block");
		// 	}
		// });
  //   }else{
  //   	$('#zone_list_loanlistview').empty().append("<option value= >Select Zone</option>");
		// $('#zone_list_loanlistview').addClass('show');
		// $("#zone_list_loanlistview").css("display", "block");
  //   }	
      
}

		
</script>
<script>
	function loanslistview_validation()
{
	//system Name empty Check
	var err = 0;
	var company_list_loanlistview = $('#company_list_loanlistview').val();

    if(company_list_loanlistview.trim()==''){
        $('#company_list_loanlistview_err').html('Please select Company!');
        err++;
    }else{
      
			$('#company_list_loanlistview_err').html('');
		}
 

    if(err>0){ return false; }else { return true; }

 } 

</script>	
	</body>
	<!--end::Body-->
</html>