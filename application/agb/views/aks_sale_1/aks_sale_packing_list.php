<?php $this->load->view("common");?>
<style>
	.dataTables_scroll
    {
        position: relative;
        overflow: auto;
        min-height: 270px;
        max-height: 270px;/*the maximum height you want to achieve*/
        width: 100%;
    }
  .dataTables_scroll thead{
    position: -webkit-sticky;
    position: sticky;
    top: 0;
   background-color: #ec9629;
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
									<h1 class="d-flex align-items-center text-dark fw-bold my-1 fs-3">Sale List
										<!--begin::Separator-->
										
										<!--<span class="h-20px border-gray-400 border-start ms-3 mx-2"></span>
										<label class="d-flex align-items-center text-primary fw-bold my-1 fs-5">
											<span>Party &emsp;-</span>
											<span>&emsp;Roshan</span>
										</label>
										<span class="h-20px border-gray-400 border-start ms-3 mx-2"></span>
										<label class="d-flex align-items-center text-primary fw-bold my-1 fs-5">
											<span>Bill Id&emsp;-</span>
											<span>&emsp;All</span>
										</label>
										<span class="h-20px border-gray-400 border-start ms-3 mx-2"></span>
										<label class="d-flex align-items-center text-primary fw-bold my-1 fs-5">
											<span>Date &emsp;-</span>
											<span>&emsp;Today</span>
										</label>-->
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
									<!--begin::Tables Widget 9-->
									<div class="card card-xxl-stretch mb-5 mb-xl-8">
										<!--begin::Card body-->
										<div class="card-body py-4">
											<div class="row">
												<label class="col-lg-1 col-form-label fw-semibold fs-6">Scan Here</label>
												<div class="col-lg-3 fv-row fv-plugins-icon-container">
													<input type="text" id="scan_item" name="scan_item" class="form-control form-control-lg form-control-solid" placeholder="Scan Here" >
													<div class="fv-plugins-message-container invalid-feedback"></div>
												</div>
												<div class="col-lg-2">
													<button class="btn btn-sm btn-primary me-2" data-bs-toggle="modal" data-bs-target="#sales_scanned1" onclick="view_sale1()" >Ok</button>
												</div>
												<div class="col-lg-3">
													<div class="text-center">
														<label class="form-label fs-3 fw-bold">To be Scanned</label>
													</div>
													<div class="text-center">
														<label class="text-success fs-3 fw-bold" id="to_be_scanned"><?php echo $count; ?></label>
													</div>
												</div>
												<div class="col-lg-3">
													<div class="text-center">
														<label class="form-label fs-3 fw-bold">Scanned</label>
													</div>
													<div class="text-center">
														<label class="text-success fs-3 fw-bold" id="scanned_items">0</label>
													</div>
												</div>
											</div>
											<div class="row mt-4">
												<div class="col-lg-6">
													<div class="row">
														<div class="px-4" style="border:1.9px solid black;border-radius: 10px;">
															<div class="text-center">
																<label class="col-form-label fw-bold fs-3">Item to be Scan</label>
															</div>
															<table id="aks_sales_packing_list" class="table align-middle table-row-dashed table-striped table-hover fs-7 gy-1 gs-2">
																<thead>
																  <tr class="text-start text-muted fw-bold fs-7 gs-0">
																  <!--	<th class="min-w-50px">Sno</th>-->
																	<th class="min-w-125px">Date</th>
																	<th class="min-w-100px">Bill Id</th>
																	<th class="min-w-50px">No.of.Item</th>
																	<th class="min-w-80px">Total Price</th>
																	<!-- <th class="min-w-100px">Status</th> -->
																	<th class="min-w-50px">Action</th>
																  </tr>
																</thead>
																<tbody class="text-gray-600 fw-semibold">
																<?php $i=0; foreach($sale_list as $slist){ ?>
																<tr id="tr<?php echo str_replace('/','_',$slist['sale_id']); ?>">
																		<!--<td><?php echo $i+1; ?></td>-->
																		<td class="ple1"><?php echo $slist['sale_date']; ?></td>
																		<td class="ple1"><?php echo $slist['sale_id']; ?></td>
																		<td class="ple1"><?php echo $slist['sale_prd_count']; ?></td>
																		<td class="ple1"><?php echo $slist['sale_net_amt']; ?></td>
																		<td>
																		<input type="hidden" id="id<?php echo str_replace('/','_',$slist['sale_id']); ?>" value="<?php echo $slist['sid']; ?>" >
																			<span class="text-end">
																				<a href="#" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm" data-bs-toggle="modal" data-bs-target="#sales_scanned" onclick="view_sale('<?php echo $slist['sid']; ?>')">
																				<i class="bi bi-eye-fill eyc"></i>
																				</a>
																			</span>
																	    </td>
																	</tr>
																	<?php $i++; } ?>
																	
																</tbody>
															</table>
														</div>
													</div>
												</div>
												<div class="col-lg-6">
													<div class="row">
														<div class="px-4" style="border:1.9px solid black;border-radius: 10px;">
															<div class="text-center">
																<label class="col-form-label fw-bold fs-3">Scanned</label>
															</div>
															<table id="aks_sales_packing_list_scanned" class="table align-middle table-row-dashed table-striped table-hover fs-7 gy-1 gs-2">
																<thead>
																  <tr class="text-start text-muted fw-bold fs-7 gs-0">
																  	<!--<th class="min-w-50px">Sno</th>-->
																	<th class="min-w-100px">Date</th>
																	<th class="min-w-80px">Bill Id</th>
																	<th class="min-w-50px">No.of.Item</th>
																	<th class="min-w-80px">Total Price</th>
																	<!-- <th class="min-w-100px">Status</th> -->
																	<th class="min-w-80px">Action</th>
																  </tr>
																</thead>
																<tbody class="text-gray-600 fw-semibold" id="table_dest">
																
																</tbody>
															</table>
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
					</div>
					<!--end::Content-->
					<?php $this->load->view("footer");?>
				</div>
				<!--end::Wrapper-->
			</div>
			<!--end::Page-->
		</div>
	<!--begin::Modal - Sales to be scanned-->
	<div class="modal fade" id="sales_tobe_scanned" tabindex="-1" aria-hidden="true">
		<!--begin::Modal dialog-->
		<div class="modal-dialog modal-lg	">
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
						<h1>Sales Packing Details</h1>	
					</div>
					<!--end::Heading-->
				<diV class="row">
					<div class="col-lg-12">
						<!-- <div class="px-4" style="border-radius: 10px;padding-bottom: 20px;box-shadow: 0 5px 10px #00002947;"> -->
					    <div class="row">
							<label class="col-lg-1 col-form-label fw-semibold fs-6">Date</label>
							<label class="col-lg-3 col-form-label fw-bold fs-5">23-03-2023</label>
						  	<label class="col-lg-1 col-form-label fw-semibold fs-6">Bill Id</label>
						  	<label class="col-lg-3 col-form-label fw-bold fs-5">AKS-001/23</label>
							<label class="col-lg-1 col-form-label fw-semibold fs-6">Party</label>
							<label class="col-lg-3 col-form-label fw-bold fs-5">Harris</label>
							<label class="col-lg-1 col-form-label fw-semibold fs-6">Tot.Qty</label>
							<label class="col-lg-3 col-form-label text-center fw-bold fs-5">3</label>
							<label class="col-lg-1 col-form-label fw-semibold fs-6">Tot.Price</label>
							<label class="col-lg-3 col-form-label fw-bold fs-5 text-center">1200.00</label>
						</div>
					    <div class="row">
					   		<label class="col-lg-2 col-form-label fw-semibold fs-6">Delivered By</label>
					   		<label class="col-lg-10 col-form-label fw-bold fs-5">India Post</label>
					    </div>
					    <div class="row">
						   	<table id="view_table_scroll" class="table align-middle table-row-dashed table-striped table-hover fs-7 gy-1 gs-2" id="kt_datatable_dom_positioning">
								<thead>
									<tr class="text-start text-muted fw-bold fs-7 gs-0">
										<th class="min-w-25px">Sno</th>
								  	    <th class="min-w-50px">Product</th>
										<th class="min-w-25px">Unit Price</th>
										<th class="min-w-50px">Qty</th>
										<th class="min-w-50px">Total Price</th>
									</tr>
								</thead>
								<tbody class="text-gray-600 fw-semibold">
									<tr data-kt-pos-element="item" data-kt-pos-item-price="200">
										<td>1</td>
										<td class="d-flex align-items-center">
										 <a href="javascript:;" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm">
							            	<div class="image-input" data-kt-image-input="true">
												<div class="image-input-wrapper w-40px h-40px" style="background-image: url(assets/images/1_kg_old_jaggery.jpeg)"></div>
											</div>
										</a>
										 <div class="d-flex flex-column">
												<a href="javascript:;" class="text-gray-800 text-hover-primary mb-1">Old Jaggery</a>
												<span>500 Gram</span>
										 </div>
										</td>
										<td>300.00</td>
										<td>2</td>
										<td>600.00</td>
								    </tr>
									<tr>
										<td>02</td>
										<td class="d-flex align-items-center">
											<a href="javascript:;" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm">
								            	<div class="image-input" data-kt-image-input="true">
													<div class="image-input-wrapper w-40px h-40px" style="background-image: url(assets/images/1_kg_old_jaggery.jpeg)"></div>
												</div>
											</a>
											 <div class="d-flex flex-column">
													<a href="javascript:;" class="text-gray-800 text-hover-primary mb-1">Old Jaggery</a>
													<span>1 Kg</span>
											 </div>
										</td>
										<td>600.00</td>
										<td>1</td>
										<td>600.00</td>
									</tr>
								</tbody>	
							</table>
					    </div>
					    <div class="row">
					    	<label class="col-lg-2 col-form-label required fw-semibold fs-6">Tracking ID</label>
							<div class="col-lg-3 fv-row fv-plugins-icon-container">
								<input type="text" name="" class="form-control form-control-lg form-control-solid" placeholder="Enter Tracking ID" >
								<div class="fv-plugins-message-container invalid-feedback"></div>
							</div>
							<label class="col-lg-2 col-form-label fw-semibold fs-6">Charges</label>
							<div class="col-lg-3 fv-row fv-plugins-icon-container">
								<input type="text" name="" class="form-control form-control-lg form-control-solid" placeholder="Enter Charges" >
								<div class="fv-plugins-message-container invalid-feedback"></div>
							</div>
						</div>
							<div class="d-flex align-items-center justify-content-center mt-2">
								<label class="col-lg-3 col-form-label fw-bold fs-3">Total Amount</label>
								<label class="col-lg-2 col-form-label fw-bold fs-3">0.00</label>
						    </div>
						    <div class="d-flex align-items-center justify-content-end mt-2">
						    	<button class="btn btn-secondary me-2" data-bs-dismiss="modal">Cancel</button>
								<button class="btn btn-primary" data-bs-dismiss="modal">Delivered</button>
							</div>
					    <!-- </div> -->
					</div>		 
				</diV>

			</div>
				<!--end::Modal body-->
			</div>
			<!--end::Modal content-->
		</div>
		<!--end::Modal dialog-->
	</div>
	<!--end::Modal - Sales to be scanned-->

	<!--begin::Modal - Sales to be scanned-->
	<div class="modal fade" id="sales_scanned" tabindex="-1" aria-hidden="true">
		<!--begin::Modal dialog-->
		<div class="modal-dialog modal-lg	">
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
						<h1>View Sales Packing Details</h1>	
					</div>
					<!--end::Heading-->
				    <div class="row">
						<label class="col-lg-1 col-form-label fw-semibold fs-6">Date</label>
						<label class="col-lg-3 col-form-label fw-bold fs-5" id="sale_date"></label>
					  	<label class="col-lg-1 col-form-label fw-semibold fs-6">Bill Id</label>
					  	<label class="col-lg-3 col-form-label fw-bold fs-5" id="sale_id"></label>
						<label class="col-lg-1 col-form-label fw-semibold fs-6">Party</label>
						<label class="col-lg-3 col-form-label fw-bold fs-5" id="sale_party"></label>
						<label class="col-lg-1 col-form-label fw-semibold fs-6">Tot.Qty</label>
						<label class="col-lg-3 col-form-label text-center fw-bold fs-5" id="total_item">0</label>
						<label class="col-lg-1 col-form-label fw-semibold fs-6">Tot.Amt</label>
						<label class="col-lg-3 col-form-label fw-bold fs-5 text-center" id="tot_amount">0</label>
						<label class="col-lg-1 col-form-label fw-semibold fs-6">Discount</label>
						<label class="col-lg-3 col-form-label text-center fw-bold fs-5" id="discount">0</label>
						<label class="col-lg-1 col-form-label fw-semibold fs-6">Del.Chg</label>
						<label class="col-lg-3 col-form-label text-center fw-bold fs-5" id="del_chg">0</label>
						<label class="col-lg-1 col-form-label fw-semibold fs-6">Net.Amt</label>
						<label class="col-lg-3 col-form-label text-center fw-bold fs-5" id="net_amount">0</label>
					</div>
				    <div class="row">
				   		<label class="col-lg-2 col-form-label fw-semibold fs-6">Delivered By</label>
				   		<label class="col-lg-10 col-form-label fw-bold fs-5" id="delivered_by"></label>
				    </div>
				    <div class="row">
					   	<table id="view_table_scroll" class="table align-middle table-row-dashed table-striped table-hover fs-7 gy-1 gs-2" id="kt_datatable_dom_positioning">
							<thead>
								<tr class="text-start text-muted fw-bold fs-7 gs-0">
									<th class="min-w-25px">Sno</th>
							  	    <th class="min-w-50px">Product</th>
									<th class="min-w-25px">Wgt(g)</th>
									<th class="min-w-50px">price per g</th>
									<th class="min-w-50px">Total Price</th>
								</tr>
							</thead>
							<tbody class="text-gray-600 fw-semibold" id="sale_view_table">
								<tr data-kt-pos-element="item" data-kt-pos-item-price="200">
									<td>1</td>
									<td class="d-flex align-items-center">
									 <a href="javascript:;" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm">
						            	<div class="image-input" data-kt-image-input="true">
											<div class="image-input-wrapper w-40px h-40px" style="background-image: url(assets/images/1_kg_old_jaggery.jpeg)"></div>
										</div>
									</a>
									 <div class="d-flex flex-column">
											<a href="javascript:;" class="text-gray-800 text-hover-primary mb-1">Old Jaggery</a>
											<span>500 Gram</span>
									 </div>
									</td>
									<td>300.00</td>
									<td>2</td>
									<td>600.00</td>
							    </tr>
								<tr>
									<td>02</td>
									<td class="d-flex align-items-center">
										<a href="javascript:;" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm">
							            	<div class="image-input" data-kt-image-input="true">
												<div class="image-input-wrapper w-40px h-40px" style="background-image: url(assets/images/1_kg_old_jaggery.jpeg)"></div>
											</div>
										</a>
										 <div class="d-flex flex-column">
												<a href="javascript:;" class="text-gray-800 text-hover-primary mb-1">Old Jaggery</a>
												<span>1 Kg</span>
										 </div>
									</td>
									<td>600.00</td>
									<td>1</td>
									<td>600.00</td>
								</tr>
							</tbody>	
						</table>
				    </div>
					<div id="shipment_div">
					</div>
				    <!--<div class="row">
				    	<label class="col-lg-2 col-form-label fw-semibold fs-6">Tracking ID</label>
				    	<label class="col-lg-3 col-form-label fw-bold fs-5">Ind-125698</label>
						<label class="col-lg-2 col-form-label fw-semibold fs-6">Charges</label>
						<label class="col-lg-3 col-form-label fw-bold fs-5">60.00</label>
					</div>-->
					<div class="d-flex align-items-center justify-content-center mt-2">
						<label class="col-lg-3 col-form-label fw-bold fs-3">Total Amount</label>
						<label class="col-lg-2 col-form-label fw-bold fs-3" id="total_amount">0</label>
				    </div>
				</div>
				<!--end::Modal body-->
			</div>
			<!--end::Modal content-->
		</div>
		<!--end::Modal dialog-->
	</div>
	<!--end::Modal - Sales to be scanned-->
	<!--begin::Modal - Sales to be scanned-->
	<div class="modal fade" id="sales_scanned1" tabindex="-1" aria-hidden="true">
		<!--begin::Modal dialog-->
		<div class="modal-dialog modal-lg	">
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
						<h1>View Sales Packing Details</h1>	
					</div>
					<!--end::Heading-->
				    <div class="row">
						<label class="col-lg-1 col-form-label fw-semibold fs-6">Date</label>
						<label class="col-lg-3 col-form-label fw-bold fs-5" id="sale_date_scan"></label>
					  	<label class="col-lg-1 col-form-label fw-semibold fs-6">Bill Id</label>
					  	<label class="col-lg-3 col-form-label fw-bold fs-5" id="sale_id_scan"></label>
						<label class="col-lg-1 col-form-label fw-semibold fs-6">Party</label>
						<label class="col-lg-3 col-form-label fw-bold fs-5" id="sale_party_scan"></label>
						<label class="col-lg-1 col-form-label fw-semibold fs-6">Tot.Qty</label>
						<label class="col-lg-3 col-form-label text-center fw-bold fs-5" id="total_item_scan">0</label>
						<label class="col-lg-1 col-form-label fw-semibold fs-6">Tot.Amt</label>
						<label class="col-lg-3 col-form-label fw-bold fs-5 text-center" id="tot_amount_scan">0</label>
						<label class="col-lg-1 col-form-label fw-semibold fs-6">Discount</label>
						<label class="col-lg-3 col-form-label text-center fw-bold fs-5" id="discount_scan">0</label>
						<label class="col-lg-1 col-form-label fw-semibold fs-6">Del.Chg</label>
						<label class="col-lg-3 col-form-label text-center fw-bold fs-5" id="del_chg_scan">0</label>
						<label class="col-lg-1 col-form-label fw-semibold fs-6">Net.Amt</label>
						<label class="col-lg-3 col-form-label text-center fw-bold fs-5" id="net_amount_scan">0</label>
					</div>
				    <div class="row">
				   		<label class="col-lg-2 col-form-label fw-semibold fs-6">Delivered By</label>
				   		<label class="col-lg-10 col-form-label fw-bold fs-5" id="delivered_by_scan"></label>
				    </div>
				    <div class="row">
					   	<table id="view_table_scroll" class="table align-middle table-row-dashed table-striped table-hover fs-7 gy-1 gs-2" id="kt_datatable_dom_positioning">
							<thead>
								<tr class="text-start text-muted fw-bold fs-7 gs-0">
									<th class="min-w-25px">Sno</th>
							  	    <th class="min-w-50px">Product</th>
									<th class="min-w-25px">Wgt(g)</th>
									<th class="min-w-50px">price per g</th>
									<th class="min-w-50px">Total Price</th>
								</tr>
							</thead>
							<tbody class="text-gray-600 fw-semibold" id="sale_view_table_scan">
								
								
							</tbody>	
						</table>
				    </div>
					
					<div class="row">
					    	<label class="col-lg-2 col-form-label required fw-semibold fs-6">Tracking ID</label>
							<div class="col-lg-3 fv-row fv-plugins-icon-container">
								<input type="text" id="tracking_id_enter" name="tracking_id_enter" class="form-control form-control-lg form-control-solid" placeholder="Enter Tracking ID" >
								<div class="fv-plugins-message-container invalid-feedback"></div>
							</div>
							<label class="col-lg-2 col-form-label fw-semibold fs-6">Charges</label>
							<div class="col-lg-3 fv-row fv-plugins-icon-container">
								<input type="text" id="charges_enter" name="charges_enter" value="0"  class="form-control form-control-lg form-control-solid" placeholder="Enter Charges" >
								<input type="hidden" name="form_id" id="form_id"  >
								<div class="fv-plugins-message-container invalid-feedback"></div>
							</div>
						</div>
					<div class="d-flex align-items-center justify-content-center mt-2">
						<label class="col-lg-3 col-form-label fw-bold fs-3">Total Amount</label>
						<label class="col-lg-2 col-form-label fw-bold fs-3" id="total_amount_scan">0</label>
				    </div>
					<div class="d-flex align-items-center justify-content-end mt-2">
						    	<button class="btn btn-secondary me-2" data-bs-dismiss="modal">Cancel</button>
								<button class="btn btn-primary" data-bs-dismiss="modal" onclick="courier_delivery()">Delivered</button>
							</div>
							
				</div>
				<!--end::Modal body-->
			</div>
			<!--end::Modal content-->
		</div>
		<!--end::Modal dialog-->
	</div>
	<!--end::Modal - Sales to be scanned-->
	<!-- script :: beign -->
	<?php $this->load->view("script");?>
		<!-- <script src="js/products-list.js"></script> -->
		<script>
		function courier_delivery(){
			var charges= $("#charges_enter").val();
			var tracking_id= $("#tracking_id_enter").val();
			var id= $("#form_id").val();
			var count1= $("#to_be_scanned").text();
			var count2= $("#scanned_items").text();
			var val=id.replaceAll('/', '_');

			var baseurl= $("#baseurl").val();
				
				$.ajax({
				type: "POST",
				url: baseurl+'Aks_sale/courier_delivery?',
				async: false,
				type: "POST",
				data: "id="+val+"&tracking_id="+tracking_id+"&charges="+charges,
				dataType: "html",
				success: function(response)
				{
			}
			});
			


if(count2==0){
	$("#table_dest").empty();
}
			var tr = $('#tr'+val).closest("tr").remove().clone();
       
			$("#to_be_scanned").html(parseInt(count1)-1);
			$("#scanned_items").html(parseInt(count2)+1);
   
         $("#table_dest").append(tr);
		 $("#scan_item").val('');



		}
		</script> 
<script>
function total_calc(){
	// alert(1);
	var charge= $("#charges_enter").val();
	var amount= $("#net_amount_scan").text();
var total=parseFloat(charge)+parseFloat(amount);
$('#total_amount_scan').html(total);
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
				url: baseurl+'Aks_sale/sales_view',
				async: false,
				type: "GET",
				data: "id="+val,
				dataType: "json",
				success: function(response)
				{
					$('#sale_date').html(response.sale_date);
					$('#sale_id').html(response.sale_id);
					$('#sale_party').html(response.sale_party);
					$('#total_item').html(response.sale_prd_count);
					$('#tot_amount').html(response.sale_prd_tot_amt);
					$('#del_chg').html(parseFloat(response.sale_net_amt)+parseFloat(response.sale_dis_amt)-parseFloat(response.sale_prd_tot_amt));
					$('#net_amount').html(response.sale_net_amt);
					$('#del_mode').html(response.sale_deliverymode);
					
					$('#discount').html(response.sale_dis_amt);
					$('#net_amount1').html(response.sale_net_amt);
					$('#cash_amount').html(response.sale_cash);
					$('#paid_amount').html(response.sale_cash);
					$('#balance_amount').html(response.balance_cash);
					$('#delivered_by').html(response.delivery_by);

if(response.shipment_charges==null){
	shipment_charges=0;
}
else{
	shipment_charges=response.shipment_charges;
}

					$('#total_amount').html(parseFloat(response.sale_net_amt));
					
				if( response.sale_track_id!=null){
					
var div='<div class="row"><label class="col-lg-2 col-form-label fw-semibold fs-6">Tracking ID</label><label class="col-lg-3 col-form-label fw-bold fs-5">'+response.sale_track_id+'</label><label class="col-lg-2 col-form-label fw-semibold fs-6">Charges</label><label class="col-lg-3 col-form-label fw-bold fs-5">'+response.shipment_charges+'</label></div>'
				}
else{
	var div='';

}
$('#shipment_div').empty().append(div);
				}
			});
				var baseurl= $("#baseurl").val();
				// alert(baseurl);
				$.ajax({
				type: "POST",
				url: baseurl+'Aks_sale/sale_view_table',
				async: false,
				data: "id="+val,
				dataType: "html",
				success: function(response)
				{
					$("#sale_view_table").empty().append(response);
					}
			    });
			 
				var baseurl= $("#baseurl").val();
				// alert(baseurl);
				$.ajax({
				type: "POST",
				url: baseurl+'Aks_sale/payment_details',
				async: false,
				data: "id="+val,
				dataType: "html",
				success: function(response)
				{
					
					var res=response.split('||');

			    
					$('#sale_table_payment').empty();
					$('#sale_table_payment').append(res[1]);
					$('#sale_table_payment').append(res[2]);
					$('#sale_table_payment').append(res[3]);
					$('#sale_table_payment').append(res[4]);
					
					
				}
			    });
			}
