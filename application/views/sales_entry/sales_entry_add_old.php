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
   .vertical {
    border-left: 1.9px solid black;
    height: 160px;
    /*position:absolute;*/
    /*left: 33.33333333333333%;*/
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
									<h1 class="d-flex align-items-center text-dark fw-bold my-1 fs-3">Sales Entry
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
<form action="<?php echo base_url(); ?>Sales_entry/sales_entry_save" method="post" enctype="multipart/form-data" onsubmit="return salesentry_validation();"> 
										<!--begin::Card body-->
										<div class="card-body py-4">
											<!--begin::Heading-->
									
											<!--end::Heading-->
											<!-- <div class="row">
												<div class="col-lg-6"></div>
												<label class="col-lg-1 col-form-label fw-semibold fs-6">Cr</label>
											</div> -->


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
																<input class="form-control form-control-solid ps-12"  name="date" placeholder="Date" id="date" value="<?php echo date("Y-m-d"); ?>" />
															</div>
														</div>
														<label class="col-lg-2 col-form-label fw-semibold fs-6">Party </label>
														<div class="col-lg-4 fv-row fv-plugins-icon-container">
														<input type="text" name="first_name" class="form-control form-control-lg1 form-control-solid" placeholder="Party Name" id="first_name" oninput="this.value = this.value.replace(/[^A-Za-z. ]/g, '').replace(/(\..*)\./g, '$1');"  >
														<input type="hidden" name="first_name_id_hidden" id="first_name_id_hidden" value="">
																	
															<div class="fv-plugins-message-container invalid-feedback"></div>
														</div>
														<label class="col-lg-2 col-form-label fw-semibold fs-6">Company</label>
														<div class="col-lg-10 fv-row fv-plugins-icon-container">
															<select class="form-select form-select-solid" name="company_id"  id="company_id" data-control="select2" data-hide-search="true">	
															<option value="">Select</option>
														<?php foreach($company_list as $company_list)
														{?>
														<option value="<?php echo $company_list['COMPANYCODE'] ;?>"><?php echo $company_list['COMPANYNAME'];?></option><?php
														 }?>
															</select>
															<span class="m-form__help text-danger" id="company_id_err"></span>
															</div>
														<label class="col-lg-6 col-form-label fw-bold fs-6"><i class="fa fa-address-card fs-6" aria-hidden="true" title="Card No"></i>&emsp;1234-5678-9123-1234
															<i class="fas fa-times-circle fs-5" style="color:red;"></i>
															<!-- <i class="fas fa-check-circle fs-5" style="color:#50cd89;"></i> -->
														</label>
														<div class="col-lg-2">
															<div class="btn btn-sm btn-outline btn-outline-solid btn-outline-warning btn-active-light-primary me-2" data-bs-toggle="modal" data-bs-target="#kt_modal_verify_membership_card">Verify</div>
														</div>
														<label class="col-lg-2 col-form-label fw-bold fs-6" name="" id="" ><span style="background-color:#FFAA00;border-radius: 8px;padding: 5px 15px 5px 15px;">Gold</span></label>
														<label class="col-lg-2 col-form-label fw-bold fs-6" name="" id=""><i class="fa-solid fa-coins fs-6" title="Points"></i>&emsp;10052</label>

														<label class="col-lg-3 col-form-label fw-bold fs-6 text-underlined">Current Rate </label>
														<!-- <label class="col-lg-1 col-form-label fw-semibold fs-6">Gold : </label> -->
														<label class="col-lg-4 col-form-label fw-bold fs-6">
															<i class="fa fa-sack-dollar"></i>&emsp; 4563.00 (Per Gram)</label>
														<!-- <label class="col-lg-1 col-form-label fw-semibold fs-6">Silver : </label> -->
														<label class="col-lg-4 col-form-label fw-bold fs-6"><i class="fa fa-ring"></i>&emsp; 57.53 (Per Gram)</label>
													</div>
												</div>
												<div class="col-lg-4">
													<div class="row">
														<label class="col-lg-12 col-form-label fw-bold fs-6" name="" id="">
														<i class="fa fa-user fs-6" aria-hidden="true" title="Last Name"></i>&emsp;<span name="last_name" id="last_name"></span></label>
														<label class="col-lg-12 col-form-label fw-bold fs-6" name="" id="">
															<i class="fa-solid fa-location-dot fs-6" aria-hidden="true" title="Address"></i>
														&emsp;<span name="address" id="address"></span></label>
														<label class="col-lg-12 col-form-label fw-bold fs-6" name="" id="">
																<i class="fas fa-mobile-android-alt fs-6" aria-hidden="true" title="Mobile"></i>
															&emsp;<span name="mobile" id="mobile"></span></label>
															<span name="rating" id="rating"><i class="fa-solid fa-star" style="color:#50cd89;"></i>&nbsp;Good</span>
													</div>
												</div>
												<div class="col-lg-2">
													<!--begin::Image input-->
													<div class="image-input image-input-outline" data-kt-image-input="true">
														<!--begin::Preview existing avatar-->
														<div class="image-input-wrapper w-125px h-125px" style="background-image: url(<?php echo base_url(); ?>assets/images/sample.jpg)"></div>
														<!--end::Preview existing avatar-->
													</div>
													<!--end::Image input-->
													<!--begin::Hint-->
													<div class="form-text"></div>
												</div>
											</div>





														
														
													
											
											<!-- <div class="separator separator-content border-dark my-6"><span class="w-125px fw-bold fs-4">Item List</span></div> -->
											<!-- <div class="d-flex justify-content-end">
												<button type="submit" class="btn btn-sm btn-outline btn-outline-solid btn-outline-warning btn-active-light-primary mt-9 me-2">Calculate</button>
											</div> -->
											<div class="accordion" id="kt_accordion_item_list">
											    <div class="accordion-item">
											        <h2 class="accordion-header" id="kt_accordion_item_list_header_1">
											            <button class="accordion-button fw-bold fs-6 collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#kt_accordion_item_list_body_1" aria-expanded="false" aria-controls="kt_accordion_item_list_body_1">
											            Item List &emsp; - &emsp; Count &emsp;<span id="sales_item_count" name="sales_item_count"> 0</span > &emsp; - &emsp; Total Amount &emsp;<span id="sales_total1" name="sales_total1"> 0.00</span>
											            </button>
														<input type="hidden" id="sales_item_count_1" name="sales_item_count_1">
											            <!-- <div class="d-flex justify-content-end">
											            	<label class="col-form-label fw-bold fs-5 me-6">Count :<span >&emsp; 0</span></label>
											            	<label class="col-form-label fw-bold fs-5 me-3">Total Amount :<span >&emsp; 0.00</span></label>
											            </div> -->
											        </h2>
											        <div id="kt_accordion_item_list_body_1" class="accordion-collapse collapse" aria-labelledby="kt_accordion_item_list_header_1" data-bs-parent="#kt_accordion_item_list">
											            <div class="accordion-body">
											           	  <table class="table align-middle table-row-dashed table-striped table-hover fs-7 gy-1 gs-2 dataTable" id="add_salesentry_table">
															    <thead>
															     <!-- style=" background-color: #A7D3F0 !important;border: 1px solid #606060 !important;color: black !important;"> -->
															        <tr class="text-start text-muted fw-bold fs-7 gs-0">
															            <th class="w-50px">Sno</th>
															            <th class="min-w-100px">Tag No</th>
															            <th class="min-w-100px">Item Name</th>
															            <th class="w-200px">Sub Item</th>
															            <th class="w-50px">Img</th>
															            <th class="min-w-25px">Quality</th>
																		<th class="min-w-25px">Purity</th>
															            <th class="min-w-50px">Wgt(gms)</th>
																		<th class="min-w-50px">St Wgt(gms)</th>
																		<th class="min-w-50px">Net Wgt(gms)</th>
																		<th class="min-w-50px">HC Amt</th>
																		<th class="min-w-50px">MC Amt</th>
																		<th class="min-w-50px">WC Amt(%)</th>
																		<th class="min-w-50px">Metal wgt(gms)</th>
															            <th class="min-w-50px">Amount</th>
															        </tr>
															    </thead>
															    <tbody class="text-gray-600 fw-semibold">
															    <?php  for($i=0;$i<20;$i++){ ?>
																<tr>
															    		<td><?php echo $i+1; ?></td>
															            <td>
															            	<select class="form-select form-select-solid" data-control="select2" data-hide-search="false" name="tag_no[]" id="tag_no<?php echo $i; ?>" onchange="get_tag_detail(<?php echo $i; ?>);">	
																				<option value="">Select Tag No</option>
																			<?php foreach($tagentry_list as $tlist){ ?>
                                                                                <option value="<?php echo $tlist['tag_id']; ?>"><?php echo $tlist['tag_id']; ?></option>
																				<?php } ?>
																				</select>
																            <!-- <input type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex" value="TG-0001/23"> -->
															            </td>
															            <td class="ple1">
																		<input type="text" class="form-control_tex form-control-lg_tex form-control-solid" value="" name="item[]" id="item<?php echo $i ?>" readonly>
																	<input type="hidden" name="sales_type[]" id="sales_type<?php echo $i; ?>"  value="">
																	<input type="hidden" name="current_gold_rate" id="current_gold_rate" value="<?php echo $current_rate->GOLDRATE; ?>">
												                    <input type="hidden" name="current_silver_rate" id="current_silver_rate" value="<?php echo $current_rate->SILVERRATE; ?>">
																		</td>
															            <td class="ple1"><input type="text" class="form-control_tex form-control-lg_tex form-control-solid" value="" name="subitem[]" id="subitem<?php echo $i ?>" readonly></td>
															            <td>
															            	<div class="image-input mt-2" data-kt-image-input="true">
																				<div class="image-input-wrapper w-40px h-40px" style="background-image: url(<?php echo base_url(); ?>assets/images/sample_jewel.jpg)"></div>
																				<!--end::Preview existing avatar-->
																			</div>
															            
																	<input type="hidden" name="img[]"	id="img<?php echo $i; ?> " value="" >
																		</td>
															            <td><input type="text" class="form-control_tex form-control-lg_tex  " value="0" name="quality[]" id="quality<?php echo $i ?>" style="border: 0px solid;" readonly></td>
																		<td><input type="text" class="form-control_tex form-control-lg_tex  " value="0" name="purity[]" id="purity<?php echo $i ?>" style="border: 0px solid;" readonly></td>
															            <td><input type="text" class="form-control_tex form-control-lg_tex " value="0" name="weight[]" id="weight<?php echo $i ?>" readonly></td>
																		<td><input type="text" class="form-control_tex form-control-lg_tex " value="0" name="st_wgt[]" id="st_wgt<?php echo $i ?>" readonly></td>
																		<td><input type="text" class="form-control_tex form-control-lg_tex " value="0" name="net_wgt[]" id="net_wgt<?php echo $i ?>" readonly></td>
															            <td>
															            	<input type="text" class="form-control_tex form-control-lg_tex " value="0" name="hc_amt[]" id="hc_amt<?php echo $i ?>" readonly>
															            </td>
																		<td>
															            	<input type="text" class="form-control_tex form-control-lg_tex " value="0" name="mc_amt[]" id="mc_amt<?php echo $i ?>" readonly>
															            </td>
																		<td>
															            	<input type="text" class="form-control_tex form-control-lg_tex " value="0" name="wc_amt[]" id="wc_amt<?php echo $i ?>" readonly>
															            </td>
																		<td>
															            	<input type="text" class="form-control_tex form-control-lg_tex " value="0" name="metal_weight[]" id="metal_weight<?php echo $i ?>" readonly>
															            </td>
															            <td><input type="text" class="form-control form-control-lg form-control-solid" value="0.00" name="sales_amt[]" id="sales_amt<?php echo $i ?>" onkeyup="sales_total()"></td>
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
											            <!-- <div class="d-flex justify-content-end">
											            	<label class="col-form-label fw-bold fs-5 me-6">Count :<span>&emsp; 1</span></label>
											            	<label class="col-form-label fw-bold fs-5 me-3">Total Amount :&emsp;<span> 44521.00</span></label>
											            </div> -->
											        </h2>
											        <div id="kt_accordion_old_jewel_exchange_body_2" class="accordion-collapse collapse" aria-labelledby="kt_accordion_old_jewel_exchange_header_2" data-bs-parent="#kt_accordion_old_jewel_exchange">
											            <div class="accordion-body">
											           	  <table class="table align-middle table-row-dashed table-striped table-hover fs-7 gy-1 gs-2 dataTable" id="add_oldjewel_entry_table">
															    <thead>
															     <!-- style=" background-color: #A7D3F0 !important;border: 1px solid #606060 !important;color: black !important;"> -->
															        <tr class="text-start text-muted fw-bold fs-7 gs-0">
															            <th class="min-w-25px">Sno</th>
															            <th class="min-w-150px">Item Type</th>
															            <th class="min-w-150px">Item Name</th>
															            <th class="min-w-150px">Sub Item</th>
															            <th class="min-w-50px">Quality</th>
																		<th class="min-w-50px">Purity</th>
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
															            	<select class="form-select form-select-solid" data-control="select2" data-hide-search="false" id="oge_item_type<?php echo $j; ?>" name="oge_item_type[]" onchange="get_item_old(<?php echo $j; ?>)">	
																			<option value="">Select </option>
														<?php foreach($metal_type_list as $mtlist)
														{?>
														<option value="<?php echo $mtlist['jewel_type_id'] ;?>"><?php echo $mtlist['jewel_type'];?></option><?php
														 }?>
																				
																			</select>
															            </td>
															            <td>
															            	<select class="form-select form-select-solid" data-control="select2" data-hide-search="false" id="oge_item<?php echo $j; ?>" name="oge_item[]" onchange="get_subitem_old(<?php echo $j; ?>)">	
																				<option value="">Item Name</option>
																				
																			</select>
															            </td>
															            <td>
															            	<select class="form-select form-select-solid" data-control="select2" data-hide-search="false" id="oge_subitem<?php echo $j; ?>" name="oge_subitem[]">	
																				<option value="">Sub Item Name</option>
																			
																			</select>
															            </td>
															            <td>
															            	<!--<input type="text" class="form-control form-control-lg form-control-solid" value="" id="oge_purity<?php echo $j; ?>" name="oge_quality[]">-->
															            	<select class="form-select form-select-solid" data-control="select2" data-hide-search="false" id="oge_quality<?php echo $j; ?>" name="oge_quality[]" onchange="item_purity(<?php echo $j;?>);">	
																				<option value="">Select Purity</option>
																				<?php foreach($purity_list as $plist){   ?>			
																					<option value="<?php echo $plist['ITEMPURITYID'];  ?>"><?php echo $plist['ITEMPURITYNAME'] ; ?></option>
																					<?php  } ?>
																			</select>
																		
															            </td>
															            <td>
															            	<input type="text" class="form-control form-control-lg form-control-solid" value="" id="oge_purity<?php echo $j; ?>" name="oge_purity[]" >

															            	
															            </td>
																		<td>
															            	<input type="text" class="form-control form-control-lg form-control-solid" value="0" id="oge_weight<?php echo $j; ?>" name="oge_weight[]" onkeyup="oge_net_weight(<?php echo $j; ?>)">

															            	
															            </td>
															            <td>
															            	<input type="text" class="form-control form-control-lg form-control-solid" value="0" id="oge_st_weight<?php echo $j; ?>" name="oge_st_weight[]" onkeyup="oge_net_weight(<?php echo $j; ?>)">

															            	
															            </td>
															            <td>
															            	<input type="text" class="form-control form-control-lg form-control-solid" value="0" id="oge_less<?php echo $j; ?>" name="oge_less[]" onkeyup="oge_net_weight(<?php echo $j; ?>)">

															            	
															            </td>
															            <td>
															            	<input type="text" class="form-control form-control-lg form-control-solid" value="0" id="oge_net_weight<?php echo $j; ?>" name="oge_net_weight[]" onkeyup="oge_weight()">

															            
															            </td>
															            <td>
															            	
																		<div class="image-input mt-2" data-kt-image-input="true">
																				<div class="image-input-wrapper w-40px h-40px" style="background-image: url(<?php echo base_url(); ?>assets/media/svg/avatars/blank_jwl.svg)"></div>
																				<!--end::Preview existing avatar-->
																				<!--begin::Label-->
																				<label class="btn btn-icon btn-active-color-primary w-40px h-25px" data-kt-image-input-action="change" data-bs-toggle="tooltip" data-kt-initialized="1">
																					<i class="bi bi-pencil-fill fs-8 ms-3"></i>
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
															            </td>
															            <td>
															            	<input type="text" class="form-control form-control-lg form-control-solid" value="0"  id="oge_est_amount<?php echo $j; ?>" name="oge_est_amount[]" onkeyup="oge_total()">

															            	
															            </td>
															    	</tr>
																	<?php } ?>
															    	
															    </tbody>
															</table>
											            </div>
											        </div>
											    </div>
											</div><br>
										
											<!-- <div class="separator separator-content border-dark my-6"><span class="w-200px fw-bold fs-4">Total Calculation</span></div> -->
											<div class="row mt-2">
												<div class="col-lg-6">
													<div class="px-6" style="border:1.9px solid black;border-radius: 10px;">
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
																	<td class="col-lg-3"><span name="sales_gold_count" id="sales_gold_count">  0</span></td>
																	<td class="col-lg-4"><span name="sales_gold_weight" id="sales_gold_weight">  0</span></td>
																	<td class="col-lg-3"><span name="sales_gold_amount" id="sales_gold_amount">  0</span></td>
																	<input type="hidden" id="sales_gold_count_1" name="sales_gold_count_1">
																	<input type="hidden" id="sales_gold_weight_1" name="sales_gold_weight_1">
																	<input type="hidden" id="sales_gold_amount_1" name="sales_gold_amount_1">
																	<input type="hidden" id="sales_silver_count_1" name="sales_silver_count_1">
																	<input type="hidden" id="sales_silver_weight_1" name="sales_silver_weight_1">
																	<input type="hidden" id="sales_silver_amount_1" name="sales_silver_amount_1">
																
																	<input type="hidden" id="oge_gold_count_1" name="oge_gold_count_1">
																	<input type="hidden" id="oge_gold_weight_1" name="oge_gold_weight_1">
																	<input type="hidden" id="oge_gold_amount_1" name="oge_gold_amount_1">
																	<input type="hidden" id="oge_silver_count_1" name="oge_silver_count_1">
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
																	<td class="col-lg-3"><span name="sales_silver_count" id="sales_silver_count">  0</span></td>
																	<td class="col-lg-4"><span name="sales_silver_weight" id="sales_silver_weight">  0</span></td>
																	<td class="col-lg-3"><span name="sales_silver_amount" id="sales_silver_amount">  0</span></td>
																</tr>
															</tbody>
														</table>
														<div class="col-lg-12 d-flex justify-content-center align-items-center">
															<label class="col-form-label fw-semibold fs-6">Total Amount &nbsp;</label>
															<label class="col-form-label fw-bold fs-3"><span id="sales_total" name="sales_total" >0.00</span></label>
															<input type="hidden"  id="sales_total_1" name="sales_total_1">
														</div>
													</div>
												</div>
												<div class="col-lg-6">
													<div class="px-6" style="border:1.9px solid black;border-radius: 10px;">
														<label class="col-lg-12 col-form-label fw-bold fs-6 text-center">Old Gold Exchange</label>
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
																	<td class="col-lg-3"><span name="oge_gold_count" id="oge_gold_count">  0</span></td>
																	<td class="col-lg-4"><span name="oge_gold_weight" id="oge_gold_weight">  0</span></td>
																	<td class="col-lg-3"><span name="oge_gold_total" id="oge_gold_total">  0</span></td>
																</tr>
																<tr>
																	<td class="col-lg-3">Silver</td>
																	<td class="col-lg-3"><span name="oge_silver_count" id="oge_silver_count">  0</span></td>
																	<td class="col-lg-4"><span name="oge_silver_weight" id="oge_silver_weight">  0</span></td>
																	<td class="col-lg-3"><span name="oge_silver_total" id="oge_silver_total">  0</span></td>
																</tr>
															</tbody>
														</table>
														<div class="col-lg-12 d-flex justify-content-center align-items-center">
															<label class="col-form-label fw-semibold fs-6">Total Amount &nbsp;</label>
															<label class="col-form-label fw-bold fs-3"><span id="oge_total" name="oge_total" >0.00</span></label>
															<input type="hidden"  id="oge_total_1" name="oge_total_1">
															</div>
													</div>
												</div>
												
											</div>
											<div class="d-flex justify-content-center">
												<label class="col-form-label fw-bold fs-1">Net Payable &emsp;- </label>
												<label class="col-form-label fw-bold fs-1">&emsp;<span id="net_payable1" name="net_payable1">0.00</span></label>
											</div>
											<div class="row">
												<label class="col-form-label fw-bold fs-5">Party Payment Details</label>
												<label class="col-lg-1 col-form-label fw-semibold fs-6" id="cash_lt_ey_label">Cash</label>
												<div class="col-lg-2 fv-row fv-plugins-icon-container" id="cash_lt_ey_tbox">
													<input type="text" class="form-control form-control-lg form-control-solid" placeholder="Amount" name="cash_amt" id="cash_amt" value="0" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
													<div class="fv-plugins-message-container invalid-feedback"></div>
												</div>
											</div>
											<div class="row">
												<label class="col-lg-1 col-form-label fw-semibold fs-6" id="cheque_lt_ey_label">Cheque</label>
												<div class="col-lg-2 fv-row fv-plugins-icon-container" id="cheque_lt_ey_tbox" >
													<input type="text"  class="form-control form-control-lg form-control-solid" placeholder="Amount" value="0" name="cheque_amt" id="cheque_amt" oninput="this.value = this.value.replace(/[^A-Za-z/0-9.]/g, '').replace(/(\..*)\./g, '$1');">
													<div class="fv-plugins-message-container invalid-feedback"></div>
												</div>
												<label class="col-lg-1 col-form-label fw-semibold fs-6" id="bank_lt_ey_label">Bank</label>
												<div class="col-lg-2 fv-row fv-plugins-icon-container" id="bank_lt_ey_tbox" >
													<select class="form-select form-select-solid" data-control="select2" data-placeholder="Select Bank" name="cheque_bank" id="cheque_bank">

														<option value="">Select</option>
														<option value="1">SBI</option>				
														<option value="2">TMB</option>
														<option value="3">IOB</option>
														<option value="4">CUB</option>
														<option value="4">KVB</option>
														<option value="4">IB</option>
													</select>
													<span class="m-form__help text-danger" id="cheque_bank_err"></span>
												</div>
												<label class="col-lg-1 col-form-label fw-semibold fs-6" id="cheque_lt_ey_label">Cheque no</label>
												<div class="col-lg-2 fv-row fv-plugins-icon-container" id="cheque_lt_ey_tbox" >
													<input type="text" class="form-control form-control-lg form-control-solid" placeholder="Cheque Number" name="cheque_no" id="cheque_no" oninput="this.value = this.value.replace(/[^A-Za-z/0-9.]/g, '').replace(/(\..*)\./g, '$1');">
													<span class="m-form__help text-danger" id="cheque_no_err"></span>
													<div class="fv-plugins-message-container invalid-feedback"></div>
												</div>
												<label class="col-lg-1 col-form-label fw-semibold fs-6" id="cheque_lt_ey_label">Details</label>
												<div class="col-lg-2 fv-row fv-plugins-icon-container" id="cheque_lt_ey_tbox" >
													<textarea class="form-control form-control-solid" rows="1" placeholder="Details" name="" id=""></textarea>
													<!-- <input type="text" name="" class="form-control form-control-lg form-control-solid" placeholder="Details" name="cheque_details" id="cheque_details" oninput="this.value = this.value.replace(/[^A-Za-z/0-9.]/g, '').replace(/(\..*)\./g, '$1');">
													<span class="m-form__help text-danger" id="cheque_details_err"></span>
													<div class="fv-plugins-message-container invalid-feedback"></div> -->
												</div>
											</div>
											<div class="row">
												<label class="col-lg-1 col-form-label fw-semibold fs-6" id="rtgs_lt_ey_label">RTGS</label>
												<div class="col-lg-2 fv-row fv-plugins-icon-container" id="rtgs_lt_ey_tbox">
													<input type="text" class="form-control form-control-lg form-control-solid" value="0" placeholder="Amount" name="rtgs_amt" id="rtgs_amt" oninput="this.value = this.value.replace(/[^A-Za-z/0-9.]/g, '').replace(/(\..*)\./g, '$1');">
													<div class="fv-plugins-message-container invalid-feedback"></div>
												</div>
												<label class="col-lg-1 col-form-label fw-semibold fs-6" id="bank_lt_ey_label">Bank</label>
												<div class="col-lg-2 fv-row fv-plugins-icon-container" id="bank_lt_ey_tbox" >
													<select class="form-select form-select-solid" data-control="select2"  data-placeholder="Select Bank" name="rtgs_bank" id="rtgs_bank">
														<option value="">Select</option>	
														<option value="1">SBI</option>				
														<option value="2">TMB</option>
														<option value="3">IOB</option>
														<option value="4">CUB</option>
														<option value="4">KVB</option>
														<option value="4">IB</option>
													</select>
													<span class="m-form__help text-danger" id="rtgs_bank_err"></span>
												</div>
												<label class="col-lg-1 col-form-label fw-semibold fs-6" id="bank_lt_ey_label">RTGS No</label>
												<div class="col-lg-2 fv-row fv-plugins-icon-container" id="rtgs_lt_ey_tbox">
													<input type="text"  class="form-control form-control-lg form-control-solid" placeholder="RTGS Trans No" name="rtgs_no" id="rtgs_no" oninput="this.value = this.value.replace(/[^A-Za-z/0-9.]/g, '').replace(/(\..*)\./g, '$1');">
													<span class="m-form__help text-danger" id="rtgs_no_err"></span>
													<div class="fv-plugins-message-container invalid-feedback"></div>
												</div>
												<label class="col-lg-1 col-form-label fw-semibold fs-6" id="">Details</label>
												<div class="col-lg-2 fv-row fv-plugins-icon-container" id="" >
													<textarea class="form-control form-control-solid" rows="1" placeholder="Details" name="rtgs_details" id="rtgs_details"></textarea>
													<!-- <input type="text" name="" class="form-control form-control-lg form-control-solid" placeholder="Details" oninput="this.value = this.value.replace(/[^A-Za-z/0-9.]/g, '').replace(/(\..*)\./g, '$1');">
													<div class="fv-plugins-message-container invalid-feedback"></div> -->
												</div>
											</div>
											<div class="row">
												<label class="col-lg-1 col-form-label fw-semibold fs-6" id="">UPI</label>
												<div class="col-lg-2 fv-row fv-plugins-icon-container" id="" >
													<input type="text"  class="form-control form-control-lg form-control-solid" value="0" placeholder="Amount" name="upi_amt" id="upi_amt">
													<div class="fv-plugins-message-container invalid-feedback"></div>
												</div>
												<label class="col-lg-1 col-form-label fw-semibold fs-6" id="">Trans No</label>
												<div class="col-lg-2 fv-row fv-plugins-icon-container" id="" >
													<input type="text"  class="form-control form-control-lg form-control-solid" placeholder="Transaction No" name="upi_trans_no" id="upi_trans_no">
													<span class="m-form__help text-danger" id="upi_trans_no_err"></span>
													<div class="fv-plugins-message-container invalid-feedback"></div>
												</div>
												<label class="col-lg-1 col-form-label fw-semibold fs-6" id="">Details</label>
												<div class="col-lg-2 fv-row fv-plugins-icon-container" id="" >
													<textarea class="form-control form-control-solid" rows="1" placeholder="Details" name="upi_details" id="upi_details"></textarea>
												</div>
											</div>
											<div class="row">
												<label class="col-lg-1 col-form-label fw-semibold fs-6">Net Payable</label>
												<label class="col-lg-2 col-form-label fw-bold fs-2" id="net_payable" name="net_payable">0.00</label>
												<input type="hidden" name="net_payable_1" id="net_payable_1">
												<label class="col-lg-1 col-form-label fw-semibold fs-6">Paid Amount</label>
												<label class="col-lg-2 col-form-label fw-bold fs-2" id="paid_amount" >0.00</label>
												<input type="hidden" name="" id="">
												<input type="hidden" id="paid_amount_1" name="paid_amount_1">
												<label class="col-lg-1 col-form-label fw-semibold fs-6">Balance Amount</label>
												<label class="col-lg-2 col-form-label fw-bold fs-2" id="balance_amount" name="balance_amount">0.00</label>
												<input type="hidden" name="balance_amount_1" id="balance_amount_1">
												<div class="col-lg-3">
													<label class="form-check form-check-inline form-check-solid is-invalid py-5">
														<input class="form-check-input" name="" type="checkbox" id="">
														<span class="col-form-label fw-semibold fs-6">Add to Credit</span>
													</label>
												</div>
												<div class="row">
												<label class="col-lg-1 col-form-label fw-semibold fs-6">Customer Rating</label>
												<div class="col-lg-2 fv-row fv-plugins-icon-container">
																<select class="form-select form-select-solid" data-control="select2" data-hide-search="true" name="add_ptyname_new_loan" id="add_ptyname_new_loan">
																	<option value="">Select Rating</option>
																	<option value="916">Good</option>
																	<option value="NKM">Average</option>
																	<option value="STG">Bad</option>
																</select>
															</div>
															<label class="col-lg-1 col-form-label fw-semibold fs-6">M.Points Add</label>
															<div class="col-lg-2 fv-row fv-plugins-icon-container">
																<input type="text" name="m_points_ad" id="m_points_ad" class="form-control form-control-lg1 form-control-solid" value="0">
																<div class="fv-plugins-message-container invalid-feedback"></div>
															</div>
												</div>

												<!-- <label class="col-lg-2 col-form-label fw-semibold fs-6">Add to Credit</label> -->
													<!-- <span class="col-form-label fw-semibold fs-6">Add to Credit</span> -->
												<!-- </div> -->
											</div>
											<!-- <div class="d-flex justify-content-end">
												<label class="form-check form-check-inline form-check-solid is-invalid py-3">
													<input class="form-check-input" name="" type="checkbox" id="">
												</label>
												<span class="col-form-label fw-semibold fs-6">Add to Credit</span>
											</div> -->
											<div class="d-flex justify-content-end">
												<button type="reset" class="btn btn-secondary me-3" data-bs-dismiss="modal">Cancel</button>
												<button type="submit" class="btn btn-primary" id="">Pay Now</button>
											</div>
											<!-- <div class="row">
												<div class="col-lg-9"></div>
												<div class="col-lg-1">
													<div class="d-flex flex-center flex-row-fluid pt-12">
														<button type="reset" class="btn btn-secondary me-3" data-bs-dismiss="modal">Cancel</button>
													</div>
												</div>
												<div class="col-lg-2">
													<div class="d-flex flex-center flex-row-fluid pt-12">
														<button type="submit" class="btn btn-primary" id="save_changes_add_product">Pay Now</button>
													</div>
												</div>
											</div> -->
											<!--end::Actions-->
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
						<span style="background-color:#50cd89;border-radius: 8px;padding: 5px 15px 5px 15px;">Verifying...</span> 
						<!--<span style="background-color:#50cd89;border-radius: 8px;padding: 5px 15px 5px 15px;">Matched...</span>-->
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
</form>
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
		<input type="hidden" id="baseurl" value="<?php echo base_url(); ?>">
		<script src="<?php echo base_url();?>assets/jquery.autocomplete.js"></script>
		
<script>
	
</script>
<!-- <script src="js/products-list.js"></script> -->
<script>
var baseurl = $("#baseurl").val();

$("#first_name").autocomplete({ 
	
	                valueKey:'title',
					
	                source:[{
	                url:baseurl+'Sales_entry/userList?query=%QUERY%',
	                type:'remote',
	                ajax:{
	                  dataType : 'json',
	                }
	            }]}).on('selected.xdsoft',function(e,suggestion,ui){ 
	                $("#first_name").val(suggestion.firstname);
					
	                $("#last_name").html(suggestion.lastname);
	                // if(suggestion.rating==1){
	                // 	r='<i class="fa-solid fa-star" style="color:red;"></i>&nbsp;Bad';	
	                // }
	                // else if(suggestion.rating==2){
	                // 	r='<i class="fa-solid fa-star" style="color:#ffc700;"></i>&nbsp;Average';	
	                // }
	                // else if(suggestion.rating==3){
	                // 	r='<i class="fa-solid fa-star" style="color:#50cd89;"></i>&nbsp;Good';	
	                // }
	                // else{
	                // 	r='<i class="fa-solid fa-star" style="color:#d2d4dc;"></i>&nbsp;-';	
	                // }
	                
	                // $("#rating").html(r);
	                // $("#membership_card_no").html(suggestion.member_id);
	                // $("#membership_card_points").html(suggestion.member_points);
	                $("#address").html(suggestion.address);
	                $("#mobile").html(suggestion.phone);
	                
	              
	        });
			function item_purity(i){
		
        var aid = $('#oge_quality'+i).val()
		//alert(aid);
        var baseurl= $("#baseurl").val();
         // alert(aid);
        $.ajax({
        type: "POST",
        url: baseurl+'Sales_entry/get_purity',
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

function oge_net_weight(i){
	var weight = $('#oge_weight'+i).val();
	var st_weight = $('#oge_st_weight'+i).val();
	var less = $('#oge_less'+i).val();	   
	var net_weight = parseFloat(weight)- parseFloat(st_weight) -parseFloat(less);
	$('#oge_net_weight'+i).val(parseFloat(net_weight).toFixed(3));

}
       function salesentry_validation(){
	       var err = 0;
	       var company_id = $('#company_id').val();
		   var cheq_pay = $('#cheque_amt').val();
		   var cheq_bank = $('#cheque_bank').val();
		   var cheq_no = $('#cheque_no').val();
           var rtgs_pay = $('#rtgs_amt').val();
		   var rtgs_bank = $('#rtgs_bank').val();
		   var rtgs_no = $('#rtgs_no').val();

           var upi_pay = $('#upi_amt').val();
		   var upi_trans_no = $('#upi_trans_no').val();
		   
		   if(company_id.trim()==''){
                $('#company_id_err').html('company is required!');
                err++;
            }else{
                $('#company_id_err').html('');
            }

			if(parseFloat(cheq_pay)>0){
				
			if(cheq_bank.trim()==''){
                $('#cheque_bank_err').html('cheq bank is required!');
                err++;
            }else{
                $('#cheque_bank_err').html('');
            }
			if(cheq_no.trim()==''){
                $('#cheque_no_err').html('cheq number is required!');
                err++;
            }else{
                $('#cheque_no_err').html('');
				

            }

		}
		if(parseFloat(rtgs_pay)>0){
				
				if(rtgs_bank.trim()==''){
					$('#rtgs_bank_err').html('rtgs bank is required!');
					err++;
				}else{
					$('#rtgs_bank_err').html('');
				}
				if(rtgs_no.trim()==''){
					$('#rtgs_no_err').html('rtgs number is required!');
					err++;
				}else{
					$('#rtgs_no_err').html('');
	
				}
	
			}
if(parseFloat(upi_pay)>0){

	if(upi_trans_no.trim()==''){
					$('#upi_trans_no_err').html('UPI number is required!');
					err++;
				}else{
					$('#upi_trans_no_err').html('');
	
				}
}


			if(err>0){ return false; }else{ return true;}
		}
function get_tag_detail(val){
	// alert(val);
        var aid = $('#tag_no'+val).val();
        var baseurl= $("#baseurl").val();
       //  alert(aid);
        $.ajax({
        type: "POST",
        url: baseurl+'Sales_entry/get_tag_detail',
        async: false,
        type: "POST",
        data: "typeid="+aid,
        dataType: "html",
        success: function(response)
        {
		res=response.split('||');
        $('#item'+val).val(res[1]);
		$('#subitem'+val).val(res[2]);
		$('#img'+val).val(res[3]);
		$('#purity'+val).val(res[4]);
		$('#weight'+val).val(res[5]);
		$('#st_wgt'+val).val(res[6]);
		$('#net_wgt'+val).val(res[7]);
		$('#hc_amt'+val).val(res[8]);
		$('#mc_amt'+val).val(res[9]);
		$('#wc_amt'+val).val(res[10]);
		$('#sales_type'+val).val(res[11]);
		$('#quality'+val).val(res[13]);
		$('#metal_weight'+val).val(res[14]);
		
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
			if(aid!=''){
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

	$('#sales_item_count').html(j);
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

    }

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
				if(aid=='Gold'){
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

	function get_subitem_old(val){
        var aid = $('#oge_item'+val).val()
        var baseurl= $("#baseurl").val();
        //  alert(aid);
        $.ajax({
        type: "POST",
        url: baseurl+'Sales_entry/get_subitem',
        async: false,
        type: "POST",
        data: "typeid="+aid,
        dataType: "html",
        success: function(response)
        {
			
        $('#oge_subitem'+val).empty().append(response);
			       
        }
        });
		
    }

	function get_item_pure(val){
        var aid = $('#pge_type'+val).val()
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
			
        $('#pge_item'+val).empty().append(response);
			       
        }
        });

		var j=0;var gold=0; var silver=0;
	 	for( var i=0;i<10;i++){
			var aid = $('#pge_type'+i).val();
			if(aid!=''){
				if(aid=='Gold'){
gold++;
				}
				else{
silver++;
				}
		j++;
			}
	 }
	$('#pge_count').html(j);
	$('#pge_gold_count').html(gold);
	$('#pge_silver_count').html(silver);
	$('#pge_gold_count_1').val(gold);
	$('#pge_silver_count_1').val(silver);
    }

	

	function get_subitem_pure(val){
        var aid = $('#pge_item'+val).val()
        var baseurl= $("#baseurl").val();
        // alert(aid);
        $.ajax({
        type: "POST",
        url: baseurl+'Sales_entry/get_subitem',
        async: false,
        type: "POST",
        data: "typeid="+aid,
        dataType: "html",
        success: function(response)
        {
			
        $('#pge_subitem'+val).empty().append(response);
			       
        }
        });
    }



	function sales_total(){
var total=0;var total1=0;var total2=0;
		for( var i=0;i<20;i++){
			var aid = $('#sales_amt'+i).val();
			
total=parseInt(total)+parseInt(aid);

		}
		for( var i=0;i<10;i++){
		
		var aid1 = $('#oge_est_amount'+i).val();
			var aid2 = $('#pge_est_amount'+i).val();
			total1=parseInt(total1)+parseInt(aid1);
total2=parseInt(total2)+parseInt(aid2);
	}
		$('#sales_total').html(total);
		$('#sales_total1').html(total);
		$('#sales_total_1').val(total);
	
var netpay=parseInt(total)-parseInt(total1)-parseInt(total2);
$('#net_payable1').html(netpay);
$('#net_payable').html(netpay);
$('#net_payable_1').val(netpay);


var gold_amt=0; var silver_amt=0;
	 	for( var i=0;i<20;i++){
			var aid = $('#sales_type'+i).val();
			
			var amount = $('#sales_amt'+i).val();
			if(aid!=''){
				if(aid=='Gold'){

gold_amt=parseInt(gold_amt)+parseInt(amount);

				}
				else{

silver_amt=parseInt(silver_amt)+parseInt(amount);
				}
		j++;
			}
	 }

	
	$('#sales_gold_amount').html(gold_amt);
	$('#sales_silver_amount').html(silver_amt);
	$('#sales_gold_amount_1').val(gold_amt);
	$('#sales_silver_amount_1').val(silver_amt);




	}

	function oge_total(){
var total=0;var total1=0;var total2=0;
for( var i=0;i<20;i++){
			var aid = $('#sales_amt'+i).val();
			
total=parseInt(total)+parseInt(aid);

		}
		for( var i=0;i<10;i++){
		
		var aid1 = $('#oge_est_amount'+i).val();
			var aid2 = $('#pge_est_amount'+i).val();
			total1=parseInt(total1)+parseInt(aid1);
total2=parseInt(total2)+parseInt(aid2);
	}
		$('#oge_total').html(total1);
		$('#oge_total1').html(total1);
		$('#oge_total_1').val(total1);

		var netpay=parseInt(total)-parseInt(total1)-parseInt(total2);
$('#net_payable1').html(netpay);
$('#net_payable').html(netpay);
$('#net_payable_1').val(netpay);


var j=0;var gold_tot=0; var silver_tot=0;
	 	for( var i=0;i<10;i++){
			var aid = $('#oge_item_type'+i).val();
			var oge_amount = $('#oge_est_amount'+i).val();
			if(aid!=''){
				if(aid=='Gold'){
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
	


	}
	function pge_total(){
var total=0;var total1=0;var total2=0;
for( var i=0;i<20;i++){
			var aid = $('#sales_amt'+i).val();
			
total=parseInt(total)+parseInt(aid);

		}
		for( var i=0;i<10;i++){
		
		var aid1 = $('#oge_est_amount'+i).val();
			var aid2 = $('#pge_est_amount'+i).val();
			total1=parseInt(total1)+parseInt(aid1);
total2=parseInt(total2)+parseInt(aid2);
	}
		$('#pge_total').html(total2);
		$('#pge_total1').html(total2);
		$('#pge_total_1').val(total2);


		var netpay=parseInt(total)-parseInt(total1)-parseInt(total2);
$('#net_payable1').html(netpay);
$('#net_payable').html(netpay);
$('#net_payable_1').val(netpay);

var j=0;var gold_tot=0; var silver_tot=0;
	 	for( var i=0;i<10;i++){
			var aid = $('#pge_type'+i).val();
			var pge_amount = $('#pge_est_amount'+i).val();
			if(aid!=''){
				if(aid=='Gold'){
gold_tot=parseInt(gold_tot)+parseInt(pge_amount);
				}
				else{
					silver_tot=parseInt(silver_tot)+parseInt(pge_amount);
				}
		j++;
			}
	 }

$('#pge_gold_total').html(gold_tot);
	$('#pge_silver_total').html(silver_tot);


	}
	function pge_weight(){
		
		var gold_tot=0; var silver_tot=0;
	 	for( var i=0;i<10;i++){
			var aid = $('#pge_type'+i).val();
			var pge_weight = $('#pge_weight'+i).val();
			if(aid!=''){
				if(aid=='Gold'){
gold_tot=parseInt(gold_tot)+parseInt(pge_weight);
				}
				else{
					silver_tot=parseInt(silver_tot)+parseInt(pge_weight);
				}
	
			}
	 }

$('#pge_gold_weight').html(gold_tot);
	$('#pge_silver_weight').html(silver_tot);

	$('#pge_gold_weight_1').val(gold_tot);
	$('#pge_silver_weight_1').val(silver_tot);

	}

	function oge_weight(){
		
		var gold_tot=0; var silver_tot=0;
	 	for( var i=0;i<10;i++){
			var aid = $('#oge_item_type'+i).val();
			var oge_weight = $('#oge_net_weight'+i).val();
			if(aid!=''){
				if(aid=='Gold'){
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


	}

	$("#add_salesentry_table").DataTable({
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
	$('#add_salesentry_table').wrap('<div class="dataTables_scroll" />');
</script>
<script>
$('#cash_amt').on('input',function(event){



var value = event.target.value;
var cash_pay = $('#cash_amt').val();

var cheq_pay = $('#cheque_amt').val();
var rtgs_pay = $('#rtgs_amt').val();
var upi_pay = $('#upi_amt').val();
var net_payable = $('#net_payable_1').val();

var tot_amt = parseInt(cash_pay)+parseInt(cheq_pay)+parseInt(rtgs_pay)+parseInt(upi_pay);
var bal_amt = parseInt(net_payable)-parseInt(tot_amt);
 $('#paid_amount').html(tot_amt);
 $('#paid_amount_1').val(tot_amt);
$('#paid_amount1').val(tot_amt);
$('#balance_amount').html(bal_amt);
$('#balance_amount_1').val(bal_amt);
//alert(bal_amt);



});
$('#cheque_amt').on('input',function(event){



var value = event.target.value;
var cash_pay = $('#cash_amt').val();

var cheq_pay = $('#cheque_amt').val();
var rtgs_pay = $('#rtgs_amt').val();
var upi_pay = $('#upi_amt').val();
var net_payable = $('#net_payable_1').val();

var tot_amt = parseInt(cash_pay)+parseInt(cheq_pay)+parseInt(rtgs_pay)+parseInt(upi_pay);
var bal_amt = parseInt(net_payable)-parseInt(tot_amt);
 $('#paid_amount').html(tot_amt);
$('#paid_amount_1').val(tot_amt);
$('#balance_amount').html(bal_amt);
$('#balance_amount_1').val(bal_amt);

alert(net_payable);

});
$('#rtgs_amt').on('input',function(event){



var value = event.target.value;
var cash_pay = $('#cash_amt').val();

var cheq_pay = $('#cheque_amt').val();
var rtgs_pay = $('#rtgs_amt').val();
var upi_pay = $('#upi_amt').val();
var net_payable = $('#net_payable_1').val();

var tot_amt = parseInt(cash_pay)+parseInt(cheq_pay)+parseInt(rtgs_pay)+parseInt(upi_pay);
var bal_amt = parseInt(net_payable)-parseInt(tot_amt);
 $('#paid_amount').html(tot_amt);
$('#paid_amount_1').val(tot_amt);
$('#balance_amount').html(bal_amt);
$('#balance_amount_1').val(bal_amt);



});
$('#upi_amt').on('input',function(event){



var value = event.target.value;
var cash_pay = $('#cash_amt').val();

var cheq_pay = $('#cheque_amt').val();
var rtgs_pay = $('#rtgs_amt').val();
var upi_pay = $('#upi_amt').val();
var net_payable = $('#net_payable_1').val();

var tot_amt = parseInt(cash_pay)+parseInt(cheq_pay)+parseInt(rtgs_pay)+parseInt(upi_pay);
var bal_amt = parseInt(net_payable)-parseInt(tot_amt);
 $('#paid_amount').html(tot_amt);
$('#paid_amount_1').val(tot_amt);
$('#balance_amount').html(bal_amt);
$('#balance_amount_1').val(bal_amt);



});


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