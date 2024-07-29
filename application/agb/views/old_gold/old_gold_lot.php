<?php $this->load->view("common");?>

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
   background-color: #ec9629;
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
									<h1 class="d-flex align-items-center text-dark fw-bold my-1 fs-3">Old Gold Lot
									<!--begin::Separator-->
									<span class="h-20px border-gray-400 border-start ms-3 mx-2"></span>
							<!--		<label class="d-flex align-items-center text-primary fw-bold my-1 fs-5">
										<span>Company &emsp;-</span>
										<span>&emsp;All</span>
									</label>
									<span class="h-20px border-gray-400 border-start ms-3 mx-2"></span>-->
									<label class="d-flex align-items-center text-primary fw-bold my-1 fs-5">
										<span>Status &emsp;-</span>
										<span>&emsp;<?php if($old_gold_lot_status==''){ echo "All"; }elseif($old_gold_lot_status=='1'){ echo 'Active Lot'; }else{ echo 'Converted Lot'; } ?></span>
									</label>
									<span class="h-20px border-gray-400 border-start ms-3 mx-2"></span>
									<label class="d-flex align-items-center text-primary fw-bold my-1 fs-5">
										<span>Date &emsp;-</span>
										<span>&emsp;<?php if($dt_fill==''){ echo "All"; }else{ echo $dt_fill; } ?></span>
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
												<div class="col-lg-10">
													<div class="row">
														<div class="col-lg-6">
															<div class="text-center">
																<label class="form-label fs-2 fw-bold">Total Count</label>
															</div>
															<div class="text-center">
																<label class="text-success fs-2 fw-bold"><?php if($old_gold_lot_tot->tot_count==''){ echo '0'; }else{ echo $old_gold_lot_tot->tot_count; } ?></label>
															</div>
														</div>
														<div class="col-lg-6">
															<div class="text-center">
																<label class="form-label fs-2 fw-bold">Total Net Weight(gms)</label>
															</div>
															<div class="text-center">
																<label class="text-success fs-2 fw-bold"><?php if($old_gold_lot_tot->tot_weight==''){ echo '0'; }else{ echo $old_gold_lot_tot->tot_weight; } ?></label>
															</div>
														</div>
													</div>
												</div>
												<div class="col-lg-2">
													<div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
														<!--begin::Filter-->
														<button type="button" class="btn btn-sm btn-outline btn-outline-solid btn-outline-warning btn-active-light-primary me-3" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
														<!-- <span class="svg-icon svg-icon-2">
															<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																<path d="M19.0759 3H4.72777C3.95892 3 3.47768 3.83148 3.86067 4.49814L8.56967 12.6949C9.17923 13.7559 9.5 14.9582 9.5 16.1819V19.5072C9.5 20.2189 10.2223 20.7028 10.8805 20.432L13.8805 19.1977C14.2553 19.0435 14.5 18.6783 14.5 18.273V13.8372C14.5 12.8089 14.8171 11.8056 15.408 10.964L19.8943 4.57465C20.3596 3.912 19.8856 3 19.0759 3Z" fill="currentColor" />
															</svg>
														</span> -->
															Filter</button>
														<div class="menu menu-sub menu-sub-dropdown w-300px w-md-325px" data-kt-menu="true">
															<div class="px-7 py-5" data-kt-user-table-filter="form">
															<!--	<div class="mb-2">
																	<label class="form-label fs-6 fw-semibold">Company</label>
																	<select class="form-select form-select-solid" data-control="select2" data-close-on-select="true" data-allow-clear="true" multiple="multiple">
																		<option value="all" selected>All</option>
																		<option value="1">AGB Main Branch Sayalkudi</option>
																		<option value="2">AGB Pernali Branch</option>
																	</select>
																</div>-->
                                                                <form method="POST" action="<?php echo base_url(); ?>Old_gold/old_gold_lot" >	
																<div class="mb-2">
																	<label class="form-label fs-6 fw-semibold">Status</label>
																	<select class="form-select form-select-solid" data-control="select2" data-close-on-select="true"   name="old_gold_lot_status" id="old_gold_lot_status">
																		<option value="" >All</option>
																		<option value="1" <?php if($old_gold_lot_status=='1'){ echo 'selected'; } ?>>Active Lot</option>
																		<option value="2" <?php if($old_gold_lot_status=='2'){ echo 'selected'; } ?>>Converted Lot</option>
																	</select>
																</div>
																<div class="mb-2">
																	<label class="form-label">Date</label>
																	<select class="form-select form-select-solid" data-control="select2" data-hide-search="true" id="dt_fill_old_gold_list" name="dt_fill_old_gold_list" onchange="date_fill_old_gold_list();">	
																		<option value="">All</option>
																		<option value="today" <?php if($dt_fill=="today"){ echo "selected"; } ?>>Today</option>
																			<option value="week" <?php if($dt_fill=="week"){ echo "selected"; } ?>>This Week</option>
																			<option value="monthly" <?php if($dt_fill=="monthly"){ echo "selected"; } ?>>This Month</option>
																			<option value="custom Date" <?php if($dt_fill=="custom Date"){ echo "selected"; } ?>>Custom Date</option>
																	</select>
																</div>
																<div class="mb-2 fv-row" id="today_dt_old_gold_list" style="display:none;">
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
																		<input class="form-control form-control-solid ps-12" name="" placeholder="Date" id="today_date_fillter_old_gold_list" value="<?php echo date("d-m-Y"); ?>" disabled />
																	</div>
																</div>
																<div class="mb-2 fv-row" id="week_from_dt_old_gold_list" style="display:none;">
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
																		<input class="form-control form-control-solid ps-12" name="" placeholder="Date" id="week_from_date_fillter_old_gold_list" value="" disabled />
																	</div>
																</div>
																<div class="mb-2 fv-row" id="week_to_dt_old_gold_list" style="display:none;">
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
																		<input class="form-control form-control-solid ps-12" name="" placeholder="Date" id="week_to_date_fillter_old_gold_list" value="<?php echo date("d-m-Y"); ?>" disabled />
																	</div>
																</div>
																<div class="mb-2 fv-row" id="monthly_dt_old_gold_list" style="display:none;">
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
																		<input class="form-control form-control-solid ps-12" name="" placeholder="Month" id="monthly_date_fillter_old_gold_list" value="<?php echo date("m-Y"); ?>" />
																	</div>
																</div>
																<div class="mb-2 fv-row" id="from_dt_old_gold_list" style="display:none;">
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
																		<input class="form-control form-control-solid ps-12" name="from_date_fillter_old_gold_list" placeholder="From Date" id="from_date_fillter_old_gold_list" value="<?php echo date("d-m-Y"); ?>" />
																	</div>
																</div>
																<div class="mb-2 fv-row" id="to_dt_old_gold_list" style="display:none;">
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
																		<input class="form-control form-control-solid ps-12" name="to_date_fillter_old_gold_list" placeholder="To Date" id="to_date_fillter_old_gold_list" value="<?php echo date("d-m-Y"); ?>"/>
																	</div>
																</div>
																<div class="d-flex justify-content-end">
																	<button type="reset" class="btn btn-light btn-active-light-primary fw-semibold me-2 px-6" data-kt-menu-dismiss="true" data-kt-user-table-filter="reset">Reset</button>
																	<button type="submit" class="btn btn-primary fw-semibold px-6" data-kt-menu-dismiss="true" data-kt-user-table-filter="filter">Apply</button>
																</div>
															</div>
                                                            </form>
														</div>
													</div>
												</div>
											</div>
											<!--end::Card title-->
										</div>
										<!--end::Card header-->
										<!--begin::Card body-->
										<div class="card-body py-4">
											<table  class="table align-middle table-row-dashed table-striped table-hover fs-7 gy-1 gs-2">
											    <thead>
											        <tr class="text-start text-muted fw-bold fs-7 gs-0">
											        	<th class="min-w-50px">Sno</th>
											        	<th class="min-w-50px">Date</th>
											        	<!--<th class="min-w-150px">Company</th>-->
											        	<th class="min-w-50px">Ref No</th>
											        	<th class="min-w-80px">Count</th>
										            <th class="min-w-100px">Net Weight(gms)</th>
										            <th class="min-w-100px">Status</th>
										            <th class="min-w-80px">Action</th>
											        </tr>
											    </thead>
											    <tbody class="text-gray-600 fw-semibold">
											    <?php $i=1; foreach($old_gold_lot_list as $lot_list){ ?>  
                              <tr>
											        	<td><?php echo $i; ?></td>
											        	<td><?php echo $lot_list['date']; ?></td>
											        	<!--<td><?php echo $lot_list['date']; ?></td>-->
											        	<td><?php echo $lot_list['ref_no']; ?></td>
											          <td><?php echo $lot_list['count']; ?></td>
											          <td><?php echo $lot_list['weight']; ?></td>
											          <td><?php if($lot_list['status']=='Y'){  ?>
																	<label class="col-form-label fw-semibold fs-7" name="" id=""><span style="background-color:#B6BD4F;border-radius: 8px;padding: 5px 15px 5px 15px;">Active Lot</span>
																	</label>
                                                                    <?php }else{ ?>
                                                                    <label class="col-form-label fw-semibold fs-7" name="" id=""><span style="background-color:#46dcf9;border-radius: 8px;padding: 5px 15px 5px 15px;">Convert</span>
																	</label>
                                                                    <?php $i++; } ?>
																</td>
										            <td>
																	<span class="text-end">
																		<a href="#" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm" data-bs-toggle="modal" data-bs-target="#kt_modal_view_old_gold_lot" onclick="old_gold_lot_view('<?php  echo $lot_list['ref_no']; ?>')">
																				<i class="bi bi-eye-fill eyc"></i>
																		</a>
                                                                        <?php if($lot_list['status']=='Y'){  ?>
																		<a href="#" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm" data-bs-toggle="modal" data-bs-target="#kt_modal_convert_old_to_pure_gold" onclick="old_gold_lot_convert('<?php  echo $lot_list['ref_no']; ?>')">
																			<i class="fas fa-box eyc" title="Convert to Pure Gold"></i>
																		</a>
                                                                        <?php } ?>
																	</span>
																</td>
											        </tr>
                                                    <?php } ?>
											        
											    </tbody>
											</table>

											<?php 
										$coun = ceil( $count/10);
										$c_page = isset($_GET['page']) ? $_GET['page'] : 1;
									?>
									<?php $paging_info = get_paging_info1($count,10,$c_page); ?>

