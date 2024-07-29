<?php $this->load->view("common");?>

		<link href="<?php echo base_url();?>assets/jquery.autocomplete.css" rel="stylesheet" type="text/css" />
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
									<h1 class="d-flex align-items-center text-dark fw-bold my-1 fs-3">Hand Loan Summary List
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
										<form action="<?php echo base_url();?>handloansummary" method="post">
	                       					<div class="row px-4 py-4">
												<!-- <label class="col-lg-1 col-form-label fw-semibold fs-6">Select</label> -->
												<!-- <div class="col-lg-2 fv-row fv-plugins-icon-container">
													<select class="form-select form-select-solid" data-control="select2" data-hide-search="true" id="day_period" name="day_period" onchange="dy_pd()">	
														<option value="day" <?php echo $day_period=='day'?'selected':'';?>>Day</option>				
														<option value="period" <?php echo $day_period=='period'?'selected':'';?>>Period</option>
													</select>
												</div> -->
												<div class="col-lg-2 fv-row">
													<label class="form-label">As On</label>
													<div class="d-flex align-items-center">
														<input type="date" class="form-control form-control-solid ps-12" name="start_date" placeholder="Select" id="start_date" value="<?php echo $start_date; ?>" />
													</div>
												</div>
												<div class="col-lg-2 fv-row fv-plugins-icon-container">
													<label class="form-label">Company</label>
													<select class="form-select form-select-solid" data-control="select2" data-hide-search="true" id="company_code" name="company_code">	
														<option value="">All</option>
														<?php foreach($company_list as $clist){?>
															<option value="<?php echo $clist['COMPANYCODE'];?>" <?php echo $company_code == $clist['COMPANYCODE']?'selected':'';?>><?php echo $clist['COMPANYNAME'];?></option>
														<?php }?>
													</select>
												</div>
												<div class="col-lg-2 fv-row fv-plugins-icon-container">
													<button type="submit" class="btn btn-sm btn-outline btn-outline-solid btn-outline-warning btn-active-light-primary mt-9">Go</button>
												</div>
											</div>
										</form>
										<!--begin::Card body-->
										<div class="card-body py-4">
											<!--begin::Table-->
											<table class="table align-middle table-row-dashed table-striped table-hover fs-7 gy-1 gs-2" id="kt_datatable_dom_positioning">
												<!--begin::Table head-->
												<thead>
													<!--begin::Table row-->
													<tr class="text-start text-muted fw-bold fs-7 gs-0">
														
														<!-- <th class="min-w-125px cy" style="width: 20%;">Company</th> -->
														<th class="min-w-50px">Sno</th>
														<th class="min-w-100px">Party Id</th>
														<th class="min-w-150px">Party Name</th>
														<th class="min-w-100px">Debit</th>
														<th class="min-w-100px">Credit</th>
														<th class="min-w-80px"><span class="text-end">Actions</span></th>
													</tr>
													<!--end::Table row-->
												</thead>
												<!--end::Table head-->
												<!--begin::Table body-->
												<tbody class="text-gray-600 fw-semibold">
													<!--begin::Table row-->
													<?php $i=1; foreach($handloansummary_list as $dlist){
														$party_details = $this->Handloansummary_model->get_party_by_id($dlist['PID']);
														$party_name = $party_details->NAME;

														$dcamtdet = $this->Handloansummary_model->get_party_debit_credit_amount($dlist['PID'],$ccode);

														if($dcamtdet->TOTAL>0)
														{
														    $closing_balance = $dcamtdet->TOTAL;
														    $closing_side = "dr";
														}
														elseif($dcamtdet->TOTAL<0)
														{
															$closing_balance = abs($dcamtdet->TOTAL);
														    $closing_side = "cr";
														}
														else
														{
															$closing_balance = $dcamtdet->TOTAL;
														    $closing_side = "dr";
														}

														?>
													<tr>
														
														<td><?php echo $i;?></td>
														<td><?php echo $dlist['PID'];?></td>
														<td><?php echo $party_name;?></td>
														<td><?php echo $closing_side=='dr'?$closing_balance:'';?></td>
														<td><?php echo $closing_side=='cr'?$closing_balance:'';?></td>
														<td>
															<a href="#" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm" data-bs-toggle="modal" data-bs-target="#kt_modal_view_party_history" onclick="party_history_view('<?php echo $dlist['PID']; ?>')">
																<i class="bi bi-file-earmark-text-fill" style="font-size: 1.3rem !important;color: black !important;"></i>
															</a>
														</td>
													</tr>
													<?php $i++;}?>
													<!--end::Table row-->
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

		<!--begin::Modal - view party-->
		<div class="modal fade" id="kt_modal_view_party_history" tabindex="-1" aria-hidden="true">
			
		</div>
		<!--end::Modal - view party-->

		<!--begin::Modal - edit company-->
		<div class="modal fade" id="kt_modal_editdept" tabindex="-1" aria-hidden="true">
			
		</div>
		<!--end::Modal - edit company-->

		<!--begin::Modal - add department-->
		<div class="modal fade" id="kt_modal_adddept" tabindex="-1" aria-hidden="true">
			
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
						<div class="mb-7 text-center">
							<h1>On Account - Handloan Summarys Entry</h1>
						</div>
						<!--end::Heading-->
						<form id="general_validate" style="width: 100%;" method="POST" action="<?php echo base_url(); ?>handloansummary/handloansummary_save" enctype="multipart/form-data" onsubmit="return handloansummary_validation();">
							<div style="padding:10px 10px 10px 10px !important;box-shadow: 0 3px 6px #00002947; border-radius: 5px; background-color: #f5f5f1 !important;">
								<div class="row">
									<label class="col-lg-1 col-form-label required fw-semibold fs-6">Date</label>
									<div class="col-lg-2 fv-row">
										<div class="d-flex align-items-center">
											
											<!-- <input class="form-control form-control-solid ps-12" name="add_date_hand_loan_summary" placeholder="Date" id="kt_datepicker_add_hand_loan_summary_date" value="<?php //echo date("d m Y"); ?>"/> -->
											<input type="date" class="form-control form-control-solid" name="add_date_hand_loan_summarys" placeholder="Select Date" id="add_date_hand_loan_summarys" />
										</div>
										<div class="fv-plugins-message-container invalid-feedback" id="add_date_hand_loan_summarys_err"></div>
									</div>
									<!--end::Col-->
									<div class="col-lg-1"></div>
									<!--begin::Label-->
									<label class="col-lg-1 col-form-label fw-semibold fs-6">Type</label>
									<!--end::Label-->
									<!--begin::Left Section-->
									<div class="col-lg-2">
										<input type="text" name="type" id="type" class="form-control form-control-lg1 form-control-solid" placeholder="Type" Value="Advance" readonly>
									</div>
									<!--end::Left Section-->
									<div class="col-lg-1"></div>
									<!--begin::Label-->
									<label class="col-lg-1 col-form-label fw-semibold fs-6">#S.No</label>
									<!--end::Label-->
									<!--begin::Col-->
									<div class="col-lg-2 fv-row fv-plugins-icon-container">
										<input type="text" name="sno" id="sno" class="form-control form-control-lg1 form-control-solid" placeholder="Party Name" Value="<?php echo $sno;?>" style="background-color: #e6e7d1 !important; border-radius: 0px; border: none;" readonly>
										<div class="fv-plugins-message-container invalid-feedback"></div>
									</div>
									<!--end::Col-->
								</div>
							</div><br>
							<div class="row">
								<div class="col-lg-6">
									<div style="padding:10px 10px 10px 10px !important;box-shadow: 0 3px 6px #00002947; border-radius: 5px; background-color: #f5f5f1 !important;">
										<div class="row">
									        <div class="d-flex flex-column fv-row">
									            <div class="form-check form-check-custom form-check-solid">
									                <div class="col-lg-4">
										                <input class="form-check-input2 me-3" type="radio" id="select_int_handpay_report" name="int_radio_handpay_report" value="lno" checked onclick="getRadioValue();" />
										                <label class="form-check-label">
										                    <div class="fw-semibold required text-gray-800">Loan No</div>
										                </label>
										            </div>
									                <div class="col-lg-6 fv-row fv-plugins-icon-container">
														<!-- <input type="text" class="form-control form-control-lg form-control-solid" id="loan_no" name="loan_no"> -->
														<input type="text" class="form-control form-control-lg form-control-solid" name="loan_no" id="loan_no" onkeyup="loan_autocomplete();">
														<input type="hidden" class="form-control form-control-lg form-control-solid" name="loan_party_id" id="loan_party_id">
														<div class="fv-plugins-message-container invalid-feedback" id="loan_no_err"></div>
													</div>
									            </div>
									            <div class="form-check form-check-custom form-check-solid">
									            	<div class="col-lg-4">
										                <input class="form-check-input2 me-3" type="radio" id="int_group_handpay_report" name="int_radio_handpay_report" value="pname" onclick="getRadioValue();"/>
										                <label class="form-check-label" for="kt_docs_formvalidation_radio_option_2">
										                    <div class="fw-semibold required text-gray-800">Party Name</div>
										                </label>
										            </div>
									                <div class="col-lg-6 fv-row fv-plugins-icon-container">
														<!-- <input type="text" class="form-control form-control-lg form-control-solid" id="int_group_tbox_handpay_report" name="int_radio_tbox_handpay_report"> -->
														<input type="text" class="form-control form-control-lg form-control-solid" name="party_name" id="party_name" onkeyup="party_autocomplete();" readonly>
														<input type="hidden" class="form-control form-control-lg form-control-solid" name="party_id" id="party_id">
														<div class="fv-plugins-message-container invalid-feedback" id="party_name_err"></div>
													</div>
									            </div>
									        </div>
										</div>
										<br>
										<div class="row">
											<!--begin::Label-->
											<label class="col-md-4 col-form-label required fw-semibold fs-6">Amount</label>
											<!--end::Label-->
											<!--begin::Col-->
											<div class="col-lg-6 fv-row fv-plugins-icon-container">
												<input type="text" name="amount" id="amount" class="form-control form-control-lg1 form-control-solid" style="font-size: 17px !important;font-weight: 600 !important;"onkeypress="return isNumberKey(event,this);">
												<div class="fv-plugins-message-container invalid-feedback" id="amount_err"></div>
											</div>
											<!--end::Col-->	
										</div>
										<div class="row">
											<label class="col-lg-4 col-form-label required fw-semibold fs-6">Paid From</label>
											<div class="col-lg-6 fv-row">
												<!--begin::Select-->
												<!-- <select class="form-select form-select-solid" name="add_paid_from_hand_loan_summary" data-control="select2" data-hide-search="true">	
													<option value="">Select</option>
													<option value="0">Ayyanar TMB A/c 306519</option>				
													<option value="1">Cash</option>
													<option value="2">Esakki PGB A/c</option>
												</select> -->
												<input type="text" class="form-control form-control-lg form-control-solid" name="paid_from" id="paid_from" onkeyup="paid_ledger_autocomplete();">
												<input type="hidden" class="form-control form-control-lg form-control-solid" name="paid_from_id" id="paid_from_id">
												<div class="fv-plugins-message-container invalid-feedback" id="paid_from_err"></div>
											</div>
										</div>	
										<div class="row">
											<!--begin::Label-->
											<label class="col-md-4 col-form-label fw-semibold fs-6">Description</label>
											<!--end::Label-->
											<!--begin::Col-->
												<div class="col-lg-6 fv-row fv-plugins-icon-container">
													<textarea class="form-control form-control-solid" rows="3" id="description" name="description"></textarea>
													<div class="fv-plugins-message-container invalid-feedback"></div>
												</div>
											<!--end::Col-->
										</div>
										<div class="row">
											<!--begin--Actions-->
											<!-- <div class="col-lg-4 fv-row fv-plugins-icon-container fv-plugins-bootstrap5-row-invalid">
												<div class="d-flex align-items-center mt-3">
													<label class="form-check form-check-inline form-check-solid me-5 is-invalid">
														<input class="form-check-input" name="communication[]" type="checkbox">
													</label>
													<span class="col-form-label fw-semibold fs-6">Save & Print</span>
												</div>
											</div> -->
										</div>
										<br>
										<br>
										<!--Begin::Actions-->
										<div class="row">
											<div class="col-lg-2"></div>
											<!-- <div class="col-lg-2 d-flex">
												<button class="btn btn-outline btn-outline-solid btn-outline-warning btn-active-light-primary me-2" data-bs-dismiss="modal">Print</button>
											</div> -->
											<div class="col-lg-2 d-flex fv-row">
												<button type="submit" class="btn btn-primary me-3" id="save_add_hand_loan_summary">Save</button>
											</div>
											<div class="col-lg-2 d-flex">
												<button class="btn btn-secondary me-3" data-bs-dismiss="modal">Cancel</button>
											</div>
										</div>
										<!--End::Actions-->	
									</div>
								</div>
								<div class="col-lg-6">
									<div style="padding:10px 10px 10px 10px !important;box-shadow: 0 3px 6px #00002947; border-radius: 5px; background-color: #f5f5f1 !important;">
										<div class="row">
											<!--begin::Label-->
											<label class="col-lg-4 col-form-label fw-semibold fs-6">Party ID</label>
											<!--end::Label-->
											<!--begin::Col-->
											<div class="col-lg-8 fv-row fv-plugins-icon-container">
												<input type="text" name="pid" id="pid" class="form-control form-control-lg1 form-control-solid" placeholder="Party ID" readonly>
												<div class="fv-plugins-message-container invalid-feedback"></div>
											</div>
											<!--end::Col-->
										</div>
										<div class="row">
											<!--begin::Label-->
											<label class="col-lg-4 col-form-label fw-semibold fs-6">Name</label>
											<!--end::Label-->
											<!--begin::Col-->
											<div class="col-lg-8 fv-row fv-plugins-icon-container">
												<input type="text" name="pname" id="pname" class="form-control form-control-lg1 form-control-solid" placeholder="Party Name" readonly>
												<div class="fv-plugins-message-container invalid-feedback"></div>
											</div>
											<!--end::Col-->
										</div>
										<div class="row">
											<!--begin::Label-->
											<label class="col-lg-4 col-form-label fw-semibold fs-6">Last Name</label>
											<!--end::Label-->
											<div class="col-lg-3">
												<!-- <select class="form-select form-select-solid" data-control="select2" data-hide-search="true" id="select_interest_tbox_rem_report" name="int_radio_tbox_rem_report">	
													<option value="0">S/o</option>
													<option value="1">W/o</option>				
													<option value="2">H/o</option>
													<option value="3">D/o</option>
												</select> -->
												<input type="text" name="lname_prefix" id="lname_prefix" class="form-control form-control-lg1 form-control-solid" placeholder="Last Name Prefix" readonly>
											</div>
											<!--begin::Col-->
											<div class="col-lg-5 fv-row fv-plugins-icon-container">
												<input type="text" name="fname" id="fname" class="form-control form-control-lg1 form-control-solid" placeholder="Last Name" readonly>
												<div class="fv-plugins-message-container invalid-feedback"></div>
											</div>
											<!--end::Col-->
										</div>
										<div class="row">
											<label class="col-lg-4 col-form-label fw-semibold fs-6">Area</label>
											<div class="col-lg-8">
												<!-- <select class="form-select form-select-solid" data-control="select2" data-hide-search="true">	
													<option value="0">Select Area</option>
													<option value="1">MKR - 1 - KADALDI TOWN</option>				
													<option value="2">MKR - 2 - KADALDI TOWN</option>
													<option value="3">MKR - 3 - KADALDI TOWN</option>
												</select> -->
												<input type="text" name="area" id="area" class="form-control form-control-lg1 form-control-solid" placeholder="Area" readonly>
											</div>
										</div>	
										<div class="row">													
											<label class="col-lg-4 col-form-label fw-semibold fs-6">Street</label>
											<div class="col-lg-3 fv-row fv-plugins-icon-container">
												<input type="text" name="dno" id="dno" class="form-control form-control-lg1 form-control-solid" placeholder="D No" readonly>
												<div class="fv-plugins-message-container invalid-feedback"></div>
											</div>
											<div class="col-lg-5 fv-row fv-plugins-icon-container">
												<input type="text" name="address1" id="address1" class="form-control form-control-lg1 form-control-solid" placeholder="Street" readonly>
												<div class="fv-plugins-message-container invalid-feedback"></div>
											</div>
										</div>
										<div class="row">													
											<!--begin::Label-->
											<label class="col-lg-4 col-form-label fw-semibold fs-6">Village</label>
											<!--end::Label-->
											<!--begin::Col-->
											<div class="col-lg-8 fv-row fv-plugins-icon-container">
												<input type="text" name="address2" id="address2" class="form-control form-control-lg1 form-control-solid" placeholder="Village" readonly>
												<div class="fv-plugins-message-container invalid-feedback"></div>
											</div>
											<!--end::Col-->
										</div>
										<div class="row">		
											<!--begin::Label-->
											<label class="col-lg-4 col-form-label fw-semibold fs-6">Post</label>
											<!--end::Label-->
											<!--begin::Col-->
											<div class="col-lg-8 fv-row fv-plugins-icon-container">
												<input type="text" name="city" id="city" class="form-control form-control-lg1 form-control-solid" placeholder="Post" readonly>
												<div class="fv-plugins-message-container invalid-feedback"></div>
											</div>
											<!--end::Col-->	
										</div>
										<div class="row">	
											<!--begin::Label-->
											<label class="col-lg-4 col-form-label fw-semibold fs-6">Phone no</label>
											<!--end::Label-->
											<!--begin::Col-->
											<div class="col-lg-8 fv-row fv-plugins-icon-container">
												<input type="text" name="pno" id="pno" class="form-control form-control-lg1 form-control-solid" placeholder="Phone No" readonly>
												<div class="fv-plugins-message-container invalid-feedback"></div>
											</div>
											<!--end::Col-->												
										</div>
										<!--Begin::Actions-->		
										<!-- <div class="row">
											<div class="col-lg-8"></div>
											<div class="col-lg-2 d-flex mt-6">
												<button type="reset" class="btn btn-outline btn-outline-solid btn-outline-warning btn-active-light-primary me-2">Clear</button>
											</div>
										</div> -->
										<!--End::Actions-->	
									</div>
								</div>
							</div>
						</form>
					</div>
					<!--end::Modal body-->
				</div>
				<!--end::Modal content-->
			</div>
			<!--end::Modal dialog-->
		</div>
		<!--end::Modal - add department-->
		
		<!--begin::Modal - edit company-->
		<div class="modal fade" id="kt_modal_edithandloansummary" tabindex="-1" aria-hidden="true">
			
		</div>
		<!--end::Modal - edit company-->
		<!--begin::Modal - view company-->
