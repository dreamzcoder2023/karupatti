<?php $this->load->view("common");?>
<style type="text/css">
	.table_tool{
        max-width: 30px !important;
        white-space: nowrap;
        text-overflow: ellipsis;
        overflow: hidden;
      }
      [role="tooltip"]{
        visibility: hidden;
      }

      #stk_his #stk_his_tltip {
		  display: none;
			}
			#stk_his:hover #stk_his_tltip {
			  /*display: block;*/
			  display: flex;
			  justify-content: center !important;
			  align-items: center !important;
			  position: absolute;
			  margin-top: 0.5em;
			  /*margin-left: -4.5em !important;*/
			  color: white;
			  background: black;
			  padding: 3px 13px 3px 10px;
			  border-radius: 5px;
			  font-size: 12px;
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
									<h1 class="d-flex align-items-center text-dark fw-bold my-1 fs-3">Stock History
									<!--begin::Separator-->
									<span class="h-20px border-gray-400 border-start ms-3 mx-2"></span>
									<label class="d-flex align-items-center text-primary fw-bold my-1 fs-5">
										<span>Type&emsp;-</span>
										<span>&emsp;<?php if($type==''){ echo "All"; }else{ echo $type; } ?></span>
									</label>
									<span class="h-20px border-gray-400 border-start ms-3 mx-2"></span>
									<label class="d-flex align-items-center text-primary fw-bold my-1 fs-5">
										<span>Date &emsp;-</span>
										<span>&emsp;<?php if($dt_fill==''){ echo "All"; }else{ echo ucfirst($dt_fill); } ?></span>
									</label>
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
										<!--begin::Card title-->
										<div class="row">
											<div class="col-lg-8">
												<div class="row">
													<div class="col-lg-4">
														<div class="text-center">

															<label class="form-label fs-3 fw-bold">Category</label>
														</div>
														<div class="text-center">
															<label class="text-success fs-2 fw-bold"><?php echo $get_cat_name?$get_cat_name:'-'; ?></label>
														</div>
													</div>
													<div class="col-lg-4">
														<div class="text-center">
															<label class="form-label fs-3 fw-bold">Product</label>
														</div>
														<div class="text-center">
															<label class="text-success fs-2 fw-bold" id="stk_his"><?php 

																	$prdname = $prd_name?$prd_name:'-';
																			 	if (strlen($prdname) > 22) {
																                $productname = substr($prdname, 0, 22) ."...";
																            	}else{ $productname = $prdname; } 	
															 ?>

																 <label class="text-success fs-4 fw-bold"><?php echo $productname; ?></label>
																<?php if (strlen($prdname) > 22) { ?>
																	<span id="stk_his_tltip"><?php echo $prdname; ?></span>
																<?php } ?>

															</label>
														</div>
													</div>
													<div class="col-lg-4">
														<div class="text-center">
															<label class="form-label fs-3 fw-bold">Weight</label>
														</div>
														<div class="text-center">
															<label class="text-success fs-2 fw-bold"><?php echo $prd_weight.' gram'; ?></label>
														</div>
													</div>
												</div>
											</div>
											<div class="col-lg-4">
												<div class="d-flex justify-content-end"
													data-kt-user-table-toolbar="base">
													<!--begin::Filter-->
													<button type="button"
														class="btn btn-sm btn-outline btn-outline-solid btn-outline-warning btn-active-light-primary me-3" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Filter
													</button>
													<div class="menu menu-sub menu-sub-dropdown w-300px w-md-325px" data-kt-menu="true">
														<div class="px-7 py-5" data-kt-user-table-filter="form">
															<form method="POST" action="<?php echo base_url(); ?>Aksstock/stock_history/<?php echo $prds_id; ?>" id="fill_form">	
																<div class="scroll-y mh-325px my-1 px-1">
																	<div class="mb-2">
																		<label class="form-label fs-6 fw-semibold">Type</label>
																		<select class="form-select form-select-solid"
																			data-control="select2" id="stk_type" name="stk_type" >
																			<option value="" selected>All</option>
																			<option <?php if ($type=='Purchase'){echo'selected';}?> value="Purchase">Purchase</option>
																			<option <?php if ($type=='Purchase Production'){echo'selected';}?> value="Purchase Production">Purchase Production</option>
																			<option value="Sale" <?php if ($type=='Sale'){echo'selected';}?>>Sale</option>
																			<option value="Adjust" <?php if ($type=='Adjust'){echo'selected';}?>>Adjust</option>
																			<option <?php if ($type=='Purchase Deleted'){echo'selected';}?> value="Purchase Deleted">Purchase Deleted</option>
																			<option <?php if ($type=='Sale Deleted'){echo'selected';}?> value="Sale Deleted">Sale Deleted</option> 																			
																		</select>
																	</div>
																	<div class="mb-2">
																		<label class="form-label">Date</label>
																		<select class="form-select form-select-solid" data-control="select2" data-hide-search="true" name="dt_fill_stk_list" id="dt_fill_stk_list" onchange="date_fill_stk_list();">	
																			<option value="">All</option>
																			<option value="today" <?php if($dt_fill=="today"){ echo "selected"; } ?>>Today</option>
																			<option value="week"<?php if($dt_fill=="week"){ echo "selected"; } ?>>This Week</option>
																			<option value="monthly"<?php if($dt_fill=="monthly"){ echo "selected"; } ?>>This Month</option>
																			<option value="custom Date"  <?php if($dt_fill=="custom Date"){ echo "selected"; } ?>>Custom Date</option>
																		</select>
																	</div>
																	<div class="mb-2 fv-row" id="today_dt_stk_list" style="display:none;">
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
																			<input class="form-control form-control-solid ps-12" name="today_date_fillter" placeholder="Date" id="today_date_fillter" value="<?php echo date("d-m-Y"); ?>" disabled />
																		</div>
																	</div>
																	<div class="mb-2 fv-row" id="week_from_dt_stk_list" style="display:none;">
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
																			<input class="form-control form-control-solid ps-12" name="" placeholder="Date" id="week_from_date_fillter_stk_list" value="" disabled />
																		</div>
																	</div>
																	<div class="mb-2 fv-row" id="week_to_dt_stk_list" style="display:none;">
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
																			<input class="form-control form-control-solid ps-12" name="" placeholder="Date" id="week_to_date_fillter_stk_list" value="<?php echo date("d-m-Y"); ?>" disabled />
																		</div>
																	</div>
																	<div class="mb-2 fv-row" id="monthly_dt_stk_list" style="display:none;">
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
																			<input class="form-control form-control-solid ps-12" name="monthly_date_fillter_stk_list" placeholder="Month" id="monthly_date_fillter_stk_list" value="<?php echo date("m-Y"); ?>" />
																		</div>
																	</div>
																	<div class="mb-2 fv-row" id="from_dt_stk_list" style="display:none;">
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
																			<input class="form-control form-control-solid ps-12" name="from_date_fillter_stk_list" placeholder="From Date" id="from_date_fillter_stk_list" value="<?php echo date("d-m-Y"); ?>" />
																		</div>
																	</div>
																	<div class="mb-2 fv-row" id="to_dt_stk_list" style="display:none;">
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
																			<input class="form-control form-control-solid ps-12" name="to_date_fillter_stk_list" placeholder="To Date" id="to_date_fillter_stk_list" value="<?php echo date("d-m-Y"); ?>"/>
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
													<button type="button"class="btn btn-sm btn-outline btn-outline-solid btn-outline-warning btn-active-light-primary me-3" onclick="export_history()">Export</button>
													<br>
												</div>	
											</div>
										</div>
										<!--end::Card title-->
										<div class="row mt-15"></div>
									     <!--begin::Table-->

											<table id="aks_stk_table" class="table align-middle table-row-dashed table-striped table-hover fs-7 gy-1 gs-2 dataTable no-footer">
												<thead>
												  <tr class="text-start text-muted fw-bold fs-7 gs-0">
														<th class="min-w-25px">Sno</th>
														<th class="min-w-50px">Date</th>
														
														<th class="min-w-150px">Type</th>
														<th class="min-w-50px">Status</th>
														<th class="min-w-50px">Current Qty (gms)</th>
														<th class="min-w-50px">Count (gms)</th>
														<th class="min-w-50px">Balance Qty (gms)</th>
													</tr>
												   </tr>    
												</thead>
												<tbody class="text-gray-600 fw-semibold" >

													<?php if(isset($stk_list)){ foreach($stk_list as $i=> $slist){ $date=date('d-m-Y',strtotime($slist['stk_date']));?>
													<tr>

														
														<td><?php echo $i+1; ?></td> 
														<td>
															<?php 
																	 // $date_format  = $this->db->query("SELECT * FROM general_settings ")->row();
                                   // $format= $date_format->date_format;
                                   // echo date("$format", strtotime($date));

                                   $c_date = date_format(date_create($slist["created_on"]),'d-M-Y');
									                 $c_time = date_format(date_create($slist["created_on"]),'H:i');

									                 $cr_time     = date("h:i A", strtotime($c_time));
									                 $billed_date = $c_date.' & '.$cr_time;

									                 echo $billed_date;
                            	?>
                            </td>
													
														<td class="table_tool">

															<?php if (isset($slist['bill_no'])){?>

																<i class="fa fa-copy fs-4" title="Copy Bill No" style="cursor: pointer;" onclick="copiedclipboardagno('<?php echo $slist['bill_no'];?>', '<?php echo $i; ?>');"></i>					
															<span style="display: none;" class="ms-2 tooltipcopie" id="tooltipcopie<?php echo $i;?>"></span>
																
															<?php } ?>

															<!-- sale -->
															<?php  if ($slist['stk_type']=='Sale'){ ?>														

																<?php echo $slist['stk_type'].'<br>'.$slist['bill_no'];?>
															<?php } ?>
															<?php  if ($slist['stk_type']=='Sale Updated'){ ?>
															<?php echo $slist['stk_type'].'<br>'.$slist['bill_no'].'<br> By &nbsp; : '.ucfirst($slist['created_by']);?>
															<?php } ?>
															<?php  if ($slist['stk_type']=='Sale Deleted'){ ?>
															<?php echo $slist['stk_type'].'<br>'.$slist['bill_no'].'<br> By &nbsp; : '.ucfirst($slist['created_by']);?>
															<?php } ?>

															<!-- purchase -->
															<?php if ($slist['stk_type']=='Purchase' || $slist['stk_type']=='Purchase Production' || $slist['stk_type']=='Purchase Deleted'){ ?>

																<?php
																 $id = $slist['bill_no'] ? $slist['bill_no']:'';

																 $get_pur= $this->db->select('*')->from('AKS_PURCHASE_ENTRY')->where('pur_id',$id)->get()->row();
																 $supplier = $get_pur?$get_pur->pur_sup:'-';
																 ?>
																<?php echo $slist['stk_type'].'<br>'.'['.$supplier.'] - '.$slist['bill_no'];?>
															<?php } ?>
															<!-- adjust -->
															<?php if ($slist['stk_type']=='Adjust'){ 
																if ($slist['stk_desc']!='') {
																	$desc = '<br> Des : <span class="">'.ucfirst($slist['stk_desc']).'<span>';
																}else{
																	$desc = '<br> Des :  -';
																}


															?>

															<?php echo $slist['stk_type'].'<br> By &nbsp; : '.ucfirst($slist['modified_by']).$desc;?>
															<?php } ?>

														</td>
														<td>
															<?php if($slist['stk_status'] =='IN'){ ?>
																<label class="col-form-label fw-semibold fs-7" >
																<span style="background-color:#B6BD4F;border-radius: 8px;padding: 5px 15px 5px 15px;">IN</span>
															</label>
														
														<?php }else{ ?>


														<?php if($slist['stk_status'] =='OUT'){ ?>
														<label class="col-form-label fw-semibold fs-7" ><span style="background-color:#46dcf9;border-radius: 8px;padding: 5px 10px 5px 10px;">OUT</span>
															</label>
														<?php  }  } ?>												



														</td>
														<td><?php echo $slist['stk_cur_qty'].' g';?></td>
														<td><?php echo $slist['stk_count'].' g';?></td>

														<td><?php echo $slist['stk_bal_qty'].' g';?></td>
													</tr>
													
												
													<?php $i++; } }?>
												</tbody>
											</table>
											<?php 
												$coun = ceil( $count/50);
												$c_page = isset($_GET['page']) ? $_GET['page'] : 1;
											?>
											<?php
												function get_paging_info1($tot_rows,$pp,$curr_page)
												{
													$pages = ceil($tot_rows / $pp); // calc pages

													$data = array(); // start out array
													$data['si']        = ($curr_page * $pp) - $pp; // what row to start at
													$data['pages']     = $pages;                   // add the pages
													$data['curr_page'] = $curr_page;               // Whats the current page
													$paging_info['curr_url'] = "http://eibs.elysiumproduct.com/";

													return $data; //return the paging data

												}?>
											<?php $paging_info = get_paging_info1($count,50,$c_page); ?>

														<form   method="POST" id="filter_form" action="" enctype="multipart/form-data" >
															
															 <input type="hidden" id="dt_fill_stk_list" name="dt_fill_stk_list"  value="<?php echo $dt_fill; ?>">

															<input type="hidden" id="from_date_fillter_stk_list" name="from_date_fillter_stk_list" value="<?php echo $from_date_fillter; ?>">

															<input type="hidden" id="to_date_fillter_stk_list" name="to_date_fillter_stk_list" value="<?php echo $to_date_fillter; ?>">

															<input type="hidden" id="stk_type" name="stk_type"  value="<?php echo $type; ?>">

															
															
															
														<ul class="pagination" style="float:right;" >
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
																$sp = $paging_info['curr_page']  - floor($max/2);
														?>

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

																<li class='paginate_button page-item active move_to' value="<?php echo $i; ?>"> <a aria-controls='kt_roles_view_table' data-dt-idx='1' tabindex='0' onclick="form_submit()" class='page-link cursor-pointer text-hover-dark'  
																title='Page <?php echo $i; ?>'><?php echo $i; ?></a></li>

															<?php else : ?>

															<li class='paginate_button page-item move_to ' value="<?php echo $i; ?>"> <a aria-controls='kt_roles_view_table' data-dt-idx='1' tabindex='0' onclick="form_submit()" class='page-link cursor-pointer'  title='Page <?php echo $i; ?>'><?php echo $i; ?></a></li>

															<?php endif; ?>

														<?php endfor; ?>
														<!-- If the current page is less than say the last page minus $max pages divided by 2-->
														<?php if($paging_info['curr_page'] < ($paging_info['pages'] - floor($max / 2))) : ?>

															..
															<li class='paginate_button page-item  move_to' value="<?php echo $paging_info['pages']; ?>"><a  aria-controls='kt_roles_view_table' data-dt-idx='1' tabindex='0' onclick="submit()" class='page-link cursor-pointer'   title='Page <?php echo $paging_info['pages']; ?>'><?php echo $paging_info['pages']; ?></a></li>

														<?php endif; ?>

														<!-- Show last two pages if we're not near them -->
														<?php if($paging_info['curr_page'] < $paging_info['pages']) : ?>

															<li class='paginate_button page-item move_to ' value="<?php echo ($paging_info['curr_page'] + 1); ?>"> <a aria-controls='kt_roles_view_table' data-dt-idx='1' tabindex='0' onclick="submit()" class='page-link cursor-pointer'  title='Page <?php echo ($paging_info['curr_page'] + 1); ?>'>></a></li>

														

														<?php endif; ?>
														</ul>
														</form>
														

										<!--end::Card body-->
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
				</div>	
				<?php $this->load->view("footer");?>
				<!--end::Wrapper-->
			</div>
			<!--end::Page-->
		</div>

