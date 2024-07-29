<?php include "common.php"?>
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
    background-color: #fff;
    z-index: 2;
  }
</style>
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
				<?php include "sidebar.php"?>
				<!--begin::Wrapper-->
				<div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
				<?php include "header.php"?>
				<!--begin::Toolbar-->
					<div class="toolbar py-2" id="kt_toolbar">
						<!--begin::Container-->
						<div id="kt_toolbar_container" class="container-fluid d-flex align-items-center">
							<!--begin::Page title-->
							<div class="flex-grow-1 flex-shrink-0 me-5">
								<!--begin::Page title-->
								<div data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
									<!--begin::Title-->
									<h1 class="d-flex align-items-center text-dark fw-bold my-1 fs-3">Jewel Final Settlement List
									<!--begin::Separator-->
									<span class="h-20px border-gray-400 border-start ms-3 mx-2"></span>
									<!-- <label class="d-flex align-items-center text-primary fw-bold my-1 fs-5">
										<span>Company &emsp;-</span>
										<span>&emsp;All</span>
									</label>
									<span class="h-20px border-gray-400 border-start ms-3 mx-2"></span>
									<label class="d-flex align-items-center text-primary fw-bold my-1 fs-5">
										<span>Status &emsp;-</span>
										<span>&emsp;All</span>
									</label>
									<span class="h-20px border-gray-400 border-start ms-3 mx-2"></span>
									<label class="d-flex align-items-center text-primary fw-bold my-1 fs-5">
										<span>Date &emsp;-</span>
										<span>&emsp;Today</span>
									</label> -->
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
											<div class="row">
												<div class="col-lg-8">
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
																	<select class="form-select form-select-solid fw-semibold" data-control="select2" data-close-on-select="true" data-allow-clear="true" multiple="multiple">	
																		<option value="all" selected>All</option>
																		<option value="1">AGB Main Branch Sayalkudi</option>
																		<option value="2">AGB Pernali Branch</option>
																	</select>
																</div>
																<div class="mb-2">
																	<label class="form-label fs-6 fw-semibold">Loan No</label>
																	<input type="text" class="form-control form-control-lg form-control-solid">
																</div>
																<div class="mb-2">
																	<label class="form-label fs-6 fw-semibold">Party</label>
																	<input type="text" class="form-control form-control-lg form-control-solid">
																</div>
																<div class="mb-2">
																	<label class="form-label fs-6 fw-semibold">Jewel Type</label>
																	<select class="form-select form-select-solid fw-semibold" data-control="select2" data-close-on-select="true" data-allow-clear="true" multiple="multiple">	
																		<option value="all" selected>All</option>
																		<option value="1">Gold</option>
																		<option value="2">Silver</option>
																	</select>
																</div>
																<div class="mb-2">
																	<label class="form-label fs-6 fw-semibold">Status</label>
																	<select class="form-select form-select-solid fw-semibold" data-control="select2" data-close-on-select="true" data-allow-clear="true" multiple="multiple">	
																		<option value="all" selected>All</option>
																		<option value="1">Customer Close</option>
																		<option value="2">Company Close</option>
																		<option value="3">Customer Sale</option>
																		<option value="4">Multi Jewel</option>
																	</select>
																</div>
																<div class="mb-2">
																	<label class="form-label">Date</label>
																	<select class="form-select form-select-solid" data-control="select2" data-hide-search="true" id="dt_fill_loan_list" onchange="date_fill_loan_list();">	
																		<option value="all">All</option>
																		<option value="today">Today</option>
																		<option value="week">This Week</option>
																		<option value="monthly">This Month</option>
																		<option value="custom Date">Custom Date</option>
																	</select>
																</div>
																<div class="mb-2 fv-row" id="today_dt_loan_list" style="display:none;">
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
																		<input class="form-control form-control-solid ps-12" name="" placeholder="Date" id="today_date_fillter_loan_list" value="<?php echo date("d-m-Y"); ?>" disabled />
																	</div>
																</div>
																<div class="mb-2 fv-row" id="week_from_dt_loan_list" style="display:none;">
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
																		<input class="form-control form-control-solid ps-12" name="" placeholder="Date" id="week_from_date_fillter_loan_list" value="" disabled />
																	</div>
																</div>
																<div class="mb-2 fv-row" id="week_to_dt_loan_list" style="display:none;">
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
																		<input class="form-control form-control-solid ps-12" name="" placeholder="Date" id="week_to_date_fillter_loan_list" value="<?php echo date("d-m-Y"); ?>" disabled />
																	</div>
																</div>
																<div class="mb-2 fv-row" id="monthly_dt_loan_list" style="display:none;">
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
																		<input class="form-control form-control-solid ps-12" name="" placeholder="Month" id="monthly_date_fillter_loan_list" value="<?php echo date("m-Y"); ?>" />
																	</div>
																</div>
																<div class="mb-2 fv-row" id="from_dt_loan_list" style="display:none;">
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
																		<input class="form-control form-control-solid ps-12" name="" placeholder="From Date" id="from_date_fillter_loan_list" value="<?php echo date("d-m-Y"); ?>" />
																	</div>
																</div>
																<div class="mb-2 fv-row" id="to_dt_loan_list" style="display:none;">
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
																		<input class="form-control form-control-solid ps-12" name="" placeholder="To Date" id="to_date_fillter_loan_list" value="<?php echo date("d-m-Y"); ?>"/>
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
												</div>
											</div>
											<table class="table align-middle table-hover fs-7 gy-1 gs-2" id="kt_datatable_dom_positioning">
												<!--begin::Table head-->
												<thead>
													<!--begin::Table row-->
													<tr class="text-start text-muted fw-bold fs-7 gs-0">
														<th class="min-w-25px">Sno</th>
														<th class="min-w-25px">Date</th>
														<th class="min-w-100px">Company</th>
														<th class="min-w-125px">Loan No</th>
														<th class="min-w-100px">Party Info</th>
														<th class="min-w-100px">Scheme - Int</th>
														<th class="min-w-80px">Jewel Type</th>
														<th class="min-w-80px">No of Item</th>
														<th class="min-w-25px">Paid Amt</th>
														<th class="min-w-200px">Status</th>
														<th class="min-w-80px"><span class="text-end">Actions</span></th>
													</tr>
													<!--end::Table row-->
												</thead>
												<!--end::Table head-->
												<!--begin::Table body-->
												<tbody class="text-gray-600 fw-semibold">
													<tr>
														<td>1</td>
														<td>20/01/2023</td>
														<td class="ple1">AGB - Main Branch Sayalkudi</td>
														<td class="ple1">
															<span>MIP-256/23</span>
															<!-- <span style="text-align: center;">-</span> -->
															<span class="btn btn-icon btn-circle fs-8 fw-bold shadow text-white mb-1" style="background:red;width: 20px !important;height: 20px !important;float: right;">BJ</span>
														</td>
														<td class="ple1">
															<span><i class="fa-solid fa-star fs-7" style="color:#50cd89;"></i></span>
															<span class="align-items-center">Abishek</span>
														</td>
														<td>MIP - 2.5</td>
														<td>Gold</td>
														<td>2</td>
														<td class="ple1">10000.00</td>
														<td>
															<label class="col-form-label fw-semibold fs-7" name="" id="" ><span style="background-color:#ffdf6f;border-radius: 8px;padding: 5px 15px 5px 15px;">Customer Close</span>
															</label>
														</td>
														<td>
															<span class="text-end">
																<a href="fsd_view.php" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm" title="View">
																	<i class="bi bi-eye-fill eyc"></i>
																</a>
																<button class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
																	<i class="fas fa-ellipsis-v eyc"></i>
																</button>
																<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px py-3" data-kt-menu="true" style="">
																	<div class="menu-item px-3">
																		<a href="fsd.php" target="_blank" class="menu-link px-3">Jewel Settlement</a>
																	</div>
																</div>
																<!-- <a href="fsd.php" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm" title="Jewel Settlement">
																	<i class="fas fa-box fs-3" title="Jewel Settlement"></i>
																</a> -->
															</span>
														</td>
													</tr>
													<tr>
														<td>2</td>
														<td>26/01/2023</td>
														<td class="ple1">AGB - Main Branch Sayalkudi</td>
														<td class="ple1">
															<span>MIP-260/23</span>
															<!-- <span style="text-align: center;">-</span> -->
															<span class="btn btn-icon btn-circle fs-8 fw-bold shadow text-white mb-1" style="background:red;width: 20px !important;height: 20px !important;float: right;">LI</span>
														</td>
														<td class="ple1">
															<span><i class="fa-solid fa-star fs-7" style="color:red;"></i></span>
															<span class="align-items-center">Aashik</span>
														</td>
														<td>MIP - 2.5</td>
														<td>Gold</td>
														<td>3</td>
														<td class="ple1">10000.00</td>
														<td>
															<label class="col-form-label fw-semibold fs-7" name="" id="" ><span style="background-color:#b0dfff;border-radius: 8px;padding: 5px 15px 5px 15px;">Company Close</span>
															</label>
														</td>
														<td>
															<span class="text-end">
																<a href="fsd_view.php" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm" title="View">
																	<i class="bi bi-eye-fill eyc"></i>
																</a>
																<button class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
																	<i class="fas fa-ellipsis-v eyc"></i>
																</button>
																<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px py-3" data-kt-menu="true" style="">
																	<div class="menu-item px-3">
																		<a href="javascript:;" class="menu-link flex-stack px-3" data-bs-toggle="modal" data-bs-target="#kt_modal_verify_lockout">Lock Out</a>
																	</div>
																	<div class="menu-item px-3">
																		<a href="javascript:;" class="menu-link flex-stack px-3" data-bs-toggle="modal" data-bs-target="#kt_modal_update_pledge_items">Update Pledge</a>
																	</div>
																	<div class="menu-item px-3">
																		<a href="javascript:;" class="menu-link flex-stack px-3" data-bs-toggle="modal" data-bs-target="#convert_old_gold">Convert Old Gold</a>
																	</div>
																</div>
															</span>
														</td>
													</tr>
													<tr>
														<td>3</td>
														<td>03/02/2023</td>
														<td class="ple1">AGB - Main Branch Sayalkudi</td>
														<td class="ple1">
															<span>TIP-86/23</span>
															<!-- <span style="text-align: center;">-</span> -->
															<!-- <span class="btn btn-icon btn-circle fs-8 fw-bold shadow text-white mb-1" style="background:red;width: 20px !important;height: 20px !important;float: right;">LO</span> -->
														</td>
														<td class="ple1">
															<span><i class="fa-solid fa-star fs-7" style="color:#ffc700;"></i></span>
															<span class="align-items-center">Senthil</span>
														</td>
														<td>TIP - 2.5</td>
														<td>Gold</td>
														<td>2</td>
														<td class="ple1">32000.00</td>
														<td>
															<label class="col-form-label fw-semibold fs-7" name="" id="" ><span style="background-color:#fbe2d5;border-radius: 8px;padding: 5px 15px 5px 15px;">Customer Sale</span>
															</label>
														</td>
														<td>
															<span class="text-end">
																<a href="fsd_view.php" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm" title="View">
																	<i class="bi bi-eye-fill eyc"></i>
																</a>
																<button class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
																	<i class="fas fa-ellipsis-v eyc"></i>
																</button>
																<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px py-3" data-kt-menu="true" style="">
																	<div class="menu-item px-3">
																		<a href="javascript:;" class="menu-link flex-stack px-3" data-bs-toggle="modal" data-bs-target="#kt_modal_update_pledge_items">Update Pledge</a>
																	</div>
																	<div class="menu-item px-3">
																		<a href="javascript:;" class="menu-link flex-stack px-3" data-bs-toggle="modal" data-bs-target="#convert_old_gold">Convert Old Gold</a>
																	</div>
																</div>
															</span>
														</td>
													</tr>
													<tr>
														<td>4</td>
														<td>14/03/2023</td>
														<td class="ple1">AGB - Main Branch Sayalkudi</td>
														<td class="ple1">
															<span>SIP-26/23</span>
															<!-- <span style="text-align: center;">-</span> -->
															<!-- <span class="btn btn-icon btn-circle fs-8 fw-bold shadow text-white mb-1" style="background:red;width: 20px !important;height: 20px !important;float: right;">LO</span> -->
														</td>
														<td class="ple1">
															<span><i class="fa-solid fa-star fs-7" style="color:#50cd89;"></i></span>
															<span class="align-items-center">Pandi</span>
														</td>
														<td>SIP - 2.5</td>
														<td>Gold</td>
														<td>1</td>
														<td class="ple1">14000.00</td>
														<td>
															<label class="col-form-label fw-semibold fs-7" name="" id="" ><span style="background-color:#a3ff9b;border-radius: 8px;padding: 5px 15px 5px 15px;">Multi Jewel</span>
															</label>
														</td>
														<td>
															<span class="text-end">
																<a href="fsd_view.php" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm" title="View">
																	<i class="bi bi-eye-fill eyc"></i>
																</a>
																<button class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
																	<i class="fas fa-ellipsis-v eyc"></i>
																</button>
																<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px py-3" data-kt-menu="true" style="">
																	<div class="menu-item px-3">
																		<a href="fsd.php" target="_blank" class="menu-link px-3">Jewel Settlement</a>
																	</div>
																</div>
															</span>
														</td>
													</tr>
													<tr class="bg-success" style="pointer-events: none;">
														<td>5</td>
														<td>19/03/2023</td>
														<td class="ple1">AGB - Main Branch Sayalkudi</td>
														<td class="ple1">
															<span>TIP-354/23</span>
														</td>
														<td class="ple1">
															<span><i class="fa-solid fa-star fs-7" style="color:#50cd89;"></i></span>
															<span class="align-items-center">Prbhakaran</span>
														</td>
														<td>TIP - 2.5</td>
														<td>Gold</td>
														<td>1</td>
														<td class="ple1">19000.00</td>
														<td>
															<label class="col-form-label fw-semibold fs-7" name="" id="" ><span style="background-color:#ffdf6f;border-radius: 8px;padding: 5px 15px 5px 15px;">Customer Close</span>
															</label>
														</td>
														<td>
															<span class="text-end">
																<a href="fsd_view.php" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm" title="View">
																	<i class="bi bi-eye-fill eyc"></i>
																</a>
															</span>
														</td>
													</tr>
												</tbody>
											</table>
											<!-- <div class="mb-5 hover-scroll-x">
													<div class="d-grid">
														<ul class="nav nav-tabs flex-nowrap text-nowrap">
															<li class="nav-item">
																<a class="nav-link active btn btn-active-light btn-color-black-800 btn-active-color-primary rounded-bottom-0 fw-bold fs-6" data-bs-toggle="tab" href="#kt_tab_pane_1">Opened</a>
															</li>
															<li class="nav-item">
																<a class="nav-link btn btn-active-light btn-color-black-800 btn-active-color-primary rounded-bottom-0 fw-bold fs-6" data-bs-toggle="tab" href="#kt_tab_pane_2">Closed</a>
															</li>
														</ul>
													</div>
												</div>
												<div class="tab-content" id="myTabContent">
													<div class="tab-pane fade show active" id="kt_tab_pane_1" role="tabpanel">
														<div class="row">
															<div class="col-lg-8">
															</div>
															<div class="col-lg-4">
																<div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
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
																				<label class="form-label fs-6 fw-semibold">Loan No</label>
																				<input type="text" class="form-control form-control-lg form-control-solid">
																			</div>
																			<div class="mb-2">
																				<label class="form-label fs-6 fw-semibold">Party</label>
																				<input type="text" class="form-control form-control-lg form-control-solid">
																			</div>
																			<div class="mb-2">
																				<label class="form-label fs-6 fw-semibold">Jewel Type</label>
																				<select class="form-select form-select-solid fw-semibold" data-control="select2" data-close-on-select="true" data-allow-clear="true" multiple="multiple">	
																					<option value="all" selected>All</option>
																					<option value="1">Gold</option>
																					<option value="2">Silver</option>
																				</select>
																			</div>
																			<div class="mb-2">
																				<label class="form-label fs-6 fw-semibold">Status</label>
																				<select class="form-select form-select-solid fw-semibold" data-control="select2" data-close-on-select="true" data-allow-clear="true" multiple="multiple">	
																					<option value="all" selected>All</option>
																					<option value="1">Customer Close</option>
																					<option value="2">Company Close</option>
																					<option value="3">Customer Sale</option>
																					<option value="4">Multi Jewel</option>
																				</select>
																			</div>
																			<div class="mb-2">
																				<label class="form-label">Date</label>
																				<select class="form-select form-select-solid" data-control="select2" data-hide-search="true" id="dt_fill_loan_list" onchange="date_fill_loan_list();">	
																					<option value="all">All</option>
																					<option value="today">Today</option>
																					<option value="week">This Week</option>
																					<option value="monthly">This Month</option>
																					<option value="custom Date">Custom Date</option>
																				</select>
																			</div>
																			<div class="mb-2 fv-row" id="today_dt_loan_list" style="display:none;">
																				<label class="form-label">Today</label>
																				<div class="d-flex align-items-center">
																					<span class="svg-icon position-absolute ms-4 svg-icon-2 dt">
																						<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																							<path opacity="0.3" d="M21 22H3C2.4 22 2 21.6 2 21V5C2 4.4 2.4 4 3 4H21C21.6 4 22 4.4 22 5V21C22 21.6 21.6 22 21 22Z" fill="currentColor" />
																							<path d="M6 6C5.4 6 5 5.6 5 5V3C5 2.4 5.4 2 6 2C6.6 2 7 2.4 7 3V5C7 5.6 6.6 6 6 6ZM11 5V3C11 2.4 10.6 2 10 2C9.4 2 9 2.4 9 3V5C9 5.6 9.4 6 10 6C10.6 6 11 5.6 11 5ZM15 5V3C15 2.4 14.6 2 14 2C13.4 2 13 2.4 13 3V5C13 5.6 13.4 6 14 6C14.6 6 15 5.6 15 5ZM19 5V3C19 2.4 18.6 2 18 2C17.4 2 17 2.4 17 3V5C17 5.6 17.4 6 18 6C18.6 6 19 5.6 19 5Z" fill="currentColor" />
																							<path d="M8.8 13.1C9.2 13.1 9.5 13 9.7 12.8C9.9 12.6 10.1 12.3 10.1 11.9C10.1 11.6 10 11.3 9.8 11.1C9.6 10.9 9.3 10.8 9 10.8C8.8 10.8 8.59999 10.8 8.39999 10.9C8.19999 11 8.1 11.1 8 11.2C7.9 11.3 7.8 11.4 7.7 11.6C7.6 11.8 7.5 11.9 7.5 12.1C7.5 12.2 7.4 12.2 7.3 12.3C7.2 12.4 7.09999 12.4 6.89999 12.4C6.69999 12.4 6.6 12.3 6.5 12.2C6.4 12.1 6.3 11.9 6.3 11.7C6.3 11.5 6.4 11.3 6.5 11.1C6.6 10.9 6.8 10.7 7 10.5C7.2 10.3 7.49999 10.1 7.89999 10C8.29999 9.90003 8.60001 9.80003 9.10001 9.80003C9.50001 9.80003 9.80001 9.90003 10.1 10C10.4 10.1 10.7 10.3 10.9 10.4C11.1 10.5 11.3 10.8 11.4 11.1C11.5 11.4 11.6 11.6 11.6 11.9C11.6 12.3 11.5 12.6 11.3 12.9C11.1 13.2 10.9 13.5 10.6 13.7C10.9 13.9 11.2 14.1 11.4 14.3C11.6 14.5 11.8 14.7 11.9 15C12 15.3 12.1 15.5 12.1 15.8C12.1 16.2 12 16.5 11.9 16.8C11.8 17.1 11.5 17.4 11.3 17.7C11.1 18 10.7 18.2 10.3 18.3C9.9 18.4 9.5 18.5 9 18.5C8.5 18.5 8.1 18.4 7.7 18.2C7.3 18 7 17.8 6.8 17.6C6.6 17.4 6.4 17.1 6.3 16.8C6.2 16.5 6.10001 16.3 6.10001 16.1C6.10001 15.9 6.2 15.7 6.3 15.6C6.4 15.5 6.6 15.4 6.8 15.4C6.9 15.4 7.00001 15.4 7.10001 15.5C7.20001 15.6 7.3 15.6 7.3 15.7C7.5 16.2 7.7 16.6 8 16.9C8.3 17.2 8.6 17.3 9 17.3C9.2 17.3 9.5 17.2 9.7 17.1C9.9 17 10.1 16.8 10.3 16.6C10.5 16.4 10.5 16.1 10.5 15.8C10.5 15.3 10.4 15 10.1 14.7C9.80001 14.4 9.50001 14.3 9.10001 14.3C9.00001 14.3 8.9 14.3 8.7 14.3C8.5 14.3 8.39999 14.3 8.39999 14.3C8.19999 14.3 7.99999 14.2 7.89999 14.1C7.79999 14 7.7 13.8 7.7 13.7C7.7 13.5 7.79999 13.4 7.89999 13.2C7.99999 13 8.2 13 8.5 13H8.8V13.1ZM15.3 17.5V12.2C14.3 13 13.6 13.3 13.3 13.3C13.1 13.3 13 13.2 12.9 13.1C12.8 13 12.7 12.8 12.7 12.6C12.7 12.4 12.8 12.3 12.9 12.2C13 12.1 13.2 12 13.6 11.8C14.1 11.6 14.5 11.3 14.7 11.1C14.9 10.9 15.2 10.6 15.5 10.3C15.8 10 15.9 9.80003 15.9 9.70003C15.9 9.60003 16.1 9.60004 16.3 9.60004C16.5 9.60004 16.7 9.70003 16.8 9.80003C16.9 9.90003 17 10.2 17 10.5V17.2C17 18 16.7 18.4 16.2 18.4C16 18.4 15.8 18.3 15.6 18.2C15.4 18.1 15.3 17.8 15.3 17.5Z" fill="currentColor" />
																						</svg>
																					</span>
																					<input class="form-control form-control-solid ps-12" name="" placeholder="Date" id="today_date_fillter_loan_list" value="<?php echo date("d-m-Y"); ?>" disabled />
																				</div>
																			</div>
																			<div class="mb-2 fv-row" id="week_from_dt_loan_list" style="display:none;">
																				<label class="form-label">From</label>
																				<div class="d-flex align-items-center">
																					<span class="svg-icon position-absolute ms-4 svg-icon-2 dt">
																						<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																							<path opacity="0.3" d="M21 22H3C2.4 22 2 21.6 2 21V5C2 4.4 2.4 4 3 4H21C21.6 4 22 4.4 22 5V21C22 21.6 21.6 22 21 22Z" fill="currentColor" />
																							<path d="M6 6C5.4 6 5 5.6 5 5V3C5 2.4 5.4 2 6 2C6.6 2 7 2.4 7 3V5C7 5.6 6.6 6 6 6ZM11 5V3C11 2.4 10.6 2 10 2C9.4 2 9 2.4 9 3V5C9 5.6 9.4 6 10 6C10.6 6 11 5.6 11 5ZM15 5V3C15 2.4 14.6 2 14 2C13.4 2 13 2.4 13 3V5C13 5.6 13.4 6 14 6C14.6 6 15 5.6 15 5ZM19 5V3C19 2.4 18.6 2 18 2C17.4 2 17 2.4 17 3V5C17 5.6 17.4 6 18 6C18.6 6 19 5.6 19 5Z" fill="currentColor" />
																							<path d="M8.8 13.1C9.2 13.1 9.5 13 9.7 12.8C9.9 12.6 10.1 12.3 10.1 11.9C10.1 11.6 10 11.3 9.8 11.1C9.6 10.9 9.3 10.8 9 10.8C8.8 10.8 8.59999 10.8 8.39999 10.9C8.19999 11 8.1 11.1 8 11.2C7.9 11.3 7.8 11.4 7.7 11.6C7.6 11.8 7.5 11.9 7.5 12.1C7.5 12.2 7.4 12.2 7.3 12.3C7.2 12.4 7.09999 12.4 6.89999 12.4C6.69999 12.4 6.6 12.3 6.5 12.2C6.4 12.1 6.3 11.9 6.3 11.7C6.3 11.5 6.4 11.3 6.5 11.1C6.6 10.9 6.8 10.7 7 10.5C7.2 10.3 7.49999 10.1 7.89999 10C8.29999 9.90003 8.60001 9.80003 9.10001 9.80003C9.50001 9.80003 9.80001 9.90003 10.1 10C10.4 10.1 10.7 10.3 10.9 10.4C11.1 10.5 11.3 10.8 11.4 11.1C11.5 11.4 11.6 11.6 11.6 11.9C11.6 12.3 11.5 12.6 11.3 12.9C11.1 13.2 10.9 13.5 10.6 13.7C10.9 13.9 11.2 14.1 11.4 14.3C11.6 14.5 11.8 14.7 11.9 15C12 15.3 12.1 15.5 12.1 15.8C12.1 16.2 12 16.5 11.9 16.8C11.8 17.1 11.5 17.4 11.3 17.7C11.1 18 10.7 18.2 10.3 18.3C9.9 18.4 9.5 18.5 9 18.5C8.5 18.5 8.1 18.4 7.7 18.2C7.3 18 7 17.8 6.8 17.6C6.6 17.4 6.4 17.1 6.3 16.8C6.2 16.5 6.10001 16.3 6.10001 16.1C6.10001 15.9 6.2 15.7 6.3 15.6C6.4 15.5 6.6 15.4 6.8 15.4C6.9 15.4 7.00001 15.4 7.10001 15.5C7.20001 15.6 7.3 15.6 7.3 15.7C7.5 16.2 7.7 16.6 8 16.9C8.3 17.2 8.6 17.3 9 17.3C9.2 17.3 9.5 17.2 9.7 17.1C9.9 17 10.1 16.8 10.3 16.6C10.5 16.4 10.5 16.1 10.5 15.8C10.5 15.3 10.4 15 10.1 14.7C9.80001 14.4 9.50001 14.3 9.10001 14.3C9.00001 14.3 8.9 14.3 8.7 14.3C8.5 14.3 8.39999 14.3 8.39999 14.3C8.19999 14.3 7.99999 14.2 7.89999 14.1C7.79999 14 7.7 13.8 7.7 13.7C7.7 13.5 7.79999 13.4 7.89999 13.2C7.99999 13 8.2 13 8.5 13H8.8V13.1ZM15.3 17.5V12.2C14.3 13 13.6 13.3 13.3 13.3C13.1 13.3 13 13.2 12.9 13.1C12.8 13 12.7 12.8 12.7 12.6C12.7 12.4 12.8 12.3 12.9 12.2C13 12.1 13.2 12 13.6 11.8C14.1 11.6 14.5 11.3 14.7 11.1C14.9 10.9 15.2 10.6 15.5 10.3C15.8 10 15.9 9.80003 15.9 9.70003C15.9 9.60003 16.1 9.60004 16.3 9.60004C16.5 9.60004 16.7 9.70003 16.8 9.80003C16.9 9.90003 17 10.2 17 10.5V17.2C17 18 16.7 18.4 16.2 18.4C16 18.4 15.8 18.3 15.6 18.2C15.4 18.1 15.3 17.8 15.3 17.5Z" fill="currentColor" />
																						</svg>
																					</span>
																					<input class="form-control form-control-solid ps-12" name="" placeholder="Date" id="week_from_date_fillter_loan_list" value="" disabled />
																				</div>
																			</div>
																			<div class="mb-2 fv-row" id="week_to_dt_loan_list" style="display:none;">
																				<label class="form-label">To</label>
																				<div class="d-flex align-items-center">
																					<span class="svg-icon position-absolute ms-4 svg-icon-2 dt">
																						<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																							<path opacity="0.3" d="M21 22H3C2.4 22 2 21.6 2 21V5C2 4.4 2.4 4 3 4H21C21.6 4 22 4.4 22 5V21C22 21.6 21.6 22 21 22Z" fill="currentColor" />
																							<path d="M6 6C5.4 6 5 5.6 5 5V3C5 2.4 5.4 2 6 2C6.6 2 7 2.4 7 3V5C7 5.6 6.6 6 6 6ZM11 5V3C11 2.4 10.6 2 10 2C9.4 2 9 2.4 9 3V5C9 5.6 9.4 6 10 6C10.6 6 11 5.6 11 5ZM15 5V3C15 2.4 14.6 2 14 2C13.4 2 13 2.4 13 3V5C13 5.6 13.4 6 14 6C14.6 6 15 5.6 15 5ZM19 5V3C19 2.4 18.6 2 18 2C17.4 2 17 2.4 17 3V5C17 5.6 17.4 6 18 6C18.6 6 19 5.6 19 5Z" fill="currentColor" />
																							<path d="M8.8 13.1C9.2 13.1 9.5 13 9.7 12.8C9.9 12.6 10.1 12.3 10.1 11.9C10.1 11.6 10 11.3 9.8 11.1C9.6 10.9 9.3 10.8 9 10.8C8.8 10.8 8.59999 10.8 8.39999 10.9C8.19999 11 8.1 11.1 8 11.2C7.9 11.3 7.8 11.4 7.7 11.6C7.6 11.8 7.5 11.9 7.5 12.1C7.5 12.2 7.4 12.2 7.3 12.3C7.2 12.4 7.09999 12.4 6.89999 12.4C6.69999 12.4 6.6 12.3 6.5 12.2C6.4 12.1 6.3 11.9 6.3 11.7C6.3 11.5 6.4 11.3 6.5 11.1C6.6 10.9 6.8 10.7 7 10.5C7.2 10.3 7.49999 10.1 7.89999 10C8.29999 9.90003 8.60001 9.80003 9.10001 9.80003C9.50001 9.80003 9.80001 9.90003 10.1 10C10.4 10.1 10.7 10.3 10.9 10.4C11.1 10.5 11.3 10.8 11.4 11.1C11.5 11.4 11.6 11.6 11.6 11.9C11.6 12.3 11.5 12.6 11.3 12.9C11.1 13.2 10.9 13.5 10.6 13.7C10.9 13.9 11.2 14.1 11.4 14.3C11.6 14.5 11.8 14.7 11.9 15C12 15.3 12.1 15.5 12.1 15.8C12.1 16.2 12 16.5 11.9 16.8C11.8 17.1 11.5 17.4 11.3 17.7C11.1 18 10.7 18.2 10.3 18.3C9.9 18.4 9.5 18.5 9 18.5C8.5 18.5 8.1 18.4 7.7 18.2C7.3 18 7 17.8 6.8 17.6C6.6 17.4 6.4 17.1 6.3 16.8C6.2 16.5 6.10001 16.3 6.10001 16.1C6.10001 15.9 6.2 15.7 6.3 15.6C6.4 15.5 6.6 15.4 6.8 15.4C6.9 15.4 7.00001 15.4 7.10001 15.5C7.20001 15.6 7.3 15.6 7.3 15.7C7.5 16.2 7.7 16.6 8 16.9C8.3 17.2 8.6 17.3 9 17.3C9.2 17.3 9.5 17.2 9.7 17.1C9.9 17 10.1 16.8 10.3 16.6C10.5 16.4 10.5 16.1 10.5 15.8C10.5 15.3 10.4 15 10.1 14.7C9.80001 14.4 9.50001 14.3 9.10001 14.3C9.00001 14.3 8.9 14.3 8.7 14.3C8.5 14.3 8.39999 14.3 8.39999 14.3C8.19999 14.3 7.99999 14.2 7.89999 14.1C7.79999 14 7.7 13.8 7.7 13.7C7.7 13.5 7.79999 13.4 7.89999 13.2C7.99999 13 8.2 13 8.5 13H8.8V13.1ZM15.3 17.5V12.2C14.3 13 13.6 13.3 13.3 13.3C13.1 13.3 13 13.2 12.9 13.1C12.8 13 12.7 12.8 12.7 12.6C12.7 12.4 12.8 12.3 12.9 12.2C13 12.1 13.2 12 13.6 11.8C14.1 11.6 14.5 11.3 14.7 11.1C14.9 10.9 15.2 10.6 15.5 10.3C15.8 10 15.9 9.80003 15.9 9.70003C15.9 9.60003 16.1 9.60004 16.3 9.60004C16.5 9.60004 16.7 9.70003 16.8 9.80003C16.9 9.90003 17 10.2 17 10.5V17.2C17 18 16.7 18.4 16.2 18.4C16 18.4 15.8 18.3 15.6 18.2C15.4 18.1 15.3 17.8 15.3 17.5Z" fill="currentColor" />
																						</svg>
																					</span>
																					<input class="form-control form-control-solid ps-12" name="" placeholder="Date" id="week_to_date_fillter_loan_list" value="<?php echo date("d-m-Y"); ?>" disabled />
																				</div>
																			</div>
																			<div class="mb-2 fv-row" id="monthly_dt_loan_list" style="display:none;">
																				<label class="form-label">This Month</label>
																				<div class="d-flex align-items-center">
																					<span class="svg-icon position-absolute ms-4 svg-icon-2 dt">
																						<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																							<path opacity="0.3" d="M21 22H3C2.4 22 2 21.6 2 21V5C2 4.4 2.4 4 3 4H21C21.6 4 22 4.4 22 5V21C22 21.6 21.6 22 21 22Z" fill="currentColor" />
																							<path d="M6 6C5.4 6 5 5.6 5 5V3C5 2.4 5.4 2 6 2C6.6 2 7 2.4 7 3V5C7 5.6 6.6 6 6 6ZM11 5V3C11 2.4 10.6 2 10 2C9.4 2 9 2.4 9 3V5C9 5.6 9.4 6 10 6C10.6 6 11 5.6 11 5ZM15 5V3C15 2.4 14.6 2 14 2C13.4 2 13 2.4 13 3V5C13 5.6 13.4 6 14 6C14.6 6 15 5.6 15 5ZM19 5V3C19 2.4 18.6 2 18 2C17.4 2 17 2.4 17 3V5C17 5.6 17.4 6 18 6C18.6 6 19 5.6 19 5Z" fill="currentColor" />
																							<path d="M8.8 13.1C9.2 13.1 9.5 13 9.7 12.8C9.9 12.6 10.1 12.3 10.1 11.9C10.1 11.6 10 11.3 9.8 11.1C9.6 10.9 9.3 10.8 9 10.8C8.8 10.8 8.59999 10.8 8.39999 10.9C8.19999 11 8.1 11.1 8 11.2C7.9 11.3 7.8 11.4 7.7 11.6C7.6 11.8 7.5 11.9 7.5 12.1C7.5 12.2 7.4 12.2 7.3 12.3C7.2 12.4 7.09999 12.4 6.89999 12.4C6.69999 12.4 6.6 12.3 6.5 12.2C6.4 12.1 6.3 11.9 6.3 11.7C6.3 11.5 6.4 11.3 6.5 11.1C6.6 10.9 6.8 10.7 7 10.5C7.2 10.3 7.49999 10.1 7.89999 10C8.29999 9.90003 8.60001 9.80003 9.10001 9.80003C9.50001 9.80003 9.80001 9.90003 10.1 10C10.4 10.1 10.7 10.3 10.9 10.4C11.1 10.5 11.3 10.8 11.4 11.1C11.5 11.4 11.6 11.6 11.6 11.9C11.6 12.3 11.5 12.6 11.3 12.9C11.1 13.2 10.9 13.5 10.6 13.7C10.9 13.9 11.2 14.1 11.4 14.3C11.6 14.5 11.8 14.7 11.9 15C12 15.3 12.1 15.5 12.1 15.8C12.1 16.2 12 16.5 11.9 16.8C11.8 17.1 11.5 17.4 11.3 17.7C11.1 18 10.7 18.2 10.3 18.3C9.9 18.4 9.5 18.5 9 18.5C8.5 18.5 8.1 18.4 7.7 18.2C7.3 18 7 17.8 6.8 17.6C6.6 17.4 6.4 17.1 6.3 16.8C6.2 16.5 6.10001 16.3 6.10001 16.1C6.10001 15.9 6.2 15.7 6.3 15.6C6.4 15.5 6.6 15.4 6.8 15.4C6.9 15.4 7.00001 15.4 7.10001 15.5C7.20001 15.6 7.3 15.6 7.3 15.7C7.5 16.2 7.7 16.6 8 16.9C8.3 17.2 8.6 17.3 9 17.3C9.2 17.3 9.5 17.2 9.7 17.1C9.9 17 10.1 16.8 10.3 16.6C10.5 16.4 10.5 16.1 10.5 15.8C10.5 15.3 10.4 15 10.1 14.7C9.80001 14.4 9.50001 14.3 9.10001 14.3C9.00001 14.3 8.9 14.3 8.7 14.3C8.5 14.3 8.39999 14.3 8.39999 14.3C8.19999 14.3 7.99999 14.2 7.89999 14.1C7.79999 14 7.7 13.8 7.7 13.7C7.7 13.5 7.79999 13.4 7.89999 13.2C7.99999 13 8.2 13 8.5 13H8.8V13.1ZM15.3 17.5V12.2C14.3 13 13.6 13.3 13.3 13.3C13.1 13.3 13 13.2 12.9 13.1C12.8 13 12.7 12.8 12.7 12.6C12.7 12.4 12.8 12.3 12.9 12.2C13 12.1 13.2 12 13.6 11.8C14.1 11.6 14.5 11.3 14.7 11.1C14.9 10.9 15.2 10.6 15.5 10.3C15.8 10 15.9 9.80003 15.9 9.70003C15.9 9.60003 16.1 9.60004 16.3 9.60004C16.5 9.60004 16.7 9.70003 16.8 9.80003C16.9 9.90003 17 10.2 17 10.5V17.2C17 18 16.7 18.4 16.2 18.4C16 18.4 15.8 18.3 15.6 18.2C15.4 18.1 15.3 17.8 15.3 17.5Z" fill="currentColor" />
																						</svg>
																					</span>
																					<input class="form-control form-control-solid ps-12" name="" placeholder="Month" id="monthly_date_fillter_loan_list" value="<?php echo date("m-Y"); ?>" />
																				</div>
																			</div>
																			<div class="mb-2 fv-row" id="from_dt_loan_list" style="display:none;">
																				<label class="form-label">From</label>
																				<div class="d-flex align-items-center">
																					<span class="svg-icon position-absolute ms-4 svg-icon-2 dt">
																						<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																							<path opacity="0.3" d="M21 22H3C2.4 22 2 21.6 2 21V5C2 4.4 2.4 4 3 4H21C21.6 4 22 4.4 22 5V21C22 21.6 21.6 22 21 22Z" fill="currentColor" />
																							<path d="M6 6C5.4 6 5 5.6 5 5V3C5 2.4 5.4 2 6 2C6.6 2 7 2.4 7 3V5C7 5.6 6.6 6 6 6ZM11 5V3C11 2.4 10.6 2 10 2C9.4 2 9 2.4 9 3V5C9 5.6 9.4 6 10 6C10.6 6 11 5.6 11 5ZM15 5V3C15 2.4 14.6 2 14 2C13.4 2 13 2.4 13 3V5C13 5.6 13.4 6 14 6C14.6 6 15 5.6 15 5ZM19 5V3C19 2.4 18.6 2 18 2C17.4 2 17 2.4 17 3V5C17 5.6 17.4 6 18 6C18.6 6 19 5.6 19 5Z" fill="currentColor" />
																							<path d="M8.8 13.1C9.2 13.1 9.5 13 9.7 12.8C9.9 12.6 10.1 12.3 10.1 11.9C10.1 11.6 10 11.3 9.8 11.1C9.6 10.9 9.3 10.8 9 10.8C8.8 10.8 8.59999 10.8 8.39999 10.9C8.19999 11 8.1 11.1 8 11.2C7.9 11.3 7.8 11.4 7.7 11.6C7.6 11.8 7.5 11.9 7.5 12.1C7.5 12.2 7.4 12.2 7.3 12.3C7.2 12.4 7.09999 12.4 6.89999 12.4C6.69999 12.4 6.6 12.3 6.5 12.2C6.4 12.1 6.3 11.9 6.3 11.7C6.3 11.5 6.4 11.3 6.5 11.1C6.6 10.9 6.8 10.7 7 10.5C7.2 10.3 7.49999 10.1 7.89999 10C8.29999 9.90003 8.60001 9.80003 9.10001 9.80003C9.50001 9.80003 9.80001 9.90003 10.1 10C10.4 10.1 10.7 10.3 10.9 10.4C11.1 10.5 11.3 10.8 11.4 11.1C11.5 11.4 11.6 11.6 11.6 11.9C11.6 12.3 11.5 12.6 11.3 12.9C11.1 13.2 10.9 13.5 10.6 13.7C10.9 13.9 11.2 14.1 11.4 14.3C11.6 14.5 11.8 14.7 11.9 15C12 15.3 12.1 15.5 12.1 15.8C12.1 16.2 12 16.5 11.9 16.8C11.8 17.1 11.5 17.4 11.3 17.7C11.1 18 10.7 18.2 10.3 18.3C9.9 18.4 9.5 18.5 9 18.5C8.5 18.5 8.1 18.4 7.7 18.2C7.3 18 7 17.8 6.8 17.6C6.6 17.4 6.4 17.1 6.3 16.8C6.2 16.5 6.10001 16.3 6.10001 16.1C6.10001 15.9 6.2 15.7 6.3 15.6C6.4 15.5 6.6 15.4 6.8 15.4C6.9 15.4 7.00001 15.4 7.10001 15.5C7.20001 15.6 7.3 15.6 7.3 15.7C7.5 16.2 7.7 16.6 8 16.9C8.3 17.2 8.6 17.3 9 17.3C9.2 17.3 9.5 17.2 9.7 17.1C9.9 17 10.1 16.8 10.3 16.6C10.5 16.4 10.5 16.1 10.5 15.8C10.5 15.3 10.4 15 10.1 14.7C9.80001 14.4 9.50001 14.3 9.10001 14.3C9.00001 14.3 8.9 14.3 8.7 14.3C8.5 14.3 8.39999 14.3 8.39999 14.3C8.19999 14.3 7.99999 14.2 7.89999 14.1C7.79999 14 7.7 13.8 7.7 13.7C7.7 13.5 7.79999 13.4 7.89999 13.2C7.99999 13 8.2 13 8.5 13H8.8V13.1ZM15.3 17.5V12.2C14.3 13 13.6 13.3 13.3 13.3C13.1 13.3 13 13.2 12.9 13.1C12.8 13 12.7 12.8 12.7 12.6C12.7 12.4 12.8 12.3 12.9 12.2C13 12.1 13.2 12 13.6 11.8C14.1 11.6 14.5 11.3 14.7 11.1C14.9 10.9 15.2 10.6 15.5 10.3C15.8 10 15.9 9.80003 15.9 9.70003C15.9 9.60003 16.1 9.60004 16.3 9.60004C16.5 9.60004 16.7 9.70003 16.8 9.80003C16.9 9.90003 17 10.2 17 10.5V17.2C17 18 16.7 18.4 16.2 18.4C16 18.4 15.8 18.3 15.6 18.2C15.4 18.1 15.3 17.8 15.3 17.5Z" fill="currentColor" />
																						</svg>
																					</span>
																					<input class="form-control form-control-solid ps-12" name="" placeholder="From Date" id="from_date_fillter_loan_list" value="<?php echo date("d-m-Y"); ?>" />
																				</div>
																			</div>
																			<div class="mb-2 fv-row" id="to_dt_loan_list" style="display:none;">
																				<label class="form-label">To</label>
																				<div class="d-flex align-items-center">
																					<span class="svg-icon position-absolute ms-4 svg-icon-2 dt">
																						<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																							<path opacity="0.3" d="M21 22H3C2.4 22 2 21.6 2 21V5C2 4.4 2.4 4 3 4H21C21.6 4 22 4.4 22 5V21C22 21.6 21.6 22 21 22Z" fill="currentColor" />
																							<path d="M6 6C5.4 6 5 5.6 5 5V3C5 2.4 5.4 2 6 2C6.6 2 7 2.4 7 3V5C7 5.6 6.6 6 6 6ZM11 5V3C11 2.4 10.6 2 10 2C9.4 2 9 2.4 9 3V5C9 5.6 9.4 6 10 6C10.6 6 11 5.6 11 5ZM15 5V3C15 2.4 14.6 2 14 2C13.4 2 13 2.4 13 3V5C13 5.6 13.4 6 14 6C14.6 6 15 5.6 15 5ZM19 5V3C19 2.4 18.6 2 18 2C17.4 2 17 2.4 17 3V5C17 5.6 17.4 6 18 6C18.6 6 19 5.6 19 5Z" fill="currentColor" />
																							<path d="M8.8 13.1C9.2 13.1 9.5 13 9.7 12.8C9.9 12.6 10.1 12.3 10.1 11.9C10.1 11.6 10 11.3 9.8 11.1C9.6 10.9 9.3 10.8 9 10.8C8.8 10.8 8.59999 10.8 8.39999 10.9C8.19999 11 8.1 11.1 8 11.2C7.9 11.3 7.8 11.4 7.7 11.6C7.6 11.8 7.5 11.9 7.5 12.1C7.5 12.2 7.4 12.2 7.3 12.3C7.2 12.4 7.09999 12.4 6.89999 12.4C6.69999 12.4 6.6 12.3 6.5 12.2C6.4 12.1 6.3 11.9 6.3 11.7C6.3 11.5 6.4 11.3 6.5 11.1C6.6 10.9 6.8 10.7 7 10.5C7.2 10.3 7.49999 10.1 7.89999 10C8.29999 9.90003 8.60001 9.80003 9.10001 9.80003C9.50001 9.80003 9.80001 9.90003 10.1 10C10.4 10.1 10.7 10.3 10.9 10.4C11.1 10.5 11.3 10.8 11.4 11.1C11.5 11.4 11.6 11.6 11.6 11.9C11.6 12.3 11.5 12.6 11.3 12.9C11.1 13.2 10.9 13.5 10.6 13.7C10.9 13.9 11.2 14.1 11.4 14.3C11.6 14.5 11.8 14.7 11.9 15C12 15.3 12.1 15.5 12.1 15.8C12.1 16.2 12 16.5 11.9 16.8C11.8 17.1 11.5 17.4 11.3 17.7C11.1 18 10.7 18.2 10.3 18.3C9.9 18.4 9.5 18.5 9 18.5C8.5 18.5 8.1 18.4 7.7 18.2C7.3 18 7 17.8 6.8 17.6C6.6 17.4 6.4 17.1 6.3 16.8C6.2 16.5 6.10001 16.3 6.10001 16.1C6.10001 15.9 6.2 15.7 6.3 15.6C6.4 15.5 6.6 15.4 6.8 15.4C6.9 15.4 7.00001 15.4 7.10001 15.5C7.20001 15.6 7.3 15.6 7.3 15.7C7.5 16.2 7.7 16.6 8 16.9C8.3 17.2 8.6 17.3 9 17.3C9.2 17.3 9.5 17.2 9.7 17.1C9.9 17 10.1 16.8 10.3 16.6C10.5 16.4 10.5 16.1 10.5 15.8C10.5 15.3 10.4 15 10.1 14.7C9.80001 14.4 9.50001 14.3 9.10001 14.3C9.00001 14.3 8.9 14.3 8.7 14.3C8.5 14.3 8.39999 14.3 8.39999 14.3C8.19999 14.3 7.99999 14.2 7.89999 14.1C7.79999 14 7.7 13.8 7.7 13.7C7.7 13.5 7.79999 13.4 7.89999 13.2C7.99999 13 8.2 13 8.5 13H8.8V13.1ZM15.3 17.5V12.2C14.3 13 13.6 13.3 13.3 13.3C13.1 13.3 13 13.2 12.9 13.1C12.8 13 12.7 12.8 12.7 12.6C12.7 12.4 12.8 12.3 12.9 12.2C13 12.1 13.2 12 13.6 11.8C14.1 11.6 14.5 11.3 14.7 11.1C14.9 10.9 15.2 10.6 15.5 10.3C15.8 10 15.9 9.80003 15.9 9.70003C15.9 9.60003 16.1 9.60004 16.3 9.60004C16.5 9.60004 16.7 9.70003 16.8 9.80003C16.9 9.90003 17 10.2 17 10.5V17.2C17 18 16.7 18.4 16.2 18.4C16 18.4 15.8 18.3 15.6 18.2C15.4 18.1 15.3 17.8 15.3 17.5Z" fill="currentColor" />
																						</svg>
																					</span>
																					<input class="form-control form-control-solid ps-12" name="" placeholder="To Date" id="to_date_fillter_loan_list" value="<?php echo date("d-m-Y"); ?>"/>
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
															</div>
														</div>
														<table class="table align-middle table-row-dashed table-striped table-hover fs-7 gy-1 gs-2" id="kt_datatable_dom_positioning">
															<thead>
																<tr class="text-start text-muted fw-bold fs-7 gs-0">
																	<th class="min-w-25px">Sno</th>
																	<th class="min-w-25px">Date</th>
																	<th class="min-w-100px">Company</th>
																	<th class="min-w-125px">Loan No</th>
																	<th class="min-w-100px">Party Info</th>
																	<th class="min-w-80px">Scheme - Int</th>
																	<th class="min-w-25px">Jewel Type</th>
																	<th class="min-w-25px">No of Item</th>
																	<th class="min-w-25px">Paid Amt</th>
																	<th class="min-w-200px">Status</th>
																	<th class="min-w-100px"><span class="text-end">Actions</span></th>
																</tr>
															</thead>
															<tbody class="text-gray-600 fw-semibold">
																<tr>
																	<td>1</td>
																	<td>20/01/2023</td>
																	<td class="ple1">AGB - Main Branch Sayalkudi</td>
																	<td class="ple1">
																		<span>MIP-256/23</span>
																		<span class="btn btn-icon btn-circle fs-8 fw-bold shadow text-white mb-1" style="background:red;width: 20px !important;height: 20px !important;float: right;">BJ</span>
																	</td>
																	<td class="ple1">
																		<span><i class="fa-solid fa-star fs-7" style="color:#50cd89;"></i></span>
																		<span class="align-items-center">Abishek</span>
																	</td>
																	<td>MIP - 2.5</td>
																	<td>Gold</td>
																	<td>2</td>
																	<td class="ple1">10000.00</td>
																	<td>
																		<label class="col-form-label fw-semibold fs-7" name="" id="" ><span style="background-color:#ffdf6f;border-radius: 8px;padding: 5px 15px 5px 15px;">Customer Close</span>
																		</label>
																	</td>
																	<td>
																		<span class="text-end">
																			<a href="fsd_view.php" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm" title="View">
																				<i class="bi bi-eye-fill eyc"></i>
																			</a>
																			<button class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
																				<i class="fas fa-ellipsis-v eyc"></i>
																			</button>
																			<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px py-3" data-kt-menu="true" style="">
																				<div class="menu-item px-3">
																					<a href="fsd.php" target="_blank" class="menu-link px-3">Jewel Settlement</a>
																				</div>
																			</div>
																		</span>
																	</td>
																</tr>
																<tr>
																	<td>2</td>
																	<td>26/01/2023</td>
																	<td class="ple1">AGB - Main Branch Sayalkudi</td>
																	<td class="ple1">
																		<span>MIP-260/23</span>
																		<span class="btn btn-icon btn-circle fs-8 fw-bold shadow text-white mb-1" style="background:red;width: 20px !important;height: 20px !important;float: right;">LI</span>
																	</td>
																	<td class="ple1">
																		<span><i class="fa-solid fa-star fs-7" style="color:red;"></i></span>
																		<span class="align-items-center">Aashik</span>
																	</td>
																	<td>MIP - 2.5</td>
																	<td>Gold</td>
																	<td>3</td>
																	<td class="ple1">10000.00</td>
																	<td>
																		<label class="col-form-label fw-semibold fs-7" name="" id="" ><span style="background-color:#b0dfff;border-radius: 8px;padding: 5px 15px 5px 15px;">Company Close</span>
																		</label>
																	</td>
																	<td>
																		<span class="text-end">
																			<a href="fsd_view.php" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm" title="View">
																				<i class="bi bi-eye-fill eyc"></i>
																			</a>
																			<button class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
																				<i class="fas fa-ellipsis-v eyc"></i>
																			</button>
																			<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px py-3" data-kt-menu="true" style="">
																				<div class="menu-item px-3">
																					<a href="javascript:;" class="menu-link flex-stack px-3" data-bs-toggle="modal" data-bs-target="#kt_modal_verify_lockout">Lock Out</a>
																				</div>
																				<div class="menu-item px-3">
																					<a href="javascript:;" class="menu-link flex-stack px-3" data-bs-toggle="modal" data-bs-target="#kt_modal_update_pledge_items">Convert Old Gold</a>
																				</div>
																			</div>
																		</span>
																	</td>
																</tr>
																<tr>
																	<td>3</td>
																	<td>03/02/2023</td>
																	<td class="ple1">AGB - Main Branch Sayalkudi</td>
																	<td class="ple1">
																		<span>TIP-86/23</span>
																		<span class="btn btn-icon btn-circle fs-8 fw-bold shadow text-white mb-1" style="background:red;width: 20px !important;height: 20px !important;float: right;">LO</span>
																	</td>
																	<td class="ple1">
																		<span><i class="fa-solid fa-star fs-7" style="color:#ffc700;"></i></span>
																		<span class="align-items-center">Senthil</span>
																	</td>
																	<td>TIP - 2.5</td>
																	<td>Gold</td>
																	<td>2</td>
																	<td class="ple1">32000.00</td>
																	<td>
																		<label class="col-form-label fw-semibold fs-7" name="" id="" ><span style="background-color:#fbe2d5;border-radius: 8px;padding: 5px 15px 5px 15px;">Customer Sale</span>
																		</label>
																	</td>
																	<td>
																		<span class="text-end">
																			<a href="fsd_view.php" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm" title="View">
																				<i class="bi bi-eye-fill eyc"></i>
																			</a>
																			<button class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
																				<i class="fas fa-ellipsis-v eyc"></i>
																			</button>
																			<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px py-3" data-kt-menu="true" style="">
																				<div class="menu-item px-3">
																					<a href="fsd.php" target="_blank" class="menu-link px-3">Jewel Settlement</a>
																				</div>
																				<div class="menu-item px-3">
																					<a href="javascript:;" class="menu-link flex-stack px-3" data-bs-toggle="modal" data-bs-target="#kt_modal_update_pledge_items">Convert Old Gold</a>
																				</div>
																			</div>
																		</span>
																	</td>
																</tr>
																<tr>
																	<td>4</td>
																	<td>14/03/2023</td>
																	<td class="ple1">AGB - Main Branch Sayalkudi</td>
																	<td class="ple1">
																		<span>SIP-26/23</span>
																		<span class="btn btn-icon btn-circle fs-8 fw-bold shadow text-white mb-1" style="background:red;width: 20px !important;height: 20px !important;float: right;">LO</span>
																	</td>
																	<td class="ple1">
																		<span><i class="fa-solid fa-star fs-7" style="color:#50cd89;"></i></span>
																		<span class="align-items-center">Pandi</span>
																	</td>
																	<td>SIP - 2.5</td>
																	<td>Gold</td>
																	<td>1</td>
																	<td class="ple1">14000.00</td>
																	<td>
																		<label class="col-form-label fw-semibold fs-7" name="" id="" ><span style="background-color:#a3ff9b;border-radius: 8px;padding: 5px 15px 5px 15px;">Multi Jewel</span>
																		</label>
																	</td>
																	<td>
																		<span class="text-end">
																			<a href="fsd_view.php" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm" title="View">
																				<i class="bi bi-eye-fill eyc"></i>
																			</a>
																			<button class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
																				<i class="fas fa-ellipsis-v eyc"></i>
																			</button>
																			<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px py-3" data-kt-menu="true" style="">
																				<div class="menu-item px-3">
																					<a href="fsd.php" target="_blank" class="menu-link px-3">Jewel Settlement</a>
																				</div>
																			</div>
																		</span>
																	</td>
																</tr>
																<tr>
																	<td>5</td>
																	<td>19/03/2023</td>
																	<td class="ple1">AGB - Main Branch Sayalkudi</td>
																	<td class="ple1">
																		<span>TIP-354/23</span>
																		<span class="btn btn-icon btn-circle fs-8 fw-bold shadow text-white mb-1" style="background:red;width: 20px !important;height: 20px !important;float: right;">LI</span>
																	</td>
																	<td class="ple1">
																		<span><i class="fa-solid fa-star fs-7" style="color:#50cd89;"></i></span>
																		<span class="align-items-center">Prbhakaran</span>
																	</td>
																	<td>TIP - 2.5</td>
																	<td>Gold</td>
																	<td>1</td>
																	<td class="ple1">19000.00</td>
																	<td>
																		<label class="col-form-label fw-semibold fs-7" name="" id="" ><span style="background-color:#ffdf6f;border-radius: 8px;padding: 5px 15px 5px 15px;">Customer Close</span>
																		</label>
																	</td>
																	<td>
																		<span class="text-end">
																			<a href="fsd_view.php" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm" title="View">
																				<i class="bi bi-eye-fill eyc"></i>
																			</a>
																			<button class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
																				<i class="fas fa-ellipsis-v eyc"></i>
																			</button>
																			<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px py-3" data-kt-menu="true" style="">
																				<div class="menu-item px-3">
																					<a href="javascript:;" class="menu-link flex-stack px-3" data-bs-toggle="modal" data-bs-target="#kt_modal_verify_lockout">Lock Out</a>
																				</div>
																				<div class="menu-item px-3">
																					<a href="fsd.php" target="_blank" class="menu-link px-3">Jewel Settlement</a>
																				</div>
																			</div>
																		</span>
																	</td>
																</tr>
															</tbody>
														</table>
													</div>
													<div class="tab-pane fade" id="kt_tab_pane_2" role="tabpanel">
														<table class="table align-middle table-row-dashed table-striped table-hover fs-7 gy-1 gs-2" id="kt_datatable_dom_positioning_closed">
															<thead>
																<tr class="text-start text-muted fw-bold fs-7 gs-0">
																	<th class="min-w-25px">Sno</th>
																	<th class="min-w-25px">Date</th>
																	<th class="min-w-100px">Company</th>
																	<th class="min-w-125px">Loan No</th>
																	<th class="min-w-100px">Party Info</th>
																	<th class="min-w-80px">Scheme - Int</th>
																	<th class="min-w-25px">Jewel Type</th>
																	<th class="min-w-25px">No of Item</th>
																	<th class="min-w-25px">Paid Amt</th>
																	<th class="min-w-200px">Status</th>
																	<th class="min-w-100px"><span class="text-end">Actions</span></th>
																</tr>
															</thead>
															<tbody class="text-gray-600 fw-semibold">
																<tr>
																	<td>1</td>
																	<td>20/01/2023</td>
																	<td class="ple1">AGB - Main Branch Sayalkudi</td>
																	<td class="ple1">
																		<span>MIP-256/23</span>
																		<span class="btn btn-icon btn-circle fs-8 fw-bold shadow text-white mb-1" style="background:red;width: 20px !important;height: 20px !important;float: right;">BJ</span>
																	</td>
																	<td class="ple1">
																		<span><i class="fa-solid fa-star fs-7" style="color:#50cd89;"></i></span>
																		<span class="align-items-center">Abishek</span>
																	</td>
																	<td>MIP - 2.5</td>
																	<td>Gold</td>
																	<td>2</td>
																	<td class="ple1">10000.00</td>
																	<td>
																		<label class="col-form-label fw-semibold fs-7" name="" id="" ><span style="background-color:#ffdf6f;border-radius: 8px;padding: 5px 15px 5px 15px;">Customer Close</span>
																		</label>
																	</td>
																	<td>
																		<span class="text-end">
																			<a href="fsd_view.php" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm" title="View">
																				<i class="bi bi-eye-fill eyc"></i>
																			</a>
																			<button class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
																				<i class="fas fa-ellipsis-v eyc"></i>
																			</button>
																			<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px py-3" data-kt-menu="true" style="">
																				<div class="menu-item px-3">
																					<a href="fsd.php" target="_blank" class="menu-link px-3">Jewel Settlement</a>
																				</div>
																			</div>
																		</span>
																	</td>
																</tr>
																<tr>
																	<td>2</td>
																	<td>26/01/2023</td>
																	<td class="ple1">AGB - Main Branch Sayalkudi</td>
																	<td class="ple1">
																		<span>MIP-260/23</span>
																		<span class="btn btn-icon btn-circle fs-8 fw-bold shadow text-white mb-1" style="background:red;width: 20px !important;height: 20px !important;float: right;">LI</span>
																	</td>
																	<td class="ple1">
																		<span><i class="fa-solid fa-star fs-7" style="color:red;"></i></span>
																		<span class="align-items-center">Aashik</span>
																	</td>
																	<td>MIP - 2.5</td>
																	<td>Gold</td>
																	<td>3</td>
																	<td class="ple1">10000.00</td>
																	<td>
																		<label class="col-form-label fw-semibold fs-7" name="" id="" ><span style="background-color:#b0dfff;border-radius: 8px;padding: 5px 15px 5px 15px;">Company Close</span>
																		</label>
																	</td>
																	<td>
																		<span class="text-end">
																			<a href="fsd_view.php" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm" title="View">
																				<i class="bi bi-eye-fill eyc"></i>
																			</a>
																			<button class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
																				<i class="fas fa-ellipsis-v eyc"></i>
																			</button>
																			<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px py-3" data-kt-menu="true" style="">
																				<div class="menu-item px-3">
																					<a href="javascript:;" class="menu-link flex-stack px-3" data-bs-toggle="modal" data-bs-target="#kt_modal_verify_lockout">Lock Out</a>
																				</div>
																				<div class="menu-item px-3">
																					<a href="javascript:;" class="menu-link flex-stack px-3" data-bs-toggle="modal" data-bs-target="#kt_modal_update_pledge_items">Convert Old Gold</a>
																				</div>
																			</div>
																		</span>
																	</td>
																</tr>
																<tr>
																	<td>3</td>
																	<td>03/02/2023</td>
																	<td class="ple1">AGB - Main Branch Sayalkudi</td>
																	<td class="ple1">
																		<span>TIP-86/23</span>
																		<span class="btn btn-icon btn-circle fs-8 fw-bold shadow text-white mb-1" style="background:red;width: 20px !important;height: 20px !important;float: right;">LO</span>
																	</td>
																	<td class="ple1">
																		<span><i class="fa-solid fa-star fs-7" style="color:#ffc700;"></i></span>
																		<span class="align-items-center">Senthil</span>
																	</td>
																	<td>TIP - 2.5</td>
																	<td>Gold</td>
																	<td>2</td>
																	<td class="ple1">32000.00</td>
																	<td>
																		<label class="col-form-label fw-semibold fs-7" name="" id="" ><span style="background-color:#fbe2d5;border-radius: 8px;padding: 5px 15px 5px 15px;">Customer Sale</span>
																		</label>
																	</td>
																	<td>
																		<span class="text-end">
																			<a href="fsd_view.php" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm" title="View">
																				<i class="bi bi-eye-fill eyc"></i>
																			</a>
																			<button class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
																				<i class="fas fa-ellipsis-v eyc"></i>
																			</button>
																			<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px py-3" data-kt-menu="true" style="">
																				<div class="menu-item px-3">
																					<a href="fsd.php" target="_blank" class="menu-link px-3">Jewel Settlement</a>
																				</div>
																				<div class="menu-item px-3">
																					<a href="javascript:;" class="menu-link flex-stack px-3" data-bs-toggle="modal" data-bs-target="#kt_modal_update_pledge_items">Convert Old Gold</a>
																				</div>
																			</div>
																		</span>
																	</td>
																</tr>
																<tr>
																	<td>4</td>
																	<td>14/03/2023</td>
																	<td class="ple1">AGB - Main Branch Sayalkudi</td>
																	<td class="ple1">
																		<span>SIP-26/23</span>
																		<span class="btn btn-icon btn-circle fs-8 fw-bold shadow text-white mb-1" style="background:red;width: 20px !important;height: 20px !important;float: right;">LO</span>
																	</td>
																	<td class="ple1">
																		<span><i class="fa-solid fa-star fs-7" style="color:#50cd89;"></i></span>
																		<span class="align-items-center">Pandi</span>
																	</td>
																	<td>SIP - 2.5</td>
																	<td>Gold</td>
																	<td>1</td>
																	<td class="ple1">14000.00</td>
																	<td>
																		<label class="col-form-label fw-semibold fs-7" name="" id="" ><span style="background-color:#a3ff9b;border-radius: 8px;padding: 5px 15px 5px 15px;">Multi Jewel</span>
																		</label>
																	</td>
																	<td>
																		<span class="text-end">
																			<a href="fsd_view.php" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm" title="View">
																				<i class="bi bi-eye-fill eyc"></i>
																			</a>
																			<button class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
																				<i class="fas fa-ellipsis-v eyc"></i>
																			</button>
																			<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px py-3" data-kt-menu="true" style="">
																				<div class="menu-item px-3">
																					<a href="fsd.php" target="_blank" class="menu-link px-3">Jewel Settlement</a>
																				</div>
																			</div>
																		</span>
																	</td>
																</tr>
																<tr>
																	<td>5</td>
																	<td>19/03/2023</td>
																	<td class="ple1">AGB - Main Branch Sayalkudi</td>
																	<td class="ple1">
																		<span>TIP-354/23</span>
																		<span class="btn btn-icon btn-circle fs-8 fw-bold shadow text-white mb-1" style="background:red;width: 20px !important;height: 20px !important;float: right;">LI</span>
																	</td>
																	<td class="ple1">
																		<span><i class="fa-solid fa-star fs-7" style="color:#50cd89;"></i></span>
																		<span class="align-items-center">Prbhakaran</span>
																	</td>
																	<td>TIP - 2.5</td>
																	<td>Gold</td>
																	<td>1</td>
																	<td class="ple1">19000.00</td>
																	<td>
																		<label class="col-form-label fw-semibold fs-7" name="" id="" ><span style="background-color:#ffdf6f;border-radius: 8px;padding: 5px 15px 5px 15px;">Customer Close</span>
																		</label>
																	</td>
																	<td>
																		<span class="text-end">
																			<a href="fsd_view.php" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm" title="View">
																				<i class="bi bi-eye-fill eyc"></i>
																			</a>
																			<button class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
																				<i class="fas fa-ellipsis-v eyc"></i>
																			</button>
																			<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px py-3" data-kt-menu="true" style="">
																				<div class="menu-item px-3">
																					<a href="javascript:;" class="menu-link flex-stack px-3" data-bs-toggle="modal" data-bs-target="#kt_modal_verify_lockout">Lock Out</a>
																				</div>
																				<div class="menu-item px-3">
																					<a href="fsd.php" target="_blank" class="menu-link px-3">Jewel Settlement</a>
																				</div>
																			</div>
																		</span>
																	</td>
																</tr>
															</tbody>
														</table>
													</div>
												</div>
									    </div> -->
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
				<?php include "footer.php"?>
				</div>
				<!--end::Wrapper-->
			</div>
			<!--end::Page-->
		</div>
		<!--end::Root-->
		<!--begin::Modal - verify Lock Out-->
		<div class="modal fade" id="kt_modal_verify_lockout" tabindex="-1" aria-hidden="true">
			<!--begin::Modal dialog-->
			<div class="modal-dialog modal-m">
				<!--begin::Modal content-->
				<div class="modal-content rounded">
					<div class="swal2-icon swal2-warning swal2-icon-show" style="display: flex;">
						<div class="swal2-icon-content">&#x2713;</div></div>
						<div class="swal2-html-container" id="swal2-html-container" style="display: block;">
							<b><span>MIP-260/23</span></b>
							<p class="mt-2">Are you sure you want to Lock Out?</p></div>
						<div class="d-flex flex-center flex-row-fluid pt-3">
							<button type="submit" class="btn btn-primary me-3" data-bs-dismiss="modal">Yes</button>
							<button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
						</div><br><br>
				</div>
				<!--end::Modal content-->
			</div>
			<!--end::Modal dialog-->
		</div>
		<!--end::Modal - verify Lock Out-->
		<!--begin::Modal - Convert Old Gold-->
		<div class="modal fade" id="convert_old_gold" tabindex="-1" aria-hidden="true">
			<!--begin::Modal dialog-->
			<div class="modal-dialog modal-m">
				<!--begin::Modal content-->
				<div class="modal-content rounded">
					<div class="swal2-icon swal2-warning swal2-icon-show" style="display: flex;">
						<div class="swal2-icon-content">&#x2713;</div></div>
						<div class="swal2-html-container" id="swal2-html-container" style="display: block;">
							<b><span>MIP-260/23</span></b>
							<p class="mt-2">Are you sure you want to Convert Old Gold?</p></div>
						<div class="d-flex flex-center flex-row-fluid pt-3">
							<button type="submit" class="btn btn-primary me-3" data-bs-dismiss="modal">Yes</button>
							<button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
						</div><br><br>
				</div>
				<!--end::Modal content-->
			</div>
			<!--end::Modal dialog-->
		</div>
		<!--end::Modal - Convert Old Gold-->
		<!--begin::Modal - convert old gold pledge item-->
		<div class="modal fade" id="kt_modal_update_pledge_items" tabindex="-1" aria-hidden="true">
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
					<!--begin::Modal body-->
					<div class="modal-body pt-0 pb-15 px-5 px-xl-20">
						<!--begin::Heading-->
						<div class="mb-13 text-center">
							<h1 class="mb-3">Update Pledge Item</h1>
						</div>
						<div class="row">
							<label class="col-lg-1 col-form-label fw-semibold fs-6">Date</label>
							<label class="col-lg-2 col-form-label fw-bold fs-6">20-01-2023</label>
							<label class="col-lg-1 col-form-label fw-semibold fs-6">Company</label>
							<label class="col-lg-5 col-form-label fw-bold fs-6">AGB - Main Branch Sayalkudi</label>
							<label class="col-lg-1 col-form-label fw-semibold fs-6">Loan No</label>
							<label class="col-lg-2 col-form-label fw-bold fs-6">MIP-256/23</label>
						</div>
						<div class="row mt-4">
          		<!-- <label class="col-form-label fw-bold fs-5">Pledge Items</label> -->
          		<table class="table align-middle table-row-dashed table-striped table-hover fs-7 gy-1 gs-2" id="update_pledge_item">
								<thead>
									<tr class="text-start text-muted fw-bold fs-7 gs-0">
										<th class="min-w-25px">Sno</th>
				            <th class="min-w-100px">Item-Sub Item</th>
				            <th class="min-w-50px">Quality</th>
				            <th class="min-w-50px">Purity(%)</th>
				            <th class="min-w-80px">Weight(gms)</th>
				            <th class="min-w-50px">St.Wgt(gms)</th>
				            <th class="min-w-50px">Less(gms)</th>
				            <th class="min-w-80px">Nt Wgt(gms)</th>
				            <th class="min-w-50px">Img</th>
									</tr>
								</thead>
								<tbody class="text-gray-600 fw-semibold">
									<tr>
										<td>1</td>
				            <td class="ple1">
				            	<!-- <span class="btn btn-icon btn-circle fs-8 fw-bold shadow text-white mb-1" style="background:red;width: 20px !important;height: 20px !important;">BJ</span> -  -->
				            	<span>Chain-Hand Chain</span>
				            </td>
				            <td>KDM</td>
				            <td>
				            	<input type="text" class="form-control form-control-lg form-control-solid fs-7" value="91">
				            </td>
				            <td>
				            	<input type="text" class="form-control form-control-lg form-control-solid fs-7" value="2.400">
				            </td>
				            <td>
				            	<input type="text" class="form-control form-control-lg form-control-solid fs-7" value="0.100">
				            </td>
				            <td>
				            	<input type="text" class="form-control form-control-lg form-control-solid fs-7" value="0.100">
				            </td>
				            <td>
				            	<input type="text" class="form-control form-control-lg form-control-solid fs-7" value="2.200">
				            </td>
				            <td>
				            	<div class="image-input mt-2 me-6" data-kt-image-input="true">
												<div class="image-input-wrapper w-40px h-40px"style="background-image: url(assets/images/sample_jewel.jpg)"></div>
											</div>
				            </td>
				        	</tr>
						   		<tr>
						   			<td>2</td>
				            <td>Chain-Baby Chain</td>
				            <td>KDM</td>
				            <td>
				            	<input type="text" class="form-control form-control-lg form-control-solid fs-7" value="91">
				            </td>
				            <td>
				            	<input type="text" class="form-control form-control-lg form-control-solid fs-7" value="1.200">
				            </td>
				            <td>
				            	<input type="text" class="form-control form-control-lg form-control-solid fs-7" value="0.100">
				            </td>
				            <td>
				            	<input type="text" class="form-control form-control-lg form-control-solid fs-7" value="0.100">
				            </td>
				            <td>
				            	<input type="text" class="form-control form-control-lg form-control-solid fs-7" value="1.000">
				            </td>
				            <td>
				            	<div class="image-input mt-2 me-6" data-kt-image-input="true">
												<div class="image-input-wrapper w-40px h-40px"style="background-image: url(assets/images/sample_jewel.jpg)"></div>
											</div>
				            </td>
						       </tr>
							   </tbody>
							   <!-- <tfoot>
									<tr class="text-start text-muted fw-bold fs-6 gs-0">
										<th class="min-w-50px"></th>
				            <th class="min-w-100px"></th>
				            <th class="min-w-50px"></th>
				            <th class="min-w-50px">Total</th>
				            <th class="min-w-80px">3.600</th>
				            <th class="min-w-50px">0.200</th>
				            <th class="min-w-50px">0.200</th>
				            <th class="min-w-80px">3.200</th>
				            <th class="min-w-50px"></th>
									</tr>
								</tfoot> -->
							</table>
          	</div>
          	<div class="row">
							<label class="col-lg-1 col-form-label fw-semibold fs-6">Weight</label>
							<label class="col-lg-1 col-form-label fw-bold fs-6">3.600</label>
							<label class="col-lg-1 col-form-label fw-semibold fs-6">Stoneless</label>
							<label class="col-lg-1 col-form-label fw-bold fs-6">0.200</label>
							<label class="col-lg-1 col-form-label fw-semibold fs-6">Less</label>
							<label class="col-lg-1 col-form-label fw-bold fs-6">0.200</label>
							<label class="col-lg-1 col-form-label fw-semibold fs-6">Net.Wght</label>
							<label class="col-lg-1 col-form-label fw-bold fs-6">3.200</label>
							<label class="col-lg-1 col-form-label fw-semibold fs-6">CurrRate</label>
							<label class="col-lg-1 col-form-label fw-bold fs-6">4571.00</label>
							<label class="col-lg-1 col-form-label fw-semibold fs-6">Purity%</label>
							<label class="col-lg-1 col-form-label fw-bold fs-6">91</label>
						</div>
						<div class="d-flex justify-content-end mt-4">
							<button type="reset" class="btn btn-secondary me-3" data-bs-dismiss="modal">Cancel</button>
							<button type="submit" class="btn btn-primary">Update</button>
						</div>
						<!--end::Modal body-->
					</div>

				</div>
				<!--end::Modal content-->
			</div>
		</div>
		<!--end::convert old gold pledge item-->
	<?php include "script.php"?>
	<!-- <script src="js/newloan-list.js"></script> -->
	<!-- loan list day fillter start -->
		<script>
			function date_fill_loan_list()
			{
				var dt_fill_loan_list = document.getElementById('dt_fill_loan_list').value;
				var today_dt_loan_list = document.getElementById('today_dt_loan_list');
				var week_from_dt_loan_list = document.getElementById('week_from_dt_loan_list');
				var week_to_dt_loan_list = document.getElementById('week_to_dt_loan_list');
				var monthly_dt_loan_list = document.getElementById('monthly_dt_loan_list');
				var from_dt_loan_list = document.getElementById('from_dt_loan_list');
				var to_dt_loan_list = document.getElementById('to_dt_loan_list');
				var from_date_fillter_loan_list = document.getElementById('from_date_fillter_loan_list');
				var to_date_fillter_loan_list = document.getElementById('to_date_fillter_loan_list');

				if (dt_fill_loan_list == "today") 
				{
					today_dt_loan_list.style.display = "block";
					monthly_dt_loan_list.style.display = "none";
					from_dt_loan_list.style.display = "none";
					to_dt_loan_list.style.display = "none";
					week_from_dt_loan_list.style.display = "none";
					week_to_dt_loan_list.style.display = "none";
					$("#today_date_fillter_loan_list").flatpickr({
								dateFormat: "d-m-Y",
							});
				}
				else if (dt_fill_loan_list == "week")
				{
					today_dt_loan_list.style.display = "none";
					week_from_dt_loan_list.style.display = "block";
					week_to_dt_loan_list.style.display = "block";
					monthly_dt_loan_list.style.display = "none";
					from_dt_loan_list.style.display = "none";
					to_dt_loan_list.style.display = "none";

					var curr = new Date; // get current date
					var first = curr.getDate() - curr.getDay(); // First day is the day of the month - the day of the week
					var last = first + 6; // last day is the first day + 6

					var firstday = new Date(curr.setDate(first)).toISOString().slice(0,10);
					firstday = firstday.split("-").reverse().join("-");
					var lastday = new Date(curr.setDate(last)).toISOString().slice(0,10);
					lastday = lastday.split("-").reverse().join("-");
					$('#week_from_date_fillter_loan_list').val(firstday);
					$('#week_to_date_fillter_loan_list').val(lastday);
					
				}
				else if (dt_fill_loan_list == "monthly")
				{
					today_dt_loan_list.style.display = "none";
					monthly_dt_loan_list.style.display = "block";
					from_dt_loan_list.style.display = "none";
					to_dt_loan_list.style.display = "none";
					week_from_dt_loan_list.style.display = "none";
					week_to_dt_loan_list.style.display = "none";
					$("#monthly_date_fillter_loan_list").flatpickr({
								dateFormat: "m-Y",
							});
				}
				else if (dt_fill_loan_list == "custom Date")
				{
					today_dt_loan_list.style.display = "none";
					monthly_dt_loan_list.style.display = "none";
					from_dt_loan_list.style.display = "block";
					to_dt_loan_list.style.display = "block";
					week_from_dt_loan_list.style.display = "none";
					week_to_dt_loan_list.style.display = "none";

					$("#from_date_fillter_loan_list").flatpickr({
								dateFormat: "d-m-Y",
							});
					$("#to_date_fillter_loan_list").flatpickr({
								dateFormat: "d-m-Y",
							});
				}
				else
				{
					today_dt_loan_list.style.display = "none";
					monthly_dt_loan_list.style.display = "none";
					from_dt_loan_list.style.display = "none";
					to_dt_loan_list.style.display = "none";
					week_from_dt_loan_list.style.display = "none";
					week_to_dt_loan_list.style.display = "none";
				}
			}
		</script>
		<!-- loan list day fillter end -->
	<script>
		function gen_svg()
		{
			var svg_gen = document.getElementById("svg_gen");
			svg_gen.style.visibility = "visible";
			setTimeout(function() {
				         svg_gen.style.visibility = "hidden";
				        }, 2000);
		}
	</script>
		<script>
		      $("#kt_datatable_dom_positioning").kendoTooltip({
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
		      $("#update_pledge_item").kendoTooltip({
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
   		<!-- <script>
		      $("#kt_datatable_dom_positioning_closed").kendoTooltip({
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
   		</script> -->
   		<script>
			$("#update_pledge_item").DataTable({
				// "ordering": false,
				"aaSorting":[],
				 "language": {
				  "lengthMenu": "Show _MENU_",
				 },
				 "dom":
				  "<'row'" +
				  // "<'col-sm-6 d-flex align-items-center justify-conten-start'l>" +
				  // "<'col-sm-6 d-flex align-items-center justify-content-end'f>" +
				  ">" +

				  "<'table-responsive'tr>" +

				  "<'row'" +
				  "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
				  // "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
				  ">"
				});
			$('#update_pledge_item').wrap('<div class="dataTables_scroll" />');
		</script>
	   		<script>
			$("#kt_datatable_dom_positioning_add_loan").DataTable({
				// "ordering": false,
				"aaSorting":[],
				 "language": {
				  "lengthMenu": "Show _MENU_",
				 },
				 "dom":
				  "<'row'" +
				  // "<'col-sm-6 d-flex align-items-center justify-conten-start'l>" +
				  // "<'col-sm-6 d-flex align-items-center justify-content-end'f>" +
				  ">" +

				  "<'table-responsive'tr>" +

				  "<'row'" +
				  "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
				  // "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
				  ">"
				});
			$('#kt_datatable_dom_positioning_add_loan').wrap('<div class="dataTables_scroll" />');
		</script>
		<script>
			$("#kt_datatable_dom_positioning").DataTable({
				// "ordering": false,
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
		<!-- <script>
			$("#kt_datatable_dom_positioning_closed").DataTable({
				// "ordering": false,
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
		</script> -->
		<script>
			$("#kt_datepicker_From").flatpickr({
				dateFormat: "d-m-Y",
			});
			$("#kt_datepicker_To").flatpickr({
				dateFormat: "d-m-Y",
			});
			$("#kt_datepicker_new_loan_date").flatpickr({
				dateFormat: "d-m-Y",
			});
			$("#kt_datepicker_edit_loan_date").flatpickr({
				dateFormat: "d-m-Y",
			});
			$("#kt_datepicker_view_loan_date").flatpickr({
				dateFormat: "d-m-Y",
			});
			$("#kt_datepicker_new_hf_loan_due_date").flatpickr({
				dateFormat: "d-m-Y",
			});
		</script>
	</body>
	<!--end::Body-->
	</html>