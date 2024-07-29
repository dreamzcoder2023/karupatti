<?php $this->load->view("common");?>
<script src="<?php echo base_url();?>assets/js/webcam/webcam.min.js"></script>
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
									<h1 class="d-flex align-items-center text-dark fw-bold my-1 fs-3">Sales Return Entry
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
                                       <form action="<?php echo base_url(); ?>/Sales_return/sales_return_save" method="POST"  enctype="multipart/form-data" onsubmit="return sales_return_validation();" >
										<!--begin::Card body-->
										<div class="card-body py-4">
											<div class="loader">
											</div>
											<div class="row">
												<div class="col-lg-6">
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
															<input type="text" name="party_sales" id="party_sales" class="form-control form-control-lg form-control-solid" placeholder="Sales Bill ID"  >
															<div class="fv-plugins-message-container invalid-feedback"></div>
														<input type="hidden" name="first_name_id_hidden" id="first_name_id_hidden" value="">

															<span class="m-form__help text-danger" id="party_sales_err"></span>
															</div>
														<label class="col-lg-2 col-form-label fw-semibold fs-6">Company</label>
														<div class="col-lg-10 fv-row fv-plugins-icon-container">
															<select class="form-select form-select-solid" name="company_id" id="company_id" data-control="select2" data-hide-search="true">	
																<option value="">Select</option>
																<?php foreach($company_list as $clist){ ?>
																<option value="<?php echo $clist['COMPANYCODE'] ?>"><?php echo $clist['COMPANYNAME'] ?></option>
																<?php } ?>
															
															</select>
															<span class="m-form__help text-danger" id="company_id_err"></span>
															</div>
														<label class="col-lg-6 col-form-label fw-bold fs-6"><i class="fa fa-address-card fs-6" aria-hidden="true" title="Membership Card No"></i>&emsp;<span id="membership_card_no" name="membership_card_no">xxxx-xxxx-xxxx-xxxx</span>
														</label>
														<label class="col-lg-3 col-form-label fw-bold fs-6" name="card_type" id="card_type" ><span style="background-color:#FFAA00;border-radius: 8px;padding: 5px 15px 5px 15px;" title="Card Type"> <span  ></span>Gold</span></label>
														<label class="col-lg-3 col-form-label fw-bold fs-6" name="" id=""><i class="fa-solid fa-coins fs-6" title="Available Points"></i>&emsp;<span id="membership_card_points" name="membership_card_points">0</span></label>
													</div>
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
															<span><span name="rating" id="rating"><i class="fa-solid fa-star" ></i>&nbsp;Rating</span></label>
													<input type="hidden" name="party_id" id="party_id">
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
											<div class="accordion" id="kt_accordion_item_list">
											    <div class="accordion-item">
											        <h2 class="accordion-header" id="kt_accordion_item_list_header_1">
											            <button class="accordion-button fw-bold fs-6 collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#kt_accordion_item_list_body_1" aria-expanded="false" aria-controls="kt_accordion_item_list_body_1">
											            Pick Item for Return &emsp; - &emsp; Count &emsp;<span id="return_count" name="return_count"> 0 </span>&emsp; - &emsp; Total Amount &emsp;<span id="return_amount" name="return_amount"> 0.00</span>
											            </button>
											        </h2>
											        <div id="kt_accordion_item_list_body_1" class="accordion-collapse collapse" aria-labelledby="kt_accordion_item_list_header_1" data-bs-parent="#kt_accordion_item_list">
											            <div class="accordion-body">
											           	  <table class="table align-middle table-row-dashed table-striped table-hover fs-7 gy-1 gs-2" id="add_salesreturn_table">
																	    <thead>
																        <tr class="text-start text-muted fw-bold fs-7 gs-0">
															            <th class="min-w-25px">
															            	<label class="form-check form-check-solid is-invalid mt-4">
																				<input class="form-check-input"  name="select_all" type="checkbox" id="select_all"  onclick="select_all1()"> 
																				<span class="fs-7">All</span>
																			</label>
															            </th>
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
											<div class="separator separator-content border-dark my-6"><span class="w-150px fw-bold fs-4">Replace Items</span></div>
											<div class="accordion" id="kt_accordion_tagged_sl_retn">
											    <div class="accordion-item">
											        <h2 class="accordion-header" id="kt_accordion_tagged_sl_retn_header_3">
											            <button class="accordion-button fw-bold fs-6 collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#kt_accordion_tagged_sl_retn_body_3" aria-expanded="false" aria-controls="kt_accordion_tagged_sl_retn_body_3">
														Tagged Item &emsp; - &emsp; Count &emsp;<span id="sales_item_count" name="sales_item_count"> 0</span > &emsp; - &emsp; Total Amount &emsp;<span id="sales_total1" name="sales_total1"> 0.00</span>

											            </button>
											        </h2>
											        <div id="kt_accordion_tagged_sl_retn_body_3" class="accordion-collapse collapse" aria-labelledby="kt_accordion_tagged_sl_retn_header_3" data-bs-parent="#kt_accordion_tagged_sl_retn">
											            <div class="accordion-body">
											           	  <table class="table align-middle table-row-dashed table-striped table-hover fs-7 gy-1 gs-2 dataTable" id="add_return_tag_entry_table">
																	    <thead>
																	        <tr class="text-start text-muted fw-bold fs-7 gs-0">
																	            <th class="min-w-100px">Tag No</th>
																	            <th class="min-w-80px">Item Name</th>
																	            <th class="min-w-100px">Sub Item</th>
																	            <th class="min-w-50px">Img</th>
																	            <th class="min-w-25px">Quality</th>
																							<th class="min-w-25px">Purity(%)</th>
																	            <th class="min-w-80px">Wgt(gms)</th>
																							<th class="min-w-50px">St Wgt(gms)</th>
																							<th class="min-w-50px">Net Wgt(gms)</th>
																							<th class="min-w-50px">HC Amt</th>
																							<th class="min-w-50px">MC Amt</th>
																							<th class="min-w-50px">WC(%)</th>
																							<th class="min-w-50px">Metal wgt(gms)</th>
																	            <th class="min-w-80px">Amount</th>
																	        </tr>
																	    </thead>
																		<tbody class="text-gray-600 fw-semibold">
															    <?php  for($i=0;$i<20;$i++){ ?>
																<tr>
															    		<!--<td><?php echo $i+1; ?></td>-->
															            <td>
															            	<select class="form-select form-select-solid fs-7" data-control="select2" data-hide-search="false" name="tag_no[]" id="tag_no<?php echo $i; ?>" onchange="get_tag_detail(<?php echo $i; ?>);">	
																				<option value="">Select Tag No</option>
																			<?php foreach($tagentry_list as $tlist){ ?>
                                                                                <option value="<?php echo $tlist['tag_id']; ?>"><?php echo $tlist['tag_id']; ?></option>
																				<?php } ?>
																				</select>
																            <!-- <input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex" value="TG-0001/23"> -->
															            </td>
															            <td class="ple1">
																		<input type="text" class="form-control_tex form-control-lg_tex form-control-solid fs-7" value="" name="item1[]" id="item1<?php echo $i ?>" readonly>
																	<input type="hidden" name="sales_type[]" id="sales_type<?php echo $i; ?>"  value=" ">
																	<input type="hidden" name="current_gold_rate" id="current_gold_rate" value="<?php echo $current_rate->GOLDRATE; ?>">
												                    <input type="hidden" name="current_silver_rate" id="current_silver_rate" value="<?php echo $current_rate->SILVERRATE; ?>">
																		</td>
															            <td class="ple1"><input type="text" class="form-control_tex form-control-lg_tex form-control-solid fs-7" value="" name="subitem1[]" id="subitem1<?php echo $i ?>" readonly></td>
															            <td id="tag_entry_image<?php echo $i; ?>" name="tag_entry_image[]">
															            	<div class="image-input mt-2" data-kt-image-input="true">
																				<div class="image-input-wrapper w-40px h-40px" style="background-image: url(<?php echo base_url(); ?>assets/images/jewel.jpg)"></div>
																			
																			</div>
																			</td>
																	<input type="hidden" name="img[]"	id="img<?php echo $i; ?> " value="" >
																	<input type="hidden" class="form-control form-control-lg form-control-solid fs-7" value="0" name="quality[]" id="quality<?php echo $i ?>" >
																	<input type="hidden" class="form-control_tex form-control-lg_tex form-control-solid fs-7" value="" name="subitem[]" id="subitem<?php echo $i ?>" >
																	<input type="hidden" class="form-control_tex form-control-lg_tex form-control-solid fs-7" value="" name="item[]" id="item<?php echo $i ?>" >

															            <td><input type="text" class="form-control form-control-lg form-control-solid fs-7" value="0" name="quality1[]" id="quality1<?php echo $i ?>" ></td>
																		<td><input type="text" class="form-control form-control-lg form-control-solid fs-7" value="0" name="purity[]" id="purity<?php echo $i ?>"></td>
															            <td><input type="text" class="form-control form-control-lg form-control-solid fs-7" value="0" name="weight[]" id="weight<?php echo $i ?>"></td>
																		<td><input type="text" class="form-control form-control-lg form-control-solid fs-7" value="0" name="st_wgt[]" id="st_wgt<?php echo $i ?>"></td>
																		<td><input type="text" class="form-control form-control-lg form-control-solid fs-7" value="0" name="net_wgt[]" id="net_wgt<?php echo $i ?>"></td>
															            <td>
															            	<input type="text" class="form-control form-control-lg form-control-solid fs-7" value="0" name="hc_amt[]" id="hc_amt<?php echo $i ?>">
															            </td>
																		<td>
															            	<input type="text" class="form-control form-control-lg form-control-solid fs-7" value="0" name="mc_amt[]" id="mc_amt<?php echo $i ?>">
															            </td>
																		<td>
															            	<input type="text" class="form-control form-control-lg form-control-solid fs-7" value="0" name="wc_amt[]" id="wc_amt<?php echo $i ?>">
															            </td>
																		<td>
															            	<input type="text" class="form-control form-control-lg form-control-solid fs-7" value="0" name="metal_weight[]" id="metal_weight<?php echo $i ?>">
															            </td>
															            <td><input type="text" class="form-control form-control-lg form-control-solid fs-7" value="0.00" name="sales_amt[]" id="sales_amt<?php echo $i ?>" onkeyup="sales_total()"></td>
															    	</tr>
																	<?php } ?>
															    	
															    </tbody>
																	</table>
											            </div>
											        </div>
											    </div>
											</div><br>
											<div class="accordion" id="kt_accordion_nontagged_sl_retn">
											    <div class="accordion-item">
											        <h2 class="accordion-header" id="kt_accordion_nontagged_sl_retn_header_3">
											            <button class="accordion-button fw-bold fs-6 collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#kt_accordion_nontagged_sl_retn_body_3" aria-expanded="false" aria-controls="kt_accordion_nontagged_sl_retn_body_3">
														Non Tagged Item &emsp; - &emsp; Count &emsp;<span id="nt_count"> 0</span> &emsp; - &emsp; Total Amount &emsp;<span id="nt_tot_amt"> 0.00</span>

											            </button>
											        </h2>
											        <div id="kt_accordion_nontagged_sl_retn_body_3" class="accordion-collapse collapse" aria-labelledby="kt_accordion_nontagged_sl_retn_header_3" data-bs-parent="#kt_accordion_nontagged_sl_retn">
											            <div class="accordion-body">
											           	  <table class="table align-middle table-row-dashed table-striped table-hover fs-7 gy-1 gs-2 dataTable" id="add_return_nontag_entry_table">
																	    <thead>
																	        <tr class="text-start text-muted fw-bold fs-7 gs-0">
																			<th class="min-w-25px">Sno</th>
															            <th class="min-w-125px">Item Type</th>
																		<th class="min-w-125px">Item </th>
															            <th class="min-w-150px">Sub Item</th>
															            <th class="min-w-25px">Img</th>
															            <th class="min-w-25px">Quality</th>
																		<th class="min-w-50px">Purity %</th>
															            <th class="min-w-80px">Weight(gms)</th>
																		<th class="min-w-50px">Stone Wgt(gms)</th>
																		<th class="min-w-80px">Net Wgt(gms)</th>
																		<th class="min-w-50px">Hallmark Charges</th>
																		<th class="min-w-50px">Making Charges</th>
																		<th class="min-w-50px">Wastage Amt(%)</th>
																		<th class="min-w-50px">Metal Wgt(gms)</th>
															            <th class="min-w-80px">Amount</th>
															        </tr>
																	    </thead>
																	    <tbody class="text-gray-600 fw-semibold">
																	    <?php  for($i=0;$i<10;$i++){  ?> 
															    	<tr>
															    		<td> <?php echo $i+1; ?></td>
																		<td> 
																		<select class="form-select form-select-solid fs-7" data-control="select2" data-hide-search="false" id="nt_item_type<?php echo $i; ?>" name="nt_item_type[]" onchange="get_item_nt(<?php echo $i; ?>)">	
																			<option value="">Select </option>
														<?php foreach($metal_type_list as $mtlist)
														{?>
														<option value="<?php echo $mtlist['jewel_type_id'] ;?>"><?php echo $mtlist['jewel_type'];?></option><?php
														 }?>
																				
																			</select>
																		</td>
															    		<td>
															            	<select class="form-select form-select-solid fs-7" data-control="select2" data-hide-search="false" id="nt_item<?php echo $i; ?>" name="nt_item[]" onchange="get_subitem_nt(<?php echo $i; ?>)" >	
																				<option value="">Select</option>
																				
																				<!--<optgroup label="Gold" value="1">
																				<?php foreach($gold_item as $plist){ ?>
																	<option value="<?php echo $plist['SNO']; ?>"><?php echo $plist['ITEMNAME']; ?></option>
																	
																	<?php } ?>
																			    
																			    </optgroup>
																			    <optgroup label="Silver" value="2">
																			    <?php foreach($silver_item as $plist){ ?>
																	<option value="<?php echo $plist['SNO']; ?>"><?php echo $plist['ITEMNAME']; ?></option>
																	
																	<?php } ?>
																			    </optgroup>-->
																			</select>
																		</td>
																		<td>
																		<select class="form-select form-select-solid fs-7" data-control="select2" data-hide-search="false" id="nt_subitem<?php echo $i; ?>" name="nt_subitem[]">	
																				<option value="">Sub Item Name</option>
																			
																			</select>
																		</td>
																		<td>
															            	<div class="image-input mt-2" data-kt-image-input="true">
																			<div class="image-input mt-2" data-kt-image-input="true" style="background-image: url(assets/media/svg/avatars/blank_jwl.svg)" id="load_image_selected<?php echo $i; ?>">

																				<div class="image-input-wrapper w-40px h-40px" style="background-image: url(<?php echo base_url(); ?>assets/media/svg/avatars/blank_jwl.svg)" ></div>
																				<!--end::Preview existing avatar-->
																				<!--begin::Label-->
																				<label class="btn btn-icon btn-active-color-primary w-40px h-25px" data-kt-image-input-action="change" data-bs-toggle="tooltip" data-kt-initialized="1">
																				<a href="#" class="menu-link flex-stack px-3" data-bs-toggle="modal" data-bs-target="#kt_modal_camera" onclick="id_set('<?php echo $i; ?>')"><i class="fa fa-camera" aria-hidden="true"></i></a>
																					<!--begin::Inputs-->
																					<input type="file" name="add_party_redemp[]"  accept=".png, .jpg, .jpeg">
																					<input type="hidden" name="add_party_remove_redemp">
																					<!--end::Inputs-->
																				</label>
																				<!--end::Label-->
																				<!--begin::Cancel-->
																				<span class="btn btn-icon btn-active-color-primary w-25px h-20px" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" data-kt-initialized="1">
																					<i class="bi bi-x fs-3 ms-2"></i>
																				</span>
																				<!--end::Cancel-->
																				<!--begin::Remove-->
																				<span class="btn btn-icon btn-active-color-primary w-25px h-20px" data-kt-image-input-action="remove" data-bs-toggle="tooltip" data-kt-initialized="1">
																					<i class="bi bi-x fs-3 ms-2"></i>
																				</span>
																				<!--end::Remove-->
																				</div>
																			<textarea hidden="hidden" name="inventory_jewel_image_data[]" id="inventory_jewel_image_data<?php echo $i; ?>"></textarea>
																			</div>
															            </td>
															            <td>
																			 
																			<select class="form-select form-select-solid" data-control="select2" data-hide-search="false" id="nt_quality<?php echo $i; ?>" name="nt_quality[]"  onchange="nt_item_purity(<?php echo $i;?>);">	
																	<option value="">Select Quality</option>
																	<?php foreach($purity_list as $plist){ ?>
																	<option value="<?php echo $plist['ITEMPURITYID']; ?>"><?php echo $plist['ITEMPURITYNAME']; ?></option>
																	
																	<?php } ?>
																</select>
																			</td>
																		<td>
																			<input type="text" class="form-control form-control-lg form-control-solid fs-7" id="nt_purity<?php echo $i; ?>" name="nt_purity[]">
																		</td>
																		<td>
																			<input type="text" class="form-control form-control-lg form-control-solid fs-7" id="nt_weight<?php echo $i; ?>" name="nt_weight[]" value="0" onfocus="this.select()" onkeyup="nt_weight_calc(<?php echo $i; ?>)">
																		</td>
																		<td>
																			<input type="text" class="form-control form-control-lg form-control-solid fs-7" id="nt_stone<?php echo $i; ?>" name="nt_stone[]" value="0" onfocus="this.select()" onkeyup="nt_weight_calc(<?php echo $i; ?>)">
																		</td>
																		<td>
																			<input type="text" class="form-control form-control-lg form-control-solid fs-7" id="nt_net_weight<?php echo $i; ?>" name="nt_net_weight[]" value="0" onfocus="this.select()" readonly>
																		</td>
																		<td>
																			<input type="text" class="form-control form-control-lg form-control-solid fs-7" id="nt_hc<?php echo $i; ?>" name="nt_hc[]" value="0" onfocus="this.select()" onkeyup="nt_met_weight_calc(<?php echo $i; ?>)">
																		</td>
																		<td>
																			<input type="text" class="form-control form-control-lg form-control-solid fs-7" id="nt_mc<?php echo $i; ?>" name="nt_mc[]" value="0" onfocus="this.select()" onkeyup="nt_met_weight_calc(<?php echo $i; ?>)">
																		</td>
																		<td>
																			<input type="text" class="form-control form-control-lg form-control-solid fs-7" id="nt_wc<?php echo $i; ?>" name="nt_wc[]" value="0" onfocus="this.select()" onkeyup="nt_met_weight_calc(<?php echo $i; ?>)">
																		</td>
																		<td>
																			<input type="text" class="form-control form-control-lg form-control-solid fs-7" id="nt_metal_weight<?php echo $i; ?>" name="nt_metal_weight[]" value="0" onfocus="this.select()" onkeyup="nt_met_rate_calc(<?php echo $i; ?>)">
																		</td>
																		<td>
																			<input type="text" class="form-control form-control-lg form-control-solid fs-7" id="nt_amount<?php echo $i; ?>" name="nt_amount[]" value="0" onfocus="this.select()"  onkeyup="nt_tot_amt_calc(<?php echo $i; ?>)">
																		</td>
															    	</tr>
																	<?php } ?>
																	    </tbody>
																	</table>
											            </div>
											        </div>
											    </div>
											</div><br>
											<div class="accordion" id="kt_accordion_old_jewel_exchange">
											    <div class="accordion-item">
											        <h2 class="accordion-header" id="kt_accordion_old_jewel_exchange_header_2">
											            <button class="accordion-button fw-bold fs-6 collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#kt_accordion_old_jewel_exchange_body_2" aria-expanded="false" aria-controls="kt_accordion_old_jewel_exchange_body_2">
														Exchange -  Old Metal &emsp; - &emsp; Count &emsp;<span id="oge_count" name="oge_count"> 0 </span>&emsp; - &emsp; Total Amount &emsp;<span id="oge_total1" name="oge_total1"> 0.00</span>

											            </button>
											        </h2>
											        <div id="kt_accordion_old_jewel_exchange_body_2" class="accordion-collapse collapse" aria-labelledby="kt_accordion_old_jewel_exchange_header_2" data-bs-parent="#kt_accordion_old_jewel_exchange">
											            <div class="accordion-body">
											           	  <table class="table align-middle table-row-dashed table-striped table-hover fs-7 gy-1 gs-2 dataTable" id="add_return_oldjewel_entry_table">
																		    <thead>
																		     <!-- style=" background-color: #A7D3F0 !important;border: 1px solid #606060 !important;color: black !important;"> -->
																		        <tr class="text-start text-muted fw-bold fs-7 gs-0">
																		            <th class="min-w-25px">Sno</th>
																		            <th class="min-w-150px">Item Type</th>
																		            <th class="min-w-150px">Item Name</th>
																		            <th class="min-w-150px">Sub Item</th>
																		            <th class="min-w-25px">Quality</th>
																					<th class="min-w-25px">Purity</th>
																		            <th class="min-w-50px">Wgt(gms)</th>
																		            <th class="min-w-50px">St Wgt(gms)</th>
																		            <th class="min-w-50px">Less(gms)</th>
																		            <th class="min-w-50px">Net Wgt(gms)</th>
																		            <th class="min-w-50px">Img</th>
																		            <th class="min-w-100px">Est Amount</th>
																		        </tr>
																		    </thead>
																		    <tbody class="text-gray-600 fw-semibold">
																			<?php for($j=0;$j<10;$j++){ ?>
																<tr>
															    		<td><?php echo $j+1;?> </td>
															            <td>
															            	<select class="form-select form-select-solid fs-7" data-control="select2" data-hide-search="false" id="oge_item_type<?php echo $j; ?>" name="oge_item_type[]" onchange="get_item_old(<?php echo $j; ?>)">	
																			<option value="">Select </option>
														<?php foreach($metal_type_list as $mtlist)
														{?>
														<option value="<?php echo $mtlist['jewel_type_id'] ;?>"><?php echo $mtlist['jewel_type'];?></option><?php
														 }?>
																				
																			</select>
															            </td>
															            <td>
															            	<select class="form-select form-select-solid fs-7" data-control="select2" data-hide-search="false" id="oge_item<?php echo $j; ?>" name="oge_item[]" >	
																				<option value="">Item Name</option>
																				
																			</select>
															            </td>
															            <td>
																		<input type="text" class="form-control form-control-lg form-control-solid fs-7" value="" id="oge_subitem<?php echo $j; ?>" name="oge_subitem[]" >

															            	<!--<select class="form-select form-select-solid fs-7" data-control="select2" data-hide-search="false" id="oge_subitem<?php echo $j; ?>" name="oge_subitem[]">	
																				<option value="">Sub Item Name</option>
																			
																			</select>-->
															            </td>
															            <td>
															            	<!--<input type="text" class="form-control form-control-lg form-control-solid" value="" id="oge_purity<?php echo $j; ?>" name="oge_quality[]">-->
															            	<select class="form-select form-select-solid fs-7" data-control="select2" data-hide-search="false" id="oge_quality<?php echo $j; ?>" name="oge_quality[]" onchange="item_purity(<?php echo $j;?>);">	
																				<option value="">Select Purity</option>
																				<?php foreach($purity_list as $plist){   ?>			
																					<option value="<?php echo $plist['ITEMPURITYID'];  ?>"><?php echo $plist['ITEMPURITYNAME'] ; ?></option>
																					<?php  } ?>
																			</select>
																		
															            </td>
																		
															            <td>
															            	<input type="text" class="form-control form-control-lg form-control-solid fs-7" value="" id="oge_purity<?php echo $j; ?>" name="oge_purity[]" >

															            	
															            </td>
																		<td>
															            	<input type="text" class="form-control form-control-lg form-control-solid fs-7" value="0" id="oge_weight<?php echo $j; ?>" name="oge_weight[]" onkeyup="oge_net_weight(<?php echo $j; ?>)">

															            	
															            </td>
															            <td>
															            	<input type="text" class="form-control form-control-lg form-control-solid fs-7" value="0" id="oge_st_weight<?php echo $j; ?>" name="oge_st_weight[]" onkeyup="oge_net_weight(<?php echo $j; ?>)">

															            	
															            </td>
															            <td>
															            	<input type="text" class="form-control form-control-lg form-control-solid fs-7" value="0" id="oge_less<?php echo $j; ?>" name="oge_less[]" onkeyup="oge_net_weight(<?php echo $j; ?>)">

															            	
															            </td>
															            <td>
															            	<input type="text" class="form-control form-control-lg form-control-solid fs-7" value="0" id="oge_net_weight<?php echo $j; ?>" name="oge_net_weight[]" onkeyup="oge_weight()">

															            
															            </td>
															            <td>
															            	
																		<div class="image-input mt-2" data-kt-image-input="true">
																		<div class="image-input mt-2" data-kt-image-input="true" style="background-image: url(assets/media/svg/avatars/blank_jwl.svg)" id="load_image_selected1<?php echo $j; ?>">
																				<div class="image-input-wrapper w-40px h-40px" style="background-image: url(<?php echo base_url(); ?>assets/media/svg/avatars/blank_jwl.svg)"></div>
																				<!--end::Preview existing avatar-->
																				<!--begin::Label-->
																				<label class="btn btn-icon btn-active-color-primary w-40px h-25px" data-kt-image-input-action="change" data-bs-toggle="tooltip" data-kt-initialized="1">
																				<a href="#" class="menu-link flex-stack px-3" data-bs-toggle="modal" data-bs-target="#kt_modal_camera1" onclick="id_set1('<?php echo $j; ?>')"><i class="fa fa-camera" aria-hidden="true"></i></a>
																					<!--begin::Inputs-->
																					<input type="file" name="add_party_redemp1[]" id="add_party_redemp" accept=".png, .jpg, .jpeg">
																					<input type="hidden" name="add_party_remove_redemp">
																					<!--end::Inputs-->
																				</label>
																				<!--end::Label-->
																				<!--begin::Cancel-->
																				<span class="btn btn-icon btn-active-color-primary w-25px h-20px" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" data-kt-initialized="1">
																					<i class="bi bi-x fs-3 ms-2"></i>
																				</span>
																				<!--end::Cancel-->
																				<!--begin::Remove-->
																				<span class="btn btn-icon btn-active-color-primary w-25px h-20px" data-kt-image-input-action="remove" data-bs-toggle="tooltip" data-kt-initialized="1">
																					<i class="bi bi-x fs-3 ms-2"></i>
																				</span>
																				<!--end::Remove-->
																				</div>
																			<textarea hidden="hidden" name="inventory_jewel_image_data1[]" id="inventory_jewel_image_data1<?php echo $j; ?>"></textarea>
																			</div>
															            </td>
															            <td>
															            	<input type="text" class="form-control form-control-lg form-control-solid fs-7" value="0"  id="oge_est_amount<?php echo $j; ?>" name="oge_est_amount[]" onkeyup="oge_total()">

															            	
															            </td>
															    	</tr>
																	<?php } ?>
																		    </tbody>
																		</table>
											            </div>
											        </div>
											    </div>
											</div><br>
											<div class="row mt-2">
												<div class="col-lg-8">
													<div class="row">
														<div class="col-lg-6">
															<div class="px-4" style="border:1.9px solid black;border-radius: 10px;">
																<label class="col-lg-12 col-form-label fw-bold fs-6 text-center">Sales</label>
																<table>
																	<thead class="col-form-label fw-semibold fs-6">
																		<td class="col-lg-3">Type</td>
																		<td class="col-lg-3">Count</td>
																		<td class="col-lg-4">Wgt(gms)</td>
																		<td class="col-lg-3">Amount</td>
																	</thead>
																	<tbody class="col-form-label fw-bold fs-6">
																		<tr>
																			<td class="col-lg-3">Gold</td>
																			<td class="col-lg-3" ><span id="pre_sales_gold_count" name="pre_sales_gold_count">0</span></td>
																			<td class="col-lg-4"><span id="pre_sales_gold_weight" name="pre_sales_gold_weight">0</span></td>
																			<td class="col-lg-3"><span id="pre_sales_gold_amount" name="pre_sales_gold_amount">0</span></td>
																		</tr>
																		<tr>
																			<td class="col-lg-3">Silver</td>
																			<td class="col-lg-3"><span  id="pre_sales_silver_count" name="pre_sales_silver_count">0</span></td>
																			<td class="col-lg-4"><span  id="pre_sales_silver_weight" name="pre_sales_silver_weight">0</span></td>
																			<td class="col-lg-3"><span  id="pre_sales_silver_amount" name="pre_sales_silver_amount">0</span></td>
																		</tr>
																	</tbody>
																</table>
																<div class="col-lg-12 d-flex justify-content-center align-items-center">
																	<label class="col-form-label fw-semibold fs-6">Total Amount &nbsp;</label>
																	<label class="col-form-label fw-bold fs-3" id="pre_sales_amount" name="pre_sales_amount"> 0.00</label>
																</div>
															</div>
														</div>
														<div class="col-lg-6">
															<div class="px-4" style="border:1.9px solid black;border-radius: 10px;">
																<label class="col-lg-12 col-form-label fw-bold fs-6 text-center">Sales Return</label>
																<table>
																	<thead class="col-form-label fw-semibold fs-6">
																		<td class="col-lg-3">Type</td>
																		<td class="col-lg-3">Count</td>
																		<td class="col-lg-4">Wgt(gms)</td>
																		<td class="col-lg-3">Amount</td>
																	</thead>
																	<tbody class="col-form-label fw-bold fs-6">
																		<tr>
																			<td class="col-lg-3">Gold</td>
																			<td class="col-lg-3" id="return_gold_count" name="return_gold_count">0</td>
																			<td class="col-lg-4" id="return_gold_weight" name="return_gold_weight">0.000</td>
																			<td class="col-lg-3" id="return_gold_amount" name="return_gold_amount">0.00</td>
																		</tr>
																		<tr>
																			<td class="col-lg-3">Silver</td>
																			<td class="col-lg-3" id="return_silver_count" name="return_silver_count">0</td>
																			<td class="col-lg-4" id="return_silver_weight" name="return_silver_weight">0.000</td>
																			<td class="col-lg-3" id="return_silver_amount" name="return_silver_amount">0.00</td>
																		</tr>
																	</tbody>
																</table>
																<div class="col-lg-12 d-flex justify-content-center align-items-center">
																	<label class="col-form-label fw-semibold fs-6">Total Amount &nbsp;</label>
																	<label class="col-form-label fw-bold fs-3"  id="return_amount1" name="return_amount1"> 0.00</label>
																</div>
															</div>
														</div>
													</div>
													<div class="row mt-2">
														<div class="col-lg-6">
															<div class="px-4" style="border:1.9px solid black;border-radius: 10px;">
																<label class="col-lg-12 col-form-label fw-bold fs-6 text-center">Replace Metal</label>
																<table>
																	<thead class="col-form-label fw-semibold fs-6">
																		<td class="col-lg-3">Type</td>
																		<td class="col-lg-3">Count</td>
																		<td class="col-lg-4">Wgt(gms)</td>
																		<td class="col-lg-3">Amount</td>
																	</thead>
																	<tbody class="col-form-label fw-bold fs-6">
																		<tr>
																			<td class="col-lg-3">Gold</td>
																			<td class="col-lg-3" name="sales_gold_count" id="sales_gold_count">0</td>
																			<td class="col-lg-4" name="sales_gold_weight" id="sales_gold_weight">0.000</td>
																			<td class="col-lg-3" name="sales_gold_amount" id="sales_gold_amount">0.00</td>
																		
																			<input type="hidden" id="return_count_1" name="return_count_1">
																			<input type="hidden" id="return_amount_1" name="return_amount_1">
																			<input type="hidden" id="return_gold_count_1" name="return_gold_count_1">
																			<input type="hidden" id="return_gold_weight_1" name="return_gold_weight_1">
																			<input type="hidden" id="return_gold_amount_1" name="return_gold_amount_1">
																			<input type="hidden" id="return_silver_count_1" name="return_silver_count_1">
																			<input type="hidden" id="return_silver_weight_1" name="return_silver_weight_1">
																			<input type="hidden" id="return_silver_amount_1" name="return_silver_amount_1">
																			<input type="hidden" id="sales_net_payable2" name="sales_net_payable2">
																		
																			<input type="hidden" id="sales_gold_count_1" name="sales_gold_count_1">
																	<input type="hidden" id="sales_gold_weight_1" name="sales_gold_weight_1">
																	<input type="hidden" id="sales_gold_amount_1" name="sales_gold_amount_1">
																	<input type="hidden" id="sales_silver_count_1" name="sales_silver_count_1">
																	<input type="hidden" id="sales_silver_weight_1" name="sales_silver_weight_1">
																	<input type="hidden" id="sales_silver_amount_1" name="sales_silver_amount_1">
																
																	<input type="hidden" id="oge_gold_count_1" name="oge_gold_count_1">
																	<input type="hidden" id="oge_gold_weight_1" name="oge_gold_weight_1">
																	<input type="hidden" id="oge_gold_total_1" name="oge_gold_total_1">
																	<input type="hidden" id="oge_silver_total_1" name="oge_silver_total_1">
																	<input type="hidden" id="oge_silver_weight_1" name="oge_silver_weight_1">
																	<input type="hidden" id="oge_silver_amount_1" name="oge_silver_amount_1">

																	<input type="hidden" id="pge_gold_count_1" name="pge_gold_count_1">
																	<input type="hidden" id="pge_gold_weight_1" name="pge_gold_weight_1">
																	<input type="hidden" id="pge_gold_amount_1" name="pge_gold_amount_1">
																	<input type="hidden" id="pge_silver_count_1" name="pge_silver_count_1">
																	<input type="hidden" id="pge_silver_weight_1" name="pge_silver_weight_1">
																	<input type="hidden" id="pge_silver_amount_1" name="pge_silver_amount_1">
																		</tr>
																		<tr>
																			<td class="col-lg-3">Silver</td>
																			<td class="col-lg-3" name="sales_silver_count" id="sales_silver_count">0</td>
																			<td class="col-lg-4"  name="sales_silver_weight" id="sales_silver_weight">0.000</td>
																			<td class="col-lg-3" name="sales_silver_amount" id="sales_silver_amount">0.00</td>
																		</tr>
																	</tbody>
																</table>
																<div class="col-lg-12 d-flex justify-content-center align-items-center">
																	<label class="col-form-label fw-semibold fs-6">Total Amount &nbsp;</label>
																	<label class="col-form-label fw-bold fs-3" id="sales_total" name="sales_total"> 0.00</label>
																</div>
															</div>
														</div>
														<div class="col-lg-6">
															<div class="px-4" style="border:1.9px solid black;border-radius: 10px;">
																<label class="col-lg-12 col-form-label fw-bold fs-6 text-center">Exchange Old Metal</label>
																<table>
																	<thead class="col-form-label fw-semibold fs-6">
																		<td class="col-lg-3">Type</td>
																		<td class="col-lg-3">Count</td>
																		<td class="col-lg-4">Wgt(gms)</td>
																		<td class="col-lg-3">Amount</td>
																	</thead>
																	<tbody class="col-form-label fw-bold fs-6">
																		<tr>
																			<td class="col-lg-3">Gold</td>
																			<td class="col-lg-3" name="oge_gold_count" id="oge_gold_count">0</td>
																			<td class="col-lg-4" name="oge_gold_weight" id="oge_gold_weight">0.000</td>
																			<td class="col-lg-3" name="oge_gold_total" id="oge_gold_total">0.00</td>
																		</tr>
																		<tr>
																			<td class="col-lg-3">Silver</td>
																			<td class="col-lg-3" name="oge_silver_count" id="oge_silver_count">0</td>
																			<td class="col-lg-4" name="oge_silver_weight" id="oge_silver_weight">0.000</td>
																			<td class="col-lg-3" name="oge_silver_total" id="oge_silver_total">0.00</td>
																			<input type="hidden"  id="oge_total_1" name="oge_total_1" value="0">
																			</tr>
																	</tbody>
																</table>
																<div class="col-lg-12 d-flex justify-content-center align-items-center">
																	<label class="col-form-label fw-semibold fs-6">Total Amount &nbsp;</label>
																	<label class="col-form-label fw-bold fs-3" id="oge_total" name="oge_total"> 0.00</label>
																</div>
															</div>
														</div>
													</div>
												</div>
												<div class="col-lg-4">
													<div class="row">
															<!-- <label class="col-lg-12 col-form-label fw-bold fs-5 text-center">Formula's</label> -->
															<label class="col-lg-8 col-form-label fw-bold fs-5 text-center">Payment Info</label>
															<div class="col-lg-2">
															<div class="btn btn-sm btn-outline btn-outline-solid btn-outline-warning btn-active-light-primary me-2" data-bs-toggle="modal" data-bs-target="#kt_modal_formulas">Calculation</div>
														</div>
														<div class="col-lg-12">
																<label class="col-form-label fw-semibold fs-6">Replace Value = <label id="calc_sales_value" name="calc_sales_value">0</label> - <label id="calc_exchange_value" name="calc_exchange_value">0</label></label>
															</div>
															<div class="col-lg-12">
																<label class="col-form-label fw-semibold fs-6"><b>Replace Value = <label id="calc_replace_value" name="calc_replace_value">0.00</label></b></label>
															</div>
															<div class="col-lg-12">
																<label class="col-form-label fw-semibold fs-6">Sales Return Value = <label id="calc_return_value" name="calc_return_value">0</label> - <label id="calc_replace_value1" name="calc_replace_value1">0</label></label>
															</div>
															<div class="col-lg-12">
																<label class="col-form-label fw-semibold fs-6"><b>Sales Return Value = <label id="calc_return_value1" name="calc_return_value1">0.00</label></b></label>
															</div>
															<div class="col-lg-12">
																<label class="col-form-label fw-semibold fs-6">Sales Payment = <label id="calc_balance_value" name="calc_balance_value">0</label> - <label id="calc_return_value2" name="calc_return_value2">0</label></label>
															</div>
															<div class="col-lg-12">
																<label class="col-form-label fw-semibold fs-6"><b>Sales Payment = <label id="calc_payment_value" name="calc_payment_value"> 0.00</label></b></label>
															</div>
															<div class="d-flex justify-content-center">
																<label class="fw-bold fs-1">Net Payable &emsp; </label>
																&emsp;<label class="fw-bold fs-1" id="return_net_payable" name="return_net_payable" >0.00</label>
															<input type="hidden" id="return_net_payable_1" name="return_net_payable_1" value='0'>
															<input type="hidden" id="return_paid_amount_1" name="return_paid_amount_1" value='0'>
															<input type="hidden" id="return_balance_amount_1" name="return_balance_amount_1" value='0'>
															<input type="hidden" id="paid_from" name="paid_from" value="">
															</div>
															<!-- <div class="col-lg-12">
																<label class="col-form-label fw-semibold fs-6">To be Payment from Party</label>
																
															</div> -->
													</div>
												</div>
											</div>
											<div id="paid_from_company" name="paid_from_company" style="display:none;">
											<div class="row"  >
												<div class="col-lg-2">
													<label class="form-check form-check-inline form-check-solid is-invalid py-5">
														<input class="form-check-input" name="" type="checkbox"id="refund_radio" onclick="rfund_radio()">
														<span class="col-form-label fw-semibold fs-6">Refund</span>
													</label>
												</div>
												<!--<div class="col-lg-2">
													<label class="form-check form-check-inline form-check-solid is-invalid py-5">
														<input class="form-check-input" name="" type="checkbox"id="chit_radio" onclick="cr_chit_radio()">
														<span class="col-form-label fw-semibold fs-6">Credit Chit</span>
													</label>
												</div>-->
											</div>
											</div>
											<div class="row">
												<label class="col-lg-6 col-form-label fw-bold fs-5" id="cr_chit_label" style="display:none">Credit Chit Details</label>
											</div>
											<div class="row">
												<div class="col-lg-1">
													<label class="col-form-label fw-semibold fs-6" id="chit_dd_lebel" style="display:none">Chit</label>
												</div>
												<div class="col-lg-2 fv-row fv-plugins-icon-container" id="chit_dd_tbox" style="display:none">
													<select class="form-select form-select-solid" data-control="select2" onchange="chit_dropdown()" id="chit_cr_check_tbox">
														<option value="">Select Chit</option>
														<option value="1">SelvaMagal</option>				
														<option value="2">ThangaMagal - Cash</option>
														<option value="3">ThangaMagal - Gold</option>
													</select>
												</div>
												<label class="col-lg-1 col-form-label fw-semibold fs-6" id="chit_pay_amt_label" style="display: none;">Pay Amt</label>
												<div class="col-lg-2 fv-row fv-plugins-icon-container" id="chit_pay_amt_tbox" style="display: none;">
													<input type="text" class="form-control form-control-lg form-control-solid" placeholder="Amount" >
													<div class="fv-plugins-message-container invalid-feedback"></div>
												</div>
												<label class="col-lg-1 col-form-label fw-bold fs-6"  id="chit_balance_label" style="display: none;">Balance</label>
												<label class="col-lg-1 col-form-label fw-bold fs-6"id="chit_balance_tbox" style="display: none;">0.00</label>
											</div>
											<div class="row">
												<label class="col-form-label fw-bold fs-5" id="paymt_fm_cmy" style="display: none;">Paid From Company</label>
											</div>
											<div class="row">
												<div class="col-lg-2 fv-row fv-plugins-icon-container fv-plugins-bootstrap5-row-invalid" id="cash_fm_cmy" style="display:none;">
													<div class="d-flex align-items-center mt-1">
														<label class="form-check form-check-inline form-check-solid me-5 is-invalid">
															<input class="form-check-input" name="" type="checkbox" value="1" id="cash_paid_from_company_add_radio" onclick="cash_pdfrm_cmy_add_radio()">
														</label>
														<label class="col-form-label fw-semibold fs-6 me-5">Cash</label>
													</div>
												</div>
												<div class="col-lg-2 fv-row fv-plugins-icon-container fv-plugins-bootstrap5-row-invalid" id="cheque_fm_cmy" style="display:none;">
													<div class="d-flex align-items-center mt-1">
														<label class="form-check form-check-inline form-check-solid me-5 is-invalid">
															<input class="form-check-input" name="" type="checkbox" value="1" id="cheque_paid_from_company_add_radio" onclick="cheque_pdfrm_cmy_add_radio()">
														</label>
														<label class="col-form-label fw-semibold fs-6">Cheque</label>
													</div>
												</div>
												<div class="col-lg-2 fv-row fv-plugins-icon-container fv-plugins-bootstrap5-row-invalid" id="rtgs_fm_cmy" style="display:none;">
													<div class="d-flex align-items-center mt-1">
														<label class="form-check form-check-inline form-check-solid me-5 is-invalid">
															<input class="form-check-input" name="" type="checkbox" value="1" id="rtgs_paid_from_company_add_radio" onclick="rtgs_pdfrm_cmy_add_radio()">
														</label>
														<label class="col-form-label fw-semibold fs-6">RTGS</label>
													</div>
												</div>
												<div class="col-lg-2 fv-row fv-plugins-icon-container fv-plugins-bootstrap5-row-invalid" id="upi_fm_cmy" style="display:none;">
													<div class="d-flex align-items-center mt-1">
														<label class="form-check form-check-inline form-check-solid me-5 is-invalid">
															<input class="form-check-input" name="" type="checkbox" value="1" id="upi_paid_from_company_add_radio" onclick="upi_pdfrm_cmy_add_radio()">
														</label>
														<label class="col-form-label fw-semibold fs-6">UPI</label>
													</div>
												</div>
												
										
											</div>
											<div class="row">
												<label class="col-lg-1 col-form-label fw-semibold fs-6" id="cash_paid_from_cmy_label" style="display:none;">Cash</label>
												<div class="col-lg-2 fv-row fv-plugins-icon-container" id="cash_paid_from_cmy_tbox" style="display:none;">
													<input type="text" class="form-control form-control-lg form-control-solid" id="pfc_cash_amt" name="pfc_cash_amt" placeholder="Amount" value="0" onkeyup="pfc_total()" >
													<div class="fv-plugins-message-container invalid-feedback"></div>
												</div>
												<div class="col-lg-2 fv-row fv-plugins-icon-container" id="cash_detail_paid_from_cmy_tbox" style="display:none;">
													<textarea class="form-control form-control-solid" rows="1" placeholder="Details" id="pfc_cash_details" name="pfc_cash_details"></textarea>
												</div>
											</div>
											<div class="row">
												<label class="col-lg-1 col-form-label fw-semibold fs-6" id="cheque_paid_from_cmy" style="display:none;">Cheque</label>
												<div class="col-lg-2 fv-row fv-plugins-icon-container"id="cheque_amt_paid_from_cmy_tbox" style="display:none;">
													<input type="text" class="form-control form-control-lg form-control-solid" placeholder="Amount"  value="0" id="pfc_cheque_amt" name="pfc_cheque_amt" onkeyup="pfc_total()">
													<div class="fv-plugins-message-container invalid-feedback"></div>
												</div>
												<div class="col-lg-2 fv-row fv-plugins-icon-container" id="cheque_no_paid_from_cmy_tbox" style="display:none;">
													<input type="text" class="form-control form-control-lg form-control-solid" placeholder="Cheque No" id="pfc_cheque_num" name="pfc_cheque_num" >
													<div class="fv-plugins-message-container invalid-feedback"></div>
												</div>
												<div class="col-lg-3 fv-row fv-plugins-icon-container" id="cheque_com_bank_paid_from_cmy_tbox" style="display:none;">
													<select class="form-select form-select-solid" data-control="select2" data-hide-search="true" id="pfc_cheque_bank" name="pfc_cheque_bank" data-placeholder="Company Bank">
														<option value="">Select</option>
														<option value="1">SBI</option>				
														<option value="2">TMB</option>
														<option value="3">IOB</option>
														<option value="4">CUB</option>
														<option value="4">KVB</option>
														<option value="4">IB</option>
													</select>
												</div>
												<div class="col-lg-2 fv-row fv-plugins-icon-container" id="cheque_par_bank_paid_from_cmy_tbox" style="display:none;">
													<select class="form-select form-select-solid" data-control="select2" data-placeholder="Party Bank" data-hide-search="true" id="pfc_cheque_pbank" name="pfc_cheque_pbank"> 
														<option value="">Select</option>
														<option value="1">UPI-12546875-kumar</option>				
														<option value="2">Bank-1254867-Kumar</option>
													</select>
												</div>
												<div class="col-lg-2 fv-row fv-plugins-icon-container"  id="cheque_detail_paid_from_cmy_tbox" style="display:none;">
													<textarea class="form-control form-control-solid" rows="1" placeholder="Details" id="pfc_cheque_detail" name="pfc_cheque_detail"></textarea>
												</div>
											</div>
											<div class="row">
												<label class="col-lg-1 col-form-label fw-semibold fs-6" id="rtgs_paid_from_cmy" style="display:none;">RTGS</label>
												<div class="col-lg-2 fv-row fv-plugins-icon-container" id="rtgs_amt_paid_from_cmy_tbox" style="display:none;">
													<input type="text" class="form-control form-control-lg form-control-solid" placeholder="Amount" value="0" id="pfc_rtgs_amt" name="pfc_rtgs_amt" onkeyup="pfc_total()">
													<div class="fv-plugins-message-container invalid-feedback"></div>
												</div>
												<div class="col-lg-2 fv-row fv-plugins-icon-container" id="rtgs_ref_paid_from_cmy_tbox" style="display:none;">
													<input type="text" class="form-control form-control-lg form-control-solid" placeholder="Reference No"  id="pfc_rtgs_num" name="pfc_rtgs_num">
													<div class="fv-plugins-message-container invalid-feedback"></div>
												</div>
												<div class="col-lg-3 fv-row fv-plugins-icon-container" id="rtgs_com_bank_paid_from_cmy_tbox" style="display:none;">
													<select class="form-select form-select-solid" data-control="select2" data-placeholder="Company Bank" data-hide-search="true" id="pfc_rtgs_bank" name="pfc_rtgs_bank">
														<option value="">Select</option>
														<option value="1">SBI</option>				
														<option value="2">TMB</option>
														<option value="3">IOB</option>
														<option value="4">CUB</option>
														<option value="4">KVB</option>
														<option value="4">IB</option>
													</select>
												</div>
												<div class="col-lg-2 fv-row fv-plugins-icon-container" id="rtgs_par_bank_paid_from_cmy_tbox" style="display:none;">
													<select class="form-select form-select-solid" data-control="select2" data-placeholder="Party Bank" data-hide-search="true" id="pfc_rtgs_pbank" name="pfc_rtgs_pbank">
														<option value="">Select</option>
														<option value="1">UPI-12546875-kumar</option>				
														<option value="2">Bank-1254867-Kumar</option>
													</select>
												</div>
												<div class="col-lg-2 fv-row fv-plugins-icon-container" id="rtgs_detail_paid_from_cmy_tbox" style="display:none;">
													<textarea class="form-control form-control-solid" rows="1" placeholder="Details" id="pfc_rtgs_detail" name="pfc_rtgs_detail"></textarea>
												</div>
											</div>
											<div class="row">
												<label class="col-lg-1 col-form-label fw-semibold fs-6" id="upi_paid_from_cmy" style="display:none;">UPI</label>
												<div class="col-lg-2 fv-row fv-plugins-icon-container" id="upi_amt_paid_from_cmy_tbox" style="display:none;">
													<input type="text" class="form-control form-control-lg form-control-solid" placeholder="Amount"  value="0" id="pfc_upi_amt" name="pfc_upi_amt" onkeyup="pfc_total()">
													<div class="fv-plugins-message-container invalid-feedback"></div>
												</div>
												<div class="col-lg-2 fv-row fv-plugins-icon-container" id="upi_ref_paid_from_cmy_tbox" style="display:none;">
													<input type="text" class="form-control form-control-lg form-control-solid" placeholder="Reference No"  id="pfc_upi_upi" name="pfc_upi_upi">
													<div class="fv-plugins-message-container invalid-feedback"></div>
												</div>
												<div class="col-lg-3 fv-row fv-plugins-icon-container" id="upi_com_bank_paid_from_cmy_tbox" style="display:none;">
													<select class="form-select form-select-solid" data-control="select2" data-placeholder="Company Bank" data-hide-search="true" id="pfc_upi_bank" name="pfc_upi_bank">
														<option value="">Select</option>
														<option value="1">SBI</option>				
														<option value="2">TMB</option>
														<option value="3">IOB</option>
														<option value="4">CUB</option>
														<option value="4">KVB</option>
														<option value="4">IB</option>
													</select>
												</div>
												<div class="col-lg-2 fv-row fv-plugins-icon-container" id="upi_par_bank_paid_from_cmy_tbox" style="display:none;">
													<select class="form-select form-select-solid" data-control="select2" data-placeholder="Party Bank" data-hide-search="true" id="pfc_upi_pbank" name="pfc_upi_pbank">
														<option value="">Select</option>
														<option value="1">UPI-12546875-kumar</option>				
														<option value="2">Bank-1254867-Kumar</option>
													</select>
												</div>
												<div class="col-lg-2 fv-row fv-plugins-icon-container" id="upi_detail_paid_from_cmy_tbox" style="display:none;">
													<textarea class="form-control form-control-solid" rows="1" placeholder="Details" id="pfc_upi_detail" name="pfc_upi_detail"></textarea>
												</div>
											</div>
											<div id="paid_from_party" name="paid_from_party" style="display:none;">
											<div class="row" >
												<label class="col-form-label fw-bold fs-5">Paid From Party</label>
											</div>
											<div class="row" >
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
													<input type="text" class="form-control form-control-lg form-control-solid" placeholder="Amount" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" value="0" id="pfp_cash_amt" name="pfp_cash_amt" onkeyup="pfp_total()">
													<div class="fv-plugins-message-container invalid-feedback"></div>
												</div>
												<div class="col-lg-3 fv-row fv-plugins-icon-container" id="cash_party_detail_tbox" style="display:none;">
													<textarea class="form-control form-control-solid" rows="1" placeholder="Details" id="pfp_cash_detail" name="pfp_cash_detail"></textarea>
												</div>
											</div>
											<div class="row">
												<label class="col-lg-1 col-form-label fw-semibold fs-6" id="cheque_party_amt" style="display:none;">Cheque</label>
												<div class="col-lg-2 fv-row fv-plugins-icon-container" id="cheque_party_amt_tbox" style="display:none;">
													<input type="text" name="" class="form-control form-control-lg form-control-solid" placeholder="Amount" oninput="this.value = this.value.replace(/[^A-Za-z/0-9.]/g, '').replace(/(\..*)\./g, '$1');" value="0" id="pfp_cheque_amt" name="pfp_cheque_amt" onkeyup="pfp_total()">
													<div class="fv-plugins-message-container invalid-feedback"></div>
												</div>
												<div class="col-lg-3 fv-row fv-plugins-icon-container"  id="cheque_party_bank_tbox" style="display:none;">
													<select class="form-select form-select-solid" data-control="select2" data-placeholder="Select Party Bank" id="pfp_cheque_bank" name="pfp_cheque_bank">
														<option value="">Select</option>
														<option value="1">SBI</option>				
														<option value="2">TMB</option>
														<option value="3">IOB</option>
														<option value="4">CUB</option>
														<option value="4">KVB</option>
														<option value="4">IB</option>
													</select>
												</div>
												<div class="col-lg-3 fv-row fv-plugins-icon-container" id="cheque_party_chq_no_tbox" style="display:none;">
													<input type="text"  class="form-control form-control-lg form-control-solid" placeholder="Cheque/Ref Number" oninput="this.value = this.value.replace(/[^A-Za-z/0-9.]/g, '').replace(/(\..*)\./g, '$1');" id="pfp_cheque_num" name="pfp_cheque_num">
													<div class="fv-plugins-message-container invalid-feedback"></div>
												</div>
												<div class="col-lg-3 fv-row fv-plugins-icon-container" id="cheque_party_detail_tbox" style="display:none;">
													<textarea class="form-control form-control-solid" rows="1" placeholder="Details" id="pfp_cheque_detail" name="pfp_cheque_detail"></textarea>
												</div>
											</div>
											<div class="row">
												<label class="col-lg-1 col-form-label fw-semibold fs-6" id="rtgs_party_amt" style="display:none;">RTGS</label>
												<div class="col-lg-2 fv-row fv-plugins-icon-container" id="rtgs_party_amt_tbox" style="display:none;">
													<input type="text"  class="form-control form-control-lg form-control-solid" placeholder="Amount" oninput="this.value = this.value.replace(/[^A-Za-z/0-9.]/g, '').replace(/(\..*)\./g, '$1');" value="0" id="pfp_rtgs_amt" name="pfp_rtgs_amt" onkeyup="pfp_total()">
													<div class="fv-plugins-message-container invalid-feedback"></div>
												</div>
												<div class="col-lg-3 fv-row fv-plugins-icon-container" id="rtgs_party_no_tbox" style="display:none;">
													<input type="text"  class="form-control form-control-lg form-control-solid" placeholder="Trans/Ref Number" oninput="this.value = this.value.replace(/[^A-Za-z/0-9.]/g, '').replace(/(\..*)\./g, '$1');" id="pfp_rtgs_num" name="pfp_rtgs_num">
													<div class="fv-plugins-message-container invalid-feedback"></div>
												</div>
												<div class="col-lg-3 fv-row fv-plugins-icon-container" id="rtgs_party_bank_tbox" style="display:none;">
													<select class="form-select form-select-solid" data-control="select2" data-placeholder="Select Company Bank" data-hide-search="true" id="pfp_rtgs_bank" name="pfp_rtgs_bank">
														<option value="">Select</option>
														<option value="1">SBI</option>				
														<option value="2">TMB</option>
														<option value="3">IOB</option>
														<option value="4">CUB</option>
														<option value="4">KVB</option>
														<option value="4">IB</option>
													</select>
												</div>
												<div class="col-lg-3 fv-row fv-plugins-icon-container" id="rtgs_party_detail_tbox" style="display:none;">
													<textarea class="form-control form-control-solid" rows="1" placeholder="Details" id="pfp_rtgs_detail" name="pfp_rtgs_detail"></textarea>
												</div>
											</div>
											<div class="row">
												<label class="col-lg-1 col-form-label fw-semibold fs-6" id="upi_party_amt" style="display:none;">UPI</label>
												<div class="col-lg-2 fv-row fv-plugins-icon-container" id="upi_party_amt_tbox" style="display:none;">
													<input type="text" class="form-control form-control-lg form-control-solid" placeholder="Amount" value="0" id="pfp_upi_amt" name="pfp_upi_amt" onkeyup="pfp_total()">
													<div class="fv-plugins-message-container invalid-feedback"></div>
												</div>
												<div class="col-lg-3 fv-row fv-plugins-icon-container" id="upi_party_trans_no_tbox" style="display:none;">
													<input type="text" class="form-control form-control-lg form-control-solid" placeholder="Trans/Ref Number" id="pfp_upi_num" name="pfp_upi_num">
													<div class="fv-plugins-message-container invalid-feedback"></div>
												</div>
												<div class="col-lg-3 fv-row fv-plugins-icon-container" id="upi_party_bank_tbox" style="display:none;">
													<select class="form-select form-select-solid" data-control="select2" data-placeholder="Select Company Bank" data-hide-search="true" id="pfp_upi_bank" name="pfp_upi_bank">
														<option value="">Select</option>
														<option value="1">SBI</option>				
														<option value="2">TMB</option>
														<option value="3">IOB</option>
														<option value="4">CUB</option>
														<option value="4">KVB</option>
														<option value="4">IB</option>
													</select>
												</div>
												<div class="col-lg-3 fv-row fv-plugins-icon-container" id="upi_party_detail_tbox" style="display:none;">
													<textarea class="form-control form-control-solid" rows="1" placeholder="Details" id="pfp_upi_detail" name="pfp_upi_detail"></textarea>
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
											<input type="text" class="form-control form-control-lg form-control-solid" placeholder="Redeem Points" name="mem_card_redeem_points" id="mem_card_redeem_points"  onkeyup="pfp_total()" value="0">
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
																<input type="text" class="form-control form-control-lg form-control-solid" placeholder="Redeem Amount" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" value="0" name="chit_red_amt" id="chit_red_amt">
																<div class="fv-plugins-message-container invalid-feedback"></div>
															</div>
															<div class="col-lg-2 fv-row fv-plugins-icon-container" id="hand_ln_redeem_detail_paid_from_pty_tbox" style="display:none;">
																<textarea class="form-control form-control-solid" rows="1" placeholder="Details" name="chit_red_det" id="chit_red_det"></textarea>
															</div>
														</div>
											<div class="row">
												<div class="col-lg-4">
													<label class="col-form-label fw-semibold fs-6">Net Payable &emsp;</label>
													<label class="col-form-label fw-bold fs-2"  id="return_net_payable1" name="return_net_payable1">0.00</label>
												</div>
												<div class="col-lg-4">
													<label class="col-form-label fw-semibold fs-6">Paid Amount &emsp;</label>
													<label class="col-form-label fw-bold fs-2" id="return_paid_amount" name="return_paid_amount">0.00</label>
												</div>
												<div class="col-lg-4">
													<label class="col-form-label fw-semibold fs-6">Balance Amount &emsp;</label>
													<label class="col-form-label fw-bold fs-2" id="return_balance_amount" name="return_balance_amount">0.00</label>
												</div>
												<!-- <div class="col-lg-3">
													<label class="form-check form-check-inline form-check-solid is-invalid py-5">
														<input class="form-check-input" type="checkbox" >
														<span class="col-form-label fw-semibold fs-6">Add to Credit</span>
													</label>
												</div> -->
												<!-- <label class="col-lg-2 col-form-label fw-semibold fs-6">Add to Credit</label> -->
													<!-- <span class="col-form-label fw-semibold fs-6">Add to Credit</span> -->
												<!-- </div> -->
											</div>
											<div class="row">
												<label class="col-lg-1 col-form-label fw-semibold fs-6">Customer Rating</label>
												<div class="col-lg-2 fv-row fv-plugins-icon-container">
													<select class="form-select form-select-solid" data-control="select2" data-hide-search="true" name="rating" id="rating">
														<option value="">Select Rating</option>
														<option value="3">Good</option>
														<option value="2">Average</option>
														<option value="1">Bad</option>
													</select>
												</div>
												<label class="col-lg-1 col-form-label fw-semibold fs-6">M.Points Add</label>
												<div class="col-lg-2 fv-row fv-plugins-icon-container">
													<input type="text" class="form-control form-control-lg1 form-control-solid" id="m_points_ad" name="m_points_ad">
													<div class="fv-plugins-message-container invalid-feedback"></div> 
												</div>
											</div>
											<div class="d-flex justify-content-end">
												<button type="reset" class="btn btn-secondary me-3" data-bs-dismiss="modal">Cancel</button>
												<button type="submit" class="btn btn-primary" id="">Return</button>
											</div>
											<!--end::Actions-->
										</div>
										<!--end::Card body-->
									</div>
								 </form>
								 <!--begin::Modal - view capture image -->
		<div class="modal fade" id="kt_modal_camera" tabindex="-1" aria-hidden="true">
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
							<h1 class="mb-3">Capture Image</h1>
						</div>
						<!--end::Heading-->
						<!--end::Heading-->	
						<div class="row">
							<div class="col-lg-6">
								<div class="row">
									<div id="my_camera" style="max-height: 330px;height: 330px;width: 100%;max-width: 100%;border: 1px solid;">
										
									</div>
								</div>
								<div class="d-flex justify-content-center align-items-center mt-6">
									<div class="btn btn-primary" id="take_jewel_photo1" onclick="take_jewel_photo()">Take Jewel Photo</div>
									<button type="submit" class="btn btn-primary" id="capture" onclick="jewel_snapshot()" style="display: none;">Capture</button>
								</div>
							</div>
							<div class="col-lg-6">
								<div class="row">
									<input type="hidden" name="img_count" id="img_count" value="1">
									<div class="col-lg-4 fv-row">
										<a href="javascript:;" onclick="select_image_1();">
											<div class="image-input image-input-outline" data-kt-image-input="true" id="img_1" style="background-image: url(<?php echo base_url();?>assets/images/Jewel.jpg);">
													<div class="image-input-wrapper w-150px h-150px"   style="background-image: url(<?php echo base_url();?>assets/images/Jewel.jpg)"></div>
											</div>
											<textarea hidden="hidden" name="img_1_data" id="img_1_data"></textarea>
										</a>
									</div>
									<div class="col-lg-4 fv-row">
										<a href="javascript:;" onclick="select_image_2();">
											<div class="image-input image-input-outline" data-kt-image-input="true" id="img_2" style="background-image: url(<?php echo base_url();?>assets/images/Jewel.jpg)">
													<div class="image-input-wrapper w-150px h-150px"  style="background-image: url(<?php echo base_url();?>assets/images/Jewel.jpg)"></div>
											</div>
											<textarea hidden="hidden" name="img_2_data" id="img_2_data"></textarea>
										</a>
									</div>
									<div class="col-lg-4 fv-row">
										<a href="javascript:;" onclick="select_image_3();">
											<div class="image-input image-input-outline" data-kt-image-input="true" id="img_3" style="background-image: url(<?php echo base_url();?>assets/images/Jewel.jpg)">
													<div class="image-input-wrapper w-150px h-150px"  style="background-image: url(<?php echo base_url();?>assets/images/Jewel.jpg)"></div>
											</div>
											<textarea hidden="hidden" name="img_3_data" id="img_3_data"></textarea>
										</a>
									</div>
								</div>
								<div class="row mt-4">
									
									<div class="col-lg-4 fv-row">
										<a href="javascript:;" onclick="select_image_4();">
											<div class="image-input image-input-outline" data-kt-image-input="true" id="img_4" style="background-image: url(<?php echo base_url();?>assets/images/Jewel.jpg)">
													<div class="image-input-wrapper w-150px h-150px"  style="background-image: url(<?php echo base_url();?>assets/images/Jewel.jpg)"></div>
											</div>
											<textarea hidden="hidden" name="img_4_data" id="img_4_data"></textarea>
										</a>
									</div>
									<div class="col-lg-4 fv-row">
										<a href="javascript:;" onclick="select_image_5();">
											<div class="image-input image-input-outline" data-kt-image-input="true" id="img_5" style="background-image: url(<?php echo base_url();?>assets/images/Jewel.jpg)">
													<div class="image-input-wrapper w-150px h-150px"  style="background-image: url(<?php echo base_url();?>assets/images/Jewel.jpg)"></div>
											</div>
											<textarea hidden="hidden" name="img_5_data" id="img_5_data"></textarea>
										</a>
									</div>
									<div class="col-lg-4 fv-row">
										<a href="javascript:;" onclick="select_image_6();">
											<div class="image-input image-input-outline" data-kt-image-input="true" id="img_6" style="background-image: url(<?php echo base_url();?>assets/images/Jewel.jpg)">
													<div class="image-input-wrapper w-150px h-150px"  style="background-image: url(<?php echo base_url();?>assets/images/Jewel.jpg)"></div>
											</div>
											<textarea hidden="hidden" name="img_6_data" id="img_6_data"></textarea>
										</a>
									</div>
									<input type="hidden" name="img_selected_id" value="" id="img_selected_id" value="">
									<div class="d-flex justify-content-center align-items-center mt-13">
										<div type="submit" class="btn btn-primary" onclick="put_capture_jewel_photo()">Submit</div>
									</div>
								</div>
							</div>
						</div>
						<!--end::Modal body-->
					</div>
					<!--end::Modal content-->
				</div>
				<!--end::Modal dialog-->
			</div>
			<!--end::Modal - view payment-->
		</div>
		<!--end::Modal - view capture image -->
		<!--begin::Modal - view capture image -->
		<div class="modal fade" id="kt_modal_camera1" tabindex="-1" aria-hidden="true">
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
							<h1 class="mb-3">Capture Image</h1>
						</div>
						<!--end::Heading-->
						<!--end::Heading-->	
						<div class="row">
							<div class="col-lg-6">
								<div class="row">
									<div id="my_camera1" style="max-height: 330px;height: 330px;width: 100%;max-width: 100%;border: 1px solid;">
										
									</div>
								</div>
								<div class="d-flex justify-content-center align-items-center mt-6">
									<div class="btn btn-primary" id="take_jewel_photo11" onclick="take_jewel_photo1()">Take Jewel Photo</div>
									<button type="submit" class="btn btn-primary" id="capture1" onclick="jewel_snapshot1()" style="display: none;">Capture</button>
								</div>
							</div>
							<div class="col-lg-6">
								<div class="row">
									<input type="hidden" name="img_count1" id="img_count1" value="1">
									<div class="col-lg-4 fv-row">
										<a href="javascript:;" onclick="select_image_11();">
											<div class="image-input image-input-outline" data-kt-image-input="true" id="img_11" style="background-image: url(<?php echo base_url();?>assets/images/Jewel.jpg);">
													<div class="image-input-wrapper w-150px h-150px"   style="background-image: url(<?php echo base_url();?>assets/images/Jewel.jpg)"></div>
											</div>
											<textarea hidden="hidden" name="img_1_data1" id="img_11_data"></textarea>
										</a>
									</div>
									<div class="col-lg-4 fv-row">
										<a href="javascript:;" onclick="select_image_21();">
											<div class="image-input image-input-outline" data-kt-image-input="true" id="img_21" style="background-image: url(<?php echo base_url();?>assets/images/Jewel.jpg)">
													<div class="image-input-wrapper w-150px h-150px"  style="background-image: url(<?php echo base_url();?>assets/images/Jewel.jpg)"></div>
											</div>
											<textarea hidden="hidden" name="img_2_data1" id="img_21_data"></textarea>
										</a>
									</div>
									<div class="col-lg-4 fv-row">
										<a href="javascript:;" onclick="select_image_31();">
											<div class="image-input image-input-outline" data-kt-image-input="true" id="img_31" style="background-image: url(<?php echo base_url();?>assets/images/Jewel.jpg)">
													<div class="image-input-wrapper w-150px h-150px"  style="background-image: url(<?php echo base_url();?>assets/images/Jewel.jpg)"></div>
											</div>
											<textarea hidden="hidden" name="img_3_data1" id="img_31_data"></textarea>
										</a>
									</div>
								</div>
								<div class="row mt-4">
									
									<div class="col-lg-4 fv-row">
										<a href="javascript:;" onclick="select_image_41();">
											<div class="image-input image-input-outline" data-kt-image-input="true" id="img_41" style="background-image: url(<?php echo base_url();?>assets/images/Jewel.jpg)">
													<div class="image-input-wrapper w-150px h-150px"  style="background-image: url(<?php echo base_url();?>assets/images/Jewel.jpg)"></div>
											</div>
											<textarea hidden="hidden" name="img_4_data" id="img_41_data"></textarea>
										</a>
									</div>
									<div class="col-lg-4 fv-row">
										<a href="javascript:;" onclick="select_image_51();">
											<div class="image-input image-input-outline" data-kt-image-input="true" id="img_51" style="background-image: url(<?php echo base_url();?>assets/images/Jewel.jpg)">
													<div class="image-input-wrapper w-150px h-150px"  style="background-image: url(<?php echo base_url();?>assets/images/Jewel.jpg)"></div>
											</div>
											<textarea hidden="hidden" name="img_5_data" id="img_51_data"></textarea>
										</a>
									</div>
									<div class="col-lg-4 fv-row">
										<a href="javascript:;" onclick="select_image_61();">
											<div class="image-input image-input-outline" data-kt-image-input="true" id="img_61" style="background-image: url(<?php echo base_url();?>assets/images/Jewel.jpg)">
													<div class="image-input-wrapper w-150px h-150px"  style="background-image: url(<?php echo base_url();?>assets/images/Jewel.jpg)"></div>
											</div>
											<textarea hidden="hidden" name="img_6_data" id="img_61_data"></textarea>
										</a>
									</div>
									<input type="hidden" name="img_selected_id1" value="" id="img_selected_id1" >
									<div class="d-flex justify-content-center align-items-center mt-13">
										<div type="submit" class="btn btn-primary" onclick="put_capture_jewel_photo1()">Submit</div>
									</div>
								</div>
							</div>
						</div>
						<!--end::Modal body-->
					</div>
					<!--end::Modal content-->
				</div>
				<!--end::Modal dialog-->
			</div>
			<!--end::Modal - view payment-->
		</div>
		<!--end::Modal - view capture image -->
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
							<label class="col-lg-4 col-form-label fw-bold fs-5" name="" id=""><i class="fa-solid fa-coins fs-5" title="Points"></i>&emsp;10052</label>
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
		<div class="modal fade" id="kt_modal_formulas" tabindex="-1" aria-hidden="true">
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
							<h1 class="mb-3">Calculation</h1>
						</div>
						<!--end::Heading-->
						<!--end::Heading-->					
						<div class="row">
							<div class="col-lg-12">
								<label class="col-form-label fw-semibold fs-5">Replace Value = Replace Value - Exchange old Metal Value</label>
							</div>
							<div class="col-lg-12">
								<label class="col-form-label fw-semibold fs-5">Sales Return Value = Return Value - Replace Value</label>
							</div>
							<div class="col-lg-12">
								<label class="col-form-label fw-semibold fs-5">Sales Payment = Balance Sale Value - Sale Return Value</label>
							</div>
							<div class="col-lg-12">
								<label class="col-form-label fw-semibold fs-5">If Sale Payment Greater than (>) 0<br>To be Paid from Party</label>
							</div>
							<div class="col-lg-12">
								<label class="col-form-label fw-semibold fs-5">If Sale Payment Less than(<) 0<br>To be Payment from Company</label>
							</div>
						</div>
					</div>
					<!--end::Modal content-->
				</div>
				<!--end::Modal dialog-->
			</div>
			<!--end::Modal - view payment-->
		</div>
		<input type="hidden" id="baseurl" value="<?php echo base_url(); ?>">
		<input type="hidden" id="image_id">
		<input type="hidden" id="image_id1">
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
							url: baseurl+'Sales_entry/get_chit_list',
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
function id_set(id){
	
	$('#image_id').val(id);
	var cnt=Number($("#img_count").val());
						$("#img_count").val('1');
						
						for(i=1;i<cnt;i++){

$('#jewel_photo_'+i).attr("src","<?php echo base_url(); ?>assets/images/Jewel.jpg");

document.getElementById("img_"+i).style.border = "none";

						}
	
}
		</script>
		<script>
			function select_image_1()
			{
				document.getElementById("img_1").style.border = "3px solid #ec9629";
				document.getElementById("img_2").style.border = "none";
				document.getElementById("img_3").style.border = "none";
				document.getElementById("img_4").style.border = "none";
				document.getElementById("img_5").style.border = "none";
				document.getElementById("img_6").style.border = "none";
				$('#img_selected_id').val('img_1');
			};
			function select_image_2()
			{
				document.getElementById("img_1").style.border = "none";
				document.getElementById("img_2").style.border = "3px solid #ec9629";
				document.getElementById("img_3").style.border = "none";
				document.getElementById("img_4").style.border = "none";
				document.getElementById("img_5").style.border = "none";
				document.getElementById("img_6").style.border = "none";
				$('#img_selected_id').val('img_2');
			};
			function select_image_3()
			{
				document.getElementById("img_1").style.border = "none";
				document.getElementById("img_2").style.border = "none";
				document.getElementById("img_3").style.border = "3px solid #ec9629";
				document.getElementById("img_4").style.border = "none";
				document.getElementById("img_5").style.border = "none";
				document.getElementById("img_6").style.border = "none";
				$('#img_selected_id').val('img_3');
			};
			function select_image_4()
			{
				document.getElementById("img_1").style.border = "none";
				document.getElementById("img_2").style.border = "none";
				document.getElementById("img_3").style.border = "none";
				document.getElementById("img_4").style.border = "3px solid #ec9629";
				document.getElementById("img_5").style.border = "none";
				document.getElementById("img_6").style.border = "none";
				$('#img_selected_id').val('img_4');
			};
			function select_image_5()
			{
				document.getElementById("img_1").style.border = "none";
				document.getElementById("img_2").style.border = "none";
				document.getElementById("img_3").style.border = "none";
				document.getElementById("img_4").style.border = "none";
				document.getElementById("img_5").style.border = "3px solid #ec9629";
				document.getElementById("img_6").style.border = "none";
				$('#img_selected_id').val('img_5');
			};
			function select_image_6()
			{
				document.getElementById("img_1").style.border = "none";
				document.getElementById("img_2").style.border = "none";
				document.getElementById("img_3").style.border = "none";
				document.getElementById("img_4").style.border = "none";
				document.getElementById("img_5").style.border = "none";
				document.getElementById("img_6").style.border = "3px solid #ec9629";
				$('#img_selected_id').val('img_6');
			};
		</script>
