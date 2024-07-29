<?php $this->load->view("common");?>
<link href="<?php echo base_url();?>assets/jquery.autocomplete.css" rel="stylesheet" type="text/css" />
<style>
	.dataTables_scroll
    {
        position: relative;
        overflow: auto;
        min-height: 200px;
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

  .dataTables_scroll_1
    {
        position: relative;
        overflow: auto;
		height: 350px;
        min-height: 200px;
        max-height: 350px;/*the maximum height you want to achieve*/
        width: 100%;
    }
  .dataTables_scroll_1 thead{
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
									<h1 class="d-flex align-items-center text-dark fw-bold my-1 fs-3">JST [Jewel Sending by Transport]
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
										<form action="<?php echo base_url(); ?>Jst_inventory/jst_save" id="formsubmit"  method="POST"   >
										<div class="card-body py-4">
											<div class="row">
												<label class="col-lg-1 col-form-label required fw-semibold fs-6">Date</label>
												<div class="col-lg-2 fv-row">
													<div class="d-flex align-items-center">
														<span class="svg-icon position-absolute ms-4 svg-icon-2 dt">
															<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																<path opacity="0.3" d="M21 22H3C2.4 22 2 21.6 2 21V5C2 4.4 2.4 4 3 4H21C21.6 4 22 4.4 22 5V21C22 21.6 21.6 22 21 22Z" fill="currentColor" />
																<path d="M6 6C5.4 6 5 5.6 5 5V3C5 2.4 5.4 2 6 2C6.6 2 7 2.4 7 3V5C7 5.6 6.6 6 6 6ZM11 5V3C11 2.4 10.6 2 10 2C9.4 2 9 2.4 9 3V5C9 5.6 9.4 6 10 6C10.6 6 11 5.6 11 5ZM15 5V3C15 2.4 14.6 2 14 2C13.4 2 13 2.4 13 3V5C13 5.6 13.4 6 14 6C14.6 6 15 5.6 15 5ZM19 5V3C19 2.4 18.6 2 18 2C17.4 2 17 2.4 17 3V5C17 5.6 17.4 6 18 6C18.6 6 19 5.6 19 5Z" fill="currentColor" />
																<path d="M8.8 13.1C9.2 13.1 9.5 13 9.7 12.8C9.9 12.6 10.1 12.3 10.1 11.9C10.1 11.6 10 11.3 9.8 11.1C9.6 10.9 9.3 10.8 9 10.8C8.8 10.8 8.59999 10.8 8.39999 10.9C8.19999 11 8.1 11.1 8 11.2C7.9 11.3 7.8 11.4 7.7 11.6C7.6 11.8 7.5 11.9 7.5 12.1C7.5 12.2 7.4 12.2 7.3 12.3C7.2 12.4 7.09999 12.4 6.89999 12.4C6.69999 12.4 6.6 12.3 6.5 12.2C6.4 12.1 6.3 11.9 6.3 11.7C6.3 11.5 6.4 11.3 6.5 11.1C6.6 10.9 6.8 10.7 7 10.5C7.2 10.3 7.49999 10.1 7.89999 10C8.29999 9.90003 8.60001 9.80003 9.10001 9.80003C9.50001 9.80003 9.80001 9.90003 10.1 10C10.4 10.1 10.7 10.3 10.9 10.4C11.1 10.5 11.3 10.8 11.4 11.1C11.5 11.4 11.6 11.6 11.6 11.9C11.6 12.3 11.5 12.6 11.3 12.9C11.1 13.2 10.9 13.5 10.6 13.7C10.9 13.9 11.2 14.1 11.4 14.3C11.6 14.5 11.8 14.7 11.9 15C12 15.3 12.1 15.5 12.1 15.8C12.1 16.2 12 16.5 11.9 16.8C11.8 17.1 11.5 17.4 11.3 17.7C11.1 18 10.7 18.2 10.3 18.3C9.9 18.4 9.5 18.5 9 18.5C8.5 18.5 8.1 18.4 7.7 18.2C7.3 18 7 17.8 6.8 17.6C6.6 17.4 6.4 17.1 6.3 16.8C6.2 16.5 6.10001 16.3 6.10001 16.1C6.10001 15.9 6.2 15.7 6.3 15.6C6.4 15.5 6.6 15.4 6.8 15.4C6.9 15.4 7.00001 15.4 7.10001 15.5C7.20001 15.6 7.3 15.6 7.3 15.7C7.5 16.2 7.7 16.6 8 16.9C8.3 17.2 8.6 17.3 9 17.3C9.2 17.3 9.5 17.2 9.7 17.1C9.9 17 10.1 16.8 10.3 16.6C10.5 16.4 10.5 16.1 10.5 15.8C10.5 15.3 10.4 15 10.1 14.7C9.80001 14.4 9.50001 14.3 9.10001 14.3C9.00001 14.3 8.9 14.3 8.7 14.3C8.5 14.3 8.39999 14.3 8.39999 14.3C8.19999 14.3 7.99999 14.2 7.89999 14.1C7.79999 14 7.7 13.8 7.7 13.7C7.7 13.5 7.79999 13.4 7.89999 13.2C7.99999 13 8.2 13 8.5 13H8.8V13.1ZM15.3 17.5V12.2C14.3 13 13.6 13.3 13.3 13.3C13.1 13.3 13 13.2 12.9 13.1C12.8 13 12.7 12.8 12.7 12.6C12.7 12.4 12.8 12.3 12.9 12.2C13 12.1 13.2 12 13.6 11.8C14.1 11.6 14.5 11.3 14.7 11.1C14.9 10.9 15.2 10.6 15.5 10.3C15.8 10 15.9 9.80003 15.9 9.70003C15.9 9.60003 16.1 9.60004 16.3 9.60004C16.5 9.60004 16.7 9.70003 16.8 9.80003C16.9 9.90003 17 10.2 17 10.5V17.2C17 18 16.7 18.4 16.2 18.4C16 18.4 15.8 18.3 15.6 18.2C15.4 18.1 15.3 17.8 15.3 17.5Z" fill="currentColor" />
															</svg>
														</span>
														<input class="form-control form-control-solid ps-12" name="kt_datepicker_new_loan_date" placeholder="Date" id="kt_datepicker_new_loan_date" value="<?php echo date("d-m-Y"); ?>"/>
													</div>
												</div>
												<label class="col-lg-1 col-form-label required fw-semibold fs-6">From</label>
												<div class="col-lg-2 fv-row fv-plugins-icon-container">
													<select class="form-select form-select-solid" data-control="select2" id="from_company" name="from_company" onchange="get_company_id()">	
														<option value="">Select Company</option>
														<?php foreach($company_list as $clist){ ?>
																<option value="<?php echo $clist['COMPANYCODE'] ?>"><?php echo $clist['COMPANYNAME'] ?></option>
																<?php } ?>
													</select>
													<span class="fv-plugins-message-container invalid-feedback text-danger" id="from_company_err"></span>
												</div>
												<label class="col-lg-1 col-form-label required fw-semibold fs-6">To</label>
												<div class="col-lg-2 fv-row fv-plugins-icon-container">
													<select class="form-select form-select-solid" data-control="select2" id="to_company" name="to_company"  onchange="company_validation()">	
														<option value="">Select Company</option>
														<?php foreach($company_list as $clist){ ?>
																<option value="<?php echo $clist['COMPANYCODE'] ?>"><?php echo $clist['COMPANYNAME'] ?></option>
																<?php } ?>
													</select>
													<span class="fv-plugins-message-container invalid-feedback text-danger" id="to_company_err"></span>
												</div>
												<label class="col-lg-1 col-form-label required fw-semibold fs-6">Send Via</label>
												<div class="col-lg-2 fv-row fv-plugins-icon-container">
												<!--id="send_via_dbox"-->
													<select class="form-select form-select-solid" data-control="select2"   id="send_via" name="send_via">	
														<option value="">Select</option>
														<?php foreach($staff_list as $slist){ ?>
														<option value="<?php echo $slist['SNO'] ;?>"><?php echo $slist['STAFFNAME'] ;?></option>
														<?php } ?>
														
													</select>
													<span class="fv-plugins-message-container invalid-feedback text-danger" id="send_via_err"></span>
												</div>
												<label class="col-lg-1 col-form-label required fw-semibold fs-6" id="others_label" style="display:none">Others</label>
												<div class="col-lg-2 fv-row fv-plugins-icon-container" id="others_tbox" style="display:none">
													<input type="text" class="form-control form-control-lg1 form-control-solid">
													<div class="fv-plugins-message-container invalid-feedback" id=""></div>
												</div>
												<label class="col-lg-1 col-form-label required fw-semibold fs-6">Cash</label>
												<div class="col-lg-2 fv-row fv-plugins-icon-container">
													<input type="text" class="form-control form-control-lg1 form-control-solid" placeholder="Cash" id="jst_cash" name="jst_cash" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
													<div class="fv-plugins-message-container invalid-feedback" id=""></div>
													<span class="fv-plugins-message-container invalid-feedback text-danger" id="jst_cash_err"></span>
												</div>
											</div>
											<!-- <div class="px-1" style="border-radius: 10px;padding-bottom: 10px;box-shadow: 0 5px 10px #00002947;"> -->
												<div class="row">
													<label class="col-lg-1 col-form-label required fw-semibold fs-6">Scan</label>
													<div class="col-lg-3 fv-row fv-plugins-icon-container">
														<input type="text" name="tag_id" id="tag_id" class="form-control form-control-lg1 form-control-solid" placeholder="Scan Here">
														<div class="fv-plugins-message-container invalid-feedback" id=""></div>
														<span class="fv-plugins-message-container invalid-feedback text-danger" id="tag_id_err"></span>
														</div>
													<div class="col-lg-1">
														<div class="btn btn-sm btn-primary mt-2" id="click_to_scan" onclick="jst_addcart();">Add</div>
													</div>
												</div>
												<div class="accordion" id="kt_accordion_tagged_jst">
											    <div class="accordion-item">
											        <h2 class="accordion-header" id="kt_accordion_tagged_jst_header">
											            <button class="accordion-button fw-bold fs-6 collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#kt_accordion_tagged_jst_body" aria-expanded="true" aria-controls="kt_accordion_tagged_jst_body">
											            Tagged Item 
											            </button>
											        </h2>
											        <div id="kt_accordion_tagged_jst_body" class="accordion-collapse collapse show" aria-labelledby="kt_accordion_tagged_jst_header" data-bs-parent="#kt_accordion_tagged_jst">
											            <div class="accordion-body">
											           	  <table class="table align-middle table-row-dashed table-striped table-hover fs-7 gy-1 gs-2 dataTable" id="add_jst_tag_table">
																	    <thead>
																	        <tr class="text-start text-muted fw-bold fs-7 gs-0">
															            <th class="min-w-25px">Sno</th>
															            <th class="min-w-125px">Tag ID</th>
															            <th class="min-w-50px">Tag Image</th>
															            <th class="min-w-125px">Item Type</th>
															            <th class="min-w-150px">Item</th>
															            <th class="min-w-150px">SubItem</th>
																					<th class="min-w-50px">Weight(gms)</th>
																					<th class="min-w-50px">Action</th>
															        </tr>
																	    </thead>
																	    <tbody class="text-gray-600 fw-semibold" id="table_row" name="table_row">
																	   
																	    </tbody>
																	</table>
											            </div>
											        </div>
											    </div>
												</div><br>
											<!-- </div><br> -->
											<!-- <div class="px-1" style="border-radius: 10px;padding-bottom: 10px;box-shadow: 0 5px 10px #00002947;"> -->
												<div class="accordion" id="kt_accordion_old_gold_jst">
											    <div class="accordion-item">
											        <h2 class="accordion-header" id="kt_accordion_old_gold_jst_header_1">
											            <button class="accordion-button fw-bold fs-6 collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#kt_accordion_old_gold_jst_body_1" aria-expanded="false" aria-controls="kt_accordion_old_gold_jst_body_1">
											            Old Metal 
											            </button>
											        </h2>
											        <div id="kt_accordion_old_gold_jst_body_1" class="accordion-collapse collapse" aria-labelledby="kt_accordion_old_gold_jst_header_1" data-bs-parent="#kt_accordion_old_gold_jst">
											            <div class="accordion-body">
											           	  <table class="table align-middle table-row-dashed table-striped table-hover fs-7 gy-4 gs-2 dataTable" id="add_jst_nontag_table">
																	    <thead>
																	       <tr class="text-start text-muted fw-bold fs-7 gs-0">
															            <th class="min-w-25px">
															            	<label class="form-check form-check-solid is-invalid mt-4">
																							<input class="form-check-input me-1" type="checkbox" name="all" id="old_metal_checkall">
																							<span class="fs-7">All</span>
																						</label>
															            </th>
															            <th class="min-w-125px">Company</th>
															            <th class="min-w-125px">ID No</th>
															            <th class="min-w-150px">Count</th>
																					<th class="min-w-50px">Weight(gms)</th>
															        </tr>
																	    </thead>
																	
																	    <tbody class="text-gray-600 fw-semibold">
																	 			<?php $i=0; foreach($old_gold_list as $olist ){ ?>
																				<tr id="tr_<?php echo $i; ?>">
																	    		<td>
																	    			<label class="form-check form-check-inline form-check-solid is-invalid">
																						<input class="form-check-input old_metal_chk" type="checkbox" name="old_metal_checkbox[]" id="old_metal_checkbox<?php echo $i; ?>" value="<?php echo $olist['sale_id']; ?>" onclick="select_all2()">
																							</label>
																	    		</td>
																	    		<td>
																	    		<?php
																						$company  = $this->db->query("SELECT * FROM COMPANY WHERE ACTIVE='Y' AND COMPANYCODE='".$olist['company_id']."' ")->row();
																						echo $company?$company->COMPANYNAME:'-';
																					?>
																				<input type="hidden" id="company_id<?php echo $i; ?>"  value="<?php echo $olist['company_id']; ?>">
																					</td>
																		    		<td><?php echo $olist['sale_id']; ?></td>
																		    		<td><?php echo $olist['oge_gold_count']+$olist['oge_silver_count']; ?></td>
																		    		<td id="old_metal_weight<?php echo $i; ?>"> <?php echo $olist['oge_gold_weight']+$olist['oge_silver_weight']; ?></td>
																		    	</tr>
																				<?php $i++; } ?>
																	    </tbody>
																	</table>
											            </div>
											        </div>
											    </div>
												</div>
											
												<div class="row">
												<input type="hidden" id="table_row_count" value="<?php echo $i; ?>">

												<input type="hidden" name="gold_count1" id="gold_count1">
												<input type="hidden" name="silver_count1" id="silver_count1">
												<input type="hidden" name="total_gold_weight1" id="total_gold_weight1">
												<input type="hidden" name="total_silver_weight1" id="total_silver_weight1">
												<input type="hidden" name="old_metal_count1" id="old_metal_count1">
												<input type="hidden" name="old_metal_tot_weight1" id="old_metal_tot_weight1">
												<script>
																			function get_company_id(){
																				from_company=$('#from_company').val();
																				count=$('#table_row_count').val();
																				// alert(from_company);
																				// alert(count);
																				for(i=0;i<=count;i++){
																				company=$('#company_id'+i).val();
																				if(company != from_company){
																					$('#tr_'+i).hide();
																				}
																				else{
																					$('#tr_'+i).show();
																				}
																				}
																			}
																			</script>

														<!-- <label class="col-form-label fw-bold fs-3 text-center">Summary</label> -->
														<label class="col-lg-6 col-form-label fw-bold fs-4 text-center">Tagged Item</label>
														<label class="col-lg-6 col-form-label fw-bold fs-4 text-center">Old Metal</label>
														<div class="col-lg-3">
															<div class="row">
																<label class="col-lg-4 form-label text-center fs-4 fw-bold">Gold</label>
																<div class="col-lg-8 text-center">
																	<label class="text-success fs-2 fw-bold">
																	<span title="Tagged Item Gold Weight">
																		<svg fill="#d4af37" width="30px" height="30px" viewBox="0 0 32 32" version="1.1" xmlns="http://www.w3.org/2000/svg">
																		<path d="M11.652 19.245l-0.001-0.001-0.005-0.003zM30.671 16.098l-2.207-5.839-8.022-4.361-16.624 8.861-2.431 6.495 9.8 5.214 0.161-7.067-7.624-4.353 0.654 0.346-0.373-0.215 1.332 0.708-1.212-0.708 7.526 4.065 16.205-8.376-2.594 1.424 3.037-1.551-6.011 3.183-10.434 5.727-0.668 6.816 19.484-10.371zM11.976 17.206l-4.389-2.342 4.269 1.32 13.070-5.8-12.95 6.822z"></path>
																		</svg>
																	</span>
																<span id="total_gold_weight" name="total_gold_weight">0.000(gms)</span></label>
																	<div> 
																		<label class="text-success fs-2 fw-bold">
																			<span><i class="fas fa-list-ol fs-2" title="Tagged Item Gold Count"></i>&nbsp;</span>
																		<span id="gold_count" name="gold_count">0</span></label>
																	</div>
																</div>
															</div>
														</div>
														<div class="col-lg-3">
															<div class="row">
																<label class="col-lg-4 form-label text-center fs-4 fw-bold">Silver</label>
																<div class="col-lg-8 text-center">
																	<label class="text-success text-center fs-2 fw-bold">
																		<span title="Tagged Item Silver Weight">
																			<svg fill="#C0C0C0" width="30px" height="30px" viewBox="0 0 32 32" version="1.1" xmlns="http://www.w3.org/2000/svg">
																			<path d="M11.652 19.245l-0.001-0.001-0.005-0.003zM30.671 16.098l-2.207-5.839-8.022-4.361-16.624 8.861-2.431 6.495 9.8 5.214 0.161-7.067-7.624-4.353 0.654 0.346-0.373-0.215 1.332 0.708-1.212-0.708 7.526 4.065 16.205-8.376-2.594 1.424 3.037-1.551-6.011 3.183-10.434 5.727-0.668 6.816 19.484-10.371zM11.976 17.206l-4.389-2.342 4.269 1.32 13.070-5.8-12.95 6.822z"></path>
																			</svg>
																		</span>
																		<span id="total_silver_weight" name="total_silver_weight">0.000</span>(gms)</label>
																		<div class="text-center">
																			<label class="text-success fs-2 fw-bold">
																				<span><i class="fas fa-list-ol fs-2" title="Tagged Item Silver Count"></i>&nbsp;</span>
																				<span id="silver_count" name="silver_count">0</span></label>
																	</div>
																</div>
															</div>
														</div>
													
														<div class="col-lg-6">
															<div class="row">
																<div class="col-lg-12 text-center">
																	<label class="text-success fs-2 fw-bold">
																	<!-- <span class="me-3"> -->
																		<label><i class="fas fa-balance-scale fs-3" title="Old Metal Total Weight"></i></label>
																	<!-- </span> -->
																	<span id="old_metal_tot_weight" name="old_metal_tot_weight">0.000</span>(gms)</label>
																	<div>
																		<label class="text-success fs-2 fw-bold">
																			<span><i class="fas fa-list-ol fs-2" title="Old Metal Total Count"></i>&nbsp;</span>
																			<span id="old_metal_count" name="old_metal_count">0</span></label>
																	</div>
																</div>
															</div>
														</div>
													</div>
													<div class="d-flex justify-content-end">
														<button type="button" class="btn btn-primary mt-2" onclick="form_validation();">Send JST</button>
													</div>
												<!-- </div> -->
											</div>
										</form>
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
		<script src="<?php echo base_url();?>assets/jquery.autocomplete.js"></script>

		<script>
			function company_validation(){
				var from_company = $('#from_company').val();
				var to_company = $('#to_company').val();
				if(from_company.trim()==to_company.trim()){
					$('#to_company_err').html('From Company and To Company are same');
										Swal.fire({
													title:'Error!',
													text: 'Please Select Different From Company and To Company are same!',
													icon: 'error',
													confirmButtonText: 'Okay'
													});
					$('select[name^="to_company"] option:selected').attr("selected", null);
					$("#to_company option[value='']").attr("selected", "selected");
				}
				else{
					$('#to_company_err').html('');
				}
			}
		</script>



		<script>
		function form_validation(){
			// alert(1);
	var err = 0;
	var from_company = $('#from_company').val();
	var to_company = $('#to_company').val();
	var send_via = $('#send_via').val();
	var jst_cash = $('#jst_cash').val();


				if(from_company.trim()==''){
                

            if (err==0) {
            	$('#from_company_err').html('Company is required!');
							Swal.fire({
										title:'Error!',
										text: 'From Company is required ...!',
										icon: 'error',
										confirmButtonText: 'Okay'
										});

							err++;

							}
            }else{
                $('#from_company_err').html('');
            }


			if(to_company.trim()==''){
                
                if (err==0) {
                	$('#to_company_err').html('Company is required!');
							Swal.fire({
										title:'Error!',
										text: 'To Company is required!',
										icon: 'error',
										confirmButtonText: 'Okay'
										});

							err++;

							}
            }else{
                $('#to_company_err').html('');
            }
			if(send_via.trim()==''){
               
                if (err==0) {
                	 $('#send_via_err').html('Please Select Send via is required!');
							Swal.fire({
										title:'Error!',
										text: 'Please Select Send via is required!',
										icon: 'error',
										confirmButtonText: 'Okay'
										});

							err++;

							}
            }else{
                $('#send_via_err').html('');
            }
			

						if(jst_cash.trim()==''){
                
                if (err==0) {
                	$('#jst_cash_err').html('Cash is required!');
							Swal.fire({
										title:'Error!',
										text: 'Enter Cash is required ...!',
										icon: 'error',
										confirmButtonText: 'Okay'
										});

							err++;

							}
            }else{
                $('#jst_cash_err').html('');
            }

            var gold_count      = parseFloat($('#gold_count').html());
            var silver_count    = parseFloat($('#silver_count').html());
            var old_metal_count = parseFloat($('#old_metal_count').html());

            if((gold_count<=0) && (silver_count<=0) && (old_metal_count<=0)){

            	// $('#payment_err').html('Please select Any one of the payment mode and Enter Amount !');
            	if (err==0) {
							Swal.fire({
										title:'Error!',
										text: 'Please select Any one of the Jewell ...!',
										icon: 'error',
										confirmButtonText: 'Okay'
										});

							err++;

							}
            }

			if(err>0){ return false; }
			else{		
			 $('#formsubmit').submit();
			 return true;
			}

		}
		</script>

<script>
		$('#taggeditem_checkall').change(function () {
		    $('.tagged_item_chk').prop('checked',this.checked);

		});

		$('.tagged_item_chk').change(function () {
		 if ($('.tagged_item_chk:checked').length == $('.tagged_item_chk').length){
		 }
		 else {
		  $('#taggeditem_checkall').prop('checked',false);
		 }
		});



		$('#old_metal_checkall').change(function () {
		    $('.old_metal_chk').prop('checked',this.checked);
				   var count=$('.old_metal_chk').length;
						tot_count=0;
						tot_weight=0;
						// alert(count)
						for(i=0;i<count;i++){
							var select = document.getElementById("old_metal_checkbox"+i);
							var weight = $("#old_metal_weight"+i).text();

							if(select.checked){

								tot_count+=1;
								tot_weight+=parseFloat(weight);
							}
							
						}
				    $("#old_metal_count").html(tot_count);
						$("#old_metal_tot_weight").html(tot_weight);
						$("#old_metal_count1").val(tot_count);
						$("#old_metal_tot_weight1").val(tot_weight);
		});

		$('.old_metal_chk').change(function () {
		 if ($('.old_metal_chk:checked').length == $('.old_metal_chk').length){
		  $('#old_metal_checkall').prop('checked',true);
		  var count=$('.old_metal_chk').length;
						tot_count=0;
						tot_weight=0;
						// alert(count)
						for(i=0;i<count;i++){
							var select = document.getElementById("old_metal_checkbox"+i);
							var weight = $("#old_metal_weight"+i).text();

							if(select.checked){

								tot_count+=1;
								tot_weight+=parseFloat(weight);
							}
							
						}
				    $("#old_metal_count").html(tot_count);
						$("#old_metal_tot_weight").html(tot_weight);
						$("#old_metal_count1").val(tot_count);
						$("#old_metal_tot_weight1").val(tot_weight);

		 }
		 else {
		  $('#old_metal_checkall').prop('checked',false);
		  var count=$('.old_metal_chk').length;
						tot_count=0;
						tot_weight=0;
						// alert(count)
						for(i=0;i<count;i++){
							var select = document.getElementById("old_metal_checkbox"+i);
							var weight = $("#old_metal_weight"+i).text();

							if(select.checked){

								tot_count+=1;
								tot_weight+=parseFloat(weight);
							}
							
						}
				    $("#old_metal_count").html(tot_count);
						$("#old_metal_tot_weight").html(tot_weight);
						$("#old_metal_count1").val(tot_count);
						$("#old_metal_tot_weight1").val(tot_weight);
		 }
		});

</script>

		<script>

		function select_all1(){

	// alert(1);
	var count=$('.count_checkbox').length;
var select_all = document.getElementById("select_all");
if(select_all.checked){
for(i=0;i<count;i++){
 $('#checkbox'+i).prop('checked', true);
}
}
else{
for(i=0;i<count;i++){
 $('#checkbox'+i).prop('checked', false);
}
}


tot_count=0;
tot_weight=0;
for(i=0;i<count;i++){
	var select = document.getElementById("checkbox"+i);
	var weight = $("#old_metal_weight"+i).text();

	if(select.checked){

tot_count+=1;
tot_weight+=parseFloat(weight);
	}
	
		}
		        $("#old_metal_count").html(tot_count);
				$("#old_metal_tot_weight").html(tot_weight);
				$("#old_metal_count1").val(tot_count);
				$("#old_metal_tot_weight1").val(tot_weight);
		
	}
</script>
<script>
$(document).ready(function(){
    $('.check:button').toggle(function(){
        $('input:checkbox').attr('checked','checked');
        $(this).val('uncheck all');
    },function(){
        $('input:checkbox').removeAttr('checked');
        $(this).val('check all');        
    })
});
</script>

	<script>
		$("#add_jst_tag_table").on('click', '.btnDelete', function () {
    $(this).closest('tr').remove();

	gold_count= $('.gold_count').length;
		
				silver_count= $('.silver_count').length;
			
				$("#gold_count").html(gold_count);
				$("#silver_count").html(silver_count);

				$("#gold_count1").val(gold_count);
				$("#silver_count1").val(silver_count);
				total_gold_weight=0;
				$('.tag_item').each(function() {
				
					var $this = $(this),
      gold_weight = Number($this.find('.gold_weight').text());
     
  
  total_gold_weight += gold_weight;
});
total_silver_weight=0;
				$('.tag_item').each(function() {
					
					var $this = $(this),
      silver_weight = Number($this.find('.gold_silver').text());
     
  
  total_silver_weight += silver_weight;
});
$("#total_gold_weight").html(total_gold_weight);
				$("#total_silver_weight").html(total_silver_weight);

				$("#total_gold_weight1").val(total_gold_weight);
				$("#total_silver_weight1").val(total_silver_weight);

});
</script>
		<script>
		$(document).ready(function(){
			$("#tag_id").on("keypress", function(event) {
				  if(event.which == 13)
				   $("#click_to_scan").trigger('click'); 	
				});	
		});


		function jst_addcart(){
			// alert(1);
			var err = 0;
			var baseurl= $("#baseurl").val();
			var id     = $("#tag_id").val();

			if(id.trim()==''){

			$('#tag_id_err').html('ID is required!');
			err++;
			}else{
			$('#tag_id_err').html('');
			}

			count = $('.btnDelete').length;
			// alert(count)
				if (id.trim()!="") {
				j=0;

				for(i=0;i<=count;i++){

					var prd_id = $("#tag_id_get"+i).val();
					if(id == prd_id){

							Swal.fire({
								title:  'Error!',
								text:   'Please Check The Enter Tag ID is already exit... !',
								icon: 	'error',
								confirmButtonText: 'Okay'
								});
							$("#tag_id").val('');

						j=1;
						// cart_prd_cal(i);
					}
				}
			}
				if(j==0){

					if (id.trim()!='') {
								$.ajax({
									type: "POST",
									url: baseurl+'Jst_inventory/tag_add',
									async: false,
									type: "POST",
									data: "id="+id+"&count="+count,
									dataType: "html",
									success: function(response)
									{
										// alert(response)

										if (response.trim()!=1) {

											var res=response.split('||');
											// alert(response);
											id_refresh='';
											count= $('.btnDelete').length;
											if(count==0){
											$("#table_row").empty().append(res[1]);
											}
											else{
											$("#table_row").append(res[1]);
											}
											$("#tag_id").val(id_refresh);

										}else{

											Swal.fire({
												title:  'Error!',
												text:   'Please Check The Enter Tag ID is Invalid... !',
												icon: 	'error',
												confirmButtonText: 'Okay'
												});
											$("#tag_id").val('');
										}
										
									}
								});
								gold_count  = $('.gold_count').length;		
								silver_count= $('.silver_count').length;
							
								$("#gold_count").html(gold_count);
								$("#silver_count").html(silver_count);

								$("#gold_count1").val(gold_count);
								$("#silver_count1").val(silver_count);
								total_gold_weight=0;
								$('.tag_item').each(function() {				
										var $this = $(this),
						   			gold_weight = Number($this.find('.gold_weight').text());		     		  
						        total_gold_weight += gold_weight;
								});
								total_silver_weight=0;
									$('.tag_item').each(function() {										
										var $this = $(this),
							      silver_weight = Number($this.find('.gold_silver').text());		
									  total_silver_weight += silver_weight;
									});
								$("#total_gold_weight").html(total_gold_weight);
								$("#total_silver_weight").html(total_silver_weight);

								$("#total_gold_weight1").val(total_gold_weight);
								$("#total_silver_weight1").val(total_silver_weight);
						}

					}else{

						Swal.fire({
												title:  'Error!',
												text:   'Please Check The Enter Tag ID is already exit... !',
												icon: 	'error',
												confirmButtonText: 'Okay'
												});
											$("#tag_id").val('');
					}
				

		}
		

</script>
		<script>
			function send_via()
			{
				var send_via_dbox = document.getElementById("send_via_dbox").value;
				var others_label = document.getElementById('others_label');
				var others_tbox = document.getElementById('others_tbox');
				 if (send_via_dbox=="OTHERS") 
				  {
				  	others_label.style.display = "block";
				  	others_tbox.style.display = "block";
				  }
				  else
				  {
				  	others_label.style.display = "none";
				  	others_tbox.style.display = "none";
				  }
			}
		</script>
		<script>
		      $("#add_jst_tag_table").kendoTooltip({
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
			$("#add_jst_tag_table").DataTable({
				"sorting":false,
				// "paging": false,
				 "aaSorting":[],
				//"responsive": true,
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
			$('#add_jst_tag_table').wrap('<div class="dataTables_scroll" />');
		</script>
		<script>
		      $("#add_jst_nontag_table").kendoTooltip({
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
			$("#kt_datepicker_new_loan_date").flatpickr({
				dateFormat: "d-m-Y",
           		 maxDate: 'today',
			});
			$("#add_jst_nontag_table").DataTable({
				"sorting":false,
				// "paging": false,
				 "aaSorting":[],
				//"responsive": true,
				"iDisplayLength": "2500000000000",
				//  "language": {
				//   "lengthMenu": "Show _MENU_",
				//  },
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
			$('#add_jst_nontag_table').wrap('<div class="dataTables_scroll_1" />');
		</script>
	</body>
	<!--end::Body-->
</html>