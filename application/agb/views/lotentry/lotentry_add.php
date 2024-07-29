<?php $this->load->view("common");?>
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
/*   background-color: #ec9629;*/
		background-color: #ec9629 !important;
    z-index: 2;
  }
  #cheque_no_lt_add_label #down{
		  display: none;
			}
	#cheque_no_lt_add_label:hover #down{
	  display: block;
	  position: absolute;
	  margin-top: 0.2em;
	  margin-left: -0.7em !important;
	  color: white;
	  background: black;
	  padding: 3px 13px 3px 10px;
	  border-radius: 5px;
	  font-size: 14px;
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
											<form method="POST" autocomplete="off" action="<?php echo base_url(); ?>Lotentry/lotentry_save" enctype="multipart/form-data"  onsubmit="return lotentry_validation();">
											<!--begin::Heading-->
										
											<!--end::Heading-->
											<!-- <div class="row">
												<div class="col-lg-6"></div>
												<label class="col-lg-1 col-form-label fw-semibold fs-6">Cr</label>
											</div> -->
											<div class="row">
												<div class="col-lg-1">
													<label class="col-form-label required fw-semibold fs-6">Company</label>
												</div>
													<div class="col-lg-2 fv-row">
														<!--begin::Select-->
															<select class="form-select form-select-solid" data-control="select2" name="company_id"  id="company_id" data-hide-search="true">
																<option value="">Select</option>
																<?php foreach($company_list as $company_list)
																{?>
																<option value="<?php echo $company_list['COMPANYCODE'] ;?>"><?php echo $company_list['COMPANYNAME'];?></option><?php
																 }?>
															</select>
															<span class="fv-plugins-message-container invalid-feedback text-danger" id="company_id_err"></span>
															<!--<div class="fv-plugins-message-container invalid-feedback" id="company_id_err"></div>-->
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
														<input class="form-control form-control-solid ps-12" name="date" placeholder="Date"  id="kt_daterangepicker_lot_entry_add_date" value="<?php echo date("d-m-Y"); ?>" / >
														</div>
														<span class="fv-plugins-message-container invalid-feedback text-danger" id="date_err"></span>
													<div class="fv-plugins-message-container invalid-feedback" id="date_err"></div>
												</div>
												<label class="col-lg-1 col-form-label required fw-semibold fs-6">Supplier</label>
												<!--begin::Left Section-->
												<div class="col-lg-2 fv-row">
												<!--begin::Select-->
													<select class="form-select form-select-solid" data-control="select2" name="supplier_list_newpurchase"  id="supplier_list_newpurchase" data-hide-search="true">
														<option value="">Select</option>
														<?php foreach($suppliers_list as $supplierslist)
														{?>
														<option value="<?php echo $supplierslist['LEDGER_NAME'] ;?>"><?php echo $supplierslist['LEDGER_NAME'].'-cr-'.$supplierslist['credit'].'-dr-'.$supplierslist['debit'];?></option><?php
														 }?>
													</select>
													<!-- <label class="fw-semibold fs-6">
														<span class="me-2">OP.Bal</span>
														<span class="fw-bold text-success">88,88,888.00</span>
													</label> -->

													<!-- <label class="fw-semibold fs-6">
														<span class="me-2">OP.Bal</span>
														<span class="fw-bold text-danger">88,88,888.00</span>
													</label> -->
													<!--end::Select--><br>
													<span class="fv-plugins-message-container invalid-feedback text-danger" id="supplier_list_err"></span>
													<!--<div class="fv-plugins-message-container invalid-feedback" id="supplier_list_err"></div>-->
												</div>
												
												<!--end::Left Section-->
													<!-- <div class="col-lg-1 fv-row fv-plugins-icon-container">
														<input type="text" name="" class="form-control form-control-lg form-control-solid" placeholder="" value = "10000" style="background-color: lightgreen;">
														<div class="fv-plugins-message-container invalid-feedback"></div>
													</div> -->
												<label class="col-lg-1 col-form-label required fw-semibold fs-6">Metal</label>
												<div class="col-lg-1 fv-row">
													<select class="form-select form-select-solid" name="metal_new_purchase" data-control="select2" data-hide-search="true" id="item_type"  onchange="metal_type(this);" >
														<option value="">Select </option>
														<?php foreach($metal_type_list as $mtlist)
														{?>
														<option value="<?php echo $mtlist['jewel_type_id'] ;?>"><?php echo $mtlist['jewel_type'];?></option><?php
														 }?>
													</select>
													<span class="fv-plugins-message-container invalid-feedback text-danger" id="metal_type_err"></span>
													<input type="hidden" name="current_gold_rate" id="current_gold_rate" value="<?php echo $current_rate->GOLDRATE; ?>">
													<input type="hidden" name="current_silver_rate" id="current_silver_rate" value="<?php echo $current_rate->SILVERRATE; ?>">
												</div>

												<div class="col-lg-1">
													<div class="image-input mt-2 ms-3" data-kt-image-input="true"  
													style="background-image:url(<?php echo base_url();?>assets/media/svg/avatars/blank_jwl.svg);height: 30px!important; width: 30px!important;" id="get_capture_sel_image">
														<div class="image-input-wrapper w-40px h-40px" style="background-image: url(<?php echo base_url();?>assets/media/svg/avatars/blank_jwl.svg);" id="load_image_selected" >
														</div>
														<!--end::Preview existing avatar-->
														<!--begin::Label-->
														<label class="btn btn-icon btn-active-color-primary w-40px h-25px" data-kt-image-input-action="change" data-bs-toggle="tooltip" data-kt-initialized="1">
														<a href="#" class="menu-link flex-stack px-3" data-bs-toggle="modal" data-bs-target="#kt_modal_camera" tabindex="11"><i class="fa fa-camera ms-3" aria-hidden="true"></i></a>
															<!--begin::Inputs-->
															<input type="file" name="add_party_redemp" id="add_party_redemp" accept=".png, .jpg, .jpeg" >
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
												</div>
												<textarea hidden="hidden" name="inventory_jewel_image_data" id="inventory_jewel_image_data"></textarea>
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
											<span class="fv-plugins-message-container invalid-feedback text-danger" id="total_count_err"></span>
											

											<table class="table align-middle table-row-dashed table-striped table-hover fs-7 gy-1 gs-2 dataTable" id="add_tagentry_table">
												    <thead>
												        <tr class="text-start text-muted fw-bold fs-7 gs-0">
												            <th class="w-50px">Sno</th>
												            <th class="min-w-100px">Item Name</th>
												            <th class="min-w-25px">Count</th>
															<th class="min-w-200px">Quality</th>
															<th class="min-w-200px">Purity(%)</th>
												            <th class="min-w-50px">Weight(gms)</th>
															<th class="min-w-50px">Metal Wgt(gms)</th>
															<th class="min-w-100px">Amount</th>
															<th class="min-w-50px">Action</th>
												        </tr>
												    </thead>
												    <tbody class="text-gray-600 fw-semibold">
													<?php for($i=1;$i<=20;$i++) { ?>
												    	<tr>
												    		<td>
												            	<input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex" value="<?php echo $i; ?>" readonly>
												            </td>
												            <td>
																<select class="form-select form-select-solid" data-control="select2" data-hide-search="false" name="item_gold[]" id="item_gold<?php echo $i ?>" onclick="item_name(event);">	
																	<option value="">Select Item</option>
																	
																</select>
												            </td>
												        
												            <td>
													            <input type="text" class="form-control form-control-lg form-control-solid"  name="gold_count[]" onkeyup="gold_calculate1(<?php echo $i; ?>)" id="gold_count<?php echo $i;?>">
												            </td>
															  <td>
															  <select class="form-select form-select-solid" data-control="select2" data-hide-search="false" name="quality[]" id="quality<?php echo $i ?>"  onchange="item_purity(<?php echo $i;?>);">	
																	<option value="">Select Quality</option>
																	<?php foreach($purity_list as $plist){ ?>
																	<option value="<?php echo $plist['ITEMPURITYID']; ?>"><?php echo $plist['ITEMPURITYNAME']; ?></option>
																	
																	<?php } ?>
																</select> 
												            </td>
															<td>
													            <input type="text" class="form-control form-control-lg form-control-solid" value="0" name="gold_purity[]" id="gold_purity<?php echo $i; ?>" onkeyup="gold_calculate1(<?php echo $i; ?>)">
												            </td>
												            <td>
													            <input type="text" class="form-control form-control-lg form-control-solid" value="0" name="gold_weight[]" onkeyup="gold_calculate1(<?php echo $i; ?>)" id="gold_weight<?php echo $i;?>">
												            </td>
															<td>
													            <input type="text" class="form-control form-control-lg form-control-solid" value="0" name="pure_metal_weight[]"  id="pure_metal_weight<?php echo $i;?>" >
												            </td>
															<td>
													            <input type="text" class="form-control form-control-lg form-control-solid" value="0"  onkeyup="amt_calculate()" name="pure_metal_rate[]" id="pure_metal_rate<?php echo $i;?>" style="text-align:right">
												            </td>
															<td>

															<span class="svg-icon svg-icon-3" onclick="row_clear(<?php echo $i; ?>)">
																<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																	<path d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z" fill="currentColor"></path>
																	<path opacity="0.5" d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z" fill="currentColor"></path>
																	<path opacity="0.5" d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z" fill="currentColor"></path>
																</svg>
															</span>
															</td>
												    	</tr>
												    	<?php } ?>
												    </tbody>
													</table>
											<!-- <div style="padding: 5px 5px 5px 5px !important;box-shadow: 0 3px 6px #00002947;border-radius: 5px;background-color: #f5f5f1;"> -->
												<!--<label class="col-form-label fw-bold fs-6">Total Calculation</label>-->
												<div class="row">
													<div class="col-lg-1"></div>
													<label class="col-lg-1 col-form-label fw-semibold fs-6 ">Count</label>
													<label class="col-lg-1 col-form-label fw-bold fs-6 " name="total_count_1" id="total_count_1">0</label>
													<label class="col-lg-1 col-form-label fw-semibold fs-6">Pur.Avg %</label>
													<label class="col-lg-1 col-form-label fw-bold fs-6 " name="purity_avg_1" id="purity_avg_1">0</label>
													<label class="col-lg-1 col-form-label fw-semibold fs-6 ">Wgt</label>
													<label class="col-lg-1 col-form-label fw-bold fs-6 " name="total_weight_1" id="total_weight_1">0.000</label>
													<label class="col-lg-1 col-form-label fw-semibold fs-6 ">Met.Wgt</label>
													<label class="col-lg-1 col-form-label fw-bold fs-6 " name="pure_metal_weight_total_1" id="pure_metal_weight_total_1">0.000</label>
													<label class="col-lg-1 col-form-label fw-semibold fs-6 ">Amount</label>
													<label class="col-lg-1 col-form-label fw-bold fs-6 " name="pure_metal_rate_total_1" id="pure_metal_rate_total_1" style="text-align:right">0.00</label>
												</div>
												<div class="fv-plugins-message-container invalid-feedback text-danger text-end" id="total_count_err"></div>
												<input type="hidden" name="total_count" id="total_count" class="form-control form-control-lg form-control-solid" placeholder="Count" value="0">
												<input type="hidden" name="purity_avg" id="purity_avg" class="form-control form-control-lg form-control-solid" placeholder="Weight" value="0">
												<input type="hidden" name="total_weight" id="total_weight" class="form-control form-control-lg form-control-solid" placeholder="Weight" value="0">
												<input type="hidden" name="pure_metal_weight_total" id="pure_metal_weight_total" class="form-control form-control-lg form-control-solid" placeholder="Weight" value="0">
												<input type="hidden" name="pure_metal_rate_total" id="pure_metal_rate_total" class="form-control form-control-lg form-control-solid" placeholder="Weight" value="0">
											
											
												<!-- <div class="row">
												<label class="col-lg-1 col-form-label fw-semibold fs-6"></label>
													<label class="col-lg-1 col-form-label fw-semibold fs-6 "> Count</label>
													<div class="col-lg-1 fv-row fv-plugins-icon-container">
													
														<div class="fv-plugins-message-container invalid-feedback"></div>
													</div>

													<label class="col-lg-1 col-form-label fw-semibold fs-6">Purity Avg(%)</label>
													<div class="col-lg-1 fv-row fv-plugins-icon-container">
														
														<div class="fv-plugins-message-container invalid-feedback"></div>
													</div>

													<label class="col-lg-1 col-form-label fw-semibold fs-6"></label>
													<label class="col-lg-1 col-form-label fw-semibold fs-6"> Weight</label>
													<div class="col-lg-1 fv-row fv-plugins-icon-container">
														<input type="text" name="total_weight" id="total_weight" class="form-control form-control-lg form-control-solid" placeholder="Weight" value="0">
														<div class="fv-plugins-message-container invalid-feedback"></div>
													</div>
											
													<label class="col-lg-1 col-form-label fw-semibold fs-6">Metal Weight</label>
													<div class="col-lg-1 fv-row fv-plugins-icon-container">
													
														<div class="fv-plugins-message-container invalid-feedback"></div>
													</div>
													<label class="col-lg-1 col-form-label fw-semibold fs-6"> Amount</label>
													<div class="col-lg-1 fv-row fv-plugins-icon-container">
														
														<div class="fv-plugins-message-container invalid-feedback"></div>
													</div>
											</div> -->
											<br>
												<label class="col-form-label fw-bold fs-6">Payment Details</label>
												<div class="row">
							                          <label class="col-lg-1 col-form-label fw-semibold fs-6">Amount</label>
							                          <label class="col-lg-2 col-form-label fw-bold fs-4" name="t_amount_1" id="t_amount_1" style="text-align:right">0.00</label>
													  <input type="hidden" name="t_amount" id="t_amount" class="form-control form-control-lg form-control-solid" placeholder="charges" value="0" >
													<!-- <div class="col-lg-2 fv-row fv-plugins-icon-container">
														
														<div class="fv-plugins-message-container invalid-feedback"></div>
													</div>  --> 
													<label class="col-lg-1 col-form-label fw-semibold fs-6">Charges</label>
													<div class="col-lg-2 fv-row fv-plugins-icon-container">
														<input type="text" name="other_charges" id="other_charges" style="text-align:right" class="form-control form-control-lg form-control-solid" placeholder="charges" value="0" >
														<div class="fv-plugins-message-container invalid-feedback"></div>
													</div>
													<label class="col-lg-1 col-form-label fw-semibold fs-6">Amt To Pay</label>
													<label class="col-lg-2 col-form-label fw-bold fs-4" name="amount_pay_1" id="amount_pay_1" style="text-align:right">0.00</label>
													<input type="hidden" name="amount_pay" id="amount_pay" class="form-control form-control-lg form-control-solid" placeholder="charges" value="0" >
													<!-- <div class="col-lg-2 fv-row fv-plugins-icon-container">
													
														<div class="fv-plugins-message-container invalid-feedback"></div>
													</div> -->
						                        </div>
						                        <div class="row">
													<div class="col-lg-2 fv-row fv-plugins-icon-container fv-plugins-bootstrap5-row-invalid">
														<div class="d-flex align-items-center mt-1">
															<label class="form-check form-check-inline form-check-solid me-5 is-invalid">
																<input class="form-check-input" name="" type="checkbox" value="1" id="cash_lot_add_radio" onclick="cash_lt_add_radio()">
															</label>
															<label class="col-form-label fw-semibold fs-6 me-5">Cash</label>
														</div>
													</div>
													<div class="col-lg-2 fv-row fv-plugins-icon-container fv-plugins-bootstrap5-row-invalid">
														<div class="d-flex align-items-center mt-1">
															<label class="form-check form-check-inline form-check-solid me-5 is-invalid">
																<input class="form-check-input" name="" type="checkbox" value="1" id="cheque_lot_add_radio" onclick="cheque_lt_add_radio()">
															</label>
															<label class="col-form-label fw-semibold fs-6">Cheque</label>
														</div>
													</div>
													<div class="col-lg-2 fv-row fv-plugins-icon-container fv-plugins-bootstrap5-row-invalid">
														<div class="d-flex align-items-center mt-1">
															<label class="form-check form-check-inline form-check-solid me-5 is-invalid">
																<input class="form-check-input" name="" type="checkbox" value="1" id="rtgs_lot_add_radio" onclick="rtgs_lt_add_radio()">
															</label>
															<label class="col-form-label fw-semibold fs-6">RTGS</label>
														</div>
													</div>
													<div class="col-lg-2 fv-row fv-plugins-icon-container fv-plugins-bootstrap5-row-invalid">
														<div class="d-flex align-items-center mt-1">
															<label class="form-check form-check-inline form-check-solid me-5 is-invalid">
																<input class="form-check-input" name="" type="checkbox" value="1" id="metal_lot_add_radio" onclick="met_lt_add_radio()">
															</label>
															<label class="col-form-label fw-semibold fs-6">Metal</label>
														</div>
													</div>
												</div>
												<div class="row">
													<label class="col-lg-1 col-form-label fw-semibold fs-6" id="cash_lt_add_label" style="display:none;">Cash</label>
													<div class="col-lg-2 fv-row fv-plugins-icon-container" id="cash_lt_add_tbox" style="display:none;">
														<input type="text" class="form-control form-control-lg form-control-solid" name="cash_pay" id="cash_pay" placeholder="Cash Amount" value="0">
														<div class="fv-plugins-message-container invalid-feedback"></div>
													</div>
													<label class="col-lg-1 col-form-label fw-semibold fs-6" id="cash_detail_lt_add_label" style="display:none;">Detail</label>
													<div class="col-lg-2 fv-row fv-plugins-icon-container" id="cash_detail_lt_add_tbox" style="display:none;">
														<textarea class="form-control form-control-solid" rows="1" placeholder="Details" name="cash_detail" id="cash_detail"></textarea>
													</div>
												</div>
												<div class="row">
													<label class="col-lg-1 col-form-label fw-semibold fs-6" id="cheque_lt_add_label" style="display:none;">Cheque</label>
													<div class="col-lg-2 fv-row fv-plugins-icon-container" id="cheque_lt_add_tbox"  style="display:none;">
														<input type="text" name="cheq_pay" id="cheq_pay" class="form-control form-control-lg form-control-solid" placeholder="Cheque Amount" value="0" oninput="this.value = this.value.replace(/[^A-Za-z/0-9.]/g, '').replace(/(\..*)\./g, '$1');">
														<div class="fv-plugins-message-container invalid-feedback"></div>
													</div>
													<label class="col-lg-1 col-form-label fw-semibold fs-6" id="chq_bank_lt_add_label" style="display:none;">Bank</label>
													<div class="col-lg-2 fv-row fv-plugins-icon-container" id="chq_bank_lt_add_tbox"  style="display:none;">
														<select class="form-select form-select-solid" data-control="select2" name="bank_cheq" id="bank_cheq">	
														
														<option value="">Select Bank</option>
														<?php foreach($bankers_list as $bankslist)
														{?>
														<option value="<?php echo $bankslist['BANKNAME'] ;?>"><?php echo $bankslist['BANKNAME'];?></option><?php
														 }?>
														</select>
														<span class="fv-plugins-message-container invalid-feedback text-danger" id="bank_cheq_err"></span>
													</div>
													<label class="col-lg-1 col-form-label fw-semibold fs-6" id="cheque_no_lt_add_label" style="display:none;"> 
														    <span class="me-1">Cheq.no</span>
															<span  class="text-dark"><i class="fa fa-circle-info fs-7"></i></span>
															<span id="down">Ex:123456</span>
													</label>

													<div class="col-lg-2 fv-row fv-plugins-icon-container" id="cheque_no_lt_add_tbox"  style="display:none;">

														<input type="text" name="cheq_no" maxlength="14" minlength="12" id="cheq_no" class="form-control form-control-lg form-control-solid" placeholder="Cheque Number"  oninput="this.value = this.value.replace(/[^A-Za-z/0-9.]/g, '').replace(/(\..*)\./g, '$1');">
														<div class="fv-plugins-message-container invalid-feedback"></div>
														<span class="fv-plugins-message-container invalid-feedback text-danger" id="cheq_no_err"></span>
													</div>
													<label class="col-lg-1 col-form-label fw-semibold fs-6" id="cheque_detail_lt_add_label" style="display:none;">Detail</label>
													<div class="col-lg-2 fv-row fv-plugins-icon-container" id="cheque_detail_lt_add_tbox" style="display:none;">
														<textarea class="form-control form-control-solid" rows="1" placeholder="Details" name="cheque_detail" id="cheque_detail"></textarea>
													</div>
												</div>
												<div class="row">
													<label class="col-lg-1 col-form-label fw-semibold fs-6" id="rtgs_lt_add_label" style="display:none;">RTGS</label>
													<div class="col-lg-2 fv-row fv-plugins-icon-container" id="rtgs_lt_add_tbox" style="display:none;">
														<input type="text" name="rtgs_pay" id="rtgs_pay" class="form-control form-control-lg form-control-solid" placeholder="RTGS Amount" oninput="this.value = this.value.replace(/[^A-Za-z/0-9.]/g, '').replace(/(\..*)\./g, '$1');" value="0">
														<div class="fv-plugins-message-container invalid-feedback"></div>
													</div>
													<label class="col-lg-1 col-form-label fw-semibold fs-6" id="rtgs_bank_lt_add_label" style="display:none;">Bank</label>
													<div class="col-lg-2 fv-row fv-plugins-icon-container" id="rtgs_bank_lt_add_tbox"  style="display:none;">
														<select class="form-select form-select-solid" data-control="select2"  name="bank_rtgs" id="bank_rtgs">	
														
														<option value="">Select Bank</option>
														<?php foreach($bankers_list as $bankslist)
														{?>
														<option value="<?php echo $bankslist['BANKNAME'] ;?>"><?php echo $bankslist['BANKNAME'];?></option><?php
														 }?>
														</select>
														<span class="fv-plugins-message-container invalid-feedback text-danger" id="bank_rtgs_err"></span>
													</div>
													<label class="col-lg-1 col-form-label fw-semibold fs-6" id="rtgs_no_lt_add_label" style="display:none;">RTGS No</label>
													<div class="col-lg-2 fv-row fv-plugins-icon-container" id="rtgs_no_lt_add_tbox" style="display:none;">
														<input type="text" name="rtgs_trans" id="rtgs_trans" class="form-control form-control-lg form-control-solid" placeholder="RTGS Trans No" oninput="this.value = this.value.replace(/[^A-Za-z/0-9.]/g, '').replace(/(\..*)\./g, '$1');">
														<div class="fv-plugins-message-container invalid-feedback"></div>
														<span class="fv-plugins-message-container invalid-feedback text-danger" id="rtgs_trans_err"></span>
													</div>
													<label class="col-lg-1 col-form-label fw-semibold fs-6" id="rtgs_detail_lt_add_label" style="display:none;">Detail</label>
													<div class="col-lg-2 fv-row fv-plugins-icon-container" id="rtgs_detail_lt_add_tbox" style="display:none;">
														<textarea class="form-control form-control-solid" rows="1" placeholder="Details" name="rtgs_detail" id="rtgs_detail"></textarea>
													</div>
												</div>
												<div class="row">
													<label class="col-lg-1 col-form-label fw-semibold fs-6" id="metal_lt_add_label" style="display:none;">Metal</label>
													<div class="col-lg-2 fv-row fv-plugins-icon-container" id="metal_lt_add_tbox" style="display:none;">
														<!--<input type="text" name="" class="form-control form-control-lg form-control-solid" placeholder="Metal" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">-->
														<select class="form-select form-select-solid" name="metal" data-control="select2" data-hide-search="true" id="metal" >
														<option value="" selected>Select Type</option>
														<?php foreach($metal_type_list as $mtlist)
														{?>
														<option value="<?php echo $mtlist['jewel_type_id'] ;?>"><?php echo $mtlist['jewel_type'];?></option><?php
														 }?>
													</select>
														<div class="fv-plugins-message-container invalid-feedback"></div>
													</div>
                        							<label class="col-lg-1 col-form-label fw-semibold fs-6" id="purity_lt_add_label" style="display:none;"> Quality</label>
													<div class="col-lg-2 fv-row fv-plugins-icon-container" id="purity_lt_add_tbox" style="display:none;">
													<!--	<input type="text" name="purity_pay" id="purity_pay" class="form-control form-control-lg form-control-solid" placeholder="Metal Purity" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">-->
														<select class="form-select form-select-solid" data-control="select2" data-hide-search="false" name="purity_pay" id="purity_pay" onchange="metal_rate_calc1()">	
														<option value="" selected>Select Purity</option>	
														
														<?php foreach($purity_list as $plist){   ?>			
														<option value="<?php echo $plist['PERCENTAGE'];  ?>"><?php echo $plist['ITEMPURITYNAME'];  ?></option>
														<?php  } ?>
													</select>
													<span class="fv-plugins-message-container invalid-feedback text-danger" id="purity_pay_err"></span>
														<div class="fv-plugins-message-container invalid-feedback"></div>
													</div>
													<label class="col-lg-1 col-form-label fw-semibold fs-6" id="pur_lt_add_label" style="display:none;">Purity</label>
													<div class="col-lg-2 fv-row fv-plugins-icon-container" id="pur_lt_add_tbox" style="display:none;">
														<input type="text" name="pur_met" id="pur_met" class="form-control form-control-lg form-control-solid" placeholder="Purity" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" onkeyup="metal_rate_calc()">
														<div class="fv-plugins-message-container invalid-feedback"></div>
														<span class="fv-plugins-message-container invalid-feedback text-danger" id="rate_pay_err"></span>
													</div>
													<label class="col-lg-1 col-form-label fw-semibold fs-6" id="wgt_lt_add_label" style="display:none;">Wgt(gms)</label>
													<div class="col-lg-2 fv-row fv-plugins-icon-container" id="wgt_lt_add_tbox" style="display:none;">
														<input type="text" name="rate_pay" id="rate_pay" value="0" class="form-control form-control-lg form-control-solid" placeholder="Metal Weight" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" onkeyup="metal_rate_calc()">
														<div class="fv-plugins-message-container invalid-feedback"></div>
														<span class="fv-plugins-message-container invalid-feedback text-danger" id="rate_pay_err"></span>
													</div>
													<label class="col-lg-1 col-form-label fw-semibold fs-6" id="metal_wgt_lt_add_label" style="display:none;">Metal Wgt(gms)</label>
													<div class="col-lg-2 fv-row fv-plugins-icon-container" id="metal_wgt_lt_add_tbox" style="display:none;">
														<input type="text" name="met_wgt" id="met_wgt" value="0" class="form-control form-control-lg form-control-solid" placeholder="Metal Weight" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" onkeyup="metal_rate_calc()">
														<div class="fv-plugins-message-container invalid-feedback"></div>
														<span class="fv-plugins-message-container invalid-feedback text-danger" id="rate_pay_err"></span>
													</div>
													<label class="col-lg-1 col-form-label fw-semibold fs-6" id="mtamt_lt_add_label"  style="display:none;">Metal Amt</label>
													<div class="col-lg-2 fv-row fv-plugins-icon-container" id="mtamt_lt_add_tbox"  style="display:none;">
														<input type="text" name="metal_pay" id="metal_pay" value="0" class="form-control form-control-lg form-control-solid" placeholder="Metal Amount" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
														<div class="fv-plugins-message-container invalid-feedback"></div>
														<span class="fv-plugins-message-container invalid-feedback text-danger" id="metal_pay_err"></span>
													</div>
												</div>
												<div class="row mt-4">
													<div class="col-lg-4 d-flex justify-content-center align-items-center">
														<label class="col-form-label fw-semibold fs-6">Total Amt &emsp;</label>
														<label class="col-form-label fw-bold fs-2" id="total_amount" style="text-align:right">0.00</label>
														<input type="hidden" id="total_amount1" name="total_amount">
													</div>
													<div class="col-lg-4 d-flex justify-content-center align-items-center">
														<label class="col-form-label fw-semibold fs-6">Paid Amount &emsp;</label>
														<label class="col-form-label fw-bold fs-2" id="paid_amount_pay" style="text-align:right">0.00</label>
														<input type="hidden" id="paid_amount_pay1" name="paid_amount_pay">
													</div>
													<div class="col-lg-4 d-flex justify-content-center align-items-center">
														<label class="col-form-label fw-semibold fs-6">Balance Amount &emsp;</label>
														<label class="col-form-label fw-bold fs-2" id="bal_amount" style="text-align:right">0.00</label>
														<input type="hidden" id="bal_amount1" name="bal_amount" >
													</div>
													<div class="col-lg-4 d-flex justify-content-center align-items-center">
														<label class="col-form-label fw-semibold fs-6">Opening Bal. &emsp;</label>
														<label class="col-form-label fw-bold fs-2">0.00</label>
														<input type="hidden" id="" name="">
													</div>
													<div class="col-lg-4 d-flex justify-content-center align-items-center">
														<label class="col-form-label fw-semibold fs-6">Closing Bal. &emsp;</label>
														<label class="col-form-label fw-bold fs-2">0.00</label>
														<input type="hidden" id="" name="">
													</div>
												</div>
											<!-- </div> -->
												
												<!-- <div class="row">
													<label class="col-lg-2 col-form-label required fw-semibold fs-6">Attended By</label>
													<label class="col-lg-1 col-form-label fw-semibold fs-6">Esakki</label>
											
												</div> -->

												<div class="d-flex justify-content-end">
													<button type="reset" class="btn btn-secondary me-3" data-bs-dismiss="modal">Cancel</button>
													<button type="submit" class="btn btn-primary" id="save_changes_add_product">Save Changes</button>
												</div>
												<!-- <div class="row">
													<div class="col-lg-8"></div>
													<div class="col-lg-1">
														<div class="d-flex flex-center flex-row-fluid pt-12">
															
														</div>
													</div>
													<div class="col-lg-2">
														<div class="d-flex flex-center flex-row-fluid pt-12">
													</div>
													</div>
												</div> -->
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
										<div type="submit" id="img_submit" class="btn btn-primary" onclick="put_capture_jewel_photo()" >Submit</div>
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
		<!--end::Modal - view capture image for loan-->

			</div>
			<!--end::Content-->
			<?php $this->load->view("footer");?>
		</div>
		<!--end::Wrapper-->
	</div>
	<!--end::Page-->
