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
									<h1 class="d-flex align-items-center text-dark fw-bold my-1 fs-3">Sale List
										<!--begin::Separator-->
										
										<span class="h-20px border-gray-400 border-start ms-3 mx-2"></span>
										<label class="d-flex align-items-center text-primary fw-bold my-1 fs-5">
											<span>Party &emsp;-</span>
											<span>&emsp;<?php if($party_name==''){ echo "All"; }else{ echo $party_name; } ?></span>
										</label>
										<span class="h-20px border-gray-400 border-start ms-3 mx-2"></span>
										<label class="d-flex align-items-center text-primary fw-bold my-1 fs-5">
											<span>Bill Id&emsp;-</span>
											<span>&emsp;<?php if($bill_id==''){ echo "All"; }else{ echo $bill_id; } ?></span>
										</label>
										<span class="h-20px border-gray-400 border-start ms-3 mx-2"></span>
										<label class="d-flex align-items-center text-primary fw-bold my-1 fs-5">
											<span>Date &emsp;-</span>
											<span>&emsp;<?php if($dt_fill==''){ echo "All"; }else{ echo $dt_fill; } ?></span>
										</label>
										<!--end::Description-->
									</h1>
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
									<?php if($this->session->flashdata('g_success')){?>
			                  
							  <div class="menu-item px-3">
							  <a href="#" id="pop_up_success" class="menu-link flex-stack px-3" data-bs-toggle="modal" data-bs-target="#success_modal"></a>
							  </div>
																			  
							  <?php } ?>

							  <?php if($this->session->flashdata('g_err')){?>
							
							  <div class="menu-item px-3">
								  <a href="#" id="pop_up_success" class="menu-link flex-stack px-3" data-bs-toggle="modal" data-bs-target="#error_modal"></a>
								  </div>
							  <?php } ?>
									<div class="card card-xxl-stretch mb-5 mb-xl-8">
										<!--begin::Card body-->
										<div class="card-body py-4">
											<div class="d-flex justify-content-end py-6 px-9">


											<!-- <div class="col-lg-8">
												<div class="row">
													<div class="col-lg-4">
														<div class="text-center">
															<label class="form-label fs-3 fw-bold">Product</label>
														</div>
														<div class="text-center">
															<label class="text-success fs-3 fw-bold">Old Jaggery(500 Gram)</label>
														</div>
													</div>
													<div class="col-lg-4">
														<div class="text-center">
															<label class="form-label fs-3 fw-bold">Product Count</label>
														</div>
														<div class="text-center">
															<label class="text-success fs-2 fw-bold">10</label>
														</div>
													</div>
													<div class="col-lg-4">
														<div class="text-center">
															<label class="form-label fs-3 fw-bold">Weight</label>
														</div>
														<div class="text-center">
															<label class="text-success fs-2 fw-bold">5</label>
														</div>
													</div>
												</div>
											</div> -->  
											
											<div class="col-lg-4">
												<div class="d-flex justify-content-end"
													data-kt-user-table-toolbar="base">
													<!--begin::Filter-->
													<button type="button"
														class="btn btn-sm btn-outline btn-outline-solid btn-outline-warning btn-active-light-primary me-3" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Filter
													</button>
													<div class="menu menu-sub menu-sub-dropdown w-300px w-md-325px" data-kt-menu="true">
														<div class="px-7 py-5" data-kt-user-table-filter="form">
														<form method="POST" action="<?php echo base_url(); ?>Aks_sale">	
															<div class="mb-2">
																<label class="form-label fs-6 fw-semibold">Party</label>
																<div class="fv-row fv-plugins-icon-container">
																	<input type="text" name="party_name" id="party_name" class="form-control form-control-lg1 form-control-solid" placeholder="Party Name">
																  <div class="fv-plugins-message-container invalid-feedback"></div>
																</div>
															</div>
															<div class="mb-2">
																<label class="form-label fs-6 fw-semibold">Bill Id</label>
																<div class="fv-row fv-plugins-icon-container">
																	<input type="text" name="bill_id" id="bill_id" class="form-control form-control-lg1 form-control-solid" placeholder="Bill Id">
																  <div class="fv-plugins-message-container invalid-feedback"></div>
																</div>
															</div>
															<div class="mb-2">
																				<label class="form-label">Date</label>
																				<select class="form-select form-select-solid" data-control="select2" data-hide-search="true" name="dt_fill_sale_list" id="dt_fill_sale_list" onchange="date_fill_sale_list();">	
																					<option value="all">All</option>
																					<option value="today" <?php if($dt_fill=="today"){ echo "selected"; } ?>>Today</option>
																					<option value="week"<?php if($dt_fill=="week"){ echo "selected"; } ?>>This Week</option>
																					<option value="monthly"<?php if($dt_fill=="monthly"){ echo "selected"; } ?>>This Month</option>
																					<option value="custom Date"  <?php if($dt_fill=="custom Date"){ echo "selected"; } ?>>Custom Date</option>
																				</select>
																			</div>
																			<div class="mb-2 fv-row" id="today_dt_nontag_list" style="display:none;">
																				<label class="form-label">Today</label>
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
																					<input class="form-control form-control-solid ps-12" name="today_date_fillter" placeholder="Date" id="today_date_fillter" value="<?php echo date("d-m-Y"); ?>" disabled />
																				</div>
																			</div>
																			<div class="mb-2 fv-row" id="week_from_dt_nontag_list" style="display:none;">
																				<label class="form-label">From</label>
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
																					<input class="form-control form-control-solid ps-12" name="" placeholder="Date" id="week_from_date_fillter_nontag_list" value="" disabled />
																				</div>
																			</div>
																			<div class="mb-2 fv-row" id="week_to_dt_nontag_list" style="display:none;">
																				<label class="form-label">To</label>
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
																					<input class="form-control form-control-solid ps-12" name="" placeholder="Date" id="week_to_date_fillter_nontag_list" value="<?php echo date("d-m-Y"); ?>" disabled />
																				</div>
																			</div>
																			<div class="mb-2 fv-row" id="monthly_dt_nontag_list" style="display:none;">
																				<label class="form-label">This Month</label>
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
																					<input class="form-control form-control-solid ps-12" name="monthly_date_fillter_nontag_list" placeholder="Month" id="monthly_date_fillter_nontag_list" value="<?php echo date("m-Y"); ?>" />
																				</div>
																			</div>
																			<div class="mb-2 fv-row" id="from_dt_nontag_list" style="display:none;">
																				<label class="form-label">From</label>
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
																					<input class="form-control form-control-solid ps-12" name="from_date_fillter_nontag_list" placeholder="From Date" id="from_date_fillter_nontag_list" value="<?php echo date("d-m-Y"); ?>" />
																				</div>
																			</div>
																			<div class="mb-2 fv-row" id="to_dt_nontag_list" style="display:none;">
																				<label class="form-label">To</label>
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
																					<input class="form-control form-control-solid ps-12" name="to_date_fillter_nontag_list" placeholder="To Date" id="to_date_fillter_nontag_list" value="<?php echo date("d-m-Y"); ?>"/>
																				</div>
																			</div>
																			<div class="d-flex justify-content-end">
																				<button type="reset" class="btn btn-light btn-active-light-primary fw-semibold me-2 px-6" data-kt-menu-dismiss="true" data-kt-user-table-filter="reset">Reset</button>
																				<button type="submit" class="btn btn-primary fw-semibold px-6" data-kt-menu-dismiss="true" data-kt-user-table-filter="filter">Apply</button>
																			</div>

														        </div>
													        </div>			


													        <button type="button"class="btn btn-sm btn-outline btn-outline-solid btn-outline-warning btn-active-light-primary me-3"data-bs-toggle="modal" data-bs-target="#">Export
												</button>
												<?php if(isset($_SESSION['Karupatti_saleAdd'])){ if($_SESSION['Karupatti_saleAdd']==1){?>
											
												<a href="<?php echo base_url();?>Aks_sale/aks_new_sale" target="_blank"> 
												  <button type="button" class="btn btn-primary">New Sale</button>
											     </a>
											<?php }} ?>
												 </form>
												</div>
											</div>	

										</div>
											<!--begin::Table-->
											<table id="" class="table align-middle table-row-dashed table-striped table-hover fs-7 gy-1 gs-2 dataTable no-footer">
												<thead>
												  <tr class="text-start text-muted fw-bold fs-7 gs-0">
														<th class="min-w-50px">Sno</th>
														<th class="min-w-100px">Date</th>
														<th class="min-w-100px">Bill Id</th>
														<th class="min-w-100px">Party</th>
														<th class="min-w-100px">No.Of.Item</th>
														<th class="min-w-100px">Total Price</th>
														<th class="min-w-100px">Mode Of Delivery</th>
														<th class="min-w-100px">Status</th>
														<th class="min-w-100px">Action</th>
													</tr>
												   </tr>    
												</thead>
												<tbody class="text-gray-600 fw-semibold">
													<?php  foreach($sale_list as $i=> $slist){ 

														$date=date('d-m-Y',strtotime($slist['sale_date']));
														?>
													<tr>
														<td><?php echo $i+1; ?></td> 
														<td><?php echo $date;?>
															<input type="hidden" name="sid_hidden" id="sid_hidden" value="<?php echo $slist['sid'];?>">
														</td>
														<td><?php echo $slist['sale_id'];?></td>
														<td><?php echo $slist['sale_party'];?></td>
														<td><?php echo $slist['sale_prd_count'];?></td>
														<td><?php echo $slist['sale_prd_tot_amt'];?></td>
														<td><?php echo $slist['sale_deliverymode'];?></td>
														<td>
														<!-- <label class="col-form-label fw-semibold fs-7">
																<span style="background-color:#B6BD4F;border-radius: 8px;padding: 5px 15px 5px 15px;"><?php //echo $slist['status'];?></span>
															</label> -->

														<?php if($slist['sale_deliverymode'] =='Direct'){ ?>

														<label class="col-form-label fw-semibold fs-7"><span style="background-color:#B6BD4F;border-radius: 8px;padding: 5px 15px 5px 15px;">Delivered</span></label>
														<?php }else{ ?>


														<?php if($slist['sale_deliverymode'] =='courier'){ ?>
														<?php if($slist['sale_dl_sts'] =='1'){ ?>
														<label class="col-form-label fw-semibold fs-7"><span style="background-color:#FFE87C;border-radius: 8px;padding: 5px 10px 5px 10px;" >Resolve</span></label>
															
															<?php } else {?>
														<label class="col-form-label fw-semibold fs-7"><span style="background-color:#46dcf9;border-radius: 8px;padding: 5px 10px 5px 10px;" >Pending</span></label>
													<?php } ?>
														<!--<button class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm" data-bs-toggle="modal" data-bs-target="#kt_modal_delivery_info" onclick="change_delivery(<?php echo $slist['sid'];?>)">
															<i class="fas fa-info-circle fs-7"></i></button>-->
															<span class="text-end">
															<a href="<?php echo base_url();?>Aks_sale/sale_print_pos/<?php echo $slist['sid'];?>" target="_blank" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm"  title="Print Shipping Pos">
																
																<i class="fa-solid fa-receipt eyc fs-6"></i>
														</a>
														</span>

														<?php  }else{


															if($slist['sale_deliverymode'] =='Courier')?>


															<label class="col-form-label fw-semibold fs-7"><span style="background-color:#B6BD4F;border-radius: 8px;padding: 5px 15px 5px 15px;">Delivered</span></label>

														<?php } }  ?>

														

														</td>
														<!--begin::Action=-->
														<td>
														<span class="text-end">
															<a href="#" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm" data-bs-toggle="modal" data-bs-target="#kt_modal_new_sale" onclick="view_sale('<?php echo $slist['sid']; ?>')">
															<i class="bi bi-eye-fill eyc"></i>
														</a>
														</span>
														<span class="text-end">
															<a href="<?php echo base_url();?>Aks_sale/sale_print/<?php echo $slist['sid'];?>" target="_blank" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm"  title="Print Invoice">
															<i class="fa-solid fa-print eyc fs-6"></i>
														</a>
														</span>
														
														
														
														
														<!--end::Action=-->
													    </td>
													</tr>
												<?php $i++; }?>
												</tbody>

											</table>
											<?php 
												$coun = ceil( $count/10);
												$c_page = isset($_GET['page']) ? $_GET['page'] : 1;
											?>
											<?php $paging_info = get_paging_info1($count,10,$c_page); ?>

														<form   method="POST" id="filter_form" action="" enctype="multipart/form-data" >
															
															 <input type="hidden" id="dt_fill_sale_list" name="dt_fill_sale_list"  value="<?php echo $dt_fill; ?>">

															<input type="hidden" id="from_date_fillter_nontag_list" name="from_date_fillter_nontag_list" value="<?php echo $from_date_fillter; ?>">

															<input type="hidden" id="to_date_fillter_nontag_list" name="to_date_fillter_nontag_list" value="<?php echo $to_date_fillter; ?>">

															<input type="hidden" id="party_name" name="party_name"  value="<?php echo $party_name; ?>">

															<input type="hidden" id="bill_id" name="bill_id"  value="<?php echo $bill_id; ?>">
															
															
														<ul class="pagination" style="float:right;" >
														<!-- If the current page is more than 1, show the First and Previous links -->
														<?php if($paging_info['curr_page'] > 1) : ?>
														
														<li class='paginate_button page-item move_to' value="<?php echo ($paging_info['curr_page'] - 1); ?>" > <a aria-controls='kt_roles_view_table' data-dt-idx='1' tabindex='0' class='page-link'  title='Page <?php echo ($paging_info['curr_page'] - 1); ?>'><</a></li>
														
														<?php endif; ?>



														<?php
															//setup starting point

															//$max is equal to number of links shown
															$max = 3;
															if($paging_info['curr_page'] < $max)
																$sp = 1;
															elseif($paging_info['curr_page'] >= ($paging_info['pages'] - floor($max / 2)) )
																$sp = $paging_info['pages'] - $max + 1;
															elseif($paging_info['curr_page'] >= $max)
																$sp = $paging_info['curr_page']  - floor($max/2);
														?>

														<!-- If the current page >= $max then show link to 1st page -->
														<?php if($paging_info['curr_page'] >= $max) : ?>

														<li class='paginate_button page-item move_to' value="1" ><a aria-controls='kt_roles_view_table' data-dt-idx='1' tabindex='0' class='page-link' onclick="form_submit()"  title='Page 1'>1</a></li>
														<!--<li class='paginate_button page-item '><input type="submit" name="first_page" value="Update" />  </li>-->
														..
														<?php endif; ?>
														<!-- Loop though max number of pages shown and show links either side equal to $max / 2 -->
														<?php for($i = $sp; $i <= ($sp + $max -1);$i++) : ?>

															<?php
																if($i > $paging_info['pages'])
																	continue;
															?>

															<?php if($paging_info['curr_page'] == $i) : ?>

																<li class='paginate_button page-item active move_to' value="<?php echo $i; ?>"> <a aria-controls='kt_roles_view_table' data-dt-idx='1' tabindex='0' onclick="form_submit()" class='page-link'  
																title='Page <?php echo $i; ?>'><?php echo $i; ?></a></li>

															<?php else : ?>

															<li class='paginate_button page-item move_to ' value="<?php echo $i; ?>"> <a aria-controls='kt_roles_view_table' data-dt-idx='1' tabindex='0' onclick="form_submit()" class='page-link'  title='Page <?php echo $i; ?>'><?php echo $i; ?></a></li>

															<?php endif; ?>

														<?php endfor; ?>
														<!-- If the current page is less than say the last page minus $max pages divided by 2-->
														<?php if($paging_info['curr_page'] < ($paging_info['pages'] - floor($max / 2))) : ?>

															..
															<li class='paginate_button page-item  move_to' value="<?php echo $paging_info['pages']; ?>"><a  aria-controls='kt_roles_view_table' data-dt-idx='1' tabindex='0' onclick="submit()" class='page-link'   title='Page <?php echo $paging_info['pages']; ?>'><?php echo $paging_info['pages']; ?></a></li>

														<?php endif; ?>

														<!-- Show last two pages if we're not near them -->
														<?php if($paging_info['curr_page'] < $paging_info['pages']) : ?>

															<li class='paginate_button page-item move_to ' value="<?php echo ($paging_info['curr_page'] + 1); ?>"> <a aria-controls='kt_roles_view_table' data-dt-idx='1' tabindex='0' onclick="submit()" class='page-link'  title='Page <?php echo ($paging_info['curr_page'] + 1); ?>'>></a></li>

														

														<?php endif; ?>
														</ul>
														</form>
														<?php
														function get_paging_info1($tot_rows,$pp,$curr_page)
														{
															$pages = ceil($tot_rows / $pp); // calc pages

															$data = array(); // start out array
															$data['si']        = ($curr_page * $pp) - $pp; // what row to start at
															$data['pages']     = $pages;                   // add the pages
															$data['curr_page'] = $curr_page;               // Whats the current page
															$paging_info['curr_url'] = "http://eibs.elysiumproduct.com/";

															return $data; //return the paging data

														}?>

										<!--end::Card body-->
									</div>
									<!--end::Tables Widget 9-->
								</div>
								<!--end::Col-->
							</div>
							<!--end::Row-->
						</div>
						<!--end::Container-->
						<div class="modal fade" id="success_modal" tabindex="-1" aria-hidden="true">
			<!--begin::Modal dialog-->
			<div class="modal-dialog modal-dialog-centered modal-m">
				<!--begin::Modal content-->
				<div class="modal-content rounded">
					<div class="swal2-icon swal2-success swal2-icon-show" style="display: flex;">
						<div class="swal2-icon-content">&#x2713;</div></div>
						<div class="swal2-html-container" id="swal2-html-container" style="display: block;">
							<b><span> <?php echo $this->session->flashdata('g_success'); ?></span></b>
							</div>
						<div class="d-flex flex-center flex-row-fluid pt-12">
							<button type="submit" class="btn btn-primary me-3" data-bs-dismiss="modal">Ok</button>
							
						</div><br><br>
				</div>
				<!--end::Modal content-->
			</div>
			<!--end::Modal dialog-->
		</div>
		<div class="modal fade" id="error_modal" tabindex="-1" aria-hidden="true">
			<!--begin::Modal dialog-->
			<div class="modal-dialog modal-dialog-centered modal-m">
				<!--begin::Modal content-->
				<div class="modal-content rounded">
					<div class="swal2-icon swal2-icon-show" style="display: flex;border: 3px solid red !important;">
						<div class="swal2-icon-content" style="color:red">&#x2715;</div></div>
						<div class="swal2-html-container" id="swal2-html-container" style="display: block;">
							<b><span> <?php echo $this->session->flashdata('g_err'); ?></span></b>
							</div>
						<div class="d-flex flex-center flex-row-fluid pt-12">
							<button type="submit" class="btn btn-primary me-3" data-bs-dismiss="modal">Ok</button>
							
						</div><br><br>
				</div>
				<!--end::Modal content-->
			</div>
			<!--end::Modal dialog-->
		</div>
					</div>
					<!--end::Content-->
				<?php $this->load->view("footer");?>
				</div>
				<!--end::Wrapper-->
			</div>
			<!--end::Page-->
		</div>
	<!--begin::Modal - New 	sale view-->
	<div class="modal fade" id="kt_modal_new_sale" tabindex="-1" aria-hidden="true">
		<!--begin::Modal dialog-->
		<div class="modal-dialog modal-lg">
			<!--begin::Modal content-->
			<div class="modal-content rounded">
				<!--begin::Modal header-->
				<div class="modal-header justify-content-end border-0 pb-0">
					<!--begin::Close-->
					<div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal" onclick="" >
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
					<div class="mb-10 text-center">
						<h1>View Sale</h1>	
					</div>
					<!--end::Heading-->
						
				<diV class="row">
					<!-- <div class="col-lg-4">
						<div class="px-4" style="border-radius: 10px;padding-bottom: 20px;box-shadow: 0 5px 10px #00002947;">
							<div class="row">
								<div class="d-flex align-items-center">
									<div class="symbol symbol-circle symbol-100px overflow-hidden me-3">
									 <a href="javascript:;">
										<div class="symbol-label">
										 <img src="assets/images/1_kg_old_jaggery.jpeg" class="w-fit" />
										</div>
										</a>
									</div>
								</div>
								<div  class="fw-bold text-gray-800 cursor-pointer text-hover-primary fs-5 fs-xl-1">Old Jaggery</div>
								<span class="fw-bold fs-5">500 Gram</span>
							</div>
						  </div>	
				    </div> -->	
				    <div class="col-lg-12">
						<!-- <div class="px-4" style="border-radius: 10px;padding-bottom: 20px;box-shadow: 0 5px 10px #00002947;"> -->
					     <div class="row">
							<label class="col-lg-1 col-form-label fw-semibold fs-6">Date</label>
							<div class="col-lg-3 fv-row fv-plugins-icon-container">
								<label class="col-form-label fw-bold fs-6"><sapn id="sale_date"></sapn></label>
							</div>
						  	<label class="col-lg-2 col-form-label fw-semibold fs-6">Sale Id</label>
							<div class="col-lg-3 fv-row fv-plugins-icon-container">
								<label class=" col-form-label fw-bold fs-5"><sapn id="sale_id"></sapn></label>
							</div>
						</div>

							
						
						 <div class="row">
						 	<label class="col-lg-2 col-form-label  fw-semibold fs-6">Party</label>
							<div class="col-lg-2 fv-row fv-plugins-icon-container">
								<label class="col-form-label fw-bold fs-6"><sapn id="sale_party"></sapn></label>
							</div>	
							<label class="col-lg-2 col-form-label  fw-semibold fs-6">Total Items</label>
							<div class="col-lg-2 fv-row fv-plugins-icon-container">
								<label class="col-lg-10 col-form-label fw-bold fs-5"><sapn id="total_item"></sapn></label>
							</div>
						  	<label class="col-lg-2 col-form-label  fw-semibold fs-6">Total Price</label>
							<div class="col-lg-2 fv-row fv-plugins-icon-container">
								<label class="col-lg-10 col-form-label fw-bold fs-5"><sapn id="net_amount"></sapn></label>
							</div>
							
						</div>
						   <div class="row mt-10">
						   	<table id="view_table_scroll" class="table align-middle table-row-dashed table-striped table-hover fs-7 gy-1 gs-2" id="kt_datatable_dom_positioning">
												<thead>
													<tr class="text-start text-muted fw-bold fs-7 gs-0">
														<th class="min-w-25px">Sno</th>
												  	    <th class="min-w-50px">Product</th>
														<th class="min-w-25px">Wgt/g</th>
														<th class="min-w-50px">Price Per g</th>
														<th class="min-w-50px">Price</th>
													</tr>
												</thead>
												 <tbody class="text-gray-600 fw-semibold" id="sale_view_table">

												</tbody>	
											</table>
						   </div>
						   <div class="row mt-4">
					   			<div class="col-lg-4 text-start">
								<label class="col-form-label fw-bold fs-5">Total Amount &emsp;</label>
								<label class="col-form-label fw-bold fs-3"><sapn id="total_amount"></sapn></label>
								</div>
								<label class="col-lg-2 col-form-label  fw-bold fs-5">Discount</label>
								<div class="col-lg-2">
							    <label class="col-form-label fw-bold fs-3"><sapn id="discount"></sapn></label>
								</div>
								<label class="col-lg-2 col-form-label  fw-bold fs-5">Net Amount</label>
								<div class="col-lg-2">
							    <label class="col-form-label fw-bold fs-3"><sapn id="net_amount1"></sapn></label>
								</div>
						   </div>
						    <div class="row mt-4">

								 	    <div class="col-lg-4  text-start">
											<label class="col-form-label fw-bold fs-5">Delivery Details  &emsp;</label>
											<label class="col-form-label fw-bold fs-3"><sapn id="del_mode"></sapn></label>
								 	    </div>
							</div>
						   <div class="row mt-4">
						   			<label class="col-form-label fw-bold fs-2 mt-4">Payment Details</label>

						   			<table class="table align-middle table-row-dashed table-striped  fs-6 gy-1 gs-2 dataTable no-footer mt-4">
												<thead>
												  <tr class="text-start text-muted fw-bold fs-6 gs-0">
														<th class="min-w-50px">Payment Mode</th>
														<th class="min-w-100px">Amount</th>
														<th class="min-w-100px">Reference No</th>
														<th class="min-w-100px">Bank</th>
														<th class="min-w-100px">Details</th>
													</tr>
												 
												</thead>
												<tbody class="text-gray-600 fw-semibold fs-7" id="sale_table_payment">
						   							
						   						</tbody>
						   					</table>

						   			
								 	    <div class="row mt-4">
											<div class="col-lg-6 text-start">
												<label class="col-form-label fw-bold fs-2">Paid Amount &emsp;</label>
												<label class="col-form-label fw-bold fs-3" id="paid_amount"></label>
											</div>
											<div class="col-lg-6 text-center">
												<label class="col-form-label fw-bold fs-2">Balance Amount &emsp;</label>
												<label class="col-form-label fw-bold fs-3" id="balance_amount"></label>
											</div>
									</div>
								</div>
					    <!-- </div> -->
					</div>	 
				</diV>

			</div>
				<!--end::Modal body-->
			</div>
			<!--end::Modal content-->
		</div>
		<!--end::Modal dialog-->
	</div>
	<!--begin::Modal - New 	purchase-->
	<div class="modal fade" id="kt_modal_delivery_info" tabindex="-1" aria-hidden="true">
		<!--begin::Modal dialog-->
		<div class="modal-dialog w-300px w-md-325px">
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
					<div class="mb-10 text-center">
						<h1>Courier Details</h1>	
					</div>
					<!--end::Heading-->
					<form name="sale_deliverymode_form" id="sale_deliverymode_form" method="POST" action="<?php echo base_url(); ?>Aks_sale/delivery_update" enctype="multipart/form-data"  onsubmit="return delivery_validation()">	
						<div class="row">
							<div class="mb-2">

								 <input type="hidden" name="delivery_approved" id="delivery_approved" value="0">

								<label class="col-lg-12 form-label fs-6 fw-semibold">Delevered By</label>
								


								<label class="col-form-label fw-bold fs-5" ><sapn id="sale_del_lab" name="del_by">


								</sapn></label>

								<!-- <select class="form-select form-select-solid fs-7" name="del_by" id="del_by" data-control="select2" data-hide-search="true">	
									<option value="0" selected>All</option>
									<option value="Blue Dart">Blue Dart</option>
									<option value="India Post">India Post</option>
									<option value="FedEx">FedEx</option>
									<option value="Professional Courier Services">Professional Courier Services</option>
									<option value="Flipkart">Flipkart</option>
								</select> -->
								<!-- <div class="fv-plugins-message-container invalid-feedback" name="del_by_err" id="del_by_err"></div> -->
								
							</div>

							<div class="mb-2">
								<label class="form-label fs-6 fw-semibold">Enter Tracking Id</label>
								<div class="fv-row fv-plugins-icon-container">
									<input type="text" name="tracking_id" id="tracking_id" class="form-control form-control-lg1 form-control-solid" placeholder="Tracking Id">
								  <div class="fv-plugins-message-container invalid-feedback" name="tracking_id_err" id="tracking_id_err"></div>
							    </div>
							   
								<div class="d-flex justify-content-end mt-4">
									<button type="reset" class="btn btn-secondary me-3" data-bs-dismiss="modal">Cancel</button>
									<button type="submit" class="btn btn-primary" id="save_changes_add_product">Delivered</button>
								</div>	
							</div>
						</div>
			       </form>
				<!--end::Modal body-->
			</div>
			<!--end::Modal content-->
		</div>
		<!--end::Modal dialog-->
	</div>
	<!-- script :: beign -->
	<input type="hidden" id="baseurl" value="<?php echo base_url();?>">
		<?php $this->load->view("script");?>
		<script>
			$(document).ready( function() {
				
				document.getElementById("pop_up_success").click()
				});
			</script>
		<script>

		<script>

		$(document).ready(function() {
			
			$(".move_to").on("click", function () {
				value=$(this).val();
				// alert(value);
				$('#filter_form').attr('action', "<?php echo base_url(); ?>Aks_sale?page="+value);
				$("#filter_form").submit();
				e.preventDefault();
			});
		});
		</script>

		<!-- <script src="js/products-list.js"></script> -->
		 <script>
			$("#view_table_scroll").DataTable({
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
				   ">" +

				  "<'table-responsive'tr>" +

				  "<'row'" +

				  // "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
				  // "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
				   ">"
				});
			$('#view_table_scroll').wrap('<div class="dataTables_scroll" />');
		</script>
		<script>
			function sales_print(val)
			{
				var baseurl= $("#baseurl").val();
				var val =$("#sid_hidden")
				// alert(baseurl);
				// alert(val);	
				$.ajax({
				type: "POST",
				url: baseurl+'Aks_sale/sale_print',
				async: false,
				type: "POST",
				data: "id="+val,
				dataType: "html",
				// success: function(response)
				// {
					
				// }
			});
		</script>
		<script>
			function view_sale(val)
			{
				var baseurl= $("#baseurl").val();
				// alert(baseurl);
				// alert(val);
				$.ajax({
				type: "GET",
				url: baseurl+'Aks_sale/sales_view',
				async: false,
				type: "GET",
				data: "id="+val,
				dataType: "json",
				success: function(response)
				{
					$('#sale_date').html(response.sale_date);
					$('#sale_id').html(response.sale_id);
					$('#sale_party').html(response.sale_party);
					$('#total_item').html(response.sale_prd_count);
					$('#net_amount').html(response.sale_net_amt);
					$('#del_mode').html(response.sale_deliverymode);
					$('#total_amount').html(response.sale_prd_tot_amt);
					$('#discount').html(response.sale_dis_amt);
					$('#net_amount1').html(response.sale_net_amt);
					$('#cash_amount').html(response.sale_cash);
					$('#paid_amount').html(response.sale_cash);
					$('#balance_amount').html(response.balance_cash);
					// $('#sale_del_lab').html(response.delivery_by);
					// $('#del_by').val(response.delivery_by);
				}
			});
				var baseurl= $("#baseurl").val();
				// alert(baseurl);
				$.ajax({
				type: "POST",
				url: baseurl+'Aks_sale/sale_view_table',
				async: false,
				data: "id="+val,
				dataType: "html",
				success: function(response)
				{
					$("#sale_view_table").empty().append(response);
					}
			    });
			 
				var baseurl= $("#baseurl").val();
				// alert(baseurl);
				$.ajax({
				type: "POST",
				url: baseurl+'Aks_sale/payment_details',
				async: false,
				data: "id="+val,
				dataType: "html",
				success: function(response)
				{
					
					var res=response.split('||');

			    
					$('#sale_table_payment').empty();
					$('#sale_table_payment').append(res[1]);
					$('#sale_table_payment').append(res[2]);
					$('#sale_table_payment').append(res[3]);
					$('#sale_table_payment').append(res[4]);
					
					// alert(res[]);
				}
			    });
			}
</script>
		<script>
			function change_delivery(ids)
			{
				
				 

				 
			
			

			var baseurl= $("#baseurl").val();
				// alert(baseurl);
				// alert(val);
				$.ajax({
				type: "GET",
				url: baseurl+'Aks_sale/change_delivery',
				async: false,
				type: "GET",
				data: "id="+ids,
				dataType: "json",
				success: function(response)
				{
					
					$('#sale_del_lab').html(response.delivery_by);
					$('#del_by').val(response.delivery_by);
				}
				});
					$("#delivery_approved").val(ids);
			}
		</script>
		<script>
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
		<script>
	      $("#kt_datatable_responsive").kendoTooltip({
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
		</script>
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

		</script>
		

		<script>
			function date_fill_sale_list()
			{
				var dt_fill_sale_list = document.getElementById('dt_fill_sale_list').value;
				var today_dt_nontag_list = document.getElementById('today_dt_nontag_list');
				var week_from_dt_nontag_list = document.getElementById('week_from_dt_nontag_list');
				var week_to_dt_nontag_list = document.getElementById('week_to_dt_nontag_list');
				var monthly_dt_nontag_list = document.getElementById('monthly_dt_nontag_list');
				var from_dt_nontag_list = document.getElementById('from_dt_nontag_list');
				var to_dt_nontag_list = document.getElementById('to_dt_nontag_list');
				var from_date_fillter_nontag_list = document.getElementById('from_date_fillter_nontag_list');
				var to_date_fillter_nontag_list = document.getElementById('to_date_fillter_nontag_list');

				if (dt_fill_sale_list == "today") 
				{
					today_dt_nontag_list.style.display = "block";
					monthly_dt_nontag_list.style.display = "none";
					from_dt_nontag_list.style.display = "none";
					to_dt_nontag_list.style.display = "none";
					week_from_dt_nontag_list.style.display = "none";
					week_to_dt_nontag_list.style.display = "none";
					$("#today_date_fillter").flatpickr({
								dateFormat: "d-m-Y",
							});
				}
				else if (dt_fill_sale_list == "week")
				{
					today_dt_nontag_list.style.display = "none";
					week_from_dt_nontag_list.style.display = "block";
					week_to_dt_nontag_list.style.display = "block";
					monthly_dt_nontag_list.style.display = "none";
					from_dt_nontag_list.style.display = "none";
					to_dt_nontag_list.style.display = "none";

					var curr = new Date; // get current date
					var first = curr.getDate() - curr.getDay(); // First day is the day of the month - the day of the week
					var last = first + 6; // last day is the first day + 6

					var firstday = new Date(curr.setDate(first)).toISOString().slice(0,10);
					firstday = firstday.split("-").reverse().join("-");
					var lastday = new Date(curr.setDate(last)).toISOString().slice(0,10);
					lastday = lastday.split("-").reverse().join("-");
					$('#week_from_date_fillter_nontag_list').val(firstday);
					$('#week_to_date_fillter_nontag_list').val(lastday);
					
				}
				else if (dt_fill_sale_list == "monthly")
				{
					today_dt_nontag_list.style.display = "none";
					monthly_dt_nontag_list.style.display = "block";
					from_dt_nontag_list.style.display = "none";
					to_dt_nontag_list.style.display = "none";
					week_from_dt_nontag_list.style.display = "none";
					week_to_dt_nontag_list.style.display = "none";
					$("#monthly_date_fillter_nontag_list").flatpickr({
								dateFormat: "m-Y",
							});
				}
				else if (dt_fill_sale_list == "custom Date")
				{
					today_dt_nontag_list.style.display = "none";
					monthly_dt_nontag_list.style.display = "none";
					from_dt_nontag_list.style.display = "block";
					to_dt_nontag_list.style.display = "block";
					week_from_dt_nontag_list.style.display = "none";
					week_to_dt_nontag_list.style.display = "none";

					$("#from_date_fillter_nontag_list").flatpickr({
								dateFormat: "d-m-Y",
							});
					$("#to_date_fillter_nontag_list").flatpickr({
								dateFormat: "d-m-Y",
							});
				}
				else
				{
					today_dt_nontag_list.style.display = "none";
					monthly_dt_nontag_list.style.display = "none";
					from_dt_nontag_list.style.display = "none";
					to_dt_nontag_list.style.display = "none";
					week_from_dt_nontag_list.style.display = "none";
					week_to_dt_nontag_list.style.display = "none";
				}
			}
		</script>
		<script>
			function delivery_validation()
			{
				var err = 0;
				var del_by      = $('#del_by').val();
				var track       = $('#tracking_id').val();

				
			   if(del_by == 0)
			    {
			        $('#del_by_err').html('Please Select Delivered By!');
			        err++;
			    }
			    else
			    {
					$('#del_by_err').html('');
			    }

			    if(track.trim()=='')
			    {
			        $('#tracking_id_err').html('Enter Tracking Id!');
			        err++;
			    }
			    else
			    {
					$('#tracking_id_err').html('');
			    }
			   
			     if(err>0){ return false; }else{ return true; }
			}		
		</script>

	</body>
	<!--end::Body-->
</html>