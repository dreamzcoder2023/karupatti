
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
									<h1 class="d-flex align-items-center text-dark fw-bold my-1 fs-3">Loan List
									<!--begin::Separator-->
									<span class="h-20px border-gray-400 border-start ms-3 mx-2"></span>
									<label class="d-flex align-items-center text-primary fw-bold my-1 fs-5">
										<span>Company &emsp;-</span>
										<span>&emsp;<?php
										if($company_filter!='' && $company_filter!='all') 
										{
											$cmp=$this->db->query("select * from COMPANY where COMPANYCODE='".$company_filter."'")->row();
											echo $cmp->COMPANYNAME; 
										}
										else
											{
												echo "All";
											}?></span>
									</label>
									<span class="h-20px border-gray-400 border-start ms-3 mx-2"></span>
									<label class="d-flex align-items-center text-primary fw-bold my-1 fs-5">
										<span>Status &emsp;-</span>
										<span>&emsp;<?php
										if($status_filter!='' && $status_filter!='all') 
										{
										$cmp=$this->db->query("select * from loan_status where id=".$status_filter)->row();
										echo $cmp->loan_stage; }
										else
											{
												echo "All";
											}?></span>
									</label>
									<span class="h-20px border-gray-400 border-start ms-3 mx-2"></span>
									<label class="d-flex align-items-center text-primary fw-bold my-1 fs-5">
										<span>Date &emsp;-</span>
										<span>&emsp;<?php echo ($dt_fill!="")?$dt_fill:'Today'; ?></span>
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
														<label class="col-lg-4 form-label text-center fs-4 fw-bold">Total Charges</label>
													</div>
													<div class="row">
														<label class="col-lg-4 text-success text-center fs-2 fw-bold"><?php echo $min_count;?></label>
														<label class="col-lg-4 text-success text-center fs-2 fw-bold"><?php
														$sum=0; $other_charges=0;
														foreach ($loan_list as  $value) {
															$sum+=$value['AMOUNT'];
															$other_charges+=$value['DCAMOUNT']+$value['PROCESSING_CHARGE']+$value['HL_AMOUNT'];
														}
														 echo "Rs. ".number_format($sum,2,'.',',');?></label>
														<label class="col-lg-4 text-success text-center fs-2 fw-bold"><?php echo "Rs. ".number_format($other_charges,2,'.',',') ?></label>
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
															<div class="scroll-y mh-325px my-2 px-1">
															<form action="<?php echo base_url();?>loan" method="POST" >
															<div class="px-7 py-5" data-kt-user-table-filter="form">
																<div class="mb-2">
																	<label class="form-label fs-6 fw-semibold">Company</label>
																	<select class="form-select form-select-solid fw-semibold" data-control="select2" data-hide-search="true" name="company_filter" id="company_filter">	
																		<option value="all" <?php echo ($company_filter=='all')?'selected':''; ?>>All</option>
																		<?php 
																		foreach ($company_list as $clist) {
																		?>
																		<option value="<?php echo $clist['COMPANYCODE'];?>" <?php echo ($clist['COMPANYCODE']==$company_filter)?'selected':''; ?>> <?php echo $clist['COMPANYNAME'];?></option>

																		<?php
																		}
																		?>
																	</select>
																</div>
																<div class="mb-2">
																	<label class="form-label fs-6 fw-semibold">Status</label>
																	<select class="form-select form-select-solid fw-semibold" data-control="select2" data-hide-search="true" name="loan_status_filter" id="loan_status_filter">	
																		<option value="all" <?php echo ($status_filter=='all')?'selected':''; ?> >All</option>
																		<?php 
																		foreach ($loan_status as $lslist) {
																			?>
																		
																		<option value="<?php echo $lslist['id'];?>" <?php echo ($lslist['id']==$status_filter)?'selected':''; ?>><?php echo $lslist['loan_stage'];?></option>
																		<?php
																		}
																		?>
																	</select>
																</div>
																<div class="mb-2">
																	<label class="form-label">Date</label>
																	<select class="form-select form-select-solid" data-control="select2" data-hide-search="true" name="dt_fill_loan_list" id="dt_fill_loan_list" onchange="date_fill_loan_list();">	
																		<!-- <option value="all">All</option> -->
																		<option value="today" <?php if($dt_fill=="today"){ echo "selected"; } ?>>Today</option>
																		<option value="week" <?php if($dt_fill=="week"){ echo "selected"; } ?>>This Week</option>
																			<option value="monthly" <?php if($dt_fill=="monthly"){ echo "selected"; } ?>>This Month</option>
																			<option value="custom Date" <?php if($dt_fill=="custom Date"){ echo "selected"; } ?>>Custom Date</option>
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
														</div>
														<button type="button" class="btn btn-sm btn-outline btn-outline-solid btn-outline-warning btn-active-light-primary me-3" data-bs-toggle="modal" data-bs-target="#">
														<!-- <span class="svg-icon svg-icon-2">
															<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																<rect opacity="0.3" x="12.75" y="4.25" width="12" height="2" rx="1" transform="rotate(90 12.75 4.25)" fill="currentColor" />
																<path d="M12.0573 6.11875L13.5203 7.87435C13.9121 8.34457 14.6232 8.37683 15.056 7.94401C15.4457 7.5543 15.4641 6.92836 15.0979 6.51643L12.4974 3.59084C12.0996 3.14332 11.4004 3.14332 11.0026 3.59084L8.40206 6.51643C8.0359 6.92836 8.0543 7.5543 8.44401 7.94401C8.87683 8.37683 9.58785 8.34458 9.9797 7.87435L11.4427 6.11875C11.6026 5.92684 11.8974 5.92684 12.0573 6.11875Z" fill="currentColor" />
																<path opacity="0.3" d="M18.75 8.25H17.75C17.1977 8.25 16.75 8.69772 16.75 9.25C16.75 9.80228 17.1977 10.25 17.75 10.25C18.3023 10.25 18.75 10.6977 18.75 11.25V18.25C18.75 18.8023 18.3023 19.25 17.75 19.25H5.75C5.19772 19.25 4.75 18.8023 4.75 18.25V11.25C4.75 10.6977 5.19771 10.25 5.75 10.25C6.30229 10.25 6.75 9.80228 6.75 9.25C6.75 8.69772 6.30229 8.25 5.75 8.25H4.75C3.64543 8.25 2.75 9.14543 2.75 10.25V19.25C2.75 20.3546 3.64543 21.25 4.75 21.25H18.75C19.8546 21.25 20.75 20.3546 20.75 19.25V10.25C20.75 9.14543 19.8546 8.25 18.75 8.25Z" fill="currentColor" />
															</svg>
														</span> -->
															Export</button>
														<a href="<?php echo base_url();?>loan/loan_add" target="_blank">
															<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#">
															<span class="svg-icon svg-icon-2">
																<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																	<rect opacity="0.5" x="11.364" y="20.364" width="16" height="2" rx="1" transform="rotate(-90 11.364 20.364)" fill="currentColor" />
																	<rect x="4.36396" y="11.364" width="16" height="2" rx="1" fill="currentColor" />
																</svg>
															</span>New Loan</button>
														</a>
													</div>
													<!-- <div class="d-flex justify-content-end">
														<button type="button" class="btn btn-sm btn-outline btn-outline-solid btn-outline-warning btn-active-light-primary mt-9 me-2" data-bs-toggle="modal" data-bs-target="#kt_modal_export_users_loan_list">Export</button>
														<a href="loan_page.php">
															<button type="button" class="btn btn-primary mt-9"  data-bs-toggle="modal" >
															<span class="svg-icon svg-icon-2">
																<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																	<rect opacity="0.5" x="11.364" y="20.364" width="16" height="2" rx="1" transform="rotate(-90 11.364 20.364)" fill="currentColor" />
																	<rect x="4.36396" y="11.364" width="16" height="2" rx="1" fill="currentColor" />
																</svg>
															</span>New Loan</button>
														</a>
													</div> -->
												</div>
											</div>
											<!--begin::Table-->
											<table class="table align-middle table-row-dashed table-striped table-hover fs-7 gy-1 gs-2" id="kt_datatable_dom_positioning1">
												<!--begin::Table head-->
												<thead>
													<!--begin::Table row-->
													<tr class="text-start text-muted fw-bold fs-7 gs-0">
														<th class="min-w-25px">Sno</th>
														<th class="min-w-25px">Date</th>
														<th class="min-w-100px">Loan No</th>
														<!-- <th class="min-w-25px">Expiry Date</th> -->
														<th class="min-w-25px">Company</th>
														<th class="min-w-100px">Party Info</th>
														<th class="min-w-80px">Scheme - Int</th>
														<th class="min-w-25px">Jewel Type</th>
														<th class="min-w-25px">No of Item</th>
														<th class="min-w-25px">Loan Amt</th>
														<th class="min-w-25px">Location</th>
														<th class="min-w-175px">Status</th>
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
														<td><?php echo $i; ?></td>
														<td><?php echo date_format(date_create($llist['ENDATE']),$_SESSION['DATE_PATTERN']);?></td>
														<td class="ple1"><?php echo $llist['BILLNO'];?></td>
														<td class="ple1"><?php 
														$clist=$this->db->query("select * from COMPANY where COMPANYCODE='".$llist['COMPANYCODE']."'")->row();
														echo $clist->COMPANYNAME;?></td>
														<!-- <td><?php 
														// if($llist['MONTHS']>12)
														// {
														// 	echo $llist['MONTHS']." Days";
														// }
														// else
														// {
														// 	$ex_dt= strtotime("+".$llist['MONTHS']." month", strtotime($llist['ENDATE']));
														// 	$e_dt= date('Y-m-d',$ex_dt);
														// 	echo  date_format(date_create($e_dt),$_SESSION['DATE_PATTERN']);
														// 	// echo $ex_dt;
														// }
															;?></td> -->
														
														<td class="ple1">
															<span><i class="fa-solid fa-star fs-7" style="<?php if($llist['RATING']==3) echo 'color:#50cd89;';
															if($llist['RATING']==2) echo 'color:#ffc700;';
															if($llist['RATING']==1) echo 'color:red;';
															if($llist['RATING']=='' || is_null($llist['RATING'])) echo 'color:#d2d4dc;';

															?>"></i></span>
															<span class="align-items-center"><?php echo $llist['NAME'];?></span>
														</td>
														<td><?php echo $llist['INTERESTTYPE'];?></td>
														<td><?php echo $llist['JEWEL_TYPE'];?></td>
														<td><?php 
														$ple=$this->db->query("select * from PLEDGEINFO where BILLNO='".$llist['BILLNO']."'")->result_array();
														$count = count((array)$ple);
														echo $count;
														?></td>
														<td class="ple1"><?php echo number_format($llist['AMOUNT'],2,'.',',');?></td>
														<td style="text-align: center;"><?php 
															$res=$this->db->query("select COUNT(*) as count from PLEDGEINFO where BILLNO = '".$llist['BILLNO']."' and STATUS='BANK' and REPLEDGE_SNO!=''")->row();
															if($res->count>0){
															?>
															<!-- <span style="text-align: center;">-</span> -->
															<span class="btn btn-icon btn-circle fs-8 fw-bold shadow text-white mb-1" style="background:red;width: 20px !important;height: 20px !important;float: right;">BJ</span>
																<?php }else{ 
																		if(is_null($llist['CLOSEDATE']) &&is_null($llist['CLOSING_STATUS']) && ($llist['LOAN_STATUS']>6)){
																	?>
																		<span class="btn btn-icon btn-circle fs-8 fw-bold shadow text-white mb-1" style="background:green;width: 20px !important;height: 20px !important;float: right;">LI</span>
																<?php } 
																else if($llist['LOAN_STATUS']<6){
																	// 1ecbe1?>
																	<span class="btn btn-icon btn-circle fs-8 fw-bold shadow text-white mb-1" style="background:#1ecbe1;width: 20px !important;height: 20px !important;float: right;">IH</span>
																<?php 
																}
																else{?>
																	<i class="fa  fa-circle-check" style="color: green;float: right;"></i>
																<?php }

															}?></td>
														<td>
															<?php 
															$st_list=$this->db->query("select * from loan_status where id=".$llist['LOAN_STATUS'])->row();

															?>
															<label class="col-form-label fw-semibold fs-7" name="" id="" ><span style="background-color:<?php echo $st_list->color_code?>;border-radius: 8px;padding: 5px 15px 5px 15px;"><?php echo $st_list->loan_stage;?></span>
															</label>
															<!-- <span class="badge badge-light-warning">Waiting Approval</span> -->
														</td>
														<!--begin::Action=-->
														<td>
															<span class="text-end">
																<a href="" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm" data-bs-toggle="modal" data-bs-target="#kt_modal_viewloan" onclick="loan_view('<?php echo $llist['BILLNO']; ?>')">
																	<i class="bi bi-eye-fill eyc"></i>
																</a>
																<?php if($llist['LOAN_STATUS']<15){?>
																	<button class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
																		<i class="fas fa-ellipsis-v eyc"></i>
																	</button>
																	<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px py-3" data-kt-menu="true" style="">

																		<?php if($llist['LOAN_STATUS']<=3){ ?>
																		<!-- <div class="menu-item px-3"> -->

																			<?php 
																			if($llist['LOAN_STATUS']!=2){
																			if($_SESSION['username']=='K')
																				{ ?>
																			<!-- <a href="" class="menu-link flex-stack px-3" data-bs-toggle="modal"  data-bs-target="#kt_modal_approve_loan" onclick="get_approve_loan_no('<?php echo $llist['BILLNO']; ?>')">Approve</a> -->
																		<?php } else if($_SESSION['username']=='eibsdemo'){ ?>
																			<!-- <a href="" class="menu-link flex-stack px-3" onclick="loan_direct_approve('<?php echo $llist['BILLNO']; ?>')">Approve</a> -->
																			<?php } ?>
																		<!-- </div> -->
																		
																		<!-- <div class="menu-item px-3"> -->
																			<!-- <a href="" data-bs-toggle="modal" data-bs-target="#kt_modal_redoloan"  class="menu-link flex-stack px-3" onclick="get_redo_loan_no('<?php echo $llist['BILLNO']; ?>')">Send for Redo</a> -->
																		<!-- </div> -->
																		<?php  } }?>

																		<?php 
																		if($llist['LOAN_STATUS']>=7){
																			
																			if($llist['LOAN_STATUS']!=9 && $llist['LOAN_STATUS']!=10 && $llist['LOAN_STATUS']!=11 && $llist['LOAN_STATUS']!=15){?>
																		<div class="menu-item px-3">
																			<a href="<?php echo base_url();?>Lock_in_lock_out/lock_out" class="menu-link px-3">Lock Out</a>
																		</div>
																		<div class="menu-item px-3">
																			<a href="<?php echo base_url();?>loanreceipt/add_loan_receipt_id/<?php echo str_replace('/', '_', $llist['BILLNO']) ;?>" class="menu-link px-3" target="_blank">
																				
																			Receipt</a>
																		</div>
																		<div class="menu-item px-3">
																			<a href="#" class="menu-link px-3">Redemption</a>
																		</div>
																		<?php } ?>
																		<!-- <div class="menu-item px-3">
																			<a href="#" class="menu-link px-3">Party Sale</a>
																		</div>
																		<div class="menu-item px-3">
																			<a href="#" class="menu-link px-3">Company Close</a>
																		</div>
																		<div class="menu-item px-3">
																			<a href="#" class="menu-link px-3">Company Transfer</a>
																		</div> -->
																		
																		<div class="menu-item px-3">
																			<a href="#" class="menu-link px-3">Jewel Settlement</a>
																		</div>
																		<div class="menu-item px-3">
																			<a href="#" class="menu-link px-3">Loan Renewal</a>
																		</div>

																		
																		<?php } ?>
																		<?php if($llist['LOAN_STATUS']>=6) { ?>
																		<div class="menu-item px-3">
																			<a href="<?php echo base_url();?>loan/loan_print/<?php echo str_replace('/', '_', $llist['BILLNO']) ;?>" class="menu-link px-3" target="_blank">Print</a>
																		</div>

																		<?php } ?>
																		<div class="menu-item px-3">
																			<a href="#" class="menu-link flex-stack px-3">Edit</a>
																		</div>
																		<div class="menu-item px-3">
																			<a href="#" class="menu-link px-3">Delete</a>
																		</div>
																	</div>
																<?php
																}
																?>
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
										$coun = ceil( $loan_count/25);
										$c_page = isset($_GET['page']) ? $_GET['page'] : 1;
									?>
									<?php $paging_info = get_paging_info($loan_count,25,$c_page); ?>

										<form id="filter_form" style="width: 100%;" method="POST" action="" enctype="multipart/form-data" >

											
											<input type="hidden" id="dt_fill_loan_list" name="dt_fill_loan_list"  value="<?php echo $dt_fill; ?>">

										    <input type="hidden" id="from_date_fillter_loan_list" name="from_date_fillter_loan_list" value="<?php echo $from_date_fillter; ?>">
											<input type="hidden" id="to_date_fillter_loan_list" name="to_date_fillter_loan_list" value="<?php echo $to_date_fillter; ?>">
											<input type="hidden" id="company_filter" name="company_filter" value="<?php echo $company_filter; ?>">
											<input type="hidden" id="loan_status_filter" name="loan_status_filter" value="<?php echo $status_filter; ?>">

											
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

											   <li class='paginate_button page-item move_to' value="<?php echo '1'; ?>"><a aria-controls='kt_roles_view_table' data-dt-idx='1' tabindex='0' class='page-link' title='Page 1'>1</a></li>
											    ..

											<?php endif; ?>

											<!-- Loop though max number of pages shown and show links either side equal to $max / 2 -->
											<?php for($i = $sp; $i <= ($sp + $max -1);$i++) : ?>

											    <?php
											        if($i > $paging_info['pages'])
											            continue;
											    ?>

										    	<?php if($paging_info['curr_page'] == $i) : ?>

											        <li class='paginate_button page-item active move_to' value="<?php echo $i; ?>"> <a aria-controls='kt_roles_view_table' data-dt-idx='1' tabindex='0' class='page-link' title='Page <?php echo $i; ?>'><?php echo $i; ?></a></li>
											        
											    <?php else : ?>

											       <li class='paginate_button page-item move_to' value="<?php echo $i; ?>"> <a aria-controls='kt_roles_view_table' data-dt-idx='1' tabindex='0' class='page-link'  title='Page <?php echo $i; ?>'><?php echo $i; ?></a></li>

										    	<?php endif; ?>

											<?php endfor; ?>


											<!-- If the current page is less than say the last page minus $max pages divided by 2-->
											<?php if($paging_info['curr_page'] < ($paging_info['pages'] - floor($max / 2))) : ?>

											    ..
											    <li class='paginate_button page-item move_to' value="<?php echo $paging_info['pages']; ?>"><a  aria-controls='kt_roles_view_table' data-dt-idx='1' tabindex='0' class='page-link' title='Page <?php echo $paging_info['pages']; ?>'><?php echo $paging_info['pages']; ?></a></li>

											<?php endif; ?>

											<!-- Show last two pages if we're not near them -->
											<?php if($paging_info['curr_page'] < $paging_info['pages']) : ?>

											  	<!-- <li class='paginate_button page-item move_to' value="<?php echo ($paging_info['curr_page'] + 1); ?>">  <a aria-controls='kt_roles_view_table' data-dt-idx='1' tabindex='0' class='page-link' href='<?php echo base_url();?>loan?page=<?php echo $c_page+1; ?>' title='Page <?php echo ($paging_info['curr_page'] + 1); ?>'>></a></li> -->
											  	<li class='paginate_button page-item move_to' value="<?php echo ($paging_info['curr_page'] + 1); ?>">  <a aria-controls='kt_roles_view_table' data-dt-idx='1' tabindex='0' class='page-link'   title='Page <?php echo ($paging_info['curr_page'] + 1); ?>'>></a></li>

											   

											<?php endif; ?>
										</ul>

										</form>
										
											<?php
											function get_paging_info($tot_rows,$pp,$curr_page)
											{
											    $pages = ceil($tot_rows / $pp); // calc pages

											    $data = array(); // start out array
											    $data['si']        = ($curr_page * $pp) - $pp; // what row to start at
											    $data['pages']     = $pages;                   // add the pages
											    $data['curr_page'] = $curr_page;               // Whats the current page
											    $paging_info['curr_url'] = base_url();

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
	
	<!--begin::Modal - send for redo loan-->
	<div class="modal fade" id="kt_modal_redoloan" tabindex="-1" aria-hidden="true">
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
						<!--end::Svg Icon-->
					</div>
					<!--end::Close-->
				</div>
				<!--end::Modal header-->
				<div class="modal-body pt-0 pb-15 px-5 px-xl-20">
					<!--begin::Heading-->
					<div class="mb-10 text-center">
						<h1 class="mb-3">Send Loan for Update</h1>
					</div>
					
								<!--begin::Section-->
								<div class="mb-8">
									<!--begin::Label-->
									<div class="fw-bold text-start text-dark fs-6 mb-1 ms-1">Description for Update</div>
									<!--end::Label-->
									<!--begin::Input group-->
									<input type="hidden" name="redo_bill_no" id="redo_bill_no" value="0">
									<div class="d-flex flex-wrap flex-stack">
										<textarea class="form-control form-control-solid" rows="1" placeholder="Description for Update" name="redo_description" id="redo_description"></textarea>
									</div>
									<!--begin::Input group-->
								</div>
								<!--end::Section-->
								<div class="d-flex flex-center mb-6">
									<p type="button" class="btn btn-secondary me-3" data-bs-dismiss="modal">Cancel</p>
									<p type="button" class="btn btn-primary" onclick="loan_redo()">Submit</p>
								</div>
								<!--end::Submit-->
							
				</div>
			</div>
			<!--end::Modal dialog-->
		</div>
	</div>
	<!--end::Modal - send for redo loan-->
	<!--begin::Modal - view loan-->
	<div class="modal fade" id="kt_modal_viewloan" tabindex="-1" aria-hidden="true">
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
					<div class="mb-3 text-center">
						<h1 class="mb-3">View Loan</h1>
					</div>
					<div class="row">
						<div class="col-lg-6">
							<div class="px-4" style="border-radius: 10px;padding-bottom: 2px;box-shadow: 0 5px 10px #00002947;">
								<input type="hidden" name="bill_no" id="bill_no" value="">
								<label class="col-lg-12 col-form-label fw-bold fs-5 text-center">Party Basic Details</label>
								<div class="row">
									<label class="col-lg-12 col-form-label fw-bold fs-6" name="lbl_name" id="lbl_name">
										<i class="fa fa-user fs-6" aria-hidden="true" title=" Name"></i>&emsp;</label>
									<label class="col-lg-12 col-form-label fw-bold fs-6" name="lbl_address" id="lbl_address">
										</label>
									<label class="col-lg-6 col-form-label fw-bold fs-6" name="lbl_phone" id="lbl_phone">
										</label>
									<label class="col-lg-2 col-form-label fw-semibold fs-6">Rating</label>
									<label class="col-lg-4 col-form-label fw-bold fs-6" name="lbl_rating " id="lbl_rating">
										</label>
									<label class="col-form-label fw-semibold fs-6">Nominee &nbsp;
										<span class="fw-bold fs-6" id="span_nominee">
										</span></label>
								</div>
								<div class="row mt-4 mb-4">
									<div class="col-lg-4 fv-row">

										<div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url(assets/images/Party.jpg)" id="div_party_photo">
											
										</div>
									</div>
									<div class="col-lg-4 fv-row">
										<div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url(assets/images/Party_Proof.jpg)">
											<div class="image-input-wrapper"  style="background-image: url(assets/images/Party_Proof.jpg)"></div>
										</div>
									</div>
									<div class="col-lg-4 fv-row">
										<div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url(assets/images/Signature.jpg)">
											<div class="image-input-wrapper"  style="background-image: url(assets/images/Signature.jpg)"></div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="px-4" style="border-radius: 10px;padding-bottom: 20px;box-shadow: 0 5px 10px #00002947;">
								<label class="col-lg-12 col-form-label fw-bold fs-5 text-center">Loan Information</label>
								<div class="row">
									<label class="col-lg-2 col-form-label fw-semibold fs-6">Company</label>
									<label class="col-lg-10 col-form-label fw-bold fs-6" name="lbl_companycode" id="lbl_companycode"> </label>
									<label class="col-lg-2 col-form-label fw-semibold fs-6">Int Type</label>
									<label class="col-lg-4 col-form-label fw-bold fs-6" name="lbl_interest_type" id="lbl_interest_type"></label>
									<div class="col-lg-2" nmae="div_due_status" id="div_due_status"></div>

									<div class="col-lg-4">
										<label class="col-form-label fw-bold fs-6" name="lbl_duration" id="lbl_duration"></label>
									</div>
									<label class="col-lg-2 col-form-label fw-semibold fs-6">Loan Date</label>
									<label class="col-lg-4 col-form-label fw-bold fs-6" name="lbl_loan_date" id="lbl_loan_date"></label>
									<label class="col-lg-2 col-form-label fw-semibold fs-6">Exp.Date</label>
									<label class="col-lg-4 col-form-label fw-bold fs-6" name="lbl_loan_exp_date" id="lbl_loan_exp_date"></label>
									<div class="col-lg-6">
										<label class="col-form-label"><i class="fas fa-money-bill-wave fs-4"></i>&emsp;</span></label>
										<label class="col-form-label fw-bold fs-2" name="lbl_loan_amt" id="lbl_loan_amt"></label>
									</div>
									<div class="col-lg-2">
										<label class="col-form-label"><span><i class="fas fa-list-ol fs-4"></i>&emsp;</span></label>
										<label class="col-form-label fw-bold fs-4" name="lbl_pledge_count" id="lbl_pledge_count">
										</label>
									</div>
									<div class="col-lg-4">
										<label class="col-form-label"><span><i class="fas fa-balance-scale fs-4"></i></span>&emsp;</label>
										<label class="col-form-label fw-bold fs-4" id="lbl_net_weight" name="lbl_net_weight"></label>
									</div>
									<div class="col-lg-4 fv-row">
										<div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url(assets/media/svg/avatars/signature_blank.png)" id="div_jewel_photo">
											
											<!-- <div class="image-input-wrapper"  style="background-image: url(assets/images/Jewel.jpg)"></div> -->
										</div>
									</div>
									<div class="col-lg-8">
										<!-- <div class="row">
											<label class="col-lg-6 col-form-label fw-semibold fs-6">Last Rcpt Count & Date</label>
											<label class="col-lg-2 col-form-label fw-bold fs-6">3</label>
											<label class="col-lg-4 col-form-label fw-bold fs-6">22-02-2023</label>
										</div> -->
										<div class="row">
											<table>
												<thead class="fw-bold fs-6 text-center">
													<td class="col-lg-4">Actual</td>
													<td class="col-lg-4">Paid</td>
													<td class="col-lg-4">Balance</td>
												</thead>
												<tbody class="fw-semibold fs-6 text-center">
													<tr>
														<td class="col-lg-4">
															<span>Pri : </span>
															<span id="span_prin_actl_amt"></span>
														</td>
														<td class="col-lg-4"><span id="span_prin_paid_amt"></span></td>
														<td class="col-lg-4"><span id="span_prin_bal_amt"></span></td>
													</tr>
													<tr>
														<td class="col-lg-4">
															<span>Int : </span>
															<span id="span_intr_actl_amt"> </span>
														</td>
														<td class="col-lg-4"><span id="span_intr_paid_amt"></span></td>
														<td class="col-lg-4"><span id="span_intr_bal_amt"></span></td>
													</tr>
												</tbody>
											</table>
											<div class="col-lg-12" ><label class="col-form-label fw-bold fs-5 bg-primary" style="border-radius: 8px;padding: 5px 10px 5px 10px;">Current Loan Value : <span name="new_loan_amount_board_rate" id="new_loan_amount_board_rate"></span> </label></div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="row mt-4">
						<div class="accordion" id="kt_accordion_item_list">
						    <div class="accordion-item">
						        <h2 class="accordion-header" id="kt_accordion_item_list_header_1">
						            <button class="accordion-button fw-bold fs-6 collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#kt_accordion_item_list_body_1" aria-expanded="false" aria-controls="kt_accordion_item_list_body_1">
						            Pledge Info &emsp; - &emsp; Count &emsp;<span id="span_acc_pl_count"> </span> &emsp; - &emsp; Total Net Weight &emsp;<span id="span_acc_net_weight">  gms</span>
						            </button>
						        </h2>
						        <div id="kt_accordion_item_list_body_1" class="accordion-collapse collapse" aria-labelledby="kt_accordion_item_list_header_1" data-bs-parent="#kt_accordion_item_list">
						            <div class="accordion-body">
						            	<table class="table align-middle table-row-dashed table-striped table-hover fs-7 gy-1 gs-2" id="kt_datatable_dom_positioning_add_loan">
											<thead>
												<tr class="text-start text-muted fw-bold fs-7 gs-0">
										            <th class="min-w-150px">Items</th>
										            <th class="min-w-100px">Description</th>
										            <th class="min-w-80px">Quality</th>
										            <th class="min-w-80px">Purity(%)</th>
										            <th class="min-w-80px">Weight(gms)</th>
										            <th class="min-w-100px">Stone Wgt(gms)</th>
										            <th class="min-w-80px">Less(gms)</th>
										            <th class="min-w-80px">Nt Wgt(gms)</th>
										            <th class="min-w-50px">Damage</th>
										            <th class="min-w-50px">Img</th>
												</tr>
											</thead>
											<tbody class="text-gray-600 fw-semibold" id="tbody_fill_pledge_info">
												
										    </tbody>
										    <tfoot id="tfoot_fill_pledge_total">
												
											</tfoot>
										</table>
						            </div>
						        </div>
						    </div>
						</div>
					</div>
					<div class="d-flex justify-content-center mt-4">
						<!-- <a href=""> -->
						<a class="btn btn-primary me-2" id="btn_detail_view"  target="_blank">Click Here to View Loan History</a>

						<a class="btn btn-primary me-2" id="popup_btn_redo" data-bs-toggle="modal" data-bs-target="#kt_modal_redoloan" class="menu-link flex-stack px-3" > Send for Redo</a>	
						<?php
							if($_SESSION['username']=='K')
						{?>
							<a class="btn btn-primary me-2" data-bs-toggle="modal"  data-bs-target="#kt_modal_approve_loan" id="popup_btn_approve" >Approve</a>
						<?php } else if($_SESSION['username']=='eibsdemo'){ ?>
							<a class="btn btn-primary me-2" id="popup_btn_approve_direct" >Approve</a>
						<?php } ?>
						<!-- <a class="btn btn-primary me-2" id="popup_btn_approve"  > Approve</a> -->
					</div>
				</div>
			</div>
			<!--end::Modal dialog-->
		</div>
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

	
	<!--begin::Modal - Approve loan-->
	<div class="modal fade" id="kt_modal_approve_loan" tabindex="-1" aria-hidden="true">
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
						<!--end::Svg Icon-->
					</div>
					<!--end::Close-->
				</div>
				<!--end::Modal header-->
				<div class="modal-body pt-0 pb-15 px-5 px-xl-20">
					<!--begin::Heading-->
					<div class="mb-10 text-center">
						<h1 class="mb-3">Verification Loan</h1>
					</div>
					<!-- <div class="card rounded-3 w-md-550px"> -->
						<!--begin::Card body-->
						<!-- <div class="card-body p-10 p-lg-20"> -->
							<!-- <form class="form w-100 mb-13" novalidate="novalidate" data-kt-redirect-url="../../demo6/dist/index.html" id="kt_sing_in_two_steps_form"> -->
								<!--begin::Icon-->
								<!-- <div class="text-center mb-10">
									<img alt="Logo" class="mh-125px" src="assets/media/svg/misc/smartphone-2.svg" />
								</div> -->
								<!--end::Icon-->
								<!--begin::Section-->
								<div class="mb-8">
									<center>
									<span style="background-color:#f1416c;border-radius: 8px;padding: 5px 15px 5px 15px;color: white;" id="msg"></span>
									</center><br>
									<!--begin::Label-->
									<input type="hidden" name="approve_bill_no" id="approve_bill_no" value="0">
									<div class="fw-bold text-start text-dark fs-6 mb-1 ms-1">Type your 4 digit security code</div>
									<!--end::Label-->
									<!--begin::Input group-->
									<div class="d-flex flex-wrap flex-stack">
										<input type="text" name="code_1" id="code_1" data-inputmask="'mask': '9', 'placeholder': ''" maxlength="1" class="form-control bg-transparent h-60px w-60px fs-2qx text-center mx-1 my-2" value="" />
										<input type="text" name="code_2" id="code_2" data-inputmask="'mask': '9', 'placeholder': ''" maxlength="1" class="form-control bg-transparent h-60px w-60px fs-2qx text-center mx-1 my-2" value="" />
										<input type="text" name="code_3" id="code_3" data-inputmask="'mask': '9', 'placeholder': ''" maxlength="1" class="form-control bg-transparent h-60px w-60px fs-2qx text-center mx-1 my-2" value="" />
										<input type="text" name="code_4" id="code_4" data-inputmask="'mask': '9', 'placeholder': ''" maxlength="1" class="form-control bg-transparent h-60px w-60px fs-2qx text-center mx-1 my-2" value="" />
										<!-- <input type="text" name="code_5" data-inputmask="'mask': '9', 'placeholder': ''" maxlength="1" class="form-control bg-transparent h-60px w-60px fs-2qx text-center mx-1 my-2" value="" />
										<input type="text" name="code_6" data-inputmask="'mask': '9', 'placeholder': ''" maxlength="1" class="form-control bg-transparent h-60px w-60px fs-2qx text-center mx-1 my-2" value="" /> -->
									</div>
									<!--begin::Input group-->
								</div>
								<!--end::Section-->
								<div class="d-flex align-items-center justify-content-center col-form-label fw-bold fs-5 mb-6">
									<!-- <span style="background-color:#f1416c;border-radius: 8px;padding: 5px 15px 5px 15px;color: white;">Not Matched...</span> -->
									<!-- <span style="background-color:#50cd89;border-radius: 8px;padding: 5px 15px 5px 15px;">Verifying...</span> -->
									<!-- <span style="background-color:#50cd89;border-radius: 8px;padding: 5px 15px 5px 15px;">Matched...</span> -->
								</div>
								<!--begin::Submit-->
								<div class="d-flex flex-center mb-6">
									<p type="button" class="btn btn-secondary me-3" >Cancel</p>
									<p type="button" class="btn btn-primary" onclick="loan_otp_based_approve()">Submit</p>
								</div>
								<!--end::Submit-->
							<!-- </form> -->
							<div class="text-center fw-semibold fs-5">
								<span class="text-muted me-1">Didn’t get the code ?</span>
								<a href="#" class="link-primary fs-5 me-1">Resend</a>
								<!-- <span class="text-muted me-1">or</span>
								<a href="#" class="link-primary fs-5">Call Us</a> -->
							</div>
						<!-- </div> -->
						<!--end::Card body-->
					<!-- </div> -->
				</div>
			</div>
			<!--end::Modal dialog-->
		</div>
	</div>
	<!--end::Modal - Approve loan-->
	<?php $this->load->view("script"); ?>
	<!-- <script src="js/newloan-list.js"></script> -->
	<script >
									        
		$(document).ready(function() 
		{
				
		        $(".move_to").on("click", function () {
		        	// alert("test");
					value=$(this).val();
					// alert(value);
		            $('#filter_form').attr('action', "<?php echo base_url(); ?>loan?page="+value);
		            $("#filter_form").submit();
		            e.preventDefault();
		        });
		    });

	</script>
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
			      $("#kt_datatable_dom_positioning1").kendoTooltip({
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
		<script>
			function get_redo_loan_no(bill_no)
			{
				$("#redo_bill_no").val(bill_no);
			}
			function get_approve_loan_no(bill_no)
			{
				var baseurl= $("#baseurl").val();
				$("#approve_bill_no").val(bill_no);
				$.ajax({
				type: "POST",
				url: baseurl+'loan/loan_approve_otp',
				async: false,
				data: "id="+bill_no,
				dataType: "html",
				success: function(response)
				{
					if(response=='0')
					{
						$('#msg').html("Get OTP from Admin");	
					}
					else
					{
						$('#msg').html("Error sending OTP");
					}
				}
				});
			}
			// function approve_req_otp()
			// {
			// 	var baseurl= $("#baseurl").val();
			// 	var bill_no= $("#approve_bill_no").val();
			// 	$.ajax({
			// 	type: "POST",
			// 	url: baseurl+'loan/loan_approve_otp',
			// 	async: false,
			// 	data: "id="+bill_no,
			// 	dataType: "html",
			// 	success: function(response)
			// 	{
			// 		// alert("Get OTP from Admin");
			// 	}
			// 	});
			// }

		</script>
		<script >
			function loan_direct_approve(bill_no)
			{
				var baseurl= $("#baseurl").val();
				// alert(bill_no);
				$.ajax({
				type: "POST",
				url: baseurl+'loan/loan_direct_approve',
				async: false,
				data: "id="+bill_no,
				dataType: "html",
				success: function(response)
				{
					alert("Loan Approved");
					window.location.reload(true);

					// $('#kt_modal_redoloan').removeClass('show');
					// $('.modal-backdrop').removeClass('show');
				}
				});
			}
		</script>
		<script >
			function loan_otp_based_approve()
			{
				var baseurl= $("#baseurl").val();
				var bill_no= $("#approve_bill_no").val();
				var d1=$('#code_1').val();
				var d2=$('#code_2').val();
				var d3=$('#code_3').val();
				var d4=$('#code_4').val();
				if(d1=='' || d2=='' || d3=='' || d4=='')
				{
					alert("Fill OTP Fully");
					document.getElementById('code_1').focus();
					return false;
				}
				// var x=[d1, d2, d3, d4].join();
				var otp=d1.concat("",d2,d3,d4);
				// alert(otp);
				// alert(bill_no);
				$.ajax({
				type: "POST",
				url: baseurl+'loan/loan_otp_based_approve?',
				async: false,
				data: "id="+bill_no+"&otp="+otp,
				dataType: "html",
				success: function(response)
				{
					if(response==1)
					{
						alert("Loan Approved");
						$('#kt_modal_redoloan').removeClass('show');
						$('.modal-backdrop').removeClass('show');
					}
					else
					{
						alert("OTP mismatch");
						$('#code_1').val('');
						$('#code_2').val('');
						$('#code_3').val('');
						$('#code_4').val('');
						return false;

					}
				}
				});
			}
		</script>
		<script >
			function loan_redo()
			{
				// alert("hi");
				var baseurl= $("#baseurl").val();
				var val= $("#redo_bill_no").val();
				var desc=$('#redo_description').val();

				$.ajax({
				type: "POST",
				url: baseurl+'loan/loan_redo?',
				async: false,
				data: "id="+val+"&redo_description="+desc,
				dataType: "html",
				success: function(response)
				{
					alert("Sent for Update");
					$('#kt_modal_redoloan').removeClass('show');
					$('.modal-backdrop').removeClass('show');
				}
				});
			}

		</script>
<script type="text/javascript">
	function loan_view(val)
	{
				var baseurl= $("#baseurl").val();
				
				$.ajax({
					type: "POST",
					url: baseurl+'loan/loan_view',
					async: false,
					data: "id="+val,
					dataType: "json",
					success: function(response)
					{
						console.log(response);
						
						var result= JSON.stringify(response);
						var un="<?php echo $_SESSION['username'];?>";
						// alert (un);
						// alert(response['lbl_name']);
						$('#lbl_name').html(response['lbl_name']);
						$('#bill_no').val(response['bill_no']);
						$('#lbl_address').html(response['lbl_address']);	
						$('#lbl_phone').html(response['lbl_phone']);
						$('#lbl_rating').html(response['lbl_rating']);
						$('#span_nominee').html(response['span_nominee']);
						$('#div_party_photo').html(response['div_party_photo']);
						$('#lbl_companycode').html(response['lbl_companycode']);
						$('#lbl_interest_type').html(response['lbl_interest_type']);
						$('#div_due_status').html(response['due_status']);
						$('#lbl_duration').html(response['lbl_duration']);
						$('#lbl_loan_date').html(response['lbl_loan_date']);
						$('#lbl_loan_exp_date').html(response['lbl_loan_exp_date']);
						$('#lbl_loan_amt').html(response['lbl_loan_amt']);
						$('#lbl_pledge_count').html(response['lbl_pledge_count']);
						$('#span_acc_pl_count').html(response['lbl_pledge_count']);
						$('#lbl_net_weight').html(response['lbl_net_weight']);
						$('#span_acc_net_weight').html(response['lbl_net_weight']);
						$('#new_loan_amount_board_rate').html((response['curr_loan_value']).toFixed(2));
						$('#div_jewel_photo').html(response['div_jewel_photo']);
						$('#span_prin_actl_amt').html(response['span_prin_actl_amt']);
						$('#span_prin_paid_amt').html(response['span_prin_paid_amt']);
						$('#span_prin_bal_amt').html(response['span_prin_bal_amt']);
						$('#span_intr_actl_amt').html(response['span_intr_actl_amt']);
						$('#span_intr_paid_amt').html(response['span_intr_paid_amt']);
						$('#span_intr_bal_amt').html(response['span_intr_bal_amt']);
						$('#tbody_fill_pledge_info').html(response['tbody_fill']);
						$('#tfoot_fill_pledge_total').html(response['tfoot_str']);
						
						var baseurl= $("#baseurl").val();
						var b= $('#bill_no').val();
						var str=b.replace("/","_");
						var path=baseurl+"loan/loan_detail_view/"+str;
						
						// var btn_redo_click_text="get_redo_loan_no('"+b+"')";
						document.getElementById('btn_detail_view').setAttribute('href', path);
						// document.getElementById('popup_btn_redo').setAttribute('onclick',btn_redo_click_text );
						// $('#kt_modal_viewloan').empty().append(response);
						$('#kt_modal_viewloan').addClass('show');

						if(response['loan_status']<=2)
						{	
							if(response['loan_status']==2){
								document.getElementById("popup_btn_redo").style.display="none";
							}
							else{
								document.getElementById("popup_btn_redo").style.display="block";
							}	
							if(un=='K')
							{
								document.getElementById('popup_btn_approve').style.display="block";
							}
							if(un=='eibsdemo')
							{
								document.getElementById('popup_btn_approve_direct').style.display="block";
							}
						}
						else
						{
							// alert(response['loan_status']);
							document.getElementById("popup_btn_redo").style.display="none";
							document.getElementById("popup_btn_approve_direct").style.display="none";
							document.getElementById("popup_btn_approve").style.display="none";
							// document.getElementById("popup_btn_approve_direct").style.display="none";
						}
					
					}
				});
	}
			
			$('#popup_btn_redo').on('click',function(){
				var b= $('#bill_no').val();

				$('#kt_modal_viewloan').removeClass('show');
				// $('.modal-backdrop').removeClass('show');
				get_redo_loan_no(b);
				// $('.modal-backdrop').addClass('show');
				// $('#kt_modal_redoloan').addClass('show');
				
				});
			$('#popup_btn_approve').on('click',function(){
				var b= $('#bill_no').val();
				var text="get_approve_loan_no('"+b+"')";
				$('#kt_modal_viewloan').removeClass('show');
				get_approve_loan_no(b);
				
				});
			$('#popup_btn_approve_direct').on('click',function(){
				$('#kt_modal_viewloan').removeClass('show');
				$('.modal-backdrop').removeClass('show');
				var b= $('#bill_no').val();
				loan_direct_approve(b);
				});
			
			
		function closeViewModal()
			{
				var baseurl= $("#baseurl").val();
				$('#kt_modal_viewloan').removeClass('show');
				//$("#kt_modal_update_role").css("display", "none");
				$('.modal-backdrop').removeClass('show');
				window.location.href = baseurl+'loan';
			}
	

</script>
	</body>
	<!--end::Body-->
	</html>