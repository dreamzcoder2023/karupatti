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
									<h1 class="d-flex align-items-center text-dark fw-bold my-1 fs-3">Sales List
									<!--begin::Separator-->
									<span class="h-20px border-gray-400 border-start ms-3 mx-2"></span>
									<label class="d-flex align-items-center text-primary fw-bold my-1 fs-5">
										<span>Party &emsp;-</span>
										<span>&emsp;<?php if($party_name==''){ echo "All"; }else{ echo $party_name; } ?></span>
									</label>
									<span class="h-20px border-gray-400 border-start ms-3 mx-2"></span>
									<label class="d-flex align-items-center text-primary fw-bold my-1 fs-5">
										<span>Type&emsp;-</span>
										<span>&emsp;<?php if($pro_type==''){ echo "All"; }else{ echo $pro_type; } ?></span>
									</label>
									<span class="h-20px border-gray-400 border-start ms-3 mx-2"></span>
									<label class="d-flex align-items-center text-primary fw-bold my-1 fs-5">
										<span>Plot Area Type &emsp;-</span>
										<span>&emsp;<?php if($ploat_type_fill==''){ echo "All"; }else{ echo $ploat_type_fill; } ?></span>
									</label>
									<span class="h-20px border-gray-400 border-start ms-3 mx-2"></span>
									<label class="d-flex align-items-center text-primary fw-bold my-1 fs-5">
										<span>VAO Group &emsp;-</span>
										<span>&emsp;<?php  echo $vaogroupfill ? $vaogroupfill:'All';  ?></span>
									</label>
									<span class="h-20px border-gray-400 border-start ms-3 mx-2"></span>
									<label class="d-flex align-items-center text-primary fw-bold my-1 fs-5">
										<span>Amenities &emsp;-</span>
										<span>&emsp;<?php echo $amenitiesfill ? $amenitiesfill:'All'; ?></span>
									</label>
									<span class="h-20px border-gray-400 border-start  mx-2"></span>
									<label class="d-flex align-items-center text-primary fw-bold my-1 fs-5">
										<span>Date &emsp;-</span>
										<span>&emsp;<?php if($dt_fill==''){ echo "All"; }else{ echo ucfirst($dt_fill); } ?></span>
									</label>
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
										<!--begin::Card header-->
										<div class="card-header1 border-0 pt-6">
											<div class="row">
												<div class="col-lg-8">
													
												</div>
												<div class="col-lg-4">
													<div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
														<!--begin::Filter-->
														<button type="button" class="btn btn-sm btn-outline btn-outline-solid btn-outline-warning btn-active-light-primary me-3" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Filter
														</button>
														<div class="menu menu-sub menu-sub-dropdown w-300px w-md-325px" data-kt-menu="true">
															<div class="px-7 py-5" data-kt-user-table-filter="form">
																<form method="POST" action="<?php echo base_url(); ?>Realestatesale" id="fill_form">
																	<div class="scroll-y mh-325px my-1 px-1">
																		<div class="mb-2">
																		<label class="form-label fs-6 fw-semibold">Party</label>
																		<div class="fv-row fv-plugins-icon-container">
																			<input type="text" name="re_party_name" id="re_party_name" class="form-control form-control-lg form-control-solid" placeholder="Party Name" value="<?php echo $party_name?$party_name:''; ?>">
																			<div class="fv-plugins-message-container invalid-feedback"></div>
																		</div>
																		</div>
																		<div class="mb-2">
																			<label class="form-label fs-6 fw-semibold">Property Type</label>
																			<select class="form-select form-select-solid fw-semibold"  placeholder="Select Type" data-control="select2" data-hide-search="false" name="pro_type" id="pro_type">	
																				<option value="" selected>All</option>
																				<option value="Land" <?php if($pro_type=="Land"){ echo "selected"; } ?>>Land</option>
																				<option value="House" <?php if($pro_type=="House"){ echo "selected"; } ?>>House</option>
																				<option value="Commercial"<?php if($pro_type=="Commercial"){ echo "selected"; } ?>>Commercial</option>
																				<option value="Industrial"<?php if($pro_type=="Industrial"){ echo "selected"; } ?>>Industrial</option>
																				<option value="Agriculture"<?php if($pro_type=="Agriculture"){ echo "selected"; } ?>>Agriculture</option>
																				
																			</select>
																		</div>
																		<div class="mb-2">
																			<label class="form-label fs-6 fw-semibold">Plot Area Type</label>
																			<select class="form-select form-select-solid fw-semibold"  data-control="select2" data-hide-search="false" name="ploat_type_fill" id="ploat_type_fill">	
																				<option value="" selected>All</option>
																				<option value="Cent"<?php if($ploat_type_fill=="Cent"){ echo "selected"; } ?>>Cent</option>
																	            <option value="Acre"<?php if($ploat_type_fill=="Acre"){ echo "selected"; } ?>>Acre</option>
																	            <option value="Sq.ft"<?php if($ploat_type_fill=="Sq.ft"){ echo "selected"; } ?>>Sq.ft</option>
																				
																			</select>
																		</div>	
																		<div class="mb-2">
																			<label class="form-label fs-6 fw-semibold">VAO Group</label>
																			<select class="form-select form-select-solid fw-semibold" data-control="select2" data-hide-search="false" name="vaogroupfill" id="vaogroupfill">	
																				<option value="" selected>All</option>
																				<?php  foreach($vao_group as $vlist) {?>
																					<option value="<?php echo $vlist['VAO_NAME'] ;?>" <?php if($vaogroupfill==$vlist['VAO_NAME']){ echo "selected"; } ?> ><?php echo $vlist['VAO_NAME'];?></option>
																				<?php }?>
																			   </select>
																			</select>
																		</div>
																		<div class="mb-2">
																			<label class="form-label fs-6 fw-semibold">Amenities</label>
																			<select class="form-select form-select-solid fw-semibold" data-control="select2" data-hide-search="false" name="amenitiesfill" id="amenitiesfill">	
																				<option value="" selected="">All</option>
																				<option value="Near by School" <?php if($amenitiesfill=="Near by School"){ echo "selected"; } ?>>Near by School</option>
																				<option value="Near by College" <?php if($amenitiesfill=="Near by College"){ echo "selected"; } ?>>Near by College</option>
																				<option value="Near by Hospital" <?php if($amenitiesfill=="Near by Hospital"){ echo "selected"; } ?>>Near by Hospital</option>
																			</select>
																		</div>		
																		<div class="mb-2">
																		    <label class="form-label">Date</label>
																			<select class="form-select form-select-solid" data-control="select2" data-hide-search="false" name="dt_fill_sale_list" id="dt_fill_sale_list" onchange="date_fill_sale_list();">
																					<option value="all">All</option>
																					<option value="today" <?php if($dt_fill=="today"){ echo "selected"; } ?>>Today</option>
																					<option value="week"<?php if($dt_fill=="week"){ echo "selected"; } ?>>This Week</option>
																					<option value="monthly"<?php if($dt_fill=="monthly"){ echo "selected"; } ?>>This Month</option>
																					<option value="custom Date"  <?php if($dt_fill=="custom Date"){ echo "selected"; } ?>>Custom Date</option>
																			</select>
																	    </div>
																		<div class="mb-2 fv-row" id="today_dt_repor_sale_list" style="display:none;">
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
																				<input class="form-control form-control-solid ps-12" name="today_date_fillter" placeholder="Date" id="today_date_fillter" value="<?php echo date("d-m-Y"); ?>" disabled />
																			</div>
																		</div>
																		<div class="mb-2 fv-row" id="week_from_dt_repor_sale_list" style="display:none;">
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
																				<input class="form-control form-control-solid ps-12" name="" placeholder="Date" id="week_from_date_fillter_repor_sale_list" value="" disabled />
																			</div>
																		</div>
																		<div class="mb-2 fv-row" id="week_to_dt_repor_sale_list" style="display:none;">
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
																				<input class="form-control form-control-solid ps-12" name="" placeholder="Date" id="week_to_date_fillter_repor_sale_list" value="<?php echo date("d-m-Y"); ?>" disabled />
																			</div>
																		</div>
																		<div class="mb-2 fv-row" id="monthly_dt_repor_sale_list" style="display:none;">
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
																				<input class="form-control form-control-solid ps-12" name="monthly_date_fillter_repor_sale_list" placeholder="Month" id="monthly_date_fillter_repor_sale_list" value="<?php echo date("m-Y"); ?>" />
																			</div>
																		</div>
																		<div class="mb-2 fv-row" id="from_dt_repor_sale_list" style="display:none;">
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
																				<input class="form-control form-control-solid ps-12" name="from_date_fillter_repor_sale_list" placeholder="From Date" id="from_date_fillter_repor_sale_list" value="<?php echo date("d-m-Y"); ?>" />
																			</div>
																		</div>
																		<div class="mb-2 fv-row" id="to_dt_repor_sale_list" style="display:none;">
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
																				<input class="form-control form-control-solid ps-12" name="to_date_fillter_repor_sale_list" placeholder="To Date" id="to_date_fillter_repor_sale_list" value="<?php echo date("d-m-Y"); ?>"/>
																			</div>
																		</div>
																		<div class="d-flex justify-content-end">
																			<button type="reset" class="btn btn-light btn-active-light-primary fw-semibold me-2 px-6" data-kt-menu-dismiss="true" data-kt-user-table-filter="reset" onclick="reset_fill()">Reset</button>
																			<button type="submit" class="btn btn-primary fw-semibold px-6" data-kt-menu-dismiss="true" data-kt-user-table-filter="filter">Apply</button>
																		</div>
																	</div>
																</form>
															</div>
														</div>
														<button type="button"class="btn btn-sm btn-outline btn-outline-solid btn-outline-warning btn-active-light-primary me-3" onclick="export_list()">Export
														</button>
														 <?php if(isset($_SESSION['Property Sale ListAdd'])){ if($_SESSION['Property Sale ListAdd']==1){?>
														<a href="<?php echo base_url();?>Realestatesale/realestate_property_sale_entry" target="_blank">
															<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#">
															<span class="svg-icon svg-icon-2">
																<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																	<rect opacity="0.5" x="11.364" y="20.364" width="16" height="2" rx="1" transform="rotate(-90 11.364 20.364)" fill="currentColor" />
																	<rect x="4.36396" y="11.364" width="16" height="2" rx="1" fill="currentColor" />
																</svg>
															</span>New Sale</button>
														</a>
													<?php }} ?>
													</div>
												</div>
											</div>
											<!--end::Card title-->
										</div>
										<!--end::Card header-->
										<!--begin::Card body-->
										<div class="card-body py-4">
											<!--begin::Table-->
											<table id="realestate_sale_table" class="table align-middle table-row-dashed table-striped table-hover fs-7 gy-1 gs-2 dataTable no-footer">
												<thead>
													<tr class="text-start text-muted fw-bold fs-7 gs-0">
														<tr class="text-start text-muted fw-bold fs-7 gs-0">
														<th class="min-w-25px">Sno</th>
														<th class="min-w-80px">Date</th>
														<th class="min-w-100px">Land Name /<br>Land Lord</th>
														<th class="min-w-100px">Purchase ID</th>
														<th class="min-w-100px">Party Info</th>
														<th class="min-w-100px">Ref.Name / <br>Property Type</th>
														<th class="min-w-100px">VAO Group /<br> Amenities</th>
														<th class="min-w-100px"><span class="ms-2">Plot Area </span><br>(No / Type)</th>
														<th class="min-w-125px">Total Amount</th>
														<th style="width: 25%;">Status</th>
														<th style="width: 25%;"><span class="text-end">Actions</span></th>
													</tr>
													</tr>
												</thead>
												<tbody class="text-gray-600 fw-semibold">
													<?php if(isset($pro_sale_list)){  foreach($pro_sale_list as $i=> $slist){ $date=date('d-m-Y',strtotime($slist['date']));?>
														<tr>
															<td><?php echo $i+1; ?></td>
															<td>
																<?php $date_format  = $this->db->query("SELECT * FROM general_settings ")->row();
					                                             $format= $date_format->date_format;
					                                             echo date("$format", strtotime($date));
					                                        	?>
															</td>
															<td class="ple1"><?php echo $slist['land_name']?$slist['land_name']:'-';?> <br> <?php echo $slist['land_lord']?$slist['land_lord']:'-';?></td>
															<td class="ple1">
																
																<i class="fa fa-copy fs-4" title="Copy Bill No" style="cursor: pointer;" onclick="copiedclipboardagno('<?php echo $slist['sale_id'];?>', '<?php echo $i; ?>');"></i>													

															<?php echo $slist['sale_id'];?>
															
															<span style="display: none;" class="ms-2 tooltipcopie" id="tooltipcopie<?php echo $i;?>"></span>
															</td>
															<td class="ple1">
																<span class="align-items-center"><?php echo $slist['party_name'];?></span>
															</td>
															<td class="ple1">
																<span class="align-items-center"><?php echo $slist['ref_name']?$slist['ref_name']:'-' ;?><br><?php echo $slist['property_type']?$slist['property_type']:'-' ;?></span>
															</td>
															<td class="ple1">
															<span class="align-items-center">
																	<?php echo $slist['vao_group']?$slist['vao_group']:'-' ;?> <br> <?php

																		$amenities = isset($slist['amenities']) ? json_decode($slist['amenities']) : [''];
																		$amen = [];
																		foreach ($amenities as $amn) {
																		   
																		    if ($amn) {
																		        $amen[] = ucfirst(ltrim($amn, ','));
																		    }
																		}
																		echo implode(', ', $amen);
																	?>
															</span>
														</td>
															<td>
																<i class="bi bi-geo-alt-fill fs-7"></i>&nbsp;<?php echo $slist['ploat_no'];?> / <?php echo $slist['ploat_type'];?>
															</td>
															<td align="end"><i class="fa-solid fa-indian-rupee-sign fs-7 text-dark"></i>&nbsp;<?php $total_property_amount = $slist['total_property_amount']; echo number_format($total_property_amount,2,'.',',');?></td>
															<td>
															<?php if($slist['balance_amount'] !='0'){ ?>
																	<label class="col-form-label fw-semibold fs-7" >
																	<span style="background-color:#46dcf9;border-radius: 8px;padding: 5px 15px 5px 15px;">Booked</span>
																</label>
															<?php  }else{   ?>

															<?php if($slist['balance_amount'] =='0'){ ?>
															<label class="col-form-label fw-semibold fs-7" ><span style="background-color:#B6BD4F;border-radius: 8px;padding: 5px 10px 5px 10px;">Registered</span>
																</label>
															<?php   }  }?>
															</td>
															
															<td>
																<span class="text-end">
																	 <?php if(isset($_SESSION['Property Sale ListView'])){ if($_SESSION['Property Sale ListView']==1){?>
																	<a href="<?php echo base_url(); ?>Realestatesale/sales_view/<?php echo $slist['id']; ?>" target="_blank" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm">
																	<i class="bi bi-eye-fill eyc"></i>
																	</a>
																<?php }} ?>
																</span>
															</td>
														</tr>
													<?php $i++; } }?>
												</tbody>
											</table>
											<?php 
												$coun = ceil( $count/50);
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
											<?php $paging_info = get_paging_info1($count,50,$c_page); ?>

														<form   method="POST" id="filter_form" action="" enctype="multipart/form-data" >
															
															 <input type="hidden" id="dt_fill_sale_list" name="dt_fill_sale_list"  value="<?php echo $dt_fill; ?>">

															<input type="hidden" id="from_date_fillter_repor_sale_list" name="from_date_fillter_repor_sale_list" value="<?php echo $from_date_fillter; ?>">

															<input type="hidden" id="to_date_fillter_repor_sale_list" name="to_date_fillter_repor_sale_list" value="<?php echo $to_date_fillter; ?>">

															<input type="hidden" id="re_party_name" name="re_party_name"  value="<?php echo $party_name; ?>">

															<input type="hidden" id="pro_type" name="pro_type"  value="<?php echo $pro_type; ?>">
															
															<input type="hidden" id="ploat_type_fill" name="ploat_type_fill"  value="<?php echo $ploat_type_fill; ?>">
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
	
		
		<!-- Flash Data::Start -->
	     	<?php if($this->session->flashdata('g_success')){?>
            	<div class="menu-item px-3">
                    <a href="#" id="pop_up_success" class="menu-link flex-stack px-3" data-bs-toggle="modal" data-bs-target="#success_modal"></a>
                </div>
            		 <?php } ?>
             <?php if($this->session->flashdata('g_err')){?>
                    <div class="menu-item px-3">
           			 <a href="#" id="pop_up_success" class="menu-link flex-stack px-3" data-bs-toggle="modal" data-bs-target="#error_modal"></a>
         		   </div>
             <?php } ?>
		     <div class="modal fade" id="success_modal" tabindex="-1" aria-hidden="true">
		            <!--begin::Modal dialog-->
		            <div class="modal-dialog modal-dialog-centered modal-m">
		                <!--begin::Modal content-->
		                <div class="modal-content rounded">
		                    <div class="swal2-icon swal2-success swal2-icon-show" style="display: flex;">
		                        <div class="swal2-icon-content">&#x2713;</div></div>
		                        <div class="swal2-html-container" id="swal2-html-container" style="display: block;">
		                            <b><span> <?php echo $this->session->flashdata('g_success'); ?></span></b>
		                            </div>
		                        <div class="d-flex flex-center flex-row-fluid pt-12">
		                            <button type="submit" class="btn btn-primary me-3" data-bs-dismiss="modal">Ok</button>
		                            
		                        </div><br><br>
		                </div>
		                <!--end::Modal content-->
		            </div>
		            <!--end::Modal dialog-->
		        </div>
		        <div class="modal fade" id="error_modal" tabindex="-1" aria-hidden="true">
		            <!--begin::Modal dialog-->
		            <div class="modal-dialog modal-dialog-centered modal-m">
		                <!--begin::Modal content-->
		                <div class="modal-content rounded">
		                    <div class="swal2-icon swal2-icon-show" style="display: flex;border: 3px solid red !important;">
		                        <div class="swal2-icon-content" style="color:red">&#x2715;</div></div>
		                        <div class="swal2-html-container" id="swal2-html-container" style="display: block;">
		                            <b><span> <?php echo $this->session->flashdata('g_err'); ?></span></b>
		                            </div>
		                        <div class="d-flex flex-center flex-row-fluid pt-12">
		                            <button type="submit" class="btn btn-primary me-3" data-bs-dismiss="modal">Ok</button>
		                            
		                        </div><br><br>
		                </div>
		                <!--end::Modal content-->
		            </div>
		            <!--end::Modal dialog-->
       			 </div>
		<!-- Flash Data::End -->
		<!--begin::Modal - delete party-->
		<!--end::Modal - delete party-->
		<input type="hidden" id="baseurl" value="<?php echo base_url();?>">
		<?php $this->load->view("script");?>
		<!-- <script src="js/party-list.js"></script> -->
		<!-- Flash Data Script::Start -->
		<script>
			function reset_fill(){

				$('#dt_fill_sale_list').val('');
				$('#re_party_name').val('');
				$('#ploat_type_fill').val('');
				$('#pro_type').val('');
				$('#fill_form').submit();
			}

		</script>
		<script type="text/javascript">
			
			function export_list() {

			    var value = <?php echo $resalealeexport; ?>;
			    var values = [];
			    console.log(value[0]);
			    value.map((data, i) => {	

			    	// var plot = data.ploat_no;
					var sts = data.balance_amount;
					// var status;

					if (sts!=0) {
					    status = 'Booked';
					} else if (sts == 0) {
					    status = 'Registered';
					} else if (sts <= 0) {
					    status = 'Registered';
					}

					var date = new Date(data.date); 
					var dateFormat = date.getDate() + "-" + (date.getMonth()+1) + "-" + date.getFullYear();

					var total = parseFloat(data.total_property_amount).toLocaleString('en-IN', {
					    maximumFractionDigits: 2,
					    style: 'currency',
					    currency: 'INR'
					});


					var arrstrings  = JSON.parse(data.amenities);
					if (arrstrings) {

						var string = arrstrings.join(",");

					}else{

						var string = '';
					}


			        values.push({
			            'Sl.No': i + 1,
			            'Date': dateFormat,
			            'Land Name': data.land_name,
			            'Sale ID': data.sale_id,
			            'Party Info': data.party_name,
			            'Reference Name': data.ref_name,
			            'Land Lord': data.land_lord,
			            'Property type': data.property_type,
			            'VAO Group': data.vao_group,
			            'Amenities': string,
			            'Plot Area No / Type': data.ploat_no+' / '+data.ploat_type,
			            'Total Amount': total,
			            'Status': status
			            
			        });
			    });

			    var filename = 'RESaleList.xlsx';
			    var ws = XLSX.utils.json_to_sheet(values);
			    var wb = XLSX.utils.book_new();

			    XLSX.utils.book_append_sheet(wb, ws, "Sheet1");

			    XLSX.writeFile(wb, filename);
			}
		</script>
		<script>	
		<?php if($this->session->flashdata('g_success') || $this->session->flashdata('g_err')){?> 
		    $(document).ready( function() {
	        document.getElementById("pop_up_success").click()
	        });
	    <?php } ?>
        </script>
		<!-- Flash Data Script::End -->
		<script>

		$(document).ready(function() {
			
			$(".move_to").on("click", function () {
				value=$(this).val();
				// alert(value);
				$('#filter_form').attr('action', "<?php echo base_url(); ?>Realestatesale?page="+value);
				$("#filter_form").submit();
				e.preventDefault();
			});
		});
		</script>
		<script>
			function date_fill_sale_list()
			{
				var dt_fill_sale_list = document.getElementById('dt_fill_sale_list').value;
				var today_dt_repor_sale_list = document.getElementById('today_dt_repor_sale_list');
				var week_from_dt_repor_sale_list = document.getElementById('week_from_dt_repor_sale_list');
				var week_to_dt_repor_sale_list = document.getElementById('week_to_dt_repor_sale_list');
				var monthly_dt_repor_sale_list = document.getElementById('monthly_dt_repor_sale_list');
				var from_dt_repor_sale_list = document.getElementById('from_dt_repor_sale_list');
				var to_dt_repor_sale_list = document.getElementById('to_dt_repor_sale_list');
				var from_date_fillter_repor_sale_list = document.getElementById('from_date_fillter_repor_sale_list');
				var to_date_fillter_repor_sale_list = document.getElementById('to_date_fillter_repor_sale_list');

				if (dt_fill_sale_list == "today") 
				{
					today_dt_repor_sale_list.style.display = "block";
					monthly_dt_repor_sale_list.style.display = "none";
					from_dt_repor_sale_list.style.display = "none";
					to_dt_repor_sale_list.style.display = "none";
					week_from_dt_repor_sale_list.style.display = "none";
					week_to_dt_repor_sale_list.style.display = "none";
					$("#today_date_fillter").flatpickr({
								dateFormat: "d-m-Y",
							});
				}
				else if (dt_fill_sale_list == "week")
				{
					today_dt_repor_sale_list.style.display = "none";
					week_from_dt_repor_sale_list.style.display = "block";
					week_to_dt_repor_sale_list.style.display = "block";
					monthly_dt_repor_sale_list.style.display = "none";
					from_dt_repor_sale_list.style.display = "none";
					to_dt_repor_sale_list.style.display = "none";

					var curr = new Date; // get current date
					var first = curr.getDate() - curr.getDay(); // First day is the day of the month - the day of the week
					var last = first + 6; // last day is the first day + 6

					var firstday = new Date(curr.setDate(first)).toISOString().slice(0,10);
					firstday = firstday.split("-").reverse().join("-");
					var lastday = new Date(curr.setDate(last)).toISOString().slice(0,10);
					lastday = lastday.split("-").reverse().join("-");
					$('#week_from_date_fillter_repor_sale_list').val(firstday);
					$('#week_to_date_fillter_repor_sale_list').val(lastday);
					
				}
				else if (dt_fill_sale_list == "monthly")
				{
					today_dt_repor_sale_list.style.display = "none";
					monthly_dt_repor_sale_list.style.display = "block";
					from_dt_repor_sale_list.style.display = "none";
					to_dt_repor_sale_list.style.display = "none";
					week_from_dt_repor_sale_list.style.display = "none";
					week_to_dt_repor_sale_list.style.display = "none";
					$("#monthly_date_fillter_repor_sale_list").flatpickr({
								dateFormat: "m-Y",
							});
				}
				else if (dt_fill_sale_list == "custom Date")
				{
					today_dt_repor_sale_list.style.display = "none";
					monthly_dt_repor_sale_list.style.display = "none";
					from_dt_repor_sale_list.style.display = "block";
					to_dt_repor_sale_list.style.display = "block";
					week_from_dt_repor_sale_list.style.display = "none";
					week_to_dt_repor_sale_list.style.display = "none";

					$("#from_date_fillter_repor_sale_list").flatpickr({
								dateFormat: "d-m-Y",
							});
					$("#to_date_fillter_repor_sale_list").flatpickr({
								dateFormat: "d-m-Y",
							});
				}
				else
				{
					today_dt_repor_sale_list.style.display = "none";
					monthly_dt_repor_sale_list.style.display = "none";
					from_dt_repor_sale_list.style.display = "none";
					to_dt_repor_sale_list.style.display = "none";
					week_from_dt_repor_sale_list.style.display = "none";
					week_to_dt_repor_sale_list.style.display = "none";
				}
			}
		</script>
		<script>
	      $("#realestate_sale_table").kendoTooltip({
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
			$("#realestate_sale_table").DataTable({
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
		</script>
		<script>
			function cash_cr_radio()
					{
						var cash_create_radio = document.getElementById("cash_create_radio");

						var cash_cr_lab = document.getElementById("cash_cr_lab");
						var cash_cr_tbox = document.getElementById("cash_cr_tbox");

						if (cash_create_radio.checked == true)
						{
						    cash_cr_lab.style.display = "block";
						    cash_cr_tbox.style.display = "block";
						    
					  	} else 
					  	{
					     	cash_cr_lab.style.display = "none";
					     	cash_cr_tbox.style.display = "none";
						    
					  	}
					};
		</script>
		<!-- bank cr -->
		<script>
			function bank_cr_radio()
					{
						var bank_create_radio = document.getElementById("bank_create_radio");

						var cash_bk_cr_lab = document.getElementById("cash_bk_cr_lab");
						var cash_bk_cr_tbox = document.getElementById("cash_bk_cr_tbox");
						var bank_cr_lab = document.getElementById("bank_cr_lab");
						var bank_cr_sel = document.getElementById("bank_cr_sel");
						var cheque_cr_lab = document.getElementById("cheque_cr_lab");
						var cheque_cr_tbox = document.getElementById("cheque_cr_tbox");
						var detail_bk_cr_lab = document.getElementById("detail_bk_cr_lab");
						var detail_bk_cr_tbox = document.getElementById("detail_bk_cr_tbox");

						if (bank_create_radio.checked == true)
						{
							cash_bk_cr_lab.style.display = "block";
						    cash_bk_cr_tbox.style.display = "block";
						    bank_cr_lab.style.display = "block";
						    bank_cr_sel.style.display = "block";
						    cheque_cr_lab.style.display = "block";
						    cheque_cr_tbox.style.display = "block";
						    detail_bk_cr_lab.style.display = "block";
						    detail_bk_cr_tbox.style.display = "block";
						    
					  	} else 
					  	{
					  		cash_bk_cr_lab.style.display = "none";
						    cash_bk_cr_tbox.style.display = "none";
					     	bank_cr_lab.style.display = "none";
						    bank_cr_sel.style.display = "none";
						    cheque_cr_lab.style.display = "none";
						    cheque_cr_tbox.style.display = "none";
						    detail_bk_cr_lab.style.display = "none";
						    detail_bk_cr_tbox.style.display = "none";
						    
					  	}
					};
		</script>
		<!-- UPI cr -->
		<script>
			function upi_cr_radio()
					{
						var upi_create_radio = document.getElementById("upi_create_radio");

						var cash_upi_cr_lab = document.getElementById("cash_upi_cr_lab");
						var cash_upi_cr_tbox = document.getElementById("cash_upi_cr_tbox");
						var trans_cr_lab = document.getElementById("trans_cr_lab");
						var trans_cr_tbox = document.getElementById("trans_cr_tbox");
						var detail_upi_cr_lab = document.getElementById("detail_upi_cr_lab");
						var detail_upi_cr_tbox = document.getElementById("detail_upi_cr_tbox");

						if (upi_create_radio.checked == true)
						{
							cash_upi_cr_lab.style.display = "block";
						    cash_upi_cr_tbox.style.display = "block";
						    trans_cr_lab.style.display = "block";
						    trans_cr_tbox.style.display = "block";
						    detail_upi_cr_lab.style.display = "block";
						    detail_upi_cr_tbox.style.display = "block";
						    
					  	} else 
					  	{
					  		cash_upi_cr_lab.style.display = "none";
						    cash_upi_cr_tbox.style.display = "none";
						    trans_cr_lab.style.display = "none";
						    trans_cr_tbox.style.display = "none";
						    detail_upi_cr_lab.style.display = "none";
						    detail_upi_cr_tbox.style.display = "none";
						    
					  	}
					};
		</script>

		

		
		
        <script>

            $("#kt_daterangepicker_lot_entry_from").flatpickr({
                            dateFormat: "d-m-Y",
                        });
            $("#kt_daterangepicker_lot_entry_to").flatpickr({
                            dateFormat: "d-m-Y",
                        });
            $("#kt_daterangepicker_lot_entry_add_date").flatpickr({
                            dateFormat: "d-m-Y",
                        });
            $("#kt_daterangepicker_lot_entry_edit_date").flatpickr({
                            dateFormat: "d-m-Y",
                        });
            $("#kt_daterangepicker_lot_entry_view_date").flatpickr({
                            dateFormat: "d-m-Y",
                        });

            
        </script>
	</body>
	<!--end::Body-->
</html>