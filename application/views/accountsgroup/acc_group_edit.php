<!--begin::Modal dialog-->
			<div class="modal-dialog modal-m">
				<!--begin::Modal content-->
				<div class="modal-content rounded">
					<!--begin::Modal header-->
					<div class="modal-header justify-content-end border-0 pb-0">
						<!--begin::Close-->
						<div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal" >
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
					<form name="acc_grp_edit_form" id="acc_grp_edit_form" method="POST" action="<?php echo base_url(); ?>accountsgroup/acc_grp_update" enctype="multipart/form-data" >

						<input type="hidden" id="acc_grp_id_edit" name="acc_grp_id_edit" value="<?php echo $acc_grp_list->GROUP_SNO;?>" onsubmit="return acc_grp_edit_validation();">
					<div class="modal-body pt-0 pb-15 px-5 px-xl-20">
						<!--begin::Heading-->
						<div class="mb-13 text-center">
							<h1 class="mb-3">Modify Group Details</h1>
						</div>
						<!--end::Heading-->
						<div class="row mb-6">
							<!--begin::Label-->
							<label class="col-lg-4 col-form-label required fw-semibold fs-6">Group Name</label>
							<!--end::Label-->
							<!--begin::Col-->
							<div class="col-lg-8 fv-row fv-plugins-icon-container">
								<input type="text" class="form-control form-control-lg form-control-solid" placeholder="Group Name" name="grp_name_edit" id="grp_name_edit" value="<?php echo $acc_grp_list->GROUP_NAME;?>">
								<div class="fv-plugins-message-container invalid-feedback"></div>
							</div>
							<!--end::Col-->
						</div>
						<div class="row mb-6">
							<label class="col-md-4 col-form-label required fw-semibold fs-6">Main Groups</label>
							<!--begin::Col-->
							<div class="col-lg-8 fv-row fv-plugins-icon-container">
								<!--begin::Select-->
								<select class="form-select form-select-solid" data-control="select2" data-hide-search="true"  name="under_grp_edit" id="under_grp_edit" onchange="return get_grp_details_edit(this.val)">	
									<option value="">Select Groups</option>
									<?php 
										foreach($under_grp_list as $ulist)
										{
									?>
										<option value="<?php echo $ulist['GROUP_NAME']; ?>" <?php if($ulist['GROUP_NAME']==$acc_grp_list->UNDER_GROUP) { echo "selected";  }?> > <?php echo $ulist['GROUP_NAME'] ?></option>
									<?php 
										}
									?>
								</select>
								<!--end::Select-->
							</div>
						</div>
						<center>
						<div class="row">
							
							<!--begin::Label-->
								<label class="col-lg-4 col-form-label  fw-bold fs-6" id="main_grp_edit" name="main_grp_edit"  style="color: blue;"><?php
								echo $acc_grp_details->UNDER_GROUP; ?></label>
							
							<!--end::Label-->
							<!--begin::Col-->
							<div class="col-lg-8 fv-row fv-plugins-icon-container">
								
									<label class="col-lg-4 col-form-label  fw-bold fs-6" id="sub_grp_edit" name="sub_grp_edit" style="color: blue;"><?php  
										if($acc_grp_details->AC_SUPER_ID==1 )
											{echo "ASSETS";}
										else if($acc_grp_details->AC_SUPER_ID==2)
											{ echo "LIABILITIES"; }
										else if($acc_grp_details->AC_SUPER_ID==3)
											{ echo "INCOME"; }
										else if($acc_grp_details->AC_SUPER_ID==4)
											{ echo "EXPENSE"; }
									?></label>
								
							</div>
							<!--end::Col-->
							
						</div>
						</center>
						<div class="row mb-6">
							<!--begin::Label-->
							<label class="col-lg-4 col-form-label required fw-semibold fs-6">Description</label>
							<!--end::Label-->
							<!--begin::Col-->
							<div class="col-lg-8 fv-row fv-plugins-icon-container">
								<input type="text" class="form-control form-control-lg form-control-solid" placeholder="Description" name="description_edit" id="description_edit" value="<?php echo $acc_grp_list->DESCRIPTION;?>">
								<div class="fv-plugins-message-container invalid-feedback"></div>
							</div>
							<!--end::Col-->
						</div>
						
						<!--begin::Actions-->
						<div class="row">
							<div class="col-lg-4"></div>
							<div class="col-lg-2">
								<div class="d-flex flex-center flex-row-fluid pt-12">
									<button type="reset" class="btn btn-secondary me-3" >Cancel</button>
								</div>
							</div>
							<div class="col-lg-6">
								<div class="d-flex flex-center flex-row-fluid pt-12">
									<button type="submit" class="btn btn-primary" >Save Changes</button>
								</div>
							</div>
						</div>
						<!--end::Actions-->
					</div>
					<!--end::Modal body-->
				</div>
				<!--end::Modal content-->
			</div>
			<!--end::Modal dialog-->