<?php $this->load->view("common");?>
<link href="<?php echo base_url();?>assets/jquery.autocomplete.css" rel="stylesheet" type="text/css" />
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
									<h1 class="d-flex align-items-center text-dark fw-bold my-1 fs-3">Credit Sales Receipts Entry
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

										<!--begin::Card body-->
										<div class="card-body py-4">
											<div class="row">
												<div class="col-lg-6">
												   <form method="POST" action="<?php echo base_url(); ?>Sales_receipt/sales_receipt_save" >
													<div class="row">
														<label class="col-lg-2 col-form-label required fw-semibold fs-6">Date</label>
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
																<input class="form-control form-control-solid ps-12" name="receipt_date" id="receipt_date" placeholder="Date" id="kt_daterangepicker_lot_entry_add_date" value="<?php $date_format  = $this->db->query("SELECT * FROM general_settings  ")->row();
														 $format= $date_format->date_format;
														 echo date("$format", strtotime(date("Y-m-d"))); //echo date("d-m-Y"); ?>" />
															</div>
														</div>
														<label class="col-lg-2 col-form-label fw-semibold fs-6">Sales Bill ID</label>
														<div class="col-lg-4 fv-row fv-plugins-icon-container">
															<input type="text" name="party_sales" id="party_sales" class="form-control form-control-lg form-control-solid" placeholder="Sales Bill ID" >
															<input type="hidden" name="first_name_id_hidden" id="first_name_id_hidden" value="">
															<div class="fv-plugins-message-container invalid-feedback"></div>
														</div>
														<label class="col-lg-2 col-form-label fw-semibold fs-6">Company</label>
														<div class="col-lg-10 fv-row fv-plugins-icon-container">
															<select class="form-select form-select-solid" name="company_id" id="company_id" data-control="select2" data-hide-search="true">	
																<option value="">Select</option>
																<?php foreach($company_list as $clist){ ?>
																<option value="<?php echo $clist['COMPANYCODE'] ?>"><?php echo $clist['COMPANYNAME'] ?></option>
																<?php } ?>
															
															</select>
														</div>
														<label class="col-lg-6 col-form-label fw-bold fs-6"><i class="fa fa-address-card fs-6" aria-hidden="true" title="Membership Card No"></i>&emsp;<span id="membership_card_no" name="membership_card_no">xxxx-xxxx-xxxx-xxxx</span>
														</label>
														<label class="col-lg-3 col-form-label fw-bold fs-6" name="card_type" id="card_type" ><span style="background-color:#FFAA00;border-radius: 8px;padding: 5px 15px 5px 15px;" title="Card Type"> <span  ></span>Gold</span></label>
														<label class="col-lg-3 col-form-label fw-bold fs-6" name="" id=""><i class="fa-solid fa-coins fs-6" title="Available Points"></i>&emsp;<span id="membership_card_points" name="membership_card_points">0</span></label>
													</div></form>
												</div>
												<div class="col-lg-4">
													<div class="row">
														<label class="col-lg-12 col-form-label fw-bold fs-6" name="" id="">
															<i class="fa fa-user fs-6" aria-hidden="true" title="Last Name"></i>&emsp;<span id="first_name" name="first_name">XXXXX</span></label>
														<label class="col-lg-12 col-form-label fw-bold fs-6" name="" id="">
															<i class="fa-solid fa-location-dot fs-6" aria-hidden="true" title="Address"></i>
														&emsp;<span id="address" name="address">XXXXXXXXXXXXX</span></label>
														<label class="col-lg-6 col-form-label fw-bold fs-6" name="" id="">
																<i class="fas fa-mobile-android-alt fs-6" aria-hidden="true" title="Mobile"></i>
															&emsp;<span id="mobile" name="mobile">9999999999</span></label>
														<label class="col-lg-6 col-form-label fw-bold fs-6">
															<span name="rating" id="rating"><i class="fa-solid fa-star" ></i>&nbsp;Rating</span></label>
													</div>
												</div>
												<div class="col-lg-2">
													<!--begin::Image input-->
													<div class="image-input image-input-outline" data-kt-image-input="true">
														<!--begin::Preview existing avatar-->
														<div id="party_photo" name="party_photo">
														<div class="image-input-wrapper w-125px h-125px" style="background-image: url(assets/images/sample.jpg)"></div>
														</div>
														<!--end::Preview existing avatar-->
													</div>
													<!--end::Image input-->
													<!--begin::Hint-->
													<div class="form-text"></div>
												</div>
											</div>
											<div class="row">
												<label class="col-form-label fw-bold fs-4">Sales Summary</label>
												<div class="col-lg-1">
													<label><i class="fas fa-list-ol fs-4" title="Count"></i></label>
													<label class="col-form-label fw-bold fs-5" title="Count" id="sales_count" name="sales_count">0</label>
												</div>
												<div class="col-lg-2">
													<label><i class="fas fa-balance-scale fs-4" title="Weight"></i></label>
													<label class="col-form-label fw-bold fs-5" title="Weight" id="sales_weight" name="sales_weight">0.000 </label>gms
												</div>
												<div class="col-lg-2">
													<label><i class="fas fa-money-check-alt fs-2" title="Total Amount"></i></label>
													<label class="col-form-label fw-bold fs-5" title="Total Amount" id="sales_net_payable" name="sales_net_payable">0.00</label>
												</div>
												<div class="col-lg-2">
													<label><i class="fas fa-money-bill-wave fs-4" title="Paid Amount"></i></label>
													<label class="col-form-label fw-bold fs-5" title="Paid Amount" id="sales_paid_amount" name="sales_paid_amount">0.00</label>
													<!--<button><i class="fas fa-receipt fs-4" title="Payment History" data-bs-toggle="modal" data-bs-target="#kt_modal_receipt_amount_history"></i></button>-->
													<!-- <i class="fas fa-info-circle fs-5" title="Payment Mode - Cash, Cheque, RTGS, UPI"></i> -->
												</div>
												<div class="col-lg-2">
													<label><i class="fas fa-hand-holding-usd fs-2" title="Balance Amount"></i></label>
													<label class="col-form-label fw-bold fs-5" title="Balance Amount" id="sales_balance_amount" name="sales_balance_amount">0.00</label>
												</div>
											</div>
											<div class="row">
											<div class="accordion" id="kt_accordion_item_list">
											    <div class="accordion-item">
											        <h2 class="accordion-header" id="kt_accordion_item_list_header_1">
											            <button class="accordion-button fw-bold fs-6 collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#kt_accordion_item_list_body_1" aria-expanded="false" aria-controls="kt_accordion_item_list_body_1">
											            Sales Item List
											            </button>
											        </h2>
											        <div id="kt_accordion_item_list_body_1" class="accordion-collapse collapse" aria-labelledby="kt_accordion_item_list_header_1" data-bs-parent="#kt_accordion_item_list">
											            <div class="accordion-body">
											           	  <table class="table align-middle table-row-dashed table-striped table-hover fs-7 gy-1 gs-2" id="add_salesentry_table">
																	    <thead>
																        <tr class="text-start text-muted fw-bold fs-7 gs-0">
															            <th class="min-w-25px">Sno</th>
															            <th class="min-w-100px">Tag No</th>
															            <th class="min-w-50px">Item Name</th>
															            <th class="min-w-80px">Sub Item</th>
															            <th class="min-w-50px">Img</th>
															            <th class="min-w-25px">Quality</th>
																					<th class="min-w-25px">Purity(%)</th>
																		      <th class="min-w-50px">Wgt(gms)</th>
																					<th class="min-w-50px">St Wgt(gms)</th>
																					<th class="min-w-50px">Net Wgt(gms)</th>
																					<th class="min-w-50px">HC Amt</th>
																					<th class="min-w-50px">MC Amt</th>
																					<th class="min-w-50px">WC(%)</th>
																					<th class="min-w-50px">Metal wgt(gms)</th>
																		      <th class="min-w-80px">Amount</th>
															        	</tr>
																    	</thead>
																	    <tbody class="text-gray-600 fw-semibold" id="sales_row" name="sales_row">
																	    
																	    </tbody>
																		</table>
											            </div>
											        </div>
											    </div>
											</div>
											</div>
											
											<div class="d-flex justify-content-center">
												<label class="col-form-label fw-bold fs-1">Net Payable &emsp;- </label>
												<label class="col-form-label fw-bold fs-1">&emsp;<span id="sales_net_payable_head" name="">0.00</span></label>
											</div>
											<div class="row">
												<label class="col-form-label fw-bold fs-5">Party Payment Details</label>
											</div>
											<div class="row">
												<div class="col-lg-2 fv-row fv-plugins-icon-container fv-plugins-bootstrap5-row-invalid">
													<div class="d-flex align-items-center mt-1">
														<label class="form-check form-check-inline form-check-solid me-5 is-invalid">
															<input class="form-check-input" name="" type="checkbox" value="1" id="cash_paid_from_party_add_radio" onclick="cash_pdfrm_party_add_radio()">
														</label>
														<label class="col-form-label fw-semibold fs-6 me-5">Cash</label>
													</div>
												</div>
												<div class="col-lg-2 fv-row fv-plugins-icon-container fv-plugins-bootstrap5-row-invalid">
													<div class="d-flex align-items-center mt-1">
														<label class="form-check form-check-inline form-check-solid me-5 is-invalid">
															<input class="form-check-input" name="" type="checkbox" value="1" id="cheque_paid_from_party_add_radio" onclick="cheque_pdfrm_party_add_radio()">
														</label>
														<label class="col-form-label fw-semibold fs-6">Cheque</label>
													</div>
												</div>
												<div class="col-lg-2 fv-row fv-plugins-icon-container fv-plugins-bootstrap5-row-invalid">
													<div class="d-flex align-items-center mt-1">
														<label class="form-check form-check-inline form-check-solid me-5 is-invalid">
															<input class="form-check-input" name="" type="checkbox" value="1" id="rtgs_paid_from_party_add_radio" onclick="rtgs_pdfrm_party_add_radio()">
														</label>
														<label class="col-form-label fw-semibold fs-6">RTGS</label>
													</div>
												</div>
												<div class="col-lg-2 fv-row fv-plugins-icon-container fv-plugins-bootstrap5-row-invalid">
													<div class="d-flex align-items-center mt-1">
														<label class="form-check form-check-inline form-check-solid me-5 is-invalid">
															<input class="form-check-input" name="" type="checkbox" value="1" id="upi_paid_from_party_add_radio" onclick="upi_pdfrm_party_add_radio()">
														</label>
														<label class="col-form-label fw-semibold fs-6">UPI</label>
													</div>
												</div>
												<div class="col-lg-2 fv-row fv-plugins-icon-container fv-plugins-bootstrap5-row-invalid">
											<div class="d-flex align-items-center mt-1">
												<label class="form-check form-check-inline form-check-solid me-5 is-invalid">
													<input class="form-check-input" name="mem_card_loan_received_add_radio" type="checkbox" value="1" id="mem_card_loan_received_add_radio" onclick="mem_card_ln_recev_add_radio()">
												</label>
												<label class="col-form-label fw-semibold fs-6">Membership Card</label>
											</div>
										</div>
										<div class="col-lg-2 fv-row fv-plugins-icon-container fv-plugins-bootstrap5-row-invalid">
																<div class="d-flex align-items-center mt-1">
																	<label class="form-check form-check-inline form-check-solid me-5 is-invalid">
																		<input class="form-check-input" name="chit_hand_loan_paid_from_party_add_radio" type="checkbox" value="Chit Redeem" id="chit_hand_loan_paid_from_party_add_radio" onclick="chit_hd_ln_pdfrm_party_add_radio()">
																	</label>
																	<label class="col-form-label fw-semibold fs-6">Chit</label>
																</div>
															</div>
											</div>
											<div class="row">
												<label class="col-lg-1 col-form-label fw-semibold fs-6" id="cash_party_label" style="display:none;">Cash</label>
												<div class="col-lg-2 fv-row fv-plugins-icon-container" id="cash_party_label_tbox" style="display:none;">
													<input type="text" class="form-control form-control-lg form-control-solid" placeholder="Amount" value="0" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" name="cash_amount" id="cash_amount" onkeyup="paid_amount_calc()" onfocus="this.select()">
													<div class="fv-plugins-message-container invalid-feedback"></div>
												</div>
												<div class="col-lg-3 fv-row fv-plugins-icon-container" id="cash_party_detail_tbox" style="display:none;">
													<textarea class="form-control form-control-solid" rows="1" placeholder="Details" name="cash_detail" id="cash_detail"></textarea>
												</div>
											</div>
											<div class="row">
												<label class="col-lg-1 col-form-label fw-semibold fs-6" id="cheque_party_amt" style="display:none;">Cheque</label>
												<div class="col-lg-2 fv-row fv-plugins-icon-container" id="cheque_party_amt_tbox" style="display:none;">
													<input type="text" name="cheque_amount" id="cheque_amount" class="form-control form-control-lg form-control-solid" placeholder="Amount" value="0" oninput="this.value = this.value.replace(/[^A-Za-z/0-9.]/g, '').replace(/(\..*)\./g, '$1');" onkeyup="paid_amount_calc()" onfocus="this.select()">
													<div class="fv-plugins-message-container invalid-feedback"></div>
												</div>
												<div class="col-lg-3 fv-row fv-plugins-icon-container"  id="cheque_party_bank_tbox" style="display:none;">
													<select class="form-select form-select-solid" data-control="select2" data-placeholder="Select Party Bank" name="cheque_bank" id="cheque_bank">
														<option value="">Select</option>
													<?php foreach($bank_list as $blist){ ?>
														<option value="<?php echo $blist['BANKNAME']; ?>"><?php echo $blist['BANKNAME']; ?></option>		
														<?php } ?>		
														
													</select>
												</div>
												<div class="col-lg-3 fv-row fv-plugins-icon-container" id="cheque_party_chq_no_tbox" style="display:none;">
													<input type="text" name="cheque_number" id="cheque_number" class="form-control form-control-lg form-control-solid" placeholder="Cheque/Ref Number" oninput="this.value = this.value.replace(/[^A-Za-z/0-9.]/g, '').replace(/(\..*)\./g, '$1');" >
													<div class="fv-plugins-message-container invalid-feedback"></div>
												</div>
												<div class="col-lg-3 fv-row fv-plugins-icon-container" id="cheque_party_detail_tbox" style="display:none;">
													<textarea class="form-control form-control-solid" rows="1" placeholder="Details" name="cheque_detail" id="cheque_detail"></textarea>
												</div>
											</div>
											<div class="row">
												<label class="col-lg-1 col-form-label fw-semibold fs-6" id="rtgs_party_amt" style="display:none;">RTGS</label>
												<div class="col-lg-2 fv-row fv-plugins-icon-container" id="rtgs_party_amt_tbox" style="display:none;">
													<input type="text" name="rtgs_amount" id="rtgs_amount" class="form-control form-control-lg form-control-solid" placeholder="Amount" value="0" oninput="this.value = this.value.replace(/[^A-Za-z/0-9.]/g, '').replace(/(\..*)\./g, '$1');" onkeyup="paid_amount_calc()" onfocus="this.select()">
													<div class="fv-plugins-message-container invalid-feedback"></div>
												</div>
												<div class="col-lg-3 fv-row fv-plugins-icon-container" id="rtgs_party_no_tbox" style="display:none;">
													<input type="text" name="rtgs_number" id="rtgs_number" class="form-control form-control-lg form-control-solid" placeholder="Trans/Ref Number" oninput="this.value = this.value.replace(/[^A-Za-z/0-9.]/g, '').replace(/(\..*)\./g, '$1');">
													<div class="fv-plugins-message-container invalid-feedback"></div>
												</div>
												<div class="col-lg-3 fv-row fv-plugins-icon-container" id="rtgs_party_bank_tbox" style="display:none;">
													<select class="form-select form-select-solid" data-control="select2" data-placeholder="Select Company Bank" data-hide-search="true" name="rtgs_bank" id="rtgs_bank">
														<option value="">Select</option>
														<?php foreach($bank_list as $blist){ ?>
														<option value="<?php echo $blist['BANKNAME']; ?>"><?php echo $blist['BANKNAME']; ?></option>		
														<?php } ?>	
													</select>
												</div>
												<div class="col-lg-3 fv-row fv-plugins-icon-container" id="rtgs_party_detail_tbox" style="display:none;">
													<textarea class="form-control form-control-solid" rows="1" placeholder="Details" name="rtgs_detail" id="rtgs_detail"></textarea>
												</div>
											</div>
											<div class="row">
												<label class="col-lg-1 col-form-label fw-semibold fs-6" id="upi_party_amt" style="display:none;">UPI</label>
												<div class="col-lg-2 fv-row fv-plugins-icon-container" id="upi_party_amt_tbox" style="display:none;">
													<input type="text" name="upi_amount" id="upi_amount" class="form-control form-control-lg form-control-solid" placeholder="Amount" value="0" onkeyup="paid_amount_calc()" onfocus="this.select()">
													<div class="fv-plugins-message-container invalid-feedback"></div>
												</div>
												<div class="col-lg-3 fv-row fv-plugins-icon-container" id="upi_party_trans_no_tbox" style="display:none;">
													<input type="text" name="upi_number" id="upi_number" class="form-control form-control-lg form-control-solid" placeholder="Trans/Ref Number">
													<div class="fv-plugins-message-container invalid-feedback"></div>
												</div>
												<div class="col-lg-3 fv-row fv-plugins-icon-container" id="upi_party_bank_tbox" style="display:none;">
													<select class="form-select form-select-solid" data-control="select2" data-placeholder="Select Company Bank" data-hide-search="true" name="upi_bank" id="upi_bank">
														<option value="">Select</option>
														<?php foreach($bank_list as $blist){ ?>
														<option value="<?php echo $blist['BANKNAME']; ?>"><?php echo $blist['BANKNAME']; ?></option>		
														<?php } ?>	
													</select>
												</div>
												<div class="col-lg-3 fv-row fv-plugins-icon-container" id="upi_party_detail_tbox" style="display:none;">
													<textarea class="form-control form-control-solid" rows="1" placeholder="Details" name="upi_detail" id="upi_detail"></textarea>
												</div>
											</div>
											<div class="row">
										<label class="col-lg-1 col-form-label fw-semibold fs-6" id="lbl_mem_card_no_pop" style="display:none;">M.card No</label>
										<div class="col-lg-2" id="mem_card_no_tbox" style="display:none;">
											<input type="text" class="form-control form-control-lg form-control-solid" placeholder="Membership Card No" name="mem_card_no" id="mem_card_no" readonly>
											<div class="fv-plugins-message-container invalid-feedback"></div>
										</div>
										<div class="col-lg-3" id="mem_card_avail_points_tbox" style="display:none;">
											<label class="col-form-label fw-bold fs-6">Available Points</label>&emsp;
											<label class="col-form-label fw-bold fs-5" id="mem_card_points">0</label>
										</div>
										<!-- <label class="col-lg-1 col-form-label fw-semibold fs-6" id="cus_cl_redeem_paid_from_cmy" style="display:none;">Redeem</label> -->
										<div class="col-lg-2" id="mem_card_redeem_tbox" style="display:none;">
											<input type="text" class="form-control form-control-lg form-control-solid" placeholder="Redeem Points" name="mem_card_redeem_points" id="mem_card_redeem_points"  onkeyup="paid_amount_calc()" value="0">
											<div class="fv-plugins-message-container invalid-feedback"></div>
										</div>
										<div class="col-lg-2 fv-row fv-plugins-icon-container" id="mem_card_details_tbox" style="display:none;">
											<textarea class="form-control form-control-solid" rows="1" placeholder="Details" name="mem_card_details" id="mem_card_details"></textarea>
										</div>
									</div>
									<div class="row">
															<label class="col-lg-1 col-form-label fw-semibold fs-6" id="hand_ln_sch_paid_from_pty" style="display:none;">Scheme</label>
															<div class="col-lg-2 fv-row fv-plugins-icon-container" id="hand_ln_sch_paid_from_pty_tbox" style="display:none;">
																<select class="form-select form-select-solid" data-control="select2" data-placeholder="Select Scheme" name="sch_payment" id="sch_payment" data-hide-search="true" onchange="get_chit()">
																	<option value="">Select</option>
																	<option value="1">Selvamagal</option>				
																	<option value="2">Thangamagal</option>
																	<input type="hidden" name="sch_type_hidden" id="sch_type_hidden">
																</select>
															</div>
															<div class="col-lg-3 fv-row fv-plugins-icon-container" id="hand_ln_avai_bal_paid_from_pty" style="display:none;">

																<!-- <select class="form-select form-select-solid" data-control="select2" data-placeholder="Select Chit ID" data-hide-search="true" id="chit_option"> -->

																	<select class="form-select form-select-solid" data-control="select2" data-hide-search="true" id="chit_option" name="chit_option">
																	<option value="">Select</option>
																	<!-- <option value="">Select Chit ID</option>
																	<option value="1">CH-001/23 - 45863.00</option>				
																	<option value="2">CH-002/23 - 85964.00</option> -->
																</select>
															</div>
															<div class="col-lg-2" id="hand_ln_redeem_amt_paid_from_pty_tbox" style="display:none;">
																<input type="text" class="form-control form-control-lg form-control-solid" placeholder="Redeem Amount" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" value="0" name="chit_red_amt" id="chit_red_amt" onkeyup="paid_amount_calc()">
																<div class="fv-plugins-message-container invalid-feedback"></div>
															</div>
															<div class="col-lg-2 fv-row fv-plugins-icon-container" id="hand_ln_redeem_detail_paid_from_pty_tbox" style="display:none;">
																<textarea class="form-control form-control-solid" rows="1" placeholder="Details" name="chit_red_det" id="chit_red_det"></textarea>
															</div>
														</div>
											<div class="row">
												<label class="col-lg-1 col-form-label fw-semibold fs-6">Net Payable</label>
												<label class="col-lg-2 col-form-label fw-bold fs-2" id="sales_net_payable1" name="sales_net_payable1">0.00</label>
												<label class="col-lg-1 col-form-label fw-semibold fs-6">Paid Amount</label>
												<label class="col-lg-2 col-form-label fw-bold fs-2" id="sales_paid_amount1" name="sales_paid_amount1">0.00</label>
												<label class="col-lg-1 col-form-label fw-semibold fs-6">Balance Amount</label>
												<label class="col-lg-2 col-form-label fw-bold fs-2" id="sales_balance_amount1" name="sales_balance_amount1">0.00</label>
												<input type="hidden" id="sales_id" name="sales_id">
												<input type="hidden" id="party_id" name="party_id" >
												<input type="hidden" id="sales_net_payable2" name="sales_net_payable2" value="0">
												<input type="hidden" id="sales_paid_amount2" name="sales_paid_amount2" value="0">
												<input type="hidden" id="sales_balance_amount2" name="sales_balance_amount2" value="0">
												<!--<div class="col-lg-3">
													<label class="form-check form-check-inline form-check-solid is-invalid py-5">
														<input class="form-check-input" name="credit_balance" type="checkbox" id="credit_balance">
														<span class="col-form-label fw-semibold fs-6">Add Balance to Credit</span>
													</label>
												</div>-->
												<div class="col-lg-1">
													<label class="col-form-label fw-semibold fs-6">Adjustment Discount</label>
												</div>
												
												<div class="col-lg-2">
													<input type="text" class="form-control form-control-lg form-control-solid" placeholder="Amount" value="0" id="adj_discount" name="adj_discount">
													<div class="fv-plugins-message-container invalid-feedback"></div>
											</div>
											<div class="row">
												<label class="col-lg-1 col-form-label fw-semibold fs-6">Cus.Rating</label>
												<div class="col-lg-2 fv-row fv-plugins-icon-container">
													<select class="form-select form-select-solid" data-control="select2" data-hide-search="true" name="customer_rating" id="customer_rating">
														<option value="">Select Rating</option>
														<option value="3">Good</option>
														<option value="2">Average</option>
														<option value="1">Bad</option>
													</select>
												</div>
												<!-- <label class="col-lg-1 col-form-label fw-semibold fs-6">M.Points</label>
												<div class="col-lg-2 fv-row fv-plugins-icon-container">
													<input type="text" class="form-control form-control-lg1 form-control-solid">
													<div class="fv-plugins-message-container invalid-feedback"></div>
												</div> -->
											</div>
											<div class="d-flex justify-content-end">
												<button type="reset" class="btn btn-secondary me-3" data-bs-dismiss="modal">Cancel</button>
												<button type="submit" class="btn btn-primary" id="">Pay Now</button>
											</div>
											</form>
											<!--end::Actions-->
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
		<?php $this->load->view("script");?>

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
						<label class="col-lg-1 col-form-label fw-semibold fs-6">Date</label>
						<label class="col-lg-2 col-form-label fw-bold fs-4">22-12-2022</label>
						<label class="col-lg-2 col-form-label fw-semibold fs-6">Sales Bill ID</label>
						<label class="col-lg-2 col-form-label fw-bold fs-4">SL-1256/23</label>
						<!-- <div class="col-lg-3">
							<label><i class="fas fa-money-check-alt fs-2" title="Total Amount"></i></label>
							<label class="col-form-label fw-bold fs-5" title="Total Amount">45895.00</label>
						</div>
						<div class="col-lg-3">
							<label><i class="fas fa-money-bill-wave fs-4" title="Paid Amount"></i></label>
							<label class="col-form-label fw-bold fs-5" title="Paid Amount">25895.00</label>
						</div>
						<div class="col-lg-3">
							<label><i class="fas fa-hand-holding-usd fs-2" title="Balance Amount"></i></label>
							<label class="col-form-label fw-bold fs-5" title="Balance Amount">20000.00</label>
						</div> -->

						<table class="table align-middle table-row-dashed table-striped table-hover fs-7 gy-1 gs-2" id="add_receipt_payment_history">
							<thead>
								<tr class="text-start text-muted fw-bold fs-7 gs-0">
									<th class="min-w-25px">Sno</th>
			            <th class="min-w-100px">Recpt Date</th>
			            <th class="min-w-100px">Paid Amount</th>
			            <th class="min-w-100px">Payment Mode</th>
								</tr>
							</thead>
							<tbody class="text-gray-600 fw-semibold">
								<tr>
									<td>1</td>
									<td>07-03-2023</td>
									<td>5895.00</td>
									<td class="ple1">Cash, UPI</td>
								</tr>
								<tr>
									<td>2</td>
									<td>04-03-2023</td>
									<td>10000.00</td>
									<td class="ple1">Cheque</td>
								</tr>
								<tr>
									<td>3</td>
									<td>02-03-2023</td>
									<td>10000.00</td>
									<td class="ple1">Card</td>
								</tr>
																
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

