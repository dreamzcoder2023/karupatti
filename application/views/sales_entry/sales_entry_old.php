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
									<h1 class="d-flex align-items-center text-dark fw-bold my-1 fs-3">Sales Entry
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
										<!--begin::Card header-->
										<div class="card-header1 border-0 pt-6">
											<div class="row">
												<div class="col-lg-4">
													<div class="row">
														<!--begin::Col-->
														<div class="col-lg-5 fv-row">
															<label class="form-label">Sales From</label>
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
																<input class="form-control form-control-solid ps-12" name="date" placeholder="From Date" id="kt_daterangepicker_lot_entry_from" />
															</div>
														</div>
														<!--end::Col-->
														<!--begin::Col-->
														<div class="col-lg-5 fv-row">
															<label class="form-label">Sales To</label>
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
																<input class="form-control form-control-solid ps-12" name="date" placeholder="To Date" id="kt_daterangepicker_lot_entry_to" />
															</div>
														</div>
														<!--end::Col-->
														<div class="col-lg-1 pt-9">
															<!--begin::Add user-->
															<button type="button" class="btn btn-sm btn-outline btn-outline-solid btn-outline-warning btn-active-light-primary">Go</button>
															<!--end::Add user-->
														</div>
													</div>
												</div>
												<div class="col-lg-3"></div>
												<div class="col-lg-5">
													<div class="row" style="float: right !important;">
														<div class="col-lg-auto pt-9">
																<a href="<?php echo base_url(); ?>Sales_entry/add_sales_entry">
															<!--begin::Add user-->
															<button type="button" class="btn btn-primary">New Sales Entry</button>
															<!--end::Add user-->
														</div>
														<!--begin::Modal - Adjust Balance-->
														<div class="modal fade" id="kt_modal_export_users" tabindex="-1" aria-hidden="true">
															<!--begin::Modal dialog-->
															<div class="modal-dialog modal-dialog-centered mw-650px">
																<!--begin::Modal content-->
																<div class="modal-content">
																	<!--begin::Modal header-->
																	<div class="modal-header">
																		<!--begin::Modal title-->
																		<h2 class="fw-bold">Export Product Entries</h2>
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
																				<label class="fs-6 fw-semibold form-label mb-2">Select Product:</label>
																				<!--end::Label-->
																				<!--begin::Input-->
																				<select name="role" data-control="select2" data-placeholder="Select Redemption" data-hide-search="true" class="form-select form-select-solid fw-bold">
																					<option value="bank">Bank</option>
																					<option value="staff">Staff</option>
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
												</div>
											</div>
											<!--end::Card title-->
										</div>
										<!--end::Card header-->
										<!--begin::Card body-->
										<div class="card-body py-4">
											<form method="POST" action="<?php echo base_url(); ?>Sales_entry" enctype="multipart/form-data">

											

											<!--begin::Table-->
											<table id="kt_datatable_responsive" class="table align-middle table-row-dashed table-striped table-hover fs-7 gy-1 gs-2 dataTable">
												<thead>
												   <tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">
												    <th class="min-w-50px">Date</th>
													
													<th class="min-w-80px">Metal</th>
													<th class="min-w-80px">Party Name</th>
													<th class="min-w-80px">Net Weight</th>
													<th class="min-w-50px">Paid Amount</th>
													<th class="min-w-50px">Balance</th>
													<th class="min-w-125px" style="width: 10%;"><span class="text-end">Actions</span></th>
												        </tr>
												</thead>
												<tbody class="text-gray-600 fw-semibold">
												<?php 

												$i=1; foreach($sales_entry_list as $salesentrylist){ ?>
													<tr>
														<td class="cy"><?php echo $salesentrylist['sales_date'];?></td>
														
														<td><?php //echo $salesentrylist['METAL'];?></td>
														<td><?php echo $salesentrylist['party_name'];?></td>
														<td><?php //echo $salesentrylist['WEIGHT_NEW'];?></td>
														<td><?php //echo $salesentrylist['paid_amount'];?></td>
														<td><?php //echo $salesentrylist['balance_amount'];?></td>
														<td>
															<span class="text-end">
																<a href="#" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm" data-bs-toggle="modal" data-bs-target="#kt_modal_view_sales_entry">
																<i class="bi bi-eye-fill eyc"></i>
																</a>
															</span>
															<!-- <span class="text-end">
																<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Layer_1" width="20" x="0px" y="0px" viewBox="0 0 121.75 122.88" style="enable-background:new 0 0 121.75 122.88" xml:space="preserve"><g><path d="M17.38,19.5c1.66-0.44,3.23-0.82,4.7-1.18c1.71-0.42,3.28-0.8,4.74-1.22c0.27,1.53,0.64,3.03,1.1,4.49 c-1.21,1.19-1.96,2.85-1.96,4.68c0,3.62,2.94,6.56,6.56,6.56c0.46,0,0.9-0.05,1.34-0.14c1.66,2.08,3.56,3.97,5.65,5.62 c-0.12,0.49-0.18,1.01-0.18,1.54c0,3.62,2.94,6.56,6.56,6.56c1.97,0,3.74-0.87,4.94-2.24l-0.06,0.07c1.12,0.35,2.27,0.64,3.44,0.87 L43.86,55.46L42.32,57l18.56,18.56L79.43,57L67.58,45.14c1.17-0.23,2.33-0.51,3.45-0.85c1.2,1.3,2.92,2.12,4.82,2.12 c3.62,0,6.56-2.94,6.56-6.56c0-0.47-0.05-0.93-0.14-1.37c0.24-0.19,0.49-0.38,0.73-0.58c1.88-1.54,3.59-3.27,5.11-5.17 c0.36,0.06,0.73,0.09,1.11,0.09c3.63,0,6.56-2.94,6.56-6.56c0-1.73-0.67-3.3-1.76-4.48c0.42-1.29,0.77-2.61,1.03-3.96 c0.02-0.09,0.03-0.18,0.04-0.27l13.36,3.49c4.07,1.06,5.2,0.87,8.32,3.85c7.64,7.3,4.84,18.77,2.39,28.86 c-0.42,1.71-0.82,3.37-1.17,5.01c-2.33,11.09-5.3,21.92-9.08,32.42c-3.78,10.5-8.38,20.66-13.97,30.38 c-0.48,0.84-1.36,1.31-2.26,1.31v0.01H28.87c-1.03,0-1.93-0.6-2.35-1.47c-3.79-6.56-7.28-13.3-10.4-20.25 c-3.15-7.01-5.92-14.19-8.23-21.58c-1.55-4.93-2.91-10-4.06-15.23c-1.14-5.19-2.07-10.48-2.76-15.9l-0.18-1.37 c-1.24-9.54-2.57-19.76,6.67-24.47C10.26,21.23,14.34,20.31,17.38,19.5L17.38,19.5z M30.99,15.6c4.55-2.08,8.08-5.64,11.76-14.03 c0.43-0.98,1.38-1.57,2.39-1.57V0h31.91c1.19,0,2.2,0.8,2.51,1.89c1.23,3.43,2.69,6.45,4.49,8.92c1.69,2.33,3.68,4.18,6.06,5.44 l0.84,0.22c-0.08,0.16-0.13,0.33-0.17,0.52c-0.19,0.94-0.41,1.86-0.68,2.76c-0.29-0.04-0.58-0.06-0.88-0.06 c-3.62,0-6.56,2.94-6.56,6.56c0,1.65,0.61,3.15,1.61,4.3c-1.21,1.45-2.56,2.78-4.02,3.98c-0.08,0.07-0.17,0.14-0.25,0.21 c-1.13-0.92-2.57-1.47-4.14-1.47c-3.62,0-6.56,2.94-6.56,6.56c0,0.14,0.01,0.28,0.01,0.42c-1.8,0.51-3.66,0.86-5.58,1.03 c-1.91,0.13-3.8,0.09-5.68-0.02c-1.92-0.19-3.8-0.55-5.6-1.08c-0.03,0.65,0.01-0.16,0.01-0.35c0-3.63-2.94-6.56-6.56-6.56 c-1.51,0-2.9,0.51-4.01,1.37l0,0c-1.56-1.27-2.99-2.68-4.28-4.23l-0.01,0.01c0.93-1.13,1.48-2.58,1.48-4.16 c0-3.63-2.94-6.56-6.56-6.56c-0.21,0-0.42,0.01-0.63,0.03l0,0C31.51,18.39,31.2,17.01,30.99,15.6L30.99,15.6L30.99,15.6z M89.22,23.11c1.74,0,3.15,1.41,3.15,3.15c0,1.74-1.41,3.15-3.15,3.15c-1.74,0-3.15-1.41-3.15-3.15 C86.07,24.52,87.48,23.11,89.22,23.11L89.22,23.11z M32.53,23.11c1.74,0,3.15,1.41,3.15,3.15c0,1.74-1.41,3.15-3.15,3.15 c-1.74,0-3.15-1.41-3.15-3.15C29.38,24.52,30.79,23.11,32.53,23.11L32.53,23.11z M45.9,36.69c1.74,0,3.15,1.41,3.15,3.15 c0,1.74-1.41,3.15-3.15,3.15c-1.74,0-3.15-1.41-3.15-3.15C42.75,38.1,44.16,36.69,45.9,36.69L45.9,36.69z M75.86,36.69 c1.74,0,3.15,1.41,3.15,3.15c0,1.74-1.41,3.15-3.15,3.15c-1.74,0-3.15-1.41-3.15-3.15C72.71,38.1,74.12,36.69,75.86,36.69 L75.86,36.69z M60.88,53.27c2.06,0,3.73,1.67,3.73,3.73c0,2.06-1.67,3.73-3.73,3.73c-2.06,0-3.73-1.67-3.73-3.73 C57.14,54.94,58.82,53.27,60.88,53.27L60.88,53.27z M50.22,57l10.66-10.66L71.54,57L60.88,67.66L50.22,57L50.22,57z"/></g></svg>
															</span> -->
														</td>

														<!---->
														<!--end::Action=-->
													</tr>
												</tbody>
												<?php $i++;}?>
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
	<!--begin::Modal - View Lot Entry-->
	<div class="modal fade" id="kt_modal_view_sales_entry" tabindex="-1" aria-hidden="true">
		<!--begin::Modal dialog-->
		<div class="modal-dialog modal-xl">
			<!--begin::Modal content-->
			<div class="modal-content rounded">
				<!--begin::Modal header-->
				<div class="modal-header justify-content-end border-0 pb-0">
					<!--begin::Close-->
					<div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
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
				<div class="modal-body pt-0 pb-15 px-5 px-xl-20">
					<!--begin::Heading-->
					<div class="mb-13 text-center">
						<h1 class="mb-3">View Sales Entry</h1>	
					</div>
					<!--end::Heading-->
					<div class="row">
							<label class="col-lg-1 col-form-label fw-semibold fs-6">Date</label>
							<div class="col-lg-2 fv-row">
								<label class="col-lg-1 col-form-label fw-semibold fs-6">13.12.2022</label>
							</div>
							<label class="col-lg-1 col-form-label fw-semibold fs-6">Party :</label>
								<!-- <label class="col-lg-2 col-form-label fw-semibold fs-6">Anishtan</label> -->

								<div class="col-lg-2 fv-row fv-plugins-icon-container">
								<label class="col-lg-1 col-form-label fw-semibold fs-6">Kumaresan</label>
									<div class="fv-plugins-message-container invalid-feedback"></div>
								</div>

							<label class="col-lg-1 col-form-label fw-semibold fs-6">Mobile :</label>
								<label class="col-lg-2 col-form-label fw-semibold fs-6">9854554524</label>	

							<label class="col-lg-1 col-form-label fw-semibold fs-6"> Address :</label>
								<label class="col-lg-2 col-form-label fw-semibold fs-6">24,Sayalkudi</label>	

						
						</div>
						<div class="row">

									<label class="col-lg-1 col-form-label fw-bold fs-6 text-underlined">Curr.Rate  </label>
									<label class="col-lg-1 col-form-label fw-semibold fs-6">Gold : </label>
									<label class="col-lg-1 col-form-label fw-bold fs-6">4563.00 </label>
									<label class="col-lg-1 col-form-label fw-semibold fs-6">Silver : </label>
									<label class="col-lg-1 col-form-label fw-bold fs-6">57.53</label>	

						</div>
						<div class="row">
												<div class="col-lg-2">
																	<!--begin::Image input-->
																	<div class="image-input image-input-outline" data-kt-image-input="true" >
																		<!--begin::Preview existing avatar-->
																		<div class="image-input-wrapper w-125px h-125px" ></div>
																		<!--end::Preview existing avatar-->
																		<!--begin::Label-->
																		<label class="" data-kt-image-input-action="change" data-bs-toggle="" data-kt-initialized="1">
																			<!-- <i class="bi bi-pencil-fill fs-7"></i> -->
																			<!--begin::Inputs-->
																			<!-- <input type="file" name="avatar" accept=".png, .jpg, .jpeg">
																			<input type="hidden" name="avatar_remove"> -->
																			<!--end::Inputs-->
																		</label>
																		<!--end::Label-->
																	</div>
																	<!--end::Image input-->
																	<!--begin::Hint-->
																	<div class="form-text"></div>
																	<!--end::Hint-->
																</div>
																<div class="col-lg-2">
																	<!--begin::Image input-->
																	<div class="image-input image-input-outline" data-kt-image-input="true">
																		<!--begin::Preview existing avatar-->
																		<div class="image-input-wrapper w-125px h-125px" ></div>
																		<!--end::Preview existing avatar-->
																		<!--begin::Label-->
																		<label class="" data-kt-image-input-action="change" data-bs-toggle="" data-kt-initialized="1">
																			<!-- <i class="bi bi-pencil-fill fs-7"></i> -->
																			<!--begin::Inputs-->
																			<input type="file" name="avatar" accept=".png, .jpg, .jpeg">
																			<input type="hidden" name="avatar_remove">
																			<!--end::Inputs-->
																		</label>
																		<!--end::Label-->
																		
																	</div>
																	<!--end::Image input-->
																	<!--begin::Hint-->
																	<div class="form-text"></div>
																	<!--end::Hint-->
																</div>
																<div class="col-lg-2">
																	<!--begin::Image input-->
																	<div class="image-input image-input-outline" data-kt-image-input="true">
																		<!--begin::Preview existing avatar-->
																		<div class="image-input-wrapper w-125px h-125px"></div>
																		<!--end::Preview existing avatar-->
																		<!--begin::Label-->
																		<label class="" data-kt-image-input-action="change" data-bs-toggle="tooltip" data-kt-initialized="1">
																			<!-- <i class="bi bi-pencil-fill fs-7"></i> -->
																			<!--begin::Inputs-->
																			<!-- <input type="file" name="avatar" accept=".png, .jpg, .jpeg">
																			<input type="hidden" name="avatar_remove"> -->
																			<!--end::Inputs-->
																		</label>
																		<!--end::Label-->
																		
																	</div>
																	<!--end::Image input-->
																	<!--begin::Hint-->
																	<div class="form-text"></div>
																	<!--end::Hint-->
																</div>
															</div>
											<div class="row mb-6" id="lot_gold" >
												<div class="accordion" id="kt_accordion_1">
												    <div class="accordion-item">
												        <h2 class="accordion-header" id="kt_accordion_1_header_1">
												            <button class="accordion-button fw-bold fs-6 collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#kt_accordion_1_body_1" aria-expanded="false" aria-controls="kt_accordion_1_body_1">
												            Item List
												            </button>
												        </h2>
												        <div id="kt_accordion_1_body_1" class="accordion-collapse collapse" aria-labelledby="kt_accordion_1_header_1" data-bs-parent="#kt_accordion_1" style="overflow: scroll !important;">
												            <div class="accordion-body" style="height: auto  !important;overflow: show;">
												           	  <table class="table table-striped border rounded table-hover fs-7 gs-2 gy-1" id="add_pur_register_new_entry">
																    <thead style=" background-color: #A7D3F0 !important;border: 1px solid #606060 !important;color: black !important; text-align: center;">
																        <tr class="fw-bold fs-6 gs-0">
																            <th class="width-10px cy">Sno</th>

																            <th class="min-w-100px cy">Tag No</th>

																            <th class="min-w-200px">Item Name</th>
																             
																            <th class="min-w-125px">Quantity</th>
																            <th class="min-w-100px">Weight</th>

																        </tr>
																    </thead>
																    <tbody>
																        <tr>
																            <td>
																            	<input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex" value="1" readonly>
																            </td>
																            <td>
																            	
																	         <input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex">
																	 
																            </td>
																            
																             <td><input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex">
																            </td>
																            <td><input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex">
																            </td>
																            <td><input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex">
																            </td> 
																        </tr>
																        <tr>
																            <td>
																            	<input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex" value="2" readonly>
																            </td>
																           
																	 
																          
																             <td>
																            	
																	            	<input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex">
																	 
																            </td>
																            <td><input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex">
																            </td>
																            <td><input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex">
																            </td>
																            <td><input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex">
																            </td> 
																        </tr>
																        <tr>
																            <td>
																            	<input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex" value="3" readonly>
																            </td>
																            
																            <td><input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex">
																            </td>
																                <td><input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex">
																            </td>
																            <td><input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex">
																            </td>
																            <td><input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex">
																            </td> 
																        </tr>
																    </tbody>

																    <tfoot>
																    	
																    	<td></td>
																     	<td></td>
																     	<td></td>
																     	<td></td>
																     	<td class="btn btn-primary pt-3 py-3 fw-semibold fs-6" name="gold_calculate" id="gold_calculate" onclick="gold_calculate()">Calculate</td>
																    </tfoot>

																</table>
														<!-- 	<div class="row">	
																
																<div class="col-lg-4"></div>
																		<div class="col-lg-2">
																			<div class="d-flex flex-center flex-row-fluid pt-12">
																				<button type="submit" class="btn btn-primary" id="">Calculator</button>
																			</div>
																		</div>
																	</div> -->
																	<br>
												            </div>
												        </div>
												    </div>
												</div>
											</div><br>
											<div style="padding: 5px 5px 5px 5px !important;box-shadow: 0 3px 6px #00002947;border-radius: 5px;background-color: #f5f5f1;">
												<label class="col-form-label fw-bold fs-5"><u>Old Jewel Exchange</u></label>
												<div class="row">
													<!-- <label class="col-lg-1 col-form-label fw-semibold fs-6"> Count</label>
													<div class="col-lg-1 fv-row fv-plugins-icon-container">
														<input type="text" name="" class="form-control form-control-lg form-control-solid" placeholder="Count">
														<div class="fv-plugins-message-container invalid-feedback"></div>
													</div> -->
													<label class="col-lg-1 col-form-label fw-bold fs-6"> Weight :</label>
													
													<label class="col-lg-1 col-form-label fw-semibold fs-6"> 28.650</label>
													
													<label class="col-lg-1 col-form-label fw-bold fs-6">Stone Less :</label>

													<label class="col-lg-1 col-form-label fw-semibold fs-6">2.50</label>
													
													<label class="col-lg-1 col-form-label fw-bold fs-6"> Less:</label>
													<label class="col-lg-1 col-form-label fw-semibold fs-6"> 12500</label>
													<label class="col-lg-2  col-form-label fw-bold fs-6"> Gram Rate :</label>
													<label class="col-lg-1 col-form-label fw-semibold fs-6"> 1420</label>
													<label class="col-lg-2 col-form-label fw-bold fs-6">Estimated Amount :</label>
													<label class="col-lg-1 col-form-label fw-semibold fs-6">50000</label>
												</div>
											</div><br>
											<div style="padding: 5px 5px 5px 5px !important;box-shadow: 0 3px 6px #00002947;border-radius: 5px;background-color: #f5f5f1;">
												<label class="col-form-label fw-bold fs-5"><u>Total Calculation</u></label>
												<div class="row">
													<!-- <label class="col-lg-1 col-form-label fw-semibold fs-6"> Count</label>
													<div class="col-lg-1 fv-row fv-plugins-icon-container">
														<input type="text" name="" class="form-control form-control-lg form-control-solid" placeholder="Count">
														<div class="fv-plugins-message-container invalid-feedback"></div>
													</div> -->
													<label class="col-lg-1 col-form-label fw-bold fs-6"> Weight :</label>

													<label class="col-lg-1 col-form-label fw-semibold fs-6"> 28.650</label>
													
													<label class="col-lg-2 col-form-label fw-bold fs-6">Other charges :</label>

													<label class="col-lg-1 col-form-label fw-semibold fs-6">5000</label>
												
													<label class="col-lg-1 col-form-label fw-bold fs-6">Amount :</label>
													
													<label class="col-lg-1 col-form-label fw-semibold fs-6">52000</label>
													
													
													<label class="col-lg-1 col-form-label fw-bold fs-6"> Less :</label>

													<label class="col-lg-1 col-form-label fw-semibold fs-6"> 2000</label>
													
													
													<label class="col-lg-1 col-form-label fw-bold fs-6">Final Pay:</label>
													<label class="col-lg-1 col-form-label fw-semibold fs-6"> 50000</label>
													
												</div>
											</div><br>
											<div style="padding: 5px 5px 5px 5px !important;box-shadow: 0 3px 6px #00002947;border-radius: 5px;background-color: #f5f5f1;">
												<label class="col-form-label fw-bold fs-5"><u>Party Payment Details</u></label>

												<div class="row">
													<label class="col-lg-1 col-form-label fw-semibold fs-6" id="cash_lt_ey_label">Cash</label>
													<label class="col-lg-1 col-form-label fw-semibold fs-6" id="">10000</label>
												</div>
												<div class="row">
													<label class="col-lg-1 col-form-label fw-semibold fs-6" id="cheque_lt_ey_label">Cheque</label>

													<label class="col-lg-1 col-form-label fw-semibold fs-6" id="">0.00</label>
												
													<label class="col-lg-1 col-form-label fw-semibold fs-6" id="bank_lt_ey_label">Bank</label>

													<label class="col-lg-1 col-form-label fw-semibold fs-6" id="">-</label>
												
													<label class="col-lg-1 col-form-label fw-semibold fs-6" id="cheque_lt_ey_label">Cheq.no</label>
													
													<label class="col-lg-1 col-form-label fw-semibold fs-6" id="">-</label>
												
												</div>
												<div class="row">

													<label class="col-lg-1 col-form-label fw-semibold fs-6" id="rtgs_lt_ey_label">RTGS</label>
												
												<label class="col-lg-1 col-form-label fw-semibold fs-6" id="rtgs_lt_ey_label">2000</label>
													<label class="col-lg-1 col-form-label fw-semibold fs-6" id="bank_lt_ey_label">Bank</label>
													
													<label class="col-lg-1 col-form-label fw-semibold fs-6" id="rtgs_lt_ey_label">SBI</label>

													<label class="col-lg-1 col-form-label fw-semibold fs-6" id="bank_lt_ey_label">RTGS No</label>
													
													<label class="col-lg-1 col-form-label fw-semibold fs-6" id="rtgs_lt_ey_label">-</label>
												</div>
												<div class="row">
													<!-- <label class="col-lg-1 col-form-label fw-semibold fs-6" id="metal_lt_ey_label">Metal</label>
													<div class="col-lg-2 fv-row fv-plugins-icon-container" id="metal_lt_ey_tbox">
														<input type="text" name="" class="form-control form-control-lg form-control-solid" placeholder="Metal" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
														<div class="fv-plugins-message-container invalid-feedback"></div>
													</div> -->
												</div>
												<div class="row">
													<label class="col-lg-2 col-form-label fw-semibold fs-6">Total Amt</label>
													<label class="col-lg-1 col-form-label fw-bold fs-2">50000</label>
													<label class="col-lg-2 col-form-label fw-semibold fs-6">Paid Amount</label>
													<label class="col-lg-1 col-form-label fw-bold fs-2" id="">45000</label>
													<label class="col-lg-2 col-form-label fw-semibold fs-6">Balance Amount</label>
													<label class="col-lg-1 col-form-label fw-bold fs-2" id="">5000</label>
												</div>
											</div>
						<!--end::Modal - View Lot Entry-->
	<!--begin::Modal - delete Lot Entry-->
	<div class="modal fade" id="kt_modal_delete_lot_entry" tabindex="-1" aria-hidden="true">
		<!--begin::Modal dialog-->
		<div class="modal-dialog modal-m">
			<!--begin::Modal content-->
			<div class="modal-content rounded">
				<div class="swal2-icon swal2-warning swal2-icon-show" style="display: flex;">
					<div class="swal2-icon-content">!</div></div>
					<div class="swal2-html-container" id="swal2-html-container" style="display: block;">Are you sure you want to delete?</div>
					<div class="d-flex flex-center flex-row-fluid pt-12">
						<button type="submit" class="btn btn-danger me-3" data-bs-dismiss="modal">Yes</button>
						<button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
					</div><br><br>
			</div>
			<!--end::Modal content-->
		</div>
		<!--end::Modal dialog-->
	</div>
	<!--end::Modal - delete Lot Entry-->
		<input type="hidden" id="baseurl" value="<?php echo base_url();?>">
		<?php $this->load->view("script");?>
		<!-- <script src="js/products-list.js"></script> -->
		<script>
			function itm_ty()
			{
				var item_type = document.getElementById("item_type").value;

				var lot_gold = document.getElementById("lot_gold");
				var lot_silver = document.getElementById("lot_silver");
				if (item_type == "") 
				{
					lot_gold.style.display = "none";
					lot_silver.style.display = "none";
				}
				else if (item_type == "gold") 
				{
					lot_gold.style.display = "block";
					lot_silver.style.display = "none";
				}
				else
				{
					lot_gold.style.display = "none";
					lot_silver.style.display = "block";
				}

			};
			function itm_ty_edit()
			{
				var item_type_edit = document.getElementById("item_type_edit").value;

				var lot_gold_edit = document.getElementById("lot_gold_edit");
				var lot_silver_edit = document.getElementById("lot_silver_edit");
				if (item_type_edit == "") 
				{
					lot_gold_edit.style.display = "none";
					lot_silver_edit.style.display = "none";
				}
				else if (item_type_edit == "gold") 
				{
					lot_gold_edit.style.display = "block";
					lot_silver_edit.style.display = "none";
				}
				else
				{
					lot_gold_edit.style.display = "none";
					lot_silver_edit.style.display = "block";
				}

			};
			function itm_ty_view()
			{
				var item_type_view = document.getElementById("item_type_view").value;

				var lot_gold_view = document.getElementById("lot_gold_view");
				var lot_silver_view = document.getElementById("lot_silver_view");
				if (item_type_view == "") 
				{
					lot_gold_view.style.display = "none";
					lot_silver_view.style.display = "none";
				}
				else if (item_type_view == "gold") 
				{
					lot_gold_view.style.display = "block";
					lot_silver_view.style.display = "none";
				}
				else
				{
					lot_gold_view.style.display = "none";
					lot_silver_view.style.display = "block";
				}

			};
		</script>
		<script>
			function cash_lt_ey_radio()
			{
				var cash_lot_entry_radio = document.getElementById("cash_lot_entry_radio");

				var cash_lt_ey_label = document.getElementById("cash_lt_ey_label");
				var cash_lt_ey_tbox = document.getElementById("cash_lt_ey_tbox");

				if (cash_lot_entry_radio.checked == true)
				{
				    cash_lt_ey_label.style.display = "block";
				    cash_lt_ey_tbox.style.display = "block";
			  	} else 
			  	{
			  		cash_lt_ey_label.style.display = "none";
				    cash_lt_ey_tbox.style.display = "none";
			  	}
			};

			function cheque_lt_ey_radio()
			{
				var cheque_lot_entry_radio = document.getElementById("cheque_lot_entry_radio");

				var cheque_lt_ey_label = document.getElementById("cheque_lt_ey_label");
				var cheque_lt_ey_tbox = document.getElementById("cheque_lt_ey_tbox");

				if (cheque_lot_entry_radio.checked == true)
				{
				    cheque_lt_ey_label.style.display = "block";
				    cheque_lt_ey_tbox.style.display = "block";
			  	} else 
			  	{
			     	cheque_lt_ey_label.style.display = "none";
			     	cheque_lt_ey_tbox.style.display = "none";
			  	}
			};

			function rtgs_lt_ey_radio()
			{
				var rtgs_lot_entry_radio = document.getElementById("rtgs_lot_entry_radio");

				var rtgs_lt_ey_label = document.getElementById("rtgs_lt_ey_label");
				var rtgs_lt_ey_tbox = document.getElementById("rtgs_lt_ey_tbox");
				var bank_lt_ey_label = document.getElementById("bank_lt_ey_label");
				var bank_lt_ey_tbox = document.getElementById("bank_lt_ey_tbox");

				if (rtgs_lot_entry_radio.checked == true)
				{
				    rtgs_lt_ey_label.style.display = "block";
				    rtgs_lt_ey_tbox.style.display = "block";
				    bank_lt_ey_label.style.display = "block";
				    bank_lt_ey_tbox.style.display = "block";
			  	} else 
			  	{
			     	rtgs_lt_ey_label.style.display = "none";
			     	rtgs_lt_ey_tbox.style.display = "none";
			     	bank_lt_ey_label.style.display = "none";
			     	bank_lt_ey_tbox.style.display = "none";
			  	}
			};

			function metal_lt_ey_radio()
			{
				var metal_lot_entry_radio = document.getElementById("metal_lot_entry_radio");

				var metal_lt_ey_label = document.getElementById("metal_lt_ey_label");
				var metal_lt_ey_tbox = document.getElementById("metal_lt_ey_tbox");
				var purity_lt_ey_label = document.getElementById("purity_lt_ey_label");
				var purity_lt_ey_tbox = document.getElementById("purity_lt_ey_tbox");
				var rate_lt_ey_label = document.getElementById("rate_lt_ey_label");
				var rate_lt_ey_tbox = document.getElementById("rate_lt_ey_tbox");
				var mtamt_lt_ey_label = document.getElementById("mtamt_lt_ey_label");
				var mtamt_lt_ey_tbox = document.getElementById("mtamt_lt_ey_tbox");

				if (metal_lot_entry_radio.checked == true)
				{
				    metal_lt_ey_label.style.display = "block";
			     	metal_lt_ey_tbox.style.display = "block";
			     	purity_lt_ey_label.style.display = "block";
			     	purity_lt_ey_tbox.style.display = "block";

			     	rate_lt_ey_label.style.display = "block";
			     	rate_lt_ey_tbox.style.display = "block";
			     	mtamt_lt_ey_label.style.display = "block";
			     	mtamt_lt_ey_tbox.style.display = "block";
			  	} else 
			  	{
			     	metal_lt_ey_label.style.display = "none";
			     	metal_lt_ey_tbox.style.display = "none";
			     	purity_lt_ey_label.style.display = "none";
			     	purity_lt_ey_tbox.style.display = "none";

			     	rate_lt_ey_label.style.display = "none";
			     	rate_lt_ey_tbox.style.display = "none";
			     	mtamt_lt_ey_label.style.display = "none";
			     	mtamt_lt_ey_tbox.style.display = "none";
			  	}
			};
		</script>
		<script>
			function cash_lt_ey_radio_edit()
			{
				var cash_lot_entry_radio_edit = document.getElementById("cash_lot_entry_radio_edit");

				var cash_lt_ey_label_edit = document.getElementById("cash_lt_ey_label_edit");
				var cash_lt_ey_tbox_edit = document.getElementById("cash_lt_ey_tbox_edit");

				if (cash_lot_entry_radio_edit.checked == true)
				{
				    cash_lt_ey_label_edit.style.display = "block";
				    cash_lt_ey_tbox_edit.style.display = "block";
			  	} else 
			  	{
			  		cash_lt_ey_label_edit.style.display = "none";
				    cash_lt_ey_tbox_edit.style.display = "none";
			  	}
			};

			function cheque_lt_ey_radio_edit()
			{
				var cheque_lot_entry_radio_edit = document.getElementById("cheque_lot_entry_radio_edit");

				var cheque_lt_ey_label_edit = document.getElementById("cheque_lt_ey_label_edit");
				var cheque_lt_ey_tbox_edit = document.getElementById("cheque_lt_ey_tbox_edit");

				if (cheque_lot_entry_radio_edit.checked == true)
				{
				    cheque_lt_ey_label_edit.style.display = "block";
				    cheque_lt_ey_tbox_edit.style.display = "block";
			  	} else 
			  	{
			     	cheque_lt_ey_label_edit.style.display = "none";
			     	cheque_lt_ey_tbox_edit.style.display = "none";
			  	}
			};

			function rtgs_lt_ey_radio_edit()
			{
				var rtgs_lot_entry_radio_edit = document.getElementById("rtgs_lot_entry_radio_edit");

				var rtgs_lt_ey_label_edit = document.getElementById("rtgs_lt_ey_label_edit");
				var rtgs_lt_ey_tbox_edit = document.getElementById("rtgs_lt_ey_tbox_edit");
				var bank_lt_ey_label_edit = document.getElementById("bank_lt_ey_label_edit");
				var bank_lt_ey_tbox_edit = document.getElementById("bank_lt_ey_tbox_edit");

				if (rtgs_lot_entry_radio_edit.checked == true)
				{
				    rtgs_lt_ey_label_edit.style.display = "block";
				    rtgs_lt_ey_tbox_edit.style.display = "block";
				    bank_lt_ey_label_edit.style.display = "block";
				    bank_lt_ey_tbox_edit.style.display = "block";
			  	} else 
			  	{
			     	rtgs_lt_ey_label_edit.style.display = "none";
			     	rtgs_lt_ey_tbox_edit.style.display = "none";
			     	bank_lt_ey_label_edit.style.display = "none";
			     	bank_lt_ey_tbox_edit.style.display = "none";
			  	}
			};

			function metal_lt_ey_radio_edit()
			{
				var metal_lot_entry_radio_edit = document.getElementById("metal_lot_entry_radio_edit");

				var metal_lt_ey_label_edit = document.getElementById("metal_lt_ey_label_edit");
				var metal_lt_ey_tbox_edit = document.getElementById("metal_lt_ey_tbox_edit");
				var purity_lt_ey_label_edit = document.getElementById("purity_lt_ey_label_edit");
				var purity_lt_ey_tbox_edit = document.getElementById("purity_lt_ey_tbox_edit");
				var rate_lt_ey_label_edit = document.getElementById("rate_lt_ey_label_edit");
				var rate_lt_ey_tbox_edit = document.getElementById("rate_lt_ey_tbox_edit");
				var mtamt_lt_ey_label_edit = document.getElementById("mtamt_lt_ey_label_edit");
				var mtamt_lt_ey_tbox_edit = document.getElementById("mtamt_lt_ey_tbox_edit");

				if (metal_lot_entry_radio_edit.checked == true)
				{
				    metal_lt_ey_label_edit.style.display = "block";
			     	metal_lt_ey_tbox_edit.style.display = "block";
			     	purity_lt_ey_label_edit.style.display = "block";
			     	purity_lt_ey_tbox_edit.style.display = "block";

			     	rate_lt_ey_label_edit.style.display = "block";
			     	rate_lt_ey_tbox_edit.style.display = "block";
			     	mtamt_lt_ey_label_edit.style.display = "block";
			     	mtamt_lt_ey_tbox_edit.style.display = "block";
			  	} else 
			  	{
			     	metal_lt_ey_label_edit.style.display = "none";
			     	metal_lt_ey_tbox_edit.style.display = "none";
			     	purity_lt_ey_label_edit.style.display = "none";
			     	purity_lt_ey_tbox_edit.style.display = "none";

			     	rate_lt_ey_label_edit.style.display = "none";
			     	rate_lt_ey_tbox_edit.style.display = "none";
			     	mtamt_lt_ey_label_edit.style.display = "none";
			     	mtamt_lt_ey_tbox_edit.style.display = "none";
			  	}
			};
		</script>
		<script>
			function cash_lt_ey_radio_view()
			{
				var cash_lot_entry_radio_view = document.getElementById("cash_lot_entry_radio_view");

				var cash_lt_ey_label_view = document.getElementById("cash_lt_ey_label_view");
				var cash_lt_ey_tbox_view = document.getElementById("cash_lt_ey_tbox_view");

				if (cash_lot_entry_radio_view.checked == true)
				{
				    cash_lt_ey_label_view.style.display = "block";
				    cash_lt_ey_tbox_view.style.display = "block";
			  	} else 
			  	{
			  		cash_lt_ey_label_view.style.display = "none";
				    cash_lt_ey_tbox_view.style.display = "none";
			  	}
			};

			function cheque_lt_ey_radio_view()
			{
				var cheque_lot_entry_radio_view = document.getElementById("cheque_lot_entry_radio_view");

				var cheque_lt_ey_label_view = document.getElementById("cheque_lt_ey_label_view");
				var cheque_lt_ey_tbox_view = document.getElementById("cheque_lt_ey_tbox_view");

				if (cheque_lot_entry_radio_view.checked == true)
				{
				    cheque_lt_ey_label_view.style.display = "block";
				    cheque_lt_ey_tbox_view.style.display = "block";
			  	} else 
			  	{
			     	cheque_lt_ey_label_view.style.display = "none";
			     	cheque_lt_ey_tbox_view.style.display = "none";
			  	}
			};

			function rtgs_lt_ey_radio_view()
			{
				var rtgs_lot_entry_radio_view = document.getElementById("rtgs_lot_entry_radio_view");

				var rtgs_lt_ey_label_view = document.getElementById("rtgs_lt_ey_label_view");
				var rtgs_lt_ey_tbox_view = document.getElementById("rtgs_lt_ey_tbox_view");
				var bank_lt_ey_label_view = document.getElementById("bank_lt_ey_label_view");
				var bank_lt_ey_tbox_view = document.getElementById("bank_lt_ey_tbox_view");

				if (rtgs_lot_entry_radio_view.checked == true)
				{
				    rtgs_lt_ey_label_view.style.display = "block";
				    rtgs_lt_ey_tbox_view.style.display = "block";
				    bank_lt_ey_label_view.style.display = "block";
				    bank_lt_ey_tbox_view.style.display = "block";
			  	} else 
			  	{
			     	rtgs_lt_ey_label_view.style.display = "none";
			     	rtgs_lt_ey_tbox_view.style.display = "none";
			     	bank_lt_ey_label_view.style.display = "none";
			     	bank_lt_ey_tbox_view.style.display = "none";
			  	}
			};

			function metal_lt_ey_radio_view()
			{
				var metal_lot_entry_radio_view = document.getElementById("metal_lot_entry_radio_view");

				var metal_lt_ey_label_view = document.getElementById("metal_lt_ey_label_view");
				var metal_lt_ey_tbox_view = document.getElementById("metal_lt_ey_tbox_view");
				var purity_lt_ey_label_view = document.getElementById("purity_lt_ey_label_view");
				var purity_lt_ey_tbox_view = document.getElementById("purity_lt_ey_tbox_view");
				var rate_lt_ey_label_view = document.getElementById("rate_lt_ey_label_view");
				var rate_lt_ey_tbox_view = document.getElementById("rate_lt_ey_tbox_view");
				var mtamt_lt_ey_label_view = document.getElementById("mtamt_lt_ey_label_view");
				var mtamt_lt_ey_tbox_view = document.getElementById("mtamt_lt_ey_tbox_view");

				if (metal_lot_entry_radio_view.checked == true)
				{
				    metal_lt_ey_label_view.style.display = "block";
			     	metal_lt_ey_tbox_view.style.display = "block";
			     	purity_lt_ey_label_view.style.display = "block";
			     	purity_lt_ey_tbox_view.style.display = "block";

			     	rate_lt_ey_label_view.style.display = "block";
			     	rate_lt_ey_tbox_view.style.display = "block";
			     	mtamt_lt_ey_label_view.style.display = "block";
			     	mtamt_lt_ey_tbox_view.style.display = "block";
			  	} else 
			  	{
			     	metal_lt_ey_label_view.style.display = "none";
			     	metal_lt_ey_tbox_view.style.display = "none";
			     	purity_lt_ey_label_view.style.display = "none";
			     	purity_lt_ey_tbox_view.style.display = "none";

			     	rate_lt_ey_label_view.style.display = "none";
			     	rate_lt_ey_tbox_view.style.display = "none";
			     	mtamt_lt_ey_label_view.style.display = "none";
			     	mtamt_lt_ey_tbox_view.style.display = "none";
			  	}
			};
		</script>
		<script>
			$('#kt_docs_repeater_basic_silver_add').repeater({
			    initEmpty: false,

			    defaultValues: {
			        'text-input': 'foo'
			    },

			    show: function () {
			        $(this).slideDown();
			    },

			    hide: function (deleteElement) {
			        $(this).slideUp(deleteElement);
			    }
			});
			$('#kt_docs_repeater_basic_gold_add').repeater({
			    initEmpty: false,

			    defaultValues: {
			        'text-input': 'foo'
			    },

			    show: function () {
			        $(this).slideDown();
			    },

			    hide: function (deleteElement) {
			        $(this).slideUp(deleteElement);
			    }
			});
		</script>
		<script>
			$('#kt_docs_repeater_basic_silver_edit').repeater({
			    initEmpty: false,

			    defaultValues: {
			        'text-input': 'foo'
			    },

			    show: function () {
			        $(this).slideDown();
			    },

			    hide: function (deleteElement) {
			        $(this).slideUp(deleteElement);
			    }
			});
			$('#kt_docs_repeater_basic_gold_edit').repeater({
			    initEmpty: false,

			    defaultValues: {
			        'text-input': 'foo'
			    },

			    show: function () {
			        $(this).slideDown();
			    },

			    hide: function (deleteElement) {
			        $(this).slideUp(deleteElement);
			    }
			});
		</script>
		<script>
			$('#kt_docs_repeater_basic_silver_view').repeater({
			    initEmpty: false,

			    defaultValues: {
			        'text-input': 'foo'
			    },

			    show: function () {
			        $(this).slideDown();
			    },

			    hide: function (deleteElement) {
			        $(this).slideUp(deleteElement);
			    }
			});
			$('#kt_docs_repeater_basic_gold_view').repeater({
			    initEmpty: false,

			    defaultValues: {
			        'text-input': 'foo'
			    },

			    show: function () {
			        $(this).slideDown();
			    },

			    hide: function (deleteElement) {
			        $(this).slideUp(deleteElement);
			    }
			});
		</script>
		<script>

				$("#kt_daterangepicker_lot_entry_from").flatpickr({
								dateFormat: "d-m-Y",
							});
				$("#kt_daterangepicker_lot_entry_to").flatpickr({
								dateFormat: "d-m-Y",
							});
				$("#kt_daterangepicker_lot_entry_add_date").flatpickr({
								dateFormat: "d-m-Y",
							});
				$("#kt_daterangepicker_lot_entry_edit_date").flatpickr({
								dateFormat: "d-m-Y",
							});
				$("#kt_daterangepicker_lot_entry_view_date").flatpickr({
								dateFormat: "d-m-Y",
							});

			$("#kt_datatable_responsive").DataTable({
				
				"responsive": true,
				"aaSorting":[],
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

		</script>
	</body>
	<!--end::Body-->
</html>