<div class="modal fade" id="kt_modal_viewdept" tabindex="-1" aria-hidden="true">
			<!--begin::Modal dialog-->
			<div class="modal-dialog modal-m">
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
							<h1 class="mb-3">Payment Details</h1>
						</div>
						<!--end::Heading-->
						<div class="row mb-6">
							<!--begin::Label-->
							<label class="col-lg-4 col-form-label fw-semibold fs-6">Company</label>
							<!--end::Label-->
							<!--begin::Left Section-->
												<div class="col-lg-8">
												<!--begin::Select-->
													<select class="form-select form-select-solid" data-control="select2" data-placeholder="Select Company" data-hide-search="true" disabled>
														<option value="3">Ayyanar Gold Bank</option>
														<option value="3">Ayyanar Gold Bank 1</option>
														<option value="3">Ayyanar Gold Bank 2</option>
														<option value="1">Ayyanar Gold Bank 3</option>
														<option value="3">Ayyanar Gold Bank 4</option>
													</select>
													<!--end::Select-->
												</div>
											<!--end::Left Section-->
						</div>
							<div class="row mb-6">
								<!--begin::Label-->
												<label class="col-lg-4 col-form-label fw-semibold fs-6">Dept</label>
												<!--end::Label-->
												<!--begin::Col-->
												<div class="col-lg-8 fv-row fv-plugins-icon-container">
													<input type="text" name="company" class="form-control form-control-lg form-control-solid" placeholder="Payment Name" Value="Accounts" disabled>
													<div class="fv-plugins-message-container invalid-feedback"></div>
												</div>
												<!--end::Col-->	
							</div>
					</div>
					<!--end::Modal body-->
				</div>
				<!--end::Modal content-->
			</div>
			<!--end::Modal dialog-->
		</div>
		<!--End::View Company-->
		<!--begin::Modal - delete department-->
		<div class="modal fade" id="kt_modal_delete_department" tabindex="-1" aria-hidden="true">
			
		</div>
		<!--end::Modal - delete department-->

		<div class="modal fade" id="kt_modal_delete_handloansummary" tabindex="-1" aria-hidden="true">
			
		</div>

		<input type="hidden" id="baseurl" value="<?php echo base_url();?>">
		<?php $this->load->view("script");?>
		<script src="<?php echo base_url();?>assets/jquery.autocomplete.js"></script>
		<script>

