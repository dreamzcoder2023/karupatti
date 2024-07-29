<?php $this->load->view("common.php") ?>
<link href="<?php echo base_url();?>assets/jquery.autocomplete.css" rel="stylesheet" type="text/css" />

<style>
    .dataTables_scroll2
    {
        position: relative;
        overflow: auto;
        max-height:450px;/*the maximum height you want to achieve*/
        width: 100%;
    }
  .dataTables_scroll2 thead{
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
				<?php $this->load->view("sidebar.php")?>
				<!--begin::Wrapper-->
				<div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
				<?php $this->load->view("header.php")?>
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
											<?php if (isset($party_detail->RATING)) {?>
											<span>
												<i class="fa-solid fa-star fs-3" style="
										          <?php
										          		
									          			if($party_detail->RATING ==3) echo 'color:#50cd89;';
														if($party_detail->RATING ==2) echo 'color:#ffc700;';
														if($party_detail->RATING ==1) echo 'color:red;';
														if($party_detail->RATING =='') echo 'color:#d2d4dc;';
													?>">
												</i>
											</span>&nbsp;
											<span>&nbsp;<?php echo $party_detail->NAME;?>&nbsp;<?php echo $party_detail->FATHERSNAME;?></span>
											<?php } ?>
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
										<!--begin::Card body-->
											<div class="card-body py-4">
											<form id="party_search_form" method="post" action="" enctype="multipart/form-data" >	
											<div class="row">
												
													<label class="col-lg-1 col-form-label required fw-semibold fs-6">Type</label>
													<div class="col-lg-3">
														<select class="form-select form-select-solid" data-control="select2" data-hide-search="true" id="party_search_type" name="party_search_type">	
															<!--<option value="">Select</option>-->
															<option value="1" <?php if($party_search_type=='1'){ echo 'selected'; } ?>>Party Name</option>
															<option value="2" <?php if($party_search_type=='2'){ echo 'selected'; } ?>>Phone No</option>
															<option value="3" <?php if($party_search_type=='3'){ echo 'selected'; } ?>>Membership ID</option>
															<option value="4" <?php if($party_search_type=='4'){ echo 'selected'; } ?>>Loan No</option>
														</select>
													</div>
													<!-- <label class="col-lg-1 col-form-label fw-semibold fs-6">Enter</label> -->
													<div class="col-lg-3">
														<input type="text" name="party_search" id="party_search" class="form-control form-control-lg form-control-solid" placeholder="" value="<?php echo $party_search; ?>">
													<input type="hidden" name="party_search_id" id="party_search_id" value="<?php if(isset($party_detail->PID)){echo $party_detail->PID; } ?>"> 
													<input type="hidden" id="sel_sale_type" name="sel_sale_type" value="<?php echo $sel_sale_type ?>" >	
													</div>
														<div class="col-lg-1">
														<input type="button" name="party_submit" id="party_submit" class="btn btn-sm btn-outline btn-outline-solid btn-outline-warning btn-active-light-primary  " placeholder="" value="Go" onclick="submit_form()">
														</div>
														
												</div> 
												</form>
												<div class="mb-5 hover-scroll-x mt-4">
													<div class="d-grid">
														<ul class="nav nav-tabs flex-nowrap text-nowrap" role="tablist">
															<li class="nav-item" role="presentation">
																<a class="nav-link btn btn-active-light btn-color-black-800 btn-active-color-primary rounded-bottom-0 fw-bold fs-6 "   onclick="submit_form()" aria-selected="true" >Party Info</a>
															</li>
															<li class="nav-item" role="presentation">
																<a class="nav-link btn btn-active-light btn-color-black-800 btn-active-color-primary rounded-bottom-0 fw-bold fs-6 "   aria-selected="false" onclick="submit_form_loan()">Loans</a>
															</li>
															<li class="nav-item" role="presentation">
																<a class="nav-link btn btn-active-light btn-color-black-800 btn-active-color-primary rounded-bottom-0 fw-bold fs-6 active"   aria-selected="false" >Jewel</a>
															</li>
															<li class="nav-item" role="presentation">
																<a class="nav-link btn btn-active-light btn-color-black-800 btn-active-color-primary rounded-bottom-0 fw-bold fs-6"   aria-selected="false" onclick="submit_form_chit()">Chit</a>
															</li>
															<li class="nav-item" role="presentation">
																<a class="nav-link btn btn-active-light btn-color-black-800 btn-active-color-primary rounded-bottom-0 fw-bold fs-6"   aria-selected="false" onclick="submit_form_karupatti()">Karuppati</a>
															</li>
															<li class="nav-item" role="presentation">
																<a class="nav-link btn btn-active-light btn-color-black-800 btn-active-color-primary rounded-bottom-0 fw-bold fs-6"   aria-selected="false" onclick="submit_form_realestate()">Real Estate</a>
															</li>
															<li class="nav-item">
																<a class="nav-link btn btn-active-light btn-color-black-800 btn-active-color-primary rounded-bottom-0 fw-bold fs-6"   aria-selected="false" onclick="submit_form_membership()">Membership</a>
															</li>
															<li class="nav-item">
																<a class="nav-link btn btn-active-light btn-color-black-800 btn-active-color-primary rounded-bottom-0 fw-bold fs-6"   aria-selected="false" onclick="submit_form_rating_history()">Rating History</a>
															</li>
														</ul>
													</div>
												</div>
												<div class="tab-content" id="myTabContent">	
													<div class="tab-pane fade active show" id="kt_tab_pane_jewel" role="tabpanel">
														<div class="row">
															<div class="col-lg-3">
																<label class="required fw-semibold fs-6">Type</label>
																<select class="form-select form-select-solid" data-control="select2" data-hide-search="true" id="sale_type" onchange="sale_type_sel()"  >	
																	<option value="new"  <?php echo ($sel_sale_type=='new')?'selected':'';?> >New Sales</option>
																		<option value="receipt" <?php echo ($sel_sale_type=='receipt')?'selected':'';?> >Sales Receipts</option>
																		<option value="order" <?php echo ($sel_sale_type=='order')?'selected':'';?> >Sales Order</option>
																		<option value="return" <?php echo ($sel_sale_type=='return')?'selected':'';?> >Sales Return</option>
																</select>
															</div>
															<div class="col-lg-1 mt-7">
																<button class="btn btn-sm btn-outline btn-outline-solid btn-outline-warning btn-active-light-primary me-2" onclick="submit_form_jewel()">Go</button>
															</div>
														</div>
														<!-- Party New Sales Details Start -->
														<div class="row" style="<?php echo ($sel_sale_type=='new')?'display: block;':'display: none;'?> ">
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
																		<td><?php echo $i;?></td>
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
														<div class="row" style="<?php echo ($sel_sale_type=='receipt')?'display: block;':'display: none;'?> ">
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
																		echo isset($company->COMPANYNAME) ? $company->COMPANYNAME : "-";
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
														<div class="row" style="<?php echo ($sel_sale_type=='order')?'display: block;':'display: none;'?> ">
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
																		<td>
																			<?php $date_format  = $this->db->query("SELECT * FROM general_settings ")->row();
																				 $format= $date_format->date_format;
																				 echo date("$format", strtotime($slist['sales_order_date']));
																			?>	
																		</td>
																		<td class="ple1"><?php 
																		 $company  = $this->db->query("SELECT * FROM COMPANY WHERE ACTIVE='Y' AND COMPANYCODE='". $slist['company']."' ")->row();
																		 echo isset($company->COMPANYNAME) ? $company->COMPANYNAME :"-";
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
																				<a href="<?php echo base_url(); ?>Sales_order/sales_order_view/<?php echo $slist['id'] ?>" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm" target="_blank">
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
																		 echo isset($company->COMPANYNAME) ? $company->COMPANYNAME : "-";
																		// echo $slist['company']; 	 ?></td>
																		<td><?php echo $slist['sales_bill_id']; 	 ?></td>
																		
																	
																		<td><?php echo $slist['sales_gold_count']+$slist['sales_silver_count'];  	 ?></td>
																		<td><?php $amt=$slist['paid_amount']; echo number_format($amt,2,'.',',');?></td>
																		<td><?php $amt=$slist['balance_amount']; echo number_format($amt,2,'.',',');?></td>
																		<td>
																			<span class="text-end">
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
					<?php $this->load->view("footer.php")?>
					</div>
					<!--end::Content-->
				</div>
				<!--end::Wrapper-->
			</div>
			<!--end::Page-->
		</div>
		<!--end::Root-->
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
		<?php $this->load->view("script.php")?>
		<script src="<?php echo base_url();?>assets/jquery.autocomplete.js"></script>
		<!-- <script src="js/products-list.js"></script> -->
		<!-- loan list day fillter start -->
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
		<script>
		function sale_type_sel(){
			// alert(1);
			var type=$("#sale_type").val();
			$("#sel_sale_type").val(type);
		}
		</script>
		<script>
		function submit_form(){
		    $('#party_search_form').attr('action', "<?php echo base_url(); ?>Partysearch");
		            $("#party_search_form").submit();
		            e.preventDefault();

		}
		</script>
		<script>
		function submit_form_jewel(){
			
		    $('#party_search_form').attr('action', "<?php echo base_url(); ?>Partysearch/jewel");
		            $("#party_search_form").submit();
		            e.preventDefault();
		}
		</script>
		<script>
		function submit_form_loan(){
			
		    $('#party_search_form').attr('action', "<?php echo base_url(); ?>Partysearch/loans");
		            $("#party_search_form").submit();
		            e.preventDefault();
		}
		</script>
		<script>
		function submit_form_chit(){
			
		    $('#party_search_form').attr('action', "<?php echo base_url(); ?>Partysearch/chit");
		            $("#party_search_form").submit();
		            e.preventDefault();
		}
		</script>
		<script>
		function submit_form_karupatti(){
			
		    $('#party_search_form').attr('action', "<?php echo base_url(); ?>Partysearch/karupatti");
		            $("#party_search_form").submit();
		            e.preventDefault();
		}
		</script>
		<script>
		function submit_form_realestate(){
			
		    $('#party_search_form').attr('action', "<?php echo base_url(); ?>Partysearch/realestate");
		            $("#party_search_form").submit();
		            e.preventDefault();
		}
		</script>
		<script>
		function submit_form_membership(){
			
		    $('#party_search_form').attr('action', "<?php echo base_url(); ?>Partysearch/membership");
		            $("#party_search_form").submit();
		            e.preventDefault();
		}
		</script>
		<script>
		function submit_form_rating_history(){
			
		    $('#party_search_form').attr('action', "<?php echo base_url(); ?>Partysearch/rating_history");
		            $("#party_search_form").submit();
		            e.preventDefault();
		}
		</script>

		<script>
			// function test(){
				var party_search_type = $("#party_search_type").val();
				if	(party_search_type=='1'){
				var baseurl = $("#baseurl").val();
				var type = $("#party_search_type").val();
				$("#party_search").autocomplete({ 
		                valueKey:'title',
		                source:[{
		                url:baseurl+'Partysearch/userList?query=%QUERY%&type='+type,
		                type:'remote',
		                ajax:{
		                  dataType : 'json',
		                }
		            }]}).on('selected.xdsoft',function(e,suggestion,ui){ 
			                $("#party_search").val(suggestion.firstname);
							$('#party_search_id').val(suggestion.id);
					        });
				}
			// }
		</script>
		<!-- ************************************************************************************************** -->
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
	</body>
	<!--end::Body-->
</html>