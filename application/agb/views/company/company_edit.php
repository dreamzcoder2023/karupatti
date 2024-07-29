<!--begin::Modal dialog-->
<div class="modal-dialog modal-xl">
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
		<form name="company_edit_form" id="company_edit_form" method="POST" action="<?php echo base_url(); ?>Company/company_update" enctype="multipart/form-data" onsubmit="return company_edit_validation();">
			<input type="hidden" id="ed_company_id" name="ed_company_id" value="<?php echo $edit->COMPANYCODE;?>">
			<div class="modal-body pt-0 pb-15 px-5 px-xl-20">

				<!--begin::Heading-->
				<div class="mb-13 text-center">
					<h1 class="mb-3">Modify Company</h1>
				</div>
				<!--end::Heading-->
				<!--end::Heading-->
				<div class="row mb-6">	
					<label class="col-lg-1 col-form-label required fw-semibold fs-6"> Name</label>
					<!--end::Label-->
					<!--begin::Col-->
					<div class="col-lg-3 fv-row fv-plugins-icon-container">
						
						<input type="text" name="company_name_edit" id="company_name_edit"  class="form-control form-control-lg form-control-solid" placeholder="Company Name"  onkeyup="company_unique_edit(this.value);" value="<?php echo $edit->COMPANYNAME?$edit->COMPANYNAME:''; ?>">
						<div class="fv-plugins-message-container invalid-feedback" id="company_edit_err"></div>
					</div>
					<!--end::Col-->
					
					<!--begin::Label-->
					<label class="col-lg-1 col-form-label required fw-semibold fs-6">Address&nbsp;1</label>
					<!--end::Label-->
					<!--begin::Col-->
					<div class="col-lg-3 fv-row fv-plugins-icon-container">
						<input type="text" name="ed_address1" id="ed_address1" class="form-control form-control-lg form-control-solid" placeholder="Company Address" value="<?php echo $edit->ADDRESS1?$edit->ADDRESS1:'';?>">
						<div class="fv-plugins-message-container invalid-feedback" id="ed_address1_err"></div>
					</div>
					<!--end::Col-->
					<!--begin::Label-->
					<div class="col-lg-1">
					<label class=" col-form-label required fw-semibold fs-6">Address&nbsp;2</label>
					</div>
					<!--end::Label-->
					<!--begin::Col-->
					<div class="col-lg-3 fv-row fv-plugins-icon-container">
						<input type="text" name="ed_address2" id="ed_address2" class="form-control form-control-lg form-control-solid" placeholder="Company Address 2"  value="<?php echo $edit->ADDRESS2?$edit->ADDRESS2:'';?>">
						<div class="fv-plugins-message-container invalid-feedback" id="ed_address2_err"></div>
					</div>
					<!--end::Col-->
					<!--begin::Label-->
					<label class="col-lg-1 col-form-label required fw-semibold fs-6">State</label>
					<!--end::Label-->
					<!--begin::Left Section-->
					<div class="col-lg-3">
					<!--begin::Select-->
						<input type="hidden" name="ed_state_hidden" id="ed_state_hidden" value="<?php echo $edit->STATE?$edit->STATE:''; ?>">
						<?php $state_chk = $edit->STATE?$edit->STATE:'';   ?>
						<select id="ed_state" name="ed_state" data-dropdown-parent="#kt_modal_edit_company" data-control="select2" class="form-select form-select-solid form-select-lg fs-6" onchange="ed_state_change()"  >
							<option value="SelectState">Select State</option>
							<option value="Andra Pradesh" <?php if($state_chk  == "Andra Pradesh"){echo 'selected';}else{echo '';} ?>>Andra Pradesh</option>
							<option value="Arunachal Pradesh"<?php if($state_chk == "Arunachal Pradesh"){echo 'selected';}else{echo '';} ?>>Arunachal Pradesh</option>
							<option value="Assam"<?php if($state_chk == "Assam"){echo 'selected';}else{echo '';} ?>>Assam</option>
							<option value="Bihar"<?php if($state_chk == "Bihar"){echo 'selected';}else{echo '';} ?>>Bihar</option>
							<option value="Chhattisgarh"<?php if($state_chk == "Chhattisgarh"){echo 'selected';}else{echo '';} ?>>Chhattisgarh</option>
							<option value="Goa"<?php if($state_chk == "Goa"){echo 'selected';}else{echo '';} ?>>Goa</option>
							<option value="Gujarat"<?php if($state_chk == "Gujarat"){echo 'selected';}else{echo '';} ?>>Gujarat</option>
							<option value="Haryana"<?php if($state_chk == "Haryana"){echo 'selected';}else{echo '';} ?>>Haryana</option>
							<option value="Himachal Pradesh"<?php if($state_chk == "Himachal Pradesh"){echo 'selected';}else{echo '';} ?>>Himachal Pradesh</option>
							<option value="Jammu and Kashmir"<?php if($state_chk == "Jammu and Kashmir"){echo 'selected';}else{echo '';} ?>>Jammu and Kashmir</option>
							<option value="Jharkhand"<?php if($state_chk == "Jharkhand"){echo 'selected';}else{echo '';} ?>>Jharkhand</option>
							<option value="Karnataka"<?php if($state_chk == "Karnataka"){echo 'selected';}else{echo '';} ?>>Karnataka</option>
							<option value="Kerala"<?php if($state_chk == "Kerala"){echo 'selected';}else{echo '';} ?>>Kerala</option>
							<option value="Madya Pradesh"<?php if($state_chk == "Madya Pradesh"){echo 'selected';}else{echo '';} ?>>Madya Pradesh</option>
							<option value="Maharashtra"<?php if($state_chk == "Maharashtra"){echo 'selected';}else{echo '';} ?>>Maharashtra</option>
							<option value="Manipur"<?php if($state_chk == "Manipur"){echo 'selected';}else{echo '';} ?>>Manipur</option>
							<option value="Meghalaya"<?php if($state_chk == "Meghalaya"){echo 'selected';}else{echo '';} ?>>Meghalaya</option>
							<option value="Mizoram"<?php if($state_chk == "Mizoram"){echo 'selected';}else{echo '';} ?>>Mizoram</option>
							<option value="Nagaland"<?php if($state_chk == "Nagaland"){echo 'selected';}else{echo '';} ?>>Nagaland</option>
							<option value="Orissa"<?php if($state_chk == "Orissa"){echo 'selected';}else{echo '';} ?>>Orissa</option>
							<option value="Punjab"<?php if($state_chk == "Punjab"){echo 'selected';}else{echo '';} ?>>Punjab</option>
							<option value="Rajasthan"<?php if($state_chk == "Rajasthan"){echo 'selected';}else{echo '';} ?>>Rajasthan</option>
							<option value="Sikkim"<?php if($state_chk == "Sikkim"){echo 'selected';}else{echo '';} ?>>Sikkim</option>
							<option value="Tamil Nadu"  <?php if($state_chk == "Tamil Nadu"){echo 'selected';}else{echo '';} ?>>Tamil Nadu</option>
							<option value="Telangana"<?php if($state_chk == "Telangana"){echo 'selected';}else{echo '';} ?>>Telangana</option>
							<option value="Tripura"<?php if($state_chk == "Tripura"){echo 'selected';}else{echo '';} ?>>Tripura</option>
							<option value="Uttaranchal"<?php if($state_chk == "Uttaranchal"){echo 'selected';}else{echo '';} ?>>Uttaranchal</option>
							<option value="Uttar Pradesh"<?php if($state_chk == "Uttar Pradesh"){echo 'selected';}else{echo '';} ?>>Uttar Pradesh</option>
							<option value="West Bengal"<?php if($state_chk == "West Bengal"){echo 'selected';}else{echo '';} ?>>West Bengal</option>
							<option disabled style="background-color:#aaa; color:#fff">UNION Territories</option>
							<option value="Andaman and Nicobar Islands"<?php if($state_chk == "Andaman and Nicobar Islands"){echo 'selected';}else{echo '';} ?>>Andaman and Nicobar Islands</option>
							<option value="Chandigarh"<?php if($state_chk == "Chandigarh"){echo 'selected';}else{echo '';} ?>>Chandigarh</option>
							<option value="Dadar and Nagar Haveli">Dadar and Nagar Dadar and Nagar Haveli</option>
							<option value="Daman and Diu"<?php if($state_chk == "Daman and Diu"){echo 'selected';}else{echo '';} ?>>Daman and Diu</option>
							<option value="Delhi"<?php if($state_chk == "Delhi"){echo 'selected';}else{echo '';} ?>>Delhi</option>
							<option value="Lakshadeep"<?php if($state_chk == "Lakshadeep"){echo 'selected';}else{echo '';} ?>>Lakshadeep</option>
							<option value="Pondicherry"<?php if($state_chk == "Pondicherry"){echo 'selected';}else{echo '';} ?>>Pondicherry</option>
						</select>
						<!--end::Select-->
						<div class="fv-plugins-message-container invalid-feedback" id="state_err"></div>
					</div>												
					<!--begin::Label-->
					<label class="col-lg-1 col-form-label required fw-semibold fs-6">City</label>
					<!--end::Label-->
					<!--begin::Left Section-->
					<div class="col-lg-3">
					<!--begin::Select-->
						    <input type="hidden" name="city_hidden" id="city_hidden" value="<?php echo $edit->CITY?$edit->CITY:''; ?>">
							<select id="ed_city" name="ed_city" data-dropdown-parent="#kt_modal_edit_company"  aria-label="Select a Currency" data-control="select2" class="form-select form-select-solid form-select-lg fs-6"  >
								<option value="">Select City</option>
							</select>
						<!--end::Select-->
						<div class="fv-plugins-message-container invalid-feedback" id="ed_city_err"></div>
					</div>
					<!--end::Left Section-->
					<!--begin::Label-->
					<label class="col-lg-1 col-form-label required fw-semibold fs-6">Pincode</label>
					<!--end::Label-->
					<!--begin::Col-->
					<div class="col-lg-3 fv-row fv-plugins-icon-container">
						<input type="text" name="ed_pincode" id="ed_pincode" class="form-control form-control-lg form-control-solid" placeholder="Pincode" value="<?php echo $edit->PINCODE?$edit->PINCODE:'';?>" >
						<div class="fv-plugins-message-container invalid-feedback" id="ed_pincode_err"></div>
					</div>
					<!--end::Col-->
					
					<!--begin::Label-->
					<label class="col-lg-1 col-form-label required fw-semibold fs-6">Phone</label>
					<!--end::Label-->
					<!--begin::Col-->
					<div class="col-lg-3 fv-row fv-plugins-icon-container">
						<input type="text" name="ed_phone" id="ed_phone" class="form-control form-control-lg form-control-solid" placeholder="Phone No" value="<?php echo $edit->PHONE?$edit->PHONE:''; ?>">
						<div class="fv-plugins-message-container invalid-feedback" id="ed_phone_err"></div>
					</div>
					<!--end::Col-->
					
					<!--begin::Label-->
					<label class="col-lg-1 col-form-label required fw-semibold fs-6">Email</label>
					<!--end::Label-->
					<!--begin::Col-->
					<div class="col-lg-3 fv-row fv-plugins-icon-container">
						<input type="text"  name="ed_email" id="ed_email"  class="form-control form-control-lg form-control-solid" placeholder="Enter Email ID" value="<?php echo $edit->EMAIL?$edit->EMAIL:''; ?>">
						<div class="fv-plugins-message-container invalid-feedback" id="ed_email_err"></div>
					</div>
					<!--end::Col-->
					
					<!--begin::Label-->
					<label class="col-lg-1 col-form-label required fw-semibold fs-6">Pan No</label>
					<!--end::Label-->
					<!--begin::Col-->
					<div class="col-lg-3 fv-row fv-plugins-icon-container">
						<input type="text" name="ed_pan_no" id="ed_pan_no"  class="form-control form-control-lg form-control-solid" placeholder="PAN Number" value="<?php echo $edit->PAN_NO?$edit->PAN_NO:''; ?>" >
						<div class="fv-plugins-message-container invalid-feedback" id="ed_pan_no_err"></div>
					</div>
					<!--end::Col-->
					<!--begin::Label-->
					<label class="col-lg-1 col-form-label required fw-semibold fs-6">GSTIN</label>
					<!--end::Label-->
					<!--begin::Col-->
					<div class="col-lg-3 fv-row fv-plugins-icon-container">
						<input type="text" name="ed_gst_no" id="ed_gst_no" maxlength="15" class="form-control form-control-lg form-control-solid" placeholder="GST Number" value="<?php echo $edit->GST_NO?$edit->GST_NO:''; ?>" >
						<div class="fv-plugins-message-container invalid-feedback" id="ed_gst_no_err"></div>
					</div>
					<!--end::Col-->
					<!--begin::Label-->
					<label class="col-lg-1 col-form-label required fw-semibold fs-6">Reg.No</label>
					<!--end::Label-->
					<!--begin::Col-->
					<div class="col-lg-3 fv-row fv-plugins-icon-container">
						<input type="text" name="ed_reg_no" id="ed_reg_no"  class="form-control form-control-lg form-control-solid" placeholder="Register Number" value="<?php echo $edit->REGNO?$edit->REGNO:''; ?>">
						<div class="fv-plugins-message-container invalid-feedback" id="ed_reg_no_err"></div>
					</div>
					<!--end::Col-->
					<!--begin::Label-->
					<label class="col-lg-1 col-form-label required fw-semibold fs-6">B.Type</label>
					<!--end::Label-->
					<!--begin::Col-->
					<div class="col-lg-3 fv-row fv-plugins-icon-container">
						<!--begin::Select-->
						<select class="form-select form-select-solid" data-dropdown-parent="#kt_modal_edit_company" data-control="select2"  data-hide-search="false" id="ed_btype" name="ed_btype" >
							<option value="" selected="">Select Business Type</option>
							<option value="0" selected="<?php if($edit->BUSINESS_TYPE==0){echo 'selected';}else{ echo ''; }?>">Jewel  Business</option>
							<option value="1" selected="<?php if($edit->BUSINESS_TYPE==1){echo 'selected';}else{ echo ''; }?>">Loan  Business</option>
							<option value="2" selected="<?php if($edit->BUSINESS_TYPE==2){echo 'selected';}else{ echo ''; }?>">Other Business</option>
							
						</select>
						<div class="fv-plugins-message-container invalid-feedback" id="ed_btype_err"></div>
						<!--end::Select-->
					</div>
					<!--end::Col-->												
				</div>
				<div class="row mt-2">
					<div class="col-lg-4">
						<div class="row">
							<div class="col-lg-3"> 
								<div class="row">

									<div class="col-lg-9">
										<label class=" col-form-label fw-semibold fs-6" id="cs_name">
										 <span class="me-1">S.Name</span>
										</label>
									</div>
									<div class="col-lg-3">
										<label class="col-form-label fw-semibold fs-6" id="cs_name" > 
									   		<span class="text-dark"><i class="fa fa-circle-info fs-7"></i></span>
											<span class="mt-4 me-10" id="down">Ex:AGB.. <br> Max 5 Letters</span>
										</label>
									</div>
								</div>
								
							</div>
							<div class="col-lg-9"> 
								<div class="">
									<input type="text" name="ed_code" id="ed_code" class="form-control form-control-lg form-control-solid" placeholder="Company Short Name" value="<?php echo $edit->LOGINCODE?$edit->LOGINCODE:'' ?>" maxlength="5">

									<div class="fv-plugins-message-container invalid-feedback" id="ed_code_err"></div>
								</div>
							</div>
						</div>
					</div>
					<label class="col-lg-1 col-form-label required fw-semibold fs-6">Logo</label>								
					<div class="col-lg-3">
						<div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url('assets/media/svg/avatars/blank.svg')">
						<!--begin::Preview existing avatar-->
						<?php if (isset($edit->COMPANY_LOGO)) {?>
								<!--begin::Preview existing avatar-->
							<div class="image-input-wrapper w-125px h-125px" style="background-image: url(<?php echo base_url()?>assets/images/company_logo/<?php echo $edit->COMPANY_LOGO; ?>); padding:20px;"></div>
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
							<input type="hidden" name="old_img" id="old_img" value="<?php echo $edit->COMPANY_LOGO?$edit->COMPANY_LOGO:''; ?>">
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
				</div>
				<!--begin::Actions-->
				<div class="row">
					<div class="col-lg-9"></div>
					<div class="col-lg-1">
						<div class="d-flex flex-center flex-row-fluid pt-12">
							<button type="reset" class="btn btn-secondary me-3" data-bs-dismiss="modal">Cancel</button>
						</div>
					</div>
					<div class="col-lg-2">
						<div class="d-flex flex-center flex-row-fluid pt-12">
							<button type="submit" class="btn btn-primary" id="edit_submit">Save Changes</button>
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
	var berr=0;
	function company_unique_edit(val)
	{
		var baseurl= $("#baseurl").val();
		var id ='<?php echo $edit->COMPANYCODE;?>';
		$.ajax({
			type:"POST",
			url:baseurl+'Company/company_unique_edit',
			data:{'value':val,'id':id},
			cache: false,
			dataType: "html",
				success: function(result){
				if(result>0)
				{
					$('#company_edit_err').html('Company already exist!');
					$('#edit_submit').prop('disabled', true);
					
					berr=1;
				}
				else
				{
					$('#company_edit_err').html('');
					 $('#edit_submit').prop('disabled', false);
					berr=0;
				}
			}
		});
	}

			
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

			    var ed_state = $('#ed_state').val();

			    if(ed_state.trim()==''){
			        $('#ed_state_err').html('Select State is Required !');
			        err++;
			    }else{			        
						$('#ed_state_err').html('');
					
			    }
			    var ed_city = $('#ed_city').val();

			    if(ed_city.trim()==''){
			        $('#ed_city_err').html('Select City is Required !');
			        err++;
			    }else{			        
						$('#ed_city_err').html('');
					
			    }
			    var ed_email = $('#ed_email').val();

			    if(ed_email.trim()==''){
			        $('#ed_email_err').html('Email is required !');
			        err++;
			    }else{			        
						$('#ed_email_err').html('');
					
			    }
			    var ed_btype = $('#ed_btype').val();

			    if(ed_btype.trim()==''){
			        $('#ed_btype_err').html('Business Type is Required !');
			        err++;
			    }else{			        
						$('#ed_btype_err').html('');
					
			    }
			    var ed_phone = $('#ed_phone').val();

			    if(ed_phone.trim()==''){
			        $('#ed_phone_err').html('ed_Phone Number is Required !');
			        err++;
			    }else{			        
						$('#ed_phone_err').html('');
					
			    }
			    var ed_address1 = $('#ed_address1').val();

			    if(ed_address1.trim()==''){
			        $('#ed_address1_err').html('Address 1 is Required !');
			        err++;
			    }else{			        
						$('#ed_address1_err').html('');
					
			    }
			    var ed_address2 = $('#ed_address2').val();

			    if(ed_address2.trim()==''){
			        $('#ed_address2_err').html('Address 2 is Required !');
			        err++;
			    }else{			        
						$('#ed_address2_err').html('');
					
			    }
			    var ed_pincode = $('#ed_pincode').val();

			    if(ed_pincode.trim()==''){
			        $('#ed_pincode_err').html('ed_Pincode is Required !');
			        err++;
			    }else{			        
						$('#ed_pincode_err').html('');
					
			    }
			    var ed_pan_no = $('#ed_pan_no').val();

			    if(ed_pan_no.trim()==''){
			        $('#ed_pan_no_err').html('Pan Number is Required !');
			        err++;
			    }else{			        
						$('#ed_pan_no_err').html('');
					
			    }
			    var ed_reg_no = $('#ed_reg_no').val();

			    if(ed_reg_no.trim()==''){
			        $('#ed_reg_no_err').html('Register Number is Required !');
			        err++;
			    }else{			        
						$('#ed_reg_no_err').html('');
					
			    }
			    var ed_gst_no = $('#ed_gst_no').val();

			    if(ed_gst_no.trim()==''){
			        $('#ed_gst_no_err').html('Register Number is Required !');
			        err++;
			    }else{			        
						$('#ed_gst_no_err').html('');
					
			    }
			    var ed_code = $('#ed_code').val();

			    if(ed_code.trim()==''){
			        $('#ed_code_err').html('Printer Option Company Code is Required !');
			        err++;
			    }else{			        
						$('#ed_code_err').html('');
					
			    }
			    
			    if(erre>0){ return false; }else{ return true; }
			}