<form   method="POST" id="filter_form" action="" enctype="multipart/form-data" >
	
    <input type="hidden" id="dt_fill_old_gold_list" name="dt_fill_old_gold_list"  value="<?php echo $dt_fill; ?>">
    <input type="hidden" id="from_date_fillter_old_gold_list" name="from_date_fillter_old_gold_list" value="<?php echo $from_date_fillter; ?>">
	<input type="hidden" id="to_date_fillter_old_gold_list" name="to_date_fillter_old_gold_list" value="<?php echo $to_date_fillter; ?>">
	<input type="hidden" id="old_gold_lot_status" name="old_gold_lot_status"  value="<?php echo $old_gold_lot_status; ?>">
	
	


                                  

<ul class="pagination " style="float:right;" >
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

  	<li class='paginate_button page-item move_to ' value="<?php echo ($paging_info['curr_page'] + 1); ?>">  <a aria-controls='kt_roles_view_table' data-dt-idx='1' tabindex='0' onclick="submit()" class='page-link'  title='Page <?php echo ($paging_info['curr_page'] + 1); ?>'>></a></li>

   

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
		<!--begin::Modal - view old to pure gold entry-->
		<div class="modal fade" id="kt_modal_view_old_gold_lot" tabindex="-1" aria-hidden="true">
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
							<h1>View Old Gold Lot</h1>
						</div>
						<div class="row">
							<label class="col-lg-1 col-form-label fw-semibold fs-6">JewelType</label>
							<label class="col-lg-2 col-form-label fw-bold fs-5"  id="view_item_type" name="view_item_type"> </label>
							<label class="col-lg-2 col-form-label fw-semibold fs-6">Total No of Item</label>
							<label class="col-lg-1 col-form-label fw-bold fs-5"  id="view_count" name="view_count"></label>
							<label class="col-lg-2 col-form-label fw-semibold fs-6">Total Weight(gms)</label>
							<label class="col-lg-2 col-form-label fw-bold fs-5"  id="view_tot_weight" name="view_tot_weight"> </label>
						</div>
						<table id="view_pure_gold_wallet_table" class="table align-middle table-row-dashed table-striped table-hover fs-7 gy-1 gs-2 dataTable">
							<thead>
							  <tr class="text-start text-muted fw-bold fs-7 gs-0">
							  	<th class="min-w-50px">Sno</th>
							   	<th class="min-w-100px">Date</th>
							   	<th class="min-w-100px">Company</th>
							    <th class="min-w-100px">Generate No</th>
									<th class="min-w-50px">Img</th>
									<th class="min-w-80px">Item Name</th>
									<th class="min-w-100px">Subitem Name</th>
									<th class="min-w-80px">Wgt(gms)</th>
									<th class="min-w-50px">Stone(gms)</th>
									<th class="min-w-50px">Less(gms)</th>
									<th class="min-w-80px">Net Wgt(gms)</th>
							  </tr>
							</thead>
							<tbody class="text-gray-600 fw-semibold" id="view_rows" name="view_rows">
								
							</tbody>
						</table>
					</div>
					<!--end::Modal body-->
				</div>
				<!--end::Modal content-->
			</div>
			<!--end::Modal dialog-->
		</div>
		<!--end::Modal - view old to pure gold entry-->
		
		
        <div class="modal fade" id="kt_modal_convert_old_to_pure_gold" tabindex="-1" aria-hidden="true">
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
							<h1>Convert To Pure Gold</h1>
						</div>
						<form method="POST" action="<?php echo base_url(); ?>Old_gold/old_gold_convert" enctype="multipart/form-data" >
						<div class="row">
							<label class="col-lg-1 col-form-label fw-semibold fs-6">Count</label>
							<label class="col-lg-1 col-form-label fw-bold fs-4" id="old_gold_lot_convert_count" name="old_gold_lot_convert_count">5</label>
							<label class="col-lg-2 col-form-label fw-semibold fs-6">Weight(gms)</label>
							<label class="col-lg-1 col-form-label fw-bold fs-4" id="old_gold_lot_convert_weight" name="old_gold_lot_convert_weight">17.500</label>
							<input type="hidden" name="old_gold_lot_convert_lot_no" id="old_gold_lot_convert_lot_no">
							<input type="hidden" name="old_gold_lot_convert_item_type" id="old_gold_lot_convert_item_type">
							<input type="hidden" name="old_gold_lot_convert_count1" id="old_gold_lot_convert_count1">
							<input type="hidden" name="old_gold_lot_convert_weight1" id="old_gold_lot_convert_weight1">
							<input type="hidden" name="old_gold_lot_convert_weight_less1" id="old_gold_lot_convert_weight_less1">
							<input type="hidden" name="old_gold_lot_convert_purity1" id="old_gold_lot_convert_purity1">
							<input type="hidden" name="old_gold_lot_convert_metal_weight1" id="old_gold_lot_convert_metal_weight1">
							<input type="hidden" name="old_gold_lot_convert_actual_pure1" id="old_gold_lot_convert_actual_pure1">
							<div class="col-lg-3">
								<label class="col-form-label required fw-semibold fs-6">After Melt Net Weight(gms)</label>
							</div>
							
							<div class="col-lg-1 fv-row fv-plugins-icon-container">
								<input type="text" name="old_gold_lot_convert_weight_after" id="old_gold_lot_convert_weight_after" class="form-control form-control-lg1 form-control-solid" onkeyup="old_gold_lot_convert_weight_less()">
								<div class="fv-plugins-message-container invalid-feedback"></div>
							</div>
							<label class="col-lg-1 col-form-label fw-semibold fs-6" >Less</label>
							<label class="col-lg-2 col-form-label fw-bold fs-4"  name="old_gold_lot_convert_weight_less" id="old_gold_lot_convert_weight_less">0.00</label>
							<label class="col-form-label fw-bold fs-4 text-center">Convertion</label>
						</div>
						<div class="row">
							<div class="col-lg-2 d-flex align-items-center">
								<div class="form-check form-check-custom me-3">
									<input class="form-check-input2" type="radio" id="convertion" name="convertion_radio" value="convertion_radio_val" />
								</div>
								<div class="d-flex flex-column">
									<div class="fs-6 fw-semibold text-muted">Purity(%)</div>
								</div>
							</div>
							<div class="col-lg-3 d-flex align-items-center">
								<div class="form-check form-check-custom me-3">
									<input class="form-check-input2" type="radio" id="convertion_1" name="convertion_radio" value="convertion_radio_pur_met_val"/>
								</div>
								<div class="d-flex flex-column">
									<div class="fs-6 fw-semibold text-muted">Pure Metal Weight(gms)</div>
								</div>
							</div>
						</div>
						<div class="row mt-2">
							<label class="col-lg-2 col-form-label fw-semibold fs-6" id="bas_pur_label" style="display:none;">Based on Purity(%)</label>
							<div class="col-lg-1 fv-row fv-plugins-icon-container" id="bas_pur_tbox" style="display:none;">
								<input type="text" name="old_gold_lot_convert_based_purity"  id="old_gold_lot_convert_based_purity" class="form-control form-control-lg1 form-control-solid" onkeyup="old_gold_lot_convert_based()">
								<div class="fv-plugins-message-container invalid-feedback"></div>
							</div>
							<div class="col-lg-3" id="pur_metal_label" style="display:none;">
								<label class="col-form-label fw-semibold fs-6">Pure Metal(gms) &emsp;</label>
								<label class="col-form-label fw-bold fs-4" name="old_gold_lot_convert_pure_metal" id="old_gold_lot_convert_pure_metal">0.00</label>
							</div>
							<label class="col-lg-2 col-form-label fw-semibold fs-6" id="bas_pur_metal_wgt_label" style="display:none;">Based on Pure Metal Weight(gms)</label>
							<div class="col-lg-1 fv-row fv-plugins-icon-container" id="bas_pur_metal_wgt_tbox" style="display:none;">
								<input type="text" name="old_gold_lot_convert_based_metal_weight" id="old_gold_lot_convert_based_metal_weight" class="form-control form-control-lg1 form-control-solid" onkeyup="old_gold_lot_convert_based1()">
								<div class="fv-plugins-message-container invalid-feedback"></div>
							</div>
							<div class="col-lg-3" id="pur_label" style="display:none;">
								<label class="col-form-label fw-semibold fs-6">Purity (%) &emsp;&emsp;</label>
								<label class="col-form-label fw-bold fs-4" name="old_gold_lot_convert_purity" id="old_gold_lot_convert_purity">0.00</label>
							</div>
							<label class="col-lg-2 col-form-label fw-semibold fs-6" id="pur_metal_wgt_label" style="display:none;">Pure Metal Purity(%)</label>
							<div class="col-lg-1 fv-row fv-plugins-icon-container" id="pur_metal_wgt_tbox" style="display:none;">
								<input type="text" name="old_gold_lot_convert_pure_metal_purity"  id="old_gold_lot_convert_pure_metal_purity"class="form-control form-control-lg1 form-control-solid" onkeyup="old_gold_lot_convert_actual_pure()">
								<div class="fv-plugins-message-container invalid-feedback"></div>
							</div>
							<div class="col-lg-3" id="act_pur_label" style="display:none;">
								<label class="col-form-label fw-semibold fs-6">Actual Pure(gms) &emsp;</label>
								<label class="col-form-label fw-bold fs-4" name="old_gold_lot_convert_actual_pure" id="old_gold_lot_convert_actual_pure">0.000</label>
							</div>
						</div>
						<div class="row">
							<label class="col-lg-1 col-form-label required fw-semibold fs-6">Converter</label>
							<div class="col-lg-2 fv-row fv-plugins-icon-container">
								<select class="form-select form-select-solid" data-control="select2" data-hide-search="true" name="old_gold_lot_converter" id="old_gold_lot_converter">	
									<option value="">Select</option>
									<?php foreach($suppliers_list as $slist){ ?>
									<option value="<?php echo $slist['COMPANYCODE']; ?>"><?php echo $slist['LEDGER_NAME']; ?></option>
									<?php } ?>
									
								</select>
							</div>
							<label class="col-lg-1 col-form-label fw-semibold fs-6">Certificate from Converter</label>
							<div class="col-lg-8 fv-row">
								<!--begin::Image input-->
								<div class="image-input image-input-outline" data-kt-image-input="true">
								 <!-- style="background-image: url(assets/images/sample_jewel.jpg)"> -->
										<!--begin::Preview existing avatar-->
										<div class="image-input-wrapper">
										  <!-- style="background-image: url(assets/images/sample_jewel.jpg)"> -->
										  </div>
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
						
						<div class="d-flex justify-content-end mt-4">
							<button type="reset" class="btn btn-secondary me-3" data-bs-dismiss="modal">Cancel</button>
							<button type="submit" class="btn btn-primary">Convert</button>
						</div>
					</div>
					</form>
					<!--end::Modal body-->
				</div>
				<!--end::Modal content-->
			</div>
			<!--end::Modal dialog-->
		</div>

		<?php $this->load->view("script");?>

		<!-- <script src="js/purchaseregister-list.js"></script> -->
		<script>

