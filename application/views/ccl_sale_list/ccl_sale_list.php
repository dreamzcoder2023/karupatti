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
  #dfn #c_nme {
		  display: none;
			}
	#dfn:hover #c_nme {
	  display: block;
	  position: absolute;
	  margin-top: -4.5em;
	  margin-left: 4.5em !important;
	  color: white;
	  background: black;
	  padding: 3px 13px 3px 10px;
	  border-radius: 5px;

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
									<h1 class="d-flex align-items-center text-dark fw-bold my-1 fs-3">CCL Sale List
									<!--begin::Separator-->
									<span class="h-20px border-gray-400 border-start ms-3 mx-2"></span>
									<label class="d-flex align-items-center text-primary fw-bold my-1 fs-5">
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
										<!--begin::Card body-->
										<div class="card-body py-4">
											<div class="loader">
											</div>
											<div class="mb-5 hover-scroll-x">
												<div class="d-grid">
													<ul class="nav nav-tabs flex-nowrap text-nowrap">
														<li class="nav-item">
															<a class="nav-link active btn btn-active-light btn-color-black-800 btn-active-color-primary rounded-bottom-0 fw-bold fs-6" data-bs-toggle="tab" href="#ccl_pending_list">CCL Pending List</a>
														</li>
														<li class="nav-item">
															<a class="nav-link btn btn-active-light btn-color-black-800 btn-active-color-primary rounded-bottom-0 fw-bold fs-6" data-bs-toggle="tab" href="#ccl_completed_list">CCL Completed List</a>
														</li>
													</ul>
												</div>
											</div>
											<div class="tab-content" id="myTabContent">
												<div class="tab-pane fade show active" id="ccl_pending_list" role="tabpanel">
													<div class="row">
														<div class="col-lg-8">
															<!-- <div class="row">
																<div class="col-lg-6">
																	<div class="text-center">
																		<label class="form-label fs-2 fw-bold">Total Count</label>
																	</div>
																	<div class="text-center">
																		<label class="text-success fs-2 fw-bold">15</label>
																	</div>
																</div>
																<div class="col-lg-6">
																	<div class="text-center">
																		<label class="form-label fs-2 fw-bold">Total Weight(gms)</label>
																	</div>
																	<div class="text-center">
																		<label class="text-success fs-2 fw-bold">163.00</label>
																	</div>
																</div>
															</div> -->
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
																			<label class="form-label fs-6 fw-semibold">Status</label>
																			<select class="form-select form-select-solid fw-semibold" data-control="select2" data-close-on-select="true">	
																				<option value="all" selected>All</option>
																				<option value="1">Request Send</option>
																				<option value="2">Rejected</option>
																			</select>
																		</div>
																		<div class="mb-2">
																			<label class="form-label">Date</label>
																			<select class="form-select form-select-solid" data-control="select2" data-hide-search="true" id="dt_fill_nontag_list" onchange="date_fill_nontag_list();">	
																				<option value="all">All</option>
																				<option value="today">Today</option>
																				<option value="week">This Week</option>
																				<option value="monthly">This Month</option>
																				<option value="custom Date">Custom Date</option>
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
																				<input class="form-control form-control-solid ps-12" name="" placeholder="Date" id="today_date_fillter_nontag_list" value="<?php echo date("d-m-Y"); ?>" disabled />
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
																				<input class="form-control form-control-solid ps-12" name="" placeholder="Month" id="monthly_date_fillter_nontag_list" value="<?php echo date("m-Y"); ?>" />
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
																				<input class="form-control form-control-solid ps-12" name="" placeholder="From Date" id="from_date_fillter_nontag_list" value="<?php echo date("d-m-Y"); ?>" />
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
																				<input class="form-control form-control-solid ps-12" name="" placeholder="To Date" id="to_date_fillter_nontag_list" value="<?php echo date("d-m-Y"); ?>"/>
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
													<div class="row">
														<table id="kt_datatable_ccl_pending_list_table" class="table align-middle table-row-dashed table-striped table-hover fs-7 gy-1 gs-2 dataTable">
																<thead>
																   <tr class="text-start text-muted fw-bold fs-7 gs-0">
																   	<th class="min-w-50px">SNo</th>
																   	<th class="min-w-50px">Date</th>
										        				<th class="min-w-150px">Company</th>
																    <th class="min-w-80px">Loan No</th>
																		<th class="min-w-50px">Party Info</th>
																		<th class="min-w-100px">No of Item</th>
																		<th class="min-w-100px">Request Amount</th>
																		<th class="min-w-80px">Status</th>
																		<th class="min-w-50px">Action</th>
																     </tr>
																</thead>
																<tbody class="text-gray-600 fw-semibold">
																	<?php $i=0; foreach($ccl_pending as $ccl_pend){ ?>
																	<tr>
																		<td><?php echo $i+1; ?></td>
																		<td><?php echo $ccl_pend['ccl_date']; ?></td>
																		<td class="ple1"><?php 
																				$comp_res=$this->db->query("select * from COMPANY where COMPANYCODE='".$ccl_pend['company_code']."'")->row();
																				echo $comp_res->COMPANYNAME;?></td>
																		<td class="ple1"><?php echo $ccl_pend['billno']; ?></td>
																		<td class="ple1">
																			<?php 
																					$party_res=$this->db->query("select NAME, RATING, PID from PARTIES where PID='".$ccl_pend['pid']."'")->row();
																				?>
																			<span>
																				<?php if ($party_res->RATING==3){ ?>
																					<i class="fa-solid fa-star fs-7" style="color:#50cd89;"></i>
																					<?php }else if($party_res->RATING==2){?>
																						<i class="fa-solid fa-star fs-7" style="color:#ffc700;"></i>
																					<?php }else if($party_res->RATING==1){?>
																						<i class="fa-solid fa-star fs-7" style="color:#f1416c;"></i>
																					<?php }else {?>
																						<i class="fa-solid fa-star fs-7" style="color:#d2d4dc;"></i>
																					<?php }?>
																			</span>
																			<span class="align-items-center"><?php echo $party_res->NAME; ?></span>
																		</td>
																		<td><span class="me-3"><?php $pl_count=$this->db->query("select count(*) as cnt from PLEDGEINFO where BILLNO='".$ccl_pend['billno']."'")->row(); 
																				echo $pl_count->cnt; ?></span>
																				<?php 
																				$loan_res=$this->db->query("select * from LOANS where BILLNO='".$ccl_pend['billno']."'")->row();
																				if($loan_res->CLOSING_STATUS=='COMPANY_CLOSE'){ ?>
																					<!-- <span class="btn btn-icon btn-circle fs-8 fw-bold  text-black mb-1" style="background:#b0dfff;width: 25px !important;height: 25px !important;float: right;">CL</span> -->
																					
																					<span class="badge badge-circle text-black" style="background:#b0dfff;">CL</span>
																				<?php }
																				if($loan_res->CLOSING_STATUS=='CUSTOMER_SALE'){ ?>
																					<!-- <span class="btn btn-icon btn-circle fs-8 fw-bold  text-black mb-1" style="background:#fbe2d5;width: 25px !important;height: 25px !important;float: right;">CS</span> -->
																					<span class="badge badge-circle text-black" style="background:#fbe2d5;">CS</span>
																				<?php }	?>

																			</td>
																		<td class="ple1"><?php echo $ccl_pend['curr_sales_amount'] ?></td>
																		<td>
																			<?php if($ccl_pend['ccl_status']=='Request'){ ?>
																			<label class="col-form-label fw-semibold fs-7" name="" id="" ><span style="background-color:#b0dfff;border-radius: 8px;padding: 5px 15px 5px 15px;">Request Send</span>
																			</label>
																			<?php } ?>
																			<?php if($ccl_pend['ccl_status']=='Reject'){ ?>
																			<label class="col-form-label fw-semibold fs-7" id="dfn">
																				<span class="me-2" style="background-color:red;color: white;border-radius: 8px;padding: 5px 15px 5px 15px;">Rejected</span>
																				<a href="javascript:;" class="menu-link flex-stack align-items-center" onclick="show_desc(<?php echo $ccl_pend['ccl_sale_list_id']; ?>)">
																					<i class="fas fa-info-circle fs-6" style="color:black;" title="<?php echo $ccl_pend['description']; ?>"></i>
																				</a>
																			</label>
																		<?php } ?>
																		</td>
																		<td>
																			<span class="text-end">
																				<a href="#" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm" 	data-bs-toggle="modal" data-bs-target="#kt_modal_view_ccl_pending_list" onclick="return ccl_sale_view(<?php echo $ccl_pend['ccl_sale_list_id']; ?>);" >
																					<i class="bi bi-eye-fill eyc"></i>
																				</a>
																				<?php if($ccl_pend['ccl_status']=='Reject'){ ?>
																				<a href="javascript:;" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1" data-bs-toggle="modal" data-bs-target="#kt_modal_edit_ccl_pending_list" onclick="return ccl_sale_edit(<?php echo $ccl_pend['ccl_sale_list_id']; ?>)">
																					<!--begin::Svg Icon | path: icons/duotune/art/art005.svg-->
																					<span class="svg-icon svg-icon-3">
																						<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																							<path opacity="0.3" d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z" fill="currentColor"></path>
																							<path d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z" fill="currentColor"></path>
																						</svg>
																					</span>
																					<!--end::Svg Icon-->
																				</a>
																			<?php } ?>
																			</span>
																		</td>
																	</tr>
																	<?php $i++; } ?>
																</tbody>
														</table>
													</div>
													<!-- <hr> -->
													
												</div>
												<div class="tab-pane fade" id="ccl_completed_list" role="tabpanel">
													<div class="row">
														<div class="col-lg-8">
															<!-- <div class="row">
																<div class="col-lg-6">
																	<div class="text-center">
																		<label class="form-label fs-2 fw-bold">Total Count</label>
																	</div>
																	<div class="text-center">
																		<label class="text-success fs-2 fw-bold">40</label>
																	</div>
																</div>
																<div class="col-lg-6">
																	<div class="text-center">
																		<label class="form-label fs-2 fw-bold">Total Weight(gms)</label>
																	</div>
																	<div class="text-center">
																		<label class="text-success fs-2 fw-bold">72.200</label>
																	</div>
																</div>
															</div> -->
														</div>
														<div class="col-lg-4">
															<div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
																<button type="button" class="btn btn-sm btn-outline btn-outline-solid btn-outline-warning btn-active-light-primary me-3" data-bs-toggle="modal" data-bs-target="#">
																	Export</button>
															</div>
														</div>
													</div>
													<div class="row">
															<table id="kt_datatable_ccl_completed_list" class="table align-middle table-row-dashed table-striped table-hover fs-7 gy-1 gs-2 dataTable">
																	<thead>
																	   <tr class="text-start text-muted fw-bold fs-7 gs-0">
																	   	<th class="min-w-50px">SNo</th>
																	   	<th class="min-w-50px">Date</th>
											        				<th class="min-w-150px">Company</th>
																	    <th class="min-w-80px">Loan No</th>
																			<th class="min-w-50px">Party Info</th>
																			<th class="min-w-100px">No of Item</th>
																			<th class="min-w-100px">Request Amount</th>
																			<th class="min-w-80px">Status</th>
																			<th class="min-w-50px">Action</th>
																	     </tr>
																	</thead>
																	<tbody class="text-gray-600 fw-semibold">

																		<?php $i=0; foreach($ccl_closing as $ccl_cls){ ?>
																		<tr>
																			<td><?php echo $i+1; ?></td>
																			<td><?php echo $ccl_cls['ccl_date']; ?></td>
																			<td class="ple1"><?php 
																				$comp_res=$this->db->query("select * from COMPANY where COMPANYCODE='".$ccl_cls['company_code']."'")->row();
																				echo $comp_res->COMPANYNAME;?>
																			</td>
																			<td class="ple1"><?php echo $ccl_cls['billno']; ?></td>
																			<td class="ple1">
																				<?php 
																					$party_res=$this->db->query("select NAME, RATING, PID from PARTIES where PID='".$ccl_cls['pid']."'")->row();
																				?>
																				<span>
																					<?php if ($party_res->RATING==3){ ?>
																					<i class="fa-solid fa-star fs-7" style="color:#50cd89;"></i>
																					<?php }else if($party_res->RATING==2){?>
																						<i class="fa-solid fa-star fs-7" style="color:#ffc700;"></i>
																					<?php }else if($party_res->RATING==1){?>
																						<i class="fa-solid fa-star fs-7" style="color:#f1416c;"></i>
																					<?php }else {?>
																						<i class="fa-solid fa-star fs-7" style="color:#d2d4dc;"></i>
																					<?php }?>
																				</span>
																				<span class="align-items-center"><?php echo $party_res->NAME; ?></span>
																			</td>
																			<td><span class="me-3"><?php $pl_count=$this->db->query("select count(*) as cnt from PLEDGEINFO where BILLNO='".$ccl_cls['billno']."'")->row(); 
																				echo $pl_count->cnt; ?></span>
																				<?php 
																				$loan_res=$this->db->query("select * from LOANS where BILLNO='".$ccl_cls['billno']."'")->row();
																				if($loan_res->CLOSING_STATUS=='COMPANY_CLOSE'){ ?>
																					<!-- <span class="btn btn-icon btn-circle fs-8 fw-bold  text-black mb-1" style="background:#b0dfff;width: 25px !important;height: 25px !important;float: right;">CL</span> -->
																					
																					<span class="badge badge-circle text-black" style="background:#b0dfff;">CL</span>
																				<?php }
																				if($loan_res->CLOSING_STATUS=='CUSTOMER_SALE'){ ?>
																					<!-- <span class="btn btn-icon btn-circle fs-8 fw-bold  text-black mb-1" style="background:#fbe2d5;width: 25px !important;height: 25px !important;float: right;">CS</span> -->
																					<span class="badge badge-circle text-black" style="background:#fbe2d5;">CS</span>
																				<?php }	?>
</td>
																			<td class="ple1"><?php echo $ccl_cls['curr_sales_amount'] ?></td>
																			<td>
																				<label class="col-form-label fw-semibold fs-7" name="" id="" ><span style="background-color:#a3ff9b;border-radius: 8px;padding: 5px 15px 5px 15px;">Accepted</span>
																				</label>
																			</td>
																			<td>
																				<span class="text-end">
																					<a href="#" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm" data-bs-toggle="modal" data-bs-toggle="modal" data-bs-target="#kt_modal_view_ccl_pending_list" onclick="return ccl_sale_view(<?php echo $ccl_cls['ccl_sale_list_id']; ?>);">
																						<i class="bi bi-eye-fill eyc"></i>
																					</a>
																				</span>
																			</td>
																		</tr>
																	<?php $i++; } ?>
																	</tbody>
															</table>
													</div>
												</div>
											</div>
										</div>
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
		
		<!--begin::Modal - verify send Request-->
		<div class="modal fade" id="kt_modal_delete_ccl_pending_list" tabindex="-1" aria-hidden="true">
			<!--begin::Modal dialog-->
			<div class="modal-dialog modal-m">
				<!--begin::Modal content-->
				<div class="modal-content rounded">
					<div class="swal2-icon swal2-warning swal2-icon-show" style="display: flex;">
						<div class="swal2-icon-content">&#x2713;</div></div>
						<div class="swal2-html-container" id="swal2-html-container" style="display: block;">
							<b><span>MIP-256/23</span></b>
							<p class="mt-2">Are you sure you want to Delete?</p></div>
						<div class="d-flex flex-center flex-row-fluid pt-3">
							<button type="submit" class="btn btn-primary me-3" data-bs-dismiss="modal">Yes</button>
							<button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
						</div><br><br>
				</div>
				<!--end::Modal content-->
			</div>
			<!--end::Modal dialog-->
		</div>
		<!--end::Modal - verify send Request-->
		<!--begin::Modal - verify send Request-->
		<div class="modal fade" id="kt_modal_send_request" tabindex="-1" aria-hidden="true">
			<!--begin::Modal dialog-->
			<div class="modal-dialog modal-m">
				<!--begin::Modal content-->
				<div class="modal-content rounded">
					<div class="swal2-icon swal2-warning swal2-icon-show" style="display: flex;">
						<div class="swal2-icon-content">&#x2713;</div></div>
						<div class="swal2-html-container" id="swal2-html-container" style="display: block;">
							<b><span>MIP-256/23</span></b>
							<p class="mt-2">Are you sure you want to Send Request?</p></div>
						<div class="d-flex flex-center flex-row-fluid pt-3">
							<button type="submit" class="btn btn-primary me-3" data-bs-dismiss="modal">Yes</button>
							<button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
						</div><br><br>
				</div>
				<!--end::Modal content-->
			</div>
			<!--end::Modal dialog-->
		</div>
		<!--end::Modal - verify send Request-->
		<!--begin::Modal - View Reject a Description-->
		<div class="modal fade" id="kt_modal_description" tabindex="-1" aria-hidden="true">
			<!--begin::Modal dialog-->
			<div class="modal-dialog modal-xs">
				<!--begin::Modal content-->
				<div class="modal-content rounded">
					<!--begin::Modal header-->
					<div class="modal-header justify-content-end border-0 pb-0">
						<!--begin::Close-->
						<div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal" onclick="close_ccl_desc_modal()">
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
						<div class="mb-1 text-center">
							<h1>Reject Reason</h1>
						</div>
						<div class="row">
							<label class="col-lg-12 col-form-label fw-semibold fs-6">Description</label>
							<label class="col-lg-12 col-form-label fw-bold fs-6" id="lbl_description">The Jewel Value is maximum 15,000.00</label>
						</div>
					</div>
					<!--end::Modal body-->
				</div>
				<!--end::Modal content-->
			</div>
			<!--end::Modal dialog-->
		</div>
		<!--end::Modal -View Reject a Description-->
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
		<!--begin::Modal - Sale to CCL List Page-->
		<div class="modal fade" id="kt_modal_edit_ccl_pending_list" tabindex="-1" aria-hidden="true">
			
		</div>
		<!--end::Modal - Sale to CCL List Page-->
		<!--begin::Modal - Jewellery Accept View Page-->
		<div class="modal fade" id="kt_modal_jewellery_view_ccl_accept_list" tabindex="-1" aria-hidden="true">
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
						<div class="mb-1 text-center">
							<h1>View Sale Value for Pledge Item</h1>
						</div>
						<div class="d-flex align-items-center justify-content-end">
							<label class="col-form-label fw-bold fs-5">
								<span style="background-color:#b0dfff;border-radius: 8px;padding: 5px 15px 5px 15px;">Requested</span>
							</label>
							<!-- <label class="col-form-label fw-bold fs-5">
								<span style="background-color:red;color:white;border-radius: 8px;padding: 5px 15px 5px 15px;">Rejected</span>
							</label> -->
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
          		<table class="table align-middle table-row-dashed table-striped table-hover fs-7 gy-1 gs-2" id="ccl_pending_view">
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
				            <td class="ple1">Chain-Hand Chain</td>
				            <td>KDM</td>
				            <td>91</td>
				            <td>2.400</td>
				            <td>0.100</td>
				            <td>0.100</td>
				            <td>2.200</td>
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
				            <td>91</td>
				            <td>1.200</td>
				            <td>0.100</td>
				            <td>0.100</td>
				            <td>1.000</td>
				            <td>
				            	<div class="image-input mt-2 me-6" data-kt-image-input="true">
												<div class="image-input-wrapper w-40px h-40px"style="background-image: url(assets/images/sample_jewel.jpg)"></div>
											</div>
				            </td>
						       </tr>
							   </tbody>
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
						<div class="row">
							<label class="col-lg-1 col-form-label fw-semibold fs-6">Sales Amount</label>
							<label class="col-lg-2 col-form-label fw-bold fs-4" name="ccl_sale_amt" id="ccl_sale_amt" onkeyup="calcualte_curr_sale_rate_profit_loss()">20000.00</label>
							<label class="col-lg-1 col-form-label fw-semibold fs-6">Description</label>
							<div class="col-lg-4">
								<textarea class="form-control form-select-solid fw-semibold fs-5" rows="2" id=""></textarea>
								<div class="fv-plugins-message-container invalid-feedback"></div>
							</div>
						</div>
						<div class="d-flex align-items-center justify-content-end mt-2">
							<button type="reset" class="btn btn-danger me-3" data-bs-dismiss="modal">Reject</button>
							<button type="submit" class="btn btn-primary">Accept</button>
						</div>
						<!--end::Modal body-->
					</div>

				</div>
				<!--end::Modal content-->
			</div>
		</div>
		<!--end::Modal - Jewellery Accept View Page-->
		<!--begin::Modal - Sale to CCL View Page-->
		<div class="modal fade" id="kt_modal_view_ccl_pending_list" tabindex="-1" aria-hidden="true">
			
		</div>
		<!--end::Modal - Sale to CCL View Page-->
		<!--begin::Modal - Sale to CCL View Page-->
		<div class="modal fade" id="kt_modal_view_ccl_completed_list" tabindex="-1" aria-hidden="true">
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
						<div class="mb-1 text-center">
							<h1>View Sale Value for Pledge Item</h1>
						</div>
						<div class="d-flex align-items-center justify-content-end">
							<label class="col-form-label fw-bold fs-5">
								<span style="background-color:#a3ff9b;border-radius: 8px;padding: 5px 15px 5px 15px;">Accepted</span>
							</label>
						</div>
						<div class="row">
							<label class="col-lg-1 col-form-label fw-semibold fs-6">Date</label>
							<label class="col-lg-2 col-form-label fw-bold fs-6">20-01-2023</label>
							<label class="col-lg-1 col-form-label fw-semibold fs-6">Company</label>
							<label class="col-lg-5 col-form-label fw-bold fs-6">AGB - Main Branch Sayalkudi</label>
							<label class="col-lg-1 col-form-label fw-semibold fs-6">Loan No</label>
							<label class="col-lg-2 col-form-label fw-bold fs-6">TIP-266/23</label>
						</div>
						<div class="row mt-4">
          		<!-- <label class="col-form-label fw-bold fs-5">Pledge Items</label> -->
          		<table class="table align-middle table-row-dashed table-striped table-hover fs-7 gy-1 gs-2" id="ccl_completed_view">
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
				            <td class="ple1">Chain-Hand Chain</td>
				            <td>KDM</td>
				            <td>91</td>
				            <td>2.400</td>
				            <td>0.100</td>
				            <td>0.100</td>
				            <td>2.200</td>
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
				            <td>91</td>
				            <td>1.200</td>
				            <td>0.100</td>
				            <td>0.100</td>
				            <td>1.000</td>
				            <td>
				            	<div class="image-input mt-2 me-6" data-kt-image-input="true">
												<div class="image-input-wrapper w-40px h-40px"style="background-image: url(assets/images/sample_jewel.jpg)"></div>
											</div>
				            </td>
						       </tr>
							   </tbody>
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
						<div class="row">
							<label class="col-lg-1 col-form-label fw-semibold fs-6">Sales Amount</label>
							<label class="col-lg-3 col-form-label fw-bold fs-5">20000.00</label>
							<label class="col-lg-1 col-form-label fw-bold fs-6">
								<span style="background-color:#B6BD4F;border-radius: 8px;padding: 5px 15px 5px 15px;">Profit</span>
							</label>
							<!-- <label class="col-lg-1 col-form-label fw-bold fs-6">
								<span style="background-color:red;color: white; border-radius: 8px;padding: 5px 15px 5px 15px;">Loss</span>
							</label> -->
							<label class="col-lg-2 col-form-label fw-bold fs-5">5000.00</label>
							<label class="col-lg-1 col-form-label fw-semibold fs-6">Sales To</label>
							<label class="col-lg-4 col-form-label fw-bold fs-6">AGM - A GOLD MAIN - & OLD GOLD PURCHES</label>
						</div>
						<!--end::Modal body-->
					</div>

				</div>
				<!--end::Modal content-->
			</div>
		</div>
		<!--end::Modal - Sale to CCL View Page-->


		<?php $this->load->view("script"); ?>
		<!-- <script src="js/products-list.js"></script> -->
		<!-- non tag wallet history day fillter start -->
		<script>
		      $("#ccl_pending_edit").kendoTooltip({
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
			$("#ccl_pending_edit").DataTable({
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
			$('#ccl_pending_edit').wrap('<div class="dataTables_scroll" />');
		</script>
		<script>
		      $("#ccl_pending_view").kendoTooltip({
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
			$("#ccl_pending_view").DataTable({
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
			$('#ccl_pending_view').wrap('<div class="dataTables_scroll" />');
		</script>
		<script>
		      $("#ccl_completed_view").kendoTooltip({
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
			$("#ccl_completed_view").DataTable({
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
			$('#ccl_completed_view').wrap('<div class="dataTables_scroll" />');
		</script>
		
		<script>
		      $("#kt_datatable_ccl_completed_list").kendoTooltip({
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
			$("#kt_datatable_ccl_completed_list").DataTable({
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
			// $('#ccl_pending_view').wrap('<div class="dataTables_scroll" />');
		</script>
		
		<script>
			function date_fill_nontag_wallet_history()
			{
				var dt_fill_nontag_wallet_history = document.getElementById('dt_fill_nontag_wallet_history').value;
				var today_dt_nontag_wallet_history = document.getElementById('today_dt_nontag_wallet_history');
				var week_from_dt_nontag_wallet_history = document.getElementById('week_from_dt_nontag_wallet_history');
				var week_to_dt_nontag_wallet_history = document.getElementById('week_to_dt_nontag_wallet_history');
				var monthly_dt_nontag_wallet_history = document.getElementById('monthly_dt_nontag_wallet_history');
				var from_dt_nontag_wallet_history = document.getElementById('from_dt_nontag_wallet_history');
				var to_dt_nontag_wallet_history = document.getElementById('to_dt_nontag_wallet_history');
				var from_date_fillter_nontag_wallet_history = document.getElementById('from_date_fillter_nontag_wallet_history');
				var to_date_fillter_nontag_wallet_history = document.getElementById('to_date_fillter_nontag_wallet_history');

				if (dt_fill_nontag_wallet_history == "today") 
				{
					today_dt_nontag_wallet_history.style.display = "block";
					monthly_dt_nontag_wallet_history.style.display = "none";
					from_dt_nontag_wallet_history.style.display = "none";
					to_dt_nontag_wallet_history.style.display = "none";
					week_from_dt_nontag_wallet_history.style.display = "none";
					week_to_dt_nontag_wallet_history.style.display = "none";
					$("#today_date_fillter_nontag_wallet_history").flatpickr({
								dateFormat: "d-m-Y",
							});
				}
				else if (dt_fill_nontag_wallet_history == "week")
				{
					today_dt_nontag_wallet_history.style.display = "none";
					week_from_dt_nontag_wallet_history.style.display = "block";
					week_to_dt_nontag_wallet_history.style.display = "block";
					monthly_dt_nontag_wallet_history.style.display = "none";
					from_dt_nontag_wallet_history.style.display = "none";
					to_dt_nontag_wallet_history.style.display = "none";

					var curr = new Date; // get current date
					var first = curr.getDate() - curr.getDay(); // First day is the day of the month - the day of the week
					var last = first + 6; // last day is the first day + 6

					var firstday = new Date(curr.setDate(first)).toISOString().slice(0,10);
					firstday = firstday.split("-").reverse().join("-");
					var lastday = new Date(curr.setDate(last)).toISOString().slice(0,10);
					lastday = lastday.split("-").reverse().join("-");
					$('#week_from_date_fillter_nontag_wallet_history').val(firstday);
					$('#week_to_date_fillter_nontag_wallet_history').val(lastday);
					
				}
				else if (dt_fill_nontag_wallet_history == "monthly")
				{
					today_dt_nontag_wallet_history.style.display = "none";
					monthly_dt_nontag_wallet_history.style.display = "block";
					from_dt_nontag_wallet_history.style.display = "none";
					to_dt_nontag_wallet_history.style.display = "none";
					week_from_dt_nontag_wallet_history.style.display = "none";
					week_to_dt_nontag_wallet_history.style.display = "none";
					$("#monthly_date_fillter_nontag_wallet_history").flatpickr({
								dateFormat: "m-Y",
							});
				}
				else if (dt_fill_nontag_wallet_history == "custom Date")
				{
					today_dt_nontag_wallet_history.style.display = "none";
					monthly_dt_nontag_wallet_history.style.display = "none";
					from_dt_nontag_wallet_history.style.display = "block";
					to_dt_nontag_wallet_history.style.display = "block";
					week_from_dt_nontag_wallet_history.style.display = "none";
					week_to_dt_nontag_wallet_history.style.display = "none";

					$("#from_date_fillter_nontag_wallet_history").flatpickr({
								dateFormat: "d-m-Y",
							});
					$("#to_date_fillter_nontag_wallet_history").flatpickr({
								dateFormat: "d-m-Y",
							});
				}
				else
				{
					today_dt_nontag_wallet_history.style.display = "none";
					monthly_dt_nontag_wallet_history.style.display = "none";
					from_dt_nontag_wallet_history.style.display = "none";
					to_dt_nontag_wallet_history.style.display = "none";
					week_from_dt_nontag_wallet_history.style.display = "none";
					week_to_dt_nontag_wallet_history.style.display = "none";
				}
			}
		</script>
		<!-- non tag wallet history day fillter end -->
		<script>
			$("#kt_datatable_non_tagged_wallet_history").DataTable({
				"aaSorting":[],
				// "sorting":false,
				// "paging": false,
				// "responsive": true,
				"iDisplayLength": "25",
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
			// $('#view_nontag_wallet_table').wrap('<div class="dataTables_scroll" />');
		</script>
		<!-- non tag list day fillter start -->
		<script>
			function date_fill_nontag_list()
			{
				var dt_fill_nontag_list = document.getElementById('dt_fill_nontag_list').value;
				var today_dt_nontag_list = document.getElementById('today_dt_nontag_list');
				var week_from_dt_nontag_list = document.getElementById('week_from_dt_nontag_list');
				var week_to_dt_nontag_list = document.getElementById('week_to_dt_nontag_list');
				var monthly_dt_nontag_list = document.getElementById('monthly_dt_nontag_list');
				var from_dt_nontag_list = document.getElementById('from_dt_nontag_list');
				var to_dt_nontag_list = document.getElementById('to_dt_nontag_list');
				var from_date_fillter_nontag_list = document.getElementById('from_date_fillter_nontag_list');
				var to_date_fillter_nontag_list = document.getElementById('to_date_fillter_nontag_list');

				if (dt_fill_nontag_list == "today") 
				{
					today_dt_nontag_list.style.display = "block";
					monthly_dt_nontag_list.style.display = "none";
					from_dt_nontag_list.style.display = "none";
					to_dt_nontag_list.style.display = "none";
					week_from_dt_nontag_list.style.display = "none";
					week_to_dt_nontag_list.style.display = "none";
					$("#today_date_fillter_nontag_list").flatpickr({
								dateFormat: "d-m-Y",
							});
				}
				else if (dt_fill_nontag_list == "week")
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
				else if (dt_fill_nontag_list == "monthly")
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
				else if (dt_fill_nontag_list == "custom Date")
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
		<!-- non tag list day fillter end -->
		<!-- non tag wallet day fillter start -->
		<script>
			function date_fill_nontag_wallet()
			{
				var dt_fill_nontag_wallet = document.getElementById('dt_fill_nontag_wallet').value;
				var today_dt_nontag_wallet = document.getElementById('today_dt_nontag_wallet');
				var week_from_dt_nontag_wallet = document.getElementById('week_from_dt_nontag_wallet');
				var week_to_dt_nontag_wallet = document.getElementById('week_to_dt_nontag_wallet');
				var monthly_dt_nontag_wallet = document.getElementById('monthly_dt_nontag_wallet');
				var from_dt_nontag_wallet = document.getElementById('from_dt_nontag_wallet');
				var to_dt_nontag_wallet = document.getElementById('to_dt_nontag_wallet');
				var from_date_fillter_nontag_wallet = document.getElementById('from_date_fillter_nontag_wallet');
				var to_date_fillter_nontag_wallet = document.getElementById('to_date_fillter_nontag_wallet');

				if (dt_fill_nontag_wallet == "today") 
				{
					today_dt_nontag_wallet.style.display = "block";
					monthly_dt_nontag_wallet.style.display = "none";
					from_dt_nontag_wallet.style.display = "none";
					to_dt_nontag_wallet.style.display = "none";
					week_from_dt_nontag_wallet.style.display = "none";
					week_to_dt_nontag_wallet.style.display = "none";
					$("#today_date_fillter_nontag_wallet").flatpickr({
								dateFormat: "d-m-Y",
							});
				}
				else if (dt_fill_nontag_wallet == "week")
				{
					today_dt_nontag_wallet.style.display = "none";
					week_from_dt_nontag_wallet.style.display = "block";
					week_to_dt_nontag_wallet.style.display = "block";
					monthly_dt_nontag_wallet.style.display = "none";
					from_dt_nontag_wallet.style.display = "none";
					to_dt_nontag_wallet.style.display = "none";

					var curr = new Date; // get current date
					var first = curr.getDate() - curr.getDay(); // First day is the day of the month - the day of the week
					var last = first + 6; // last day is the first day + 6

					var firstday = new Date(curr.setDate(first)).toISOString().slice(0,10);
					firstday = firstday.split("-").reverse().join("-");
					var lastday = new Date(curr.setDate(last)).toISOString().slice(0,10);
					lastday = lastday.split("-").reverse().join("-");
					$('#week_from_date_fillter_nontag_wallet').val(firstday);
					$('#week_to_date_fillter_nontag_wallet').val(lastday);
					
				}
				else if (dt_fill_nontag_wallet == "monthly")
				{
					today_dt_nontag_wallet.style.display = "none";
					monthly_dt_nontag_wallet.style.display = "block";
					from_dt_nontag_wallet.style.display = "none";
					to_dt_nontag_wallet.style.display = "none";
					week_from_dt_nontag_wallet.style.display = "none";
					week_to_dt_nontag_wallet.style.display = "none";
					$("#monthly_date_fillter_nontag_wallet").flatpickr({
								dateFormat: "m-Y",
							});
				}
				else if (dt_fill_nontag_wallet == "custom Date")
				{
					today_dt_nontag_wallet.style.display = "none";
					monthly_dt_nontag_wallet.style.display = "none";
					from_dt_nontag_wallet.style.display = "block";
					to_dt_nontag_wallet.style.display = "block";
					week_from_dt_nontag_wallet.style.display = "none";
					week_to_dt_nontag_wallet.style.display = "none";

					$("#from_date_fillter_nontag_wallet").flatpickr({
								dateFormat: "d-m-Y",
							});
					$("#to_date_fillter_nontag_wallet").flatpickr({
								dateFormat: "d-m-Y",
							});
				}
				else
				{
					today_dt_nontag_wallet.style.display = "none";
					monthly_dt_nontag_wallet.style.display = "none";
					from_dt_nontag_wallet.style.display = "none";
					to_dt_nontag_wallet.style.display = "none";
					week_from_dt_nontag_wallet.style.display = "none";
					week_to_dt_nontag_wallet.style.display = "none";
				}
			}
		</script>
		<!-- non tag wallet day fillter end -->
		
		<script>
			      $("#kt_datatable_jewellery_accept_table").kendoTooltip({
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
			      $("#kt_datatable_ccl_pending_list_table").kendoTooltip({
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
			      $("#kt_datatable_tagged_wallet").kendoTooltip({
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
			$("#kt_datatable_jewellery_accept_table").DataTable({
				
				// "responsive": true,
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
		
		<script>
			$("#view_nontag_wallet_table").DataTable({
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
			$('#view_nontag_wallet_table').wrap('<div class="dataTables_scroll" />');
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

			$("#kt_datatable_ccl_pending_list_table").DataTable({
				
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

				$("#kt_datatable_tagged_wallet").DataTable({
				
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
		<script type="text/javascript">
			function ccl_sale_view(bno)
			{
					// var bill_no=bno;

					var baseurl= "<?php echo base_url(); ?>";
					// var str=bill_no.replace("/","_");

					$.ajax({
									type: "POST",
									url: baseurl+'ccl_sale_list/ccl_sale_list_view',
									async: false,
									type: "POST",
									data: "bno="+bno,
									dataType: "html",
									success: function(response)
									{
												$('#kt_modal_view_ccl_pending_list').empty().append(response);
												$('#kt_modal_view_ccl_pending_list').addClass('show');
												$('#kt_modal_view_ccl_pending_list').show();
												// $('.modal-backdrop').addClass('show');
									   		$('.modal-backdrop').show();
							   		
									}
								});
								// return true;
							
			}
			function close_ccl_sale_view_modal()
			{
					// $('#kt_modal_view_ccl_pending_list').empty()(response);
					$('#kt_modal_view_ccl_pending_list').removeClass('show');
					$('#kt_modal_view_ccl_pending_list').hide();
					$('.modal-backdrop').removeClass('hide');
		   		$('.modal-backdrop').hide();
			}
		</script>
		<script type="text/javascript">
			function ccl_sale_edit(bno)
			{
					// var bill_no=bno;

					var baseurl= "<?php echo base_url(); ?>";
					// var str=bill_no.replace("/","_");

					$.ajax({
									type: "POST",
									url: baseurl+'ccl_sale_list/ccl_sale_list_edit',
									async: false,
									type: "POST",
									data: "bno="+bno,
									dataType: "html",
									success: function(response)
									{
												$('#kt_modal_edit_ccl_pending_list').empty().append(response);
												$('#kt_modal_edit_ccl_pending_list').addClass('show');
												$('#kt_modal_edit_ccl_pending_list').show();
												// $('.modal-backdrop').addClass('show');
									   		$('.modal-backdrop').show();
							   		
									}
								});
								// return true;
							
			}
			function close_ccl_sale_edit_modal()
			{
					// $('#kt_modal_edit_ccl_pending_list').empty()(response);
					$('#kt_modal_edit_ccl_pending_list').removeClass('show');
					$('#kt_modal_edit_ccl_pending_list').hide();
					$('.modal-backdrop').removeClass('hide');
		   		$('.modal-backdrop').hide();
			}

			function show_desc(id)
			{
				var baseurl= "<?php echo base_url(); ?>";
				$.ajax({
							type: "POST",
							url: baseurl+'ccl_sale_list/ccl_description',
							async: false,
							type: "POST",
							data: "id="+id,
							dataType: "html",
							success: function(response)
							{
								$('#lbl_description').html(response);
						$('#kt_modal_description').addClass('show');
						$('#kt_modal_description').show();
						$('.modal-backdrop').addClass('show');
						$('.modal-backdrop').show();
					}
				});

			}
			function close_ccl_desc_modal()
			{
					$('#kt_modal_description').removeClass('show');
						$('#kt_modal_description').hide();
						$('.modal-backdrop').removeClass('show');
						$('.modal-backdrop').hide();
			}
			function calcualte_curr_sale_rate_profit_loss() 
				{
					var osv=parseFloat($('#orgnl_sale_value').val());
					var curr_val= parseFloat($('#ccl_sale_amt').val());
					var calc_val= parseFloat($('#orgnl_calc_value').html());


					var bal=curr_val-calc_val;
					// alert(bal);
					if(bal<0) 
					{
						// loss
						str='<span style="background-color:red;color: white; border-radius: 8px;padding: 5px 15px 5px 15px;">Loss</span>';
						$('#lbl_profit_loss').empty().append(str);
						$('#is_profit_loss').val('L');
						$('#profit_loss_amount').html(bal.toFixed(2));
						$('#p_l_amount').val(bal.toFixed(2));

					}
					else
					{
						//profit
						str='<span style="background-color:#B6BD4F;border-radius: 8px;padding: 5px 15px 5px 15px;" id= "span_profit" >Profit</span>';
						$('#lbl_profit_loss').empty().append(str);
						$('#is_profit_loss').val('P');
						$('#profit_loss_amount').html(bal.toFixed(2));
						$('#p_l_amount').val(bal.toFixed(2));
					}


				}
		</script>
	</body>
	<!--end::Body-->
</html>

