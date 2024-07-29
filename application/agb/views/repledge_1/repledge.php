<?php $this->load->view("common");?>
	<!--begin::Body-->
	<body data-kt-name="metronic" id="kt_body" class="header-fixed header-tablet-and-mobile-fixed toolbar-enabled toolbar-fixed aside-enabled aside-fixed">
		<!--begin::Theme mode setup on page load-->
		<script>if ( document.documentElement ) { const defaultThemeMode = "system"; const name = document.body.getAttribute("data-kt-name"); let themeMode = localStorage.getItem("kt_" + ( name !== null ? name + "_" : "" ) + "theme_mode_value"); if ( themeMode === null ) { if ( defaultThemeMode === "system" ) { themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light"; } else { themeMode = defaultThemeMode; } } document.documentElement.setAttribute("data-theme", themeMode); }
		</script>
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
									<h1 class="d-flex align-items-center text-dark fw-bold my-1 fs-3"> Re Pledge List
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
										<!--begin::Card body-->
										<div class="card-body py-4">
											<form >
												<div class="row">
													<div class="col-lg-2 fv-row fv-plugins-icon-container">
														<label class="form-label">Company</label>
														<select class="form-select form-select-solid" data-control="select2" data-hide-search="true">
															<option value="all">All</option>
															<option value="1">AGB - Ayyanar Gold Bank</option>
															<option value="2">AKS - Ayyanar Karuppati Sayalkudi</option>
														</select>
													</div>
													<div class="col-lg-2 fv-row fv-plugins-icon-container">
														<label class="form-label">Type</label>
														<select class="form-select form-select-solid" data-control="select2" data-hide-search="true" id="all_period" onchange="all_pd()">
															<option value="all">All</option>
															<option value="period">Period</option>
														</select>
													</div>
													<div class="col-lg-2 fv-row" id="period_date1" style="display: none;">
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
															<input class="form-control form-control-solid ps-12" name="date" placeholder="From Date" id="kt_daterangepicker_repledge_from" value="<?php echo date("d-m-Y"); ?>" />
														</div>
													</div>
													<div class="col-lg-2 fv-row" id="period_date2" style="display: none;">
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
															<input class="form-control form-control-solid ps-12" name="date" placeholder="To Date" id="kt_daterangepicker_repledge_to" value="<?php echo date("d-m-Y"); ?>" />
														</div>
													</div>
													<div class="col-lg-2 fv-row fv-plugins-icon-container">
														<label class="form-check form-check-inline form-check-solid is-invalid mt-1">
															<!-- <input class="form-check-input" name="" type="checkbox" value="1" id="check_bank" onclick="fil_bank();"> -->
															<span class="form-label">Bank</span>
														</label>
														<select class="form-select form-select-solid mb-6" data-control="select2" data-hide-search="true" id="bank_filter" disabled>
															<option value="acs">ACS</option>
															<option value="1">IOB PP</option>
															<option value="2">IOB SKD</option>
															<option value="3">KOSAMATTAM</option>
															<option value="4">KVB</option>
														</select>
													</div>
													<div class="col-lg-2 fv-row fv-plugins-icon-container">
														<label class="form-check form-check-inline form-check-solid is-invalid mt-1">
															<!-- <input class="form-check-input" name="" type="checkbox" value="1" id="check_staff" onclick="fil_staff();"> -->
															<span class="form-label">Staff</span>
														</label>
														<select class="form-select form-select-solid mb-6" data-control="select2" data-hide-search="true" id="staff_filter" disabled>
															<option value="antony">Antony</option>
															<option value="1">Arun</option>
															<option value="2">Ayyanar</option>
															<option value="3">Esakki</option>
															<option value="4">Karuppan</option>
														</select>
													</div>
													<div class="col-lg-2 fv-row fv-plugins-icon-container">
														<label class="form-label">Interest %</label>
														<select class="form-select form-select-solid" data-control="select2" data-hide-search="true">
															<option value="all">All</option>
															<option value="1">1.83</option>
															<option value="2">1.97</option>
															<option value="3">2.00</option>
															<option value="4">2.50</option>
														</select>
													</div>
													<div class="col-lg-2 fv-row fv-plugins-icon-container">
														<label class="form-label">Bill Type</label>
														<select class="form-select form-select-solid" data-control="select2" data-hide-search="true" onchange="bill_type_dp_down();" id="bill_type_d_box">
															<option value="">Select</option>
															<option value="bill_no">Bill No</option>
															<option value="bank_no">Bank No</option>
															<option value="rp_bill_no">RP Bill No</option>
														</select>
													</div>
													<div class="col-lg-2 fv-row fv-plugins-icon-container" id="bill_type_t_field" style="display: none;">
														<label class="form-label" id="bill_type_fil"></label>
														<input type="text" name="" class="form-control form-control-lg form-control-solid">
													</div>
													<div class="col-lg-2 fv-row fv-plugins-icon-container">
														<label class="form-label">Closing Type</label>
														<select class="form-select form-select-solid" data-control="select2" data-hide-search="true">
															<option value="all">All</option>
															<option value="1">Active</option>
															<option value="2">Closed</option>
														</select>
													</div>
													<div class="col-lg-2 fv-row fv-plugins-icon-container">
														<label class="form-label">Loan Type</label>
														<select class="form-select form-select-solid" data-control="select2" data-hide-search="true">
															<option value="all">All</option>
															<option value="1">Single</option>
															<option value="2">Mixed</option>
														</select>
													</div>
													<div class="col-lg-1 pt-9">
														<button type="button" class="btn btn-sm btn-outline btn-outline-solid btn-outline-warning btn-active-light-primary me-2">Go</button>
													</div>
												</div>
												<div class="d-flex justify-content-end mt-1">
													
														<a class="btn btn-primary" href="<?php echo base_url();?>repledge/add_repledge">
															New Repledge
														</a>
												</div>

												<table id="kt_datatable_responsive" class="table align-middle table-row-dashed table-striped table-hover fs-7 gy-1 gs-2">
												<thead>
												   <tr class="fw-bold fs-7 text-gray-800 px-7">
													    <th class="min-w-100px cy">Date</th>
														<th class="min-w-50px">RP No.</th>
														<th class="min-w-100px">RP Bill No.</th>
														<th class="min-w-100px">Bank Name</th>
														<th class="min-w-80px">Bank No.</th>
														<th class="min-w-80px">Net Wt</th>
														<th class="min-w-80px">Amount</th>
														<th class="min-w-50px">Interest%</th>
														<th class="min-w-50px">Months</th>
														<th class="min-w-100px">Staff</th>
														<th class="min-w-100px">Return date</th>
														<th class="min-w-50px">Status</th>
														<th class="min-w-125px"><span class="text-end">Actions</span></th>
												    </tr>
												</thead>
												<!--begin::Table body-->
												<tbody class="text-gray-600 fw-semibold">
													<!--begin::Table row-->
													<?php foreach($repledge_list as $rp){?>
													<tr>
														<!-- <td class="cy"><?php //echo $rp[]; ?></td> -->
														<td class="cy"><?php echo $rp['ENDATE']; ?></td>
														<td><?php echo $rp['RP_SNO']; ?></td>
														<td><?php echo $rp['RP_BILLNO']; ?></td>
														<td><?php echo $rp['BANK']; ?></td>
														<td><?php echo $rp['BANKNO']; ?></td>
														<td><?php echo $rp['NETWEIGHT']; ?></td>
														<td><?php echo $rp['AMOUNT']; ?></td>
														<td><?php echo $rp['INTEREST']; ?></td>
														<td><?php echo $rp['MONTHS']; ?></td>
														<td><?php echo $rp['STAFF']; ?></td>
														<td><?php echo $rp['RETURN_DATE']; ?></td>
														<td><?php echo $rp['ACTIVE']; ?></td>
														<!--begin::Action=-->
														<td>
															<span class="text-end">
																<a href="#" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm" data-bs-toggle="modal" data-bs-target="#kt_modal_viewrepledge">
																<i class="bi bi-eye-fill eyc"></i>
																</a>
																<a href="#" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1" data-bs-toggle="modal" data-bs-target="#kt_modal_editrepledge">
																	<!--begin::Svg Icon | path: icons/duotune/art/art005.svg-->
																	<span class="svg-icon svg-icon-3">
																		<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																		<path opacity="0.3" d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z" fill="currentColor"></path>
																		<path d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z" fill="currentColor"></path>
																		</svg>
																	</span>
																	<!--end::Svg Icon-->
																</a>
																<a href="#" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm" data-bs-toggle="modal" data-bs-target="#kt_modal_deleterepledge">
																<!--begin::Svg Icon | path: icons/duotune/general/gen027.svg-->
																	<span class="svg-icon svg-icon-3">
																	<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																	<path d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z" fill="currentColor"></path>
																	<path opacity="0.5" d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z" fill="currentColor"></path>
																	<path opacity="0.5" d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z" fill="currentColor"></path>
																	</svg>
																	</span>
																				<!--end::Svg Icon-->
																</a>
															</span>
														</td>
														<!--end::Action=-->
													</tr>
													<?php } ?>
													<!--end::Table row-->
													<!--begin::Table row-->
													
													<!--end::Table row-->
												</tbody>
												<!--end::Table body-->
											</table>

											</form>
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
	
	<!--end::Modal - New Loan-->
	<!--begin::Modal - edit Loan-->
	<div class="modal fade" id="kt_modal_editloan_receipts" tabindex="-1" aria-hidden="true">
		
	</div>
	<!--end::Modal - edit loan-->
	<!--begin::Modal - view loan-->
	<div class="modal fade" id="kt_modal_viewloan_receipts" tabindex="-1" aria-hidden="true">
	
	</div>
	<!--end::Modal - view loan-->
	<!--begin::Modal - deleteloan-->
	<div class="modal fade" id="kt_modal_deleteloan_receipts" tabindex="-1" aria-hidden="true">
		
	</div>
	<!--end::Modal - delete loan-->
	<input type="hidden" id="baseurl" value="<?php echo base_url();?>">
	<?php $this->load->view("script");?>
	<script type="text/javascript">
		$("#kt_datatable_responsive").DataTable({
						// "ordering": false,
						"aaSorting":[],
						"responsive": true,
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
	
</body>
<!--end::Body-->
</html>