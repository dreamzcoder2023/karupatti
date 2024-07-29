<?php include "common.php"?>
<style>
	.dataTables_scroll
    {
        position: relative;
        overflow: auto;
        min-height: 271px;
        max-height: 271px;/*the maximum height you want to achieve*/
        width: 100%;
    }
  .dataTables_scroll thead{
    position: -webkit-sticky;
    position: sticky;
    top: 0;
    /*background-color: #fff;*/
    z-index: 2;
  }
  .dataTables_scroll_cash_in_hand
    {
        position: relative;
        overflow: auto;
        min-height: 280px;
        max-height: 280px;/*the maximum height you want to achieve*/
        width: 100%;
    }
  .dataTables_scroll_cash_in_hand thead{
    position: -webkit-sticky;
    position: sticky;
    top: 0;
    /*background-color: #fff;*/
    z-index: 2;
  }
  .dataTables_scroll_payments_mode
    {
        position: relative;
        overflow: auto;
        min-height: 280px;
        max-height: 280px;/*the maximum height you want to achieve*/
        width: 100%;
    }
  .dataTables_scroll_payments_mode thead{
    position: -webkit-sticky;
    position: sticky;
    top: 0;
    /*background-color: #fff;*/
    z-index: 2;
  }
  .dataTables_scroll_highest
    {
        position: relative;
        overflow: auto;
        min-height: 280px;
        max-height: 280px;/*the maximum height you want to achieve*/
        width: 100%;
    }
  .dataTables_scroll_highest thead{
    position: -webkit-sticky;
    position: sticky;
    top: 0;
    /*background-color: #fff;*/
    z-index: 2;
  }
  .dataTables_jewellery_delivered
    {
        position: relative;
        overflow: auto;
        min-height: 240px;
        max-height: 240px;/*the maximum height you want to achieve*/
        width: 100%;
    }
  .dataTables_jewellery_delivered thead{
    position: -webkit-sticky;
    position: sticky;
    top: 0;
    /*background-color: #fff;*/
    z-index: 2;
  }
  .dataTables_chit_delivered
    {
        position: relative;
        overflow: auto;
        min-height: 160px;
        max-height: 160px;/*the maximum height you want to achieve*/
        width: 100%;
    }
  .dataTables_chit_delivered thead{
    position: -webkit-sticky;
    position: sticky;
    top: 0;
    /*background-color: #fff;*/
    z-index: 2;
  }
  

  .dataTables_jewellery_payments_mode
    {
        position: relative;
        overflow: auto;
        min-height: 280px;
        max-height: 280px;/*the maximum height you want to achieve*/
        width: 100%;
    }
  .dataTables_jewellery_payments_mode thead{
    position: -webkit-sticky;
    position: sticky;
    top: 0;
    /*background-color: #fff;*/
    z-index: 2;
  }
  .dataTables_jewellery_membership_card_issue
    {
        position: relative;
        overflow: auto;
        min-height: 280px;
        max-height: 280px;/*the maximum height you want to achieve*/
        width: 100%;
    }
  .dataTables_jewellery_membership_card_issue thead{
    position: -webkit-sticky;
    position: sticky;
    top: 0;
    /*background-color: #fff;*/
    z-index: 2;
  }

  .dataTables_scroll_jst
    {
        position: relative;
        overflow: auto;
        min-height: 190px;
        max-height: 190px;/*the maximum height you want to achieve*/
        width: 100%;
    }
  .dataTables_scroll_jst thead{
    position: -webkit-sticky;
    position: sticky;
    top: 0;
    /*background-color: #fff;*/
    z-index: 2;
  }

  .dataTables_karuppati_packed_orders
    {
        position: relative;
        overflow: auto;
        min-height: 190px;
        max-height: 190px;/*the maximum height you want to achieve*/
        width: 100%;
    }
  .dataTables_karuppati_packed_orders thead{
    position: -webkit-sticky;
    position: sticky;
    top: 0;
    /*background-color: #fff;*/
    z-index: 2;
  }
  
  .dash_loan{
        max-width: 50px;
        white-space: nowrap;
        text-overflow: ellipsis;
        overflow: hidden;
      }
      [role="tooltip"]{
        visibility: hidden;
      }

		#gold_count #gold_sub_count {
		  display: none;
			}
	#gold_count:hover #gold_sub_count {
	  display: block;
	  position: absolute;
	  margin-top: 0.5em;
	  margin-left: -4.5em !important;
	  color: white;
	  background: black;
	  padding: 3px 13px 3px 10px;
	  border-radius: 5px;
	  font-size: 14px;
	}
	#silver_count #silver_sub_count {
		  display: none;
			}
	#silver_count:hover #silver_sub_count {
	  display: block;
	  position: absolute;
	  margin-top: 0.5em;
	  margin-left: -4.5em !important;
	  color: white;
	  background: black;
	  padding: 3px 13px 3px 10px;
	  border-radius: 5px;
	  font-size: 14px;

	}
	#ogp_label #ogp_sub_label {
		  display: none;
			}
	#ogp_label:hover #ogp_sub_label {
	  display: block;
	  position: absolute;
	  margin-top: -4em;
	  margin-left: 5.5em !important;
	  color: white;
	  background: black;
	  padding: 3px 13px 3px 10px;
	  border-radius: 5px;
	  font-size: 14px;

	}

	#sales_count #sales_sub_count {
		  display: none;
			}
	#sales_count:hover #sales_sub_count {
	  display: block;
	  position: absolute;
	  margin-top: -2em;
	  margin-left: -9.5em !important;
	  color: white;
	  background: black;
	  padding: 3px 13px 3px 10px;
	  border-radius: 5px;
	  font-size: 14px;
	}
	#packed_count #packed_sub_count {
		  display: none;
			}
	#packed_count:hover #packed_sub_count {
	  display: block;
	  position: absolute;
	  margin-top: -2em;
	  margin-left: -10.5em !important;
	  color: white;
	  background: black;
	  padding: 3px 13px 3px 10px;
	  border-radius: 5px;
	  font-size: 14px;
	}
	#dispatch_count #dispatch_sub_count {
		  display: none;
			}
	#dispatch_count:hover #dispatch_sub_count {
	  display: block;
	  position: absolute;
	  margin-top: -2em;
	  margin-left: -11.5em !important;
	  color: white;
	  background: black;
	  padding: 3px 13px 3px 10px;
	  border-radius: 5px;
	  font-size: 14px;
	}
	#dispatch_pen_count #dispatch_pen_sub_count {
		  display: none;
			}
	#dispatch_pen_count:hover #dispatch_pen_sub_count {
	  display: block;
	  position: absolute;
	  margin-top: -2em;
	  margin-left: -12.5em !important;
	  color: white;
	  background: black;
	  padding: 3px 13px 3px 10px;
	  border-radius: 5px;
	  font-size: 14px;
	}
	#purchase_prop #purchase_prop_sub {
		  display: none;
			}
	#purchase_prop:hover #purchase_prop_sub {
	  display: block;
	  position: absolute;
	  margin-top: -2em;
	  margin-left: -15.5em !important;
	  color: white;
	  background: black;
	  padding: 3px 13px 3px 10px;
	  border-radius: 5px;
	  font-size: 14px;
	}
	#purchase_recp #purchase_recp_sub {
		  display: none;
			}
	#purchase_recp:hover #purchase_recp_sub {
	  display: block;
	  position: absolute;
	  margin-top: -4.6em;
	  margin-left: -5.5em !important;
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
				<?php include "sidebar.php"?>
				<!--begin::Wrapper-->
				<div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
				<?php include "header.php"?>	
					<!--begin::Content-->
					<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
						<!--begin::Container-->
						<div id="kt_content_container" class="container-xxl">
							<!--begin::Row-->
							<div class="row g-5 g-xl-8">
								<!--begin::Col-->
								<div class="col-xxl-8">
									<!--begin::Toolbar-->
									<div class="toolbar" id="kt_toolbar">
										<!--begin::Container-->
										<div id="kt_toolbar_container" class="container-fluid d-flex align-items-center">
											<!--begin::Page title-->
											<div class="flex-grow-1 flex-shrink-0 me-5">
												<!--begin::Page title-->
												<div data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
													<div class="d-grid mt-4">
														<ul class="nav nav-tabs flex-nowrap text-nowrap">
															<li class="nav-item">
																<a class="nav-link  btn btn-active-light btn-color-black-800 btn-active-color-primary rounded-bottom-0 fw-bold fs-6"  href="#kt_tab_pane_loan">Loan</a>
															</li>
															<li class="nav-item">
																<a class="nav-link btn btn-active-light btn-color-black-800 btn-active-color-primary rounded-bottom-0 fw-bold fs-6"  href="javascript:;">Jewellery</a>
															</li>
															<li class="nav-item">
																<a class="nav-link btn btn-active-light btn-color-black-800 btn-active-color-primary rounded-bottom-0 fw-bold fs-6"  href="<?php echo base_url(); ?>Dashboard/karupatti">Karuppati</a>
															</li>
															<li class="nav-item">
																<a class="nav-link btn btn-active-light btn-color-black-800 btn-active-color-primary rounded-bottom-0 fw-bold fs-6"  href="<?php echo base_url(); ?>Dashboard/chit">Chit</a>
															</li>
															<li class="nav-item">
																<a class="nav-link  btn btn-active-light btn-color-black-800 btn-active-color-primary rounded-bottom-0 fw-bold fs-6"  href="<?php echo base_url(); ?>Dashboard/real_estate">Real Estate</a>
															</li>
														</ul>
													</div>
												</div>
												<!--end::Page title-->
											</div>
											<!--end::Page title-->
											
										</div>
										<!--end::Container-->
									</div>
									<!--end::Toolbar-->
									<!--begin::Tables Widget 9-->
									<!-- <div class="card card-xxl-stretch mt-4 mt-xl-8"> -->
										<!--begin::Card body-->
										<div class="card-body py-2">
											<div class="tab-content" id="myTabContent">
												
												<div class="tab-pane fade show active" id="kt_tab_pane_chit" role="tabpanel">
													<div class="row">
														<!--begin::Col-->
														<div class="col-xl-4">
															<!--begin::Mixed Widget 5-->
															<div class="card card-xl-stretch mb-2 mb-xl-2" style="min-height: 250px !important; max-height: 250px !important;">
																<div class="row">
																	<div class="col-xl-8">
																		<h3 class="card-title align-items-start flex-column ms-5 mt-6">
																			<span class="card-label fw-bold fs-2">Today's Chit Collection</span>
																		</h3>
																	</div>
																	<div class="col-xl-4 d-flex align-items-center justify-content-center">
																		<h3 class="card-title align-items-start flex-column mt-6">
																			<span class="badge badge-success fs-1" style="background-color:red !important;">14</span>
																		</h3>
																	</div>
																</div>
																<!--begin::Body-->
																<div class="card-body px-8 py-1">
																	<!--begin::Table-->
																	<table class="table align-middle table-row-dashed table-hover fs-7 gy-3 gs-2" id="chit_todays_collection">
																		<!--begin::Table head-->
																		<thead>
																			<tr class="text-start text-muted fw-bold fs-6 gs-0">
																				<th class="min-w-80px">Type</th>
																				<th class="min-w-80px">Count</th>
																				<th class="min-w-100px">Amount</th>
																			</tr>
																		</thead>
																		<!--end::Table head-->
																		<!--begin::Table body-->
																		<tbody>
																			<tr>
																				<td class="dash_loan">
																					<a href="javascript:;" class="text-dark fw-bold d-block fs-6">Daily</a>
																				</td>
																				<td class="dash_loan">
																					<a href="javascript:;" class="text-primary fw-bold d-block fs-6">2</a>
																				</td>
																				<td class="dash_loan">
																					<a href="javascript:;" class="text-dark fw-bold d-block fs-6">5000.00</a>
																				</td>
																			</tr>
																			<tr>
																				<td class="dash_loan">
																					<a href="javascript:;" class="text-dark fw-bold d-block fs-6">Weekly</a>
																				</td>
																				<td class="dash_loan">
																					<a href="javascript:;" class="text-primary fw-bold d-block fs-6">4</a>
																				</td>
																				<td class="dash_loan">
																					<a href="javascript:;" class="text-dark fw-bold d-block fs-6">6000.00</a>
																				</td>
																			</tr>
																			<tr>
																				<td class="dash_loan">
																					<a href="javascript:;" class="text-dark fw-bold d-block fs-6">Monthly</a>
																				</td>
																				<td class="dash_loan">
																					<a href="javascript:;" class="text-primary fw-bold d-block fs-6">8</a>
																				</td>
																				<td class="dash_loan">
																					<a href="javascript:;" class="text-dark fw-bold d-block fs-6">10,000.00</a>
																				</td>
																			</tr>
																		</tbody>
																		<!--end::Table body-->
																	</table>
																	<!--end::Table-->
																</div>
																<!--end::Body-->
															</div>
															<!--end::Mixed Widget 5-->
														</div>
														<!--end::Col-->
														<!--begin::Col-->
														<div class="col-xl-4">
															<!--begin::Mixed Widget 5-->
															<div class="card card-xl-stretch mb-2 mb-xl-2" style="min-height: 250px !important; max-height: 250px !important;">
																<div class="row">
																	<div class="col-xl-8">
																		<h3 class="card-title align-items-start flex-column ms-5 mt-6">
																			<span class="card-label fw-bold fs-1">Credit Reminders</span>
																		</h3>
																	</div>
																	<div class="col-xl-4 d-flex align-items-center justify-content-center">
																		<h3 class="card-title align-items-start flex-column mt-6">
																			<span class="badge badge-success fs-1" style="background-color:red !important;">05</span>
																		</h3>
																	</div>
																</div>
																<!--begin::Body-->
																<div class="card-body px-8 py-1">
																	<!--begin::Table-->
																	<table class="table align-middle table-row-dashed table-hover fs-7 gy-3 gs-2" id="chit_credit_reminder">
																		<!--begin::Table head-->
																		<thead>
																			<tr class="text-start text-muted fw-bold fs-6 gs-0">
																				<th class="min-w-125px">Party</th>
																				<th class="min-w-125px">Date(days)</th>
																				<th class="min-w-80px">Amount</th>
																			</tr>
																		</thead>
																		<!--end::Table head-->
																		<!--begin::Table body-->
																		<tbody>
																			<tr>
																				<td class="dash_loan">
																					<div class="d-flex mb-1">
																						<div class="d-flex align-items-center">
																							<div class="symbol symbol-35px me-2">
																								<img src="assets/Images/staff_3.png" alt="">
																							</div>
																						</div>
																						<div class="d-flex flex-column flex-grow-1">
																							<a href="#" class="fs-6 text-gray-800 fw-bold">Gowri S</a>
																							<label class="text-primary fw-bold">JW-4587/23</label>
																						</div>
																					</div>
																				</td>
																				<td>
																					<label class="text-dark fw-bold fs-6">23-06-2023</label>
																					<label class="badge text-primary fw-bold fs-6" style="background-color: red;">
																						<span class="text-white">2</span>
																					</label>
																				</td>
																				<td class="dash_loan">
																					<label class="text-dark fw-bold fs-6">3000.00</label>
																				</td>
																			</tr>
																			<tr>
																				<td class="dash_loan">
																					<div class="d-flex mb-1">
																						<div class="d-flex align-items-center">
																							<div class="symbol symbol-35px me-2">
																								<img src="assets/Images/staff_2.png" alt="">
																							</div>
																						</div>
																						<div class="d-flex flex-column flex-grow-1">
																							<a href="#" class="fs-6 text-gray-800 fw-bold">Kumar N</a>
																							<label class="text-primary fw-bold">JW-257/23</label>
																						</div>
																					</div>
																				</td>
																				<td>
																					<label class="text-dark fw-bold fs-6">24-06-2023</label>
																					<label class="badge text-primary fw-bold fs-6" style="background-color: red;">
																						<span class="text-white">3</span>
																					</label>
																				</td>
																				<td class="dash_loan">
																					<label class="text-dark fw-bold fs-6">2500.00</label>
																				</td>
																			</tr>
																			<tr>
																				<td class="dash_loan">
																					<div class="d-flex mb-1">
																						<div class="d-flex align-items-center">
																							<div class="symbol symbol-35px me-2">
																								<img src="assets/Images/staff_1.png" alt="">
																							</div>
																						</div>
																						<div class="d-flex flex-column flex-grow-1">
																							<a href="#" class="fs-6 text-gray-800 fw-bold">Shanmugam J</a>
																							<label class="text-primary fw-bold">JW-568/23</label>
																						</div>
																					</div>
																				</td>
																				<td>
																					<label class="text-dark fw-bold fs-6">25-06-2023</label>
																					<label class="badge text-primary fw-bold fs-6" style="background-color: red;">
																						<span class="text-white">4</span>
																					</label>
																				</td>
																				<td class="dash_loan">
																					<label class="text-dark fw-bold fs-6">2900.00</label>
																				</td>
																			</tr>
																			<tr>
																				<td class="dash_loan">
																					<div class="d-flex mb-1">
																						<div class="d-flex align-items-center">
																							<div class="symbol symbol-35px me-2">
																								<img src="assets/Images/staff_4.png" alt="">
																							</div>
																						</div>
																						<div class="d-flex flex-column flex-grow-1">
																							<a href="#" class="fs-6 text-gray-800 fw-bold">Venmathi M</a>
																							<label class="text-primary fw-bold">JW-555/23</label>
																						</div>
																					</div>
																				</td>
																				<td>
																					<label class="text-dark fw-bold fs-6">26-06-2023</label>
																					<label class="badge text-primary fw-bold fs-6" style="background-color: red;">
																						<span class="text-white">6</span>
																					</label>
																				</td>
																				<td class="dash_loan">
																					<label class="text-dark fw-bold fs-6">3000.00</label>
																				</td>
																			</tr>
																			<tr>
																				<td class="dash_loan">
																					<div class="d-flex mb-1">
																						<div class="d-flex align-items-center">
																							<div class="symbol symbol-35px me-2">
																								<img src="assets/Images/staff_2.png" alt="">
																							</div>
																						</div>
																						<div class="d-flex flex-column flex-grow-1">
																							<a href="#" class="fs-6 text-gray-800 fw-bold">Siva S</a>
																							<label class="text-primary fw-bold">JW-556/23</label>
																						</div>
																					</div>
																				</td>
																				<td>
																					<label class="text-dark fw-bold fs-6">27-06-2023</label>
																					<label class="badge text-primary fw-bold fs-6" style="background-color: red;">
																						<span class="text-white">7</span>
																					</label>
																				</td>
																				<td class="dash_loan">
																					<label class="text-dark fw-bold fs-6">3200.00</label>
																				</td>
																			</tr>
																		</tbody>
																		<!--end::Table body-->
																	</table>
																	<!--end::Table-->
																</div>
																<!--end::Body-->
															</div>
															<!--end::Mixed Widget 5-->
														</div>
														<!--end::Col-->
														<!--begin::Col-->
														<div class="col-xl-4">
															<!--begin::Mixed Widget 5-->
															<div class="card card-xl-stretch mb-2 mb-xl-2" style="min-height: 250px !important; max-height: 250px !important;">
																<div class="row">
																	<div class="col-xl-12">
																		<h3 class="card-title align-items-start flex-column ms-5 mt-6" id="ogp_label">
																			<span class="card-label fw-bold fs-2">Transaction of Payment Mode</span>
																			<!-- <span id="ogp_sub_label">Old Gold Purchase Transaction</span> -->
																		</h3>
																	</div>
																</div>
																<!--begin::Body-->
																<div class="card-body px-8 py-1 mt-3">
																	<!--begin::Table-->
																	<table class="table align-middle table-row-dashed table-hover fs-7 gy-2 gs-2" id="chit_payment_mode">
																		<!--begin::Table head-->
																		<thead>
																			<tr class="text-start text-muted fw-bold fs-6 gs-0">
																				<th class="min-w-50px" style="min-width:65px !important;">Mode</th>
																				<th class="min-w-50px">Amount</th>
																			</tr>
																		</thead>
																		<!--end::Table head-->
																		<!--begin::Table body-->
																		<tbody>
																			<tr>
																				<td class="dash_loan">
																					<a href="javascript:;" class="text-dark fw-bold d-block fs-6">Cash</a>
																				</td>
																				<td class="dash_loan">
																					<a href="javascript:;" class="text-dark fw-bold d-block fs-6">12,000.00</a>
																				</td>
																			</tr>
																			<tr>
																				<td class="dash_loan">
																					<a href="javascript:;" class="text-dark fw-bold d-block fs-6">UPI</a>
																				</td>
																				<td class="dash_loan">
																					<a href="javascript:;" class="text-dark fw-bold d-block fs-6">10,000.00</a>
																				</td>
																			</tr>
																			<tr>
																				<td class="dash_loan">
																					<a href="javascript:;" class="text-dark fw-bold d-block fs-6">RTGS</a>
																				</td>
																				<td class="dash_loan">
																					<a href="javascript:;" class="text-dark fw-bold d-block fs-6">4,000.00</a>
																				</td>
																			</tr>
																			<tr>
																				<td class="dash_loan">
																					<a href="javascript:;" class="text-dark fw-bold d-block fs-6">Bank</a>
																				</td>
																				<td class="dash_loan">
																					<a href="javascript:;" class="text-dark fw-bold d-block fs-6">3,000.00</a>
																				</td>
																			</tr>
																		</tbody>
																		<!--end::Table body-->
																	</table>
																	<!--end::Table-->
																</div>
																<!--end::Body-->
															</div>
															<!--end::Mixed Widget 5-->
														</div>
														<!--end::Col-->
													</div>
													<div class="row">
														<!--begin::Col-->
														<div class="col-xl-6">
															<!--begin::Mixed Widget 5-->
															<div class="card card-xl-stretch mb-2 mb-xl-2" style="min-height: 320px !important; max-height: 320px !important;">
																<div class="row">
																	<div class="col-xl-10">
																		<h3 class="card-title align-items-start flex-column ms-5 mt-6">
																			<span class="card-label fw-bold fs-1">Requested JST</span>
																		</h3>
																	</div>
																	<div class="col-xl-2 d-flex align-items-center justify-content-center">
																		<h3 class="card-title align-items-start flex-column mt-6">
																			<span class="badge badge-success fs-1" style="background-color:red !important;">04</span>
																		</h3>
																	</div>
																</div>
																<!--begin::Body-->
																<div class="card-body px-8 py-1">
																	<!--begin::Table-->
																	<table class="table align-middle table-row-dashed table-hover fs-7 gy-1 gs-2" id="chit_requested_jst">
																		<!--begin::Table head-->
																		<thead>
																			<tr class="text-start text-muted fw-bold fs-6 gs-0">
																				<th class="min-w-100px">Agent</th>
																				<th class="min-w-150px">Company</th>
																				<th class="min-w-80px">Count</th>
																				<th class="min-w-80px">Amount</th>
																			</tr>
																		</thead>
																		<!--end::Table head-->
																		<!--begin::Table body-->
																		<tbody>
																			<tr>
																				<td class="dash_loan">
																					<div class="d-flex mb-1">
																						<div class="d-flex align-items-center">
																							<div class="symbol symbol-35px me-2">
																								<img src="assets/Images/staff_1.png" alt="">
																							</div>
																						</div>
																						<div class="d-flex flex-column flex-grow-1">
																							<a href="#" class="fs-6 text-gray-800 fw-bold">Govarthan S</a>
																							<label class="text-primary fw-bold">AG-02496</label>
																						</div>
																					</div>
																				</td>
																				<td class="dash_loan">
																					<span class="fs-6 text-gray-800 fw-bold">AGB - Main Branch Ayyanar Gold Bankers SKD</span>
																					<div class="d-flex flex-column flex-grow-1 my-lg-0 my-2">
																						<label class="text-gray-400 fw-semibold fs-6">ID:
																							<span class="text-primary fw-bold">001</span>
																						</label>
																					</div>
																				</td>
																				<td>
																					<label class="text-primary fw-bold fs-6 text-center">15</label>
																				</td>
																				<td class="dash_loan">
																					<label class="text-dark fw-bold fs-6">75,000.00</label>
																				</td>
																			</tr>
																			<tr>
																				<td class="dash_loan">
																					<div class="d-flex mb-1">
																						<div class="d-flex align-items-center">
																							<div class="symbol symbol-35px me-2">
																								<img src="assets/Images/staff_2.png" alt="">
																							</div>
																						</div>
																						<div class="d-flex flex-column flex-grow-1">
																							<a href="#" class="fs-6 text-gray-800 fw-bold">Kumar N</a>
																							<label class="text-primary fw-bold">AG-02499</label>
																						</div>
																					</div>
																				</td>
																				<td class="dash_loan">
																					<span class="fs-6 text-gray-800 fw-bold">AGK-5-KADALADI AYYANAR GOLD BANK</span>
																					<div class="d-flex flex-column flex-grow-1 my-lg-0 my-2">
																						<label class="text-gray-400 fw-semibold fs-6">ID:
																							<span class="text-primary fw-bold">010</span>
																						</label>
																					</div>
																				</td>
																				<td>
																					<label class="text-primary fw-bold fs-6 text-center">12</label>
																				</td>
																				<td class="dash_loan">
																					<label class="text-dark fw-bold fs-6">50,000.00</label>
																				</td>
																			</tr>
																			<tr>
																				<td class="dash_loan">
																					<div class="d-flex mb-1">
																						<div class="d-flex align-items-center">
																							<div class="symbol symbol-35px me-2">
																								<img src="assets/Images/staff_1.png" alt="">
																							</div>
																						</div>
																						<div class="d-flex flex-column flex-grow-1">
																							<a href="#" class="fs-6 text-gray-800 fw-bold">Shanmugam J</a>
																							<label class="text-primary fw-bold">AG-02497</label>
																						</div>
																					</div>
																				</td>
																				<td class="dash_loan">
																					<span class="fs-6 text-gray-800 fw-bold">AGN - NARIPPAYUR (NR) 3- BRANCH</span>
																					<div class="d-flex flex-column flex-grow-1 my-lg-0 my-2">
																						<label class="text-gray-400 fw-semibold fs-6">ID:
																							<span class="text-primary fw-bold">002</span>
																						</label>
																					</div>
																				</td>
																				<td>
																					<label class="text-primary fw-bold fs-6 text-center">8</label>
																				</td>
																				<td class="dash_loan">
																					<label class="text-dark fw-bold fs-6">60,000.00</label>
																				</td>
																			</tr>
																			<tr>
																				<td class="dash_loan">
																					<div class="d-flex mb-1">
																						<div class="d-flex align-items-center">
																							<div class="symbol symbol-35px me-2">
																								<img src="assets/Images/staff_2.png" alt="">
																							</div>
																						</div>
																						<div class="d-flex flex-column flex-grow-1">
																							<a href="#" class="fs-6 text-gray-800 fw-bold">Siva S</a>
																							<label class="text-primary fw-bold">AG-02498</label>
																						</div>
																					</div>
																				</td>
																				<td class="dash_loan">
																					<span class="fs-6 text-gray-800 fw-bold">AKP - KANNIRAJAPURAM (KP) 4 BRANCH</span>
																					<div class="d-flex flex-column flex-grow-1 my-lg-0 my-2">
																						<label class="text-gray-400 fw-semibold fs-6">ID:
																							<span class="text-primary fw-bold">009</span>
																						</label>
																					</div>
																				</td>
																				<td>
																					<label class="text-primary fw-bold fs-6 text-center">6</label>
																				</td>
																				<td class="dash_loan">
																					<label class="text-dark fw-bold fs-6">90,000.00</label>
																				</td>
																			</tr>
																		</tbody>
																		<!--end::Table body-->
																	</table>
																	<!--end::Table-->
																</div>
																<!--end::Body-->
															</div>
															<!--end::Mixed Widget 5-->
														</div>
														<!--end::Col-->
														<div class="col-xl-6">
															<div class="card card-body" style="min-height: 320px !important; max-height: 320px !important;">
																<?php $i=0; foreach($weekly_collection as $wlist){ ?>
																	<input type="hidden" class="input_count" name="weekly_collection[]" id="weekly_collection<?php echo $i; ?>" value="<?php echo $wlist; ?>" >
																	<?php $i++; } ?>
																<div id="chit_weekly_collection"></div>
															</div>
														</div>
													</div>
													<div class="row">
														<!--begin::Col-->
														<div class="col-xl-12">
															<!--begin::Mixed Widget 5-->
															<div class="card card-xl-stretch mb-2 mb-xl-2"  style="min-height: 320px !important; max-height: 320px !important;">
																<div class="row">
																	<div class="col-xl-10">
																		<h3 class="card-title align-items-start flex-column ms-5 mt-6">
																			<span class="card-label fw-bold fs-1">Collection Agent</span>
																			<!-- <span class="card-label fw-bold fs-1">03</span> -->
																		</h3>
																	</div>
																	<div class="col-xl-2 d-flex align-items-center justify-content-center">
																		<h3 class="card-title align-items-start flex-column mt-6">
																			<span class="badge badge-info fs-1" style="background-color:red !important;">04</span>
																		</h3>
																	</div>
																</div>
																<!--begin::Body-->
																<div class="card-body px-8 py-1">
																	<div class="row">
																		<table class="table align-middle table-row-dashed table-hover fs-7 gy-1 gs-3" id="chit_collection_agent">
																			<!--begin::Table head-->
																			<thead>
																				<tr class="text-start text-muted fw-bold fs-6 gs-0">
																					<th class="min-w-125px">Agent</th>
																					<th class="min-w-100px text-center">Opening<br>(Allowcated / Overall)</th>
																					<th class="min-w-100px text-center">Total Amount<br>(Allowcated)</th>
																					<th class="min-w-80px text-center">Chit Collection<br>(Count)</th>
																					<th class="min-w-80px text-center">Chit Collection<br>Amount</th>
																					<th class="min-w-100px text-center">Chit Balance<br>(Count)</th>
																					<th class="min-w-80px text-center">Chit Balance<br>Amount</th>
																					<th class="min-w-100px text-center">New Chit</th>
																				</tr>
																			</thead>
																			<!--end::Table head-->
																			<!--begin::Table body-->
																			<tbody>
																				<tr>
																					<td class="dash_loan">
																						<div class="d-flex mb-1">
																							<div class="d-flex align-items-center">
																								<div class="symbol symbol-35px me-2">
																									<img src="assets/Images/staff_1.png" alt="">
																								</div>
																							</div>
																							<div class="d-flex flex-column flex-grow-1">
																								<a href="#" class="fs-6 text-gray-800 fw-bold">Govarthan S</a>
																								<label class="text-primary fw-bold">AG-02496</label>
																							</div>
																						</div>
																					</td>
																					<td class="dash_loan text-center">
																						<div class="d-flex flex-column flex-grow-1 my-lg-0 my-2">
																							<label class="fw-bold fs-6">
																								<span class="text-primary">60</span>
																								<span class="text-dark me-1">/</span>
																								<span class="text-gray-400 me-1">80</span>
																							</label>
																						</div>
																					</td>
																					<td class="dash_loan text-end">
																						<label class="text-dark fw-bold fs-6">80,000.00</label>
																					</td>
																					<td class="text-center">
																						<label class="badge badge-success text-white fw-bold fs-6">20</label>
																					</td>
																					<td class="dash_loan text-end">
																						<label class="text-dark fw-bold fs-6">16,000.00</label>
																					</td>
																					<td class="text-center">
																						<label class="badge text-white fw-bold fs-6" style="background-color: red;">40</label>
																					</td>
																					<td class="dash_loan text-end">
																						<label class="text-dark fw-bold fs-6">80,000.00</label>
																					</td>
																					<td class="text-center">
																						<label class="text-primary fw-bold fs-6">05</label>
																					</td>
																				</tr>
																				<tr>
																					<td class="dash_loan">
																						<div class="d-flex mb-1">
																							<div class="d-flex align-items-center">
																								<div class="symbol symbol-35px me-2">
																									<img src="assets/Images/staff_2.png" alt="">
																								</div>
																							</div>
																							<div class="d-flex flex-column flex-grow-1">
																								<a href="#" class="fs-6 text-gray-800 fw-bold">Kumar N</a>
																								<label class="text-primary fw-bold">AG-02499</label>
																							</div>
																						</div>
																					</td>
																					<td class="dash_loan text-center">
																						<div class="d-flex flex-column flex-grow-1 my-lg-0 my-2">
																							<label class="fw-bold fs-6">
																								<span class="text-primary">60</span>
																								<span class="text-dark me-1">/</span>
																								<span class="text-gray-400 me-1">70</span>
																							</label>
																						</div>
																					</td>
																					<td class="dash_loan text-end">
																						<label class="text-dark fw-bold fs-6">70,000.00</label>
																					</td>
																					<td class="text-center">
																						<label class="badge badge-success text-white fw-bold fs-6">19</label>
																					</td>
																					<td class="dash_loan text-end">
																						<label class="text-dark fw-bold fs-6">14,000.00</label>
																					</td>
																					<td class="text-center">
																						<label class="badge text-white fw-bold fs-6" style="background-color: red;">41</label>
																					</td>
																					<td class="dash_loan text-end">
																						<label class="text-dark fw-bold fs-6">82,000.00</label>
																					</td>
																					<td class="text-center">
																						<label class="text-primary fw-bold fs-6">02</label>
																					</td>
																				</tr>
																				<tr>
																					<td class="dash_loan">
																						<div class="d-flex mb-1">
																							<div class="d-flex align-items-center">
																								<div class="symbol symbol-35px me-2">
																									<img src="assets/Images/staff_1.png" alt="">
																								</div>
																							</div>
																							<div class="d-flex flex-column flex-grow-1">
																								<a href="#" class="fs-6 text-gray-800 fw-bold">Shanmugam J</a>
																								<label class="text-primary fw-bold">AG-02497</label>
																							</div>
																						</div>
																					</td>
																					<td class="dash_loan text-center">
																						<div class="d-flex flex-column flex-grow-1 my-lg-0 my-2">
																							<label class="fw-bold fs-6">
																								<span class="text-primary">60</span>
																								<span class="text-dark me-1">/</span>
																								<span class="text-gray-400 me-1">90</span>
																							</label>
																						</div>
																					</td>
																					<td class="dash_loan text-end">
																						<label class="text-dark fw-bold fs-6">90,000.00</label>
																					</td>
																					<td class="text-center">
																						<label class="badge badge-success text-white fw-bold fs-6">30</label>
																					</td>
																					<td class="dash_loan text-end">
																						<label class="text-dark fw-bold fs-6">24,000.00</label>
																					</td>
																					<td class="text-center">
																						<label class="badge text-white fw-bold fs-6" style="background-color: red;">30</label>
																					</td>
																					<td class="dash_loan text-end">
																						<label class="text-dark fw-bold fs-6">66,000.00</label>
																					</td>
																					<td class="text-center">
																						<label class="text-primary fw-bold fs-6">04</label>
																					</td>
																				</tr>
																				<tr>
																					<td class="dash_loan">
																						<div class="d-flex mb-1">
																							<div class="d-flex align-items-center">
																								<div class="symbol symbol-35px me-2">
																									<img src="assets/Images/staff_2.png" alt="">
																								</div>
																							</div>
																							<div class="d-flex flex-column flex-grow-1">
																								<a href="#" class="fs-6 text-gray-800 fw-bold">Siva S</a>
																								<label class="text-primary fw-bold">AG-02498</label>
																							</div>
																						</div>
																					</td>
																					<td class="dash_loan text-center">
																						<div class="d-flex flex-column flex-grow-1 my-lg-0 my-2">
																							<label class="fw-bold fs-6">
																								<span class="text-primary">60</span>
																								<span class="text-dark me-1">/</span>
																								<span class="text-gray-400 me-1">80</span>
																							</label>
																						</div>
																					</td>
																					<td class="dash_loan text-end">
																						<label class="text-dark fw-bold fs-6">80,000.00</label>
																					</td>
																					<td class="text-center">
																						<label class="badge badge-success text-white fw-bold fs-6">15</label>
																					</td>
																					<td class="dash_loan text-end">
																						<label class="text-dark fw-bold fs-6">12,000.00</label>
																					</td>
																					<td class="text-center">
																						<label class="badge text-white fw-bold fs-6" style="background-color: red;">45</label>
																					</td>
																					<td class="dash_loan text-end">
																						<label class="text-dark fw-bold fs-6">68,000.00</label>
																					</td>
																					<td class="text-center">
																						<label class="text-primary fw-bold fs-6">01</label>
																					</td>
																				</tr>
																			</tbody>
																			<!--end::Table body-->
																		</table>
																	</div>
																</div>
																<!--end::Body-->
															</div>
															<!--end::Mixed Widget 5-->
														</div>
														<!--end::Col-->
													</div>
													<div class="row mt-1">
														<div class="col-xl-12">
															<div class="card card-body">
																<?php $i=0; foreach($monthly_collection as $wlist){ ?>
																	<input type="hidden" class="input_count_sale_monthly" name="monthly_collection[]" id="monthly_collection<?php echo $i; ?>" value="<?php echo $wlist; ?>" >
																<?php $i++; } ?>
																<div id="chit_daywise_collection"></div>
															</div>
														</div>
													</div>
												</div> 
											</div>
									  </div>
										<!--end::Card body-->
									<!-- </div> -->
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
		<script src="./assets/custom_js/highchart.js"></script>
		<!-- <script src="https://www.gstatic.com/charts/loader.js"></script> -->
		<!-- <script src="http://code.highcharts.com/highcharts.js"></script> -->
		<!-- <script type="text/javascript">
		      google.charts.load("current", {packages:["corechart"]});
		      google.charts.setOnLoadCallback(drawChart);
		      function drawChart() {
		        var data = google.visualization.arrayToDataTable([
		          ['Task', 'Hours per Day'],
		          ['AGB', 1200000],
		          ['AKN', 220000],
		          ['AGK', 150000],
		          ['AKP', 140000]
		        ]);

		        var options = {
		          title: 'My Daily Activities',
		          is3D: true,
		        };
				
		        var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
		        chart.draw(data, options);
		      }
	    </script> -->
	  <!-- Real Estate Weekly Purchase Property Start -->
		<!--<script type="text/javascript">
		var count=$('.input_count').length;
		weekly_purchase_report =[];
			 for(i=0;i<count;i++){
				var weekly_purchase=$('#weekly_purchase'+i).val();
				weekly_purchase_report[i]=weekly_purchase;
			 }
			//  alert(weekly_purchase_report);
			var options = {
		          series: [{
			        // name: 'AKP',
			        data: weekly_purchase_report
			    }],
				    yaxis: {
						  labels: {
						    formatter: function (value) {
						    	 var a = value.toLocaleString('en-IN', {
										    maximumFractionDigits: 2,
										    style: 'currency',
										    currency: 'INR'
										});
						    	return a;
						      // return value + "$";
						    }
						  },
						},
		          chart: {
		          type: 'area',
		          zoom: {
		            enabled: false
		          },
		        },
		        title: {
			        text: 'Weekly Purchase Property (<?php
															$monday = strtotime("last sunday");
															$monday = date('w', $monday)==date('w') ? $monday+7*86400 : $monday;
															$sunday = strtotime(date("d-m-Y",$monday)." +6 days");
															$this_week_start = date("d-m-Y",$monday);
															$this_week_end = date("d-m-Y",$sunday);
															echo "$this_week_start to $this_week_end ";
														 ?>)',
			        align: 'center',
			         fontWeight: 'bold',
			        style: {
			            fontSize: '18px',
			            
			          }
			    },
			    legend: {
		          position: 'bottom',
		          horizontalAlign: 'right',
		          fontSize: "16px"
		        },
		        dataLabels: {
		          enabled: false
		        },
		        stroke: {
		          curve: 'smooth'
		        },
		        xaxis: {
		          tooltip: {
				          enabled: false
				        },
				        labels: {
				          show: true,
				         },
		          categories: [ 'Sun','Mon', 'Tue', 'Wed', 'Thur', 'Fri', 'Sat']
		        }
		        };
				// Highcharts.setOptions({
				//     lang: {
				//       thousandsSep: ','
				//     }
				//   });
		        var chart = new ApexCharts(document.querySelector("#real_estate_chart_weekly_purchase_property"), options);
		        chart.render();
		</script> -->
		<!-- Real Estate Weekly Purchase Property End -->

		<!-- Real Estate Weekly Sales Property Start -->
		<!-- <script type="text/javascript">
     	var count=$('.input_count_sale').length;
		weekly_sale_report =[];
			 for(i=0;i<count;i++){
				var weekly_sale=$('#weekly_sale'+i).val();
				weekly_sale_report[i]=weekly_sale;
			 }
			
			var options = {
		          series: [{
			        // name: 'AKP',
			        data: weekly_sale_report
			    }],
			    yaxis: {
						  labels: {
						    formatter: function (value) {
						    	 var a = value.toLocaleString('en-IN', {
										    maximumFractionDigits: 2,
										    style: 'currency',
										    currency: 'INR'
										});
						    	return a;
						      // return value + "$";
						    }
						  },
						},
		          chart: {
		          type: 'area',
		          zoom: {
		            enabled: false
		          },
		        },
		        title: {
			        text: 'Weekly Sales Property (<?php
															$monday = strtotime("last sunday");
															$monday = date('w', $monday)==date('w') ? $monday+7*86400 : $monday;
															$sunday = strtotime(date("d-m-Y",$monday)." +6 days");
															$this_week_start = date("d-m-Y",$monday);
															$this_week_end = date("d-m-Y",$sunday);
															echo "$this_week_start to $this_week_end ";
														 ?>)',
			        align: 'center',
			         fontWeight: 'bold',
			        style: {
			            fontSize: '18px',
			            
			          }
			    },
			    legend: {
		          position: 'bottom',
		          horizontalAlign: 'right',
		          fontSize: "16px"
		        },
		        dataLabels: {
		          enabled: false
		        },
		        stroke: {
		          curve: 'smooth'
		        },
		        xaxis: {
		          tooltip: {
				          enabled: false
				        },
				        labels: {
				          show: true,
				         },
		          categories: ['Sun','Mon', 'Tue', 'Wed', 'Thur', 'Fri', 'Sat']
		        }
		        };
				// Highcharts.setOptions({
				//     lang: { 
				//       thousandsSep: ','
				//     }
				//   });
		        var chart = new ApexCharts(document.querySelector("#real_estate_chart_weekly_sales_property"), options);
		        chart.render();
		</script> -->
		<!-- Real Estate Weekly Sales Property End -->
		<!-- Real Estate Monthly Sales Property Start -->
	  <!-- <script>
	  var count=$('.input_count_sale_monthly').length;
		monthly_collection_report =[];
			 for(i=0;i<count;i++){
				var monthly_collection=$('#monthly_collection'+i).val();
				monthly_collection_report[i]=monthly_collection;
			 }
			//  alert(monthly_collection_report);
	  	var options = {
          series: [{
          data: monthly_collection_report
        }],
        yaxis: {
						  labels: {
						    formatter: function (value) {
						    	 var a = value.toLocaleString('en-IN', {
										    maximumFractionDigits: 2,
										    style: 'currency',
										    currency: 'INR'
										});
						    	return a;
						      // return value + "$";
						    }
						  },
						},
          chart: {
          height: 350,
          type: 'bar',
          events: {
            click: function(chart, w, e) {
              // console.log(chart, w, e)
            }
          }
        },
        title: {
			        text: 'Monthly Sales Property (<?php echo date("F");?>)',
			        align: 'center',
			         fontWeight: 'bold',
			        style: {
			            fontSize: '18px',
			            
			          }
			    },
        // colors: {colors},
        plotOptions: {
          bar: {
            columnWidth: '45%',
            distributed: true,
          }
        },
        dataLabels: {
          enabled: false
        },
        legend: {     //echo date("t", strtotime($a_date));
          show: false
        },
        xaxis: {
			<?php 
				$fdate=date('01-m-Y');
				$ldate=date('t-m-Y');
				$i=0;
				$cat="";
				for($currentDate = strtotime($fdate); $currentDate <= strtotime($ldate); 
				$currentDate += (86400))
				{
					if($i!=0){ $cat.=","; } else{ $cat.="";}
					$cat.="['".date('d',$currentDate)."','".date('D',$currentDate)."','".date('M',$currentDate)."']";
					$i++;
			}?>
		// $cat="['01','Sat','Jul'],['02','Sun','Jul']";
				//$cat="['01','Sat','Jul'],['02','Sun','Jul'],['03','Mon','Jul'],['04','Tue','Jul'],['05','Wed','Jul'],['06','Thu','Jul'],['07','Fri','Jul'],['08','Sat','Jul'],['09','Sun','Jul'],['10','Mon','Jul'],['11','Tue','Jul'],['12','Wed','Jul'],['13','Thu','Jul'],['14','Fri','Jul'],['15','Sat','Jul'],['16','Sun','Jul'],['17','Mon','Jul'],['18','Tue','Jul'],['19','Wed','Jul'],['20','Thu','Jul'],['21','Fri','Jul'],['22','Sat','Jul'],['23','Sun','Jul'],['24','Mon','Jul'],['25','Tue','Jul'],['26','Wed','Jul'],['27','Thu','Jul'],['28','Fri','Jul'],['29','Sat','Jul'],['30','Sun','Jul'],['31','Mon','Jul']"; 
          categories: [
            // ['John', 'Doe'],
            <?php echo $cat; ?>
            ],
          labels: {
            style: {
              // colors: colors,
              fontSize: '12px'
            }
          }
        }
        };

        var chart = new ApexCharts(document.querySelector("#real_estate_chart_monthly_collections_property"), options);
        chart.render();
	  </script> -->
	  <!-- Real Estate Weekly Collection End -->
	    <!-- Chit Monthly Sales Property Start -->
	  <script>
	  	var count=$('.input_count').length;
		weekly_collection_report =[];
			 for(i=0;i<count;i++){
				var weekly_collection=$('#weekly_collection'+i).val();
				weekly_collection_report[i]=weekly_collection;
			 }
	  	var options = {
          series: [{
        	 data: weekly_collection_report
        }],
        yaxis: {
						  labels: {
						    formatter: function (value) {
						    	 var a = value.toLocaleString('en-IN', {
										    maximumFractionDigits: 2,
										    style: 'currency',
										    currency: 'INR'
										});
						    	return a;
						      // return value + "$";
						    }
						  },
						},
          chart: {
          height: 300,
          type: 'bar',
          events: {
            click: function(chart, w, e) {
              // console.log(chart, w, e)
            }
          }
        },
        title: {
			        text: 'Weekly Chit Collection (<?php
													$monday = strtotime("last sunday");
													$monday = date('w', $monday)==date('w') ? $monday+7*86400 : $monday;
													$sunday = strtotime(date("d-m-Y",$monday)." +6 days");
													$this_week_start = date("d-m-Y",$monday);
													$this_week_end = date("d-m-Y",$sunday);
													echo "$this_week_start to $this_week_end ";
												 ?>)',
			        align: 'center',
			         fontWeight: 'bold',
			        style: {
			            fontSize: '18px',
			            
			          }
			    },
        // colors: {colors},
        plotOptions: {
          bar: {
            columnWidth: '45%',
            distributed: true,
          }
        },
        dataLabels: {
          enabled: false
        },
        legend: {
          show: false
        },
        xaxis: {
          categories: [
            // ['John', 'Doe'],
            'Mon','Tue','Wed','Thur','Fri','Sat','Sun',],
          labels: {
            style: {
              // colors: colors,
              fontSize: '12px'
            }
          }
        }
        };

        var chart = new ApexCharts(document.querySelector("#chit_weekly_collection"), options);
        chart.render();
	  </script>
	  <!-- Chit Weekly Collection End -->
	   <!-- Chit Weekly Collection Start -->
	  <script>
	  	 var count=$('.input_count_sale_monthly').length;
			monthly_collection_report =[];
				 for(i=0;i<count;i++){
					var monthly_collection=$('#monthly_collection'+i).val();
					monthly_collection_report[i]=monthly_collection;
				 }
				//  alert(monthly_collection_report);
		  	var options = {
	          series: [{
	          data: monthly_collection_report
	        }],
        yaxis: {
						  labels: {
						    formatter: function (value) {
						    	 var a = value.toLocaleString('en-IN', {
										    maximumFractionDigits: 2,
										    style: 'currency',
										    currency: 'INR'
										});
						    	return a;
						      // return value + "$";
						    }
						  },
						},
          chart: {
          height: 350,
          type: 'bar',
          events: {
            click: function(chart, w, e) {
              // console.log(chart, w, e)
            }
          }
        },
        title: {
			        text: 'Monthly Chit Collection (<?php echo date("F");?>)',
			        align: 'center',
			         fontWeight: 'bold',
			        style: {
			            fontSize: '18px',
			            
			          }
			    },
        // colors: {colors},
        plotOptions: {
          bar: {
            columnWidth: '45%',
            distributed: true,
          }
        },
        dataLabels: {
          enabled: false
        },
        legend: {     //echo date("t", strtotime($a_date));
          show: false
        },
        xaxis: {
          <?php 
				$fdate=date('01-m-Y');
				$ldate=date('t-m-Y');
				$i=0;
				$cat="";
				for($currentDate = strtotime($fdate); $currentDate <= strtotime($ldate); 
				$currentDate += (86400))
				{
					if($i!=0){ $cat.=","; } else{ $cat.="";}
					$cat.="['".date('d',$currentDate)."','".date('D',$currentDate)."','".date('M',$currentDate)."']";
					$i++;
			}?>
          categories: [
            // ['John', 'Doe'],
            <?php echo $cat; ?>
            ],
          labels: {
            style: {
              // colors: colors,
              fontSize: '12px'
            }
          }
        }
        };

        var chart = new ApexCharts(document.querySelector("#chit_daywise_collection"), options);
        chart.render();
	  </script>
	  <!-- Chit Weekly Collection End -->
	    <!-- New Loan Chart Start -->
		<script>
			Highcharts.chart('chart_loan', {
			    chart: {
			        plotBackgroundColor: null,
			        plotBorderWidth: null,
			        plotShadow: 'false',
			        type: 'pie'
			    },
			    title: {
			        // text: 'Loan',
			        text: '',
			        align: 'center'
			    },
			    tooltip: {
			    	style: {
			            // color: 'blue',
			            fontSize:'15px'
			        },
			    	pointFormat: '<b>{series.name}</b>: {point.y}'
			        // pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
			    },
			    credits: {
					    enabled: false
					},
			    plotOptions: {
			        pie: {
			            allowPointSelect: true,
			            cursor: 'pointer',
			            innerSize: '30%',
			            size: 180,
			            dataLabels: {
			            	style: {
			                    fontSize: '12'  
			                },
			                enabled: true,
			                format: '<b>{point.name}</b>: {point.y}'
			                // format: '<b>{point.name}</b>: {point.y:.1f} %'
			            }
			        }
			    },
			    series: [{
			        name: 'Loan',
			        colorByPoint: true,
			        data: [{
			            name: 'AGB',
			            y: 1200000
			            // sliced: true,
			            // selected: true
			        }, {
			            name: 'AGN',
			            y: 220000
			        },  {
			            name: 'AGK',
			            y: 150000
			        }, {
			            name: 'AKP',
			            y: 140000
			        }]
			    }]
			});
		</script>
		<!-- New Loan Chart End -->
		<!-- New Receipts Chart Start -->
		<script>
			Highcharts.chart('chart_receipts', {
			    chart: {
			        plotBackgroundColor: null,
			        plotBorderWidth: null,
			        plotShadow: 'false',
			        type: 'pie'
			    },
			    title: {
			        // text: 'Receipts',
			        // align: 'center'
			        text: '',
			        align: 'center'
			    },
			    tooltip: {
			    	style: {
			            // color: 'blue',
			            fontSize:'15px'
			        },
			    	pointFormat: '<b>{series.name}</b>: {point.y}'
			        // pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
			    },
			    credits: {
					    enabled: false
					},
			    plotOptions: {
			        pie: {
			            allowPointSelect: true,
			            cursor: 'pointer',
			            innerSize: '30%',
			            size: 180,
			            dataLabels: {
			            	style: {
			                    fontSize: '12'  
			                },
			                enabled: true,
			                format: '<b>{point.name}</b>: {point.y}'
			                // format: '<b>{point.name}</b>: {point.y:.1f} %'
			            }
			        }
			    },
			    series: [{
			        name: 'Receipts',
			        colorByPoint: true,
			        data: [{
			            name: 'AGB',
			            y: 50000
			            // sliced: true,
			            // selected: true
			        }, {
			            name: 'AGN',
			            y: 80000
			        },  {
			            name: 'AGK',
			            y: 60000
			        }, {
			            name: 'AKP',
			            y: 40000
			        }]
			    }]
			});

			// $(function() {
			//     var chart = new Highcharts.Chart({
			//         chart: {
			//             renderTo: 'chart_receipts',
			//             type: 'pie'
			//         },
			//         credits: {
			// 		    enabled: false
			// 		},
			//         plotOptions: {
			//             pie: {
			//                  innerSize: '30%'
			//             }
			//         },
			//         title: {
			//             text: 'Receipts'
			//         },
			//         series: [{
			//             data: [
			//                 ['AGB', 50000],
			// 	          	['AGN', 80000],
			// 	          	['AGK', 60000],
			// 	          	['AKP', 40000]
			//                 ]}]
			//     });
			// });
		</script>
		<!-- New Receipts Chart end -->
		<!-- New Redemption Chart Start -->
		<script>
			Highcharts.chart('chart_redemption', {
			    chart: {
			        plotBackgroundColor: null,
			        plotBorderWidth: null,
			        plotShadow: 'false',
			        type: 'pie'
			    },
			    title: {
			        // text: 'Redemption',
			        // align: 'center'
			        text: '',
			        align: 'center'
			    },
			    tooltip: {
			    	style: {
			            // color: 'blue',
			            fontSize:'15px'
			        },
			    	pointFormat: '<b>{series.name}</b>: {point.y}'
			        // pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
			    },
			    credits: {
					    enabled: false
					},
			    plotOptions: {
			        pie: {
			            allowPointSelect: true,
			            cursor: 'pointer',
			            innerSize: '30%',
			            size: 180,
			            dataLabels: {
			            	style: {
			                    fontSize: '12'  
			                },
			                enabled: true,
			                format: '<b>{point.name}</b>: {point.y}'
			                // format: '<b>{point.name}</b>: {point.y:.1f} %'
			            }
			        }
			    },
			    series: [{
			        name: 'Redemption',
			        colorByPoint: true,
			        data: [{
			            name: 'AGB',
			            y: 30000
			            // sliced: true,
			            // selected: true
			        }, {
			            name: 'AGN',
			            y: 40000
			        },  {
			            name: 'AGK',
			            y: 35000
			        }, {
			            name: 'AKP',
			            y: 20000
			        }]
			    }]
			});
		</script>
		<!-- New Redemption Chart end -->
		<!-- New Company Close Chart Start -->
		<script>
			Highcharts.chart('chart_company_close', {
			    chart: {
			        plotBackgroundColor: null,
			        plotBorderWidth: null,
			        plotShadow: 'false',
			        type: 'pie'
			    },
			    title: {
			        // text: 'Company Close',
			        // align: 'center'
			        text: '',
			        align: 'center'
			    },
			    tooltip: {
			    	style: {
			            // color: 'blue',
			            fontSize:'15px'
			        },
			    	pointFormat: '<b>{series.name}</b>: {point.y}'
			        // pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
			    },
			    credits: {
					    enabled: false
					},
			    plotOptions: {
			        pie: {
			            allowPointSelect: true,
			            cursor: 'pointer',
			            innerSize: '30%',
			            size: 180,
			            dataLabels: {
			            	style: {
			                    fontSize: '12'  
			                },
			                enabled: true,
			                format: '<b>{point.name}</b>: {point.y}'
			                // format: '<b>{point.name}</b>: {point.y:.1f} %'
			            }
			        }
			    },
			    series: [{
			        name: 'Company Close',
			        colorByPoint: true,
			        data: [{
			            name: 'AGB',
			            y: 1200000
			            // sliced: true,
			            // selected: true
			        }, {
			            name: 'AGN',
			            y: 220000
			        },  {
			            name: 'AGK',
			            y: 150000
			        }, {
			            name: 'AKP',
			            y: 140000
			        }]
			    }]
			});
		</script>
		<!-- New Company Close Chart end -->
		<!-- New Party Chart Start -->
		<script>
			Highcharts.chart('chart_party', {
			    chart: {
			        plotBackgroundColor: null,
			        plotBorderWidth: null,
			        plotShadow: 'false',
			        type: 'pie'
			    },
			    title: {
			        // text: 'Party',
			        // align: 'center'
			        text: '',
			        align: 'center'
			    },
			    tooltip: {
			    	style: {
			            // color: 'blue',
			            fontSize:'15px'
			        },
			    	pointFormat: '<b>{series.name}</b>: {point.y}'
			        // pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
			    },
			    credits: {
					    enabled: false
					},
			    plotOptions: {
			        pie: {
			            allowPointSelect: true,
			            cursor: 'pointer',
			            innerSize: '30%',
			            size: 180,
			            dataLabels: {
			            	style: {
			                    fontSize: '12'  
			                },
			                enabled: true,
			                format: '<b>{point.name}</b>: {point.y}'
			                // format: '<b>{point.name}</b>: {point.y:.1f} %'
			            }
			        }
			    },
			    series: [{
			        name: 'Party',
			        colorByPoint: true,
			        data: [{
			            name: 'AGB',
			            y: 5
			            // sliced: true,
			            // selected: true
			        }, {
			            name: 'AGN',
			            y: 8
			        },  {
			            name: 'AGK',
			            y: 6
			        }, {
			            name: 'AKP',
			            y: 4
			        }]
			    }]
			});
		</script>
		<!-- New Party Chart end -->
		<!-- New Repledge Chart Start -->
		<script>
			Highcharts.chart('chart_repledge', {
			    chart: {
			        plotBackgroundColor: null,
			        plotBorderWidth: null,
			        plotShadow: 'false',
			        type: 'pie'
			    },
			    title: {
			        // text: 'Repledge',
			        // align: 'center'
			        text: '',
			        align: 'center'
			    },
			    tooltip: {
			    	style: {
			            // color: 'blue',
			            fontSize:'15px'
			        },
			    	pointFormat: '<b>{series.name}</b>: {point.y}'
			        // pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
			    },
			    credits: {
					    enabled: false
					},
			    plotOptions: {
			        pie: {
			            allowPointSelect: true,
			            cursor: 'pointer',
			            innerSize: '30%',
			            size: 180,
			            dataLabels: {
			            	style: {
			                    fontSize: '12'  
			                },
			                enabled: true,
			                format: '<b>{point.name}</b>: {point.y}'
			                // format: '<b>{point.name}</b>: {point.y:.1f} %'
			            }
			        }
			    },
			    series: [{
			        name: 'Repledge',
			        colorByPoint: true,
			        data: [{
			            name: 'AGB',
			            y: 10
			            // sliced: true,
			            // selected: true
			        }, {
			            name: 'AGN',
			            y: 7
			        },  {
			            name: 'AGK',
			            y: 6
			        }, {
			            name: 'AKP',
			            y: 2
			        }]
			    }]
			});
		</script>
		<!-- New Repledge Chart end -->
		<!-- Weekly Loan Summary Start -->
		<script type="text/javascript">
			var options = {
		          series: [{
			        name: 'AGB',
			        data: [43934, 48656, 65165, 81827, 112143, 142383,
			            171533]
			    }, {
			        name: 'AGN',
			        data: [24916, 37941, 29742, 29851, 32490, 30282,
			            38121]
			    }, {
			        name: 'AGK',
			        data: [11744, 30000, 16005, 19771, 20185, 24377,
			            32147]
			    }, {
			        name: 'AKP',
			        data: [21908, 5548, 8105, 11248, 8989, 11816, 18274]
			    }],
			    yaxis: {
						  labels: {
						    formatter: function (value) {
						    	 var a = value.toLocaleString('en-IN', {
										    maximumFractionDigits: 2,
										    style: 'currency',
										    currency: 'INR'
										});
						    	return a;
						      // return value + "$";
						    }
						  },
						},
		          chart: {
		          type: 'area',
		          zoom: {
		            enabled: false
		          },
		        },
		        title: {
			        text: 'Weekly Loan Summary (<?php
															$monday = strtotime("last sunday");
															$monday = date('w', $monday)==date('w') ? $monday+7*86400 : $monday;
															$sunday = strtotime(date("d-m-Y",$monday)." +6 days");
															$this_week_start = date("d-m-Y",$monday);
															$this_week_end = date("d-m-Y",$sunday);
															echo "$this_week_start to $this_week_end ";
														 ?>)',
			        align: 'center',
			         fontWeight: 'bold',
			        style: {
			            fontSize: '18px',
			            
			          }
			    },
			    legend: {
		          position: 'bottom',
		          horizontalAlign: 'right',
		          fontSize: "16px"
		        },
		        dataLabels: {
		          enabled: false
		        },
		        stroke: {
		          curve: 'smooth'
		        },
		        xaxis: {
		          tooltip: {
				          enabled: false
				        },
				        labels: {
				          show: true,
				         },
		          // categories: ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday']
		          categories: ['Mon', 'Tue', 'Wed', 'Thur', 'Fri', 'Sat', 'Sun']
		        }
		        };

		        var chart = new ApexCharts(document.querySelector("#chart_weekly_loan_summary"), options);
		        chart.render();
		</script>
		<!-- Weekly Loan Summary End -->
		<!-- Weekly Redeem Summary Start -->
		<script type="text/javascript">
			var options = {
		          series: [{
			        name: 'AGB',
			        data: [21908, 5548, 36254, 8989, 18274, 21563,
			            74526]
			    }, {
			        name: 'AGN',
			        data: [24916, 19771, 29742, 29851, 20185, 30282,
			            38121]
			    }, {
			        name: 'AGK',
			        data: [11744, 37941, 16005, 19771, 20185, 32490,
			            32147]
			    }, {
			        name: 'AKP',
			        data: [21908, 5548, 8105, 11248, 8989, 11816, 18274]
			    }],
			    yaxis: {
						  labels: {
						    formatter: function (value) {
						    	 var a = value.toLocaleString('en-IN', {
										    maximumFractionDigits: 2,
										    style: 'currency',
										    currency: 'INR'
										});
						    	return a;
						      // return value + "$";
						    }
						  },
						},
		          chart: {
		          type: 'area',
		          zoom: {
		            enabled: false
		          },
		        },
		        title: {
			        text: 'Weekly Redeem Summary (<?php
															$monday = strtotime("last sunday");
															$monday = date('w', $monday)==date('w') ? $monday+7*86400 : $monday;
															$sunday = strtotime(date("d-m-Y",$monday)." +6 days");
															$this_week_start = date("d-m-Y",$monday);
															$this_week_end = date("d-m-Y",$sunday);
															echo "$this_week_start to $this_week_end ";
														 ?>)',
			        align: 'center',
			         fontWeight: 'bold',
			        style: {
			            fontSize: '18px',
			            
			          }
			    },
			    legend: {
		          position: 'bottom',
		          horizontalAlign: 'right',
		          fontSize: "16px"
		        },
		        dataLabels: {
		          enabled: false
		        },
		        stroke: {
		          curve: 'smooth'
		        },
		        xaxis: {
		          tooltip: {
				          enabled: false
				        },
				        labels: {
				          show: true,
				         },
		          categories: ['Mon', 'Tue', 'Wed', 'Thur', 'Fri', 'Sat', 'Sun']
		        }
		        };

		        var chart = new ApexCharts(document.querySelector("#chart_weekly_redeem_summary"), options);
		        chart.render();

			// Highcharts.chart('chart_weekly_redeem_summary', {

			// 	chart: {
			//         backgroundColor: {
			//             linearGradient: [0, 0, 500, 500],
			//             stops: [
			//                 [0, 'rgb(255,238,216,1)'],
			//                 [1, 'rgb(255,237,215,1)'],
			//                 [2, 'rgb(255,191,105,1)']
			//             ]
			//         },
			//         type: 'area',
			//         style: {
			// 	        fontSize: "18px",
			// 	        }
			//     },
			//     stroke: {
		 //          curve: 'smooth'
		 //        },
			//     title: {
			//         text: 'Weekly Redeem Summary',
			//         align: 'center'
			//     },
			//     tooltip: {
			//     	style: {
			//             // color: 'blue',
			//             fontSize:'16px'
			//         },
			//     },
			//     credits: {
			// 		    enabled: false
			// 		},
			//     xAxis: {
			//         categories: ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'],
			//         labels: {
			//             style: {
			//                 fontSize:'12px'
			//             }
			//         }
			//     },

			//     legend: {
			//         layout: 'horizontal',
			//         align: 'right',
			//         verticalAlign: 'bottom'
			//     },

			//     plotOptions: {
			//         series: {
			//             label: {
			//                 connectorAllowed: false
			//             }
			//         }
			//     },

			//     series: [{
			//         name: 'AGB',
			//         data: [21908, 5548, 36254, 8989, 18274, 21563,
			//             74526]
			//     }, {
			//         name: 'AGN',
			//         data: [24916, 19771, 29742, 29851, 20185, 30282,
			//             38121]
			//     }, {
			//         name: 'AGK',
			//         data: [11744, 37941, 16005, 19771, 20185, 32490,
			//             32147]
			//     }, {
			//         name: 'AKP',
			//         data: [21908, 5548, 8105, 11248, 8989, 11816, 18274]
			//     }],

			//     responsive: {
			//         rules: [{
			//             condition: {
			//                 maxWidth: 500
			//             },
			//             chartOptions: {
			//                 legend: {
			//                     layout: 'horizontal',
			//                     align: 'center',
			//                     verticalAlign: 'bottom'
			//                 }
			//             }
			//         }]
			//     }

			// });
		</script>
		<!-- Weekly Redeem Summary End -->
		<!-- Jewellery Gold & Silver Fluctuation Start -->
		<script type="text/javascript">
			var options = {
		          series: [{
			        name: 'Gold',
			        data: [5545.00, 5545.00, 5535.00, 5505.00, 0.00, 0.00,0.00]
			    },{
			        name: 'Silver',
			        data: [78.80, 79.00, 78.60, 76.50, 0.00, 0.00, 0.00]
			    }],
			    yaxis: {
						  labels: {
						    formatter: function (value) {
						    	 var a = value.toLocaleString('en-IN', {
										    maximumFractionDigits: 2,
										    style: 'currency',
										    currency: 'INR'
										});
						    	return a;
						      // return value + "$";
						    }
						  },
						},
		          chart: {
		          type: 'area',
		          zoom: {
		            enabled: false
		          },
		        },
		        title: {
			        text: 'Weekly Rate Fluctuation (<?php
															$monday = strtotime("last sunday");
															$monday = date('w', $monday)==date('w') ? $monday+7*86400 : $monday;
															$sunday = strtotime(date("d-m-Y",$monday)." +6 days");
															$this_week_start = date("d-m-Y",$monday);
															$this_week_end = date("d-m-Y",$sunday);
															echo "$this_week_start to $this_week_end ";
														 ?>)',
			        align: 'center',
			         fontWeight: 'bold',
			        style: {
			            fontSize: '18px',
			            
			          }
			    },
			    legend: {
		          position: 'bottom',
		          horizontalAlign: 'right',
		          fontSize: "16px"
		        },
		        dataLabels: {
		          enabled: false
		        },
		        stroke: {
		          curve: 'smooth'
		        },
		        xaxis: {
		          tooltip: {
				          enabled: false
				        },
				        labels: {
				          show: true,
				         },
		          // categories: ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday']
		          categories: ['Mon', 'Tue', 'Wed', 'Thur', 'Fri', 'Sat', 'Sun']
		        }
		        };

		        var chart = new ApexCharts(document.querySelector("#jewellery_gold_silver_fluctuation"), options);
		        chart.render();
		</script>
		<!-- Jewellery Gold & Silver Fluctuation End -->
		<!-- Jewellery Weekly Sales Start -->
		<script type="text/javascript">
			var options = {
		          series: [{
			        // name: 'AKP',
			        data: [92000, 175000, 135000, 100000, 0, 0, 0]
			    }],
			    yaxis: {
						  labels: {
						    formatter: function (value) {
						    	 var a = value.toLocaleString('en-IN', {
										    maximumFractionDigits: 2,
										    style: 'currency',
										    currency: 'INR'
										});
						    	return a;
						      // return value + "$";
						    }
						  },
						},
		          chart: {
		          type: 'area',
		          zoom: {
		            enabled: false
		          },
		        },
		        title: {
			        text: 'Weekly Sales Summary (<?php
															$monday = strtotime("last sunday");
															$monday = date('w', $monday)==date('w') ? $monday+7*86400 : $monday;
															$sunday = strtotime(date("d-m-Y",$monday)." +6 days");
															$this_week_start = date("d-m-Y",$monday);
															$this_week_end = date("d-m-Y",$sunday);
															echo "$this_week_start to $this_week_end ";
														 ?>)',
			        align: 'center',
			         fontWeight: 'bold',
			        style: {
			            fontSize: '18px',
			            
			          }
			    },
			    legend: {
		          position: 'bottom',
		          horizontalAlign: 'right',
		          fontSize: "16px"
		        },
		        dataLabels: {
		          enabled: false
		        },
		        stroke: {
		          curve: 'smooth'
		        },
		        xaxis: {
		          tooltip: {
				          enabled: false
				        },
				        labels: {
				          show: true,
				         },
		          categories: ['Mon', 'Tue', 'Wed', 'Thur', 'Fri', 'Sat', 'Sun']
		        }
		        };
				Highcharts.setOptions({
				    lang: {
				      thousandsSep: ','
				    }
				  });

		        var chart = new ApexCharts(document.querySelector("#jewellery_chart_weekly_sales"), options);
		        chart.render();

			// Highcharts.chart('chart_weekly_redeem_summary', {

			// 	chart: {
			//         backgroundColor: {
			//             linearGradient: [0, 0, 500, 500],
			//             stops: [
			//                 [0, 'rgb(255,238,216,1)'],
			//                 [1, 'rgb(255,237,215,1)'],
			//                 [2, 'rgb(255,191,105,1)']
			//             ]
			//         },
			//         type: 'area',
			//         style: {
			// 	        fontSize: "18px",
			// 	        }
			//     },
			//     stroke: {
		 //          curve: 'smooth'
		 //        },
			//     title: {
			//         text: 'Weekly Redeem Summary',
			//         align: 'center'
			//     },
			//     tooltip: {
			//     	style: {
			//             // color: 'blue',
			//             fontSize:'16px'
			//         },
			//     },
			//     credits: {
			// 		    enabled: false
			// 		},
			//     xAxis: {
			//         categories: ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'],
			//         labels: {
			//             style: {
			//                 fontSize:'12px'
			//             }
			//         }
			//     },

			//     legend: {
			//         layout: 'horizontal',
			//         align: 'right',
			//         verticalAlign: 'bottom'
			//     },

			//     plotOptions: {
			//         series: {
			//             label: {
			//                 connectorAllowed: false
			//             }
			//         }
			//     },

			//     series: [{
			//         name: 'AGB',
			//         data: [21908, 5548, 36254, 8989, 18274, 21563,
			//             74526]
			//     }, {
			//         name: 'AGN',
			//         data: [24916, 19771, 29742, 29851, 20185, 30282,
			//             38121]
			//     }, {
			//         name: 'AGK',
			//         data: [11744, 37941, 16005, 19771, 20185, 32490,
			//             32147]
			//     }, {
			//         name: 'AKP',
			//         data: [21908, 5548, 8105, 11248, 8989, 11816, 18274]
			//     }],

			//     responsive: {
			//         rules: [{
			//             condition: {
			//                 maxWidth: 500
			//             },
			//             chartOptions: {
			//                 legend: {
			//                     layout: 'horizontal',
			//                     align: 'center',
			//                     verticalAlign: 'bottom'
			//                 }
			//             }
			//         }]
			//     }

			// });
		</script>
		<!-- Jewellery Weekly Sales End -->
		<script>
			// $("#bj_loan").DataTable({
			// 	// "ordering": false,
			// 	"aaSorting":[],
			// 	 "language": {
			// 	  "lengthMenu": "Show _MENU_",
			// 	 },
			// 	 "dom":
			// 	  "<'row'" +
			// 	  // "<'col-sm-6 d-flex align-items-center justify-conten-start'l>" +
			// 	  // "<'col-sm-6 d-flex align-items-center justify-content-end'f>" +
			// 	  ">" +

			// 	  "<'table-responsive'tr>" +

			// 	  "<'row'" +
			// 	  // "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
			// 	  // "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
			// 	  ">"
			// 	});
			$('#bj_loan').wrap('<div class="dataTables_scroll" />');
		</script>
		<script>
			// $("#jst_loan").DataTable({
			// 	// "ordering": false,
			// 	"aaSorting":[],
			// 	 "language": {
			// 	  "lengthMenu": "Show _MENU_",
			// 	 },
			// 	 "dom":
			// 	  "<'row'" +
			// 	  // "<'col-sm-6 d-flex align-items-center justify-conten-start'l>" +
			// 	  // "<'col-sm-6 d-flex align-items-center justify-content-end'f>" +
			// 	  ">" +

			// 	  "<'table-responsive'tr>" +

			// 	  "<'row'" +
			// 	  // "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
			// 	  // "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
			// 	  ">"
			// 	});
			$('#jst_loan').wrap('<div class="dataTables_scroll_jst" />');
		</script>
		<script>
			// $("#last_attd_loan").DataTable({
			// 	// "ordering": false,
			// 	"aaSorting":[],
			// 	 "language": {
			// 	  "lengthMenu": "Show _MENU_",
			// 	 },
			// 	 "dom":
			// 	  "<'row'" +
			// 	  // "<'col-sm-6 d-flex align-items-center justify-conten-start'l>" +
			// 	  // "<'col-sm-6 d-flex align-items-center justify-content-end'f>" +
			// 	  ">" +

			// 	  "<'table-responsive'tr>" +

			// 	  "<'row'" +
			// 	  // "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
			// 	  // "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
			// 	  ">"
			// 	});
			$('#last_attd_loan').wrap('<div class="dataTables_scroll" />');
		</script>
		<script>
			// $("#cash_in_hand_cmy").DataTable({
			// 	// "ordering": false,
			// 	"aaSorting":[],
			// 	 "language": {
			// 	  "lengthMenu": "Show _MENU_",
			// 	 },
			// 	 "dom":
			// 	  "<'row'" +
			// 	  // "<'col-sm-6 d-flex align-items-center justify-conten-start'l>" +
			// 	  // "<'col-sm-6 d-flex align-items-center justify-content-end'f>" +
			// 	  ">" +

			// 	  "<'table-responsive'tr>" +

			// 	  "<'row'" +
			// 	  // "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
			// 	  // "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
			// 	  ">"
			// 	});
			$('#cash_in_hand_cmy').wrap('<div class="dataTables_scroll_cash_in_hand" />');
		</script>
		<script>
			// $("#payments_mode").DataTable({
			// 	// "ordering": false,
			// 	"aaSorting":[],
			// 	 "language": {
			// 	  "lengthMenu": "Show _MENU_",
			// 	 },
			// 	 "dom":
			// 	  "<'row'" +
			// 	  // "<'col-sm-6 d-flex align-items-center justify-conten-start'l>" +
			// 	  // "<'col-sm-6 d-flex align-items-center justify-content-end'f>" +
			// 	  ">" +

			// 	  "<'table-responsive'tr>" +

			// 	  "<'row'" +
			// 	  // "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
			// 	  // "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
			// 	  ">"
			// 	});
			$('#payments_mode').wrap('<div class="dataTables_scroll_payments_mode" />');
		</script>
		<script>
			// $("#highest_amt_party").DataTable({
			// 	// "ordering": false,
			// 	"aaSorting":[],
			// 	 "language": {
			// 	  "lengthMenu": "Show _MENU_",
			// 	 },
			// 	 "dom":
			// 	  "<'row'" +
			// 	  // "<'col-sm-6 d-flex align-items-center justify-conten-start'l>" +
			// 	  // "<'col-sm-6 d-flex align-items-center justify-content-end'f>" +
			// 	  ">" +

			// 	  "<'table-responsive'tr>" +

			// 	  "<'row'" +
			// 	  // "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
			// 	  // "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
			// 	  ">"
			// 	});
			$('#highest_amt_party').wrap('<div class="dataTables_scroll_highest" />');
		</script>
		<script>
			// $("#membership_card_issue").DataTable({
			// 	// "ordering": false,
			// 	"aaSorting":[],
			// 	 "language": {
			// 	  "lengthMenu": "Show _MENU_",
			// 	 },
			// 	 "dom":
			// 	  "<'row'" +
			// 	  // "<'col-sm-6 d-flex align-items-center justify-conten-start'l>" +
			// 	  // "<'col-sm-6 d-flex align-items-center justify-content-end'f>" +
			// 	  ">" +

			// 	  "<'table-responsive'tr>" +

			// 	  "<'row'" +
			// 	  // "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
			// 	  // "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
			// 	  ">"
			// 	});
			$('#membership_card_issue').wrap('<div class="dataTables_scroll_highest" />');
		</script>
		<script>
			// $("#jewellery_delivered").DataTable({
			// 	// "ordering": false,
			// 	"aaSorting":[],
			// 	 "language": {
			// 	  "lengthMenu": "Show _MENU_",
			// 	 },
			// 	 "dom":
			// 	  "<'row'" +
			// 	  // "<'col-sm-6 d-flex align-items-center justify-conten-start'l>" +
			// 	  // "<'col-sm-6 d-flex align-items-center justify-content-end'f>" +
			// 	  ">" +

			// 	  "<'table-responsive'tr>" +

			// 	  "<'row'" +
			// 	  // "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
			// 	  // "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
			// 	  ">"
			// 	});
			$('#jewellery_delivered').wrap('<div class="dataTables_jewellery_delivered" />');
		</script>
		<script>
			// $("#jewellery_pending").DataTable({
			// 	// "ordering": false,
			// 	"aaSorting":[],
			// 	 "language": {
			// 	  "lengthMenu": "Show _MENU_",
			// 	 },
			// 	 "dom":
			// 	  "<'row'" +
			// 	  // "<'col-sm-6 d-flex align-items-center justify-conten-start'l>" +
			// 	  // "<'col-sm-6 d-flex align-items-center justify-content-end'f>" +
			// 	  ">" +

			// 	  "<'table-responsive'tr>" +

			// 	  "<'row'" +
			// 	  // "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
			// 	  // "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
			// 	  ">"
			// 	});
			$('#jewellery_pending').wrap('<div class="dataTables_jewellery_delivered" />');
		</script>
		<script>
			$("#jewellery_tms_collection").DataTable({
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
				  // "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
				  // "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
				  ">"
				});
			// $('#jewellery_tms_collection').wrap('<div class="dataTables_jewellery_delivered" />');
		</script>
		<script>
			$("#jewellery_tms_new_collection").DataTable({
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
				  // "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
				  // "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
				  ">"
				});
			// $('#jewellery_tms_new_collection').wrap('<div class="dataTables_jewellery_delivered" />');
		</script>
		<script>
			$("#jewellery_ogp").DataTable({
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
				  // "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
				  // "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
				  ">"
				});
			// $('#jewellery_ogp').wrap('<div class="dataTables_jewellery_delivered" />');
		</script>
		<script>
			// $("#jewellery_credit_reminder").DataTable({
			// 	// "ordering": false,
			// 	"aaSorting":[],
			// 	 "language": {
			// 	  "lengthMenu": "Show _MENU_",
			// 	 },
			// 	 "dom":
			// 	  "<'row'" +
			// 	  // "<'col-sm-6 d-flex align-items-center justify-conten-start'l>" +
			// 	  // "<'col-sm-6 d-flex align-items-center justify-content-end'f>" +
			// 	  ">" +

			// 	  "<'table-responsive'tr>" +

			// 	  "<'row'" +
			// 	  // "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
			// 	  // "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
			// 	  ">"
			// 	});
			 $('#jewellery_credit_reminder').wrap('<div class="dataTables_jewellery_delivered" />');
		</script>
		<script>
			// $("#jewellery_jst").DataTable({
			// 	// "ordering": false,
			// 	"aaSorting":[],
			// 	 "language": {
			// 	  "lengthMenu": "Show _MENU_",
			// 	 },
			// 	 "dom":
			// 	  "<'row'" +
			// 	  // "<'col-sm-6 d-flex align-items-center justify-conten-start'l>" +
			// 	  // "<'col-sm-6 d-flex align-items-center justify-content-end'f>" +
			// 	  ">" +

			// 	  "<'table-responsive'tr>" +

			// 	  "<'row'" +
			// 	  // "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
			// 	  // "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
			// 	  ">"
			// 	});
			 $('#jewellery_jst').wrap('<div class="dataTables_jewellery_delivered" />');
		</script>
		<script>
			// $("#jewellery_lot_pending").DataTable({
			// 	// "ordering": false,
			// 	"aaSorting":[],
			// 	 "language": {
			// 	  "lengthMenu": "Show _MENU_",
			// 	 },
			// 	 "dom":
			// 	  "<'row'" +
			// 	  // "<'col-sm-6 d-flex align-items-center justify-conten-start'l>" +
			// 	  // "<'col-sm-6 d-flex align-items-center justify-content-end'f>" +
			// 	  ">" +

			// 	  "<'table-responsive'tr>" +

			// 	  "<'row'" +
			// 	  // "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
			// 	  // "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
			// 	  ">"
			// 	});
			 $('#jewellery_lot_pending').wrap('<div class="dataTables_jewellery_delivered" />');
		</script>
		<script>
			// $("#jewellery_highest_amt_party").DataTable({
			// 	// "ordering": false,
			// 	"aaSorting":[],
			// 	 "language": {
			// 	  "lengthMenu": "Show _MENU_",
			// 	 },
			// 	 "dom":
			// 	  "<'row'" +
			// 	  // "<'col-sm-6 d-flex align-items-center justify-conten-start'l>" +
			// 	  // "<'col-sm-6 d-flex align-items-center justify-content-end'f>" +
			// 	  ">" +

			// 	  "<'table-responsive'tr>" +

			// 	  "<'row'" +
			// 	  // "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
			// 	  // "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
			// 	  ">"
			// 	});
			 $('#jewellery_highest_amt_party').wrap('<div class="dataTables_jewellery_delivered" />');
		</script>
		<script>
			// $("#jewellery_payments_mode").DataTable({
			// 	// "ordering": false,
			// 	"aaSorting":[],
			// 	 "language": {
			// 	  "lengthMenu": "Show _MENU_",
			// 	 },
			// 	 "dom":
			// 	  "<'row'" +
			// 	  // "<'col-sm-6 d-flex align-items-center justify-conten-start'l>" +
			// 	  // "<'col-sm-6 d-flex align-items-center justify-content-end'f>" +
			// 	  ">" +

			// 	  "<'table-responsive'tr>" +

			// 	  "<'row'" +
			// 	  // "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
			// 	  // "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
			// 	  ">"
			// 	});
			 $('#jewellery_payments_mode').wrap('<div class="dataTables_jewellery_payments_mode" />');
		</script>
		<script>
			// $("#jewellery_membership_card_issue").DataTable({
			// 	// "ordering": false,
			// 	"aaSorting":[],
			// 	 "language": {
			// 	  "lengthMenu": "Show _MENU_",
			// 	 },
			// 	 "dom":
			// 	  "<'row'" +
			// 	  // "<'col-sm-6 d-flex align-items-center justify-conten-start'l>" +
			// 	  // "<'col-sm-6 d-flex align-items-center justify-content-end'f>" +
			// 	  ">" +

			// 	  "<'table-responsive'tr>" +

			// 	  "<'row'" +
			// 	  // "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
			// 	  // "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
			// 	  ">"
			// 	});
			 $('#jewellery_membership_card_issue').wrap('<div class="dataTables_jewellery_membership_card_issue" />');
		</script>
		<script>
			// $("#jewellery_cash_in_hand_cmy").DataTable({
			// 	// "ordering": false,
			// 	"aaSorting":[],
			// 	 "language": {
			// 	  "lengthMenu": "Show _MENU_",
			// 	 },
			// 	 "dom":
			// 	  "<'row'" +
			// 	  // "<'col-sm-6 d-flex align-items-center justify-conten-start'l>" +
			// 	  // "<'col-sm-6 d-flex align-items-center justify-content-end'f>" +
			// 	  ">" +

			// 	  "<'table-responsive'tr>" +

			// 	  "<'row'" +
			// 	  // "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
			// 	  // "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
			// 	  ">"
			// 	});
			 $('#jewellery_cash_in_hand_cmy').wrap('<div class="dataTables_jewellery_membership_card_issue" />');
		</script>
		<script>
			// $("#karuppati_sales").DataTable({
			// 	// "ordering": false,
			// 	"aaSorting":[],
			// 	 "language": {
			// 	  "lengthMenu": "Show _MENU_",
			// 	 },
			// 	 "dom":
			// 	  "<'row'" +
			// 	  // "<'col-sm-6 d-flex align-items-center justify-conten-start'l>" +
			// 	  // "<'col-sm-6 d-flex align-items-center justify-content-end'f>" +
			// 	  ">" +

			// 	  "<'table-responsive'tr>" +

			// 	  "<'row'" +
			// 	  // "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
			// 	  // "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
			// 	  ">"
			// 	});
			 $('#karuppati_sales').wrap('<div class="dataTables_jewellery_delivered" />');
		</script>
		<script>
			// $("#karuppati_top_customers").DataTable({
			// 	// "ordering": false,
			// 	"aaSorting":[],
			// 	 "language": {
			// 	  "lengthMenu": "Show _MENU_",
			// 	 },
			// 	 "dom":
			// 	  "<'row'" +
			// 	  // "<'col-sm-6 d-flex align-items-center justify-conten-start'l>" +
			// 	  // "<'col-sm-6 d-flex align-items-center justify-content-end'f>" +
			// 	  ">" +

			// 	  "<'table-responsive'tr>" +

			// 	  "<'row'" +
			// 	  // "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
			// 	  // "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
			// 	  ">"
			// 	});
			 $('#karuppati_top_customers').wrap('<div class="dataTables_jewellery_delivered" />');
		</script>
		<script>
			// $("#karuppati_packed_orders").DataTable({
			// 	// "ordering": false,
			// 	"aaSorting":[],
			// 	 "language": {
			// 	  "lengthMenu": "Show _MENU_",
			// 	 },
			// 	 "dom":
			// 	  "<'row'" +
			// 	  // "<'col-sm-6 d-flex align-items-center justify-conten-start'l>" +
			// 	  // "<'col-sm-6 d-flex align-items-center justify-content-end'f>" +
			// 	  ">" +

			// 	  "<'table-responsive'tr>" +

			// 	  "<'row'" +
			// 	  // "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
			// 	  // "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
			// 	  ">"
			// 	});
			 $('#karuppati_packed_orders').wrap('<div class="dataTables_karuppati_packed_orders" />');
		</script>
		<script>
			// $("#karuppati_dispatched_orders").DataTable({
			// 	// "ordering": false,
			// 	"aaSorting":[],
			// 	 "language": {
			// 	  "lengthMenu": "Show _MENU_",
			// 	 },
			// 	 "dom":
			// 	  "<'row'" +
			// 	  // "<'col-sm-6 d-flex align-items-center justify-conten-start'l>" +
			// 	  // "<'col-sm-6 d-flex align-items-center justify-content-end'f>" +
			// 	  ">" +

			// 	  "<'table-responsive'tr>" +

			// 	  "<'row'" +
			// 	  // "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
			// 	  // "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
			// 	  ">"
			// 	});
			 $('#karuppati_dispatched_orders').wrap('<div class="dataTables_karuppati_packed_orders" />');
		</script>
		<script>
			// $("#karuppati_dispatched_pending_orders").DataTable({
			// 	// "ordering": false,
			// 	"aaSorting":[],
			// 	 "language": {
			// 	  "lengthMenu": "Show _MENU_",
			// 	 },
			// 	 "dom":
			// 	  "<'row'" +
			// 	  // "<'col-sm-6 d-flex align-items-center justify-conten-start'l>" +
			// 	  // "<'col-sm-6 d-flex align-items-center justify-content-end'f>" +
			// 	  ">" +

			// 	  "<'table-responsive'tr>" +

			// 	  "<'row'" +
			// 	  // "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
			// 	  // "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
			// 	  ">"
			// 	});
			 $('#karuppati_dispatched_pending_orders').wrap('<div class="dataTables_karuppati_packed_orders" />');
		</script>
		<script>
			// $("#karuppati_low_stock").DataTable({
			// 	// "ordering": false,
			// 	"aaSorting":[],
			// 	 "language": {
			// 	  "lengthMenu": "Show _MENU_",
			// 	 },
			// 	 "dom":
			// 	  "<'row'" +
			// 	  // "<'col-sm-6 d-flex align-items-center justify-conten-start'l>" +
			// 	  // "<'col-sm-6 d-flex align-items-center justify-content-end'f>" +
			// 	  ">" +

			// 	  "<'table-responsive'tr>" +

			// 	  "<'row'" +
			// 	  // "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
			// 	  // "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
			// 	  ">"
			// 	});
			 $('#karuppati_low_stock').wrap('<div class="dataTables_karuppati_packed_orders" />');
		</script>
		<script>
			// $("#karuppati_max_stock").DataTable({
			// 	// "ordering": false,
			// 	"aaSorting":[],
			// 	 "language": {
			// 	  "lengthMenu": "Show _MENU_",
			// 	 },
			// 	 "dom":
			// 	  "<'row'" +
			// 	  // "<'col-sm-6 d-flex align-items-center justify-conten-start'l>" +
			// 	  // "<'col-sm-6 d-flex align-items-center justify-content-end'f>" +
			// 	  ">" +

			// 	  "<'table-responsive'tr>" +

			// 	  "<'row'" +
			// 	  // "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
			// 	  // "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
			// 	  ">"
			// 	});
			 $('#karuppati_max_stock').wrap('<div class="dataTables_karuppati_packed_orders" />');
		</script>
		<script>
			// $("#jewellery_sales").DataTable({
			// 	// "ordering": false,
			// 	"aaSorting":[],
			// 	 "language": {
			// 	  "lengthMenu": "Show _MENU_",
			// 	 },
			// 	 "dom":
			// 	  "<'row'" +
			// 	  // "<'col-sm-6 d-flex align-items-center justify-conten-start'l>" +
			// 	  // "<'col-sm-6 d-flex align-items-center justify-content-end'f>" +
			// 	  ">" +

			// 	  "<'table-responsive'tr>" +

			// 	  "<'row'" +
			// 	  // "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
			// 	  // "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
			// 	  ">"
			// 	});
			// $('#jewellery_sales').wrap('<div class="dataTables_jewellery_sales" />');
		</script>
		
		<script>
			// $("#chit_credit_reminder").DataTable({
			// 	// "ordering": false,
			// 	"aaSorting":[],
			// 	 "language": {
			// 	  "lengthMenu": "Show _MENU_",
			// 	 },
			// 	 "dom":
			// 	  "<'row'" +
			// 	  // "<'col-sm-6 d-flex align-items-center justify-conten-start'l>" +
			// 	  // "<'col-sm-6 d-flex align-items-center justify-content-end'f>" +
			// 	  ">" +

			// 	  "<'table-responsive'tr>" +

			// 	  "<'row'" +
			// 	  // "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
			// 	  // "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
			// 	  ">"
			// 	});
			 $('#chit_credit_reminder').wrap('<div class="dataTables_chit_delivered" />');
		</script>
		<script>
			// $("#chit_todays_collection").DataTable({
			// 	// "ordering": false,
			// 	"aaSorting":[],
			// 	 "language": {
			// 	  "lengthMenu": "Show _MENU_",
			// 	 },
			// 	 "dom":
			// 	  "<'row'" +
			// 	  // "<'col-sm-6 d-flex align-items-center justify-conten-start'l>" +
			// 	  // "<'col-sm-6 d-flex align-items-center justify-content-end'f>" +
			// 	  ">" +

			// 	  "<'table-responsive'tr>" +

			// 	  "<'row'" +
			// 	  // "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
			// 	  // "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
			// 	  ">"
			// 	});
			 // $('#chit_todays_collection').wrap('<div class="dataTables_chit_delivered" />');
		</script>
		<script>
			// $("#chit_payment_mode").DataTable({
			// 	// "ordering": false,
			// 	"aaSorting":[],
			// 	 "language": {
			// 	  "lengthMenu": "Show _MENU_",
			// 	 },
			// 	 "dom":
			// 	  "<'row'" +
			// 	  // "<'col-sm-6 d-flex align-items-center justify-conten-start'l>" +
			// 	  // "<'col-sm-6 d-flex align-items-center justify-content-end'f>" +
			// 	  ">" +

			// 	  "<'table-responsive'tr>" +

			// 	  "<'row'" +
			// 	  // "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
			// 	  // "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
			// 	  ">"
			// 	});
			 // $('#chit_payment_mode').wrap('<div class="dataTables_chit_delivered" />');
		</script>
		<script>
			// $("#chit_requested_jst").DataTable({
			// 	// "ordering": false,
			// 	"aaSorting":[],
			// 	 "language": {
			// 	  "lengthMenu": "Show _MENU_",
			// 	 },
			// 	 "dom":
			// 	  "<'row'" +
			// 	  // "<'col-sm-6 d-flex align-items-center justify-conten-start'l>" +
			// 	  // "<'col-sm-6 d-flex align-items-center justify-content-end'f>" +
			// 	  ">" +

			// 	  "<'table-responsive'tr>" +

			// 	  "<'row'" +
			// 	  // "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
			// 	  // "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
			// 	  ">"
			// 	});
			 $('#chit_requested_jst').wrap('<div class="dataTables_jewellery_delivered" />');
		</script>
		<script>
			// $("#chit_collection_agent").DataTable({
			// 	// "ordering": false,
			// 	"aaSorting":[],
			// 	 "language": {
			// 	  "lengthMenu": "Show _MENU_",
			// 	 },
			// 	 "dom":
			// 	  "<'row'" +
			// 	  // "<'col-sm-6 d-flex align-items-center justify-conten-start'l>" +
			// 	  // "<'col-sm-6 d-flex align-items-center justify-content-end'f>" +
			// 	  ">" +

			// 	  "<'table-responsive'tr>" +

			// 	  "<'row'" +
			// 	  // "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
			// 	  // "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
			// 	  ">"
			// 	});
			 $('#chit_collection_agent').wrap('<div class="dataTables_jewellery_delivered" />');
		</script>
		<script>
			// $("#real_estate_property_list").DataTable({
			// 	// "ordering": false,
			// 	"aaSorting":[],
			// 	 "language": {
			// 	  "lengthMenu": "Show _MENU_",
			// 	 },
			// 	 "dom":
			// 	  "<'row'" +
			// 	  // "<'col-sm-6 d-flex align-items-center justify-conten-start'l>" +
			// 	  // "<'col-sm-6 d-flex align-items-center justify-content-end'f>" +
			// 	  ">" +

			// 	  "<'table-responsive'tr>" +

			// 	  "<'row'" +
			// 	  // "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
			// 	  // "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
			// 	  ">"
			// 	});
			 $('#real_estate_property_list').wrap('<div class="dataTables_jewellery_delivered" />');
		</script>
		<script>
			// $("#real_estate_purchase_property_list").DataTable({
			// 	// "ordering": false,
			// 	"aaSorting":[],
			// 	 "language": {
			// 	  "lengthMenu": "Show _MENU_",
			// 	 },
			// 	 "dom":
			// 	  "<'row'" +
			// 	  // "<'col-sm-6 d-flex align-items-center justify-conten-start'l>" +
			// 	  // "<'col-sm-6 d-flex align-items-center justify-content-end'f>" +
			// 	  ">" +

			// 	  "<'table-responsive'tr>" +

			// 	  "<'row'" +
			// 	  // "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
			// 	  // "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
			// 	  ">"
			// 	});
			 $('#real_estate_purchase_property_list').wrap('<div class="dataTables_jewellery_delivered" />');
		</script>
		<script>
			// $("#real_estate_booked_property").DataTable({
			// 	// "ordering": false,
			// 	"aaSorting":[],
			// 	 "language": {
			// 	  "lengthMenu": "Show _MENU_",
			// 	 },
			// 	 "dom":
			// 	  "<'row'" +
			// 	  // "<'col-sm-6 d-flex align-items-center justify-conten-start'l>" +
			// 	  // "<'col-sm-6 d-flex align-items-center justify-content-end'f>" +
			// 	  ">" +

			// 	  "<'table-responsive'tr>" +

			// 	  "<'row'" +
			// 	  // "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
			// 	  // "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
			// 	  ">"
			// 	});
			 $('#real_estate_booked_property').wrap('<div class="dataTables_jewellery_delivered" />');
		</script>
		<script>
			// $("#real_estate_registered_property").DataTable({
			// 	// "ordering": false,
			// 	"aaSorting":[],
			// 	 "language": {
			// 	  "lengthMenu": "Show _MENU_",
			// 	 },
			// 	 "dom":
			// 	  "<'row'" +
			// 	  // "<'col-sm-6 d-flex align-items-center justify-conten-start'l>" +
			// 	  // "<'col-sm-6 d-flex align-items-center justify-content-end'f>" +
			// 	  ">" +

			// 	  "<'table-responsive'tr>" +

			// 	  "<'row'" +
			// 	  // "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
			// 	  // "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
			// 	  ">"
			// 	});
			 $('#real_estate_registered_property').wrap('<div class="dataTables_jewellery_delivered" />');
		</script>
		<script>
			// $("#real_estate_purchase_receipts").DataTable({
			// 	// "ordering": false,
			// 	"aaSorting":[],
			// 	 "language": {
			// 	  "lengthMenu": "Show _MENU_",
			// 	 },
			// 	 "dom":
			// 	  "<'row'" +
			// 	  // "<'col-sm-6 d-flex align-items-center justify-conten-start'l>" +
			// 	  // "<'col-sm-6 d-flex align-items-center justify-content-end'f>" +
			// 	  ">" +

			// 	  "<'table-responsive'tr>" +

			// 	  "<'row'" +
			// 	  // "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
			// 	  // "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
			// 	  ">"
			// 	});
			 $('#real_estate_purchase_receipts').wrap('<div class="dataTables_jewellery_delivered" />');
		</script>
		<script>
			// $("#real_estate_sales_receipts").DataTable({
			// 	// "ordering": false,
			// 	"aaSorting":[],
			// 	 "language": {
			// 	  "lengthMenu": "Show _MENU_",
			// 	 },
			// 	 "dom":
			// 	  "<'row'" +
			// 	  // "<'col-sm-6 d-flex align-items-center justify-conten-start'l>" +
			// 	  // "<'col-sm-6 d-flex align-items-center justify-content-end'f>" +
			// 	  ">" +

			// 	  "<'table-responsive'tr>" +

			// 	  "<'row'" +
			// 	  // "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
			// 	  // "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
			// 	  ">"
			// 	});
			 $('#real_estate_sales_receipts').wrap('<div class="dataTables_jewellery_delivered" />');
		</script>
		
		<script>
	      $("#real_estate_purchase_receipts").kendoTooltip({
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
	      $("#real_estate_sales_receipts").kendoTooltip({
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
	      $("#real_estate_booked_property").kendoTooltip({
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
	      $("#real_estate_registered_property").kendoTooltip({
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
	      $("#real_estate_purchase_property_list").kendoTooltip({
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
	      $("#real_estate_property_list").kendoTooltip({
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
	      $("#chit_collection_agent").kendoTooltip({
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
	      $("#chit_requested_jst").kendoTooltip({
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
	      $("#chit_payment_mode").kendoTooltip({
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
	      $("#chit_tms_collection").kendoTooltip({
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
	      $("#chit_credit_reminder").kendoTooltip({
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
	      $("#karuppati_max_stock").kendoTooltip({
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
	      $("#karuppati_low_stock").kendoTooltip({
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
	      $("#karuppati_top_customers").kendoTooltip({
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
	      $("#karuppati_sales").kendoTooltip({
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
	      $("#jewellery_cash_in_hand_cmy").kendoTooltip({
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
	      $("#jewellery_membership_card_issue").kendoTooltip({
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
	      $("#jewellery_payments_mode").kendoTooltip({
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
	      $("#jewellery_highest_amt_party").kendoTooltip({
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
	      $("#jewellery_lot_pending").kendoTooltip({
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
	      $("#jewellery_jst").kendoTooltip({
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
	      $("#jewellery_credit_reminder").kendoTooltip({
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
	      $("#jewellery_sales").kendoTooltip({
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
	      $("#jewellery_delivered").kendoTooltip({
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
	      $("#jewellery_pending").kendoTooltip({
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
	      $("#bj_loan").kendoTooltip({
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
	      $("#jst_loan").kendoTooltip({
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
	      $("#payments_mode").kendoTooltip({
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
	      $("#membership_card_issue").kendoTooltip({
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
	      $("#cash_in_hand_cmy").kendoTooltip({
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
	      $("#highest_amt_party").kendoTooltip({
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
	      $("#last_attd_loan").kendoTooltip({
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
	    <!-- <script>
	    	$(document).ready(function() {
				    var tooltip = $("#last_attd_loan_1").kendoTooltip({
				      /* HFE changes */
				      autoHide: true,
				      showAfter: 100,
				      /* HFE changes */
				      position: "bottom",
				      // content:function(e){
				      //       return $(e.target).text()
				      //   },
				      content: "Additional Hover Content"
				    }).data("kendoTooltip");
				});
			</script> -->
	</body>
	<!--end::Body-->
</html>