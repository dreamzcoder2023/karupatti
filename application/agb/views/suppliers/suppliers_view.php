<!--begin::Modal dialog-->
			<div class="modal-dialog modal-xl">
				<!--begin::Modal content-->
				<div class="modal-content rounded">
					<!--begin::Modal header-->
					<div class="modal-header justify-content-end border-0 pb-0">
						<!--begin::Close-->
						<div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal" onclick="closeViewModalSuppliers();">
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
					<form name="suppliers_view_form" id="suppliers_view_form" method="POST" action="<?php echo base_url(); ?>Suppliers/suppliers_view" enctype="multipart/form-data">
						<input type="hidden" id="suppliers_view_id" name="suppliers_view_id" value="<?php echo $suppliers_view_list->LEDGER_SNO;?>">
					<div class="modal-body pt-0 pb-15 px-5 px-xl-20">
						<!--begin::Heading-->
						<div class="mb-13 text-center">
							<h1 class="mb-3">View Supplier Details</h1>	
						</div>
						<!--end::Heading-->
						<div class="row">
							<div class="col-lg-6">
									<div class="row">
										<label class="col-lg-5 col-form-label fw-semibold fs-6">Supplier Name</label>
										<div class="col-lg-7 fv-row fv-plugins-icon-container">
											<label class="col-form-label fw-bold fs-4"><?php echo $suppliers_view_list->LEDGER_NAME;?></label>
										</div>
									</div>
										<div class="row">
										<label class="col-lg-5 col-form-label fw-semibold fs-6">Address</label>
										<div class="col-lg-7 fv-row fv-plugins-icon-container">
											<label class="col-form-label fw-bold fs-4"><?php echo $suppliers_view_list->ADDRESS;?></label>
										</div>
									</div>
									<div class="row">
									<label class="col-lg-5 col-form-label fw-semibold fs-6">Zone</label>
								
										<div class="col-lg-7 fv-row fv-plugins-icon-container">
											<label class="col-form-label fw-bold fs-4"><?php echo $suppliers_view_list->ADDRESS2;?></label>
										</div>
									
									</div>
									<div class="row">
										<label class="col-lg-5 col-form-label fw-semibold fs-6">City</label>
									<div class="col-lg-7 fv-row fv-plugins-icon-container">
										<label class="col-form-label fw-bold fs-4"><?php echo $suppliers_view_list->CITY;?></label>
									</div>
									</div>
									<div class="row">
										<label class="col-lg-5 col-form-label fw-semibold fs-6">State</label>
										<div class="col-lg-7 fv-row">
											<label class="col-form-label fw-bold fs-4"><?php 
												if(is_null($suppliers_view_list->STATE))
												{echo '-'; }
												else{
													echo $suppliers_view_list->STATE;}?></label>
										</div>
									</div>
									<div class="row">
										<label class="col-lg-5 col-form-label fw-semibold fs-6">PAN No</label>
										<div class="col-lg-7 fv-row fv-plugins-icon-container">
											<label class="col-form-label fw-bold fs-4"><?php echo $suppliers_view_list->PAN_NO;?></label>
										</div>
									</div>
									<div class="row">
										<label class="col-lg-5 col-form-label fw-semibold fs-6">Remarks</label>
										<div class="col-lg-7 fv-row fv-plugins-icon-container">
											<label class="col-form-label fw-bold fs-4"><?php echo $suppliers_view_list->DESCRIPTION;?></label>
										</div>
									</div>
							</div>
							<div class="col-lg-6">
									<div class="row">
										<label class="col-lg-5 col-form-label fw-semibold fs-6">Account Group</label>
										<div class="col-lg-7 fv-row">

										<label class="col-form-label fw-bold fs-4"><?php 
											if(is_null($suppliers_view_list->GROUP_NAME))
											{echo '-'; }
											else{
												echo $suppliers_view_list->GROUP_NAME;}?></label>
									</div>
									<div class="row">
										<label class="col-lg-5 col-form-label fw-semibold fs-6">Mobile</label>
										<div class="col-lg-7 fv-row">
										<label class="col-form-label fw-bold fs-4"><?php echo $suppliers_view_list->PHONE;?></label>
										</div>
									</div>
									<div class="row">
										<label class="col-lg-5 col-form-label fw-semibold fs-6">Email ID</label>
										<div class="col-lg-7 fv-row fv-plugins-icon-container">
											<label class="col-form-label fw-bold fs-4"><?php echo $suppliers_view_list->EMAIL;?></label>
										</div>
									</div>
									<div class="row">
										<label class="col-lg-5 col-form-label fw-semibold fs-6">ID Type</label>
										<div class="col-lg-7 fv-row">

										<label class="col-form-label fw-bold fs-4"><?php 
											if(is_null($suppliers_view_list->IDTYPENAME))
											{echo '-'; }
											else{
												echo $suppliers_view_list->IDTYPENAME;}?></label>
										</div>
									</div>
									<div class="row">
										<label class="col-lg-5 col-form-label  fw-semibold fs-6">Opening Balance</label>
										<div class="col-lg-7 fv-row fv-plugins-icon-container">
											<label class="col-form-label fw-bold fs-4"><?php echo number_format($suppliers_view_list->OP_BALANCE?$suppliers_view_list->OP_BALANCE:0,2,'.',',');?></label>
										</div>
									</div>
									
									<div class="row">
										<label class="col-lg-5 col-form-label fw-semibold fs-6">GSTIN No</label>
										<div class="col-lg-7 fv-row fv-plugins-icon-container">
											<label class="col-form-label fw-bold fs-4"><?php echo $suppliers_view_list->GST_NO;?></label>
										</div>
									</div>
									
									
							</div>
						</div>
					</div>
					<!--end::Modal body-->
				</form>
			</div>
			<!--end::Modal content-->
		</div>
	<!--end::Modal dialog