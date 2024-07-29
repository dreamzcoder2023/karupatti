
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
  .dataTables_scroll thead{
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
									<h1 class="d-flex align-items-center text-dark fw-bold my-1 fs-3">New Loan
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
											<form method="POST" action="<?php echo base_url(); ?>Loan/loan_save" enctype="multipart/form-data" onsubmit="return loan_validation();">
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
																			<input type="text" name="first_name" class="form-control form-control-lg1 form-control-solid" placeholder="Party Name" id="first_name" oninput="this.value = this.value.replace(/[^A-Za-z. ]/g, '').replace(/(\..*)\./g, '$1');" onkeyup="first_nm_party();">
																			<input type="hidden" name="first_name_id_hidden" id="first_name_id_hidden" value="">
																			<div class="fv-plugins-message-container invalid-feedback" id="first_name_err"></div>
																		</div>
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
																			<div class="col-lg-4" id="lbl_mem_verify">
																				<p class="btn btn-sm btn-outline btn-outline-solid btn-outline-warning btn-active-light-primary me-2" data-bs-toggle="modal" data-bs-target="#kt_modal_verify_membership_card" id="btn_verify_popup" name="btn_verify_popup" >Verify</p>
																			</div>
																		<!-- </div> -->
																		<label class="col-lg-4 col-form-label fw-semibold fs-6">Nominee</label>
																			<div class="col-lg-8 fv-row fv-plugins-icon-container">
																				<select class="form-select form-select-solid" data-control="select2" data-hide-search="true" id="nominee" name="nominee">	
																					<option value="">Select</option>
																					
																				</select>
																			</div>
																	</div>
																</div>
																<div class="col-lg-6">
																	<div class="row">
																		<label class="col-lg-12 col-form-label fw-bold fs-6" name="" id="">
																			<i class="fa fa-user fs-6" aria-hidden="true" title="Last Name"></i>&emsp;<span name="last_name" id="last_name">C/o XXXX  </span></label>
																		<label class="col-lg-12 col-form-label fw-bold fs-6" name="" id="">
																			<i class="fa-solid fa-location-dot fs-6" aria-hidden="true" title="Address"></i>
																		&emsp;<span name="address" id="address">No, street, city</span></label> 
																		<label class="col-lg-12 col-form-label fw-bold fs-6" name="" id="">
																				<i class="fas fa-mobile-android-alt fs-6" aria-hidden="true" title="Mobile"></i>
																			&emsp;<span name="mobile" id="mobile">9999999999</span></label>
																		<label class="col-lg-4 col-form-label fw-semibold fs-6">Rating</label>
																		<label class="col-lg-8 col-form-label fw-bold fs-6" >
																			<span name="rating" id="rating"><i class="fa-solid fa-star" ></i>&nbsp;Rating</span>
																			
																		</label>
																	</div>
																</div>
															</div>
															<div class="row mt-4 mb-4">
																<div class="col-lg-4 fv-row">
																	<div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url(assets/media/svg/avatars/blank.svg)" id="party_photo" name="party_photo">
																		<div class="image-input-wrapper"  style="background-image: url(<?php echo base_url();?>assets/images/party.jpg)"></div>
																	</div>
																</div>
																<div class="col-lg-4 fv-row">
																	<div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url(assets/media/svg/avatars/aadhaar_blank.png)" id="id_photo" name="id_photo">
																		<div class="image-input-wrapper"  style="background-image: url(<?php echo base_url();?>assets/images/party_proof.jpg)"></div>
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
																	<select class="form-select form-select-solid" data-control="select2" data-hide-search="true" id="company" name="company">	
																		<option value="">Select Company</option>
																		<?php foreach($company_list as $clist) {?>
																		<option value="<?php echo $clist['COMPANYCODE']?>" <?php echo ($clist['COMPANYCODE']==$_SESSION['COMPANYCODE'])?'selected':''; ?>><?php echo $clist['COMPANYNAME'];?></option>
																		<?php }?>
																	</select>
																</div>
																<div class="col-lg-8">
																	<div class="row">
																		<label class="col-lg-3 col-form-label fw-semibold fs-6">Date</label>
																		<div class="col-lg-8 fv-row">
																			<div class="d-flex align-items-center">
																				<span class="svg-icon position-absolute ms-4 svg-icon-2 dt">
																					<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																						<path opacity="0.3" d="M21 22H3C2.4 22 2 21.6 2 21V5C2 4.4 2.4 4 3 4H21C21.6 4 22 4.4 22 5V21C22 21.6 21.6 22 21 22Z" fill="currentColor" />
																						<path d="M6 6C5.4 6 5 5.6 5 5V3C5 2.4 5.4 2 6 2C6.6 2 7 2.4 7 3V5C7 5.6 6.6 6 6 6ZM11 5V3C11 2.4 10.6 2 10 2C9.4 2 9 2.4 9 3V5C9 5.6 9.4 6 10 6C10.6 6 11 5.6 11 5ZM15 5V3C15 2.4 14.6 2 14 2C13.4 2 13 2.4 13 3V5C13 5.6 13.4 6 14 6C14.6 6 15 5.6 15 5ZM19 5V3C19 2.4 18.6 2 18 2C17.4 2 17 2.4 17 3V5C17 5.6 17.4 6 18 6C18.6 6 19 5.6 19 5Z" fill="currentColor" />
																						<path d="M8.8 13.1C9.2 13.1 9.5 13 9.7 12.8C9.9 12.6 10.1 12.3 10.1 11.9C10.1 11.6 10 11.3 9.8 11.1C9.6 10.9 9.3 10.8 9 10.8C8.8 10.8 8.59999 10.8 8.39999 10.9C8.19999 11 8.1 11.1 8 11.2C7.9 11.3 7.8 11.4 7.7 11.6C7.6 11.8 7.5 11.9 7.5 12.1C7.5 12.2 7.4 12.2 7.3 12.3C7.2 12.4 7.09999 12.4 6.89999 12.4C6.69999 12.4 6.6 12.3 6.5 12.2C6.4 12.1 6.3 11.9 6.3 11.7C6.3 11.5 6.4 11.3 6.5 11.1C6.6 10.9 6.8 10.7 7 10.5C7.2 10.3 7.49999 10.1 7.89999 10C8.29999 9.90003 8.60001 9.80003 9.10001 9.80003C9.50001 9.80003 9.80001 9.90003 10.1 10C10.4 10.1 10.7 10.3 10.9 10.4C11.1 10.5 11.3 10.8 11.4 11.1C11.5 11.4 11.6 11.6 11.6 11.9C11.6 12.3 11.5 12.6 11.3 12.9C11.1 13.2 10.9 13.5 10.6 13.7C10.9 13.9 11.2 14.1 11.4 14.3C11.6 14.5 11.8 14.7 11.9 15C12 15.3 12.1 15.5 12.1 15.8C12.1 16.2 12 16.5 11.9 16.8C11.8 17.1 11.5 17.4 11.3 17.7C11.1 18 10.7 18.2 10.3 18.3C9.9 18.4 9.5 18.5 9 18.5C8.5 18.5 8.1 18.4 7.7 18.2C7.3 18 7 17.8 6.8 17.6C6.6 17.4 6.4 17.1 6.3 16.8C6.2 16.5 6.10001 16.3 6.10001 16.1C6.10001 15.9 6.2 15.7 6.3 15.6C6.4 15.5 6.6 15.4 6.8 15.4C6.9 15.4 7.00001 15.4 7.10001 15.5C7.20001 15.6 7.3 15.6 7.3 15.7C7.5 16.2 7.7 16.6 8 16.9C8.3 17.2 8.6 17.3 9 17.3C9.2 17.3 9.5 17.2 9.7 17.1C9.9 17 10.1 16.8 10.3 16.6C10.5 16.4 10.5 16.1 10.5 15.8C10.5 15.3 10.4 15 10.1 14.7C9.80001 14.4 9.50001 14.3 9.10001 14.3C9.00001 14.3 8.9 14.3 8.7 14.3C8.5 14.3 8.39999 14.3 8.39999 14.3C8.19999 14.3 7.99999 14.2 7.89999 14.1C7.79999 14 7.7 13.8 7.7 13.7C7.7 13.5 7.79999 13.4 7.89999 13.2C7.99999 13 8.2 13 8.5 13H8.8V13.1ZM15.3 17.5V12.2C14.3 13 13.6 13.3 13.3 13.3C13.1 13.3 13 13.2 12.9 13.1C12.8 13 12.7 12.8 12.7 12.6C12.7 12.4 12.8 12.3 12.9 12.2C13 12.1 13.2 12 13.6 11.8C14.1 11.6 14.5 11.3 14.7 11.1C14.9 10.9 15.2 10.6 15.5 10.3C15.8 10 15.9 9.80003 15.9 9.70003C15.9 9.60003 16.1 9.60004 16.3 9.60004C16.5 9.60004 16.7 9.70003 16.8 9.80003C16.9 9.90003 17 10.2 17 10.5V17.2C17 18 16.7 18.4 16.2 18.4C16 18.4 15.8 18.3 15.6 18.2C15.4 18.1 15.3 17.8 15.3 17.5Z" fill="currentColor" />
																					</svg>
																				</span>
																				<input class="form-control form-control-solid ps-12" name="" placeholder="Date" id="kt_datepicker_new_loan_date" value="<?php echo date("d-m-Y"); ?>"/>
																			</div>
																		</div>
																	</div>
																	<div class="row">
																		<label class="col-lg-3 col-form-label fw-semibold fs-6">JewelType</label>
																		<div class="col-lg-8 fv-row fv-plugins-icon-container">
																			<select class="form-select form-select-solid" name="jewel_type" id="jewel_type" data-control="select2" data-hide-search="true">
																			<!-- <option value="">Select</option>	 -->
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
																	</div>
																	<div class="row">
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
																	</div>
																	<div class="row">
																		<label class="col-lg-3 col-form-label fw-semibold fs-6">Int Type</label>
																		<div class="col-lg-8 fv-row fv-plugins-icon-container">
																			<select class="form-select form-select-solid" name="int_type" id="int_type" data-control="select2" data-hide-search="true" onchange="get_int_due_details()">	
																				<option value="">Select</option>
																				
																			</select>
																		</div>
																	</div>
																	<div class="row">
																		<label class="col-lg-4 col-form-label fw-semibold fs-6">Expiry Date</label>
																		<span class="col-lg-6 col-form-label fw-bold fs-6" name="expiry_dt" id="expiry_dt">dd-mm-yyyy</span>
																	</div>
																</div>
																<div class="col-lg-4">
																	<div class="row mt-4">
																		<div class="col-lg-8 fv-row">
																			<!--begin::Image input-->
																			<div class="image-input 
																			image-input-outline" data-kt-image-input="true" style="background-image: url(<?php echo base_url(); ?>assets/images/Jewel.jpg)">
																					<!--begin::Preview existing avatar-->
																					<div class="image-input-wrapper  w-150px h-150px"  style="background-image: url(<?php echo base_url(); ?>assets/images/Jewel.jpg)" id="my_camera"></div>
																					<!--end::Preview existing avatar-->
																					<!--begin::Label-->
																					<label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" data-kt-initialized="1" onclick="take_loan_jewel();">
																						<i class="bi bi-pencil-fill fs-10" onclick="take_loan_jewel();"></i>
																						<!--begin::Inputs-->
																						<!-- <input type="file" name="add_party_new_loan" accept=".png, .jpg, .jpeg">
																						<input type="hidden" name="add_party_remove_new_loan"> -->
																						<!--end::Inputs-->
																					</label>
																					<!--end::Label-->
																					<!--begin::Cancel-->
																					<span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" data-kt-initialized="1">
																						<i class="bi bi-x fs-6"></i>
																					</span>
																					<!--end::Cancel-->
																					<!--begin::Remove-->
																					<span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" data-kt-initialized="1">
																						<i class="bi bi-x fs-6"></i>
																					</span>
																					<!--end::Remove-->
																					<div id="results" class="image-input-wrapper w-125px h-125px" style="display: none;" onclick="loan_jewel_snapshot();">Your captured image will appear here...</div>
																<textarea hidden="hidden" id="loan_jewel_photo_data" name="loan_jewel_photo_data"></textarea>
																			</div>
																			<!--end::Image input-->
																		</div>
																	</div>
																</div>
															</div>
															<div class="row">
																<label class="col-lg-12 fw-bold fs-5 text-center">Interest Variation Details</label>
																<label class="col-lg-12 fw-bold fs-6 text-center mt-4">
																	<span style="background-color:#1ecbe1;border-radius: 8px;padding: 5px 10px 5px 10px;" id="m1_ex_dt">dd-mm-yy</span>
																	<span style="background-color:#ffb300;border-radius: 8px;padding: 5px 10px 5px 10px;" id="int1">0.00</span>&emsp;
																	<span style="background-color:#1ecbe1;border-radius: 8px;padding: 5px 10px 5px 10px;" id="m2_ex_dt">dd-mm-yy</span>
																	<span style="background-color:#ffb300;border-radius: 8px;padding: 5px 10px 5px 10px;" id="int2">0.00</span>&emsp;
																	<span style="background-color:#1ecbe1;border-radius: 8px;padding: 5px 10px 5px 10px;" id="m3_ex_dt">dd-mm-yy</span>
																	<span style="background-color:#ffb300;border-radius: 8px;padding: 5px 10px 5px 10px;" id="int3">0.00</span>
																</label>
															</div><br>
														</div>
													</div>
												</div>
												<input type="hidden" name="bill_no" id="bill_no" value="0">
												<div class="px-4" style="border-radius: 10px;padding-bottom: 17px;box-shadow: 0 5px 10px #00002947;">
													<div class="row mt-2">
														<label class="col-lg-12 col-form-label fw-bold fs-5 text-center">Pledge Details</label>
														<!--begin::Col-->
														<div class="col-lg-2 fv-row fv-plugins-icon-container">
															<input type="text" name="pledge_item" id="pledge_item" class="form-control form-control-lg1 form-control-solid" placeholder="Select Pledge Name">
															<input type="hidden" name="pledge_item_name_hidden" id="pledge_item_id_hidden" value="">
															<div class="fv-plugins-message-container invalid-feedback"></div>
														</div>
														<div class="col-lg-2 fv-row fv-plugins-icon-container">
															<input type="text" name="pl_description" id="pl_description" class="form-control form-control-lg1 form-control-solid" placeholder="Description">
															<div class="fv-plugins-message-container invalid-feedback"></div>
														</div>
														<div class="col-lg-1 fv-row fv-plugins-icon-container">
															<select class="form-select form-select-solid" data-control="select2" data-hide-search="true" name="add_ptyname_new_loan" id="add_ptyname_new_loan" onchange="purity_percent()">
																<option value="">Select Quality</option>
																<?php 
																foreach ($item_purity_list as $iplist) {
																	?>
																	<option value="<?php echo $iplist['ITEMPURITYID']?>"><?php echo $iplist['ITEMPURITYNAME'];
																?></option>
																	<?php 
																}
																?>
																
															</select>
															<div class="fv-plugins-message-container invalid-feedback" id="add_ptyname_new_loan_err"></div>
														</div>
														<div class="col-lg-1 fv-row fv-plugins-icon-container">
															<input type="text" name="purity_per" id="purity_per" class="form-control form-control-lg1 form-control-solid" placeholder="Purity %">
															<div class="fv-plugins-message-container invalid-feedback"></div>
														</div>
														<div class="col-lg-1 fv-row fv-plugins-icon-container">
															<input type="text" name="weight_ple" id="weight_ple" class="form-control form-control-lg1 form-control-solid" placeholder="Weight" value="0">
															<div class="fv-plugins-message-container invalid-feedback"></div>
														</div>
														<div class="col-lg-1 fv-row fv-plugins-icon-container">
															<input type="text" name="stone_weight" id="stone_weight" class="form-control form-control-lg1 form-control-solid" placeholder="St.Wgt" value="0">
															<div class="fv-plugins-message-container invalid-feedback"></div>
														</div>
														<div class="col-lg-1 fv-row fv-plugins-icon-container">
															<input type="text" name="less_ple" id="less_ple" class="form-control form-control-lg1 form-control-solid" placeholder="Less" value="0">
															<div class="fv-plugins-message-container invalid-feedback"></div>
														</div>
														<div class="col-lg-1 d-flex align-items-center">
															<label class="form-check form-check-inline form-check-solid is-invalid">
																<input class="form-check-input" name="is_damage" type="checkbox"  id="is_damage">
																<span class="col-form-label fw-semibold fs-6">Damage</span>
															</label>
														</div>
														<div class="col-lg-1">
															<div class="image-input mt-2 me-6" data-kt-image-input="true">
																<div class="image-input-wrapper w-40px h-40px" style="background-image: url(assets/media/svg/avatars/blank_jwl.svg)" ></div>
																<!--end::Preview existing avatar-->
																<!--begin::Label-->
																<label class="btn btn-icon btn-active-color-primary w-40px h-25px" data-kt-image-input-action="change" data-bs-toggle="tooltip" data-kt-initialized="1"  >
																	<i class="bi bi-pencil-fill fs-8 ms-3"  ></i>
																	<!--begin::Inputs-->
																	<input type="file" name="add_party_redemp" accept=".png, .jpg, .jpeg">
																	<input type="hidden" name="add_party_remove_redemp">
																	<!--end::Inputs-->
																</label>
																<!--end::Label-->
																<!--begin::Cancel-->
																<span class="btn btn-icon btn-active-color-primary w-25px h-20px" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" data-kt-initialized="1">
																	<i class="bi bi-x fs-3 ms-2"></i>
																</span>
																<!--end::Cancel-->
																<!--begin::Remove-->
																<span class="btn btn-icon btn-active-color-primary w-25px h-20px" data-kt-image-input-action="remove" data-bs-toggle="tooltip" data-kt-initialized="1">
																	<i class="bi bi-x fs-3 ms-2"></i>
																</span>
																<!--end::Remove-->
																
															</div>
														</div>
														<div class="col-lg-1">	
															<button type="button" class="btn btn-sm btn-success mb-2 mt-2" onclick="add_pledge_it()" >
																<span class="svg-icon svg-icon-2">
																	<svg width="24" height="24" viewBox="0 0 24 24" fill="#50cd89" xmlns="http://www.w3.org/2000/svg">
																		<rect opacity="0.5" x="11.364" y="20.364" width="16" height="2" rx="1" transform="rotate(-90 11.364 20.364)" fill="currentColor"></rect>
																		<rect x="4.36396" y="11.364" width="16" height="2" rx="1" fill="currentColor"></rect>
																	</svg>
																</span>
															</button>
															<input type="hidden" name="add_pledge_item" id="add_pledge_item" value="0">
															<input type="hidden" name="delete_pledge_item" id="delete_pledge_item" value="0">

														</div>
													</div>
													<table class="table table-striped table-hover table-row-bordered fs-7 gy-1 gs-2" id="kt_datatable_dom_positioning_add_loan">
														<thead>
															<tr class="fw-semibold fs-6 text-gray-800">
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
													            <th class="min-w-50px">Action</th>
													            <!-- <th class="min-w-80px">Status</th>
													            <th class="min-w-100px">RP.No</th>
													            <th class="min-w-100px">Bank</th> -->
															</tr>
														</thead>
														<tbody id="tbody">
																												   		
													    </tbody>
													</table>
													<br>
													<div class="row">
														<label class="col-lg-1 col-form-label fw-semibold fs-6">Weight</label>
														<label class="col-lg-1 col-form-label fw-bold fs-6" id="tot_pl_weight">0.000</label>
														<label class="col-lg-1 col-form-label fw-semibold fs-6">Stoneless</label>
														<label class="col-lg-1 col-form-label fw-bold fs-6" id="tot_stone_weight">0.000</label>
														<label class="col-lg-1 col-form-label fw-semibold fs-6">Less</label>
														<label class="col-lg-1 col-form-label fw-bold fs-6" id="tot_less_weight">0.000</label>
														<label class="col-lg-1 col-form-label fw-semibold fs-6" >Net.Wght</label>
														<label class="col-lg-1 col-form-label fw-bold fs-6" id="tot_net_weight">0.000</label>
														<!-- <label class="col-lg-1 col-form-label fw-semibold fs-6">CurrRate</label> --><label class="col-lg-1 col-form-label fw-semibold fs-6">CurrRate</label>
														<label class="col-lg-1 col-form-label fw-bold fs-6">
															<?php 
															$cur_rate=$this->db->query("select * from general_settings")->row();
															echo number_format($cur_rate->gold_rate,2);
															 ?>
															 <input type="hidden" name="current_rate" id="current_rate" value="<?php echo $cur_rate->gold_rate; ?>">
														</label>
														<label class="col-lg-1 col-form-label fw-semibold fs-6">Purity%</label>
														<div class="col-lg-1 fv-row fv-plugins-icon-container">
															<input type="text" name="add_qual_new_loan" id="add_qual_new_loan" class="form-control form-control-lg1 form-control-solid" placeholder="Quality" onkeyup ="ple_calculation();" onfocus="ple_calculation();">
															<div class="fv-plugins-message-container invalid-feedback"></div>
														</div>
													</div>
													<div class="row">
														<label class="col-lg-1 col-form-label fw-semibold fs-6">Gram.Val</label>
														<label class="col-lg-1 col-form-label fw-bold fs-6" id="grm_val">0.00
															<input type="hidden" name="grm_val_hidden" id="grm_val_hidden">
														</label>
														<label class="col-lg-1 col-form-label fw-semibold fs-6" >SalesRate</label>
														<label class="col-lg-1 col-form-label fw-bold fs-6"  id="sale_rate">0.00<input type="hidden" name="sale_rate_hidden" id="sale_rate_hidden"></label>
														<label class="col-lg-1 col-form-label fw-semibold fs-6" style="color: #1a21e3 !important;font-weight: 600 !important;">H/L Bal</label>
														<label class="col-lg-1 col-form-label fw-bold fs-5" style="color: #1a21e3 !important;font-weight: 600 !important;">0.00</label>
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
																	<input type="text" name="loan_amount" id="loan_amount" class="form-control form-control-lg1 form-control-solid" style="font-size: 18px !important;font-weight: 700 !important;color: #1B439E !important;" onkeyup="calc_interest();">
																	<div class="fv-plugins-message-container invalid-feedback"></div>
																</div>
																<!--end::Col-->
															</div>
															<div class="row">
																<!--begin::Label-->
																<label class="col-lg-6 col-form-label fw-semibold fs-6">Monthly Interest</label>
																<label class="col-lg-6 col-form-label fw-bold fs-5"><span style="background-color:#C6C6C6;border-radius: 8px;padding: 5px 15px 5px 15px;" id="monthly_interest">0000</span></label>
															</div>
															<div class="row">
																<!--begin::Label-->
																<label class="col-lg-6 col-form-label required fw-semibold fs-6">Redemption period</label>
																<!--end::Label-->
																<!--begin::Col-->
																<div class="col-lg-3 fv-row fv-plugins-icon-container">
																	<input type="text" name="redemption_period" id="redemption_period" class="form-control form-control-lg1 form-control-solid" value="">
																	<div class="fv-plugins-message-container invalid-feedback"></div>
																</div>
																<!--end::Col-->
																<label class="col-lg-3 col-form-label fw-semibold fs-6" id="loan_per_mon_days">Days</label>
															</div>
															<div class="row">
																<label class="col-lg-6 col-form-label fw-semibold fs-6">M.Points Add</label>
																<div class="col-lg-3 fv-row fv-plugins-icon-container">
																	<input type="text" name="m_points_ad" id="m_points_ad" class="form-control form-control-lg1 form-control-solid" value="0">
																	<div class="fv-plugins-message-container invalid-feedback"></div>
																</div>
															</div>
															<div class="row">
																<label class="col-lg-6 col-form-label fw-semibold fs-6">Customer Rating</label>
																<div class="col-lg-6 fv-row fv-plugins-icon-container">
																	<select class="form-select form-select-solid" data-control="select2" data-hide-search="true" name="cust_rating" id="cust_rating" onchange="set_customer_rating()">
																		<option value="">Select Rating</option>
																		<option value="3">Good</option>
																		<option value="2">Average</option>
																		<option value="1">Bad</option>
																	</select>
																</div>
															</div><br><br>
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
																<label class="col-lg-6 col-form-label fw-semibold fs-6">Processing Charge</label>
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
																<label class="col-lg-6 col-form-label fw-semibold fs-6">Document Charge</label>
																<label class="col-lg-6 col-form-label fw-bold fs-5" id="doc_charge">0</label>
																<input type="hidden" name="doc_charge_hidden" id="doc_charge_hidden" value="0">
															</div>
															<div class="row">
																<!--begin::Label-->
																<label class="col-lg-6 col-form-label fw-semibold fs-6">Total</label>
																<label class="col-lg-6 col-form-label fw-bold fs-5" id="total_charges">0.00</label>
															</div>
															<div class="row">
																<!--begin::Label-->
																<label class="col-lg-6 col-form-label fw-semibold fs-6">Deduct From</label>
																<div class="col-lg-6">
																	<label class="form-check form-check-inline form-check-solid is-invalid mb-1">
																		<input class="form-check-input" name="charges_loan_amt" type="checkbox" value="checked" id="charges_loan_amt" >
																		<span class="col-form-label fw-semibold fs-6">Loan Amt</span>
																	</label>
																	<label class="form-check form-check-inline form-check-solid is-invalid">
																		<input class="form-check-input" name="charges_pay_separate" type="checkbox" value="checked" id="charges_pay_separate" >
																		<span class="col-form-label fw-semibold fs-6">Pay Separate</span>
																	</label>
																</div>
															</div>
															<div class="row">
																<!--begin::Label-->
																<label class="col-lg-6 col-form-label required fw-semibold fs-6">On Account</label>
																<!--end::Label-->
																<!--begin::Col-->
																<div class="col-lg-6 fv-row fv-plugins-icon-container">
																	<input type="text" name="on_account" id="on_account"  value="0" onkeyup="enable_on_acc_pay();" class="form-control form-control-lg1 form-control-solid" placeholder="" style="background-color: #ff5b5b; color: white">
																	<div class="fv-plugins-message-container invalid-feedback"></div>
																</div>
																<!--end::Col-->
															</div>
															<div class="row">
																<!--begin::Label-->
																<label class="col-lg-6 col-form-label fw-semibold fs-6">Deduct From</label>
																<div class="col-lg-6">
																	<label class="form-check form-check-inline form-check-solid is-invalid mb-1">
																		<input class="form-check-input" name="on_acc_loan_pay" type="checkbox" value="checked" id="on_acc_loan_pay" >
																		<span class="col-form-label fw-semibold fs-6">Loan Amt</span>
																	</label>
																	<label class="form-check form-check-inline form-check-solid is-invalid">
																		<input class="form-check-input" name="on_acc_pay_separate" type="checkbox" value="checked" id="on_acc_pay_separate" >
																		<span class="col-form-label fw-semibold fs-6">Pay Separate</span>
																	</label>
																</div>
															</div><br>
															<div class="row mt-4">
																<label class="col-lg-6 col-form-label fw-bold fs-3 text-center">Total &emsp; <span id="final_charges">0.00</span></label>
																
																<div class="col-lg-6 d-flex justify-content-end">
																	<p class="btn btn-sm btn-outline btn-outline-solid btn-outline-warning btn-active-light-primary me-2" data-bs-toggle="modal" data-bs-target="#kt_modal_payment_to_receive" id="btn_receive_payment">Receive</p>
																</div>
															</div>
														</div>
													</div>
													<div class="col-lg-4">
														<div class="px-4" style="border-radius: 10px;box-shadow: 0 5px 10px #00002947;">
															<label class="col-lg-12 col-form-label fw-bold fs-5 text-center">To Pay</label>
															<div class="row">
																<label class="col-lg-4 col-form-label fw-bold fs-3">Net Pay</label>
																<label class="col-lg-4 col-form-label fw-bold fs-3" id=
																"span_net_pay">0.00</label>
																<div class="col-lg-4">
																	<p class="btn btn-sm btn-outline btn-outline-solid btn-outline-warning btn-active-light-primary me-2" data-bs-toggle="modal" data-bs-target="#kt_modal_view_payment">Pay Now</p>
																</div>
															</div>
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
													<button type="submit" class="btn btn-primary" id="save_changes_add_new_loan" style="display: none;">Send to Sanction</button>
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
										<button class="btn btn-primary" onclick="pay_to_party();" data-bs-toggle="modal" data-bs-target="#kt_modal_view_payment">Pay</button>
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
					
					<div class="modal-body pt-0 pb-15 px-5 px-xl-20">
						<!--begin::Heading-->
						<div class="mb-13 text-center">
							<h1 class="mb-3">Payment to Receive</h1>
						</div>
						<!--end::Heading-->
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
									<button  class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_payment_to_receive" onclick="receive_from_party()">Deduct</button>
								</div>
							<!-- </div> -->
							</div>
							<!--end::Modal body-->
					</div>
					<!--end::Modal content-->
				</div>
				<!--end::Modal dialog-->
			</div>
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
	                
	                if(suggestion.member_points==0)
	                {
	                	document.getElementById('no_card').style.display="block";
	                	document.getElementById('lbl_mem_card_no').style.display="none";
	                	document.getElementById('card_type').style.display="none";
	                	document.getElementById('lbl_mem_point').style.display="none";
	                	document.getElementById('lbl_mem_verify').style.display="none";
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
	                
	                }
	        });
	         
