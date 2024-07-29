<?php $this->load->view("common");?>
<!-- <script src="< ?php echo base_url();?>assets/js/webcam/jquery.min.js"></script> -->
<link href="<?php echo base_url();?>assets/jquery.autocomplete.css" rel="stylesheet" type="text/css" />
<script src="<?php echo base_url();?>assets/js/webcam/webcam.min.js"></script>
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
									<h1 class="d-flex align-items-center text-dark fw-bold my-1 fs-3">New Party 
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
										<?php if($this->session->flashdata('g_success')){?>
			                        <div class="alert alert-success" id="alertaddmessage">
			                         <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
			                        <?php echo $this->session->flashdata('g_success'); ?>
			                        </div>
			                        <?php } ?>

			                        <?php if($this->session->flashdata('g_err')){?>
			                        <div class="alert alert-success" id="alertaddmessage">
			                         <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
			                        <?php echo $this->session->flashdata('g_err'); ?>
			                        </div>
			                        <?php } ?>
								

								<!--begin::Card body-->
								<div class="card-body py-4">
									<form name="party_add_form" id="party_add_form" method="POST" action="<?php echo base_url(); ?>party/party_save" enctype="multipart/form-data" onsubmit="return party_validation();">
						
									<div class="row mb-6">
							
										<label class="col-lg-1 col-form-label required fw-semibold fs-6">Name</label>
										<!--end::Label-->
										<!--begin::Col-->
										<div class="col-lg-3 fv-row fv-plugins-icon-container">
											<input type="text" name="party_name" id="party_name" class="form-control form-control-lg form-control-solid" placeholder="Party Name">
											<div class="fv-plugins-message-container invalid-feedback" id="party_name_err" name="party_name_err"></div>
										</div>
										<!--end::Col-->			
										<!--begin::Label-->
										<label class="col-lg-1 col-form-label required fw-semibold fs-6">L.Name</label>
										<!--end::Label-->
										<!--begin::Col-->
										<div class="col-lg-3 fv-row fv-plugins-icon-container">
											<div class="row"> 
											<div class="col-lg-4">
												<select class="form-select form-select-solid" data-control="select2" data-placeholder="" name="prefix" id="prefix" data-hide-search="true" >
													<option value="S/o">S/o</option>
													<option value="D/o">D/o</option>
													<option value="W/o">W/o</option>
													<option value="C/o">C/o</option>
												</select></div>
											<div class="col-lg-8">
											<input type="text" name="lname" id="lname" class="form-control form-control-lg form-control-solid col-lg-2" placeholder="Last Name"></div>
											</div>
											<div class="fv-plugins-message-container invalid-feedback"  id="lname_err" name="lname_err"></div>
										</div>
										<!--end::Col-->
										<!--begin::Label-->
										<label class="col-lg-1 col-form-label fw-semibold fs-6">Oth.Name</label>
										<!--end::Label-->
										<!--begin::Col-->
										<div class="col-lg-3 fv-row fv-plugins-icon-container">
											<input type="text" name="oname" id="oname" class="form-control form-control-lg form-control-solid" placeholder="Guardian Name">
											<div class="fv-plugins-message-container invalid-feedback" name="oname_err" id="oname_err" ></div>
										</div>
										<!--end::Col-->
										<!--begin::Label-->
										<label class="col-lg-1 col-form-label fw-semibold fs-6">Mother</label>
										<!--end::Label-->
										<!--begin::Col-->
										<div class="col-lg-3 fv-row fv-plugins-icon-container">
											<input type="text" name="mother_name" id="mother_name" class="form-control form-control-lg form-control-solid" placeholder="Mother Name">
											<div class="fv-plugins-message-container invalid-feedback" name="mother_name_err" id="mother_name_err" ></div>
										</div>
										<!--end::Col-->
										
										<!--begin::Label-->
										<label class="col-lg-1 col-form-label required fw-semibold fs-6">Zone</label>
										<!--end::Label-->
										<!--begin::Left Section-->
										<div class="col-lg-3">
											<!--begin::Select-->
											<select aria-label="Select a Currency" data-control="select2" class="form-select form-select-solid form-select-lg fs-6 fw-semibold" name="zone" id="zone"  onchange="get_area()" >
												<option value="">Select Zone</option>
												<?php
													$zqry=$this->db->query("SELECT * FROM ZONE_MASTER ");
													$zonelist=$zqry->result_array();
													$j=1;
													foreach($zonelist as $zlist1)
													{

												?>
													<option value="<?php echo $zlist1['SNO']; ?>"> <?php echo $zlist1['ZONENAME'];?></option>
												<?php 
														$j++;
													}
												?>	
											</select>
											<!--end::Select-->
											<div class="fv-plugins-message-container invalid-feedback" name="zone_err" id="zone_err" ></div>
										</div>
										<!--end::Left Section-->
										<!--begin::Label-->
										<label class="col-lg-1 col-form-label required fw-semibold fs-6">Area</label>
										<!--end::Label-->
										<!--begin::Left Section-->
										<div class="col-lg-3">
											<!--begin::Select-->
											<select aria-label="Select a Currency" data-control="select2" class="form-select form-select-solid form-select-lg fs-6 fw-semibold" name="area" id="area" onchange="get_city()">
												<option value="">Select Area</option>
												
											</select>
											<!--end::Select-->
											<div class="fv-plugins-message-container invalid-feedback" name="area_err" id="area_err" ></div>

										</div>

										

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
											<select aria-label="Select a Currency" data-control="select2" class="form-select form-select-solid form-select-lg fs-6 fw-semibold" name="city" id="city" onchange="get_village()">
												<option value="">Select City</option>
												
											</select>
											<!--end::Select-->
											<div class="fv-plugins-message-container invalid-feedback" name="city_err" id="city_err" ></div>

										</div>
										<!--end::Left Section-->
										<!--begin::Label-->
										<label class="col-lg-1 col-form-label required fw-semibold fs-6">Village</label>
										<!--end::Label-->
										<!--begin::Left Section-->
										<div class="col-lg-3">
											<!--begin::Select-->
											<select aria-label="Select a Currency" data-control="select2" class="form-select form-select-solid form-select-lg fs-6 fw-semibold" name="village" id="village"   onchange="get_street()"> 
												<option value="">Select Village</option>
												
											</select>
											<!--end::Select-->
											<div class="fv-plugins-message-container invalid-feedback" name="village_err" id="village_err" ></div>

										</div>
										<!--end::Left Section-->
										<!--begin::Label-->
										<label class="col-lg-1 col-form-label fw-semibold fs-6">Street</label>
										<!--end::Label-->
										<!--begin::Col-->
										<div class="col-lg-3 fv-row fv-plugins-icon-container">
											<!--begin::Select-->
											<!-- <select class="form-select form-select-solid" data-control="select2" data-placeholder="Select Street" data-hide-search="true" name="street" id="street">
												<option selected>Select Street</option>
												
											</select> -->
											<input type="text" class="form-control" id="street" name="street" placeholder="Street">
											<input type="hidden" class="form-control" id="street_id_hidden" name="street_id_hidden">
											<!--end::Select-->
											<div class="fv-plugins-message-container invalid-feedback" name="street_err" id="street_err"></div>
										</div>
										<!--end::Col-->
										<!--begin::Label-->
										<label class="col-lg-1 col-form-label fw-semibold fs-6">Landmark</label>
										<!--end::Label-->
										<!--begin::Left Section-->
										<div class="col-lg-3 fv-row fv-plugins-icon-container">
											<input type="text" name="landmark" id="landmark" class="form-control form-control-lg form-control-solid" placeholder="Landmark" >
											<div class="fv-plugins-message-container invalid-feedback" name="landmark_err" id="landmark_err"></div>
										</div>
										<!--end::Left Section-->
										<!--begin::Label-->
										<label class="col-lg-1 col-form-label required fw-semibold fs-6">Mobile</label>
										<!--end::Label-->
										<!--begin::Col-->
										<div class="col-lg-3 fv-row fv-plugins-icon-container">
											<div class="input-group">
												<input type="text" name="mobile" id="mobile" class="form-control form-control-lg form-control-solid" placeholder="Mobile Number"  minlength="10"  size="10" maxlength="10" oninput="this.value = this.value.replace(/[^0-9 ]/g, '').replace(/(\..*)\./g, '$1');" onkeyup="icon_load();">
												<span class="input-group-text" style="margin-top: 8px !important;padding: 0px 10px 0px 10px !important;">
													<i class="fas fa-check-circle fs-3 text-primary" id="save_changes_add_new_loan" onclick="return check_phno_exists();" ></i>
													<i class="fas fa-spinner fa-pulse fs-4" style="color: black !important; display: none;" id="icon_spin"></i>
									        		<i class="fas fa-check-circle fs-3 text-success" style=" display: none;" id="icon_success"></i>
									        		<i class="fas fa-times-circle fs-3 text-danger" style=" display: none;" id="icon_fail"></i>
									        	</span>
								        	</div>
											<div class="fv-plugins-message-container invalid-feedback" name="mobile_err" id="mobile_err"></div>
										</div>
										<!--end::Col-->
										<!--begin::Label-->
										<label class="col-lg-1 col-form-label  fw-semibold fs-6">Alt. Mobile</label>
										<!--end::Label-->
										<!--begin::Col-->
										<div class="col-lg-3 fv-row fv-plugins-icon-container">
											<input type="text" name="phone2" id="phone2" class="form-control form-control-lg form-control-solid" placeholder="Alternate Mobile Number" >
											<div class="fv-plugins-message-container invalid-feedback" name="phone2_err" id="phone2_err"></div>
										</div>
										<!--end::Col-->
										<!--begin::Col-->
										<div class="col-lg-1 fv-row fv-plugins-icon-container fv-plugins-bootstrap5-row-invalid">
											<!--begin::Options-->
											<div class="d-flex align-items-center mt-3">
												<!--begin::Option-->
												<label class="form-check form-check-inline form-check-solid me-5 is-invalid" style="float: right;padding-left: 80px;">
													<input class="form-check-input" name="w_chk" id="w_chk" type="checkbox" checked  onclick="EnableDisableTextBox()">
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
										<!--begin::Label-->
										<label id="w_lbl" name="w_lbl" class="col-lg-1 col-form-label required fw-semibold fs-6" style="display: none;">Whatsapp No</label>
										<!--end::Label-->
										<!--begin::Col-->
										<div class="col-lg-3 fv-row fv-plugins-icon-container" id="w_div" style="display: none;">
											<input type="text" name="w_no" id="w_no" class="form-control form-control-lg form-control-solid" placeholder=" Whatsapp Phone" style="display: none;"  >
											<div class="fv-plugins-message-container invalid-feedback" id="w_msg_div" style="display: none;">
											</div>
										</div>
										<!--end::Col-->
										<!--begin::Label-->
										<label class="col-lg-1 col-form-label fw-semibold fs-6">Email</label>
										<!--end::Label-->
										<!--begin::Col-->
										<div class="col-lg-3 fv-row fv-plugins-icon-container">
											<input type="text" name="email" id="email" class="form-control form-control-lg form-control-solid" placeholder="Email ID">
											<div class="fv-plugins-message-container invalid-feedback" name="email_err" id="email_err" ></div>
										</div>
										<!--end::Col-->			
										<!--begin::Label-->
										<label class="col-lg-1 col-form-label required fw-semibold fs-6">Aadhar</label>
										<!--end::Label-->
										<!--begin::Col-->
										<div class="col-lg-3 fv-row fv-plugins-icon-container">
											<input type="text" name="aadhar" id="aadhar" class="form-control form-control-lg form-control-solid" placeholder="Aadhar No" >
											<div class="fv-plugins-message-container invalid-feedback" name="aadhar_err" id="aadhar_err" ></div>
										</div>
										<!--end::Col-->
										<!--begin::Label-->
										<label class="col-lg-1 col-form-label  fw-semibold fs-6">ID Type</label>
										<!--end::Label-->
										<!--begin::Left Section-->
										<div class="col-lg-3">
											<!--begin::Select-->
											<select class="form-select form-select-solid" data-control="select2" data-placeholder="Select ID" data-hide-search="true" id="idtype" name="idtype">
												<option selected="">Select ID</option>
												<?php
													$idqry=$this->db->query("SELECT * FROM IDTYPE where status!=2");
													$idlist=$idqry->result_array();
													$i=1;
													foreach($idlist as $list1)
													{

												?>
													<option value="<?php echo $list1['IDTYPENAME']; ?>"> <?php echo $list1['IDTYPENAME'];?></option>
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
											<input type="text" name="id_no" id="id_no" class="form-control form-control-lg form-control-solid" placeholder="ID Number">
											<div class="fv-plugins-message-container invalid-feedback" name="id_no_err" id="id_no_err" ></div>
										</div>
										<!--end::Col-->
										<!--begin::Label-->
										<label class="col-lg-1 col-form-label  fw-semibold fs-6">Work</label>
										<!--end::Label-->
										<!--begin::Left Section-->
										<div class="col-lg-3">
											<!--begin::Select-->
											<select class="form-select form-select-solid" data-control="select2" data-placeholder="Select Work" data-hide-search="true" id="worktype" name="worktype">
												<option selected="">Select Work</option>
												<?php
													$wqry=$this->db->query("SELECT * FROM WORKTYPE ");
													$worklist=$wqry->result_array();
													$w=1;
													foreach($worklist as $wlist)
													{

												?>
													<option value="<?php echo $wlist['WORKTYPENAME']; ?>"> <?php echo $wlist['WORKTYPENAME'];?></option>
												<?php 
													$w++;
													}
												?>
												<!-- <option value="2">Lawyer</option> -->
											</select>
											<!--end::Select-->
										</div>
										<!-- <div class="row"> -->
										<label class="col-lg-1 col-form-label required fw-semibold fs-6"> Rating</label>
										<div class="col-lg-3">
											<select class="form-select form-select-solid" data-control="select2"  name="rating" id="rating">
													<option value="">Select Rating</option>
													<option value="3">Good</option>
													<option value="2">Average</option>
													<option value="1">Bad</option>
											</select>
											<div class="fv-plugins-message-container invalid-feedback" name="rating_err" id="rating_err" ></div>
										</div>
								</div>
								<label class="col-form-label fw-bold fs-4">Nominee Details</label>
								<div class="row" >
									<div class="col-lg-12">
										<div id="kt_docs_repeater_basic_add1">
											<div class="form-group">
												<div id="mcontent11">
													<div class="row" id="mid10">
														
														<div class="col-lg-2 fv-row">
															<input type="text" class="form-control mb-2 mb-md-0" placeholder="Nominee Name" name="add_nominee_name[]" id="add_nominee_name0">
														</div>
														<div class="col-lg-2 fv-row">
															<input type="text" class="form-control mb-2 mb-md-0" placeholder="Relation" name="add_relation[]" id="add_relation0">
														</div>
														<div class="col-lg-2 fv-row">
															<input type="text" class="form-control mb-2 mb-md-0" placeholder="Phone No" name="add_ph_no[]" id="add_ph_no0" minlength="10"  size="10" maxlength="10" oninput="this.value = this.value.replace(/[^0-9 ]/g, '').replace(/(\..*)\./g, '$1');">
														</div>
														
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-lg-2 fv-row"></div>
												<div class="col-lg-2 fv-row"></div>
												<div class="col-lg-2 fv-row"></div>
												<div class="col-lg-2 form-group fv-row">
													<button type="button" class="btn btn-sm btn-success mt-md-3" onclick="add_nominee();" ><i class="la la-plus fs-7"></i></button>
													
												</div>
											</div>
										</div>
										<input type="hidden" id="acc_led_id1" value="1">
									</div>
								</div>
								<br><br>
								<div class="row mb-6">
									<!--begin::Label-->
									<label class="col-lg-1 col-form-label fw-semibold fs-6">Party</label>
									<!--end::Label-->
									<!--begin::Col-->
									<div class="col-lg-2">
										<div class="image-input image-input-outline" data-kt-image-input="true" >
											<!--begin::Preview existing avatar-->
											<div class="image-input-wrapper w-175px h-150px" style="background-image: url('<?php echo base_url(); ?>assets/images/Party.jpg')" id="my_camera"> </div>
												<!--begin::Label-->
													<label class="btn btn-icon btn-circle  btn-active-color-primary bg-body shadow w-40px h-25px" data-kt-image-input-action="change" data-bs-toggle="tooltip" data-kt-initialized="1">
													<i class="bi bi-pencil-fill fs-7 "></i>
													<!--begin::Inputs-->
													<input type="file" name="party_photo" id="party_photo" accept=".png, .jpg, .jpeg">
													<input type="hidden" name="add_party_remove_redemp">
													<!--end::Inputs-->
													</label>
													<!--end::Label-->
													<!--begin::Cancel-->
													<span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" data-kt-initialized="1">
														<i class="bi bi-x fs-2 "></i>
													</span>
													<!--end::Cancel-->
													<!--begin::Remove-->
													<span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" data-kt-initialized="1">
														<i class="bi bi-x fs-2 "></i>
													</span>
												<!--end::Remove-->
											<div id="results" class="image-input-wrapper w-175px h-150px" style="display: none;">Your captured image will appear here...</div>
											
											
										</div>
										
										<div class="btn btn-outline btn-outline-solid btn-outline-warning btn-active-light-primary" id="take_party_photo" onclick="take_party()" style="display: block;">Take Photo</div>

										<div class="btn btn-outline btn-outline-solid btn-outline-warning btn-active-light-primary" id="p_snap" onclick="party_snapshot()" style="display: none;">Capture</div>

										<textarea hidden="hidden" id="party_photo_data" name="party_photo_data"></textarea>
									</div>
									<!--end::Col-->
									<div class="col-lg-1"></div>
									<label class="col-lg-1 col-form-label fw-semibold fs-6">Signature</label>
									<div class="col-lg-2">
										<!--begin::Image input-->
										<div class="image-input image-input-outline" data-kt-image-input="true" >
											<div class="image-input-wrapper w-175px h-150px" style="background-image: url('<?php echo base_url(); ?>assets/images/Signature.jpg')" id="my_camera_sign"> </div>
											<!--begin::Preview existing avatar-->
											<label class="btn btn-icon btn-circle  btn-active-color-primary bg-body shadow w-40px h-25px" data-kt-image-input-action="change" data-bs-toggle="tooltip" data-kt-initialized="1">
															<i class="bi bi-pencil-fill fs-7 "></i>
															<!--begin::Inputs-->
															<input type="file" name="sign_photo" id="sign_photo" accept=".png, .jpg, .jpeg">
															<input type="hidden" name="add_party_remove_redemp">
															<!--end::Inputs-->
														</label>
														<!--end::Label-->
														<!--begin::Cancel-->
														<span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" data-kt-initialized="1">
															<i class="bi bi-x fs-2 "></i>
														</span>
														<!--end::Cancel-->
														<!--begin::Remove-->
														<span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" data-kt-initialized="1">
															<i class="bi bi-x fs-2 "></i>
														</span>
														<!--end::Remove-->
									
											<div id="results_sign" class="image-input-wrapper w-175px h-150px" style="display: none;">Your captured image will appear here...</div>

										</div>
										<div class="btn btn-outline btn-outline-solid btn-outline-warning btn-active-light-primary " id="take_sign_photo" onclick="take_sign()" style="display: block;">Take&nbsp;Signature</div>
										<div class="btn btn-outline btn-outline-solid btn-outline-warning btn-active-light-primary " id="s_snap" onclick="sign_snapshot()" style="display: none;"> Capture </div>			
										<textarea hidden="hidden" id="sign_photo_data" name="sign_photo_data"></textarea>					
									</div>
									<div class="col-lg-1"></div>
									<!--begin::Label-->
									<label class="col-lg-1 col-form-label  fw-semibold fs-6">ID Photo</label>
									<!--end::Label-->
									<!--begin::Col-->
									<div class="col-lg-2">
										<!--begin::Image input-->
										<div class="image-input image-input-outline" data-kt-image-input="true" >
											<!--begin::Preview existing avatar-->
											<div class="image-input-wrapper w-175px h-150px" style="background-image: url('<?php echo base_url();?>assets/images/Party_Proof.jpg')" id="my_camera_other"> </div>
											<!--begin::Preview existing avatar-->
											<label class="btn btn-icon btn-circle  btn-active-color-primary bg-body shadow w-40px h-25px" data-kt-image-input-action="change" data-bs-toggle="tooltip" data-kt-initialized="1">
												<i class="bi bi-pencil-fill fs-7 "></i>
												<!--begin::Inputs-->
												<input type="file" name="id_photo" id="id_photo" accept=".png, .jpg, .jpeg">
												<input type="hidden" name="add_party_remove_redemp">
												<!--end::Inputs-->
											</label>
											<!--end::Label-->
											<!--begin::Cancel-->
											<span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" data-kt-initialized="1">
												<i class="bi bi-x fs-2 "></i>
											</span>
											<!--end::Cancel-->
											<!--begin::Remove-->
											<span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" data-kt-initialized="1">
												<i class="bi bi-x fs-2 "></i>
											</span>
															<!--end::Remove-->
											<div id="results_other" class="image-input-wrapper w-175px h-150px" style="display: none;">Your captured image will appear here...</div>
											
										</div>
										<div class="btn btn-outline btn-outline-solid btn-outline-warning btn-active-light-primary " id="take_other_photo" onclick="take_other()" style="display: block;"> Take ID Photo </div>
											<div class="btn btn-outline btn-outline-solid btn-outline-warning btn-active-light-primary " id="o_snap" onclick="other_snapshot()" style="display: none;"> Capture </div>
										<textarea hidden="hidden" id="other_photo_data" name="other_photo_data"></textarea>
									</div>
									<!--end::Col-->	
									<label class="col-form-label fw-bold fs-4">Payment Information</label>
									<div class="row" >
										<div class="col-lg-12">
											<div id="kt_docs_repeater_basic_add">
												<div class="form-group">
													<div id="mcontent10">
														<div class="row" id="mid0">
															<div class="col-lg-1 fv-row">
																<select class="form-select form-select-solid h-35px w-90px"  placeholder="Type" name="add_type[]" id="add_type0" onchange="show_hide_bank(0)">
																	<option value="">Select</option>
																	<option value="UPI">UPI</option>
																	<option value="Bank">Bank</option>
																</select >
															</div>
															<div class="col-lg-2 fv-row">
																<input type="text" class="form-control mb-2 mb-md-0" placeholder="Payment/Bank Name" name="add_bank_name[]" id="add_bank_name0">
															</div>
															<div class="col-lg-2 fv-row">
																<input type="text" class="form-control mb-2 mb-md-0" placeholder="A/C No/Ph No" name="add_acc_no[]" id="add_acc_no0">
															</div>
															<div class="col-lg-2 fv-row">
																<input type="text" class="form-control mb-2 mb-md-0" placeholder="Holder Name" name="add_acc_name[]" id="add_acc_name0">
															</div>
															
															<div class="col-lg-2 fv-row" id="add_branch_name_div0" style="display: none;">
																<input type="text" class="form-control mb-2 mb-md-0" placeholder="Branch Name" name="add_branch_name[]" id="add_branch_name0" >
															</div>
															<div class="col-lg-2 fv-row" id="add_ifsc_code_div0" style="display: none;">
																<input type="text" class="form-control mb-2 mb-md-0" placeholder="IFSC Code" name="add_ifsc_code[]" id="add_ifsc_code0" >
															</div>
														</div>
													</div>
												</div>
												<div class="col-lg-2 form-group fv-row">

													<button type="button" class="btn btn-sm btn-success mt-md-3" onclick="add_bank();" ><i class="la la-plus fs-7"></i></button>
													<!-- <a href="javascript:;" onclick="add_bank()" class="btn btn-sm  btn-success me-2"> -->
													<!-- +</a> -->
												</div>
											</div>
											<input type="hidden" id="acc_led_id" value="1">
										</div>			
									</div>
								</div>
								<div class="row" style="margin-top: -3rem !important;">
									<div class="col-lg-9"></div>
									<div class="col-lg-1">
										<div class="d-flex flex-center flex-row-fluid pt-12">
											<button type="reset" class="btn btn-secondary me-3" data-bs-dismiss="modal">Cancel</button>
										</div>
									</div>
									<div class="col-lg-2">
										<div class="d-flex flex-center flex-row-fluid pt-12">
											<button type="submit" class="btn btn-primary" >Save Changes</button>
										</div>
									</div>
								</div>
								</div>
								<!--end::Card body-->
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
		<!--begin::Modal - party history-->
		<div class="modal fade" id="kt_modal_party_history" tabindex="-1" aria-hidden="true">
			
		</div>
		<!--end::Modal - party history-->
		<!--begin::Modal - view particular party loan summary history-->
		<div class="modal fade" id="kt_modal_view_particular_party_loan_summary_history" tabindex="-1" aria-hidden="true">
			
		</div>
		<!--end::Modal -view particular party loan summary history-->
		<!--begin::Modal - add party-->
		<div class="modal fade" id="kt_modal_add_party" tabindex="-1" aria-hidden="true">
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
							<h1 class="mb-3">New Party</h1>
						</div>
					</div>
					<!--end::Modal body-->
				</div>
				<!--end::Modal content-->
			</div>
			<!--end::Modal dialog-->
		</form>
		</div>
		<!--end::Modal - add party-->
		<!--begin::Modal - edit party-->
		<div class="modal fade" id="kt_modal_edit_party" tabindex="-1" aria-hidden="true">
			
		</div>
		<!--end::Modal - edit party-->
		<!--begin::Modal - view party-->
		<div class="modal fade" id="kt_modal_view_party" tabindex="-1" aria-hidden="true">
			
		</div>
		<!--end::Modal - view party-->
		<!--begin::Modal - view party-->
		<div class="modal fade" id="kt_modal_view_party_history" tabindex="-1" aria-hidden="true">
			
		</div>
		<!--end::Modal - view party-->
		<!--begin::Modal - delete party-->
		<div class="modal fade" id="kt_modal_delete_party" tabindex="-1" aria-hidden="true">
			
		</div>
		<!--end::Modal - delete party-->


		<!--begin::Modal - verify Mobile Number-->
		<div class="modal fade" id="kt_modal_verify_party_phone_number" tabindex="-1" aria-hidden="true">
			<!--begin::Modal dialog-->
			<div class="modal-dialog modal-m">
				<!--begin::Modal content-->
				<div class="modal-content rounded">
					<div class="modal-header justify-content-end border-0 pb-0">
						<!--begin::Close-->
						<div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
							<!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
							<span class="svg-icon svg-icon-1" onclick="closePhnoModal();">
								<svg width="24" height="24" viewBox="0 0 24 24" fill="none"
									xmlns="http://www.w3.org/2000/svg">
									<rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1"
										transform="rotate(-45 6 17.3137)" fill="currentColor" />
									<rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)"
										fill="currentColor" />
								</svg>
							</span>
							<!--end::Svg Icon-->
						</div>
						<!--end::Close-->
					</div>
					<div class="modal-body px-6 py-8">
						<div class="mb-6 text-center">
							<h2>The Phone Number <span class="text-danger" id="chk_ph_no"></span> Already Exists.</h2>
						</div>
						<table class="table align-middle table-row-dashed table-striped gy-1 gs-2" id="party_phone_number">
							<tbody class="text-gray-600 fw-bold fs-6" id="tbody_ph_no_list">
								
						  </tbody>
						</table>
						<div class="d-flex justify-content-center align-items-center mt-6">
							<button type="reset" class="btn btn-secondary me-2" data-bs-dismiss="modal" onclick="closePhnoModal();">Cancel</button>
							<button type="submit" class="btn btn-primary" data-bs-dismiss="modal" onclick="ph_validate()">That's Ok</button>
						</div>
					</div>
				</div>
				<!--end::Modal content-->
			</div>
			<!--end::Modal dialog-->
		</div>
		<!--end::Modal - verify Mobile Number-->


		<?php $this->load->view("script");?>
		<script src="<?php echo base_url();?>assets/jquery.autocomplete.js"></script>
		<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script> -->
		<input type="hidden" id="baseurl" value="<?php echo base_url();?>">