$(document).ready(function() {
	
	$(".move_to").on("click", function () {
		value=$(this).val();
		// alert(value);
		$('#filter_form').attr('action', "<?php echo base_url(); ?>Old_gold/old_gold_lot?page="+value);
		$("#filter_form").submit();
		e.preventDefault();
	});
});
</script>
<script>
function old_gold_lot_convert_weight_less(){

	var after_weight= $("#old_gold_lot_convert_weight_after").val();
	var weight= $("#old_gold_lot_convert_weight1").val();
	var convertion= $("#convertion").val();
	var convertion_1= $("#convertion_1").val();
	var based_purity= $("#old_gold_lot_convert_based_purity").val();
	var based_metal_weight= $("#old_gold_lot_convert_based_metal_weight").val();
	var pure_metal_purity= parseFloat($("#old_gold_lot_convert_pure_metal_purity").val());


    less=parseFloat(weight)-parseFloat(after_weight);
	$('#old_gold_lot_convert_weight_less').html(parseFloat(less).toFixed(3));
	$('#old_gold_lot_convert_weight_less1').val(parseFloat(less).toFixed(3));
	

	

	
}
</script>
        <script>	
function old_gold_lot_convert_based(){

var after_weight= $("#old_gold_lot_convert_weight_after").val();
var weight= $("#old_gold_lot_convert_weight1").val();
var convertion= $("#convertion").val();
var convertion_1= $("#convertion_1").val();
var based_purity= $("#old_gold_lot_convert_based_purity").val();
var based_metal_weight= $("#old_gold_lot_convert_based_metal_weight").val();
var pure_metal_purity= $("#old_gold_lot_convert_pure_metal_purity").val();


less=parseFloat(weight)-parseFloat(after_weight);
$('#old_gold_lot_convert_weight_less').html(parseFloat(less).toFixed(3));

if(convertion=='convertion_radio_val'){
	var metal_weight=parseFloat(after_weight) *parseFloat(based_purity)/100;
	$('#old_gold_lot_convert_pure_metal').html(parseFloat(metal_weight).toFixed(3));
	var actual_pure=parseFloat(metal_weight) *parseFloat(pure_metal_purity)/100;
	
	
	$('#old_gold_lot_convert_purity1').val(based_purity);
	$('#old_gold_lot_convert_metal_weight1').val(parseFloat(metal_weight).toFixed(3));


	// $('#old_gold_lot_convert_actual_pure').html(based_purity);
	// $('#old_gold_lot_convert_actual_pure1').val(parseFloat(actual_pure).toFixed(3));

}


}
</script>
<script>	
function old_gold_lot_convert_based1(){

var after_weight= $("#old_gold_lot_convert_weight_after").val();
var weight= $("#old_gold_lot_convert_weight1").val();
var convertion= $("#convertion").val();
var convertion_1= $("#convertion_1").val();
var based_purity= $("#old_gold_lot_convert_based_purity").val();
var based_metal_weight= $("#old_gold_lot_convert_based_metal_weight").val();
var pure_metal_purity= $("#old_gold_lot_convert_pure_metal_purity").val();


less=parseFloat(weight)-parseFloat(after_weight);
$('#old_gold_lot_convert_weight_less').html(parseFloat(less).toFixed(3));


if(convertion_1=='convertion_radio_pur_met_val'){
	var metal_purity=100*parseFloat(based_metal_weight)/parseFloat(after_weight) ;
	$('#old_gold_lot_convert_purity').html(parseFloat(metal_purity).toFixed(2));
	var actual_pure=parseFloat(based_metal_weight) *parseFloat(pure_metal_purity)/100;
	// alert(metal_purity);
	$('#old_gold_lot_convert_purity1').val(parseFloat(metal_purity).toFixed(3));
	$('#old_gold_lot_convert_metal_weight1').val(parseFloat(based_metal_weight).toFixed(3));

	//  $('#old_gold_lot_convert_actual_pure').html(parseFloat(actual_pure).toFixed(3));
	//  $('#old_gold_lot_convert_actual_pure1').val(parseFloat(actual_pure).toFixed(3));

}


}
</script>
        <script>