<div class="modal fade" id="kt_modal_verify_membership_card" tabindex="-1" aria-hidden="true">
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
					<label class="col-lg-12 col-form-label fw-bold fs-5"><i class="fa fa-address-card fs-5" aria-hidden="true" title="Card No"></i>&emsp;1234-5678-9123-1234
					</label>
					<label class="col-lg-4 col-form-label fw-bold fs-6" name="" id="" ><span style="background-color:#FFAA00;border-radius: 8px;padding: 5px 15px 5px 15px;">Gold</span></label>
					<label class="col-lg-4 col-form-label fw-bold fs-5" name="" id=""><i class="fa-solid fa-coins fs-5" title="Points"></i>&emsp;</label>
				</div>
				<div class="row">
					<label class="col-lg-4 col-form-label fw-semibold fs-6">Scan Here</label>
					<div class="col-lg-8 fv-row fv-plugins-icon-container">
						<input type="text" class="form-control form-control-lg form-control-solid" placeholder="Scan Here" >
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
						<button class="btn btn-sm btn-outline btn-outline-solid btn-outline-warning btn-active-light-primary me-2" data-bs-toggle="modal" data-bs-target="#kt_modal_verify_membership_card">Verify</button>
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
	<!--end::Modal - view payment-->
</div>
<!-- <script src="js/products-list.js"></script> -->
<script src="<?php echo base_url();?>assets/jquery.autocomplete.js"></script>
<script>
		function get_chit(){
						    var pid= $("#first_name_id_hidden").val();
                            var cid = $('#sch_payment').val()
                            // alert(cid);
                            // alert(pid);
                            $.ajax({
							type: "POST",
							url: baseurl+'Sales_receipt/get_chit_list',
							async: false,
							type: "POST",
							data: "ccid="+cid+'&pid='+pid,
							dataType: "html",
							success: function(response)
							{
							$('#chit_option').empty().append(response);

							}
							});

							
							


}
</script>
<script>
var baseurl = $("#baseurl").val();

