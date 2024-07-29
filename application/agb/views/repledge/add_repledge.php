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
													<div class="mb-13 text-center"><h1 class="mb-3">New Repledge</h1></div>
													<!--end::Heading-->
													<div class="row mb-6">
														<div class="col-lg-12">
															<div style="padding:10px 10px 10px 10px !important;box-shadow: 0 3px 6px #00002947; border-radius: 5px; background-color: #f5f5f1 !important;">
																<div class="row">
																	<label class="col-lg-1 col-form-label required fw-semibold fs-6">RP.BillNo</label>
																	<div class="col-lg-2 fv-row fv-plugins-icon-container">
																		<input type="text" name="rp_bill_no" id="rp_bill_no" class="form-control form-control-lg form-control-solid" placeholder="RPBillNo" value="">
																		<div class="fv-plugins-message-container invalid-feedback" id="rp_bill_no_err"></div>	
																	</div>
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
																			<input class="form-control form-control-solid ps-12" placeholder="select Date"name="rp_date"  id="rp_date" value="<?php echo date("d-m-Y"); ?>" />
																			<div class="fv-plugins-message-container invalid-feedback" id="rp_date_err"></div>	
																		</div>
																	</div>
																	<label class="col-lg-1 col-form-label required fw-semibold fs-6">Bank</label>
																	<div class="col-lg-2 fv-row">
																		<select class="form-select form-select-solid" data-control="select2" data-hide-search="true" name="select_rp_bank" id="select_rp_bank">
																			<option value="" selected>Select Bank</option>


																			<?php 
																				foreach($bank_list as $bank){
																				echo "<option value=".$bank['BANKNAME'].">".$bank['BANKNAME']."</option>";
																				}
																			?>
																			
																		</select>

																		<div class="fv-plugins-message-container invalid-feedback" id="select_rp_bank_err"></div>
																	</div>
																	<label class="col-lg-1 col-form-label required fw-semibold fs-6">Bank.No</label>
																	<div class="col-lg-2 fv-row fv-plugins-icon-container">
																		<input type="text" name="bank_no" id="bank_no" class="form-control form-control-lg form-control-solid" placeholder="Bank Number" value="">
																		<div class="fv-plugins-message-container invalid-feedback" id="bank_no_err"></div>
																	</div>
																</div>
																<div class="row mt-2">
																	<div class="btn-group w-lg-25" data-kt-buttons="true" data-kt-buttons-target="[data-kt-button]">
																	    <label class="btn btn-outline-secondary text-muted text-hover-black text-active-black btn-outline btn-active-success active" data-kt-button="true" style="border-color: #6c7072 !important;">
																	        <input class="btn-check" type="radio" name="method" value="1" class="sell_type" />
																	        Mixed
																	    </label>
																	    <label class="btn btn-outline-secondary text-muted text-hover-black text-active-black btn-outline btn-active-success" data-kt-button="true" style="border-color: #6c7072 !important;">
																	        <input class="btn-check" type="radio" name="method" checked="checked" value="2"class="sell_type" />
																	        Individual
																	    </label>
																	    <input type="hidden" name="sell_type" id="sell_type" value="">
																	</div>
																	<label class="col-lg-1 col-form-label fw-semibold fs-6">RP.No</label>
																	<label class="col-lg-1 col-form-label fw-bold fs-5" id="re_sl_no"></label>
																	<div class="col-lg-4">
																		<p type="submit" class="btn btn-sm btn-outline btn-outline-solid btn-outline-warning btn-active-light-primary" onclick="gen_svg();">Generate
																			<span class="ms-3" id="svg_gen" style="visibility: hidden;">
																				<svg xmlns:svg="http://www.w3.org/2000/svg" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.0" width="20px" height="20px" viewBox="0 0 128 128" xml:space="preserve"><g><path fill="#000000" d="M64,128a64,64,0,1,1,64-64A64,64,0,0,1,64,128ZM64,2.75A61.25,61.25,0,1,0,125.25,64,61.25,61.25,0,0,0,64,2.75Z"></path><path fill="#000000" d="M64 128a64 64 0 1 1 64-64 64 64 0 0 1-64 64zM64 2.75A61.2 61.2 0 0 0 3.34 72.4c1.28-3.52 3.9-6.32 7.5-6.86 6.55-1 11.9 2.63 13.6 8.08 3.52 11.27.5 23 15 35.25 19.47 16.46 40.34 13.54 52.84 9.46A61.25 61.25 0 0 0 64 2.75z"></path><animateTransform attributeName="transform" type="rotate" from="0 64 64" to="360 64 64" dur="1200ms" repeatCount="indefinite"></animateTransform></g></svg>
																			</span>
																		</p>
																	</div>
																</div>
															</div><br>
															<div style="padding:10px 10px 10px 10px !important;box-shadow: 0 3px 6px #00002947; border-radius: 5px; background-color: #f5f5f1 !important;">
																<div class="row">
																	<div class="col-lg-2 fv-row fv-plugins-icon-container">
																		<label class="col-form-label fw-semibold fs-6">BillNo/Items</label>
																		<input type="text" name="" class="form-control form-control-lg form-control-solid" placeholder="Enter BillNo/Items">
																		<div class="fv-plugins-message-container invalid-feedback"></div>
																	</div>
																	<div class="col-lg-2 fv-row fv-plugins-icon-container">
																		<label class="col-form-label fw-semibold fs-6">Party Name</label>
																		<input type="text" name="" class="form-control form-control-lg form-control-solid" placeholder="Party Name" readonly>
																		<div class="fv-plugins-message-container invalid-feedback"></div>
																	</div>
																	<div class="col-lg-2 fv-row fv-plugins-icon-container">
																		<label class="col-form-label fw-semibold fs-6">Date</label>
																		<input type="text" name="" class="form-control form-control-lg form-control-solid" placeholder="Date" readonly>
																		<div class="fv-plugins-message-container invalid-feedback"></div>
																	</div>
																	<div class="col-lg-2 fv-row fv-plugins-icon-container">
																		<label class="col-form-label fw-semibold fs-6">Pledges</label>
																		<input type="text" name="" class="form-control form-control-lg form-control-solid" placeholder="Pledges" readonly>
																		<div class="fv-plugins-message-container invalid-feedback"></div>
																	</div>
																	<div class="col-lg-1 fv-row fv-plugins-icon-container">
																		<label class="col-form-label fw-semibold fs-6">Qty</label>
																		<input type="text" name="" class="form-control form-control-lg form-control-solid" placeholder="Qty" readonly>
																		<div class="fv-plugins-message-container invalid-feedback"></div>
																	</div>
																	<div class="col-lg-1 fv-row fv-plugins-icon-container">
																		<label class="col-form-label fw-semibold fs-6">Weight</label>
																		<input type="text" name="" class="form-control form-control-lg form-control-solid" placeholder="Weight">
																		<div class="fv-plugins-message-container invalid-feedback"></div>
																	</div>
																	<div class="col-lg-2 fv-row fv-plugins-icon-container">
																		<label class="col-form-label fw-semibold fs-6">Loan Amt</label>
																		<input type="text" name="" class="form-control form-control-lg form-control-solid" placeholder="Loan Amount">
																		<div class="fv-plugins-message-container invalid-feedback"></div>
																	</div>
																</div>
																<div class="d-flex justify-content-end mt-2">
																	<button type="button" class="btn btn-sm btn-outline btn-outline-solid btn-outline-warning btn-active-light-primary me-3">Add</button>
																	<button type="button" class="btn btn-sm btn-danger">
																		<i class="la la-trash-o fs-3"></i>Del</button>
																</div>
																<table  class="table table-striped table-hover table-row-bordered fs-7 gy-1 gs-2" id="kt_datatable_responsive_newrepledge">
																	<thead>
																		<tr class="fw-bold fs-7 text-gray-800 gs-0">
																            <th class="min-w-50px">S.No</th>
																            <th class="min-w-80px">Item No</th>
																            <th class="min-w-100px">Party Name</th>
																            <th class="min-w-80px">Date</th>
																            <th class="min-w-150px">Pledges</th>
																            <th class="min-w-50px">Qty</th>
																            <th class="min-w-50px">Weight</th>
																            <th class="min-w-80px">Loan Amount</th>
																		</tr>
																	</thead>
																	<tbody>
																		<tr>
																            <td>1</td>
																            <td>545/22</td>
																            <td>Harish</td>
																            <td>25.08.2020</td>
																            <td class="ple1">Ladies Ring with green & Red Stones.Ring slightly damaged at back</td>
																            <td>1</td>
																            <td>5.83 gms</td>
																            <td>50000</td>
																        </tr>
																        <tr>
																            <td>2</td>
																            <td>545/22</td>
																            <td>Harish</td>
																            <td>25.08.2020</td>
																            <td>Valayal with two rose stones</td>
																            <td>1</td>
																            <td>5.83 gms</td>
																            <td>50000</td>
																        </tr>
																        <tr>
																            <td>3</td>
																            <td>545/22</td>
																            <td>Harish</td>
																            <td>25.08.2020</td>
																            <td>Ladies Ring</td>
																            <td>1</td>
																            <td>5.83 gms</td>
																            <td>50000</td>
																        </tr>
																        <tr>
																            <td>4</td>
																            <td>545/22</td>
																            <td>Harish</td>
																            <td>25.08.2020</td>
																            <td>Ladies Ring</td>
																            <td>1</td>
																            <td>5.83 gms</td>
																            <td>50000</td>
																        </tr>
																        <tr>
																            <td>5</td>
																            <td>545/22</td>
																            <td>Harish</td>
																            <td>25.08.2020</td>
																            <td>Ladies Ring</td>
																            <td>1</td>
																            <td>5.83 gms</td>
																            <td>50000</td>
																        </tr>
																        <tr>
																            <td>6</td>
																            <td>545/22</td>
																            <td>Harish</td>
																            <td>25.08.2020</td>
																            <td>Ladies Ring</td>
																            <td>1</td>
																            <td>5.83 gms</td>
																            <td>50000</td>
																        </tr>
																        <tr>
																            <td>7</td>
																            <td>545/22</td>
																            <td>Harish</td>
																            <td>25.08.2020</td>
																            <td>Ladies Ring</td>
																            <td>1</td>
																            <td>5.83 gms</td>
																            <td>50000</td>
																        </tr>
																        <tr>
																            <td>8</td>
																            <td>545/22</td>
																            <td>Harish</td>
																            <td>25.08.2020</td>
																            <td>Ladies Ring</td>
																            <td>1</td>
																            <td>5.83 gms</td>
																            <td>50000</td>
																        </tr>
																        <tr>
																            <td>9</td>
																            <td>545/22</td>
																            <td>Harish</td>
																            <td>25.08.2020</td>
																            <td>Ladies Ring</td>
																            <td>1</td>
																            <td>5.83 gms</td>
																            <td>50000</td>
																        </tr>
																        <tr>
																            <td>10</td>
																            <td>545/22</td>
																            <td>Harish</td>
																            <td>25.08.2020</td>
																            <td>Ladies Ring</td>
																            <td>1</td>
																            <td>5.83 gms</td>
																            <td>50000</td>
																        </tr>
																    </tbody>
																</table>
																<div class="d-flex justify-content-end">
																	<label class="col-lg-1 col-form-label fw-semibold fs-6">Total:</label>
																	<label class="col-lg-1 col-form-label fw-bold fs-5 text-center">3</label>
																	<label class="col-lg-1 col-form-label fw-bold fs-5 text-end">149.300</label>
																	<label class="col-lg-2 col-form-label fw-bold fs-5 text-center">8000.00</label>
																</div>
															</div>
														</div>
													</div>
													<div style="padding:10px 10px 10px 10px !important;box-shadow: 0 3px 6px #00002947; border-radius: 5px; background-color: #f5f5f1 !important;">
														<div class="row">
															<label class="col-lg-1 col-form-label required fw-semibold fs-6">Amount</label>
															<div class="col-lg-2 fv-row fv-plugins-icon-container">
																<input type="text" name="add_amount_repledge" class="form-control form-control-lg form-control-solid" placeholder="Amount" value="8000.00">
																<div class="fv-plugins-message-container invalid-feedback"></div>
															</div>
															<label class="col-lg-1 col-form-label required fw-semibold fs-6">Others</label>
															<div class="col-lg-2 fv-row fv-plugins-icon-container">
																<input type="text" name="add_others_repledge" class="form-control form-control-lg form-control-solid" placeholder="Others" value="0.00">
																<div class="fv-plugins-message-container invalid-feedback"></div>
															</div>
															<label class="col-lg-1 col-form-label required fw-semibold fs-6">Appr.Charge</label>
															<div class="col-lg-2 fv-row fv-plugins-icon-container">
																<input type="text" name="add_apprchrge_repledge" class="form-control form-control-lg form-control-solid" placeholder="Appraiser Charge" value="0.00">
																<div class="fv-plugins-message-container invalid-feedback"></div>
															</div>
															<label class="col-lg-1 col-form-label required fw-semibold fs-6">NetAmount</label>
															<div class="col-lg-2 fv-row fv-plugins-icon-container">
																<input type="text" name="add_netamount_repledge" class="form-control form-control-lg form-control-solid" placeholder="NetAmount" value="8000.00">
																<div class="fv-plugins-message-container invalid-feedback"></div>
															</div>
															<label class="col-lg-1 col-form-label required fw-semibold fs-6">Interest%</label>
															<div class="col-lg-2 fv-row fv-plugins-icon-container">
																<input type="text" name="add_intpercentage_repledge" class="form-control form-control-lg form-control-solid" placeholder="Interest%" value="5">
																<div class="fv-plugins-message-container invalid-feedback"></div>
															</div>
															<label class="col-lg-1 col-form-label required fw-semibold fs-6">Months</label>
															<div class="col-lg-2 fv-row fv-plugins-icon-container">
																<input type="text" name="add_months_repledge" class="form-control form-control-lg form-control-solid" placeholder="Months" value="1">
																<div class="fv-plugins-message-container invalid-feedback"></div>
															</div>
															<label class="col-lg-1 col-form-label required fw-semibold fs-6">Iteration</label>
															<div class="col-lg-2 fv-row fv-plugins-icon-container">
																<input type="text" name="add_iterationmonths_repledge" class="form-control form-control-lg form-control-solid" placeholder="Iteration Months" value="0">
																<div class="fv-plugins-message-container invalid-feedback"></div>
															</div>
															<label class="col-lg-1 col-form-label required fw-semibold fs-6">(+)Int</label>
															<div class="col-lg-2 fv-row fv-plugins-icon-container">
																<input type="text" name="add_plusinterest_repledge" class="form-control form-control-lg form-control-solid" placeholder="Plus Int" value="0">
																<div class="fv-plugins-message-container invalid-feedback"></div>
															</div>
															<label class="col-lg-1 col-form-label fw-semibold fs-6">Staff</label>
															<label class="col-lg-2 col-form-label fw-bold fs-5">Antony</label>
															<label class="col-lg-1 col-form-label fw-semibold fs-6">Company</label>
															<label class="col-lg-3 col-form-label fw-bold fs-5">AGB Main Branch</label>
														</div>
													</div><br>
													<div class="row">	
														<div class="col-lg-12">		
															<div style="padding:10px 10px 10px 10px !important;box-shadow: 0 3px 6px #00002947; border-radius: 5px; background-color: #f5f5f1 !important;">
																<div class="row">
																	<label class="col-lg-2 col-form-label required fw-semibold fs-6">Received Cash</label>
																	<div class="col-lg-2 fv-row fv-plugins-icon-container">
																		<input type="text" name="add_recvdcash_repledge" class="form-control form-control-lg form-control-solid" placeholder="Received Cash" value="8000.00">
																		<div class="fv-plugins-message-container invalid-feedback"></div>
																	</div>
																	<label class="col-lg-2 col-form-label required fw-semibold fs-6">Renewal From</label>
																	<div class="col-lg-2 fv-row fv-plugins-icon-container">
																		<input type="text" name="add_renewalfrom_repledge" class="form-control form-control-lg form-control-solid" placeholder="Renewal From">
																		<div class="fv-plugins-message-container invalid-feedback"></div>
																	</div>
																	<label class="col-lg-1 col-form-label fw-semibold fs-6">Narration</label>
																	<div class="col-lg-3 fv-row fv-plugins-icon-container">
																		<textarea class="form-control form-control-solid" rows="1"></textarea>
																		<div class="fv-plugins-message-container invalid-feedback"></div>
																	</div>
																	<label class="col-lg-1 col-form-label fw-semibold fs-6">Verified</label>
																	<label class="col-lg-2 col-form-label fw-bold fs-5">Roshan</label>
																	<label class="col-lg-1 col-form-label fw-semibold fs-6">Status</label>
																	<label class="col-lg-2 col-form-label fw-bold fs-5">Verified</label>
																</div>
															</div>
														</div>
													</div>
													<div class="d-flex justify-content-end mt-6">
														<!-- <button type="reset" class="btn btn-secondary me-3" data-bs-dismiss="modal">Cancel</button> -->


														<a class="btn btn-secondary me-3" href="<?php echo base_url();?>repledge">
															Cancel
														</a>

														<button type="submit" class="btn btn-primary" id="save_changes_repledge_list">Save Changes</button>
													</div>
												</div>	

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

		function gen_svg()
		{
			var err =0;
			var rp_bill_no = $('#rp_bill_no').val().trim();
			var rp_date = $('#rp_date').val().trim();
			var rp_bank = $('#select_rp_bank').val().trim();
			var rp_bank_no = $('#bank_no').val().trim();
			//var rp_sell_type = $('.sell_type').val().trim();

			if(!rp_bill_no && rp_bill_no == ''){
 				$('#rp_bill_no_err').html('input feilds are required');
 				err++;
			}else{
 				$('#rp_bill_no_err').html('');
			}

			

			if(!rp_date){

				$('#rp_date_err').html('input feilds are required');
				err++;
			}else{
 				$('#rp_date_err').html('');
			}

			if(!rp_bank){

			$('#select_rp_bank_err').html('input feilds are required');
			err++;
			}else{
 				$('#select_rp_bank_err').html('');
			}

			if(!rp_bank_no){

			$('#bank_no_err').html('input feilds are required');
			err++;
			}else{
 				$('#bank_no_err').html('');
			}

			// if(!rp_sell_type){

			// $('#rp_sell_type_err').html('input feilds are required');
			// }else{
 			// 	$('#rp_sell_type_err').html('');
			// }


			

			if(err == 0 ){
				var svg_gen = document.getElementById("svg_gen");
				svg_gen.style.visibility = "visible";

			}



				// setTimeout(function() {
				// 	         svg_gen.style.visibility = "hidden";
				//         }, 2000);

			// var data = "rp_sell_type="+1;

			// var baseurl= $('#baseurl').val();
	          	
	        // $.ajax({
			// 		type:"POST",
			// 		url:baseurl+'repledge/generate_sl',
			// 		data:data
			// 		async: false,
			// 		dataType: "json",
			// 		success: function(result){
			// 			//svg_gen.style.visibility = "hidden";
			// 		}
			// });
			


			
		}

	</script>
	
</body>
<!--end::Body-->
</html>