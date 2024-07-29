<?php $this->load->view("common");?>
<style>
		.dataTables_scroll
    {
        position: relative;
        overflow: auto;
        /*min-height: 257px;*/
        max-height: 257px;/*the maximum height you want to achieve*/
        width: 100%;
    }
  .dataTables_scroll thead{
    position: -webkit-sticky;
    position: sticky;
    top: 0;
    background-color: #ec9629 !important;
    z-index: 2;
  }
	#chit_cus_sch #chit_cus_sch_tltip {
		  display: none;
			}
	#chit_cus_sch:hover #chit_cus_sch_tltip {
	  display: block;
	  position: absolute;
	  margin-top: 0.5em;
	  margin-left: -4.5em !important;
	  color: white;
	  background: black;
	  padding: 3px 13px 3px 10px;
	  border-radius: 5px;
	  font-size: 12px;
	}
	.k-tooltip-content
	{
		min-width: 150px !important;
	}
	.k-animation-container
	{
		max-width: 300px !important;
	}
	.k-animation-container-sm
	{
		max-width: 300px !important;
	}
	.error {
    border: solid 2px #f31700 !important;
	border-color:#f31700 !important;
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
									<h1 class="d-flex align-items-center text-dark fw-bold my-1 fs-3">Raise Complaint List
									<!--begin::Separator-->
									<span class="h-20px border-gray-400 border-start ms-3 mx-2"></span>
									<!-- <label class="d-flex align-items-center text-primary fw-bold my-1 fs-5">
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
													<div class="row">
														<div class="col-lg-2"></div>
														<div class="col-lg-4">
															<div class="text-center">
																<label class="form-label fs-2 fw-bold">Active</label>
															</div>
															<div class="text-center">
															<?php 
																$getcountactive =$this->db->query("SELECT count(complaint_UID) as idcount FROM RAISE_COMPLAINT_REPORTS where status=1")->result_array();

																$getinactivecountactive =$this->db->query("SELECT count(complaint_UID) as inactiveidcount FROM RAISE_COMPLAINT_REPORTS where status!=1")->result_array();
																//print_r($getinactivecountactive[0]['inactiveidcount']);exit;
															?>
																<label class="text-success fs-2 fw-bold"><?php echo $getcountactive[0]['idcount']; ?></label>
															</div>
														</div>
														<div class="col-lg-3">
															<div class="text-center">
																<label class="form-label fs-2 fw-bold">Closed</label>
															</div>
															<div class="text-center">
																<label class="text-success fs-2 fw-bold"><?php echo $getinactivecountactive[0]['inactiveidcount']; ?></label>
															</div>
														</div>
													</div>
												</div>
												<div class="col-lg-4" style="display:none;">
													<div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
														<button type="button" class="btn btn-sm btn-outline btn-outline-solid btn-outline-warning btn-active-light-primary me-3" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end" data-kt-menu-static="true">
															Filter</button>
														<div class="menu menu-sub menu-sub-dropdown w-300px w-md-325px" data-kt-menu="true">
															<div class="px-7 py-5" data-kt-user-table-filter="form">
															<!-- data-bs-auto-close="false" data-bs-toggle="dropdown" aria-expanded="false"> -->
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
																		<option value="1">Waiting Approval</option>
																		<option value="2">Updation Pending</option>
																		<option value="3">Jewel Not Submitted</option>
																		<option value="4">Waiting to Locker</option>
																		<option value="5">Lock In</option>
																		<option value="6">Lock Out</option>
																		<option value="7">Partially Repledge</option>
																		<option value="8">Repledge</option>
																		<option value="9">Jewel Settleted</option>
																	</select>
																</div>
																<div class="mb-2">
																	<label class="form-label">Date</label>
																	<select class="form-select form-select-solid" data-control="select2" data-hide-search="true" id="dt_fill_loan_list" onchange="date_fill_loan_list();">	
																		<option value="all">All</option>
																		<option value="today">Today</option>
																		<option value="week">This Week</option>
																		<option value="monthly">This Month</option>
																		<option value="custom_date">Custom Date</option>
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
														<button type="button" class="btn btn-sm btn-outline btn-outline-solid btn-outline-warning btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Export</button>
														<!-- <a href="loan_od_action_entry.php" target="_blank">
															<button type="button" class="btn btn-primary">New Schedule</button>
														</a> -->
													</div>
												</div>
											</div>
											<?php 
												//print_r($raise_complaintdata);exit;

											?>
											<table class="table align-middle table-row-dashed table-striped table-hover fs-7 gy-1 gs-2" id="kt_datatable_raise_complaint">
												<thead>
													<tr class="text-start text-muted fw-bold fs-7 gs-0">
														<th class="min-w-80px">Complaint Date</th>
														<th class="min-w-100px">Bill No</th>
														<th class="min-w-100px">Company</th>
														<th class="min-w-200px">Complaint</th>
														<th class="min-w-25px">Nos Updation</th>
														<th class="min-w-80px">Complaint By</th>
														<th class="min-w-80px">Closed By</th>
														<th class="min-w-100px">Status</th>
														<th class="min-w-80px"><span class="text-end">Actions</span></th>
													</tr>
												</thead>
												<tbody class="text-gray-600 fw-semibold">
												<?php
													foreach($raise_complaintdata as $complaint)
													{

														//print_r($complaint['complaint_UID']);exit;
												?>
													<tr>
														<td><?php  echo date("d-m-Y", strtotime($complaint['complaint_Date']));  ?></td>
														<td>
															<span class="btn btn-icon btn-circle fs-8 fw-bold shadow text-white mb-1" style="background:red;width: 20px !important;height: 20px !important;">RC</span>
															<span><?php echo $complaint['billno']; ?></span>
														</td>
														<?php
														 $companyname    = $this->db->query("SELECT COMPANYNAME FROM COMPANY where COMPANYCODE='".$complaint['company_name']."'")->row();
														 $companynameval = $companyname;
														 //print_r($companynameval);exit;
														?>
														<td class="ple1"><?php echo $companynameval->COMPANYNAME; ?></td>
														<td class="ple1"><?php echo $complaint['complaint_description']; ?></td>
														<?php
															$getraisecomplaintupdatecount = $this->db->query("SELECT count(complaint_UID) as countnoupdate from RAISECOMPLAINT_REMARKS where complaint_UID='".$complaint['complaint_UID']."'")->result_array();
															//print_r($getraisecomplaintupdatecount[0]['countnoupdate']);exit;
															?>
														<td>
															<label class="badge badge-info"><?php echo isset($getraisecomplaintupdatecount[0]['countnoupdate']) ? $getraisecomplaintupdatecount[0]['countnoupdate'] : "0"; ?></label>
															</td></label>
														</td>
														<td><?php echo $complaint['complaintBy']; ?></td>
														<td><?php echo $complaint['resolvedBy']; ?></td>
														<?php
														 if($complaint['status']==1)
														 {
															$isActive ='<span style="background-color:red;border-radius: 8px;padding: 5px 15px 5px 15px;">Active</span>';
														 }
														 else
														 {
															$isActive ='<span style="background-color:blue;border-radius: 8px;padding: 5px 15px 5px 15px;">Close</span>';
														 }
														 //print_r($companynameval);exit;
														?>
														<td>
															<label class="col-form-label fw-semibold fs-7 text-white" name="" id="">
														 	<?php echo $isActive; ?>
															</label>
														</td>
														
														<td>
															<span class="text-end">
																<input type="hidden" id="idparty" name="idparty" value="<?php echo $complaint['party_id']; ?>"/>
																<a href="javascript:;" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm"  title="View" onclick="viewcomplaintfunc('<?php echo $complaint['complaint_UID']; ?>');">
																	<i class="bi bi-eye-fill eyc"></i>
																</a>
															
																<?php
																	if($complaint['status']==1)
																	{

																?>
																	<button class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
																	<i class="fas fa-ellipsis-v eyc"></i>
																</button>
																<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-250px py-3" data-kt-menu="true" style="">
																	<div class="menu-item px-3">
																		<a href="javascript:;" onclick="updatecomplaintdescriptionfunc('<?php echo $complaint['complaint_UID']; ?>');"  class="menu-link px-3">Update Remarks</a>
																	</div>
																	<div class="menu-item px-3">
																		<a href="javascript:;" onclick="resolvecomplaintadd('<?php echo $complaint['billno']; ?>');"  class="menu-link px-3">Resolve</a>
																	</div>
																</div>

																<?php
																}
																else{

																	?>
																	<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-250px py-3" data-kt-menu="true" style="display:none;">
																		<div class="menu-item px-3">
																			<a href="javascript:;" onclick="updatecomplaintdescriptionfunc('<?php echo $complaint['complaint_UID']; ?>');"  class="menu-link px-3">Update Remarks</a>
																		</div>
																		<div class="menu-item px-3">
																			<a href="javascript:;" onclick="resolvecomplaintadd('<?php echo $complaint['billno']; ?>');"  class="menu-link px-3">Resolve</a>
																		</div>
																	</div>
																	<?php
																}
																?>
																
															</span>
														</td>
													</tr>
												<?php
													}
												?>
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
		<!--begin::Modal - view Raise A Complaint-->
		<div class="modal " id="kt_modal_view_raise_complaint" tabindex="-1" aria-hidden="true" data-bs-keyboard="false" data-bs-backdrop="static" style="    background-color: #00000096;">
			<div class="modal-dialog modal-xl-loan">
				<!--begin::Modal content-->
				<div class="modal-content rounded">
					<!--begin::Modal header-->
					<div class="modal-header justify-content-end border-0 pb-0">
						<!--begin::Close-->
						<div class="btn btn-sm btn-icon btn-active-color-primary" onclick="closeviewpopupmodel();">
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
					
					<div class="modal-body pt-0 pb-15 px-5 px-xl-20">
						<!--begin::Heading-->
						<div class="mb-3 text-center">
							<h1 class="mb-3">
								<span class="me-2">View Raise Complaint</span>
								<span class="me-1">[</span>
								<span class="text-primary" id="complaintbillno"></span>
								<span class="ms-1">]</span>
							</h1>
						</div>
						
						<div class="row">
							<div class="col-lg-6">
								<div class="px-4" style="border-radius: 10px;padding-bottom: 2px;box-shadow: 0 5px 10px #00002947;">
									<div class="row">
										<label class="col-lg-2 col-form-label fw-semibold fs-6">Company</label>
										<label class="col-lg-10 col-form-label fw-bold fs-5" id="companyname">-</label>
										<label class="col-lg-2 col-form-label fw-semibold fs-6">Comp.Date</label>
										<label class="col-lg-4 col-form-label fw-bold fs-5" id="complaint_Date">-</label>
										<label class="col-lg-2 col-form-label fw-semibold fs-6">Comp.By</label>
										<label class="col-lg-4 col-form-label fw-bold fs-5" id="complaintBy">-</label>
										<label class="col-lg-2 col-form-label fw-semibold fs-6">Resl.Date</label>
										<label class="col-lg-4 col-form-label fw-bold fs-5" id="resolve_Date">-</label>
										<label class="col-lg-2 col-form-label fw-semibold fs-6">Resl.By</label>
										<label class="col-lg-4 col-form-label fw-bold fs-5" id="resolvedBy">-</label>
										<label class="col-lg-3 col-form-label fw-semibold fs-6">Nos Updation</label>
										<div class="col-lg-3 d-flex align-items-center">
											<label class="badge badge-info col-form-label fw-bold fs-5" id="nos_updation">01</label>	
										</div>
									</div>
								</div>
							</div>
							<div class="col-lg-6">
								<div class="px-4" style="border-radius: 10px;padding-bottom: 2px;box-shadow: 0 5px 10px #00002947;">
									<div class="row">
										<label class="col-lg-2 col-form-label fw-semibold fs-6" >Party</label>
										<label class="col-lg-6 col-form-label fw-bold fs-5" id="partyname">-</label>
										<div class="col-lg-4 d-flex justify-content-center align-items-center" id="status">
											
										</div>
										<div class="col-lg-9">
											<div class="row">
												<label class="col-lg-12 col-form-label fw-bold fs-6" title="Last Name">
													<span class="me-2">
														<i class="fa fa-user fs-6"></i>
													</span>
													<span id="lname">-</span>
												</label>
												<label class="col-lg-12 col-form-label fw-bold fs-6" title="Address">
													<span class="me-2">
														<i class="fa-solid fa-location-dot fs-6"></i>
													</span>
													<span  id="party_address">-</span>
												</label>
												<label class="col-lg-8 col-form-label fw-bold fs-6" title="Mobile">
													<span class="me-2">
														<i class="fas fa-mobile-android-alt fs-6"></i>
													</span>
													<span  id="partyphone">-</span>
												</label>
												<label class="col-lg-4 col-form-label fw-bold fs-6"><span id="rating"></span></label>
											</div>
										</div>
										<div class="col-lg-3 fv-row mt-2">
											<div id="party_photo">

											</div>
											
									</div>
								</div>
								</div>
							</div>
						</div>
						<div class="row mt-4">
							<div class="col-lg-6">
								<div class="px-4" style="border-radius: 10px;padding-bottom: 2px;box-shadow: 0 5px 10px #00002947;">
									<div class="row">
										<label class="col-lg-12 col-form-label text-center fw-bold fs-4">Complaint</label>
										<div class="col-lg-12 col-form-label fw-bold fs-5 text-danger scroll-y mh-100px" id="complaint_description">
											-
										</div>
									</div>
								</div>
								<div class="px-4" style="border-radius: 10px;padding-bottom: 2px;box-shadow: 0 5px 10px #00002947;">
									<div class="row mt-4">
										<label class="col-lg-12 col-form-label text-center fw-bold fs-4">Solution of the Complaint</label>
										<div class="col-lg-12 col-form-label fw-bold fs-5 text-success scroll-y mh-100px" id="remarks">
											Next time this problem will not come up.
										</div>
									</div>
								</div>
							</div>
							<div class="col-lg-6">
								<table class="table align-middle table-row-dashed table-striped table-hover fs-7 gy-1 gs-2" id="kt_datatable_raise_complaint_view">
									<thead>
										<tr class="text-start text-muted fw-bold fs-7 gs-0">
											<th class="min-w-50px">Updated Date</th>
											<th class="min-w-80px">Updated By</th>
											<th class="min-w-150px">Updated</th>
										</tr>
									</thead>
									<tbody class="text-gray-600 fw-semibold" id="complientremarklist">
										
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
				<!--end::Modal dialog-->
			</div>
		</div>
		<!--end::Modal - view Raise A Complaint-->

		<!--begin::Modal - Update Remarks-->
		<div class="modal " id="kt_modal_update_remarks" tabindex="-1" aria-hidden="true" data-bs-keyboard="false" data-bs-backdrop="static" style="    background-color: #00000096;">
			<div class="modal-dialog modal-md">
				<!--begin::Modal content-->
				<div class="modal-content rounded">
					<!--begin::Modal header-->
					<div class="modal-header justify-content-end border-0 pb-0">
						<!--begin::Close-->
						<div class="btn btn-sm btn-icon btn-active-color-primary"  onclick="closeupdatecomplaintbox();">
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
					<div class="modal-body pt-0 pb-6 px-6 px-xl-10">
						<!--begin::Heading-->
						<div class="mb-6 text-center">
							<h1 class="mb-3">Update Remarks</h1>
						</div>
						<div class="row mt-3">
							<div class="col-lg-12 fv-row">
								<label class="fw-semibold required fs-6">Remarks</label>
								<textarea class="form-control form-control-solid" data-kt-autosize="true" rows="4" name="updatecomplaintdescription" id="updatecomplaintdescription"></textarea>
								<div class="fv-plugins-message-container invalid-feedback"></div>
							</div>
						</div>
						<div class="col-lg-12 fv-row fv-plugins-icon-container">
							<label class="col-form-label required fw-semibold fs-6 pb-0">Transaction Password</label>
							<input type="password" name="staffpassword" id="staffpassword" class="form-control form-control-lg form-control-solid" placeholder="Enter Transaction Password">
							<div class="fv-plugins-message-container invalid-feedback"></div>
						</div>
						<div class="d-flex align-items-center justify-content-center mt-8">
							<button type="button" class="btn btn-secondary me-3"  onclick="closeupdatecomplaintbox();">Cancel</button>
							<button type="button" class="btn btn-primary"  onclick="updatecomplaintdesc();">Update</button>
						</div>
					</div>
				</div>
				<!--end::Modal dialog-->
			</div>
		</div>
		<!--end::Modal - Update Remarks-->

		<!--begin::Modal - Resolve-->
		<div class="modal " id="kt_modal_resolve" tabindex="-1" aria-hidden="true" data-bs-keyboard="false" data-bs-backdrop="static" style="    background-color: #00000096;">
			<div class="modal-dialog modal-md">
				<!--begin::Modal content-->
				<div class="modal-content rounded">
					<!--begin::Modal header-->
					<div class="modal-header justify-content-end border-0 pb-0">
						<!--begin::Close-->
						<div class="btn btn-sm btn-icon btn-active-color-primary" onclick="closeresolvemodelfunc();">
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
					<div class="modal-body pt-0 pb-6 px-6 px-xl-10">
						<!--begin::Heading-->
						<div class="mb-6 text-center">
							<h1 class="mb-3">Resolve</h1>
						</div>
						<div class="row mt-3">
							<div class="col-lg-12 fv-row">
								<label class="fw-semibold required fs-6">Remarks</label>
								<textarea class="form-control form-control-solid" data-kt-autosize="true" rows="4" name="resolveremarks" id="resolveremarks"></textarea>
								<div class="fv-plugins-message-container invalid-feedback"></div>
							</div>
							<div class="col-lg-12 fv-row fv-plugins-icon-container">
								<label class="col-form-label required fw-semibold fs-6 pb-0">Transaction Password</label>
								<input type="password" name="resolvestaffpassword" id="resolvestaffpassword" class="form-control form-control-lg form-control-solid" placeholder="Enter Transaction Password">
								<div class="fv-plugins-message-container invalid-feedback"></div>
							</div>
						</div>
						<div class="d-flex align-items-center justify-content-center mt-8">
							<button type="button" class="btn btn-secondary me-3" onclick="closeresolvemodelfunc();">Cancel</button>
							<button type="button" class="btn btn-primary" onclick="resolvecomplaintfunc();">Resolve</button>
						</div>
					</div>
				</div>
				<!--end::Modal dialog-->
			</div>
		</div>
		<!--end::Modal - Resolve-->
				<input type="hidden" id="complaintbillno" name="complaintbillno" value=""/>
				<input type="hidden" id="resolvebillid" name="resolvebillid" value=""/>
				<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
				
	 <?php $this->load->view("script");?>
	<script>
	var baseurl= $("#baseurl").val();
	function closeupdatecomplaintbox(){
		$('#kt_modal_update_remarks').hide();
		//alert('babu');
	}
	function updatecomplaintdescriptionfunc(id)
	{
		$('#kt_modal_update_remarks').show();
		$('#complaintbillno').val(id);

	}
	function resolvecomplaintadd(id)
	{
		$('#kt_modal_resolve').show();
		$('#resolvebillid').val(id);
	}
	function closeresolvemodelfunc(){
		$('#kt_modal_resolve').hide();

	}
	
	function updatecomplaintdesc()
	{
	    var complaintdesc = $('#updatecomplaintdescription').val();
		var staffpassword = $('#staffpassword').val();
		var complaintbillno = $('#complaintbillno').val();

		if(complaintdesc.trim()=="")
		{
			$('#updatecomplaintdescription').addClass('error');
			$('#updatecomplaintdescription').focus();
			Swal.fire({
				title: 'error!',
				text: 'Please Enter Your Remarks update..!',
				icon: 'error',
				confirmButtonText: 'Okay'
			})
			return false;
		}
		else if(staffpassword.trim()=="")
		{
			$('#staffpassword').addClass('error');
			$('#staffpassword').focus();
			Swal.fire({
				title: 'error!',
				text: 'Please Enter Your Remarks update..!',
				icon: 'error',
				confirmButtonText: 'Okay'
			})
			return false;
		}
		else
		{
			$('#updatecomplaintdescription').removeClass('error');	
			$('#staffpassword').removeClass('error');

			var formData = new FormData();
			formData.append('complaintdesc', complaintdesc);
			formData.append('staffpassword', staffpassword);
			formData.append('complaintbillno', complaintbillno);
			$.ajax(
			{
				url: baseurl+'Raisecomplaint_reports/raisecomplaintupdate',
				type: 'POST',
				data: formData,
				async: false,
				cache: false,
				contentType: false,
				processData: false,
				success: function (response) 
				{

					var returnedData = JSON.parse(response);
					console.log(returnedData);

					if(returnedData.return_code==0)
					{
						Swal.fire({
							title: 'success!',
							text: 'Remarks updated successfully..!',
							icon: 'success',
							confirmButtonText: 'Okay'
						})
						$('#kt_modal_update_remarks').hide();
						location.reload();
					}
					else
					{
						Swal.fire({
							title: 'error!',
							text: 'Remarks updated successfully..! please check',
							icon: 'error',
							confirmButtonText: 'Okay'
						})
						// $('#kt_modal_update_remarks').hide();

					}


				}
			});
		}
	}
	</script>
	<script>
	function viewcomplaintfunc(id)
	{
		$('#kt_modal_view_raise_complaint').show();
		var partyid = $('#idparty').val();
		//alert(id);
		var complaintID = id;
		var formData = new FormData();
		formData.append('complaintID', complaintID);
		formData.append('partyid', partyid);

		$.ajax(
		{
			url: baseurl+'Raisecomplaint_reports/viewraisecomplaint',
			type: 'POST',
			data: formData,
			async: false,
			cache: false,
			contentType: false,
			processData: false,
			success: function(response) 
			{

				var returnedData = JSON.parse(response);
				console.log(returnedData);

				$('#complaintbillno').html(returnedData.rasicomplaintdata[0].billno);
				$('#complaint_Date').html(returnedData.rasicomplaintdata[0].complaint_Date);
				$('#complaintBy').html(returnedData.rasicomplaintdata[0].complaintBy);
				$('#complaint_description').html(returnedData.rasicomplaintdata[0].complaint_description);
				$('#remarks').html(returnedData.rasicomplaintdata[0].remarks);



				$('#updateremark_date').html(returnedData.rasicomplaintdata[0].updateremark_date);
				$('#updateremarksBy').html(returnedData.rasicomplaintdata[0].updateremarksBy);
				$('#update_remarks').html(returnedData.rasicomplaintdata[0].update_remarks);
				

				$('#resolve_Date').html(returnedData.rasicomplaintdata[0].resolve_Date);
				$('#resolvedBy').html(returnedData.rasicomplaintdata[0].resolvedBy);
				if(returnedData.rasicomplaintdata[0].status==1){

					var activestatus ='<label class="col-form-label fw-bold fs-5 text-white" style="background-color: red;border-radius: 8px;padding: 5px 10px 5px 10px;">Active</label>';
				}
				else
				{
					var activestatus ='<label class="col-form-label fw-bold fs-5 text-white" style="background-color: blue;border-radius: 8px;padding: 5px 10px 5px 10px;">Close</label>';

				}

				$('#status').empty().append(activestatus);

				$('#nos_updation').html(returnedData.noupdate);

				// $('#partyname').html(returnedData.partydetails[0].NAME);
				// $('#ADDRESS1').html(returnedData.partydetails[0].ADDRESS1);
				// $('#ADDRESS2').html(returnedData.partydetails[0].ADDRESS2);
				// $('#PHONE').html(returnedData.partydetails[0].PHONE);
				// $('#RATING').html(returnedData.partydetails[0].RATING);

				

				$('#companyname').html(returnedData.companyname);


				$('#partyname').html(returnedData.partydetails.NAME);
				$('#lname').html(returnedData.partydetails.FATHERSNAME);
				$('#party_address').html(returnedData.partydetails.ADDRESS);
				// $('#ADDRESS2').html(returnedData.partydetails.ADDRESS2);
				$('#partyphone').html(returnedData.partydetails.PHONE);
				$('#party_photo').html(returnedData.partydetails.PHOTO);

				var rating = returnedData.partydetails.RATING;
				if(rating==1){
        	r='<i class="fa-solid fa-star" style="color:red;"></i>&nbsp;Bad';	
        }
        else if(rating==2){
        	r='<i class="fa-solid fa-star" style="color:#ffc700;"></i>&nbsp;Average';	
        }
        else if(rating==3){
        	r='<i class="fa-solid fa-star" style="color:#50cd89;"></i>&nbsp;Good';	
        }
        else{
        	r='<i class="fa-solid fa-star" style="color:#d2d4dc;"></i>&nbsp;-';	
        }

				$('#rating').html(r);


				$('#complientremarklist').empty().append(returnedData.complientremarklist);
			}
		});
	}
	function closeviewpopupmodel(){

		$('#kt_modal_view_raise_complaint').hide();
	}
	</script>
	<script>
	function resolvecomplaintfunc()
	{
		var resolveremarks = $('#resolveremarks').val();
		var staffpassword = $('#resolvestaffpassword').val();
		var resolvebillid = $('#resolvebillid').val();

		if(resolveremarks.trim()=="")
		{
			$('#resolveremarks').addClass('error');
			$('#resolveremarks').focus();
			Swal.fire({
				title: 'error!',
				text: 'Please Enter Your Remarks..!',
				icon: 'error',
				confirmButtonText: 'Okay'
			})
			return false;
		}
		else if(staffpassword.trim()=="")
		{
			$('#resolvestaffpassword').addClass('error');
			$('#resolvestaffpassword').focus();
			Swal.fire({
				title: 'error!',
				text: 'Please Enter Your Transaction Password..!',
				icon: 'error',
				confirmButtonText: 'Okay'
			})
			return false;
		}
		else
		{
			$('#resolveremarks').removeClass('error');	
			$('#resolvestaffpassword').removeClass('error');

			var formData = new FormData();
			formData.append('resolveremarks', resolveremarks);
			formData.append('staffpassword', staffpassword);
			formData.append('resolvebillid', resolvebillid);


			$.ajax(
			{
				url: baseurl+'Raisecomplaint_reports/resolvecomplaint',
				type: 'POST',
				data: formData,
				async: false,
				cache: false,
				contentType: false,
				processData: false,
				success: function (response) 
				{

					var returnedData = JSON.parse(response);
					// console.log(response);

					if(returnedData.return_code==0)
					{
						Swal.fire({
							title: 'success!',
							text: 'Remarks updated successfully..!',
							icon: 'success',
							confirmButtonText: 'Okay'
						})
						$('#kt_modal_resolve').hide();
						location.reload();
					}
					if(returnedData.return_code==2)
					{
						Swal.fire({
							title: 'error!',
							text: 'Transaction Password is Incorrect please check..!',
							icon: 'error',
							confirmButtonText: 'Okay'
						})
						// $('#kt_modal_update_remarks').hide();
					}
					else
					{
						Swal.fire({
							title: 'error!',
							text: 'Remarks updated Not successfully..! please check',
							icon: 'error',
							confirmButtonText: 'Okay'
						})
						// $('#kt_modal_update_remarks').hide();

					}


				}
			});
		}


	}
	</script>
	<!-- Loan OD Check Box Table Start -->
	<script>
		$('#loan_od_checkall').change(function () {
		    $('.loan_od_chk').prop('checked',this.checked);
		});

		$('.loan_od_chk').change(function () {
		 if ($('.loan_od_chk:checked').length == $('.loan_od_chk').length){
		  $('#loan_od_checkall').prop('checked',true);
		 }
		 else {
		  $('#loan_od_checkall').prop('checked',false);
		 }
		});
	</script>
	<!-- Loan OD Check Box table End -->

		<script>
	      $("#kt_datatable_raise_complaint").kendoTooltip({
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
			$("#kt_datatable_raise_complaint").DataTable({
				"ordering": false,
				// "aaSorting":[],
				// "iDisplayLength": "10000",
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
			// $('#kt_datatable_raise_complaint').wrap('<div class="dataTables_scroll" />');
		</script>
		<script>
			$("#kt_datatable_raise_complaint_view").DataTable({
				"ordering": false,
				"sorting":false,
				"paging": false,
				"info": false,

				// "aaSorting":[],
				// "iDisplayLength": "10000",
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
			$('#kt_datatable_raise_complaint_view').wrap('<div class="dataTables_scroll" />');
		</script>
		<script>
	      $("#kt_datatable_raise_complaint_view").kendoTooltip({
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
	</body>
	<!--end::Body-->
	</html>