var title = $('title').text() + ' | ' + 'Payment';
    $(document).attr("title", title);

var base = $('#baseurl').val();


function party_history_view(val)
{
	var baseurl= $("#baseurl").val();
	// alert(baseurl);
	$.ajax({
	type: "POST",
	url: baseurl+'handloansummary/party_history_view',
	async: false,
	type: "POST",
	data: "id="+val,
	dataType: "html",
	success: function(response)
	{
	$('#kt_modal_view_party_history').empty().append(response);
	$('#kt_modal_view_party_history').addClass('show');
	//$("#kt_modal_editdept").css("display", "block");
	}
});
}
function closeHistoryViewModal()
{
	var baseurl= $("#baseurl").val();
	$('#kt_modal_view_party_history').removeClass('show');
	//$("#kt_modal_update_role").css("display", "none");
	$('.modal-backdrop').removeClass('show');
	window.location.href = baseurl+'handloansummary';
}


function handloansummary_validation()
{
    var err = 0;
    var add_date_hand_loan_summarys = $('#add_date_hand_loan_summarys').val();
    var amount = $('#amount').val();
    var paid_from = $('#paid_from').val();

    if(add_date_hand_loan_summarys.trim()==''){
        $('#add_date_hand_loan_summarys_err').html('Date is required!');
        err++;
    }else{
        $('#add_date_hand_loan_summarys_err').html('');
    }

    if(amount.trim()==''){
        $('#amount_err').html('Amount is required!');
        err++;
    }else{
        $('#amount_err').html('');
    }

    if(paid_from.trim()==''){
        $('#paid_from_err').html('Paid From is required!');
        err++;
    }else{
        $('#paid_from_err').html('');
    }

    var rval = $('input[name="int_radio_handpay_report"]:checked').val();
    if(rval=='lno')
    {
      var loan_no = $('#loan_no').val();
      if(loan_no.trim()==''){
        $('#loan_no_err').html('Loan No is required!');
        err++;
      }else{
          $('#loan_no_err').html('');
      }
      $('#party_name_err').html('');
    }
    else
    {
      var party_name = $('#party_name').val();
      if(party_name.trim()==''){
        $('#party_name_err').html('Party is required!');
        err++;
      }else{
          $('#party_name_err').html('');
      }
      $('#loan_no_err').html('');      
    }
    

    if(err>0){ return false; }else{ return true; }
}