<script language="JavaScript">
		    

		    function take_jewel_photo()

		    {
		    	// alert("hi");
		    	Webcam.set({
		        width: 494,
		        height: 330,
		        image_format: 'jpeg',
		        jpeg_quality: 90
		    	});
		  		Webcam.attach('#my_camera');
		  		document.getElementById('take_jewel_photo1').style.display="none";
		  		document.getElementById('capture').style.display="block";
		  		// document.getElementById('my_camera').style.display="block";
		        // document.getElementById('results').style.display="none";
		    }
		  
		    function jewel_snapshot() {
		    	// alert("hi");
		    	var cnt=Number($("#img_count").val());
		        	// alert(cnt);
		      //   Webcam.start('#my_camera')
					   // .then(result =>{
					   //    console.log("webcam started");
					   // })
					   // .catch(err => {
					   //     console.log(err);
					   // });
		        Webcam.snap( function(data_uri) {
		        	if(cnt<=6)
		        	{
			            // $(".image-tag").val(data_uri);
			            document.getElementById('img_'+cnt).innerHTML = '<img src="'+data_uri+'" id="jewel_photo_'+cnt+'" name="jewel_photo_'+cnt+'" height="150" width="150" />';
			            document.getElementById('img_'+cnt+'_data').innerHTML=data_uri;

			            // document.getElementById('party_photo_data').innerHTML =data_uri;
			            // document.getElementById('my_camer	a').style.display="none";
			            // document.getElementById('results').style.display="block";
			            document.getElementById('take_jewel_photo1').style.display="block";
			            document.getElementById('capture').style.display="none";
			            $("#img_count").val(Number(cnt)+1);
			            Webcam.reset('#my_camera');
		            }
		            else
		            {
		            	alert("Choose anyone image from 6 images");

		            }

		        } );
		    }
		    function put_capture_jewel_photo()
		    {
		    	var sel_id=$('#img_selected_id').val();
		    	// alert(sel_id);
				var image_id=$('#image_id').val();
		    	var img_data=$('#'+sel_id+'_data').val();
		    	// alert(img_data);
		    	document.getElementById('load_image_selected'+image_id).innerHTML='<img src="'+img_data+'" id="loan_jewel_photo" name="loan_jewel_photo" height="40" width="40" />';
				// alert(1);
				
				document.getElementById('inventory_jewel_image_data'+image_id).innerHTML=img_data;
		    	
				$('#kt_modal_camera').hide();
		    	$('.modal-backdrop').hide();
		    	// document.getElementById('subitem_count').focus();
				// $('#subitem_count').focus();
				var $body = $(document.body);
				$body.css("overflow", "auto");
				$body.width("auto");

		    }
		    
		</script>
		<script>
