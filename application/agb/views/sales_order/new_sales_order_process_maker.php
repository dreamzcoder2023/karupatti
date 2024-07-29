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
    background-color: #ec9629 !important;
    z-index: 2;
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
									<h1 class="d-flex align-items-center text-dark fw-bold my-1 fs-3">Sales Order View
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
										<form action="<?php echo base_url(); ?>Sales_order/sales_order_maker/<?php echo $sales_order->id; ?>" method="POST"  enctype="multipart/form-data" >
											<div class="row">

												<div class="col-lg-6">
													<div class="row">
														<label class="col-lg-2 col-form-label fw-semibold fs-6">Date</label>
														<label class="col-lg-4 col-form-label fw-bold fs-6"><?php
														 $date_format  = $this->db->query("SELECT * FROM general_settings  ")->row();
														 $format= $date_format->date_format;
														 echo date("$format", strtotime($sales_order->sales_order_date));
														// echo $sales_order->sales_order_date; ?></label>
													</div>
													<div class="row">
														<label class="col-lg-2 col-form-label fw-semibold fs-6">Company</label>
														<label class="col-lg-10 col-form-label fw-bold fs-6"><?php
														 $company  = $this->db->query("SELECT * FROM COMPANY WHERE ACTIVE='Y' AND COMPANYCODE='". $sales_order->company."' ")->row();
														 echo $company->COMPANYNAME;
														// echo $sales_order->company; ?></label>
														<label class="col-lg-6 col-form-label fw-bold fs-6"><i class="fa fa-address-card fs-6" aria-hidden="true" title="Card No"></i>&emsp;<?php echo $party_detail->MEMBERSHIP_ID; ?>
														</label>
														<label class="col-lg-3 col-form-label fw-bold fs-6" name="" id="" ><span style="background-color:#FFAA00;border-radius: 8px;padding: 5px 15px 5px 15px;">Gold</span></label>
														<label class="col-lg-3 col-form-label fw-bold fs-6" name="" id=""><i class="fa-solid fa-coins fs-6" title="Points"></i>&emsp;<?php echo $party_detail->MEMBERSHIP_POINTS; ?></label>
														
													</div>
												</div>
												<div class="col-lg-4">
													<div class="row">
														<label class="col-lg-12 col-form-label fw-bold fs-6" name="" id="">
															<i class="fa fa-user fs-6" aria-hidden="true" title="Name"></i>&emsp;<?php echo $party_detail->NAME; ?></label>
														<label class="col-lg-12 col-form-label fw-bold fs-6" name="" id="">
															<i class="fa-solid fa-location-dot fs-6" aria-hidden="true" title="Address"></i>
														&emsp;<?php echo $party_detail->ADDRESS1; ?></label>
														<label class="col-lg-6 col-form-label fw-bold fs-6" name="" id="">
																<i class="fas fa-mobile-android-alt fs-6" aria-hidden="true" title="Mobile"></i>
															&emsp;<?php echo $party_detail->PHONE; ?></label>
														<!-- <label class="col-lg-2 col-form-label fw-semibold fs-6">Rating</label> -->
														<label class="col-lg-6 col-form-label fw-bold fs-6">
														<?php 		if($party_detail->RATING==1){ ?>
	                	<i class="fa-solid fa-star " style="color:red;"></i>&nbsp;Bad
	               <?php  }
	                else if($party_detail->RATING==2){ ?>
	                	<i class="fa-solid fa-star " style="color:#ffc700;"></i>&nbsp;Average	
	              <?php   }
	                else if($party_detail->RATING==3){ ?>
	                	<i class="fa-solid fa-star " style="color:#50cd89;"></i>&nbsp;Good
	              <?php   }
	                else{ ?>
	                	<i class="fa-solid fa-star " style="color:#d2d4dc;"></i>&nbsp;-	
	           <?php      } ?></label>
													</div>
												</div>
												<div class="col-lg-2">
													<!--begin::Image input-->
													<?php 	if($party_detail->PHOTO!='')
         { ?>
         <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($party_detail->PHOTO); ?>"  height="125px" width="125px">
		
        <?php  }
         else
         { ?>
         
		 <img src="<?php echo base_url(); ?>assets/images/party.jpg" height="125px" width="125px" >
       <?php   } ?>
														<!--end::Preview existing avatar-->
													
													<!--end::Image input-->
													<!--begin::Hint-->
													<div class="form-text"></div>
												</div>
											</div>
											<div class="row">
												<label class="col-form-label fw-bold fs-4">Sales Order Summary</label>
												<div class="col-lg-6">
													<div class="row">
														<div class="col-lg-2">
															<label title="Count">
																<svg fill="#d4af37" width="30px" height="30px" viewBox="0 0 32 32" version="1.1" xmlns="http://www.w3.org/2000/svg">
																	<path d="M11.652 19.245l-0.001-0.001-0.005-0.003zM30.671 16.098l-2.207-5.839-8.022-4.361-16.624 8.861-2.431 6.495 9.8 5.214 0.161-7.067-7.624-4.353 0.654 0.346-0.373-0.215 1.332 0.708-1.212-0.708 7.526 4.065 16.205-8.376-2.594 1.424 3.037-1.551-6.011 3.183-10.434 5.727-0.668 6.816 19.484-10.371zM11.976 17.206l-4.389-2.342 4.269 1.32 13.070-5.8-12.95 6.822z"></path>
																</svg>
															</label>
															<label class="col-form-label fw-bold fs-5" title="Count"><?php echo $sales_order->sales_gold_count; ?></label>
														</div>
														<div class="col-lg-5">
															<label><i class="fas fa-balance-scale fs-4" title="Weight"></i></label>
															<label class="col-form-label fw-bold fs-5" title="Weight"><?php echo $sales_order->sales_gold_weight; ?> gms</label>
														</div>
														<div class="col-lg-5">
															<label><i class="fas fa-money-check-alt fs-2" title="Amount"></i></label>
															<label class="col-form-label fw-bold fs-5" title="Amount"><?php echo $sales_order->sales_gold_amount; ?></label>
														</div>
													</div>
													<div class="row">
														<div class="col-lg-2">
															<label title="Count">
																<svg fill="#C0C0C0" width="30px" height="30px" viewBox="0 0 32 32" version="1.1" xmlns="http://www.w3.org/2000/svg">
																	<path d="M11.652 19.245l-0.001-0.001-0.005-0.003zM30.671 16.098l-2.207-5.839-8.022-4.361-16.624 8.861-2.431 6.495 9.8 5.214 0.161-7.067-7.624-4.353 0.654 0.346-0.373-0.215 1.332 0.708-1.212-0.708 7.526 4.065 16.205-8.376-2.594 1.424 3.037-1.551-6.011 3.183-10.434 5.727-0.668 6.816 19.484-10.371zM11.976 17.206l-4.389-2.342 4.269 1.32 13.070-5.8-12.95 6.822z"></path>
																</svg>
															</label>
															<label class="col-form-label fw-bold fs-5" title="Count"><?php echo $sales_order->sales_silver_count; ?></label>
														</div>
														<div class="col-lg-5">
															<label><i class="fas fa-balance-scale fs-4" title="Weight"></i></label>
															<label class="col-form-label fw-bold fs-5" title="Weight"><?php echo $sales_order->sales_silver_weight; ?> gms</label>
														</div>
														<div class="col-lg-5">
															<label><i class="fas fa-money-check-alt fs-2" title="Amount"></i></label>
															<label class="col-form-label fw-bold fs-5" title="Amount"><?php echo $sales_order->sales_silver_amount; ?></label>
														</div>
													</div>
												</div>
												<div class="col-lg-6">
													<div class="row mt-4">
														<div class="col-lg-6">
															<label><i class="fas fa-sack-dollar fs-2" title="Total Amount"></i></label>&nbsp;
															<label class="col-form-label fw-bold fs-2" title="Total Amount"><?php echo $sales_order->net_payable; ?></label>
														</div>
														<div class="col-lg-6">
															<label><i class="fas fa-hand-holding-usd fs-1" title="Paid Amount"></i></label>&nbsp;
															<label class="col-form-label fw-bold fs-2" title="Paid Amount"><?php echo $sales_order->paid_amount; ?></label>
															<!-- <i class="fas fa-info-circle fs-5" title="Payment Mode - Cash, Cheque, RTGS, UPI"></i> -->
														</div>
													</div>
												</div>
											</div>
											<div class="accordion" id="kt_accordion_item_list">
											    <div class="accordion-item">
											        <h2 class="accordion-header" id="kt_accordion_item_list_header_1">
											            <button class="accordion-button fw-bold fs-6 collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#kt_accordion_item_list_body_1" aria-expanded="false" aria-controls="kt_accordion_item_list_body_1">
											            Item List</button>
											        </h2>
											        <div id="kt_accordion_item_list_body_1" class="accordion-collapse collapse" aria-labelledby="kt_accordion_item_list_header_1" data-bs-parent="#kt_accordion_item_list">
											            <div class="accordion-body">
											           	  <table class="table align-middle table-row-dashed table-striped table-hover fs-7 gy-2 gs-2 dataTable" id="add_salesentry_table">
																	    <thead>
																	        <tr class="text-start text-muted fw-bold fs-7 gs-0">
																	          <th class="min-w-25px">Sno</th>
															            	<th class="min-w-80px">Item</th>
																            <th class="min-w-80px">Sub Item</th>
																            <th class="min-w-50px">Quality</th>
																            <th class="min-w-25px">Pur(%)</th>
																            <th class="min-w-100px">Rate(Per Gms)</th>
																            <th class="min-w-50px">Prev.Wgt(gms)</th>
																            <th class="min-w-25px">Ref.Img</th>
																            <th class="min-w-80px">Narration</th>
																            <th class="min-w-125px">Exp.Delivery Date</th>
																            <th class="min-w-80px">Est.Amount</th>
																           <!-- <th class="min-w-50px">Curr.Img</th>
																            <th class="min-w-100px">Tagged ID</th>
																            <th class="min-w-50px">Curr.Wgt(gms)</th>
																            <th class="min-w-100px">Total Amt</th>-->
																	        </tr>
																	    </thead>
																	    <tbody class="text-gray-600 fw-semibold">
																		<?php $i=1;
																		$tag_entry=$this->db->query("SELECT * FROM tag_entry ORDER BY tag_no DESC")->row();
																		$tag_no=$tag_entry->tag_no+1;
																		foreach($sales_order_tagged as $slist){ ?>
																	    	<tr>
																	    		<td><?php echo $i; ?></td>
															            <td class="ple1"><span><?php
																		$item_type=$this->db->query("SELECT * FROM jewel_type WHERE jewel_type_id='".$slist['item_type']."'  ")->row();
																		echo $item_type->jewel_type;
																		// echo  $slist['item_type']; ?></span> - <span><?php 
																		$item_name  = $this->db->query("SELECT * FROM ITEMS WHERE  SNO='". $slist['item']."' ")->row();
																		echo $item_name->ITEMNAME;
																		// echo $slist['item']; ?></span></td>
															            <td class="ple1"><?php 
																		$item_name  = $this->db->query("SELECT * FROM SUBITEM_LIST WHERE  SUB_ID='". $slist['subitem']."' ")->row();
																		echo $item_name->SUBITEM_NAME;
																		// echo $slist['subitem']; ?></td>
																	        <td><?php
																			 $quality  = $this->db->query("SELECT * FROM ITEMPURITY WHERE  ITEMPURITYID='". $slist['quality']."' ")->row();
																			 echo $quality->ITEMPURITYNAME;
																			// echo $slist['quality']; ?></td>
																	        <td><?php echo $slist['purity']; ?></td>
																	        <td><?php echo $slist['current_rate']; ?></td>
																	        <td><?php echo $slist['weight']; ?></td>
																	        <td>
															            	<div class="image-input mt-2" data-kt-image-input="true">
								<?php 											$image_url =  base_url().'assets/images/sales_order_image/'. $slist['img']; 
if(@getimagesize($image_url)){  ?>
																							<div class="image-input-wrapper w-40px h-40px" style="background-image: url(<?php echo base_url(); ?>assets/images/sales_order_image/<?php echo $slist['img']; ?>)"></div>
																							<!--end::Preview existing avatar-->
																					<?php }  else {   ?>

																						<div class="image-input-wrapper w-40px h-40px" style="background-image: url(<?php echo base_url() ?>assets/media/svg/avatars/blank_jwl.svg)"></div>
																						<?php }  ?>
																					
																							</div>
															            </td>
															            <td class="ple1"><?php $slist['narration']; ?></td>
															            <td><?php echo $slist['delivery_date']; ?></td>
															            <td><?php echo $slist['est_amount']; ?></td>
															            
																	    	</tr>
																			<?php $tag_no++; } ?>
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
											            Exchange -  Old Metal &emsp; - &emsp; Count <span>&emsp; <?php echo $sales_order->old_gold_count + $sales_order->old_silver_count ; ?> &emsp; - &emsp;</span> Total Amount <span>&emsp; <?php echo $sales_order->old_gold_amount + $sales_order->old_silver_amount ; ?> </span>
											            </button>
											        </h2>
											        <div id="kt_accordion_old_jewel_exchange_body_2" class="accordion-collapse collapse" aria-labelledby="kt_accordion_old_jewel_exchange_header_2" data-bs-parent="#kt_accordion_old_jewel_exchange">
											            <div class="accordion-body">
											           	  <table class="table align-middle table-row-dashed table-striped table-hover fs-7 gy-1 gs-2 dataTable" id="add_oldjewel_entry_table">
																	    <thead>
																	     <!-- style=" background-color: #A7D3F0 !important;border: 1px solid #606060 !important;color: black !important;"> -->
																        <tr class="text-start text-muted fw-bold fs-7 gs-0">
															            <th class="min-w-25px">Sno</th>
															            <th class="min-w-100px">Item Type</th>
															            <th class="min-w-150px">Item Name</th>
															            <th class="min-w-150px">Sub Item</th>
															            <th class="min-w-50px">Quality</th>
																					<th class="min-w-50px">Purity</th>
															            <th class="min-w-50px">Wgt(gms)</th>
															            <th class="min-w-50px">St Wgt(gms)</th>
															            <th class="min-w-50px">Less(gms)</th>
															            <th class="min-w-50px">Net Wgt(gms)</th>
															            <th class="min-w-50px">Img</th>
															            <th class="min-w-80px">Est Amount</th>
																        </tr>
																	    </thead>
																	    <tbody class="text-gray-600 fw-semibold">
																	    <?php $i=1; foreach($sales_order_old_metal as $slist){ ?>
																		<tr>
																	    		<td><?php echo $i; ?></td>
															            <td><?php
																		$item_type=$this->db->query("SELECT * FROM jewel_type WHERE jewel_type_id='".$slist['item_type']."'  ")->row();
																		echo $item_type->jewel_type;
																		// echo $slist['item_type']; ?></td>
															            <td><?php
																		$item_name  = $this->db->query("SELECT * FROM ITEMS WHERE  SNO='". $slist['item_name']."' ")->row();
																		echo $item_name->ITEMNAME;
																		// echo $slist['item_name']; ?></td>
															            <td><?php echo $slist['subitem_name']; ?></td>
															            <td><?php 
																		 $quality  = $this->db->query("SELECT * FROM ITEMPURITY WHERE  ITEMPURITYID='". $slist['quality']."' ")->row();
																		 echo $quality->ITEMPURITYNAME;
																		// echo $slist['quality']; ?></td>
															            <td><?php echo $slist['purity']; ?></td>
															            <td><?php echo $slist['weight']; ?></td>
															            <td><?php echo $slist['st_weight']; ?></td>
															            <td><?php echo $slist['less']; ?></td>
															            <td><?php echo $slist['net_weight']; ?></td>
															            <td>
															            	<div class="image-input mt-2" data-kt-image-input="true">
																			<?php 											$image_url =  base_url().'assets/images/sales_order_old_metal/'. $slist['img']; 
																		if(@getimagesize($image_url)){  ?>
																							<div class="image-input-wrapper w-40px h-40px" style="background-image: url(<?php echo base_url(); ?>assets/images/sales_order_old_metal/<?php echo $slist['img']; ?>)"></div>
																							<!--end::Preview existing avatar-->
																					<?php }  else {   ?>

																						<div class="image-input-wrapper w-40px h-40px" style="background-image: url(<?php echo base_url() ?>assets/media/svg/avatars/blank_jwl.svg)"></div>
																						<?php }  ?>
																						</div>
															            </td>
															            <td><?php echo $slist['est_amount']; ?></td>
																	    	</tr>
																			<?php $i++; } ?>
																	    </tbody>
																		</table>
											            </div>
											        </div>
											    </div>
											</div><br>
											<div class="row mt-2">
												<div class="col-lg-6">
													<div class="px-4" style="border:1.9px solid black;border-radius: 10px;">
														<label class="col-lg-12 col-form-label fw-bold fs-6 text-center">Sales</label>
														<table>
															<thead class="col-form-label fw-semibold fs-6">
																<td class="col-lg-4">Type</td>
																<td class="col-lg-4">Count</td>
																<td class="col-lg-5">Wgt(gms)</td>
																<td class="col-lg-5">Amount</td>
															</thead>
															<tbody class="col-form-label fw-bold fs-6">
																<tr>
																	<td class="col-lg-4">Gold</td>
																	<td class="col-lg-4"><?php echo $sales_order->sales_gold_count ; ?> </td>
																	<td class="col-lg-5"><?php echo $sales_order->sales_gold_weight ; ?> </td>
																	<td class="col-lg-5"><?php echo $sales_order->sales_gold_amount ; ?></td>
																</tr>
																<tr>
																	<td class="col-lg-4">Silver</td>
																	<td class="col-lg-4"><?php echo $sales_order->sales_silver_count ; ?></td>
																	<td class="col-lg-5"><?php echo $sales_order->sales_silver_weight ; ?> </td>
																	<td class="col-lg-5"><?php echo $sales_order->sales_silver_amount ; ?></td>
																</tr>
															</tbody>
														</table>
														<div class="col-lg-12 d-flex justify-content-center align-items-center">
															<label class="col-form-label fw-semibold fs-6">Total Amount &nbsp;</label>
															<label class="col-form-label fw-bold fs-3"> <?php echo $sales_order->sales_gold_amount + $sales_order->sales_silver_amount; ?></label>
														</div>
													</div>
												</div>
												<div class="col-lg-6">
													<div class="px-4" style="border:1.9px solid black;border-radius: 10px;">
														<label class="col-lg-12 col-form-label fw-bold fs-6 text-center">Old Gold Exchange</label>
														<table>
															<thead class="col-form-label fw-semibold fs-6">
																<td class="col-lg-4">Type</td>
																<td class="col-lg-4">Count</td>
																<td class="col-lg-5">Wgt(gms)</td>
																<td class="col-lg-5">Amount</td>
															</thead>
															<tbody class="col-form-label fw-bold fs-6">
																<tr>
																	<td class="col-lg-4">Gold</td>
																	<td class="col-lg-4"><?php echo $sales_order->old_gold_count ; ?> </td>
																	<td class="col-lg-5"><?php echo $sales_order->old_gold_weight ; ?> </td>
																	<td class="col-lg-5"><?php echo $sales_order->old_gold_amount ; ?></td>
																</tr>
																<tr>
																	<td class="col-lg-4">Silver</td>
																	<td class="col-lg-4"><?php echo $sales_order->old_silver_count ; ?> </td>
																	<td class="col-lg-5"><?php echo $sales_order->old_silver_weight ; ?> </td>
																	<td class="col-lg-5"><?php echo $sales_order->old_silver_amount ; ?></td>
																</tr>
															</tbody>
														</table>
														<div class="col-lg-12 d-flex justify-content-center align-items-center">
															<label class="col-form-label fw-semibold fs-6">Total Amount &nbsp;</label>
															<label class="col-form-label fw-bold fs-3"> <?php echo $sales_order->old_gold_amount + $sales_order->old_silver_amount ; ?></label>
														</div>
													</div>
												</div>
											</div>
											<div class="d-flex justify-content-center">
												<label class="col-form-label fw-bold fs-1">Net Payable &emsp;- </label>
												<label class="col-form-label fw-bold fs-1">&emsp;<?php echo $sales_order->net_payable; ?></label>
											</div>
											<div class="row">
												<label class="col-form-label fw-bold fs-5">Party Payment Details</label>
											</div>
											<div class="row">
											
											
												
												
											</div>
											<?php 
											$cash_detail=$this->db->query("SELECT * FROM payment_inward_outward WHERE bill_no='".$sales_order->sales_order_id."' AND type_of_payment='Cash' ")->row();
											if(isset($cash_detail)){ ?>
												<div class="row">
													<label class="col-lg-1 col-form-label fw-semibold fs-6" id="cash_lt_ey_label">Cash</label>
													<label class="col-lg-2 col-form-label fw-bold fs-4"><?php echo $cash_detail->amount; ?></label>
													<label class="col-lg-1 col-form-label fw-semibold fs-6" id="cheque_lt_ey_label">Details</label>
													<label class="col-lg-2 col-form-label fw-bold fs-4"><?php echo $cash_detail->remarks; ?></label>
												</div>
												<?php } ?>
												<?php
												$cheque_detail=$this->db->query("SELECT * FROM payment_inward_outward WHERE bill_no='".$sales_order->sales_order_id."' AND type_of_payment='Cheque' ")->row();
												if(isset($cheque_detail)){ ?>
												<div class="row">
													<label class="col-lg-1 col-form-label fw-semibold fs-6" id="cheque_lt_ey_label">Cheque</label>
													<label class="col-lg-2 col-form-label fw-bold fs-4"><?php echo $cheque_detail->amount; ?></label>
													<label class="col-lg-1 col-form-label fw-semibold fs-6" id="bank_lt_ey_label">Bank</label>
													<label class="col-lg-2 col-form-label fw-bold fs-4"><?php $bank=$this->db->query("SELECT * FROM BANKS WHERE SNO='".$cheque_detail->party_bank."'  ")->row();
																		echo $bank->BANKNAME;  // echo $cheque_detail->party_bank; ?></label>
													<label class="col-lg-1 col-form-label fw-semibold fs-6" id="cheque_lt_ey_label">Cheq no</label>
													<label class="col-lg-2 col-form-label fw-bold fs-4"><?php echo $cheque_detail->cheque_ref_no; ?></label>
													<label class="col-lg-1 col-form-label fw-semibold fs-6" id="cheque_lt_ey_label">Details</label>
													<label class="col-lg-2 col-form-label fw-bold fs-4"><?php echo $cheque_detail->remarks; ?></label>
												</div>
												<?php } ?>
												<?php $rtgs_detail=$this->db->query("SELECT * FROM payment_inward_outward WHERE bill_no='".$sales_order->sales_order_id."' AND type_of_payment='RTGS' ")->row();
												if(isset($rtgs_detail)){ ?>
												<div class="row">
												<label class="col-lg-1 col-form-label fw-semibold fs-6" id="cheque_lt_ey_label">Cheque</label>
													<label class="col-lg-2 col-form-label fw-bold fs-4"><?php echo $rtgs_detail->amount; ?></label>
													<label class="col-lg-1 col-form-label fw-semibold fs-6" id="bank_lt_ey_label">Bank</label>
													<label class="col-lg-2 col-form-label fw-bold fs-4"><?php
													$bank=$this->db->query("SELECT * FROM BANKS WHERE SNO='".$rtgs_detail->party_bank."'  ")->row();
													echo $bank->BANKNAME;
													// echo $rtgs_detail->party_bank; ?></label>
													<label class="col-lg-1 col-form-label fw-semibold fs-6" id="cheque_lt_ey_label">Cheq no</label>
													<label class="col-lg-2 col-form-label fw-bold fs-4"><?php echo $rtgs_detail->cheque_ref_no; ?></label>
													<label class="col-lg-1 col-form-label fw-semibold fs-6" id="cheque_lt_ey_label">Details</label>
													<label class="col-lg-2 col-form-label fw-bold fs-4"><?php echo $rtgs_detail->remarks; ?></label>
												</div>
												<?php } ?>
												<?php $upi_detail=$this->db->query("SELECT * FROM payment_inward_outward WHERE bill_no='".$sales_order->sales_order_id."' AND type_of_payment='UPI' ")->row();
												if(isset($upi_detail)){ ?>
												<div class="row">
												<label class="col-lg-1 col-form-label fw-semibold fs-6" id="cheque_lt_ey_label">Cheque</label>
													<label class="col-lg-2 col-form-label fw-bold fs-4"><?php echo $upi_detail->amount; ?></label>
													
													<label class="col-lg-1 col-form-label fw-semibold fs-6" id="cheque_lt_ey_label">Cheq no</label>
													<label class="col-lg-2 col-form-label fw-bold fs-4"><?php echo $upi_detail->cheque_ref_no; ?></label>
													<label class="col-lg-1 col-form-label fw-semibold fs-6" id="cheque_lt_ey_label">Details</label>
													<label class="col-lg-2 col-form-label fw-bold fs-4"><?php echo $upi_detail->remarks; ?></label>
												</div>
												<?php } ?>
											<div class="row">
												<label class="col-lg-1 col-form-label fw-semibold fs-6">Net Payable</label>
												<label class="col-lg-2 col-form-label fw-bold fs-2"><?php echo $sales_order->net_payable; ?></label>
												<label class="col-lg-1 col-form-label fw-semibold fs-6">Paid Amount</label>
												<label class="col-lg-2 col-form-label fw-bold fs-2" id=""><?php echo $sales_order->paid_amount; ?></label>
												<label class="col-lg-1 col-form-label fw-semibold fs-6">Balance Amount</label>
												<label class="col-lg-2 col-form-label fw-bold fs-2" id=""><?php echo $sales_order->balance_amount; ?></label>
												<div class="col-lg-3">
													<label class="form-check form-check-inline form-check-solid is-invalid py-5">
														<input class="form-check-input" name="" checked disabled type="checkbox" id="">
														<span class="col-form-label fw-semibold fs-6">Add Balance to Credit</span>
													</label>
												</div>
											</div>
											<div class="row">
												<div class="col-lg-8"></div>
												<label class="col-lg-1 col-form-label required fw-semibold fs-6">Supplier</label>
												<div class="col-lg-2 fv-row fv-plugins-icon-container">
													<select class="form-select form-select-solid" data-control="select2">
														<option value="">Select Supplier</option>	
														<option value="1">Supplier 1</option>				
														<option value="2">Supplier 2</option>
													</select>
												</div>
												<div class="col-lg-1">
													<button type="submit" class="btn btn-primary" id="">Maker</button>
												</div>
											</div>
											<!--end::Actions-->
										</div>
										<!--end::Card body-->
									</div>
									</form>
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
		<!--end::Root-->
		<?php $this->load->view("script");?>

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
<!-- Paid from Party Start -->
		<script>
			function cash_pdfrm_party_add_radio()
			{
				var cash_paid_from_party_add_radio = document.getElementById("cash_paid_from_party_add_radio");

				var cash_party_label = document.getElementById("cash_party_label");
				var cash_party_label_tbox = document.getElementById("cash_party_label_tbox");
				var cash_party_detail_tbox = document.getElementById("cash_party_detail_tbox");

				if (cash_paid_from_party_add_radio.checked)
				{
				    cash_party_label.style.display = "block";
				    cash_party_label_tbox.style.display = "block";
				    cash_party_detail_tbox.style.display = "block";
			  	} else 
			  	{
			  		cash_party_label.style.display = "none";
			  		cash_party_label_tbox.style.display = "none";
			  		cash_party_detail_tbox.style.display = "none";
			  	}
			};

			function cheque_pdfrm_party_add_radio()
			{
				var cheque_paid_from_party_add_radio = document.getElementById("cheque_paid_from_party_add_radio");

				var cheque_party_amt = document.getElementById("cheque_party_amt");
				var cheque_party_amt_tbox = document.getElementById("cheque_party_amt_tbox");
				// var cheque_bank = document.getElementById("cheque_bank");
				var cheque_party_bank_tbox = document.getElementById("cheque_party_bank_tbox");
				// var cheque_chq_no = document.getElementById("cheque_chq_no");
				var cheque_party_chq_no_tbox = document.getElementById("cheque_party_chq_no_tbox");
				// var cheque_detail = document.getElementById("cheque_detail");
				var cheque_party_detail_tbox = document.getElementById("cheque_party_detail_tbox");

				if (cheque_paid_from_party_add_radio.checked)
				{
				    cheque_party_amt.style.display = "block";
				    cheque_party_amt_tbox.style.display = "block";
				    // cheque_bank.style.display = "block";
				    cheque_party_bank_tbox.style.display = "block";
				    // cheque_chq_no.style.display = "block";
				    cheque_party_chq_no_tbox.style.display = "block";
				    // cheque_detail.style.display = "block";
				    cheque_party_detail_tbox.style.display = "block";
			  	} else 
			  	{
			     	cheque_party_amt.style.display = "none";
				    cheque_party_amt_tbox.style.display = "none";
				    // cheque_bank.style.display = "none";
				    cheque_party_bank_tbox.style.display = "none";
				    // cheque_chq_no.style.display = "none";
				    cheque_party_chq_no_tbox.style.display = "none";
				    // cheque_detail.style.display = "none";
				    cheque_party_detail_tbox.style.display = "none";
			  	}
			};

			function rtgs_pdfrm_party_add_radio()
			{
				var rtgs_paid_from_party_add_radio = document.getElementById("rtgs_paid_from_party_add_radio");

				var rtgs_party_amt = document.getElementById("rtgs_party_amt");
				var rtgs_party_amt_tbox = document.getElementById("rtgs_party_amt_tbox");
				// var rtgs_bank = document.getElementById("rtgs_bank");
				var rtgs_party_bank_tbox = document.getElementById("rtgs_party_bank_tbox");
				// var rtgs_no = document.getElementById("rtgs_no");
				var rtgs_party_no_tbox = document.getElementById("rtgs_party_no_tbox");
				// var rtgs_detail = document.getElementById("rtgs_detail");
				var rtgs_party_detail_tbox = document.getElementById("rtgs_party_detail_tbox");

				if (rtgs_paid_from_party_add_radio.checked == true)
				{
				    rtgs_party_amt.style.display = "block";
				    rtgs_party_amt_tbox.style.display = "block";
				    // rtgs_bank.style.display = "block";
				    rtgs_party_bank_tbox.style.display = "block";
				    // rtgs_no.style.display = "block";
				    rtgs_party_no_tbox.style.display = "block";
				    // rtgs_detail.style.display = "block";
				    rtgs_party_detail_tbox.style.display = "block";
			  	} else 
			  	{
			     	rtgs_party_amt.style.display = "none";
				    rtgs_party_amt_tbox.style.display = "none";
				    // rtgs_bank.style.display = "none";
				    rtgs_party_bank_tbox.style.display = "none";
				    // rtgs_no.style.display = "none";
				    rtgs_party_no_tbox.style.display = "none";
				    // rtgs_detail.style.display = "none";
				    rtgs_party_detail_tbox.style.display = "none";
			  	}
			};

			function upi_pdfrm_party_add_radio()
			{
				var upi_paid_from_party_add_radio = document.getElementById("upi_paid_from_party_add_radio");

				var upi_party_amt = document.getElementById("upi_party_amt");
				var upi_party_amt_tbox = document.getElementById("upi_party_amt_tbox");
				// var upi_trans_no = document.getElementById("upi_trans_no");
				var upi_party_trans_no_tbox = document.getElementById("upi_party_trans_no_tbox");
				var upi_party_bank_tbox = document.getElementById("upi_party_bank_tbox");
				var upi_party_detail_tbox = document.getElementById("upi_party_detail_tbox");

				if (upi_paid_from_party_add_radio.checked == true)
				{
				    upi_party_amt.style.display = "block";
				    upi_party_amt_tbox.style.display = "block";
				    // upi_trans_no.style.display = "block";
				    upi_party_trans_no_tbox.style.display = "block";
				    upi_party_bank_tbox.style.display = "block";
				    upi_party_detail_tbox.style.display = "block";
			  	} else 
			  	{
			     	upi_party_amt.style.display = "none";
				    upi_party_amt_tbox.style.display = "none";
				    // upi_trans_no.style.display = "none";
				    upi_party_trans_no_tbox.style.display = "none";
				    upi_party_bank_tbox.style.display = "none";
				    upi_party_detail_tbox.style.display = "none";
			  	}
			};
		</script>
		<!-- Paid from Party End -->
<script>
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