$("#party_sales").autocomplete({ 
	// alert(1);
	                valueKey:'title',
					
	                source:[{
	                url:baseurl+'Sales_receipt/idList?query=%QUERY%',
	                type:'remote',
	                ajax:{
	                  dataType : 'json',
	                }
	            }]}).on('selected.xdsoft',function(e,suggestion,ui){ 
					// alert(id);
	                // $("#party_sales").val(suggestion.id);
					$("#first_name").html(suggestion.firstname);
					$('#first_name_id_hidden').val(suggestion.id);
					$("#address").html(suggestion.address);
					$("#mobile").html(suggestion.phone);
					 $("#membership_card_no").html(suggestion.member_id);
					 $("#membership_card_points").html(suggestion.member_points);
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
	                	r='<i class="fa-solid fa-star" style="color:#d2d4dc;"></i>&nbsp;-';	
	                }
					$("#rating").html(r);
					if(suggestion.card_type=='Silver'){
						c_type='<span style="background-color:#C0C0C0;border-radius: 8px;padding: 5px 15px 5px 15px;">Silver</span>';
				}
				else if(suggestion.card_type=='Gold'){
					
					c_type='<span style="background-color:#ffaa00;border-radius: 8px;padding: 5px 15px 5px 15px;">Gold</span>';				
				}
				else{
					
					c_type='<span style="background-color:#E5E4E2;border-radius: 8px;padding: 5px 15px 5px 15px;">Platinum</span>';
															
	
				}
				// alert(c_type);
				$("#card_type").html(c_type);
				// alert($sales_count);
				$("#sales_count").html(suggestion.sales_count);
					$("#sales_weight").html(suggestion.sales_weight);
					$("#sales_net_payable").html(suggestion.sales_net_payable);
					$("#sales_paid_amount").html(suggestion.sales_paid_amount);
					$("#sales_balance_amount").html(suggestion.sales_balance_amount);

					$("#sales_id").val(suggestion.sales_id);
					$("#party_id").val(suggestion.id);

					$("#sales_net_payable_head").html(suggestion.sales_balance_amount);
					$("#sales_net_payable1").html(suggestion.sales_balance_amount);
				

					$("#sales_net_payable2").val(suggestion.sales_balance_amount);
					

					$("#sales_row").empty().append(suggestion.sales_row);

				$.ajax({
					type: "POST",
					url: baseurl+'Sales_receipt/get_photo',
					async: false,
					type: "POST",
					data: "id="+suggestion.id,
					dataType: "html",
					success: function(response)
					{
						
		                $('#party_photo').empty().append(response);
					}
					});
					
					
				});
