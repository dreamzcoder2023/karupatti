<!-- <form id="kt_add_product_form" class="form"> -->
			<!--begin::Modal dialog-->
			<div class="modal-dialog modal-lg">
				<!--begin::Modal content-->
				<div class="modal-content rounded">
					<!--begin::Modal header-->
					<div class="modal-header justify-content-end border-0 pb-0">
						<!--begin::Close-->
						<div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal" onclick="closeEditModalproductmaster();">
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
					<form name="productmaster_edit_form" id="productmaster_edit_form" method="POST" action="<?php echo base_url(); ?>Productmaster/productmaster_update" enctype="multipart/form-data" onsubmit="return edit_productmaster_validation();">
					<!-- <input type="hidden" id="edit_productmaster" name="edit_productmaster" value="<?php echo $productmaster_list_edit->PRODUCT_ID;?>"> -->
					<div class="modal-body pt-0 pb-15 px-5 px-xl-20">
						<!--begin::Heading-->
						<div class="mb-13 text-center">
							<h1 class="mb-3">Modify Product Master</h1>	
						</div>
						<!--end::Heading-->
						<div class="row">
							<label class="col-lg-2 col-form-label required fw-semibold fs-6">Product ID</label>
							<div class="col-lg-4 fv-row fv-plugins-icon-container">
								<input type="text" name="edit_pid_prodmaster" id="edit_pid_prodmaster" class="form-control form-control-lg form-control-solid" placeholder="Product ID" oninput="this.value = this.value.replace(/[^A-Za-z0-9/\\-]/g, '').replace(/(\..*)\./g, '$1');" value="<?php echo $productmaster_list_edit->PRODUCT_ID;?>" readonly>
								<div class="fv-plugins-message-container invalid-feedback" id="edit_pid_prodmaster_err"></div>
							</div>
							<label class="col-lg-2 col-form-label required fw-semibold fs-6">Item Code</label>
							<div class="col-lg-4 fv-row fv-plugins-icon-container">
								<input type="text" name="edit_itcode_prodmaster" id="edit_itcode_prodmaster" class="form-control form-control-lg form-control-solid" placeholder="Item Code/SKU" oninput="this.value = this.value.replace(/[^A-Za-z0-9/\\-]/g, '').replace(/(\..*)\./g, '$1');" value="<?php echo $productmaster_list_edit->ITEM_CODE;?>">
								<div class="fv-plugins-message-container invalid-feedback" id="edit_itcode_prodmaster_err"></div>
							</div>
						</div>
						<div class="row">
							<label class="col-lg-2 col-form-label required fw-semibold fs-6">Item Name</label>
							<div class="col-lg-4 fv-row fv-plugins-icon-container">
								<input type="text" name="edit_Iname_prodmaster" id="edit_Iname_prodmaster" class="form-control form-control-lg form-control-solid" placeholder="Item Name" oninput="this.value = this.value.replace(/[^A-Za-z]/g, '').replace(/(\..*)\./g, '$1');" value="<?php echo $productmaster_list_edit->ITEM_NAME;?>">
								<div class="fv-plugins-message-container invalid-feedback" id="edit_Iname_prodmaster_err"></div>
							</div>
							<label class="col-lg-2 col-form-label required fw-semibold fs-6">Metal Type</label>
							<div class="col-lg-4 fv-row">
								<select class="form-select form-select-solid" name="edit_metal_prodmaster" id="edit_metal_prodmaster" data-control="select2" data-hide-search="true">
									<option value="">Select</option>
										<option value="GOLD" <?php if("GOLD"==$productmaster_list_edit->METAL_TYPE){echo "selected";}else{echo "";}?>>GOLD
										</option>
										<option value="SILVER" <?php if("SILVER"==$productmaster_list_edit->METAL_TYPE){echo "selected";}else{echo "";}?>>SILVER
										</option>
										<option value="STONE GOLD" <?php if("STONE GOLD"==$productmaster_list_edit->METAL_TYPE){echo "selected";}else{echo "";}?>>STONE GOLD</option>
								</select>
								<div class="fv-plugins-message-container invalid-feedback" id="edit_metal_prodmaster_err"></div>
							</div>
						</div>
						<div class="row">
							<label class="col-lg-2 col-form-label required fw-semibold fs-6">Unit Type</label>
							<div class="col-lg-4 fv-row">
								<select class="form-select form-select-solid" name="edit_unit_prodmaster" id="edit_unit_prodmaster" data-control="select2" data-hide-search="true">
									<option value="">Select</option>

										<?php
										$j=1;
										foreach($unit_list as $unitlist)
										{
										?>
										<option value="<?php echo $unitlist['UNIT_NAME'];?>" 
											<?php if($unitlist['UNIT_NAME']==$productmaster_list_edit->UNIT_TYPE){echo "selected";}else{echo "";}?>><?php echo $unitlist['UNIT_NAME'];?></option>
										<?php 
											$j++;
											}
										?>
								</select>
								<div class="fv-plugins-message-container invalid-feedback" id="edit_unit_prodmaster_err"></div>
							</div>
							<label class="col-lg-2 col-form-label required fw-semibold fs-6">Category</label>
							<div class="col-lg-4 fv-row">
								<select class="form-select form-select-solid" name="edit_cty_prodmaster" id="edit_cty_prodmaster" data-control="select2" data-hide-search="true">
									<option value="">Select</option>
									
										<?php
										$j=1;
										foreach($category_list as $categorylist)
										{
										?>
										<option value="<?php echo $categorylist['CAT_NAME'];?>" 
											<?php if($categorylist['CAT_NAME']==$productmaster_list_edit->CATEGORY_NAME){echo "selected";}else{echo "";}?>><?php echo $categorylist['CAT_NAME'];?></option>
										<?php 
											$j++;
											}
										?>
								</select>
								<div class="fv-plugins-message-container invalid-feedback" id="edit_cty_prodmaster_err"></div>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-8"></div>
							<div class="col-lg-1">
								<div class="d-flex flex-center flex-row-fluid pt-12">
									<button type="reset" class="btn btn-secondary me-8" data-bs-dismiss="modal">Cancel</button>
								</div>
							</div>
							<div class="col-lg-3">
								<div class="d-flex flex-center flex-row-fluid pt-12">
									<button type="submit" class="btn btn-primary" id="save_changes_edit_product">Save Changes</button>
								</div>
							</div>
						</div>		
					</div>
					<!--end::Modal body-->
				</div>
			</form>
				<!--end::Modal content-->
			</div>
			<!--end::Modal dialog-->
		<!-- </form> -->