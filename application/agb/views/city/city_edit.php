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
					<form name="city_edit_form" id="city_edit_form" method="POST" action="<?php echo base_url(); ?>city/city_update" enctype="multipart/form-data" onsubmit="return city_edit_validation();">
						<input type="hidden" id="city_id" name="city_id" value="<?php echo $city_details->CITYID;?>">
						<div class="modal-body pt-0 pb-15 px-5 px-xl-20">
							<!--begin::Heading-->
							<div class="mb-13 text-center">
								<h1 class="mb-3">Modify City</h1>
								
							</div>
							<!--end::Heading-->
							<div class="row mb-6">

								<!--begin::Label-->
								<label class="col-lg-4 col-form-label required fw-semibold fs-6">Zone Name</label>
								<!--end::Label-->
								<div class="col-lg-8">
									<!--begin::Select-->
									<select data-control="select2" class="form-select form-select-solid fw-semibold" data-dropdown-parent="#kt_modal_edit_city" id="zone_edit" name="zone_edit" onchange="get_area_edit(this.value);" >
										<option value="">Select Zone</option>
									<?php
										$zqry=$this->db->query("SELECT * FROM ZONE_MASTER ");
										$zonelist=$zqry->result_array();
										$j=1;
										foreach($zonelist as $zlist1)
										{

									?>
										<option value="<?php echo $zlist1['SNO']; ?>" 
											<?php if($zlist1['SNO']==$city_details->ZONEID){echo "selected";}else{echo "";}?> > <?php echo $zlist1['ZONENAME'];?></option>
									<?php 
										$j++;
										}
									?>
										
									</select>
									<div class="fv-plugins-message-container invalid-feedback" id="zone_edit_err"></div>
									<!--end::Select-->
								</div>
							</div>
							<div class="row mb-6">
								<!--begin::Label-->
								<label class="col-lg-4 col-form-label required fw-semibold fs-6">Area Name</label>
								<!--end::Label-->
								<div class="col-lg-8">
									<!--begin::Select-->
									<select data-control="select2" class="form-select form-select-solid fw-semibold" data-dropdown-parent="#kt_modal_edit_city" id="area_edit" name="area_edit" >
										<option value="">Select Area</option>
											<?php 
											$aqry=$this->db->query("SELECT * FROM AREA WHERE ZONE_SNO='".$city_details->ZONEID."'");
											$alist=$aqry->result_array();
											foreach($alist as $res)
											{
											?>
												<option value="<?php echo $res['SNO']; ?>" <?php if($res['SNO']==$city_details->AREAID) { echo "selected";}?>> <?php echo $res['AREANAME']; ?></option>
											<?php 
											}
											?>
									</select>
									<div class="fv-plugins-message-container invalid-feedback" id="area_edit_err"></div>
									<!--end::Select-->
								</div>
							</div>
							<div class="row mb-6">
								<!--begin::Label-->
								<label class="col-lg-4 col-form-label required fw-semibold fs-6">City Name</label>
								<!--end::Label-->
								<!--begin::Col-->
								<div class="col-lg-8 fv-row fv-plugins-icon-container">
									<input type="text" name="city_edit" id="city_edit" class="form-control form-control-lg form-control-solid" placeholder="City Name" value="<?php echo $city_details->CITYNAME;?>" onkeyup="city_unique_edit()">
									<div class="fv-plugins-message-container invalid-feedback" id="city_edit_err"></div>
								</div>
								<!--end::Col-->
							</div>
							<!--begin::Actions-->
							<div class="row">
								<div class="col-lg-4"></div>
								<div class="col-lg-2">
									<div class="d-flex flex-center flex-row-fluid pt-12">
										<button type="reset" class="btn btn-secondary me-3" data-bs-dismiss="modal" >Cancel</button>
									</div>
								</div>
								<div class="col-lg-6">
									<div class="d-flex flex-center flex-row-fluid pt-12">
										<button type="submit" class="btn btn-primary" id="ed_btnSubmit" data-bs-dismiss="modal">Save Changes</button>
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
			<!--end::Modal dialog-->