<?php $this->load->view("common");?>
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
    /*background-color: #fff;*/
    background-color: #ec9629;
    z-index: 2;
  }

  /*Auto complete css start*/

  	.xdsoft_autocomplete,
	.xdsoft_autocomplete div,
	.xdsoft_autocomplete span{
		/*	-moz-box-sizing: border-box !important;
			box-sizing: border-box !important;*/
	}

	.xdsoft_autocomplete{
		display:inline;
		position:relative;
		word-spacing: normal;
		text-transform: none;
		text-indent: 0px;
		text-shadow: none;
		text-align: start;
		}
		/*.xdsoft_autocomplete_dropdown
		{
			left: 0px !important;
			top: 31px !important;
			margin-left: 0px !important;
			margin-right: 0px !important;
			width: 500px !important;
			display: none !important;
			max-height: 475px !important;
		}*/

	.xdsoft_autocomplete .xdsoft_input{
		position:relative;
		z-index:2;
	}
	.xdsoft_autocomplete .xdsoft_autocomplete_dropdown{
		position:absolute;
		border: 1px solid #ccc;
		border-top-color: #d9d9d9;
		box-shadow: 0 2px 4px rgba(0,0,0,0.2);
		-webkit-box-shadow: 0 2px 4px rgba(0,0,0,0.2);
		cursor: default;
		display:none;
		z-index: 1001;
		margin-top:-1px;
		background-color:#fff;
		/*min-width:100%;*/
		width: 170px !important;
		overflow:auto;
		max-height: 300px !important;
		/*overflow-y: auto !important;
		overflow-x: auto !important;*/
		/*padding-right: 20px !important;*/
	}
	.xdsoft_autocomplete .xdsoft_autocomplete_hint{
		position:absolute;
		z-index:1;
		color:#ccc !important;
		-webkit-text-fill-color:#ccc !important;
		text-fill-color:#ccc  !important;
		overflow:hidden !important;
		white-space: pre  !important;
	}

	.xdsoft_autocomplete .xdsoft_autocomplete_hint span{
		color:transparent;
		opacity: 0.0;
	}

	.xdsoft_autocomplete .xdsoft_autocomplete_dropdown > .xdsoft_autocomplete_copyright{
		color:#ddd;
		font-size:10px;
		text-decoration:none;
		right:5px;
		position:absolute;
		margin-top:-15px;
		z-index:1002;
	}
	.xdsoft_autocomplete .xdsoft_autocomplete_dropdown > div{
		background:#fff;
		white-space: nowrap;
		cursor: pointer;
		line-height: 1.5em;
		padding: 2px 0px 2px 0px;
	}
	.xdsoft_autocomplete .xdsoft_autocomplete_dropdown > div.active{
		background: #0097CF;
		color: #FFFFFF;
	}

		/*Auto complete css end*/
