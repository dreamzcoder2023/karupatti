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
									<h1 class="d-flex align-items-center text-dark fw-bold my-1 fs-3">Itemwise Report
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
					<form name="Itemwise_report_form" id="Itemwise_report_form" method="POST" action="<?php echo base_url();?>Itemwisereport" enctype="multipart/form-data">
						<div class="row">
								<div class="col-lg-2">
										<div style="padding:10px 10px 10px 10px !important;box-shadow: 0 3px 6px #00002947; border-radius: 5px; background-color: #f5f5f1 !important;">
												<div class="row">
													<div class="col-lg-1 d-flex align-items-center mt-3">
													<!--begin:Input-->
													<div class="form-check form-check-custom">
														<input class="form-check-input2" type="radio" id="" name="status_item" value="Y" <?php if(isset($_POST['status_item']) && $_POST['status_item']=="Y") echo "checked";?> /> <!-- onclick="itemstatus('Y')"  -->
													</div>
													<!--end:Input-->
													<!--begin::Description-->
													<div class="d-flex flex-column">
														<div class="fs-6 fw-semibold text-muted" style="padding-left: 10px; margin right: 50px !important;">Active</div>
													</div>
													<!--end:Description-->
													</div>
												</div>
												<br>
												<div class="row">
													<div class="col-lg-1 d-flex align-items-center mt-3">
													<!--begin:Input-->
													<div class="form-check form-check-custom">
														<input class="form-check-input2" type="radio" id=""  name="status_item" value="N"  <?php if(isset($_POST['status_item']) && $_POST['status_item']=="N") echo "checked";?> /> <!-- onclick="itemstatus('N')" -->
													</div>
													<!--end:Input-->
													<!--begin::Description-->
													<div class="d-flex flex-column">
														<div class="fs-6 fw-semibold text-muted" style="padding-left: 10px; margin right: 50px !important;">Closed</div>
													</div>
													<!--end:Description-->
													</div>
												</div>
												<br>
													<div class="row">
													<div class="col-lg-1 d-flex align-items-center mt-3">
													<!--begin:Input-->
													<div class="form-check form-check-custom">
														<input class="form-check-input2" type="radio" id="" name="status_item" value="YN" <?php if(isset($_POST['status_item']) && $_POST['status_item']=="YN") echo "checked";?> />
													</div>
													<!--end:Input-->
													<!--begin::Description-->
													<div class="d-flex flex-column">
														<div class="fs-6 fw-semibold text-muted" style="padding-left: 10px; margin right: 50px !important;">Both</div>
													</div>
													<!--end:Description-->
												</div>
											</div>
										</div>
								</div>
								<div class="col-lg-5">
									<div style="padding:10px 10px 10px 10px !important;box-shadow: 0 3px 6px #00002947; border-radius: 5px; background-color: #f5f5f1 !important;">
										<div class="row">
											<div class="col-lg-5 d-flex align-items-center mt-3">
												<!--begin:Input-->
												<div class="form-check form-check-custom">
													<input class="form-check-input2" type="radio" id="search_item_drop" name="search_item" value="" <?php if(isset($_POST['search_item']) && $_POST['search_item']!="") echo "checked";?>>
												</div>
												<!--end:Input-->
												<!--begin::Description-->
												<div class="d-flex flex-column">
													<div class="fs-6 fw-semibold text-muted" style="padding-left: 10px; margin right: 50px !important;">Search Item</div>
												</div>
												<!--end:Description-->
											</div>
											<!--begin::Col-->
											<div class="col-lg-7 fv-row fv-plugins-icon-container">
													<!--begin::Left Section-->
													<!--begin::Select-->
												<select class="form-select form-select-solid" data-control="select2" data-placeholder="Select Item Name" name="search_item" id="search_item" data-hide-search="true" <?php if(isset($_POST['search_item']) && $_POST['search_item']!="") echo "checked";?>>
												<option value="">Select Item</option>
												<?php foreach($item_list as $itemlist)
												{?>
												<option value="<?php echo $itemlist['PLEDGENAME'];?>" 
													<?php if(isset($_POST['search_item']) && $_POST['search_item'] == $itemlist['PLEDGENAME']) echo "selected";?>><?php echo $itemlist['PLEDGENAME'];?></option><?php
												 }?> 
												</select>
												<!--end::Select-->
												<!--end::Left Section-->
												<div class="fv-plugins-message-container invalid-feedback"></div>
											</div>
											<!--end::Col-->
										</div>
										<div class="row">
											<div class="col-lg-5 d-flex align-items-center mt-3">
												<!--begin:Input-->
												<div class="form-check form-check-custom">
													<input class="form-check-input2" type="radio" id="search_item_radio" name="search_item" value="" <?php if(isset($_POST['search_item_desc']) && $_POST['search_item_desc']!="") {
														if($_POST['search_item'] == "" ) echo "checked";
													}?>/>
												</div>
												<!--end:Input-->
												<!--begin::Description-->
												<div class="d-flex flex-column">
													<div class="fs-6 fw-semibold text-muted" 
													style="padding-left: 10px; margin right: 50px !important;">Search Description</div>
												</div>
												<!--end:Description-->
											</div>
											<!--begin::Col-->
											<div class="col-lg-7 fv-row fv-plugins-icon-container">
											<!--begin::Left Section-->
											<input type="text" name="search_item_desc" class="form-control form-control-lg form-control-solid" id="search_item_desc" 
											value="<?php if(isset($_POST['search_item_desc']) && $_POST['search_item_desc']!=""){
												if($_POST['search_item'] != "" ) echo "" ; else echo $_POST['search_item_desc'];
											}?>">
											<div class="fv-plugins-message-container invalid-feedback" ></div>
											<!--end::Left Section-->
											</div>
											<!--end::Col-->
										</div>	
										<div class="row">
											<div class="col-lg-3 fv-row fv-plugins-icon-container fv-plugins-bootstrap5-row-invalid">
												<div class="d-flex align-items-center">
												<label class="form-check form-check-inline form-check-solid me-5 is-invalid">
													<input class="form-check-input"  type="checkbox" value="" id="weight_radio_it_it"  <?php if(isset($_POST['weight_item']) && $_POST['weight_item']!="") echo "checked";?> onclick="wt_radio_it()">
												</label>
												<span class="col-form-label fw-semibold fs-6">Weight</span>
												</div>
											</div>
											<div class="col-lg-3" id="weight_radio_tbox_it_it"  <?php if(isset($_POST['weight_item']) && $_POST['weight_item']!="") echo "style=display:block;"; else echo "style=display:none;";?>> <!-- style="display: none;"> -->
												<select class="form-select form-select-solid" data-control="select2"data-hide-search="true" onchange="wt_tbox_it()" id="wt_radio_tbox_it_it" name="weight_item" >
													<option value="">select one</option> 
													<option value="="  <?php if(isset($_POST['weight_item']) && $_POST['weight_item'] =="=") echo "selected";?>>=</option>
													<option value=">" <?php if(isset($_POST['weight_item']) && $_POST['weight_item'] ==">") echo "selected";?>>></option>
													<option value="<" <?php if(isset($_POST['weight_item']) && $_POST['weight_item'] =="<") echo "selected";?>><</option>
													<option value=">=" <?php if(isset($_POST['weight_item']) && $_POST['weight_item'] ==">=") echo "selected";?>>>=</option>
													<option value="<=" <?php if(isset($_POST['weight_item']) && $_POST['weight_item'] =="<=") echo "selected";?>><=</option>
													<option value="between" <?php if(isset($_POST['weight_item']) && $_POST['weight_item'] =="between") echo "selected";?>>Between</option>
												</select>
											</div>
											<div class="col-lg-3 fv-row fv-plugins-icon-container">
												<input type="text" name="weight_item_tboxone" value= "<?php if(isset($_POST['weight_item_tboxone']) && $_POST['weight_item_tboxone']!="") echo ($_POST['weight_item_tboxone']); else echo "";?>" class="form-control form-control-lg form-control-solid" id="weight_radio_tf1_it_it" <?php if(isset($_POST['weight_item']) && $_POST['weight_item']!="") echo "style=display:block;"; else echo "style=display:none;";?>> <!-- style="display: none;"> -->
												<div class="fv-plugins-message-container invalid-feedback"></div>
											</div>
											<div class="col-lg-3 fv-row fv-plugins-icon-container">
												<input type="text" name="weight_item_tboxtwo"  value= "<?php if(isset($_POST['weight_item_tboxtwo']) && $_POST['weight_item_tboxtwo']!="") echo ($_POST['weight_item_tboxtwo']); else echo "";?>" class="form-control form-control-lg form-control-solid" id="weight_radio_tf2_it_it"  <?php if(isset($_POST['weight_item']) && $_POST['weight_item']=="between") echo "style=display:block;"; else echo "style=display:none;";?>> <!-- style="display: none;"> -->
												<div class="fv-plugins-message-container invalid-feedback"></div>
											</div>
										</div>
									</div>
								</div>
								<div class="col-lg-2">
										<div style="padding:10px 10px 10px 10px !important;box-shadow: 0 3px 6px #00002947; border-radius: 5px; background-color: #f5f5f1 !important;">
												<div class="row">
													<div class="col-lg-1 d-flex align-items-center mt-3">
													<!--begin:Input-->
													<div class="form-check form-check-custom">
														<input class="form-check-input2" type="radio" id="all_item" 
														onclick="all_item_click()" name="item_date" value="all"  <?php if(isset($_POST['item_date']) && $_POST['item_date']=="all") echo "checked";?>/>
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
														<input class="form-check-input2" type="radio" id="daily_item" onclick="daily_item_click()" name="item_date" value="date" <?php if(isset($_POST['item_date']) && $_POST['item_date']=="date") echo "checked";?>/>
													</div>
													<!--end:Input-->
													<!--begin::Description-->
													<div class="d-flex flex-column">
														<div class="fs-6 fw-semibold text-muted" style="padding-left: 10px; margin right: 50px !important;">Date</div>
													</div>
													<!--end:Description-->
													</div>
												</div>
												<br>
													<div class="row">
													<div class="col-lg-1 d-flex align-items-center mt-3">
													<!--begin:Input-->
													<div class="form-check form-check-custom">
														<input class="form-check-input2" type="radio" id="period_item" onclick="period_item_click()" name="item_date" value="period" <?php if(isset($_POST['item_date']) && $_POST['item_date']=="period") echo "checked";?> />
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
								<div class="col-lg-3">
									<div style="padding:10px 10px 10px 10px !important;box-shadow: 0 3px 6px #00002947; border-radius: 5px; background-color: #f5f5f1 !important; " id="blockeffect_item" >
												<div class="row" >
													<div class="col-lg-8 fv-row"
													 <?php if(isset($_POST['from_date'])) echo "style=display:block;";
													 ?>>
														<label class="form-label">Start Date</label>
														<div class="align-items-center" id="start_date_item"
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
															<input class="form-control form-control-solid ps-12" name="from_date" placeholder="From Date" id="kt_datepicker_itemwise_report_from" value="<?php if(isset($_POST['from_date']) && $_POST['from_date']!="") echo ($_POST['from_date']); else echo "";?>">
														</div>
													</div>
													<div class="col-lg-4"></div>
													<!--begin::Col-->
													<div class="col-lg-8 fv-row" id="end_date_item" <?php if(isset($_POST['item_date'])) { 

														if($_POST['item_date'] != 'period')
															echo "style=display:none;"; else echo " style=display:block;";
														} ?>

														>
														<label class="form-label">End Date</label>
														<div class="align-items-center" >
															<!--begin::Svg Icon | path: icons/duotune/general/gen014.svg-->
															<span class="svg-icon position-absolute ms-4 svg-icon-2 dt">
															<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																<path opacity="0.3" d="M21 22H3C2.4 22 2 21.6 2 21V5C2 4.4 2.4 4 3 4H21C21.6 4 22 4.4 22 5V21C22 21.6 21.6 22 21 22Z" fill="currentColor" />
																<path d="M6 6C5.4 6 5 5.6 5 5V3C5 2.4 5.4 2 6 2C6.6 2 7 2.4 7 3V5C7 5.6 6.6 6 6 6ZM11 5V3C11 2.4 10.6 2 10 2C9.4 2 9 2.4 9 3V5C9 5.6 9.4 6 10 6C10.6 6 11 5.6 11 5ZM15 5V3C15 2.4 14.6 2 14 2C13.4 2 13 2.4 13 3V5C13 5.6 13.4 6 14 6C14.6 6 15 5.6 15 5ZM19 5V3C19 2.4 18.6 2 18 2C17.4 2 17 2.4 17 3V5C17 5.6 17.4 6 18 6C18.6 6 19 5.6 19 5Z" fill="currentColor" />
																<path d="M8.8 13.1C9.2 13.1 9.5 13 9.7 12.8C9.9 12.6 10.1 12.3 10.1 11.9C10.1 11.6 10 11.3 9.8 11.1C9.6 10.9 9.3 10.8 9 10.8C8.8 10.8 8.59999 10.8 8.39999 10.9C8.19999 11 8.1 11.1 8 11.2C7.9 11.3 7.8 11.4 7.7 11.6C7.6 11.8 7.5 11.9 7.5 12.1C7.5 12.2 7.4 12.2 7.3 12.3C7.2 12.4 7.09999 12.4 6.89999 12.4C6.69999 12.4 6.6 12.3 6.5 12.2C6.4 12.1 6.3 11.9 6.3 11.7C6.3 11.5 6.4 11.3 6.5 11.1C6.6 10.9 6.8 10.7 7 10.5C7.2 10.3 7.49999 10.1 7.89999 10C8.29999 9.90003 8.60001 9.80003 9.10001 9.80003C9.50001 9.80003 9.80001 9.90003 10.1 10C10.4 10.1 10.7 10.3 10.9 10.4C11.1 10.5 11.3 10.8 11.4 11.1C11.5 11.4 11.6 11.6 11.6 11.9C11.6 12.3 11.5 12.6 11.3 12.9C11.1 13.2 10.9 13.5 10.6 13.7C10.9 13.9 11.2 14.1 11.4 14.3C11.6 14.5 11.8 14.7 11.9 15C12 15.3 12.1 15.5 12.1 15.8C12.1 16.2 12 16.5 11.9 16.8C11.8 17.1 11.5 17.4 11.3 17.7C11.1 18 10.7 18.2 10.3 18.3C9.9 18.4 9.5 18.5 9 18.5C8.5 18.5 8.1 18.4 7.7 18.2C7.3 18 7 17.8 6.8 17.6C6.6 17.4 6.4 17.1 6.3 16.8C6.2 16.5 6.10001 16.3 6.10001 16.1C6.10001 15.9 6.2 15.7 6.3 15.6C6.4 15.5 6.6 15.4 6.8 15.4C6.9 15.4 7.00001 15.4 7.10001 15.5C7.20001 15.6 7.3 15.6 7.3 15.7C7.5 16.2 7.7 16.6 8 16.9C8.3 17.2 8.6 17.3 9 17.3C9.2 17.3 9.5 17.2 9.7 17.1C9.9 17 10.1 16.8 10.3 16.6C10.5 16.4 10.5 16.1 10.5 15.8C10.5 15.3 10.4 15 10.1 14.7C9.80001 14.4 9.50001 14.3 9.10001 14.3C9.00001 14.3 8.9 14.3 8.7 14.3C8.5 14.3 8.39999 14.3 8.39999 14.3C8.19999 14.3 7.99999 14.2 7.89999 14.1C7.79999 14 7.7 13.8 7.7 13.7C7.7 13.5 7.79999 13.4 7.89999 13.2C7.99999 13 8.2 13 8.5 13H8.8V13.1ZM15.3 17.5V12.2C14.3 13 13.6 13.3 13.3 13.3C13.1 13.3 13 13.2 12.9 13.1C12.8 13 12.7 12.8 12.7 12.6C12.7 12.4 12.8 12.3 12.9 12.2C13 12.1 13.2 12 13.6 11.8C14.1 11.6 14.5 11.3 14.7 11.1C14.9 10.9 15.2 10.6 15.5 10.3C15.8 10 15.9 9.80003 15.9 9.70003C15.9 9.60003 16.1 9.60004 16.3 9.60004C16.5 9.60004 16.7 9.70003 16.8 9.80003C16.9 9.90003 17 10.2 17 10.5V17.2C17 18 16.7 18.4 16.2 18.4C16 18.4 15.8 18.3 15.6 18.2C15.4 18.1 15.3 17.8 15.3 17.5Z" fill="currentColor" />
															</svg>
															</span>
															<!--end::Svg Icon-->
															<input class="form-control form-control-solid ps-12" name="to_date" placeholder="To Date" id="kt_datepicker_itemwise_report_to" value="<?php if(isset($_POST['to_date']) && $_POST['to_date']!="") echo ($_POST['to_date']); else echo "";?>"

															/>
														</div>
													</div>
													<!--end::Col-->
												</div>
											</div>
								</div>
						</div>
							<!--begin::Example-->
							<!--begin::Actions-->
						<div class="row">
							<div class="col-lg-9"></div>
								<div class="col-lg-1">
									<div class="d-flex flex-center flex-row-fluid pt-12">
										<button  class="btn btn-primary" data-bs-dismiss="modal" onclick="selectitem();">View</button>
									</div>
								</div>
							<!-- 	<div class="col-lg-1">
									<div class="d-flex flex-center flex-row-fluid pt-12">
										<button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Print</button>
									</div>
								</div> -->
								<div class="col-lg-1">
									<div class="d-flex flex-center flex-row-fluid pt-12">
										<button type="submit" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
									</div>
								</div>
						</div>
						<!--end::Actions-->
						<br>
						<!--end::Example-->
							<table id="kt_datatable_responsive_item_wise" class="table table-striped table-hover table-row-bordered fs-7 gy-1 gs-2">
								<thead>
	    							<tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">
							           <!--  <th class="min-w-50px">S.No</th> -->
							            <th class="min-w-80px">Date</th>
							            <th class="min-w-80px">Bill No</th>
							            <th class="min-w-100px">Party Name</th>
							            <th class="min-w-80px">Amount</th>
							            <th class="min-w-100px">Pledges</th>
							            <th class="min-w-80px">Description</th>
							            <th class="min-w-80px">Weight</th>
							            <th class="min-w-80px">Active</th>
	    							</tr>
								</thead>
								
								<tbody class="text-gray-600 fw-semibold">
									<?php $i=1; foreach($item_list_view as $itemlistview){?>
									<tr>
							           <!--  <td>1</td> -->
							            <td><?php echo $itemlistview['ENDATE'];?></td>
							            <td><?php echo $itemlistview['BILLNO'];?></td>
							            <td><?php echo $itemlistview['NAME'];?></td>
							            <td><?php echo $itemlistview['AMOUNT'];?></td>
							            <td class="ple1"><?php echo $itemlistview['PLEDGENAME'];?></td>
							            <td><?php echo $itemlistview['DESCRIPTION'];?></td>
							            <td><?php echo $itemlistview['WEIGHT'];?></td>
							            <td><?php echo $itemlistview['ACTIVE'];?></td>
							        </tr>
							        <?php $i++;}?>
							    </tbody>
							</table>
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
		$("#kt_datepicker_itemwise_report_from").flatpickr({
				dateFormat: "d-m-Y",
			});
			$("#kt_datepicker_itemwise_report_to").flatpickr({
				dateFormat: "d-m-Y",
			});
