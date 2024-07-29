<?php $this->load->view("common");?>
<style>
    .dataTables_scroll
    {
        position: relative;
        overflow: auto;
        max-height: 450px;/*the maximum height you want to achieve*/
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
											<?php 
												if($party_details->RATING==3)
												{
													// echo '<b><span class="badge badge-success" style=>GOOD</span></b>';
													echo '<span><i class="fa-solid fa-star fs-3" style="color:#50cd89;"></i> </span>';
												}
												else if($party_details->RATING==2)
												{
													// echo '<b><span class="badge badge-warning">AVERAGE</span></b>';
													echo '<span><i class="fa-solid fa-star fs-3" style="color:#ffc700;"></i> </span>';
												}
												else if($party_details->RATING==1)
												{
													// echo '<b><span class="badge badge-danger">BAD</span></b>';
													echo '<span><i class="fa-solid fa-star fs-3" style="color:red;"></i> </span>';
												}
												else
												{
													echo '<span><i class="fa-solid fa-star fs-3" style="color:#d2d4dc;"></i> </span>';
												}
												?>
											<span>&nbsp;<?php echo $party_details->NAME;?>&nbsp;<?php echo $party_details->FATHERSNAME; }?>												
											</span>
										</label>
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
			            <!-- </div> -->
								<!--begin::Card body-->
								<?php if(isset($party_details)){ ?>
								<div class="card-body py-4">	
													<div class="mb-5 hover-scroll-x">
														<div class="d-grid">
															<ul class="nav nav-tabs flex-nowrap text-nowrap" role="tablist">
																<li class="nav-item" role="presentation">
																	<a class="nav-link btn btn-active-light btn-color-black-800 btn-active-color-primary rounded-bottom-0 fw-bold fs-6 "  href="<?php echo base_url();?>Party/party_view/<?php echo $party_details->PID;?>" aria-selected="true" role="tab">Party Info</a>
																</li>
																<li class="nav-item" role="presentation">
																	<a class="nav-link btn btn-active-light btn-color-black-800 btn-active-color-primary rounded-bottom-0 fw-bold fs-6"  href="<?php echo base_url();?>Party/party_loan_view/<?php echo $party_details->PID;?>" aria-selected="false" role="tab" tabindex="-1">Loans</a>
																</li>
																<li class="nav-item" role="presentation">
																	<a class="nav-link btn btn-active-light btn-color-black-800 btn-active-color-primary rounded-bottom-0 fw-bold fs-6 active" data-bs-toggle="tab" href="#" aria-selected="false" role="tab" tabindex="-1">Jewel</a>
																</li>
																<li class="nav-item" role="presentation">
																	<a class="nav-link btn btn-active-light btn-color-black-800 btn-active-color-primary rounded-bottom-0 fw-bold fs-6"  href="<?php echo base_url();?>Party/chit_party_view/<?php echo $party_details->PID;?>" aria-selected="false" role="tab" tabindex="-1">Chit</a>
																</li>
																<li class="nav-item" role="presentation">
																	<a class="nav-link btn btn-active-light btn-color-black-800 btn-active-color-primary rounded-bottom-0 fw-bold fs-6"  href="<?php echo base_url();?>Party/karupatti_party_view/<?php echo $party_details->PID ;?>" aria-selected="false" role="tab" tabindex="-1">Karuppati</a>
																</li>
																<li class="nav-item" role="presentation">
																	<a class="nav-link btn btn-active-light btn-color-black-800 btn-active-color-primary rounded-bottom-0 fw-bold fs-6"  href="<?php echo base_url();?>Party/realestate_party_view/<?php echo $party_details->PID ;?>" aria-selected="false" role="tab" tabindex="-1">Real Estate</a>
																</li>
																<li class="nav-item">
																	<a class="nav-link btn btn-active-light btn-color-black-800 btn-active-color-primary rounded-bottom-0 fw-bold fs-6"  href="<?php echo base_url();?>Party/membership_party_view/<?php echo $party_details->PID;?>">Membership</a>
																</li>
																<li class="nav-item">
																	<a class="nav-link btn btn-active-light btn-color-black-800 btn-active-color-primary rounded-bottom-0 fw-bold fs-6"  href="<?php echo base_url();?>Party/party_rating_view/<?php echo $party_details->PID;?>">Rating History</a>
																</li>
															</ul>
														</div>
													</div>
													<div class="tab-content" id="myTabContent">			
														<div class="tab-pane fade active show" id="kt_tab_pane_jewel" role="tabpanel">
															<div class="row">
																<div class="col-lg-8">
																	<form id="frm_loan_type" action="<?php echo base_url();?>party/party_jewel_view/<?php echo $party_details->PID;?>" method="post">
																		<div class="row">
																			<div class="col-lg-4">
																				<label class="required fw-semibold fs-6">Type</label>
																					<select class="form-select form-select-solid" data-control="select2" data-hide-search="true" id="sel_sale_type" name="sel_sale_type">
																						<option value="new"  <?php echo ($sel_sale_type=='new')?'selected':'';?> >New Sales</option>
																						<option value="receipt" <?php echo ($sel_sale_type=='receipt')?'selected':'';?> >Sales Receipts</option>
																						<option value="order" <?php echo ($sel_sale_type=='order')?'selected':'';?> >Sales Order</option>
																						<option value="return" <?php echo ($sel_sale_type=='return')?'selected':'';?> >Sales Return</option>
																					</select>
																			</div>
																			<div class="col-lg-1 mt-7">
																				<button class="btn btn-sm btn-outline btn-outline-solid btn-outline-warning btn-active-light-primary me-2">Go</button>
																			</div>
																		</div>
																	</form>
																</div>
															</div>
															<!-- Party New Sales Details Start -->
															<div class="row"  style="<?php echo ($sel_sale_type=='new')?'display: block;':'display: none;'?> ">
																<label class="col-form-label fw-bold fs-3">New Sales Details</label>
																<table class="table align-middle table-row-dashed table-striped table-hover fs-7 gy-1 gs-2" id="sales_table">
																	<thead>
																		<tr class="text-start text-muted fw-bold fs-7 gs-0">
																			<th class="min-w-25px">Sno</th>
																			<th class="min-w-80px">Date</th>
																			<th class="min-w-80px">Bill ID</th>
																			<th class="min-w-80px">Item</th>
																			<th class="min-w-80px">Sub-Item</th>
																			<th class="min-w-50px">Count</th>
																			<th class="min-w-50px">Paid Amt</th>
																			<th class="min-w-50px">Balance Amt</th>
																			<th class="min-w-50px"><span class="text-end">Actions</span></th>
																		</tr>
																	</thead>
																	<tbody class="text-gray-600 fw-semibold">
																	<?php $i=1; foreach($sales_entry_list as $slist){  ?>
																		<tr>
																			<td><?php echo $i;  ?></td>
																			<td> 
																				<?php $date_format  = $this->db->query("SELECT * FROM general_settings ")->row();
																				 $format= $date_format->date_format;
																				 echo date("$format", strtotime($slist['sales_date']));
																				?> 
																			</td>
																			<td class="ple1">
																			<?php echo $slist['sales_id'];  ?>
																			</td>
																			<td><?php 
																			 $sales_detail=$this->db->query("SELECT * FROM salesentry_detail  where sales_entry_id='".$slist['id']."'")->result_array();
																			foreach($sales_detail as $Slist){
																				$item_name  = $this->db->query("SELECT * FROM ITEMS WHERE  SNO='". $Slist['item_name']."' ")->row();
																				echo $item_name->ITEMNAME;
																				 echo ",";
																			}
																			
																			?></td>
																			<td><?php foreach($sales_detail as $Slist){
																			
																			$subitem_name  = $this->db->query("SELECT * FROM SUBITEM_LIST WHERE  SUB_ID='". $Slist['subitem_name']."' ")->row();
																								echo $subitem_name->SUBITEM_NAME;
																			// echo $Slist['subitem_name'];
																			 echo ",";
																			} ?></td>
																			<td><?php echo $slist['sales_gold_count']+$slist['sales_silver_count']; ?></td>
																			<td><?php $amt=$slist['paid_amount']; echo number_format($amt,2,'.',',');?></td>
																			<td><?php $amt=$slist['balance_amount']; echo number_format($amt,2,'.',',');?></td>
																			<td>
																				<span class="text-end">
																					
																					<a href="<?php echo base_url(); ?>Sales_entry/sales_entry_view/<?php echo $slist['id']; ?>"  target="_blank" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm"  >
																					<i class="bi bi-eye-fill eyc"></i>
																					</a>
																				</span>
																			</td>
																		</tr>
																		<?php $i++; } ?>
																		
																	</tbody>
																</table>
															</div>
															<!-- Party New Sales Details end -->
															<!-- Party Sales Receipts Details Start -->
															<div class="row"  style="<?php echo ($sel_sale_type=='receipt')?'display: block;':'display: none;'?> ">
																<label class="col-form-label fw-bold fs-3">Sales Receipts Details</label>
																<table class="table align-middle table-row-dashed table-striped table-hover fs-7 gy-1 gs-2" id="sales_receipts_table">
																	<thead>
																		<tr class="text-start text-muted fw-bold fs-7 gs-0">
																			<th class="min-w-25px">Sno</th>
																				<th class="min-w-80px">Receipt Date</th>
																				<th class="min-w-150px">Company</th>
																				<th class="min-w-80px">Bill ID</th>
																				<th class="min-w-80px">Paid Amount</th>
																				<th class="min-w-50px"><span class="text-end">Actions</span></th>
																		</tr>
																	</thead>
																	<tbody class="text-gray-600 fw-semibold">
																	<?php $i=1; foreach($sales_receipt_list as $slist){ ?>	
																		<tr>
																			<td><?php echo $i; ?></td>
																			<td><?php
																			 $date_format  = $this->db->query("SELECT * FROM general_settings  ")->row();
																			$format= $date_format->date_format;
																			echo date("$format", strtotime($slist['date'])); 
																			// echo $slist['date']; ?></td>
																			<td class="ple1"><?php 
																			$company  = $this->db->query("SELECT * FROM COMPANY WHERE ACTIVE='Y' AND COMPANYCODE='".$slist['company_id']."' ")->row();
																			echo $company->COMPANYNAME;
																			// echo $slist['company_id']; ?></td>
																			<td><?php echo $slist['sales_bill_id']; ?></td>
																			
																			<td><?php $amt=$slist['paid_amount']; echo number_format($amt,2,'.',',');?></td>
																			<td>
																				<span class="text-end">
																					<a href="javascript:;" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm" data-bs-toggle="modal" data-bs-target="#kt_modal_view_sales_receipt" onclick="payment_history('<?php echo $slist['id']; ?>')">
																					<i class="bi bi-eye-fill eyc"></i>
																					</a>
																				</span>
																			</td>
																		</tr>
																		<?php $i++; } ?>
																	</tbody>
																</table>
															</div>
															<!-- Party Sales Receipts Details End -->
															
															<!-- Party Sales Order Details Start -->
															<div class="row"  style="<?php echo ($sel_sale_type=='order')?'display: block;':'display: none;'?> ">
																<label class="col-form-label fw-bold fs-3">Sales Order Details</label>
																<table class="table align-middle table-row-dashed table-striped table-hover fs-7 gy-1 gs-2" id="sales_order_table">
																	<thead>
																		<tr class="text-start text-muted fw-bold fs-7 gs-0">
																			<th class="min-w-25px">Sno</th>
																			<th class="min-w-80px">Date</th>
																			<th class="min-w-80px">Company</th>
																			<th class="min-w-80px">Order ID</th>
																			<th class="min-w-80px">Paid Amount</th>
																			<th class="min-w-50px">Balance Amount</th>
																			<th class="min-w-50px">Remain.Days</th>
																			<th class="min-w-25px">Status</th>
																			<th class="min-w-50px"><span class="text-end">Actions</span></th>
																		</tr>
																	</thead>
																	<tbody class="text-gray-600 fw-semibold">
																	<?php $i=1; foreach($sales_order_list as $slist) { ?>
																		<tr>
																			<td><?php echo $i; ?></td>
																			<td><?php $date_format  = $this->db->query("SELECT * FROM general_settings ")->row();
																				 $format= $date_format->date_format;
																				 echo date("$format", strtotime($slist['sales_order_date']));
																				?> </td>
																			<td class="ple1"><?php 
																			 $company  = $this->db->query("SELECT * FROM COMPANY WHERE ACTIVE='Y' AND COMPANYCODE='". $slist['company']."' ")->row();
																			 echo $company->COMPANYNAME;
																			// echo $slist['company'] ?></td>
																			<td class="ple1">
																			<?php echo $slist['sales_order_id'] ?>
																			</td>
																			<!--<td class="ple1"><span>Gold</span> - <span>Chain</span></td>
																			<td class="ple1">Hand Chain</td>-->
																			<td><?php $amt=$slist['paid_amount']; echo number_format($amt,2,'.',',');?></td>
																			<td><?php $amt=$slist['balance_amount']; echo number_format($amt,2,'.',',');?></td>
																			<td class="fs-4 text-end" style="color: #FF553B;font-weight: 700;">
																			<?php 
																			$remain_days=$this->db->query("SELECT * FROM sales_order_tagged_item WHERE sales_order_id='".$slist['sales_order_id']."'")->row();
																			$date1= $remain_days->delivery_date;
																			$date2=date('Y-m-d');
																			$diff = strtotime($date1) - strtotime($date2);
																			if($diff>0){
																			$remain_days=abs(round($diff / 86400));
																			}else{
																				$remain_days=(round($diff / 86400));
																			}
																			 if( $slist['status']!='D') { 
																			echo $remain_days;
																			 }
																			 else{
																				echo '-';
																			 }
																			?>
																			
																			</td>
																			<td>
																			<?php if( $slist['status']=='Y') { ?>
																				<label class="col-form-label fw-semibold fs-7" name="" id=""><span style="background-color:#ffc700;border-radius: 8px;padding: 5px 15px 5px 15px;">New Order</span>
																				</label>
																				<?php } elseif( $slist['status']=='M') { ?>
																				<label class="col-form-label fw-semibold fs-7" name="" id=""><span style="background-color:#46dcf9;border-radius: 8px;padding: 5px 15px 5px 15px;">Given to Maker</span>
																				</label>
																				<?php } elseif( $slist['status']=='D') { ?>
																				<label class="col-form-label fw-semibold fs-7" name="" id=""><span style="background-color:#32E76E;border-radius: 8px;padding: 5px 15px 5px 15px;">Delivered</span>
																				</label>
																				<?php } elseif( $slist['status']=='T') { ?>
																				<label class="col-form-label fw-semibold fs-7" name="" id=""><span style="background-color:#FFAC1C;border-radius: 8px;padding: 5px 15px 5px 15px;">Tagged</span>
																				</label>
																				<?php }  ?>
																			</td>
																			<td>
																				<span class="text-end">
																					<a href="<?php echo base_url(); ?>Sales_order/sales_order_view/<?php echo $slist['id'] ?>" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm">
																					<i class="bi bi-eye-fill eyc" title="View"></i>
																					</a>
																				</span>
																			</td>
																		</tr>
																	<?php $i++; } ?>
																	</tbody>
																</table>
															</div>
															<!-- Party Sales Order Details end -->
															
															<!-- Party Sales Return Details Start -->
															<div class="row"  style="<?php echo ($sel_sale_type=='return')?'display: block;':'display: none;'?> ">
																<label class="col-form-label fw-bold fs-3">Sales Return Details</label>
																<table class="table align-middle table-row-dashed table-striped table-hover fs-7 gy-1 gs-2" id="sales_return_table">
																	<thead>
																		<tr class="text-start text-muted fw-bold fs-7 gs-0">
																			<th class="min-w-25px">Sno</th>
																			<th class="min-w-80px">Date</th>
																			<th class="min-w-150px">Company</th>
																			<th class="min-w-80px">Bill No</th>
																			<th class="min-w-50px">Rtn Count</th>
																			<th class="min-w-80px">Paid Amount</th>
																			<th class="min-w-80px">Balance Amount</th>
																			<th class="min-w-50px"><span class="text-end">Actions</span></th>
																		</tr>
																	</thead>
																	<tbody class="text-gray-600 fw-semibold">
																		<?php $i=1;  foreach($sales_return_list as $slist){ ?>
																			<tr>
																				<td> <?php echo $i; ?></td>
																				<td><?php
																				 $date_format  = $this->db->query("SELECT * FROM general_settings  ")->row();
																				 $format= $date_format->date_format;
																				 echo date("$format", strtotime($slist['date']));
																				// echo $slist['date']; 	 ?></td>
																				<td class="ple1"><?php
																				 $company  = $this->db->query("SELECT * FROM COMPANY WHERE ACTIVE='Y' AND COMPANYCODE='". $slist['company']."' ")->row();
																				 echo $company->COMPANYNAME;
																				// echo $slist['company']; 	 ?></td>
																				<td><?php echo $slist['sales_bill_id']; 	 ?></td>
																				
																			
																				<td><?php echo $slist['sales_gold_count']+$slist['sales_silver_count'];  	 ?></td>
																				<td><?php $amt=$slist['paid_amount']; echo number_format($amt,2,'.',',');?></td>
																				<td><?php $amt=$slist['balance_amount']; echo number_format($amt,2,'.',',');?></td>
																				<td>
																					<span class="text-end">
																						<!-- <a href="#" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm" data-bs-toggle="modal" data-bs-target="#kt_modal_convert_to_sales_return" title="Convert to Sales Return">
																							<i class="fas fa-undo-alt eyc"></i>
																						</a> -->
																						<a href="<?php echo base_url(); ?>Sales_return/sales_return_view/<?php echo $slist['id']; ?>" target="_blank" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm">
																						<i class="bi bi-eye-fill eyc"></i>
																						</a>
																					</span>
																				</td>
																			</tr>
																		<?php $i++;} ?>	
																	</tbody>
																</table>
															</div>
															<!-- Party Sales Return Details end -->
														</div>	
												</div>
											</div>
										<?php } ?>
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
		<!--end::Root-->

		<!--begin::Modal - view karupati sales details-->
		<div class="modal fade" id="kt_modal_view_sale" tabindex="-1" aria-hidden="true">
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
					<div class="modal-body pt-0 pb-5 px-1 px-xl-20">
						<div class="mb-3 text-center">
							<h1>View Sale Details</h1>
						</div>
						<div class="row">
							<label class="col-lg-1 col-form-label fw-semibold fs-6">Date</label>
							<label class="col-lg-2 col-form-label fw-bold fs-5">06-04-2023</label>
						 	<label class="col-lg-1 col-form-label fw-semibold fs-6">Sale Id</label>
							<label class="col-lg-2 col-form-label fw-bold fs-5">AKSS-005/23</label>
							<label class="col-lg-1 col-form-label  fw-semibold fs-6">Party</label>
							<label class="col-lg-3 col-form-label fw-bold fs-5">ROSEMERI</label>
							<label class="col-lg-2 col-form-label fw-bold fs-5 text-center d-flex justify-content-center" style="background-color:#46dcf9;border-radius: 8px;">
								<span>Courier</span>&nbsp;-&nbsp;
								<span>Pending</span>
							</label>
							
						</div>
						<div class="row">
							<label class="col-lg-1 col-form-label fw-semibold fs-6">Tot.Items</label>
							<label class="col-lg-2 col-form-label fw-bold fs-5">2</label>
					  	<label class="col-lg-1 col-form-label fw-semibold fs-6">Tot.Price</label>
							<label class="col-lg-2 col-form-label fw-bold fs-5">54.00</label>
							<div class="col-lg-6">
								<label class="col-form-label fw-semibold fs-6 me-3">Delivered By</label>
								<label class="col-form-label fw-bold fs-5">Professional Courier Service</label>
							</div>
							<div class="col-lg-4">
								<label class="col-form-label fw-semibold fs-6 me-2">Tracking ID</label>
								<label class="col-form-label fw-bold fs-5">PCD12345678</label>
							</div>
							
						</div>
						<div class="row">
							<label class="col-form-label fw-bold fs-2">Product Details</label>
							<table class="table align-middle table-row-dashed table-striped table-hover fs-7 gy-4 gs-2" id="kt_datatable_karuppati_view_table">
								<thead>
									<tr class="text-start text-muted fw-bold fs-7 gs-0">
										<th class="min-w-25px">Sno</th>
										<th class="min-w-25px">Product</th>
										<th class="min-w-80px">Wgt/gms</th>
										<th class="min-w-100px">Price Per Grams</th>
										<th class="min-w-100px">Price</th>
									</tr>
								</thead>
								<tbody class="text-gray-600 fw-semibold">
									<tr>
										<td>1</td>
										<td>Old Jaggery</td>
										<td>100</td>
										<td>25/100</td>
										<td>25</td>
									</tr>
									<tr>
										<td>2</td>
										<td>Palm Candy</td>
										<td>500</td>
										<td>60/1000</td>
										<td>30</td>
									</tr>
								</tbody>
							</table>
						</div>
						<div class="row">
							<div class="col-lg-4">
								<label class="col-form-label fw-semibold fs-5">Total Amount</label>&emsp;
								<label class="col-form-label fw-bold fs-3 text-end">55.00</label>
							</div>
							<div class="col-lg-4">
								<label class="col-form-label  fw-semibold fs-5">Discount</label>&emsp;
						  	<label class="col-form-label fw-bold fs-3 text-end">1.00</label>
							</div>
							<div class="col-lg-4">
								<label class="col-form-label  fw-semibold fs-5">Net Amount</label>&emsp;
						  	<label class="col-form-label fw-bold fs-3 text-end">54.00</label>
							</div>
						  <!-- <div class="col-lg-3">
								<label class="col-form-label fw-semibold fs-5">Delivery Details</label>&emsp;
								<label class="col-form-label fw-bold fs-3 text-end">Courier</label>
					 	  </div> -->
						</div>
						<div class="row">
							<label class="col-form-label fw-bold fs-2">Payment Details</label>
							<table class="table align-middle fs-7 gy-1 gs-2" id="kt_datatable_karuppati_view_payment_table">
								<thead>
									<tr class="text-start text-muted fw-bold fs-7 gs-0">
										<th class="min-w-50px">Payment Mode</th>
										<th class="min-w-100px">Amount</th>
										<th class="min-w-100px">Reference No</th>
										<th class="min-w-100px">Bank</th>
										<th class="min-w-100px">Details</th>
									</tr>
								</thead>
								<tbody class="text-gray-600 fw-bold fs-5">
									<tr>
										<td>Cash</td>
										<td>50.00</td>
										<td>587496</td>
										<td>SBI</td>
										<td>Sample</td>
									</tr>
								</tbody>
							</table>
						</div>
						<div class="row">
							<div class="col-lg-6 text-center">
								<label class="col-form-label fw-bold fs-2">Paid Amount  </label>
								<label class="col-form-label fw-bold fs-3">50</label>
							</div>
							<div class="col-lg-6 text-center">
								<label class="col-form-label fw-bold fs-2">Balance Amount  </label>
								<label class="col-form-label fw-bold fs-3">4</label>
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

		<!--begin::Modal - kt_modal_view sales receipt-->
		<div class="modal fade" id="kt_modal_view_sales_receipt" tabindex="-1" aria-hidden="true">
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
						<div class="mb-3 text-center">
							<h1 class="mb-3">Payment History</h1>
						</div>
						<!--end::Heading-->
						<!--end::Heading-->	
						<div class="row">
							<label class="col-lg-1 col-form-label fw-semibold fs-6">Date</label>
							<label class="col-lg-2 col-form-label fw-bold fs-5" id="view_date" name="view_date">13-10-2022</label>
							<label class="col-lg-1 col-form-label fw-semibold fs-6">Company</label>
							<label class="col-lg-4 col-form-label fw-bold fs-5" id="view_company" name="view_company"> AGB - Main Branch Sayalkudi</label>
							<label class="col-lg-1 col-form-label fw-semibold fs-6">Bill ID</label>
							<label class="col-lg-2 col-form-label fw-bold fs-5" id="view_sales_id" name="view_sales_id">SL-1256/23</label>
						</div>
						<div class="row">
							<label class="col-lg-1 col-form-label fw-semibold fs-6">Party</label>
							<label class="col-lg-6 col-form-label fw-bold fs-5" id="view_party" name="view_party">Senthil Kumar</label>
						</div>
						<div class="row">
							<label class="col-lg-1 col-form-label fw-semibold fs-6">Cash</label>
							<label class="col-lg-2 col-form-label fw-bold fs-5" id="view_cash" name="view_cash">10000.00</label>
							<label class="col-lg-1 col-form-label fw-semibold fs-6">Details</label>
							<label class="col-lg-4 col-form-label fw-bold fs-5" id="view_cash_detail" name="view_cash_detail">-</label>
						</div>
						<div class="row">
							<label class="col-lg-1 col-form-label fw-semibold fs-6">Cheque</label>
							<label class="col-lg-2 col-form-label fw-bold fs-5" id="view_cheque_amount" name="view_cheque_amount">15895.00</label>
							<label class="col-lg-2 col-form-label fw-semibold fs-6">Party Bank</label>
							<label class="col-lg-2 col-form-label fw-bold fs-5" id="view_cheque_bank" name="view_cheque_bank">SBI</label>
							<label class="col-lg-1 col-form-label fw-semibold fs-6">Ref.No</label>
							<label class="col-lg-1 col-form-label fw-bold fs-5" id="view_cheque_number" name="view_cheque_number">456125</label>
							<label class="col-lg-1 col-form-label fw-semibold fs-6">Details</label>
							<label class="col-lg-2 col-form-label fw-bold fs-5" id="view_cheque_detail" name="view_cheque_detail">-</label>
						</div>
						 <div class="row">
							<label class="col-lg-1 col-form-label fw-semibold fs-6">RTGS</label>
							<label class="col-lg-2 col-form-label fw-bold fs-5" id="view_rtgs_amount" name="view_rtgs_amount">10000.00</label>
							<label class="col-lg-2 col-form-label fw-semibold fs-6">Reference No</label>
							<label class="col-lg-2 col-form-label fw-bold fs-5" id="view_rtgs_number" name="view_rtgs_number">456125</label>
							<label class="col-lg-1 col-form-label fw-semibold fs-6">Cmy.Bank</label>
							<label class="col-lg-1 col-form-label fw-bold fs-5" id="view_rtgs_bank" name="view_rtgs_bank">SBI</label>
							<label class="col-lg-1 col-form-label fw-semibold fs-6">Details</label>
							<label class="col-lg-2 col-form-label fw-bold fs-5" id="view_rtgs_detail" name="view_rtgs_detail">-</label>
						</div>
						<div class="row">
							<label class="col-lg-1 col-form-label fw-semibold fs-6">UPi</label>
							<label class="col-lg-2 col-form-label fw-bold fs-5" id="view_upi_amount" name="view_upi_amount">10000.00</label>
							<label class="col-lg-2 col-form-label fw-semibold fs-6">Reference No</label>
							<label class="col-lg-2 col-form-label fw-bold fs-5" id="view_upi_number" name="view_upi_number">456125</label>
							<label class="col-lg-1 col-form-label fw-semibold fs-6">Cmy.Bank</label>
							<label class="col-lg-1 col-form-label fw-bold fs-5" id="view_upi_bank" name="view_upi_bank">SBI</label>
							<label class="col-lg-1 col-form-label fw-semibold fs-6">Details</label>
							<label class="col-lg-2 col-form-label fw-bold fs-5" id="view_upi_detail" name="view_upi_detail">-</label>
						</div> 
						</div>	
						<!--end::Modal body-->
					</div>
					<!--end::Modal content-->
				</div>
				<!--end::Modal dialog-->
			</div>
			<!--end::Modal - kt_modal_verify_membership_card_receiptt-->
		</div>
		<!--end::Modal - kt_modal_view sales receipt-->
		<input type="hidden" id="baseurl" value="<?php echo base_url();?>">
		<?php $this->load->view("script");?>
		<script>
			$("#sales_table").DataTable({
				//"aaSorting":[],
				"sorting":false,
				"paging": true,
				"pageLength": 25,
				"responsive": true,
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
			$('#sales_table').wrap('<div class="dataTables_scroll2" />');
		</script>

		<script>
			$("#sales_receipts_table").DataTable({
				//"aaSorting":[],
				"sorting":false,
				"paging": true,
				"pageLength": 25,
				"responsive": true,
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
			$('#sales_receipts_table').wrap('<div class="dataTables_scroll2" />');
		</script>

		<script>
			$("#sales_order_table").DataTable({
			//"aaSorting":[],
					"sorting":false,
					"paging": true,
					"pageLength": 25,
					"responsive": true,
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
				$('#sales_order_table').wrap('<div class="dataTables_scroll2" />');
		</script>
		<script>
			$("#sales_return_table").DataTable({
				//"aaSorting":[],
						"sorting":false,
						"paging": true,
						"pageLength": 25,
						"responsive": true,
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
					$('#sales_return_table').wrap('<div class="dataTables_scroll2" />');
		</script>
		<script>
			  $("#sales_return_table").kendoTooltip({
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
		  $("#sales_order_table").kendoTooltip({
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
			  $("#sales_table").kendoTooltip({
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
		  $("#sales_receipts_table").kendoTooltip({
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
			function payment_history(val){
				var baseurl= $("#baseurl").val();
	                $.ajax({
					type: "POST",
					url: baseurl+'Sales_receipt/sales_receipt_view',
					async: false,
					type: "POST",
					data: "id="+val,
					dataType: "html",
					success: function(response)
					{
	                    //  alert(response);
					 	res=response.split('||');
						$('#view_date').html(res[1]);
						$('#view_company').html(res[2]);
						$('#view_sales_id').html(res[3]);
	                    $('#view_party').html(res[4]);
	                   
						$('#view_cash').html(res[5]);
	                    $('#view_cash_detail').html(res[6]);
				
						$('#view_cheque_amount').html(res[7]);
	                    $('#view_cheque_number').html(res[8]);
	                    $('#view_cheque_bank').html(res[9]);
	                    $('#view_cheque_detail').html(res[10]);

						$('#view_rtgs_amount').html(res[11]);
	                    $('#view_rtgs_number').html(res[12]);
	                    $('#view_rtgs_bank').html(res[13]);
	                    $('#view_rtgs_detail').html(res[14]);

						$('#view_upi_amount').html(res[15]);
	                    $('#view_upi_number').html(res[16]);
	                    $('#view_upi_bank').html(res[17]);
	                    $('#view_upi_detail').html(res[18]);
				
					}
				});
			}
		</script>
	</body>
	<!--end::Body-->
</html>