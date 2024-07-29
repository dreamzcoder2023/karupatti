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
									<h1 class="d-flex align-items-center text-dark fw-bold my-1 fs-3">Pure Gold Wallet
									<!--begin::Separator-->
									<!--<span class="h-20px border-gray-400 border-start ms-3 mx-2"></span>-->
								<!--	<label class="d-flex align-items-center text-primary fw-bold my-1 fs-5">
										<span>Company &emsp;-</span>
										<span>&emsp;All</span>
									</label>-->
									<span class="h-20px border-gray-400 border-start ms-3 mx-2"></span>
									<label class="d-flex align-items-center text-primary fw-bold my-1 fs-5">
										<span>Type &emsp;-</span>
										<span>&emsp;<?php if($type_fillter==''){ echo "All"; }else{ echo $type_fillter; } ?></span>
									</label>
									<span class="h-20px border-gray-400 border-start ms-3 mx-2"></span>
									<label class="d-flex align-items-center text-primary fw-bold my-1 fs-5">
										<span>Jewel Type &emsp;-</span>
										<span>&emsp;<?php if($jewel_type_fillter==''){ echo "All"; }else{ 
											$item_type=$this->db->query("SELECT * FROM jewel_type WHERE jewel_type_id='".$jewel_type_fillter."'  ")->row();
											echo $item_type->jewel_type; } ?></span>
									</label>
									<span class="h-20px border-gray-400 border-start ms-3 mx-2"></span>
									<label class="d-flex align-items-center text-primary fw-bold my-1 fs-5">
										<span>Status &emsp;-</span>
										<span>&emsp;All</span>
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
												<div class="col-lg-8">
													<div class="row">
														<div class="col-lg-6">
															<div class="row">
																<label class="col-lg-4 form-label text-center fs-2 fw-bold">Gold</label>
																<div class="col-lg-8 text-center">
																	<label class="text-success fs-2 fw-bold">
																	<!-- <span class="me-3"> -->
																		<svg fill="#d4af37" width="30px" height="30px" viewBox="0 0 32 32" version="1.1" xmlns="http://www.w3.org/2000/svg">
																		<path d="M11.652 19.245l-0.001-0.001-0.005-0.003zM30.671 16.098l-2.207-5.839-8.022-4.361-16.624 8.861-2.431 6.495 9.8 5.214 0.161-7.067-7.624-4.353 0.654 0.346-0.373-0.215 1.332 0.708-1.212-0.708 7.526 4.065 16.205-8.376-2.594 1.424 3.037-1.551-6.011 3.183-10.434 5.727-0.668 6.816 19.484-10.371zM11.976 17.206l-4.389-2.342 4.269 1.32 13.070-5.8-12.95 6.822z"></path>
																		</svg>
																	<!-- </span> -->
																<?php if($pure_gold_wallet_gold->tot_weight==''){ echo "0"; }else{ echo $pure_gold_wallet_gold->tot_weight; } ?>(gms)</label>
																	<div>
																		<label class="text-success fs-2 fw-bold">
																			<span><i class="fas fa-list-ol fs-2"></i>&nbsp;</span>
																			<?php if($pure_gold_wallet_gold->tot_count==''){ echo "0"; }else{ echo $pure_gold_wallet_gold->tot_count; } ?></label>
																	</div>
																</div>
															</div>
														</div>
														<div class="col-lg-6">
															<div class="row">
																<label class="col-lg-4 form-label text-center fs-2 fw-bold">Silver</label>
																<div class="col-lg-8 text-center">
																	<label class="text-success text-center fs-2 fw-bold">
																		<!-- <span class="me-3"> -->
																			<svg fill="#C0C0C0" width="30px" height="30px" viewBox="0 0 32 32" version="1.1" xmlns="http://www.w3.org/2000/svg">
																			<path d="M11.652 19.245l-0.001-0.001-0.005-0.003zM30.671 16.098l-2.207-5.839-8.022-4.361-16.624 8.861-2.431 6.495 9.8 5.214 0.161-7.067-7.624-4.353 0.654 0.346-0.373-0.215 1.332 0.708-1.212-0.708 7.526 4.065 16.205-8.376-2.594 1.424 3.037-1.551-6.011 3.183-10.434 5.727-0.668 6.816 19.484-10.371zM11.976 17.206l-4.389-2.342 4.269 1.32 13.070-5.8-12.95 6.822z"></path>
																			</svg>
																		<!-- </span> -->
																		<?php if($pure_gold_wallet_silver->tot_weight==''){ echo "0"; }else{ echo $pure_gold_wallet_silver->tot_weight; } ?>(gms)</label>
																		<div class="text-center">
																			<label class="text-success fs-2 fw-bold">
																				<span><i class="fas fa-list-ol fs-2"></i>&nbsp;</span>
																				<?php if($pure_gold_wallet_silver->tot_count==''){ echo "0"; }else{ echo $pure_gold_wallet_silver->tot_count; } ?></label>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
												<div class="col-lg-4">
													<div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
														<!--begin::Filter-->
														<button type="button" class="btn btn-sm btn-outline btn-outline-solid btn-outline-warning btn-active-light-primary me-3" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
															Filter</button>
														<div class="menu menu-sub menu-sub-dropdown w-300px w-md-325px" data-kt-menu="true">
															<div class="px-7 py-5" data-kt-user-table-filter="form">
															<form action="<?php echo base_url(); ?>Old_gold/pure_gold_wallet" method="post">
																<!--<div class="mb-2">
																	<label class="form-label fs-6 fw-semibold">Company</label>
																	<select class="form-select form-select-solid" data-control="select2" data-close-on-select="true" data-allow-clear="true" multiple="multiple" >
																		<option value="all" selected>All</option>
																		<option value="1">AGB Main Branch Sayalkudi</option>
																		<option value="2">AGB Pernali Branch</option>
																	</select>
																</div>-->
																<div class="mb-2">
																	<label class="form-label fs-6 fw-semibold">Type</label>
																	<select class="form-select form-select-solid fw-semibold" data-control="select2" data-close-on-select="true" data-allow-clear="true" multiple="multiple" id="type_fillter" name="type_fillter">	
																		<option value="" selected>All</option>
																		<option value="">Tag</option>
																		<option value="">Non Tag</option>
																		<option value="Old Gold Lot">Old Gold Lot</option>
																		<option value="">Purchase</option>
																	</select>
																</div>
																<div class="mb-2">
																	<label class="form-label fs-6 fw-semibold">Jewel Type</label>
																	<select class="form-select form-select-solid fw-semibold" data-control="select2" data-close-on-select="true" data-allow-clear="true" multiple="multiple" id="jewel_type_fillter" name="jewel_type_fillter">	
																		<option value="" selected>All</option>
																		<option value="1">Gold</option>
																		<option value="2">Silver</option>
																	</select>
																</div>
																<div class="mb-2">
																	<label class="form-label fs-6 fw-semibold">Status</label>
																	<select class="form-select form-select-solid fw-semibold" data-control="select2" data-close-on-select="true" data-allow-clear="true" multiple="multiple"   id="status_fillter" name="status_fillter">	
																		<option value="" selected>All</option>
																		<option value="1">In</option>
																		<option value="2">Out</option>
																	</select>
																</div>
																<div class="mb-2">
																	<label class="form-label">Date</label>
																	<select class="form-select form-select-solid" data-control="select2" data-hide-search="true" id="dt_fill_pure_gold_stock_list" name="dt_fill_pure_gold_stock_list" onchange="date_fill_pure_gold_stock_list();">	
																		<option value="">All</option>
																		<option value="today" <?php if($dt_fill=="today"){ echo "selected"; } ?>>Today</option>
																			<option value="week" <?php if($dt_fill=="week"){ echo "selected"; } ?>>This Week</option>
																			<option value="monthly" <?php if($dt_fill=="monthly"){ echo "selected"; } ?>>This Month</option>
																			<option value="custom Date" <?php if($dt_fill=="custom Date"){ echo "selected"; } ?>>Custom Date</option>
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
																		<input class="form-control form-control-solid ps-12" name="" placeholder="From Date" id="from_date_fillter_pure_gold_stock_list" name="from_date_fillter_pure_gold_stock_list" value="<?php echo date("d-m-Y"); ?>" />
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
																		<input class="form-control form-control-solid ps-12" name="" placeholder="To Date" id="to_date_fillter_pure_gold_stock_list" name="to_date_fillter_pure_gold_stock_list" value="<?php echo date("d-m-Y"); ?>"/>
																	</div>
																</div>
																<div class="d-flex justify-content-end">
																	<button type="reset" class="btn btn-light btn-active-light-primary fw-semibold me-2 px-6" data-kt-menu-dismiss="true" data-kt-user-table-filter="reset">Reset</button>
																	<button type="submit" class="btn btn-primary fw-semibold px-6" data-kt-menu-dismiss="true" data-kt-user-table-filter="filter">Apply</button>
																</div>
															</div>
															</form>
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
											<table  class="table align-middle table-row-dashed table-striped table-hover fs-7 gy-1 gs-2">
											    <thead>
											        <tr class="text-start text-muted fw-bold fs-7 gs-0">
											        	<th class="min-w-50px">Sno</th>
											        	<th class="min-w-50px">Date</th>
											        	<!--<th class="min-w-100px">Company</th>-->
											        	<th class="min-w-80px">Jewel Type</th>
											        	<th class="min-w-100px">Type</th>
											        	<th class="min-w-80px">Count</th>
											          <th class="min-w-100px">Net Weight(gms)</th>
											          <th class="min-w-100px">Status</th>
											          <th class="min-w-80px">Action</th>
											        </tr>
											    </thead>
											    <tbody class="text-gray-600 fw-semibold">
												<?php $i=1; foreach($pure_gold_wallet as $plist){ ?>
											        <tr>
											        	<td><?php echo $i; ?></td>
											        	<td><?php 
														 $date_format  = $this->db->query("SELECT * FROM general_settings  ")->row();
														 $format= $date_format->date_format;
														 echo date("$format", strtotime($plist['date']));
														// echo $plist['date']; ?></td>
											        <!--	<td>AGB - Main Branch Sayalkudi</td>-->
											        	<td><?php
															$item_type=$this->db->query("SELECT * FROM jewel_type WHERE jewel_type_id='".$plist['jewel_type']."'  ")->row();
															//echo $item_type->jewel_type;
														// echo $plist['jewel_type']; ?></td>
											            <td><?php echo $plist['type']; ?></td>
											            <td><?php echo $plist['count']; ?></td>
											            <td><?php echo $plist['weight']; ?></td>
											            <td>
																		<!--<label class="col-form-label fw-semibold fs-7" name="" id=""><span style="background-color:#F95B5B;border-radius: 8px;padding: 5px 15px 5px 15px;">Out</span>
																		</label>-->
																		<label class="col-form-label fw-semibold fs-7" name="" id=""><span style="background-color:#B6BD4F;border-radius: 8px;padding: 5px 15px 5px 15px;">In</span>
																		</label>
																	</td>
											            <td>
																		<span class="text-end">
																			<a href="#" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm" data-bs-toggle="modal" data-bs-target="#kt_modal_view_pure_gold_wallet" onclick="pure_gold_wallet_view('<?php echo $plist['ref_no']; ?>')">
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
													<?php $i++; } ?>
											       
											    </tbody>
											</table>


											<?php 
										$coun = ceil( $count/10);
										$c_page = isset($_GET['page']) ? $_GET['page'] : 1;
									?>
									<?php $paging_info = get_paging_info1($count,10,$c_page); ?>

