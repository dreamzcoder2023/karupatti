<?php $this->load->view("common");?>
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
    background-color: #ec9629 !important;
    z-index: 2;
  }
  .dataTables_scroll tfoot{
    position: -webkit-sticky;
    position: sticky;
    bottom: 0;
    background-color: #ec9629 !important;
    z-index: 2;
  }
  	.dataTables_scroll_packing_shipping_details
    {
        position: relative;
        overflow: auto;
        min-height: 200px;
        max-height: 200px;/*the maximum height you want to achieve*/
        width: 100%;
    }
  .dataTables_scroll_packing_shipping_details thead{
    position: -webkit-sticky;
    position: sticky;
    top: 0;
    background-color: #ec9629 !important;
    z-index: 2;
  }
  #sale_party_name #sale_sub_party_name {
		  display: none;
			}
	#sale_party_name:hover #sale_sub_party_name {
	  display: block;
	  position: absolute;
	  margin-top: 0em;
	  margin-left: 0.5em !important;
	  color: white;
	  background: black;
	  padding: 3px 13px 3px 10px;
	  border-radius: 5px;
	  font-size: 14px;
	} 
	 #sale_party_email #sale_sub_party_email {
		  display: none;
			}
	#sale_party_email:hover #sale_sub_party_email {
	  display: block;
	  position: absolute;
	  margin-top: 0em;
	  margin-left: 0.5em !important;
	  color: white;
	  background: black;
	  padding: 3px 13px 3px 10px;
	  border-radius: 5px;
	  font-size: 14px;
	} 
	#sale_party_add #party_ship_address_get_tool {
		  display: none;
			}
	#sale_party_add:hover #party_ship_address_get_tool {
	  display: block;
	  position: absolute;
	  margin-top: 0em;
	  margin-left: 0.5em !important;
	  color: white;
	  background: black;
	  padding: 3px 13px 3px 10px;
	  border-radius: 5px;
	  font-size: 14px;
	}

	#sale_party_address #party_address_get_tooltip {
		  display: none;
			}
	#sale_party_address:hover #party_address_get_tooltip {
	  display: block;
	  position: absolute;
	  margin-top: 0em;
	  margin-left: 0.5em !important;
	  color: white;
	  background: black;
	  padding: 3px 13px 3px 10px;
	  border-radius: 5px;
	  font-size: 14px;
	}

	
	
	.error {
    border: solid 2px #f31700 !important;
	border-color:#f31700 !important;
}