function getRadioValue()
{
	var rval = $('input[name="int_radio_handpay_report"]:checked').val();
	if(rval=='lno')
	{
		$('#party_name').attr('readonly', true);
		$('#loan_no').attr('readonly', false);
		$('#party_name').val('');
		$('#party_id').val('');
	}
	else
	{
		$('#party_name').attr('readonly', false);
		$('#loan_no').attr('readonly', true);
		$('#loan_no').val('');
		$('#loan_party_id').val('');
	}
}



function isNumberKey(evt, obj)
{ 
    var charCode = (evt.which) ? evt.which : event.keyCode
    var value = obj.value;
    var dotcontains = value.indexOf(".") != -1;
    if (dotcontains)
        if (charCode == 46) return false;
    if (charCode == 46) return true;
    if (charCode > 31 && (charCode < 48 || charCode > 57))
        return false;
    return true;
}

function party_autocomplete()
{
	$("#party_name").autocomplete({ 
            valueKey:'title',
            source:[{
            url: base+'handloansummary/get_party_list?type=PRO_MANA&query=%QUERY%',
            type:'remote',
            ajax:{

              dataType : 'json',
            }
        }]}).on('selected.xdsoft',function(e,suggestion,ui){ 
            $("#party_name").val(suggestion.title);
            $('#party_id').val(suggestion.id);

            var pid = $('#party_id').val();
            //alert(pid);

            var baseurl= $("#baseurl").val();
			//alert(val);
			$.ajax({
			type: "POST",
			url: baseurl+'handloansummary/get_party_details',
			async: false,
			type: "POST",
			data: "id="+pid,
			dataType: "html",
			success: function(response)
			{
				var resp = response.split('||');
				$('#pid').val(resp[0]);
				$('#pname').val(resp[1]);
				$('#lname_prefix').val(resp[2]);
				$('#fname').val(resp[3]);
				$('#area').val(resp[4]);
				$('#dno').val(resp[5]);
				$('#address1').val(resp[6]);
				$('#address2').val(resp[7]);
				$('#city').val(resp[8]);
				$('#pno').val(resp[9]);
			}
			});

          
    });
        $("#party_name").focus();
}

