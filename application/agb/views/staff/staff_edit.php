<!-- <form id="kt_edit_staff_list_form" class="form">JS VAlidation ID--> 
	<!--begin::Modal dialog-->
				<div class="modal-dialog modal-xl">
					<!--begin::Modal content-->
					<div class="modal-content rounded">
						<!--begin::Modal header-->
						<div class="modal-header justify-content-end border-0 pb-0">
							<!--begin::Close-->
							<div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal"
								onclick="closeEditModalstaff();">
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
					<form name="edit_staff_list_form" id="edit_staff_list_form" method="POST" action="<?php echo base_url();?>staff/staff_update" enctype="multipart/form-data" onsubmit="return staff_edit_validation();">
								<input type="hidden" id="edit_staff" name="edit_staff" value="<?php echo $stafflist_edit_details->SNO;?>"> 
						<div class="modal-body pt-0 pb-15 px-5 px-xl-20">
							<!--begin::Heading-->
							<div class="mb-13 text-center">
								<h1 class="mb-3">Modify Staff Details </h1>
								
							</div>
							<!--end::Heading-->
							<div class="row mb-6">
								<!--begin::Label-->
								<label class="col-lg-1 col-form-label required fw-semibold fs-6">Company</label>
								<!--end::Label-->
								<!--begin::Left Section-->
								<div class="col-lg-2 fv-row">
									<select class="form-select form-select-solid cdrop" data-control="select2" data-hide-search="true" id="edit_staff_company" name="edit_staff_company">
										<option value="">Select Company</option>
										<?php
										$j=1;
										foreach($company_list as $stafflist1)
										{

										?>
										<option value="<?php echo $stafflist1['COMPANYCODE'];?>" 
											<?php if($stafflist1['COMPANYCODE']==$stafflist_edit_details->COMPANYCODE){echo "selected";}else{echo "";}?>><?php echo $stafflist1['COMPANYNAME'];?></option>
										<?php 
											$j++;
											}
										?>
									</select>
									<div class="fv-plugins-message-container invalid-feedback" id="edit_staff_company_err"></div>
								</div>
								<!--end::Left Section-->
								<!--begin::Label-->
								<label class="col-lg-1 col-form-label required fw-semibold fs-6">Staff ID</label>
								<!--end::Label-->
								<!--begin::Col-->
								<div class="col-lg-2 fv-row fv-plugins-icon-container">
									<input type="text" name="edit_sid_staff_list" class="form-control form-control-lg form-control-solid"  placeholder="Staff Id" name="edit_sid_staff_list" value="<?php echo $stafflist_edit_details->StaffID;?>">

									<div class="fv-plugins-message-container invalid-feedback"></div>
								</div>
								<!--end::Col-->
													
								<!--begin::Label-->
								<label class="col-lg-1 col-form-label required fw-semibold fs-6">Name</label>
								<!--end::Label-->
								<!--begin::Col-->
								<div class="col-lg-2 fv-row fv-plugins-icon-container">
									<input type="text" name="edit_sname_staff_list" id="edit_sname_staff_list" class="form-control form-control-lg form-control-solid" placeholder="Staff Name" value="<?php echo $stafflist_edit_details->STAFFNAME;?>">
									<div class="fv-plugins-message-container invalid-feedback" id="edit_sname_staff_list_err"></div>
								</div>
								<!--end::Col-->
									<!--begin::Label-->
								<label class="col-lg-1 col-form-label required fw-semibold fs-6">F.Name</label>
								<!--end::Label-->
								<!--begin::Col-->
								<div class="col-lg-2 fv-row fv-plugins-icon-container">
									<input type="text" name="edit_fname_staff_list" id="edit_fname_staff_list" class="form-control form-control-lg form-control-solid" placeholder="Father Name" 
									value="<?php echo $stafflist_edit_details->FatherName;?>">
									<div class="fv-plugins-message-container invalid-feedback" id="edit_fname_staff_list_err"></div>
								</div>
								<!--end::Col-->
								<!--begin::Label-->
								<label class="col-lg-1 col-form-label required fw-semibold fs-6">Gender</label>
								<!--end::Label-->
									<!--begin::Left Section-->
								<div class="col-lg-2 fv-row">
								<!--begin::Select-->
									<select class="form-select form-select-solid cdrop" data-control="select2" data-hide-search="true" name="edit_staffgender_staff_list" id="edit_staffgender_staff_list">
										<option value="">Select Gender</option>
										<option value="Male" <?php if("Male"==$stafflist_edit_details->Gender){echo "selected";}else{echo "";}?>>Male</option>
										<option value="Female" <?php if("Female"==$stafflist_edit_details->Gender){echo "selected";}else{echo "";}?>>Female</option>
								</select>
								<!--end::Select-->
							
									<div class="fv-plugins-message-container invalid-feedback" id="edit_staffgender_staff_list_err"></div>
								</div>
								<!--End::Left Section-->
								<!--begin::Label-->
								<label class="col-lg-1 col-form-label required fw-semibold fs-6">City</label>
								<!--end::Label-->
								<!--begin::Left Section-->
								<div class="col-lg-2 fv-row">
									<select class="form-select form-select-solid cdrop" data-control="select2" data-hide-search="true" id="edit_staff_city" name="edit_staff_city">
										<option value="">Select City</option>
										<?php
										$j=1;
										foreach($city_list as $citylist1)
										{

										?>
										<option value="<?php echo $citylist1['CITYID'];?>" 
											<?php if($citylist1['CITYID']==$stafflist_edit_details->City){echo "selected";}else{echo "";}?>><?php echo $citylist1['CITYNAME'];?></option>
										<?php 
											$j++;
											}
										?>
									</select>
									<div class="fv-plugins-message-container invalid-feedback" id="edit_staff_city_err"></div>
								</div>
								<!--End::Left Section-->					
								
								<!--begin::Label-->
								<label class="col-lg-1 col-form-label required fw-semibold fs-6">Aadhar.No</label>
								<!--end::Label-->
								<!--begin::Col-->
								<div class="col-lg-2 fv-row fv-plugins-icon-container">
									<input type="text" name="edit_saadharno_staff_list" id="edit_saadharno_staff_list" class="form-control form-control-lg form-control-solid" placeholder="Aadhar Number" value="<?php echo $stafflist_edit_details->AadharNo;?>">
									<div class="fv-plugins-message-container invalid-feedback" id="edit_saadharno_staff_list_err"></div>
								</div>
								<!--end::Col-->	
											<!--begin::Label-->
								<label class="col-lg-1 col-form-label required fw-semibold fs-6">ID Proof</label>
								<!--end::Label-->
								<!--begin::Col-->
								<div class="col-lg-2 fv-row fv-plugins-icon-container">
									<input type="text" name="edit_sidproof_staff_list" id="edit_sidproof_staff_list" class="form-control form-control-lg form-control-solid" placeholder="Id Proof" value="<?php echo $stafflist_edit_details->IDProof;?>">
									<div class="fv-plugins-message-container invalid-feedback" id="edit_sidproof_staff_list_err"></div>
								</div>
								<!--end::Col-->							
								<!--begin::Label-->
								<label class="col-lg-1 col-form-label required fw-semibold fs-6">Phone</label>
								<!--end::Label-->
								<!--begin::Col-->
								<div class="col-lg-2 fv-row fv-plugins-icon-container">
									<input type="text" name="edit_sphone_staff_list" id="edit_sphone_staff_list" class="form-control form-control-lg form-control-solid" placeholder="Phone No" value="<?php echo $stafflist_edit_details->PHONE;?>" onkeyup="staff_phone_unique_edit(this.value,<?php echo $stafflist_edit_details->PHONE;?>);">
									<div class="fv-plugins-message-container invalid-feedback" id="edit_sphone_staff_list_err"></div>
								</div>
								<!--end::Col-->
								<!--begin::Label-->
								<label class="col-lg-1 col-form-label required fw-semibold fs-6">DOB</label>
								<!--end::Label-->
								<!--begin::Col-->
								<div class="col-lg-2 fv-row fv-plugins-icon-container">
									<div class="d-flex align-items-center">
										<!--begin::Svg Icon | path: icons/duotune/general/gen014.svg-->
										<span class="svg-icon position-absolute ms-4 svg-icon-2 dt">
											<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
												<path opacity="0.3" d="M21 22H3C2.4 22 2 21.6 2 21V5C2 4.4 2.4 4 3 4H21C21.6 4 22 4.4 22 5V21C22 21.6 21.6 22 21 22Z" fill="currentColor" />
												<path d="M6 6C5.4 6 5 5.6 5 5V3C5 2.4 5.4 2 6 2C6.6 2 7 2.4 7 3V5C7 5.6 6.6 6 6 6ZM11 5V3C11 2.4 10.6 2 10 2C9.4 2 9 2.4 9 3V5C9 5.6 9.4 6 10 6C10.6 6 11 5.6 11 5ZM15 5V3C15 2.4 14.6 2 14 2C13.4 2 13 2.4 13 3V5C13 5.6 13.4 6 14 6C14.6 6 15 5.6 15 5ZM19 5V3C19 2.4 18.6 2 18 2C17.4 2 17 2.4 17 3V5C17 5.6 17.4 6 18 6C18.6 6 19 5.6 19 5Z" fill="currentColor" />
												<path d="M8.8 13.1C9.2 13.1 9.5 13 9.7 12.8C9.9 12.6 10.1 12.3 10.1 11.9C10.1 11.6 10 11.3 9.8 11.1C9.6 10.9 9.3 10.8 9 10.8C8.8 10.8 8.59999 10.8 8.39999 10.9C8.19999 11 8.1 11.1 8 11.2C7.9 11.3 7.8 11.4 7.7 11.6C7.6 11.8 7.5 11.9 7.5 12.1C7.5 12.2 7.4 12.2 7.3 12.3C7.2 12.4 7.09999 12.4 6.89999 12.4C6.69999 12.4 6.6 12.3 6.5 12.2C6.4 12.1 6.3 11.9 6.3 11.7C6.3 11.5 6.4 11.3 6.5 11.1C6.6 10.9 6.8 10.7 7 10.5C7.2 10.3 7.49999 10.1 7.89999 10C8.29999 9.90003 8.60001 9.80003 9.10001 9.80003C9.50001 9.80003 9.80001 9.90003 10.1 10C10.4 10.1 10.7 10.3 10.9 10.4C11.1 10.5 11.3 10.8 11.4 11.1C11.5 11.4 11.6 11.6 11.6 11.9C11.6 12.3 11.5 12.6 11.3 12.9C11.1 13.2 10.9 13.5 10.6 13.7C10.9 13.9 11.2 14.1 11.4 14.3C11.6 14.5 11.8 14.7 11.9 15C12 15.3 12.1 15.5 12.1 15.8C12.1 16.2 12 16.5 11.9 16.8C11.8 17.1 11.5 17.4 11.3 17.7C11.1 18 10.7 18.2 10.3 18.3C9.9 18.4 9.5 18.5 9 18.5C8.5 18.5 8.1 18.4 7.7 18.2C7.3 18 7 17.8 6.8 17.6C6.6 17.4 6.4 17.1 6.3 16.8C6.2 16.5 6.10001 16.3 6.10001 16.1C6.10001 15.9 6.2 15.7 6.3 15.6C6.4 15.5 6.6 15.4 6.8 15.4C6.9 15.4 7.00001 15.4 7.10001 15.5C7.20001 15.6 7.3 15.6 7.3 15.7C7.5 16.2 7.7 16.6 8 16.9C8.3 17.2 8.6 17.3 9 17.3C9.2 17.3 9.5 17.2 9.7 17.1C9.9 17 10.1 16.8 10.3 16.6C10.5 16.4 10.5 16.1 10.5 15.8C10.5 15.3 10.4 15 10.1 14.7C9.80001 14.4 9.50001 14.3 9.10001 14.3C9.00001 14.3 8.9 14.3 8.7 14.3C8.5 14.3 8.39999 14.3 8.39999 14.3C8.19999 14.3 7.99999 14.2 7.89999 14.1C7.79999 14 7.7 13.8 7.7 13.7C7.7 13.5 7.79999 13.4 7.89999 13.2C7.99999 13 8.2 13 8.5 13H8.8V13.1ZM15.3 17.5V12.2C14.3 13 13.6 13.3 13.3 13.3C13.1 13.3 13 13.2 12.9 13.1C12.8 13 12.7 12.8 12.7 12.6C12.7 12.4 12.8 12.3 12.9 12.2C13 12.1 13.2 12 13.6 11.8C14.1 11.6 14.5 11.3 14.7 11.1C14.9 10.9 15.2 10.6 15.5 10.3C15.8 10 15.9 9.80003 15.9 9.70003C15.9 9.60003 16.1 9.60004 16.3 9.60004C16.5 9.60004 16.7 9.70003 16.8 9.80003C16.9 9.90003 17 10.2 17 10.5V17.2C17 18 16.7 18.4 16.2 18.4C16 18.4 15.8 18.3 15.6 18.2C15.4 18.1 15.3 17.8 15.3 17.5Z" fill="currentColor" />
											</svg>
										</span>
										<!--end::Svg Icon-->
										<input class="form-control form-control-solid ps-12" name="edit_dob_staff_list" placeholder="Date of Birth" id="kt_datepicker_dob_edit_staff" value="<?php echo $stafflist_edit_details->DOB;?>" />
									</div>
									<div class="fv-plugins-message-container invalid-feedback" id="kt_datepicker_dob_edit_staff_err"></div>
								</div>
								<!--end::Col-->
								<!--begin::Label-->
								<label class="col-lg-1 col-form-label required fw-semibold fs-6"> Age</label>
								<!--end::Label-->
								<!--begin::Col-->
								<div class="col-lg-2 fv-row fv-plugins-icon-container">
									<input type="text" name="edit_sage_staff_list" id="edit_sage_staff_list" class="form-control form-control-lg form-control-solid" placeholder="Staff Age" value="<?php echo $stafflist_edit_details->Age;?>">
									<div class="fv-plugins-message-container invalid-feedback" id="edit_sage_staff_list_err"></div>
								</div>
								<!--end::Col-->					
								<!--begin::Label-->
								<label class="col-lg-1 col-form-label required fw-semibold fs-6">DOJ</label>
								<!--end::Label-->
								<!--begin::Col-->
								<div class="col-lg-2 fv-row fv-plugins-icon-container">
									<div class="d-flex align-items-center">
										<!--begin::Svg Icon | path: icons/duotune/general/gen014.svg-->
										<span class="svg-icon position-absolute ms-4 svg-icon-2 dt">
											<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
												<path opacity="0.3" d="M21 22H3C2.4 22 2 21.6 2 21V5C2 4.4 2.4 4 3 4H21C21.6 4 22 4.4 22 5V21C22 21.6 21.6 22 21 22Z" fill="currentColor" />
												<path d="M6 6C5.4 6 5 5.6 5 5V3C5 2.4 5.4 2 6 2C6.6 2 7 2.4 7 3V5C7 5.6 6.6 6 6 6ZM11 5V3C11 2.4 10.6 2 10 2C9.4 2 9 2.4 9 3V5C9 5.6 9.4 6 10 6C10.6 6 11 5.6 11 5ZM15 5V3C15 2.4 14.6 2 14 2C13.4 2 13 2.4 13 3V5C13 5.6 13.4 6 14 6C14.6 6 15 5.6 15 5ZM19 5V3C19 2.4 18.6 2 18 2C17.4 2 17 2.4 17 3V5C17 5.6 17.4 6 18 6C18.6 6 19 5.6 19 5Z" fill="currentColor" />
												<path d="M8.8 13.1C9.2 13.1 9.5 13 9.7 12.8C9.9 12.6 10.1 12.3 10.1 11.9C10.1 11.6 10 11.3 9.8 11.1C9.6 10.9 9.3 10.8 9 10.8C8.8 10.8 8.59999 10.8 8.39999 10.9C8.19999 11 8.1 11.1 8 11.2C7.9 11.3 7.8 11.4 7.7 11.6C7.6 11.8 7.5 11.9 7.5 12.1C7.5 12.2 7.4 12.2 7.3 12.3C7.2 12.4 7.09999 12.4 6.89999 12.4C6.69999 12.4 6.6 12.3 6.5 12.2C6.4 12.1 6.3 11.9 6.3 11.7C6.3 11.5 6.4 11.3 6.5 11.1C6.6 10.9 6.8 10.7 7 10.5C7.2 10.3 7.49999 10.1 7.89999 10C8.29999 9.90003 8.60001 9.80003 9.10001 9.80003C9.50001 9.80003 9.80001 9.90003 10.1 10C10.4 10.1 10.7 10.3 10.9 10.4C11.1 10.5 11.3 10.8 11.4 11.1C11.5 11.4 11.6 11.6 11.6 11.9C11.6 12.3 11.5 12.6 11.3 12.9C11.1 13.2 10.9 13.5 10.6 13.7C10.9 13.9 11.2 14.1 11.4 14.3C11.6 14.5 11.8 14.7 11.9 15C12 15.3 12.1 15.5 12.1 15.8C12.1 16.2 12 16.5 11.9 16.8C11.8 17.1 11.5 17.4 11.3 17.7C11.1 18 10.7 18.2 10.3 18.3C9.9 18.4 9.5 18.5 9 18.5C8.5 18.5 8.1 18.4 7.7 18.2C7.3 18 7 17.8 6.8 17.6C6.6 17.4 6.4 17.1 6.3 16.8C6.2 16.5 6.10001 16.3 6.10001 16.1C6.10001 15.9 6.2 15.7 6.3 15.6C6.4 15.5 6.6 15.4 6.8 15.4C6.9 15.4 7.00001 15.4 7.10001 15.5C7.20001 15.6 7.3 15.6 7.3 15.7C7.5 16.2 7.7 16.6 8 16.9C8.3 17.2 8.6 17.3 9 17.3C9.2 17.3 9.5 17.2 9.7 17.1C9.9 17 10.1 16.8 10.3 16.6C10.5 16.4 10.5 16.1 10.5 15.8C10.5 15.3 10.4 15 10.1 14.7C9.80001 14.4 9.50001 14.3 9.10001 14.3C9.00001 14.3 8.9 14.3 8.7 14.3C8.5 14.3 8.39999 14.3 8.39999 14.3C8.19999 14.3 7.99999 14.2 7.89999 14.1C7.79999 14 7.7 13.8 7.7 13.7C7.7 13.5 7.79999 13.4 7.89999 13.2C7.99999 13 8.2 13 8.5 13H8.8V13.1ZM15.3 17.5V12.2C14.3 13 13.6 13.3 13.3 13.3C13.1 13.3 13 13.2 12.9 13.1C12.8 13 12.7 12.8 12.7 12.6C12.7 12.4 12.8 12.3 12.9 12.2C13 12.1 13.2 12 13.6 11.8C14.1 11.6 14.5 11.3 14.7 11.1C14.9 10.9 15.2 10.6 15.5 10.3C15.8 10 15.9 9.80003 15.9 9.70003C15.9 9.60003 16.1 9.60004 16.3 9.60004C16.5 9.60004 16.7 9.70003 16.8 9.80003C16.9 9.90003 17 10.2 17 10.5V17.2C17 18 16.7 18.4 16.2 18.4C16 18.4 15.8 18.3 15.6 18.2C15.4 18.1 15.3 17.8 15.3 17.5Z" fill="currentColor" />
											</svg>
										</span>
										<!--end::Svg Icon-->
										<input class="form-control form-control-solid ps-12" name="edit_doj_staff_list" placeholder="Date of Joining" id="kt_datepicker_doj_edit_staff" value="<?php echo $stafflist_edit_details->JoinedDate;?>" />
									</div>
									<div class="fv-plugins-message-container invalid-feedback" id="kt_datepicker_doj_edit_staff_err"></div>
								</div>
								<!--end::Col-->
								<!--begin::Label-->
								<label class="col-lg-1 col-form-label fw-semibold fs-6">Relvd Date</label>
								<!--end::Label-->
								<!--begin::Col-->
								<div class="col-lg-2 fv-row fv-plugins-icon-container">
									<div class="d-flex align-items-center">
										<!--begin::Svg Icon | path: icons/duotune/general/gen014.svg-->
										<span class="svg-icon position-absolute ms-4 svg-icon-2 dt">
											<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
												<path opacity="0.3" d="M21 22H3C2.4 22 2 21.6 2 21V5C2 4.4 2.4 4 3 4H21C21.6 4 22 4.4 22 5V21C22 21.6 21.6 22 21 22Z" fill="currentColor" />
												<path d="M6 6C5.4 6 5 5.6 5 5V3C5 2.4 5.4 2 6 2C6.6 2 7 2.4 7 3V5C7 5.6 6.6 6 6 6ZM11 5V3C11 2.4 10.6 2 10 2C9.4 2 9 2.4 9 3V5C9 5.6 9.4 6 10 6C10.6 6 11 5.6 11 5ZM15 5V3C15 2.4 14.6 2 14 2C13.4 2 13 2.4 13 3V5C13 5.6 13.4 6 14 6C14.6 6 15 5.6 15 5ZM19 5V3C19 2.4 18.6 2 18 2C17.4 2 17 2.4 17 3V5C17 5.6 17.4 6 18 6C18.6 6 19 5.6 19 5Z" fill="currentColor" />
												<path d="M8.8 13.1C9.2 13.1 9.5 13 9.7 12.8C9.9 12.6 10.1 12.3 10.1 11.9C10.1 11.6 10 11.3 9.8 11.1C9.6 10.9 9.3 10.8 9 10.8C8.8 10.8 8.59999 10.8 8.39999 10.9C8.19999 11 8.1 11.1 8 11.2C7.9 11.3 7.8 11.4 7.7 11.6C7.6 11.8 7.5 11.9 7.5 12.1C7.5 12.2 7.4 12.2 7.3 12.3C7.2 12.4 7.09999 12.4 6.89999 12.4C6.69999 12.4 6.6 12.3 6.5 12.2C6.4 12.1 6.3 11.9 6.3 11.7C6.3 11.5 6.4 11.3 6.5 11.1C6.6 10.9 6.8 10.7 7 10.5C7.2 10.3 7.49999 10.1 7.89999 10C8.29999 9.90003 8.60001 9.80003 9.10001 9.80003C9.50001 9.80003 9.80001 9.90003 10.1 10C10.4 10.1 10.7 10.3 10.9 10.4C11.1 10.5 11.3 10.8 11.4 11.1C11.5 11.4 11.6 11.6 11.6 11.9C11.6 12.3 11.5 12.6 11.3 12.9C11.1 13.2 10.9 13.5 10.6 13.7C10.9 13.9 11.2 14.1 11.4 14.3C11.6 14.5 11.8 14.7 11.9 15C12 15.3 12.1 15.5 12.1 15.8C12.1 16.2 12 16.5 11.9 16.8C11.8 17.1 11.5 17.4 11.3 17.7C11.1 18 10.7 18.2 10.3 18.3C9.9 18.4 9.5 18.5 9 18.5C8.5 18.5 8.1 18.4 7.7 18.2C7.3 18 7 17.8 6.8 17.6C6.6 17.4 6.4 17.1 6.3 16.8C6.2 16.5 6.10001 16.3 6.10001 16.1C6.10001 15.9 6.2 15.7 6.3 15.6C6.4 15.5 6.6 15.4 6.8 15.4C6.9 15.4 7.00001 15.4 7.10001 15.5C7.20001 15.6 7.3 15.6 7.3 15.7C7.5 16.2 7.7 16.6 8 16.9C8.3 17.2 8.6 17.3 9 17.3C9.2 17.3 9.5 17.2 9.7 17.1C9.9 17 10.1 16.8 10.3 16.6C10.5 16.4 10.5 16.1 10.5 15.8C10.5 15.3 10.4 15 10.1 14.7C9.80001 14.4 9.50001 14.3 9.10001 14.3C9.00001 14.3 8.9 14.3 8.7 14.3C8.5 14.3 8.39999 14.3 8.39999 14.3C8.19999 14.3 7.99999 14.2 7.89999 14.1C7.79999 14 7.7 13.8 7.7 13.7C7.7 13.5 7.79999 13.4 7.89999 13.2C7.99999 13 8.2 13 8.5 13H8.8V13.1ZM15.3 17.5V12.2C14.3 13 13.6 13.3 13.3 13.3C13.1 13.3 13 13.2 12.9 13.1C12.8 13 12.7 12.8 12.7 12.6C12.7 12.4 12.8 12.3 12.9 12.2C13 12.1 13.2 12 13.6 11.8C14.1 11.6 14.5 11.3 14.7 11.1C14.9 10.9 15.2 10.6 15.5 10.3C15.8 10 15.9 9.80003 15.9 9.70003C15.9 9.60003 16.1 9.60004 16.3 9.60004C16.5 9.60004 16.7 9.70003 16.8 9.80003C16.9 9.90003 17 10.2 17 10.5V17.2C17 18 16.7 18.4 16.2 18.4C16 18.4 15.8 18.3 15.6 18.2C15.4 18.1 15.3 17.8 15.3 17.5Z" fill="currentColor" />
											</svg>
										</span>
										<!--end::Svg Icon-->
										<input class="form-control form-control-solid ps-12" name="edit_relvddate_staff_list" placeholder="Date of Relieving" id="kt_datepicker_relvd_edit_staff" value="<?php echo $stafflist_edit_details->ReleivedDate;?>" />
									</div>
								<!--	<div class="fv-plugins-message-container invalid-feedback" id="kt_datepicker_relvd_edit_staff_err"></div>-->
								</div>
								<!--end::Col-->
											
								<!--begin::Label-->
								<label class="col-lg-1 col-form-label required fw-semibold fs-6">Dept</label>
								<!--end::Label-->
								<!--begin::Col-->
								<div class="col-lg-2 fv-row fv-plugins-icon-container">
									<input type="text" name="edit_sdept_staff_list" id="edit_sdept_staff_list" class="form-control form-control-lg form-control-solid" placeholder="Department" value="<?php echo $stafflist_edit_details->Department;?>">
									<div class="fv-plugins-message-container invalid-feedback" id="edit_sdept_staff_list_err"></div>
								</div>
								<!--end::Col-->
								<!--begin::Label-->
								<label class="col-lg-1 col-form-label required fw-semibold fs-6">Desig</label>
								<!--end::Label-->
								<!--begin::Col-->
								<div class="col-lg-2 fv-row fv-plugins-icon-container">
									<input type="text" name="edit_sdesig_staff_list" id="edit_sdesig_staff_list" class="form-control form-control-lg form-control-solid" placeholder="Designation" value="<?php echo $stafflist_edit_details->DESIGNATION;?>" >
									<div class="fv-plugins-message-container invalid-feedback" id="edit_sdesig_staff_list_err"></div>
								</div>
								<!--end::Col-->
								<label class="col-lg-1 col-form-label required fw-semibold fs-6">Work.Hrs</label>
								<div class="col-lg-2 fv-row fv-plugins-icon-container">
									<input type="text" name="edit_swrkhrs_staff_list" id="edit_swrkhrs_staff_list" class="form-control form-control-lg form-control-solid" placeholder="Working hrs/day" value="<?php echo $stafflist_edit_details->WorkHrs;?>">
									<div class="fv-plugins-message-container invalid-feedback" id="edit_swrkhrs_staff_list_err"></div>
								</div>
								
								<label class="col-lg-1 col-form-label required fw-semibold fs-6">Username</label>
								<div class="col-lg-2 fv-row fv-plugins-icon-container">
									<input type="text" name="edit_suname_staff_list" id="edit_suname_staff_list" class="form-control form-control-lg form-control-solid" placeholder="Username" value="<?php echo $stafflist_edit_details->Username;?>">
									<div class="fv-plugins-message-container invalid-feedback" id="edit_suname_staff_list_err"></div>
								</div>
								<label class="col-lg-1 col-form-label required fw-semibold fs-6">Password</label>
								<div class="col-lg-2 fv-row fv-plugins-icon-container">
									<input type="Password" name="edit_spw_staff_list" id="edit_spw_staff_list" class="form-control form-control-lg form-control-solid" placeholder="Password"
									value="<?php echo encrypt_decrypt($stafflist_edit_details->Password,'decrypt');
									//echo $stafflist_edit_details->Password;?>">
									<div class="fv-plugins-message-container invalid-feedback" id="edit_spw_staff_list_err"></div>
								</div>
									
								<label class="col-lg-1 col-form-label required fw-semibold fs-6">Min.LDays</label>
								<div class="col-lg-2 fv-row fv-plugins-icon-container">
									<input type="text" name="edit_sminleavedays_staff_list" id="edit_sminleavedays_staff_list" class="form-control form-control-lg form-control-solid" placeholder="Min leave days" value="<?php echo $stafflist_edit_details->MinLeavDays;?>">
									<div class="fv-plugins-message-container invalid-feedback"id="edit_sminleavedays_staff_list_err"></div>
								</div>
								<!--begin::Label-->
								<label class="col-lg-1 col-form-label required fw-semibold fs-6">Address</label>
								<!--end::Label-->
								<!--begin::Col-->
								<div class="col-lg-2 fv-row fv-plugins-icon-container">
									<textarea class="form-control form-control-solid" rows="1" name="edit_saddress_staff_list" id="edit_saddress_staff_list" value="<?php echo $stafflist_edit_details->Address;?>"></textarea>
									<div class="fv-plugins-message-container invalid-feedback" id="edit_saddress_staff_list_err"></div>
								</div>
								<!--end::Col-->
								<label class="col-lg-1 col-form-label required fw-semibold fs-6">Role</label>
								<div class="col-lg-2 fv-row">
									<select class="form-select form-select-solid cdrop" data-control="select2" data-hide-search="true" id="edit_staff_role" name="edit_staff_role">
										<option value="">Select Role</option>
										<?php
										$j=1;
										foreach($role_list as $rolelist1)
										{

										?>
										<option value="<?php echo $rolelist1['ROLEID'];?>" 
											<?php if($rolelist1['ROLEID']==$stafflist_edit_details->Role){echo "selected";}else{echo "";}?>><?php echo $rolelist1['ROLENAME'];?></option>
										<?php 
											$j++;
											}
										?>
									</select>
									<div class="fv-plugins-message-container invalid-feedback" id="edit_staff_role_err"></div>
								</div>
								<div class="col-lg-3 fv-row fv-plugins-icon-container fv-plugins-bootstrap5-row-invalid">
									<div class="d-flex align-items-center">
										<label class="form-check form-check-inline form-check-solid is-invalid">
											<input class="form-check-input" name="mobileapp_edit" id="mobileapp_edit" type="checkbox" value="<?php echo $stafflist_edit_details->MobileApp;?>">
										</label>
										<span class="col-form-label fw-semibold fs-6">Mobile Application Allowed</span>
									</div>
								</div>
								<label class="col-lg-1 col-form-label required fw-semibold fs-6">Transaction Password</label>
								
								<div class="col-lg-2 fv-row fv-plugins-icon-container">
									<input type="Password" name="edit_staff_tpwd" id="edit_staff_tpwd" class="form-control form-control-lg form-control-solid" placeholder="Password"
									value="<?php 
									echo encrypt_decrypt($stafflist_edit_details->TRANSACTION_PWD,'decrypt');
									// echo $stafflist_edit_details->Password;?>">
									<div class="fv-plugins-message-container invalid-feedback" id="edit_staff_tpwd_err"></div>
								</div>
								<div class="row" id="permission_accordion_edit" >
									<div class="accordion" id="kt_accordion_1">
									    <div class="accordion-item">
									        <h2 class="accordion-header" id="kt_accordion_1_header_1">
									            <button class="accordion-button fw-semibold fs-6 collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#kt_accordion_1_body_1" aria-expanded="false" aria-controls="kt_accordion_1_body_1" style="color: red">
									                Set User Permission
									            </button>
									        </h2>
									        <div id="kt_accordion_1_body_1" class="accordion-collapse collapse show" aria-labelledby="kt_accordion_1_header_1" data-bs-parent="#kt_accordion_1" style="overflow: scroll !important;">
									            <div class="accordion-body" style="height: 300px !important;overflow: show;">
										            	<!-- <h3>Role Permissions</h3><br> -->
												<?php 
												foreach ($menu_list as $mlist) 
												{
													if (isset($stafflist_edit_details->Role))
													{
														$role_id= $stafflist_edit_details->Role;
													}
													else
													{
														$role_id=0;
													}
													if(isset($stafflist_edit_details->Role))
													{
														$role_per_list=$this->db->query("SELECT * FROM STAFF_PERMISSION WHERE STAFF_ID=".$stafflist_edit_details->SNO." AND MENU_ID=".$mlist['MENU_ID'])->row();
											
													}
													else
													{
														// $role_per_list=$this->db->query("SELECT * FROM ROLE_PERMISSION WHERE ROLE_ID=".$role_id." AND MENU_ID=".$mlist['MENU_ID'])->row();
														$role_per_list=$this->db->query("SELECT * FROM STAFF_PERMISSION WHERE STAFF_ID=".$stafflist_edit_details->SNO." AND MENU_ID=".$mlist['MENU_ID'])->row();
												
													}
													// print_r($role_per_list->VALUE);exit();
													if(isset($role_per_list)){

							
													$menu_count=array_sum(explode('~',$role_per_list->VALUE));
													}
													else{
														$menu_count='0';
													}
												?>
												<div class="row">
													<div class="col-lg-3 fv-row fv-plugins-icon-container">
														<div class="form-check">
															 <input type="hidden" id="menuid" name="menuid[]" value="<?php echo $mlist['MENU_ID'];?>">
										                    <input class="form-check-input" type="checkbox" value="<?php echo ($menu_count>0)?'1':'0';?>" id="<?php echo 'menuid_'.$mlist['MENU_ID'];?>" name="Viewpermission[<?php echo $mlist['MENU_ID']; ?>]" <?php echo (($menu_count)>0)?'checked':''; ?> onclick="select_permission(this.id);">
										                    <h4><label class="form-check-label" for="flexCheckChecked" style="">
															 <?php echo $mlist['MENU_NAME']; ?>
										                    </label></h4>

										                </div>
													</div>
													<?php 
													if(($mlist['IS_PARENT']==0 && $mlist['PARENT_MENU_ID']==0)||($mlist['VALUE']=="View~Add~Edit~Delete~Verify"))
													{
														$permission=explode('~', $mlist['VALUE']);
														$cnt=count($permission);
														for ($i=0;$i<$cnt;$i++)
														{
															?>
													<div class="col-lg-1 fv-row fv-plugins-icon-container">
														<!-- <input type="hidden" id="permission" name="permission[]" value="<?php echo $mlist['MENU_ID'];?>"> -->
														<!-- <input class="form-check-input" type="checkbox" value="<?php echo (isset($role_per_list)>0)?'1':'0';?>" id="<?php echo $mlist['MENU_ID'].'_'.$permission[$i];?>" name="<?php echo $permission[$i];?>permission[<?php echo $mlist['MENU_ID']; ?>]" <?php echo (isset($role_per_list)>0)?'checked':''; ?>> -->
										                    <label class="form-check-label" for="flexCheckChecked" >
										                        <?php //echo $permission[$i];?>
										                    </label>
													</div>		
													<?php
														}
														}
														else
														{
															$permission=explode('~', $mlist['VALUE']);
															$cnt=count($permission);
															for ($i=0;$i<$cnt;$i++)
															{
															?>

															<div class="col-lg-1 fv-row fv-plugins-icon-container">
														<!-- <input type="hidden" id="permission" name="permission[]" value="<?php echo $mlist['MENU_ID'];?>"> -->
														<input class="form-check-input" type="checkbox" value="<?php echo (isset($role_per_list)>0)?'1':'0';?>" id="<?php echo $mlist['MENU_ID'].'_'.$permission[$i];?>" name="<?php echo $permission[$i];?>permission[<?php echo $mlist['MENU_ID']; ?>]" <?php echo (isset($role_per_list)>0)?'checked':''; ?> style="display: none;" >
										                    <label class="form-check-label" for="flexCheckChecked" style="display: none" >
										                        <?php echo $permission[$i];?>
										                    </label>
													</div>		
														<?php }}
													?>
												</div>
												<br>
												
												<?php 
													$sub_menu_list=$this->db->query("select * from MENU where PARENT_MENU_ID=".$mlist['MENU_ID']." AND IS_PARENT='0' order by MENU_ID asc")->result_array();
													foreach ($sub_menu_list as $smlist) 
													{
														// $role_per_list=$this->db->query("SELECT * FROM ROLE_PERMISSION WHERE ROLE_ID=".$role_id." AND MENU_ID=".$smlist['MENU_ID'])->row();
														$role_per_list=$this->db->query("SELECT * FROM STAFF_PERMISSION WHERE STAFF_ID=".$stafflist_edit_details->SNO." AND MENU_ID=".$smlist['MENU_ID'])->row();
												$sub_menu_count=array_sum(explode('~',$role_per_list?$role_per_list->VALUE:0));
												?>
													<!-- if() -->
													<div class="row">
													&emsp;&emsp;<div class="col-lg-3 fv-row fv-plugins-icon-container">
														<input type="hidden" id="menuid" name="menuid[]" value="<?php echo $smlist['MENU_ID'];?>">
														<input class="form-check-input" type="checkbox" value="<?php echo ($sub_menu_count>0)?'1':'0';?>" id="<?php echo 'menuid_'.$smlist['MENU_ID'];?>" name="menu_id[<?php echo $smlist['MENU_ID']; ?>]" <?php echo ($sub_menu_count>0)?'checked':''; ?> onclick="select_single_permission(this.id);">
										                    <label class="form-check-label" for="flexCheckChecked"><b>
										                        <?php echo $smlist['MENU_NAME'];?>
										                    </b></label>

													</div>
													<?php 
														$permission=explode('~', $smlist['VALUE']);
														$cnt=count($permission);
														if(isset($role_per_list->VALUE))
														{
														$perm_check_access=explode('~', $role_per_list->VALUE);
														$pcnt=count($perm_check_access);
														}
														// if($cnt==$pcnt)
														// {
															for ($i=0;$i<$cnt;$i++)
															{

															?>
													<div class="col-lg-1 fv-row fv-plugins-icon-container">
														
														<input class="form-check-input" type="checkbox" value="<?php if(isset($role_per_list->VALUE))
														{echo ($perm_check_access[$i]==1)?'1':'0';}else{echo '0';}?>" id="<?php echo $smlist['MENU_ID'].'_'.$permission[$i];?>" name="<?php echo $permission[$i];?>permission[<?php echo $smlist['MENU_ID']; ?>]" <?php  if(isset($role_per_list->VALUE)){echo ($perm_check_access[$i]==1)?'checked':'';}?>  onclick="select_child_permission(this.id);">
										                    <label class="form-check-label" for="flexCheckChecked" >
										                        <?php echo $permission[$i];?>
										                    </label>
													</div>		
													<?php
														// }
													}
													?>
													
												</div>
												<br>
												
													<?php											
													}
													?>
													
												<?php 
													$sub_menu_list=$this->db->query("select * from MENU where PARENT_MENU_ID=".$mlist['MENU_ID']." AND IS_PARENT!='0' order by MENU_ID asc")->result_array();
													foreach ($sub_menu_list as $smlist) 
													{
														// $role_per_list=$this->db->query("SELECT * FROM ROLE_PERMISSION WHERE ROLE_ID=".$role_id." AND MENU_ID=".$smlist['MENU_ID'])->row();
														$role_per_list=$this->db->query("SELECT * FROM STAFF_PERMISSION WHERE STAFF_ID=".$stafflist_edit_details->SNO." AND MENU_ID=".$smlist['MENU_ID'])->row();
														if(isset($role_per_list)){
														$sub_menu_count=array_sum(explode('~',$role_per_list->VALUE));
														}
														else{
															$sub_menu_count='0';
														}
												?>
													<!-- if() -->
													<div class="row">
													&emsp;&emsp;<div class="col-lg-3 fv-row fv-plugins-icon-container">
														<input type="hidden" id="menuid" name="menuid[]" value="<?php echo $smlist['MENU_ID'];?>">
														<input class="form-check-input" type="checkbox" value="<?php echo ($sub_menu_count>0)?'1':'0';?>" id="<?php echo 'menuid_'.$smlist['MENU_ID'];?>" name="Viewpermission[<?php echo $smlist['MENU_ID']; ?>]" <?php echo ($sub_menu_count>0)?'checked':''; ?> onclick="select_permission(this.id);">
										                    <label class="form-check-label" for="flexCheckChecked"><b>
										                        <?php echo $smlist['MENU_NAME'];?>
										                    </b></label>

													</div>
													<?php 
														$permission=explode('~', $smlist['VALUE']);
														$cnt=count($permission);
														if(isset($role_per_list->VALUE))
														{
														$perm_check_access=explode('~', $role_per_list->VALUE);
														$pcnt=count($perm_check_access);
														}
														// if($cnt==$pcnt)
														// {
															for ($i=0;$i<$cnt;$i++)
															{

															?>
													<div class="col-lg-1 fv-row fv-plugins-icon-container">
														
														<!-- <input class="form-check-input" type="checkbox" value="<?php if(isset($role_per_list->VALUE))
														{echo ($perm_check_access[$i]==1)?'1':'0';}else{echo '0';}?>" id="<?php echo $smlist['MENU_ID'].'_'.$permission[$i];?>" name="<?php echo $permission[$i];?>permission[<?php echo $smlist['MENU_ID']; ?>]" <?php  if(isset($role_per_list->VALUE)){echo ($perm_check_access[$i]==1)?'checked':'';}?>> -->
										                    <label class="form-check-label" for="flexCheckChecked" >
										                        <?php //echo $permission[$i];?>
										                    </label>
													</div>		
													<?php
														// }
													}
													?>
													
												</div>
												<br>
												<?php 
													$child_menu_list=$this->db->query("select * from MENU where PARENT_MENU_ID=".$smlist['MENU_ID']."   order by MENU_ID asc")->result_array();
													foreach ($child_menu_list as $cmlist) 
													{
														// $role_per_list=$this->db->query("SELECT * FROM ROLE_PERMISSION WHERE ROLE_ID=".$role_id." AND MENU_ID=".$cmlist['MENU_ID'])->row();
														$role_per_list=$this->db->query("SELECT * FROM STAFF_PERMISSION WHERE STAFF_ID=".$stafflist_edit_details->SNO." AND MENU_ID=".$cmlist['MENU_ID'])->row();
														$child_menu_count=array_sum(explode('~',$role_per_list?$role_per_list->VALUE:0));
												
												?>
													<!-- if() -->
													<div class="row">
													&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<div class="col-lg-3 fv-row fv-plugins-icon-container">
														<input type="hidden" id="menuid" name="menuid[]" value="<?php echo $cmlist['MENU_ID'];?>">
														<input class="form-check-input" type="checkbox" value="<?php echo ($child_menu_count>0)?'1':'0';?>" id="<?php echo 'menuid_'.$cmlist['MENU_ID'];?>" name="menu_id[<?php echo $cmlist['MENU_ID']; ?>]" <?php echo ($child_menu_count>0)?'checked':''; ?> onclick="select_single_permission(this.id);">
										                    <label class="form-check-label" for="flexCheckChecked"><b>
										                        <?php echo $cmlist['MENU_NAME'];?>
										                    </b></label>

													</div>
													<?php 
														$permission=explode('~', $cmlist['VALUE']);
														$cnt=count($permission);
														if(isset($role_per_list->VALUE))
														{
														$perm_check_access=explode('~', $role_per_list->VALUE);
														$pcnt=count($perm_check_access);
														}
														// if($cnt==$pcnt)
														// {
															for ($i=0;$i<$cnt;$i++)
															{

															?>
													<div class="col-lg-1 fv-row fv-plugins-icon-container">
														
														<input class="form-check-input" type="checkbox" value="<?php if(isset($role_per_list->VALUE))
														{echo ($perm_check_access[$i]==1)?'1':'0';}else{echo '0';}?>" id="<?php echo $cmlist['MENU_ID'].'_'.$permission[$i];?>" name="<?php echo $permission[$i];?>permission[<?php echo $cmlist['MENU_ID']; ?>]" <?php  if(isset($role_per_list->VALUE)){echo ($perm_check_access[$i]==1)?'checked':'';}?> onclick="select_child_permission(this.id);">
										                    <label class="form-check-label" for="flexCheckChecked" >
										                        <?php echo $permission[$i];?>
										                    </label>
													</div>		
													<?php
														// }
													}
													?>
													
												</div>
												<br>
													<?php											
													}
													?>
													<?php											
													}
													?>

												<?php 
												}
												?>
									            </div>
									        </div>
									    </div>
									</div>


								</div>
								<div class="row fv-row">
								<label class="col-lg-1 col-form-label required fw-semibold fs-6">Staff</label>
								<div class="col-lg-3 py-3">
									<!--begin::Image input-->
									<div class="image-input image-input-outline" data-kt-image-input="true">
										<!--begin::Preview existing avatar-->
										<div class="image-input-wrapper w-125px h-125px"></div>
										<!--end::Preview existing avatar-->
										<!--begin::Label-->
										<label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" data-kt-initialized="1">
											<i class="bi bi-pencil-fill fs-7"></i>
											<!--begin::Inputs-->
											<input type="file" name="edit_sphoto_staff_list" id="edit_sphoto_staff_list" accept=".png, .jpg, .jpeg" value="<?php echo $stafflist_edit_details->Staffphoto;?>">
											<input type="hidden" name="edit_sphoto_remove_staff_list">
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
										<div class="fv-plugins-message-container invalid-feedback" id="edit_sphoto_staff_list_err"></div>
									</div>
									<!--end::Image input-->
									<!--begin::Hint-->
									<div class="form-text">Allowed file types: png, jpg, jpeg.</div>
									<!--end::Hint-->
								</div>
								<label class="col-lg-1 col-form-label required fw-semibold fs-6">ID</label>
								<div class="col-lg-3 py-3">
									<!--begin::Image input-->
									<div class="image-input image-input-outline" data-kt-image-input="true">
										<!--begin::Preview existing avatar-->
										<div class="image-input-wrapper w-125px h-125px"></div>
										<!--end::Preview existing avatar-->
										<!--begin::Label-->
										<label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" data-kt-initialized="1">
											<i class="bi bi-pencil-fill fs-7"></i>
											<!--begin::Inputs-->
											<input type="file" name="edit_id_photo_staff_list" id="edit_id_photo_staff_list" accept=".png, .jpg, .jpeg" value="<?php echo $stafflist_edit_details->IDPhoto;?>">
											<input type="hidden" name="edit_id_photo_remove_staff_list">
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
										<div class="fv-plugins-message-container invalid-feedback" id="edit_id_photo_staff_list_err"></div>
									</div>
									<!--end::Image input-->
									<!--begin::Hint-->
									<div class="form-text">Allowed file types: png, jpg, jpeg.</div>
									<!--end::Hint-->
								</div>
							</div>
						</div>	
							<div class="separator separator-content border-dark my-6"><span class="w-200px fw-bold fs-4">Salary Details</span></div>
							<div class="row fv-row">
								<!--begin::Label-->
								<label class="col-lg-2 col-form-label required fw-semibold fs-6">Basic Salary</label>
								<!--end::Label-->
								<!--begin::Col-->
								<div class="col-lg-2 fv-row fv-plugins-icon-container">
									<input type="text" name="edit_sbassal_staff_list" id="edit_sbassal_staff_list" class="form-control form-control-lg form-control-solid" placeholder="Basic Salary" value="<?php echo $stafflist_edit_details->Basicsalry;?>">
									<div class="fv-plugins-message-container invalid-feedback" id="edit_sbassal_staff_list_err"></div>
								</div>
								<!--end::Col-->
									<!--begin::Label-->
								<label class="col-lg-2 col-form-label fw-semibold fs-6">PF per month</label>
								<!--end::Label-->
								<!--begin::Col-->
								<div class="col-lg-2 fv-row fv-plugins-icon-container">
									<input type="text" name="pfpermonth_edit"  class="form-control form-control-lg form-control-solid" placeholder="PF per month" value="<?php echo $stafflist_edit_details->PFpermonth;?>">
									<div class="fv-plugins-message-container invalid-feedback"></div>
								</div>
								<!--end::Col-->
								<!--begin::Label-->
								<label class="col-lg-2 col-form-label fw-semibold fs-6"> Allowance 1</label>
								<!--end::Label-->
								<!--begin::Col-->
								<div class="col-lg-2 fv-row fv-plugins-icon-container">
									<input type="text" name="allwone_edit" class="form-control form-control-lg form-control-solid" placeholder="Allowance" value="<?php echo $stafflist_edit_details->allowance1;?>">
									<div class="fv-plugins-message-container invalid-feedback"></div>
								</div>
								<!--end::Col-->
								<!--begin::Label-->
								<label class="col-lg-2 col-form-label fw-semibold fs-6"> Allowance 2</label>
								<!--end::Label-->
								<!--begin::Col-->
								<div class="col-lg-2 fv-row fv-plugins-icon-container">
									<input type="text" name="allwtwo_edit" class="form-control form-control-lg form-control-solid" placeholder="Allowance 2" value="<?php echo $stafflist_edit_details->allowance2;?>">
									<div class="fv-plugins-message-container invalid-feedback"></div>
								</div>
								<!--end::Col-->
								<!--begin::Label-->
								<label class="col-lg-2 col-form-label fw-semibold fs-6"> Allowance 3</label>
								<!--end::Label-->
								<!--begin::Col-->
								<div class="col-lg-2 fv-row fv-plugins-icon-container">
									<input type="text" name="allwthree_edit" class="form-control form-control-lg form-control-solid" placeholder="Allowance 3" value="<?php echo $stafflist_edit_details->allowance3;?>">
									<div class="fv-plugins-message-container invalid-feedback"></div>
								</div>
								<!--end::Col-->
									<!--begin::Label-->
								<label class="col-lg-2 col-form-label fw-semibold fs-6">Incentive</label>
								<!--end::Label-->
								<!--begin::Col-->
								<div class="col-lg-2 fv-row fv-plugins-icon-container">
									<input type="text" name="incentive_edit" class="form-control form-control-lg form-control-solid" placeholder="Incentive" value="<?php echo $stafflist_edit_details->Incentive;?>">
									<div class="fv-plugins-message-container invalid-feedback"></div>
								</div>
								<!--end::Col-->
								<!--begin::Label-->
								<label class="col-lg-2 col-form-label fw-semibold fs-6">Leave Deduction</label>
								<!--end::Label-->
								<!--begin::Col-->
								<div class="col-lg-2 fv-row fv-plugins-icon-container">
									<input type="text" name="leaveded_edit" class="form-control form-control-lg form-control-solid" placeholder="Leave Deduction" value="<?php echo $stafflist_edit_details->Leavededuction;?>">
									<div class="fv-plugins-message-container invalid-feedback"></div>
								</div>
								<!--end::Col-->
								<!--begin::Label-->
								<label class="col-lg-2 col-form-label fw-semibold fs-6">Net Salary</label>
								<!--end::Label-->
								<!--begin::Col-->
								<div class="col-lg-2 fv-row fv-plugins-icon-container">
									<input type="text" name="edit_snetsal_staff_list" id="edit_snetsal_staff_list" class="form-control form-control-lg form-control-solid" placeholder="Net Salary" 
									value="<?php echo $stafflist_edit_details->Netsalary;?>">
									<div class="fv-plugins-message-container invalid-feedback"></div>
								</div>
								<!--end::Col-->
							</div>								
							<!--begin::Actions-->
							<div class="row">
								<div class="col-lg-9"></div>
								<div class="col-lg-1">
									<div class="d-flex flex-center flex-row-fluid pt-12">
										<button type="reset" class="btn btn-secondary me-3" data-bs-dismiss="modal" onclick="closeEditModalstaff();">Cancel</button>
									</div>
								</div>
								<div class="col-lg-2">
									<div class="d-flex flex-center flex-row-fluid pt-12">
										<button type="submit" class="btn btn-primary" id="save_changes_edit_staff_list">Save Changes</button>
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
		