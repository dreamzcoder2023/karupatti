<?php include "common.php"?>
<style>
	#chit_cus_sch #chit_cus_sch_tltip {
		  display: none;
			}
	#chit_cus_sch:hover #chit_cus_sch_tltip {
	  display: block;
	  position: absolute;
	  margin-top: 0.5em;
	  margin-left: -4.5em !important;
	  color: white;
	  background: black;
	  padding: 3px 13px 3px 10px;
	  border-radius: 5px;
	  font-size: 12px;
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
				<?php include "sidebar.php"?>
				<!--begin::Wrapper-->
				<div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
				<?php include "header.php"?>
				<!--begin::Toolbar-->
					<div class="toolbar py-2" id="kt_toolbar">
						<!--begin::Container-->
						<div id="kt_toolbar_container" class="container-fluid d-flex align-items-center">
							<!--begin::Page title-->
							<div class="flex-grow-1 flex-shrink-0 me-5">
								<!--begin::Page title-->
								<div data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
									<!--begin::Title-->
									<h1 class="d-flex align-items-center text-dark fw-bold my-1 fs-3">New Asset
									<!--begin::Separator-->
									<span class="h-20px border-gray-400 border-start ms-3 mx-2"></span>
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
												<label class="col-lg-1 col-form-label required fw-semibold fs-6">Date</label>
												<div class="col-lg-2 fv-row">
													<div class="d-flex align-items-center">
														<span class="svg-icon position-absolute ms-4 svg-icon-2 dt">
															<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																<path opacity="0.3" d="M21 22H3C2.4 22 2 21.6 2 21V5C2 4.4 2.4 4 3 4H21C21.6 4 22 4.4 22 5V21C22 21.6 21.6 22 21 22Z" fill="currentColor" />
																<path d="M6 6C5.4 6 5 5.6 5 5V3C5 2.4 5.4 2 6 2C6.6 2 7 2.4 7 3V5C7 5.6 6.6 6 6 6ZM11 5V3C11 2.4 10.6 2 10 2C9.4 2 9 2.4 9 3V5C9 5.6 9.4 6 10 6C10.6 6 11 5.6 11 5ZM15 5V3C15 2.4 14.6 2 14 2C13.4 2 13 2.4 13 3V5C13 5.6 13.4 6 14 6C14.6 6 15 5.6 15 5ZM19 5V3C19 2.4 18.6 2 18 2C17.4 2 17 2.4 17 3V5C17 5.6 17.4 6 18 6C18.6 6 19 5.6 19 5Z" fill="currentColor" />
																<path d="M8.8 13.1C9.2 13.1 9.5 13 9.7 12.8C9.9 12.6 10.1 12.3 10.1 11.9C10.1 11.6 10 11.3 9.8 11.1C9.6 10.9 9.3 10.8 9 10.8C8.8 10.8 8.59999 10.8 8.39999 10.9C8.19999 11 8.1 11.1 8 11.2C7.9 11.3 7.8 11.4 7.7 11.6C7.6 11.8 7.5 11.9 7.5 12.1C7.5 12.2 7.4 12.2 7.3 12.3C7.2 12.4 7.09999 12.4 6.89999 12.4C6.69999 12.4 6.6 12.3 6.5 12.2C6.4 12.1 6.3 11.9 6.3 11.7C6.3 11.5 6.4 11.3 6.5 11.1C6.6 10.9 6.8 10.7 7 10.5C7.2 10.3 7.49999 10.1 7.89999 10C8.29999 9.90003 8.60001 9.80003 9.10001 9.80003C9.50001 9.80003 9.80001 9.90003 10.1 10C10.4 10.1 10.7 10.3 10.9 10.4C11.1 10.5 11.3 10.8 11.4 11.1C11.5 11.4 11.6 11.6 11.6 11.9C11.6 12.3 11.5 12.6 11.3 12.9C11.1 13.2 10.9 13.5 10.6 13.7C10.9 13.9 11.2 14.1 11.4 14.3C11.6 14.5 11.8 14.7 11.9 15C12 15.3 12.1 15.5 12.1 15.8C12.1 16.2 12 16.5 11.9 16.8C11.8 17.1 11.5 17.4 11.3 17.7C11.1 18 10.7 18.2 10.3 18.3C9.9 18.4 9.5 18.5 9 18.5C8.5 18.5 8.1 18.4 7.7 18.2C7.3 18 7 17.8 6.8 17.6C6.6 17.4 6.4 17.1 6.3 16.8C6.2 16.5 6.10001 16.3 6.10001 16.1C6.10001 15.9 6.2 15.7 6.3 15.6C6.4 15.5 6.6 15.4 6.8 15.4C6.9 15.4 7.00001 15.4 7.10001 15.5C7.20001 15.6 7.3 15.6 7.3 15.7C7.5 16.2 7.7 16.6 8 16.9C8.3 17.2 8.6 17.3 9 17.3C9.2 17.3 9.5 17.2 9.7 17.1C9.9 17 10.1 16.8 10.3 16.6C10.5 16.4 10.5 16.1 10.5 15.8C10.5 15.3 10.4 15 10.1 14.7C9.80001 14.4 9.50001 14.3 9.10001 14.3C9.00001 14.3 8.9 14.3 8.7 14.3C8.5 14.3 8.39999 14.3 8.39999 14.3C8.19999 14.3 7.99999 14.2 7.89999 14.1C7.79999 14 7.7 13.8 7.7 13.7C7.7 13.5 7.79999 13.4 7.89999 13.2C7.99999 13 8.2 13 8.5 13H8.8V13.1ZM15.3 17.5V12.2C14.3 13 13.6 13.3 13.3 13.3C13.1 13.3 13 13.2 12.9 13.1C12.8 13 12.7 12.8 12.7 12.6C12.7 12.4 12.8 12.3 12.9 12.2C13 12.1 13.2 12 13.6 11.8C14.1 11.6 14.5 11.3 14.7 11.1C14.9 10.9 15.2 10.6 15.5 10.3C15.8 10 15.9 9.80003 15.9 9.70003C15.9 9.60003 16.1 9.60004 16.3 9.60004C16.5 9.60004 16.7 9.70003 16.8 9.80003C16.9 9.90003 17 10.2 17 10.5V17.2C17 18 16.7 18.4 16.2 18.4C16 18.4 15.8 18.3 15.6 18.2C15.4 18.1 15.3 17.8 15.3 17.5Z" fill="currentColor" />
															</svg>
														</span>
														<input class="form-control form-control-solid ps-12" name="asset_date" placeholder="Schedule Date" id="asset_date" value="10-09-2023"/>
													</div>
												</div>
												<label class="col-lg-1 col-form-label fw-semibold fs-6">Asset No</label>
												<div class="col-lg-2 fv-row">
													<input type="text" name="" class="form-control form-control-lg1 form-control-solid" placeholder="Asset No" id="">
													<div class="fv-plugins-message-container invalid-feedback" id=""></div>
												</div>
												<!-- <label class="col-lg-1 col-form-label required fw-semibold fs-6">Company</label> -->
												<div class="col-lg-1">
													<label class="col-form-label required fw-semibold fs-6">Company</label>
												</div>
												<div class="col-lg-5 fv-row fv-plugins-icon-container">
													<select class="form-select form-select-solid" name="" id="" data-control="select2" data-hide-search="false">	
														<option value="">Select</option>
														<option value="1">AGB - MAIN BRANCH AYYANAR GOLD BANKERS SKD</option>
														<option value="2">AGN - NARIPPAYUR (NR) 3- BRANCH</option>
														<option value="3">AGM - A GOLD MAIN - & OLD GOLD PURCHES</option>
														<option value="4">AKP - KANNIRAJAPURAM (KP) 4 BRANCH</option>
														<option value="5">AGK - KADALADI (KD) 5 BRANCH</option>
													</select>
												</div>
												<div class="col-lg-12 mt-4">
													<table class="table align-middle table-row-dashed table-striped table-hover fs-7 gy-1 gs-2" id="kt_datatable_asset_mgnt_add">
														<thead>
															<tr class="text-start text-muted fw-bold fs-7 gs-0">
																<th class="min-w-100px" style="min-width: 120px !important;">Pur.Date</th>
																<th class="min-w-80px">Category</th>
																<th class="min-w-80px">Sub Category</th>
																<th class="min-w-125px">Name</th>
																<th class="min-w-80px">Value</th>
																<th class="min-w-80px">Allocated</th>
																<th class="min-w-50px">Place / Used By</th>
																<th class="min-w-25px">Image</th>
																<th class="min-w-25px">War.card</th>
																<th class="min-w-50px" style="min-width:60px !important;">Remarks</th>
															</tr>
														</thead>
														<tbody class="text-gray-600 fw-semibold">
															<tr>
																<td>
																	<div class="d-flex align-items-center">
																		<span class="svg-icon position-absolute ms-4 svg-icon-2 dt">
																			<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																				<path opacity="0.3" d="M21 22H3C2.4 22 2 21.6 2 21V5C2 4.4 2.4 4 3 4H21C21.6 4 22 4.4 22 5V21C22 21.6 21.6 22 21 22Z" fill="currentColor" />
																				<path d="M6 6C5.4 6 5 5.6 5 5V3C5 2.4 5.4 2 6 2C6.6 2 7 2.4 7 3V5C7 5.6 6.6 6 6 6ZM11 5V3C11 2.4 10.6 2 10 2C9.4 2 9 2.4 9 3V5C9 5.6 9.4 6 10 6C10.6 6 11 5.6 11 5ZM15 5V3C15 2.4 14.6 2 14 2C13.4 2 13 2.4 13 3V5C13 5.6 13.4 6 14 6C14.6 6 15 5.6 15 5ZM19 5V3C19 2.4 18.6 2 18 2C17.4 2 17 2.4 17 3V5C17 5.6 17.4 6 18 6C18.6 6 19 5.6 19 5Z" fill="currentColor" />
																				<path d="M8.8 13.1C9.2 13.1 9.5 13 9.7 12.8C9.9 12.6 10.1 12.3 10.1 11.9C10.1 11.6 10 11.3 9.8 11.1C9.6 10.9 9.3 10.8 9 10.8C8.8 10.8 8.59999 10.8 8.39999 10.9C8.19999 11 8.1 11.1 8 11.2C7.9 11.3 7.8 11.4 7.7 11.6C7.6 11.8 7.5 11.9 7.5 12.1C7.5 12.2 7.4 12.2 7.3 12.3C7.2 12.4 7.09999 12.4 6.89999 12.4C6.69999 12.4 6.6 12.3 6.5 12.2C6.4 12.1 6.3 11.9 6.3 11.7C6.3 11.5 6.4 11.3 6.5 11.1C6.6 10.9 6.8 10.7 7 10.5C7.2 10.3 7.49999 10.1 7.89999 10C8.29999 9.90003 8.60001 9.80003 9.10001 9.80003C9.50001 9.80003 9.80001 9.90003 10.1 10C10.4 10.1 10.7 10.3 10.9 10.4C11.1 10.5 11.3 10.8 11.4 11.1C11.5 11.4 11.6 11.6 11.6 11.9C11.6 12.3 11.5 12.6 11.3 12.9C11.1 13.2 10.9 13.5 10.6 13.7C10.9 13.9 11.2 14.1 11.4 14.3C11.6 14.5 11.8 14.7 11.9 15C12 15.3 12.1 15.5 12.1 15.8C12.1 16.2 12 16.5 11.9 16.8C11.8 17.1 11.5 17.4 11.3 17.7C11.1 18 10.7 18.2 10.3 18.3C9.9 18.4 9.5 18.5 9 18.5C8.5 18.5 8.1 18.4 7.7 18.2C7.3 18 7 17.8 6.8 17.6C6.6 17.4 6.4 17.1 6.3 16.8C6.2 16.5 6.10001 16.3 6.10001 16.1C6.10001 15.9 6.2 15.7 6.3 15.6C6.4 15.5 6.6 15.4 6.8 15.4C6.9 15.4 7.00001 15.4 7.10001 15.5C7.20001 15.6 7.3 15.6 7.3 15.7C7.5 16.2 7.7 16.6 8 16.9C8.3 17.2 8.6 17.3 9 17.3C9.2 17.3 9.5 17.2 9.7 17.1C9.9 17 10.1 16.8 10.3 16.6C10.5 16.4 10.5 16.1 10.5 15.8C10.5 15.3 10.4 15 10.1 14.7C9.80001 14.4 9.50001 14.3 9.10001 14.3C9.00001 14.3 8.9 14.3 8.7 14.3C8.5 14.3 8.39999 14.3 8.39999 14.3C8.19999 14.3 7.99999 14.2 7.89999 14.1C7.79999 14 7.7 13.8 7.7 13.7C7.7 13.5 7.79999 13.4 7.89999 13.2C7.99999 13 8.2 13 8.5 13H8.8V13.1ZM15.3 17.5V12.2C14.3 13 13.6 13.3 13.3 13.3C13.1 13.3 13 13.2 12.9 13.1C12.8 13 12.7 12.8 12.7 12.6C12.7 12.4 12.8 12.3 12.9 12.2C13 12.1 13.2 12 13.6 11.8C14.1 11.6 14.5 11.3 14.7 11.1C14.9 10.9 15.2 10.6 15.5 10.3C15.8 10 15.9 9.80003 15.9 9.70003C15.9 9.60003 16.1 9.60004 16.3 9.60004C16.5 9.60004 16.7 9.70003 16.8 9.80003C16.9 9.90003 17 10.2 17 10.5V17.2C17 18 16.7 18.4 16.2 18.4C16 18.4 15.8 18.3 15.6 18.2C15.4 18.1 15.3 17.8 15.3 17.5Z" fill="currentColor" />
																			</svg>
																		</span>
																		<input class="form-control form-control-solid ps-12 fs-7" name="asset_pur_date_add" placeholder="Date" id="asset_pur_date_add"/>
																	</div>
																</td>
																<td>
																	<select class="form-select form-select-solid fs-7" data-width="110px" name="" id="" data-control="select2" data-hide-search="false">
																		<option value="">Select</option>
																		<option value="1">Electronics</option>
																		<option value="2">Stationary</option>
																		<option value="3">Others</option>
																	</select>
																</td>
																<td>
																	<select class="form-select form-select-solid fs-7" data-width="110px" name="" id="" data-control="select2" data-hide-search="false">
																		<option value="">Select</option>
																		<option value="1">Mobile</option>
																		<option value="2">Moniter</option>
																		<option value="3">Keyboard</option>
																		<option value="4">Mouse</option>
																	</select>
																</td>
																<td>
																	<input type="text" name="" class="form-control form-control-lg1 form-control-solid fs-7" placeholder="Name" id="">
																</td>
																<td>
																	<input type="text" name="" class="form-control form-control-lg1 form-control-solid fs-7" placeholder="Value" id="">
																</td>
																<td>
																	<select class="form-select form-select-solid fs-7" data-width="110px" name="" id="" data-control="select2" data-hide-search="false">
																		<option value="">Select</option>
																		<option value="1">Company</option>
																		<option value="2">Staff</option>
																	</select>
																</td>
																<td>
																	<input type="text" name="" class="form-control form-control-lg1 form-control-solid fs-7" placeholder="Place" id="">
																</td>
																<!-- <td>
																	<select class="form-select form-select-solid fs-7" data-width="110px" name="" id="" data-control="select2" data-hide-search="false">
																		<option value="">Select</option>
																		<option value="1">Esakki</option>
																		<option value="2">Priya</option>
																		<option value="3">Vasan</option>
																		<option value="4">Gowri</option>
																	</select>
																</td> -->
																<td>
													            	<div class="image-input mt-2" data-kt-image-input="true">
																		<div class="image-input-wrapper w-40px h-40px" style="background-image: url(assets/images/asset.png)"></div>
																		<!--end::Preview existing avatar-->
																		<!--begin::Label-->
																		<label class="btn btn-icon btn-active-color-primary w-40px h-25px" data-kt-image-input-action="change" data-bs-toggle="tooltip" data-kt-initialized="1">
																			<i class="bi bi-pencil-fill fs-8 ms-3"></i>
																			<!--begin::Inputs-->
																			<input type="file" name="add_party_redemp" accept=".png, .jpg, .jpeg">
																			<input type="hidden" name="add_party_remove_redemp">
																			<!--end::Inputs-->
																		</label>
																		<!--end::Label-->
																		<!--begin::Cancel-->
																		<span class="btn btn-icon btn-active-color-primary w-25px h-20px" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" data-kt-initialized="1">
																			<i class="bi bi-x fs-3 ms-2"></i>
																		</span>
																		<!--end::Cancel-->
																		<!--begin::Remove-->
																		<span class="btn btn-icon btn-active-color-primary w-25px h-20px" data-kt-image-input-action="remove" data-bs-toggle="tooltip" data-kt-initialized="1">
																			<i class="bi bi-x fs-3 ms-2"></i>
																		</span>
																		<!--end::Remove-->
																	</div>
													            </td>
													            <td>
													            	<div class="image-input mt-2" data-kt-image-input="true">
																		<div class="image-input-wrapper w-40px h-40px" style="background-image: url(assets/images/warrenty_card.png)"></div>
																		<!--end::Preview existing avatar-->
																		<!--begin::Label-->
																		<label class="btn btn-icon btn-active-color-primary w-40px h-25px" data-kt-image-input-action="change" data-bs-toggle="tooltip" data-kt-initialized="1">
																			<i class="bi bi-pencil-fill fs-8 ms-3"></i>
																			<!--begin::Inputs-->
																			<input type="file" name="add_party_redemp" accept=".png, .jpg, .jpeg">
																			<input type="hidden" name="add_party_remove_redemp">
																			<!--end::Inputs-->
																		</label>
																		<!--end::Label-->
																		<!--begin::Cancel-->
																		<span class="btn btn-icon btn-active-color-primary w-25px h-20px" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" data-kt-initialized="1">
																			<i class="bi bi-x fs-3 ms-2"></i>
																		</span>
																		<!--end::Cancel-->
																		<!--begin::Remove-->
																		<span class="btn btn-icon btn-active-color-primary w-25px h-20px" data-kt-image-input-action="remove" data-bs-toggle="tooltip" data-kt-initialized="1">
																			<i class="bi bi-x fs-3 ms-2"></i>
																		</span>
																		<!--end::Remove-->
																	</div>
													            </td>
																<td>
																	<textarea class="form-control form-control-solid fs-7" rows="1" placeholder="Remarks" name="" id=""></textarea>
																</td>
															</tr>
															<tr>
																<td>
																	<div class="d-flex align-items-center">
																		<span class="svg-icon position-absolute ms-4 svg-icon-2 dt">
																			<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																				<path opacity="0.3" d="M21 22H3C2.4 22 2 21.6 2 21V5C2 4.4 2.4 4 3 4H21C21.6 4 22 4.4 22 5V21C22 21.6 21.6 22 21 22Z" fill="currentColor" />
																				<path d="M6 6C5.4 6 5 5.6 5 5V3C5 2.4 5.4 2 6 2C6.6 2 7 2.4 7 3V5C7 5.6 6.6 6 6 6ZM11 5V3C11 2.4 10.6 2 10 2C9.4 2 9 2.4 9 3V5C9 5.6 9.4 6 10 6C10.6 6 11 5.6 11 5ZM15 5V3C15 2.4 14.6 2 14 2C13.4 2 13 2.4 13 3V5C13 5.6 13.4 6 14 6C14.6 6 15 5.6 15 5ZM19 5V3C19 2.4 18.6 2 18 2C17.4 2 17 2.4 17 3V5C17 5.6 17.4 6 18 6C18.6 6 19 5.6 19 5Z" fill="currentColor" />
																				<path d="M8.8 13.1C9.2 13.1 9.5 13 9.7 12.8C9.9 12.6 10.1 12.3 10.1 11.9C10.1 11.6 10 11.3 9.8 11.1C9.6 10.9 9.3 10.8 9 10.8C8.8 10.8 8.59999 10.8 8.39999 10.9C8.19999 11 8.1 11.1 8 11.2C7.9 11.3 7.8 11.4 7.7 11.6C7.6 11.8 7.5 11.9 7.5 12.1C7.5 12.2 7.4 12.2 7.3 12.3C7.2 12.4 7.09999 12.4 6.89999 12.4C6.69999 12.4 6.6 12.3 6.5 12.2C6.4 12.1 6.3 11.9 6.3 11.7C6.3 11.5 6.4 11.3 6.5 11.1C6.6 10.9 6.8 10.7 7 10.5C7.2 10.3 7.49999 10.1 7.89999 10C8.29999 9.90003 8.60001 9.80003 9.10001 9.80003C9.50001 9.80003 9.80001 9.90003 10.1 10C10.4 10.1 10.7 10.3 10.9 10.4C11.1 10.5 11.3 10.8 11.4 11.1C11.5 11.4 11.6 11.6 11.6 11.9C11.6 12.3 11.5 12.6 11.3 12.9C11.1 13.2 10.9 13.5 10.6 13.7C10.9 13.9 11.2 14.1 11.4 14.3C11.6 14.5 11.8 14.7 11.9 15C12 15.3 12.1 15.5 12.1 15.8C12.1 16.2 12 16.5 11.9 16.8C11.8 17.1 11.5 17.4 11.3 17.7C11.1 18 10.7 18.2 10.3 18.3C9.9 18.4 9.5 18.5 9 18.5C8.5 18.5 8.1 18.4 7.7 18.2C7.3 18 7 17.8 6.8 17.6C6.6 17.4 6.4 17.1 6.3 16.8C6.2 16.5 6.10001 16.3 6.10001 16.1C6.10001 15.9 6.2 15.7 6.3 15.6C6.4 15.5 6.6 15.4 6.8 15.4C6.9 15.4 7.00001 15.4 7.10001 15.5C7.20001 15.6 7.3 15.6 7.3 15.7C7.5 16.2 7.7 16.6 8 16.9C8.3 17.2 8.6 17.3 9 17.3C9.2 17.3 9.5 17.2 9.7 17.1C9.9 17 10.1 16.8 10.3 16.6C10.5 16.4 10.5 16.1 10.5 15.8C10.5 15.3 10.4 15 10.1 14.7C9.80001 14.4 9.50001 14.3 9.10001 14.3C9.00001 14.3 8.9 14.3 8.7 14.3C8.5 14.3 8.39999 14.3 8.39999 14.3C8.19999 14.3 7.99999 14.2 7.89999 14.1C7.79999 14 7.7 13.8 7.7 13.7C7.7 13.5 7.79999 13.4 7.89999 13.2C7.99999 13 8.2 13 8.5 13H8.8V13.1ZM15.3 17.5V12.2C14.3 13 13.6 13.3 13.3 13.3C13.1 13.3 13 13.2 12.9 13.1C12.8 13 12.7 12.8 12.7 12.6C12.7 12.4 12.8 12.3 12.9 12.2C13 12.1 13.2 12 13.6 11.8C14.1 11.6 14.5 11.3 14.7 11.1C14.9 10.9 15.2 10.6 15.5 10.3C15.8 10 15.9 9.80003 15.9 9.70003C15.9 9.60003 16.1 9.60004 16.3 9.60004C16.5 9.60004 16.7 9.70003 16.8 9.80003C16.9 9.90003 17 10.2 17 10.5V17.2C17 18 16.7 18.4 16.2 18.4C16 18.4 15.8 18.3 15.6 18.2C15.4 18.1 15.3 17.8 15.3 17.5Z" fill="currentColor" />
																			</svg>
																		</span>
																		<input class="form-control form-control-solid ps-12 fs-7" name="asset_pur_date_add" placeholder="Date" id="asset_pur_date_add"/>
																	</div>
																</td>
																<td>
																	<select class="form-select form-select-solid fs-7" data-width="110px" name="" id="" data-control="select2" data-hide-search="false">
																		<option value="">Select</option>
																		<option value="1">Electronics</option>
																		<option value="2">Stationary</option>
																		<option value="3">Others</option>
																	</select>
																</td>
																<td>
																	<select class="form-select form-select-solid fs-7" data-width="110px" name="" id="" data-control="select2" data-hide-search="false">
																		<option value="">Select</option>
																		<option value="1">Mobile</option>
																		<option value="2">Moniter</option>
																		<option value="3">Keyboard</option>
																		<option value="4">Mouse</option>
																	</select>
																</td>
																<td>
																	<input type="text" name="" class="form-control form-control-lg1 form-control-solid fs-7" placeholder="Name" id="">
																</td>
																<td>
																	<input type="text" name="" class="form-control form-control-lg1 form-control-solid fs-7" placeholder="Value" id="">
																</td>
																<td>
																	<select class="form-select form-select-solid fs-7" data-width="110px" name="" id="" data-control="select2" data-hide-search="false">
																		<option value="">Select</option>
																		<option value="1">Company</option>
																		<option value="2">Staff</option>
																	</select>
																</td>
																<td>
																	<select class="form-select form-select-solid fs-7" data-width="110px" name="" id="" data-control="select2" data-hide-search="false">
																		<option value="">Select</option>
																		<option value="1">Esakki</option>
																		<option value="2">Priya</option>
																		<option value="3">Vasan</option>
																		<option value="4">Gowri</option>
																	</select>
																</td>
																<td>
													            	<div class="image-input mt-2" data-kt-image-input="true">
																		<div class="image-input-wrapper w-40px h-40px" style="background-image: url(assets/images/asset.png)"></div>
																		<!--end::Preview existing avatar-->
																		<!--begin::Label-->
																		<label class="btn btn-icon btn-active-color-primary w-40px h-25px" data-kt-image-input-action="change" data-bs-toggle="tooltip" data-kt-initialized="1">
																			<i class="bi bi-pencil-fill fs-8 ms-3"></i>
																			<!--begin::Inputs-->
																			<input type="file" name="add_party_redemp" accept=".png, .jpg, .jpeg">
																			<input type="hidden" name="add_party_remove_redemp">
																			<!--end::Inputs-->
																		</label>
																		<!--end::Label-->
																		<!--begin::Cancel-->
																		<span class="btn btn-icon btn-active-color-primary w-25px h-20px" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" data-kt-initialized="1">
																			<i class="bi bi-x fs-3 ms-2"></i>
																		</span>
																		<!--end::Cancel-->
																		<!--begin::Remove-->
																		<span class="btn btn-icon btn-active-color-primary w-25px h-20px" data-kt-image-input-action="remove" data-bs-toggle="tooltip" data-kt-initialized="1">
																			<i class="bi bi-x fs-3 ms-2"></i>
																		</span>
																		<!--end::Remove-->
																	</div>
													            </td>
													            <td>
													            	<div class="image-input mt-2" data-kt-image-input="true">
																		<div class="image-input-wrapper w-40px h-40px" style="background-image: url(assets/images/warrenty_card.png)"></div>
																		<!--end::Preview existing avatar-->
																		<!--begin::Label-->
																		<label class="btn btn-icon btn-active-color-primary w-40px h-25px" data-kt-image-input-action="change" data-bs-toggle="tooltip" data-kt-initialized="1">
																			<i class="bi bi-pencil-fill fs-8 ms-3"></i>
																			<!--begin::Inputs-->
																			<input type="file" name="add_party_redemp" accept=".png, .jpg, .jpeg">
																			<input type="hidden" name="add_party_remove_redemp">
																			<!--end::Inputs-->
																		</label>
																		<!--end::Label-->
																		<!--begin::Cancel-->
																		<span class="btn btn-icon btn-active-color-primary w-25px h-20px" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" data-kt-initialized="1">
																			<i class="bi bi-x fs-3 ms-2"></i>
																		</span>
																		<!--end::Cancel-->
																		<!--begin::Remove-->
																		<span class="btn btn-icon btn-active-color-primary w-25px h-20px" data-kt-image-input-action="remove" data-bs-toggle="tooltip" data-kt-initialized="1">
																			<i class="bi bi-x fs-3 ms-2"></i>
																		</span>
																		<!--end::Remove-->
																	</div>
													            </td>
																<td>
																	<textarea class="form-control form-control-solid fs-7" rows="1" placeholder="Remarks" name="" id=""></textarea>
																</td>
															</tr>
															<tr>
																<td>
																	<div class="d-flex align-items-center">
																		<span class="svg-icon position-absolute ms-4 svg-icon-2 dt">
																			<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																				<path opacity="0.3" d="M21 22H3C2.4 22 2 21.6 2 21V5C2 4.4 2.4 4 3 4H21C21.6 4 22 4.4 22 5V21C22 21.6 21.6 22 21 22Z" fill="currentColor" />
																				<path d="M6 6C5.4 6 5 5.6 5 5V3C5 2.4 5.4 2 6 2C6.6 2 7 2.4 7 3V5C7 5.6 6.6 6 6 6ZM11 5V3C11 2.4 10.6 2 10 2C9.4 2 9 2.4 9 3V5C9 5.6 9.4 6 10 6C10.6 6 11 5.6 11 5ZM15 5V3C15 2.4 14.6 2 14 2C13.4 2 13 2.4 13 3V5C13 5.6 13.4 6 14 6C14.6 6 15 5.6 15 5ZM19 5V3C19 2.4 18.6 2 18 2C17.4 2 17 2.4 17 3V5C17 5.6 17.4 6 18 6C18.6 6 19 5.6 19 5Z" fill="currentColor" />
																				<path d="M8.8 13.1C9.2 13.1 9.5 13 9.7 12.8C9.9 12.6 10.1 12.3 10.1 11.9C10.1 11.6 10 11.3 9.8 11.1C9.6 10.9 9.3 10.8 9 10.8C8.8 10.8 8.59999 10.8 8.39999 10.9C8.19999 11 8.1 11.1 8 11.2C7.9 11.3 7.8 11.4 7.7 11.6C7.6 11.8 7.5 11.9 7.5 12.1C7.5 12.2 7.4 12.2 7.3 12.3C7.2 12.4 7.09999 12.4 6.89999 12.4C6.69999 12.4 6.6 12.3 6.5 12.2C6.4 12.1 6.3 11.9 6.3 11.7C6.3 11.5 6.4 11.3 6.5 11.1C6.6 10.9 6.8 10.7 7 10.5C7.2 10.3 7.49999 10.1 7.89999 10C8.29999 9.90003 8.60001 9.80003 9.10001 9.80003C9.50001 9.80003 9.80001 9.90003 10.1 10C10.4 10.1 10.7 10.3 10.9 10.4C11.1 10.5 11.3 10.8 11.4 11.1C11.5 11.4 11.6 11.6 11.6 11.9C11.6 12.3 11.5 12.6 11.3 12.9C11.1 13.2 10.9 13.5 10.6 13.7C10.9 13.9 11.2 14.1 11.4 14.3C11.6 14.5 11.8 14.7 11.9 15C12 15.3 12.1 15.5 12.1 15.8C12.1 16.2 12 16.5 11.9 16.8C11.8 17.1 11.5 17.4 11.3 17.7C11.1 18 10.7 18.2 10.3 18.3C9.9 18.4 9.5 18.5 9 18.5C8.5 18.5 8.1 18.4 7.7 18.2C7.3 18 7 17.8 6.8 17.6C6.6 17.4 6.4 17.1 6.3 16.8C6.2 16.5 6.10001 16.3 6.10001 16.1C6.10001 15.9 6.2 15.7 6.3 15.6C6.4 15.5 6.6 15.4 6.8 15.4C6.9 15.4 7.00001 15.4 7.10001 15.5C7.20001 15.6 7.3 15.6 7.3 15.7C7.5 16.2 7.7 16.6 8 16.9C8.3 17.2 8.6 17.3 9 17.3C9.2 17.3 9.5 17.2 9.7 17.1C9.9 17 10.1 16.8 10.3 16.6C10.5 16.4 10.5 16.1 10.5 15.8C10.5 15.3 10.4 15 10.1 14.7C9.80001 14.4 9.50001 14.3 9.10001 14.3C9.00001 14.3 8.9 14.3 8.7 14.3C8.5 14.3 8.39999 14.3 8.39999 14.3C8.19999 14.3 7.99999 14.2 7.89999 14.1C7.79999 14 7.7 13.8 7.7 13.7C7.7 13.5 7.79999 13.4 7.89999 13.2C7.99999 13 8.2 13 8.5 13H8.8V13.1ZM15.3 17.5V12.2C14.3 13 13.6 13.3 13.3 13.3C13.1 13.3 13 13.2 12.9 13.1C12.8 13 12.7 12.8 12.7 12.6C12.7 12.4 12.8 12.3 12.9 12.2C13 12.1 13.2 12 13.6 11.8C14.1 11.6 14.5 11.3 14.7 11.1C14.9 10.9 15.2 10.6 15.5 10.3C15.8 10 15.9 9.80003 15.9 9.70003C15.9 9.60003 16.1 9.60004 16.3 9.60004C16.5 9.60004 16.7 9.70003 16.8 9.80003C16.9 9.90003 17 10.2 17 10.5V17.2C17 18 16.7 18.4 16.2 18.4C16 18.4 15.8 18.3 15.6 18.2C15.4 18.1 15.3 17.8 15.3 17.5Z" fill="currentColor" />
																			</svg>
																		</span>
																		<input class="form-control form-control-solid ps-12 fs-7" name="asset_pur_date_add" placeholder="Date" id="asset_pur_date_add"/>
																	</div>
																</td>
																<td>
																	<select class="form-select form-select-solid fs-7" data-width="110px" name="" id="" data-control="select2" data-hide-search="false">
																		<option value="">Select</option>
																		<option value="1">Electronics</option>
																		<option value="2">Stationary</option>
																		<option value="3">Others</option>
																	</select>
																</td>
																<td>
																	<select class="form-select form-select-solid fs-7" data-width="110px" name="" id="" data-control="select2" data-hide-search="false">
																		<option value="">Select</option>
																		<option value="1">Mobile</option>
																		<option value="2">Moniter</option>
																		<option value="3">Keyboard</option>
																		<option value="4">Mouse</option>
																	</select>
																</td>
																<td>
																	<input type="text" name="" class="form-control form-control-lg1 form-control-solid fs-7" placeholder="Name" id="">
																</td>
																<td>
																	<input type="text" name="" class="form-control form-control-lg1 form-control-solid fs-7" placeholder="Value" id="">
																</td>
																<td>
																	<select class="form-select form-select-solid fs-7" data-width="110px" name="" id="" data-control="select2" data-hide-search="false">
																		<option value="">Select</option>
																		<option value="1">Company</option>
																		<option value="2">Staff</option>
																	</select>
																</td>
																<td>
																	<input type="text" name="" class="form-control form-control-lg1 form-control-solid fs-7" placeholder="Place" id="">
																</td>
																<td>
													            	<div class="image-input mt-2" data-kt-image-input="true">
																		<div class="image-input-wrapper w-40px h-40px" style="background-image: url(assets/images/asset.png)"></div>
																		<!--end::Preview existing avatar-->
																		<!--begin::Label-->
																		<label class="btn btn-icon btn-active-color-primary w-40px h-25px" data-kt-image-input-action="change" data-bs-toggle="tooltip" data-kt-initialized="1">
																			<i class="bi bi-pencil-fill fs-8 ms-3"></i>
																			<!--begin::Inputs-->
																			<input type="file" name="add_party_redemp" accept=".png, .jpg, .jpeg">
																			<input type="hidden" name="add_party_remove_redemp">
																			<!--end::Inputs-->
																		</label>
																		<!--end::Label-->
																		<!--begin::Cancel-->
																		<span class="btn btn-icon btn-active-color-primary w-25px h-20px" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" data-kt-initialized="1">
																			<i class="bi bi-x fs-3 ms-2"></i>
																		</span>
																		<!--end::Cancel-->
																		<!--begin::Remove-->
																		<span class="btn btn-icon btn-active-color-primary w-25px h-20px" data-kt-image-input-action="remove" data-bs-toggle="tooltip" data-kt-initialized="1">
																			<i class="bi bi-x fs-3 ms-2"></i>
																		</span>
																		<!--end::Remove-->
																	</div>
													            </td>
													            <td>
													            	<div class="image-input mt-2" data-kt-image-input="true">
																		<div class="image-input-wrapper w-40px h-40px" style="background-image: url(assets/images/warrenty_card.png)"></div>
																		<!--end::Preview existing avatar-->
																		<!--begin::Label-->
																		<label class="btn btn-icon btn-active-color-primary w-40px h-25px" data-kt-image-input-action="change" data-bs-toggle="tooltip" data-kt-initialized="1">
																			<i class="bi bi-pencil-fill fs-8 ms-3"></i>
																			<!--begin::Inputs-->
																			<input type="file" name="add_party_redemp" accept=".png, .jpg, .jpeg">
																			<input type="hidden" name="add_party_remove_redemp">
																			<!--end::Inputs-->
																		</label>
																		<!--end::Label-->
																		<!--begin::Cancel-->
																		<span class="btn btn-icon btn-active-color-primary w-25px h-20px" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" data-kt-initialized="1">
																			<i class="bi bi-x fs-3 ms-2"></i>
																		</span>
																		<!--end::Cancel-->
																		<!--begin::Remove-->
																		<span class="btn btn-icon btn-active-color-primary w-25px h-20px" data-kt-image-input-action="remove" data-bs-toggle="tooltip" data-kt-initialized="1">
																			<i class="bi bi-x fs-3 ms-2"></i>
																		</span>
																		<!--end::Remove-->
																	</div>
													            </td>
																<td>
																	<textarea class="form-control form-control-solid fs-7" rows="1" placeholder="Remarks" name="" id=""></textarea>
																</td>
															</tr>
															<tr id="asset_mgnt_tr_1" style="display: none;">
																<td>
																	<div class="d-flex align-items-center">
																		<span class="svg-icon position-absolute ms-4 svg-icon-2 dt">
																			<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																				<path opacity="0.3" d="M21 22H3C2.4 22 2 21.6 2 21V5C2 4.4 2.4 4 3 4H21C21.6 4 22 4.4 22 5V21C22 21.6 21.6 22 21 22Z" fill="currentColor" />
																				<path d="M6 6C5.4 6 5 5.6 5 5V3C5 2.4 5.4 2 6 2C6.6 2 7 2.4 7 3V5C7 5.6 6.6 6 6 6ZM11 5V3C11 2.4 10.6 2 10 2C9.4 2 9 2.4 9 3V5C9 5.6 9.4 6 10 6C10.6 6 11 5.6 11 5ZM15 5V3C15 2.4 14.6 2 14 2C13.4 2 13 2.4 13 3V5C13 5.6 13.4 6 14 6C14.6 6 15 5.6 15 5ZM19 5V3C19 2.4 18.6 2 18 2C17.4 2 17 2.4 17 3V5C17 5.6 17.4 6 18 6C18.6 6 19 5.6 19 5Z" fill="currentColor" />
																				<path d="M8.8 13.1C9.2 13.1 9.5 13 9.7 12.8C9.9 12.6 10.1 12.3 10.1 11.9C10.1 11.6 10 11.3 9.8 11.1C9.6 10.9 9.3 10.8 9 10.8C8.8 10.8 8.59999 10.8 8.39999 10.9C8.19999 11 8.1 11.1 8 11.2C7.9 11.3 7.8 11.4 7.7 11.6C7.6 11.8 7.5 11.9 7.5 12.1C7.5 12.2 7.4 12.2 7.3 12.3C7.2 12.4 7.09999 12.4 6.89999 12.4C6.69999 12.4 6.6 12.3 6.5 12.2C6.4 12.1 6.3 11.9 6.3 11.7C6.3 11.5 6.4 11.3 6.5 11.1C6.6 10.9 6.8 10.7 7 10.5C7.2 10.3 7.49999 10.1 7.89999 10C8.29999 9.90003 8.60001 9.80003 9.10001 9.80003C9.50001 9.80003 9.80001 9.90003 10.1 10C10.4 10.1 10.7 10.3 10.9 10.4C11.1 10.5 11.3 10.8 11.4 11.1C11.5 11.4 11.6 11.6 11.6 11.9C11.6 12.3 11.5 12.6 11.3 12.9C11.1 13.2 10.9 13.5 10.6 13.7C10.9 13.9 11.2 14.1 11.4 14.3C11.6 14.5 11.8 14.7 11.9 15C12 15.3 12.1 15.5 12.1 15.8C12.1 16.2 12 16.5 11.9 16.8C11.8 17.1 11.5 17.4 11.3 17.7C11.1 18 10.7 18.2 10.3 18.3C9.9 18.4 9.5 18.5 9 18.5C8.5 18.5 8.1 18.4 7.7 18.2C7.3 18 7 17.8 6.8 17.6C6.6 17.4 6.4 17.1 6.3 16.8C6.2 16.5 6.10001 16.3 6.10001 16.1C6.10001 15.9 6.2 15.7 6.3 15.6C6.4 15.5 6.6 15.4 6.8 15.4C6.9 15.4 7.00001 15.4 7.10001 15.5C7.20001 15.6 7.3 15.6 7.3 15.7C7.5 16.2 7.7 16.6 8 16.9C8.3 17.2 8.6 17.3 9 17.3C9.2 17.3 9.5 17.2 9.7 17.1C9.9 17 10.1 16.8 10.3 16.6C10.5 16.4 10.5 16.1 10.5 15.8C10.5 15.3 10.4 15 10.1 14.7C9.80001 14.4 9.50001 14.3 9.10001 14.3C9.00001 14.3 8.9 14.3 8.7 14.3C8.5 14.3 8.39999 14.3 8.39999 14.3C8.19999 14.3 7.99999 14.2 7.89999 14.1C7.79999 14 7.7 13.8 7.7 13.7C7.7 13.5 7.79999 13.4 7.89999 13.2C7.99999 13 8.2 13 8.5 13H8.8V13.1ZM15.3 17.5V12.2C14.3 13 13.6 13.3 13.3 13.3C13.1 13.3 13 13.2 12.9 13.1C12.8 13 12.7 12.8 12.7 12.6C12.7 12.4 12.8 12.3 12.9 12.2C13 12.1 13.2 12 13.6 11.8C14.1 11.6 14.5 11.3 14.7 11.1C14.9 10.9 15.2 10.6 15.5 10.3C15.8 10 15.9 9.80003 15.9 9.70003C15.9 9.60003 16.1 9.60004 16.3 9.60004C16.5 9.60004 16.7 9.70003 16.8 9.80003C16.9 9.90003 17 10.2 17 10.5V17.2C17 18 16.7 18.4 16.2 18.4C16 18.4 15.8 18.3 15.6 18.2C15.4 18.1 15.3 17.8 15.3 17.5Z" fill="currentColor" />
																			</svg>
																		</span>
																		<input class="form-control form-control-solid ps-12 fs-7" name="asset_pur_date_add" placeholder="Date" id="asset_pur_date_add"/>
																	</div>
																</td>
																<td>
																	<select class="form-select form-select-solid fs-7" data-width="110px" name="" id="" data-control="select2" data-hide-search="false">
																		<option value="">Select</option>
																		<option value="1">Electronics</option>
																		<option value="2">Stationary</option>
																		<option value="3">Others</option>
																	</select>
																</td>
																<td>
																	<select class="form-select form-select-solid fs-7" data-width="110px" name="" id="" data-control="select2" data-hide-search="false">
																		<option value="">Select</option>
																		<option value="1">Mobile</option>
																		<option value="2">Moniter</option>
																		<option value="3">Keyboard</option>
																		<option value="4">Mouse</option>
																	</select>
																</td>
																<td>
																	<input type="text" name="" class="form-control form-control-lg1 form-control-solid fs-7" placeholder="Name" id="">
																</td>
																<td>
																	<input type="text" name="" class="form-control form-control-lg1 form-control-solid fs-7" placeholder="Value" id="">
																</td>
																<td>
																	<select class="form-select form-select-solid fs-7" data-width="110px" name="" id="" data-control="select2" data-hide-search="false">
																		<option value="">Select</option>
																		<option value="1">Company</option>
																		<option value="2">Staff</option>
																	</select>
																</td>
																<td>
																	<select class="form-select form-select-solid fs-7" data-width="110px" name="" id="" data-control="select2" data-hide-search="false">
																		<option value="">Select</option>
																		<option value="1">Esakki</option>
																		<option value="2">Priya</option>
																		<option value="3">Vasan</option>
																		<option value="4">Gowri</option>
																	</select>
																</td>
																<td>
													            	<div class="image-input mt-2" data-kt-image-input="true">
																		<div class="image-input-wrapper w-40px h-40px" style="background-image: url(assets/images/asset.png)"></div>
																		<!--end::Preview existing avatar-->
																		<!--begin::Label-->
																		<label class="btn btn-icon btn-active-color-primary w-40px h-25px" data-kt-image-input-action="change" data-bs-toggle="tooltip" data-kt-initialized="1">
																			<i class="bi bi-pencil-fill fs-8 ms-3"></i>
																			<!--begin::Inputs-->
																			<input type="file" name="add_party_redemp" accept=".png, .jpg, .jpeg">
																			<input type="hidden" name="add_party_remove_redemp">
																			<!--end::Inputs-->
																		</label>
																		<!--end::Label-->
																		<!--begin::Cancel-->
																		<span class="btn btn-icon btn-active-color-primary w-25px h-20px" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" data-kt-initialized="1">
																			<i class="bi bi-x fs-3 ms-2"></i>
																		</span>
																		<!--end::Cancel-->
																		<!--begin::Remove-->
																		<span class="btn btn-icon btn-active-color-primary w-25px h-20px" data-kt-image-input-action="remove" data-bs-toggle="tooltip" data-kt-initialized="1">
																			<i class="bi bi-x fs-3 ms-2"></i>
																		</span>
																		<!--end::Remove-->
																	</div>
													            </td>
													            <td>
													            	<div class="image-input mt-2" data-kt-image-input="true">
																		<div class="image-input-wrapper w-40px h-40px" style="background-image: url(assets/images/warrenty_card.png)"></div>
																		<!--end::Preview existing avatar-->
																		<!--begin::Label-->
																		<label class="btn btn-icon btn-active-color-primary w-40px h-25px" data-kt-image-input-action="change" data-bs-toggle="tooltip" data-kt-initialized="1">
																			<i class="bi bi-pencil-fill fs-8 ms-3"></i>
																			<!--begin::Inputs-->
																			<input type="file" name="add_party_redemp" accept=".png, .jpg, .jpeg">
																			<input type="hidden" name="add_party_remove_redemp">
																			<!--end::Inputs-->
																		</label>
																		<!--end::Label-->
																		<!--begin::Cancel-->
																		<span class="btn btn-icon btn-active-color-primary w-25px h-20px" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" data-kt-initialized="1">
																			<i class="bi bi-x fs-3 ms-2"></i>
																		</span>
																		<!--end::Cancel-->
																		<!--begin::Remove-->
																		<span class="btn btn-icon btn-active-color-primary w-25px h-20px" data-kt-image-input-action="remove" data-bs-toggle="tooltip" data-kt-initialized="1">
																			<i class="bi bi-x fs-3 ms-2"></i>
																		</span>
																		<!--end::Remove-->
																	</div>
													            </td>
																<td>
																	<textarea class="form-control form-control-solid fs-7" rows="1" placeholder="Remarks" name="" id=""></textarea>
																</td>
															</tr>
															<tr id="asset_mgnt_tr_2" style="display: none;">
																<td>
																	<div class="d-flex align-items-center">
																		<span class="svg-icon position-absolute ms-4 svg-icon-2 dt">
																			<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																				<path opacity="0.3" d="M21 22H3C2.4 22 2 21.6 2 21V5C2 4.4 2.4 4 3 4H21C21.6 4 22 4.4 22 5V21C22 21.6 21.6 22 21 22Z" fill="currentColor" />
																				<path d="M6 6C5.4 6 5 5.6 5 5V3C5 2.4 5.4 2 6 2C6.6 2 7 2.4 7 3V5C7 5.6 6.6 6 6 6ZM11 5V3C11 2.4 10.6 2 10 2C9.4 2 9 2.4 9 3V5C9 5.6 9.4 6 10 6C10.6 6 11 5.6 11 5ZM15 5V3C15 2.4 14.6 2 14 2C13.4 2 13 2.4 13 3V5C13 5.6 13.4 6 14 6C14.6 6 15 5.6 15 5ZM19 5V3C19 2.4 18.6 2 18 2C17.4 2 17 2.4 17 3V5C17 5.6 17.4 6 18 6C18.6 6 19 5.6 19 5Z" fill="currentColor" />
																				<path d="M8.8 13.1C9.2 13.1 9.5 13 9.7 12.8C9.9 12.6 10.1 12.3 10.1 11.9C10.1 11.6 10 11.3 9.8 11.1C9.6 10.9 9.3 10.8 9 10.8C8.8 10.8 8.59999 10.8 8.39999 10.9C8.19999 11 8.1 11.1 8 11.2C7.9 11.3 7.8 11.4 7.7 11.6C7.6 11.8 7.5 11.9 7.5 12.1C7.5 12.2 7.4 12.2 7.3 12.3C7.2 12.4 7.09999 12.4 6.89999 12.4C6.69999 12.4 6.6 12.3 6.5 12.2C6.4 12.1 6.3 11.9 6.3 11.7C6.3 11.5 6.4 11.3 6.5 11.1C6.6 10.9 6.8 10.7 7 10.5C7.2 10.3 7.49999 10.1 7.89999 10C8.29999 9.90003 8.60001 9.80003 9.10001 9.80003C9.50001 9.80003 9.80001 9.90003 10.1 10C10.4 10.1 10.7 10.3 10.9 10.4C11.1 10.5 11.3 10.8 11.4 11.1C11.5 11.4 11.6 11.6 11.6 11.9C11.6 12.3 11.5 12.6 11.3 12.9C11.1 13.2 10.9 13.5 10.6 13.7C10.9 13.9 11.2 14.1 11.4 14.3C11.6 14.5 11.8 14.7 11.9 15C12 15.3 12.1 15.5 12.1 15.8C12.1 16.2 12 16.5 11.9 16.8C11.8 17.1 11.5 17.4 11.3 17.7C11.1 18 10.7 18.2 10.3 18.3C9.9 18.4 9.5 18.5 9 18.5C8.5 18.5 8.1 18.4 7.7 18.2C7.3 18 7 17.8 6.8 17.6C6.6 17.4 6.4 17.1 6.3 16.8C6.2 16.5 6.10001 16.3 6.10001 16.1C6.10001 15.9 6.2 15.7 6.3 15.6C6.4 15.5 6.6 15.4 6.8 15.4C6.9 15.4 7.00001 15.4 7.10001 15.5C7.20001 15.6 7.3 15.6 7.3 15.7C7.5 16.2 7.7 16.6 8 16.9C8.3 17.2 8.6 17.3 9 17.3C9.2 17.3 9.5 17.2 9.7 17.1C9.9 17 10.1 16.8 10.3 16.6C10.5 16.4 10.5 16.1 10.5 15.8C10.5 15.3 10.4 15 10.1 14.7C9.80001 14.4 9.50001 14.3 9.10001 14.3C9.00001 14.3 8.9 14.3 8.7 14.3C8.5 14.3 8.39999 14.3 8.39999 14.3C8.19999 14.3 7.99999 14.2 7.89999 14.1C7.79999 14 7.7 13.8 7.7 13.7C7.7 13.5 7.79999 13.4 7.89999 13.2C7.99999 13 8.2 13 8.5 13H8.8V13.1ZM15.3 17.5V12.2C14.3 13 13.6 13.3 13.3 13.3C13.1 13.3 13 13.2 12.9 13.1C12.8 13 12.7 12.8 12.7 12.6C12.7 12.4 12.8 12.3 12.9 12.2C13 12.1 13.2 12 13.6 11.8C14.1 11.6 14.5 11.3 14.7 11.1C14.9 10.9 15.2 10.6 15.5 10.3C15.8 10 15.9 9.80003 15.9 9.70003C15.9 9.60003 16.1 9.60004 16.3 9.60004C16.5 9.60004 16.7 9.70003 16.8 9.80003C16.9 9.90003 17 10.2 17 10.5V17.2C17 18 16.7 18.4 16.2 18.4C16 18.4 15.8 18.3 15.6 18.2C15.4 18.1 15.3 17.8 15.3 17.5Z" fill="currentColor" />
																			</svg>
																		</span>
																		<input class="form-control form-control-solid ps-12 fs-7" name="asset_pur_date_add" placeholder="Date" id="asset_pur_date_add"/>
																	</div>
																</td>
																<td>
																	<select class="form-select form-select-solid fs-7" data-width="110px" name="" id="" data-control="select2" data-hide-search="false">
																		<option value="">Select</option>
																		<option value="1">Electronics</option>
																		<option value="2">Stationary</option>
																		<option value="3">Others</option>
																	</select>
																</td>
																<td>
																	<select class="form-select form-select-solid fs-7" data-width="110px" name="" id="" data-control="select2" data-hide-search="false">
																		<option value="">Select</option>
																		<option value="1">Mobile</option>
																		<option value="2">Moniter</option>
																		<option value="3">Keyboard</option>
																		<option value="4">Mouse</option>
																	</select>
																</td>
																<td>
																	<input type="text" name="" class="form-control form-control-lg1 form-control-solid fs-7" placeholder="Name" id="">
																</td>
																<td>
																	<input type="text" name="" class="form-control form-control-lg1 form-control-solid fs-7" placeholder="Value" id="">
																</td>
																<td>
																	<select class="form-select form-select-solid fs-7" data-width="110px" name="" id="" data-control="select2" data-hide-search="false">
																		<option value="">Select</option>
																		<option value="1">Company</option>
																		<option value="2">Staff</option>
																	</select>
																</td>
																<td>
																	<input type="text" name="" class="form-control form-control-lg1 form-control-solid fs-7" placeholder="Place" id="">
																</td>
																<td>
													            	<div class="image-input mt-2" data-kt-image-input="true">
																		<div class="image-input-wrapper w-40px h-40px" style="background-image: url(assets/images/asset.png)"></div>
																		<!--end::Preview existing avatar-->
																		<!--begin::Label-->
																		<label class="btn btn-icon btn-active-color-primary w-40px h-25px" data-kt-image-input-action="change" data-bs-toggle="tooltip" data-kt-initialized="1">
																			<i class="bi bi-pencil-fill fs-8 ms-3"></i>
																			<!--begin::Inputs-->
																			<input type="file" name="add_party_redemp" accept=".png, .jpg, .jpeg">
																			<input type="hidden" name="add_party_remove_redemp">
																			<!--end::Inputs-->
																		</label>
																		<!--end::Label-->
																		<!--begin::Cancel-->
																		<span class="btn btn-icon btn-active-color-primary w-25px h-20px" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" data-kt-initialized="1">
																			<i class="bi bi-x fs-3 ms-2"></i>
																		</span>
																		<!--end::Cancel-->
																		<!--begin::Remove-->
																		<span class="btn btn-icon btn-active-color-primary w-25px h-20px" data-kt-image-input-action="remove" data-bs-toggle="tooltip" data-kt-initialized="1">
																			<i class="bi bi-x fs-3 ms-2"></i>
																		</span>
																		<!--end::Remove-->
																	</div>
													            </td>
													            <td>
													            	<div class="image-input mt-2" data-kt-image-input="true">
																		<div class="image-input-wrapper w-40px h-40px" style="background-image: url(assets/images/warrenty_card.png)"></div>
																		<!--end::Preview existing avatar-->
																		<!--begin::Label-->
																		<label class="btn btn-icon btn-active-color-primary w-40px h-25px" data-kt-image-input-action="change" data-bs-toggle="tooltip" data-kt-initialized="1">
																			<i class="bi bi-pencil-fill fs-8 ms-3"></i>
																			<!--begin::Inputs-->
																			<input type="file" name="add_party_redemp" accept=".png, .jpg, .jpeg">
																			<input type="hidden" name="add_party_remove_redemp">
																			<!--end::Inputs-->
																		</label>
																		<!--end::Label-->
																		<!--begin::Cancel-->
																		<span class="btn btn-icon btn-active-color-primary w-25px h-20px" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" data-kt-initialized="1">
																			<i class="bi bi-x fs-3 ms-2"></i>
																		</span>
																		<!--end::Cancel-->
																		<!--begin::Remove-->
																		<span class="btn btn-icon btn-active-color-primary w-25px h-20px" data-kt-image-input-action="remove" data-bs-toggle="tooltip" data-kt-initialized="1">
																			<i class="bi bi-x fs-3 ms-2"></i>
																		</span>
																		<!--end::Remove-->
																	</div>
													            </td>
																<td>
																	<textarea class="form-control form-control-solid fs-7" rows="1" placeholder="Remarks" name="" id=""></textarea>
																</td>
															</tr>
															<tr id="asset_mgnt_tr_3" style="display: none;">
																<td>
																	<div class="d-flex align-items-center">
																		<span class="svg-icon position-absolute ms-4 svg-icon-2 dt">
																			<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																				<path opacity="0.3" d="M21 22H3C2.4 22 2 21.6 2 21V5C2 4.4 2.4 4 3 4H21C21.6 4 22 4.4 22 5V21C22 21.6 21.6 22 21 22Z" fill="currentColor" />
																				<path d="M6 6C5.4 6 5 5.6 5 5V3C5 2.4 5.4 2 6 2C6.6 2 7 2.4 7 3V5C7 5.6 6.6 6 6 6ZM11 5V3C11 2.4 10.6 2 10 2C9.4 2 9 2.4 9 3V5C9 5.6 9.4 6 10 6C10.6 6 11 5.6 11 5ZM15 5V3C15 2.4 14.6 2 14 2C13.4 2 13 2.4 13 3V5C13 5.6 13.4 6 14 6C14.6 6 15 5.6 15 5ZM19 5V3C19 2.4 18.6 2 18 2C17.4 2 17 2.4 17 3V5C17 5.6 17.4 6 18 6C18.6 6 19 5.6 19 5Z" fill="currentColor" />
																				<path d="M8.8 13.1C9.2 13.1 9.5 13 9.7 12.8C9.9 12.6 10.1 12.3 10.1 11.9C10.1 11.6 10 11.3 9.8 11.1C9.6 10.9 9.3 10.8 9 10.8C8.8 10.8 8.59999 10.8 8.39999 10.9C8.19999 11 8.1 11.1 8 11.2C7.9 11.3 7.8 11.4 7.7 11.6C7.6 11.8 7.5 11.9 7.5 12.1C7.5 12.2 7.4 12.2 7.3 12.3C7.2 12.4 7.09999 12.4 6.89999 12.4C6.69999 12.4 6.6 12.3 6.5 12.2C6.4 12.1 6.3 11.9 6.3 11.7C6.3 11.5 6.4 11.3 6.5 11.1C6.6 10.9 6.8 10.7 7 10.5C7.2 10.3 7.49999 10.1 7.89999 10C8.29999 9.90003 8.60001 9.80003 9.10001 9.80003C9.50001 9.80003 9.80001 9.90003 10.1 10C10.4 10.1 10.7 10.3 10.9 10.4C11.1 10.5 11.3 10.8 11.4 11.1C11.5 11.4 11.6 11.6 11.6 11.9C11.6 12.3 11.5 12.6 11.3 12.9C11.1 13.2 10.9 13.5 10.6 13.7C10.9 13.9 11.2 14.1 11.4 14.3C11.6 14.5 11.8 14.7 11.9 15C12 15.3 12.1 15.5 12.1 15.8C12.1 16.2 12 16.5 11.9 16.8C11.8 17.1 11.5 17.4 11.3 17.7C11.1 18 10.7 18.2 10.3 18.3C9.9 18.4 9.5 18.5 9 18.5C8.5 18.5 8.1 18.4 7.7 18.2C7.3 18 7 17.8 6.8 17.6C6.6 17.4 6.4 17.1 6.3 16.8C6.2 16.5 6.10001 16.3 6.10001 16.1C6.10001 15.9 6.2 15.7 6.3 15.6C6.4 15.5 6.6 15.4 6.8 15.4C6.9 15.4 7.00001 15.4 7.10001 15.5C7.20001 15.6 7.3 15.6 7.3 15.7C7.5 16.2 7.7 16.6 8 16.9C8.3 17.2 8.6 17.3 9 17.3C9.2 17.3 9.5 17.2 9.7 17.1C9.9 17 10.1 16.8 10.3 16.6C10.5 16.4 10.5 16.1 10.5 15.8C10.5 15.3 10.4 15 10.1 14.7C9.80001 14.4 9.50001 14.3 9.10001 14.3C9.00001 14.3 8.9 14.3 8.7 14.3C8.5 14.3 8.39999 14.3 8.39999 14.3C8.19999 14.3 7.99999 14.2 7.89999 14.1C7.79999 14 7.7 13.8 7.7 13.7C7.7 13.5 7.79999 13.4 7.89999 13.2C7.99999 13 8.2 13 8.5 13H8.8V13.1ZM15.3 17.5V12.2C14.3 13 13.6 13.3 13.3 13.3C13.1 13.3 13 13.2 12.9 13.1C12.8 13 12.7 12.8 12.7 12.6C12.7 12.4 12.8 12.3 12.9 12.2C13 12.1 13.2 12 13.6 11.8C14.1 11.6 14.5 11.3 14.7 11.1C14.9 10.9 15.2 10.6 15.5 10.3C15.8 10 15.9 9.80003 15.9 9.70003C15.9 9.60003 16.1 9.60004 16.3 9.60004C16.5 9.60004 16.7 9.70003 16.8 9.80003C16.9 9.90003 17 10.2 17 10.5V17.2C17 18 16.7 18.4 16.2 18.4C16 18.4 15.8 18.3 15.6 18.2C15.4 18.1 15.3 17.8 15.3 17.5Z" fill="currentColor" />
																			</svg>
																		</span>
																		<input class="form-control form-control-solid ps-12 fs-7" name="asset_pur_date_add" placeholder="Date" id="asset_pur_date_add"/>
																	</div>
																</td>
																<td>
																	<select class="form-select form-select-solid fs-7" data-width="110px" name="" id="" data-control="select2" data-hide-search="false">
																		<option value="">Select</option>
																		<option value="1">Electronics</option>
																		<option value="2">Stationary</option>
																		<option value="3">Others</option>
																	</select>
																</td>
																<td>
																	<select class="form-select form-select-solid fs-7" data-width="110px" name="" id="" data-control="select2" data-hide-search="false">
																		<option value="">Select</option>
																		<option value="1">Mobile</option>
																		<option value="2">Moniter</option>
																		<option value="3">Keyboard</option>
																		<option value="4">Mouse</option>
																	</select>
																</td>
																<td>
																	<input type="text" name="" class="form-control form-control-lg1 form-control-solid fs-7" placeholder="Name" id="">
																</td>
																<td>
																	<input type="text" name="" class="form-control form-control-lg1 form-control-solid fs-7" placeholder="Value" id="">
																</td>
																<td>
																	<select class="form-select form-select-solid fs-7" data-width="110px" name="" id="" data-control="select2" data-hide-search="false">
																		<option value="">Select</option>
																		<option value="1">Company</option>
																		<option value="2">Staff</option>
																	</select>
																</td>
																<td>
																	<select class="form-select form-select-solid fs-7" data-width="110px" name="" id="" data-control="select2" data-hide-search="false">
																		<option value="">Select</option>
																		<option value="1">Esakki</option>
																		<option value="2">Priya</option>
																		<option value="3">Vasan</option>
																		<option value="4">Gowri</option>
																	</select>
																</td>
																<td>
													            	<div class="image-input mt-2" data-kt-image-input="true">
																		<div class="image-input-wrapper w-40px h-40px" style="background-image: url(assets/images/asset.png)"></div>
																		<!--end::Preview existing avatar-->
																		<!--begin::Label-->
																		<label class="btn btn-icon btn-active-color-primary w-40px h-25px" data-kt-image-input-action="change" data-bs-toggle="tooltip" data-kt-initialized="1">
																			<i class="bi bi-pencil-fill fs-8 ms-3"></i>
																			<!--begin::Inputs-->
																			<input type="file" name="add_party_redemp" accept=".png, .jpg, .jpeg">
																			<input type="hidden" name="add_party_remove_redemp">
																			<!--end::Inputs-->
																		</label>
																		<!--end::Label-->
																		<!--begin::Cancel-->
																		<span class="btn btn-icon btn-active-color-primary w-25px h-20px" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" data-kt-initialized="1">
																			<i class="bi bi-x fs-3 ms-2"></i>
																		</span>
																		<!--end::Cancel-->
																		<!--begin::Remove-->
																		<span class="btn btn-icon btn-active-color-primary w-25px h-20px" data-kt-image-input-action="remove" data-bs-toggle="tooltip" data-kt-initialized="1">
																			<i class="bi bi-x fs-3 ms-2"></i>
																		</span>
																		<!--end::Remove-->
																	</div>
													            </td>
													            <td>
													            	<div class="image-input mt-2" data-kt-image-input="true">
																		<div class="image-input-wrapper w-40px h-40px" style="background-image: url(assets/images/warrenty_card.png)"></div>
																		<!--end::Preview existing avatar-->
																		<!--begin::Label-->
																		<label class="btn btn-icon btn-active-color-primary w-40px h-25px" data-kt-image-input-action="change" data-bs-toggle="tooltip" data-kt-initialized="1">
																			<i class="bi bi-pencil-fill fs-8 ms-3"></i>
																			<!--begin::Inputs-->
																			<input type="file" name="add_party_redemp" accept=".png, .jpg, .jpeg">
																			<input type="hidden" name="add_party_remove_redemp">
																			<!--end::Inputs-->
																		</label>
																		<!--end::Label-->
																		<!--begin::Cancel-->
																		<span class="btn btn-icon btn-active-color-primary w-25px h-20px" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" data-kt-initialized="1">
																			<i class="bi bi-x fs-3 ms-2"></i>
																		</span>
																		<!--end::Cancel-->
																		<!--begin::Remove-->
																		<span class="btn btn-icon btn-active-color-primary w-25px h-20px" data-kt-image-input-action="remove" data-bs-toggle="tooltip" data-kt-initialized="1">
																			<i class="bi bi-x fs-3 ms-2"></i>
																		</span>
																		<!--end::Remove-->
																	</div>
													            </td>
																<td>
																	<textarea class="form-control form-control-solid fs-7" rows="1" placeholder="Remarks" name="" id=""></textarea>
																</td>
															</tr>
															<tr id="asset_mgnt_tr_4" style="display: none;">
																<td>
																	<div class="d-flex align-items-center">
																		<span class="svg-icon position-absolute ms-4 svg-icon-2 dt">
																			<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																				<path opacity="0.3" d="M21 22H3C2.4 22 2 21.6 2 21V5C2 4.4 2.4 4 3 4H21C21.6 4 22 4.4 22 5V21C22 21.6 21.6 22 21 22Z" fill="currentColor" />
																				<path d="M6 6C5.4 6 5 5.6 5 5V3C5 2.4 5.4 2 6 2C6.6 2 7 2.4 7 3V5C7 5.6 6.6 6 6 6ZM11 5V3C11 2.4 10.6 2 10 2C9.4 2 9 2.4 9 3V5C9 5.6 9.4 6 10 6C10.6 6 11 5.6 11 5ZM15 5V3C15 2.4 14.6 2 14 2C13.4 2 13 2.4 13 3V5C13 5.6 13.4 6 14 6C14.6 6 15 5.6 15 5ZM19 5V3C19 2.4 18.6 2 18 2C17.4 2 17 2.4 17 3V5C17 5.6 17.4 6 18 6C18.6 6 19 5.6 19 5Z" fill="currentColor" />
																				<path d="M8.8 13.1C9.2 13.1 9.5 13 9.7 12.8C9.9 12.6 10.1 12.3 10.1 11.9C10.1 11.6 10 11.3 9.8 11.1C9.6 10.9 9.3 10.8 9 10.8C8.8 10.8 8.59999 10.8 8.39999 10.9C8.19999 11 8.1 11.1 8 11.2C7.9 11.3 7.8 11.4 7.7 11.6C7.6 11.8 7.5 11.9 7.5 12.1C7.5 12.2 7.4 12.2 7.3 12.3C7.2 12.4 7.09999 12.4 6.89999 12.4C6.69999 12.4 6.6 12.3 6.5 12.2C6.4 12.1 6.3 11.9 6.3 11.7C6.3 11.5 6.4 11.3 6.5 11.1C6.6 10.9 6.8 10.7 7 10.5C7.2 10.3 7.49999 10.1 7.89999 10C8.29999 9.90003 8.60001 9.80003 9.10001 9.80003C9.50001 9.80003 9.80001 9.90003 10.1 10C10.4 10.1 10.7 10.3 10.9 10.4C11.1 10.5 11.3 10.8 11.4 11.1C11.5 11.4 11.6 11.6 11.6 11.9C11.6 12.3 11.5 12.6 11.3 12.9C11.1 13.2 10.9 13.5 10.6 13.7C10.9 13.9 11.2 14.1 11.4 14.3C11.6 14.5 11.8 14.7 11.9 15C12 15.3 12.1 15.5 12.1 15.8C12.1 16.2 12 16.5 11.9 16.8C11.8 17.1 11.5 17.4 11.3 17.7C11.1 18 10.7 18.2 10.3 18.3C9.9 18.4 9.5 18.5 9 18.5C8.5 18.5 8.1 18.4 7.7 18.2C7.3 18 7 17.8 6.8 17.6C6.6 17.4 6.4 17.1 6.3 16.8C6.2 16.5 6.10001 16.3 6.10001 16.1C6.10001 15.9 6.2 15.7 6.3 15.6C6.4 15.5 6.6 15.4 6.8 15.4C6.9 15.4 7.00001 15.4 7.10001 15.5C7.20001 15.6 7.3 15.6 7.3 15.7C7.5 16.2 7.7 16.6 8 16.9C8.3 17.2 8.6 17.3 9 17.3C9.2 17.3 9.5 17.2 9.7 17.1C9.9 17 10.1 16.8 10.3 16.6C10.5 16.4 10.5 16.1 10.5 15.8C10.5 15.3 10.4 15 10.1 14.7C9.80001 14.4 9.50001 14.3 9.10001 14.3C9.00001 14.3 8.9 14.3 8.7 14.3C8.5 14.3 8.39999 14.3 8.39999 14.3C8.19999 14.3 7.99999 14.2 7.89999 14.1C7.79999 14 7.7 13.8 7.7 13.7C7.7 13.5 7.79999 13.4 7.89999 13.2C7.99999 13 8.2 13 8.5 13H8.8V13.1ZM15.3 17.5V12.2C14.3 13 13.6 13.3 13.3 13.3C13.1 13.3 13 13.2 12.9 13.1C12.8 13 12.7 12.8 12.7 12.6C12.7 12.4 12.8 12.3 12.9 12.2C13 12.1 13.2 12 13.6 11.8C14.1 11.6 14.5 11.3 14.7 11.1C14.9 10.9 15.2 10.6 15.5 10.3C15.8 10 15.9 9.80003 15.9 9.70003C15.9 9.60003 16.1 9.60004 16.3 9.60004C16.5 9.60004 16.7 9.70003 16.8 9.80003C16.9 9.90003 17 10.2 17 10.5V17.2C17 18 16.7 18.4 16.2 18.4C16 18.4 15.8 18.3 15.6 18.2C15.4 18.1 15.3 17.8 15.3 17.5Z" fill="currentColor" />
																			</svg>
																		</span>
																		<input class="form-control form-control-solid ps-12 fs-7" name="asset_pur_date_add" placeholder="Date" id="asset_pur_date_add"/>
																	</div>
																</td>
																<td>
																	<select class="form-select form-select-solid fs-7" data-width="110px" name="" id="" data-control="select2" data-hide-search="false">
																		<option value="">Select</option>
																		<option value="1">Electronics</option>
																		<option value="2">Stationary</option>
																		<option value="3">Others</option>
																	</select>
																</td>
																<td>
																	<select class="form-select form-select-solid fs-7" data-width="110px" name="" id="" data-control="select2" data-hide-search="false">
																		<option value="">Select</option>
																		<option value="1">Mobile</option>
																		<option value="2">Moniter</option>
																		<option value="3">Keyboard</option>
																		<option value="4">Mouse</option>
																	</select>
																</td>
																<td>
																	<input type="text" name="" class="form-control form-control-lg1 form-control-solid fs-7" placeholder="Name" id="">
																</td>
																<td>
																	<input type="text" name="" class="form-control form-control-lg1 form-control-solid fs-7" placeholder="Value" id="">
																</td>
																<td>
																	<select class="form-select form-select-solid fs-7" data-width="110px" name="" id="" data-control="select2" data-hide-search="false">
																		<option value="">Select</option>
																		<option value="1">Company</option>
																		<option value="2">Staff</option>
																	</select>
																</td>
																<td>
																	<select class="form-select form-select-solid fs-7" data-width="110px" name="" id="" data-control="select2" data-hide-search="false">
																		<option value="">Select</option>
																		<option value="1">Esakki</option>
																		<option value="2">Priya</option>
																		<option value="3">Vasan</option>
																		<option value="4">Gowri</option>
																	</select>
																</td>
																<td>
													            	<div class="image-input mt-2" data-kt-image-input="true">
																		<div class="image-input-wrapper w-40px h-40px" style="background-image: url(assets/images/asset.png)"></div>
																		<!--end::Preview existing avatar-->
																		<!--begin::Label-->
																		<label class="btn btn-icon btn-active-color-primary w-40px h-25px" data-kt-image-input-action="change" data-bs-toggle="tooltip" data-kt-initialized="1">
																			<i class="bi bi-pencil-fill fs-8 ms-3"></i>
																			<!--begin::Inputs-->
																			<input type="file" name="add_party_redemp" accept=".png, .jpg, .jpeg">
																			<input type="hidden" name="add_party_remove_redemp">
																			<!--end::Inputs-->
																		</label>
																		<!--end::Label-->
																		<!--begin::Cancel-->
																		<span class="btn btn-icon btn-active-color-primary w-25px h-20px" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" data-kt-initialized="1">
																			<i class="bi bi-x fs-3 ms-2"></i>
																		</span>
																		<!--end::Cancel-->
																		<!--begin::Remove-->
																		<span class="btn btn-icon btn-active-color-primary w-25px h-20px" data-kt-image-input-action="remove" data-bs-toggle="tooltip" data-kt-initialized="1">
																			<i class="bi bi-x fs-3 ms-2"></i>
																		</span>
																		<!--end::Remove-->
																	</div>
													            </td>
													            <td>
													            	<div class="image-input mt-2" data-kt-image-input="true">
																		<div class="image-input-wrapper w-40px h-40px" style="background-image: url(assets/images/warrenty_card.png)"></div>
																		<!--end::Preview existing avatar-->
																		<!--begin::Label-->
																		<label class="btn btn-icon btn-active-color-primary w-40px h-25px" data-kt-image-input-action="change" data-bs-toggle="tooltip" data-kt-initialized="1">
																			<i class="bi bi-pencil-fill fs-8 ms-3"></i>
																			<!--begin::Inputs-->
																			<input type="file" name="add_party_redemp" accept=".png, .jpg, .jpeg">
																			<input type="hidden" name="add_party_remove_redemp">
																			<!--end::Inputs-->
																		</label>
																		<!--end::Label-->
																		<!--begin::Cancel-->
																		<span class="btn btn-icon btn-active-color-primary w-25px h-20px" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" data-kt-initialized="1">
																			<i class="bi bi-x fs-3 ms-2"></i>
																		</span>
																		<!--end::Cancel-->
																		<!--begin::Remove-->
																		<span class="btn btn-icon btn-active-color-primary w-25px h-20px" data-kt-image-input-action="remove" data-bs-toggle="tooltip" data-kt-initialized="1">
																			<i class="bi bi-x fs-3 ms-2"></i>
																		</span>
																		<!--end::Remove-->
																	</div>
													            </td>
																<td>
																	<textarea class="form-control form-control-solid fs-7" rows="1" placeholder="Remarks" name="" id=""></textarea>
																</td>
															</tr>
														</tbody>
													</table>
												</div>
												<div class="d-flex justify-content-end align-items-center mt-3">
													<a href="javascript:;" onclick="show_more_func();" id="show_more_lab">
														<span class="col-form-label text-hover-primary fw-bold fs-6">Show More..</span>
													</a>
													<a href="javascript:;" onclick="hide_func();" style="display:none;" id="hide_lab">
														<span class="col-form-label text-hover-primary fw-bold fs-6">Hide</span>
													</a>
												</div>
											</div>
											<div class="d-flex justify-content-end align-items-center mt-4">
												<button type="reset" class="btn btn-secondary me-3" data-bs-dismiss="modal">Cancel</button>
												<button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Create Asset</button>
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
				<?php include "footer.php"?>
				</div>
				<!--end::Wrapper-->
			</div>
			<!--end::Page-->
		</div>
		<!--end::Root-->

	<?php include "script.php"?>
	<script>
		function show_more_func()
		{
			$("#asset_mgnt_tr_1").show();
			$("#asset_mgnt_tr_2").show();
			$("#asset_mgnt_tr_3").show();
			$("#asset_mgnt_tr_4").show();
			$("#hide_lab").show();
			$("#show_more_lab").hide();
		};
		function hide_func()
		{
			$("#asset_mgnt_tr_1").hide();
			$("#asset_mgnt_tr_2").hide();
			$("#asset_mgnt_tr_3").hide();
			$("#asset_mgnt_tr_4").hide();
			$("#hide_lab").hide();
			$("#show_more_lab").show();
		};
	</script>
	<script>
		$("#asset_date").flatpickr({
				dateFormat: "d-m-Y",
			});
		$("#asset_pur_date_add").flatpickr({
				dateFormat: "d-m-Y",
			});
	</script><script>
	      $("#kt_datatable_asset_mgnt_add").kendoTooltip({
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
			$("#kt_datatable_asset_mgnt_add").DataTable({
				"ordering": false,
				// "aaSorting":[],
				// "iDisplayLength": "10000",
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
			// $('#kt_datatable_asset_mgnt_add').wrap('<div class="dataTables_scroll" />');
		</script>
	</body>
	<!--end::Body-->
	</html>