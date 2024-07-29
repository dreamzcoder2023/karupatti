begin::Modal dialog-->
			<div class="modal-dialog modal-xl">
				<!--begin::Modal content-->
				<div class="modal-content rounded">
					<!--begin::Modal header-->
					<div class="modal-header justify-content-end border-0 pb-0">
						<!--begin::Close-->
						<div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal" onclick="closeEditModal();">
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
					<form name="item_edit_form" id="item_edit_form" method="POST" action="<?php echo base_url(); ?>item/item_update" enctype="multipart/form-data" onsubmit="return edit_item_validation();">
						<input type="hidden" id="sno_edit" name="sno_edit" value="<?php echo $item_details->SNO;?>">
					<div class="modal-body pt-0 pb-15 px-5 px-xl-20">
						<!--begin::Heading-->
							<div class="mb-13 text-center">
								<h1 class="mb-3">Modify Item</h1>	
							</div>
						<!--end::Heading-->
						<div class="row">
							
							<!--begin::Label-->
							<label class="col-lg-2 col-form-label required fw-semibold fs-6">Item Type</label>
							<!--end::Label-->
							<!--begin::Left Section-->
							<div class="col-lg-2 fv-row">
							<!--begin::Select-->
								<select class="form-select form-select-solid" data-control="select2" name="item_type_edit"  id="item_type_edit" data-hide-search="true">

									<!-- <option value="">Select Category</option> -->
										<?php
										$j=1;
										
										foreach($item_type_list as $itemtypelist)
										{?>
										<option value="<?php echo $itemtypelist['jewel_type_id'];?>" <?php if($item_details->jewel_type_id==$itemtypelist['jewel_type_id']){ echo "selected"; }  ?>><?php echo $itemtypelist['jewel_type'];?></option><?php
										 }					?>
									
								</select>
								<!--end::Select-->
								<div class="fv-plugins-message-container invalid-feedback" id="category_item_edit_err"></div>
							</div>
							<!--end::Left Section-->
							<!--begin::Label-->
							<label class="col-lg-2 col-form-label required fw-semibold fs-6">Item Name</label>
							<!--end::Label-->
							<!--begin::Col-->
							<div class="col-lg-3 fv-row fv-plugins-icon-container">
								<input type="text" name="name_item_edit" id="name_item_edit" class="form-control form-control-lg form-control-solid" value="<?php echo $item_details->ITEMNAME;?>">
								<div class="fv-plugins-message-container invalid-feedback" id="name_item_edit_err"></div>
							</div>
							<!--end::Col-->
							<!--begin::Label-->
						
							<!--end::Col-->
							<!--begin::Label-->
							<!-- <label class="col-lg-1 col-form-label required fw-semibold fs-6">Unit</label> -->
							<!--end::Label-->
							<!--begin::Col-->
						</div>
						<!--begin::Actions-->
						<div class="row">
							<div class="col-lg-9"></div>
							<div class="col-lg-1">
								<div class="d-flex flex-center flex-row-fluid pt-12">
									<button type="reset" class="btn btn-secondary me-3" data-bs-dismiss="modal" onclick="closeEditModal();">Cancel</button>
								</div>
							</div>
							<div class="col-lg-2">
								<div class="d-flex flex-center flex-row-fluid pt-12">
									<button type="submit" class="btn btn-primary" id="item_edit_save">Save Changes</button>
								</div>
							</div>
						</div>
						<!--end::Actions-->
					</div>
				</form>
					<!--end::Modal body-->
				</div>
				<!--end::Modal content-->
			</div>
		<!--end::Modal dialog