</script>
<script>
			function view_sale1()
			{
				var scan_item= $("#scan_item").val();
				scan_item1=scan_item.replaceAll('/', '_');
				var val= $("#id"+scan_item1).val();
				var baseurl= $("#baseurl").val();
			
				$.ajax({
				type: "GET",
				url: baseurl+'Aks_sale/sales_view',
				async: false,
				type: "GET",
				data: "id="+val,
				dataType: "json",
				success: function(response)
				{
					$('#sale_date_scan').html(response.sale_date);
					$('#sale_id_scan').html(response.sale_id);
					$('#form_id').val(response.sale_id);
					$('#sale_party_scan').html(response.sale_party);
					$('#total_item_scan').html(response.sale_prd_count);
					$('#net_amount_scan').html(response.sale_net_amt);
					$('#del_mode_scan').html(response.sale_deliverymode);
					
					$('#tot_amount_scan').html(response.sale_prd_tot_amt);
					$('#del_chg_scan').html(parseFloat(response.sale_net_amt)+parseFloat(response.sale_dis_amt)-parseFloat(response.sale_prd_tot_amt));
					$('#net_amount_scan').html(response.sale_net_amt);

					$('#discount_scan').html(response.sale_dis_amt);
					$('#net_amount1_scan').html(response.sale_net_amt);
					$('#cash_amount_scan').html(response.sale_cash);
					$('#paid_amount_scan').html(response.sale_cash);
					$('#balance_amount_scan').html(response.balance_cash);
					$('#delivered_by_scan').html(response.delivery_by);
					$('#total_amount_scan').html(response.sale_net_amt);
					
				}
			});
				var baseurl= $("#baseurl").val();
				// alert(baseurl);
				$.ajax({
				type: "POST",
				url: baseurl+'Aks_sale/sale_view_table',
				async: false,
				data: "id="+val,
				dataType: "html",
				success: function(response)
				{
					$("#sale_view_table_scan").empty().append(response);
					}
			    });
			 
				// var baseurl= $("#baseurl").val();
				// // alert(baseurl);
				// $.ajax({
				// type: "POST",
				// url: baseurl+'Aks_sale/payment_details',
				// async: false,
				// data: "id="+val,
				// dataType: "html",
				// success: function(response)
				// {
					
				// 	var res=response.split('||');

			    
				// 	$('#sale_table_payment').empty();
				// 	$('#sale_table_payment').append(res[1]);
				// 	$('#sale_table_payment').append(res[2]);
				// 	$('#sale_table_payment').append(res[3]);
				// 	$('#sale_table_payment').append(res[4]);
					
					
				// }
			    // });

				$('#tracking_id_enter').focus();
			}
