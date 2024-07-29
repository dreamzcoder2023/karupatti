<!--begin::Modal dialog-->
			<div class="modal-dialog modal-m">
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
					<form name="street_edit_form" id="street_edit_form" method="POST" action="<?php echo base_url(); ?>street/street_update" enctype="multipart/form-data" onsubmit="return street_edit_validation();">
						<input type="hidden" id="street_id" name="street_id" value="<?php echo $street_details->STREETID;?>">
					<div class="modal-body pt-0 pb-15 px-5 px-xl-20">
						<!--begin::Heading-->
						<div class="mb-13 text-center">
							<h1 class="mb-3">Modify Street</h1>
							
						</div>
						<!--end::Heading-->
						<div class="row mb-6">
							<!--begin::Label-->
							<label class="col-lg-4 col-form-label required fw-semibold fs-6">Zone Name</label>
							<!--end::Label-->
							<div class="col-lg-8">
								<!--begin::Select-->
								<select class="form-select form-select-solid cdrop" data-control="select2" data-hide-search="true" onchange="get_area_edit()" id="zone_edit" name="zone_edit">
									<?php
										$zqry=$this->db->query("SELECT * FROM ZONE_MASTER ");
										$zonelist=$zqry->result_array();
										$j=1;
										foreach($zonelist as $zlist1)
										{											

									?>
										<option value="<?php echo $zlist1['SNO']; ?>" <?php 
										if($street_details->ZONEID == $zlist1['SNO'])
											{ echo "selected";}?>> <?php echo $zlist1['ZONENAME'];?></option>
									<?php 
										$j++;
										}
									?>	
									
								</select>
								<!--end::Select-->
							</div>
						</div>
						<div class="row mb-6">
							<!--begin::Label-->
							<label class="col-lg-4 col-form-label required fw-semibold fs-6">Area Name</label>
							<!--end::Label-->
							<div class="col-lg-8">
								<!--begin::Select-->
								<select class="form-select form-select-solid cdrop" data-control="select2" data-hide-search="true" id="area_edit" name="area_edit" onchange="get_city_edit()">
									<?php
										$aqry=$this->db->query("SELECT * FROM AREA WHERE ZONE_SNO='".$street_details->ZONEID."'");
										$arealist=$aqry->result_array();
										$j=1;
										foreach($arealist as $alist1)
										{											

									?>
										<option value="<?php echo $alist1['SNO']; ?>" <?php 
										if($street_details->AREAID == $alist1['SNO'])
											{ echo "selected";}?>> <?php echo $alist1['AREANAME'];?></option>
									<?php 
										$j++;
										}
									?>	
										
								</select>
								<!--end::Select-->
							</div>
						</div>
						<div class="row mb-6">
							<!--begin::Label-->
							<label class="col-lg-4 col-form-label required fw-semibold fs-6">City Name</label>
							<!--end::Label-->
							<div class="col-lg-8">
								<!--begin::Select-->
								<select class="form-select form-select-solid cdrop" data-control="select2" data-hide-search="true" id="city_edit" name="city_edit">
										<?php
										$cqry=$this->db->query("SELECT * FROM CITY WHERE AREAID='".$street_details->AREAID."'");
										$citylist=$cqry->result_array();
										$j=1;
										foreach($citylist as $clist1)
										{											

									?>
										<option value="<?php echo $clist1['CITYID']; ?>" <?php 
										if($street_details->CITYID == $clist1['CITYID'])
											{ echo "selected";}?>> <?php echo $clist1['CITYNAME'];?></option>
									<?php 
										$j++;
										}
									?>	
								</select>
								<!--end::Select-->
							</div>
						</div>
						<div class="row mb-6">
							<!--begin::Label-->
							<label class="col-lg-4 col-form-label required fw-semibold fs-6">Village Name</label>
							<!--end::Label-->
							<div class="col-lg-8">
								<!--begin::Select-->
								<select class="form-select form-select-solid cdrop" data-control="select2" data-hide-search="true" id="village_edit" name="village_edit">
										<?php
										$vqry=$this->db->query("SELECT * FROM VILLAGE WHERE CITYID='".$street_details->CITYID."'");
										$villagelist=$vqry->result_array();
										$j=1;
										foreach($villagelist as $vlist1)
										{											

									?>
										<option value="<?php echo $vlist1['VILLAGEID']; ?>" <?php 
										if($street_details->VILLAGEID == $vlist1['VILLAGEID'])
											{ echo "selected";}?>> <?php echo $vlist1['VILLAGENAME'];?></option>
									<?php 
										$j++;
										}
									?>	
								</select>
								<!--end::Select-->
							</div>
						</div>
						<div class="row mb-6">
							<!--begin::Label-->
							<label class="col-lg-4 col-form-label required fw-semibold fs-6">Street Name</label>
							<!--end::Label-->
							<!--begin::Col-->
							<div class="col-lg-8 fv-row fv-plugins-icon-container">
								<input type="text" name="street_edit" id="street_edit" class="form-control form-control-lg form-control-solid" placeholder="Street Name" value="<?php echo $street_details->STREETNAME;?>" >
								<div class="fv-plugins-message-container invalid-feedback" id="street_edit_err"></div>
							</div>
							<!--end::Col-->
						</div>
						<!--begin::Actions-->
						<div class="row">
							<div class="col-lg-4"></div>
							<div class="col-lg-2">
								<div class="d-flex flex-center flex-row-fluid pt-12">
									<button type="reset" class="btn btn-secondary me-3" data-bs-dismiss="modal" onclick="closeEditModal();" >Cancel</button>
								</div>
							</div>
							<div class="col-lg-6">
								<div class="d-flex flex-center flex-row-fluid pt-12">
									<button type="submit" class="btn btn-success" data-bs-dismiss="modal">Save Changes</button>
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