function id_set1(id){
	
	$('#image_id1').val(id);
	var cnt=Number($("#img_count1").val());
						$("#img_count1").val('1');
						
						for(i=1;i<cnt;i++){

$('#jewel_photo_'+i+'1').attr("src","<?php echo base_url(); ?>assets/images/Jewel.jpg");

document.getElementById("img_"+i+'1').style.border = "none";

						}
	
}
		</script>
		<script>
			function select_image_11()
			{
				document.getElementById("img_11").style.border = "3px solid #ec9629";
				document.getElementById("img_21").style.border = "none";
				document.getElementById("img_31").style.border = "none";
				document.getElementById("img_41").style.border = "none";
				document.getElementById("img_51").style.border = "none";
				document.getElementById("img_61").style.border = "none";
				$('#img_selected_id1').val('img_11');
			};
			function select_image_21()
			{
				document.getElementById("img_11").style.border = "none";
				document.getElementById("img_21").style.border = "3px solid #ec9629";
				document.getElementById("img_31").style.border = "none";
				document.getElementById("img_41").style.border = "none";
				document.getElementById("img_51").style.border = "none";
				document.getElementById("img_61").style.border = "none";
				$('#img_selected_id1').val('img_21');
			};
			function select_image_31()
			{
				document.getElementById("img_11").style.border = "none";
				document.getElementById("img_21").style.border = "none";
				document.getElementById("img_31").style.border = "3px solid #ec9629";
				document.getElementById("img_41").style.border = "none";
				document.getElementById("img_51").style.border = "none";
				document.getElementById("img_61").style.border = "none";
				$('#img_selected_id1').val('img_31');
			};
			function select_image_41()
			{
				document.getElementById("img_11").style.border = "none";
				document.getElementById("img_21").style.border = "none";
				document.getElementById("img_31").style.border = "none";
				document.getElementById("img_41").style.border = "3px solid #ec9629";
				document.getElementById("img_51").style.border = "none";
				document.getElementById("img_61").style.border = "none";
				$('#img_selected_id1').val('img_41');
			};
			function select_image_51()
			{
				document.getElementById("img_11").style.border = "none";
				document.getElementById("img_21").style.border = "none";
				document.getElementById("img_31").style.border = "none";
				document.getElementById("img_41").style.border = "none";
				document.getElementById("img_51").style.border = "3px solid #ec9629";
				document.getElementById("img_61").style.border = "none";
				$('#img_selected_id1').val('img_51');
			};
			function select_image_61()
			{
				document.getElementById("img_11").style.border = "none";
				document.getElementById("img_21").style.border = "none";
				document.getElementById("img_31").style.border = "none";
				document.getElementById("img_41").style.border = "none";
				document.getElementById("img_51").style.border = "none";
				document.getElementById("img_61").style.border = "3px solid #ec9629";
				$('#img_selected_id1').val('img_61');
			};
		</script>