</div>
</div>
<!--end::Root-->
<input type="hidden" id="baseurl" value="<?php echo base_url();?>">
<?php $this->load->view("script");?>
<!-- **************************************************Script***************************************************************** -->
<script>
function row_clear(i)
{
	
	// alert(i);
	$('#quality'+i).val('');
	// $("#quality option:selected").val();
	$('#item_gold'+i).val('');
	 metal_type()
	
	$('#pure_metal_rate'+i).val(0);
	$('#pure_metal_weight'+i).val(0);
	$('#gold_weight'+i).val(0);
	$('#gold_purity'+i).val(0);
	$('#gold_count'+i).val(0);

	gold_calculate1(i);

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
		    	var cnt=Number($("#img_count").val());
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

		    	var img_data=$('#'+sel_id+'_data').val();
		    	
		    	document.getElementById('load_image_selected').innerHTML='<img src="'+img_data+'" id="loan_jewel_photo" name="loan_jewel_photo" height="30" width="30" />';
				// alert(img_data);
				document.getElementById('inventory_jewel_image_data').innerHTML=img_data;
		    	
				$('#kt_modal_camera').hide();
		    	$('.modal-backdrop').hide();
				var $body = $(document.body);
				$body.css("overflow", "auto");
				$body.width("auto");
				document.getElementById('other_charges').focus();

		    }		    
		</script>