<script >
	var baseurl = $("#baseurl").val();
	var village = $('#village').val();

	// url:baseurl+'party/streetList?query=%QUERY%&vid='+village,
	// data:'vid'+vid,
	$("#street").autocomplete({ 
		    valueKey:'title',
            source:[{
            url:baseurl+'party/streetList?query=%QUERY%',
            type:'remote',
            ajax:{
              dataType : 'json',
            }
        }]}).on('selected.xdsoft',function(e,suggestion,ui){ 
            $("#street").val(suggestion.street_name);
            $('#street_id_hidden').val(suggestion.street_id);
            
    });
</script>

<script>
	$("#party_phone_number").DataTable({
		"ordering": false,
		// "aaSorting":[],
		 "language": {
		  "lengthMenu": "Show _MENU_",
		 },
		 "dom":
		  "<'row'" +
		  // "<'col-sm-6 d-flex align-items-center justify-conten-start'l>" +
		  // "<'col-sm-6 d-flex align-items-center justify-content-end'f>" +
		  ">" +

		  "<'table-responsive'tr>" +

		  "<'row'" +
		  // "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
		  // "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
		  ">"
		});
</script>
		
		<script>
			// $('#more_bank').click(function(){
				// alert("gy")
				// var count=$('#bank_count').val();
				// alert(count);
				// var cont = $("#add_more_bank_det");
				// alert('success');
				// alert('<div class="row" id="add_details'+count+'"><div class="col-lg-2 fv-row"><input type="text" class="form-control mb-2 mb-md-0" placeholder="Bank Name" name="add_bank_name[]" id="add_bank_name'+count+'"></div><div class="col-lg-2 fv-row"><input type="text" class="form-control mb-2 mb-md-0" placeholder="Branch Name" name="add_branch_name[]" id="add_branch_name'+count+'"></div><div class="col-lg-2 fv-row"><input type="text" class="form-control mb-2 mb-md-0" placeholder="A/c Holder Name" name="add_acc_name[]" id="add_acc_name'+count+'"></div><div class="col-lg-2 fv-row"><input type="text" class="form-control mb-2 mb-md-0" placeholder="A/C Number" name="add_acc_no[]" id="add_acc_no'+count+'"></div><div class="col-lg-2 fv-row"><input type="text" class="form-control mb-2 mb-md-0" placeholder="IFSC Code" name="add_ifsc_code[]" id="add_ifsc_code'+count+'"></div><div class="col-lg-2 fv-row"><button type="button" class="btn btn-sm btn-danger mt-md-3" onclick="remove_bank('+count+')" ><i class="la la-trash-o fs-3"></i>Delete</button></div></div>');
				// cont.append('<div class="row" id="add_details'+count+'"><div class="col-lg-2 fv-row"><input type="text" class="form-control mb-2 mb-md-0" placeholder="Bank Name" name="add_bank_name[]" id="add_bank_name'+count+'"></div><div class="col-lg-2 fv-row"><input type="text" class="form-control mb-2 mb-md-0" placeholder="Branch Name" name="add_branch_name[]" id="add_branch_name'+count+'"></div><div class="col-lg-2 fv-row"><input type="text" class="form-control mb-2 mb-md-0" placeholder="A/c Holder Name" name="add_acc_name[]" id="add_acc_name'+count+'"></div><div class="col-lg-2 fv-row"><input type="text" class="form-control mb-2 mb-md-0" placeholder="A/C Number" name="add_acc_no[]" id="add_acc_no'+count+'"></div><div class="col-lg-2 fv-row"><input type="text" class="form-control mb-2 mb-md-0" placeholder="IFSC Code" name="add_ifsc_code[]" id="add_ifsc_code'+count+'"></div><div class="col-lg-2 fv-row"><button type="button" class="btn btn-sm btn-danger mt-md-3" onclick="remove_bank('+count+')" ><i class="la la-trash-o fs-3"></i>Delete</button></div></div>');

			// });
			// $("#kt_datatable_both_scrolls").DataTable({
			//     "scrollY": 180,
			//     "scrollX": true
			//     // "ordering":false
			// });

			//  $("#kt_datatable_view_particular_party_loan_summary_history_both_scrolls").DataTable({
			//     "scrollY": 150,
			//     "scrollX": true
			//     // "ordering":false
			// });
		</script>


