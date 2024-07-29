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
									<h1 class="d-flex align-items-center text-dark fw-bold my-1 fs-3">Redemption List
									<!--begin::Separator-->
									<span class="h-20px border-gray-400 border-start ms-3 mx-2"></span>
									<label class="d-flex align-items-center text-primary fw-bold my-1 fs-5">
										<span>Company &emsp;-</span>
										<span>&emsp;<?php
										if($company_filter!='' && $company_filter!='all') 
										{
										$cmp=$this->db->query("select * from COMPANY where COMPANYCODE='".$company_filter."'")->row();
										echo $cmp->COMPANYNAME; }
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
											 echo ($status_filter=='CUSTOMER_CLOSE')? 'Customer Close':'';
											 echo ($status_filter=='COMPANY_CLOSE')? 'Company Close':'';
											 echo ($status_filter=='COMPANY_TRANSFER')? 'Company Transfer':'';
											 echo ($status_filter=='CUSTOMER_TRANSFER')? 'Customer Transfer':'';
											 echo ($status_filter=='CUSTOMER_SALE')? 'Customer Sale':'';
											 echo ($status_filter=='MULTI_JEWEL')? 'Multi Jewel':'';
										 }
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
											<div class="loader">
											</div>
											<div class="row mb-9">
												<div class="col-lg-8">
													<!-- <div class="row">
														<div class="col-lg-4">
															<div class="text-center">
																<label class="form-label fs-2 fw-bold">Total Loans</label>
															</div>
															<div class="text-center">
																<label class="text-success fs-2 fw-bold">30</label>
															</div>
														</div>
														<div class="col-lg-4">
															<div class="text-center">
																<label class="form-label fs-2 fw-bold">Total Loan Amount</label>
															</div>
															<div class="text-center">
																<label class="text-success fs-2 fw-bold">45863.00</label>
															</div>
														</div>
														<div class="col-lg-4">
															<div class="text-center">
																<label class="form-label fs-2 fw-bold">Total Charges</label>
															</div>
															<div class="text-center">
																<label class="text-success fs-2 fw-bold">600.00</label>
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
															<form action="<?php echo base_url();?>redemption" method="POST" >
															<div class="px-7 py-5" data-kt-user-table-filter="form">
																<div class="mb-2">
																	<label class="form-label fs-6 fw-semibold">Company</label>
																	<select class="form-select form-select-solid fw-semibold" data-control="select2" data-close-on-select="true" data-allow-clear="true" multiple="multiple" name="company_filter" id="company_filter">	
																		<option value="all" <?php echo ($company_filter=='all')?'selected':''; ?>>All</option>
																		<?php
																		$res=$this->db->query("select * from COMPANY where ACTIVE='Y'")->result_array();
																		foreach ($res as $clist) 
																		{
																		?>
																			<option value="<?php echo $clist['COMPANYCODE'];?>" <?php echo ($clist['COMPANYCODE']==$company_filter)?'selected':''; ?>><?php echo $clist['COMPANYNAME'];?></option>
																		<?php
																		}
																		?>
																	</select>
																</div>
																<div class="mb-2">
																	<label class="form-label fs-6 fw-semibold">Status</label>
																	<select class="form-select form-select-solid fw-semibold" data-control="select2" data-close-on-select="true" data-allow-clear="true" multiple="multiple" name="redemp_close_status" id="redemp_close_status">	
																		<option value="all" <?php echo ($status_filter=='all')?'selected':''; ?>>All</option>

																		<option value="CUSTOMER_CLOSE" <?php echo ($status_filter=='CUSTOMER_CLOSE')?'selected':''; ?> >Customer Close</option>
																		
																		<option value="CUSTOMER_TRANSFER"  <?php echo ($status_filter=='CUSTOMER_TRANSFER')?'selected':''; ?>>Customer Transfer</option>
																		
																		<option value="COMPANY_CLOSE" <?php echo ($status_filter=='COMPANY_CLOSE')?'selected':''; ?>>Company Close</option>
																		
																		<option value="COMPANY_TRANSFER"  <?php echo ($status_filter=='COMPANY_TRANSFER')?'selected':''; ?>>Company Transfer</option>
																		
																		<option value="MULTI_JEWEL" <?php echo ($status_filter=='MULTI_JEWEL')?'selected':''; ?>>Multi Jewel</option>
																		
																		<option value="CUSTOMER_SALE" <?php echo ($status_filter=='CUSTOMER_SALE')?'selected':''; ?>>Customer Sale</option>

																	</select>
																</div>
																<div class="mb-2">
																	<label class="form-label">Date</label>
																	<select class="form-select form-select-solid" data-control="select2" data-hide-search="true" id="dt_fill_loan_list" name="dt_fill_loan_list" onchange="date_fill_loan_list();">	
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
																		<input class="form-control form-control-solid ps-12" name="from_date_fillter_loan_list" placeholder="From Date" id="from_date_fillter_loan_list" value="<?php echo ($from_date_fillter!='')?$from_date_fillter: date('d-m-Y'); ?>"  />
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
																		<input class="form-control form-control-solid ps-12" name="to_date_fillter_loan_list" placeholder="To Date" id="to_date_fillter_loan_list"  value="<?php echo ($to_date_fillter!='')?$to_date_fillter: date('d-m-Y'); ?>"/>
																	</div>
																</div>
																<div class="d-flex justify-content-end">
																	<button type="reset" class="btn btn-light btn-active-light-primary fw-semibold me-2 px-6" data-kt-menu-dismiss="true" data-kt-user-table-filter="reset">Reset</button>
																	<button type="submit" class="btn btn-primary fw-semibold px-6" data-kt-menu-dismiss="true" data-kt-user-table-filter="filter">Apply</button>
																</div>
															</div>
															</form>
														</div>
														<button type="button" class="btn btn-sm btn-outline btn-outline-solid btn-outline-warning btn-active-light-primary me-3" data-bs-toggle="modal" data-bs-target="#">
															Export</button>
														<a href="<?php echo base_url();?>redemption/redemption_add" target="_blank">
															<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#">
															<span class="svg-icon svg-icon-2">
																<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																	<rect opacity="0.5" x="11.364" y="20.364" width="16" height="2" rx="1" transform="rotate(-90 11.364 20.364)" fill="currentColor" />
																	<rect x="4.36396" y="11.364" width="16" height="2" rx="1" fill="currentColor" />
																</svg>
															</span>New Redemption</button>
														</a>
													</div>
												</div>
											</div>
											<!--begin::Table-->

											<table class="table align-middle table-row-dashed table-striped table-hover fs-7 gy-1 gs-2" id="kt_datatable_dom_positioning">
												<!--begin::Table head-->
												<thead>
													<!--begin::Table row-->
													<tr class="text-start text-muted fw-bold fs-7 gs-0">
														<!-- <th class="min-w-25px">Sno</th> -->
														<th class="min-w-25px">Date</th>
														<th class="min-w-80px">Company</th>
														<th class="min-w-100px">Redemption No</th>
														<!-- <th class="min-w-25px">Expiry Date</th> -->
														<th class="min-w-100px">Party Info</th>
														<th class="min-w-80px">Scheme - Int</th>
														<th class="min-w-50px">J.Type</th>
														<th class="min-w-50px">No of Item</th>
														<th class="min-w-25px">Loan Amt</th>
														<th class="min-w-25px">New Bill No</th>
														<th class="min-w-150px">Status</th>
														<th class="min-w-50px"><span class="text-end">Actions</span></th>
													</tr>
													<!--end::Table row-->
												</thead>
												<!--end::Table head-->
												<!--begin::Table body-->
												<tbody class="text-gray-600 fw-semibold">
													<?php 
													$i=0;
													foreach($redemption_list as $rlist) 
													{
														?>
													
													<tr>
														<!-- <td><?php echo $i+1;?></td> -->
														<td><?php echo $rlist['RETURNDATE']; ?></td>
														<td class="ple1">
														<?php 
														$cmp=$this->db->query("select * from COMPANY WHERE COMPANYCODE='".$rlist['COMPANYCODE']."'")->row();
														echo $cmp->COMPANYNAME;
														?></td>
														<td class="ple1"><?php echo $rlist['BILLNO'];?></td>
														<!-- <td>25/01/2012</td> -->
														<td class="ple1">
															<?php
															if($rlist['RATING']==3)
															{
																$str='<span><i class="fa-solid fa-star fs-7" style="color:#50cd89;"></i></span>';
															}
															elseif($rlist['RATING']==2)
															{
																$str='<span><i class="fa-solid fa-star fs-7" style="color:#ffc700;"></i></span>';
															}
															elseif($rlist['RATING']==1)
															{
																$str='<span><i class="fa-solid fa-star fs-7" style="color:#f1416c;"></i></span>';
															}
															else
															{
																$str='<span><i class="fa-solid fa-star fs-7" style="color:#d2d4dc;"></i></span>';
															}
															echo $str;
															?>
															
															<span class="align-items-center"><?php echo $rlist['CNAME'];?></span>
														</td>
														<td><?php echo $rlist['INTERESTTYPE'];?></td>
														<td><?php echo $rlist['JEWEL_TYPE'];?></td>
														<td><?php 
														$cnt=$this->db->query("select * from  PLEDGEINFO where BILLNO='".$rlist['BILLNO']."'")->result_array();

														echo count((array)$cnt);?></td>
														<td class="ple1"><?php echo $rlist['AMOUNT'];?></td>
														<td class="ple1"><?php echo $rlist['NEWBILLNO'];?></td>
														<td>
															<?php 
															if($rlist['CLOSING_TYPE']=='CUSTOMER_CLOSE')
															{
																$str='<label class="col-form-label fw-semibold fs-7" name="" id="" ><span style="background-color:#ffdf6f;border-radius: 8px;padding: 5px 15px 5px 15px;">Customer Close</span></label>';
															}
															elseif($rlist['CLOSING_TYPE']=='CUSTOMER_TRANSFER')
															{
																$str='<label class="col-form-label fw-semibold fs-7"><span style="background-color:#fed4df;border-radius: 8px;padding: 5px 15px 5px 15px;">Customer Transfer</span></label>';
															}
															elseif($rlist['CLOSING_TYPE']=='COMPANY_CLOSE')
															{
																$str='<label class="col-form-label fw-semibold fs-7"><span style="background-color:#b0dfff;border-radius: 8px;padding: 5px 15px 5px 15px;">Company Close</span></label>';
														}
														elseif($rlist['CLOSING_TYPE']=='CUSTOMER_SALE')
														{
															$str='<label class="col-form-label fw-semibold fs-7"><span style="background-color:#fbe2d5;border-radius: 8px;padding: 5px 15px 5px 15px;">Customer Sale</span></label>';
														}
														elseif($rlist['CLOSING_TYPE']=='MULTI_JEWEL')
														{
															$str='<label class="col-form-label fw-semibold fs-7"><span style="background-color:#a3ff9b;border-radius: 8px;padding: 5px 15px 5px 15px;">Multi Jewel</span></label>';
														}
														elseif($rlist['CLOSING_TYPE']=='COMPANY_TRANSFER')
														{
															$str='<label class="col-form-label fw-semibold fs-7"><span style="background-color:#ec6b6b;border-radius: 8px;padding: 5px 15px 5px 15px;">Company Transfer</span></label>';
														}
														else
														{
															$str='';
														}
														echo $str;
														?>
														</td>
														<td>
															<span class="text-end">
																<a class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm" data-bs-toggle="modal" data-bs-target="#kt_modal_view_redemption" onclick="redemption_view('<?php echo $rlist['BILLNO'] ?>')">
																	<i class="bi bi-eye-fill eyc"></i>
																</a>
																
															</span>
														</td>
													</tr>
													<?php } ?>
												</tbody>
												<!--end::Table body-->
											</table>
									    	<!--end::Table-->
									    	<?php 
												$coun = ceil( $redemption_count/25);
												$c_page = isset($_GET['page']) ? $_GET['page'] : 1;
											?>
											<?php $paging_info = get_paging_info($redemption_count,25,$c_page); ?>

										<form id="filter_form" style="width: 100%;" method="POST" action="" enctype="multipart/form-data" >

											
											<input type="hidden" id="dt_fill_loan_list" name="dt_fill_loan_list"  value="<?php echo $dt_fill; ?>">

										    <input type="hidden" id="from_date_fillter_loan_list" name="from_date_fillter_loan_list" value="<?php echo $from_date_fillter; ?>">
											<input type="hidden" id="to_date_fillter_loan_list" name="to_date_fillter_loan_list" value="<?php echo $to_date_fillter; ?>">
											<input type="hidden" id="company_filter" name="company_filter" value="<?php echo $company_filter; ?>">
											<input type="hidden" id="redemp_close_status" name="redemp_close_status" value="<?php echo $status_filter; ?>">

											
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
	<!--begin::Modal - view loan-->
	<div class="modal fade" id="kt_modal_view_redemption" tabindex="-1" aria-hidden="true">
		
	</div>
	<!--end::Modal - view loan-->


	<!--begin::Modal - view loan-->
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
									<!--begin::Label-->
									<div class="fw-bold text-start text-dark fs-6 mb-1 ms-1">Type your 4 digit security code</div>
									<!--end::Label-->
									<!--begin::Input group-->
									<div class="d-flex flex-wrap flex-stack">
										<input type="text" name="code_1" data-inputmask="'mask': '9', 'placeholder': ''" maxlength="1" class="form-control bg-transparent h-60px w-60px fs-2qx text-center mx-1 my-2" value="" />
										<input type="text" name="code_2" data-inputmask="'mask': '9', 'placeholder': ''" maxlength="1" class="form-control bg-transparent h-60px w-60px fs-2qx text-center mx-1 my-2" value="" />
										<input type="text" name="code_3" data-inputmask="'mask': '9', 'placeholder': ''" maxlength="1" class="form-control bg-transparent h-60px w-60px fs-2qx text-center mx-1 my-2" value="" />
										<input type="text" name="code_4" data-inputmask="'mask': '9', 'placeholder': ''" maxlength="1" class="form-control bg-transparent h-60px w-60px fs-2qx text-center mx-1 my-2" value="" />
										<!-- <input type="text" name="code_5" data-inputmask="'mask': '9', 'placeholder': ''" maxlength="1" class="form-control bg-transparent h-60px w-60px fs-2qx text-center mx-1 my-2" value="" />
										<input type="text" name="code_6" data-inputmask="'mask': '9', 'placeholder': ''" maxlength="1" class="form-control bg-transparent h-60px w-60px fs-2qx text-center mx-1 my-2" value="" /> -->
									</div>
									<!--begin::Input group-->
								</div>
								<!--end::Section-->
								<div class="d-flex align-items-center justify-content-center col-form-label fw-bold fs-5 mb-6">
									<!-- <span style="background-color:#f1416c;border-radius: 8px;padding: 5px 15px 5px 15px;color: white;">Not Matched...</span> -->
									<!-- <span style="background-color:#50cd89;border-radius: 8px;padding: 5px 15px 5px 15px;">Verifying...</span> -->
									<span style="background-color:#50cd89;border-radius: 8px;padding: 5px 15px 5px 15px;">Matched...</span>
								</div>
								<!--begin::Submit-->
								<div class="d-flex flex-center mb-6">
									<button type="button" class="btn btn-secondary me-3">Cancel</button>
									<button type="button" class="btn btn-primary">Submit</button>
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
	<!--end::Modal - view loan-->

	<!--begin::Modal - View Jewel Image-->
		<div class="modal fade" id="kt_modal_view_form_img" tabindex="-1" aria-hidden="true">
			<!--begin::Modal dialog-->
			<div class="modal-dialog modal-xl">
				<!--begin::Modal content-->
				<div class="modal-content rounded">
					<!--begin::Modal header-->
					<div class="modal-header justify-content-end border-0 pb-0">
						<!--begin::Close-->
						<div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal" onclick="CloseModalLoadImage();">
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
							<div class="image-input" data-kt-image-input="true" id="form_miss_doc_img_display">
								<div class="image-input-wrapper w-350px h-350px" style="background-image: url(assets/images/sample_jewel.jpg)"></div>
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
	<?php $this->load->view("script"); ?>
		<input type="hidden" id="baseurl" value="<?php echo base_url(); ?>">
	<!-- <script src="js/newloan-list.js"></script> -->

	<script >
									        
		$(document).ready(function() 
		{
				
		        $(".move_to").on("click", function () {
		        	// alert("test");
					value=$(this).val();
					// alert(value);
		            $('#filter_form').attr('action', "<?php echo base_url(); ?>redemption?page="+value);
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
		<script >
			function redemption_view(val)
			{
				var baseurl= $("#baseurl").val();
				var str=val.replace("/","_");
				
				// alert(baseurl);
				$.ajax({
				type: "POST",
				url: baseurl+'redemption/redemption_view',
				async: false,
				type: "POST",
				data: "bno="+str,
				dataType: "html",
				success: function(response)
				{
					$('#kt_modal_view_redemption').empty().append(response);
					$('#kt_modal_view_redemption').addClass('show');
					$('.modal-backdrop').addClass('show');
					$('#kt_modal_view_redemption').show();
		   		$('.modal-backdrop').show();
				//$("#kt_modal_editdept").css("display", "block");
				}
			});
			}
			
			function closeViewModal()
			{
				var baseurl= $("#baseurl").val();
				$('#kt_modal_view_redemption').removeClass('show');
				$('.modal-backdrop').removeClass('show');
				$('#kt_modal_view_redemption').hide();
		   		$('.modal-backdrop').hide();
					var $body = $(document.body);
				$body.css("overflow", "auto");
				$body.width("auto");
				// window.location.href = baseurl+'redemption';
			}
		</script>
		
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
			// $("#kt_datatable_dom_positioning").DataTable({
			// 	// "ordering": false,
			// 	"aaSorting":[],
			// 	 "language": {
			// 	  "lengthMenu": "Show _MENU_",
			// 	 },
			// 	 "dom":
			// 	  "<'row'" +
			// 	  "<'col-sm-6 d-flex align-items-center justify-conten-start'l>" +
			// 	  "<'col-sm-6 d-flex align-items-center justify-content-end'f>" +
			// 	  ">" +

			// 	  "<'table-responsive'tr>" +

			// 	  "<'row'" +
			// 	  "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
			// 	  "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
			// 	  ">"
			// 	});
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
	</body>
	<!--end::Body-->
	</html>