function loan_autocomplete()
{
	$("#loan_no").autocomplete({ 
            valueKey:'title',
            source:[{
            url: base+'handloansummary/get_loan_party_list?type=PRO_MANA&query=%QUERY%',
            type:'remote',
            ajax:{

              dataType : 'json',
            }
        }]}).on('selected.xdsoft',function(e,suggestion,ui){ 
            $("#loan_no").val(suggestion.title);
            $('#loan_party_id').val(suggestion.id);

            var pid = $('#loan_party_id').val();
            //alert(pid);

            var baseurl= $("#baseurl").val();
			//alert(val);
			$.ajax({
			type: "POST",
			url: baseurl+'handloansummary/get_party_details',
			async: false,
			type: "POST",
			data: "id="+pid,
			dataType: "html",
			success: function(response)
			{
				var resp = response.split('||');
				$('#pid').val(resp[0]);
				$('#pname').val(resp[1]);
				$('#lname_prefix').val(resp[2]);
				$('#fname').val(resp[3]);
				$('#area').val(resp[4]);
				$('#dno').val(resp[5]);
				$('#address1').val(resp[6]);
				$('#address2').val(resp[7]);
				$('#city').val(resp[8]);
				$('#pno').val(resp[9]);
			}
			});

          
    });
        $("#loan_no").focus();
}