</script>
<script>
function paid_amount_calc(){

	var mem_card_points = $('#mem_card_points').text();
	var mem_card_redeem_points1 = $('#mem_card_redeem_points').val();
	// alert(mem_card_redeem_points1);
	if(parseFloat(mem_card_points)<parseFloat(mem_card_redeem_points1)){
		alert('Enter less than available points');
		$('#mem_card_redeem_points').val(0);
	}

	var cash_amount = $("#cash_amount").val();
	var cheque_amount = $("#cheque_amount").val();
	var rtgs_amount = $("#rtgs_amount").val();
	var upi_amount = $("#upi_amount").val();
	var mem_card_redeem_points = $("#mem_card_redeem_points").val();
	var chit_amount = $("#chit_red_amt").val();

	var net_payable = $("#sales_net_payable2").val();

	var paid_amount= parseFloat(cash_amount)+parseFloat(cheque_amount)+parseFloat(rtgs_amount)+parseFloat(upi_amount)+parseFloat(mem_card_redeem_points)+parseFloat(chit_amount);
	var balance_amount=parseFloat(net_payable)-parseFloat(paid_amount);

	$("#sales_paid_amount1").html(paid_amount);
    $("#sales_balance_amount1").html(balance_amount);
	$("#sales_paid_amount2").val(paid_amount);
	$("#sales_balance_amount2").val(balance_amount);
}

