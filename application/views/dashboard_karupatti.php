<?php include "common.php"?>
<style>
	.dataTables_scroll
    {
        position: relative;
        overflow: auto;
        min-height: 271px;
        max-height: 271px;/*the maximum height you want to achieve*/
        width: 100%;
    }
  .dataTables_scroll thead{
    position: -webkit-sticky;
    position: sticky;
    top: 0;
    /*background-color: #fff;*/
    z-index: 2;
  }
  .dataTables_scroll_cash_in_hand
    {
        position: relative;
        overflow: auto;
        min-height: 280px;
        max-height: 280px;/*the maximum height you want to achieve*/
        width: 100%;
    }
  .dataTables_scroll_cash_in_hand thead{
    position: -webkit-sticky;
    position: sticky;
    top: 0;
    /*background-color: #fff;*/
    z-index: 2;
  }
  .dataTables_scroll_payments_mode
    {
        position: relative;
        overflow: auto;
        min-height: 280px;
        max-height: 280px;/*the maximum height you want to achieve*/
        width: 100%;
    }
  .dataTables_scroll_payments_mode thead{
    position: -webkit-sticky;
    position: sticky;
    top: 0;
    /*background-color: #fff;*/
    z-index: 2;
  }
  .dataTables_scroll_highest
    {
        position: relative;
        overflow: auto;
        min-height: 280px;
        max-height: 280px;/*the maximum height you want to achieve*/
        width: 100%;
    }
  .dataTables_scroll_highest thead{
    position: -webkit-sticky;
    position: sticky;
    top: 0;
    /*background-color: #fff;*/
    z-index: 2;
  }
  .dataTables_jewellery_delivered
    {
        position: relative;
        overflow: auto;
        min-height: 240px;
        max-height: 240px;/*the maximum height you want to achieve*/
        width: 100%;
    }
  .dataTables_jewellery_delivered thead{
    position: -webkit-sticky;
    position: sticky;
    top: 0;
    /*background-color: #fff;*/
    z-index: 2;
  }
  .dataTables_chit_delivered
    {
        position: relative;
        overflow: auto;
        min-height: 160px;
        max-height: 160px;/*the maximum height you want to achieve*/
        width: 100%;
    }
  .dataTables_chit_delivered thead{
    position: -webkit-sticky;
    position: sticky;
    top: 0;
    /*background-color: #fff;*/
    z-index: 2;
  }
  

  .dataTables_jewellery_payments_mode
    {
        position: relative;
        overflow: auto;
        min-height: 280px;
        max-height: 280px;/*the maximum height you want to achieve*/
        width: 100%;
    }
  .dataTables_jewellery_payments_mode thead{
    position: -webkit-sticky;
    position: sticky;
    top: 0;
    /*background-color: #fff;*/
    z-index: 2;
  }
  .dataTables_jewellery_membership_card_issue
    {
        position: relative;
        overflow: auto;
        min-height: 280px;
        max-height: 280px;/*the maximum height you want to achieve*/
        width: 100%;
    }
  .dataTables_jewellery_membership_card_issue thead{
    position: -webkit-sticky;
    position: sticky;
    top: 0;
    /*background-color: #fff;*/
    z-index: 2;
  }

  .dataTables_scroll_jst
    {
        position: relative;
        overflow: auto;
        min-height: 190px;
        max-height: 190px;/*the maximum height you want to achieve*/
        width: 100%;
    }
  .dataTables_scroll_jst thead{
    position: -webkit-sticky;
    position: sticky;
    top: 0;
    /*background-color: #fff;*/
    z-index: 2;
  }

  .dataTables_karuppati_packed_orders
    {
        position: relative;
        overflow: auto;
        min-height: 190px;
        max-height: 190px;/*the maximum height you want to achieve*/
        width: 100%;
    }
  .dataTables_karuppati_packed_orders thead{
    position: -webkit-sticky;
    position: sticky;
    top: 0;
    /*background-color: #fff;*/
    z-index: 2;
  }
  
  .dash_loan{
        max-width: 50px;
        white-space: nowrap;
        text-overflow: ellipsis;
        overflow: hidden;
      }
      [role="tooltip"]{
        visibility: hidden;
      }

		#gold_count #gold_sub_count {
		  display: none;
			}
	#gold_count:hover #gold_sub_count {
	  display: block;
	  position: absolute;
	  margin-top: 0.5em;
	  margin-left: -4.5em !important;
	  color: white;
	  background: black;
	  padding: 3px 13px 3px 10px;
	  border-radius: 5px;
	  font-size: 14px;
	}
	#silver_count #silver_sub_count {
		  display: none;
			}
	#silver_count:hover #silver_sub_count {
	  display: block;
	  position: absolute;
	  margin-top: 0.5em;
	  margin-left: -4.5em !important;
	  color: white;
	  background: black;
	  padding: 3px 13px 3px 10px;
	  border-radius: 5px;
	  font-size: 14px;

	}
	#ogp_label #ogp_sub_label {
		  display: none;
			}
	#ogp_label:hover #ogp_sub_label {
	  display: block;
	  position: absolute;
	  margin-top: -4em;
	  margin-left: 5.5em !important;
	  color: white;
	  background: black;
	  padding: 3px 13px 3px 10px;
	  border-radius: 5px;
	  font-size: 14px;

	}

	#today_sales_count #today_sales_sub_count {
		  display: none;
			}
	#today_sales_count:hover #today_sales_sub_count {
	  display: block;
	  position: absolute;
	  margin-top: -2em;
	  margin-left: -16.5em !important;
	  color: white;
	  background: black;
	  padding: 3px 13px 3px 10px;
	  border-radius: 5px;
	  font-size: 14px;
	}
	#sales_count #sales_sub_count {
		  display: none;
			}
	#sales_count:hover #sales_sub_count {
	  display: block;
	  position: absolute;
	  margin-top: -2em;
	  margin-left: -9.5em !important;
	  color: white;
	  background: black;
	  padding: 3px 13px 3px 10px;
	  border-radius: 5px;
	  font-size: 14px;
	}
	#today_order_count #today_sale_order_count {
		  display: none;
			}
	#today_order_count:hover #today_sale_order_count {
	  display: block;
	  position: absolute;
	  margin-top: 0em;
	  margin-left: 1.5em !important;
	  color: white;
	  background: black;
	  padding: 3px 13px 3px 10px;
	  border-radius: 5px;
	  font-size: 14px;
	}
	#packed_count #packed_sub_count {
		  display: none;
			}
	#packed_count:hover #packed_sub_count {
	  display: block;
	  position: absolute;
	  margin-top: -2em;
	  margin-left: -10.5em !important;
	  color: white;
	  background: black;
	  padding: 3px 13px 3px 10px;
	  border-radius: 5px;
	  font-size: 14px;
	}
	#dispatch_count #dispatch_sub_count {
		  display: none;
			}
	#dispatch_count:hover #dispatch_sub_count {
	  display: block;
	  position: absolute;
	  margin-top: -2em;
	  margin-left: -11.5em !important;
	  color: white;
	  background: black;
	  padding: 3px 13px 3px 10px;
	  border-radius: 5px;
	  font-size: 14px;
	}
	#dispatch_pen_count #dispatch_pen_sub_count {
		  display: none;
			}
	#dispatch_pen_count:hover #dispatch_pen_sub_count {
	  display: block;
	  position: absolute;
	  margin-top: -2em;
	  margin-left: -12.5em !important;
	  color: white;
	  background: black;
	  padding: 3px 13px 3px 10px;
	  border-radius: 5px;
	  font-size: 14px;
	}
	#purchase_prop #purchase_prop_sub {
		  display: none;
			}
	#purchase_prop:hover #purchase_prop_sub {
	  display: block;
	  position: absolute;
	  margin-top: -2em;
	  margin-left: -15.5em !important;
	  color: white;
	  background: black;
	  padding: 3px 13px 3px 10px;
	  border-radius: 5px;
	  font-size: 14px;
	}
	#purchase_recp #purchase_recp_sub {
		  display: none;
			}
	#purchase_recp:hover #purchase_recp_sub {
	  display: block;
	  position: absolute;
	  margin-top: -4.6em;
	  margin-left: -5.5em !important;
	  color: white;
	  background: black;
	  padding: 3px 13px 3px 10px;
	  border-radius: 5px;
	  font-size: 14px;
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
				<?php include "sidebar.php"?>
				<!--begin::Wrapper-->
				<div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
				<?php include "header.php"?>	
					<!--begin::Content-->
					<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
						<!--begin::Container-->
						<div id="kt_content_container" class="container-xxl">
							<!--begin::Row-->
							<div class="row g-5 g-xl-8">
								<!--begin::Col-->
								<div class="col-xxl-8">
									<!--begin::Toolbar-->
									<div class="toolbar" id="kt_toolbar">
										<!--begin::Container-->
										<div id="kt_toolbar_container" class="container-fluid d-flex align-items-center">
											<!--begin::Page title-->
											<div class="flex-grow-1 flex-shrink-0 me-5">
												<!--begin::Page title-->
												<div data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
													<div class="d-grid mt-4">
														<ul class="nav nav-tabs flex-nowrap text-nowrap">
															<li class="nav-item" style="display: none;">
																<a class="nav-link  btn btn-active-light btn-color-black-800 btn-active-color-primary rounded-bottom-0 fw-bold fs-6"  href="#kt_tab_pane_loan">Loan</a>
															</li>
															<li class="nav-item" style="display: ;">
																<a class="nav-link btn btn-active-light btn-color-black-800 btn-active-color-primary rounded-bottom-0 fw-bold fs-6"  href="<?php echo base_url(); ?>Dashboard/jewellery">Jewellery</a>
															</li>
															<li class="nav-item">
																<a class="nav-link btn btn-active-light btn-color-black-800 btn-active-color-primary rounded-bottom-0 fw-bold fs-6 active"  href="<?php echo base_url(); ?>Dashboard/karupatti">Karuppati</a>
															</li>
															<li class="nav-item" style="display: none;">
																<a class="nav-link btn btn-active-light btn-color-black-800 btn-active-color-primary rounded-bottom-0 fw-bold fs-6"  href="<?php echo base_url(); ?>Dashboard/chit">Chit</a>
															</li>
															<li class="nav-item">
																<a class="nav-link  btn btn-active-light btn-color-black-800 btn-active-color-primary rounded-bottom-0 fw-bold fs-6"  href="<?php echo base_url(); ?>Dashboard/real_estate">Real Estate</a>
															</li>
														</ul>
													</div>
												</div>
												<!--end::Page title-->
											</div>
											<!--end::Page title-->
											
										</div>
										<!--end::Container-->
									</div>
									<!--end::Toolbar-->
									<!--begin::Tables Widget 9-->
									<!-- <div class="card card-xxl-stretch mt-4 mt-xl-8"> -->
										<!--begin::Card body-->
										<?php if(isset($_SESSION['KarupattiView'])){ if($_SESSION['KarupattiView']==1){?>
										<div class="card-body py-2">
											<div class="tab-content" id="myTabContent">
												
												<div class="tab-pane fade show active" id="kt_tab_pane_karuppati" role="tabpanel">
													<div class="row">
														<!--begin::Col-->
														<div class="col-xl-4">
															<!--begin::Mixed Widget 5-->
															<div class="card card-xl-stretch mb-2 mb-xl-2" style="min-height: 320px !important; max-height: 320px !important;">
																<div class="row">
																	<div class="col-xl-8">
																		<h3 class="card-title align-items-start flex-column ms-5 mt-6">
																			<span class="card-label fw-bold fs-1">Sales </span>
																		</h3>
																	</div>
																	<div class="col-xl-4 d-flex align-items-center justify-content-center">
																		<h3 class="card-title align-items-start flex-column mt-6" id="today_sales_count">
																			<span class="badge badge-success fs-1"><?php echo str_pad($sale_list_count?$sale_list_count:0, 2, '0', STR_PAD_LEFT); ?></span>
																			<span id="today_sales_sub_count">Total&nbsp;Product&nbsp;Sales&nbsp;Today</span>
																		</h3>
																	</div>
																</div>
																<!--begin::Body-->
																<div class="card-body px-8 py-1">
																	<!--begin::Table-->
																	<table class="table align-middle table-row-dashed table-hover fs-7 gy-1 gs-2" id="karuppati_sales">
																		<!--begin::Table head-->
																		<thead>
																			<tr class="text-start text-muted fw-bold fs-6 gs-0">
																				<th class="min-w-200px">Product </th>
																				<th class="min-w-100px">Weights(gms)</th>
																			</tr>
																		</thead>
																		<!--end::Table head-->
																		<!--begin::Table body-->
																		<tbody>
																			<?php foreach($sale_list as $slist){
																				$product_detail=$this->db->query("select * from AKS_PRD_MASTER where  AKS_PRD_MID='".$slist['product_id']."'")->row();
																				?>
																				<tr>
																					<td class="dash_loan">
																						<div class="d-flex mb-1">
																							<div class="d-flex align-items-center">
																								<div class="symbol symbol-35px me-2">

																									<?php if($product_detail->AKS_PRD_IMG!=''){ ?>
																									<img src="<?php echo base_url();?>assets/images/aks_product_image/<?php echo $product_detail->AKS_PRD_IMG; ?>" alt="" >
																									<?php }else{ ?>
																										<img src="<?php echo base_url();?>assets/images/karupatti.jpg" alt="" >
																									<?php } ?>

																								</div>
																							</div>
																							<div class="d-flex align-items-center justify-content-start">
																								<a href="javascript:;" class="fs-6 text-gray-800 fw-bold"><?php echo $product_detail->AKS_PRD_NAME; ?></a>
																							</div>
																						</div>
																					</td>
																					<td class="dash_loan">
																						<a href="javascript:;" class="text-dark fw-bold d-block fs-6"><?php echo $slist['weight'].' g'; ?></a>
																					</td>
																				</tr>
																			<?php } ?>
																		
																		</tbody>
																		<!--end::Table body-->
																	</table>
																	<!--end::Table-->
																</div>
																<!--end::Body-->
															</div>
															<!--end::Mixed Widget 5-->
														</div>
														<!--end::Col-->
														<!--begin::Col-->
														<div class="col-xl-4">
															<!--begin::Mixed Widget 5-->
															<div class="card card-xl-stretch mb-2 mb-xl-2"  style="min-height: 320px !important; max-height: 320px !important;">
																<div class="row">
																	<div class="col-xl-8">
																		<h3 class="card-title align-items-start flex-column ms-5 mt-6">
																			<span class="card-label fw-bold fs-1">Top Customers</span>
																			<!-- <span class="card-label fw-bold fs-1">03</span> -->
																		</h3>
																	</div>
																	<div class="col-xl-4 d-flex align-items-center justify-content-center">
																		<h3 class="card-title align-items-start flex-column mt-6" id="sales_count">
																			<span class="badge badge-success fs-1"><?php echo str_pad($top_customers_count?$top_customers_count:0, 2, '0', STR_PAD_LEFT); ?></span>
																			<div id="sales_sub_count">
																				<span>Total</span>
																				<span>Customer</span>
																			</div>
																			
																		</h3>
																	</div>
																</div>
																<!--begin::Body-->
																<div class="card-body px-8 py-1">
																	<div class="row">
																		<table class="table align-middle table-row-dashed table-hover fs-7 gy-1 gs-3" id="karuppati_top_customers">
																			<!--begin::Table head-->
																			<thead>
																				<tr class="text-start text-muted fw-bold fs-6 gs-0">
																					<th class="min-w-200px">Party</th>
																					<th class="min-w-100px">Mobile</th>
																				</tr>
																			</thead>
																			<!--end::Table head-->
																			<!--begin::Table body-->
																			<tbody>
																				<?php foreach($top_customers_list as $tlist){

																					if($tlist['id_party']!=''){
																					$party_detail=$this->db->query("SELECT * FROM PARTIES WHERE PID='".$tlist['id_party']."'")->row(); ?>
																					<tr>
																						<td class="dash_loan">
																							<div class="d-flex mb-1">
																								<div class="d-flex align-items-center">
																									<div class="symbol symbol-35px me-2">
																									<?php 
																										if($party_detail->PHOTO!="")
																										{
																											if($party_detail->TYPE_OF_RECORD=='N')
																											{?>
																												<img src="<?php echo $party_detail->PHOTO; ?>" height="125px" width="125px" >
																											<?php 
																											}
																											else
																											{
																										?>
																										<img src="data:image/jpeg;base64,<?php echo base64_encode($party_detail->PHOTO); ?>"  >
																										<?php 
																										}
																										}
																										else
																										{?>
																											<img src="<?php echo base_url();?>assets/images/party.jpg"  >
																										<?php }
																									?>
																									</div>
																								</div>
																								<div class="d-flex flex-column flex-grow-1">
																									<a href="javascript:;" class="fs-6 text-gray-800 fw-bold"><?php echo ucfirst($party_detail?$party_detail->NAME:'-');  ?></a>
																									<label>
																										<span class="text-primary fw-bold me-2"><?php echo ucfirst($tlist['id_party']); ?></span>
																									</label>
																								</div>
																							</div>
																						</td>
																						<td class="dash_loan">
																							<a href="javascript:;" class="text-dark fw-bold d-block fs-6"><?php echo isset($party_detail)? 
																							$party_detail->PHONE?$party_detail->PHONE:'-' :'-';  ?></a>
																						</td>
																					</tr>
																				<?php }  }?>
																				
																			</tbody>
																			<!--end::Table body-->
																		</table>
																	</div>
																</div>
																<!--end::Body-->
															</div>
															<!--end::Mixed Widget 5-->
														</div>
														<!--end::Col-->
														<div class="col-xl-4">
															<!--begin::Mixed Widget 5-->
															<div class="card card-xl-stretch mb-2 mb-xl-2" style="min-height: 320px !important; max-height: 320px !important;">
																<div class="row">
																	<div class="col-xl-6" >
																		<h3 class="card-title align-items-start flex-column ms-5 mt-6" id="today_order_count">
																			<span class="card-label fw-bold fs-1">Orders</span>
																			<span id="today_sale_order_count">Total&nbsp;Today&nbsp;Delivered Orders</span>
																		</h3>
																	</div>
																	<div class="col-xl-6 d-flex align-items-center justify-content-center">
																		<h3 class="card-title align-items-start flex-column mt-6 me-3" id="gold_count">
																			<span class="badge badge-info fs-1" style="color: black;background-color: #d3adff;"><?php echo str_pad($manualcount?$manualcount:0, 2, '0', STR_PAD_LEFT); ?></span>
																			<span id="gold_sub_count">Manual Count</span>
																		</h3>
																		<h3 class="card-title align-items-start flex-column mt-6" id="silver_count">
																			<span class="badge badge-info fs-1" style="color: black;background-color: #fba2a2;"><?php echo str_pad($websitecount?$websitecount:0, 2, '0', STR_PAD_LEFT); ?></span>
																			<span id="silver_sub_count">Website Count</span>
																		</h3>
																	</div>
																</div>
																<!--begin::Body-->
																<div class="card-body px-8 py-1">
																	<div class="row">
																		<table class="table align-middle table-row-dashed table-hover fs-7 gy-1 gs-3" id="karuppati_orders">
																			<thead>
																				<tr class="text-start text-muted fw-bold fs-6 gs-0">
																					<th class="min-w-100px">Type</th>
																					<th class="min-w-100px">Amount</th>
																				</tr>
																			</thead>
																			<tbody>
																				<tr>
																					<td>
																						<span class="me-2" style="background-color:#d3adff;border-radius: 3px;width: 30px;border: 1px solid black;padding: 0px 6px 0px 10px;"></span>
																						<span class="fs-6 text-gray-800 fw-bold">Manual</span>
																					</td>
																					<td>
																						<span class="fs-6 text-gray-800 fw-bold"><?php 	echo number_format($total_manual_amt?$total_manual_amt:0 , 2 ,'.',','); ?></span>
																					</td>
																				</tr>		
																				<tr>		
																					<td>		
																						<span class="me-2" style="background-color		:#fba2a2;border-radius: 3px;width: 30px;border: 1px solid black;padding: 0px 6px 0px 10px;"></span>
																						<span class="fs-6 text-gray-800 fw-bold">Website</span>
																					</td>		
																					<td>
																						<span class="fs-6 text-gray-800 fw-bold"><?php 	echo number_format($website_total_amount?$website_total_amount:0 , 2 ,'.',','); ?></span>
																					</td>
																				</tr>
																			</tbody>
																		</table>
																	</div>
																</div>
																<!--end::Body-->
																<div class="row">
																	<div class="col-xl-6">
																		<h3 class="card-title align-items-start flex-column ms-5 mt-2" id="today_order_count">
																			<span class="card-label fw-bold fs-2">Pending Orders</span>
																			<span id="today_sale_order_count">Total&nbsp;Today&nbsp;Pending&nbsp;Orders</span>
																		</h3>
																	</div>
																	<div class="col-xl-6 d-flex align-items-center justify-content-center">
																		<h3 class="card-title align-items-start flex-column mt-2 me-3" id="gold_count">
																			<span class="badge badge-info fs-1" style="color: black;background-color: #d3adff;"><?php echo str_pad($pen_manualcount?$pen_manualcount:0, 2, '0', STR_PAD_LEFT); ?></span>
																			<span id="gold_sub_count">Manual Count</span>
																		</h3>
																		<h3 class="card-title align-items-start flex-column mt-2" id="silver_count">
																			<span class="badge badge-info fs-1" style="color: black;background-color: #fba2a2;"><?php echo str_pad($pen_website_count?$pen_website_count:0, 2, '0', STR_PAD_LEFT); ?></span>
																			<span id="silver_sub_count">Website Count</span>
																		</h3>
																	</div>
																</div>
																<!--begin::Body-->
																<div class="card-body px-8 py-1">
																	<div class="row">
																		<table class="table align-middle table-row-dashed table-hover fs-7 gy-1 gs-3" id="karuppati_pending_orders">
																			<thead>
																				<tr class="text-start text-muted fw-bold fs-6 gs-0">
																					<th class="min-w-100px">Type</th>
																					<th class="min-w-100px">Amount</th>
																				</tr>
																			</thead>
																			<tbody>
																				<tr>
																					<td>
																						<span class="me-2" style="background-color:#d3adff;border-radius: 3px;width: 30px;border: 1px solid black;padding: 0px 6px 0px 10px;"></span>
																						<span class="fs-6 text-gray-800 fw-bold">Manual</span>
																					</td>
																					<td>
																						<span class="fs-6 text-gray-800 fw-bold"><?php 	echo number_format($pen_total_manual_amt?$pen_total_manual_amt:0 , 2 ,'.',','); ?></span>
																					</td>
																				</tr>
																				<tr>
																					<td>
																						<span class="me-2" style="background-color:#fba2a2;border-radius: 3px;width: 30px;border: 1px solid black;padding: 0px 6px 0px 10px;"></span>
																						<span class="fs-6 text-gray-800 fw-bold">Website</span>
																					</td>
																					<td>
																						<span class="fs-6 text-gray-800 fw-bold"><?php 	echo number_format($pen_total_website_amt?$pen_total_website_amt:0 , 2 ,'.',','); ?></span>
																					</td>
																				</tr>
																			</tbody>
																		</table>
																	</div>
																</div>
																<!--end::Body-->
															</div>
															<!--end::Mixed Widget 5-->
														</div>
													</div>
													<div class="row mt-1">
														<!--begin::Col-->
														<div class="col-xl-4">
															<a href="<?php 	echo base_url(); ?>Akssale">
																<!--begin::Mixed Widget 5-->
																<div class="card card-xl-stretch mb-2 mb-xl-2" style="min-height: 280px !important; max-height: 280px !important;">
																	<div class="row">
																		<div class="col-xl-8">
																			<h3 class="card-title align-items-start flex-column ms-5 mt-6">
																				<span class="card-label fw-bold fs-1">Packed Orders</span>
																			</h3>
																		</div>
																			<div class="col-xl-4 d-flex align-items-center justify-content-center">
																			<h3 class="card-title align-items-start flex-column mt-6 " id="sales_count">
																				<span class="badge badge-success fs-1"><?php echo str_pad($total_packed_count?$total_packed_count:0, 2, '0', STR_PAD_LEFT); ?></span>
																				<span id="sales_sub_count">Today Packed</span>
																			</h3>
																			<!-- <h3 class="card-title align-items-start flex-column mt-6" id="packed_count">
																				<span class="badge badge-info fs-1" style="color: white;background-color: red;">< ?php echo str_pad($total_not_packed_count?$total_not_packed_count:0, 2, '0', STR_PAD_LEFT); ?></span>
																				<span id="packed_sub_count">Packed Pending</span>
																			</h3> -->
																		</div>
																	</div>
																	<!--begin::Body-->
																	<div class="card-body px-8 py-1">
																		<!--begin::Table-->
																		<table class="table align-middle table-row-dashed table-hover fs-7 gy-2 gs-2" id="karuppati_packed_orders">
																			<!--begin::Table head-->
																			<thead>
																				<tr class="text-start text-muted fw-bold fs-6 gs-0">
																					<th class="min-w-200px">Order ID</th>
																					<th class="min-w-100px">Count</th>
																				</tr>
																			</thead>
																			<!--end::Table head-->
																			<!--begin::Table body-->
																			<tbody>
																				<?php if(isset($packed_order_list)){ foreach($packed_order_list as $pklist){ ?>
																				<tr>
																					<td class="dash_loan">
																						<label class="text-dark fw-bold d-block fs-6">
																							<?php 
																								
																						 		echo $pklist['sale_id'];
																						 	?>
																						</label>
																					</td>
																					<td class="dash_loan">
																						<label class="text-dark fw-bold d-block fs-6" style="color:red !important;"><?php echo str_pad($pklist['sale_prd_count']?$pklist['sale_prd_count']:0, 2, '0', STR_PAD_LEFT); ?></label>
																					</td>
																				</tr>
																			<?php } }?>
																			</tbody>
																			<!--end::Table body-->
																		</table>
																		<!--end::Table-->
																	</div>
																	<!--end::Body-->
																</div>
																<!--end::Mixed Widget 5-->
															</a>
														</div>
														<!--end::Col-->
														<!--begin::Col-->
														<div class="col-xl-4">
															<!--begin::Mixed Widget 5-->
															<a href="<?php 	echo base_url(); ?>Akssale">
																<div class="card card-xl-stretch mb-2 mb-xl-2"  style="min-height: 280px !important; max-height: 280px !important;">
																	<div class="row">
																		<div class="col-xl-8">
																			<h3 class="card-title align-items-start flex-column ms-5 mt-6">
																				<span class="card-label fw-bold fs-1">Dispatched Orders</span>
																			</h3>
																		</div>
																			<div class="col-xl-4 d-flex align-items-center justify-content-center">
																			<h3 class="card-title align-items-start flex-column mt-6 " id="dispatch_count">
																				<span class="badge badge-success fs-1"><?php echo str_pad($total_dispatch_count?$total_dispatch_count:0, 2, '0', STR_PAD_LEFT); ?></span>
																				<span id="dispatch_sub_count">Today Dispatched</span>
																			</h3>
																			<!-- <h3 class="card-title align-items-start flex-column mt-6 me-5" id="dispatch_pen_count">
																				<span class="badge badge-info fs-1" style="color: white;background-color: red;">< ?php echo str_pad($total_not_dispatch_count?$total_not_dispatch_count:0, 2, '0', STR_PAD_LEFT); ?></span>
																				<span id="dispatch_pen_sub_count">Pending Dispatched</span>
																			</h3> -->
																		</div>
																	</div>
																	<!--begin::Body-->
																	<div class="card-body px-8 py-1">
																		<div class="row">
																			<table class="table align-middle table-row-dashed table-hover fs-7 gy-2 gs-3" id="karuppati_dispatched_orders">
																				<!--begin::Table head-->
																				<thead>
																					<tr class="text-start text-muted fw-bold fs-6 gs-0">
																						<th class="min-w-200px">Type</th>
																						<th class="min-w-100px">Count</th>
																					</tr>
																				</thead>
																				<!--end::Table head-->
																				<!--begin::Table body-->
																				<tbody>
																					<?php if(isset($dispatched_order_list)){ foreach($dispatched_order_list as $dis_list){ ?>
																					<tr>
																						<td class="dash_loan">
																							<label class="text-dark fw-bold d-block fs-6"><?php echo ucfirst($dis_list['delivery_by']) ?></label>
																						</td>
																						<td class="dash_loan">
																							<label class="text-dark fw-bold d-block fs-6" style="color:red !important;">
																								<?php echo str_pad($dis_list['delivery_count']?$dis_list['delivery_count']:0, 2, '0', STR_PAD_LEFT); ?>
																							</label>
																						</td>
																					</tr>
																					<?php } }?>
																				</tbody>
																				<!--end::Table body-->
																			</table>
																		</div>
																	</div>
																	<!--end::Body-->
																</div>
																<!--end::Mixed Widget 5-->
															</a>
														</div>
														<!--end::Col-->
														<!--begin::Col-->
														<div class="col-xl-4">
															<a href="<?php 	echo base_url(); ?>Akssale">
																<!--begin::Mixed Widget 5-->
																<div class="card card-xl-stretch mb-2 mb-xl-2"  style="min-height: 280px !important; max-height: 280px !important;">
																	<div class="row">
																		<div class="col-xl-8">
																			<h3 class="card-title align-items-start flex-column ms-3 mt-6">
																				<span class="card-label fw-bold fs-1">Partially Dispatched</span>
																			</h3>
																		</div>
																		<div class="col-xl-4 d-flex align-items-center justify-content-center">
																			<h3 class="card-title align-items-start flex-column mt-6 " id="dispatch_count">
																				<span class="badge badge-success fs-1"><?php echo str_pad($pa_total_dispatch_count?$pa_total_dispatch_count:0, 2, '0', STR_PAD_LEFT); ?></span>
																				<span id="dispatch_sub_count">Today Partial Dispatched</span>
																			</h3>
																			<!-- <h3 class="card-title align-items-start flex-column mt-6 me-5" id="dispatch_pen_count">
																				<span class="badge badge-info fs-1" style="color: white;background-color: red;">< ?php echo str_pad($pa_total_not_dispatch_count?$pa_total_not_dispatch_count:0, 2, '0', STR_PAD_LEFT); ?></span>
																				<span id="dispatch_pen_sub_count">Partial Dispatched Pending</span>
																			</h3> -->
																		</div>
																	</div>
																	<!--begin::Body-->
																	<div class="card-body px-8 py-1">
																		<div class="row">
																			<table class="table align-middle table-row-dashed table-hover fs-7 gy-2 gs-3" id="karuppati_dispatched_pending_orders">
																				<!--begin::Table head-->
																				<thead>
																					<tr class="text-start text-muted fw-bold fs-6 gs-0">
																						<th class="min-w-200px">Type</th>
																						<th class="min-w-100px">Count</th>
																					</tr>
																				</thead>
																				<!--end::Table head-->
																				<!--begin::Table body-->
																				<tbody>
																					<?php if(isset($pa_dispatched_order_list)){ foreach($pa_dispatched_order_list as $pa_dis_list){ ?>
																					<tr>
																						<td class="dash_loan">
																							<label class="text-dark fw-bold d-block fs-6"><?php echo ucfirst($pa_dis_list['delivery_by']?$pa_dis_list['delivery_by']:'-') ?></label>
																						</td>
																						<td class="dash_loan">
																							<label class="text-dark fw-bold d-block fs-6" style="color:red !important;">
																								<?php echo str_pad($pa_dis_list['delivery_count']?$pa_dis_list['delivery_count']:0, 2, '0', STR_PAD_LEFT); ?>
																							</label>
																						</td>
																					</tr>
																					<?php } }?>
																				</tbody>
																				<!--end::Table body-->
																			</table>
																		</div>
																	</div>
																	<!--end::Body-->
																</div>
																<!--end::Mixed Widget 5-->
															</a>
														</div>
														<!--end::Col-->
													</div>
													<div class="row mt-1">
														<!--begin::Col-->
														<div class="col-xl-4">
															<a href="<?php echo base_url(); ?>Aksstock">
															<!--begin::Mixed Widget 5-->
															<div class="card card-xl-stretch mb-2 mb-xl-2" style="min-height: 280px !important; max-height: 280px !important;">
																<div class="row">
																	<div class="col-xl-8">
																		<h3 class="card-title align-items-start flex-column ms-5 mt-6">
																			<span class="card-label fw-bold fs-1">Low Stock</span>
																		</h3>
																	</div>
																	<div class="col-xl-4 d-flex align-items-center justify-content-center">
																		<h3 class="card-title align-items-start flex-column mt-6" id="sales_count">
																			<span class="badge badge-success fs-1" style="background-color:red !important;">
																				<?php echo str_pad($minimum_stock_count?$minimum_stock_count:0, 2, '0', STR_PAD_LEFT); ?></span>
																			<span id="sales_sub_count">Top 5 Product</span>
																		</h3>
																	</div>
																</div>
																<!--begin::Body-->
																<div class="card-body px-8 py-1">
																	<!--begin::Table-->
																	<table class="table align-middle table-row-dashed table-hover fs-7 gy-1 gs-2" id="karuppati_low_stock">
																		<!--begin::Table head-->
																		<thead>
																			<tr class="text-start text-muted fw-bold fs-6 gs-0">
																				<th class="min-w-200px">Product</th>
																				<th class="min-w-100px">Weights(gms)</th>
																			</tr>
																		</thead>
																		<!--end::Table head-->
																		<!--begin::Table body-->
																		<tbody>
																			<?php foreach($minimum_stock_list as $mlist){ ?>
																				<tr>
																					<td class="dash_loan">
																						<div class="d-flex mb-1">
																							<div class="d-flex align-items-center">
																								<div class="symbol symbol-35px me-2">
																									<?php if($mlist['AKS_PRD_IMG']!=''){ ?>
																									<img src="<?php echo base_url();?>assets/images/aks_product_image/<?php echo $mlist['AKS_PRD_IMG']; ?>" alt="" >
																									<?php }else{ ?>
																										<img src="<?php echo base_url();?>assets/images/karupatti.jpg" alt="" >
																									<?php } ?>
																							</div>
																							<div class="d-flex align-items-center justify-content-start">
																								<a href="javascript:;" class="fs-6 text-gray-800 fw-bold"><?php echo $mlist['AKS_PRD_NAME']; ?></a>
																							</div>
																						</div>
																					</td>
																					<td class="dash_loan">
																						<a href="javascript:;" class="text-dark fw-bold d-block fs-6" style="color:red !important;"><?php echo $mlist['PRD_CUR_QTY']; ?></a>
																					</td>
																				</tr>
																			<?php } ?>
																			
																		</tbody>
																		<!--end::Table body-->
																	</table>
																	<!--end::Table-->
																</div>
																<!--end::Body-->
															</div>
															<!--end::Mixed Widget 5-->
														</a>
														</div>
														<!--end::Col-->
														<!--begin::Col-->
														<div class="col-xl-4">
															<a href="<?php echo base_url(); ?>Aksstock">
															<!--begin::Mixed Widget 5-->
															<div class="card card-xl-stretch mb-2 mb-xl-2" style="min-height: 280px !important; max-height: 280px !important;">
																<div class="row">
																	<div class="col-xl-8">
																		<h3 class="card-title align-items-start flex-column ms-5 mt-6">
																			<span class="card-label fw-bold fs-1">Maximum Stock</span>
																		</h3>
																	</div>
																	<div class="col-xl-4 d-flex align-items-center justify-content-center">
																		<h3 class="card-title align-items-start flex-column mt-6" id="sales_count">
																			<span class="badge badge-success fs-1" style="background-color:red !important;">
																				<?php echo str_pad($maximum_stock_count?$maximum_stock_count:0, 2, '0', STR_PAD_LEFT); ?></span>
																			<span id="sales_sub_count">Top 5 Product</span>
																		</h3>
																	</div>
																</div>
																<!--begin::Body-->
																<div class="card-body px-8 py-1">
																	<!--begin::Table-->
																	<table class="table align-middle table-row-dashed table-hover fs-7 gy-1 gs-2" id="karuppati_max_stock">
																		<!--begin::Table head-->
																		<thead>
																			<tr class="text-start text-muted fw-bold fs-6 gs-0">
																				<th class="min-w-200px">Product</th>
																				<th class="min-w-100px">Weights(gms)</th>
																			</tr>
																		</thead>
																		<!--end::Table head-->
																		<!--begin::Table body-->
																		<tbody>
																		<?php foreach($maximum_stock_list as $mlist){ ?>
																				<tr>
																					<td class="dash_loan">
																						<div class="d-flex mb-1">
																							<div class="d-flex align-items-center">
																								<div class="symbol symbol-35px me-2">
																									<?php if($mlist['AKS_PRD_IMG']!=''){ ?>
																									<img src="<?php echo base_url();?>assets/images/aks_product_image/<?php echo $mlist['AKS_PRD_IMG']; ?>" alt="" >
																									<?php }else{ ?>
																										<img src="<?php echo base_url();?>assets/images/karupatti.jpg" alt="" >
																									<?php } ?>
																								</div>
																							</div>
																							<div class="d-flex align-items-center justify-content-start">
																								<a href="javascript:;" class="fs-6 text-gray-800 fw-bold"><?php echo $mlist['AKS_PRD_NAME']; ?></a>
																							</div>
																						</div>
																					</td>
																					<td class="dash_loan">
																						<a href="javascript:;" class="text-dark fw-bold d-block fs-6" style="color:red !important;"><?php echo $mlist['PRD_CUR_QTY']; ?></a>
																					</td>
																				</tr>
																			<?php } ?>
																		</tbody>
																		<!--end::Table body-->
																	</table>
																	<!--end::Table-->
																</div>
																<!--end::Body-->
															</div>
															<!--end::Mixed Widget 5-->
														</a>
														</div>
														<!--end::Col-->
														<!--begin::Col-->
														<div class="col-xl-4">
															<!--begin::Mixed Widget 5-->
															<div class="card card-xl-stretch mb-2 mb-xl-2"  style="min-height: 280px !important; max-height: 280px !important;">
																<div class="row">
																	<div class="col-xl-8">
																		<h3 class="card-title align-items-start flex-column ms-5 mt-6">
																			<span class="card-label fw-bold fs-1">Payments</span>
																		</h3>
																	</div>
																	<div class="col-xl-4 d-flex align-items-center justify-content-center">
																		<h3 class="card-title align-items-start flex-column mt-6" id="sales_count">
																				<span class="badge badge-success fs-1" style="background-color:red !important;">
																					<?php echo str_pad($payment_mode_count?$payment_mode_count:0, 2, '0', STR_PAD_LEFT); ?> 
																				</span>
																				<span id="sales_sub_count">Today Payments</span>
																		</h3>
																	</div>
																</div>
																<!--begin::Body-->
																<div class="card-body px-8 py-1">
																	<div class="row">
																		<table class="table align-middle table-row-dashed table-hover fs-7 gy-2 gs-3" id="karuppati_payment_mode">
																			<!--begin::Table head-->
																			<thead>
																				<tr class="text-start text-muted fw-bold fs-6 gs-0">
																					<th class="min-w-80px">Type</th>
																					<th class="min-w-100px"><span>Sale Amt</span></th>
																					<th class="min-w-100px"><span>Pur Amt</span></th>
																				</tr>
																			</thead>
																			<!--end::Table head-->
																			<!--begin::Table body-->
																			<tbody>
																					<?php foreach($payment_mode_list as $plist){ ?>
																					<tr>
																						<td class="dash_loan">
																							<label class="text-dark fw-bold d-block fs-6"><?php echo $plist['type_of_payment']; ?></label>
																						</td>
																						<td class="dash_loan">
																							<label class="text-success fw-bold d-block fs-6"><?php echo number_format($plist['samount'],2,'.',','); ?></label>
																						</td>
																						<td class="dash_loan">
																							<label class="text-danger fw-bold d-block fs-6" style="color:red !important;"><?php echo number_format($plist['pamount'],2,'.',','); ?></label>
																						</td>
																					</tr>
																				<?php } ?>
																			</tbody>
																			<!--end::Table body-->
																		</table>
																	</div>
																</div>
																<!--end::Body-->
															</div>
															<!--end::Mixed Widget 5-->
														</div>
														<!--end::Col-->
													</div>
												</div>									
												
											</div>
									  </div>
									  <?php }}else{?><?php $this->load->view("common_role_permission_err"); ?><?php } ?>
										<!--end::Card body-->
									<!-- </div> -->
									<!--end::Tables Widget 9-->
								</div>
								<!--end::Col-->
							</div>
							<!--end::Row-->
						</div>
						<!--end::Container-->
					</div>
					<!--end::Content-->
				<?php include "footer.php"?>
				</div>
				<!--end::Wrapper-->
			</div>
			<!--end::Page-->
		</div>
		<!--end::Root-->
		<?php include "script.php"?>
		
		<script>
			// $("#payments_mode").DataTable({
			// 	// "ordering": false,
			// 	"aaSorting":[],
			// 	 "language": {
			// 	  "lengthMenu": "Show _MENU_",
			// 	 },
			// 	 "dom":
			// 	  "<'row'" +
			// 	  // "<'col-sm-6 d-flex align-items-center justify-conten-start'l>" +
			// 	  // "<'col-sm-6 d-flex align-items-center justify-content-end'f>" +
			// 	  ">" +

			// 	  "<'table-responsive'tr>" +

			// 	  "<'row'" +
			// 	  // "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
			// 	  // "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
			// 	  ">"
			// 	});
			$('#payments_mode').wrap('<div class="dataTables_scroll_payments_mode" />');
		</script>
		<script>
			// $("#karuppati_sales").DataTable({
			// 	// "ordering": false,
			// 	"aaSorting":[],
			// 	 "language": {
			// 	  "lengthMenu": "Show _MENU_",
			// 	 },
			// 	 "dom":
			// 	  "<'row'" +
			// 	  // "<'col-sm-6 d-flex align-items-center justify-conten-start'l>" +
			// 	  // "<'col-sm-6 d-flex align-items-center justify-content-end'f>" +
			// 	  ">" +

			// 	  "<'table-responsive'tr>" +

			// 	  "<'row'" +
			// 	  // "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
			// 	  // "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
			// 	  ">"
			// 	});
			 $('#karuppati_sales').wrap('<div class="dataTables_jewellery_delivered" />');
		</script>
		<script>
			// $("#karuppati_top_customers").DataTable({
			// 	// "ordering": false,
			// 	"aaSorting":[],
			// 	 "language": {
			// 	  "lengthMenu": "Show _MENU_",
			// 	 },
			// 	 "dom":
			// 	  "<'row'" +
			// 	  // "<'col-sm-6 d-flex align-items-center justify-conten-start'l>" +
			// 	  // "<'col-sm-6 d-flex align-items-center justify-content-end'f>" +
			// 	  ">" +

			// 	  "<'table-responsive'tr>" +

			// 	  "<'row'" +
			// 	  // "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
			// 	  // "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
			// 	  ">"
			// 	});
			 $('#karuppati_top_customers').wrap('<div class="dataTables_jewellery_delivered" />');
		</script>
		<script>
			// $("#karuppati_packed_orders").DataTable({
			// 	// "ordering": false,
			// 	"aaSorting":[],
			// 	 "language": {
			// 	  "lengthMenu": "Show _MENU_",
			// 	 },
			// 	 "dom":
			// 	  "<'row'" +
			// 	  // "<'col-sm-6 d-flex align-items-center justify-conten-start'l>" +
			// 	  // "<'col-sm-6 d-flex align-items-center justify-content-end'f>" +
			// 	  ">" +

			// 	  "<'table-responsive'tr>" +

			// 	  "<'row'" +
			// 	  // "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
			// 	  // "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
			// 	  ">"
			// 	});
			 $('#karuppati_packed_orders').wrap('<div class="dataTables_karuppati_packed_orders" />');
		</script>
		<script>
			// $("#karuppati_dispatched_orders").DataTable({
			// 	// "ordering": false,
			// 	"aaSorting":[],
			// 	 "language": {
			// 	  "lengthMenu": "Show _MENU_",
			// 	 },
			// 	 "dom":
			// 	  "<'row'" +
			// 	  // "<'col-sm-6 d-flex align-items-center justify-conten-start'l>" +
			// 	  // "<'col-sm-6 d-flex align-items-center justify-content-end'f>" +
			// 	  ">" +

			// 	  "<'table-responsive'tr>" +

			// 	  "<'row'" +
			// 	  // "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
			// 	  // "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
			// 	  ">"
			// 	});
			 $('#karuppati_dispatched_orders').wrap('<div class="dataTables_karuppati_packed_orders" />');
		</script>
		<script>
			// $("#karuppati_dispatched_pending_orders").DataTable({
			// 	// "ordering": false,
			// 	"aaSorting":[],
			// 	 "language": {
			// 	  "lengthMenu": "Show _MENU_",
			// 	 },
			// 	 "dom":
			// 	  "<'row'" +
			// 	  // "<'col-sm-6 d-flex align-items-center justify-conten-start'l>" +
			// 	  // "<'col-sm-6 d-flex align-items-center justify-content-end'f>" +
			// 	  ">" +

			// 	  "<'table-responsive'tr>" +

			// 	  "<'row'" +
			// 	  // "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
			// 	  // "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
			// 	  ">"
			// 	});
			 $('#karuppati_dispatched_pending_orders').wrap('<div class="dataTables_karuppati_packed_orders" />');
		</script>
		<script>
			// $("#karuppati_low_stock").DataTable({
			// 	// "ordering": false,
			// 	"aaSorting":[],
			// 	 "language": {
			// 	  "lengthMenu": "Show _MENU_",
			// 	 },
			// 	 "dom":
			// 	  "<'row'" +
			// 	  // "<'col-sm-6 d-flex align-items-center justify-conten-start'l>" +
			// 	  // "<'col-sm-6 d-flex align-items-center justify-content-end'f>" +
			// 	  ">" +

			// 	  "<'table-responsive'tr>" +

			// 	  "<'row'" +
			// 	  // "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
			// 	  // "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
			// 	  ">"
			// 	});
			 $('#karuppati_low_stock').wrap('<div class="dataTables_karuppati_packed_orders" />');
		</script>
		<script>
			// $("#karuppati_max_stock").DataTable({
			// 	// "ordering": false,
			// 	"aaSorting":[],
			// 	 "language": {
			// 	  "lengthMenu": "Show _MENU_",
			// 	 },
			// 	 "dom":
			// 	  "<'row'" +
			// 	  // "<'col-sm-6 d-flex align-items-center justify-conten-start'l>" +
			// 	  // "<'col-sm-6 d-flex align-items-center justify-content-end'f>" +
			// 	  ">" +

			// 	  "<'table-responsive'tr>" +

			// 	  "<'row'" +
			// 	  // "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
			// 	  // "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
			// 	  ">"
			// 	});
			 $('#karuppati_max_stock').wrap('<div class="dataTables_karuppati_packed_orders" />');
		</script>
			<script>
			// $("#karuppati_payment_mode").DataTable({
			// 	// "ordering": false,
			// 	"paging": false,
			// 	"sorting": false,
			// 	"info": false,
			// 	"aaSorting":[],
			// 	 "language": {
			// 	  "lengthMenu": "Show _MENU_",
			// 	 },
			// 	 "dom":
			// 	  "<'row'" +
			// 	  // "<'col-sm-6 d-flex align-items-center justify-conten-start'l>" +
			// 	  // "<'col-sm-6 d-flex align-items-center justify-content-end'f>" +
			// 	  ">" +

			// 	  "<'table-responsive'tr>" +

			// 	  "<'row'" +
			// 	  // "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
			// 	  // "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
			// 	  ">"
			// 	});
			 // $('#karuppati_payment_mode').wrap('<div class="dataTables_chit_delivered" />');
			 $('#karuppati_payment_mode').wrap('<div class="dataTables_karuppati_packed_orders" />');
		</script>

		
		
		<script>
	      $("#karuppati_max_stock").kendoTooltip({
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
	      $("#karuppati_low_stock").kendoTooltip({
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
	      $("#karuppati_top_customers").kendoTooltip({
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
	      $("#karuppati_sales").kendoTooltip({
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
	      $("#payments_mode").kendoTooltip({
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