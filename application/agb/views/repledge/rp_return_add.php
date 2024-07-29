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
    background-color: #fff;
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
    background-color: #fff;
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
									<h1 class="d-flex align-items-center text-dark fw-bold my-1 fs-3">New RP Return
									<!--begin::Separator-->
									<span class="h-20px border-gray-200 border-start ms-3 mx-2"></span>
									<label class="d-flex align-items-center text-primary fw-bold my-1 fs-5">
										<span>RP Bill No &emsp;-&emsp;</span>
										<span id="billnumberval">-</span>
										<input type="hidden" id="billnumbervall" name="billnumbervall" value=""/>
										<input type="hidden" id="rp_sno" name="rp_sno" value=""/>
										<input type="hidden" id="mixed" name="mixed" value=""/>
										<input type="hidden" id="voucherno" name="voucherno" value=""/>
										
									</label>
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
												<label class="col-lg-1 col-form-label required fw-semibold fs-6">RP Bill No</label>
												<div class="col-lg-2 fv-row fv-plugins-icon-container">
													<input type="text" class="form-control form-control-lg form-control-solid" id="return_rbbillno"  name="return_rbbillno" placeholder="Enter RP Bill No" onchange="getreturnbilldata(this.value);"  value="">
													<div class="fv-plugins-message-container invalid-feedback"></div>
												</div>
												<label class="col-lg-1 col-form-label required fw-semibold fs-6">Rtn Date</label>
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
														<input class="form-control form-control-solid ps-12" placeholder="select Date"name="add_repledge_date"  id="kt_daterangepicker_repledge_add_date" value="<?php echo date("d-m-Y"); ?>" />
													</div>
												</div>
												<div class="col-lg-1">
													<label class="col-form-label required fw-semibold fs-6">Company</label>
												</div>
												<div class="col-lg-2 fv-row">
													<select class="form-select form-select-solid" data-control="select2" id="selectcompany" name="selectcompany" data-hide-search="true">
														<option value="">Select Company</option>
														<option value="0">AGB - Main Branch Saylkudi</option>
														<option value="1">AGB - Kannirajapuram Branch</option>
														<option value="2">AGB - Pernali Branch</option>
													</select>
												</div>
												<div class="col-lg-3 d-flex justify-content-end align-items-center">
													<label class="col-form-label text-center fw-semibold fs-3 me-3">
														<span style="background-color:#5aad52;border-radius: 8px;padding: 5px 15px 5px 15px;">Active</span>
													</label>
												</div>
												<label class="col-lg-1 col-form-label required fw-semibold fs-6">Closing Type</label>
												<div class="col-lg-2">
													<div class="d-flex align-items-center mt-1">
														<label class="form-check form-check-inline form-check-solid me-5 is-invalid">
															<input class=" form-check-input" name="closing_type" type="radio" id="cl_type_normal"  value="0">
														</label>
														<label class=" col-form-label fw-semibold fs-6" style="background-color:#ffdf6f;border-radius: 8px;padding: 5px 5px 5px 5px;">Normal</label>
													</div>
												</div>
												<div class="col-lg-2">
													<div class="d-flex align-items-center mt-1">
														<label class="form-check form-check-inline form-check-solid me-5 is-invalid">
															<input class=" form-check-input" name="closing_type" type="radio" id="cl_type_transfer" value="1">
														</label>
														<label class=" col-form-label fw-semibold fs-6" style="background-color:#ffdf6f;border-radius: 8px;padding: 5px 5px 5px 5px;">Transfer</label>
													</div>
												</div>
											</div>
											<div class="row mt-2">
												<div class="accordion" id="kt_accordion_rp_rtn_add_rp_details">
											    <div class="accordion-item">
											        <h2 class="accordion-header" id="kt_accordion_rp_rtn_add_rp_details_header_1">
											            <button class="accordion-button fw-bold fs-6 collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#kt_accordion_rp_rtn_add_rp_details_body_1" aria-expanded="true" aria-controls="kt_accordion_rp_rtn_add_rp_details_body_1">
											            Repledge Details</button>
											        </h2>
											        <div id="kt_accordion_rp_rtn_add_rp_details_body_1" class="accordion-collapse collapse show" aria-labelledby="kt_accordion_rp_rtn_add_rp_details_header_1" data-bs-parent="#kt_accordion_rp_rtn_add_rp_details">
											            <div class="accordion-body">
											            	<div class="row">
												            	<div class="col-lg-4">
																				<div class="row">
																					<label class="col-lg-4 col-form-label fw-semibold fs-6">Loan Date</label>
																					<label class="col-lg-8 col-form-label fw-bold fs-5" id="loandate">-</label>
																					<input type="hidden" id="loandateval" name="loandateval" value=""/> 
																					<label class="col-lg-4 col-form-label fw-semibold fs-6">Interest (%)</label>
																					<label class="col-lg-8 col-form-label fw-bold fs-5" id="intrestval">0.00</label>
																					<input type="hidden" id="intrestvalue" name="intrestvalue" value="0.00"/> 
																					<label class="col-lg-4 col-form-label fw-semibold fs-6">Months</label>
																					<label class="col-lg-8 col-form-label fw-bold fs-5" id="monthval">0</label>
																					<input type="hidden" id="monthvalue" name="monthvalue" value="0"/> 
																					<label class="col-lg-4 col-form-label fw-semibold fs-6">Loan Amount</label>
																					<label class="col-lg-8 col-form-label fw-bold fs-5" id="loanamtval">0.00</label>
																					<input type="hidden" id="loanamtvalue" name="loanamtvalue" value="0.00"/> 
																				</div>
																			</div>
																			<div class="col-lg-4">
																				<div class="row">
																					<label class="col-lg-3 col-form-label fw-semibold fs-6">Company</label>
																					<label class="col-lg-9 col-form-label fw-bold fs-5" id="companyname">-</label>
																					<input type="hidden" id="companynameval" name="companynameval" value=""/> 
																					<label class="col-lg-3 col-form-label fw-semibold fs-6">Bank</label>
																					<label class="col-lg-9 col-form-label fw-bold fs-5" id="bankname">-</label>
																					<input type="hidden" id="banknameval" name="banknameval" value=""/> 
																					<label class="col-lg-3 col-form-label fw-semibold fs-6">Bank No</label>
																					<label class="col-lg-9 col-form-label fw-bold fs-5" id="bankno">-</label>
																					<input type="hidden" id="banknoval" name="banknoval" value=""/> 
																				</div>
																			</div>
																			<div class="col-lg-4">
																				<div class="row">
																					<label class="col-lg-4 col-form-label fw-semibold fs-6">Iteration</label>
																					<label class="col-lg-8 col-form-label fw-bold fs-5" id="iterationvalue">0.00</label>
																					<input type="hidden" id="iterationval" name="iterationval" value="0.00"/>
																					<label class="col-lg-4 col-form-label fw-semibold fs-6">(+)Interest (%)</label>
																					<label class="col-lg-8 col-form-label fw-bold fs-5" id="plusintrestvalue">0.00</label>
																					<input type="hidden" id="plusintrestval" name="plusintrestval" value="0.00"/>
																					<label class="col-lg-4 col-form-label fw-semibold fs-6">Staff</label>
																					<label class="col-lg-8 col-form-label fw-bold fs-5" id="staffname">-</label>
																					<input type="hidden" id="staffnameval" name="staffnameval" value=""/>
																				</div>
																			</div>
																		</div>
											          	</div>
											        </div>
											    </div>
											  </div>
											</div>
											<div class="row mt-2">
												<div class="accordion" id="kt_accordion_rp_rtn_add_calc_details">
											    <div class="accordion-item">
											        <h2 class="accordion-header" id="kt_accordion_rp_rtn_add_calc_details_header_1">
											            <button class="accordion-button fw-bold fs-6 collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#kt_accordion_rp_rtn_add_calc_details_body_1" aria-expanded="true" aria-controls="kt_accordion_rp_rtn_add_calc_details_body_1">
											            Calculation & Payment Details</button>
											        </h2>
											        <div id="kt_accordion_rp_rtn_add_calc_details_body_1" class="accordion-collapse collapse show" aria-labelledby="kt_accordion_rp_rtn_add_calc_details_header_1" data-bs-parent="#kt_accordion_rp_rtn_add_calc_details">
											            <div class="accordion-body">
											            	<div class="row">
											            		<div class="col-lg-6">
											            			<label class="col-form-label fw-bold fs-4">Calculation</label>
													            	<table class="table align-middle fs-7 gy-2 gs-2" id="rp_rtn_add_view_calc">
																					<tbody class="text-gray-600 fw-semibold fs-5">
																						<tr>
																	            <td>Months</td>
																	            <td colspan="2" class="fw-bold" id="calmonth">0</td>
																	            <input type="hidden" id="calmonth" name="calmonth" value="0" />
																	        	</tr>
																	        
																	        	<tr>
																	            <td>Amount</td>
																	            <td class="fw-bold" id="caltotamt">0.00</td>
																	             <input type="hidden" id="caltotamt" name="caltotamt" value="0.00" />
																	            <td class="fw-bold" id="calpaidamt">0.00</td>
																	            <input type="hidden" id="calpaidamtval" name="calpaidamtval" value="0.00" />
																	        	</tr>
																	        	<tr>
																	            <td>Interest</td>
																	            <td class="fw-bold" id="calintrestamt">0.00</td>
																	            <input type="hidden" id="calintrestamtval" name="calintrestamtval" value="0.00" />
																	            <td class="fw-bold" id="calintrestamttot">0.00</td>
																	            <input type="hidden" id="calintrestamttotval" name="calintrestamttotval" value="0.00" />
																	        	</tr>
																	        	<tr>
																	            <td>Total</td>
																	            <td class="fw-bold" id="caltotal">0.00</td>
																	            <input type="hidden" id="caltotal" name="caltotal" value="" />
																	            <td class="fw-bold" id="calpaidtotalamt">0.00</td>
																	            <input type="hidden" id="calpaidtotalamtval" name="calpaidtotalamtval" value="0.00" />
																	        	</tr>
																	        	<tr>
																	            <td>Balance</td>
																	            <td colspan="2" class="fw-bold" id="calbalanceamt">0.00</td>
																	            <input type="hidden" id="calbalanceamtval" name="calbalanceamtval" value="0.00" />
																	        	</tr>
																				  </tbody>
																				</table>
																			</div>
																			<div class="col-lg-6">
																				<div class="row">
																					<label class="col-form-label fw-bold fs-4">Payment</label>
																					<label class="col-lg-3 col-form-label fw-semibold fs-6">Amount</label>
																					<label class="col-lg-4 col-form-label fw-bold fs-5" id="loanfinaltot">0.00</label>
																					 <input type="hidden" id="loanfinaltotval" name="loanfinaltotval" value="0.00"/>
																				</div>
																				<div class="row">
																					<label class="col-lg-3 col-form-label fw-semibold fs-6">Others</label>
																					<label class="col-lg-4 col-form-label fw-bold fs-5" id="totalothers">0.00</label>
																					 <input type="hidden" id="totalothersval" name="totalothersval" value="0.00"/>
																				</div>
																				<div class="row">
																					<label class="col-lg-3 col-form-label fw-semibold fs-6">Discount</label>
																					<label class="col-lg-4 col-form-label fw-bold fs-5" id="totaldiscount">0.00</label>
																					 <input type="hidden" id="totaldiscountval" name="totaldiscountval" value="0.00"/>
																				</div>
																				<div class="row">
																					<label class="col-lg-3 col-form-label fw-semibold fs-6">Net Pay</label>
																					<label class="col-lg-4 col-form-label fw-bold fs-5" id="calnetpayamt">0.00</label>
																					<input type="hidden" id="calnetpayamt" name="calnetpayamt" value="0.00"/>
																				</div>
																				<div class="row">
																					<label class="col-lg-3 col-form-label required fw-semibold fs-6">Cash Paid</label>
																					<div class="col-lg-4">
																						<input type="number" class="form-control form-control-lg form-control-solid" id="cashamtval" id="cashamtval" value="" onchange="checktotalamtvalue(this.value);" />
																						<div class="fv-plugins-message-container invalid-feedback"></div>
																					</div>
																				</div>
																			</div>
																		</div>
											          	</div>
											        </div>
											    </div>
											  </div>
											</div>
											<div class="row mt-2">
												<div class="accordion" id="kt_accordion_rp_rtn_add_rp_item_details">
											    <div class="accordion-item">
											        <h2 class="accordion-header" id="kt_accordion_rp_rtn_add_rp_item_details_header_1">
											            <button class="accordion-button fw-bold fs-6 collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#kt_accordion_rp_rtn_add_rp_item_details_body_1" aria-expanded="false" aria-controls="kt_accordion_rp_rtn_add_rp_item_details_body_1">
											            Repledge Item Details</button>
											        </h2>
											        <div id="kt_accordion_rp_rtn_add_rp_item_details_body_1" class="accordion-collapse collapse" aria-labelledby="kt_accordion_rp_rtn_add_rp_item_details_header_1" data-bs-parent="#kt_accordion_rp_rtn_add_rp_item_details">
											            <div class="accordion-body">
											            	<div class="row mt-2">
																			<!-- <label class="col-form-label fw-bold fs-4">Repledge Item Details</label> -->
																			<table id="rp_rcpt_entry_table" class="table align-middle table-row-dashed table-striped table-hover fs-7 gy-1 gs-2">
																				<thead>
																				  <tr class="text-start text-muted fw-bold fs-7 gs-0">
																				  	<th class="min-w-25px">Sno</th>
																				  	<th class="min-w-80px">Loan Date</th>
																				   	<th class="min-w-100px">Company</th>
																				   	<th class="min-w-80px">Loan No</th>
																				   	<th class="min-w-80px">Party</th>
																				   	<th class="min-w-80px">Item Type</th>
																				   	<th class="min-w-80px">Item</th>
																				   	<th class="min-w-100px">SubItem</th>
																				   	<th class="min-w-50px">Qty</th>
																				    <th class="min-w-80px">Weight(gms)</th>
																						<th class="min-w-80px">Loan Amount</th>
																						<th class="min-w-50px">Action</th>
																				  </tr>
																				</thead>
																				<tbody class="text-gray-600 fw-semibold">
																					
																					
																				</tbody>
																			</table>
																		</div>
																		<div class="d-flex justify-content-end">
																			<label class="col-lg-1 col-form-label fw-bold fs-4 text-end">Total</label>
																			<label class="col-lg-1 col-form-label fw-bold fs-4 text-center" id="totalqty">-</label>
																			<input type="hidden" name="totalqtyval" id="totalqtyval" value=""/>
																			<label class="col-lg-1 col-form-label fw-bold fs-4 text-end" id="totalweight">-</label>
																			<input type="hidden" name="totalweightval" id="totalweightval" value=""/>
																			<label class="col-lg-2 col-form-label fw-bold fs-4 text-center" id="totalamtval">-</label>
																			<input type="hidden" name="totalamtvalue" id="totalamtvalue" value=""/>
																			<!-- <label class="col-lg-1"></label> -->
																		</div>
											          	</div>
											        </div>
											    </div>
											  </div>
											</div>
											
											<div class="d-flex justify-content-end mt-6">
												<button type="reset" class="btn btn-secondary me-3"  onclick="closepagelistview();" >Cancel</button>
												<button type="submit" class="btn btn-primary"  onclick="saverepledgereturn();">Save Changes</button>
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
		<!--begin::Modal - View Pledge Info-->
		<div class="modal fade" id="view_pledge_info" tabindex="-1" aria-hidden="true">
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
							<h1 class="mb-3">Pledge Info</h1>	
						</div>
						<!--end::Heading-->
						<div class="row">
							<div class="col-lg-8">
								<div class="row">
									<label class="col-lg-2 col-form-label fw-semibold fs-6">Date</label>
									<label class="col-lg-4 col-form-label fw-bold fs-5">06-03-2022</label>
									<label class="col-lg-2 col-form-label fw-semibold fs-6">Loan No</label>
									<label class="col-lg-4 col-form-label fw-bold fs-5">3SP-02/22</label>
									<label class="col-lg-2 col-form-label fw-semibold fs-6">Company</label>
									<label class="col-lg-10 col-form-label fw-bold fs-5">AGB - Main Branch Sayalkudi</label>
									<label class="col-lg-2 col-form-label fw-semibold fs-6">Party</label>
									<label class="col-lg-10 col-form-label fw-bold fs-5">Raj</label>
								</div>
							</div>
							<div class="col-lg-4">
								<div class="row">
									<div class="col-lg-6 fv-row mt-2">
										<div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url(assets/images/Party.jpg)">
											<div class="image-input-wrapper"  style="background-image: url(assets/images/Party.jpg)"></div>
										</div>
									</div>
									<div class="col-lg-6 fv-row mt-2">
										<div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url(assets/images/Jewel.jpg)">
											<div class="image-input-wrapper"  style="background-image: url(assets/images/Jewel.jpg)"></div>
										</div>
									</div>
								</div>
							</div>
							<table  class="table align-middle table-row-dashed table-striped table-hover fs-7 gy-4 gs-2" id="rp_add_view_pledge_info_table">
								<thead>
									<tr class="text-start text-muted fw-bold fs-7 gs-0">
				            <th class="min-w-50px">Sno</th>
				            <th class="min-w-50px">Item</th>
				            <th class="min-w-80px">Sub Item</th>
				            <th class="min-w-300px">Description</th>
				            <th class="min-w-80px">Purity</th>
				            <th class="min-w-80px">Weight(gms)</th>
									</tr>
								</thead>
								<tbody class="text-gray-600 fw-semibold">
									<tr>
				            <td>1</td>
										<td class="ple1">Ring</td>
				            <td class="ple1">Ring</td>
				            <td class="ple1">916K ANJ JR Hallmark Seal Ullathu RS Initial Ullathu</td>
				            <td class="ple1">916</td>
				            <td class="ple1">8.000</td>
				        	</tr>
				        	<!-- <tr>
				            <td>2</td>
										<td class="ple1">Chain</td>
				            <td class="ple1">Chain</td>
				            <td class="ple1">916R Hallmark SKJ Sealed</td>
				            <td class="ple1">916</td>
				            <td class="ple1">6.400</td>
				        	</tr> -->
							  </tbody>
							</table>
						</div>
					</div>
					<!--end::Modal body-->
				</div>
				<!--end::Modal content-->
			</div>
			<!--end::Modal dialog-->
		</div>
		<!--end::Modal - View Pledge Info-->
		<div class="modal fade show" id="showview_pledge_info" tabindex="-1" 
		aria-modal="true"  style="display: none; padding-left: 0px;background: #000000a8;">
			<div class="modal-dialog modal-xl">
				<div class="modal-content rounded">
					<div class="modal-header justify-content-end border-0 pb-0">
						<div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
							<span class="svg-icon svg-icon-1">
								<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" onclick="closemodel();">
									<rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="currentColor"></rect>
									<rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="currentColor"></rect>
								</svg>
							</span>
						</div>
					</div>
					<div class="modal-body pt-0 pb-15 px-5 px-xl-20">
						<div class="mb-13 text-center">
							<h1 class="mb-3">Pledge Info</h1>	
						</div>
						<div class="row">
							<div class="col-lg-8">
								<div class="row">
									<label class="col-lg-2 col-form-label fw-semibold fs-6">Date</label>
									<label class="col-lg-4 col-form-label fw-bold fs-5" id="ADDED_TIME">-</label>
									<label class="col-lg-2 col-form-label fw-semibold fs-6">Loan No</label>
									<label class="col-lg-4 col-form-label fw-bold fs-5" id="BILLNO">-</label>
									<label class="col-lg-2 col-form-label fw-semibold fs-6">Company</label>
									<label class="col-lg-10 col-form-label fw-bold fs-5" id="COMPANYNAME">-</label>
									<label class="col-lg-2 col-form-label fw-semibold fs-6">Party</label>
									<label class="col-lg-10 col-form-label fw-bold fs-5" id="party">-</label>
								</div>
							</div>
							<div class="col-lg-4">
								<div class="row">
									<div class="col-lg-6 fv-row mt-2">
										<div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url(assets/images/Party.jpg)">
											<div class="image-input-wrapper" style="background-image: url(assets/images/Party.jpg)"></div>
										</div>
									</div>
									<div class="col-lg-6 fv-row mt-2">
										<div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url(assets/images/Jewel.jpg)">
											<div class="image-input-wrapper" style="background-image: url(assets/images/Jewel.jpg)"></div>
										</div>
									</div>
								</div>
							</div>
							<div id="rp_add_view_pledge_info_table_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer"><div class="row"></div><div class="table-responsive"><div class="dataTables_scroll"><table class="table align-middle table-row-dashed table-striped table-hover fs-7 gy-4 gs-2 dataTable no-footer" id="rp_add_view_pledge_info_table" data-role="tooltip" aria-describedby="rp_add_view_pledge_info_table_info">
								<thead>
									<tr class="text-start text-muted fw-bold fs-7 gs-0"><th class="min-w-50px sorting" tabindex="0" aria-controls="rp_add_view_pledge_info_table" rowspan="1" colspan="1" aria-label="Item: activate to sort column ascending" style="width: 0px;">Item</th><th class="min-w-80px sorting" tabindex="0" aria-controls="rp_add_view_pledge_info_table" rowspan="1" colspan="1" aria-label="Sub Item: activate to sort column ascending" style="width: 0px;">Sub Item</th><th class="min-w-300px sorting" tabindex="0" aria-controls="rp_add_view_pledge_info_table" rowspan="1" colspan="1" aria-label="Description: activate to sort column ascending" style="width: 0px;">Description</th><th class="min-w-80px sorting" tabindex="0" aria-controls="rp_add_view_pledge_info_table" rowspan="1" colspan="1" aria-label="Purity: activate to sort column ascending" style="width: 0px;">Purity</th><th class="min-w-80px sorting" tabindex="0" aria-controls="rp_add_view_pledge_info_table" rowspan="1" colspan="1" aria-label="Weight(gms): activate to sort column ascending" style="width: 0px;">Weight(gms)</th></tr>
								</thead>
								<tbody class="text-gray-600 fw-semibold">
									<tr class="oddd" >
										<td class="ple1" id="PLEDGENAME">-</td>
										<td class="ple1" id="JEWEL_TYPE">-</td>
										<td class="ple1" id="description">-</td>
										<td class="ple1" id="PURITY">-</td>
										<td class="ple1" id="NETWEIGHT">-</td>
									</tr>
								</tbody>
								</table></div></div><div class="row"><div class="col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start">
								<div class="dataTables_info" id="rp_add_view_pledge_info_table_info" role="status" aria-live="polite">Showing 1 to 3 of 3 records</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!--end::Modal body-->
			</div>
			<!--end::Modal content-->
		</div>
		<!--end::Modal dialog-->
		<!--begin::Modal - delete repledge-->
		<div class="modal fade" id="save_repledge"  >
			<!--begin::Modal dialog-->
			<div class="modal-dialog modal-m">
				<!--begin::Modal content-->
				<div class="modal-content rounded">
					<div class="swal2-icon swal2-warning swal2-icon-show" style="display: flex;">
						<div class="swal2-icon-content">&#10003;</div></div>
						<div class="swal2-html-container" id="swal2-html-container">Are you sure you want to Repledge?</div>
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
			var baseurl= $("#baseurl").val();
			$("#return_rbbillno").autocomplete(
			{ 
          valueKey:'title',
        	source:[
        	{
			        url:baseurl+'repledge/getreceiptrbbillno?query=%QUERY%',
			        type:'remote',
			        ajax:{
			          dataType : 'json',
        			}
      		}]
	    }).on('selected.xdsoft',function(e,suggestion,ui)
			{ 
					$('#billnumberval').html(suggestion.BILLNO);
				  $('#billnumbervall').val(suggestion.BILLNO);
				  getreturnbilldata(suggestion.BILLNO);
				
  		});
		</script>

		<script type="text/javascript">
					function closemodel()
					{
							$('#showview_pledge_info').hide();
					}
					function closepagelistview()
					{
							  var urldirect = baseurl+'repledge/repledge_return';
								window.location.href = urldirect;
					}
		</script>
		<script type="text/javascript">
				function getreturnbilldata(id)
				{
					
						var formData = new FormData();
						formData.append('impbillno', id);
						$.ajax(
						{
								url: baseurl+'repledge/getrepledgereturn_data',
								type: 'POST',
								data: formData,
								async: false,
								cache: false,
								contentType: false,
								processData: false,
								success: function (response) 
								{
									console.log(response);
									var returnedData = JSON.parse(response);
					
					
					 if(returnedData.return_code==0)
					 {
							console.log(returnedData.returnloan_data[0].CALC_PRINCIPAL);
							//$('#rp_rcpt_entry_table tbody').html('');
							$("#loandate").html(returnedData.returnloan_data[0].ENDATE);
							$("#companyname").html(returnedData.returnloan_data[0].COMPANYNAME);
							$("#loanamtval").html(returnedData.returnloan_data[0].AMOUNT);
							$("#intrestval").html(returnedData.returnloan_data[0].INTEREST);
							$("#monthval").html(returnedData.returnloan_data[0].MONTHS);
							$("#bankname").html(returnedData.returnloan_data[0].BANK);
							$("#bankno").html(returnedData.returnloan_data[0].BANKNO);
							$("#staffname").html(returnedData.returnloan_data[0].STAFF);
							$("#iterationvalue").html(returnedData.returnloan_data[0].ITERATION);
							$("#plusintrestvalue").html(returnedData.returnloan_data[0].PLUSINT);

							$('#calmonth').html(returnedData.months);
							$('#calmonth').val(returnedData.months);
							$('#caltotdays').html(returnedData.days1);
							$('#caltotdays').val(returnedData.days1);

							$("#calmonth").html(returnedData.returnloan_data[0].MONTHS);
							$("#caltotdays").html('0');
							$("#caltotamt").html(returnedData.returnloan_data[0].AMOUNT);
							if(returnedData.returnloan_data[0].CALC_PRINCIPAL){

										CALC_PRINCIPAL =returnedData.returnloan_data[0].CALC_PRINCIPAL;
								 
							}
							else{
								 		CALC_PRINCIPAL ='0.00';

							}

							if(returnedData.returnloan_data[0].CALC_INTEREST){

										CALC_INTEREST =returnedData.returnloan_data[0].CALC_INTEREST;
								 
							}
							else{
								 		CALC_INTEREST ='0.00';

							}

							

							console.log(CALC_PRINCIPAL);
							$("#calpaidamt").html(CALC_PRINCIPAL);
							$("#calintrestamttot").html(CALC_INTEREST);
							$("#calintrestamttotval").val(CALC_INTEREST);
							$("#loandateval").val(returnedData.returnloan_data[0].LOANDATE);
							$("#companynameval").val(returnedData.returnloan_data[0].COMPANYNAME);
							$("#loanamtvalue").val(returnedData.returnloan_data[0].AMOUNT);
							$("#intrestvalue").val(returnedData.returnloan_data[0].INTEREST);
							$("#monthvalue").val(returnedData.returnloan_data[0].MONTHS);
							$("#banknameval").val(returnedData.returnloan_data[0].BANK);
							$("#banknoval").val(returnedData.returnloan_data[0].BANKNO);
							$("#staffnameval").val(returnedData.returnloan_data[0].STAFF);
							$("#iterationval").val(returnedData.returnloan_data[0].ITERATION);
							$("#plusintrestval").val(returnedData.returnloan_data[0].PLUSINT);

						  $("#rp_sno").val(returnedData.returnloan_data[0].RP_SNO);
						  $("#mixed").val(returnedData.returnloan_data[0].MIXED);
						  $("#voucherno").val(returnedData.returnloan_data[0].VOUCHER_SNO);
						  
							$("#calmonth").val(returnedData.returnloan_data[0].MONTHS);
							$("#caltotdays").val('0');
							$("#caltotamt").val(returnedData.returnloan_data[0].AMOUNT);
							$("#calpaidamtval").val(CALC_PRINCIPAL);
							
							var intresttotalval = $("#intrestvalue").val();
							var intrestcal = parseFloat(intresttotalval/100);
							var caltotamt = $('#caltotamt').val();
							var finaltotalinterst = parseFloat(intrestcal)* parseFloat(caltotamt);
							console.log(finaltotalinterst);

							var monthvaluee= $('#calmonth').html();
							var totalintval =  parseInt(finaltotalinterst) * parseInt(monthvaluee);
							console.log(totalintval);
							$("#calintrestamt").html(totalintval);
							$("#calintrestamtval").val(totalintval);
							
							var pricipaltot = $("#calpaidamtval").val();
							var intresttot = $("#calintrestamttotval").val();
							var totalll = parseFloat(pricipaltot) + parseFloat(intresttot);

							if(totalll==0)
							{

								tott ='0.00';
							}
							else{
								tott =totalll;
							}

							$("#calpaidtotalamt").html(tott);
							$("#calpaidtotalamtval").val(tott);
						
							var finalamt = parseFloat(caltotamt) + parseFloat(totalintval);
							var finalamtpayamt = parseFloat(totalll) + parseFloat(finalamt);


							var paidamountvalue = $('#calpaidamt').html();
							var finalcalamount = finalamtpayamt - paidamountvalue;

							$("#caltotal").html(finalamt);
							$("#caltotal").val(finalamt);


							var amounttotal = $('#caltotal').html();
							var paidamountval = $('#calpaidtotalamtval').val();

							var finalamountvaluee= amounttotal - paidamountval;

							$("#calbalanceamt").html(finalamountvaluee);
							$("#calbalanceamt").val(finalamountvaluee);

							$("#loanfinaltot").html(finalamountvaluee);
							$("#loanfinaltotval").val(finalamountvaluee);
							


							console.log(returnedData.returnloan_data[0].OTHERS);
							if(returnedData.returnloan_data[0].OTHERS!="")
							{
								  $("#totalothers").html(returnedData.returnloan_data[0].OTHERS);
						 		 $("#totalothersval").val(returnedData.returnloan_data[0].OTHERS);
							}
						 else	if(returnedData.returnloan_data[0].OTHERS=='.00')
							{
								  $("#totalothers").html(returnedData.returnloan_data[0].OTHERS);
						 		 $("#totalothersval").val(returnedData.returnloan_data[0].OTHERS);
							}
							else
							{
 								  $("#totalothers").html('0.00');
						 		  $("#totalothersval").val('0.00');
							}
							
							



							if(returnedData.returnloan_data[0].DISCOUNT)
							{
								  $("#totaldiscount").html(returnedData.returnloan_data[0].DISCOUNT);
						 		 $("#totaldiscountval").val(returnedData.returnloan_data[0].DISCOUNT);
							}
						 else	if(returnedData.returnloan_data[0].DISCOUNT=='.00')
							{
								  $("#totaldiscount").html(returnedData.returnloan_data[0].DISCOUNT);
						 		 $("#totaldiscountval").val(returnedData.returnloan_data[0].DISCOUNT);
							}
							else
							{
 								  $("#totaldiscount").html('0.00');
						 		  $("#totaldiscountval").val('0.00');
							}
						
					
						
							
							var others      = $('#totalothersval').val();
							var discount    = $("#totaldiscountval").val();

								
								if(discount=='.00'){
										discountvalue='0.00';

								}
								else{
										discountvalue=discount;

								}
								if(others=='.00'){
										othersvalue='0.00';

								}
								else{
										othersvalue=others;

								}
							var discountsum = parseInt(othersvalue) + parseInt(discountvalue);
						console.log(discountsum);

							var nettotpay   = parseInt(discountsum) +  parseInt(finalamountvaluee);



							$("#calnetpayamt").html(nettotpay);
							$("#calnetpayamt").val(nettotpay);
							
							if(returnedData.repledgereturn_data[0] !="")
							{
								//	$('.odd').hide();
								var totalamtval = 0;
								var totqryval = 0;
								var totweightval = 0;
								var tbl = document.querySelector('#rp_rcpt_entry_table tbody');

								// A function to produce a HTML table row as a string.
								var template = function template(d,index) 
								{
									totalamtval = parseFloat(d.AMOUNT) + parseFloat(totalamtval);
									totqryval = parseFloat(d.QTY) + parseFloat(totqryval);
									totweightval = parseFloat(d.WEIGHT) + parseFloat(totweightval);
									console.log(d.NAME);
									
									return '<tr>' 
									+ '<td class="classfontwight" id="loannumber" style="display:none;">' 
									+ d.BILLNO 
									+ '</td>' 
									+ '<td class="classfontwight" id="value">' 
									+ index
									+ '</td>' 
									+ '<td class="classfontwight">' 
									+ d.ENDATE 
									+ '</td>' 
									+ '<td class="classfontwight">' 
									+ d.COMPANYNAME 
									+ '</td>' 
									+ '<td class="classfontwight" id="loannumber">' 
									+ d.BILLNO 
									+ '</td>' 
									+ '<td class="classfontwight">' 
									+ d.PARTYNAME 
									+ '</td>' 
									+ '<td class="classfontwight">' 
									+ d.PLEDGES 
									+ '</td>' 
									+ '<td class="classfontwight">' 
									+ d.PLEDGES 
									+ '</td>'
									+ '<td class="classfontwight">' 
									+ d.PLEDGES 
									+ '</td>'
									+ '<td class="classfontwight">' 
									+ d.QTY 
									+ '</td>'
									+ '<td class="classfontwight">' 
									+ d.WEIGHT 
									+ '</td>'
									+ '<td class="classfontwight">' 
									+ d.AMOUNT 
									+ '</td>'
									+'<td class="classfontwight">' 
									+ '<span class="text-end" data-index='+d.BILLNO +' id="billnumber'+index+'" onclick="loadreceipt_pledge_info('+index+');"><i class="bi bi-eye-fill eyc"></i></span>' 
									+ '</td>'
									+ '</tr>';
								};

								var index =1;
								var render = function render(tbl) 
								{
									return function (d) {
										return tbl.innerHTML += d.map(function (i) 
										{
											
											return template(i,index++);
										}).join('');
									};

								};
								// Fire the render function. 
								render(tbl)(returnedData.repledgereturn_data);

								console.log(returnedData.repledgereturn_data);
								$('.odd').hide();
								$('#totalamtval').html(totalamtval);
								$('#totalqty').html(totqryval);
								$('#totalweight').html(totweightval);

								$('#totalqtyval').val(totqryval);
								$('#totalweightval').val(totweightval);
								$('#totalamtvalue').val(totalamtval);
							}
							
					}
					else if(returnedData.return_code == 2)
					{
						Swal.fire({
							title: 'error!',
							text: 'This Bill No Not Receipted..Please check..!',
							icon: 'error',
							confirmButtonText: 'Okay'
							})
					}
					else if(returnedData.return_code == 3)
					{
						Swal.fire({
							title: 'error!',
							text: 'Already Repledge Returned..Please check..!',
							icon: 'error',
							confirmButtonText: 'Okay'
							})
					}
					else
					{
						Swal.fire({
							title: 'error!',
							text: 'Loan Closed.Please Check Bill Number',
							icon: 'error',
							confirmButtonText: 'Okay'
							})
					}

								}
						});
					   
				}
	</script>
	<script>
		
		function checktotalamtvalue(amtval)
		{
			var totalamtval = $('#calnetpayamt').val();
			if(totalamtval == amtval)
			{
				$('#cashamtval').removeClass('error');
				return false;
			}
			else
			{
				$('#cashamtval').focus();
				$('#cashamtval').addClass('error');
				Swal.fire({
							title: 'error!',
							text: 'please Cash Paid Your Loan Amount only.',
							icon: 'error',
							confirmButtonText: 'Okay'
							})
							return false;
			}
		}
		function saverepledgereturn()
		{
			var company = $('#selectcompany').val();
			var cashamtval =$('#cashamtval').val();
			var cl_type_normal = $('#cl_type_normal').val();
			var cl_type_transfer = $('#cl_type_transfer').val();
			var return_rbbillno = $('#return_rbbillno').val();


			if(return_rbbillno.trim() ==""){
				$('#return_rbbillno').focus();
				$('#return_rbbillno').addClass('error');
				Swal.fire({
					title: 'error!',
					text: 'Please Enter Your RB Bill no',
					icon: 'error',
					confirmButtonText: 'Okay'
				})
				$('#return_rbbillno').focus();
				return false;

			}
			else if(company.trim() =="")
			{
				$('#selectcompany').focus();
				$('#selectcompany').addClass('error');
				Swal.fire({
					title: 'error!',
					text: 'Please Select Your Company',
					icon: 'error',
					confirmButtonText: 'Okay'
				})
				$('#selectcompany').focus();
				return false;
			}
			else if(!$('#cl_type_normal').prop('checked') && !$('#cl_type_transfer').prop('checked'))
			{
				$('#cl_type_normal').focus();
				$('#cl_type_normal').addClass('error');
				$('#cl_type_transfer').addClass('error');
				Swal.fire({
					title: 'error!',
					text: 'Please Select Your Closing Type.',
					icon: 'error',
					confirmButtonText: 'Okay'
				})
				return false;
			}
			else if(cashamtval.trim() == "")
			{
				$('#selectcompany').removeClass('error');
				$('#cl_type_normal').removeClass('error');
				$('#cl_type_transfer').removeClass('error');
				$('#cashamtval').focus();
				$('#cashamtval').addClass('error');
			
				Swal.fire({
					title: 'error!',
					text: 'Please Enter Your Cash Paid Amount ',
					icon: 'error',
					confirmButtonText: 'Okay'
				})
				return false;
				
			}
			
			else
			{
				$('#save_repledge').hide();
				returnsavefunction();
			}
		}

		function returnsavefunction()
		{
			//alert('success');
			if($('#cl_type_normal').prop('checked'))
			{
				var cl_type = 'NORMAL';
				
			}
			else
			{
				var cl_type = 'TRANSFER';
				
			}
			var billnumbervall = $('#billnumbervall').val();
			var selectcompany = $('#selectcompany').val();
			var loandateval = $('#loandateval').val();
			var intrestvalue = $('#intrestvalue').val();
			var monthval = $('#monthval').val();
			var loanamtvalue = $('#loanamtvalue').val();
			var banknameval = $('#banknameval').val();
			var banknoval = $('#banknoval').val();
			var iterationval = $('#iterationval').val();
			var plusintrestval = $('#plusintrestval').val();
			var staffnameval = $('#staffnameval').val();
			var calmonth = $('#calmonth').val();
			var caltotdays = $('#caltotdays').val();
			var caltotamt = $('#caltotamt').val();
			var calpaidamt = $('#calpaidamtval').val();
			var calintrestamt = $('#calintrestamt').val();
			var calintrestamttot = $('#calintrestamttot').val();
			var caltotal = $('#caltotal').val();
			var calbalanceamt = $('#calbalanceamtval').val();
			var loanfinaltot = $('#loanfinaltotval').val();
			var totalothers = $('#totalothersval').val();
			var totaldiscount = $('#totaldiscountval').val();
			var calnetpayamt = $('#calnetpayamt').val();
			var cashamtval = $('#cashamtval').val();
			var totalqty = $('#totalqtyval').val();
			var totalweight = $('#totalweightval').val();
			var totalamtval = $('#totalamtvalue').val();
			var rp_sno = $('#rp_sno').val();
			var mixed = $('#mixed').val();
			var voucherno = $('#voucherno').val();
		

			
			

			var formData = new FormData();
			formData.append('billnumberval', billnumbervall);
			formData.append('selectcompany', selectcompany);
			formData.append('cl_type', cl_type);
			formData.append('loandateval', loandateval);
			formData.append('intrestvalue', intrestvalue);
			formData.append('monthval', monthval);
			formData.append('loanamtvalue', loanamtvalue);
			formData.append('banknameval', banknameval);
			formData.append('banknoval', banknoval);
			formData.append('iterationval', iterationval);
			formData.append('plusintrestval', plusintrestval);
			formData.append('staffnameval', staffnameval);
			formData.append('calmonth', calmonth);
			formData.append('caltotdays', caltotdays);
			formData.append('caltotamt', caltotamt);
			formData.append('calpaidamt', calpaidamt);
			formData.append('calintrestamt', calintrestamt);
			formData.append('calintrestamttot', calintrestamttot);
			formData.append('caltotal', caltotal);
			formData.append('calbalanceamt', calbalanceamt);
			formData.append('loanfinaltot', loanfinaltot);
			formData.append('totalothers', totalothers);
			formData.append('totaldiscount', totaldiscount);
			formData.append('calnetpayamt', calnetpayamt);
			formData.append('cashamtval', cashamtval);
			formData.append('totalqty', totalqty);
			formData.append('totalweight', totalweight);
			formData.append('totalamtval', totalamtval);
			formData.append('rp_sno', rp_sno);
			formData.append('mixed', mixed);
			formData.append('voucherno', voucherno);

			

			$.ajax(
			{
				url: baseurl+'repledge/saverepledgereturn',
				type: 'POST',
				data: formData,
				async: false,
				cache: false,
				contentType: false,
				processData: false,
				success: function (response) 
				{
					var returnedData = JSON.parse(response);
					console.log(returnedData);
					if(returnedData.return_code == 0)
					{
						Swal.fire({
							title: 'Success',
							text: 'Repledge Successfully Returned..',
							icon: 'success',
							confirmButtonText: 'Okay'
						})
						var urldirect = baseurl+'repledge/repledge_return';
						window.location.href = urldirect;
					}
					else
					{
						Swal.fire({
							title: 'error',
							text: 'Repledge Returned Not Return Please Check..',
							icon: 'error',
							confirmButtonText: 'Okay'
						})
					}
				}
			});
		}
		</script>


		<script>
		function loadreceipt_pledge_info(index)
			{
				
				var billno = $('#billnumber'+index).data('index');

				//alert(billno);
				var formData = new FormData();
				formData.append('billnovall', billno);

			    $.ajax(
				{
				    url: baseurl+'repledge/getreceiptdetailsshow',
					type: 'POST',
					data: formData,
					async: false,
					cache: false,
					contentType: false,
					processData: false,
					success: function (response) 
					{
						const returnedData = JSON.parse(response);
						console.log(returnedData.receiptpledgedata[0].ADDED_TIME);
						
						
						if(returnedData.return_code == 0)
						{
							console.log(returnedData.receiptpledgedata[0]);
							$('#ADDED_TIME').html(returnedData.receiptpledgedata[0].ENDATE);
							$('#BILLNO').html(returnedData.receiptpledgedata[0].BILLNO);
							$('#COMPANYNAME').html(returnedData.receiptpledgedata[0].COMPANYNAME);
							$('#party').html(returnedData.receiptpledgedata[0].NAME);
							$('#PLEDGENAME').html(returnedData.receiptpledgedata[0].PLEDGENAME);
							$('#JEWEL_TYPE').html(returnedData.receiptpledgedata[0].JEWEL_TYPE);
							$('#PURITY').html(returnedData.receiptpledgedata[0].PURITY);
							$('#NETWEIGHT').html(returnedData.receiptpledgedata[0].WEIGHT);
							$('#description').html(returnedData.receiptpledgedata[0].PLEDGEINFO)
							$('#showview_pledge_info').show();
						}
						else
						{
							$('#ADDED_TIME').html('-');
							$('#BILLNO').html('-');
							$('#COMPANYNAME').html('-');
							$('#party').html('-');
							$('#PLEDGENAME').html('-');
							$('#JEWEL_TYPE').html('-');
							$('#PURITY').html('-');
							$('#NETWEIGHT').html('-');
							$('#description').html('-');
							
						}
					}
				});
			}
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
			$("#rp_rtn_add_view_calc").DataTable({
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
				  // "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
				  // "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
				  ">"
				});
			// $('#rp_rtn_add_view_calc').wrap('<div class="dataTables_scroll_rp_entry" />');
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
      $("#rp_rcpt_entry_table").kendoTooltip({
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
			$("#rp_rcpt_entry_table").DataTable({
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
			$('#rp_rcpt_entry_table').wrap('<div class="dataTables_scroll_rp_entry" />');
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
	</body>
	<!--end::Body-->
</html>