function paid_ledger_autocomplete()
{
	$("#paid_from").autocomplete({ 
            valueKey:'title',
            source:[{
            url: base+'handloansummary/get_handloansummary_paid_ledger?type=PRO_MANA&query=%QUERY%',
            type:'remote',
            ajax:{

              dataType : 'json',
            }
        }]}).on('selected.xdsoft',function(e,suggestion,ui){ 
            $("#paid_from").val(suggestion.title);
            $('#paid_from_id').val(suggestion.id);
          
    });
        $("#paid_from").focus();
}


function handloansummary_edit_validation()
{
    var err = 0;
    var add_date_hand_loan_summarys = $('#add_date_hand_loan_summarys_edit').val();
    var amount = $('#amount_edit').val();
    var paid_from = $('#paid_from_edit').val();

    if(add_date_hand_loan_summarys.trim()==''){
        $('#add_date_hand_loan_summarys_edit_err').html('Date is required!');
        err++;
    }else{
        $('#add_date_hand_loan_summarys_edit_err').html('');
    }

    if(amount.trim()==''){
        $('#amount_edit_err').html('Amount is required!');
        err++;
    }else{
        $('#amount_edit_err').html('');
    }

    if(paid_from.trim()==''){
        $('#paid_from_edit_err').html('Paid From is required!');
        err++;
    }else{
        $('#paid_from_edit_err').html('');
    }

    var rval = $('input[name="int_radio_handpay_report_edit"]:checked').val();
    if(rval=='lno')
    {
      var loan_no = $('#loan_no_edit').val();
      if(loan_no.trim()==''){
        $('#loan_no_edit_err').html('Loan No is required!');
        err++;
      }else{
          $('#loan_no_edit_err').html('');
      }
      $('#party_name_edit_err').html('');
    }
    else
    {
      var party_name = $('#party_name_edit').val();
      if(party_name.trim()==''){
        $('#party_name_edit_err').html('Party is required!');
        err++;
      }else{
          $('#party_name_edit_err').html('');
      }
      $('#loan_no_edit_err').html('');      
    }
    

    if(err>0){ return false; }else{ return true; }
}