<script language="JavaScript">
		    

		    function take_jewel_photo1()

		    {
		    	// alert("hi");
		    	Webcam.set({
		        width: 494,
		        height: 330,
		        image_format: 'jpeg',
		        jpeg_quality: 90
		    	});
					// alert(1);
		  		Webcam.attach('#my_camera1');
		  		document.getElementById('take_jewel_photo11').style.display="none";
		  		document.getElementById('capture1').style.display="block";
		  		// document.getElementById('my_camera').style.display="block";
		        // document.getElementById('results').style.display="none";
			
		    }
		  
		    function jewel_snapshot1() {
		    	// alert("hi");
		    	var cnt=Number($("#img_count1").val());
		        	// alert(cnt);
		      //   Webcam.start('#my_camera')
					   // .then(result =>{
					   //    console.log("webcam started");
					   // })
					   // .catch(err => {
					   //     console.log(err);
					   // });
		        Webcam.snap( function(data_uri) {
		        	if(cnt<=6)
		        	{
			            // $(".image-tag").val(data_uri);
			            document.getElementById('img_'+cnt+'1').innerHTML = '<img src="'+data_uri+'" id="jewel_photo_'+cnt+'1" name="jewel_photo_'+cnt+'" height="150" width="150" />';
			            document.getElementById('img_'+cnt+'1_data').innerHTML=data_uri;

			            // document.getElementById('party_photo_data').innerHTML =data_uri;
			            // document.getElementById('my_camer	a').style.display="none";
			            // document.getElementById('results').style.display="block";
			            document.getElementById('take_jewel_photo11').style.display="block";
			            document.getElementById('capture1').style.display="none";
			            $("#img_count1").val(Number(cnt)+1);
			            Webcam.reset('#my_camera1');
		            }
		            else
		            {
		            	alert("Choose anyone image from 6 images");

		            }

		        } );
		    }
		    function put_capture_jewel_photo1()
		    {
		    	var sel_id=$('#img_selected_id1').val();
		    	// alert(sel_id);
				var image_id=$('#image_id1').val();
				// alert(image_id);
		    	var img_data=$('#'+sel_id+'_data').val();
		    	// alert(img_data);
		    	document.getElementById('load_image_selected1'+image_id).innerHTML='<img src="'+img_data+'" id="loan_jewel_photo1" name="loan_jewel_photo1" height="40" width="40" />';
				// alert(1);
				
				document.getElementById('inventory_jewel_image_data1'+image_id).innerHTML=img_data;
		    	
				$('#kt_modal_camera1').hide();
		    	$('.modal-backdrop').hide();
		    	// document.getElementById('subitem_count').focus();
				// $('#subitem_count').focus();
				var $body = $(document.body);
				$body.css("overflow", "auto");
				$body.width("auto");

		    }
		    
		</script>
		<script>
		function sales_return_validation(){
	       var err = 0;
	       var company_id = $('#company_id').val();
		   var party_sales = $('#party_sales').val();

		   if(company_id.trim()==''){
                $('#company_id_err').html('Company is required!');
                err++;
            }else{
                $('#company_id_err').html('');
            }
			if(party_sales.trim()==''){
                $('#party_sales_err').html('Sales Id is required!');
                err++;
            }else{
                $('#party_sales_err').html('');
            }
			if(err>0){ return false; }else{ return true;}
		}
		</script>
