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
									<h1 class="d-flex align-items-center text-dark fw-bold my-1 fs-3">Redemptions Report
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
						<form name="redemptionreport_form" id="redemptionreport_form" method="POST" action="<?php echo base_url(); ?>Redemptionreport" enctype="multipart/form-data">
						<div class="row">
							<div class="col-lg-6">
								<div style="padding:10px 10px 10px 10px !important;box-shadow: 0 3px 6px #00002947; border-radius: 5px; background-color: #f5f5f1 !important;">
								<div class="row">
									<!--begin::Label-->
									<label class="col-md-3 col-form-label fw-bold fs-6">Company</label>
									<!--end::Label-->
									<!--begin::Col-->
									<div class="col-lg-8 fv-row fv-plugins-icon-container">
											<!--begin::Select-->
													<select class="form-select form-select-solid" data-control="select2" name="company_list_redemreport"  id="company_list_redemreport" data-hide-search="true" data-placeholder="Select Company" onchange="selectcompany();">
														<option value="ALL">ALL</option>

														<?php foreach($company_list as $comlist)
														{?>
														<option value="<?php echo $comlist['COMPANYCODE'];?>" 
															<?php if(isset($_POST['company_list_redemreport']) && $_POST['company_list_redemreport'] == $comlist['COMPANYCODE']) echo "selected";?>><?php echo $comlist['COMPANYNAME'];?></option><?php
														 }?> 
													</select>
												<div class="fv-plugins-message-container invalid-feedback" id="company_list_redemreport_err"></div>		
											<!--end::Select-->
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
											<select class="form-select form-select-solid" data-control="select2" data-placeholder="Select Zone"name="zone_list_redemreport" id="zone_list_redemreport" data-hide-search="true" onchange="listarea();">
											<option value="">Select Zone</option>
											<?php foreach($zone_list as $zonelist)
											{?>
											<option value="<?php echo $zonelist['SNO'];?>"

												<?php if(isset($_POST['zone_list_redemreport'])){

													if($_POST['zone_list_redemreport'] == $zonelist['SNO']) echo "selected";
												
													}
												?>
											>
												<?php echo $zonelist['ZONENAME'];?></option><?php
											}?> 
											</select>
											<!--end::Select-->
											<div class="fv-plugins-message-container invalid-feedback" id="zone_list_redemreport_err">
											</div>
											<!--end::Col-->
										</div>	
								</div>
								<div class="row">
								<!--begin::Label-->
								<label class="col-md-3 col-form-label fw-bold fs-6">Area</label>
								<!--end::Label-->
								<!--begin::Col-->
								<div class="col-lg-8 fv-row fv-plugins-icon-container">
										<!--begin::Select-->
										<select class="form-select form-select-solid" data-control="select2" data-placeholder="Select Area" name="Area_list_redemreport" id="Area_list_redemreport" data-hide-search="true" onchange="listcity();">
											<option value="">ALL</option>

											<?php  
											// print_r($area_list);
											foreach($area_list as $arealist)
											{?>
											<option value="<?php echo $arealist['AREANAME'];?>"

											<?php if(isset($_POST['Area_list_redemreport'])){

												if($_POST['Area_list_redemreport'] == $arealist['AREANAME']) echo "selected";
												}
											?>

												><?php echo $arealist['AREANAME'];?></option>

												<?php
											}?> 
										</select>

										<div class="fv-plugins-message-container invalid-feedback" id="Area_list_redemreport_err"></div>	
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
											<select class="form-select form-select-solid" data-control="select2" data-placeholder="Select City" name="city_list_redemreport" id="city_list_redemreport" data-hide-search="true" onchange="listvillage();">
														<option value="">ALL</option>
														<?php  foreach($city_list as $citylist)
														{?>
														<option value="<?php echo $citylist['CITYNAME'];?>"

														<?php if(isset($_POST['city_list_redemreport'])){

															if($_POST['city_list_redemreport'] == $citylist['CITYNAME']) echo "selected";
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
								<div class="col-lg-8 fv-row fv-plugins-icon-container">
									<!--begin::Select-->
									<select class="form-select form-select-solid" data-control="select2" data-placeholder="Select Village" name="village_list_redemreport" id="village_list_redemreport" data-hide-search="true" onchange="liststreet();">
										<option value="">ALL</option>
										<?php  foreach($village_list as $villagelist)
											{?>
											<option value="<?php echo $villagelist['VILLAGENAME'];?>"

											<?php if(isset($_POST['village_list_redemreport'])){

												if($_POST['village_list_redemreport'] == $villagelist['VILLAGENAME']) echo "selected";
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
								<div class="col-lg-8 fv-row fv-plugins-icon-container">
										<!--begin::Select-->
										<select class="form-select form-select-solid" data-control="select2" data-placeholder="Select Street" name="street_list_redemreport"  id="street_list_redemreport" data-hide-search="true">
											<option value="">ALL</option>
											<?php  foreach($street_list as $streetlist)
											{?>
											<option value="<?php echo $streetlist['STREETNAME'];?>"

											<?php if(isset($_POST['street_list_redemreport'])){

												if($_POST['street_list_redemreport'] == $streetlist['STREETNAME']) echo "selected";
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
						<div class="col-lg-6">	
							<div style="padding:10px 10px 10px 10px !important;box-shadow: 0 3px 6px #00002947; border-radius: 5px; background-color: #f5f5f1 !important;" id="redemp_block">
								<label class="col-form-label fw-bold fs-4"><u>Redemption Type</u></label>
								<div class="row">
									<div class="col-lg-6 d-flex align-items-center">
										<div class="form-check form-check-custom">
											<input class="form-check-input2" type="radio" id="select_int_rem_nor_report" name="int_radio_rem_nor_report" value="select_int_value_rem_nor_report" checked

											<?php if(isset($_POST['int_radio_rem_nor_report']) && $_POST['int_radio_rem_nor_report']=="select_int_value_rem_nor_report") echo "checked";?>
											 />
										</div>
										<div class="d-flex flex-column">
											<div class="fs-6 fw-semibold text-muted" style="padding-left: 10px;">Normal</div>
										</div>
									</div>
								</div>
								<br>
								<div class="row">
										<div class="col-lg-7 d-flex align-items-center">
										<div class="form-check form-check-custom">
											<input class="form-check-input2" type="radio" id="loan_from_click" onclick="loanfrom_click()" name="int_radio_rem_nor_report" value="redemption_days"

											<?php if(isset($_POST['int_radio_rem_nor_report']) && $_POST['int_radio_rem_nor_report']=="redemption_days") echo "checked";?>
											/>
										</div>
										<div class="d-flex flex-column">
											<div class="fs-6 fw-semibold text-muted" style="padding-left: 10px;">Loan from & Redemption upto</div><!--name="int_radio_rem_nor_report" value="int_group_value_rem_nor_report"-->
										</div>
										</div>
										<div class="col-lg-3">
											<input type="text" class="form-control form-control-lg form-control-solid" id="int_group_tbox_rem_nor_report" name="int_radio_tbox_rem_nor_report" placeholder="100" value="100">
										</div>
										<div class="col-lg-2">
											<label class=" col-form-label fw-bold fs-6">Days</label>
										</div>
									</div>
								<br>
								<div class="row">
									<!--begin::Label-->
									<label class="col-md-3 col-form-label fw-bold fs-6">Closing Type</label>
									<!--end::Label-->
									<!--begin::Col-->
									<div class="col-lg-7 fv-row fv-plugins-icon-container">
										<!--begin::Select-->
										<select class="form-select form-select-solid" data-control="select2" data-hide-search="true" id="closing_type" name="closing_type">	
											<option value="">ALL</option>
											<option value="pclose"  <?php if(isset($_POST['closing_type']) && $_POST['closing_type'] =="pclose") echo "selected";?>>Party_close</option>				
											<option value="ptransfer"  <?php if(isset($_POST['closing_type']) && $_POST['closing_type'] =="ptransfer") echo "selected";?> >Party_Transfer</option>
											<option value="cclose"  <?php if(isset($_POST['closing_type']) && $_POST['closing_type'] =="cclose") echo "selected";?> >Company_Close</option>
											<option value="ctransfer"  <?php if(isset($_POST['closing_type']) && $_POST['closing_type'] =="ctransfer") echo "selected";?> >Company_Transfer</option>
											<option value="transfer"  <?php if(isset($_POST['closing_type']) && $_POST['closing_type'] =="transfer") echo "selected";?>>Transfer</option>
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
													<input class="form-check-input2" type="radio" id="daily_red_red" onclick="daily_red_red_click()" name="select_date_redem" value="daily" checked />
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
													<input class="form-check-input2" type="radio" id="monthly_red_red" onclick="monthly_red_red_click()" name="select_date_redem" value="monthly" 

													<?php if(isset($_POST['select_date_redem']) && $_POST['select_date_redem']=="monthly") echo "checked";?>

													/>
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
													<input class="form-check-input2" type="radio" id="period_red_red" onclick="period_red_red_click()" name="select_date_redem" value="period"

													<?php if(isset($_POST['select_date_redem']) && $_POST['select_date_redem']=="period") echo "checked";?>
													/>
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
						<div class="col-lg-4" id="date_block" >
							<div style="padding:10px 10px 10px 10px !important;box-shadow: 0 3px 6px #00002947; border-radius: 5px; background-color: #f5f5f1 !important;"  >
								<div class="row">
										<div class="col-lg-6 fv-row" id="start_date_red_red"
											style="<?php 
												if(isset($_POST['select_date_redem']) ){
													if($_POST['select_date_redem'] == 'monthly') echo "display: none"; else echo "display:block";
												}else{
													echo "display:block";
												}
												?>" 
											>
												<label class="form-label">Start Date</label>
												<div class="d-flex align-items-center" 
													
												>
													<!--begin::Svg Icon | path: icons/duotune/general/gen014.svg-->
													<span class="svg-icon position-absolute ms-4 svg-icon-2 dt">
														<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
															<path opacity="0.3" d="M21 22H3C2.4 22 2 21.6 2 21V5C2 4.4 2.4 4 3 4H21C21.6 4 22 4.4 22 5V21C22 21.6 21.6 22 21 22Z" fill="currentColor" />
															<path d="M6 6C5.4 6 5 5.6 5 5V3C5 2.4 5.4 2 6 2C6.6 2 7 2.4 7 3V5C7 5.6 6.6 6 6 6ZM11 5V3C11 2.4 10.6 2 10 2C9.4 2 9 2.4 9 3V5C9 5.6 9.4 6 10 6C10.6 6 11 5.6 11 5ZM15 5V3C15 2.4 14.6 2 14 2C13.4 2 13 2.4 13 3V5C13 5.6 13.4 6 14 6C14.6 6 15 5.6 15 5ZM19 5V3C19 2.4 18.6 2 18 2C17.4 2 17 2.4 17 3V5C17 5.6 17.4 6 18 6C18.6 6 19 5.6 19 5Z" fill="currentColor" />
															<path d="M8.8 13.1C9.2 13.1 9.5 13 9.7 12.8C9.9 12.6 10.1 12.3 10.1 11.9C10.1 11.6 10 11.3 9.8 11.1C9.6 10.9 9.3 10.8 9 10.8C8.8 10.8 8.59999 10.8 8.39999 10.9C8.19999 11 8.1 11.1 8 11.2C7.9 11.3 7.8 11.4 7.7 11.6C7.6 11.8 7.5 11.9 7.5 12.1C7.5 12.2 7.4 12.2 7.3 12.3C7.2 12.4 7.09999 12.4 6.89999 12.4C6.69999 12.4 6.6 12.3 6.5 12.2C6.4 12.1 6.3 11.9 6.3 11.7C6.3 11.5 6.4 11.3 6.5 11.1C6.6 10.9 6.8 10.7 7 10.5C7.2 10.3 7.49999 10.1 7.89999 10C8.29999 9.90003 8.60001 9.80003 9.10001 9.80003C9.50001 9.80003 9.80001 9.90003 10.1 10C10.4 10.1 10.7 10.3 10.9 10.4C11.1 10.5 11.3 10.8 11.4 11.1C11.5 11.4 11.6 11.6 11.6 11.9C11.6 12.3 11.5 12.6 11.3 12.9C11.1 13.2 10.9 13.5 10.6 13.7C10.9 13.9 11.2 14.1 11.4 14.3C11.6 14.5 11.8 14.7 11.9 15C12 15.3 12.1 15.5 12.1 15.8C12.1 16.2 12 16.5 11.9 16.8C11.8 17.1 11.5 17.4 11.3 17.7C11.1 18 10.7 18.2 10.3 18.3C9.9 18.4 9.5 18.5 9 18.5C8.5 18.5 8.1 18.4 7.7 18.2C7.3 18 7 17.8 6.8 17.6C6.6 17.4 6.4 17.1 6.3 16.8C6.2 16.5 6.10001 16.3 6.10001 16.1C6.10001 15.9 6.2 15.7 6.3 15.6C6.4 15.5 6.6 15.4 6.8 15.4C6.9 15.4 7.00001 15.4 7.10001 15.5C7.20001 15.6 7.3 15.6 7.3 15.7C7.5 16.2 7.7 16.6 8 16.9C8.3 17.2 8.6 17.3 9 17.3C9.2 17.3 9.5 17.2 9.7 17.1C9.9 17 10.1 16.8 10.3 16.6C10.5 16.4 10.5 16.1 10.5 15.8C10.5 15.3 10.4 15 10.1 14.7C9.80001 14.4 9.50001 14.3 9.10001 14.3C9.00001 14.3 8.9 14.3 8.7 14.3C8.5 14.3 8.39999 14.3 8.39999 14.3C8.19999 14.3 7.99999 14.2 7.89999 14.1C7.79999 14 7.7 13.8 7.7 13.7C7.7 13.5 7.79999 13.4 7.89999 13.2C7.99999 13 8.2 13 8.5 13H8.8V13.1ZM15.3 17.5V12.2C14.3 13 13.6 13.3 13.3 13.3C13.1 13.3 13 13.2 12.9 13.1C12.8 13 12.7 12.8 12.7 12.6C12.7 12.4 12.8 12.3 12.9 12.2C13 12.1 13.2 12 13.6 11.8C14.1 11.6 14.5 11.3 14.7 11.1C14.9 10.9 15.2 10.6 15.5 10.3C15.8 10 15.9 9.80003 15.9 9.70003C15.9 9.60003 16.1 9.60004 16.3 9.60004C16.5 9.60004 16.7 9.70003 16.8 9.80003C16.9 9.90003 17 10.2 17 10.5V17.2C17 18 16.7 18.4 16.2 18.4C16 18.4 15.8 18.3 15.6 18.2C15.4 18.1 15.3 17.8 15.3 17.5Z" fill="currentColor" />
														</svg>
													</span>
													<!--end::Svg Icon-->
													<input class="form-control form-control-solid ps-12" name="from_date" placeholder="From Date" id="kt_datepicker_redem_report_from" value="<?php if(isset($_POST['from_date']) && $_POST['from_date']!="" && $_POST['select_date_redem']=="daily") echo ($_POST['from_date']); else echo date("d-m-Y");?>"/>
												</div>
											</div>
										<div class="col-lg-4"></div>
										<!--begin::Col-->
										<div class="col-lg-6 fv-row" id="end_date_red_red"
											style="<?php 
												if(isset($_POST['select_date_redem']) ){
													if($_POST['select_date_redem'] == 'period') echo "display: block"; else echo "display:none";
												}else{
													echo "display:none";
												}
											?>" 
											
											>
												<label class="form-label">End Date</label>
												<div class="d-flex align-items-center" >
												<!--begin::Svg Icon | path: icons/duotune/general/gen014.svg-->
												<span class="svg-icon position-absolute ms-4 svg-icon-2 dt">
													<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
														<path opacity="0.3" d="M21 22H3C2.4 22 2 21.6 2 21V5C2 4.4 2.4 4 3 4H21C21.6 4 22 4.4 22 5V21C22 21.6 21.6 22 21 22Z" fill="currentColor" />
														<path d="M6 6C5.4 6 5 5.6 5 5V3C5 2.4 5.4 2 6 2C6.6 2 7 2.4 7 3V5C7 5.6 6.6 6 6 6ZM11 5V3C11 2.4 10.6 2 10 2C9.4 2 9 2.4 9 3V5C9 5.6 9.4 6 10 6C10.6 6 11 5.6 11 5ZM15 5V3C15 2.4 14.6 2 14 2C13.4 2 13 2.4 13 3V5C13 5.6 13.4 6 14 6C14.6 6 15 5.6 15 5ZM19 5V3C19 2.4 18.6 2 18 2C17.4 2 17 2.4 17 3V5C17 5.6 17.4 6 18 6C18.6 6 19 5.6 19 5Z" fill="currentColor" />
														<path d="M8.8 13.1C9.2 13.1 9.5 13 9.7 12.8C9.9 12.6 10.1 12.3 10.1 11.9C10.1 11.6 10 11.3 9.8 11.1C9.6 10.9 9.3 10.8 9 10.8C8.8 10.8 8.59999 10.8 8.39999 10.9C8.19999 11 8.1 11.1 8 11.2C7.9 11.3 7.8 11.4 7.7 11.6C7.6 11.8 7.5 11.9 7.5 12.1C7.5 12.2 7.4 12.2 7.3 12.3C7.2 12.4 7.09999 12.4 6.89999 12.4C6.69999 12.4 6.6 12.3 6.5 12.2C6.4 12.1 6.3 11.9 6.3 11.7C6.3 11.5 6.4 11.3 6.5 11.1C6.6 10.9 6.8 10.7 7 10.5C7.2 10.3 7.49999 10.1 7.89999 10C8.29999 9.90003 8.60001 9.80003 9.10001 9.80003C9.50001 9.80003 9.80001 9.90003 10.1 10C10.4 10.1 10.7 10.3 10.9 10.4C11.1 10.5 11.3 10.8 11.4 11.1C11.5 11.4 11.6 11.6 11.6 11.9C11.6 12.3 11.5 12.6 11.3 12.9C11.1 13.2 10.9 13.5 10.6 13.7C10.9 13.9 11.2 14.1 11.4 14.3C11.6 14.5 11.8 14.7 11.9 15C12 15.3 12.1 15.5 12.1 15.8C12.1 16.2 12 16.5 11.9 16.8C11.8 17.1 11.5 17.4 11.3 17.7C11.1 18 10.7 18.2 10.3 18.3C9.9 18.4 9.5 18.5 9 18.5C8.5 18.5 8.1 18.4 7.7 18.2C7.3 18 7 17.8 6.8 17.6C6.6 17.4 6.4 17.1 6.3 16.8C6.2 16.5 6.10001 16.3 6.10001 16.1C6.10001 15.9 6.2 15.7 6.3 15.6C6.4 15.5 6.6 15.4 6.8 15.4C6.9 15.4 7.00001 15.4 7.10001 15.5C7.20001 15.6 7.3 15.6 7.3 15.7C7.5 16.2 7.7 16.6 8 16.9C8.3 17.2 8.6 17.3 9 17.3C9.2 17.3 9.5 17.2 9.7 17.1C9.9 17 10.1 16.8 10.3 16.6C10.5 16.4 10.5 16.1 10.5 15.8C10.5 15.3 10.4 15 10.1 14.7C9.80001 14.4 9.50001 14.3 9.10001 14.3C9.00001 14.3 8.9 14.3 8.7 14.3C8.5 14.3 8.39999 14.3 8.39999 14.3C8.19999 14.3 7.99999 14.2 7.89999 14.1C7.79999 14 7.7 13.8 7.7 13.7C7.7 13.5 7.79999 13.4 7.89999 13.2C7.99999 13 8.2 13 8.5 13H8.8V13.1ZM15.3 17.5V12.2C14.3 13 13.6 13.3 13.3 13.3C13.1 13.3 13 13.2 12.9 13.1C12.8 13 12.7 12.8 12.7 12.6C12.7 12.4 12.8 12.3 12.9 12.2C13 12.1 13.2 12 13.6 11.8C14.1 11.6 14.5 11.3 14.7 11.1C14.9 10.9 15.2 10.6 15.5 10.3C15.8 10 15.9 9.80003 15.9 9.70003C15.9 9.60003 16.1 9.60004 16.3 9.60004C16.5 9.60004 16.7 9.70003 16.8 9.80003C16.9 9.90003 17 10.2 17 10.5V17.2C17 18 16.7 18.4 16.2 18.4C16 18.4 15.8 18.3 15.6 18.2C15.4 18.1 15.3 17.8 15.3 17.5Z" fill="currentColor" />
													</svg>
												</span>
												<!--end::Svg Icon-->
												<input class="form-control form-control-solid ps-12" name="to_date" placeholder="To Date" id="kt_datepicker_redem_report_to" value="<?php if(isset($_POST['to_date']) && $_POST['to_date']!="") echo ($_POST['to_date']); else echo date("d-m-Y")?>"  />
												</div>
										</div>
										<!--end::Col-->
										<div class="col-lg-4"></div>
										<!--begin::Col-->
										<div class="col-lg-6 fv-row" id="start_month_red_red" 

											style="<?php 
												if(isset($_POST['select_date_redem']) ){
													if($_POST['select_date_redem'] == 'monthly') echo "display: block"; else echo "display:none";
												}else{
													echo "display:none";
												}
											?>" 




											>
												<label class="form-label">Select Month</label>
												<div class="d-flex align-items-center"

												<?php if(isset($_POST['select_date_redem']) && $_POST['select_date_redem']=="monthly") echo "style=display:block;"; else echo "style=display:none;";?>>
												<!--begin::Svg Icon | path: icons/duotune/general/gen014.svg-->
												<span class="svg-icon position-absolute ms-4 svg-icon-2 dt">
													<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
														<path opacity="0.3" d="M21 22H3C2.4 22 2 21.6 2 21V5C2 4.4 2.4 4 3 4H21C21.6 4 22 4.4 22 5V21C22 21.6 21.6 22 21 22Z" fill="currentColor" />
														<path d="M6 6C5.4 6 5 5.6 5 5V3C5 2.4 5.4 2 6 2C6.6 2 7 2.4 7 3V5C7 5.6 6.6 6 6 6ZM11 5V3C11 2.4 10.6 2 10 2C9.4 2 9 2.4 9 3V5C9 5.6 9.4 6 10 6C10.6 6 11 5.6 11 5ZM15 5V3C15 2.4 14.6 2 14 2C13.4 2 13 2.4 13 3V5C13 5.6 13.4 6 14 6C14.6 6 15 5.6 15 5ZM19 5V3C19 2.4 18.6 2 18 2C17.4 2 17 2.4 17 3V5C17 5.6 17.4 6 18 6C18.6 6 19 5.6 19 5Z" fill="currentColor" />
														<path d="M8.8 13.1C9.2 13.1 9.5 13 9.7 12.8C9.9 12.6 10.1 12.3 10.1 11.9C10.1 11.6 10 11.3 9.8 11.1C9.6 10.9 9.3 10.8 9 10.8C8.8 10.8 8.59999 10.8 8.39999 10.9C8.19999 11 8.1 11.1 8 11.2C7.9 11.3 7.8 11.4 7.7 11.6C7.6 11.8 7.5 11.9 7.5 12.1C7.5 12.2 7.4 12.2 7.3 12.3C7.2 12.4 7.09999 12.4 6.89999 12.4C6.69999 12.4 6.6 12.3 6.5 12.2C6.4 12.1 6.3 11.9 6.3 11.7C6.3 11.5 6.4 11.3 6.5 11.1C6.6 10.9 6.8 10.7 7 10.5C7.2 10.3 7.49999 10.1 7.89999 10C8.29999 9.90003 8.60001 9.80003 9.10001 9.80003C9.50001 9.80003 9.80001 9.90003 10.1 10C10.4 10.1 10.7 10.3 10.9 10.4C11.1 10.5 11.3 10.8 11.4 11.1C11.5 11.4 11.6 11.6 11.6 11.9C11.6 12.3 11.5 12.6 11.3 12.9C11.1 13.2 10.9 13.5 10.6 13.7C10.9 13.9 11.2 14.1 11.4 14.3C11.6 14.5 11.8 14.7 11.9 15C12 15.3 12.1 15.5 12.1 15.8C12.1 16.2 12 16.5 11.9 16.8C11.8 17.1 11.5 17.4 11.3 17.7C11.1 18 10.7 18.2 10.3 18.3C9.9 18.4 9.5 18.5 9 18.5C8.5 18.5 8.1 18.4 7.7 18.2C7.3 18 7 17.8 6.8 17.6C6.6 17.4 6.4 17.1 6.3 16.8C6.2 16.5 6.10001 16.3 6.10001 16.1C6.10001 15.9 6.2 15.7 6.3 15.6C6.4 15.5 6.6 15.4 6.8 15.4C6.9 15.4 7.00001 15.4 7.10001 15.5C7.20001 15.6 7.3 15.6 7.3 15.7C7.5 16.2 7.7 16.6 8 16.9C8.3 17.2 8.6 17.3 9 17.3C9.2 17.3 9.5 17.2 9.7 17.1C9.9 17 10.1 16.8 10.3 16.6C10.5 16.4 10.5 16.1 10.5 15.8C10.5 15.3 10.4 15 10.1 14.7C9.80001 14.4 9.50001 14.3 9.10001 14.3C9.00001 14.3 8.9 14.3 8.7 14.3C8.5 14.3 8.39999 14.3 8.39999 14.3C8.19999 14.3 7.99999 14.2 7.89999 14.1C7.79999 14 7.7 13.8 7.7 13.7C7.7 13.5 7.79999 13.4 7.89999 13.2C7.99999 13 8.2 13 8.5 13H8.8V13.1ZM15.3 17.5V12.2C14.3 13 13.6 13.3 13.3 13.3C13.1 13.3 13 13.2 12.9 13.1C12.8 13 12.7 12.8 12.7 12.6C12.7 12.4 12.8 12.3 12.9 12.2C13 12.1 13.2 12 13.6 11.8C14.1 11.6 14.5 11.3 14.7 11.1C14.9 10.9 15.2 10.6 15.5 10.3C15.8 10 15.9 9.80003 15.9 9.70003C15.9 9.60003 16.1 9.60004 16.3 9.60004C16.5 9.60004 16.7 9.70003 16.8 9.80003C16.9 9.90003 17 10.2 17 10.5V17.2C17 18 16.7 18.4 16.2 18.4C16 18.4 15.8 18.3 15.6 18.2C15.4 18.1 15.3 17.8 15.3 17.5Z" fill="currentColor" />
													</svg>
												</span>
												<!--end::Svg Icon-->
												<input class="form-control form-control-solid ps-12" name="from_month" placeholder="Month" id="kt_datepicker_redem_report_month" value="<?php if(isset($_POST['from_month']) && $_POST['from_month']!="") echo ($_POST['from_month']);?>"/>
												</div>
										</div>
										<!--end::Col-->
									</div>
								</div>
							</div>
						<div class="col-lg-6">					
							<div style="padding:10px 10px 10px 10px !important;box-shadow: 0 3px 6px #00002947; border-radius: 5px; background-color: #f5f5f1 !important;">
							<div class="row">
									<div class="col-lg-6 d-flex align-items-center">
										<div class="form-check form-check-custom">
											<input class="form-check-input2" type="radio" id="select_redem_interest" name="int_redem_report" value="select_redem_report" checked/>
										</div>
										<div class="d-flex flex-column">
											<div class="fs-6 fw-semibold text-muted" style="padding-left: 10px;">Select Interest</div>
										</div>
									</div>	
									<!--begin::Col-->
									<div class="col-lg-6 fv-row fv-plugins-icon-container">
										<!--begin::Select-->
										<select class="form-select form-select-solid" data-control="select2" data-hide-search="true" id="int_tbox_redem_report" name="int_select">	
											<option value="ALL">ALL</option>
											<?php foreach($int_list as $intlst)
												{?>
												<option value="<?php echo $intlst['INTNAME'];?>" 
													<?php if(isset($_POST['int_select']) && $_POST['int_select'] == $intlst['INTNAME']) echo "selected";?>><?php echo $intlst['INTNAME'];?></option>
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
											<input class="form-check-input2" type="radio" id="int_group_redem_report" name="int_redem_report" value="select_grp_redem_interest" 

											<?php if(isset($_POST['int_group_redem_report_select']) && $_POST['int_group_redem_report_select']!="") echo "checked";
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
										<select class="form-select form-select-solid" data-control="select2"  data-hide-search="true" id="int_group_redem_report_select" name="int_group_redem_report_select">
										<option value="">Select Interest Group</option>
										<?php foreach($int_grp_list as $intgrplist)
										{?>
										<option value="<?php echo $intgrplist['INT_GROUP_NAME'];?>" 
										<?php if(isset($_POST['int_group_redem_report_select']) && $_POST['int_group_redem_report_select'] == $intgrplist['INT_GROUP_NAME']) echo "selected";?>><?php echo $intgrplist['INT_GROUP_NAME'];?>
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
						<br>
							<div class="col-lg-6">
								<div style="padding:10px 10px 10px 10px !important;box-shadow: 0 3px 6px #00002947; border-radius: 5px; background-color: #f5f5f1 !important;">
									<div class="row">	
										<!--begin::Label-->
										<label class="col-md-3 col-form-label fw-bold fs-6">Jewel Type</label>
										<!--end::Label-->
										<!--begin::Col-->
										<div class="col-lg-6 fv-row fv-plugins-icon-container">
											<!--begin::Select-->
											<select class="form-select form-select-solid" data-control="select2" data-hide-search="true" name="jewel_type">	
												<option value="">ALL</option>
												<option value="GOLD"<?php if(isset($_POST['jewel_type']) && $_POST['jewel_type']=="GOLD") echo "checked";?>>Gold</option>				
												<option value="SILVER" <?php if(isset($_POST['jewel_type']) && $_POST['jewel_type']=="SILVER") echo "checked";?>>Silver</option>
												<option value="STONE GOLD" <?php if(isset($_POST['jewel_type']) && $_POST['jewel_type']=="STONE GOLD") echo "checked";?>>Stone Gold</option>
											</select>
											<!--end::Select-->
										</div>
										<!--end::Col-->	
									</div>
									<div class="row">	
										<!--begin::Label-->
										<label class="col-md-3 col-form-label fw-bold fs-6">Loan Type</label>
										<!--end::Label-->
										<!--begin::Col-->
										<div class="col-lg-6 fv-row fv-plugins-icon-container">
											<!--begin::Select-->
											<select class="form-select form-select-solid" data-control="select2" data-hide-search="true" name="loan_type">	
												<option value="">ALL</option>
												<option value="New" <?php if(isset($_POST['loan_type']) && $_POST['loan_type']=="New") echo "checked";?>>New</option>				
												<option value="Renewal" <?php if(isset($_POST['loan_type']) && $_POST['loan_type']=="Renewal") echo "checked";?>>Renewal</option>
												<option value="Auctioned" <?php if(isset($_POST['loan_type']) && $_POST['loan_type']=="Auctioned") echo "checked";?>>Auctioned</option>
											</select>
											<!--end::Select-->
										</div>
										<!--end::Col-->	
									</div>
									<div class="row">
												<div class="col-lg-3 fv-row fv-plugins-icon-container fv-plugins-bootstrap5-row-invalid">
													<div class="d-flex align-items-center">
													<label class="form-check form-check-inline form-check-solid me-5 is-invalid">
														<input class="form-check-input" name="weight" type="checkbox" value="checked" id="wt_radio_tbox_red_re" onclick="wt_radio_red()"<?php if(isset($_POST['wt_radio_tbox_red_re']) && $_POST['wt_radio_tbox_red_re']!="") echo "checked";?>
														>
													</label>
													<span class="col-form-label fw-semibold fs-6">Weight</span>
													</div>
												</div>
											<div class="col-lg-3" id="weight_radio_tbox_red_re"

											<?php if(isset($_POST['wt_radio_tbox_red_re']) && $_POST['wt_radio_tbox_red_re']!="") echo "style=display:block;"; else echo "style=display:none;";?>
											> <!-- style="display: none;"> -->
												<select class="form-select form-select-solid" data-control="select2"data-hide-search="true" onchange="wt_tbox_red()" id="wt_radio_tbox_redem_re" name="wt_radio_tbox_red_re">
												<!-- <option value="0"></option> -->
												<option value="">Select One</option>
												<option value="=" <?php if(isset($_POST['wt_radio_tbox_red_re']) && $_POST['wt_radio_tbox_red_re'] =="=") echo "selected";?>>=</option>
												<option value="<" <?php if(isset($_POST['wt_radio_tbox_red_re']) && $_POST['wt_radio_tbox_red_re'] =="<") echo "selected";?> ><</option>
												<option value=">" <?php if(isset($_POST['wt_radio_tbox_red_re']) && $_POST['wt_radio_tbox_red_re'] ==">") echo "selected";?>>></option>
												<option value="<=" <?php if(isset($_POST['wt_radio_tbox_red_re']) && $_POST['wt_radio_tbox_red_re'] =="<=") echo "selected";?>><=</option>
												<option value=">=" <?php if(isset($_POST['wt_radio_tbox_red_re']) && $_POST['wt_radio_tbox_red_re'] ==">=") echo "selected";?>>>=</option>
												<option value="between" <?php if(isset($_POST['wt_radio_tbox_red_re']) && $_POST['wt_radio_tbox_red_re'] =="between") echo "selected";?>>Between</option>
											</select>
										</div>
										<div class="col-lg-3 fv-row fv-plugins-icon-container">
											<input type="text" name="wt_redem_textboxone" class="form-control form-control-lg form-control-solid" id="weight_radio_tf1_red_re" value="<?php if(isset($_POST['wt_redem_textboxone']) && $_POST['wt_redem_textboxone']!="") echo ($_POST['wt_redem_textboxone']); else echo "";?>"

											<?php if(isset($_POST['wt_redem_textboxone']) && $_POST['wt_redem_textboxone']!="") echo "style=display:block;"; else echo "style=display:none;";?>> <!-- style="display: none;"> -->
											<div class="fv-plugins-message-container invalid-feedback"></div>
										</div>
										<div class="col-lg-3 fv-row fv-plugins-icon-container">
											<input type="text" name="wt_redem_textboxtwo" class="form-control form-control-lg form-control-solid" id="weight_radio_tf2_red_re" value="<?php if(isset($_POST['wt_redem_textboxtwo']) && $_POST['wt_redem_textboxtwo']!="") echo ($_POST['wt_redem_textboxtwo']); else echo "";?>"
												<?php if(isset($_POST['wt_radio_tbox_red_re']) && $_POST['wt_radio_tbox_red_re']=="between") echo "style=display:block;"; else echo "style=display:none;";?>> <!-- style="display: none;"> -->
											<div class="fv-plugins-message-container invalid-feedback"></div>
										</div>
									</div>
								<div class="row">
									<div class="col-lg-3 fv-row fv-plugins-icon-container fv-plugins-bootstrap5-row-invalid">
										<div class="d-flex align-items-center">
										<label class="form-check form-check-inline form-check-solid me-5 is-invalid">
											<input class="form-check-input" name="amount" type="checkbox" value="" id="amount_radio_red_red" onclick="amt_radio_red()" <?php if(isset($_POST['amt_redem_tbox']) && $_POST['amt_redem_tbox']!="") echo "checked";?>>
										</label>
										<span class="col-form-label fw-semibold fs-6">Amount</span>
										</div>
									</div>
									<div class="col-lg-3" id="amount_radio_tbox_red_red"

									<?php if(isset($_POST['amt_redem_tbox']) && $_POST['amt_redem_tbox']!="") echo "style=display:block;"; else echo "style=display:none;";?>> <!-- style="display: none;"> -->
									<select class="form-select form-select-solid" data-control="select2"data-hide-search="true" onchange="amt_tbox_red()" id="amt_radio_tbox_red_red" name="amt_redem_tbox">
									<!-- <option value="0"></option> -->
											<option value="">Select One</option>
											<option value="=" <?php if(isset($_POST['amt_redem_tbox']) && $_POST['amt_redem_tbox'] =="=") echo "selected";?>>=</option>
											<option value="<" <?php if(isset($_POST['amt_redem_tbox']) && $_POST['amt_redem_tbox'] =="<") echo "selected";?> ><</option>
											<option value=">" <?php if(isset($_POST['amt_redem_tbox']) && $_POST['amt_redem_tbox'] ==">") echo "selected";?>>></option>
											<option value="<=" <?php if(isset($_POST['amt_redem_tbox']) && $_POST['amt_redem_tbox'] =="<=") echo "selected";?>><=</option>
											<option value=">=" <?php if(isset($_POST['amt_redem_tbox']) && $_POST['amt_redem_tbox'] ==">=") echo "selected";?>>>=</option>
											<option value="between" <?php if(isset($_POST['amt_redem_tbox']) && $_POST['amt_redem_tbox'] =="between") echo "selected";?>>Between</option>
									</select>
									</div>
										<div class="col-lg-3 fv-row fv-plugins-icon-container">
											<input type="text" name="amt_redem_textone" class="form-control form-control-lg form-control-solid" id="amount_radio_tf1_red_red" value="<?php if(isset($_POST['amt_redem_textone']) && $_POST['amt_redem_textone']!="") echo ($_POST['amt_redem_textone']); else echo "";?>"

											<?php if(isset($_POST['amt_redem_textone']) && $_POST['amt_redem_textone']!="") echo "style=display:block;"; else echo "style=display:none;";?>> <!-- style="display: none;"> -->
											<div class="fv-plugins-message-container invalid-feedback"></div>
										</div>
										<div class="col-lg-3 fv-row fv-plugins-icon-container">
											<input type="text" name="amt_redem_texttwo" class="form-control form-control-lg form-control-solid" id="amount_radio_tf2_red_red" value="<?php if(isset($_POST['amt_redem_texttwo']) && $_POST['amt_redem_texttwo']!="") echo ($_POST['amt_redem_texttwo']); else echo "";?>"

											<?php if(isset($_POST['amt_redem_tbox']) && $_POST['amt_redem_tbox']=="between") echo "style=display:block;"; else echo "style=display:none;";?>> <!-- style="display: none;"> -->
											<div class="fv-plugins-message-container invalid-feedback"></div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-lg-3">
								<div style="padding:10px 10px 10px 10px !important;box-shadow: 0 3px 6px #00002947; border-radius: 5px; background-color: #f5f5f1 !important;">
									<div class="row">
										<label class="col-form-label fw-bold fs-4"><u>Bank Status</u></label>
											<div class="col-lg-2 d-flex align-items-center mt-3">
											<!--begin:Input-->
											<div class="form-check form-check-custom">
												<input class="form-check-input2" type="radio" checked id="" 
											onclick="" name="redem_bank" value="all_bank"
											<?php if(isset($_POST['redem_bank']) && 
											$_POST['redem_bank']=="all_bank") echo "checked";?>/>
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
											<div class="col-lg-3 d-flex align-items-center mt-3">
											<!--begin:Input-->
											<div class="form-check form-check-custom">
											
											<input class="form-check-input2" type="radio" id="" onclick="" name="redem_bank" value="bank"
											<?php if(isset($_POST['redem_bank']) && 
											$_POST['redem_bank']=="bank") echo "checked";?>/>
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
												<input class="form-check-input2" type="radio" name="redem_bank" value="not_bank" <?php if(isset($_POST['redem_bank']) && 
											$_POST['redem_bank']=="not_bank") echo "checked";?> />
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
										<label class="col-form-label fw-bold fs-4"><u>Alt Remarks</u></label>
											<div class="col-lg-2 d-flex align-items-center mt-3">
											<!--begin:Input-->
											<div class="form-check form-check-custom">
												<input class="form-check-input2" checked type="radio" name="redem_alter" value="all_alter" <?php if(isset($_POST['redem_alter']) && 
											$_POST['redem_alter']=="all_alter") echo "checked";?>/>
											</div>
											<!--end:Input-->
											<!--begin::Description-->
											<div class="d-flex flex-column">
												<div class="fs-6 fw-semibold text-muted" style="padding-left: 10px; margin right: 50px !important;" checked>All</div>
											</div>
											<!--end:Description-->
											</div>
									</div>
									<div class="row">
											<div class="col-lg-6 d-flex align-items-center mt-3">
											<!--begin:Input-->
											<div class="form-check form-check-custom">
												<input class="form-check-input2" type="radio" name="redem_alter" value="alter_altonly"  <?php if(isset($_POST['redem_alter']) && 
											$_POST['redem_alter']=="alter_altonly") echo "checked";?>/>
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
												<input class="form-check-input2" type="radio" name="redem_alter" value="alter_notalt" <?php if(isset($_POST['redem_alter']) && 
											$_POST['redem_alter']=="alter_notalt") echo "checked";?> />
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
				<!--End - Actions-->
				<br>
					<div class="row">
						<div class="col-lg-10"></div>
						<div class="col-lg-1 d-flex flex-center">
							<!-- <button type="reset" class="btn btn-secondary me-3" data-bs-dismiss="modal">Cancel</button> -->
						</div>
						<div class="col-lg-1 d-flex flex-center">
							<button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Go</button>
						</div>
				</div>
				<!--End::Actions-->
							<br>
							<!--begin::Table-->
							<table class="table table-striped table-hover table-row-bordered fs-7 gy-1 gs-2" id="kt_datatable_redemption_report">
								<thead>
	    							<tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">
							            <th class="min-w-125px">Date</th>
							            <th class="min-w-50px">RcptNo</th>
							            <th class="min-w-80px">Bill No</th>
							            <th class="min-w-100px">Name</th>
							            <th class="min-w-80px">Principal</th>
							            <th class="min-w-80px">Interest</th>					
							            <th class="min-w-50px">PaidAmount</th>
							            <th class="min-w-80px">Net Pay</th>
							            <th class="min-w-50px">Pap.actn</th>
							            <th class="min-w-50px">Not.charge</th>
							            <th class="min-w-50px">FM charge</th>
							            <th class="min-w-50px">Discount</th>
							            <th class="min-w-20px">Status</th>
							            <th class="min-w-50px">Renewal</th>
							            <th class="min-w-80px">Alt_Remarks</th>
	    							</tr>
								</thead>
								<tbody class="text-gray-600 fw-semibold">
									<?php

										$val1=[];
										$val2=[];
										$val3=[];
										$val4=[];
										$val5=[];
										$val6=[];
										$val7=[];
										$val8=[];
										//print_r($repledged_list_view[0]);exit();
										foreach ($redemption_list_view as $key => $value) {
											# code...
											$val1[]=$value['PRINCIPAL'];
											$val2[]=$value['INTEREST'];
											$val3[]=$value['PAPER_ACTION'];
											$val4[]=$value['NOTICECHARGE'];
											$val5[]=$value['FORMCHARGE'];
											$val6[]=$value['DISCOUNT'];
											$val7[]=$value['PAIDPRINCIPAL']+$value['PAIDINTEREST'];
											$val8[]=$value['NETPAYABLE'];

											//print_r($value);
										?>
	
									<tr>
							            <td><?php echo $value['RETURNDATE'];?></td>
							            <td><?php echo $value['VOUCHER_SNO'];?></td>
							            <td><?php echo $value['BILLNO'];?></td>
							            <td><?php echo $value['NAME'];?></td>
							            <td><?php echo $value['PRINCIPAL'];?></td>
							            <td><?php echo $value['INTEREST'];?></td>
							            <td><?php echo $value['PAIDPRINCIPAL']+$value['PAIDINTEREST'];?></td>
							            <td><?php echo $value['NETPAYABLE'];?></td>
							            <td><?php echo $value['PAPER_ACTION'];?></td>
							            <td><?php echo $value['NOTICECHARGE'];?></td>
							            <td><?php echo $value['FORMCHARGE'];?></td>
							            <td><?php echo $value['DISCOUNT'];?></td>
							            <td><?php echo $value['STATUS'];?></td>
							            <td><?php echo $value['NEWBILLNO'];?></td>
							            <td><?php echo $value['CUSTOMER_REMARKS'];?></td>
							           
							        </tr>

							    <?php } ?>
							    </tbody>
							    <tfoot>
	    							<tr class="text-start text-muted fw-bold fs-6 text-uppercase gs-0">
							            <th class="min-w-100px"></th>
							            <th class="min-w-100px"></th>
							            <th class="min-w-80px"></th>
							            <th class="min-w-100px">Total</th>
							            <th class="min-w-80px"><?php echo array_sum($val1);?></th>
							            <th class="min-w-80px"><?php echo array_sum($val2);?></th>
							            <th class="min-w-80px"><?php echo array_sum($val7);?></th>
							            <th class="min-w-80px"><?php echo array_sum($val8);?></th>
							            <th class="min-w-80px"><?php echo array_sum($val5);?></th>
							            <th class="min-w-80px"><?php echo array_sum($val6);?></th>
							            <th class="min-w-80px"><?php echo array_sum($val3);?></th>
							            <th class="min-w-80px"><?php echo array_sum($val4);?></th>
							            <th class="min-w-80px">xxxx</th>
							            <th class="min-w-80px">xxxxx</th>
							            <th class="min-w-80px">xxxxx</th>
	    							</tr>
								</tfoot>
							</table>
									<!--end::Table-->
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
		<input type="hidden" value=<?php echo base_url();?>>
		<?php $this->load->view("script.php");?>
	<script>
		$("#kt_datepicker_redem_report_from").flatpickr({
				dateFormat: "d-m-Y",
			});
			$("#kt_datepicker_redem_report_to").flatpickr({
				dateFormat: "d-m-Y",
			});
			$("#kt_datepicker_redem_report_month").flatpickr({
				dateFormat: "d-m-Y",
			});
	</script>
<script>
	function wt_radio_red()
	{
		var wt_radio_tbox_red_re = document.getElementById("wt_radio_tbox_red_re");
		var weight_radio_tbox_red_re = document.getElementById("weight_radio_tbox_red_re");
		var weight_radio_tf1_red_re = document.getElementById("weight_radio_tf1_red_re");
		var weight_radio_tf2_red_re = document.getElementById("weight_radio_tf2_red_re");

		if (wt_radio_tbox_red_re.checked == true)
		{
		    weight_radio_tbox_red_re.style.display = "block";
		    weight_radio_tf1_red_re.style.display = "block";
	  	} else 
	  	{
	     	weight_radio_tbox_red_re.style.display = "none";
	     	weight_radio_tf1_red_re.style.display = "none";
	     	weight_radio_tf2_red_re.style.display = "none";
	  	}
	}

	function wt_tbox_red()
	{
		var wt_radio_tbox_redem_re = document.getElementById("wt_radio_tbox_redem_re").value;

		 if (wt_radio_tbox_redem_re=="between") 
		  {
		  	$("#weight_radio_tf2_red_re").show();
		  }
		  else
		  {
		  	$("#weight_radio_tf2_red_re").hide();
		  }
	}
</script>
<script>
	function amt_radio_red()
	{
		var amount_radio_red_red = document.getElementById("amount_radio_red_red");
		var amount_radio_tbox_red_red = document.getElementById("amount_radio_tbox_red_red");
		var amount_radio_tf1_red_red = document.getElementById("amount_radio_tf1_red_red");
		var amount_radio_tf2_red_red = document.getElementById("amount_radio_tf2_red_red");

		if (amount_radio_red_red.checked == true)
		{
		    amount_radio_tbox_red_red.style.display = "block";
		    amount_radio_tf1_red_red.style.display = "block";
	  	} else 
	  	{
	     	amount_radio_tbox_red_red.style.display = "none";
	     	amount_radio_tf1_red_red.style.display = "none";
	     	amount_radio_tf2_red_red.style.display = "none";
	  	}
	}
</script>
<script>
	function amt_tbox_red()
	{
		var amt_radio_tbox_red_red = document.getElementById("amt_radio_tbox_red_red").value;

		 if (amt_radio_tbox_red_red=="between") 
		  {
		  	$("#amount_radio_tf2_red_red").show();
		  }
		  else
		  {
		  	$("#amount_radio_tf2_red_red").hide();
		  }
}
</script>
<script>
	function daily_red_red_click()
	{
		
		var daily_red_red = document.getElementById("daily_red_red");
		var monthly_red_red = document.getElementById("monthly_red_red");
		var period_red_red = document.getElementById("period_red_red");
		var start_red_red = document.getElementById("start_date_red_red");
		var end_red_red = document.getElementById("end_date_red_red");

		if (daily_red_red.checked == true)
		{
		   start_date_red_red.style.display = "block";
		   end_date_red_red.style.display = "none";
		   start_month_red_red.style.display="none";
	  	} else 
	  	{
	     	start_date_red_red.style.display = "none";
		    end_date_red_red.style.display = "none";
		    start_month_red_red.style.display="none";
	  	}
	}
</script>
<script>
	function monthly_red_red_click()
	{
		var daily_red_red = document.getElementById("daily_red_red");
		var monthly_red_red = document.getElementById("monthly_red_red");
		var period_red_red = document.getElementById("period_red_red");
		var start_red_red_month = document.getElementById("start_month_red_red");
		

		if (monthly_red_red.checked == true)
		{
		   start_month_red_red.style.display = "block";
		   start_date_red_red.style.display = "none";
		   end_date_red_red.style.display = "none";
		   
	  	} else 
	  	{
	     	start_month_red_red.style.display = "none";
	     	start_date_red_red.style.display = "none";
		    end_date_red_red.style.display = "none";
	  	}
	}
</script>
<script>
	function period_red_red_click()
	{
		var daily_red_red = document.getElementById("daily_red_red");
		var monthly_red_red = document.getElementById("monthly_red_red");
		var period_red_red = document.getElementById("period_red_red");
		var start_red_red_month = document.getElementById("start_month_red_red");

		if (period_red_red.checked == true)
		{
		   start_date_red_red.style.display = "block";
		   end_date_red_red.style.display = "block";
		   start_month_red_red.style.display = "none";
	  	} else 
	  	{
	     	start_date_red_red.style.display = "none";
		    end_date_red_red.style.display = "none";
		    start_month_red_red.style.display = "none";
	  	}
	}
</script>
<script>
	function loanfrom_click()
	{
		var start_red_red = document.getElementById("start_date_red_red");
		var end_red_red = document.getElementById("end_date_red_red");
		var loanfromclick= document.getElementById("loan_from_click");
		var start_red_red_month = document.getElementById("start_month_red_red");

		if (loan_from_click.checked== true)
		{
		   start_date_red_red.style.display = "block";
		   end_date_red_red.style.display = "block";
		   int_group_tbox_rem_nor_report.style.display="block";
		   start_month_red_red.style.display="none";
		   period_red_red.checked = "true";
		   
		   
	  	} else 
	  	{
	     	start_date_red_red.style.display = "none";
		    end_date_red_red.style.display = "none";
   
	  	}

	  

		var day = $("#int_group_tbox_rem_nor_report").val();
		date_duration(day);
	
	// 	if(day){

	// 	var from_date = document.getElementById("kt_datepicker_redem_report_to").value;

	// 	// const formatted_Date = from_date.toLocaleDateString('en-GB', {
	// 	// 	  day: 'numeric', month: 'numeric', year: 'numeric'
	// 	// 	}).replace('/', '-');

	// 	// var date_of_to_val = formatted_Date.replace('/', "-");
	// 	var pieces = from_date.split("-");

	// 	var form_date_value = pieces[1]+"-"+pieces[0]+"-"+pieces[2];

	// 	//console.log(pieces[1]+"-"+pieces[0]+"-"+pieces[2]);

	// 	function subtractDays(days) {

	//     	//var date = new Date();
	//     	//var date = new Date(this.valueOf());

	//     	var dateMnsFive = moment(form_date_value).subtract(days ,'day');
	//     	var date = new Date(dateMnsFive.toISOString());

	//     	//console.log(date);
	//     	//date.setDate(date.getDate() - days);

	//     	return date;
	// 	}

	// 	//var date = new Date();

	// 	var date_value = subtractDays(parseInt(day));


	// 	 //console.log(day+"====="+date("Y-M-d",date_value));

		
	// 	const formattedDate = date_value.toLocaleDateString('en-GB', {
	// 	  day: 'numeric', month: 'numeric', year: 'numeric'
	// 	}).replace('/', '-');

	// 	var date_of_value = formattedDate.replace('/', "-");
	// 	document.getElementById("kt_datepicker_redem_report_from").value = date_of_value;

	// }else{

	// 	var date = new Date();
	// 		const formattedDate = date.toLocaleDateString('en-GB', {
	// 		  day: 'numeric', month: 'numeric', year: 'numeric'
	// 		}).replace('/', '-');

	// 	var date_of_value = formattedDate.replace('/', "-");
	// 		document.getElementById("kt_datepicker_redem_report_from").value = date_of_value;
	// }
	//console.log("sdf");

}
	
</script>
<script>
	$('input:radio[name="int_radio_rem_nor_report"]').change(function() {
	    if ($(this).val()=='select_int_value_rem_nor_report') 
	    {
	    	// alert("if");
	        $('#int_group_tbox_rem_nor_report').attr('disabled',true);
	    } else
	    {
	        $('#int_group_tbox_rem_nor_report').removeAttr('disabled');
	        // alert("else");
	    }
	});
</script>
<script>
	$('input:radio[name="int_redem_report"]').change(function() {
        if ($(this).val()=='select_redem_report') 
        {
        	// alert("if");
            $('#int_group_redem_report_select').attr('disabled',true);
        } else
        {
            $('#int_group_redem_report_select').removeAttr('disabled');
            // alert("else");
        }
    });

    $('input:radio[name="int_redem_report"]').change(function() {
        if ($(this).val()=='select_grp_redem_interest') 
        {
            $('#int_tbox_redem_report').attr('disabled',true);
        } else
        {
            $('#int_tbox_redem_report').removeAttr('disabled');
        }
    });
</script>
<!-- <script>
	$('input:radio[name="int_radio_red_red_col_report"]').change(function() {
        if ($(this).val()=='select_int_value_red_red_col_report') 
        {
        	// alert("if");
            $('#int_group_tbox_red_red_col_report').attr('disabled',true);
        } else
        {
            $('#int_group_tbox_red_red_col_report').removeAttr('disabled');
            // alert("else");
        }
    });
    $('input:radio[name="int_radio_red_red_col_report"]').change(function() {
        if ($(this).val()=='int_group_value_red_red_col_report') 
        {
            $('#select_interest_tbox_red_red_col_report').attr('disabled',true);
        } else
        {
            $('#select_interest_tbox_red_red_col_report').removeAttr('disabled');
        }
    });
</script> -->																						

<script>
	// $("#kt_datatable_redemption_report").DataTable({
	//  "aaSorting":[],
	//  "responsive":true,				// "ordering": false,
	//  "language": {
	//   "lengthMenu": "Show _MENU_",
	//  },
	//  "dom":
	//   "<'row'" +
	//   "<'col-sm-6 d-flex align-items-center justify-conten-start'l>" +
	//   "<'col-sm-6 d-flex align-items-center justify-content-end'f>" +
	//   ">" +

	//   "<'table-responsive'tr>" +

	//   "<'row'" +
	//   "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
	//   "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
	//   ">"
	// });

	$('#kt_datatable_redemption_report').DataTable({
		"aaSorting": [],
        dom: 'Bfrtip',
        "responsive":true,	
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5'
        ]
    } );

   

function selectcompany()

{
	// var selectvalue= $("#company_list_loanlistview").value;
	// alert("sdhfsdj");

 	var selectBox = document.getElementById("company_list_redemreport");
    var selectedValue = selectBox.options[selectBox.selectedIndex].value;
      
}
function listarea()

{
	// var selectvalue= $("#zone_list_loanlistview").val();
	// alert(selectvalue);

 	var selectBox = document.getElementById("zone_list_redemreport");
    var selectedValue = selectBox.options[selectBox.selectedIndex].value;
    	
    if(selectedValue.length){

		var baseurl= $("#baseurl").val();
		//alert(val);
		$.ajax({
			type: "POST",
			url: baseurl+'Redemptionreport/show_arealist',
			async: false,
			type: "POST",
			data: "zone_id="+selectedValue,
			dataType: "html",
			success: function(response)
			{
			
			$('#Area_list_redemreport').empty().html(response);
			// $('#Area_list_redempreport').addClass('show');
			// $("#Area_list_redempreport").css("display", "block");
			$('#city_list_redemreport').empty();
			$('#village_list_redemreport').empty();
			$('#street_list_redemreport').empty();

			}
		});
    }else{
    	$('#Area_list_redemreport').empty().append("<option value= >Select Area</option>");
		$('#Area_list_redemreport').addClass('show');
		$("#Area_list_redemreport").css("display", "block");
    }		
      
}


function listcity()

{

	// var selectvalue= $("#zone_list_loanlistview").val();
	var zonevalue = document.getElementById("zone_list_redemreport").value;
	// var zonevalue = selectBox.options[selectzone.selectedIndex].value;

 	var areavalue = document.getElementById("Area_list_redemreport").value;
    //var areavalue = selectBox.options[selectarea.selectedIndex].value;
  	
  	// alert(areavalue);

    if(areavalue){

		var baseurl= $("#baseurl").val();
		//alert(val);
		$.ajax({
			type: "POST",
			url: baseurl+'Redemptionreport/show_citylist',
			async: false,
			type: "POST",
			data: "zonevalue="+zonevalue+"&areavalue="+areavalue,
			dataType: "html",
			success: function(response)
			{
			//	alert(response)
				$('#city_list_redemreport').empty().append(response);
				$('#city_list_redemreport').addClass('show');
				$("#city_list_redemreport").css("display", "block");
				$('#village_list_redemreport').empty();
				$('#street_list_redemreport').empty();

			}


		});
    }else{
    	$('#city_list_redemreport').empty().append("<option value= >Select City</option>");
		$('#city_list_redemreport').addClass('show');
		$("#city_list_redemreport").css("display", "block");
    }	
      
}

function listvillage()

{

	// var selectvalue= $("#zone_list_loanlistview").val();
	var zonevalue = document.getElementById("zone_list_redemreport").value;
 	var areavalue = document.getElementById("Area_list_redemreport").value;
  	var cityvalue = document.getElementById("city_list_redemreport").value;
  	// alert(cityvalue);

    if(cityvalue){

		var baseurl= $("#baseurl").val();
		//alert(val);
		$.ajax({
			type: "POST",
			url: baseurl+'Redemptionreport/show_villagelist',
			async: false,
			type: "POST",
			data: "zonevalue="+zonevalue+"&areavalue="+areavalue+"&cityvalue="+cityvalue,
			dataType: "html",
			success: function(response)
			{
				// alert(response)
				$('#village_list_redemreport').empty().append(response);
				$('#village_list_redemreport').addClass('show');
				$("#village_list_redemreport").css("display", "block");
				$('#street_list_redemreport').empty();
			}

		});
    }else{
    	$('#village_list_redemreport').empty().append("<option value=>Select Village</option>");
		$('#village_list_redemreport').addClass('show');
		$("#village_list_redemreport").css("display", "block");
    }		
      
}

function liststreet()

{

	// var selectvalue= $("#zone_list_loanlistview").val();
	var zonevalue    = document.getElementById("zone_list_redemreport").value;
 	var areavalue    = document.getElementById("Area_list_redemreport").value;
  	var cityvalue    = document.getElementById("city_list_redemreport").value;
  	var villagevalue = document.getElementById("village_list_redemreport").value;
  	//var streetvalue = document.getElementById("street_list_loanlistview").value;
  	
    if(villagevalue){

		var baseurl= $("#baseurl").val();
		//alert(val);
		$.ajax({
			type: "POST",
			url: baseurl+'Redemptionreport/show_streetlist',
			async: false,
			type: "POST",
			data: "zonevalue="+zonevalue+"&areavalue="+areavalue+"&cityvalue="+cityvalue+"&villagevalue="+villagevalue,
			dataType: "html",
			success: function(response)
			{
			//	alert(response)
				$('#street_list_redemreport').empty().append(response);
				$('#street_list_redemreport').addClass('show');
				$("#street_list_redemreport").css("display","block");
				}

		});
    }else{

    	$('#street_list_redemreport').empty().append("<option value= >Select Street</option>");
		$('#street_list_redemreport').addClass('show');
		$("#street_list_redemreport").css("display","block");
    }	
      
}

</script>

<script>

// function days_change(){

//  var days = document.getElementById("int_group_tbox_rem_nor_report").value;

//  alert(days);

// }	

$("#int_group_tbox_rem_nor_report").on("input",function(){

	var day = $(this).val();

	date_duration(day);
	
	// if(day){

	// 	var from_date = document.getElementById("kt_datepicker_redem_report_to").value;

	// 	// const formatted_Date = from_date.toLocaleDateString('en-GB', {
	// 	// 	  day: 'numeric', month: 'numeric', year: 'numeric'
	// 	// 	}).replace('/', '-');

	// 	// var date_of_to_val = formatted_Date.replace('/', "-");
	// 	var pieces = from_date.split("-");

	// 	var form_date_value = pieces[1]+"-"+pieces[0]+"-"+pieces[2];

	// 	//console.log(pieces[1]+"-"+pieces[0]+"-"+pieces[2]);

	// 	function subtractDays(days) {

	//     	//var date = new Date();
	//     	//var date = new Date(this.valueOf());

	//     	var dateMnsFive = moment(form_date_value).subtract(days ,'day');
	//     	var date = new Date(dateMnsFive.toISOString());

	//     	//console.log(date);
	//     	//date.setDate(date.getDate() - days);

	//     	return date;
	// 	}

	// 	//var date = new Date();

	// 	var date_value = subtractDays(parseInt(day));


	// 	 //console.log(day+"====="+date("Y-M-d",date_value));

		
	// 	const formattedDate = date_value.toLocaleDateString('en-GB', {
	// 	  day: 'numeric', month: 'numeric', year: 'numeric'
	// 	}).replace('/', '-');

	// 	var date_of_value = formattedDate.replace('/', "-");
	// 	document.getElementById("kt_datepicker_redem_report_from").value = date_of_value;

	// }else{

	// 	var date = new Date();
	// 		const formattedDate = date.toLocaleDateString('en-GB', {
	// 		  day: 'numeric', month: 'numeric', year: 'numeric'
	// 		}).replace('/', '-');

	// 	var date_of_value = formattedDate.replace('/', "-");
	// 		document.getElementById("kt_datepicker_redem_report_from").value = date_of_value;
	// }
	//console.log("sdf");

})

function date_duration(day){


	if(day){

		var from_date = document.getElementById("kt_datepicker_redem_report_to").value;

		// const formatted_Date = from_date.toLocaleDateString('en-GB', {
		// 	  day: 'numeric', month: 'numeric', year: 'numeric'
		// 	}).replace('/', '-');

		// var date_of_to_val = formatted_Date.replace('/', "-");
		var pieces = from_date.split("-");

		var form_date_value = pieces[1]+"-"+pieces[0]+"-"+pieces[2];

		//console.log(pieces[1]+"-"+pieces[0]+"-"+pieces[2]);

		function subtractDays(days) {

	    	//var date = new Date();
	    	//var date = new Date(this.valueOf());

	    	var dateMnsFive = moment(form_date_value).subtract(days ,'day');
	    	var date = new Date(dateMnsFive.toISOString());

	    	//console.log(date);
	    	//date.setDate(date.getDate() - days);

	    	return date;
		}

		//var date = new Date();

		var date_value = subtractDays(parseInt(day));


		 //console.log(day+"====="+date("Y-M-d",date_value));

		
		const formattedDate = date_value.toLocaleDateString('en-GB', {
		  day: 'numeric', month: 'numeric', year: 'numeric'
		}).replace('/', '-');

		var date_of_value = formattedDate.replace('/', "-");
		document.getElementById("kt_datepicker_redem_report_from").value = date_of_value;

	}else{

		var date = new Date();
			const formattedDate = date.toLocaleDateString('en-GB', {
			  day: 'numeric', month: 'numeric', year: 'numeric'
			}).replace('/', '-');

		var date_of_value = formattedDate.replace('/', "-");
			document.getElementById("kt_datepicker_redem_report_from").value = date_of_value;
	}
}
</script>


<script>
	
	var company_list_redemreport = $('#company_list_redemreport').val();

    if(company_list_redemreport.trim()==''){
        $('#company_list_redemreport_err').html('Please select any one field!');
        err++;
    }else{
      
			$('#company_list_redemreport_err').html('');
		}	
	 
    if(err>0){ return false; }else { return true; }

</script>

	</body>
	<!--end::Body-->
</html>