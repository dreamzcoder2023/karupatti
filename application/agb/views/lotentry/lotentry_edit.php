<?php $this->load->view("common");?>
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
									<h1 class="d-flex align-items-center text-dark fw-bold my-1 fs-3">New Lot Entry
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
											<form method="POST" autocomplete="off" action="<?php echo base_url(); ?>Lotentry/lotentry_save" enctype="multipart/form-data" onsubmit="purchase_entry_validation();">
											<!--begin::Heading-->
										
											<!--end::Heading-->
											<!-- <div class="row">
												<div class="col-lg-6"></div>
												<label class="col-lg-1 col-form-label fw-semibold fs-6">Cr</label>
											</div> -->
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
														<input class="form-control form-control-solid ps-12" name="date" placeholder="Date" id="kt_daterangepicker_lot_entry_add_date" value="<?php echo $lotentry->lot_date; ?>"/>
													</div>
													<div class="fv-plugins-message-container invalid-feedback" id="date_err"></div>
												</div>
												<label class="col-lg-1 col-form-label required fw-semibold fs-6">Supplier</label>
												<!--begin::Left Section-->
												<div class="col-lg-3 fv-row">
												<!--begin::Select-->
													<select class="form-select form-select-solid" data-control="select2" name="supplier_list_newpurchase"  id="supplier_list_newpurchase" data-hide-search="true">
														<option value="">Select</option>
														<?php foreach($suppliers_list as $supplierslist)
														{?>
														<option value="<?php echo $supplierslist['LEDGER_NAME'] ;?>" <?php if($lotentry->supplier==$supplierslist['LEDGER_NAME']){ echo "selected" ;} ?> ><?php echo $supplierslist['LEDGER_NAME'].'-'.$supplierslist['OP_SIDE'].'-'.$supplierslist['OP_BALANCE'];?></option><?php
														 }?>
													</select>
													<!--end::Select-->
													<div class="fv-plugins-message-container invalid-feedback" id="supplier_list_err"></div>
												</div>
												<!--end::Left Section-->
													<!-- <div class="col-lg-1 fv-row fv-plugins-icon-container">
														<input type="text" name="" class="form-control form-control-lg form-control-solid" placeholder="" value = "10000" style="background-color: lightgreen;">
														<div class="fv-plugins-message-container invalid-feedback"></div>
													</div> -->
												<label class="col-lg-1 col-form-label required fw-semibold fs-6">Metal</label>
												<div class="col-lg-2 fv-row">
													<select class="form-select form-select-solid" name="metal_new_purchase" data-control="select2" data-hide-search="true" id="item_type" onchange="itm_ty();">
														<option value="">Select Type</option>
														<option value="Gold" <?php if($lotentry->metal_type=="Gold"){ echo "selected"; }  ?>>Gold</option>
														<option value="Silver" <?php if($lotentry->metal_type=="Silver"){ echo "selected"; }  ?> >Silver</option>
													</select>
												</div>

												<!-- <div class="col-lg-1 fv-row fv-plugins-icon-container fv-plugins-bootstrap5-row-invalid">
													<div class="d-flex align-items-center mt-1">
														<label class="form-check form-check-inline form-check-solid me-5 is-invalid">
															<input class="form-check-input" name="communication[]" type="checkbox" value="1" id="" onclick="">
														</label>
														<label class="col-form-label fw-semibold fs-6 me-5">RTGS</label>
													</div>
												</div> -->

												<div class="fv-plugins-message-container invalid-feedback" id="metal_type_err"></div>
											</div><br>
											<div class="row">

										<!--	<div class="row">
														<label class="col-lg-1 col-form-label fw-bold fs-6 text-underlined">Curr.Rate  </label>
														<label class="col-lg-1 col-form-label fw-semibold fs-6" name="gold_new_purchase" id="gold_new_purchase">Gold : </label>
														<label class="col-lg-1 col-form-label fw-bold fs-6">4563.00 </label>
														<label class="col-lg-1 col-form-label fw-semibold fs-6" name="silver_new_purchase" id="silver_new_purchase">Silver : </label>
														<label class="col-lg-1 col-form-label fw-bold fs-6">57.53</label>			
												</div>-->
											</div>
											<div class="row mb-6" id="lot_gold" style="display: block;">
												<div class="accordion" id="kt_accordion_1">
												    <div class="accordion-item">
												        <h2 class="accordion-header" id="kt_accordion_1_header_1">
												            <button class="accordion-button fw-semibold fs-6 collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#kt_accordion_1_body_1"  aria-controls="kt_accordion_1_body_1" id="item_select">
												                Gold Items
												            </button>
												        </h2>
												        <div id="kt_accordion_1_body_1" class="accordion-collapse " aria-labelledby="kt_accordion_1_header_1" data-bs-parent="#kt_accordion_1" style="overflow: scroll !important;">
												            <div class="accordion-body" style="height: 300px !important;overflow: show;">
												           	  <table class="table table-striped border rounded table-hover fs-7 gs-2 gy-1" id="add_pur_register_new_entry" >
																    <thead style=" background-color: #A7D3F0 !important;border: 1px solid #606060 !important;color: black !important; text-align: center;">
																        <tr class="fw-bold fs-6 gs-0">
																            <th width="10%" class="min-w-80px cy">Sno</th>
																            <th width="60%" class="min-w-300px">Item Name</th>
																            <th width="10%" class="min-w-175px">Purity</th>
																            <th width="10%" class="min-w-150px">Count</th>
																            <th width="10%" class="min-w-150px">Weight(gms)</th>
																            
																        </tr>
																    </thead>
																    <tbody>
																    <?php

																	$val1=[];
																	$val2=[];
																	$val3=[];

																	$new_purchase_page=[1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20];
																	
															//print_r($repledged_list_view[0]);exit();
															$i=1;		
															foreach ($new_purchase_page as $key => $value) {

																$id="item_name_pur".$i;
																$sb="subitem_name_pur".$i;
																# code...
																//$val1[]=$value['METAL_PURITY'];
																//$val2[]=$value['TOTAL_COUNT'];
																//$val3[]=$value['TOTAL_WEIGHT'];
																
																//print_r($value);
															?>
																<tr style="border: 1px solid #606060;">
														            <td>
														            	<input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex" value="<?php echo $value;?>" readonly >
														            </td>
														            <td>
														            	
															         <input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex autocomplete" name="item_gold[]" id="<?php echo $id;?>" onclick="item_name(event);">


														            </td>
														             <td><input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex" value="" name="gold_purity[]" id="gold_purity">
														            </td>
														            <td><input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex" value="" name="gold_count[]" onkeyup="gold_calculate()" id="gold_count<?php echo $i;?>">
														            </td>
														            <td><input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex" value="" name="gold_weight[]" onkeyup="gold_calculate()" id="gold_weight<?php echo $i;?>">
														            </td>  
																    </tr>
																    
																     <?php 
																     $i++;
																 } ?>

																     </tbody>
																
																     <tfoot style="border:1px solid #606060">
																     	<td></td>
																     	<td></td>
																     	<td></td>
																     	<td></td>
																     	<!--<td class="btn btn-primary pt-3 py-3 fw-semibold fs-6" name="gold_calculate" id="gold_calculate" onclick="gold_calculate()">Calculate</td>-->
																		<td></td>

																     </tfoot>
																</table>
															<!-- 	  <div class="row">
																		<div class="col-lg-10"></div>
																		
																		<div class="col-lg-2">
																			<div class="d-flex flex-center flex-row-fluid pt-12">
																				<P class="btn btn-primary"  name="gold_calculate" id="gold_calculate" onclick="gold_calculate()">Calculator</P>
																			</div>
																		</div>
																	</div> -->
																	<br>
												            </div>
												        </div>
												    </div>
												</div>
											</div><br>
											<!-- <div class="row mb-6" id="lot_silver" style="display: none;">
												<div class="accordion" id="kt_accordion_1">
												    <div class="accordion-item">
												        <h2 class="accordion-header" id="kt_accordion_1_header_2">
												            <button class="accordion-button fw-semibold fs-6 collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#kt_accordion_1_body_2" aria-expanded="false" aria-controls="kt_accordion_1_body_2">
												          Silver Items
												            </button>
												        </h2>
												        <div id="kt_accordion_1_body_2" class="accordion-collapse collapse" aria-labelledby="kt_accordion_1_header_2" data-bs-parent="#kt_accordion_1_header_2" style="overflow: scroll !important;">
												            <div class="accordion-body" style="height: 300px !important;overflow: show;">
												               <table class="table table-striped border rounded table-hover fs-7 gs-2 gy-1" id="add_pur_register_new_entry_silver">
																    <thead style=" background-color: #A7D3F0 !important;border: 1px solid #606060 !important;color: black !important; text-align: center;">
																        <tr class="fw-bold fs-6 gs-0">
																            <th class="min-w-125px cy">Sno</th>
																            <th class="min-w-150px">Item Name</th>
																            <th class="min-w-200px">Subitem Name</th>
																            <th class="min-w-125px">Purity</th>
																            <th class="min-w-100px">Count</th>
																            <th class="min-w-100px">Weight</th>
																            
																        </tr>
																    </thead>
																    <tbody>
																    <?php

																	$val1=[];
																	$val2=[];
																	$val3=[];

																	$new_purchase_page=[1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20];
																	
															//print_r($repledged_list_view[0]);exit();
															$i=1;		
															foreach ($new_purchase_page as $key => $value) {
																# code...
																//$val1[]=$value['METAL_PURITY'];
																//$val2[]=$value['TOTAL_COUNT'];
																//$val3[]=$value['TOTAL_WEIGHT'];
																
																//print_r($value);
															?>
																<tr>
														            <td>
														            	<input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex" value="<?php echo $value;?>" readonly >
														            </td>
														            <td>
														            	
															         <input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex" name="item_gold[]" id="item_name_pur">
														            </td>
														            <td><input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex" name="subitem_gold[]" id="subitem_name_pur">
														            </td>
														             <td><input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex" value="" name="gold_purity[]" id="gold_purity">
														            </td>
														            <td><input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex" value="" name="gold_count[]" id="gold_count<?php echo $i;?>">
														            </td>
														            <td><input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex" value="" name="gold_weight[]" id="gold_weight<?php echo $i;?>">
														            </td>  
																    </tr>
																    
																     <?php 
																     $i++;
																 } ?>

																     </tbody>
																</table>
																  <div class="row">
																		<div class="col-lg-10"></div>
																		
																		<div class="col-lg-2">
																			<div class="d-flex flex-center flex-row-fluid pt-12">
																				<P class="btn btn-primary"  name="gold_calculate" id="gold_calculate" onclick="gold_calculate()">Calculator</P>
																			</div>
																		</div>
																	</div>
																	
																	<br>
												            </div>
												        </div>
												    </div>
												</div>
											</div> -->
