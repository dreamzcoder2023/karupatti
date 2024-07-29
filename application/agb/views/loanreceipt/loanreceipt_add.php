<?php $this->load->view("common");?>
<link href="<?php echo base_url();?>assets/jquery.autocomplete.css" rel="stylesheet" type="text/css" />
<style>
.overflow_te {
  overflow: hidden;
  -ms-text-overflow: ellipsis;
  text-overflow: ellipsis;
  white-space: nowrap;
}

.overflow_te:hover {
  overflow: visible;
}

.overflow_te:hover {
  position: relative;
  background-color: white;
  white-space: normal;
  /*box-shadow: 0 0 4px 0 black;*/
  border-radius: 1px;
}

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
									<h1 class="d-flex align-items-center text-dark fw-bold my-1 fs-3">New Receipt
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
										<form method="POST" action="<?php echo base_url();?>loanreceipt/loan_receipt_save" enctype="multipart/form-data" onsubmit="return loan_receipt_validation();">
											<!--begin::Card body-->

											<div class="card-body py-4">
												<div class="row">
													<div class="col-lg-6">
														<div class="px-4" style="border-radius: 10px;padding-bottom: 1px;box-shadow: 0 5px 10px #00002947;">
															<label class="col-lg-12 col-form-label fw-bold fs-5 text-center">Party Basic Details</label>
															<div class="row">
																<div class="col-lg-6">
																	<div class="row">
																		<label class="col-lg-4 required col-form-label fw-semibold fs-6">Loan No</label>
																		<div class="col-lg-8 fv-row fv-plugins-icon-container">
																			<input type="text" name="bill_no" class="form-control form-control-lg1 form-control-solid" placeholder="Enter Bill No" id="bill_no" value="<?php echo (isset($bill_no))?$bill_no:''; ?>" oninput="this.value = this.value.replace(/[^A-Za-z/0-9-]/g, '').replace(/(\..*)\./g, '$1');" onkeyup="first_nm_party();">
																			<div class="fv-plugins-message-container invalid-feedback" id="bill_no_err"></div>
																		</div>
																		<label class="col-lg-12 col-form-label fw-bold fs-6" id="no_card" name="no_card" style="display: none"><i class="fa fa-address-card fs-6" aria-hidden="true" title="Card No"></i>&emsp;<a href="<?php echo base_url();?>/membershipcard" target="_blank"><span style="color: red" >Click Here for<br> <b>New Membership Card</b></span></a>
																					
																					<!-- <i class="fas fa-check-circle fs-5" style="color:green;"></i> -->
																				</label>
																		<label class="col-lg-12 col-form-label fw-bold fs-6" name="lbl_card_no" id="lbl_card_no"><i class="fa fa-address-card fs-6" aria-hidden="true" title="Card No"></i>&emsp;<span id="card_no">XXXX-XXXX-XXXX-XXXX</span>
																		<span id="verify_icon"><i class="fas fa-times-circle fs-5" style="color:red;"></i></span>
																			<!-- <i class="fas fa-check-circle fs-5" style="color:green;"></i> -->
																		</label>
																		<label class="col-lg-5 col-form-label fw-bold fs-6" name="card_type" id="card_type" ><span style="background-color:#d3b97c;border-radius: 8px;padding: 5px 15px 5px 15px;">Card</span></label>
																		<label class="col-lg-4 col-form-label fw-bold fs-6" name="lbl_card_points" id="lbl_card_points" ><i class="fa-solid fa-coins fs-6" title="Points"></i>&emsp;<span id="card_points">000</span></label>
																		<div class="col-lg-3"  id="lbl_mem_verify"	>
																			<p class="btn btn-sm btn-outline btn-outline-solid btn-outline-warning btn-active-light-primary me-2" data-bs-toggle="modal" data-bs-target="#kt_modal_verify_membership_card_receipt">Verify</p>
																		</div>
																		<div class="col-lg-12">
																			<label class="col-form-label fw-semibold fs-6">Nominee &nbsp;
																				<span class="fw-bold fs-6
																				" id="nominee">Kumar-Brother-97...
																			&nbsp; <span id="nominee_icon_txt"></span></span></label>
																		</div>
																	</div>
																</div>
																<div class="col-lg-6">
																	<div class="row">
																		<label class="col-lg-12 col-form-label fw-bold fs-6" name="" id="">
																			<i class="fa fa-user fs-6" aria-hidden="true" title="Last Name"></i>&emsp;<span id="firstname">XXXXXXX</span></label>
																			<input type="hidden" name="pid" id="pid">
																		<label class="col-lg-12 col-form-label fw-bold fs-6" name="" id="">
																			<i class="fa-solid fa-location-dot fs-6" aria-hidden="true" title="Address"></i>
																		&emsp;<span id="address">12,Roja Street,Saya... &nbsp; </span><span id="icon_txt"><i class="fas fa-info-circle fs-6" title="12,Roja Street,Sayalkudi"></i></span></label>
																		<label class="col-lg-12 col-form-label fw-bold fs-6" name="" id="">
																				<i class="fas fa-mobile-android-alt fs-6" aria-hidden="true" title="Mobile"></i>
																			&emsp;<span id="phone_no">9999999999</span></label>
																		<label class="col-lg-4 col-form-label fw-semibold fs-6">Rating</label>
																		<label class="col-lg-8 col-form-label fw-bold fs-6" >
																			<span id="rating"><i class="fa-solid fa-star" ></i>&nbsp;Rating</span>
																		</label>
																	</div>
																</div>
															</div>
															<div class="row mt-4 mb-4">
																<div class="col-lg-4 fv-row">
																	<div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url(assets/media/svg/avatars/blank.svg)" id="div_party_photo">
																		<div class="image-input-wrapper"  style="background-image: url(assets/images/Party.jpg)"></div>
																	</div>
																</div>
																<div class="col-lg-4 fv-row">
																	<div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url(assets/media/svg/avatars/aadhaar_blank.png)" id="div_id_photo">
																		<div class="image-input-wrapper"  style="background-image: url(assets/images/Party_Proof.jpg)"></div>
																	</div>
																</div>
																<div class="col-lg-4 fv-row">
																	<div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url(assets/media/svg/avatars/signature_blank.png)">
																		<div class="image-input-wrapper"  style="background-image: url(assets/images/Signature.jpg)"></div>
																	</div>
																</div>
															</div>
														</div>
													</div>
													<div class="col-lg-6">
														<div class="px-4" style="border-radius: 10px;padding-bottom: 20px;box-shadow: 0 5px 10px #00002947;">
															<label class="col-lg-12 col-form-label fw-bold fs-5 text-center">Loan Information</label>
															<div class="row">
																<label class="col-lg-2 col-form-label fw-semibold fs-6">Company</label>
																<label class="col-lg-10 col-form-label fw-bold fs-6" id="company_name">Company Name</label>
																<label class="col-lg-2 col-form-label fw-semibold fs-6">Int Type</label>
																<label class="col-lg-4 col-form-label fw-bold fs-6" id="interest_type">SCH-0.00</label>
																<div class="col-lg-2" id="due_status">
																	<label class="col-form-label fw-bold fs-5 bg-success" style="border-radius: 8px;padding: 5px 10px 5px 10px;"  >Normal</label>
																</div>
																<div class="col-lg-4">
																	<label class="col-form-label fw-bold fs-6" id="period">X Month XX Days</label>
																</div>
																<label class="col-lg-2 col-form-label fw-semibold fs-6">Loan Date</label>
																<label class="col-lg-4 col-form-label fw-bold fs-6" id="loan_date">dd-mm-yyyy</label>
																<label class="col-lg-2 col-form-label fw-semibold fs-6">Exp.Date</label>
																<label class="col-lg-4 col-form-label fw-bold fs-6" id="expiry_date">dd-mm-yyyy</label>
																<div class="col-lg-6">
																	<label class="col-form-label"><i class="fas fa-money-bill-wave fs-4"></i>&emsp;</span></label>
																	<label class="col-form-label fw-bold fs-2" id="loan_amount">00.00</label>
																</div>
																<div class="col-lg-2">
																	<label class="col-form-label"><span><i class="fas fa-list-ol fs-4"></i>&emsp;</span></label>
																	<label class="col-form-label fw-bold fs-4" id="pledge_count">0</label>
																</div>
																<div class="col-lg-4">
																	<label class="col-form-label"><span><i class="fas fa-balance-scale fs-4"></i></span>&emsp;</label>
																	<label class="col-form-label fw-bold fs-4" id="net_weight">0.000</label>
																</div>
																<div class="col-lg-4 fv-row">
																	<div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url(<?php echo base_url();?>assets/images/signature_blank.jpg)" id="div_item_photo">
																		<div class="image-input-wrapper"  style="background-image: url(<?php echo base_url();?>assets/images/Jewel.jpg)"></div>
																	</div>
																</div>
																<div class="col-lg-8">
																	<div class="row">
																		<label class="col-lg-6 col-form-label fw-semibold fs-6">Last Rcpt Count & Date</label>
																		<label class="col-lg-2 col-form-label fw-bold fs-6" id="rcpt_count">X</label>
																		<label class="col-lg-4 col-form-label fw-bold fs-6" id="rcpt_date">dd-mm-yyyy</label>
																	</div>
																	<div class="row">
																		<table>
																			<thead class="fw-bold fs-6 text-center">
																				<td class="col-lg-4">Actual</td>
																				<td class="col-lg-4">Paid
																					<span style="padding:3px; border:2px solid black; "><i class="fas fa-receipt fs-4" title="Payment History" data-bs-toggle="modal" data-bs-target="#kt_modal_receipt_amount_history"></i></span></td>
																				<td class="col-lg-4">Balance</td>
																			</thead>
																			<tbody class="fw-semibold fs-6 text-center">
																				<tr>
																					<td class="col-lg-4">
																						<span>Pri : </span>
																						<span id="loan_principal">0.00</span>
																					</td>
																					<td class="col-lg-4"><span id="paid_principal">0.00</span></td>
																					<td class="col-lg-4"><span id="bal_principal">0.00</span></td>
																				</tr>
																				<tr>
																					<td class="col-lg-4">
																						<span>Int : </span>
																						<span id="loan_interest">0.00</span>
																					</td>
																					<td class="col-lg-4"><span id="paid_interest">0.00</span></td>
																					<td class="col-lg-4"><span id="bal_interest">0.00</span></td>
																				</tr>
																			</tbody>
																		</table>
																	</div>
																</div>
															</div>
															
														</div>
													</div>
												</div><br>
												<div class="row">
													<div class="accordion" id="kt_accordion_item_list">
													    <div class="accordion-item">
													        <h2 class="accordion-header" id="kt_accordion_item_list_header_1">
													            <button class="accordion-button fw-bold fs-6 collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#kt_accordion_item_list_body_1" aria-expanded="false" aria-controls="kt_accordion_item_list_body_1">
													            Pledge Info &emsp; - &emsp; Count &emsp; <span id="acc_pl_cnt">2</span> &emsp; - &emsp; Total Net Weight &emsp; <span id="acc_net_weight">32.800 </span>gms
													            </button>
													        </h2>
													        <div id="kt_accordion_item_list_body_1" class="accordion-collapse collapse" aria-labelledby="kt_accordion_item_list_header_1" data-bs-parent="#kt_accordion_item_list">
													            <div class="accordion-body">
													            	<table class="table align-middle table-row-dashed table-striped table-hover fs-7 gy-1 gs-2" id="add_receipt_payment_history_table">
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
																		<tbody class="text-gray-600 fw-semibold" id="pl_tbody">
																			
																	    </tbody>
																	    <tfoot>
																			<tr class="text-start text-muted fw-bold fs-4 gs-0" id="tfoot_total">
																	            
																			</tr>
																		</tfoot>
																	</table>
													            </div>
													        </div>
													    </div>
													</div>
												</div>
												<div class="row mt-4">
													<div class="col-lg-6">
														<div class="px-4" style="border-radius: 10px;padding-bottom: 10px;box-shadow: 0 5px 10px #00002947;">
															<label class="col-lg-12 col-form-label fw-bold fs-5 text-center">Charges</label>
															<div class="row">
																<label class="col-lg-6 col-form-label fw-semibold fs-6">Maintain Charge</label>
																<div class="col-lg-6 fv-row fv-plugins-icon-container">
																	<input type="text" name="txt_maint_chg" id="txt_maint_chg" class="form-control form-control-lg1 form-control-solid" value="0" onkeyup="calc_total_charges();" onfocus="this.select()" oninput="this.value = this.value.replace(/[^0-9. ]/g, '').replace(/(\..*)\./g, '$1');">
																	<div class="fv-plugins-message-container invalid-feedback" id="txt_maint_chg_err"></div>
																</div>
																<label class="col-lg-6 col-form-label fw-semibold fs-6">Notice Charge</label>
																<div class="col-lg-6 fv-row fv-plugins-icon-container">
																	<input type="text" name="txt_notice_chg" id="txt_notice_chg" class="form-control form-control-lg1 form-control-solid" value="0" onkeyup="calc_total_charges();" onfocus="this.select()" oninput="this.value = this.value.replace(/[^0-9. ]/g, '').replace(/(\..*)\./g, '$1');">
																	<div class="fv-plugins-message-container invalid-feedback" id="txt_notice_chg_err"></div>
																</div>
																<label class="col-lg-6 col-form-label fw-semibold fs-6">Form Missing Charge</label>
																<div class="col-lg-6 fv-row fv-plugins-icon-container">
																	<input type="text" name="txt_form_chg" id="txt_form_chg" class="form-control form-control-lg1 form-control-solid" value="0" onkeyup="calc_total_charges();" onfocus="this.select()"  oninput="this.value = this.value.replace(/[^0-9. ]/g, '').replace(/(\..*)\./g, '$1');">
																	<div class="fv-plugins-message-container invalid-feedback" id="txt_form_chg_err"></div>
																</div>
																<label class="col-lg-6 col-form-label fw-semibold fs-6">Discount(In Amt)</label>
																<div class="col-lg-6 fv-row fv-plugins-icon-container">
																	<input type="text" name="txt_discount" id="txt_discount" class="form-control form-control-lg1 form-control-solid" value="0" onkeyup="calc_total_charges();" onfocus="this.select()"  oninput="this.value = this.value.replace(/[^0-9. ]/g, '').replace(/(\..*)\./g, '$1');">
																	<div class="fv-plugins-message-container invalid-feedback" id="txt_discount_err"></div>
																</div>
																<label class="col-lg-6 col-form-label fw-semibold fs-6">Deduct From M.Card</label>
																<div class="col-lg-6">
																	<div class="fv-row fv-plugins-icon-container">
																		<input type="text" name="txt_deduct_from_card" id="txt_deduct_from_card" class="form-control form-control-lg1 form-control-solid" value="0" onkeyup="calc_total_charges();" onfocus="this.select()"  oninput="this.value = this.value.replace(/[^0-9. ]/g, '').replace(/(\..*)\./g, '$1');">
																		<div class="fv-plugins-message-container invalid-feedback" id="txt_deduct_from_card_err"></div>
																	</div>
																</div>
																
																<div class="col-lg-4">
																	<label class="col-form-label fw-bold fs-3 mt-4">Total &emsp; <span id="total_charges">0.00</span></label>
																</div>
																<div class="col-lg-8">
																	<label class="col-form-label fw-bold fs-3 mt-4">Finalized Charges &emsp; <span id="final_charges">0.00</span></label>
																</div>
																<div class="d-flex justify-content-center align-items-center">
																	
																</div>
															</div>
														</div>
													</div>
													<div class="col-lg-6">
														<div class="px-4" style="border-radius: 10px;padding-bottom: 15px;box-shadow: 0 5px 10px #00002947;">
															<label class="col-lg-12 col-form-label fw-bold fs-5 text-center">Payment To Receive</label>
															<div class="row">
																<label class="col-lg-6 col-form-label fw-semibold fs-6">Total Charges</label>
																<label class="col-lg-6 col-form-label fw-bold fs-5"><span id="ptr_total_charges"> 0.00</span></label>
																<label class="col-lg-6 col-form-label fw-semibold fs-6">H/L Balance</label>
																<label class="col-lg-6 col-form-label fw-bold fs-5"><span id="hl_bal_charge"> 0.00</span></label>
																<label class="col-lg-6 col-form-label fw-semibold fs-6">On Account</label>
																<div class="col-lg-6 fv-row fv-plugins-icon-container">
																	<input type="text" name="on_acc_charge" id="on_acc_charge" class="form-control form-control-lg1 form-control-solid" placeholder="" style="background-color: #ff5b5b; color: white" value="0" onfocus="this.select()" onkeyup="calc_total_charges();"  oninput="this.value = this.value.replace(/[^0-9. ]/g, '').replace(/(\..*)\./g, '$1');">
																	<div class="fv-plugins-message-container invalid-feedback" id="on_acc_charge_err"></div>
																</div>
																<label class="col-lg-3 col-form-label fw-semibold fs-6">Cal. Principal</label>
																<label class="col-lg-3 col-form-label fw-semibold fs-6" id="calc_principal">0.00</label>
																<input type="hidden" name="txt_calc_principal" id="txt_calc_principal"  value="0">
																<label class="col-lg-3 col-form-label fw-semibold fs-6">Cal. Interest</label>
																<label class="col-lg-3 col-form-label fw-semibold fs-6" id="calc_interest" value="0">0.00</label>
																<input type="hidden" name="txt_calc_interest" id="txt_calc_interest" value="0" >
																<label class="col-lg-6 col-form-label fw-semibold fs-6">Amount to Pay </label>
																<div class="col-lg-6 fv-row fv-plugins-icon-container">
																	<input type="text" name="txt_paid_principal" id="txt_paid_principal" class="form-control form-control-lg1 form-control-solid" placeholder="" value="0" onfocus="this.select()" onkeyup="calc_total_charges();"  oninput="this.value = this.value.replace(/[^0-9. ]/g, '').replace(/(\..*)\./g, '$1');">
																	<div class="fv-plugins-message-container invalid-feedback" id="txt_paid_principal_err"></div>
																</div>
																<label class="col-lg-3 col-form-label fw-semibold fs-6" >Paid Principal</label>
																<label class="col-lg-3 col-form-label fw-semibold fs-6" id="lbl_paid_principal">0.00</label>
																<input type="hidden" name="txt_pay_principal" id="txt_pay_principal" value="0" >
																<label class="col-lg-3 col-form-label fw-semibold fs-6">Paid Interest</label>
																<label class="col-lg-3 col-form-label fw-semibold fs-6" id="lbl_paid_interest">0.00</label>
																<input type="hidden" name="txt_pay_interest" id="txt_pay_interest" value="0">
																<label class="col-lg-3 col-form-label fw-semibold fs-6" >Bal Principal</label>
																<label class="col-lg-3 col-form-label fw-semibold fs-6" id="lbl_bal_principal">0.00</label>
																<input type="hidden" name="txt_bal_principal" id="txt_bal_principal" value="0" >
																<label class="col-lg-3 col-form-label fw-semibold fs-6">Bal Interest</label>
																<label class="col-lg-3 col-form-label fw-semibold fs-6" id="lbl_bal_interest">0.00</label>
																<input type="hidden" name="txt_bal_interest" id="txt_bal_interest" value="0">

																</div>
																<!-- <label class="col-lg-6 col-form-label fw-semibold fs-6">M.Points Add</label>
																<div class="col-lg-6 fv-row fv-plugins-icon-container">
																	<input type="text" name="m_points_ad" id="m_points_ad" class="form-control form-control-lg1 form-control-solid" value="0">
																	<div class="fv-plugins-message-container invalid-feedback"></div>
																</div> -->
																<!-- <div class="col-lg-3">
																	<button class="btn btn-sm btn-outline btn-outline-solid btn-outline-warning btn-active-light-primary me-2 mt-2" data-bs-toggle="modal" data-bs-target="#kt_modal_view_payment">Pay Now</button>
																</div> -->
																<div class="d-flex justify-content-center align-items-center">
																	<label class="col-form-label fw-bold fs-3 mt-3">Net Payable &emsp; <span id="ptr_net_payable">0.00</span></label>
																</div>
															</div>
														</div>
													</div>
												<!-- </div> -->
												<div class="row">
													<label class="col-form-label fw-bold fs-5">Party Payment Details</label>
													<div class="col-lg-2 fv-row fv-plugins-icon-container fv-plugins-bootstrap5-row-invalid">
														<div class="d-flex align-items-center mt-1">
															<label class="form-check form-check-inline form-check-solid me-5 is-invalid">
																<input class="form-check-input" name="cash_receipt_add_radio" type="checkbox" value="1" id="cash_receipt_add_radio" onclick="cash_rcpt_add_radio()">
															</label>
															<label class="col-form-label fw-semibold fs-6 me-5">Cash</label>
														</div>
													</div>
													<div class="col-lg-2 fv-row fv-plugins-icon-container fv-plugins-bootstrap5-row-invalid">
														<div class="d-flex align-items-center mt-1">
															<label class="form-check form-check-inline form-check-solid me-5 is-invalid">
																<input class="form-check-input" name="cheque_receipt_add_radio" type="checkbox" value="1" id="cheque_receipt_add_radio" onclick="cheque_rcpt_add_radio()">
															</label>
															<label class="col-form-label fw-semibold fs-6">Cheque</label>
														</div>
													</div>
													<div class="col-lg-2 fv-row fv-plugins-icon-container fv-plugins-bootstrap5-row-invalid">
														<div class="d-flex align-items-center mt-1">
															<label class="form-check form-check-inline form-check-solid me-5 is-invalid">
																<input class="form-check-input" name="rtgs_receipt_add_radio" type="checkbox" value="1" id="rtgs_receipt_add_radio" onclick="rtgs_rcpt_add_radio()">
															</label>
															<label class="col-form-label fw-semibold fs-6">RTGS</label>
														</div>
													</div>
													<div class="col-lg-2 fv-row fv-plugins-icon-container fv-plugins-bootstrap5-row-invalid">
														<div class="d-flex align-items-center mt-1">
															<label class="form-check form-check-inline form-check-solid me-5 is-invalid">
																<input class="form-check-input" name="upi_receipt_add_radio" type="checkbox" value="1" id="upi_receipt_add_radio" onclick="upi_rcpt_add_radio()">
															</label>
															<label class="col-form-label fw-semibold fs-6">UPI</label>
														</div>
													</div>
												</div>
												<div class="row">
													<label class="col-lg-1 col-form-label fw-semibold fs-6" id="cash_label" style="display:none;">Cash</label>
													<div class="col-lg-2 fv-row fv-plugins-icon-container" id="cash_label_tbox" style="display:none;">
														<input type="text" class="form-control form-control-lg form-control-solid" name="lr_pay_cash" id="lr_pay_cash" placeholder="Amount" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" value="0" onkeyup="calc_total_charges();" onfocus="this.select()">
														<div class="fv-plugins-message-container invalid-feedback" id="lr_pay_cash_err"></div>
													</div>
												</div>
												<div class="row">
													<label class="col-lg-1 col-form-label fw-semibold fs-6" id="cheque_amt" style="display:none;">Cheque</label>
													<div class="col-lg-2 fv-row fv-plugins-icon-container" id="cheque_amt_tbox" style="display:none;">
														<input type="text" name="lr_pay_cheque_amt" id="lr_pay_cheque_amt" class="form-control form-control-lg form-control-solid" placeholder="Amount" oninput="this.value = this.value.replace(/[^A-Za-z/0-9.]/g, '').replace(/(\..*)\./g, '$1');"  value="0" onkeyup="calc_total_charges();" onfocus="this.select()">
														<div class="fv-plugins-message-container invalid-feedback" id="lr_pay_cheque_amt_err"></div>
													</div>
													<label class="col-lg-1 col-form-label fw-semibold fs-6" id="cheque_bank" style="display:none;">Bank</label>
													<div class="col-lg-2 fv-row fv-plugins-icon-container" id="cheque_bank_tbox" style="display:none;">
														<select class="form-select form-select-solid" data-control="select2" data-placeholder="Select Bank" name="lr_pay_cheque_bank" id="lr_pay_cheque_bank">
															<option value="">Select</option>
															<option value="SBI">SBI</option>			
															<option value="TMB">TMB</option>
															<option value="IOB">IOB</option>
															<option value="CUB">CUB</option>
															<option value="KVB">KVB</option>
															<option value="IB">IB</option>
														</select>
														<div class="fv-plugins-message-container invalid-feedback" id="lr_pay_cheque_bank_err"></div>
													</div>
													<label class="col-lg-1 col-form-label fw-semibold fs-6" id="cheque_chq_no" style="display:none;">Cheque no</label>
													<div class="col-lg-2 fv-row fv-plugins-icon-container" id="cheque_chq_no_tbox" style="display:none;">
														<input type="text" name="lr_pay_cheque_no" id="lr_pay_cheque_no" class="form-control form-control-lg form-control-solid" placeholder="Cheque Number" oninput="this.value = this.value.replace(/[^A-Za-z/0-9.]/g, '').replace(/(\..*)\./g, '$1');">
														<div class="fv-plugins-message-container invalid-feedback" id="lr_pay_cheque_no_err"></div>
													</div>
													<label class="col-lg-1 col-form-label fw-semibold fs-6" id="cheque_detail" style="display:none;">Details</label>
													<div class="col-lg-2 fv-row fv-plugins-icon-container" id="cheque_detail_tbox" style="display:none;">
														<textarea class="form-control form-control-solid" rows="1" placeholder="Details" name="lr_pay_cheque_detail" id="lr_pay_cheque_detail"></textarea>
														<div class="fv-plugins-message-container invalid-feedback" id="lr_pay_cheque_detail_err"></div>
													</div>
												</div>
												<div class="row">
													<label class="col-lg-1 col-form-label fw-semibold fs-6" id="rtgs_amt" style="display:none;">RTGS</label>
													<div class="col-lg-2 fv-row fv-plugins-icon-container" id="rtgs_amt_tbox" style="display:none;">
														<input type="text" name="lr_pay_rtgs_amt" id="lr_pay_rtgs_amt" class="form-control form-control-lg form-control-solid" placeholder="Amount" oninput="this.value = this.value.replace(/[^A-Za-z/0-9.]/g, '').replace(/(\..*)\./g, '$1');"  value="0" onkeyup="calc_total_charges();" onfocus="this.select()">
														<div class="fv-plugins-message-container invalid-feedback" id="lr_pay_rtgs_amt_err"></div>
													</div>
													<label class="col-lg-1 col-form-label fw-semibold fs-6" id="rtgs_bank" style="display:none;">Bank</label>
													<div class="col-lg-2 fv-row fv-plugins-icon-container" id="rtgs_bank_tbox" style="display:none;">
														<select class="form-select form-select-solid" data-control="select2"  data-placeholder="Select Bank" name="lr_pay_rtgs_bank" id="lr_pay_rtgs_bank">
															<option value="">Select</option>
															<option value="SBI">SBI</option>			
															<option value="TMB">TMB</option>
															<option value="IOB">IOB</option>
															<option value="CUB">CUB</option>
															<option value="KVB">KVB</option>
															<option value="IB">IB</option>
														</select>
														<div class="fv-plugins-message-container invalid-feedback" id="lr_pay_rtgs_bank_err"></div>
													</div>
													<label class="col-lg-1 col-form-label fw-semibold fs-6" id="rtgs_no" style="display:none;">RTGS No</label>
													<div class="col-lg-2 fv-row fv-plugins-icon-container" id="rtgs_no_tbox" style="display:none;">
														<input type="text" name="lr_pay_rtgs_no" id="lr_pay_rtgs_no" class="form-control form-control-lg form-control-solid" placeholder="RTGS Trans No" oninput="this.value = this.value.replace(/[^A-Za-z/0-9.]/g, '').replace(/(\..*)\./g, '$1');">
														<div class="fv-plugins-message-container invalid-feedback" id="lr_pay_rtgs_no_err"></div>
													</div>
													<label class="col-lg-1 col-form-label fw-semibold fs-6" id="rtgs_detail" style="display:none;">Details</label>
													<div class="col-lg-2 fv-row fv-plugins-icon-container" id="rtgs_detail_tbox" style="display:none;">
														<textarea class="form-control form-control-solid" rows="1" placeholder="Details" name="lr_pay_rtgs_detail" id="lr_pay_rtgs_detail"></textarea>
														<div class="fv-plugins-message-container invalid-feedback" id="lr_pay_rtgs_detail_err"></div>
													</div>
												</div>
												<div class="row">
													<label class="col-lg-1 col-form-label fw-semibold fs-6" id="upi_amt" style="display:none;">UPI</label>
													<div class="col-lg-2 fv-row fv-plugins-icon-container" id="upi_amt_tbox" style="display:none;">
														<input type="text" name="lr_pay_upi_amt" id="lr_pay_upi_amt" class="form-control form-control-lg form-control-solid" placeholder="Amount"  value="0" onkeyup="calc_total_charges();" onfocus="this.select()">
														<div class="fv-plugins-message-container invalid-feedback" id="lr_pay_upi_amt_err"></div>
													</div>
													<label class="col-lg-1 col-form-label fw-semibold fs-6" id="upi_trans_no" style="display:none;">Trans No</label>
													<div class="col-lg-2 fv-row fv-plugins-icon-container" id="upi_trans_no_tbox" style="display:none;">
														<input type="text" name="lr_pay_upi_no" id="lr_pay_upi_no" class="form-control form-control-lg form-control-solid" placeholder="Transaction No">
														<div class="fv-plugins-message-container invalid-feedback" id="lr_pay_upi_no_err"></div>
													</div>
													<label class="col-lg-1 col-form-label fw-semibold fs-6" id="upi_detail" style="display:none;">Details</label>
													<div class="col-lg-2 fv-row fv-plugins-icon-container" id="upi_detail_tbox" style="display:none;">
														<textarea class="form-control form-control-solid" rows="1" placeholder="Details" name="lr_pay_upi_detail" id="lr_pay_upi_detail"></textarea>
														<div class="fv-plugins-message-container invalid-feedback" id="lr_pay_upi_detail_err"></div>
													</div>

												</div>
												<div class="row">
													<div class="col-lg-4 text-center">
														<label class="col-form-label fw-semibold fs-6">Net Payable &emsp;</label>
														<label class="col-form-label fw-bold fs-2"><span id="final_net_payable">00.00</span></label>
													</div>
													<div class="col-lg-4 text-center">
														<label class="col-form-label fw-semibold fs-6">Paid Amount &emsp;</label>
														<label class="col-form-label fw-bold fs-2" id=""><span id="final_paid_amt">0.00</span></label>
													</div>
													<div class="col-lg-4 text-center">
														<label class="col-form-label fw-semibold fs-6">Balance Amount &emsp;</label>
														<label class="col-form-label fw-bold fs-2" id=""><span id="final_bal_amt">00.00</span></label>
													</div>
												</div>
												<div class="row">
													<label class="col-lg-2 col-form-label fw-semibold fs-6">Customer Rating</label>
													<div class="col-lg-2 fv-row fv-plugins-icon-container">
														<select class="form-select form-select-solid" data-control="select2" data-hide-search="true" name="lr_cust_rating" id="lr_cust_rating" onchange="set_customer_rating()">
															<!-- <option value="">Select Rating</option> -->
															<option value="3" selected>Good</option>
															<option value="2">Average</option>
															<option value="1">Bad</option>
														</select>
													</div>
													<label class="col-lg-2 col-form-label fw-semibold fs-6">M.Points Add</label>
													<div class="col-lg-2 fv-row fv-plugins-icon-container">
														<input type="text" name="m_points_ad" id="m_points_ad" class="form-control form-control-lg1 form-control-solid" value="0" readonly>
														<div class="fv-plugins-message-container invalid-feedback"></div>
													</div>
												</div>
												<div class="d-flex justify-content-end py-4">
													<button class="btn btn-secondary me-2" data-bs-dismiss="modal" onclick="close_loan_receipt_add_Modal();">Cancel</button>
													<button class="btn btn-primary" id="save_changes_set_loan_receipts">Save Changes</button>
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
	<!--begin::Modal - kt_modal_verify_membership_card_receipt-->
	<div class="modal fade" id="kt_modal_verify_membership_card_receipt" tabindex="-1" aria-hidden="true">
		<!--begin::Modal dialog-->
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
				<!--begin::Modal body-->
				
				<div class="modal-body pt-0 pb-15 px-5 px-xl-20">
					<!--begin::Heading-->
					<div class="mb-13 text-center">
						<h1 class="mb-3">Verify Membership Card</h1>
					</div>
					<!--end::Heading-->
					<!--end::Heading-->					
					<div class="row">
					
						<label class="col-lg-12 col-form-label fw-bold fs-5" name="" id=""><i class="fa fa-address-card fs-5" aria-hidden="true" title="Card No" ></i>&emsp;<span id="pop_member_card"></span>
						</label>
						<label class="col-lg-4 col-form-label fw-bold fs-6" name="pop_card_type" id="pop_card_type" ><span style="background-color:#FFAA00;border-radius: 8px;padding: 5px 15px 5px 15px;">Gold</span></label>
						<label class="col-lg-4 col-form-label fw-bold fs-5"name ="" id=""><i class="fa-solid fa-coins fs-5" title="Points" ></i>&emsp;<span id="pop_member_points"></span></label>
					</div>
					<div class="row">
						<label class="col-lg-4 col-form-label fw-semibold fs-6">Scan Here</label>
						<div class="col-lg-8 fv-row fv-plugins-icon-container">
							<input type="text" class="form-control form-control-lg form-control-solid" placeholder="Scan Here" id="check_card_no" name="check_card_no">
							<div class="fv-plugins-message-container invalid-feedback"></div>
						</div>
					</div>
					<div class="row">
						<label class="col-lg-8 col-form-label fw-bold fs-6 text-end" name="" id="" >
							<!-- <span style="background-color:#f1416c;border-radius: 8px;padding: 5px 15px 5px 15px;color: white;">Not Matched...</span> -->
							<!-- <span style="background-color:#50cd89;border-radius: 8px;padding: 5px 15px 5px 15px;">Verifying...</span> -->
							<span style="background-color:#50cd89;border-radius: 8px;padding: 5px 15px 5px 15px;">Matched...</span>
						</label>
						<div class="col-lg-4 d-flex justify-content-end">
							<button class="btn btn-sm btn-outline btn-outline-solid btn-outline-warning btn-active-light-primary me-2" data-bs-toggle="modal" data-bs-target="#" onclick="check_card();">Verify</button>
						</div>
					</div>
					<div class="d-flex justify-content-end mt-6 px-9">
						<button type="reset" class="btn btn-secondary me-3" data-bs-dismiss="modal">Cancel</button>
						<button type="submit" class="btn btn-primary">Ok</button>
					</div>
					<!--end::Modal body-->
				</div>
				<!--end::Modal content-->
			</div>
			<!--end::Modal dialog-->
		</div>
		<!--end::Modal - kt_modal_verify_membership_card_receiptt-->
	</div>
	<!--end::Modal - delete loan-->
	<!--begin::Modal - kt_modal_receipt_amount_history-->
	<div class="modal fade" id="kt_modal_receipt_amount_history" tabindex="-1" aria-hidden="true">
		<!--begin::Modal dialog-->
		<div class="modal-dialog modal-lg">
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
					<div class="mb-3 text-center">
						<h1 class="mb-3">Payment History</h1>
					</div>
					<!--end::Heading-->
					<!--end::Heading-->	
					<div class="row">
						<label class="col-lg-2 col-form-label fw-semibold fs-6">Loan Date</label>
						<label class="col-lg-2 col-form-label fw-bold fs-4" id="pop_loan_date">dd-mm-yyy</label>
						<label class="col-lg-2 col-form-label fw-semibold fs-6">Loan Amount</label>
						<label class="col-lg-2 col-form-label fw-bold fs-4" id="pop_loan_amount">0.00</label>
						<label class="col-lg-2 col-form-label fw-semibold fs-6">Int Type</label>
						<label class="col-lg-2 col-form-label fw-bold fs-4" id="pop_interest">SCH-0.0</label>

						<table class="table align-middle table-row-dashed table-striped table-hover fs-7 gy-1 gs-2" id="add_receipt_payment_history">
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
							<tbody class="text-gray-600 fw-semibold" id="tbody_paid_history">
												
						    </tbody>
						</table>
					</div>	
					<!--end::Modal body-->
				</div>
				<!--end::Modal content-->
			</div>
			<!--end::Modal dialog-->
		</div>
		<!--end::Modal - kt_modal_verify_membership_card_receiptt-->
	</div>
	<!--end::Modal - kt_modal_receipt_amount_history-->
	
	<?php $this->load->view("script");?>
	<input type="hidden" id="baseurl" value="<?php echo base_url(); ?>">
		<script src="<?php echo base_url();?>assets/jquery.autocomplete.js"></script>

	<script>
			function cash_rcpt_add_radio()
			{
				var cash_receipt_add_radio = document.getElementById("cash_receipt_add_radio");

				var cash_label = document.getElementById("cash_label");
				var cash_label_tbox = document.getElementById("cash_label_tbox");

				if (cash_receipt_add_radio.checked)
				{
				    cash_label.style.display = "block";
				    cash_label_tbox.style.display = "block";
			  	} else 
			  	{
			  		cash_label.style.display = "none";
			  		cash_label_tbox.style.display = "none";
			  	}
			};

			function cheque_rcpt_add_radio()
			{
				var cheque_receipt_add_radio = document.getElementById("cheque_receipt_add_radio");

				var cheque_amt = document.getElementById("cheque_amt");
				var cheque_amt_tbox = document.getElementById("cheque_amt_tbox");
				var cheque_bank = document.getElementById("cheque_bank");
				var cheque_bank_tbox = document.getElementById("cheque_bank_tbox");
				var cheque_chq_no = document.getElementById("cheque_chq_no");
				var cheque_chq_no_tbox = document.getElementById("cheque_chq_no_tbox");
				var cheque_detail = document.getElementById("cheque_detail");
				var cheque_detail_tbox = document.getElementById("cheque_detail_tbox");

				if (cheque_receipt_add_radio.checked)
				{
				    cheque_amt.style.display = "block";
				    cheque_amt_tbox.style.display = "block";
				    cheque_bank.style.display = "block";
				    cheque_bank_tbox.style.display = "block";
				    cheque_chq_no.style.display = "block";
				    cheque_chq_no_tbox.style.display = "block";
				    cheque_detail.style.display = "block";
				    cheque_detail_tbox.style.display = "block";

			  	} else 
			  	{
			     	cheque_amt.style.display = "none";
				    cheque_amt_tbox.style.display = "none";
				    cheque_bank.style.display = "none";
				    cheque_bank_tbox.style.display = "none";
				    cheque_chq_no.style.display = "none";
				    cheque_chq_no_tbox.style.display = "none";
				    cheque_detail.style.display = "none";
				    cheque_detail_tbox.style.display = "none";
			  	}
			};

			function rtgs_rcpt_add_radio()
			{
				var rtgs_receipt_add_radio = document.getElementById("rtgs_receipt_add_radio");

				var rtgs_amt = document.getElementById("rtgs_amt");
				var rtgs_amt_tbox = document.getElementById("rtgs_amt_tbox");
				var rtgs_bank = document.getElementById("rtgs_bank");
				var rtgs_bank_tbox = document.getElementById("rtgs_bank_tbox");
				var rtgs_no = document.getElementById("rtgs_no");
				var rtgs_no_tbox = document.getElementById("rtgs_no_tbox");
				var rtgs_detail = document.getElementById("rtgs_detail");
				var rtgs_detail_tbox = document.getElementById("rtgs_detail_tbox");

				if (rtgs_receipt_add_radio.checked == true)
				{
				    rtgs_amt.style.display = "block";
				    rtgs_amt_tbox.style.display = "block";
				    rtgs_bank.style.display = "block";
				    rtgs_bank_tbox.style.display = "block";
				    rtgs_no.style.display = "block";
				    rtgs_no_tbox.style.display = "block";
				    rtgs_detail.style.display = "block";
				    rtgs_detail_tbox.style.display = "block";
			  	} else 
			  	{
			     	rtgs_amt.style.display = "none";
				    rtgs_amt_tbox.style.display = "none";
				    rtgs_bank.style.display = "none";
				    rtgs_bank_tbox.style.display = "none";
				    rtgs_no.style.display = "none";
				    rtgs_no_tbox.style.display = "none";
				    rtgs_detail.style.display = "none";
				    rtgs_detail_tbox.style.display = "none";
			  	}
			};

			function upi_rcpt_add_radio()
			{
				var upi_receipt_add_radio = document.getElementById("upi_receipt_add_radio");

				var upi_amt = document.getElementById("upi_amt");
				var upi_amt_tbox = document.getElementById("upi_amt_tbox");
				var upi_trans_no = document.getElementById("upi_trans_no");
				var upi_trans_no_tbox = document.getElementById("upi_trans_no_tbox");
				var upi_detail = document.getElementById("upi_detail");
				var upi_detail_tbox = document.getElementById("upi_detail_tbox");

				if (upi_receipt_add_radio.checked == true)
				{
				    upi_amt.style.display = "block";
				    upi_amt_tbox.style.display = "block";
				    upi_trans_no.style.display = "block";
				    upi_trans_no_tbox.style.display = "block";
				    upi_detail.style.display = "block";
				    upi_detail_tbox.style.display = "block";
			  	} else 
			  	{
			     	upi_amt.style.display = "none";
				    upi_amt_tbox.style.display = "none";
				    upi_trans_no.style.display = "none";
				    upi_trans_no_tbox.style.display = "none";
				    upi_detail.style.display = "none";
				    upi_detail_tbox.style.display = "none";
			  	}
			};
		</script>
	<script>
	function check_card()
{
	var chk=$('#check_card_no').val();
	var no=$('#pop_member_card').html();
	
	if(no!="" && chk!="")
	{
	
	if(no==chk){
		// alert('matched');
		$('#verify_icon').html('<i class="fas fa-check-circle fs-5" style="color:green;"></i>');
		document.getElementById('btn_verify_popup').style.display='none';
	}
	else{
		 //alert('not matched');
		$('#verify_icon').html('<i class="fas fa-times-circle fs-5" style="color:red;"></i>');
		document.getElementById('btn_verify_popup').style.display='block';	
	}	
	}
	else
	{
		alert("Enter Card no to Verify");
	}

}

	$("#add_receipt_payment_history_table").DataTable({
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
	$('#add_receipt_payment_history_table').wrap('<div class="dataTables_scroll" />');
</script>
<script>
	$("#add_receipt_payment_history").DataTable({
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
		  // "<'col-sm-12 d-flex align-items-center justify-content-end'f>" +
		  ">" +

		  "<'table-responsive'tr>" +

		  "<'row'" +
		  // "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
		  // "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
		  ">"
		});
	$('#add_receipt_payment_history').wrap('<div class="dataTables_scroll" />');
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

				$("#kt_datepicker_From_loan_receipts").flatpickr({
					dateFormat: "d-m-Y",
				});
				$("#kt_datepicker_To_loan_receipts").flatpickr({
					dateFormat: "d-m-Y",
				});
				$("#kt_datepicker_add_loan_receipts_date").flatpickr({
					dateFormat: "d-m-Y",
				});
				$("#kt_datepicker_edit_loan_receipts_date").flatpickr({
					dateFormat: "d-m-Y",
				});
				$("#kt_datepicker_view_loan_receipts_date").flatpickr({
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
		<script>
			var span = document.querySelector('#firstname');

			var baseurl="<?php echo base_url();?>";

			$(document).ready(function(){
				
				var bill_no=$('#bill_no').val();
				if(bill_no!='')
				{
					// alert(bill_no);
					// $("#bill_no").select();
					
					$('.xdsoft_autocomplete_dropdown').attr("style","left: 0px; top: 31px; margin-left: 0px; margin-right: 0px; width: 170px; display: block; max-height: 235005px;");
					$('.xdsoft_autocomplete_dropdown').append('<div class="active" data-value="'+bill_no+'" style="padding-left: 3.9px; padding-right: 3.9px;"><b>'+bill_no+'</b></div>');
					// $('.xdsoft_autocomplete_dropdown .active').focus();
					$("#bill_no").focus();
					// '<div class="xdsoft_autocomplete_dropdown" style="left: 0px; top: 31px; margin-left: 0px; margin-right: 0px; width: 170px; display: none; max-height: 235005px;"><div class="active" data-value="TIP-1597%2F22" style="padding-left: 3.9px; padding-right: 3.9px;"><b>'+bill_no+'</b></div></div>'
					
				}
				
			});
			
			$("#bill_no").autocomplete({ 
	                valueKey:'title',
	                source:[{
	                url:baseurl+'loanreceipt/loanList?query=%QUERY%',
	                type:'remote',
	                ajax:{
	                  dataType : 'json',
	                }
	            }]}).on('selected.xdsoft',function(e,suggestion,ui){ 
	                $("#firstname").html(suggestion.firstname);
	                $('#pid').val(suggestion.pid);
	                // $('#p_pid').val(suggestion.id);
	                
	                // var txt=suggestion.lastname+'&emsp; &emsp;<a target="_blank" href="<?php echo base_url();?>party/party_view/'+suggestion.id+'"><i class="fas fa-mail-bulk" title=" View Party"></i></a>';
	                // $("#last_name").html(txt);
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
	                $("#rating").html(r);
	                $("#address").html(suggestion.address1);
	                ic='<i class="fas fa-info-circle fs-6" title="'+suggestion.address+'"></i>';
	                $("#icon_txt").html(ic);
	                $nic=suggestion.nom_det+'&nbsp; <i class="fas fa-info-circle fs-6" title="'+suggestion.inom_det+'"></i>';
	                // $("#nominee_icon_txt").html($nic);
	                $('#nominee').html($nic)
	                $("#phone_no").html(suggestion.phone);
					$("#company_name").html(suggestion.company);
					$("#interest_type").html(suggestion.interest);
					$("#pop_interest").html(suggestion.interest);
					$("#loan_date").html(suggestion.loan_dt);
					$("#pop_loan_date").html(suggestion.loan_dt);
					$("#expiry_date").html(suggestion.expiry_dt);
					$("#loan_amount").html(suggestion.loan_amt);
					$("#pop_loan_amount").html(suggestion.loan_amt);
					$("#net_weight").html(suggestion.weight);
					$("#pledge_count").html(suggestion.pl_count);
					$("#acc_pl_cnt").html(suggestion.pl_count);
					$("#acc_net_weight").html(suggestion.weight);
					$("#pl_tbody").html(suggestion.tbody);
					$("#tfoot_total").html(suggestion.tfoot);
					
	                $('#div_party_photo').html(suggestion.party_photo);
	                // $('#div_item_photo').html(suggestion.item_photo);
	                if(suggestion.member_points==0)
	                {
	                	document.getElementById('no_card').style.display="block";
	                	document.getElementById('lbl_card_no').style.display="none";
	                	document.getElementById('card_type').style.display="none";
	                	document.getElementById('lbl_card_points').style.display="none";
	                	document.getElementById('lbl_mem_verify').style.display="none";
	                }
	            	else
	            	{
	            		document.getElementById('no_card').style.display="none";
	                	document.getElementById('lbl_card_no').style.display="block";
	                	document.getElementById('card_type').style.display="block";
	                	document.getElementById('lbl_card_points').style.display="block";
	                	document.getElementById('lbl_mem_verify').style.display="block";
		                $("#card_no").html(suggestion.member_id);
						$("#pop_member_card").html(suggestion.member_id);
		                $("#card_type").html(suggestion.card_type);
						$("#pop_card_type").html(suggestion.card_type);
						$("#pop_member_points").html(suggestion.member_points);
		                // $("#pop_member_card").html(suggestion.member_id);
		                $("#card_points").html(suggestion.member_points);
		                // $("#pop_member_points").html(suggestion.member_points);
	                
	                }
	        });

var span = document.querySelector('#ptr_net_payable');
$('#ptr_net_payable').on('DOMSubtreeModified',function(){
			 var net_pay= parseFloat($("#ptr_net_payable").html());

	$.ajax({
					type: "POST",
					url: baseurl+'loanreceipt/calc_mem_points',
					async: false,
					type: "POST",
					data: "&receipt_amount="+net_pay,
					dataType: "html",
					success: function(response)
					{	
							res=response.trim();
							$('#m_points_ad').val(res);
						
					}
					});
	});
$('#firstname').on('DOMSubtreeModified',function(){
  // alert('changed');
  var pid= $("#pid").val();
  var bill_no= $("#bill_no").val();

  // alert(pid);
  
  $.ajax({
					type: "POST",
					url: baseurl+'loanreceipt/load_other_info?',
					async: false,
					type: "POST",
					data: "id="+pid+"&bill_no="+bill_no,
					dataType: "html",
					success: function(response)
					{	
						res=response.split("||");
						// alert(response);
						$("#due_status").html(res[1]);
						$("#rcpt_count").html(res[2]);
						$("#rcpt_date").html(res[3]);
						var ln_period=res[5]+" Months "+res[4]+" Days";
						$("#period").html(ln_period);
						$('#loan_principal').html(res[6]);
						// $('#loan_interest').html(res[7]);
						// $('#paid_principal').html(res[8]);
						// $('#paid_interest').html(res[9]);
						// $('#bal_principal').html(res[10]);
						// $('#bal_interest').html(res[11]);
		                $('#div_item_photo').empty().append(res[12]);
					}
					});
  $.ajax({
					type: "POST",
					url: baseurl+'loanreceipt/load_popup_receipt_info',
					async: false,
					type: "POST",
					data: "&bill_no="+bill_no,
					dataType: "html",
					success: function(response)
					{	
						res=response.split("||");
						
		                $('#tbody_paid_history').html(res[1]);
		                $('#loan_interest').html(res[2]);
		                $('#paid_principal').html(res[3]);
						$('#paid_interest').html(res[4]);
						$('#bal_principal').html(res[7]-res[3]);
						$('#bal_interest').html(res[2]-res[4]);
						$('#calc_principal').html(res[7]-res[3]);
						$('#calc_interest').html(res[2]-res[4]);
						$('#txt_calc_principal').val(res[7]-res[3]);
						$('#txt_calc_interest').val(res[2]-res[4]);
						
					}
					});
  
});
	         
		</script>
		<script >

			function calc_total_charges()
			{
				var m=parseFloat( $('#txt_maint_chg').val());
				var n= parseFloat($('#txt_notice_chg').val());
				var f=parseFloat($('#txt_form_chg').val());

				var d=parseFloat($('#txt_discount').val());
				var dc=parseFloat($('#txt_deduct_from_card').val());

				if(m=="") m=0;
				if(n=="") n=0;
				if(f=="") f=0;
				if(d=="") d=0;
				if(dc=="") dc=0;

				var ad_chg=m+n+f;
				var sub_chg=d+dc;

				var tot=ad_chg-sub_chg;
				$('#final_charges').html(tot.toFixed(2));
				$('#ptr_total_charges').html(tot.toFixed(2));
				$('#ptr_net_payable').html(tot.toFixed(2));
				$('#final_net_payable').html(tot.toFixed(2));
				$('#total_charges').html(tot.toFixed(2));

				var on_acc=parseFloat($('#on_acc_charge').val());
				var princ=parseFloat($('#txt_paid_principal').val());
				

				if(princ>0)
				{
					var cint=parseFloat($('#calc_interest').html());
					var cprin=parseFloat($('#calc_principal').html());
					$('#lbl_paid_interest').html(cint.toFixed(2));
					$('#txt_pay_interest').val(cint.toFixed(2));	
					// var ctot=cint+cprin;
					var rem=princ-cint;
					if(rem>0)
					{
						rem_p=(cprin-rem);
						$('#lbl_paid_principal').html(rem.toFixed(2));	
						$('#txt_pay_principal').val(rem.toFixed(2));	
						$('#lbl_bal_principal').html(rem_p.toFixed(2));	
						$('#txt_bal_principal').val(rem_p.toFixed(2));

						$('#lbl_bal_interest').html('0.00');
						$('#txt_bal_interest').val('0.00');	
					}
					else
					{
						
						$('#lbl_paid_principal').html("0.00");	
						$('#txt_pay_principal').val("0.00");	
						$('#lbl_paid_interest').html(princ.toFixed(2));
						$('#txt_pay_interest').val(	princ.toFixed(2));
						var rem_i=cint-princ;
						$('#lbl_bal_interest').html(rem_i.toFixed(2));
						$('#txt_bal_interest').val(rem_i.toFixed(2));
					}
				}
				else
				{
					$('#lbl_paid_interest').html("0.00");
					$('#txt_pay_interest').val("0.00");
					$('#lbl_paid_principal').html("0.00");
					$('#txt_pay_principal').val("0.00");
				}

				var ptr_tot=tot+on_acc+princ;
				$('#ptr_net_payable').html(ptr_tot.toFixed(2));	
				$('#final_net_payable').html(ptr_tot.toFixed(2));	

				var np=$('#final_net_payable').html();	
				var cash=parseFloat($('#lr_pay_cash').val());
				var chq=parseFloat($('#lr_pay_cheque_amt').val());
				var rtgs=parseFloat($('#lr_pay_rtgs_amt').val());
				var upi=parseFloat($('#lr_pay_upi_amt').val());

				var pa_tot=cash+chq+rtgs+upi;
				$('#final_paid_amt').html(pa_tot.toFixed(2));	
				
				var fbal=np-pa_tot;
				$('#final_bal_amt').html(fbal.toFixed(2));

			}
		</script>
		<script >
			function set_customer_rating()
			{
				// alert("hi")
				
				var pid=$('#pid').val();
				var bill_no=$('#bill_no').val();
				// alert(r);
				if(pid=="")
				{
					alert("Enter Bill No");
					// $('#cust_rating').val("");
					document.getElementById("bill_no").focus();
				}
				else
				{
					var r=$('#lr_cust_rating').val();

				$.ajax({
					type: "POST",
					url: baseurl+'loanreceipt/set_customer_rating?',
					async: false,
					type: "POST",
					data: "val="+r+"&id="+pid+"&bill_no="+bill_no,
					dataType: "html",
					success: function(response)
					{	
		                alert('Rating updated');
					}
					});
				}

			}
		</script>
		<script>
		
			function loan_receipt_validation()
			{
				var err=0;
				var bill_no=$('#bill_no').val();
				if(bill_no.trim()=="")
				{
					$('#bill_no_err').html("Enter Bill No");
					err++;
				}
				else
				{	$('#bill_no_err').html("");	}


				var mc=$('#txt_maint_chg').val();
				if(mc.trim()=="")
				{
					$('#txt_maint_chg_err').html("Enter Maintenance Charge");
					err++;
				}
				else
				{	$('#txt_maint_chg_err').html("");	}


				var nc=$('#txt_notice_chg').val();
				if(nc.trim()=="")
				{
					$('#txt_notice_chg_err').html("Enter Notice Charge");
					err++;
				}
				else
				{	$('#txt_notice_chg_err').html("");	}
				

				var fc=$('#txt_form_chg').val();
				if(fc.trim()=="")
				{
					$('#txt_form_chg_err').html("Enter Form Charge");
					err++;
				}
				else
				{ $('#txt_form_chg_err').html("");	}


				var dc=$('#txt_discount').val();
				if(dc.trim()=="")
				{
					$('#txt_discount_err').html("Enter Discount");
					err++;
				}
				else
				{	$('#txt_discount_err').html("");	}


				var dd=$('#txt_deduct_from_card').val();
				if(dd.trim()=="")
				{
					$('#txt_deduct_from_card_err').html("Enter Member Points to Deduct");
					err++;
				}
				else
				{ $('#txt_deduct_from_card_err').html("");	}


				var oc=$('#on_acc_charge').val();
				if(oc.trim()=="")
				{
					$('#on_acc_charge_err').html("Enter HL Trans Amount");
					err++;
				}
				else
				{	$('#on_acc_charge_err').html("");		}


				var pp=$('#txt_paid_principal').val();
				if(pp.trim()=="")
				{
					$('#txt_paid_principal_err').html("Enter value for Amount to Pay");
					err++;
				}
				else
				{ 
						$('#txt_paid_principal_err').html("");	
						if(pp<=0)
						{
								$('#txt_paid_principal_err').html("Enter value for Amount to Pay");
								err++;
						}
				}



				// var pi=$('#txt_paid_interest').val();
				// if(pi.trim()=="")
				// {
				// 	$('#txt_paid_interest_err').html("Enter Interest");
				// 	err++;
				// }
				// else
				// {	$('#txt_paid_interest_err').html("");	}


				var cr=$('#lr_cust_rating').val();
				if(cr.trim()=="")
				{
					$('#lr_cust_rating_err').html("Enter Customer Rating");
					err++;
				}
				else
				{	$('#lr_cust_rating_err').html("");	}


				var mp=$('#m_points_ad').val();
				if(mp.trim()=="")
				{
					$('#m_points_ad_err').html("Enter Member Points");
					err++;
				}
				else
				{	$('#m_points_ad_err').html("");		}


				var cash_receipt_add_radio = document.getElementById("cash_receipt_add_radio");
				if (cash_receipt_add_radio.checked)
				{
				    // lr_pay_cash
				    var lr_cash=$('#lr_pay_cash').val();
				    if(lr_cash.trim()=="" )
							{
								$('#lr_pay_cash_err').html("Enter Cash Payment");
								err++;
							}
							else if(lr_cash==0)
							{
								$('#lr_pay_cash_err').html("Enter Cash Payment greater than Zero");
								err++;
							}
							else
							{	$('#lr_pay_cash_err').html("");		}
				// alert("cash");	

				} 

				var cheque_receipt_add_radio = document.getElementById("cheque_receipt_add_radio");
				if (cheque_receipt_add_radio.checked)
				{
				    // lr_pay_cash
				    var lr_pay_cheque_amt=$('#lr_pay_cheque_amt').val();
				    if(lr_pay_cheque_amt.trim()=="" )
							{
								$('#lr_pay_cheque_amt_err').html("Enter Cheque Payment");
								err++;
							}
							else if(lr_pay_cheque_amt==0)
							{
								$('#lr_pay_cheque_amt_err').html("Enter Cheque Payment greater than Zero");
								err++;
							}
							else
							{	$('#lr_pay_cheque_amt_err').html("");		}

							var lr_pay_cheque_bank=$('#lr_pay_cheque_bank').val();
							if(lr_pay_cheque_amt > 0){
								if(lr_pay_cheque_bank.trim()=="" )
								{
									$('#lr_pay_cheque_bank_err').html("Enter Cheque Bank");
									err++;
								}
								else if(lr_pay_cheque_bank==0)
								{
									$('#lr_pay_cheque_bank_err').html("Enter Cheque Bank ");
									err++;
								}
								else
								{	$('#lr_pay_cheque_bank_err').html("");		}

								var lr_pay_cheque_no=$('#lr_pay_cheque_no').val();
								if(lr_pay_cheque_no.trim()=="" )
								{
									$('#lr_pay_cheque_no_err').html("Enter Cheque No");
									err++;
								}
								else
								{	$('#lr_pay_cheque_no_err').html("");		}
							}

							//COMMENTED BY DIVYA t (11-10-2023)
							// var lr_pay_cheque_detail=$('#lr_pay_cheque_detail').val();
							// if(lr_pay_cheque_detail.trim()=="" )
							// {
							// 	$('#lr_pay_cheque_detail_err').html("Enter Cheque Details");
							// 	err++;
							// }
							// else
							// {	$('#lr_pay_cheque_detail_err').html("");		}
				// alert("chq");
				}

				var rtgs_receipt_add_radio = document.getElementById("rtgs_receipt_add_radio");
				if (rtgs_receipt_add_radio.checked)
				{
				    // lr_pay_cash
				    var lr_pay_rtgs_amt=$('#lr_pay_rtgs_amt').val();
				    if(lr_pay_rtgs_amt.trim()=="" )
							{
								$('#lr_pay_rtgs_amt_err').html("Enter RTGS Payment");
								err++;
							}
							else if(lr_pay_rtgs_amt==0)
							{
								$('#lr_pay_rtgs_amt_err').html("Enter RTGS Payment greater than Zero");
								err++;
							}
							else
							{	$('#lr_pay_rtgs_amt_err').html("");		}

							var lr_pay_rtgs_bank=$('#lr_pay_rtgs_bank').val();
							if(lr_pay_rtgs_amt > 0){
								if(lr_pay_rtgs_bank.trim()=="" )
								{
									$('#lr_pay_rtgs_bank_err').html("Enter RTGS Bank");
									err++;
								}
								
								else
								{	$('#lr_pay_rtgs_bank_err').html("");		}

								var lr_pay_rtgs_no=$('#lr_pay_rtgs_no').val();
								if(lr_pay_rtgs_no.trim()=="" )
								{
									$('#lr_pay_rtgs_no_err').html("Enter RTGS Reference No");
									err++;
								}
								else
								{	$('#lr_pay_rtgs_no_err').html("");		}
							}
							//COMMENTED BY DIVYA t (11-10-2023)
							// var lr_pay_rtgs_detail=$('#lr_pay_rtgs_detail').val();
							// if(lr_pay_rtgs_detail.trim()=="" )
							// {
							// 	$('#lr_pay_rtgs_detail_err').html("Enter RTGS Details");
							// 	err++;
							// }
							// else
							// {	$('#lr_pay_rtgs_detail_err').html("");		}
				}

				var upi_receipt_add_radio = document.getElementById("upi_receipt_add_radio");
				if (upi_receipt_add_radio.checked)
				{
				    // lr_pay_cash
				    var lr_pay_upi_amt=$('#lr_pay_upi_amt').val();
				    if(lr_pay_upi_amt.trim()=="" )
						{
							$('#lr_pay_upi_amt_err').html("Enter UPI Payment");
							err++;
						}
						else if(lr_pay_upi_amt==0)
						{
							$('#lr_pay_upi_amt_err').html("Enter UPI Payment greater than Zero");
							err++;
						}
						else
						{	$('#lr_pay_upi_amt_err').html("");		}

						if(lr_pay_upi_amt>0){
							var lr_pay_upi_no=$('#lr_pay_upi_no').val();
							if(lr_pay_upi_no.trim()=="" )
							{
								$('#lr_pay_upi_no_err').html("Enter UPI Transaction No");
								err++;
							}
							else
							{	$('#lr_pay_upi_no_err').html("");		}
						}

						//COMMENTED BY DIVYA t (11-10-2023)
						// var lr_pay_upi_detail=$('#lr_pay_upi_detail').val();
						// if(lr_pay_upi_detail.trim()=="" )
						// {
						// 	$('#lr_pay_upi_detail_err').html("Enter UPI Details");
						// 	err++;
						// }
						// else
						// {	
						// 		$('#lr_pay_upi_detail_err').html("");		
						// }
				}

				var chk=parseFloat($('#final_bal_amt').html());
				if(chk>0)
				{
						alert("Still pending amount to be paid. Pay first");
						err++;
				}
				
				if(err>0) {
					return false;
				} 
				else 
				{
					return true;
				}

			}

		</script>
	</body>
	<!--end::Body-->
	</html>