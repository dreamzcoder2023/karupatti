<?php $this->load->view("common");?>
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
									<h1 class="d-flex align-items-center text-dark fw-bold my-1 fs-3">View RP Return
									<!--begin::Separator-->
									<span class="h-20px border-gray-200 border-start ms-3 mx-2"></span>
									<label class="d-flex align-items-center text-primary fw-bold my-1 fs-5">
										<span>RP Bill No &emsp;-&emsp;</span>
										<span><?php echo $repledgereturn_data[0]['RP_BILLNO']; ?></span>
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
											<?php 
												//print_r($returnloan_data[0]['COMPANYNAME']);exit;
											?>
												<label class="col-lg-1 col-form-label fw-semibold fs-6">Rtn Date</label>
												<label class="col-lg-2 col-form-label fw-bold fs-5"><?php echo $repledgereturn_data[0]['ADDED_TIME']; ?></label>
												<label class="col-lg-1 col-form-label fw-semibold fs-6">RP Old Bill No</label>
												<label class="col-lg-2 col-form-label fw-bold fs-5"><?php echo $repledgereturn_data[0]['RP_BILLNO']; ?></label>
												<label class="col-lg-1 col-form-label fw-semibold fs-6">Company</label>
												<label class="col-lg-3 col-form-label fw-bold fs-5"><?php echo $returnloan_data[0]['COMPANYNAME']; ?></label>
												<div class="col-lg-2 d-flex justify-content-end align-items-center">
														 <?php
																  if($repledgereturn_data[0]['CLOSING_TYPE'] ='NORMAL')
																  {
														  ?>	
																		<label class="col-form-label fw-semibold fs-7" name="" id="">
																<span style="background-color:#ffc700;border-radius: 8px;padding: 5px 15px 5px 15px;">Normal</span>
																</label>
														 <?php
														  	}
														  	else{
														  		?>
																	<label class="col-form-label fw-semibold fs-7" name="" id=""><span style="background-color:#b0dfff;border-radius: 8px;padding: 5px 15px 5px 15px;">Transfer</span></label>
														  		<?php
														  	}
															?>

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
																					<label class="col-lg-8 col-form-label fw-bold fs-5"><?php echo $returnloan_data[0]['ENDATE']; ?></label>
																					<label class="col-lg-4 col-form-label fw-semibold fs-6">Interest (%)</label>
																					<label class="col-lg-8 col-form-label fw-bold fs-5"><?php echo $repledgereturn_pledgedata[0]['INTEREST']; ?></label>
																					<label class="col-lg-4 col-form-label fw-semibold fs-6">Months</label>
																					<label class="col-lg-8 col-form-label fw-bold fs-5"><?php echo $returnloan_data[0]['MONTHS']; ?></label>
																					<label class="col-lg-4 col-form-label fw-semibold fs-6">Loan Amount</label>
																					<label class="col-lg-8 col-form-label fw-bold fs-5"><?php echo $repledgereturn_data[0]['LOANAMOUNT']; ?></label>
																				</div>
																			</div>
																			<div class="col-lg-4">
																				<div class="row">
																					<label class="col-lg-3 col-form-label fw-semibold fs-6">Company</label>
																					<label class="col-lg-9 col-form-label fw-bold fs-5"><?php echo$returnloan_data[0]['COMPANYNAME']; ?></label>
																					<label class="col-lg-3 col-form-label fw-semibold fs-6">Bank</label>
																					<label class="col-lg-9 col-form-label fw-bold fs-5"><?php echo $repledgereturn_data[0]['BANK']; ?></label>
																					<label class="col-lg-3 col-form-label fw-semibold fs-6">Bank No</label>
																					<label class="col-lg-9 col-form-label fw-bold fs-5"><?php echo $repledgereturn_data[0]['BANKNO']; ?></label>
																				</div>
																			</div>
																			<div class="col-lg-4">
																				<div class="row">
																					<label class="col-lg-4 col-form-label fw-semibold fs-6">Iteration</label>
																					<label class="col-lg-8 col-form-label fw-bold fs-5"><?php echo $returnloan_data[0]['ITERATION']; ?></label>
																					<label class="col-lg-4 col-form-label fw-semibold fs-6">(+)Interest (%)</label>
																					<label class="col-lg-8 col-form-label fw-bold fs-5"><?php echo $returnloan_data[0]['PLUSINT']; ?></label>
																					<label class="col-lg-4 col-form-label fw-semibold fs-6">Staff</label>
																					<label class="col-lg-8 col-form-label fw-bold fs-5"><?php echo $repledgereturn_data[0]['ADDED_USER']; ?></label>
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
																	            <td colspan="2" class="fw-bold"><?php echo $repledgereturn_pledgedata[0]['MONTHS']; ?> </td>
																	        	</tr>
																	        	<tr>
																	            <td>Total Days</td>
																	            <td class="fw-bold"><?php echo $repledgereturn_pledgedata[0]['TOTAL_DAYS']; ?></td>
																	            <td>Paid Amount</td>
																	        	</tr>
																	        	<tr>
																	            <td>Amount</td>
																	            <td class="fw-bold"><?php echo $repledgereturn_pledgedata[0]['AMOUNT']; ?></td>
																	            <td class="fw-bold"><?php echo $returnloan_data[0]['CALC_PRINCIPAL']; ?></td>
																	        	</tr>
																	        	<tr>
																	        		<?php 
																	        				$intrestcal = $repledgereturn_pledgedata[0]['AMOUNT'] * $repledgereturn_pledgedata[0]['INTEREST'];

																	        				$finalintret = $intrestcal/100;

																	        				$finaltotintrest = $finalintret * $repledgereturn_pledgedata[0]['MONTHS'];


																	        				$totalamount =  $repledgereturn_pledgedata[0]['AMOUNT'] + $finaltotintrest;
																	        		?>
																	            <td>Interest</td>
																	            <td class="fw-bold"><?php echo $finaltotintrest; ?></td>
																	            <td class="fw-bold"><?php echo $returnloan_data[0]['CALC_INTEREST']; ?></td>
																	        	</tr>
																	        	<tr>
																	        		<?php
																	        			$fintot =  $returnloan_data[0]['CALC_PRINCIPAL'] + $returnloan_data[0]['CALC_INTEREST']; 
																	        		?>
																	            <td>Total</td>
																	            <td class="fw-bold"><?php echo $totalamount; ?></td>
																	            <td class="fw-bold"><?php echo $fintot; ?></td>
																	        	</tr>
																	        	<tr>
																	        		<?php 
																	        			$finalbalnce = $totalamount -  $fintot;
																	        		?>
																	            <td>Balance</td>
																	            <td colspan="2" class="fw-bold"><?php echo $finalbalnce; ?></td>
																	        	</tr>
																				  </tbody>
																				</table>
																			</div>
																			<div class="col-lg-6">
																				<div class="row">
																					<label class="col-form-label fw-bold fs-4">Payment</label>
																					<label class="col-lg-3 col-form-label fw-semibold fs-6">Amount</label>
																					<label class="col-lg-4 col-form-label fw-bold fs-5"><?php echo $finalbalnce; ?></label>
																				</div>
																				<div class="row">
																					<label class="col-lg-3 col-form-label fw-semibold fs-6">Others</label>
																					<label class="col-lg-4 col-form-label fw-bold fs-5"><?php echo $repledgereturn_data[0]['OTHERS']; ?></label>
																				</div>
																				<div class="row">
																					<label class="col-lg-3 col-form-label fw-semibold fs-6">Discount</label>
																					<label class="col-lg-4 col-form-label fw-bold fs-5"><?php echo $repledgereturn_data[0]['DISCOUNT']; ?></label>
																				</div>
																				<div class="row">
																					<?php 
																							$finalnetamount = $finalbalnce + $repledgereturn_data[0]['OTHERS'] + $repledgereturn_data[0]['DISCOUNT'];
																					?>
																					<label class="col-lg-3 col-form-label fw-semibold fs-6">Net Pay</label>
																					<label class="col-lg-4 col-form-label fw-bold fs-5"><?php echo $finalnetamount; ?></label>
																				</div>
																				<div class="row">
																					<label class="col-lg-3 col-form-label fw-semibold fs-6">Cash Paid</label>
																					<label class="col-lg-4 col-form-label fw-bold fs-4"><?php echo $finalnetamount; ?></label>
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
																				<?php 			
																						$i=1;
																						$totalamtval = 0;		
																						$totalweightval = 0;
																						$totalqtyval = 0;	
																						//print_r($repledgereturn_pledgedata);exit;	
																						foreach($repledgereturn_pledgedata as $pledgedata)
																						{
																							$finaltotalamtval = $repledgereturn_pledgedata[0]['LOANAMOUNT'] + $totalamtval;
																							$finaltotalweightval =  $repledgereturn_pledgedata[0]['WEIGHT'] + $totalweightval;
																							$finaltotalqtyval = $repledgereturn_pledgedata[0]['QTY'] + $totalqtyval;
																					?>
																							<tr>
																								<td><?php echo $i; ?></td>
																            					<td class="ple1"><?php echo $repledgereturn_pledgedata[0]['ENDATE']; ?></td>
																								<td class="ple1"><?php echo $repledgereturn_pledgedata[0]['COMPANYNAME']; ?></td>
																								<td class="ple1"><?php echo $repledgereturn_pledgedata[0]['RP_BILLNO']; ?></td>
																								<td class="ple1"><?php echo $repledgereturn_pledgedata[0]['PARTYNAME']; ?></td>
																								<td class="ple1"><?php echo $repledgereturn_pledgedata[0]['PLEDGENOS']; ?></td>
																								<td class="ple1"><?php echo $repledgereturn_pledgedata[0]['PLEDGES']; ?></td>
																								<td class="ple1"><?php echo $repledgereturn_pledgedata[0]['PLEDGES']; ?></td>
																								<td><?php echo $repledgereturn_pledgedata[0]['QTY']; ?></td>
																								<td><?php echo $repledgereturn_pledgedata[0]['WEIGHT']; ?></td>
																								<td><?php echo $repledgereturn_pledgedata[0]['LOANAMOUNT']; ?></td>
																								<td>
																									<?php $bno=str_replace('/', '_',  $repledgereturn_pledgedata[0]['RP_BILLNO']); ?>

																									<span class="text-end" onclick="load_pledge_info('<?php echo $bno;?>');">
																										<i class="bi bi-eye-fill eyc" ></i>
																									</span>
																								</td>		
																							</tr>
																						<?php
																							$i++;
																							}
																						?>
																				</tbody>
																			</table>
																		</div>
																		<div class="d-flex justify-content-end">
																			<label class="col-lg-1 col-form-label fw-bold fs-4 text-end">Total</label>
																			<label class="col-lg-1 col-form-label fw-bold fs-4 text-center"><?php echo isset($finaltotalqtyval) ? $finaltotalqtyval : "0.00"; ?></label>
																			<label class="col-lg-1 col-form-label fw-bold fs-4 text-end"><?php echo isset($finaltotalweightval) ? $finaltotalweightval : "0.00"; ?></label>
																			<label class="col-lg-2 col-form-label fw-bold fs-4 text-center"><?php echo isset($finaltotalamtval) ? $finaltotalamtval : "0.00"; ?></label>
																			<!-- <label class="col-lg-1"></label> -->
																		</div>
											          	</div>
											        </div>
											    </div>
											  </div>
											</div>
											
											<div class="d-flex justify-content-end mt-6">
												<button type="reset" class="btn btn-primary "  onclick="closepagelistview();" >Back</button>
												<button type="submit" class="btn btn-primary" style="display: none;">Save Changes</button>
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
		<div class="modal fade" id="viewrepledge_pledge_info" tabindex="-1" aria-hidden="true" style="background: #000000a8;">
			
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
		<!-- <script src="js/repledge-list.js"></script> -->
		<script>
			var baseurl = $("#baseurl").val();
			function closepagelistview()
			{

					var urldirect = baseurl+'repledge/repledge_return';
						window.location.href = urldirect;

			}
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
		
			function load_pledge_info(bno)
			{
				var baseurl=$('#baseurl').val();
				var bno="<?php echo $bno;?>";
				var rp_bill_no="<?php echo $repledgereturn_data[0]['RP_BILLNO']; ?>";
				// alert(bno);
				$.ajax({
								type: "POST",
								url: baseurl+'repledge/load_pledge_list?',
								async: false,
								type: "POST",
								data: "bno="+bno+'&rp_no='+rp_bill_no,
								dataType: "html",
								success: function(response)
								{
										$('#viewrepledge_pledge_info').empty().append(response);
										$('#viewrepledge_pledge_info').addClass('show');
										$('.modal-backdrop').addClass('show');
										$('#viewrepledge_pledge_info').show();
									$('.modal-backdrop').show();
								}
							});
			}
			function close_pledge_list_modal()
			{
						// $('#viewrepledge_pledge_info').empty().append(response);
						$('#viewrepledge_pledge_info').removeClass('show');
						$('.modal-backdrop').removeClass('show');
						$('#viewrepledge_pledge_info').hide();
			   		$('.modal-backdrop').hide();
			}
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