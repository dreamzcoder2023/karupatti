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
									<h1 class="d-flex align-items-center text-dark fw-bold my-1 fs-3">Banks List
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
					<?php if($this->session->flashdata('g_success')){?>
                        <div class="alert alert-success" id="alertaddmessage">
                         <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                        <?php echo $this->session->flashdata('g_success'); ?>
                        </div>
                        <?php } ?>

                        <?php if($this->session->flashdata('g_err')){?>
                        <div class="alert alert-success" id="alertaddmessage">
                         <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                        <?php echo $this->session->flashdata('g_err'); ?>
                        </div>
                     <?php } ?>
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
											
											<button type="button" class="btn btn-primary"  data-bs-toggle="modal" data-bs-target="#kt_modal_upgrade_plan_new">
											<!--begin::Svg Icon | path: icons/duotune/arrows/arr075.svg-->
											<span class="svg-icon svg-icon-2">
												<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
													<rect opacity="0.5" x="11.364" y="20.364" width="16" height="2" rx="1" transform="rotate(-90 11.364 20.364)" fill="currentColor" />
													<rect x="4.36396" y="11.364" width="16" height="2" rx="1" fill="currentColor" />
												</svg>
											</span>
											<!--end::Svg Icon-->New Bank</button>
											<!--end::Add user-->
										</div>
										<!--end::Toolbar-->
										<!--begin::Modal - Adjust Balance-->
										<div class="modal fade" id="kt_modal_export_users" tabindex="-1" aria-hidden="true">
											<!--begin::Modal dialog-->
											<div class="modal-dialog modal-dialog-centered mw-650px">
												<!--begin::Modal content-->
												<div class="modal-content">
													<!--begin::Modal header-->
													<div class="modal-header">
														<!--begin::Modal title-->
														<h2 class="fw-bold">Export</h2>
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
																<label class="fs-6 fw-semibold form-label mb-2">Select Bank:</label>
																<!--end::Label-->
																<!--begin::Input-->
																<select name="role" data-control="select2" data-placeholder="Select Bank" data-hide-search="true" class="form-select form-select-solid fw-bold">
																	<option></option>
																	<option value="Bank Details">Bank Details</option>
																	<option value="all">All</option>
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
									<table class="table align-middle table-row-dashed table-striped table-hover fs-6 gy-5" id="kt_datatable_dom_positioning">
										<!--begin::Table head-->
										<thead>
											<!--begin::Table row-->
											<tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">
												<th class="min-w-25px cy">Bank</th>
												<th class="min-w-25px">Branch/Place</th>
												<th class="min-w-25px">IFSC Code</th>
												<th class="min-w-25px">Company</th>
												<th class="min-w-25px">Address</th>
												<th class="min-w-25px">A/C No</th>
												<th class="min-w-25px">Person Name</th>
												<!-- <th class="min-w-25px">Status</th> -->
												<th class="min-w-25px"><span class="text-end">Actions</span></th>
											</tr>
											<!--end::Table row-->
										</thead>
										<!--end::Table head-->
										<!--begin::Table body-->
										<tbody class="text-gray-600 fw-semibold">
											<!--begin::Table row-->
											<?php
												$i=1;
												foreach($b_settings as $bank_settings)
												{
												?>
											<tr>
										
												<td class="cy"><?php echo $bank_settings['BANKNAME']; ?></td>
												<td><?php echo $bank_settings['BRANCH']; ?></td>
												<td><?php echo $bank_settings['IFSC']; ?></td>
												<td><?php 
													$cqry=$this->db->query("SELECT COMPANYNAME FROM COMPANY WHERE COMPANYCODE='".$bank_settings['COMPANYCODE']."'");
													// echo "SELECT COMPANYNAME FROM COMPANY WHERE COMPANYCODE='".$bank_settings['COMPANYCODE']."'";
														
													// print_r($cqry->num_rows());
													// exit();

													if(!isset($cres))
													{
														echo "";
													}
													else{
														echo $cres->COMPANYNAME;
													} ?>
												</td>
												<td><?php echo $bank_settings['ADDRESS']; ?></td>
												<td><?php echo $bank_settings['ACCOUNTNO']; ?></td>
												<td><?php echo $bank_settings['PERSONNAME']; ?></td>
												<!--begin::Action=-->
												<td>
													<span class="text-end">
													<a href="#" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm" data-bs-toggle="modal" data-bs-target="#kt_modal_view_company">
														<i class="bi bi-eye-fill eyc"></i>
													</a>
													<a href="editcompany.php" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1" data-bs-toggle="modal" data-bs-target="#kt_modal_edit_company">
																		<!--begin::Svg Icon | path: icons/duotune/art/art005.svg-->
																		<span class="svg-icon svg-icon-3">
																			<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																				<path opacity="0.3" d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z" fill="currentColor"></path>
																				<path d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z" fill="currentColor"></path>
																			</svg>
																		</span>
																		<!--end::Svg Icon-->
																	</a>
													<a href="#" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm" data-bs-toggle="modal" data-bs-target="#kt_modal_delete_company">
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
											<?php 
												$i++;
												}
											?>
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
				
				<?php $this->load->view("footer");?>
				</div>
				<!--end::Wrapper-->
			</div>
			<!--end::Page-->
		</div>
		<!--end::Root-->
		<!--begin::Modal-New Bank-->
		<div class="modal fade" id="kt_modal_upgrade_plan_new" tabindex="-1" aria-hidden="true">
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
					<form name="bank_add_form" id="bank_add_form" method="POST" action="<?php echo base_url(); ?>bank/bank_save" enctype="multipart/form-data" onsubmit="return bank_validation();">

						<?php
							$qry=$this->db->query("SELECT Top 1 SNO FROM BANKS ORDER BY SNO DESC");
							$res=$qry->row();
							$last_data= $res['SNO'];
                            $exlno = substr($last_data,1);
                            $next_value = (int)$exlno + 1;
                            $r_no1=str_pad($next_value,3,0,STR_PAD_LEFT);
                            $s_no="R".$r_no1;
						?>
						<input type="hidden" id="bank_id" name="bank_id" value="<?php echo $s_no;?>">
					<div class="modal-body pt-0 pb-15 px-5 px-xl-20">
						<!--begin::Heading-->
						<div class="mb-13 text-center">
							<h1 class="mb-3">New Bank</h1>
							<div class="text-muted fw-semibold fs-5">Please update the following details to include a Bank</div>
						</div>
						<!--end::Heading-->

						<div class="row mb-6">
												<!--begin::Label-->
												<label class="col-lg-1 col-form-label required fw-semibold fs-6">Bank</label>
												<!--end::Label-->
												<!--begin::Col-->
												<div class="col-lg-3 fv-row fv-plugins-icon-container">
													<input type="text" name="bank_name" id="bank_name" class="form-control form-control-lg form-control-solid" placeholder="Bank Name" required onkeyup="bank_unique(this.value);">
													<div class="fv-plugins-message-container invalid-feedback"></div>
												</div>
												<!--end::Col-->
												
												<!--begin::Label-->
												<label class="col-lg-1 col-form-label required fw-semibold fs-6">Branch</label>
												<!--end::Label-->
												<!--begin::Col-->
												<div class="col-lg-3 fv-row fv-plugins-icon-container">
													<input type="text" name="branch_name" id="branch_name" class="form-control form-control-lg form-control-solid" placeholder="Branch/Place">
													<div class="fv-plugins-message-container invalid-feedback"></div>
												</div>
												<!--end::Col-->
												
												<!--begin::Label-->
												<label class="col-lg-1 col-form-label  fw-semibold fs-6">IFSC</label>
												<!--end::Label-->
												<!--begin::Col-->
												<div class="col-lg-3 fv-row fv-plugins-icon-container">
													<input type="text" name="ifsc" id="ifsc" class="form-control form-control-lg form-control-solid" placeholder="IFSC Code">
													<div class="fv-plugins-message-container invalid-feedback"></div>
												</div>
												<!--end::Col-->
												
												<!--begin::Label-->
												<label class="col-lg-1 col-form-label  fw-semibold fs-6">Company</label>
												<!--end::Label-->
												<!--begin::Left Section-->
												<div class="col-lg-3">
													<!--begin::Select-->
													<select class="form-select form-select-solid" data-control="select2" data-placeholder="Select Zone" data-hide-search="true" name="company" id="company">

														<option value="0">Select Company</option>	
														<?php 
														
															$qry=$this->db->query("SELECT  COMPANYCODE,COMPANYNAME FROM COMPANY WHERE ACTIVE='Y'");
															$res=$qry->result();
															foreach ($res as $comp_list) 
															{
																?>
																<option value="<?php echo $comp_list->COMPANYCODE; ?>"> <?php echo $comp_list->COMPANYNAME; ?></option>
																<?php
															}
															?> 	
													</select>
												</div>
													<!--end::Select-->
												<!--end::Col-->
												<!--begin::Label-->
												<label class="col-lg-1 col-form-label fw-semibold fs-6">Address</label>
												<!--end::Label-->
												<!--begin::Col-->
												<div class="col-lg-3 fv-row fv-plugins-icon-container">
													<input type="text" name="address" id="address" class="form-control form-control-lg form-control-solid" placeholder="Address">
													<div class="fv-plugins-message-container invalid-feedback"></div>
												</div>
												<!--end::Col-->
												<!--begin::Label-->
												<label class="col-lg-1 col-form-label  fw-semibold fs-6">A/C No</label>
												<!--end::Label-->
												<!--begin::Col-->
												<div class="col-lg-3 fv-row fv-plugins-icon-container">
													<input type="text" name="acc_no" id="acc_no" class="form-control form-control-lg form-control-solid" placeholder="Account Number">
													<div class="fv-plugins-message-container invalid-feedback"></div>
												</div>
												<!--end::Col-->
												<!--begin::Label-->
												<label class="col-lg-1 col-form-label  fw-semibold fs-6">Person Name</label>
												<!--end::Label-->
												<!--begin::Col-->
												<div class="col-lg-3 fv-row fv-plugins-icon-container">
													<input type="text" name="person_name" id="person_name" class="form-control form-control-lg form-control-solid" placeholder="Person Name">
													<div class="fv-plugins-message-container invalid-feedback"></div>
												</div>
												<!--end::Col-->
					     </div>
						<!--begin::Actions-->
						<div class="row">
							<div class="col-lg-9"></div>
							<div class="col-lg-1">
								<div class="d-flex flex-center flex-row-fluid pt-12">
									<button type="reset" class="btn btn-secondary me-3" data-bs-dismiss="modal">Cancel</button>
								</div>
							</div>
							<div class="col-lg-2">
								<div class="d-flex flex-center flex-row-fluid pt-12">
									<button type="submit" class="btn btn-success" data-bs-dismiss="modal" >Save Changes</button>
								</div>
							</div>
						</div>
						<!--end::Actions-->
					</div>
					<!--end::Modal body-->
				</form>
				</div>
				<!--end::Modal content-->
			</div>
			<!--end::Modal dialog-->
		</div>
		<!--end::Modal - New Bank-->
	
		<!--begin::Modal - view company-->
		<div class="modal fade" id="kt_modal_view_company" tabindex="-1" aria-hidden="true">
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
						<div class="mb-13 text-center">
							<h1 class="mb-3">View Bank Details</h1>
						</div>
						<!--end::Heading-->
						<div class="row mb-6">
												<!--begin::Label-->
												<label class="col-lg-1 col-form-label fw-semibold fs-6">Bank</label>
												<!--end::Label-->
												<!--begin::Col-->
												<div class="col-lg-3 fv-row fv-plugins-icon-container">
													<input type="text" name="company" class="form-control form-control-lg form-control-solid" placeholder="" value="SBI" readonly>
													<div class="fv-plugins-message-container invalid-feedback"></div>
												</div>
												<!--end::Col-->
												
												<!--begin::Label-->
												<label class="col-lg-1 col-form-label fw-semibold fs-6">Branch</label>
												<!--end::Label-->
												<!--begin::Col-->
												<div class="col-lg-3 fv-row fv-plugins-icon-container">
													<input type="text" name="company" class="form-control form-control-lg form-control-solid" placeholder="Branch/Place" value="Sayalkudi" readonly>
													<div class="fv-plugins-message-container invalid-feedback"></div>
												</div>
												<!--end::Col-->
												
												<!--begin::Label-->
												<label class="col-lg-1 col-form-label fw-semibold fs-6">IFSC</label>
												<!--end::Label-->
												<!--begin::Col-->
												<div class="col-lg-3 fv-row fv-plugins-icon-container">
													<input type="text" name="company" class="form-control form-control-lg form-control-solid" placeholder="IFSC Code" value="IFSC012" readonly>
													<div class="fv-plugins-message-container invalid-feedback"></div>
												</div>
												<!--end::Col-->
												
												<!--begin::Label-->
												<label class="col-lg-1 col-form-label fw-semibold fs-6">Company</label>
												<!--end::Label-->
												<!--begin::Col-->
												<div class="col-lg-3 fv-row fv-plugins-icon-container">
													<input type="text" name="company" class="form-control form-control-lg form-control-solid" placeholder="Company" value="C001-AGB" readonly>
													<div class="fv-plugins-message-container invalid-feedback"></div>
												</div>
												<!--end::Col-->
												<!--begin::Label-->
												<label class="col-lg-1 col-form-label fw-semibold fs-6">Address</label>
												<!--end::Label-->
												<!--begin::Col-->
												<div class="col-lg-3 fv-row fv-plugins-icon-container">
													<input type="text" name="company" class="form-control form-control-lg form-control-solid" placeholder="Company" value="Sayalkudi" readonly>
													<div class="fv-plugins-message-container invalid-feedback"></div>
												</div>
												<!--end::Col-->
												<!--begin::Label-->
												<label class="col-lg-1 col-form-label fw-semibold fs-6">A/C No</label>
												<!--end::Label-->
												<!--begin::Col-->
												<div class="col-lg-3 fv-row fv-plugins-icon-container">
													<input type="text" name="company" class="form-control form-control-lg form-control-solid" placeholder="Company" value="25264545" readonly>
													<div class="fv-plugins-message-container invalid-feedback"></div>
												</div>
												<!--end::Col-->
												<!--begin::Label-->
												<label class="col-lg-1 col-form-label fw-semibold fs-6">Name</label>
												<!--end::Label-->
												<!--begin::Col-->
												<div class="col-lg-3 fv-row fv-plugins-icon-container">
													<input type="text" name="company" class="form-control form-control-lg form-control-solid" placeholder="Company" value="Srinivasan K" readonly>
													<div class="fv-plugins-message-container invalid-feedback"></div>
												</div>
												<!--end::Col-->					
					</div>
					<!--end::Modal body-->
				</div>
				<!--end::Modal content-->
			</div>
			<!--end::Modal dialog-->
		</div>
	</div>
		<!--end::Modal - view Department-->
		<!--begin::Modal-Edit Bank-->
		<div class="modal fade" id="kt_modal_edit_company" tabindex="-1" aria-hidden="true">
			
		</div>
		<!--end::Modal - Edit Bank-->
		<!--begin::Modal - delete company-->
		<div class="modal fade" id="kt_modal_delete_company" tabindex="-1" aria-hidden="true">
			
		</div>
		<!--end::Modal - delete company-->
