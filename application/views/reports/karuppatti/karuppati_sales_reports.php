<?php $this->load->view("common");?>
<style>
	.dataTables_scroll
    {
        position: relative;
        overflow: auto;
        min-height: 200px;
        max-height: 200px;/*the maximum height you want to achieve*/
        width: 100%;
    }
  .dataTables_scroll thead{
    position: -webkit-sticky;
    position: sticky;
    top: 0;
    background-color: #ec9629 !important;
    z-index: 2;
  }
  .dataTables_scroll tfoot{
    position: -webkit-sticky;
    position: sticky;
    bottom: 0;
    background-color: #ec9629 !important;
    z-index: 2;
  }
  	.dataTables_scroll_packing_shipping_details
    {
        position: relative;
        overflow: auto;
        min-height: 200px;
        max-height: 200px;/*the maximum height you want to achieve*/
        width: 100%;
    }
  .dataTables_scroll_packing_shipping_details thead{
    position: -webkit-sticky;
    position: sticky;
    top: 0;
    background-color: #ec9629 !important;
    z-index: 2;
  }
  #sale_party_name #sale_sub_party_name {
		  display: none;
			}
	#sale_party_name:hover #sale_sub_party_name {
	  display: block;
	  position: absolute;
	  margin-top: 0em;
	  margin-left: 0.5em !important;
	  color: white;
	  background: black;
	  padding: 3px 13px 3px 10px;
	  border-radius: 5px;
	  font-size: 14px;
	} 
	 #sale_party_email #sale_sub_party_email {
		  display: none;
			}
	#sale_party_email:hover #sale_sub_party_email {
	  display: block;
	  position: absolute;
	  margin-top: 0em;
	  margin-left: 0.5em !important;
	  color: white;
	  background: black;
	  padding: 3px 13px 3px 10px;
	  border-radius: 5px;
	  font-size: 14px;
	} 
	#sale_party_add #party_ship_address_get_tool {
		  display: none;
			}
	#sale_party_add:hover #party_ship_address_get_tool {
	  display: block;
	  position: absolute;
	  margin-top: 0em;
	  margin-left: 0.5em !important;
	  color: white;
	  background: black;
	  padding: 3px 13px 3px 10px;
	  border-radius: 5px;
	  font-size: 14px;
	}

	#sale_party_address #party_address_get_tooltip {
		  display: none;
			}
	#sale_party_address:hover #party_address_get_tooltip {
	  display: block;
	  position: absolute;
	  margin-top: 0em;
	  margin-left: 0.5em !important;
	  color: white;
	  background: black;
	  padding: 3px 13px 3px 10px;
	  border-radius: 5px;
	  font-size: 14px;
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
									<h1 class="d-flex align-items-center text-dark fw-bold my-1 fs-3">Karuppati - Reports
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

											<div class="mb-5 hover-scroll-x">
												<div class="d-grid">
													<ul class="nav nav-tabs flex-nowrap text-nowrap">
														<li class="nav-item">
															<a class="nav-link   btn btn-active-light btn-color-black-800 btn-active-color-primary rounded-bottom-0 fw-bold fs-6"  href="<?php echo base_url(); ?>Reports/karuppatisuppliertotamt">Purchase</a>
														</li>
														<li class="nav-item">
															<a class="nav-link active btn btn-active-light btn-color-black-800 btn-active-color-primary rounded-bottom-0 fw-bold fs-6 " data-bs-toggle="tab" href="javascript:;">Sales</a>
														</li>
													</ul>
												</div>
											</div>

											<div class="tab-content" id="myTabContent">
												<div class="tab-pane fade show active" id="kt_tab_sales" role="tabpanel">									
														<div class="accordion" id="kt_accordion_item_list">															
														    <div class="accordion-item">
														        <h2 class="accordion-header" id="kt_accordion_item_list_header_1">
														            <button class="accordion-button fw-bold fs-6 collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#kt_accordion_item_list_body_1" aria-expanded="false" aria-controls="kt_accordion_item_list_body_1">
														            Filter</button>
														        </h2>
														        <form method="POST" action="<?php echo base_url(); ?>reports/karuppati_sales_reports" >
															        <div id="kt_accordion_item_list_body_1" class="accordion-collapse collapse" aria-labelledby="kt_accordion_item_list_header_1" data-bs-parent="#kt_accordion_item_list">
															            <div class="accordion-body">
															            	<div class="row">
																							<div class="col-lg-4">
																								<div class="row">
																									<label class="col-lg-4 col-form-label fw-semibold fs-6">Supplier</label>
																									<div class="col-lg-8">
																										<select class="form-select form-select-solid" name="report_type" id="report_type" data-control="select2" data-hide-search="false" >
																												<option value="most_sold_products" <?php if($report_type==
																													'most_sold_products'){echo 'selected';} ?>>Sales - Most Sold Products</option>
																												<option value="frequent_buyers" <?php if($report_type==
																													'frequent_buyers'){echo 'selected';} ?>>Sales - Frequent Buyers</option>
																												<option value="idle_customer" <?php if($report_type==
																													'idle_customer'){echo 'selected';} ?>>Sales - Idle Customer</option>
																												<option value="shipping" <?php if($report_type==
																													'shipping'){echo 'selected';} ?>>Shipping</option>
																												<option value="delivery"<?php if($report_type==
																													'delivery'){echo 'selected';} ?>>Delivery</option>
																							      </select>
																									</div>
																								</div>
																							</div>
																							<div class="col-lg-3">
																							<div class="row">
																								<label class="col-lg-5 col-form-label fw-semibold fs-6">Date</label>
																								<div class="col-lg-7">
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
																						<div class="col-lg-5">
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
																						<div class="d-flex align-items-center justify-content-end mt-3">														
																							<button type="submit" class="btn btn-sm btn-outline btn-outline-solid btn-outline-warning btn-active-light-primary me-3">Go</button>
																						</div>
															            </div>
															        </div>
															      </form>
														    </div>
														</div>
													<!-- Most Sold Products table Start -->
													<?php if($report_type=='most_sold_products'){ ?>
														<div class="row mt-4">
															<label class="col-lg-11 col-form-label fw-bold fs-2">Sales - Most Sold Product</label>
															<div class="col-lg-1">
																<button type="button" class="btn btn-sm btn-outline btn-outline-solid btn-outline-warning btn-active-light-primary" id="product_export">Export</button>
															</div>
															<div class="col-lg-12">
																<table class="table align-middle table-row-dashed table-striped fs-7 gy-1 gs-2" id="kt_datatable_sales_most_sold_products">
																	<thead>
									    							<tr class="text-muted fw-bold fs-7 gs-0 align-items-center">
											            		<th class="min-w-80px">Category</th>
											            		<th class="min-w-100px">Product</th>
											            		<th class="min-w-80px">HSN Code</th>
											            		<th class="min-w-50px">Unit (gms)</th>
											            		<th class="min-w-50px">Sale Weight (Kg)</th>
															        <th class="min-w-80px">Sale Price</th>
									    							</tr>
																	</thead>
																	<tbody class="text-gray-600 fw-semibold">
																		<?php if(isset($most_sold_products)){
																						foreach ($most_sold_products as $p => $prdlist) { ?>
																		<tr>
													            <td class="ple1"><?php echo $prdlist['AKSCATEGORY_NAME'] ?$prdlist['AKSCATEGORY_NAME']:'-'; ?></td>
													            <td class="ple1">
																				<div class="d-flex mb-1">
																					<?php if ($prdlist['AKS_PRD_IMG']!=''){ ?>
																					<a class="d-block overlay text-center me-1" href="<?php echo base_url(); ?>assets/images/aks_product_image/<?php echo $prdlist['AKS_PRD_IMG']; ?>" data-fslightbox="lightbox-basic_list">
																					    <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded w-45px h-45px" style="background-image:url('<?php echo base_url(); ?>assets/images/aks_product_image/<?php echo $prdlist['AKS_PRD_IMG']; ?>')">
																					    </div>
																					    <div class="overlay-layer card-rounded bg-dark bg-opacity-25 shadow w-45px h-45px">
																					      <i class="bi bi-eye-fill text-white fs-2"></i>
																					    </div>
																				 	</a>
																					<?php }else{ ?>
																						<a href="javascript:;" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm"  >
											                      	<div class="image-input" data-kt-image-input="true">
																								<div class="image-input-wrapper w-40px h-40px" style="background-image: url(<?php echo base_url() ?>assets/images/karupatti.jpg)"></div>
																							</div>
																					  </a> 
																					<?php }?>
																				 	<div class="d-flex justify-content-center flex-column flex-grow-1">
																						<span class="fw-semibold"><?php echo $prdlist['AKS_PRD_NAME'] ?$prdlist['AKS_PRD_NAME']:'-'; ?></span>
																					</div>
																				 </div>
																			</td>
													            <td><?php echo $prdlist['HSN_CODE'] ?$prdlist['HSN_CODE']:'-'; ?></td>
													            <td>
													            	<span><?php echo $prdlist['AKS_PRD_WT'] ? $prdlist['AKS_PRD_WT']:'-'; ?></span>
													            	<!-- <span>gms</span> -->
													            </td>
													           <td>
													            	<span>
													            		<?php 
																		          $grams     = floatval($prdlist['weight']?$prdlist['weight']:0);
					                                    $kilograms = $grams / 1000; 
					                                    echo  number_format($kilograms,3);
		                                     ?>
			                                  </span>
													            	<!-- <span>Kg</span> -->
													            </td>
													            <td>
													            	<label class="d-block">
																					<i class="fa-solid fa-indian-rupee-sign fs-7 text-dark"></i>&nbsp;
																					<span>
																						<?php
																							  echo $prdlist['saleprice'] ? number_format($prdlist['saleprice']?$prdlist['saleprice']:0,2,'.',','):'0'; 
																						 ?>
																					</span>
																				</label>
													            </td>
														       	</tr>
														       <?php } } ?>														       
																	</tbody>
																</table>
															</div>
														</div>
													<?php } ?>
													<!-- Most Sold Products table End -->
													<!-- Frequent Buyers table Start -->
													<?php if($report_type=='frequent_buyers'){?>
														<div class="row mt-4">
															<label class="col-lg-11 col-form-label fw-bold fs-2">Sales - Frequent Buyers</label>
															<div class="col-lg-1">
																<button type="button" class="btn btn-sm btn-outline btn-outline-solid btn-outline-warning btn-active-light-primary" id="frequent_buyersexport">Export</button>
															</div>
															<div class="col-lg-12">
																<table class="table align-middle table-row-dashed table-striped fs-7 gy-1 gs-2" id="kt_datatable_sales_frequent_buyers_table">
																	<thead>
									    							<tr class="text-muted fw-bold fs-7 gs-0 align-items-center">
											            		<th class="min-w-80px">Date</th>
											            		<th class="min-w-100px">Bill No</th>
											            		<th class="min-w-80px">Party</th>
											            		<th class="min-w-50px">No's</th>
											            		
															        <th class="min-w-80px">Delivery Mode</th>
											            		<th class="min-w-100px">Price /<br>Delivery Charge</th>
															        <th class="min-w-80px">Discount</th>
															        <th class="min-w-100px">Total Price</th>
															        <th class="min-w-50px">Orders</th>
											            		<th class="min-w-80px"><span class="text-end">Actions</span></th>
									    							</tr>
																	</thead>
																	<tbody class="text-gray-600 fw-semibold">
																		<?php if(isset($frequent_buyers)){
																						foreach ($frequent_buyers as $p => $flist) { ?>
																		<tr>
													            <td class="ple1">
													            	<?php
																				     	$date_format  = $this->db->query("SELECT * FROM general_settings ")->row();
																					 	 	$format= $date_format->date_format;
																					 		echo date("$format", strtotime($flist['max_sale_date']));
																				?>
													            </td>
													            <td class="ple1"><?php echo $flist['max_sale_id'] ? $flist['max_sale_id']:'-'; ?></td>
													            <td class="ple1"><?php echo $flist['partyname'] ? $flist['partyname']:'-'; ?></td>
													            <td><?php echo $flist['max_sale_prd_count'] ? $flist['max_sale_prd_count']:'-'; ?></td>
													            
													            <td class="ple1">
													            	<?php 
													            			echo $flist['max_delivery_by'] ? $flist['max_delivery_by']:'-';
													            	 ?>
												            	</td>
													            
													            <td>
													            	<label>
																					<i class="fa-solid fa-indian-rupee-sign fs-7 text-dark"></i>&nbsp;
																					<span> 
																						<?php
																							  echo $flist['max_sale_prd_tot_amt'] ? number_format($flist['max_sale_prd_tot_amt']?$flist['max_sale_prd_tot_amt']:0,2,'.',','):'0'; 
																						 ?>
																					</span>
																				</label> /
																				<label class="d-block">
																					<i class="fa-solid fa-indian-rupee-sign fs-7 text-dark"></i>&nbsp;
																					<span>
																						<?php
																							  echo $flist['max_shipment_charges'] ? number_format($flist['max_shipment_charges']?$flist['max_shipment_charges']:0,2,'.',','):'0'; 
																						 ?>
																					</span>
																				</label>
													            </td>
													            <td>
													            	<label class="d-block">
																					<i class="fa-solid fa-indian-rupee-sign fs-7 text-dark"></i>&nbsp;
																					<span>
																						<?php
																							  echo $flist['max_sale_dis_amt'] ? number_format($flist['max_sale_dis_amt']?$flist['max_sale_dis_amt']:0,2,'.',','):'0'; 
																						 ?>
																					</span>
																				</label>
													            </td>
													            <td>
													            	<label>
																					<i class="fa-solid fa-indian-rupee-sign fs-7 text-dark"></i>&nbsp;
																					<?php
																							  echo $flist['max_sale_net_amt'] ? number_format($flist['max_sale_net_amt']?$flist['max_sale_net_amt']:0,2,'.',','):'0'; 
																						 ?>
																				</label>
													            </td>
													            <td><label class="badge badge-info fw-bold fs-7" ><?php echo $flist['totalorders'] ? $flist['totalorders']:'-'; ?></label></td>
													            <td>
																				<span class="text-end">
																					<a href="javascript:;" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm" data-bs-toggle="modal" data-bs-target="#kt_modal_view_sale" onclick="view_sale('<?php echo $flist['sid']; ?>')">
																					<i class="bi bi-eye-fill eyc"></i>
																					</a>
																				</span>
																			</td>
														       	</tr>
														       <?php }} ?>
														       
																	</tbody>
																</table>
															</div>
														</div>
													<?php } ?>
													<!-- Frequent Buyers table End -->
													<!-- Idle Customer table Start -->
													<?php if($report_type=='idle_customer'){ ?>
														<div class="row mt-4">
															<label class="col-lg-11 col-form-label fw-bold fs-2">Sales - Idle Customers</label>
															<div class="col-lg-1">
																<button type="button" class="btn btn-sm btn-outline btn-outline-solid btn-outline-warning btn-active-light-primary" id="idelexport">Export</button>
															</div>
															<div class="col-lg-12">
																<table class="table align-middle table-row-dashed table-striped fs-7 gy-1 gs-2" id="kt_datatable_sales_idle_customer_table">
																	<thead>
									    							<tr class="text-muted fw-bold fs-7 gs-0 align-items-center">
											            		<th class="min-w-80px">Date</th>
											            		<th class="min-w-100px">Bill No</th>
											            		<th class="min-w-80px">Party</th>
											            		<th class="min-w-50px">No's</th>
															        <th class="min-w-80px">Delivery Mode</th>
											            		<th class="min-w-100px">Price /<br>Delivery Charge</th>
															        <th class="min-w-80px">Discount</th>
															        <th class="min-w-100px">Total Price</th>
															        <th class="min-w-80px">Days</th>
											            		<th class="min-w-80px"><span class="text-end">Actions</span></th>
									    							</tr>
																	</thead>
																	<tbody class="text-gray-600 fw-semibold">
																		<?php if(isset($idle_customer)){
																						foreach ($idle_customer as $id => $idlist) { ?>
																		<tr>
													            <td class="ple1">
													            	<?php
																				     	$date_format  = $this->db->query("SELECT * FROM general_settings ")->row();
																					 	 	$format= $date_format->date_format;
																					 		echo date("$format", strtotime($idlist['max_sale_date']));
																				?>
													            </td>
													            <td class="ple1"><?php echo $idlist['max_sale_id'] ? $idlist['max_sale_id']:'-'; ?></td>
													            <td class="ple1"><?php echo $idlist['partyname'] ? $idlist['partyname']:'-'; ?></td>
													            <td><?php echo $idlist['max_sale_prd_count'] ? $idlist['max_sale_prd_count']:'-'; ?></td>
													            
													            <td class="ple1">
													            	<?php 
													            			echo $idlist['max_delivery_by'] ? $idlist['max_delivery_by']:'-';
													            	 ?>
												            	</td>
													            
													            <td>
													            	<label>
																					<i class="fa-solid fa-indian-rupee-sign fs-7 text-dark"></i>&nbsp;
																					<span> 
																						<?php
																							  echo $idlist['max_sale_prd_tot_amt'] ? number_format($idlist['max_sale_prd_tot_amt']?$idlist['max_sale_prd_tot_amt']:0,2,'.',','):'0'; 
																						 ?>
																					</span>
																				</label> /
																				<label class="d-block">
																					<i class="fa-solid fa-indian-rupee-sign fs-7 text-dark"></i>&nbsp;
																					<span>
																						<?php
																							  echo $idlist['max_shipment_charges'] ? number_format($idlist['max_shipment_charges']?$idlist['max_shipment_charges']:0,2,'.',','):'0'; 
																						 ?>
																					</span>
																				</label>
													            </td>
													            <td>
													            	<label class="d-block">
																					<i class="fa-solid fa-indian-rupee-sign fs-7 text-dark"></i>&nbsp;
																					<span>
																						<?php
																							  echo $idlist['max_sale_dis_amt'] ? number_format($idlist['max_sale_dis_amt']?$idlist['max_sale_dis_amt']:0,2,'.',','):'0'; 
																						 ?>
																					</span>
																				</label>
													            </td>
													            <td>
													            	<label>
																					<i class="fa-solid fa-indian-rupee-sign fs-7 text-dark"></i>&nbsp;
																					<?php
																							  echo $idlist['max_sale_net_amt'] ? number_format($idlist['max_sale_net_amt']?$idlist['max_sale_net_amt']:0,2,'.',','):'0'; 
																						 ?>
																				</label> 
													            </td>
													            <td>
													            	<label class="badge badge-danger fw-bold fs-7" style="background-color: red !important;">
													            		<?php echo $idlist['diffdays'] ? $idlist['diffdays']:'-'; ?></label>
													            </td>
													            <td>
																				<span class="text-end">
																					<a href="javascript:;" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm" data-bs-toggle="modal" data-bs-target="#kt_modal_view_sale" onclick="view_sale('<?php echo $idlist['sid']; ?>')">
																					<i class="bi bi-eye-fill eyc"></i>
																					</a>
																				</span>
																			</td>
														       	</tr>
														       <?php }} ?>
																	</tbody>
																</table>
															</div>
														</div>
													<?php } ?>
													<!-- Idle Customer table End -->
													<!-- Shipping delivery person table Start -->
													<?php if($report_type=='shipping'){?>
														<div class="row mt-4">
															<label class="col-lg-11 col-form-label fw-bold fs-2">Shipping - Delivery Person</label>
															<div class="col-lg-1">
																<button type="button" class="btn btn-sm btn-outline btn-outline-solid btn-outline-warning btn-active-light-primary" id="shippingexport">Export</button>
															</div>
															<div class="col-lg-12">
																<!-- <table class="table align-middle table-row-dashed table-striped fs-7 gy-1 gs-2" id="kt_datatable_shipping_delivery_person_table">
																	<thead>
									    							<tr class="text-muted fw-bold fs-7 gs-0 align-items-center">
											            		<th class="min-w-80px">Date</th>
											            		<th class="min-w-100px">Bill No</th>
											            		<th class="min-w-80px">Party</th>
											            		<th class="min-w-50px">No's</th>
															        <th class="min-w-80px">Delivery Mode</th>
											            		<th class="min-w-100px">Price /<br>Delivery Charge</th>
															        <th class="min-w-80px">Discount</th>
															        <th class="min-w-100px">Total Price /<br>Grand Price</th>
											            		<th class="min-w-80px"><span class="text-end">Actions</span></th>
									    							</tr>
																	</thead>
																	<tbody class="text-gray-600 fw-semibold">
																		<tr>
													            <td>15/02/2024</td>
													            <td>AKSS-064/24</td>
													            <td class="ple1">D THANGAVELU</td>
													            <td>1</td>
													            <td class="ple1">ST COURIER</td>
													            <td>
													            	<label>
																					<i class="fa-solid fa-indian-rupee-sign fs-7 text-dark"></i>&nbsp;
																					<span>1,950.00</span>
																				</label>
																				<label class="d-block">
																					<i class="fa-solid fa-indian-rupee-sign fs-7 text-dark"></i>&nbsp;
																					<span>50.00</span>
																				</label>
													            </td>
													            <td>
													            	<label class="d-block">
																					<i class="fa-solid fa-indian-rupee-sign fs-7 text-dark"></i>&nbsp;
																					<span>0.00</span>
																				</label>
													            </td>
													            <td>
													            	<label>
																					<i class="fa-solid fa-indian-rupee-sign fs-7 text-dark"></i>&nbsp;
																					<span>2,000.00</span>
																				</label>
																				<label class="d-block">
																					<i class="fa-solid fa-indian-rupee-sign fs-7 text-dark"></i>&nbsp;
																					<span>2,100.00</span>
																				</label>
													            </td>
													            <td>
																				<span class="text-end">
																					<a href="javascript:;" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm" title="View">
																						<i class="bi bi-eye-fill eyc"></i>
																					</a>
																				</span>
																			</td>
														       	</tr>
														       	<tr>
													            <td>14/02/2024</td>
													            <td>AKSS-063/24</td>
													            <td class="ple1">VK TESTING</td>
													            <td>2</td>
													            <td class="ple1">Direct</td>
													            <td>
													            	<label>
																					<i class="fa-solid fa-indian-rupee-sign fs-7 text-dark"></i>&nbsp;
																					<span>2,340.00</span>
																				</label>
																				<label class="d-block">
																					<i class="fa-solid fa-indian-rupee-sign fs-7 text-dark"></i>&nbsp;
																					<span>0.00</span>
																				</label>
													            </td>
													            <td>
													            	<label class="d-block">
																					<i class="fa-solid fa-indian-rupee-sign fs-7 text-dark"></i>&nbsp;
																					<span>40.00</span>
																				</label>
													            </td>
													            <td>
													            	<label>
																					<i class="fa-solid fa-indian-rupee-sign fs-7 text-dark"></i>&nbsp;
																					<span>2,300.00</span>
																				</label>
																				<label class="d-block">
																					<i class="fa-solid fa-indian-rupee-sign fs-7 text-dark"></i>&nbsp;
																					<span>2,415.00</span>
																				</label>
													            </td>
													            <td>
																				<span class="text-end">
																					<a href="javascript:;" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm" title="View">
																						<i class="bi bi-eye-fill eyc"></i>
																					</a>
																				</span>
																			</td>
														       	</tr>
																	</tbody>
																</table> -->
																<table class="table align-middle table-row-dashed table-striped fs-7 gy-1 gs-2" id="kt_datatable_shipping_delivery_person_table">
																	<thead>
									    							<tr class="text-muted fw-bold fs-7 gs-0 align-items-center">
									    								<th class="min-w-80px">Delivery Person</th>
											            		<th class="min-w-80px">Date</th>
											            		<th class="min-w-100px">Bill No</th>
											            		<th class="min-w-50px">No's</th>
											            		<th class="min-w-100px">Actual Delivery Charge</th>
															        <th class="min-w-100px">Total Price</th>
											            		<th class="min-w-80px"><span class="text-end">Actions</span></th>
									    							</tr>
																	</thead>
																	<tbody class="text-gray-600 fw-semibold">
																		<?php if(isset($shipping)){
																						foreach ($shipping as $p => $shlist) { ?>
																		<tr>													            
																		  <td class="ple1">
													            	<?php 
													            			echo $shlist['delivery_by'] ? $shlist['delivery_by']:'-';
													            	 ?>
												            	</td>
													           <td class="ple1">
													            	<?php
																				     	$date_format  = $this->db->query("SELECT * FROM general_settings ")->row();
																					 	 	$format= $date_format->date_format;
																					 		echo date("$format", strtotime($shlist['sale_date']));
																				?>
													            </td>
													            
													            <td>
													            	<?php
																				     	echo $shlist['sale_id'] ? $shlist['sale_id']:'-';
																				?>
																			</td>
																			<td>
													            	<?php
																				     	echo $shlist['sale_prd_count'] ? $shlist['sale_prd_count']:'-';
																				?>
																			</td>
													            <td>
																				<label>
																					<i class="fa-solid fa-indian-rupee-sign fs-7 text-dark"></i>&nbsp;
																							<?php
																							  echo $shlist['actual_delivery_charge'] ? number_format($shlist['actual_delivery_charge']?$shlist['actual_delivery_charge']:0,2,'.',','):'0'; 
																						 	?>
																				</label>
													            </td>
													            <td>
													            	<label class="d-block">
																					<i class="fa-solid fa-indian-rupee-sign fs-7 text-dark"></i>&nbsp;
																							<?php
																							  echo $shlist['sale_net_amt'] ? number_format($shlist['sale_net_amt']?$shlist['sale_net_amt']:0,2,'.',','):'0'; 
																						 	?>
																				</label>
													            </td>
													            <td>
																				<span class="text-end">
																					<a href="javascript:;" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm" data-bs-toggle="modal" data-bs-target="#kt_modal_view_sale" onclick="view_sale('<?php echo $shlist['sid']; ?>')">
																					<i class="bi bi-eye-fill eyc"></i>
																					</a>
																				</span>
																			</td>
														       	</tr>
														       <?php } } ?>
																	</tbody>
																</table>
															</div>
														</div>
													<?php } ?>
													<!-- Shipping delivery person table End -->
													<!-- Delivery Table Start -->
													<?php if($report_type=='delivery'){?>
														<div class="row mt-4">
															<label class="col-lg-11 col-form-label fw-bold fs-2">Delivered Orders</label>
															<div class="col-lg-1">
																<button type="button" class="btn btn-sm btn-outline btn-outline-solid btn-outline-warning btn-active-light-primary" id="deliveryexport">Export</button>
															</div>
															<div class="col-lg-12">
																<table class="table align-middle table-row-dashed table-striped fs-7 gy-1 gs-2" id="kt_datatable_delivery_table">
																	<thead>
									    							<tr class="text-muted fw-bold fs-7 gs-0 align-items-center">
											            		<th class="min-w-80px">Date</th>
											            		<th class="min-w-100px">Bill No</th>
											            		<th class="min-w-80px">Party</th>
											            		<th class="min-w-50px">No's</th>
															        <th class="min-w-80px">Delivery Mode</th>
											            		<th class="min-w-100px">Price /<br>Delivery Charge</th>
															        <th class="min-w-80px">Discount</th>
															        <th class="min-w-100px">Total Price</th>
											            		<th class="min-w-80px"><span class="text-end">Actions</span></th>
									    							</tr>
																	</thead>
																	<tbody class="text-gray-600 fw-semibold">
																		<?php if(isset($delivery)){
																						foreach ($delivery as $p => $dlist) { ?>
																		<tr>
													           <td class="ple1">
													            	<?php
																				     	$date_format  = $this->db->query("SELECT * FROM general_settings ")->row();
																					 	 	$format= $date_format->date_format;
																					 		echo date("$format", strtotime($dlist['sale_date']));
																				?>
													            </td>
													            
													            <td>
													            	<?php
																				     	echo $dlist['sale_id'] ? $dlist['sale_id']:'-';
																				?>
																			</td>
																			 <td>
													            	<?php
																				     	echo $dlist['sale_party'] ? $dlist['sale_party']:'-';
																				?>
																			</td>
																			<td>
													            	<?php
																				     	echo $dlist['sale_prd_count'] ? $dlist['sale_prd_count']:'-';
																				?>
																			</td>
													            <td class="ple1">
																				<?php 
																				if($dlist['sale_deliverymode']=='Direct'){

																						echo ucfirst($dlist['sale_deliverymode']?$dlist['sale_deliverymode']:'');
																				}
																				else{
																					echo ucfirst($dlist['delivery_by']?$dlist['delivery_by']:'-');
																				}
																				?> 
																			</td>
																			
																			<td class="ple1">
																				<i class="fa-solid fa-indian-rupee-sign fs-7 text-dark"></i>&nbsp;
																					<?php $sale_amt = $dlist['sale_prd_tot_amt']?$dlist['sale_prd_tot_amt']:0; echo number_format($sale_amt,2,'.',',');?> /
																					<br>
																					<span> 
																						<?php 
																							if($dlist['sale_deliverymode']=='Direct'){

																							echo '<i class="fa-solid fa-indian-rupee-sign fs-7 text-dark"></i>&nbsp;'.number_format(0,2,'.',',');
																							}
																							else{?>

																								<i class="fa-solid fa-indian-rupee-sign fs-7 text-dark"></i>&nbsp;
																								<?php $sale_amt = $dlist['shipment_charges']; echo number_format($sale_amt,2,'.',',');?>
																							<?php } ?> 
																					</span>
																			</td>
																			<td class="ple1">
																				<i class="fa-solid fa-indian-rupee-sign fs-7 text-dark"></i>&nbsp;
																					<?php $sale_amt = $dlist['sale_dis_amt']?$dlist['sale_dis_amt']:0; echo number_format($sale_amt,2,'.',',');?> 
																				 
																			</td>
																			<td class="ple1">

																				<i class="fa-solid fa-indian-rupee-sign fs-7 text-dark"></i>&nbsp;
																				<?php 

																					  $price = floatval($dlist['sale_net_amt']?$dlist['sale_net_amt']:0);
																					  $ship  = floatval($dlist['shipment_charges']?$dlist['shipment_charges']:0);
																					  $dis   = floatval($dlist['sale_dis_amt']?$dlist['sale_dis_amt']:0);
																					  $gst   = 5;
																						$gst_amount  = ($gst * $price) / 100;
																						$gtotal      = $price + $gst_amount;
																						$tot_prices  = $price;

																				?>
																				<?php $tot_price = $tot_prices; echo number_format($tot_price,2,'.',',');?> 
																				<!-- /
																				<br>
																				<i class="fa-solid fa-indian-rupee-sign fs-7 text-dark"></i>&nbsp;
																				< ?php $gst_amt = $gtotal; echo number_format($gst_amt,2,'.',',');?> -->
																			</td>
																			<td>
																				<span class="text-end">
																					<a href="javascript:;" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm" data-bs-toggle="modal" data-bs-target="#kt_modal_view_sale" onclick="view_sale('<?php echo $dlist['sid']; ?>')">
																					<i class="bi bi-eye-fill eyc"></i>
																					</a>
																				</span>
																			</td>
														       <?php } } ?>
														       	
																	</tbody>
																</table>
															</div>
														</div>
													<?php } ?>
													<!-- Delivery Table End -->
												</div>
										</div>
										<!--begin::Modal - New 	purchase-->
										<div class="modal fade" id="kt_modal_new_purchase" tabindex="-1" aria-hidden="true">
												<!--begin::Modal dialog-->
												<div class="modal-dialog modal-xl">
													<!--begin::Modal content-->
													<div class="modal-content rounded">
														<!--begin::Modal header-->
														<div class="modal-header justify-content-end border-0 pb-0">
															<!--begin::Close-->
															<div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal" onclick="" >
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
														<form name="company_view_form" id="company_view_form" method="POST" action="<?php echo base_url(); ?>Aks_purchase/aks_view_purchase" enctype="multipart/form-data" >
														<div class="modal-body pt-0 pb-15 px-5 px-xl-20">
															<!--begin::Heading-->
															<div class="mb-10 text-center">
																<h1>View Purchase</h1>	
															</div>
															<!--end::Heading-->
																  <div class="row">
																  	<div class="col-lg-4">
																  		<div class="row">
																  			<div class="col-lg-3">
																  				<label class=" col-form-label fw-semibold fs-6">Date</label>
																  			</div>
																  			<div class="col-lg-9">
																  				<label class="col-form-label fw-bold fs-5"><sapn id="pur_date"></sapn></label>	
																  			</div>
																  		</div>
																  	</div>
																  	<div class="col-lg-4">
																  		<div class="row">
																  			<div class="col-lg-4">
																  				<label class=" col-form-label fw-semibold fs-6">Purchase Id</label>
																  			</div>
																  			<div class="col-lg-8">
																  				<label class="col-form-label fw-bold fs-5"><sapn id="pur_id"></sapn></label>	
																  			</div>
																  		</div>
																  	</div>
																  	<div class="col-lg-4">
																  		<div class="row">
																  			<div class="col-lg-4">
																  				<label class=" col-form-label fw-semibold fs-6">Billed By</label>
																  			</div>
																  			<div class="col-lg-8">
																  				<label class="col-form-label fw-bold fs-5"><sapn id="billed_by"></sapn></label>	
																  			</div>
																  		</div>
																  	</div>
																  </div>
																  <div class="row">
																  	<div class="col-lg-4">
																  		<div class="row">
																  			<div class="col-lg-3">
																  				<label class=" col-form-label fw-semibold fs-6">Supplier</label>
																  			</div>
																  			<div class="col-lg-9">
																  				<label class="col-form-label fw-bold fs-5"><sapn id="sup_name"></sapn></label>	
																  			</div>
																  		</div>
																  	</div>
																  	<div class="col-lg-4">
																  		<div class="row">
																  			<div class="col-lg-4">
																  				<label class=" col-form-label fw-semibold fs-6">Total Items</label>
																  			</div>
																  			<div class="col-lg-8">
																  				<label class="col-form-label fw-bold fs-5"><sapn id="total_item"></sapn></label>	
																  			</div>
																  		</div>
																  	</div>
																  	<div class="col-lg-4">
																  		<div class="row">
																  			<div class="col-lg-4">
																  				<label class=" col-form-label fw-semibold fs-6">Total Price</label>
																  			</div>
																  			<div class="col-lg-8">
																  				<label class="col-form-label fw-bold fs-5"><sapn id="net_amount"></sapn></label>	
																  			</div>
																  		</div>
																  	</div>
																  </div>
																	 
																   	<div class="row mt-4">
																	   	<table id="view_table_scroll" class="table align-middle table-row-dashed table-striped table-hover fs-7 gy-1 gs-2 dataTable no-footer">
																			<thead>
																				<tr class="text-start text-muted fw-bold fs-7 gs-0">
																					<th class="min-w-25px">Sno</th>
																			  	<th class="min-w-50px">Product</th>
																					<th class="min-w-25px">Weight (gms)</th>
																					<th class="min-w-50px">Price Per (gms)</th>
																					<th class="min-w-50px">Price</th>
																				</tr>
																			</thead>
																			 <tbody class="text-gray-600 fw-semibold" id="view_table">

																			</tbody>	
																		</table>
																   	</div>
																    <div class="row mt-4">
																	 	<div class="col-lg-4">
																	 		<div class="row">
																	 			<div class="col-lg-6">
																	 				<label class="col-form-label fw-semibold fs-6">Total Amount</label>
																	 			</div>
																	 			<div class="col-lg-6">
																	 				<label class="col-form-label fw-bold fs-5" id="total_amount"></label>
																	 			</div>
																	 		</div>
																	 	</div>
																	 	<div class="col-lg-4">
																	 		<div class="row">
																	 			<div class="col-lg-6">
																	 				<label class="col-form-label  fw-semibold fs-6">Discount</label>
																	 			</div>
																	 			<div class="col-lg-6">
																	 				<label class="col-form-label fw-bold fs-5" id="discount"></label>
																	 			</div>
																	 		</div>
																	 	</div>
																	 	<div class="col-lg-4">
																	 		<div class="row">
																	 			<div class="col-lg-6">
																	 				<label class="col-form-label  fw-semibold fs-6">Net Amount</label>
																	 			</div>
																	 			<div class="col-lg-6">
																	 				<label class="col-form-label fw-bold fs-5" id="net_amount1"></label>
																	 			</div>
																	 		</div>
																	 	</div>								
																	</div>
																    <div class="row mt-2">
															   			<label class="col-form-label fw-bold fs-2 mt-4">Payment Details</label>
															   			<table class="table align-middle table-row-dashed table-striped table-hover fs-7 gy-1 gs-2 dataTable no-footer">
																			<thead>
																			   <tr class="text-start text-muted fw-bold fs-7 gs-0">
																					<th class="min-w-50px">Payment Mode</th>
																					<th class="min-w-100px">Amount</th>
																					<th class="min-w-100px">Reference No</th>
																					<th class="min-w-100px">Bank</th>
																					<th class="min-w-100px">Details</th>
																				</tr>    
																			</thead>
																			<tbody class="text-gray-600 fw-semibold" id="table_tr_payment">
													   						</tbody>
													   					</table>
																 	    <div class="row mt-4">
																			<div class="col-lg-6 text-start">
																				<label class="col-form-label fw-bold fs-2">Paid Amount &emsp;</label>
																				<label class="col-form-label fw-bold fs-3" id="paid_amount"></label>
																			</div>
																			<div class="col-lg-6 text-center">
																				<label class="col-form-label fw-bold fs-2">Balance Amount &emsp;</label>
																				<label class="col-form-label fw-bold fs-3" id="balance_amount"></label>
																			</div>
																		</div>
																	</div> 
														</div>
														<!--end::Modal body-->
													</div>
													<!--end::Modal content-->
												</div>
												<!--end::Modal dialog-->
										</div>
										<!--END model--->
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
		<div class="modal fade" id="kt_modal_view_sale" tabindex="-1" aria-hidden="true"  aria-hidden="true" data-bs-keyboard="false" data-bs-backdrop="static">
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
				<div class="modal-body pt-0 pb-15 px-5 px-xl-20">
					<!--begin::Heading-->
					<div class="mb-10 text-center">
						<h1>View Sales</h1>	
					</div>
					<!--end::Heading-->
					<div class="row">
						<div class="col-lg-8">
							<div class="px-4" style="border-radius: 10px;padding-bottom: 20px;box-shadow: 0 5px 10px #00002947;">
								<div class="row">
									<label class="col-lg-12 text-center fw-bold fs-4 mt-1">Product Details</label>
									<label class="col-lg-2 col-form-label fw-semibold fs-6">Date</label>
									<label class="col-lg-4 col-form-label fw-bold fs-5"><sapn id="sale_date"></sapn></label>
									<label class="col-lg-2 col-form-label fw-semibold fs-6">Sale ID</label>
									<label class="col-lg-4 col-form-label fw-bold fs-5"><sapn id="sale_id"></sapn></label>
									<label class="col-lg-2 col-form-label fw-semibold fs-6">Total Items</label>
									<label class="col-lg-4 col-form-label fw-bold fs-5"><sapn id="total_itemsale"></sapn></label>
									<label class="col-lg-2 col-form-label fw-semibold fs-6">Total Price</label>
									<label class="col-lg-4 col-form-label fw-bold fs-5">
										<sapn id="net_amountsale"></sapn>
									</label>
								</div>
							</div>
							<div class="px-4 mt-4" style="border-radius: 10px;padding-bottom: 20px;box-shadow: 0 5px 10px #00002947;min-height: 275px !important;max-height: 275px !important;">
								<div class="row">
									<div class="col-lg-12 mt-4">
										<div id="sale_table_ajax">

										</div>								

									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-3 col-form-label text-center">
									<label class="fw-bold fs-5">Total Amount</label>
									<label class="d-block fw-bold fs-5">
										<span id="total_amountsale"></span>
									</label>
								</div>
								<div class="col-lg-3 col-form-label text-center">
									<label class="fw-bold fs-5">Delivery Charge</label>
									<label class="d-block fw-bold fs-5">
										<sapn id="deliver_charge"></sapn>
									</label>
								</div>
								<div class="col-lg-3 col-form-label text-center">
									<label class="fw-bold fs-5">Discount</label>
									<label class="d-block fw-bold fs-5">
										<sapn id="discountsale"></sapn>
									</label>
								</div>
								<div class="col-lg-3 col-form-label text-center">
									<label class="fw-bold fs-5">Net Amount</label>
									<label class="d-block fw-bold fs-5">
										<sapn id="net_amount1sale"></sapn>
									</label>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-3 col-form-label text-center">
									<label class="fw-bold fs-5">Delivery Details</label>
									<label class="d-block fw-bold fs-5"><sapn id="del_mode"></sapn></label>
								</div>

								<div class="col-lg-3 col-form-label text-center">
									<label class="fw-bold fs-5">Delivery By</label>
									<label class="d-block fw-bold fs-5"><sapn id="delivery_by"></sapn></label>
								</div>
								<div class="col-lg-3 col-form-label text-center">
									<label class="fw-bold fs-5">Tracking ID</label>
									<label class="d-block fw-bold fs-5"><sapn id="label_tracking_id"></label>
								</div>
								<div class="col-lg-3 col-form-label text-center">
									<label class="fw-bold fs-5">Act.Delivery Char</label>
									<label class="d-block fw-bold fs-5"><sapn id="label_act_del_char">-</label>
								</div>

							</div>
				    </div>
						<div class="col-lg-4">
							<div class="px-4" style="border-radius: 10px;padding-bottom: 20px;box-shadow: 0 5px 10px #00002947;min-height: 427px !important;max-height: 427px !important;">
								<div class="row">
									<label class="col-lg-12 text-center fw-bold fs-4 mt-1">Party Details</label>
									<label class="col-lg-3 col-form-label fw-semibold fs-6">Party</label>
									<label class="col-lg-9 col-form-label fw-bold fs-5" id="sale_party_name">
										<sapn id="sale_party"></sapn>
										<!-- tooltip max text count 18 + ... -->
										<span id="sale_sub_party_name"></span>
									</label>
									<label class="col-lg-3 col-form-label fw-semibold fs-6">Phone</label>
									<label class="col-lg-9 col-form-label fw-bold fs-5" id="party_mobile"></label>
									<label class="col-lg-3 col-form-label fw-semibold fs-6">Email</label>
									<label class="col-lg-9 col-form-label fw-bold fs-5" id="sale_party_email">
										<span id="party_email"></span><!-- tooltip max text count 18 + ... -->
										<span id="sale_sub_party_email">-</span>
									</label>
									<label class="col-lg-12 col-form-label fw-semibold fs-6 mb-1 py-0">Billing Address</label>
										<label class="col-lg-12 fw-bold fs-5 px-6" id="sale_party_address">
										<span id="party_address_get"></span><!-- tooltip max text count 18 + ... -->
										<span id="party_address_get_tooltip">-</span>
									</label>
									<label class="col-lg-12 col-form-label fw-semibold fs-6 mt-3 mb-1 py-0">Shipping Address</label>
									<label class="col-lg-12 fw-bold fs-5 px-6" id="sale_party_add">
										<span id="party_ship_address_get"></span><!-- tooltip max text count 50 + ... -->
										<span id="party_ship_address_get_tool">-</span>
									</label>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-12 col-form-label">
									<label class="fw-semibold fs-5">Remarks</label>
									<div class="scroll-y mh-80px my-3 fw-semibold fs-5"><span id="remarks_get"></span></div>
								</div>
							</div>
					    </div>
					</div>
					<div class="row">
						<label class="col-lg-12 col-form-label fw-bold fs-4">Payment Details</label>
						<div class="col-lg-12">
							<table class="table align-middle table-row-dashed table-striped table-hover fs-7 gy-1 gs-2" id="kt_datatable_view_table_payment">
								<thead>
									<tr class="text-start text-muted fw-bold fs-7 gs-0">
								  	    <th class="min-w-100px">Mode</th>
										<th class="min-w-100px">Amount</th>
										<th class="min-w-100px">Party Bank / Ref.No</th>
										<th class="min-w-100px">Ref.No / Bank</th>
										<th class="min-w-200px">Details</th>
									</tr>
								</thead>
								<tbody class="text-gray-600 fw-semibold fs-7" id="sale_table_payment">
					   							
	   						</tbody>
							</table>
						</div>
					</div>
					<div class="row mt-3">
						<label class="col-lg-12 col-form-label fw-bold fs-4">Packing & Shipping Details</label>
						<div class="col-lg-12">
							<table class="table align-middle table-row-dashed table-striped fs-7 gy-2 gs-2" id="kt_datatable_view_table_packing_shipping_details_ajax">
								
							</table>
						</div>
					</div>
				</div>
				<!--end::Modal body-->
			</div>
			<!--end::Modal content-->
		</div>
		<!--end::Modal dialog-->
	</div>
		<input type="hidden" id="baseurl" value="<?php echo base_url();?>">
		<?php $this->load->view("script");?>

		<script>
		function dt_fill()
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
		<!-- <script>

				report_type_get()
			 function report_type_get(val) {

			 		if(type == 'most_sold_products'){

			 			$('#most_sold_product_table').show();
			 			$('#frequest_buyers_table').hide();
			 			$('#idle_customer_table').hide();
			 			$('#shipping_delivery_person_table').hide();
			 			$('#delivery_table').hide();
			 			
			 		}
			 		if(type == 'frequent_buyers'){
			 			
			 			$('#most_sold_product_table').hide();
			 			$('#frequest_buyers_table').show();
			 			$('#idle_customer_table').hide();
			 			$('#shipping_delivery_person_table').hide();
			 			$('#delivery_table').hide();
			 		}
			 		if(type == 'idle_customer'){

			 			$('#most_sold_product_table').hide();
			 			$('#frequest_buyers_table').hide();
			 			$('#idle_customer_table').show();
			 			$('#shipping_delivery_person_table').hide();
			 			$('#delivery_table').hide();
			 		}
			 		if(type == 'shipping'){
			 			$('#most_sold_product_table').hide();
			 			$('#frequest_buyers_table').hide();
			 			$('#idle_customer_table').hide();
			 			$('#shipping_delivery_person_table').show();
			 			$('#delivery_table').hide();
			 		}
			 		if(type == 'delivery'){
			 			$('#most_sold_product_table').hide();
			 			$('#frequest_buyers_table').hide();
			 			$('#idle_customer_table').hide();
			 			$('#shipping_delivery_person_table').hide();
			 			$('#delivery_table').show();
			 		}

			 		if (type=='all') {

			 			$('#most_sold_product_table').show();
			 			$('#frequest_buyers_table').show();
			 			$('#idle_customer_table').show();
			 			$('#shipping_delivery_person_table').show();
			 			$('#delivery_table').show();
			 		}

			 		// most_sold_products
					// frequent_buyers
					// idle_customer
					// shipping
					// delivery

					// most_sold_product_table
					// frequest_buyers_table
					// idle_customer_table
					// shipping_delivery_person_table
					// delivery_table
			 }

		</script> -->
		<script>
			function view_sale(val)
			{
				var baseurl= $("#baseurl").val();
				// alert(baseurl);
				// alert(val);
				$.ajax({
				type: "GET",
				url: baseurl+'Akssale/sales_view',
				async: false,
				type: "GET",
				data: "id="+val,
				dataType: "json",
				success: function(response)
				{

					// alert(response.actual_delivery_charge);
					console.log(response);
					var dat = new Date(response.sale_date); 
					var dateFormat = dat.getDate() + "-" + (dat.getMonth()+1) + "-" + dat.getFullYear();
					$('#sale_date').html(dateFormat);
					// alert(response.modified_by);
					var modify ="";
					if((response.modified_by=='') || (response.modified_by==null) || (response.modified_by=="null")){
						// alert("HI");
						  		  modify = '';
					}else{

						// alert("not");
						  modify = '<span class="badge badge-warning text-black fs-7 ms-2">Edited</span>';
					}
					$('#sale_id').html(response.sale_id+' '+modify);
					// $('#sale_party').html(response.sale_party);


					let text = response.sale_party;

					if (text.length > 15) {
					  party_name = text.substring(0, 15) + "...";

					  $('#sale_party').html(party_name);
					  $('#sale_sub_party_name').html(text);
					}else{
						$('#sale_party').html(text);
						$('#sale_sub_party_name').hide();

					}

				
					// console.log(text.length); // Output: 16
					// console.log(text); // Output: "partyna..."
					

					let tot_count = response.sale_prd_count;
					let twoDigitNumber = tot_count.toString().padStart(2,'0');

					$('#total_itemsale').html(twoDigitNumber);
					// alert(twoDigitNumber)

					// Assuming response.sale_net_amt is the net price
						let netPrice   = response.sale_net_amt;
						let gstAmount  = (netPrice * 5) / 100;
						let grandPrice = parseFloat(netPrice + gstAmount);
						var net_amt    = netPrice.toLocaleString('en-IN', {
						    maximumFractionDigits: 2,
						    style: 'currency',
						    currency: 'INR'
						});
					$('#net_amountsale').html(net_amt);
					$('#del_mode').html(response.sale_deliverymode.charAt(0).toUpperCase() + response.sale_deliverymode.slice(1));

					if (response.delivery_by) {
						$('#delivery_by').html(response.delivery_by);
					}else{
						$('#delivery_by').html('-');
					}

					if (response.sale_track_id) {
						$('#label_tracking_id').html(response.sale_track_id);
					}else{
						$('#label_tracking_id').html('-');
					}
					var tot_amt = response.sale_prd_tot_amt.toLocaleString('en-IN', {
						    maximumFractionDigits: 2,
						    style: 'currency',
						    currency: 'INR'
						});
					$('#total_amountsale').html(tot_amt);
					var del_char = response.shipment_charges.toLocaleString('en-IN', {
						    maximumFractionDigits: 2,
						    style: 'currency',
						    currency: 'INR'
						});
					$('#deliver_charge').html(del_char);
					
					if (response.actual_delivery_charge!='' || response.actual_delivery_charge=='null') {

							
							var actual_del = parseFloat(response.actual_delivery_charge);
					}else{
					 	  var actual_del = 0;
					}
					// alert(actual_del)
					if (isNaN(actual_del)) {

						ac_de = 0;
					}else{

						ac_de = actual_del;
					}

					var actual_del_ch = ac_de.toLocaleString('en-IN', {
													    minimumFractionDigits: 2,
													    maximumFractionDigits: 2,
													    style: 'currency',
													    currency: 'INR'
													});
													$('#label_act_del_char').html(actual_del_ch);


					var dis_amt = response.sale_dis_amt.toLocaleString('en-IN', {
						    maximumFractionDigits: 2,
						    style: 'currency',
						    currency: 'INR'
						});
					$('#discountsale').html(dis_amt);
					var sale_cash2 = response.sale_cash.toLocaleString('en-IN', {
						    maximumFractionDigits: 2,
						    style: 'currency',
						    currency: 'INR'
						});
					$('#net_amount1sale').html(sale_cash2);
					var sale_cash1 = response.sale_dis_amt.toLocaleString('en-IN', {
						    maximumFractionDigits: 2,
						    style: 'currency',
						    currency: 'INR'
						});
					$('#cash_amount').html(sale_cash);
					var sale_cash = response.sale_cash.toLocaleString('en-IN', {
						    maximumFractionDigits: 2,
						    style: 'currency',
						    currency: 'INR'
						});
					$('#paid_amount').html(sale_cash);
					var balance_cash = response.balance_cash.toLocaleString('en-IN', {
						    maximumFractionDigits: 2,
						    style: 'currency',
						    currency: 'INR'
						});
					
					$('#balance_amount').html(balance_cash);
					
					// $('#remarks_get').html(response.remarks);

					if (response.remarks) {
						$('#remarks_get').html(response.remarks);
					}else{
						$('#remarks_get').html('-');
					}
					// $('#del_by').val(response.delivery_by);
				}
			});
				$.ajax({
				type: "GET",
				url: baseurl+'Akssale/aks_party_details',
				async: false,
				type: "POST",
				data: "id="+val,
				dataType: "html",
				success: function(response)
				{
						
						// alert(response)

					  var res=response.split('||');

							$("#party_name_view").html(res[0]);						  
							// $("#party_address_get").html(res[2]);

							let addtext = res[2];

							if (addtext.length > 80) {

							  addone = addtext.substring(0, 80) + "...";

							  $('#party_address_get').html(addone);
							  $('#party_address_get_tooltip').html(addtext);

							}else{
								$('#party_address_get').html(addtext);
								$('#party_address_get_tooltip').hide();
							}
							
							// $("#party_ship_address_get").html(res[3]);

							let adtext = res[3];

							if (adtext.length > 60) {

							  addtwo = adtext.substring(0, 60) + "...";

							  $('#party_ship_address_get').html(addtwo);
							  $('#party_ship_address_get_tool').html(adtext);

							}else{
								$('#party_ship_address_get').html(adtext);
								$('#party_ship_address_get_tool').hide();
							}


							$("#party_mobile").html(res[4]);

							let etext = res[5];

							if (etext.length > 15) {

							  email_id = etext.substring(0, 15) + "...";

							  $('#party_email').html(email_id);
							  $('#sale_sub_party_email').html(etext);

							}else{
								$('#party_email').html(etext);
								$('#sale_sub_party_email').hide();
							}

				}
			});
				var baseurl= $("#baseurl").val();
				// alert(baseurl);
				$.ajax({
						type: "POST",
						url: baseurl+'Akssale/sale_view_table_new',
						async: false,
						data: "id="+val,
						dataType: "html",
						success: function(response)
						{
							$("#sale_table_ajax").empty().append(response);
						}
		    });
			 
				var baseurl= $("#baseurl").val();
				// alert(baseurl);
				$.ajax({
						type: "POST",
						url: baseurl+'Akssale/payment_details',
						async: false,
						data: "id="+val,
						dataType: "html",
						success: function(response)
						{
							
							var res=response.split('||');
							if(res[5]==0){
					    
							$('#sale_table_payment').empty();
							$('#sale_table_payment').append(res[1]);
							$('#sale_table_payment').append(res[2]);
							$('#sale_table_payment').append(res[3]);
							$('#sale_table_payment').append(res[4]);
							$("#sale_payment_details").css("display", "block");
							}
							else{
								$("#sale_payment_details").css("display", "none");
							}
						}
			    });
				$.ajax({
						type: "POST",
						url: baseurl+'Akssale/sale_ship_pack_view_table',
						async: false,
						data: "id="+val,
						dataType: "html",
						success: function(response)
						{

							$("#kt_datatable_view_table_packing_shipping_details_ajax").empty().append(response);

							
						}
			    });
				
			}
		</script>
		 <script>
			$("#kt_datatable_view_table").DataTable({
				
				// "responsive": true,
				// "aaSorting":[],
				"paging":false,
				"sorting":false,
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
			$('#kt_datatable_view_table').wrap('<div class="dataTables_scroll" />');
		</script>
		<script>
	      $("#kt_datatable_view_table").kendoTooltip({
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
	      $("#kt_datatable_view_table_payment").kendoTooltip({
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
			function change_delivery(ids)
			{
			var baseurl= $("#baseurl").val();
				// alert(baseurl);
				// alert(val);
				$.ajax({
				type: "GET",
				url: baseurl+'Akssale/change_delivery',
				async: false,
				type: "GET",
				data: "id="+ids,
				dataType: "json",
				success: function(response)
				{
					
					$('#sale_del_lab').html(response.delivery_by);
					$('#del_by').val(response.delivery_by);
				}
				});
					$("#delivery_approved").val(ids);
			}
		</script>
		<script>
			var DatatablesExtensionButtons = {
		    init: function() {
		        var t;
				t = $("#kt_datatable_sales_most_sold_products").DataTable({
					"ordering": false,
					"responsive":true,

					aaSorting: [],
					stateSave: true,
					buttons:[
		                        // {
		                        //     extend: 'print',

		                        //     exportOptions: {columns: ':not(.notexport)'}
		                        // },
		                        // {
		                        //     extend: 'copyHtml5',
		                        //     exportOptions: {columns: ':not(.notexport)'}
		                        // },
		                        {
		                            extend: 'excelHtml5',
		                            title: 'Sales - Most Sold Product Report',
		                            exportOptions: {columns: [ 0,1,2,3,4,5]}
		                        },
		                        // {
		                        //     extend: 'csvHtml5',
		                        //     title: 'Customer List',
		                        //     exportOptions: {columns: [ 1,2,3,4,5,6]}
		                        // },
		                        // {
		                        //     extend: 'pdfHtml5',
		                        //     title: 'Customer List',
		                        //     exportOptions: {columns: [ 1,2,3,4,5,6]}
		                        // },
		                    ],
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
					}),
							$("#product_export").on("click", function(e) {
			            e.preventDefault(), t.button(0).trigger()
			        })
			        // , $("#export_csv").on("click", function(e) {
			        //     e.preventDefault(), t.button(1).trigger()
			        // }), $("#export_pdf").on("click", function(e) {
			        //     e.preventDefault(), t.button(2).trigger()
			        // })
			    }
				};
				jQuery(document).ready(function() {
				    DatatablesExtensionButtons.init()
				});
		</script>
		<script>
	      $("#kt_datatable_sales_most_sold_products").kendoTooltip({
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

					var DatatablesFrequent = {
		    init: function() {
		        var t;
				t = $("#kt_datatable_sales_frequent_buyers_table").DataTable({
					"ordering": false,
					"responsive":true,

					aaSorting: [],
					stateSave: true,
					buttons:[
		                        // {
		                        //     extend: 'print',

		                        //     exportOptions: {columns: ':not(.notexport)'}
		                        // },
		                        // {
		                        //     extend: 'copyHtml5',
		                        //     exportOptions: {columns: ':not(.notexport)'}
		                        // },
		                        {
		                            extend: 'excelHtml5',
		                            title: 'Sales - Frequent Buyers',
		                            exportOptions: {columns: [ 0,1,2,3,4,5,6,7,8]}
		                        },
		                        // {
		                        //     extend: 'csvHtml5',
		                        //     title: 'Customer List',
		                        //     exportOptions: {columns: [ 1,2,3,4,5,6]}
		                        // },
		                        // {
		                        //     extend: 'pdfHtml5',
		                        //     title: 'Customer List',
		                        //     exportOptions: {columns: [ 1,2,3,4,5,6]}
		                        // },
		                    ],
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
					}),
							$("#frequent_buyersexport").on("click", function(e) {
			            e.preventDefault(), t.button(0).trigger()
			        })
			        // , $("#export_csv").on("click", function(e) {
			        //     e.preventDefault(), t.button(1).trigger()
			        // }), $("#export_pdf").on("click", function(e) {
			        //     e.preventDefault(), t.button(2).trigger()
			        // })
			    }
				};
				jQuery(document).ready(function() {
				    DatatablesFrequent.init()
				});

					
		</script>
		<script>
	      $("#kt_datatable_sales_frequent_buyers_table").kendoTooltip({
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
					

					var Datatablesidelexport = {
		    init: function() {
		        var t;
								t = $("#kt_datatable_sales_idle_customer_table").DataTable({
									"ordering": false,
									"responsive":true,

									aaSorting: [],
									stateSave: true,
									buttons:[
						                        // {
						                        //     extend: 'print',

						                        //     exportOptions: {columns: ':not(.notexport)'}
						                        // },
						                        // {
						                        //     extend: 'copyHtml5',
						                        //     exportOptions: {columns: ':not(.notexport)'}
						                        // },
						                        {
						                            extend: 'excelHtml5',
						                            title: 'Sales - Idle Customers',
						                            exportOptions: {columns: [ 0,1,2,3,4,5,6,7,8]}
						                        },
						                        // {
						                        //     extend: 'csvHtml5',
						                        //     title: 'Customer List',
						                        //     exportOptions: {columns: [ 1,2,3,4,5,6]}
						                        // },
						                        // {
						                        //     extend: 'pdfHtml5',
						                        //     title: 'Customer List',
						                        //     exportOptions: {columns: [ 1,2,3,4,5,6]}
						                        // },
						                    ],
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
									}),
											$("#idelexport").on("click", function(e) {
							            e.preventDefault(), t.button(0).trigger()
							        })
							        // , $("#export_csv").on("click", function(e) {
							        //     e.preventDefault(), t.button(1).trigger()
							        // }), $("#export_pdf").on("click", function(e) {
							        //     e.preventDefault(), t.button(2).trigger()
							        // })
							    }
								};
								jQuery(document).ready(function() {
								    Datatablesidelexport.init()
								});
		</script>
		<script>
	      $("#kt_datatable_sales_idle_customer_table").kendoTooltip({
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
					
			var Datatablesshippingexport = {
		    init: function() {
		        var t;
				t = $("#kt_datatable_shipping_delivery_person_table").DataTable({
					"ordering": false,
					"responsive":true,

					aaSorting: [],
					stateSave: true,
					buttons:[
		                        // {
		                        //     extend: 'print',

		                        //     exportOptions: {columns: ':not(.notexport)'}
		                        // },
		                        // {
		                        //     extend: 'copyHtml5',
		                        //     exportOptions: {columns: ':not(.notexport)'}
		                        // },
		                        {
		                            extend: 'excelHtml5',
		                            title: 'Shipping - Delivery Person',
		                            exportOptions: {columns: [ 0,1,2,3,4,5]}
		                        },
		                        // {
		                        //     extend: 'csvHtml5',
		                        //     title: 'Customer List',
		                        //     exportOptions: {columns: [ 1,2,3,4,5,6]}
		                        // },
		                        // {
		                        //     extend: 'pdfHtml5',
		                        //     title: 'Customer List',
		                        //     exportOptions: {columns: [ 1,2,3,4,5,6]}
		                        // },
		                    ],
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
					}),
							$("#shippingexport").on("click", function(e) {
			            e.preventDefault(), t.button(0).trigger()
			        })
			        // , $("#export_csv").on("click", function(e) {
			        //     e.preventDefault(), t.button(1).trigger()
			        // }), $("#export_pdf").on("click", function(e) {
			        //     e.preventDefault(), t.button(2).trigger()
			        // })
			    }
				};
				jQuery(document).ready(function() {
				    Datatablesshippingexport.init()
				});
		</script>
		<script>
	      $("#kt_datatable_shipping_delivery_person_table").kendoTooltip({
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
						var Datatablesdeliveryexport = {
		    init: function() {
		        var t;
				t = $("#kt_datatable_delivery_table").DataTable({
					"ordering": false,
					"responsive":true,

					aaSorting: [],
					stateSave: true,
					buttons:[
		                        // {
		                        //     extend: 'print',

		                        //     exportOptions: {columns: ':not(.notexport)'}
		                        // },
		                        // {
		                        //     extend: 'copyHtml5',
		                        //     exportOptions: {columns: ':not(.notexport)'}
		                        // },
		                        {
		                            extend: 'excelHtml5',
		                            title: 'Sales - Delivered Orders',
		                            exportOptions: {columns: [ 0,1,2,3,4,5,6,7]}
		                        },
		                        // {
		                        //     extend: 'csvHtml5',
		                        //     title: 'Customer List',
		                        //     exportOptions: {columns: [ 1,2,3,4,5,6]}
		                        // },
		                        // {
		                        //     extend: 'pdfHtml5',
		                        //     title: 'Customer List',
		                        //     exportOptions: {columns: [ 1,2,3,4,5,6]}
		                        // },
		                    ],
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
					}),
							$("#deliveryexport").on("click", function(e) {
			            e.preventDefault(), t.button(0).trigger()
			        })
			        // , $("#export_csv").on("click", function(e) {
			        //     e.preventDefault(), t.button(1).trigger()
			        // }), $("#export_pdf").on("click", function(e) {
			        //     e.preventDefault(), t.button(2).trigger()
			        // })
			    }
				};
				jQuery(document).ready(function() {
				    Datatablesdeliveryexport.init()
				});
					
		</script>
		<script>
	      $("#kt_datatable_delivery_table").kendoTooltip({
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
		<script>
			$("#kt_datatable_karuppti_supplier_total_amt_report").DataTable({
				    "sorting":false,
				    // "info":true,
				    "responsive": true,
				    "lengthMenu": [[10, 25, 50], [10, 25, 50]],
				    "pageLength": 50,
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
				        ">"
				});
			// var DatatablesPurchasetable = {
		  //   init: function() {
		  //       var t;
			// 	t = $("#kt_datatable_karuppti_supplier_total_amt_report").DataTable({
			// 		"ordering": false,
			// 		"responsive":true,

			// 		aaSorting: [],
			// 		stateSave: true,
			// 		buttons:[
		  //                       // {
		  //                       //     extend: 'print',

		  //                       //     exportOptions: {columns: ':not(.notexport)'}
		  //                       // },
		  //                       // {
		  //                       //     extend: 'copyHtml5',
		  //                       //     exportOptions: {columns: ':not(.notexport)'}
		  //                       // },
		  //                       {
		  //                           extend: 'excelHtml5',
		  //                           title: 'Karuppati - Supplier - Total Sum of Amount',
		  //                           exportOptions: {columns: [ 1,2,3]}
		  //                       },
		  //                       // {
		  //                       //     extend: 'csvHtml5',
		  //                       //     title: 'Customer List',
		  //                       //     exportOptions: {columns: [ 1,2,3,4,5,6]}
		  //                       // },
		  //                       // {
		  //                       //     extend: 'pdfHtml5',
		  //                       //     title: 'Customer List',
		  //                       //     exportOptions: {columns: [ 1,2,3,4,5,6]}
		  //                       // },
		  //                   ],
			// 		"language": {
			// 		"lengthMenu": "Show _MENU_",
			// 		},
			// 		"dom":
			// 		"<'row'" +
			// 		"<'col-sm-6 d-flex align-items-center justify-conten-start'l>" + 
			// 		"<'col-sm-6 d-flex align-items-center justify-content-end'f>" +
			// 		">" +

			// 		"<'table-responsive'tr>" +

			// 		"<'row'" +
			// 		"<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
			// 		"<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
			// 		">"
			// 		}),
			// 				$("#purchaseexport").on("click", function(e) {
			//             e.preventDefault(), t.button(0).trigger()
			//         })
			//         // , $("#export_csv").on("click", function(e) {
			//         //     e.preventDefault(), t.button(1).trigger()
			//         // }), $("#export_pdf").on("click", function(e) {
			//         //     e.preventDefault(), t.button(2).trigger()
			//         // })
			//     }
			// 	};
			// 	jQuery(document).ready(function() {
			// 	    DatatablesPurchasetable.init()
			// 	});
	</script>
		<script>
			      $("#kt_datatable_karuppti_supplier_total_amt_report").kendoTooltip({
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