<script>
function pfc_total(){
var cash=$('#pfc_cash_amt').val();
var cheque=$('#pfc_cheque_amt').val();
var rtgs=$('#pfc_rtgs_amt').val();
var upi=$('#pfc_upi_amt').val();
var net_pay=$('#return_net_payable_1').val();

var paid_amount=parseFloat(cash)+parseFloat(cheque)+parseFloat(rtgs)+parseFloat(upi);
var balance_amount=parseFloat(net_pay)-parseFloat(paid_amount);

$('#return_paid_amount').html(paid_amount);
$('#return_balance_amount').html(balance_amount);

$('#return_paid_amount_1').val(paid_amount);
$('#return_balance_amount_1').val(balance_amount);
}

</script>
<script>
function pfp_total(){
	var mem_card_points = $('#mem_card_points').text();
	var mem_card_redeem_points1 = $('#mem_card_redeem_points').val();
	
	if(parseFloat(mem_card_points)<parseFloat(mem_card_redeem_points1)){
		alert('Enter less than available points');
		$('#mem_card_redeem_points').val(0);
	}


var cash=$('#pfp_cash_amt').val();
var cheque=$('#pfp_cheque_amt').val();
var rtgs=$('#pfp_rtgs_amt').val();
var upi=$('#pfp_upi_amt').val();
var net_pay=$('#return_net_payable_1').val();
var mem_card_redeem_points = $('#mem_card_redeem_points').val();

var paid_amount=parseFloat(cash)+parseFloat(cheque)+parseFloat(rtgs)+parseFloat(upi)+parseFloat(mem_card_redeem_points);
var balance_amount=parseFloat(net_pay)-parseFloat(paid_amount);

$('#return_paid_amount').html(paid_amount);
$('#return_balance_amount').html(balance_amount);

$('#return_paid_amount_1').val(paid_amount);
$('#return_balance_amount_1').val(balance_amount);
}

</script>
		<script>
		function nt_weight_calc(i){

	
var weight = $('#nt_weight'+i).val();
var stone = $('#nt_stone'+i).val();
var hc = $('#nt_hc'+i).val();
var mc = $('#nt_mc'+i).val();
var wc = $('#nt_wc'+i).val();
var item_type = $('#nt_item_type'+i).val();
var current_gold_rate = $('#current_gold_rate').val();
	var current_silver_rate = $('#current_silver_rate').val();


var net_weight=parseFloat(weight)+parseFloat(stone);
var metal_weight=parseFloat(net_weight)+parseFloat(net_weight)*parseFloat(wc)/100;
$('#nt_net_weight'+i).val(parseFloat(net_weight).toFixed(3));
$('#nt_metal_weight'+i).val(parseFloat(metal_weight).toFixed(3));

if(item_type==1){
var nt_amount=(parseFloat(metal_weight)*parseFloat(current_gold_rate))+parseFloat(hc)+parseFloat(mc);
}
else{
 var nt_amount=(parseFloat(metal_weight)*parseFloat(current_silver_rate))+parseFloat(hc)+parseFloat(mc);
}

$('#nt_amount'+i).val(parseFloat(nt_amount).toFixed(3));
var nt_count=0;
var nt_tot_amt=0;
for(j=0;j<10;j++){
if($('#nt_item_type'+j).val()!=''){
nt_count++;
}
nt_tot_amt +=parseFloat($('#nt_amount'+j).val());
}
// alert(nt_count);
$('#nt_count').html(parseInt(nt_count));
$('#nt_tot_amt').html(parseFloat(nt_tot_amt).toFixed(3));
$('#nt_count1').val(parseInt(nt_count));
$('#nt_tot_amt1').val(parseFloat(nt_tot_amt).toFixed(3));


var j=0; var gold=0; var silver=0;var gold_weight=0; var silver_weight=0;
var gold_amt=0; var silver_amt=0;
	 for( var i=0;i<20;i++){
		var aid = $('#sales_type'+i).val();
		var weight = $('#net_wgt'+i).val();
		var amount = $('#sales_amt'+i).val();
		if(aid=='1' || aid=='2' ){
			if(aid=='1'){
gold++;
gold_weight=parseInt(gold_weight)+parseInt(weight);
gold_amt=parseInt(gold_amt)+parseInt(amount);

			}
			else{
silver++;
silver_weight=parseInt(silver_weight)+parseInt(weight);
silver_amt=parseInt(silver_amt)+parseInt(amount);
			}
	j++;
		}
 }
 $('#sales_total1').html(parseInt(gold_amt)+parseInt(silver_amt));
 for( var i=0;i<10;i++){
		var aid = $('#nt_item_type'+i).val();
		var weight = $('#nt_net_weight'+i).val();
		var amount = $('#nt_amount'+i).val();
		if(aid=='1' || aid=='2' ){
			if(aid=='1'){
gold++;
gold_weight=parseInt(gold_weight)+parseInt(weight);
gold_amt=parseInt(gold_amt)+parseInt(amount);

			}
			else{
silver++;
silver_weight=parseInt(silver_weight)+parseInt(weight);
silver_amt=parseInt(silver_amt)+parseInt(amount);
			}
	
		}
 }


$('#sales_item_count').html(j);
$('#sales_total').html(parseInt(gold_amt)+parseInt(silver_amt));
$('#sales_gold_count').html(gold);
$('#sales_silver_count').html(silver);
$('#sales_gold_weight').html(gold_weight);
$('#sales_silver_weight').html(silver_weight);
$('#sales_gold_amount').html(parseInt(gold_amt));
$('#sales_silver_amount').html(parseInt(silver_amt));

$('#sales_gold_count_1').val(gold);
$('#sales_silver_count_1').val(silver);
$('#sales_gold_weight_1').val(gold_weight);
$('#sales_silver_weight_1').val(silver_weight);
$('#sales_gold_amount_1').val(parseInt(gold_amt));
$('#sales_silver_amount_1').val(parseInt(silver_amt));

var total=0;var total1=0;var total2=0;
	for( var i=0;i<20;i++){
		var aid = $('#sales_amt'+i).val();
		
total=parseInt(total)+parseInt(aid);

	}
	$('#sales_total1').html(total);
	for( var i=0;i<10;i++){
	
	var aid1 = $('#oge_est_amount'+i).val();
		var aid2 = $('#nt_amount'+i).val();
		total1=parseInt(total1)+parseInt(aid1);
total=parseInt(total)+parseInt(aid2);
}
// alert(total);
	$('#sales_total').html(total);
	
	$('#sales_total_1').val(total);

var netpay=parseInt(total)-parseInt(total1)+parseInt(total2);

$('#net_payable1').html(netpay);
$('#net_payable_1').val(netpay);


var adj_discount = $('#adj_discount').val();

var final_pay=parseFloat(netpay)-parseFloat(adj_discount);

$('#net_payable_2').val(final_pay);
$('#total_amount_ad').html(final_pay);
$('#net_payable').html(final_pay);

}

function nt_met_weight_calc(i){


var weight = $('#nt_weight'+i).val();
var stone = $('#nt_stone'+i).val();
var hc = $('#nt_hc'+i).val();
var mc = $('#nt_mc'+i).val();
var wc = $('#nt_wc'+i).val();
var item_type = $('#nt_item_type'+i).val();
var current_gold_rate = $('#current_gold_rate').val();
var current_silver_rate = $('#current_silver_rate').val();


var net_weight=parseFloat(weight)+parseFloat(stone);
var metal_weight=parseFloat(net_weight)+parseFloat(net_weight)*parseFloat(wc)/100;
$('#nt_net_weight'+i).val(parseFloat(net_weight).toFixed(3));
$('#nt_metal_weight'+i).val(parseFloat(metal_weight).toFixed(3));

if(item_type==1){
var nt_amount=(parseFloat(metal_weight)*parseFloat(current_gold_rate))+parseFloat(hc)+parseFloat(mc);
}
else{
 var nt_amount=(parseFloat(metal_weight)*parseFloat(current_silver_rate))+parseFloat(hc)+parseFloat(mc);
}
$('#nt_amount'+i).val(parseFloat(nt_amount).toFixed(3));
var nt_count=0;
var nt_tot_amt=0;
for(j=0;j<10;j++){
if($('#nt_item_type'+j).val()!=''){
nt_count++;
}
nt_tot_amt +=parseFloat($('#nt_amount'+j).val());
}
// alert(nt_count);
$('#nt_count').html(parseInt(nt_count));
$('#nt_tot_amt').html(parseFloat(nt_tot_amt).toFixed(3));
$('#nt_count1').html(parseInt(nt_count));
$('#nt_tot_amt1').html(parseFloat(nt_tot_amt).toFixed(3));


var j=0; var gold=0; var silver=0;var gold_weight=0; var silver_weight=0;
var gold_amt=0; var silver_amt=0;
	 for( var i=0;i<20;i++){
		var aid = $('#sales_type'+i).val();
		var weight = $('#net_wgt'+i).val();
		var amount = $('#sales_amt'+i).val();
		if(aid=='1' || aid=='2' ){
			if(aid=='1'){
gold++;
gold_weight=parseInt(gold_weight)+parseInt(weight);
gold_amt=parseInt(gold_amt)+parseInt(amount);

			}
			else{
silver++;
silver_weight=parseInt(silver_weight)+parseInt(weight);
silver_amt=parseInt(silver_amt)+parseInt(amount);
			}
	j++;
		}
 }
 $('#sales_total1').html(parseInt(gold_amt)+parseInt(silver_amt));
 for( var i=0;i<10;i++){
		var aid = $('#nt_item_type'+i).val();
		var weight = $('#nt_net_weight'+i).val();
		var amount = $('#nt_amount'+i).val();
		if(aid=='1' || aid=='2' ){
			if(aid=='1'){
gold++;
gold_weight=parseInt(gold_weight)+parseInt(weight);
gold_amt=parseInt(gold_amt)+parseInt(amount);

			}
			else{
silver++;
silver_weight=parseInt(silver_weight)+parseInt(weight);
silver_amt=parseInt(silver_amt)+parseInt(amount);
			}
	
		}
 }


$('#sales_item_count').html(j);
// $('#sales_total1').html(parseInt(gold_amt)+parseInt(silver_amt));
$('#sales_total').html(parseInt(gold_amt)+parseInt(silver_amt));
$('#sales_gold_count').html(gold);
$('#sales_silver_count').html(silver);
$('#sales_gold_weight').html(gold_weight);
$('#sales_silver_weight').html(silver_weight);
$('#sales_gold_amount').html(parseInt(gold_amt));
$('#sales_silver_amount').html(parseInt(silver_amt));

$('#sales_gold_count_1').val(gold);
$('#sales_silver_count_1').val(silver);
$('#sales_gold_weight_1').val(gold_weight);
$('#sales_silver_weight_1').val(silver_weight);
$('#sales_gold_amount_1').val(parseInt(gold_amt));
$('#sales_silver_amount_1').val(parseInt(silver_amt));

var total=0;var total1=0;var total2=0;
	for( var i=0;i<20;i++){
		var aid = $('#sales_amt'+i).val();
		
total=parseInt(total)+parseInt(aid);

	}
	$('#sales_total1').html(total);
	for( var i=0;i<10;i++){
	
	var aid1 = $('#oge_est_amount'+i).val();
		var aid2 = $('#nt_amount'+i).val();
		total1=parseInt(total1)+parseInt(aid1);
total=parseInt(total)+parseInt(aid2);
}
	$('#sales_total').html(total);
	
	$('#sales_total_1').val(total);

var netpay=parseInt(total)-parseInt(total1)+parseInt(total2);

$('#net_payable1').html(netpay);
$('#net_payable_1').val(netpay);
var adj_discount = $('#adj_discount').val();

var final_pay=parseFloat(netpay)-parseFloat(adj_discount);

$('#net_payable_2').val(final_pay);
$('#total_amount_ad').html(final_pay);

$('#net_payable').html(final_pay);


var count=$('.count_checkbox1').length;
// alert(count);

var return_count=0;
var return_amount=0;
var return_gold_count=0;
var return_silver_count=0;
var return_gold_weight=0;
var return_silver_weight=0;
var return_gold_amount=0;
var return_silver_amount=0;

for(i=1;i<=count;i++){
// $('#checkbox'+i).prop('checked', true);
var select_checkbox = document.getElementById('checkbox'+i);
if(select_checkbox.checked){
var return_type=$('#already_sale_type'+i).val();
var return_weight=$('#already_sale_weight'+i).val();
var return_amount_val=$('#already_sale_amount'+i).val();
// alert(return_amount);
if(return_type=='1'){
	return_gold_count+=1;
	return_gold_weight+=parseFloat(return_weight);
	return_gold_amount+=parseFloat(return_amount_val);

}
else{
	return_silver_count+=1;
	return_silver_weight+=parseFloat(return_weight);
	return_silver_amount+=parseFloat(return_amount_val);
}
return_count+=1;
return_amount+=parseFloat(return_amount_val);
}
}
$("#return_count").html(return_count);
$("#return_amount").html(return_amount);
$("#return_amount1").html(return_amount);
$("#return_gold_count").html(return_gold_count);
$("#return_silver_count").html(return_silver_count);
$("#return_gold_weight").html(return_gold_weight);
$("#return_silver_weight").html(return_silver_weight);
$("#return_gold_amount").html(return_gold_amount);
$("#return_silver_amount").html(return_silver_amount);


$("#return_count_1").val(return_count);
$("#return_amount_1").val(return_amount);
$("#return_gold_count_1").val(return_gold_count);
$("#return_silver_count_1").val(return_silver_count);
$("#return_gold_weight_1").val(return_gold_weight);
$("#return_silver_weight_1").val(return_silver_weight);
$("#return_gold_amount_1").val(return_gold_amount);
$("#return_silver_amount_1").val(return_silver_amount);




var sales_gold_amount=$('#sales_gold_amount_1').val();
var sales_silver_amount=$('#sales_silver_amount_1').val();
var oge_amount=$('#oge_total_1').val();
var calc_retun_amount=$('#return_amount_1').val();
var balance_value=$('#sales_net_payable2').val();

var sales_amount=parseFloat(sales_gold_amount)+parseFloat(sales_silver_amount);
var replace_value=parseFloat(sales_amount)-parseFloat(oge_amount);
var return_value=parseFloat(calc_retun_amount)-parseFloat(replace_value);
var return_payment=parseFloat(balance_value)-parseFloat(return_value);
$("#calc_sales_value").html(sales_amount);
$("#calc_exchange_value").html(oge_amount);
$("#calc_replace_value").html(replace_value);
$("#calc_replace_value1").html(replace_value);
$("#calc_return_value").html(calc_retun_amount);
$("#calc_return_value1").html(return_value);
$("#calc_return_value2").html(return_value);
$("#calc_payment_value").html(return_payment);

$("#return_net_payable").html(Math.abs(return_payment));
$("#return_net_payable1").html(Math.abs(return_payment));

$("#return_net_payable_1").val(Math.abs(return_payment));


if(parseInt(return_payment)>0){
	var pfp = document.getElementById("paid_from_party");
pfp.style.display= "block";
var pfc = document.getElementById("paid_from_company");
pfc.style.display = "none";
$("#paid_from").val(Math.abs('Company'));
}
else{
	var pfp = document.getElementById("paid_from_party");
pfp.style.display= "none";
	var pfc = document.getElementById("paid_from_company");
pfc.style.display = "block";
$("#paid_from").val(Math.abs('Party'));

}


}