</script>
<!-- state city  -->
		<script>
			ed_state_change()
			function ed_state_change(){

				// alert('yes');

				var AndraPradesh = ["Anantapur","Chittoor","East Godavari","Guntur","Kadapa","Krishna","Kurnool","Prakasam","Nellore","Srikakulam","Visakhapatnam","Vizianagaram","West Godavari"];
				var ArunachalPradesh = ["Anjaw","Changlang","Dibang Valley","East Kameng","East Siang","Kra Daadi","Kurung Kumey","Lohit","Longding","Lower Dibang Valley","Lower Subansiri","Namsai","Papum Pare","Siang","Tawang","Tirap","Upper Siang","Upper Subansiri","West Kameng","West Siang","Itanagar"];
				var Assam = ["Baksa","Barpeta","Biswanath","Bongaigaon","Cachar","Charaideo","Chirang","Darrang","Dhemaji","Dhubri","Dibrugarh","Goalpara","Golaghat","Hailakandi","Hojai","Jorhat","Kamrup Metropolitan","Kamrup (Rural)","Karbi Anglong","Karimganj","Kokrajhar","Lakhimpur","Majuli","Morigaon","Nagaon","Nalbari","Dima Hasao","Sivasagar","Sonitpur","South Salmara Mankachar","Tinsukia","Udalguri","West Karbi Anglong"];
				var Bihar = ["Araria","Arwal","Aurangabad","Banka","Begusarai","Bhagalpur","Bhojpur","Buxar","Darbhanga","East Champaran","Gaya","Gopalganj","Jamui","Jehanabad","Kaimur","Katihar","Khagaria","Kishanganj","Lakhisarai","Madhepura","Madhubani","Munger","Muzaffarpur","Nalanda","Nawada","Patna","Purnia","Rohtas","Saharsa","Samastipur","Saran","Sheikhpura","Sheohar","Sitamarhi","Siwan","Supaul","Vaishali","West Champaran"];
				var Chhattisgarh = ["Balod","Baloda Bazar","Balrampur","Bastar","Bemetara","Bijapur","Bilaspur","Dantewada","Dhamtari","Durg","Gariaband","Janjgir Champa","Jashpur","Kabirdham","Kanker","Kondagaon","Korba","Koriya","Mahasamund","Mungeli","Narayanpur","Raigarh","Raipur","Rajnandgaon","Sukma","Surajpur","Surguja"];
				var Goa = ["North Goa","South Goa"];
				var Gujarat = ["Ahmedabad","Amreli","Anand","Aravalli","Banaskantha","Bharuch","Bhavnagar","Botad","Chhota Udaipur","Dahod","Dang","Devbhoomi Dwarka","Gandhinagar","Gir Somnath","Jamnagar","Junagadh","Kheda","Kutch","Mahisagar","Mehsana","Morbi","Narmada","Navsari","Panchmahal","Patan","Porbandar","Rajkot","Sabarkantha","Surat","Surendranagar","Tapi","Vadodara","Valsad"];
				var Haryana = ["Ambala","Bhiwani","Charkhi Dadri","Faridabad","Fatehabad","Gurugram","Hisar","Jhajjar","Jind","Kaithal","Karnal","Kurukshetra","Mahendragarh","Mewat","Palwal","Panchkula","Panipat","Rewari","Rohtak","Sirsa","Sonipat","Yamunanagar"];
				var HimachalPradesh = ["Bilaspur","Chamba","Hamirpur","Kangra","Kinnaur","Kullu","Lahaul Spiti","Mandi","Shimla","Sirmaur","Solan","Una"];
				var JammuKashmir = ["Anantnag","Bandipora","Baramulla","Budgam","Doda","Ganderbal","Jammu","Kargil","Kathua","Kishtwar","Kulgam","Kupwara","Leh","Poonch","Pulwama","Rajouri","Ramban","Reasi","Samba","Shopian","Srinagar","Udhampur"];
				var Jharkhand = ["Bokaro","Chatra","Deoghar","Dhanbad","Dumka","East Singhbhum","Garhwa","Giridih","Godda","Gumla","Hazaribagh","Jamtara","Khunti","Koderma","Latehar","Lohardaga","Pakur","Palamu","Ramgarh","Ranchi","Sahebganj","Seraikela Kharsawan","Simdega","West Singhbhum"];
				var Karnataka = ["Bagalkot","Bangalore Rural","Bangalore Urban","Belgaum","Bellary","Bidar","Vijayapura","Chamarajanagar","Chikkaballapur","Chikkamagaluru","Chitradurga","Dakshina Kannada","Davanagere","Dharwad","Gadag","Gulbarga","Hassan","Haveri","Kodagu","Kolar","Koppal","Mandya","Mysore","Raichur","Ramanagara","Shimoga","Tumkur","Udupi","Uttara Kannada","Yadgir"];
				var Kerala = ["Alappuzha","Ernakulam","Idukki","Kannur","Kasaragod","Kollam","Kottayam","Kozhikode","Malappuram","Palakkad","Pathanamthitta","Thiruvananthapuram","Thrissur","Wayanad"];
				var MadhyaPradesh = ["Agar Malwa","Alirajpur","Anuppur","Ashoknagar","Balaghat","Barwani","Betul","Bhind","Bhopal","Burhanpur","Chhatarpur","Chhindwara","Damoh","Datia","Dewas","Dhar","Dindori","Guna","Gwalior","Harda","Hoshangabad","Indore","Jabalpur","Jhabua","Katni","Khandwa","Khargone","Mandla","Mandsaur","Morena","Narsinghpur","Neemuch","Panna","Raisen","Rajgarh","Ratlam","Rewa","Sagar","Satna",
				"Sehore","Seoni","Shahdol","Shajapur","Sheopur","Shivpuri","Sidhi","Singrauli","Tikamgarh","Ujjain","Umaria","Vidisha"];
				var Maharashtra = ["Ahmednagar","Akola","Amravati","Aurangabad","Beed","Bhandara","Buldhana","Chandrapur","Dhule","Gadchiroli","Gondia","Hingoli","Jalgaon","Jalna","Kolhapur","Latur","Mumbai City","Mumbai Suburban","Nagpur","Nanded","Nandurbar","Nashik","Osmanabad","Palghar","Parbhani","Pune","Raigad","Ratnagiri","Sangli","Satara","Sindhudurg","Solapur","Thane","Wardha","Washim","Yavatmal"];
				var Manipur = ["Bishnupur","Chandel","Churachandpur","Imphal East","Imphal West","Jiribam","Kakching","Kamjong","Kangpokpi","Noney","Pherzawl","Senapati","Tamenglong","Tengnoupal","Thoubal","Ukhrul"];
				var Meghalaya = ["East Garo Hills","East Jaintia Hills","East Khasi Hills","North Garo Hills","Ri Bhoi","South Garo Hills","South West Garo Hills","South West Khasi Hills","West Garo Hills","West Jaintia Hills","West Khasi Hills"];
				var Mizoram = ["Aizawl","Champhai","Kolasib","Lawngtlai","Lunglei","Mamit","Saiha","Serchhip","Aizawl","Champhai","Kolasib","Lawngtlai","Lunglei","Mamit","Saiha","Serchhip"];
				var Nagaland = ["Dimapur","Kiphire","Kohima","Longleng","Mokokchung","Mon","Peren","Phek","Tuensang","Wokha","Zunheboto"];
				var Odisha = ["Angul","Balangir","Balasore","Bargarh","Bhadrak","Boudh","Cuttack","Debagarh","Dhenkanal","Gajapati","Ganjam","Jagatsinghpur","Jajpur","Jharsuguda","Kalahandi","Kandhamal","Kendrapara","Kendujhar","Khordha","Koraput","Malkangiri","Mayurbhanj","Nabarangpur","Nayagarh","Nuapada","Puri","Rayagada","Sambalpur","Subarnapur","Sundergarh"];
				var Punjab = ["Amritsar","Barnala","Bathinda","Faridkot","Fatehgarh Sahib","Fazilka","Firozpur","Gurdaspur","Hoshiarpur","Jalandhar","Kapurthala","Ludhiana","Mansa","Moga","Mohali","Muktsar","Pathankot","Patiala","Rupnagar","Sangrur","Shaheed Bhagat Singh Nagar","Tarn Taran"];
				var Rajasthan = ["Ajmer","Alwar","Banswara","Baran","Barmer","Bharatpur","Bhilwara","Bikaner","Bundi","Chittorgarh","Churu","Dausa","Dholpur","Dungarpur","Ganganagar","Hanumangarh","Jaipur","Jaisalmer","Jalore","Jhalawar","Jhunjhunu","Jodhpur","Karauli","Kota","Nagaur","Pali","Pratapgarh","Rajsamand","Sawai Madhopur","Sikar","Sirohi","Tonk","Udaipur"];
				var Sikkim = ["East Sikkim","North Sikkim","South Sikkim","West Sikkim"];
				var TamilNadu = ["Ariyalur","Chennai","Coimbatore","Cuddalore","Dharmapuri","Dindigul","Erode","Kanchipuram","Kanyakumari","Karur","Krishnagiri","Madurai","Nagapattinam","Namakkal","Nilgiris","Perambalur","Pudukkottai","Ramanathapuram","Salem","Sivaganga","Thanjavur","Theni","Thoothukudi","Tiruchirappalli","Tirunelveli","Tiruppur","Tiruvallur","Tiruvannamalai","Tiruvarur","Vellore","Viluppuram","Virudhunagar"];
				var Telangana = ["Adilabad","Bhadradri Kothagudem","Hyderabad","Jagtial","Jangaon","Jayashankar","Jogulamba","Kamareddy","Karimnagar","Khammam","Komaram Bheem","Mahabubabad","Mahbubnagar","Mancherial","Medak","Medchal","Nagarkurnool","Nalgonda","Nirmal","Nizamabad","Peddapalli","Rajanna Sircilla","Ranga Reddy","Sangareddy","Siddipet","Suryapet","Vikarabad","Wanaparthy","Warangal Rural","Warangal Urban","Yadadri Bhuvanagiri"];
				var Tripura = ["Dhalai","Gomati","Khowai","North Tripura","Sepahijala","South Tripura","Unakoti","West Tripura"];
				var UttarPradesh = ["Agra","Aligarh","Allahabad","Ambedkar Nagar","Amethi","Amroha","Auraiya","Azamgarh","Baghpat","Bahraich","Ballia","Balrampur","Banda","Barabanki","Bareilly","Basti","Bhadohi","Bijnor","Budaun","Bulandshahr","Chandauli","Chitrakoot","Deoria","Etah","Etawah","Faizabad","Farrukhabad","Fatehpur","Firozabad","Gautam Buddha Nagar","Ghaziabad","Ghazipur","Gonda","Gorakhpur","Hamirpur","Hapur","Hardoi","Hathras","Jalaun","Jaunpur","Jhansi","Kannauj","Kanpur Dehat","Kanpur Nagar","Kasganj","Kaushambi","Kheri","Kushinagar","Lalitpur","Lucknow","Maharajganj","Mahoba","Mainpuri","Mathura","Mau","Meerut","Mirzapur","Moradabad","Muzaffarnagar","Pilibhit","Pratapgarh","Raebareli","Rampur","Saharanpur","Sambhal","Sant Kabir Nagar","Shahjahanpur","Shamli","Shravasti","Siddharthnagar","Sitapur","Sonbhadra","Sultanpur","Unnao","Varanasi"];
				var Uttarakhand  = ["Almora","Bageshwar","Chamoli","Champawat","Dehradun","Haridwar","Nainital","Pauri","Pithoragarh","Rudraprayag","Tehri","Udham Singh Nagar","Uttarkashi"];
				var WestBengal = ["Alipurduar","Bankura","Birbhum","Cooch Behar","Dakshin Dinajpur","Darjeeling","Hooghly","Howrah","Jalpaiguri","Jhargram","Kalimpong","Kolkata","Malda","Murshidabad","Nadia","North 24 Parganas","Paschim Bardhaman","Paschim Medinipur","Purba Bardhaman","Purba Medinipur","Purulia","South 24 Parganas","Uttar Dinajpur"];
				var AndamanNicobar = ["Nicobar","North Middle Andaman","South Andaman"];
				var Chandigarh = ["Chandigarh"];
				var DadraHaveli = ["Dadra Nagar Haveli"];
				var DamanDiu = ["Daman","Diu"];
				var Delhi = ["Central Delhi","East Delhi","New Delhi","North Delhi","North East Delhi","North West Delhi","Shahdara","South Delhi","South East Delhi","South West Delhi","West Delhi"];
				var Lakshadweep = ["Lakshadweep"];
				var Puducherry = ["Karaikal","Mahe","Puducherry","Yanam"];

				// var StateSelected='Tamil Nadu';

				// $("#state").change(function(){
				  var StateSelected = $("#ed_state").val();
				  $("#ed_state_hidden").val(StateSelected);  
				  var optionsList;
				  var htmlString = "";

				  switch (StateSelected) {
				    case "Andra Pradesh":
				        optionsList = AndraPradesh;
				        break;
				    case "Arunachal Pradesh":
				        optionsList = ArunachalPradesh;
				        break;
				    case "Assam":
				        optionsList = Assam;
				        break;
				    case "Bihar":
				        optionsList = Bihar;
				        break;
				    case "Chhattisgarh":
				        optionsList = Chhattisgarh;
				        break;
				    case "Goa":
				        optionsList = Goa;
				        break;
				    case  "Gujarat":
				        optionsList = Gujarat;
				        break;
				    case "Haryana":
				        optionsList = Haryana;
				        break;
				    case "Himachal Pradesh":
				        optionsList = HimachalPradesh;
				        break;
				    case "Jammu and Kashmir":
				        optionsList = JammuKashmir;
				        break;
				    case "Jharkhand":
				        optionsList = Jharkhand;
				        break;
				    case  "Karnataka":
				        optionsList = Karnataka;
				        break;
				    case "Kerala":
				        optionsList = Kerala;
				        break;
				    case  "Madya Pradesh":
				        optionsList = MadhyaPradesh;
				        break;
				    case "Maharashtra":
				        optionsList = Maharashtra;
				        break;
				    case  "Manipur":
				        optionsList = Manipur;
				        break;
				    case "Meghalaya":
				        optionsList = Meghalaya ;
				        break;
				    case  "Mizoram":
				        optionsList = Mizoram;
				        break;
				    case "Nagaland":
				        optionsList = Nagaland;
				        break;
				    case  "Orissa":
				        optionsList = Orissa;
				        break;
				    case "Punjab":
				        optionsList = Punjab;
				        break;
				    case  "Rajasthan":
				        optionsList = Rajasthan;
				        break;
				    case "Sikkim":
				        optionsList = Sikkim;
				        break;
				    case  "Tamil Nadu":
				        optionsList = TamilNadu;
				        break;
				    case  "Telangana":
				        optionsList = Telangana;
				        break;
				    case "Tripura":
				        optionsList = Tripura ;
				        break;
				    case  "Uttaranchal":
				        optionsList = Uttaranchal;
				        break;
				    case  "Uttar Pradesh":
				        optionsList = UttarPradesh;
				        break;
				    case "West Bengal":
				        optionsList = WestBengal;
				        break;
				    case  "Andaman and Nicobar Islands":
				        optionsList = AndamanNicobar;
				        break;
				    case "Chandigarh":
				        optionsList = Chandigarh;
				        break;
				    case  "Dadar and Nagar Haveli":
				        optionsList = DadraHaveli;
				        break;
				    case "Daman and Diu":
				        optionsList = DamanDiu;
				        break;
				    case  "Delhi":
				        optionsList = Delhi;
				        break;
				    case "Lakshadeep":
				        optionsList = Lakshadeep ;
				        break;
				    case  "Pondicherry":
				        optionsList = Pondicherry;
				        break;
				}
				var cityselected = $("#city_hidden").val();
					
				  for(var i = 0; i < optionsList.length; i++){


				  	if (cityselected==optionsList[i]) {

						var selected = 'selected';
					}else{
						var selected = '';
					}

				    htmlString = htmlString+"<option value='"+ optionsList[i] +"'"+selected+">"+ optionsList[i] +"</option>";
				  }
				  $("#ed_city").html(htmlString);
			}
			// ed_city_change()
			// function ed_city_change(){

			// 	var city_selected = $("#ed_city").val();

			// 	  $("#city_hidden").val(city_selected);    
			// }
		</script>