<script type="text/javascript">
	function add_bank()
{
    var count=$('#acc_led_id').val();
    var cont = $("#mcontent10");
    
    cont.append('<div class="row" id="mid'+count+'"><div class="col-lg-1 fv-row"><select class="form-select form-select-solid h-35px w-90px" placeholder="Type" name="add_type[]" id="add_type'+count+'" onchange="show_hide_bank('+count+')"><option value="">Select</option><option value="UPI">UPI</option><option value="Bank">Bank</option></select ></div><div class="col-lg-2 fv-row"><input type="text" class="form-control mb-2 mb-md-0" placeholder="Payment/Bank Name" name="add_bank_name[]" id="add_bank_name'+count+'"></div><div class="col-lg-2 fv-row"><input type="text" class="form-control mb-2 mb-md-0" placeholder="A/C No/Ph no" name="add_acc_no[]" id="add_acc_no'+count+'"></div><div class="col-lg-2 fv-row"><input type="text" class="form-control mb-2 mb-md-0" placeholder="Holder Name" name="add_acc_name[]" id="add_acc_name'+count+'"></div><div class="col-lg-2 fv-row" id="add_branch_name_div'+count+'" style="display:none"><input type="text" class="form-control mb-2 mb-md-0" placeholder="Branch Name" name="add_branch_name[]" id="add_branch_name'+count+'"></div><div class="col-lg-2 fv-row" id="add_ifsc_code_div'+count+'" style="display:none"><input type="text" class="form-control mb-2 mb-md-0" placeholder="IFSC Code" name="add_ifsc_code[]" id="add_ifsc_code'+count+'"></div><div class="col-lg-1 fv-row"><button type="button" class="btn btn-sm btn-danger mt-md-3" onclick="delete_bank('+count+');" ><i class="la la-trash-o fs-3"></i></button></div></div>');

    count=Number(count)+1;
    $('#acc_led_id').val(count);

}

