<!-- <form id="kt_add_product_form" class="form"> -->
			<!--begin::Modal dialog-->
			<div class="modal-dialog modal-m">
				<!--begin::Modal content-->
				<div class="modal-content rounded">
					<!--begin::Modal header-->
					<div class="modal-header justify-content-end border-0 pb-0">
						<!--begin::Close-->
						<div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal" onclick="closeEditModalProductCategory();"> 
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
						<form name="prodcategory_edit_form" id="prodcategory_edit_form" method="POST" action="<?php echo base_url(); ?>Productcategory/productcategory_update" enctype="multipart/form-data" onsubmit="return productcategory_validation_edit();">
						<input type="hidden" name="prodcategory_edit" id="prodcategory_edit" value="<?php echo $products_list_edit->CATEGORY_ID;?>">

						<!--begin::Heading-->
						<div class="mb-13 text-center">
							<h1 class="mb-3">Modify Product Category</h1>	
						</div>
						<!--end::Heading-->
						<div class="row">
							<label class="col-lg-4 col-form-label required fw-semibold fs-6">Category</label>
							<div class="col-lg-8 fv-row fv-plugins-icon-container">
								<input type="text" name="category_name_edit" id="category_name_edit" class="form-control form-control-lg form-control-solid" placeholder="category" value="<?php echo $products_list_edit->CATEGORY_NAME;?>">
								<div class="fv-plugins-message-container invalid-feedback" id="prod_cat_edit_err"></div>
							</div>
							<!--end::Col-->
						</div>		
						<div class="d-flex flex-center flex-row-fluid pt-12">
							<button type="reset" class="btn btn-secondary me-5" data-bs-dismiss="modal" onclick="closeEditModalProductCategory();">Cancel</button>
							<button type="submit" class="btn btn-primary" name="save_category_edit" id="save_category_edit">Save Changes</button>
						</div>
					</div>
					<!--end::Modal body-->
				</form>
			</div>
		<!--end::Modal content-->