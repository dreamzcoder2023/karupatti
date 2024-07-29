<?php $this->load->view("common.php");?>
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
        min-height: 250px;
        max-height: 250px;/*the maximum height you want to achieve*/
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
        min-height: 250px;
        max-height: 250px;/*the maximum height you want to achieve*/
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
	  margin-top: -4em;
	  margin-left: -7.5em !important;
	  color: white;
	  background: black;
	  padding: 5px 13px 3px 10px;
	  border-radius: 5px;
	  font-size: 14px;
	}
	#silver_count #silver_sub_count {
		  display: none;
			}
	#silver_count:hover #silver_sub_count {
	  display: block;
	  position: absolute;
	  margin-top: -4em;
	  margin-left: -8.5em !important;
	  color: white;
	  background: black;
	  padding: 5px 13px 3px 10px;
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
	  margin-top: -2em;
	  margin-left: -15.5em !important;
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
	  margin-top: -4em;
	  margin-left: -11.5em !important;
	  color: white;
	  background: black;
	  padding: 5px 13px 3px 10px;
	  border-radius: 5px;
	  font-size: 14px;
	}
	#today_sales_month #today_sales_sub_month {
		  display: none;
			}
	#today_sales_month:hover #today_sales_sub_month {
	  display: block;
	  position: absolute;
	  margin-top: -4em;
	  margin-left: -10.5em !important;
	  color: white;
	  background: black;
	  padding: 5px 13px 3px 10px;
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
				<?php $this->load->view("sidebar.php");?>
				<!--begin::Wrapper-->
				<div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
				<?php $this->load->view("header.php");?>	
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
																<a class="nav-link active btn btn-active-light btn-color-black-800 btn-active-color-primary rounded-bottom-0 fw-bold fs-6"  href="javascript:;">Jewellery</a>
															</li>
															<li class="nav-item">
																<a class="nav-link btn btn-active-light btn-color-black-800 btn-active-color-primary rounded-bottom-0 fw-bold fs-6"  href="<?php echo base_url(); ?>Dashboard/karupatti">Karuppati</a>
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
										<div class="card-body py-2">
											<div class="tab-content" id="myTabContent">
												<div class="tab-pane fade show active" id="kt_tab_pane_jewellery" role="tabpanel">
													<div class="row">
														<!--begin::Col-->
														<div class="col-xl-4">
															<!--begin::Mixed Widget 5-->
															<div class="card card-xl-stretch mb-2 mb-xl-2" style="min-height: 320px !important; max-height: 320px !important;">
																<div class="row">
																	<div class="col-xl-8">
																		<h3 class="card-title align-items-start flex-column ms-5 mt-6">
																			<span class="card-label fw-bold fs-1">Order Delivered</span>
																		</h3>
																	</div>
																	<div class="col-xl-4 d-flex align-items-center justify-content-center">
																		<h3 class="card-title align-items-start flex-column mt-6" id="today_sales_count">
																			<span class="badge badge-success fs-1"><?php echo str_pad($deliveryorders_count?$deliveryorders_count:0, 2, '0', STR_PAD_LEFT); ?></span>
																			<span id="today_sales_sub_count">Total&nbsp;Order&nbsp;Delivered&nbsp;Today</span>
																		</h3>
																	</div>
																</div>
																<!--begin::Body-->
																<div class="card-body px-8 py-1">
																	<!--begin::Table-->
																	<table class="table align-middle table-row-dashed table-hover fs-7 gy-1 gs-2" id="jewellery_delivered">
																		<!--begin::Table head-->
																		<thead>
																			<tr class="text-start text-muted fw-bold fs-6 gs-0">
																				<th class="min-w-150px">Party</th>
																				<th class="min-w-100px">Weights(gms)</th>
																			</tr>
																		</thead>
																		<!--end::Table head-->
																		<!--begin::Table body-->
																		<tbody>
																			<?php if(isset($deliveryorders)){ foreach($deliveryorders as $dlist){ ?>
																			<tr>
																				<td class="dash_loan">
																					<div class="d-flex mb-1">
																						<div class="d-flex align-items-center">
																							<div class="symbol symbol-35px me-2">
																								<?php 
																								if($dlist['PHOTO']!="")
																								{
																									if($dlist['TYPE_OF_RECORD']=='N')
																									{?>
																										<img src="<?php echo $dlist['PHOTO']; ?>" height="125px" width="125px" >
																									<?php 
																									}
																									else
																									{
																								?>
																								<img src="data:image/jpeg;base64,<?php echo base64_encode($dlist['PHOTO']); ?>"  >
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
																							<a href="javascript:;" class="fs-6 text-gray-800 fw-bold"><?php echo $dlist['NAME']; ?></a>
																							<label>
																								<span class="text-primary fw-bold me-2"><?php echo $dlist['sales_order_id'] ? $dlist['sales_order_id']:''; ?></span>
																							</label>
																						</div>
																					</div>
																				</td>
																				<td class="dash_loan">
																					<a href="javascript:;" class="text-dark fw-bold d-block fs-6">

																							<?php 
																								if ($dlist['sales_gold_count'] > 0 && $dlist['sales_silver_count'] > 0) {
																									    echo '<span class="me-2" style="background-color:#d4af37;border-radius: 3px;width: 30px;border: 1px solid black;padding: 0px 6px 0px 10px;"></span>'.number_format($dlist['sales_gold_weight'], 3, '.', '');
																									    echo '<br>';
																									    echo '<label class="mt-2"><span class="me-2" style="background-color:#C0C0C0;border-radius: 3px;width: 30px;border: 1px solid black;padding: 0px 6px 0px 10px;"></span>'.number_format($dlist['sales_silver_weight'], 3, '.', '').'</label>';
																								} 
																								elseif ($dlist['sales_silver_count'] > 0) {
																									    echo '<label class="mt-2"><span class="me-2" style="background-color:#C0C0C0;border-radius: 3px;width: 30px;border: 1px solid black;padding: 0px 6px 0px 10px;"></span>'.number_format($dlist['sales_silver_weight'], 3, '.', '').'</label>';
																									}

																									else {
																									   echo '<span class="me-2" style="background-color:#d4af37;border-radius: 3px;width: 30px;border: 1px solid black;padding: 0px 6px 0px 10px;"></span>'.number_format($dlist['sales_gold_weight'], 3, '.', '');
																									}

																						  ?>

																					</a>
																				</td>
																			</tr>
																		<?php }  } ?>
																			
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
																			<span class="card-label fw-bold fs-1">Order Pending</span>
																			<!-- <span class="card-label fw-bold fs-1">03</span> -->
																		</h3>
																	</div>
																	<div class="col-xl-4 d-flex align-items-center justify-content-center">
																		<h3 class="card-title align-items-start flex-column mt-6" id="today_sales_count">
																			<span class="badge badge-info fs-1" style="background-color:red !important;"><?php echo str_pad($pendingorders_count?$pendingorders_count:0, 2, '0', STR_PAD_LEFT); ?></span>
																			<span id="today_sales_sub_count">Total&nbsp;Order&nbsp;Pending&nbsp;Today</span>
																		</h3>
																	</div>
																</div>
																<!--begin::Body-->
																<div class="card-body px-8 py-1">
																	<div class="row">
																		<table class="table align-middle table-row-dashed table-hover fs-7 gy-1 gs-3" id="jewellery_pending">
																			<!--begin::Table head-->
																			<thead>
																				<tr class="text-start text-muted fw-bold fs-6 gs-0">
																					<th class="min-w-150px">Party</th>
																					<th class="min-w-125px">Weights(gms)</th>
																				</tr>
																			</thead>
																			<!--end::Table head-->
																			<!--begin::Table body-->
																			<tbody>
																				<?php if(isset($pendingorders)){ foreach($pendingorders as $pdlist){ ?>
																			<tr>
																				<td class="dash_loan">
																					<div class="d-flex mb-1">
																						<div class="d-flex align-items-center">
																							<div class="symbol symbol-35px me-2">
																								<?php 
																								if($pdlist['PHOTO']!="")
																								{
																									if($pdlist['TYPE_OF_RECORD']=='N')
																									{?>
																										<img src="<?php echo $pdlist['PHOTO']; ?>" height="125px" width="125px" >
																									<?php 
																									}
																									else
																									{
																								?>
																								<img src="data:image/jpeg;base64,<?php echo base64_encode($pdlist['PHOTO']); ?>"  >
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
																							<a href="javascript:;" class="fs-6 text-gray-800 fw-bold"><?php echo $pdlist['NAME']; ?></a>
																							<label>
																								<span class="text-primary fw-bold me-2"><?php echo $pdlist['sales_order_id'] ? $pdlist['sales_order_id']:''; ?></span>
																							</label>
																						</div>
																					</div>
																				</td>
																				<td class="dash_loan">
																					<a href="javascript:;" class="text-dark fw-bold d-block fs-6">

																							<?php 
																								if ($pdlist['sales_gold_count'] > 0 && $pdlist['sales_silver_count'] > 0) {
																									    echo number_format($pdlist['sales_gold_weight'], 3, '.', '');
																									    echo '<br>';
																									    echo number_format($pdlist['sales_silver_weight'], 3, '.', '');
																								} 
																								elseif ($pdlist['sales_silver_count'] > 0) {
																									    echo number_format($pdlist['sales_silver_weight'], 3, '.', '');
																									}

																									else {
																									   echo number_format($pdlist['sales_gold_weight'], 3, '.', '');
																									}

																						  ?>

																					</a>
																				</td>
																			</tr>
																		<?php }  } ?>
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
																	<div class="col-xl-6">
																		<h3 class="card-title align-items-start flex-column ms-5 mt-6">
																			<span class="card-label fw-bold fs-1">Sales</span>
																		</h3>
																	</div>
																	<div class="col-xl-6 d-flex align-items-center justify-content-center">
																		<h3 class="card-title align-items-start flex-column mt-6 me-3" id="gold_count">
																			<span class="badge badge-info fs-1" style="color: black;background-color: #d4af37;"><?php echo str_pad($goldcount?$goldcount:0, 2, '0', STR_PAD_LEFT); ?></span>
																			<span id="gold_sub_count">Today Gold Count</span>
																		</h3>
																		<h3 class="card-title align-items-start flex-column mt-6" id="silver_count">
																			<span class="badge badge-info fs-1" style="color: black;background-color: #C0C0C0;"><?php echo str_pad($silvercount?$silvercount:0, 2, '0', STR_PAD_LEFT); ?></span>
																			<span id="silver_sub_count">Today&nbsp;Silver&nbsp;Count</span>
																		</h3>
																	</div>
																</div>
																<!--begin::Body-->
																<div class="card-body px-8 py-1">
																	<div class="row">
																		<table class="table align-middle table-row-dashed table-hover fs-7 gy-1 gs-3" id="jewellery_sales">
																			<thead>
																				<tr class="text-start text-muted fw-bold fs-6 gs-0">
																					<th class="min-w-100px">Type</th>
																					<!-- <th class="min-w-100px">Count</th> -->
																					<th class="min-w-100px">Weights(gms)</th>
																				</tr>
																			</thead>
																			<tbody>
																				<tr>
																					<td>
																						<span class="me-2" style="background-color:#d4af37;border-radius: 3px;width: 30px;border: 1px solid black;padding: 0px 6px 0px 10px;"></span>
																						<span class="fs-6 text-gray-800 fw-bold">Gold</span>
																					</td>
																					<td>
																						<span class="fs-6 text-gray-800 fw-bold"><?php echo number_format($salesgoldweight ?$salesgoldweight:0, 3, '.', ''); ?></span>
																					</td>
																				</tr>
																				<tr>
																					<td>
																						<span class="me-2" style="background-color:#C0C0C0;border-radius: 3px;width: 30px;border: 1px solid black;padding: 0px 6px 0px 10px;"></span>
																						<span class="fs-6 text-gray-800 fw-bold">Silver</span>
																					</td>
																					<td>
																						<span class="fs-6 text-gray-800 fw-bold">
																							<?php 
																								echo number_format($salesilverweight ?$salesilverweight:0, 3, '.', '');
																							?>
																						</span>
																					</td>
																				</tr>
																			</tbody>
																		</table>
																	</div>
																	<div class="row" style="display:none ;">
																		<div class="col-xl-12">
																			<h3 class="card-title align-items-start flex-column mt-2 px-0">
																				<span class="card-label fw-bold fs-1">Next Auditing</span>
																			</h3>
																		</div>
																	</div>
																	<div class="row" style="display:none ;">
																		<div class="col-xl-4">
																			<h3 class="card-title align-items-start flex-column mt-3 px-0">
																				<span class="card-label fw-bold fs-4 text-primary">27/06/2023</span>
																			</h3>
																		</div>
																		<div class="col-xl-8">
																			<h3 class="card-title align-items-start flex-column mt-2 px-0">
																				<label class="badge badge-info fs-4" style="background-color:red !important;">
																					<span class="me-3">7</span>
																					<span>Days Remaining</span>
																				</label>
																			</h3>
																		</div>
																	</div>
																	<div class="row" style="display:none ;">
																		<div class="col-xl-12">
																			<h3 class="card-title align-items-start flex-column mt-2 px-0">
																				<span class="card-label fw-bold fs-4">Previous Auditing</span>
																			</h3>
																		</div>
																	</div>
																	<div class="row" style="display:none ;">
																		<div class="col-xl-12">
																			<h3 class="card-title align-items-start flex-column mt-2 px-0">
																				<span class="card-label fw-bold fs-4 text-success me-2">27/05/2023</span>
																				<span class="card-label fw-bold fs-4 text-dark me-2">-</span>
																				<span class="card-label fw-bold fs-4 text-success">Esakki</span>
																			</h3>
																		</div>
																	</div>
																</div>
																<!--end::Body-->
															</div>
															<!--end::Mixed Widget 5-->
														</div>
													</div>
													<div class="row" style="display: none;">
														<!--begin::Col-->
														<div class="col-xl-4">
															<!--begin::Mixed Widget 5-->
															<div class="card card-xl-stretch mb-2 mb-xl-2" style="min-height: 200px !important; max-height: 200px !important;">
																<div class="row">
																	<div class="col-xl-8">
																		<h3 class="card-title align-items-start flex-column ms-5 mt-6">
																			<span class="card-label fw-bold fs-1">New TMS Collection</span>
																		</h3>
																	</div>
																	<div class="col-xl-4 d-flex align-items-center justify-content-center">
																		<h3 class="card-title align-items-start flex-column mt-6">
																			<span class="badge badge-success fs-1" style="background-color:red !important;">14</span>
																		</h3>
																	</div>
																</div>
																<!--begin::Body-->
																<div class="card-body px-8 py-1">
																	<!--begin::Table-->
																	<table class="table align-middle table-row-dashed table-hover fs-7 gy-1 gs-2" id="jewellery_tms_collection">
																		<!--begin::Table head-->
																		<thead>
																			<tr class="text-start text-muted fw-bold fs-6 gs-0">
																				<th class="min-w-80px">Type</th>
																				<th class="min-w-80px">Count</th>
																				<th class="min-w-100px">Amount</th>
																			</tr>
																		</thead>
																		<!--end::Table head-->
																		<!--begin::Table body-->
																		<tbody>
																			<tr>
																				<td class="dash_loan">
																					<a href="javascript:;" class="text-dark fw-bold d-block fs-6">Daily</a>
																				</td>
																				<td class="dash_loan">
																					<a href="javascript:;" class="text-primary fw-bold d-block fs-6">2</a>
																				</td>
																				<td class="dash_loan">
																					<a href="javascript:;" class="text-dark fw-bold d-block fs-6">5000.00</a>
																				</td>
																			</tr>
																			<tr>
																				<td class="dash_loan">
																					<a href="javascript:;" class="text-dark fw-bold d-block fs-6">Weekly</a>
																				</td>
																				<td class="dash_loan">
																					<a href="javascript:;" class="text-primary fw-bold d-block fs-6">4</a>
																				</td>
																				<td class="dash_loan">
																					<a href="javascript:;" class="text-dark fw-bold d-block fs-6">6000.00</a>
																				</td>
																			</tr>
																			<tr>
																				<td class="dash_loan">
																					<a href="javascript:;" class="text-dark fw-bold d-block fs-6">Monthly</a>
																				</td>
																				<td class="dash_loan">
																					<a href="javascript:;" class="text-primary fw-bold d-block fs-6">8</a>
																				</td>
																				<td class="dash_loan">
																					<a href="javascript:;" class="text-dark fw-bold d-block fs-6">10,000.00</a>
																				</td>
																			</tr>
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
															<div class="card card-xl-stretch mb-2 mb-xl-2" style="min-height: 200px !important; max-height: 200px !important;">
																<div class="row">
																	<div class="col-xl-8">
																		<h3 class="card-title align-items-start flex-column ms-5 mt-6">
																			<span class="card-label fw-bold fs-1">TMS Collection</span>
																		</h3>
																	</div>
																	<div class="col-xl-4 d-flex align-items-center justify-content-center">
																		<h3 class="card-title align-items-start flex-column mt-6">
																			<span class="badge badge-success fs-1" style="background-color:red !important;">25</span>
																		</h3>
																	</div>
																</div>
																<!--begin::Body-->
																<div class="card-body px-8 py-1">
																	<!--begin::Table-->
																	<table class="table align-middle table-row-dashed table-hover fs-7 gy-1 gs-2" id="jewellery_tms_new_collection">
																		<!--begin::Table head-->
																		<thead>
																			<tr class="text-start text-muted fw-bold fs-6 gs-0">
																				<th class="min-w-80px">Type</th>
																				<th class="min-w-80px">Count</th>
																				<th class="min-w-100px">Amount</th>
																			</tr>
																		</thead>
																		<!--end::Table head-->
																		<!--begin::Table body-->
																		<tbody>
																			<tr>
																				<td class="dash_loan">
																					<a href="javascript:;" class="text-dark fw-bold d-block fs-6">Daily</a>
																				</td>
																				<td class="dash_loan">
																					<a href="javascript:;" class="text-primary fw-bold d-block fs-6">4</a>
																				</td>
																				<td class="dash_loan">
																					<a href="javascript:;" class="text-dark fw-bold d-block fs-6">3000.00</a>
																				</td>
																			</tr>
																			<tr>
																				<td class="dash_loan">
																					<a href="javascript:;" class="text-dark fw-bold d-block fs-6">Weekly</a>
																				</td>
																				<td class="dash_loan">
																					<a href="javascript:;" class="text-primary fw-bold d-block fs-6">6</a>
																				</td>
																				<td class="dash_loan">
																					<a href="javascript:;" class="text-dark fw-bold d-block fs-6">8000.00</a>
																				</td>
																			</tr>
																			<tr>
																				<td class="dash_loan">
																					<a href="javascript:;" class="text-dark fw-bold d-block fs-6">Monthly</a>
																				</td>
																				<td class="dash_loan">
																					<a href="javascript:;" class="text-primary fw-bold d-block fs-6">15</a>
																				</td>
																				<td class="dash_loan">
																					<a href="javascript:;" class="text-dark fw-bold d-block fs-6">20,000.00</a>
																				</td>
																			</tr>
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
															<div class="card card-xl-stretch mb-2 mb-xl-2" style="min-height: 200px !important; max-height: 200px !important;">
																<div class="row">
																	<div class="col-xl-8">
																		<h3 class="card-title align-items-start flex-column ms-5 mt-6" id="ogp_label">
																			<span class="card-label fw-bold fs-1">OGP Transaction</span>
																			<span id="ogp_sub_label">Old Gold Purchase Transaction</span>
																		</h3>
																	</div>
																	<div class="col-xl-4 d-flex align-items-center justify-content-center">
																		<h3 class="card-title align-items-start flex-column mt-6">
																			<span class="badge badge-success fs-1" style="background-color:red !important;">25</span>
																		</h3>
																	</div>
																</div>
																<!--begin::Body-->
																<div class="card-body px-8 py-1">
																	<!--begin::Table-->
																	<table class="table align-middle table-row-dashed table-hover fs-7 gy-1 gs-2" id="jewellery_ogp">
																		<!--begin::Table head-->
																		<thead>
																			<tr class="text-start text-muted fw-bold fs-6 gs-0">
																				<th class="min-w-50px" style="min-width:65px !important;">Type</th>
																				<th class="min-w-50px">Count</th>
																				<th class="min-w-80px">Wgt(gms)</th>
																				<th class="min-w-80px">Net Wgt(gms)</th>
																			</tr>
																		</thead>
																		<!--end::Table head-->
																		<!--begin::Table body-->
																		<tbody>
																			<tr>
																				<td class="dash_loan">
																					<a href="javascript:;" class="text-dark fw-bold d-block fs-6">OGP</a>
																				</td>
																				<td class="dash_loan">
																					<a href="javascript:;" class="text-primary fw-bold d-block fs-6">10</a>
																				</td>
																				<td class="dash_loan">
																					<a href="javascript:;" class="text-dark fw-bold d-block fs-6">15.600</a>
																				</td>
																				<td class="dash_loan">
																					<a href="javascript:;" class="text-dark fw-bold d-block fs-6">15.400</a>
																				</td>
																			</tr>
																			<tr>
																				<td class="dash_loan">
																					<a href="javascript:;" class="text-dark fw-bold d-block fs-6">Exchange</a>
																				</td>
																				<td class="dash_loan">
																					<a href="javascript:;" class="text-dark fw-bold d-block fs-6">15</a>
																				</td>
																				<td class="dash_loan">
																					<a href="javascript:;" class="text-dark fw-bold d-block fs-6">24.600</a>
																				</td>
																				<td class="dash_loan">
																					<a href="javascript:;" class="text-dark fw-bold d-block fs-6">24.500</a>
																				</td>
																			</tr>
																			<tr>
																				<td class="dash_loan">
																					<a href="javascript:;" class="text-dark fw-bold d-block fs-6">AGB</a>
																				</td>
																				<td class="dash_loan">
																					<a href="javascript:;" class="text-dark fw-bold d-block fs-6">18</a>
																				</td>
																				<td class="dash_loan">
																					<a href="javascript:;" class="text-dark fw-bold d-block fs-6">23.200</a>
																				</td>
																				<td class="dash_loan">
																					<a href="javascript:;" class="text-dark fw-bold d-block fs-6">23.000</a>
																				</td>
																			</tr>
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
													</div>
													<div class="row">
														<!--begin::Col-->
														<div class="col-xl-6">
															<!--begin::Mixed Widget 5-->
															<div class="card card-xl-stretch mb-2 mb-xl-2" style="min-height: 320px !important; max-height: 320px !important;">
																<div class="row">
																	<div class="col-xl-8">
																		<h3 class="card-title align-items-start flex-column ms-5 mt-6">
																			<span class="card-label fw-bold fs-1">Credit Reminders</span>
																		</h3>
																	</div>
																	<div class="col-xl-4 d-flex align-items-center justify-content-center">
																		<h3 class="card-title align-items-start flex-column mt-6">
																			<span class="badge badge-success fs-1" style="background-color:red !important;"><?php echo str_pad($credit_remainders_count?$credit_remainders_count:0, 2, '0', STR_PAD_LEFT); ?></span>
																		</h3>
																	</div>
																</div>
																<!--begin::Body-->
																<div class="card-body px-8 py-1">
																	<!--begin::Table-->
																	<table class="table align-middle table-row-dashed table-hover fs-7 gy-1 gs-2" id="jewellery_credit_reminder">
																		<!--begin::Table head-->
																		<thead>
																			<tr class="text-start text-muted fw-bold fs-6 gs-0">
																				<th class="min-w-125px">Party</th>
																				<th class="min-w-150px">Cr Date(days)</th>
																				<th class="min-w-100px">Cr Amount</th>
																			</tr>
																		</thead>
																		<!--end::Table head-->
																		<!--begin::Table body-->
																		<tbody>
																				<?php if(isset($credit_remainders)){ 
																					foreach($credit_remainders as $crlist){ ?>
																					<tr>
																						<td class="dash_loan">
																							<div class="d-flex mb-1">
																								<div class="d-flex align-items-center">
																									<div class="symbol symbol-35px me-2">
																										<?php 
																											if($crlist['PHOTO']!="")
																											{
																												if($crlist['TYPE_OF_RECORD']=='N')
																												{?>
																													<img src="<?php echo $crlist['PHOTO']; ?>" height="125px" width="125px" >
																												<?php 
																												}
																												else
																												{
																											?>
																											<img src="data:image/jpeg;base64,<?php echo base64_encode($crlist['PHOTO']); ?>"  >
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
																									<a href="javascript:;" class="fs-6 text-gray-800 fw-bold"><?php echo $crlist['NAME']; ?></a>
																									<label class="text-primary fw-bold"><?php echo $crlist['sales_order_id'] ? $crlist['sales_order_id']:''; ?></label>
																								</div>
																							</div>
																						</td>
																						<td>
																							<label class="text-dark fw-bold fs-6">
																								<?php
																							     	$date_format  = $this->db->query("SELECT * FROM general_settings ")->row();
																								 	 	$format= $date_format?$date_format->date_format:'Y-m-d';
																								 		echo date("$format", strtotime($crlist['credit_balance_date']));
																								?>
																							</label>
																							<span class="text-dark fw-bold fs-6 me-1">-</span>
																							<label class="badge text-primary fw-bold fs-6" style="background-color: red;">
																								<span class="text-white me-1">
																									<?php 

																											$date1= date('Y-m-d', strtotime($crlist['credit_balance_date']));
																								      $date2= date('Y-m-d');
																								      $diff = strtotime($date1) - strtotime($date2);
																								      if($diff>0){
																								      	$remain_days=abs(round($diff / 86400));
																								      }else{
																								      	$remain_days=(round($diff / 86400));
																								      }
																								      echo $remain_days;
																									?>
																								</span>
																								<span class="text-white me-1">Days</span>
																							</label>
																						</td>
																						<td class="dash_loan">
																							<label class="text-dark fw-bold fs-6"><?php echo number_format($crlist['balance_amount']?$crlist['balance_amount']:0,2,'.',','); ?></label>
																						</td>
																					</tr>
																				<?php } } ?>
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
														<div class="col-xl-6">
															<!--begin::Mixed Widget 5-->
															<div class="card card-xl-stretch mb-2 mb-xl-2"  style="min-height: 320px !important; max-height: 320px !important;">
																<div class="row">
																	<div class="col-xl-8">
																		<h3 class="card-title align-items-start flex-column ms-5 mt-6">
																			<span class="card-label fw-bold fs-1">JST Jewellery</span>
																			<!-- <span class="card-label fw-bold fs-1">03</span> -->
																		</h3>
																	</div>
																	<div class="col-xl-4 d-flex align-items-center justify-content-center"id="today_sales_month">
																		<h3 class="card-title align-items-start flex-column mt-6">
																			<span class="badge badge-success fs-1" style="background-color:red !important;"><?php echo str_pad($jst_today_count?$jst_today_count:0, 2, '0', STR_PAD_LEFT); ?></span>
																			<span id="today_sales_sub_month"><?php $todaypay=date('d-m-Y').'&nbsp;Today&nbsp;JST Jewellery'; echo ucfirst($todaypay); ?>
																		</h3>
																	</div>
																</div>
																<!--begin::Body-->
																<div class="card-body px-8 py-1">
																	<div class="row">
																		<table class="table align-middle table-row-dashed table-hover fs-7 gy-1 gs-3" id="jewellery_jst">
																			<!--begin::Table head-->
																			<thead>
																				<tr class="text-start text-muted fw-bold fs-6 gs-0">
																					<th class="min-w-125px">From</th>
																					<th class="min-w-100px">Send via</th>
																					<th class="min-w-80px">Count</th>
																					<th class="min-w-100px">Weights(gms)</th>
																					<th class="min-w-100px">Cash</th>
																				</tr>
																			</thead>
																			<!--end::Table head-->
																			<!--begin::Table body-->
																			<tbody>
																				<?php if(isset($jst_jewell)){ 
																					foreach($jst_jewell as $jstlist){ ?>
																				<tr>
																					<td class="dash_loan">
																					<span class="fs-6 text-gray-800 fw-bold"><?php echo $jstlist['COMPANYNAME']; ?></span>
																					<div class="d-flex flex-column flex-grow-1 my-lg-0 my-2">
																						<label class="text-gray-400 fw-semibold fs-6">ID:
																							<span class="text-primary fw-bold"><?php echo $jstlist['from_company']; ?></span>
																						</label>
																					</div>
																				</td>
																					<td class="dash_loan">
																						<a href="javascript:;" class="text-dark fw-bold d-block fs-6"><?php echo ucfirst($jstlist['STAFFNAME']);?></a>
																					</td>
																					<td class="dash_loan">
																						<label class="text-primary fw-bold fs-6"><?php echo $jstlist['tagged_item_gold_count']+$jstlist['tagged_item_silver_count']+$jstlist['old_metal_count']; ?></label>
																					</td>
																					<td class="dash_loan">
																						<a href="javascript:;" class="text-dark fw-bold d-block fs-6">
																							<?php $jstweight =  $jstlist['tagged_item_gold_weight'] ?  $jstlist['tagged_item_gold_weight']:0 +$jstlist['tagged_item_silver_weight'] ? $jstlist['tagged_item_silver_weight']:0 +$jstlist['old_metal_weight'] ?$jstlist['old_metal_weight']:0;
																							  echo number_format($jstweight,3);
																						 ?>
																						</a>
																					</td>
																					<td class="dash_loan">
																						<a href="javascript:;" class="text-dark fw-bold d-block fs-6">
																							<i class="fa-solid fa-indian-rupee-sign fs-7 text-dark"></i>&nbsp;
																							<?php echo number_format($jstlist['cash']?$jstlist['cash']:0,2,'.',','); ?> </a>
																					</td>
																				</tr>
																				<?php }} ?>
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
													<div class="row">
														<!--begin::Col-->
														<div class="col-xl-6">
															<!--begin::Mixed Widget 5-->
															<div class="card card-xl-stretch mb-2 mb-xl-2" style="min-height: 320px !important; max-height: 320px !important;">
																<div class="row">
																	<div class="col-xl-8">
																		<h3 class="card-title align-items-start flex-column ms-5 mt-6">
																			<span class="card-label fw-bold fs-1">Lot Entry Pending</span>
																		</h3>
																	</div>
																	<div class="col-xl-4 d-flex align-items-center justify-content-center">
																		<h3 class="card-title align-items-start flex-column mt-6">
																			<span class="badge badge-success fs-1" style="background-color:red !important;"><?php echo str_pad($lotentrycount?$lotentrycount:0, 2, '0', STR_PAD_LEFT); ?></span>
																		</h3>
																	</div>
																</div>
																<!--begin::Body-->
																<div class="card-body px-8 py-1">
																	<!--begin::Table-->
																	<table class="table align-middle table-row-dashed table-hover fs-7 gy-1 gs-2" id="jewellery_lot_pending">
																		<!--begin::Table head-->
																		<thead>
																			<tr class="text-start text-muted fw-bold fs-6 gs-0">
																				<th class="min-w-125px">Company</th>
																				<th  style="min-width:100px !important;">Lot No</th>
																				<th  style="min-width:145px !important;"><span class="ms-15">Count</span><br>(Pending&nbsp;/&nbsp;Overall)</th>
																				<th style="min-width:145px !important;"><span class="ms-15">Wgt(gms)</span><br>(Pending&nbsp;/&nbsp;Overall)</th>
																			</tr>
																		</thead>
																		<!--end::Table head-->
																		<!--begin::Table body-->
																		<tbody>
																			<?php if(isset($lotentry_details)){ 
																					foreach($lotentry_details as $lplist){ ?>
																			<tr>
																				<td class="dash_loan">
																					<span class="fs-6 text-gray-800 fw-bold"><?php echo $lplist['COMPANYNAME']; ?></span>
																					<div class="d-flex flex-column flex-grow-1 my-lg-0 my-2">
																						<label class="text-gray-400 fw-semibold fs-6">ID:
																							<span class="text-primary fw-bold"><?php echo $lplist['company_id']; ?></span>
																						</label>
																					</div>
																				</td>
																				<td class="dash_loan">
																					<label class="text-dark fw-bold fs-6"><?php echo $lplist['lot_no']; ?></label>
																				</td>
																				<td>
																					<div class="d-flex align-items-center flex-column flex-grow-1 my-lg-0 my-2">
																						<label class="fs-6">
																							<span class="text-primary fw-bold"><?php  echo $lplist['non_tagged']; ?></span>
																							<span class="text-dark fw-bold me-1">/</span>
																							<span class="text-gray-400 fw-bold me-1"><?php  echo $lplist['count']; ?></span>
																						</label>
																					</div>
																				</td>
																				<td>
																					<div class="d-flex flex-column flex-grow-1 my-lg-0 my-2">
																						<label class="fs-6">
																							<span class="text-primary fw-bold"><?php echo number_format($lplist['non_tagged_weight'] ?$lplist['non_tagged_weight']:0,2,'.',','); ?></span>
																							<span class="text-dark fw-bold me-1">/</span>
																							<span class="text-gray-400 fw-bold me-1"><?php echo number_format($lplist['weight'] ?$lplist['weight']:0,2,'.',','); ?></span>
																						</label>
																					</div>
																				</td>
																			</tr>
																			<?php }} ?>
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
														<div class="col-xl-6">
															<!--begin::Statistics Widget 5-->
															<a href="javascript:;" class="card hoverable card-xl-stretch mb-xl-2" style="min-height: 320px !important; max-height: 320px !important;">
																<div class="row">
																	<div class="col-xl-8">
																		<h3 class="card-title align-items-start flex-column ms-5 mt-6">
																			<span class="card-label fw-bold fs-2">Top Orders&nbsp;Based&nbsp; On Party</span>
																		</h3>
																	</div>
																	<div class="col-xl-4 d-flex align-items-center justify-content-center">
																		<h3 class="card-title align-items-start flex-column mt-6" id="today_sales_month">
																			<span class="badge badge-success fs-1"><?php echo str_pad($topcustomersales?$topcustomersales:0, 2, '0', STR_PAD_LEFT); ?></span>
																			<span id="today_sales_sub_month"><?php $month=date('F').'&nbsp;Month&nbsp;Orders'; echo ucfirst(strtolower($month)); ?></span>
																		</h3>
																	</div>
																</div>
																<!--begin::Body-->
																<div class="card-body px-8 py-2">
																	<!--begin::Table-->
																	<table class="table align-middle table-row-dashed table-hover fs-7 gy-1 gs-2" id="jewellery_highest_amt_party">
																		<!--begin::Table head-->
																		<thead>
																			<tr class="text-start text-muted fw-bold fs-6 gs-0">
																				<th class="min-w-125px">Party</th>
																				<th class="min-w-125px">Company</th>
																				<th class="min-w-80px">Mobile No</th>
																				<th class="min-w-80px">Amount</th>
																			</tr>
																		</thead>
																		<!--end::Table head-->
																		<!--begin::Table body-->
																		<tbody>
																			
																			<?php if(isset($top_customers_list_sale_order)){ 
																					foreach($top_customers_list_sale_order as $tplist){ ?>
																			<tr>
																				<td class="dash_loan">
																					<div class="d-flex flex-column flex-grow-1">
																						<a href="javascript:;" class="fs-6 text-gray-800 fw-bold"><?php echo $tplist['party_name']; ?></a>
																						<label>
																							<span class="text-primary fw-bold me-2 fs-6"><?php echo $tplist['orderid']; ?></span>
																						</label>
																					</div>
																				</td>
																				<td class="dash_loan">
																					<span class="fs-6 text-gray-800 fw-bold"><?php echo $tplist['company_name']; ?></span>
																					<div class="d-flex flex-column flex-grow-1 my-lg-0 my-2">
																						<label class="text-gray-400 fw-semibold fs-6">ID:
																							<span class="text-primary fw-bold"><?php echo $tplist['company_id']; ?></span>
																						</label>
																					</div>
																				</td>
																				<td>
																					<a href="javascript:;" class="text-dark fw-bold d-block fs-6"><?php echo $tplist['party_phone']?$tplist['party_phone']:'NILL'; ?></a>
																				</td>
																				<td>
																					<a href="javascript:;" class="text-dark fw-bold d-block fs-6"><?php echo number_format($tplist['netamounttotal']?$tplist['netamounttotal']:0,2,'.',','); ?></a>
																				</td>
																			</tr>
																			<?php }} ?>
																		</tbody>
																		<!--end::Table body-->
																	</table>
																	<!--end::Table-->
																</div>
																<!--end::Body-->
															</a>
															<!--end::Statistics Widget 5-->
														</div>
													</div>
													<div class="row mt-1">
														<div class="col-xl-6">
															<!--begin::Statistics Widget 5-->
															<a href="javascript:;" class="card hoverable card-xl-stretch mb-xl-2" style="min-height: 350px !important; max-height: 350px !important;">
																<div class="row">
																	<div class="col-xl-12">
																		<h3 class="card-title align-items-start flex-column ms-5 mt-6">
																			<span class="card-label fw-bold fs-2"></span>
																		</h3>
																	</div>
																</div>
																<div class="row">
																	<div class="col-xl-8">
																		<h3 class="card-title align-items-start flex-column ms-5 mt-6">
																			<span class="card-label fw-bold fs-2">Sales Transaction of Payments Mode</span>
																		</h3>
																	</div>
																	<div class="col-xl-4 d-flex align-items-center justify-content-center">
																		<h3 class="card-title align-items-start flex-column mt-6" id="today_sales_month">
																			<span class="badge badge-success fs-1"><?php echo str_pad($trans_payment_mode_count?$trans_payment_mode_count:0, 2, '0', STR_PAD_LEFT); ?></span>
																			<span id="today_sales_sub_month"><?php $todaypay=date('d-m-Y').'&nbsp;Today&nbsp;Transactions'; echo ucfirst($todaypay); ?></span>
																		</h3>
																	</div>
																</div>
																<!--begin::Body-->
																<div class="card-body px-8 py-1">
																	<!--begin::Table-->
																	<table class="table align-middle table-row-dashed table-hover fs-7 gy-1 gs-2" id="jewellery_payments_mode">
																		<!--begin::Table head-->
																		<thead>
																			<tr class="text-start text-muted fw-bold fs-6 gs-0">
																				<th class="min-w-100px">Company</th>
																				<th class="min-w-100px">Mode</th>
																				<th class="min-w-125px">Amount</th>
																			</tr>
																		</thead>
																		<!--end::Table head-->
																		<!--begin::Table body-->
																		<tbody>
																		<?php if(isset($trans_payment_mode)){ 
																			foreach($trans_payment_mode as $tpm_list){ ?>
																			<tr>
																				<td class="dash_loan">
																					<span class="fs-6 text-gray-800 fw-bold"><?php echo $tpm_list['company_name']; ?></span>
																					<div class="d-flex flex-column flex-grow-1 my-lg-0 my-2">
																						<label class="text-gray-400 fw-semibold fs-6">ID:
																							<span class="text-primary fw-bold"><?php echo $tpm_list['company_id']; ?></span>
																						</label>
																					</div>
																				</td>
																			</tr>
																			<tr>
																				<td></td>
																				<td class="dash_loan">
																					<span class="fs-6 text-gray-800 fw-bold">Cash</span>
																				</td>
																				<td>
																					<a href="javascript:;" class="text-dark fw-bold d-block fs-6"><?php echo number_format($tpm_list['cash_amount']?$tpm_list['cash_amount']:0,2,'.',','); ?></a>
																				</td>
																			</tr>
																			<tr>
																				<td></td>
																				<td class="dash_loan">
																					<span class="fs-6 text-gray-800 fw-bold">UPI</span>
																				</td>
																				<td>
																					<a href="javascript:;" class="text-dark fw-bold d-block fs-6"><?php echo number_format($tpm_list['upi_amount']?$tpm_list['upi_amount']:0,2,'.',','); ?></a>
																				</td>
																			</tr>
																			<tr>
																				<td></td>
																				<td class="dash_loan">
																					<span class="fs-6 text-gray-800 fw-bold">RTGS</span>
																				</td>
																				<td>
																					<a href="javascript:;" class="text-dark fw-bold d-block fs-6"><?php echo number_format($tpm_list['rtgs_amount']?$tpm_list['rtgs_amount']:0,2,'.',','); ?></a>
																				</td>
																			</tr>
																			<tr>
																				<td></td>
																				<td class="dash_loan">
																					<span class="fs-6 text-gray-800 fw-bold">Cheque</span>
																				</td>
																				<td>
																					<a href="javascript:;" class="text-dark fw-bold d-block fs-6"><?php echo number_format($tpm_list['cheque_amount']?$tpm_list['cheque_amount']:0,2,'.',','); ?></a>
																				</td>
																			</tr>
																		<?php }} ?>
																		</tbody>
																		<!--end::Table body-->
																	</table>
																	<!--end::Table-->
																</div>
																<!--end::Body-->
															</a>
															<!--end::Statistics Widget 5-->
														</div>
														<div class="col-xl-6">
															<!--begin::Statistics Widget 5-->
															<div class="card card-xl-stretch mb-xl-2" style="min-height: 350px !important; max-height: 350px !important;">
																<div class="row">
																	<div class="col-xl-8">
																		<h3 class="card-title align-items-start flex-column ms-5 mt-6">
																			<span class="card-label fw-bold fs-2">Membership Card Issue</span>
																		</h3>
																	</div>
																	<div class="col-xl-4 d-flex align-items-center justify-content-center">
																		<h3 class="card-title align-items-start flex-column mt-6" id="today_sales_month">
																			<span class="badge badge-success fs-1"><?php echo str_pad($membership_card_issue_count?$membership_card_issue_count:0, 2, '0', STR_PAD_LEFT); ?></span>
																			<span id="today_sales_sub_month"><?php $month=date('F').'&nbsp;Month&nbsp;Card Issued'; echo ucfirst($month); ?></span>
																		</h3>
																	</div>
																</div>
																<!--begin::Body-->
																<div class="card-body px-8 py-2">
																	<div class="row">
																		<div class="col-xl-4">
																			<span class="fw-bold me-1" style="background-color:#FFAA00;border-radius: 8px;padding: 5px 15px 5px 15px;pointer-events: none !important;">Gold</span>
																			<span class="fw-bold me-1 fs-3"> - </span>
																			<span class="fw-bold me-1 fs-3"><?php echo str_pad($mgoldcount?$mgoldcount:0, 2, '0', STR_PAD_LEFT); ?></span>
																		</div>
																		<div class="col-xl-4">
																			<span class="fw-bold me-3" style="background-color:#C0C0C0;border-radius: 8px;padding: 5px 15px 5px 15px;pointer-events: none !important;">Silver</span>
																			<span class="fw-bold me-1 fs-3"> - </span>
																			<span class="fw-bold me-1 fs-3"><?php echo str_pad($msilvercount?$msilvercount:0, 2, '0', STR_PAD_LEFT); ?></span>
																		</div>
																		<div class="col-xl-4">
																			<span class="fw-bold me-3" style="background-color:#E5E4E2;border-radius: 8px;padding: 5px 15px 5px 15px;pointer-events: none !important;">Platinum</span>
																			<span class="fw-bold me-1 fs-3"> - </span>
																			<span class="fw-bold me-1 fs-3"><?php echo str_pad($mplatinumcount?$mplatinumcount:0, 2, '0', STR_PAD_LEFT); ?></span>
																		</div>
																	</div>
																	<!--begin::Table-->
																	<table class="table align-middle table-row-dashed fs-7 gy-1 gs-2 mt-2" id="jewellery_membership_card_issue">
																		<!--begin::Table head-->
																		<thead>
																			<tr class="text-start text-muted fw-bold fs-6 gs-0">
																				<th class="min-w-100px">Party</th>
																				<th class="min-w-150px">Company</th>
																				<th class="min-w-100px">Type</th>
																			</tr>
																		</thead>
																		<!--end::Table head-->
																		<!--begin::Table body-->
																		<tbody>
																			<?php if(isset($membership_card_issue)){ 
																					foreach($membership_card_issue as $milist){ ?>
																			<tr>
																				<td class="dash_loan">
																					<div class="d-flex mb-1">
																						<div class="d-flex align-items-center">
																							<div class="symbol symbol-35px me-2">
																								<?php 
																											if($milist['PHOTO']!="")
																											{
																												if($milist['TYPE_OF_RECORD']=='N')
																												{?>
																													<img src="<?php echo $milist['PHOTO']; ?>" height="125px" width="125px" >
																												<?php 
																												}
																												else
																												{
																											?>
																											<img src="data:image/jpeg;base64,<?php echo base64_encode($milist['PHOTO']); ?>"  >
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
																							<a href="javascript:;" class="fs-6 text-gray-800 fw-bold"><?php echo $milist['NAME']; ?></a>
																							<label>
																								<span class="text-primary fw-bold me-2"><?php echo $milist['PID']; ?></span>
																							</label>
																						</div>
																					</div>
																				</td>
																				<td class="dash_loan">
																					<span class="fs-6 text-gray-800 fw-bold"><?php echo $milist['COMPANYNAME']; ?></span>
																					<div class="d-flex flex-column flex-grow-1 my-lg-0 my-2">
																						<label class="text-gray-400 fw-semibold fs-6">ID:
																							<span class="text-primary fw-bold"><?php echo $milist['COMPANYCODE']; ?></span>
																						</label>
																					</div>
																				</td>
																				<td>
																					<?php
																							if ($milist['CARD_TYPE']=='Gold') {

																									echo '<label class="fw-bold" style="background-color:#FFAA00;border-radius: 8px;padding: 5px 15px 5px 15px;">Gold</label>';
																								}
																								if ($milist['CARD_TYPE']=='Platinum') {
																									echo '<span class="fw-bold" style="background-color:#E5E4E2;border-radius: 8px;padding: 5px 15px 5px 15px;">Platinum</span>';
																								}
																								if ($milist['CARD_TYPE']=='Silver') {
																									echo '<label class="fw-bold" style="background-color:#C0C0C0;border-radius: 8px;padding: 5px 15px 5px 15px;">Silver</label>';
																								}	
																					?>

																					
																				</td>
																			</tr>
																			<?php }} ?>
																				
																		</tbody>
																		<!--end::Table body-->
																	</table>
																	<!--end::Table-->
																</div>
																<!--end::Body-->
															</div>
															<!--end::Statistics Widget 5-->
														</div>
													</div>
													<div class="row mt-1" style="display:none ;">
														<div class="col-xl-12">
															<!--begin::Statistics Widget 5-->
															<a href="javascript:;" class="card hoverable card-xl-stretch mb-xl-2" style="min-height: 350px !important; max-height: 350px !important;">
																<div class="row">
																	<div class="col-xl-12">
																		<h3 class="card-title align-items-start flex-column ms-5 mt-6">
																			<span class="card-label fw-bold fs-2">Cash In Hand & Payouts, Receipts</span>
																		</h3>
																	</div>
																</div>
																<!--begin::Body-->
																<div class="card-body px-8 py-1">
																	<!--begin::Table-->
																	<table class="table align-middle table-row-dashed table-hover fs-7 gy-1 gs-2" id="jewellery_cash_in_hand_cmy">
																		<!--begin::Table head-->
																		<thead>
																			<tr class="text-start text-muted fw-bold fs-6 gs-0">
																				<th class="min-w-200px">Company</th>
																				<th class="min-w-100px">Payouts</th>
																				<th class="min-w-100px">Receipts</th>
																				<th class="min-w-100px">Cash In Hand</th>
																			</tr>
																		</thead>
																		<!--end::Table head-->
																		<!--begin::Table body-->
																		<tbody>
																			<tr>
																				<td class="dash_loan">
																					<span class="fs-6 text-gray-800 fw-bold">AGB - Main Branch Ayyanar Gold Bankers SKD</span>
																					<div class="d-flex flex-column flex-grow-1 my-lg-0 my-2">
																						<label class="text-gray-400 fw-semibold fs-6">ID:
																							<span class="text-primary fw-bold">001</span>
																						</label>
																					</div>
																				</td>
																				<td>
																					<a href="javascript:;" class="text-dark fw-bold d-block fs-6">12,268.83</a>
																				</td>
																				<td>
																					<a href="javascript:;" class="text-dark fw-bold d-block fs-6">17,508.00</a>
																				</td>
																				<td>
																					<a href="javascript:;" class="text-dark fw-bold d-block fs-6">17,568.23</a>
																				</td>
																			</tr>
																			<tr>
																				<td class="dash_loan">
																					<span class="fs-6 text-gray-800 fw-bold">AGK-5-KADALADI AYYANAR GOLD BANK</span>
																					<div class="d-flex flex-column flex-grow-1 my-lg-0 my-2">
																						<label class="text-gray-400 fw-semibold fs-6">ID:
																							<span class="text-primary fw-bold">010</span>
																						</label>
																					</div>
																				</td>
																				<td>
																					<a href="javascript:;" class="text-dark fw-bold d-block fs-6">18,008.45</a>
																				</td>
																				<td>
																					<a href="javascript:;" class="text-dark fw-bold d-block fs-6">20,522.12</a>
																				</td>
																				<td>
																					<a href="javascript:;" class="text-dark fw-bold d-block fs-6">20,522.12</a>
																				</td>
																			</tr>
																			<tr>
																				<td class="dash_loan">
																					<span class="fs-6 text-gray-800 fw-bold">AGN - NARIPPAYUR (NR) 3- BRANCH</span>
																					<div class="d-flex flex-column flex-grow-1 my-lg-0 my-2">
																						<label class="text-gray-400 fw-semibold fs-6">ID:
																							<span class="text-primary fw-bold">002</span>
																						</label>
																					</div>
																				</td>
																				<td>
																					<a href="javascript:;" class="text-dark fw-bold d-block fs-6">65,236.18</a>
																				</td>
																				<td>
																					<a href="javascript:;" class="text-dark fw-bold d-block fs-6">53,523.00</a>
																				</td>
																				<td>
																					<a href="javascript:;" class="text-dark fw-bold d-block fs-6">14,666.10</a>
																				</td>
																			</tr>
																			<tr>
																				<td class="dash_loan">
																					<span class="fs-6 text-gray-800 fw-bold">AKP - KANNIRAJAPURAM (KP) 4 BRANCH</span>
																					<div class="d-flex flex-column flex-grow-1 my-lg-0 my-2">
																						<label class="text-gray-400 fw-semibold fs-6">ID:
																							<span class="text-primary fw-bold">009</span>
																						</label>
																					</div>
																				</td>
																				<td>
																					<a href="javascript:;" class="text-dark fw-bold d-block fs-6">23,452.00</a>
																				</td>
																				<td>
																					<a href="javascript:;" class="text-dark fw-bold d-block fs-6">63,452.00</a>
																				</td>
																				<td>
																					<a href="javascript:;" class="text-dark fw-bold d-block fs-6">32,882.00</a>
																				</td>
																			</tr>
																		</tbody>
																		<!--end::Table body-->
																	</table>
																	<!--end::Table-->
																</div>
																<!--end::Body-->
															</a>
															<!--end::Statistics Widget 5-->
														</div>
													</div>
													<div class="row mt-4">
														<?php $i=0; foreach($weekly_gold_rate as $grate){ ?>
															<input type="hidden" class="input_count_grate" name="weekly_grate[]" id="weekly_grate<?php echo $i; ?>" value="<?php echo $grate; ?>" >
														<?php $i++; } ?>
														<?php $i=0; foreach($weekly_silver_rate as $srate){ ?>
															<input type="hidden" class="input_count_srate" name="weekly_srate[]" id="weekly_srate<?php echo $i; ?>" value="<?php echo $srate; ?>" >
														<?php $i++; } ?>

														<div class="col-xl-6">
															<div id="jewellery_gold_silver_fluctuation"></div>
														</div>
														<?php $i=0; foreach($weekly_sale as $wlist){ ?>
															<input type="hidden" class="input_count_sale" name="weekly_sale[]" id="weekly_sale<?php echo $i; ?>" value="<?php echo $wlist; ?>" >
														<?php $i++; } ?>
														<div class="col-xl-6">
															<div id="jewellery_chart_weekly_sales"></div>
														</div>
													</div>
												</div>
											</div>
									  </div>
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
				<?php $this->load->view("footer.php");?>
				</div>
				<!--end::Wrapper-->
			</div>
			<!--end::Page-->
		</div>
		<!--end::Root-->
		<?php $this->load->view("script.php");?>
		<script src="<?php echo base_url(); ?>assets/custom_js/highchart.js"></script>
		<!-- Jewellery Gold & Silver Fluctuation Start -->
		<script type="text/javascript">

			var count=$('.input_count_grate').length;
			weekly_grate_report =[];
			 for(i=0;i<count;i++){
				var weekly_grate=$('#weekly_grate'+i).val();
				weekly_grate_report[i]=weekly_grate;
			 }
			var countsilver=$('.input_count_srate').length;
			weekly_srate_report =[];
			 for(i=0;i<countsilver;i++){
				var weekly_srate=$('#weekly_srate'+i).val();
				weekly_srate_report[i]=weekly_srate;
			 }

			var options = {
		          series: [{
			        name: 'Gold',
			        color:'#d4af37',
			        data: weekly_grate_report
			    },{

			    	name: 'Silver',
			    	color:'#C0C0C0',
			      data: weekly_srate_report
			    }
			    ],


			
			    yaxis: {
						  labels: {
						    formatter: function (value) {
						    	 var a = value.toLocaleString('en-IN', {
										    maximumFractionDigits: 2,
										    style: 'currency',
										    currency: 'INR'
										});
						    	return a;
						      // return value + "$";
						    }
						  },
						},
		          chart: {
		          type: 'area',
		          zoom: {
		            enabled: false
		          },
		        },
		        title: {
			        text: 'Weekly Board Rate Fluctuation (<?php
															$monday = strtotime("last sunday");
															$monday = date('w', $monday)==date('w') ? $monday+7*86400 : $monday;
															$sunday = strtotime(date("d-m-Y",$monday)." +6 days");
															$this_week_start = date("d-m-Y",$monday);
															$this_week_end = date("d-m-Y",$sunday);
															echo "$this_week_start to $this_week_end ";
														 ?>)',
			        align: 'center',
			         fontWeight: 'bold',
			        style: {
			            fontSize: '18px',
			            
			          }
			    },
			    legend: {
		          position: 'bottom',
		          horizontalAlign: 'right',
		          fontSize: "16px"
		        },
		        dataLabels: {
		          enabled: false
		        },
		        stroke: {
		          curve: 'smooth'
		        },
		        xaxis: {
		          tooltip: {
				          enabled: false
				        },
				        labels: {
				          show: true,
				         },
		          // categories: ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday']
		          categories: ['Sun','Mon', 'Tue', 'Wed', 'Thur', 'Fri', 'Sat']
		        }
		        };

		        var chart = new ApexCharts(document.querySelector("#jewellery_gold_silver_fluctuation"), options);
		        chart.render();
		</script>
		<!-- Jewellery Gold & Silver Fluctuation End -->
		<!-- Jewellery Weekly Sales Start -->
		<script type="text/javascript">


			var count=$('.input_count_sale').length;
				weekly_sale_report =[];
			 for(i=0;i<count;i++){
				var weekly_sale=$('#weekly_sale'+i).val();
				weekly_sale_report[i]=weekly_sale;
			 }
			
			var options = {
		          series: [{
			        name: 'Sales',
			         color: '#008ffb',
			        data: weekly_sale_report
			    }],
			    yaxis: {
						  labels: {
						    formatter: function (value) {
						    	 var a = value.toLocaleString('en-IN', {
										    maximumFractionDigits: 2,
										    style: 'currency',
										    currency: 'INR'
										});
						    	return a;
						      // return value + "$";
						    }
						  },
						},
		          chart: {
		          type: 'area',
		          zoom: {
		            enabled: false
		          },
		        },
		        title: {
			        text: 'Weekly Sales Summary (<?php
															$monday = strtotime("last sunday");
															$monday = date('w', $monday)==date('w') ? $monday+7*86400 : $monday;
															$sunday = strtotime(date("d-m-Y",$monday)." +6 days");
															$this_week_start = date("d-m-Y",$monday);
															$this_week_end = date("d-m-Y",$sunday);
															echo "$this_week_start to $this_week_end ";
														 ?>)',
			        align: 'center',
			         fontWeight: 'bold',
			        style: {
			            fontSize: '18px',
			            
			          }
			    },
			    legend: {
		          position: 'bottom',
		          horizontalAlign: 'right',
		          fontSize: "16px"
		        },
		        dataLabels: {
		          enabled: false
		        },
		        stroke: {
		          curve: 'smooth'
		        },
		        xaxis: {
		          tooltip: {
				          enabled: false
				        },
				        labels: {
				          show: true,
				         },
		          categories: ['Sun','Mon', 'Tue', 'Wed', 'Thur', 'Fri', 'Sat']
		        }
		        };
				Highcharts.setOptions({
				    lang: {
				      thousandsSep: ','
				    }
				  });

		        var chart = new ApexCharts(document.querySelector("#jewellery_chart_weekly_sales"), options);
		        chart.render();

			// Highcharts.chart('chart_weekly_redeem_summary', {

			// 	chart: {
			//         backgroundColor: {
			//             linearGradient: [0, 0, 500, 500],
			//             stops: [
			//                 [0, 'rgb(255,238,216,1)'],
			//                 [1, 'rgb(255,237,215,1)'],
			//                 [2, 'rgb(255,191,105,1)']
			//             ]
			//         },
			//         type: 'area',
			//         style: {
			// 	        fontSize: "18px",
			// 	        }
			//     },
			//     stroke: {
		 //          curve: 'smooth'
		 //        },
			//     title: {
			//         text: 'Weekly Redeem Summary',
			//         align: 'center'
			//     },
			//     tooltip: {
			//     	style: {
			//             // color: 'blue',
			//             fontSize:'16px'
			//         },
			//     },
			//     credits: {
			// 		    enabled: false
			// 		},
			//     xAxis: {
			//         categories: ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'],
			//         labels: {
			//             style: {
			//                 fontSize:'12px'
			//             }
			//         }
			//     },

			//     legend: {
			//         layout: 'horizontal',
			//         align: 'right',
			//         verticalAlign: 'bottom'
			//     },

			//     plotOptions: {
			//         series: {
			//             label: {
			//                 connectorAllowed: false
			//             }
			//         }
			//     },

			//     series: [{
			//         name: 'AGB',
			//         data: [21908, 5548, 36254, 8989, 18274, 21563,
			//             74526]
			//     }, {
			//         name: 'AGN',
			//         data: [24916, 19771, 29742, 29851, 20185, 30282,
			//             38121]
			//     }, {
			//         name: 'AGK',
			//         data: [11744, 37941, 16005, 19771, 20185, 32490,
			//             32147]
			//     }, {
			//         name: 'AKP',
			//         data: [21908, 5548, 8105, 11248, 8989, 11816, 18274]
			//     }],

			//     responsive: {
			//         rules: [{
			//             condition: {
			//                 maxWidth: 500
			//             },
			//             chartOptions: {
			//                 legend: {
			//                     layout: 'horizontal',
			//                     align: 'center',
			//                     verticalAlign: 'bottom'
			//                 }
			//             }
			//         }]
			//     }

			// });
		</script>
		<!-- Jewellery Weekly Sales End -->
		<script>
			$('#cash_in_hand_cmy').wrap('<div class="dataTables_scroll_cash_in_hand" />');
		</script>
		<script>
			$('#highest_amt_party').wrap('<div class="dataTables_scroll_highest" />');
		</script>
		<script>
			$('#membership_card_issue').wrap('<div class="dataTables_scroll_highest" />');
		</script>
		<script>
			$('#jewellery_delivered').wrap('<div class="dataTables_jewellery_delivered" />');
		</script>
		<script>
			$('#jewellery_pending').wrap('<div class="dataTables_jewellery_delivered" />');
		</script>
		<script>
			$("#jewellery_tms_collection").DataTable({
				// "ordering": false,
				"aaSorting":[],
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
				  // "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
				  // "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
				  ">"
				});
			// $('#jewellery_tms_collection').wrap('<div class="dataTables_jewellery_delivered" />');
		</script>
		<script>
			$("#jewellery_tms_new_collection").DataTable({
				// "ordering": false,
				"aaSorting":[],
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
				  // "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
				  // "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
				  ">"
				});
			// $('#jewellery_tms_new_collection').wrap('<div class="dataTables_jewellery_delivered" />');
		</script>
		<script>
			$("#jewellery_ogp").DataTable({
				// "ordering": false,
				"aaSorting":[],
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
				  // "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
				  // "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
				  ">"
				});
			// $('#jewellery_ogp').wrap('<div class="dataTables_jewellery_delivered" />');
		</script>
		<script>
			 $('#jewellery_credit_reminder').wrap('<div class="dataTables_jewellery_delivered" />');
		</script>
		<script>
			 $('#jewellery_jst').wrap('<div class="dataTables_jewellery_delivered" />');
		</script>
		<script>
			 $('#jewellery_lot_pending').wrap('<div class="dataTables_jewellery_delivered" />');
		</script>
		<script>
			 $('#jewellery_highest_amt_party').wrap('<div class="dataTables_jewellery_delivered" />');
		</script>
		<script>
			 $('#jewellery_payments_mode').wrap('<div class="dataTables_jewellery_payments_mode" />');
		</script>
		<script>
			 $('#jewellery_membership_card_issue').wrap('<div class="dataTables_jewellery_membership_card_issue" />');
		</script>
		<script>
			 $('#jewellery_cash_in_hand_cmy').wrap('<div class="dataTables_jewellery_membership_card_issue" />');
		</script>
		<script>
	      $("#jewellery_cash_in_hand_cmy").kendoTooltip({
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
	      $("#jewellery_membership_card_issue").kendoTooltip({
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
	      $("#jewellery_payments_mode").kendoTooltip({
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
	      $("#jewellery_highest_amt_party").kendoTooltip({
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
	      $("#jewellery_lot_pending").kendoTooltip({
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
	      $("#jewellery_jst").kendoTooltip({
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
	      $("#jewellery_credit_reminder").kendoTooltip({
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
	      $("#jewellery_sales").kendoTooltip({
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
	      $("#jewellery_delivered").kendoTooltip({
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
	      $("#jewellery_pending").kendoTooltip({
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
	      $("#membership_card_issue").kendoTooltip({
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
	      $("#cash_in_hand_cmy").kendoTooltip({
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
	      $("#highest_amt_party").kendoTooltip({
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