function delete_bank(i)
{
	$('#mid'+i).remove();
}
</script>

<script type="text/javascript">
	function add_nominee()
{
    var count=$('#acc_led_id1').val();
    var cont = $("#mcontent11");
    
    cont.append('<div class="row" id="mid1'+count+'"><div class="col-lg-2 fv-row"><input type="text" class="form-control mb-2 mb-md-0" placeholder="Nominee Name" name="add_nominee_name[]" id="add_nominee_name'+count+'"></div><div class="col-lg-2 fv-row"><input type="text" class="form-control mb-2 mb-md-0" placeholder="Relation" name="add_relation[]" id="add_relation'+count+'"></div><div class="col-lg-2 fv-row"><input type="text" class="form-control mb-2 mb-md-0" placeholder="Phone No" name="add_ph_no[]" id="add_ph_no'+count+'"></div> <div class="col-lg-1 fv-row"><button type="button" class="btn btn-sm btn-danger mt-md-3" onclick="delete_nominee('+count+');" >	<i class="la la-trash-o fs-3"></i></button></div>	</div>');

    count=Number(count)+1;
    $('#acc_led_id').val(count);

}

function delete_nominee(i)
{
	$('#mid1'+i).remove();
}
</script>

		
		<script>
			$('#kt_datatable_dom_positioning').DataTable( {
	"aaSorting": [],
        dom: 'Bfrtip',
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5'
        ]
    } );
	
	var title = $('title').text() + ' | ' + 'Party';
    $(document).attr("title", title);

		</script>
