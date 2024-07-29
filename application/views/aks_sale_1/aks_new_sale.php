<?php $this->load->view("common");?>
<style>
	.dataTables_scroll
    {
        position: relative;
        overflow: auto;
        max-height: 215px;/*the maximum height you want to achieve*/
        width: 100%;
    }
  .dataTables_scroll thead{
    position: -webkit-sticky;
    position: sticky;
    top: 0;
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
 

<link href="assets/jquery.autocomplete.css" rel="stylesheet" type="text/css" />
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
									<h1 class="d-flex align-items-center text-dark fw-bold my-1 fs-3">Sale Products
									<!--begin::Separator-->
									<span class="h-20px border-gray-200 border-start ms-3 mx-2"></span>
									<!--end::Separator-->
									<!--begin::Description-->
								    </h1>
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

										<!--begin::Card header-->
										<!-- <div class="card-header1 border-0 pt-6">
										</div> -->
										<!--end::Card header-->
										<!--begin::Card body-->
										<div class="card-body py-4">
											<div class="row">
												<div class="col-lg-7">
													<form method="POST" autocomplete="off" action="<?php echo base_url(); ?>Aks_sale/sale_save" enctype="multipart/form-data" onsubmit="return new_sale_validation();">
													<!-- <div class="px-4" style="border-radius: 10px;padding-bottom: 10px;box-shadow: 0 5px 10px #00002947;"> -->
														<div class="row">
														<label class="col-lg-2 col-form-label fw-semibold fs-6">Date</label>
															<!--begin::Col-->
															<div class="col-lg-3 fv-row">
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
																	<input class="form-control form-control-solid ps-12" name="sale_date" placeholder="Date" id="SALE_entry_add_date" value="<?php echo date('d-m-Y'); ?>" />
																</div>
																<div class="fv-plugins-message-container invalid-feedback" name="date_err" id="date_err" ></div>
															
									                       </div>
															<label class="col-lg-2 col-form-label fw-semibold fs-6 required">Party</label>
															<div class="col-lg-4 fv-row fv-plugins-icon-container ">
																<input type="text" name="sale_party" id="sale_party" class="form-control form-control-lg form-control-solid me-3" placeholder="Party Name" >
																<div class="fv-plugins-message-container invalid-feedback" name="party_err" id="party_err"></div>
																<input type="hidden" name="party_id_hidden" id="party_id_hidden" value="">
																
															</div>
															<div class="col-lg-1 text-center mt-1">
																<a href="#"
																class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1"
																data-bs-toggle="modal" data-bs-target="#kt_modal_add_party"
																title="Add Party">
																<!--begin::Svg Icon | path: icons/duotune/art/art005.svg-->
																<i class="fa fa-user-plus fs-5"></i>	
																<!--end::Svg Icon--></a>
															</div>
														  </div>
														  <div class="row">
														  <label class="col-lg-2 col-form-label fw-semibold fs-6">Name</label>
														  <label class="col-lg-3 col-form-label fw-bold fs-6" id="party_name_view">XXXXXXXX</label>
														  <label class="col-lg-2 col-form-label fw-semibold fs-6">Phone</label>
														  <label class="col-lg-4 col-form-label fw-bold fs-6" id="party_mobile">9999999999</label>
														  <label class="col-lg-2 col-form-label fw-semibold fs-6">Email</label>
														  <label class="col-lg-3 col-form-label fw-bold fs-6" id="party_email">XXXXXXXX</label>
														  <label class="col-lg-2 col-form-label fw-semibold fs-6">Bill.Address</label>
														  <label class="col-lg-4 col-form-label fw-bold fs-6" id="party_address">No, street, city</label>
														  <label class="col-lg-2 col-form-label fw-semibold fs-6">Ship.Address</label>
														  <label class="col-lg-10 col-form-label fw-bold fs-6" id="party_shipment_address">No, street, city</label>
														  </div>
														<table id="view_table_scroll" class="table align-middle table-row-dashed table-striped table-hover fs-7 gy-1 gs-2" id="kt_datatable_dom_positioning">
															<thead>
																<tr class="text-start text-muted fw-bold fs-7 gs-0">
																	<th class="min-w-25px">Sno</th>
															  	    <th class="min-w-50px">Product</th>
															  	    <th class="min-w-25px">Wgt in g</th>
																	<!-- <th class="min-w-25px text-center">Qty</th> -->
																	<th class="min-w-25px">Per Price/g</th>
																	<th class="min-w-25px">Price</th>
																	<th class="min-w-25px">Action</th>
																</tr>
															</thead>
															<tbody class="text-gray-600 fw-semibold fs-8" id="table_row">

																
															    
															</tbody>	
														</table>
													

														<div class="row">

															<div class="col-lg-12">
																<label class="col-lg-12 col-form-label fw-bold fs-3 text-start">Mode of Delivery</label>
																<div class="row">
																<div class="col-lg-2 d-flex align-items-center">
																		<div class="form-check form-check-custom">
																			<input class="form-check-input2" type="radio" value="courier" name="delivery_add_mode_courier" id="delivery_add_mode_courier" onclick="delivery_mode_courier_radio(1)" checked  />
																		</div>
																		<div class="d-flex flex-column">
																			<div class="fs-6 fw-semibold text-muted" style="padding-left: 10px;">Courier</div>
																		</div>
																		
																	</div>
																	<div class="col-lg-2 d-flex align-items-center">
																		<div class="form-check form-check-custom">
																			<input class="form-check-input2" type="radio" id="select_int" name="delivery_add_mode_courier" value="Direct" onclick="delivery_mode_courier_radio(0)" />
																		</div>
																		<div class="d-flex flex-column">
																			<div class="fs-6 fw-semibold text-muted" style="padding-left: 10px;">Direct</div>
																		</div>
																	</div>
																	
																	<div class="col-lg-4 fv-row fv-plugins-icon-container" id="delivery_par_tbox" style="display:block;">
																	<select class="form-select form-select-solid" data-control="select2" data-placeholder="Select" data-hide-search="true" name="del_select">
																<?php foreach($supplier_list as $slist){   ?>		
																	<option value="<?php echo $slist['LEDGER_NAME']; ?>" ><?php echo $slist['LEDGER_NAME']; ?></option>
																	<?php } ?>
																	</select>
															        </div>
																	<div class="col-lg-4 fv-row fv-plugins-icon-container" id="shipment_tbox" style="display:block;">
																	
																	<input type="text" name="shipment_charges" id="shipment_charges" value="0" class="form-control form-control-lg form-control-solid me-3" placeholder="Shipment charges" onkeyup="total_after_shipment()" >
																    </div>
																	<!--<div class="row">
																	<label class="col-lg-2 col-form-label fw-semibold fs-6"  id="delivered_label" style="display:none;">Delivered By</label>
																	
															        <label class="col-lg-2 col-form-label fw-semibold fs-6" id="shipment_label" style="display:none;">Shipment To</label>
																	
																</div>-->
																</div>

															</div>
															

													<div class="col-lg-12">
														<div class="row mt-8">
															<label class="col-lg-5 col-form-label fw-bold fs-3 text-end">Total Amount&emsp; <span name="total_amt" id="lbl_tot_pay">0.00</span></label>	
															<label class="col-lg-2 col-form-label fw-bold fs-3 text-end">Discount</label>
															  <div style="width:90.25px;">
																<input type="text" name="dis_cart_amt" id="dis_cart_amt" class="col-lg-4 form-control form-control-lg form-control-solid fs-4"  onkeyup="cart_prd_totcal(event)" value="0.00" >
																


																</div>
													     </div>	
															<!-- <div class="col-lg-3 d-flex justify-content-end">
																<button class="btn btn-sm btn-outline btn-outline-solid btn-outline-warning btn-active-light-primary me-3" data-bs-toggle="modal" data-bs-target="#kt_modal_purchase_payment">Pay</button>
															</div> -->
														    </div>
														</div>
															<!-- <div class="col-lg-3 d-flex justify-content-end">
																<button class="btn btn-sm btn-outline btn-outline-solid btn-outline-warning btn-active-light-primary me-3" data-bs-toggle="modal" data-bs-target="#kt_modal_purchase_payment">Pay</button>
															</div> -->
														<div class="row">
															
														<label class="col-lg-3 col-form-label fw-bold fs-2 text-end" id="net_amt">Net Amount &emsp;</label>
														<label class="col-lg-3 col-form-label fw-bold fs-3" id="lbl_net_pay" name="net_amount">0.00</label>

															<div class="col-lg-2">
																
																
																<label class=" btn btn-sm btn-outline btn-outline-solid btn-outline-warning btn-active-light-primary ms-3" data-bs-toggle="modal" data-bs-target="#kt_modal_sale_payment" name="pay_btn" id="pay_btn" onclick="payment_mode()">Pay Now</label>
															</div>
															<div class="col-lg-4" >
																<button class="btn btn-sm btn-primary" name="new_sale" 
																id="new_sale"style="display: none;">New Sale</button>

															</div>
															
														
														</div>
														<input type="hidden" name="shipment_to" id="shipment_to"  >
														<input type="hidden" name="totalamount" id="totalamount"  value="0">
														<input type="hidden" name="netamount" id="netamount" >
														<input type="hidden" name="cashcheck" id="cashcheck" value="cash">
														<input type="hidden" name="chequechk" id="chequechk">
														<input type="hidden" name="rtgschk" id="rtgschk" >
														<input type="hidden" name="upichk" id="upichk" >
														<input type="hidden" name="cashamount" id="cashamount" >
														<input type="hidden" name="cashdetail" id="cashdetail" >
														<input type="hidden" name="chequeamount" id="chequeamount" value="">
														<input type="hidden" name="chequesupbank" id="chequesupbank" value="">
														<input type="hidden" name="chequerefno" id="chequerefno" value="">
														<input type="hidden" name="chequedetail" id="chequedetail" value="">
														<input type="hidden" name="rtgsamount" id="rtgsamount" value="">
														<input type="hidden" name="rtgsrefno" id="rtgsrefno" value="">
														<input type="hidden" name="rtgsbank" id="rtgsbank" value="">
														<input type="hidden" name="rtgsdetails" id="rtgsdetails" value="">
														<input type="hidden" name="upiamount" id="upiamount" value="">
														<input type="hidden" name="upirefno" id="upirefno" value="" >
														<input type="hidden" name="upibank" id="upibank" value="">
														<input type="hidden" name="upidetail" id="upidetail" value="">
														<input type="hidden" name="paid_amount" id="paid_amount" value="">
														<input type="hidden" name="balance_amount" id="balance_amount" value="">
														<!-- <input type="hidden" name="" id="">
														<input type="hidden" name="" id=""> -->

														<script>

															function pay_amount(){
															

															$('#cashcheck').val($('#cash_received_add_radio').val());
															$('#chequechk').val($('#cheque_received_add_radio').val());
															$('#rtgschk').val($('#rtgs_received_add_radio').val());
															$('#upichk').val($('#upi_received_add_radio').val());

															$('#cashamount').val($('#cash_amount').val());
															$('#cashdetail').val($('#cash_detail').val());

															$('#chequeamount').val($('#cheque_amount').val());
															$('#chequesupbank').val($('#party_bank').val());
															$('#chequerefno').val($('#cheque_ref_no').val());
															$('#chequedetail').val($('#cheque_details').val());

															$('#rtgsamount').val($('#rtgs_amount').val());
															$('#rtgsrefno').val($('#rtgs_ref_no').val());
															$('#rtgsbank').val($('#rtgs_bank_id').val());
															$('#rtgsdetails').val($('#rtgs_details').val());

															$('#upiamount').val($('#upi_amount').val());
															$('#upirefno').val($('#upi_ref_no').val());
															$('#upibank').val($('#upi_bank_id').val());
															$('#upidetail').val($('#upi_details').val());
														}
														</script>
													</form>
												</div>	
												<div class="col-lg-5">
													<!-- <div class="px-4" style="border-radius: 10px;padding-bottom: 10px;box-shadow: 0 5px 10px #00002947;"> -->

														<div class="row">
															<div class="col-lg-2">
																<label class="col-form-label fw-semibold fs-6 required">Category</label>
															</div>
															<div class="col-lg-6 fv-row fv-plugins-icon-container">
																<select class="form-select form-select-solid" name="category_select" id="category_select" data-control="select2" data-hide-search="true" onchange="category_selected()">
																	<option value="all" selected>All</option>
																	<?php foreach($category_list1 as $category_list)
																	{?>
																	<option value="<?php echo $category_list['AKSCATEGORY_ID'] ;?>" <?php if($category_list1==$category_list['AKSCATEGORY_NAME']){ echo "selected"; } ?>
																	><?php echo $category_list['AKSCATEGORY_NAME'];?></option><?php
																	 }?>
																	<input type="hidden" name="add_cart" id="add_cart" value="<?php echo $category_list['AKSCATEGORY_NAME'];?>">
													            </select>
															</div>
														</div>
														<div style="position: relative;overflow: auto; max-height: 500px; width: 100%; height: 450px;" >
															<div class="row mt-4" id="menuchange">
															     <?php  foreach($sale_menu as $slist){?>
															    <div class="col-lg-3 fv-row fv-plugins-icon-container" onclick="add_cart(<?php echo $slist['AKS_PRD_MID']; ?>)"  <?php if($slist['PRD_CUR_QTY']<1000){ ?> style="opacity:0.3;"  <?php  } ?>>

															    	 <a href="javascript:;" id="add_cart">
												            	    	<div class="image-input-wrapper overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover w-90px h-80px me-3" style="background-image: url(<?php echo base_url() ?>assets/images/aks_product_image/<?php echo $slist['AKS_PRD_IMG']; ?>); border-radius: 10px; ">
																	  </div>
																	</a>
																	<div class="d-flex flex-column">
																		<a href="javascript:;" id="add_cart" class="text-gray-600 text-hover-primary fs-8">
																		<?php echo $slist['AKS_PRD_NAME'];?>  </a>
																	</div>
																	<span  class="fs-6 fw-bold"><i class="fa-sharp fa-solid fa-indian-rupee-sign eyc fs-6" id="add_cart"></i><?php echo $slist['AKS_PRD_PRICE'];?>/<?php echo $slist['AKS_PRD_WT'];?>g</span>
																</div>
																<?php  }?>
															</div>	
														</div>
												</div>
												</div>
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
				      <?php $this->load->view("footer");?>
					</div>
					<!--end::Content-->
				</div>
				<!--end::Wrapper-->
			</div>
			<!--end::Page-->
		</div>
		<div class="modal fade" id="kt_modal_sale_payment" tabindex="-1" aria-hidden="true">
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
						<form method="POST" autocomplete="off" action="<?php echo base_url(); ?>Aks_purchase/purchase_save" enctype="multipart/form-data" onsubmit="return (false);">
							<h1 class="mb-3">Purchase Payment</h1>
						</div>
						<!--end::Heading-->
						<!--end::Heading-->
								<div class="row">
									<label class="col-lg-2 col-form-label fw-bold fs-3">Net Amount</label>
									<label class="col-lg-2 col-form-label fw-bold fs-3"id="lbl_net_pay1">0.00</label>

								</div>
								<div class="row">
									<div class="col-lg-2 fv-row fv-plugins-icon-container fv-plugins-bootstrap5-row-invalid">
										<div class="d-flex align-items-center mt-1">
											<label class="form-check form-check-inline form-check-solid me-5 is-invalid">
												<input class="form-check-input" name="cash_received_add_radio" value="Cash" type="checkbox" value="Cash" id="cash_received_add_radio" onclick="cash_ln_recev_add_radio()">
											</label>
											<label class="col-form-label fw-semibold fs-6 me-5">Cash</label>
										</div>
									</div>
									<div class="col-lg-2 fv-row fv-plugins-icon-container fv-plugins-bootstrap5-row-invalid">
										<div class="d-flex align-items-center mt-1">
											<label class="form-check form-check-inline form-check-solid me-5 is-invalid">
												<input class="form-check-input" name="cheque_received_add_radio" type="checkbox" value="Cheque" id="cheque_received_add_radio" onclick="cheque_ln_recev_add_radio()">
											</label>
											<label class="col-form-label fw-semibold fs-6">Cheque</label>
										</div>
									</div>
									<div class="col-lg-2 fv-row fv-plugins-icon-container fv-plugins-bootstrap5-row-invalid">
										<div class="d-flex align-items-center mt-1">
											<label class="form-check form-check-inline form-check-solid me-5 is-invalid">
												<input class="form-check-input" name="rtgs_received_add_radio" type="checkbox" value="RTGS" id="rtgs_received_add_radio" onclick="rtgs_ln_recev_add_radio()">
											</label>
											<label class="col-form-label fw-semibold fs-6">RTGS</label>
										</div>
									</div>
									<div class="col-lg-2 fv-row fv-plugins-icon-container fv-plugins-bootstrap5-row-invalid">
										<div class="d-flex align-items-center mt-1">
											<label class="form-check form-check-inline form-check-solid me-5 is-invalid">
												<input class="form-check-input" name="upi_received_add_radio" type="checkbox" value="UPI" id="upi_received_add_radio" onclick="upi_ln_recev_add_radio()">
											</label>
											<label class="col-form-label fw-semibold fs-6">UPI</label>
										</div>
									</div>
								</div>
								<div class="row">
									<label class="col-lg-1 col-form-label fw-semibold fs-6" id="cash_label" style="display:none;">Cash</label>
									<div class="col-lg-2 fv-row fv-plugins-icon-container" id="cash_label_tbox" style="display:none;">
										<input type="text" class="form-control form-control-lg form-control-solid" placeholder="Amount" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" onkeyup="pay_to_purchase_calc()" value="0" name="cash_amount" id="cash_amount">
										<input type="hidden" name="cash_hidden_rl" id="cash_hidden" value="0">
										<div class="fv-plugins-message-container invalid-feedback"></div>
									</div>
									<div class="col-lg-3 fv-row fv-plugins-icon-container" id="cash_detail_tbox" style="display:none;">
										<textarea class="form-control form-control-solid" rows="1" placeholder="Details"  name="cash_detail" id="cash_detail"></textarea>
									</div>
								</div>
								<div class="row">	
									<label class="col-lg-1 col-form-label fw-semibold fs-6" id="cheque_amt" style="display:none;">Cheque</label>
									<div class="col-lg-2 fv-row fv-plugins-icon-container" id="cheque_amt_tbox" style="display:none;">
										<input type="text"  class="form-control form-control-lg form-control-solid" placeholder="Amount"oninput="this.value = this.value.replace(/[^/0-9.]/g, '').replace(/(\..*)\./g, '$1');" onkeyup="pay_to_purchase_calc()"  value="0" name="cheque_amount" id="cheque_amount" >
									</div>
									<!-- <label class="col-lg-1 col-form-label fw-semibold fs-6" id="cheque_bank" style="display:none;">Bank</label> -->
									<div class="col-lg-3 fv-row fv-plugins-icon-container" id="cheque_bank_tbox" style="display:none;">
										<input type="text"  class="form-control form-control-lg form-control-solid" placeholder="Enter Supplier Bank" oninput="this.value = this.value.replace(/[^A-Za-z/0-9.]/g, '').replace(/(\..*)\./g, '$1');"    name="party_bank" id="party_bank">
										<div class="fv-plugins-message-container invalid-feedback"></div>
										<!-- <input type="hidden" name="cash_hidden" id="cash_hidden" value=""> -->
									</div>
									<!-- <label class="col-lg-1 col-form-label fw-semibold fs-6" id="cheque_chq_no" style="display:none;">Cheque no</label> -->
									<div class="col-lg-3 fv-row fv-plugins-icon-container" id="cheque_chq_no_tbox" style="display:none;">
										<input type="text" name="cheque_ref_no" id="cheque_ref_no" class="form-control form-control-lg form-control-solid" placeholder="Cheque/Ref Number" oninput="this.value = this.value.replace(/[^A-Za-z/0-9.]/g, '').replace(/(\..*)\./g, '$1');">
										<div class="fv-plugins-message-container invalid-feedback"></div>
									</div>
									<!-- <label class="col-lg-1 col-form-label fw-semibold fs-6" id="cheque_detail" style="display:none;">Details</label> -->
									<div class="col-lg-3 fv-row fv-plugins-icon-container" id="cheque_detail_tbox" style="display:none;">
										<textarea class="form-control form-control-solid" rows="1" placeholder="Details" name="cheque_details" id="cheque_details"></textarea>
									</div>
								</div>
								<div class="row">
									<label class="col-lg-1 col-form-label fw-semibold fs-6" id="rtgs_amt" style="display:none;">RTGS</label>
									<div class="col-lg-2 fv-row fv-plugins-icon-container" id="rtgs_amt_tbox" style="display:none;">

										<input type="text" class="form-control form-control-lg form-control-solid" placeholder="Amount" oninput="this.value = this.value.replace(/[^/0-9.]/g, '').replace(/(\..*)\./g, '$1');" onkeyup="pay_to_purchase_calc()"  value="0" name="rtgs_amount" id="rtgs_amount">
										<div class="fv-plugins-message-container invalid-feedback"></div>
										<!-- <input type="hidden" name="cash_hidden" id="cash_hidden" value=""> -->
									</div>
									<!-- <label class="col-lg-1 col-form-label fw-semibold fs-6" id="rtgs_no" style="display:none;">RTGS No</label> -->
									<div class="col-lg-3 fv-row fv-plugins-icon-container" id="rtgs_no_tbox" style="display:none;">
										<input type="text" name="rtgs_ref_no" id="rtgs_ref_no" class="form-control form-control-lg form-control-solid" placeholder="Trans/Ref Number" oninput="this.value = this.value.replace(/[^A-Za-z/0-9.]/g, '').replace(/(\..*)\./g, '$1');">
										<div class="fv-plugins-message-container invalid-feedback"></div>
									</div>
									<div class="col-lg-3 fv-row fv-plugins-icon-container" id="rtgs_bank_tbox" style="display:none;">
										<select class="form-select form-select-solid" data-control="select2" data-placeholder="Select Company Bank" data-hide-search="true" id="rtgs_bank_id" name="rtgs_bank_id">
											<option value="">Select</option>
											
											<?php
												$bnk_det=$this->db->query("select * from BANKS where ACTIVE='Y'")->result_array();
												foreach ($bnk_det as $blist) {
												?>
												<option value="<?php echo $blist['BANKNAME'];?>"><?php echo $blist['BANKNAME'];?></option>
												<?php
												}
												?>
										</select>
									</div>
									<!-- <label class="col-lg-1 col-form-label fw-semibold fs-6" id="rtgs_detail" style="display:none;">Details</label> -->
									<div class="col-lg-3 fv-row fv-plugins-icon-container" id="rtgs_detail_tbox" style="display:none;">
										<textarea class="form-control form-control-solid" rows="1" placeholder="Details" name="rtgs_details" id="rtgs_details"></textarea>
									</div>
								</div>
								<div class="row">
									<label class="col-lg-1 col-form-label fw-semibold fs-6" id="upi_amt" style="display:none;">UPI</label>
									<div class="col-lg-2 fv-row fv-plugins-icon-container" id="upi_amt_tbox" style="display:none;">
										<input type="text" class="form-control form-control-lg form-control-solid" placeholder="Amount" oninput="this.value = this.value.replace(/[^/0-9.]/g, '').replace(/(\..*)\./g, '$1');" onkeyup="pay_to_purchase_calc()" value="0" name="upi_amount" id="upi_amount">
										<!-- <input type="hidden" name="cash_hidden" id="cash_hidden" value=""> -->
										<div class="fv-plugins-message-container invalid-feedback"></div>
									</div>
									<!-- <label class="col-lg-1 col-form-label fw-semibold fs-6" id="upi_trans_no" style="display:none;">Trans No</label> -->
									<div class="col-lg-3 fv-row fv-plugins-icon-container" id="upi_trans_no_tbox" style="display:none;">
										<input type="text" name="upi_ref_no" id="upi_ref_no" class="form-control form-control-lg form-control-solid" placeholder="Trans/Ref Number">
										<div class="fv-plugins-message-container invalid-feedback"></div>
									</div>
									<div class="col-lg-3 fv-row fv-plugins-icon-container" id="upi_bank_tbox" style="display:none;">
										<select class="form-select form-select-solid" data-control="select2" data-placeholder="Select Company Bank" data-hide-search="true" id="upi_bank_id" name="upi_bank_id">
											<option value="">Select</option>
											<?php
												$bnk_det=$this->db->query("select * from BANKS where ACTIVE='Y'")->result_array();
												foreach ($bnk_det as $blist) {
												?>
												<option value="<?php echo $blist['BANKNAME'];?>"><?php echo $blist['BANKNAME'];?></option>
												<?php
												}
												?>
										</select>
									</div>
									<!-- <label class="col-lg-1 col-form-label fw-semibold fs-6" id="upi_detail" style="display:none;">Details</label> -->
									<div class="col-lg-3 fv-row fv-plugins-icon-container" id="upi_detail_tbox" style="display:none;">
										<textarea class="form-control form-control-solid" rows="1" placeholder="Details" name="upi_details" id="upi_details"></textarea>
									</div>
								</div>
								<div class="row mt-4">
									<div class="col-lg-6 text-center">
										<label class="col-form-label fw-bold fs-4">Paid Amount &emsp;</label>
										<label class="col-form-label fw-bold fs-3" id="lbl_paid_amt">0.00</label>
									</div><!-- 
									<div class="col-lg-3 text-center">
										<label class="col-form-label fw-bold fs-4">Paid Amount &emsp;</label>
										<label class="col-form-label fw-bold fs-3">3000.00</label>
									</div> -->
									<div class="col-lg-6 text-center">
										<label class="col-form-label fw-bold fs-4">Balance Amount &emsp;</label>
										<label class="col-form-label fw-bold fs-3" id="lbl_bal_amt">0.00</label>
									</div>
								</div>
								<div class="d-flex justify-content-end mt-6 px-9">
									<button type="reset" class="btn btn-secondary me-3" data-bs-dismiss="modal">Cancel</button>
									<button type="text" class="btn btn-primary me-3" data-bs-dismiss="modal" data-bs-dismiss="modal" class="btn btn-primary" onclick="pay_amount()">Ok</button>
								</div>
								
							<!-- </div> -->
							<!--end::Modal body-->

						</form>
					</div>
					<!--end::Modal content-->
				</div>
				<!--end::Modal dialog-->
			</div>
		</div>
		<!--begin::Modal - Change membership-->
	<div class="modal fade" id="kt_modal_change_membership" tabindex="-1" aria-hidden="true">
		<!--begin::Modal dialog-->
		<div class="modal-dialog modal-s">
			<!--begin::Modal content-->
			<div class="modal-content rounded">
				<!--begin::Modal header-->
				<div class="modal-header justify-content-end border-0 pb-0">
					<!--begin::Close-->
					<div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
						<!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
						<span class="svg-icon svg-icon-1">
							<svg width="24" height="24" viewBox="0 0 24 24" fill="none"
								xmlns="http://www.w3.org/2000/svg">
								<rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1"
									transform="rotate(-45 6 17.3137)" fill="currentColor" />
								<rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)"
									fill="currentColor" />
							</svg>
						</span>
						<!--end::Svg Icon-->
					</div>
					<!--end::Close-->
				</div>
				<!--end::Modal header-->
				<!--begin::Modal body-->
				<!--begin::Modal body-->
				<div class="modal-body pt-0 pb-15 px-5 px-xl-20">
					<!--begin::Heading-->
					<div class="mb-13 text-center">
						<h1 class="mb-3">Party Details</h1>
					</div>

					<!--end::Heading-->

                         <div class="row">
									<label class="col-lg-12 col-form-label fw-bold fs-6">
										<i class="fa fa-user fs-6" aria-hidden="true" title="Last Name"></i>&emsp;
										<span  name="party_name_view" id="party_name_view">XXXXXXXX</span></label>
										<!-- <i class="fa fa-user fs-6" aria-hidden="true" title="Last Name"></i>&emsp;<span name="last_name" id="last_name">C/o XXXX  </span></label> -->

									<label class="col-lg-12 col-form-label fw-bold fs-6">
										<i class="fa-solid fa-location-dot fs-6" aria-hidden="true" title="Address"></i>
									 <span name="party_address" id="party_address">No, street, city</span></label>
									<label class="col-lg-6 col-form-label fw-bold fs-6" >
										<i class="fas fa-mobile-android-alt fs-6" aria-hidden="true" title="Mobile"></i>&emsp;
										<span name="party_mobile" id="party_mobile">
										9999999999</span></label>
									
								</div>
					
					<!--end::Modal body-->
				</div>

			</div>
			<!--end::Modal content-->
		</div>
	</div>
	<!--end::Change membership-->

	<!--begin::Modal - Add Party-->
	<div class="modal fade" id="kt_modal_add_party" tabindex="-1" aria-hidden="true">
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
							<svg width="24" height="24" viewBox="0 0 24 24" fill="none"
								xmlns="http://www.w3.org/2000/svg">
								<rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1"
									transform="rotate(-45 6 17.3137)" fill="currentColor" />
								<rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)"
									fill="currentColor" />
							</svg>
						</span>
						<!--end::Svg Icon-->
					</div>
					<!--end::Close-->
				</div>  
				<!--end::Modal header-->
				<!--begin::Modal body-->
				<!--begin::Modal body-->
				<div class="modal-body pt-0 pb-15 px-5 px-xl-20">
					<!--begin::Heading-->
					<div class="mb-13 text-center">
						<h1 class="mb-3">Add New Party </h1>
					</div>

					<!--end::Heading-->
