<!--begin::Modal dialog-->
		<div class="modal-dialog modal-lg	">
			<!--begin::Modal content-->
			<div class="modal-content rounded">
				<!--begin::Modal header-->
				<div class="modal-header justify-content-end border-0 pb-0">
					<!--begin::Close-->
					<div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal" onclick="closeViewModal();" >
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
				<form name="company_view_form" id="company_view_form" method="POST" action="<?php echo base_url(); ?>Akspurchase/aks_view_purchase" enctype="multipart/form-data" >
				<div class="modal-body pt-0 pb-15 px-5 px-xl-20">
					<!--begin::Heading-->
					<div class="mb-10 text-center">
						<h1>View Purchase</h1>	
					</div>
					<!--end::Heading-->
						
				<diV class="row">
					<!-- <div class="col-lg-4">
						<div class="px-4" style="border-radius: 10px;padding-bottom: 20px;box-shadow: 0 5px 10px #00002947;">
							<div class="row">
								<div class="d-flex align-items-center">
									<div class="symbol symbol-circle symbol-100px overflow-hidden me-3">
									 <a href="javascript:;">
										<div class="symbol-label">
										 <img src="assets/images/1_kg_old_jaggery.jpeg" class="w-fit" />
										</div>
										</a>
									</div>
								</div>
								<div  class="fw-bold text-gray-800 cursor-pointer text-hover-primary fs-5 fs-xl-1">Old Jaggery</div>
								<span class="fw-bold fs-5">500 Gram</span>
							</div>
						  </div>	
				    </div> -->	
				    <div class="col-lg-12">
						<!-- <div class="px-4" style="border-radius: 10px;padding-bottom: 20px;box-shadow: 0 5px 10px #00002947;"> -->
					     <div class="row">
							<label class="col-lg-1 col-form-label fw-semibold fs-6">Date</label>
							<div class="col-lg-3 fv-row fv-plugins-icon-container">
								<label class="col-form-label fw-bold fs-6"><?php echo $pur_details->pur_date; ?></label>
							</div>
						  	<label class="col-lg-2 col-form-label fw-semibold fs-6">Purchase Id</label>
							<div class="col-lg-3 fv-row fv-plugins-icon-container">
								<label class=" col-form-label fw-bold fs-5"><?php echo $pur_details->pur_id; ?></label>
							</div>
						</div>

							
						
						 <div class="row">
						 	<label class="col-lg-2 col-form-label  fw-semibold fs-6">Supplier</label>
							<div class="col-lg-2 fv-row fv-plugins-icon-container">
								<label class="col-form-label fw-bold fs-6"><?php echo $pur_details->pur_sup; ?></label>
							</div>	
							<label class="col-lg-2 col-form-label  fw-semibold fs-6">Total Items</label>
							<div class="col-lg-2 fv-row fv-plugins-icon-container">
								<label class="col-lg-10 col-form-label fw-bold fs-5"><?php echo $pur_details->prd_count; ?></label>
							</div>
						  	<label class="col-lg-2 col-form-label  fw-semibold fs-6">Net Amount</label>
							<div class="col-lg-2 fv-row fv-plugins-icon-container">
								<label class="col-lg-10 col-form-label fw-bold fs-5"><?php echo $pur_details->prd_tot_amt; ?></label>
							</div>
							
						</div>
						   <div class="row mt-10">
						   	<table id="view_table_scroll" class="table align-middle table-row-dashed table-striped table-hover fs-7 gy-1 gs-2" id="kt_datatable_dom_positioning">
												<thead>
													<tr class="text-start text-muted fw-bold fs-7 gs-0">
														<th class="min-w-25px">Sno</th>
												  	    <th class="min-w-50px">Product</th>
														<th class="min-w-25px">Weight</th>
														<th class="min-w-50px">Price Per g</th>
														<th class="min-w-50px">Price</th>
													</tr>
												</thead>
												 <tbody class="text-gray-600 fw-semibold">
													<tr data-kt-pos-element="item" data-kt-pos-item-price="200">
														<td></td>
														<td>
														</td>
														<td>600 Gram</td>
														<td>2</td>
														<td>1200.00</td>
												    </tr>
													
												</tbody>	
											</table>
						   </div>
						   <div class="row mt-4">
					   			<div class="col-lg-4 text-start">
								<label class="col-form-label fw-bold fs-5">Total Amount &emsp;</label>
								<label class="col-form-label fw-bold fs-3"><?php echo $pur_details->prd_tot_amt; ?></label>
								</div>
								<label class="col-lg-2 col-form-label  fw-bold fs-5">Discount</label>
								<div class="col-lg-2">
							    <label class="col-form-label fw-bold fs-3"><?php echo $pur_details->pur_dis_amt; ?></label>
								</div>
								<label class="col-lg-2 col-form-label  fw-bold fs-5">Net Amount</label>
								<div class="col-lg-2">
							    <label class="col-form-label fw-bold fs-3"><?php echo $pur_details->pur_net_amt; ?></label>
								</div>
						   </div>
						   <div class="row mt-4">
						   			<label class="col-form-label fw-bold fs-3">Payment Details</label>

						   			<div class="row">
						   				<div class="col-lg-4 text-start">
											<label class="col-form-label fw-bold fs-5">Cash &emsp;</label>
											<label class="col-form-label fw-bold fs-3">800.00</label>
								 	    </div>
								 	   </div>
								 	    <div class="row">
											<div class="col-lg-6 text-start">
												<label class="col-form-label fw-bold fs-5">Paid Amount &emsp;</label>
												<label class="col-form-label fw-bold fs-3">800.00</label>
											</div>
											<div class="col-lg-6 text-center">
												<label class="col-form-label fw-bold fs-5">Balance Amount &emsp;</label>
												<label class="col-form-label fw-bold fs-3">200.00</label>
											</div>
									</div>
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