<form   method="POST" id="filter_form" action="" enctype="multipart/form-data" >
	
    <input type="hidden" id="dt_fill_pure_gold_stock_list" name="dt_fill_pure_gold_stock_list"  value="<?php echo $dt_fill; ?>">
    <input type="hidden" id="from_date_fillter_pure_gold_stock_list" name="from_date_fillter_pure_gold_stock_list" value="<?php echo $from_date_fillter; ?>">
	<input type="hidden" id="to_date_fillter_pure_gold_stock_list" name="to_date_fillter_pure_gold_stock_list" value="<?php echo $to_date_fillter; ?>">
	<input type="hidden" id="type_fillter" name="type_fillter"  value="<?php echo $type_fillter; ?>">
	<input type="hidden" id="jewel_type_fillter" name="jewel_type_fillter"  value="<?php echo $jewel_type_fillter; ?>">
	


                                  

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
		<div class="modal fade" id="kt_modal_view_pure_gold_wallet" tabindex="-1" aria-hidden="true">
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
							<h1>View Pure Gold Wallet</h1> 
						</div>
						<div class="row">
							<div class="col-lg-2">
								<label class="col-form-label fw-semibold fs-6">Date &nbsp;</label>
								<label class="col-form-label fw-bold fs-5" id="view_date" name="view_date"> <?php echo date("d-m-Y"); ?></label>
							</div>
							<label class="col-lg-1 col-form-label fw-semibold fs-6">Company</label>
							<label class="col-lg-3 col-form-label fw-bold fs-5" id="view_company" name="view_company"> - </label>
							<div class="col-lg-3">
								<label class="col-form-label fw-semibold fs-6">Type &nbsp;&nbsp;</label>
								<label class="col-form-label fw-bold fs-5" id="view_type" name="view_type">Old Gold Lot</label>
							</div>
							<div class="col-lg-3">
								<label class="col-form-label fw-semibold fs-6">Jewel Type &nbsp;</label>
								<label class="col-form-label fw-bold fs-5" id="view_jewel_ttype" name="view_jewel_type"> Gold</label>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-2">
								<label class="col-form-label fw-semibold fs-6">Total No of Item &nbsp;&nbsp;</label>
								<label class="col-form-label fw-bold fs-5" id="view_count" name="view_count">0</label>
							</div>
							<div class="col-lg-3">
								<label class="col-form-label fw-semibold fs-6">Total Net Wgt(gms) &emsp;</label>
								<label class="col-form-label fw-bold fs-5" id="view_weight" name="view_weigth">0.00</label>
							</div>
							<div class="col-lg-4">
								<label class="col-form-label fw-semibold fs-6">After Melt Net Weight(gms) &emsp;&emsp;</label>
								<label class="col-form-label fw-bold fs-5" id="view_after_melt_weight" name="view_after_melt_weight">0.000</label>
							</div>
							<div class="col-lg-2">
								<label class="col-form-label fw-semibold fs-6">Less &nbsp;</label>
								<label class="col-form-label fw-bold fs-5" id="view_less" name="view_less">0.00</label>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-3">
								<label class="col-form-label fw-semibold fs-6">Based on Purity(%) &emsp;</label>
								<label class="col-form-label fw-bold fs-5" id="view_purity" name="view_purity">0.00</label>
							</div>
							<div class="col-lg-3">
								<label class="col-form-label fw-semibold fs-6">Pure Metal Wgt(gms) &emsp;</label>
								<label class="col-form-label fw-bold fs-5" id="view_metal_weight" name="view_metal_weight">0.00</label>
							</div>
							<!-- <div class="col-lg-4">
								<label class="col-form-label fw-semibold fs-6">Based on Pure Mt.Wgt(gms) &emsp;</label>
								<label class="col-form-label fw-bold fs-5" >0.000</label>
							</div> -->
							<!-- <div class="col-lg-2">
								<label class="col-form-label fw-semibold fs-6">Purity(%) &emsp;</label>
								<label class="col-form-label fw-bold fs-5">0.00</label>
							</div> -->
							<div class="col-lg-3">
								<label class="col-form-label fw-semibold fs-6">Pure Metal Purity(%) &emsp;</label>
								<label class="col-form-label fw-bold fs-5" id="view_pure_metal_purity" name="view_pure_metal_purity">0.00</label>
							</div>
							<div class="col-lg-3">
								<label class="col-form-label fw-semibold fs-6">Actual Pure(gms) &emsp;</label>
								<label class="col-form-label fw-bold fs-5" id="view_actual_pure" name="view_actual_pure">0.000</label>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-3">
								<label class="col-form-label fw-semibold fs-6">Converter &emsp;</label>
								<label class="col-form-label fw-bold fs-5" name="view_converter" id="view_converter">-</label>
							</div>
							<div class="col-lg-1 fv-row" id="view_image" name="view_image">
								<div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url(assets/images/Document.jpg)">
										<div class="image-input-wrapper w-80px h-80px" style="background-image: url(assets/images/Document.jpg)">
										 </div>
								</div>
							</div>
						</div>
						<div class="row mt-4">
							<table id="view_pure_gold_wallet_table" class="table align-middle table-row-dashed table-striped table-hover fs-7 gy-1 gs-2 dataTable">
									<thead>
									   <tr class="text-start text-muted fw-bold fs-7 gs-0">
									   		<th class="min-w-50px">SNo</th>
									   		<th class="min-w-80px">Date</th>
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
									<tbody class="text-gray-600 fw-semibold" id="view_table_rows" name="view_table_rows">
										<!--<tr>
								            <td>1</td>
								            <td>12-02-2022</td>
								            <td>OGLT-0001</td>
								            <td>
								            	<a href="javascript:;" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm">
									            	<div class="image-input" data-kt-image-input="true">
														<div class="image-input-wrapper w-40px h-40px" style="background-image: url(assets/images/sample_jewel.jpg)"></div>
													</div>
												</a>
								            </td>
								            <td>Chain</td>
								            <td>Hand Chain</td>
								            <td>3.200</td>
								            <td>0.200</td>
								            <td>0.200</td>
								            <td>3.600</td>
								        </tr>
										<tr>
								            <td>2</td>
								            <td>10-02-2022</td>
								            <td>OGLT-0002</td>
								            <td>
								            	<a href="javascript:;" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm">
									            	<div class="image-input" data-kt-image-input="true">
														<div class="image-input-wrapper w-40px h-40px" style="background-image: url(assets/images/sample_jewel.jpg)"></div>
													</div>
												</a>
											</td>
								            <td>Chain</td>
								            <td>Hand Chain</td>
								            <td>4.200</td>
								            <td>0.200</td>
								            <td>0.200</td>
								            <td>4.600</td>
								        </tr>
								        <tr>
								            <td>3</td>
								            <td>12-01-2023</td>
								            <td>OGLT-0003</td>
								            <td>
								            	<a href="javascript:;" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm">
									            	<div class="image-input" data-kt-image-input="true">
														<div class="image-input-wrapper w-40px h-40px" style="background-image: url(assets/images/sample_jewel.jpg)"></div>
													</div>
												</a>
								            </td>
								            <td>Valayal</td>
								            <td>Stone Valayal</td>
								            <td>4.300</td>
								            <td>0.200</td>
								            <td>0.200</td>
								            <td>4.700</td>
								        </tr>
								        <tr>
								            <td>4</td>
								            <td>25-06-2022</td>
								            <td>OGLT-0004</td>
								            <td>
								            	<a href="javascript:;" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm">
									            	<div class="image-input" data-kt-image-input="true">
														<div class="image-input-wrapper w-40px h-40px" style="background-image: url(assets/images/sample_jewel.jpg)"></div>
													</div>
												</a>
								            </td>
								            <td>Chain</td>
								            <td>Hand Chain</td>
								            <td>3.500</td>
								            <td>0.300</td>
								            <td>0.100</td>
								            <td>3.900</td>
								        </tr>
								        <tr>
								            <td>5</td>
								            <td>06-06-2022</td>
								            <td>OGLT-0005</td>
								            <td>
								            	<a href="javascript:;" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm">
									            	<div class="image-input" data-kt-image-input="true">
														<div class="image-input-wrapper w-40px h-40px" style="background-image: url(assets/images/sample_jewel.jpg)"></div>
													</div>
												</a>
								            </td>
								            <td>Chain</td>
								            <td>Hand Chain</td>
								            <td>4.400</td>
								            <td>0.200</td>
								            <td>0.200</td>
								            <td>4.800</td>
								        </tr>-->
									</tbody>
							</table>
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
		
		<script>