$('#last_name').on('DOMSubtreeModified',function(){
  // alert('changed');
  var pid= $("#first_name_id_hidden").val();

  // alert(pid);
  
  $.ajax({
					type: "POST",
					url: baseurl+'loan/get_nominee_list',
					async: false,
					type: "POST",
					data: "id="+pid,
					dataType: "html",
					success: function(response)
					{
						// alert(response);
		                $('#nominee').empty().append(response);
					}
					});
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
	<script language="JavaScript">
		    

		    function take_loan_jewel()
		    {
		    	Webcam.set({
		        width: 125,
		        height: 125,
		        image_format: 'jpeg',
		        jpeg_quality: 90
		    	});
		  		Webcam.attach('#my_camera');
		  		// document.getElementById('take_party_photo').style.display="none";
		  		// document.getElementById('p_snap').style.display="block";
		  		document.getElementById('my_camera').style.display="block";
		        document.getElementById('results').style.display="none";
		    }
		  
		    function loan_jewel_snapshot() {
		    	// alert("hi");
		        Webcam.snap( function(data_uri) {
		            // $(".image-tag").val(data_uri);
		            document.getElementById('results').innerHTML = '<img src="'+data_uri+'" id="loan_jewel_photo" name="loan_jewel_photo" />';
		            document.getElementById('loan_jewel_photo_data').innerHTML =data_uri;
		            document.getElementById('my_camera').style.display="none";
		            document.getElementById('results').style.display="block";
		            // document.getElementById('take_party_photo').style.display="block";
		            // document.getElementById('p_snap').style.display="none";
		            Webcam.reset('#my_camera');

		        } );
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
			    	cont.empty().append('<tr id="tr_id'+count+'"><td id="td_id_1'+count+'">'+p_item+'<input type="hidden" id="pledge_item_hidden'+count+'" name="pledge_item_hidden[]" value="'+p_item+'"></td><td id="td_id_2'+count+'">'+p_description+'<input type="hidden" id="pledge_description_hidden'+count+'" name="pledge_description_hidden[]" value="'+p_description+'"> </td> <td id="td_id_3'+count+'">'+p_purity+'<input type="hidden" id="pledge_purity_hidden'+count+'" name="pledge_purity_hidden[]" value="'+p_purity+'"></td><td id="td_id_4'+count+'">'+p_pur_per+'<input type="hidden" id="pledge_purity_percent_hidden'+count+'" name="pledge_purity_percent_hidden[]" value="'+p_pur_per+'"></td> <td id="td_id_5'+count+'">'+p_weight+'<input type="hidden" id="pledge_weight_hidden'+count+'" name="pledge_weight_hidden[]" value="'+p_weight+'"></td><td id="td_id_6'+count+'">'+p_st_weight+'<input type="hidden" id="pledge_stone_weight_hidden'+count+'" name="pledge_stone_weight_hidden[]" value="'+p_st_weight+'"></td> <td  id="td_id_7'+count+'">'+p_less+'<input type="hidden" id="pledge_less_hidden'+count+'" name="pledge_less_hidden[]" value="'+p_less+'"></td><td id="td_id_8'+count+'">'+net_weight+'<input type="hidden" id="pledge_net_weight_hidden'+count+'" name="pledge_net_weight_hidden[]" value="'+net_weight+'"></td><td id="td_id_9'+count+'">'+dmg+'<input type="hidden" id="pledge_is_damage_hidden'+count+'" name="pledge_is_damage_hidden[]" value="'+dmg+'"></td><td id="td_id_10'+count+'"><div class="image-input mt-2 me-6" data-kt-image-input="true"><div class="image-input-wrapper w-40px h-40px"style="background-image: url(<?php echo base_url();?>assets/images/jewel.jpg)"></div></div><input type="hidden" id="pledge_image_hidden0" name="pledge_image_hidden[]" value=""></td> <td id="td_id_11'+count+'"><a href="javascript:;" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1" data-bs-toggle="modal" data-bs-target="#"><span class="svg-icon svg-icon-3"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path opacity="0.3" d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z" fill="currentColor"></path><path d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z" fill="currentColor"></path></svg></span></a> <a href="#" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm" data-bs-toggle="modal" data-bs-target="#" onclick="remove_row('+count+');"><span class="svg-icon svg-icon-3"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z" fill="currentColor"></path><path opacity="0.5" d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z" fill="currentColor"></path><path opacity="0.5" d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z" fill="currentColor"></path></svg></span></a></td></tr>');
			    	
			    	$('#pledge_item').val("");
			    	$('#pl_description').val("");
			    	$('#purity_per').val("");
			    	$('#weight_ple').val("");
			    	$('#stone_weight').val("");
			    	$('#less_ple').val("");
			    	// $('#weight').val("");
			    	document.getElementById('is_damage').checked==false;
			    	$('#add_ptyname_new_loan').val("");
			    	$('#add_ptyname_new_loan').select2().val("");
			    	// $('#add_ptyname_new_loan').select2({
				    //     dropdownParent: $('#kt_modal_newloan')
				    // });
			    	//alert(p_weight);
			    	var pw = parseFloat(p_weight).toFixed('3');
			    	// $('#add_weight_new_loan').val(pw);
			    	$('#tot_pl_weight').html(parseFloat(p_weight).toFixed('3'));
			    	$('#tot_stone_weight').html(parseFloat(p_st_weight).toFixed('3'));
			    	$('#tot_less_weight').html(parseFloat(p_less).toFixed('3'));
			    	$('#tot_net_weight').html(parseFloat(net_weight).toFixed('3'));

					var cr=parseFloat( $('#current_rate').val());
					$('#add_qual_new_loan').val(p_pur_per);
					// alert(cr);
					var tot=cr*(p_pur_per/100);
					// alert(tot);
					var tot_wt=parseFloat( tot*net_weight).toFixed(2);
					$('#grm_val').html(parseFloat(Math.round(tot)).toFixed(2));
					$('#grm_val_hidden').html(parseFloat(Math.round(tot)).toFixed(2));
					$('#sale_rate').html(Math.round(tot_wt));
					$('#sale_rate_hidden').html(Math.round(tot_wt));

					// var pl_it=$('#pledge_item_hidden'+count).val();
					// alert(pl_it);
			    }
			    else
			    {
			    	cont.append('<tr id="tr_id'+count+'"><td id="td_id_1'+count+'">'+p_item+'<input type="hidden" id="pledge_item_hidden'+count+'" name="pledge_item_hidden[]" value="'+p_item+'"></td><td id="td_id_2'+count+'">'+p_description+'<input type="hidden" id="pledge_description_hidden'+count+'" name="pledge_description_hidden[]" value="'+p_description+'"> </td> <td id="td_id_3'+count+'">'+p_purity+'<input type="hidden" id="pledge_purity_hidden'+count+'" name="pledge_purity_hidden[]" value="'+p_purity+'"></td><td id="td_id_4'+count+'">'+p_pur_per+'<input type="hidden" id="pledge_purity_percent_hidden'+count+'" name="pledge_purity_percent_hidden[]" value="'+p_pur_per+'"></td> <td id="td_id_5'+count+'">'+p_weight+'<input type="hidden" id="pledge_weight_hidden'+count+'" name="pledge_weight_hidden[]" value="'+p_weight+'"></td><td id="td_id_6'+count+'">'+p_st_weight+'<input type="hidden" id="pledge_stone_weight_hidden'+count+'" name="pledge_stone_weight_hidden[]" value="'+p_st_weight+'"></td> <td  id="td_id_7'+count+'">'+p_less+'<input type="hidden" id="pledge_less_hidden'+count+'" name="pledge_less_hidden[]" value="'+p_less+'"></td><td id="td_id_8'+count+'">'+net_weight+'<input type="hidden" id="pledge_net_weight_hidden'+count+'" name="pledge_net_weight_hidden[]" value="'+net_weight+'"></td><td id="td_id_9'+count+'">'+dmg+'<input type="hidden" id="pledge_is_damage_hidden'+count+'" name="pledge_is_damage_hidden[]" value="'+dmg+'"></td><td id="td_id_10'+count+'"><div class="image-input mt-2 me-6" data-kt-image-input="true"><div class="image-input-wrapper w-40px h-40px"style="background-image: url(<?php echo base_url();?>assets/images/jewel.jpg)"></div></div><input type="hidden" id="pledge_image_hidden0" name="pledge_image_hidden[]" value=""></td> <td id="td_id_11'+count+'"><a href="javascript:;" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1" data-bs-toggle="modal" data-bs-target="#"><span class="svg-icon svg-icon-3"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path opacity="0.3" d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z" fill="currentColor"></path><path d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z" fill="currentColor"></path></svg></span></a> <a href="#" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm" data-bs-toggle="modal" data-bs-target="#" onclick="remove_row('+count+');"><span class="svg-icon svg-icon-3"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z" fill="currentColor"></path><path opacity="0.5" d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z" fill="currentColor"></path><path opacity="0.5" d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z" fill="currentColor"></path></svg></span></a></td></tr>');

			    	$('#pledge_item').val("");
			    	$('#pl_description').val("");
			    	$('#purity_per').val("");
			    	$('#weight_ple').val("");
			    	$('#stone_weight').val("");
			    	$('#less_ple').val("");
			    	// $('#weight').val("");
			    	document.getElementById('is_damage').checked==false;
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

			  		var cr=parseFloat( $('#current_rate').val());
					var prev_pur= $('#add_qual_new_loan').val();
					var tot_pur= parseFloat(prev_pur) + parseFloat(p_pur_per);
					var div=Number(count)+1;
					var pur=parseFloat(tot_pur/div);
					$('#add_qual_new_loan').val(pur);
					var tot=cr*(pur/100);
					var tot_wt=tot*t_pl_nw;
					
					$('#grm_val').html(parseFloat(Math.round(tot)).toFixed(2));
					$('#grm_val_hidden').html(parseFloat(Math.round(tot)).toFixed(2));
					$('#sale_rate').html(Math.round(tot_wt));
					$('#sale_rate_hidden').html(Math.round(tot_wt));
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

	    	var cr=parseFloat( $('#current_rate').val());
			var prev_pur= $('#add_qual_new_loan').val();
			var pur_cal= parseFloat(prev_pur*count)-parseFloat(p_pur);
			var div=Number(count)-1;
			var tot_pur=parseFloat(pur_cal/div);
			// var tot_pur= parseFloat(prev_pur) + parseFloat(p_pur_per);
			// var div=Number(count)+1;
			// var pur=parseFloat(tot_pur/div);
			$('#add_qual_new_loan').val(tot_pur);
			var tot=cr*(tot_pur/100);
			var tot_wt=parseFloat( tot*t_pl_nw).toFixed(2);
			$('#grm_val').html(parseFloat(Math.round(tot)).toFixed(2));
			$('#grm_val_hidden').html(parseFloat(Math.round(tot)).toFixed(2));
			$('#sale_rate').html(Math.round(tot_wt));
			$('#sale_rate_hidden').html(Math.round(tot_wt));

			$('#tr_id'+t).remove();
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
			document.getElementById("first_name").focus();
		}
		else
		{
			$('#first_name_err').html('');
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
			};
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
							else{
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
										$('#doc_charge').html(response);
						                $('#doc_charge_hidden').val(response);
						                var dc_amt=parseFloat(response);
						                var pc=parseFloat( $('#processing_charge').val());
						                var tot=dc_amt+pc;
						                $('#total_charges').html(tot);
						                var fc=tot+
						                $('#final_charges').html(tot);
						                $('#lbl_tot_to_rcv').html(tot);
						                $('#tot_to_receive').val(tot);
									}
									});

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
			function enable_on_acc_pay()
			{
				var tc_amt=parseFloat($('#total_charges').html());
                var oc=parseFloat( $('#on_account').val());
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
				else if((document.getElementById('charges_loan_amt').checked==true) && (document.getElementById('on_acc_loan_pay').checked==true))
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

			if(cash_loan_paynow_add_radio.checked)
			{
				var pay_type='Cash';
				var pay_amt=$('#pay_to_party_cash').val();
				var pay_details=$('#pay_to_party_cash_details').val();
				var p_bank='';
				var ref_no='';
				var c_bank='';
				var p_bill_no=$('#p_bill_no').val();
				var p_pid=$('#p_pid').val();
     			
     			var datastring="pay_type="+pay_type+"&pay_amt="+pay_amt+"&pay_details="+pay_details+"&p_bank="+p_bank+"&ref_no="+ref_no+"&c_bank="+c_bank+"&p_bill_no="+p_bill_no+"&p_pid="+p_pid;
				$.ajax({
					type: "POST",
					url: baseurl+'loan/pay_to_party?',
					async: false,
					type: "POST",
					data: datastring,
					dataType: "html",
					success: function(response)
					{	
						// alert(response);
					}
					});
			}
			if(cheque_loan_paynow_add_radio.checked)
			{
				var pay_type='Cheque';
				var pay_amt=$('#pay_to_party_cheque_amount').val();
				var pay_details=$('#pay_to_party_cheque_details').val();
				var p_bank=$('#pay_to_party_cheque_party_bank').val();
				var ref_no=$('#pay_to_party_cheque_ref_no').val();
				var c_bank=$('#pay_to_party_cheque_company_bank').val();
				var p_bill_no=$('#p_bill_no').val();
				var p_pid=$('#p_pid').val();
     			
     			var datastring="pay_type="+pay_type+"&pay_amt="+pay_amt+"&pay_details="+pay_details+"&p_bank="+p_bank+"&ref_no="+ref_no+"&c_bank="+c_bank+"&p_bill_no="+p_bill_no+"&p_pid="+p_pid;
				$.ajax({
					type: "POST",
					url: baseurl+'loan/pay_to_party?',
					async: false,
					type: "POST",
					data: datastring,
					dataType: "html",
					success: function(response)
					{	
						// alert(response);
					}
					});
			}
			if(rtgs_loan_paynow_add_radio.checked)
			{
				var pay_type='RTGS';
				var pay_amt=$('#pay_to_party_rtgs_amount').val();
				var pay_details=$('#pay_to_party_rtgs_details').val();
				var p_bank=$('#pay_to_party_rtgs_party_bank').val();
				var ref_no=$('#pay_to_party_rtgs_ref_no').val();
				var c_bank=$('#pay_to_party_rtgs_company_bank').val();
				var p_bill_no=$('#p_bill_no').val();
				var p_pid=$('#p_pid').val();
     			
     			var datastring="pay_type="+pay_type+"&pay_amt="+pay_amt+"&pay_details="+pay_details+"&p_bank="+p_bank+"&ref_no="+ref_no+"&c_bank="+c_bank+"&p_bill_no="+p_bill_no+"&p_pid="+p_pid;
				$.ajax({
					type: "POST",
					url: baseurl+'loan/pay_to_party?',
					async: false,
					type: "POST",
					data: datastring,
					dataType: "html",
					success: function(response)
					{	
						// alert(response);
					}
					});
			}
			if(upi_loan_paynow_add_radio.checked)
			{
				var pay_type='UPI';
				var pay_amt=$('#pay_to_party_upi_amount').val();
				var pay_details=$('#pay_to_party_upi_details').val();
				var p_bank=$('#pay_to_party_upi_party_bank').val();
				var ref_no=$('#pay_to_party_upi_ref_no').val();
				var c_bank=$('#pay_to_company_upi_party_bank').val();
				var p_bill_no=$('#p_bill_no').val();
				var p_pid=$('#p_pid').val();
     			
     			var datastring="pay_type="+pay_type+"&pay_amt="+pay_amt+"&pay_details="+pay_details+"&p_bank="+p_bank+"&ref_no="+ref_no+"&c_bank="+c_bank+"&p_bill_no="+p_bill_no+"&p_pid="+p_pid;
				$.ajax({
					type: "POST",
					url: baseurl+'loan/pay_to_party?',
					async: false,
					type: "POST",
					data: datastring,
					dataType: "html",
					success: function(response)
					{	
						// alert(response);
					}
					});
			}
			
		}
		</script>
		<script >
		function receive_from_party()
		{
			var cash_loan_received_add_radio = document.getElementById("cash_loan_received_add_radio");
			var cheque_loan_received_add_radio = document.getElementById("cheque_loan_received_add_radio");
			var rtgs_loan_received_add_radio = document.getElementById("rtgs_loan_received_add_radio");
			var upi_loan_received_add_radio = document.getElementById("upi_loan_received_add_radio");

			if(cash_loan_received_add_radio.checked)
			{
				var pay_type='Cash';
				var pay_amt=$('#p_receive_cash').val();
				var pay_details=$('#p_receive_cash_details').val();
				var p_bank='';
				var ref_no='';
				var c_bank='';
				var p_bill_no=$('#p_bill_no').val();
				var p_pid=$('#p_pid').val();
     			
     			var datastring="pay_type="+pay_type+"&pay_amt="+pay_amt+"&pay_details="+pay_details+"&p_bank="+p_bank+"&ref_no="+ref_no+"&c_bank="+c_bank+"&p_bill_no="+p_bill_no+"&p_pid="+p_pid;
				$.ajax({
					type: "POST",
					url: baseurl+'loan/receive_from_party?',
					async: false,
					type: "POST",
					data: datastring,
					dataType: "html",
					success: function(response)
					{	
						// alert(response);
					}
					});
			}
			if(cheque_loan_received_add_radio.checked)
			{
				var pay_type='Cheque';
				var pay_amt=$('#p_receive_cheque_amount').val();
				var pay_details=$('#p_receive_cheque_details').val();
				var p_bank=$('#p_receive_cheque_party_bank').val();
				var ref_no=$('#p_receive_cheque_ref_no').val();
				var c_bank='';
				var p_bill_no=$('#p_bill_no').val();
				var p_pid=$('#p_pid').val();
     			
     			var datastring="pay_type="+pay_type+"&pay_amt="+pay_amt+"&pay_details="+pay_details+"&p_bank="+p_bank+"&ref_no="+ref_no+"&c_bank="+c_bank+"&p_bill_no="+p_bill_no+"&p_pid="+p_pid;
				$.ajax({
					type: "POST",
					url: baseurl+'loan/receive_from_party?',
					async: false,
					type: "POST",
					data: datastring,
					dataType: "html",
					success: function(response)
					{	
						// alert(response);
					}
					});
			}
			if(rtgs_loan_received_add_radio.checked)
			{
				var pay_type='RTGS';
				var pay_amt=$('#p_receive_rtgs_amount').val();
				var pay_details=$('#pay_to_party_rtgs_details').val();
				var p_bank='';
				var ref_no=$('#p_receive_rtgs_ref_no').val();
				var c_bank=$('#p_receive_rtgs_company_bank').val();
				var p_bill_no=$('#p_bill_no').val();
				var p_pid=$('#p_pid').val();
     			
     			var datastring="pay_type="+pay_type+"&pay_amt="+pay_amt+"&pay_details="+pay_details+"&p_bank="+p_bank+"&ref_no="+ref_no+"&c_bank="+c_bank+"&p_bill_no="+p_bill_no+"&p_pid="+p_pid;
				$.ajax({
					type: "POST",
					url: baseurl+'loan/receive_from_party?',
					async: false,
					type: "POST",
					data: datastring,
					dataType: "html",
					success: function(response)
					{	
						// alert(response);
					}
					});
			}
			if(upi_loan_received_add_radio.checked)
			{
				var pay_type='UPI';
				var pay_amt=$('#p_receive_upi_amount').val();
				var pay_details=$('#p_receive_upi_details').val();
				var p_bank='';
				var ref_no=$('#p_receive_upi_ref_no').val();
				var c_bank=$('#p_receive_upi_company_bank').val();
				var p_bill_no=$('#p_bill_no').val();
				var p_pid=$('#p_pid').val();
     			
     			var datastring="pay_type="+pay_type+"&pay_amt="+pay_amt+"&pay_details="+pay_details+"&p_bank="+p_bank+"&ref_no="+ref_no+"&c_bank="+c_bank+"&p_bill_no="+p_bill_no+"&p_pid="+p_pid;
				$.ajax({
					type: "POST",
					url: baseurl+'loan/receive_from_party?',
					async: false,
					type: "POST",
					data: datastring,
					dataType: "html",
					success: function(response)
					{	
						// alert(response);
					}
					});
			}
			
		}
		</script>
		<script>
			function payment_receive_calc()
			{
				var c=parseFloat($('#p_receive_cash').val());
				var ch=parseFloat($('#p_receive_cheque_amount').val());
				var rt=parseFloat($('#p_receive_rtgs_amount').val());
				var up=parseFloat($('#p_receive_upi_amount').val());
				var rc_tot=parseFloat($('#lbl_tot_to_rcv').html());
				if(c=='') c=0;
				if(ch=='') ch=0;
				if(rt=='') rt=0;
				if(up='') up=0;
				// alert(c);
				var tot= c+ch+rt+up;
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
				if(up='') up=0;
				// alert(c);
				var tot= c+ch+rt+up;
				// alert(tot);
				$('#lbl_paid_amt').html(tot);
				
				var diff=rc_tot - parseFloat(tot);
				$('#lbl_bal_amt').html(diff);
				// alert(diff);
			}
		</script>
	</body>
	<!--end::Body-->
</html>