<form action="<?php echo base_url(); ?>Aks_sale/add_party" method="POST" >
                         <div class="row">
						 <label class="col-lg-2 col-form-label fw-semibold fs-6 required"> Name</label>
															<div class="col-lg-4 fv-row fv-plugins-icon-container ">
																<input type="text" name="new_party_name" id="new_party_name" class="form-control form-control-lg form-control-solid me-3" placeholder="Party Name" >
																<div class="fv-plugins-message-container invalid-feedback" name="party_err" id="party_err"></div>
																
															</div>
															<label class="col-lg-2 col-form-label fw-semibold fs-6 ">L.Name</label>
															<div class="col-lg-4 fv-row fv-plugins-icon-container ">
																<input type="text" name="new_party_lname" id="new_party_lname" class="form-control form-control-lg form-control-solid me-3" placeholder="Last Name" >
																<div class="fv-plugins-message-container invalid-feedback" name="party_err" id="party_err"></div>
																
															</div>
															<label class="col-lg-2 col-form-label fw-semibold fs-6 required">Mobile</label>
															<div class="col-lg-4 fv-row fv-plugins-icon-container ">
																<input type="text" name="new_party_mobile" id="new_party_mobile" class="form-control form-control-lg form-control-solid me-3" placeholder="Mobile Number" >
																<div class="fv-plugins-message-container invalid-feedback" name="party_err" id="party_err"></div>
																
															</div>

															<label class="col-lg-2 col-form-label fw-semibold fs-6 ">Alt.Mobile</label>
															<div class="col-lg-4 fv-row fv-plugins-icon-container ">
																<input type="text" name="new_party_amobile" id="new_party_amobile" class="form-control form-control-lg form-control-solid me-3" placeholder="Alternate Mobile " >
																<div class="fv-plugins-message-container invalid-feedback" name="party_err" id="party_err"></div>
																
															</div>
															<label class="col-lg-2 col-form-label fw-semibold fs-6 required">Email</label>
															<div class="col-lg-4 fv-row fv-plugins-icon-container ">
																<input type="text" name="new_party_email" id="new_party_email" class="form-control form-control-lg form-control-solid me-3" placeholder="Email" >
																<div class="fv-plugins-message-container invalid-feedback" name="party_err" id="party_err"></div>
																
															</div>
															<label class="col-lg-2 col-form-label fw-semibold fs-6 required">Bill Address</label>
															<div class="col-lg-4 fv-row fv-plugins-icon-container ">
																<!--<input type="text" class="form-control form-control-lg form-control-solid me-3" placeholder="Party Name" >-->
																<textarea rows="1" class="form-control form-control-solid"  name="new_party_bill_address" id="new_party_bill_address" ></textarea>
																<div class="fv-plugins-message-container invalid-feedback" name="party_err" id="party_err"></div>
																
															</div>
															<label class="col-lg-2 col-form-label fw-semibold fs-6 required">Shipment Address</label>
															<div class="col-lg-4 fv-row fv-plugins-icon-container ">
																
																<textarea rows="3" class="form-control form-control-solid"  name="new_party_shipment_address" id="new_party_shipment_address" ></textarea>
																<div class="fv-plugins-message-container invalid-feedback" name="party_err" id="party_err"></div>
																
															</div>
									
   <div class="d-flex justify-content-end mt-6 px-9">
									<button type="submit" class="btn btn-primary" >Add </button>
									</div>
								</div>
					</form>
					<!--end::Modal body-->
				</div>

			</div>
			<!--end::Modal content-->
		</div>
	</div>
	<!--end::Add Party-->
		<!--end::Root-->
		<input type="hidden" id="baseurl" value="<?php echo base_url();?>">
		<?php $this->load->view("script");?>
		<input type="hidden" id="baseurl" value="<?php echo base_url(); ?>">
 <script src="<?php echo base_url();?>assets/jquery.autocomplete.js"></script>


