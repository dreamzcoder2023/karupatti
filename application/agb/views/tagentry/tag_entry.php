<?php $this->load->view("common");?>
<style>
	.dataTables_scroll
    {
        position: relative;
        overflow: auto;
        max-height: 200px;/*the maximum height you want to achieve*/
        width: 100%;
    }
  .dataTables_scroll thead{
    position: -webkit-sticky;
    position: sticky;
    top: 0;
/*   background-color: #ec9629;*/
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
									<h1 class="d-flex align-items-center text-dark fw-bold my-1 fs-3">Tagged Item List
									<!--begin::Separator-->
									<span class="h-20px border-gray-400 border-start ms-3 mx-2"></span>
									<label class="d-flex align-items-center text-primary fw-bold my-1 fs-5">
										<span>Company - </span>
										<span>&emsp;<?php if($company_id==''){ echo "All"; }else{ $company  = $this->db->query("SELECT * FROM COMPANY WHERE ACTIVE='Y' AND COMPANYCODE='". $company_id."' ")->row();
											 echo $company->COMPANYNAME?$company->COMPANYNAME:'-'; } ?>
										 </span>
									</label>
									<span class="h-20px border-gray-400 border-start ms-3 mx-2"></span>
									<label class="d-flex align-items-center text-primary fw-bold my-1 fs-5">
										<span>Item Type - </span>
										<span>&emsp;<?php if($jewel_type_fill==''){ echo "All"; }else{ $jewel_type  = $this->db->query("SELECT * FROM jewel_type WHERE  jewel_type_id='". $jewel_type_fill."' ")->row();
											 echo $jewel_type->jewel_type?$jewel_type->jewel_type:'-'; } ?></span>
									</label>
									<span class="h-20px border-gray-400 border-start ms-3 mx-2"></span>
									<label class="d-flex align-items-center text-primary fw-bold my-1 fs-5">
										<span>Date - </span>
										<span><?php if($dt_fill==''){ echo "All"; }else{ echo ucfirst($dt_fill); } ?></span>
									</label>
									<!--end::Separator-->
									<!--begin::Description-->
									
									<!--end::Description--></h1>
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
											<div class="mb-5 hover-scroll-x">
												<div class="d-grid">
													<ul class="nav nav-tabs flex-nowrap text-nowrap">
														<li class="nav-item">
															<a class="nav-link active btn btn-active-light btn-color-black-800 btn-active-color-primary rounded-bottom-0 fw-bold fs-6" data-bs-toggle="tab" href="#kt_tab_pane_1">Tagged</a>
														</li>
														<li class="nav-item">
															<a class="nav-link btn btn-active-light btn-color-black-800 btn-active-color-primary rounded-bottom-0 fw-bold fs-6"  href="<?php echo base_url(); ?>Tagentry/tag_entry_waiting_approval" >Waiting  Approval</a>
														</li>
													</ul>
												</div>
											</div>
											<div class="tab-content" id="myTabContent">
												<div class="tab-pane fade show active" id="kt_tab_pane_1" role="tabpanel">
													<div class="row">
														<div class="col-lg-12">
															<div class="row">
																<div class="col-lg-8">
																	<div class="row">
																		<label class="col-lg-4 form-label text-center fs-4 fw-bold">Total Tagged</label>
																		<label class="col-lg-4 form-label text-center fs-4 fw-bold">Total Weight</label>
																		<!--<label class="col-lg-4 form-label text-center fs-4 fw-bold">Total Charges</label>-->
																	</div>
																	<div class="row">
																		<label class="col-lg-4 text-success text-center fs-2 fw-bold"><?php echo $tagentry_list_tag1->count; ?></label>
																		<label class="col-lg-4 text-success text-center fs-2 fw-bold"><?php echo $tagentry_list_tag1->t_wgt; ?></label>
																		<!--<label class="col-lg-4 text-success text-center fs-2 fw-bold">600.00</label>-->
																	</div>
																</div>
																<div class="col-lg-4">
																	<div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
																		<!--begin::Filter-->
																		<button type="button" class="btn btn-sm btn-outline btn-outline-solid btn-outline-warning btn-active-light-primary me-3" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
																			Filter</button>
																		<div class="menu menu-sub menu-sub-dropdown w-300px w-md-325px" data-kt-menu="true">
																			<div class="px-7 py-5" data-kt-user-table-filter="form">
																				<form method="POST" action="<?php echo base_url(); ?>Tagentry" id="fill_form">
																					<div class="scroll-y mh-325px my-1 px-3">
																						<div class="mb-2">
																							<label class="form-label fs-6 fw-semibold">Company</label>
																							<select class="form-select form-select-solid " data-control="select2"  data-hide-search="true"  name="company_id" id="company_id">	
																							<option value="" selected>All</option>
																							<?php foreach($company_list as $company_list){?>
																							<option value="<?php echo $company_list['COMPANYCODE'] ;?>" <?php if($company_list['COMPANYCODE']==$company_id ){ echo "selected"; } ?>><?php echo $company_list['COMPANYNAME'];?></option><?php
																							 }?>
																							 </select>
																						</div>
																						<div class="mb-2">
																							<label class="form-label">Item Type</label>
																							<select class="form-select form-select-solid" data-control="select2" data-hide-search="true" id="jewel_type_fill" name="jewel_type_fill">	
																											
																								<option value="" >All</option>
																								<?php foreach($metal_type_list as $mtlist){?>
																								<option value="<?php echo $mtlist['jewel_type_id'] ;?>" <?php if($jewel_type_fill==$mtlist['jewel_type_id']){ echo "selected"; } ?>><?php echo $mtlist['jewel_type'];?></option>
																								<?php }?>
																							 </select>
																						</div>
																						<div class="mb-2">
																							<label class="form-label">Item Name</label>
																							<select class="form-select form-select-solid" data-control="select2" data-hide-search="true" id="jewel_item_fill" name="jewel_item_fill">	
																								<option value="">All</option>			
																								<?php $item_list=$this->db->query("SELECT * FROM ITEMS")->result_array(); ?>	
																								<?php foreach($item_list as $plist){ ?>
																						        <option <?php if($jewel_item_fill==$plist['SNO']){ echo "selected"; } ?> value="<?php echo $plist['SNO']; ?>"><?php echo $plist['ITEMNAME']; ?></option>
																								<?php } ?>		
																							</select>
																						</div>
																						<div class="mb-2">
																							<label class="form-label">Date</label>
																								<select class="form-select form-select-solid" data-control="select2" data-hide-search="true" id="dt_fill" name="dt_fill" onchange="date_fill();">	
																									<option value="all">All</option>				
																									<option value="today" <?php if($dt_fill=="today"){ echo "selected"; } ?>>Today</option>
																									<option value="week" <?php if($dt_fill=="week"){ echo "selected"; } ?>>This Week</option>
																									<option value="monthly" <?php if($dt_fill=="monthly"){ echo "selected"; } ?>>This Month</option>
																									<option value="custom Date" <?php if($dt_fill=="custom Date"){ echo "selected"; } ?>>Custom Date</option>
																								</select>
																						</div>
																						<div class="mb-2 fv-row" id="today_dt" style="display:none;">
																							<label class="form-label">Today</label>
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
																									<input class="form-control form-control-solid ps-12" name="" placeholder="Date" id="today_date_fillter" value="<?php echo date("d-m-Y"); ?>" disabled />
																							</div>
																						</div>
																						<div class="mb-2 fv-row"id="week_from_dt"style="display:none;">
																							<label class="form-label">From</label>
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
																									<input class="form-control form-control-solid ps-12" name="" placeholder="Date" id="week_from_date_fillter" value="" disabled />
																							</div>
																						</div>
																						<div class="mb-2 fv-row" id="week_to_dt" style="display:none;">
																							<label class="form-label">To</label>
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
																									<input class="form-control form-control-solid ps-12" name="" placeholder="Date" id="week_to_date_fillter" value="<?php echo date("d-m-Y"); ?>" disabled />
																							</div>
																						</div>
																						<div class="mb-2 fv-row" id="monthly_dt" style="display:none;">
																							<label class="form-label">This Month</label>
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
																										<input class="form-control form-control-solid ps-12" name="" placeholder="Month" id="monthly_date_fillter" value="<?php echo date("m-Y"); ?>" />
																							</div>
																						</div>
																						<div class="mb-2 fv-row" id="from_dt" style="display:none;">
																							<label class="form-label">From</label>
																							<div class="d-flex align-items-center">
																									<!--begin::Svg Icon | path: icons/duotune/general/gen014.svg-->
																									<span class="svg-icon position-absolute ms-4 svg-icon-2 dt">
																										<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																											<path opacity="0.3" d="M21 22H3C2.4 22 2 21.6 2 21V5C2 4.4 2.4 4 3 4H21C21.6 4 22 4.4 22 5V21C22 21.6 21.6 22 21 22Z" fill="currentColor"></path>
																											<path d="M6 6C5.4 6 5 5.6 5 5V3C5 2.4 5.4 2 6 2C6.6 2 7 2.4 7 3V5C7 5.6 6.6 6 6 6ZM11 5V3C11 2.4 10.6 2 10 2C9.4 2 9 2.4 9 3V5C9 5.6 9.4 6 10 6C10.6 6 11 5.6 11 5ZM15 5V3C15 2.4 14.6 2 14 2C13.4 2 13 2.4 13 3V5C13 5.6 13.4 6 14 6C14.6 6 15 5.6 15 5ZM19 5V3C19 2.4 18.6 2 18 2C17.4 2 17 2.4 17 3V5C17 5.6 17.4 6 18 6C18.6 6 19 5.6 19 5Z" fill="currentColor"></path>
																											<path d="M8.8 13.1C9.2 13.1 9.5 13 9.7 12.8C9.9 12.6 10.1 12.3 10.1 11.9C10.1 11.6 10 11.3 9.8 11.1C9.6 10.9 9.3 10.8 9 10.8C8.8 10.8 8.59999 10.8 8.39999 10.9C8.19999 11 8.1 11.1 8 11.2C7.9 11.3 7.8 11.4 7.7 11.6C7.6 11.8 7.5 11.9 7.5 12.1C7.5 12.2 7.4 12.2 7.3 12.3C7.2 12.4 7.09999 12.4 6.89999 12.4C6.69999 12.4 6.6 12.3 6.5 12.2C6.4 12.1 6.3 11.9 6.3 11.7C6.3 11.5 6.4 11.3 6.5 11.1C6.6 10.9 6.8 10.7 7 10.5C7.2 10.3 7.49999 10.1 7.89999 10C8.29999 9.90003 8.60001 9.80003 9.10001 9.80003C9.50001 9.80003 9.80001 9.90003 10.1 10C10.4 10.1 10.7 10.3 10.9 10.4C11.1 10.5 11.3 10.8 11.4 11.1C11.5 11.4 11.6 11.6 11.6 11.9C11.6 12.3 11.5 12.6 11.3 12.9C11.1 13.2 10.9 13.5 10.6 13.7C10.9 13.9 11.2 14.1 11.4 14.3C11.6 14.5 11.8 14.7 11.9 15C12 15.3 12.1 15.5 12.1 15.8C12.1 16.2 12 16.5 11.9 16.8C11.8 17.1 11.5 17.4 11.3 17.7C11.1 18 10.7 18.2 10.3 18.3C9.9 18.4 9.5 18.5 9 18.5C8.5 18.5 8.1 18.4 7.7 18.2C7.3 18 7 17.8 6.8 17.6C6.6 17.4 6.4 17.1 6.3 16.8C6.2 16.5 6.10001 16.3 6.10001 16.1C6.10001 15.9 6.2 15.7 6.3 15.6C6.4 15.5 6.6 15.4 6.8 15.4C6.9 15.4 7.00001 15.4 7.10001 15.5C7.20001 15.6 7.3 15.6 7.3 15.7C7.5 16.2 7.7 16.6 8 16.9C8.3 17.2 8.6 17.3 9 17.3C9.2 17.3 9.5 17.2 9.7 17.1C9.9 17 10.1 16.8 10.3 16.6C10.5 16.4 10.5 16.1 10.5 15.8C10.5 15.3 10.4 15 10.1 14.7C9.80001 14.4 9.50001 14.3 9.10001 14.3C9.00001 14.3 8.9 14.3 8.7 14.3C8.5 14.3 8.39999 14.3 8.39999 14.3C8.19999 14.3 7.99999 14.2 7.89999 14.1C7.79999 14 7.7 13.8 7.7 13.7C7.7 13.5 7.79999 13.4 7.89999 13.2C7.99999 13 8.2 13 8.5 13H8.8V13.1ZM15.3 17.5V12.2C14.3 13 13.6 13.3 13.3 13.3C13.1 13.3 13 13.2 12.9 13.1C12.8 13 12.7 12.8 12.7 12.6C12.7 12.4 12.8 12.3 12.9 12.2C13 12.1 13.2 12 13.6 11.8C14.1 11.6 14.5 11.3 14.7 11.1C14.9 10.9 15.2 10.6 15.5 10.3C15.8 10 15.9 9.80003 15.9 9.70003C15.9 9.60003 16.1 9.60004 16.3 9.60004C16.5 9.60004 16.7 9.70003 16.8 9.80003C16.9 9.90003 17 10.2 17 10.5V17.2C17 18 16.7 18.4 16.2 18.4C16 18.4 15.8 18.3 15.6 18.2C15.4 18.1 15.3 17.8 15.3 17.5Z" fill="currentColor"></path>
																										</svg>
																									</span>
																									<!--end::Svg Icon-->
																									<input class="form-control form-control-solid ps-12" name="from_date_fillter" placeholder="From Date" id="from_date_fillter" value="<?php echo date("d-m-Y"); ?>"/>
																							</div>
																						</div>
																						<div class="mb-2 fv-row" id="to_dt" style="display:none;">
																							<label class="form-label">To</label>
																							<div class="d-flex align-items-center">
																									<span class="svg-icon position-absolute ms-4 svg-icon-2 dt">
																										<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																											<path opacity="0.3" d="M21 22H3C2.4 22 2 21.6 2 21V5C2 4.4 2.4 4 3 4H21C21.6 4 22 4.4 22 5V21C22 21.6 21.6 22 21 22Z" fill="currentColor" />
																											<path d="M6 6C5.4 6 5 5.6 5 5V3C5 2.4 5.4 2 6 2C6.6 2 7 2.4 7 3V5C7 5.6 6.6 6 6 6ZM11 5V3C11 2.4 10.6 2 10 2C9.4 2 9 2.4 9 3V5C9 5.6 9.4 6 10 6C10.6 6 11 5.6 11 5ZM15 5V3C15 2.4 14.6 2 14 2C13.4 2 13 2.4 13 3V5C13 5.6 13.4 6 14 6C14.6 6 15 5.6 15 5ZM19 5V3C19 2.4 18.6 2 18 2C17.4 2 17 2.4 17 3V5C17 5.6 17.4 6 18 6C18.6 6 19 5.6 19 5Z" fill="currentColor" />
																											<path d="M8.8 13.1C9.2 13.1 9.5 13 9.7 12.8C9.9 12.6 10.1 12.3 10.1 11.9C10.1 11.6 10 11.3 9.8 11.1C9.6 10.9 9.3 10.8 9 10.8C8.8 10.8 8.59999 10.8 8.39999 10.9C8.19999 11 8.1 11.1 8 11.2C7.9 11.3 7.8 11.4 7.7 11.6C7.6 11.8 7.5 11.9 7.5 12.1C7.5 12.2 7.4 12.2 7.3 12.3C7.2 12.4 7.09999 12.4 6.89999 12.4C6.69999 12.4 6.6 12.3 6.5 12.2C6.4 12.1 6.3 11.9 6.3 11.7C6.3 11.5 6.4 11.3 6.5 11.1C6.6 10.9 6.8 10.7 7 10.5C7.2 10.3 7.49999 10.1 7.89999 10C8.29999 9.90003 8.60001 9.80003 9.10001 9.80003C9.50001 9.80003 9.80001 9.90003 10.1 10C10.4 10.1 10.7 10.3 10.9 10.4C11.1 10.5 11.3 10.8 11.4 11.1C11.5 11.4 11.6 11.6 11.6 11.9C11.6 12.3 11.5 12.6 11.3 12.9C11.1 13.2 10.9 13.5 10.6 13.7C10.9 13.9 11.2 14.1 11.4 14.3C11.6 14.5 11.8 14.7 11.9 15C12 15.3 12.1 15.5 12.1 15.8C12.1 16.2 12 16.5 11.9 16.8C11.8 17.1 11.5 17.4 11.3 17.7C11.1 18 10.7 18.2 10.3 18.3C9.9 18.4 9.5 18.5 9 18.5C8.5 18.5 8.1 18.4 7.7 18.2C7.3 18 7 17.8 6.8 17.6C6.6 17.4 6.4 17.1 6.3 16.8C6.2 16.5 6.10001 16.3 6.10001 16.1C6.10001 15.9 6.2 15.7 6.3 15.6C6.4 15.5 6.6 15.4 6.8 15.4C6.9 15.4 7.00001 15.4 7.10001 15.5C7.20001 15.6 7.3 15.6 7.3 15.7C7.5 16.2 7.7 16.6 8 16.9C8.3 17.2 8.6 17.3 9 17.3C9.2 17.3 9.5 17.2 9.7 17.1C9.9 17 10.1 16.8 10.3 16.6C10.5 16.4 10.5 16.1 10.5 15.8C10.5 15.3 10.4 15 10.1 14.7C9.80001 14.4 9.50001 14.3 9.10001 14.3C9.00001 14.3 8.9 14.3 8.7 14.3C8.5 14.3 8.39999 14.3 8.39999 14.3C8.19999 14.3 7.99999 14.2 7.89999 14.1C7.79999 14 7.7 13.8 7.7 13.7C7.7 13.5 7.79999 13.4 7.89999 13.2C7.99999 13 8.2 13 8.5 13H8.8V13.1ZM15.3 17.5V12.2C14.3 13 13.6 13.3 13.3 13.3C13.1 13.3 13 13.2 12.9 13.1C12.8 13 12.7 12.8 12.7 12.6C12.7 12.4 12.8 12.3 12.9 12.2C13 12.1 13.2 12 13.6 11.8C14.1 11.6 14.5 11.3 14.7 11.1C14.9 10.9 15.2 10.6 15.5 10.3C15.8 10 15.9 9.80003 15.9 9.70003C15.9 9.60003 16.1 9.60004 16.3 9.60004C16.5 9.60004 16.7 9.70003 16.8 9.80003C16.9 9.90003 17 10.2 17 10.5V17.2C17 18 16.7 18.4 16.2 18.4C16 18.4 15.8 18.3 15.6 18.2C15.4 18.1 15.3 17.8 15.3 17.5Z" fill="currentColor" />
																										</svg>
																									</span>
																									<!--end::Svg Icon-->
																									<input class="form-control form-control-solid ps-12" name="to_date_fillter" placeholder="To Date" id="to_date_fillter" value="<?php echo date("d-m-Y"); ?>"/>
																							</div>
																						</div>
																						<div class="d-flex justify-content-end">
																							<button type="reset" class="btn btn-light btn-active-light-primary fw-semibold me-2 px-6" data-kt-menu-dismiss="true" data-kt-user-table-filter="reset" onclick="reset_fill()">Reset</button>
																							<button type="submit" class="btn btn-primary fw-semibold px-6" data-kt-menu-dismiss="true" data-kt-user-table-filter="filter">Apply</button>
																						</div>
																					</div>
																				</form>
																			</div>
																		</div>
																		<button type="button" class="btn btn-sm btn-outline btn-outline-solid btn-outline-warning btn-active-light-primary me-3" data-bs-toggle="modal" data-bs-target="#">Export</button>
																	</div>
																</div>
															</div>
														</div>
														<div class="modal fade" id="kt_modal_export_users" tabindex="-1" aria-hidden="true">	<!--begin::Modal dialog-->
															<div class="modal-dialog modal-dialog-centered mw-650px">
																<!--begin::Modal content-->
																<div class="modal-content">
																	<!--begin::Modal header-->
																	<div class="modal-header">
																		<!--begin::Modal title-->
																		<h2 class="fw-bold">Export Loan details</h2>
																		<!--end::Modal title-->
																		<!--begin::Close-->
																		<div class="btn btn-icon btn-sm btn-active-icon-primary" data-kt-users-modal-action="close">
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
																	<div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
																		<!--begin::Form-->
																		<form id="kt_modal_export_users_form" class="form" action="#">
																			<!--begin::Input group-->
																			<div class="fv-row mb-10">
																				<!--begin::Label-->
																				<label class="fs-6 fw-semibold form-label mb-2">Based On:</label>
																				<!--end::Label-->
																				<!--begin::Input-->
																				<select name="role" data-control="select2" data-placeholder="Based on" data-hide-search="true" class="form-select form-select-solid fw-bold">
																					<option></option>
																					<option value="role">Loan Type</option>
																					<option value="department">Item Type</option>
																				</select>
																				<!--end::Input-->
																			</div>
																			<!--end::Input group-->
																			<!--begin::Input group-->
																			<div class="fv-row mb-10">
																				<!--begin::Label-->
																				<label class="required fs-6 fw-semibold form-label mb-2">Select Export Format:</label>
																				<!--end::Label-->
																				<!--begin::Input-->
																				<select name="format" data-control="select2" data-placeholder="Select a format" data-hide-search="true" class="form-select form-select-solid fw-bold">
																					<option></option>
																					<option value="excel">Excel</option>
																					<option value="pdf">PDF</option>
																					<option value="cvs">CVS</option>
																					<option value="zip">ZIP</option>
																				</select>
																				<!--end::Input-->
																			</div>
																			<!--end::Input group-->
																			<!--begin::Actions-->
																			<div class="text-center">
																				<button type="reset" class="btn btn-light me-3" data-kt-users-modal-action="cancel">Discard</button>
																				<button type="submit" class="btn btn-primary" data-kt-users-modal-action="submit">
																					<span class="indicator-label">Submit</span>
																					<span class="indicator-progress">Please wait...
																					<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
																				</button>
																			</div>
																			<!--end::Actions-->
																		</form>
																		<!--end::Form-->
																	</div>
																	<!--end::Modal body-->
																</div>
																<!--end::Modal content-->
															</div>
															<!--end::Modal dialog-->
														</div>
													</div>
													<div class="row">
														<table  class="table align-middle table-row-dashed table-striped table-hover fs-7 gy-1 gs-2 dataTable" id="kt_datatable_tagged_entry_list">
															<thead>
															   <tr class="text-start text-muted fw-bold fs-7 gs-0">
															   		<!-- <th class="min-w-25px">SNo</th> -->
															   	    <th class="min-w-100px">Date</th>
																    <th class="min-w-50px">Company</th>
																    <th class="min-w-50px">Tag No</th>
																	<th class="min-w-50px">Img</th>
																	<th class="min-w-50px">Item Name</th>
																	<th class="min-w-50px">Subitem</th>
																	<th class="min-w-80px">Wgt(gms)</th>
																	<th class="min-w-50px">Stone(gms)</th>
																	<th class="min-w-50px">Net Wgt(gms)</th>
																	<th class="min-w-50px">H.M Char</th>
																	<th class="min-w-50px">Mak.Char /<br>Wst.Char(%)</th>
																	<!-- <th class="min-w-50px">Wst.Char(%)</th> -->
																	<th class="min-w-25px">Mt.wgt(gms)</th>
																	<th class="min-w-50px">Action</th>
															   </tr>
															</thead>
															<tbody class="text-gray-600 fw-semibold">
																<?php $i=1; foreach($tagentry_list_tag  as $tlist){ ?>
																	<?php $date_format  = $this->db->query("SELECT * FROM general_settings  ")->row(); $format= $date_format->date_format;?>
																	<tr>
																        <td> <?php echo date("$format", strtotime($tlist['tag_date'])); ?>
																        </td>
																        <td class="ple1"><?php 
																			if(isset($tlist['company_id']) && $tlist['company_id']!=0){
																			 $company  = $this->db->query("SELECT * FROM COMPANY WHERE ACTIVE='Y' AND COMPANYCODE='". $tlist['company_id']."' ")->row();
																			 if(isset($company)) echo $company->COMPANYNAME;
																			}?>
																		</td>
																		<td class="ple1"><?php echo $tlist['tag_id']; ?></td>
															            <td>
																			<?php	$image_url =  base_url().'tag_img/'. $tlist['img']; 
																				if(@getimagesize($image_url)){?>
																				
																				 <a class="d-block overlay"  href="<?php echo base_url(); ?>tag_img/<?php echo $tlist['img']; ?> " data-fslightbox="lightbox-basic">
																				    <!--begin::Image-->
																				    <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded w-45px h-45px"
																				    style="background-image:url('<?php echo base_url(); ?>tag_img/<?php echo $tlist['img']; ?>')">
																				    </div>
																				    <!--end::Image-->
																				    <!--begin::Action-->
																				    <div class="overlay-layer card-rounded bg-dark bg-opacity-25 shadow w-45px h-45px">
																				        <i class="bi bi-eye-fill text-white fs-2"></i>
																				    </div>
																				    <!--end::Action-->
																				</a>
																			<?php }else{ ?>
																			<a href="javascript:;" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm">
												            					<div class="image-input" data-kt-image-input="true">
																					<div class="image-input-wrapper w-40px h-40px" style="background-image: url(<?php echo base_url() ?>assets/media/svg/avatars/blank_jwl.svg)"></div>
																				</div>
																			</a>
																			<?php } ?>
																      	</td>
															            <td class="ple1">
															            	<?php $item_name  = $this->db->query("SELECT * FROM ITEMS WHERE  SNO='".$tlist['item_name']."' ")->row();
																			echo $item_name?$item_name->ITEMNAME:'';  ?> 
															            </td>
															            <td class="ple1">
															            	<?php $subitem_name  = $this->db->query("SELECT * FROM SUBITEM_LIST WHERE  SUB_ID='". $tlist['subitem_name']."' ")->row();
																			echo $subitem_name->SUBITEM_NAME;
																			//  echo $tlist['subitem_name']; ?>
																		</td>
															            <td><?php echo $tlist['weight']; ?></td>
															            <td><?php echo $tlist['stone']; ?></td>
															            <td><?php echo $tlist['net_weight']; ?></td>
																		<td><?php echo $tlist['hallmark_charges']; ?></td>
																		<td>
																			<span><?php echo $tlist['making_charges']; ?></span>
																			<span class="d-block"><?php echo $tlist['wastage_charges']; ?></span>
																		</td>
																		<!-- <td><?php //echo $tlist['wastage_charges']; ?></td>   -->
																		<td><?php echo $tlist['metal_weight']; ?></td>  
																		<td>
																		    <?php if(isset($_SESSION['Tag entryView'])){ if($_SESSION['Tag entryView']==1){?>
																					<span class="text-end">
																					<a href="#" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm" data-bs-toggle="modal" data-bs-target="#kt_modal_convert_to_non_tag_item" title="Convert to Non Tag" onclick="tag_non_approve('<?php echo $tlist['tag_no'];?>')">
																						<i class="fas fa-undo-alt eyc"></i>
																					</a>
																				</span>
																			<?php } } ?> 
																		</td>
															        </tr>
																<?php  $i++; } ?>
															</tbody>
														</table>
													</div>
													<div class="row">
															<?php $coun = ceil( $count/10); $c_page = isset($_GET['page']) ? $_GET['page'] : 1; ?>
															<?php $paging_info = get_paging_info($count,10,$c_page); ?>
															<form  method="POST" id="filter_form" action="" enctype="multipart/form-data" >
															   	<input type="hidden" id="dt_fill" name="dt_fill"  value="<?php echo $dt_fill; ?>">
															    <input type="hidden" id="from_date_fillter" name="from_date_fillter" value="<?php echo $from_date_fillter; ?>">
																<input type="hidden" id="to_date_fillter" name="to_date_fillter" value="<?php echo $to_date_fillter; ?>">
																<input type="hidden" id="jewel_item_fill" name="jewel_item_fill"  value="<?php echo $jewel_item_fill; ?>">
																<input type="hidden" id="jewel_type_fill" name="jewel_type_fill"  value="<?php echo $jewel_type_fill; ?>">
																<input type="hidden" id="company_id" name="company_id"  value="<?php echo $company_id; ?>">
																<ul class="pagination " style="float:right;" >
																	<!-- If the current page is more than 1, show the First and Previous links -->
																	<?php if($paging_info['curr_page'] > 1) : ?>
																   	<li class='paginate_button page-item move_to' value="<?php echo ($paging_info['curr_page'] - 1); ?>" > <a aria-controls='kt_roles_view_table' data-dt-idx='1' tabindex='0' class='page-link cursor-pointer'  title='Page <?php echo ($paging_info['curr_page'] - 1); ?>'><</a></li>
																	<?php endif; ?>
																	<?php
																		    //setup starting point
																		    //$max is equal to number of links shown
																		    $max = 3;
																		    if($paging_info['curr_page'] < $max)
																		        $sp = 1;
																		    elseif($paging_info['curr_page'] >= ($paging_info['pages'] - floor($max / 2)) )
																		        $sp = $paging_info['pages'] - $max + 1;
																		    elseif($paging_info['curr_page'] >= $max)
																		        $sp = $paging_info['curr_page']  - floor($max/2);?>
																	<!-- If the current page >= $max then show link to 1st page -->
																	<?php if($paging_info['curr_page'] >= $max) : ?>
																	   <li class='paginate_button page-item move_to' value="1" ><a aria-controls='kt_roles_view_table' data-dt-idx='1' tabindex='0' class='page-link cursor-pointer' onclick="form_submit()"  title='Page 1'>1</a></li>
																	   <!--<li class='paginate_button page-item '><input type="submit" name="first_page" value="Update" />  </li>-->
																	   ..
																	<?php endif; ?>

																	<!-- Loop though max number of pages shown and show links either side equal to $max / 2 -->
																	<?php for($i = $sp; $i <= ($sp + $max -1);$i++) : ?>
																	    <?php
																	        if($i > $paging_info['pages'])
																	            continue;
																	    ?>
																	    <?php if($paging_info['curr_page'] == $i) : ?>
																	        <li class='paginate_button page-item active move_to' value="<?php echo $i; ?>"> 
																	        	<a aria-controls='kt_roles_view_table' data-dt-idx='1' tabindex='0' onclick="form_submit()" class='page-link cursor-pointer text-hover-dark' title='Page <?php echo $i; ?>'><?php echo $i; ?>
																	        	</a>
																	        </li>
																	    <?php else : ?>
																	       <li class='paginate_button page-item move_to ' value="<?php echo $i; ?>"> <a aria-controls='kt_roles_view_table' data-dt-idx='1' tabindex='0' onclick="form_submit()" class='page-link cursor-pointer text'  title='Page <?php echo $i; ?>'><?php echo $i; ?></a></li>
																	    <?php endif; ?>
																		<?php endfor; ?>
																	<!-- If the current page is less than say the last page minus $max pages divided by 2-->
																	<?php if($paging_info['curr_page'] < ($paging_info['pages'] - floor($max / 2))) : ?>
																	    ..
																	    <li class='paginate_button page-item  move_to' value="<?php echo $paging_info['pages']; ?>"><a  aria-controls='kt_roles_view_table' data-dt-idx='1' tabindex='0' onclick="submit()" class='page-link cursor-pointer'   title='Page <?php echo $paging_info['pages']; ?>'><?php echo $paging_info['pages']; ?></a></li>
																	<?php endif; ?>
																	<!-- Show last two pages if we're not near them -->
																	<?php if($paging_info['curr_page'] < $paging_info['pages']) : ?>
																	  	<li class='paginate_button page-item move_to ' value="<?php echo ($paging_info['curr_page'] + 1); ?>">  <a aria-controls='kt_roles_view_table' data-dt-idx='1' tabindex='0' onclick="submit()" class='page-link cursor-pointer'  title='Page <?php echo ($paging_info['curr_page'] + 1); ?>'>></a></li>
																	<?php endif; ?></ul>
															</form>
															<?php function get_paging_info($tot_rows,$pp,$curr_page)
															{
															    $pages = ceil($tot_rows / $pp); // calc pages
															    $data = array(); // start out array
															    $data['si']        = ($curr_page * $pp) - $pp; // what row to start at
															    $data['pages']     = $pages;                   // add the pages
															    $data['curr_page'] = $curr_page;               // Whats the current page
															    $paging_info['curr_url'] = "http://eibs.elysiumproduct.com/";

															    return $data; //return the paging data

															}?>	
													</div>
												</div>
											</div>
										</div>
									</div>
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


		<!--START::Modal -flashdata-->
			<?php if($this->session->flashdata('g_success')){?>
				<div class="menu-item px-3">
					<a href="#" id="pop_up_success" class="menu-link flex-stack px-3" data-bs-toggle="modal" data-bs-target="#success_modal"></a>
				</div>
	   		<?php } ?>
	   		<?php if($this->session->flashdata('g_err')){?>
				<div class="menu-item px-3">
					<a href="#" id="pop_up_success" class="menu-link flex-stack px-3" data-bs-toggle="modal" data-bs-target="#error_modal"></a>
				</div>
	        <?php } ?>	    
			<div class="modal fade" id="success_modal" tabindex="-1" aria-hidden="true">
				<!--begin::Modal dialog-->
				<div class="modal-dialog modal-dialog-centered modal-m">
					<!--begin::Modal content-->
					<div class="modal-content rounded">
						<div class="swal2-icon swal2-success swal2-icon-show" style="display: flex;">
							<div class="swal2-icon-content">&#x2713;</div></div>
							<div class="swal2-html-container" id="swal2-html-container" style="display: block;">
								<b><span> <?php echo $this->session->flashdata('g_success'); ?></span></b>
								</div>
							<div class="d-flex flex-center flex-row-fluid pt-12">
								<button type="submit" class="btn btn-primary me-3" data-bs-dismiss="modal">Ok</button>
								
							</div><br><br>
					</div>
					<!--end::Modal content-->
				</div>
				<!--end::Modal dialog-->
			</div>
			<div class="modal fade" id="error_modal" tabindex="-1" aria-hidden="true">
				<!--begin::Modal dialog-->
				<div class="modal-dialog modal-dialog-centered modal-m">
					<!--begin::Modal content-->
					<div class="modal-content rounded">
						<div class="swal2-icon swal2-icon-show" style="display: flex;border: 3px solid red !important;">
							<div class="swal2-icon-content" style="color:red">&#x2715;</div></div>
							<div class="swal2-html-container" id="swal2-html-container" style="display: block;">
								<b><span> <?php echo $this->session->flashdata('g_err'); ?></span></b>
								</div>
							<div class="d-flex flex-center flex-row-fluid pt-12">
								<button type="submit" class="btn btn-primary me-3" data-bs-dismiss="modal">Ok</button>
								
							</div><br><br>
					</div>
					<!--end::Modal content-->
				</div>
				<!--end::Modal dialog-->
			</div>
		<!--START::Modal -flashdata-->
		<!--begin::Modal - Convert to Nontag entry-->
		<div class="modal fade" id="kt_modal_convert_to_non_tag_item" tabindex="-1" aria-hidden="true">
		</div>
		<!--end::Modal - Convert to Nontag entry-->

		<input type="hidden" id="baseurl" value="<?php echo base_url();?>">
		<?php $this->load->view("script"); ?>		
		<script>
			function reset_fill(){

				$('#dt_fill').val('');
				$('#jewel_item_fill').val('');
				$('#company_id').val('');
				$('#jewel_type_fill').val('');
				$('#fill_form').submit();
			}

		</script>
		<script>	
			<?php if($this->session->flashdata('g_success') || $this->session->flashdata('g_err')){?> 
			    $(document).ready( function() {
		        document.getElementById("pop_up_success").click()
		        });
		    <?php } ?>
	    </script>
		<script>
			$(document).ready(function() {
	
					$(".move_to").on("click", function () {
						value=$(this).val();
						// alert(value);
						$('#filter_form').attr('action', "<?php echo base_url(); ?>Tagentry?page="+value);
						$("#filter_form").submit();
						e.preventDefault();
					});
				});
		</script>
		<script>
			      $("#kt_datatable_responsive_approved").kendoTooltip({
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
			function tag_non_approve(val)
			{
				var baseurl= $("#baseurl").val();
				//alert(val);
				$.ajax({
				type: "POST",
				url: baseurl+'Tagentry/tagentry_non_approve',
				async: false,
				type: "POST",
				data: "id="+val,
				dataType: "html",
				success: function(response)
				{
				$('#kt_modal_convert_to_non_tag_item').empty().append(response);
				$('#kt_modal_convert_to_non_tag_item').addClass('show');
				//$("#kt_modal_delete_role").css("display", "block");
				}
				});
			}
			function non_approvetag(val)
			{ 
				var baseurl= $("#baseurl").val();
				$.ajax({
				type: "POST",
				url: baseurl+'Tagentry/non_approve',
				async: false,
				data:"field="+val,
				success: function(response)
				{
				window.location.href = baseurl+'Tagentry';
				}
				});
			}
			function closenonApproveModal()
			{
					var baseurl= $("#baseurl").val();
					$('#kt_modal_delete_company').removeClass('show');
					$('.modal-backdrop').removeClass('show');
					window.location.href = baseurl+'Tagentry';
			}
		</script>
		<script>

			      $("#kt_datatable_responsive_not_approved").kendoTooltip({
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
			$("#add_tagentry_date").flatpickr({
				dateFormat: "d-m-Y",});
		</script>
		<script>
			$("#add_tagentry_table").DataTable({
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
			$('#add_tagentry_table').wrap('<div class="dataTables_scroll" />');
		</script>
		<!-- tagged day fillter start -->
		<script>
			function date_fill()
			{
				var dt_fill = document.getElementById('dt_fill').value;
				var today_dt = document.getElementById('today_dt');
				var week_from_dt = document.getElementById('week_from_dt');
				var week_to_dt = document.getElementById('week_to_dt');
				var monthly_dt = document.getElementById('monthly_dt');
				var from_dt = document.getElementById('from_dt');
				var to_dt = document.getElementById('to_dt');
				var from_date_fillter = document.getElementById('from_date_fillter');
				var to_date_fillter = document.getElementById('to_date_fillter');

				if (dt_fill == "today") 
				{
					today_dt.style.display = "block";
					monthly_dt.style.display = "none";
					from_dt.style.display = "none";
					to_dt.style.display = "none";
					week_from_dt.style.display = "none";
					week_to_dt.style.display = "none";
					$("#today_date_fillter").flatpickr({
								dateFormat: "d-m-Y",
							});
				}
				else if (dt_fill == "week")
				{
					today_dt.style.display = "none";
					week_from_dt.style.display = "block";
					week_to_dt.style.display = "block";
					monthly_dt.style.display = "none";
					from_dt.style.display = "none";
					to_dt.style.display = "none";

					var curr = new Date; // get current date
					var first = curr.getDate() - curr.getDay(); // First day is the day of the month - the day of the week
					var last = first + 6; // last day is the first day + 6

					var firstday = new Date(curr.setDate(first)).toISOString().slice(0,10);
					firstday = firstday.split("-").reverse().join("-");
					var lastday = new Date(curr.setDate(last)).toISOString().slice(0,10);
					lastday = lastday.split("-").reverse().join("-");
					$('#week_from_date_fillter').val(firstday);
					$('#week_to_date_fillter').val(lastday);
					
				}
				else if (dt_fill == "monthly")
				{
					today_dt.style.display = "none";
					monthly_dt.style.display = "block";
					from_dt.style.display = "none";
					to_dt.style.display = "none";
					week_from_dt.style.display = "none";
					week_to_dt.style.display = "none";
					$("#monthly_date_fillter").flatpickr({
								dateFormat: "m-Y",
							});
				}
				else if (dt_fill == "custom Date")
				{
					today_dt.style.display = "none";
					monthly_dt.style.display = "none";
					from_dt.style.display = "block";
					to_dt.style.display = "block";
					week_from_dt.style.display = "none";
					week_to_dt.style.display = "none";

					$("#from_date_fillter").flatpickr({
								dateFormat: "d-m-Y",
							});
					$("#to_date_fillter").flatpickr({
								dateFormat: "d-m-Y",
							});
				}
				else
				{
					today_dt.style.display = "none";
					monthly_dt.style.display = "none";
					from_dt.style.display = "none";
					to_dt.style.display = "none";
					week_from_dt.style.display = "none";
					week_to_dt.style.display = "none";
				}
			}
		</script>
		<script>
			$("#kt_datatable_tagged_entry_list").DataTable({
				
				"responsive": true,
				"paging": false,
				"sorting": false,
				"info": false,
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

	      $("#kt_datatable_tagged_entry_list").kendoTooltip({
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