<!--											<div class="row pull-right">
											<div class="col-lg-12  ">
											<span class="btn btn-primary pt-3 py-3 fw-semibold fs-6 " name="gold_calculate" id="gold_calculate" onclick="gold_calculate()" style="padding-bottom: 5px;">Calculate</span>
											</div></div>-->
											<div style="padding: 5px 5px 5px 5px !important;box-shadow: 0 3px 6px #00002947;border-radius: 5px;background-color: #f5f5f1;">
												<!--<label class="col-form-label fw-bold fs-6">Total Calculation</label>-->
												<div class="row">
												<label class="col-lg-8 col-form-label fw-semibold fs-6"></label>
												<!--	<div class="col-lg-1 fv-row fv-plugins-icon-container">
														<input type="text" name="amount_pay" id="amount_pay" class="form-control form-control-lg form-control-solid" placeholder="Amount" >
														<div class="fv-plugins-message-container invalid-feedback"></div>
													</div>-->

													<label class="col-lg-1 col-form-label fw-semibold fs-6 "> Count</label>
													<div class="col-lg-1 fv-row fv-plugins-icon-container">
														<input type="text" name="total_count" id="total_count" class="form-control form-control-lg form-control-solid" placeholder="Count" value="0">
														<div class="fv-plugins-message-container invalid-feedback"></div>
													</div>
													<label class="col-lg-1 col-form-label fw-semibold fs-6"> Weight</label>
													<div class="col-lg-1 fv-row fv-plugins-icon-container">
														<input type="text" name="total_weight" id="total_weight" class="form-control form-control-lg form-control-solid" placeholder="Weight" value="0">
														<div class="fv-plugins-message-container invalid-feedback"></div>
													</div>
													
																								</div>
											</div><br>
											<div style="padding: 5px 5px 5px 5px !important;box-shadow: 0 3px 6px #00002947;border-radius: 5px;background-color: #f5f5f1;">
												<label class="col-form-label fw-bold fs-6">Payment Details</label>
												<div class="row">
                                                <label class="col-lg-1 col-form-label fw-semibold fs-6">Amount</label>
													<div class="col-lg-2 fv-row fv-plugins-icon-container">
														<input type="text" name="t_amount" id="t_amount" class="form-control form-control-lg form-control-solid" placeholder="charges" value="0" >
														<div class="fv-plugins-message-container invalid-feedback"></div>
													</div>  
													<label class="col-lg-1 col-form-label fw-semibold fs-6">charges</label>
													<div class="col-lg-2 fv-row fv-plugins-icon-container">
														<input type="text" name="other_charges" id="other_charges" class="form-control form-control-lg form-control-solid" placeholder="charges" value="0" >
														<div class="fv-plugins-message-container invalid-feedback"></div>
													</div>
													<label class="col-lg-1 col-form-label fw-semibold fs-6">Amt Pay</label>
													<div class="col-lg-2 fv-row fv-plugins-icon-container">
														<input type="text" name="amount_pay" id="amount_pay" class="form-control form-control-lg form-control-solid" placeholder="charges" value="0" >
														<div class="fv-plugins-message-container invalid-feedback"></div>
													</div>

                                                </div>
												
												<div class="row">
													<label class="col-lg-1 col-form-label fw-semibold fs-6" id="cash_lt_ey_label">Cash</label>
													<div class="col-lg-2 fv-row fv-plugins-icon-container" id="cash_lt_ey_tbox">
														<input type="text" class="form-control form-control-lg form-control-solid" name="cash_pay" id="cash_pay" placeholder="Cash Amount" value="0">

														<!-- oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" -->
														<div class="fv-plugins-message-container invalid-feedback"></div>
													</div>
												</div>
												<div class="row">
													<label class="col-lg-1 col-form-label fw-semibold fs-6" id="cheque_lt_ey_label">Cheque</label>
													<div class="col-lg-2 fv-row fv-plugins-icon-container" id="cheque_lt_ey_tbox" >
														<input type="text" name="cheq_pay" id="cheq_pay" class="form-control form-control-lg form-control-solid" placeholder="Cheque Amount" value="0" oninput="this.value = this.value.replace(/[^A-Za-z/0-9.]/g, '').replace(/(\..*)\./g, '$1');">
														<div class="fv-plugins-message-container invalid-feedback"></div>
													</div>
													<label class="col-lg-1 col-form-label fw-semibold fs-6" id="bank_lt_ey_label">Bank</label>
													<div class="col-lg-2 fv-row fv-plugins-icon-container" id="bank_lt_ey_tbox" >
														<select class="form-select form-select-solid" data-control="select2" name="bank_cheq" id="bank_cheq">	
														
														<option value="">Select Bank</option>
														<?php foreach($banks_list as $bankslist)
														{?>
														<option value="<?php echo $bankslist['BANKNAME'] ;?>"><?php echo $bankslist['BANKNAME'];?></option><?php
														 }?>
														</select>
													</div>
													<label class="col-lg-1 col-form-label fw-semibold fs-6" id="cheque_lt_ey_label">Cheq.no</label>
													<div class="col-lg-2 fv-row fv-plugins-icon-container" id="cheque_lt_ey_tbox" >
														<input type="text" name="cheq_no" id="cheq_no" class="form-control form-control-lg form-control-solid" placeholder="Cheque Number" oninput="this.value = this.value.replace(/[^A-Za-z/0-9.]/g, '').replace(/(\..*)\./g, '$1');">
														<div class="fv-plugins-message-container invalid-feedback"></div>
													</div>
												</div>
												<div class="row">
													<label class="col-lg-1 col-form-label fw-semibold fs-6" id="rtgs_lt_ey_label">RTGS</label>
													<div class="col-lg-2 fv-row fv-plugins-icon-container" id="rtgs_lt_ey_tbox">
														<input type="text" name="rtgs_pay" id="rtgs_pay" class="form-control form-control-lg form-control-solid" placeholder="RTGS Amount" oninput="this.value = this.value.replace(/[^A-Za-z/0-9.]/g, '').replace(/(\..*)\./g, '$1');" value="0">
														<div class="fv-plugins-message-container invalid-feedback"></div>
													</div>
													<label class="col-lg-1 col-form-label fw-semibold fs-6" id="bank_lt_ey_label">Bank</label>
													<div class="col-lg-2 fv-row fv-plugins-icon-container" id="bank_lt_ey_tbox" >
														<select class="form-select form-select-solid" data-control="select2"  name="bank_rtgs" id="bank_rtgs">	
														
														<option value="">Select Bank</option>
														<?php foreach($banks_list as $bankslist)
														{?>
														<option value="<?php echo $bankslist['BANKNAME'] ;?>"><?php echo $bankslist['BANKNAME'];?></option><?php
														 }?>
														</select>
													</div>
													<label class="col-lg-1 col-form-label fw-semibold fs-6" id="bank_lt_ey_label">RTGS No</label>
													<div class="col-lg-2 fv-row fv-plugins-icon-container" id="rtgs_lt_ey_tbox">
														<input type="text" name="rtgs_trans" id="rtgs_trans" class="form-control form-control-lg form-control-solid" placeholder="RTGS Trans No" oninput="this.value = this.value.replace(/[^A-Za-z/0-9.]/g, '').replace(/(\..*)\./g, '$1');">
														<div class="fv-plugins-message-container invalid-feedback"></div>
													</div>
												</div>
												<div class="row">
													<label class="col-lg-1 col-form-label fw-semibold fs-6" id="metal_lt_ey_label">Metal</label>
													<div class="col-lg-2 fv-row fv-plugins-icon-container" id="metal_lt_ey_tbox">
														<input type="text" name="" class="form-control form-control-lg form-control-solid" placeholder="Metal" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
														<div class="fv-plugins-message-container invalid-feedback"></div>
													</div> 
													
                                                    <label class="col-lg-1 col-form-label fw-semibold fs-6" id="purity_lt_ey_label"> Purity</label>
													<div class="col-lg-2 fv-row fv-plugins-icon-container" id="purity_lt_ey_tbox">
														<input type="text" name="purity_pay" id="purity_pay" class="form-control form-control-lg form-control-solid" placeholder="Metal Purity" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
														<div class="fv-plugins-message-container invalid-feedback"></div>
													</div>
													<label class="col-lg-1 col-form-label fw-semibold fs-6" id="rate_lt_ey_label">Wgt(gms)</label>
													<div class="col-lg-2 fv-row fv-plugins-icon-container" id="rate_lt_ey_tbox">
														<input type="text" name="rate_pay" id="rate_pay" class="form-control form-control-lg form-control-solid" placeholder="Metal Rate" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
														<div class="fv-plugins-message-container invalid-feedback"></div>
													</div>
													<label class="col-lg-1 col-form-label fw-semibold fs-6" id="mtamt_lt_ey_label" >Metal Amt</label>
													<div class="col-lg-2 fv-row fv-plugins-icon-container" id="mtamt_lt_ey_tbox" >
														<input type="text" name="metal_pay" id="metal_pay" class="form-control form-control-lg form-control-solid" placeholder="Metal Amount" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
														<div class="fv-plugins-message-container invalid-feedback"></div>
													</div>
												</div>
												<div class="row">
													<label class="col-lg-2 col-form-label required fw-semibold fs-6">Total Amt :</label>
													<label class="col-lg-1 col-form-label fw-bold fs-2" id="total_amount">0.00</label>

													<input type="hidden" id="total_amount1" name="total_amount">
													<label class="col-lg-2 col-form-label fw-semibold fs-6">Paid Amount :</label>
													<label class="col-lg-1 col-form-label fw-bold fs-2" id="paid_amount_pay">0.00</label>
													<input type="hidden" id="paid_amount_pay1" name="paid_amount_pay">
													<label class="col-lg-2 col-form-label fw-semibold fs-6">Balance Amount :</label>
													<label class="col-lg-1 col-form-label fw-bold fs-2" id="bal_amount">0.00</label>
													<input type="hidden" id="bal_amount1" name="bal_amount" >

												</div>
											</div>
												
												<!-- <div class="row">
													<label class="col-lg-2 col-form-label required fw-semibold fs-6">Attended By</label>
													<label class="col-lg-1 col-form-label fw-semibold fs-6">Esakki</label>
											
												</div> -->


												<div class="row">
													<div class="col-lg-9"></div>
													<div class="col-lg-1">
														<div class="d-flex flex-center flex-row-fluid pt-12">
															<button type="reset" class="btn btn-secondary me-3" data-bs-dismiss="modal">Cancel</button>
														</div>
													</div>
													<div class="col-lg-2">
														<div class="d-flex flex-center flex-row-fluid pt-12">
															<button type="submit" class="btn btn-primary" id="save_changes_add_product">Save Changes</button>
														</div>
													</div>
												</div>
											<!--end::Actions-->

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
		<input type="hidden" id="baseurl" value="<?php echo base_url();?>">
		<?php $this->load->view("script");?>