function nt_met_rate_calc(i){


var weight = $('#nt_weight'+i).val();
var stone = $('#nt_stone'+i).val();
var hc = $('#nt_hc'+i).val();
var mc = $('#nt_mc'+i).val();
var wc = $('#nt_wc'+i).val();
var item_type = $('#nt_item_type'+i).val();
var current_gold_rate = $('#current_gold_rate').val();
var current_silver_rate = $('#current_silver_rate').val();


var net_weight=parseFloat(weight)+parseFloat(stone);
var metal_weight=parseFloat(net_weight)+parseFloat(net_weight)*parseFloat(wc)/100;
//$('#nt_net_weight'+i).val(parseFloat(net_weight).toFixed(3));
//$('#nt_metal_weight'+i).val(parseFloat(metal_weight).toFixed(3));

if(item_type==1){
var nt_amount=(parseFloat(metal_weight)*parseFloat(current_gold_rate))+parseFloat(hc)+parseFloat(mc);
}
else{
 var nt_amount=(parseFloat(metal_weight)*parseFloat(current_silver_rate))+parseFloat(hc)+parseFloat(mc);
}
$('#nt_amount'+i).val(parseFloat(nt_amount).toFixed(3));
var nt_count=0;
var nt_tot_amt=0;
for(j=0;j<10;j++){
if($('#nt_item_type'+j).val()!=''){
nt_count++;
}
nt_tot_amt +=parseFloat($('#nt_amount'+j).val());
}
// alert(nt_count);
$('#nt_count').html(parseInt(nt_count));
$('#nt_tot_amt').html(parseFloat(nt_tot_amt).toFixed(3));
$('#nt_count1').val(parseInt(nt_count));
$('#nt_tot_amt1').val(parseFloat(nt_tot_amt).toFixed(3));




var j=0; var gold=0; var silver=0;var gold_weight=0; var silver_weight=0;
var gold_amt=0; var silver_amt=0;
	 for( var i=0;i<20;i++){
		var aid = $('#sales_type'+i).val();
		var weight = $('#net_wgt'+i).val();
		var amount = $('#sales_amt'+i).val();
		if(aid=='1' || aid=='2' ){
			if(aid=='1'){
gold++;
gold_weight=parseInt(gold_weight)+parseInt(weight);
gold_amt=parseInt(gold_amt)+parseInt(amount);

			}
			else{
silver++;
silver_weight=parseInt(silver_weight)+parseInt(weight);
silver_amt=parseInt(silver_amt)+parseInt(amount);
			}
	j++;
		}
 }
 $('#sales_total1').html(parseInt(gold_amt)+parseInt(silver_amt));
 for( var i=0;i<10;i++){
		var aid = $('#nt_item_type'+i).val();
		var weight = $('#nt_net_weight'+i).val();
		var amount = $('#nt_amount'+i).val();
		if(aid=='1' || aid=='2' ){
			if(aid=='1'){
gold++;
gold_weight=parseInt(gold_weight)+parseInt(weight);
gold_amt=parseInt(gold_amt)+parseInt(amount);

			}
			else{
silver++;
silver_weight=parseInt(silver_weight)+parseInt(weight);
silver_amt=parseInt(silver_amt)+parseInt(amount);
			}
	
		}
 }


$('#sales_item_count').html(j);
$('#sales_total').html(parseInt(gold_amt)+parseInt(silver_amt));
$('#sales_gold_count').html(gold);
$('#sales_silver_count').html(silver);
$('#sales_gold_weight').html(gold_weight);
$('#sales_silver_weight').html(silver_weight);
$('#sales_gold_amount').html(parseInt(gold_amt));
$('#sales_silver_amount').html(parseInt(silver_amt));

$('#sales_gold_count_1').val(gold);
$('#sales_silver_count_1').val(silver);
$('#sales_gold_weight_1').val(gold_weight);
$('#sales_silver_weight_1').val(silver_weight);
$('#sales_gold_amount_1').val(parseInt(gold_amt));
$('#sales_silver_amount_1').val(parseInt(silver_amt));


var count=$('.count_checkbox1').length;
// alert(count);

var return_count=0;
var return_amount=0;
var return_gold_count=0;
var return_silver_count=0;
var return_gold_weight=0;
var return_silver_weight=0;
var return_gold_amount=0;
var return_silver_amount=0;

for(i=1;i<=count;i++){
// $('#checkbox'+i).prop('checked', true);
var select_checkbox = document.getElementById('checkbox'+i);
if(select_checkbox.checked){
var return_type=$('#already_sale_type'+i).val();
var return_weight=$('#already_sale_weight'+i).val();
var return_amount_val=$('#already_sale_amount'+i).val();
// alert(return_amount);
if(return_type=='1'){
	return_gold_count+=1;
	return_gold_weight+=parseFloat(return_weight);
	return_gold_amount+=parseFloat(return_amount_val);

}
else{
	return_silver_count+=1;
	return_silver_weight+=parseFloat(return_weight);
	return_silver_amount+=parseFloat(return_amount_val);
}
return_count+=1;
return_amount+=parseFloat(return_amount_val);
}
}
$("#return_count").html(return_count);
$("#return_amount").html(return_amount);
$("#return_amount1").html(return_amount);
$("#return_gold_count").html(return_gold_count);
$("#return_silver_count").html(return_silver_count);
$("#return_gold_weight").html(return_gold_weight);
$("#return_silver_weight").html(return_silver_weight);
$("#return_gold_amount").html(return_gold_amount);
$("#return_silver_amount").html(return_silver_amount);


$("#return_count_1").val(return_count);
$("#return_amount_1").val(return_amount);
$("#return_gold_count_1").val(return_gold_count);
$("#return_silver_count_1").val(return_silver_count);
$("#return_gold_weight_1").val(return_gold_weight);
$("#return_silver_weight_1").val(return_silver_weight);
$("#return_gold_amount_1").val(return_gold_amount);
$("#return_silver_amount_1").val(return_silver_amount);




var sales_gold_amount=$('#sales_gold_amount_1').val();
var sales_silver_amount=$('#sales_silver_amount_1').val();
var oge_amount=$('#oge_total_1').val();
var calc_retun_amount=$('#return_amount_1').val();
var balance_value=$('#sales_net_payable2').val();

var sales_amount=parseFloat(sales_gold_amount)+parseFloat(sales_silver_amount);
var replace_value=parseFloat(sales_amount)-parseFloat(oge_amount);
var return_value=parseFloat(calc_retun_amount)-parseFloat(replace_value);
var return_payment=parseFloat(balance_value)-parseFloat(return_value);
$("#calc_sales_value").html(sales_amount);
$("#calc_exchange_value").html(oge_amount);
$("#calc_replace_value").html(replace_value);
$("#calc_replace_value1").html(replace_value);
$("#calc_return_value").html(calc_retun_amount);
$("#calc_return_value1").html(return_value);
$("#calc_return_value2").html(return_value);
$("#calc_payment_value").html(return_payment);

$("#return_net_payable").html(Math.abs(return_payment));
$("#return_net_payable1").html(Math.abs(return_payment));

$("#return_net_payable_1").val(Math.abs(return_payment));


if(parseInt(return_payment)>0){
	var pfp = document.getElementById("paid_from_party");
pfp.style.display= "block";
var pfc = document.getElementById("paid_from_company");
pfc.style.display = "none";
$("#paid_from").val(Math.abs('Company'));
}
else{
	var pfp = document.getElementById("paid_from_party");
pfp.style.display= "none";
	var pfc = document.getElementById("paid_from_company");
pfc.style.display = "block";
$("#paid_from").val(Math.abs('Party'));

}

}


function nt_tot_amt_calc(i){


var weight = $('#nt_weight'+i).val();
var stone = $('#nt_stone'+i).val();
var hc = $('#nt_hc'+i).val();
var mc = $('#nt_mc'+i).val();
var wc = $('#nt_wc'+i).val();
var item_type = $('#nt_item_type'+i).val();
var current_gold_rate = $('#current_gold_rate').val();
var current_silver_rate = $('#current_silver_rate').val();


var net_weight=parseFloat(weight)+parseFloat(stone);
var metal_weight=parseFloat(net_weight)+parseFloat(net_weight)*parseFloat(wc)/100;
$('#nt_net_weight'+i).val(parseFloat(net_weight).toFixed(3));
$('#nt_metal_weight'+i).val(parseFloat(metal_weight).toFixed(3));

if(item_type==1){
var nt_amount=(parseFloat(metal_weight)*parseFloat(current_gold_rate))+parseFloat(hc)+parseFloat(mc);
}
else{
 var nt_amount=(parseFloat(metal_weight)*parseFloat(current_silver_rate))+parseFloat(hc)+parseFloat(mc);
}
// $('#nt_amount'+i).val(parseFloat(nt_amount).toFixed(3));
var nt_count=0;
var nt_tot_amt=0;
for(j=0;j<10;j++){
if($('#nt_item_type'+j).val()!=''){
nt_count++;
}
nt_tot_amt +=parseFloat($('#nt_amount'+j).val());
}
// alert(nt_count);
$('#nt_count').html(parseInt(nt_count));
$('#nt_tot_amt').html(parseFloat(nt_tot_amt).toFixed(3));
$('#nt_count1').val(parseInt(nt_count));
$('#nt_tot_amt1').val(parseFloat(nt_tot_amt).toFixed(3));



var j=0; var gold=0; var silver=0;var gold_weight=0; var silver_weight=0;
var gold_amt=0; var silver_amt=0;
	 for( var i=0;i<20;i++){
		var aid = $('#sales_type'+i).val();
		var weight = $('#net_wgt'+i).val();
		var amount = $('#sales_amt'+i).val();
		if(aid=='1' || aid=='2' ){
			if(aid=='1'){
gold++;
gold_weight=parseInt(gold_weight)+parseInt(weight);
gold_amt=parseInt(gold_amt)+parseInt(amount);

			}
			else{
silver++;
silver_weight=parseInt(silver_weight)+parseInt(weight);
silver_amt=parseInt(silver_amt)+parseInt(amount);
			}
	j++;
		}
 }
 $('#sales_total1').html(parseInt(gold_amt)+parseInt(silver_amt));
 for( var i=0;i<10;i++){
		var aid = $('#nt_item_type'+i).val();
		var weight = $('#nt_net_weight'+i).val();
		var amount = $('#nt_amount'+i).val();
		if(aid=='1' || aid=='2' ){
			if(aid=='1'){
gold++;
gold_weight=parseInt(gold_weight)+parseInt(weight);
gold_amt=parseInt(gold_amt)+parseInt(amount);

			}
			else{
silver++;
silver_weight=parseInt(silver_weight)+parseInt(weight);
silver_amt=parseInt(silver_amt)+parseInt(amount);
			}
	
		}
 }


$('#sales_item_count').html(j);
$('#sales_total').html(parseInt(gold_amt)+parseInt(silver_amt));
$('#sales_gold_count').html(gold);
$('#sales_silver_count').html(silver);
$('#sales_gold_weight').html(gold_weight);
$('#sales_silver_weight').html(silver_weight);
$('#sales_gold_amount').html(parseInt(gold_amt));
$('#sales_silver_amount').html(parseInt(silver_amt));

$('#sales_gold_count_1').val(gold);
$('#sales_silver_count_1').val(silver);
$('#sales_gold_weight_1').val(gold_weight);
$('#sales_silver_weight_1').val(silver_weight);
$('#sales_gold_amount_1').val(parseInt(gold_amt));
$('#sales_silver_amount_1').val(parseInt(silver_amt));

var total=0;var total1=0;var total2=0;
	for( var i=0;i<20;i++){
		var aid = $('#sales_amt'+i).val();
		
total=parseInt(total)+parseInt(aid);

	}
	$('#sales_total1').html(total);
	for( var i=0;i<10;i++){
	
	var aid1 = $('#oge_est_amount'+i).val();
		var aid2 = $('#nt_amount'+i).val();
		total1=parseInt(total1)+parseInt(aid1);
total=parseInt(total)+parseInt(aid2);
}
	$('#sales_total').html(total);
	
	$('#sales_total_1').val(total);

var netpay=parseInt(total)-parseInt(total1)+parseInt(total2);

$('#net_payable1').html(netpay);
$('#net_payable_1').val(netpay);
var adj_discount = $('#adj_discount').val();

var final_pay=parseFloat(netpay)-parseFloat(adj_discount);

$('#net_payable_2').val(final_pay);
$('#total_amount_ad').html(final_pay);

$('#net_payable').html(final_pay);



var count=$('.count_checkbox1').length;
// alert(count);

var return_count=0;
var return_amount=0;
var return_gold_count=0;
var return_silver_count=0;
var return_gold_weight=0;
var return_silver_weight=0;
var return_gold_amount=0;
var return_silver_amount=0;

for(i=1;i<=count;i++){
// $('#checkbox'+i).prop('checked', true);
var select_checkbox = document.getElementById('checkbox'+i);
if(select_checkbox.checked){
var return_type=$('#already_sale_type'+i).val();
var return_weight=$('#already_sale_weight'+i).val();
var return_amount_val=$('#already_sale_amount'+i).val();
// alert(return_amount);
if(return_type=='1'){
	return_gold_count+=1;
	return_gold_weight+=parseFloat(return_weight);
	return_gold_amount+=parseFloat(return_amount_val);

}
else{
	return_silver_count+=1;
	return_silver_weight+=parseFloat(return_weight);
	return_silver_amount+=parseFloat(return_amount_val);
}
return_count+=1;
return_amount+=parseFloat(return_amount_val);
}
}
$("#return_count").html(return_count);
$("#return_amount").html(return_amount);
$("#return_amount1").html(return_amount);
$("#return_gold_count").html(return_gold_count);
$("#return_silver_count").html(return_silver_count);
$("#return_gold_weight").html(return_gold_weight);
$("#return_silver_weight").html(return_silver_weight);
$("#return_gold_amount").html(return_gold_amount);
$("#return_silver_amount").html(return_silver_amount);


$("#return_count_1").val(return_count);
$("#return_amount_1").val(return_amount);
$("#return_gold_count_1").val(return_gold_count);
$("#return_silver_count_1").val(return_silver_count);
$("#return_gold_weight_1").val(return_gold_weight);
$("#return_silver_weight_1").val(return_silver_weight);
$("#return_gold_amount_1").val(return_gold_amount);
$("#return_silver_amount_1").val(return_silver_amount);




var sales_gold_amount=$('#sales_gold_amount_1').val();
var sales_silver_amount=$('#sales_silver_amount_1').val();
var oge_amount=$('#oge_total_1').val();
var calc_retun_amount=$('#return_amount_1').val();
var balance_value=$('#sales_net_payable2').val();

var sales_amount=parseFloat(sales_gold_amount)+parseFloat(sales_silver_amount);
var replace_value=parseFloat(sales_amount)-parseFloat(oge_amount);
var return_value=parseFloat(calc_retun_amount)-parseFloat(replace_value);
var return_payment=parseFloat(balance_value)-parseFloat(return_value);
$("#calc_sales_value").html(sales_amount);
$("#calc_exchange_value").html(oge_amount);
$("#calc_replace_value").html(replace_value);
$("#calc_replace_value1").html(replace_value);
$("#calc_return_value").html(calc_retun_amount);
$("#calc_return_value1").html(return_value);
$("#calc_return_value2").html(return_value);
$("#calc_payment_value").html(return_payment);

$("#return_net_payable").html(Math.abs(return_payment));
$("#return_net_payable1").html(Math.abs(return_payment));

$("#return_net_payable_1").val(Math.abs(return_payment));


if(parseInt(return_payment)>0){
	var pfp = document.getElementById("paid_from_party");
pfp.style.display= "block";
var pfc = document.getElementById("paid_from_company");
pfc.style.display = "none";
$("#paid_from").val(Math.abs('Company'));
}
else{
	var pfp = document.getElementById("paid_from_party");
pfp.style.display= "none";
	var pfc = document.getElementById("paid_from_company");
pfc.style.display = "block";
$("#paid_from").val(Math.abs('Party'));

}


}


		</script>
