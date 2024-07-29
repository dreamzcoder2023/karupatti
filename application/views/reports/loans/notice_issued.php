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
									<h1 class="d-flex align-items-center text-dark fw-bold my-1 fs-3">Notice Issued Report
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
										<!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal"data-bs-target="#kt_modal_new_membership">New Membership</button> -->
										<!--end::Card header-->
										<!--begin::Card body-->
										<div class="card-body py-4">
										<form method="POST" autocomplete="off" action="<?php echo base_url(); ?>reports/loannoticefilter" enctype="multipart/form-data" >
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
																		<label class="col-lg-4 col-form-label fw-semibold fs-6">Company</label>
																		<div class="col-lg-8">
																			<select class="form-select form-select-solid" data-control="select2"    id="companyname" name="companyname">
																				<option value="All" selected>All</option>
																				<?php  
																					foreach($getcompanyname as $companynameval)
																					{ 
																				?>
																				<option value="<?php echo $companynameval['COMPANYCODE']; ?>"><?php echo $companynameval['COMPANYNAME']; ?></option>
																				
																				<?php 
																					}
																				 ?>
																			</select>
																		</div>
																		<label class="col-lg-4 col-form-label fw-semibold fs-6">Notice</label>
																		<div class="col-lg-8">
																			<select class="form-select form-select-solid" data-control="select2" id="noticetype" name="noticetype">
																				<option value="ALL" selected>All</option>
																				<option value="1">Remainder</option>
																				<option value="2">Emergency</option>
																				<option value="3">Final</option>
																			</select>
																		</div>
																		<label class="col-lg-4 col-form-label fw-semibold fs-6">Scheme</label>
																		<div class="col-lg-8">
																			<select class="form-select form-select-solid" data-control="select2"  id="schemetype" name="schemetype">
																				<option value="ALL" selected>All</option>
																				<?php 
																					foreach($getintresttype as $intrestval)
																					{
																				?>
																						<option value="<?php echo $intrestval['INTID']; ?>"><?php echo $intrestval['INTNAME']; ?></option>
																				<?php 
																					}
																				?>
																			</select>
																		</div>
																		<label class="col-lg-4 col-form-label fw-semibold fs-6">Jewel Type</label>
																		<div class="col-lg-8">
																			<select class="form-select form-select-solid" data-control="select2"  id="jeweltype" name="jeweltype">
																				<option value="ALL" selected>All</option>
																				<option value="GOLD">Gold</option>
																				<option value="SILVER">Silver</option>
																			</select>
																		</div>
																	</div>
																</div>
																<div class="col-lg-3">
																	<div class="row">
																		<label class="col-lg-3 col-form-label fw-semibold fs-6">Zone</label>
																		<div class="col-lg-9">
																			<div class="px-2 py-2" style="border:1.9px solid black;border-radius: 10px;">
																				<div class="row">
																					<table class="table align-middle gy-1 gs-2" id="filter_zone">
																							<thead>
																								<tr class="fw-semibold fs-6 gs-0">
																									<th class="w-25px" style="background-color: #ec9629 !important;">
																											<input class="form-check-input" type="checkbox" name="all" id="zone_checkall" value="All">
																											<span class="fs-6">Select All</span>
																					        </th>
																								</tr>
																							 </thead>
																							 <tbody class="fw-bold">
																									<?php 
																										foreach($getzonename as $zonenamevalue)
																										{
																									?>
																						       <tr>
																						            <td class="ple1">
																						            	<input class="form-check-input zone_chk" id="zoneval" name="zoneval[]" type="checkbox" value="<?php echo $zonenamevalue['ZONENAME'];?>">
																													<span class="fw-semibold fs-6"><?php echo $zonenamevalue['ZONENAME']; ?></span>
																						            </td>
																						        </tr>
																						       <?php 
																						       	}
																						       ?>
																						    </tbody>
																					</table>
																				</div>
																			</div>
																		</div>
																	</div>
																</div>
																<div class="col-lg-3">
																	<div class="row">
																		<label class="col-lg-3 col-form-label fw-semibold fs-6">Area</label>
																		<div class="col-lg-9">
																			<div class="px-2 py-2" style="border:1.9px solid black;border-radius: 10px;">
																				<div class="row">
																					<table class="table align-middle gy-1 gs-2" id="filter_area">
																						<thead>
																							<tr class="fw-semibold fs-6 gs-0">
																								<th class="w-25px" style="background-color: #ec9629 !important;">
																									<input class="form-check-input" type="checkbox" name="all" id="area_checkall">
																									<span class="fs-6">Select All</span>
																					            </th>
																							</tr>
																						</thead>
																						<tbody class="fw-bold">
																							<?php 
																								foreach($getareaname as $getareanameval)
																								{ 
																							?>
																					       <tr>
																					            <td class="ple1">
																					            	<input class="form-check-input area_chk" type="checkbox" id="areaval" name="areaval[]" type="checkbox" value="<?php echo $getareanameval['ZONE_SNO'];?>" />
																												<span class="fw-semibold fs-6"><?php echo $getareanameval['AREANAME']; ?> </span>
																					            </td>
																					        </tr>
																					       <?php  
																					       	}
																					       ?>
																					    </tbody>
																					</table>
																				</div>
																			</div>
																		</div>
																	</div>
																</div>
																<div class="col-lg-3">
																	<div class="row">
																		<label class="col-lg-3 col-form-label fw-semibold fs-6">City</label>
																		<div class="col-lg-9">
																			<div class="px-2 py-2" style="border:1.9px solid black;border-radius: 10px;">
																				<div class="row">
																					<table class="table align-middle gy-1 gs-2" id="filter_city">
																						<thead>
																							<tr class="fw-semibold fs-6 gs-0">
																								<th class="w-25px" style="background-color: #ec9629 !important;">
																									<input class="form-check-input" type="checkbox" name="all" id="city_checkall">
																									<span class="fs-6">Select All</span>
																					            </th>
																							</tr>
																						</thead>
																						<tbody class="fw-bold">
																							<?php 
																								foreach($getcityname as $citynameval)
																								{
																							?>
																						       <tr>
																						            <td class="ple1">
																						            	<input class="form-check-input city_chk" type="checkbox" id="cityval" name="cityval[]" type="checkbox" value="<?php echo $citynameval['CITYNAME'];?>">
																													<span class="fw-semibold fs-6"><?php echo $citynameval['CITYNAME']; ?></span>
																						            </td>
																						        </tr>
																				        <?php 
																				        	}
																				        ?>
																					    </tbody>
																					</table>
																				</div>
																			</div>
																		</div>
																	</div>
																</div>
															</div>
															<div class="row">
																<div class="col-lg-3">
																	<div class="row">
																		<label class="col-lg-4 col-form-label fw-semibold fs-6">Date Range</label>
																		<div class="col-lg-8">
																			<select class="form-select form-select-solid" data-control="select2" data-hide-search="true" id="dt_fill" onchange="date_fill();">
																				<option value="all">All</option>
																				<option value="today">Today</option>
																				<option value="week">This Week</option>
																				<option value="monthly">This Month</option>
																				<option value="custom Date">Custom Date</option>
																			</select>
																		</div>
																	</div>
																</div>
																<div class="col-lg-3">
																	<div class="row">
																		<div class="mb-2 fv-row" id="today_dt" style="display:none;">
																			<label class="fw-semibold fs-6">Today</label>
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
																		<div class="mb-2 fv-row" id="week_from_dt" style="display:none;">
																			<label class="fw-semibold fs-6">From</label>
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
																		<div class="mb-2 fv-row" id="week_to_dt" style="display:none;">
																			<label class="fw-semibold fs-6">To</label>
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
																		<div class="mb-2 fv-row" id="monthly_dt" style="display:none;">
																			<label class="fw-semibold fs-6">This Month</label>
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
																		<div class="mb-2 fv-row" id="from_dt" style="display:none;">
																			<label class="fw-semibold fs-6">From</label>
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
																		<div class="mb-2 fv-row" id="to_dt" style="display:none;">
																			<label class="fw-semibold fs-6">To</label>
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
																				<input class="form-control form-control-solid ps-12"  placeholder="To Date" name="to_date_fillter" id="to_date_fillter" value="<?php echo date("d-m-Y"); ?>"/>
																			</div>
																		</div>
																	</div>
																</div>
																<div class="col-lg-3">
																	<div class="row">
																		<label class="col-lg-3 col-form-label fw-semibold fs-6">Village</label>
																		<div class="col-lg-9">
																			<div class="px-2 py-2" style="border:1.9px solid black;border-radius: 10px;">
																				<div class="row">
																					<table class="table align-middle gy-1 gs-2" id="filter_village">
																						<thead>
																							<tr class="fw-semibold fs-6 gs-0">
																								<th class="w-25px" style="background-color: #ec9629 !important;">
																									<input class="form-check-input" type="checkbox" name="all" id="village_checkall">
																									<span class="fs-6">Select All</span>
																					            </th>
																							</tr>
																						</thead>
																						<tbody class="fw-bold">
																							<?php 
																								foreach($getvillagename as $villagevalue)
																								{
																							?>
																					       	<tr>
																					            <td class="ple1">
																					            	<input class="form-check-input village_chk" type="checkbox" value="<?php echo $villagevalue['VILLAGEID']; ?>" id="villageval" name="villageval[]">
																												<span class="fw-semibold fs-6"><?php echo $villagevalue['VILLAGENAME']; ?></span>
																					            </td>
																					        </tr>
																				        <?php  
																				        	}
																				        ?>
																					    </tbody>
																					</table>
																				</div>
																			</div>
																		</div>
																	</div>
																</div>
																<div class="col-lg-3">
																	<div class="row">
																		<label class="col-lg-3 col-form-label fw-semibold fs-6">Street</label>
																		<div class="col-lg-9">
																			<div class="px-2 py-2" style="border:1.9px solid black;border-radius: 10px;">
																				<div class="row">
																					<table class="table align-middle gy-1 gs-2" id="filter_street">
																						<thead>
																							<tr class="fw-semibold fs-6 gs-0">
																								<th class="w-25px" style="background-color: #ec9629 !important;">
																									<input class="form-check-input" type="checkbox" name="all" id="street_checkall">
																									<span class="fs-6">Select All</span>
																					            </th>
																							</tr>
																						</thead>
																						<tbody class="fw-bold">
																							<?php 
																								foreach($getstreetname as $streetvalue)
																								{
																							?>
																					       <tr>
																					            <td class="ple1">
																					            	<input class="form-check-input street_chk" type="checkbox"  id="streetval" name="streetval" value="<?php echo $streetvalue['STREETID']; ?>">
																												<span class="fw-semibold fs-6"><?php echo $streetvalue['STREETNAME']; ?></span>
																					            </td>
																					        </tr>
																					        
																					        <?php 
																					        	}
																					        ?>
																					    </tbody>
																					</table>
																				</div>
																	</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
							</div>
					</div>	
				
						<div class="d-flex align-items-center justify-content-end mt-3">
							<a type="button"  href="#" class="btn btn-sm btn-outline btn-outline-solid btn-outline-warning btn-active-light-primary me-3" onclick="exportloannoticereport();">Export</a>
							<button type="submit" class="btn btn-sm btn-outline btn-outline-solid btn-outline-warning btn-active-light-primary me-3">Go</button>
						</div>
							</form>
						<div class="d-flex align-items-center justify-content-end mt-3">
							<div class="me-2 fw-bold fs-6">
								<span class="btn btn-icon btn-circle fs-8 fw-bold shadow text-black" style="background:#81cbff;width: 20px !important;height: 20px !important;">RE</span>
								<span class="me-1">-</span>
								<span class="me-1">Remainder</span>
							</div>
							<div class="me-2 fw-bold fs-6">
								<span class="btn btn-icon btn-circle fs-8 fw-bold shadow text-black" style="background:#ff8639;width: 20px !important;height: 20px !important;">EG</span>
								<span class="me-1">-</span>
								<span class="me-1">Emergency</span>
							</div>
							<div class="me-2 fw-bold fs-6">
								<span class="btn btn-icon btn-circle fs-8 fw-bold shadow text-white" style="background:red;width: 20px !important;height: 20px !important;">FL</span>
								<span class="me-1">-</span>
								<span class="me-1">Final</span>
							</div>
						</div>
						<div class="row mt-2">
							<table class="table align-middle table-row-dashed table-striped fs-7 gy-0 gs-2" id="kt_datatable_notice_issued_report">
							<thead>
								<tr class="text-start text-muted fw-bold fs-7 gs-0">
									<th rowspan="3" class="min-w-50px" style="border-bottom-style: hidden;">Company</th>
									<th rowspan="3"  class="min-w-100px" style="border-bottom-style: hidden;">Bill No</th>
									<th rowspan="3"  class="min-w-100px" style="border-bottom-style: hidden;">Loan Date</th>
									<th rowspan="3"  class="min-w-100px" style="border-bottom-style: hidden;">Party Info</th>
									<th rowspan="3"  class="min-w-50px" style="border-bottom-style: hidden;">Scheme/Int</th>
									<th rowspan="3"  class="min-w-25px" style="border-bottom-style: hidden;">Jewel Type</th>
									<th class="min-w-80px">Loan Amt</th>
									<th rowspan="3"  class="min-w-25px" style="border-bottom-style: hidden;">OD Days</th>
									<th rowspan="3"  class="min-w-80px" style="border-bottom-style: hidden;">OD Amt</th>
									<th rowspan="3"  class="min-w-25px" style="border-bottom-style: hidden;">Pur(%)</th>
									<th rowspan="3"  class="min-w-100px" style="border-bottom-style: hidden;">Action Value</th>
									<th rowspan="3" class="min-w-50px" style="border-bottom-style: hidden;"><span class="text-end">Actions</span></th>
								</tr>
								<tr class="text-start text-muted fw-bold fs-7 gs-0">
									<th class="min-w-80px">Int Amt</th>
								</tr>
								<tr class="text-start text-muted fw-bold fs-7 gs-0">
									<th class="min-w-80px" style="border-bottom-style: hidden;">Receipt Amt</th>
								</tr>
							</thead>
							<tbody class="text-gray-600 fw-semibold">
								<?php
								//print_r($noticeissueloandetails);exit;
									$i=1; 
									foreach($noticeissueloandetails as $loanvalues)
									{
											//echo "<pre>";
										  //print_r($loanvalues);
											//echo "</pre>";exit;

										$loandate=date_create($loanvalues['ENDATE']);
											$months=date_create($loanvalues['MONTHS']);
										   
	                    $endate = $loanvalues['ENDATE'];
	                    $sd = $endate.' '.'00:00:00';
	                    $e = date("Y-m-d");
	                    $ed = $e.' '.'00:00:00';

	                    $start = new DateTime($sd);
	                    $end = new DateTime($ed);
	                    $diff = $start->diff($end);

	                    $yearsInMonths = $diff->format('%r%y') * 12;
	                    $months = $diff->format('%r%m');
	                    $days = $diff->format('%r%d');
	                    $totalMonths = $yearsInMonths + $months;
	                    $months1 = $totalMonths;
	                    $days1 = $days;
											//print_r($endate);exit;
				              

										$totalloanint=($loanvalues['AMOUNT'] * $loanvalues['INTEREST'])/100;

										$totalmonthintrest =$totalloanint * $months;


										$ODamountval = $totalloanint * $months1;
										//print_r($totalloanint);exit;
									 
								?>
								<tr>
										<td  class="ple1"><?php echo $loanvalues['COMPANYNAME']; ?></td>
										<td  class="ple1">
												<span><?php echo $loanvalues['BILLNO']; ?></span>
												<span class="btn btn-icon btn-circle fs-8 fw-bold shadow text-black mb-1" style="background:#81cbff;width: 20px !important;height: 20px !important;float: right;">RE</span>
										</td>
										<td ><?php echo date_format($loandate,"d-m-Y"); ?></td>
										<td class="ple1">
											<span><i class="fa-solid fa-star fs-7" style="color:#50cd89;"></i></span>
											<span class="align-items-center"><?php echo $loanvalues['NAME']; ?></span>
										</td>
										<td ><?php echo $loanvalues['INTNAME'];?>/<?php echo $loanvalues['INTEREST']; ?></td>
										<td class="ple1"><?php echo $loanvalues['JEWEL_TYPE'];?></td>
										<td>
											<div class="tablevalue">
													<table>
														<tr class="ple1" style="border-bottom-color: black;" >
															<td class="ple1"><?php echo $loanvalues['AMOUNT']; ?></td>
															
														</tr>
														<tr  class="ple1" style="border-bottom-color: black;" >
															<td class="ple1"><?php echo $totalmonthintrest; ?></td>
														
														</tr>
														<tr>
															<td><?php echo $loanvalues['PAIDAMOUNT']; ?></td>
														</tr>
														<br/>
													</table>
											</div>
										</td>
										<td  class="ple1"><?php echo $months1; ?> Month <?php echo $days1;?> Days</td>
										<td ><?php echo $ODamountval; ?></td>
										<td ><?php echo $loanvalues['QUALITY']; ?></td>
										<td ><?php echo $loanvalues['PAID_CASH']; ?></td>
										<td >
											<span class="text-end">
												<a href="javascript:;" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm" title="View">
													<i class="bi bi-eye-fill eyc"></i>
												</a>
											</span>
										</td>
									</tr>
									<?php
											$i++;
										}
									?>
								</tbody>
							</table>
						</div>
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
<input type="hidden" id="baseurl" value="<?php echo base_url();?>">
	<?php $this->load->view("script");?>
	<script>
		var baseurl = $("#baseurl").val();
		function exportloannoticereport()
		{
			
			companyname  = $('#companyname').val();
			noticetype  = $('#noticetype').val();
			schemetype  = $('#schemetype').val();
			jeweltype  = $('#jeweltype').val();
			zoneval  = $('#zoneval').val();
			areaval  = $('#areaval').val();
			cityval  = $('#cityval').val();
			monthly_date_fillter  = $('#monthly_date_fillter').val();
			villageval  = $('#villageval').val();
			streetval  = $('#streetval').val();
			from_date_fillter  = $('#from_date_fillter').val();
			to_date_fillter  = $('#to_date_fillter').val();

			alert(companyname);

			var formData = new FormData();
			formData.append('companyname', companyname);
		


			$.ajax(
			{
				url: baseurl+'reports/loannoticereportexport',
				type: 'POST',
				data: formData,
				async: false,
				cache: false,
				dataType:'json',
				contentType: false,
				processData: false,
				success: function (response) 
				{
						console.log(response);
						
						/*if(response.return_code == 0)
						{
							Swal.fire({
								title: 'success!',
								text: 'Receipt Added Successfully..!',
								icon: 'success',
								confirmButtonText: 'Okay'
							})
							window.location = baseurl+'receipt';
								
						}
						else
						{
							Swal.fire({
								title: 'error!',
								text: 'Receipt Not Added please check Your Bill Number Status..!',
								icon: 'error',
								confirmButtonText: 'Okay'
							})

						}*/
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
			var week_to_dt = document.getElementById('week_to_dt');
			var monthly_dt = document.getElementById('monthly_dt');
			var from_dt = document.getElementById('from_dt');
			var to_dt = document.getElementById('to_dt');
			var from_date_fillter = document.getElementById('from_date_fillter');
			var to_date_fillter = document.getElementById('to_date_fillter');

			if (dt_fill == "today") 
			{
				today_dt.style.display = "block";
				monthly_dt.style.display = "none";
				from_dt.style.display = "none";
				to_dt.style.display = "none";
				week_from_dt.style.display = "none";
				week_to_dt.style.display = "none";
				$("#today_date_fillter").flatpickr({
							dateFormat: "d-m-Y",
						});
			}
			else if (dt_fill == "week")
			{
				today_dt.style.display = "none";
				week_from_dt.style.display = "block";
				week_to_dt.style.display = "block";
				monthly_dt.style.display = "none";
				from_dt.style.display = "none";
				to_dt.style.display = "none";

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
				to_dt.style.display = "none";
				week_from_dt.style.display = "none";
				week_to_dt.style.display = "none";
				$("#monthly_date_fillter").flatpickr({
							dateFormat: "m-Y",
						});
			}
			else if (dt_fill == "custom Date")
			{
				today_dt.style.display = "none";
				monthly_dt.style.display = "none";
				from_dt.style.display = "block";
				to_dt.style.display = "block";
				week_from_dt.style.display = "none";
				week_to_dt.style.display = "none";

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
				to_dt.style.display = "none";
				week_from_dt.style.display = "none";
				week_to_dt.style.display = "none";
			}
		}
	</script>
	<!-- Zone Check Box Start -->
	<script>
		$('#zone_checkall').change(function () {
		    $('.zone_chk').prop('checked',this.checked);
		});

		$('.zone_chk').change(function () {
		 if ($('.zone_chk:checked').length == $('.zone_chk').length){
		  $('#zone_checkall').prop('checked',true);
		 }
		 else {
		  $('#zone_checkall').prop('checked',false);
		 }
		});
	</script>
	<!-- Zone Check Box End -->
	<!-- Area Check Box Start -->
	<script>
		$('#area_checkall').change(function () {
		    $('.area_chk').prop('checked',this.checked);
		});

		$('.area_chk').change(function () {
		 if ($('.area_chk:checked').length == $('.area_chk').length){
		  $('#area_checkall').prop('checked',true);
		 }
		 else {
		  $('#area_checkall').prop('checked',false);
		 }
		});
	</script>
	<!-- Area Check Box End -->
	<!-- City Check Box Start -->
	<script>
		$('#city_checkall').change(function () {
		    $('.city_chk').prop('checked',this.checked);
		});

		$('.city_chk').change(function () {
		 if ($('.city_chk:checked').length == $('.city_chk').length){
		  $('#city_checkall').prop('checked',true);
		 }
		 else {
		  $('#city_checkall').prop('checked',false);
		 }
		});
	</script>
	<!-- City Check Box End -->
	<!-- Village Check Box Start -->
	<script>
		$('#village_checkall').change(function () {
		    $('.village_chk').prop('checked',this.checked);
		});

		$('.village_chk').change(function () {
		 if ($('.village_chk:checked').length == $('.village_chk').length){
		  $('#village_checkall').prop('checked',true);
		 }
		 else {
		  $('#village_checkall').prop('checked',false);
		 }
		});
	</script>
	<!-- Village Check Box End -->
	<!-- Street Check Box Start -->
	<script>
		$('#street_checkall').change(function () {
		    $('.street_chk').prop('checked',this.checked);
		});

		$('.street_chk').change(function () {
		 if ($('.street_chk:checked').length == $('.street_chk').length){
		  $('#street_checkall').prop('checked',true);
		 }
		 else {
		  $('#street_checkall').prop('checked',false);
		 }
		});
	</script>
	<!-- Street Check Box End -->
	<script>
	      $("#filter_street").kendoTooltip({
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
			$("#filter_street").DataTable({
				"ordering": false,
				// "aaSorting":[],
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
				  // "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
				  // "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
				  ">"
				});
			$('#filter_street').wrap('<div class="dataTables_scroll" />');
		</script>
	<script>
	      $("#filter_village").kendoTooltip({
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
			$("#filter_village").DataTable({
				"ordering": false,
				// "aaSorting":[],
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
				  // "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
				  // "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
				  ">"
				});
			$('#filter_village').wrap('<div class="dataTables_scroll" />');
		</script>
	<script>
	      $("#filter_city").kendoTooltip({
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
			$("#filter_city").DataTable({
				"ordering": false,
				// "aaSorting":[],
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
				  // "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
				  // "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
				  ">"
				});
			$('#filter_city').wrap('<div class="dataTables_scroll" />');
		</script>
	<script>
	      $("#filter_area").kendoTooltip({
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
			$("#filter_area").DataTable({
				"ordering": false,
				// "aaSorting":[],
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
				  // "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
				  // "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
				  ">"
				});
			$('#filter_area').wrap('<div class="dataTables_scroll" />');
		</script>
	<script>
	      $("#filter_zone").kendoTooltip({
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
			$("#filter_zone").DataTable({
				"ordering": false,
				// "aaSorting":[],
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
				  // "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
				  // "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
				  ">"
				});
			$('#filter_zone').wrap('<div class="dataTables_scroll" />');
		</script>
		
	
			<script>
		$('#kt_datatable_notice_issued_report').DataTable( {
	
        	"ordering": false,
				// "aaSorting":[],
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

				$("#combined_report_month").flatpickr({
					dateFormat: "m-Y",
				});
				$("#combined_report_st_dt").flatpickr({
					dateFormat: "d-m-Y",
				});
				$("#combined_report_en_dt").flatpickr({
				dateFormat: "d-m-Y",
				});
		</script>
	</body>
	<!--end::Body-->
	</html>