<script>

var baseurl = $("#baseurl").val();
		// var span = document.querySelector('#lab_name');

	        $("#sale_party").autocomplete({ 
	                valueKey:'title',
	                source:[{
	                url:baseurl+'Aks_sale/sale_list_det?query=%QUERY%',
	                type:'remote',
	                ajax:{
	                  dataType : 'json',
	                }
	            }]}).on('selected.xdsoft',function(e,suggestion,ui){ 
	                $("#party_name_view").val(suggestion.firstname);
	                $('#party_id_hidden').val(suggestion.id_party);
					// $('#party_photo').val(suggestion.party_photo);
	                
	            
	                $("#party_name_view").html(suggestion.firstname);
	              
	                $("#party_address").html(suggestion.address);
					$("#shipment_to").html(suggestion.address);
	                $("#party_mobile").html(suggestion.phone);
					$("#party_email").html(suggestion.email);
					$("#party_shipment_address").html(suggestion.shipment_address);
	               
				});



</script>
		
<script>
function total_after_shipment(){

	var shipment_charges=parseFloat($('#shipment_charges').val());
	var tot_cart_amt=parseFloat($('#totalamount').val());
	total =shipment_charges+tot_cart_amt;
	$('#lbl_tot_pay').html(total);
}

</script>
		<script>
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
			$("#view_table_scroll").DataTable({
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
			$('#view_table_scroll').wrap('<div class="dataTables_scroll" />');
		</script>
		<script>
			function delivery_mode_courier_radio(id)  
			{
				var delivery_add_mode_courier = document.getElementById("delivery_add_mode_courier");

				// var delivered_label = document.getElementById("delivered_label");	
				var delivery_par_tbox = document.getElementById("delivery_par_tbox");
				// var shipment_label = document.getElementById("shipment_label");
				var shipment_tbox = document.getElementById("shipment_tbox");

				if(id==1){
				    // delivered_label.style.display = "block";
				    delivery_par_tbox.style.display = "block";
				    // shipment_label.style.display = "block";
				    shipment_tbox.style.display = "block";
			}else{
			     	// delivered_label.style.display = "none";
			     	delivery_par_tbox.style.display = "none";
				    // shipment_label.style.display = "none";
				    shipment_tbox.style.display = "none";
				}

			};
		</script>
		<script>
			function cash_ln_recev_add_radio()
			{
				var cash_received_add_radio = document.getElementById("cash_received_add_radio");

				var cash_label = document.getElementById("cash_label");
				var cash_label_tbox = document.getElementById("cash_label_tbox");
				var cash_detail_tbox = document.getElementById("cash_detail_tbox");

				if (cash_received_add_radio.checked)
				{
				    cash_label.style.display = "block";
				    cash_label_tbox.style.display = "block";
				    cash_detail_tbox.style.display = "block";
			  	} else 
			  	{
			  		cash_label.style.display = "none";
			  		cash_label_tbox.style.display = "none";
			  		cash_detail_tbox.style.display = "none";
			  	}
			};

			function cheque_ln_recev_add_radio()
			{
				var cheque_received_add_radio = document.getElementById("cheque_received_add_radio");

				var cheque_amt = document.getElementById("cheque_amt");
				var cheque_amt_tbox = document.getElementById("cheque_amt_tbox");
				// var cheque_bank = document.getElementById("cheque_bank");
				var cheque_bank_tbox = document.getElementById("cheque_bank_tbox");
				// var cheque_chq_no = document.getElementById("cheque_chq_no");
				var cheque_chq_no_tbox = document.getElementById("cheque_chq_no_tbox");
				// var cheque_detail = document.getElementById("cheque_detail");
				var cheque_detail_tbox = document.getElementById("cheque_detail_tbox");

				if (cheque_received_add_radio.checked)
				{
				    cheque_amt.style.display = "block";
				    cheque_amt_tbox.style.display = "block";
				    // cheque_bank.style.display = "block";
				    cheque_bank_tbox.style.display = "block";
				    // cheque_chq_no.style.display = "block";
				    cheque_chq_no_tbox.style.display = "block";
				    // cheque_detail.style.display = "block";
				    cheque_detail_tbox.style.display = "block";
			  	} else 
			  	{
			     	cheque_amt.style.display = "none";
				    cheque_amt_tbox.style.display = "none";
				    // cheque_bank.style.display = "none";
				    cheque_bank_tbox.style.display = "none";
				    // cheque_chq_no.style.display = "none";
				    cheque_chq_no_tbox.style.display = "none";
				    // cheque_detail.style.display = "none";
				    cheque_detail_tbox.style.display = "none";
			  	}
			};

			function rtgs_ln_recev_add_radio()
			{
				var rtgs_received_add_radio = document.getElementById("rtgs_received_add_radio");

				var rtgs_amt = document.getElementById("rtgs_amt");
				var rtgs_amt_tbox = document.getElementById("rtgs_amt_tbox");
				// var rtgs_bank = document.getElementById("rtgs_bank");
				var rtgs_bank_tbox = document.getElementById("rtgs_bank_tbox");
				// var rtgs_no = document.getElementById("rtgs_no");
				var rtgs_no_tbox = document.getElementById("rtgs_no_tbox");
				// var rtgs_detail = document.getElementById("rtgs_detail");
				var rtgs_detail_tbox = document.getElementById("rtgs_detail_tbox");

				if (rtgs_received_add_radio.checked == true)
				{
				    rtgs_amt.style.display = "block";
				    rtgs_amt_tbox.style.display = "block";
				    // rtgs_bank.style.display = "block";
				    rtgs_bank_tbox.style.display = "block";
				    // rtgs_no.style.display = "block";
				    rtgs_no_tbox.style.display = "block";
				    // rtgs_detail.style.display = "block";
				    rtgs_detail_tbox.style.display = "block";
			  	} else 
			  	{
			     	rtgs_amt.style.display = "none";
				    rtgs_amt_tbox.style.display = "none";
				    // rtgs_bank.style.display = "none";
				    rtgs_bank_tbox.style.display = "none";
				    // rtgs_no.style.display = "none";
				    rtgs_no_tbox.style.display = "none";
				    // rtgs_detail.style.display = "none";
				    rtgs_detail_tbox.style.display = "none";
			  	}
			};

			function upi_ln_recev_add_radio()
			{
				var upi_received_add_radio = document.getElementById("upi_received_add_radio");

				var upi_amt = document.getElementById("upi_amt");
				var upi_amt_tbox = document.getElementById("upi_amt_tbox");
				// var upi_trans_no = document.getElementById("upi_trans_no");
				var upi_trans_no_tbox = document.getElementById("upi_trans_no_tbox");
				var upi_bank_tbox = document.getElementById("upi_bank_tbox");
				var upi_detail_tbox = document.getElementById("upi_detail_tbox");

				if (upi_received_add_radio.checked == true)
				{
				    upi_amt.style.display = "block";
				    upi_amt_tbox.style.display = "block";
				    // upi_trans_no.style.display = "block";
				    upi_trans_no_tbox.style.display = "block";
				    upi_bank_tbox.style.display = "block";
				    upi_detail_tbox.style.display = "block";
			  	} else 
			  	{
			     	upi_amt.style.display = "none";
				    upi_amt_tbox.style.display = "none";
				    // upi_trans_no.style.display = "none";
				    upi_trans_no_tbox.style.display = "none";
				    upi_bank_tbox.style.display = "none";
				    upi_detail_tbox.style.display = "none";
			  	}
			};
		</script>
		<script>
			function payment_mode(){

				var pay_btn = document.getElementById("pay_btn");

				var new_sale = document.getElementById("new_sale");

				if(pay_btn.onclick == true)
				{
					 new_sale.style.display = "none";
				}
				else{

					new_sale.style.display = "block";
				}
				
			};
		</script>

			<script>
			function new_sale_validation()
			{
				var err = 0;
				var dateval       = $('#SALE_entry_add_date').val();
				var party         = $('#sale_party').val();
				var discount      = $('#dis_cart_amt').val();

				if(dateval.trim()=='')
			    {
			        $('#date_err').html('select date !');
			        err++;
			    }
			    else
			    {
					$('#date_err').html('');
			    }
			    if(party.trim()=='')
			    {
			        $('#party_err').html('Enter Party Name!');
			        err++;
			    }
			    else
			    {
			       
					$('#sup_name_err').html('');
					
			    }

			  //   if(discount.trim()=='0.00')
			  //   {
			  //       $('#discount_err').html('Enter discount!');
			  //       err++;
			  //   }
			  //   else
			  //   {
					// $('#discount_err').html('');
			  //   }
			   
			     if(err>0){ return false; }else{ return true; }
			}		
		</script>
		<script>
			function pay_to_purchase_calc()
			{
				var cash=parseFloat($('#cash_amount').val());
				// alert (cash);

				var cheque=parseFloat($('#cheque_amount').val());
				var rtg=parseFloat($('#rtgs_amount').val());
				var upi=parseFloat($('#upi_amount').val());
				var rc_tot=parseFloat($('#lbl_net_pay').html());
				if(cash=='') cash=0;
				if(cheque=='') cheque=0;
				if(rtg=='') rtg=0;
				if(upi=='') upi=0;
				// alert(c);
				var tot= cash+cheque+rtg+upi;
				// alert(tot);
				$('#lbl_paid_amt').html(tot);
				$('#paid_amount').val(tot);
				
				var diff=rc_tot - parseFloat(tot);
				$('#lbl_bal_amt').html(diff);
				$('#balance_amount').val(diff);
				// alert(diff);
			}

			let current_id = 0;
			
			function cart_prd_cal(id)
			{

				var price = 0;

				var prd_wgt=parseFloat($('#prd_wgt'+id).val());

				var prd_unit=parseFloat($('#prd_unit'+id).val());
				// var prd_pri=parseFloat($('#prd_price').val());
				var rc_tot=parseFloat($('#lb_prd_price'+id).html());

				if(prd_wgt=='') prd_wgt=0;
				// if(prd_pri=='') prd_pri=0;

				var total=parseFloat( prd_wgt / prd_unit  ) * rc_tot;

				current_id = id;

				$('#lbl_price_tot'+id).html(parseFloat(total).toFixed(2));
				// alert(prd_wgt);
				// alert(prd_unit);
				// alert(rc_tot);
				

				var prd_wgt=parseFloat($('#prd_wgt'+id).val());
				var prd_unit=parseFloat($('#prd_unit'+id).val());
				// var prd_pri=parseFloat($('#prd_price').val());
				var rc_tot=parseFloat($('#lb_prd_price'+id).html());

				if(prd_wgt=='') prd_wgt=0;
				// if(prd_pri=='') prd_pri=0;

				var total= parseFloat( prd_wgt / prd_unit  ) * rc_tot;

				//arr.push({id:id,amount:total});

				let element = {id: id}

				let chk = arr.some(it => it.id === element.id);

				if(chk){

					arr.forEach((element, index) => {

					    if(element.id === id) {
					        arr[index]['amount'] = total;
					    }
					});

				}else{
					arr.push({id:id,amount:total});
				}
			//	const sum = arr.reduce((partialSum, a.amount) => partialSum + a, 0);
				
				const sum = arr.reduce((amt, ob) => {
				  return amt + ob.amount;
				}, 0);

				// $('#lbl_tot_pay').html(sum);
				// $('#lbl_tot_pay1').html(sum);
				// $('#totalamount').val(sum);
				// $('#lbl_net_pay').val(sum);
				// $('#lbl_net_pay1').val(sum);
				// $('#netamount').val(sum);


				$('#lbl_tot_pay').html(sum);
				$('#totalamount').val(sum);
				$('#lbl_net_pay').html(sum);
				$('#lbl_net_pay1').html(sum);
				$('#netamount').val(sum);
				

			}

			var arr  =[];

			function cart_prd_cal_total(id)
			{
				

				

				var prd_wgt=parseFloat($('#prd_wgt'+id).val());
				var prd_unit=parseFloat($('#prd_unit'+id).val());
				// var prd_pri=parseFloat($('#prd_price').val());
				var rc_tot=parseFloat($('#lb_prd_price'+id).html());

				if(prd_wgt=='') prd_wgt=0;
				// if(prd_pri=='') prd_pri=0;

				var total= parseFloat( prd_wgt / prd_unit  ) * rc_tot;

				//arr.push({id:id,amount:total});

				let element = {id: id}

				let chk = arr.some(it => it.id === element.id);

				if(chk){

					arr.forEach((element, index) => {

					    if(element.id === id) {
					        arr[index]['amount'] = total;
					    }
					});

				}else{
					arr.push({id:id,amount:total});
				}
			//	const sum = arr.reduce((partialSum, a.amount) => partialSum + a, 0);
				
				const sum = arr.reduce((amt, ob) => {
				  return amt + ob.amount;
				}, 0);

				// $('#lbl_tot_pay').html(sum);
				// $('#lbl_tot_pay1').html(sum);
				// $('#totalamount').val(sum);
				// $('#lbl_net_pay').html(sum);
				// $('#lbl_net_pay').val(sum);
				// $('#lbl_net_pay1').html(sum);
				// $('#lbl_net_pay1').val(sum);
				// $('#netamount').val(sum);

				$('#lbl_tot_pay').html(sum);
				$('#totalamount').val(sum);
				$('#lbl_net_pay').html(sum);
				$('#lbl_net_pay1').html(sum);
				$('#netamount').val(sum);

			}
			function cart_prd_totcal()
			{
				var tot_cart_amt=parseFloat($('#total_cart_amount').val());
				var dis_cart_amt=parseFloat($('#dis_cart_amt').val());
				var rc_tot=parseFloat($('#lbl_tot_pay').html());
				var net_amt =parseFloat($('#net_amt').html());
				if(tot_cart_amt=='') tot_cart_amt=0;
				if(dis_cart_amt=='') dis_cart_amt=0;

				var ntot = rc_tot - dis_cart_amt;

				var nettot= rc_tot -dis_cart_amt;

				// $('#lbl_net_pay').html(nettot);
				// $('#lbl_net_pay1').html(nettot);
				// $('#netamount').val(nettot);
				// $('#lbl_net_pay').val(nettot);
				// $('#lbl_net_pay1').val(nettot);

				

				$('#lbl_net_pay').html(nettot);
				$('#lbl_net_pay1').html(nettot);
				$('#netamount').val(nettot);

			}

			
		</script>
		
		
		<script>
			
			function purc_list(val)
			{
				var baseurl= $("#baseurl").val();
				// alert(val);
				$.ajax({
				type: "POST",
				url: baseurl+'',
				async: false,
				type: "POST",
				data: "id="+val,
				dataType: "html",
				success: function(response)
				
			});
			}
		</script>
		<script>
				$("#SALE_entry_add_date").flatpickr({
					dateFormat: "d-m-Y",
				});
		</script>
		<script>
			
			function purc_list(val)
			{
				var baseurl= $("#baseurl").val();
				//alert(val);
				$.ajax({
				type: "POST",
				url: baseurl+'',
				async: false,
				type: "POST",
				data: "id="+val,
				dataType: "html",
				success: function(response)
				
			});
			}
		</script>
		<script>
			function add_cart(val)
			{
				
			var baseurl= $("#baseurl").val();
			
			count=$(".btnDelete").length;
			j=0;
for(i=0;i<=count;i++){

var prd_id= $("#prd_id_hidden"+i).val();
if(val == prd_id){
	var prd_wgt= parseInt($("#prd_wgt"+i).val());
	$("#prd_wgt"+i).val(prd_wgt+1000);
	j=1;
	cart_prd_cal(i);
}

}


		if(j==0){
			$.ajax({
				type: "POST",
				url: baseurl+'Aks_sale/add_cart_list',
				async: false,
				type: "POST",
				data: "id="+val+"&count="+count,
				dataType: "html",
				success: function(response)
				{


					// alert(response);
					// var res=response.split('||');
				if(count==0){
					$("#table_row").empty().append(response);
				}
				else{
					$("#table_row").append(response);

				}
				}
				});
			}
				cart_prd_cal(count);
}

		</script>
		 <script>
		$("#table_row").on('click', '.btnDelete', function () {


         $(this).closest('tr').remove();
         let id = $(this).attr("name");

       

        	var data = $.grep(arr, function(e){ 
					     return e.id != id; 
					});

		const sum = data.reduce((amt, ob) => {
				  return amt + ob.amount;
				}, 0);


       console.log(data)
        

		$('#lbl_tot_pay').html(sum);

		
         
});
</script>
		<script>
		function category_selected(){

			// var category_type = document.getElementById("category_select").value;
			// alret (category_type);
			var val= $("#category_select").val();
			var baseurl= $("#baseurl").val();
			// alert(val);
			$.ajax({
				type: "POST",
				url: baseurl+'Aks_sale/category_select',
				async: false,
				type: "POST",
				data: "id="+val,
				dataType: "html",
				success: function(response)
				{


					// alert(response);
					// var res=response.split('||');
				
					$("#menuchange").empty().append(response);
				
				}
				});

		}
	</script>
		
	</body>
	<!--end::Body-->
</html>