</style>
	<!--begin::Body-->
	<body data-kt-name="metronic" id="kt_body" class="header-fixed header-tablet-and-mobile-fixed toolbar-enabled toolbar-fixed aside-enabled aside-fixed">
		<!--begin::Theme mode setup on page load-->
		<script>if ( document.documentElement ) { const defaultThemeMode = "system"; const name = document.body.getAttribute("data-kt-name"); let themeMode = localStorage.getItem("kt_" + ( name !== null ? name + "_": "" ) + "theme_mode_value"); if ( themeMode === null ) { if ( defaultThemeMode === "system" ) { themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light"; } else { themeMode = defaultThemeMode; } } document.documentElement.setAttribute("data-theme", themeMode); }</script>
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
									<h1 class="d-flex align-items-center text-dark fw-bold my-1 fs-3">Party
										<label class="d-flex align-items-center text-dark fw-bold my-1 fs-3">
											<span>&nbsp;-&nbsp;</span>
											<?php if(isset($party_details)){ ?>
											<span>&nbsp;<?php echo $party_det->NAME;?>&nbsp;<?php echo $party_det->FATHERSNAME; }?></span>
										</label>
										<span class="h-20px border-gray-400 border-start ms-3 mx-2"></span></h1>
									<!--begin::Separator-->
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
										<!--begin::Card body-->
										<?php if(isset($party_details)){ ?>
											<div class="card-body py-4">	
												<div class="mb-5 hover-scroll-x">
													<div class="d-grid">
														<ul class="nav nav-tabs flex-nowrap text-nowrap" role="tablist">
															<li class="nav-item" role="presentation">
																<a class="nav-link btn btn-active-light btn-color-black-800 btn-active-color-primary rounded-bottom-0 fw-bold fs-6 "  href="<?php echo base_url();?>Karuppattiparty/party_view/<?php echo $party_details->PID;?>" aria-selected="true" role="tab">Party Info</a>
															</li>
															<li class="nav-item" role="presentation">
																<a class="nav-link btn btn-active-light btn-color-black-800 btn-active-color-primary rounded-bottom-0 fw-bold fs-6 active" data-bs-toggle="tab" href="#" aria-selected="false" role="tab" tabindex="-1">Karuppati</a>
															</li>
															</li>
														</ul>
													</div>
												</div>
												<div class="tab-content" id="myTabContent">
													<div class="tab-pane fade active show" id="kt_tab_pane_karuppati"role="tabpanel">
														<div class="row">
															<table id="karuppati_list_lable" class="table align-middle table-row-dashed table-striped table-hover fs-7 gy-1 gs-2 dataTable no-footer">
																<thead>
																  <tr class="text-start text-muted fw-bold fs-7 gs-0">
																		<th class="min-w-50px">Sno</th>
																		<th class="min-w-100px">Date</th>
																		<th class="min-w-100px">Bill Id</th>
																		<th class="min-w-100px">Party</th>
																		<th class="min-w-80px">No.Of.Item</th>
																		<th class="min-w-100px">Total Price</th>
																		<th class="min-w-100px">Mode Of Delivery</th>
																		<th class="min-w-100px">Status</th>
																		<th class="min-w-100px">Action</th>
																	</tr>
																</thead>
																<tbody class="text-gray-600 fw-semibold">
																	<?php  foreach($aks_list as $i=> $slist){$date=date('d-m-Y',strtotime($slist['sale_date']));?>
																		<tr>
																			<td><?php echo $i+1; ?></td> 
																			<td>
																				<?php $date_format  = $this->db->query("SELECT * FROM general_settings ")->row();
																				 $format= $date_format->date_format;
																				 echo date("$format", strtotime($date));
																				?>
																				<input type="hidden" name="sid_hidden" id="sid_hidden" value="<?php echo $slist['sid'];?>">
																			</td>
																			<td><?php echo $slist['sale_id'];?></td>
																			<td><?php echo $slist['sale_party'];?></td>
																			<td class="text-center">
																				<?php echo $slist['sale_prd_count'];?>
																			</td>
																			<td class="fw-bold">
																				<?php $amt= $slist['sale_prd_tot_amt']; 
																				echo number_format($amt,2,'.',',');?>	
																			</td>
																			<td>
																				<?php echo $slist['sale_deliverymode']; ?>
																			</td>
																			<td>
																				<?php if($slist['status'] =='Y'){ ?>
																					<label class="col-form-label fw-semibold fs-7"><span style="background-color:#eb5d14;border-radius: 8px;padding: 5px 10px 5px 10px;" >Pending</span></label>
																				<?php } ?>
																				<?php if($slist['status'] =='P'){ ?>
																					<label class="col-form-label fw-semibold fs-7 ">	<span style="background-color:#ffc700;border-radius: 8px;padding: 5px 10px 5px 10px;" >Partial-Ready For Packing
																						</span>
																					</label>
																				<?php } ?>
																				<?php if($slist['status'] =='F'){ ?>
																					<label class="col-form-label fw-semibold fs-7 text-white">
																						<span style="background-color:#f1416c;border-radius: 8px;padding: 5px 10px 5px 10px;" >Ready For Packing</span>
																					</label>
																				<?php } ?>
																				<?php if($slist['sale_deliverymode'] =='Direct'){ ?>
																					<?php if($slist['status'] =='S'){ ?>
																				<label class="col-form-label fw-semibold fs-7"><span style="background-color:#50cd89;border-radius: 8px;padding: 5px 10px 5px 10px;" >Delivered</span></label>
																				<?php } ?>
																				<?php }else{ ?>
																					<?php if($slist['status'] =='S'){ ?>
																				<label class="col-form-label fw-semibold fs-7"><span style="background-color:#46dcf9;border-radius: 8px;padding: 5px 10px 5px 10px;" >Packed</span></label>
																				<?php } ?>
																				<?php if($slist['status'] =='D'){ ?>
																				<label class="col-form-label fw-semibold fs-7"><span style="background-color:#50cd89;border-radius: 8px;padding: 5px 10px 5px 10px;" >Delivered</span></label>
																				<?php } }?>
																			</td>
																			<td>
																				<span class="text-end">
																					<a href="#" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm" data-bs-toggle="modal" data-bs-target="#kt_modal_view_sale" onclick="view_sale('<?php echo $slist['sid']; ?>')">
																						<i class="bi bi-eye-fill eyc"></i>
																					</a>
																				</span>
																		  </td>
																		</tr>
																	<?php $i++; }?>
																</tbody>
															</table>
															<div class="row mt-4"></div>
														</div>
													</div>
												</div>
											</div>
										<?php } ?>
										<!--end::Card body-->
										</div>
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
		<!--end::Root-->
		<!--begin::Modal - view karupati sales details-->
		<div class="modal fade" id="kt_modal_view_sale" tabindex="-1" aria-hidden="true"  aria-hidden="true" data-bs-keyboard="false" data-bs-backdrop="static">
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
						<div class="mb-10 text-center">
							<h1>View Sales</h1>	
						</div>
						<!--end::Heading-->
						<div class="row">
							<div class="col-lg-8">
								<div class="px-4" style="border-radius: 10px;padding-bottom: 20px;box-shadow: 0 5px 10px #00002947;">
									<div class="row">
										<label class="col-lg-12 text-center fw-bold fs-4 mt-1">Product Details</label>
										<label class="col-lg-2 col-form-label fw-semibold fs-6">Date</label>
										<label class="col-lg-4 col-form-label fw-bold fs-5"><sapn id="sale_date"></sapn></label>
										<label class="col-lg-2 col-form-label fw-semibold fs-6">Sale ID</label>
										<label class="col-lg-4 col-form-label fw-bold fs-5"><sapn id="sale_id"></sapn></label>
										<label class="col-lg-2 col-form-label fw-semibold fs-6">Total Items</label>
										<label class="col-lg-4 col-form-label fw-bold fs-5"><sapn id="total_item"></sapn></label>
										<label class="col-lg-2 col-form-label fw-semibold fs-6">Total Price</label>
										<label class="col-lg-4 col-form-label fw-bold fs-5">
											<sapn id="net_amount"></sapn>
										</label>
									</div>
								</div>
								<div class="px-4 mt-4" style="border-radius: 10px;padding-bottom: 20px;box-shadow: 0 5px 10px #00002947;min-height: 275px !important;max-height: 275px !important;">
									<div class="row">
										<div class="col-lg-12 mt-4">
											<div id="sale_table_ajax">

											</div>								

										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-lg-3 col-form-label text-center">
										<label class="fw-bold fs-5">Total Amount</label>
										<label class="d-block fw-bold fs-5">
											<span id="total_amount"></span>
										</label>
									</div>
									<div class="col-lg-3 col-form-label text-center">
										<label class="fw-bold fs-5">Delivery Charge</label>
										<label class="d-block fw-bold fs-5">
											<sapn id="deliver_charge"></sapn>
										</label>
									</div>
									<div class="col-lg-3 col-form-label text-center">
										<label class="fw-bold fs-5">Discount</label>
										<label class="d-block fw-bold fs-5">
											<sapn id="discount"></sapn>
										</label>
									</div>
									<div class="col-lg-3 col-form-label text-center">
										<label class="fw-bold fs-5">Net Amount</label>
										<label class="d-block fw-bold fs-5">
											<sapn id="net_amount1"></sapn>
										</label>
									</div>
								</div>
								<div class="row">
									<div class="col-lg-3 col-form-label text-center">
										<label class="fw-bold fs-5">Delivery Details</label>
										<label class="d-block fw-bold fs-5"><sapn id="del_mode"></sapn></label>
									</div>

									<div class="col-lg-3 col-form-label text-center">
										<label class="fw-bold fs-5">Delivery By</label>
										<label class="d-block fw-bold fs-5"><sapn id="delivery_by"></sapn></label>
									</div>
									<div class="col-lg-3 col-form-label text-center">
										<label class="fw-bold fs-5">Tracking ID</label>
										<label class="d-block fw-bold fs-5"><sapn id="label_tracking_id"></label>
									</div>
									<div class="col-lg-3 col-form-label text-center">
										<label class="fw-bold fs-5">Act.Delivery Char</label>
										<label class="d-block fw-bold fs-5"><sapn id="label_act_del_char">-</label>
									</div>

								</div>
					    </div>
							<div class="col-lg-4">
								<div class="px-4" style="border-radius: 10px;padding-bottom: 20px;box-shadow: 0 5px 10px #00002947;min-height: 427px !important;max-height: 427px !important;">
									<div class="row">
										<label class="col-lg-12 text-center fw-bold fs-4 mt-1">Party Details</label>
										<label class="col-lg-3 col-form-label fw-semibold fs-6">Party</label>
										<label class="col-lg-9 col-form-label fw-bold fs-5" id="sale_party_name">
											<sapn id="sale_party"></sapn>
											<!-- tooltip max text count 18 + ... -->
											<span id="sale_sub_party_name"></span>
										</label>
										<label class="col-lg-3 col-form-label fw-semibold fs-6">Phone</label>
										<label class="col-lg-9 col-form-label fw-bold fs-5" id="party_mobile"></label>
										<label class="col-lg-3 col-form-label fw-semibold fs-6">Email</label>
										<label class="col-lg-9 col-form-label fw-bold fs-5" id="sale_party_email">
											<span id="party_email"></span><!-- tooltip max text count 18 + ... -->
											<span id="sale_sub_party_email">-</span>
										</label>
										<label class="col-lg-12 col-form-label fw-semibold fs-6 mb-1 py-0">Billing Address</label>
											<label class="col-lg-12 fw-bold fs-5 px-6" id="sale_party_address">
											<span id="party_address_get"></span><!-- tooltip max text count 18 + ... -->
											<span id="party_address_get_tooltip">-</span>
										</label>
										<label class="col-lg-12 col-form-label fw-semibold fs-6 mt-3 mb-1 py-0">Shipping Address</label>
										<label class="col-lg-12 fw-bold fs-5 px-6" id="sale_party_add">
											<span id="party_ship_address_get"></span><!-- tooltip max text count 50 + ... -->
											<span id="party_ship_address_get_tool">-</span>
										</label>
									</div>
								</div>
								<div class="row">
									<div class="col-lg-12 col-form-label">
										<label class="fw-semibold fs-5">Remarks</label>
										<div class="scroll-y mh-80px my-3 fw-semibold fs-5"><span id="remarks_get"></span></div>
									</div>
								</div>
						    </div>
						</div>
						<div class="row" id="sale_payment_details">
							<label class="col-lg-12 col-form-label fw-bold fs-4">Payment Details</label>
							<div class="col-lg-12">
								<table class="table align-middle table-row-dashed table-striped table-hover fs-7 gy-1 gs-2" id="kt_datatable_view_table_payment">
									<thead>
										<tr class="text-start text-muted fw-bold fs-7 gs-0">
									  	    <th class="min-w-100px">Mode</th>
											<th class="min-w-100px">Amount</th>
											<th class="min-w-100px">Party Bank / Ref.No</th>
											<th class="min-w-100px">Ref.No / Bank</th>
											<th class="min-w-200px">Details</th>
										</tr>
									</thead>
									<tbody class="text-gray-600 fw-semibold fs-7" id="sale_table_payment">
						   							
		   						</tbody>
								</table>
							</div>
						</div>
						<div class="row mt-3">
							<label class="col-lg-12 col-form-label fw-bold fs-4">Packing & Shipping Details</label>
							<div class="col-lg-12">
								<table class="table align-middle table-row-dashed table-striped fs-7 gy-2 gs-2" id="kt_datatable_view_table_packing_shipping_details_ajax">
									
								</table>
							</div>
						</div>
					</div>
					<!--end::Modal body-->
				</div>
				<!--end::Modal content-->
			</div>
			<!--end::Modal dialog-->
		</div>
		<!--end::Modal -view karupati sales details-->

		<?php $this->load->view("script");?>
		<input type="hidden" id="baseurl" value="<?php echo base_url(); ?>">
		<!-- <script src="js/products-list.js"></script> -->
		<!-- tagged list approved day fillter start -->
	<script>
			function view_sale(val)
			{
				var baseurl= $("#baseurl").val();
				// alert(baseurl);
				// alert(val);
				$.ajax({
				type: "GET",
				url: baseurl+'Akssale/sales_view',
				async: false,
				type: "GET",
				data: "id="+val,
				dataType: "json",
				success: function(response)
				{

					// alert(response.actual_delivery_charge);
					// console.log(response);
					var dat = new Date(response.sale_date); 
					var dateFormat = dat.getDate() + "-" + (dat.getMonth()+1) + "-" + dat.getFullYear();
					$('#sale_date').html(dateFormat);
					// alert(response.modified_by);
					var modify ="";
					if((response.modified_by=='') || (response.modified_by==null) || (response.modified_by=="null")){
						// alert("HI");
						  		  modify = '';
					}else{

						// alert("not");
						  modify = '<span class="badge badge-warning text-black fs-7 ms-2">Edited</span>';
					}
					$('#sale_id').html(response.sale_id+' '+modify);
					// $('#sale_party').html(response.sale_party);


					let text = response.sale_party;

					if (text.length > 15) {
					  party_name = text.substring(0, 15) + "...";

					  $('#sale_party').html(party_name);
					  $('#sale_sub_party_name').html(text);
					}else{
						$('#sale_party').html(text);
						$('#sale_sub_party_name').hide();

					}

				
					// console.log(text.length); // Output: 16
					// console.log(text); // Output: "partyna..."
					

					let tot_count = response.sale_prd_count;
					let twoDigitNumber = tot_count.toString().padStart(2,'0');

					$('#total_item').html(twoDigitNumber);

					// Assuming response.sale_net_amt is the net price
						let netPrice   = response.sale_net_amt;
						let gstAmount  = (netPrice * 5) / 100;
						let grandPrice = parseFloat(netPrice + gstAmount);
						var net_amt    = grandPrice.toLocaleString('en-IN', {
						    maximumFractionDigits: 2,
						    style: 'currency',
						    currency: 'INR'
						});

					// var net_amt = response.sale_net_amt.toLocaleString('en-IN', {
					// 	    maximumFractionDigits: 2,
					// 	    style: 'currency',
					// 	    currency: 'INR'
					// 	});
					$('#net_amount').html(net_amt);
					$('#del_mode').html(response.sale_deliverymode.charAt(0).toUpperCase() + response.sale_deliverymode.slice(1));

					if (response.delivery_by) {
						$('#delivery_by').html(response.delivery_by);
					}else{
						$('#delivery_by').html('-');
					}

					if (response.sale_track_id) {
						$('#label_tracking_id').html(response.sale_track_id);
					}else{
						$('#label_tracking_id').html('-');
					}
					
					// if(response.sale_deliverymode!='Direct'){

						// $('#delivery_by').html(response.delivery_by);

							// $('#sale_delivery_by').css("display", "block");
					// $('#sale_tracking_id').css("display", "block");
					// }
					// else{
					// $('#sale_delivery_by').css("display", "none");
					// $('#sale_tracking_id').css("display", "none");
 
					// }
					var tot_amt = response.sale_prd_tot_amt.toLocaleString('en-IN', {
						    maximumFractionDigits: 2,
						    style: 'currency',
						    currency: 'INR'
						});
					$('#total_amount').html(tot_amt);
					var del_char = response.shipment_charges.toLocaleString('en-IN', {
						    maximumFractionDigits: 2,
						    style: 'currency',
						    currency: 'INR'
						});
					$('#deliver_charge').html(del_char);
					
					if (response.actual_delivery_charge!='' || response.actual_delivery_charge=='null') {

							
							var actual_del = parseFloat(response.actual_delivery_charge);
					}else{
					 	  var actual_del = 0;
					}
					// alert(actual_del)
					if (isNaN(actual_del)) {

						ac_de = 0;
					}else{

						ac_de = actual_del;
					}

					var actual_del_ch = ac_de.toLocaleString('en-IN', {
													    minimumFractionDigits: 2,
													    maximumFractionDigits: 2,
													    style: 'currency',
													    currency: 'INR'
													});
													$('#label_act_del_char').html(actual_del_ch);


					var dis_amt = response.sale_dis_amt.toLocaleString('en-IN', {
						    maximumFractionDigits: 2,
						    style: 'currency',
						    currency: 'INR'
						});
					$('#discount').html(dis_amt);
					var sale_cash2 = response.sale_cash.toLocaleString('en-IN', {
						    maximumFractionDigits: 2,
						    style: 'currency',
						    currency: 'INR'
						});
					$('#net_amount1').html(sale_cash2);
					var sale_cash1 = response.sale_dis_amt.toLocaleString('en-IN', {
						    maximumFractionDigits: 2,
						    style: 'currency',
						    currency: 'INR'
						});
					$('#cash_amount').html(sale_cash);
					var sale_cash = response.sale_cash.toLocaleString('en-IN', {
						    maximumFractionDigits: 2,
						    style: 'currency',
						    currency: 'INR'
						});
					$('#paid_amount').html(sale_cash);
					var balance_cash = response.balance_cash.toLocaleString('en-IN', {
						    maximumFractionDigits: 2,
						    style: 'currency',
						    currency: 'INR'
						});
					
					$('#balance_amount').html(balance_cash);
					
					// $('#remarks_get').html(response.remarks);

					if (response.remarks) {
						$('#remarks_get').html(response.remarks);
					}else{
						$('#remarks_get').html('-');
					}
					// $('#del_by').val(response.delivery_by);
				}
			});
				$.ajax({
				type: "GET",
				url: baseurl+'Akssale/aks_party_details',
				async: false,
				type: "POST",
				data: "id="+val,
				dataType: "html",
				success: function(response)
				{
						
						// alert(response)

					  var res=response.split('||');

							$("#party_name_view").html(res[0]);						  
							// $("#party_address_get").html(res[2]);

							let addtext = res[2];

							if (addtext.length > 80) {

							  addone = addtext.substring(0, 80) + "...";

							  $('#party_address_get').html(addone);
							  $('#party_address_get_tooltip').html(addtext);

							}else{
								$('#party_address_get').html(addtext);
								$('#party_address_get_tooltip').hide();
							}
							
							// $("#party_ship_address_get").html(res[3]);

							let adtext = res[3];

							if (adtext.length > 60) {

							  addtwo = adtext.substring(0, 60) + "...";

							  $('#party_ship_address_get').html(addtwo);
							  $('#party_ship_address_get_tool').html(adtext);

							}else{
								$('#party_ship_address_get').html(adtext);
								$('#party_ship_address_get_tool').hide();
							}


							$("#party_mobile").html(res[4]);

							let etext = res[5];

							if (etext.length > 15) {

							  email_id = etext.substring(0, 15) + "...";

							  $('#party_email').html(email_id);
							  $('#sale_sub_party_email').html(etext);

							}else{
								$('#party_email').html(etext);
								$('#sale_sub_party_email').hide();
							}

				}
			});
				var baseurl= $("#baseurl").val();
				// alert(baseurl);
				$.ajax({
						type: "POST",
						url: baseurl+'Akssale/sale_view_table_new',
						async: false,
						data: "id="+val,
						dataType: "html",
						success: function(response)
						{
							$("#sale_table_ajax").empty().append(response);
						}
		    });
			 
				var baseurl= $("#baseurl").val();
				// alert(baseurl);
				$.ajax({
						type: "POST",
						url: baseurl+'Akssale/payment_details',
						async: false,
						data: "id="+val,
						dataType: "html",
						success: function(response)
						{
							
							var res=response.split('||');
							if(res[5]==0){
					    
							$('#sale_table_payment').empty();
							$('#sale_table_payment').append(res[1]);
							$('#sale_table_payment').append(res[2]);
							$('#sale_table_payment').append(res[3]);
							$('#sale_table_payment').append(res[4]);
							$("#sale_payment_details").css("display", "block");
							}
							else{
								$("#sale_payment_details").css("display", "none");
							}
						}
			    });
				$.ajax({
						type: "POST",
						url: baseurl+'Akssale/sale_ship_pack_view_table',
						async: false,
						data: "id="+val,
						dataType: "html",
						success: function(response)
						{

							$("#kt_datatable_view_table_packing_shipping_details_ajax").empty().append(response);
							
							// var res=response.split('||');
							// if(res[2]==0){

								
							// 	$("#sale_ship_pack_div").css("display", "block");
					    
							// }
							// else{

							// 	$("#sale_ship_pack_div").css("display", "none");
							// }

							
						}
			    });
				
			}
		</script>
		 <script>
			$("#kt_datatable_view_table").DataTable({
				
				// "responsive": true,
				// "aaSorting":[],
				"paging":false,
				"sorting":false,
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
				  "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
				  ">"
				});
			$('#kt_datatable_view_table').wrap('<div class="dataTables_scroll" />');
		</script>
		<script>
	      $("#kt_datatable_view_table").kendoTooltip({
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
	      $("#kt_datatable_view_table_payment").kendoTooltip({
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
	</body>
	<!--end::Body-->
</html>