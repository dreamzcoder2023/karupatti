<?php $this->load->view("common");?>
<link href="<?php echo base_url();?>assets/jquery.autocomplete.css" rel="stylesheet" type="text/css" />
<style>
	.dataTables_scroll
    {
        position: relative;
        overflow: auto;
        max-height: 200px;/*the maximum height you want to achieve*/
        width: 100%;
    }
  .dataTables_scroll thead{
    position: -webkit-sticky;
    position: sticky;
    top: 0;
   background-color: #ec9629;
    z-index: 2;
  }
  .dataTables_scroll_rp_entry
    {
        position: relative;
        overflow: auto;
        min-height: 180px;
        max-height: 200px;/*the maximum height you want to achieve*/
        width: 100%;
    }
  .dataTables_scroll_rp_entry thead{
    position: -webkit-sticky;
    position: sticky;
    top: 0;
   background-color: #ec9629;
    z-index: 2;
  }
  .error {
    border: solid 2px #f31700 !important;
	border-color:#f31700 !important;
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
									<h1 class="d-flex align-items-center text-dark fw-bold my-1 fs-3">New Repledge
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
			                  
											<div class="menu-item px-3">
												<a href="#" id="pop_up_success" class="menu-link flex-stack px-3" data-bs-toggle="modal" data-bs-target="#success_modal"></a>
											</div>
																							
					                        <?php } ?>					                       
					                      
											<div class="menu-item px-3">
												<a href="#" id="pop_up_success" class="menu-link flex-stack px-3" data-bs-toggle="modal" data-bs-target="#error_modal"></a>
												</div>
					                       
														
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
																				<b><span id="err_msg"> </span></b>
																				</div>
																			<div class="d-flex flex-center flex-row-fluid pt-12">
																				<button type="submit" class="btn btn-primary me-3" data-bs-dismiss="modal">Ok</button>
																				
																			</div><br><br>
																	</div>
																	<!--end::Modal content-->
																</div>
																<!--end::Modal dialog-->
															</div>
										<!--<form method="POST" action="<?php echo base_url();?>repledge/repledge_save">-->
										<form method="POST" id="frm_repledge_submit" action="repledge_save" enctype="multipart/form-data"  >
										<!--begin::Card body-->
										<div class="card-body py-4">
											<div class="row">
												<label class="col-lg-1 col-form-label required fw-semibold fs-6">Date</label>
												<div class="col-lg-2 fv-row">
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
														<input class="form-control form-control-solid ps-12" placeholder="select Date" name="add_repledge_date"  id="kt_daterangepicker_repledge_add_date" value="<?php echo date("d-m-Y"); ?>" />
													</div>
												</div>
												<div class="col-lg-1">
													<label class="col-form-label required fw-semibold fs-6">Company</label>
												</div>
												<div class="col-lg-2 fv-row">
													<select class="form-select form-select-solid" data-control="select2" data-hide-search="false" name="company" id="company">
														<option value="">Select Company</option>
														<?php 
																		foreach ($company_list as $clist) {
																		?>
																		<option value="<?php echo $clist['COMPANYCODE'];?>" > <?php echo $clist['COMPANYNAME'];?></option>

																		<?php
																		}
																		?>
													</select>
													<span class="fv-plugins-message-container invalid-feedback" id="companyerr"></span>
												</div>
												<label class="col-lg-1 col-form-label required fw-semibold fs-6">Type</label>
												<div class="col-lg-2 fv-row">
													<select class="form-select form-select-solid" data-control="select2" data-hide-search="false" name="type" id="type">
														<option value="">Select Type</option>
														<option value="Y">Mixed</option>
														<option value="N">Individual</option>
													</select>
												</div>
												<label class="col-lg-1 col-form-label required fw-semibold fs-6">Bank</label>
												<div class="col-lg-2 fv-row">
													<select class="form-select form-select-solid" 
													data-control="select2" data-hide-search="false" 
													name="bank_name" id="bank_name" onchange="bankchangeprecentage(this.value);">
														<option value="">Select Bank</option>
														<?php 
															foreach($bank_list as $blist)
															{
														?>
															<option value="<?php echo $blist['bank_Name']; ?>" > 
															<?php echo $blist['bank_Name']; ?></option>
														<?php 
															}
														?>
													</select>
												</div>
												<div class="col-lg-1">
													<label class="col-form-label required fw-semibold fs-6">Bank No</label>
												</div>
												<div class="col-lg-2 fv-row fv-plugins-icon-container">
													<input type="text" class="form-control form-control-lg form-control-solid " placeholder="Enter Bank No" id="bank_no" name="bank_no">
													<div class="fv-plugins-message-container invalid-feedback" name="bank_no_err"></div>
												</div>
												<!-- <div class="col-lg-9 d-flex justify-content-end align-items-center">
													<label class="col-form-label text-center fw-semibold fs-3 me-3">
														<span style="background-color:#5aad52;border-radius: 8px;padding: 5px 15px 5px 15px;">Active</span>
													</label>
												</div> -->
											</div>
											<div class="row mt-2">
												<label class="col-lg-1 col-form-label fw-semibold fs-6">Bill No</label>
												<div class="col-lg-2 fv-row fv-plugins-icon-container">
													<input type="text" class="form-control form-control-lg form-control-solid" placeholder="Enter Bill No" name="bill_no" id="bill_no"  >
													
													
													<input type="hidden" id="indivalbillnumber" name="indivalbillnumber" value=""/>
													<div class="fv-plugins-message-container invalid-feedback"></div>
												</div>
												<div class="col-lg-1">
													<button type="button" class="btn btn-sm btn-primary" id="addpledge" name="addpledge" onclick="pledge_view()">Add</button>
												</div>
												<table id="rp_entry_table" class="table align-middle table-row-dashed table-striped table-hover fs-7 gy-1 gs-2">
													<thead>
													  <tr class="text-start text-muted fw-bold fs-7 gs-0">
													  	<!-- <th class="min-w-25px">Sno</th> -->
													   	<th class="min-w-80px">Loan No</th>
													   	<th class="min-w-100px">Company</th>
													   	<th class="min-w-80px">Item Type</th>
													   	<th class="min-w-120px">Item</th>
													   	<th class="min-w-50px">Qty</th>
													    <th class="min-w-80px">Weight(gms)</th>
															<th class="min-w-80px">Loan Amount</th>
															<th class="min-w-50px">Action</th>
													  </tr>
													</thead>
													<tbody class="text-gray-600 fw-semibold" id="repledge_tbody">
														
													</tbody>
												</table>
											</div>
											<div class="d-flex justify-content-end">
												<label class="col-lg-1 col-form-label fw-bold fs-4">Total</label>
												<label class="col-lg-1 col-form-label fw-bold fs-4 text-center" id="total_pl_count">0</label>
												<input type="hidden" name="txt_total_pl_count" id="txt_total_pl_count" value="0">
												<label class="col-lg-1 col-form-label fw-bold fs-4 text-end" id="total_pl_weight">0.000</label>
												<input type="hidden" name="txt_total_pl_weight" id="txt_total_pl_weight" value="0.000">
												<label class="col-lg-2 col-form-label fw-bold fs-4 text-center" id="total_pl_loan_amount">0.00</label>
												<input type="hidden" name="txt_total_pl_loan_amount" id="txt_total_pl_loan_amount" value="0.000">
												<label class="col-lg-1"></label>
											</div>
											<div class="row">
												<label class="col-form-label fw-bold fs-4">Bank Interest Details</label>
												<label class="col-lg-1 col-form-label required fw-semibold fs-6">Amount</label>
												<div class="col-lg-2">
													<input type="text" name="add_amount_repledge" class="form-control form-control-lg form-control-solid" placeholder="Amount" value="0.00" id="add_amount_repledge"  onkeyup="calc_charges();"  oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
													<div class="fv-plugins-message-container invalid-feedback" id="add_amount_repledge_err" ></div>
												</div>
												<label class="col-lg-1 col-form-label fw-semibold fs-6">Others</label>
												<div class="col-lg-2">
													<input type="text" name="add_others_repledge" class="form-control form-control-lg form-control-solid" placeholder="Others" value="0.00" id="add_others_repledge" onkeyup="calc_charges();"  oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
													<div class="fv-plugins-message-container invalid-feedback" id="add_others_repledge_err"></div>
												</div>
												<div class="col-lg-1">
													<label class="col-form-label fw-semibold fs-6">Appr.Charge</label>
												</div>
												<div class="col-lg-2">
													<input type="text" name="add_apprchrge_repledge" class="form-control form-control-lg form-control-solid" placeholder="Appraiser Charge" value="0.00" id="add_apprchrge_repledge" onkeyup="calc_charges();"  oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
													<div class="fv-plugins-message-container invalid-feedback" id="add_apprchrge_repledge_err"></div>
												</div>
												<div class="col-lg-3">
													<label class="col-form-label fw-bold fs-3">NetAmount</label>&emsp;
													<label class="col-form-label fw-bold fs-3" id="fin_net_amount" >0.00</label>
												</div>
											</div>
											<div class="row">
												<div class="col-lg-6">
													<div class="row">
														<label class="col-lg-3 col-form-label required fw-semibold fs-6">Int  (%)</label>
														<div class="col-lg-3">
																		<select aria-label="Select a Currency"  class="form-select form-select-solid form-select-lg fs-6 fw-semibold" name="add_intpercentage_repledge" id="add_intpercentage_repledge" >
																				<option value="">Select precentage</option>
												
																	</select>
															<div class="fv-plugins-message-container invalid-feedback"></div>
														</div>
														<label class="col-lg-3 col-form-label required fw-semibold fs-6">Months</label>
														<div class="col-lg-3">
															<input type="text" name="add_months_repledge" class="form-control form-control-lg form-control-solid" placeholder="Months"  oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" id="add_months_repledge_err" value="">
															<div class="fv-plugins-message-container invalid-feedback"></div>
														</div>
													</div>
													<div class="row">
														<div class="col-lg-3">
															<label class="col-form-label required fw-semibold fs-6">Iter.Month</label>
														</div>
														<div class="col-lg-3">
															<input type="text" name="add_iterationmonths_repledge" class="form-control form-control-lg form-control-solid" placeholder="Iteration Months"  id="add_iterationmonths_repledge" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" value="">
															<div class="fv-plugins-message-container invalid-feedback" id="add_iterationmonths_repledge_err"></div>
														</div>
														<label class="col-lg-3 col-form-label required fw-semibold fs-6">(+)Int</label>
														<div class="col-lg-3">
															<input type="text" name="add_plusinterest_repledge" class="form-control form-control-lg form-control-solid" placeholder="Plus Int"  id="add_plusinterest_repledge" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" value="">
															<div class="fv-plugins-message-container invalid-feedback" id="add_plusinterest_repledge_err"></div>
														</div>
													</div>
												</div>
												<div class="col-lg-6">
													<div class="row">
														<div class="col-lg-2">
															<label class="col-form-label fw-semibold fs-6">Description</label>
														</div>
														<div class="col-lg-9 fv-row fv-plugins-icon-container">
															<textarea class="form-control form-control-solid" rows="3" id="description" name="description"></textarea>
															<div class="fv-plugins-message-container invalid-feedback" id="description_err"></div>
														</div>
													</div>
												</div>
											</div>
											<div class="d-flex justify-content-end mt-6">
												<button type="reset" class="btn btn-secondary me-3"   onclick="closepagelistview();">Cancel</button>
												
												<button  type="button" class="btn btn-primary" onclick="repledgevalidate();">Save Changes</button>
											</div>
										</div>
										<!--end::Card body-->
										</form>
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
		<!--begin::Modal - View Pledge Info-->
		<div class="modal fade" id="view_pledge_info" tabindex="-1" aria-hidden="true" style="background: #000000a8;">

		</div>
		<!--end::Modal - View Pledge Info-->

		<!--begin::Modal - delete repledge-->
		<div class="modal fade" id="save_repledge" tabindex="-1" aria-hidden="true">
			<!--begin::Modal dialog-->
			<div class="modal-dialog modal-m">
				<!--begin::Modal content-->
				<div class="modal-content rounded">
					<div class="swal2-icon swal2-warning swal2-icon-show" style="display: flex;">
						<div class="swal2-icon-content">&#10003;</div></div>
						<div class="swal2-html-container" id="swal2-html-container" style="display: block;">Are you sure you want to Repledge?</div>
						<div class="d-flex flex-center flex-row-fluid pt-12">
							<button type="submit" class="btn btn-primary me-3" data-bs-dismiss="modal">Yes</button>
							<button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
						</div><br><br>
				</div>
				<!--end::Modal content-->
			</div>
			<!--end::Modal dialog-->
		</div>
		<!--end::Modal - delete repledge-->
	
		

		<?php $this->load->view("script"); ?>
		<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
		<script src="<?php echo base_url();?>assets/jquery.autocomplete.js"></script>

		<script type="text/javascript">

			$('#repledge_tbody').on('click', '.remove', function () 
			{ 
				// Getting all the rows next to the  
				// row containing the clicked button 
				var child = $(this).closest('tr').nextAll(); 

				// Iterating across all the rows  
				// obtained to change the index 
				child.each(function () { 
						
					// Getting <tr> id. 
					var id = $(this).attr('id'); 

					// Getting the <p> inside the .row-index class. 
					var idx = $(this).children('.row-index').children('p'); 

					// Gets the row number from <tr> id. 
					var dig = parseInt(id.substring(1)); 

					// Modifying row index. 
					idx.html(`Row ${dig - 1}`); 

					// Modifying row id. 
					$(this).attr('id', `R${dig - 1}`); 
				}); 

				// Removing the current row. 
				$(this).closest('tr').remove(); 

				// Decreasing the total number of rows by 1. 
				rowIdx--; 
			});
		</script>																		
		<script type="text/javascript">

		var baseurl= $("#baseurl").val();
		function closepagelistview()
		{
			var urldirect = baseurl+'repledge';
			window.location.href = urldirect;
		}

		function repledgevalidate()
		{
			 var company = $('#company').val();
			 var type = $('#type').val();
			 var bill_no = $('#bill_no').val();
			 var bank_no = $('#bank_no').val();
			 var bank_name = $('#bank_name').val();
			 var addintpercentagerepledgeerr = $('#add_intpercentage_repledge').val();
			 var additerationmonthsrepledge = $('#add_iterationmonths_repledge').val();
			 var addmonthsrepledgeerr = $('#add_months_repledge_err').val();
			 var addplusinterestrepledge = $('#add_plusinterest_repledge').val(); 
			 var addamountrepledge = $('#add_amount_repledge').val(); 

			 //alert(addintpercentagerepledgeerr);
			 
			 if(company.trim() =="")
			 {
				$('#company').focus();
				$('#company').addClass('error');
				$('#form').attr('onsubmit','return false;');
				Swal.fire({
				title: 'Error!',
				text: 'Please Select Your Company name',
				icon: 'error',
				confirmButtonText: 'Okay'
				})
				
				return false;
			 }
			
			 else if(type.trim() =="")
			 {
				$('#type').focus();
				$('#type').addClass('error');
				$('#company').removeClass("error");
				$('#form').attr('onsubmit','return false;');
				Swal.fire({
				title: 'Error!',
				text: 'Please Select Your Repledge Type ',
				icon: 'error',
				confirmButtonText: 'Okay'
				})
				
				return false;
			 }
			 else if(bank_name.trim() =="")
			 {
				$('#bank_name').focus();
				$('#bank_name').addClass('error');
				$('#company').removeClass("error");
				$('#type').removeClass("error");
				$('#form').attr('onsubmit','return false;');
				Swal.fire({
				title: 'Error!',
				text: 'Please Select Your Bank Name',
				icon: 'error',
				confirmButtonText: 'Okay'
				})
				
				return false;
			 }
			 else if(bank_no.trim()=="")
			 {
				$('#bank_no').focus();
				$('#form').attr('onsubmit','return false;');
				$('#bank_no').addClass('error');
				$('#company').removeClass("error");
				$('#type').removeClass("error");
				$('#bank_name').removeClass("error");
				Swal.fire({
				title: 'Error!',
				text: 'Please Enter Your Bank Number Number',
				icon: 'error',
				confirmButtonText: 'Okay'
				})
				
				
				return false;
			 }
			 else if(addamountrepledge.trim()=='0.00')
			 {
				$('#add_amount_repledge').focus();
				$('#company').removeClass("error");
				$('#type').removeClass("error");
				$('#bank_name').removeClass("error");
				$('#bank_no').removeClass("error");
				$('#add_amount_repledge').addClass('error');
				
			
				Swal.fire({
				title: 'Error!',
				text: 'Please Enter Your Amount value',
				icon: 'error',
				confirmButtonText: 'Okay'
				})
				
				return false;
			 }
			
			 else if(addintpercentagerepledgeerr.trim() =="")
			 {
				$('#add_amount_repledge').removeClass("error");
				$('#bank_no').removeClass("error");

				$('#company').removeClass("error");
				$('#type').removeClass("error");
				$('#bank_name').removeClass("error");
				$('#bank_no').removeClass("error");
				$('#add_amount_repledge').removeClass("error");

				$('#form').attr('onsubmit','return false;');
				$('#add_intpercentage_repledge_err').addClass('error');
				$('#add_intpercentage_repledge_err').focus();
				Swal.fire({
				title: 'Error!',
				text: 'Please Enter Your Percntage value',
				icon: 'error',
				confirmButtonText: 'Okay'
				})
				
				return false;
			 }
			 else if(additerationmonthsrepledge.trim() =="")
			 {

				$('#add_intpercentage_repledge_err').removeClass("error");
				$('#form').attr('onsubmit','return false;');

				$('#company').removeClass("error");
				$('#type').removeClass("error");
				$('#bank_name').removeClass("error");
				$('#bank_no').removeClass("error");
				$('#add_amount_repledge').removeClass("error");
				$('#add_intpercentage_repledge_err').removeClass("error");

				$('#add_iterationmonths_repledge').addClass('error');
				$('#add_iterationmonths_repledge').focus();
				Swal.fire({
				title: 'Error!',
				text: 'Please Enter Your iteration Month value',
				icon: 'error',
				confirmButtonText: 'Okay'
				})
			
				return false;
			 }
			 else if(addmonthsrepledgeerr.trim() =="")
			 {
				$('#add_iterationmonths_repledge').removeClass("error");
				$('#form').attr('onsubmit','return false;');

				$('#company').removeClass("error");
				$('#type').removeClass("error");
				$('#bank_name').removeClass("error");
				$('#bank_no').removeClass("error");
				$('#add_amount_repledge').removeClass("error");
				$('#add_intpercentage_repledge_err').removeClass("error");
				$('#add_iterationmonths_repledge').removeClass("error");

				$('#add_months_repledge_err').addClass('error');
				$('#add_months_repledge_err').focus();
				Swal.fire({
				title: 'Error!',
				text: 'Please Enter Your  Month value',
				icon: 'error',
				confirmButtonText: 'Okay'
				})
				$('#add_months_repledge_err').addClass('error');
				return false;
			 }
			 else if(addplusinterestrepledge.trim() =="")
			 {
				$('#add_months_repledge_err').removeClass("error");
				$('#form').attr('onsubmit','return false;');

				$('#company').removeClass("error");
				$('#type').removeClass("error");
				$('#bank_name').removeClass("error");
				$('#bank_no').removeClass("error");
				$('#add_amount_repledge').removeClass("error");
				$('#add_intpercentage_repledge_err').removeClass("error");
				$('#add_iterationmonths_repledge').removeClass("error");
				$('#add_months_repledge_err').removeClass("error");


				$('#add_plusinterest_repledge').addClass('error');
				$('#add_plusinterest_repledge').focus();
				Swal.fire({
				title: 'Error!',
				text: 'Please Enter Your intrest value',
				icon: 'error',
				confirmButtonText: 'Okay'
				})
			
				return false;
			 }
			 else 
			 {
			 		$('#type').addClass("error");
			 		$('#type').focus();
			 		var tbl = document.getElementById("rp_entry_table");
					var tbodyRowCount = tbl.tBodies[0].rows.length; // 3
					// var tot_weight=tot_qty=tot_amt=0;
					// alert(tbodyRowCount);
					 var type=$('#type').val();

					 $('#company').removeClass("error");
				
					$('#bank_name').removeClass("error");
					$('#bank_no').removeClass("error");
					$('#add_amount_repledge').removeClass("error");
					$('#add_intpercentage_repledge_err').removeClass("error");
					$('#add_iterationmonths_repledge').removeClass("error");
					$('#add_months_repledge_err').removeClass("error");
					alert(tbodyRowCount);
					if(type=='N')
					{
							  if(tbodyRowCount>3)
					 			{
							 			Swal.fire({
											title: 'error!',
											text: 'Repledge Type Individual..please check.',
											icon: 'error',
											confirmButtonText: 'Okay'
											})
											return false;
							 }
							 else
							 {
									Swal.fire(
									{
										title: 'Success!',
										text: 'Repledge Added Successfully..',
										icon: 'success',
										confirmButtonText: 'Okay'
									})
									setTimeout(function()
									{
										$("#frm_repledge_submit").submit();	
									},2000);
						
							}
					}
					else
					{
							Swal.fire(
							{
								title: 'Success!',
								text: 'Repledge Added Successfully..',
								icon: 'success',
								confirmButtonText: 'Okay'
							})
							setTimeout(function()
							{
								$("#frm_repledge_submit").submit();	
							},2000);
					}
					
				}
		}
		
		</script>
		<script>
			function bankchangeprecentage(bankname)
			{
					$.ajax(
					{
							type: "POST",
							url: baseurl+'repledge/checkbanknameprecentage',
							async: false,
							type: "POST",
							data: "bankname="+bankname,
							dataType: "html",
							success: function(response)
							{
								var res=response.split('||');
									$('#add_intpercentage_repledge').empty().append(res[1]);

									$('#add_months_repledge_err').val(res[2]);
									$('#add_iterationmonths_repledge').val(res[3]);
										$('#add_plusinterest_repledge').val(res[4]);


							}
					});
			}
		</script>
		<script type="text/javascript">
		
			$("#bill_no").autocomplete({ 
	                valueKey:'title',
	                source:[{
	                url:baseurl+'repledge/loanList?query=%QUERY%',
	                type:'remote',
	                ajax:{
	                  dataType : 'json',
	                }
	            }]}).on('selected.xdsoft',function(e,suggestion,ui)
				{ 
					console.log(suggestion);
					$("#BILLNO").val(suggestion.BILLNO);

					
	            	
	        	});
		</script>
		<script>
		function gen_svg()
		{
			var svg_gen = document.getElementById("svg_gen");
			svg_gen.style.visibility = "visible";
			setTimeout(function() {
				         svg_gen.style.visibility = "hidden";
				        }, 2000);
		}
	</script>
	<script>
		      $("#kt_datatable_responsive").kendoTooltip({
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
		      $("#rp_entry_table").kendoTooltip({
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
			$("#rp_entry_table").DataTable({
				// "ordering": false,
				// "aaSorting":[],
				"sorting": false,
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
				  // "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
				  ">"
				});
			$('#rp_entry_table').wrap('<div class="dataTables_scroll_rp_entry" />');
			</script>
   		<script>
		      $("#rp_add_view_pledge_info_table").kendoTooltip({
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
			$("#rp_add_view_pledge_info_table").DataTable({
				// "ordering": false,
				// "aaSorting":[],
				"sorting": false,
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
				  // "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
				  ">"
				});
			$('#rp_add_view_pledge_info_table').wrap('<div class="dataTables_scroll" />');
			</script>
   		
		<script>
			function all_pd() 
			{
				var all_period = document.getElementById("all_period").value;
				 if(all_period == 'period')
				  {
				  	$("#period_date1").show();
				  	$("#period_date2").show();
				  }
				  else
				  {
				  	$("#period_date1").hide();
				  	$("#period_date2").hide();
				  }
			}

			function fil_bank()
			{
				var check_bank = document.getElementById("check_bank");

				if (check_bank.checked)
				{
					$('#bank_filter').removeAttr('disabled');
			  	} else 
			  	{
			  		$('#bank_filter').attr('disabled', 'disabled');
			  	}
			}

			function fil_staff()
			{
				var check_staff = document.getElementById("check_staff");

				if (check_staff.checked)
				{
					$('#staff_filter').removeAttr('disabled');
			  	} else 
			  	{
			  		$('#staff_filter').attr('disabled', 'disabled');
			  	}
			}
			function bill_type_dp_down()
			{
				var bill_type_d_box = document.getElementById("bill_type_d_box").value;
				var bill_type_t_field = document.getElementById("bill_type_t_field");
				if (bill_type_d_box == "") 
				{
					bill_type_t_field.style.display = "none";
				}
				else if (bill_type_d_box == "bill_no")
				{
					bill_type_t_field.style.display = "block";
					document.getElementById("bill_type_fil").innerHTML="Bill No";
				}
				else if (bill_type_d_box == "bank_no")
				{
					bill_type_t_field.style.display = "block";
					document.getElementById("bill_type_fil").innerHTML="Bank No";
				}
				else
				{
					bill_type_t_field.style.display = "block";
					document.getElementById("bill_type_fil").innerHTML="RP Bill No";
				}
			}
		</script>
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

				$("#kt_daterangepicker_48").flatpickr({
								dateFormat: "d-m-Y",
							});
				$("#kt_daterangepicker_49").flatpickr({
								dateFormat: "d-m-Y",
							});
				$("#kt_daterangepicker_repledge_from").flatpickr({
								dateFormat: "d-m-Y",
							});
				$("#kt_daterangepicker_repledge_to").flatpickr({
								dateFormat: "d-m-Y",
							});

				$("#kt_daterangepicker_repledge_add_date").flatpickr({
								dateFormat: "d-m-Y",
							});
				$("#kt_daterangepicker_repledge_edit_date").flatpickr({
								dateFormat: "d-m-Y",
							});

				$("#kt_datatable_responsive").DataTable({
						// "ordering": false,
						"aaSorting":[],
						// "responsive": true,
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
		  $("#kt_datatable_responsive_newrepledge").kendoTooltip({
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
			$("#kt_datatable_responsive_newrepledge").DataTable({
				// "ordering": false,
					// "aaSorting":[],
					"sorting":false,
					"paging": false,
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
				$('#kt_datatable_responsive_newrepledge').wrap('<div class="dataTables_scroll" />');
		</script>
		<script>
		  $("#kt_datatable_responsive_viewrepledge").kendoTooltip({
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
			$("#kt_datatable_responsive_viewrepledge").DataTable({
				// "ordering": false,
				"aaSorting":[],
				"responsive": true,
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
		  $("#kt_datatable_responsive_editrepledge").kendoTooltip({
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
			$("#kt_datatable_responsive_editrepledge").DataTable({
				// "ordering": false,
				"aaSorting":[],
				"responsive": true,
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
		<script type="text/javascript">
		
			function deletepleadge()
			{
				$billnoval= $('#cnt').val();
				document.getElementsByTagName("tr")[$billnoval].remove();
				//alert($billnoval);
			}
			function pledge_view()
			{
				
				var bill_no=$('#bill_no').val();
				$('#indivalbillnumber').val(bill_no);
				var type=$('#type').val();
				var baseurl= $("#baseurl").val();
				var str=bill_no.replace("/","_");
				
			 
				if(bill_no.trim()=='')
				{
					// alert("Enter bill no");
					$('#bill_no').focus();
					$('#bill_no').addClass('error');
					$('#err_msg').html('Enter Bill No');
					document.getElementById("pop_up_success").click();
					document.getElementById('bill_no').focus();
					return false;
				}
				else
				{
					var type = $('#type').val();
					var tbl  = document.getElementById("rp_entry_table");
					var tbodyRowCount = tbl.tBodies[0].rows.length; // 3
					
				//	alert(tbodyRowCount);
					
					if(type=='N' && tbodyRowCount>=2)
					{
					 			Swal.fire({
									title: 'error!',
									text: 'Repledge Type Is Individual..please check.',
									icon: 'error',
									confirmButtonText: 'Okay'
									})
									return false;
					}
					else
					{
					
							var chk=0;
							for(i=0;i<tbodyRowCount;i++)
							{
								// alert($('#td_bill_no'+i).text());
									if((bill_no.toUpperCase()) == ($('#td_bill_no'+i).text()))
									{
											chk+=1;
									}
									var testcheck = chk;
							}
							if(chk==0)
							{
										$.ajax({
											type: "POST",
											url: baseurl+'repledge/repledge_pledge_list',
											async: false,
											type: "POST",
											data: "bno="+str,
											dataType: "html",
											success: function(response)
											{
													//console.log(response);
													// alert(response);
													if(response.trim()=='0')
													{
														  $('#err_msg').html('Item Closed & Please check Bill No Status.Allow Only GOLD Type!');
															document.getElementById("pop_up_success").click();
															// alert("This bill no does not exists");
															return false;
													}
													else if(response.trim()=='1')
													{
														$('#err_msg').html('Items are Already in Bank');
														document.getElementById("pop_up_success").click();
															// alert ("Items are Already in Bank");
															return false;
													}
													else if(response.trim()=='2')
													{
															$('#addpledge').disabled="false";
															Swal.fire({
																	title: 'error!',
																	text: 'No Pledge This Bill no Please Check.',
																	icon: 'error',
																	confirmButtonText: 'Okay'
																	})
																return false;
													}
													else
													{
								
														$('#view_pledge_info').empty().append(response);
														$('#view_pledge_info').addClass('show');
														$('#view_pledge_info').show();
														// $('.modal-backdrop').addClass('show');
														$('.modal-backdrop').show();
													}
												}
											});
											return true;
										}
										else
										{
												$('#err_msg').html('Already entered this Bill No.Please Check Type');
												document.getElementById("pop_up_success").click();
												// alert("Already entered this Bill No");
												return false;
										}
									}
							}
			}
			function close_pledge_view()
			{
					// var baseurl= $("#baseurl").val();
				$('#view_pledge_info').removeClass('show');
				// $('.modal-backdrop').removeClass('show');
				$('#view_pledge_info').hide();
		   		// $('.modal-backdrop').hide();
					var $body = $(document.body);
				$body.css("overflow", "auto");
				$body.width("auto");
			}
		</script>
		<script>
		function checkAll(bx) 
		{
			  var cbs = document.getElementsByTagName('input');
			  for(var i=0; i < cbs.length; i++) {
			    if(cbs[i].type == 'checkbox') {
			      cbs[i].checked = bx.checked;
			    }
			  }
			};
	</script>
	<script >
		function push_selected_pledge()
		{
			$("#bill_no").val('');
			var baseurl= $("#baseurl").val();
			var bno=$('#sel_ple_bill_no').val();
			var cnt=$('#pledge_count').val();
			var billnumber = $('#td_bill_no0').val();
			var str='';
			for(i=0;i<cnt;i++)
			{
					if(document.getElementById('pledge_checked'+i).checked)
					{
						if(str=='')
						{
								str=$('#pledge_checked'+i).val();
						}
						else
						{
								str+=','+$('#pledge_checked'+i).val();	
						}
						
					}
			}
			
			if(str!='')
			{
					var tbl = document.getElementById("rp_entry_table");
					var totalRowCount = tbl.rows.length; // 5
					var tbodyRowCount = tbl.tBodies[0].rows.length; // 3
					var count = $('.rowcount').length+1;
					// alert(count );
					$.ajax({
								type: "POST",
								url: baseurl+'repledge/push_selected_pledge',
								async: false,
								type: "POST",
								data: "pl_id="+str+"&r_cnt="+count,
								dataType: "html",
								success: function(response)
								{

										
									if(response.trim()!='')
									{
										$('.dataTables_empty').hide();
										if(count==0)
										{
												$('#repledge_tbody').empty().append(response);
										}
										else
										{
												$('#repledge_tbody').append(response);
										}
										$('#view_pledge_info').removeClass('show');
										$('.modal-backdrop').removeClass('show');
										$('#view_pledge_info').hide();
								   	$('.modal-backdrop').hide();
										
										var $body = $(document.body);
										$body.css("overflow", "auto");
										$body.width("auto");
									}
									else
									{
											alert("Items Already in Bank");
											$('#err_msg').html('Items are Already in Bank');
											document.getElementById("pop_up_success").click();
									}

								}
					});
			}
			var tbodyRowCount = tbl.tBodies[0].rows.length; // 3
			var tot_weight=tot_qty=tot_amt=0;
			for (i=0;i<tbodyRowCount;i++)
			{
					tot_weight+=($('#td_pl_weight'+i).text());
					tot_qty+=($('#td_pl_qty'+i).text());
					tot_amt+=($('#td_loan_amt'+i).text());
			}

			$('#total_pl_count').html(tot_qty);
			$('#total_pl_weight').html(tot_weight);
			$('#total_pl_loan_amount').html(tot_amt);

			$('#txt_total_pl_count').val(tot_qty);
			$('#txt_total_pl_weight').val(tot_weight);
			$('#txt_total_pl_loan_amount').val(tot_amt);
			
			// return false;
		}
	</script>
	<script type="text/javascript">
		function calc_charges()
		{
				var amt=parseFloat($('#add_amount_repledge').val());
				var oc=parseFloat($('#add_others_repledge').val());
				var apprc=parseFloat($('#add_apprchrge_repledge').val());

				var tot=amt+oc+apprc;
				$('#fin_net_amount').html(tot);
				$('#netamount').val(tot);
		}
	</script>
	</body>
	<!--end::Body-->
</html>