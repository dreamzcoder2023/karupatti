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
									<h1 class="d-flex align-items-center text-dark fw-bold my-1 fs-3">Pure Gold Wallet
									<!--begin::Separator-->
									<span class="h-20px border-gray-400 border-start ms-3 mx-2"></span>
									<label class="d-flex align-items-center text-primary fw-bold my-1 fs-5">
										<span>Company &emsp;-</span>
										<span>&emsp;All</span>
									</label>
									<span class="h-20px border-gray-400 border-start ms-3 mx-2"></span>
									<label class="d-flex align-items-center text-primary fw-bold my-1 fs-5">
										<span>Date &emsp;-</span>
										<span>&emsp;Today</span>
									</label>
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
											<!--begin::Card title-->
											<div class="row">
												<div class="col-lg-8">
													<div class="row">
														<label class="col-lg-6 form-label text-center fs-4 fw-bold">Gold</label>
														<label class="col-lg-6 form-label text-center fs-4 fw-bold">Silver</label>
													</div>
													<div class="row">
														<label class="col-lg-6 text-success text-center fs-2 fw-bold">
															<!-- <span class="me-3"> -->
																<svg fill="#d4af37" width="30px" height="30px" viewBox="0 0 32 32" version="1.1" xmlns="http://www.w3.org/2000/svg">
																<path d="M11.652 19.245l-0.001-0.001-0.005-0.003zM30.671 16.098l-2.207-5.839-8.022-4.361-16.624 8.861-2.431 6.495 9.8 5.214 0.161-7.067-7.624-4.353 0.654 0.346-0.373-0.215 1.332 0.708-1.212-0.708 7.526 4.065 16.205-8.376-2.594 1.424 3.037-1.551-6.011 3.183-10.434 5.727-0.668 6.816 19.484-10.371zM11.976 17.206l-4.389-2.342 4.269 1.32 13.070-5.8-12.95 6.822z"></path>
																</svg>
															<!-- </span> -->
														120.00(gms)</label>

														<label class="col-lg-6 text-success text-center fs-2 fw-bold">
															<!-- <span class="me-3"> -->
																<svg fill="#C0C0C0" width="30px" height="30px" viewBox="0 0 32 32" version="1.1" xmlns="http://www.w3.org/2000/svg">
																<path d="M11.652 19.245l-0.001-0.001-0.005-0.003zM30.671 16.098l-2.207-5.839-8.022-4.361-16.624 8.861-2.431 6.495 9.8 5.214 0.161-7.067-7.624-4.353 0.654 0.346-0.373-0.215 1.332 0.708-1.212-0.708 7.526 4.065 16.205-8.376-2.594 1.424 3.037-1.551-6.011 3.183-10.434 5.727-0.668 6.816 19.484-10.371zM11.976 17.206l-4.389-2.342 4.269 1.32 13.070-5.8-12.95 6.822z"></path>
																</svg>
															<!-- </span> -->
														80.00(gms)</label>
													</div>
													<div class="row">
														<label class="col-lg-6 text-success text-center fs-2 fw-bold">
															<!-- <span class="me-2"> -->
																<svg height="15px" width="15px" version="1.1" id="_x32_" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" 
																	 viewBox="0 0 512 512"  xml:space="preserve">
																<g>
																	<path class="st0" d="M318.213,66.588h107.818L465.37,0H85.969L46.63,66.588h145.727c32.137,9.476,58.259,28.504,72.702,52.656
																		H85.969l-39.34,66.588h227.316c-13.482,45.473-65.618,79.365-127.924,79.365H68.313v60.013L288.818,512h96.012v-23.222
																		L183.333,321.936c84.557-3.351,153.634-61.218,166.283-136.105h76.415l39.339-66.588H345.687
																		C340.062,100.028,330.637,82.256,318.213,66.588z"/>
																</g>
																</svg>
															<!-- </span> -->
														125364.00</label>
														<label class="col-lg-6 text-success text-center fs-2 fw-bold">
															<!-- <span class="me-3"> -->
																<svg height="15px" width="15px" version="1.1" id="_x32_" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" 
																	 viewBox="0 0 512 512"  xml:space="preserve">																<g>
																	<path class="st0" d="M318.213,66.588h107.818L465.37,0H85.969L46.63,66.588h145.727c32.137,9.476,58.259,28.504,72.702,52.656
																		H85.969l-39.34,66.588h227.316c-13.482,45.473-65.618,79.365-127.924,79.365H68.313v60.013L288.818,512h96.012v-23.222
																		L183.333,321.936c84.557-3.351,153.634-61.218,166.283-136.105h76.415l39.339-66.588H345.687
																		C340.062,100.028,330.637,82.256,318.213,66.588z"/>
																</g>
																</svg>
															<!-- </span> -->
														12587.00</label>
													</div>
												</div>
												<div class="col-lg-4">
													<div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
														<!--begin::Filter-->
														<button type="button" class="btn btn-sm btn-outline btn-outline-solid btn-outline-warning btn-active-light-primary me-3" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
															Filter</button>
														<div class="menu menu-sub menu-sub-dropdown w-300px w-md-325px" data-kt-menu="true">
															<div class="px-7 py-5" data-kt-user-table-filter="form">
																<div class="mb-2">
																	<label class="form-label fs-6 fw-semibold">Company</label>
																	<select class="form-select form-select-solid fw-semibold" data-control="select2" data-hide-search="true">	
																		<option value="all">All</option>
																		<option value="">AGB Main Branch Sayalkudi</option>
																		<option value="">AGB Pernali Branch</option>
																	</select>
																</div>
																<div class="mb-2">
																	<label class="form-label">Date</label>
																	<select class="form-select form-select-solid" data-control="select2" data-hide-search="true" id="dt_fill_pure_gold_stock_list" onchange="date_fill_pure_gold_stock_list();">	
																		<option value="all">All</option>
																		<option value="today">Today</option>
																		<option value="week">This Week</option>
																		<option value="monthly">This Month</option>
																		<option value="custom Date">Custom Date</option>
																	</select>
																</div>
																<div class="mb-2 fv-row" id="today_dt_pure_gold_stock_list" style="display:none;">
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
																		<input class="form-control form-control-solid ps-12" name="" placeholder="Date" id="today_date_fillter_pure_gold_stock_list" value="<?php echo date("d-m-Y"); ?>" disabled />
																	</div>
																</div>
																<div class="mb-2 fv-row" id="week_from_dt_pure_gold_stock_list" style="display:none;">
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
																		<input class="form-control form-control-solid ps-12" name="" placeholder="Date" id="week_from_date_fillter_pure_gold_stock_list" value="" disabled />
																	</div>
																</div>
																<div class="mb-2 fv-row" id="week_to_dt_pure_gold_stock_list" style="display:none;">
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
																		<input class="form-control form-control-solid ps-12" name="" placeholder="Date" id="week_to_date_fillter_pure_gold_stock_list" value="<?php echo date("d-m-Y"); ?>" disabled />
																	</div>
																</div>
																<div class="mb-2 fv-row" id="monthly_dt_pure_gold_stock_list" style="display:none;">
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
																		<input class="form-control form-control-solid ps-12" name="" placeholder="Month" id="monthly_date_fillter_pure_gold_stock_list" value="<?php echo date("m-Y"); ?>" />
																	</div>
																</div>
																<div class="mb-2 fv-row" id="from_dt_pure_gold_stock_list" style="display:none;">
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
																		<input class="form-control form-control-solid ps-12" name="" placeholder="From Date" id="from_date_fillter_pure_gold_stock_list" value="<?php echo date("d-m-Y"); ?>" />
																	</div>
																</div>
																<div class="mb-2 fv-row" id="to_dt_pure_gold_stock_list" style="display:none;">
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
																		<input class="form-control form-control-solid ps-12" name="" placeholder="To Date" id="to_date_fillter_pure_gold_stock_list" value="<?php echo date("d-m-Y"); ?>"/>
																	</div>
																</div>
																<div class="d-flex justify-content-end">
																	<button type="reset" class="btn btn-light btn-active-light-primary fw-semibold me-2 px-6" data-kt-menu-dismiss="true" data-kt-user-table-filter="reset">Reset</button>
																	<button type="submit" class="btn btn-primary fw-semibold px-6" data-kt-menu-dismiss="true" data-kt-user-table-filter="filter">Apply</button>
																</div>
															</div>
														</div>
														<!-- <button type="button" class="btn btn-sm btn-outline btn-outline-solid btn-outline-warning btn-active-light-primary me-3" data-bs-toggle="modal" data-bs-target="#">
															Export</button> -->
													</div>
												</div>
											</div>
											<!--end::Card title-->
										</div>
										<!--end::Card header-->
										<!--begin::Card body-->
										<div class="card-body py-4">
											<table id="kt_datatable_responsive" class="table table-striped border rounded table-hover fs-7 gs-2 gy-1">
											    <thead>
											        <tr class="fw-bold fs-7 gs-0">
											        	<th class="min-w-50px">Sno</th>
											        	<th class="min-w-50px">Date</th>
											        	<th class="min-w-100px">Company</th>
											        	<th class="min-w-100px">Type</th>
											        	<th class="min-w-80px">Count</th>
											            <th class="min-w-100px">Weight(gms)</th>
											            <th class="min-w-100px">Status</th>
											            <th class="min-w-80px">Action</th>
											        </tr>
											    </thead>
											    <tbody>
											        <tr>
											        	<td>1</td>
											        	<td>11-08-2022</td>
											        	<td>AGB - Main Branch Sayalkudi</td>
											            <td>Lot</td>
											            <td>3</td>
											            <td>12.300</td>
											            <td>
															<label class="col-form-label fw-semibold fs-7" name="" id=""><span style="background-color:#B6BD4F;border-radius: 8px;padding: 5px 15px 5px 15px;">In</span>
															</label>
															<!-- <span class="badge badge-light-warning">Waiting Approval</span> -->
														</td>
											            <td>
															<span class="text-end">
																<a href="#" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm" data-bs-toggle="modal" data-bs-target="#">
																	<i class="bi bi-eye-fill eyc"></i>
																</a>
																<!-- <a href="javascript:;" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1" data-bs-toggle="modal" data-bs-target="#kt_modal_edit_pure_gold_entry">
																	<span class="svg-icon svg-icon-3">
																		<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																			<path opacity="0.3" d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z" fill="currentColor"></path>
																			<path d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z" fill="currentColor"></path>
																		</svg>
																	</span>
																</a>
																<a href="#" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm" data-bs-toggle="modal" data-bs-target="#kt_modal_delete_pure_gold_entry">
																	<span class="svg-icon svg-icon-3">
																		<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																			<path d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z" fill="currentColor"></path>
																			<path opacity="0.5" d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z" fill="currentColor"></path>
																			<path opacity="0.5" d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z" fill="currentColor"></path>
																		</svg>
																	</span>
																</a> -->
															</span>
														</td>
											        </tr>
											        <tr>
											        	<td>2</td>
											        	<td>11-11-2022</td>
											        	<td>AGB - Main Pernali Branch</td>
											            <td>Non Tag</td>
											            <td>2</td>
											            <td>9.300</td>
											            <td>
															<label class="col-form-label fw-semibold fs-7" name="" id=""><span style="background-color:#F95B5B;border-radius: 8px;padding: 5px 15px 5px 15px;">Out</span>
															</label>
															<!-- <span class="badge badge-light-warning">Waiting Approval</span> -->
														</td>
											            <td>
															<span class="text-end">
																<a href="#" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm" data-bs-toggle="modal" data-bs-target="#">
																	<i class="bi bi-eye-fill eyc"></i>
																</a>
																<!-- <a href="javascript:;" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1" data-bs-toggle="modal" data-bs-target="#kt_modal_edit_pure_gold_entry">
																	<span class="svg-icon svg-icon-3">
																		<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																			<path opacity="0.3" d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z" fill="currentColor"></path>
																			<path d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z" fill="currentColor"></path>
																		</svg>
																	</span>
																</a>
																<a href="#" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm" data-bs-toggle="modal" data-bs-target="#kt_modal_delete_pure_gold_entry">
																	<span class="svg-icon svg-icon-3">
																		<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																			<path d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z" fill="currentColor"></path>
																			<path opacity="0.5" d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z" fill="currentColor"></path>
																			<path opacity="0.5" d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z" fill="currentColor"></path>
																		</svg>
																	</span>
																</a> -->
															</span>
														</td>
											        </tr>
											        <tr>
											        	<td>3</td>
											        	<td>20-11-2022</td>
											        	<td>AGB - Main Pernali Branch</td>
											            <td>Tag</td>
											            <td>12</td>
											            <td>14.300</td>
											            <td>
															<label class="col-form-label fw-semibold fs-7" name="" id=""><span style="background-color:#B6BD4F;border-radius: 8px;padding: 5px 15px 5px 15px;">Out</span>
															</label>
															<!-- <span class="badge badge-light-warning">Waiting Approval</span> -->
														</td>
											            <td>
															<span class="text-end">
																<a href="#" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm" data-bs-toggle="modal" data-bs-target="#">
																	<i class="bi bi-eye-fill eyc"></i>
																</a>
																<!-- <a href="javascript:;" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1" data-bs-toggle="modal" data-bs-target="#kt_modal_edit_pure_gold_entry">
																	<span class="svg-icon svg-icon-3">
																		<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																			<path opacity="0.3" d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z" fill="currentColor"></path>
																			<path d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z" fill="currentColor"></path>
																		</svg>
																	</span>
																</a>
																<a href="#" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm" data-bs-toggle="modal" data-bs-target="#kt_modal_delete_pure_gold_entry">
																	<span class="svg-icon svg-icon-3">
																		<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																			<path d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z" fill="currentColor"></path>
																			<path opacity="0.5" d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z" fill="currentColor"></path>
																			<path opacity="0.5" d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z" fill="currentColor"></path>
																		</svg>
																	</span>
																</a> -->
															</span>
														</td>
											        </tr>
											        <tr>
											        	<td>4</td>
											        	<td>19-11-2022</td>
											        	<td>AGB - Main Pernali Branch</td>
											            <td>Old Gold Lot</td>
											            <td>5</td>
											            <td>19.300</td>
											            <td>
															<label class="col-form-label fw-semibold fs-7" name="" id=""><span style="background-color:#F95B5B;border-radius: 8px;padding: 5px 15px 5px 15px;">Out</span>
															</label>
															<!-- <span class="badge badge-light-warning">Waiting Approval</span> -->
														</td>
											            <td>
															<span class="text-end">
																<a href="#" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm" data-bs-toggle="modal" data-bs-target="#">
																	<i class="bi bi-eye-fill eyc"></i>
																</a>
																<!-- <a href="javascript:;" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1" data-bs-toggle="modal" data-bs-target="#kt_modal_edit_pure_gold_entry">
																	<span class="svg-icon svg-icon-3">
																		<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																			<path opacity="0.3" d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z" fill="currentColor"></path>
																			<path d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z" fill="currentColor"></path>
																		</svg>
																	</span>
																</a>
																<a href="#" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm" data-bs-toggle="modal" data-bs-target="#kt_modal_delete_pure_gold_entry">
																	<span class="svg-icon svg-icon-3">
																		<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																			<path d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z" fill="currentColor"></path>
																			<path opacity="0.5" d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z" fill="currentColor"></path>
																			<path opacity="0.5" d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z" fill="currentColor"></path>
																		</svg>
																	</span>
																</a> -->
															</span>
														</td>
											        </tr>
											    </tbody>
											</table>
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
		<!--begin::Modal - add old to pure gold entry-->
		<div class="modal fade" id="kt_modal_add_pure_gold_entry" tabindex="-1" aria-hidden="true">
			<!-- <form id="kt_add_pur_register_form" class="form"> -->
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
							<div class="mb-7 text-center">
								<h1>New Pure Gold Entry</h1>
							</div>
							<!--end::Heading-->
							<div style="padding: 10px 10px 10px 10px !important;box-shadow: 0 3px 6px #00002947;border-radius: 5px;background-color: #f5f5f1 !important;">
								<div class="row">
									<label class="col-lg-2 col-form-label required fw-bold fs-6">Transaction No</label>
									<div class="col-lg-2 fv-row fv-plugins-icon-container">
										<input type="text" class="form-control form-control-lg form-control-solid" placeholder="Transaction No" oninput="this.value = this.value.replace(/[^A-Za-z0-9/\\-]/g, '').replace(/(\..*)\./g, '$1');">
										<div class="fv-plugins-message-container invalid-feedback"></div>
									</div>
									<label class="col-lg-2 col-form-label fw-bold fs-6">Manual No</label>
									<div class="col-lg-2 fv-row fv-plugins-icon-container">
										<input type="text" class="form-control form-control-lg form-control-solid" placeholder="Manual No" oninput="this.value = this.value.replace(/[^A-Za-z0-9/-]/g, '').replace(/(\..*)\./g, '$1');">
										<div class="fv-plugins-message-container invalid-feedback"></div>
									</div>
									<label class="col-lg-2 col-form-label required fw-bold fs-6">Invoice No</label>
									<div class="col-lg-2 fv-row fv-plugins-icon-container">
										<input type="text" class="form-control form-control-lg form-control-solid" placeholder="Invoice No" oninput="this.value = this.value.replace(/[^A-Za-z0-9/-]/g, '').replace(/(\..*)\./g, '$1');">
										<div class="fv-plugins-message-container invalid-feedback"></div>
									</div>
								</div>
								<div class="row">
									<label class="col-lg-2 col-form-label required fw-bold fs-6">Invoice Date</label>
									<div class="col-lg-2 fv-row">
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
											<input class="form-control form-control-solid ps-12" placeholder="Date" id="kt_datepicker_add_pure_gold_inv_date" />
										</div>
									</div>
									<label class="col-lg-2 col-form-label required fw-bold fs-6">Today Date</label>
									<div class="col-lg-2 fv-row">
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
											<input class="form-control form-control-solid ps-12" placeholder="Today Date" id="kt_datepicker_add_pure_gold_date" />
										</div>
									</div>
									<label class="col-lg-2 col-form-label required fw-bold fs-6">Attendted By</label>
									<div class="col-lg-2 fv-row">
										<select class="form-select form-select-solid" data-control="select2" data-hide-search="true">	
											<option value="">Select</option>
											<option value="1">Antony</option>
											<option value="2">Arun</option>
											<option value="3">Esakki</option>
											<option value="4">Roshan</option>				
										</select>
									</div>
								</div>
								<div class="row">
									<label class="col-lg-2 col-form-label required fw-bold fs-6">Supplier</label>
									<div class="col-lg-2 fv-row">
										<select class="form-select form-select-solid" data-control="select2" data-hide-search="true">
											<option value="">Select</option>
											<option value="1">Srinivasan</option>
											<option value="2">Gopal</option>
											<option value="3">Kumar</option>				
										</select>
									</div>
								</div>
							</div><br>
							<label class="col-form-label fw-bold fs-5 text-uppercase"><u>Old Gold to Pure Gold List</u></label>
							<table class="table table-striped border rounded table-hover fs-7 gs-2 gy-1" id="kt_modal_add_old_pure_gold_entry_table">
							    <thead style=" background-color: #A7D3F0 !important;border: 1px solid #606060 !important;color: black !important;">
							        <tr class="fw-bold fs-6 gs-0">
							            <th class="min-w-50px cy">Sno</th>
							            <th class="min-w-100px">Item</th>
							            <th class="min-w-100px">Description</th>
							            <th class="min-w-50px">Qty</th>
							            <th class="min-w-50px">Qlty(%)</th>
							            <th class="min-w-100px">Grs Wt(gms)</th>
							            <th class="min-w-100px">St Wt(gms)</th>
							            <th class="min-w-100px">Wst Wt(gms)</th>
							            <th class="min-w-100px">Net Wt(gms)</th>
							            <th class="min-w-100px">Item Rt</th>
							            <th class="min-w-100px">Total Amt</th>
							        </tr>
							    </thead>
							    <tbody>
							        <tr>
							            <td>1</td>
							            <td>Ring</td>
							            <td class="ple1">Ladies Ring 22CT Seal</td>
							            <td>1</td>
							            <td>91</td>
							            <td>3.400</td>
							            <td>0.200</td>
							            <td>0.200</td>
							            <td>3.000</td>
							            <td>5235</td>
							            <td>15705.00</td>
							        </tr>
							        <tr>
							            <td>2</td>
							            <td>Ring</td>
							            <td class="ple1">Ladies Ring 22CT Seal</td>
							            <td>1</td>
							            <td>91</td>
							            <td>3.400</td>
							            <td>0.200</td>
							            <td>0.200</td>
							            <td>3.000</td>
							            <td>5235</td>
							            <td>15705.00</td>
							        </tr>
							        <tr>
							            <td>3</td>
							            <td>Ring</td>
							            <td class="ple1">Ladies Ring 22CT Seal</td>
							            <td>1</td>
							            <td>91</td>
							            <td>3.400</td>
							            <td>0.200</td>
							            <td>0.200</td>
							            <td>3.000</td>
							            <td>5235</td>
							            <td>15705.00</td>
							        </tr>
							        <tr>
							            <td>4</td>
							            <td>Ring</td>
							            <td class="ple1">Ladies Ring 22CT Seal</td>
							            <td>1</td>
							            <td>91</td>
							            <td>3.400</td>
							            <td>0.200</td>
							            <td>0.200</td>
							            <td>3.000</td>
							            <td>5235</td>
							            <td>15705.00</td>
							        </tr>
							        <tr>
							            <td>5</td>
							            <td>Ring</td>
							            <td class="ple1">Ladies Ring 22CT Seal</td>
							            <td>1</td>
							            <td>91</td>
							            <td>3.400</td>
							            <td>0.200</td>
							            <td>0.200</td>
							            <td>3.000</td>
							            <td>5235</td>
							            <td>15705.00</td>
							        </tr>
							    </tbody>
							</table><br>
							<label class="col-form-label fw-bold fs-5 text-uppercase"><u>Pure Gold Entry</u></label>
							<table class="table table-striped border rounded table-hover fs-7 gs-2 gy-1" id="kt_modal_add_pure_gold_entry_table">
							    <thead style=" background-color: #A7D3F0 !important;border: 1px solid #606060 !important;color: black !important;">
							        <tr class="fw-bold fs-6 gs-0">
							            <th class="min-w-25px cy" rowspan="2">Sno</th>
							            <th class="min-w-125px" rowspan="2">Type</th>
							            <th class="min-w-25px" rowspan="2">Qty</th>
							            <th class="min-w-50px" rowspan="2">Tot Wt(gms)</th>
							            <th class="min-w-50px" colspan="2" style="text-align: center;">Charge</th>
							            <th class="min-w-80px" rowspan="2">Total Amt</th>
							        </tr>
							        <tr class="fw-bold fs-6 gs-0">
							            <th class="min-w-60px">LBR</th>
							            <th class="min-w-60px">Other</th>
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
							    		<td>
							    			<input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex">
							    		</td>
							    		<td>
							    			<input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex">
							    		</td>
							    		<td>
							    			<input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex">
							    		</td>
							    		<td>
							    			<input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex">
							    		</td>
							    		<td>
							    			<input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex">
							    		</td>
							    	</tr>
							        <tr>
							    		<td>
							    			<input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex" value="2" readonly>
							    		</td>
							    		<td>
							    			<input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex">
							    		</td>
							    		<td>
							    			<input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex">
							    		</td>
							    		<td>
							    			<input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex">
							    		</td>
							    		<td>
							    			<input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex">
							    		</td>
							    		<td>
							    			<input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex">
							    		</td>
							    		<td>
							    			<input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex">
							    		</td>
							    	</tr>
							    	<tr>
							    		<td>
							    			<input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex" value="3" readonly>
							    		</td>
							    		<td>
							    			<input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex">
							    		</td>
							    		<td>
							    			<input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex">
							    		</td>
							    		<td>
							    			<input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex">
							    		</td>
							    		<td>
							    			<input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex">
							    		</td>
							    		<td>
							    			<input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex">
							    		</td>
							    		<td>
							    			<input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex">
							    		</td>
							    	</tr>
							    	<tr>
							    		<td>
							    			<input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex" value="4" readonly>
							    		</td>
							    		<td>
							    			<input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex">
							    		</td>
							    		<td>
							    			<input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex">
							    		</td>
							    		<td>
							    			<input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex">
							    		</td>
							    		<td>
							    			<input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex">
							    		</td>
							    		<td>
							    			<input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex">
							    		</td>
							    		<td>
							    			<input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex">
							    		</td>
							    	</tr>
							    	<tr>
							    		<td>
							    			<input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex" value="5" readonly>
							    		</td>
							    		<td>
							    			<input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex">
							    		</td>
							    		<td>
							    			<input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex">
							    		</td>
							    		<td>
							    			<input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex">
							    		</td>
							    		<td>
							    			<input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex">
							    		</td>
							    		<td>
							    			<input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex">
							    		</td>
							    		<td>
							    			<input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex">
							    		</td>
							    	</tr>
							    	<tr>
							    		<td>
							    			<input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex" value="6" readonly>
							    		</td>
							    		<td>
							    			<input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex">
							    		</td>
							    		<td>
							    			<input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex">
							    		</td>
							    		<td>
							    			<input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex">
							    		</td>
							    		<td>
							    			<input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex">
							    		</td>
							    		<td>
							    			<input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex">
							    		</td>
							    		<td>
							    			<input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex">
							    		</td>
							    	</tr>
							    	<tr>
							    		<td>
							    			<input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex" value="7" readonly>
							    		</td>
							    		<td>
							    			<input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex">
							    		</td>
							    		<td>
							    			<input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex">
							    		</td>
							    		<td>
							    			<input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex">
							    		</td>
							    		<td>
							    			<input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex">
							    		</td>
							    		<td>
							    			<input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex">
							    		</td>
							    		<td>
							    			<input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex">
							    		</td>
							    	</tr>
							    	<tr>
							    		<td>
							    			<input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex" value="8" readonly>
							    		</td>
							    		<td>
							    			<input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex">
							    		</td>
							    		<td>
							    			<input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex">
							    		</td>
							    		<td>
							    			<input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex">
							    		</td>
							    		<td>
							    			<input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex">
							    		</td>
							    		<td>
							    			<input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex">
							    		</td>
							    		<td>
							    			<input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex">
							    		</td>
							    	</tr>
							    	<tr>
							    		<td>
							    			<input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex" value="9" readonly>
							    		</td>
							    		<td>
							    			<input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex">
							    		</td>
							    		<td>
							    			<input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex">
							    		</td>
							    		<td>
							    			<input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex">
							    		</td>
							    		<td>
							    			<input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex">
							    		</td>
							    		<td>
							    			<input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex">
							    		</td>
							    		<td>
							    			<input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex">
							    		</td>
							    	</tr>
							    	<tr>
							    		<td>
							    			<input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex" value="10" readonly>
							    		</td>
							    		<td>
							    			<input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex">
							    		</td>
							    		<td>
							    			<input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex">
							    		</td>
							    		<td>
							    			<input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex">
							    		</td>
							    		<td>
							    			<input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex">
							    		</td>
							    		<td>
							    			<input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex">
							    		</td>
							    		<td>
							    			<input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex">
							    		</td>
							    	</tr>
							    	<tr>
							    		<td>
							    			<input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex" value="11" readonly>
							    		</td>
							    		<td>
							    			<input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex">
							    		</td>
							    		<td>
							    			<input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex">
							    		</td>
							    		<td>
							    			<input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex">
							    		</td>
							    		<td>
							    			<input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex">
							    		</td>
							    		<td>
							    			<input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex">
							    		</td>
							    		<td>
							    			<input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex">
							    		</td>
							    	</tr>
							    	<tr>
							    		<td>
							    			<input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex" value="12" readonly>
							    		</td>
							    		<td>
							    			<input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex">
							    		</td>
							    		<td>
							    			<input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex">
							    		</td>
							    		<td>
							    			<input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex">
							    		</td>
							    		<td>
							    			<input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex">
							    		</td>
							    		<td>
							    			<input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex">
							    		</td>
							    		<td>
							    			<input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex">
							    		</td>
							    	</tr>
							    </tbody>
							</table>
							<div style="padding: 10px 10px 10px 10px !important;box-shadow: 0 3px 6px #00002947;border-radius: 5px;background-color: #f5f5f1 !important;">
								<div class="row">
									<label class="col-lg-2 col-form-label required fw-bold fs-6">Net Weight</label>
									<div class="col-lg-2 fv-row fv-plugins-icon-container">
										<input type="text" class="form-control form-control-lg form-control-solid" style="font-size: 17px !important;font-weight: 600 !important;" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
										<div class="fv-plugins-message-container invalid-feedback"></div>
									</div>
									<label class="col-lg-2 col-form-label required fw-bold fs-6">Total Amount</label>
									<div class="col-lg-2 fv-row fv-plugins-icon-container">
										<input type="text" class="form-control form-control-lg form-control-solid" style="font-size: 17px !important;font-weight: 600 !important;" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
										<div class="fv-plugins-message-container invalid-feedback"></div>
									</div>
									<label class="col-lg-2 col-form-label fw-bold fs-6">Remarks</label>
									<div class="col-lg-2 fv-row fv-plugins-icon-container">
										<textarea class="form-control form-control-solid" rows="1"></textarea>
									</div>					
								</div>
							</div><br>
							<div style="padding: 10px 10px 10px 10px !important;box-shadow: 0 3px 6px #00002947;border-radius: 5px;background-color:#f5f5f1 !important;">
								<div><label class="col-form-label fw-bold fs-6"><u>Payment Details</u></label></div>
								<div class="row">
									<div class="col-lg-6">
										<div class="row">
											<div id="kt_docs_repeater_basic_add">
												<div class="form-group">
													<div data-repeater-list="kt_docs_repeater_basic">
														<div data-repeater-item="">
															<div class="row">
																<label class="col-lg-2 col-form-label required fw-bold fs-6">Method</label>
																<div class="col-lg-4">
																	<select class="form-select form-select-solid" data-control="select2" data-hide-search="true" >
																		<option value="">Select</option>
																		<option value="card">Card</option>
																		<option value="bank">Bank</option>
																		<option value="cheque">Cheque</option>	
																		<option value="cash">Cash</option>
																		<option value="upi">UPI</option>
																	</select>
																</div>
																<!-- <label class="col-lg-1 col-form-label fw-semibold fs-6">Credit</label> -->
																<div class="col-lg-3">
																	<input type="text" class="form-control form-control-lg form-control-solid" />
																</div>
																<div class="col-lg-3">
																	<a href="javascript:;" data-repeater-delete="" class="btn btn-sm btn-danger mt-md-2">
																	<i class="la la-trash-o fs-3"></i>Del</a>
																</div>
															</div>
														</div>
													</div>
												</div>
												<div class="col-lg-2 form-group">
													<a href="javascript:;" data-repeater-create="" class="btn btn-sm btn-outline btn-outline-solid btn-outline-warning btn-active-light-primary me-2">
													Add</a>
												</div>
											</div>
										</div>
									</div>
									<div class="col-lg-6">
										<div class="row">
											<label class="col-lg-2 col-form-label required fw-bold fs-6">Date</label>
											<div class="col-lg-4 fv-row">
												<div class="d-flex align-items-center">
													<span class="svg-icon position-absolute ms-4 svg-icon-2 dt">
														<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
															<path opacity="0.3" d="M21 22H3C2.4 22 2 21.6 2 21V5C2 4.4 2.4 4 3 4H21C21.6 4 22 4.4 22 5V21C22 21.6 21.6 22 21 22Z" fill="currentColor" />
															<path d="M6 6C5.4 6 5 5.6 5 5V3C5 2.4 5.4 2 6 2C6.6 2 7 2.4 7 3V5C7 5.6 6.6 6 6 6ZM11 5V3C11 2.4 10.6 2 10 2C9.4 2 9 2.4 9 3V5C9 5.6 9.4 6 10 6C10.6 6 11 5.6 11 5ZM15 5V3C15 2.4 14.6 2 14 2C13.4 2 13 2.4 13 3V5C13 5.6 13.4 6 14 6C14.6 6 15 5.6 15 5ZM19 5V3C19 2.4 18.6 2 18 2C17.4 2 17 2.4 17 3V5C17 5.6 17.4 6 18 6C18.6 6 19 5.6 19 5Z" fill="currentColor" />
															<path d="M8.8 13.1C9.2 13.1 9.5 13 9.7 12.8C9.9 12.6 10.1 12.3 10.1 11.9C10.1 11.6 10 11.3 9.8 11.1C9.6 10.9 9.3 10.8 9 10.8C8.8 10.8 8.59999 10.8 8.39999 10.9C8.19999 11 8.1 11.1 8 11.2C7.9 11.3 7.8 11.4 7.7 11.6C7.6 11.8 7.5 11.9 7.5 12.1C7.5 12.2 7.4 12.2 7.3 12.3C7.2 12.4 7.09999 12.4 6.89999 12.4C6.69999 12.4 6.6 12.3 6.5 12.2C6.4 12.1 6.3 11.9 6.3 11.7C6.3 11.5 6.4 11.3 6.5 11.1C6.6 10.9 6.8 10.7 7 10.5C7.2 10.3 7.49999 10.1 7.89999 10C8.29999 9.90003 8.60001 9.80003 9.10001 9.80003C9.50001 9.80003 9.80001 9.90003 10.1 10C10.4 10.1 10.7 10.3 10.9 10.4C11.1 10.5 11.3 10.8 11.4 11.1C11.5 11.4 11.6 11.6 11.6 11.9C11.6 12.3 11.5 12.6 11.3 12.9C11.1 13.2 10.9 13.5 10.6 13.7C10.9 13.9 11.2 14.1 11.4 14.3C11.6 14.5 11.8 14.7 11.9 15C12 15.3 12.1 15.5 12.1 15.8C12.1 16.2 12 16.5 11.9 16.8C11.8 17.1 11.5 17.4 11.3 17.7C11.1 18 10.7 18.2 10.3 18.3C9.9 18.4 9.5 18.5 9 18.5C8.5 18.5 8.1 18.4 7.7 18.2C7.3 18 7 17.8 6.8 17.6C6.6 17.4 6.4 17.1 6.3 16.8C6.2 16.5 6.10001 16.3 6.10001 16.1C6.10001 15.9 6.2 15.7 6.3 15.6C6.4 15.5 6.6 15.4 6.8 15.4C6.9 15.4 7.00001 15.4 7.10001 15.5C7.20001 15.6 7.3 15.6 7.3 15.7C7.5 16.2 7.7 16.6 8 16.9C8.3 17.2 8.6 17.3 9 17.3C9.2 17.3 9.5 17.2 9.7 17.1C9.9 17 10.1 16.8 10.3 16.6C10.5 16.4 10.5 16.1 10.5 15.8C10.5 15.3 10.4 15 10.1 14.7C9.80001 14.4 9.50001 14.3 9.10001 14.3C9.00001 14.3 8.9 14.3 8.7 14.3C8.5 14.3 8.39999 14.3 8.39999 14.3C8.19999 14.3 7.99999 14.2 7.89999 14.1C7.79999 14 7.7 13.8 7.7 13.7C7.7 13.5 7.79999 13.4 7.89999 13.2C7.99999 13 8.2 13 8.5 13H8.8V13.1ZM15.3 17.5V12.2C14.3 13 13.6 13.3 13.3 13.3C13.1 13.3 13 13.2 12.9 13.1C12.8 13 12.7 12.8 12.7 12.6C12.7 12.4 12.8 12.3 12.9 12.2C13 12.1 13.2 12 13.6 11.8C14.1 11.6 14.5 11.3 14.7 11.1C14.9 10.9 15.2 10.6 15.5 10.3C15.8 10 15.9 9.80003 15.9 9.70003C15.9 9.60003 16.1 9.60004 16.3 9.60004C16.5 9.60004 16.7 9.70003 16.8 9.80003C16.9 9.90003 17 10.2 17 10.5V17.2C17 18 16.7 18.4 16.2 18.4C16 18.4 15.8 18.3 15.6 18.2C15.4 18.1 15.3 17.8 15.3 17.5Z" fill="currentColor" />
														</svg>
													</span>
													<input class="form-control form-control-solid ps-12" name="add_dt_pay_pur_regis" placeholder="Date" id="kt_datepicker_add_pure_gold_pay_date" />
												</div>
											</div>
											<label class="col-lg-2 col-form-label required fw-bold fs-6">Cash</label>
											<div class="col-lg-4 fv-row fv-plugins-icon-container">
												<input type="text" name="add_ch_pur_regis" class="form-control form-control-lg form-control-solid" style="font-size: 17px !important;font-weight: 600 !important;" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
												<div class="fv-plugins-message-container invalid-feedback"></div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-9"></div>
								<div class="col-lg-1">
									<div class="d-flex flex-center flex-row-fluid pt-12">
										<button type="reset" class="btn btn-secondary me-3" data-bs-dismiss="modal">Cancel</button>
									</div>
								</div>
								<div class="col-lg-2">
									<div class="d-flex flex-center flex-row-fluid pt-12">
										<button type="submit" class="btn btn-primary" id="save_changes_add_pur_regis">Save Changes</button>
									</div>
								</div>
							</div>
						</div>
						<!--end::Modal body-->
					</div>
					<!--end::Modal content-->
				</div>
				<!--end::Modal dialog-->
			<!-- </form> -->
		</div>
		<!--end::Modal -add old to pure gold entry-->
		<!--begin::Modal - edit old to pure gold entry-->
		<div class="modal fade" id="kt_modal_edit_pure_gold_entry" tabindex="-1" aria-hidden="true">
			<!-- <form id="kt_edit_pur_register_form" class="form"> -->
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
							<div class="mb-7 text-center">
								<h1>Modify Pure Gold Entry</h1>
							</div>
							<!--end::Heading-->
							<div style="padding: 10px 10px 10px 10px !important;box-shadow: 0 3px 6px #00002947;border-radius: 5px;background-color: #f5f5f1 !important;">
								<div class="row">
									<label class="col-lg-2 col-form-label required fw-bold fs-6">Transaction No</label>
									<div class="col-lg-2 fv-row fv-plugins-icon-container">
										<input type="text" class="form-control form-control-lg form-control-solid" placeholder="Transaction No" oninput="this.value = this.value.replace(/[^A-Za-z0-9/\\-]/g, '').replace(/(\..*)\./g, '$1');" value="T-12345">
										<div class="fv-plugins-message-container invalid-feedback"></div>
									</div>
									<label class="col-lg-2 col-form-label fw-bold fs-6">Manual No</label>
									<div class="col-lg-2 fv-row fv-plugins-icon-container">
										<input type="text" class="form-control form-control-lg form-control-solid" placeholder="Manual No" oninput="this.value = this.value.replace(/[^A-Za-z0-9/-]/g, '').replace(/(\..*)\./g, '$1');" value="Ml-12345">
										<div class="fv-plugins-message-container invalid-feedback"></div>
									</div>
									<label class="col-lg-2 col-form-label required fw-bold fs-6">Invoice No</label>
									<div class="col-lg-2 fv-row fv-plugins-icon-container">
										<input type="text" class="form-control form-control-lg form-control-solid" placeholder="Invoice No" oninput="this.value = this.value.replace(/[^A-Za-z0-9/-]/g, '').replace(/(\..*)\./g, '$1');" value="In-12345">
										<div class="fv-plugins-message-container invalid-feedback"></div>
									</div>
								</div>
								<div class="row">
									<label class="col-lg-2 col-form-label required fw-bold fs-6">Invoice Date</label>
									<div class="col-lg-2 fv-row">
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
											<input class="form-control form-control-solid ps-12" placeholder="Date" id="kt_datepicker_edit_pure_gold_inv_date" value="<?php echo date("d m YYYY"); ?>" />
										</div>
									</div>
									<label class="col-lg-2 col-form-label required fw-bold fs-6">Today Date</label>
									<div class="col-lg-2 fv-row">
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
											<input class="form-control form-control-solid ps-12" placeholder="Today Date" id="kt_datepicker_edit_pure_gold_date" value="<?php echo date("d m YYYY"); ?>"/>
										</div>
									</div>
									<label class="col-lg-2 col-form-label required fw-bold fs-6">Attendted By</label>
									<div class="col-lg-2 fv-row">
										<select class="form-select form-select-solid" data-control="select2" data-hide-search="true">	
											<option value="">Select</option>
											<option value="1">Antony</option>
											<option value="2">Arun</option>
											<option value="3" selected="selected">Esakki</option>
											<option value="4">Roshan</option>				
										</select>
									</div>
								</div>
								<div class="row">
									<label class="col-lg-2 col-form-label required fw-bold fs-6">Supplier</label>
									<div class="col-lg-2 fv-row">
										<select class="form-select form-select-solid" data-control="select2" data-hide-search="true">
											<option value="">Select</option>
											<option value="1" selected="selected">Srinivasan</option>
											<option value="2">Gopal</option>
											<option value="3">Kumar</option>				
										</select>
									</div>
								</div>
							</div><br>
							<label class="col-form-label fw-bold fs-5 text-uppercase"><u>Old Gold to Pure Gold List</u></label>
							<table class="table table-striped border rounded table-hover fs-7 gs-2 gy-1" id="kt_modal_edit_old_pure_gold_entry_table">
							    <thead style=" background-color: #A7D3F0 !important;border: 1px solid #606060 !important;color: black !important;">
							        <tr class="fw-bold fs-6 gs-0">
							            <th class="min-w-50px cy">Sno</th>
							            <th class="min-w-100px">Item</th>
							            <th class="min-w-100px">Description</th>
							            <th class="min-w-50px">Qty</th>
							            <th class="min-w-50px">Qlty(%)</th>
							            <th class="min-w-100px">Grs Wt(gms)</th>
							            <th class="min-w-100px">St Wt(gms)</th>
							            <th class="min-w-100px">Wst Wt(gms)</th>
							            <th class="min-w-100px">Net Wt(gms)</th>
							            <th class="min-w-100px">Item Rt</th>
							            <th class="min-w-100px">Total Amt</th>
							        </tr>
							    </thead>
							    <tbody>
							        <tr>
							            <td>1</td>
							            <td>Ring</td>
							            <td class="ple1">Ladies Ring 22CT Seal</td>
							            <td>1</td>
							            <td>91</td>
							            <td>3.400</td>
							            <td>0.200</td>
							            <td>0.200</td>
							            <td>3.000</td>
							            <td>5235</td>
							            <td>15705.00</td>
							        </tr>
							        <tr>
							            <td>2</td>
							            <td>Ring</td>
							            <td class="ple1">Ladies Ring 22CT Seal</td>
							            <td>1</td>
							            <td>91</td>
							            <td>3.400</td>
							            <td>0.200</td>
							            <td>0.200</td>
							            <td>3.000</td>
							            <td>5235</td>
							            <td>15705.00</td>
							        </tr>
							        <tr>
							            <td>3</td>
							            <td>Ring</td>
							            <td class="ple1">Ladies Ring 22CT Seal</td>
							            <td>1</td>
							            <td>91</td>
							            <td>3.400</td>
							            <td>0.200</td>
							            <td>0.200</td>
							            <td>3.000</td>
							            <td>5235</td>
							            <td>15705.00</td>
							        </tr>
							        <tr>
							            <td>4</td>
							            <td>Ring</td>
							            <td class="ple1">Ladies Ring 22CT Seal</td>
							            <td>1</td>
							            <td>91</td>
							            <td>3.400</td>
							            <td>0.200</td>
							            <td>0.200</td>
							            <td>3.000</td>
							            <td>5235</td>
							            <td>15705.00</td>
							        </tr>
							        <tr>
							            <td>5</td>
							            <td>Ring</td>
							            <td class="ple1">Ladies Ring 22CT Seal</td>
							            <td>1</td>
							            <td>91</td>
							            <td>3.400</td>
							            <td>0.200</td>
							            <td>0.200</td>
							            <td>3.000</td>
							            <td>5235</td>
							            <td>15705.00</td>
							        </tr>
							    </tbody>
							</table><br>
							<label class="col-form-label fw-bold fs-5 text-uppercase"><u>Pure Gold Entry</u></label>
							<table class="table table-striped border rounded table-hover fs-7 gs-2 gy-1" id="kt_modal_edit_pure_gold_entry_table">
							    <thead style=" background-color: #A7D3F0 !important;border: 1px solid #606060 !important;color: black !important;">
							        <tr class="fw-bold fs-6 gs-0">
							            <th class="min-w-25px cy" rowspan="2">Sno</th>
							            <th class="min-w-125px" rowspan="2">Type</th>
							            <th class="min-w-25px" rowspan="2">Qty</th>
							            <th class="min-w-50px" rowspan="2">Tot Wt(gms)</th>
							            <th class="min-w-50px" colspan="2" style="text-align: center;">Charge</th>
							            <th class="min-w-80px" rowspan="2">Total Amt</th>
							        </tr>
							        <tr class="fw-bold fs-6 gs-0">
							            <th class="min-w-60px">LBR</th>
							            <th class="min-w-60px">Other</th>
							        </tr>
							    </thead>
							    <tbody>
							    	<tr>
							    		<td>
							    			<input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex" value="1" readonly>
							    		</td>
							    		<td>
							    			<input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex" value="24k - Gold">
							    		</td>
							    		<td>
							    			<input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex" value="1">
							    		</td>
							    		<td>
							    			<input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex" value="50">
							    		</td>
							    		<td>
							    			<input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex" value="200">
							    		</td>
							    		<td>
							    			<input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex" value="200">
							    		</td>
							    		<td>
							    			<input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex" value="248650.00">
							    		</td>
							    	</tr>
							        <tr>
							    		<td>
							    			<input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex" value="2" readonly>
							    		</td>
							    		<td>
							    			<input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex" value="24k - Gold">
							    		</td>
							    		<td>
							    			<input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex" value="1">
							    		</td>
							    		<td>
							    			<input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex" value="50">
							    		</td>
							    		<td>
							    			<input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex" value="200">
							    		</td>
							    		<td>
							    			<input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex" value="200">
							    		</td>
							    		<td>
							    			<input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex" value="248650.00">
							    		</td>
							    	</tr>
							    	<tr>
							    		<td>
							    			<input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex" value="3" readonly>
							    		</td>
							    		<td>
							    			<input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex" value="24k - Gold">
							    		</td>
							    		<td>
							    			<input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex" value="1">
							    		</td>
							    		<td>
							    			<input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex" value="50">
							    		</td>
							    		<td>
							    			<input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex" value="200">
							    		</td>
							    		<td>
							    			<input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex" value="200">
							    		</td>
							    		<td>
							    			<input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex" value="248650.00">
							    		</td>
							    	</tr>
							    	<tr>
							    		<td>
							    			<input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex" value="4" readonly>
							    		</td>
							    		<td>
							    			<input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex" value="24k - Gold">
							    		</td>
							    		<td>
							    			<input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex" value="1">
							    		</td>
							    		<td>
							    			<input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex" value="50">
							    		</td>
							    		<td>
							    			<input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex" value="200">
							    		</td>
							    		<td>
							    			<input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex" value="200">
							    		</td>
							    		<td>
							    			<input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex" value="248650.00">
							    		</td>
							    	</tr>
							    	<tr>
							    		<td>
							    			<input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex" value="5" readonly>
							    		</td>
							    		<td>
							    			<input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex" value="24k - Gold">
							    		</td>
							    		<td>
							    			<input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex" value="1">
							    		</td>
							    		<td>
							    			<input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex" value="50">
							    		</td>
							    		<td>
							    			<input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex" value="200">
							    		</td>
							    		<td>
							    			<input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex" value="200">
							    		</td>
							    		<td>
							    			<input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex" value="248650.00">
							    		</td>
							    	</tr>
							    	<tr>
							    		<td>
							    			<input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex" value="6" readonly>
							    		</td>
							    		<td>
							    			<input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex" value="24k - Gold">
							    		</td>
							    		<td>
							    			<input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex" value="1">
							    		</td>
							    		<td>
							    			<input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex" value="50">
							    		</td>
							    		<td>
							    			<input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex" value="200">
							    		</td>
							    		<td>
							    			<input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex" value="200">
							    		</td>
							    		<td>
							    			<input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex" value="248650.00">
							    		</td>
							    	</tr>
							    	<tr>
							    		<td>
							    			<input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex" value="7" readonly>
							    		</td>
							    		<td>
							    			<input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex" value="24k - Gold">
							    		</td>
							    		<td>
							    			<input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex" value="1">
							    		</td>
							    		<td>
							    			<input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex" value="50">
							    		</td>
							    		<td>
							    			<input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex" value="200">
							    		</td>
							    		<td>
							    			<input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex" value="200">
							    		</td>
							    		<td>
							    			<input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex" value="248650.00">
							    		</td>
							    	</tr>
							    	<tr>
							    		<td>
							    			<input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex" value="8" readonly>
							    		</td>
							    		<td>
							    			<input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex" value="24k - Gold">
							    		</td>
							    		<td>
							    			<input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex" value="1">
							    		</td>
							    		<td>
							    			<input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex" value="50">
							    		</td>
							    		<td>
							    			<input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex" value="200">
							    		</td>
							    		<td>
							    			<input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex" value="200">
							    		</td>
							    		<td>
							    			<input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex" value="248650.00">
							    		</td>
							    	</tr>
							    	<tr>
							    		<td>
							    			<input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex" value="9" readonly>
							    		</td>
							    		<td>
							    			<input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex" value="24k - Gold">
							    		</td>
							    		<td>
							    			<input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex" value="1">
							    		</td>
							    		<td>
							    			<input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex" value="50">
							    		</td>
							    		<td>
							    			<input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex" value="200">
							    		</td>
							    		<td>
							    			<input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex" value="200">
							    		</td>
							    		<td>
							    			<input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex" value="248650.00">
							    		</td>
							    	</tr>
							    	<tr>
							    		<td>
							    			<input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex" value="10" readonly>
							    		</td>
							    		<td>
							    			<input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex" value="24k - Gold">
							    		</td>
							    		<td>
							    			<input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex" value="1">
							    		</td>
							    		<td>
							    			<input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex" value="50">
							    		</td>
							    		<td>
							    			<input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex" value="200">
							    		</td>
							    		<td>
							    			<input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex" value="200">
							    		</td>
							    		<td>
							    			<input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex" value="248650.00">
							    		</td>
							    	</tr>
							    	<tr>
							    		<td>
							    			<input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex" value="11" readonly>
							    		</td>
							    		<td>
							    			<input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex" value="24k - Gold">
							    		</td>
							    		<td>
							    			<input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex" value="1">
							    		</td>
							    		<td>
							    			<input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex" value="50">
							    		</td>
							    		<td>
							    			<input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex" value="200">
							    		</td>
							    		<td>
							    			<input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex" value="200">
							    		</td>
							    		<td>
							    			<input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex" value="248650.00">
							    		</td>
							    	</tr>
							    	<tr>
							    		<td>
							    			<input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex" value="12" readonly>
							    		</td>
							    		<td>
							    			<input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex" value="24k - Gold">
							    		</td>
							    		<td>
							    			<input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex" value="1">
							    		</td>
							    		<td>
							    			<input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex" value="50">
							    		</td>
							    		<td>
							    			<input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex" value="200">
							    		</td>
							    		<td>
							    			<input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex" value="200">
							    		</td>
							    		<td>
							    			<input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex" value="248650.00">
							    		</td>
							    	</tr>
							    </tbody>
							</table>
							<div style="padding: 10px 10px 10px 10px !important;box-shadow: 0 3px 6px #00002947;border-radius: 5px;background-color: #f5f5f1 !important;">
								<div class="row">
									<label class="col-lg-2 col-form-label required fw-bold fs-6">Net Weight</label>
									<div class="col-lg-2 fv-row fv-plugins-icon-container">
										<input type="text" class="form-control form-control-lg form-control-solid" style="font-size: 17px !important;font-weight: 600 !important;" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" value="61.300">
										<div class="fv-plugins-message-container invalid-feedback"></div>
									</div>
									<label class="col-lg-2 col-form-label required fw-bold fs-6">Total Amount</label>
									<div class="col-lg-2 fv-row fv-plugins-icon-container">
										<input type="text" class="form-control form-control-lg form-control-solid" style="font-size: 17px !important;font-weight: 600 !important;" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" value="1048652.00">
										<div class="fv-plugins-message-container invalid-feedback"></div>
									</div>
									<label class="col-lg-2 col-form-label fw-bold fs-6">Remarks</label>
									<div class="col-lg-2 fv-row fv-plugins-icon-container">
										<textarea class="form-control form-control-solid" rows="1">None</textarea>
									</div>					
								</div>
							</div><br>
							<div style="padding: 10px 10px 10px 10px !important;box-shadow: 0 3px 6px #00002947;border-radius: 5px;background-color:#f5f5f1 !important;">
								<div><label class="col-form-label fw-bold fs-6"><u>Payment Details</u></label></div>
								<div class="row">
									<div class="col-lg-6">
										<div class="row">
											<div id="kt_docs_repeater_basic_edit">
												<div class="form-group">
													<div data-repeater-list="kt_docs_repeater_basic">
														<div data-repeater-item="">
															<div class="row">
																<label class="col-lg-2 col-form-label required fw-bold fs-6">Method</label>
																<div class="col-lg-4">
																	<select class="form-select form-select-solid" data-control="select2" data-hide-search="true" >
																		<option value="">Select</option>
																		<option value="card">Card</option>
																		<option value="bank" selected="selected">Bank</option>
																		<option value="cheque">Cheque</option>	
																		<option value="cash">Cash</option>
																		<option value="upi">UPI</option>
																	</select>
																</div>
																<!-- <label class="col-lg-1 col-form-label fw-semibold fs-6">Credit</label> -->
																<div class="col-lg-3">
																	<input type="text" class="form-control form-control-lg form-control-solid" value="SBI" />
																</div>
																<div class="col-lg-3">
																	<a href="javascript:;" data-repeater-delete="" class="btn btn-sm btn-danger mt-md-2">
																	<i class="la la-trash-o fs-3"></i>Del</a>
																</div>
															</div>
														</div>
													</div>
												</div>
												<div class="col-lg-2 form-group">
													<a href="javascript:;" data-repeater-create="" class="btn btn-sm btn-outline btn-outline-solid btn-outline-warning btn-active-light-primary me-2">
													Add</a>
												</div>
											</div>
										</div>
									</div>
									<div class="col-lg-6">
										<div class="row">
											<label class="col-lg-2 col-form-label required fw-bold fs-6">Date</label>
											<div class="col-lg-4 fv-row">
												<div class="d-flex align-items-center">
													<span class="svg-icon position-absolute ms-4 svg-icon-2 dt">
														<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
															<path opacity="0.3" d="M21 22H3C2.4 22 2 21.6 2 21V5C2 4.4 2.4 4 3 4H21C21.6 4 22 4.4 22 5V21C22 21.6 21.6 22 21 22Z" fill="currentColor" />
															<path d="M6 6C5.4 6 5 5.6 5 5V3C5 2.4 5.4 2 6 2C6.6 2 7 2.4 7 3V5C7 5.6 6.6 6 6 6ZM11 5V3C11 2.4 10.6 2 10 2C9.4 2 9 2.4 9 3V5C9 5.6 9.4 6 10 6C10.6 6 11 5.6 11 5ZM15 5V3C15 2.4 14.6 2 14 2C13.4 2 13 2.4 13 3V5C13 5.6 13.4 6 14 6C14.6 6 15 5.6 15 5ZM19 5V3C19 2.4 18.6 2 18 2C17.4 2 17 2.4 17 3V5C17 5.6 17.4 6 18 6C18.6 6 19 5.6 19 5Z" fill="currentColor" />
															<path d="M8.8 13.1C9.2 13.1 9.5 13 9.7 12.8C9.9 12.6 10.1 12.3 10.1 11.9C10.1 11.6 10 11.3 9.8 11.1C9.6 10.9 9.3 10.8 9 10.8C8.8 10.8 8.59999 10.8 8.39999 10.9C8.19999 11 8.1 11.1 8 11.2C7.9 11.3 7.8 11.4 7.7 11.6C7.6 11.8 7.5 11.9 7.5 12.1C7.5 12.2 7.4 12.2 7.3 12.3C7.2 12.4 7.09999 12.4 6.89999 12.4C6.69999 12.4 6.6 12.3 6.5 12.2C6.4 12.1 6.3 11.9 6.3 11.7C6.3 11.5 6.4 11.3 6.5 11.1C6.6 10.9 6.8 10.7 7 10.5C7.2 10.3 7.49999 10.1 7.89999 10C8.29999 9.90003 8.60001 9.80003 9.10001 9.80003C9.50001 9.80003 9.80001 9.90003 10.1 10C10.4 10.1 10.7 10.3 10.9 10.4C11.1 10.5 11.3 10.8 11.4 11.1C11.5 11.4 11.6 11.6 11.6 11.9C11.6 12.3 11.5 12.6 11.3 12.9C11.1 13.2 10.9 13.5 10.6 13.7C10.9 13.9 11.2 14.1 11.4 14.3C11.6 14.5 11.8 14.7 11.9 15C12 15.3 12.1 15.5 12.1 15.8C12.1 16.2 12 16.5 11.9 16.8C11.8 17.1 11.5 17.4 11.3 17.7C11.1 18 10.7 18.2 10.3 18.3C9.9 18.4 9.5 18.5 9 18.5C8.5 18.5 8.1 18.4 7.7 18.2C7.3 18 7 17.8 6.8 17.6C6.6 17.4 6.4 17.1 6.3 16.8C6.2 16.5 6.10001 16.3 6.10001 16.1C6.10001 15.9 6.2 15.7 6.3 15.6C6.4 15.5 6.6 15.4 6.8 15.4C6.9 15.4 7.00001 15.4 7.10001 15.5C7.20001 15.6 7.3 15.6 7.3 15.7C7.5 16.2 7.7 16.6 8 16.9C8.3 17.2 8.6 17.3 9 17.3C9.2 17.3 9.5 17.2 9.7 17.1C9.9 17 10.1 16.8 10.3 16.6C10.5 16.4 10.5 16.1 10.5 15.8C10.5 15.3 10.4 15 10.1 14.7C9.80001 14.4 9.50001 14.3 9.10001 14.3C9.00001 14.3 8.9 14.3 8.7 14.3C8.5 14.3 8.39999 14.3 8.39999 14.3C8.19999 14.3 7.99999 14.2 7.89999 14.1C7.79999 14 7.7 13.8 7.7 13.7C7.7 13.5 7.79999 13.4 7.89999 13.2C7.99999 13 8.2 13 8.5 13H8.8V13.1ZM15.3 17.5V12.2C14.3 13 13.6 13.3 13.3 13.3C13.1 13.3 13 13.2 12.9 13.1C12.8 13 12.7 12.8 12.7 12.6C12.7 12.4 12.8 12.3 12.9 12.2C13 12.1 13.2 12 13.6 11.8C14.1 11.6 14.5 11.3 14.7 11.1C14.9 10.9 15.2 10.6 15.5 10.3C15.8 10 15.9 9.80003 15.9 9.70003C15.9 9.60003 16.1 9.60004 16.3 9.60004C16.5 9.60004 16.7 9.70003 16.8 9.80003C16.9 9.90003 17 10.2 17 10.5V17.2C17 18 16.7 18.4 16.2 18.4C16 18.4 15.8 18.3 15.6 18.2C15.4 18.1 15.3 17.8 15.3 17.5Z" fill="currentColor" />
														</svg>
													</span>
													<input class="form-control form-control-solid ps-12" placeholder="Date" id="kt_datepicker_edit_pure_gold_pay_date" value="<?php echo date("d m YYYY"); ?>" />
												</div>
											</div>
											<label class="col-lg-2 col-form-label required fw-bold fs-6">Cash</label>
											<div class="col-lg-4 fv-row fv-plugins-icon-container">
												<input type="text" name="add_ch_pur_regis" class="form-control form-control-lg form-control-solid" style="font-size: 17px !important;font-weight: 600 !important;" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" value="1048652.00">
												<div class="fv-plugins-message-container invalid-feedback"></div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-9"></div>
								<div class="col-lg-1">
									<div class="d-flex flex-center flex-row-fluid pt-12">
										<button type="reset" class="btn btn-secondary me-3" data-bs-dismiss="modal">Cancel</button>
									</div>
								</div>
								<div class="col-lg-2">
									<div class="d-flex flex-center flex-row-fluid pt-12">
										<button type="submit" class="btn btn-primary" id="save_changes_add_pur_regis">Save Changes</button>
									</div>
								</div>
							</div>
						</div>
						<!--end::Modal body-->
					</div>
					<!--end::Modal content-->
				</div>
				<!--end::Modal dialog-->
			<!-- </form> -->
		</div>
		<!--end::Modal - edit old to pure gold entry-->
		<!--begin::Modal - view old to pure gold entry-->
		<div class="modal fade" id="kt_modal_view_pure_gold_entry" tabindex="-1" aria-hidden="true">
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
							<div class="mb-7 text-center">
								<h1>View Pure Gold Entry List</h1>
							</div>
							<!--end::Heading-->
							<div style="padding: 10px 10px 10px 10px !important;box-shadow: 0 3px 6px #00002947;border-radius: 5px;background-color: #f5f5f1 !important;">
								<div class="row">
									<label class="col-lg-2 col-form-label fw-bold fs-6">Transaction No</label>
									<div class="col-lg-2 fv-row fv-plugins-icon-container">
										<input type="text" class="form-control form-control-lg form-control-solid" placeholder="Transaction No" oninput="this.value = this.value.replace(/[^A-Za-z0-9/\\-]/g, '').replace(/(\..*)\./g, '$1');" value="T-12345" readonly>
										<div class="fv-plugins-message-container invalid-feedback"></div>
									</div>
									<label class="col-lg-2 col-form-label fw-bold fs-6">Manual No</label>
									<div class="col-lg-2 fv-row fv-plugins-icon-container">
										<input type="text" class="form-control form-control-lg form-control-solid" placeholder="Manual No" oninput="this.value = this.value.replace(/[^A-Za-z0-9/-]/g, '').replace(/(\..*)\./g, '$1');" value="Ml-12345" readonly>
										<div class="fv-plugins-message-container invalid-feedback"></div>
									</div>
									<label class="col-lg-2 col-form-label fw-bold fs-6">Invoice No</label>
									<div class="col-lg-2 fv-row fv-plugins-icon-container">
										<input type="text" class="form-control form-control-lg form-control-solid" placeholder="Invoice No" oninput="this.value = this.value.replace(/[^A-Za-z0-9/-]/g, '').replace(/(\..*)\./g, '$1');" value="In-12345" readonly>
										<div class="fv-plugins-message-container invalid-feedback"></div>
									</div>
								</div>
								<div class="row">
									<label class="col-lg-2 col-form-label fw-bold fs-6">Invoice Date</label>
									<div class="col-lg-2 fv-row">
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
											<input class="form-control form-control-solid ps-12" placeholder="Date" id="kt_datepicker_view_pure_gold_inv_date" value="<?php echo date("d m YYYY"); ?>" disabled />
										</div>
									</div>
									<label class="col-lg-2 col-form-label fw-bold fs-6">Today Date</label>
									<div class="col-lg-2 fv-row">
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
											<input class="form-control form-control-solid ps-12" placeholder="Today Date" id="kt_datepicker_view_pure_gold_date" value="<?php echo date("d m YYYY"); ?>" disabled/>
										</div>
									</div>
									<label class="col-lg-2 col-form-label fw-bold fs-6">Attendted By</label>
									<div class="col-lg-2 fv-row">
										<select class="form-select form-select-solid" data-control="select2" data-hide-search="true" disabled>	
											<option value="">Select</option>
											<option value="1">Antony</option>
											<option value="2">Arun</option>
											<option value="3" selected="selected">Esakki</option>
											<option value="4">Roshan</option>				
										</select>
									</div>
								</div>
								<div class="row">
									<label class="col-lg-2 col-form-label fw-bold fs-6">Supplier</label>
									<div class="col-lg-2 fv-row">
										<select class="form-select form-select-solid" data-control="select2" data-hide-search="true" disabled>
											<option value="">Select</option>
											<option value="1" selected="selected">Srinivasan</option>
											<option value="2">Gopal</option>
											<option value="3">Kumar</option>				
										</select>
									</div>
								</div>
							</div><br>
							<label class="col-form-label fw-bold fs-5 text-uppercase"><u>Old Gold to Pure Gold List</u></label>
							<table class="table table-striped border rounded table-hover fs-7 gs-2 gy-1" id="kt_modal_view_old_pure_gold_entry_table">
							    <thead style=" background-color: #A7D3F0 !important;border: 1px solid #606060 !important;color: black !important;">
							        <tr class="fw-bold fs-6 gs-0">
							            <th class="min-w-50px cy">Sno</th>
							            <th class="min-w-100px">Item</th>
							            <th class="min-w-100px">Description</th>
							            <th class="min-w-50px">Qty</th>
							            <th class="min-w-50px">Qlty(%)</th>
							            <th class="min-w-100px">Grs Wt(gms)</th>
							            <th class="min-w-100px">St Wt(gms)</th>
							            <th class="min-w-100px">Wst Wt(gms)</th>
							            <th class="min-w-100px">Net Wt(gms)</th>
							            <th class="min-w-100px">Item Rt</th>
							            <th class="min-w-100px">Total Amt</th>
							        </tr>
							    </thead>
							    <tbody>
							        <tr>
							            <td>1</td>
							            <td>Ring</td>
							            <td class="ple1">Ladies Ring 22CT Seal</td>
							            <td>1</td>
							            <td>91</td>
							            <td>3.400</td>
							            <td>0.200</td>
							            <td>0.200</td>
							            <td>3.000</td>
							            <td>5235</td>
							            <td>15705.00</td>
							        </tr>
							        <tr>
							            <td>2</td>
							            <td>Ring</td>
							            <td class="ple1">Ladies Ring 22CT Seal</td>
							            <td>1</td>
							            <td>91</td>
							            <td>3.400</td>
							            <td>0.200</td>
							            <td>0.200</td>
							            <td>3.000</td>
							            <td>5235</td>
							            <td>15705.00</td>
							        </tr>
							        <tr>
							            <td>3</td>
							            <td>Ring</td>
							            <td class="ple1">Ladies Ring 22CT Seal</td>
							            <td>1</td>
							            <td>91</td>
							            <td>3.400</td>
							            <td>0.200</td>
							            <td>0.200</td>
							            <td>3.000</td>
							            <td>5235</td>
							            <td>15705.00</td>
							        </tr>
							        <tr>
							            <td>4</td>
							            <td>Ring</td>
							            <td class="ple1">Ladies Ring 22CT Seal</td>
							            <td>1</td>
							            <td>91</td>
							            <td>3.400</td>
							            <td>0.200</td>
							            <td>0.200</td>
							            <td>3.000</td>
							            <td>5235</td>
							            <td>15705.00</td>
							        </tr>
							        <tr>
							            <td>5</td>
							            <td>Ring</td>
							            <td class="ple1">Ladies Ring 22CT Seal</td>
							            <td>1</td>
							            <td>91</td>
							            <td>3.400</td>
							            <td>0.200</td>
							            <td>0.200</td>
							            <td>3.000</td>
							            <td>5235</td>
							            <td>15705.00</td>
							        </tr>
							    </tbody>
							</table><br>
							<label class="col-form-label fw-bold fs-5 text-uppercase"><u>Pure Gold Entry</u></label>
							<table class="table table-striped border rounded table-hover fs-7 gs-2 gy-1" id="kt_modal_view_pure_gold_entry_table">
							    <thead style=" background-color: #A7D3F0 !important;border: 1px solid #606060 !important;color: black !important;">
							        <tr class="fw-bold fs-6 gs-0">
							            <th class="min-w-25px cy" rowspan="2">Sno</th>
							            <th class="min-w-125px" rowspan="2">Type</th>
							            <th class="min-w-25px" rowspan="2">Qty</th>
							            <th class="min-w-50px" rowspan="2">Tot Wt(gms)</th>
							            <th class="min-w-50px" colspan="2" style="text-align: center;">Charge</th>
							            <th class="min-w-80px" rowspan="2">Total Amt</th>
							        </tr>
							        <tr class="fw-bold fs-6 gs-0">
							            <th class="min-w-60px">LBR</th>
							            <th class="min-w-60px">Other</th>
							        </tr>
							    </thead>
							    <tbody>
							    	<tr>
							    		<td>1</td>
							    		<td>24K - Gold</td>
							    		<td>1</td>
							    		<td>50</td>
							    		<td>200</td>
							    		<td>200</td>
							    		<td>248650.00</td>
							    	</tr>
							        <tr>
							    		<td>2</td>
							    		<td>24K - Gold</td>
							    		<td>1</td>
							    		<td>50</td>
							    		<td>200</td>
							    		<td>200</td>
							    		<td>248650.00</td>
							    	</tr>
							    	<tr>
							    		<td>3</td>
							    		<td>24K - Gold</td>
							    		<td>1</td>
							    		<td>50</td>
							    		<td>200</td>
							    		<td>200</td>
							    		<td>248650.00</td>
							    	</tr>
							    	<tr>
							    		<td>4</td>
							    		<td>24K - Gold</td>
							    		<td>1</td>
							    		<td>50</td>
							    		<td>200</td>
							    		<td>200</td>
							    		<td>248650.00</td>
							    	</tr>
							    	<tr>
							    		<td>5</td>
							    		<td>24K - Gold</td>
							    		<td>1</td>
							    		<td>50</td>
							    		<td>200</td>
							    		<td>200</td>
							    		<td>248650.00</td>
							    	</tr>
							    	<tr>
							    		<td>6</td>
							    		<td>24K - Gold</td>
							    		<td>1</td>
							    		<td>50</td>
							    		<td>200</td>
							    		<td>200</td>
							    		<td>248650.00</td>
							    	</tr>
							    	<tr>
							    		<td>7</td>
							    		<td>24K - Gold</td>
							    		<td>1</td>
							    		<td>50</td>
							    		<td>200</td>
							    		<td>200</td>
							    		<td>248650.00</td>
							    	</tr>
							    	<tr>
							    		<td>8</td>
							    		<td>24K - Gold</td>
							    		<td>1</td>
							    		<td>50</td>
							    		<td>200</td>
							    		<td>200</td>
							    		<td>248650.00</td>
							    	</tr>
							    	<tr>
							    		<td>9</td>
							    		<td>24K - Gold</td>
							    		<td>1</td>
							    		<td>50</td>
							    		<td>200</td>
							    		<td>200</td>
							    		<td>248650.00</td>
							    	</tr>
							    	<tr>
							    		<td>10</td>
							    		<td>24K - Gold</td>
							    		<td>1</td>
							    		<td>50</td>
							    		<td>200</td>
							    		<td>200</td>
							    		<td>248650.00</td>
							    	</tr>
							    	<tr>
							    		<td>11</td>
							    		<td>24K - Gold</td>
							    		<td>1</td>
							    		<td>50</td>
							    		<td>200</td>
							    		<td>200</td>
							    		<td>248650.00</td>
							    	</tr>
							    	<tr>
							    		<td>12</td>
							    		<td>24K - Gold</td>
							    		<td>1</td>
							    		<td>50</td>
							    		<td>200</td>
							    		<td>200</td>
							    		<td>248650.00</td>
							    	</tr>
							    </tbody>
							</table>
							<div style="padding: 10px 10px 10px 10px !important;box-shadow: 0 3px 6px #00002947;border-radius: 5px;background-color: #f5f5f1 !important;">
								<div class="row">
									<label class="col-lg-2 col-form-label fw-bold fs-6">Net Weight</label>
									<div class="col-lg-2 fv-row fv-plugins-icon-container">
										<input type="text" class="form-control form-control-lg form-control-solid" style="font-size: 17px !important;font-weight: 600 !important;" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" value="61.300" readonly>
										<div class="fv-plugins-message-container invalid-feedback"></div>
									</div>
									<label class="col-lg-2 col-form-label fw-bold fs-6">Total Amount</label>
									<div class="col-lg-2 fv-row fv-plugins-icon-container">
										<input type="text" class="form-control form-control-lg form-control-solid" style="font-size: 17px !important;font-weight: 600 !important;" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" value="1048652.00" readonly>
										<div class="fv-plugins-message-container invalid-feedback"></div>
									</div>
									<label class="col-lg-2 col-form-label fw-bold fs-6">Remarks</label>
									<div class="col-lg-2 fv-row fv-plugins-icon-container">
										<textarea class="form-control form-control-solid" rows="1" disabled>None</textarea>
									</div>					
								</div>
							</div><br>
							<div style="padding: 10px 10px 10px 10px !important;box-shadow: 0 3px 6px #00002947;border-radius: 5px;background-color:#f5f5f1 !important;">
								<div><label class="col-form-label fw-bold fs-6"><u>Payment Details</u></label></div>
								<div class="row">
									<div class="col-lg-6">
										<div class="row">
											<div id="kt_docs_repeater_basic_view">
												<div class="form-group">
													<div data-repeater-list="kt_docs_repeater_basic">
														<div data-repeater-item="">
															<div class="row">
																<label class="col-lg-2 col-form-label fw-bold fs-6">Method</label>
																<div class="col-lg-4">
																	<select class="form-select form-select-solid" data-control="select2" data-hide-search="true" disabled>
																		<option value="">Select</option>
																		<option value="card">Card</option>
																		<option value="bank" selected="selected">Bank</option>
																		<option value="cheque">Cheque</option>	
																		<option value="cash">Cash</option>
																		<option value="upi">UPI</option>
																	</select>
																</div>
																<!-- <label class="col-lg-1 col-form-label fw-semibold fs-6">Credit</label> -->
																<div class="col-lg-3">
																	<input type="text" class="form-control form-control-lg form-control-solid" value="SBI"  readonly/>
																</div>
																<div class="col-lg-3">
																	<a href="javascript:;" data-repeater-delete="" class="btn btn-sm btn-danger mt-md-2">
																	<i class="la la-trash-o fs-3"></i>Del</a>
																</div>
															</div>
														</div>
													</div>
												</div>
												<div class="col-lg-2 form-group">
													<a href="javascript:;" data-repeater-create="" class="btn btn-sm btn-outline btn-outline-solid btn-outline-warning btn-active-light-primary me-2">
													Add</a>
												</div>
											</div>
										</div>
									</div>
									<div class="col-lg-6">
										<div class="row">
											<label class="col-lg-2 col-form-label fw-bold fs-6">Date</label>
											<div class="col-lg-4 fv-row">
												<div class="d-flex align-items-center">
													<span class="svg-icon position-absolute ms-4 svg-icon-2 dt">
														<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
															<path opacity="0.3" d="M21 22H3C2.4 22 2 21.6 2 21V5C2 4.4 2.4 4 3 4H21C21.6 4 22 4.4 22 5V21C22 21.6 21.6 22 21 22Z" fill="currentColor" />
															<path d="M6 6C5.4 6 5 5.6 5 5V3C5 2.4 5.4 2 6 2C6.6 2 7 2.4 7 3V5C7 5.6 6.6 6 6 6ZM11 5V3C11 2.4 10.6 2 10 2C9.4 2 9 2.4 9 3V5C9 5.6 9.4 6 10 6C10.6 6 11 5.6 11 5ZM15 5V3C15 2.4 14.6 2 14 2C13.4 2 13 2.4 13 3V5C13 5.6 13.4 6 14 6C14.6 6 15 5.6 15 5ZM19 5V3C19 2.4 18.6 2 18 2C17.4 2 17 2.4 17 3V5C17 5.6 17.4 6 18 6C18.6 6 19 5.6 19 5Z" fill="currentColor" />
															<path d="M8.8 13.1C9.2 13.1 9.5 13 9.7 12.8C9.9 12.6 10.1 12.3 10.1 11.9C10.1 11.6 10 11.3 9.8 11.1C9.6 10.9 9.3 10.8 9 10.8C8.8 10.8 8.59999 10.8 8.39999 10.9C8.19999 11 8.1 11.1 8 11.2C7.9 11.3 7.8 11.4 7.7 11.6C7.6 11.8 7.5 11.9 7.5 12.1C7.5 12.2 7.4 12.2 7.3 12.3C7.2 12.4 7.09999 12.4 6.89999 12.4C6.69999 12.4 6.6 12.3 6.5 12.2C6.4 12.1 6.3 11.9 6.3 11.7C6.3 11.5 6.4 11.3 6.5 11.1C6.6 10.9 6.8 10.7 7 10.5C7.2 10.3 7.49999 10.1 7.89999 10C8.29999 9.90003 8.60001 9.80003 9.10001 9.80003C9.50001 9.80003 9.80001 9.90003 10.1 10C10.4 10.1 10.7 10.3 10.9 10.4C11.1 10.5 11.3 10.8 11.4 11.1C11.5 11.4 11.6 11.6 11.6 11.9C11.6 12.3 11.5 12.6 11.3 12.9C11.1 13.2 10.9 13.5 10.6 13.7C10.9 13.9 11.2 14.1 11.4 14.3C11.6 14.5 11.8 14.7 11.9 15C12 15.3 12.1 15.5 12.1 15.8C12.1 16.2 12 16.5 11.9 16.8C11.8 17.1 11.5 17.4 11.3 17.7C11.1 18 10.7 18.2 10.3 18.3C9.9 18.4 9.5 18.5 9 18.5C8.5 18.5 8.1 18.4 7.7 18.2C7.3 18 7 17.8 6.8 17.6C6.6 17.4 6.4 17.1 6.3 16.8C6.2 16.5 6.10001 16.3 6.10001 16.1C6.10001 15.9 6.2 15.7 6.3 15.6C6.4 15.5 6.6 15.4 6.8 15.4C6.9 15.4 7.00001 15.4 7.10001 15.5C7.20001 15.6 7.3 15.6 7.3 15.7C7.5 16.2 7.7 16.6 8 16.9C8.3 17.2 8.6 17.3 9 17.3C9.2 17.3 9.5 17.2 9.7 17.1C9.9 17 10.1 16.8 10.3 16.6C10.5 16.4 10.5 16.1 10.5 15.8C10.5 15.3 10.4 15 10.1 14.7C9.80001 14.4 9.50001 14.3 9.10001 14.3C9.00001 14.3 8.9 14.3 8.7 14.3C8.5 14.3 8.39999 14.3 8.39999 14.3C8.19999 14.3 7.99999 14.2 7.89999 14.1C7.79999 14 7.7 13.8 7.7 13.7C7.7 13.5 7.79999 13.4 7.89999 13.2C7.99999 13 8.2 13 8.5 13H8.8V13.1ZM15.3 17.5V12.2C14.3 13 13.6 13.3 13.3 13.3C13.1 13.3 13 13.2 12.9 13.1C12.8 13 12.7 12.8 12.7 12.6C12.7 12.4 12.8 12.3 12.9 12.2C13 12.1 13.2 12 13.6 11.8C14.1 11.6 14.5 11.3 14.7 11.1C14.9 10.9 15.2 10.6 15.5 10.3C15.8 10 15.9 9.80003 15.9 9.70003C15.9 9.60003 16.1 9.60004 16.3 9.60004C16.5 9.60004 16.7 9.70003 16.8 9.80003C16.9 9.90003 17 10.2 17 10.5V17.2C17 18 16.7 18.4 16.2 18.4C16 18.4 15.8 18.3 15.6 18.2C15.4 18.1 15.3 17.8 15.3 17.5Z" fill="currentColor" />
														</svg>
													</span>
													<input class="form-control form-control-solid ps-12" placeholder="Date" id="kt_datepicker_view_pure_gold_pay_date" value="<?php echo date("d m YYYY"); ?>" disabled/>
												</div>
											</div>
											<label class="col-lg-2 col-form-label fw-bold fs-6">Cash</label>
											<div class="col-lg-4 fv-row fv-plugins-icon-container">
												<input type="text" class="form-control form-control-lg form-control-solid" style="font-size: 17px !important;font-weight: 600 !important;" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" value="1048652.00" readonly>
												<div class="fv-plugins-message-container invalid-feedback"></div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!--end::Modal body-->
					</div>
					<!--end::Modal content-->
				</div>
				<!--end::Modal dialog-->
		</div>
		<!--end::Modal - view old to pure gold entry-->
		<!--begin::Modal - delete old to pure gold entry-->
		<div class="modal fade" id="kt_modal_delete_pure_gold_entry" tabindex="-1" aria-hidden="true">
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
		<!--end::Modal - delete old to pure gold entry-->
		<?php $this->load->view("script");?>
		<!-- <script src="js/purchaseregister-list.js"></script> -->
		<!-- <script>
			$(document).ready(function()
			{ 
				$('form').find("input[type=textarea], input[type=password], textarea").each(function(ev)
				{
				    if(!$(this).val()) { 
				    $(this).attr("placeholder", "Type your answer here");
					}
				});
			});
		</script> -->
		<!-- pure gold stock list day fillter start -->
		<script>
			function date_fill_pure_gold_stock_list()
			{
				var dt_fill_pure_gold_stock_list = document.getElementById('dt_fill_pure_gold_stock_list').value;
				var today_dt_pure_gold_stock_list = document.getElementById('today_dt_pure_gold_stock_list');
				var week_from_dt_pure_gold_stock_list = document.getElementById('week_from_dt_pure_gold_stock_list');
				var week_to_dt_pure_gold_stock_list = document.getElementById('week_to_dt_pure_gold_stock_list');
				var monthly_dt_pure_gold_stock_list = document.getElementById('monthly_dt_pure_gold_stock_list');
				var from_dt_pure_gold_stock_list = document.getElementById('from_dt_pure_gold_stock_list');
				var to_dt_pure_gold_stock_list = document.getElementById('to_dt_pure_gold_stock_list');
				var from_date_fillter_pure_gold_stock_list = document.getElementById('from_date_fillter_pure_gold_stock_list');
				var to_date_fillter_pure_gold_stock_list = document.getElementById('to_date_fillter_pure_gold_stock_list');

				if (dt_fill_pure_gold_stock_list == "today") 
				{
					today_dt_pure_gold_stock_list.style.display = "block";
					monthly_dt_pure_gold_stock_list.style.display = "none";
					from_dt_pure_gold_stock_list.style.display = "none";
					to_dt_pure_gold_stock_list.style.display = "none";
					week_from_dt_pure_gold_stock_list.style.display = "none";
					week_to_dt_pure_gold_stock_list.style.display = "none";
					$("#today_date_fillter_pure_gold_stock_list").flatpickr({
								dateFormat: "d-m-Y",
							});
				}
				else if (dt_fill_pure_gold_stock_list == "week")
				{
					today_dt_pure_gold_stock_list.style.display = "none";
					week_from_dt_pure_gold_stock_list.style.display = "block";
					week_to_dt_pure_gold_stock_list.style.display = "block";
					monthly_dt_pure_gold_stock_list.style.display = "none";
					from_dt_pure_gold_stock_list.style.display = "none";
					to_dt_pure_gold_stock_list.style.display = "none";

					var curr = new Date; // get current date
					var first = curr.getDate() - curr.getDay(); // First day is the day of the month - the day of the week
					var last = first + 6; // last day is the first day + 6

					var firstday = new Date(curr.setDate(first)).toISOString().slice(0,10);
					firstday = firstday.split("-").reverse().join("-");
					var lastday = new Date(curr.setDate(last)).toISOString().slice(0,10);
					lastday = lastday.split("-").reverse().join("-");
					$('#week_from_date_fillter_pure_gold_stock_list').val(firstday);
					$('#week_to_date_fillter_pure_gold_stock_list').val(lastday);
					
				}
				else if (dt_fill_pure_gold_stock_list == "monthly")
				{
					today_dt_pure_gold_stock_list.style.display = "none";
					monthly_dt_pure_gold_stock_list.style.display = "block";
					from_dt_pure_gold_stock_list.style.display = "none";
					to_dt_pure_gold_stock_list.style.display = "none";
					week_from_dt_pure_gold_stock_list.style.display = "none";
					week_to_dt_pure_gold_stock_list.style.display = "none";
					$("#monthly_date_fillter_pure_gold_stock_list").flatpickr({
								dateFormat: "m-Y",
							});
				}
				else if (dt_fill_pure_gold_stock_list == "custom Date")
				{
					today_dt_pure_gold_stock_list.style.display = "none";
					monthly_dt_pure_gold_stock_list.style.display = "none";
					from_dt_pure_gold_stock_list.style.display = "block";
					to_dt_pure_gold_stock_list.style.display = "block";
					week_from_dt_pure_gold_stock_list.style.display = "none";
					week_to_dt_pure_gold_stock_list.style.display = "none";

					$("#from_date_fillter_pure_gold_stock_list").flatpickr({
								dateFormat: "d-m-Y",
							});
					$("#to_date_fillter_pure_gold_stock_list").flatpickr({
								dateFormat: "d-m-Y",
							});
				}
				else
				{
					today_dt_pure_gold_stock_list.style.display = "none";
					monthly_dt_pure_gold_stock_list.style.display = "none";
					from_dt_pure_gold_stock_list.style.display = "none";
					to_dt_pure_gold_stock_list.style.display = "none";
					week_from_dt_pure_gold_stock_list.style.display = "none";
					week_to_dt_pure_gold_stock_list.style.display = "none";
				}
			}
		</script>
		<!-- pure gold stock list day fillter end -->
		<script>
			$('#kt_docs_repeater_basic_add').repeater({
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

			$('#kt_docs_repeater_basic_edit').repeater({
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
			$('#kt_docs_repeater_basic_view').repeater({
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
	      $("#kt_modal_add_old_pure_gold_entry_table").kendoTooltip({
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
	      $("#kt_modal_edit_old_pure_gold_entry_table").kendoTooltip({
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
	      $("#kt_modal_view_old_pure_gold_entry_table").kendoTooltip({
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
			$("#kt_datatable_responsive").DataTable({
				// "ordering": false,
				"aaSorting":[],
				// "responsive": true,
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
			$("#kt_modal_add_old_pure_gold_entry_table").DataTable({
				// "ordering": false,
				"aaSorting":[],
				"responsive": true,
				 "language": {
				  "lengthMenu": "Show _MENU_",
				 },
				 "dom":
				  "<'row'" +
				  ">" +

				  "<'table-responsive'tr>" +

				  "<'row'" +
				  "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
				  "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
				  ">"
				});
			$("#kt_modal_add_pure_gold_entry_table").DataTable({
				// "ordering": false,
				"aaSorting":[],
				"responsive": true,
				 "language": {
				  "lengthMenu": "Show _MENU_",
				 },
				 "dom":
				  "<'row'" +
				  ">" +

				  "<'table-responsive'tr>" +

				  "<'row'" +
				  "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
				  "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
				  ">"
				});
		</script>
		<script>
			$("#kt_modal_edit_pure_gold_entry_table").DataTable({
				// "ordering": false,
				"aaSorting":[],
				"responsive": true,
				 "language": {
				  "lengthMenu": "Show _MENU_",
				 },
				 "dom":
				  "<'row'" +
				  ">" +

				  "<'table-responsive'tr>" +

				  "<'row'" +
				  "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
				  "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
				  ">"
				});
			$("#kt_modal_edit_old_pure_gold_entry_table").DataTable({
				// "ordering": false,
				"aaSorting":[],
				"responsive": true,
				 "language": {
				  "lengthMenu": "Show _MENU_",
				 },
				 "dom":
				  "<'row'" +
				  ">" +

				  "<'table-responsive'tr>" +

				  "<'row'" +
				  "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
				  "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
				  ">"
				});
		</script>
		<script>
			$("#kt_modal_view_pure_gold_entry_table").DataTable({
				// "ordering": false,
				"aaSorting":[],
				"responsive": true,
				 "language": {
				  "lengthMenu": "Show _MENU_",
				 },
				 "dom":
				  "<'row'" +
				  ">" +

				  "<'table-responsive'tr>" +

				  "<'row'" +
				  "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
				  "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
				  ">"
				});
			$("#kt_modal_view_old_pure_gold_entry_table").DataTable({
				// "ordering": false,
				"aaSorting":[],
				"responsive": true,
				 "language": {
				  "lengthMenu": "Show _MENU_",
				 },
				 "dom":
				  "<'row'" +
				  ">" +

				  "<'table-responsive'tr>" +

				  "<'row'" +
				  "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
				  "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
				  ">"
				});
		</script>
		<script>
			$("#kt_datepicker_from").flatpickr({
				dateFormat: "d-m-Y",
			});
			$("#kt_datepicker_to").flatpickr({
				dateFormat: "d-m-Y",
			});
			$("#kt_datepicker_add_pure_gold_inv_date").flatpickr({
				dateFormat: "d-m-Y",
			});
			$("#kt_datepicker_add_pure_gold_date").flatpickr({
				dateFormat: "d-m-Y",
			});
			$("#kt_datepicker_add_pure_gold_pay_date").flatpickr({
				dateFormat: "d-m-Y",
			});
			$("#kt_datepicker_edit_pure_gold_inv_date").flatpickr({
				dateFormat: "d-m-Y",
			});
			$("#kt_datepicker_edit_pure_gold_date").flatpickr({
				dateFormat: "d-m-Y",
			});
			$("#kt_datepicker_edit_pure_gold_pay_date").flatpickr({
				dateFormat: "d-m-Y",
			});
			$("#kt_datepicker_view_pure_gold_inv_date").flatpickr({
				dateFormat: "d-m-Y",
			});
			$("#kt_datepicker_view_pure_gold_date").flatpickr({
				dateFormat: "d-m-Y",
			});
			$("#kt_datepicker_view_pure_gold_pay_date").flatpickr({
				dateFormat: "d-m-Y",
			});
		</script>
	</body>
	<!--end::Body-->
</html>