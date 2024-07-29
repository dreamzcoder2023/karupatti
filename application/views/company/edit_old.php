<!--begin::Modal dialog-->
			<div class="modal-dialog modal-xl">
				<!--begin::Modal content-->
				<div class="modal-content rounded">
					<!--begin::Modal header-->
					<div class="modal-header justify-content-end border-0 pb-0">
						<!--begin::Close-->
						<div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal"  onclick="closeEditModal();">
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
					<form name="company_edit_form" id="company_edit_form" method="POST" action="<?php echo base_url(); ?>company/company_update" enctype="multipart/form-data" onsubmit="return company_edit_validation();">
						<input type="hidden" id="company_id" name="company_id" value="<?php echo $company_details->COMPANYCODE;?>">
						<div class="modal-body pt-0 pb-15 px-5 px-xl-20">

							<!--begin::Heading-->
							<div class="mb-13 text-center">
								<h1 class="mb-3">Modify Company</h1>
								<div class="text-muted fw-semibold fs-5">Place where investment turns into profit</div>
							</div>
							<!--end::Heading-->
							<!--end::Heading-->
							<div class="row mb-6">
													
													
													
													<!--begin::Label-->
													<label class="col-lg-1 col-form-label required fw-semibold fs-6"> Name</label>
													<!--end::Label-->
													<!--begin::Col-->
													<div class="col-lg-3 fv-row fv-plugins-icon-container">
														<input type="text" name="company_name" id="company_name_edit" class="form-control form-control-lg form-control-solid" placeholder="Company Name" value="<?php echo $company_details->COMPANYNAME; ?>">
														<div class="fv-plugins-message-container invalid-feedback" id="company_edit_err"></div>
														
													</div>
													<!--end::Col-->
													
													<!--begin::Label-->
													<label class="col-lg-1 col-form-label required fw-semibold fs-6">Address</label>
													<!--end::Label-->
													<!--begin::Col-->
													<div class="col-lg-3 fv-row fv-plugins-icon-container">
														<input type="text" name="address1" id="address1" class="form-control form-control-lg form-control-solid" placeholder="Company Address" value="<?php echo $company_details->ADDRESS1;?>">
														<div class="fv-plugins-message-container invalid-feedback"></div>
													</div>
													<!--end::Col-->
													<!--begin::Label-->
													<label class="col-lg-1 col-form-label required fw-semibold fs-6">Address</label>
													<!--end::Label-->
													<!--begin::Col-->
													<div class="col-lg-3 fv-row fv-plugins-icon-container">
														<input type="text" name="address2" id="address2" class="form-control form-control-lg form-control-solid" placeholder="Company Address" value="<?php echo $company_details->ADDRESS2;?>">
														<div class="fv-plugins-message-container invalid-feedback"></div>
													</div>
													<!--end::Col-->
													<!--begin::Label-->
													<label class="col-lg-1 col-form-label required fw-semibold fs-6">City</label>
													<!--end::Label-->
													<!--begin::Left Section-->
													<div class="col-lg-3">
													<!--begin::Select-->
														<select class="form-select form-select-solid" data-control="select2" data-placeholder="Select Zone" data-hide-search="true" name="city" id="city">
															<option selected="">Select City</option>
															<?php 
															$qry=$this->db->query("SELECT DISTINCT CITY FROM COMPANY ");
															$res=$qry->result();
															foreach ($res as $city_list) {
																?>
																<option value="<?php echo $city_list->CITY; ?>" selected="<?php if ($city_list->CITY==$company_details->CITY){echo 'selected';}  ?>"> <?php echo $city_list->CITY; ?></option>
																<?php
															}
															?>
														</select>
														<!--end::Select-->
													</div>
													<!--end::Left Section-->
													<!--begin::Label-->
													<label class="col-lg-1 col-form-label required fw-semibold fs-6">Pincode</label>
													<!--end::Label-->
													<!--begin::Col-->
													<div class="col-lg-3 fv-row fv-plugins-icon-container">
														<input type="text" name="pincode" id="pincode" class="form-control form-control-lg form-control-solid" placeholder="Phone No" value="<?php echo $company_details->PINCODE;?>">
														<div class="fv-plugins-message-container invalid-feedback"></div>
													</div>
													<!--end::Col-->
													<!--begin::Label-->
													<label class="col-lg-1 col-form-label required fw-semibold fs-6">State</label>
													<!--end::Label-->
													<!--begin::Left Section-->
													<div class="col-lg-3">
													<!--begin::Select-->
														<select class="form-select form-select-solid" data-control="select2" data-placeholder="Select State" data-hide-search="true" id="state" name="state">
															<option >Select State
															</option>
															<?php 
														
															$qry=$this->db->query("SELECT  STATE_NAME FROM STATES ORDER BY STATE_NAME");
															$res=$qry->result();
															foreach ($res as $state_list) 
															{
																?>
																<option value="<?php echo $state_list->STATE_NAME; ?>" selected="<?php 
																if($state_list->STATE_NAME == $company_details->STATE){echo 'selected';}else {echo ''; }  ?>"> <?php echo $state_list->STATE_NAME; ?></option>
																<?php
															}
															?> 
														</select>
														<!--end::Select-->
												
													</div>
													<!--begin::Label-->
													<label class="col-lg-1 col-form-label required fw-semibold fs-6">Phone</label>
													<!--end::Label-->
													<!--begin::Col-->
													<div class="col-lg-3 fv-row fv-plugins-icon-container">
														<input type="text" name="phone" id="phone" class="form-control form-control-lg form-control-solid" placeholder="Phone No" value="<?php echo $company_details->PHONE; ?>">
														<div class="fv-plugins-message-container invalid-feedback"></div>
													</div>
													<!--end::Col-->
													
													<!--begin::Label-->
													<label class="col-lg-1 col-form-label required fw-semibold fs-6">Email</label>
													<!--end::Label-->
													<!--begin::Col-->
													<div class="col-lg-3 fv-row fv-plugins-icon-container">
														<input type="text" name="email" id="email" class="form-control form-control-lg form-control-solid" placeholder="Enter Email ID" value="<?php echo $company_details->EMAIL; ?>">
														<div class="fv-plugins-message-container invalid-feedback"></div>
													</div>
													<!--end::Col-->
													
													<!--begin::Label-->
													<label class="col-lg-1 col-form-label required fw-semibold fs-6">PAN No</label>
													<!--end::Label-->
													<!--begin::Col-->
													<div class="col-lg-3 fv-row fv-plugins-icon-container">
														<input type="text" name="pan_no" id="pan_no" class="form-control form-control-lg form-control-solid" placeholder="PAN No" value="<?php echo $company_details->PAN_NO; ?>">
														<div class="fv-plugins-message-container invalid-feedback"></div>
													</div>
													<!--end::Col-->
													<!--begin::Label-->
													<label class="col-lg-1 col-form-label required fw-semibold fs-6">GSTIN</label>
													<!--end::Label-->
													<!--begin::Col-->
													<div class="col-lg-3 fv-row fv-plugins-icon-container">
														<input type="text" name="gst_no" id="gst_no" class="form-control form-control-lg form-control-solid" placeholder="GST Number" value="<?php echo $company_details->GST_NO; ?>">
														<div class="fv-plugins-message-container invalid-feedback"></div>
													</div>
													<!--end::Col-->
													<!--begin::Label-->
													<label class="col-lg-1 col-form-label required fw-semibold fs-6">Reg No.</label>
													<!--end::Label-->
													<!--begin::Col-->
													<div class="col-lg-3 fv-row fv-plugins-icon-container">
														<input type="text" name="reg_no" id="reg_no" class="form-control form-control-lg form-control-solid" placeholder="Contact Person" value="<?php echo $company_details->REGNO; ?>">
														<div class="fv-plugins-message-container invalid-feedback"></div>
													</div>
													<!--end::Col-->
													<!--begin::Label-->
													<label class="col-lg-1 col-form-label required fw-semibold fs-6">B.Type</label>
													<!--end::Label-->
													<!--begin::Col-->
													<div class="col-lg-3 fv-row fv-plugins-icon-container">
														<!--begin::Select-->
														<select class="form-select form-select-solid" data-control="select2" data-placeholder="Select Type" data-hide-search="true" id="btype" name="btype">
															<option selected="">Business Type</option>
															<option value="0" selected="<?php if($company_details->BUSINESS_TYPE==0){echo 'selected';}else{ echo ''; }?>">Jewel Loan Business</option>
															<option value="1" selected="<?php if($company_details->BUSINESS_TYPE>0){echo 'selected';}else{ echo ''; }?>">Other Business</option>
															
														</select>
														<!--end::Select-->
													</div>
													<!--end::Col-->
													
							</div>
							<div class="row mt-4"  >
								<div><span class="fw-bold fs-3">Printer options</span></div>
													
													<!--begin::Label-->
													<label class="col-lg-1 col-form-label required fw-semibold fs-6">Name</label>
													<!--end::Label-->
													<!--begin::Col-->
													<div class="col-lg-3 fv-row fv-plugins-icon-container">
														<input type="text" name="pcname" id="pcname" class="form-control form-control-lg form-control-solid" placeholder="Company Code" value="<?php echo $company_details->COMPANYNAME2; ?>">
														<div class="fv-plugins-message-container invalid-feedback"></div>
													</div>
													<!--end::Col-->
													<!--begin::Label-->
													<label class="col-lg-1 col-form-label required fw-semibold fs-6">Address</label>
													<!--end::Label-->
													<!--begin::Col-->
													<div class="col-lg-3 fv-row fv-plugins-icon-container">
														<input type="text" name="paddress" id="paddress" class="form-control form-control-lg form-control-solid" placeholder="Company Code" value="<?php echo $company_details->ADDRESSLINE; ?>">
														<div class="fv-plugins-message-container invalid-feedback"></div>
													</div>
													<!--end::Col-->
													
													<!--begin::Label-->
													<label class="col-lg-1 col-form-label required fw-semibold fs-6">Code</label>
													<!--end::Label-->
													<!--begin::Col-->
													<div class="col-lg-3 fv-row fv-plugins-icon-container">
														<input type="text" name="code" id="code" class="form-control form-control-lg form-control-solid" placeholder="Company Code" value="<?php echo $company_details->LOGINCODE; ?>">
														<div class="fv-plugins-message-container invalid-feedback"></div>
													</div>
													<!--end::Col-->
													<!--begin::Label-->
													<!-- <label class="col-lg-1 col-form-label fw-semibold fs-6">Has Branch</label> -->
													<!--end::Label-->
													<!--begin::Col-->
													<!-- <div class="col-lg-1 fv-row fv-plugins-icon-container fv-plugins-bootstrap5-row-invalid"> -->
														<!--begin::Options-->
														<!-- <div class="d-flex align-items-center mt-3"> -->
															<!--begin::Option-->
															<!-- <label class="form-check form-check-inline form-check-solid me-5 is-invalid"> -->
																<!-- <input class="form-check-input" name="communication[]" type="checkbox" value="1"> -->
																<!--<span class="fw-semibold ps-2 fs-6">Branch Status</span>-->
															<!-- </label> -->
															<!--end::Option-->
														<!-- </div> -->
														<!--end::Options-->
													<!-- </div> -->
													<!--end::Col-->
													
							</div>
							<!--begin::Label-->
													<label class="col-lg-1 col-form-label required fw-semibold fs-6">Logo</label>
													<!--end::Label-->
													<!--begin::Col-->
													<div class="col-lg-3">

													<!--begin::Image input-->

													<div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url('assets/media/svg/avatars/blank.svg')">
														<!--begin::Preview existing avatar-->
														<?php if (isset($company_details->COMPANY_LOGO)) {?>
																<!--begin::Preview existing avatar-->
															<div class="image-input-wrapper w-125px h-125px" style="background-image: url(<?php echo base_url()?>assets/images/company_logo/<?php echo $company_details->COMPANY_LOGO; ?>); padding:20px;"></div>
																<!--end::Preview existing avatar-->
														<?php } else{ ?>
															<div class="image-input-wrapper w-125px h-125px" style="background-image: url(<?php echo base_url(); ?>assets/images/logo-1.jpg)"></div>
														<?php } ?>
														<!--end::Preview existing avatar-->
														<!--begin::Label-->
														<label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" data-kt-initialized="1">
															<i class="bi bi-pencil-fill fs-7"></i>
															<!--begin::Inputs-->
															<input type="file" name="company_logo_ed"  id="company_logo_ed" value="" accept=".png, .jpg, .jpeg" >
															<input type="hidden" name="avatar_remove" required>
															<input type="hidden" name="old_img" id="old_img" value="<?php echo $company_details->COMPANY_LOGO?$company_details->COMPANY_LOGO:''; ?>">
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
													<div class="fv-plugins-message-container invalid-feedback" id="company_logo_ed_err"></div>
												</div>
													<!--end::Col-->
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
										<button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Save Changes</button>
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