<script >

function get_area()
{
	var zid = $('#zone').val()
	var baseurl= $("#baseurl").val();
	 // alert(zone);
	$.ajax({
	type: "POST",
	url: baseurl+'party/get_area',
	async: false,
	type: "POST",
	data: "zoneid="+zid,
	dataType: "html",
	success: function(response)
	{
		$('#area').empty().append(response);
	//$("#kt_modal_delete_village").css("display", "block");
	}
	});
}
function get_city()
{
	var aid = $('#area').val()
	var baseurl= $("#baseurl").val();
	 // alert(aid);
	$.ajax({
	type: "POST",
	url: baseurl+'party/get_city',
	async: false,
	type: "POST",
	data: "areaid="+aid,
	dataType: "html",
	success: function(response)
	{
	$('#city').empty().append(response);
	//$("#kt_modal_delete_village").css("display", "block");
	}
	});
}
function get_village(){
	var cid = $('#city').val()
	var baseurl= $("#baseurl").val();
	 // alert(aid);
	$.ajax({
	type: "POST",
	url: baseurl+'party/get_village',
	async: false,
	type: "POST",
	data: "cityid="+cid,
	dataType: "html",
	success: function(response)
	{
	$('#village').empty().append(response);
	//$("#kt_modal_delete_village").css("display", "block");
	}
	});
}
function get_street(){
	var vid = $('#village').val()
	var baseurl= $("#baseurl").val();
	 // alert(aid);
	$.ajax({
	type: "POST",
	url: baseurl+'party/get_street',
	async: false,
	type: "POST",
	data: "villageid="+vid,
	dataType: "html",
	success: function(response)
	{
		// $('#street').empty().append(response);
		//$("#kt_modal_delete_village").css("display", "block");

	}
	});
}
function party_validation()
{
	var err = 0;
	var party_name = $('#party_name').val();
	var lname = $('#lname').val();
	var zone = $('#zone').val();
	var area = $('#area').val();
	var city = $('#city').val();
	var village = $('#village').val();
	// var street = $('#street').val();
	var mobile = $('#mobile').val();
	var aadhar = $('#aadhar').val();
	var rating = $('#rating').val();

	// alert(zone);
    if(party_name.trim()=='')
    {
        $('#party_name_err').html('Enter Party Name!');
        document.getElementById('party_name').focus();
        err++;
    }
    else
    {
       
		$('#party_name_err').html('');

		
    }
    if(lname.trim()=='')
    {
        $('#lname_err').html('Enter Father name!');
        document.getElementById('lname').focus();
        err++;
    }
    else
    {
		$('#lname_err').html('');
    }
    if(zone=='')
    {
        $('#zone_err').html('Please Select Zone!');
        document.getElementById('zone').focus();
        err++;
    }
    else
    {
		$('#zone_err').html('');
    }
    if(area.trim()=='')
    {
        $('#area_err').html('Please Select Area!');
        document.getElementById('area').focus();
        err++;
    }
    else
    {
		$('#area_err').html('');
    }
    if(city.trim()=='')
    {
        $('#city_err').html('Please Select City!');
        document.getElementById('city').focus();
        err++;
    }
    else
    {
		$('#city_err').html('');
    }
    if(village.trim()=='')
    {
        $('#village_err').html('Please Select Village!');
        document.getElementById('village').focus();
        err++;
    }
    else
    {
		$('#village_err').html('');
    }
    if(mobile.trim()=='')
    {
        $('#mobile_err').html('Enter Mobile Number!');
        document.getElementById('mobile').focus();
        err++;
    }
    else
    {
		$('#mobile_err').html('');
    }
    if(aadhar.trim()=='')
    {
        $('#aadhar_err').html('Enter Aadhar Number!');
        document.getElementById('aadhar').focus();
        err++;
    }
    else
    {
		$('#aadhar_err').html('');
    }
    if(rating.trim()=='')
    {
        $('#rating_err').html('Please Select Customer Rating!');
        document.getElementById('rating').focus();
        err++;
    }
    else
    {
		$('#rating_err').html('');
    }
    if(document.getElementById('w_chk').checked==false)
    {

    	var w=$('#w_no').val();
    	if(w.trim()=='')
	    {
	        $('#w_msg_div').html('Please Enter Whatsapp no!');
	        err++;
	    }
	    else
	    {
			$('#w_msg_div').html('');
	    }	
    }
    if(err>0){ return false; }else{ return true; }
}		

