	<!--begin::Modal dialog-->
			<div class="modal-dialog modal-xl">
				<!--begin::Modal content-->
				<div class="modal-content rounded">
					<!--begin::Modal header-->
					<div class="modal-header justify-content-end border-0 pb-0">
						<!--begin::Close-->
						<div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal" onclick="closeEditModalproducts();">
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
				<form name="products_edit_form" id="products_edit_form" method="POST" action="<?php echo base_url(); ?>Products/products_update" enctype="multipart/form-data" onsubmit="return products_validation_edit();">
					<input type="hidden" id="edit_products" name="edit_products" value="<?php echo $products_list_edit->ITEM_SNO;?>">

						<div class="modal-body pt-0 pb-15 px-5 px-xl-20">
						<!--begin::Heading-->
							<div class="mb-13 text-center">
								<h1 class="mb-3">Modify Product</h1>	
							</div>
						<!--end::Heading-->
						<div class="row">
							<!--begin::Label-->
							<label class="col-lg-2 col-form-label required fw-semibold fs-6">Item Code/SKU</label>
							<!--end::Label-->
							<!--begin::Col-->
							<div class="col-lg-2 fv-row fv-plugins-icon-container">
								<input type="text" name="edit_itcode_prod" id="edit_itcode_prod" class="form-control form-control-lg form-control-solid" placeholder="Item Code/SKU" oninput="this.value = this.value.replace(/[^A-Za-z0-9/\\-]/g, '').replace(/(\..*)\./g, '$1');" value="<?php echo $products_list_edit->ITEM_CODE;?>">
								<div class="fv-plugins-message-container invalid-feedback" id="edit_itcode_prod_err"></div>
							</div>
							<!--end::Col-->
							<!--begin::Label-->
							<label class="col-lg-2 col-form-label required fw-semibold fs-6">Item Name</label>
							<!--end::Label-->
							<!--begin::Col-->
							<div class="col-lg-2 fv-row fv-plugins-icon-container">
								<input type="text" name="edit_Iname_prod" id="edit_Iname_prod" class="form-control form-control-lg form-control-solid" placeholder="Item Name" value="<?php echo $products_list_edit->ITEM_NAME;?>">
								<div class="fv-plugins-message-container invalid-feedback" id="edit_Iname_prod_err"></div>
							</div>
							<!--end::Col-->	

							<!--begin::Label-->
							<label class="col-lg-2 col-form-label required fw-semibold fs-6">Metal Type</label>
							<!--end::Label-->
							<!--begin::Left Section-->
							<div class="col-lg-2 fv-row">
							<!--begin::Select-->
								<select class="form-select form-select-solid" data-control="select2" name="metal_list_prod_edit"  id="metal_list_prod_edit" data-hide-search="true">
										<option value="">Select Metal Type</option>

										<option value="GOLD" <?php if("GOLD"==$products_list_edit->METAL){echo "selected";}else{echo "";}?>>GOLD
										</option>
										<option value="SILVER" <?php if("SILVER"==$products_list_edit->METAL){echo "selected";}else{echo "";}?>>SILVER
										</option>
										<option value="STONE GOLD" <?php if("STONE GOLD"==$products_list_edit->METAL){echo "selected";}else{echo "";}?>>STONE GOLD</option>		
								</select>
								<!--end::Select-->
								<div class="fv-plugins-message-container invalid-feedback" id="metal_list_prod_edit_err"></div>
							</div>
							<!--end::Left Section-->
							
						</div>
						<div class="row">
							<!--begin::Label-->
							<label class="col-lg-2 col-form-label required fw-semibold fs-6">Unit Type</label>
							<!--end::Label-->
							<!--begin::Left Section-->
							<div class="col-lg-2 fv-row">
							<!--begin::Select-->
								<select class="form-select form-select-solid" data-control="select2" name="unit_list_prod_edit"  id="unit_list_prod_edit" data-hide-search="true">
									
									<option value="">Select Unit Type</option>
										<?php
										$j=1;
										foreach($unit_list as $unitlist)
										{
										?>
										<option value="<?php echo $unitlist['UNIT_NAME'];?>" 
											<?php if($unitlist['UNIT_NAME']==$products_list_edit->UNIT_NAME){echo "selected";}else{echo "";}?>><?php echo $unitlist['UNIT_NAME'];?></option>
										<?php 
											$j++;
											}
										?>
								<!--end::Select-->	
								</select>
								<div class="fv-plugins-message-container invalid-feedback" id="unit_list_prod_edit_err"></div>
							</div>
							<!--end::Left Section-->
							<!--begin::Label-->
							<label class="col-lg-2 col-form-label required fw-semibold fs-6">Category Type</label>
							<!--end::Label-->
							<!--begin::Left Section-->
							<div class="col-lg-2 fv-row">
							<!--begin::Select-->
								<select class="form-select form-select-solid" data-control="select2" name="category_list_prod_edit"  id="category_list_prod_edit" data-hide-search="true">
									 <option value="">Select Category Type</option>
										<?php
										$j=1;
										foreach($category_list as $categorylist)
										{
										?>
										<option value="<?php echo $categorylist['CAT_NAME'];?>" 
											<?php if($categorylist['CAT_NAME']==$products_list_edit->CATEGORY){echo "selected";}else{echo "";}?>><?php echo $categorylist['CAT_NAME'];?></option>
										<?php 
											$j++;
											}
										?>
								</select>
								<!--end::Select-->
								<div class="fv-plugins-message-container invalid-feedback" id="category_list_prod_edit_err"></div>
							</div>
							<!--end::Left Section-->

							<!--begin::Label-->
							<label class="col-lg-2 col-form-label required fw-semibold fs-6">Purchase Rate</label>
							<!--end::Label-->
							<!--begin::Col-->
							<div class="col-lg-2 fv-row fv-plugins-icon-container">
								<input type="text" name="edit_pur_rat_prod" id="edit_pur_rat_prod" class="form-control form-control-lg form-control-solid" placeholder="Purchase Rate" style="font-size: 15px !important;font-weight: 550 !important;" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" value="<?php echo $products_list_edit->PURCHASE_RATE;?>">
								<div class="fv-plugins-message-container invalid-feedback"></div>
							</div>
							<!--end::Col-->	
							<div class="fv-plugins-message-container invalid-feedback" id="edit_pur_rat_prod_err"></div>
						</div>
						<div class="row">
								
							<!--begin::Label-->
							<label class="col-lg-2 col-form-label required fw-semibold fs-6">Sales Rate</label>
							<!--end::Label-->
							<!--begin::Col-->
							<div class="col-lg-2 fv-row fv-plugins-icon-container">
								<input type="text" name="edit_sl_rat_prod" id="edit_sl_rat_prod" class="form-control form-control-lg form-control-solid" placeholder="Sales Rate" style="font-size: 15px !important;font-weight: 550 !important;" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" value="<?php echo $products_list_edit->SALES_RATE;?>">
								<div class="fv-plugins-message-container invalid-feedback" id="edit_sl_rat_prod_err"></div>
							</div>
							<!--end::Col-->
							<!--begin::Label-->
							<label class="col-lg-2 col-form-label fw-semibold fs-6">HSN Code</label>
							<!--end::Label-->
							<!--begin::Col-->
							<div class="col-lg-2 fv-row fv-plugins-icon-container">
								<input type="" name="edit_hsn_prod" id="edit_hsn_prod" class="form-control form-control-lg form-control-solid" placeholder="HSN Code" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" value="<?php echo $products_list_edit->HSN_CODE;?>">
								<div class="fv-plugins-message-container invalid-feedback"></div>
							</div>
							<!--end::Col-->
							<!--begin::Label-->
							<label class="col-lg-2 col-form-label fw-semibold fs-6">Opening Stock</label>
							<!--end::Label-->
							<!--begin::Col-->
							<div class="col-lg-2 fv-row fv-plugins-icon-container">
								<input type="text" name="edit_op_st_prod" id="edit_op_st_prod" class="form-control form-control-lg form-control-solid" placeholder="Opening Stock" style="font-size: 15px !important;font-weight: 600 !important;" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" value="<?php echo $products_list_edit->OP_QTY;?>">
								<div class="fv-plugins-message-container invalid-feedback" id="edit_op_st_prod_err"></div>
							</div>
							<!--end::Col-->

						</div>
						<div class="row">		
							
							<!--begin::Label-->
							<label class="col-lg-2 col-form-label fw-semibold fs-6">Opening Rate</label>
							<!--end::Label-->
							<!--begin::Col-->
							<div class="col-lg-2 fv-row fv-plugins-icon-container">
								<input type="text" name="edit_op_rat_prod" id="edit_op_rat_prod" class="form-control form-control-lg form-control-solid" placeholder="Opening Rate" style="font-size: 15px !important;font-weight: 550 !important;" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" value="<?php echo $products_list_edit->OP_RATE;?>">
								<div class="fv-plugins-message-container invalid-feedback" id="edit_op_rat_prod_err"></div>
							</div>
							<!--end::Col-->
							<!--begin::Label-->
							<label class="col-lg-2 col-form-label fw-semibold fs-6">Opening Value</label>
							<!--end::Label-->
							<!--begin::Col-->
							<div class="col-lg-2 fv-row fv-plugins-icon-container">
								<input type="text" name="edit_op_vl_prod" id="edit_op_vl_prod" class="form-control form-control-lg form-control-solid" placeholder="Opening Value" style="font-size: 15px !important;font-weight: 550 !important;" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" value="<?php echo $products_list_edit->OP_VALUE;?>">
								<div class="fv-plugins-message-container invalid-feedback" id="edit_op_vl_prod_err"></div>
							</div>
							<!--end::Col-->
							<!--begin::Label-->
							<label class="col-lg-2 col-form-label fw-semibold fs-6">Current Stock</label>
							<!--end::Label-->
							<!--begin::Col-->
							<div class="col-lg-2 fv-row fv-plugins-icon-container">
								<input type="text" name="edit_cur_st_prod" id="edit_cur_st_prod" class="form-control form-control-lg form-control-solid" placeholder="Current Stock" style="font-size: 15px !important;font-weight: 550 !important;" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" value="<?php echo $products_list_edit->STOCK_QTY;?>">
								<div class="fv-plugins-message-container invalid-feedback" id="edit_cur_st_prod_err"></div>
							</div>
							<!--end::Col-->
						</div>
						<div class="row">
							<!--begin::Label-->
							<label class="col-lg-2 col-form-label fw-semibold fs-6">Rate</label>
							<!--end::Label-->
							<!--begin::Col-->
							<div class="col-lg-2 fv-row fv-plugins-icon-container">
								<input type="text" name="edit_cur_rt_prod" id="edit_cur_rt_prod" class="form-control form-control-lg form-control-solid" placeholder="Current Rate" style="font-size: 15px !important;font-weight: 550 !important;" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" value="<?php echo $products_list_edit->CLOSING_RATE;?>">
								<div class="fv-plugins-message-container invalid-feedback" id="edit_cur_rt_prod_err"></div>
							</div>
							<!--end::Col-->
							<!--begin::Label-->
							<label class="col-lg-2 col-form-label fw-semibold fs-6">Current Value</label>
							<!--end::Label-->
							<!--begin::Col-->
							<div class="col-lg-2 fv-row fv-plugins-icon-container">
								<input type="text" name="edit_cur_val_prod" id="edit_cur_val_prod" class="form-control form-control-lg form-control-solid" placeholder="Current Value" style="font-size: 15px !important;font-weight: 550 !important;" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" value="<?php echo $products_list_edit->CLOSING_VALUE;?>">
								<div class="fv-plugins-message-container invalid-feedback" id="edit_cur_val_prod_err"></div>
							</div>
							<!--end::Col-->
							<!--begin::Label-->
							<label class="col-lg-2 col-form-label fw-semibold fs-6">GST Percentage</label>
							<!--end::Label-->
							<!--begin::Col-->
							<div class="col-lg-2 fv-row fv-plugins-icon-container">
								<input type="text" name="edit_gst_per_prod" id="edit_gst_per_prod" 
								class="form-control form-control-lg form-control-solid" placeholder="GST%"
								oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" value="<?php echo $products_list_edit->PURCHASE_GST;?>">
								<div class="fv-plugins-message-container invalid-feedback" id="edit_gst_per_prod_err"></div>
							</div>
							<!--end::Col-->
							<!--begin::Label-->
							<label class="col-lg-2 col-form-label fw-semibold fs-6">Remarks</label>
							<!--end::Label-->
							<!--begin::Col-->
								<div class="col-lg-2 fv-row fv-plugins-icon-container">
								<input type="text" name="prod_rmks_edit" id="prod_rmks_edit" 
								class="form-control form-control-lg form-control-solid" placeholder=""
								value="<?php echo $products_list_edit->Remarks;?>">
									<div class="fv-plugins-message-container invalid-feedback"></div>
								</div>
							<!--end::Col-->
						</div>		
						<!--begin::Actions-->
						<div class="row">
							<div class="col-lg-9"></div>
							<div class="col-lg-1">
								<div class="d-flex flex-center flex-row-fluid pt-12">
									<button type="reset" class="btn btn-secondary me-3" data-bs-dismiss="modal" onclick="closeEditModalproducts();">Cancel</button>
								</div>
							</div>
							<div class="col-lg-2">
								<div class="d-flex flex-center flex-row-fluid pt-12">
									<button type="submit" class="btn btn-primary" id="save_changes_edit_product">Save Changes</button>
								</div>
							</div>
						</div>
						<!--end::Actions-->
					</div>
					<!--end::Modal body-->
					</form>
				</div>
				<!--end::Modal content-->
			</div>
		<!--end::Modal dialog-->
