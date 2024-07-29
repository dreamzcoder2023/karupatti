<?php $this->load->view("common");?>
<style>
	.dataTables_scroll
    {
        position: relative;
        overflow: auto;
        min-height: 100px;
        max-height: 150px;/*the maximum height you want to achieve*/
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
									<h1 class="d-flex align-items-center text-dark fw-bold my-1 fs-3">Loan - Financial Summary
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
										<!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal"data-bs-target="#kt_modal_new_membership">New Membership</button> -->
										<!--end::Card header-->
										<!--begin::Card body-->
										<div class="card-body py-4">
											<div class="accordion" id="kt_accordion_item_list">
											    <div class="accordion-item">
											        <h2 class="accordion-header" id="kt_accordion_item_list_header_1">
											            <button class="accordion-button fw-bold fs-6 collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#kt_accordion_item_list_body_1" aria-expanded="false" aria-controls="kt_accordion_item_list_body_1">
											            Filter</button>
											        </h2>
											        <div id="kt_accordion_item_list_body_1" class="accordion-collapse collapse" aria-labelledby="kt_accordion_item_list_header_1" data-bs-parent="#kt_accordion_item_list">
											            <div class="accordion-body">
											            	<div class="row">
																			<div class="col-lg-4">
																				<div class="row">
																					<label class="col-lg-4 col-form-label fw-semibold fs-6">Company</label>
																					<div class="col-lg-8">
																						<select class="form-select form-select-solid" data-control="select2" data-close-on-select="false" data-allow-clear="true" multiple="multiple">
																							<option value="1" selected>All</option>
																							<option value="2">AGB - MAIN BRANCH AYYANAR GOLD BANKERS SKD</option>
																							<option value="3">AGK - KADALADI (KD) 5 BRANCH</option>
																							<option value="4">AGN - NARIPPAYUR (NR) 3- BRANCH</option>
																							<option value="5">AKP - KANNIRAJAPURAM (KP) 4 BRANCH</option>
																						</select>
																					</div>
																					<label class="col-lg-4 col-form-label fw-semibold fs-6">Scheme</label>
																					<div class="col-lg-8">
																						<select class="form-select form-select-solid" data-control="select2" data-close-on-select="false" data-allow-clear="true" multiple="multiple">
																							<option value="1" selected>All</option>
																							<option value="2">MIP</option>
																							<option value="3">TIP</option>
																							<option value="4">SIP</option>
																						</select>
																					</div>
																					<label class="col-lg-4 col-form-label fw-semibold fs-6">Date Range</label>
																					<div class="col-lg-8">
																						<select class="form-select form-select-solid" data-control="select2" data-hide-search="true" id="dt_fill" onchange="date_fill();">
																							<option value="all">All</option>
																							<option value="today">Today</option>
																							<option value="week">This Week</option>
																							<option value="monthly">This Month</option>
																							<option value="custom Date">Custom Date</option>
																						</select>
																					</div>
																				</div>
																			</div>
																			<div class="col-lg-3">
																				<div class="row">
																					<div class="mb-2 fv-row" id="today_dt" style="display:none;">
																						<label class="fw-semibold fs-6">Today</label>
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
																							<input class="form-control form-control-solid ps-12" name="" placeholder="Date" id="today_date_fillter" value="<?php echo date("d-m-Y"); ?>" disabled />
																						</div>
																					</div>
																					<div class="mb-2 fv-row" id="week_from_dt" style="display:none;">
																						<label class="fw-semibold fs-6">From</label>
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
																							<input class="form-control form-control-solid ps-12" name="" placeholder="Date" id="week_from_date_fillter" value="" disabled />
																						</div>
																					</div>
																					<div class="mb-2 fv-row" id="week_to_dt" style="display:none;">
																						<label class="fw-semibold fs-6">To</label>
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
																							<input class="form-control form-control-solid ps-12" name="" placeholder="Date" id="week_to_date_fillter" value="<?php echo date("d-m-Y"); ?>" disabled />
																						</div>
																					</div>
																					<div class="mb-2 fv-row" id="monthly_dt" style="display:none;">
																						<label class="fw-semibold fs-6">This Month</label>
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
																							<input class="form-control form-control-solid ps-12" name="" placeholder="Month" id="monthly_date_fillter" value="<?php echo date("m-Y"); ?>" />
																						</div>
																					</div>
																					<div class="mb-2 fv-row" id="from_dt" style="display:none;">
																						<label class="fw-semibold fs-6">From</label>
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
																							<input class="form-control form-control-solid ps-12" name="" placeholder="From Date" id="from_date_fillter" value="<?php echo date("d-m-Y"); ?>" />
																						</div>
																					</div>
																					<div class="mb-2 fv-row" id="to_dt" style="display:none;">
																						<label class="fw-semibold fs-6">To</label>
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
																							<input class="form-control form-control-solid ps-12" name="" placeholder="To Date" id="to_date_fillter" value="<?php echo date("d-m-Y"); ?>"/>
																						</div>
																					</div>
																				</div>
																			</div>
																		</div>
											            </div>
											        </div>
											    </div>
											</div>
											<div class="d-flex align-items-center justify-content-end mt-3">
												<button type="button" class="btn btn-sm btn-outline btn-outline-solid btn-outline-warning btn-active-light-primary me-3">Export</button>
												<button type="button" class="btn btn-sm btn-outline btn-outline-solid btn-outline-warning btn-active-light-primary me-3">Go</button>
											</div>
											<div class="row mt-2">
												<div class="col-lg-6">
													<div class="row">
														<div class="accordion" id="kt_accordion_loans_receipts">
													    <div class="accordion-item">
												        <h2 class="accordion-header" id="kt_accordion_loans_receipts_header_1">
												            <button class="accordion-button fw-bold fs-6 collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#kt_accordion_loans_receipts_body_1" aria-expanded="false" aria-controls="kt_accordion_loans_receipts_body_1">
												            Loans</button>
												        </h2>
												        <div id="kt_accordion_loans_receipts_body_1" class="accordion-collapse collapse" aria-labelledby="kt_accordion_loans_receipts_header_1" data-bs-parent="#kt_accordion_loans_receipts">
											            <div class="accordion-body">
											            	<div class="row">
											            		<table class="table fs-6 gy-0 gs-2">
												            		<tbody class="text-gray-600">
												            			<tr>
												            				<td class="w-200px fw-semibold">No Of Loans</td>
												            				<td class="fw-semibold">:</td>
												            				<td class="fw-bold text-end">506</td>
												            			</tr>
												            			<tr>
												            				<td class="w-200px fw-semibold">Loans Amount</td>
												            				<td class="fw-semibold">:</td>
												            				<td class="fw-bold text-end">01,07,72,881.00</td>
												            			</tr>
												            		</tbody>
												            	</table><hr>
											            	</div>
											            	<div class="row">
											            		<table class="table fs-6 gy-0 gs-2">
												            		<tbody class="text-gray-600">
												            			<!-- <tr>
												            				<td class="w-200px">Module</td>
												            				<td> </td>
												            				<td>Count</td>
												            				<td>Amount</td>
												            			</tr> -->
												            			<tr>
												            				<td class="w-200px fw-semibold">New Loan</td>
												            				<td class="fw-semibold">:</td>
												            				<td class="fw-bold text-end">339</td>
												            				<td class="fw-bold text-end">49,69,681.00</td>
												            			</tr>
												            			<tr>
												            				<td class="w-200px fw-semibold">Renewals</td>
												            				<td class="fw-semibold">:</td>
												            				<td class="fw-bold text-end">167</td>
												            				<td class="fw-bold text-end">58,03,200.00</td>
												            			</tr>
												            			<tr>
												            				<td class="w-200px fw-semibold">Auctioned</td>
												            				<td class="fw-semibold">:</td>
												            				<td class="fw-bold text-end">0</td>
												            				<td class="fw-bold text-end">0.00</td>
												            			</tr>
												            		</tbody>
												            	</table><hr>
											            	</div>
											            	<div class="row">
											            		<table class="table fs-6 gy-0 gs-2">
												            		<tbody class="text-gray-600">
												            			<tr>
												            				<td class="w-200px fw-semibold">Doc.Charge</td>
												            				<td class="fw-semibold">:</td>
												            				<td class="fw-semibold">&emsp;</td>
												            				<td class="fw-bold text-end">26,040.00</td>
												            			</tr>
												            		</tbody>
												            	</table>
											            	</div>
											            </div>
												        </div>
													    </div>
														</div>
													</div>
												</div>
												<div class="col-lg-6">
													<div class="row">
														<div class="accordion" id="kt_accordion_loans_receipts">
													    <div class="accordion-item">
												        <h2 class="accordion-header" id="kt_accordion_loans_receipts_header_1">
												            <button class="accordion-button fw-bold fs-6 collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#kt_accordion_loans_receipts_body_1" aria-expanded="false" aria-controls="kt_accordion_loans_receipts_body_1">
												            Receipts</button>
												        </h2>
												        <div id="kt_accordion_loans_receipts_body_1" class="accordion-collapse collapse" aria-labelledby="kt_accordion_loans_receipts_header_1" data-bs-parent="#kt_accordion_loans_receipts">
											            <div class="accordion-body">
											            	<div class="row">
											            		<table class="table fs-6 gy-0 gs-2">
												            		<tbody class="text-gray-600">
												            			<tr>
												            				<td class="w-200px fw-semibold">No Of Receipts</td>
												            				<td class="fw-semibold">:</td>
												            				<td class="fw-bold text-end">37</td>
												            			</tr>
												            			<tr>
												            				<td class="w-200px fw-semibold">Receipts Amount</td>
												            				<td class="fw-semibold">:</td>
												            				<td class="fw-bold text-end">08,77,605.00</td>
												            			</tr>
												            		</tbody>
												            	</table><hr>
											            	</div>
											            	<div class="row">
											            		<table class="table fs-6 gy-0 gs-2">
												            		<tbody class="text-gray-600">
												            			<!-- <tr>
												            				<td class="w-200px">Module</td>
												            				<td> </td>
												            				<td>Count</td>
												            				<td>Amount</td>
												            			</tr> -->
												            			<tr>
												            				<td class="w-200px fw-semibold">Principal</td>
												            				<td class="fw-semibold">:</td>
												            				<td class="fw-bold text-end">07,87,782.00</td>
												            			</tr>
												            			<tr>
												            				<td class="w-200px fw-semibold">Interest</td>
												            				<td class="fw-semibold">:</td>
												            				<td class="fw-bold text-end">89,893.00</td>
												            			</tr>
												            		</tbody>
												            	</table><hr>
											            	</div>
											            	<div class="row">
											            		<table class="table fs-6 gy-0 gs-2">
												            		<tbody class="text-gray-600">
												            			<tr>
												            				<td class="w-200px fw-semibold">Paper Action</td>
												            				<td class="fw-semibold">:</td>
												            				<td class="fw-bold text-end">0.00</td>
												            			</tr>
												            			<tr>
												            				<td class="w-200px fw-semibold">Notice</td>
												            				<td class="fw-semibold">:</td>
												            				<td class="fw-bold text-end">0.00</td>
												            			</tr>
												            			<tr>
												            				<td class="w-200px fw-semibold">Form Missing</td>
												            				<td class="fw-semibold">:</td>
												            				<td class="fw-bold text-end">0.00</td>
												            			</tr>
												            			<tr>
												            				<td class="w-200px fw-semibold">Discount</td>
												            				<td class="fw-semibold">:</td>
												            				<td class="fw-bold text-end">70.00</td>
												            			</tr>
												            		</tbody>
												            	</table>
											            	</div>
											            </div>
												        </div>
													    </div>
														</div>
													</div>
												</div>
											</div>
											<div class="row mt-2">
												<div class="col-lg-6">
													<div class="row">
														<div class="accordion" id="kt_accordion_redemptions_repledge">
													    <div class="accordion-item">
												        <h2 class="accordion-header" id="kt_accordion_redemptions_repledge_header_1">
												            <button class="accordion-button fw-bold fs-6 collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#kt_accordion_redemptions_repledge_body_1" aria-expanded="false" aria-controls="kt_accordion_redemptions_repledge_body_1">
												            Redemption</button>
												        </h2>
												        <div id="kt_accordion_redemptions_repledge_body_1" class="accordion-collapse collapse" aria-labelledby="kt_accordion_redemptions_repledge_header_1" data-bs-parent="#kt_accordion_redemptions_repledge">
											            <div class="accordion-body">
											            	<div class="row">
											            		<table class="table fs-6 gy-1 gs-2">
												            		<tbody class="text-gray-600">
												            			<tr>
												            				<td class="w-200px fw-semibold">No Of Redemptions</td>
												            				<td class="fw-semibold">:</td>
												            				<td class="fw-bold text-end">413</td>
												            			</tr>
												            			<tr>
												            				<td class="w-200px fw-semibold">Redemptions Amount</td>
												            				<td class="fw-semibold">:</td>
												            				<td class="fw-bold text-end">90,72,600.00</td>
												            			</tr>
												            		</tbody>
												            	</table><hr>
											            	</div>
											            	<div class="row">
											            		<table class="table fs-6 gy-1 gs-2">
												            		<tbody class="text-gray-600">
												            			<!-- <tr>
												            				<td class="w-200px">Module</td>
												            				<td> </td>
												            				<td>Count</td>
												            				<td>Amount</td>
												            			</tr> -->
												            			<tr>
												            				<td class="w-200px fw-semibold">Customer Close</td>
												            				<td class="fw-semibold">:</td>
												            				<td class="fw-bold text-end">233</td>
												            				<td class="fw-bold text-end">33,00,000.00</td>
												            			</tr>
												            			<tr>
												            				<td class="w-200px fw-semibold">Customer Transfer</td>
												            				<td class="fw-semibold">:</td>
												            				<td class="fw-bold text-end">50</td>
												            				<td class="fw-bold text-end">10,00,000.00</td>
												            			</tr>
												            			<tr>
												            				<td class="w-200px fw-semibold">Company Close</td>
												            				<td class="fw-semibold">:</td>
												            				<td class="fw-bold text-end">60</td>
												            				<td class="fw-bold text-end">12,00,000.00</td>
												            			</tr>
												            			<tr>
												            				<td class="w-200px fw-semibold">Customer Sale</td>
												            				<td class="fw-semibold">:</td>
												            				<td class="fw-bold text-end">20</td>
												            				<td class="fw-bold text-end">20,00,000.00</td>
												            			</tr>
												            			<tr>
												            				<td class="w-200px fw-semibold">Multi Jewel</td>
												            				<td class="fw-semibold">:</td>
												            				<td class="fw-bold text-end">50</td>
												            				<td class="fw-bold text-end">50,18,72,600.00</td>
												            			</tr>
												            		</tbody>
												            	</table><hr>
											            	</div>
											            	<div class="row">
											            		<table class="table fs-6 gy-1 gs-2">
												            		<tbody class="text-gray-600">
												            			<tr>
												            				<td class="w-200px fw-semibold">Paid Amount</td>
												            				<td class="fw-semibold">:</td>
												            				<td class="fw-bold text-end">8,67,885.00</td>
												            			</tr>
												            		</tbody>
												            	</table><hr>
											            	</div>
											            	<div class="row">
											            		<table class="table fs-6 gy-1 gs-2">
												            		<tbody class="text-gray-600">
												            			<tr>
												            				<td class="w-200px fw-semibold">Total Interest</td>
												            				<td class="fw-semibold">:</td>
												            				<td class="fw-bold text-end">6,34,406.00</td>
												            			</tr>
												            			<tr>
												            				<td class="w-200px fw-semibold">Paper Action</td>
												            				<td class="fw-semibold">:</td>
												            				<td class="fw-bold text-end">920.00</td>
												            			</tr>
												            			<tr>
												            				<td class="w-200px fw-semibold">Notice</td>
												            				<td class="fw-semibold">:</td>
												            				<td class="fw-bold text-end">3109.00</td>
												            			</tr>
												            			<tr>
												            				<td class="w-200px fw-semibold">Form Missing</td>
												            				<td class="fw-semibold">:</td>
												            				<td class="fw-bold text-end">1,500.00</td>
												            			</tr>
												            		</tbody>
												            	</table><hr>
												            </div>
												            <div class="row">
											            		<table class="table fs-6 gy-1 gs-2">
												            		<tbody class="text-gray-600">
												            			<tr>
												            				<td class="w-200px fw-semibold">Total</td>
												            				<td class="fw-semibold">:</td>
												            				<td class="fw-bold text-end">6,39,935.00</td>
												            			</tr>
												            			<tr>
												            				<td class="w-200px fw-semibold">Discount</td>
												            				<td class="fw-semibold">:</td>
												            				<td class="fw-bold text-end">24,368.00</td>
												            			</tr>
												            		</tbody>
												            	</table>
											            	</div>
											            </div>
												        </div>
													    </div>
														</div>
													</div>
												</div>
												<div class="col-lg-6">
													<div class="row">
														<div class="accordion" id="kt_accordion_redemptions_repledge">
													    <div class="accordion-item">
												        <h2 class="accordion-header" id="kt_accordion_redemptions_repledge_header_1">
												            <button class="accordion-button fw-bold fs-6 collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#kt_accordion_redemptions_repledge_body_1" aria-expanded="false" aria-controls="kt_accordion_redemptions_repledge_body_1">
												            Repledge</button>
												        </h2>
												        <div id="kt_accordion_redemptions_repledge_body_1" class="accordion-collapse collapse" aria-labelledby="kt_accordion_redemptions_repledge_header_1" data-bs-parent="#kt_accordion_redemptions_repledge">
											            <div class="accordion-body">
											            	<div class="row">
											            		<table class="table fs-6 gy-1 gs-2">
												            		<tbody class="text-gray-600">
												            			<tr>
												            				<td class="w-200px fw-semibold">Total Repledges</td>
												            				<td class="fw-semibold">:</td>
												            				<td class="fw-bold text-end">231</td>
												            			</tr>
												            			<tr>
												            				<td class="w-200px fw-semibold">Repledge Amount</td>
												            				<td class="fw-semibold">:</td>
												            				<td class="fw-bold text-end">01,10,94,400.00</td>
												            			</tr>
												            		</tbody>
												            	</table><hr>
											            	</div>
											            	<div class="row">
											            		<table class="table fs-6 gy-1 gs-2">
												            		<tbody class="text-gray-600">
												            			<tr>
												            				<td class="w-200px fw-semibold">Appraiser Charges</td>
												            				<td class="fw-semibold">:</td>
												            				<td class="fw-bold text-end">6,704.00</td>
												            			</tr>
												            			<tr>
												            				<td class="w-200px fw-semibold">Repledge Other Charges</td>
												            				<td class="fw-semibold">:</td>
												            				<td class="fw-bold text-end">0.00</td>
												            			</tr>
												            		</tbody>
												            	</table><hr>
											            	</div>
											            	<div class="row">
											            		<table class="table fs-6 gy-1 gs-2">
												            		<tbody class="text-gray-600">
												            			<tr>
												            				<td class="w-200px fw-semibold">Total RP Receipts</td>
												            				<td class="fw-semibold">:</td>
												            				<td class="fw-bold text-end">108.00</td>
												            			</tr>
												            			<tr>
												            				<td class="w-200px fw-semibold">RP Receipts Amount</td>
												            				<td class="fw-semibold">:</td>
												            				<td class="fw-bold text-end">45,957.00</td>
												            			</tr>
												            		</tbody>
												            	</table><hr>
												            </div>
												            <div class="row">
											            		<table class="table fs-6 gy-1 gs-2">
												            		<tbody class="text-gray-600">
												            			<tr>
												            				<td class="w-200px fw-semibold">Total Repledge Returns</td>
												            				<td class="fw-semibold">:</td>
												            				<td class="fw-bold text-end">168.00</td>
												            			</tr>
												            			<tr>
												            				<td class="w-200px fw-semibold">Repledge Returns Amount</td>
												            				<td class="fw-semibold">:</td>
												            				<td class="fw-bold text-end">79,35,300.00</td>
												            			</tr>
												            		</tbody>
												            	</table><hr>
											            	</div>
											            	<div class="row">
											            		<table class="table fs-6 gy-1 gs-2">
												            		<tbody class="text-gray-600">
												            			<tr>
												            				<td class="w-200px fw-semibold">Repledge Returns Interest</td>
												            				<td class="fw-semibold">:</td>
												            				<td class="fw-bold text-end">2,18,840.00</td>
												            			</tr>
												            			<tr>
												            				<td class="w-200px fw-semibold">Repledge Returns Others</td>
												            				<td class="fw-semibold">:</td>
												            				<td class="fw-bold text-end">15,515.00</td>
												            			</tr>
												            			<tr>
												            				<td class="w-200px fw-semibold">Paid Others</td>
												            				<td class="fw-semibold">:</td>
												            				<td class="fw-bold text-end">33,396.00</td>
												            			</tr>
												            			<tr>
												            				<td class="w-200px fw-semibold">Discount</td>
												            				<td class="fw-semibold">:</td>
												            				<td class="fw-bold text-end">2,914.00</td>
												            			</tr>
												            			<tr>
												            				<td class="w-200px fw-semibold">Total Expenses</td>
												            				<td class="fw-semibold">:</td>
												            				<td class="fw-bold text-end">01,35,045.00</td>
												            			</tr>
												            		</tbody>
												            	</table>
											            	</div>
											            </div>
												        </div>
													    </div>
														</div>
													</div>
												</div>
											</div>
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
	<?php $this->load->view("script");?>
	
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

				<?php
					$monday = strtotime("last sunday");
					$monday = date('w', $monday)==date('w') ? $monday+7*86400 : $monday;
					$sunday = strtotime(date("d-m-Y",$monday)." +6 days");
					$this_week_start = date("d-m-Y",$monday);
					$this_week_end = date("d-m-Y",$sunday);
					// echo "$this_week_start to $this_week_end ";
				 ?>
				$('#week_from_date_fillter').val('<?php echo "$this_week_start";?>');
				$('#week_to_date_fillter').val('<?php echo "$this_week_end";?>');
				
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
		<script>
	      $("#kt_datatable_notice_issued_report").kendoTooltip({
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
			$("#kt_datatable_notice_issued_report").DataTable({
				"ordering": false,
				// "aaSorting":[],
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