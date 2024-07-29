<?php $this->load->view("common"); ?>
<style>
	.dataTables_scroll
    {
        position: relative;
        overflow: auto;
        min-height: 218px;
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
  .pdt_tltp .pdt_sub_tltp {
		  display: none;
			}
	.pdt_tltp:hover .pdt_sub_tltp {
	  display: block;
	  position: absolute;
	  /*margin-top: -2em;*/
      /*margin-left: -3.5em !important;*/
	  color: white;
	  background: black;
	  padding: 3px 13px 3px 10px;
	  border-radius: 5px;
	  font-size: 12px;
	  z-index: 500 !important;
	}
	.table_tool{
        max-width: 30px !important;
        white-space: nowrap;
        text-overflow: ellipsis;
        overflow: hidden;
      }
      [role="tooltip"]{
        visibility: hidden;
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
				<?php $this->load->view("sidebar"); ?>
				<!--begin::Wrapper-->
				<div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
				<?php $this->load->view("header"); ?>
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
									<!-- <span class="h-20px border-gray-200 border-start ms-3 mx-2"></span> -->
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
										<!--begin::Card header-->
										<!-- <div class="card-header1 border-0 pt-6">
										</div> -->
										<!--end::Card header-->
										<!--begin::Card body-->
										<div class="card-body py-4">
											<div class="row">
												<div class="col-lg-6">
													<!--  -->
													<form method="POST" autocomplete="off" action="<?php echo base_url(); ?>Akssalequotation/sale_save" id="submit_form" enctype="multipart/form-data" onsubmit="return submit_validation();">
													<!-- <div class="px-4" style="border-radius: 10px;padding-bottom: 10px;box-shadow: 0 5px 10px #00002947;"> -->
														<div class="row">
															<label class="col-lg-2 col-form-label required fw-semibold fs-6">Type</label>
															<div class="col-lg-4 fv-row">
																<select class="form-select form-select-solid" name="aks_sls_qut_type" id="aks_sls_qut_type" data-control="select2" data-hide-search="false" onchange="sales_quote_func();">
																	<option value="party">Party</option>
																	<option value="supplier">Supplier</option>
																</select>
															</div>
															<div class="col-lg-1 text-center mt-1">
																<a href="javascript:;"
																class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1"
																data-bs-toggle="modal" data-bs-target="#kt_modal_add_party"
																title="Add Party"onclick="karpattiparty_add();">
																<!--begin::Svg Icon | path: icons/duotune/art/art005.svg-->
																<i class="fa fa-user-plus fs-5"></i>	
																<!--end::Svg Icon--></a>
															</div>
															<label class="col-lg-2 col-form-label required fw-semibold fs-6" style="padding-left: 24px !important;">Date</label>
															<div class="col-lg-3 d-flex align-items-center" style="padding-left: 0px !important;">
																<span class="svg-icon position-absolute ms-4 svg-icon-2 dt">
																	<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																		<path opacity="0.3" d="M21 22H3C2.4 22 2 21.6 2 21V5C2 4.4 2.4 4 3 4H21C21.6 4 22 4.4 22 5V21C22 21.6 21.6 22 21 22Z" fill="currentColor" />
																		<path d="M6 6C5.4 6 5 5.6 5 5V3C5 2.4 5.4 2 6 2C6.6 2 7 2.4 7 3V5C7 5.6 6.6 6 6 6ZM11 5V3C11 2.4 10.6 2 10 2C9.4 2 9 2.4 9 3V5C9 5.6 9.4 6 10 6C10.6 6 11 5.6 11 5ZM15 5V3C15 2.4 14.6 2 14 2C13.4 2 13 2.4 13 3V5C13 5.6 13.4 6 14 6C14.6 6 15 5.6 15 5ZM19 5V3C19 2.4 18.6 2 18 2C17.4 2 17 2.4 17 3V5C17 5.6 17.4 6 18 6C18.6 6 19 5.6 19 5Z" fill="currentColor" />
																		<path d="M8.8 13.1C9.2 13.1 9.5 13 9.7 12.8C9.9 12.6 10.1 12.3 10.1 11.9C10.1 11.6 10 11.3 9.8 11.1C9.6 10.9 9.3 10.8 9 10.8C8.8 10.8 8.59999 10.8 8.39999 10.9C8.19999 11 8.1 11.1 8 11.2C7.9 11.3 7.8 11.4 7.7 11.6C7.6 11.8 7.5 11.9 7.5 12.1C7.5 12.2 7.4 12.2 7.3 12.3C7.2 12.4 7.09999 12.4 6.89999 12.4C6.69999 12.4 6.6 12.3 6.5 12.2C6.4 12.1 6.3 11.9 6.3 11.7C6.3 11.5 6.4 11.3 6.5 11.1C6.6 10.9 6.8 10.7 7 10.5C7.2 10.3 7.49999 10.1 7.89999 10C8.29999 9.90003 8.60001 9.80003 9.10001 9.80003C9.50001 9.80003 9.80001 9.90003 10.1 10C10.4 10.1 10.7 10.3 10.9 10.4C11.1 10.5 11.3 10.8 11.4 11.1C11.5 11.4 11.6 11.6 11.6 11.9C11.6 12.3 11.5 12.6 11.3 12.9C11.1 13.2 10.9 13.5 10.6 13.7C10.9 13.9 11.2 14.1 11.4 14.3C11.6 14.5 11.8 14.7 11.9 15C12 15.3 12.1 15.5 12.1 15.8C12.1 16.2 12 16.5 11.9 16.8C11.8 17.1 11.5 17.4 11.3 17.7C11.1 18 10.7 18.2 10.3 18.3C9.9 18.4 9.5 18.5 9 18.5C8.5 18.5 8.1 18.4 7.7 18.2C7.3 18 7 17.8 6.8 17.6C6.6 17.4 6.4 17.1 6.3 16.8C6.2 16.5 6.10001 16.3 6.10001 16.1C6.10001 15.9 6.2 15.7 6.3 15.6C6.4 15.5 6.6 15.4 6.8 15.4C6.9 15.4 7.00001 15.4 7.10001 15.5C7.20001 15.6 7.3 15.6 7.3 15.7C7.5 16.2 7.7 16.6 8 16.9C8.3 17.2 8.6 17.3 9 17.3C9.2 17.3 9.5 17.2 9.7 17.1C9.9 17 10.1 16.8 10.3 16.6C10.5 16.4 10.5 16.1 10.5 15.8C10.5 15.3 10.4 15 10.1 14.7C9.80001 14.4 9.50001 14.3 9.10001 14.3C9.00001 14.3 8.9 14.3 8.7 14.3C8.5 14.3 8.39999 14.3 8.39999 14.3C8.19999 14.3 7.99999 14.2 7.89999 14.1C7.79999 14 7.7 13.8 7.7 13.7C7.7 13.5 7.79999 13.4 7.89999 13.2C7.99999 13 8.2 13 8.5 13H8.8V13.1ZM15.3 17.5V12.2C14.3 13 13.6 13.3 13.3 13.3C13.1 13.3 13 13.2 12.9 13.1C12.8 13 12.7 12.8 12.7 12.6C12.7 12.4 12.8 12.3 12.9 12.2C13 12.1 13.2 12 13.6 11.8C14.1 11.6 14.5 11.3 14.7 11.1C14.9 10.9 15.2 10.6 15.5 10.3C15.8 10 15.9 9.80003 15.9 9.70003C15.9 9.60003 16.1 9.60004 16.3 9.60004C16.5 9.60004 16.7 9.70003 16.8 9.80003C16.9 9.90003 17 10.2 17 10.5V17.2C17 18 16.7 18.4 16.2 18.4C16 18.4 15.8 18.3 15.6 18.2C15.4 18.1 15.3 17.8 15.3 17.5Z" fill="currentColor" />
																	</svg>
																</span>
																<input class="form-control form-control-solid ps-12" name="sale_date" placeholder="Date" id="SALE_entry_add_date" value="<?php echo date('d-m-Y'); ?>" />
															</div>
															<label class="col-lg-2 col-form-label required fw-semibold fs-6" id="aks_par_label">Party<i class="fa-solid fa-circle-info fs-7 ms-2"  title="AutoComplete Select Party Name"></i></label>
															<div class="col-lg-4 fv-row fv-plugins-icon-container" id="aks_par_tbox">
																<input type="text" name="sale_party" id="sale_party" class="form-control form-control-lg form-control-solid me-3" placeholder="Select Party Name" >
																<div class="fv-plugins-message-container invalid-feedback" name="party_err" id="party_err"></div>
																<input type="hidden" name="party_id_hidden" id="party_id_hidden" value="">
															</div>
															<label class="col-lg-2 col-form-label required fw-semibold fs-6" id="aks_sup_label" style="display:none;">Supplier</label>
															<div class="col-lg-4 fv-row" id="aks_sup_tbox" style="display:none;">
																<select class="form-select form-select-solid" name="supplier_id_name" id="supplier_id_name" data-control="select2" data-hide-search="false" onchange="supilerget();">
																	<option value="">Select</option>
																		<?php foreach ($suppliers_lists as $sllist) { ?>		
																		<option value="<?php echo $sllist['LEDGER_NAME'].'~'.$sllist['LEDGER_SNO']; ?>" >
																			<?php $phone = $sllist['PHONE'] ? ' - '. $sllist['PHONE']:'-'; echo $sllist['LEDGER_NAME'].$phone; ?></option>
																		<?php } ?>
																</select>
																<div class="fv-plugins-message-container invalid-feedback" name="supplier_id_name_err" id="supplier_id_name_err"></div>
															</div>
															<label class="col-lg-2 col-form-label fw-semibold fs-6">Phone</label>
															<label class="col-lg-4 col-form-label fw-bold fs-6" id="party_mobile">XXXXX</label>
															<label class="col-lg-2 col-form-label fw-semibold fs-6">Email</label>
															<label class="col-lg-4 col-form-label fw-bold fs-6" id="party_email">XXXXX</label>
															<div class="col-lg-2">
																<label class="col-form-label fw-semibold fs-6">Address</label>	
															</div>
															<label class="col-lg-4 col-form-label fw-bold fs-6" id="party_address">XXXXX</label>
															<!-- <div class="col-lg-2"> -->
																<!-- <label class="col-form-label fw-semibold fs-6">Ship.Address</label>	 -->
															<!-- </div> -->
															<!-- <label class="col-lg-10 col-form-label fw-bold fs-6" id="party_shipment_address">XXXXX</label> -->
													</div>
														
														<table id="view_table_scroll" class="table align-middle table-row-dashed table-striped table-hover fs-7 gy-1 gs-2" id="kt_datatable_dom_positioning">
															<thead>
																<tr class="text-start text-muted fw-bold fs-7 gs-0">
																	<th class="min-w-25px">Sno</th>
																	<th class="min-w-80px">Product</th>
																	<th class="min-w-25px">Wgt in g</th>
																	<th class="min-w-25px">Per Price/g</th>
																	<th class="min-w-25px">Price</th>
																	<th class="min-w-25px">Action</th>
																</tr>
															</thead>
															<tbody class="text-gray-600 fw-semibold fs-8" id="table_row">

																
																
															</tbody>	
														</table>		
														<div class="row">
															<div class="col-lg-4 col-form-label text-center">
																<label class=" fw-bold fs-4">Total Amount</label>
																<label class="d-block fw-bold fs-4"id="lbl_tot_pay">0.00</label>
															</div>
															<label class="col-lg-2 col-form-label fw-bold fs-4 mt-1">Discount</label>
															<div class="col-lg-2 fv-row fv-plugins-icon-container mt-1">
																<input type="text" name="dis_cart_amt" id="dis_cart_amt" class="col-lg-4 form-control form-control-lg form-control-solid fs-4" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"  onkeyup="cart_prd_totcal(event)" value="0.00" maxlength="5">
															</div>
															<div class="col-lg-4 col-form-label text-center">
																<label class=" fw-bold fs-4">Net Amount</label>
																<label class="d-block fw-bold fs-4"id="lbl_net_pay" name="net_amount">0.00</label>
															</div>
														</div>
							  							
														<div class="row">															
														<div class="col-lg-4 col-form-label text-center">
															<label class=" fw-bold fs-4">Remarks</label>
														</div>
														<!-- <div class="col-lg-3"></div> -->
														<div class="col-lg-4 d-flex justify-content-end">
															<textarea class="form-control form-control-solid" rows="1" id="remarks" name="remarks" placeholder="Enter Remarks"></textarea>
														</div>
														
															
																												
														</div>
														<input type="hidden" name="shipment_to" id="shipment_to"  >
														<input type="hidden" name="totalamount" id="totalamount"  value="0">
														<input type="hidden" name="netamount" id="netamount" >
														<input type="hidden" name="paid_amount" id="paid_amount" value="0">
														<input type="hidden" name="balance_amount" id="balance_amount" value="0">
														<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>														
														<script> 
															function submit_validation(){
															var err2=0;
															var dateval       = $('#SALE_entry_add_date').val();
															var type          = $('#aks_sls_qut_type').val();

															if (type=='party') {
																	var search         = $('#sale_party').val();

																	if(search.trim()=='')
																	{
																		$('#party_err').html('Select party Name!');
																		err2++;
																	}
																	else
																	{
																		$('#party_err').html('');
																	}

																	var party = $('#party_id_hidden').val();
																	if(party.trim()=='')
																	{
																		// $('#party_err').html('Enter Valid Party Name!');
																		//  Swal.fire({
																		// 		title: 'Error!',
																		// 		text: 'Enter Valid Party Name...!',
																		// 		icon: 'error',
																		// 		confirmButtonText: 'Okay'
																		// 		});
																		// err2++;
																	}
																	else
																	{
																		$('#party_err').html('');
																	}

															}
															else{

																var supplier_id_name = $('#supplier_id_name').val();

																if(supplier_id_name.trim()=='')
																{
																	$('#supplier_id_name_err').html('Select supplier is Required!');
																	Swal.fire({
																				title: 'Error!',
																				text:  'supplier is Required...!',
																				icon: 'error',
																				confirmButtonText: 'Okay'
																				});
																	err2++;
																}
																else
																{
																	$('#supplier_id_name_err').html('');
																}	

															}
															if(dateval.trim()=='')
															{
																$('#date_err').html('select date !');
																err2++;
															}
															else
															{
																$('#date_err').html('');
															}
														   var netamount = $('#netamount').val();

														    // if(netamount<=0)
													         // {
													            // $('#submit_err').html('Please Select Any One Of The Product !');
														         	// if (err2==0) {
														          //   Swal.fire({
																			// 		title: 'Error!',
																			// 		text:  'Please Select Any One Of The Product...!',
																			// 		icon: 'error',
																			// 		confirmButtonText: 'Okay'
																			// 		});
														          //   err2++;
														          // }
													         // }
													         // else
													         // {
													            // $('#submit_err').html('');
													         // }

													         var prd_val = $('.product_validation').length;

													         if (prd_val < 1) {
																		  
																		  if (err2==0) {
														            Swal.fire({
																					title: 'Error!',
																					text:  'Please Select Any One Of The Product...!',
																					icon: 'error',
																					confirmButtonText: 'Okay'
																					});
														            err2++;
														          }

																		}


																		$('.product_validation').each(function(){

																			var value = $(this).val() ? $(this).val() :0;
																		   if(value==0){
																		   		// if (err2==0) {
																            Swal.fire({
																							title: 'Error!',
																							text:  'Please check the Product weight...!',
																							icon: 'error',
																							confirmButtonText: 'Okay'
																							});
																            err2++;
																          // }
																		   }
																		});
											         	
											         		// alert(prd_val);



														     if(err2>0){ return false; }else{ return true; }
														}
														</script>													
												</div>	
												<div class="col-lg-6">
													<!-- <div class="px-4" style="border-radius: 10px;padding-bottom: 10px;box-shadow: 0 5px 10px #00002947;"> -->

														<div class="row">
															<div class="col-lg-3">
																<label class="col-form-label fw-semibold fs-6 ">Category</label>
															</div>
															<div class="col-lg-9 fv-row fv-plugins-icon-container">
																<select class="form-select form-select-solid" name="category_select" id="category_select" data-control="select2" data-hide-search="false" onchange="category_selected()">
																	<option value="all" selected>All</option>
																	<?php foreach ($category_list1 as $category_list) { ?>
																		<option value="<?php echo $category_list['AKSCATEGORY_ID']; ?>" <?php if ($category_list1 == $category_list['AKSCATEGORY_NAME']) {
																			   echo "selected";
																		   } ?>
																		><?php echo $category_list['AKSCATEGORY_NAME']; ?></option><?php
																	} ?>
																	<input type="hidden" name="add_cart" id="add_cart" value="<?php echo $category_list['AKSCATEGORY_NAME']; ?>">
																</select>
															</div>
														</div>
													    <div style="position: relative;overflow-x: hidden; !important;min-height: 370px !important;max-height: 370px !important;">
															<div class="row mt-4" id="menuchange">
																 <?php foreach ($sale_menu as $slist) { ?>
																	<div class="col-lg-3 fv-row fv-plugins-icon-container" onclick="add_cart(<?php echo $slist['AKS_PRD_MID']; ?>)">

																		 <?php if($slist['AKS_PRD_IMG']!=''){?> 
																		 <a href="javascript:;" id="add_cart" class="btn btn-active-primary px-2 py-2">
																			<div class="image-input-wrapper overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover w-90px h-80px"   style="background-image: url(<?php echo base_url() ?>assets/images/aks_product_image/<?php echo $slist['AKS_PRD_IMG']; ?>); border-radius: 10px; ">
																		  </div>
																		 </a>		
																		 <?php }else{ ?>	
																		 	<a href="javascript:;" id="add_cart" class="btn btn-active-primary px-2 py-2">
																			<div class="image-input-wrapper overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover w-90px h-80px"   style="background-image: url(<?php echo base_url() ?>assets/images/karupatti.jpg); border-radius: 10px; ">
																		  </div>
																		 </a>	
																		 <?php } ?>	
																																				
																		<div class="d-flex flex-column"> 
																			<?php
																				$product_name = $slist['AKS_PRD_NAME'];
																				if (strlen($product_name) > 10) {
																				  $product_name = substr($product_name, 0, 10) ."...";
																				}
																			?>
																				<a href="javascript:;" class="text-gray-600 text-hover-primary fs-7 pdt_tltp">
																				    <span><?php echo $product_name; ?></span>
																				    <span class="pdt_sub_tltp"><?php echo $slist['AKS_PRD_NAME']; ?></span>
																				</a>
																		</div>
																		<span  class="fs-6 fw-bold"><i class="fa-sharp fa-solid fa-indian-rupee-sign eyc fs-6">
																		</i><?php echo $slist['AKS_PRD_PRICE']; ?>/<?php echo $slist['AKS_PRD_WT']; ?> g</span>
																	</div>
																	
																<?php } ?>
															</div>	
														</div>
														<!-- <div class="fv-plugins-message-container invalid-feedback text-end" id="submit_err"></div> -->
														<div class="d-flex justify-content-end align-bottom mt-13" style="padding-top:20px !important;">
															<a type="reset" class="btn btn-secondary me-2" href="<?php echo base_url(); ?>/Akssalequotation">Cancel</a>
															<button class="btn btn-primary" type="submit" onclick="submit_validation()" >Add Quotation</button>
														</div>
													</form>
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
					  <?php $this->load->view("footer"); ?>
					</div>
					<!--end::Content-->
				</div>
				<!--end::Wrapper-->
			</div>
			<!--end::Page-->
		</div>
		<div class="modal fade" id="kt_modal_add_party" tabindex="-1" aria-hidden="true">					
		
		</div>
		<!--end::Root-->
		
		<input type="hidden" id="baseurl" value="<?php echo base_url(); ?>">
		<?php $this->load->view("script"); ?>
		<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
 <!--<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>-->

 <script src="<?php echo base_url(); ?>assets/jquery.autocomplete.js"></script>

 		<script type="text/javascript">
			function karpattiparty_add() {						
				var baseurl= $("#baseurl").val();
					// alert(val);
					$.ajax({
					type: "POST",
					url: baseurl+'Akssale/karpatti_party_add',
					async: false,
					type: "POST",							
					success: function(response)
					{
						$('#kt_modal_add_party').empty().append(response);
						$('#kt_modal_add_party').addClass('show');
					}
					});
			}
		</script>

		 <script>
					function sales_quote_func()
					{
						var aks_sls_qut_type = document.getElementById("aks_sls_qut_type").value;
						var aks_par_label = document.getElementById("aks_par_label");
						var aks_par_tbox = document.getElementById("aks_par_tbox");
						var aks_sup_label = document.getElementById("aks_sup_label");
						var aks_sup_tbox = document.getElementById("aks_sup_tbox");
						
						if (aks_sls_qut_type == "supplier") 
						{
							aks_sup_label.style.display="block";
							aks_sup_tbox.style.display="block";
							aks_par_label.style.display="none";
							aks_par_tbox.style.display="none";
							
						}
						else
						{
							aks_sup_label.style.display="none";
							aks_sup_tbox.style.display="none";
							aks_par_label.style.display="block";
							aks_par_tbox.style.display="block";
						}
					};
		</script>
		<script>


			function supilerget(){

					var baseurl = $("#baseurl").val();
						const str = $('#supplier_id_name').val();
						const val = str.split("~")[1].substring(0);
						console.log(val); // Output: L10039

						$.ajax({
								type: "GET",
								url: baseurl+'Akssalequotation/aks_supplier_details',
								async: false,
								type: "POST",
								data: "id="+val,
								dataType: "html",
								success: function(response)
								{
										
									  var res=response.split('||');
										$("#party_name_view").html(res[0]);						  
										$("#party_address").html(res[2]);
										// $("#party_ship_address_get").html(res[3]);
										$("#party_mobile").html(res[3]);
										$('#party_email').html(res[4]);

								}
							});

			}

			
		</script>
 

		<script>
				var baseurl = $("#baseurl").val();
				

					$("#sale_party").autocomplete({ 
							valueKey:'title',
							source:[{
							url:baseurl+'Akssalequotation/sale_list_det?query=%QUERY%',
							type:'remote',
							ajax:{
							  dataType : 'json',
							}
						}]}).on('selected.xdsoft',function(e,suggestion,ui){ 

						$("#party_name_view").val(suggestion.firstname);
						$("#sale_party").val(suggestion.firstname);
						$('#party_id_hidden').val(suggestion.id_party);
							// $('#party_photo').val(suggestion.party_photo);
							
						
							$("#party_name_view").html(suggestion.firstname);
						  
							$("#party_address").html(suggestion.address);
							// $("#shipment_to").html(suggestion.address);
							$("#party_mobile").html(suggestion.phone);
							$("#party_email").html(suggestion.email);
							$("#party_shipment_address").html(suggestion.shipment_address);
						   
						});
		</script>	

		<script>
			$("#view_table_scroll").DataTable({
				//"aaSorting":[],
				"sorting":false,
				"paging": false,
				"info": false,
				// "responsive": true,
				 "language": {
				  "lengthMenu": "Show _MENU_",
				 },
				 "dom":
				  "<'row'" +
				  // "<'col-sm-6 d-flex align-items-center justify-conten-start'l>" +
				  ">" +

				  "<'table-responsive'tr>" +

				  "<'row'" +
				  // "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
				  // "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
				  ">"
				});
			$('#view_table_scroll').wrap('<div class="dataTables_scroll" />');
		</script>

		<script>
	      $("#view_table_scroll").kendoTooltip({
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


			var arr  =[];

			function add_cart(ind)
			{

				// alert(ind)
				
				var baseurl= $("#baseurl").val();

			
			
				count=$(".btnDelete").length;

				if (isNaN(count)) count = 0;


				if(count > 0){

 					let element = {id: ind};



					let chk = arr.some(it => it.id == element.id);

					if(chk){

							var prd_wgt= parseInt($("#prd_wgt"+ind).val());

							if (isNaN(prd_wgt)) prd_wgt = 0;
							$("#prd_wgt"+ind).val(prd_wgt+1000);

							var j = 1;

					}else{
						var j = 0;
					}


				}else{
					var j = 0;
				}

			if(j==0){
				$.ajax({
					type: "POST",
					url: baseurl+'Akssalequotation/add_cart_list',
					async: false,
					type: "POST",
					data: "id="+ind+"&count="+count,
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

		
			
			price_update(ind);
			
					//cart_prd_cal(count);

				// alert(count)
				
		}

		
		function price_update(ind){



			var val = parseInt(ind);

			if (isNaN(val)) val = 0;

			if(val > 0){

				var prd_wgt=parseFloat($('#prd_wgt'+ind).val());
				var prd_unit=parseFloat($('#prd_unit'+ind).val());
				var prd_prc=parseFloat($('#lb_prd_price'+ind).html());  

				if (isNaN(prd_wgt)) prd_wgt = 0;
				if (isNaN(prd_unit)) prd_unit = 0;
				if (isNaN(prd_prc)) prd_prc = 0;

				var total= parseFloat(( prd_wgt / prd_unit) * prd_prc);

			

			 	$('#lbl_price_tot'+ind).html(parseFloat(total).toFixed(2));


			 	let element = {id: ind};



				let chk = arr.some(it => it.id == element.id);

				if(chk){

					arr.forEach((element, index) => {
						if(element.id == ind) {
							arr[index]['amount'] = total;
						}
					});

				}else{
					arr.push({id:ind,amount:total});
				}
				
				const sum = arr.reduce((amt, ob) => {
																							return amt + ob.amount;
																						}, 0);


					$('#lbl_tot_pay').html(sum);
					$('#totalamount').val(sum);
					$('#lbl_net_pay').html(sum);
					$('#lbl_net_pay1').html(sum);
					$('#netamount').val(sum);

				}

		}


		$("#table_row").on('click', '.btnDelete', function () {

					$(this).closest('tr').remove();

					let id = $(this).attr("name");
					
					var data = $.grep(arr, function(e){ 

								return e.id != id; 
							});

					arr = data ;

					const sum = arr.reduce((amt, ob) => {
																							return amt + ob.amount;
																						}, 0);


					$('#lbl_tot_pay').html(sum);
					$('#totalamount').val(sum);
					$('#lbl_net_pay').html(sum);
					$('#lbl_net_pay1').html(sum);
					$('#netamount').val(sum);
					cart_prd_totcal()
			});


			

			
		</script>

		<script>
			cart_prd_totcal()
			function cart_prd_totcal()
			{
				var tot_cart_amt=parseFloat($('#total_cart_amount').val());
				var dis_cart_amt=parseFloat($('#dis_cart_amt').val());
				var rc_tot=parseFloat($('#lbl_tot_pay').html());
				var net_amt =parseFloat($('#net_amt').html());

				if (isNaN(tot_cart_amt))   tot_cart_amt = 0;
				if (isNaN(dis_cart_amt)) dis_cart_amt = 0;
				if (isNaN(net_amt)) net_amt = 0;
				if (isNaN(rc_tot)) rc_tot = 0;


				var ntot   = rc_tot - dis_cart_amt;

				var nettot = rc_tot - dis_cart_amt;

				if (nettot<0) {
						var rc_tots=parseFloat($('#lbl_tot_pay').html());
						$('#netamount').val(rc_tots);
						$('#dis_cart_amt').val(0);

						$('#lbl_net_pay').html(rc_tots);
						Swal.fire({
						title: 'Amount Mismatch!',
						text: 'Please Check The Enter Amount is Exceed..',
						icon: 'error',
						confirmButtonText: 'Okay'
						});

						


				}else{

						$('#lbl_net_pay').html(nettot);
						$('#lbl_net_pay1').html(nettot);
						$('#netamount').val(nettot);

				}

			}
		</script>
		
		
		<script>
				$("#SALE_entry_add_date").flatpickr({
					dateFormat: "d-m-Y",
				});
		</script>
		
		<script>
			function category_selected(){
				var val= $("#category_select").val();
				var baseurl= $("#baseurl").val();
				// alert(val);
				$.ajax({
					type: "POST",
					url: baseurl+'Akssalequotation/category_select',
					async: false,
					type: "POST",
					data: "id="+val,
					dataType: "html",
					success: function(response)
					{   					
						$("#menuchange").empty().append(response);
					
					}
					});
			}
		</script>

	
	</body>
	<!--end::Body-->
</html>


