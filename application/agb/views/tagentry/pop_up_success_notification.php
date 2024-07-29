	
	
	
	
<?php $this->load->view("common");?>

<style>
	.dataTables_scroll
    {
        position: relative;
        overflow: auto;
        max-height: 200px;/*the maximum height you want to achieve*/
        width: 100%;
    }
  .dataTables_scroll thead{
    position: -webkit-sticky;
    position: sticky;
    top: 0;
   background-color: #ec9629;
    z-index: 2;
  }
</style>
	<!--begin::Body-->
	<body data-kt-name="metronic" id="kt_body" class="header-fixed header-tablet-and-mobile-fixed toolbar-enabled toolbar-fixed aside-enabled aside-fixed">
		<!--begin::Theme mode setup on page load-->
		<script>if ( document.documentElement ) { const defaultThemeMode = "system"; const name = document.body.getAttribute("data-kt-name"); let themeMode = localStorage.getItem("kt_" + ( name !== null ? name + "_": "" ) + "theme_mode_value"); if ( themeMode === null ) { if ( defaultThemeMode === "system" ) { themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light"; } else { themeMode = defaultThemeMode; } } document.documentElement.setAttribute("data-theme", themeMode); }</script>
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
											<div class="loader">
											</div>
												<div class="mb-5 hover-scroll-x">
													<div class="d-grid">
														<ul class="nav nav-tabs flex-nowrap text-nowrap">
															<li class="nav-item">
																<a class="nav-link active btn btn-active-light btn-color-black-800 btn-active-color-primary rounded-bottom-0 fw-bold fs-6" data-bs-toggle="tab" href="#kt_tab_pane_1">Tagged</a>
															</li>
															<li class="nav-item">
																<a class="nav-link btn btn-active-light btn-color-black-800 btn-active-color-primary rounded-bottom-0 fw-bold fs-6" data-bs-toggle="tab" href="#kt_tab_pane_2">Waiting  Approval</a>
															</li>
														</ul>
													</div>
												</div>
												<div class="tab-content" id="myTabContent">
													<div class="tab-pane fade show active" id="kt_tab_pane_1" role="tabpanel">
														<div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
															<!--begin::Filter-->
															<button type="button" class="btn btn-sm btn-outline btn-outline-solid btn-outline-warning btn-active-light-primary me-3" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
																Filter</button>
															<div class="menu menu-sub menu-sub-dropdown w-300px w-md-325px" data-kt-menu="true">
																<div class="px-7 py-5" data-kt-user-table-filter="form">
																	<div class="mb-2">
																		<label class="form-label fs-6 fw-semibold">Company</label>
																		<select class="form-select form-select-solid fw-semibold" data-control="select2" data-close-on-select="true" data-allow-clear="true" multiple="multiple">	
																			<option value="all" selected>All</option>
																			<option value="1">AGB Main Branch Sayalkudi</option>
																			<option value="2">AGB Pernali Branch</option>
																		</select>
																	</div>
																	<div class="mb-2">
																		<label class="form-label fs-6 fw-semibold">Item Type</label>
																		<select class="form-select form-select-solid fw-semibold" data-control="select2" data-close-on-select="true" data-allow-clear="true" multiple="multiple">	
																			<option value="all" selected>All</option>
																			<option value="1">Gold</option>
																			<option value="2">Silver</option>
																		</select>
																	</div>
																	<div class="mb-2">
																		<label class="form-label fs-6 fw-semibold">Item</label>
																		<div class="fv-row fv-plugins-icon-container">
																			<input type="text" name="" id="" class="form-control form-control-lg1 form-control-solid" placeholder="">
																			<div class="fv-plugins-message-container invalid-feedback"></div>
																		</div>
																	</div>
																	<div class="mb-2">
																		<label class="form-label">Date</label>
																		<select class="form-select form-select-solid" data-control="select2" data-hide-search="true" id="dt_fill_tagged_approved" onchange="date_fill_tagged_approved();">	
																			<option value="all">All</option>
																			<option value="today">Today</option>
																			<option value="week">This Week</option>
																			<option value="monthly">This Month</option>
																			<option value="custom Date">Custom Date</option>
																		</select>
																	</div>
																	<div class="mb-2 fv-row" id="today_dt_tagged_approved" style="display:none;">
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
																			<input class="form-control form-control-solid ps-12" name="" placeholder="Date" id="today_date_fillter_tagged_approved" value="<?php echo date("d-m-Y"); ?>" disabled />
																		</div>
																	</div>
																	<div class="mb-2 fv-row" id="week_from_dt_tagged_approved" style="display:none;">
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
																			<input class="form-control form-control-solid ps-12" name="" placeholder="Date" id="week_from_date_fillter_tagged_approved" value="" disabled />
																		</div>
																	</div>
																	<div class="mb-2 fv-row" id="week_to_dt_tagged_approved" style="display:none;">
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
																			<input class="form-control form-control-solid ps-12" name="" placeholder="Date" id="week_to_date_fillter_tagged_approved" value="<?php echo date("d-m-Y"); ?>" disabled />
																		</div>
																	</div>
																	<div class="mb-2 fv-row" id="monthly_dt_tagged_approved" style="display:none;">
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
																			<input class="form-control form-control-solid ps-12" name="" placeholder="Month" id="monthly_date_fillter_tagged_approved" value="<?php echo date("m-Y"); ?>" />
																		</div>
																	</div>
																	<div class="mb-2 fv-row" id="from_dt_tagged_approved" style="display:none;">
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
																			<input class="form-control form-control-solid ps-12" name="" placeholder="From Date" id="from_date_fillter_tagged_approved" value="<?php echo date("d-m-Y"); ?>" />
																		</div>
																	</div>
																	<div class="mb-2 fv-row" id="to_dt_tagged_approved" style="display:none;">
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
																			<input class="form-control form-control-solid ps-12" name="" placeholder="To Date" id="to_date_fillter_tagged_approved" value="<?php echo date("d-m-Y"); ?>"/>
																		</div>
																	</div>
																	<div class="d-flex justify-content-end">
																		<button type="reset" class="btn btn-light btn-active-light-primary fw-semibold me-2 px-6" data-kt-menu-dismiss="true" data-kt-user-table-filter="reset">Reset</button>
																		<button type="submit" class="btn btn-primary fw-semibold px-6" data-kt-menu-dismiss="true" data-kt-user-table-filter="filter">Apply</button>
																	</div>
																</div>
															</div>
															<button type="button" class="btn btn-sm btn-outline btn-outline-solid btn-outline-warning btn-active-light-primary me-3" data-bs-toggle="modal" data-bs-target="#">
																Export</button>
														</div>
														<div class="row">
															<table id="kt_datatable_responsive_approved" class="table align-middle table-row-dashed table-striped table-hover fs-7 gy-1 gs-2 dataTable">
																	<thead>
																	   <tr class="text-start text-muted fw-bold fs-7 gs-0">
																	   	<th class="min-w-50px">Date</th>
																	   	<th class="min-w-50px">Company</th>
																	    <th class="min-w-50px">Tag No</th>
																			<th class="min-w-50px">Img</th>
																			<th class="min-w-50px">Item Name</th>
																			<th class="min-w-50px">Subitem Name</th>
																			<th class="min-w-80px">Wgt(gms)</th>
																			<th class="min-w-50px">Stone(gms)</th>
																			<th class="min-w-50px">Net Wgt(gms)</th>
																			<th class="min-w-100px">Action</th>
																	   </tr>
																	</thead>
																	<tbody class="text-gray-600 fw-semibold">
																		<tr>
																            <td>10-02-2022</td>
																            <td class="ple1">AGB - Main Branch Sayalkudi</td>
																            <td>LT-0001-TG-0001</td><td>
																            	<a href="javascript:;" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm" data-bs-toggle="modal" data-bs-target="#kt_modal_view_jewel_img">
																	            	<div class="image-input" data-kt-image-input="true">
																									<div class="image-input-wrapper w-40px h-40px" style="background-image: url(assets/images/sample_jewel.jpg)"></div>
																								</div>
																							</a>
																            </td>
																            <td>Chain</td>
																            <td>Hand Chain</td>
																            <td>3.200</td>
																            <td>0.200</td>
																            <td>3.400</td>
																            <td>
																						<span class="text-end">
																						<!-- <a href="#" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm" data-bs-toggle="modal" data-bs-target="#">
																							<i class="bi bi-eye-fill eyc"></i>
																						</a> -->
																						<a href="#" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm" data-bs-toggle="modal" data-bs-target="#kt_modal_convert_to_non_tag_item" title="Convert to Non Tag">
																							<i class="fas fa-undo-alt eyc"></i>
																						</a>
																						<a href="javascript:;" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1" data-bs-toggle="modal" data-bs-target="#kt_modal_view_tag_item" title="Edit">
																							<span class="svg-icon svg-icon-3">
																								<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																									<path opacity="0.3" d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z" fill="currentColor"></path>
																									<path d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z" fill="currentColor"></path>
																								</svg>
																							</span>
																							
																						</a>
																						<a href="tagged_audit_history.php" target="_blank" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm">
																							<i class="fas fa-book-reader eyc" title="Audit History"></i>
																						</a>
																					</span>
																					</td>
																        </tr>
																		<tr>
																            <td>02-01-2023</td>
																            <td class="ple1">AGB - Main Branch Sayalkudi</td>
																            <td>LT-0002-TG-0002</td>
																            <td>
																            	<a href="javascript:;" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm" data-bs-toggle="modal" data-bs-target="#kt_modal_view_jewel_img">
																	            	<div class="image-input" data-kt-image-input="true">
																									<div class="image-input-wrapper w-40px h-40px" style="background-image: url(assets/images/sample_jewel.jpg)"></div>
																								</div>
																							</a>
																            </td>
																            <td>Chain</td>
																            <td>Hand Chain</td>
																            <td>4.200</td>
																            <td>0.200</td>
																            <td>4.400</td>
																            <td>
																							<span class="text-end">
																							<!-- <a href="#" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm" data-bs-toggle="modal" data-bs-target="#">
																								<i class="bi bi-eye-fill eyc"></i>
																							</a> -->
																							<a href="#" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm" data-bs-toggle="modal" data-bs-target="#kt_modal_convert_to_non_tag_item" title="Convert to Non Tag">
																								<i class="fas fa-undo-alt eyc"></i>
																							</a>
																							<a href="javascript:;" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1" data-bs-toggle="modal" data-bs-target="#kt_modal_view_tag_item" title="Edit">
																								
																								<span class="svg-icon svg-icon-3">
																									<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																										<path opacity="0.3" d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z" fill="currentColor"></path>
																										<path d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z" fill="currentColor"></path>
																									</svg>
																								</span>
																								
																							</a>
																							<a href="tagged_audit_history.php" target="_blank" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm">
																							<i class="fas fa-book-reader eyc" title="Audit History"></i>
																						</a>
																						</span>
																						</td>
																        </tr>
																        <tr>
																            <td>14-05-2022</td>
																            <td class="ple1">AGB - Main Branch Sayalkudi</td>
																            <td>LT-0001-TG-0002</td>
																            <td>
																            	<a href="javascript:;" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm" data-bs-toggle="modal" data-bs-target="#kt_modal_view_jewel_img">
																	            	<div class="image-input" data-kt-image-input="true">
																									<div class="image-input-wrapper w-40px h-40px" style="background-image: url(assets/images/sample_jewel.jpg)"></div>
																								</div>
																							</a>
																            </td>
																            <td>Valayal</td>
																            <td>Stone Valayal</td>
																            <td>4.300</td>
																            <td>0.200</td>
																            <td>4.500</td>
																            <td>
																							<span class="text-end">
																							<!-- <a href="#" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm" data-bs-toggle="modal" data-bs-target="#">
																								<i class="bi bi-eye-fill eyc"></i>
																							</a> -->
																							<a href="#" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm" data-bs-toggle="modal" data-bs-target="#kt_modal_convert_to_non_tag_item" title="Convert to Non Tag">
																								<i class="fas fa-undo-alt eyc"></i>
																							</a>
																							<a href="javascript:;" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1" data-bs-toggle="modal" data-bs-target="#kt_modal_view_tag_item" title="Edit">
																								
																								<span class="svg-icon svg-icon-3">
																									<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																										<path opacity="0.3" d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z" fill="currentColor"></path>
																										<path d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z" fill="currentColor"></path>
																									</svg>
																								</span>
																								
																							</a>
																							<a href="tagged_audit_history.php" target="_blank" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm">
																							<i class="fas fa-book-reader eyc" title="Audit History"></i>
																						</a>
																						</span>
																						</td>
																        </tr>
																        <tr>
																            <td>13-05-2022</td>
																            <td class="ple1">AGB - Main Branch Sayalkudi</td>
																            <td>LT-0002-TG-0003</td>
																            <td>
																            	<a href="javascript:;" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm" data-bs-toggle="modal" data-bs-target="#kt_modal_view_jewel_img">
																	            	<div class="image-input" data-kt-image-input="true">
																									<div class="image-input-wrapper w-40px h-40px" style="background-image: url(assets/images/sample_jewel.jpg)"></div>
																								</div>
																							</a>
																            </td>
																            <td>Chain</td>
																            <td>Hand Chain</td>
																            <td>3.500</td>
																            <td>0.300</td>
																            <td>3.800</td>
																            <td>
																							<span class="text-end">
																							<!-- <a href="#" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm" data-bs-toggle="modal" data-bs-target="#">
																								<i class="bi bi-eye-fill eyc"></i>
																							</a> -->
																							<a href="#" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm" data-bs-toggle="modal" data-bs-target="#kt_modal_convert_to_non_tag_item" title="Convert to Non Tag">
																								<i class="fas fa-undo-alt eyc"></i>
																							</a>
																							<a href="javascript:;" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1" data-bs-toggle="modal" data-bs-target="#kt_modal_view_tag_item" title="Edit">
																								
																								<span class="svg-icon svg-icon-3">
																									<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																										<path opacity="0.3" d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z" fill="currentColor"></path>
																										<path d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z" fill="currentColor"></path>
																									</svg>
																								</span>
																								
																							</a>
																							<a href="tagged_audit_history.php" target="_blank" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm">
																							<i class="fas fa-book-reader eyc" title="Audit History"></i>
																						</a>
																						</span>
																						</td>
																        </tr>
																        <tr>
																            <td>16-04-2022</td>
																            <td class="ple1">AGB - Main Branch Sayalkudi</td>
																            <td>LT-0001-TG-0004</td>
																            <td>
																            	<a href="javascript:;" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm" data-bs-toggle="modal" data-bs-target="#kt_modal_view_jewel_img">
																	            	<div class="image-input" data-kt-image-input="true">
																									<div class="image-input-wrapper w-40px h-40px" style="background-image: url(assets/images/sample_jewel.jpg)"></div>
																								</div>
																							</a>
																            </td>
																            <td>Chain</td>
																            <td>Hand Chain</td>
																            <td>4.400</td>
																            <td>0.200</td>
																            <td>4.600</td>
																            <td>
																							<span class="text-end">
																							<!-- <a href="#" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm" data-bs-toggle="modal" data-bs-target="#">
																								<i class="bi bi-eye-fill eyc"></i>
																							</a> -->
																							<a href="#" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm" data-bs-toggle="modal" data-bs-target="#kt_modal_convert_to_non_tag_item" title="Convert to Non Tag">
																								<i class="fas fa-undo-alt eyc"></i>
																							</a>
																							<a href="javascript:;" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1" data-bs-toggle="modal" data-bs-target="#kt_modal_view_tag_item" title="Edit">
																								
																								<span class="svg-icon svg-icon-3">
																									<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																										<path opacity="0.3" d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z" fill="currentColor"></path>
																										<path d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z" fill="currentColor"></path>
																									</svg>
																								</span>
																								
																							</a>
																							<a href="tagged_audit_history.php" target="_blank" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm">
																							<i class="fas fa-book-reader eyc" title="Audit History"></i>
																						</a>
																						</span>
																						</td>
																        </tr>
																	</tbody>
															</table>
														</div>
													</div>
													<div class="tab-pane fade" id="kt_tab_pane_2" role="tabpanel">
														<div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
															<!--begin::Filter-->
															<button type="button" class="btn btn-sm btn-outline btn-outline-solid btn-outline-warning btn-active-light-primary me-3" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
																Filter</button>
															<div class="menu menu-sub menu-sub-dropdown w-300px w-md-325px" data-kt-menu="true">
																<div class="px-7 py-5" data-kt-user-table-filter="form">
																	<div class="mb-2">
																		<label class="form-label fs-6 fw-semibold">Company</label>
																		<select class="form-select form-select-solid fw-semibold" data-control="select2" data-close-on-select="true" data-allow-clear="true" multiple="multiple">	
																			<option value="all" selected>All</option>
																			<option value="1">AGB Main Branch Sayalkudi</option>
																			<option value="2">AGB Pernali Branch</option>
																		</select>
																	</div>
																	<div class="mb-2">
																		<label class="form-label fs-6 fw-semibold">Status</label>
																		<select class="form-select form-select-solid fw-semibold" data-control="select2" data-close-on-select="true" data-allow-clear="true" multiple="multiple">	
																			<option value="all" selected>All</option>
																			<option value="1">Awaiting Approval</option>
																			<option value="2">Update Required</option>
																		</select>
																	</div>
																	<div class="mb-2">
																		<label class="form-label fs-6 fw-semibold">Item Type</label>
																		<select class="form-select form-select-solid fw-semibold" data-control="select2" data-close-on-select="true" data-allow-clear="true" multiple="multiple">	
																			<option value="all" selected>All</option>
																			<option value="1">Gold</option>
																			<option value="2">Silver</option>
																		</select>
																	</div>
																	<div class="mb-2">
																		<label class="form-label fs-6 fw-semibold">Item</label>
																		<div class="fv-row fv-plugins-icon-container">
																			<input type="text" name="" id="" class="form-control form-control-lg1 form-control-solid" placeholder="">
																			<div class="fv-plugins-message-container invalid-feedback"></div>
																		</div>
																	</div>
																	<div class="mb-2">
																		<label class="form-label">Date</label>
																		<select class="form-select form-select-solid" data-control="select2" data-hide-search="true" id="dt_fill_tagged_waiting_approved" onchange="date_fill_tagged_waiting_approved();">	
																			<option value="all">All</option>
																			<option value="today">Today</option>
																			<option value="week">This Week</option>
																			<option value="monthly">This Month</option>
																			<option value="custom Date">Custom Date</option>
																		</select>
																	</div>
																	<div class="mb-2 fv-row" id="today_dt_tagged_waiting_approved" style="display:none;">
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
																			<input class="form-control form-control-solid ps-12" name="" placeholder="Date" id="today_date_fillter_tagged_waiting_approved" value="<?php echo date("d-m-Y"); ?>" disabled />
																		</div>
																	</div>
																	<div class="mb-2 fv-row" id="week_from_dt_tagged_waiting_approved" style="display:none;">
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
																			<input class="form-control form-control-solid ps-12" name="" placeholder="Date" id="week_from_date_fillter_tagged_waiting_approved" value="" disabled />
																		</div>
																	</div>
																	<div class="mb-2 fv-row" id="week_to_dt_tagged_waiting_approved" style="display:none;">
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
																			<input class="form-control form-control-solid ps-12" name="" placeholder="Date" id="week_to_date_fillter_tagged_waiting_approved" value="<?php echo date("d-m-Y"); ?>" disabled />
																		</div>
																	</div>
																	<div class="mb-2 fv-row" id="monthly_dt_tagged_waiting_approved" style="display:none;">
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
																			<input class="form-control form-control-solid ps-12" name="" placeholder="Month" id="monthly_date_fillter_tagged_waiting_approved" value="<?php echo date("m-Y"); ?>" />
																		</div>
																	</div>
																	<div class="mb-2 fv-row" id="from_dt_tagged_waiting_approved" style="display:none;">
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
																			<input class="form-control form-control-solid ps-12" name="" placeholder="From Date" id="from_date_fillter_tagged_waiting_approved" value="<?php echo date("d-m-Y"); ?>" />
																		</div>
																	</div>
																	<div class="mb-2 fv-row" id="to_dt_tagged_waiting_approved" style="display:none;">
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
																			<input class="form-control form-control-solid ps-12" name="" placeholder="To Date" id="to_date_fillter_tagged_waiting_approved" value="<?php echo date("d-m-Y"); ?>"/>
																		</div>
																	</div>
																	<div class="d-flex justify-content-end">
																		<button type="reset" class="btn btn-light btn-active-light-primary fw-semibold me-2 px-6" data-kt-menu-dismiss="true" data-kt-user-table-filter="reset">Reset</button>
																		<button type="submit" class="btn btn-primary fw-semibold px-6" data-kt-menu-dismiss="true" data-kt-user-table-filter="filter">Apply</button>
																	</div>
																</div>
															</div>
															<button type="button" class="btn btn-sm btn-outline btn-outline-solid btn-outline-warning btn-active-light-primary me-3" data-bs-toggle="modal" data-bs-target="#">
																Export</button>
														</div>
														<div class="row">
															<table id="kt_datatable_responsive_not_approved" class="table align-middle table-row-dashed table-striped table-hover fs-7 gy-1 gs-2 dataTable">
																	<thead>
																	   <tr class="text-start text-muted fw-bold fs-7 gs-0">
																	   	<th class="min-w-100px">Date</th>
																	   	<th class="min-w-100px">Company</th>
																	    <th class="min-w-100px">Tag No</th>
																			<th class="min-w-50px">Img</th>
																			<th class="min-w-80px">Item Name</th>
																			<th class="min-w-100px">Subitem Name</th>
																			<th class="min-w-50px">Wgt(gms)</th>
																			<th class="min-w-50px">Stone(gms)</th>
																			<th class="min-w-100px">Net Wgt(gms)</th>
																			<th class="min-w-175px">Status</th>
																			<th class="min-w-100px">Action</th>
																	   </tr>
																	</thead>
																	<tbody class="text-gray-600 fw-semibold">
																		<tr>
													            <td>12-02-2022</td>
													            <td class="ple1">AGB - Main Branch Sayalkudi</td>
													            <td class="ple1">LT-0001-TG-0001</td>
													            <td>
													            	<a href="javascript:;" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm" data-bs-toggle="modal" data-bs-target="#kt_modal_view_jewel_img">
														            	<div class="image-input" data-kt-image-input="true">
																						<div class="image-input-wrapper w-40px h-40px" style="background-image: url(assets/images/sample_jewel.jpg)"></div>
																					</div>
																				</a>
													            </td>
													            <td class="ple1">Chain</td>
													            <td class="ple1">Hand Chain</td>
													            <td>3.200</td>
													            <td>0.200</td>
													            <td>3.400</td>
													            <td>
																				<label class="col-form-label fw-semibold fs-7" name="" id=""><span style="background-color:#ffc700;border-radius: 8px;padding: 5px 15px 5px 15px;">Awaiting Approval</span>
																				</label>
																			</td>
													            <td>
																				<span class="text-end">
																					<button class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
																						<i class="fas fa-ellipsis-v eyc"></i>
																					</button>
																					<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px py-3" data-kt-menu="true" style="">
																						<div class="menu-item px-3">
																							<a href="#" class="menu-link px-3" data-bs-toggle="modal" data-bs-target="#kt_modal_update_tag_entry">Update</a>
																						</div>
																						<div class="menu-item px-3">
																							<a href="#" class="menu-link flex-stack px-3" data-bs-toggle="modal" data-bs-target="#kt_modal_verify_tag_entry">Approve</a>
																						</div>
																					</div>
																					<a href="javascript:;" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1" data-bs-toggle="modal" data-bs-target="#kt_modal_edit_tag_item">
																						<span class="svg-icon svg-icon-3">
																							<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																								<path opacity="0.3" d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z" fill="currentColor"></path>
																								<path d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z" fill="currentColor"></path>
																							</svg>
																						</span>
																						
																					</a>
																				</span>
																			</td>
													        	</tr>
																		<tr>
																            <td>10-02-2022</td>
																            <td class="ple1">AGB - Main Branch Sayalkudi</td>
																            <td class="ple1">LT-0002-TG-0002</td>
																            <td>
																            	<a href="javascript:;" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm" data-bs-toggle="modal" data-bs-target="#kt_modal_view_jewel_img">
																	            	<div class="image-input" data-kt-image-input="true">
																									<div class="image-input-wrapper w-40px h-40px" style="background-image: url(assets/images/sample_jewel.jpg)"></div>
																								</div>
																							</a>
																			       </td>
																            <td class="ple1">Chain</td>
																            <td class="ple1">Hand Chain</td>
																            <td>4.200</td>
																            <td>0.200</td>
																            <td>4.400</td>
																            <td>
																							<label class="col-form-label fw-semibold fs-7" name="" id=""><span style="background-color:#ffc700;border-radius: 8px;padding: 5px 15px 5px 15px;">Awaiting Approval</span>
																							</label>
																						</td>
																            <td>
																				<span class="text-end">
																					<button class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
																						<i class="fas fa-ellipsis-v eyc"></i>
																					</button>
																					<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px py-3" data-kt-menu="true" style="">
																						<div class="menu-item px-3">
																							<a href="#" class="menu-link px-3" data-bs-toggle="modal" data-bs-target="#kt_modal_update_tag_entry">Update</a>
																						</div>
																						<div class="menu-item px-3">
																							<a href="#" id="pop_up_success" class="menu-link flex-stack px-3" data-bs-toggle="modal" data-bs-target="#kt_modal_verify_tag_entry">Approve</a>
																						</div>
																					</div>
																				<!-- <a href="#" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm" data-bs-toggle="modal" data-bs-target="#kt_modal_view_tag_item">
																					<i class="bi bi-eye-fill eyc"></i>
																				</a> -->
																				<a href="javascript:;" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1" data-bs-toggle="modal" data-bs-target="#kt_modal_edit_tag_item">
																					
																					<span class="svg-icon svg-icon-3">
																						<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																							<path opacity="0.3" d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z" fill="currentColor"></path>
																							<path d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z" fill="currentColor"></path>
																						</svg>
																					</span>
																					
																				</a>
																			</span>
																			</td>
																        </tr>
																        <tr>
																            <td>12-01-2023</td>
																            <td class="ple1">AGB - Main Branch Sayalkudi</td>
																            <td class="ple1">LT-0001-TG-0002</td>
																            <td>
																            	<a href="javascript:;" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm" data-bs-toggle="modal" data-bs-target="#kt_modal_view_jewel_img">
																	            	<div class="image-input" data-kt-image-input="true">
																									<div class="image-input-wrapper w-40px h-40px" style="background-image: url(assets/images/sample_jewel.jpg)"></div>
																								</div>
																							</a>
																            </td>
																            <td class="ple1">Valayal</td>
																            <td class="ple1">Stone Valayal</td>
																            <td>4.300</td>
																            <td>0.200</td>
																            <td>4.500</td>
																            <td>
																							<label class="col-form-label fw-semibold fs-7"><span style="background-color:#46dcf9;border-radius: 8px;padding: 5px 15px 5px 15px;">Update Required</span>
																							</label>
																						</td>
																            <td>
																				<span class="text-end">
																					<button class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
																								<i class="fas fa-ellipsis-v eyc"></i>
																							</button>
																							<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px py-3" data-kt-menu="true" style="">
																								<div class="menu-item px-3">
																									<a href="#" class="menu-link px-3" data-bs-toggle="modal" data-bs-target="#kt_modal_update_tag_entry">Update</a>
																								</div>
																								<div class="menu-item px-3">
																									<a href="#" class="menu-link flex-stack px-3" data-bs-toggle="modal" data-bs-target="#kt_modal_verify_tag_entry">Approve</a>
																								</div>
																							</div>
																				<!-- <a href="#" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm" data-bs-toggle="modal" data-bs-target="#kt_modal_view_tag_item">
																					<i class="bi bi-eye-fill eyc"></i>
																				</a> -->
																				<a href="javascript:;" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1" data-bs-toggle="modal" data-bs-target="#kt_modal_edit_tag_item">
																					
																					<span class="svg-icon svg-icon-3">
																						<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																							<path opacity="0.3" d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z" fill="currentColor"></path>
																							<path d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z" fill="currentColor"></path>
																						</svg>
																					</span>
																					
																				</a>
																			</span>
																			</td>
																        </tr>
																        <tr>
																            <td>25-06-2022</td>
																            <td class="ple1">AGB - Main Branch Sayalkudi</td>
																            <td class="ple1">LT-0002-TG-0003</td>
																            <td>
																            	<a href="javascript:;" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm" data-bs-toggle="modal" data-bs-target="#kt_modal_view_jewel_img">
																	            	<div class="image-input" data-kt-image-input="true">
																									<div class="image-input-wrapper w-40px h-40px" style="background-image: url(assets/images/sample_jewel.jpg)"></div>
																								</div>
																							</a>
																            </td>
																            <td class="ple1">Chain</td>
																            <td class="ple1">Hand Chain</td>
																            <td>3.500</td>
																            <td>0.300</td>
																            <td>3.800</td>
																            <td>
																							<label class="col-form-label fw-semibold fs-7"><span style="background-color:#46dcf9;border-radius: 8px;padding: 5px 15px 5px 15px;">Update Required</span>
																							</label>
																						</td>
																            <td>
																				<span class="text-end">
																					<button class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
																								<i class="fas fa-ellipsis-v eyc"></i>
																							</button>
																							<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px py-3" data-kt-menu="true" style="">
																								<div class="menu-item px-3">
																									<a href="#" class="menu-link px-3" data-bs-toggle="modal" data-bs-target="#kt_modal_update_tag_entry">Update</a>
																								</div>
																								<div class="menu-item px-3">
																									<a href="#" class="menu-link flex-stack px-3" data-bs-toggle="modal" data-bs-target="#kt_modal_verify_tag_entry">Approve</a>
																								</div>
																							</div>
																				<!-- <a href="#" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm" data-bs-toggle="modal" data-bs-target="#kt_modal_view_tag_item">
																					<i class="bi bi-eye-fill eyc"></i>
																				</a> -->
																				<a href="javascript:;" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1" data-bs-toggle="modal" data-bs-target="#kt_modal_edit_tag_item">
																					
																					<span class="svg-icon svg-icon-3">
																						<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																							<path opacity="0.3" d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z" fill="currentColor"></path>
																							<path d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z" fill="currentColor"></path>
																						</svg>
																					</span>
																					
																				</a>
																			</span>
																			</td>
																        </tr>
																        <tr>
																            <td>06-06-2022</td>
																            <td class="ple1">AGB - Main Branch Sayalkudi</td>
																            <td class="ple1">LT-0001-TG-0004</td>
																            <td>
																            	<a href="javascript:;" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm" data-bs-toggle="modal" data-bs-target="#kt_modal_view_jewel_img">
																	            	<div class="image-input" data-kt-image-input="true">
																									<div class="image-input-wrapper w-40px h-40px" style="background-image: url(assets/images/sample_jewel.jpg)"></div>
																								</div>
																							</a>
																            </td>
																            <td class="ple1">Chain</td>
																            <td class="ple1">Hand Chain</td>
																            <td>4.400</td>
																            <td>0.200</td>
																            <td>4.600</td>
																            <td>
																							<label class="col-form-label fw-semibold fs-7"><span style="background-color:#46dcf9;border-radius: 8px;padding: 5px 15px 5px 15px;">Update Required</span>
																							</label>
																						</td>
																            <td>
																				<span class="text-end">
																					<button class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
																								<i class="fas fa-ellipsis-v eyc"></i>
																							</button>
																							<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px py-3" data-kt-menu="true" style="">
																								<div class="menu-item px-3">
																									<a href="#" class="menu-link px-3" data-bs-toggle="modal" data-bs-target="#kt_modal_update_tag_entry">Update</a>
																								</div>
																								<div class="menu-item px-3">
																									<a href="#" class="menu-link flex-stack px-3" data-bs-toggle="modal" data-bs-target="#kt_modal_verify_tag_entry">Approve</a>
																								</div>
																							</div>
																				<a href="javascript:;" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1" data-bs-toggle="modal" data-bs-target="#kt_modal_edit_tag_item">
																					
																					<span class="svg-icon svg-icon-3">
																						<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																							<path opacity="0.3" d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z" fill="currentColor"></path>
																							<path d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z" fill="currentColor"></path>
																						</svg>
																					</span>
																					
																				</a>
																			</span>
																			</td>
																        </tr>
																	</tbody>
															</table>
														</div>
													</div>
												</div>
											<!--begin::Table-->
											<!--end::Table-->
										</div>
										<!--end::Card body-->
											<!-- <div class="row">
										<div class="col-lg-9"></div>
										<div class="col-lg-1">
											<div class="d-flex flex-center flex-row-fluid pt-5 me-2">
												<button type="reset" class="btn btn-secondary md-2" data-bs-dismiss="modal">Cancel</button>
											</div>
										</div>
										<div class="col-lg-2">
											<div class="flex-center flex-row-fluid pt-5 me-2">
												<button type="submit" class="btn btn-primary" id="">Print All Tag</button>
											</div>
										</div>
									</div>
									<br> -->
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
		<!--begin::Modal - View Jewel Image-->
		<div class="modal fade" id="kt_modal_view_jewel_img" tabindex="-1" aria-hidden="true">
			<!--begin::Modal dialog-->
			<div class="modal-dialog modal-xs">
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
							
						</div>
						<!--end::Close-->
					</div>
					<!--end::Modal header-->
					<!--begin::Modal body-->
					<div class="modal-body">
						<div class="d-flex justify-content-center">
							<div class="image-input" data-kt-image-input="true">
								<div class="image-input-wrapper w-250px h-250px" style="background-image: url(assets/images/sample_jewel.jpg)"></div>
							</div>
						</div>
					</div>
					<!--end::Modal body-->
				</div>
				<!--end::Modal content-->
			</div>
			<!--end::Modal dialog-->
		</div>
		<!--end::Modal -View Jewel Image-->
		<!--begin::Modal - add Tag Entry-->
		<div class="modal fade" id="kt_modal_add_tagentry" tabindex="-1" aria-hidden="true">
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
					<div class="modal-body pt-0 pb-5 px-5 px-xl-20">
						<!--begin::Heading-->
						<div class="mb-7 text-center">
							<h1>TAG ENTRY</h1>
						</div>
						<!--end::Heading-->
						<div style="padding: 10px 10px 10px 10px !important;box-shadow: 0 3px 6px #00002947;border-radius: 5px;background-color: #f5f5f1 !important;">
							<div class="row">
								<label class="col-lg-1 col-form-label required fw-semibold fs-6">Date</label>
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
										<input class="form-control form-control-solid ps-12" name="" placeholder="Date" id="add_tagentry_date" />
									</div>
								</div>
								<label class="col-lg-1 col-form-label required fw-semibold fs-6">Lot No</label>
								<div class="col-lg-2 fv-row fv-plugins-icon-container">
									<input type="text" name="" class="form-control form-control-lg form-control-solid" placeholder="Select Lot No">
									<div class="fv-plugins-message-container invalid-feedback"></div>
								</div>
								<label class="col-lg-1 col-form-label fw-semibold fs-6">Type</label>
								<label class="col-lg-1 col-form-label fw-bold fs-3">: GOLD</label>
								<label class="col-lg-1 col-form-label fw-semibold fs-6">Supplier</label>
								<label class="col-lg-3 col-form-label fw-bold fs-5">: Kannan</label>
							</div>
							<div class="row">
								<label class="col-lg-3 col-form-label fw-bold fs-3">No of Item in the Lot</label>
								<label class="col-lg-1 col-form-label fw-bold fs-3">: 5</label>
								<label class="col-lg-2 col-form-label fw-bold fs-3">Total Weight</label>
								<label class="col-lg-2 col-form-label fw-bold fs-3">: 200.00gm</label>
							</div>
							<div class="row">
								<div class="col-lg-4">
									<div class="row">
										<label class="col-lg-6 col-form-label fw-bold fs-5">Item to be Tagged</label>
										<div class="col-lg-6 fv-row">
											<select class="form-select form-select-solid" data-control="select2" data-hide-search="true">	
												<option value="">Select Item</option>				
												<option value="1">Ring</option>
												<option value="2">Chain</option>
												<option value="3">Valayal</option>
												<option value="4">Kammal</option>
											</select>
										</div>
										<!-- <div class="col-lg-6 fv-row fv-plugins-icon-container">
											<input type="text" name="" class="form-control form-control-lg form-control-solid" placeholder="" value="Ring">
											<div class="fv-plugins-message-container invalid-feedback"></div>
										</div> -->
										<label class="col-form-label fw-bold fs-6 text-center">Ring &emsp;:  &nbsp; 10 Pcs &nbsp;&nbsp; ; &nbsp;&nbsp; 53.500gm</label>
									</div>
								</div>
								<div class="col-lg-4">
									<label class="col-form-label fw-bold fs-6">Tagged &emsp;&emsp;: &nbsp; 2 Pcs &nbsp;&nbsp; ; &nbsp;&nbsp; 18.100gm<br>Non-Tagged &emsp;: &nbsp;&nbsp;8 Pcs ; &nbsp;&nbsp; 35.400gm</label>
									<!-- <label class="col-form-label fw-bold fs-6"></label> -->
								</div>
								<div class="col-lg-4">
									<div class="row">
										<label class="col-lg-3 col-form-label fw-bold fs-4">Count</label>
										<div class="col-lg-2 fv-row fv-plugins-icon-container">
											<input type="text" name="" class="form-control form-control-lg form-control-solid" placeholder="" value="5">
											<div class="fv-plugins-message-container invalid-feedback"></div>
										</div>
										<div class="col-lg-7">
											<button class="btn btn-outline btn-outline-solid btn-outline-warning btn-active-light-primary">Generate Tags</button>
										</div>
										
									</div>
								</div>
							</div>
							<table class="table table-striped border rounded table-hover fs-7 gs-3 gy-3" id="add_tagentry_table">
							    <thead style=" background-color: #A7D3F0 !important;border: 1px solid #606060 !important;color: black !important;">
							        <tr class="fw-semibold fs-6 gs-0">
							            <th class="min-w-50px">Sno</th>
							            <th class="min-w-80px">Tag No</th>
							            <th class="min-w-80px">Item Name</th>
							            <th class="min-w-80px">Sub-Item</th>
							            <th class="min-w-25px">Qty</th>
							            <th class="min-w-50px">Pur</th>
							            <th class="min-w-50px">Wgt</th>
							            <th class="min-w-50px">Vat %</th>
							            <th class="min-w-50px">MC</th>
							            <th class="min-w-50px">Stone</th>
							            <th class="min-w-50px">Net</th>
							            <th class="min-w-50px">Img</th>
							            <th class="min-w-150px">Add &nbsp;/&nbsp;Del</th>
							        </tr>
							    </thead>
							    <tbody>
							    	<tr>
							    		<td>
							            	<input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex" value="1" readonly>
							            </td>
							            <td>
								            <input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex" value="Ch-44" readonly>
							            </td>
							            <td>
								            <input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex"  value="Chain" readonly>
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
							            <td>
								            <input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex">
							            </td>
							            <td>
								            <input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex">
							            </td>
							            <td>
							            	<div class="image-input mt-2" data-kt-image-input="true">
												<div class="image-input-wrapper w-40px h-40px" style="background-image: url(assets/media/svg/avatars/blank_jwl.svg)"></div>
												<!--end::Preview existing avatar-->
												<!--begin::Label-->
												<label class="btn btn-icon btn-active-color-primary w-40px h-25px" data-kt-image-input-action="change" data-bs-toggle="tooltip" data-kt-initialized="1">
													<i class="bi bi-pencil-fill fs-8 ms-3"></i>
													<!--begin::Inputs-->
													<input type="file" name="add_party_redemp" accept=".png, .jpg, .jpeg">
													<input type="hidden" name="add_party_remove_redemp">
													<!--end::Inputs-->
												</label>
												<!--end::Label-->
												<!--begin::Cancel-->
												<span class="btn btn-icon btn-active-color-primary w-25px h-20px" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" data-kt-initialized="1">
													<i class="bi bi-x fs-3 ms-2"></i>
												</span>
												<!--end::Cancel-->
												<!--begin::Remove-->
												<span class="btn btn-icon btn-active-color-primary w-25px h-20px" data-kt-image-input-action="remove" data-bs-toggle="tooltip" data-kt-initialized="1">
													<i class="bi bi-x fs-3 ms-2"></i>
												</span>
												<!--end::Remove-->
											</div>
							            </td>
							            <td>
											<button class="btn btn-sm btn-success mt-2"><i class="fa-sharp fa-solid fa-plus fs-4"></i></button>&emsp;
											<button class="btn btn-sm btn-danger mt-2"><i class="la la-trash-o fs-3"></i></button>
							            </td>
							    	</tr>
							    	<tr>
							    		<td>
							            	<input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex" value="2"  readonly>
							            </td>
							            <td>
								            <input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex" value="Ch-45" readonly>
							            </td>
							            <td>
								            <input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex"  value="Chain" readonly>
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
							            <td>
								            <input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex">
							            </td>
							            <td>
								            <input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex">
							            </td>
							            <td>
								            <div class="image-input mt-2" data-kt-image-input="true">
												<div class="image-input-wrapper w-40px h-40px" style="background-image: url(assets/media/svg/avatars/blank_jwl.svg)"></div>
												<!--end::Preview existing avatar-->
												<!--begin::Label-->
												<label class="btn btn-icon btn-active-color-primary w-40px h-25px" data-kt-image-input-action="change" data-bs-toggle="tooltip" data-kt-initialized="1">
													<i class="bi bi-pencil-fill fs-8 ms-3"></i>
													<!--begin::Inputs-->
													<input type="file" name="add_party_redemp" accept=".png, .jpg, .jpeg">
													<input type="hidden" name="add_party_remove_redemp">
													<!--end::Inputs-->
												</label>
												<!--end::Label-->
												<!--begin::Cancel-->
												<span class="btn btn-icon btn-active-color-primary w-25px h-20px" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" data-kt-initialized="1">
													<i class="bi bi-x fs-3 ms-2"></i>
												</span>
												<!--end::Cancel-->
												<!--begin::Remove-->
												<span class="btn btn-icon btn-active-color-primary w-25px h-20px" data-kt-image-input-action="remove" data-bs-toggle="tooltip" data-kt-initialized="1">
													<i class="bi bi-x fs-3 ms-2"></i>
												</span>
												<!--end::Remove-->
											</div>
							            </td>
							            <td>
											<button class="btn btn-sm btn-success mt-2"><i class="fa-sharp fa-solid fa-plus fs-4"></i></button>&emsp;
											<button class="btn btn-sm btn-danger mt-2"><i class="la la-trash-o fs-3"></i></button>
							            </td>
							    	</tr>
							    	<tr>
							    		<td>
							            	<input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex" value="3"  readonly>
							            </td>
							            <td>
								            <input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex" value="Ch-46" readonly>
							            </td>
							            <td>
								            <input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex"  value="Chain" readonly>
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
							            <td>
								            <input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex">
							            </td>
							            <td>
								            <input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex">
							            </td>
							            <td>
								            <div class="image-input mt-2" data-kt-image-input="true">
												<div class="image-input-wrapper w-40px h-40px" style="background-image: url(assets/media/svg/avatars/blank_jwl.svg)"></div>
												<!--end::Preview existing avatar-->
												<!--begin::Label-->
												<label class="btn btn-icon btn-active-color-primary w-40px h-25px" data-kt-image-input-action="change" data-bs-toggle="tooltip" data-kt-initialized="1">
													<i class="bi bi-pencil-fill fs-8 ms-3"></i>
													<!--begin::Inputs-->
													<input type="file" name="add_party_redemp" accept=".png, .jpg, .jpeg">
													<input type="hidden" name="add_party_remove_redemp">
													<!--end::Inputs-->
												</label>
												<!--end::Label-->
												<!--begin::Cancel-->
												<span class="btn btn-icon btn-active-color-primary w-25px h-20px" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" data-kt-initialized="1">
													<i class="bi bi-x fs-3 ms-2"></i>
												</span>
												<!--end::Cancel-->
												<!--begin::Remove-->
												<span class="btn btn-icon btn-active-color-primary w-25px h-20px" data-kt-image-input-action="remove" data-bs-toggle="tooltip" data-kt-initialized="1">
													<i class="bi bi-x fs-3 ms-2"></i>
												</span>
												<!--end::Remove-->
											</div>
							            </td>
							            <td>
											<button class="btn btn-sm btn-success mt-2"><i class="fa-sharp fa-solid fa-plus fs-4"></i></button>&emsp;
											<button class="btn btn-sm btn-danger mt-2"><i class="la la-trash-o fs-3"></i></button>
							            </td>
							    	</tr>
							    	<tr>
							    		<td>
							            	<input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex" value="4"  readonly>
							            </td>
							            <td>
								            <input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex" readonly>
							            </td>
							            <td>
								            <input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex" readonly>
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
							            <td>
								            <input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex">
							            </td>
							            <td>
								            <input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex">
							            </td>
							            <td>
								            <div class="image-input mt-2" data-kt-image-input="true">
												<div class="image-input-wrapper w-40px h-40px" style="background-image: url(assets/media/svg/avatars/blank_jwl.svg)"></div>
												<!--end::Preview existing avatar-->
												<!--begin::Label-->
												<label class="btn btn-icon btn-active-color-primary w-40px h-25px" data-kt-image-input-action="change" data-bs-toggle="tooltip" data-kt-initialized="1">
													<i class="bi bi-pencil-fill fs-8 ms-3"></i>
													<!--begin::Inputs-->
													<input type="file" name="add_party_redemp" accept=".png, .jpg, .jpeg">
													<input type="hidden" name="add_party_remove_redemp">
													<!--end::Inputs-->
												</label>
												<!--end::Label-->
												<!--begin::Cancel-->
												<span class="btn btn-icon btn-active-color-primary w-25px h-20px" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" data-kt-initialized="1">
													<i class="bi bi-x fs-3 ms-2"></i>
												</span>
												<!--end::Cancel-->
												<!--begin::Remove-->
												<span class="btn btn-icon btn-active-color-primary w-25px h-20px" data-kt-image-input-action="remove" data-bs-toggle="tooltip" data-kt-initialized="1">
													<i class="bi bi-x fs-3 ms-2"></i>
												</span>
												<!--end::Remove-->
											</div>
							            </td>
							            <td>
											<button class="btn btn-sm btn-success mt-2"><i class="fa-sharp fa-solid fa-plus fs-4"></i></button>&emsp;
											<button class="btn btn-sm btn-danger mt-2"><i class="la la-trash-o fs-3"></i></button>
							            </td>
							    	</tr>
							    	<tr>
							    		<td>
							            	<input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex" value="5"  readonly>
							            </td>
							            <td>
								            <input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex" readonly>
							            </td>
							            <td>
								            <input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex" readonly>
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
							            <td>
								            <input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex">
							            </td>
							            <td>
								            <input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex">
							            </td>
							            <td>
								            <div class="image-input mt-2" data-kt-image-input="true">
												<div class="image-input-wrapper w-40px h-40px" style="background-image: url(assets/media/svg/avatars/blank_jwl.svg)"></div>
												<!--end::Preview existing avatar-->
												<!--begin::Label-->
												<label class="btn btn-icon btn-active-color-primary w-40px h-25px" data-kt-image-input-action="change" data-bs-toggle="tooltip" data-kt-initialized="1">
													<i class="bi bi-pencil-fill fs-8 ms-3"></i>
													<!--begin::Inputs-->
													<input type="file" name="add_party_redemp" accept=".png, .jpg, .jpeg">
													<input type="hidden" name="add_party_remove_redemp">
													<!--end::Inputs-->
												</label>
												<!--end::Label-->
												<!--begin::Cancel-->
												<span class="btn btn-icon btn-active-color-primary w-25px h-20px" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" data-kt-initialized="1">
													<i class="bi bi-x fs-3 ms-2"></i>
												</span>
												<!--end::Cancel-->
												<!--begin::Remove-->
												<span class="btn btn-icon btn-active-color-primary w-25px h-20px" data-kt-image-input-action="remove" data-bs-toggle="tooltip" data-kt-initialized="1">
													<i class="bi bi-x fs-3 ms-2"></i>
												</span>
												<!--end::Remove-->
											</div>
							            </td>
							            <td>
											<button class="btn btn-sm btn-success mt-2"><i class="fa-sharp fa-solid fa-plus fs-4"></i></button>&emsp;
											<button class="btn btn-sm btn-danger mt-2"><i class="la la-trash-o fs-3"></i></button>
							            </td>
							    	</tr>
							    	<tr>
							    		<td>
							            	<input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex" value="6"  readonly>
							            </td>
							            <td>
								            <input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex" readonly>
							            </td>
							            <td>
								            <input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex" readonly>
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
							            <td>
								            <input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex">
							            </td>
							            <td>
								            <input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex">
							            </td>
							            <td>
								            <div class="image-input mt-2" data-kt-image-input="true">
												<div class="image-input-wrapper w-40px h-40px" style="background-image: url(assets/media/svg/avatars/blank_jwl.svg)"></div>
												<!--end::Preview existing avatar-->
												<!--begin::Label-->
												<label class="btn btn-icon btn-active-color-primary w-40px h-25px" data-kt-image-input-action="change" data-bs-toggle="tooltip" data-kt-initialized="1">
													<i class="bi bi-pencil-fill fs-8 ms-3"></i>
													<!--begin::Inputs-->
													<input type="file" name="add_party_redemp" accept=".png, .jpg, .jpeg">
													<input type="hidden" name="add_party_remove_redemp">
													<!--end::Inputs-->
												</label>
												<!--end::Label-->
												<!--begin::Cancel-->
												<span class="btn btn-icon btn-active-color-primary w-25px h-20px" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" data-kt-initialized="1">
													<i class="bi bi-x fs-3 ms-2"></i>
												</span>
												<!--end::Cancel-->
												<!--begin::Remove-->
												<span class="btn btn-icon btn-active-color-primary w-25px h-20px" data-kt-image-input-action="remove" data-bs-toggle="tooltip" data-kt-initialized="1">
													<i class="bi bi-x fs-3 ms-2"></i>
												</span>
												<!--end::Remove-->
											</div>
							            </td>
							            <td>
											<button class="btn btn-sm btn-success mt-2"><i class="fa-sharp fa-solid fa-plus fs-4"></i></button>&emsp;
											<button class="btn btn-sm btn-danger mt-2"><i class="la la-trash-o fs-3"></i></button>
							            </td>
							    	</tr>
							    	<tr>
							    		<td>
							            	<input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex" value="7"  readonly>
							            </td>
							            <td>
								            <input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex" readonly>
							            </td>
							            <td>
								            <input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex" readonly>
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
							            <td>
								            <input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex">
							            </td>
							            <td>
								            <input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex">
							            </td>
							            <td>
								            <div class="image-input mt-2" data-kt-image-input="true">
												<div class="image-input-wrapper w-40px h-40px" style="background-image: url(assets/media/svg/avatars/blank_jwl.svg)"></div>
												<!--end::Preview existing avatar-->
												<!--begin::Label-->
												<label class="btn btn-icon btn-active-color-primary w-40px h-25px" data-kt-image-input-action="change" data-bs-toggle="tooltip" data-kt-initialized="1">
													<i class="bi bi-pencil-fill fs-8 ms-3"></i>
													<!--begin::Inputs-->
													<input type="file" name="add_party_redemp" accept=".png, .jpg, .jpeg">
													<input type="hidden" name="add_party_remove_redemp">
													<!--end::Inputs-->
												</label>
												<!--end::Label-->
												<!--begin::Cancel-->
												<span class="btn btn-icon btn-active-color-primary w-25px h-20px" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" data-kt-initialized="1">
													<i class="bi bi-x fs-3 ms-2"></i>
												</span>
												<!--end::Cancel-->
												<!--begin::Remove-->
												<span class="btn btn-icon btn-active-color-primary w-25px h-20px" data-kt-image-input-action="remove" data-bs-toggle="tooltip" data-kt-initialized="1">
													<i class="bi bi-x fs-3 ms-2"></i>
												</span>
												<!--end::Remove-->
											</div>
							            </td>
							            <td>
											<button class="btn btn-sm btn-success mt-2"><i class="fa-sharp fa-solid fa-plus fs-4"></i></button>&emsp;
											<button class="btn btn-sm btn-danger mt-2"><i class="la la-trash-o fs-3"></i></button>
							            </td>
							    	</tr>
							    	<tr>
							    		<td>
							            	<input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex" value="8"  readonly>
							            </td>
							            <td>
								            <input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex" readonly>
							            </td>
							            <td>
								            <input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex" readonly>
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
							            <td>
								            <input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex">
							            </td>
							            <td>
								            <input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex">
							            </td>
							            <td>
								            <div class="image-input mt-2" data-kt-image-input="true">
												<div class="image-input-wrapper w-40px h-40px" style="background-image: url(assets/media/svg/avatars/blank_jwl.svg)"></div>
												<!--end::Preview existing avatar-->
												<!--begin::Label-->
												<label class="btn btn-icon btn-active-color-primary w-40px h-25px" data-kt-image-input-action="change" data-bs-toggle="tooltip" data-kt-initialized="1">
													<i class="bi bi-pencil-fill fs-8 ms-3"></i>
													<!--begin::Inputs-->
													<input type="file" name="add_party_redemp" accept=".png, .jpg, .jpeg">
													<input type="hidden" name="add_party_remove_redemp">
													<!--end::Inputs-->
												</label>
												<!--end::Label-->
												<!--begin::Cancel-->
												<span class="btn btn-icon btn-active-color-primary w-25px h-20px" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" data-kt-initialized="1">
													<i class="bi bi-x fs-3 ms-2"></i>
												</span>
												<!--end::Cancel-->
												<!--begin::Remove-->
												<span class="btn btn-icon btn-active-color-primary w-25px h-20px" data-kt-image-input-action="remove" data-bs-toggle="tooltip" data-kt-initialized="1">
													<i class="bi bi-x fs-3 ms-2"></i>
												</span>
												<!--end::Remove-->
											</div>
							            </td>
							            <td>
											<button class="btn btn-sm btn-success mt-2"><i class="fa-sharp fa-solid fa-plus fs-4"></i></button>&emsp;
											<button class="btn btn-sm btn-danger mt-2"><i class="la la-trash-o fs-3"></i></button>
							            </td>
							    	</tr>
							    	<tr>
							    		<td>
							            	<input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex" value="9"  readonly>
							            </td>
							            <td>
								            <input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex" readonly>
							            </td>
							            <td>
								            <input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex" readonly>
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
							            <td>
								            <input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex">
							            </td>
							            <td>
								            <input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex">
							            </td>
							            <td>
								            <div class="image-input mt-2" data-kt-image-input="true">
												<div class="image-input-wrapper w-40px h-40px" style="background-image: url(assets/media/svg/avatars/blank_jwl.svg)"></div>
												<!--end::Preview existing avatar-->
												<!--begin::Label-->
												<label class="btn btn-icon btn-active-color-primary w-40px h-25px" data-kt-image-input-action="change" data-bs-toggle="tooltip" data-kt-initialized="1">
													<i class="bi bi-pencil-fill fs-8 ms-3"></i>
													<!--begin::Inputs-->
													<input type="file" name="add_party_redemp" accept=".png, .jpg, .jpeg">
													<input type="hidden" name="add_party_remove_redemp">
													<!--end::Inputs-->
												</label>
												<!--end::Label-->
												<!--begin::Cancel-->
												<span class="btn btn-icon btn-active-color-primary w-25px h-20px" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" data-kt-initialized="1">
													<i class="bi bi-x fs-3 ms-2"></i>
												</span>
												<!--end::Cancel-->
												<!--begin::Remove-->
												<span class="btn btn-icon btn-active-color-primary w-25px h-20px" data-kt-image-input-action="remove" data-bs-toggle="tooltip" data-kt-initialized="1">
													<i class="bi bi-x fs-3 ms-2"></i>
												</span>
												<!--end::Remove-->
											</div>
							            </td>
							            <td>
											<button class="btn btn-sm btn-success mt-2"><i class="fa-sharp fa-solid fa-plus fs-4"></i></button>&emsp;
											<button class="btn btn-sm btn-danger mt-2"><i class="la la-trash-o fs-3"></i></button>
							            </td>
							    	</tr>
							    	<tr>
							    		<td>
							            	<input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex" value="10"  readonly>
							            </td>
							            <td>
								            <input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex" readonly>
							            </td>
							            <td>
								            <input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex" readonly>
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
							            <td>
								            <input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex">
							            </td>
							            <td>
								            <input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex">
							            </td>
							            <td>
								            <div class="image-input mt-2" data-kt-image-input="true">
												<div class="image-input-wrapper w-40px h-40px" style="background-image: url(assets/media/svg/avatars/blank_jwl.svg)"></div>
												<!--end::Preview existing avatar-->
												<!--begin::Label-->
												<label class="btn btn-icon btn-active-color-primary w-40px h-25px" data-kt-image-input-action="change" data-bs-toggle="tooltip" data-kt-initialized="1">
													<i class="bi bi-pencil-fill fs-8 ms-3"></i>
													<!--begin::Inputs-->
													<input type="file" name="add_party_redemp" accept=".png, .jpg, .jpeg">
													<input type="hidden" name="add_party_remove_redemp">
													<!--end::Inputs-->
												</label>
												<!--end::Label-->
												<!--begin::Cancel-->
												<span class="btn btn-icon btn-active-color-primary w-25px h-20px" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" data-kt-initialized="1">
													<i class="bi bi-x fs-3 ms-2"></i>
												</span>
												<!--end::Cancel-->
												<!--begin::Remove-->
												<span class="btn btn-icon btn-active-color-primary w-25px h-20px" data-kt-image-input-action="remove" data-bs-toggle="tooltip" data-kt-initialized="1">
													<i class="bi bi-x fs-3 ms-2"></i>
												</span>
												<!--end::Remove-->
											</div>
							            </td>
							            <td>
											<button class="btn btn-sm btn-success mt-2"><i class="fa-sharp fa-solid fa-plus fs-4"></i></button>&emsp;
											<button class="btn btn-sm btn-danger mt-2"><i class="la la-trash-o fs-3"></i></button>
							            </td>
							    	</tr>
							    	<tr>
							    		<td>
							            	<input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex" value="11"  readonly>
							            </td>
							            <td>
								            <input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex" readonly>
							            </td>
							            <td>
								            <input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex" readonly>
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
							            <td>
								            <input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex">
							            </td>
							            <td>
								            <input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex">
							            </td>
							            <td>
								            <div class="image-input mt-2" data-kt-image-input="true">
												<div class="image-input-wrapper w-40px h-40px" style="background-image: url(assets/media/svg/avatars/blank_jwl.svg)"></div>
												<!--end::Preview existing avatar-->
												<!--begin::Label-->
												<label class="btn btn-icon btn-active-color-primary w-40px h-25px" data-kt-image-input-action="change" data-bs-toggle="tooltip" data-kt-initialized="1">
													<i class="bi bi-pencil-fill fs-8 ms-3"></i>
													<!--begin::Inputs-->
													<input type="file" name="add_party_redemp" accept=".png, .jpg, .jpeg">
													<input type="hidden" name="add_party_remove_redemp">
													<!--end::Inputs-->
												</label>
												<!--end::Label-->
												<!--begin::Cancel-->
												<span class="btn btn-icon btn-active-color-primary w-25px h-20px" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" data-kt-initialized="1">
													<i class="bi bi-x fs-3 ms-2"></i>
												</span>
												<!--end::Cancel-->
												<!--begin::Remove-->
												<span class="btn btn-icon btn-active-color-primary w-25px h-20px" data-kt-image-input-action="remove" data-bs-toggle="tooltip" data-kt-initialized="1">
													<i class="bi bi-x fs-3 ms-2"></i>
												</span>
												<!--end::Remove-->
											</div>
							            </td>
							            <td>
											<button class="btn btn-sm btn-success mt-2"><i class="fa-sharp fa-solid fa-plus fs-4"></i></button>&emsp;
											<button class="btn btn-sm btn-danger mt-2"><i class="la la-trash-o fs-3"></i></button>
							            </td>
							    	</tr>
							    	<tr>
							    		<td>
							            	<input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex" value="12"  readonly>
							            </td>
							            <td>
								            <input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex" readonly>
							            </td>
							            <td>
								            <input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex" readonly>
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
							            <td>
								            <input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex">
							            </td>
							            <td>
								            <input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex">
							            </td>
							            <td>
								            <div class="image-input mt-2" data-kt-image-input="true">
												<div class="image-input-wrapper w-40px h-40px" style="background-image: url(assets/media/svg/avatars/blank_jwl.svg)"></div>
												<!--end::Preview existing avatar-->
												<!--begin::Label-->
												<label class="btn btn-icon btn-active-color-primary w-40px h-25px" data-kt-image-input-action="change" data-bs-toggle="tooltip" data-kt-initialized="1">
													<i class="bi bi-pencil-fill fs-8 ms-3"></i>
													<!--begin::Inputs-->
													<input type="file" name="add_party_redemp" accept=".png, .jpg, .jpeg">
													<input type="hidden" name="add_party_remove_redemp">
													<!--end::Inputs-->
												</label>
												<!--end::Label-->
												<!--begin::Cancel-->
												<span class="btn btn-icon btn-active-color-primary w-25px h-20px" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" data-kt-initialized="1">
													<i class="bi bi-x fs-3 ms-2"></i>
												</span>
												<!--end::Cancel-->
												<!--begin::Remove-->
												<span class="btn btn-icon btn-active-color-primary w-25px h-20px" data-kt-image-input-action="remove" data-bs-toggle="tooltip" data-kt-initialized="1">
													<i class="bi bi-x fs-3 ms-2"></i>
												</span>
												<!--end::Remove-->
											</div>
							            </td>
							            <td>
											<button class="btn btn-sm btn-success mt-2"><i class="fa-sharp fa-solid fa-plus fs-4"></i></button>&emsp;
											<button class="btn btn-sm btn-danger mt-2"><i class="la la-trash-o fs-3"></i></button>
							            </td>
							    	</tr>
							    	<tr>
							    		<td>
							            	<input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex" value="13"  readonly>
							            </td>
							            <td>
								            <input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex" readonly>
							            </td>
							            <td>
								            <input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex" readonly>
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
							            <td>
								            <input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex">
							            </td>
							            <td>
								            <input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex">
							            </td>
							            <td>
								            <div class="image-input mt-2" data-kt-image-input="true">
												<div class="image-input-wrapper w-40px h-40px" style="background-image: url(assets/media/svg/avatars/blank_jwl.svg)"></div>
												<!--end::Preview existing avatar-->
												<!--begin::Label-->
												<label class="btn btn-icon btn-active-color-primary w-40px h-25px" data-kt-image-input-action="change" data-bs-toggle="tooltip" data-kt-initialized="1">
													<i class="bi bi-pencil-fill fs-8 ms-3"></i>
													<!--begin::Inputs-->
													<input type="file" name="add_party_redemp" accept=".png, .jpg, .jpeg">
													<input type="hidden" name="add_party_remove_redemp">
													<!--end::Inputs-->
												</label>
												<!--end::Label-->
												<!--begin::Cancel-->
												<span class="btn btn-icon btn-active-color-primary w-25px h-20px" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" data-kt-initialized="1">
													<i class="bi bi-x fs-3 ms-2"></i>
												</span>
												<!--end::Cancel-->
												<!--begin::Remove-->
												<span class="btn btn-icon btn-active-color-primary w-25px h-20px" data-kt-image-input-action="remove" data-bs-toggle="tooltip" data-kt-initialized="1">
													<i class="bi bi-x fs-3 ms-2"></i>
												</span>
												<!--end::Remove-->
											</div>
							            </td>
							            <td>
											<button class="btn btn-sm btn-success mt-2"><i class="fa-sharp fa-solid fa-plus fs-4"></i></button>&emsp;
											<button class="btn btn-sm btn-danger mt-2"><i class="la la-trash-o fs-3"></i></button>
							            </td>
							    	</tr>
							    	<tr>
							    		<td>
							            	<input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex" value="14"  readonly>
							            </td>
							            <td>
								            <input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex" readonly>
							            </td>
							            <td>
								            <input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex" readonly>
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
							            <td>
								            <input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex">
							            </td>
							            <td>
								            <input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex">
							            </td>
							            <td>
								            <div class="image-input mt-2" data-kt-image-input="true">
												<div class="image-input-wrapper w-40px h-40px" style="background-image: url(assets/media/svg/avatars/blank_jwl.svg)"></div>
												<!--end::Preview existing avatar-->
												<!--begin::Label-->
												<label class="btn btn-icon btn-active-color-primary w-40px h-25px" data-kt-image-input-action="change" data-bs-toggle="tooltip" data-kt-initialized="1">
													<i class="bi bi-pencil-fill fs-8 ms-3"></i>
													<!--begin::Inputs-->
													<input type="file" name="add_party_redemp" accept=".png, .jpg, .jpeg">
													<input type="hidden" name="add_party_remove_redemp">
													<!--end::Inputs-->
												</label>
												<!--end::Label-->
												<!--begin::Cancel-->
												<span class="btn btn-icon btn-active-color-primary w-25px h-20px" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" data-kt-initialized="1">
													<i class="bi bi-x fs-3 ms-2"></i>
												</span>
												<!--end::Cancel-->
												<!--begin::Remove-->
												<span class="btn btn-icon btn-active-color-primary w-25px h-20px" data-kt-image-input-action="remove" data-bs-toggle="tooltip" data-kt-initialized="1">
													<i class="bi bi-x fs-3 ms-2"></i>
												</span>
												<!--end::Remove-->
											</div>
							            </td>
							            <td>
											<button class="btn btn-sm btn-success mt-2"><i class="fa-sharp fa-solid fa-plus fs-4"></i></button>&emsp;
											<button class="btn btn-sm btn-danger mt-2"><i class="la la-trash-o fs-3"></i></button>
							            </td>
							    	</tr>
							    	<tr>
							    		<td>
							            	<input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex" value="15"  readonly>
							            </td>
							            <td>
								            <input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex" readonly>
							            </td>
							            <td>
								            <input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex" readonly>
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
							            <td>
								            <input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex">
							            </td>
							            <td>
								            <input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex">
							            </td>
							            <td>
								            <div class="image-input mt-2" data-kt-image-input="true">
												<div class="image-input-wrapper w-40px h-40px" style="background-image: url(assets/media/svg/avatars/blank_jwl.svg)"></div>
												<!--end::Preview existing avatar-->
												<!--begin::Label-->
												<label class="btn btn-icon btn-active-color-primary w-40px h-25px" data-kt-image-input-action="change" data-bs-toggle="tooltip" data-kt-initialized="1">
													<i class="bi bi-pencil-fill fs-8 ms-3"></i>
													<!--begin::Inputs-->
													<input type="file" name="add_party_redemp" accept=".png, .jpg, .jpeg">
													<input type="hidden" name="add_party_remove_redemp">
													<!--end::Inputs-->
												</label>
												<!--end::Label-->
												<!--begin::Cancel-->
												<span class="btn btn-icon btn-active-color-primary w-25px h-20px" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" data-kt-initialized="1">
													<i class="bi bi-x fs-3 ms-2"></i>
												</span>
												<!--end::Cancel-->
												<!--begin::Remove-->
												<span class="btn btn-icon btn-active-color-primary w-25px h-20px" data-kt-image-input-action="remove" data-bs-toggle="tooltip" data-kt-initialized="1">
													<i class="bi bi-x fs-3 ms-2"></i>
												</span>
												<!--end::Remove-->
											</div>
							            </td>
							            <td>
											<button class="btn btn-sm btn-success mt-2"><i class="fa-sharp fa-solid fa-plus fs-4"></i></button>&emsp;
											<button class="btn btn-sm btn-danger mt-2"><i class="la la-trash-o fs-3"></i></button>
							            </td>
							    	</tr>
							    	<tr>
							    		<td>
							            	<input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex" value="16"  readonly>
							            </td>
							            <td>
								            <input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex" readonly>
							            </td>
							            <td>
								            <input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex" readonly>
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
							            <td>
								            <input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex">
							            </td>
							            <td>
								            <input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex">
							            </td>
							            <td>
								            <div class="image-input mt-2" data-kt-image-input="true">
												<div class="image-input-wrapper w-40px h-40px" style="background-image: url(assets/media/svg/avatars/blank_jwl.svg)"></div>
												<!--end::Preview existing avatar-->
												<!--begin::Label-->
												<label class="btn btn-icon btn-active-color-primary w-40px h-25px" data-kt-image-input-action="change" data-bs-toggle="tooltip" data-kt-initialized="1">
													<i class="bi bi-pencil-fill fs-8 ms-3"></i>
													<!--begin::Inputs-->
													<input type="file" name="add_party_redemp" accept=".png, .jpg, .jpeg">
													<input type="hidden" name="add_party_remove_redemp">
													<!--end::Inputs-->
												</label>
												<!--end::Label-->
												<!--begin::Cancel-->
												<span class="btn btn-icon btn-active-color-primary w-25px h-20px" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" data-kt-initialized="1">
													<i class="bi bi-x fs-3 ms-2"></i>
												</span>
												<!--end::Cancel-->
												<!--begin::Remove-->
												<span class="btn btn-icon btn-active-color-primary w-25px h-20px" data-kt-image-input-action="remove" data-bs-toggle="tooltip" data-kt-initialized="1">
													<i class="bi bi-x fs-3 ms-2"></i>
												</span>
												<!--end::Remove-->
											</div>
							            </td>
							            <td>
											<button class="btn btn-sm btn-success mt-2"><i class="fa-sharp fa-solid fa-plus fs-4"></i></button>&emsp;
											<button class="btn btn-sm btn-danger mt-2"><i class="la la-trash-o fs-3"></i></button>
							            </td>
							    	</tr>
							    	<tr>
							    		<td>
							            	<input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex" value="17"  readonly>
							            </td>
							            <td>
								            <input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex" readonly>
							            </td>
							            <td>
								            <input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex" readonly>
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
							            <td>
								            <input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex">
							            </td>
							            <td>
								            <input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex">
							            </td>
							            <td>
								            <div class="image-input mt-2" data-kt-image-input="true">
												<div class="image-input-wrapper w-40px h-40px" style="background-image: url(assets/media/svg/avatars/blank_jwl.svg)"></div>
												<!--end::Preview existing avatar-->
												<!--begin::Label-->
												<label class="btn btn-icon btn-active-color-primary w-40px h-25px" data-kt-image-input-action="change" data-bs-toggle="tooltip" data-kt-initialized="1">
													<i class="bi bi-pencil-fill fs-8 ms-3"></i>
													<!--begin::Inputs-->
													<input type="file" name="add_party_redemp" accept=".png, .jpg, .jpeg">
													<input type="hidden" name="add_party_remove_redemp">
													<!--end::Inputs-->
												</label>
												<!--end::Label-->
												<!--begin::Cancel-->
												<span class="btn btn-icon btn-active-color-primary w-25px h-20px" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" data-kt-initialized="1">
													<i class="bi bi-x fs-3 ms-2"></i>
												</span>
												<!--end::Cancel-->
												<!--begin::Remove-->
												<span class="btn btn-icon btn-active-color-primary w-25px h-20px" data-kt-image-input-action="remove" data-bs-toggle="tooltip" data-kt-initialized="1">
													<i class="bi bi-x fs-3 ms-2"></i>
												</span>
												<!--end::Remove-->
											</div>
							            </td>
							            <td>
											<button class="btn btn-sm btn-success mt-2"><i class="fa-sharp fa-solid fa-plus fs-4"></i></button>&emsp;
											<button class="btn btn-sm btn-danger mt-2"><i class="la la-trash-o fs-3"></i></button>
							            </td>
							    	</tr>
							    	<tr>
							    		<td>
							            	<input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex" value="18"  readonly>
							            </td>
							            <td>
								            <input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex" readonly>
							            </td>
							            <td>
								            <input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex" readonly>
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
							            <td>
								            <input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex">
							            </td>
							            <td>
								            <input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex">
							            </td>
							            <td>
								            <div class="image-input mt-2" data-kt-image-input="true">
												<div class="image-input-wrapper w-40px h-40px" style="background-image: url(assets/media/svg/avatars/blank_jwl.svg)"></div>
												<!--end::Preview existing avatar-->
												<!--begin::Label-->
												<label class="btn btn-icon btn-active-color-primary w-40px h-25px" data-kt-image-input-action="change" data-bs-toggle="tooltip" data-kt-initialized="1">
													<i class="bi bi-pencil-fill fs-8 ms-3"></i>
													<!--begin::Inputs-->
													<input type="file" name="add_party_redemp" accept=".png, .jpg, .jpeg">
													<input type="hidden" name="add_party_remove_redemp">
													<!--end::Inputs-->
												</label>
												<!--end::Label-->
												<!--begin::Cancel-->
												<span class="btn btn-icon btn-active-color-primary w-25px h-20px" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" data-kt-initialized="1">
													<i class="bi bi-x fs-3 ms-2"></i>
												</span>
												<!--end::Cancel-->
												<!--begin::Remove-->
												<span class="btn btn-icon btn-active-color-primary w-25px h-20px" data-kt-image-input-action="remove" data-bs-toggle="tooltip" data-kt-initialized="1">
													<i class="bi bi-x fs-3 ms-2"></i>
												</span>
												<!--end::Remove-->
											</div>
							            </td>
							            <td>
											<button class="btn btn-sm btn-success mt-2"><i class="fa-sharp fa-solid fa-plus fs-4"></i></button>&emsp;
											<button class="btn btn-sm btn-danger mt-2"><i class="la la-trash-o fs-3"></i></button>
							            </td>
							    	</tr>
							    	<tr>
							    		<td>
							            	<input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex" value="19"  readonly>
							            </td>
							            <td>
								            <input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex" readonly>
							            </td>
							            <td>
								            <input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex" readonly>
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
							            <td>
								            <input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex">
							            </td>
							            <td>
								            <input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex">
							            </td>
							            <td>
								            <div class="image-input mt-2" data-kt-image-input="true">
												<div class="image-input-wrapper w-40px h-40px" style="background-image: url(assets/media/svg/avatars/blank_jwl.svg)"></div>
												<!--end::Preview existing avatar-->
												<!--begin::Label-->
												<label class="btn btn-icon btn-active-color-primary w-40px h-25px" data-kt-image-input-action="change" data-bs-toggle="tooltip" data-kt-initialized="1">
													<i class="bi bi-pencil-fill fs-8 ms-3"></i>
													<!--begin::Inputs-->
													<input type="file" name="add_party_redemp" accept=".png, .jpg, .jpeg">
													<input type="hidden" name="add_party_remove_redemp">
													<!--end::Inputs-->
												</label>
												<!--end::Label-->
												<!--begin::Cancel-->
												<span class="btn btn-icon btn-active-color-primary w-25px h-20px" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" data-kt-initialized="1">
													<i class="bi bi-x fs-3 ms-2"></i>
												</span>
												<!--end::Cancel-->
												<!--begin::Remove-->
												<span class="btn btn-icon btn-active-color-primary w-25px h-20px" data-kt-image-input-action="remove" data-bs-toggle="tooltip" data-kt-initialized="1">
													<i class="bi bi-x fs-3 ms-2"></i>
												</span>
												<!--end::Remove-->
											</div>
							            </td>
							            <td>
											<button class="btn btn-sm btn-success mt-2"><i class="fa-sharp fa-solid fa-plus fs-4"></i></button>&emsp;
											<button class="btn btn-sm btn-danger mt-2"><i class="la la-trash-o fs-3"></i></button>
							            </td>
							    	</tr>
							    	<tr>
							    		<td>
							            	<input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex" value="20"  readonly>
							            </td>
							            <td>
								            <input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex" readonly>
							            </td>
							            <td>
								            <input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex" readonly>
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
							            <td>
								            <input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex">
							            </td>
							            <td>
								            <input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex">
							            </td>
							            <td>
								            <div class="image-input mt-2" data-kt-image-input="true">
												<div class="image-input-wrapper w-40px h-40px" style="background-image: url(assets/media/svg/avatars/blank_jwl.svg)"></div>
												<!--end::Preview existing avatar-->
												<!--begin::Label-->
												<label class="btn btn-icon btn-active-color-primary w-40px h-25px" data-kt-image-input-action="change" data-bs-toggle="tooltip" data-kt-initialized="1">
													<i class="bi bi-pencil-fill fs-8 ms-3"></i>
													<!--begin::Inputs-->
													<input type="file" name="add_party_redemp" accept=".png, .jpg, .jpeg">
													<input type="hidden" name="add_party_remove_redemp">
													<!--end::Inputs-->
												</label>
												<!--end::Label-->
												<!--begin::Cancel-->
												<span class="btn btn-icon btn-active-color-primary w-25px h-20px" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" data-kt-initialized="1">
													<i class="bi bi-x fs-3 ms-2"></i>
												</span>
												<!--end::Cancel-->
												<!--begin::Remove-->
												<span class="btn btn-icon btn-active-color-primary w-25px h-20px" data-kt-image-input-action="remove" data-bs-toggle="tooltip" data-kt-initialized="1">
													<i class="bi bi-x fs-3 ms-2"></i>
												</span>
												<!--end::Remove-->
											</div>
							            </td>
							            <td>
											<button class="btn btn-sm btn-success mt-2"><i class="fa-sharp fa-solid fa-plus fs-4"></i></button>&emsp;
											<button class="btn btn-sm btn-danger mt-2"><i class="la la-trash-o fs-3"></i></button>
							            </td>
							    	</tr>
							    	<tr>
							    		<td>
							            	<input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex" value="21"  readonly>
							            </td>
							            <td>
								            <input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex" readonly>
							            </td>
							            <td>
								            <input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex" readonly>
							            </td>
							            <td>
								            <input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex" readonly>
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
							            <td>
								            <input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex">
							            </td>
							            <td>
								            <div class="image-input mt-2" data-kt-image-input="true">
												<div class="image-input-wrapper w-40px h-40px" style="background-image: url(assets/media/svg/avatars/blank_jwl.svg)"></div>
												<!--end::Preview existing avatar-->
												<!--begin::Label-->
												<label class="btn btn-icon btn-active-color-primary w-40px h-25px" data-kt-image-input-action="change" data-bs-toggle="tooltip" data-kt-initialized="1">
													<i class="bi bi-pencil-fill fs-8 ms-3"></i>
													<!--begin::Inputs-->
													<input type="file" name="add_party_redemp" accept=".png, .jpg, .jpeg">
													<input type="hidden" name="add_party_remove_redemp">
													<!--end::Inputs-->
												</label>
												<!--end::Label-->
												<!--begin::Cancel-->
												<span class="btn btn-icon btn-active-color-primary w-25px h-20px" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" data-kt-initialized="1">
													<i class="bi bi-x fs-3 ms-2"></i>
												</span>
												<!--end::Cancel-->
												<!--begin::Remove-->
												<span class="btn btn-icon btn-active-color-primary w-25px h-20px" data-kt-image-input-action="remove" data-bs-toggle="tooltip" data-kt-initialized="1">
													<i class="bi bi-x fs-3 ms-2"></i>
												</span>
												<!--end::Remove-->
											</div>
							            </td>
							            <td>
											<button class="btn btn-sm btn-success mt-2"><i class="fa-sharp fa-solid fa-plus fs-4"></i></button>&emsp;
											<button class="btn btn-sm btn-danger mt-2"><i class="la la-trash-o fs-3"></i></button>
							            </td>
							    	</tr>
							    	<tr>
							    		<td>
							            	<input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex" value="22"  readonly>
							            </td>
							            <td>
								            <input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex" readonly>
							            </td>
							            <td>
								            <input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex" readonly>
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
							            <td>
								            <input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex">
							            </td>
							            <td>
								            <input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex">
							            </td>
							            <td>
								            <div class="image-input mt-2" data-kt-image-input="true">
												<div class="image-input-wrapper w-40px h-40px" style="background-image: url(assets/media/svg/avatars/blank_jwl.svg)"></div>
												<!--end::Preview existing avatar-->
												<!--begin::Label-->
												<label class="btn btn-icon btn-active-color-primary w-40px h-25px" data-kt-image-input-action="change" data-bs-toggle="tooltip" data-kt-initialized="1">
													<i class="bi bi-pencil-fill fs-8 ms-3"></i>
													<!--begin::Inputs-->
													<input type="file" name="add_party_redemp" accept=".png, .jpg, .jpeg">
													<input type="hidden" name="add_party_remove_redemp">
													<!--end::Inputs-->
												</label>
												<!--end::Label-->
												<!--begin::Cancel-->
												<span class="btn btn-icon btn-active-color-primary w-25px h-20px" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" data-kt-initialized="1">
													<i class="bi bi-x fs-3 ms-2"></i>
												</span>
												<!--end::Cancel-->
												<!--begin::Remove-->
												<span class="btn btn-icon btn-active-color-primary w-25px h-20px" data-kt-image-input-action="remove" data-bs-toggle="tooltip" data-kt-initialized="1">
													<i class="bi bi-x fs-3 ms-2"></i>
												</span>
												<!--end::Remove-->
											</div>
							            </td>
							            <td>
											<button class="btn btn-sm btn-success mt-2"><i class="fa-sharp fa-solid fa-plus fs-4"></i></button>&emsp;
											<button class="btn btn-sm btn-danger mt-2"><i class="la la-trash-o fs-3"></i></button>
							            </td>
							    	</tr>
							    	<tr>
							    		<td>
							            	<input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex" value="23"  readonly>
							            </td>
							            <td>
								            <input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex" readonly>
							            </td>
							            <td>
								            <input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex" readonly>
							            </td>
							            <td>
								            <input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex" readonly>
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
							            <td>
								            <input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex">
							            </td>
							            <td>
								            <div class="image-input mt-2" data-kt-image-input="true">
												<div class="image-input-wrapper w-40px h-40px" style="background-image: url(assets/media/svg/avatars/blank_jwl.svg)"></div>
												<!--end::Preview existing avatar-->
												<!--begin::Label-->
												<label class="btn btn-icon btn-active-color-primary w-40px h-25px" data-kt-image-input-action="change" data-bs-toggle="tooltip" data-kt-initialized="1">
													<i class="bi bi-pencil-fill fs-8 ms-3"></i>
													<!--begin::Inputs-->
													<input type="file" name="add_party_redemp" accept=".png, .jpg, .jpeg">
													<input type="hidden" name="add_party_remove_redemp">
													<!--end::Inputs-->
												</label>
												<!--end::Label-->
												<!--begin::Cancel-->
												<span class="btn btn-icon btn-active-color-primary w-25px h-20px" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" data-kt-initialized="1">
													<i class="bi bi-x fs-3 ms-2"></i>
												</span>
												<!--end::Cancel-->
												<!--begin::Remove-->
												<span class="btn btn-icon btn-active-color-primary w-25px h-20px" data-kt-image-input-action="remove" data-bs-toggle="tooltip" data-kt-initialized="1">
													<i class="bi bi-x fs-3 ms-2"></i>
												</span>
												<!--end::Remove-->
											</div>
							            </td>
							            <td>
											<button class="btn btn-sm btn-success mt-2"><i class="fa-sharp fa-solid fa-plus fs-4"></i></button>&emsp;
											<button class="btn btn-sm btn-danger mt-2"><i class="la la-trash-o fs-3"></i></button>
							            </td>
							    	</tr>
							    	<tr>
							    		<td>
							            	<input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex" value="24"  readonly>
							            </td>
							            <td>
								            <input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex" readonly>
							            </td>
							            <td>
								            <input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex" readonly>
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
							            <td>
								            <input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex">
							            </td>
							            <td>
								            <input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex">
							            </td>
							            <td>
								            <div class="image-input mt-2" data-kt-image-input="true">
												<div class="image-input-wrapper w-40px h-40px" style="background-image: url(assets/media/svg/avatars/blank_jwl.svg)"></div>
												<!--end::Preview existing avatar-->
												<!--begin::Label-->
												<label class="btn btn-icon btn-active-color-primary w-40px h-25px" data-kt-image-input-action="change" data-bs-toggle="tooltip" data-kt-initialized="1">
													<i class="bi bi-pencil-fill fs-8 ms-3"></i>
													<!--begin::Inputs-->
													<input type="file" name="add_party_redemp" accept=".png, .jpg, .jpeg">
													<input type="hidden" name="add_party_remove_redemp">
													<!--end::Inputs-->
												</label>
												<!--end::Label-->
												<!--begin::Cancel-->
												<span class="btn btn-icon btn-active-color-primary w-25px h-20px" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" data-kt-initialized="1">
													<i class="bi bi-x fs-3 ms-2"></i>
												</span>
												<!--end::Cancel-->
												<!--begin::Remove-->
												<span class="btn btn-icon btn-active-color-primary w-25px h-20px" data-kt-image-input-action="remove" data-bs-toggle="tooltip" data-kt-initialized="1">
													<i class="bi bi-x fs-3 ms-2"></i>
												</span>
												<!--end::Remove-->
											</div>
							            </td>
							            <td>
											<button class="btn btn-sm btn-success mt-2"><i class="fa-sharp fa-solid fa-plus fs-4"></i></button>&emsp;
											<button class="btn btn-sm btn-danger mt-2"><i class="la la-trash-o fs-3"></i></button>
							            </td>
							    	</tr>
							    	<tr>
							    		<td>
							            	<input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex" value="25"  readonly>
							            </td>
							            <td>
								            <input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex" readonly>
							            </td>
							            <td>
								            <input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex" readonly>
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
							            <td>
								            <input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex">
							            </td>
							            <td>
								            <input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex">
							            </td>
							            <td>
								            <div class="image-input mt-2" data-kt-image-input="true">
												<div class="image-input-wrapper w-40px h-40px" style="background-image: url(assets/media/svg/avatars/blank_jwl.svg)"></div>
												<!--end::Preview existing avatar-->
												<!--begin::Label-->
												<label class="btn btn-icon btn-active-color-primary w-40px h-25px" data-kt-image-input-action="change" data-bs-toggle="tooltip" data-kt-initialized="1">
													<i class="bi bi-pencil-fill fs-8 ms-3"></i>
													<!--begin::Inputs-->
													<input type="file" name="add_party_redemp" accept=".png, .jpg, .jpeg">
													<input type="hidden" name="add_party_remove_redemp">
													<!--end::Inputs-->
												</label>
												<!--end::Label-->
												<!--begin::Cancel-->
												<span class="btn btn-icon btn-active-color-primary w-25px h-20px" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" data-kt-initialized="1">
													<i class="bi bi-x fs-3 ms-2"></i>
												</span>
												<!--end::Cancel-->
												<!--begin::Remove-->
												<span class="btn btn-icon btn-active-color-primary w-25px h-20px" data-kt-image-input-action="remove" data-bs-toggle="tooltip" data-kt-initialized="1">
													<i class="bi bi-x fs-3 ms-2"></i>
												</span>
												<!--end::Remove-->
											</div>
							            </td>
							            <td>
											<button class="btn btn-sm btn-success mt-2"><i class="fa-sharp fa-solid fa-plus fs-4"></i></button>&emsp;
											<button class="btn btn-sm btn-danger mt-2"><i class="la la-trash-o fs-3"></i></button>
							            </td>
							    	</tr>
							    </tbody>
							</table>
						</div>
						<div class="d-flex justify-content-end mt-6 px-9">
							<button type="reset" class="btn btn-secondary me-3" data-bs-dismiss="modal">Cancel</button>
							<button type="submit" class="btn btn-primary">Save Changes</button>
						</div>
					</div>
					<!--end::Modal body-->
				</div>
				<!--end::Modal content-->
			</div>
			<!--end::Modal dialog-->
		</div>
		<!--end::Modal -add Tag Entry-->

		<!--begin::Modal - Edit tag item-->
		<div class="modal fade" id="kt_modal_edit_tag_item" tabindex="-1" aria-hidden="true">
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
							
						</div>
						<!--end::Close-->
					</div>
					<!--end::Modal header-->
					<!--begin::Modal body-->
					<div class="modal-body pt-0 pb-8 px-5 px-xl-20">
						<!--begin::Heading-->
						<div class="mb-7 text-center">
							<h1>Edit Stock Details</h1>
						</div>
						<!--end::Heading-->
						<div class="row">
							<div class="col-lg-4">
								<div class="row">
									<label class="col-lg-4 col-form-label fw-semibold fs-6">Date</label>
									<label class="col-lg-8 col-form-label fw-bold fs-6">10-02-2023</label>
									
									<label class="col-lg-4 col-form-label fw-semibold fs-6">Lot No</label>
									<label class="col-lg-8 col-form-label fw-bold fs-6">LT-0001/23</label>
									
									<label class="col-lg-4 col-form-label fw-semibold fs-6">Tag No</label>
									<label class="col-lg-8 col-form-label fw-bold fs-6">TG-0001/23</label>
									
									<label class="col-lg-4 col-form-label fw-semibold fs-6">Item Type</label>
									<label class="col-lg-8 col-form-label fw-bold fs-6">Gold</label>
								</div>
							</div>
							<div class="col-lg-4">
								<div class="row">
									<label class="col-lg-5 col-form-label fw-semibold fs-6">Item Name</label>
									<label class="col-lg-6 col-form-label fw-bold fs-6">Chain</label>
									<label class="col-lg-5 col-form-label fw-semibold fs-6">Sub Item Name</label>
									<div class="col-lg-7 fv-row fv-plugins-icon-container">
										<input type="text" name="" class="form-control form-control-lg form-control-solid" value="Hand Chain">
										<div class="fv-plugins-message-container invalid-feedback"></div>
									</div>
									<label class="col-lg-5 col-form-label fw-semibold fs-6">Weight(gms)</label>
									<div class="col-lg-7 fv-row fv-plugins-icon-container">
										<input type="text" name="" class="form-control form-control-lg form-control-solid" value="3.200">
										<div class="fv-plugins-message-container invalid-feedback"></div>
									</div>
									<label class="col-lg-5 col-form-label fw-semibold fs-6">Stone(gms)</label>
									<div class="col-lg-7 fv-row fv-plugins-icon-container">
										<input type="text" name="" class="form-control form-control-lg form-control-solid" value="0.200">
										<div class="fv-plugins-message-container invalid-feedback"></div>
									</div>
									<label class="col-lg-5 col-form-label fw-semibold fs-6">Net Wgt(gms)</label>
									<div class="col-lg-7 fv-row fv-plugins-icon-container">
										<input type="text" name="" class="form-control form-control-lg form-control-solid" value="3.400">
										<div class="fv-plugins-message-container invalid-feedback"></div>
									</div>
									<label class="col-lg-5 col-form-label fw-semibold fs-6">Pure Wgt(gms)</label>
									<div class="col-lg-7 fv-row fv-plugins-icon-container">
										<input type="text" name="" class="form-control form-control-lg form-control-solid" value="3.400">
										<div class="fv-plugins-message-container invalid-feedback"></div>
									</div>
									<label class="col-lg-5 col-form-label fw-semibold fs-6">Metal Wgt(gms)</label>
									<div class="col-lg-7 fv-row fv-plugins-icon-container">
										<input type="text" name="" class="form-control form-control-lg form-control-solid" value="3.400">
										<div class="fv-plugins-message-container invalid-feedback"></div>
									</div>
								</div>
							</div>
							<div class="col-lg-4">
								<div class="row">
									<label class="col-lg-4 col-form-label fw-semibold fs-6">Photo</label>
									<div class="col-lg-8 fv-row">
											<!--begin::Image input-->
											<div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url(assets/images/sample_jewel.jpg)">
													<!--begin::Preview existing avatar-->
													<div class="image-input-wrapper"  style="background-image: url(assets/images/sample_jewel.jpg)"></div>
													<!--end::Preview existing avatar-->
													<!--begin::Label-->
													<label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" data-kt-initialized="1">
														<i class="bi bi-pencil-fill fs-10"></i>
														<!--begin::Inputs-->
														<input type="file" name="add_party_new_loan" accept=".png, .jpg, .jpeg">
														<input type="hidden" name="add_party_remove_new_loan">
														<!--end::Inputs-->
													</label>
													<!--end::Label-->
													<!--begin::Cancel-->
													<span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" data-kt-initialized="1">
														<i class="bi bi-x fs-6"></i>
													</span>
													<!--end::Cancel-->
													<!--begin::Remove-->
													<span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" data-kt-initialized="1">
														<i class="bi bi-x fs-6"></i>
													</span>
													<!--end::Remove-->
											</div>
											<!--end::Image input-->
									</div>
								</div>
							</div>
						</div>
						<div class="mt-4 d-flex justify-content-end">
								<button type="reset" class="btn btn-secondary me-2" data-bs-dismiss="modal">Cancel</button>
								<button type="submit" class="btn btn-primary" id="">Save Changes</button>
						</div>
					</div>
					<!--end::Modal body-->
				</div>
				<!--end::Modal content-->
			</div>
			<!--end::Modal dialog-->
		</div>
		<!--end::Modal -Edit tag item-->

		<!--begin::Modal - View tag item-->
		<div class="modal fade" id="kt_modal_view_tag_item" tabindex="-1" aria-hidden="true">
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
							
						</div>
						<!--end::Close-->
					</div>
					<!--end::Modal header-->
					<!--begin::Modal body-->
					<div class="modal-body pt-0 pb-8 px-5 px-xl-20">
						<!--begin::Heading-->
						<div class="mb-7 text-center">
							<h1>Edit Stock Details</h1>
						</div>
						<!--end::Heading-->
						<div style="padding: 10px 10px 10px 10px !important;box-shadow: 0 3px 6px #00002947;border-radius: 5px;background-color: #f5f5f1 !important;">
							<div class="row">
								<div class="col-lg-4">
									<div class="row">
										<label class="col-lg-4 col-form-label fw-semibold fs-6">Date</label>
										<label class="col-lg-8 col-form-label fw-bold fs-6">10-02-2023</label>
										
										<label class="col-lg-4 col-form-label fw-semibold fs-6">Lot No</label>
										<label class="col-lg-8 col-form-label fw-bold fs-6">LT-0001/23</label>
										
										<label class="col-lg-4 col-form-label fw-semibold fs-6">Tag No</label>
										<label class="col-lg-8 col-form-label fw-bold fs-6">TG-0001/23</label>
										
										<label class="col-lg-4 col-form-label fw-semibold fs-6">Item Type</label>
										<label class="col-lg-8 col-form-label fw-bold fs-6">Gold</label>
									</div>
								</div>
								<div class="col-lg-4">
									<div class="row">
										<label class="col-lg-5 col-form-label fw-semibold fs-6">Item Name</label>
										<label class="col-lg-6 col-form-label fw-bold fs-6">Chain</label>
										<label class="col-lg-5 col-form-label fw-semibold fs-6">Sub Item Name</label>
										<label class="col-lg-6 col-form-label fw-bold fs-6">Hand Chain</label>
										<label class="col-lg-5 col-form-label fw-semibold fs-6">Weight(gms)</label>
										<label class="col-lg-6 col-form-label fw-bold fs-6">3.200</label>
										<label class="col-lg-5 col-form-label fw-semibold fs-6">Stone(gms):</label>
										<label class="col-lg-6 col-form-label fw-bold fs-6">0.200</label>
										<label class="col-lg-5 col-form-label fw-semibold fs-6">Net Wgt(gms)</label>
										<label class="col-lg-6 col-form-label fw-bold fs-4">3.400</label>
									</div>
								</div>
								<div class="col-lg-4">
									<div class="row">
										<label class="col-lg-4 col-form-label fw-semibold fs-6">Photo</label>
										<div class="col-lg-8 fv-row">
												<!--begin::Image input-->
												<div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url(assets/images/sample_jewel.jpg)">
														<!--begin::Preview existing avatar-->
														<div class="image-input-wrapper"  style="background-image: url(assets/images/sample_jewel.jpg)"></div>
														<!--end::Preview existing avatar-->
														<!--begin::Label-->
														<label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" data-kt-initialized="1">
															<i class="bi bi-pencil-fill fs-10"></i>
															<!--begin::Inputs-->
															<input type="file" name="add_party_new_loan" accept=".png, .jpg, .jpeg">
															<input type="hidden" name="add_party_remove_new_loan">
															<!--end::Inputs-->
														</label>
														<!--end::Label-->
														<!--begin::Cancel-->
														<span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" data-kt-initialized="1">
															<i class="bi bi-x fs-6"></i>
														</span>
														<!--end::Cancel-->
														<!--begin::Remove-->
														<span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" data-kt-initialized="1">
															<i class="bi bi-x fs-6"></i>
														</span>
														<!--end::Remove-->
												</div>
												<!--end::Image input-->
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="mt-4 d-flex justify-content-end">
								<button type="reset" class="btn btn-secondary me-2" data-bs-dismiss="modal">Cancel</button>
								<button type="submit" class="btn btn-primary" id="">Save Changes</button>
						</div>
					</div>
					<!--end::Modal body-->
				</div>
				<!--end::Modal content-->
			</div>
			<!--end::Modal dialog-->
		</div>
		<!--end::Modal -View tag item-->

		<!--begin::Modal - Verify tag entry-->
		<div class="modal fade" id="kt_modal_verify_tag_entry" tabindex="-1" aria-hidden="true">
			<!--begin::Modal dialog-->
			<div class="modal-dialog modal-m">
				<!--begin::Modal content-->
				<div class="modal-content rounded">
					<div class="swal2-icon swal2-warning swal2-icon-show" style="display: flex;">
						<div class="swal2-icon-content">&#x2713;</div></div>
						<div class="swal2-html-container" id="swal2-html-container" style="display: block;">
							<b><span>TG-0001/23</span><span> - Chain </span><span>- Hand Chain<br></span></b>
							<p class="mt-2">Are you sure you want to Approve?</p></div>
						<div class="d-flex flex-center flex-row-fluid pt-12">
							<button type="submit" class="btn btn-primary me-3" data-bs-dismiss="modal">Yes</button>
							<button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
						</div><br><br>
				</div>
				<!--end::Modal content-->
			</div>
			<!--end::Modal dialog-->
		</div>
		<!--end::Modal - Verify tag entry-->

		<div class="modal fade" id="kt_modal_update_tag_entry" tabindex="-1" aria-hidden="true">
			<!--begin::Modal dialog-->
			<div class="modal-dialog modal-md">
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
							
						</div>
						<!--end::Close-->
					</div>
					<!--end::Modal header-->
					<!--begin::Modal body-->
					<div class="modal-body pt-0 pb-8 px-5 px-xl-20">
						<!--begin::Heading-->
						<div class="mb-7 text-center">
							<h1>Update Tagged Item</h1>
						</div>
						<!--end::Heading-->
						<div class="row">
							<label class="col-lg-4 col-form-label fw-semibold fs-6">Description</label>
							<div class="col-lg-8 fv-row fv-plugins-icon-container">
								<textarea class="form-control form-select-solid fw-semibold fs-5" rows="4" id=""></textarea>
								<div class="fv-plugins-message-container invalid-feedback"></div>
							</div>
						</div>
						<div class="mt-4 d-flex justify-content-center">
								<button type="reset" class="btn btn-secondary me-2" data-bs-dismiss="modal">Cancel</button>
								<button type="submit" class="btn btn-primary" id="">Update</button>
						</div>
					</div>
					<!--end::Modal body-->
				</div>
				<!--end::Modal content-->
			</div>
			<!--end::Modal dialog-->
		</div>

		<!--begin::Modal - Convert to Nontag entry-->
		<div class="modal fade" id="kt_modal_convert_to_non_tag_item" tabindex="-1" aria-hidden="true">
			<!--begin::Modal dialog-->
			<div class="modal-dialog modal-m">
				<!--begin::Modal content-->
				<div class="modal-content rounded">
					<div class="swal2-icon swal2-warning swal2-icon-show" style="display: flex;">
						<div class="swal2-icon-content">!</div></div>
						<div class="swal2-html-container" id="swal2-html-container" style="display: block;">
							<b><span>TG-0001/23</span><span> - Chain </span><span>- Hand Chain<br></span></b>
							<p class="mt-2">Are you sure Convert to Non Tag ?</p></div>
						<div class="d-flex flex-center flex-row-fluid pt-12">
							<button type="submit" class="btn btn-primary me-3" data-bs-dismiss="modal">Yes</button>
							<button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
						</div><br><br>
				</div>
				<!--end::Modal content-->
			</div>
			<!--end::Modal dialog-->
		</div>
		<!--end::Modal - Convert to Nontag entry-->


		<?php $this->load->view("script");?>

		<!-- <script src="js/products-list.js"></script> -->
		<!-- tagged list approved day fillter start -->

		
		<script>
			function date_fill_tagged_approved()
			{
				var dt_fill_tagged_approved = document.getElementById('dt_fill_tagged_approved').value;
				var today_dt_tagged_approved = document.getElementById('today_dt_tagged_approved');
				var week_from_dt_tagged_approved = document.getElementById('week_from_dt_tagged_approved');
				var week_to_dt_tagged_approved = document.getElementById('week_to_dt_tagged_approved');
				var monthly_dt_tagged_approved = document.getElementById('monthly_dt_tagged_approved');
				var from_dt_tagged_approved = document.getElementById('from_dt_tagged_approved');
				var to_dt_tagged_approved = document.getElementById('to_dt_tagged_approved');
				var from_date_fillter_tagged_approved = document.getElementById('from_date_fillter_tagged_approved');
				var to_date_fillter_tagged_approved = document.getElementById('to_date_fillter_tagged_approved');

				if (dt_fill_tagged_approved == "today") 
				{
					today_dt_tagged_approved.style.display = "block";
					monthly_dt_tagged_approved.style.display = "none";
					from_dt_tagged_approved.style.display = "none";
					to_dt_tagged_approved.style.display = "none";
					week_from_dt_tagged_approved.style.display = "none";
					week_to_dt_tagged_approved.style.display = "none";
					$("#today_date_fillter_tagged_approved").flatpickr({
								dateFormat: "d-m-Y",
							});
				}
				else if (dt_fill_tagged_approved == "week")
				{
					today_dt_tagged_approved.style.display = "none";
					week_from_dt_tagged_approved.style.display = "block";
					week_to_dt_tagged_approved.style.display = "block";
					monthly_dt_tagged_approved.style.display = "none";
					from_dt_tagged_approved.style.display = "none";
					to_dt_tagged_approved.style.display = "none";

					var curr = new Date; // get current date
					var first = curr.getDate() - curr.getDay(); // First day is the day of the month - the day of the week
					var last = first + 6; // last day is the first day + 6

					var firstday = new Date(curr.setDate(first)).toISOString().slice(0,10);
					firstday = firstday.split("-").reverse().join("-");
					var lastday = new Date(curr.setDate(last)).toISOString().slice(0,10);
					lastday = lastday.split("-").reverse().join("-");
					$('#week_from_date_fillter_tagged_approved').val(firstday);
					$('#week_to_date_fillter_tagged_approved').val(lastday);
					
				}
				else if (dt_fill_tagged_approved == "monthly")
				{
					today_dt_tagged_approved.style.display = "none";
					monthly_dt_tagged_approved.style.display = "block";
					from_dt_tagged_approved.style.display = "none";
					to_dt_tagged_approved.style.display = "none";
					week_from_dt_tagged_approved.style.display = "none";
					week_to_dt_tagged_approved.style.display = "none";
					$("#monthly_date_fillter_tagged_approved").flatpickr({
								dateFormat: "m-Y",
							});
				}
				else if (dt_fill_tagged_approved == "custom Date")
				{
					today_dt_tagged_approved.style.display = "none";
					monthly_dt_tagged_approved.style.display = "none";
					from_dt_tagged_approved.style.display = "block";
					to_dt_tagged_approved.style.display = "block";
					week_from_dt_tagged_approved.style.display = "none";
					week_to_dt_tagged_approved.style.display = "none";

					$("#from_date_fillter_tagged_approved").flatpickr({
								dateFormat: "d-m-Y",
							});
					$("#to_date_fillter_tagged_approved").flatpickr({
								dateFormat: "d-m-Y",
							});
				}
				else
				{
					today_dt_tagged_approved.style.display = "none";
					monthly_dt_tagged_approved.style.display = "none";
					from_dt_tagged_approved.style.display = "none";
					to_dt_tagged_approved.style.display = "none";
					week_from_dt_tagged_approved.style.display = "none";
					week_to_dt_tagged_approved.style.display = "none";
				}
			}
		</script>
		<!-- tagged list approved day fillter end -->

		<!-- tagged list waiting approved day fillter start -->
		<script>
			function date_fill_tagged_waiting_approved()
			{
				var dt_fill_tagged_waiting_approved = document.getElementById('dt_fill_tagged_waiting_approved').value;
				var today_dt_tagged_waiting_approved = document.getElementById('today_dt_tagged_waiting_approved');
				var week_from_dt_tagged_waiting_approved = document.getElementById('week_from_dt_tagged_waiting_approved');
				var week_to_dt_tagged_waiting_approved = document.getElementById('week_to_dt_tagged_waiting_approved');
				var monthly_dt_tagged_waiting_approved = document.getElementById('monthly_dt_tagged_waiting_approved');
				var from_dt_tagged_waiting_approved = document.getElementById('from_dt_tagged_waiting_approved');
				var to_dt_tagged_waiting_approved = document.getElementById('to_dt_tagged_waiting_approved');
				var from_date_fillter_tagged_waiting_approved = document.getElementById('from_date_fillter_tagged_waiting_approved');
				var to_date_fillter_tagged_waiting_approved = document.getElementById('to_date_fillter_tagged_waiting_approved');

				if (dt_fill_tagged_waiting_approved == "today") 
				{
					today_dt_tagged_waiting_approved.style.display = "block";
					monthly_dt_tagged_waiting_approved.style.display = "none";
					from_dt_tagged_waiting_approved.style.display = "none";
					to_dt_tagged_waiting_approved.style.display = "none";
					week_from_dt_tagged_waiting_approved.style.display = "none";
					week_to_dt_tagged_waiting_approved.style.display = "none";
					$("#today_date_fillter_tagged_waiting_approved").flatpickr({
								dateFormat: "d-m-Y",
							});
				}
				else if (dt_fill_tagged_waiting_approved == "week")
				{
					today_dt_tagged_waiting_approved.style.display = "none";
					week_from_dt_tagged_waiting_approved.style.display = "block";
					week_to_dt_tagged_waiting_approved.style.display = "block";
					monthly_dt_tagged_waiting_approved.style.display = "none";
					from_dt_tagged_waiting_approved.style.display = "none";
					to_dt_tagged_waiting_approved.style.display = "none";

					var curr = new Date; // get current date
					var first = curr.getDate() - curr.getDay(); // First day is the day of the month - the day of the week
					var last = first + 6; // last day is the first day + 6

					var firstday = new Date(curr.setDate(first)).toISOString().slice(0,10);
					firstday = firstday.split("-").reverse().join("-");
					var lastday = new Date(curr.setDate(last)).toISOString().slice(0,10);
					lastday = lastday.split("-").reverse().join("-");
					$('#week_from_date_fillter_tagged_waiting_approved').val(firstday);
					$('#week_to_date_fillter_tagged_waiting_approved').val(lastday);
					
				}
				else if (dt_fill_tagged_waiting_approved == "monthly")
				{
					today_dt_tagged_waiting_approved.style.display = "none";
					monthly_dt_tagged_waiting_approved.style.display = "block";
					from_dt_tagged_waiting_approved.style.display = "none";
					to_dt_tagged_waiting_approved.style.display = "none";
					week_from_dt_tagged_waiting_approved.style.display = "none";
					week_to_dt_tagged_waiting_approved.style.display = "none";
					$("#monthly_date_fillter_tagged_waiting_approved").flatpickr({
								dateFormat: "m-Y",
							});
				}
				else if (dt_fill_tagged_waiting_approved == "custom Date")
				{
					today_dt_tagged_waiting_approved.style.display = "none";
					monthly_dt_tagged_waiting_approved.style.display = "none";
					from_dt_tagged_waiting_approved.style.display = "block";
					to_dt_tagged_waiting_approved.style.display = "block";
					week_from_dt_tagged_waiting_approved.style.display = "none";
					week_to_dt_tagged_waiting_approved.style.display = "none";

					$("#from_date_fillter_tagged_waiting_approved").flatpickr({
								dateFormat: "d-m-Y",
							});
					$("#to_date_fillter_tagged_waiting_approved").flatpickr({
								dateFormat: "d-m-Y",
							});
				}
				else
				{
					today_dt_tagged_waiting_approved.style.display = "none";
					monthly_dt_tagged_waiting_approved.style.display = "none";
					from_dt_tagged_waiting_approved.style.display = "none";
					to_dt_tagged_waiting_approved.style.display = "none";
					week_from_dt_tagged_waiting_approved.style.display = "none";
					week_to_dt_tagged_waiting_approved.style.display = "none";
				}
			}
		</script>
		<!-- tagged list waiting approved day fillter end -->
		<script>
			      $("#kt_datatable_responsive_approved").kendoTooltip({
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
			      $("#kt_datatable_responsive_not_approved").kendoTooltip({
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
			$("#add_tagentry_date").flatpickr({
				dateFormat: "d-m-Y",});
		</script>
		<script>
			$("#add_tagentry_table").DataTable({
				//"aaSorting":[],
				"sorting":false,
				"paging": false,
				// "responsive": true,
				 "language": {
				  "lengthMenu": "Show _MENU_",
				 },
				 "dom":
				  "<'row'" +
				  "<'col-sm-6 d-flex align-items-center justify-conten-start'l>" +
				  ">" +

				  "<'table-responsive'tr>" +

				  "<'row'" +
				  "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
				  "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
				  ">"
				});
			$('#add_tagentry_table').wrap('<div class="dataTables_scroll" />');
		</script>
		<!-- tagged day fillter start -->
		<script>
			function date_fill()
			{
				var dt_fill = document.getElementById('dt_fill').value;
				var today_dt = document.getElementById('today_dt');
				var week_from_dt = document.getElementById('week_from_dt');
				var week_to_dt = document.getElementById('week_to_dt');
				var monthly_dt = document.getElementById('monthly_dt');
				var from_dt = document.getElementById('from_dt');
				var to_dt = document.getElementById('to_dt');
				var from_date_fillter = document.getElementById('from_date_fillter');
				var to_date_fillter = document.getElementById('to_date_fillter');

				if (dt_fill == "today") 
				{
					today_dt.style.display = "block";
					monthly_dt.style.display = "none";
					from_dt.style.display = "none";
					to_dt.style.display = "none";
					week_from_dt.style.display = "none";
					week_to_dt.style.display = "none";
					$("#today_date_fillter").flatpickr({
								dateFormat: "d-m-Y",
							});
				}
				else if (dt_fill == "week")
				{
					today_dt.style.display = "none";
					week_from_dt.style.display = "block";
					week_to_dt.style.display = "block";
					monthly_dt.style.display = "none";
					from_dt.style.display = "none";
					to_dt.style.display = "none";

					var curr = new Date; // get current date
					var first = curr.getDate() - curr.getDay(); // First day is the day of the month - the day of the week
					var last = first + 6; // last day is the first day + 6

					var firstday = new Date(curr.setDate(first)).toISOString().slice(0,10);
					firstday = firstday.split("-").reverse().join("-");
					var lastday = new Date(curr.setDate(last)).toISOString().slice(0,10);
					lastday = lastday.split("-").reverse().join("-");
					$('#week_from_date_fillter').val(firstday);
					$('#week_to_date_fillter').val(lastday);
					
				}
				else if (dt_fill == "monthly")
				{
					today_dt.style.display = "none";
					monthly_dt.style.display = "block";
					from_dt.style.display = "none";
					to_dt.style.display = "none";
					week_from_dt.style.display = "none";
					week_to_dt.style.display = "none";
					$("#monthly_date_fillter").flatpickr({
								dateFormat: "m-Y",
							});
				}
				else if (dt_fill == "custom Date")
				{
					today_dt.style.display = "none";
					monthly_dt.style.display = "none";
					from_dt.style.display = "block";
					to_dt.style.display = "block";
					week_from_dt.style.display = "none";
					week_to_dt.style.display = "none";

					$("#from_date_fillter").flatpickr({
								dateFormat: "d-m-Y",
							});
					$("#to_date_fillter").flatpickr({
								dateFormat: "d-m-Y",
							});
				}
				else
				{
					today_dt.style.display = "none";
					monthly_dt.style.display = "none";
					from_dt.style.display = "none";
					to_dt.style.display = "none";
					week_from_dt.style.display = "none";
					week_to_dt.style.display = "none";
				}
			}
		</script>
		<!-- tagged day fillter end -->
		<!-- waiting tagged day fillter start -->
		<script>
			function date_fill_wait()
			{
				var dt_fill_wait = document.getElementById('dt_fill_wait').value;
				var today_dt_wait = document.getElementById('today_dt_wait');
				var week_from_dt_wait = document.getElementById('week_from_dt_wait');
				var week_to_dt_wait = document.getElementById('week_to_dt_wait');
				var monthly_dt_wait = document.getElementById('monthly_dt_wait');
				var from_dt_wait = document.getElementById('from_dt_wait');
				var to_dt_wait = document.getElementById('to_dt_wait');
				var from_date_fillter_wait = document.getElementById('from_date_fillter_wait');
				var to_date_fillter_wait = document.getElementById('to_date_fillter_wait');

				if (dt_fill_wait == "today") 
				{
					today_dt_wait.style.display = "block";
					monthly_dt_wait.style.display = "none";
					from_dt_wait.style.display = "none";
					to_dt_wait.style.display = "none";
					week_from_dt_wait.style.display = "none";
					week_to_dt_wait.style.display = "none";
					$("#today_date_fillter_wait").flatpickr({
								dateFormat: "d-m-Y",
							});
				}
				else if (dt_fill_wait == "week")
				{
					today_dt_wait.style.display = "none";
					week_from_dt_wait.style.display = "block";
					week_to_dt_wait.style.display = "block";
					monthly_dt_wait.style.display = "none";
					from_dt_wait.style.display = "none";
					to_dt_wait.style.display = "none";

					var curr = new Date; // get current date
					var first = curr.getDate() - curr.getDay(); // First day is the day of the month - the day of the week
					var last = first + 6; // last day is the first day + 6

					var firstday = new Date(curr.setDate(first)).toISOString().slice(0,10);
					firstday = firstday.split("-").reverse().join("-");
					var lastday = new Date(curr.setDate(last)).toISOString().slice(0,10);
					lastday = lastday.split("-").reverse().join("-");
					$('#week_from_date_fillter_wait').val(firstday);
					$('#week_to_date_fillter_wait').val(lastday);
					
				}
				else if (dt_fill_wait == "monthly")
				{
					today_dt_wait.style.display = "none";
					monthly_dt_wait.style.display = "block";
					from_dt_wait.style.display = "none";
					to_dt_wait.style.display = "none";
					week_from_dt_wait.style.display = "none";
					week_to_dt_wait.style.display = "none";
					$("#monthly_date_fillter_wait").flatpickr({
								dateFormat: "m-Y",
							});
				}
				else if (dt_fill_wait == "custom Date")
				{
					today_dt_wait.style.display = "none";
					monthly_dt_wait.style.display = "none";
					from_dt_wait.style.display = "block";
					to_dt_wait.style.display = "block";
					week_from_dt_wait.style.display = "none";
					week_to_dt_wait.style.display = "none";

					$("#from_date_fillter_wait").flatpickr({
								dateFormat: "d-m-Y",
							});
					$("#to_date_fillter_wait").flatpickr({
								dateFormat: "d-m-Y",
							});
				}
				else
				{
					today_dt_wait.style.display = "none";
					monthly_dt_wait.style.display = "none";
					from_dt_wait.style.display = "none";
					to_dt_wait.style.display = "none";
					week_from_dt_wait.style.display = "none";
					week_to_dt_wait.style.display = "none";
				}
			}
		</script>
		<!-- waiting tagged day fillter end -->
		<script>
			
			// $("#from_date_fillter").flatpickr({
			// 					dateFormat: "d-m-Y",
			// 				});
			// $("#to_date_fillter").flatpickr({
			// 					dateFormat: "d-m-Y",
			// 				});



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

			$("#kt_datatable_responsive_approved").DataTable({
				
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

				$("#kt_datatable_responsive_not_approved").DataTable({
				
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