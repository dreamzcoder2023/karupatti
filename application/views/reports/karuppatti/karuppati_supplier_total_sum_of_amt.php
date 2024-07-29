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
															<a class="nav-link active  btn btn-active-light btn-color-black-800 btn-active-color-primary rounded-bottom-0 fw-bold fs-6" data-bs-toggle="tab" href="javascript:;">Purchase</a>
														</li>
														<li class="nav-item">
															<a class="nav-link btn btn-active-light btn-color-black-800 btn-active-color-primary rounded-bottom-0 fw-bold fs-6 " href="<?php echo base_url(); ?>Reports/karuppati_sales_reports">Sales</a>
														</li>
													</ul>
												</div>
											</div>

											<div class="tab-content" id="myTabContent">
												<div class="tab-pane fade show active" id="kt_tab_purchase" role="tabpanel">
													<label class="col-lg-11 col-form-label fw-bold fs-2">Karuppati - Supplier - Total Sum of Amount</label>

													<form method="POST" action="<?php echo base_url(); ?>reports/karuppatisuppliertotamt" >
														<div class="accordion" id="kt_accordion_item_list">
															
														    <div class="accordion-item">
														        <h2 class="accordion-header" id="kt_accordion_item_list_header_1">
														            <button class="accordion-button fw-bold fs-6 collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#kt_accordion_item_list_body_1" aria-expanded="false" aria-controls="kt_accordion_item_list_body_1">
														            Filter</button>
														        </h2>
														        <div id="kt_accordion_item_list_body_1" class="accordion-collapse collapse" aria-labelledby="kt_accordion_item_list_header_1" data-bs-parent="#kt_accordion_item_list">
														            <div class="accordion-body">
														            	<div class="row">
																						<div class="col-lg-3">
																							<div class="row">
																								<label class="col-lg-4 col-form-label fw-semibold fs-6">Supplier</label>
																								<div class="col-lg-8">
																									<select class="form-select form-select-solid" data-control="select2" data-close-on-select="true" data-allow-clear="false" id="suppler_fill" name="suppler_fill" >
																										<option value="" selected>All</option>
																										<?php
																										foreach($suppliers_fill_list as $supname){
																										?>
																										<option value="<?php echo $supname['LEDGER_NAME'];?>" <?php if ($supname['LEDGER_NAME']==$suppler_fill){echo 'selected';} ?>><?php echo $supname['LEDGER_NAME'];?></option>
																									<?php
																								}
																								?>
																									</select>
																								</div>
																							</div>
																						</div>
																						<div class="col-lg-3">
																							<div class="row">
																								<label class="col-lg-5 col-form-label fw-semibold fs-6">Date Range</label>
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
																								<div class="col-lg-3 fv-row fv-plugins-icon-container fv-plugins-bootstrap5-row-invalid">
																									<div class="d-flex align-items-center">
																										<label class="form-check form-check-inline form-check-solid me-1 is-invalid">
																											<input class="form-check-input" name="advance_amount_radio[]"  type="checkbox"  id="advance_amount_radio"  onclick="ad_amt_radio()"  <?php if($ad_check=='1'){echo 'checked';}else{ echo '';} ?>>
																											<input type="hidden" name="ad_check" id="ad_check" value="0">
																										</label>
																										<span class="col-form-label fw-semibold fs-6">Advance Amount</span>
																									</div>
																								</div>
																								<div class="col-lg-3" id="advance_amount_radio_tbox" style="display: none;">
																									<select class="form-select form-select-solid" data-control="select2"data-hide-search="true"  id="ad_amt_radio_tbox" name="ad_valid">
																										<?php $amt_ck= $ad_sts?$ad_sts:''; ?>
																										<option value="="<?php  if ($amt_ck=='='){echo 'selected';} ?>> =   </option>
																										<option value=">"<?php  if ($amt_ck=='>'){echo 'selected';} ?>> >   </option>
																										<option value="<"<?php  if ($amt_ck=='<'){echo 'selected';} ?>> <   </option>
																										<option value=">="<?php if ($amt_ck=='>='){echo 'selected';} ?>> >= </option>
																										<option value="<="<?php if ($amt_ck=='<='){echo 'selected';} ?>> <= </option>
																									
																									</select>
																								</div>
																								<div class="col-lg-3" id="advance_amount_radio_tf1" style="display: none;">
																									<input type="text"  name="availableamountval" id="availableamountval" class="form-control form-control-lg form-control-solid" value="<?php echo $ad_amt?$ad_amt:''; ?>" placeholder="Amount" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
																									<div class="fv-plugins-message-container invalid-feedback"></div>
																								</div>
																								<div class="col-lg-3">
																								</div>
																							</div>
																							<div class="row">
																								<div class="col-lg-3 fv-row fv-plugins-icon-container fv-plugins-bootstrap5-row-invalid">
																									<div class="d-flex align-items-center">
																										<label class="form-check form-check-inline form-check-solid me-1 is-invalid">
																											<input class="form-check-input" name="communication[]" type="checkbox" value="1" id="balance_amount_radio" onclick="bal_amt_radio()"<?php if($bal_check=='1'){echo 'checked';}else{ echo '';} ?>>
																											<input type="hidden" name="bal_check" id="bal_check" value="0">
																										</label>
																										<span class="col-form-label fw-semibold fs-6">Balance Amount</span>
																									</div>
																								</div>
																								<div class="col-lg-3" id="balance_amount_radio_tbox" style="display: none;">
																									<select class="form-select form-select-solid" data-control="select2"data-hide-search="true" id="bal_amt_radio_tbox" name="bal_valid">
																										<option value="="<?php if ($bal_sts=='='){echo 'selected';} ?>> = </option>
																										<option value=">"<?php if ($bal_sts=='>'){echo 'selected';} ?>> > </option>
																										<option value="<"<?php if ($bal_sts=='<'){echo 'selected';} ?>> < </option>
																										<option value=">="<?php if ($bal_sts=='>='){echo 'selected';} ?>> >= </option>
																										<option value="<="<?php if ($bal_sts=='<='){echo 'selected';} ?>> <= </option>
																										
																									</select>
																								</div>
																								<div class="col-lg-3" id="balance_amount_radio_tf1" style="display: none;">
																									<input type="text" name="balamountval" id="balamountval" class="form-control form-control-lg form-control-solid" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" placeholder="Amount" value="<?php echo $bal_amt; ?>">
																									<div class="fv-plugins-message-container invalid-feedback"></div>
																								</div>
																								<div class="col-lg-3" style="display: none;">
																									
																								</div>
																							</div>
																							<div class="row">
																								<div class="col-lg-3 fv-row fv-plugins-icon-container fv-plugins-bootstrap5-row-invalid">
																									<div class="d-flex align-items-center">
																										<label class="form-check form-check-inline form-check-solid me-1 is-invalid">
																											<input class="form-check-input" name="communication[]" type="checkbox" value="1" id="purchase_amount_radio" onclick="pur_amt_radio()" <?php if($pur_check=='1'){echo 'checked';}else{ echo '';} ?>>
																											<input type="hidden" name="pur_check" id="pur_check" value="0">
																											
																										</label>
																										<span class="col-form-label fw-semibold fs-6">Purchase Amount</span>
																									</div>
																								</div>
																								<div class="col-lg-3" id="purchase_amount_radio_tbox" style="display: none;">
																									<select class="form-select form-select-solid" data-control="select2"data-hide-search="true" id="pur_amt_radio_tbox" name="pur_valid">
																										<option value="="<?php if ($pur_sts=='='){echo 'selected';} ?>> = </option>
																										<option value=">"<?php if ($pur_sts=='>'){echo 'selected';} ?>> > </option>
																										<option value="<"<?php if ($pur_sts=='<'){echo 'selected';} ?>> < </option>
																										<option value=">="<?php if ($pur_sts=='>='){echo 'selected';} ?>> >= </option>
																										<option value="<="<?php if ($pur_sts=='<='){echo 'selected';} ?>> <= </option>
																									
																									</select>
																								</div>
																								<div class="col-lg-3" id="purchase_amount_radio_tf1" style="display: none;">
																									<input type="text" name="puramountval" id="puramountval" class="form-control form-control-lg form-control-solid" placeholder="Amount" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"  value="<?php echo $pur_amt; ?>">
																									<div class="fv-plugins-message-container invalid-feedback"></div>
																								</div>
																								<div class="col-lg-3" id="purchase_amount_radio_tf2" style="display: none;">
																									
																								</div>
																							</div>
																						</div>
																					</div>
														            </div>
														        </div>
														    </div>
														 
														</div>
														<div class="d-flex align-items-center justify-content-end mt-3">
															<button type="button" class="btn btn-sm btn-outline btn-outline-solid btn-outline-warning btn-active-light-primary me-3" id="purchaseexport">Export</button>
															<button type="submit" class="btn btn-sm btn-outline btn-outline-solid btn-outline-warning btn-active-light-primary me-3">Go</button>
														</div>
												 	</form>
													<!--begin::Table-->
													<div class="row mt-2">
														<table class="table align-middle table-row-dashed table-striped fs-7 gy-1 gs-2" id="kt_datatable_karuppti_supplier_total_amt_report">
															
															<thead>
							    							<tr class="text-muted fw-bold fs-7 gs-0 align-items-center">
									            		<th class="min-w-50px">S.No</th>
									            		<th class="min-w-100px">Date</th>
									            		<th class="min-w-80px">Bill No</th>
									            		<th class="min-w-80px">Supplier</th>
													        <th class="min-w-80px">Product</th>
									            		<th class="min-w-50px">Unit Price</th>
													        <th class="min-w-50px">Qty(gms)</th>
													        <th class="min-w-100px">Purchase Amt</th>
									            		<th class="min-w-100px">Advance Amt</th>
									            		<th class="min-w-100px">Balance Amt</th>
									            		<th class="min-w-80px"><span class="text-end">Actions</span></th>
							    							</tr>
															</thead>
															<tbody class="text-gray-600 fw-semibold">
																	<?php
																			//foreach using multiple karuppati records append
																		
																			$finalarray =[];
																			foreach($supplier_list as $karupattilist)
																			{
																					$productname  = $this->Reports_model->getmulproductname($karupattilist['pur_id']);

																					$finalkarupatti['karupattidetails'] =array(
																						'supname' => $karupattilist['pur_sup'],
																						'date' => $karupattilist['pur_date'],
																						'advanceamt' => $karupattilist['advanceamt'],
																						'prototalamt' => $karupattilist['prototalamt'],
																						'purdisamt' => $karupattilist['purdisamt'],
																						'purnetamt' => $karupattilist['purnetamt'],
																						'productcount'  => $karupattilist['prd_count'],
																						'id' => $karupattilist['pur_id'],
																						'productname' => $productname

																					);

																					$finalarray[] = $finalkarupatti['karupattidetails'];
																				///echo "<pre>";
																				//print_r($finalarray[0]);
																				//echo "</pre>";exit;
																			}
																	?>
																	
																	<?php
																	$i=1;
																	if($finalarray>0)
																	{


																	

																	foreach($finalarray as $purchaseval)
																	{
																		$idcount = count($purchaseval['productname'])+1;
																		//print($idcount);exit;
																	?>
																	<?php
		          												$date=date('d-m-Y',strtotime($purchaseval['date']));
		          												$date_format  = $this->db->query("SELECT * FROM general_settings ")->row();
		                                  $format = $date_format->date_format;
		                                  
							                      ?>

																	<tr>
																			<td rowspan="<?php echo $idcount; ?>"><?php echo $i; ?></td>
													            <td rowspan="<?php echo $idcount; ?>"><?php  echo date("$format", strtotime($date)); ?></td>
													            <td rowspan="<?php echo $idcount; ?>"><?php echo $purchaseval['id']; ?></td>
													            <td rowspan="<?php echo $idcount; ?>" class="ple1"><?php echo $purchaseval['supname']; ?></td>
													            <?php
													            if($idcount>=0)
													            {

													            ?>
																			<td class="ple1"></td>
																		  <td></td>
													            <td></td>
													            <?php } ?>
													            <td rowspan="<?php echo $idcount; ?>"><i class="fa-solid fa-indian-rupee-sign fs-7 text-dark"></i>&nbsp;<?php echo number_format($purchaseval['purnetamt'],2,'.',','); ?></td>
													            <td rowspan="<?php echo $idcount; ?>"><i class="fa-solid fa-indian-rupee-sign fs-7 text-dark"></i>&nbsp;<?php echo number_format($purchaseval['advanceamt'],2,'.',','); ?></td>
													            <td  rowspan="<?php echo $idcount; ?>"><span class="badge badge-primary"><i class="fa-solid fa-indian-rupee-sign fs-7 text-light"></i>&nbsp;<?php echo number_format($purchaseval['purdisamt'],2,'.',','); ?></span></td>
													            <td rowspan="<?php echo $idcount; ?>">
																				<span class="text-end">
																					
																					<a href="javascript;" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm" data-bs-toggle="modal" data-bs-target="#kt_modal_new_purchase" onclick="pur_view('<?php echo $purchaseval['id']; ?>')">
																					<i class="bi bi-eye-fill eyc"></i>
																					</a>
																				</span>
																			</td>
												       		</tr>

														     	<?php
														    		if($idcount>0)
														    		{
														    			//echo "<pre>";
														    			//print_r(count($purchaseval['productname']));
														    			//echo "</pre>";exit;
														    				foreach($purchaseval['productname'] as $proval)
														    				{
														    						//print_r($proval);exit;
														     	?>
													     				<tr> 	
													               <td class="ple1" style="border-bottom-color: black;"><?php echo $proval['AKS_PRD_NAME']; ?></td>
													           	   <td style="border-bottom-color: black;"><?php echo intval($proval['price']); ?></td>
													               <td style="border-bottom-color: black;"><?php echo intval($proval['product_wgt']); ?></td>
													       	    </tr>
													       	<?php
													      
													       				}
													       	  }
														     	?>
												       		<?php
												       			$i++;
												       			}
												       		}

												       		?>
															</tbody>
														</table>
													</div>
													<!--end::Table-->
												</div>
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
													<form name="company_view_form" id="company_view_form" method="POST" action="<?php echo base_url(); ?>Akspurchase/aks_view_purchase" enctype="multipart/form-data" >
													<div class="modal-body pt-0 pb-15 px-5 px-xl-20">
														<!--begin::Heading-->
														<div class="mb-10 text-center">
															<h1>View Purchase</h1>	
															<div class="d-flex justify-content-end">
																<span id="prod_chk_prd" style="background-color:red; border-radius: 8px;padding: 5px 15px 5px 15px; color:white;">Production</span>
																<span id="prod_chk_pur" style="background-color:#ec9629; border-radius: 8px;padding: 5px 15px 5px 15px; color:white;">Purchase</span>
															</div>
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
																<div class="row mt-2" id="production_view_div">
														   			<label class="col-form-label fw-bold fs-2 mt-4">Production Details</label>
														   			<div class="row">
															   			<table id="view_table_scroll_production" class="table align-middle table-row-dashed table-striped table-hover fs-7 gy-1 gs-2 dataTable no-footer">
																			<thead>
																				<tr class="text-start text-muted fw-bold fs-7 gs-0">
																					<th class="min-w-25px">Sno</th>
																			  	<th class="min-w-50px">Product</th>
																					<th class="min-w-25px">Weight (gms)</th>
																					<th class="min-w-50px">Price Per (gms)</th>
																					<th class="min-w-50px">Price</th>
																				</tr>
																			</thead>
																			 <tbody class="text-gray-600 fw-semibold" id="view_table_pro">

																			</tbody>	
																		</table>
																	</div>
														 	    <div class="row mt-4">
																		<div class="col-lg-3 text-start">
																			<div class="row">
																	 			<div class="col-lg-6">
																	 				<label class="col-form-label fw-semibold fs-6">Total Amount</label>
																	 			</div>
																	 			<div class="col-lg-6">
																	 				<label class="col-form-label fw-bold fs-5" id="total_amt_pro">0.00</label>
																	 			</div>
																	 		</div>
																		</div>
																		<div class="col-lg-3 text-center">
																			<div class="row">
																				<div class="col-lg-6">
																				<label class="col-form-label fw-semibold fs-6" title="Making Charges">Mak.Char</label>
																				</div>	
																				<div class="col-lg-6">
																				<label class="col-form-label fw-bold fs-5" id="making_charges">0.00</label>
																			</div>
																		</div>
																	</div>
																		<div class="col-lg-3 text-center">
																			<div class="row">
																				<div class="col-lg-6">
																					<label class="col-form-label fw-semibold fs-6">Paid Amount</label>
																				</div>
																				<div class="col-lg-6">
																				<label class="col-form-label fw-bold fs-5" id="paid_amount_prod">0.00</label>
																			</div>
																		</div>
																	</div>
																		<div class="col-lg-3 text-center">
																			<div class="row">
																				<div class="col-lg-6">
																				<label class="col-form-label fw-semibold fs-6">Balance Amt</label>
																			</div>
																			<div class="col-lg-6">
																				<label class="col-form-label fw-bold fs-5" id="tally_amt_pro">0.00</label>
																			</div>
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
															 	    <div class="row mt-4" id="pay_pur_div">
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
										<!--end::Modal - New purchase-->
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
		<input type="hidden" id="baseurl" value="<?php echo base_url();?>">
		<?php $this->load->view("script");?>
	
		
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
		<!-- <script>
			function bal_amt_tbox()
			{
				var bal_amt_radio_tbox = document.getElementById("bal_amt_radio_tbox").value;

				 if (bal_amt_radio_tbox=="between") 
				  {
				  	$("#balance_amount_radio_tf2").show();
				  	$('#bal_check').val(1);
				  }
				  else
				  {
				  	$("#balance_amount_radio_tf2").hide();
				  	$('#bal_check').val(0);
				  }
			}
		</script> -->
		<script>
			bal_amt_radio()
			function bal_amt_radio()
			{
				var balance_amount_radio = document.getElementById("balance_amount_radio");
				var balance_amount_radio_tbox = document.getElementById("balance_amount_radio_tbox");
				var balance_amount_radio_tf1 = document.getElementById("balance_amount_radio_tf1");
				// var balance_amount_radio_tf2 = document.getElementById("balance_amount_radio_tf2");

				if (balance_amount_radio.checked == true)
				{
				    balance_amount_radio_tbox.style.display = "block";
				    balance_amount_radio_tf1.style.display = "block";
				    $('#bal_check').val(1);
			  	} else 
			  	{
			     	balance_amount_radio_tbox.style.display = "none";
			     	balance_amount_radio_tf1.style.display = "none";
			     	// balance_amount_radio_tf2.style.display = "none";
			     	$('#bal_check').val(0);
			  	}
			}
		</script>
		<!-- <script>
			pur_amt_tbox()
			function pur_amt_tbox()
			{
				var pur_amt_radio_tbox = document.getElementById("pur_amt_radio_tbox").value;

				 if (pur_amt_radio_tbox=="between") 
				  {
				  	$("#purchase_amount_radio_tf2").show();
				  	$('#pur_check').val(0);
				  }
				  else
				  {
				  	$("#purchase_amount_radio_tf2").hide();
				  	$('#pur_check').val(0);

				  }
			}
		</script> -->
		<script>
			pur_amt_radio()
			function pur_amt_radio()
			{
				var purchase_amount_radio = document.getElementById("purchase_amount_radio");
				var purchase_amount_radio_tbox = document.getElementById("purchase_amount_radio_tbox");
				var purchase_amount_radio_tf1 = document.getElementById("purchase_amount_radio_tf1");
				// var purchase_amount_radio_tf2 = document.getElementById("purchase_amount_radio_tf2");

				if (purchase_amount_radio.checked == true)
				{
				    purchase_amount_radio_tbox.style.display = "block";
				    purchase_amount_radio_tf1.style.display = "block";
				    $('#pur_check').val(1);
			  	} else 
			  	{
			     	purchase_amount_radio_tbox.style.display = "none";
			     	purchase_amount_radio_tf1.style.display = "none";
			     	// purchase_amount_radio_tf2.style.display = "none";
			     	$('#pur_check').val(0);
			  	}
			}
		</script>
	<script>
		
			function pur_view(val)
			{
				var baseurl= '<?php echo base_url(); ?>';
				// alert(baseurl);
				$.ajax({
				type: "GET",
				url: baseurl+'Reports/purchase_view',
				async: false,
				type: "GET",
				data: "id="+val,
				dataType: "json",
				success: function(response)
				{
					
					var dat = new Date(response.pur_date); 
					var dateFormat = dat.getDate() + "-" + (dat.getMonth()+1) + "-" + dat.getFullYear();
					$('#pur_date').html(dateFormat);
					$('#pur_id').html(response.pur_id);
					$('#sup_name').html(response.pur_sup);
					$('#total_item').html(response.prd_count);
					$('#billed_by').html(response.create_by);

					var tot_net = response.pur_net_amt.toLocaleString('en-IN', {
						    maximumFractionDigits: 2,
						    style: 'currency',
						    currency: 'INR'
						});

					
					if (parseFloat(response.production_chk)==1) {
						$('#prod_chk_prd').show();
						$('#prod_chk_pur').hide();

					}else{
						
						$('#prod_chk_pur').show();
						$('#prod_chk_prd').hide();
					}
					$('#net_amount').html(tot_net);
					var tot_amt = response.prd_tot_amt.toLocaleString('en-IN', {
						    maximumFractionDigits: 2,
						    style: 'currency',
						    currency: 'INR'
						});
					$('#total_amount').html(tot_amt);
					var dis_amt = response.pur_dis_amt.toLocaleString('en-IN', {
						    maximumFractionDigits: 2,
						    style: 'currency',
						    currency: 'INR'
						});
					$('#discount').html(dis_amt);
					var pur_net = response.pur_net_amt.toLocaleString('en-IN', {
						    maximumFractionDigits: 2,
						    style: 'currency',
						    currency: 'INR'
						});
					$('#net_amount1').html(pur_net);
					var pur_cash = response.pur_cash.toLocaleString('en-IN', {
						    maximumFractionDigits: 2,
						    style: 'currency',
						    currency: 'INR'
						});
					$('#cash_amount').html(pur_cash);
					var pur_cash = response.pur_cash.toLocaleString('en-IN', {
						    maximumFractionDigits: 2,
						    style: 'currency',
						    currency: 'INR'
						});
					$('#paid_amount').html(pur_cash);
					$('#paid_amount_prod').html(pur_cash);
					
					var balance_cash = response.balance_cash.toLocaleString('en-IN', {
						    maximumFractionDigits: 2,
						    style: 'currency',
						    currency: 'INR'
						});
					$('#balance_amount').html(balance_cash);
					// $('#net_amount').val($('#net_amount1').val());

					if (parseFloat(response.production_chk)==1) {

							$('#production_view_div').show();
							$('#pay_pur_div').hide();
							$.ajax({
								type: "POST",
								url: baseurl+'Reports/view_table_pro',
								async: false,
								data: "id="+val,
								dataType: "html",
								success: function(response)
								{
									$("#view_table_pro").empty().append(response);
								}
		    			});

						var mackingcharges = response.mackingcharges.toLocaleString('en-IN', {
						    maximumFractionDigits: 2,
						    style: 'currency',
						    currency: 'INR'
						});
					$('#making_charges').html(mackingcharges);
					var net_amt_pro = response.net_amt_pro.toLocaleString('en-IN', {
						    maximumFractionDigits: 2,
						    style: 'currency',
						    currency: 'INR'
						});
					$('#net_amt_pro').html(net_amt_pro);
					var total_amt_pro = response.total_amt_pro.toLocaleString('en-IN', {
						    maximumFractionDigits: 2,
						    style: 'currency',
						    currency: 'INR'
						});
					$('#total_amt_pro').html(total_amt_pro);
					var tallyamount = response.tallyamount.toLocaleString('en-IN', {
						    maximumFractionDigits: 2,
						    style: 'currency',
						    currency: 'INR'
						});

						if (response.tallyamount>0) {
							$('#tally_amt_pro').css('color', 'green');
							$('#tally_amt_pro').html(tallyamount);
						}else{
							$('#tally_amt_pro').css('color', 'red');

							$('#tally_amt_pro').html(tallyamount);
						}
					


					}else{

						$('#production_view_div').hide();
						$('#pay_pur_div').show();

					}
				// $('#kt_modal_new_purchase').empty().append(response);
				// $('#kt_modal_new_purchase').addClass('show');
				//$("#kt_modal_editdept").css("display", "block");
				}
			});
				var baseurl= $("#baseurl").val();
				// alert(baseurl);
				$.ajax({
								type: "POST",
								url: baseurl+'Reports/view_table',
								async: false,
								data: "id="+val,
								dataType: "html",
								success: function(response)
								{
									$("#view_table").empty().append(response);
								}
		    });
				// alert(baseurl);
				$.ajax({
								type: "POST",
								url: baseurl+'Reports/payment_details',
								async: false,
								data: "id="+val,
								dataType: "html",
								success: function(response)
								{
									
									var res=response.split('||');

									$('#table_tr_payment').empty();
									$('#table_tr_payment').append(res[1]);
									$('#table_tr_payment').append(res[2]);
									$('#table_tr_payment').append(res[3]);
									$('#table_tr_payment').append(res[4]);
									
									// alert(res[]);
								}
		    });

		    
			    
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