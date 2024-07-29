<!--begin::Modal dialog-->
<div class="modal-dialog modal-xl">
	<!--begin::Modal content-->
	<div class="modal-content rounded">
		<!--begin::Modal header-->
		<div class="modal-header justify-content-end border-0 pb-0">
			<!--begin::Close-->
			<div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
				<!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
				<span class="svg-icon svg-icon-1" onclick="closeEditModal();">
					<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
						<rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="currentColor" />
						<rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="currentColor" />
					</svg>
				</span>
				
			</div>
			<!--end::Close-->
		</div>
		<!--end::Modal header-->
		<!--begin::Modal body-->
		<div class="modal-body pt-0 pb-8 px-5 px-xl-20">
			<!--begin::Heading-->
			<div class="mb-7 text-center">
				<h1>Edit Tag Details</h1>
			</div>
			<!--end::Heading-->
			<form action="<?php echo base_url(); ?>Tagentry/edit" method="post">
			<div style="padding: 10px 10px 10px 10px !important;box-shadow: 0 3px 6px #00002947;border-radius: 5px;background-color: #f5f5f1 !important;">
				<div class="row">
					<div class="col-lg-4">
						
						<div class="row">
							<label class="col-lg-4 col-form-label fw-semibold fs-6">Date :</label>
							<label class="col-lg-8 col-form-label fw-bold fs-6"><?php echo $tagentry_list->tag_date; ?></label>
							
							
							<label class="col-lg-4 col-form-label fw-semibold fs-6">Tag No :</label>
							<label class="col-lg-8 col-form-label fw-bold fs-6"><?php echo $tagentry_list->tag_id; ?></label>
							
							<label class="col-lg-4 col-form-label fw-semibold fs-6">Item Type :</label>
							<label class="col-lg-8 col-form-label fw-bold fs-6"><?php echo $tagentry_list->metal_type; ?></label>

							<label class="col-lg-4 col-form-label fw-semibold fs-6">Item Name :</label>
							<label class="col-lg-8 col-form-label fw-bold fs-6"><?php echo $tagentry_list->item_name; ?></label>
							
							<!-- <label class="col-lg-4 col-form-label fw-semibold fs-6">Tax % :</label>
							<div class="col-lg-8 fv-row fv-plugins-icon-container">
								<input type="text" name="" class="form-control form-control-lg form-control-solid" value="6.5">
								<div class="fv-plugins-message-container invalid-feedback"></div>
							</div> -->
						</div>

					</div>
					<div class="col-lg-4">
						<div class="row">

							<label class="col-lg-5 col-form-label fw-semibold fs-6">Sub Item Name :</label>
							<input type="hidden" name="tag_no" type="tag_no" value="<?php echo $tagentry_list->tag_no; ?>">
							<div class="col-lg-7 fv-row fv-plugins-icon-container">
								<!--<input type="text" name="" class="form-control form-control-lg form-control-solid" value="Hand Chain">-->
								<select class="form-select form-select-solid" data-control="select2" data-hide-search="false" name="subitem" id="subitem">	
																		<option value="">Select SubItem</option>	
																		<?php $subitem_list  = $this->db->query("SELECT * FROM SUBITEM_LIST WHERE ITEM_NAME='".$tagentry_list->item_name."' ")->result_array(); ?>
																		<?php foreach($subitem_list as $slist){   ?>			
																		<option value="<?php echo $slist['SUBITEM_NAME']  ?>" <?php if($slist['SUBITEM_NAME']==$tagentry_list->subitem_name ){ echo 'selected';} ?>><?php echo $slist['SUBITEM_NAME']  ?></option>
																		<?php  } ?>
																	</select>
								<div class="fv-plugins-message-container invalid-feedback"></div>
							</div>
							<!-- <label class="col-lg-6 col-form-label fw-bold fs-6">Hand Chain</label> -->
							<label class="col-lg-5 col-form-label fw-semibold fs-6">Weight(gms) :</label>
							<div class="col-lg-7 fv-row fv-plugins-icon-container">
								<input type="text" name="weight" id="weight" class="form-control form-control-lg form-control-solid" value="<?php echo $tagentry_list->weight; ?>">
								<div class="fv-plugins-message-container invalid-feedback"></div>
							</div>
							<!-- <label class="col-lg-6 col-form-label fw-bold fs-6">3.200</label> -->
							<label class="col-lg-5 col-form-label fw-semibold fs-6">Stone(gms):</label>
							<div class="col-lg-7 fv-row fv-plugins-icon-container">
								<input type="text" name="stone" id="stone" class="form-control form-control-lg form-control-solid" value="<?php echo $tagentry_list->stone; ?>">
								<div class="fv-plugins-message-container invalid-feedback"></div>
							</div>
							<!-- <label class="col-lg-6 col-form-label fw-bold fs-6">0.200</label> -->
							<label class="col-lg-5 col-form-label fw-semibold fs-6">Net Wgt(gms) :</label>
							<div class="col-lg-7 fv-row fv-plugins-icon-container">
								<input type="text" name="net_weight" id="net_weight" class="form-control form-control-lg form-control-solid" value="<?php echo $tagentry_list->net_weight; ?>">
								<div class="fv-plugins-message-container invalid-feedback"></div>
							</div>
							<!-- <label class="col-lg-6 col-form-label fw-bold fs-4">3.400</label> -->
						</div>
					</div>
					<div class="col-lg-4">
						<div class="row">
							<label class="col-lg-4 col-form-label fw-semibold fs-6">Photo</label>
							<div class="col-lg-8 fv-row">
									<!--begin::Image input-->
									<div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url()">
											<!--begin::Preview existing avatar-->
											<div class="image-input-wrapper"  style="background-image: url(<?php echo base_url() ?>tag_img/<?php echo $tagentry_list->img; ?>)"></div>
											<!--end::Preview existing avatar-->
											<!--begin::Label-->
											<label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" data-kt-initialized="1">
												<i class="bi bi-pencil-fill fs-10"></i>
												<!--begin::Inputs-->
												<input type="file" name="add_party_new_loan" accept=".png, .jpg, .jpeg">
												<input type="hidden" name="add_party_remove_new_loan">
												<!--end::Inputs-->
											</label>
											<!--end::Label-->
											<!--begin::Cancel-->
											<span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" data-kt-initialized="1">
												<i class="bi bi-x fs-6"></i>
											</span>
											<!--end::Cancel-->
											<!--begin::Remove-->
											<span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" data-kt-initialized="1">
												<i class="bi bi-x fs-6"></i>
											</span>
											<!--end::Remove-->
									</div>
									<!--end::Image input-->
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="mt-4 d-flex justify-content-end">
					<button type="reset" class="btn btn-secondary me-2" data-bs-dismiss="modal" onclick="closeEditModal();">Cancel</button>
					<button type="submit" class="btn btn-primary" id="" >Save Changes</button>
			</div>
			</form>
		</div>
		<!--end::Modal body-->
	</div>
	<!--end::Modal content-->
</div>
<!--end::Modal dialog-->
		