<!--begin::Modal - delete Products-->
	<div class="modal fade" id="kt_modal_delete_aks_products" tabindex="-1" aria-hidden="true">
		<!--begin::Modal dialog-->
		<div class="modal-dialog modal-m">
			<!--begin::Modal content-->
			<div class="modal-content rounded">
				<div class="swal2-icon swal2-warning swal2-icon-show" style="display: flex;">
					<div class="swal2-icon-content">!</div></div>
					<div class="swal2-html-container" id="swal2-html-container" style="display: block;">Are you sure you want to delete?</div>
					<div class="d-flex flex-center flex-row-fluid pt-12">
						<button type="submit" class="btn btn-danger me-3" data-bs-dismiss="modal">Yes</button>
						<button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
					</div><br><br>
			</div>
			<!--end::Modal content-->
		</div>
		<!--end::Modal dialog-->
	</div>
<!--end::Modal - delete Products-->
	<input type="hidden" id="baseurl" value="<?php echo base_url();?>">
		<?php $this->load->view("script");?>

		<script type="text/javascript">
			
			function export_history() {

			    var value = <?php echo $exportstockhistory?$exportstockhistory:''; ?>;
			    var values = [];
			    // console.log(value[0]);
			    value.map((data, i) => {
			    	var bill_no = data.bill_no;
					if (bill_no == 'null' || bill_no == ''){
					    bill_no = '';
					}


			    		if (data.stk_type=='Sale') {

							var type = data.stk_type+' - '+bill_no;
						}					

						if (data.stk_type=='Purchase' || data.stk_type=='Purchase Deleted') {

							var type = data.stk_type+' - '+bill_no;
						}
						if (data.stk_type=='Adjust') {

							var type = data.stk_type+' By : '+data.modified_by + ' Desc : ' + data.stk_desc;
						}


			    	var dat = new Date(data.stk_date); 
					var dateFormat = dat.getDate() + "-" + (dat.getMonth()+1) + "-" + dat.getFullYear();	
					var prdname = "<?php echo $prd_name; ?>";	

			        values.push({
			            'Sl.No': i + 1,
			            'Date': dateFormat,
			            'Product Name': prdname,
			            'Current Qty (gms)': data.stk_cur_qty+' g',
			            'Type': type,
			            'Status': data.stk_status,
			            'Stock Count (gms)': data.stk_count+' g',
			            'Balance Stock (gms)': data.stk_bal_qty+' g'
			        });
			    });
			   	
			   	var prdname  = "<?php echo $prd_name; ?>";
				var filename = 'AksProduct' + prdname + 'StockHistoryList.xlsx';

			    var ws = XLSX.utils.json_to_sheet(values);
			    var wb = XLSX.utils.book_new();

			    XLSX.utils.book_append_sheet(wb, ws, "Sheet1");

			    XLSX.writeFile(wb, filename);
			}
		</script>
		<!-- <script src="js/products-list.js"></script> -->
		<script>
			function reset_fill(){

				$('#dt_fill_stk_list').val('');
				$('#stk_type').val(''); 
				$('#fill_form').submit();
			}

		</script>



		<script>

		$(document).ready(function() {
			
			$(".move_to").on("click", function () {
				value=$(this).val();
				// alert(value);
				$('#filter_form').attr('action', "<?php echo base_url(); ?>Aksstock/stock_history/<?php echo $prds_id; ?>?page="+value);
				$("#filter_form").submit();
				e.preventDefault();
			});
		});
		</script>
		<script>
	      $("#aks_stk_table").kendoTooltip({
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
			      });
			$("#aks_stk_table").DataTable({
				    "sorting":false,
				    // "info":true,
				    "responsive": true,
				    "lengthMenu": [[10, 25, 50], [10, 25, 50]],
				    "pageLength": 50,
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
				        ">"
				});
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

		</script>
		<script>
			function date_fill_stk_list()
			{
				var dt_fill_stk_list = document.getElementById('dt_fill_stk_list').value;
				var today_dt_stk_list = document.getElementById('today_dt_stk_list');
				var week_from_dt_stk_list = document.getElementById('week_from_dt_stk_list');
				var week_to_dt_stk_list = document.getElementById('week_to_dt_stk_list');
				var monthly_dt_stk_list = document.getElementById('monthly_dt_stk_list');
				var from_dt_stk_list = document.getElementById('from_dt_stk_list');
				var to_dt_stk_list = document.getElementById('to_dt_stk_list');
				var from_date_fillter_stk_list = document.getElementById('from_date_fillter_stk_list');
				var to_date_fillter_stk_list = document.getElementById('to_date_fillter_stk_list');

				if (dt_fill_stk_list == "today") 
				{
					today_dt_stk_list.style.display = "block";
					monthly_dt_stk_list.style.display = "none";
					from_dt_stk_list.style.display = "none";
					to_dt_stk_list.style.display = "none";
					week_from_dt_stk_list.style.display = "none";
					week_to_dt_stk_list.style.display = "none";
					$("#today_date_fillter").flatpickr({
								dateFormat: "d-m-Y",
							});
				}
				else if (dt_fill_stk_list == "week")
				{
					today_dt_stk_list.style.display = "none";
					week_from_dt_stk_list.style.display = "block";
					week_to_dt_stk_list.style.display = "block";
					monthly_dt_stk_list.style.display = "none";
					from_dt_stk_list.style.display = "none";
					to_dt_stk_list.style.display = "none";

					var curr = new Date; // get current date
					var first = curr.getDate() - curr.getDay(); // First day is the day of the month - the day of the week
					var last = first + 6; // last day is the first day + 6

					var firstday = new Date(curr.setDate(first)).toISOString().slice(0,10);
					firstday = firstday.split("-").reverse().join("-");
					var lastday = new Date(curr.setDate(last)).toISOString().slice(0,10);
					lastday = lastday.split("-").reverse().join("-");
					$('#week_from_date_fillter_stk_list').val(firstday);
					$('#week_to_date_fillter_stk_list').val(lastday);
					
				}
				else if (dt_fill_stk_list == "monthly")
				{
					today_dt_stk_list.style.display = "none";
					monthly_dt_stk_list.style.display = "block";
					from_dt_stk_list.style.display = "none";
					to_dt_stk_list.style.display = "none";
					week_from_dt_stk_list.style.display = "none";
					week_to_dt_stk_list.style.display = "none";
					$("#monthly_date_fillter_stk_list").flatpickr({
								dateFormat: "m-Y",
							});
				}
				else if (dt_fill_stk_list == "custom Date")
				{
					today_dt_stk_list.style.display = "none";
					monthly_dt_stk_list.style.display = "none";
					from_dt_stk_list.style.display = "block";
					to_dt_stk_list.style.display = "block";
					week_from_dt_stk_list.style.display = "none";
					week_to_dt_stk_list.style.display = "none";

					$("#from_date_fillter_stk_list").flatpickr({
								dateFormat: "d-m-Y",
							});
					$("#to_date_fillter_stk_list").flatpickr({
								dateFormat: "d-m-Y",
							});
				}
				else
				{
					today_dt_stk_list.style.display = "none";
					monthly_dt_stk_list.style.display = "none";
					from_dt_stk_list.style.display = "none";
					to_dt_stk_list.style.display = "none";
					week_from_dt_stk_list.style.display = "none";
					week_to_dt_stk_list.style.display = "none";
				}
			}
		</script>
		
		
	</body>
	<!--end::Body-->
</html>