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
									<h1 class="d-flex align-items-center text-dark fw-bold my-1 fs-3">Chit - Transaction Statement
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
										<!--begin::Card body-->
										<div class="card-body py-4">
											<div class="row">
												
											</div>
											<div class="accordion" id="kt_accordion_item_list">
											    <div class="accordion-item">
											        <h2 class="accordion-header" id="kt_accordion_item_list_header_1">
											            <button class="accordion-button fw-bold fs-6 collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#kt_accordion_item_list_body_1" aria-expanded="false" aria-controls="kt_accordion_item_list_body_1">
											            Filter</button>
											        </h2>
											        <div id="kt_accordion_item_list_body_1" class="accordion-collapse collapse" aria-labelledby="kt_accordion_item_list_header_1" data-bs-parent="#kt_accordion_item_list">
											            <div class="accordion-body">
											            	<form method="POST" action="<?php echo base_url(); ?>reports/chittransactionsamount" id="fill_form">
												            	<div class="row">
																				<div class="col-lg-3">
																					<div class="row">
																						<label class="col-lg-4 col-form-label fw-semibold fs-6">Party</label>
																						<div class="col-lg-8">
																							<input type="text" name="party_fil" id="party_fil" class="form-control form-control-lg form-control-solid" placeholder="Party Name" value="<?php echo $party_fil?$party_fil:''; ?>">
																						</div>
																					</div>
																				</div>
																				<div class="col-lg-3">
																					<div class="row">
																						<label class="col-lg-4 col-form-label fw-semibold fs-6">Scheme</label>
																						<div class="col-lg-8">
																							<select class="form-select form-select-solid" data-control="select2"  id="scheme_sel" name="scheme_sel">
																								<option value="all" selected>All</option>
																								<option value="1" <?php if ($scheme_sel=='1') {echo 'selected';
																									// code...
																								}else{
																									echo '';
																								} ?>>Selvamagal</option>
																								<option value="2" <?php if ($scheme_sel=='2') {echo 'selected';
																									// code...
																								}else{
																									echo '';
																								} ?>>Thangamagal</option>
																							</select>
																						</div>
																					</div>
																				</div>
																				<div class="col-lg-3">
																					<div class="row">
																						<label class="col-lg-6 col-form-label fw-semibold fs-6">Collection&nbsp;Type</label>
																						<div class="col-lg-6">
																							<select class="form-select form-select-solid fw-bold" data-control="select2" 
																							name="col_type" id="col_type">
																								<option value="all" selected>All</option>
																								<option value="1"<?php if ($col_type=='1') {echo 'selected';
																									// code...
																								}else{echo '';} ?>>Daily</option>
																								<option value="2"<?php if ($col_type=='2') {echo 'selected';
																									// code...
																								}else{echo '';} ?>>Weekly</option>
																								<option value="3"<?php if ($col_type=='3') {echo 'selected';
																									// code...
																								}else{echo '';} ?>>Monthly</option>
																							</select>
																						</div>
																					</div>
																				</div>
																				<div class="col-lg-3">
																					<div class="row">
																						<label class="col-lg-4 col-form-label fw-semibold fs-6">Status</label>
																						<div class="col-lg-8">
																							<select class="form-select form-select-solid" data-control="select2"  id="sta_sel" name="sta_sel">
																								<option value="all" selected>All</option>
																								<option value="1"<?php if($sta_sel=="1"){ echo "selected"; } ?>>Deposit</option>
																								<option value="2"<?php if($sta_sel=="2"){ echo "selected"; } ?>>Withdraw</option>
																								<option value="3"<?php if($sta_sel=="3"){ echo "selected"; } ?>>Interest-Added</option>
																								<option value="4"<?php if($sta_sel=="4"){ echo "selected"; } ?>>Withdraw-Loan</option>
																								<option value="5"<?php if($sta_sel=="5"){ echo "selected"; } ?>>Withdraw-Sales</option>
																							</select>
																						</div>
																					</div>
																				</div>
																				<div class="col-lg-3">
																					<div class="row">
																						<label class="col-lg-4 col-form-label fw-semibold fs-6">Date</label>
																						<div class="col-lg-8">
																							<select class="form-select form-select-solid" data-control="select2" data-hide-search="true" id="dt_fill" name="dt_fill" onchange="date_fill();">
																								<option value="all">All</option>
																								<option value="today" <?php if($dt_fill=="today"){ echo "selected"; } ?>>Today</option>
																								<option value="week"<?php if($dt_fill=="week"){ echo "selected"; } ?>>This Week</option>
																								<option value="monthly"<?php if($dt_fill=="monthly"){ echo "selected"; } ?>>This Month</option>
																								<option value="custom Date"  <?php if($dt_fill=="custom Date"){ echo "selected"; } ?>>Custom Date</option>
																							</select>
																						</div>
																					</div>
																				</div>
																				<div class="col-lg-6">
																					<div class="row">
																						<div class="mb-2 fv-row" id="today_dt" style="display:none;">
																							<div class="row">
																								<label class="col-lg-2 col-form-label fw-semibold fs-6">Today</label>
																								<div class="col-lg-4">
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
																							</div>
																						</div>
																						<div class="mb-2 fv-row" id="week_from_dt" style="display:none;">
																							<div class="row">
																								<label class="col-lg-2 col-form-label fw-semibold fs-6">From</label>
																								<div class="col-lg-4">
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
																										<input class="form-control form-control-solid ps-12" name="week_from_date_fillter" placeholder="Date" id="week_from_date_fillter" value="" disabled />
																									</div>
																								</div>
																								<label class="col-lg-2 col-form-label fw-semibold fs-6">To</label>
																								<div class="col-lg-4">
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
																										<input class="form-control form-control-solid ps-12" name="week_to_date_fillter" placeholder="Date" id="week_to_date_fillter" value="<?php echo date("d-m-Y"); ?>" disabled />
																									</div>
																								</div>
																							</div>
																						</div>
																						<div class="mb-2 fv-row" id="monthly_dt" style="display:none;">
																							<div class="row">
																								<label class="col-lg-3 col-form-label fw-semibold fs-6">This Month</label>
																								<div class="col-lg-4">
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
																										<input class="form-control form-control-solid ps-12" name="monthly_date_fillter" placeholder="Month" id="monthly_date_fillter" value="<?php echo date("m-Y"); ?>" />
																									</div>
																								</div>
																							</div>
																						</div>
																						<div class="mb-2 fv-row" id="from_dt" style="display:none;">
																							<div class="row">
																								<label class="col-lg-2 col-form-label fw-semibold fs-6">From</label>
																								<div class="col-lg-4">
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
																										<input class="form-control form-control-solid ps-12" name="from_date_fillter" placeholder="From Date" id="from_date_fillter" value="<?php echo date("d-m-Y"); ?>" />
																									</div>
																								</div>
																								<label class="col-lg-2 col-form-label fw-semibold fs-6">To</label>
																								<div class="col-lg-4">
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
																										<input class="form-control form-control-solid ps-12" name="to_date_fillter" placeholder="To Date" id="to_date_fillter" value="<?php echo date("d-m-Y"); ?>"/>
																									</div>
																								</div>
																							</div>
																						</div>
																					</div>
																				</div>
																			</div>
																			<div class="row">
																				<div class="col-lg-6">
																					<div class="row">
																						<div class="col-lg-2 fv-row fv-plugins-icon-container fv-plugins-bootstrap5-row-invalid">
																							<div class="d-flex align-items-center">
																								<label class="form-check form-check-inline form-check-solid me-1 is-invalid">
																									<input class="form-check-input" name="advance_amount_radio" type="checkbox" value="1" id="advance_amount_radio" onclick="ad_amt_radio()"  <?php if($ad_check=='1'){echo 'checked';}else{ echo '';} ?>>
																								</label>
																								<span class="col-form-label fw-semibold fs-6">Amount</span>
																								<input type="hidden" name="ad_check" id="ad_check" value="0">
																							</div>
																						</div>
																						<div class="col-lg-4" id="advance_amount_radio_tbox" style="display: none;">
																							<select class="form-select form-select-solid" data-control="select2"data-hide-search="true" id="ad_amt_radio_tbox" name="ad_valid">
																								<?php $amt_ck= $ad_sts?$ad_sts:''; ?>
																								<option value="="<?php if ($amt_ck=='='){echo 'selected';} ?>> = </option>
																								<option value=">"<?php if ($amt_ck=='>'){echo 'selected';} ?>> > </option>
																								<option value="<"<?php if ($amt_ck=='<'){echo 'selected';} ?>> < </option>
																								<option value=">="<?php if ($amt_ck=='>='){echo 'selected';} ?>> >= </option>
																								<option value="<="<?php if ($amt_ck=='<='){echo 'selected';} ?>> <= </option>
																							</select>
																						</div>
																						<div class="col-lg-2"></div>
																						<div class="col-lg-4" id="advance_amount_radio_tf1" style="display: none;">
																							<input type="text"  name="availableamountval" id="availableamountval" class="form-control form-control-lg form-control-solid" value="<?php echo $ad_amt?$ad_amt:''; ?>" placeholder="Amount" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
																							<div class="fv-plugins-message-container invalid-feedback"></div>
																						</div>
																					</div>
																				</div>
																			</div>
																		</form>
											            </div>
											        </div>
											    </div>
											</div>
											<div class="d-flex align-items-center justify-content-end mt-3">
												<form id="list_export1" method="POST" action="<?php echo base_url();?>Reports/chit_transaction_export">
															<input type="hidden" id="dt_fill_sales_list" name="dt_fill_sales_list"  value="<?php echo $dt_fill?$dt_fill:''; ?>">
															<input type="hidden" id="from_date_fillter_sales_list" name="from_date_fillter_sales_list" value="<?php echo $from_date_fillter?$from_date_fillter:''; ?>">
															<input type="hidden" id="to_date_fillter_sales_list" name="to_date_fillter_sales_list" value="<?php echo $to_date_fillter?$to_date_fillter:''; ?>">
															<input type="hidden" id="scheme_sel" name="scheme_sel"  value="<?php echo $scheme_sel?$scheme_sel:''; ?>">
															<input type="hidden" id="sta_sel" name="sta_sel"      value="<?php echo $sta_sel?$sta_sel:''; ?>">
															<input type="hidden" id="party_fil" name="party_fil"  value="<?php echo $party_fil?$party_fil:''; ?>">
															<input type="hidden" id="col_type" name="col_type"    value="<?php echo $col_type?$col_type:''; ?>">

															<button type="button" id="submit_export" class="btn btn-sm btn-outline btn-outline-solid btn-outline-warning btn-active-light-primary me-3">Export</button>
														</form>
												<button type="button" class="btn btn-sm btn-outline btn-outline-solid btn-outline-warning btn-active-light-primary me-3" id="go_btn" onclick="go_btn();">Go</button>
												<script type="text/javascript">
																	function go_btn() {						
															      $('#fill_form').submit();
															    }
												</script>
											</div>
											<!--begin::Table-->
											<div class="row mt-2">
												<table class="table align-middle table-row-dashed table-striped fs-7 gy-2 gs-2" id="kt_datatable_chit_transaction_statement_report">
												
													<thead>
												   <tr class="text-center text-muted fw-bold fs-7 gs-0">
													  <th class="min-w-25px">Sno</th>
													  <th class="min-w-25px">Date</th>
													  <th class="min-w-125px">Chit ID / Scheme ID</th>
														<th class="min-w-100px">Party Info</th>														
														<th class="min-w-50px">Scheme</th>
														<th class="min-w-50px">Type</th>
														<th class="min-w-100px">Opening</th>
														<th class="min-w-100px">Amount</th>
														<th class="min-w-100px">Closing</th>
														<th class="min-w-80px">Status</th>
														<th class="min-w-25px" style="width: 10%;"><span class="text-end">Actions</span></th>
													</tr>
												</thead>
													<tbody class="text-gray-600 fw-semibold">

  													<?php 
															$i=1;
															foreach($chit_all_trans_list as $catlist){
															?>
															
															<tr>
																<td><?php echo $i; ?></td>
																<td><?php $date_format  = $this->db->query("SELECT * FROM general_settings ")->row();
		               														 $format = $date_format->date_format;
		                												echo date("$format", strtotime($catlist['trans_date']));?> 
		            											</td>
		            								<td><?php echo $catlist['chit_id']; ?> / <br>
																		<span class="fs-9 badge badge-info"><?php echo $catlist['scheme_id']; ?></span>
																	 <?php if($catlist['type']==2) { echo '&nbsp;&nbsp;<i class="fa-solid fa-circle-xmark fs-4 text-danger mt-2" title="closed"></i>'; } 
																	 ?>
																</td>
																<td class="ple1">
																<!-- <span><i class="fa-solid fa-star fs-7" style="color:orange;"></i></span> -->
																<span class="align-items-center"><i class="fa-solid fa-star fs-5" style="<?php 
																	if($catlist['RATING']==3) { echo 'color:#50cd89;'; }
																	else if($catlist['RATING']==2) { echo 'color:#ffc700;'; }
																	else if($catlist['RATING']==1) { echo 'color:red;'; }
																	else if($catlist['RATING']=='' || is_null($catlist['RATING'])) { echo 'color:#d2d4dc;'; }
																	else { echo ''; }
																	?>"></i>&nbsp;<?php echo $catlist['NAME'];?></span></td>

																<td>
																	<?php 
																		if($catlist['scheme_type']==3){echo "<span>Thangamagal Gold</span>"; 
																		}elseif($catlist['scheme_type']==2){echo "<span>Thangamagal&nbsp;Cash</span>";
																		}elseif($catlist['scheme_type']==1){echo "<span>Selvamagal Cash</span>";
																		}else  echo "<span>-</span>";
																	?> 
																</td>
																<td>
																		<?php 
																			$type=$catlist['collection_type']?$catlist['collection_type']:'';
																			if ($type==1) {
																				echo 'Daily';
																			}
																			else if($type==2){
																				echo 'Weekly';
																			}
																			else{
																				echo 'Monthly';
																			}
																	 	?>
																</td>
			                          <td><?php echo number_format($catlist['opening_amount'],2,'.',','); ?></td>
																<td>
																	  <?php echo number_format($catlist['processing_amount'],2,'.',',');?> 
																		<?php if($catlist['scheme_type']==3){ ?> /  <?php echo number_format($catlist['amt_paid'],2,'.',','); }?>
																</td>
																<td><?php echo number_format($catlist['closing_balance'],2,'.',',');?></td>
		                            <td>
																	<?php 
																		if($catlist['transaction_type']==5){echo "<label  class='col-form-label fw-semibold fs-7' style='background-color:yellow;border-radius: 8px;padding: 5px 15px 5px 15px; '>Withdraw-Loan</label>"; 
																		}elseif($catlist['transaction_type']==4){echo "<label class='col-form-label fw-semibold fs-7' style='background-color:violet;border-radius: 8px;padding: 5px 15px 5px 15px; '>Withdraw-Sales</label>"; 
																		}elseif($catlist['transaction_type']==3){echo "<label class='col-form-label fw-semibold fs-7' style='background-color:orange;border-radius: 8px;padding: 5px 15px 5px 15px; '>Interest-added</label>"; 
																		}elseif($catlist['transaction_type']==2){echo "<label class='col-form-label fw-semibold fs-7' style='background-color:lightblue;border-radius: 8px;padding: 5px 15px 5px 15px; '>Withdraw</label>"; 
																		}elseif($catlist['transaction_type']==1){echo "<label class='col-form-label fw-semibold fs-7' style='background-color:#5aad52;border-radius: 8px;padding: 5px 15px 5px 15px; '>Deposit</label>"; 
																		}else  echo "<span>-</span>";
																	?>
																</td>
																<td align="center"><span class="text-end">
																		<a href="javascript:;" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm" onclick="trans_modal('<?php echo $catlist['payment_id'];?>')" data-bs-toggle="modal" data-bs-target="#kt_modal_chit_payment_mode" title="View" >
																		<i class="bi bi-eye-fill eyc"></i>
																		</a>
																	</span>
																</td>
															</tr>
															<?php $i++; } ?>
														</tbody>
												</table>
											</div>
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
			<div class="modal fade" id="kt_modal_chit_payment_mode" tabindex="-1" aria-hidden="true">
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
					<div class="modal-body pt-0 pb-5 px-1 px-xl-20">
						<div class="mb-3 text-center">
							<h2>View Payment Details <span id="id_label"></span></h2>
						</div>
						<?php { ?>
						<div class="row mt-4">
						<!-- Party Payment details Start -->
						<div id="party_pay_tb" style="display:none;">
						<table class="table align-middle fs-7 gy-2 gs-2" id="view_chit_pyt_receive_frm_party">
							<thead>
							  <tr class="text-start text-muted fw-bold fs-6 gs-0">
										<th class="min-w-50px">Payment Mode</th>
										<th class="min-w-100px">Amount</th>
										<th class="min-w-100px">Party Bank</th>
										<th class="min-w-100px">Reference No</th>
										<th class="min-w-100px">Details</th>
								</tr>							 
							</thead>
							<tbody class="text-gray-600 fw-bold fs-5" id="party_pay">
							</tbody>
						</table>
						<div class="row mt-4">
							<div class="col-lg-6 text-start">
								<label class="col-form-label fw-bold fs-5">Total Amount &emsp;</label>
								<label class="col-form-label fw-bold fs-3" id="total_amt1">0.00</label>
							</div>
						</div>
						</div>
						<!-- Party Payment details End -->
						<?php } ?>
						<?php { ?>
						<!-- Company Payment details Start -->
						<div id="company_pay_tb" style="display:none;">
						<table class="table align-middle fs-7 gy-2 gs-2" id="view_ln_dels_to_pay_frm_cmy">
							<thead>
								  <tr class="text-start text-muted fw-bold fs-6 gs-0">
										<th class="min-w-50px">Payment Mode</th>
										<th class="min-w-100px">Amount</th>
										<th class="min-w-100px">Company Bank</th>
										<th class="min-w-100px">Reference No</th>
										<th class="min-w-100px">Details</th>
									</tr>
								 
								</thead>
							<tbody class="text-gray-600 fw-bold fs-5" id="company_pay">
						  </tbody>
						</table>
						<div class="row mt-4">
							<div class="col-lg-6 text-start">
								<label class="col-form-label fw-bold fs-5">Total Amount &emsp;</label>
								<label class="col-form-label fw-bold fs-3" id="total_amt2">0.00</label>
							</div>
						</div>
						</div>
						<!-- Company Payment details End -->
						<?php } ?>
					</div>
					</div>
					<!--end::Modal body-->
				</div>
				<!--end::Modal content-->
			</div>
			<!--end::Modal dialog-->
		</div>
		<?php $this->load->view("script");?>
			<script>
		function trans_modal(val)
		{
			// alert(val);
			var baseurl= $("#baseurl").val();
			$.ajax({
				type: "GET",
				url: baseurl+'Chit/chit_transaction_modal',
				async: false,
				type: "GET",
				data: "pay_id="+val,
				dataType: "json",
				success: function(response)
				{
					var list= '';
					var total= '';
					var total = 0;
					var id_get = '';
					// var nt_wt_tot= 0

					if(response.length > 0){

						response.map((data,i)=>{

							if(response[i].amt_type == 'CR')
							{
								document.getElementById("party_pay_tb").style.display = "block";
								document.getElementById("company_pay_tb").style.display = "none";
							}
							else
							{
								document.getElementById("party_pay_tb").style.display = "none";
								document.getElementById("company_pay_tb").style.display = "block";
							}
							if(response != '')
							{
								var amount = response[i].amount.toLocaleString('en-IN', {
								    maximumFractionDigits: 2,
								    style: 'currency',
								    currency: 'INR'
								});
								list += "<tr><td>"+response[i].type+"</td><td>"+amount+"</td><td>"+response[i].bank +"</td><td class='ple1'>"+response[i].cheque_no+"</td><td class='ple1'>"+response[i].remarks+"</td></tr>" 
							}
							else
							{
								list += "<tr><td>-</td><td>-</td><td>-</td><td>-</td><td>-</td></tr>"
							}
							total += parseInt(response[i].amount);
							id_get = response[i].bill_no;
							// alert(total);
						})

					}
					var tot_amt = total.toLocaleString('en-IN', {
						    maximumFractionDigits: 2,
						    style: 'currency',
						    currency: 'INR'
						});
					$("#total_amt1").html(tot_amt);
					$("#total_amt2").html(tot_amt);
					$('#party_pay').html(list);
					$('#company_pay').html(list);
					$('#id_label').html(id_get);
				}
			});
		}
		</script>
		
		<script>
			$("#kt_datatable_chit_transaction_statement_report").DataTable({
							"ordering": false,
							// "aaSorting":[],
							// "responsive":true,
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
			  "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
			  ">"
			});
		</script>
		<script>
				$(document).ready(function(){
					$('#submit_export').click(function(){
						// alert(1)
					  $('#list_export1').submit();

					});
				});
		</script>
		<script>
			      $("#kt_datatable_chit_transaction_statement_report").kendoTooltip({
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
			function amt_tbox()
			{
				var amt_radio_tbox = document.getElementById("amt_radio_tbox").value;

				 if (amt_radio_tbox=="between") 
				  {
				  	$("#amount_radio_tf2").show();
				  }
				  else
				  {
				  	$("#amount_radio_tf2").hide();
				  }
			}
		</script>
		<script>
			ad_amt_radio()
			function ad_amt_radio()
			{
				var advance_amount_radio = document.getElementById("advance_amount_radio");
				var advance_amount_radio_tbox = document.getElementById("advance_amount_radio_tbox");
				var advance_amount_radio_tf1 = document.getElementById("advance_amount_radio_tf1");
				// var advance_amount_radio_tf2 = document.getElementById("advance_amount_radio_tf2");

				if (advance_amount_radio.checked == true)
				{
				    advance_amount_radio_tbox.style.display = "block";
				    advance_amount_radio_tf1.style.display = "block";
				    $('#ad_check').val(1);
			  	} else 
			  	{
			     	advance_amount_radio_tbox.style.display = "none";
			     	advance_amount_radio_tf1.style.display = "none";
			     	// advance_amount_radio_tf2.style.display = "none";
			     	$('#ad_check').val(0);
			  	}
			}
		</script>
		<script>
			function amt_radio()
			{
				var amount_radio = document.getElementById("amount_radio");
				var amount_radio_tbox = document.getElementById("amount_radio_tbox");
				var amount_radio_tf1 = document.getElementById("amount_radio_tf1");
				var amount_radio_tf2 = document.getElementById("amount_radio_tf2");

				if (amount_radio.checked == true)
				{
				    amount_radio_tbox.style.display = "block";
				    amount_radio_tf1.style.display = "block";
			  	} else 
			  	{
			     	amount_radio_tbox.style.display = "none";
			     	amount_radio_tf1.style.display = "none";
			     	amount_radio_tf2.style.display = "none";
			  	}
			}
		</script>
		
		<script>
		function date_fill()
		{
			var dt_fill = document.getElementById('dt_fill').value;
			var today_dt = document.getElementById('today_dt');
			var week_from_dt = document.getElementById('week_from_dt');
			// var week_to_dt = document.getElementById('week_to_dt');
			var monthly_dt = document.getElementById('monthly_dt');
			var from_dt = document.getElementById('from_dt');
			// var to_dt = document.getElementById('to_dt');
			var from_date_fillter = document.getElementById('from_date_fillter');
			var to_date_fillter = document.getElementById('to_date_fillter');

			if (dt_fill == "today") 
			{
				today_dt.style.display = "block";
				monthly_dt.style.display = "none";
				from_dt.style.display = "none";
				// to_dt.style.display = "none";
				week_from_dt.style.display = "none";
				// week_to_dt.style.display = "none";
				$("#today_date_fillter").flatpickr({
							dateFormat: "d-m-Y",
						});
			}
			else if (dt_fill == "week")
			{
				today_dt.style.display = "none";
				week_from_dt.style.display = "block";
				// week_to_dt.style.display = "block";
				monthly_dt.style.display = "none";
				from_dt.style.display = "none";
				// to_dt.style.display = "none";

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
				// to_dt.style.display = "none";
				week_from_dt.style.display = "none";
				// week_to_dt.style.display = "none";
				$("#monthly_date_fillter").flatpickr({
							dateFormat: "m-Y",
						});
			}
			else if (dt_fill == "custom Date")
			{
				today_dt.style.display = "none";
				monthly_dt.style.display = "none";
				from_dt.style.display = "block";
				// to_dt.style.display = "block";
				week_from_dt.style.display = "none";
				// week_to_dt.style.display = "none";

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
				// to_dt.style.display = "none";
				week_from_dt.style.display = "none";
				// week_to_dt.style.display = "none";
			}
		}
	</script>
	</body>
	<!--end::Body-->
</html>