function old_gold_lot_convert_actual_pure(){



var based_purity= $("#old_gold_lot_convert_purity1").val();
var based_metal_weight= $("#old_gold_lot_convert_metal_weight1").val();
var pure_metal_purity= $("#old_gold_lot_convert_pure_metal_purity").val();







	
	var actual_pure=parseFloat(pure_metal_purity)*based_metal_weight/100;
	
	// alert(actual_pure);
	$('#old_gold_lot_convert_actual_pure').html(actual_pure);
	$('#old_gold_lot_convert_actual_pure1').val(parseFloat(actual_pure).toFixed(3));





}

		</script>



                  <script>
function old_gold_lot_view(val){
//  alert(val);

var baseurl= $("#baseurl").val();
				// alert(baseurl);
				$.ajax({
				type: "POST",
				url: baseurl+'Old_gold/old_gold_lot_view',
				async: false,
				type: "POST",
				data: "id="+val,
				dataType: "html",
				success: function(response)
				{
					 res=response.split('||');
					 $('#view_item_type').html(res[1]);
					$('#view_count').html(res[2]);
					$('#view_tot_weight').html(res[3]);
					 $('#view_rows').html(res[4]);
				
			
				}
			});
}
</script>
<script>
function old_gold_lot_convert(val){
//  alert(val);

var baseurl= $("#baseurl").val();
				// alert(baseurl);
				$.ajax({
				type: "POST",
				url: baseurl+'Old_gold/old_gold_lot_convert',
				async: false,
				type: "POST",
				data: "id="+val,
				dataType: "html",
				success: function(response)
				{
					
					  res=response.split('||');
					  $('#old_gold_lot_convert_count').html(res[1]);
					 $('#old_gold_lot_convert_weight').html(res[2]);
					 $('#old_gold_lot_convert_count1').val(res[1]);
					 $('#old_gold_lot_convert_weight1').val(res[2]);
					 $('#old_gold_lot_convert_item_type').val(res[3]);
					 $('#old_gold_lot_convert_lot_no').val(res[4]);
					
				
				 
			
				}
			});
}
</script>

        <script>
			$('input:radio[name="convertion_radio"]').change(function() 
			{
				var bas_pur_label = document.getElementById("bas_pur_label");
				var bas_pur_tbox = document.getElementById("bas_pur_tbox");
				var pur_metal_label = document.getElementById("pur_metal_label");
				var bas_pur_metal_wgt_label = document.getElementById("bas_pur_metal_wgt_label");
				var bas_pur_metal_wgt_tbox = document.getElementById("bas_pur_metal_wgt_tbox");
				var pur_label = document.getElementById("pur_label");
				var pur_metal_wgt_label = document.getElementById("pur_metal_wgt_label");
				var pur_metal_wgt_tbox = document.getElementById("pur_metal_wgt_tbox");
				var act_pur_label = document.getElementById("act_pur_label");
				
		        if ($(this).val()=='convertion_radio_val') 
		        {
					
		            // $('#int_group_tbox_od_report').attr('disabled',true);
		            bas_pur_label.style.display = "block";
		            bas_pur_tbox.style.display = "block";
		            pur_metal_label.style.display = "block";
		            bas_pur_metal_wgt_label.style.display = "none";
		            bas_pur_metal_wgt_tbox.style.display = "none";
		            pur_label.style.display = "none";
		            pur_metal_wgt_label.style.display = "block";
		            pur_metal_wgt_tbox.style.display = "block";
		            act_pur_label.style.display = "block";

		        } else
		        {

					
		            // $('#int_group_tbox_od_report').removeAttr('disabled');
		            bas_pur_label.style.display = "none";
		            bas_pur_tbox.style.display = "none";
		            pur_metal_label.style.display = "none";
		            bas_pur_metal_wgt_label.style.display = "block";
		            bas_pur_metal_wgt_tbox.style.display = "block";
		            pur_label.style.display = "block";
		            pur_metal_wgt_label.style.display = "block";
		            pur_metal_wgt_tbox.style.display = "block";
		            act_pur_label.style.display = "block";
		        }
		    });
			</script>
            <script>
			function exist_lot_radio()
			{
				var exis_lot_radio = document.getElementById("exis_lot_radio");
				var exis_lot_radio_tbox = document.getElementById("exis_lot_radio_tbox");

				if (exis_lot_radio.checked)
				{
			    exis_lot_radio_tbox.style.display = "block";
		  	} 
		  	else 
		  	{
		     	exis_lot_radio_tbox.style.display = "none";
		  	}
			}
		</script>
		<script>
			$("#view_pure_gold_wallet_table").DataTable({
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
			$('#view_pure_gold_wallet_table').wrap('<div class="dataTables_scroll" />');
		</script>
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
		<!-- old_gold list day fillter start -->
		<script>
			function date_fill_old_gold_list()
			{
				var dt_fill_old_gold_list = document.getElementById('dt_fill_old_gold_list').value;
				var today_dt_old_gold_list = document.getElementById('today_dt_old_gold_list');
				var week_from_dt_old_gold_list = document.getElementById('week_from_dt_old_gold_list');
				var week_to_dt_old_gold_list = document.getElementById('week_to_dt_old_gold_list');
				var monthly_dt_old_gold_list = document.getElementById('monthly_dt_old_gold_list');
				var from_dt_old_gold_list = document.getElementById('from_dt_old_gold_list');
				var to_dt_old_gold_list = document.getElementById('to_dt_old_gold_list');
				var from_date_fillter_old_gold_list = document.getElementById('from_date_fillter_old_gold_list');
				var to_date_fillter_old_gold_list = document.getElementById('to_date_fillter_old_gold_list');

				if (dt_fill_old_gold_list == "today") 
				{
					today_dt_old_gold_list.style.display = "block";
					monthly_dt_old_gold_list.style.display = "none";
					from_dt_old_gold_list.style.display = "none";
					to_dt_old_gold_list.style.display = "none";
					week_from_dt_old_gold_list.style.display = "none";
					week_to_dt_old_gold_list.style.display = "none";
					$("#today_date_fillter_old_gold_list").flatpickr({
								dateFormat: "d-m-Y",
							});
				}
				else if (dt_fill_old_gold_list == "week")
				{
					today_dt_old_gold_list.style.display = "none";
					week_from_dt_old_gold_list.style.display = "block";
					week_to_dt_old_gold_list.style.display = "block";
					monthly_dt_old_gold_list.style.display = "none";
					from_dt_old_gold_list.style.display = "none";
					to_dt_old_gold_list.style.display = "none";

					var curr = new Date; // get current date
					var first = curr.getDate() - curr.getDay(); // First day is the day of the month - the day of the week
					var last = first + 6; // last day is the first day + 6

					var firstday = new Date(curr.setDate(first)).toISOString().slice(0,10);
					firstday = firstday.split("-").reverse().join("-");
					var lastday = new Date(curr.setDate(last)).toISOString().slice(0,10);
					lastday = lastday.split("-").reverse().join("-");
					$('#week_from_date_fillter_old_gold_list').val(firstday);
					$('#week_to_date_fillter_old_gold_list').val(lastday);
					
				}
				else if (dt_fill_old_gold_list == "monthly")
				{
					today_dt_old_gold_list.style.display = "none";
					monthly_dt_old_gold_list.style.display = "block";
					from_dt_old_gold_list.style.display = "none";
					to_dt_old_gold_list.style.display = "none";
					week_from_dt_old_gold_list.style.display = "none";
					week_to_dt_old_gold_list.style.display = "none";
					$("#monthly_date_fillter_old_gold_list").flatpickr({
								dateFormat: "m-Y",
							});
				}
				else if (dt_fill_old_gold_list == "custom Date")
				{
					today_dt_old_gold_list.style.display = "none";
					monthly_dt_old_gold_list.style.display = "none";
					from_dt_old_gold_list.style.display = "block";
					to_dt_old_gold_list.style.display = "block";
					week_from_dt_old_gold_list.style.display = "none";
					week_to_dt_old_gold_list.style.display = "none";

					$("#from_date_fillter_old_gold_list").flatpickr({
								dateFormat: "d-m-Y",
							});
					$("#to_date_fillter_old_gold_list").flatpickr({
								dateFormat: "d-m-Y",
							});
				}
				else
				{
					today_dt_old_gold_list.style.display = "none";
					monthly_dt_old_gold_list.style.display = "none";
					from_dt_old_gold_list.style.display = "none";
					to_dt_old_gold_list.style.display = "none";
					week_from_dt_old_gold_list.style.display = "none";
					week_to_dt_old_gold_list.style.display = "none";
				}
			}
		</script>
		<!-- loan list day fillter end -->
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
	      $("#view_pure_gold_wallet_table").kendoTooltip({
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