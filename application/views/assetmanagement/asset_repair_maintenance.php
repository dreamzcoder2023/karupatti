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
	.k-tooltip-content
	{
		min-width: 150px !important;
	}
	.k-animation-container
	{
		max-width: 300px !important;
	}
	.k-animation-container-sm
	{
		max-width: 300px !important;
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
									<h1 class="d-flex align-items-center text-dark fw-bold my-1 fs-3">Asset Repair & Maintenance
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
											<table class="table align-middle table-row-dashed table-striped table-hover fs-7 gy-1 gs-2" id="kt_datatable_asset_mgnt">
												<!--begin::Table head-->
												<thead>
													<tr class="text-start text-muted fw-bold fs-7 gs-0">
														<th class="min-w-80px">Date</th>
														<th class="min-w-80px">Company</th>
														<th class="min-w-80px">Pur.Date /<br>Asset No</th>
														<th class="min-w-80px">Category /<br>Sub Category</th>
														<th class="min-w-80px">Asset Name</th>
														<th class="min-w-50px">Value</th>
														<th class="min-w-80px">Allocated To</th>
														<th class="min-w-80px">Place / Used By</th>
														<th class="min-w-25px">Image</th>
														<th class="min-w-150px">Status</th>
														<th class="min-w-80px"><span class="text-end">Actions</span></th>
													</tr>
												</thead>
												<!--end::Table head-->
												<!--begin::Table body-->
												<tbody class="text-gray-600 fw-semibold">
													<tr>
														<td>25-09-2022</td>
														<td class="ple1">AGB - MAIN BRANCH AYYANAR GOLD BANKERS SKD</td>
														<td>
															<span>20-09-2022</span>
															<label class="d-block">
															 	<span class="badge badge-info fs-7 fw-semibold">AST-0003</span>
															</label>
														</td>
														<td class="ple1">
															<span>Electronics</span>
															<span class="d-block fs-7">Mobile</span>
														</td>
														<td class="ple1">Samsung Galaxy M13</td>
														<td>
															<span class="badge badge-success fs-7 fw-semibold">9,000.00</span>
														</td>
														<td class="ple1">Staff</td>
														<td class="ple1">Priya</td>
														<td>
															<a class="d-block overlay"  href="assets/images/Samsung_Galaxy_M13.jpg" data-fslightbox="lightbox-basic_list">
															    <!--begin::Image-->
															    <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded w-35px h-35px"
															    style="background-image:url('assets/images/Samsung_Galaxy_M13.jpg')">
															    </div>
															    <!--end::Image-->
															    <!--begin::Action-->
															    <div class="overlay-layer card-rounded bg-dark bg-opacity-25 shadow w-35px h-35px">
															        <i class="bi bi-eye-fill text-white fs-2"></i>
															    </div>
															    <!--end::Action-->
														 	</a>
														</td>
														<td>
															<label class="col-form-label fw-semibold fs-7">
																<span style="background-color:red;color: white;border-radius: 8px;padding: 5px 15px 5px 15px;">Damage</span>
															</label>
															<!-- <label class="col-form-label fw-semibold fs-7">
																<span style="background-color:#5fbdff;border-radius: 8px;padding: 5px 15px 5px 15px;">Repair</span>
															</label> -->
															<!-- <label class="col-form-label fw-semibold fs-7">
																<span style="background-color:#ffc700;border-radius: 8px;padding: 5px 15px 5px 15px;">Need To Change</span>
															</label> -->
														</td>
														<td>
															<span class="text-end">
																<a href="#" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm" data-bs-toggle="modal" data-bs-target="#kt_modal_view_asset" title="View">
																	<i class="bi bi-eye-fill eyc"></i>
																</a>
																<button class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
																	<i class="fas fa-ellipsis-v eyc"></i>
																</button>
																<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-250px py-3" data-kt-menu="true" style="">
																	<div class="menu-item px-3">
																		<a href="javascript:;" data-bs-toggle="modal" data-bs-target="#kt_modal_asset_working" class="menu-link px-3">Working Well</a>
																	</div>
																	<div class="menu-item px-3">
																		<a href="javascript:;" data-bs-toggle="modal" data-bs-target="#kt_modal_asset_change" class="menu-link px-3">Need To Change</a>
																	</div>
																	<div class="menu-item px-3">
																		<a href="javascript:;" data-bs-toggle="modal" data-bs-target="#kt_modal_asset_dead" class="menu-link px-3">Dead</a>
																	</div>
																</div>
															</span>
														</td>
													</tr>
													<tr>
														<td>20-09-2022</td>
														<td class="ple1">AGB - MAIN BRANCH AYYANAR GOLD BANKERS SKD</td>
														<td>
															<span>19-09-2022</span>
															<label class="d-block">
															 	<span class="badge badge-info fs-7 fw-semibold">AST-0004</span>
															</label>
														</td>
														<td class="ple1">
															<span>Electronics</span>
															<span class="d-block fs-7">Keyboard</span>
														</td>
														<td class="ple1">Dell Keyboard</td>
														<td>
															<span class="badge badge-success fs-7 fw-semibold">560.00</span>
														</td>
														<td class="ple1">Company</td>
														<td class="ple1">Accounts Department Corner Place Computer</td>
														<td>
															<a class="d-block overlay"  href="assets/images/dell_keyboard.jpg" data-fslightbox="lightbox-basic_list">
															    <!--begin::Image-->
															    <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded w-35px h-35px"
															    style="background-image:url('assets/images/dell_keyboard.jpg')">
															    </div>
															    <!--end::Image-->
															    <!--begin::Action-->
															    <div class="overlay-layer card-rounded bg-dark bg-opacity-25 shadow w-35px h-35px">
															        <i class="bi bi-eye-fill text-white fs-2"></i>
															    </div>
															    <!--end::Action-->
														 	</a>
														</td>
														<td>
															<label class="col-form-label fw-semibold fs-7">
																<span style="background-color:#5fbdff;border-radius: 8px;padding: 5px 15px 5px 15px;">Repair</span>
															</label>
															<!-- <label class="col-form-label fw-semibold fs-7">
																<span style="background-color:#ffc700;border-radius: 8px;padding: 5px 15px 5px 15px;">Need To Change</span>
															</label> -->
														</td>
														<td>
															<span class="text-end">
																<a href="#" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm" data-bs-toggle="modal" data-bs-target="#kt_modal_view_asset" title="View">
																	<i class="bi bi-eye-fill eyc"></i>
																</a>
																<button class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
																	<i class="fas fa-ellipsis-v eyc"></i>
																</button>
																<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-250px py-3" data-kt-menu="true" style="">
																	<div class="menu-item px-3">
																		<a href="javascript:;" data-bs-toggle="modal" data-bs-target="#kt_modal_asset_damage" class="menu-link px-3">Demaged</a>
																	</div>
																	<div class="menu-item px-3">
																		<a href="javascript:;" data-bs-toggle="modal" data-bs-target="#kt_modal_asset_working" class="menu-link px-3">Working Well</a>
																	</div>
																	<div class="menu-item px-3">
																		<a href="javascript:;" data-bs-toggle="modal" data-bs-target="#kt_modal_asset_change" class="menu-link px-3">Need To Change</a>
																	</div>
																	<div class="menu-item px-3">
																		<a href="javascript:;" data-bs-toggle="modal" data-bs-target="#kt_modal_asset_dead" class="menu-link px-3">Dead</a>
																	</div>
																</div>
															</span>
														</td>
													</tr>
													<tr>
														<td>20-09-2022</td>
														<td class="ple1">AGB - MAIN BRANCH AYYANAR GOLD BANKERS SKD</td>
														<td>
															<span>19-09-2022</span>
															<label class="d-block">
															 	<span class="badge badge-info fs-7 fw-semibold">AST-0005</span>
															</label>
														</td>
														<td class="ple1">
															<span>Electronics</span>
															<span class="d-block fs-7">Mouse</span>
														</td>
														<td class="ple1">Dell Mouse</td>
														<td>
															<span class="badge badge-success fs-7 fw-semibold">250.00</span>
														</td>
														<td class="ple1">Company</td>
														<td class="ple1">Accounts Department Corner Place Computer</td>
														<td>
															<a class="d-block overlay"  href="assets/images/dell_mouse.jpg" data-fslightbox="lightbox-basic_list">
															    <!--begin::Image-->
															    <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded w-35px h-35px"
															    style="background-image:url('assets/images/dell_mouse.jpg')">
															    </div>
															    <!--end::Image-->
															    <!--begin::Action-->
															    <div class="overlay-layer card-rounded bg-dark bg-opacity-25 shadow w-35px h-35px">
															        <i class="bi bi-eye-fill text-white fs-2"></i>
															    </div>
															    <!--end::Action-->
														 	</a>
														</td>
														<td>
															<label class="col-form-label fw-semibold fs-7">
																<span style="background-color:#ffc700;border-radius: 8px;padding: 5px 15px 5px 15px;">Need To Change</span>
															</label>
														</td>
														<td>
															<span class="text-end">
																<a href="#" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm" data-bs-toggle="modal" data-bs-target="#kt_modal_view_asset" title="View">
																	<i class="bi bi-eye-fill eyc"></i>
																</a>
																<button class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
																	<i class="fas fa-ellipsis-v eyc"></i>
																</button>
																<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-250px py-3" data-kt-menu="true" style="">
																	<div class="menu-item px-3">
																		<a href="javascript:;" data-bs-toggle="modal" data-bs-target="#kt_modal_asset_damage" class="menu-link px-3">Demaged</a>
																	</div>
																	<div class="menu-item px-3">
																		<a href="javascript:;" data-bs-toggle="modal" data-bs-target="#kt_modal_asset_working" class="menu-link px-3">Working Well</a>
																	</div>
																	<div class="menu-item px-3">
																		<a href="javascript:;" data-bs-toggle="modal" data-bs-target="#kt_modal_asset_dead" class="menu-link px-3">Dead</a>
																	</div>
																</div>
															</span>
														</td>
													</tr>
													<tr>
														<td>01-10-2022</td>
														<td class="ple1">AGB - MAIN BRANCH AYYANAR GOLD BANKERS SKD</td>
														<td>
															<span>01-10-2022</span>
															<label class="d-block">
															 	<span class="badge badge-info fs-7 fw-semibold">AST-0002</span>
															</label>
														</td>
														<td class="ple1">
															<span>Electronics</span>
															<span class="d-block fs-7">Mobile</span>
														</td>
														<td class="ple1">Realme Narzo N53</td>
														<td>
															<span class="badge badge-success fs-7 fw-semibold">8,000.00</span>
														</td>
														<td class="ple1">Staff</td>
														<td class="ple1">Esakki</td>
														<td>
															<a class="d-block overlay"  href="assets/images/Realme_Narzo_N53.jpg" data-fslightbox="lightbox-basic_list">
															    <!--begin::Image-->
															    <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded w-35px h-35px"
															    style="background-image:url('assets/images/Realme_Narzo_N53.jpg')">
															    </div>
															    <!--end::Image-->
															    <!--begin::Action-->
															    <div class="overlay-layer card-rounded bg-dark bg-opacity-25 shadow w-35px h-35px">
															        <i class="bi bi-eye-fill text-white fs-2"></i>
															    </div>
															    <!--end::Action-->
														 	</a>
														</td>
														<td>
															<label class="col-form-label fw-semibold fs-7">
																<span style="background-color:#7bfff9;border-radius: 8px;padding: 5px 15px 5px 15px;">Maintenance</span>
															</label>
														</td>
														<!-- <td>
															<label class="form-check form-switch form-check-custom form-check-solid">
																<input class="form-check-input w-35px h-20px" type="checkbox" value="1" checked="checked">
															</label>
														</td> -->
														<td>
															<span class="text-end">
																<a href="#" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm" data-bs-toggle="modal" data-bs-target="#kt_modal_view_asset" title="View">
																	<i class="bi bi-eye-fill eyc"></i>
																</a>
																<button class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
																	<i class="fas fa-ellipsis-v eyc"></i>
																</button>
																<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-250px py-3" data-kt-menu="true" style="">
																	<div class="menu-item px-3">
																		<a href="javascript:;" data-bs-toggle="modal" data-bs-target="#kt_modal_asset_working" class="menu-link px-3">Working Well</a>
																	</div>
																	<div class="menu-item px-3">
																		<a href="javascript:;" data-bs-toggle="modal" data-bs-target="#kt_modal_asset_repair" class="menu-link px-3">Give For Repair</a>
																	</div>
																	<div class="menu-item px-3">
																		<a href="javascript:;" data-bs-toggle="modal" data-bs-target="#kt_modal_asset_damage" class="menu-link px-3">Demaged</a>
																	</div>
																	<div class="menu-item px-3">
																		<a href="javascript:;" data-bs-toggle="modal" data-bs-target="#kt_modal_asset_change" class="menu-link px-3">Need To Change</a>
																	</div>
																	<div class="menu-item px-3">
																		<a href="javascript:;" data-bs-toggle="modal" data-bs-target="#kt_modal_asset_dead" class="menu-link px-3">Dead</a>
																	</div>
																</div>
															</span>
														</td>
													</tr>
												</tbody>
												<!--end::Table body-->
											</table>
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

		<!--begin::Modal - View Asset -->
		<div class="modal fade" id="kt_modal_view_asset" tabindex="-1" aria-hidden="true" data-bs-keyboard="false" data-bs-backdrop="static">
			<div class="modal-dialog modal-xl-loan">
				<!--begin::Modal content-->
				<div class="modal-content rounded">
					<!--begin::Modal header-->
					<div class="modal-header justify-content-end border-0 pb-0">
						<!--begin::Close-->
						<button class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
							<!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
							<span class="svg-icon svg-icon-1">
								<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
									<rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="currentColor" />
									<rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="currentColor" />
								</svg>
							</span>
							<!--end::Svg Icon-->
						</button>
						<!--end::Close-->
					</div>
					<!--end::Modal header-->
					<div class="modal-body pt-0 pb-15 px-5 px-xl-20">
						<!--begin::Heading-->
						<div class="mb-3 text-center">
							<div class="row">
								<div class="col-lg-7 d-flex justify-content-end align-items-center">
									<h1 class="mb-3">View Asset</h1>
								</div>
								<div class="col-lg-5 d-flex justify-content-end align-items-center">
									<!-- <label class="col-form-label fw-semibold fs-5">
										<span style="background-color:#50cd89;border-radius: 8px;padding: 5px 15px 5px 15px;">Working</span>
									</label> -->
									<label class="col-form-label fw-semibold fs-5">
										<span style="background-color:red;color: white; border-radius: 8px;padding: 5px 15px 5px 15px;">Damage</span>
									</label>
									<!-- <label class="col-form-label fw-semibold fs-5">
										<span style="background-color:#5fbdff;border-radius: 8px;padding: 5px 15px 5px 15px;">Repair</span>
									</label>
									<label class="col-form-label fw-semibold fs-5">
										<span style="background-color:#ffc700;border-radius: 8px;padding: 5px 15px 5px 15px;">Need To Change</span>
									</label>
									<label class="col-form-label fw-semibold fs-5">
										<span style="background-color:#ff4ea0;border-radius: 8px;padding: 5px 15px 5px 15px;">Dead</span>
									</label> -->
								</div>
							</div>
						</div>
						<div class="row">
							<label class="col-lg-1 col-form-label fw-semibold fs-6">Date</label>
							<label class="col-lg-2 col-form-label fw-bold fs-5">25-10-2022</label>
							<label class="col-lg-1 col-form-label fw-semibold fs-6">Asset No</label>
							<label class="col-lg-2 col-form-label fw-bold fs-5">AST-0003</label>
							<div class="col-lg-1">
								<label class="col-form-label fw-semibold fs-6">Company</label>
							</div>
							<label class="col-lg-5 col-form-label fw-bold fs-5">AGB - MAIN BRANCH AYYANAR GOLD BANKERS SKD</label>
							<div class="col-lg-12 mt-4">
								<table class="table align-middle table-row-dashed table-striped table-hover fs-7 gy-1 gs-2" id="kt_datatable_asset_mgnt_view">
									<thead>
										<tr class="text-start text-muted fw-bold fs-7 gs-0">
											<th class="min-w-80px">Pur.Date</th>
											<th class="min-w-80px">Category</th>
											<th class="min-w-80px">Sub Category</th>
											<th class="min-w-80px">Name</th>
											<th class="min-w-80px">Value</th>
											<th class="min-w-80px">Allocated</th>
											<th class="min-w-50px">Place / Used By</th>
											<th class="min-w-25px">Image</th>
											<th class="min-w-25px">War.card</th>
											<th class="min-w-200px">Remarks</th>
										</tr>
									</thead>
									<tbody class="text-gray-600 fw-semibold">
										<tr>
											<td class="ple1">20-10-2023</td>
											<td class="ple1">Electronics</td>
											<td class="ple1">Mobile</td>
											<td class="ple1">Samsung Galaxy M13</td>
											<td class="ple1">9,000.00</td>
											<td class="ple1">Staff</td>
											<td class="ple1">Priya</td>
											<td>
												<a class="d-block overlay"  href="assets/images/Samsung_Galaxy_M13.jpg" data-fslightbox="lightbox-basic_list">
												    <!--begin::Image-->
												    <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded w-35px h-35px"
												    style="background-image:url('assets/images/Samsung_Galaxy_M13.jpg')">
												    </div>
												    <!--end::Image-->
												    <!--begin::Action-->
												    <div class="overlay-layer card-rounded bg-dark bg-opacity-25 shadow w-35px h-35px">
												        <i class="bi bi-eye-fill text-white fs-2"></i>
												    </div>
												    <!--end::Action-->
											 	</a>
											</td>
											<td>
												<a class="d-block overlay"  href="assets/images/warrenty_card.png" data-fslightbox="lightbox-basic_list">
												    <!--begin::Image-->
												    <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded w-35px h-35px"
												    style="background-image:url('assets/images/warrenty_card.png')">
												    </div>
												    <!--end::Image-->
												    <!--begin::Action-->
												    <div class="overlay-layer card-rounded bg-dark bg-opacity-25 shadow w-35px h-35px">
												        <i class="bi bi-eye-fill text-white fs-2"></i>
												    </div>
												    <!--end::Action-->
											 	</a>
											</td>
											<td class="ple1">BenQ GW2780T 27 inch (68cm) 1920 X 1080 Pixels IPS Full HD Ultra-Slim Bezel Monitor- Height Adjustment, Eye Care, Anti-Glare, Brightness Intelligence, Speakers, Color Weakness Mode, HDMI, DP (Black)</td>
										</tr>
									</tbody>
								</table>
							</div>
							<div class="col-lg-12 mt-4">
								<label class="fw-semibold fs-6">Description</label>
								<div>
									<label class="col-form-label fw-bold fs-5 ms-8">Tempere Glass is Damaged</label>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!--end::Modal dialog-->
			</div>
		</div>
		<!--end::Modal - View Asset -->

		<!--begin::Modal - Repair Asset-->
		<div class="modal fade" id="kt_modal_asset_repair" tabindex="-1" aria-hidden="true" data-bs-keyboard="false" data-bs-backdrop="static">
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
					<div class="modal-body pt-0 pb-6 px-6 px-xl-10">
						<!--begin::Heading-->
						<div class="mb-6 text-center">
							<h1 class="mb-3">Repair Asset</h1>
						</div>
						<div class="row mt-3">
							<div class="col-lg-12 fv-row">
								<label class="fw-semibold required fs-6">Description</label>
								<textarea class="form-control form-control-solid" data-kt-autosize="true" rows="4" name="lock_remarks" id="lock_remarks"></textarea>
								<div class="fv-plugins-message-container invalid-feedback"></div>
							</div>
						</div>
						<div class="d-flex align-items-center justify-content-center mt-4">
							<button type="button" class="btn btn-primary me-3" id="lock_save_butt">Repair</button>
							<button type="button" class="btn btn-secondary" id="lock_cancel_butt" data-bs-dismiss="modal">Cancel</button>
						</div>
					</div>
				</div>
				<!--end::Modal dialog-->
			</div>
		</div>
		<!--end::Modal - Repair Asset-->

		<!--begin::Modal - Damage Asset-->
		<div class="modal fade" id="kt_modal_asset_damage" tabindex="-1" aria-hidden="true" data-bs-keyboard="false" data-bs-backdrop="static">
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
					<div class="modal-body pt-0 pb-6 px-6 px-xl-10">
						<!--begin::Heading-->
						<div class="mb-6 text-center">
							<h1 class="mb-3">Damage Asset</h1>
						</div>
						<div class="row mt-3">
							<div class="col-lg-12 fv-row">
								<label class="fw-semibold required fs-6">Description</label>
								<textarea class="form-control form-control-solid" data-kt-autosize="true" rows="4" name="lock_remarks" id="lock_remarks"></textarea>
								<div class="fv-plugins-message-container invalid-feedback"></div>
							</div>
						</div>
						<div class="d-flex align-items-center justify-content-center mt-4">
							<button type="button" class="btn btn-primary me-3" id="lock_save_butt">Damage</button>
							<button type="button" class="btn btn-secondary" id="lock_cancel_butt" data-bs-dismiss="modal">Cancel</button>
						</div>
					</div>
				</div>
				<!--end::Modal dialog-->
			</div>
		</div>
		<!--end::Modal - Damage Asset-->

		<!--begin::Modal - Change Asset-->
		<div class="modal fade" id="kt_modal_asset_change" tabindex="-1" aria-hidden="true" data-bs-keyboard="false" data-bs-backdrop="static">
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
					<div class="modal-body pt-0 pb-6 px-6 px-xl-10">
						<!--begin::Heading-->
						<div class="mb-6 text-center">
							<h1 class="mb-3">Change Asset</h1>
						</div>
						<div class="row mt-3">
							<div class="col-lg-12 fv-row">
								<label class="fw-semibold required fs-6">Description</label>
								<textarea class="form-control form-control-solid" data-kt-autosize="true" rows="4" name="lock_remarks" id="lock_remarks"></textarea>
								<div class="fv-plugins-message-container invalid-feedback"></div>
							</div>
						</div>
						<div class="d-flex align-items-center justify-content-center mt-4">
							<button type="button" class="btn btn-primary me-3" id="lock_save_butt">Update</button>
							<button type="button" class="btn btn-secondary" id="lock_cancel_butt" data-bs-dismiss="modal">Cancel</button>
						</div>
					</div>
				</div>
				<!--end::Modal dialog-->
			</div>
		</div>
		<!--end::Modal - Change Asset-->

		<!--begin::Modal - Dead Asset-->
		<div class="modal fade" id="kt_modal_asset_dead" tabindex="-1" aria-hidden="true" data-bs-keyboard="false" data-bs-backdrop="static">
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
					<div class="modal-body pt-0 pb-6 px-6 px-xl-10">
						<!--begin::Heading-->
						<div class="mb-6 text-center">
							<h1 class="mb-3">Dead Asset</h1>
						</div>
						<div class="row mt-3">
							<div class="col-lg-12 fv-row">
								<label class="fw-semibold required fs-6">Description</label>
								<textarea class="form-control form-control-solid" data-kt-autosize="true" rows="4" name="lock_remarks" id="lock_remarks"></textarea>
								<div class="fv-plugins-message-container invalid-feedback"></div>
							</div>
						</div>
						<div class="d-flex align-items-center justify-content-center mt-4">
							<button type="button" class="btn btn-primary me-3" id="lock_save_butt">Dead</button>
							<button type="button" class="btn btn-secondary" id="lock_cancel_butt" data-bs-dismiss="modal">Cancel</button>
						</div>
					</div>
				</div>
				<!--end::Modal dialog-->
			</div>
		</div>
		<!--end::Modal - Dead Asset-->

		<!--begin::Modal - Working Asset-->
		<div class="modal fade" id="kt_modal_asset_working" tabindex="-1" aria-hidden="true" data-bs-keyboard="false" data-bs-backdrop="static">
			<!--begin::Modal dialog-->
			<div class="modal-dialog modal-m">
				<!--begin::Modal content-->
				<div class="modal-content rounded">
					<div class="swal2-icon swal2-warning swal2-icon-show" style="display:flex;">
						<div class="swal2-icon-content">?</div></div>
						<div class="swal2-html-container" id="swal2-html-container" style="display: block;">Are you sure you want to Working Asset?</div>
						<div class="d-flex flex-center flex-row-fluid pt-12">
							<button type="submit" class="btn btn-primary me-3" data-bs-dismiss="modal">Confirm</button>
							<button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
						</div><br><br>
				</div>
				<!--end::Modal content-->
			</div>
			<!--end::Modal dialog-->
		</div>
		<!--end::Modal - Working Asset-->

	<?php include "script.php"?>
	<script src="assets/plugins/custom/fslightbox/fslightbox.bundle.js"></script>
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
		$("#asset_date_edit").flatpickr({
				dateFormat: "d-m-Y",
			});
		$("#asset_pur_date_edit").flatpickr({
				dateFormat: "d-m-Y",
			});
	</script>
	<script>
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
		<script>
	      $("#kt_datatable_asset_mgnt_edit").kendoTooltip({
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
			$("#kt_datatable_asset_mgnt_edit").DataTable({
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
			// $('#kt_datatable_asset_mgnt_edit').wrap('<div class="dataTables_scroll" />');
		</script>
		<script>
	      $("#kt_datatable_asset_mgnt_view").kendoTooltip({
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
			$("#kt_datatable_asset_mgnt_view").DataTable({
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
			// $('#kt_datatable_asset_mgnt_view').wrap('<div class="dataTables_scroll" />');
		</script>
		<script>
	      $("#kt_datatable_asset_mgnt").kendoTooltip({
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
			$("#kt_datatable_asset_mgnt").DataTable({
				"ordering": false,
				// "aaSorting":[],
				// "iDisplayLength": "10000",
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
			// $('#kt_datatable_asset_mgnt').wrap('<div class="dataTables_scroll" />');
		</script>
	</body>
	<!--end::Body-->
	</html>