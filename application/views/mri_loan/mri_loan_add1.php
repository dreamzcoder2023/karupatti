    
<?php $this->load->view("common");?>
<link href="<?php echo base_url();?>assets/jquery.autocomplete.css" rel="stylesheet" type="text/css" />
<script src="<?php echo base_url();?>assets/js/webcam/webcam.min.js"></script>
<style>
	.dataTables_scroll
    {
        position: relative;
        overflow: auto;
        max-height: 218px;/*the maximum height you want to achieve*/
        width: 100%;
    }
  .dataTables_scroll thead
  {
    position: -webkit-sticky;
    position: sticky;
    top: 0;
   background-color: #ec9629;
    z-index: 2;
  }
</style>
<!-- <link href="assets/jquery.autocomplete.css" rel="stylesheet" type="text/css" /> -->
	<!--begin::Body-->
	<body data-kt-name="metronic" id="kt_body" class="header-fixed header-tablet-and-mobile-fixed toolbar-enabled toolbar-fixed aside-enabled aside-fixed">
		<!--begin::Theme mode setup on page load-->
		<script>if ( document.documentElement ) { const defaultThemeMode = "system"; const name = document.body.getAttribute("data-kt-name"); let themeMode = localStorage.getItem("kt_" + ( name !== null ? name + "_" : "" ) + "theme_mode_value"); if ( themeMode === null ) { if ( defaultThemeMode === "system" ) { themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light"; } else { themeMode = defaultThemeMode; } } document.documentElement.setAttribute("data-theme", themeMode); }</script>
		<!--end::Theme mode setup on page load-->
		<!--begin::Main-->
		<!--begin::Root-->
		<div class="d-flex flex-column flex-root">
			<!--begin::Page-->
			<div class="page d-flex flex-row flex-column-fluid">
				<?php $this->load->view("sidebar");?>
				<!--begin::Wrapper-->
				<div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
				<?php $this->load->view("header");?>
				<!--begin::Toolbar-->
					<div class="toolbar py-2" id="kt_toolbar">
						<!--begin::Container-->
						<div id="kt_toolbar_container" class="container-fluid d-flex align-items-center">
							<!--begin::Page title-->
							<div class="flex-grow-1 flex-shrink-0 me-5">
								<!--begin::Page title-->
								<div data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
									<!--begin::Title-->
									<h1 class="d-flex align-items-center text-dark fw-bold my-1 fs-3">New MRI Loan
									<!--begin::Separator-->
									<span class="h-20px border-gray-200 border-start ms-3 mx-2"></span>
									<!--end::Separator-->
									<!--begin::Description-->
									<!--end::Description--></h1>
									<!--end::Title-->
								</div>
								<!--end::Page title-->
							</div>
							<!--end::Page title-->
							
						</div>
						<!--end::Container-->
					</div>
					<!--end::Toolbar-->	
					<!--begin::Content-->
					<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
						<!--begin::Container-->
						<div id="kt_content_container" class="container-xxl">
							<!--begin::Row-->
							<div class="row gy-5 g-xl-8">
								<!--begin::Col-->
								<div class="col-xxl-8">
									<!--begin::Tables Widget 9-->
									<div class="card card-xxl-stretch mb-5 mb-xl-8">
										<!--begin::Card header-->
										<!-- <div class="card-header1 border-0 pt-6">
											
											
										</div> -->
										<!--end::Card header-->
										
										
											<!--begin::Card body-->
											<!-- <form method="POST" id="frm_loan_submit" action="<?php echo base_url();?>loan/loan_save" enctype="multipart/form-data" onsubmit="return loan_validation();"> -->
											<form method="POST" id="frm_loan_submit" action="MRI_Loan/MRI_Loan_save" enctype="multipart/form-data"  >
											<div class="card-body py-4">
												<div class="row">

													<!-- <div class="separator separator-content border-dark my-6"><span class="w-200px fw-bold fs-4">Party Basic Details</span></div> -->
													
													<div class="col-lg-6">
														<div class="px-4" style="border-radius: 10px;padding-bottom: 10px;box-shadow: 0 5px 10px #00002947;">
															<label class="col-lg-12 col-form-label fw-bold fs-5 text-center">Party Basic Details</label>
															<div class="row">
																<div class="col-lg-6">
																	<div class="row">
																		<label class="col-lg-4 col-form-label fw-semibold fs-6">Name</label>
																		<div class="col-lg-8 fv-row fv-plugins-icon-container">
																			<!--<input type="text" name="first_name" class="form-control form-control-lg1 form-control-solid" placeholder="Party Name" id="first_name" oninput="this.value = this.value.replace(/[^A-Za-z. ]/g, '').replace(/(\..*)\./g, '$1');" onkeyup="first_nm_party();">-->
																			<input type="text"  class="form-control "  value="" readonly >
																			<input type="hidden" name="first_name_id_hidden" id="first_name_id_hidden" value="">
																			<div class="fv-plugins-message-container invalid-feedback" id="first_name_err"></div>
																		</div>
																		<?php 
																				$party_address=$this->db->query("select * from PARTIES WHERE PID='".$loan_details->PID."'")->row();
																				
																				?>
																		<!-- <div id="card_show"> -->
																			<label class="col-lg-12 col-form-label fw-bold fs-6" id="no_card" name="no_card" style="display: none"><i class="fa fa-address-card fs-6" aria-hidden="true" title="Card No"></i>&emsp;<a href="<?php echo base_url();?>/membershipcard" target="_blank"><span style="color: red" >Click Here for<br> <b>New Membership Card</b></span></a>
																				
																				<!-- <i class="fas fa-check-circle fs-5" style="color:green;"></i> -->
																			</label>
																			<label class="col-lg-12 col-form-label fw-bold fs-6" id="lbl_mem_card_no"><i class="fa fa-address-card fs-6" aria-hidden="true" title="Card No"></i>&emsp;<span id="membership_card_no" name="membership_card_no">xxxx-xxxx-xxxx-xxxx</span>
																				<span id="verify_icon"><i class="fas fa-times-circle fs-5" style="color:red;"></i></span>
																				<!-- <i class="fas fa-check-circle fs-5" style="color:green;"></i> -->
																			</label>
																			<label class="col-lg-4 col-form-label fw-bold fs-6 text-center" name="card_type" id="card_type" >
																				<!-- <span style="background-color:#f4fdff;border-radius: 8px;padding: 5px 15px 5px 15px;">Card</span> -->
																				<!-- <span style="background-color:white;border-radius: 8px;padding: 5px 15px 5px 15px;">Card type</span> -->
																				<!-- <span style="background-color:#d2d4dc;border-radius: 8px;padding: 5px 15px 5px 15px;">Silver</span>-->
																				</label> 
																			<label class="col-lg-4 col-form-label fw-bold fs-6" name="" id="lbl_mem_point"><i class="fa-solid fa-coins fs-6" title="Points"></i>&emsp;<span id="membership_card_points" name="membership_card_points">000</span></label>
																			<!--<div class="col-lg-4" id="lbl_mem_verify">
																				<p class="btn btn-sm btn-outline btn-outline-solid btn-outline-warning btn-active-light-primary me-2" data-bs-toggle="modal" data-bs-target="#kt_modal_verify_membership_card" id="btn_verify_popup" name="btn_verify_popup" >Verify</p>
																			</div>-->
																		<!-- </div> -->
																		<!-- select * from LOANS where RELATION !='' and RELATION is not null and RELATION not in ('NIL','NL','NILL')
select * from LOANS where RELATION ='' or RELATION is  null or RELATION  in ('NIL','NL','NILL') -->
																		<label class="col-lg-6 col-form-label fw-semibold fs-6">Nominee
																			<input type="text" name="nom_name" id="nom_name" class="form-control form-control-lg1 form-control-solid" placeholder="Nominee Name" readonly value="<?php
																					if (is_null($loan_details->NOMINEE_ID))
																					{
																						$str= "--";
																					}
																					else
																					{
																					$nominee_details=$this->db->query("select * from NOMINEE where NOMINEE_ID=".$loan_details->NOMINEE_ID)->row();
																					if(is_null($nominee_details))
																					{
																						$str= "--";
																					}
																					else
																					{
																						$str= $nominee_details->NOMINEE_NAME;
																					}
																					}
																					echo $str;
																					?>">
																		</label>
																		<label class="col-lg-6 col-form-label fw-semibold fs-6">Relation
																			<div class="col-lg-12 fv-row fv-plugins-icon-container">
																			<input type="text" name="nom_mobile" id="nom_mobile" class="form-control form-control-lg1 form-control-solid" placeholder="Mobile No" readonly value="<?php
																					if (is_null($loan_details->NOMINEE_ID))
																					{
																						$str= "--";
																					}
																					else
																					{
																					$nominee_details=$this->db->query("select * from NOMINEE where NOMINEE_ID=".$loan_details->NOMINEE_ID)->row();
																					if(is_null($nominee_details))
																					{
																						$str= "--";
																					}
																					else
																					{
																						$str= $nominee_details->RELATION;
																					}
																					}
																					echo $str;
																					?>" >
																				<!--<select class="form-select form-select-solid fs-7" data-control="select2"  id="w_relation1" name="w_relation[]" >	
																						<option value="">Select</option>
																						<option value="Mother">Mother</option>
																						<option value="Father">Father</option>				
																						<option value="Brother">Brother</option>
																						<option value="Sister">Sister</option>
																						<option value="Wife">Wife</option>
																						<option value="Husband">Husband</option>
																						<option value="Son">Son</option>
																						<option value="Daughter">Daughter</option>
																						<option value="Father in Law">Father in Law</option>
																						<option value="Mother in Law">Mother in Law</option>
																						<option value="Son in Law">Son in Law</option>
																						<option value="Daughter in Law">Daughter in Law</option>
																						<option value="Grand Father">Grand Father</option>
																						<option value="Grand Mother">Grand Mother</option>
																						<option value="Uncle">Uncle</option>
																						<option value="Aunty">Aunty</option>
																						<option value="Others">Others</option>
																					</select>-->
																			</div>
																		</label>
																	</div>
																</div>
																<div class="col-lg-6">
																	<div class="row">
																		<label class="col-lg-12 col-form-label fw-bold fs-6" name="" id="">
																			<i class="fa fa-user fs-6" aria-hidden="true" title="Last Name"></i>&emsp;<span name="last_name" id="last_name"><?php 
																					echo $party_address->LASTNAME_PREFIX.", ".$party_address->FATHERSNAME;
																				?>  </span></label>
																		<label class="col-lg-12 col-form-label fw-bold fs-6" name="" id="">
																			<i class="fa-solid fa-location-dot fs-6" aria-hidden="true" title="Address"></i>
																		&emsp;<span name="address" id="address"><?php echo $party_address->ADDRESS1.", ".$party_address->ADDRESS2.", ".$party_address->CITY."."; ?></span></label> 
																		<label class="col-lg-12 col-form-label fw-bold fs-6" name="" id="">
																				<i class="fas fa-mobile-android-alt fs-6" aria-hidden="true" title="Mobile"></i>
																			&emsp;<span name="mobile" id="mobile"><?php 
																					echo $party_address->PHONE; 
																				?></span> <span data-bs-toggle="modal" data-bs-target="#kt_modal_verify_mobile_no"><!-- <i class="fas fa-square-check" data-bs-toggle="modal" data-bs-target="#kt_modal_verify_mobile_no" ></i> --><svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" 
																				 viewBox="0 0 505 505" xml:space="preserve" height=35 width=35>
																			<circle style="fill:#FFD05B;" cx="252.5" cy="252.5" r="252.5"/>
																			<path style="fill:#324A5E;" d="M316,416.7H119c-4.7,0-8.4-3.8-8.4-8.4V96.7c0-4.7,3.8-8.4,8.4-8.4h197c4.7,0,8.4,3.8,8.4,8.4v311.6
																				C324.5,412.9,320.7,416.7,316,416.7z"/>
																			<rect x="131" y="128.6" style="fill:#54C0EB;" width="173.1" height="228.6"/>
																			<path style="fill:#ACB3BA;" d="M238.8,111.8h-42.5c-2.4,0-4.3-1.9-4.3-4.3l0,0c0-2.4,1.9-4.3,4.3-4.3h42.5c2.4,0,4.3,1.9,4.3,4.3
																				l0,0C243.1,109.9,241.2,111.8,238.8,111.8z"/>
																			<circle style="fill:#2B3B4E;" cx="278.4" cy="109.3" r="9.7"/>
																			<circle style="fill:#ACB3BA;" cx="217.5" cy="385.6" r="17.4"/>
																			<path style="fill:#FF7058;" d="M372,309H220.8c-12.3,0-22.3-10-22.3-22.3v-93.6c0-12.3,10-22.3,22.3-22.3h151.3
																				c12.3,0,22.3,10,22.3,22.3v93.6C394.4,299,384.4,309,372,309z"/>
																			<path style="fill:#F1543F;" d="M387.9,302.4c-4,4.1-9.7,6.6-15.9,6.6H220.8c-6.2,0-11.9-2.6-15.9-6.6l62.5-62.5l29-29l29,29
																				L387.9,302.4z"/>
																			<path style="fill:#E6E9EE;" d="M387.9,177.4l-62.5,62.5l-13.2,13.2c-8.7,8.7-22.9,8.7-31.7,0l-13.2-13.2l-62.5-62.5
																				c4-4.1,9.7-6.6,15.9-6.6h151.2C378.2,170.8,383.9,173.3,387.9,177.4z"/>
																			</svg></span></label>
																		<label class="col-lg-7 col-form-label fw-semibold fs-6">Mobile<input type="text" name="nom_mobile" id="nom_mobile" class="form-control form-control-lg1 form-control-solid" placeholder="Mobile No" readonly value="<?php
																					if (is_null($loan_details->NOMINEE_ID))
																					{
																						$str= "--";
																					}
																					else
																					{
																					$nominee_details=$this->db->query("select * from NOMINEE where NOMINEE_ID=".$loan_details->NOMINEE_ID)->row();
																					if(is_null($nominee_details))
																					{
																						$str= "--";
																					}
																					else
																					{
																						$str= $nominee_details->MOBILE_NO;
																					}
																					}
																					echo $str;
																					?>" ></label>
																		<label class="col-lg-5 col-form-label fw-bold fs-6" >
																		<span><i class="fa-solid fa-star fs-6" style="<?php 
																				if($party_address->RATING == 3){echo 'color:#50cd89;';}
																				else if($party_address->RATING == 2){echo 'color:#ffc700;';}
																				else if($party_address->RATING == 1){echo 'color:red;';}
																				else{echo 'color:#d2d4dc;';}
																				 ?>"></i></span>&nbsp;<?php 
																				if($party_address->RATING == 3){echo 'Good';}
																				else if($party_address->RATING == 2){echo 'Average';}
																				else if($party_address->RATING == 1){echo 'Bad';}
																				else{echo '-';}
																				 ?>
																			
																		</label>
																	</div>
																</div>
															</div>
															<div class="row mt-4 mb-4">
																<div class="col-lg-4 fv-row">
																	<div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url(assets/media/svg/avatars/blank.svg)" id="party_photo" name="party_photo">
																		<!--<div class="image-input-wrapper"  style="background-image: url(<?php echo base_url();?>assets/images/party.jpg)"></div>-->
																		<?php
																						if($party_address->PHOTO!='')
																				         {
																				         $div='<img src="data:image/jpg;charset=utf8;base64,'.base64_encode($party_address->PHOTO).'"  height="125px" width="125px">';
																				         }
																				         else
																				         {
																				          $div='<img src="'.base_url().'assets/images/party.jpg" height="125px" width="125px" >';
																				         }
																				         echo $div;
																						?>
																	</div>
																</div>
																<div class="col-lg-4 fv-row">
																	<div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url(assets/media/svg/avatars/aadhaar_blank.png)" id="id_photo" name="id_photo">
																		<!--<div class="image-input-wrapper"  style="background-image: url(<?php echo base_url();?>assets/images/party_proof.jpg)"></div>-->
																		<?php
																						if($party_address->OTHER_PHOTO!='')
																				         {
																				         $div='<img src="data:image/jpg;charset=utf8;base64,'.base64_encode($party_address->OTHER_PHOTO).'"  height="125px" width="125px">';
																				         }
																				         else
																				         {
																				          $div='<img src="'.base_url().'assets/images/Party_Proof.jpg" height="125px" width="125px" >';
																				         }
																				         echo $div;
																						?>
																	</div>
																</div>
																<div class="col-lg-4 fv-row">
																	<div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url(assets/media/svg/avatars/signature_blank.png)">
																		<div class="image-input-wrapper"  style="background-image: url(<?php echo base_url();?>assets/images/signature.jpg)"></div>

																	</div>
																</div>
															</div>
														</div>
													</div>

													<div class="col-lg-6">
														
														<div class="px-4" style="border-radius: 10px;padding-bottom: 10px;box-shadow: 0 5px 10px #00002947;">
															<label class="col-lg-12 col-form-label fw-bold fs-5 text-center">Loan Information</label>
															<div class="row">
																<label class="col-lg-2 col-form-label fw-semibold fs-6">Company</label>
																<div class="col-lg-10 fv-row fv-plugins-icon-container">
																	<!--<select class="form-select form-select-solid" data-control="select2" data-hide-search="true" id="company" name="company">	
																		<option value="">Select Company</option>
																		<?php foreach($company_list as $clist) {?>
																		<option value="<?php echo $clist['COMPANYCODE']?>" <?php echo ($clist['COMPANYCODE']==$_SESSION['COMPANYCODE'])?'selected':''; ?>><?php echo $clist['COMPANYNAME'];?></option>
																		<?php }?>
																	</select>-->
																	<label class="col-form-label fw-bold fs-6"><?php
																						if(isset($loan_details->COMPANYCODE))
																						{
																						$comp=$this->db->query("select * from COMPANY WHERE COMPANYCODE='".$loan_details->COMPANYCODE."'")->row();
																						echo $comp->COMPANYNAME;
																						}
																						else
																							{
																								echo $loan_details->COMPANYCODE;
																							}
																						?> </label>
																	
																</div>
																<div class="col-lg-8">
																<div class="row">
																		<label class="col-lg-3 col-form-label fw-semibold fs-6">Loan No</label>
																		<div class="col-lg-8 fv-row">
																			<div class="d-flex align-items-center">
																				
																				<!--<input class="form-control  " name="" placeholder="Date" id="kt_datepicker_new_loan_date11" value=" <?php echo date_format(date_create($loan_details->ENDATE),'d-m-Y'); ?>" readonly/>-->
																				<span class="col-lg-6 col-form-label fw-bold fs-6" ><?php echo $loan_details->BILLNO; ?></span>
																			</div>
																		</div>
																	</div>	
																	<div class="row">
																		<label class="col-lg-3 col-form-label fw-semibold fs-6">MRI Loan No</label>
																		<div class="col-lg-8 fv-row">
																			<div class="d-flex align-items-center">
																				
																				<!--<input class="form-control  " name="" placeholder="Date" id="kt_datepicker_new_loan_date11" value=" <?php echo date_format(date_create($loan_details->ENDATE),'d-m-Y'); ?>" readonly/>-->
																				<span class="col-lg-6 col-form-label fw-bold fs-6" ><?php echo $loan_details->BILLNO; ?></span>
																			</div>
																		</div>
																	</div>	
																<!--<div class="row">
																		<label class="col-lg-3 col-form-label fw-semibold fs-6">Loan Date</label>
																		<div class="col-lg-8 fv-row">
																			<div class="d-flex align-items-center">
																				
																				<input class="form-control" name="" placeholder="Date" id="kt_datepicker_new_loan_date11" value=" <?php echo date_format(date_create($loan_details->ENDATE),'d-m-Y'); ?>" readonly/>
																				<span class="col-lg-6 col-form-label fw-bold fs-6" name="expiry_dt" id="expiry_dt"><?php echo date_format(date_create($loan_details->ENDATE),'d-m-Y'); ?></span>
																			</div>
																		</div>
																	</div>-->
																	<!--<div class="row">
																		<label class="col-lg-3 col-form-label fw-semibold fs-6">JewelType</label>
																		<div class="col-lg-8 fv-row fv-plugins-icon-container">
																			<select class="form-select form-select-solid" name="jewel_type" id="jewel_type" data-control="select2" data-hide-search="true">
																		
																				<?php 
																				$jeweltype=$this->db->query("select * from jewel_type")->result_array();
																				foreach ($jeweltype as $jtlist) {
																					?>
																					<option value="<?php echo $jtlist['jewel_type_id']; ?>"> <?php echo $jtlist['jewel_type']; ?> </option>
																				<?php
																				}
																				?>

																			</select>
																		</div>
																	</div>-->
																	<!--<div class="row">
																		<label class="col-lg-3 col-form-label fw-semibold fs-6">Scheme</label>
																		<div class="col-lg-8 fv-row fv-plugins-icon-container">
																			<select class="form-select form-select-solid" name="int_grp" id="int_grp" data-control="select2" data-hide-search="true" onchange="loan_interest()">	
																				<option value="">Select</option>
																				<?php 
																				foreach ($int_grp_list as $ilist) {
																				?>
																				<option value="<?php echo $ilist['INT_GROUP'];?>"><?php echo $ilist['INT_GROUP'];?></option>
																				<?php
																				}
																				?>
																				
																				
																			</select>
																		</div>
																	</div>-->
																	<div class="row">
																		<label class="col-lg-3 col-form-label fw-semibold fs-6">Int Type</label>
																		<div class="col-lg-8 fv-row fv-plugins-icon-container">
																		<label class="col-form-label fw-bold fs-6"><?php echo $loan_details->INTERESTTYPE; ?></label>
																		
																		<!--	<select class="form-select form-select-solid" name="int_type" id="int_type" data-control="select2" data-hide-search="true" onchange="get_int_due_details()">	
																				<option value="">Select</option>
																				
																			</select>-->
																		</div>
																	</div>
																	<div class="row">
																		<label class="col-lg-3 col-form-label fw-semibold fs-6">CCL No</label>
																		<div class="col-lg-8 fv-row fv-plugins-icon-container">
																		<label class="col-form-label fw-bold fs-6"><?php echo $loan_details->INTERESTTYPE; ?></label>
																		</div>
																	</div>
																	<div class="row">
																		<label class="col-lg-4 col-form-label fw-semibold fs-6">Expiry Date</label>
																		<span class="col-lg-6 col-form-label fw-bold fs-6" name="expiry_dt" id="expiry_dt"><?php echo date_format(date_create($loan_details->ENDATE),'d-m-Y'); ?></span>
																	</div>
																</div>
																<!-- <div class="col-lg-4">
																	<div class="row mt-4">
																		<div class="col-lg-8 fv-row">
																			
																			<div class="image-input 
																			image-input-outline" data-kt-image-input="true" style="background-image: url(<?php echo base_url(); ?>assets/images/Jewel.jpg)">
																					
																					<div class="image-input-wrapper  w-150px h-150px"  style="background-image: url(<?php echo base_url(); ?>assets/images/Jewel.jpg)" id="my_camera"></div>
																					
																					<label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" data-kt-initialized="1" onclick="take_loan_jewel();">
																						<i class="bi bi-pencil-fill fs-10" onclick="take_loan_jewel();"></i>
																						
																					</label>
																					
																					<span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" data-kt-initialized="1">
																						<i class="bi bi-x fs-6"></i>
																					</span>
																					
																					<span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" data-kt-initialized="1">
																						<i class="bi bi-x fs-6"></i>
																					</span>
																					
																					<div id="results" class="image-input-wrapper w-125px h-125px" style="display: none;" onclick="loan_jewel_snapshot();">Your captured image will appear here...</div>
																					<textarea hidden="hidden" id="loan_jewel_photo_data" name="loan_jewel_photo_data"></textarea>
																			</div>
																			
																		</div>
																	</div>
																</div> -->
																<div class="col-lg-4">
																	<div class="row mt-4">
																		<div class="col-lg-8 fv-row">
																			<!--begin::Image input-->
																			<div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url(<?php echo base_url();?>assets/media/svg/avatars/jewel_blank.png)" id="get_capture_sel_image">
																					<!--begin::Preview existing avatar-->
																					<div class="image-input-wrapper  w-150px h-150px" style="background-image: url(<?php echo base_url();?>assets/images/jewel.jpg)" id="load_image_selected"></div>
																					<!--end::Preview existing avatar-->
																					<!--begin::Label-->
																					
																						<!-- <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px py-1 fs-6" data-kt-menu="true" style="">
																							<div class="menu-item px-3">
																								<a href="#" class="menu-link px-3">Upload File</a>
																							</div>
																							<div class="menu-item px-3">
																								<a href="#" class="menu-link flex-stack px-3" data-bs-toggle="modal" data-bs-target="#kt_modal_camera">Camera</a>
																							</div>
																						</div> -->
																						<!-- <i class="bi bi-pencil-fill fs-10"></i> -->
																						<!--begin::Inputs-->
																					
																						<!--end::Inputs-->
																					</label>
																					<!--end::Label-->
																					<!--begin::Cancel-->
																					
																					<!--end::Cancel-->
																					<!--begin::Remove-->
																					
																					<!--end::Remove-->
																			</div>
																			<!--end::Image input-->
																		</div>
																		<textarea hidden="hidden" name="loan_jewel_image_data" id="loan_jewel_image_data"></textarea>
																	</div>
																</div>
															</div>
															<!--<div class="row">
																<label class="col-lg-12 fw-bold fs-5 text-center">Interest Variation Details</label>
																<label class="col-lg-12 fw-bold fs-6 text-center mt-4">
																	<span style="background-color:#1ecbe1;border-radius: 8px;padding: 5px 10px 5px 10px;" id="m1_ex_dt">dd-mm-yy</span>
																	<span style="background-color:#ffb300;border-radius: 8px;padding: 5px 10px 5px 10px;" id="int1">0.00</span>&emsp;
																	<span style="background-color:#1ecbe1;border-radius: 8px;padding: 5px 10px 5px 10px;" id="m2_ex_dt">dd-mm-yy</span>
																	<span style="background-color:#ffb300;border-radius: 8px;padding: 5px 10px 5px 10px;" id="int2">0.00</span>&emsp;
																	<span style="background-color:#1ecbe1;border-radius: 8px;padding: 5px 10px 5px 10px;" id="m3_ex_dt">dd-mm-yy</span>
																	<span style="background-color:#ffb300;border-radius: 8px;padding: 5px 10px 5px 10px;" id="int3">0.00</span>
																</label>
															</div>-->
															<br>
														</div>
													</div>
												</div>
												<input type="hidden" name="bill_no" id="bill_no" value="0">
												<div class="px-4" style="border-radius: 10px;padding-bottom: 17px;box-shadow: 0 5px 10px #00002947;">
													<div class="row mt-2">
														<label class="col-lg-12 col-form-label fw-bold fs-5 text-center">Pledge Details</label>
														<!--begin::Col-->
														
														
														
													</div>
													<table class="table table-striped table-hover table-row-bordered fs-7 gy-1 gs-2" id="kt_datatable_dom_positioning_add_loan">
														<thead>
															<tr class="fw-semibold fs-7 text-gray-800">
													            <th class="min-w-150px">Pledge</th>
													            <th class="min-w-100px">Description</th>
													            <th class="min-w-40px">Quality</th>
													            <th class="min-w-40px">Purity%</th>
													            <th class="min-w-80px">Weight(gms)</th>
													            <th class="min-w-80px">Stone Wgt(gms)</th>
													            <th class="min-w-80px">Less(gms)</th>
													            <th class="min-w-80px">Nt Wgt(gms)</th>
													            <th class="min-w-50px">Damage</th>
													            <th class="min-w-50px">Img</th>
													            <!--<th class="min-w-100px">Action</th>-->
													            <!-- <th class="min-w-80px">Status</th>
													            <th class="min-w-100px">RP.No</th>
													            <th class="min-w-100px">Bank</th> -->
															</tr>
														</thead>
														<tbody id="tbody">
														<?php
															$pl_info=$this->db->query("select * from PLEDGEINFO where BILLNO='".$loan_details->BILLNO."'")->result_array();
														foreach ($pl_info as $plist){?>
																								<tr>
																						            <td><?php echo $plist['PLEDGENAME']; ?> </td>
																						            <td><?php echo $plist['DESCRIPTION']; ?></td>
																						            <td><?php echo $plist['PURITY']; ?></td>
																						            <td><?php echo $plist['PURITY']; ?></td>
																						            <td><?php echo $plist['WEIGHT']; ?></td>
																						            <td><?php echo $plist['STONEWEIGHT'];  ?></td>
																						            <td><?php echo $plist['LESS'];  ?></td>
																						            <td><?php echo $plist['NETWEIGHT']; ?></td>
																						            <td><?php echo ($plist['IS_DAMAGE']=='Y')?'Yes':'No';  ?></td>
																						            <td>
																						            	<div class="image-input mt-2 me-6" data-kt-image-input="true">
																											<div class="image-input-wrapper w-40px h-40px"style="background-image: url(assets/images/jewel.jpg)"></div>
																											<!--end::Preview existing avatar-->
																										</div>
																						            </td>
																						        </tr>
																						    <?php } ?>													   		
													    </tbody>
													</table>
													<br>
													<div class="row">
														<label class="col-lg-1 col-form-label fw-semibold fs-6">Weight</label>
														<label class="col-lg-1 col-form-label fw-bold fs-6" id="tot_pl_weight"><?php echo $loan_details->WEIGHT; ?></label>
														<label class="col-lg-1 col-form-label fw-semibold fs-6">Stoneless</label>
														<label class="col-lg-1 col-form-label fw-bold fs-6" id="tot_stone_weight"><?php echo $loan_details->STONELESS; ?></label>
														<label class="col-lg-1 col-form-label fw-semibold fs-6">Less</label>
														<label class="col-lg-1 col-form-label fw-bold fs-6" id="tot_less_weight"><?php echo $loan_details->LESS; ?></label>
														<label class="col-lg-1 col-form-label fw-semibold fs-6" >Net.Wght</label>
														<label class="col-lg-1 col-form-label fw-bold fs-6" id="tot_net_weight"><?php echo $loan_details->NETWEIGHT; ?></label>
														 <!--<label class="col-lg-1 col-form-label fw-semibold fs-6">CurrRate</label>--><label class="col-lg-1 col-form-label fw-semibold fs-6">CurrRate</label>
														<label class="col-lg-1 col-form-label fw-bold fs-6">
															<?php 
															$cur_rate=$this->db->query("select * from general_settings")->row();
															echo number_format($cur_rate->gold_rate,2);
															 ?>
															 <input type="hidden" name="current_rate" id="current_rate" value="<?php echo $loan_details->CURRENTRATE; //echo $cur_rate->gold_rate; ?>">
														</label>
														<label class="col-lg-1 col-form-label fw-semibold fs-6">Purity%</label>
														<label class="col-lg-1 col-form-label fw-bold fs-7" id="total_purity_percent"><?php echo $loan_details->QUALITY;  ?></label>
														<div class="col-lg-1 fv-row fv-plugins-icon-container">
															
															<input type="hidden" name="add_qual_new_loan" id="add_qual_new_loan" class="form-control form-control-lg1 form-control-solid" placeholder="Quality" onkeyup ="ple_calculation();" onfocus="ple_calculation();" readonly>
															<div class="fv-plugins-message-container invalid-feedback"></div>
														</div>
													</div>
													<div class="row">
														<label class="col-lg-1 col-form-label fw-semibold fs-6">Gram.Val</label>
														<label class="col-lg-1 col-form-label fw-bold fs-6" id="grm_val"><?php echo $loan_details->PERGRAMVALUE;  ?>
															<input type="hidden" name="grm_val_hidden" id="grm_val_hidden">
														</label>
														<label class="col-lg-1 col-form-label fw-semibold fs-6" >SalesRate</label>
														<label class="col-lg-1 col-form-label fw-bold fs-6"  id="sale_rate"><?php echo $loan_details->TOTALSALESRATE;  ?><input type="hidden" name="sale_rate_hidden" id="sale_rate_hidden"></label>
														<!--<label class="col-lg-1 col-form-label fw-semibold fs-6" style="color: #1a21e3 !important;font-weight: 600 !important;" >H/L Bal</label>
														<label class="col-lg-1 col-form-label fw-bold fs-5" style="color: #1a21e3 !important;font-weight: 600 !important;" id="hl_bal">0.00</label>
														<div class="btn btn-icon btn-active-light-primary w-30px h-30px w-md-40px h-md-40px" id="kt_activities_toggle" data-bs-toggle="modal" data-bs-target="#kt_modal_loan_calculator_calc">
															<i class="bi bi-calculator" style="font-size: 1.5rem !important;"></i>
														</div>-->
													</div>
												</div>
												<div class="row mt-4">
													<div class="col-lg-4">
														<div class="px-4" style="border-radius: 10px;padding-bottom: 10px;box-shadow: 0 5px 10px #00002947;">
															<label class="col-lg-12 col-form-label fw-bold fs-5 text-center">Loan Payment Information</label>
															<div class="row">
																<!--begin::Label-->
																<label class="col-lg-6 col-form-label required fw-semibold fs-6">Loan Amount</label>
																<!--end::Label-->
																<!--begin::Col-->
																<div class="col-lg-6 fv-row fv-plugins-icon-container">
																	<!--<input type="text" name="loan_amount" id="loan_amount" class="form-control form-control-lg1 form-control-solid" style="font-size: 18px !important;font-weight: 700 !important;color: #1B439E !important;" onkeyup="calc_interest();">-->
																	<span class="col-lg-6 col-form-label fw-bold fs-6" ><?php echo $loan_details->AMOUNT;?></span>

																	<div class="fv-plugins-message-container invalid-feedback"></div>
																</div>
																<!--end::Col-->
															</div>
															<div class="row">
																<!--begin::Label-->
																<label class="col-lg-6 col-form-label fw-semibold fs-6">Monthly Interest</label>
																<label class="col-lg-6 col-form-label fw-bold fs-5"><span  id="monthly_interest"><?php 
																								$int_amt=($loan_details->AMOUNT*$loan_details->INTEREST*$loan_details->MONTHS)/100;
																								echo number_format($int_amt,2);
																								?></span></label>
															</div>
															<div class="row">
																<!--begin::Label-->
																<label class="col-lg-6 col-form-label required fw-semibold fs-6">Redemption period</label>
																<!--end::Label-->
																<!--begin::Col-->
																<div class="col-lg-3 fv-row fv-plugins-icon-container">
																	<!--<input type="text" name="redemption_period" id="redemption_period" class="form-control form-control-lg1 form-control-solid" value="">-->
																	<span class="col-lg-6 col-form fw-bold fs-6" ><?php echo (isset($loan_details->REDEMPTION_PERIOD))?$loan_details->REDEMPTION_PERIOD:'0'; ?>
</span>

																	<div class="fv-plugins-message-container invalid-feedback"></div>
																</div>
																<!--end::Col-->
																<label class="col-lg-3 col-form-label fw-semibold fs-6" id="loan_per_mon_days">Days</label>
															</div>
															<!--<div class="row">
																<label class="col-lg-6 col-form-label fw-semibold fs-6">M.Points Add</label>
																<div class="col-lg-3 fv-row fv-plugins-icon-container">
																	<input type="text" name="m_points_ad" id="m_points_ad" class="form-control form-control-lg1 form-control-solid" value="0" readonly>
																	<div class="fv-plugins-message-container invalid-feedback"></div>
																</div>
															</div>
															<div class="row">
																<label class="col-lg-6 col-form-label fw-semibold fs-6">Customer Rating</label>
																<div class="col-lg-6 fv-row fv-plugins-icon-container">
																	<select class="form-select form-select-solid" data-control="select2" data-hide-search="true" name="cust_rating" id="cust_rating" onchange="set_customer_rating()">
																		<option value="3">Good</option>
																		<option value="2">Average</option>
																		<option value="1">Bad</option>
																	</select>
																</div>
															</div>-->
															<br><br>
															<div class="row mt-3 mb-1">
																<div class="d-flex justify-content-center align-items-center">
																	<label class="col-form-label fw-bold fs-3 mt-10">Total Loan Amount &emsp; <span id="span_loan_amount">0.00</span></label>
																</div>
															</div>
														</div>
													</div>
													<div class="col-lg-4">
														<div class="px-4" style="border-radius: 10px;padding-bottom: 15px;box-shadow: 0 5px 10px #00002947;">
															<label class="col-lg-12 col-form-label fw-bold fs-5 text-center">Payment To Receive</label>
															<div class="row">
																<!--begin::Label-->
																<label class="col-lg-6 col-form-label fw-semibold fs-6">MRI Interest paid by customer</label>
																<!--end::Label-->
																<!--begin::Col-->
																<div class="col-lg-6 fv-row fv-plugins-icon-container">
																	<input type="text" name="processing_charge" id="processing_charge" class="form-control form-control-lg1 form-control-solid" placeholder="Processing Charge" value="0" onkeyup="calc_charges();" >
																	<div class="fv-plugins-message-container invalid-feedback"></div>
																</div>
																<!--end::Col-->
															</div>
															<div class="row">
																<!--begin::Label-->
																<label class="col-lg-6 col-form-label fw-semibold fs-6">Renew Extra Payment to customer</label>
																<!--end::Label-->
																<!--begin::Col-->
																<div class="col-lg-6 fv-row fv-plugins-icon-container">
																	<input type="text" name="processing_charge" id="processing_charge" class="form-control form-control-lg1 form-control-solid" placeholder="Processing Charge" value="0" onkeyup="calc_charges();" >
																	<div class="fv-plugins-message-container invalid-feedback"></div>
																</div>
																<!--end::Col-->
															</div>
															
															
															
															
															<div id="div_on_account_pay" style="display: none;">
																<div class="row" >
																	<!--begin::Label-->
																	<label class="col-lg-6 col-form-label fw-semibold fs-6">Deduct From</label>
																	<div class="col-lg-6">
																		<label class="form-check form-check-inline form-check-solid is-invalid mb-1">
																			<input class="form-check-input" name="on_acc_loan_pay" type="checkbox" value="checked" id="on_acc_loan_pay" onclick="txt_show_hide()">
																			<span class="col-form-label fw-semibold fs-6">Loan Amt</span>
																		</label>
																		<label class="form-check form-check-inline form-check-solid is-invalid">
																			<input class="form-check-input" name="on_acc_pay_separate" type="checkbox" value="checked" id="on_acc_pay_separate" onclick="txt_show_hide()">
																			<span class="col-form-label fw-semibold fs-6">Pay Separate</span>
																		</label>
																	</div>

																</div>
																<div class="row">
																	<label class="col-lg-3 col-form-label fw-semibold fs-6" id="lbl_on_acc_loan_pay_amt" style="display: none"> From loan</label>
																	<div class="col-lg-3 fv-row fv-plugins-icon-container">
																		<input type="text" name="on_acc_loan_pay_amt" id="on_acc_loan_pay_amt" class="form-control form-control-lg1 form-control-solid" value="0" style="display: none;" onkeyup="check_on_acc_less_than_total()">
																		<div class="fv-plugins-message-container invalid-feedback"></div>
																	</div>
																	<label class="col-lg-3 col-form-label fw-semibold fs-6" id="lbl_on_acc_pay_separate_amt" style="display: none">Pay Sep</label>
																	<div class="col-lg-3 fv-row fv-plugins-icon-container">
																		<input type="text" name="on_acc_pay_separate_amt" id="on_acc_pay_separate_amt" class="form-control form-control-lg1 form-control-solid" value="0" style="display: none;" onkeyup="check_on_acc_less_than_total()">
																		<div class="fv-plugins-message-container invalid-feedback"></div>
																	</div>
																</div>
															</div><br>
															<!--<div class="row mt-4">
																<label class="col-lg-6 col-form-label fw-bold fs-3 text-center">Total &emsp; <span id="final_charges">0.00</span></label>
																
																<div class="col-lg-6 d-flex justify-content-end">
																	<p class="btn btn-sm btn-outline btn-outline-solid btn-outline-warning btn-active-light-primary me-2" data-bs-toggle="modal" data-bs-target="#kt_modal_payment_to_receive" id="btn_receive_payment">Receive</p>
																</div>
															</div>-->
														</div>
													</div>
													<div class="col-lg-4">
														<div class="px-4" style="border-radius: 10px;box-shadow: 0 5px 10px #00002947;">
															<label class="col-lg-12 col-form-label fw-bold fs-5 text-center">To Pay</label>
															<!--<div class="row">
																<label class="col-lg-4 col-form-label fw-bold fs-3">Net Pay</label>
																<label class="col-lg-4 col-form-label fw-bold fs-3" id=
																"span_net_pay">0.00</label>
																<div class="col-lg-4">
																	<p class="btn btn-sm btn-outline btn-outline-solid btn-outline-warning btn-active-light-primary me-2" data-bs-toggle="modal" data-bs-target="#kt_modal_view_payment" id="btn_pay_now">Pay Now</p>
																</div>
															</div>-->
															<div class="row">
																<label class="col-lg-4 col-form-label fw-semibold fs-6">Remarks</label>
															</div>
															<div class="row">
																<div class="col-lg-12 fv-row fv-plugins-icon-container">
																	<textarea class="form-control form-select-solid fw-semibold fs-5" rows="11" id=""></textarea>
																	<div class="fv-plugins-message-container invalid-feedback"></div>
																</div>
															</div>
														</div>
													</div>
												</div><br>
												<div class="row">
													<div class="d-flex align-items-center">
														<label class="form-check form-check-inline form-check-solid me-5 is-invalid">
															<input class="form-check-input" name="check_send_loan" type="checkbox"  id="check_send_loan" onclick="sanction_loan();">
														</label>
														<span class="col-form-label fw-bold fs-4">I am promising that, I will be the responsible for any miscounting of money and fakeness of the jewel of this particular loan. I have properly checked all the jewels and its seal, Then submitting this application to sanction the loan for the Customer</span>
													</div>
												</div>
												<div class="d-flex justify-content-end">
													<button type="reset" class="btn btn-secondary me-2" data-bs-dismiss="modal">Cancel</button>
													<!-- <a href="" class="btn btn-primary" data-bs-toggle="modal" id="save_changes_add_new_loan"  data-bs-target="#kt_modal_view_loan_no" style="display: none;" onclick="loan_validation();">Send to Sanction</a> -->
													<div type="submit" data-bs-toggle="modal" data-bs-target="#kt_modal_view_loan_no" class="btn btn-primary" id="save_changes_add_new_loan" style="display: none;">Send to Sanction</div>
												</div>
										  	</div>
											<!--end::Card body-->
										</form>
									</div>
									<!--end::Tables Widget 9-->
								</div>
								<!--end::Col-->
							</div>
							<!--end::Row-->
						</div>
						<!--end::Container-->
					</div>
					<!--end::Content-->
				<?php $this->load->view("footer");?>
				</div>
				<!--end::Wrapper-->
			</div>
			<!--end::Page-->
		</div>
		<!--end::Root-->
		<!--begin::Modal - Loan Calculator-->
		<div class="modal fade" id="kt_modal_loan_calculator_calc" tabindex="-1" aria-hidden="true">
			<!--begin::Modal dialog-->
			<div class="modal-dialog modal-xl">
				<!--begin::Modal content-->
				<div class="modal-content rounded">
					
					<div class="modal-header justify-content-end border-0 pb-0">
						<!--begin::Close-->
						<div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
							<!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
							<span class="svg-icon svg-icon-1">
								<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
									<rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="currentColor"></rect>
									<rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="currentColor"></rect>
								</svg>
							</span>
							<!--end::Svg Icon-->
						</div>
						<!--end::Close-->
					</div>
					<!--begin::Heading-->
					<div class="modal-body pt-0 pb-15 px-5 px-xl-20">
						<div class="mb-3 text-center">
							<h1 class="mb-3">Loan Calculator</h1>
						</div>
						<!--end::Heading-->	
						<div class="row mb-6">
							<div class="col-lg-3">
								<label class="col-form-label required fw-semibold fs-6">Weight</label>
								<div class=" fv-row fv-plugins-icon-container">
									<input type="text" name="weight" id="weight" class="form-control form-control-lg form-control-solid" placeholder="(in Gms)" onkeyup="calculate()" value="0">
									<div class="fv-plugins-message-container invalid-feedback" id="weight_err" name="weight_err"></div>
								</div>
							</div>
							<div class="col-lg-3">
								<label class=" col-form-label required fw-semibold fs-6">Stone Less</label>
								<div class=" fv-row fv-plugins-icon-container">
									<input type="text" name="stone_less" id="stone_less" class="form-control form-control-lg form-control-solid" placeholder="(in Gms)" onkeyup="calculate()" value="0">
									<div class="fv-plugins-message-container invalid-feedback" id="stone_less_err" name="stone_less_err"></div>
								</div>
							</div>
							<div class="col-lg-3">
								<label class=" col-form-label required fw-semibold fs-6">Less</label>
								<div class=" fv-row fv-plugins-icon-container">
									<input type="text" name="less" id="less" class="form-control form-control-lg form-control-solid" placeholder="(in Gms)" onkeyup="calculate()" value="0">
									<div class="fv-plugins-message-container invalid-feedback" id="less_err" name="less_err"></div>
								</div>
							</div>
							<div class="col-lg-3">
								<label class=" col-form-label required fw-semibold fs-6">Net Weight</label>
								<div class=" fv-row fv-plugins-icon-container">
									<input type="text" name="net_wt" id="net_wt" class="form-control form-control-lg form-control-solid" placeholder="(in Gms)" readonly value="0">
									<div class="fv-plugins-message-container invalid-feedback" id="net_wt_err" name="net_wt_err"></div>
								</div>
							</div>
							<div class="col-lg-3">
								<label class=" col-form-label required fw-semibold fs-6">Cur. Rate</label>
								<div class=" fv-row fv-plugins-icon-container">
									<input type="text" name="cur_rate" id="cur_rate" class="form-control form-control-lg form-control-solid" placeholder="(in Rs)" onkeyup="calculate1()" value="0">
									<div class="fv-plugins-message-container invalid-feedback" id="cur_rate_err" name="cur_rate_err"></div>
								</div>
							</div>
							<div class="col-lg-3">
								<label class="col-form-label required fw-semibold fs-6">Quality %</label>
								<div class=" fv-row fv-plugins-icon-container">
									<input type="text" name="quality" id="quality" class="form-control form-control-lg form-control-solid" placeholder="(in %)" onkeyup="calculate1()" value="0">
									<div class="fv-plugins-message-container invalid-feedback" id="quality_err" name="quality_err"></div>
								</div>
							</div>
							<div class="col-lg-3">
								<label class=" col-form-label required fw-semibold fs-6">Gram Value</label>
								<div class=" fv-row fv-plugins-icon-container">
									<input type="text" name="grm_value" id="grm_value" class="form-control form-control-lg form-control-solid" placeholder="(in Rs)"  value="0">
									<div class="fv-plugins-message-container invalid-feedback" id="grm_value_err" name="grm_value_err"></div>
								</div>
							</div>
							<div class="col-lg-3">
								<label class=" col-form-label required fw-semibold fs-6">Sales Rate</label>
								<div class=" fv-row fv-plugins-icon-container">
									<input type="text" name="sales_rate" id="sales_rate" class="form-control form-control-lg form-control-solid" placeholder="(in Rs)"  value="0">
									<div class="fv-plugins-message-container invalid-feedback" id="sales_rate_err" name="sales_rate_err"></div>
								</div>
							</div>
							<!-- <div class="col-lg-3"></div>
							<div class="col-lg-3"></div>
							<div class="col-lg-3"></div> -->
							<!-- <div class="col-lg-3" style="float: right;"> -->
								<!-- <button type="button" class="btn btn-primary" onclick="calc_validation();"> -->
											
											<!--end::Svg Icon--><!-- Calculate</button></div> -->

						</div>

						<div class="row mb-6">
							<table>
								<thead>
									<tr>
										<th> </th>
										<th>%</th>
										<th>Per Gram</th>
										<th>Value</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td><b>50 Days </b></td>
										<td>95</td>
										<td><span id="pg_95"></span></td>
										<td><span id="val_95"></span></td>
									</tr>
									<tr>
										<td><b>2.5 NP </b></td>
										<td>90</td>
										<td><span id="pg_90"></span></td>
										<td><span id="val_90"></td>
									</tr>
									<tr>
										<td><b>2 NP </b></td>
										<td>80</td>
										<td><span id="pg_80"></span></td>
										<td><span id="val_80"></td>
									</tr>
									<tr>
										<td><b>1.5 NP </b></td>
										<td>70</td>
										<td><span id="pg_70"></span></td>
										<td><span id="val_70"></td>
									</tr>
									<tr>
										<td><b>1 NP </b></td>
										<td>60</td>
										<td><span id="pg_60"></span></td>
										<td><span id="val_60"></td>
									</tr>
									
								</tbody>
							</table>
						</div>
						<div class="d-flex justify-content-end mt-6 px-9">
										<button type="reset" class="btn btn-secondary me-3" data-bs-dismiss="modal">Cancel</button>
										<button class="btn btn-primary" onclick="pay_to_party();" id="btn_pay">Pay</button>
									</div>
					</div>
				</div>
				<!--end::Modal content-->
			</div>
			<!--end::Modal dialog-->
		</div>
		<!--end::Modal - Loan Calculator-->
		<!--begin::Modal - view payment -->
		<div class="modal fade" id="kt_modal_view_payment" tabindex="-1" aria-hidden="true">
			<!--begin::Modal dialog-->
			<div class="modal-dialog modal-xl">
				<!--begin::Modal content-->
				<div class="modal-content rounded">
					<!--begin::Modal header-->
					<div class="modal-header justify-content-end border-0 pb-0">
						<!--begin::Close-->
						<div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
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
					<!-- <form method="POST" enctype="multipart/form-data" action="<?php echo base_url();?>loan/pay_to_party" > -->
						<div class="modal-body pt-0 pb-15 px-5 px-xl-20">
							<!--begin::Heading-->
							<div class="mb-13 text-center">
								<h1 class="mb-3">Payment and Transaction Details</h1>
							</div>
							<!--end::Heading-->
							<input type="hidden" name="p_bill_no" id="p_bill_no" value="">
							<input type="hidden" name="p_pid" id="p_pid" value="">
							<div class="row">
								<!-- <div style="padding: 10px 10px 10px 10px !important;box-shadow: 0 3px 6px #00002947;border-radius: 5px;background-color:#f5f5f1 !important;"> -->
									<!-- <div><label class="col-form-label fw-bold fs-6"><u>Payment Details</u></label></div> -->
									<div class="row">
										<label class="col-lg-2 col-form-label fw-bold fs-3">Net Pay</label>
										<label class="col-lg-2 col-form-label fw-bold fs-3" id="lbl_net_pay">0.00</label>
									</div>
									<div class="row">
										<div class="col-lg-2 fv-row fv-plugins-icon-container fv-plugins-bootstrap5-row-invalid">
											<div class="d-flex align-items-center mt-1">
												<label class="form-check form-check-inline form-check-solid me-5 is-invalid">
													<input class="form-check-input" name="cash_loan_paynow_add_radio" type="checkbox" value="1" id="cash_loan_paynow_add_radio" onclick="cash_ln_paynow_add_radio()">
												</label>
												<label class="col-form-label fw-semibold fs-6 me-5">Cash</label>
											</div>
										</div>
										<div class="col-lg-2 fv-row fv-plugins-icon-container fv-plugins-bootstrap5-row-invalid">
											<div class="d-flex align-items-center mt-1">
												<label class="form-check form-check-inline form-check-solid me-5 is-invalid">
													<input class="form-check-input" name="cheque_loan_paynow_add_radio" type="checkbox" value="1" id="cheque_loan_paynow_add_radio" onclick="cheque_ln_paynow_add_radio()">
												</label>
												<label class="col-form-label fw-semibold fs-6">Cheque</label>
											</div>
										</div>
										<div class="col-lg-2 fv-row fv-plugins-icon-container fv-plugins-bootstrap5-row-invalid">
											<div class="d-flex align-items-center mt-1">
												<label class="form-check form-check-inline form-check-solid me-5 is-invalid">
													<input class="form-check-input" name="rtgs_loan_paynow_add_radio" type="checkbox" value="1" id="rtgs_loan_paynow_add_radio" onclick="rtgs_ln_paynow_add_radio()">
												</label>
												<label class="col-form-label fw-semibold fs-6">RTGS</label>
											</div>
										</div>
										<div class="col-lg-2 fv-row fv-plugins-icon-container fv-plugins-bootstrap5-row-invalid">
											<div class="d-flex align-items-center mt-1">
												<label class="form-check form-check-inline form-check-solid me-5 is-invalid">
													<input class="form-check-input" name="upi_loan_paynow_add_radio" type="checkbox" value="1" id="upi_loan_paynow_add_radio" onclick="upi_ln_paynow_add_radio()">
												</label>
												<label class="col-form-label fw-semibold fs-6">UPI</label>
											</div>
										</div>
										
									</div>
									<div class="row">
										<label class="col-lg-1 col-form-label fw-semibold fs-6" id="cash_label_ln_pay" style="display:none;">Cash</label>
										<div class="col-lg-2 fv-row fv-plugins-icon-container" id="cash_label_ln_pay_tbox" style="display:none;">
											<input type="text" class="form-control form-control-lg form-control-solid" placeholder="Amount" onkeyup="pay_to_party_calc()" value="0" name="pay_to_party_cash" id="pay_to_party_cash">
											<div class="fv-plugins-message-container invalid-feedback"></div>
										</div>
										<div class="col-lg-2 fv-row fv-plugins-icon-container" id="cash_detail_ln_pay_tbox" style="display:none;">
											<textarea class="form-control form-control-solid" rows="1" placeholder="Details" name="pay_to_party_cash_details" id="pay_to_party_cash_details"></textarea>
										</div>
									</div>
									<div class="row">
										<label class="col-lg-1 col-form-label fw-semibold fs-6" id="cheque_label_ln_pay" style="display:none;">Cheque</label>
										<div class="col-lg-2 fv-row fv-plugins-icon-container"id="cheque_amt_ln_pay_tbox" style="display:none;">
											<input type="text" class="form-control form-control-lg form-control-solid" placeholder="Amount" onkeyup="pay_to_party_calc()" value="0"  name="pay_to_party_cheque_amount" id="pay_to_party_cheque_amount">
											<div class="fv-plugins-message-container invalid-feedback"></div>
										</div>
										<div class="col-lg-2 fv-row fv-plugins-icon-container" id="cheque_no_ln_pay_tbox" style="display:none;">
											<input type="text" class="form-control form-control-lg form-control-solid" placeholder="Cheque No" name="pay_to_party_cheque_ref_no" id="pay_to_party_cheque_ref_no" >
											<div class="fv-plugins-message-container invalid-feedback"></div>
										</div>
										<div class="col-lg-3 fv-row fv-plugins-icon-container" id="cheque_com_bank_ln_pay_tbox" style="display:none;">
											<select class="form-select form-select-solid" data-control="select2" data-hide-search="true"  name="pay_to_party_cheque_company_bank" id="pay_to_party_cheque_company_bank" data-placeholder="Company Bank">
												<option value="">Select</option>
												<?php
												$bnk_det=$this->db->query("select * from BANKS where ACTIVE='Y'")->result_array();
												foreach ($bnk_det as $blist) {
												?>
												<option value="<?php echo $blist['SNO'];?>"><?php echo $blist['BANKNAME'];?></option>
												<?php
												}
												?>
											</select>
										</div>
										<div class="col-lg-2 fv-row fv-plugins-icon-container" id="cheque_par_bank_ln_pay_tbox" style="display:none;">
											<select  name="pay_to_party_cheque_party_bank" id="pay_to_party_cheque_party_bank" class="form-select form-select-solid" data-control="select2" data-placeholder="Party Bank" data-hide-search="true">
												<option value="">Select</option>
												<option value="1">UPI-12546875-kumar</option>				
												<option value="2">Bank-1254867-Kumar</option>
											</select>
										</div>
										<div class="col-lg-2 fv-row fv-plugins-icon-container"  id="cheque_detail_ln_pay_tbox" style="display:none;">
											<textarea class="form-control form-control-solid" rows="1" placeholder="Details" name="pay_to_party_cheque_details" id="pay_to_party_cheque_details" ></textarea>
										</div>
									</div>
									<div class="row">
										<label class="col-lg-1 col-form-label fw-semibold fs-6" id="rtgs_label_ln_pay" style="display:none;">RTGS</label>
										<div class="col-lg-2 fv-row fv-plugins-icon-container" id="rtgs_amt_ln_pay_tbox" style="display:none;">
											<input type="text" class="form-control form-control-lg form-control-solid" placeholder="Amount" onkeyup="pay_to_party_calc()" value="0" name="pay_to_party_rtgs_amount" id="pay_to_party_rtgs_amount">
											<div class="fv-plugins-message-container invalid-feedback"></div>
										</div>
										<div class="col-lg-2 fv-row fv-plugins-icon-container" id="rtgs_ref_ln_pay_tbox" style="display:none;">
											<input type="text" name="pay_to_party_rtgs_ref_no" id="pay_to_party_rtgs_ref_no" class="form-control form-control-lg form-control-solid" placeholder="Reference No" >
											<div class="fv-plugins-message-container invalid-feedback"></div>
										</div>
										<div class="col-lg-3 fv-row fv-plugins-icon-container" id="rtgs_com_bank_ln_pay_tbox" style="display:none;">
											<select class="form-select form-select-solid" data-control="select2" name="pay_to_party_rtgs_company_bank" id="pay_to_party_rtgs_company_bank" data-placeholder="Company Bank" data-hide-search="true">
												<option value="">Select</option>
												<?php
												$bnk_det=$this->db->query("select * from BANKS where ACTIVE='Y'")->result_array();
												foreach ($bnk_det as $blist) {
												?>
												<option value="<?php echo $blist['SNO'];?>"><?php echo $blist['BANKNAME'];?></option>
												<?php
												}
												?>
											</select>
										</div>
										<div class="col-lg-2 fv-row fv-plugins-icon-container" id="rtgs_par_bank_ln_pay_tbox" style="display:none;">
											<select class="form-select form-select-solid" data-control="select2" data-placeholder="Party Bank"  name="pay_to_party_rtgs_party_bank" id="pay_to_party_rtgs_party_bank" data-hide-search="true">
												<option value="">Select</option>
												<option value="1">UPI-12546875-kumar</option>				
												<option value="2">Bank-1254867-Kumar</option>
											</select>
										</div>
										<div class="col-lg-2 fv-row fv-plugins-icon-container" id="rtgs_detail_ln_pay_tbox" style="display:none;">
											<textarea class="form-control form-control-solid" rows="1" placeholder="Details"  name="pay_to_party_rtgs_details" id="pay_to_party_rtgs_details"></textarea>
										</div>
									</div>
									<div class="row">
										<label class="col-lg-1 col-form-label fw-semibold fs-6" id="upi_label_ln_pay" style="display:none;">UPI</label>
										<div class="col-lg-2 fv-row fv-plugins-icon-container" id="upi_amt_ln_pay_tbox" style="display:none;">
											<input type="text" class="form-control form-control-lg form-control-solid" placeholder="Amount" onkeyup="pay_to_party_calc()" value="0" name="pay_to_party_upi_amount" id="pay_to_party_upi_amount" >
											<div class="fv-plugins-message-container invalid-feedback"></div>
										</div>
										<div class="col-lg-2 fv-row fv-plugins-icon-container" id="upi_ref_ln_pay_tbox" style="display:none;">
											<input type="text" class="form-control form-control-lg form-control-solid" placeholder="Reference No" name="pay_to_party_upi_ref_no" id="pay_to_party_upi_ref_no" >
											<div class="fv-plugins-message-container invalid-feedback"></div>
										</div>
										<div class="col-lg-3 fv-row fv-plugins-icon-container" id="upi_com_bank_ln_pay_tbox" style="display:none;">
											<select name="pay_to_party_upi_company_bank" id="pay_to_company_upi_party_bank" class="form-select form-select-solid" data-control="select2" data-placeholder="Company Bank" data-hide-search="true">
												<option value="">Select</option>
												<?php
												$bnk_det=$this->db->query("select * from BANKS where ACTIVE='Y'")->result_array();
												foreach ($bnk_det as $blist) {
												?>
												<option value="<?php echo $blist['SNO'];?>"><?php echo $blist['BANKNAME'];?></option>
												<?php
												}
												?>
											</select>
										</div>
										<div class="col-lg-2 fv-row fv-plugins-icon-container" id="upi_par_bank_ln_pay_tbox" style="display:none;">
											<select  name="pay_to_party_upi_party_bank" id="pay_to_party_upi_party_bank" class="form-select form-select-solid" data-control="select2" data-placeholder="Party Bank" data-hide-search="true">
												<option value="">Select</option>
												<option value="1">UPI-12546875-kumar</option>				
												<option value="2">Bank-1254867-Kumar</option>
											</select>
										</div>
										<div class="col-lg-2 fv-row fv-plugins-icon-container" id="upi_detail_ln_pay_tbox" style="display:none;">
											<textarea class="form-control form-control-solid" rows="1" placeholder="Details"  name="pay_to_party_upi_details" id="pay_to_party_upi_details"></textarea>
										</div>
									</div>

									<div class="row mt-4">
										<div class="col-lg-6 text-center">
											<label class="col-form-label fw-bold fs-3">Paid Amount &emsp;</label>
											<label class="col-form-label fw-bold fs-3" id="lbl_paid_amt">0.00</label>
										</div>
										<div class="col-lg-6 text-center">
											<label class="col-form-label fw-bold fs-3">Balance Amount &emsp;</label>
											<label class="col-form-label fw-bold fs-3" id="lbl_bal_amt">0.00</label>
										</div>
									</div>
									<div class="d-flex justify-content-end mt-6 px-9">
										<button type="reset" class="btn btn-secondary me-3" data-bs-dismiss="modal">Cancel</button>
										<button class="btn btn-primary" onclick="pay_to_party();" id="btn_pay">Pay</button>
									</div>
								<!-- </div> -->
								</div>
								<!--end::Modal body-->
						</div>
					<!--end::Modal content-->
					<!-- </form> -->
				</div>
				<!--end::Modal dialog-->
			</div>
		</div>
		<!--end::Modal - view payment-->

		<!--begin::Modal - view payment -->
		<div class="modal fade" id="kt_modal_payment_to_receive" tabindex="-1" aria-hidden="true">
			<!--begin::Modal dialog-->
			<div class="modal-dialog modal-xl">
				<!--begin::Modal content-->
				<div class="modal-content rounded">
					<!--begin::Modal header-->
					<div class="modal-header justify-content-end border-0 pb-0">
						<!--begin::Close-->
						<div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
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
					<!-- <form method="POST" enctype="multipart/form-data" action="<?php echo base_url();?>loan/pay_to_party" > -->
						<div class="modal-body pt-0 pb-15 px-5 px-xl-20">
							<!--begin::Heading-->
							<div class="mb-13 text-center">
								<h1 class="mb-3">Payment to Receive</h1>
							</div>
							<!--end::Heading-->
							
							<div class="row">
								<!-- <div style="padding: 10px 10px 10px 10px !important;box-shadow: 0 3px 6px #00002947;border-radius: 5px;background-color:#f5f5f1 !important;"> -->
									<!-- <div><label class="col-form-label fw-bold fs-6"><u>Payment Details</u></label></div> -->
									<div class="row">
										<label class="col-lg-2 col-form-label fw-bold fs-3">Total to Receive</label>
										<label class="col-lg-2 col-form-label fw-bold fs-3" id="lbl_tot_to_rcv">0.00</label>
										<input type="hidden" name="tot_to_receive" id="tot_to_receive" value="0">
									</div>
									<div class="row">
										<div class="col-lg-2 fv-row fv-plugins-icon-container fv-plugins-bootstrap5-row-invalid">
											<div class="d-flex align-items-center mt-1">
												<label class="form-check form-check-inline form-check-solid me-5 is-invalid">
													<input class="form-check-input" name="cash_loan_received_add_radio" type="checkbox" value="1" id="cash_loan_received_add_radio" onclick="cash_ln_recev_add_radio()">
												</label>
												<label class="col-form-label fw-semibold fs-6 me-5">Cash</label>
											</div>
										</div>
										<div class="col-lg-2 fv-row fv-plugins-icon-container fv-plugins-bootstrap5-row-invalid">
											<div class="d-flex align-items-center mt-1">
												<label class="form-check form-check-inline form-check-solid me-5 is-invalid">
													<input class="form-check-input" name="cheque_loan_received_add_radio" type="checkbox" value="1" id="cheque_loan_received_add_radio" onclick="cheque_ln_recev_add_radio()">
												</label>
												<label class="col-form-label fw-semibold fs-6">Cheque</label>
											</div>
										</div>
										<div class="col-lg-2 fv-row fv-plugins-icon-container fv-plugins-bootstrap5-row-invalid">
											<div class="d-flex align-items-center mt-1">
												<label class="form-check form-check-inline form-check-solid me-5 is-invalid">
													<input class="form-check-input" name="rtgs_loan_received_add_radio" type="checkbox" value="1" id="rtgs_loan_received_add_radio" onclick="rtgs_ln_recev_add_radio()">
												</label>
												<label class="col-form-label fw-semibold fs-6">RTGS</label>
											</div>
										</div>
										<div class="col-lg-2 fv-row fv-plugins-icon-container fv-plugins-bootstrap5-row-invalid">
											<div class="d-flex align-items-center mt-1">
												<label class="form-check form-check-inline form-check-solid me-5 is-invalid">
													<input class="form-check-input" name="upi_loan_received_add_radio" type="checkbox" value="1" id="upi_loan_received_add_radio" onclick="upi_ln_recev_add_radio()">
												</label>
												<label class="col-form-label fw-semibold fs-6">UPI</label>
											</div>
										</div>
										<div class="col-lg-2 fv-row fv-plugins-icon-container fv-plugins-bootstrap5-row-invalid">
											<div class="d-flex align-items-center mt-1">
												<label class="form-check form-check-inline form-check-solid me-5 is-invalid">
													<input class="form-check-input" name="mem_card_loan_received_add_radio" type="checkbox" value="1" id="mem_card_loan_received_add_radio" onclick="mem_card_ln_recev_add_radio()">
												</label>
												<label class="col-form-label fw-semibold fs-6">Membership Card</label>
											</div>
										</div>
										<!-- <div class="col-lg-2 fv-row fv-plugins-icon-container fv-plugins-bootstrap5-row-invalid">
											<div class="d-flex align-items-center mt-1">
												<label class="form-check form-check-inline form-check-solid me-5 is-invalid">
													<input class="form-check-input" name="chit_loan_received_add_radio" type="checkbox" value="1" id="chit_loan_received_add_radio" onclick="chit_ln_recev_add_radio()">
												</label>
												<label class="col-form-label fw-semibold fs-6">Chit</label>
											</div>
										</div> -->
									</div>
									<div class="row">
										<label class="col-lg-1 col-form-label fw-semibold fs-6" id="cash_label" style="display:none;">Cash</label>
										<div class="col-lg-2 fv-row fv-plugins-icon-container" id="cash_label_tbox" style="display:none;">
											<input type="text" class="form-control form-control-lg form-control-solid" placeholder="Amount" onkeyup="payment_receive_calc()" value="0" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" name="p_receive_cash" id="p_receive_cash">
											<div class="fv-plugins-message-container invalid-feedback"></div>
										</div>
										<div class="col-lg-3 fv-row fv-plugins-icon-container" id="cash_detail_tbox" style="display:none;">
											<textarea class="form-control form-control-solid" rows="1" placeholder="Details" name="p_receive_cash_details" id="p_receive_cash_details"></textarea>
										</div>
									</div>
									<div class="row">
										<label class="col-lg-1 col-form-label fw-semibold fs-6" id="cheque_amt" style="display:none;">Cheque</label>
										<div class="col-lg-2 fv-row fv-plugins-icon-container" id="cheque_amt_tbox" style="display:none;">
											<input type="text" name="p_receive_cheque_amount" id="p_receive_cheque_amount" class="form-control form-control-lg form-control-solid" placeholder="Amount" onkeyup="payment_receive_calc()" value="0" oninput="this.value = this.value.replace(/[^A-Za-z/0-9.]/g, '').replace(/(\..*)\./g, '$1');">
											<div class="fv-plugins-message-container invalid-feedback"></div>
										</div>
										<!-- <label class="col-lg-1 col-form-label fw-semibold fs-6" id="cheque_bank" style="display:none;">Bank</label> -->
										<div class="col-lg-3 fv-row fv-plugins-icon-container" id="cheque_bank_tbox" style="display:none;">
											<input type="text" name="p_receive_cheque_party_bank" id="p_receive_cheque_party_bank" class="form-control form-control-lg form-control-solid" placeholder="Enter Party Bank" oninput="this.value = this.value.replace(/[^A-Za-z/0-9.]/g, '').replace(/(\..*)\./g, '$1');">
											<div class="fv-plugins-message-container invalid-feedback"></div>
										</div>
										<!-- <label class="col-lg-1 col-form-label fw-semibold fs-6" id="cheque_chq_no" style="display:none;">Cheque no</label> -->
										<div class="col-lg-3 fv-row fv-plugins-icon-container" id="cheque_chq_no_tbox" style="display:none;">
											<input type="text" name="p_receive_cheque_ref_no" id="p_receive_cheque_ref_no" class="form-control form-control-lg form-control-solid" placeholder="Cheque/Ref Number" oninput="this.value = this.value.replace(/[^A-Za-z/0-9.]/g, '').replace(/(\..*)\./g, '$1');">
											<div class="fv-plugins-message-container invalid-feedback"></div>
										</div>
										<!-- <label class="col-lg-1 col-form-label fw-semibold fs-6" id="cheque_detail" style="display:none;">Details</label> -->
										<div class="col-lg-3 fv-row fv-plugins-icon-container" id="cheque_detail_tbox" style="display:none;">
											<textarea class="form-control form-control-solid" rows="1" placeholder="Details" name="p_receive_cheque_details" id="p_receive_cheque_details"></textarea>
										</div>
									</div>
									<div class="row">
										<label class="col-lg-1 col-form-label fw-semibold fs-6" id="rtgs_amt" style="display:none;">RTGS</label>
										<div class="col-lg-2 fv-row fv-plugins-icon-container" id="rtgs_amt_tbox" style="display:none;">
											<input type="text" class="form-control form-control-lg form-control-solid" name="p_receive_rtgs_amount" id="p_receive_rtgs_amount" placeholder="Amount" onkeyup="payment_receive_calc()" value="0" oninput="this.value = this.value.replace(/[^A-Za-z/0-9.]/g, '').replace(/(\..*)\./g, '$1');">
											<div class="fv-plugins-message-container invalid-feedback"></div>
										</div>
										<!-- <label class="col-lg-1 col-form-label fw-semibold fs-6" id="rtgs_no" style="display:none;">RTGS No</label> -->
										<div class="col-lg-3 fv-row fv-plugins-icon-container" id="rtgs_no_tbox" style="display:none;">
											<input type="text" name="p_receive_rtgs_ref_no" id="p_receive_rtgs_ref_no" class="form-control form-control-lg form-control-solid" placeholder="Trans/Ref Number" oninput="this.value = this.value.replace(/[^A-Za-z/0-9.]/g, '').replace(/(\..*)\./g, '$1');">
											<div class="fv-plugins-message-container invalid-feedback"></div>
										</div>
										<div class="col-lg-3 fv-row fv-plugins-icon-container" id="rtgs_bank_tbox" style="display:none;">
											<select class="form-select form-select-solid" name="p_receive_rtgs_company_bank" id="p_receive_rtgs_company_bank" data-control="select2" data-placeholder="Select Company Bank" data-hide-search="true">
												<option value="">Select</option>
												<?php
													$bnk_det=$this->db->query("select * from BANKS where ACTIVE='Y'")->result_array();
													foreach ($bnk_det as $blist) {
													?>
													<option value="<?php echo $blist['SNO'];?>"><?php echo $blist['BANKNAME'];?></option>
													<?php
													}
													?>
											</select>
										</div>
										<!-- <label class="col-lg-1 col-form-label fw-semibold fs-6" id="rtgs_detail" style="display:none;">Details</label> -->
										<div class="col-lg-3 fv-row fv-plugins-icon-container" id="rtgs_detail_tbox" style="display:none;">
											<textarea class="form-control form-control-solid" rows="1" placeholder="Details" name="p_receive_rtgs_details" id="p_receive_rtgs_details"></textarea>
										</div>
									</div>
									<div class="row">
										<label class="col-lg-1 col-form-label fw-semibold fs-6" id="upi_amt" style="display:none;">UPI</label>
										<div class="col-lg-2 fv-row fv-plugins-icon-container" id="upi_amt_tbox" style="display:none;">
											<input type="text" name="p_receive_upi_amount" id="p_receive_upi_amount" class="form-control form-control-lg form-control-solid" placeholder="Amount" onkeyup="payment_receive_calc()" value="0">
											<div class="fv-plugins-message-container invalid-feedback"></div>
										</div>
										<!-- <label class="col-lg-1 col-form-label fw-semibold fs-6" id="upi_trans_no" style="display:none;">Trans No</label> -->
										<div class="col-lg-3 fv-row fv-plugins-icon-container" id="upi_trans_no_tbox" style="display:none;">
											<input type="text" name="p_receive_upi_ref_no" id="p_receive_upi_ref_no" class="form-control form-control-lg form-control-solid" placeholder="Trans/Ref Number">
											<div class="fv-plugins-message-container invalid-feedback"></div>
										</div>
										<div class="col-lg-3 fv-row fv-plugins-icon-container" id="upi_bank_tbox" style="display:none;">
											<select name="p_receive_upi_company_bank" id="p_receive_upi_company_bank" class="form-select form-select-solid" data-control="select2" data-placeholder="Select Company Bank" data-hide-search="true">
												<option value="">Select</option>
												<?php
													$bnk_det=$this->db->query("select * from BANKS where ACTIVE='Y'")->result_array();
													foreach ($bnk_det as $blist) {
													?>
													<option value="<?php echo $blist['SNO'];?>"><?php echo $blist['BANKNAME'];?></option>
													<?php
													}
													?>
											</select>
										</div>
										<!-- <label class="col-lg-1 col-form-label fw-semibold fs-6" id="upi_detail" style="display:none;">Details</label> -->
										<div class="col-lg-3 fv-row fv-plugins-icon-container" id="upi_detail_tbox" style="display:none;">
											<textarea class="form-control form-control-solid" rows="1" placeholder="Details"  name="p_receive_upi_details" id="p_receive_upi_details"></textarea>
										</div>
									</div>
									<div class="row">
										<label class="col-lg-1 col-form-label fw-semibold fs-6" id="lbl_mem_card_no_pop" style="display:none;">M.card No</label>
										<div class="col-lg-2" id="mem_card_no_tbox" style="display:none;">
											<input type="text" class="form-control form-control-lg form-control-solid" placeholder="Membership Card No" name="mem_card_no" id="mem_card_no" readonly>
											<div class="fv-plugins-message-container invalid-feedback"></div>
										</div>
										<div class="col-lg-3" id="mem_card_avail_points_tbox" style="display:none;">
											<label class="col-form-label fw-bold fs-6">Available Points</label>&emsp;
											<label class="col-form-label fw-bold fs-5" id="mem_card_points">10052</label>
										</div>
										<!-- <label class="col-lg-1 col-form-label fw-semibold fs-6" id="cus_cl_redeem_paid_from_cmy" style="display:none;">Redeem</label> -->
										<div class="col-lg-2" id="mem_card_redeem_tbox" style="display:none;">
											<input type="text" class="form-control form-control-lg form-control-solid" placeholder="Redeem Points" name="mem_card_redeem_points" id="mem_card_redeem_points"  onkeyup="payment_receive_calc();" value="0">
											<div class="fv-plugins-message-container invalid-feedback"></div>
										</div>
										<div class="col-lg-2 fv-row fv-plugins-icon-container" id="mem_card_details_tbox" style="display:none;">
											<textarea class="form-control form-control-solid" rows="1" placeholder="Details" name="mem_card_details" id="mem_card_details"></textarea>
										</div>
									</div>
									<div class="row">
										<label class="col-lg-1 col-form-label fw-semibold fs-6" id="cus_cl_sch_paid_from_pty" style="display:none;">Scheme</label>
										<div class="col-lg-2 fv-row fv-plugins-icon-container" id="cus_cl_sch_paid_from_pty_tbox" style="display:none;">
											<select class="form-select form-select-solid" data-control="select2" data-placeholder="Select Scheme" id="cust_cls_ppchit_scheme" name="cust_cls_ppchit_scheme" data-hide-search="true">
												<option value="">Select</option>
												<option value="1">Selvamagal</option>				
												<option value="2">Thangamagan</option>
											</select>
										</div>
										<div class="col-lg-3 fv-row fv-plugins-icon-container" id="cus_cl_avai_bal_paid_from_pty" style="display:none;">
											<select class="form-select form-select-solid" data-control="select2" data-placeholder="Select Chit ID" data-hide-search="true" name="cust_cls_ppchit_number" id="cust_cls_ppchit_number">
												<option value="">Select Chit ID</option>
												<option value="1">CH-001/23 - 45863.00</option>				
												<option value="2">CH-002/23 - 85964.00</option>
											</select>
										</div>
										<div class="col-lg-2" id="cus_cl_redeem_amt_paid_from_pty_tbox" style="display:none;">
											<input type="text" class="form-control form-control-lg form-control-solid" placeholder="Redeem Amount" name="cust_cls_ppchit_red_amount" id="cust_cls_ppchit_red_amount"  onkeyup="cust_close_party_payment_calc();" value="0">
											<div class="fv-plugins-message-container invalid-feedback"></div>
										</div>
										<div class="col-lg-2 fv-row fv-plugins-icon-container" id="cus_cl_redeem_detail_paid_from_pty_tbox" style="display:none;">
											<textarea class="form-control form-control-solid" rows="1" placeholder="Details" name="cust_cls_ppchit_details" id="cust_cls_ppchit_details"></textarea>
										</div>
									</div>
									<div class="row mt-4">
										<div class="col-lg-6 text-center">
											<label class="col-form-label fw-bold fs-3">Paid Amount &emsp;</label>
											<label class="col-form-label fw-bold fs-3" id="lbl_ptr_paid_amt">0.00</label>
										</div>
										<div class="col-lg-6 text-center">
											<label class="col-form-label fw-bold fs-3">Balance Amount &emsp;</label>
											<label class="col-form-label fw-bold fs-3" id="lbl_ptr_bal_amt">0.00</label>
										</div>
									</div>
									<div class="d-flex justify-content-end mt-6 px-9">
										<button type="reset" class="btn btn-secondary me-3" data-bs-dismiss="modal">Cancel</button>
										<button type="button" class="btn btn-primary" onclick="receive_from_party1()" id="btn_deduct">Deduct</button>
										<!-- <button class="btn btn-primary" onclick="pay_to_party();" data-bs-toggle="modal" data-bs-target="#kt_modal_view_payment">Pay</button> -->
									</div>
								<!-- </div> -->
								</div>
								<!--end::Modal body-->
						</div>
					<!--end::Modal content-->
					<!-- </form> -->
				</div>
				<!--end::Modal dialog-->
			</div>
		</div>
		<!--end::Modal - view payment-->

		<!--begin::Modal - view capture image -->
		<div class="modal fade" id="kt_modal_camera" tabindex="-1" aria-hidden="true">
			<!--begin::Modal dialog-->
			<div class="modal-dialog modal-xl">
				<!--begin::Modal content-->
				<div class="modal-content rounded">
					<!--begin::Modal header-->
					<div class="modal-header justify-content-end border-0 pb-0">
						<!--begin::Close-->
						<div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
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
					
					<div class="modal-body pt-0 pb-15 px-5 px-xl-20">
						<!--begin::Heading-->
						<div class="mb-13 text-center">
							<h1 class="mb-3">Capture Image</h1>
						</div>
						<!--end::Heading-->
						<!--end::Heading-->	
						<div class="row">
							<div class="col-lg-6">
								<div class="row">
									<div id="my_camera" style="max-height: 330px;height: 330px;width: 100%;max-width: 100%;border: 1px solid;">
										
									</div>
								</div>
								<div class="d-flex justify-content-center align-items-center mt-6">
									<div class="btn btn-primary" id="take_jewel_photo1" onclick="take_jewel_photo()">Take Jewel Photo</div>
									<button type="submit" class="btn btn-primary" id="capture" onclick="jewel_snapshot()" style="display: none;">Capture</button>
								</div>
							</div>
							<div class="col-lg-6">
								<div class="row">
									<input type="hidden" name="img_count" id="img_count" value="1">
									<div class="col-lg-4 fv-row">
										<a href="javascript:;" onclick="select_image_1();">
											<div class="image-input image-input-outline" data-kt-image-input="true" id="img_1" style="background-image: url(<?php echo base_url();?>assets/images/Jewel.jpg);">
													<div class="image-input-wrapper w-150px h-150px"   style="background-image: url(<?php echo base_url();?>assets/images/Jewel.jpg)"></div>
											</div>
											<textarea hidden="hidden" name="img_1_data" id="img_1_data"></textarea>
										</a>
									</div>
									<div class="col-lg-4 fv-row">
										<a href="javascript:;" onclick="select_image_2();">
											<div class="image-input image-input-outline" data-kt-image-input="true" id="img_2" style="background-image: url(<?php echo base_url();?>assets/images/Jewel.jpg)">
													<div class="image-input-wrapper w-150px h-150px"  style="background-image: url(<?php echo base_url();?>assets/images/Jewel.jpg)"></div>
											</div>
											<textarea hidden="hidden" name="img_2_data" id="img_2_data"></textarea>
										</a>
									</div>
									<div class="col-lg-4 fv-row">
										<a href="javascript:;" onclick="select_image_3();">
											<div class="image-input image-input-outline" data-kt-image-input="true" id="img_3" style="background-image: url(<?php echo base_url();?>assets/images/Jewel.jpg)">
													<div class="image-input-wrapper w-150px h-150px"  style="background-image: url(<?php echo base_url();?>assets/images/Jewel.jpg)"></div>
											</div>
											<textarea hidden="hidden" name="img_3_data" id="img_3_data"></textarea>
										</a>
									</div>
								</div>
								<div class="row mt-4">
									
									<div class="col-lg-4 fv-row">
										<a href="javascript:;" onclick="select_image_4();">
											<div class="image-input image-input-outline" data-kt-image-input="true" id="img_4" style="background-image: url(<?php echo base_url();?>assets/images/Jewel.jpg)">
													<div class="image-input-wrapper w-150px h-150px"  style="background-image: url(<?php echo base_url();?>assets/images/Jewel.jpg)"></div>
											</div>
											<textarea hidden="hidden" name="img_4_data" id="img_4_data"></textarea>
										</a>
									</div>
									<div class="col-lg-4 fv-row">
										<a href="javascript:;" onclick="select_image_5();">
											<div class="image-input image-input-outline" data-kt-image-input="true" id="img_5" style="background-image: url(<?php echo base_url();?>assets/images/Jewel.jpg)">
													<div class="image-input-wrapper w-150px h-150px"  style="background-image: url(<?php echo base_url();?>assets/images/Jewel.jpg)"></div>
											</div>
											<textarea hidden="hidden" name="img_5_data" id="img_5_data"></textarea>
										</a>
									</div>
									<div class="col-lg-4 fv-row">
										<a href="javascript:;" onclick="select_image_6();">
											<div class="image-input image-input-outline" data-kt-image-input="true" id="img_6" style="background-image: url(<?php echo base_url();?>assets/images/Jewel.jpg)">
													<div class="image-input-wrapper w-150px h-150px"  style="background-image: url(<?php echo base_url();?>assets/images/Jewel.jpg)"></div>
											</div>
											<textarea hidden="hidden" name="img_6_data" id="img_6_data"></textarea>
										</a>
									</div>
									<input type="hidden" name="img_selected_id" value="" id="img_selected_id" value="">
									<div class="d-flex justify-content-center align-items-center mt-13">
										<div type="submit" class="btn btn-primary" onclick="put_capture_jewel_photo()">Submit</div>
									</div>
								</div>
							</div>
						</div>
						<!--end::Modal body-->
					</div>
					<!--end::Modal content-->
				</div>
				<!--end::Modal dialog-->
			</div>
			<!--end::Modal - view payment-->
		</div>
		<!--end::Modal - view capture image for loan-->

		<!--begin::Modal - view capture image for pledge -->
		<div class="modal fade" id="kt_modal_camera_pledge" tabindex="-1" aria-hidden="true">
			<!--begin::Modal dialog-->
			<div class="modal-dialog modal-xl">
				<!--begin::Modal content-->
				<div class="modal-content rounded">
					<!--begin::Modal header-->
					<div class="modal-header justify-content-end border-0 pb-0">
						<!--begin::Close-->
						<div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
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
					
					<div class="modal-body pt-0 pb-15 px-5 px-xl-20">
						<!--begin::Heading-->
						<div class="mb-13 text-center">
							<h1 class="mb-3">Capture Pledge Item</h1>
						</div>
						<!--end::Heading-->
						<!--end::Heading-->	
						<div class="row">
							<div class="col-lg-6">
								<div class="row">
									<div id="pl_my_camera" style="max-height: 330px;height: 330px;width: 100%;max-width: 100%;border: 1px solid;">
										
									</div>
								</div>
								<div class="d-flex justify-content-center align-items-center mt-6">
									<div class="btn btn-primary" id="pl_take_jewel_photo1" onclick="pl_take_jewel_photo()">Take Pledge Item Photo</div>
									<button type="submit" class="btn btn-primary" id="pl_capture" onclick="pl_jewel_snapshot()" style="display: none;">Capture</button>
								</div>
							</div>
							<div class="col-lg-6">
								<div class="row">
									<input type="hidden" name="pl_img_count" id="pl_img_count" value="1">
									<div class="col-lg-4 fv-row">
										<a href="javascript:;" onclick="pl_select_image_1();">
											<div class="image-input image-input-outline" data-kt-image-input="true" id="pl_img_1" style="background-image: url(<?php echo base_url();?>assets/images/Jewel.jpg);">
													<div class="image-input-wrapper w-150px h-150px"   style="background-image: url(<?php echo base_url();?>assets/images/Jewel.jpg)" ></div>
											</div>
											<textarea hidden="hidden" name="pl_img_1_data" id="pl_img_1_data"></textarea>
										</a>
									</div>
									<div class="col-lg-4 fv-row">
										<a href="javascript:;" onclick="pl_select_image_2();">
											<div class="image-input image-input-outline" data-kt-image-input="true" id="pl_img_2" style="background-image: url(<?php echo base_url();?>assets/images/Jewel.jpg)">
													<div class="image-input-wrapper w-150px h-150px"  style="background-image: url(<?php echo base_url();?>assets/images/Jewel.jpg)"></div>
											</div>
											<textarea hidden="hidden" name="pl_img_2_data" id="pl_img_2_data"></textarea>
										</a>
									</div>
									<div class="col-lg-4 fv-row">
										<a href="javascript:;" onclick="pl_select_image_3();">
											<div class="image-input image-input-outline" data-kt-image-input="true" id="pl_img_3" style="background-image: url(<?php echo base_url();?>assets/images/Jewel.jpg)">
													<div class="image-input-wrapper w-150px h-150px"  style="background-image: url(<?php echo base_url();?>assets/images/Jewel.jpg)"></div>
											</div>
											<textarea hidden="hidden" name="pl_img_3_data" id="pl_img_3_data"></textarea>
										</a>
									</div>
								</div>
								<div class="row mt-4">
									
									<div class="col-lg-4 fv-row">
										<a href="javascript:;" onclick="pl_select_image_4();">
											<div class="image-input image-input-outline" data-kt-image-input="true" id="pl_img_4" style="background-image: url(<?php echo base_url();?>assets/images/Jewel.jpg)">
													<div class="image-input-wrapper w-150px h-150px"  style="background-image: url(<?php echo base_url();?>assets/images/Jewel.jpg)"></div>
											</div>
											<textarea hidden="hidden" name="pl_img_4_data" id="pl_img_4_data"></textarea>
										</a>
									</div>
									<div class="col-lg-4 fv-row">
										<a href="javascript:;" onclick="pl_select_image_5();">
											<div class="image-input image-input-outline" data-kt-image-input="true" id="pl_img_5" style="background-image: url(<?php echo base_url();?>assets/images/Jewel.jpg)">
													<div class="image-input-wrapper w-150px h-150px"  style="background-image: url(<?php echo base_url();?>assets/images/Jewel.jpg)"></div>
											</div>
											<textarea hidden="hidden" name="pl_img_5_data" id="pl_img_5_data"></textarea>
										</a>
									</div>
									<div class="col-lg-4 fv-row">
										<a href="javascript:;" onclick="pl_select_image_6();">
											<div class="image-input image-input-outline" data-kt-image-input="true" id="pl_img_6" style="background-image: url(<?php echo base_url();?>assets/images/Jewel.jpg)">
													<div class="image-input-wrapper w-150px h-150px"  style="background-image: url(<?php echo base_url();?>assets/images/Jewel.jpg)"></div>
											</div>
											<textarea hidden="hidden" name="pl_img_6_data" id="pl_img_6_data"></textarea>
										</a>
									</div>
									<input type="hidden" name="pl_img_selected_id" value="" id="pl_img_selected_id" value="">
									<div class="d-flex justify-content-center align-items-center mt-13">
										<div type="submit" class="btn btn-primary" onclick="pl_put_capture_jewel_photo()">Submit</div>
									</div>
								</div>
							</div>
						</div>
						<!--end::Modal body-->
					</div>
					<!--end::Modal content-->
				</div>
				<!--end::Modal dialog-->
			</div>
			<!--end::Modal - view payment-->
		</div>
		<!--end::Modal - view capture image-->
		
		<!--begin::Modal - View loan number-->
	<div class="modal fade" id="kt_modal_view_loan_no" tabindex="-1" aria-hidden="true">
		<!--begin::Modal dialog-->
		<div class="modal-dialog modal-m">
			<!--begin::Modal content-->
			<div class="modal-content rounded">
				<div class="swal2-icon swal2-warning swal2-icon-show" style="display: flex;">
					<div class="swal2-icon-content">&#10004;</div></div>
					<div class="swal2-html-container" id="swal2-html-container" style="display: block;">Your Generated Loan Number is:<br>
						<h4 style="color:red;" id="loan_no_display"></h4>
					</div>
					<div class="d-flex flex-center flex-row-fluid pt-12">
						<!-- <button type="submit" class="btn btn-danger me-3" data-bs-dismiss="modal">Yes, View !</button number> -->
						<button type="reset" class="btn btn-secondary" data-bs-dismiss="modal"  id="popup_close">Close</button>
					</div><br><br>
			</div>
			<!--end::Modal content-->
		</div>
		<!--end::Modal dialog-->
	</div>
	<!--end::Modal - View  loan number-->

		<!--begin::Modal - view payment -->
		<div class="modal fade" id="kt_modal_verify_membership_card" tabindex="-1" aria-hidden="true">
			<!--begin::Modal dialog-->
			<div class="modal-dialog modal-md">
				<!--begin::Modal content-->
				<div class="modal-content rounded">
					<!--begin::Modal header-->
					<div class="modal-header justify-content-end border-0 pb-0">
						<!--begin::Close-->
						<div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
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
					
					<div class="modal-body pt-0 pb-15 px-5 px-xl-20">
						<!--begin::Heading-->
						<div class="mb-13 text-center">
							<h1 class="mb-3">Verify Membership Card</h1>
						</div>
						<!--end::Heading-->
						<!--end::Heading-->					
						<div class="row">
							<label class="col-lg-12 col-form-label fw-bold fs-5"><i class="fa fa-address-card fs-5" aria-hidden="true" title="Card No"></i>&emsp;<span id="pop_member_card"></span>
							</label>
							<label class="col-lg-4 col-form-label fw-bold fs-6" name="pop_card_type" id="pop_card_type" ></label>
							<label class="col-lg-4 col-form-label fw-bold fs-5" name="" id=""><i class="fa-solid fa-coins fs-5" title="Points"></i>&emsp;<span id="pop_member_points"></span></label>
						</div>
						<div class="row">
							<label class="col-lg-4 col-form-label fw-semibold fs-6">Scan Here</label>
							<div class="col-lg-8 fv-row fv-plugins-icon-container">
								<input type="text" class="form-control form-control-lg form-control-solid" placeholder="Scan Here" name="check_card_no" id="check_card_no">
								<div class="fv-plugins-message-container invalid-feedback"></div>
							</div>
						</div>
						<div class="row">
							<label class="col-lg-8 col-form-label fw-bold fs-6 text-end" name="status" id="status" >
								<!-- <span style="background-color:#f1416c;border-radius: 8px;padding: 5px 15px 5px 15px;color: white;">Not Matched...</span> -->
								<span style="background-color:#50cd89;border-radius: 8px;padding: 5px 15px 5px 15px;">Verifying...</span>
								<!-- <span style="background-color:#50cd89;border-radius: 8px;padding: 5px 15px 5px 15px;">Matched...</span> -->
							</label>
							<div class="col-lg-4 d-flex justify-content-end">
								<button class="btn btn-sm btn-outline btn-outline-solid btn-outline-warning btn-active-light-primary me-2" data-bs-toggle="modal" data-bs-target="#kt_modal_verify_membership_card" onclick="check_card();">Verify</button>
							</div>
						</div>
						<div class="d-flex justify-content-end mt-6 px-9">
							<button type="reset" class="btn btn-secondary me-3" data-bs-dismiss="modal">Cancel</button>
							<!-- <button class="btn btn-primary">Ok</button> -->
						</div>
						<!--end::Modal body-->
					</div>
					<!--end::Modal content-->
				</div>
				<!--end::Modal dialog-->
			</div>
			<!--end::Modal - view payment-->
		</div>


		<div class="modal fade" id="kt_modal_verify_mobile_no" tabindex="-1" aria-hidden="true">
			<!--begin::Modal dialog-->
			<div class="modal-dialog modal-md">
				<!--begin::Modal content-->
				<div class="modal-content rounded">
					<!--begin::Modal header-->
					<div class="modal-header justify-content-end border-0 pb-0">
						<!--begin::Close-->
						<div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
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
					
					<div class="modal-body pt-0 pb-15 px-5 px-xl-20">
						<!--begin::Heading-->
						<div class="mb-13 text-center">
							<h1 class="mb-3">Verify Mobile No</h1>
						</div>
						<!--end::Heading-->
									
						<div class="row">
							<label class="col-lg-12 col-form-label fw-bold fs-5"><i class="fa fa-mobile-android-alt fs-5" aria-hidden="true" title="Mobile No"></i>&emsp;<span id="pop_mobile_no"></span>
							</label><br>
							<label class="form-check form-check-inline form-check-solid is-invalid">
								<input class="form-check-input" name="pop_mobile_no_is_change" type="checkbox" id="pop_mobile_no_is_change" onclick="change_mobile();">
								<span class="col-form-label fw-semibold fs-6">Change Mobile Number</span>
							</label>
						</div>
						<div class="row" id="div_change_mobile_no" style="display: none;">
							<div class="row">
								<label class="col-lg-3 col-form-label fw-semibold fs-6">Mobile No</label>
								<div class="col-lg-5 fv-row fv-plugins-icon-container">
									<input type="text" class="form-control form-control-lg form-control-solid" placeholder="Enter Mobile no" name="new_mobile_no" id="new_mobile_no" maxlength="10" minlength="10" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">
									<div class="fv-plugins-message-container invalid-feedback"></div>
								</div>
								<!-- <div class="col-lg-8 fv-row fv-plugins-icon-container"></div> -->
								<div class="col-lg-4 d-flex justify-content-end">
									<button class="btn btn-sm btn-outline btn-outline-solid btn-outline-warning btn-active-light-primary me-2" onclick="update_no();" >Change</button>
								</div>
							</div>
						</div>
						<div class="row">
							<!--generated_otp-->
							<span style="border-radius: 8px;padding: 5px 15px 5px 15px;color: #e41f7a; display: none;" id="generated_otp"> </span>
							<input type="hidden" name="generated_otp_hidden" id="generated_otp_hidden" value="">
						</div>
						<div class="row"  id="div_verify_mobile_no" >
							<div class="row">

							<label class="col-lg-6 col-form-label fw-semibold fs-6">OTP from Customer</label>
							<div class="col-lg-6 fv-row fv-plugins-icon-container">
								<input type="text" class="form-control form-control-lg form-control-solid" placeholder="Enter code" name="check_otp" id="check_otp">
								<div class="fv-plugins-message-container invalid-feedback"></div>
							</div>
						<!-- </div>
						<div class="row"> -->
						<!-- <div class="row"> -->
							<div class="d-flex justify-content-center">
								<label class="col-form-label fw-bold fs-6 text-center" name="status" id="status" >
									<span style="background-color:#f1416c;border-radius: 8px;padding: 5px 15px 5px 15px;color: white; display: none;" id="mb_err"> Not Matched...</span>
									<span style="background-color:#50cd89;border-radius: 8px;padding: 5px 15px 5px 15px;display: none;"  id="mb_success">Verified</span>
									<!-- <span style="background-color:#50cd89;border-radius: 8px;padding: 5px 15px 5px 15px;">Matched...</span> -->
								</label>
							</div>
						<!-- </div> -->
						
						<div class="row">

							<div class="col-lg-12 d-flex justify-content-center">
								<button class="btn btn-sm btn-outline btn-outline-solid btn-outline-warning btn-active-light-primary me-2" onclick="generate_otp();" id="generate_btn">Send OTP to Verify</button>
								<button class="btn btn-sm btn-outline btn-outline-solid btn-outline-warning btn-active-light-primary me-2" onclick="check_mobile();" id="verify_btn" style="display: none;">Verify</button>
								<button type="reset" id="cancel_btn" class="btn btn-secondary me-3" data-bs-dismiss="modal">Cancel</button>
							</div>
							</div>
						</div>
						<!-- <div class="d-flex justify-content-end mt-6 px-9">
							<button type="reset" class="btn btn-secondary me-3" data-bs-dismiss="modal">Cancel</button> -->
							<!-- <button class="btn btn-primary">Ok</button> -->
						<!-- </div> -->
						<!--end::Modal body-->
					</div>
					<!--end::Modal content-->
				</div>
				<!--end::Modal dialog-->
			</div>
			<!--end::Modal - view payment-->
		</div>
	

		<?php $this->load->view("script"); ?>
		<input type="hidden" id="baseurl" value="<?php echo base_url(); ?>">
		<script src="<?php echo base_url();?>assets/jquery.autocomplete.js"></script>
		<script>
	      $("#kt_datatable_dom_positioning").kendoTooltip({
	        filter: "td",
	        show: function(e){
	          if(this.content.text() !=""){
	            $('[role="tooltip"]').css("visibility", "visible");
	          }
	        },
	        hide: function(){
	          $('[role="tooltip"]').css("visibility", "hidden");
	        },
	        content: function(e){
	          var element = e.target[0];
	          if(element.offsetWidth < element.scrollWidth){
	            return e.target.text();
	          }else{
	            return "";
	          }
	        }
	      })
	</script>
	<script>
		$("#kt_datatable_dom_positioning").DataTable({
			// "ordering": false,
			"responsive": true,
			"aaSorting":[],
			 "language": {
			  "lengthMenu": "Show _MENU_",
			 },
			 "dom":
			  "<'row'" +
			  "<'col-sm-6 d-flex align-items-center justify-conten-start'l>" +
			  "<'col-sm-6 d-flex align-items-center justify-content-end'f>" +
			  ">" +

			  "<'table-responsive'tr>" +

			  "<'row'" +
			  "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
			  "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
			  ">"
			});
	</script>
	<script>
			$("#kt_datatable_dom_positioning_add_loan").DataTable({
				 "ordering": false,
				 "language": {
				  "lengthMenu": "Show _MENU_",
				 },
				 "dom":
				  "<'row'" +
				  ">" +

				  "<'table-responsive'tr>" +

				  "<'row'" +
				  ">"
				 
				});
			$('#kt_datatable_dom_positioning_add_loan').wrap('<div class="dataTables_scroll" />');
	</script>
	<script>
			$("#kt_datatable_dom_positioning_edit_loan").DataTable({
				// "ordering": false,
				"aaSorting":[],
				 "language": {
				  "lengthMenu": "Show _MENU_",
				 },
				 "dom":
				  "<'row'" +
				  ">" +

				  "<'table-responsive'tr>" +

				  "<'row'" +
				  ">"
				 
				});
	</script>
	<script>
			$("#kt_datatable_dom_positioning_view_loan").DataTable({
				// "ordering": false,
				"aaSorting":[],
				 "language": {
				  "lengthMenu": "Show _MENU_",
				 },
				 "dom":
				  "<'row'" +
				  ">" +

				  "<'table-responsive'tr>" +

				  "<'row'" +
				  ">"
				 
				});
	</script>
	<script>
			$("#kt_datepicker_From").flatpickr({
				dateFormat: "d-m-Y",
			});
			$("#kt_datepicker_To").flatpickr({
				dateFormat: "d-m-Y",
			});
			$("#kt_datepicker_new_loan_date").flatpickr({
				dateFormat: "d-m-Y",
			});
			$("#kt_datepicker_edit_loan_date").flatpickr({
				dateFormat: "d-m-Y",
			});
			$("#kt_datepicker_view_loan_date").flatpickr({
				dateFormat: "d-m-Y",
			});
	</script>
	<script>
		// Paid Cash Payment Mode
	  jQuery($ => {
	  $(document).on('change', '.sare-fields', e => {
	    let $select = $(e.target);
	    let id = $select.data("id");
	    let value = $select.val();

	    let $container = $select.closest('.repeater');
	    if (value == "CASH") 
	    {
	    	console.log("if");
	    	$container.find('.row .data-fields[data-parent=' + id + ']').hide();
	    	$container.find('.data-fields[data-parent=' + id + '][data-sub=' + value + ']').hide();
	    }
	    else
	    {
	    	console.log("else");
	    	$container.find('.row .data-fields[data-parent=' + id + ']').show();
	    	$container.find('.data-fields[data-parent=' + id + '][data-sub=' + value + ']').show();
	    }
	  });

		  // repeater functionality...
		  $('.btn-add').on('click', e => {
		     let $clone = $('.repeater').first().clone().hide();
		     if ($('.btn-add').val() == "1") 
		     {
		     	$('.del').hide();
		     }
		     else
		     {
		     	$('.del').show();
		     }
		    $clone.insertBefore('.repeater:first').slideDown();
		  });

		  $(document).on('click', '.repeater .btn-delete', e => 
		  {
		  	$(e.target).closest('.repeater').slideUp(400, function() { $(this).remove() });
		  });
		});
	</script>
	<script>
		// Document Charge Payment Mode
	  jQuery($ => {
	  $(document).on('change', '.sare-fields_dc', e => {
	    let $select = $(e.target);
	    let id = $select.data("id");
	    let value = $select.val();

	    let $container = $select.closest('.repeater_dc');
	    if (value == "CASH") 
	    {
	    	console.log("if");
	    	$container.find('.row .data-fields_dc[data-parent=' + id + ']').hide();
	    	$container.find('.data-fields_dc[data-parent=' + id + '][data-sub=' + value + ']').hide();
	    }
	    else
	    {
	    	console.log("else");
	    	$container.find('.row .data-fields_dc[data-parent=' + id + ']').show();
	    	$container.find('.data-fields_dc[data-parent=' + id + '][data-sub=' + value + ']').show();
	    }
	  	});

	  // repeater functionality...
	  $('.btn-add_dc').on('click', e => {
		     let $clone = $('.repeater_dc').first().clone().hide();
		     if ($('.btn-add_dc').val() == "1") 
		     {
		     	$('.del_dc').hide();
		     }
		     else
		     {
		     	$('.del_dc').show();
		     }
		    $clone.insertBefore('.repeater_dc:first').slideDown();
		  });

		  $(document).on('click', '.repeater_dc .btn-delete_dc', e => 
		  {
		  	$(e.target).closest('.repeater_dc').slideUp(400, function() { $(this).remove() });
		  });
		});
	</script>
	<script>
		  jQuery($ => {
		  $(document).on('change', '.sare-fields', e => {
		    let $select = $(e.target);
		    let id = $select.data("id");
		    let value = $select.val();

		    let $container = $select.closest('.repeater');
		    if (value == "CASH") 
		    {
		    	console.log("if");
		    	$container.find('.row .data-fields[data-parent=' + id + ']').hide();
		    	$container.find('.data-fields[data-parent=' + id + '][data-sub=' + value + ']').hide();
		    }
		    else
		    {
		    	console.log("else");
		    	$container.find('.row .data-fields[data-parent=' + id + ']').show();
		    	$container.find('.data-fields[data-parent=' + id + '][data-sub=' + value + ']').show();
		    }
		  });

		  // repeater functionality...
		  $('.btn-add').on('click', e => {
		     let $clone = $('.repeater').first().clone().hide();
		     if ($('.btn-add').val() == "1") 
		     {
		     	$('.del').hide();
		     }
		     else
		     {
		     	$('.del').show();
		     }
		    //$clone.find(':text').val('');
		    //$clone.find('select option:first').prop('selected', true);
		    // $clone.insertAfter('.repeater:first').slideDown();
		    $clone.insertBefore('.repeater:first').slideDown();
		  });

		  $(document).on('click', '.repeater .btn-delete', e => 
		  {
		  	$(e.target).closest('.repeater').slideUp(400, function() { $(this).remove() });
		  });
		});
	</script>
	<script >
		// $("#btn_submit_loan").on("click",function(){
		// 	  $('#kt_modal_view_loan_no').addClass('show');
		// 	});
	</script>
	<script >
		var baseurl = $("#baseurl").val();
		var span = document.querySelector('#last_name');

	        $("#first_name").autocomplete({ 
	                valueKey:'title',
	                source:[{
	                url:baseurl+'loan/userList?query=%QUERY%',
	                type:'remote',
	                ajax:{
	                  dataType : 'json',
	                }
	            }]}).on('selected.xdsoft',function(e,suggestion,ui){ 
	                $("#first_name").val(suggestion.firstname);
	                $('#first_name_id_hidden').val(suggestion.id);
	                $('#p_pid').val(suggestion.id);
	                
	                var txt=suggestion.lastname+'&emsp; &emsp;<a target="_blank" href="<?php echo base_url();?>party/party_view/'+suggestion.id+'"><i class="fas fa-mail-bulk" title=" View Party"></i></a>';
	                $("#last_name").html(txt);
	                if(suggestion.rating==1){
	                	r='<i class="fa-solid fa-star" style="color:red;"></i>&nbsp;Bad';	
	                }
	                else if(suggestion.rating==2){
	                	r='<i class="fa-solid fa-star" style="color:#ffc700;"></i>&nbsp;Average';	
	                }
	                else if(suggestion.rating==3){
	                	r='<i class="fa-solid fa-star" style="color:#50cd89;"></i>&nbsp;Good';	
	                }
	                else{
	                	r='<i class="fa-solid fa-star" style="color:#d2d4dc;"></i>&nbsp;-';	
	                }
	                $("#rating").html(r);
	                $("#address").html(suggestion.address);
	                $("#mobile").html(suggestion.phone);
	                $("#pop_mobile_no").html(suggestion.phone);
	                
	                if(suggestion.member_id=='')
	                {
	                	document.getElementById('no_card').style.display="block";
	                	document.getElementById('lbl_mem_card_no').style.display="none";
	                	document.getElementById('card_type').style.display="none";
	                	document.getElementById('lbl_mem_point').style.display="none";
	                	document.getElementById('lbl_mem_verify').style.display="none";
	                	document.getElementById("mem_card_loan_received_add_radio").disabled = true;
	                	document.getElementById("mem_card_loan_received_add_radio").checked = false;
	                	$("#mem_card_no").val('');
		                $("#mem_card_points").html('');
		                document.getElementById("lbl_mem_card_no").style.display = "none";
		                document.getElementById("mem_card_no").style.display = "none";
				    	document.getElementById("mem_card_no_tbox").style.display = "none";
				    	document.getElementById("mem_card_avail_points_tbox").style.display = "none";
				    	document.getElementById("mem_card_redeem_tbox").style.display = "none";
				    	document.getElementById("mem_card_details_tbox").style.display = "none";
	                	
	                }
	            	else
	            	{
	            		document.getElementById('no_card').style.display="none";
	                	document.getElementById('lbl_mem_card_no').style.display="block";
	                	document.getElementById('card_type').style.display="block";
	                	document.getElementById('lbl_mem_point').style.display="block";
	                	document.getElementById('lbl_mem_verify').style.display="block";
		                $("#membership_card_no").html(suggestion.member_id);
		                $("#pop_member_card").html(suggestion.member_id);
		                $("#membership_card_points").html(suggestion.member_points);
		                $("#pop_member_points").html(suggestion.member_points);
		                $("#mem_card_no").val(suggestion.member_id);
		                $("#mem_card_points").html(suggestion.member_points);
		                document.getElementById("mem_card_loan_received_add_radio").disabled = false;
	                
	                }
	        });
	         

$('#last_name').on('DOMSubtreeModified',function(){
  // alert('changed');
  var pid= $("#first_name_id_hidden").val();

  // alert(pid);
  
  // $.ajax({
		// 			type: "POST",
		// 			url: baseurl+'loan/get_nominee_list',
		// 			async: false,
		// 			type: "POST",
		// 			data: "id="+pid,
		// 			dataType: "html",
		// 			success: function(response)
		// 			{
		// 				// alert(response);
		// 				$res=response.split('||');
		//                 $('#nominee').empty().append($res[0]);
		//                 $('#hl_bal').html($res[1]);
		// 			}
		// 			});
  
  $.ajax({
					type: "POST",
					url: baseurl+'loan/get_photo',
					async: false,
					type: "POST",
					data: "id="+pid,
					dataType: "html",
					success: function(response)
					{
						// alert(response);
						// if(response=='')
						// {
						// 	r='<img src="<?php echo base_url();?>assets/images/party.jpg" height="125px" width="125px" >';
						// }
						// else
						// {
						// 	r='<img src="'+response+'" height="125px" width="125px" >';
						// }
		                $('#party_photo').empty().append(response);
					}
					});
  $.ajax({
					type: "POST",
					url: baseurl+'loan/get_id_photo',
					async: false,
					type: "POST",
					data: "id="+pid,
					dataType: "html",
					success: function(response)
					{
						// alert(response);
						// if(response=='')
						// {
						// 	r='<img src="<?php echo base_url();?>assets/images/party.jpg" height="125px" width="125px" >';
						// }
						// else
						// {
						// 	r='<img src="'+response+'" height="125px" width="125px" >';
						// }
		                $('#id_photo').empty().append(response);
					}
					});
  $.ajax({
					type: "POST",
					url: baseurl+'loan/get_card_type',
					async: false,
					type: "POST",
					data: "id="+pid,
					dataType: "html",
					success: function(response)
					{
						
		                $('#card_type').html(response);
		                $('#pop_card_type').html(response);
					}
					});
});
$("#pledge_item").autocomplete({ 
	                valueKey:'title',
	                source:[{
	                //type: 'post',
	                url:baseurl+'loan/pledgedList?query=%QUERY%',
	                type:'remote',
	                ajax:{
	                  dataType : 'json',
	                }
	            }]}).on('selected.xdsoft',function(e,suggestion,ui){ 
	                $("#pledge_item").val(suggestion.itemname);
	                $('#pledge_item_id_hidden').val(suggestion.id);
	              
	        });

function check_card()
{
	var chk=$('#check_card_no').val();
	var no=$('#pop_member_card').html();
	
	if(no!="" && chk!="")
	{
	if(no==chk){
		// alert('matched');
		$('#verify_icon').html('<i class="fas fa-check-circle fs-5" style="color:green;"></i>');
		document.getElementById('btn_verify_popup').style.display='none';
	}
	else{
		// alert('not matched');
		$('#verify_icon').html('<i class="fas fa-times-circle fs-5" style="color:red;"></i>');
		document.getElementById('btn_verify_popup').style.display='block';	
	}	
	}
	else
	{
		alert("Enter Card no to Verify")
	}

}
function loan_interest()
{
	var int_grp=$('#int_grp').val();
	 $.ajax({
					type: "POST",
					url: baseurl+'loan/get_int_type_list',
					async: false,
					type: "POST",
					data: "group_name="+int_grp,
					dataType: "html",
					success: function(response)
					{
						// alert(response);
		                $('#int_type').empty().append(response);
		                // $('#expiry_dt').
					}
					});
}
function get_int_due_details()
{
	var int_grp=$('#int_grp').val();
	var int_type=$('#int_type').val();
	var loan_dt=$('#kt_datepicker_new_loan_date').val()
	// alert(loan_dt);
	$.ajax({
					type: "POST",
					url: baseurl+'loan/get_int_due_details?',
					async: false,
					type: "POST",
					data: "grp="+int_grp+"&itype="+int_type+"&loan_dt="+loan_dt,
					dataType: "html",
					success: function(response)
					{
						var res=response.split('||');
		                $('#expiry_dt').html(res[1]);
		                $('#m1_ex_dt').html(res[2]);
		                $('#m2_ex_dt').html(res[3]);
		                $('#m3_ex_dt').html(res[4]);
		                $('#int1').html(res[5]);
		                $('#int2').html(res[6]);
		                $('#int3').html(res[7]);
		                
					}	
					});
			var p_fname = $('#first_name').val();
			if(p_fname!="")
			{
				var pid = $('#first_name_id_hidden').val();
				var nid = $('#nominee').val();
				var jtype = $('#jewel_type').val();
				var int_grp = $('#int_grp').val();
				var int_sch=$('select[name=int_grp]').find(':selected').text();
				var int_type = $('#int_type').val();
				var int_per=$('select[name=int_type]').find(':selected').text();
				var jeweltype=$('select[name=jewel_type]').find(':selected').text();
				var loandate = $('#kt_datepicker_new_loan_date').val();
				var cmp = $('#company').val();
				$.ajax({
						type: "POST",
						url: baseurl+'loan/insert_master?',
						async: false,
						type: "POST",
						data: "int_grp="+int_grp+"&int_type="+int_type+"&cmp="+cmp+"&pid="+pid+"&nid="+nid+"&jtype="+jtype+"&loandate="+loandate+"&p_fname="+p_fname+"&int_sch="+int_sch+"&int_per="+int_per+"&jewel_type="+jeweltype,
						dataType: "html",
						success: function(response)
						{
							if(response==0)
							{
								$('#int_grp').prop('disabled',false);
								alert("Error in Bill_no");
								
							}
							else
							{
								res=response.split('||');
								// alert(res[1]);
								$('#bill_no').val(res[2]);
								$('#loan_no_display').html(res[2]);
								$('#p_bill_no').val(res[2]);
								$('#int_grp').prop('disabled',true);
							}
							
						}
						});
				
			}
			else
			{
				alert("Enter Party Name");
				document.getElementById("first_name").focus();
			}

}
	</script>
	
	<script>
		function first_nm_party()
		{
			var p_fname = $('#first_name').val();
			var p_lname = $('#last_name').val();
			var p_city = $('#city').val();
			var p_area = $('#area').val();
			var p_mob = $('#mobile').val();
			var p_addr = $('#address').val();
			if(p_fname == "")	
			{
				//alert("if");
				$('#first_name').val("");
				$('#last_name').val("");
				$('#city').val("");
				$('#area').val("");
				$('#mobile').val("");
				$('#address').val("");
			}
			// document.getElementById('btn_verify_popup').style.display="none";
		}
		function purity_percent()
		{
			var pure=$('#add_ptyname_new_loan').val();
			if(pure!='')
			{
				$('#add_ptyname_new_loan_err').html('')
			$.ajax({
					type: "POST",
					url: baseurl+'loan/get_purity_percent',
					async: false,
					type: "POST",
					data: "id="+pure,
					dataType: "html",
					success: function(response)
					{	
		                $('#purity_per').val(response.trim());
					}
					});
			}
			else
			{
				alert('Choose Purity');
				$('#add_ptyname_new_loan_err').html('Enter Purity')
			}
		}
	</script>
	

		<script >
		function add_pledge_it()
		{

			var p_item=$('#pledge_item').val();
			//$('select[name=pledge_item]').find(':selected').text();
			var p_description=$('#pl_description').val();
			var p_purity=$('select[name=add_ptyname_new_loan]').find(':selected').text();
			var p_pur =  $('select[name=add_ptyname_new_loan]').val();
			var p_pur_per=$('#purity_per').val();
			var p_weight=$('#weight_ple').val();
			var p_st_weight=$('#stone_weight').val();
			var p_less=$('#less_ple').val();
			var dmg;
			if(document.getElementById('is_damage').checked==true){dmg= 'Yes';}
			else {dmg='No';}

			
			// var net_weight=parseFloat(p_weight)-parseFloat(p_st_weight)-parseFloat(p_less);
			var net_weight=parseFloat((p_weight)-(p_st_weight)-(p_less)).toFixed(3);

		    var count=$('#add_pledge_item').val();
		    var cont = $("#tbody");
		    var dec=2;
		    var w,tw,t,t1,t2;

		    if ($('#pledge_item').val()=="" || $('#pl_description').val()=="" || $('select[name=add_ptyname_new_loan]').val()=="" ||  $('#purity_per').val()==""  || $('#weight_ple').val()=="" || $('#stone_weight').val()=="" || $('#less_ple').val()== "") 
		    {
		    	alert("Please Fill All Pledged Items.");
		    }
		    else
		    {
		    	if(count==0)
			    {
			    	var txt_area_data=$('#pl_loan_jewel_image_data').val();
			    	// alert(txt_area_data);
			    	if(txt_area_data!='')
			    	{
			    		var img_data='<div class="image-input mt-2 me-6" data-kt-image-input="true"><img src="'+txt_area_data+'" height="40" width="40"><textarea hidden="hidden" id="pledge_image_hidden0" name="pledge_image_hidden[]">'+txt_area_data+'</textarea>';
			    	}
			    	else
			    	{
			    		var img_data='<div class="image-input mt-2 me-6" data-kt-image-input="true"><div class="image-input-wrapper w-40px h-40px"style="background-image: url(<?php echo base_url();?>assets/images/jewel.jpg)"></div></div><textarea hidden="hidden" id="pledge_image_hidden0" name="pledge_image_hidden[]"></textarea>';
			    	}
			    	cont.empty().append('<tr class="chk_tr" id="tr_id'+count+'"><td id="td_id_1'+count+'">'+p_item+'<input type="hidden" id="pledge_item_hidden'+count+'" name="pledge_item_hidden[]" value="'+p_item+'"></td><td id="td_id_2'+count+'">'+p_description+'<input type="hidden" id="pledge_description_hidden'+count+'" name="pledge_description_hidden[]" value="'+p_description+'"> </td> <td id="td_id_3'+count+'">'+p_purity+'<input type="hidden" id="pledge_purity_hidden'+count+'" name="pledge_purity_hidden[]" value="'+p_purity+'"></td><td id="td_id_4'+count+'">'+p_pur_per+'<input type="hidden" id="pledge_purity_percent_hidden'+count+'" name="pledge_purity_percent_hidden[]" value="'+p_pur_per+'"></td> <td id="td_id_5'+count+'">'+p_weight+'<input type="hidden" id="pledge_weight_hidden'+count+'" name="pledge_weight_hidden[]" value="'+p_weight+'"></td><td id="td_id_6'+count+'">'+p_st_weight+'<input type="hidden" id="pledge_stone_weight_hidden'+count+'" name="pledge_stone_weight_hidden[]" value="'+p_st_weight+'"></td> <td  id="td_id_7'+count+'">'+p_less+'<input type="hidden" id="pledge_less_hidden'+count+'" name="pledge_less_hidden[]" value="'+p_less+'"></td><td id="td_id_8'+count+'">'+net_weight+'<input type="hidden" id="pledge_net_weight_hidden'+count+'" name="pledge_net_weight_hidden[]" value="'+net_weight+'"></td><td id="td_id_9'+count+'">'+dmg+'<input type="hidden" id="pledge_is_damage_hidden'+count+'" name="pledge_is_damage_hidden[]" value="'+dmg+'"></td><td id="td_id_10'+count+'">'+img_data+'</td> <td id="td_id_11'+count+'"><a href="javascript:;" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1" data-bs-toggle="modal" data-bs-target="#" onclick="edit_row('+count+','+p_pur+')"><span class="svg-icon svg-icon-3"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path opacity="0.3" d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z" fill="currentColor"></path><path d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z" fill="currentColor"></path></svg></span></a> <a href="#" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm" data-bs-toggle="modal" data-bs-target="#" onclick="remove_row('+count+');"><span class="svg-icon svg-icon-3"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z" fill="currentColor"></path><path opacity="0.5" d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z" fill="currentColor"></path><path opacity="0.5" d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z" fill="currentColor"></path></svg></span></a></td></tr>');
			    	
			    	$('#pledge_item').val("");
			    	$('#pl_description').val("");
			    	$('#purity_per').val("");
			    	$('#weight_ple').val("");
			    	$('#stone_weight').val("");
			    	$('#less_ple').val("");
			    	// $('#weight').val("");
			    	document.getElementById('is_damage').checked=false;
			    	$('#add_ptyname_new_loan').val("");
			    	$('#add_ptyname_new_loan').select2().val("");
			    	// $('#add_ptyname_new_loan').select2({
				    //     dropdownParent: $('#kt_modal_newloan')
				    // });
			    	//alert(p_weight);
			    	var pw = parseFloat(p_weight).toFixed('3');
			    	// $('#add_weight_new_loan').val(pw);
			    	$('#tot_pl_weight').html(parseFloat(p_weight).toFixed('3'));
			    	$('#weight').val(parseFloat(p_weight).toFixed('3'));
			    	$('#tot_stone_weight').html(parseFloat(p_st_weight).toFixed('3'));
			    	$('#stone_less').val(parseFloat(p_st_weight).toFixed('3'));
			    	$('#tot_less_weight').html(parseFloat(p_less).toFixed('3'));
			    	$('#less').val(parseFloat(p_less).toFixed('3'));
			    	$('#tot_net_weight').html(parseFloat(net_weight).toFixed('3'));
			    	$('#net_wt').val(parseFloat(net_weight).toFixed('3'));

					var cr=parseFloat( $('#current_rate').val());
					$('#cur_rate').val(parseFloat(cr).toFixed('3'));
					$('#add_qual_new_loan').val(p_pur_per);
					$('#total_purity_percent').html(p_pur_per);
					
					$('#quality').val(parseFloat(p_pur_per).toFixed('2'));
					// alert(cr);
					var tot=cr*(p_pur_per/100);
					// alert(tot);
					var tot_wt=parseFloat( tot*net_weight).toFixed(2);
					$('#grm_val').html(parseFloat(Math.round(tot)).toFixed(2));
					$('#grm_val_hidden').html(parseFloat(Math.round(tot)).toFixed(2));
					$('#grm_value').val(parseFloat(Math.round(tot)).toFixed(2));
					$('#sale_rate').html(Math.round(tot_wt));
					$('#sale_rate_hidden').html(Math.round(tot_wt));
					$('#sales_rate').val(Math.round(tot_wt));
					calculate1();
					// var pl_it=$('#pledge_item_hidden'+count).val();
					// alert(pl_it);
			    }
			    else
			    {
			    	var txt_area_data=$('#pl_loan_jewel_image_data').val();
			    	// alert(txt_area_data);
			    	if(txt_area_data!='')
			    	{
			    		var img_data='<div class="image-input mt-2 me-6" data-kt-image-input="true"><img src="'+txt_area_data+'" height="40" width="40"><textarea hidden="hidden" id="pledge_image_hidden'+count+'" name="pledge_image_hidden[]">'+txt_area_data+'</textarea>';
			    	}
			    	else
			    	{
			    		var img_data='<div class="image-input mt-2 me-6" data-kt-image-input="true"><div class="image-input-wrapper w-40px h-40px"style="background-image: url(<?php echo base_url();?>assets/images/jewel.jpg)"></div></div><textarea hidden="hidden" id="pledge_image_hidden0" name="pledge_image_hidden[]"></textarea>';
			    	}

			    	cont.append('<tr class="chk_tr" id="tr_id'+count+'"><td id="td_id_1'+count+'">'+p_item+'<input type="hidden" id="pledge_item_hidden'+count+'" name="pledge_item_hidden[]" value="'+p_item+'"></td><td id="td_id_2'+count+'">'+p_description+'<input type="hidden" id="pledge_description_hidden'+count+'" name="pledge_description_hidden[]" value="'+p_description+'"> </td> <td id="td_id_3'+count+'">'+p_purity+'<input type="hidden" id="pledge_purity_hidden'+count+'" name="pledge_purity_hidden[]" value="'+p_purity+'"></td><td id="td_id_4'+count+'">'+p_pur_per+'<input type="hidden" id="pledge_purity_percent_hidden'+count+'" name="pledge_purity_percent_hidden[]" value="'+p_pur_per+'"></td> <td id="td_id_5'+count+'">'+p_weight+'<input type="hidden" id="pledge_weight_hidden'+count+'" name="pledge_weight_hidden[]" value="'+p_weight+'"></td><td id="td_id_6'+count+'">'+p_st_weight+'<input type="hidden" id="pledge_stone_weight_hidden'+count+'" name="pledge_stone_weight_hidden[]" value="'+p_st_weight+'"></td> <td  id="td_id_7'+count+'">'+p_less+'<input type="hidden" id="pledge_less_hidden'+count+'" name="pledge_less_hidden[]" value="'+p_less+'"></td><td id="td_id_8'+count+'">'+net_weight+'<input type="hidden" id="pledge_net_weight_hidden'+count+'" name="pledge_net_weight_hidden[]" value="'+net_weight+'"></td><td id="td_id_9'+count+'">'+dmg+'<input type="hidden" id="pledge_is_damage_hidden'+count+'" name="pledge_is_damage_hidden[]" value="'+dmg+'"></td><td id="td_id_10'+count+'">'+img_data+'</td> <td id="td_id_11'+count+'"><a href="javascript:;" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1" data-bs-toggle="modal" data-bs-target="#"  onclick="edit_row('+count+','+p_pur+')"><span class="svg-icon svg-icon-3"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path opacity="0.3" d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z" fill="currentColor"></path><path d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z" fill="currentColor"></path></svg></span></a> <a href="#" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm" data-bs-toggle="modal" data-bs-target="#" onclick="remove_row('+count+');"><span class="svg-icon svg-icon-3"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z" fill="currentColor"></path><path opacity="0.5" d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z" fill="currentColor"></path><path opacity="0.5" d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z" fill="currentColor"></path></svg></span></a></td></tr>');

			    	$('#pledge_item').val("");
			    	$('#pl_description').val("");
			    	$('#purity_per').val("");
			    	$('#weight_ple').val("");
			    	$('#stone_weight').val("");
			    	$('#less_ple').val("");
			    	// $('#weight').val("");
			    	document.getElementById('is_damage').checked=false;
			    	$('#add_ptyname_new_loan').val("");
			    	$('#add_ptyname_new_loan').select2().val("");

			    	var t_pl_w=$('#tot_pl_weight').html();
			    	var t_pl_sw=$('#tot_stone_weight').html();
			    	var t_pl_lw=$('#tot_less_weight').html();
			    	var t_pl_nw=$('#tot_net_weight').html();

			    	t_pl_w=parseFloat(t_pl_w)+parseFloat(p_weight);
			    	t_pl_sw=parseFloat(t_pl_sw)+parseFloat(p_st_weight);
			    	t_pl_lw=parseFloat(t_pl_lw)+ parseFloat(p_less);
			    	t_pl_nw=parseFloat(t_pl_nw)+ parseFloat(net_weight);

			    	$('#tot_pl_weight').html(parseFloat(t_pl_w).toFixed('3'));
			    	$('#tot_stone_weight').html(parseFloat(t_pl_sw).toFixed('3'));
			    	$('#tot_less_weight').html(parseFloat(t_pl_lw).toFixed('3'));
			    	$('#tot_net_weight').html(parseFloat(t_pl_nw).toFixed('3'));

			    	$('#weight').val(parseFloat(t_pl_w).toFixed('3'));
						$('#stone_less').val(parseFloat(t_pl_sw).toFixed('3'));
						$('#less').val(parseFloat(t_pl_lw).toFixed('3'));
						$('#net_wt').val(parseFloat(t_pl_nw).toFixed('3'));

			  		var cr=parseFloat( $('#current_rate').val());
			  		$('#cur_rate').val(parseFloat(cr).toFixed('3'));
					var prev_pur= $('#add_qual_new_loan').val();
					// alert(prev_pur);
					
					// alert(tot_pur);
					
					if(prev_pur==0)
					{
						var pur=p_pur_per;
					}
					else
					{
						var tot_pur= (parseFloat(prev_pur)*Number(count)) + parseFloat(p_pur_per);
						var div=(Number(count)+1);
						var pur=parseFloat(tot_pur/div).toFixed('2');
					}
					// alert(pur);
					$('#add_qual_new_loan').val(pur);
					$('#total_purity_percent').html(pur);
					$('#quality').val(parseFloat(pur).toFixed('2'));
					var tot=cr*(pur/100);
					var tot_wt=tot*t_pl_nw;
					
					$('#grm_val').html(parseFloat(Math.round(tot)).toFixed(2));
					$('#grm_val_hidden').html(parseFloat(Math.round(tot)).toFixed(2));
					$('#grm_value').val(parseFloat(Math.round(tot)).toFixed(2));
					$('#sale_rate').html(Math.round(tot_wt));
					$('#sale_rate_hidden').html(Math.round(tot_wt));
					$('#sales_rate').val(Math.round(tot_wt));
					calculate1();
			    }
			     count=Number(count)+1;
			     $('#add_ptyname_new_loan').val("");
			    $('#add_ptyname_new_loan').select2().val("");
			    //count=1;
			    $('#add_pledge_item').val(count);
			    $('#delete_pledge_item').val(count);
		    }
		}
	</script>
	<script type="text/javascript">
		function remove_row(t)
		{
			var cont = $("#tbody");
			var count=$('#delete_pledge_item').val();

			var p_pur=$('#td_id_4'+t).text();
			var p_weight=$('#td_id_5'+t).text();
			var p_st_weight=$('#td_id_6'+t).text();
			var p_less=$('#td_id_7'+t).text();
			var net_weight=$('#td_id_8'+t).text();

			var t_pl_w=$('#tot_pl_weight').html();
	    	var t_pl_sw=$('#tot_stone_weight').html();
	    	var t_pl_lw=$('#tot_less_weight').html();
	    	var t_pl_nw=$('#tot_net_weight').html();

	  
	    	t_pl_w=parseFloat(t_pl_w)-parseFloat(p_weight);
	    	t_pl_sw=parseFloat(t_pl_sw)-parseFloat(p_st_weight);
	    	t_pl_lw=parseFloat(t_pl_lw)- parseFloat(p_less);
	    	t_pl_nw=parseFloat(t_pl_nw)- parseFloat(net_weight);

	    	$('#tot_pl_weight').html(parseFloat(t_pl_w).toFixed('3'));
	    	$('#tot_stone_weight').html(parseFloat(t_pl_sw).toFixed('3'));
	    	$('#tot_less_weight').html(parseFloat(t_pl_lw).toFixed('3'));
	    	$('#tot_net_weight').html(parseFloat(t_pl_nw).toFixed('3'));

	    	$('#weight').val(parseFloat(t_pl_w).toFixed('3'));
				$('#stone_less').val(parseFloat(t_pl_sw).toFixed('3'));
				$('#less').val(parseFloat(t_pl_lw).toFixed('3'));
				$('#net_wt').val(parseFloat(t_pl_nw).toFixed('3'));

	    	var cr=parseFloat( $('#current_rate').val());
	    	$('#cur_rate').val(parseFloat(cr).toFixed('3'));
			var prev_pur= $('#add_qual_new_loan').val();
			var pur_cal= parseFloat(prev_pur*count)-parseFloat(p_pur);
			var div=Number(count)-1;
			// alert(div);
			if(div>0)
			{
			var t1=pur_cal/div;
			}
			else
			{
				var t1=0;	
			}
			// alert(t1);
			var tot_pur=parseFloat(t1).toFixed('2');
			// alert(tot_pur);
			// var tot_pur= parseFloat(prev_pur) + parseFloat(p_pur_per);
			// var div=Number(count)+1;
			// var pur=parseFloat(tot_pur/div);
			$('#add_qual_new_loan').val(tot_pur);
			$('#total_purity_percent').html(tot_pur);
			$('#quality').val(parseFloat(tot_pur).toFixed('2'));
			var tot=cr*(tot_pur/100);
			var tot_wt=parseFloat( tot*t_pl_nw).toFixed(2);
			$('#grm_val').html(parseFloat(Math.round(tot)).toFixed(2));
			$('#grm_val_hidden').html(parseFloat(Math.round(tot)).toFixed(2));
			$('#grm_value').val(parseFloat(Math.round(tot)).toFixed(2));
			$('#sale_rate').html(Math.round(tot_wt));
			$('#sale_rate_hidden').html(Math.round(tot_wt));
			$('#sales_rate').val(Math.round(tot_wt));
			calculate1();

			$('#tr_id'+t).remove();
			 count=Number(count)-1;
		    // $('#add_pledge_item').val(count);
		    $('#delete_pledge_item').val(count);
		}
	</script>
	<script type="text/javascript">
		function edit_row(t,p)
		{
			var cont = $("#tbody");
			var count=$('#delete_pledge_item').val();

			var p_name=$('#td_id_1'+t).text();
			var p_desc=$('#td_id_2'+t).text();
			var p_qlty=$('#td_id_3'+t).text();
			var p_pur=$('#td_id_4'+t).text();
			var p_weight=$('#td_id_5'+t).text();
			var p_st_weight=$('#td_id_6'+t).text();
			var p_less=$('#td_id_7'+t).text();
			var net_weight=$('#td_id_8'+t).text();
			var is_dam=$('#td_id_9'+t).text();

			// alert(p_name);
			// alert(p_desc);
			// alert(p_qlty);
			// alert(p_pur);
			// alert(p_weight);

			var t_pl_w=$('#tot_pl_weight').html();
	    	var t_pl_sw=$('#tot_stone_weight').html();
	    	var t_pl_lw=$('#tot_less_weight').html();
	    	var t_pl_nw=$('#tot_net_weight').html();

	  		
	    	t_pl_w=parseFloat(t_pl_w)-parseFloat(p_weight);
	    	t_pl_sw=parseFloat(t_pl_sw)-parseFloat(p_st_weight);
	    	t_pl_lw=parseFloat(t_pl_lw)- parseFloat(p_less);
	    	t_pl_nw=parseFloat(t_pl_nw)- parseFloat(net_weight);

	    	$('#tot_pl_weight').html(parseFloat(t_pl_w).toFixed('3'));
	    	$('#tot_stone_weight').html(parseFloat(t_pl_sw).toFixed('3'));
	    	$('#tot_less_weight').html(parseFloat(t_pl_lw).toFixed('3'));
	    	$('#tot_net_weight').html(parseFloat(t_pl_nw).toFixed('3'));

	    	$('#weight').val(parseFloat(t_pl_w).toFixed('3'));
				$('#stone_less').val(parseFloat(t_pl_sw).toFixed('3'));
				$('#less').val(parseFloat(t_pl_lw).toFixed('3'));
				$('#net_wt').val(parseFloat(t_pl_nw).toFixed('3'));

	    	var cr=parseFloat( $('#current_rate').val());
	    	$('#cur_rate').val(parseFloat(cr).toFixed('3'));
			var prev_pur= $('#add_qual_new_loan').val();
			if(prev_pur!=0){
			var pur_cal= parseFloat(prev_pur*count)-parseFloat(p_pur);
			}
			
			if(pur_cal==0){
				var tot_pur=0;
			}
			else
			{
				var div=Number(count)-1;
				var tot_pur=parseFloat(pur_cal/div).toFixed(2);
			}
			// var tot_pur= parseFloat(prev_pur) + parseFloat(p_pur_per);
			// var div=Number(count)+1;
			// var pur=parseFloat(tot_pur/div);
			$('#add_qual_new_loan').val(tot_pur);
			$('#total_purity_percent').html(tot_pur);
			$('#quality').val(parseFloat(tot_pur).toFixed('2'));
			var tot=cr*(tot_pur/100);
			var tot_wt=parseFloat( tot*t_pl_nw).toFixed(2);
			$('#grm_val').html(parseFloat(Math.round(tot)).toFixed(2));
			$('#grm_val_hidden').html(parseFloat(Math.round(tot)).toFixed(2));
			$('#grm_value').val(parseFloat(Math.round(tot)).toFixed(2));
			$('#sale_rate').html(Math.round(tot_wt));
			$('#sale_rate_hidden').html(Math.round(tot_wt));
			$('#sales_rate').val(Math.round(tot_wt));
			calculate1();
			$('#tr_id'+t).remove();


			$('#pledge_item').val(p_name);
	  		$('#pl_description').val(p_desc);
	  		$('#purity_per').val(p_pur);
	  		$('#weight_ple').val(p_weight);
	  		$('#stone_weight').val(p_st_weight);
	  		$('#less_ple').val(p_less);
	  		$('#add_ptyname_new_loan').val(p).select2();

	  		if(is_dam=='Yes')
	  		{
			 	document.getElementById('is_damage').checked=true;
	  		}
	  		else
	  		{
	  			document.getElementById('is_damage').checked=false;
	  		}
	  		count=Number(count)-1;
		    // $('#add_pledge_item').val(count);
		    $('#delete_pledge_item').val(count);
		}
	</script>
	<script type="text/javascript">
		function ple_calculation()
		{
			var dec = 2;
			var t_pl_w=$('#tot_pl_weight').html();
	    	var t_pl_sw=$('#tot_stone_weight').html();
	    	var t_pl_lw=$('#tot_less_weight').html();
	    	var t_pl_nw=$('#tot_net_weight').html();
	    	
			// var tot = w - st_ls - ls;
			// var tot1 = crt * (qly/100);
			// var tot2 = tot1 * nw;

			// var tot1_fin = Math.round(tot1 * Math.pow(10, dec)) / Math.pow(10, dec);
			// tot1_fin = parseFloat(tot1_fin).toFixed('2');
			// $('#add_gvalue_new_loan').val(tot1_fin);

			// var tot2_fin = Math.round(tot2);
			// //tot2_fin = parseFloat(tot2_fin).toFixed('2');
			// $('#add_slrate_new_loan').val(tot2_fin);

		 //    var fin = Math.round(tot * Math.pow(10, dec)) / Math.pow(10, dec);
		 //    fin = parseFloat(fin).toFixed('3');
		 //   	$("#add_ntweight_new_loan").val(fin);

		}
	</script>
	<script type="text/javascript">
		function sanction_loan()
		{
			if(document.getElementById('check_send_loan').checked==true)
			{
				document.getElementById('save_changes_add_new_loan').style.display="block";
			}
			else
			{
				document.getElementById('save_changes_add_new_loan').style.display="none";
			}
		}
	</script>
	<script >

	function loan_validation()
	{
		var err=0;
		var fn= $('#first_name').val();
		
		if(fn=="")
		{
			$('#first_name_err').html('Enter Party name');
			err++;
			document.getElementById('check_send_loan').checked=false;
			document.getElementById('save_changes_add_new_loan').style.display="none";
			document.getElementById("first_name").focus();

		}
		else
		{
			$('#first_name_err').html('');
			var len=$('.chk_tr').length;
		
			// alert(len);
			if(len<=0)
			{
				err++;
				alert("Enter Pledge Item");
				document.getElementById('check_send_loan').checked=false;
				document.getElementById('save_changes_add_new_loan').style.display="none";
				document.getElementById('pledge_item').focus();
			}	
			else
			{
				var total_charges=$('#total_charges').html();

				if((document.getElementById('charges_loan_amt').checked==false) && (document.getElementById('charges_pay_separate').checked==false) && total_charges>0)
				{
					alert("Select Payment method for charges");
					err++;
				}

				
				
				var hl=$('#on_account').val();
				if(hl>0)
				{
					if((document.getElementById('on_acc_loan_pay').checked==false) && (document.getElementById('on_acc_pay_separate').checked==false)  && hl>0)
					{
						alert("Select Payment method for HL Transaction");
						err++;
					}
				}
			}

				var tc=$('#total_charges').html();
				var ch_fl=parseFloat($('#charges_loan_pay_amt').val());
				var ch_ps=parseFloat($('#charges_pay_separate_amt').val());
				var sum=ch_ps+ch_fl;
				
				if(tc>sum)
				{
					alert('Enter value equal to Total charges');
					// $('#charges_loan_pay_amt').val('');
					// $('#charges_pay_separate_amt').val('')
					document.getElementById('charges_loan_pay_amt').focus();
					
				}

				var tc=parseFloat($('#on_account').val());
				var ch_fl=parseFloat($('#on_acc_loan_pay_amt').val());
				var ch_ps=parseFloat($('#on_acc_pay_separate_amt').val());
				var sum=ch_ps+ch_fl;

				if(tc<sum)
				{
					alert('Enter value  equal to Total On Account');
					// $('#on_acc_loan_pay_amt').val('');
					// $('#on_acc_pay_separate_amt').val('')
					document.getElementById('on_acc_loan_pay_amt').focus();
				}

			
		}

		
		if(err>0){return false;}else{return true;}
	}
	</script>
	<script>
			function cash_ln_recev_add_radio()
			{
				var cash_loan_received_add_radio = document.getElementById("cash_loan_received_add_radio");

				var cash_label = document.getElementById("cash_label");
				var cash_label_tbox = document.getElementById("cash_label_tbox");
				var cash_detail_tbox = document.getElementById("cash_detail_tbox");

				if (cash_loan_received_add_radio.checked)
				{
				    cash_label.style.display = "block";
				    cash_label_tbox.style.display = "block";
				    cash_detail_tbox.style.display = "block";
			  	} else 
			  	{
			  		cash_label.style.display = "none";
			  		cash_label_tbox.style.display = "none";
			  		cash_detail_tbox.style.display = "none";
			  	}
			};

			function cheque_ln_recev_add_radio()
			{
				var cheque_loan_received_add_radio = document.getElementById("cheque_loan_received_add_radio");

				var cheque_amt = document.getElementById("cheque_amt");
				var cheque_amt_tbox = document.getElementById("cheque_amt_tbox");
				// var cheque_bank = document.getElementById("cheque_bank");
				var cheque_bank_tbox = document.getElementById("cheque_bank_tbox");
				// var cheque_chq_no = document.getElementById("cheque_chq_no");
				var cheque_chq_no_tbox = document.getElementById("cheque_chq_no_tbox");
				// var cheque_detail = document.getElementById("cheque_detail");
				var cheque_detail_tbox = document.getElementById("cheque_detail_tbox");

				if (cheque_loan_received_add_radio.checked)
				{
				    cheque_amt.style.display = "block";
				    cheque_amt_tbox.style.display = "block";
				    // cheque_bank.style.display = "block";
				    cheque_bank_tbox.style.display = "block";
				    // cheque_chq_no.style.display = "block";
				    cheque_chq_no_tbox.style.display = "block";
				    // cheque_detail.style.display = "block";
				    cheque_detail_tbox.style.display = "block";
			  	} else 
			  	{
			     	cheque_amt.style.display = "none";
				    cheque_amt_tbox.style.display = "none";
				    // cheque_bank.style.display = "none";
				    cheque_bank_tbox.style.display = "none";
				    // cheque_chq_no.style.display = "none";
				    cheque_chq_no_tbox.style.display = "none";
				    // cheque_detail.style.display = "none";
				    cheque_detail_tbox.style.display = "none";
			  	}
			};

			function rtgs_ln_recev_add_radio()
			{
				var rtgs_loan_received_add_radio = document.getElementById("rtgs_loan_received_add_radio");

				var rtgs_amt = document.getElementById("rtgs_amt");
				var rtgs_amt_tbox = document.getElementById("rtgs_amt_tbox");
				// var rtgs_bank = document.getElementById("rtgs_bank");
				var rtgs_bank_tbox = document.getElementById("rtgs_bank_tbox");
				// var rtgs_no = document.getElementById("rtgs_no");
				var rtgs_no_tbox = document.getElementById("rtgs_no_tbox");
				// var rtgs_detail = document.getElementById("rtgs_detail");
				var rtgs_detail_tbox = document.getElementById("rtgs_detail_tbox");

				if (rtgs_loan_received_add_radio.checked == true)
				{
				    rtgs_amt.style.display = "block";
				    rtgs_amt_tbox.style.display = "block";
				    // rtgs_bank.style.display = "block";
				    rtgs_bank_tbox.style.display = "block";
				    // rtgs_no.style.display = "block";
				    rtgs_no_tbox.style.display = "block";
				    // rtgs_detail.style.display = "block";
				    rtgs_detail_tbox.style.display = "block";
			  	} else 
			  	{
			     	rtgs_amt.style.display = "none";
				    rtgs_amt_tbox.style.display = "none";
				    // rtgs_bank.style.display = "none";
				    rtgs_bank_tbox.style.display = "none";
				    // rtgs_no.style.display = "none";
				    rtgs_no_tbox.style.display = "none";
				    // rtgs_detail.style.display = "none";
				    rtgs_detail_tbox.style.display = "none";
			  	}
			};

			function upi_ln_recev_add_radio()
			{
				var upi_loan_received_add_radio = document.getElementById("upi_loan_received_add_radio");

				var upi_amt = document.getElementById("upi_amt");
				var upi_amt_tbox = document.getElementById("upi_amt_tbox");
				// var upi_trans_no = document.getElementById("upi_trans_no");
				var upi_trans_no_tbox = document.getElementById("upi_trans_no_tbox");
				var upi_bank_tbox = document.getElementById("upi_bank_tbox");
				var upi_detail_tbox = document.getElementById("upi_detail_tbox");

				if (upi_loan_received_add_radio.checked == true)
				{
				    upi_amt.style.display = "block";
				    upi_amt_tbox.style.display = "block";
				    // upi_trans_no.style.display = "block";
				    upi_trans_no_tbox.style.display = "block";
				    upi_bank_tbox.style.display = "block";
				    upi_detail_tbox.style.display = "block";
			  	} else 
			  	{
			     	upi_amt.style.display = "none";
				    upi_amt_tbox.style.display = "none";
				    // upi_trans_no.style.display = "none";
				    upi_trans_no_tbox.style.display = "none";
				    upi_bank_tbox.style.display = "none";
				    upi_detail_tbox.style.display = "none";
			  	}
			}
			function mem_card_ln_recev_add_radio()
			{
				var mem_card_loan_received_add_radio = document.getElementById("mem_card_loan_received_add_radio");
				var mem_card_no = document.getElementById("lbl_mem_card_no_pop");
				var mem_card_no_tbox = document.getElementById("mem_card_no_tbox");
				// var mem_card_trans_no = document.getElementById("mem_card_trans_no");
				var mem_card_avail_points_tbox = document.getElementById("mem_card_avail_points_tbox");
				var mem_card_redeem_tbox = document.getElementById("mem_card_redeem_tbox");
				var mem_card_details_tbox = document.getElementById("mem_card_details_tbox");

				if (mem_card_loan_received_add_radio.checked == true)
				{
				    mem_card_no.style.display = "block";
				    mem_card_no_tbox.style.display = "block";
				    mem_card_avail_points_tbox.style.display = "block";
				    mem_card_redeem_tbox.style.display = "block";
				    mem_card_details_tbox.style.display = "block";
			  	} else 
			  	{
			     	mem_card_no.style.display = "none";
				    mem_card_no_tbox.style.display = "none";
				    mem_card_avail_points_tbox.style.display = "none";
				    mem_card_redeem_tbox.style.display = "none";
				    mem_card_details_tbox.style.display = "none";
			  	}
			}

			// function chit_ln_recev_add_radio()
			// {
			// 	var chit_cus_close_paid_from_party_add_radio = document.getElementById("chit_cus_close_paid_from_party_add_radio");
			// 	var cus_cl_sch_paid_from_pty = document.getElementById("cus_cl_sch_paid_from_pty");
			// 	var cus_cl_sch_paid_from_pty_tbox = document.getElementById("cus_cl_sch_paid_from_pty_tbox");
			// 	var cus_cl_avai_bal_paid_from_pty = document.getElementById("cus_cl_avai_bal_paid_from_pty");
			// 	var cus_cl_redeem_amt_paid_from_pty_tbox = document.getElementById("cus_cl_redeem_amt_paid_from_pty_tbox");
			// 	var cus_cl_redeem_detail_paid_from_pty_tbox = document.getElementById("cus_cl_redeem_detail_paid_from_pty_tbox");

			// 	if (chit_cus_close_paid_from_party_add_radio.checked == true)
			// 	{
			// 	    cus_cl_sch_paid_from_pty.style.display = "block";
			// 	    cus_cl_sch_paid_from_pty_tbox.style.display = "block";
			// 	    cus_cl_avai_bal_paid_from_pty.style.display = "block";
			// 	    cus_cl_redeem_amt_paid_from_pty_tbox.style.display = "block";
			// 	    cus_cl_redeem_detail_paid_from_pty_tbox.style.display = "block";
			//   	} else 
			//   	{
			//      	cus_cl_sch_paid_from_pty.style.display = "none";
			// 	    cus_cl_sch_paid_from_pty_tbox.style.display = "none";
			// 	    cus_cl_avai_bal_paid_from_pty.style.display = "none";
			// 	    cus_cl_redeem_amt_paid_from_pty_tbox.style.display = "none";
			// 	    cus_cl_redeem_detail_paid_from_pty_tbox.style.display = "none";
			//   	}
			// }
		</script>
		<!-- Received From Party in Total Charges End -->
		<!-- Payment Now From Party Start -->
		<script>
			function cash_ln_paynow_add_radio()
			{
				var cash_loan_paynow_add_radio = document.getElementById("cash_loan_paynow_add_radio");

				var cash_label_ln_pay = document.getElementById("cash_label_ln_pay");
				var cash_label_ln_pay_tbox = document.getElementById("cash_label_ln_pay_tbox");
				var cash_detail_ln_pay_tbox = document.getElementById("cash_detail_ln_pay_tbox");

				if (cash_loan_paynow_add_radio.checked)
				{
				    cash_label_ln_pay.style.display = "block";
				    cash_label_ln_pay_tbox.style.display = "block";
				    cash_detail_ln_pay_tbox.style.display = "block";
			  	} else 
			  	{
			  		cash_label_ln_pay.style.display = "none";
			  		cash_label_ln_pay_tbox.style.display = "none";
			  		cash_detail_ln_pay_tbox.style.display = "none";
			  	}
			};

			function cheque_ln_paynow_add_radio()
			{
				var cheque_loan_paynow_add_radio = document.getElementById("cheque_loan_paynow_add_radio");

				var cheque_label_ln_pay = document.getElementById("cheque_label_ln_pay");
				var cheque_amt_ln_pay_tbox = document.getElementById("cheque_amt_ln_pay_tbox");
				var cheque_no_ln_pay_tbox = document.getElementById("cheque_no_ln_pay_tbox");
				var cheque_com_bank_ln_pay_tbox = document.getElementById("cheque_com_bank_ln_pay_tbox");
				var cheque_par_bank_ln_pay_tbox = document.getElementById("cheque_par_bank_ln_pay_tbox");
				var cheque_detail_ln_pay_tbox = document.getElementById("cheque_detail_ln_pay_tbox");

				if (cheque_loan_paynow_add_radio.checked)
				{
				    cheque_label_ln_pay.style.display = "block";
				    cheque_amt_ln_pay_tbox.style.display = "block";
				    cheque_no_ln_pay_tbox.style.display = "block";
				    cheque_com_bank_ln_pay_tbox.style.display = "block";
				    cheque_par_bank_ln_pay_tbox.style.display = "block";
				    cheque_detail_ln_pay_tbox.style.display = "block";
			  	} else 
			  	{
			     	cheque_label_ln_pay.style.display = "none";
				    cheque_amt_ln_pay_tbox.style.display = "none";
				    cheque_no_ln_pay_tbox.style.display = "none";
				    cheque_com_bank_ln_pay_tbox.style.display = "none";
				    cheque_par_bank_ln_pay_tbox.style.display = "none";
				    cheque_detail_ln_pay_tbox.style.display = "none";
			  	}
			};

			function rtgs_ln_paynow_add_radio()
			{
				var rtgs_loan_paynow_add_radio = document.getElementById("rtgs_loan_paynow_add_radio");

				var rtgs_label_ln_pay = document.getElementById("rtgs_label_ln_pay");
				var rtgs_amt_ln_pay_tbox = document.getElementById("rtgs_amt_ln_pay_tbox");
				var rtgs_ref_ln_pay_tbox = document.getElementById("rtgs_ref_ln_pay_tbox");
				var rtgs_com_bank_ln_pay_tbox = document.getElementById("rtgs_com_bank_ln_pay_tbox");
				var rtgs_par_bank_ln_pay_tbox = document.getElementById("rtgs_par_bank_ln_pay_tbox");
				var rtgs_detail_ln_pay_tbox = document.getElementById("rtgs_detail_ln_pay_tbox");

				if (rtgs_loan_paynow_add_radio.checked == true)
				{
				    rtgs_label_ln_pay.style.display = "block";
				    rtgs_amt_ln_pay_tbox.style.display = "block";
				    rtgs_ref_ln_pay_tbox.style.display = "block";
				    rtgs_com_bank_ln_pay_tbox.style.display = "block";
				    rtgs_par_bank_ln_pay_tbox.style.display = "block";
				    rtgs_detail_ln_pay_tbox.style.display = "block";
			  	} else 
			  	{
			     	rtgs_label_ln_pay.style.display = "none";
				    rtgs_amt_ln_pay_tbox.style.display = "none";
				   	rtgs_ref_ln_pay_tbox.style.display = "none";
				    rtgs_com_bank_ln_pay_tbox.style.display = "none";
				    rtgs_par_bank_ln_pay_tbox.style.display = "none";
				    rtgs_detail_ln_pay_tbox.style.display = "none";
			  	}
			};

			function upi_ln_paynow_add_radio()
			{
				var upi_loan_paynow_add_radio = document.getElementById("upi_loan_paynow_add_radio");

				var upi_label_ln_pay = document.getElementById("upi_label_ln_pay");
				var upi_amt_ln_pay_tbox = document.getElementById("upi_amt_ln_pay_tbox");
				var upi_ref_ln_pay_tbox = document.getElementById("upi_ref_ln_pay_tbox");
				var upi_com_bank_ln_pay_tbox = document.getElementById("upi_com_bank_ln_pay_tbox");
				var upi_par_bank_ln_pay_tbox = document.getElementById("upi_par_bank_ln_pay_tbox");
				var upi_detail_ln_pay_tbox = document.getElementById("upi_detail_ln_pay_tbox");

				if (upi_loan_paynow_add_radio.checked == true)
				{
				    upi_label_ln_pay.style.display = "block";
				    upi_amt_ln_pay_tbox.style.display = "block";
				    upi_ref_ln_pay_tbox.style.display = "block";
				    upi_com_bank_ln_pay_tbox.style.display = "block";
				    upi_par_bank_ln_pay_tbox.style.display = "block";
				    upi_detail_ln_pay_tbox.style.display = "block";
			  	} else 
			  	{
			     	upi_label_ln_pay.style.display = "none";
				    upi_amt_ln_pay_tbox.style.display = "none";
				    upi_ref_ln_pay_tbox.style.display = "none";
				    upi_com_bank_ln_pay_tbox.style.display = "none";
				    upi_par_bank_ln_pay_tbox.style.display = "none";
				    upi_detail_ln_pay_tbox.style.display = "none";
			  	}
			};
		</script>
		<script>
			function calc_interest()
			{
				var int_per_val=$('#int_type').val();
				var cmp=$('#company').val();
				var jt=$('#jewel_type').val();
				var int_grp=$('#int_grp').val();
				var int_per=$('select[name=int_type]').find(':selected').text();

				var loan_amt=$('#loan_amount').val();
				if(cmp=="") 
				{
					alert("Select Company");
					document.getElementById('company').focus();
					$('#loan_amount').val('');
				}
				else
				{
					if(jt=="")
					{
						alert("Select Jewel Type");
						document.getElementById('jewel_type').focus();
						$('#loan_amount').val('');
					}
					else
					{
						if(int_grp=="")
						{
							alert("Select Interest Scheme");
							document.getElementById('int_grp').focus();
							$('#loan_amount').val('');
						}
						else
						{
							if(int_per_val=="") 
							{
								alert("Choose Interest Type first");
								document.getElementById('int_type').focus();
								$('#loan_amount').val('');
								// int_per=0;	
							}
							// alert(int_per);
							else
							{
								var sale_rate=parseFloat($('#sale_rate').html());
								var max_amt=sale_rate*(95/100);

								if(loan_amt>max_amt)
								{
										alert("Amount exceeded Enter amount less than 95% of sale value "+parseFloat(max_amt).toFixed(2));
										document.getElementById('loan_amount').focus();
										$('#loan_amount').val('');
								}	
								else
								{

								
										var m_interest=parseFloat(loan_amt)*parseFloat(int_per/100);
										$('#monthly_interest').html(m_interest.toFixed(2));
										var d_l_amt=parseFloat(loan_amt).toFixed(2);
										$('#span_loan_amount').html(d_l_amt);
										$('#span_net_pay').html(d_l_amt);
										$('#lbl_net_pay').html(d_l_amt);
										$('#lbl_bal_amt').html(d_l_amt);

										// lbl_net_pay
										$.ajax({
											type: "POST",
											url: baseurl+'loan/get_document_charge?',
											async: false,
											type: "POST",
											data: "ln_amt="+loan_amt,
											dataType: "html",
											success: function(response)
											{	
												res=response.split('||');
												$('#doc_charge').html(res[1]);
								                $('#doc_charge_hidden').val(res[1]);
								                var dc_amt=parseFloat(res[1]);
								                var pc=parseFloat( $('#processing_charge').val());
								                var tot=dc_amt+pc;
								                $('#total_charges').html(tot);
								                // var fc=tot+
								                $('#final_charges').html(tot);
								                $('#lbl_tot_to_rcv').html(tot);
								                $('#tot_to_receive').val(tot);
								                $('#m_points_ad').val(res[2]);
											}
											});


									}
							}
						}
					}
				}
			}
			function calc_charges()
			{
                // $('#doc_charge_hidden').val(response);
                var dc_amt=parseFloat($('#doc_charge').html());
                var pc=parseFloat( $('#processing_charge').val());
                var tot=dc_amt+pc;
                $('#total_charges').html(tot);
                $('#final_charges').html(tot);
                $('#lbl_tot_to_rcv').html(tot);
			}
				function calc_net_wght_display()
		{
			var wght=parseFloat($('#weight_ple').val());
			var st_wght=parseFloat($('#stone_weight').val());
			var le_wght=parseFloat($('#less_ple').val());
			// alert(wght);
			var res=parseFloat(wght-st_wght-le_wght).toFixed(2);
			$('#lbl_nt_wgt').html(res);
		}
			function enable_on_acc_pay()
			{
				var tc_amt=parseFloat($('#total_charges').html());
                var oc=parseFloat( $('#on_account').val());
                if(oc>0)
				{
					document.getElementById("div_on_account_pay").style.display="block";
				}
				else
				{
					document.getElementById("div_on_account_pay").style.display="none";
					document.getElementById('lbl_on_acc_loan_pay_amt').style.display="none";
					document.getElementById('on_acc_loan_pay_amt').style.display="none";
					$('#on_acc_loan_pay_amt').val('');
					document.getElementById('lbl_on_acc_pay_separate_amt').style.display="none";
					document.getElementById('on_acc_pay_separate_amt').style.display="none";
					$('#on_acc_pay_separate_amt').val('');

				}
                var tot=tc_amt+oc;
				$('#final_charges').html(tot);
				$('#lbl_tot_to_rcv').html(tot);
			}
			function receive_button_display()
			{
				if((document.getElementById('charges_pay_separate').checked==true)|| (document.getElementById('on_acc_pay_separate').checked==true))
				{
					document.getElementById('btn_receive_payment').style.display="block";
				}
				else if((document.getElementById('charges_loan_amt').checked==false) && (document.getElementById('on_acc_loan_pay').checked==false))
				{	
					document.getElementById('btn_receive_payment').style.display="none";
				}
			}
		</script>
		<script >
			function set_customer_rating()
			{
				// alert("hi")
				
				var pid=$('#first_name_id_hidden').val();
				// alert(r);
				if(pid=="")
				{
					alert("Enter Party name");
					// $('#cust_rating').val("");
					document.getElementById("first_name").focus();
				}
				else
				{
					var r=$('#cust_rating').val();
				$.ajax({
					type: "POST",
					url: baseurl+'loan/set_customer_rating?',
					async: false,
					type: "POST",
					data: "val="+r+"&id="+pid,
					dataType: "html",
					success: function(response)
					{	
		                alert('Rating updated');
					}
					});
				}

			}
		</script>
		<script >
		function pay_to_party()
		{
			var cash_loan_paynow_add_radio = document.getElementById("cash_loan_paynow_add_radio");
			var cheque_loan_paynow_add_radio = document.getElementById("cheque_loan_paynow_add_radio");
			var rtgs_loan_paynow_add_radio = document.getElementById("rtgs_loan_paynow_add_radio");
			var upi_loan_paynow_add_radio = document.getElementById("upi_loan_paynow_add_radio");
			var tot_to_rec=parseFloat($('#lbl_net_pay').html());
			// alert(tot_to_rec);
			var cash_status=0;
			var chq_status=0;
			var rtgs_status=0;
			var upi_status=0;

			var bal=parseFloat($('#lbl_bal_amt').html());
			if(bal!=0)
			{
				alert("Still balance amount exists");
				document.getElementById('btn_pay').style.display="block";
			}
			else
			{

				if(cash_loan_paynow_add_radio.checked)
				{
					var pay_type='Cash';
					var pay_amt=parseFloat($('#pay_to_party_cash').val());
					var pay_amt1=parseFloat($('#pay_to_party_cheque_amount').val());
					var pay_amt2=parseFloat($('#pay_to_party_rtgs_amount').val());
					var pay_amt3=parseFloat($('#pay_to_party_upi_amount').val());
					var pay_details=$('#pay_to_party_cash_details').val();
					var p_bank='';
					var ref_no='';
					var c_bank='';
					var p_bill_no=$('#p_bill_no').val();
					var p_pid=$('#p_pid').val();
	     			
	     			var datastring="pay_type="+pay_type+"&pay_amt="+pay_amt+"&pay_details="+pay_details+"&p_bank="+p_bank+"&ref_no="+ref_no+"&c_bank="+c_bank+"&p_bill_no="+p_bill_no+"&p_pid="+p_pid;
	     			var tot=pay_amt+pay_amt1+pay_amt2+pay_amt3;
	     			if(tot==tot_to_rec)
						$('#lbl_bal_amt').html("0");
	     			if(tot>tot_to_rec)
	     			{
	     				alert("Enter value less than total amount");
	     				document.getElementById('pay_to_party_cash').focus();
	     			}
	     			else
	     			{
						$.ajax({
							type: "POST",
							url: baseurl+'loan/pay_to_party?',
							async: false,
							type: "POST",
							data: datastring,
							dataType: "html",
							success: function(response)
							{	
								cash_status=1;
							}
							});
					}
				}
				if(cheque_loan_paynow_add_radio.checked)
				{
					var pay_type='Cheque';
					var pay_amt1=parseFloat($('#pay_to_party_cash').val());
					var pay_amt=parseFloat($('#pay_to_party_cheque_amount').val());
					var pay_amt2=parseFloat($('#pay_to_party_rtgs_amount').val());
					var pay_amt3=parseFloat($('#pay_to_party_upi_amount').val());
					var pay_details=$('#pay_to_party_cheque_details').val();
					var p_bank=$('#pay_to_party_cheque_party_bank').val();
					var ref_no=$('#pay_to_party_cheque_ref_no').val();
					var c_bank=$('#pay_to_party_cheque_company_bank').val();
					var p_bill_no=$('#p_bill_no').val();
					var p_pid=$('#p_pid').val();
	     			
	     			var datastring="pay_type="+pay_type+"&pay_amt="+pay_amt+"&pay_details="+pay_details+"&p_bank="+p_bank+"&ref_no="+ref_no+"&c_bank="+c_bank+"&p_bill_no="+p_bill_no+"&p_pid="+p_pid;
	     			var tot=pay_amt+pay_amt1+pay_amt2+pay_amt3;
	     			if(tot==tot_to_rec)
						$('#lbl_bal_amt').html("0");
	     			if(tot>tot_to_rec)
	     			{
	     				alert("Enter value less than total amount");
	     				document.getElementById('pay_to_party_cheque_amount').focus();
	     			}
	     			else
	     			{
						$.ajax({
							type: "POST",
							url: baseurl+'loan/pay_to_party?',
							async: false,
							type: "POST",
							data: datastring,
							dataType: "html",
							success: function(response)
							{	
								chq_status=1;
							}
							});
					}
				}
				if(rtgs_loan_paynow_add_radio.checked)
				{
					var pay_type='RTGS';
					var pay_amt1=parseFloat($('#pay_to_party_cash').val());
					var pay_amt2=parseFloat($('#pay_to_party_cheque_amount').val());
					var pay_amt=parseFloat($('#pay_to_party_rtgs_amount').val());
					var pay_amt3=parseFloat($('#pay_to_party_upi_amount').val());
					var pay_details=$('#pay_to_party_rtgs_details').val();
					var p_bank=$('#pay_to_party_rtgs_party_bank').val();
					var ref_no=$('#pay_to_party_rtgs_ref_no').val();
					var c_bank=$('#pay_to_party_rtgs_company_bank').val();
					var p_bill_no=$('#p_bill_no').val();
					var p_pid=$('#p_pid').val();
	     			
	     			var datastring="pay_type="+pay_type+"&pay_amt="+pay_amt+"&pay_details="+pay_details+"&p_bank="+p_bank+"&ref_no="+ref_no+"&c_bank="+c_bank+"&p_bill_no="+p_bill_no+"&p_pid="+p_pid;
	     			var tot=pay_amt+pay_amt1+pay_amt2+pay_amt3;
	     			if(tot==tot_to_rec)
						$('#lbl_bal_amt').html("0");
	     			if(tot>tot_to_rec)
	     			{
	     				alert("Enter value less than total amount");
	     				document.getElementById('pay_to_party_rtgs_amount').focus();
	     			}
	     			else
	     			{
						$.ajax({
							type: "POST",
							url: baseurl+'loan/pay_to_party?',
							async: false,
							type: "POST",
							data: datastring,
							dataType: "html",
							success: function(response)
							{	
								rtgs_status=1;
							}
							});
					}
				}
				if(upi_loan_paynow_add_radio.checked)
				{
					var pay_type='UPI';
					var pay_amt1=parseFloat($('#pay_to_party_cash').val());
					var pay_amt2=parseFloat($('#pay_to_party_cheque_amount').val());
					var pay_amt3=parseFloat($('#pay_to_party_rtgs_amount').val());
					var pay_amt=parseFloat($('#pay_to_party_upi_amount').val());
					var pay_details=$('#pay_to_party_upi_details').val();
					var p_bank=$('#pay_to_party_upi_party_bank').val();
					var ref_no=$('#pay_to_party_upi_ref_no').val();
					var c_bank=$('#pay_to_company_upi_party_bank').val();
					var p_bill_no=$('#p_bill_no').val();
					var p_pid=$('#p_pid').val();
	     			
	     			var datastring="pay_type="+pay_type+"&pay_amt="+pay_amt+"&pay_details="+pay_details+"&p_bank="+p_bank+"&ref_no="+ref_no+"&c_bank="+c_bank+"&p_bill_no="+p_bill_no+"&p_pid="+p_pid;
	     			var tot=pay_amt+pay_amt1+pay_amt2+pay_amt3;
	     			if(tot==tot_to_rec)
						$('#lbl_bal_amt').html("0");
	     			if(tot>tot_to_rec)
	     			{
	     				alert("Enter value less than total amount");
	     				document.getElementById('pay_to_party_upi_amount').focus();
	     			}
	     			else
	     			{
						$.ajax({
							type: "POST",
							url: baseurl+'loan/pay_to_party?',
							async: false,
							type: "POST",
							data: datastring,
							dataType: "html",
							success: function(response)
							{	
								upi_status=1;
							}
							});
					}
				}
			}
			
			if(cash_status==1 || chq_status==1 || rtgs_status==1 || upi_status==1)
			{
				
			
					var pay_amt=parseFloat($('#pay_to_party_cash').val());
					var pay_amt2=parseFloat($('#pay_to_party_cheque_amount').val());
					var pay_amt3=parseFloat($('#pay_to_party_rtgs_amount').val());
					var pay_amt=parseFloat($('#pay_to_party_upi_amount').val());
					var tot=pay_amt+pay_amt1+pay_amt2+pay_amt3;
					if(tot==tot_to_rec)
						$('#lbl_bal_amt').html("0");
					var bal=parseFloat($('#lbl_bal_amt').html());
							
				if(bal==0)
				{
					alert("Payment to Party has been completed");
					document.getElementById('btn_pay').style.display="none";	
					document.getElementById('btn_pay_now').style.display="none";
					
					// $('#kt_modal_view_payment').removeClass('show');
					// $('.modal-backdrop').removeClass('show');
					$('#kt_modal_view_payment').hide();
		   		$('.modal-backdrop').hide();
					var $body = $(document.body);
				$body.css("overflow", "auto");
				$body.width("auto");
				}
			}
			
		}
		</script>
		<script type="text/javascript">
		function receive_from_party1()
		{
			
			var cash_loan_received_add_radio = document.getElementById("cash_loan_received_add_radio");
			var cheque_loan_received_add_radio = document.getElementById("cheque_loan_received_add_radio");
			var rtgs_loan_received_add_radio = document.getElementById("rtgs_loan_received_add_radio");
			var upi_loan_received_add_radio = document.getElementById("upi_loan_received_add_radio");
			var mem_card_loan_received_add_radio = document.getElementById("mem_card_loan_received_add_radio");
			
			var tot_to_rec=parseFloat($('#lbl_tot_to_rcv').html());
			// alert(tot_to_rec);
			var cash_status=0;
			var chq_status=0;
			var rtgs_status=0;
			var upi_status=0;
			var bal=parseFloat($('#lbl_ptr_bal_amt').html());

			// alert("hi");
			if(bal==0)
			{
				if(cash_loan_received_add_radio.checked)
				{
					var pay_type='Cash';
					var pay_amt=parseFloat($('#p_receive_cash').val());
					var pay_amt1=parseFloat($('#p_receive_cheque_amount').val());
					var pay_amt2=parseFloat($('#p_receive_rtgs_amount').val());
					var pay_amt3=parseFloat($('#p_receive_upi_amount').val());
					var pay_amt4=parseFloat($('#mem_card_redeem_points').val());
					var pay_details=$('#p_receive_cash_details').val();
					var p_bank='';
					var ref_no='';
					var c_bank='';
					var p_bill_no=$('#p_bill_no').val();
					var p_pid=$('#p_pid').val();
	     			
	     			var datastring="pay_type="+pay_type+"&pay_amt="+pay_amt+"&pay_details="+pay_details+"&p_bank="+p_bank+"&ref_no="+ref_no+"&c_bank="+c_bank+"&p_bill_no="+p_bill_no+"&p_pid="+p_pid;

	     			if(pay_amt=='' || pay_amt==0 || pay_details=='')
	     			{
	     				alert("Please fill all the fields");
	     				return false;
	     			}
	     			var tot=pay_amt+pay_amt1+pay_amt2+pay_amt3+pay_amt4;

	     			if(tot>tot_to_rec)
	     			{
	     				alert("Enter value less than total amount");
	     				document.getElementById('p_receive_cash').focus();
	     			}
	     			else
	     			{
						$.ajax({
							type: "POST",
							url: baseurl+'loan/receive_from_party?',
							async: false,
							type: "POST",
							data: datastring,
							dataType: "html",
							success: function(response)
							{	
								 cash_status= 1;
							}
							});
					}
				}
				if(cheque_loan_received_add_radio.checked)
				{
					var pay_type='Cheque';
					var pay_amt=parseFloat($('#p_receive_cheque_amount').val());
					var pay_amt1=parseFloat($('#p_receive_cash').val());
					var pay_amt2=parseFloat($('#p_receive_rtgs_amount').val());
					var pay_amt3=parseFloat($('#p_receive_upi_amount').val());
					var pay_amt4=parseFloat($('#mem_card_redeem_points').val());
					var pay_details=$('#p_receive_cheque_details').val();
					var p_bank=$('#p_receive_cheque_party_bank').val();
					var ref_no=$('#p_receive_cheque_ref_no').val();
					var c_bank='';
					var p_bill_no=$('#p_bill_no').val();
					var p_pid=$('#p_pid').val();
	     			
	     			var datastring="pay_type="+pay_type+"&pay_amt="+pay_amt+"&pay_details="+pay_details+"&p_bank="+p_bank+"&ref_no="+ref_no+"&c_bank="+c_bank+"&p_bill_no="+p_bill_no+"&p_pid="+p_pid;
	     			var tot=pay_amt+pay_amt1+pay_amt2+pay_amt3+pay_amt4;

	     			if(tot>tot_to_rec)
	     			{
	     				alert("Enter value less than total amount");
	     				document.getElementById('p_receive_cheque_amount').focus();
	     			}
	     			else
	     			{
						$.ajax({
							type: "POST",
							url: baseurl+'loan/receive_from_party?',
							async: false,
							type: "POST",
							data: datastring,
							dataType: "html",
							success: function(response)
							{	
								 chq_status= 1;
							}
							});
					}
				}
				if(rtgs_loan_received_add_radio.checked)
				{
					var pay_type='RTGS';
					var pay_amt=parseFloat($('#p_receive_rtgs_amount').val());
					var pay_amt1=parseFloat($('#p_receive_cash').val());
					var pay_amt2=parseFloat($('#p_receive_cheque_amount').val());
					var pay_amt3=parseFloat($('#p_receive_upi_amount').val());
					var pay_amt4=parseFloat($('#mem_card_redeem_points').val());
					var pay_details=$('#pay_to_party_rtgs_details').val();
					var p_bank='';
					var ref_no=$('#p_receive_rtgs_ref_no').val();
					var c_bank=$('#p_receive_rtgs_company_bank').val();
					var p_bill_no=$('#p_bill_no').val();
					var p_pid=$('#p_pid').val();
	     			
	     			var datastring="pay_type="+pay_type+"&pay_amt="+pay_amt+"&pay_details="+pay_details+"&p_bank="+p_bank+"&ref_no="+ref_no+"&c_bank="+c_bank+"&p_bill_no="+p_bill_no+"&p_pid="+p_pid;
	     			var tot=pay_amt+pay_amt1+pay_amt2+pay_amt3+pay_amt4;

	     			if(tot>tot_to_rec)
	     			{
	     				alert("Enter value less than total amount");
	     				document.getElementById('p_receive_rtgs_amount').focus();
	     			}
	     			else
	     			{
						$.ajax({
							type: "POST",
							url: baseurl+'loan/receive_from_party?',
							async: false,
							type: "POST",
							data: datastring,
							dataType: "html",
							success: function(response)
							{	
								 rtgs_status= 1;
							}
							});
					}
				}
				if(upi_loan_received_add_radio.checked)
				{
					var pay_type='UPI';
					var pay_amt=parseFloat($('#p_receive_upi_amount').val());
					var pay_details=$('#p_receive_upi_details').val();
					var pay_amt1=parseFloat($('#p_receive_cash').val());
					var pay_amt2=parseFloat($('#p_receive_cheque_amount').val());
					var pay_amt3=parseFloat($('#p_receive_rtgs_amount').val());
					var pay_amt4=parseFloat($('#mem_card_redeem_points').val());
					var p_bank='';
					var ref_no=$('#p_receive_upi_ref_no').val();
					var c_bank=$('#p_receive_upi_company_bank').val();
					var p_bill_no=$('#p_bill_no').val();
					var p_pid=$('#p_pid').val();
	     			
	     			var datastring="pay_type="+pay_type+"&pay_amt="+pay_amt+"&pay_details="+pay_details+"&p_bank="+p_bank+"&ref_no="+ref_no+"&c_bank="+c_bank+"&p_bill_no="+p_bill_no+"&p_pid="+p_pid;
	     			var tot=pay_amt+pay_amt1+pay_amt2+pay_amt3+pay_amt4;

	     			if(tot>tot_to_rec)
	     			{
	     				alert("Enter value less than total amount");
	     				document.getElementById('p_receive_upi_amount').focus();
	     			}
	     			else
	     			{
						$.ajax({
							type: "POST",
							url: baseurl+'loan/receive_from_party?',
							async: false,
							type: "POST",
							data: datastring,
							dataType: "html",
							success: function(response)
							{	
								 upi_status= 1;
							}
							});
					}
				}
				if(mem_card_loan_received_add_radio.checked)
				{
					var pay_type='Membership Card';
					var pay_amt=parseFloat($('#mem_card_redeem_points').val());
					var pay_details=$('#mem_card_details').val();
					var pay_amt1=parseFloat($('#p_receive_cash').val());
					var pay_amt2=parseFloat($('#p_receive_cheque_amount').val());
					var pay_amt3=parseFloat($('#p_receive_rtgs_amount').val());
					var pay_amt4=parseFloat($('#p_receive_upi_amount').val());
					var p_bank='';
					var ref_no=$('#mem_card_no').val();
					var c_bank='';
					var p_bill_no=$('#p_bill_no').val();
					var p_pid=$('#p_pid').val();
	     			
	     			var datastring="pay_type="+pay_type+"&pay_amt="+pay_amt+"&pay_details="+pay_details+"&p_bank="+p_bank+"&ref_no="+ref_no+"&c_bank="+c_bank+"&p_bill_no="+p_bill_no+"&p_pid="+p_pid;
	     			var tot=pay_amt+pay_amt1+pay_amt2+pay_amt3+pay_amt4;

	     			if(tot>tot_to_rec)
	     			{
	     				alert("Enter value less than total amount");
	     				document.getElementById('mem_card_redeem_points').focus();
	     			}
	     			else
	     			{
						$.ajax({
							type: "POST",
							url: baseurl+'loan/receive_from_party?',
							async: false,
							type: "POST",
							data: datastring,
							dataType: "html",
							success: function(response)
							{	
								 mem_card_status= 1;
								 $.ajax({
									type: "POST",
									url: baseurl+'loan/redeem_mem_points?',
									async: false,
									type: "POST",
									data: "pid="+p_pid+"&points="+pay_amt+"&mem_card="+ref_no+"&bill_no="+p_bill_no,
									dataType: "html",
									success: function(response)
									{
										alert("mem point Deducted");
									}
								});
							}	
						});
					}
				}
				
					document.getElementById('btn_deduct').style.display="none";	
					alert("Amount to Receive from Party as Separate Deducted");
					document.getElementById('btn_receive_payment').style.display="none";
					$('#kt_modal_payment_to_receive').hide();
		   $('.modal-backdrop').hide();
			// $('#kt_modal_payment_to_receive').removeClass('show');
			// $('.modal-backdrop').removeClass('show');
			var $body = $(document.body);
				$body.css("overflow", "auto");
				$body.width("auto");
				
			}
			else
			{
				alert("Still balance amount exists");
				document.getElementById('btn_deduct').style.display="block";
			}

			// if(cash_status==1 || chq_status==1 || rtgs_status==1 || upi_status==1 || mem_card_status=1)
			// {
			// 	if(bal==0)
			// 	{
			// 		document.getElementById('btn_deduct').style.display="none";	
			// 		alert("Amount to Receive from Party as Separate Deducted");
			// 		document.getElementById('btn_receive_payment').style.display="none";
					
			// 	}
			// }
			
		}
		</script>
		<script>
		function payment_receive_calc()
		{
			var c=parseFloat($('#p_receive_cash').val());
			var ch=parseFloat($('#p_receive_cheque_amount').val());
			var rt=parseFloat($('#p_receive_rtgs_amount').val());
			var up=parseFloat($('#p_receive_upi_amount').val());
			var mc=parseFloat($('#mem_card_redeem_points').val());

			var rc_tot=parseFloat($('#lbl_tot_to_rcv').html());
			if(c=='') c=0;
			if(ch=='') ch=0;
			if(rt=='') rt=0;
			if(up=='') up=0;
			if(mc=='') mc=0;
			if(mc>0)
			{
				var mcp=parseFloat($('#mem_card_points').html());
				if(mc>mcp)
				{
					alert("Enter value less than Available Points");
					$('#mem_card_redeem_points').val('0');
					mc=0;
					document.getElementById("mem_card_redeem_points").focus();
				}
			}
			// alert(c);
			var tot= c+ch+rt+up+mc;


			// alert(tot);
			$('#lbl_ptr_paid_amt').html(tot);
			
			var diff=rc_tot - parseFloat(tot);
			$('#lbl_ptr_bal_amt').html(diff);
			// alert(diff);
		}

		</script>
		<script>
			
			function pay_to_party_calc()
			{

				var c=parseFloat($('#pay_to_party_cash').val());
				var ch=parseFloat($('#pay_to_party_cheque_amount').val());
				var rt=parseFloat($('#pay_to_party_rtgs_amount').val());
				var up=parseFloat($('#pay_to_party_upi_amount').val());
				var rc_tot=parseFloat($('#lbl_net_pay').html());

				if(c=='') c=0;
				if(ch=='') ch=0;
				if(rt=='') rt=0;
				if(up=='') up=0;

				// alert(c);
				var tot= c+ch+rt+up;

				// alert(tot);
				$('#lbl_paid_amt').html(tot);

				
				var diff=rc_tot - parseFloat(tot);
				// alert("hi");
				$('#lbl_bal_amt').html(diff);
				// alert(diff);
			}
			function change_mobile()
			{
				if(document.getElementById('pop_mobile_no_is_change').checked==true)
				{
					document.getElementById('div_change_mobile_no').style.display="block";
					// document.getElementById('div_verify_mobile_no').style.display="none";
					document.getElementById('generated_otp').style.display="none";
				}
				else
				{
					document.getElementById('div_change_mobile_no').style.display="none";
					// document.getElementById('div_verify_mobile_no').style.display="block";	
					// document.getElementById('generated_otp').style.display="none";
				}
			}
			function check_mobile()
			{
				var otp=$('#check_otp').val();
				var gen_otp=$('#generated_otp_hidden').val();
				if(gen_otp=='')
				{
					alert("Click generate OTP to get CODE");
					return false;
				}
				else
				{
					if(otp==gen_otp)
					{
						document.getElementById('mb_success').style.display="block";
						document.getElementById('mb_err').style.display="none";
						document.getElementById('verify_btn').style.display="none";
						document.getElementById('cancel_btn').style.display="none";
						// alert("verified");
					}
					else
					{
						document.getElementById('mb_success').style.display="none";
						document.getElementById('mb_err').style.display="block";
						// alert("OTP Error");
						return false;
					}
				}
			}
			function generate_otp()
			{
				// alert("hi");
				let x = Math.floor((Math.random() * 1000000) + 1);
				document.getElementById("generated_otp").innerHTML = " Your generted OTP is : <b>"+x+"</b>";
				document.getElementById("generated_otp").style.display="block";
				$('#generated_otp_hidden').val(x);
				document.getElementById("generate_btn").style.display="none";
				document.getElementById("verify_btn").style.display="block";

			}
			function update_no()
			{
				var baseurl = $("#baseurl").val();
				var mbn=$('#new_mobile_no').val();
				// alert(mbn);
				var mbo=$('#pop_mobile_no').html();
				// alert(mbo);
				var pid=$('#first_name_id_hidden').val();
				
				
				if(pid=='')
				{
					alert("Enter Party Name");
					
					// $('#kt_modal_verify_mobile_no').removeClass('show');
					// $('.modal-backdrop').removeClass('show');
					$('#kt_modal_verify_mobile_no').hide();
		   		$('.modal-backdrop').hide();
					var $body = $(document.body);
				$body.css("overflow", "auto");
				$body.width("auto");
					document.getElementById('first_name').focus();
					return true;
					 // window.location.href=baseurl+"loan/loan_add";
				}
				else
				{
					if(mbn==mbo)
					{
						alert("You have entered Old no ");
						
						$('#new_mobile_no').val('');
						document.getElementById('new_mobile_no').focus();
						return false;
					}
					else if(mbn='')
					{
						alert("Please Enter mobile no");
						$('#new_mobile_no').val('');
						document.getElementById('new_mobile_no').focus();
						return false;
					}
					else
					{
						var newno=$('#new_mobile_no').val();
						var mb_len=newno.length;
						if(mb_len<10)
						{
							alert("Mobile number is not valid");
							document.getElementById('new_mobile_no').focus();
						}
						else
						{
							generate_otp();
							// $.ajax({
							// type: "POST",
							// url: baseurl+'loan/update_party_phone_no?',
							// async: false,
							// type: "POST",
							// data: "pid="+pid+"&new_no="+newno,
							// dataType: "html",
							// success: function(response)
							// {	

							// 	 alert("Mobile number changed");
							// 	 $('#pop_mobile_no').html(newno);
							// 	 $('#mobile_no').html(newno);
							// 	 document.getElementById('pop_mobile_no_is_change').checked=false;
							// 	 document.getElementById('div_change_mobile_no').style.display="none";
							// 	document.getElementById('div_verify_mobile_no').style.display="block";
							// 	// $('#kt_modal_verify_mobile_no').removeClass('show');
							// 	// $('.modal-backdrop').removeClass('show');
							// }
							// });
						}
					}
				}
			}
		</script>
		<script type="text/javascript">
			function txt_show_hide()
			{
				if(document.getElementById('charges_loan_amt').checked==true)
				{
					document.getElementById('lbl_charges_loan_pay_amt').style.display="block";
					document.getElementById('charges_loan_pay_amt').style.display="block";
				}
				else
				{
					document.getElementById('lbl_charges_loan_pay_amt').style.display="none";
					document.getElementById('charges_loan_pay_amt').style.display="none";
				}
				if(document.getElementById('charges_pay_separate').checked==true)
				{
					document.getElementById('lbl_charges_pay_separate_amt').style.display="block";
					document.getElementById('charges_pay_separate_amt').style.display="block";
				}
				else
				{
					document.getElementById('lbl_charges_pay_separate_amt').style.display="none";
					document.getElementById('charges_pay_separate_amt').style.display="none";
				}
				if(document.getElementById('on_acc_loan_pay').checked==true)
				{
					document.getElementById('lbl_on_acc_loan_pay_amt').style.display="block";
					document.getElementById('on_acc_loan_pay_amt').style.display="block";
				}
				else
				{
					document.getElementById('lbl_on_acc_loan_pay_amt').style.display="none";
					document.getElementById('on_acc_loan_pay_amt').style.display="none";
				}
				if(document.getElementById('on_acc_pay_separate').checked==true)
				{
					document.getElementById('lbl_on_acc_pay_separate_amt').style.display="block";
					document.getElementById('on_acc_pay_separate_amt').style.display="block";
				}
				else
				{
					document.getElementById('lbl_on_acc_pay_separate_amt').style.display="none";
					document.getElementById('on_acc_pay_separate_amt').style.display="none";
				}
			}
		</script>
		<script type="text/javascript">
			function check_charges_less_than_total()
			{
				var tc=$('#total_charges').html();
				var ch_fl=parseFloat($('#charges_loan_pay_amt').val());
				var ch_ps=parseFloat($('#charges_pay_separate_amt').val());
				var sum=ch_ps+ch_fl;
				
				// var t=0;
				if(tc<sum)
				{
					alert('Enter value less than Total charges');
					$('#charges_loan_pay_amt').val('');
					$('#charges_pay_separate_amt').val('')
					document.getElementById('charges_loan_pay_amt').focus();
				}
				else
				{
					var ps= parseFloat($('#on_acc_pay_separate_amt').val());
					var fl= parseFloat($('#on_acc_loan_pay_amt').val());
					var ps_tot=ch_ps+ps;
					$('#lbl_tot_to_rcv').html(ps_tot);

					var net_pay_ln_amt=parseFloat($('#loan_amount').val());
					var ln_tot=fl+ch_fl;
					var ln_diff=net_pay_ln_amt-ln_tot;

					$('#span_net_pay').html(ln_diff);
					$('#lbl_net_pay').html(ln_diff);
				}				
			}
		</script>
		<script type="text/javascript">
			function check_on_acc_less_than_total()
			{
				var tc=parseFloat($('#on_account').val());
				var ch_fl=parseFloat($('#on_acc_loan_pay_amt').val());
				var ch_ps=parseFloat($('#on_acc_pay_separate_amt').val());
				var sum=ch_ps+ch_fl;

				

				if(tc<sum)
				{
					alert('Enter value less than Total On Account');
					$('#on_acc_loan_pay_amt').val('');
					$('#on_acc_pay_separate_amt').val('')
					document.getElementById('on_acc_loan_pay_amt').focus();
				}
				else
				{
					var ps= parseFloat($('#charges_pay_separate_amt').val());
					var fl=parseFloat($('#charges_loan_pay_amt').val());
					var ps_tot=ch_ps+ps;
					$('#lbl_tot_to_rcv').html(ps_tot);

					var net_pay_ln_amt=parseFloat($('#loan_amount').val());
					var ln_tot=fl+ch_fl;
					var ln_diff=net_pay_ln_amt-ln_tot;

					$('#span_net_pay').html(ln_diff);
					$('#lbl_net_pay').html(ln_diff);
				}
				
			}
		</script>
		<script >
			// $("#final_charges").click(function(){
			//   $('#kt_modal_view_loan_no').addClass('show');
			// });
			$(document).ready(function(){
				
			
			$( "#popup_close" ).on('click',function() {
				// alert("hi");
				
	  				$( "#frm_loan_submit" ).attr('action',"<?php echo base_url();?>MRI_Loan/MRI_Loan_save");
	  				$( "#frm_loan_submit" ).submit();
	  				e.preventDefault();


			});
		});
			// $(".form_submit").on("click", function () {
   //      // value=$(this).val();
   //      // alert(value);
   //      $('#form_id').attr('action', "<?php echo base_url(); ?>Tagged_audit/audit_save");
   //      $("#form_id").submit();
   //      e.preventDefault();
   //  });

		</script>
		<script>
			function select_image_1()
			{
				document.getElementById("img_1").style.border = "3px solid #ec9629";
				document.getElementById("img_2").style.border = "none";
				document.getElementById("img_3").style.border = "none";
				document.getElementById("img_4").style.border = "none";
				document.getElementById("img_5").style.border = "none";
				document.getElementById("img_6").style.border = "none";
				$('#img_selected_id').val('img_1');
			};
			function select_image_2()
			{
				document.getElementById("img_1").style.border = "none";
				document.getElementById("img_2").style.border = "3px solid #ec9629";
				document.getElementById("img_3").style.border = "none";
				document.getElementById("img_4").style.border = "none";
				document.getElementById("img_5").style.border = "none";
				document.getElementById("img_6").style.border = "none";
				$('#img_selected_id').val('img_2');
			};
			function select_image_3()
			{
				document.getElementById("img_1").style.border = "none";
				document.getElementById("img_2").style.border = "none";
				document.getElementById("img_3").style.border = "3px solid #ec9629";
				document.getElementById("img_4").style.border = "none";
				document.getElementById("img_5").style.border = "none";
				document.getElementById("img_6").style.border = "none";
				$('#img_selected_id').val('img_3');
			};
			function select_image_4()
			{
				document.getElementById("img_1").style.border = "none";
				document.getElementById("img_2").style.border = "none";
				document.getElementById("img_3").style.border = "none";
				document.getElementById("img_4").style.border = "3px solid #ec9629";
				document.getElementById("img_5").style.border = "none";
				document.getElementById("img_6").style.border = "none";
				$('#img_selected_id').val('img_4');
			};
			function select_image_5()
			{
				document.getElementById("img_1").style.border = "none";
				document.getElementById("img_2").style.border = "none";
				document.getElementById("img_3").style.border = "none";
				document.getElementById("img_4").style.border = "none";
				document.getElementById("img_5").style.border = "3px solid #ec9629";
				document.getElementById("img_6").style.border = "none";
				$('#img_selected_id').val('img_5');
			};
			function select_image_6()
			{
				document.getElementById("img_1").style.border = "none";
				document.getElementById("img_2").style.border = "none";
				document.getElementById("img_3").style.border = "none";
				document.getElementById("img_4").style.border = "none";
				document.getElementById("img_5").style.border = "none";
				document.getElementById("img_6").style.border = "3px solid #ec9629";
				$('#img_selected_id').val('img_6');
			};
		</script>
		<script language="JavaScript">
		    

		    function take_jewel_photo()

		    {
		    	// alert("hi");
		    	Webcam.set({
		        width: 494,
		        height: 330,
		        image_format: 'jpeg',
		        jpeg_quality: 90
		    	});
		  		Webcam.attach('#my_camera');
		  		document.getElementById('take_jewel_photo1').style.display="none";
		  		document.getElementById('capture').style.display="block";
		  		// document.getElementById('my_camera').style.display="block";
		        // document.getElementById('results').style.display="none";
		    }
		  
		    function jewel_snapshot() 
		    {
		    	// alert("hi");
		    	var cnt=Number($("#img_count").val());
		        	// alert(cnt);
		      //   Webcam.start('#my_camera')
					   // .then(result =>{
					   //    console.log("webcam started");
					   // })
					   // .catch(err => {
					   //     console.log(err);
					   // });
		        Webcam.snap( function(data_uri) {
		        	if(cnt<=6)
		        	{
			            // $(".image-tag").val(data_uri);
			            document.getElementById('img_'+cnt).innerHTML = '<img src="'+data_uri+'" id="jewel_photo_'+cnt+'" name="jewel_photo_'+cnt+'" height="150" width="150" />';
			            document.getElementById('img_'+cnt+'_data').innerHTML=data_uri;

			            // document.getElementById('party_photo_data').innerHTML =data_uri;
			            // document.getElementById('my_camer	a').style.display="none";
			            // document.getElementById('results').style.display="block";
			            document.getElementById('take_jewel_photo1').style.display="block";
			            document.getElementById('capture').style.display="none";
			            $("#img_count").val(Number(cnt)+1);
			            Webcam.reset('#my_camera');
		            }
		            else
		            {
		            	alert("Choose anyone image from 6 images");

		            }

		        } );
		    }
		    function put_capture_jewel_photo()
		    {
		    	var sel_id=$('#img_selected_id').val();
		    	// alert(sel_id);

		    	var img_data=$('#'+sel_id+'_data').val();
		    	// alert(img_data);
		    	document.getElementById('load_image_selected').innerHTML='<img src="'+img_data+'" id="loan_jewel_photo" name="loan_jewel_photo" height="150" width="150" />';
		    	document.getElementById('loan_jewel_image_data').innerHTML=img_data;
		    	// $('#kt_modal_camera').removeClass('show');
		    	// $('.modal-backdrop').removeClass('show');
		    	$('#kt_modal_camera').hide();
		   		$('.modal-backdrop').hide();
					var $body = $(document.body);
				$body.css("overflow", "auto");
				$body.width("auto");
		    	document.getElementById('pledge_item').focus();
		    }
		    
		</script>
<!-- Pledge item image capture -->
		<script>
			function pl_select_image_1()
			{
				document.getElementById("pl_img_1").style.border = "3px solid #ec9629";
				document.getElementById("pl_img_2").style.border = "none";
				document.getElementById("pl_img_3").style.border = "none";
				document.getElementById("pl_img_4").style.border = "none";
				document.getElementById("pl_img_5").style.border = "none";
				document.getElementById("pl_img_6").style.border = "none";
				$('#pl_img_selected_id').val('pl_img_1');
			};
			function pl_select_image_2()
			{
				document.getElementById("pl_img_1").style.border = "none";
				document.getElementById("pl_img_2").style.border = "3px solid #ec9629";
				document.getElementById("pl_img_3").style.border = "none";
				document.getElementById("pl_img_4").style.border = "none";
				document.getElementById("pl_img_5").style.border = "none";
				document.getElementById("pl_img_6").style.border = "none";
				$('#pl_img_selected_id').val('pl_img_2');
			};
			function pl_select_image_3()
			{
				document.getElementById("pl_img_1").style.border = "none";
				document.getElementById("pl_img_2").style.border = "none";
				document.getElementById("pl_img_3").style.border = "3px solid #ec9629";
				document.getElementById("pl_img_4").style.border = "none";
				document.getElementById("pl_img_5").style.border = "none";
				document.getElementById("pl_img_6").style.border = "none";
				$('#pl_img_selected_id').val('pl_img_3');
			};
			function pl_select_image_4()
			{
				document.getElementById("pl_img_1").style.border = "none";
				document.getElementById("pl_img_2").style.border = "none";
				document.getElementById("pl_img_3").style.border = "none";
				document.getElementById("pl_img_4").style.border = "3px solid #ec9629";
				document.getElementById("pl_img_5").style.border = "none";
				document.getElementById("pl_img_6").style.border = "none";
				$('#pl_img_selected_id').val('pl_img_4');
			};
			function pl_select_image_5()
			{
				document.getElementById("pl_img_1").style.border = "none";
				document.getElementById("pl_img_2").style.border = "none";
				document.getElementById("pl_img_3").style.border = "none";
				document.getElementById("pl_img_4").style.border = "none";
				document.getElementById("pl_img_5").style.border = "3px solid #ec9629";
				document.getElementById("pl_img_6").style.border = "none";
				$('#pl_img_selected_id').val('pl_img_5');
			};
			function pl_select_image_6()
			{
				document.getElementById("pl_img_1").style.border = "none";
				document.getElementById("pl_img_2").style.border = "none";
				document.getElementById("pl_img_3").style.border = "none";
				document.getElementById("pl_img_4").style.border = "none";
				document.getElementById("pl_img_5").style.border = "none";
				document.getElementById("pl_img_6").style.border = "3px solid #ec9629";
				$('#pl_img_selected_id').val('pl_img_6');
			};
		</script>
		<script language="JavaScript">
		    

		    function pl_take_jewel_photo()

		    {
		    	// alert("hi");
		    	Webcam.set({
		        width: 494,
		        height: 330,
		        image_format: 'jpeg',
		        jpeg_quality: 90
		    	});
		  		Webcam.attach('#pl_my_camera');
		  		document.getElementById('pl_take_jewel_photo1').style.display="none";
		  		document.getElementById('pl_capture').style.display="block";
		  		// document.getElementById('my_camera').style.display="block";
		        // document.getElementById('results').style.display="none";
		    }
		  
		    function pl_jewel_snapshot() {
		    	// alert("hi");
		    	var cnt=Number($("#pl_img_count").val());
		        	// alert(cnt);
		      //   Webcam.start('#my_camera')
					   // .then(result =>{
					   //    console.log("webcam started");
					   // })
					   // .catch(err => {
					   //     console.log(err);
					   // });
		        Webcam.snap( function(data_uri) {
		        	if(cnt<=6)
		        	{
			            // $(".image-tag").val(data_uri);
			            document.getElementById('pl_img_'+cnt).innerHTML = '<img src="'+data_uri+'" id="pl_jewel_photo_'+cnt+'" name="pl_jewel_photo_'+cnt+'" height="150" width="150" />';
			            document.getElementById('pl_img_'+cnt+'_data').innerHTML=data_uri;

			            // document.getElementById('party_photo_data').innerHTML =data_uri;
			            // document.getElementById('my_camer	a').style.display="none";
			            // document.getElementById('results').style.display="block";
			            document.getElementById('pl_take_jewel_photo1').style.display="block";
			            document.getElementById('pl_capture').style.display="none";
			            $("#pl_img_count").val(Number(cnt)+1);
			            Webcam.reset('#pl_my_camera');
		            }
		            else
		            {
		            	alert("Choose anyone image from 6 images");
		            	
		            }

		        } );
		    }
		    function pl_put_capture_jewel_photo()
		    {
		    	var sel_id=$('#pl_img_selected_id').val();
		    	// alert(sel_id);

		    	var img_data=$('#'+sel_id+'_data').val();
		    	alert(img_data);
		    	document.getElementById('pl_load_image_selected').innerHTML='<img src="'+img_data+'" id="pl_loan_jewel_photo" name="pl_loan_jewel_photo" height="40" width="40" />';
		    	document.getElementById('pl_loan_jewel_image_data').innerHTML=img_data;
		    	// $('#kt_modal_camera_pledge').removeClass('show');
		    	// $('.modal-backdrop').removeClass('show');
		    	$('#kt_modal_camera_pledge').hide();
		   		$('.modal-backdrop').hide();
					var $body = $(document.body);
				$body.css("overflow", "auto");
				$body.width("auto");
		    	document.getElementById('pledge_item').focus();
		    }
		    
		</script>
		<script>
		
		
		
function calculate()
{
	var wt=$("#weight").val();
	var stl=$("#stone_less").val();
	var ls=$("#less").val();
	
	var nw=wt-stl-ls;
	$("#net_wt").val(nw);

	 	 
}

function calculate1()
{
	var nw=$("#net_wt").val();
	var cr=$("#cur_rate").val();
	var qlty=$("#quality").val();

	var sal_rt=(nw*(qlty/100))*cr;
	// alert(sal_rt);
	var g=(sal_rt)/(nw);
	// alert(g);
	$("#sales_rate").val(sal_rt.toFixed(2));
	$("#grm_value").val(g)
	
	var val_95=((sal_rt)*(95/100));
	var pg_95 = (val_95)/(nw);
	 $("#pg_95").html(pg_95.toFixed(2));
	 $("#val_95").html(val_95.toFixed(2));
	 
	 var val_90=((sal_rt)*(90/100));
	var pg_90 = (val_90)/(nw);
	 $("#pg_90").html(pg_90.toFixed(2));
	 $("#val_90").html(val_90.toFixed(2));
	
	 var val_80=((sal_rt)*(80/100));
	var pg_80 = (val_80)/(nw);
	 $("#pg_80").html(pg_80.toFixed(2));
	  $("#val_80").html(val_80.toFixed(2));
	 
	 var val_70=((sal_rt)*(70/100));
	var pg_70 = (val_70)/(nw);
	 $("#pg_70").html(pg_70.toFixed(2));
	 $("#val_70").html(val_70.toFixed(2));

	 var val_60=((sal_rt)*(60/100));
	var pg_60 = (val_60)/(nw);
	 $("#pg_60").html(pg_60.toFixed(2));
	 
	 $("#val_60").html(val_60.toFixed(2));

	}
</script>
	</body>
	<!--end::Body-->
</html>