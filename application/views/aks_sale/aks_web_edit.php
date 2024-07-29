<?php $this->load->view("common"); ?>
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
									<h1 class="d-flex align-items-center text-dark fw-bold my-1 fs-3">Website Sale Edit
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

										<!--begin::Card header-->
										<!-- <div class="card-header1 border-0 pt-6">
										</div> -->
										<!--end::Card header-->

										<!--begin::Card body-->
										<?php  if(isset($_SESSION['Karupatti SaleEdit'])){ if($_SESSION['Karupatti SaleEdit']==1){?>
											<?php if(isset($edit)){ ?>
												<div class="card-body py-4">
													<div class="row">
														<div class="col-lg-12">
															<form method="POST" autocomplete="off" action="<?php echo base_url(); ?>Akssale/web_update" id="submit_form" enctype="multipart/form-data" onsubmit="return edit_web_validation()">
															<!-- <div class="px-4" style="border-radius: 10px;padding-bottom: 10px;box-shadow: 0 5px 10px #00002947;"> -->
																<div class="row">
																<label class="col-lg-2 col-form-label fw-semibold fs-6">Website Order ID</label>
																	<label class="col-lg-3 col-form-label  fw-bold fs-5"><?php echo $web_order_id; ?></label>
																	<label class="col-lg-2 col-form-label fw-semibold fs-6">Website Sale ID</label>
																  <label class="col-lg-4 col-form-label fw-bold fs-6"><?php echo $edit->web_id; ?></label>
																  </div>
																  <div class="row">
																  <label class="col-lg-2 col-form-label fw-semibold fs-6">Date</label>
																  <?php $date = date('d-m-Y',strtotime($edit->date)); ?>
																  <label class="col-lg-3 col-form-label fw-bold fs-6" id=""><?php echo $date; ?></label>

										              <?php
										               $party   = json_decode($edit->party_info); 
										               $address = json_decode($edit->billing_address); 
										               $ship    = json_decode($edit->shipping_address); 
										              ?>
																  <label class="col-lg-2 col-form-label fw-semibold fs-6">Party</label>
																  <label class="col-lg-4 col-form-label fw-bold fs-6" id=""><?php echo $edit->party; ?></label>
																  <label class="col-lg-2 col-form-label fw-semibold fs-6">Phone</label>
																  <label class="col-lg-3 col-form-label fw-bold fs-6" id=""><?php echo $edit->mobile?$edit->mobile:'-'; ?></label>
																  <label class="col-lg-2 col-form-label fw-semibold fs-6">Email</label>
																  <label class="col-lg-4 col-form-label fw-bold fs-6" id=""><?php echo $party->email?:'---'; ?></label>
																  <label class="col-lg-2 col-form-label fw-semibold fs-6">Bill.Address</label>
																  <label class="col-lg-3 col-form-label fw-bold fs-6" id="">
																	    <?php echo ($address && $address->billing_address_1) ? $address->billing_address_1 : (($address && $address->billing_address_2) ? $address->billing_address_2 : '-'); ?>
																	</label>
																  <label class="col-lg-2 col-form-label fw-semibold fs-6">Ship.Address</label>
																  <label class="col-lg-4 col-form-label fw-bold fs-6" id="">

																  	<?php echo ($ship && $ship->wcf_shipping_address_1) ? $ship->wcf_shipping_address_1 : (($ship && $ship->wcf_shipping_address_2) ? $ship->wcf_shipping_address_2 : '-'); ?>
																  </label>

																  </div>

																<table id="view_table_scroll" class="table align-middle table-row-dashed table-striped table-hover fs-7 gy-1 gs-2" id="kt_datatable_dom_positioning">
																	<thead>
																		<tr class="text-start text-muted fw-bold fs-7 gs-0">
																			<th class="min-w-25px">Sno</th>
																			  <th class="min-w-80px">Website Product</th>
																			  <th class="min-w-50px">Website Wgt</th>
																			  <th class="min-w-80px">Product</th>
																			  <th class="min-w-25px">Wgt in g</th>
																			<!-- <th class="min-w-25px text-center">Qty</th> -->
																			<th class="min-w-50px">Per Price/g</th>
																			<th class="min-w-50px text-center">Price</th>
																		</tr>
																	</thead>
																	<tbody class="text-gray-600 fw-semibold fs-8" id="table_row">


																		
																	</tbody>	
																</table>
															
																<div class="row">


																	<div class="d-flex justify-content-end" >
																		<a href="<?php echo base_url(); ?>Akssale/Weblist">
																		<button type="button"  class="btn btn-sm btn-secondary mt-3"  >Cancel</button>
																		</a>
																		<button type="submit"  class="btn btn-sm btn-primary mt-3 ms-3">Update</button>
																	</div>
																</div>
																	<script type="text/javascript">
																		function edit_web_validation() {
																			var err =0;
																			$('.product_validation').each(function(){

																				var value = $(this).val() ? $(this).val() :0;
																			   if(value==0){
																			   		if (err==0) {
																	            Swal.fire({
																								title: 'Error!',
																								text:  'Please check the Product weight...!',
																								icon: 'error',
																								confirmButtonText: 'Okay'
																								});
																	            err++;
																	          }
																			   }
																			});
																			if (err>0) {
																				return false;
																			}else{
																				return true;
																			}
																		}
																	</script>
																	<input type="hidden" name="sale_id_hidden" id="sale_id_hidden" value="<?php echo $edit->web_id; ?>">
															</form>

																
														</div>
																	<div class="row" style="display: 	none;">

																		<div class="col-lg-12">
																		<label class="col-lg-12 col-form-label fw-bold fs-3 text-start">Mode of Delivery</label>
																		<div class="row">
																		<div class="col-lg-2 d-flex align-items-center">
																				<div class="form-check form-check-custom">
																					<input class="form-check-input2" type="radio" value="courier" name="delivery_add_mode_courier" id="delivery_add_mode_courier" onclick="delivery_mode_courier_radio(1)" <?php if($edit->delivery_mode!='Direct'){echo 'checked';} ?>  />
																				</div>
																				<div class="d-flex flex-column">
																					<div class="fs-6 fw-semibold text-muted" style="padding-left: 10px;">Courier</div>
																				</div>
																				
																			</div>
																			<!-- <div class="col-lg-2 d-flex align-items-center">
																				<div class="form-check form-check-custom">
																					<input class="form-check-input2" type="radio" id="select_int" name="delivery_add_mode_courier" value="Direct" onclick="delivery_mode_courier_radio(0)" < ?php if($edit->delivery_mode=='Direct'){echo 'checked';} ?> />
																				</div>
																				<div class="d-flex flex-column">
																					<div class="fs-6 fw-semibold text-muted" style="padding-left: 10px;">Direct</div>
																				</div>
																			</div> -->
																			
																			<!-- <div class="col-lg-4 fv-row fv-plugins-icon-container" id="delivery_par_tbox" style="display:block;">
																			<select class="form-select form-select-solid" data-control="select2"  data-hide-search="false" name="del_select">
																				<option value="" selected>Select</option>
																				< ?php foreach ($supplier_list as $sllist) { ?>		
																				<option value="< ?php echo $sllist['LEDGER_NAME']; ?>" < ?php if($sllist['LEDGER_NAME']==$edit->delivery_by){echo 'selected';} ?> >< ?php echo $sllist['LEDGER_NAME']; ?></option>
																				< ?php } ?>
																			</select>
																			</div>
																			<div class="col-lg-4 fv-row fv-plugins-icon-container" id="shipment_tbox" style="display:block;">
																			
																			<input type="text" name="shipment_charges" id="shipment_charges" value="< ?php echo $edit->shipment_charges?$edit->shipment_charges:0; ?>" class="form-control form-control-lg form-control-solid me-3" placeholder="Shipment charges" onkeyup="total_after_shipment()" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" onkeyup="pay_to_purchase_calc()" >
																			</div> -->
																		</div>
																	</div>
																	<div class="col-lg-12" style="display:none;">
																		<div class="row mt-8">
																			<label class="col-lg-3 col-form-label fw-bold fs-4" >Total amount &nbsp;&nbsp;&nbsp;</label>
																			<label class="col-lg-2 col-form-label fw-bold fs-3" name="total_amt" id="lbl_tot_pay">0.00</label>


																				
																			<label class="col-lg-4 col-form-label fw-bold fs-3">Discount</label>
																			  <div style="width:90.25px;" class="col-lg-2">
																				<input type="text" name="dis_cart_amt" id="dis_cart_amt" class="col-lg-4 form-control form-control-lg form-control-solid fs-4"  onkeyup="cart_prd_totcal(event)" value="<?php echo $edit->sale_dis_amt?$edit->sale_dis_amt:0; ?>" maxlength="5" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" onkeyup="pay_to_purchase_calc()" >
																				</div>
																		 </div>	
																	</div>
									  							<div class="row " style="display:none;">	
																		<label class="col-lg-3 col-form-label fw-bold fs-4" >Paid amount &nbsp;&nbsp;&nbsp;</label>
																		<label class="col-lg-2 col-form-label fw-bold fs-3" id="label_paid_amount" ><?php echo $edit->sale_cash?$edit->sale_cash:0; ?></label>
																		<label class="col-lg-4 col-form-label fw-bold fs-4" >Balance amount </label>
																		<label class="col-lg-3 col-form-label fw-bold fs-3" id="label_balance_amount">0.00</label>																
																	</div>
																	<div class="row" style="display:none;">
																		<label class="col-lg-3 col-form-label fw-bold fs-4" id="net_amt">Net Amount &emsp;</label>
																		<label class="col-lg-2 col-form-label fw-bold fs-3" id="lbl_net_pay" name="net_amount">0.00</label>
																		<div class="col-lg-3">
																			<textarea class="form-control form-control-solid" rows="1" id="remarks" name="remarks" placeholder="Enter Remarks"><?php echo $edit->remarks?$edit->remarks:''; ?></textarea>																
																	</div>
																	<div class="col-lg-2 mt-3 " style="display:none;">
																		<label class=" btn btn-sm btn-outline btn-outline-solid btn-outline-warning btn-active-light-primary ms-3" data-bs-toggle="modal" data-bs-target="#kt_modal_sale_payment" name="pay_btn" id="pay_btn" onclick="pay_to_purchase_calc()" >Pay Now</label>
																	</div>
																	<div class="col-lg-2" >
																		<button type="button"  class="btn btn-sm btn-primary mt-3" id="btn_submit" style="display: none;" onclick="submit_validation()">Update</button>
																	</div>																	
																	<div class="fv-plugins-message-container invalid-feedback text-end" id="submit_err"></div>													
																</div>
																<input type="hidden" name="shipment_to" id="shipment_to"  >
																<input type="hidden" name="totalamount" id="totalamount"  value="<?php echo $edit->sale_prd_tot_amt?$edit->sale_prd_tot_amt:0; ?>">
																<input type="hidden" name="netamount" id="netamount" >
																<input type="hidden" name="cashcheck" id="cashcheck" value="cash">

																<input type="hidden" name="chequechk" id="chequechk">
																<input type="hidden" name="rtgschk" id="rtgschk" >
																<input type="hidden" name="upichk" id="upichk" >

																<input type="hidden" name="cashamount" id="cashamount" >
																<input type="hidden" name="cashdetail" id="cashdetail" >

																<input type="hidden" name="chequeamount" id="chequeamount" value="0">
																<input type="hidden" name="chequesupbank" id="chequesupbank" value="0">
																<input type="hidden" name="chequerefno" id="chequerefno" value="0">
																<input type="hidden" name="chequedetail" id="chequedetail" value="0">

																<input type="hidden" name="upiamount" id="upiamount" value="0">
																<input type="hidden" name="upirefno" id="upirefno" value="0" >
																<input type="hidden" name="upibank" id="upibank" value="0">
																<input type="hidden" name="upidetail" id="upidetail" value="0">

																<input type="hidden" name="paid_amount" id="paid_amount" value="0">
																<input type="hidden" name="balance_amount" id="balance_amount" value="0">
																
																<script>
																	// add_validation()
																	// $(document).ready(function() {
																	// 		var submit_count =0;
																	// 		$('#btn_submit').click(function(){
																	// 			submit_count+=1;

																	// 			if(submit_count==1)
																	// 			{
																	// 				$('#submit_form').submit();
																	// 			}	
																	// 	});
																	// });
																 function add_validation(){
																	
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

																	$('#upiamount').val($('#upi_amount').val());
																	$('#upirefno').val($('#upi_ref_no').val());
																	$('#upibank').val($('#upi_bank_id').val());
																	$('#upidetail').val($('#upi_details').val());


																	var err = 0;
																	

																	 // const cash_received_add_radio = document.getElementById(cash_received_add_radio.value);
																	 // const cheque_received_add_radio = document.getElementById(cheque_received_add_radio.value);

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
																						   		if (err==0) {
																				            Swal.fire({
																											title: 'Error!',
																											text:  'Please check the Product weight...!',
																											icon: 'error',
																											confirmButtonText: 'Okay'
																											});
																				            err++;
																				          }
																						   }
																						});

																	var cash_amt   = $('#cashamount').val();
																	var upi_amt    = $('#upiamount').val();
																	var cheque_amt = $('#chequeamount').val();

																	if (isNaN(cash_amt))   cash_amt = 0;
																	if (isNaN(upi_amt))   upi_amt = 0;
																	if (isNaN(cheque_amt))   cheque_amt = 0;



																  if((cash_amt<=0) && (upi_amt<=0) && (cheque_amt<=0))
																	{

																		if (err==0) {
																		  $('#payment_err').html('Please select Any one of the payment mode and Enter Amount !');
																			Swal.fire({
																						title: 'Payment Error!',
																						text: 'Please select Any one of the payment mode and Enter Amount !',
																						icon: 'error',
																						confirmButtonText: 'Okay'
																						});
																			err++;
																		}

																	}
																	else
																	{
																		$('#payment_err').html('');
																		// $('#ac_amount_err').html('');
																	}
																    
																    if (cheque_amt>0) {

																    	var chequebank = $('#party_bank').val();
																    	if (chequebank.trim()=="") {

																	    	$('#party_bank_err').html('Please select Bank !');
																			  err++;
																		}
																		else{
																			$('#party_bank_err').html('');
																		}

																    }else{

																    	$('#party_bank_err').html('');
																    	$('#cheque_ref_no_err').html('');

																    }
																     if (upi_amt>0) {
																		var upi_bank = $('#upi_bank_id').val();
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
																    var paid = $('#paid_amount').val();
																    var tot  = $('#totalamount').val();

																    var paidamthtml  = $('#lbl_paid_amt').html();
																    var lbl_net_pay1 = $('#lbl_net_pay1').html();

																    if(paidamthtml!=lbl_net_pay1 )
															         {
															            $('#submit_err').html('Paid Amount Missmatched !');
															            $('#submit2_err').html('Paid Amount Missmatched !');
															           if (err==0) {
																            Swal.fire({
																						title: 'Amount Mismatch !',
																						text: 'Please Check The Enter Amount is Mismatch..',
																						icon: 'error',
																						confirmButtonText: 'Okay'
																						});
															        		}
																            $('#btn_submit').prop('disabled', true);
															         }
															         else
															         {
															            $('#submit_err').html('');
															            $('#submit2_err').html('');
															            $('#btn_submit').prop('disabled', false);
															         }
															         
															         var lbl_tot_pay  = parseFloat($('#lbl_tot_pay').html());
															         var count = $(".btnDelete").length;
															         if(lbl_tot_pay==0)
															         {
															         		if (count<=0) {
															         		// alert(count)
															         			$('#submit_err').html('Add Any One Of the Products !');
															         			$('#btn_submit').prop('disabled', true);
															         		}
															            
															            
															         }
															         else
															         {
															         	// alert(count)
															            $('#submit_err').html('');
															            $('#btn_submit').prop('disabled', false);
															         }
															         

																     if(err>0){ 

																     	$("#back_btn").hide(); 
																     	$("#ok_btn").show();


																     	


																     return false;


																      }else{ 
																      	$("#back_btn").show();
																      	$("#ok_btn").hide();
																      	var submit_count =0;
																					$('#btn_submit').click(function(){
																						submit_count+=1;

																						if(submit_count==1)
																						{
																							$('#submit_form').submit();
																						}	
																				});
																      return true;

																      }
																	    


																}
																
																</script>
																<script> 
																	function submit_validation(){



																	var err2=0;
																	var dateval       = $('#sale_entry_add_date').val();
																	var search         = $('#sale_party').val();

																	

																	if(dateval.trim()=='')
																	{
																		$('#date_err').html('select date !');
																		err2++;
																	}
																	else
																	{
																		$('#date_err').html('');
																	}

																	
																	// var type = $('#aks_sales_type').val();

																	// // alert(type)
																	// if (type=='Sales') {		

																	// 	if(search.trim()=='')
																	// 	{
																	// 		$('#party_err').html('Select party Name!');
																	// 		err2++;
																	// 	}
																	// 	else
																	// 	{
																	// 		$('#party_err').html('');
																	// 	}

																	// 		var party         = $('#party_id_hidden').val();
																	// 		if(party.trim()=='')
																	// 		{
																	// 			$('#party_err').html('Enter Valid Party Name!');
																	// 			 Swal.fire({
																	// 					title: 'Error!',
																	// 					text: 'Enter Valid Party Name...!',
																	// 					icon: 'error',
																	// 					confirmButtonText: 'Okay'
																	// 					});
																	// 			err2++;
																	// 		}
																	// 		else
																	// 		{
																	// 			$('#party_err').html('');
																	// 		}
																	// }else{

																	// 	var quo_id_name         = $('#quo_id_name').val();
																	// 		if(quo_id_name.trim()=='')
																	// 		{
																	// 			$('#quo_id_name_err').html('Please Select Quotation Id!');
																	// 			 Swal.fire({
																	// 					title: 'Error!',
																	// 					text: 'Please Select Quotation Id...!',
																	// 					icon: 'error',
																	// 					confirmButtonText: 'Okay'
																	// 					});
																	// 				err2++;
																	// 		}
																	// 		else
																	// 		{
																	// 			$('#quo_id_name_err').html('');
																	// 		}

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
																	var paid = $('#paid_amount').val();
																  var tot  = $('#totalamount').val();

																    var paidamthtml = $('#lbl_paid_amt').html();
																    var lbl_net_pay1 = $('#lbl_net_pay1').html();

																    if(paidamthtml!=lbl_net_pay1)
															         {
															            $('#submit_err').html('Paid Amount Missmatched !');
															            Swal.fire({
																					title: 'Amount Mismatch!',
																					text: 'Please Check The Enter Amount is Mismatch..',
																					icon: 'error',
																					confirmButtonText: 'Okay'
																					});
															            err2++;
															         }
															         else
															         {
															            $('#submit_err').html('');
															         }



															         // alert(err2)
																     if(err2>0){ return false; }else{  add_validation(); }



																}
																</script>
															
														</div>	
														<div class="col-lg-5" style="display:none;">
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
															     <div style="position: relative;overflow-x: hidden; !important;min-height: 410px !important;max-height: 410px !important;">
																	<div class="row mt-4" id="menuchange">
																		 <?php foreach ($sale_menu as $k => $slist) { ?>
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
														</div>
														</div>
													</div>
											  </div>
											<?php } ?>
										<?php }}else{?><?php $this->load->view("common_role_permission_err"); ?><?php } ?>
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

		<div class="modal fade" id="kt_modal_sale_payment" tabindex="-1" aria-hidden="true"  data-bs-backdrop="static">
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
							<h1 class="mb-3">Sale Payment</h1>
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
												<?php if(isset($upi_detail)){ ?>
												<input class="form-check-input" name="upi_received_add_radio" type="checkbox" value="UPI" id="upi_received_add_radio" onclick="upi_ln_recev_add_radio()" checked>
												<?php }else{ ?>
												<input class="form-check-input" name="upi_received_add_radio" type="checkbox" value="UPI" id="upi_received_add_radio" onclick="upi_ln_recev_add_radio()">
												<?php } ?> 
												
											<span class="col-form-label fw-semibold fs-6">UPI</span></label>
										</div>
									</div>
									<div class="col-lg-2 fv-row fv-plugins-icon-container fv-plugins-bootstrap5-row-invalid">
										<div class="d-flex align-items-center mt-1">

											<label class="form-check form-check-inline form-check-solid is-invalid">
												<?php if(isset($cheque_detail)){ ?>
													<input class="form-check-input" name="cheque_received_add_radio" type="checkbox" value="Cheque" id="cheque_received_add_radio" onclick="cheque_ln_recev_add_radio()" checked>
												<?php }else{ ?>
													<input class="form-check-input" name="cheque_received_add_radio" type="checkbox" value="Cheque" id="cheque_received_add_radio" onclick="cheque_ln_recev_add_radio()">
												<?php } ?> 
											<span class="col-form-label fw-semibold fs-6">Bank </span></label>
										</div>
									</div>
									<div class="col-lg-2 fv-row fv-plugins-icon-container fv-plugins-bootstrap5-row-invalid">
										<div class="d-flex align-items-center mt-1">
											<label class="form-check form-check-inline form-check-solid is-invalid">
												<?php if(isset($cash_detail)){ ?>
												<input class="form-check-input" name="cash_received_add_radio" type="checkbox" value="Cash" id="cash_received_add_radio" onclick="cash_ln_recev_add_radio()" checked>
												<?php }else{ ?>
													<input class="form-check-input" name="cash_received_add_radio" type="checkbox" value="Cash" id="cash_received_add_radio" onclick="cash_ln_recev_add_radio()">
												<?php } ?> 
											<span class="fw-bold fs-5 me-5 text-dark">Cash</span></label>
										</div>
									</div>
									<div class="fv-plugins-message-container invalid-feedback" id="payment_err" ></div>
								</div>

								<div class="row">
									<?php if(isset($upi_detail)){ ?>
											<label class="col-lg-1 col-form-label fw-semibold fs-6" id="upi_amt" style="display:none;">UPI</label>
											<div class="col-lg-2 fv-row fv-plugins-icon-container" id="upi_amt_tbox" style="display:none;">
												<input type="text" class="form-control form-control-lg form-control-solid" placeholder="Amount" oninput="this.value = this.value.replace(/[^/0-9.]/g, '').replace(/(\..*)\./g, '$1');" onkeyup="pay_to_purchase_calc()" value="<?php echo $upi_detail->amount?$upi_detail->amount:0; ?>" name="upi_amount" id="upi_amount">
												<div class="fv-plugins-message-container invalid-feedback"></div>
											</div>
											<div class="col-lg-3 fv-row fv-plugins-icon-container" id="upi_trans_no_tbox" style="display:none;">
												<input type="text" name="upi_ref_no" id="upi_ref_no" class="form-control form-control-lg form-control-solid" placeholder="Trans/Ref Number" value="<?php echo $upi_detail->cheque_ref_no?$upi_detail->cheque_ref_no:''; ?>">
												<div class="fv-plugins-message-container invalid-feedback" id="upi_ref_no_err"></div>
											</div>
											<div class="col-lg-3 fv-row fv-plugins-icon-container"  id="upi_bank_tbox" style="display:none;">
												
												<select class="form-select form-select-solid" data-dropdown-parent="#kt_modal_sale_payment" data-control="select2"   data-hide-search="false"  name="upi_bank_id" id="upi_bank_id" >
													<option value="">Select</option>
													<?php
													$cmb = $upi_detail->company_bank?$upi_detail->company_bank:'';
													$bnk_det = $this->db->query("SELECT * FROM BANKS WHERE ACTIVE='Y' AND COMPANYCODE='003' ")->result_array();
													foreach ($bnk_det as $blist) {
														?>
															<option value="<?php echo $blist['SNO']; ?>" <?php if ($blist['SNO']==$cmb ){echo 'selected';} ?>><?php echo $blist['BANKNAME']; ?></option>
															<?php
													}
													?>
												</select>
												<div class="fv-plugins-message-container invalid-feedback" id="upi_bank_id_err"></div>
											</div>
											<div class="col-lg-3 fv-row fv-plugins-icon-container" id="upi_detail_tbox" style="display:none;">
												<textarea class="form-control form-control-solid" rows="1" placeholder="Details" name="upi_details" id="upi_details"><?php echo $upi_detail->remarks?$upi_detail->remarks:''; ?></textarea>
											</div>
									<?php }else{ ?>
										<label class="col-lg-1 col-form-label fw-semibold fs-6" id="upi_amt" style="display:none;">UPI</label>
												<div class="col-lg-2 fv-row fv-plugins-icon-container" id="upi_amt_tbox" style="display:none;">
													<input type="text" class="form-control form-control-lg form-control-solid" placeholder="Amount" oninput="this.value = this.value.replace(/[^/0-9.]/g, '').replace(/(\..*)\./g, '$1');" onkeyup="pay_to_purchase_calc()" value="0" name="upi_amount" id="upi_amount">
													<div class="fv-plugins-message-container invalid-feedback"></div>
												</div>
												<div class="col-lg-3 fv-row fv-plugins-icon-container" id="upi_trans_no_tbox" style="display:none;">
													<input type="text" name="upi_ref_no" id="upi_ref_no" class="form-control form-control-lg form-control-solid" placeholder="Trans/Ref Number" >
													<div class="fv-plugins-message-container invalid-feedback" id="upi_ref_no_err"></div>
												</div>
												<div class="col-lg-3 fv-row fv-plugins-icon-container"  id="upi_bank_tbox" style="display:none;">
													<select class="form-select form-select-solid" data-dropdown-parent="#kt_modal_sale_payment" data-control="select2"   data-hide-search="false"  name="upi_bank_id" id="upi_bank_id" >
														<option value="">Select</option>
														<?php $bnk_det = $this->db->query("SELECT * FROM BANKS WHERE ACTIVE='Y'")->result_array();
														foreach ($bnk_det as $blist) {
															?>
																<option value="<?php echo $blist['SNO']; ?>" ><?php echo $blist['BANKNAME']; ?></option>
																<?php
														}
														?>
													</select>
													<div class="fv-plugins-message-container invalid-feedback" id="upi_bank_id_err"></div>
												</div>
												<div class="col-lg-3 fv-row fv-plugins-icon-container" id="upi_detail_tbox" style="display:none;">
													<textarea class="form-control form-control-solid" rows="1" placeholder="Details" name="upi_details" id="upi_details"></textarea>
												</div>
									<?php } ?>
									
								</div>
								
								<div class="row">	
									<?php if(isset($cheque_detail)){ ?>
												<label class="col-lg-1 col-form-label fw-semibold fs-6" id="cheque_amt" style="display:none;">Bank</label>
												<div class="col-lg-2 fv-row fv-plugins-icon-container" id="cheque_amt_tbox" style="display:none;">
													<input type="text"  class="form-control form-control-lg form-control-solid" placeholder="Amount"oninput="this.value = this.value.replace(/[^/0-9.]/g, '').replace(/(\..*)\./g, '$1');" onkeyup="pay_to_purchase_calc()"  value="<?php echo $cheque_detail->amount?$cheque_detail->amount:0; ?>" name="cheque_amount" id="cheque_amount" >
												</div>
												<div class="col-lg-3 fv-row fv-plugins-icon-container" id="cheque_chq_no_tbox" style="display:none;">
													<input type="text" name="cheque_ref_no" id="cheque_ref_no" class="form-control form-control-lg form-control-solid" placeholder="Cheque/Ref Number" value="<?php echo $cheque_detail->cheque_ref_no?$cheque_detail->cheque_ref_no:''; ?>" oninput="this.value = this.value.replace(/[^A-Za-z/0-9.]/g, '').replace(/(\..*)\./g, '$1');" >
													<div class="fv-plugins-message-container invalid-feedback" id="cheque_ref_no_err"></div>
												</div>
												<div class="col-lg-3 fv-row fv-plugins-icon-container" id="cheque_bank_tbox" style="display:none;">
													<!-- <input type="text"  class="form-control form-control-lg form-control-solid" placeholder="Enter Party Bank" oninput="this.value = this.value.replace(/[^A-Za-z/0-9.]/g, '').replace(/(\..*)\./g, '$1');"    name="party_bank" id="party_bank" value="< ?php echo $cheque_detail->party_bank?$cheque_detail->party_bank:''; ?>" > -->

													<select class="form-select form-select-solid" data-dropdown-parent="#kt_modal_sale_payment" data-control="select2"   data-hide-search="false"  name="party_bank" id="party_bank">
															<option value="">Select</option>
															<?php
															$bnk_det = $this->db->query("SELECT * FROM BANKS WHERE ACTIVE='Y' AND COMPANYCODE='003' ")->result_array();
															foreach ($bnk_det as $blist) {
																?>
																	<option value="<?php echo $blist['SNO']; ?>" <?php if($blist['SNO']==$cheque_detail->party_bank){echo 'selected'; } ?>><?php echo $blist['BANKNAME']; ?></option>
																	<?php
															}
															?>
													</select>
													<div class="fv-plugins-message-container invalid-feedback" id="party_bank_err"></div>
												</div>
												
												<div class="col-lg-3 fv-row fv-plugins-icon-container" id="cheque_detail_tbox" style="display:none;">
													<textarea class="form-control form-control-solid" rows="1" placeholder="Details" name="cheque_details" id="cheque_details"><?php echo $cheque_detail->remarks?$cheque_detail->remarks:''; ?></textarea>
												</div>
									<?php }else{ ?>
										<label class="col-lg-1 col-form-label fw-semibold fs-6" id="cheque_amt" style="display:none;">Bank</label>
											<div class="col-lg-2 fv-row fv-plugins-icon-container" id="cheque_amt_tbox" style="display:none;">
												<input type="text"  class="form-control form-control-lg form-control-solid" placeholder="Amount"oninput="this.value = this.value.replace(/[^/0-9.]/g, '').replace(/(\..*)\./g, '$1');" onkeyup="pay_to_purchase_calc()"  value="0" name="cheque_amount" id="cheque_amount" >
											</div>
											<div class="col-lg-3 fv-row fv-plugins-icon-container" id="cheque_chq_no_tbox" style="display:none;">
												<input type="text" name="cheque_ref_no" id="cheque_ref_no" class="form-control form-control-lg form-control-solid" placeholder="Trans/Ref Number" oninput="this.value = this.value.replace(/[^A-Za-z/0-9.]/g, '').replace(/(\..*)\./g, '$1');" >
												<div class="fv-plugins-message-container invalid-feedback" id="cheque_ref_no_err"></div>
											</div>
											<!-- <label class="col-lg-1 col-form-label fw-semibold fs-6" id="cheque_bank" style="display:none;">Bank</label> -->
											<div class="col-lg-3 fv-row fv-plugins-icon-container" id="cheque_bank_tbox" style="display:none;">
												<select class="form-select form-select-solid" data-dropdown-parent="#kt_modal_sale_payment" data-control="select2"   data-hide-search="false"  name="party_bank" id="party_bank">
															<option value="">Select</option>
															<?php
															$bnk_det = $this->db->query("SELECT * FROM BANKS WHERE ACTIVE='Y' AND COMPANYCODE='003' ")->result_array();
															foreach ($bnk_det as $blist) {
																?>
																	<option value="<?php echo $blist['SNO']; ?>" ><?php echo $blist['BANKNAME']; ?></option>
																	<?php
															}
															?>
													</select>
												<div class="fv-plugins-message-container invalid-feedback" id="party_bank_err"></div>
												<!-- <input type="hidden" name="cash_hidden" id="cash_hidden" value=""> -->
											</div>
											<!-- <label class="col-lg-1 col-form-label fw-semibold fs-6" id="cheque_chq_no" style="display:none;">Cheque no</label> -->
											
											<!-- <label class="col-lg-1 col-form-label fw-semibold fs-6" id="cheque_detail" style="display:none;">Details</label> -->
											<div class="col-lg-3 fv-row fv-plugins-icon-container" id="cheque_detail_tbox" style="display:none;">
												<textarea class="form-control form-control-solid" rows="1" placeholder="Details" name="cheque_details" id="cheque_details"></textarea>
											</div>
									<?php } ?>									
								</div>
								<div class="row">
									<?php if(isset($cash_detail)){ ?>
												<label class="col-lg-1 col-form-label fw-semibold fs-6" id="cash_label" style="display:none;">Cash</label>
												<div class="col-lg-2 fv-row fv-plugins-icon-container" id="cash_label_tbox" style="display:none;">
													<input type="text" class="form-control form-control-lg form-control-solid" placeholder="Amount" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" onkeyup="pay_to_purchase_calc()" value="<?php echo $cash_detail->amount?$cash_detail->amount:0; ?>" name="cash_amount" id="cash_amount">
													<input type="hidden" name="cash_hidden_rl" id="cash_hidden" value="0">
													<div class="fv-plugins-message-container invalid-feedback"></div>
												</div>
												<div class="col-lg-3 fv-row fv-plugins-icon-container" id="cash_detail_tbox" style="display:none;">
													<textarea class="form-control form-control-solid" rows="1" placeholder="Details"  name="cash_detail" id="cash_detail"><?php echo $cash_detail->remarks?$cash_detail->remarks:''; ?></textarea>
												</div>
									<?php }else{ ?>
										<label class="col-lg-1 col-form-label fw-semibold fs-6" id="cash_label" style="display:none;">Cash</label>
											<div class="col-lg-2 fv-row fv-plugins-icon-container" id="cash_label_tbox" style="display:none;">
												<input type="text" class="form-control form-control-lg form-control-solid" placeholder="Amount" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" onkeyup="pay_to_purchase_calc()" value="0" name="cash_amount" id="cash_amount">
												<input type="hidden" name="cash_hidden_rl" id="cash_hidden" value="0">
												<div class="fv-plugins-message-container invalid-feedback"></div>
											</div>
											<div class="col-lg-3 fv-row fv-plugins-icon-container" id="cash_detail_tbox" style="display:none;">
												<textarea class="form-control form-control-solid" rows="1" placeholder="Details"  name="cash_detail" id="cash_detail"></textarea>
											</div>
									<?php } ?>									
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
								<div class="fv-plugins-message-container invalid-feedback text-end" id="submit2_err"></div>
								<div class="d-flex justify-content-end mt-6 px-9">
									<div type="reset" class="btn btn-primary me-3" id="back_btn" style="display: none;" data-bs-dismiss="modal" onclick="payment_mode()">Save</div>
									<div id="ok_btn" class="btn btn-sm btn-primary" onclick="add_validation()">Ok</div>
									
								</div>
							<!--end::Modal body-->

						</form>
					</div>
					<!--end::Modal content-->
				</div>
				<!--end::Modal dialog-->
			</div>
		</div>

		<!--end::Root-->
		<input type="hidden" id="baseurl" value="<?php echo base_url(); ?>">
		<?php $this->load->view("script"); ?>

  
 		<script>
				$("#sale_entry_add_date").flatpickr({
				    dateFormat: "d-m-Y",
				    maxDate: "today"
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
			var dby = '<?php echo $edit->delivery_mode; ?>';
			if (dby == 'Direct') {	

				ids = 0;

			}else{
				ids = 1;
			}

			delivery_mode_courier_radio(ids)
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
					$('#shipment_charges').val(0);
				}

			};
		</script>

		

		<script>
			function payment_mode(){

				// var pay_btn = document.getElementById("pay_btn");
				var balance = parseFloat($('#balance_amount').val());
				var paid    = parseFloat($('#paid_amount').val());


				// alert(balance);
				// alert(paid);

				var btn_submit = document.getElementById("btn_submit");



				

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

			function total_after_shipment(){

				var shipment_charges= parseFloat($('#shipment_charges').val());
				var tot_cart_amt    = parseFloat($('#totalamount').val());

					if (isNaN(shipment_charges))   shipment_charges = 0;
					if (isNaN(tot_cart_amt))        tot_cart_amt = 0;

				total = shipment_charges+tot_cart_amt;

				
				$('#lbl_tot_pay').html(total);


			  // var tot_cart_amt=parseFloat($('#total_cart_amount').val());
							var dis_cart_amt= parseFloat($('#dis_cart_amt').val());
							var rc_tot      = parseFloat(total);
							var net_amt     = parseFloat($('#net_amt').html());

								if (isNaN(tot_cart_amt))   tot_cart_amt = 0;
								if (isNaN(dis_cart_amt)) dis_cart_amt = 0;
								if (isNaN(rc_tot))   rc_tot = 0;

							var ntot   = rc_tot - dis_cart_amt;
							var nettot = rc_tot - dis_cart_amt;		
							
							// alert(nettot);

							$('#lbl_net_pay').html(nettot);
							$('#lbl_net_pay1').html(nettot);
							$('#netamount').val(nettot);
							// cart_prd_totcal()
			}
		</script>
		<script>

			// cart_prd_totcal()

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


				if (nettot<0 && dis_cart_amt>=0) {

						var rc_tots=parseFloat($('#lbl_tot_pay').html());
						$('#netamount').val(rc_tots);
						$('#dis_cart_amt').val(0);

						$('#lbl_net_pay').html(rc_tots);
						Swal.fire({
						title: 'Amount Mismatch!',
						text: 	'Please Check The Discount Amount is Exceed..',
						icon: 'error',
						confirmButtonText: 'Okay'
						});

						


				}else{

						$('#lbl_net_pay').html(nettot);
						$('#lbl_net_pay1').html(nettot);
						$('#netamount').val(nettot);
						$('#label_balance_amount').html(0);

				}

				// $('#lbl_net_pay').html(nettot);
				// $('#lbl_net_pay1').html(nettot);
				// $('#netamount').val(nettot);

				// pay_to_purchase_calc()
				total_after_shipment()


			}
		</script>

			<script> 
				
				var arr  = [];

				cart_get();
				function cart_get(){
						var baseurl = $("#baseurl").val();
						var val     = $('#sale_id_hidden').val();				
						// alert(val)
						if (val !== '') {							
							 
								$.ajax({
									type: "POST",
									url: baseurl+'Akssale/add_edit_web_cart_list',
									async: false,
									type: "POST",
									data: "id="+val,
									dataType: "html",
									success: function(response)
									{

										// console.log(response[1]);

										var res=response.split('||');
										if(response){
											$("#table_row").empty().append(res[1]);

											arr = JSON.parse(res[2]);										
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
								});								
							}
							cart_prd_totcal()
			}
		</script>


		<script>


			

			function add_cart(ind)
			{

				// alert(ind)
				
				var baseurl= $("#baseurl").val();

			
			
				count=$(".btnDelete").length;

				if (isNaN(count)) count = 0;


				if(count > 0){

 					let element = {id: ind};



					let chk = arr.some(it => it.id == element.id);

					// alert(chk);

					if(chk){

							var prd_wgt= parseInt($("#prd_wgt"+ind).val());

							if (isNaN(prd_wgt)) prd_wgt = 0;
							$("#prd_wgt"+ind).val(prd_wgt+1000);

							var j = 1;

					}
					else{
						var j = 0;
					}


				}
					else{
					var j = 0;
				}

			if(j==0){

				$.ajax({
					type: "POST",
					url: baseurl+'Akssale/add_cart_list',
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
				if (isNaN(prd_wgt))   prd_wgt = 0;
				if (isNaN(prd_unit))  prd_unit = 0;
				if (isNaN(prd_prc))   prd_prc = 0;



				var total= parseFloat(( prd_wgt / prd_unit) * prd_prc);

			

			 	$('#lbl_price_tot'+ind).html(parseFloat(total).toFixed(2));


			 	let element = {id: ind};



				let chk = arr.some(it => it.id == element.id);

				// console.log(arr);
				// console.log(ind);
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
				cart_prd_totcal()

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

			});


			

			
		</script>
		<script>

			function pay_to_purchase_calc()
			{
				var cash=parseFloat($('#cash_amount').val());
				var cheque=parseFloat($('#cheque_amount').val());
				var upi=parseFloat($('#upi_amount').val());
				var rc_tot=parseFloat($('#lbl_net_pay').html());

				if (isNaN(cash))   cash = 0;
				if (isNaN(cheque)) cheque = 0;
				if (isNaN(upi))    upi = 0;
				if (isNaN(rc_tot)) rc_tot = 0;

				var tot = cash+cheque+upi;
				// alert(tot);
				$('#lbl_paid_amt').html(parseFloat(tot));
				$('#label_paid_amount').html(parseFloat(tot));

				$('#paid_amount').val(tot);
				
				var diff=rc_tot - parseFloat(tot);
				$('#lbl_bal_amt').html(parseFloat(diff));
				$('#label_balance_amount').html(parseFloat(diff));

				$('#balance_amount').val(parseFloat(diff));

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
				    $('#lbl_bal_amt').html('0');
				    $('#label_balance_amount').html('0');
				    $('#label_paid_amount').html('0');
				    $('#balance_amount').val('0');
				    $('#lbl_paid_amt').html('0');
				    $('#label_paid_amount').html('0');
				    $("#back_btn").hide(); 
				    $("#ok_btn").show(); 
				    $('#net_amount').html('0');
				    $('#dis_cart_amt').val('0');

				    
				}

				if (diff > 0) {

					// $("#back_btn").hide(); 
				    $("#ok_btn").show(); 
				}
				// alert(diff);
			}
		</script>
		
		<script>
			cash_ln_recev_add_radio()
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
			}
		</script>
		<script>


			cheque_ln_recev_add_radio();
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
			}
		</script>
		<script>

			upi_ln_recev_add_radio();
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
			}
		</script>
		
		
		<script>
			function category_selected(){
				var val= $("#category_select").val();
				var baseurl= $("#baseurl").val();
				// alert(val);
				$.ajax({
					type: "POST",
					url: baseurl+'Akssale/category_select',
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


