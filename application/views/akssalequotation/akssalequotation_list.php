
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
	.dataTables_scroll_aks_pos_print_history
    {
        position: relative;
        overflow: auto;
        max-height: 218px;/*the maximum height you want to achieve*/
        width: 100%;
    }
  .dataTables_scroll_aks_pos_print_history thead{
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
									<h1 class="d-flex align-items-center text-dark fw-bold my-1 fs-3">Sales Quotation List
										<!--begin::Separator-->
										<span class="h-20px border-gray-400 border-start ms-3 mx-2"></span>
										<label class="d-flex align-items-center text-primary fw-bold my-1 fs-5">
											<span>Date &emsp;-</span>
											<span>&emsp;<?php if($dt_fill==''){ echo "All"; }else{ echo ucfirst($dt_fill); } ?></span>
										</label>
										<!--end::Description-->
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
									<!-- Flash Data::Start -->
						     		<?php if($this->session->flashdata('g_success')){?>
					            	<div class="menu-item px-3">
					                    <a href="javascript:;" id="pop_up_success" class="menu-link flex-stack px-3" data-bs-toggle="modal" data-bs-target="#success_modal"></a>
					                </div>
					            		 <?php } ?>
					             <?php if($this->session->flashdata('g_err')){?>
					                    <div class="menu-item px-3">
					           			 <a href="javascript:;" id="pop_up_success" class="menu-link flex-stack px-3" data-bs-toggle="modal" data-bs-target="#error_modal"></a>
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
									<!-- Flash Data::End -->
									<?php if(isset($_SESSION['Karupatti SaleView'])){ if($_SESSION['Karupatti SaleView']==1){?>
									<!--begin::Tables Widget 9-->
									<div class="card card-xxl-stretch mb-5 mb-xl-8">
										<!--begin::Card body-->
										<div class="card-body py-4">
											<div class="d-flex justify-content-end py-6 px-9">

												<div class="col-lg-8">
													<div class="row">
														<div class="col-lg-6">
															<div class="text-center">
																<label class="form-label fs-3 fw-bold">Sales Quotation</label>
															</div>
															<div class="text-center">
																<label class="text-success fs-2 fw-bold"><?php echo str_pad($quotationcount?$quotationcount:0, 2, '0', STR_PAD_LEFT);  ?></label>
															</div>
														</div>
														<div class="col-lg-6">
															<div class="text-center">
																<label class="form-label fs-3 fw-bold">Converted Sales</label>
															</div>
															<div class="text-center">
																<label class="text-success fs-2 fw-bold"><?php echo str_pad($salescount?$salescount:0, 2, '0', STR_PAD_LEFT);  ?></label>
															</div>
														</div>
													</div>
												</div>											
											<div class="col-lg-4">
												<div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">													
													<!--begin::Filter-->
													<button type="button"
														class="btn btn-sm btn-outline btn-outline-solid btn-outline-warning btn-active-light-primary me-3" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Filter
													</button>
													<div class="menu menu-sub menu-sub-dropdown w-300px w-md-325px" data-kt-menu="true">
														<div class="px-7 py-5" data-kt-user-table-filter="form">
															<div class="scroll-y mh-325px my-1 px-1">
																<form method="POST" id="fill_form" action="<?php echo base_url(); ?>Akssalequotation">	
																	<div class="mb-2">
																		<label class="form-label">Date</label>
																		<select class="form-select form-select-solid" data-control="select2" data-hide-search="true" name="dt_fill_sale_list" id="dt_fill_sale_list" onchange="date_fill_sale_list();">
																			<option value="all">All</option>
																			<option value="today" <?php if($dt_fill=="today"){ echo "selected"; } ?>>Today</option>
																			<option value="week"<?php if($dt_fill=="week"){ echo "selected"; } ?>>This Week</option>
																			<option value="monthly"<?php if($dt_fill=="monthly"){ echo "selected"; }?>>This Month</option>
																			<option value="custom Date"<?php if($dt_fill=="custom Date"){ echo "selected"; } ?>>Custom Date</option>
																		</select>
																	</div>
																	<div class="mb-2 fv-row" id="today_dt_nontag_list" style="display:none;">
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
																	<div class="mb-2 fv-row" id="week_from_dt_nontag_list" style="display:none;">
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
																			<input class="form-control form-control-solid ps-12" name="" placeholder="Date" id="week_from_date_fillter_nontag_list" value="" disabled />
																		</div>
																	</div>
																	<div class="mb-2 fv-row" id="week_to_dt_nontag_list" style="display:none;">
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
																			<input class="form-control form-control-solid ps-12" name="" placeholder="Date" id="week_to_date_fillter_nontag_list" value="<?php echo date("d-m-Y"); ?>" disabled />
																		</div>
																	</div>
																	<div class="mb-2 fv-row" id="monthly_dt_nontag_list" style="display:none;">
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
																			<input class="form-control form-control-solid ps-12" name="monthly_date_fillter_nontag_list" placeholder="Month" id="monthly_date_fillter_nontag_list" value="<?php echo date("m-Y"); ?>" />
																		</div>
																	</div>
																	<div class="mb-2 fv-row" id="from_dt_nontag_list" style="display:none;">
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
																			<input class="form-control form-control-solid ps-12" name="from_date_fillter_nontag_list" placeholder="From Date" id="from_date_fillter_nontag_list" value="<?php echo date("d-m-Y"); ?>" />
																		</div>
																	</div>
																	<div class="mb-2 fv-row" id="to_dt_nontag_list" style="display:none;">
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
																			<input class="form-control form-control-solid ps-12" name="to_date_fillter_nontag_list" placeholder="To Date" id="to_date_fillter_nontag_list" value="<?php echo date("d-m-Y"); ?>"/>
																		</div>
																	</div>
																	<div class="d-flex justify-content-end">
																		<button type="reset" class="btn btn-light btn-active-light-primary fw-semibold me-2 px-6" data-kt-menu-dismiss="true" data-kt-user-table-filter="reset" onclick="reset_fill()">Reset</button>
																		<button type="submit" class="btn btn-primary fw-semibold px-6" data-kt-menu-dismiss="true" data-kt-user-table-filter="filter">Apply</button>
																	</div>
																</form>
									       			</div>
								       			</div>
										      </div>	
											    <button type="button"class="btn btn-sm btn-outline btn-outline-solid btn-outline-warning btn-active-light-primary me-3"onclick="export_list()">Export
												 </button>
												<?php if(isset($_SESSION['Karupatti SaleAdd'])){ if($_SESSION['Karupatti SaleAdd']==1){?>
											
												<a href="<?php echo base_url();?>Akssalequotation/akssalequotation_new" target="_blank"> 
												  <button type="button" class="btn btn-primary">New Quotation</button>
											     </a>
											<?php }} ?>
												</div>
											</div>	

										</div>
											<!--begin::Table-->
											<div class="d-flex justify-content-end">												
														<label class=" col-form-label fw-semibold fs-6 me-2">
														<span class="btn btn-icon btn-circle fs-8 fw-bold text-white " style="background:#ec9629;width: 20px !important;height: 20px !important;">P</span> Party</label>
														<label class=" col-form-label fw-semibold fs-6 ">
														<span class="btn btn-icon btn-circle fs-8 fw-bold text-white " style="background:#7239ea;width: 20px !important;height: 20px !important;">S</span> Supplier
														</label>
											</div>
											<form id="full_packing_form" method="post" >
											<table id="sale_table_tooltip" class="table align-middle table-row-dashed table-striped table-hover fs-7 gy-1 gs-2 dataTable no-footer">
												<thead>
												  	<tr class="text-start text-muted fw-bold fs-7 gs-0">
														<th class="min-w-100px">Date</th>
														<th class="min-w-125px">Bill Id</th>
														<th class="min-w-125px">Party / Supplier</th>
														<th class="min-w-70px">Nos</th>
														<th class="min-w-100px">Total Price</th>
														<th class="min-w-100px">Grand Price</th>
														<th class="min-w-125px">Status</th>
														<th class="min-w-150px">Action</th>
													</tr>
													</tr>
												</thead>
												<tbody class="text-gray-600 fw-semibold">
													<?php $i=0;  if(!empty($sale_list)) { $i=0;  foreach($sale_list as  $slist){ ?>

													<tr>
														<td>
															<?php
														     	$date_format  = $this->db->query("SELECT * FROM general_settings ")->row();
															 	 	$format= $date_format->date_format;
															 		echo date("$format", strtotime($slist['sale_date']));
															?>
													  </td>
														<td class="ple1">
															<i class="fa fa-copy fs-4" title="Copy Bill No" style="cursor: pointer;" onclick="copiedclipboardagno('<?php echo $slist['sale_id'];?>', '<?php echo $i; ?>');"></i>
															<span style="display: none;" class="ms-2 tooltipcopie" id="tooltipcopie<?php echo $i;?>"></span>
															<?php echo $slist['sale_id'];?>
															
														</td>
														<td class="ple1"> 
															<?php if ($slist['party_type']!='party') {  
																	        echo '<span class="badge badge-info badge-circle fs-6 badge-sm " title="Supplier"> S</span> '.$slist['sale_party'];} 
														        else{ echo '<span class="badge badge-primary badge-circle fs-6 badge-sm " title="Party"> P</span> '.$slist['sale_party']; }  ?>
															
														</td>
														<td><?php echo $slist['sale_prd_count'];?></td>
														<td align="end">
															<i class="fa-solid fa-indian-rupee-sign fs-7 text-dark"></i>&nbsp;
																<?php $sale_amt = $slist['sale_prd_tot_amt']?$slist['sale_prd_tot_amt']:0; echo number_format($sale_amt,2,'.',',');?> 
														</td>
														<td align="end">
															<i class="fa-solid fa-indian-rupee-sign fs-7 text-dark"></i>&nbsp;
															<?php 

																   $price = $slist['sale_prd_tot_amt'];
																   $gst = 5;
																   $gst_amount = ($gst*$price)/100;
																   $gtotal 	   = $price+$gst_amount;
															?>
															<?php $gst_amt = $gtotal; echo number_format($gst_amt,2,'.',',');?>
														</td>
														<td>
																
															<?php if($slist['status'] =='Y'){ ?>
																<label class="col-form-label fw-semibold fs-7"><span style="background-color:#ffc700;border-radius: 8px;padding: 5px 15px 5px 15px;">Quotation</span>
																</label>
															<?php 	}else{ ?>
																<label class="col-form-label fw-semibold fs-7" name="" id=""><span style="background-color:#46dcf9;border-radius: 8px;padding: 5px 15px 5px 15px;">Sales</span>
																</label>
															<?php 	} ?>

														</td>
														<td >
															<span class="text-end">
																<a href="javascript:;" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm" data-bs-toggle="modal" data-bs-target="#kt_modal_view_sale" onclick="view_sale('<?php echo $slist['sid']; ?>')">
																	<i class="bi bi-eye-fill eyc"></i>
																</a>
																<a href="<?php echo base_url();?>Akssalequotation/akssalequotation_edit/<?php echo $slist['sid'];?>" target="_blank" class="menu-link flex-stack px-3">
																	<i class="fa-solid fa-file-pen eyc fs-4"></i>
																</a>
																<a href="<?php echo base_url();?>Akssalequotation/sale_print/<?php echo $slist['sid'];?>" target="_blank" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm"  title="Print Invoice">
																	<i class="fa-solid fa-print eyc fs-5"></i>
																</a>	
																<a href="javascript:;"  data-bs-toggle="modal" data-bs-target="#kt_modal_delete_sale" onclick="delete_sale('<?php echo $slist['sid']; ?>','<?php echo $slist['sale_id']; ?>')"class="menu-link flex-stack px-3">
																	<span class="svg-icon svg-icon-3">
																		<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																			<path d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z" fill="currentColor"></path>
																			<path opacity="0.5" d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z" fill="currentColor"></path>
																			<path opacity="0.5" d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z" fill="currentColor"></path>
																		</svg>
																	</span>
																</a>
															</span>
													  </td>
													</tr>

												<?php $i++; } }?>
												</tbody>

											</table>
												<input type="hidden" name="sale_count" id="sale_count" value="<?php echo $i?$i:0; ?>">
											</form>
											<div class="row mt-3"></div>
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
															
															 <input type="hidden" id="dt_fill_sale_list" name="dt_fill_sale_list"  value="<?php echo $dt_fill; ?>">

															<input type="hidden" id="from_date_fillter_nontag_list" name="from_date_fillter_nontag_list" value="<?php echo $from_date_fillter; ?>">

															<input type="hidden" id="to_date_fillter_nontag_list" name="to_date_fillter_nontag_list" value="<?php echo $to_date_fillter; ?>">

														
															
															
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

															<li class='paginate_button page-item move_to ' value="<?php echo ($paging_info['curr_page'] + 1); ?>"> <a aria-controls='kt_roles_view_table' data-dt-idx='1' tabindex='0' onclick="submit()" class='page-link cursor-pointer '  title='Page <?php echo ($paging_info['curr_page'] + 1); ?>'>></a></li>

														

														<?php endif; ?>
														</ul>
														</form>
														

										<!--end::Card body-->
									</div>
									<!--end::Tables Widget 9-->
									<?php }}else{?><?php $this->load->view("common_role_permission_err"); ?><?php } ?>
								</div>
								<!--end::Col-->
							</div>
							<!--end::Row-->
						</div>
						<!--end::Container-->
					</div>
					<!--end::Content-->
				
				</div>
				<div class="modal fade" id="kt_modal_delete_sale" tabindex="-1" aria-hidden="true" data-bs-keyboard="false" data-bs-backdrop="static">
						<!--begin::Modal dialog-->
						<div class="modal-dialog modal-m">
							<!--begin::Modal content-->
							<div class="modal-content rounded">
								<div class="swal2-icon swal2-warning swal2-icon-show" style="display:flex;">
									<div class="swal2-icon-content">?</div></div>
									<div class="swal2-html-container" id="swal2-html-container" style="display: block;">Are you sure you want to Delete This <b><span id="del_saleid"></span></b> Quotation ?</div>
									<div class="d-flex flex-center flex-row-fluid pt-12">
										<input type="hidden" name="del_id" id="del_id">
										<button type="submit" class="btn btn-primary me-3" id="delsubmit">Confirm</button>
										<button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
									</div><br><br>
							</div>
							<!--end::Modal content-->
						</div>
						<!--end::Modal dialog-->
					</div>
				<?php $this->load->view("footer");?>
				
				<!--end::Wrapper-->
			</div>
			<!--end::Page-->
		</div>



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
					<div class="mb-6 text-center">
						<h1>View Sales Quotation</h1>	
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
									<label class="col-lg-2 col-form-label fw-semibold fs-6">Grand&nbsp;Amount</label>
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
									<label class="fw-bold fs-5">Net Amount</label>
									<label class="d-block fw-bold fs-5">
										<sapn id="net_amount1"></sapn>
									</label>
								</div>								
								<div class="col-lg-3 col-form-label text-center">
									<label class="fw-bold fs-5">Discount</label>
									<label class="d-block fw-bold fs-5">
										<sapn id="discount"></sapn>
									</label>
								</div>
								<div class="col-lg-3 col-form-label text-center">
									<label class="fw-bold fs-5">Total Price</label>
									<label class="d-block fw-bold fs-5">
										<span id="total_amount"></span>
									</label>
								</div>
								<div class="col-lg-3 col-form-label text-center">
									<label class="fw-bold fs-5">Grand Price</label>
									<label class="d-block fw-bold fs-5">
										<span id="grand_amount"></span>
									</label>
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
									<label class="col-lg-12 col-form-label fw-semibold fs-6 mb-1 py-0">Address</label>
									<label class="col-lg-12 fw-bold fs-5 px-6" id="party_address_get"></label>
									<!-- <label class="col-lg-12 col-form-label fw-semibold fs-6 mt-3 mb-1 py-0">Shipping Address</label> -->
									<!-- <label class="col-lg-12 fw-bold fs-5 px-6" id="party_ship_address_get"></label> -->
								</div>
								<div class="col-lg-12 col-form-label">
									<label class="col-lg-12 col-form-label fw-semibold fs-6 mb-1 py-0">Remarks</label>
									<div class="scroll-y mh-80px my-3 fw-bold fs-5"><span id="remarks_get"></span></div>
								</div>
							</div>
					    </div>
					</div>
				</div>
				<!--end::Modal body-->
			</div>
			<!--end::Modal content-->
		</div>
		<!--end::Modal dialog-->
	</div>
	<!-- script :: beign -->
	<input type="hidden" id="baseurl" value="<?php echo base_url();?>">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<?php $this->load->view("script");?>

		<script> 

			var baseurl= $("#baseurl").val();
						function delete_sale(id,sale_id) {

							// to delete
							if (id>0) {
								$('#del_id').val(id);
								$('#del_saleid').html(sale_id);
							}

						}

			// delete ajax
				$(document).ready(function() {
				  $("#delsubmit").click(function() {
				    var del_id = $('#del_id').val();
				    var sale_id = $('#del_saleid').html();
				    if (del_id!='') {
					    $.ajax({
							type: "POST",
							url: baseurl+'Akssalequotation/delete',
							async: false,
							type: "POST",
							data: "id="+del_id+"&saleid="+sale_id,
							dataType: "html",
							success: function(response)
							{
									

								if (response) {

									location.reload();
								}
								
									
								
							}
						});
					}

				  });
				});

		</script>

		
		<script type="text/javascript">
			
			function export_list() {
			    var value = <?php echo $exportquotation; ?>;
			    var values = [];
			    console.log(value[0]);
			    value.map((data, i) => {
			       var dat = new Date(data.sale_date); 
							var dateFormat = dat.getDate() + "-" + (dat.getMonth()+1) + "-" + dat.getFullYear();
							var price = data.sale_net_amt; // Replace with your original price
							var gstamt = (data.sale_net_amt * 5) / 100;
							var grandprice = parseFloat(price + gstamt);
							var pricetot   = parseFloat(price);

							var prices = parseFloat(pricetot).toLocaleString('en-IN', {
														    maximumFractionDigits: 2,
														    style: 'currency',
														    currency: 'INR'
														});
							var grandtotal = parseFloat(grandprice).toLocaleString('en-IN', {
														    maximumFractionDigits: 2,
														    style: 'currency',
														    currency: 'INR'
														});

			        values.push({
			            'Sl.No': i + 1,
			            'Date': dateFormat,
			            'Bill ID': data.sale_id,
			            'Party Name': data.sale_party,
			            'Nos': data.sale_prd_count,
			            'Total Price': prices,
			            'Grand Total': grandtotal
			        });
			    });

			    var filename = 'AksSaleQuotationList.xlsx';
			    var ws = XLSX.utils.json_to_sheet(values);
			    var wb = XLSX.utils.book_new();

			    XLSX.utils.book_append_sheet(wb, ws, "Sheet1");

			    XLSX.writeFile(wb, filename);
			}


		</script>
		<script>
			function reset_fill(){

				$('#dt_fill_sale_list').val('');
				$('#fill_form').submit();
			}

		</script>
		<script>
	     
	      $("#sale_table_tooltip").kendoTooltip({
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
	      $("#sale_table_tooltip").DataTable({
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
				$('#filter_form').attr('action', "<?php echo base_url(); ?>Akssalequotation?page="+value);
				$("#filter_form").submit();
				e.preventDefault();
			});
		});
		</script>
		<script>
		function sales_print(val)
		{
			var baseurl= $("#baseurl").val();
			var val =$("#sid_hidden")
			// alert(baseurl);
			// alert(val);	
			$.ajax(
			{
				type: "POST",
				url: baseurl+'Akssalequotation/sale_print',
				async: false,
				type: "POST",
				data: "id="+val,
				dataType: "html",
				success: function(response)
				{
				
				}
			});
		}
		</script>
		<script>
			function view_sale(val)
			{
				var baseurl= $("#baseurl").val();
				// alert(baseurl);
				// alert(val);
				$.ajax({
				type: "GET",
				url: baseurl+'Akssalequotation/sales_view',
				async: false,
				type: "GET",
				data: "id="+val,
				dataType: "json",
				success: function(response)
				{
					var dat = new Date(response.sale_date); 
					var dateFormat = dat.getDate() + "-" + (dat.getMonth()+1) + "-" + dat.getFullYear();
					$('#sale_date').html(dateFormat);
					$('#sale_id').html(response.sale_id);
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

					$('#net_amount').html(net_amt);

					var tot_amt = response.sale_prd_tot_amt.toLocaleString('en-IN', {
						    maximumFractionDigits: 2,
						    style: 'currency',
						    currency: 'INR'
						});


					var net_price = netPrice.toLocaleString('en-IN', {
						    maximumFractionDigits: 2,
						    style: 'currency',
						    currency: 'INR'
						});

					$('#total_amount').html(net_price);
					$('#grand_amount').html(net_amt);

					// var del_char = response.shipment_charges.toLocaleString('en-IN', {
					// 	    maximumFractionDigits: 2,
					// 	    style: 'currency',
					// 	    currency: 'INR'
					// 	});
					// $('#deliver_charge').html(del_char);
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

					$('#net_amount1').html(tot_amt);
					// var sale_cash1 = response.sale_dis_amt.toLocaleString('en-IN', {
					// 	    maximumFractionDigits: 2,
					// 	    style: 'currency',
					// 	    currency: 'INR'
					// 	});
					// $('#cash_amount').html(sale_cash);
					// var sale_cash = response.sale_cash.toLocaleString('en-IN', {
					// 	    maximumFractionDigits: 2,
					// 	    style: 'currency',
					// 	    currency: 'INR'
					// 	});
					// $('#paid_amount').html(sale_cash);
					// var balance_cash = response.balance_cash.toLocaleString('en-IN', {
					// 	    maximumFractionDigits: 2,
					// 	    style: 'currency',
					// 	    currency: 'INR'
					// 	});
					
					// $('#balance_amount').html(balance_cash);
					
					// $('#remarks_get').html(response.remarks);

					if (response.remarks) {
						$('#remarks_get').html(response.remarks);
					}else{
						$('#remarks_get').html('-');
					}

					if(response.party_type=='party'){

						$.ajax({
						type: "GET",
							url: baseurl+'Akssalequotation/aks_party_details',
							async: false,
							type: "POST",
							data: "id="+val,
							dataType: "html",
							success: function(response)
							{
									
									// alert(response)

								  var res=response.split('||');

										$("#party_name_view").html(res[0]);						  
										$("#party_address_get").html(res[2]);
										// $("#party_ship_address_get").html(res[3]);
										$("#party_mobile").html(res[3]);

										let etext = res[4];

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
					}else{

							$.ajax({
							type: "GET",
							url: baseurl+'Akssalequotation/aks_party_supplier_details',
							async: false,
							type: "POST",
							data: "id="+val,
							dataType: "html",
							success: function(response)
							{
									
									// alert(response)

								// const str = "Ashok~L10039";
								// const wordsAfterTilde = str.split("~")[1].substring(1);
								// console.log(wordsAfterTilde); // Output: L10039


								  var res=response.split('||');

										$("#party_name_view").html(res[0]);						  
										$("#party_address_get").html(res[2]);
										// $("#party_ship_address_get").html(res[3]);
										$("#party_mobile").html(res[3]);

										let etext = res[4];

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

					}
					// $('#del_by').val(response.delivery_by);
				}
			});

				
				var baseurl= $("#baseurl").val();
				// alert(baseurl);
				$.ajax({
						type: "POST",
						url: baseurl+'Akssalequotation/sale_view_table_new',
						async: false,
						data: "id="+val,
						dataType: "html",
						success: function(response)
						{
							$("#sale_table_ajax").empty().append(response);
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
		

		<script>
			function date_fill_sale_list()
			{
				var dt_fill_sale_list = document.getElementById('dt_fill_sale_list').value;
				var today_dt_nontag_list = document.getElementById('today_dt_nontag_list');
				var week_from_dt_nontag_list = document.getElementById('week_from_dt_nontag_list');
				var week_to_dt_nontag_list = document.getElementById('week_to_dt_nontag_list');
				var monthly_dt_nontag_list = document.getElementById('monthly_dt_nontag_list');
				var from_dt_nontag_list = document.getElementById('from_dt_nontag_list');
				var to_dt_nontag_list = document.getElementById('to_dt_nontag_list');
				var from_date_fillter_nontag_list = document.getElementById('from_date_fillter_nontag_list');
				var to_date_fillter_nontag_list = document.getElementById('to_date_fillter_nontag_list');

				if (dt_fill_sale_list == "today") 
				{
					today_dt_nontag_list.style.display = "block";
					monthly_dt_nontag_list.style.display = "none";
					from_dt_nontag_list.style.display = "none";
					to_dt_nontag_list.style.display = "none";
					week_from_dt_nontag_list.style.display = "none";
					week_to_dt_nontag_list.style.display = "none";
					$("#today_date_fillter").flatpickr({
								dateFormat: "d-m-Y",
							});
				}
				else if (dt_fill_sale_list == "week")
				{
					today_dt_nontag_list.style.display = "none";
					week_from_dt_nontag_list.style.display = "block";
					week_to_dt_nontag_list.style.display = "block";
					monthly_dt_nontag_list.style.display = "none";
					from_dt_nontag_list.style.display = "none";
					to_dt_nontag_list.style.display = "none";

					var curr = new Date; // get current date
					var first = curr.getDate() - curr.getDay(); // First day is the day of the month - the day of the week
					var last = first + 6; // last day is the first day + 6

					var firstday = new Date(curr.setDate(first)).toISOString().slice(0,10);
					firstday = firstday.split("-").reverse().join("-");
					var lastday = new Date(curr.setDate(last)).toISOString().slice(0,10);
					lastday = lastday.split("-").reverse().join("-");
					$('#week_from_date_fillter_nontag_list').val(firstday);
					$('#week_to_date_fillter_nontag_list').val(lastday);
					
				}
				else if (dt_fill_sale_list == "monthly")
				{
					today_dt_nontag_list.style.display = "none";
					monthly_dt_nontag_list.style.display = "block";
					from_dt_nontag_list.style.display = "none";
					to_dt_nontag_list.style.display = "none";
					week_from_dt_nontag_list.style.display = "none";
					week_to_dt_nontag_list.style.display = "none";
					$("#monthly_date_fillter_nontag_list").flatpickr({
								dateFormat: "m-Y",
							});
				}
				else if (dt_fill_sale_list == "custom Date")
				{
					today_dt_nontag_list.style.display = "none";
					monthly_dt_nontag_list.style.display = "none";
					from_dt_nontag_list.style.display = "block";
					to_dt_nontag_list.style.display = "block";
					week_from_dt_nontag_list.style.display = "none";
					week_to_dt_nontag_list.style.display = "none";

					$("#from_date_fillter_nontag_list").flatpickr({
								dateFormat: "d-m-Y",
							});
					$("#to_date_fillter_nontag_list").flatpickr({
								dateFormat: "d-m-Y",
							});
				}
				else
				{
					today_dt_nontag_list.style.display = "none";
					monthly_dt_nontag_list.style.display = "none";
					from_dt_nontag_list.style.display = "none";
					to_dt_nontag_list.style.display = "none";
					week_from_dt_nontag_list.style.display = "none";
					week_to_dt_nontag_list.style.display = "none";
				}
			}
		</script>
	</body>
	<!--end::Body-->
</html>