</script>
<script>
	function wt_radio_it()
	{
		var weight_radio_it_it = document.getElementById("weight_radio_it_it");
		var weight_radio_tbox_it_it = document.getElementById("weight_radio_tbox_it_it");
		var weight_radio_tf1_it_it = document.getElementById("weight_radio_tf1_it_it");
		var weight_radio_tf2_it_it = document.getElementById("weight_radio_tf2_it_it");

		if (weight_radio_it_it.checked == true)
		{
		    weight_radio_tbox_it_it.style.display = "block";
		    weight_radio_tf1_it_it.style.display = "block";
	  	} else 
	  	{
	     	weight_radio_tbox_it_it.style.display = "none";
	     	weight_radio_tf1_it_it.style.display = "none";
	     	weight_radio_tf2_it_it.style.display = "none";
	  	}
	}
</script>
<script>
	function wt_tbox_it()
	{
		var wt_radio_tbox_it_it = document.getElementById("wt_radio_tbox_it_it").value;

		 if (wt_radio_tbox_it_it=="between") 
		  {
		  	$("#weight_radio_tf2_it_it").show();
		  }
		  else
		  {
		  	$("#weight_radio_tf2_it_it").hide();
		  }
	}
</script>
<script>

		function all_item_click()
			{

				var all_item = document.getElementById("all_item");
				var daily_item = document.getElementById("daily_item");
				var period_item = document.getElementById("period_item");
				var start_item = document.getElementById("start_date_item");
				var end_item = document.getElementById("end_date_item");
				var blockeffect = document.getElementById("blockeffect_item");

				if (all_item.checked == true)
				{
				   start_date_item.style.display = "none";
				   end_date_item.style.display = "none";
				   blockeffect_item.style.display="none";
			  	}
			}

		</script>
		<script>
			function daily_item_click()
			{
				var all_item = document.getElementById("all_item");
				var daily_item = document.getElementById("daily_item");
				var period_item = document.getElementById("period_item");
				var start_item = document.getElementById("start_date_item");
				var end_item = document.getElementById("end_date_item");
				var blockeffect = document.getElementById("blockeffect_item");

				if (daily_item.checked == true)
				{
				   
				   start_date_item.style.display = "block";
				   end_date_item.style.display = "none";
				   blockeffect_item.style.display="block";
				   
			  	} 
			  	else 
			  	{
			     	// start_month_item.style.display = "none";
			     	start_date_item.style.display = "none";
				    end_date_item.style.display = "none";
				    blockeffect_item.style.display="none";
			  	}
			}
		</script>