function party_view(val)
{
	var baseurl= $("#baseurl").val();
	// alert(baseurl);
	$.ajax({
	type: "POST",
	url: baseurl+'party/party_view',
	async: false,
	type: "POST",
	data: "id="+val,
	dataType: "html",
	success: function(response)
	{
	$('#kt_modal_view_party').empty().append(response);
	$('#kt_modal_view_party').addClass('show');
	//$("#kt_modal_editdept").css("display", "block");
	}
});
}
function party_history_view(val)
{
	var baseurl= $("#baseurl").val();
	// alert(baseurl);
	$.ajax({
	type: "POST",
	url: baseurl+'party/party_history_view',
	async: false,
	type: "POST",
	data: "id="+val,
	dataType: "html",
	success: function(response)
	{
	$('#kt_modal_view_party_history').empty().append(response);
	$('#kt_modal_view_party_history').addClass('show');
	//$("#kt_modal_editdept").css("display", "block");
	}
});
}
function closeViewModal()
{
	var baseurl= $("#baseurl").val();
	$('#kt_modal_view_party').removeClass('show');
	//$("#kt_modal_update_role").css("display", "none");
	$('.modal-backdrop').removeClass('show');
	window.location.href = baseurl+'party';
}
function closeHistoryViewModal()
{
	var baseurl= $("#baseurl").val();
	$('#kt_modal_view_party_history').removeClass('show');
	//$("#kt_modal_update_role").css("display", "none");
	$('.modal-backdrop').removeClass('show');
	window.location.href = baseurl+'party';
}
function party_delete(val)
{
	var baseurl= $("#baseurl").val();
	//alert(val);
	$.ajax({
	type: "POST",
	url: baseurl+'party/party_delete',
	async: false,
	type: "POST",
	data: "id="+val,
	dataType: "html",
	success: function(response)
	{
	$('#kt_modal_delete_party').empty().append(response);
	$('#kt_modal_delete_party').addClass('show');
	//$("#kt_modal_delete_role").css("display", "block");
	}
	});
}