<script>
function oge_net_weight(i){
	var weight = $('#oge_weight'+i).val();
	var st_weight = $('#oge_st_weight'+i).val();
	var less = $('#oge_less'+i).val();	   
	var net_weight = parseFloat(weight)- parseFloat(st_weight) -parseFloat(less);
	$('#oge_net_weight'+i).val(parseFloat(net_weight).toFixed(3));

	var current_gold_rate = $('#current_gold_rate').val();
        var current_silver_rate = $('#current_silver_rate').val();
		oge_gold_weight=0;oge_silver_weight=0;oge_gold_amount=0;oge_silver_amount=0;		
for(i=0;i<10;i++){
	var aid = $('#oge_item_type'+i).val();
	var net_weight=$('#oge_net_weight'+i).val();

	if(aid!=''){
				if(aid=='1'){
					$('#oge_est_amount'+i).val((parseFloat(net_weight)*parseFloat(current_gold_rate)).toFixed(2));	
					oge_gold_amount+=parseFloat(net_weight)*parseFloat(current_gold_rate);
					oge_gold_weight+=parseFloat(net_weight);
				}
				else{
					$('#oge_est_amount'+i).val((parseFloat(net_weight)*parseFloat(current_silver_rate)).toFixed(2));	
					oge_silver_amount+=parseFloat(net_weight)*parseFloat(current_silver_rate);
					oge_silver_weight+=parseFloat(net_weight);
				}
		
			}
		}
		$('#oge_total1').html((parseFloat(oge_gold_amount)+parseFloat(oge_silver_amount)));
		// $('#oge_gold_count').html(gold);
	// $('#oge_silver_count').html(silver);
	$('#oge_gold_weight').html(parseFloat(oge_gold_weight));
	$('#oge_silver_weight').html(parseFloat(oge_silver_weight));
	$('#oge_gold_total').html(parseFloat(oge_gold_amount));
	$('#oge_silver_total').html(parseFloat(oge_silver_amount));

	
	
	$('#oge_gold_weight_1').val(oge_gold_weight);
	$('#oge_silver_weight_1').val(oge_silver_weight);
	$('#oge_gold_total_1').val(oge_gold_amount);
	$('#oge_silver_total_1').val(oge_silver_amount);
	var total=0;var total1=0;var total2=0;
for( var i=0;i<20;i++){
			var aid = $('#sales_amt'+i).val();
			
total=parseInt(total)+parseInt(aid);

		}

	for( var i=0;i<10;i++){
		
		var aid1 = $('#oge_est_amount'+i).val();
			var aid2 = $('#nt_amount'+i).val();
			total1=parseInt(total1)+parseInt(aid1);
total2=parseInt(total2)+parseInt(aid2);
	}
		$('#oge_total').html(total1);
		$('#oge_total1').html(total1);
		$('#oge_total_1').val(total1);

		var netpay=parseInt(total)-parseInt(total1)+parseInt(total2);

$('#net_payable1').html(netpay);
$('#net_payable_1').val(netpay);
var adj_discount = $('#adj_discount').val();
	
var final_pay=parseFloat(netpay)-parseFloat(adj_discount);
	
$('#net_payable_2').val(final_pay);
$('#total_amount_ad').html(final_pay);
$('#net_payable').html(final_pay);




var count=$('.count_checkbox1').length;
// alert(count);

var return_count=0;
var return_amount=0;
var return_gold_count=0;
var return_silver_count=0;
var return_gold_weight=0;
var return_silver_weight=0;
var return_gold_amount=0;
var return_silver_amount=0;

for(i=1;i<=count;i++){
// $('#checkbox'+i).prop('checked', true);
var select_checkbox = document.getElementById('checkbox'+i);
if(select_checkbox.checked){
var return_type=$('#already_sale_type'+i).val();
var return_weight=$('#already_sale_weight'+i).val();
var return_amount_val=$('#already_sale_amount'+i).val();
// alert(return_amount);
if(return_type=='1'){
	return_gold_count+=1;
	return_gold_weight+=parseFloat(return_weight);
	return_gold_amount+=parseFloat(return_amount_val);

}
else{
	return_silver_count+=1;
	return_silver_weight+=parseFloat(return_weight);
	return_silver_amount+=parseFloat(return_amount_val);
}
return_count+=1;
return_amount+=parseFloat(return_amount_val);
}
}
$("#return_count").html(return_count);
$("#return_amount").html(return_amount);
$("#return_amount1").html(return_amount);
$("#return_gold_count").html(return_gold_count);
$("#return_silver_count").html(return_silver_count);
$("#return_gold_weight").html(return_gold_weight);
$("#return_silver_weight").html(return_silver_weight);
$("#return_gold_amount").html(return_gold_amount);
$("#return_silver_amount").html(return_silver_amount);


$("#return_count_1").val(return_count);
$("#return_amount_1").val(return_amount);
$("#return_gold_count_1").val(return_gold_count);
$("#return_silver_count_1").val(return_silver_count);
$("#return_gold_weight_1").val(return_gold_weight);
$("#return_silver_weight_1").val(return_silver_weight);
$("#return_gold_amount_1").val(return_gold_amount);
$("#return_silver_amount_1").val(return_silver_amount);




var sales_gold_amount=$('#sales_gold_amount_1').val();
var sales_silver_amount=$('#sales_silver_amount_1').val();
var oge_amount=$('#oge_total_1').val();
var calc_retun_amount=$('#return_amount_1').val();
var balance_value=$('#sales_net_payable2').val();

var sales_amount=parseFloat(sales_gold_amount)+parseFloat(sales_silver_amount);
var replace_value=parseFloat(sales_amount)-parseFloat(oge_amount);
var return_value=parseFloat(calc_retun_amount)-parseFloat(replace_value);
var return_payment=parseFloat(balance_value)-parseFloat(return_value);
$("#calc_sales_value").html(sales_amount);
$("#calc_exchange_value").html(oge_amount);
$("#calc_replace_value").html(replace_value);
$("#calc_replace_value1").html(replace_value);
$("#calc_return_value").html(calc_retun_amount);
$("#calc_return_value1").html(return_value);
$("#calc_return_value2").html(return_value);
$("#calc_payment_value").html(return_payment);

$("#return_net_payable").html(Math.abs(return_payment));
$("#return_net_payable1").html(Math.abs(return_payment));

$("#return_net_payable_1").val(Math.abs(return_payment));


if(parseInt(return_payment)>0){
	var pfp = document.getElementById("paid_from_party");
pfp.style.display= "block";
var pfc = document.getElementById("paid_from_company");
pfc.style.display = "none";
$("#paid_from").val(Math.abs('Company'));
}
else{
	var pfp = document.getElementById("paid_from_party");
pfp.style.display= "none";
	var pfc = document.getElementById("paid_from_company");
pfc.style.display = "block";
$("#paid_from").val(Math.abs('Party'));

}

}
</script>
<script>
function oge_weight(){
		
		var gold_tot=0; var silver_tot=0;
	 	for( var i=0;i<10;i++){
			var aid = $('#oge_item_type'+i).val();
			var oge_weight = $('#oge_net_weight'+i).val();
			if(aid!=''){
				if(aid=='1'){
gold_tot=parseInt(gold_tot)+parseInt(oge_weight);
				}
				else{
					silver_tot=parseInt(silver_tot)+parseInt(oge_weight);
				}
	
			}
	 }

$('#oge_gold_weight').html(gold_tot);
	$('#oge_silver_weight').html(silver_tot);
	$('#oge_gold_weight_1').val(gold_tot);
	$('#oge_silver_weight_1').val(silver_tot);



	var current_gold_rate = $('#current_gold_rate').val();
        var current_silver_rate = $('#current_silver_rate').val();
		oge_gold_weight=0;oge_silver_weight=0;oge_gold_amount=0;oge_silver_amount=0;		
for(i=0;i<10;i++){
	var aid = $('#oge_item_type'+i).val();
	var net_weight=$('#oge_net_weight'+i).val();

	if(aid!=''){
				if(aid=='1'){
					$('#oge_est_amount'+i).val((parseFloat(net_weight)*parseFloat(current_gold_rate)).toFixed(2));	
					oge_gold_amount+=parseFloat(net_weight)*parseFloat(current_gold_rate);
					oge_gold_weight+=parseFloat(net_weight);
				}
				else{
					$('#oge_est_amount'+i).val((parseFloat(net_weight)*parseFloat(current_silver_rate)).toFixed(2));	
					oge_silver_amount+=parseFloat(net_weight)*parseFloat(current_silver_rate);
					oge_silver_weight+=parseFloat(net_weight);
				}
		
			}
		}
		$('#oge_total1').html((parseFloat(oge_gold_amount)+parseFloat(oge_silver_amount)));
		// $('#oge_gold_count').html(gold);
	// $('#oge_silver_count').html(silver);
	$('#oge_gold_weight').html(parseFloat(oge_gold_weight));
	$('#oge_silver_weight').html(parseFloat(oge_silver_weight));
	$('#oge_gold_total').html(parseFloat(oge_gold_amount));
	$('#oge_silver_total').html(parseFloat(oge_silver_amount));

	
	
	$('#oge_gold_weight_1').val(oge_gold_weight);
	$('#oge_silver_weight_1').val(oge_silver_weight);
	$('#oge_gold_total_1').val(oge_gold_amount);
	$('#oge_silver_total_1').val(oge_silver_amount);
	var total=0;var total1=0;var total2=0;
for( var i=0;i<20;i++){
			var aid = $('#sales_amt'+i).val();
			
total=parseInt(total)+parseInt(aid);

		}

	for( var i=0;i<10;i++){
		
		var aid1 = $('#oge_est_amount'+i).val();
			var aid2 = $('#nt_amount'+i).val();
			total1=parseInt(total1)+parseInt(aid1);
total2=parseInt(total2)+parseInt(aid2);
	}
		$('#oge_total').html(total1);
		$('#oge_total1').html(total1);
		$('#oge_total_1').val(total1);

		var netpay=parseInt(total)-parseInt(total1)+parseInt(total2);
$('#net_payable1').html(netpay);
$('#net_payable_1').val(netpay);
var adj_discount = $('#adj_discount').val();
	
var final_pay=parseFloat(netpay)-parseFloat(adj_discount);
	
$('#net_payable_2').val(final_pay);
$('#total_amount_ad').html(final_pay);
$('#net_payable').html(final_pay);



var count=$('.count_checkbox1').length;
// alert(count);

var return_count=0;
var return_amount=0;
var return_gold_count=0;
var return_silver_count=0;
var return_gold_weight=0;
var return_silver_weight=0;
var return_gold_amount=0;
var return_silver_amount=0;

for(i=1;i<=count;i++){
// $('#checkbox'+i).prop('checked', true);
var select_checkbox = document.getElementById('checkbox'+i);
if(select_checkbox.checked){
var return_type=$('#already_sale_type'+i).val();
var return_weight=$('#already_sale_weight'+i).val();
var return_amount_val=$('#already_sale_amount'+i).val();
// alert(return_amount);
if(return_type=='1'){
	return_gold_count+=1;
	return_gold_weight+=parseFloat(return_weight);
	return_gold_amount+=parseFloat(return_amount_val);

}
else{
	return_silver_count+=1;
	return_silver_weight+=parseFloat(return_weight);
	return_silver_amount+=parseFloat(return_amount_val);
}
return_count+=1;
return_amount+=parseFloat(return_amount_val);
}
}
$("#return_count").html(return_count);
$("#return_amount").html(return_amount);
$("#return_amount1").html(return_amount);
$("#return_gold_count").html(return_gold_count);
$("#return_silver_count").html(return_silver_count);
$("#return_gold_weight").html(return_gold_weight);
$("#return_silver_weight").html(return_silver_weight);
$("#return_gold_amount").html(return_gold_amount);
$("#return_silver_amount").html(return_silver_amount);


$("#return_count_1").val(return_count);
$("#return_amount_1").val(return_amount);
$("#return_gold_count_1").val(return_gold_count);
$("#return_silver_count_1").val(return_silver_count);
$("#return_gold_weight_1").val(return_gold_weight);
$("#return_silver_weight_1").val(return_silver_weight);
$("#return_gold_amount_1").val(return_gold_amount);
$("#return_silver_amount_1").val(return_silver_amount);




var sales_gold_amount=$('#sales_gold_amount_1').val();
var sales_silver_amount=$('#sales_silver_amount_1').val();
var oge_amount=$('#oge_total_1').val();
var calc_retun_amount=$('#return_amount_1').val();
var balance_value=$('#sales_net_payable2').val();

var sales_amount=parseFloat(sales_gold_amount)+parseFloat(sales_silver_amount);
var replace_value=parseFloat(sales_amount)-parseFloat(oge_amount);
var return_value=parseFloat(calc_retun_amount)-parseFloat(replace_value);
var return_payment=parseFloat(balance_value)-parseFloat(return_value);
$("#calc_sales_value").html(sales_amount);
$("#calc_exchange_value").html(oge_amount);
$("#calc_replace_value").html(replace_value);
$("#calc_replace_value1").html(replace_value);
$("#calc_return_value").html(calc_retun_amount);
$("#calc_return_value1").html(return_value);
$("#calc_return_value2").html(return_value);
$("#calc_payment_value").html(return_payment);

$("#return_net_payable").html(Math.abs(return_payment));
$("#return_net_payable1").html(Math.abs(return_payment));

$("#return_net_payable_1").val(Math.abs(return_payment));


if(parseInt(return_payment)>0){
	var pfp = document.getElementById("paid_from_party");
pfp.style.display= "block";
var pfc = document.getElementById("paid_from_company");
pfc.style.display = "none";
$("#paid_from").val(Math.abs('Company'));
}
else{
	var pfp = document.getElementById("paid_from_party");
pfp.style.display= "none";
	var pfc = document.getElementById("paid_from_company");
pfc.style.display = "block";
$("#paid_from").val(Math.abs('Party'));

}



	}

</script>
<script>
function oge_total(){
var total=0;var total1=0;var total2=0;
for( var i=0;i<20;i++){
			var aid = $('#sales_amt'+i).val();
			
total=parseInt(total)+parseInt(aid);

		}
		for( var i=0;i<10;i++){
		
		var aid1 = $('#oge_est_amount'+i).val();
			var aid2 = $('#nt_amount'+i).val();
			total1=parseInt(total1)+parseInt(aid1);
total2=parseInt(total2)+parseInt(aid2);
	}
		$('#oge_total').html(total1);
		$('#oge_total1').html(total1);
		$('#oge_total_1').val(total1);

		var netpay=parseInt(total)-parseInt(total1)+parseInt(total2);

$('#net_payable1').html(netpay);
$('#net_payable_1').val(netpay);
var adj_discount = $('#adj_discount').val();
	
var final_pay=parseFloat(netpay)-parseFloat(adj_discount);
	
$('#net_payable_2').val(final_pay);
$('#total_amount_ad').html(final_pay);

$('#net_payable').html(final_pay);


var j=0;var gold_tot=0; var silver_tot=0;
	 	for( var i=0;i<10;i++){
			var aid = $('#oge_item_type'+i).val();
			var oge_amount = $('#oge_est_amount'+i).val();
			if(aid!=''){
				if(aid=='1'){
gold_tot=parseInt(gold_tot)+parseInt(oge_amount);
				}
				else{
					silver_tot=parseInt(silver_tot)+parseInt(oge_amount);
				}
		j++;
			}
	 }

$('#oge_gold_total').html(gold_tot);
	$('#oge_silver_total').html(silver_tot);
	
	$('#oge_gold_total_1').val(gold_tot);
	$('#oge_silver_total_1').val(silver_tot);

	}
</script>
<script>
function nt_item_purity(i){
		
        var aid = $('#nt_quality'+i).val()
		//alert(aid);
        var baseurl= $("#baseurl").val();
         // alert(aid);
        $.ajax({
        type: "POST",
        url: baseurl+'Sales_return/get_purity',
        async: false,
        type: "POST",
        data: "typeid="+aid,
        dataType: "html",
        success: function(response)
        {
			
        $('#nt_purity'+i).val(parseFloat(response));
			       
        }
        });

    }


</script>
<script>
function item_purity(i){
		
        var aid = $('#oge_quality'+i).val()
		//alert(aid);
        var baseurl= $("#baseurl").val();
         // alert(aid);
        $.ajax({
        type: "POST",
        url: baseurl+'Sales_return/get_purity',
        async: false,
        type: "POST",
        data: "typeid="+aid,
        dataType: "html",
        success: function(response)
        {
			
        $('#oge_purity'+i).val(parseFloat(response));
			       
        }
        });
    }
	</script>

		<script>


function get_item_nt(val){
var aid = $('#nt_item_type'+val).val()
var baseurl= $("#baseurl").val();
 // alert(aid);
$.ajax({
type: "POST",
url: baseurl+'Sales_return/get_item',
async: false,
type: "POST",
data: "typeid="+aid,
dataType: "html",
success: function(response)
{
	
$('#nt_item'+val).empty().append(response);
		   
}
});


}
</script>
<script>
function get_subitem_nt(val){
		// alert(val);
        var aid = $('#nt_item'+val).val()
        var baseurl= $("#baseurl").val();
        //  alert(aid);
        $.ajax({
        type: "POST",
        url: baseurl+'Sales_return/get_subitem',
        async: false,
        type: "POST",
        data: "typeid="+aid,
        dataType: "html",
        success: function(response)
        {
			
        $('#nt_subitem'+val).empty().append(response);
			       
        }
        });
		
    }

</script>
<script>
function get_item_old(val){
        var aid = $('#oge_item_type'+val).val()
        var baseurl= $("#baseurl").val();
         // alert(aid);
        $.ajax({
        type: "POST",
        url: baseurl+'Sales_entry/get_item',
        async: false,
        type: "POST",
        data: "typeid="+aid,
        dataType: "html",
        success: function(response)
        {
			
        $('#oge_item'+val).empty().append(response);
			       
        }
        });
	
		var j=0;var gold=0; var silver=0;
	 	for( var i=0;i<10;i++){
			var aid = $('#oge_item_type'+i).val();
			if(aid!=''){
				if(aid=='1'){
gold++;
				}
				else{
silver++;
				}
		j++;
			}
	 }
	$('#oge_count').html(j);
	$('#oge_gold_count').html(gold);
	$('#oge_silver_count').html(silver);

	$('#oge_gold_count_1').val(gold);
	$('#oge_silver_count_1').val(silver);


    }
</script>
<script>
	
		function get_tag_detail(val){
	// alert(val);
        var aid = $('#tag_no'+val).val();
        var baseurl= $("#baseurl").val();
        // alert(aid);
        $.ajax({
        type: "POST",
        url: baseurl+'Sales_return/get_tag_detail',
        async: false,
        type: "POST",
        data: "typeid="+aid,
        dataType: "html",
        success: function(response)
        {
		res=response.split('||');
        $('#item1'+val).val(res[1]);
		$('#subitem1'+val).val(res[2]);
		$('#img'+val).val(res[3]);
		$('#purity'+val).val(res[4]);
		$('#weight'+val).val(res[5]);
		$('#st_wgt'+val).val(res[6]);
		$('#net_wgt'+val).val(res[7]);
		$('#hc_amt'+val).val(res[8]);
		$('#mc_amt'+val).val(res[9]);
		$('#wc_amt'+val).val(res[10]);
		$('#sales_type'+val).val(res[11]);
		$('#quality1'+val).val(res[13]);
		$('#metal_weight'+val).val(res[14]);
		$('#tag_entry_image'+val).empty().append(res[15]);
		$('#item'+val).val(res[16]);
		$('#subitem'+val).val(res[17]);
		$('#quality'+val).val(res[18]);
		
		

		
		var current_gold_rate = $('#current_gold_rate').val();
        var current_silver_rate = $('#current_silver_rate').val();
if(res[11]=='1'){
	var amt = (parseFloat(current_gold_rate)*parseFloat(res[14]))+parseFloat(res[8])+parseFloat(res[9]);
}
else{
	var amt = (parseFloat(current_silver_rate)*parseFloat(res[14]))+parseFloat(res[8])+parseFloat(res[9]);
}
$('#sales_amt'+val).val(parseFloat(amt).toFixed(2));
        }
        });
var j=0; var gold=0; var silver=0;var gold_weight=0; var silver_weight=0;
var gold_amt=0; var silver_amt=0;
	 	for( var i=0;i<20;i++){
			var aid = $('#sales_type'+i).val();
			var weight = $('#net_wgt'+i).val();
			var amount = $('#sales_amt'+i).val();
			if(aid=='1' || aid=='2' ){
				if(aid=='1'){
gold++;
gold_weight=parseInt(gold_weight)+parseInt(weight);
gold_amt=parseInt(gold_amt)+parseInt(amount);

				}
				else{
silver++;
silver_weight=parseInt(silver_weight)+parseInt(weight);
silver_amt=parseInt(silver_amt)+parseInt(amount);
				}
		j++;
			}
	 }
	 $('#sales_total1').html(parseInt(gold_amt)+parseInt(silver_amt));
	 for( var i=0;i<10;i++){
			var aid = $('#nt_item_type'+i).val();
			var weight = $('#nt_net_weight'+i).val();
			var amount = $('#nt_amount'+i).val();
			if(aid=='1' || aid=='2' ){
				if(aid=='1'){
gold++;
gold_weight=parseInt(gold_weight)+parseInt(weight);
gold_amt=parseInt(gold_amt)+parseInt(amount);

				}
				else{
silver++;
silver_weight=parseInt(silver_weight)+parseInt(weight);
silver_amt=parseInt(silver_amt)+parseInt(amount);
				}
		
			}
	 }


	$('#sales_item_count').html(j);
	$('#sales_total').html(parseInt(gold_amt)+parseInt(silver_amt));
	$('#sales_gold_count').html(gold);
	$('#sales_silver_count').html(silver);
	$('#sales_gold_weight').html(gold_weight);
	$('#sales_silver_weight').html(silver_weight);
	$('#sales_gold_amount').html(gold_amt);
	$('#sales_silver_amount').html(silver_amt);

	$('#sales_gold_count_1').val(gold);
	$('#sales_silver_count_1').val(silver);
	$('#sales_gold_weight_1').val(gold_weight);
	$('#sales_silver_weight_1').val(silver_weight);
	$('#sales_gold_amount_1').val(gold_amt);
	$('#sales_silver_amount_1').val(silver_amt);


	var count=$('.count_checkbox1').length;
// alert(count);

var return_count=0;
var return_amount=0;
var return_gold_count=0;
var return_silver_count=0;
var return_gold_weight=0;
var return_silver_weight=0;
var return_gold_amount=0;
var return_silver_amount=0;

for(i=1;i<=count;i++){
// $('#checkbox'+i).prop('checked', true);
var select_checkbox = document.getElementById('checkbox'+i);
if(select_checkbox.checked){
var return_type=$('#already_sale_type'+i).val();
var return_weight=$('#already_sale_weight'+i).val();
var return_amount_val=$('#already_sale_amount'+i).val();
// alert(return_amount);
if(return_type=='1'){
	return_gold_count+=1;
	return_gold_weight+=parseFloat(return_weight);
	return_gold_amount+=parseFloat(return_amount_val);

}
else{
	return_silver_count+=1;
	return_silver_weight+=parseFloat(return_weight);
	return_silver_amount+=parseFloat(return_amount_val);
}
return_count+=1;
return_amount+=parseFloat(return_amount_val);
}
}
$("#return_count").html(return_count);
$("#return_amount").html(return_amount);
$("#return_amount1").html(return_amount);
$("#return_gold_count").html(return_gold_count);
$("#return_silver_count").html(return_silver_count);
$("#return_gold_weight").html(return_gold_weight);
$("#return_silver_weight").html(return_silver_weight);
$("#return_gold_amount").html(return_gold_amount);
$("#return_silver_amount").html(return_silver_amount);


$("#return_count_1").val(return_count);
$("#return_amount_1").val(return_amount);
$("#return_gold_count_1").val(return_gold_count);
$("#return_silver_count_1").val(return_silver_count);
$("#return_gold_weight_1").val(return_gold_weight);
$("#return_silver_weight_1").val(return_silver_weight);
$("#return_gold_amount_1").val(return_gold_amount);
$("#return_silver_amount_1").val(return_silver_amount);




var sales_gold_amount=$('#sales_gold_amount_1').val();
var sales_silver_amount=$('#sales_silver_amount_1').val();
var oge_amount=$('#oge_total_1').val();
var calc_retun_amount=$('#return_amount_1').val();
var balance_value=$('#sales_net_payable2').val();

var sales_amount=parseFloat(sales_gold_amount)+parseFloat(sales_silver_amount);
var replace_value=parseFloat(sales_amount)-parseFloat(oge_amount);
var return_value=parseFloat(calc_retun_amount)-parseFloat(replace_value);
var return_payment=parseFloat(balance_value)-parseFloat(return_value);
$("#calc_sales_value").html(sales_amount);
$("#calc_exchange_value").html(oge_amount);
$("#calc_replace_value").html(replace_value);
$("#calc_replace_value1").html(replace_value);
$("#calc_return_value").html(calc_retun_amount);
$("#calc_return_value1").html(return_value);
$("#calc_return_value2").html(return_value);
$("#calc_payment_value").html(return_payment);

$("#return_net_payable").html(Math.abs(return_payment));
$("#return_net_payable1").html(Math.abs(return_payment));

$("#return_net_payable_1").val(Math.abs(return_payment));


if(parseInt(return_payment)>0){
	var pfp = document.getElementById("paid_from_party");
pfp.style.display= "block";
var pfc = document.getElementById("paid_from_company");
pfc.style.display = "none";
$("#paid_from").val(Math.abs('Company'));
}
else{
	var pfp = document.getElementById("paid_from_party");
pfp.style.display= "none";
	var pfc = document.getElementById("paid_from_company");
pfc.style.display = "block";
$("#paid_from").val(Math.abs('Party'));

}


    }
</script>
<script>