$(document).ready(function() {
	
	$(".move_to").on("click", function () {
		value=$(this).val();
		// alert(value);
		$('#filter_form').attr('action', "<?php echo base_url(); ?>Old_gold/pure_gold_wallet?page="+value);
		$("#filter_form").submit();
		e.preventDefault();
	});
});
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
		<script>
		function pure_gold_wallet_view(val){
			var baseurl= $("#baseurl").val();
				 
				$.ajax({
				type: "POST",
				url: baseurl+'Old_gold/pure_gold_wallet_view',
				async: false,
				type: "POST",
				data: "id="+val,
				dataType: "html",
				success: function(response)
				{
					// alert(response);
					 res=response.split('||');
					 $('#view_date').html(res[1]);
					 $('#view_type').html(res[2]);
					 $('#view_jewel_type').html(res[3]);
					$('#view_count').html(res[4]);
					$('#view_weight').html(res[5]);
					$('#view_after_melt_weight').html(res[6]);
					$('#view_less').html(res[7]);
					$('#view_purity').html(res[8]);
					$('#view_metal_weight').html(res[9]);
					$('#view_pure_metal_purity').html(res[10]);
					$('#view_actual_pure').html(res[11]);
					$('#view_converter').html(res[12]);
					$('#view_img').html(res[13]);
					$('#view_table_rows').empty().append(res[14]);
					
					
				// alert(res[6]);
			
				}
			});

		}
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