function removeParty(val)
{ 
	var baseurl= $("#baseurl").val();
	$.ajax({
	type: "POST",
	url: baseurl+'party/delete',
	async: false,
	data:"field="+val,
	success: function(response)
	{
	window.location.href = baseurl+'party';
	}
	});
}
function closeDeleteModal()
{
		var baseurl= $("#baseurl").val();
		$('#kt_modal_delete_party').removeClass('show');
		$('.modal-backdrop').removeClass('show');
		window.location.href = baseurl+'party';
}
function party_edit(val)
{
	var baseurl= $("#baseurl").val();
	// alert(baseurl);
	$.ajax({
	type: "POST",
	url: baseurl+'party/party_edit',
	async: false,
	type: "POST",
	data: "id="+val,
	dataType: "html",
	success: function(response)
	{
	$('#kt_modal_edit_party').empty().append(response);
	$('#kt_modal_edit_party').addClass('show');
	//$("#kt_modal_editdept").css("display", "block");
	}
});
}
function closeEditModal()
{
	var baseurl= $("#baseurl").val();
	$('#kt_modal_edit_party').removeClass('show');
	//$("#kt_modal_update_role").css("display", "none");
	$('.modal-backdrop').removeClass('show');
	window.location.href = baseurl+'party';
}

function party_edit_validation()
{
	var erre = 0;
	var party_name = $('#party_name_edit').val();
	var lname = $('#lname_edit').val();
	var zone = $('#zone_edit').val();
	var area = $('#area_edit').val();
	var city = $('#city_edit').val();
	var village = $('#village_edit').val();
	var mobile = $('#mobile_edit').val();
	// var aadhar = $('#aadhar').val();
	var rating = $('#rating_edit').val();
    if(party_name.trim()=='')
    {
        $('#party_edit_err').html('Enter Party Name!');
        erre++;
    }
    else
    {
       
		$('#party_edit_err').html('');
		
    }
    if(lname.trim()=='')
    {
        $('#lname_edit_err').html('Enter Father name!');
        erre++;
    }
    else
    {
		$('#lname_edit_err').html('');
    }
    if(zone.trim()=='')
    {
        $('#zone_edit_err').html('Please Select Zone!');
        erre++;
    }
    else
    {
		$('#zone_edit_err').html('');
    }
    if(area.trim()=='')
    {
        $('#area_edit_err').html('Please Select Area!');
        erre++;
    }
    else
    {
		$('#area_edit_err').html('');
    }
    if(city.trim()=='')
    {
        $('#city_edit_err').html('Please Select City!');
        erre++;
    }
    else
    {
		$('#city_edit_err').html('');
    }
    if(village.trim()=='')
    {
        $('#village_edit_err').html('Please Select Village!');
        erre++;
    }
    else
    {
		$('#village_edit_err').html('');
    }
    if(mobile.trim()=='')
    {
        $('#mobile_edit_err').html('Enter Mobile Number!');
        erre++;
    }
    else
    {
		$('#mobile_edit_err').html('');
    }
  //   if(aadhar.trim()=='')
  //   {
  //       $('#aadhar_err').html('Enter Aadhar Number!');
  //       err++;
  //   }
  //   else
  //   {
		// $('#aadhar_err').html('');
  //   }
    if(rating.trim()=='')
    {
        $('#rating_edit_err').html('Please Select Customer Rating!');
        erre++;
    }
    else
    {
		$('#rating_edit_err').html('');
    }
    if(erre>0){ return false; }else{ return true; }
}	

function get_area_edit(){
	var zid = $('#zone_edit').val()
var baseurl= $("#baseurl").val();
 // alert(zone);
$.ajax({
type: "POST",
url: baseurl+'party/get_area_edit',
async: false,
type: "POST",
data: "zoneid="+zid,
dataType: "html",
success: function(response)
{
$('#area_edit').empty().append(response);
//$("#kt_modal_delete_village").css("display", "block");
}
});
}


</script>

<script type="text/javascript">
	 $("#landmark").autocomplete({ 
		    valueKey:'title',
            source:[{
            url:baseurl+'Karuppattiparty/towncityList?query=%QUERY%',
            type:'remote',
            ajax:{
              dataType : 'json',
            }
        }]}).on('selected.xdsoft',function(e,suggestion,ui){ 
            $("#landmark").val(suggestion.citytown);
            
    });
</script>
<script >
		var baseurl = $("#baseurl").val();
		$("#id_no").autocomplete({ 
			    valueKey:'title',
	            source:[{
	            url:baseurl+'Karuppattiparty/pincodeList?query=%QUERY%',
	            type:'remote',
	            ajax:{
	              dataType : 'json',
	            }
	        }]}).on('selected.xdsoft',function(e,suggestion,ui){ 
	            $("#id_no").val(suggestion.pincode);
	            
	    });
	    
	</script>
<script type="text/javascript">
    function EnableDisableTextBox() {
        var wa = document.getElementById("whatsapp");
        var chk_val=document.getElementById("w_chk");
        var chk_val1=document.getElementById("w_chk").checked;
        // alert(chk_val1);
        if (chk_val1==false) {
        	// wa.style="display: block";
        	document.getElementById("w_lbl").style="display:block;"
        	document.getElementById("w_no").style="display:block;"
        	document.getElementById("w_div").style="display:block;"
        	document.getElementById("w_msg_div").style="display:block;"
            //txtPassportNumber.focus();
        }
        else
        {
        	// wa.style="display: none";
        	document.getElementById("w_lbl").style="display:none;"
        	document.getElementById("w_no").style="display:none;"
        	document.getElementById("w_div").style="display:none;"
        	document.getElementById("w_msg_div").style="display:none;"
        }

    }
    function EEnableDisableTextBox() {
        // var wa = document.getElementById("whatsapp_edit");
        var chk_val=document.getElementById("w_chk_edit");
        var chk_val1=document.getElementById("w_chk_edit").checked;
        // alert(chk_val1);
        if (chk_val1==false) {
        	// wa.style="display: block";
        	document.getElementById("w_lbl_edit").style="display:block;"
        	document.getElementById("w_no_edit").style="display:block;"
        	document.getElementById("w_div_edit").style="display:block;"
        	document.getElementById("w_msg_div_edit").style="display:block;"
            //txtPassportNumber.focus();
        }
        else
        {
        	// wa.style="display: none";
        	document.getElementById("w_lbl_edit").style="display:none;"
        	document.getElementById("w_no_edit").style="display:none;"
        	document.getElementById("w_div_edit").style="display:none;"
        	document.getElementById("w_msg_div_edit").style="display:none;"
        }

    }
