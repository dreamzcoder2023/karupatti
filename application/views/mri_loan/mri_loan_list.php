
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
									<h1 class="d-flex align-items-center text-dark fw-bold my-1 fs-3">MRI Loan List
									<!--begin::Separator-->
									<span class="h-20px border-gray-400 border-start ms-3 mx-2"></span>
									<label class="d-flex align-items-center text-primary fw-bold my-1 fs-5">
										<span>Company &emsp;-</span>
										
											
											 <span>&emsp;<?php if($company_filter==''){ echo "All"; }else{ echo $get_cmp_name_fill->COMPANYNAME; } ?>

										
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
										<!--begin::Card body-->
										<div class="card-body py-4">
											<div class="row">
												<div class="col-lg-8">
													<div class="row">
														<label class="col-lg-4 form-label text-center fs-4 fw-bold">Total Loans</label>
														<label class="col-lg-4 form-label text-center fs-4 fw-bold">Total Loan Amount</label>
													 <label class="col-lg-4 form-label text-center fs-4 fw-bold">Total Received Amount</label> 
													</div>
													<div class="row">
														<label class="col-lg-4 text-success text-center fs-2 fw-bold"><?php echo $loan_counts ; ?></label>
														<label class="col-lg-4 text-success text-center fs-2 fw-bold"><?php
														$sum=0; $other_charges=0;
														foreach ($loan_list as  $value) {
															$sum+=$value['AMOUNT'];
															// $other_charges+=$value['DCAMOUNT']+$value['PROCESSING_CHARGE']+$value['HL_AMOUNT'];
														}
														 echo "Rs. ".number_format($sum,2,'.',',');?></label>
														 <label class="col-lg-4 text-success text-center fs-2 fw-bold"><?php
														$sum=0; $other_charges=0;
														foreach ($loan_list as  $value) {
															$sum+=$value['MRI_AMOUNT'];
															
														}
														 echo "Rs. ".number_format($sum,2,'.',',');?></label>


														<!-- <label class="col-lg-4 text-success text-center fs-2 fw-bold"><?php echo "Rs. ".number_format($other_charges,2,'.',',') ?></label> -->
													</div>
												</div>
												<div class="col-lg-4">
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
															<form action="<?php echo base_url();?>Mri_loan" method="POST" >
															<div class="px-7 py-5" data-kt-user-table-filter="form">
																<div class="mb-2">
																	<label class="form-label fs-6 fw-semibold">Company</label>
																	<select class="form-select form-select-solid fw-semibold" data-control="select2" data-hide-search="true" name="company_filter" id="company_filter">	
																		<option value="" selected>All</option>
																		<?php 
																		foreach ($company_list as $clist) {
																		?>
																		<!-- <?php echo ($clist['COMPANYCODE']==$_SESSION['company_filter'])?'selected':''; ?> -->

																		<option value="<?php echo $clist['COMPANYCODE'];?>" 

																			> <?php echo $clist['COMPANYNAME'];?></option>

																		<?php
																		}
																		?>
																	</select>
																</div>
																
																<div class="mb-2">
																	<label class="form-label">Date</label>
																	<select class="form-select form-select-solid" data-control="select2" data-hide-search="true" name="dt_fill_loan_list" id="dt_fill_loan_list" onchange="date_fill_loan_list();">	
																		<option value="" selected>All</option>
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
																		<input class="form-control form-control-solid ps-12" name="from_date_fillter_loan_list" placeholder="From Date" id="from_date_fillter_loan_list" value="<?php echo ($from_date_fillter!='')?$from_date_fillter: date('d-m-Y'); ?>" />
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
																		<input class="form-control form-control-solid ps-12" name="to_date_fillter_loan_list" placeholder="To Date" id="to_date_fillter_loan_list" value="<?php echo ($to_date_fillter!='')?$to_date_fillter: date('d-m-Y'); ?>"/>
																	</div>
																</div>
																<div class="d-flex justify-content-end">
																	<button type="reset" class="btn btn-light btn-active-light-primary fw-semibold me-2 px-6" data-kt-menu-dismiss="true" data-kt-user-table-filter="reset">Reset</button>
																	<button type="submit" class="btn btn-primary fw-semibold px-6" data-kt-menu-dismiss="true" data-kt-user-table-filter="filter">Apply</button>
																</div>
															</div>
															</form>
														</div>
														<button type="button" class="btn btn-sm btn-outline btn-outline-solid btn-outline-warning btn-active-light-primary me-3" data-bs-toggle="modal" data-bs-target="#">Export</button>

														<a href="<?php echo base_url();?>Mri_loan/mri_loan_add" target="_blank">
															<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#">
															<span class="svg-icon svg-icon-2">
																<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																	<rect opacity="0.5" x="11.364" y="20.364" width="16" height="2" rx="1" transform="rotate(-90 11.364 20.364)" fill="currentColor" />
																	<rect x="4.36396" y="11.364" width="16" height="2" rx="1" fill="currentColor" />
																</svg>
															</span>New MRI Loan</button>
														</a>
													</div>
													
												</div>
											</div>
											<!--begin::Table-->
											<table class="table align-middle table-row-dashed table-striped table-hover fs-7 gy-1 gs-2" id="kt_datatable_dom_positioning1">
												<!--begin::Table head-->
												<thead>
													<!--begin::Table row-->
													<tr class="text-start text-muted fw-bold fs-7 gs-0">
														<th class="min-w-25px" style="display:none;">Sno</th>
														<th class="min-w-25px">Date</th>
														<th class="min-w-100px">Bill No</th>
														<th class="min-w-100px">CCL No</th>
														<th class="min-w-25px" style="display:none;">Expiry Date</th>
														<th class="min-w-100px" style="display:none;">Party Info</th>
														<th class="min-w-80px">Party Info </th>
														<th class="min-w-25px">Scheme - Int </th>
														<th class="min-w-100px">Old Bill No </th>
														

														<!-- <th class="min-w-25px">No of Item</th> -->
														<th class="min-w-25px">MRI Loan Amt</th>
														<th class="min-w-25px">MRI Received Amt</th>
														<th class="min-w-25px">Status</th>
														
														<th class="min-w-100px"><span class="text-end">Actions</span></th>
													</tr>
													<!--end::Table row-->
												</thead>

												<!--end::Table head-->
												<!--begin::Table body-->
												<tbody class="text-gray-600 fw-semibold">

													<?php 
													$i=1;
														foreach ($loan_list as $llist) {
															
													?>
													<tr>
														<td style="display:none;"><?php echo $i; ?></td>
														<td><?php echo date_format(date_create($llist['ENDATE']),$_SESSION['DATE_PATTERN']);?></td> 
															<td class="ple1"><?php echo $llist['BILLNO'];?></td>
														<td>
															<?php if(isset($llist['CCL_BILLNO']))
															{
															echo $llist['CCL_BILLNO'];
															
															}
															else
															{
																echo '';
															} ?>
														</td> 
													
														<td style="display:none;"><?php 
														if($llist['MONTHS']>12)
														{
															echo $llist['MONTHS']." Days";
														}
														else
														{
															$ex_dt= strtotime("+".$llist['MONTHS']." month", strtotime($llist['ENDATE']));
															$e_dt= date('Y-m-d',$ex_dt);
															echo  date_format(date_create($e_dt),$_SESSION['DATE_PATTERN']);
															// echo $ex_dt;
														}
															;?></td>
														
													    <td class="ple1">
															<span><i class="fa-solid fa-star fs-7" style="<?php if($llist['RATING']==3) echo 'color:#50cd89;';
															if($llist['RATING']==2) echo 'color:#ffc700;';
															if($llist['RATING']==1) echo 'color:red;';
															if($llist['RATING']=='' || is_null($llist['RATING'])) echo 'color:#d2d4dc;';

															?>"></i></span>
															<span class="align-items-center"><?php echo $llist['NAME'];?></span>
														</td> 
														<td><?php echo $llist['INTERESTTYPE'];?></td>
														<td style="display:none;"><?php echo $llist['JEWEL_TYPE'];?></td>
														<td>
															<?php if(isset($llist['OLD_BILLNO']))
															{
																echo $llist['OLD_BILLNO'];
															
															}
															else
															{
																echo '';
															} ?>
														</td>
														
														
														<!-- <td>
															<?php 
																$ple=$this->db->query("SELECT * FROM PLEDGEINFO WHERE BILLNO='".$llist['BILLNO']."'")->result_array();
																$count = count((array)$ple);
																echo $count;
																?>
															
														</td>  -->

														<td class="ple1">
															<?php echo number_format($llist['AMOUNT'],2,'.',',');?>
														</td>
														<td><?php echo number_format($llist['MRI_AMOUNT'],2,'.',',');?></td>
														
														<td>
															<?php 
															if($llist['CLOSING_TYPE']!='CUSTOMER_TRANSFER' && $llist['CLOSING_TYPE']!=''){
																	?>  
																	<span style="background-color:red;color: white;border-radius: 8px;padding: 5px 15px 5px 15px;">Closed</span>
																	<?php
																		
																	}
															else{
																?>
																	<span style="background-color:#50cd89;border-radius: 8px;padding: 5px 15px 5px 15px;">Active</span>
																<?php


															}
															?>
															
														</td>
														<!--begin::Action=-->
														<td>
															<span class="text-end">
																<a href="" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm" data-bs-toggle="modal" data-bs-target="#kt_modal_viewloan" onclick="loan_view('<?php echo $llist['BILLNO']; ?>')">
																	<i class="bi bi-eye-fill eyc"></i>
																</a>
																<?php

															
																

																 $str=str_replace("/", "_", $llist['BILLNO']);
																?>
																<a href="<?php echo base_url();?>mri_loan/mri_redemption/<?php echo $str; ?>" target="_blank" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm">
																	<i class="fa-solid fa-shuffle eyc"></i>
																</a>
															</span>

														</td>
													</tr>
													<?php 
														$i++;
														}
													?>
												
												</tbody>
												<!--end::Table body-->
											</table>
									    	<!--end::Table-->
									    	<?php 
												$coun = ceil( $loan_count/10);
												$c_page = isset($_GET['page']) ? $_GET['page'] : 1;
											?>
											<?php $paging_info = get_paging_info1($loan_count,10,$c_page); ?>

														<form   method="POST" id="filter_form" action="" enctype="multipart/form-data" >
															
															

															<input type="hidden" id="dt_fill_loan_list" name="dt_fill_loan_list"  value="<?php echo $dt_fill; ?>">

															<input type="hidden" id="from_date_fillter_loan_list" name="from_date_fillter_loan_list" value="<?php echo $from_date_fillter; ?>">

															<input type="hidden" id="to_date_fillter_loan_list" name="to_date_fillter_loan_list" value="<?php echo $to_date_fillter; ?>">

															
															
															<input type="hidden" id="company_filter" name="company_filter"  value="<?php echo $company_filter; ?>">

															
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
	<!--begin::Modal - newloan-->
	<div class="modal fade" id="kt_modal_newloan" tabindex="-1" aria-hidden="true">
		<!-- <form id="kt_add_new_loan_list_form" class="form"> -->
			<!--begin::Modal dialog-->
			<div class="modal-dialog modal-xl-loan">
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
					<div class="modal-body pt-0 pb-15 px-5 px-xl-20">
						<!--begin::Heading-->
						<div class="mb-1 text-center">
							<h1 class="mb-3">New Loan</h1>
						</div>
						<!--end::Heading-->
						<div class="row d-flex justify-content-end">
							<div class="col-lg-2 fv-row fv-plugins-icon-container fv-plugins-bootstrap5-row-invalid">
								<div class="d-flex align-items-center">
									<label class="form-check form-check-inline form-check-solid me-5 is-invalid">
										<input class="form-check-input" name="" type="checkbox" value="1" id="search_bill_no" onclick="sch_bill_no();">
									</label>
									<span class="col-form-label fw-semibold fs-6">Search Bill No</span>
								</div>
							</div>
							<div class="col-lg-2 fv-row fv-plugins-icon-container">
								<input type="text" class="form-control form-control-lg1 form-control-solid" placeholder="Search Bill No" id="search_label_tbox" name="search_label_tbox" disabled>
								<div class="fv-plugins-message-container invalid-feedback"></div>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-6">
								<div style="padding:10px 10px 10px 10px !important;box-shadow: 0 3px 6px #00002947; border-radius: 5px; background-color: #f5f5f1 !important;">
									<div class="row">
										<label class="col-lg-2 col-form-label required fw-semibold fs-6">Name</label>
										<div class="col-lg-4 fv-row fv-plugins-icon-container">
											<input type="text" name="first_name" class="form-control form-control-lg1 form-control-solid" placeholder="Enter Party Name" id="first_name" oninput="this.value = this.value.replace(/[^A-Za-z. ]/g, '').replace(/(\..*)\./g, '$1');" value="Harish">
											<!-- <input type="hidden" name="first_name_id_hidden" id="first_name_id_hidden" value=""> -->
											<div class="fv-plugins-message-container invalid-feedback" id="party_name_err"></div>
										</div>
										<label class="col-lg-2 col-form-label fw-semibold fs-6 mt-3">Date</label>
										<div class="col-lg-4 fv-row">
											<div class="d-flex align-items-center">
												<span class="svg-icon position-absolute ms-4 svg-icon-2 dt">
													<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
														<path opacity="0.3" d="M21 22H3C2.4 22 2 21.6 2 21V5C2 4.4 2.4 4 3 4H21C21.6 4 22 4.4 22 5V21C22 21.6 21.6 22 21 22Z" fill="currentColor" />
														<path d="M6 6C5.4 6 5 5.6 5 5V3C5 2.4 5.4 2 6 2C6.6 2 7 2.4 7 3V5C7 5.6 6.6 6 6 6ZM11 5V3C11 2.4 10.6 2 10 2C9.4 2 9 2.4 9 3V5C9 5.6 9.4 6 10 6C10.6 6 11 5.6 11 5ZM15 5V3C15 2.4 14.6 2 14 2C13.4 2 13 2.4 13 3V5C13 5.6 13.4 6 14 6C14.6 6 15 5.6 15 5ZM19 5V3C19 2.4 18.6 2 18 2C17.4 2 17 2.4 17 3V5C17 5.6 17.4 6 18 6C18.6 6 19 5.6 19 5Z" fill="currentColor" />
														<path d="M8.8 13.1C9.2 13.1 9.5 13 9.7 12.8C9.9 12.6 10.1 12.3 10.1 11.9C10.1 11.6 10 11.3 9.8 11.1C9.6 10.9 9.3 10.8 9 10.8C8.8 10.8 8.59999 10.8 8.39999 10.9C8.19999 11 8.1 11.1 8 11.2C7.9 11.3 7.8 11.4 7.7 11.6C7.6 11.8 7.5 11.9 7.5 12.1C7.5 12.2 7.4 12.2 7.3 12.3C7.2 12.4 7.09999 12.4 6.89999 12.4C6.69999 12.4 6.6 12.3 6.5 12.2C6.4 12.1 6.3 11.9 6.3 11.7C6.3 11.5 6.4 11.3 6.5 11.1C6.6 10.9 6.8 10.7 7 10.5C7.2 10.3 7.49999 10.1 7.89999 10C8.29999 9.90003 8.60001 9.80003 9.10001 9.80003C9.50001 9.80003 9.80001 9.90003 10.1 10C10.4 10.1 10.7 10.3 10.9 10.4C11.1 10.5 11.3 10.8 11.4 11.1C11.5 11.4 11.6 11.6 11.6 11.9C11.6 12.3 11.5 12.6 11.3 12.9C11.1 13.2 10.9 13.5 10.6 13.7C10.9 13.9 11.2 14.1 11.4 14.3C11.6 14.5 11.8 14.7 11.9 15C12 15.3 12.1 15.5 12.1 15.8C12.1 16.2 12 16.5 11.9 16.8C11.8 17.1 11.5 17.4 11.3 17.7C11.1 18 10.7 18.2 10.3 18.3C9.9 18.4 9.5 18.5 9 18.5C8.5 18.5 8.1 18.4 7.7 18.2C7.3 18 7 17.8 6.8 17.6C6.6 17.4 6.4 17.1 6.3 16.8C6.2 16.5 6.10001 16.3 6.10001 16.1C6.10001 15.9 6.2 15.7 6.3 15.6C6.4 15.5 6.6 15.4 6.8 15.4C6.9 15.4 7.00001 15.4 7.10001 15.5C7.20001 15.6 7.3 15.6 7.3 15.7C7.5 16.2 7.7 16.6 8 16.9C8.3 17.2 8.6 17.3 9 17.3C9.2 17.3 9.5 17.2 9.7 17.1C9.9 17 10.1 16.8 10.3 16.6C10.5 16.4 10.5 16.1 10.5 15.8C10.5 15.3 10.4 15 10.1 14.7C9.80001 14.4 9.50001 14.3 9.10001 14.3C9.00001 14.3 8.9 14.3 8.7 14.3C8.5 14.3 8.39999 14.3 8.39999 14.3C8.19999 14.3 7.99999 14.2 7.89999 14.1C7.79999 14 7.7 13.8 7.7 13.7C7.7 13.5 7.79999 13.4 7.89999 13.2C7.99999 13 8.2 13 8.5 13H8.8V13.1ZM15.3 17.5V12.2C14.3 13 13.6 13.3 13.3 13.3C13.1 13.3 13 13.2 12.9 13.1C12.8 13 12.7 12.8 12.7 12.6C12.7 12.4 12.8 12.3 12.9 12.2C13 12.1 13.2 12 13.6 11.8C14.1 11.6 14.5 11.3 14.7 11.1C14.9 10.9 15.2 10.6 15.5 10.3C15.8 10 15.9 9.80003 15.9 9.70003C15.9 9.60003 16.1 9.60004 16.3 9.60004C16.5 9.60004 16.7 9.70003 16.8 9.80003C16.9 9.90003 17 10.2 17 10.5V17.2C17 18 16.7 18.4 16.2 18.4C16 18.4 15.8 18.3 15.6 18.2C15.4 18.1 15.3 17.8 15.3 17.5Z" fill="currentColor" />
													</svg>
												</span>
												<input class="form-control form-control-solid ps-12" name="kt_datepicker_new_loan_date" placeholder="Date" id="kt_datepicker_new_loan_date" value="<?php echo date("d-m-Y"); ?>"/>
											</div>
										</div>
									</div>
									<div class="row">
										<label class="col-lg-2 col-form-label fw-semibold fs-6">LastName</label>
										<label class="col-lg-4 col-form-label fw-bold fs-6" name="last_name" id="last_name">S/o, Gopalsamy</label>
										<label class="col-lg-2 col-form-label fw-semibold fs-6">Address</label>
										<label class="col-lg-4 col-form-label fw-bold fs-6" name="address" id="address">Church Street,Sayalkudi</label>
									</div>
									<div class="row">
										<label class="col-lg-2 col-form-label fw-semibold fs-6">Mobile</label>
										<div class="col-lg-4 fv-row fv-plugins-icon-container">
											<input type="text" name="mobile" class="form-control form-control-lg1 form-control-solid" id="mobile" oninput="this.value = this.value.replace(/[^0-9 ]/g, '').replace(/(\..*)\./g, '$1');" value="9895969895">
										</div>
										<label class="col-lg-2 col-form-label required fw-semibold fs-6">JewelType</label>
										<div class="col-lg-4 fv-row fv-plugins-icon-container">
											<select class="form-select form-select-solid" name="jewel_type" id="jewel_type" data-control="select2" data-hide-search="true">	
												<option value="">Select</option>
												<option value="GOLD" selected>Gold</option>		
												<option value="SILVER">Silver</option>
												<option value="STONE GOLD">Stonegold</option>
											</select>
										</div>
									</div>
								</div><br>
								<div style="padding:10px 10px 10px 10px !important;box-shadow: 0 3px 6px #00002947; border-radius: 5px; background-color: #f5f5f1 !important;">
									<div class="row">
										<label class="col-lg-2 col-form-label required fw-semibold fs-6">Scheme</label>
										<div class="col-lg-4 fv-row fv-plugins-icon-container">
											<select class="form-select form-select-solid" name="scheme_type" id="scheme_type" data-control="select2" data-hide-search="true">	
												<option value="">Select Scheme</option>
												<!-- <option value="0">TIP</option>
												<option value="1">MIP</option>				
												<option value="2">SIP</option>
												<option value="3">SL</option> -->
											</select>
										</div>
										<label class="col-lg-2 col-form-label required fw-semibold fs-6">Interest</label>
										<div class="col-lg-4 fv-row fv-plugins-icon-container">
											<select class="form-select form-select-solid" name="int_type" id="int_type" data-control="select2" data-hide-search="true">	
												<option value="">Select Interest</option>
												<!-- <option value="0.55">0.55</option>
												<option value="0.97">0.97</option>				
												<option value="1.47">1.47</option>
												<option value="1.97">1.97</option>
												<option value="2.47">2.47</option> -->
											</select>
										</div>
									</div>
									<div class="row">
										<label class="col-lg-2 col-form-label required fw-semibold fs-6">LoanType</label>
										<div class="col-lg-4 fv-row fv-plugins-icon-container">
											<select class="form-select form-select-solid" name="loan_type" id="loan_type" data-control="select2" data-hide-search="true">
												<option value="">Select</option>
												<option value="NEW" selected>New</option>
												<option value="RENEWAL">Renewal</option>				
												<option value="AUCTIONED">Auctioned</option>
											</select>
										</div>
										<label class="col-lg-2 col-form-label fw-semibold fs-6">Renewal</label>
										<div class="col-lg-4 fv-row fv-plugins-icon-container">
											<input type="text" name="renewal" id="renewal" class="form-control form-control-lg1 form-control-solid" placeholder="Renewal">
											<div class="fv-plugins-message-container invalid-feedback"></div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-lg-6">
								<div style="padding:10px 10px 5px 10px !important;box-shadow: 0 3px 6px #00002947; border-radius: 5px; background-color: #f5f5f1 !important;">
									<div class="row">
										<label class="col-lg-2 col-form-label fw-semibold fs-6">Company</label>
										<label class="col-lg-10 col-form-label fw-bold fs-6">AGB-MAIN BRANCH AYYANAR GOLD BANKERS SKD</label>
									</div>
									<div class="row">
										<label class="col-lg-2 col-form-label fw-semibold fs-6">Bill No</label>
										<label class="col-lg-6 col-form-label fw-bold fs-6" id="add_bill_no">TIP-254/22</label>
										<input type="hidden" name="bill_no" id="bill_no">

										<div class="col-lg-4">
											<button type="submit" class="btn btn-sm btn-outline btn-outline-solid btn-outline-warning btn-active-light-primary" onclick="gen_svg();">Generate 
												<span class="ms-3" id="svg_gen" style="visibility: hidden;">
													<svg xmlns:svg="http://www.w3.org/2000/svg" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.0" width="20px" height="20px" viewBox="0 0 128 128" xml:space="preserve"><g><path fill="#000000" d="M64,128a64,64,0,1,1,64-64A64,64,0,0,1,64,128ZM64,2.75A61.25,61.25,0,1,0,125.25,64,61.25,61.25,0,0,0,64,2.75Z"/><path fill="#000000" d="M64 128a64 64 0 1 1 64-64 64 64 0 0 1-64 64zM64 2.75A61.2 61.2 0 0 0 3.34 72.4c1.28-3.52 3.9-6.32 7.5-6.86 6.55-1 11.9 2.63 13.6 8.08 3.52 11.27.5 23 15 35.25 19.47 16.46 40.34 13.54 52.84 9.46A61.25 61.25 0 0 0 64 2.75z"/><animateTransform attributeName="transform" type="rotate" from="0 64 64" to="360 64 64" dur="1200ms" repeatCount="indefinite"></animateTransform></g></svg>
												</span>
											</button>		
											<!-- <button type="submit" class="btn btn-sm btn-outline btn-outline-solid btn-outline-warning btn-active-light-primary">Generate</button> -->
										</div>
									</div>
									<div class="row">
										<div class="col-lg-4 d-flex align-items-center mt-3">
											<div class="form-check form-check-custom">
												<input class="form-check-input2" type="radio" id="normal_loan" name="loan_radio" value="nor_ln_val" />
											</div>
											<div class="d-flex flex-column">
												<div class="fs-6 fw-semibold text-muted" style="padding-left: 10px;">Normal Loan</div>
											</div>
										</div>
										<div class="col-lg-3 d-flex align-items-center mt-3">
											<div class="form-check form-check-custom">
												<input class="form-check-input2" type="radio" id="hf_loan" name="loan_radio" value="hf_ln_val" />
											</div>
											<div class="d-flex flex-column">
												<div class="fs-6 fw-semibold text-muted" style="padding-left: 10px;">H/F Loan</div>
											</div>
										</div>
									</div><br>
									<div class="row mt-4">
										<div class="col-lg-4 fv-row party_image">
											<div class="image-input image-input-outline" data-kt-image-input="true">
												<div class="image-input-wrapper"></div>
												<label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" data-kt-initialized="1" title="Party">
													<i class="bi bi-pencil-fill fs-10"></i>
													<input type="file" name="add_party_new_loan" accept=".png, .jpg, .jpeg">
													<input type="hidden" name="add_party_remove_new_loan">
												</label>
												<span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" data-kt-initialized="1">
													<i class="bi bi-x fs-6"></i>
												</span>
												<span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" data-kt-initialized="1">
													<i class="bi bi-x fs-6"></i>
												</span>
											</div>
										</div>
										<div class="col-lg-4 fv-row">
											<div class="image-input image-input-outline" data-kt-image-input="true">
												<div class="image-input-wrapper"></div>
												<label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" data-kt-initialized="1" title="Jewel">
													<i class="bi bi-pencil-fill fs-10"></i>
													<input type="file" name="add_jewel_new_loan" accept=".png, .jpg, .jpeg">
													<input type="hidden" name="add_jewel_remove_new_loan">
												</label>
												<span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" data-kt-initialized="1">
													<i class="bi bi-x fs-6"></i>
												</span>
												<span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" data-kt-initialized="1">
													<i class="bi bi-x fs-6"></i>
												</span>
											</div>
										</div>
										<div class="col-lg-4 fv-row">
											<div class="image-input image-input-outline" data-kt-image-input="true">
												<div class="image-input-wrapper"></div>
												<label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" data-kt-initialized="1" title="Other">
													<i class="bi bi-pencil-fill fs-10"></i>
													<input type="file" name="add_others_new_loan" accept=".png, .jpg, .jpeg">
													<input type="hidden" name="add_other_remove_new_loan">
												</label>
												<span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" data-kt-initialized="1">
													<i class="bi bi-x fs-6"></i>
												</span>
												<span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" data-kt-initialized="1">
													<i class="bi bi-x fs-6"></i>
												</span>
											</div>
										</div>
									</div><br>
								</div>
							</div>
						</div><br>
						<div class="separator separator-content border-dark my-6"><span class="w-125px fw-bold fs-4">Pledge Items</span></div>
						<div style="padding:10px 10px 10px 10px !important;box-shadow: 0 3px 6px #00002947; border-radius: 5px; background-color: #f5f5f1 !important;">
							<div class="row">
								<div class="col-lg-3 fv-row fv-plugins-icon-container">
									<input type="text" name="pledge_item" id="pledge_item" class="form-control form-control-lg1 form-control-solid" placeholder="Select Pledge Name">
									<!-- <input type="hidden" name="pledge_item_name_hidden" id="pledge_item_id_hidden" value=""> -->
									<div class="fv-plugins-message-container invalid-feedback"></div>
								</div>
								<div class="col-lg-3 fv-row fv-plugins-icon-container">
									<input type="text" name="add_dname_new_loan" id="add_dname_new_loan" class="form-control form-control-lg1 form-control-solid" placeholder="Description">
									<div class="fv-plugins-message-container invalid-feedback"></div>
								</div>
								<div class="col-lg-2 fv-row fv-plugins-icon-container">
									<select class="form-select form-select-solid" data-control="select2" data-hide-search="true" name="add_ptyname_new_loan" id="add_ptyname_new_loan">
										<option value="">Select</option>
										<option value="916">916</option>
										<option value="NKM">Non KDM</option>				
										<option value="STG">Stone Gold</option>
										<option value="SILVER">Silver</option>
									</select>
								</div>
								<div class="col-lg-1 fv-row fv-plugins-icon-container">
									<input type="text" name="add_quliname_new_loan" id="add_quliname_new_loan" class="form-control form-control-lg1 form-control-solid" placeholder="Quantity">
									<div class="fv-plugins-message-container invalid-feedback"></div>
								</div>
								<div class="col-lg-1 fv-row fv-plugins-icon-container">
									<input type="text" name="add_pwei_new_loan" id="add_pwei_new_loan" class="form-control form-control-lg1 form-control-solid" placeholder="Weight">
									<div class="fv-plugins-message-container invalid-feedback"></div>
								</div>
								<div class="col-lg-1 py-1">		
									<button type="button" class="btn btn-sm btn-outline btn-outline-solid btn-outline-warning btn-active-light-primary mb-2">Add</button>
									<!-- <input type="hidden" name="add_pledge_item" id="add_pledge_item" value="0"> -->
								</div>
								<div class="col-lg-1 py-1">
									<button type="button" class="btn btn-sm btn-danger me-2 mb-2">
										<!-- <i class="la la-trash-o fs-3"></i> -->Del</button>
										<!-- <input type="hidden" name="delete_pledge_item" id="delete_pledge_item" value="0"> -->
								</div>
							</div>
						</div>
						<table class="table table-striped table-hover table-row-bordered fs-7 gy-1 gs-2" id="kt_datatable_dom_positioning_add_loan">
							<thead>
								<tr class="fw-semibold fs-6 text-gray-800">
						            <th class="min-w-100px">Pledge</th>
						            <th class="min-w-200px">Description</th>
						            <th class="min-w-100px">Purity</th>
						            <th class="min-w-100px">Quantity</th>
						            <th class="min-w-100px">Weight</th>
						            <th class="min-w-100px">Status</th>
						            <th class="min-w-100px">RP.No</th>
						            <th class="min-w-100px">Bank</th>
								</tr>
							</thead>
							<tbody id="tbody">
								<tr>
						            <td>Ladies Ring</td>
						            <td>Ring</td>
						            <td>KDM</td>
						            <td>1</td>
						            <td>16.800</td>
						            <td>Yes</td>
						            <td>E2126</td>
						            <td>SBI</td>
						        </tr>
						   		<tr>
						            <td>Ladies Ring</td>
						            <td>Ring</td>
						            <td>KDM</td>
						            <td>1</td>
						            <td>16.800</td>
						            <td>Yes</td>
						            <td>E2126</td>
						            <td>SBI</td>
						        </tr>
						  		<tr>
						            <td>Ladies Ring</td>
						            <td>Ring</td>
						            <td>KDM</td>
						            <td>1</td>
						            <td>16.800</td>
						            <td>Yes</td>
						            <td>E2126</td>
						            <td>SBI</td>
						        </tr>
						    </tbody>
						</table>	
						<div style="padding:10px 10px 10px 10px !important;box-shadow: 0 3px 6px #00002947; border-radius: 5px; background-color: #f5f5f1 !important;">
							<div class="row">
								<label class="col-lg-1 col-form-label required fw-semibold fs-6">Weight</label>
								<div class="col-lg-1 fv-row fv-plugins-icon-container">
									<input type="text" name="add_weight_new_loan" id="add_weight_new_loan" class="form-control form-control-lg1 form-control-solid" placeholder="Weight" value="2.400">
									<div class="fv-plugins-message-container invalid-feedback"></div>
								</div>
								<label class="col-lg-1 col-form-label required fw-semibold fs-6">Stoneless</label>
								<div class="col-lg-1 fv-row fv-plugins-icon-container">
									<input type="text" name="add_stless_new_loan" id="add_stless_new_loan" class="form-control form-control-lg1 form-control-solid" placeholder="St.less" value="0.200">
									<div class="fv-plugins-message-container invalid-feedback"></div>
								</div>
								<label class="col-lg-1 col-form-label required fw-semibold fs-6">Less</label>
								<div class="col-lg-1 fv-row fv-plugins-icon-container">
									<input type="text" name="add_less_new_loan" id="add_less_new_loan" class="form-control form-control-lg1 form-control-solid" placeholder="Less" value="0.200">
									<div class="fv-plugins-message-container invalid-feedback"></div>
								</div>
								<label class="col-lg-1 col-form-label required fw-semibold fs-6">Net.Wght</label>
								<div class="col-lg-1 fv-row fv-plugins-icon-container">
									<input type="text" name="add_ntweight_new_loan" id="add_ntweight_new_loan" class="form-control form-control-lg1 form-control-solid" placeholder="Nt.Wgt" style="font-size: 16px !important;font-weight: 600 !important;color: #000 !important;" value="2.000">
									<div class="fv-plugins-message-container invalid-feedback"></div>
								</div>
								<label class="col-lg-1 col-form-label required fw-semibold fs-6">CurrRate</label>
								<div class="col-lg-1 fv-row fv-plugins-icon-container">
									<input type="text" name="add_currate_new_loan" id="add_currate_new_loan" class="form-control form-control-lg1 form-control-solid" placeholder="Rate" value="4575.00">
									<div class="fv-plugins-message-container invalid-feedback" id="add_currate_new_loan_err"></div>
								</div>
								<label class="col-lg-1 col-form-label required fw-semibold fs-6">Quality%</label>
								<div class="col-lg-1 fv-row fv-plugins-icon-container">
									<input type="text" name="add_qual_new_loan" id="add_qual_new_loan" class="form-control form-control-lg1 form-control-solid" placeholder="Quality" value="91">
									<div class="fv-plugins-message-container invalid-feedback"></div>
								</div>
								<label class="col-lg-1 col-form-label required fw-semibold fs-6" id="gram_val">Gram.Val</label>
								<div class="col-lg-1 fv-row fv-plugins-icon-container" id="gram_val_tbox">
									<input type="text" name="add_gvalue_new_loan" id="add_gvalue_new_loan" class="form-control form-control-lg1 form-control-solid" placeholder="Value" value="0.00" value="2456">
									<div class="fv-plugins-message-container invalid-feedback"></div>
								</div>
								<label class="col-lg-1 col-form-label required fw-semibold fs-6" id="sale_rt">SalesRate</label>
								<div class="col-lg-1 fv-row fv-plugins-icon-container" id="sale_rt_tbox">
									<input type="text" name="add_slrate_new_loan" id="add_slrate_new_loan" class="form-control form-control-lg1 form-control-solid" placeholder="Rate" value="0.00" style="font-size: 16px !important;font-weight: 600 !important;color: #000 !important;" value="24758">
									<div class="fv-plugins-message-container invalid-feedback"></div>
								</div>
							</div>	
						</div><br>
						<div class="row">
							<div class="col-lg-4">		
								<div style="padding:10px 10px 10px 10px !important;box-shadow: 0 3px 6px #00002947; border-radius: 5px; background-color: #f5f5f1 !important;">
									<div class="row">
										<label class="col-lg-6 col-form-label required fw-semibold fs-6">Loan Amount</label>
										<div class="col-lg-6 fv-row fv-plugins-icon-container">
											<input type="text" name="add_lnamt_new_loan" id="add_lnamt_new_loan" class="form-control form-control-lg1 form-control-solid" style="font-size: 18px !important;font-weight: 700 !important;color: #1B439E !important;" value="1000">
											<div class="fv-plugins-message-container invalid-feedback"></div>
										</div>
									</div>
									<div class="row">
										<label class="col-lg-6 col-form-label fw-semibold fs-6">Loan period</label>
										<div class="col-lg-3 fv-row fv-plugins-icon-container">
											<input type="text" name="add_lnperiod_new_loan" id="add_lnperiod_new_loan" class="form-control form-control-lg1 form-control-solid" value="1" readonly>
											<div class="fv-plugins-message-container invalid-feedback"></div>
										</div>
										<label class="col-lg-3 col-form-label fw-semibold fs-6" id="loan_per_mon_days">Month</label>
									</div>
									<div class="row">
										<label class="col-lg-6 col-form-label fw-semibold fs-6" id="monthly_label">Monthly</label>
										<div class="col-lg-6 fv-row fv-plugins-icon-container" id="monthly_label_tbox">
											<input type="text" name="add_mont_new_loan" id="add_mont_new_loan" class="form-control form-control-lg2 form-control-solid" placeholder="Monthly Deposit" readonly value="50">
											<div class="fv-plugins-message-container invalid-feedback"></div>
										</div>
									</div>
									<div class="row">
										<label class="col-lg-6 col-form-label fw-semibold fs-6" id="tot_int_label" style="display: none;">Total Interest</label>
										<div class="col-lg-6 fv-row fv-plugins-icon-container" id="tot_int_label_tbox" style="display: none;">
											<input type="text" name="add_tot_int_new_hf_loan" id="add_tot_int_new_hf_loan" class="form-control form-control-lg2 form-control-solid" placeholder="Total Interest" readonly value="130">
											<div class="fv-plugins-message-container invalid-feedback"></div>
										</div>
									</div>
									<div class="row">
										<label class="col-lg-6 col-form-label fw-semibold fs-6" id="due_date_label" style="display: none;">Due Date</label>
										<div class="col-lg-6 fv-row" id="due_date_label_tbox" style="display: none;">
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
												<input class="form-control form-control-solid ps-12" name="kt_datepicker_new_hf_loan_due_date" placeholder="Due Date" id="kt_datepicker_new_hf_loan_due_date" disabled value="19-11-2022" />
											</div>
										</div>
									</div>
									<!-- <div class="row">
										<label class="col-lg-6 col-form-label fw-semibold fs-6">Advance Interest</label>
										<div class="col-lg-2 fv-row fv-plugins-icon-container">
											<input type="text" name="add_aint_new_loan" id="add_aint_new_loan" class="form-control form-control-lg1 form-control-solid" value="0">
											<div class="fv-plugins-message-container invalid-feedback"></div>
										</div>
										<div class="col-lg-4 fv-row fv-plugins-icon-container">
											<input type="text" class="form-control form-control-lg1 form-control-solid" name="add_aint_new_loan_1" id="add_aint_new_loan_1" value="0" readonly>
											<div class="fv-plugins-message-container invalid-feedback"></div>
										</div>
									</div> -->
								</div>
							</div>
							<div class="col-lg-4">
								<div style="padding:10px 10px 10px 10px !important;box-shadow: 0 3px 6px #00002947; border-radius: 5px; background-color: #f5f5f1 !important;">
									<div class="row">
										<label class="col-lg-6 col-form-label fw-semibold fs-6">Processing Charge</label>
										<div class="col-lg-6 fv-row fv-plugins-icon-container">
											<input type="text" name="processing_charge" id="processing_charge" class="form-control form-control-lg1 form-control-solid" placeholder="Processing Charge" value="0">
											<div class="fv-plugins-message-container invalid-feedback"></div>
										</div>
									</div>
									<div class="row">
										<label class="col-lg-6 col-form-label fw-semibold fs-6">Branch Adjustment</label>
										<div class="col-lg-6 fv-row fv-plugins-icon-container">
											<input type="text" name="branch_adj" id="branch_adj" class="form-control form-control-lg1 form-control-solid" style="font-size: 18px !important;font-weight: 700 !important;color: #1B439E !important;" value="50">
											<div class="fv-plugins-message-container invalid-feedback"></div>
											<!-- <input type="hidden" name="branch_adj_hidden" id="branch_adj_hidden"> -->
										</div>
									</div>
									<div class="row">
										<label class="col-lg-6 col-form-label fw-semibold fs-6">Credit Ledger</label>
										<div class="col-lg-6 fv-row fv-plugins-icon-container">
											<select class="form-select form-select-solid" name="credit_ledger" id="credit_ledger" data-control="select2" data-hide-search="true">	
												<option value="">Select</option>
												<option value="0" selected="selected">AGK ODE Loan Adjustment</option>
												<option value="1">AGM ODE Loan Adjustment</option>
												<option value="2">AGN ODE Loan Adjustment</option>
												<option value="3">AGP ODE Loan Adjustment</option>
												<option value="16">HO DAILY TRANSACTION</option>
											</select>
										</div>
									</div>
									<div class="row">
										<label class="col-lg-4 col-form-label fw-semibold fs-6">H/L Balance</label>
										<div class="col-lg-4 fv-row fv-plugins-icon-container">
											<input type="text" name="hl_balance" id="hl_balance" class="form-control form-control-lg1 form-control-solid" placeholder="" style="background-color: #ff5b5b; color: white;" readonly value="200 CR">
											<div class="fv-plugins-message-container invalid-feedback"></div>
										</div>
										<div class="col-lg-4 fv-row fv-plugins-icon-container">
											<input type="text" name="hl_balance_1" id="hl_balance_1" class="form-control form-control-lg1 form-control-solid" placeholder="" style="background-color: #ff5b5b; color: : white;" readonly value="100 DR">
											<div class="fv-plugins-message-container invalid-feedback"></div>
										</div>
									</div>	
								</div>
							</div>
							<div class="col-lg-4">
								<div style="padding:10px 10px 10px 10px !important;box-shadow: 0 3px 6px #00002947; border-radius: 5px; background-color: #f5f5f1 !important;">
									<div class="row">
										<label class="col-lg-6 col-form-label required fw-semibold fs-6">On Account</label>
										<div class="col-lg-6 fv-row fv-plugins-icon-container">
											<input type="text" name="on_account" id="on_account" class="form-control form-control-lg1 form-control-solid" placeholder="" style="background-color: #ff5b5b; color: white;" value="200">
											<div class="fv-plugins-message-container invalid-feedback"></div>
										</div>
									</div>
									<div class="row">
										<label class="col-lg-6 col-form-label fw-semibold fs-6">Total DC</label>
										<div class="col-lg-6 fv-row fv-plugins-icon-container">
											<input type="text" name="doc_charge" id="doc_charge" class="form-control form-control-lg1 form-control-solid" placeholder="Charge" value="40" readonly>
											<div class="fv-plugins-message-container invalid-feedback"></div>
										</div>
									</div>
									<div class="row">
										<label class="col-lg-6 col-form-label required fw-semibold fs-6">Net Pay</label>
										<div class="col-lg-6 fv-row fv-plugins-icon-container">
											<input type="text" name="net_pay" id="net_pay" class="form-control form-control-lg1 form-control-solid" style="font-size: 18px !important;font-weight: 700 !important;color: #1B439E !important;" readonly value="800">
											<div class="fv-plugins-message-container invalid-feedback"></div>
										</div>
									</div>
									<div class="row">
										<label class="col-lg-6 col-form-label fw-semibold fs-6">Total Paid Cash</label>
										<div class="col-lg-6 fv-row fv-plugins-icon-container">
											<input type="text" name="paid_cash" id="paid_cash" class="form-control form-control-lg1 form-control-solid" style="font-size: 18px !important;font-weight: 700 !important;color: #1B439E !important;" readonly value="800">
											<div class="fv-plugins-message-container invalid-feedback" id="paid_cash_err"></div>
										</div>
									</div>
								</div>
							</div>
						</div><br>
						<div style="padding:10px 10px 10px 10px !important;box-shadow: 0 3px 6px #00002947; border-radius: 5px; background-color: #f5f5f1 !important;">
							<div class="d-flex justify-content-end">
								<div class="d-flex align-items-center">
									<label class="form-check form-check-inline form-check-solid me-5 is-invalid">
										<input class="form-check-input" name="" type="checkbox" value="1" id="as_nominee" onclick="nominee_ds();">
									</label>
									<span class="col-form-label fw-semibold fs-6">As Nominee</span>
								</div>
							</div>
							<div id="nom_details" style="display: none;">
								<label class="col-form-label fw-bold fs-6"><u>Nominee Details</u></label>
								<div class="row">
									<label class="col-lg-1 col-form-label required fw-semibold fs-6">Nominee</label>
									<div class="col-lg-2 fv-row fv-plugins-icon-container">
										<input type="text" name="add_nomi_new_loan" class="form-control form-control-lg1 form-control-solid" placeholder="Nominee Name" id="add_nomi_new_loan" value="Roshan">

										<!-- <input type="hidden" name="add_nomi_new_loan_hidden" id="add_nomi_new_loan_hidden" value=""> -->
										<div class="fv-plugins-message-container invalid-feedback" id="add_nomi_new_loan_err"></div>
									</div>
									<label class="col-lg-1 col-form-label required fw-semibold fs-6">Relation</label>
									<div class="col-lg-2 fv-row fv-plugins-icon-container">
										<select class="form-select form-select-solid" name="add_relation_new_loan" id="add_relation_new_loan" data-control="select2" data-hide-search="true">	
											<option value="">Select</option>
											<option value="Mother">Mother</option>
											<option value="Father">Father</option>				
											<option value="Brother" selected>Brother</option>
											<option value="Sister">Sister</option>
											<option value="Wife">Wife</option>
											<option value="Husband">Husband</option>
											<option value="Son">Son</option>
											<option value="Daughter">Daughter</option>
											<option value="Father in Law">Father in Law</option>
											<option value="Mother in Law">Mother in Law</option>
											<option value="Son in Law">Son in Law</option>
											<option value="Daughter in Law">Daughter in Law</option>
											<option value="Grand Father">Grand Father</option>
											<option value="Grand Mother">Grand Mother</option>
											<option value="Uncle">Uncle</option>
											<option value="Aunty">Aunty</option>
											<option value="Others">Others</option>
										</select>
									</div>
									<label class="col-lg-1 col-form-label fw-semibold fs-6">City</label>
									<div class="col-lg-2 fv-row fv-plugins-icon-container">
										<input type="text" name="add_nominee_city_new_loan" id="add_nominee_city_new_loan" class="form-control form-control-lg1 form-control-solid" placeholder="City" readonly value="Sayalkudi">
										<div class="fv-plugins-message-container invalid-feedback"></div>
									</div>
									<label class="col-lg-1 col-form-label fw-semibold fs-6">Area</label>
									<div class="col-lg-2 fv-row fv-plugins-icon-container">
										<input type="text" name="add_nominee_area_new_loan" id="add_nominee_area_new_loan" class="form-control form-control-lg1 form-control-solid" placeholder="Area" readonly value="Sayalkudi">
										<div class="fv-plugins-message-container invalid-feedback"></div>
									</div>
								</div>
								<div class="row">
									<label class="col-lg-1 col-form-label fw-semibold fs-6">Mobile</label>
									<div class="col-lg-2 fv-row fv-plugins-icon-container">
										<input type="text" name="add_nominee_mob_new_loan" id="add_nominee_mob_new_loan" class="form-control form-control-lg1 form-control-solid" placeholder="Mobile" readonly value="9898959698">
										<div class="fv-plugins-message-container invalid-feedback"></div>
									</div>
									<label class="col-lg-1 col-form-label fw-semibold fs-6">Address</label>
									<div class="col-lg-2 fv-row fv-plugins-icon-container">
										<textarea class="form-control form-control-solid" rows="2" placeholder="Address" name="add_nominee_addr_new_loan" id="add_nominee_addr_new_loan" readonly>Kovil Street,Kannirajapuram</textarea>
									</div>
									<div class="col-lg-2 fv-row fv-plugins-icon-container fv-plugins-bootstrap5-row-invalid">
										<div class="d-flex align-items-center mt-2">
											<label class="form-check form-check-inline form-check-solid me-5 is-invalid">
												<input class="form-check-input" name="" type="checkbox" value="1" id="is_agb_cust" checked="checked">
											</label>
											<span class="col-form-label fw-semibold fs-6">Is AGB Customer</span>
										</div>
									</div>
									<label class="col-lg-1 col-form-label fw-semibold fs-6" id="nomi_id_tbox" style="display: none;">Nominee</label>
									<div class="col-lg-2 fv-row party_image" id="nomi_id_tbox_photo" style="display: none;">
										<div class="image-input image-input-outline" data-kt-image-input="true">
											<div class="image-input-wrapper"></div>
											<span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" data-kt-initialized="1">
												<i class="bi bi-x fs-6"></i>
											</span>
										</div>
									</div>
								</div>
							</div>
						</div><br>
						<div class="row">
							<div class="col-lg-6">
								<div style="padding: 10px 10px 10px 10px !important;box-shadow: 0 3px 6px #00002947;border-radius: 5px;background-color:#f5f5f1 !important;">
									<div><label class="col-form-label fw-bold fs-6"><u>Paid Cash Details</u></label></div>
									<div class="repeater">
									    <div class="row">
									    	<label class="col-lg-1 col-form-label fw-semibold fs-6">Mode</label>
									    	<div class="col-lg-3">
												<select class="form-select form-select-solid sare-fields" name="question_type" data-id="question_type" id="meth"
												>
													<option value="">Select</option>
													<option value="BANK">Bank</option>	
													<option value="CASH">Cash</option>
													<option value="UPI">UPI</option>
												</select>
											</div>
									      	<!-- <label class="col-lg-1 col-form-label required fw-semibold fs-6 data-fields" data-parent="question_type" data-sub="CASH">Trans No</label> -->
											<div class="col-lg-3 data-fields" data-parent="question_type" data-sub="CASH">
												<input type="text" class="form-control form-control-lg form-control-solid" placeholder="Transaction No" />
											</div>
											<!-- <label class="col-lg-1 col-form-label required fw-semibold fs-6">Amount</label> -->
											<div class="col-lg-3">
												<input type="text" class="form-control form-control-lg form-control-solid" placeholder="Amount" style="font-size: 18px !important;font-weight: 700 !important;color: #1B439E !important;"/>
											</div>
											<div class="col-lg-1 del" style="display: none;">
												<a href="javascript:;" class="btn btn-sm btn-danger mt-md-2 btn-delete"><span>Del</span>
												<!-- <i class="la la-trash-o fs-3"></i>--></a>
											</div>
									    </div>
									</div>
									<div class="form-group">
										<a href="javascript:;" class="btn btn-sm btn-outline btn-outline-solid btn-outline-warning btn-active-light-primary me-2 btn-add" value="1">
										Add</a>
									</div>
								</div>
							</div>
							<div class="col-lg-6">
								<div style="padding: 10px 10px 10px 10px !important;box-shadow: 0 3px 6px #00002947;border-radius: 5px;background-color:#f5f5f1 !important;">
									<div><label class="col-form-label fw-bold fs-6"><u>Document Charge Details</u></label></div>
									<div class="repeater_dc">
									    <div class="row">
									    	<label class="col-lg-1 col-form-label fw-semibold fs-6">Mode</label>
									    	<div class="col-lg-3">
												<select class="form-select form-select-solid sare-fields_dc" name="question_type_dc" data-id="question_type_dc" id="meth_dc"
												>
													<option value="">Select</option>
													<option value="BANK">Bank</option>	
													<option value="CASH">Cash</option>
													<option value="UPI">UPI</option>
												</select>
											</div>
											<div class="col-lg-3 data-fields_dc" data-parent="question_type_dc" data-sub="CASH">
												<input type="text" class="form-control form-control-lg form-control-solid" placeholder="Transaction No" />
											</div>
											<div class="col-lg-3">
												<input type="text" class="form-control form-control-lg form-control-solid" placeholder="Amount" style="font-size: 18px !important;font-weight: 700 !important;color: #1B439E !important;"/>
											</div>
											<div class="col-lg-1 del_dc" style="display: none;">
												<a href="javascript:;" class="btn btn-sm btn-danger mt-md-2 btn-delete_dc"><span>Del</span>
												<!-- <i class="la la-trash-o fs-3"></i>--></a>
											</div>
									    </div>
									</div>
									<div class="form-group">
										<a href="javascript:;" class="btn btn-sm btn-outline btn-outline-solid btn-outline-warning btn-active-light-primary me-2 btn-add_dc" value="1">
										Add</a>
									</div>
								</div>
							</div>
						</div><br>
						<div style="padding:10px 10px 10px 10px !important;box-shadow: 0 3px 6px #00002947; border-radius: 5px; background-color: #f5f5f1 !important;">
							<div class="row">
								<label class="col-lg-2 col-form-label fw-semibold fs-6">Attended By</label>
								<label class="col-lg-2 col-form-label fw-bold fs-6">Esakki</label>
								<label class="col-lg-2 col-form-label required fw-semibold fs-6">Redemption Period</label>
								<div class="col-lg-1 fv-row fv-plugins-icon-container">
									<input type="text" name="redemption_period" id="redemption_period" class="form-control form-control-lg1 form-control-solid" style="font-size: 17px !important;font-weight: 600 !important;" value="30">
									<div class="fv-plugins-message-container invalid-feedback"></div>
								</div>
								<label class="col-lg-1 col-form-label fw-semibold fs-6">Days</label>
								<label class="col-lg-2 col-form-label fw-semibold fs-6">Customer Rating</label>
								<div class="col-lg-2 fv-row fv-plugins-icon-container">
									<input type="text" name="customer_rating" id="customer_rating" class="form-control form-control-lg1 form-control-solid" placeholder="Customer Rating" value="GOOD">
									<div class="fv-plugins-message-container invalid-feedback"></div>
								</div>
							</div>
							<div class="row">
								<label class="col-lg-1 col-form-label fw-semibold fs-6">Remarks</label>
								<div class="col-lg-3 fv-row fv-plugins-icon-container">
									<textarea class="form-control form-control-solid" rows="1" name="remarks" id="remarks"></textarea>
									<div class="fv-plugins-message-container invalid-feedback"></div>
								</div>
							</div>	
						</div><br>
						<div class="card-footer py-8">
							<button class="btn btn-outline btn-outline-solid btn-outline-warning btn-active-light-primary me-2" data-bs-dismiss="modal">Print Mini</button>
							<button class="btn btn-outline btn-outline-solid btn-outline-warning btn-active-light-primary me-2" data-bs-dismiss="modal">Calculator</button>
							<button class="btn btn-outline btn-outline-solid btn-outline-warning btn-active-light-primary me-2" data-bs-dismiss="modal">Redeem</button>
							<button class="btn btn-outline btn-outline-solid btn-outline-warning btn-active-light-primary me-2" data-bs-dismiss="modal">Save & Print</button>
							<button class="btn btn-outline btn-outline-solid btn-outline-warning btn-active-light-primary me-2" data-bs-dismiss="modal">Pledge View</button>
							<button class="btn btn-outline btn-outline-solid btn-outline-warning btn-active-light-primary me-2" style="margin-right: 8rem !important;" data-bs-dismiss="modal">Renewal A/c</button>
							<button type="reset" class="btn btn-secondary me-2" data-bs-dismiss="modal">Cancel</button>
							<button type="submit" class="btn btn-primary" id="save_changes_add_new_loan">Save Changes</button>
						</div>
					</div>
				</div>
				<!--end::Modal dialog-->
			</div>
		<!-- </form> -->
	</div>
	<!--end::Modal - New Loan-->
	<!--begin::Modal - edit Loan-->
	<div class="modal fade" id="kt_modal_editloan" tabindex="-1" aria-hidden="true">
		<form id="kt_edit_new_loan_list_form" class="form">
			<!--begin::Modal dialog-->
			<div class="modal-dialog modal-xl-loan">
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
					<div class="modal-body pt-0 pb-15 px-5 px-xl-20">
						<!--begin::Heading-->
						<div class="mb-13 text-center">
							<h1 class="mb-3">Modify Loan</h1>
						</div>
						<!--end::Heading-->
						<div class="row">
							<div class="col-lg-6">
								<div style="padding:10px 10px 10px 10px !important;box-shadow: 0 3px 6px #00002947; border-radius: 5px; background-color: #f5f5f1 !important;">
									<div class="row">
										<!--begin::Label-->
										<label class="col-lg-2 col-form-label required fw-semibold fs-6">Name</label>
										<!--end::Label-->
										<!--begin::Col-->
										<div class="col-lg-4 fv-row fv-plugins-icon-container">
											<input type="text" name="edit_pname_new_loan" class="form-control form-control-lg1 form-control-solid" placeholder="Party Name" value="Srinivasan">
											<div class="fv-plugins-message-container invalid-feedback"></div>
										</div>
										<!--end::Col-->
											<!--begin::Label-->
										<label class="col-lg-2 col-form-label fw-semibold fs-6">City</label>
										<!--end::Label-->
										<!--begin::Col-->
										<div class="col-lg-4 fv-row fv-plugins-icon-container">
											<!--begin::Select-->
											<select class="form-select form-select-solid" data-control="select2" name="edit_city_new_loan" data-hide-search="true">	
												<option value="">Select City</option>
												<option value="1" selected="selected">Sayalkudi</option>
												<option value="1">Ramnathapuram</option>				
												<option value="2">Kamuthi</option>
												<option value="3">Madurai</option>
											</select>
											<!--end::Select-->
										</div>
										<!--end::Col-->	
									</div>
									<div class="row">
										<!--begin::Label-->
										<label class="col-lg-2 col-form-label fw-semibold fs-6">LastName</label>
										<!--end::Label-->
										<!--begin::Col-->
										<div class="col-lg-4 fv-row fv-plugins-icon-container">
											<input type="text" name="edit_lname_new_loan" class="form-control form-control-lg1 form-control-solid" placeholder="Last Name" value="Krishnan">
											<div class="fv-plugins-message-container invalid-feedback"></div>
										</div>
										<!--end::Col-->
										<!--begin::Label-->
										<label class="col-lg-2 col-form-label fw-semibold fs-6">Mobile</label>
										<!--end::Label-->
										<!--begin::Col-->
										<div class="col-lg-4 fv-row fv-plugins-icon-container">
											<input type="text" name="edit_pmobile_new_loan" class="form-control form-control-lg1 form-control-solid" placeholder="Mobile Number" value="9856565555">
											<div class="fv-plugins-message-container invalid-feedback"></div>
										</div>
										<!--end::Col-->
										</div>
										<div class="row">
										<!--begin::Label-->
										<label class="col-lg-2 col-form-label fw-semibold fs-6">Area</label>
										<!--end::Label-->
										<!--begin::Col-->
										<div class="col-lg-4 fv-row fv-plugins-icon-container">
											<!--begin::Select-->
											<select class="form-select form-select-solid" name="edit_parea_new_loan" data-control="select2" data-hide-search="true">	
												<option value="">Select Area</option>
												<option value="1" selected="selected">Ayyanar Gold Bank - Old Branch</option>
												<option value="1">Ayyanar Gold Bank - Sayalkudi</option>				
												<option value="2">Ayyanar Gold Bank - HO</option>
												<option value="3">Ayyanar Gold Bank - Sayalkudi</option>
											</select>
											<!--end::Select-->
										</div>
										<!--end::Col-->
										<label class="col-lg-2 col-form-label fw-semibold fs-6">Address</label>
										<div class="col-lg-4 fv-row fv-plugins-icon-container">
											<textarea class="form-control form-control-solid" rows="2" placeholder="Address" name="edit_paddress_new_loan">23,chruch main road,Sayalkudi</textarea>
										</div>
									</div>
									<div class="row">
										<label class="col-lg-2 col-form-label required fw-semibold fs-6">JewelType</label>
										<div class="col-lg-4 fv-row fv-plugins-icon-container">
											<select class="form-select form-select-solid" name="edit_jtype_new_loan" data-control="select2" data-hide-search="true">	
												<option value="">Select</option>
												<option value="1" selected="selected">Gold</option>				
												<option value="2">Silver</option>
												<option value="3">Stoneless</option>
												<option value="4">Stonegold</option>
											</select>
										</div>
									</div>
								</div>
							</div>
							<div class="col-lg-6">
								<div style="padding:10px 10px 10px 10px !important;box-shadow: 0 3px 6px #00002947; border-radius: 5px; background-color: #f5f5f1 !important;">
									<div class="row">
										<label class="col-lg-2 col-form-label required fw-semibold fs-6">Company</label>
										<div class="col-lg-4 fv-row fv-plugins-icon-container">
											<select class="form-select form-select-solid" name="edit_company_new_loan" data-control="select2" data-hide-search="true">	
												<option value="">Select Company</option>
												<option value="1" selected="selected">Ayyanar Gold Bank - Main Branch</option>
												<option value="1">Ayyanar Gold Bank - Sayalkudi</option>				
												<option value="2">Ayyanar Gold Bank - Ramnad</option>
												<option value="3">Ayyanar Gold Bank - Kamuthi</option>
											</select>
										</div>
										<label class="col-lg-2 col-form-label fw-semibold fs-6">Bill No</label>
										<div class="col-lg-4 fv-row fv-plugins-icon-container">
											<input type="text" class="form-control form-control-lg1 form-control-solid" placeholder="Party Name" Value="TIP-548/22" style="background-color: #e6e7d1 !important; border-radius: 0px; border: none;" disabled>
											<div class="fv-plugins-message-container invalid-feedback"></div>
										</div>
									</div>
									<!-- <div class="row">
										<div class="col-lg-9"></div>
										<div class="col-lg-1">		
											<button type="submit" class="btn btn-sm btn-primary">Generate</button>
										</div>
									</div> -->
								</div><br>
								<div style="padding:10px 10px 10px 10px !important;box-shadow: 0 3px 6px #00002947; border-radius: 5px; background-color: #f5f5f1 !important;">
									<div class="row">
										<!--begin::Label-->
										<label class="col-lg-2 col-form-label required fw-semibold fs-6">Date</label>
										<!--end::Label-->
										<div class="col-lg-4 fv-row">
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
												<input class="form-control form-control-solid ps-12" name="edit_date_new_loan" placeholder="Date" id="kt_datepicker_edit_loan_date" value="<?php echo date("d m Y"); ?>" />
											</div>
										</div>	
										<!--begin::Label-->
										<label class="col-lg-2 col-form-label required fw-semibold fs-6">Int Type</label>
										<!--end::Label-->
										<!--begin::Col-->
										<div class="col-lg-4 fv-row fv-plugins-icon-container">
											<!--begin::Select-->
											<select class="form-select form-select-solid" name="edit_int_type_new_loan" data-control="select2" data-hide-search="true">	
												<option value="">Select</option>
												<option value="0" selected="selected">TIP-2.00</option>
												<option value="1">MRI-2.50</option>				
												<option value="2">F-3.00</option>
											</select>
											<!--end::Select-->
										</div>
										<!--end::Col-->
										</div>
										<div class="row">				
										<!--begin::Label-->
										<label class="col-lg-2 col-form-label required fw-semibold fs-6">LoanType</label>
										<!--end::Label-->
										<!--begin::Col-->
										<div class="col-lg-4 fv-row fv-plugins-icon-container">
											<!--begin::Select-->
											<select class="form-select form-select-solid" name="edit_loan_type_new_loan" data-control="select2" data-hide-search="true">	
												<option value="">Select</option>
												<option value="0" selected="selected">New</option>
												<option value="1">Renewal</option>				
												<option value="2">Auctioned</option>
											</select>
											<!--end::Select-->
										</div>
										<!--end::Col-->	
										<!--begin::Label-->
										<label class="col-lg-2 col-form-label fw-semibold fs-6">Renewal</label>
										<!--end::Label-->
										<!--begin::Col-->
										<div class="col-lg-4 fv-row fv-plugins-icon-container">
											<input type="text" name="edit_renewal_new_loan" class="form-control form-control-lg1 form-control-solid" placeholder="Renewal" value="Renewal">
											<div class="fv-plugins-message-container invalid-feedback"></div>
										</div>
										<!--end::Col-->
									</div>
									<div class="row">
										<div class="col-lg-4 fv-row fv-plugins-icon-container fv-plugins-bootstrap5-row-invalid">
											<div class="d-flex align-items-center">
												<label class="form-check form-check-inline form-check-solid me-5 is-invalid">
													<input class="form-check-input" name="communication[]" type="checkbox" value="1" id="nominee_radio_edit" onclick="nom_radio_edit()">
												</label>
												<span class="col-form-label fw-semibold fs-6">Has Nominee</span>
											</div>
										</div>
										<div class="col-lg-2"></div>
									</div>
									<div class="row">
										<label class="col-lg-2 col-form-label required fw-semibold fs-6" id="nominee_id_edit" style="display: none;">Nominee</label>
										<div class="col-lg-4 fv-row fv-plugins-icon-container" id="nominee_id_tbox_edit" style="display: none;">
											<select class="form-select form-select-solid" name="edit_nomi_new_loan" data-control="select2" data-hide-search="true">	
												<option value="">Select</option>
												<option value="0" selected="selected">Kumar</option>
												<option value="1">Srinivasan</option>				
												<option value="2">Ajith</option>
												<option value="3">Karthick</option>
											</select>
										</div>
										<label class="col-lg-2 col-form-label required fw-semibold fs-6" id="relation_id_edit" style="display: none;">Relation</label>
										<div class="col-lg-4 fv-row fv-plugins-icon-container" id="relation_id_tbox_edit" style="display: none;">
											<input type="text" name="edit_relation_new_loan" class="form-control form-control-lg1 form-control-solid" placeholder="Relation" value="Brother">
											<div class="fv-plugins-message-container invalid-feedback"></div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="separator separator-content border-dark my-6"><span class="w-125px fw-bold fs-4">Pledge Items</span></div>
						<div style="padding:10px 10px 10px 10px !important;box-shadow: 0 3px 6px #00002947; border-radius: 5px; background-color: #f5f5f1 !important;">
							<div class="row">
								<!--begin::Col-->
								<div class="col-lg-3 fv-row fv-plugins-icon-container">
									<input type="text" name="edit_plname_new_loan" class="form-control form-control-lg1 form-control-solid" placeholder="Pledge" value="Ring">
									<div class="fv-plugins-message-container invalid-feedback"></div>
								</div>
								<!--end::Col-->
								<!--begin::Col-->
								<div class="col-lg-3 fv-row fv-plugins-icon-container">
									<input type="text" name="edit_dname_new_loan" class="form-control form-control-lg1 form-control-solid" placeholder="Description" value="Ladies ring with two green stones">
									<div class="fv-plugins-message-container invalid-feedback"></div>
								</div>
								<!--end::Col-->
								<!--begin::Col-->
								<div class="col-lg-2 fv-row fv-plugins-icon-container">
										<select class="form-select form-select-solid" data-control="select2" data-hide-search="true" name="edit_ptyname_new_loan">
											<option value="">Select</option>
											<option value="0" selected="selected">916</option>
											<option value="1">Non KDM</option>				
											<option value="2">Stone Gold</option>
											<option value="3">Silver</option>
										</select>
									</div>
								<!--end::Col-->
								<!--begin::Col-->
								<div class="col-lg-1 fv-row fv-plugins-icon-container">
									<input type="text" name="edit_quliname_new_loan" class="form-control form-control-lg1 form-control-solid" placeholder="Quantity" value="1">
									<div class="fv-plugins-message-container invalid-feedback"></div>
								</div>
								<!--end::Col-->
								<!--begin::Col-->
								<div class="col-lg-2 fv-row fv-plugins-icon-container">
									<input type="text" name="edit_pwei_new_loan" class="form-control form-control-lg1 form-control-solid" placeholder="Weight" value="2.850">
									<div class="fv-plugins-message-container invalid-feedback"></div>
								</div>
								<!--end::Col-->
								<div class="col-lg-1 py-1">		
									<button type="submit" class="btn btn-sm btn btn-outline btn-outline-solid btn-outline-warning btn-active-light-primary me-2 mb-2">Add</button>
								</div>
							</div>
						</div>
						<table class="table table-striped table-hover table-row-bordered fs-7 gy-1 gs-2" id="kt_datatable_dom_positioning_add_loan">
							<thead>
								<tr class="fw-semibold fs-7 text-gray-800">
						            <th class="min-w-100px">Pledge</th>
						            <th class="min-w-200px">Description</th>
						            <th class="min-w-100px">Purity</th>
						            <th class="min-w-100px">Quantity</th>
						            <th class="min-w-100px">Weight</th>
						            <th class="min-w-100px">Status</th>
						            <th class="min-w-100px">RP.No</th>
						            <th class="min-w-100px">Bank</th>
								</tr>
							</thead>
							<tbody>
								<tr>
						            <td>Ladies Ring</td>
						            <td>Ring</td>
						            <td>KDM</td>
						            <td>1</td>
						            <td>16.800</td>
						            <td>Yes</td>
						            <td>E2126</td>
						            <td>SBI</td>
						        </tr>
						   		<tr>
						            <td>Ladies Ring</td>
						            <td>Ring</td>
						            <td>KDM</td>
						            <td>1</td>
						            <td>16.800</td>
						            <td>Yes</td>
						            <td>E2126</td>
						            <td>SBI</td>
						        </tr>
						  		<tr>
						            <td>Ladies Ring</td>
						            <td>Ring</td>
						            <td>KDM</td>
						            <td>1</td>
						            <td>16.800</td>
						            <td>Yes</td>
						            <td>E2126</td>
						            <td>SBI</td>
						        </tr>
						    </tbody>
						</table>
						<div class="col-lg-12">		
							<div style="padding:10px 10px 10px 10px !important;box-shadow: 0 3px 6px #00002947; border-radius: 5px; background-color: #f5f5f1 !important;">
								<div class="row">
									<!--begin::Label-->
									<label class="col-lg-1 col-form-label required fw-semibold fs-6">Weight</label>
									<!--end::Label-->
									<!--begin::Col-->
									<div class="col-lg-1 fv-row fv-plugins-icon-container">
										<input type="text" name="edit_weight_new_loan" class="form-control form-control-lg1 form-control-solid" placeholder="Weight" value="3.100">
										<div class="fv-plugins-message-container invalid-feedback"></div>
									</div>
									<!--end::Col-->
									<!--begin::Label-->
									<label class="col-lg-1 col-form-label required fw-semibold fs-6">Stoneless</label>
									<!--end::Label-->
									<!--begin::Col-->
									<div class="col-lg-1 fv-row fv-plugins-icon-container">
										<input type="text" name="edit_stless_new_loan" class="form-control form-control-lg1 form-control-solid" placeholder="St.less" value="0.500">
										<div class="fv-plugins-message-container invalid-feedback"></div>
									</div>
									<!--end::Col-->
									<!--begin::Label-->
									<label class="col-lg-1 col-form-label required fw-semibold fs-6">Less</label>
									<!--end::Label-->
									<!--begin::Col-->
									<div class="col-lg-1 fv-row fv-plugins-icon-container">
										<input type="text" name="edit_less_new_loan" class="form-control form-control-lg1 form-control-solid" placeholder="Less" value="0.200">
										<div class="fv-plugins-message-container invalid-feedback"></div>
									</div>
									<!--end::Col-->
									<!--begin::Label-->
									<label class="col-lg-1 col-form-label required fw-semibold fs-6">Net.Wght</label>
									<!--end::Label-->
									<!--begin::Col-->
									<div class="col-lg-1 fv-row fv-plugins-icon-container">
										<input type="text" name="edit_ntweight_new_loan" class="form-control form-control-lg1 form-control-solid" placeholder="Nt.Wgt" value="2.400">
										<div class="fv-plugins-message-container invalid-feedback"></div>
									</div>
									<!--end::Col-->
									<!--begin::Label-->
										<label class="col-lg-1 col-form-label required fw-semibold fs-6">CurrRate</label>
									<!--end::Label-->
									<!--begin::Col-->
									<div class="col-lg-1 fv-row fv-plugins-icon-container">
										<input type="text" name="edit_currate_new_loan" class="form-control form-control-lg1 form-control-solid" placeholder="Rate" value="5000">
										<div class="fv-plugins-message-container invalid-feedback"></div>
									</div>
									<!--end::Col-->
									<!--begin::Label-->
										<label class="col-lg-1 col-form-label required fw-semibold fs-6">Quality%</label>
									<!--end::Label-->
									<!--begin::Col-->
									<div class="col-lg-1 fv-row fv-plugins-icon-container">
										<input type="text" name="edit_qual_new_loan" class="form-control form-control-lg1 form-control-solid" placeholder="Quality" value="85">
										<div class="fv-plugins-message-container invalid-feedback"></div>
									</div>
									<!--end::Col-->
									<!--begin::Label-->
										<label class="col-lg-1 col-form-label required fw-semibold fs-6">Gram.Val</label>
									<!--end::Label-->
									<!--begin::Col-->
									<div class="col-lg-1 fv-row fv-plugins-icon-container">
										<input type="text" name="edit_gvalue_new_loan" class="form-control form-control-lg1 form-control-solid" placeholder="Value" value="4250.00">
										<div class="fv-plugins-message-container invalid-feedback"></div>
									</div>
									<!--end::Col-->
									<!--begin::Label-->
										<label class="col-lg-1 col-form-label required fw-semibold fs-6">SalesRate</label>
									<!--end::Label-->
									<!--begin::Col-->
									<div class="col-lg-1 fv-row fv-plugins-icon-container">
										<input type="text" name="edit_slrate_new_loan" class="form-control form-control-lg1 form-control-solid" placeholder="Rate" value="10200.00">
										<div class="fv-plugins-message-container invalid-feedback"></div>
									</div>
									<!--end::Col-->
								
								</div>	
							</div>
						</div><br>
						<div class="row">
							<div class="col-lg-4">		
								<div style="padding:10px 10px 10px 10px !important;box-shadow: 0 3px 6px #00002947; border-radius: 5px; background-color: #f5f5f1 !important;">
									<div class="row">
										<!--begin::Label-->
										<label class="col-lg-6 col-form-label required fw-semibold fs-6">Loan Amount</label>
										<!--end::Label-->
										<!--begin::Col-->
										<div class="col-lg-6 fv-row fv-plugins-icon-container">
											<input type="text" name="edit_lnamt_new_loan" class="form-control form-control-lg1 form-control-solid" style="font-size: 18px !important;font-weight: 700 !important;color: #1B439E !important;" value="10000.00">
											<div class="fv-plugins-message-container invalid-feedback"></div>
										</div>
										<!--end::Col-->
									</div>
									<div class="row">
										<!--begin::Label-->
										<label class="col-lg-6 col-form-label required fw-semibold fs-6">Loan period</label>
										<!--end::Label-->
										<!--begin::Col-->
										<div class="col-lg-3 fv-row fv-plugins-icon-container">
											<input type="text" name="edit_lnperiod_new_loan" class="form-control form-control-lg1 form-control-solid" placeholder="" value="1">
											<div class="fv-plugins-message-container invalid-feedback"></div>
										</div>
										<!--end::Col-->
										<label class="col-lg-3 col-form-label fw-semibold fs-6">Months</label>
									</div>
									<div class="row">
										<!--begin::Label-->
										<label class="col-lg-6 col-form-label required fw-semibold fs-6">Monthly</label>
										<!--end::Label-->
										<!--begin::Col-->
										<div class="col-lg-6 fv-row fv-plugins-icon-container">
											<input type="text" name="edit_mont_new_loan" class="form-control form-control-lg2 form-control-solid" placeholder="Monthly Deposit" value="250.00">
											<div class="fv-plugins-message-container invalid-feedback"></div>
										</div>
										<!--end::Col-->
									</div>
									<div class="row">
										<label class="col-lg-6 col-form-label fw-semibold fs-6">Advance Interest</label>
										<div class="col-lg-3 fv-row fv-plugins-icon-container">
											<input type="text" class="form-control form-control-lg1 form-control-solid" value="0">
											<div class="fv-plugins-message-container invalid-feedback"></div>
										</div>
										<div class="col-lg-3 fv-row fv-plugins-icon-container">
											<input type="text" class="form-control form-control-lg1 form-control-solid" value="0.00">
											<div class="fv-plugins-message-container invalid-feedback"></div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-lg-4">
								<div style="padding:10px 10px 10px 10px !important;box-shadow: 0 3px 6px #00002947; border-radius: 5px; background-color: #f5f5f1 !important;">
									<div class="row">
										<!--begin::Label-->
										<label class="col-lg-6 col-form-label fw-semibold fs-6">Processing Charge</label>
										<!--end::Label-->
										<!--begin::Col-->
										<div class="col-lg-6 fv-row fv-plugins-icon-container">
											<input type="text" name="company" class="form-control form-control-lg1 form-control-solid" placeholder="Processing Charge" value="0.00">
											<div class="fv-plugins-message-container invalid-feedback"></div>
										</div>
										<!--end::Col-->
									</div>
									<div class="row">
										<label class="col-lg-6 col-form-label fw-semibold fs-6">Branch Adjustment</label>
										<div class="col-lg-6 fv-row fv-plugins-icon-container">
											<input type="text" name="company" class="form-control form-control-lg1 form-control-solid" style="font-size: 18px !important;font-weight: 700 !important;color: #1B439E !important;" value="0.00">
											<div class="fv-plugins-message-container invalid-feedback"></div>
										</div>
									</div>
									<div class="row">
										<label class="col-lg-6 col-form-label fw-semibold fs-6">Select</label>
										<div class="col-lg-6 fv-row fv-plugins-icon-container">
											<select class="form-select form-select-solid" name="" data-control="select2" data-hide-search="true">	
												<option value="0">AGK ODE Loan</option>
												<option value="1" selected="selected">AGM ODE Loan</option>				
												<option value="2">AGN ODE Loan</option>
												<option value="3">AGP ODE Loan</option>
											</select>
										</div>
									</div>
										<div class="row">
										<!--begin::Label-->
										<label class="col-lg-6 col-form-label fw-semibold fs-6">H/L Balance</label>
										<!--end::Label-->
										<!--begin::Col-->
										<div class="col-lg-3 fv-row fv-plugins-icon-container">
											<input type="text" name="company" class="form-control form-control-lg1 form-control-solid" placeholder="" style="background-color: #ff5b5b; color: white";>
											<div class="fv-plugins-message-container invalid-feedback"></div>
										</div>
										<!--end::Col-->
										<!--begin::Col-->
										<div class="col-lg-3 fv-row fv-plugins-icon-container">
											<input type="text" name="company" class="form-control form-control-lg1 form-control-solid" placeholder="" style="background-color: #ff5b5b; color: : white ">
											<div class="fv-plugins-message-container invalid-feedback"></div>
										</div>
										<!--end::Col-->
									</div>	
											<div class="row">
										<!--begin::Label-->
										<label class="col-lg-4 col-form-label fw-semibold fs-6">Remarks</label>
										<!--end::Label-->
											<!--begin::Col-->
												<div class="col-lg-8 fv-row fv-plugins-icon-container">
													<textarea class="form-control form-control-solid" rows="1"></textarea>
													<div class="fv-plugins-message-container invalid-feedback"></div>
												</div>
											<!--end::Col-->
									</div>	
								</div>
							</div>
							<div class="col-lg-4">
								<div style="padding:10px 10px 10px 10px !important;box-shadow: 0 3px 6px #00002947; border-radius: 5px; background-color: #f5f5f1 !important;">

									<div class="row">
										<!--begin::Label-->
										<label class="col-lg-6 col-form-label required fw-semibold fs-6">On Account</label>
										<!--end::Label-->
										<!--begin::Col-->
										<div class="col-lg-6 fv-row fv-plugins-icon-container">
											<input type="text" name="edit_onacc_new_loan" class="form-control form-control-lg1 form-control-solid" placeholder="" style="background-color: #ff5b5b; color: white" value="0">
											<div class="fv-plugins-message-container invalid-feedback"></div>
										</div>
										<!--end::Col-->
									</div>
									<div class="row">
										<!--begin::Label-->
										<label class="col-lg-6 col-form-label fw-semibold fs-6">Document Charge</label>
										<!--end::Label-->
										<!--begin::Col-->
										<div class="col-lg-6 fv-row fv-plugins-icon-container">
											<input type="text" name="company" class="form-control form-control-lg1 form-control-solid" placeholder="Charge" value="50.00">
											<div class="fv-plugins-message-container invalid-feedback"></div>
										</div>
										<!--end::Col-->
									</div>
									<div class="row">
										<!--begin::Label-->
										<label class="col-lg-6 col-form-label required fw-semibold fs-6">Net Pay</label>
										<!--end::Label-->
										<!--begin::Col-->
										<div class="col-lg-6 fv-row fv-plugins-icon-container">
											<input type="text" name="edit_npay_new_loan" class="form-control form-control-lg1 form-control-solid" style="font-size: 18px !important;font-weight: 700 !important;color: #1B439E !important;" value="9950.00">
											<div class="fv-plugins-message-container invalid-feedback"></div>
										</div>
										<!--end::Col-->
									</div>
									<div class="row">
										<!--begin::Label-->
										<label class="col-lg-6 col-form-label required fw-semibold fs-6">Paid Cash</label>
										<!--end::Label-->
										<!--begin::Col-->
										<div class="col-lg-6 fv-row fv-plugins-icon-container">
											<input type="text" name="edit_pcash_new_loan" class="form-control form-control-lg1 form-control-solid" style="font-size: 18px !important;font-weight: 700 !important;color: #1B439E !important;" value="9950.00">
											<div class="fv-plugins-message-container invalid-feedback"></div>
										</div>
										<!--end::Col-->
									</div>
								</div>
							</div>
						</div><br>		
						<div style="padding:10px 10px 10px 10px !important;box-shadow: 0 3px 6px #00002947; border-radius: 5px; background-color: #f5f5f1 !important;">
							<div class="row">
								<label class="col-lg-2 col-form-label required fw-semibold fs-6">Attended By</label>
								<div class="col-lg-2 fv-row fv-plugins-icon-container">
									<select class="form-select form-select-solid" name="edit_aby_new_loan" data-control="select2" data-hide-search="true">	
										<option value="">Select</option>
										<option value="0" selected="selected">Arun</option>
										<option value="1">Sathya</option>				
										<option value="2">Antony</option>
										<option value="3">Priya</option>
									</select>
								</div>
								<!--begin::Label-->
								<label class="col-lg-2 col-form-label required fw-semibold fs-6">Redemption Period</label>
								<!--end::Label-->
								<!--begin::Col-->
								<div class="col-lg-1 fv-row fv-plugins-icon-container">
									<input type="text" name="edit_rperi_new_loan" class="form-control form-control-lg1 form-control-solid" style="font-size: 17px !important;font-weight: 600 !important;">
									<div class="fv-plugins-message-container invalid-feedback"></div>
								</div>
								<!--end::Col-->
								<label class="col-lg-1 col-form-label fw-semibold fs-6">Days</label>
								<!--begin::Label-->
								<label class="col-lg-2 col-form-label fw-semibold fs-6">Customer Rating</label>
								<!--end::Label-->
								<!--begin::Col-->
								<div class="col-lg-2 fv-row fv-plugins-icon-container">
									<input type="text" class="form-control form-control-lg1 form-control-solid" placeholder="Customer Rating" value="60">
									<div class="fv-plugins-message-container invalid-feedback"></div>
								</div>
								<!--end::Col-->
							</div>	
						</div><br>
						<div class="row">
							<!--begin::Label-->
							<label class="col-lg-1 col-form-label required fw-semibold fs-6">Party</label>
							<!--end::Label-->
							<!--begin::Col-->
							<div class="col-lg-2 fv-row">
							<!--begin::Image input-->
							<div class="image-input image-input-outline" data-kt-image-input="true">
							<!--begin::Preview existing avatar-->
							<div class="image-input-wrapper" style="background-image: url(assets/images/sample.jpg)"></div>
							<!--end::Preview existing avatar-->
							<!--begin::Label-->
							<label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" data-kt-initialized="1">
								<i class="bi bi-pencil-fill fs-10"></i>
								<!--begin::Inputs-->
								<input type="file" name="edit_party_new_loan" accept=".png, .jpg, .jpeg">
								<input type="hidden" name="edit_party_remove_new_loan">
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
							<!--end::Col-->
							<!--begin::Label-->
							<label class="col-lg-1 col-form-label required fw-semibold fs-6">Others</label>
							<!--end::Label-->
							<!--begin::Col-->
							<div class="col-lg-2 fv-row">
							<!--begin::Image input-->
							<div class="image-input image-input-outline" data-kt-image-input="true">
							<!--begin::Preview existing avatar-->
							<div class="image-input-wrapper"></div>
							<!--end::Preview existing avatar-->
							<!--begin::Label-->
							<label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" data-kt-initialized="1">
								<i class="bi bi-pencil-fill fs-10"></i>
								<!--begin::Inputs-->
								<input type="file" name="edit_others_new_loan" accept=".png, .jpg, .jpeg">
								<input type="hidden" name="edit_other_remove_new_loan">
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
							<!--end::Col-->
							<!--begin::Label-->
							<label class="col-lg-1 col-form-label required fw-semibold fs-6">Jewel</label>
							<!--end::Label-->
							<!--begin::Col-->
							<div class="col-lg-2 fv-row">
							<!--begin::Image input-->
							<div class="image-input image-input-outline" data-kt-image-input="true">
							<!--begin::Preview existing avatar-->
							<div class="image-input-wrapper" style="background-image: url(assets/images/sample_jewel.jpg)"></div>
							<!--end::Preview existing avatar-->
							<!--begin::Label-->
							<label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" data-kt-initialized="1">
								<i class="bi bi-pencil-fill fs-10"></i>
								<!--begin::Inputs-->
								<input type="file" name="edit_jewel_new_loan" accept=".png, .jpg, .jpeg">
								<input type="hidden" name="edit_jewel_remove_new_loan">
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
							<!--end::Col-->
						</div>
						<!--begin::Actions-->
						<div class="card-footer py-8">
							<button class="btn btn-outline btn-outline-solid btn-outline-warning btn-active-light-primary me-2" data-bs-dismiss="modal">Print Mini</button>
							<button class="btn btn-outline btn-outline-solid btn-outline-warning btn-active-light-primary me-2" data-bs-dismiss="modal">Calculator</button>
							<button class="btn btn-outline btn-outline-solid btn-outline-warning btn-active-light-primary me-2" data-bs-dismiss="modal">Redeem</button>
							<button class="btn btn-outline btn-outline-solid btn-outline-warning btn-active-light-primary me-2" data-bs-dismiss="modal">Save & Print</button>
							<button class="btn btn-outline btn-outline-solid btn-outline-warning btn-active-light-primary me-2" data-bs-dismiss="modal">Pledge View</button>
							<button class="btn btn-outline btn-outline-solid btn-outline-warning btn-active-light-primary me-2" style="margin-right: 8rem !important;" data-bs-dismiss="modal">Renewal A/c</button>
							<button class="btn btn-secondary me-2" data-bs-dismiss="modal">Cancel</button>
							<button class="btn btn-primary" id="save_changes_edit_new_loan">Save Changes</button>
						</div>
						<!-- <div class="row">
							<div class="col-lg-9"></div>	
								<div class="col-lg-1">
									<div class="d-flex flex-center flex-row-fluid pt-12">
										<button type="submit" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
									</div>
								</div>
							<div class="col-lg-2">
								<div class="d-flex flex-center flex-row-fluid pt-12">
									<button type="submit" class="btn btn-success" id="save_changes_add_new_loan">Save Changes</button>
								</div>
							</div>
						</div> -->
						<!--end::Actions-->
					</div>
				</div>
				<!--end::Modal dialog-->
			</div>
		</form>
	</div>
	<!--end::Modal - edit loan-->
	<!--begin::Modal - view loan-->
	<div class="modal fade" id="kt_modal_viewloan" tabindex="-1" aria-hidden="true">
		
	</div>
	<!--end::Modal - view loan-->
	<!--begin::Modal - deleteloan-->
	<div class="modal fade" id="kt_modal_deleteloan" tabindex="-1" aria-hidden="true">
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
	<!--end::Modal - delete loan-->
	<?php $this->load->view("script"); ?>
	<!-- <script src="js/newloan-list.js"></script> -->
	<!-- loan list day fillter start -->
	<script>

		$(document).ready(function() {
			
			$(".move_to").on("click", function () {
				value=$(this).val();
				// alert(value);
				$('#filter_form').attr('action', "<?php echo base_url(); ?>Mri_loan?page="+value);
				$("#filter_form").submit();
				e.preventDefault();
			});
		});
		</script>
		<script>
		
		 </script>
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
		<script>
			$("#kt_datatable_dom_positioning_add_loan").DataTable({
				// "ordering": false,
				"aaSorting":[],
				 "language": {
				  "lengthMenu": "Show _MENU_",
				 },
				 "dom":
				  "<'row'" +
				  ">" +

				  "<'table-responsive'tr>" +

				  "<'row'" +
				  ">"
				 
				});
		</script>
		<script>
			$("#kt_datatable_dom_positioning_edit_loan").DataTable({
				// "ordering": false,
				"aaSorting":[],
				 "language": {
				  "lengthMenu": "Show _MENU_",
				 },
				 "dom":
				  "<'row'" +
				  ">" +

				  "<'table-responsive'tr>" +

				  "<'row'" +
				  ">"
				 
				});
		</script>
		<script>
			$("#kt_datatable_dom_positioning_view_loan").DataTable({
				// "ordering": false,
				"aaSorting":[],
				 "language": {
				  "lengthMenu": "Show _MENU_",
				 },
				 "dom":
				  "<'row'" +
				  ">" +

				  "<'table-responsive'tr>" +

				  "<'row'" +
				  ">"
				 
				});
		</script>
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
		<script>
			var gram_val = document.getElementById('gram_val');
			var gram_val_tbox = document.getElementById('gram_val_tbox');
			var sale_rt = document.getElementById('sale_rt');
			var sale_rt_tbox = document.getElementById('sale_rt_tbox');
			var tot_int_label = document.getElementById('tot_int_label');
			var tot_int_label_tbox = document.getElementById('tot_int_label_tbox');
			var due_date_label = document.getElementById('due_date_label');
			var due_date_label_tbox = document.getElementById('due_date_label_tbox');
			var monthly_label = document.getElementById('monthly_label');
			var monthly_label_tbox = document.getElementById('monthly_label_tbox');
			$('input:radio[name="loan_radio"]').change(function() {
		        if ($(this).val()=='hf_ln_val') 
		        {
		        	$('#scheme_type').find('option').remove().end().append('<option value="">Select Scheme</option>','<option value="HF">H & F</option>').val('','HF');

		        	$('#int_type').find('option').remove().end().append('<option value="">Select Interest</option>','<option value="2.00">F-2.00</option>','<option value="2.25">F-2.25</option>','<option value="2.50">F-2.50</option>','<option value="2.75">F-2.75</option>','<option value="2.99">F-2.99</option>').val('','2.00','2.25','2.50','2.75','2.99');
		        	gram_val.style.display = "none";
		        	gram_val_tbox.style.display = "none";
		        	sale_rt.style.display = "none";
		        	sale_rt_tbox.style.display = "none";
		        	tot_int_label.style.display = "block";
		        	tot_int_label_tbox.style.display = "block";
		        	due_date_label.style.display = "block";
		        	due_date_label_tbox.style.display = "block";
		        	monthly_label.style.display = "none";
		        	monthly_label_tbox.style.display = "none";
		        } else
		        {

		            $('#scheme_type').find('option').remove().end().append('<option value="">Select Scheme</option>','<option value="TIP">TIP</option>','<option value="MIP">MIP</option>','<option value="SIP">SIP</option>','<option value="SL">SL</option>').val('','TIP','MIP','SIP','SL');

		        	$('#int_type').find('option').remove().end().append('<option value="">Select Interest</option>','<option value="0.55">0.55</option>','<option value="0.97">0.97</option>','<option value="1.47">1.47</option>','<option value="1.97">1.97</option>','<option value="2.47">2.47</option>').val('','0.55','0.97','1.47','1.97','2.47');
		        	gram_val.style.display = "block";
		        	gram_val_tbox.style.display = "block";
		        	sale_rt.style.display = "block";
		        	sale_rt_tbox.style.display = "block";
		        	tot_int_label.style.display = "none";
		        	tot_int_label_tbox.style.display = "none";
		        	due_date_label.style.display = "none";
		        	due_date_label_tbox.style.display = "none";
		        	monthly_label.style.display = "block";
		        	monthly_label_tbox.style.display = "block";
		        }
		    });

			function sch_bill_no()
			{
				var search_bill_no = document.getElementById("search_bill_no");

				if (search_bill_no.checked)
				{
					$('#search_label_tbox').removeAttr('disabled');
			  	} else 
			  	{
			  		$('#search_label_tbox').attr('disabled', 'disabled');
			  	}
			}

			function nominee_ds()
			{
				var as_nominee = document.getElementById("as_nominee");
				var nom_details = document.getElementById("nom_details");
				if (as_nominee.checked)
				{
					nom_details.style.display = "block";
				}
				else
				{
					nom_details.style.display = "none";
				}
			}
		</script>
		<script>
			// Paid Cash Payment Mode
		  jQuery($ => {
		  $(document).on('change', '.sare-fields', e => {
		    let $select = $(e.target);
		    let id = $select.data("id");
		    let value = $select.val();

		    let $container = $select.closest('.repeater');
		    if (value == "CASH") 
		    {
		    	console.log("if");
		    	$container.find('.row .data-fields[data-parent=' + id + ']').hide();
		    	$container.find('.data-fields[data-parent=' + id + '][data-sub=' + value + ']').hide();
		    }
		    else
		    {
		    	console.log("else");
		    	$container.find('.row .data-fields[data-parent=' + id + ']').show();
		    	$container.find('.data-fields[data-parent=' + id + '][data-sub=' + value + ']').show();
		    }
		  });

		  // repeater functionality...
		  $('.btn-add').on('click', e => {
		     let $clone = $('.repeater').first().clone().hide();
		     if ($('.btn-add').val() == "1") 
		     {
		     	$('.del').hide();
		     }
		     else
		     {
		     	$('.del').show();
		     }
		    $clone.insertBefore('.repeater:first').slideDown();
		  });

		  $(document).on('click', '.repeater .btn-delete', e => 
		  {
		  	$(e.target).closest('.repeater').slideUp(400, function() { $(this).remove() });
		  });
		});
		</script>
		<script>
			// Document Charge Payment Mode
		  jQuery($ => {
		  $(document).on('change', '.sare-fields_dc', e => {
		    let $select = $(e.target);
		    let id = $select.data("id");
		    let value = $select.val();

		    let $container = $select.closest('.repeater_dc');
		    if (value == "CASH") 
		    {
		    	console.log("if");
		    	$container.find('.row .data-fields_dc[data-parent=' + id + ']').hide();
		    	$container.find('.data-fields_dc[data-parent=' + id + '][data-sub=' + value + ']').hide();
		    }
		    else
		    {
		    	console.log("else");
		    	$container.find('.row .data-fields_dc[data-parent=' + id + ']').show();
		    	$container.find('.data-fields_dc[data-parent=' + id + '][data-sub=' + value + ']').show();
		    }
		  });

		  // repeater functionality...
		  $('.btn-add_dc').on('click', e => {
		     let $clone = $('.repeater_dc').first().clone().hide();
		     if ($('.btn-add_dc').val() == "1") 
		     {
		     	$('.del_dc').hide();
		     }
		     else
		     {
		     	$('.del_dc').show();
		     }
		    $clone.insertBefore('.repeater_dc:first').slideDown();
		  });

		  $(document).on('click', '.repeater_dc .btn-delete_dc', e => 
		  {
		  	$(e.target).closest('.repeater_dc').slideUp(400, function() { $(this).remove() });
		  });
		});
		</script>
	<script >
		function loan_view(val)
			{
				var baseurl= $("#baseurl").val();
				// alert(baseurl);
				$.ajax({
				type: "POST",
				url: baseurl+'Mri_loan/mri_loan_view',
				async: false,
				type: "POST",
				data: "id="+val,
				dataType: "html",
				success: function(response)
				{
				$('#kt_modal_viewloan').empty().append(response);
				$('#kt_modal_viewloan').addClass('show');
				$('.modal-backdrop').addClass('show');
				//$("#kt_modal_editdept").css("display", "block");
				$('#kt_modal_viewloan').show();
		   		$('.modal-backdrop').show();
				}
			});
			}
			function closeViewModal()
			{
				var baseurl= $("#baseurl").val();
				
				$('#kt_modal_viewloan').removeClass('show');
				$('.modal-backdrop').removeClass('show');
				$('#kt_modal_viewloan').hide();
		   		$('.modal-backdrop').hide();
					var $body = $(document.body);
				$body.css("overflow", "auto");
				$body.width("auto");
				// window.location.href = baseurl+'Mri_loan';
			}

	
</script>

	</body>
	<!--end::Body-->
	</html>