</script>
<script>
		      $("#add_receipt_payment_history").kendoTooltip({
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
<!-- Paid from Party Start -->
		<script>
			function cash_pdfrm_party_add_radio()
			{
				var cash_paid_from_party_add_radio = document.getElementById("cash_paid_from_party_add_radio");

				var cash_party_label = document.getElementById("cash_party_label");
				var cash_party_label_tbox = document.getElementById("cash_party_label_tbox");
				var cash_party_detail_tbox = document.getElementById("cash_party_detail_tbox");

				if (cash_paid_from_party_add_radio.checked)
				{
				    cash_party_label.style.display = "block";
				    cash_party_label_tbox.style.display = "block";
				    cash_party_detail_tbox.style.display = "block";
			  	} else 
			  	{
			  		cash_party_label.style.display = "none";
			  		cash_party_label_tbox.style.display = "none";
			  		cash_party_detail_tbox.style.display = "none";
			  	}
			};

			function cheque_pdfrm_party_add_radio()
			{
				var cheque_paid_from_party_add_radio = document.getElementById("cheque_paid_from_party_add_radio");

				var cheque_party_amt = document.getElementById("cheque_party_amt");
				var cheque_party_amt_tbox = document.getElementById("cheque_party_amt_tbox");
				// var cheque_bank = document.getElementById("cheque_bank");
				var cheque_party_bank_tbox = document.getElementById("cheque_party_bank_tbox");
				// var cheque_chq_no = document.getElementById("cheque_chq_no");
				var cheque_party_chq_no_tbox = document.getElementById("cheque_party_chq_no_tbox");
				// var cheque_detail = document.getElementById("cheque_detail");
				var cheque_party_detail_tbox = document.getElementById("cheque_party_detail_tbox");

				if (cheque_paid_from_party_add_radio.checked)
				{
				    cheque_party_amt.style.display = "block";
				    cheque_party_amt_tbox.style.display = "block";
				    // cheque_bank.style.display = "block";
				    cheque_party_bank_tbox.style.display = "block";
				    // cheque_chq_no.style.display = "block";
				    cheque_party_chq_no_tbox.style.display = "block";
				    // cheque_detail.style.display = "block";
				    cheque_party_detail_tbox.style.display = "block";
			  	} else 
			  	{
			     	cheque_party_amt.style.display = "none";
				    cheque_party_amt_tbox.style.display = "none";
				    // cheque_bank.style.display = "none";
				    cheque_party_bank_tbox.style.display = "none";
				    // cheque_chq_no.style.display = "none";
				    cheque_party_chq_no_tbox.style.display = "none";
				    // cheque_detail.style.display = "none";
				    cheque_party_detail_tbox.style.display = "none";
			  	}
			};

			function rtgs_pdfrm_party_add_radio()
			{
				var rtgs_paid_from_party_add_radio = document.getElementById("rtgs_paid_from_party_add_radio");

				var rtgs_party_amt = document.getElementById("rtgs_party_amt");
				var rtgs_party_amt_tbox = document.getElementById("rtgs_party_amt_tbox");
				// var rtgs_bank = document.getElementById("rtgs_bank");
				var rtgs_party_bank_tbox = document.getElementById("rtgs_party_bank_tbox");
				// var rtgs_no = document.getElementById("rtgs_no");
				var rtgs_party_no_tbox = document.getElementById("rtgs_party_no_tbox");
				// var rtgs_detail = document.getElementById("rtgs_detail");
				var rtgs_party_detail_tbox = document.getElementById("rtgs_party_detail_tbox");

				if (rtgs_paid_from_party_add_radio.checked == true)
				{
				    rtgs_party_amt.style.display = "block";
				    rtgs_party_amt_tbox.style.display = "block";
				    // rtgs_bank.style.display = "block";
				    rtgs_party_bank_tbox.style.display = "block";
				    // rtgs_no.style.display = "block";
				    rtgs_party_no_tbox.style.display = "block";
				    // rtgs_detail.style.display = "block";
				    rtgs_party_detail_tbox.style.display = "block";
			  	} else 
			  	{
			     	rtgs_party_amt.style.display = "none";
				    rtgs_party_amt_tbox.style.display = "none";
				    // rtgs_bank.style.display = "none";
				    rtgs_party_bank_tbox.style.display = "none";
				    // rtgs_no.style.display = "none";
				    rtgs_party_no_tbox.style.display = "none";
				    // rtgs_detail.style.display = "none";
				    rtgs_party_detail_tbox.style.display = "none";
			  	}
			};

			function upi_pdfrm_party_add_radio()
			{
				var upi_paid_from_party_add_radio = document.getElementById("upi_paid_from_party_add_radio");

				var upi_party_amt = document.getElementById("upi_party_amt");
				var upi_party_amt_tbox = document.getElementById("upi_party_amt_tbox");
				// var upi_trans_no = document.getElementById("upi_trans_no");
				var upi_party_trans_no_tbox = document.getElementById("upi_party_trans_no_tbox");
				var upi_party_bank_tbox = document.getElementById("upi_party_bank_tbox");
				var upi_party_detail_tbox = document.getElementById("upi_party_detail_tbox");

				if (upi_paid_from_party_add_radio.checked == true)
				{
				    upi_party_amt.style.display = "block";
				    upi_party_amt_tbox.style.display = "block";
				    // upi_trans_no.style.display = "block";
				    upi_party_trans_no_tbox.style.display = "block";
				    upi_party_bank_tbox.style.display = "block";
				    upi_party_detail_tbox.style.display = "block";
			  	} else 
			  	{
			     	upi_party_amt.style.display = "none";
				    upi_party_amt_tbox.style.display = "none";
				    // upi_trans_no.style.display = "none";
				    upi_party_trans_no_tbox.style.display = "none";
				    upi_party_bank_tbox.style.display = "none";
				    upi_party_detail_tbox.style.display = "none";
			  	}
			};
		</script>
		<!-- Paid from Party End -->
<script>
	$("#add_receipt_payment_history").DataTable({
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
	$('#add_receipt_payment_history').wrap('<div class="dataTables_scroll" />');
</script>
<script>
	$("#add_salesentry_table").DataTable({
		//"aaSorting":[],
		"sorting":false,
		"paging": false,
		"info": false,

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
	$('#add_salesentry_table').wrap('<div class="dataTables_scroll" />');
</script>
<script>
	
	$("#add_oldjewel_entry_table").DataTable({
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
	$('#add_oldjewel_entry_table').wrap('<div class="dataTables_scroll" />');
</script>

<script>
	$("#add_puregold_entry_table").DataTable({
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
	$('#add_puregold_entry_table').wrap('<div class="dataTables_scroll" />');
</script>
		<script>
			function itm_ty()
			{
				var item_type = document.getElementById("item_type").value;

				var lot_gold = document.getElementById("lot_gold");
				var lot_silver = document.getElementById("lot_silver");
				if (item_type == "") 
				{
					lot_gold.style.display = "none";
					lot_silver.style.display = "none";
				}
				else if (item_type == "gold") 
				{
					lot_gold.style.display = "block";
					lot_silver.style.display = "none";
				}
				else
				{
					lot_gold.style.display = "none";
					lot_silver.style.display = "block";
				}

			};
			function itm_ty_edit()
			{
				var item_type_edit = document.getElementById("item_type_edit").value;

				var lot_gold_edit = document.getElementById("lot_gold_edit");
				var lot_silver_edit = document.getElementById("lot_silver_edit");
				if (item_type_edit == "") 
				{
					lot_gold_edit.style.display = "none";
					lot_silver_edit.style.display = "none";
				}
				else if (item_type_edit == "gold") 
				{
					lot_gold_edit.style.display = "block";
					lot_silver_edit.style.display = "none";
				}
				else
				{
					lot_gold_edit.style.display = "none";
					lot_silver_edit.style.display = "block";
				}

			};
			function itm_ty_view()
			{
				var item_type_view = document.getElementById("item_type_view").value;

				var lot_gold_view = document.getElementById("lot_gold_view");
				var lot_silver_view = document.getElementById("lot_silver_view");
				if (item_type_view == "") 
				{
					lot_gold_view.style.display = "none";
					lot_silver_view.style.display = "none";
				}
				else if (item_type_view == "gold") 
				{
					lot_gold_view.style.display = "block";
					lot_silver_view.style.display = "none";
				}
				else
				{
					lot_gold_view.style.display = "none";
					lot_silver_view.style.display = "block";
				}

			};
		</script>
		<script>
			function cash_lt_ey_radio()
			{
				var cash_lot_entry_radio = document.getElementById("cash_lot_entry_radio");

				var cash_lt_ey_label = document.getElementById("cash_lt_ey_label");
				var cash_lt_ey_tbox = document.getElementById("cash_lt_ey_tbox");

				if (cash_lot_entry_radio.checked == true)
				{
				    cash_lt_ey_label.style.display = "block";
				    cash_lt_ey_tbox.style.display = "block";
			  	} else 
			  	{
			  		cash_lt_ey_label.style.display = "none";
				    cash_lt_ey_tbox.style.display = "none";
			  	}
			};

			function cheque_lt_ey_radio()
			{
				var cheque_lot_entry_radio = document.getElementById("cheque_lot_entry_radio");

				var cheque_lt_ey_label = document.getElementById("cheque_lt_ey_label");
				var cheque_lt_ey_tbox = document.getElementById("cheque_lt_ey_tbox");

				if (cheque_lot_entry_radio.checked == true)
				{
				    cheque_lt_ey_label.style.display = "block";
				    cheque_lt_ey_tbox.style.display = "block";
			  	} else 
			  	{
			     	cheque_lt_ey_label.style.display = "none";
			     	cheque_lt_ey_tbox.style.display = "none";
			  	}
			};

			function rtgs_lt_ey_radio()
			{
				var rtgs_lot_entry_radio = document.getElementById("rtgs_lot_entry_radio");

				var rtgs_lt_ey_label = document.getElementById("rtgs_lt_ey_label");
				var rtgs_lt_ey_tbox = document.getElementById("rtgs_lt_ey_tbox");
				var bank_lt_ey_label = document.getElementById("bank_lt_ey_label");
				var bank_lt_ey_tbox = document.getElementById("bank_lt_ey_tbox");

				if (rtgs_lot_entry_radio.checked == true)
				{
				    rtgs_lt_ey_label.style.display = "block";
				    rtgs_lt_ey_tbox.style.display = "block";
				    bank_lt_ey_label.style.display = "block";
				    bank_lt_ey_tbox.style.display = "block";
			  	} else 
			  	{
			     	rtgs_lt_ey_label.style.display = "none";
			     	rtgs_lt_ey_tbox.style.display = "none";
			     	bank_lt_ey_label.style.display = "none";
			     	bank_lt_ey_tbox.style.display = "none";
			  	}
			};

			function metal_lt_ey_radio()
			{
				var metal_lot_entry_radio = document.getElementById("metal_lot_entry_radio");

				var metal_lt_ey_label = document.getElementById("metal_lt_ey_label");
				var metal_lt_ey_tbox = document.getElementById("metal_lt_ey_tbox");
				var purity_lt_ey_label = document.getElementById("purity_lt_ey_label");
				var purity_lt_ey_tbox = document.getElementById("purity_lt_ey_tbox");
				var rate_lt_ey_label = document.getElementById("rate_lt_ey_label");
				var rate_lt_ey_tbox = document.getElementById("rate_lt_ey_tbox");
				var mtamt_lt_ey_label = document.getElementById("mtamt_lt_ey_label");
				var mtamt_lt_ey_tbox = document.getElementById("mtamt_lt_ey_tbox");

				if (metal_lot_entry_radio.checked == true)
				{
				    metal_lt_ey_label.style.display = "block";
			     	metal_lt_ey_tbox.style.display = "block";
			     	purity_lt_ey_label.style.display = "block";
			     	purity_lt_ey_tbox.style.display = "block";

			     	rate_lt_ey_label.style.display = "block";
			     	rate_lt_ey_tbox.style.display = "block";
			     	mtamt_lt_ey_label.style.display = "block";
			     	mtamt_lt_ey_tbox.style.display = "block";
			  	} else 
			  	{
			     	metal_lt_ey_label.style.display = "none";
			     	metal_lt_ey_tbox.style.display = "none";
			     	purity_lt_ey_label.style.display = "none";
			     	purity_lt_ey_tbox.style.display = "none";

			     	rate_lt_ey_label.style.display = "none";
			     	rate_lt_ey_tbox.style.display = "none";
			     	mtamt_lt_ey_label.style.display = "none";
			     	mtamt_lt_ey_tbox.style.display = "none";
			  	}
			};
		</script>
		<script>
			function cash_lt_ey_radio_edit()
			{
				var cash_lot_entry_radio_edit = document.getElementById("cash_lot_entry_radio_edit");

				var cash_lt_ey_label_edit = document.getElementById("cash_lt_ey_label_edit");
				var cash_lt_ey_tbox_edit = document.getElementById("cash_lt_ey_tbox_edit");

				if (cash_lot_entry_radio_edit.checked == true)
				{
				    cash_lt_ey_label_edit.style.display = "block";
				    cash_lt_ey_tbox_edit.style.display = "block";
			  	} else 
			  	{
			  		cash_lt_ey_label_edit.style.display = "none";
				    cash_lt_ey_tbox_edit.style.display = "none";
			  	}
			};

			function cheque_lt_ey_radio_edit()
			{
				var cheque_lot_entry_radio_edit = document.getElementById("cheque_lot_entry_radio_edit");

				var cheque_lt_ey_label_edit = document.getElementById("cheque_lt_ey_label_edit");
				var cheque_lt_ey_tbox_edit = document.getElementById("cheque_lt_ey_tbox_edit");

				if (cheque_lot_entry_radio_edit.checked == true)
				{
				    cheque_lt_ey_label_edit.style.display = "block";
				    cheque_lt_ey_tbox_edit.style.display = "block";
			  	} else 
			  	{
			     	cheque_lt_ey_label_edit.style.display = "none";
			     	cheque_lt_ey_tbox_edit.style.display = "none";
			  	}
			};

			function rtgs_lt_ey_radio_edit()
			{
				var rtgs_lot_entry_radio_edit = document.getElementById("rtgs_lot_entry_radio_edit");

				var rtgs_lt_ey_label_edit = document.getElementById("rtgs_lt_ey_label_edit");
				var rtgs_lt_ey_tbox_edit = document.getElementById("rtgs_lt_ey_tbox_edit");
				var bank_lt_ey_label_edit = document.getElementById("bank_lt_ey_label_edit");
				var bank_lt_ey_tbox_edit = document.getElementById("bank_lt_ey_tbox_edit");

				if (rtgs_lot_entry_radio_edit.checked == true)
				{
				    rtgs_lt_ey_label_edit.style.display = "block";
				    rtgs_lt_ey_tbox_edit.style.display = "block";
				    bank_lt_ey_label_edit.style.display = "block";
				    bank_lt_ey_tbox_edit.style.display = "block";
			  	} else 
			  	{
			     	rtgs_lt_ey_label_edit.style.display = "none";
			     	rtgs_lt_ey_tbox_edit.style.display = "none";
			     	bank_lt_ey_label_edit.style.display = "none";
			     	bank_lt_ey_tbox_edit.style.display = "none";
			  	}
			};

			function metal_lt_ey_radio_edit()
			{
				var metal_lot_entry_radio_edit = document.getElementById("metal_lot_entry_radio_edit");

				var metal_lt_ey_label_edit = document.getElementById("metal_lt_ey_label_edit");
				var metal_lt_ey_tbox_edit = document.getElementById("metal_lt_ey_tbox_edit");
				var purity_lt_ey_label_edit = document.getElementById("purity_lt_ey_label_edit");
				var purity_lt_ey_tbox_edit = document.getElementById("purity_lt_ey_tbox_edit");
				var rate_lt_ey_label_edit = document.getElementById("rate_lt_ey_label_edit");
				var rate_lt_ey_tbox_edit = document.getElementById("rate_lt_ey_tbox_edit");
				var mtamt_lt_ey_label_edit = document.getElementById("mtamt_lt_ey_label_edit");
				var mtamt_lt_ey_tbox_edit = document.getElementById("mtamt_lt_ey_tbox_edit");

				if (metal_lot_entry_radio_edit.checked == true)
				{
				    metal_lt_ey_label_edit.style.display = "block";
			     	metal_lt_ey_tbox_edit.style.display = "block";
			     	purity_lt_ey_label_edit.style.display = "block";
			     	purity_lt_ey_tbox_edit.style.display = "block";

			     	rate_lt_ey_label_edit.style.display = "block";
			     	rate_lt_ey_tbox_edit.style.display = "block";
			     	mtamt_lt_ey_label_edit.style.display = "block";
			     	mtamt_lt_ey_tbox_edit.style.display = "block";
			  	} else 
			  	{
			     	metal_lt_ey_label_edit.style.display = "none";
			     	metal_lt_ey_tbox_edit.style.display = "none";
			     	purity_lt_ey_label_edit.style.display = "none";
			     	purity_lt_ey_tbox_edit.style.display = "none";

			     	rate_lt_ey_label_edit.style.display = "none";
			     	rate_lt_ey_tbox_edit.style.display = "none";
			     	mtamt_lt_ey_label_edit.style.display = "none";
			     	mtamt_lt_ey_tbox_edit.style.display = "none";
			  	}
			};
		</script>
		<script>
			function cash_lt_ey_radio_view()
			{
				var cash_lot_entry_radio_view = document.getElementById("cash_lot_entry_radio_view");

				var cash_lt_ey_label_view = document.getElementById("cash_lt_ey_label_view");
				var cash_lt_ey_tbox_view = document.getElementById("cash_lt_ey_tbox_view");

				if (cash_lot_entry_radio_view.checked == true)
				{
				    cash_lt_ey_label_view.style.display = "block";
				    cash_lt_ey_tbox_view.style.display = "block";
			  	} else 
			  	{
			  		cash_lt_ey_label_view.style.display = "none";
				    cash_lt_ey_tbox_view.style.display = "none";
			  	}
			};

			function cheque_lt_ey_radio_view()
			{
				var cheque_lot_entry_radio_view = document.getElementById("cheque_lot_entry_radio_view");

				var cheque_lt_ey_label_view = document.getElementById("cheque_lt_ey_label_view");
				var cheque_lt_ey_tbox_view = document.getElementById("cheque_lt_ey_tbox_view");

				if (cheque_lot_entry_radio_view.checked == true)
				{
				    cheque_lt_ey_label_view.style.display = "block";
				    cheque_lt_ey_tbox_view.style.display = "block";
			  	} else 
			  	{
			     	cheque_lt_ey_label_view.style.display = "none";
			     	cheque_lt_ey_tbox_view.style.display = "none";
			  	}
			};

			function rtgs_lt_ey_radio_view()
			{
				var rtgs_lot_entry_radio_view = document.getElementById("rtgs_lot_entry_radio_view");

				var rtgs_lt_ey_label_view = document.getElementById("rtgs_lt_ey_label_view");
				var rtgs_lt_ey_tbox_view = document.getElementById("rtgs_lt_ey_tbox_view");
				var bank_lt_ey_label_view = document.getElementById("bank_lt_ey_label_view");
				var bank_lt_ey_tbox_view = document.getElementById("bank_lt_ey_tbox_view");

				if (rtgs_lot_entry_radio_view.checked == true)
				{
				    rtgs_lt_ey_label_view.style.display = "block";
				    rtgs_lt_ey_tbox_view.style.display = "block";
				    bank_lt_ey_label_view.style.display = "block";
				    bank_lt_ey_tbox_view.style.display = "block";
			  	} else 
			  	{
			     	rtgs_lt_ey_label_view.style.display = "none";
			     	rtgs_lt_ey_tbox_view.style.display = "none";
			     	bank_lt_ey_label_view.style.display = "none";
			     	bank_lt_ey_tbox_view.style.display = "none";
			  	}
			};

			function metal_lt_ey_radio_view()
			{
				var metal_lot_entry_radio_view = document.getElementById("metal_lot_entry_radio_view");

				var metal_lt_ey_label_view = document.getElementById("metal_lt_ey_label_view");
				var metal_lt_ey_tbox_view = document.getElementById("metal_lt_ey_tbox_view");
				var purity_lt_ey_label_view = document.getElementById("purity_lt_ey_label_view");
				var purity_lt_ey_tbox_view = document.getElementById("purity_lt_ey_tbox_view");
				var rate_lt_ey_label_view = document.getElementById("rate_lt_ey_label_view");
				var rate_lt_ey_tbox_view = document.getElementById("rate_lt_ey_tbox_view");
				var mtamt_lt_ey_label_view = document.getElementById("mtamt_lt_ey_label_view");
				var mtamt_lt_ey_tbox_view = document.getElementById("mtamt_lt_ey_tbox_view");

				if (metal_lot_entry_radio_view.checked == true)
				{
				    metal_lt_ey_label_view.style.display = "block";
			     	metal_lt_ey_tbox_view.style.display = "block";
			     	purity_lt_ey_label_view.style.display = "block";
			     	purity_lt_ey_tbox_view.style.display = "block";

			     	rate_lt_ey_label_view.style.display = "block";
			     	rate_lt_ey_tbox_view.style.display = "block";
			     	mtamt_lt_ey_label_view.style.display = "block";
			     	mtamt_lt_ey_tbox_view.style.display = "block";
			  	} else 
			  	{
			     	metal_lt_ey_label_view.style.display = "none";
			     	metal_lt_ey_tbox_view.style.display = "none";
			     	purity_lt_ey_label_view.style.display = "none";
			     	purity_lt_ey_tbox_view.style.display = "none";

			     	rate_lt_ey_label_view.style.display = "none";
			     	rate_lt_ey_tbox_view.style.display = "none";
			     	mtamt_lt_ey_label_view.style.display = "none";
			     	mtamt_lt_ey_tbox_view.style.display = "none";
			  	}
			};
			function mem_card_ln_recev_add_radio()
			{
				var mem_card_loan_received_add_radio = document.getElementById("mem_card_loan_received_add_radio");
				var mem_card_no = document.getElementById("lbl_mem_card_no_pop");
				var mem_card_no_tbox = document.getElementById("mem_card_no_tbox");
				// var mem_card_trans_no = document.getElementById("mem_card_trans_no");
				var mem_card_avail_points_tbox = document.getElementById("mem_card_avail_points_tbox");
				var mem_card_redeem_tbox = document.getElementById("mem_card_redeem_tbox");
				var mem_card_details_tbox = document.getElementById("mem_card_details_tbox");

				if (mem_card_loan_received_add_radio.checked == true)
				{
				    mem_card_no.style.display = "block";
				    mem_card_no_tbox.style.display = "block";
				    mem_card_avail_points_tbox.style.display = "block";
				    mem_card_redeem_tbox.style.display = "block";
				    mem_card_details_tbox.style.display = "block";
			  	} else 
			  	{
			     	mem_card_no.style.display = "none";
				    mem_card_no_tbox.style.display = "none";
				    mem_card_avail_points_tbox.style.display = "none";
				    mem_card_redeem_tbox.style.display = "none";
				    mem_card_details_tbox.style.display = "none";
			  	}
			};

			var chit_hand_loan_paid_from_party_add_radio = document.getElementById("chit_hand_loan_paid_from_party_add_radio");
			var hand_ln_sch_paid_from_pty = document.getElementById("hand_ln_sch_paid_from_pty");
			var hand_ln_sch_paid_from_pty_tbox = document.getElementById("hand_ln_sch_paid_from_pty_tbox");
			var hand_ln_avai_bal_paid_from_pty = document.getElementById("hand_ln_avai_bal_paid_from_pty");
			var hand_ln_redeem_amt_paid_from_pty_tbox = document.getElementById("hand_ln_redeem_amt_paid_from_pty_tbox");
			var hand_ln_redeem_detail_paid_from_pty_tbox = document.getElementById("hand_ln_redeem_detail_paid_from_pty_tbox");

			function chit_hd_ln_pdfrm_party_add_radio()
			{
				if (chit_hand_loan_paid_from_party_add_radio.checked == true)
				{
				    hand_ln_sch_paid_from_pty.style.display = "block";
				    hand_ln_sch_paid_from_pty_tbox.style.display = "block";
				    hand_ln_avai_bal_paid_from_pty.style.display = "block";
				    hand_ln_redeem_amt_paid_from_pty_tbox.style.display = "block";
				    hand_ln_redeem_detail_paid_from_pty_tbox.style.display = "block";
			  	} else 
			  	{
			     	hand_ln_sch_paid_from_pty.style.display = "none";
				    hand_ln_sch_paid_from_pty_tbox.style.display = "none";
				    hand_ln_avai_bal_paid_from_pty.style.display = "none";
				    hand_ln_redeem_amt_paid_from_pty_tbox.style.display = "none";
				    hand_ln_redeem_detail_paid_from_pty_tbox.style.display = "none";
			  	}
			};

		</script>
		<script>

				$("#kt_daterangepicker_lot_entry_from").flatpickr({
								dateFormat: "d-m-Y",
							});
				$("#kt_daterangepicker_lot_entry_to").flatpickr({
								dateFormat: "d-m-Y",
							});
				$("#kt_daterangepicker_lot_entry_add_date").flatpickr({
								dateFormat: "d-m-Y",
							});
				$("#kt_daterangepicker_lot_entry_edit_date").flatpickr({
								dateFormat: "d-m-Y",
							});
				$("#kt_daterangepicker_lot_entry_view_date").flatpickr({
								dateFormat: "d-m-Y",
							});

			$("#kt_datatable_responsive").DataTable({
				
				"responsive": true,
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
			$("#add_pur_register_new_entry").DataTable({
				"sorting":false,
				"paging": false,
				// "ordering": false,
				// "aaSorting":[],
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
			$('#add_pur_register_new_entry').wrap('<div class="dataTables_scroll" />');
		</script>
		<script>
			$("#add_pur_register_new_entry_silver").DataTable({
				"sorting":false,
				"paging": false,
				// "ordering": false,
				// "aaSorting":[],
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
			$('#add_pur_register_new_entry').wrap('<div class="dataTables_scroll" />');
		</script>


	</body>
	</html>