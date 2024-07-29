<!--begin::Modal dialog-->
				<div class="modal-dialog modal-xl">
					<!--begin::Modal content-->
					<div class="modal-content rounded">
						<!--begin::Modal header-->
						<div class="modal-header justify-content-end border-0 pb-0">
							<!--begin::Close-->
							<div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal"
							onclick="closeViewModalStaff();">
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
					<form name="staff_view_form" id="staff_view_form" method="POST" action="<?php echo base_url(); ?>staff/staff_view" enctype="multipart/form-data" >
						<input type="hidden" id="staff_view_id" name="staff_view_id" value="<?php echo $staff_view_details->SNO;?>">
						<div class="modal-body pt-0 pb-15 px-5 px-xl-20">
							<!--begin::Heading-->
							<div class="mb-13 text-center">
								<h1 class="mb-3"> Staff Details</h1>
								
							</div>
							<!--end::Heading-->
							<div class="row mb-6">
								<!--begin::Label-->
								<label class="col-lg-1 col-form-label fw-semibold fs-6">Company</label>
								<!--end::Label-->
								<!--begin::Left Section-->
								<div class="col-lg-2 fv-row fv-plugins-icon-container">
									<input type="text" name="staff_view_company" class="form-control form-control-lg form-control-solid" 
									value="<?php 
									if(is_null($staff_view_details->COMPANYNAME))
									{echo '-'; }
									else{
										echo $staff_view_details->COMPANYNAME;}?>"readonly>

									<!--if(count((array)$company_list_view)==0)
									{echo '-'; }
									else{
										echo $company_list_view->COMPANYNAME; }  -->
									
									<div class="fv-plugins-message-container invalid-feedback"></div>
								</div>
								<!--end::Left Section-->
								<!--begin::Label-->
								<label class="col-lg-1 col-form-label fw-semibold fs-6">Staff ID</label>
								<!--end::Label-->
								<!--begin::Col-->
								<div class="col-lg-2 fv-row fv-plugins-icon-container">
									<input type="text" name="view_staffid_staff" class="form-control form-control-lg form-control-solid"  placeholder="Staff Id" value="<?php echo $staff_view_details->StaffID; ?>"readonly>
									<div class="fv-plugins-message-container invalid-feedback"></div>
								</div>
								<!--end::Col-->
													
								<!--begin::Label-->
								<label class="col-lg-1 col-form-label fw-semibold fs-6"> Name</label>
								<!--end::Label-->
								<!--begin::Col-->
								<div class="col-lg-2 fv-row fv-plugins-icon-container">
									<input type="text" name="view_name_staff" class="form-control form-control-lg form-control-solid" placeholder="Staff Name" value="<?php echo $staff_view_details->STAFFNAME; ?>"readonly>
									<div class="fv-plugins-message-container invalid-feedback"></div>
								</div>
								<!--end::Col-->
									<!--begin::Label-->
								<label class="col-lg-1 col-form-label fw-semibold fs-6">F.Name</label>
								<!--end::Label-->
								<!--begin::Col-->
								<div class="col-lg-2 fv-row fv-plugins-icon-container">
									<input type="text" name="view_fname_staff" class="form-control form-control-lg form-control-solid" placeholder="Father Name" value="<?php echo $staff_view_details->FatherName; ?>"readonly>
									<div class="fv-plugins-message-container invalid-feedback"></div>
								</div>
								<!--end::Col-->
								<!--begin::Label-->
								<label class="col-lg-1 col-form-label fw-semibold fs-6">Gender</label>
								<!--end::Label-->
									<!--begin::Left Section-->
								<div class="col-lg-2 fv-row fv-plugins-icon-container">
									<input type="text" name="view_gender_staff" id="view_gender_staff" class="form-control form-control-lg form-control-solid" placeholder="Gender" value="<?php echo $staff_view_details->Gender; ?>"readonly>

									<div class="fv-plugins-message-container invalid-feedback"></div>
								</div>
								<!-- <div class="col-lg-5 fv-row fv-plugins-icon-container">
									<input type="text" name="view_gender_staff" class="form-control form-control-lg form-control-solid"
									 value="<?php 
									if(is_null($view_gender_staff->Gender))
									{echo '-'; }
									else{
										echo $view_gender_staff->Gender; }?>" readonly>
									<div class="fv-plugins-message-container invalid-feedback"></div>
								</div> -->
								<!--End::Left Section-->
								<!--begin::Label-->
								<label class="col-lg-1 col-form-label fw-semibold fs-6">City</label>
								<!--end::Label-->
								<!--begin::Left Section-->
								<div class="col-lg-2 fv-row fv-plugins-icon-container">
									<input type="text" name="staff_view_city" class="form-control form-control-lg form-control-solid" 
									value="<?php 
									if(is_null($staff_view_details->CITYNAME))
									{echo '-'; }
									else{
										echo $staff_view_details->CITYNAME;}?>"readonly>

									<!--if(count((array)$company_list_view)==0)
									{echo '-'; }
									else{
										echo $company_list_view->COMPANYNAME; }  -->
									
									<div class="fv-plugins-message-container invalid-feedback"></div>
								</div>
								<!--End::Left Section-->					
								
								<!--begin::Label-->
								<label class="col-lg-1 col-form-label fw-semibold fs-6">Aadhar.No</label>
								<!--end::Label-->
								<!--begin::Col-->
								<div class="col-lg-2 fv-row fv-plugins-icon-container">
									<input type="text" name="view_aadharno_staff" class="form-control form-control-lg form-control-solid" placeholder="Aadhar Number" value="<?php echo $staff_view_details->AadharNo; ?>"readonly>
									<div class="fv-plugins-message-container invalid-feedback"></div>
								</div>
								<!--end::Col-->	
											<!--begin::Label-->
								<label class="col-lg-1 col-form-label fw-semibold fs-6">ID Proof</label>
								<!--end::Label-->
								<!--begin::Col-->
								<div class="col-lg-2 fv-row fv-plugins-icon-container">
									<input type="text" name="view_idproof_staff" class="form-control form-control-lg form-control-solid" placeholder="Id Proof"
									value="<?php echo $staff_view_details->IDProof; ?>"readonly>
									<div class="fv-plugins-message-container invalid-feedback"></div>
								</div>
								<!--end::Col-->							
								<!--begin::Label-->
								<label class="col-lg-1 col-form-label fw-semibold fs-6">Phone</label>
								<!--end::Label-->
								<!--begin::Col-->
								<div class="col-lg-2 fv-row fv-plugins-icon-container">
									<input type="text" name="view_phone_staff" class="form-control form-control-lg form-control-solid" placeholder="Phone No" value="<?php echo $staff_view_details->PHONE; ?>"readonly>
									<div class="fv-plugins-message-container invalid-feedback"></div>
								</div>
								<!--end::Col-->
								<!--begin::Label-->
								<label class="col-lg-1 col-form-label fw-semibold fs-6">DOB</label>
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
										<input class="form-control form-control-solid ps-12"
										name="view_dob_staff_list" placeholder="Date of Birth" id="kt_datepicker_dob_view_staff_list" value="<?php echo $staff_view_details->DOB; ?>"readonly>
									</div>
								</div>
								<!--end::Col-->
								<!--begin::Label-->
								<label class="col-lg-1 col-form-label fw-semibold fs-6"> Age</label>
								<!--end::Label-->
								<!--begin::Col-->
								<div class="col-lg-2 fv-row fv-plugins-icon-container">
									<input type="text" name="view_age_staff_list" class="form-control form-control-lg form-control-solid" placeholder="Staff Age" value="<?php echo $staff_view_details->Age; ?>"readonly>
									<div class="fv-plugins-message-container invalid-feedback"></div>
								</div>
								<!--end::Col-->					
								<!--begin::Label-->
								<label class="col-lg-1 col-form-label fw-semibold fs-6">DOJ</label>
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
										<input class="form-control form-control-solid ps-12" 
										name="view_doj_staff_list" placeholder="Date of Joining" id="kt_datepicker_doj_view_staff_list" value="<?php echo $staff_view_details->JoinedDate;?>"readonly />
									</div>
								</div>
								<!--end::Col-->
								<!--begin::Label-->
								<label class="col-lg-1 col-form-label fw-semibold fs-6">RelvdDate</label>
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
										<input class="form-control form-control-solid ps-12" 
										name="view_relvddate_staff_list" placeholder="Date of Relieving" id="kt_datepicker_relvddate_view_staff_list" value="<?php echo $staff_view_details->ReleivedDate;?>"readonly />
									</div>
								</div>
								<!--end::Col-->			
								<!--begin::Label-->
								<label class="col-lg-1 col-form-label fw-semibold fs-6">Dept</label>
								<!--end::Label-->
								<!--begin::Col-->
								<div class="col-lg-2 fv-row fv-plugins-icon-container">
									<input type="text" name="view_doj_staff_list" class="form-control form-control-lg form-control-solid" placeholder="Department" value="<?php echo $staff_view_details->Department;?>"readonly >
									<div class="fv-plugins-message-container invalid-feedback"></div>
								</div>
								<!--end::Col-->
								<!--begin::Label-->
								<label class="col-lg-1 col-form-label fw-semibold fs-6">Designation</label>
								<!--end::Label-->
								<!--begin::Col-->
								<div class="col-lg-2 fv-row fv-plugins-icon-container">
									<input type="text" name="view_desig_staff_list" class="form-control form-control-lg form-control-solid" placeholder="Designation" value="<?php echo $staff_view_details->DESIGNATION;?>"readonly >
									<div class="fv-plugins-message-container invalid-feedback"></div>
								</div>
								<!--end::Col-->
								<label class="col-lg-1 col-form-label fw-semibold fs-6">Role</label>
								<div class="col-lg-2 fv-row fv-plugins-icon-container">
									<input type="text" name="staff_view_role" placeholder="Role" class="form-control form-control-lg form-control-solid" 
									value="<?php 
									if(is_null($staff_view_details->ROLENAME))
									{echo '-'; }
									else{
										echo $staff_view_details->ROLENAME;}?>"readonly>

									<!--if(count((array)$company_list_view)==0)
									{echo '-'; }
									else{
										echo $company_list_view->COMPANYNAME; }  -->
									<div class="fv-plugins-message-container invalid-feedback"></div>
								</div>

							
								<label class="col-lg-1 col-form-label fw-semibold fs-6">Username</label>
								<div class="col-lg-2 fv-row fv-plugins-icon-container">
									<input type="text" name="view_uname_staff_list" class="form-control form-control-lg form-control-solid" placeholder="Username" value="<?php echo $staff_view_details->Username; ?>"readonly>
									<div class="fv-plugins-message-container invalid-feedback"></div>
								</div>
								<label class="col-lg-1 col-form-label fw-semibold fs-6">Password</label>
								<div class="col-lg-2 fv-row fv-plugins-icon-container">
									<input type="Password" name="view_passwd_staff_list" class="form-control form-control-lg form-control-solid" placeholder="Password" value="<?php echo $staff_view_details->Password; ?>"readonly>
									<div class="fv-plugins-message-container invalid-feedback"></div>
								</div>
									<label class="col-lg-1 col-form-label fw-semibold fs-6">Work.Hrs</label>
								<div class="col-lg-2 fv-row fv-plugins-icon-container">
									<input type="text" name="view_wrkhrs_staff_list" class="form-control form-control-lg form-control-solid" placeholder="Working hrs/day" value="<?php echo $staff_view_details->WorkHrs; ?>"readonly>
									<div class="fv-plugins-message-container invalid-feedback"></div>
								</div>
								<label class="col-lg-1 col-form-label fw-semibold fs-6">Min.LDays</label>
								<div class="col-lg-2 fv-row fv-plugins-icon-container">
									<input type="text" name="view_minleavdays_staff_list" class="form-control form-control-lg form-control-solid" placeholder="Min leave days" value="<?php echo $staff_view_details->MinLeavDays; ?>"readonly>
									<div class="fv-plugins-message-container invalid-feedback"></div>
								</div>
								<!--begin::Label-->
								<label class="col-lg-1 col-form-label fw-semibold fs-6">Address</label>
								<!--end::Label-->
								<!--begin::Col-->
								<div class="col-lg-2 fv-row fv-plugins-icon-container">
									<textarea class="form-control form-control-solid" rows="1"  name="view_address_staff_list" value="<?php echo $staff_view_details->Address; ?>"readonly >23,chruch road,Alankulam</textarea>
									<div class="fv-plugins-message-container invalid-feedback"></div>
								</div>
								<!--end::Col-->
								<div class="col-lg-3 fv-row fv-plugins-icon-container fv-plugins-bootstrap5-row-invalid">
									<div class="d-flex align-items-center">
										<label class="form-check form-check-inline form-check-solid is-invalid">
											<input class="form-check-input" name="view_mobapp_staff_list" type="checkbox" readonly>
										</label>
										<span class="col-form-label fw-semibold fs-6">Mobile Application Allowed</span>
									</div>
								</div>
								<div class="row">
								<label class="col-lg-1 col-form-label fw-semibold fs-6">Staff</label>
								<div class="col-lg-3 py-3 fv-row">
									<!--begin::Image input-->
									<div class="image-input image-input-outline" data-kt-image-input="true">
										<!--begin::Preview existing avatar-->
										<div class="image-input-wrapper w-125px h-125px"></div>
										<!--end::Preview existing avatar-->
										<!--begin::Label-->
										<label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" data-kt-initialized="1">
											<i class="bi bi-pencil-fill fs-7"></i>
											<!--begin::Inputs-->
											<input type="file" name="view_staffphoto_staff_list" accept=".png, .jpg, .jpeg" value="<?php echo $staff_view_details->Staffphoto; ?>"readonly>
											<input type="hidden" name="view_staffphoto_remove_staff_list">
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
								<label class="col-lg-1 col-form-label fw-semibold fs-6">ID</label>
								<div class="col-lg-3 py-3 fv-row">
									<!--begin::Image input-->
									<div class="image-input image-input-outline" data-kt-image-input="true">
										<!--begin::Preview existing avatar-->
										<div class="image-input-wrapper w-125px h-125px"></div>
										<!--end::Preview existing avatar-->
										<!--begin::Label-->
										<label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" data-kt-initialized="1">
											<i class="bi bi-pencil-fill fs-7"></i>
											<!--begin::Inputs-->
											<input type="file" name="view_idphoto_staff_list" accept=".png, .jpg,.jpeg" value="<?php echo $staff_view_details->IDPhoto;?>"readonly >
											<input type="hidden" name="view_idphoto_remove_staff_list">
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
							</div>
						</div>	
							<div class="separator separator-content border-dark my-6"><span class="w-200px fw-bold fs-4">Salary Details</span></div>
							<div class="row">
								<!--begin::Label-->
								<label class="col-lg-2 col-form-label fw-semibold fs-6">Basic Salary</label>
								<!--end::Label-->
								<!--begin::Col-->
								<div class="col-lg-2 fv-row fv-plugins-icon-container">
									<input type="text" name="view_basicsal_staff_list" class="form-control form-control-lg form-control-solid" placeholder="Basic Salary" value="<?php echo $staff_view_details->Basicsalry; ?>"readonly>
									<div class="fv-plugins-message-container invalid-feedback"></div>
								</div>
								<!--end::Col-->
									<!--begin::Label-->
								<label class="col-lg-2 col-form-label fw-semibold fs-6">PF per month</label>
								<!--end::Label-->
								<!--begin::Col-->
								<div class="col-lg-2 fv-row fv-plugins-icon-container">
									<input type="text" name="view_pfpermonth_staff_list" class="form-control form-control-lg form-control-solid" placeholder="PF per month" value="<?php echo $staff_view_details->PFpermonth; ?>"readonly>
									<div class="fv-plugins-message-container invalid-feedback"></div>
								</div>
								<!--end::Col-->
								<!--begin::Label-->
								<label class="col-lg-2 col-form-label fw-semibold fs-6"> Allowance 1</label>
								<!--end::Label-->
								<!--begin::Col-->
								<div class="col-lg-2 fv-row fv-plugins-icon-container">
									<input type="text" name="view_allowone_staff_list" class="form-control form-control-lg form-control-solid" placeholder="Allowance"
									value="<?php echo $staff_view_details->allowance1; ?>"readonly>
									<div class="fv-plugins-message-container invalid-feedback"></div>
								</div>
								<!--end::Col-->
								<!--begin::Label-->
								<label class="col-lg-2 col-form-label fw-semibold fs-6"> Allowance 2</label>
								<!--end::Label-->
								<!--begin::Col-->
								<div class="col-lg-2 fv-row fv-plugins-icon-container">
									<input type="text" name="view_allowtwo_staff_list" class="form-control form-control-lg form-control-solid" placeholder="Allowance 2" value="<?php echo $staff_view_details->allowance2; ?>"readonly>
									<div class="fv-plugins-message-container invalid-feedback"></div>
								</div>
								<!--end::Col-->
								<!--begin::Label-->
								<label class="col-lg-2 col-form-label fw-semibold fs-6"> Allowance 3</label>
								<!--end::Label-->
								<!--begin::Col-->
								<div class="col-lg-2 fv-row fv-plugins-icon-container">
									<input type="text" name="view_allowthree_staff_list" class="form-control form-control-lg form-control-solid" placeholder="Allowance 3" value="<?php echo $staff_view_details->allowance3; ?>"readonly>
									<div class="fv-plugins-message-container invalid-feedback"></div>
								</div>
								<!--end::Col-->
									<!--begin::Label-->
								<label class="col-lg-2 col-form-label fw-semibold fs-6"> Incentive </label>
								<!--end::Label-->
								<!--begin::Col-->
								<div class="col-lg-2 fv-row fv-plugins-icon-container">
									<input type="text" name="view_incentive_staff_list" class="form-control form-control-lg form-control-solid" placeholder="Incentive" value="<?php echo $staff_view_details->Incentive; ?>"readonly>
									<div class="fv-plugins-message-container invalid-feedback"></div>
								</div>
								<!--end::Col-->
								<!--begin::Label-->
								<label class="col-lg-2 col-form-label fw-semibold fs-6">Leave Deduction</label>
								<!--end::Label-->
								<!--begin::Col-->
								<div class="col-lg-2 fv-row fv-plugins-icon-container">
									<input type="text" name="view_leavededuction_staff_list" class="form-control form-control-lg form-control-solid" placeholder="Leave Deduction" value="<?php echo $staff_view_details->Leavededuction; ?>"readonly>
									<div class="fv-plugins-message-container invalid-feedback"></div>
								</div>
								<!--end::Col-->
								<!--begin::Label-->
								<label class="col-lg-2 col-form-label fw-semibold fs-6">Net Salary</label>
								<!--end::Label-->
								<!--begin::Col-->
								<div class="col-lg-2 fv-row fv-plugins-icon-container">
									<input type="text" name="view_netsalary_staff_list" class="form-control form-control-lg form-control-solid" placeholder="Net Salary" value="<?php echo $staff_view_details->Netsalary;?>"readonly>
									<div class="fv-plugins-message-container invalid-feedback"></div>
								</div>
								<!--end::Col-->
							</div>								
						</div>
						<!--end::Modal body-->
					</form>
				</div>
			<!--end::Modal content-->
			</div>
		<!--end::Modal dialog-->