<!-- <script src="js/products-list.js"></script> -->
		<script>
			function itm_ty()
			{
				
				var supplier = document.getElementById("supplier_list_newpurchase").value;

				if(supplier.trim()=='')
				    {
				        
				        $('#supplier_list_err').html('Please select Supplier!');

				    }

				    else

				    {
				    	$('#supplier_list_err').html('');

					}
					var item_type = document.getElementById("item_type").value;
						$('#item_select').html(item_type+' Items');
						var lot_gold = document.getElementById("lot_gold");
						var lot_gold = document.getElementById("lot_gold");
						if (item_type == "") 
						{
							lot_gold.style.display = "none";
							lot_gold.style.display = "none";
						}
						// else if (item_type == "gold") 
						// {
						// 	lot_gold.style.display = "block";
						// 	lot_silver.style.display = "none";
						// }
						else
						{
							lot_gold.style.display = "block";
							//lot_silver.style.display = "block";
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
				else if (item_type_edit == "Gold") 
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
				else if (item_type_view == "Gold") 
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
			$('#kt_docs_repeater_basic_gold_add').repeater({
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
			$('#kt_docs_repeater_basic_silver_edit').repeater({
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
			$('#kt_docs_repeater_basic_gold_edit').repeater({
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
			$('#kt_docs_repeater_basic_silver_view').repeater({
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
			$('#kt_docs_repeater_basic_gold_view').repeater({
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

				$("#kt_daterangepicker_lot_entry_from").flatpickr({
								dateFormat: "d-m-Y",
							});
				$("#kt_daterangepicker_lot_entry_to").flatpickr({
								dateFormat: "d-m-Y",
							});
				$("#kt_daterangepicker_lot_entry_add_date").flatpickr({
								dateFormat: "Y-m-d",
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

<script>
	
	var t_amount = 0;		
	function gold_calculate(){

		//alert("test");

		 var count = [];
		 var weight = [];

		

		 for(let i=1; i<=20; i++){

		 	var variable1 = 'gold_count'+i;
		 	var variable2 = 'gold_weight'+i;
			var value1 = $('#'+variable1).val();
			var value2 = $('#'+variable2).val();

		
		count.push(value1);
		//console.log(count);

		 weight.push(value2);
		// console.log(weight);

		}

		var myArrayNew = count.filter(function (el) {
    	return el != " " && el != "";
  		});
  
        // Getting sum of numbers
        var sum1 = myArrayNew.reduce(function(a, b){
            return parseInt(a)+parseInt(b);
        }, 0);
        

       	var myArray = weight.filter(function (el) {
    	return el != " " && el != "";
  		});
  

        // Getting sum of numbers
        var sum2 = myArray.reduce(function(a, b){
            return parseInt(a)+parseInt(b);
        }, 0);
        
		//alert(count);
		//console.log(count);
		// var t1 = count.reduce(function(a,b){
			
		// 	return parseInt(a)+parseInt(b);


		// },0);
		// var t2 = weight.reduce(function(a,b){

			
		// 	return parseInt(a)+parseInt(b);

		// },0);

		// console.log(t1,t2);

		$('#total_count').val(sum1);
		$('#total_weight').val(sum2);

		var item_val = 0;

		if($('#item_type').val()=='Gold'){

			item_val = 4563;


		}else if($('#item_type').val()=='Silver'){

			item_val = 57;


		}

		//alert(item_val);

		$('#amount_pay').val(sum2*item_val);
		t_amount = sum2*item_val; 
		
	 }
</script>


<script>

	$('#other_charges').on('input',function(event){

		//alert(event.target.value);
		var value = event.target.value;
		var t_amount=$('#t_amount').val();
		$('#amount_pay').val(parseInt(t_amount)+parseInt(value));

	});


	$('#cash_pay').on('input',function(event){


		//alert(event.target.value);
		var value = event.target.value;
		var cheq_pay = $('#cheq_pay').val();
		var rtgs_pay = $('#rtgs_pay').val();
		var amt = $('#amount_pay').val();
		var tot_amt = parseInt(value)+parseInt(cheq_pay)+parseInt(rtgs_pay);
		var bal = amt - tot_amt;

		$('#total_amount').html(amt);
		$('#paid_amount_pay').html(tot_amt);
		$('#bal_amount').html(bal);

		$('#total_amount1').val(amt);
		$('#paid_amount_pay1').val(tot_amt);
		$('#bal_amount1').val(bal);


	});

		$('#cheq_pay').on('input',function(event){


		//alert("test");

		//alert(event.target.value);
		var value = event.target.value;
		var cash_pay = $('#cash_pay').val();
		var rtgs_pay = $('#rtgs_pay').val();
		var amt = $('#amount_pay').val();
		var tot_amt = parseInt(value)+parseInt(cash_pay)+parseInt(rtgs_pay);
		var bal = amt - tot_amt;

		$('#total_amount').html(amt);
		$('#paid_amount_pay').html(tot_amt);
		$('#bal_amount').html(bal);

		$('#total_amount1').val(amt);
		$('#paid_amount_pay1').val(tot_amt);
		$('#bal_amount1').val(bal);


	});

		$('#rtgs_pay').on('input',function(event){

			//alert("test");

		//alert(event.target.value);
		var value = event.target.value;
		var cash_pay = $('#cash_pay').val();
		var cheq_pay = $('#cheq_pay').val();
		var amt = $('#amount_pay').val();
		var tot_amt = parseInt(value)+parseInt(cash_pay)+parseInt(cheq_pay);
		var bal = amt - tot_amt;

		$('#total_amount').html(amt);
		$('#paid_amount_pay').html(tot_amt);
		$('#bal_amount').html(bal);

		$('#total_amount1').val(amt);
		$('#paid_amount_pay1').val(tot_amt);
		$('#bal_amount1').val(bal);


	});
 
</script>

<!-- <script>
	
	var t_amount_silver = 0;		
	function silver_calculate(){

		//alert("test");

		 var count_silver = [];
		 var weight_silver = [];

		 for(let i=1; i<=20; i++){

		 	var variable1 = 'silver_count'+i;
		 	var variable2 = 'silver_weight'+i;
			var value1 = $('#'+variable1).val();
			var value2 = $('#'+variable2).val();

		
		count_silver.push(value1);
		//console.log(count);

		 weight_silver.push(value2);
		// console.log(weight);

		}

		var myArrayNew = count_silver.filter(function (el) {
    	return el != " " && el != "";
  		});
  
        // Getting sum of numbers
        var sum1 = myArrayNew.reduce(function(a, b){
            return parseInt(a)+parseInt(b);
        }, 0);
        

       	var myArray = weight_silver.filter(function (el) {
    	return el != " " && el != "";
  		});
  

        // Getting sum of numbers
        var sum2 = myArray.reduce(function(a, b){
            return parseInt(a)+parseInt(b);
        }, 0);
        
		//alert(count);
		//console.log(count);
		// var t1 = count.reduce(function(a,b){
			
		// 	return parseInt(a)+parseInt(b);


		// },0);
		// var t2 = weight.reduce(function(a,b){

			
		// 	return parseInt(a)+parseInt(b);

		// },0);

		// console.log(t1,t2);

		$('#total_count').val(sum1);
		$('#total_weight').val(sum2);
		$('#amount_pay').val(sum2*57.63);
		t_amount_silver = sum2*57.63; 
		
	 }
</script> -->

<script>
	
function purchase_entry_validation()
{

	//alert ("ahsdfhfdh");
	var err = 0;

	var date = $('#kt_daterangepicker_lot_entry_add_date').val();
    if(date.trim()=='')
    {
        $('#date_err').html('Enter Date!');

        err++;
    }

    else

    {
    	$('#date_err').html('');

    }

	var supplier_list_newpurchase = $('#supplier_list_newpurchase').val();
    if(supplier_list_newpurchase.trim()=='')
    {
        $('#supplier_list_err').html('Select Supplier!');

        //alert(supplier_list_newpurchase);exit;
        err++;
    }
    else

    {
    	$('#supplier_list_err').html('');

    }

    var item_type= $('#item_type').val();
    if(item_type.trim()=='')
    {
        $('#metal_type_err').html('Select Item Type!');

        //alert(item_type);
        err++;
    }
    else

    {
    	$('#metal_type_err').html('');

    }

    if(err>0){ return false; }else { return true; }

}	
</script>

<script>
	
function autocomplete(inp, arr) {
  /*the autocomplete function takes two arguments,
  the text field element and an array of possible autocompleted values:*/
  var currentFocus;
  /*execute a function when someone writes in the text field:*/
  inp.addEventListener("input", function(e) {
      var a, b, i, val = this.value;
      /*close any already open lists of autocompleted values*/
      closeAllLists();
      if (!val) { return false;}
      currentFocus = -1;
      /*create a DIV element that will contain the items (values):*/
      a = document.createElement("DIV");
      a.setAttribute("id", this.id + "autocomplete-list");
      a.setAttribute("class", "autocomplete-items");
      /*append the DIV element as a child of the autocomplete container:*/
      this.parentNode.appendChild(a);
      /*for each item in the array...*/
      for (i = 0; i < arr.length; i++) {
        /*check if the item starts with the same letters as the text field value:*/
        if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
          /*create a DIV element for each matching element:*/
          b = document.createElement("DIV");
          /*make the matching letters bold:*/
          b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
          b.innerHTML += arr[i].substr(val.length);
          /*insert a input field that will hold the current array item's value:*/
          b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
          /*execute a function when someone clicks on the item value (DIV element):*/
              b.addEventListener("click", function(e) {
              /*insert the value for the autocomplete text field:*/
              inp.value = this.getElementsByTagName("input")[0].value;
              /*close the list of autocompleted values,
              (or any other open lists of autocompleted values:*/
              closeAllLists();
          });
          a.appendChild(b);
        }
      }
  });
  /*execute a function presses a key on the keyboard:*/
  inp.addEventListener("keydown", function(e) {
      var x = document.getElementById(this.id + "autocomplete-list");
      if (x) x = x.getElementsByTagName("div");
      if (e.keyCode == 40) {
        /*If the arrow DOWN key is pressed,
        increase the currentFocus variable:*/
        currentFocus++;
        /*and and make the current item more visible:*/
        addActive(x);
      } else if (e.keyCode == 38) { //up
        /*If the arrow UP key is pressed,
        decrease the currentFocus variable:*/
        currentFocus--;
        /*and and make the current item more visible:*/
        addActive(x);
      } else if (e.keyCode == 13) {
        /*If the ENTER key is pressed, prevent the form from being submitted,*/
        e.preventDefault();
        if (currentFocus > -1) {
          /*and simulate a click on the "active" item:*/
          if (x) x[currentFocus].click();
        }
      }
  });
  function addActive(x) {
    /*a function to classify an item as "active":*/
    if (!x) return false;
    /*start by removing the "active" class on all items:*/
    removeActive(x);
    if (currentFocus >= x.length) currentFocus = 0;
    if (currentFocus < 0) currentFocus = (x.length - 1);
    /*add class "autocomplete-active":*/
    x[currentFocus].classList.add("autocomplete-active");
  }
  function removeActive(x) {
    /*a function to remove the "active" class from all autocomplete items:*/
    for (var i = 0; i < x.length; i++) {
      x[i].classList.remove("autocomplete-active");
    }
  }
  function closeAllLists(elmnt) {
    /*close all autocomplete lists in the document,
    except the one passed as an argument:*/
    var x = document.getElementsByClassName("autocomplete-items");
    for (var i = 0; i < x.length; i++) {
      if (elmnt != x[i] && elmnt != inp) {
      x[i].parentNode.removeChild(x[i]);
    }
  }
}
/*execute a function when someone clicks in the document:*/
document.addEventListener("click", function (e) {
    closeAllLists(e.target);
});
}

</script>

<script>

	function item_name(e){

		//alert("addfj");


		var curr_id = e.target.id;
	
	
	var values = [];
	//var sub = [];
	var items = <?php echo json_encode($item_list);?>
	

		console.log(items.length);

		//console.log(subitems.length);

		for(let i=0;i<items.length;i++){

			values.push(items[i].ITEMNAME);
			//sub.push(subitems[i].SUBITEM_NAME);

			console.log(values);

			autocomplete(document.getElementById(curr_id),values);

		}

	}	

	//var it = ["chain","Ring","Necklace","Steads"];

	//console.log(it);

	
	
	//console.log(sub);

	

	//$('#item_name_pur').autocomplete({data: values});

	//$('.autocomplete').autocomplete({source: 'autocomplete.php'});

	//autocomplete(document.getElementById("subitem_name_pur"),sub);

</script>

<script>

	function sub_item_name(e){

	var curr_subid = e.target.id;

	

	var sub = [];

	var subitems = <?php echo json_encode($subitem_list);?>

	console.log(subitems.length);

		for(let i=0;i<subitems.length;i++){

			sub.push(subitems[i].SUBITEM_NAME);
			//sub.push(subitems[i].SUBITEM_NAME);

			console.log(sub);

			autocomplete(document.getElementById(curr_subid),sub);

		}

}
	
</script>
