<?php $this->load->view("common");?>
<link href="<?php echo base_url();?>assets/jquery.autocomplete.css" rel="stylesheet" type="text/css" />
<script src="<?php echo base_url();?>assets/js/webcam/webcam.min.js"></script>
<style>
	.dataTables_scroll
    {
        position: relative;
        overflow: auto;
        max-height: 218px;/*the maximum height you want to achieve*/
        width: 100%;
    }
  .dataTables_scroll thead{
    position: -webkit-sticky;
    position: sticky;
    top: 0;
   background-color: #ec9629;
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
									<h1 class="d-flex align-items-center text-dark fw-bold my-1 fs-3">Loan Search
									<span class="h-20px border-gray-400 border-start ms-3 mx-2"></span>
									<label class="d-flex align-items-center text-primary fw-bold my-1 fs-5">
										<span>Loan No &emsp;-&emsp; </span>
										<span id="dis_bill_no"></span>
									</label>
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
											<div class="loader">
											</div>
											<div class="row">
												<label class="col-lg-1 col-form-label fw-semibold fs-6">Loan No</label>
												<div class="col-lg-2">
													<input type="text" name="ls_bill_no" id="ls_bill_no" class="form-control form-control-lg form-control-solid" placeholder="Search" value="Mip-256/12">
												</div>
											</div>
											<div class="d-grid mt-4">
												<ul class="nav nav-tabs flex-nowrap text-nowrap">
													<li class="nav-item">
														<a class="nav-link active btn btn-active-light btn-color-black-800 btn-active-color-primary rounded-bottom-0 fw-bold fs-6" data-bs-toggle="tab" href="#kt_tab_pane_base_loan">Base</a>
													</li>
													<li class="nav-item">
														<a class="nav-link btn btn-active-light btn-color-black-800 btn-active-color-primary rounded-bottom-0 fw-bold fs-6" data-bs-toggle="tab" href="#kt_tab_pane_initial_loan">Initial</a>
													</li>
													<li class="nav-item">
														<a class="nav-link btn btn-active-light btn-color-black-800 btn-active-color-primary rounded-bottom-0 fw-bold fs-6" data-bs-toggle="tab" href="#kt_tab_pane_receipt_loan">Receipt</a>
													</li>
													<li class="nav-item">
														<a class="nav-link btn btn-active-light btn-color-black-800 btn-active-color-primary rounded-bottom-0 fw-bold fs-6" data-bs-toggle="tab" href="#kt_tab_pane_redemption_loan">Redemption</a>
													</li>
													<li class="nav-item">
														<a class="nav-link btn btn-active-light btn-color-black-800 btn-active-color-primary rounded-bottom-0 fw-bold fs-6" data-bs-toggle="tab" href="#kt_tab_pane_repledge_loan">Repledge</a>
													</li>
													<li class="nav-item">
														<a class="nav-link btn btn-active-light btn-color-black-800 btn-active-color-primary rounded-bottom-0 fw-bold fs-6" data-bs-toggle="tab" href="#kt_tab_pane_audit_history_loan">Audit History</a>
													</li>
													<li class="nav-item">
														<a class="nav-link btn btn-active-light btn-color-black-800 btn-active-color-primary rounded-bottom-0 fw-bold fs-6" data-bs-toggle="tab" href="#kt_tab_pane_lock_in_out">Lock In/Out</a>
													</li>
													<li class="nav-item">
														<a class="nav-link btn btn-active-light btn-color-black-800 btn-active-color-primary rounded-bottom-0 fw-bold fs-6" data-bs-toggle="tab" href="#kt_tab_pane_jewel_settlment">Jewel Settlement</a>
													</li>
												</ul>
											</div>
											<div class="tab-content" id="myTabContent">
												<div class="tab-pane fade show active" id="kt_tab_pane_base_loan" role="tabpanel">
													<div class="row mt-4">
														<div class="accordion" id="kt_accordion_item_party_details">
													    <div class="accordion-item">
													        <h2 class="accordion-header" id="kt_accordion_item_party_details_header_1">
													            <button class="accordion-button fw-bold fs-6 collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#kt_accordion_item_party_details_body_1" aria-expanded="true" aria-controls="kt_accordion_item_party_details_body_1">
													            Party Basic Details</button>
													        </h2>
													        <div id="kt_accordion_item_party_details_body_1" class="accordion-collapse collapse show" aria-labelledby="kt_accordion_item_party_details_header_1" data-bs-parent="#kt_accordion_item_party_details">
													            <div class="accordion-body">
													            	<div class="row">
													            		<div class="col-lg-6">
													            			<div class="row">
																							<label class="col-lg-12 col-form-label fw-bold fs-6" name="" id="" title="Party Name">
																								<i class="fa fa-user fs-6" aria-hidden="true" title="Party Name"></i>&emsp;<span id="ls_firstname">SUBRAMANIAN</span></label>
																								<input type="hidden" name="ls_pid" id="ls_pid" >
																							<label class="col-lg-12 col-form-label fw-bold fs-6" name="" id="" title="Address">
																								<i class="fa-solid fa-location-dot fs-6" aria-hidden="true" title="Address"></i>
																							<span id="ls_address"> <i class="fas fa-info-circle fs-6" title="12,Roja Street,Sayalkudi"></i></span></label>
																							<label class="col-lg-6 col-form-label fw-bold fs-6" name="" id="" title="Mobile">
																								<i class="fas fa-mobile-android-alt fs-6" aria-hidden="true" title="Mobile"></i>
																								&emsp;<span id="ls_phone_no">9895969895</span></label>
																							<label class="col-lg-2 col-form-label fw-semibold fs-6">Rating</label>
																							<label class="col-lg-4 col-form-label fw-bold fs-6">
																								<span id="ls_rating"><i class="fa-solid fa-star fs-6" style="color:#50cd89;"></i>&nbsp;Nil</span></label>
																							<label class="col-form-label fw-semibold fs-6">Nominee &nbsp;
																								<span class="fw-bold fs-6" id="ls_nominee">Kumar - Brother - 9795963214
																								&nbsp; <i class="fas fa-info-circle fs-6" title="Kumar - Brother - 9795963214"></i></span></label>
																						</div>
													            		</div>
													            		<div class="col-lg-6">
													            			<div class="row mt-4 mb-4">
																							<div class="col-lg-4 fv-row">
																								<div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url(assets/images/Party.jpg)" id="ls_party_photo">
																									<div class="image-input-wrapper"  style="background-image: url(<?php echo base_url();?>assets/images/Party.jpg)"></div>
																								</div>
																							</div>
																							<div class="col-lg-4 fv-row">
																								<div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url(assets/images/Party_Proof.jpg)" id="ls_id_photo">
																									<div class="image-input-wrapper"  style="background-image: url(<?php echo base_url();?>assets/images/Party_Proof.jpg)"></div>
																								</div>
																							</div>
																							<div class="col-lg-4 fv-row">
																								<div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url(assets/images/Signature.jpg)" id="ls_sign_photo">
																									<div class="image-input-wrapper"  style="background-image: url(<?php echo base_url();?>assets/images/Signature.jpg)"></div>
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
													<div class="row mt-4">
														<div class="accordion" id="kt_accordion_item_loan_details">
													    <div class="accordion-item">
													        <h2 class="accordion-header" id="kt_accordion_item_loan_details_header_1">
													            <button class="accordion-button fw-bold fs-6 collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#kt_accordion_item_loan_details_body_1" aria-expanded="true" aria-controls="kt_accordion_item_loan_details_body_1">
													            Loan Information Details</button>
													        </h2>
													        <div id="kt_accordion_item_loan_details_body_1" class="accordion-collapse collapse show" aria-labelledby="kt_accordion_item_loan_details_header_1" data-bs-parent="#kt_accordion_item_loan_details">
													            <div class="accordion-body">
													            	<div class="row">
													            		<label class="col-lg-1 col-form-label fw-semibold fs-6">Company</label>
																					<label class="col-lg-9 col-form-label fw-bold fs-6" id="ls_company">AGB - MAIN BRANCH SAYALKUDI</label>
																					<label class="col-lg-2 col-form-label fw-semibold fs-5" id="ls_loan_status"><span style="background-color:#5aad52;border-radius: 8px;padding: 5px 15px 5px 15px;">Lock In</span>
																					</label>
													            		<div class="col-lg-4">
													            			<div class="row">
																							<label class="col-lg-4 col-form-label fw-semibold fs-6">Int Type</label>
																							<label class="col-lg-8 col-form-label fw-bold fs-6" id="ls_int_type">MIP-1.25</label>
																							<label class="col-lg-4 col-form-label fw-semibold fs-6">Loan Date</label>
																							<label class="col-lg-8 col-form-label fw-bold fs-6" id="ls_loan_date">22-01-2023</label>
																							<div class="col-lg-12">
																								<label class="col-form-label"><i class="fas fa-money-bill-wave fs-4"></i>&emsp;</span></label>
																								<span class="fw-bold fs-6" id="ls_loan_amount1" title="Loan Amount"><label class="col-form-label fw-bold fs-2" id="ls_loan_amount">60000.00</label></span>
																							</div>
													            			</div>
													            		</div>
													            		<div class="col-lg-4">
													            			<div class="row">
													            				<div class="col-lg-4" id="ls_due_status">
																				<label class="col-form-label fw-bold fs-5 bg-success" style="border-radius: 8px;padding: 5px 10px 5px 10px;" title="Loan Due Status">Normal</label>
																								
																							</div>
																							<div class="col-lg-8">
																								<label class="col-form-label fw-bold fs-6" id="ls_loan_period" title="Loan Due Period">3 Month 16 Days</label>
																							</div>
																							<label class="col-lg-4 col-form-label fw-semibold fs-6">Exp.Date</label>
																							<label class="col-lg-8 col-form-label fw-bold fs-6" id="ls_loan_exp_date">22-04-2023</label>
																							<div class="col-lg-4">
																								<label class="col-form-label"><span><i class="fas fa-list-ol fs-4"></i>&emsp;</span></label>
																								
																								<label class="col-form-label fw-bold fs-4" id="ls_pl_count" title="Loan Pledge Count">2</label>
																							</div>
																							<div class="col-lg-8">
																								<label class="col-form-label"><span><i class="fas fa-balance-scale fs-4"></i></span>&emsp;</label>
																								<label class="col-form-label fw-bold fs-4" id="ls_weight" title="Total Net Weight">32.800</label>
																							</div>
													            			</div>
													            		</div>
													            		<div class="col-lg-4 fv-row">
																						<div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url(assets/media/svg/avatars/signature_blank.png)" id="ls_jewel_photo">
																							<div class="image-input-wrapper"  style="background-image: url(<?php echo base_url();?>assets/images/Jewel.jpg)"></div>
																						</div>
																					</div>
																					<div class="col-lg-6">
																						<div class="row">
																							<table>
																								<thead class="fw-bold fs-6">
																									<td class="col-lg-4">Actual</td>
																									<td class="col-lg-4">Paid</td>
																									<td class="col-lg-4">Balance</td>
																								</thead>
																								<tbody class="fw-semibold fs-6">
																									<tr>
																										<td class="col-lg-4">
																											<span>Pri : </span>
																											<span id="ls_loan_prin">60000.00</span>
																										</td>
																										<td class="col-lg-4" id="ls_paid_prin">0.00</td>
																										<td class="col-lg-4" id="ls_bal_prin">60000.00</td>
																									</tr>
																									<tr>
																										<td class="col-lg-4">
																											<span>Int : </span>
																											<span id="ls_loan_int">750.00</span>
																										</td>
																										<td class="col-lg-4" id="ls_paid_int">0.00</td>
																										<td class="col-lg-4" id="ls_bal_int">750.00</td>
																									</tr>
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
													<div class="row mt-4">
														<div class="accordion" id="kt_accordion_item_list">
														    <div class="accordion-item">
														        <h2 class="accordion-header" id="kt_accordion_item_list_header_1">
														            <button class="accordion-button fw-bold fs-6 collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#kt_accordion_item_list_body_1" aria-expanded="false" aria-controls="kt_accordion_item_list_body_1">
														            Pledge Info &emsp; - &emsp; Count &emsp; <span id="ls_pledge_count">2 </span>&emsp; - &emsp; Total Net Weight &emsp; <span id="ls_pledge_weight">32.800 </span>gms
														            </button>
														        </h2>
														        <div id="kt_accordion_item_list_body_1" class="accordion-collapse collapse" aria-labelledby="kt_accordion_item_list_header_1" data-bs-parent="#kt_accordion_item_list">
														            <div class="accordion-body">
														            	<table class="table align-middle table-row-dashed table-striped table-hover fs-7 gy-1 gs-2" id="kt_datatable_dom_positioning_view_loan">
																			<thead>
																				<tr class="text-start text-muted fw-bold fs-7 gs-0">
																		            <th class="min-w-150px">Items</th>
																		            <th class="min-w-100px">Description</th>
																		            <th class="min-w-80px">Quality</th>
																		            <th class="min-w-80px">Purity(%)</th>
																		            <th class="min-w-80px">Weight(gms)</th>
																		            <th class="min-w-100px">Stone Wgt(gms)</th>
																		            <th class="min-w-80px">Less(gms)</th>
																		            <th class="min-w-80px">Nt Wgt(gms)</th>
																		            <th class="min-w-50px">Damage</th>
																		            <th class="min-w-50px">Img</th>
																				</tr>
																			</thead>
																			<tbody class="text-gray-600 fw-semibold" id="ls_pledge_tbody">
																				
																		    </tbody>
																		    <tfoot>
																				<tr class="text-start text-muted fw-bold fs-4 gs-0" id="ls_pledge_tfoot">
																		            
																				</tr>
																			</tfoot>
																		</table>
														            </div>
														        </div>
														    </div>
														</div>
													</div>
												</div>
												<div class="tab-pane fade" id="kt_tab_pane_initial_loan" role="tabpanel">
													<div class="row mt-4">
														<div class="accordion" id="kt_accordion_item_list_charges">
														    <div class="accordion-item">
														        <h2 class="accordion-header" id="kt_accordion_item_list_charges_header_1">
														            <button class="accordion-button fw-bold fs-6 collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#kt_accordion_item_list_charges_body_1" aria-expanded="true" aria-controls="kt_accordion_item_list_charges_body_1">
														            Charges Details &emsp; - &emsp; Amount <span>&emsp; 590.00 &emsp;
														            </button>
														        </h2>
														        <div id="kt_accordion_item_list_charges_body_1" class="accordion-collapse collapse show" aria-labelledby="kt_accordion_item_list_charges_header_1" data-bs-parent="#kt_accordion_item_list_charges">
														            <div class="accordion-body">
														            	<div class="px-4" style="border-radius: 10px;padding-bottom: 20px;box-shadow: 0 5px 10px #00002947;">
														            	<div class="row">
																						<label class="col-lg-3 col-form-label fw-bold fs-4">Loan Payment Information</label>
																						<div class="col-lg-2">
																							<i class="fas fa-money-bill-wave fs-4" title="Total Amount"></i>&emsp;
																							<label class="col-form-label fw-bold fs-4" id="loan_pay_total_amount" title="Total Amount">10000.00</label>
																						</div>
																					</div>
																					<div class="row">
																						<div class="col-lg-2" title="Loan Amount">
																							<label class="col-form-label" title="Loan Amount"><i class="fas fa-money-bill-wave-alt fs-3" title="Loan Amount"></i>&emsp;</label>
																							<label class="col-form-label  fw-bold fs-5" id="loan_pay_loan_amount">10000.00</label>
																						</div>
																						<div class="col-lg-2" title="Monthly Interest">
																							<label class="col-form-label" title="Monthly Interest">
																								<i class="fas fa-calendar-alt fs-3" title="Monthly Interest"> &emsp;</i></label>
																							<label class="col-form-label fw-bold fs-5" id="loan_pay_mon_int">125.00</label>
																						</div>
																						<div class="col-lg-2" title="Redemption Period">
																							<label class="col-form-label"><i class="fas fa-hand-holding-usd fs-2" title="Redemption Period"></i> &emsp;</label>
																							<label class="col-form-label fw-bold fs-5"  id="loan_pay_redemption_period">30</label>
																							<label class="col-form-label fw-semibold fs-6">&emsp;Days</label>
																						</div>
																						<div class="col-lg-2" title="Membership Points">
																							<label class="col-form-label">
																								<i class="fas fa-coins fs-3"></i> &emsp;</label>
																							<label class="col-form-label fw-bold fs-5" id="loan_pay_membership_points">25</label>
																						</div>
																					</div>
																				</div><br>
																				<div class="px-4" style="border-radius: 10px;padding-bottom: 20px;box-shadow: 0 5px 10px #00002947;">
																					<div class="row">
																						<label class="col-lg-3 col-form-label fw-bold fs-4">Payment To Receive</label>
																						<div class="col-lg-3" title="Total Amount">
																							<i class="fas fa-money-bill-wave fs-4" title="Total Amount"></i>&emsp;
																							<label class="col-form-label fw-bold fs-4" title="Total Amount" id="ls_init_ptr_lbl_total_charges">590.00</label>
																						</div>
																					</div>
																					<div class="row">
																						<div class="col-lg-2" title="Processing Charge">
																							<label class="col-form-label">
																								<i class="fas fa-file-powerpoint fs-2" title="Processing Charge"> &emsp;</i></label>
																							<label class="col-form-label fw-bold fs-5" title="Processing Charge" id="processing_charge">40.00</label>
																						</div>
																						<div class="col-lg-2" title="Document Charge">
																							<label class="col-form-label">
																								<i class="fas fa-file-invoice fs-2" title="Document Charge"></i> &emsp;</label>
																							<label class="col-form-label fw-bold fs-5" title="Document Charge"  id="doc_charge">50.00</label>
																						</div>
																						<div class="col-lg-2" title="Processing & Document Charges Total">
																							<label class="col-form-label">
																							<i class="fas fa-money-bill-wave fs-4" title="Processing & Document Charges Total"></i>&emsp;</label>
																							<label class="col-form-label fw-bold fs-5" title="Processing & Document Charges Total"  id="total_charge">90.00</label>
																						</div>
																						<div class="col-lg-3">
																							<div class=" text-center" style="background-color: #ff5b5b;border-radius: 10px;">
																								<label class="col-form-label fw-semibold fs-6 text-white" >On Account &emsp;</label>
																								<label class="col-form-label fw-bold fs-5 text-white"  id="hl_amount">500.00</label>
																							</div>
																						</div>
																						<div class="col-lg-6">
																							<div class="row">
																								<label class="col-form-label fw-bold fs-5">Proc & Doc Charges Deduct from</label>
																								<div class="col-lg-6">
																									<label class="col-form-label fw-semibold fs-6">Loan Amt &emsp;</label>
																									<label class="col-form-label fw-bold fs-4"  id="proc_doc_charge_from_loan">20.00</label>
																								</div>
																								<div class="col-lg-6">
																									<label class="col-form-label fw-semibold fs-6">Pay Seperate &emsp;</label>
																									<label class="col-form-label fw-bold fs-4"  id="proc_doc_charge_from_seperate">20.00</label>
																								</div>
																							</div>
																						</div>
																						<div class="col-lg-6">
																							<div class="row">
																								<label class="col-form-label fw-bold fs-5">On Account Charges Deduct from</label>
																								<div class="col-lg-6">
																									<label class="col-form-label fw-semibold fs-6">Loan Amt &emsp;</label>
																									<label class="col-form-label fw-bold fs-4"  id="hl_amount_from_loan">250.00</label>
																								</div>
																								<div class="col-lg-6">
																									<label class="col-form-label fw-semibold fs-6">Pay Seperate &emsp;</label>
																									<label class="col-form-label fw-bold fs-4" id="hl_amount_from_seperate">250.00</label>
																								</div>
																							</div>
																						</div>
																					</div>
																					<div class="row">
																						<!-- <label class="col-form-label fw-bold fs-4">To Pay</label> -->
																						<label class="col-lg-1 col-form-label fw-semibold fs-6">Remarks</label>
																						<label class="col-lg-4 col-form-label fw-bold fs-5">-</label>
																						<div class="col-lg-7">
																							<label class="col-form-label fw-bold fs-1">Net Pay &emsp;</label>
																							<label class="col-form-label fw-bold fs-1" id="loan_pay_net_amount">9730.00</label>
																						</div>
																					</div>
																				</div>
														            </div>
														        </div>
														    </div>
														</div>
													</div>
													<div class="row mt-4">
														<div class="accordion" id="kt_accordion_item_list_receive">
														    <div class="accordion-item">
														        <h2 class="accordion-header" id="kt_accordion_item_list_receive_header_1">
														            <button class="accordion-button fw-bold fs-6 collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#kt_accordion_item_list_receive_body_1" aria-expanded="false" aria-controls="kt_accordion_item_list_receive_body_1">
														            Payment To Receive Details &emsp; - &emsp; Amount &emsp; <span id="ls_init_ptr_acc_charges_total">590.00</span> &emsp;
														            </button>
														        </h2>
														        <div id="kt_accordion_item_list_receive_body_1" class="accordion-collapse collapse" aria-labelledby="kt_accordion_item_list_receive_header_1" data-bs-parent="#kt_accordion_item_list_receive">
														            <div class="accordion-body">
														            	<div class="row">
																			<label class="col-lg-2 col-form-label fw-bold fs-3">Total to Receive</label>
																			<label class="col-lg-2 col-form-label fw-bold fs-3" id="ls_init_ptr_lbl_charges_total">590.00</label>
																		</div>
																		<div id="init_payment_to_receive">
																			
																		</div>
																		
														            </div>
														        </div>
														    </div>
														</div>
													</div>
													<div class="row mt-4">
														<div class="accordion" id="kt_accordion_item_list_paynow">
														    <div class="accordion-item">
														        <h2 class="accordion-header" id="kt_accordion_item_list_paynow_header_1">
														            <button class="accordion-button fw-bold fs-6 collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#kt_accordion_item_list_paynow_body_1" aria-expanded="false" aria-controls="kt_accordion_item_list_paynow_body_1">
														            To Pay Details &emsp; - &emsp; Amount &emsp; <span id="ls_to_pay_net_pay">9730.00</span> &emsp;
														            </button>
														        </h2>
														        <div id="kt_accordion_item_list_paynow_body_1" class="accordion-collapse collapse" aria-labelledby="kt_accordion_item_list_paynow_header_1" data-bs-parent="#kt_accordion_item_list_paynow">
														            <div class="accordion-body">
														            	<div class="row">
																			<label class="col-lg-2 col-form-label fw-bold fs-3">Net Pay</label>
																			<label class="col-lg-2 col-form-label fw-bold fs-3" id="ls_to_pay_lbl_net_pay">9730.00</label>
																		</div>
																		<div id="init_to_pay_details">
																			
																		</div>
																		
														            </div>
														        </div>
														    </div>
														</div>
													</div>
												</div>
												<div class="tab-pane fade" id="kt_tab_pane_receipt_loan" role="tabpanel">
													<div class="row">
														<div class="col-lg-3" title="Loan Date">
															<!-- <label class="col-form-label"><i class="fas fa-calendar-day fs-4"></i> </label> -->
															<label class="col-form-label fw-semibold fs-6">Loan Date &emsp;</label>
															<label class="col-form-label fw-bold fs-5" id="ls_rcpt_loan_date">22-12-2022</label>
														</div>
														<div class="col-lg-3" title="Receipt Count">
															<!-- <label class="col-form-label"><i class="fas fa-calendar-day fs-4"></i> </label> -->
															<label class="col-form-label fw-semibold fs-6">Receipt Count &emsp;</label>
															<label class="col-form-label fw-bold fs-5" id="ls_rcpt_count">1</label>
														</div>
														<div class="col-lg-3" title="Loan Amount">
															<label class="col-form-label fw-semibold fs-6">Loan Amount &emsp;</label>
															<!-- <label class="col-form-label"><i class="fas fa-money-bill-wave fs-4"></i> </label> -->
															<label class="col-form-label fw-bold fs-5" id="ls_rcpt_loan_amount">10000.00</label>
														</div>
														<div class="col-lg-3" title="Total Amount">
															<!-- <label><i class="fas fa-money-check-alt fs-2" title="Total Amount"></i>&emsp;</label> -->
															<label class="col-form-label fw-semibold fs-6">Total Amount &emsp;</label>
															<label class="col-form-label fw-bold fs-5" id="ls_rcpt_total_amount">10927.01</label>
														</div>
														<div class="col-lg-3" title="Paid Amount">
															<!-- <label><i class="fas fa-money-bill-wave fs-4" title="Paid Amount"></i>&emsp;</label> -->
															<label class="col-form-label fw-semibold fs-6">Paid Amount &emsp;</label>
															<label class="col-form-label fw-bold fs-5" id="ls_rcpt_paid_amount">2000.00</label>
														</div>
														<div class="col-lg-3" title="Balance Amount">
															<label class="col-form-label fw-semibold fs-6">Balance Amount &emsp;</label>
															<!-- <label><i class="fas fa-hand-holding-usd fs-2" title="Balance Amount">&emsp;</i></label> -->
															<label class="col-form-label fw-bold fs-5" id="ls_rcpt_bal_amount">8927.01</label>
														</div>
													</div>
													<div class="row mt-4">
														<div class="accordion" id="kt_accordion_item_receipt_pending_list">
													    <div class="accordion-item">
													        <h2 class="accordion-header" id="kt_accordion_item_receipt_pending_list_header_1">
													            <button class="accordion-button fw-bold fs-6 collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#kt_accordion_item_receipt_pending_list_body_1" aria-expanded="true" aria-controls="kt_accordion_item_receipt_pending_list_body_1">
													            Pending Payment Details &emsp; - &emsp; Total Amount &emsp; <span id="ls_acc_pending_bal_amount">10927.01</span> &emsp;
													            </button>
													        </h2>
													        <div id="kt_accordion_item_receipt_pending_list_body_1" class="accordion-collapse collapse show" aria-labelledby="kt_accordion_item_receipt_pending_list_header_1" data-bs-parent="#kt_accordion_item_receipt_pending_list">
													            <div class="accordion-body">
													            	<div class="row">
																					<!-- <label class="col-form-label fw-bold fs-4">Pending Payment Details</label> -->
																					<table class="table align-middle table-row-dashed table-striped table-hover fs-7 gy-4 gs-2" id="view_receipt_payment_history">
																						<thead>
																							<tr class="text-start text-muted fw-bold fs-7 gs-0">
																								<!-- <th class="min-w-25px">Sno</th> -->
																			            <th class="min-w-80px">Exp.Date</th>
																			            <th class="min-w-50px">Int %</th>
																			            <th class="min-w-80px">Principal Amount</th>
																			            <th class="min-w-80px">Interest Amount</th>
																			            <th class="min-w-80px">Total Amount</th>
																							</tr>
																						</thead> 
																						<tbody class="text-gray-600 fw-semibold" id="ls_acc_pending_detail">
																							
																					    </tbody>
																					</table>
																				</div>
													            </div>
													        </div>
													    </div>
														</div>
													</div>
													<div class="row mt-4">
														<div class="accordion" id="kt_accordion_item_receipt_paid_list">
													    <div class="accordion-item">
													        <h2 class="accordion-header" id="kt_accordion_item_receipt_paid_list_header_1">
													            <button class="accordion-button fw-bold fs-6 collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#kt_accordion_item_receipt_paid_list_body_1" aria-expanded="true" aria-controls="kt_accordion_item_receipt_paid_list_body_1">
													            Paid Receipt Details &emsp; - &emsp; Paid Amount &emsp; <span id="ls_acc_paid_amount">2000.00 </span>&emsp;
													            </button>
													        </h2>
													        <div id="kt_accordion_item_receipt_paid_list_body_1" class="accordion-collapse collapse show" aria-labelledby="kt_accordion_item_receipt_paid_list_header_1" data-bs-parent="#kt_accordion_item_receipt_paid_list">
													            <div class="accordion-body">
													            	<div class="row">
																					<!-- <label class="col-form-label fw-bold fs-4">Paid Receipt Details</label> -->
																					<table class="table align-middle table-row-dashed table-striped table-hover fs-7 gy-4 gs-2" id="view_receipt_payment_history_paid">
																						<thead>
																							<tr class="text-start text-muted fw-bold fs-7 gs-0">
																								<!-- <th class="min-w-25px">Sno</th> -->
																			            <th class="min-w-80px">Exp.Date</th>
																			            <th class="min-w-80px">Recpt Date</th>
																			            <th class="min-w-25px">Int %</th>
																			            <th class="min-w-80px">Prin Amt</th>
																			            <th class="min-w-80px">Int Amt</th>
																			            <th class="min-w-80px">Paid Amt</th>
																			            <th class="min-w-80px">Bal Amt</th>
																							</tr>
																						</thead>
																						<tbody class="text-gray-600 fw-semibold" id="ls_acc_receipt_detail">
																														
																					  </tbody>
																					</table>
																				</div>
													            </div>
													        </div>
													    </div>
														</div>
													</div>
												</div>
												<div class="tab-pane fade" id="kt_tab_pane_audit_history_loan" role="tabpanel">
													<div class="row mt-4">
														<div class="accordion" id="kt_accordion_item_receipt_pending_list">
													    <div class="accordion-item">
													        <h2 class="accordion-header" id="kt_accordion_item_receipt_pending_list_header_1">
													            <button class="accordion-button fw-bold fs-6 collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#kt_accordion_item_receipt_pending_list_body_1" aria-expanded="true" aria-controls="kt_accordion_item_receipt_pending_list_body_1">
													            Loan Audit Details
													            </button>
													        </h2>
													        <div id="kt_accordion_item_receipt_pending_list_body_1" class="accordion-collapse collapse show" aria-labelledby="kt_accordion_item_receipt_pending_list_header_1" data-bs-parent="#kt_accordion_item_receipt_pending_list">
													            <div class="accordion-body">
													            	<div class="row">
													            		<table id="kt_datatable_loan_audit_view_individual" class="table align-middle table-row-dashed table-striped table-hover fs-7 gy-1 gs-2">
																					<thead>
																					  <tr class="text-start text-muted fw-bold fs-7 gs-0">
																					  	<th class="min-w-25px">Sno</th>
																					   	<th class="min-w-80px">Date</th>
																					   	<th class="min-w-80px">Time</th>
																					   	<th class="min-w-100px">User</th>
																							<th class="min-w-80px">Item Count</th>
																							<th class="min-w-80px">Item Net Wgt(gms)</th>
																					  </tr>
																					</thead>
																					<tbody class="text-gray-600 fw-semibold">
																						<tr>
																							<td>1</td>
																	            <td>18-03-2023</td>
																	            <td>05.35 PM</td>
																	            <td>Roshan</td>
																	            <td>2</td>
																	            <td>32.800</td>
																	       	  </tr>
																					</tbody>
																				</table>
																				</div>
													            </div>
													        </div>
													    </div>
														</div>
													</div>
												</div>
												<div class="tab-pane fade" id="kt_tab_pane_lock_in_out" role="tabpanel">
													<div class="row mt-4">
														<div class="accordion" id="kt_accordion_item_receipt_pending_list">
													    <div class="accordion-item">
													        <h2 class="accordion-header" id="kt_accordion_item_receipt_pending_list_header_1">
													            <button class="accordion-button fw-bold fs-6 collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#kt_accordion_item_receipt_pending_list_body_1" aria-expanded="true" aria-controls="kt_accordion_item_receipt_pending_list_body_1">
													            Lock In/Out Details
													            </button>
													        </h2>
													        <div id="kt_accordion_item_receipt_pending_list_body_1" class="accordion-collapse collapse show" aria-labelledby="kt_accordion_item_receipt_pending_list_header_1" data-bs-parent="#kt_accordion_item_receipt_pending_list">
													            <div class="accordion-body">
													            	<div class="row">
													            		<table id="kt_datatable_loan_lock_in_out_view_individual" class="table align-middle table-row-dashed table-striped table-hover fs-7 gy-1 gs-2">
																					<thead>
																					  <tr class="text-start text-muted fw-bold fs-7 gs-0">
																					  	<th class="min-w-25px">Sno</th>
																					   	<th class="min-w-80px">Date</th>
																					   	<th class="min-w-80px">Time</th>
																					   	<th class="min-w-80px">Company</th>
																					   	<th class="min-w-100px">User</th>
																							<th class="min-w-80px">Item Count</th>
																							<th class="min-w-80px">Item Net Wgt(gms)</th>
																							<th class="min-w-80px">Status</th>
																					  </tr>
																					</thead>
																					<tbody class="text-gray-600 fw-semibold">
																						<tr>
																							<td>1</td>
																	            <td>18-03-2023</td>
																	            <td>05.35 PM</td>
																	            <td class="ple1">AGB - Main Branch sayalkudi</td>
																	            <td>Roshan</td>
																	            <td>2</td>
																	            <td>32.800</td>
																	            <td>
																								<label class="col-form-label fw-semibold fs-7"><span style="background-color:#5aad52;border-radius: 8px;padding: 5px 15px 5px 15px;">Lock In</span>
																								</label>
																							</td>
																							<!-- <td>
																								<label class="col-form-label fw-semibold fs-7"><span style="background-color:#ff0606;border-radius: 8px;padding: 5px 15px 5px 15px;">Lock Out</span>
																								</label>
																							</td> -->
																	       	  </tr>
																					</tbody>
																				</table>
																				</div>
													            </div>
													        </div>
													    </div>
														</div>
													</div>
												</div>
												<div class="tab-pane fade" id="kt_tab_pane_redemption_loan" role="tabpanel">
													<table class="table align-middle table-row-dashed table-striped table-hover fs-7 gy-1 gs-2" id="redemption_loan_table">
														<thead>
															<tr class="text-start text-muted fw-bold fs-7 gs-0">
																<th class="min-w-25px">Sno</th>
																<th class="min-w-25px">Date</th>
																<th class="min-w-80px">Company</th>
																<th class="min-w-100px">Redemption No</th>
																<th class="min-w-100px">Party Info</th>
																<th class="min-w-80px">Scheme - Int</th>
																<th class="min-w-50px">J.Type</th>
																<th class="min-w-50px">No of Item</th>
																<th class="min-w-25px">Loan Amt</th>
																<th class="min-w-150px">Status</th>
																<th class="min-w-50px"><span class="text-end">Actions</span></th>
															</tr>
														</thead>
														<tbody class="text-gray-600 fw-semibold" id="redemption_loan">
														
															<tr>
																<td>1</td>
																<td>25/03/2012</td>
																<td class="ple1">AGB - Main Branch Sayalkudi</td>
																<td class="ple1">MIP-256/22</td>
																<td class="ple1">
																	<span><i class="fa-solid fa-star fs-7" style="color:#50cd89;"></i></span>
																	<span class="align-items-center">SUBRAMANIAN</span>
																</td>
																<td>MIP - 2.5</td>
																<td>Gold</td>
																<td>3</td>
																<td class="ple1">10000.00</td>
																<td>
																	<label class="col-form-label fw-semibold fs-7" name="" id="" ><span style="background-color:#ffdf6f;border-radius: 8px;padding: 5px 15px 5px 15px;">Customer Close</span>
																	</label>
																</td>
																<td>
																	<span class="text-end">
																		<a href="#" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm" data-bs-toggle="modal" data-bs-target="#kt_modal_view_redemption">
																			<i class="bi bi-eye-fill eyc"></i>
																		</a>
																	</span>
																</td>
															</tr>
														</tbody>
													</table>
												</div>
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
		<?php $this->load->view("script"); ?>
		<input type="hidden" id="baseurl" value="<?php echo base_url(); ?>">
		<script src="<?php echo base_url();?>assets/jquery.autocomplete.js"></script>
		<script>
			$("#kt_datatable_loan_lock_in_out_view_individual").DataTable({
				"aaSorting":[],
				// "sorting":false,
				// "paging": false,
				// "responsive": true,
				 "language": {
				  "lengthMenu": "Show _MENU_",
				 },
				 "dom":
				  "<'row'" +
				  // "<'col-sm-6 d-flex align-items-center justify-conten-start'l>" +
				  ">" +

				  "<'table-responsive'tr>" +

				  "<'row'" +
				  "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
				  // "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
				  ">"
				});
			$('#kt_datatable_loan_lock_in_out_view_individual').wrap('<div class="dataTables_scroll" />');
		</script>
		<script>
	      $("#kt_datatable_loan_lock_in_out_view_individual").kendoTooltip({
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
			$("#kt_datatable_loan_audit_view_individual").DataTable({
				"aaSorting":[],
				// "sorting":false,
				// "paging": false,
				// "responsive": true,
				 "language": {
				  "lengthMenu": "Show _MENU_",
				 },
				 "dom":
				  "<'row'" +
				  // "<'col-sm-6 d-flex align-items-center justify-conten-start'l>" +
				  ">" +

				  "<'table-responsive'tr>" +

				  "<'row'" +
				  "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
				  // "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
				  ">"
				});
			$('#kt_datatable_loan_audit_view_individual').wrap('<div class="dataTables_scroll" />');
		</script>
		<script>
			$("#view_receipt_payment_history").DataTable({
				//"aaSorting":[],
				"sorting":false,
				"paging": false,
				// "responsive": true,
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
				  "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
				  ">"
				});
			$('#view_receipt_payment_history').wrap('<div class="dataTables_scroll" />');
		</script>
		<script>
			$("#view_receipt_payment_history_paid").DataTable({
				//"aaSorting":[],
				"sorting":false,
				"paging": false,
				// "responsive": true,
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
				  "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
				  ">"
				});
			$('#view_receipt_payment_history_paid').wrap('<div class="dataTables_scroll" />');
		</script>
		<script>
			$('#kt_docs_repeater_basic_silver_add').repeater({
			    initEmpty: false,

			    defaultValues: {
			        'text-input': 'foo'
			    },

			    show: function () {
			        $(this).slideDown();
			    },

			    hide: function (deleteElement) {
			        $(this).slideUp(deleteElement);
			    }
			});
		</script>
		<script>

				$("#kt_datatable_dom_positioning_view_loan").flatpickr({
								dateFormat: "d-m-Y",
							});

			$("#kt_datatable_dom_positioning_view_loan").DataTable({
				
				// "responsive": true,
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
				  "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
				  // "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
				  ">"
				});
			$('#kt_datatable_dom_positioning_view_loan').wrap('<div class="dataTables_scroll" />');

		</script>
		<script >
			var baseurl=$('#baseurl').val();
			$("#ls_bill_no").autocomplete({ 
	                valueKey:'title',
	                source:[{
	                url:baseurl+'loan/loanList?query=%QUERY%',
	                type:'remote',
	                ajax:{
	                  dataType : 'json',
	                }
	            }]}).on('selected.xdsoft',function(e,suggestion,ui){ 
	                $("#ls_firstname").html(suggestion.firstname);
	                $('#ls_pid').val(suggestion.pid);
	                $('#dis_bill_no').html($('#ls_bill_no').val());
	                ic=suggestion.address+' <i class="fas fa-info-circle fs-6" title="'+suggestion.address+'"></i>';
	                $("#ls_address").html(ic);
	                if(suggestion.rating==1){
	                	r='<i class="fa-solid fa-star" style="color:red;"></i>&nbsp;Bad';	
	                }
	                else if(suggestion.rating==2){
	                	r='<i class="fa-solid fa-star" style="color:#ffc700;"></i>&nbsp;Average';	
	                }
	                else if(suggestion.rating==3){
	                	r='<i class="fa-solid fa-star" style="color:#50cd89;"></i>&nbsp;Good';	
	                }
	                else{
	                	r='<i class="fa-solid fa-star" style="color:#d2d4dc;"></i>&nbsp; Nil';	
	                }
	                $("#ls_rating").html(r);
	                $nic=suggestion.nom_det+'&nbsp; <i class="fas fa-info-circle fs-6" title="'+suggestion.inom_det+'"></i>';

					month_int = Math.round((suggestion.loan_amt * suggestion.interest_value)/100).toFixed(2);
					// alert(month_int);
	                // $("#nominee_icon_txt").html($nic);
	                $('#ls_nominee').html($nic);
					$('#ls_phone_no').html(suggestion.phone);
	                $('#ls_party_photo').html(suggestion.party_photo);
	                $('#ls_pledge_count').html(suggestion.pl_count);
	                $('#ls_pl_count').html(suggestion.pl_count);
	                $('#ls_pledge_weight').html(suggestion.weight);
	                $('#ls_weight').html(suggestion.weight);
	                $('#ls_pledge_tbody').html(suggestion.tbody);
	                $('#ls_pledge_tfoot').html(suggestion.tfoot);
	                $("#ls_loan_date").html(suggestion.loan_dt);
	                $("#ls_rcpt_loan_date").html(suggestion.loan_dt);
					$("#ls_loan_exp_date").html(suggestion.expiry_dt);
					$("#ls_loan_amount").html(suggestion.loan_amt);
					$("#ls_rcpt_loan_amount").html(suggestion.loan_amt);
					$("#ls_loan_prin").html(suggestion.loan_amt);
					$("#ls_int_type").html(suggestion.interest);
					$("#ls_loan_int").html(month_int);
					$('#ls_jewel_photo').html(suggestion.item_photo);
					$('#loan_pay_membership_points').html(suggestion.membership_points);
					$('#redemption_loan').html(suggestion.redemptions);
					// $('#ls_loan_status').html(suggestion.loan_status1);
	        });


	    $('#ls_firstname').on('DOMSubtreeModified',function(){
  // alert('changed');
  var pid= $("#ls_pid").val();
  var bill_no= $("#ls_bill_no").val();

  // alert(pid);
  
  $.ajax({
					type: "POST",
					url: baseurl+'loan/load_other_info?',
					async: false,
					type: "POST",
					data: "id="+pid+"&bill_no="+bill_no,
					dataType: "html",
					success: function(response)
					{	
						res=response.split("||");
						$("#ls_due_status").html(res[1]);
						var ln_period=res[3]+" Months "+res[2]+" Days";
						$("#ls_loan_period").html(ln_period);
		                $('#ls_id_photo').empty().append(res[4]);
		                $('#ls_loan_status').empty().append(res[5]);
		                $('#ls_rcpt_count').html(res[6]);

					}
					});
  $.ajax({
					type: "POST",
					url: baseurl+'loan/load_popup_receipt_info',
					async: false,
					type: "POST",
					data: "&bill_no="+bill_no,
					dataType: "html",
					success: function(response)
					{	
						res=response.split("||");
						
		                $('#ls_acc_pending_detail').html(res[1]);
		                $('#ls_acc_receipt_detail').html(res[8]);
		                //$('#ls_loan_int').html(res[2]);
		                $('#ls_paid_prin').html(res[3]?res[3] :0.00 );
						$('#ls_paid_int').html(res[4]?res[4] :0.00 );
						var tot=parseFloat(res[4])+parseFloat(res[3]);
						$('#ls_acc_paid_amount').html(tot);
						$('#ls_rcpt_paid_amount').html(tot);
						$('#ls_bal_prin').html(res[7]-res[3]);
						$('#ls_bal_int').html(res[2]-res[4]);
						$('#ls_acc_pending_bal_amount').html((res[7]-res[3])+(res[2]-res[4]))
						$('#ls_rcpt_bal_amount').html((res[7]-res[3])+(res[2]-res[4]))
						$('#ls_rcpt_total_amount').html((res[7]-res[3])+(res[2]-res[4]))

					}
					});
  
  
});
$('#ls_due_status').on('DOMSubtreeModified',function(){
  // alert('changed');
  var pid= $("#ls_pid").val();
  var bill_no= $("#ls_bill_no").val();
	    $.ajax({
					type: "POST",
					url: baseurl+'loan/load_init_tab_details',
					async: false,
					type: "POST",
					data: "&bill_no="+bill_no,
					dataType: "json",
					success: function(result)
					{	
						var response= JSON.stringify(result);
						// alert(response);
						// res=response.split("||");
						if(result)
						{
							// alert(result['pay_recv_str']);
							month_int = Math.round((result['loan_details']['AMOUNT'] * result['loan_details']['INTEREST'])/100).toFixed(2);

							pay_seperate=result['PARTY_REC_SEPERATE_CHG']+result['PARTY_REC_SEPERATE_ON_ACC'];
							// alert(pay_seperate);
							$('#init_payment_to_receive').empty().append(result['pay_recv_str']);
							$('#init_to_pay_details').empty().append(result['to_pay_str']);
							
							$('#ls_init_ptr_lbl_total_charges').html(result['loan_details']['AMOUNT']);
							$('#loan_pay_total_amount').html(result['loan_details']['AMOUNT']);
							$('#loan_pay_loan_amount').html(result['loan_details']['AMOUNT']);
							$('#loan_pay_mon_int').html(month_int);
							$('#loan_pay_redemption_period').html(result['loan_details']['REDEMPTION_PERIOD']);
							$('#loan_pay_membership_points').html(result['loan_details']['MEMBERSHIP_POINTS'] ? result['loan_details']['MEMBERSHIP_POINTS'] : 0);
							$('#processing_charge').html(result['PROCESSING_CHARGE']);
							$('#doc_charge').html(result['DCAMOUNT']);
							$('#total_charge').html(result['TOTAL_CHARGE']);
							$('#proc_doc_charge_from_loan').html(result['PARTY_REC_LOAN_CHG']);
							$('#proc_doc_charge_from_seperate').html(result['PARTY_REC_SEPERATE_CHG']);
							$('#hl_amount_from_loan').html(result['PARTY_REC_LOAN_ON_ACC']);
							$('#hl_amount_from_seperate').html(result['PARTY_REC_SEPERATE_ON_ACC']);
							$('#hl_amount').html(result['HL_AMOUNT']);
							$('#loan_pay_net_amount').html(result['loan_details']['NET_PAY']);
							$('#ls_init_ptr_acc_charges_total').html(pay_seperate);
							$('#ls_init_ptr_lbl_charges_total').html(pay_seperate);
							$('#ls_to_pay_net_pay').html(result['loan_details']['NET_PAY']);
							$('#ls_to_pay_lbl_net_pay').html(result['loan_details']['NET_PAY']);


						}
						else
						{
							alert("error");

						}

					}
					});
	    });
		

		</script>
	</body>
	<!--end::Body-->
</html>