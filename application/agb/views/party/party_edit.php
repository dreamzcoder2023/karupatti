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
					<form name="party_edit_form" id="party_edit_form" method="POST" action="<?php echo base_url(); ?>party/party_update" enctype="multipart/form-data" >
						<input type="hidden" id="party_id_edit" name="party_id_edit" value="<?php echo $party_details->PID;?>" onsubmit="return party_edit_validation();">
					<div class="modal-body pt-0 pb-15 px-5 px-xl-20">
						<!--begin::Heading-->
						<div class="mb-13 text-center">
							<h1 class="mb-3">Modify Party</h1>
						</div>
						<!--end::Heading-->
						<div class="row mb-6">
							<!--begin::Label-->
							<span class="text-muted fw-semibold fs-5" style="text-align: right !important;">Party ID: <?php echo $party_details->PID; ?></span>
							
							<label class="col-lg-1 col-form-label required fw-semibold fs-6">Name</label>
							<!--end::Label-->
							<!--begin::Col-->
							<div class="col-lg-3 fv-row fv-plugins-icon-container">
								<input type="text" name="party_name_edit" id="party_name_edit" class="form-control form-control-lg form-control-solid" placeholder="Party Name" value="<?php echo $party_details->NAME;  ?>">
								<div class="fv-plugins-message-container invalid-feedback" id="party_name_edit_err" name="party_name_edit_err"></div>
							</div>
							<!--end::Col-->			
							<!--begin::Label-->
							<label class="col-lg-1 col-form-label required fw-semibold fs-6">L.Name</label>
							<!--end::Label-->
							<!--begin::Col-->
							<div class="col-lg-3 fv-row fv-plugins-icon-container">
								<div class="row"> 
								<div class="col-lg-4">
									<select class="form-select form-select-solid" data-control="select2" data-placeholder="" name="prefix_edit" id="prefix_edit" data-hide-search="true" style="width: 75px;" >
										<option value="S/o" <?php if($party_details->LASTNAME_PREFIX=='S/o'){echo "selected"; } ?>>S/o</option>
										<option value="D/o" <?php if($party_details->LASTNAME_PREFIX=='D/o'){echo "selected"; } ?>>D/o</option>
										<option value="W/o" <?php if($party_details->LASTNAME_PREFIX=='W/o'){echo "selected"; } ?>>W/o</option>
										<option value="C/o" <?php if($party_details->LASTNAME_PREFIX=='C/o'){echo "selected"; } ?>>C/o</option>
									</select></div>
								<div class="col-lg-8">
								<input type="text" name="lname_edit" id="lname_edit" class="form-control form-control-lg form-control-solid col-lg-2" placeholder="Last" value="<?php echo $party_details->FATHERSNAME;?>"></div>
								</div>
								<div class="fv-plugins-message-container invalid-feedback"  id="lname_edit_err" name="lname_edit_err"></div>
							</div>
							<!--end::Col-->
							<!--begin::Label-->
							<label class="col-lg-1 col-form-label fw-semibold fs-6">Oth.Name</label>
							<!--end::Label-->
							<!--begin::Col-->
							<div class="col-lg-3 fv-row fv-plugins-icon-container">
								<input type="text" name="oname_edit" id="oname_edit" class="form-control form-control-lg form-control-solid" placeholder="Guardian Name" value="<?php echo $party_details->OTHER_NAME;?>">
								<div class="fv-plugins-message-container invalid-feedback" name="oname_edit_err" id="oname_edit_err" ></div>
							</div>
							<!--end::Col-->
							<!--begin::Label-->
							<label class="col-lg-1 col-form-label fw-semibold fs-6">Mother</label>
							<!--end::Label-->
							<!--begin::Col-->
							<div class="col-lg-3 fv-row fv-plugins-icon-container">
								<input type="text" name="mother_name_edit" id="mother_name_edit" class="form-control form-control-lg form-control-solid" placeholder="Mother Name" value="<?php echo $party_details->MOTHER_NAME;?>">
								<div class="fv-plugins-message-container invalid-feedback" name="mother_name_edit_err" id="mother_name_edit_err" ></div>
							</div>
							<!--end::Col-->
							
							<!--begin::Label-->
							<label class="col-lg-1 col-form-label required fw-semibold fs-6">Zone</label>
							<!--end::Label-->
							<!--begin::Left Section-->
							<div class="col-lg-3">
								<!--begin::Select-->
								<select class="form-select form-select-solid" data-control="select2" data-placeholder="Select Zone" name="zone_edit" id="zone_edit" data-hide-search="true" onchange="get_area_edit()" >
									<option selected>Select Zone</option>
									<?php
										$zone_name=$this->db->query("select z.*,A.AREANAME from AREA A ,ZONE_MASTER z where  a.AREANAME='".$party_details->AREA."' and z.SNO=a.ZONE_SNO")->row();

										$zqry=$this->db->query("SELECT * FROM ZONE_MASTER ");
										$zonelist=$zqry->result_array();
										$j=1;
										foreach($zonelist as $zlist1)
										{

									?>
										<option value="<?php echo $zlist1['SNO']; ?>" <?php 
										if($zone_name->SNO == $zlist1['SNO'])
											{ echo "selected";}?> > <?php echo $zlist1['ZONENAME'];?></option>
									<?php 
											$j++;
										}
									?>	
								</select>
								<!--end::Select-->
							</div>
							<!--end::Left Section-->
							<!--begin::Label-->
							<label class="col-lg-1 col-form-label required fw-semibold fs-6">Area</label>
							<!--end::Label-->
							<!--begin::Left Section-->
							<div class="col-lg-3">
								<!--begin::Select-->
								<select class="form-select form-select-solid" data-control="select2" data-placeholder="Select Area" data-hide-search="true" name="area_edit" id="area_edit" onchange="get_city_edit()">
									<option selected>Select Area</option>
									<?php
										$aqry=$this->db->query("SELECT * FROM AREA WHERE AREANAME='".$party_details->AREA."'");
										$arealist=$aqry->result_array();
										$j=1;
										foreach($arealist as $alist1)
										{											

									?>
										<option value="<?php echo $alist1['AREANAME']; ?>" <?php 
										if($party_details->AREA == $alist1['AREANAME'])
											{ echo "selected";}?> > <?php echo $alist1['AREANAME'];?></option>
									<?php 
										$j++;
										}
									?>	
								</select>
								<!--end::Select-->
							</div>

							<!--begin::Label-->
							<label class="col-lg-1 col-form-label fw-semibold fs-6">Street</label>
							<!--end::Label-->
							<!--begin::Col-->
							<div class="col-lg-3 fv-row fv-plugins-icon-container">
								<div class="row"> 
								<div class="col-lg-3">
								<input type="text" name="doorno_edit" id="doorno_edit" class="form-control form-control-lg form-control-solid" placeholder="DoorNo" value="<?php echo $party_details->DOORNO;?>"></div>
								<div class="col-lg-9">
								<input type="text" name="address_edit" id="address_edit" class="form-control form-control-lg form-control-solid col-lg-2" placeholder="Address" value="<?php echo $party_details->ADDRESS1;?>"></div>
								</div>
								<div class="fv-plugins-message-container invalid-feedback" name="address_edit_err" id="address_edit_err" value="<?php echo $party_details->ADDRESS1;?>"></div>
							</div>
							<!--end::Col-->
							<!-- <div class="col-lg-2 fv-row fv-plugins-icon-container"> -->
								<!-- <div class="row"> 
								<div class="col-lg-1"> -->
								<!-- <input type="text" name="company" class="form-control form-control-lg form-control-solid" placeholder="Address" style="width:35px;"></div> -->
								<!-- <div class="col-lg-2"> -->
								<!-- <input type="text" name="company" class="form-control form-control-lg form-control-solid col-lg-2" placeholder="Address"> </div> --> 
								<!-- </div> -->
								<!-- <div class="fv-plugins-message-container invalid-feedback"></div> -->
							<!-- </div> -->
							<!--begin::Label-->
							<label class="col-lg-1 col-form-label required fw-semibold fs-6">City</label>
							<!--end::Label-->
							<!--begin::Left Section-->
							<div class="col-lg-3">
								<!--begin::Select-->
								<select class="form-select form-select-solid" name="city_edit" id="city_edit" data-control="select2" data-placeholder="Select City" data-hide-search="true" onchange="get_village_edit()">
									<option selected>Select City</option>
									<?php
										$cqry=$this->db->query("SELECT * FROM CITY WHERE CITYNAME='".$party_details->CITY."'");
										$citylist=$cqry->result_array();
										$j=1;
										foreach($citylist as $clist1)
										{											

									?>
										<option value="<?php echo $clist1['CITYNAME']; ?>" <?php 
										if($party_details->CITY == $clist1['CITYNAME'])
											{ echo "selected";}?>> <?php echo $clist1['CITYNAME'];?></option>
									<?php 
										$j++;
										}
									?>	
								</select>
								<!--end::Select-->
							</div>
							<!--end::Left Section-->
							<!--begin::Label-->
							<label class="col-lg-1 col-form-label required fw-semibold fs-6">Village</label>
							<!--end::Label-->
							<!--begin::Left Section-->
							<div class="col-lg-3">
								<!--begin::Select-->
								<select class="form-select form-select-solid" data-control="select2" data-placeholder="Select Village" data-hide-search="true" name="village_edit" id="village_edit">
									<option selected>Select Village</option>
									<?php
										$cqry=$this->db->query("SELECT * FROM VILLAGE WHERE VILLAGENAME='".$party_details->ADDRESS2."'");
										$villagelist=$cqry->result_array();
										$j=1;
										
										foreach($villagelist as $clist1)
										{											

									?>
										<option value="<?php echo $clist1['VILLAGENAME']; ?>" <?php 
										if($party_details->VILLAGE == $clist1['VILLAGENAME'])
											{ echo "selected";}?>> <?php echo $clist1['VILLAGENAMEME'];?></option>
									<?php 
										$j++;
										}
									?>	
								</select>
								<!--end::Select-->
							</div>
							<!--end::Left Section-->
							<!--begin::Label-->
							<label class="col-lg-1 col-form-label fw-semibold fs-6">Landmark</label>
							<!--end::Label-->
							<!--begin::Left Section-->
							<div class="col-lg-3 fv-row fv-plugins-icon-container">
								<input type="text" name="landmark_edit" id="landmark_edit" class="form-control form-control-lg form-control-solid" placeholder="Landmark"  value="<?php echo $party_details->LANDMARK;?>">
								<div class="fv-plugins-message-container invalid-feedback" name="landmark_edit_err" id="landmark_edit_err"></div>
							</div>
							<!--end::Left Section-->
							<!--begin::Label-->
							<label class="col-lg-1 col-form-label required fw-semibold fs-6">Mobile</label>
							<!--end::Label-->
							<!--begin::Col-->
							<div class="col-lg-3 fv-row fv-plugins-icon-container">
								<input type="text" name="mobile_edit" id="mobile_edit" class="form-control form-control-lg form-control-solid" placeholder="Mobile" required value="<?php echo $party_details->PHONE;?>">
								<div class="fv-plugins-message-container invalid-feedback" name="mobile_edit_err" id="mobile_edit_err"></div>
							</div>
							<!--end::Col-->
							<!--begin::Label-->
							<label class="col-lg-1 col-form-label  fw-semibold fs-6">Phone</label>
							<!--end::Label-->
							<!--begin::Col-->
							<div class="col-lg-3 fv-row fv-plugins-icon-container">
								<input type="text" name="phone2_edit" id="phone2_edit" class="form-control form-control-lg form-control-solid" placeholder=" Alter Phone" value="<?php echo $party_details->PHONE2; ?>" >
								<div class="fv-plugins-message-container invalid-feedback" name="phone2_edit_err" id="phone2_edit_err"></div>
							</div>
							<!--end::Col-->
							<!--begin::Col-->
							<div class="col-lg-1 fv-row fv-plugins-icon-container fv-plugins-bootstrap5-row-invalid">
								<!--begin::Options-->
								<div class="d-flex align-items-center mt-3">
									<!--begin::Option-->
									<label class="form-check form-check-inline form-check-solid me-5 is-invalid" style="float: right;padding-left: 80px;">
										<input class="form-check-input" name="w_chk_edit" id="w_chk_edit" type="checkbox" <?php if ($party_details->WHATSAPP==''){echo "checked";} ?>  onchange="EEnableDisableTextBox()">
										<!--<span class="fw-semibold ps-2 fs-6">Branch Status</span>-->
									</label>
									<!--end::Option-->
								</div>
								<!--end::Options-->
							</div>
							<!--end::Col-->
							<!--begin::Label-->
							<label class="col-lg-3 col-form-label fw-semibold fs-6">Phone no Same as WhatsApp no</label>
							<!--end::Label-->
							<!-- <div id="whatsapp" style="display: none;"> -->
								<!--begin::Label-->
								
								<label id="w_lbl_edit" name="w_lbl_edit" class="col-lg-1 col-form-label required fw-semibold fs-6" style="display: none;">Whatsapp No</label>
								<!--end::Label-->
								<!--begin::Col-->
								<div class="col-lg-3 fv-row fv-plugins-icon-container" id="w_div_edit" style="display: none;">
									<input type="text" name="w_no_edit" id="w_no_edit" class="form-control form-control-lg form-control-solid" placeholder=" Whatsapp Phone" style="display: none;" value="<?php echo $party_details->WHATSAPP; ?>" >
									<div class="fv-plugins-message-container invalid-feedback" id="w_msg_div_edit" style="display: none;"></div>
								</div>
								
								<!--end::Col-->
							<!-- </div> -->
							
							<!--begin::Label-->
							<label class="col-lg-1 col-form-label fw-semibold fs-6">Email</label>
							<!--end::Label-->
							<!--begin::Col-->
							<div class="col-lg-3 fv-row fv-plugins-icon-container">
								<input type="text" name="email_edit" id="email_edit" class="form-control form-control-lg form-control-solid" placeholder="Email ID" value="<?php echo $party_details->EMAIL; ?>">
								<div class="fv-plugins-message-container invalid-feedback" name="email_edit_err" id="email_edit_err" ></div>
							</div>
							<!--end::Col-->			
							<!--begin::Label-->
							<label class="col-lg-1 col-form-label required fw-semibold fs-6">Aadhar</label>
							<!--end::Label-->
							<!--begin::Col-->
							<div class="col-lg-3 fv-row fv-plugins-icon-container">
								<input type="text" name="aadhar_edit" id="aadhar_edit" class="form-control form-control-lg form-control-solid" placeholder="Aadhar No" required value="<?php echo $party_details->AADHAAR_NO; ?>">
								<div class="fv-plugins-message-container invalid-feedback" name="aadhar_edit_err" id="aadhar_edit_err" ></div>
							</div>
							<!--end::Col-->
							<!--begin::Label-->
							<label class="col-lg-1 col-form-label  fw-semibold fs-6">ID Type</label>
							<!--end::Label-->
							<!--begin::Left Section-->
							<div class="col-lg-3">
								<!--begin::Select-->
								<select class="form-select form-select-solid" data-control="select2" data-placeholder="Select ID" data-hide-search="true" id="idtype_edit" name="idtype_edit">
									<option selected="">Select ID</option>
									<?php
										$idqry=$this->db->query("SELECT * FROM IDTYPE where status!=2");
										$idlist=$idqry->result_array();
										$i=1;
										foreach($idlist as $list1)
										{

									?>
										<option value="<?php echo $list1['IDTYPENAME']; ?>" <?php if($list1['IDTYPENAME']==$party_details->ID_TYPE){ echo "selected ";}?>> <?php echo $list1['IDTYPENAME'];?></option>
									<?php 
										$i++;
										}
									?>
								</select>
								<!--end::Select-->
							</div>
							<!--begin::Label-->
							<label class="col-lg-1 col-form-label fw-semibold fs-6">ID No</label>
							<!--end::Label-->
							<!--begin::Col-->
							<div class="col-lg-3 fv-row fv-plugins-icon-container">
								<input type="text" name="id_no_edit" id="id_no_edit" class="form-control form-control-lg form-control-solid" placeholder="ID Number" value="<?php if(($party_details->ID_TYPE!='') && !is_null($party_details->ID_TYPE)){ echo $party_details->ID_NUMBER;}else { echo ''; }?>">
								<div class="fv-plugins-message-container invalid-feedback" name="id_no_edit_err" id="id_no_edit_err" ></div>
							</div>
							<!--end::Col-->
							<!--begin::Label-->
							<label class="col-lg-1 col-form-label required fw-semibold fs-6">Work</label>
							<!--end::Label-->
							<!--begin::Left Section-->
							<div class="col-lg-3">
								<!--begin::Select-->
								<select class="form-select form-select-solid" data-control="select2" data-placeholder="Select Work" data-hide-search="true" id="worktype_edit" name="worktype_edit">
									<option selected="">Select Work</option>
									<?php
										$wqry=$this->db->query("SELECT * FROM WORKTYPE WHERE WORKTYPEID!=2");
										$worklist=$wqry->result_array();
										$w=1;
										foreach($worklist as $wlist)
										{

									?>
										<option value="<?php echo $wlist['WORKTYPENAME']; ?>" <?php if($wlist['WORKTYPENAME']==$party_details->WORK_TYPE) {echo "selected";}?>> <?php echo $wlist['WORKTYPENAME'];?></option>
									<?php 
										$w++;
										}
									?>
									<!-- <option value="2">Lawyer</option> -->
								</select>
								<!--end::Select-->
							</div>
							<!-- <div class="col-lg-3"></div> -->
							<label class="col-lg-2 col-form-label required fw-semibold fs-6">Customer Rating</label>
							
							<!--begin:Label-->
							<div class="col-lg-1 d-flex align-items-center me-2 bg-success " style="border-radius: 15px;">
								<!--begin:Input-->
								<div class="form-check form-check-custom">
									<input class="form-check-input2" type="radio" name="rating_edit" id="rating_edit" value="3" <?php if($party_details->RATING==3){echo "checked";} ?> />
								</div>
								<!--end:Input-->
								<!--begin::Description-->
								<div class="d-flex flex-column ">
									<div class="fs-6 fw-semibold text-muted"  style="padding-left: 10px;">Good</div>
								</div>
								<!--end:Description-->
							</div>
							<!--end:Label-->
							<!--begin:Label-->
							<div class="col-lg-1 d-flex align-items-center me-2 bg-warning" style="border-radius: 15px;">
								<!--begin:Input-->
								<div class="form-check form-check-custom">
									<input class="form-check-input2" type="radio" name="rating_edit" id="rating_edit" value="2" <?php if($party_details->RATING==2){echo "checked";} ?> />
								</div>
								<!--end:Input-->
								<!--begin::Description-->
								<div class="d-flex flex-column">
									<div class="fs-6 fw-semibold text-muted"  style="padding-left: 10px;">Avg</div>
								</div>
								<!--end:Description-->
							</div>
							<!--end:Label-->
							<!--begin:Label-->
							<div class="col-lg-1 d-flex align-items-center me-2 bg-danger" style="border-radius: 15px;">
								<!--begin:Input-->
								<input class="form-check-input2" type="radio" name="rating_edit" id="rating_edit" value="1" <?php if($party_details->RATING==1){echo "checked";} ?>  />
								<!--end:Input-->
								<!--begin::Description-->
								<div class="d-flex flex-column">
									<div class="fs-6 fw-semibold text-muted"  style="padding-left: 10px;">Bad</div>
								</div>
								<!--end:Description-->
							</div>
							<!--end:Label-->
						</div>
						<div class="row mb-6">
							<!--begin::Label-->
							<label class="col-lg-1 col-form-label required fw-semibold fs-6">Party</label>
							<!--end::Label-->
							<!--begin::Col-->
							<div class="col-lg-3">
								<!--begin::Image input-->
								<div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url('assets/media/svg/avatars/blank.svg')">
									<!--begin::Preview existing avatar-->

									<?php 

										if($party_details->PHOTO == '')
										{
									?>
									<div class="image-input-wrapper w-125px h-125px" style="background-image: url(assets/media/svg/avatars/blank.svg)"></div>
									<?php 
										}
										else
										{
											//  $str = ltrim($str, 'g')
											// $photo=ltrim($party_details->PHOTO,'0x');
									?>

									<!-- <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($party_details->PHOTO); ?> " height="125px" width="125px" > -->
									<img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($party_details->PHOTO); ?> " height="125px" width="125px" >
									<?php
										}
									?>
									<!--end::Preview existing avatar-->
									<!--begin::Label-->
									<label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" data-kt-initialized="1">
										<i class="bi bi-pencil-fill fs-7"></i>
										<!--begin::Inputs-->
										<input type="file" name="avatar" accept=".png, .jpg, .jpeg">
										<input type="hidden" name="avatar_remove">
										<!--end::Inputs-->
									</label>
									<!--end::Label-->
									<!--begin::Cancel-->
									<span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" data-kt-initialized="1">
										<i class="bi bi-x fs-2"></i>
									</span>
									<!--end::Cancel-->
									<!--begin::Remove-->
									<span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" data-kt-initialized="1">
										<i class="bi bi-x fs-2"></i>
									</span>
									<!--end::Remove-->
								</div>
								<!--end::Image input-->
								<!--begin::Hint-->
								<div class="form-text">Allowed file types: png, jpg, jpeg.</div>
								<!--end::Hint-->
							</div>
							<!--end::Col-->
							<!--begin::Label-->
							<label class="col-lg-1 col-form-label required fw-semibold fs-6">Other</label>
							<!--end::Label-->
								<!--begin::Col-->
								<div class="col-lg-3">
									<!--begin::Image input-->
									<div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url('assets/media/svg/avatars/blank.svg')">
										<!--begin::Preview existing avatar-->
										<?php 
										if($party_details->OTHER_PHOTO == '')
										{
										?>
										<div class="image-input-wrapper w-125px h-125px" style="background-image: url(assets/media/svg/avatars/blank.svg)">
											
										</div>
										<?php 
										}
										else
										{

										?>
										<img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($party_details->PHOTO); ?> " height="125px" width="125px" >
										<?php
											}
										?>
										<!--end::Preview existing avatar-->
										<!--begin::Label-->
										<label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" data-kt-initialized="1">
											<i class="bi bi-pencil-fill fs-7"></i>
												<!--begin::Inputs-->
												<input type="file" name="avatar" accept=".png, .jpg, .jpeg">
												<input type="hidden" name="avatar_remove">
												<!--end::Inputs-->
										</label>
										<!--end::Label-->
										<!--begin::Cancel-->
										<span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" data-kt-initialized="1">
											<i class="bi bi-x fs-2"></i>
										</span>
										<!--end::Cancel-->
										<!--begin::Remove-->
										<span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" data-kt-initialized="1">
											<i class="bi bi-x fs-2"></i>
										</span>
										<!--end::Remove-->
									</div>
									<!--end::Image input-->
									<!--begin::Hint-->
									<div class="form-text">Allowed file types: png, jpg, jpeg.</div>
									<!--end::Hint-->
								</div>
								<!--end::Col-->	
						</div>
						<!--begin::Actions-->
						<div class="row" style="margin-top: -3rem !important;">
							<div class="col-lg-9"></div>
							<div class="col-lg-1">
								<div class="d-flex flex-center flex-row-fluid pt-12">
									<button type="reset" class="btn btn-secondary me-3" data-bs-dismiss="modal" onclick="closeEditModal();">Cancel</button>
								</div>
							</div>
							<div class="col-lg-2">
								<div class="d-flex flex-center flex-row-fluid pt-12">
									<button type="submit" class="btn btn-success" >Save Changes</button>
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
			<!--end::Modal dialog