function select_all1(){


var count=$('.count_checkbox1').length;
// alert(count);
var select_all = document.getElementById("select_all");
var return_count=0;
var return_amount=0;
var return_gold_count=0;
var return_silver_count=0;
var return_gold_weight=0;
var return_silver_weight=0;
var return_gold_amount=0;
var return_silver_amount=0;
if(select_all.checked){
for(i=1;i<=count;i++){
$('#checkbox'+i).prop('checked', true);
var return_type=$('#already_sale_type'+i).val();
var return_weight=$('#already_sale_weight'+i).val();
var return_amount_val=$('#already_sale_amount'+i).val();
// alert(return_amount);
if(return_type=='1'){
	return_gold_count+=1;
	return_gold_weight+=parseFloat(return_weight);
	return_gold_amount+=parseFloat(return_amount_val);

}
else{
	return_silver_count+=1;
	return_silver_weight+=parseFloat(return_weight);
	return_silver_amount+=parseFloat(return_amount_val);
}
return_count+=1;
return_amount+=parseFloat(return_amount_val);
}
$("#return_count").html(return_count);
$("#return_amount").html(return_amount);
$("#return_amount1").html(return_amount);
$("#return_gold_count").html(return_gold_count);
$("#return_silver_count").html(return_silver_count);
$("#return_gold_weight").html(return_gold_weight);
$("#return_silver_weight").html(return_silver_weight);
$("#return_gold_amount").html(return_gold_amount);
$("#return_silver_amount").html(return_silver_amount);


$("#return_count_1").val(return_count);
$("#return_amount_1").val(return_amount);
$("#return_gold_count_1").val(return_gold_count);
$("#return_silver_count_1").val(return_silver_count);
$("#return_gold_weight_1").val(return_gold_weight);
$("#return_silver_weight_1").val(return_silver_weight);
$("#return_gold_amount_1").val(return_gold_amount);
$("#return_silver_amount_1").val(return_silver_amount);

}
else{
for(i=1;i<=count;i++){
$('#checkbox'+i).prop('checked', false);
}
$("#return_count").html(0);
$("#return_amount").html(0);
$("#return_amount1").html(0);
$("#return_gold_count").html(0);
$("#return_silver_count").html(0);
$("#return_gold_weight").html(0);
$("#return_silver_weight").html(0);
$("#return_gold_amount").html(0);
$("#return_silver_amount").html(0);


$("#return_count_1").val(0);
$("#return_amount_1").val(0);
$("#return_gold_count_1").val(0);
$("#return_silver_count_1").val(0);
$("#return_gold_weight_1").val(0);
$("#return_silver_weight_1").val(0);
$("#return_gold_amount_1").val(0);
$("#return_silver_amount_1").val(0);

}
var sales_gold_amount=$('#sales_gold_amount_1').val();
var sales_silver_amount=$('#sales_silver_amount_1').val();
var oge_amount=$('#oge_total_1').val();
var calc_retun_amount=$('#return_amount_1').val();
var balance_value=$('#sales_net_payable2').val();

var sales_amount=parseFloat(sales_gold_amount)+parseFloat(sales_silver_amount);
var replace_value=parseFloat(sales_amount)-parseFloat(oge_amount);
var return_value=parseFloat(calc_retun_amount)-parseFloat(replace_value);
var return_payment=parseFloat(balance_value)-parseFloat(return_value);
$("#calc_sales_value").html(sales_amount);
$("#calc_exchange_value").html(oge_amount);
$("#calc_replace_value").html(replace_value);
$("#calc_replace_value1").html(replace_value);
$("#calc_return_value").html(calc_retun_amount);
$("#calc_return_value1").html(return_value);
$("#calc_return_value2").html(return_value);
$("#calc_payment_value").html(return_payment);

$("#return_net_payable").html(Math.abs(return_payment));
$("#return_net_payable1").html(Math.abs(return_payment));
$("#return_net_payable_1").val(Math.abs(return_payment));

if(parseInt(return_payment)>0){
	var pfp = document.getElementById("paid_from_party");
pfp.style.display= "block";
var pfc = document.getElementById("paid_from_company");
pfc.style.display = "none";
}
else{
	var pfp = document.getElementById("paid_from_party");
pfp.style.display= "none";
	var pfc = document.getElementById("paid_from_company");
pfc.style.display = "block";

}

}
</script>

<script>

function select_all2(){


var count=$('.count_checkbox1').length;
// alert(count);

var return_count=0;
var return_amount=0;
var return_gold_count=0;
var return_silver_count=0;
var return_gold_weight=0;
var return_silver_weight=0;
var return_gold_amount=0;
var return_silver_amount=0;

for(i=1;i<=count;i++){
// $('#checkbox'+i).prop('checked', true);
var select_checkbox = document.getElementById('checkbox'+i);
if(select_checkbox.checked){
var return_type=$('#already_sale_type'+i).val();
var return_weight=$('#already_sale_weight'+i).val();
var return_amount_val=$('#already_sale_amount'+i).val();
// alert(return_amount);
if(return_type=='1'){
	return_gold_count+=1;
	return_gold_weight+=parseFloat(return_weight);
	return_gold_amount+=parseFloat(return_amount_val);

}
else{
	return_silver_count+=1;
	return_silver_weight+=parseFloat(return_weight);
	return_silver_amount+=parseFloat(return_amount_val);
}
return_count+=1;
return_amount+=parseFloat(return_amount_val);
}
}
$("#return_count").html(return_count);
$("#return_amount").html(return_amount);
$("#return_amount1").html(return_amount);
$("#return_gold_count").html(return_gold_count);
$("#return_silver_count").html(return_silver_count);
$("#return_gold_weight").html(return_gold_weight);
$("#return_silver_weight").html(return_silver_weight);
$("#return_gold_amount").html(return_gold_amount);
$("#return_silver_amount").html(return_silver_amount);


$("#return_count_1").val(return_count);
$("#return_amount_1").val(return_amount);
$("#return_gold_count_1").val(return_gold_count);
$("#return_silver_count_1").val(return_silver_count);
$("#return_gold_weight_1").val(return_gold_weight);
$("#return_silver_weight_1").val(return_silver_weight);
$("#return_gold_amount_1").val(return_gold_amount);
$("#return_silver_amount_1").val(return_silver_amount);




var sales_gold_amount=$('#sales_gold_amount_1').val();
var sales_silver_amount=$('#sales_silver_amount_1').val();
var oge_amount=$('#oge_total_1').val();
var calc_retun_amount=$('#return_amount_1').val();
var balance_value=$('#sales_net_payable2').val();

var sales_amount=parseFloat(sales_gold_amount)+parseFloat(sales_silver_amount);
var replace_value=parseFloat(sales_amount)-parseFloat(oge_amount);
var return_value=parseFloat(calc_retun_amount)-parseFloat(replace_value);
var return_payment=parseFloat(balance_value)-parseFloat(return_value);
$("#calc_sales_value").html(sales_amount);
$("#calc_exchange_value").html(oge_amount);
$("#calc_replace_value").html(replace_value);
$("#calc_replace_value1").html(replace_value);
$("#calc_return_value").html(calc_retun_amount);
$("#calc_return_value1").html(return_value);
$("#calc_return_value2").html(return_value);
$("#calc_payment_value").html(return_payment);

$("#return_net_payable").html(Math.abs(return_payment));
$("#return_net_payable1").html(Math.abs(return_payment));

$("#return_net_payable_1").val(Math.abs(return_payment));


if(parseInt(return_payment)>0){
	var pfp = document.getElementById("paid_from_party");
pfp.style.display= "block";
var pfc = document.getElementById("paid_from_company");
pfc.style.display = "none";
$("#paid_from").val(Math.abs('Company'));
}
else{
	var pfp = document.getElementById("paid_from_party");
pfp.style.display= "none";
	var pfc = document.getElementById("paid_from_company");
pfc.style.display = "block";
$("#paid_from").val(Math.abs('Party'));

}

}
</script>

		<script>
var baseurl = $("#baseurl").val();

$("#party_sales").autocomplete({ 
	// alert(baseurl);
	                valueKey:'title',
					
	                source:[{
	                url:baseurl+'Sales_return/idList?query=%QUERY%',
	                type:'remote',
	                ajax:{
	                  dataType : 'json',
	                }
	            }]}).on('selected.xdsoft',function(e,suggestion,ui){ 
					// alert(id); 
	                // $("#party_sales").val(suggestion.id);
					$("#first_name").html(suggestion.firstname);
					$("#first_name_id_hidden").val(suggestion.id);
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
					$("#calc_balance_value").html(suggestion.sales_balance_amount);
				

					$("#sales_net_payable2").val(suggestion.sales_balance_amount);
					
					$('#pre_sales_gold_count').html(suggestion.sales_gold_count);
					$('#pre_sales_silver_count').html(suggestion.sales_silver_count);
					$('#pre_sales_gold_weight').html(suggestion.sales_gold_weight);
					$('#pre_sales_silver_weight').html(suggestion.sales_silver_weight);
					$('#pre_sales_gold_amount').html(suggestion.sales_gold_amount);
					$('#pre_sales_silver_amount').html(suggestion.sales_silver_amount);

					$('#pre_sales_amount').html(parseFloat(suggestion.sales_silver_amount) + parseFloat(suggestion.sales_gold_amount) );

					$("#sales_row").empty().append(suggestion.sales_row);
					var count=$('.count_checkbox').length;
					
					for(i=1;i<=count;i++){
						var sid=$('#sid'+i).val();
					td=	'<label class="form-check form-check-solid is-invalid mt-4"><input class="form-check-input count_checkbox1" type="checkbox" name="checkbox[]" id="checkbox'+i+'" onclick="select_all2()" value="'+sid+'"></label>'
					$('#td'+i).empty().append(td);
				}
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
			// Refund Checkbox start
				var refund_radio = document.getElementById("refund_radio");
				var paymt_fm_cmy = document.getElementById("paymt_fm_cmy");
				var cash_fm_cmy = document.getElementById("cash_fm_cmy");
				var cheque_fm_cmy = document.getElementById("cheque_fm_cmy");
				var rtgs_fm_cmy = document.getElementById("rtgs_fm_cmy");
				var upi_fm_cmy = document.getElementById("upi_fm_cmy");
			// Refund Checkbox end

			// Refund Checkbox - Cash Checkbox start
				var cash_paid_from_company_add_radio = document.getElementById("cash_paid_from_company_add_radio");
				var cash_paid_from_cmy_label = document.getElementById("cash_paid_from_cmy_label");
				var cash_paid_from_cmy_tbox = document.getElementById("cash_paid_from_cmy_tbox");
				var cash_detail_paid_from_cmy_tbox = document.getElementById("cash_detail_paid_from_cmy_tbox");
			// Refund Checkbox - Cash Checkbox end

			// Refund Checkbox - Cheque Checkbox start
				var cheque_paid_from_company_add_radio = document.getElementById("cheque_paid_from_company_add_radio");
				var cheque_paid_from_cmy = document.getElementById("cheque_paid_from_cmy");
				var cheque_amt_paid_from_cmy_tbox = document.getElementById("cheque_amt_paid_from_cmy_tbox");
				var cheque_no_paid_from_cmy_tbox = document.getElementById("cheque_no_paid_from_cmy_tbox");
				var cheque_com_bank_paid_from_cmy_tbox = document.getElementById("cheque_com_bank_paid_from_cmy_tbox");
				var cheque_par_bank_paid_from_cmy_tbox = document.getElementById("cheque_par_bank_paid_from_cmy_tbox");
				var cheque_detail_paid_from_cmy_tbox = document.getElementById("cheque_detail_paid_from_cmy_tbox");
			// Refund Checkbox - Cheque Checkbox end

			// Refund Checkbox - RTGS Checkbox start
				var rtgs_paid_from_company_add_radio = document.getElementById("rtgs_paid_from_company_add_radio");
				var rtgs_paid_from_cmy = document.getElementById("rtgs_paid_from_cmy");
				var rtgs_amt_paid_from_cmy_tbox = document.getElementById("rtgs_amt_paid_from_cmy_tbox");
				var rtgs_ref_paid_from_cmy_tbox = document.getElementById("rtgs_ref_paid_from_cmy_tbox");
				var rtgs_com_bank_paid_from_cmy_tbox = document.getElementById("rtgs_com_bank_paid_from_cmy_tbox");
				var rtgs_par_bank_paid_from_cmy_tbox = document.getElementById("rtgs_par_bank_paid_from_cmy_tbox");
				var rtgs_detail_paid_from_cmy_tbox = document.getElementById("rtgs_detail_paid_from_cmy_tbox");
			// Refund Checkbox - RTGS Checkbox end

			// Refund Checkbox - UPI Checkbox start
				var upi_paid_from_company_add_radio = document.getElementById("upi_paid_from_company_add_radio");
				var upi_paid_from_cmy = document.getElementById("upi_paid_from_cmy");
				var upi_amt_paid_from_cmy_tbox = document.getElementById("upi_amt_paid_from_cmy_tbox");
				var upi_ref_paid_from_cmy_tbox = document.getElementById("upi_ref_paid_from_cmy_tbox");
				var upi_com_bank_paid_from_cmy_tbox = document.getElementById("upi_com_bank_paid_from_cmy_tbox");
				var upi_par_bank_paid_from_cmy_tbox = document.getElementById("upi_par_bank_paid_from_cmy_tbox");
				var upi_detail_paid_from_cmy_tbox = document.getElementById("upi_detail_paid_from_cmy_tbox");
			// Refund Checkbox - UPI Checkbox end

					function rfund_radio()
					{
						if (refund_radio.checked) 
						{
							paymt_fm_cmy.style.display = "block";
							cash_fm_cmy.style.display = "block";
							cheque_fm_cmy.style.display = "block";
							rtgs_fm_cmy.style.display = "block";
							upi_fm_cmy.style.display = "block";
						}
						else
						{
							paymt_fm_cmy.style.display = "none";
							cash_fm_cmy.style.display = "none";
							cheque_fm_cmy.style.display = "none";
							rtgs_fm_cmy.style.display = "none";
							upi_fm_cmy.style.display = "none";

							cash_paid_from_company_add_radio.checked = false;
							cheque_paid_from_company_add_radio.checked = false;
							rtgs_paid_from_company_add_radio.checked = false;
							upi_paid_from_company_add_radio.checked = false;

							cash_paid_from_cmy_label.style.display = "none";
				  		cash_paid_from_cmy_tbox.style.display = "none";
				  		cash_detail_paid_from_cmy_tbox.style.display = "none";

				  		cheque_paid_from_cmy.style.display = "none";
					    cheque_amt_paid_from_cmy_tbox.style.display = "none";
					    cheque_no_paid_from_cmy_tbox.style.display = "none";
					    cheque_com_bank_paid_from_cmy_tbox.style.display = "none";
					    cheque_par_bank_paid_from_cmy_tbox.style.display = "none";
					    cheque_detail_paid_from_cmy_tbox.style.display = "none";

					    rtgs_paid_from_cmy.style.display = "none";
					    rtgs_amt_paid_from_cmy_tbox.style.display = "none";
					   	rtgs_ref_paid_from_cmy_tbox.style.display = "none";
					    rtgs_com_bank_paid_from_cmy_tbox.style.display = "none";
					    rtgs_par_bank_paid_from_cmy_tbox.style.display = "none";
					    rtgs_detail_paid_from_cmy_tbox.style.display = "none";

					    upi_paid_from_cmy.style.display = "none";
					    upi_amt_paid_from_cmy_tbox.style.display = "none";
					    upi_ref_paid_from_cmy_tbox.style.display = "none";
					    upi_com_bank_paid_from_cmy_tbox.style.display = "none";
					    upi_par_bank_paid_from_cmy_tbox.style.display = "none";
					    upi_detail_paid_from_cmy_tbox.style.display = "none";
						}
					};

					// Payment from Company Start
					function cash_pdfrm_cmy_add_radio()
					{
						if (cash_paid_from_company_add_radio.checked)
						{
						    cash_paid_from_cmy_label.style.display = "block";
						    cash_paid_from_cmy_tbox.style.display = "block";
						    cash_detail_paid_from_cmy_tbox.style.display = "block";
					  	} else 
					  	{
					  		cash_paid_from_cmy_label.style.display = "none";
					  		cash_paid_from_cmy_tbox.style.display = "none";
					  		cash_detail_paid_from_cmy_tbox.style.display = "none";
					  	}
					};

					function cheque_pdfrm_cmy_add_radio()
					{
						if (cheque_paid_from_company_add_radio.checked)
						{
						    cheque_paid_from_cmy.style.display = "block";
						    cheque_amt_paid_from_cmy_tbox.style.display = "block";
						    cheque_no_paid_from_cmy_tbox.style.display = "block";
						    cheque_com_bank_paid_from_cmy_tbox.style.display = "block";
						    cheque_par_bank_paid_from_cmy_tbox.style.display = "block";
						    cheque_detail_paid_from_cmy_tbox.style.display = "block";
					  	} else 
					  	{
					     	cheque_paid_from_cmy.style.display = "none";
						    cheque_amt_paid_from_cmy_tbox.style.display = "none";
						    cheque_no_paid_from_cmy_tbox.style.display = "none";
						    cheque_com_bank_paid_from_cmy_tbox.style.display = "none";
						    cheque_par_bank_paid_from_cmy_tbox.style.display = "none";
						    cheque_detail_paid_from_cmy_tbox.style.display = "none";
					  	}
					};

					function rtgs_pdfrm_cmy_add_radio()
					{
						if (rtgs_paid_from_company_add_radio.checked == true)
						{
						    rtgs_paid_from_cmy.style.display = "block";
						    rtgs_amt_paid_from_cmy_tbox.style.display = "block";
						    rtgs_ref_paid_from_cmy_tbox.style.display = "block";
						    rtgs_com_bank_paid_from_cmy_tbox.style.display = "block";
						    rtgs_par_bank_paid_from_cmy_tbox.style.display = "block";
						    rtgs_detail_paid_from_cmy_tbox.style.display = "block";
					  	} else 
					  	{
					     	rtgs_paid_from_cmy.style.display = "none";
						    rtgs_amt_paid_from_cmy_tbox.style.display = "none";
						   	rtgs_ref_paid_from_cmy_tbox.style.display = "none";
						    rtgs_com_bank_paid_from_cmy_tbox.style.display = "none";
						    rtgs_par_bank_paid_from_cmy_tbox.style.display = "none";
						    rtgs_detail_paid_from_cmy_tbox.style.display = "none";
					  	}
					};

					function upi_pdfrm_cmy_add_radio()
					{
						if (upi_paid_from_company_add_radio.checked == true)
						{
						    upi_paid_from_cmy.style.display = "block";
						    upi_amt_paid_from_cmy_tbox.style.display = "block";
						    upi_ref_paid_from_cmy_tbox.style.display = "block";
						    upi_com_bank_paid_from_cmy_tbox.style.display = "block";
						    upi_par_bank_paid_from_cmy_tbox.style.display = "block";
						    upi_detail_paid_from_cmy_tbox.style.display = "block";
					  	} else 
					  	{
					     	upi_paid_from_cmy.style.display = "none";
						    upi_amt_paid_from_cmy_tbox.style.display = "none";
						    upi_ref_paid_from_cmy_tbox.style.display = "none";
						    upi_com_bank_paid_from_cmy_tbox.style.display = "none";
						    upi_par_bank_paid_from_cmy_tbox.style.display = "none";
						    upi_detail_paid_from_cmy_tbox.style.display = "none";
					  	}
					};
					// Payment from Company End

					function cr_chit_radio()
					{
						var chit_radio = document.getElementById("chit_radio");
						var cr_chit_label = document.getElementById("cr_chit_label");
						var chit_dd_lebel = document.getElementById("chit_dd_lebel");
						var chit_dd_tbox = document.getElementById("chit_dd_tbox");


						if (chit_radio.checked)
						{
						    cr_chit_label.style.display = "block";
						    chit_dd_lebel.style.display = "block";
						    chit_dd_tbox.style.display = "block";
					  	} else 
					  	{
					     	cr_chit_label.style.display = "none";
					     	chit_dd_lebel.style.display = "none";
						    chit_dd_tbox.style.display = "none";
					  	}
					};
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
			function chit_dropdown()
			{
				var chit_cr_check_tbox = document.getElementById("chit_cr_check_tbox").value;
				alert(chit_cr_check_tbox);
				 if (chit_cr_check_tbox=="1" || chit_cr_check_tbox=="2" || chit_cr_check_tbox=="3") 
				  {
				  	$("#chit_pay_amt_label").show();
				  	$("#chit_pay_amt_tbox").show();
				  	$("#chit_balance_label").show();
				  	$("#chit_balance_tbox").show();
				  }
				  else
				  {
				  	$("#chit_pay_amt_label").hide();
				  	$("#chit_pay_amt_tbox").hide();
				  	$("#chit_balance_label").hide();
				  	$("#chit_balance_tbox").hide();
				  }
			};
		</script>

<script>
	$("#add_salesreturn_table").DataTable({
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
	$('#add_salesreturn_table').wrap('<div class="dataTables_scroll" />');
</script>
<script>
	
	$("#add_return_oldjewel_entry_table").DataTable({
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
	$('#add_return_oldjewel_entry_table').wrap('<div class="dataTables_scroll" />');
</script>

<script>
	$("#add_return_tag_entry_table").DataTable({
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
	$('#add_return_tag_entry_table').wrap('<div class="dataTables_scroll" />');
</script>
<script>
	$("#add_return_nontag_entry_table").DataTable({
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
	$('#add_return_nontag_entry_table').wrap('<div class="dataTables_scroll" />');
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