<script>
	function period_item_click()
	{
		var start_item = document.getElementById("start_date_item");
		var end_item = document.getElementById("end_date_item");
		var period_item = document.getElementById("period_item");
		var blockeffect = document.getElementById("blockeffect_item");

		if (period_item.checked == true)
		{
		   
		   start_date_item.style.display = "block";
		   end_date_item.style.display = "block";
		   blockeffect_item.style.display="block";

	  	} else 
	  	{
	     	start_month_item.style.display = "none";
	     	start_date_item.style.display = "none";
		    end_date_item.style.display = "none";
		    blockeffect_item.style.display="none";
	  	}			  	
	}
</script>
<script>
		$('#kt_datatable_responsive_item_wise').DataTable( {
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
  $("#kt_datatable_responsive_item_wise").kendoTooltip({
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

//   var name = "";

//   function itemstatus(data){
  	
//   	name = data;
//   }

//   function itemfilterreport()

// {
// 	// alert(name)
    
//     var baseurl= $("#baseurl").val();
// 		$.ajax({
// 			type: "POST",
// 			url: baseurl+'Itemwisereport/itemfilterreport',
// 			async: false,
// 			type: "POST",
// 			data: "status="+status+"&search="+""+"&weight="+""+"&filter_date="+"",
// 			dataType: "html",
// 			success: function(response)
// 			{
// 				alert(response)
				
// 			}
// 		});
    		
      
// }

function selectitem()

{

 	var selectBox = document.getElementById("search_item");
    var selectedValue = selectBox.options[selectBox.selectedIndex].value;

	// alert(selectedValue)
	var search_item_desc = document.getElementById("search_item_desc").value;

	var weight = document.getElementById("wt_radio_tbox_it_it").value; 
	var weight1 = document.getElementById("weight_radio_tf1_it_it").value ; 
	var weight2 = document.getElementById("weight_radio_tf2_it_it").value ;
    
   
    

		var baseurl= $("#baseurl").val();
		// alert(val);
		$.ajax({
			type: "POST",
			url: baseurl+'Itemwisereport/index',
			async: false,
			type: "POST",
			data: "search_item="+selectedValue +"&search_item_desc="+search_item_desc+"&weight_select="+weight+"&weight_select_1="+weight1+"&weight_select_2="+weight2,
			dataType: "html",
			success: function(response)
			{
				// alert(response)
				// $('#search_item').empty().append(response);
				// $('#search_item').addClass('show');
				// $("#search_item").css("display", "block");
			}
		});
    
      
}
</script>


	</body>
	<!--end::Body-->
</html>