function getRadioValueEdit()
{
	var rval = $('input[name="int_radio_handpay_report_edit"]:checked').val();
	if(rval=='lno')
	{
		$('#party_name_edit').attr('readonly', true);
		$('#loan_no_edit').attr('readonly', false);
		$('#party_name_edit').val('');
		$('#party_id_edit').val('');
	}
	else
	{
		$('#party_name_edit').attr('readonly', false);
		$('#loan_no_edit').attr('readonly', true);
		$('#loan_no_edit').val('');
		$('#loan_party_id_edit').val('');
	}
}

function party_autocomplete_edit()
{
  $("#party_name_edit").autocomplete({ 
            valueKey:'title',
            source:[{
            url: base+'handloansummary/get_party_list?type=PRO_MANA&query=%QUERY%',
            type:'remote',
            ajax:{

              dataType : 'json',
            }
        }]}).on('selected.xdsoft',function(e,suggestion,ui){ 
            $("#party_name_edit").val(suggestion.title);
            $('#party_id_edit').val(suggestion.id);

            var pid = $('#party_id_edit').val();
            //alert(pid);

            var baseurl= $("#baseurl").val();
      //alert(val);
      $.ajax({
      type: "POST",
      url: baseurl+'handloansummary/get_party_details',
      async: false,
      type: "POST",
      data: "id="+pid,
      dataType: "html",
      success: function(response)
      {
        var resp = response.split('||');
        $('#pid_edit').val(resp[0]);
        $('#pname_edit').val(resp[1]);
        $('#lname_prefix_edit').val(resp[2]);
        $('#fname_edit').val(resp[3]);
        $('#area_edit').val(resp[4]);
        $('#dno_edit').val(resp[5]);
        $('#address1_edit').val(resp[6]);
        $('#address2_edit').val(resp[7]);
        $('#city_edit').val(resp[8]);
        $('#pno_edit').val(resp[9]);
      }
      });

          
    });
        $("#party_name_edit").focus();
}