<!-- Payment for supplier Start -->

		<script>
			function cash_lt_add_radio()
			{
				var cash_lot_add_radio = document.getElementById("cash_lot_add_radio");

				var cash_lt_add_label = document.getElementById("cash_lt_add_label");
				var cash_lt_add_tbox = document.getElementById("cash_lt_add_tbox");
				var cash_detail_lt_add_label = document.getElementById("cash_detail_lt_add_label");
				var cash_detail_lt_add_tbox = document.getElementById("cash_detail_lt_add_tbox");

				if (cash_lot_add_radio.checked)
				{
				    cash_lt_add_label.style.display = "block";
				    cash_lt_add_tbox.style.display = "block";
				    cash_detail_lt_add_label.style.display = "block";
				    cash_detail_lt_add_tbox.style.display = "block";
			  	} else 
			  	{
			  		cash_lt_add_label.style.display = "none";
				    cash_lt_add_tbox.style.display = "none";
				    cash_detail_lt_add_label.style.display = "none";
				    cash_detail_lt_add_tbox.style.display = "none";
			  	}
			};

			function cheque_lt_add_radio()
			{
				var cheque_lot_add_radio = document.getElementById("cheque_lot_add_radio");

				var cheque_lt_add_label = document.getElementById("cheque_lt_add_label");
				var cheque_lt_add_tbox = document.getElementById("cheque_lt_add_tbox");
				var chq_bank_lt_add_label = document.getElementById("chq_bank_lt_add_label");
				var chq_bank_lt_add_tbox = document.getElementById("chq_bank_lt_add_tbox");
				var cheque_no_lt_add_label = document.getElementById("cheque_no_lt_add_label");
				var cheque_no_lt_add_tbox = document.getElementById("cheque_no_lt_add_tbox");
				var cheque_detail_lt_add_label = document.getElementById("cheque_detail_lt_add_label");
				var cheque_detail_lt_add_tbox = document.getElementById("cheque_detail_lt_add_tbox");
				

				if (cheque_lot_add_radio.checked)
				{
				    cheque_lt_add_label.style.display = "block";
				    cheque_lt_add_tbox.style.display = "block";
				    chq_bank_lt_add_label.style.display = "block";
				    chq_bank_lt_add_tbox.style.display = "block";
				    cheque_no_lt_add_label.style.display = "block";
				    cheque_no_lt_add_tbox.style.display = "block";
				    cheque_detail_lt_add_label.style.display = "block";
				    cheque_detail_lt_add_tbox.style.display = "block";
			  	} else 
			  	{
			     	cheque_lt_add_label.style.display = "none";
				    cheque_lt_add_tbox.style.display = "none";
				    chq_bank_lt_add_label.style.display = "none";
				    chq_bank_lt_add_tbox.style.display = "none";
				    cheque_no_lt_add_label.style.display = "none";
				    cheque_no_lt_add_tbox.style.display = "none";
				    cheque_detail_lt_add_label.style.display = "none";
				    cheque_detail_lt_add_tbox.style.display = "none";
			  	}
			};

			
			function rtgs_lt_add_radio()
			{
				var rtgs_lot_add_radio = document.getElementById("rtgs_lot_add_radio");

				var rtgs_lt_add_label = document.getElementById("rtgs_lt_add_label");
				var rtgs_lt_add_tbox = document.getElementById("rtgs_lt_add_tbox");
				var rtgs_bank_lt_add_label = document.getElementById("rtgs_bank_lt_add_label");
				var rtgs_bank_lt_add_tbox = document.getElementById("rtgs_bank_lt_add_tbox");
				var rtgs_no_lt_add_label = document.getElementById("rtgs_no_lt_add_label");
				var rtgs_no_lt_add_tbox = document.getElementById("rtgs_no_lt_add_tbox");
				var rtgs_detail_lt_add_label = document.getElementById("rtgs_detail_lt_add_label");
				var rtgs_detail_lt_add_tbox = document.getElementById("rtgs_detail_lt_add_tbox");

				if (rtgs_lot_add_radio.checked == true)
				{
				    rtgs_lt_add_label.style.display = "block";
				    rtgs_lt_add_tbox.style.display = "block";
				    rtgs_bank_lt_add_label.style.display = "block";
				    rtgs_bank_lt_add_tbox.style.display = "block";
				    rtgs_no_lt_add_label.style.display = "block";
				    rtgs_no_lt_add_tbox.style.display = "block";
				    rtgs_detail_lt_add_label.style.display = "block";
				    rtgs_detail_lt_add_tbox.style.display = "block";
			  	} else 
			  	{
			     	rtgs_lt_add_label.style.display = "none";
				    rtgs_lt_add_tbox.style.display = "none";
				   	rtgs_bank_lt_add_label.style.display = "none";
				    rtgs_bank_lt_add_tbox.style.display = "none";
				    rtgs_no_lt_add_label.style.display = "none";
				    rtgs_no_lt_add_tbox.style.display = "none";
				    rtgs_detail_lt_add_label.style.display = "none";
				    rtgs_detail_lt_add_tbox.style.display = "none";
			  	}
			};

			function met_lt_add_radio()
			{
				var metal_lot_add_radio = document.getElementById("metal_lot_add_radio");

				var metal_lt_add_label = document.getElementById("metal_lt_add_label");
				var metal_lt_add_tbox = document.getElementById("metal_lt_add_tbox");
				var purity_lt_add_label = document.getElementById("purity_lt_add_label");
				var purity_lt_add_tbox = document.getElementById("purity_lt_add_tbox");
				var pur_lt_add_label = document.getElementById("pur_lt_add_label");
				var wgt_lt_add_label = document.getElementById("wgt_lt_add_label");
				var pur_lt_add_tbox = document.getElementById("pur_lt_add_tbox");
				var wgt_lt_add_tbox = document.getElementById("wgt_lt_add_tbox");
				var metal_wgt_lt_add_label = document.getElementById("metal_wgt_lt_add_label");
				var metal_wgt_lt_add_tbox = document.getElementById("metal_wgt_lt_add_tbox");
				var mtamt_lt_add_label = document.getElementById("mtamt_lt_add_label");
				var mtamt_lt_add_tbox = document.getElementById("mtamt_lt_add_tbox");
				

				if (metal_lot_add_radio.checked == true)
				{
				    metal_lt_add_label.style.display = "block";
				    metal_lt_add_tbox.style.display = "block";
				    purity_lt_add_label.style.display = "block";
				    purity_lt_add_tbox.style.display = "block";
				    pur_lt_add_label.style.display = "block";
				    wgt_lt_add_label.style.display = "block";
					pur_lt_add_tbox.style.display = "block";
				    wgt_lt_add_tbox.style.display = "block";
					metal_wgt_lt_add_label.style.display = "block";
				    metal_wgt_lt_add_tbox.style.display = "block";
				    mtamt_lt_add_label.style.display = "block";
				    mtamt_lt_add_tbox.style.display = "block";
			  	} else 
			  	{
			     	metal_lt_add_label.style.display = "none";
				    metal_lt_add_tbox.style.display = "none";
				    purity_lt_add_label.style.display = "none";
				    purity_lt_add_tbox.style.display = "none";
					pur_lt_add_label.style.display = "none";
				    wgt_lt_add_label.style.display = "none";
					pur_lt_add_tbox.style.display = "none";
				    wgt_lt_add_tbox.style.display = "none";
				    metal_wgt_lt_add_label.style.display = "none";
				    metal_wgt_lt_add_tbox.style.display = "none";
				    mtamt_lt_add_label.style.display = "none";
				    mtamt_lt_add_tbox.style.display = "none";
			  	}
			};
		</script>
		<!-- Payment for supplier End -->
		<script>
			function metal_rate_calc1(){
				var metal   = $('#metal').val();
				var purity  = $('#purity_pay').val();
				var weight  = $('#rate_pay').val();
				metal_weight= parseFloat(weight)*parseFloat(purity)/100;
				$('#pur_met').val(purity);
			}
		</script>
		<script>
		function metal_rate_calc(){
			var metal = $('#metal').val();
			var purity = $('#pur_met').val();
			var weight = $('#rate_pay').val();
			var current_gold_rate = $('#current_gold_rate').val();
		 	var current_silver_rate = $('#current_silver_rate').val();
			metal_weight=parseFloat(weight)*parseFloat(purity)/100;
			if(metal==1){
				metal_amt=parseFloat(current_gold_rate)*parseFloat(metal_weight);
			}
			else{
				metal_amt=parseFloat(current_silver_rate)*parseFloat(metal_weight);
			}
			$('#met_wgt').val(metal_weight.toFixed(3));
			$('#metal_pay').val(metal_amt.toFixed(2));
	        var cheq_pay = $('#cheq_pay').val();
			var rtgs_pay = $('#rtgs_pay').val();
			var cash_pay = $('#cash_pay').val();
			var amt      = $('#amount_pay').val();
			var tot_amt  = parseFloat(cash_pay)+parseFloat(cheq_pay)+parseFloat(rtgs_pay)+parseFloat(metal_amt);
			var bal      = parseFloat(amt) - parseFloat(tot_amt);
// alert(tot_amt);
		if (bal < 0) {

					alert("Please Check The Enter Amount is Exceed");

				    $('#cheq_pay').val('0');
				    $('#rtgs_pay').val('0');
				    $('#cash_pay').val('0');
				   
				    $('#paid_amount_pay').html('0');
				    $('#total_amount').html('0');
				    $('#bal_amount').html('0');
				    $('#label_paid_amount').html('0');
				}
		else{
		$('#total_amount').html(amt);
		$('#paid_amount_pay').html(tot_amt.toFixed(2));
		$('#bal_amount').html(bal.toFixed(2));

		$('#total_amount1').val(amt);
		$('#paid_amount_pay1').val(tot_amt.toFixed(2));
		$('#bal_amount1').val(bal.toFixed(2));

		}
}
function lotentry_validation(){
	var err = 0;
	var company_id = $('#company_id').val();
	var date = $('#kt_daterangepicker_lot_entry_add_date').val();
	var supplier_list_newpurchase = $('#supplier_list_newpurchase').val();
	var cheq_pay = $('#cheq_pay').val();
	var bank_cheq = $('#bank_cheq').val();
	var cheq_no = $('#cheq_no').val();
	var item_type = $('#item_type').val();
	var rtgs_pay = $('#rtgs_pay').val();
	var bank_rtgs = $('#bank_rtgs').val();
	var rtgs_trans = $('#rtgs_trans').val();
	
	var purity_pay = $('#purity_pay').val();
	var rate_pay = $('#rate_pay').val();
	var metal_pay = $('#metal_pay').val();
	
	if(company_id.trim()==''){
                $('#company_id_err').html('company is required!');
                err++;
            }else{
                $('#company_id_err').html('');
            }
	if(date.trim()==''){
                $('#date_err').html('date is required!');
                err++;
            }else{
                $('#date_err').html('');
            }
			

			if(supplier_list_newpurchase.trim()==''){
                $('#supplier_list_err').html('supplier is required!');
                err++;
            }else{
                $('#supplier_list_err').html('');
            }

			if(item_type.trim()==''){
                $('#metal_type_err').html('metal type is required!');
                err++;
            }else{
                $('#metal_type_err').html('');
            }
			if(parseFloat(cheq_pay)>0){
			if(bank_cheq.trim()==''){
                $('#bank_cheq_err').html('cheq bank is required!');
                err++;
            }else{
                $('#bank_cheq_err').html('');
            }
			if(cheq_no.trim()==''){
                $('#cheq_no_err').html('cheq number is required!');
                err++;
            }else{
                $('#cheq_no_err').html('');

            }
			var length=cheq_no.length;
			
			if(parseInt(length)!='6'){
				
                $('#cheq_no_err').html('cheq number is not correct format!');
                err++;
            }
			


		}
		if(parseFloat(rtgs_pay)>0){
			if(bank_rtgs.trim()==''){
                $('#bank_rtgs_err').html('RTGS bank is required!');
                err++;
            }else{
                $('#bank_rtgs_err').html('');
            }
			if(rtgs_trans.trim()==''){
                $('#rtgs_trans_err').html('RTGS trans is required!');
                err++;
            }else{
                $('#rtgs_trans_err').html('');
            }
			var length=rtgs_trans.length;
			
			if(parseInt(length)!='11'){
				
                $('#rtgs_trans_err').html('RTGS trans is not correct format!');
                err++;
            }
		}
		var metal = $('#metal').val();
		if(metal.trim()!=''){
			if(purity_pay.trim()==''){
                $('#purity_pay_err').html('RTGS bank is required!');
                err++;
            }else{
                $('#purity_pay_err').html('');
            }
			if(rate_pay.trim()==''){
                $('#rate_pay_err').html('RTGS trans is required!');
                err++;
            }else{
                $('#rate_pay_err').html('');
            }
			if(metal_pay.trim()==''){
                $('#metal_pay_err').html('RTGS trans is required!');
                err++;
            }else{
                $('#metal_pay_err').html('');
            }
			}

		var total_count = $('#total_count').val();
		var total_weight = $('#total_weight').val();
		if(total_count > 0 && total_weight >0){

		}
		else{
			$('#total_count_err').html('Minimum one item add!');
			err++;
		}

			if(err>0){ return false; }else{ return true; }

		}

			$("#add_tagentry_table").DataTable({
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
			$('#add_tagentry_table').wrap('<div class="dataTables_scroll" />');
		</script>
		
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
								dateFormat: "<?php echo $format; ?>",
								maxDate: "today",
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
            return parseFloat(a)+parseFloat(b);
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
		$('#total_count_1').html(sum1);
		$('#total_weight').val(sum2);
		$('#total_weight_1').html(sum2);

		var item_val = 0;

		if($('#item_type').val()=='Gold'){

			item_val = 4563;


		}else if($('#item_type').val()=='Silver'){

			item_val = 57;


		}

		//alert(item_val);

	//	$('#amount_pay').val(sum2*item_val);
		//t_amount = sum2*item_val; 
		
	 }
	 function amt_calculate(){
		
		var tot_amount=0;
		for(var i=1; i<=20; i++){
		var pure_metal_rate=$('#pure_metal_rate'+i).val();
		 tot_amount += parseFloat(pure_metal_rate);
		}
		
		$('#pure_metal_rate_total').val(tot_amount.toFixed(2));
		$('#pure_metal_rate_total_1').html(IND_money_format(tot_amount.toFixed(2)));
// $('#pure_metal_weight_total').val(pmw_total);
$('#t_amount').val(tot_amount.toFixed(2));
$('#t_amount_1').html(IND_money_format(tot_amount.toFixed(2)));
$('#amount_pay').val(tot_amount.toFixed(2));
		$('#amount_pay_1').html(IND_money_format(tot_amount.toFixed(2)));


	 }

	 function gold_calculate1(j){


 var count = [];
 var weight = [];

 var gold_weight = $('#gold_weight'+j).val();
 var gold_purity = $('#gold_purity'+j).val();

 var current_gold_rate = $('#current_gold_rate').val();
 var current_silver_rate = $('#current_silver_rate').val();
 var item_type=$('#item_type').val();

 metal_weight=parseFloat(gold_weight)*parseFloat(gold_purity)/100;
//  pure_metal_rate=parseFloat(metal_weight)*parseFloat(gold_purity);
 $('#pure_metal_weight'+j).val(metal_weight.toFixed(3));
 if(item_type=='1'){
	pure_metal_rate=parseFloat(metal_weight).toFixed(2)*parseFloat(current_gold_rate).toFixed(2);
  }
  else{
	pure_metal_rate=parseFloat(metal_weight).toFixed(2)*parseFloat(current_silver_rate).toFixed(2);
  }
  $('#pure_metal_rate'+j).val(pure_metal_rate.toFixed(2));

  var tot_purity=0; var j=0;
		for(var i=1; i<=20;i++){

var purity=$('#gold_purity'+i).val();
var item=$('#item_gold'+i).val();
if(purity!='0'){
if(item!=''){

tot_purity += parseFloat(purity);
j++;
} }
		}
		var avg=parseFloat(tot_purity)/parseInt(j);
$('#purity_avg').val(avg);
$('#purity_avg_1').html(avg);
// alert(avg)
//  alert(item_type);
var pmr_total=0; var pmw_total=0;
 for(let i=1; i<=20; i++){

	 var variable1 = 'gold_count'+i;
	 var variable2 = 'gold_weight'+i;

	var value1 = $('#gold_count'+i).val();
	var value2 = $('#gold_weight'+i).val();
	var pmw = $('#pure_metal_weight'+i).val();
	var pmr = $('#pure_metal_rate'+i).val();
	
	 pmr_total += parseFloat(pmr);
	 pmw_total += parseFloat(pmw);
count.push(value1);
//console.log(count);

 weight.push(value2);
// console.log(weight);

}
//alert(pmr_total);
var myArrayNew = count.filter(function (el) {
return el != " " && el != "";
  });


var sum1 = myArrayNew.reduce(function(a, b){
	return parseInt(a)+parseInt(b);
}, 0);


   var myArray = weight.filter(function (el) {
return el != " " && el != "";
  });



var sum2 = myArray.reduce(function(a, b){
	return parseFloat(a)+parseFloat(b);
}, 0);


$('#total_count').val(sum1);
$('#total_count_1').html(sum1);
$('#total_weight').val(sum2.toFixed(3));
$('#total_weight_1').html(sum2.toFixed(3));
$('#pure_metal_rate_total').val(pmr_total);
$('#pure_metal_rate_total_1').html(IND_money_format(pmr_total));
$('#pure_metal_weight_total').val(pmw_total.toFixed(3));
$('#pure_metal_weight_total_1').html(pmw_total.toFixed(3));
$('#t_amount').val(pmr_total);
$('#t_amount_1').html(IND_money_format(pmr_total));
$('#amount_pay').val(pmr_total);
		$('#amount_pay_1').html(IND_money_format(pmr_total));


var item_val = 0;

if($('#item_type').val()=='Gold'){

	item_val = 4563;


}else if($('#item_type').val()=='Silver'){

	item_val = 57;


}

}
</script>


<script>
function metal_type(){

        var aid = $('#item_type').val()
        var baseurl= $("#baseurl").val();
         // alert(aid);
        $.ajax({
        type: "POST",
        url: baseurl+'Lotentry/get_item',
        async: false,
        type: "POST",
        data: "typeid="+aid,
        dataType: "html",
        success: function(response)
        {
			for(i=1;i<=20;i++){
            $('#item_gold'+i).empty().append(response);
			}
       
        }
        });
    }

	function item_purity(i){
		
        var aid = $('#quality'+i).val()
		//alert(aid);
		if(aid!=''){
        var baseurl= $("#baseurl").val();
         // alert(aid);
        $.ajax({
        type: "POST",
        url: baseurl+'Lotentry/get_purity',
        async: false,
        type: "POST",
        data: "typeid="+aid,
        dataType: "html",
        success: function(response)
        {
			
        $('#gold_purity'+i).val(parseFloat(response));
			       
        }
	
        }); }
		else{
			$('#gold_purity'+i).val(0);
		}
var tot_purity=0; var j=0;
		for(var i=1; i<=20;i++){

var purity=$('#gold_purity'+i).val();
var item=$('#item_gold'+i).val();
if(purity!='0'){
if(item!=''){

tot_purity += parseFloat(purity);
j++;
} }
		}
var avg=parseFloat(tot_purity)/parseInt(j);
$('#purity_avg').val(avg);
$('#purity_avg_1').html(avg);
    }


	$('#other_charges').on('input',function(event){

		//alert(event.target.value);
		var value = event.target.value;
		var t_amount=$('#t_amount').val();
		
		$('#amount_pay').val(parseFloat(t_amount)+parseFloat(value));
		$('#amount_pay_1').html(IND_money_format(parseFloat(t_amount)+parseFloat(value)));

	});
	$('#t_amount').on('input',function(event){

//alert(event.target.value);
var value = event.target.value;
var other_charges=$('#other_charges').val();
$('#amount_pay').val(parseFloat(other_charges)+parseFloat(value));
$('#amount_pay_1').html(IND_money_format((parseFloat(other_charges)+parseFloat(value))));

});


	$('#cash_pay').on('input',function(event){


		//alert(event.target.value);
		var value = event.target.value;
		var cheq_pay = $('#cheq_pay').val();
		var rtgs_pay = $('#rtgs_pay').val();
		var metal_pay = $('#metal_pay').val();
		var amt = $('#amount_pay').val();
		
		var tot_amt = parseFloat(value)+parseFloat(cheq_pay)+parseFloat(rtgs_pay)+parseFloat(metal_pay);
		var bal = amt - tot_amt;

		if (bal < 0) {

					alert("Please Check The Enter Amount is Exceed");

				    $('#cheq_pay').val('0');
				    $('#rtgs_pay').val('0');
				    $('#cash_pay').val('0');
				   
				    $('#paid_amount_pay').html(0);
				    $('#total_amount').html('0');
				    $('#bal_amount').html('0');
				    $('#label_paid_amount').html('0');
				}else{

					$('#total_amount').html(IND_money_format(amt));
					$('#paid_amount_pay').html(IND_money_format(tot_amt));
					$('#bal_amount').html(IND_money_format(bal));

					$('#total_amount1').val(amt);
					$('#paid_amount_pay1').val(tot_amt);
					$('#bal_amount1').val(bal);
				}
		


	});

		$('#cheq_pay').on('input',function(event){


		//alert("test");

		//alert(event.target.value);
		var value = event.target.value;
		var cash_pay = $('#cash_pay').val();
		var rtgs_pay = $('#rtgs_pay').val();
		var metal_pay = $('#metal_pay').val();
		var amt = $('#amount_pay').val();
		var tot_amt = parseFloat(value)+parseFloat(cash_pay)+parseFloat(rtgs_pay)+parseFloat(metal_pay);
		var bal = amt - tot_amt;
		if (bal < 0) {

					alert("Please Check The Enter Amount is Exceed");

				    $('#cheq_pay').val('0');
				    $('#rtgs_pay').val('0');
				    $('#cash_pay').val('0');
				   
				    $('#paid_amount_pay').html('0');
				    $('#total_amount').html('0');
				    $('#bal_amount').html('0');
				    $('#label_paid_amount').html('0');
				}
				else{
		$('#total_amount').html(IND_money_format(amt));
		$('#paid_amount_pay').html(IND_money_format(tot_amt));
		$('#bal_amount').html(IND_money_format(bal));

		$('#total_amount1').val(amt);
		$('#paid_amount_pay1').val(tot_amt);
		$('#bal_amount1').val(bal);

	}
	});
	function IND_money_format(x) {
    return x.toString().split('.')[0].length > 3 ? x.toString().substring(0,x.toString().split('.')[0].length-3).replace(/\B(?=(\d{2})+(?!\d))/g, ",") + "," + x.toString().substring(x.toString().split('.')[0].length-3): x.toString();
}

		$('#rtgs_pay').on('input',function(event){

			//alert("test");

		//alert(event.target.value);
		var value = event.target.value;
		var cash_pay = $('#cash_pay').val();
		var cheq_pay = $('#cheq_pay').val();
		var metal_pay = $('#metal_pay').val();
		var amt = $('#amount_pay').val();
		var tot_amt = parseFloat(value)+parseFloat(cash_pay)+parseFloat(cheq_pay)+parseFloat(metal_pay);
		var bal = amt - tot_amt;
		if (bal < 0) {

					alert("Please Check The Enter Amount is Exceed");

				    $('#cheq_pay').val('0');
				    $('#rtgs_pay').val('0');
				    $('#cash_pay').val('0');
				   
				    $('#paid_amount_pay').html('0');
				    $('#total_amount').html('0');
				    $('#bal_amount').html('0');

				    $('#total_amount1').val(0);
					$('#paid_amount_pay1').val(0);
					$('#bal_amount1').val(0);
				}else{
		$('#total_amount').html(IND_money_format(amt));
		$('#paid_amount_pay').html(IND_money_format(tot_amt));
		$('#bal_amount').html(IND_money_format(bal));

		$('#total_amount1').val(amt);
		$('#paid_amount_pay1').val(tot_amt);
		$('#bal_amount1').val(bal);

}
	});
	$('#metal_pay').on('input',function(event){

//alert("test");

//alert(event.target.value);
var value = event.target.value;
var cash_pay = $('#cash_pay').val();
var cheq_pay = $('#cheq_pay').val();
var rtgs_pay = $('#rtgs_pay').val();
var amt = $('#amount_pay').val();
var tot_amt = parseFloat(value)+parseFloat(cash_pay)+parseFloat(cheq_pay)+parseFloat(rtgs_pay);
var bal = amt - tot_amt;
if (bal < 0) {

					alert("Please Check The Enter Amount is Exceed");

				    $('#cheq_pay').val('0');
				    $('#rtgs_pay').val('0');
				    $('#cash_pay').val('0');
				   
				    $('#paid_amount_pay').html('0');
				    $('#total_amount').html('0');
				    $('#bal_amount').html('0');

				    $('#total_amount1').val(0);
					$('#paid_amount_pay1').val(0);
					$('#bal_amount1').val(0);
				}

$('#total_amount').html(IND_money_format(amt));
$('#paid_amount_pay').html(IND_money_format(tot_amt));
$('#bal_amount').html(IND_money_format(bal));

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
		$('#total_count_1').html(sum1);
		$('#total_weight').val(sum2);
		$('#total_weight_1').html(sum2);
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
	<script>
				$("#kt_daterangepicker_lot_entry_add_date").flatpickr({
					dateFormat: "d-m-Y",
				});
		</script>
	</body>