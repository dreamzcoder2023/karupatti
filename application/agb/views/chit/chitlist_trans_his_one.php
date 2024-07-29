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
									<h1 class="d-flex align-items-center text-dark fw-bold my-1 fs-3">Chit Party Transaction History 
									<!--begin::Separator-->
									<span class="h-20px border-gray-400 border-start ms-3 mx-2"></span>
									<label class="d-flex align-items-center text-primary fw-bold my-1 fs-5">
										<span>Scheme &emsp;-</span>
										<span>&emsp;<?php if($scheme_sel==''){ echo "All"; }else{ if($scheme_sel=='1'){ echo 'Selvamagal'; } else { echo 'Thangamagal'; } } ?></span>
									</label>
									<span class="h-20px border-gray-400 border-start ms-3 mx-2"></span>
									<label class="d-flex align-items-center text-primary fw-bold my-1 fs-5">
										<span>Scheme Type &emsp;-</span>
										<!--<span>&emsp;All</span>-->
										<span>&emsp;
											<?php
											if($sch_cashgold==''){ echo "All"; }
											else
											{ 
											 if($sch_cashgold=='1'){
												echo 'Cash';}

											 else{ echo 'Gold'; } } 
											 ?>
										</span>
									</label>
									<span class="h-20px border-gray-400 border-start ms-3 mx-2"></span>
									<label class="d-flex align-items-center text-primary fw-bold my-1 fs-5">
										<span>Status &emsp;-</span>
										<span>&emsp;<?php if($sta_sel==''){ echo "All"; }else{ if($sta_sel == 2) { echo 'Withdraw'; } elseif($sta_sel == 1) { echo 'Deposit'; } elseif($sta_sel == 3) { echo "Interest-Added"; } elseif($sta_sel == 4) { echo "Withdraw-Loan"; } elseif($sta_sel == 5) { echo "Withdraw-Sales"; } else { echo ''; } } ?></span>
									</label>
									<span class="h-20px border-gray-400 border-start ms-3 mx-2"></span>
									<label class="d-flex align-items-center text-primary fw-bold my-1 fs-5">
										<span>Date &emsp;-</span>
										<span>&emsp;<?php if($dt_fill==''){ echo "All"; }else{ echo ucfirst($dt_fill); } ?></span>
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
									<?php if(isset($_SESSION['Transaction HistoryView'])){ if($_SESSION['Transaction HistoryView']==1){?>
									<!--begin::Tables Widget 9-->
									<div class="card card-xxl-stretch mb-5 mb-xl-8">
										<!--begin::Card header-->
										<div class="card-header1 border-0 pt-6">
											<div class="row">
												<div class="col-lg-8">
												</div>
												<div class="col-lg-4">
													<div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
														<!--begin::Filter-->
														<button type="button" class="btn btn-sm btn-outline btn-outline-solid btn-outline-warning btn-active-light-primary me-3" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
															Filter</button>															
														<div class="menu menu-sub menu-sub-dropdown w-300px w-md-325px" data-kt-menu="true">
															<form method="POST" autocomplete="off" action="<?php echo base_url(); ?>Chit/chit_transaction_history/<?php echo $party_id?$party_id:''; ?>" enctype="multipart/form-data" id="fill_form">
															<div class="px-7 py-5" data-kt-user-table-filter="form">	
															<div class="scroll-y mh-325px my-1 px-1">											
																<div class="mb-2">
																	<label class="form-label fs-6 fw-semibold">Scheme</label>
																	<select class="form-select form-select-solid fw-semibold" onchange ="schtype();" id="scheme_sel" name="scheme_sel" data-control="select2" data-hide-search="true">	
																		<option value="" selected>All</option>
																		<option value="1"<?php if($scheme_sel=="1"){ echo "selected"; } ?>>Selvamagal</option>
																		<option value="2"<?php if($scheme_sel=="2"){ echo "selected"; } ?>>Thangamagal</option>
																	</select>
																</div>
																<div class="mb-2" id="cash_gold" style="display:none">
																	<label class="form-label fs-6 fw-semibold">Scheme Type</label>
																	<select class="form-select form-select-solid fw-semibold" name="sch_cashgold" id="sch_cashgold" data-control="select2" data-hide-search="true">	
																		<option value="" selected="">All</option>
																		<option value="1"<?php if($sch_cashgold=="1"){ echo "selected"; } ?>>Cash</option>
																		<option value="2"<?php if($sch_cashgold=="2"){ echo "selected"; } ?>>Gold</option>
																	</select>
																</div>
																<div class="mb-2">
																	<label class="form-label fs-6 fw-semibold">Status</label>
																	<select class="form-select form-select-solid fw-semibold" id="sta_sel" name="sta_sel" data-control="select2" data-hide-search="true">	
																		<option value="" selected>All</option>
																		<option value="1"<?php if($sta_sel=="1"){ echo "selected"; } ?>>Deposit</option>
																		<option value="2"<?php if($sta_sel=="2"){ echo "selected"; } ?>>Withdraw</option>
																		<option value="3"<?php if($sta_sel=="3"){ echo "selected"; } ?>>Interest-Added</option>
																		<option value="4"<?php if($sta_sel=="4"){ echo "selected"; } ?>>Withdraw-Loan</option>
																		<option value="5"<?php if($sta_sel=="5"){ echo "selected"; } ?>>Withdraw-Sales</option>
																	</select>
																</div>
																<div class="mb-2">
																	<label class="form-label">Date</label>
																	<select class="form-select form-select-solid" data-control="select2" name="dt_fill_sales_list" data-hide-search="true" id="dt_fill_sales_list" onchange="date_fill_sales_list();">	
																		<option value="all">All</option>
																			<option value="today" <?php if($dt_fill=="today"){ echo "selected"; } ?>>Today</option>
																			<option value="week"<?php if($dt_fill=="week"){ echo "selected"; } ?>>This Week</option>
																			<option value="monthly"<?php if($dt_fill=="monthly"){ echo "selected"; } ?>>This Month</option>
																			<option value="custom Date"  <?php if($dt_fill=="custom Date"){ echo "selected"; } ?>>Custom Date</option>
																	</select>
																</div>
																<div class="mb-2 fv-row" id="today_dt_sales_list" style="display:none;">
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
																		<input class="form-control form-control-solid ps-12" name="" placeholder="Date" id="today_date_fillter_sales_list" value="<?php echo date("d-m-Y"); ?>" disabled />
																	</div>
																</div>
																<div class="mb-2 fv-row" id="week_from_dt_sales_list" style="display:none;">
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
																		<input class="form-control form-control-solid ps-12" name="" placeholder="Date" id="week_from_date_fillter_sales_list" value="" disabled />
																	</div>
																</div>
																<div class="mb-2 fv-row" id="week_to_dt_sales_list" style="display:none;">
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
																		<input class="form-control form-control-solid ps-12" name="" placeholder="Date" id="week_to_date_fillter_sales_list" value="<?php echo date("d-m-Y"); ?>" disabled />
																	</div>
																</div>
																<div class="mb-2 fv-row" id="monthly_dt_sales_list" style="display:none;">
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
																		<input class="form-control form-control-solid ps-12" name="" placeholder="Month" id="monthly_date_fillter_sales_list" value="<?php echo date("m-Y"); ?>" />
																	</div>
																</div>
																<div class="mb-2 fv-row" id="from_dt_sales_list" style="display:none;">
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
																		<input class="form-control form-control-solid ps-12" name="" placeholder="From Date" id="from_date_fillter_sales_list" value="<?php echo date("d-m-Y"); ?>" />
																	</div>
																</div>
																<div class="mb-2 fv-row" id="to_dt_sales_list" style="display:none;">
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
																		<input class="form-control form-control-solid ps-12" name="" placeholder="To Date" id="to_date_fillter_sales_list" value="<?php echo date("d-m-Y"); ?>"/>
																	</div>
																</div>
																</div>
																<div class="d-flex justify-content-end">
																	<button type="reset" class="btn btn-light btn-active-light-primary fw-semibold me-2 px-6" data-kt-menu-dismiss="true" data-kt-user-table-filter="reset" onclick="reset_fill()">Reset</button>
																	<button type="submit" class="btn btn-primary fw-semibold px-6" data-kt-menu-dismiss="true" data-kt-user-table-filter="filter">Apply</button>
																</div>
															</div>
															</form>
														</div>
														<form id="list_export1" method="POST" action="<?php echo base_url();?>Chit/chit_transaction_export_single/<?php echo $party_id; ?>">
															<input type="hidden" id="dt_fill_sales_list" name="dt_fill_sales_list"  value="<?php echo $dt_fill; ?>">
															<input type="hidden" id="from_date_fillter_sales_list" name="from_date_fillter_sales_list" value="<?php echo $from_date_fillter; ?>">
															<input type="hidden" id="to_date_fillter_sales_list" name="to_date_fillter_sales_list" value="<?php echo $to_date_fillter; ?>">
															<input type="hidden" id="scheme_sel" name="scheme_sel"  value="<?php echo $scheme_sel; ?>">
															<input type="hidden" id="sta_sel" name="sta_sel"  value="<?php echo $sta_sel; ?>">
															<input type="hidden" id="sch_cashgold" name="sch_cashgold"  value="<?php echo $sch_cashgold; ?>">
															<button type="button" id="submit_export" class="btn btn-sm btn-outline btn-outline-solid btn-outline-warning btn-active-light-primary me-3">Export</button>
														</form>
													
													</div>
												</div>
											</div>
											<!--end::Card title-->
										</div>
										<!--end::Card header-->
										<!--begin::Card body-->
										<div class="card-body py-4">
											<!--begin::Table-->
											<table class="table align-middle table-striped table-hover fs-7 gy-1 gs-2" id="chit_trans_table">
												<thead>
												   <tr class="text-center text-muted fw-bold fs-7 gs-0">
														  <th class="min-w-50px">Sno</th>
														  <th class="min-w-50px">Date</th>
															<th class="min-w-100px">Party Info</th>
															<th class="min-w-100px">Chit / Sch ID</th>
															<th class="min-w-100px">Scheme</th>
															<th class="min-w-50px">Type</th>
															<th class="min-w-100px">Open Balance</th>
															<th class="min-w-100px">Process Amount</th>
															<th class="min-w-100px">Closing Balance</th>
															<th class="min-w-100px">Status</th>
															<th class="min-w-125px" style="width: 10%;"><span class="text-end">Actions</span></th>
													</tr>
												</thead>
												<tbody class="text-gray-600 fw-semibold">

  													<?php 
													$i=1;
													foreach($chit_all_trans_list as $ch_list){
													?>
													
													<tr>
														<td><?php echo $i; ?></td>
														<td><?php $date_format  = $this->db->query("SELECT * FROM general_settings ")->row();
               														 $format = $date_format->date_format;
                												echo date("$format", strtotime($ch_list['trans_date']));?></td>
														<td class="ple1">
														<!-- <span><i class="fa-solid fa-star fs-7" style="color:orange;"></i></span> -->
														<span class="align-items-center"><i class="fa-solid fa-star fs-5" style="<?php 
															if($ch_list['RATING']==3) { echo 'color:#50cd89;'; }
															else if($ch_list['RATING']==2) { echo 'color:#ffc700;'; }
															else if($ch_list['RATING']==1) { echo 'color:red;'; }
															else if($ch_list['RATING']=='' || is_null($ch_list['RATING'])) { echo 'color:#d2d4dc;'; }
															else { echo ''; }
															?>"></i>&nbsp;<?php echo $ch_list['NAME'];?></span></td>
														<td><?php echo $ch_list['chit_id']; ?> / <br>
																<span class="fs-9 badge badge-info"><?php echo $ch_list['scheme_id']; ?></span>
															 <?php if($ch_list['type']==2) { echo '&nbsp;&nbsp;<i class="fa-solid fa-circle-xmark fs-4 text-danger mt-2" title="closed"></i></td>'; } 
															 ?>
														<td><?php 
																if($ch_list['scheme_type']==3){echo "<span>Thangamagal</span>"; 
																}elseif($ch_list['scheme_type']==2){echo "<span>Thangamagal</span>";
																}elseif($ch_list['scheme_type']==1){echo "<span>Selvamagal</span>";
																}else  echo "<span>-</span>";
															?></td>
														<td><?php 
																if($ch_list['scheme_type']==3){echo "<span>Gold</span>"; 
																}elseif($ch_list['scheme_type']==2){echo "<span>Cash</span>";
																}elseif($ch_list['scheme_type']==1){echo "<span>Cash</span>";
																}else  echo "<span>-</span>";
															?></td>
                            <td><?php echo number_format($ch_list['opening_amount'],2,'.',','); ?></td>
														<td>
															<?php echo number_format($ch_list['processing_amount'],2,'.',',');?> <?php if($ch_list['scheme_type']==3){ ?> /  <?php echo number_format($ch_list['amt_paid'],2,'.',',');  } ?>
														</td>
														<td><?php echo number_format($ch_list['closing_balance'],2,'.',',');?></td>
	                          <td>
															<?php 
																if($ch_list['transaction_type']==5){echo "<label  class='col-form-label fw-semibold fs-7' style='background-color:yellow;border-radius: 8px;padding: 5px 15px 5px 15px; '>Withdraw-Loan</label>"; 
																}elseif($ch_list['transaction_type']==4){echo "<label class='col-form-label fw-semibold fs-7' style='background-color:violet;border-radius: 8px;padding: 5px 15px 5px 15px; '>Withdraw-Sales</label>"; 
																}elseif($ch_list['transaction_type']==3){echo "<label class='col-form-label fw-semibold fs-7' style='background-color:orange;border-radius: 8px;padding: 5px 15px 5px 15px; '>Interest-added</label>"; 
																}elseif($ch_list['transaction_type']==2){echo "<label class='col-form-label fw-semibold fs-7' style='background-color:lightblue;border-radius: 8px;padding: 5px 15px 5px 15px; '>Withdraw</label>"; 
																}elseif($ch_list['transaction_type']==1){echo "<label class='col-form-label fw-semibold fs-7' style='background-color:#5aad52;border-radius: 8px;padding: 5px 15px 5px 15px; '>Deposit</label>"; 
																}else  echo "<span>-</span>";
															?>
														</td>
														<td align="center"><span class="text-end">
																<a href="javascript:;" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm" onclick="trans_modal('<?php echo $ch_list['payment_id'];?>')" data-bs-toggle="modal" data-bs-target="#kt_modal_chit_payment_mode" title="View" onclick="view('<?php echo $ch_list['party_id'];?>')">
																<i class="bi bi-eye-fill eyc"></i>
																</a>
															</span>
														</td>
													</tr>
													<?php $i++; } ?>
												</tbody>
											</table>
															
															<?php 
																	$coun = ceil( $count/10);
																	$c_page = isset($_GET['page']) ? $_GET['page'] : 1;
																?>
																
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
																<?php $paging_info = get_paging_info1($count,10,$c_page); ?>

																			<form   method="POST" id="filter_form" action="" enctype="multipart/form-data" >
																				
																				

																			<input type="hidden" id="dt_fill_sales_list" name="dt_fill_sales_list"  value="<?php echo $dt_fill; ?>">
																			<input type="hidden" id="from_date_fillter_sales_list" name="from_date_fillter_sales_list" value="<?php echo $from_date_fillter; ?>">
																			<input type="hidden" id="to_date_fillter_sales_list" name="to_date_fillter_sales_list" value="<?php echo $to_date_fillter; ?>">
																			<input type="hidden" id="scheme_sel" name="scheme_sel"  value="<?php echo $scheme_sel; ?>">
																			<input type="hidden" id="sta_sel" name="sta_sel"  value="<?php echo $sta_sel; ?>">
																			<input type="hidden" id="sch_cashgold" name="sch_cashgold"  value="<?php echo $sch_cashgold; ?>">



																			<ul class="pagination " style="float:right;" >
																			<!-- If the current page is more than 1, show the First and Previous links -->
																			<?php if($paging_info['curr_page'] > 1) : ?>
																			
																			<li class='paginate_button page-item move_to' value="<?php echo ($paging_info['curr_page'] - 1); ?>" > <a aria-controls='kt_roles_view_table' data-dt-idx='1' tabindex='0' class='page-link cursor-pointer'  title='Page <?php echo ($paging_info['curr_page'] - 1); ?>'><</a></li>
																			
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

																			<li class='paginate_button page-item move_to' value="1" ><a aria-controls='kt_roles_view_table' data-dt-idx='1' tabindex='0' class='page-link cursor-pointer' onclick="form_submit()"  title='Page 1'>1</a></li>
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

																					<li class='paginate_button page-item active move_to' value="<?php echo $i; ?>"> <a aria-controls='kt_roles_view_table' data-dt-idx='1' tabindex='0' onclick="form_submit()" class='page-link cursor-pointer text-hover-dark'  
																					title='Page <?php echo $i; ?>'><?php echo $i; ?></a></li>

																				<?php else : ?>

																				<li class='paginate_button page-item move_to ' value="<?php echo $i; ?>"> <a aria-controls='kt_roles_view_table' data-dt-idx='1' tabindex='0' onclick="form_submit()" class='page-link cursor-pointer'  title='Page <?php echo $i; ?>'><?php echo $i; ?></a></li>

																				<?php endif; ?>

																			<?php endfor; ?>
																			<!-- If the current page is less than say the last page minus $max pages divided by 2-->
																			<?php if($paging_info['curr_page'] < ($paging_info['pages'] - floor($max / 2))) : ?>

																				..
																				<li class='paginate_button page-item  move_to' value="<?php echo $paging_info['pages']; ?>"><a  aria-controls='kt_roles_view_table' data-dt-idx='1' tabindex='0' onclick="submit()" class='page-link cursor-pointer'   title='Page <?php echo $paging_info['pages']; ?>'><?php echo $paging_info['pages']; ?></a></li>

																			<?php endif; ?>

																			<!-- Show last two pages if we're not near them -->
																			<?php if($paging_info['curr_page'] < $paging_info['pages']) : ?>

																				<li class='paginate_button page-item move_to ' value="<?php echo ($paging_info['curr_page'] + 1); ?>">  <a aria-controls='kt_roles_view_table' data-dt-idx='1' tabindex='0' onclick="submit()" class='page-link cursor-pointer'  title='Page <?php echo ($paging_info['curr_page'] + 1); ?>'>></a></li>

																			

																			<?php endif; ?>
																			</ul>
																			</form>
											
											<!--end::Table-->
										</div>
										<!--end::Card body-->
									</div>
									<!--end::Tables Widget 9-->
									<?php }}else{?><?php $this->load->view("common_role_permission_err"); ?><?php } ?>
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


		<div class="modal fade" id="kt_view_trans_details" tabindex="-1" aria-hidden="true">
		<!-- <form id="kt_add_product_form" class="form"> -->
				<!--begin::Modal dialog-->
				<div class="modal-dialog modal-xl">
					<!--begin::Modal content-->
					<div class="modal-content rounded">
						<!--begin::Modal header-->
						<div class="modal-header justify-content-end border-0 pb-0">
							<!--begin::Close-->
							<div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal" onclick="closeViewModal();">
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
								<h1 class="mb-3">Chit Details</h1>	
							</div>
							<!--end::Heading-->
							<table id="" class="table align-middle table-striped table-hover fs-7 gy-4 gs-2">
								<thead>
									<tr class="text-start text-muted fw-bold fs-7 gs-0">
										<th class="min-w-25px">Sno</th>
										<th class="min-w-25px">Date</th>
										<th class="min-w-100px">M.Points</th>
										<th class="min-w-100px">Scheme</th>
										<th class="min-w-100px">Type</th>
										<th class="min-w-100px">Payment Mode</th>
										<th class="min-w-100px">Open Balance</th>
										<th class="min-w-100px">Process Amount</th>
										<th class="min-w-100px">Closing Balance</th>
										<th class="min-w-100px">Status</th>
									</tr>
								</thead>
								<tbody class="text-gray-600 fw-semibold" id="transaction_list">
									
								</tbody>
							</table>
							<!--end::Actions-->
						</div>
						<!--end::Modal body-->
						 
					</div>
					<!--end::Modal content-->
				</div>
				<!--end::Modal dialog-->
			<!-- </form> -->
		</div>
		<?php $this->load->view("script");?>
		<input type="hidden" id="baseurl" value="<?php echo base_url(); ?>">
		<!-- Export Script::Start -->
		<script>
				$(document).ready(function(){
					$('#submit_export').click(function(){
						// alert(1)
					$('#list_export1').submit();
					});
				});
		</script>
		<script>
			function reset_fill(){

				$('#dt_fill_sales_list').val('');
				$('#scheme_sel').val('');
				$('#sch_cashgold').val('');
				$('#sta_sel').val('');
				$('#fill_form').submit();

			}

		</script>
		<!-- Export Script::End -->
		<!-- <script src="js/products-list.js"></script> -->
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
	      $("#chit_trans_table").kendoTooltip({
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
	      });
	    </script>
		<!-- Sales list day fillter start -->
		<script>
			schtype()
			function schtype()
			{
				var scheme_sel = document.getElementById("scheme_sel").value;
				var cash_gold = document.getElementById('cash_gold');
				// alert(scheme_sel);
				if(scheme_sel == '2')
				{
					// alert(2);
					cash_gold.style.display="block";
					
				}
				else
				{
					// alert(1);
					cash_gold.style.display="none";
					$('#sch_cashgold').val(1);
				}
			}
		</script>
		<script>
			function view(val)
			{
				// alert(val);
		// alert(val);
				var baseurl= $("#baseurl").val();
				// var str = val.replace('_','/');
				
				
				$.ajax({
				type: "GET",
				url: baseurl+'Chit/chit_transaction_modal',
				async: false,
				type: "GET",
				data: "party_id="+val,
				dataType: "json",
				success: function(response)
				// alert(data);
				// console.log(response)
				{
					var list= ''
					// var type= ''
					// var count= 0
					// var nt_wt_tot= 0

					if(response.length > 0){

						response.map((data,i)=>{

							$scheme = '';
							if(response[i].scheme_type==1)
							{
								$scheme = "Cash";
							}
							else if(response[i].scheme_type==2)
							{
								$scheme = "Cash";
							}
							else if(response[i].scheme_type==3)
							{
								$scheme = "Gold";
							}

							$status = '';

							if(response[i].transaction_type==2)
							{
								$status = "<span style='background-color:lightblue;border-radius: 8px;padding: 5px 15px 5px 15px; '>Withdraw</span>"; 
							}
							else if(response[i].transaction_type==1)
							{
								$status = "<span style='background-color:#5aad52;border-radius: 8px;padding: 5px 15px 5px 15px; '>Deposit</span>"; 
							}
							else{

							}

							// $collection = '';
							// if(response[i].collection_type==1)
							// {
							// 	$collection = "Daily";
							// }
							// else if(response[i].collection_type==2)
							// {
							// 	$collection = "Weekly";
							// }
							// else if(response[i].collection_type==3)
							// {
							// 	$collection = "Monthly";
							// }
						
							list += "<tr><td>"+[i+1]+"</td><td class='ple1'><p id='trans_date'>"+response[i].trans_date +"</p></td>	<td><p id='MEMBERSHIP_POINTS'>"+response[i].MEMBERSHIP_POINTS +"</p></td><td><p id='scheme_id'>"+response[i].scheme_id +"</p></td><td><p id='type'>"+$scheme+"</p></td>	<td><p id='type_of_payment'>"+response[i].type_of_payment +"</p></td><td><p id='opening_amount'>"+response[i].opening_amount+"<td><p id='processing_amount'>"+response[i].processing_amount +"</p></td>	<td><p id='closing_balance'>"+response[i].closing_balance +"</p></td><td><p id='closing_balance'>"+$status+"</p></td></tr>" 
							
							// type = response[i].JEWEL_TYPE
							// count += response[i].QTY
							// nt_wt_tot += parseFloat(response[i].NETWEIGHT)
							
						})

					}
					
					// for(var i=0; i < response.length; i++)
					// {
					// 	list += "<tr><td>"+response[0].BILLNO +"</td>	<td class='ple1'><p id='item'></p></td>	<td><p id='quality'></p></td><td><p id='purity'></p></td><td><p id='weight'></p></td>	<td><p id='less'></p></td>	<td><p id='nt_wt'></p></td>	<td><p id='img'></p></td>		<td>		<div class='image-input mt-2 me-6' data-kt-image-input='true'>	<div class='image-input-wrapper w-40px h-40px'style='background-image: url(assets/images/sample_jewel.jpg)'></div>	</div></td>		</tr>" 
						
					// }

					// console.log(scheme_id);

					$('#transaction_list').html(list)
					// alert(str);
					
					// $('#loan_no_upe').html(str)
					// $('#type').html(type)
					// $('#count').html(count)
					// $('#nt_wt_tot').html(nt_wt_tot)

					

				// $('#loan_no').html(response.BILLNO); 
				// $('#type').html(response.JEWEL_TYPE);
				// $('#count').html(response.QTY);
				// $('#nt_wt_tot').html(response.WEIGHT);
				// $('#item').html(response.PLEDGENAME,DESCRIPTION);
				// $('#quality').html(response.QUALITY);
				// $('#purity').html(response.PURITY);
				// $('#weight').html(response.WEIGHT);
				// $('#less').html(response.LESS);
				// $('#nt_wt').html(response.NETWEIGHT);
				// $('#img').html(response.ITEM_PHOTO);
				}
			});
			}
		</script>
		
		<script>

		$(document).ready(function() {
			
			$(".move_to").on("click", function () {
				value=$(this).val();
				// alert(value);
				$('#filter_form').attr('action', "<?php echo base_url(); ?>Chit/chit_transaction_history/<?php echo $party_id; ?>?page="+value);
				$("#filter_form").submit();
				e.preventDefault();
			});
		});
		</script>
		<script>
			function date_fill_sales_list()
			{
				var dt_fill_sales_list = document.getElementById('dt_fill_sales_list').value;
				var today_dt_sales_list = document.getElementById('today_dt_sales_list');
				var week_from_dt_sales_list = document.getElementById('week_from_dt_sales_list');
				var week_to_dt_sales_list = document.getElementById('week_to_dt_sales_list');
				var monthly_dt_sales_list = document.getElementById('monthly_dt_sales_list');
				var from_dt_sales_list = document.getElementById('from_dt_sales_list');
				var to_dt_sales_list = document.getElementById('to_dt_sales_list');
				var from_date_fillter_sales_list = document.getElementById('from_date_fillter_sales_list');
				var to_date_fillter_sales_list = document.getElementById('to_date_fillter_sales_list');

				if (dt_fill_sales_list == "today") 
				{
					today_dt_sales_list.style.display = "block";
					monthly_dt_sales_list.style.display = "none";
					from_dt_sales_list.style.display = "none";
					to_dt_sales_list.style.display = "none";
					week_from_dt_sales_list.style.display = "none";
					week_to_dt_sales_list.style.display = "none";
					$("#today_date_fillter_sales_list").flatpickr({
								dateFormat: "d-m-Y",
							});
				}
				else if (dt_fill_sales_list == "week")
				{
					today_dt_sales_list.style.display = "none";
					week_from_dt_sales_list.style.display = "block";
					week_to_dt_sales_list.style.display = "block";
					monthly_dt_sales_list.style.display = "none";
					from_dt_sales_list.style.display = "none";
					to_dt_sales_list.style.display = "none";

					var curr = new Date; // get current date
					var first = curr.getDate() - curr.getDay(); // First day is the day of the month - the day of the week
					var last = first + 6; // last day is the first day + 6

					var firstday = new Date(curr.setDate(first)).toISOString().slice(0,10);
					firstday = firstday.split("-").reverse().join("-");
					var lastday = new Date(curr.setDate(last)).toISOString().slice(0,10);
					lastday = lastday.split("-").reverse().join("-");
					$('#week_from_date_fillter_sales_list').val(firstday);
					$('#week_to_date_fillter_sales_list').val(lastday);
					
				}
				else if (dt_fill_sales_list == "monthly")
				{
					today_dt_sales_list.style.display = "none";
					monthly_dt_sales_list.style.display = "block";
					from_dt_sales_list.style.display = "none";
					to_dt_sales_list.style.display = "none";
					week_from_dt_sales_list.style.display = "none";
					week_to_dt_sales_list.style.display = "none";
					$("#monthly_date_fillter_sales_list").flatpickr({
								dateFormat: "m-Y",
							});
				}
				else if (dt_fill_sales_list == "custom Date")
				{
					today_dt_sales_list.style.display = "none";
					monthly_dt_sales_list.style.display = "none";
					from_dt_sales_list.style.display = "block";
					to_dt_sales_list.style.display = "block";
					week_from_dt_sales_list.style.display = "none";
					week_to_dt_sales_list.style.display = "none";

					$("#from_date_fillter_sales_list").flatpickr({
								dateFormat: "d-m-Y",
							});
					$("#to_date_fillter_sales_list").flatpickr({
								dateFormat: "d-m-Y",
							});
				}
				else
				{
					today_dt_sales_list.style.display = "none";
					monthly_dt_sales_list.style.display = "none";
					from_dt_sales_list.style.display = "none";
					to_dt_sales_list.style.display = "none";
					week_from_dt_sales_list.style.display = "none";
					week_to_dt_sales_list.style.display = "none";
				}
			}
		</script>
		<!-- Sales list day fillter end -->
		<script>
	      $("#view_chit_pyt_receive_frm_party").kendoTooltip({
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
	      });
	      $("#view_chit_pyt_receive_frm_party").kendoTooltip({
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
	      });
	    </script>
	    <script>
	      $("#view_ln_dels_to_pay_frm_cmy").kendoTooltip({
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
	      });
	      $("#view_ln_dels_to_pay_frm_cmy").kendoTooltip({
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
	      });
	    </script>
	</body>
	<!--end::Body-->
</html>

