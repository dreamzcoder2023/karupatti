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

	#sales_count #sales_sub_count {
		  display: none;
			}
	#sales_count:hover #sales_sub_count {
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
	  margin-left: -18.5em !important;
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
	  margin-left: -18.5em !important;
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
																<a class="nav-link btn btn-active-light btn-color-black-800 btn-active-color-primary rounded-bottom-0 fw-bold fs-6"  href="<?php echo base_url(); ?>Dashboard/karupatti">Karuppati</a>
															</li>
															<li class="nav-item" style="display: none;">
																<a class="nav-link btn btn-active-light btn-color-black-800 btn-active-color-primary rounded-bottom-0 fw-bold fs-6"  href="<?php echo base_url(); ?>Dashboard/chit">Chit</a>
															</li>
															<li class="nav-item">
																<a class="nav-link active btn btn-active-light btn-color-black-800 btn-active-color-primary rounded-bottom-0 fw-bold fs-6"  href="<?php echo base_url(); ?>Dashboard/real_estate">Real Estate</a>
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
										<?php if(isset($_SESSION['RealestateView'])){ if($_SESSION['RealestateView']==1){?>
										<div class="card-body py-2">
											<div class="tab-content" id="myTabContent">
												<div class="tab-pane fade show active" id="kt_tab_pane_real_estate" role="tabpanel">
													<div class="row">
														<!--begin::Col-->
														<div class="col-xl-6">
															<!--begin::Mixed Widget 5-->
															<div class="card card-xl-stretch mb-2 mb-xl-2" style="min-height: 320px !important; max-height: 320px !important;">
																<div class="row">
																	<div class="col-xl-8">
																		<h3 class="card-title align-items-start flex-column ms-5 mt-6">
																			<span class="card-label fw-bold fs-1">Property List</span>
																		</h3>
																	</div>
																	<div class="col-xl-4 d-flex align-items-center justify-content-center">
																		<h3 class="card-title align-items-start flex-column mt-6" id="sales_count">
																			<span class="badge badge-success fs-1"><?php echo str_pad($property_list_count?$property_list_count:0, 2, '0', STR_PAD_LEFT); ?></span>
																			<span id="sales_sub_count">Current Month Total Property</span>
																		</h3>
																	</div>
																</div>
																<!--begin::Body-->
																<div class="card-body px-8 py-1">
																	<!--begin::Table-->
																	<table class="table align-middle table-row-dashed table-hover fs-7 gy-1 gs-3" id="real_estate_property_list">
																		<!--begin::Table head-->
																		<thead>
																			<tr class="text-start text-muted fw-bold fs-6 gs-0">
																				<th class="min-w-100px">Date</th>
																				<th class="min-w-125px">Land Name /<br>Purchase ID</th>
																				<th class="min-w-125px">Party Info</th>
																				<th class="min-w-100px">Plot Area<br>(No / Type)</th>
																			</tr>
																		</thead>
																		<!--end::Table head-->
																		<!--begin::Table body-->
																		<tbody>
																		<?php foreach($property_list as $plist){ ?>
																			<tr>
																				<td class="dash_loan">
																					<label class="text-black fw-bold fs-6"><?php echo $plist['date']; ?></label>
																				</td>
																				<td class="dash_loan">
																					<span class="fs-6 text-gray-800 fw-bold"><?php echo $plist['property_type']; ?></span>
																					<span class="fs-6 text-gray-800 fw-bold">&nbsp;/</span>
																					<div class="d-flex flex-column flex-grow-1 my-lg-0 my-2">
																						<span class="text-primary fw-bold fs-6"><?php echo $plist['property_id']; ?></span>
																					</div>
																				</td>
																				<td class="dash_loan">
																					<div class="d-flex mb-1">
																						<div class="d-flex align-items-center">
																							<div class="symbol symbol-35px me-2">
																							<?php 
																								if($plist['PHOTO']!="")
																								{
																									if($plist['TYPE_OF_RECORD']=='N')
																									{?>
																										<img src="<?php echo $plist['PHOTO']; ?>" height="125px" width="125px" >
																									<?php 
																									}
																									else
																									{
																							?>
																								<img src="data:image/jpeg;base64,<?php echo base64_encode($plist['PHOTO']); ?>"  >
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
																							<a href="#" class="fs-6 text-gray-800 fw-bold"><?php echo $plist['party_name']; ?></a>
																							<label class="text-primary fw-bold"><?php echo $plist['party_id']; ?></label>
																						</div>
																					</div>
																				</td>
																				<td class="dash_loan">
																					<label class="fw-bold">
																						<i class="fas fa-map-marker-alt fs-6"></i>&nbsp;
																					</label>
																					<label class="text-primary fw-bold fs-6"><?php echo $plist['ploat_no']; ?></label>
																					<label class="text-black fw-bold fs-6"> / </label>
																					<label class="text-black fw-bold fs-6"><?php echo $plist['ploat_type']; ?></label>
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
														<div class="col-xl-6">
															<!--begin::Mixed Widget 5-->
															<div class="card card-xl-stretch mb-2 mb-xl-2"  style="min-height: 320px !important; max-height: 320px !important;">
																<div class="row">
																	<div class="col-xl-8">
																		<h3 class="card-title align-items-start flex-column ms-5 mt-6">
																			<span class="card-label fw-bold fs-1">Purchase Property</span>
																			<!-- <span class="card-label fw-bold fs-1">03</span> -->
																		</h3>
																	</div>
																	<div class="col-xl-4 d-flex align-items-center justify-content-center">
																		<h3 class="card-title align-items-start flex-column mt-6" id="purchase_prop">
																			<span class="badge badge-success fs-1"><?php echo str_pad($purchase_list_count?$purchase_list_count:0, 2, '0', STR_PAD_LEFT);  ?></span>
																			<span id="purchase_prop_sub">Current Month Purchase Property</span>
																		</h3>
																	</div>
																</div>
																<!--begin::Body-->
																<div class="card-body px-8 py-1">
																	<div class="row">
																		<table class="table align-middle table-row-dashed table-hover fs-7 gy-1 gs-3" id="real_estate_purchase_property_list">
																			<!--begin::Table head-->
																			<thead>
																				<tr class="text-start text-muted fw-bold fs-6 gs-0">
																					<th class="min-w-100px">Date</th>
																					<th class="min-w-125px">Land Name /<br>Purchase ID</th>
																					<th class="min-w-125px">Party Info</th>
																					<th class="min-w-100px">Plot Area<br>(No / Type)</th>
																				</tr>
																			</thead>
																			<!--end::Table head-->
																			<!--begin::Table body-->
																			<tbody>
																			<?php foreach($purchase_list as $plist){ ?>
																			<tr>
																				<td class="dash_loan">
																					<label class="text-black fw-bold fs-6"><?php echo $plist['date']; ?></label>
																				</td>
																				<td class="dash_loan">
																					<span class="fs-6 text-gray-800 fw-bold"><?php echo $plist['property_type']; ?></span>
																					<span class="fs-6 text-gray-800 fw-bold">&nbsp;/</span>
																					<div class="d-flex flex-column flex-grow-1 my-lg-0 my-2">
																						<span class="text-primary fw-bold fs-6"><?php echo $plist['property_id']; ?></span>
																					</div>
																				</td>
																				<td class="dash_loan">
																					<div class="d-flex mb-1">
																						<div class="d-flex align-items-center">
																							<div class="symbol symbol-35px me-2">
																							<?php 
																								if($plist['PHOTO']!="")
																								{
																									if($plist['TYPE_OF_RECORD']=='N')
																									{?>
																										<img src="<?php echo $plist['PHOTO']; ?>" height="125px" width="125px" >
																									<?php 
																									}
																									else
																									{
																							?>
																								<img src="data:image/jpeg;base64,<?php echo base64_encode($plist['PHOTO']); ?>"  >
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
																							<a href="#" class="fs-6 text-gray-800 fw-bold"><?php echo $plist['party_name']; ?></a>
																							<label class="text-primary fw-bold"><?php echo $plist['party_id']; ?></label>
																						</div>
																					</div>
																				</td>
																				<td class="dash_loan">
																					<label class="fw-bold">
																						<i class="fas fa-map-marker-alt fs-6"></i>&nbsp;
																					</label>
																					<label class="text-primary fw-bold fs-6"><?php echo $plist['ploat_no']; ?></label>
																					<label class="text-black fw-bold fs-6"> / </label>
																					<label class="text-black fw-bold fs-6"><?php echo $plist['ploat_type']; ?></label>
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
													<div class="row">
														<!--begin::Col-->
														<div class="col-xl-6">
															<!--begin::Mixed Widget 5-->
															<div class="card card-xl-stretch mb-2 mb-xl-2" style="min-height: 320px !important; max-height: 320px !important;">
																<div class="row">
																	<div class="col-xl-8">
																		<h3 class="card-title align-items-start flex-column ms-5 mt-6">
																			<span class="card-label fw-bold fs-1">Booked Property</span>
																		</h3>
																	</div>
																	<div class="col-xl-4 d-flex align-items-center justify-content-center">
																		<h3 class="card-title align-items-start flex-column mt-6" id="purchase_prop">
																			<span class="badge badge-success fs-1"><?php echo  str_pad($booked_list_count?$booked_list_count:0, 2, '0', STR_PAD_LEFT);  ?></span>
																			<span id="purchase_prop_sub">Current Month Booked Property</span>
																		</h3>
																	</div>
																</div>
																<!--begin::Body-->
																<div class="card-body px-8 py-1">
																	<!--begin::Table-->
																	<table class="table align-middle table-row-dashed table-hover fs-7 gy-1 gs-3" id="real_estate_booked_property">
																		<!--begin::Table head-->
																		<thead>
																			<tr class="text-start text-muted fw-bold fs-6 gs-0">
																				<th class="min-w-100px">Date</th>
																				<th class="min-w-125px">Land Name /<br>Sale ID</th>
																				<th class="min-w-125px">Party Info</th>
																				<th class="min-w-100px">Plot Area<br>(No / Type)</th>
																			</tr>
																		</thead>
																		<!--end::Table head-->
																		<!--begin::Table body-->
																		<tbody>
																		<?php foreach($booked_list as $plist){ ?>
																			<tr>
																				<td class="dash_loan">
																					<label class="text-black fw-bold fs-6"><?php echo $plist['date']; ?></label>
																				</td>
																				<td class="dash_loan">
																					<span class="fs-6 text-gray-800 fw-bold"><?php echo $plist['property_type']; ?></span>
																					<span class="fs-6 text-gray-800 fw-bold">&nbsp;/</span>
																					<div class="d-flex flex-column flex-grow-1 my-lg-0 my-2">
																						<span class="text-primary fw-bold fs-6"><?php echo $plist['sale_id']; ?></span>
																					</div>
																				</td>
																				<td class="dash_loan">
																					<div class="d-flex mb-1">
																						<div class="d-flex align-items-center">
																							<div class="symbol symbol-35px me-2">
																							<?php 
																								if($plist['PHOTO']!="")
																								{
																									if($plist['TYPE_OF_RECORD']=='N')
																									{?>
																										<img src="<?php echo $plist['PHOTO']; ?>" height="125px" width="125px" >
																									<?php 
																									}
																									else
																									{
																							?>
																								<img src="data:image/jpeg;base64,<?php echo base64_encode($plist['PHOTO']); ?>"  >
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
																							<a href="#" class="fs-6 text-gray-800 fw-bold"><?php echo $plist['party_name']; ?></a>
																							<label class="text-primary fw-bold"><?php echo $plist['party_id']; ?></label>
																						</div>
																					</div>
																				</td>
																				<td class="dash_loan">
																					<label class="fw-bold">
																						<i class="fas fa-map-marker-alt fs-6"></i>&nbsp;
																					</label>
																					<label class="text-primary fw-bold fs-6"><?php echo $plist['ploat_no']; ?></label>
																					<label class="text-black fw-bold fs-6"> / </label>
																					<label class="text-black fw-bold fs-6"><?php echo $plist['ploat_type']; ?></label>
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
														<div class="col-xl-6">
															<!--begin::Mixed Widget 5-->
															<div class="card card-xl-stretch mb-2 mb-xl-2"  style="min-height: 320px !important; max-height: 320px !important;">
																<div class="row">
																	<div class="col-xl-8">
																		<h3 class="card-title align-items-start flex-column ms-5 mt-6">
																			<span class="card-label fw-bold fs-1">Registered Property</span>
																			<!-- <span class="card-label fw-bold fs-1">03</span> -->
																		</h3>
																	</div>
																	<div class="col-xl-4 d-flex align-items-center justify-content-center">
																		<h3 class="card-title align-items-start flex-column mt-6" id="purchase_prop">
																			<span class="badge badge-success fs-1"><?php echo str_pad($registered_list_count?$registered_list_count:0, 2, '0', STR_PAD_LEFT); ?></span>
																			<span id="purchase_prop_sub">Current Month Registered Property</span>
																		</h3>
																	</div>
																</div>
																<!--begin::Body-->
																<div class="card-body px-8 py-1">
																	<div class="row">
																		<table class="table align-middle table-row-dashed table-hover fs-7 gy-1 gs-3" id="real_estate_registered_property">
																			<!--begin::Table head-->
																			<thead>
																				<tr class="text-start text-muted fw-bold fs-6 gs-0">
																					<th class="min-w-100px">Date</th>
																					<th class="min-w-125px">Land Name /<br>Sale ID</th>
																					<th class="min-w-125px">Party Info</th>
																					<th class="min-w-100px">Plot Area<br>(No / Type)</th>
																				</tr>
																			</thead>
																			<!--end::Table head-->
																			<!--begin::Table body-->
																			<tbody>
																			<?php foreach($registered_list as $plist){ ?>
																			<tr>
																				<td class="dash_loan">
																					<label class="text-black fw-bold fs-6"><?php echo $plist['date']; ?></label>
																				</td>
																				<td class="dash_loan">
																					<span class="fs-6 text-gray-800 fw-bold"><?php echo $plist['property_type']; ?></span>
																					<span class="fs-6 text-gray-800 fw-bold">&nbsp;/</span>
																					<div class="d-flex flex-column flex-grow-1 my-lg-0 my-2">
																						<span class="text-primary fw-bold fs-6"><?php echo $plist['sale_id']; ?></span>
																					</div>
																				</td>
																				<td class="dash_loan">
																					<div class="d-flex mb-1">
																						<div class="d-flex align-items-center">
																							<div class="symbol symbol-35px me-2">
																							<?php 
																								if($plist['PHOTO']!="")
																								{
																									if($plist['TYPE_OF_RECORD']=='N')
																									{?>
																										<img src="<?php echo $plist['PHOTO']; ?>" height="125px" width="125px" >
																									<?php 
																									}
																									else
																									{
																							?>
																								<img src="data:image/jpeg;base64,<?php echo base64_encode($plist['PHOTO']); ?>"  >
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
																							<a href="#" class="fs-6 text-gray-800 fw-bold"><?php echo $plist['party_name']; ?></a>
																							<label class="text-primary fw-bold"><?php echo $plist['party_id']; ?></label>
																						</div>
																					</div>
																				</td>
																				<td class="dash_loan">
																					<label class="fw-bold">
																						<i class="fas fa-map-marker-alt fs-6"></i>&nbsp;
																					</label>
																					<label class="text-primary fw-bold fs-6"><?php echo $plist['ploat_no']; ?></label>
																					<label class="text-black fw-bold fs-6"> / </label>
																					<label class="text-black fw-bold fs-6"><?php echo $plist['ploat_type']; ?></label>
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
													<div class="row">
														<!--begin::Col-->
														<div class="col-xl-6">
															<!--begin::Mixed Widget 5-->
															<div class="card card-xl-stretch mb-2 mb-xl-2" style="min-height: 320px !important; max-height: 320px !important;">
																<div class="row">
																	<div class="col-xl-8">
																		<h3 class="card-title align-items-start flex-column ms-5 mt-6">
																			<span class="card-label fw-bold fs-1">Purchase Receipts</span>
																		</h3>
																	</div>
																	<div class="col-xl-4 d-flex align-items-center justify-content-center">
																		<h3 class="card-title align-items-start flex-column mt-6" id="purchase_recp">
																			<span class="badge badge-success fs-1">
																				<?php $count_pur_rec = count($purchase_receipt_list); echo str_pad($count_pur_rec?$count_pur_rec:0, 2, '0', STR_PAD_LEFT); ?> 
																			</span>
																			<span id="purchase_recp_sub">Current Month&nbsp;Purchase&nbsp;Receipts</span>
																		</h3>
																	</div>
																</div>
																<!--begin::Body-->
																<div class="card-body px-8 py-1">
																	<!--begin::Table-->
																	<table class="table align-middle table-row-dashed table-hover fs-7 gy-3 gs-3" id="real_estate_purchase_receipts">
																		<!--begin::Table head-->
																		<thead>
																			<tr class="text-start text-muted fw-bold fs-6 gs-0">
																				<th class="min-w-100px">Date</th>
																				<th class="min-w-125px" style="min-width:115px !important;">Bill No</th>
																				<th class="min-w-100px"><span class="ms-5">Net</span><br>Amount</th>
																				<th class="min-w-100px"><span class="ms-4">Paid</span><br>Amount</th>
																				<th class="min-w-100px"><span class="ms-1">Balance</span><br>Amount</th>
																			</tr>
																		</thead>
																		<!--end::Table head-->
																		<!--begin::Table body-->
																		<tbody>
																		<?php foreach($purchase_receipt_list as $plist){ ?>
																			<tr>
																				<td class="dash_loan">
																					<label class="text-black fw-bold fs-6"><?php echo $plist['receipt_date']; ?></label>
																				</td>
																				<td class="dash_loan">
																					<label class="text-black fw-bold fs-6"><?php echo $plist['recepit_id']; ?> </label>
																				</td>
																				<td>
																					<label class="text-black fw-bold fs-6"><?php echo number_format($plist['net_amount'],2,'.',','); ?></label>
																				</td>
																				<td>
																					<label class="text-success fw-bold fs-6"><?php echo number_format($plist['cr_paid_amount'],2,'.',','); ?></label>
																				</td>
																				<td>
																					<label class="fw-bold fs-6" style="color:red;"><?php echo number_format($plist['cr_balance_amount'],2,'.',','); ?></label>
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
														<div class="col-xl-6">
															<!--begin::Mixed Widget 5-->
															<div class="card card-xl-stretch mb-2 mb-xl-2" style="min-height: 320px !important; max-height: 320px !important;">
																<div class="row">
																	<div class="col-xl-8">
																		<h3 class="card-title align-items-start flex-column ms-5 mt-6">
																			<span class="card-label fw-bold fs-1">Sales Receipts</span>
																		</h3>
																	</div>
																	<div class="col-xl-4 d-flex align-items-center justify-content-center">
																		<h3 class="card-title align-items-start flex-column mt-6" id="purchase_recp">
																				<span class="badge badge-success fs-1">
																				<?php $count_sal_rec = count($sale_receipt_list); echo str_pad($count_sal_rec?$count_sal_rec:0, 2, '0', STR_PAD_LEFT); ?> 
																			</span>
																			<span id="purchase_recp_sub">Current Month Balance Amount</span>
																		</h3>
																	</div>
																</div>
																<!--begin::Body-->
																<div class="card-body px-8 py-1">
																	<!--begin::Table-->
																	<table class="table align-middle table-row-dashed table-hover fs-7 gy-3 gs-3" id="real_estate_sales_receipts">
																		<!--begin::Table head-->
																		<thead>
																			<tr class="text-start text-muted fw-bold fs-6 gs-0">
																				<th class="min-w-100px">Date</th>
																				<th class="min-w-125px" style="min-width:115px !important;">Bill No</th>
																				<th class="min-w-100px"><span class="ms-5">Net</span><br>Amount</th>
																				<th class="min-w-100px"><span class="ms-4">Paid</span><br>Amount</th>
																				<th class="min-w-100px"><span class="ms-1">Balance</span><br>Amount</th>
																			</tr>
																		</thead>
																		<!--end::Table head-->
																		<!--begin::Table body-->
																		<tbody>
																		<?php foreach($sale_receipt_list as $plist){ ?>
																			<tr>
																				<td class="dash_loan">
																					<label class="text-black fw-bold fs-6"><?php echo $plist['receipt_date']; ?></label>
																				</td>
																				<td class="dash_loan">
																					<label class="text-black fw-bold fs-6"><?php echo $plist['recepit_id']; ?> </label>
																				</td>
																				<td>
																					<label class="text-black fw-bold fs-6"><?php echo number_format($plist['net_amount'],2,'.',','); ?></label>
																				</td>
																				<td>
																					<label class="text-success fw-bold fs-6"><?php echo number_format($plist['cr_paid_amount'],2,'.',','); ?></label>
																				</td>
																				<td>
																					<label class="fw-bold fs-6" style="color:red;"><?php echo number_format($plist['cr_balance_amount'],2,'.',','); ?></label>
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
													</div>
													<div class="row mt-4">
														<div class="col-xl-6">

															<?php $i=0; foreach($weekly_purchase as $wlist){ ?>
															<input type="hidden" class="input_count" name="weekly_purchase[]" id="weekly_purchase<?php echo $i; ?>" value="<?php echo $wlist; ?>" >
															<?php $i++; } ?>
															<div id="real_estate_chart_weekly_purchase_property"></div>
														</div>
														<?php $i=0; foreach($weekly_sale as $wlist){ ?>
															<input type="hidden" class="input_count_sale" name="weekly_sale[]" id="weekly_sale<?php echo $i; ?>" value="<?php echo $wlist; ?>" >
														<?php $i++; } ?>
														<div class="col-xl-6">
															<div id="real_estate_chart_weekly_sales_property"></div>
														</div>
													</div> 
													<div class="row">
														<?php $i=0; foreach($monthly_sale as $wlist){ ?>
															<input type="hidden" class="input_count_sale_monthly" name="monthly_sale[]" id="monthly_sale<?php echo $i; ?>" value="<?php echo $wlist; ?>" >
														<?php $i++; } ?>
														<div class="col-xl-12">
															<div id="real_estate_chart_monthly_sales_property"></div>
														</div>
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
		<script src="<?php echo base_url(); ?>/assets/custom_js/highchart.js"></script>
	  <!-- Real Estate Weekly Purchase Property Start -->
		<script type="text/javascript">
		var count=$('.input_count').length;
		weekly_purchase_report =[];
			 for(i=0;i<count;i++){
				var weekly_purchase=$('#weekly_purchase'+i).val();
				weekly_purchase_report[i]=weekly_purchase;
			 }
			//  alert(weekly_purchase_report);
			var options = {
		          series: [{
			        // name: 'AKP',
			        data: weekly_purchase_report
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
			        text: 'Weekly Purchase Property (<?php
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
		          categories: [ 'Sun','Mon', 'Tue', 'Wed', 'Thur', 'Fri', 'Sat']
		        }
		        };
				// Highcharts.setOptions({
				//     lang: {
				//       thousandsSep: ','
				//     }
				//   });
		        var chart = new ApexCharts(document.querySelector("#real_estate_chart_weekly_purchase_property"), options);
		        chart.render();
		</script>
		<!-- Real Estate Weekly Purchase Property End -->
		<!-- Real Estate Weekly Sales Property Start -->
		<script type="text/javascript">
		var count=$('.input_count_sale').length;
		weekly_sale_report =[];
			 for(i=0;i<count;i++){
				var weekly_sale=$('#weekly_sale'+i).val();
				weekly_sale_report[i]=weekly_sale;
			 }
			
			var options = {
		          series: [{
			        // name: 'AKP',
			         color: '#50cd89',
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
			        text: 'Weekly Sales Property (<?php
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
				// Highcharts.setOptions({
				//     lang: { 
				//       thousandsSep: ','
				//     }
				//   });
		        var chart = new ApexCharts(document.querySelector("#real_estate_chart_weekly_sales_property"), options);
		        chart.render();
		</script>
		<!-- Real Estate Weekly Sales Property End -->
		<!-- Real Estate Monthly Sales Property Start -->
	  <script>
	  var count=$('.input_count_sale_monthly').length;
		monthly_sale_report =[];
			 for(i=0;i<count;i++){
				var monthly_sale=$('#monthly_sale'+i).val();
				monthly_sale_report[i]=monthly_sale;
			 }
			//  alert(monthly_sale_report);
	  	var options = {
          series: [{
          data: monthly_sale_report
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
          height: 350,
          type: 'bar',
          events: {
            click: function(chart, w, e) {
              // console.log(chart, w, e)
            }
          }
        },
        title: {
			        text: 'Monthly Sales Property (<?php echo date("F");?>)',
			        align: 'center',
			         fontWeight: 'bold',
			        style: {
			            fontSize: '18px',
			            
			          }
			    },
        // colors: {colors},
        plotOptions: {
          bar: {
            columnWidth: '45%',
            distributed: true,
          }
        },
        dataLabels: {
          enabled: false
        },
        legend: {     //echo date("t", strtotime($a_date));
          show: false
        },
        xaxis: {
			<?php 
				$fdate=date('01-m-Y');
				$ldate=date('t-m-Y');
				$i=0;
				$cat="";
				for($currentDate = strtotime($fdate); $currentDate <= strtotime($ldate); 
				$currentDate += (86400))
				{
					if($i!=0){ $cat.=","; } else{ $cat.="";}
					$cat.="['".date('d',$currentDate)."','".date('D',$currentDate)."','".date('M',$currentDate)."']";
					$i++;
				}?>
				// $cat="['01','Sat','Jul'],['02','Sun','Jul']";
				//$cat="['01','Sat','Jul'],['02','Sun','Jul'],['03','Mon','Jul'],['04','Tue','Jul'],['05','Wed','Jul'],['06','Thu','Jul'],['07','Fri','Jul'],['08','Sat','Jul'],['09','Sun','Jul'],['10','Mon','Jul'],['11','Tue','Jul'],['12','Wed','Jul'],['13','Thu','Jul'],['14','Fri','Jul'],['15','Sat','Jul'],['16','Sun','Jul'],['17','Mon','Jul'],['18','Tue','Jul'],['19','Wed','Jul'],['20','Thu','Jul'],['21','Fri','Jul'],['22','Sat','Jul'],['23','Sun','Jul'],['24','Mon','Jul'],['25','Tue','Jul'],['26','Wed','Jul'],['27','Thu','Jul'],['28','Fri','Jul'],['29','Sat','Jul'],['30','Sun','Jul'],['31','Mon','Jul']"; 
          categories: [
            // ['John', 'Doe'],
            <?php echo $cat; ?>
            ],
          labels: {
            style: {
              // colors: colors,
              fontSize: '12px'
            }
          }
        }
        };

        var chart = new ApexCharts(document.querySelector("#real_estate_chart_monthly_sales_property"), options);
        chart.render();
	  </script>
	  <!-- Real Estate Weekly Collection End -->
		
	
		<script>
			// $("#real_estate_property_list").DataTable({
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
			 $('#real_estate_property_list').wrap('<div class="dataTables_jewellery_delivered" />');
		</script>
		<script>
			// $("#real_estate_purchase_property_list").DataTable({
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
			 $('#real_estate_purchase_property_list').wrap('<div class="dataTables_jewellery_delivered" />');
		</script>
		<script>
			// $("#real_estate_booked_property").DataTable({
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
			 $('#real_estate_booked_property').wrap('<div class="dataTables_jewellery_delivered" />');
		</script>
		<script>
			// $("#real_estate_registered_property").DataTable({
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
			 $('#real_estate_registered_property').wrap('<div class="dataTables_jewellery_delivered" />');
		</script>
		<script>
			// $("#real_estate_purchase_receipts").DataTable({
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
			 $('#real_estate_purchase_receipts').wrap('<div class="dataTables_jewellery_delivered" />');
		</script>
		<script>
			// $("#real_estate_sales_receipts").DataTable({
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
			 $('#real_estate_sales_receipts').wrap('<div class="dataTables_jewellery_delivered" />');
		</script>
		
		<script>
	      $("#real_estate_purchase_receipts").kendoTooltip({
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
	      $("#real_estate_sales_receipts").kendoTooltip({
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
	      $("#real_estate_booked_property").kendoTooltip({
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
	      $("#real_estate_registered_property").kendoTooltip({
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
	      $("#real_estate_purchase_property_list").kendoTooltip({
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
	      $("#real_estate_property_list").kendoTooltip({
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