</script>


		<script>
			$("#aks_sales_packing_list").DataTable({
				"aaSorting":[],
				// "sorting":false,
				// "paging": false,
				// "responsive": true,
				"iDisplayLength": "25",
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
				  // "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
				  ">"
				});
		 		$('#aks_sales_packing_list').wrap('<div class="dataTables_scroll" />');
		 	</script>
		 	<script>
		      $("#aks_sales_packing_list").kendoTooltip({
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
			$("#aks_sales_packing_list_scanned").DataTable({
				"aaSorting":[],
				// "sorting":false,
				// "paging": false,
				// "responsive": true,
				"iDisplayLength": "25",
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
				  // "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
				  ">"
				});
		 		$('#aks_sales_packing_list_scanned').wrap('<div class="dataTables_scroll" />');
		 	</script>
		 	<script>
		      $("#aks_sales_packing_list_scanned").kendoTooltip({
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
	      $("#kt_datatable_responsive").kendoTooltip({
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
		  function date_fill_nontag_wallet_history() {
			var dt_fill_nontag_wallet_history = document.getElementById('dt_fill_nontag_wallet_history').value;
			var today_dt_nontag_wallet_history = document.getElementById('today_dt_nontag_wallet_history');
			var week_from_dt_nontag_wallet_history = document.getElementById('week_from_dt_nontag_wallet_history');
			var week_to_dt_nontag_wallet_history = document.getElementById('week_to_dt_nontag_wallet_history');
			var monthly_dt_nontag_wallet_history = document.getElementById('monthly_dt_nontag_wallet_history');
			var from_dt_nontag_wallet_history = document.getElementById('from_dt_nontag_wallet_history');
			var to_dt_nontag_wallet_history = document.getElementById('to_dt_nontag_wallet_history');
			var from_date_fillter_nontag_wallet_history = document.getElementById('from_date_fillter_nontag_wallet_history');
			var to_date_fillter_nontag_wallet_history = document.getElementById('to_date_fillter_nontag_wallet_history');

			if (dt_fill_nontag_wallet_history == "today") {
				today_dt_nontag_wallet_history.style.display = "block";
				monthly_dt_nontag_wallet_history.style.display = "none";
				from_dt_nontag_wallet_history.style.display = "none";
				to_dt_nontag_wallet_history.style.display = "none";
				week_from_dt_nontag_wallet_history.style.display = "none";
				week_to_dt_nontag_wallet_history.style.display = "none";
				$("#today_date_fillter_nontag_wallet_history").flatpickr({
					dateFormat: "d-m-Y",
				});
			}
			else if (dt_fill_nontag_wallet_history == "week") {
				today_dt_nontag_wallet_history.style.display = "none";
				week_from_dt_nontag_wallet_history.style.display = "block";
				week_to_dt_nontag_wallet_history.style.display = "block";
				monthly_dt_nontag_wallet_history.style.display = "none";
				from_dt_nontag_wallet_history.style.display = "none";
				to_dt_nontag_wallet_history.style.display = "none";

				var curr = new Date; // get current date
				var first = curr.getDate() - curr.getDay(); // First day is the day of the month - the day of the week
				var last = first + 6; // last day is the first day + 6

				var firstday = new Date(curr.setDate(first)).toISOString().slice(0, 10);
				firstday = firstday.split("-").reverse().join("-");
				var lastday = new Date(curr.setDate(last)).toISOString().slice(0, 10);
				lastday = lastday.split("-").reverse().join("-");
				$('#week_from_date_fillter_nontag_wallet_history').val(firstday);
				$('#week_to_date_fillter_nontag_wallet_history').val(lastday);

			}
			else if (dt_fill_nontag_wallet_history == "monthly") {
				today_dt_nontag_wallet_history.style.display = "none";
				monthly_dt_nontag_wallet_history.style.display = "block";
				from_dt_nontag_wallet_history.style.display = "none";
				to_dt_nontag_wallet_history.style.display = "none";
				week_from_dt_nontag_wallet_history.style.display = "none";
				week_to_dt_nontag_wallet_history.style.display = "none";
				$("#monthly_date_fillter_nontag_wallet_history").flatpickr({
					dateFormat: "m-Y",
				});
			}
			else if (dt_fill_nontag_wallet_history == "custom Date") {
				today_dt_nontag_wallet_history.style.display = "none";
				monthly_dt_nontag_wallet_history.style.display = "none";
				from_dt_nontag_wallet_history.style.display = "block";
				to_dt_nontag_wallet_history.style.display = "block";
				week_from_dt_nontag_wallet_history.style.display = "none";
				week_to_dt_nontag_wallet_history.style.display = "none";

				$("#from_date_fillter_nontag_wallet_history").flatpickr({
					dateFormat: "d-m-Y",
				});
				$("#to_date_fillter_nontag_wallet_history").flatpickr({
					dateFormat: "d-m-Y",
				});
			}
			else {
				today_dt_nontag_wallet_history.style.display = "none";
				monthly_dt_nontag_wallet_history.style.display = "none";
				from_dt_nontag_wallet_history.style.display = "none";
				to_dt_nontag_wallet_history.style.display = "none";
				week_from_dt_nontag_wallet_history.style.display = "none";
				week_to_dt_nontag_wallet_history.style.display = "none";
			}
		 }
	   </script>
<script>
			function date_fill_nontag_list()
			{
				var dt_fill_nontag_list = document.getElementById('dt_fill_nontag_list').value;
				var today_dt_nontag_list = document.getElementById('today_dt_nontag_list');
				var week_from_dt_nontag_list = document.getElementById('week_from_dt_nontag_list');
				var week_to_dt_nontag_list = document.getElementById('week_to_dt_nontag_list');
				var monthly_dt_nontag_list = document.getElementById('monthly_dt_nontag_list');
				var from_dt_nontag_list = document.getElementById('from_dt_nontag_list');
				var to_dt_nontag_list = document.getElementById('to_dt_nontag_list');
				var from_date_fillter_nontag_list = document.getElementById('from_date_fillter_nontag_list');
				var to_date_fillter_nontag_list = document.getElementById('to_date_fillter_nontag_list');

				if (dt_fill_nontag_list == "today") 
				{
					today_dt_nontag_list.style.display = "block";
					monthly_dt_nontag_list.style.display = "none";
					from_dt_nontag_list.style.display = "none";
					to_dt_nontag_list.style.display = "none";
					week_from_dt_nontag_list.style.display = "none";
					week_to_dt_nontag_list.style.display = "none";
					$("#today_date_fillter_nontag_list").flatpickr({
								dateFormat: "d-m-Y",
							});
				}
				else if (dt_fill_nontag_list == "week")
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
				else if (dt_fill_nontag_list == "monthly")
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
				else if (dt_fill_nontag_list == "custom Date")
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
		<!-- non tag list day fillter end -->
		<!-- non tag wallet day fillter start -->
		<script>
			function date_fill_nontag_wallet()
			{
				var dt_fill_nontag_wallet = document.getElementById('dt_fill_nontag_wallet').value;
				var today_dt_nontag_wallet = document.getElementById('today_dt_nontag_wallet');
				var week_from_dt_nontag_wallet = document.getElementById('week_from_dt_nontag_wallet');
				var week_to_dt_nontag_wallet = document.getElementById('week_to_dt_nontag_wallet');
				var monthly_dt_nontag_wallet = document.getElementById('monthly_dt_nontag_wallet');
				var from_dt_nontag_wallet = document.getElementById('from_dt_nontag_wallet');
				var to_dt_nontag_wallet = document.getElementById('to_dt_nontag_wallet');
				var from_date_fillter_nontag_wallet = document.getElementById('from_date_fillter_nontag_wallet');
				var to_date_fillter_nontag_wallet = document.getElementById('to_date_fillter_nontag_wallet');

				if (dt_fill_nontag_wallet == "today") 
				{
					today_dt_nontag_wallet.style.display = "block";
					monthly_dt_nontag_wallet.style.display = "none";
					from_dt_nontag_wallet.style.display = "none";
					to_dt_nontag_wallet.style.display = "none";
					week_from_dt_nontag_wallet.style.display = "none";
					week_to_dt_nontag_wallet.style.display = "none";
					$("#today_date_fillter_nontag_wallet").flatpickr({
								dateFormat: "d-m-Y",
							});
				}
				else if (dt_fill_nontag_wallet == "week")
				{
					today_dt_nontag_wallet.style.display = "none";
					week_from_dt_nontag_wallet.style.display = "block";
					week_to_dt_nontag_wallet.style.display = "block";
					monthly_dt_nontag_wallet.style.display = "none";
					from_dt_nontag_wallet.style.display = "none";
					to_dt_nontag_wallet.style.display = "none";

					var curr = new Date; // get current date
					var first = curr.getDate() - curr.getDay(); // First day is the day of the month - the day of the week
					var last = first + 6; // last day is the first day + 6

					var firstday = new Date(curr.setDate(first)).toISOString().slice(0,10);
					firstday = firstday.split("-").reverse().join("-");
					var lastday = new Date(curr.setDate(last)).toISOString().slice(0,10);
					lastday = lastday.split("-").reverse().join("-");
					$('#week_from_date_fillter_nontag_wallet').val(firstday);
					$('#week_to_date_fillter_nontag_wallet').val(lastday);
					
				}
				else if (dt_fill_nontag_wallet == "monthly")
				{
					today_dt_nontag_wallet.style.display = "none";
					monthly_dt_nontag_wallet.style.display = "block";
					from_dt_nontag_wallet.style.display = "none";
					to_dt_nontag_wallet.style.display = "none";
					week_from_dt_nontag_wallet.style.display = "none";
					week_to_dt_nontag_wallet.style.display = "none";
					$("#monthly_date_fillter_nontag_wallet").flatpickr({
								dateFormat: "m-Y",
							});
				}
				else if (dt_fill_nontag_wallet == "custom Date")
				{
					today_dt_nontag_wallet.style.display = "none";
					monthly_dt_nontag_wallet.style.display = "none";
					from_dt_nontag_wallet.style.display = "block";
					to_dt_nontag_wallet.style.display = "block";
					week_from_dt_nontag_wallet.style.display = "none";
					week_to_dt_nontag_wallet.style.display = "none";

					$("#from_date_fillter_nontag_wallet").flatpickr({
								dateFormat: "d-m-Y",
							});
					$("#to_date_fillter_nontag_wallet").flatpickr({
								dateFormat: "d-m-Y",
							});
				}
				else
				{
					today_dt_nontag_wallet.style.display = "none";
					monthly_dt_nontag_wallet.style.display = "none";
					from_dt_nontag_wallet.style.display = "none";
					to_dt_nontag_wallet.style.display = "none";
					week_from_dt_nontag_wallet.style.display = "none";
					week_to_dt_nontag_wallet.style.display = "none";
				}
			}
		</script>

	</body>
	<!--end::Body-->
</html>