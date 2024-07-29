<!--begin::Modal dialog-->
			<div class="modal-dialog modal-xl">
				<!--begin::Modal content-->
				<div class="modal-content rounded">
					<!--begin::Modal header-->
					<div class="modal-header justify-content-end border-0 pb-0">
						<!--begin::Close-->
						<div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal" onclick="closeViewModalProducts();">
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
					<form name="products_view_form" id="products_view_form" method="POST" action="<?php echo base_url(); ?>Products/products_view" enctype="multipart/form-data">
						<input type="hidden" id="products_view_id" name="products_view_id" value="<?php echo $products_list->ITEM_SNO;?>">
						<div class="modal-body pt-0 pb-15 px-5 px-xl-20">
						<!--begin::Heading-->
							<div class="mb-13 text-center">
								<h1 class="mb-3">View Product Details</h1>	
							</div>
						<!--end::Heading-->
						<div class="row">
							<!--begin::Label-->
							<label class="col-lg-2 col-form-label fw-semibold fs-6">Item Code/SKU</label>
							<!--end::Label-->
							<!--begin::Col-->
							<div class="col-lg-2 fv-row fv-plugins-icon-container">
								<input type="text" name="view_itcode_prod" id="view_itcode_prod" class="form-control form-control-lg form-control-solid" value="<?php 
									if(is_null($products_list->ITEM_CODE))
									{echo '-'; }
									else{
										echo $products_list->ITEM_CODE;}?>" readonly>
								<div class="fv-plugins-message-container invalid-feedback"></div>
							</div>
							<!--end::Col-->
							<!--begin::Label-->
							<label class="col-lg-2 col-form-label fw-semibold fs-6">Item Name</label>
							<!--end::Label-->
							<!--begin::Col-->
							<div class="col-lg-2 fv-row fv-plugins-icon-container">
								<input type="text" name="view_Iname_prod" id="view_Iname_prod" class="form-control form-control-lg form-control-solid" value="<?php echo $products_list->ITEM_NAME;?>" readonly>
								<div class="fv-plugins-message-container invalid-feedback"></div>
							</div>
							<!--end::Col-->	

							<!--begin::Label-->
							<label class="col-lg-2 col-form-label fw-semibold fs-6">Metal Type</label>
							<!--end::Label-->
							<!--begin::Col-->
							<div class="col-lg-2 fv-row fv-plugins-icon-container">
								<input type="text" name="view_list_prod_metal" id="view_list_prod_metal" class="form-control form-control-lg form-control-solid" value="<?php echo $products_list->METAL;?>"  readonly>
								<div class="fv-plugins-message-container invalid-feedback"></div>
							</div>
							<!--end::Col-->

						</div>
						<div class="row">

							<!--begin::Label-->
							<label class="col-lg-2 col-form-label fw-semibold fs-6">Unit Type</label>
							<!--end::Label-->
							<!--begin::Col-->
							<div class="col-lg-2 fv-row fv-plugins-icon-container">
								<input type="text" name="view_list_prod_unit" id="view_list_prod_unit" class="form-control form-control-lg form-control-solid" value="<?php echo $products_list->UNIT_NAME;?>"  readonly>
								<div class="fv-plugins-message-container invalid-feedback"></div>
							</div>
							<!--end::Col-->

							
							<!--end::Left Section-->


							<!--begin::Label-->
							<label class="col-lg-2 col-form-label fw-semibold fs-6">Category Type</label>
							<!--end::Label-->
							<!--begin::Col-->
							<div class="col-lg-2 fv-row fv-plugins-icon-container">
								<input type="text" name="category_list_prod_view" id="category_list_prod_view" class="form-control form-control-lg form-control-solid" value="<?php echo $products_list->CATEGORY;?>"  readonly>
								<div class="fv-plugins-message-container invalid-feedback"></div>
							</div>
							<!--end::Col-->


						
							<!--end::Left Section-->

							<!--begin::Label-->
							<label class="col-lg-2 col-form-label fw-semibold fs-6">Purchase Rate</label>
							<!--end::Label-->
							<!--begin::Col-->
							<div class="col-lg-2 fv-row fv-plugins-icon-container">
								<input type="text" name="view_pur_rat_prod" id="view_pur_rat_prod" class="form-control form-control-lg form-control-solid" placeholder="Purchase Rate" style="font-size: 15px !important;font-weight: 550 !important;" value="<?php echo $products_list->PURCHASE_RATE;?>" readonly>
								<div class="fv-plugins-message-container invalid-feedback"></div>
							</div>
							<!--end::Col-->	
						</div>
						<div class="row">
								
							<!--begin::Label-->
							<label class="col-lg-2 col-form-label fw-semibold fs-6">Sales Rate</label>
							<!--end::Label-->
							<!--begin::Col-->
							<div class="col-lg-2 fv-row fv-plugins-icon-container">
								<input type="text" name="view_sl_rat_prod" id="view_sl_rat_prod" class="form-control form-control-lg form-control-solid" placeholder="Sales Rate" style="font-size: 15px !important;font-weight: 600 !important;" value="<?php echo $products_list->SALES_RATE; ?>" readonly>
								<div class="fv-plugins-message-container invalid-feedback"></div>
							</div>
							<!--end::Col-->
							<!--begin::Label-->
							<label class="col-lg-2 col-form-label fw-semibold fs-6">HSN Code</label>
							<!--end::Label-->
							<!--begin::Col-->
							<div class="col-lg-2 fv-row fv-plugins-icon-container">
								<input type="" name="view_hsn_prod" id="view_hsn_prod" class="form-control form-control-lg form-control-solid" placeholder="HSN Code"
								 value="<?php echo $products_list->HSN_CODE; ?>" readonly>
								<div class="fv-plugins-message-container invalid-feedback"></div>
							</div>
							<!--end::Col-->
							<!--begin::Label-->
							<label class="col-lg-2 col-form-label fw-semibold fs-6">Opening Stock</label>
							<!--end::Label-->
							<!--begin::Col-->
							<div class="col-lg-2 fv-row fv-plugins-icon-container">
								<input type="text" name="view_op_st_prod" id="view_op_st_prod" class="form-control form-control-lg form-control-solid" placeholder="Opening Stock" style="font-size: 15px !important;font-weight: 600 !important;" 
								value="<?php echo $products_list->OP_QTY; ?>" readonly>
								<div class="fv-plugins-message-container invalid-feedback"></div>
							</div>
							<!--end::Col-->
						</div>
						<div class="row">		
							<!--begin::Label-->
							<label class="col-lg-2 col-form-label fw-semibold fs-6">Opening Rate</label>
							<!--end::Label-->
							<!--begin::Col-->
							<div class="col-lg-2 fv-row fv-plugins-icon-container">
								<input type="text" name="view_op_rat_prod" id="view_op_rat_prod" class="form-control form-control-lg form-control-solid" placeholder="Opening Rate" style="font-size: 15px !important;font-weight: 550 !important;" 
								value="<?php echo $products_list->OP_RATE; ?>" readonly>
								<div class="fv-plugins-message-container invalid-feedback"></div>
							</div>
							<!--end::Col-->
							<!--begin::Label-->
							<label class="col-lg-2 col-form-label fw-semibold fs-6">Opening Value</label>
							<!--end::Label-->
							<!--begin::Col-->
							<div class="col-lg-2 fv-row fv-plugins-icon-container">
								<input type="text" name="view_op_vl_prod" id="view_op_vl_prod" class="form-control form-control-lg form-control-solid" placeholder="Opening Value" style="font-size: 15px !important;font-weight: 550 !important;"value="<?php echo $products_list->OP_VALUE; ?>" readonly>
								<div class="fv-plugins-message-container invalid-feedback"></div>
							</div>
							<!--end::Col-->
							<!--begin::Label-->
							<label class="col-lg-2 col-form-label fw-semibold fs-6">Current Stock</label>
							<!--end::Label-->
							<!--begin::Col-->
							<div class="col-lg-2 fv-row fv-plugins-icon-container">
								<input type="text" name="view_cur_st_prod" id="view_cur_st_prod" class="form-control form-control-lg form-control-solid" placeholder="Current Stock" style="font-size: 15px !important;font-weight: 550 !important;" value="<?php echo $products_list->STOCK_QTY;?>" readonly>
								<div class="fv-plugins-message-container invalid-feedback"></div>
							</div>
							<!--end::Col-->
						</div>
						<div class="row">
							<!--begin::Label-->
							<label class="col-lg-2 col-form-label fw-semibold fs-6">Rate</label>
							<!--end::Label-->
							<!--begin::Col-->
							<div class="col-lg-2 fv-row fv-plugins-icon-container">
								<input type="text" name="view_cur_rt_prod" id="view_cur_rt_prod" class="form-control form-control-lg form-control-solid" placeholder="Current Rate" style="font-size: 15px !important;font-weight: 550 !important;"value="<?php echo $products_list->CLOSING_RATE; ?>" readonly>
								<div class="fv-plugins-message-container invalid-feedback"></div>
							</div>
							<!--end::Col-->
							<!--begin::Label-->
							<label class="col-lg-2 col-form-label fw-semibold fs-6">Current Value</label>
							<!--end::Label-->
							<!--begin::Col-->
							<div class="col-lg-2 fv-row fv-plugins-icon-container">
								<input type="text" name="view_cur_val_prod" id="view_cur_val_prod" class="form-control form-control-lg form-control-solid" placeholder="Current Value" style="font-size: 15px !important;font-weight: 550 !important;" value="<?php echo $products_list->CLOSING_VALUE; ?>" readonly>
								<div class="fv-plugins-message-container invalid-feedback"></div>
							</div>
							<!--end::Col-->
							<!--begin::Label-->
							<label class="col-lg-2 col-form-label fw-semibold fs-6">GST Percentage</label>
							<!--end::Label-->
							<!--begin::Col-->
							<div class="col-lg-2 fv-row fv-plugins-icon-container">
								<input type="text" name="view_gst_per_prod" id="view_gst_per_prod" 
								class="form-control form-control-lg form-control-solid" placeholder="GST%"
								oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" value="<?php echo $products_list->PURCHASE_GST; ?>" readonly>
								<div class="fv-plugins-message-container invalid-feedback"></div>
							</div>
							<!--end::Col-->
							<!--begin::Label-->
							<label class="col-lg-2 col-form-label fw-semibold fs-6">Remarks</label>
							<!--end::Label-->
							<!--begin::Col-->
								<div class="col-lg-2 fv-row fv-plugins-icon-container">
								<input type="text" name="prod_rmks_view" id="prod_rmks_view" 
								class="form-control form-control-lg form-control-solid" value="<?php echo $products_list->Remarks;?>"
								readonly>
									<div class="fv-plugins-message-container invalid-feedback"></div>
								</div>
							<!--end::Col-->
						</div>		
					</div>
					<!--end::Modal body-->
					</form>
				</div>
				<!--end::Modal content-->
			</div>
		<!--end::Modal dialog-->