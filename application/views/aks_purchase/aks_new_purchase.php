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
	.table_tool_purchase{
        max-width: 30px !important;
        white-space: nowrap;
        text-overflow: ellipsis;
        overflow: hidden;
      }
      [role="tooltip"]{
        visibility: hidden;
      }
</style>
<link href="<?php echo base_url();?>assets/jquery.autocomplete.css" rel="stylesheet" type="text/css" />

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
									<h1 class="d-flex align-items-center text-dark fw-bold my-1 fs-3">New Product Purchase
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
									<?php if(isset($_SESSION['Karupatti PurchaseAdd'])){ if($_SESSION['Karupatti PurchaseAdd']==1){?>
									<!--begin::Tables Widget 9-->
									<div class="card card-xxl-stretch mb-5 mb-xl-8">
									

										<!--begin::Card header-->
										<!-- <div class="card-header1 border-0 pt-6">
										</div> -->
										<!--end::Card header-->
										<!--begin::Card body-->
										<div class="card-body py-4">
											<form method="POST" action="<?php echo base_url(); ?>Akspurchase/purchase_save" enctype="multipart/form-data" onsubmit="return new_purchace_validation();">
											  <div class="row">
												  <div class="col-lg-7">
														<div class="row">
															<!--begin::Col-->															
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
																	<input class="form-control form-control-solid ps-12" name="pur_date" placeholder="Date" id="purchase_entry_add_date"  value="<?php echo date("d-m-Y"); ?>"/>
																</div>
																<div class="fv-plugins-message-container invalid-feedback" name="date_err" id="date_err" ></div>
									                       </div>
															<label class="col-lg-2 col-form-label fw-semibold fs-6 required">Supplier</label>
															<div class="col-lg-6  fv-row fv-plugins-icon-container ">
																<select class="form-select form-select-solid" data-control="select2" name="sup_id"  id="sup_id" data-hide-search="false" onchange="supplier_data()">
																		<option value="">Select</option>
																		<?php foreach($suppliers_list as $supplierslist)
																		{?>
																		<option value="<?php echo $supplierslist['LEDGER_SNO'] ;?>"><?php echo $supplierslist['LEDGER_NAME'];?><?php echo $supplierslist['PHONE']?' - '.$supplierslist['PHONE']:'';?></option><?php
																		 }?>
																	</select>
																	<input type="hidden" name="sup_name" id="sup_name" value="" >
																<div class="fv-plugins-message-container invalid-feedback" name="sup_name_err" id="sup_name_err" ></div>
																
															</div>
															<!--end::Col-->
														</div>
														<div class="row">
															<div class="col-lg-6">
																<div class="row">
																	<div class="col-lg-4">
																		<label class="col-form-label fw-semibold fs-6 " title="Total Credit Amount">Credit Amt</label>
																	</div>
																	<div class="col-lg-8"> 
																		<label class="col-form-label fw-bold fs-4 text-danger" title="Total Credit Amount" id="credit_amt">0.00</label>	
																	</div>
																</div>																	
															</div>
															<div class="col-lg-6">
																<div class="row">
																	<div class="col-lg-4">
																		<label class="col-form-label fw-semibold fs-6" title="Total Debit Amount">Debit Amt</label>
																	</div>
																	<div class="col-lg-8"> 
																		<label class="col-form-label fw-bold fs-4 text-success" title="Total Debit Amount" id="debit_amt">0.00</label>	
																	</div>
																</div>
															</div>
														</div><br>
														<table id="view_table_scroll" class="table align-middle table-row-dashed table-striped table-hover fs-7 gy-1 gs-2"  >
															<thead>
																<tr class="text-start text-muted fw-bold fs-7 gs-0">
																	<th class="min-w-25px">Sno</th>
													  	    <th class="min-w-50px">Product</th>
													  	    <th class="min-w-25px">Wgt (gms)</th>
																	<th class="min-w-100px">Per Price /(gms)</th>
																	<th class="min-w-25px">Price</th>
																	<th class="min-w-25px">Action</th>
																</tr>
															</thead>
															<tbody class="text-gray-600 fw-semibold" id="table_row">
																
															</tbody>	
														</table>
														<div class="row mt-10">
															<label class="col-lg-3 col-form-label fw-bold fs-4">Total amount &nbsp;&nbsp;&nbsp;</label>
															<label class="col-lg-2 col-form-label fw-bold fs-3">
																<span name="total_amt" id="lbl_tot_pay">0.00
																	<input type="hidden" name="total_cash_hidden" id="total_cash_hidden" value="0">
																</span>
															</label>															
															<label class="col-lg-4 col-form-label fw-bold fs-4 ">Discount</label>
														  <div style="width:100.25px;" class="col-lg-3">
																<input type="text" name="dis_cart_amt" id="dis_cart_amt" class="col-lg-4 form-control form-control-lg form-control-solid fs-4"  onkeyup="cart_prd_totcal()" value="0.00" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
															</div>
											      </div>	
														<div class="row mt-2">	
															<label class="col-lg-3 col-form-label fw-bold fs-4" >Paid amount &nbsp;&nbsp;&nbsp;</label>
															<label class="col-lg-2 col-form-label fw-bold fs-3" id="label_paid_amount" >0.00</label>
															<label class="col-lg-4 col-form-label fw-bold fs-4" >Balance amount </label>
															<label class="col-lg-3 col-form-label fw-bold fs-3" id="label_balance_amount">0.00</label>
														</div>
														<div class="row mt-2">	
															<div class="col-lg-4">
																<label class="form-check form-check-inline form-check-solid me-2 is-invalid mt-6">
																	<input class="form-check-input" name="production_chk" type="checkbox" id="production_chk" onclick="production_chk_func()" value="1">
																	<span class="col-form-label fw-bold fs-5">Karuppati Production</span>
																</label>
															</div>												
															<div class="col-lg-6 col-form-label text-center">
																<label class="fw-bold fs-2" id="net_amt">Net Amount</label>
																<div class="d-block">
																	<label class="badge badge-danger px-2 py-2 fw-bold fs-2" style="background-color:red !important;">
																		<span class="me-1">₹</span>
																		<span id="lbl_net_pay" name="lbl_net_pay" onkeyup="pay_to_purchase_calc()">0.00</span>
																	</label>
																</div>
															</div>
															
														</div>
														<!--hidden form-->
														<div class="row">
															<input type="hidden" name="totalamount" id="totalamount" >
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
														</div>
														<script>
															function pay_amount(){
																$('#cashcheck').val($('#cash_received_add_radio').val());
																$('#chequechk').val($('#cheque_received_add_radio').val());
																$('#rtgschk').val($('#rtgs_received_add_radio').val());
																$('#upichk').val($('#upi_received_add_radio').val());

																$('#cashamount').val($('#cash_amount').val());
																$('#cashdetail').val($('#cash_detail').val());

																$('#chequeamount').val($('#cheque_amount').val());
																$('#chequesupbank').val($('#supplier_bank').val());
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

																var err = 0;

																	var cash_amt   = $('#cash_amount').val();
																	var upi_amt    = $('#upi_amount').val();
																	var cheque_amt = $('#cheque_amount').val();



																  if((cash_amt<=0) && (upi_amt<=0) && (cheque_amt<=0))
																	{

																		$('#payment_err').html('Please select Any one of the payment mode and Enter Amount !');
																		err++;

																	}
																	else
																	{
																		$('#payment_err').html('');
																		// $('#ac_amount_err').html('');
																	}
																    
																    if (cheque_amt>0) {

															    	var chequebank = $('#supplier_bank').val();
															    	if (chequebank=="") {

																	    	$('#supplier_bank_err').html('Enter Supplier Bank Required!');
																				err++;
																		}
																		else{
																			$('#supplier_bank_err').html('');
																		}

																		// var chequerefno = $('#cheque_ref_no').val();
																		
																    // 	if (chequerefno.trim()=='') {

																	  //   	$('#cheque_ref_no_err').html('Reference No is Required !');
																		// 		err++;
																		// }
																		// else{

																		// 		$('#cheque_ref_no_err').html('');

																		// 	}

																    }
																    else{
																    	$('#cheque_ref_no_err').html('');
																    	$('#supplier_bank_err').html('');
																    }
																     if (upi_amt>0) {															    	

																			// var upirefno = $('#upi_ref_no').val();
																	    // 	if (upirefno.trim()=='') {

																		  //   	$('#upi_ref_no_err').html('Transaction No is Required !');
																			// 	err++;
																			// }
																			// else{
																			// 	$('#upi_ref_no_err').html('');
																			// }
																			var upi_bank = $('#upi_bank_id').val();
																			// alert(upi_bank)
																	    	if (upi_bank=='') {

																		    	$('#upi_bank_id_err').html('Bank is Required !');
																				err++;
																			}
																			else{
																				$('#upi_bank_id_err').html('');
																			}

																    }
																    else{

																    		$('#upi_ref_no_err').html('');
																    		$('#upi_bank_id_err').html('');

																    }

																    var balance = parseFloat($('#balance_amount').val());
																		var paid    = parseFloat($('#paid_amount').val());


																		// alert(balance);
																		// alert(paid);

																		var btn_submit = document.getElementById("new_purchase");			

																		  if(paid>1)
																			{
																				 btn_submit.style.display = "block";
																			}
																			else{

																				btn_submit.style.display = "none";
																			}

																    

																     if(err>0){ 

																	     	$("#btn_pay").show();
																	     	
																	     	$("#btn_save").hide();

																	     		 $("#cilck_message").hide(); 

																     return false;


																      }else{ 
																      	$("#btn_pay").hide();
																      	$("#btn_save").show();
																      	 $("#cilck_message").show(); 
																      return true;
																      }
														    }
														</script>													
													</div>	
													<div class="col-lg-5">
														<!-- <div class="px-4" style="border-radius: 10px;padding-bottom: 10px;box-shadow: 0 5px 10px #00002947;"> -->
															<div class="row">
																<div class="col-lg-2">
																	<label class="col-form-label fw-semibold fs-6 required">Category</label>
																</div>
																<div class="col-lg-6 fv-row fv-plugins-icon-container">
																	<select class="form-select form-select-solid" name="category_select" id="category_select" data-control="select2" data-hide-search="false" onchange="category_selected()">	
																		<option value="all" selected>All</option>
																		<?php foreach($category_list1 as $category_list1)
																		{?>
																		<option value="<?php echo $category_list1['AKSCATEGORY_ID'] ;?>" <?php if($category_list1==$category_list1['AKSCATEGORY_NAME']){ echo "selected"; } ?>
																		><?php echo $category_list1['AKSCATEGORY_NAME'];?></option><?php
																		 }?>
																		
											            </select>
														            
																</div>
															</div>
															<div style="position: relative;overflow-x: hidden; !important;min-height: 370px !important;max-height: 370px !important;">
																<div class="row mt-4" id="menuchange">
																	 <?php  foreach($pur_price as $plist){?>
																    <div class="col-lg-3 fv-row fv-plugins-icon-container" onclick="add_cart(<?php echo $plist['AKS_PRD_MID']; ?>)">

																    	
																		<?php if($plist['AKS_PRD_IMG']!=''){?> 
																			 <a href="javascript:;" id="add_cart" class="btn btn-active-primary px-2 py-2">
																				<div class="image-input-wrapper overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover w-90px h-80px"   style="background-image: url(<?php echo base_url() ?>assets/images/aks_product_image/<?php echo $plist['AKS_PRD_IMG']; ?>); border-radius: 10px; ">
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
																					$product_name = $plist['AKS_PRD_NAME'];
																					if (strlen($product_name) > 10) {
																					  $product_name = substr($product_name, 0, 10) ."...";
																					}
																				?>
																					<a href="javascript:;" class="text-gray-600 text-hover-primary fs-7 pdt_tltp">
																					    <span><?php echo $product_name; ?></span>
																					    <span class="pdt_sub_tltp"><?php echo $plist['AKS_PRD_NAME']; ?></span>
																					</a>
																			</div>
																		<span  class="fs-6 fw-bold"><i class="fa-sharp fa-solid fa-indian-rupee-sign eyc fs-6" id="add_cart"></i><?php echo $plist['AKS_PUR_PRICE']; ?>/<?php echo $plist['AKS_PRD_WT']; ?>g</span>
																	</div>
																	   <?php  }?>
																</div>
															</div>	
													</div>
													<div id="production_chk_tab" style="display:none;">
														<div class="row mt-2 mb-4">
														<label class="col-lg-12 fw-bold fs-2 text-center mt-2">Karuppati Production</label>
														<div class="separator border-gray-600"></div>
														<div class="col-lg-5">
															<div class="row mb-4">
																<div class="col-lg-2">
																	<label class="col-form-label fw-semibold fs-6 required">Category</label>
																</div>
																<div class="col-lg-6 fv-row fv-plugins-icon-container">
																	<select class="form-select form-select-solid" name="category_select_pro" id="category_select_pro" data-control="select2" data-hide-search="false" onchange="category_selected_pro()">	
																		<option value="all" selected>All</option>

																		<?php foreach($category_production as $category_pro) { ?>
																		<option value="<?php echo $category_pro['AKSCATEGORY_ID'] ;?>" <?php if($category_pro==$category_pro['AKSCATEGORY_NAME']){ echo "selected"; } ?>
																		><?php echo $category_pro['AKSCATEGORY_NAME'];?></option><?php
																		 }?>
																		
											            </select>
																</div>
															</div>
															<div  style="position: relative;overflow-x: hidden; !important;min-height: 280px !important;max-height: 280px !important;">
																<div class="row mt-4" id="menuchange_pro">
																	 <?php  foreach($pur_price as $plist){?>
																    <div class="col-lg-3 fv-row fv-plugins-icon-container" onclick="add_cart_pro(<?php echo $plist['AKS_PRD_MID']; ?>)">

																    	
																		<?php if($plist['AKS_PRD_IMG']!=''){?> 
																			 <a href="javascript:;" id="add_cart_pro" class="btn btn-active-primary px-2 py-2">
																				<div class="image-input-wrapper overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover w-90px h-80px"   style="background-image: url(<?php echo base_url() ?>assets/images/aks_product_image/<?php echo $plist['AKS_PRD_IMG']; ?>); border-radius: 10px; ">
																			  </div>
																			 </a>		
																			 <?php }else{ ?>	
																			 	<a href="javascript:;" id="add_cart_pro" class="btn btn-active-primary px-2 py-2">
																				<div class="image-input-wrapper overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover w-90px h-80px"   style="background-image: url(<?php echo base_url() ?>assets/images/karupatti.jpg); border-radius: 10px; ">
																			  </div>
																			 </a>	
																	 <?php } ?>	
																		<div class="d-flex flex-column"> 
																				<?php
																					$product_name = $plist['AKS_PRD_NAME'];
																					if (strlen($product_name) > 10) {
																					  $product_name = substr($product_name, 0, 10) ."...";
																					}
																				?>
																					<a href="javascript:;" class="text-gray-600 text-hover-primary fs-7 pdt_tltp">
																					    <span><?php echo $product_name; ?></span>
																					    <span class="pdt_sub_tltp"><?php echo $plist['AKS_PRD_NAME']; ?></span>
																					</a>
																			</div>
																		<span  class="fs-6 fw-bold"><i class="fa-sharp fa-solid fa-indian-rupee-sign eyc fs-6" id="add_cart_pro"></i><?php echo $plist['AKS_PUR_PRICE']; ?>/<?php echo $plist['AKS_PRD_WT']; ?>g</span>
																	</div>
																	   <?php  }?>
																</div>
															</div>
														</div>
														<div class="col-lg-7">
															<div class="row mt-2">
																<div class="col-lg-12">
																	<table id="view_production_karuppati_table" class="table align-middle table-row-dashed table-striped table-hover fs-7 gy-1 gs-2">
																		<thead>
																			<tr class="text-start text-muted fw-bold fs-7 gs-0">
																				<th class="min-w-25px">Sno</th>
																  	    <th class="min-w-50px">Product</th>
																  	    <th class="min-w-50px">Wgt(gms)</th>
																				<th class="min-w-25px">Per Price/(gms)</th>
																				<th class="min-w-25px">Price</th>
																				<th class="min-w-25px">Action</th>
																			</tr>
																		</thead>
																		<tbody class="text-gray-600 fw-semibold" id="table_row_pro">

																		</tbody>	
																	</table>
																</div>
															</div>
															<div class="row mt-2">
																<label class="col-lg-3 col-form-label fw-bold fs-4">Total Amount</label>
																<label class="col-lg-3 col-form-label fw-bold fs-4">
																	<span class="me-1">₹</span>
																	<span id="total_amt_label_pro">0.00</span>
																	<input type="hidden" name="total_amt_pro" id="total_amt_pro" value="0">
																</label>
																<label class="col-lg-3 col-form-label fw-bold fs-4">Making Charges</label>
																<div class="col-lg-3 fv-row fv-plugins-icon-container">
																	<input type="text" name="mackingcharges" id="mackingcharges" onkeyup="cart_prd_totcal_pro()" class="form-control form-control-lg form-control-solid fs-5" value="0" oninput="this.value = this.value.replace(/[^/0-9.]/g, '').replace(/(\..*)\./g, '$1');" style="width:100px !important;">
																	<div class="fv-plugins-message-container invalid-feedback" id=""></div>
																</div>
																<div class="col-lg-12 col-form-label text-center py-0">
																	<label class="fw-bold fs-2">Net Amount</label>
																	<div class="d-block">
																		<label class="badge badge-danger px-2 py-2 fw-bold fs-2" style="background-color:red !important;">
																			<span class="me-1">₹</span>
																			<span id="net_amt_label_pro">0.00</span>
																			<input type="hidden" name="net_amt_pro" id="net_amt_pro" value="0">
																		</label>
																	</div>
																</div>
															</div>
														</div>
														<div class="col-lg-4 mt-4">
															<div class="px-4" style="border:1.9px solid black;border-radius: 10px;">
																<div class="row">
																	<label class="col-lg-12 col-form-label fw-bold fs-4 text-center">Purchase Products</label>
																	<label class="col-lg-6 col-form-label fw-semibold fs-6 py-0">Net Amount</label>
																	<label class="col-lg-6 col-form-label fw-bold fs-3 py-0">
																		<span class="me-1">₹</span>
																		<span id="lbl_net_pay_pro" >0.00</span>
																	</label>
																	<label class="col-lg-6 col-form-label fw-semibold fs-6 py-0">Paid Amount</label>
																	<label class="col-lg-6 col-form-label fw-bold fs-3 py-0">
																		<span class="me-1">₹</span>
																		<span id="label_paid_amount_pro" >0.00</span>
																	</label>
																	<label class="col-lg-6 col-form-label fw-semibold fs-6 py-0">Balance Amt</label>
																	<label class="col-lg-6 col-form-label fw-bold fs-3 py-0">
																		<span class="me-1">₹</span>
																		<span id="label_balance_amount_pro" >0.00</span>
																	</label>
																</div>
															</div>
														</div>
														<div class="col-lg-4 mt-4">
															<div class="px-4" style="border:1.9px solid black;border-radius: 10px;">
																<div class="row">
																	<label class="col-lg-12 col-form-label fw-bold fs-4 text-center">Karuppati Production</label>
																	<label class="col-lg-6 col-form-label fw-semibold fs-6 py-0">Total Amount</label>
																	<label class="col-lg-6 col-form-label fw-bold fs-3 py-0">
																		<span class="me-1">₹</span>
																		<span id="tot_amt_label_pro_comp">0.00</span>
																	</label>
																	<label class="col-lg-6 col-form-label fw-semibold fs-6 py-0">Making Charges</label>
																	<label class="col-lg-6 col-form-label fw-bold fs-3 py-0">
																		<span class="me-1">₹</span>
																		<span id="mackingcharges_label_comp">0.00</span>
																	</label>
																	<label class="col-lg-6 col-form-label fw-semibold fs-6 py-0">Net Amount</label>
																	<label class="col-lg-6 col-form-label fw-bold fs-3 py-0">
																		<span class="me-1">₹</span>
																		<span id="net_amt_label_pro_comp">0.00</span>
																	</label>
																</div>
															</div>
														</div>
														<div class="col-lg-4 mt-13 text-center">
															<label class="fw-bold fs-2">
																<span>Tally Amount</span>

																<span class="ms-2 text-success" id="tallyplus" style="display:none;" >(<i class="fa-solid fa-plus fs-2 text-success"></i>)</span>
																<span class="ms-2" style="color:red !important; display:none;" id="tallyminus" >(<i class="fa-solid fa-minus fs-2" style="color:red !important;"></i>)</span>
															</label>
															<label class="d-block fw-bold fs-2">
																<span class="me-1">₹</span>
																<span id="tallyamount">0.00</span>
																<input type="hidden" name="tallyamount_hidden" id="tallyamount_hidden" value="0">
															</label>
														</div>
														</div>
													</div>
													<div class="fv-plugins-message-container invalid-feedback text-end" id="production_err"></div>
													<div class="fv-plugins-message-container invalid-feedback text-end"id="payment2_err"></div>
													<div class="d-flex align-items-center justify-content-end mt-2">
															<label class=" btn btn-sm btn-outline btn-outline-solid btn-outline-warning btn-active-light-primary me-2" data-bs-toggle="modal" data-bs-target="#kt_modal_purchase_payment" name="pay_btn" id="pay_btn" >Pay Now</label>												
														<button class="btn btn-sm btn-primary" name="new_purchase" id="new_purchase"style="display: none;">New Purchase</button>
													</div>
												</div>
											</form>
									</div>
								</div>
								<?php }}else{?><?php $this->load->view("common_role_permission_err"); ?><?php } ?>
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
	</div>

		<div class="modal fade" id="kt_modal_purchase_payment" tabindex="-1" aria-hidden="true" data-bs-keyboard="false" data-bs-backdrop="static">
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
						<form method="POST" autocomplete="off" action="<?php echo base_url(); ?>Akspurchase/purchase_save" enctype="multipart/form-data" onsubmit="return (false);">
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
												<input class="form-check-input" name="upi_received_add_radio" type="checkbox" value="UPI" id="upi_received_add_radio" onclick="upi_ln_recev_add_radio()">
											</label>
											<label class="col-form-label fw-semibold fs-6">UPI</label>
										</div>
									</div>
									<div class="col-lg-2 fv-row fv-plugins-icon-container fv-plugins-bootstrap5-row-invalid">
										<div class="d-flex align-items-center mt-1">
											<label class="form-check form-check-inline form-check-solid me-5 is-invalid">
												<input class="form-check-input" name="cheque_received_add_radio" type="checkbox" value="Cheque" id="cheque_received_add_radio" onclick="cheque_ln_recev_add_radio()">
											</label>
											<label class="col-form-label fw-semibold fs-6">Bank</label>
										</div>
									</div>
									
									<div class="col-lg-2 fv-row fv-plugins-icon-container fv-plugins-bootstrap5-row-invalid">
										<div class="d-flex align-items-center mt-1">
											<label class="form-check form-check-inline form-check-solid me-5 is-invalid">
												<input class="form-check-input" name="cash_received_add_radio" value="Cash" type="checkbox" value="Cash" id="cash_received_add_radio" onclick="cash_ln_recev_add_radio()">
											</label>
											<label class="col-form-label fw-semibold fs-6 me-5">Cash</label>
										</div>
									</div>
									<div class="fv-plugins-message-container invalid-feedback" id="payment_err" ></div>

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
										<div class="fv-plugins-message-container invalid-feedback" id="upi_ref_no_err"></div>
									</div>
									<div class="col-lg-3 fv-row fv-plugins-icon-container" id="upi_bank_tbox" style="display:none;">
										<select class="form-select form-select-solid"  data-dropdown-parent="#kt_modal_purchase_payment" data-control="select2"  data-hide-search="false" id="upi_bank_id" name="upi_bank_id">
											<option value="">Select</option>
											<?php
												$bnk_det=$this->db->query("SELECT * FROM BANKS WHERE ACTIVE='Y' AND COMPANYCODE='003'")->result_array();
												foreach ($bnk_det as $blist) {
												?>
												<option value="<?php echo $blist['SNO'];?>"><?php echo $blist['BANKNAME'];?></option>
												<?php
												}
												?>
										</select>
										<div class="fv-plugins-message-container invalid-feedback" id="upi_bank_id_err"></div>
									</div>
									<!-- <label class="col-lg-1 col-form-label fw-semibold fs-6" id="upi_detail" style="display:none;">Details</label> -->
									<div class="col-lg-3 fv-row fv-plugins-icon-container" id="upi_detail_tbox" style="display:none;">
										<textarea class="form-control form-control-solid" rows="1" placeholder="Details" name="upi_details" id="upi_details"></textarea>
									</div>
								</div>
								<div class="row">
									<label class="col-lg-1 col-form-label fw-semibold fs-6" id="cheque_amt" style="display:none;">Bank</label>
									<div class="col-lg-2 fv-row fv-plugins-icon-container" id="cheque_amt_tbox" style="display:none;">
										<input type="text"  class="form-control form-control-lg form-control-solid" placeholder="Amount"oninput="this.value = this.value.replace(/[^/0-9.]/g, '').replace(/(\..*)\./g, '$1');" onkeyup="pay_to_purchase_calc()"  value="0" name="cheque_amount" id="cheque_amount" >
									</div>
									<div class="col-lg-3 fv-row fv-plugins-icon-container" id="cheque_chq_no_tbox" style="display:none;">
										<input type="text" name="cheque_ref_no" id="cheque_ref_no" class="form-control form-control-lg form-control-solid" placeholder="Trans/Ref Number" oninput="this.value = this.value.replace(/[^A-Za-z/0-9.]/g, '').replace(/(\..*)\./g, '$1');">
										<div class="fv-plugins-message-container invalid-feedback" id="cheque_ref_no_err"></div>
									</div>
									<div class="col-lg-3 fv-row fv-plugins-icon-container" id="cheque_bank_tbox" style="display:none;">
										<!-- <input type="text"  class="form-control form-control-lg form-control-solid" placeholder="Enter Supplier Bank" oninput="this.value = this.value.replace(/[^A-Za-z/0-9.]/g, '').replace(/(\..*)\./g, '$1');" name="supplier_bank" id="supplier_bank"> -->
										<select class="form-select form-select-solid"  data-dropdown-parent="#kt_modal_purchase_payment" data-control="select2"  data-hide-search="false" id="supplier_bank" name="supplier_bank">
											<option value="">Select</option>
											<?php
												$bnk_det=$this->db->query("SELECT * FROM BANKS WHERE ACTIVE='Y' AND COMPANYCODE='003'")->result_array();
												foreach ($bnk_det as $blist) {
												?>
												<option value="<?php echo $blist['SNO'];?>"><?php echo $blist['BANKNAME'];?></option>
												<?php
												}
												?>
										</select>
										<div class="fv-plugins-message-container invalid-feedback" id="supplier_bank_err"></div>
									</div>
									<div class="col-lg-3 fv-row fv-plugins-icon-container" id="cheque_detail_tbox" style="display:none;">
										<textarea class="form-control form-control-solid" rows="1" placeholder="Details" name="cheque_details" id="cheque_details"></textarea>
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
								
								<div class="row mt-4">
									<div class="col-lg-6 text-center">
										<label class="col-form-label fw-bold fs-4">Paid Amount &emsp;</label>
										<label class="col-form-label fw-bold fs-3" id="lbl_paid_amt">0.00</label>
									</div>
									<div class="col-lg-6 text-center">
										<label class="col-form-label fw-bold fs-4">Balance Amount &emsp;</label>
										<label class="col-form-label fw-bold fs-3" id="lbl_bal_amt">0.00</label>
									</div>
								</div>
								<div class="d-flex justify-content-end mt-6 px-9">
									<button type="reset" class="btn btn-secondary me-3" data-bs-dismiss="modal">Cancel</button>
									<button class="btn btn-primary" id="btn_pay"   onclick="pay_amount()" style="display: none;">Ok</button>
									<button class="btn btn-primary" id="btn_save"  data-bs-dismiss="modal" onclick="pay_amount()" style="display: none;">Save</button>
									
								</div>
								<div class="fv-plugins-message-container invalid-feedback text-end" id="cilck_message" style="display: none;" >Click the save button to continue the process</div>

								
							<!-- </div> -->
							<!--end::Modal body-->

						</form>
					</div>
					<!--end::Modal content-->
				</div>
				<!--end::Modal dialog-->
			</div>
		</div>
		<!--end::Root-->
		<input type="hidden" id="baseurl" value="<?php echo base_url();?>">
		<?php $this->load->view("script");?>

		<script src="<?php echo base_url();?>assets/jquery.autocomplete.js"></script>

		<script>

			function cart_prd_totcal_pro()
			{
				var total_amt_pro =parseFloat($('#total_amt_pro').val());
				var mackingcharges=parseFloat($('#mackingcharges').val());
				var net_amt_pro   =parseFloat($('#net_amt_pro').val());
				var bal_amount_pur=parseFloat($('#balance_amount').val());

				if (isNaN(total_amt_pro))   total_amt_pro = 0;
				if (isNaN(mackingcharges)) mackingcharges = 0;
				if (isNaN(net_amt_pro)) net_amt_pro = 0;
				if (isNaN(bal_amount_pur)) bal_amount_pur = 0;

				var nettot_pro = parseFloat(total_amt_pro + mackingcharges);


				$('#net_amt_label_pro').html(nettot_pro.toFixed(2));
				$('#mackingcharges_label_comp').html(mackingcharges.toFixed(2));
				$('#net_amt_label_pro_comp').html(nettot_pro.toFixed(2));



				if (bal_amount_pur < nettot_pro) {

					var total = nettot_pro - bal_amount_pur;

					$('#tallyamount').html(total.toFixed(2));

					$('#tallyplus').show();
					$('#tallyminus').hide();

				}else{

					
					var total = bal_amount_pur - nettot_pro;
					$('#tallyamount').html(total.toFixed(2));
					
					$('#tallyminus').show();
					$('#tallyplus').hide();
				}

				var total2 = nettot_pro - bal_amount_pur;
				$('#tallyamount_hidden').val(total2.toFixed(2));

				var production_chk_tab = document.getElementById("production_chk_tab");

						if (production_chk.checked == true)
						{
							if (total2>0) {

								$('#pay_btn').hide();
								$('#new_purchase').show();
								$('#lbl_net_pay1').html(total2.toFixed(2));
							}else{


								$('#pay_btn').show();
								$('#lbl_net_pay1').html(total.toFixed(2));

								$('#new_purchase').hide();
							}
						}
				// pay_to_purchase_calc();
			}
			
		</script>
		<script>

			function pay_to_purchase_calc()
			{
				var cash=parseFloat($('#cash_amount').val());
				var cheque=parseFloat($('#cheque_amount').val());
				var upi=parseFloat($('#upi_amount').val());
				var rc_tot=parseFloat($('#lbl_net_pay1').html());
				if (isNaN(cash))   cash = 0;
				if (isNaN(cheque)) cheque = 0;
				if (isNaN(upi)) upi = 0;

				var tot= cash+cheque+upi;
				// alert(tot);
				$('#lbl_paid_amt').html(tot.toFixed(2));
				$('#label_paid_amount').html(tot.toFixed(2));
				$('#label_paid_amount_pro').html(tot.toFixed(2));

				$('#paid_amount').val(tot);

				var diff = rc_tot - parseFloat(tot);
				$('#lbl_bal_amt').html(diff.toFixed(2));
				$('#label_balance_amount').html(diff.toFixed(2));
				$('#label_balance_amount_pro').html(diff.toFixed(2));

				$('#balance_amount').val(diff.toFixed(2));

				if (diff < 0) {

					// alert("Please Check The Enter Amount is Exceed");
					Swal.fire({
						title: 'Amount Mismatch!',
						text: 'Please Check The Enter Amount is Exceed..',
						icon: 'error',
						confirmButtonText: 'Okay'
						});

				    $('#cash_amount').val('0');
				    $('#cheque_amount').val('0');
				    $('#upi_amount').val('0');
				    // $('#rtgs_amount').val('0');
				    $('#lbl_paid_amt').html('0');
				    $('#label_balance_amount').html('0');
				    $('#label_balance_amount_pro').html('0');
				    $('#lbl_bal_amt').html('0');
				    $('#label_paid_amount').html('0');
				    $('#label_paid_amount_pro').html('0');
				    $('#balance_amount').val('0');
				    $('#paid_amount').val('0');
				    document.getElementById('btn_pay').style.display="none";
				    	$("#btn_save").hide();
				    	 $("#cilck_message").hide(); 
				}
				if (diff > 0) {

					document.getElementById('btn_pay').style.display="block";
						$("#btn_save").hide();
						 $("#cilck_message").hide(); 
				}
				// cart_prd_totcal_pro();
			}

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

				var ntot = rc_tot - dis_cart_amt;

				var nettot= rc_tot-dis_cart_amt;

				if (nettot<0) {

						var rc_tots=parseFloat($('#lbl_tot_pay').html());
						$('#netamount').val(rc_tots);
						$('#dis_cart_amt').val(0);

						$('#lbl_net_pay').html(rc_tots);
						$('#lbl_net_pay_pro').html(rc_tots);
						$('#lbl_net_pay1').html(rc_tots);
						
						Swal.fire({
						title: 'Amount Mismatch!',
						text: 	'Please Check The Discount Amount is Exceed..',
						icon: 'error',
						confirmButtonText: 'Okay'
						});

						


				}else{

						$('#lbl_net_pay').html(nettot);
						$('#lbl_net_pay1').html(nettot);
						$('#lbl_net_pay_pro').html(nettot);
						$('#netamount').val(nettot);

				}

				pay_to_purchase_calc()
			}
		</script>
		
		<script> 
			function supplier_data(){

				var sup_id = $('#sup_id').val();
				// alert(sup_id);

					if (sup_id!='') {
					     var baseurl= $("#baseurl").val();
								// alert(baseurl);
							$.ajax({
								type: "POST",
								url: baseurl+'Akspurchase/supplier_data_get',
								async: false,
								data: "id="+sup_id,
								dataType: "html",
								success: function(response)
								{
									// alert(response);
										var res=response.split('||');
										$('#sup_name').val(res[1]);

										var cr = parseFloat(res[2]);
										var credit_amount = cr.toLocaleString('en-IN', {
										    maximumFractionDigits: 2,
										    style: 'currency',
										    currency: 'INR'
										});

										$('#credit_amt').html(credit_amount);

										var dr = parseFloat(res[3]);
										var debit_amount = dr.toLocaleString('en-IN', {
										    maximumFractionDigits: 2,
										    style: 'currency',
										    currency: 'INR'
										});
										$('#debit_amt').html(debit_amount);
								}
	   				 });
				}else{

					$('#sup_name').val('');
					$('#credit_amt').html('0.00');
					$('#debit_amt').html('0.00');
				}
			}

		</script>
		
		
    <script>

				function payment_mode(){


				var balance = parseFloat($('#balance_amount').val());
				var paid    = parseFloat($('#paid_amount').val());


				// alert(balance);
				// alert(paid);

				var btn_submit = document.getElementById("new_purchase");			

				  if(paid>1 && balance==0)
					{
						 btn_submit.style.display = "block";
					}
					else{

						btn_submit.style.display = "none";
					}

					
				}
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
				  // "<'col-sm-6 d-flex align-items-center justify-conten-start'l>" +
				  // ">" +

				  "<'table-responsive'tr>" +

				  "<'row'" +
				  // "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
				  // "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
				  ">"
				});
			 $('#view_table_scroll').wrap('<div class="dataTables_scroll" />');
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
			  		$('#cash_amount').val('0');
			  		pay_to_purchase_calc();
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
				    $('#cheque_amount').val('0');
				    pay_to_purchase_calc();
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
				     $('#upi_amount').val('0');
				     pay_to_purchase_calc();
			  	}
			};
		</script>
		
		<script>
			// production_chk_func()
			function production_chk_func()
					{
						var production_chk = document.getElementById("production_chk");
						var production_chk_tab = document.getElementById("production_chk_tab");

						if (production_chk.checked == true)
						{
						    production_chk_tab.style.display = "block";
						    // pay_to_purchase_calc();
				  	} else 
				  	{
				     	production_chk_tab.style.display = "none";
				     	$('#table_row_pro').empty().append();
				     	$('#mackingcharges').val('0');
				     	$('#total_amt_pro').val('0');
				     	$('#net_amt_pro').val('0');
				     	$('#tallyamount_hidden').val('0');
				     	
				     	$('#total_amt_label_pro').html('0.00');
				     	$('#tot_amt_label_pro_comp').html('0.00');
				     	$('#tallyamount').html('0.00');
				     	$('#net_amt_label_pro').html('0.00');
				     	$('#net_amt_label_pro_comp').html('0.00');			     	
				     	

				     	$('#tallyplus').hide();
				     	$('#tallyminus').hide();





				  	}
					}
		</script>
		<script>
				$("#purchase_entry_add_date").flatpickr({
					dateFormat: "d-m-Y",
				});
		</script>

		<script>


				var arr=[];
			

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
					url: baseurl+'Akspurchase/add_cart_list',
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

					var prd_wgt = parseFloat($('#prd_wgt'+ind).val());
					var prd_unit= parseFloat($('#prd_unit'+ind).val());
					var prd_prc = parseFloat($('#lb_prd_price'+ind).val());  

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


						$('#lbl_tot_pay').html(sum.toFixed(2));
						$('#totalamount').val(sum.toFixed(2));
						$('#lbl_net_pay').html(sum.toFixed(2));
						$('#lbl_net_pay1').html(sum.toFixed(2));
						$('#lbl_net_pay_pro').html(sum.toFixed(2));
						$('#netamount').val(sum.toFixed(2));

					}

					pay_to_purchase_calc();

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


						$('#lbl_tot_pay').html(sum.toFixed(2));
						$('#totalamount').val(sum.toFixed(2));
						$('#lbl_net_pay').html(sum.toFixed(2));
						$('#lbl_net_pay1').html(sum.toFixed(2));
						$('#lbl_net_pay_pro').html(sum.toFixed(2));
						$('#netamount').val(sum.toFixed(2));

						pay_to_purchase_calc();

				});			
		</script>

		<script>


				var arr_pro=[];
			

			function add_cart_pro(ind)
			{

				// alert(ind)
				
				var baseurl= $("#baseurl").val();

			
			
				count=$(".btnDeletepro").length;

				if (isNaN(count)) count = 0;


				if(count > 0){

 					let element = {id: ind};



					let chk = arr_pro.some(it => it.id == element.id);

					if(chk){

							// var prd_wgt= parseInt($("#prd_wgt"+ind).val());

							// if (isNaN(prd_wgt)) prd_wgt = 0;
							// $("#prd_wgt"+ind).val(prd_wgt+1000);

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
					url: baseurl+'Akspurchase/add_cart_list_pro',
					async: false,
					type: "POST",
					data: "id="+ind+"&count="+count,
					dataType: "html",
					success: function(response)
					{

						// alert(response);
						// var res=response.split('||');
							if(count==0){
								$("#table_row_pro").empty().append(response);
							}
							else{
								$("#table_row_pro").append(response);

							}
					}
					});
			}

		
			
			price_update_pro(ind);
				
		}

		
		function price_update_pro(ind){



			var val = parseInt(ind);

			if (isNaN(val)) val = 0;

			if(val > 0){

				var prd_wgt = parseFloat($('#prd_wgt_pro'+ind).val());
				var prd_unit= parseFloat($('#prd_unit_pro'+ind).val());
				var prd_prc = parseFloat($('#lb_prd_price_pro'+ind).val());  

				if (isNaN(prd_wgt)) prd_wgt = 0;
				if (isNaN(prd_unit)) prd_unit = 0;
				if (isNaN(prd_prc)) prd_prc = 0;


				var total= parseFloat(( prd_wgt / prd_unit) * prd_prc);

			

			 	$('#lbl_price_tot_pro'+ind).html(parseFloat(total).toFixed(2));


			 	let element = {id: ind};



				let chk = arr_pro.some(it => it.id == element.id);

				if(chk){

					arr_pro.forEach((element, index) => {
						if(element.id == ind) {
							arr_pro[index]['amount'] = total;
						}
					});

				}else{
					arr_pro.push({id:ind,amount:total});
				}
				
				const sum = arr_pro.reduce((amt, ob) => {
																							return amt + ob.amount;
																						}, 0);


					$('#total_amt_label_pro').html(sum.toFixed(2));
					$('#tot_amt_label_pro_comp').html(sum.toFixed(2));
					$('#total_amt_pro').val(sum.toFixed(2));
					$('#net_amt_pro').val(sum.toFixed(2));					


					// $('#totalamount').val(sum);
					// $('#lbl_net_pay').html(sum);
					// $('#lbl_net_pay1').html(sum);
					// $('#lbl_net_pay_pro').html(sum);
					// $('#netamount').val(sum);

				}
				cart_prd_totcal_pro();

		}


		$("#table_row_pro").on('click', '.btnDeletepro', function () {

					$(this).closest('tr').remove();

					let id = $(this).attr("name");
					
					var data = $.grep(arr_pro, function(e){ 

								return e.id != id; 
							});

					arr_pro = data ;

					const sum = arr_pro.reduce((amt, ob) => {
																							return amt + ob.amount;
																						}, 0);


					$('#total_amt_label_pro').html(sum.toFixed(2));
					$('#tot_amt_label_pro_comp').html(sum.toFixed(2));
					$('#total_amt_pro').val(sum.toFixed(2));
					$('#net_amt_pro').val(sum.toFixed(2));	
					cart_prd_totcal_pro();
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
				url: baseurl+'Akspurchase/category_select',
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
		// category_selected_pro()
		function category_selected_pro(){

			var val= $("#category_select_pro").val();
			var baseurl= $("#baseurl").val();
			// alert(val);
			$.ajax({
				type: "POST",
				url: baseurl+'Akspurchase/category_select_pro',
				async: false,
				type: "POST",
				data: "id="+val,
				dataType: "html",
				success: function(response)
				{
				
					$("#menuchange_pro").empty().append(response);
				
				}
				});

		}
		
	</script>

	<script>
			function new_purchace_validation()
			{
				var err = 0;
				var dateval       = $('#purchase_entry_add_date').val();
				var supname       = $('#sup_name').val();
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
			    if(supname.trim()=='')
			    {
			        $('#sup_name_err').html('Please Select Suplier is Required!');
			        Swal.fire({
								title: 'Error!',
								text:  'Please Select Suplier is Required ..',
								icon: 'error',
								confirmButtonText: 'Okay'
								});
			        err++;
			    }
			    else
			    {
			       
					$('#sup_name_err').html('');
					
			    }
			  var cash=parseFloat($('#cash_amount').val());
				var cheque=parseFloat($('#cheque_amount').val());
				var rtg=parseFloat($('#rtgs_amount').val());
				var upi=parseFloat($('#upi_amount').val());


				

				var production_chk = document.getElementById("production_chk");

				if (production_chk.checked === true) {

						var total_amt_pro = parseFloat($('#total_amt_pro').val());

						if (total_amt_pro<1) {

							$('#production_err').html('Please select any one of the product production !');
							 Swal.fire({
									title: 'Error!',
									text:  'Please select any one of the product production...',
									icon: 'error',
									confirmButtonText: 'Okay'
									});
				        err++;
						}
						else{

							$('#production_err').html('');
						}
						var pro = $('#tallyamount_hidden').val()
						if (pro<0) {

								if((cash<=0) && (cheque<=0)  && (upi<=0))
									{

										$('#payment_err').html('Please select Any one of the payment mode and Enter Amount !');
										$('#payment2_err').html('Please select the payment !');

										err++;
									}
									else
									{
										$('#payment_err').html('');
										$('#payment2_err').html('');
										// $('#ac_amount_err').html('');
									}

									var net     = parseFloat($('#lbl_net_pay1').html());
									var balance = parseFloat($('#balance_amount').val());
									var paid    = parseFloat($('#paid_amount').val());	

								  if(paid>net)
									{
										 Swal.fire({
												title: 'Payment Error!',
												text:  'Please Check paid Amount is Exceed...',
												icon: 'error',
												confirmButtonText: 'Okay'
												});
							        err++;
									}
									else{

										
									}


						}
				} 
				else 
				{

					if((cash<=0) && (cheque<=0)  && (upi<=0))
					{

						$('#payment_err').html('Please select Any one of the payment mode and Enter Amount !');
						$('#payment2_err').html('Please select the payment !');

						err++;
					}
					else
					{
						$('#payment_err').html('');
						$('#payment2_err').html('');
						// $('#ac_amount_err').html('');
					}

					var net     = parseFloat($('#lbl_net_pay1').html());
					var balance = parseFloat($('#balance_amount').val());
					var paid    = parseFloat($('#paid_amount').val());	

				  if(paid>net)
					{
						 Swal.fire({
								title: 'Payment Error!',
								text:  'Please Check paid Amount is Exceed...',
								icon: 'error',
								confirmButtonText: 'Okay'
								});
			        err++;
					}
					else{

						
					}
					$('#production_err').html('');
				 
				}



				var prd_val = $('.product_validation').length;

	       if (prd_val < 1) {
					  
					  if (err==0) {
	            Swal.fire({
								title: 'Error!',
								text:  'Please Select Any One Of The Product...!',
								icon: 'error',
								confirmButtonText: 'Okay'
								});
	            err++;
	          }

					}


					$('.product_validation').each(function(){

						var value = $(this).val() ? $(this).val() :0;
					   if(value==0){
					   		// if (err==0) {
			            Swal.fire({
										title: 'Error!',
										text:  'Please check the Product weight...!',
										icon: 'error',
										confirmButtonText: 'Okay'
										});
			            err++;
			          // }
					   }
					});
					
			    
			     // alert(err);
			     if(err>0){ return false; }else{ return true; }
			}		
		</script>
	</body>
	<!--end::Body-->
</html>