<input type="hidden" id="baseurl" value="<?php echo base_url();?>">

		<?php $this->load->view("script");?>
		<script>
			$("#kt_datatable_dom_positioning").DataTable({
				"ordering": false,
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
			var title = $('title').text() + ' | ' + 'Bank';
			    $(document).attr("title", title);

			var berr=0;
			function bank_unique(val)
			{
				var baseurl= $("#baseurl").val();
				$.ajax({
					type:"POST",
					url:baseurl+'bank/bank_unique',
					data:{'value':val},
					cache: false,
					dataType: "html",
						success: function(result){
						if(result>0)
						{
							$('#bank_err').html('Bank already exist!');
							berr=1;
						}
						else
						{
							$('#bank_err').html('');
							berr=0;
						}
					}
				});
			}

			function bank_validation()
			{
				var err = 0;
				var bank = $('#bank_name').val();
				var branch = $('#branch_name').val();

			    if(bank.trim()==''){
			        $('#bank_err').html('Enter Bank Name!');
			        err++;
			    }else{
			        //$('#bank_err').html('');
			        if(berr>0)
					{
						$('#bank_err').html('Bank already exist!');
						err++;
					}
					else
					{
						$('#bank_err').html('');
					}
			    }
			    
			    if(err>0){ return false; }else{ return true; }
			}
		</script>
	</body>
	<!--end::Body-->
</html>