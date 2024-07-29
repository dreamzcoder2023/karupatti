<!-- <form id="kt_add_product_form" class="form"> -->
			<!--begin::Modal dialog-->
			<div class="modal-dialog modal-lg">
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
					<form name="products_master_view" id="products_master_view" method="POST" action="<?php echo base_url(); ?>Productmaster/productmaster_view" enctype="multipart/form-data">
						<!-- <input type="hidden" id="productmaster_view_id" name="productmaster_view_id" value="<?php echo $productmaster_view_list->PRODUCT_ID;?>"> -->
						<div class="modal-body pt-0 pb-15 px-5 px-xl-20">
						<!--begin::Heading-->
						<div class="mb-13 text-center">
							<h1 class="mb-3">View Product Master</h1>	
						</div>
						<!--end::Heading-->
						<div class="row">
							<label class="col-lg-2 col-form-label fw-semibold fs-6">Product ID</label>
							<div class="col-lg-4 fv-row fv-plugins-icon-container">
								<input type="text" name="" class="form-control form-control-lg form-control-solid" placeholder="" value="<?php echo $productmaster_view_list->PRODUCT_ID;?>" readonly>
								<div class="fv-plugins-message-container invalid-feedback"></div>
							</div>
							<label class="col-lg-2 col-form-label fw-semibold fs-6">Item Code</label>
							<div class="col-lg-4 fv-row fv-plugins-icon-container">
								<input type="text" name="" class="form-control form-control-lg form-control-solid" placeholder="" value="<?php echo $productmaster_view_list->ITEM_CODE;?>" readonly>
								<div class="fv-plugins-message-container invalid-feedback"></div>
							</div>
						</div>
						<div class="row">
							<label class="col-lg-2 col-form-label fw-semibold fs-6">Item Name</label>
							<div class="col-lg-4 fv-row fv-plugins-icon-container">
								<input type="text" name="" class="form-control form-control-lg form-control-solid" placeholder="Item Name" value="<?php echo $productmaster_view_list->ITEM_NAME;?>" readonly>
								<div class="fv-plugins-message-container invalid-feedback"></div>
							</div>
							<label class="col-lg-2 col-form-label fw-semibold fs-6">Metal Type</label>
							<div class="col-lg-4 fv-row fv-plugins-icon-container">
								<input type="text" name="" class="form-control form-control-lg form-control-solid" placeholder="" value="<?php echo $productmaster_view_list->METAL_TYPE;?>" readonly>
								<div class="fv-plugins-message-container invalid-feedback"></div>
							</div>
						</div>
						<div class="row">
							<label class="col-lg-2 col-form-label fw-semibold fs-6">Unit Type</label>
							<div class="col-lg-4 fv-row fv-plugins-icon-container">
								<input type="text" name="" class="form-control form-control-lg form-control-solid" placeholder="Unit Type" value="<?php echo $productmaster_view_list->UNIT_TYPE;?>" readonly>
								<div class="fv-plugins-message-container invalid-feedback"></div>
							</div>
							<label class="col-lg-2 col-form-label fw-semibold fs-6">Category</label>
							<div class="col-lg-4 fv-row fv-plugins-icon-container">
								<input type="text" name="" class="form-control form-control-lg form-control-solid" placeholder="Category" value="<?php echo $productmaster_view_list->CATEGORY_NAME;?>" >
								<div class="fv-plugins-message-container invalid-feedback"></div>
							</div>
						</div>
					</div>
					<!--end::Modal body-->
				</div>
				<!--end::Modal content-->
			</form>
		</div>
			<!--end::Modal dialog-->
		<!-- </form> -->