</style>
	<link href="<?php echo base_url(); ?>assets/jquery.autocomplete.css" rel="stylesheet" type="text/css" />
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
									<h1 class="d-flex align-items-center text-dark fw-bold my-1 fs-3">New Sales Quotation
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
										<form name="sale_deliverymode_form" id="sale_order_form" method="POST" action="<?php echo base_url(); ?>Sales_quotation/sales_quotation_save" enctype="multipart/form-data"  onsubmit="return sale_order_validation()">	
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
																	<input class="form-control form-control-solid ps-12" name="date" placeholder="Date" id="quotation_date" value="<?php echo date("d-m-Y"); ?>" />
																</div>
																<div class="fv-plugins-message-container invalid-feedback" id="quotation_date_err"></div>

															</div>
															<label class="col-lg-2 col-form-label fw-semibold fs-6 required">Type</label>
															<div class="col-lg-4 fv-row fv-plugins-icon-container">
																<select class="form-select form-select-solid" name="quot_type" id="quot_type" data-control="select2" data-hide-search="true" onchange="quotation_type();">
																	<option value="party">Party</option>
																	<option value="supplier">Supplier</option>
																</select>
															</div>
															<label class="col-lg-2 col-form-label fw-semibold fs-6 required" id="quot_type_party">Party</label>
															<div class="col-lg-10 fv-row" id="quot_type_party_box">
																<input type="text" name="sale_party" id="sale_party" class="form-control form-control-lg form-control-solid me-3" placeholder="Select Party Name"  onkeyup="first_nm_party();" >
																	<div class="fv-plugins-message-container invalid-feedback" name="party_err" id="party_err"></div>
																	<input type="hidden" name="party_id_hidden" id="party_id_hidden" value="">
																<div class="fv-plugins-message-container invalid-feedback" id="party_name_err"></div>
															</div>
															<label class="col-lg-2 col-form-label fw-semibold fs-6 required" id="quot_type_supplier" style="display: none;">Supplier</label>
															<div class="col-lg-10 fv-row" id="quot_type_supplier_box" style="display:none;">
																<select class="form-select form-select-solid" name="supplier_id" id="supplier_id_name" data-control="select2" data-hide-search="false" onchange="supilerget();">
																	<option value="">Select</option>
																	<?php foreach ($suppliers_lists as $sllist) { ?>		
																			<option value="<?php echo $sllist['LEDGER_SNO']; ?>" >
																				<?php $phone = $sllist['PHONE'] ? ' - '. $sllist['PHONE']:'-'; echo $sllist['LEDGER_NAME'].$phone; ?></option>
																	<?php } ?>
																</select>
																<div class="fv-plugins-message-container invalid-feedback" name="supplier_id_name_err" id="supplier_id_name_err"></div>
															</div>
															<div class="col-lg-2">
																<label class="col-form-label fw-semibold fs-6 required">Company</label>
															</div>
															<div class="col-lg-10 fv-row fv-plugins-icon-container">
																<select class="form-select form-select-solid" name="company" id="company" data-control="select2" data-hide-search="true">	
																	<option value="">Select Company</option>
																	<?php  foreach($company_list as $clist) {?>
																		<option value="<?php echo $clist['COMPANYCODE']?>" <?php echo ($clist['COMPANYCODE'] == $_SESSION['COMPANYCODE'])?'selected':''; ?>><?php echo $clist['COMPANYNAME'];?></option>
																	<?php }?>
																</select>
																<div class="fv-plugins-message-container invalid-feedback" name="company_err" id="company_err"></div>
															</div>
														</div>
													</div>
													<div class="col-lg-4">
														<div class="row">
															<label class="col-lg-12 col-form-label fw-bold fs-6">
																<span class="me-3"><i class="fa fa-user fs-6"></i></span>
																<span id="party_name_view">XXXXX</span>
															</label>
															<label class="col-lg-12 col-form-label fw-bold fs-6" title="Address">
																<span class="me-3"><i class="fas fa-location-dot fs-6"></i></span>
																<span id="party_address">XXXXX</span>
															</label>
															<label class="col-lg-6 col-form-label fw-bold fs-6" title="Mobile">
																<span class="me-3"><i class="fas fa-mobile-android-alt fs-6"></i></span>
																<span id="party_mobile">XXXXX</span>
															</label>
															<label class="col-lg-6 col-form-label fw-bold fs-6" title="Mobile" id="quot_rat">
																<span class="me-3" id="party_rating"><i class="fas fa-star text-secondary"></i></span>
																
															</label>
														</div>
													</div>
													<div class="col-lg-2">
														<!--begin::Image input-->
													
														<div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url(assets/media/svg/avatars/blank.svg)" id="party_photo" name="party_photo">
															<div class="image-input-wrapper"  style="background-image: url(<?php echo base_url();?>assets/images/party.jpg)"></div>
														</div>
														<!--end::Image input-->
														<!--begin::Hint-->
														<div class="form-text"></div>
													</div>
												</div>
												<div class="accordion mt-2" id="kt_accordion_sales_quotation">
													<div class="accordion-item">
														<h2 class="accordion-header" id="kt_accordion_sales_quotation_header_2">
															<button class="accordion-button fw-bold fs-6 collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#kt_accordion_sales_quotation_body_2" aria-expanded="true" aria-controls="kt_accordion_sales_quotation_body_2">
																<span>Quotation &emsp;-&emsp;</span>
																<span class="me-4" >Count</span>
																<span id="selected_count">0</span>
																<span class="me-4">&emsp; - &emsp;Total Amount&emsp; -</span>
																<span id="selected_amount">0</span>
															</button>
														</h2>
														<div id="kt_accordion_sales_quotation_body_2" class="accordion-collapse collapse show" aria-labelledby="kt_accordion_sales_quotation_header_2" data-bs-parent="#kt_accordion_sales_quotation">
															<div class="accordion-body">
																<table class="table align-middle table-row-dashed table-striped fs-7 gy-1 gs-2 dataTable" id="add_quotation_table">
																	<thead>
																				
																		<tr class="text-start text-muted fw-bold fs-7 gs-0">
																			<th class="min-w-100px">Tag No</th>
																			<th class="min-w-100px">Item Type</th>
																			<th class="min-w-100px">Item Name</th>
																			<th class="min-w-50px">Quality</th>
																			<th class="min-w-50px">Purity</th>
																			<th class="min-w-50px">Wgt(gms)</th>
																			<th class="min-w-50px">St Wgt(gms)</th>
																			<th class="min-w-50px">Net Wgt(gms)</th>
																			<th class="min-w-50px">Img</th>
																			<th class="min-w-80px">Est Amount</th>
																		</tr>
																	</thead>
																	<tbody class="text-gray-600 fw-bold fs-6">

																		<?php for($i=1;$i <= 20;$i++){ ?>

																			<tr id="row_<?php echo $i; ?>">
																				<td>
																					<select class="form-select form-select-solid fs-7 select_item" data-control="select2" data-hide-search="false" data-width="150px" name="item_details[]"  data-index="<?php echo $i; ?>" id="select_tag_<?php echo $i; ?>"> 	
																						<option value="">Select</option>
																						<?php foreach($tag_list as $tag){  if($tag['tag_id']){?>
																							<option value="<?php echo $tag['tag_id']; ?>"><?php echo $tag['tag_id'] ?></option>
																						<?php }} ?>

																					</select>
																				</td>
																				<td id="item_type_<?php echo $i; ?>">-</td>
																				<td id="item_name_<?php echo $i; ?>">-</td>
																				<td id="item_quality_<?php echo $i; ?>">-</td>
																				<td id="item_purity_<?php echo $i; ?>">-</td>
																				<td id="item_weight_<?php echo $i; ?>">-</td>
																				<td id="item_stone_weight_<?php echo $i; ?>">-</td>
																				<td id="item_net_weight_<?php echo $i; ?>">-</td>
																				<td id="item_img_<?php echo $i; ?>">

																					<a class="d-block overlay" data-fslightbox="lightbox-basic" href="assets/images/Jewel.jpg">
																						<!--begin::Image-->
																						<div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded w-40px h-40px"
																							style="background-image:url('assets/images/Jewel.jpg')">
																						</div>
																						<!--end::Image-->
																						<!--begin::Action-->
																						<div class="overlay-layer card-rounded bg-dark bg-opacity-25 shadow  w-40px h-40px">
																							<i class="bi bi-eye-fill text-white fs-3"></i>
																						</div>
																						<!--end::Action-->
																					</a>

																				</td>
																				<td id="item_est_amount_<?php echo $i; ?>">-</td>
																			</tr>

																		<?php } ?>
																	</tbody>
																</table>
															</div>
														</div>
													</div>
												</div>
												<div class="d-flex justify-content-end mt-4">
													<button type="reset" class="btn btn-secondary me-3" data-bs-dismiss="modal">Cancel</button>
													<button type="submit" class="btn btn-primary" id="">Add Quotation</button>
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
		<?php 
	
			$cur_rate=$this->db->query("select * from SETUP")->row();
				echo number_format($cur_rate->BOARD_GOLDRATE,2);
			?>
		<input type="hidden" name="current_rate" id="current_rate" value="<?php echo $cur_rate->BOARD_GOLDRATE; ?>">
		<!--end::Root-->
		<?php $this->load->view("script");?>
		<script src="assets/plugins/custom/fslightbox/fslightbox.bundle.js"></script>
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
		<!-- <script src="js/products-list.js"></script> -->
		<script src="<?php echo base_url(); ?>assets/jquery.autocomplete.js"></script>
		<script>
			function quotation_type()
			{
				var quot_type = document.getElementById("quot_type").value;
				var quot_type_party = document.getElementById("quot_type_party");
				var quot_type_party_box = document.getElementById("quot_type_party_box");
				var quot_type_supplier = document.getElementById("quot_type_supplier");
				var quot_type_supplier_box = document.getElementById("quot_type_supplier_box");
				var quot_rat = document.getElementById("quot_rat");




				$("#party_name_view").val('');
				$("#sale_party").val('');
				$('#party_id_hidden').val('');
				$("#party_name_view").html('XXXXX');
				$("#party_address").html('XXXXX');
				$("#party_mobile").html('XXXXX');
				$("#party_shipment_address").html('');
				$("#party_rating").html('<i class="fa-solid fa-star" style="color:#d2d4dc;"></i>&nbsp;-');

				$('#party_photo').html('<div class="image-input-wrapper"  style="background-image: url(<?php echo base_url();?>assets/images/party.jpg)"></div>');
				// $("#party_photo").html(suggestion.photo);


				
				if (quot_type == "party") 
				{
					quot_type_party.style.display = "block";
					quot_type_party_box.style.display = "block";
					quot_rat.style.display = "block";
					quot_type_supplier.style.display = "none";
					quot_type_supplier_box.style.display = "none";

					// document.getElementById("quot_type_box").innerHTML="Supplier";
				}
				else
				{
					quot_type_party.style.display = "none";
					quot_type_party_box.style.display = "none";
					quot_rat.style.display = "none";
					quot_type_supplier.style.display = "block";
					quot_type_supplier_box.style.display = "block";
				}

			};
		</script>

		<!-- Party Search Auto COmplete -->
		<script>

			var baseurl = $("#baseurl").val();

			function first_nm_party()
			{
				
				$("#sale_party").autocomplete({ 

						valueKey:'title',
						source:[{
						url:baseurl+'Sales_quotation/sale_list_det?query=%QUERY%',
						type:'remote',
						ajax:{
							dataType : 'json',
						}
					}]}).on('selected.xdsoft',function(e,suggestion,ui){ 

					$("#party_name_view").val(suggestion.firstname);
					$("#sale_party").val(suggestion.firstname);
					$('#party_id_hidden').val(suggestion.id_party);
					$("#party_name_view").html(suggestion.firstname);
					$("#party_address").html(suggestion.address);
					$("#party_mobile").html(suggestion.phone);
					$("#party_email").html(suggestion.email);
					// $("#party_rating").html(suggestion.rating);
					$("#party_shipment_address").html(suggestion.shipment_address);

					// $("#party_photo").html(suggestion.photo);


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

					$("#party_rating").html(r);

					var pid= $("#party_id_hidden").val();

					$.ajax({
							type: "POST",
							url: baseurl+'Sales_quotation/get_photo',
							async: false,
							type: "POST",
							data: "id="+pid,
							dataType: "html",
							success: function(response)
							{
								$('#party_photo').empty().append(response);
							}
					});

					
				});

				$('#sale_party').focus();

			}

			
		</script>


		<!-- Suplier Data get  Search Auto COmplete -->
		<script>


			function supilerget(){

				const val = $('#supplier_id_name').val();
				

				$.ajax({

					type: "GET",
					url: baseurl+'Sales_quotation/supplier_info',
					async: false,
					type: "POST",
					data: "id="+val,
					dataType: "html",
					success: function(response)
					{
									
						var res=response.split('||');
						$("#party_name_view").html(res[1]);						  
						$("#party_address").html(res[2]);
						// $("#party_ship_address_get").html(res[3]);
						$("#party_mobile").html(res[3]);
						

					}
				});

				

			}

			
		</script>

		<script>
			var selected_values = [];
			var selected_amount = [];

			$('.select_item').on('change', function() {
				
				var tag_id = this.value;
				var index  = $(this).data('index');


				if(tag_id){

					if(jQuery.inArray(tag_id,selected_values) != -1) {

						selected_values.splice((index-1), 1);
						selected_amount.splice((index-1), 1);

						Swal.fire({
							title: 'Error!',
							text: 'Already Selected In Tag list...!',
							icon: 'error',
							confirmButtonText: 'Okay'
						});
						var id = "#select_tag_"+index;
						$(id).val('');

						$('#item_type_'+index).html('-');
						$('#item_name_'+index).html('-');
						$('#item_quality_'+index).html('-');
						$('#item_purity_'+index).html('-');
						$('#item_weight_'+index).html('-');
						$('#item_stone_weight_'+index).html('-');
						$('#item_net_weight_'+index).html('-');
						$('#item_img_'+index).html('');
						$('#item_est_amount_'+index).html('-');

					} else {
						selected_values.push(tag_id);
						$.ajax({
								type: "POST",
								url: baseurl+'Sales_quotation/get_tag_item',
								async: false,
								type: "POST",
								data: "tag_id="+tag_id,
								dataType: "html",
								success: function(response)
								{

									var result = JSON.parse(response);
								

									$('#item_type_'+index).html(result.metal_type);
									$('#item_name_'+index).html(result.item_name);
									$('#item_quality_'+index).html(result.quality);
									$('#item_purity_'+index).html(result.purity);
									$('#item_weight_'+index).html(result.weight);
									$('#item_stone_weight_'+index).html(result.stone);
									$('#item_net_weight_'+index).html(result.net_weight);


									var cr = $('#current_rate').val();

									var purity = result.purity.match(/\d+/); 
									var tot=cr*(purity/100);
									// alert(tot);
									var tot_wt=parseFloat( tot*result.net_weight).toFixed(3);
									
									$('#item_est_amount_'+index).html(Math.round(tot_wt));
									selected_amount.push(Math.round(tot_wt));

									var img_url = baseurl+"tag_img/"+result.img;


									var html_img = '<a class="d-block overlay" target="_blank" data-fslightbox="lightbox-basic" href="'+img_url+'"><div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded w-40px h-40px"><img src="'+img_url+'" style="width:100%;" /> </div> <div class="overlay-layer card-rounded bg-dark bg-opacity-25 shadow  w-40px h-40px"><i class="bi bi-eye-fill text-white fs-3"></i></div></a>';

									$('#item_img_'+index).html(html_img);

									
								
								}
						});
					} 
				}else{

					$('#item_type_'+index).html('-');
					$('#item_name_'+index).html('-');
					$('#item_quality_'+index).html('-');
					$('#item_purity_'+index).html('-');
					$('#item_weight_'+index).html('-');
					$('#item_stone_weight_'+index).html('-');
					$('#item_net_weight_'+index).html('-');
					$('#item_img_'+index).html('');
					$('#item_est_amount_'+index).html('-');

					
					


					selected_values = [];
					selected_amount = [];

					for(var i=1; i<= 20; i++) 
					{
						var value = $('#select_tag_'+i).val();
						var amount = $('#item_est_amount_'+i).html();

						if(value){
							selected_values.push(value);
							selected_amount.push(amount);
						}
					}



				}

				$('#selected_count').html(selected_values.length);
			//	
			
			sum = 0;
			$.each(selected_amount,function(){sum+=parseFloat(this) || 0;});
			$('#selected_amount').html(sum);

			});

		</script>

		<script>
			
			$("#add_quotation_table").DataTable({
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
			$('#add_quotation_table').wrap('<div class="dataTables_scroll" />');
		</script>

	
		<script>

			$("#quotation_date").flatpickr({
								dateFormat: "d-m-Y",
							});
				
		</script>

		<script>
			function sale_order_validation()
			{
				var err=0;

				var date_select    = $('#quotation_date').val();
				var quot_type      = $('#quot_type').val();
				var party_name     = $('#sale_party').val();
				var supplier_name  = $('#supplier_id_name').val();
				var company        = $('#company').val();

				if(!date_select)
				{
					
					Swal.fire({
						title: 'Error!',
						text: 'Select Date...!',
						icon: 'error',
						confirmButtonText: 'Okay'
					});
					$('#quotation_date_err').html('Select Date !');
					
					err++;
				}
				else
				{
					$('#quotation_date_err').html('');
				}




				if(quot_type == 'party'){

					

					if(!party_name)
					{

						Swal.fire({
									title: 'Error!',
									text: 'Enter  Party Name...!',
									icon: 'error',
									confirmButtonText: 'Okay'
									});
						$('#party_name_err').html('Enter Party name');
						err++;
					}
					else
					{
						$('#party_name_err').html('');
					}

				}else{

					if(!supplier_name)
					{

						Swal.fire({
									title: 'Error!',
									text: 'Enter  Supplier Name...!',
									icon: 'error',
									confirmButtonText: 'Okay'
									});
						$('#supplier_id_name_err').html('Enter Supplier name');
						err++;
					}
					else
					{
						$('#supplier_id_name_err').html('');
					}
				}


				

				if(!company)
				{
					
					Swal.fire({
						title: 'Error!',
						text: 'Select Company...!',
						icon: 'error',
						confirmButtonText: 'Okay'
					});

					$('#company_err').html('Select Company !');
					err++;
				}
				else
				{
					$('#company_err').html('');
				}


				if(selected_values.length > 0){
					$('#select_item_err').html('');
				}else{
					

					Swal.fire({
						title: 'Error!',
						text: 'Select Any one Tag list...!',
						icon: 'error',
						confirmButtonText: 'Okay'
					});

					$('#select_item_err').html('Select Any one Tag list !');
					err++;
				}

				// alert(err)
				if(err>0){
					return false;
				}
				else{
					return true;
				}
			}
		</script>

		