<?php $this->load->view("script");?>

<script> 
	function company_edit_validation()
			{
				var erre = 0;
				var company_ed = $('#company_name_edit').val();

			    if(company_ed.trim()==''){
			        $('#company_edit_err').html('Enter company Name!');
			        erre++;
			    }else{
			        //$('#company_err').html('');
			        if(berre>0)
					{
						$('#company_edit_err').html('company already exist!');
						erre++;
					}
					else
					{
						$('#company_edit_err').html('');
					}
			    }
			    var company_logo_ed = $('#company_logo_ed').val();

			    if(company_logo_ed.trim()==''){
			        $('#company_logo_ed_err').html('Select Company Logo !');
			        err++;
			    }else{			        
						$('#company_logo_ed_err').html('');
					
			    }

			    var state = $('#state').val();

			    if(state.trim()==''){
			        $('#state_err').html('Select State is Required !');
			        err++;
			    }else{			        
						$('#state_err').html('');
					
			    }
			    var city = $('#city').val();

			    if(city.trim()==''){
			        $('#city_err').html('Select City is Required !');
			        err++;
			    }else{			        
						$('#city_err').html('');
					
			    }
			    var email = $('#email').val();

			    if(email.trim()==''){
			        $('#email_err').html('Email is required !');
			        err++;
			    }else{			        
						$('#email_err').html('');
					
			    }
			    var btype = $('#btype').val();

			    if(btype.trim()==''){
			        $('#btype_err').html('Business Type is Required !');
			        err++;
			    }else{			        
						$('#btype_err').html('');
					
			    }
			    var phone = $('#phone').val();

			    if(phone.trim()==''){
			        $('#phone_err').html('Phone Number is Required !');
			        err++;
			    }else{			        
						$('#phone_err').html('');
					
			    }
			    var address1 = $('#address1').val();

			    if(address1.trim()==''){
			        $('#address1_err').html('Address 1 is Required !');
			        err++;
			    }else{			        
						$('#address1_err').html('');
					
			    }
			    var address2 = $('#address2').val();

			    if(address2.trim()==''){
			        $('#address2_err').html('Address 2 is Required !');
			        err++;
			    }else{			        
						$('#address2_err').html('');
					
			    }
			    var pincode = $('#pincode').val();

			    if(pincode.trim()==''){
			        $('#pincode_err').html('Pincode is Required !');
			        err++;
			    }else{			        
						$('#pincode_err').html('');
					
			    }
			    var pan_no = $('#pan_no').val();

			    if(pan_no.trim()==''){
			        $('#pan_no_err').html('Pan Number is Required !');
			        err++;
			    }else{			        
						$('#pan_no_err').html('');
					
			    }
			    var reg_no = $('#reg_no').val();

			    if(reg_no.trim()==''){
			        $('#reg_no_err').html('Register Number is Required !');
			        err++;
			    }else{			        
						$('#reg_no_err').html('');
					
			    }
			    var gst_no = $('#gst_no').val();

			    if(gst_no.trim()==''){
			        $('#gst_no_err').html('Register Number is Required !');
			        err++;
			    }else{			        
						$('#gst_no_err').html('');
					
			    }
			    var code = $('#code').val();

			    if(code.trim()==''){
			        $('#code_err').html('Printer Option Company Code is Required !');
			        err++;
			    }else{			        
						$('#code_err').html('');
					
			    }
			    var pcname = $('#pcname').val();

			    if(pcname.trim()==''){
			        $('#pcname_err').html('Printer Option Company Name is Required !');
			        err++;
			    }else{			        
						$('#pcname_err').html('');
					
			    }
			    var paddress = $('#paddress').val();

			    if(paddress.trim()==''){
			        $('#paddress_err').html('Printer Option Company Address  is Required !');
			        err++;
			    }else{			        
						$('#paddress_err').html('');
					
			    }
			    
			    if(erre>0){ return false; }else{ return true; }
			}
</script>