function loan_autocomplete_edit()
{
  $("#loan_no_edit").autocomplete({ 
            valueKey:'title',
            source:[{
            url: base+'handloansummary/get_loan_party_list?type=PRO_MANA&query=%QUERY%',
            type:'remote',
            ajax:{

              dataType : 'json',
            }
        }]}).on('selected.xdsoft',function(e,suggestion,ui){ 
            $("#loan_no_edit").val(suggestion.title);
            $('#loan_party_id_edit').val(suggestion.id);

            var pid = $('#loan_party_id_edit').val();
            //alert(pid);

            var baseurl= $("#baseurl").val();
      //alert(val);
      $.ajax({
      type: "POST",
      url: baseurl+'handloansummary/get_party_details',
      async: false,
      type: "POST",
      data: "id="+pid,
      dataType: "html",
      success: function(response)
      {
        var resp = response.split('||');
        $('#pid_edit').val(resp[0]);
        $('#pname_edit').val(resp[1]);
        $('#lname_prefix_edit').val(resp[2]);
        $('#fname_edit').val(resp[3]);
        $('#area_edit').val(resp[4]);
        $('#dno_edit').val(resp[5]);
        $('#address1_edit').val(resp[6]);
        $('#address2_edit').val(resp[7]);
        $('#city_edit').val(resp[8]);
        $('#pno_edit').val(resp[9]);
      }
      });

          
    });
        $("#loan_no_edit").focus();
}

function paid_ledger_autocomplete_edit()
{
  $("#paid_from").autocomplete({ 
            valueKey:'title',
            source:[{
            url: base+'handloansummary/get_handloansummary_paid_ledger?type=PRO_MANA&query=%QUERY%',
            type:'remote',
            ajax:{

              dataType : 'json',
            }
        }]}).on('selected.xdsoft',function(e,suggestion,ui){ 
            $("#paid_from_edit").val(suggestion.title);
            $('#paid_from_id_edit').val(suggestion.id);
          
    });
        $("#paid_from_edit").focus();
}

			

function handloansummary_edit(val){
var baseurl= $("#baseurl").val();
//alert(val);
$.ajax({
type: "POST",
url: baseurl+'handloansummary/handloansummary_edit',
async: false,
type: "POST",
data: "id="+val,
dataType: "html",
success: function(response)
{
$('#kt_modal_edithandloansummary').empty().append(response);
$('#kt_modal_edithandloansummary').addClass('show');
//$("#kt_modal_editdept").css("display", "block");
}
});
}

function closeEditModal()
{
	var baseurl= $("#baseurl").val();
	$('#kt_modal_edithandloansummary').removeClass('show');
	//$("#kt_modal_update_role").css("display", "none");
	$('.modal-backdrop').removeClass('show');
	window.location.href = baseurl+'handloansummary';
}

function handloansummary_delete(val){
var baseurl= $("#baseurl").val();
//alert(val);
$.ajax({
type: "POST",
url: baseurl+'handloansummary/handloansummary_delete',
async: false,
type: "POST",
data: "id="+val,
dataType: "html",
success: function(response)
{
$('#kt_modal_delete_handloansummary').empty().append(response);
$('#kt_modal_delete_handloansummary').addClass('show');
//$("#kt_modal_delete_role").css("display", "block");
}
});
}

function removeHandLoanSummary(val)
{ 
var baseurl= $("#baseurl").val();
$.ajax({
type: "POST",
url: baseurl+'handloansummary/delete',
async: false,
data:"field="+val,
success: function(response)
{
window.location.href = baseurl+'handloansummary';
}
});
}

function closeDeleteModal()
{
	var baseurl= $("#baseurl").val();
	$('#kt_modal_delete_handloansummary').removeClass('show');
	$('.modal-backdrop').removeClass('show');
	window.location.href = baseurl+'handloansummary';
}	

// $('#kt_datatable_dom_positioning').DataTable( {
// 	"aaSorting": [],
//         dom: 'Bfrtip',
//         buttons: [
//             'copyHtml5',
//             'excelHtml5',
//             'csvHtml5',
//             'pdfHtml5'
//         ]
//     } );	

	$("#kt_datatable_dom_positioning").DataTable({
		"ordering": false,
		// "aaSorting":[],
		// "buttons": [
		//             'copy', 'csv', 'excel', 'pdf', 'print'
		//         ],
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