</script>
<script type="text/javascript">
	function show_hide_bank(id)
{
    var tid = $('#add_type'+id).val();
    if(tid=="Bank")
    {
	    document.getElementById('add_branch_name'+id).style.display="block";
	    document.getElementById('add_ifsc_code'+id).style.display="block";
	    document.getElementById('add_branch_name_div'+id).style.display="block";
	    document.getElementById('add_ifsc_code_div'+id).style.display="block";
    }
    else
    {
    	document.getElementById('add_branch_name'+id).style.display="none";
	    document.getElementById('add_ifsc_code'+id).style.display="none";
	    document.getElementById('add_branch_name_div'+id).style.display="none";
	    document.getElementById('add_ifsc_code_div'+id).style.display="none";

    }
}
</script>

<!-- Configure a few settings and attach camera -->
		<script language="JavaScript">
		    

		    function take_party()
		    {
		    	Webcam.set({
		        width: 175,
		        height: 150,
		        image_format: 'jpeg',
		        jpeg_quality: 90
		    	});
		  		Webcam.attach('#my_camera');
		  		document.getElementById('take_party_photo').style.display="none";
		  		document.getElementById('p_snap').style.display="block";
		  		document.getElementById('my_camera').style.display="block";
		        document.getElementById('results').style.display="none";
		    }
		  
		    function party_snapshot() {
		    	// alert("data_uri");
		        Webcam.snap(function(data_uri) {
		            // $(".image-tag").val(data_uri);
		            alert(data_uri);
		            document.getElementById('results').innerHTML = '<img src="'+data_uri+'" id="party_photo" name="party_photo" />';
		            document.getElementById('party_photo_data').innerHTML =data_uri;
		            document.getElementById('my_camera').style.display="none";
		            document.getElementById('results').style.display="block";
		            document.getElementById('take_party_photo').style.display="block";
		            document.getElementById('p_snap').style.display="none";
		            Webcam.reset('#my_camera');

		        } );
		    }
		    
		</script>

		<script language="JavaScript">
		    
		  
		  function take_other()
		    {
		    	Webcam.set({
		        width: 175,
		        height: 150,
		        image_format: 'jpeg',
		        jpeg_quality: 90
		    	});
		  		Webcam.attach('#my_camera_other');
		  		document.getElementById('take_other_photo').style.display="none";
		  		document.getElementById('o_snap').style.display="block";
		  		document.getElementById('my_camera_other').style.display="block";
		        document.getElementById('results_other').style.display="none";
		    }
		    function other_snapshot() {
		    	// alert("hi");
		        Webcam.snap( function(data_uri) {
		            // $(".image-tag").val(data_uri);
		            document.getElementById('results_other').innerHTML = '<img src="'+data_uri+'" id="party_photo" name="party_photo" />';
		            document.getElementById('other_photo_data').innerHTML =data_uri;
		            document.getElementById('my_camera_other').style.display="none";
		            document.getElementById('results_other').style.display="block";
		            document.getElementById('take_other_photo').style.display="block";
		            document.getElementById('o_snap').style.display="none";
		            Webcam.reset('#my_camera_other');

		        } );
		    }
		    
		</script>
		<script language="JavaScript">
		    
		  
		    function take_sign()
		    {
		    	Webcam.set({
		        width: 175,
		        height: 150,
		        image_format: 'jpeg',
		        jpeg_quality: 90
		    });
		  		Webcam.attach('#my_camera_sign');
		  		document.getElementById('take_sign_photo').style.display="none";
		  		document.getElementById('s_snap').style.display="block";
		  		document.getElementById('my_camera_sign').style.display="block";
		        document.getElementById('results_sign').style.display="none";
		    }
		    function sign_snapshot() {
		    	// alert("hi");
		        Webcam.snap( function(data_uri) {
		            // $(".image-tag").val(data_uri);
		            document.getElementById('results_sign').innerHTML = '<img src="'+data_uri+'" id="party_photo" name="party_photo" />';
		            document.getElementById('sign_photo_data').innerHTML =data_uri;
		            document.getElementById('my_camera_sign').style.display="none";
		            document.getElementById('results_sign').style.display="block";
		            document.getElementById('take_sign_photo').style.display="block";
		            document.getElementById('s_snap').style.display="none";
		            Webcam.reset('#my_camera_sign');

		        } );
		    }
		</script>
		<script type="text/javascript">
			function check_phno_exists()
			{
				var mb=$('#mobile').val();
				var baseurl= $("#baseurl").val();

				$.ajax({
				type: "POST",
				url: baseurl+'party/check_phno_exists',
				async: false,
				type: "POST",
				data: "mob="+mb,
				dataType: "html",
				success: function(response)
				{
					if(response=='0')
					{
						document.getElementById('save_changes_add_new_loan').style.display='none';
						document.getElementById('icon_success').style.display='block';
						document.getElementById('icon_spin').style.display='none';
						document.getElementById('icon_fail').style.display='none';
						$('#kt_modal_verify_party_phone_number').removeClass('show');
						$('.modal-backdrop').removeClass('show');
						$('#kt_modal_verify_party_phone_number').hide();
						$('.modal-backdrop').hide();
						// $('#mobile').val('');					
					}
					else
					{
						$('#tbody_ph_no_list').empty().append(response);	
						$('#chk_ph_no').html(mb);
						document.getElementById('save_changes_add_new_loan').style.display='none';
						document.getElementById('icon_success').style.display='none';
						document.getElementById('icon_fail').style.display='block';
						document.getElementById('icon_spin').style.display='none';
						
						// $('#mobile').val('');

						$('#kt_modal_verify_party_phone_number').addClass('show');
						$('.modal-backdrop').addClass('show');
						$('#kt_modal_verify_party_phone_number').show();
						$('.modal-backdrop').show();
					}
				}
				});
				
			}
			function closePhnoModal()
			{
				$('#kt_modal_verify_party_phone_number').removeClass('show');
				$('.modal-backdrop').removeClass('show');
				$('#kt_modal_verify_party_phone_number').hide();
				$('.modal-backdrop').hide();
			}
			function ph_validate()
			{
				document.getElementById('save_changes_add_new_loan').style.display='none';
				document.getElementById('icon_fail').style.display='none';
				document.getElementById('icon_spin').style.display='none';
				// document.getElementById('mobile').value='';
				document.getElementById('icon_success').style.display='block';
				closePhnoModal();
			}
			function icon_load()
			{
				var mb=$('#mobile').val();
				var cnt=mb.length;
				// alert(cnt);
				if(cnt==10)
				{
					document.getElementById('save_changes_add_new_loan').style.display='block';
					document.getElementById('icon_success').style.display='none';
					document.getElementById('icon_fail').style.display='none';
					document.getElementById('icon_spin').style.display='none';
				}
				else
				{
					document.getElementById('save_changes_add_new_loan').style.display='none';
					document.getElementById('icon_success').style.display='none';
					document.getElementById('icon_fail').style.display='none';
					document.getElementById('icon_spin').style.display='block';
				}
			};
		</script>
	</body>
	<!--end::Body-->
</html>