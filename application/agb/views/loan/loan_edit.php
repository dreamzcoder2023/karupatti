<?php include "common.php"?>
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
									<h1 class="d-flex align-items-center text-dark fw-bold my-1 fs-3">Loan List
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
								<!--begin::Card header-->
								<div class="card-header border-0 pt-6">
									<!--begin::Card title-->
									<div class="card-title">
											<div class="col-lg-5 fv-row">
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
													<input class="form-control form-control-solid ps-12" name="date" placeholder="From Date" id="kt_datepicker_From"/>
												</div>
											</div>
											<div class="col-md-1"></div>
											<!--begin::Col-->
											<div class="col-lg-5 fv-row">
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
													<input class="form-control form-control-solid ps-12" name="date" placeholder="To Date" id="kt_datepicker_To" />
												</div>
											</div>
											<!--end::Col-->
									</div>
									<!--begin::Card title-->
									<!--begin::Card toolbar-->
									<div class="card-toolbar">
										<!--begin::Toolbar-->
										<div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
											<!--begin::Filter-->
											<button type="button" class="btn btn-primary me-3" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
											<!--begin::Svg Icon | path: icons/duotune/general/gen031.svg-->
											<span class="svg-icon svg-icon-2">
												<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="256" height="256" viewBox="0 0 256 256" xml:space="preserve">
													<g transform="translate(128 128) scale(0.72 0.72)" style="">
														<g style="stroke: none; stroke-width: 0; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: none; fill-rule: nonzero; opacity: 1;" transform="translate(-175.05 -175.05000000000004) scale(3.89 3.89)" >
															<path d="M 37.882 90 c -0.338 0 -0.676 -0.086 -0.981 -0.258 c -0.629 -0.354 -1.019 -1.02 -1.019 -1.742 V 45.354 L 3.923 3.208 C 3.464 2.604 3.388 1.791 3.726 1.11 S 4.758 0 5.517 0 h 78.966 c 0.76 0 1.453 0.43 1.791 1.11 s 0.262 1.493 -0.197 2.098 L 54.118 45.354 V 79.37 c 0 0.699 -0.365 1.348 -0.963 1.71 l -14.237 8.63 C 38.601 89.903 38.241 90 37.882 90 z M 9.543 4 l 29.932 39.474 c 0.264 0.348 0.406 0.772 0.406 1.208 v 39.767 l 10.236 -6.205 V 44.682 c 0 -0.437 0.143 -0.861 0.406 -1.208 L 80.457 4 H 9.543 z M 52.118 79.37 h 0.01 H 52.118 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(255,255,255); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" /></g></g>
												</svg>
											</span>
											<!--end::Svg Icon-->Filter</button>
											<!--begin::Menu 1-->
											<!--<div class="menu menu-sub menu-sub-dropdown w-300px w-md-325px" data-kt-menu="true">
												
												<div class="px-7 py-5">
													<div class="fs-5 text-dark fw-bold">Filter Options</div>
												</div>
												
												<div class="separator border-gray-200"></div>
												<div class="px-7 py-5" data-kt-user-table-filter="form">
													<div class="mb-10">
														<label class="form-label fs-6 fw-semibold">Role:</label>
														<select class="form-select form-select-solid fw-bold" data-kt-select2="true" data-placeholder="Select option" data-allow-clear="true" data-kt-user-table-filter="role" data-hide-search="true">
															<option></option>
															<option value="Administrator">Administrator</option>
															<option value="Analyst">Analyst</option>
															<option value="Developer">Developer</option>
															<option value="Support">Support</option>
															<option value="Trial">Trial</option>
														</select>
													</div>
													<div class="mb-10">
														<label class="form-label fs-6 fw-semibold">Two Step Verification:</label>
														<select class="form-select form-select-solid fw-bold" data-kt-select2="true" data-placeholder="Select option" data-allow-clear="true" data-kt-user-table-filter="two-step" data-hide-search="true">
															<option></option>
															<option value="Enabled">Enabled</option>
														</select>
													</div>
													<div class="d-flex justify-content-end">
														<button type="reset" class="btn btn-light btn-active-light-primary fw-semibold me-2 px-6" data-kt-menu-dismiss="true" data-kt-user-table-filter="reset">Reset</button>
														<button type="submit" class="btn btn-primary fw-semibold px-6" data-kt-menu-dismiss="true" data-kt-user-table-filter="filter">Apply</button>
													</div>
													
												</div>
											
											</div>-->
											<!--end::Menu 1-->
											<!--end::Filter-->
											<!--begin::Export-->
											<button type="button" class="btn btn-primary me-3" data-bs-toggle="modal" data-bs-target="#kt_modal_export_users">
											<!--begin::Svg Icon | path: icons/duotune/arrows/arr078.svg-->
											<span class="svg-icon svg-icon-2">
												<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
													<rect opacity="0.3" x="12.75" y="4.25" width="12" height="2" rx="1" transform="rotate(90 12.75 4.25)" fill="currentColor" />
													<path d="M12.0573 6.11875L13.5203 7.87435C13.9121 8.34457 14.6232 8.37683 15.056 7.94401C15.4457 7.5543 15.4641 6.92836 15.0979 6.51643L12.4974 3.59084C12.0996 3.14332 11.4004 3.14332 11.0026 3.59084L8.40206 6.51643C8.0359 6.92836 8.0543 7.5543 8.44401 7.94401C8.87683 8.37683 9.58785 8.34458 9.9797 7.87435L11.4427 6.11875C11.6026 5.92684 11.8974 5.92684 12.0573 6.11875Z" fill="currentColor" />
													<path opacity="0.3" d="M18.75 8.25H17.75C17.1977 8.25 16.75 8.69772 16.75 9.25C16.75 9.80228 17.1977 10.25 17.75 10.25C18.3023 10.25 18.75 10.6977 18.75 11.25V18.25C18.75 18.8023 18.3023 19.25 17.75 19.25H5.75C5.19772 19.25 4.75 18.8023 4.75 18.25V11.25C4.75 10.6977 5.19771 10.25 5.75 10.25C6.30229 10.25 6.75 9.80228 6.75 9.25C6.75 8.69772 6.30229 8.25 5.75 8.25H4.75C3.64543 8.25 2.75 9.14543 2.75 10.25V19.25C2.75 20.3546 3.64543 21.25 4.75 21.25H18.75C19.8546 21.25 20.75 20.3546 20.75 19.25V10.25C20.75 9.14543 19.8546 8.25 18.75 8.25Z" fill="currentColor" />
												</svg>
											</span>
											<!--end::Svg Icon-->Export</button>
											<!--end::Export-->
											<!--begin::Add user-->
											
											<button type="button" class="btn btn-primary"  data-bs-toggle="modal" data-bs-target="#kt_modal_newloan">
											<!--begin::Svg Icon | path: icons/duotune/arrows/arr075.svg-->
											<span class="svg-icon svg-icon-2">
												<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
													<rect opacity="0.5" x="11.364" y="20.364" width="16" height="2" rx="1" transform="rotate(-90 11.364 20.364)" fill="currentColor" />
													<rect x="4.36396" y="11.364" width="16" height="2" rx="1" fill="currentColor" />
												</svg>
											</span>
											<!--end::Svg Icon-->New Loan</button>
											<!--end::Add user-->
										</div>
										<!--end::Toolbar-->
										<!--begin::Group actions-->
										<div class="d-flex justify-content-end align-items-center d-none" data-kt-user-table-toolbar="selected">
											<!--<div class="fw-bold me-5">
											<span class="me-2" data-kt-user-table-select="selected_count"></span>Selected</div>-->
											<button type="button" class="btn btn-danger" data-kt-user-table-select="delete_selected">Delete Selected</button>
										</div>
										<!--end::Group actions-->
										<!--begin::Modal - Adjust Balance-->
										<div class="modal fade" id="kt_modal_export_users" tabindex="-1" aria-hidden="true">
											<!--begin::Modal dialog-->
											<div class="modal-dialog modal-dialog-centered mw-650px">
												<!--begin::Modal content-->
												<div class="modal-content">
													<!--begin::Modal header-->
													<div class="modal-header">
														<!--begin::Modal title-->
														<h2 class="fw-bold">Export Loan details</h2>
														<!--end::Modal title-->
														<!--begin::Close-->
														<div class="btn btn-icon btn-sm btn-active-icon-primary" data-kt-users-modal-action="close">
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
													<div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
														<!--begin::Form-->
														<form id="kt_modal_export_users_form" class="form" action="#">
															<!--begin::Input group-->
															<div class="fv-row mb-10">
																<!--begin::Label-->
																<label class="fs-6 fw-semibold form-label mb-2">Based On:</label>
																<!--end::Label-->
																<!--begin::Input-->
																<select name="role" data-control="select2" data-placeholder="Based on" data-hide-search="true" class="form-select form-select-solid fw-bold">
																	<option></option>
																	<option value="role">Loan Type</option>
																	<option value="department">Item Type</option>
																</select>
																<!--end::Input-->
															</div>
															<!--end::Input group-->
															<!--begin::Input group-->
															<div class="fv-row mb-10">
																<!--begin::Label-->
																<label class="required fs-6 fw-semibold form-label mb-2">Select Export Format:</label>
																<!--end::Label-->
																<!--begin::Input-->
																<select name="format" data-control="select2" data-placeholder="Select a format" data-hide-search="true" class="form-select form-select-solid fw-bold">
																	<option></option>
																	<option value="excel">Excel</option>
																	<option value="pdf">PDF</option>
																	<option value="cvs">CVS</option>
																	<option value="zip">ZIP</option>
																</select>
																<!--end::Input-->
															</div>
															<!--end::Input group-->
															<!--begin::Actions-->
															<div class="text-center">
																<button type="reset" class="btn btn-light me-3" data-kt-users-modal-action="cancel">Discard</button>
																<button type="submit" class="btn btn-primary" data-kt-users-modal-action="submit">
																	<span class="indicator-label">Submit</span>
																	<span class="indicator-progress">Please wait...
																	<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
																</button>
															</div>
															<!--end::Actions-->
														</form>
														<!--end::Form-->
													</div>
													<!--end::Modal body-->
												</div>
												<!--end::Modal content-->
											</div>
											<!--end::Modal dialog-->
										</div>
										<!--end::Modal - New Card-->
									</div>
									<!--end::Card toolbar-->
								</div>
								<!--end::Card header-->

								<!--begin::Card body-->
								<div class="card-body py-4">
									<!--begin::Table-->
									<table class="table align-middle table-row-dashed table-striped table-hover fs-7 gy-1 gs-2" id="kt_datatable_dom_positioning">
										<!--begin::Table head-->
										<thead>
											<!--begin::Table row-->
											<tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">
												
												<th class="min-w-25px cy">Name</th>
												<th class="min-w-25px">Date</th>
												<th class="min-w-25px">ID Type</th>
												<th class="min-w-25px">Work</th>
												<th class="min-w-25px">Loan Type</th>
												<th class="min-w-25px">Interest Type</th>
												<th class="min-w-25px">Item</th>
												<th class="min-w-25px">Item Purity</th>
												<th class="min-w-25px">Amount</th>
												<th class="min-w-25px">Status</th>
												<th class="min-w-25px"><span class="text-end">Actions</span></th>
											</tr>
											<!--end::Table row-->
										</thead>
										<!--end::Table head-->
										<!--begin::Table body-->
										<tbody class="text-gray-600 fw-semibold">
											<!--begin::Table row-->
											<tr>
												<!--begin::User=-->
												<td class="cy">Abishek</td>
												<td>25 Mar 2012</td>
												<td>Ration Card</td>
												<td>Teacher</td>
												<td>Renewal</td>
												<td>DSJ</td>
												<td>Ear Ring</td>
												<td>Stone Gold</td>
												<td>4000</td>
												<!--begin::Joined-->
												<td>
													<label class="form-check form-switch form-check-custom form-check-solid">
															<input class="form-check-input" type="checkbox" value="1" checked="checked">
													</label>
												</td>
												<!--begin::Action=-->
												<td>
													<span class="text-end">
													<a href="#" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm" data-bs-toggle="modal" data-bs-target="#kt_modal_viewloan">
														<i class="bi bi-eye-fill eyc"></i>
													</a>
													<a href="#" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1" data-bs-toggle="modal" data-bs-target="#kt_modal_editloan">
																		<!--begin::Svg Icon | path: icons/duotune/art/art005.svg-->
																		<span class="svg-icon svg-icon-3">
																			<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																				<path opacity="0.3" d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z" fill="currentColor"></path>
																				<path d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z" fill="currentColor"></path>
																			</svg>
																		</span>
																		<!--end::Svg Icon-->
																	</a>
													<a href="#" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm" data-bs-toggle="modal" data-bs-target="#kt_modal_deleteloan">
																		<!--begin::Svg Icon | path: icons/duotune/general/gen027.svg-->
																		<span class="svg-icon svg-icon-3">
																			<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																				<path d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z" fill="currentColor"></path>
																				<path opacity="0.5" d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z" fill="currentColor"></path>
																				<path opacity="0.5" d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z" fill="currentColor"></path>
																			</svg>
																		</span>
																		<!--end::Svg Icon-->
																	</a></span>
												</td>
												<!--end::Action=-->
											</tr>
											<!--end::Table row-->

                                           <!--begin::Table row-->
											<tr>
												<!--begin::User=-->
												<td class="cy">Ameera</td>
												<td>15 Dec 2018</td>
												<td>ID Card</td>
												<td>Farmer</td>
												<td>Renewal</td>
												<td>F-2.00</td>
												<td>Stud</td>
												<td>916(KDM)</td>
												<td>4000</td>
												<!--begin::Joined-->
												<td>
													<label class="form-check form-switch form-check-custom form-check-solid">
															<input class="form-check-input" type="checkbox" value="1" checked="checked">
													</label>
												</td>
												<!--begin::Action=-->
												<td>
													<span class="text-end">
													<a href="#" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm" data-bs-toggle="modal" data-bs-target="#kt_modal_viewloan">
														<i class="bi bi-eye-fill eyc"></i>
													</a>
													<a href="#" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1" data-bs-toggle="modal" data-bs-target="#kt_modal_editloan">
																		<!--begin::Svg Icon | path: icons/duotune/art/art005.svg-->
																		<span class="svg-icon svg-icon-3">
																			<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																				<path opacity="0.3" d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z" fill="currentColor"></path>
																				<path d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z" fill="currentColor"></path>
																			</svg>
																		</span>
																		<!--end::Svg Icon-->
																	</a>
													<a href="#" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm" data-bs-toggle="modal" data-bs-target="#kt_modal_deleteloan">
																		<!--begin::Svg Icon | path: icons/duotune/general/gen027.svg-->
																		<span class="svg-icon svg-icon-3">
																			<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																				<path d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z" fill="currentColor"></path>
																				<path opacity="0.5" d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z" fill="currentColor"></path>
																				<path opacity="0.5" d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z" fill="currentColor"></path>
																			</svg>
																		</span>
																		<!--end::Svg Icon-->
																	</a></span>
												</td>
												<!--end::Action=-->
											</tr>
											<!--end::Table row-->

                                          <!--begin::Table row-->
											<tr>
												<!--begin::User=-->
												<td class="cy">Bharathi
												</td>
												<td>02 Feb 2018</td>
												<td>Aadhar Card</td>
												<td>Farmer</td>
												<td>Renewal</td>
												<td>F-2.25</td>
												<td>Chain</td>
												<td>Non KDM</td>
												<td>4000</td>
												<td>
													<label class="form-check form-switch form-check-custom form-check-solid">
															<input class="form-check-input" type="checkbox" value="1" checked="checked">
													</label>
												</td>
												<!--begin::Action=-->
												<td>
													<span class="text-end">
													<a href="#" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm" data-bs-toggle="modal" data-bs-target="#kt_modal_viewloan">
														<i class="bi bi-eye-fill eyc"></i>
													</a>
													<a href="#" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1" data-bs-toggle="modal" data-bs-target="#kt_modal_editloan">
																		<!--begin::Svg Icon | path: icons/duotune/art/art005.svg-->
																		<span class="svg-icon svg-icon-3">
																			<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																				<path opacity="0.3" d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z" fill="currentColor"></path>
																				<path d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z" fill="currentColor"></path>
																			</svg>
																		</span>
																		<!--end::Svg Icon-->
																	</a>
													<a href="#" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm" data-bs-toggle="modal" data-bs-target="#kt_modal_deleteloan">
																		<!--begin::Svg Icon | path: icons/duotune/general/gen027.svg-->
																		<span class="svg-icon svg-icon-3">
																			<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																				<path d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z" fill="currentColor"></path>
																				<path opacity="0.5" d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z" fill="currentColor"></path>
																				<path opacity="0.5" d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z" fill="currentColor"></path>
																			</svg>
																		</span>
																		<!--end::Svg Icon-->
																	</a></span>
												</td>
												<!--end::Action=-->
											</tr>
											<!--end::Table row-->
                                         <!--begin::Table row-->
											<tr>
												<!--begin::User=-->
												<td class="cy">Charu
												</td>
												<td>1 Jan 2012</td>
												<td>Driving License</td>
												<td>Teacher</td>
												<td>Renewal</td>
												<td>DSJ</td>
												<td>Necklace</td>
												<td>Silver</td>
												<td>4000</td>
												<td>
													<label class="form-check form-switch form-check-custom form-check-solid">
															<input class="form-check-input" type="checkbox" value="1" checked="checked">
													</label>
												</td>
												<!--begin::Action=-->
												<td>
													<span class="text-end">
													<a href="#" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm" data-bs-toggle="modal" data-bs-target="#kt_modal_viewloan">
														<i class="bi bi-eye-fill eyc"></i>
													</a>
													<a href="#" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1" data-bs-toggle="modal" data-bs-target="#kt_modal_editloan">
																		<!--begin::Svg Icon | path: icons/duotune/art/art005.svg-->
																		<span class="svg-icon svg-icon-3">
																			<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																				<path opacity="0.3" d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z" fill="currentColor"></path>
																				<path d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z" fill="currentColor"></path>
																			</svg>
																		</span>
																		<!--end::Svg Icon-->
																	</a>
													<a href="#" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm" data-bs-toggle="modal" data-bs-target="#kt_modal_deleteloan">
																		<!--begin::Svg Icon | path: icons/duotune/general/gen027.svg-->
																		<span class="svg-icon svg-icon-3">
																			<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																				<path d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z" fill="currentColor"></path>
																				<path opacity="0.5" d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z" fill="currentColor"></path>
																				<path opacity="0.5" d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z" fill="currentColor"></path>
																			</svg>
																		</span>
																		<!--end::Svg Icon-->
																	</a></span>
												</td>
												<!--end::Action=-->
											</tr>
											<!--end::Table row-->

                                            <!--begin::Table row-->
											<tr>
												<td class="cy">Dhivya
												</td>
												<td>25 Mar 2012</td>
												<td>Voter ID</td>
												<td>Teacher</td>
												<td>Renewal</td>
												<td>MIP-2.00</td>
												<td>Bangles</td>
												<td>KDM(916)</td>
												<td>4000</td>
												<td>
													<label class="form-check form-switch form-check-custom form-check-solid">
															<input class="form-check-input" type="checkbox" value="1" checked="checked">
													</label>
												</td>
												<!--begin::Action=-->
												<td>
													<span class="text-end">
													<a href="#" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm" data-bs-toggle="modal" data-bs-target="#kt_modal_viewloan">
														<i class="bi bi-eye-fill eyc"></i>
													</a>
													<a href="#" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1" data-bs-toggle="modal" data-bs-target="#kt_modal_editloan">
																		<!--begin::Svg Icon | path: icons/duotune/art/art005.svg-->
																		<span class="svg-icon svg-icon-3">
																			<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																				<path opacity="0.3" d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z" fill="currentColor"></path>
																				<path d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z" fill="currentColor"></path>
																			</svg>
																		</span>
																		<!--end::Svg Icon-->
																	</a>
													<a href="#" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm" data-bs-toggle="modal" data-bs-target="#kt_modal_deleteloan">
																		<!--begin::Svg Icon | path: icons/duotune/general/gen027.svg-->
																		<span class="svg-icon svg-icon-3">
																			<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																				<path d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z" fill="currentColor"></path>
																				<path opacity="0.5" d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z" fill="currentColor"></path>
																				<path opacity="0.5" d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z" fill="currentColor"></path>
																			</svg>
																		</span>
																		<!--end::Svg Icon-->
																	</a></span>
												</td>
												<!--end::Action=-->
											</tr>
											<!--end::Table row-->
      										<!--begin::Table row-->
											<tr>
												<td class="cy">Dharan
												</td>
												<td>25 Mar 2012</td>
												<td>Aadhar Card</td>
												<td>Teacher</td>
												<td>Renewal</td>
												<td>MIP-1.75</td>
												<td>Ring</td>
												<td>Silver</td>
												<td>4000</td>
												<td>
													<label class="form-check form-switch form-check-custom form-check-solid">
															<input class="form-check-input" type="checkbox" value="1" checked="checked">
													</label>
												</td>
												<!--begin::Action=-->
												<td>
													<span class="text-end">
													<a href="#" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm" data-bs-toggle="modal" data-bs-target="#kt_modal_viewloan">
														<i class="bi bi-eye-fill eyc"></i>
													</a>
													<a href="#" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1" data-bs-toggle="modal" data-bs-target="#kt_modal_editloan">
																		<!--begin::Svg Icon | path: icons/duotune/art/art005.svg-->
																		<span class="svg-icon svg-icon-3">
																			<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																				<path opacity="0.3" d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z" fill="currentColor"></path>
																				<path d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z" fill="currentColor"></path>
																			</svg>
																		</span>
																		<!--end::Svg Icon-->
																	</a>
													<a href="#" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm" data-bs-toggle="modal" data-bs-target="#kt_modal_deleteloan">
																		<!--begin::Svg Icon | path: icons/duotune/general/gen027.svg-->
																		<span class="svg-icon svg-icon-3">
																			<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																				<path d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z" fill="currentColor"></path>
																				<path opacity="0.5" d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z" fill="currentColor"></path>
																				<path opacity="0.5" d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z" fill="currentColor"></path>
																			</svg>
																		</span>
																		<!--end::Svg Icon-->
																	</a></span>
												</td>
												<!--end::Action=-->
											</tr>
											<!--end::Table row-->


      										<!--begin::Table row-->
											<tr>
												<td class="cy">Ganesh
												</td>
												<!--end::User=-->
												<td>25 Mar 2012</td>
												<td>Ration Card</td>
												<td>Teacher</td>
												<td>Renewal</td>
												<td>MIP-1.00</td>
												<td>Ear ring</td>
												<td>Stone Gold</td>
												<td>4000</td>
												<td>
													<label class="form-check form-switch form-check-custom form-check-solid">
															<input class="form-check-input" type="checkbox" value="1" checked="checked">
													</label>
												</td>
												<!--begin::Action=-->
												<td>
													<span class="text-end">
													<a href="#" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm" data-bs-toggle="modal" data-bs-target="#kt_modal_viewloan">
														<i class="bi bi-eye-fill eyc"></i>
													</a>
													<a href="#" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1" data-bs-toggle="modal" data-bs-target="#kt_modal_editloan">
																		<!--begin::Svg Icon | path: icons/duotune/art/art005.svg-->
																		<span class="svg-icon svg-icon-3">
																			<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																				<path opacity="0.3" d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z" fill="currentColor"></path>
																				<path d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z" fill="currentColor"></path>
																			</svg>
																		</span>
																		<!--end::Svg Icon-->
																	</a>
													<a href="#" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm" data-bs-toggle="modal" data-bs-target="#kt_modal_deleteloan">
																		<!--begin::Svg Icon | path: icons/duotune/general/gen027.svg-->
																		<span class="svg-icon svg-icon-3">
																			<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																				<path d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z" fill="currentColor"></path>
																				<path opacity="0.5" d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z" fill="currentColor"></path>
																				<path opacity="0.5" d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z" fill="currentColor"></path>
																			</svg>
																		</span>
																		<!--end::Svg Icon-->
																	</a></span>
												</td>
												<!--end::Action=-->
											</tr>
											<!--end::Table row-->

      										<!--begin::Table row-->
											<tr>
												<!--begin::User=-->
												<td class="cy">Haseena
												</td>
												<td>25 Mar 2012</td>
												<td>Ration Card</td>
												<td>Teacher</td>
												<td>Renewal</td>
												<td>MIP-1.50</td>
												<td>Ear ring</td>
												<td>KDM(916)</td>
												<td>4000</td>
												<td>
													<label class="form-check form-switch form-check-custom form-check-solid">
															<input class="form-check-input" type="checkbox" value="1" checked="checked">
													</label>
												</td>
												<!--begin::Action=-->
												<td>
													<span class="text-end">
													<a href="#" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm" data-bs-toggle="modal" data-bs-target="#kt_modal_viewloan">
														<i class="bi bi-eye-fill eyc"></i>
													</a>
													<a href="#" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1" data-bs-toggle="modal" data-bs-target="#kt_modal_editloan">
																		<!--begin::Svg Icon | path: icons/duotune/art/art005.svg-->
																		<span class="svg-icon svg-icon-3">
																			<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																				<path opacity="0.3" d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z" fill="currentColor"></path>
																				<path d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z" fill="currentColor"></path>
																			</svg>
																		</span>
																		<!--end::Svg Icon-->
																	</a>
													<a href="#" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm" data-bs-toggle="modal" data-bs-target="#kt_modal_deleteloan">
																		<!--begin::Svg Icon | path: icons/duotune/general/gen027.svg-->
																		<span class="svg-icon svg-icon-3">
																			<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																				<path d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z" fill="currentColor"></path>
																				<path opacity="0.5" d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z" fill="currentColor"></path>
																				<path opacity="0.5" d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z" fill="currentColor"></path>
																			</svg>
																		</span>
																		<!--end::Svg Icon-->
																	</a></span>
												</td>
												<!--end::Action=-->
											</tr>
											<!--end::Table row-->
											<!--begin::Table row-->
											<tr>
												<td class="cy">Hasini
												</td>
												</td>
												<td>25 Mar 2012</td>
												<td>Ration Card</td>
												<td>Teacher</td>
												<td>Renewal</td>
												<td>F-2.99</td>
												<td>Ear ring</td>
												<td>KDM(916)</td>
												<td>4000</td>
												<td>
													<label class="form-check form-switch form-check-custom form-check-solid">
															<input class="form-check-input" type="checkbox" value="1" checked="checked">
													</label>
												</td>
												<!--begin::Action=-->
												<td>
													<span class="text-end">
													<a href="#" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm" data-bs-toggle="modal" data-bs-target="#kt_modal_viewloan">
														<i class="bi bi-eye-fill eyc"></i>
													</a>
													<a href="#" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1" data-bs-toggle="modal" data-bs-target="#kt_modal_editloan">
																		<!--begin::Svg Icon | path: icons/duotune/art/art005.svg-->
																		<span class="svg-icon svg-icon-3">
																			<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																				<path opacity="0.3" d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z" fill="currentColor"></path>
																				<path d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z" fill="currentColor"></path>
																			</svg>
																		</span>
																		<!--end::Svg Icon-->
																	</a>
													<a href="#" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm" data-bs-toggle="modal" data-bs-target="#kt_modal_deleteloan">
																		<!--begin::Svg Icon | path: icons/duotune/general/gen027.svg-->
																		<span class="svg-icon svg-icon-3">
																			<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																				<path d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z" fill="currentColor"></path>
																				<path opacity="0.5" d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z" fill="currentColor"></path>
																				<path opacity="0.5" d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z" fill="currentColor"></path>
																			</svg>
																		</span>
																		<!--end::Svg Icon-->
																	</a></span>
												</td>
												<!--end::Action=-->
											</tr>
											<!--end::Table row-->
											<!--begin::Table row-->
											<tr>
												<td class="cy">Ishwarya
												</td>
												<td>25 Mar 2012</td>
												<td>Ration Card</td>
												<td>Teacher</td>
												<td>Renewal</td>
												<td>MIP-2.00</td>
												<td>Ear ring</td>
												<td>Stone Gold</td>
												<td>4000</td>
												<td>
													<label class="form-check form-switch form-check-custom form-check-solid">
															<input class="form-check-input" type="checkbox" value="1" checked="checked">
													</label>
												</td>
												<!--begin::Action=-->
												<td>
													<span class="text-end">
													<a href="#" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm" data-bs-toggle="modal" data-bs-target="#kt_modal_viewloan">
														<i class="bi bi-eye-fill eyc"></i>
													</a>
													<a href="#" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1" data-bs-toggle="modal" data-bs-target="#kt_modal_editloan">
																		<!--begin::Svg Icon | path: icons/duotune/art/art005.svg-->
																		<span class="svg-icon svg-icon-3">
																			<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																				<path opacity="0.3" d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z" fill="currentColor"></path>
																				<path d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z" fill="currentColor"></path>
																			</svg>
																		</span>
																		<!--end::Svg Icon-->
																	</a>
													<a href="#" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm" data-bs-toggle="modal" data-bs-target="#kt_modal_deleteloan">
																		<!--begin::Svg Icon | path: icons/duotune/general/gen027.svg-->
																		<span class="svg-icon svg-icon-3">
																			<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																				<path d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z" fill="currentColor"></path>
																				<path opacity="0.5" d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z" fill="currentColor"></path>
																				<path opacity="0.5" d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z" fill="currentColor"></path>
																			</svg>
																		</span>
																		<!--end::Svg Icon-->
																	</a></span>
												</td>
												<!--end::Action=-->
											</tr>
											<!--end::Table row-->
											<!--begin::Table row-->
											<tr>
												<td class="cy">Jeeva
												</td>
												<td>25 Mar 2012</td>
												<td>Ration Card</td>
												<td>Teacher</td>
												<td>Renewal</td>
												<td>MIP-2.00</td>
												<td>Ear ring</td>
												<td>Silver</td>
												<td>4000</td>
												<td>
													<label class="form-check form-switch form-check-custom form-check-solid">
															<input class="form-check-input" type="checkbox" value="1" checked="checked">
													</label>
												</td>
												<!--begin::Action=-->
												<td>
													<span class="text-end">
													<a href="#" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm" data-bs-toggle="modal" data-bs-target="#kt_modal_viewloan">
														<i class="bi bi-eye-fill eyc"></i>
													</a>
													<a href="#" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1" data-bs-toggle="modal" data-bs-target="#kt_modal_editloan">
																		<!--begin::Svg Icon | path: icons/duotune/art/art005.svg-->
																		<span class="svg-icon svg-icon-3">
																			<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																				<path opacity="0.3" d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z" fill="currentColor"></path>
																				<path d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z" fill="currentColor"></path>
																			</svg>
																		</span>
																		<!--end::Svg Icon-->
																	</a>
													<a href="#" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm" data-bs-toggle="modal" data-bs-target="#kt_modal_deleteloan">
																		<!--begin::Svg Icon | path: icons/duotune/general/gen027.svg-->
																		<span class="svg-icon svg-icon-3">
																			<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																				<path d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z" fill="currentColor"></path>
																				<path opacity="0.5" d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z" fill="currentColor"></path>
																				<path opacity="0.5" d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z" fill="currentColor"></path>
																			</svg>
																		</span>
																		<!--end::Svg Icon-->
																	</a></span>
												</td>
												<!--end::Action=-->
											</tr>
											<!--end::Table row-->
											<!--begin::Table foot-->
										<tfoot>
											<!--begin::Table row-->
											<tr class="text-start text-muted fw-bold fs-5 text-uppercase gs-0">
												
												<td class="min-w-25px"></td>
												<td class="min-w-25px"></td>
												<td class="min-w-25px"></td>
												<td class="min-w-25px"></td>
												<td class="min-w-25px"></td>
												<td class="min-w-25px"></td>
												<td class="min-w-25px"></td>
												<td class="min-w-25px">Total</td>
												<td class="min-w-25px">10000</td>
												<td class="min-w-25px"></td>
												<td class="min-w-25px"></td>
											</tr>
											<!--end::Table row-->
										</tfoot>
										<!--end::Table foot-->
										</tbody>
										<!--end::Table body-->
									</table>
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
				<?php include "footer.php"?>
				</div>
				<!--end::Wrapper-->
			</div>
			<!--end::Page-->
		</div>
		<!--end::Root-->
	<!--begin::Modal - newloan-->
	<div class="modal fade" id="kt_modal_newloan" tabindex="-1" aria-hidden="true">
		<form id="kt_add_new_loan_list_form" class="form">
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
							<h1 class="mb-3">New Loan</h1>
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
											<input type="text" name="add_pname_new_loan" class="form-control form-control-lg1 form-control-solid" placeholder="Party Name">
											<div class="fv-plugins-message-container invalid-feedback"></div>
										</div>
										<!--end::Col-->
											<!--begin::Label-->
										<label class="col-lg-2 col-form-label fw-semibold fs-6">City</label>
										<!--end::Label-->
										<!--begin::Col-->
										<div class="col-lg-4 fv-row fv-plugins-icon-container">
											<!--begin::Select-->
											<select class="form-select form-select-solid" data-control="select2" name="add_city_new_loan" data-hide-search="true">	
												<option value="">Select City</option>
												<option value="1">Sayalkudi</option>
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
											<input type="text" name="add_lname_new_loan" class="form-control form-control-lg1 form-control-solid" placeholder="Last Name">
											<div class="fv-plugins-message-container invalid-feedback"></div>
										</div>
										<!--end::Col-->
										<!--begin::Label-->
										<label class="col-lg-2 col-form-label fw-semibold fs-6">Mobile</label>
										<!--end::Label-->
										<!--begin::Col-->
										<div class="col-lg-4 fv-row fv-plugins-icon-container">
											<input type="text" name="add_pmobile_new_loan" class="form-control form-control-lg1 form-control-solid" placeholder="Mobile Number">
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
											<select class="form-select form-select-solid" name="add_parea_new_loan" data-control="select2" data-hide-search="true">	
												<option value="">Select Area</option>
												<option value="1">Ayyanar Gold Bank - Old Branch</option>
												<option value="1">Ayyanar Gold Bank - Sayalkudi</option>				
												<option value="2">Ayyanar Gold Bank - HO</option>
												<option value="3">Ayyanar Gold Bank - Sayalkudi</option>
											</select>
											<!--end::Select-->
										</div>
										<!--end::Col-->
										<label class="col-lg-2 col-form-label fw-semibold fs-6">Address</label>
										<div class="col-lg-4 fv-row fv-plugins-icon-container">
											<textarea class="form-control form-control-solid" rows="2" placeholder="Address" name="add_paddress_new_loan"></textarea>
										</div>
									</div>
									<div class="row">
										<label class="col-lg-2 col-form-label required fw-semibold fs-6">JewelType</label>
										<div class="col-lg-4 fv-row fv-plugins-icon-container">
											<select class="form-select form-select-solid" name="add_jtype_new_loan" data-control="select2" data-hide-search="true">	
												<option value="">Select</option>
												<option value="1">Gold</option>				
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
											<select class="form-select form-select-solid" name="add_company_new_loan" data-control="select2" data-hide-search="true">	
												<option value="">Select Company</option>
												<option value="1">Ayyanar Gold Bank - Main Branch</option>
												<option value="1">Ayyanar Gold Bank - Sayalkudi</option>				
												<option value="2">Ayyanar Gold Bank - Ramnad</option>
												<option value="3">Ayyanar Gold Bank - Kamuthi</option>
											</select>
										</div>
										<label class="col-lg-2 col-form-label fw-semibold fs-6">Bill No</label>
										<div class="col-lg-4 fv-row fv-plugins-icon-container">
											<input type="text" class="form-control form-control-lg1 form-control-solid" Value="TIP-548/22" style="background-color: #e6e7d1 !important; border-radius: 0px; border: none;" disabled>
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
												<input class="form-control form-control-solid ps-12" name="add_date_new_loan" placeholder="Date" id="kt_datepicker_new_loan_date" value="<?php echo date("d m Y"); ?>" />
											</div>
										</div>	
										<!--begin::Label-->
										<label class="col-lg-2 col-form-label required fw-semibold fs-6">Int Type</label>
										<!--end::Label-->
										<!--begin::Col-->
										<div class="col-lg-4 fv-row fv-plugins-icon-container">
											<!--begin::Select-->
											<select class="form-select form-select-solid" name="add_int_type_new_loan" data-control="select2" data-hide-search="true">	
												<option value="">Select</option>
												<option value="0">TIP-2.00</option>
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
											<select class="form-select form-select-solid" name="add_loan_type_new_loan" data-control="select2" data-hide-search="true">	
												<option value="">Select</option>
												<option value="0">New</option>
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
											<input type="text" name="add_renewal_new_loan" class="form-control form-control-lg1 form-control-solid" placeholder="Renewal">
											<div class="fv-plugins-message-container invalid-feedback"></div>
										</div>
										<!--end::Col-->
									</div>
									<div class="row">
										<div class="col-lg-4 fv-row fv-plugins-icon-container fv-plugins-bootstrap5-row-invalid">
											<div class="d-flex align-items-center">
												<label class="form-check form-check-inline form-check-solid me-5 is-invalid">
													<input class="form-check-input" name="communication[]" type="checkbox" value="1" id="nominee_radio" onclick="nom_radio()">
												</label>
												<span class="col-form-label fw-semibold fs-6">Has Nominee</span>
											</div>
										</div>
										<div class="col-lg-2"></div>
									</div>
									<div class="row">
										<label class="col-lg-2 col-form-label required fw-semibold fs-6" id="nominee_id" style="display: none;">Nominee</label>
										<div class="col-lg-4 fv-row fv-plugins-icon-container" id="nominee_id_tbox" style="display: none;">
											<select class="form-select form-select-solid" name="add_nomi_new_loan" data-control="select2" data-hide-search="true">	
												<option value="">Select</option>
												<option value="0">Kumar</option>
												<option value="1">Srinivasan</option>				
												<option value="2">Ajith</option>
												<option value="3">Karthick</option>
											</select>
										</div>
										<label class="col-lg-2 col-form-label required fw-semibold fs-6" id="relation_id" style="display: none;">Relation</label>
										<div class="col-lg-4 fv-row fv-plugins-icon-container" id="relation_id_tbox" style="display: none;">
											<input type="text" name="add_relation_new_loan" class="form-control form-control-lg1 form-control-solid" placeholder="Relation">
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
									<input type="text" name="add_plname_new_loan" class="form-control form-control-lg1 form-control-solid" placeholder="Pledge">
									<div class="fv-plugins-message-container invalid-feedback"></div>
								</div>
								<!--end::Col-->
								<!--begin::Col-->
								<div class="col-lg-3 fv-row fv-plugins-icon-container">
									<input type="text" name="add_dname_new_loan" class="form-control form-control-lg1 form-control-solid" placeholder="Description">
									<div class="fv-plugins-message-container invalid-feedback"></div>
								</div>
								<!--end::Col-->
								<!--begin::Col-->
								<div class="col-lg-2 fv-row fv-plugins-icon-container">
										<select class="form-select form-select-solid" data-placeholder="purity" data-control="select2" data-hide-search="true" name="add_ptyname_new_loan">
											<option value="">Select</option>
											<option value="0">916</option>
											<option value="1">Non KDM</option>				
											<option value="2">Stone Gold</option>
											<option value="3">Silver</option>
										</select>
									</div>
								<!--end::Col-->
								<!--begin::Col-->
								<div class="col-lg-1 fv-row fv-plugins-icon-container">
									<input type="text" name="add_quliname_new_loan" class="form-control form-control-lg1 form-control-solid" placeholder="Quantity">
									<div class="fv-plugins-message-container invalid-feedback"></div>
								</div>
								<!--end::Col-->
								<!--begin::Col-->
								<div class="col-lg-2 fv-row fv-plugins-icon-container">
									<input type="text" name="add_pwei_new_loan" class="form-control form-control-lg1 form-control-solid" placeholder="Weight">
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
										<input type="text" name="add_weight_new_loan" class="form-control form-control-lg1 form-control-solid" placeholder="Weight">
										<div class="fv-plugins-message-container invalid-feedback"></div>
									</div>
									<!--end::Col-->
									<!--begin::Label-->
									<label class="col-lg-1 col-form-label required fw-semibold fs-6">Stoneless</label>
									<!--end::Label-->
									<!--begin::Col-->
									<div class="col-lg-1 fv-row fv-plugins-icon-container">
										<input type="text" name="add_stless_new_loan" class="form-control form-control-lg1 form-control-solid" placeholder="St.less">
										<div class="fv-plugins-message-container invalid-feedback"></div>
									</div>
									<!--end::Col-->
									<!--begin::Label-->
									<label class="col-lg-1 col-form-label required fw-semibold fs-6">Less</label>
									<!--end::Label-->
									<!--begin::Col-->
									<div class="col-lg-1 fv-row fv-plugins-icon-container">
										<input type="text" name="add_less_new_loan" class="form-control form-control-lg1 form-control-solid" placeholder="Less">
										<div class="fv-plugins-message-container invalid-feedback"></div>
									</div>
									<!--end::Col-->
									<!--begin::Label-->
									<label class="col-lg-1 col-form-label required fw-semibold fs-6">Net.Wght</label>
									<!--end::Label-->
									<!--begin::Col-->
									<div class="col-lg-1 fv-row fv-plugins-icon-container">
										<input type="text" name="add_ntweight_new_loan" class="form-control form-control-lg1 form-control-solid" placeholder="Nt.Wgt">
										<div class="fv-plugins-message-container invalid-feedback"></div>
									</div>
									<!--end::Col-->
									<!--begin::Label-->
										<label class="col-lg-1 col-form-label required fw-semibold fs-6">CurrRate</label>
									<!--end::Label-->
									<!--begin::Col-->
									<div class="col-lg-1 fv-row fv-plugins-icon-container">
										<input type="text" name="add_currate_new_loan" class="form-control form-control-lg1 form-control-solid" placeholder="Rate">
										<div class="fv-plugins-message-container invalid-feedback"></div>
									</div>
									<!--end::Col-->
									<!--begin::Label-->
										<label class="col-lg-1 col-form-label required fw-semibold fs-6">Quality%</label>
									<!--end::Label-->
									<!--begin::Col-->
									<div class="col-lg-1 fv-row fv-plugins-icon-container">
										<input type="text" name="add_qual_new_loan" class="form-control form-control-lg1 form-control-solid" placeholder="Quality">
										<div class="fv-plugins-message-container invalid-feedback"></div>
									</div>
									<!--end::Col-->
									<!--begin::Label-->
										<label class="col-lg-1 col-form-label required fw-semibold fs-6">Gram.Val</label>
									<!--end::Label-->
									<!--begin::Col-->
									<div class="col-lg-1 fv-row fv-plugins-icon-container">
										<input type="text" name="add_gvalue_new_loan" class="form-control form-control-lg1 form-control-solid" placeholder="Value">
										<div class="fv-plugins-message-container invalid-feedback"></div>
									</div>
									<!--end::Col-->
									<!--begin::Label-->
										<label class="col-lg-1 col-form-label required fw-semibold fs-6">SalesRate</label>
									<!--end::Label-->
									<!--begin::Col-->
									<div class="col-lg-1 fv-row fv-plugins-icon-container">
										<input type="text" name="add_slrate_new_loan" class="form-control form-control-lg1 form-control-solid" placeholder="Rate">
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
											<input type="text" name="add_lnamt_new_loan" class="form-control form-control-lg1 form-control-solid" style="font-size: 18px !important;font-weight: 700 !important;color: #1B439E !important;">
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
											<input type="text" name="add_lnperiod_new_loan" class="form-control form-control-lg1 form-control-solid" placeholder="">
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
											<input type="text" name="add_mont_new_loan" class="form-control form-control-lg2 form-control-solid" placeholder="Monthly Deposit">
											<div class="fv-plugins-message-container invalid-feedback"></div>
										</div>
										<!--end::Col-->
									</div>
									<div class="row">
										<label class="col-lg-6 col-form-label fw-semibold fs-6">Advance Interest</label>
										<div class="col-lg-3 fv-row fv-plugins-icon-container">
											<input type="text" name="add_aint_new_loan" class="form-control form-control-lg1 form-control-solid">
											<div class="fv-plugins-message-container invalid-feedback"></div>
										</div>
										<div class="col-lg-3 fv-row fv-plugins-icon-container">
											<input type="text" class="form-control form-control-lg1 form-control-solid">
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
											<input type="text" name="company" class="form-control form-control-lg1 form-control-solid" placeholder="Processing Charge">
											<div class="fv-plugins-message-container invalid-feedback"></div>
										</div>
										<!--end::Col-->
									</div>
									<div class="row">
										<label class="col-lg-6 col-form-label fw-semibold fs-6">Branch Adjustment</label>
										<div class="col-lg-6 fv-row fv-plugins-icon-container">
											<input type="text" name="company" class="form-control form-control-lg1 form-control-solid" style="font-size: 18px !important;font-weight: 700 !important;color: #1B439E !important;">
											<div class="fv-plugins-message-container invalid-feedback"></div>
										</div>
									</div>
									<div class="row">
										<label class="col-lg-6 col-form-label fw-semibold fs-6">Select</label>
										<div class="col-lg-6 fv-row fv-plugins-icon-container">
											<select class="form-select form-select-solid" name="" data-control="select2" data-hide-search="true">	
												<option value="0">AGK ODE Loan</option>
												<option value="1">AGM ODE Loan</option>				
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
											<input type="text" name="add_onacc_new_loan" class="form-control form-control-lg1 form-control-solid" placeholder="" style="background-color: #ff5b5b; color: white">
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
											<input type="text" name="company" class="form-control form-control-lg1 form-control-solid" placeholder="Charge">
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
											<input type="text" name="add_npay_new_loan" class="form-control form-control-lg1 form-control-solid" style="font-size: 18px !important;font-weight: 700 !important;color: #1B439E !important;">
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
											<input type="text" name="add_pcash_new_loan" class="form-control form-control-lg1 form-control-solid" style="font-size: 18px !important;font-weight: 700 !important;color: #1B439E !important;">
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
									<select class="form-select form-select-solid" name="add_aby_new_loan" data-control="select2" data-hide-search="true">	
										<option value="">Select</option>
										<option value="0">Arun</option>
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
									<input type="text" name="add_rperiod_new_loan" class="form-control form-control-lg1 form-control-solid" style="font-size: 17px !important;font-weight: 600 !important;">
									<div class="fv-plugins-message-container invalid-feedback"></div>
								</div>
								<!--end::Col-->
								<label class="col-lg-1 col-form-label fw-semibold fs-6">Days</label>
								<!--begin::Label-->
								<label class="col-lg-2 col-form-label fw-semibold fs-6">Customer Rating</label>
								<!--end::Label-->
								<!--begin::Col-->
								<div class="col-lg-2 fv-row fv-plugins-icon-container">
									<input type="text" name="add_crat_new_loan" class="form-control form-control-lg1 form-control-solid" placeholder="Customer Rating">
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
							<div class="image-input-wrapper"></div>
							<!--end::Preview existing avatar-->
							<!--begin::Label-->
							<label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" data-kt-initialized="1">
								<i class="bi bi-pencil-fill fs-10"></i>
								<!--begin::Inputs-->
								<input type="file" name="add_party_new_loan" accept=".png, .jpg, .jpeg">
								<input type="hidden" name="add_party_remove_new_loan">
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
								<input type="file" name="add_others_new_loan" accept=".png, .jpg, .jpeg">
								<input type="hidden" name="add_other_remove_new_loan">
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
							<label class="col-lg-1 col-form-label required fw-semibold fs-6">Jewel 1</label>
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
									<input type="file" name="add_jewel_new_loan" accept=".png, .jpg, .jpeg">
									<input type="hidden" name="add_jewel_remove_new_loan">
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
							<button class="btn btn-primary" id="save_changes_add_new_loan">Save Changes</button>
						</div>
						<!-- <div class="card-footer d-flex justify-content-end py-6 px-9">
							<button class="btn btn-secondary me-2" data-bs-dismiss="modal">Cancel</button>
							<button class="btn btn-success" id="save_changes_add_new_loan">Save Changes</button>
						</div> -->
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
						<h1 class="mb-3">View Loan</h1>
					</div>
					<!--end::Heading-->
					<div class="row">
						<div class="col-lg-6">
							<div style="padding:10px 10px 10px 10px !important;box-shadow: 0 3px 6px #00002947; border-radius: 5px; background-color: #f5f5f1 !important;">
								<div class="row">
									<!--begin::Label-->
									<label class="col-lg-2 col-form-label fw-semibold fs-6">Name</label>
									<!--end::Label-->
									<!--begin::Col-->
									<div class="col-lg-4 fv-row fv-plugins-icon-container">
										<input type="text" class="form-control form-control-lg1 form-control-solid" placeholder="Party Name" value="Srinivasan" readonly>
										<div class="fv-plugins-message-container invalid-feedback"></div>
									</div>
									<!--end::Col-->
										<!--begin::Label-->
									<label class="col-lg-2 col-form-label fw-semibold fs-6">City</label>
									<!--end::Label-->
									<!--begin::Col-->
									<div class="col-lg-4 fv-row fv-plugins-icon-container">
										<!--begin::Select-->
										<select class="form-select form-select-solid" data-control="select2" name="edit_city_new_loan" data-hide-search="true" disabled>	
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
										<input type="text" name="edit_lname_new_loan" class="form-control form-control-lg1 form-control-solid" placeholder="Last Name" value="Krishnan" readonly>
										<div class="fv-plugins-message-container invalid-feedback"></div>
									</div>
									<!--end::Col-->
									<!--begin::Label-->
									<label class="col-lg-2 col-form-label fw-semibold fs-6">Mobile</label>
									<!--end::Label-->
									<!--begin::Col-->
									<div class="col-lg-4 fv-row fv-plugins-icon-container">
										<input type="text" name="edit_pmobile_new_loan" class="form-control form-control-lg1 form-control-solid" placeholder="Mobile Number" value="9856565555" readonly>
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
										<select class="form-select form-select-solid" name="edit_parea_new_loan" data-control="select2" data-hide-search="true" disabled>	
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
										<textarea class="form-control form-control-solid" rows="2" placeholder="Address" name="edit_paddress_new_loan" disabled>23,chruch main road,Sayalkudi</textarea>
									</div>
								</div>
								<div class="row">
									<label class="col-lg-2 col-form-label fw-semibold fs-6">JewelType</label>
									<div class="col-lg-4 fv-row fv-plugins-icon-container">
										<select class="form-select form-select-solid" name="edit_jtype_new_loan" data-control="select2" data-hide-search="true" disabled>	
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
									<label class="col-lg-2 col-form-label fw-semibold fs-6">Company</label>
									<div class="col-lg-4 fv-row fv-plugins-icon-container">
										<select class="form-select form-select-solid" name="edit_company_new_loan" data-control="select2" data-hide-search="true" disabled>	
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
									<label class="col-lg-2 col-form-label fw-semibold fs-6">Date</label>
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
											<input class="form-control form-control-solid ps-12" placeholder="Date" id="kt_datepicker_view_loan_date" value="<?php echo date("d m Y"); ?>" disabled/>
										</div>
									</div>	
									<!--begin::Label-->
									<label class="col-lg-2 col-form-label fw-semibold fs-6">Int Type</label>
									<!--end::Label-->
									<!--begin::Col-->
									<div class="col-lg-4 fv-row fv-plugins-icon-container">
										<!--begin::Select-->
										<select class="form-select form-select-solid" name="edit_int_type_new_loan" data-control="select2" data-hide-search="true" disabled>	
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
									<label class="col-lg-2 col-form-label fw-semibold fs-6">LoanType</label>
									<!--end::Label-->
									<!--begin::Col-->
									<div class="col-lg-4 fv-row fv-plugins-icon-container">
										<!--begin::Select-->
										<select class="form-select form-select-solid" name="edit_loan_type_new_loan" data-control="select2" data-hide-search="true" disabled>	
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
										<input type="text" name="edit_renewal_new_loan" class="form-control form-control-lg1 form-control-solid" placeholder="Renewal" value="Renewal" readonly>
										<div class="fv-plugins-message-container invalid-feedback"></div>
									</div>
									<!--end::Col-->
								</div>
								<div class="row">
									<div class="col-lg-4 fv-row fv-plugins-icon-container fv-plugins-bootstrap5-row-invalid">
										<div class="d-flex align-items-center">
											<label class="form-check form-check-inline form-check-solid me-5 is-invalid">
												<input class="form-check-input" name="communication[]" type="checkbox" value="1" id="nominee_radio_view" onclick="nom_radio_view()">
											</label>
											<span class="col-form-label fw-semibold fs-6">Has Nominee</span>
										</div>
									</div>
									<div class="col-lg-2"></div>
								</div>
								<div class="row">
									<label class="col-lg-2 col-form-label fw-semibold fs-6" id="nominee_id_view" style="display: none;">Nominee</label>
									<div class="col-lg-4 fv-row fv-plugins-icon-container" id="nominee_id_tbox_view" style="display: none;">
										<select class="form-select form-select-solid" data-control="select2" data-hide-search="true" disabled>	
											<option value="">Select</option>
											<option value="0" selected="selected">Kumar</option>
											<option value="1">Srinivasan</option>				
											<option value="2">Ajith</option>
											<option value="3">Karthick</option>
										</select>
									</div>
									<label class="col-lg-2 col-form-label fw-semibold fs-6" id="relation_id_view" style="display: none;">Relation</label>
									<div class="col-lg-4 fv-row fv-plugins-icon-container" id="relation_id_tbox_view" style="display: none;">
										<input type="text" class="form-control form-control-lg1 form-control-solid" placeholder="Relation" value="Brother" disabled>
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
								<input type="text" class="form-control form-control-lg1 form-control-solid" placeholder="Pledge" value="Ring" readonly>
								<div class="fv-plugins-message-container invalid-feedback"></div>
							</div>
							<!--end::Col-->
							<!--begin::Col-->
							<div class="col-lg-3 fv-row fv-plugins-icon-container">
								<input type="text" class="form-control form-control-lg1 form-control-solid" placeholder="Description" value="Ladies ring with two green stones" readonly>
								<div class="fv-plugins-message-container invalid-feedback"></div>
							</div>
							<!--end::Col-->
							<!--begin::Col-->
							<div class="col-lg-2 fv-row fv-plugins-icon-container">
									<select class="form-select form-select-solid" data-control="select2" data-hide-search="true" disabled>
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
								<input type="text" class="form-control form-control-lg1 form-control-solid" placeholder="Quantity" value="1" readonly>
								<div class="fv-plugins-message-container invalid-feedback"></div>
							</div>
							<!--end::Col-->
							<!--begin::Col-->
							<div class="col-lg-2 fv-row fv-plugins-icon-container">
								<input type="text" class="form-control form-control-lg1 form-control-solid" placeholder="Weight" value="2.850" readonly>
								<div class="fv-plugins-message-container invalid-feedback"></div>
							</div>
							<!--end::Col-->
							<div class="col-lg-1 py-1">		
								<button type="submit" class="btn btn-sm btn btn-outline btn-outline-solid btn-outline-warning btn-active-light-primary me-2 mb-2">Add</button>
							</div>
						</div>
					</div>
					<table class="table table-striped table-hover table-row-bordered fs-7 gy-1 gs-2" id="kt_datatable_dom_positioning_view_loan">
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
								<label class="col-lg-1 col-form-label fw-semibold fs-6">Weight</label>
								<!--end::Label-->
								<!--begin::Col-->
								<div class="col-lg-1 fv-row fv-plugins-icon-container">
									<input type="text" class="form-control form-control-lg1 form-control-solid" placeholder="Weight" value="3.100" readonly>
									<div class="fv-plugins-message-container invalid-feedback"></div>
								</div>
								<!--end::Col-->
								<!--begin::Label-->
								<label class="col-lg-1 col-form-label fw-semibold fs-6">Stoneless</label>
								<!--end::Label-->
								<!--begin::Col-->
								<div class="col-lg-1 fv-row fv-plugins-icon-container">
									<input type="text"  class="form-control form-control-lg1 form-control-solid" placeholder="St.less" value="0.500" readonly>
									<div class="fv-plugins-message-container invalid-feedback"></div>
								</div>
								<!--end::Col-->
								<!--begin::Label-->
								<label class="col-lg-1 col-form-label fw-semibold fs-6">Less</label>
								<!--end::Label-->
								<!--begin::Col-->
								<div class="col-lg-1 fv-row fv-plugins-icon-container">
									<input type="text" class="form-control form-control-lg1 form-control-solid" placeholder="Less" value="0.200" readonly>
									<div class="fv-plugins-message-container invalid-feedback"></div>
								</div>
								<!--end::Col-->
								<!--begin::Label-->
								<label class="col-lg-1 col-form-label fw-semibold fs-6">Net.Wght</label>
								<!--end::Label-->
								<!--begin::Col-->
								<div class="col-lg-1 fv-row fv-plugins-icon-container">
									<input type="text" class="form-control form-control-lg1 form-control-solid" placeholder="Nt.Wgt" value="2.400" readonly>
									<div class="fv-plugins-message-container invalid-feedback"></div>
								</div>
								<!--end::Col-->
								<!--begin::Label-->
									<label class="col-lg-1 col-form-label fw-semibold fs-6">CurrRate</label>
								<!--end::Label-->
								<!--begin::Col-->
								<div class="col-lg-1 fv-row fv-plugins-icon-container">
									<input type="text" class="form-control form-control-lg1 form-control-solid" placeholder="Rate" value="5000" readonly>
									<div class="fv-plugins-message-container invalid-feedback"></div>
								</div>
								<!--end::Col-->
								<!--begin::Label-->
									<label class="col-lg-1 col-form-label fw-semibold fs-6">Quality%</label>
								<!--end::Label-->
								<!--begin::Col-->
								<div class="col-lg-1 fv-row fv-plugins-icon-container">
									<input type="text" class="form-control form-control-lg1 form-control-solid" placeholder="Quality" value="85" readonly>
									<div class="fv-plugins-message-container invalid-feedback"></div>
								</div>
								<!--end::Col-->
								<!--begin::Label-->
									<label class="col-lg-1 col-form-label fw-semibold fs-6">Gram.Val</label>
								<!--end::Label-->
								<!--begin::Col-->
								<div class="col-lg-1 fv-row fv-plugins-icon-container">
									<input type="text" class="form-control form-control-lg1 form-control-solid" placeholder="Value" value="4250.00" readonly>
									<div class="fv-plugins-message-container invalid-feedback"></div>
								</div>
								<!--end::Col-->
								<!--begin::Label-->
									<label class="col-lg-1 col-form-label fw-semibold fs-6">SalesRate</label>
								<!--end::Label-->
								<!--begin::Col-->
								<div class="col-lg-1 fv-row fv-plugins-icon-container">
									<input type="text" class="form-control form-control-lg1 form-control-solid" placeholder="Rate" value="10200.00" readonly>
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
									<label class="col-lg-6 col-form-label fw-semibold fs-6">Loan Amount</label>
									<!--end::Label-->
									<!--begin::Col-->
									<div class="col-lg-6 fv-row fv-plugins-icon-container">
										<input type="text" class="form-control form-control-lg1 form-control-solid" style="font-size: 18px !important;font-weight: 700 !important;color: #1B439E !important;" value="10000.00" readonly>
										<div class="fv-plugins-message-container invalid-feedback"></div>
									</div>
									<!--end::Col-->
								</div>
								<div class="row">
									<!--begin::Label-->
									<label class="col-lg-6 col-form-label fw-semibold fs-6">Loan period</label>
									<!--end::Label-->
									<!--begin::Col-->
									<div class="col-lg-3 fv-row fv-plugins-icon-container">
										<input type="text" class="form-control form-control-lg1 form-control-solid" placeholder="" value="1" readonly>
										<div class="fv-plugins-message-container invalid-feedback"></div>
									</div>
									<!--end::Col-->
									<label class="col-lg-3 col-form-label fw-semibold fs-6">Months</label>
								</div>
								<div class="row">
									<!--begin::Label-->
									<label class="col-lg-6 col-form-label fw-semibold fs-6">Monthly</label>
									<!--end::Label-->
									<!--begin::Col-->
									<div class="col-lg-6 fv-row fv-plugins-icon-container">
										<input type="text" class="form-control form-control-lg2 form-control-solid" placeholder="Monthly Deposit" value="250.00" readonly>
										<div class="fv-plugins-message-container invalid-feedback"></div>
									</div>
									<!--end::Col-->
								</div>
								<div class="row">
									<label class="col-lg-6 col-form-label fw-semibold fs-6">Advance Interest</label>
									<div class="col-lg-3 fv-row fv-plugins-icon-container">
										<input type="text" class="form-control form-control-lg1 form-control-solid" value="0" readonly>
										<div class="fv-plugins-message-container invalid-feedback"></div>
									</div>
									<div class="col-lg-3 fv-row fv-plugins-icon-container">
										<input type="text" class="form-control form-control-lg1 form-control-solid" value="0.00" readonly>
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
										<input type="text" name="company" class="form-control form-control-lg1 form-control-solid" placeholder="Processing Charge" value="0.00" readonly>
										<div class="fv-plugins-message-container invalid-feedback"></div>
									</div>
									<!--end::Col-->
								</div>
								<div class="row">
									<label class="col-lg-6 col-form-label fw-semibold fs-6">Branch Adjustment</label>
									<div class="col-lg-6 fv-row fv-plugins-icon-container">
										<input type="text" name="company" class="form-control form-control-lg1 form-control-solid" style="font-size: 18px !important;font-weight: 700 !important;color: #1B439E !important;" value="0.00" readonly>
										<div class="fv-plugins-message-container invalid-feedback"></div>
									</div>
								</div>
								<div class="row">
									<label class="col-lg-6 col-form-label fw-semibold fs-6">Select</label>
									<div class="col-lg-6 fv-row fv-plugins-icon-container">
										<select class="form-select form-select-solid" name="" data-control="select2" data-hide-search="true" disabled>	
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
										<input type="text" name="company" class="form-control form-control-lg1 form-control-solid" placeholder="" style="background-color: #ff5b5b; color: white"; readonly>
										<div class="fv-plugins-message-container invalid-feedback"></div>
									</div>
									<!--end::Col-->
									<!--begin::Col-->
									<div class="col-lg-3 fv-row fv-plugins-icon-container">
										<input type="text" name="company" class="form-control form-control-lg1 form-control-solid" placeholder="" style="background-color: #ff5b5b; color: : white " readonly>
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
												<textarea class="form-control form-control-solid" rows="1" readonly></textarea>
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
									<label class="col-lg-6 col-form-label fw-semibold fs-6">On Account</label>
									<!--end::Label-->
									<!--begin::Col-->
									<div class="col-lg-6 fv-row fv-plugins-icon-container">
										<input type="text" class="form-control form-control-lg1 form-control-solid" placeholder="" style="background-color: #ff5b5b; color: white" value="0" readonly>
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
										<input type="text" name="company" class="form-control form-control-lg1 form-control-solid" placeholder="Charge" value="50.00" readonly>
										<div class="fv-plugins-message-container invalid-feedback"></div>
									</div>
									<!--end::Col-->
								</div>
								<div class="row">
									<!--begin::Label-->
									<label class="col-lg-6 col-form-label fw-semibold fs-6">Net Pay</label>
									<!--end::Label-->
									<!--begin::Col-->
									<div class="col-lg-6 fv-row fv-plugins-icon-container">
										<input type="text" class="form-control form-control-lg1 form-control-solid" style="font-size: 18px !important;font-weight: 700 !important;color: #1B439E !important;" value="9950.00" readonly>
										<div class="fv-plugins-message-container invalid-feedback"></div>
									</div>
									<!--end::Col-->
								</div>
								<div class="row">
									<!--begin::Label-->
									<label class="col-lg-6 col-form-label fw-semibold fs-6">Paid Cash</label>
									<!--end::Label-->
									<!--begin::Col-->
									<div class="col-lg-6 fv-row fv-plugins-icon-container">
										<input type="text" class="form-control form-control-lg1 form-control-solid" style="font-size: 18px !important;font-weight: 700 !important;color: #1B439E !important;" value="9950.00" readonly>
										<div class="fv-plugins-message-container invalid-feedback"></div>
									</div>
									<!--end::Col-->
								</div>
							</div>
						</div>
					</div><br>		
					<div style="padding:10px 10px 10px 10px !important;box-shadow: 0 3px 6px #00002947; border-radius: 5px; background-color: #f5f5f1 !important;">
						<div class="row">
							<label class="col-lg-2 col-form-label fw-semibold fs-6">Attended By</label>
							<div class="col-lg-2 fv-row fv-plugins-icon-container">
								<select class="form-select form-select-solid" data-control="select2" data-hide-search="true" disabled>	
									<option value="">Select</option>
									<option value="0" selected="selected">Arun</option>
									<option value="1">Sathya</option>				
									<option value="2">Antony</option>
									<option value="3">Priya</option>
								</select>
							</div>
							<!--begin::Label-->
							<label class="col-lg-2 col-form-label fw-semibold fs-6">Redemption Period</label>
							<!--end::Label-->
							<!--begin::Col-->
							<div class="col-lg-1 fv-row fv-plugins-icon-container">
								<input type="text" class="form-control form-control-lg1 form-control-solid" style="font-size: 17px !important;font-weight: 600 !important;" readonly>
								<div class="fv-plugins-message-container invalid-feedback"></div>
							</div>
							<!--end::Col-->
							<label class="col-lg-1 col-form-label fw-semibold fs-6">Days</label>
							<!--begin::Label-->
							<label class="col-lg-2 col-form-label fw-semibold fs-6">Customer Rating</label>
							<!--end::Label-->
							<!--begin::Col-->
							<div class="col-lg-2 fv-row fv-plugins-icon-container">
								<input type="text" class="form-control form-control-lg1 form-control-solid" placeholder="Customer Rating" value="60" readonly>
								<div class="fv-plugins-message-container invalid-feedback"></div>
							</div>
							<!--end::Col-->
						</div>	
					</div><br>
					<div class="row">
						<!--begin::Label-->
						<label class="col-lg-1 col-form-label fw-semibold fs-6">Party</label>
						<!--end::Label-->
						<!--begin::Col-->
						<div class="col-lg-2 fv-row">
						<!--begin::Image input-->
						<div class="image-input image-input-outline" data-kt-image-input="true">
						<!--begin::Preview existing avatar-->
						<div class="image-input-wrapper" style="background-image: url(assets/images/sample.jpg)"></div>
						<!--end::Preview existing avatar-->
						<!--begin::Cancel-->
						<span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" data-kt-initialized="1">
							<i class="bi bi-x fs-6"></i>
						</span>
						<!--end::Cancel-->
						</div>
						<!--end::Image input-->
						</div>
						<!--end::Col-->
						<!--begin::Label-->
						<label class="col-lg-1 col-form-label fw-semibold fs-6">Others</label>
						<!--end::Label-->
						<!--begin::Col-->
						<div class="col-lg-2 fv-row">
						<!--begin::Image input-->
						<div class="image-input image-input-outline" data-kt-image-input="true">
						<!--begin::Preview existing avatar-->
						<div class="image-input-wrapper"></div>
						<!--end::Preview existing avatar-->
						<!--begin::Cancel-->
						<span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" data-kt-initialized="1">
							<i class="bi bi-x fs-6"></i>
						</span>
						<!--end::Cancel-->
						</div>
						<!--end::Image input-->
						</div>
						<!--end::Col-->
						<!--begin::Label-->
						<label class="col-lg-1 col-form-label fw-semibold fs-6">Jewel</label>
						<!--end::Label-->
						<!--begin::Col-->
						<div class="col-lg-2 fv-row">
						<!--begin::Image input-->
						<div class="image-input image-input-outline" data-kt-image-input="true">
						<!--begin::Preview existing avatar-->
						<div class="image-input-wrapper" style="background-image: url(assets/images/sample_jewel.jpg)"></div>
						<!--end::Preview existing avatar-->
						<!--begin::Cancel-->
						<span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" data-kt-initialized="1">
							<i class="bi bi-x fs-6"></i>
						</span>
						<!--end::Cancel-->
						</div>
						<!--end::Image input-->
						</div>
						<!--end::Col-->
					</div>
					<!--begin::Actions-->
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
	<?php include "script.php"?>
	<script src="js/newloan-list.js"></script>
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
				
		</script>
		<script>
			function nom_radio()
			{
				var nominee_radio = document.getElementById("nominee_radio");
				var nominee_id = document.getElementById("nominee_id");
				var nominee_id_tbox = document.getElementById("nominee_id_tbox");
				var relation_id = document.getElementById("relation_id");
				var relation_id_tbox = document.getElementById("relation_id_tbox");

				if (nominee_radio.checked == true)
				{
				    nominee_id.style.display = "block";
				    nominee_id_tbox.style.display = "block";
				    relation_id.style.display = "block";
				    relation_id_tbox.style.display = "block";
			  	} else 
			  	{
			     	nominee_id.style.display = "none";
				    nominee_id_tbox.style.display = "none";
				    relation_id.style.display = "none";
				    relation_id_tbox.style.display = "none";
			  	}
			}
		</script>
		<script>
			function nom_radio_edit()
			{
				var nominee_radio_edit = document.getElementById("nominee_radio_edit");
				var nominee_id_edit = document.getElementById("nominee_id_edit");
				var nominee_id_tbox_edit = document.getElementById("nominee_id_tbox_edit");
				var relation_id_edit = document.getElementById("relation_id_edit");
				var relation_id_tbox_edit = document.getElementById("relation_id_tbox_edit");

				if (nominee_radio_edit.checked == true)
				{
				    nominee_id_edit.style.display = "block";
				    nominee_id_tbox_edit.style.display = "block";
				    relation_id_edit.style.display = "block";
				    relation_id_tbox_edit.style.display = "block";
			  	} else 
			  	{
			     	nominee_id_edit.style.display = "none";
				    nominee_id_tbox_edit.style.display = "none";
				    relation_id_edit.style.display = "none";
				    relation_id_tbox_edit.style.display = "none";
			  	}
			}
		</script>
		<script>
			function nom_radio_view()
			{
				var nominee_radio_view = document.getElementById("nominee_radio_view");
				var nominee_id_view = document.getElementById("nominee_id_view");
				var nominee_id_tbox_view = document.getElementById("nominee_id_tbox_view");
				var relation_id_view = document.getElementById("relation_id_view");
				var relation_id_tbox_view = document.getElementById("relation_id_tbox_view");

				if (nominee_radio_view.checked == true)
				{
				    nominee_id_view.style.display = "block";
				    nominee_id_tbox_view.style.display = "block";
				    relation_id_view.style.display = "block";
				    relation_id_tbox_view.style.display = "block";
			  	} else 
			  	{
			     	nominee_id_view.style.display = "none";
				    nominee_id_tbox_view.style.display = "none";
				    relation_id_view.style.display = "none";
				    relation_id_tbox_view.style.display = "none";
			  	}
			}
		</script>
	</body>
	<!--end::Body-->
	</html>