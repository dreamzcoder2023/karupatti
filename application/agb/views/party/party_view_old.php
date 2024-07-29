<?php $this->load->view("common");?>
<!-- <script src="<?php echo base_url();?>assets/js/webcam/jquery.min.js"></script> -->
<script src="<?php echo base_url();?>assets/js/webcam/webcam.min.js"></script>
<style>
	.dataTables_scroll
    {
        position: relative;
        overflow: auto;
        max-height: 115px;/*the maximum height you want to achieve*/
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
									<h1 class="d-flex align-items-center text-dark fw-bold my-1 fs-3">View Party 
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
			                    <!-- </div> -->
								

								<!--begin::Card body-->
								<div class="card-body py-4">	

									<div class="rounded border p-10">
													<div class="mb-5 hover-scroll-x">
														<div class="d-grid">
															<ul class="nav nav-tabs flex-nowrap text-nowrap">
																<li class="nav-item">
																	<a class="nav-link active btn btn-active-light btn-color-black-800 btn-active-color-primary rounded-bottom-0 fw-bold fs-6" data-bs-toggle="tab" href="#kt_tab_pane_11">Party Info</a>
																</li>
																<li class="nav-item">
																	<a class="nav-link btn btn-active-light btn-color-black-800 btn-active-color-primary rounded-bottom-0 fw-bold fs-6" data-bs-toggle="tab" href="#kt_tab_pane_1">Loans</a>
																</li>

																<li class="nav-item">
																	<a class="nav-link btn btn-active-light btn-color-black-800 btn-active-color-primary rounded-bottom-0 fw-bold fs-6" data-bs-toggle="tab" href="#kt_tab_pane_1_1">Receipts</a>
																</li>
																
																<li class="nav-item">
																	<a class="nav-link btn btn-active-light btn-color-black-800 btn-active-color-primary rounded-bottom-0 fw-bold fs-6" data-bs-toggle="tab" href="#kt_tab_pane_2">Credits</a>
																</li>
																<li class="nav-item">
																	<a class="nav-link btn btn-active-light btn-color-black-800 btn-active-color-primary rounded-bottom-0 fw-bold fs-6" data-bs-toggle="tab" href="#kt_tab_pane_3">Chits</a>
																</li>
																<!-- <li class="nav-item">
																	<a class="nav-link btn btn-active-light btn-color-black-800 btn-active-color-primary rounded-bottom-0 fw-bold fs-6" data-bs-toggle="tab" href="#kt_tab_pane_4">Hand Loan</a>
																</li>
																<li class="nav-item">
																	<a class="nav-link btn btn-active-light btn-color-black-800 btn-active-color-primary rounded-bottom-0 fw-bold fs-6" data-bs-toggle="tab" href="#kt_tab_pane_5">ALP(Ayyanar Land Promoters)</a>
																</li> -->
															</ul>
														</div>
													</div>
													<?php 
													$result=$this->db->query("SELECT L.*, R.SELLINGAMOUNT, R.SELLINGREMARKS, R.SELLINGTO FROM LOANS L INNER JOIN REDEMPTIONS R ON L.BILLNO=R.BILLNO WHERE L.PID='".$party_details->PID."'")->result_array();

													?>
													<div class="tab-content" id="myTabContent">
														<div class="tab-pane fade show active" id="kt_tab_pane_11" role="tabpanel">
															<input type="hidden" id="party_id" name="party_id" value="<?php echo $party_details->PID;?>">

															<div class="row mb-6">
																<!--begin::Label-->

																<span class="text-muted fw-semibold fs-6" style="text-align: right !important;">Party ID: <?php echo $party_details->PID;?></span>
																<label class="col-lg-1 col-form-label fw-semibold fs-6">Name</label>
																<!--end::Label-->
																<!--begin::Col-->
																<div class="col-lg-3 fv-row fv-plugins-icon-container">
																	
																	<label class="col col-form-label fw-semibold fs-6" ><b><?php echo $party_details->NAME;?></b></label>
																	
																	<div class="fv-plugins-message-container invalid-feedback"></div>
																</div>
																<!--end::Col-->			
																<!--begin::Label-->
																<label class="col-lg-1 col-form-label fw-semibold fs-6">L.Name</label>
																<!--end::Label-->
																<!--begin::Col-->
																<div class="col-lg-3 fv-row fv-plugins-icon-container">
																	
																		<label class="col col-form-label fw-semibold fs-6" ><?php echo $party_details->LASTNAME_PREFIX.",<b>".$party_details->FATHERSNAME;?></b></label>
																	<!-- <input type="text" name="lname" id="lname" class="form-control form-control-lg form-control-solid col-lg-2" placeholder="Last" value="<?php echo $party_details->FATHERSNAME;?>" readonly>-->
																	
																	<div class="fv-plugins-message-container invalid-feedback"  id="lname_err" name="lname_err"></div>
																</div>
																<!--end::Col-->
																<!--begin::Label-->
																<label class="col-lg-1 col-form-label fw-semibold fs-6">Oth.Name</label>
																<!--end::Label-->
																<!--begin::Col-->
																<div class="col-lg-3 fv-row fv-plugins-icon-container">
																	<label class="col col-form-label fw-semibold fs-6" ><b><?php echo ($party_details->OTHER_NAME=='')?'--':$party_details->OTHER_NAME;?></b></label>
																	<div class="fv-plugins-message-container invalid-feedback"></div>
																</div>
																<!--end::Col-->
																<!--begin::Label-->
																<label class="col-lg-1 col-form-label fw-semibold fs-6">Mother </label>
																<!--end::Label-->
																<!--begin::Col-->
																<div class="col-lg-3 fv-row fv-plugins-icon-container">
																	<label class="col col-form-label fw-semibold fs-6" ><b><?php echo ($party_details->MOTHER_NAME=='')?'--':$party_details->MOTHER_NAME;?></b></label>
																	
																	<div class="fv-plugins-message-container invalid-feedback"></div>
																</div>
																<!--end::Col-->
																
																<!--begin::Label-->
																<label class="col-lg-1 col-form-label fw-semibold fs-6">Zone</label>
																<!--end::Label-->
																<!--begin::Left Section-->
																<div class="col-lg-3">
																	<!--begin::Select-->
																	<?php 
																		 
																		$zqry=$this->db->query("SELECT * FROM ZONE_MASTER WHERE SNO='".$party_details->ZONE_SNO."'");
																		$zonelist=$zqry->row();
																		?>
																		<label class="col col-form-label fw-semibold fs-6" ><b><?php echo (!is_null($party_details->ZONE_SNO))?$zonelist->ZONENAME:'--';?></b></label>
																</div>
																<!--end::Left Section-->
																<!--begin::Label-->
																<label class="col-lg-1 col-form-label fw-semibold fs-6">Area</label>
																<!--end::Label-->
																<!--begin::Left Section-->
																<div class="col-lg-3 fv-row fv-plugins-icon-container">
																	<label class="col col-form-label fw-semibold fs-6" ><b><?php 
																	if($party_details->TYPE_OF_RECORD=='O'){
																	echo ($party_details->AREA=='')?'--':$party_details->AREA;}
																	else
																	{
																		$area_det=$this->db->query("select * from AREA where SNO='".$party_details->AREA_ID."'")->row();
																		echo $area_det->AREANAME;
																	}
																	?></b></label>
																	
																	<div class="fv-plugins-message-container invalid-feedback"></div>
																</div>

																<!--begin::Label-->
																<label class="col-lg-1 col-form-label fw-semibold fs-6">City</label>
																<!--end::Label-->
																<!--begin::Left Section-->
																<div class="col-lg-3 fv-row fv-plugins-icon-container">
																	<label class="col col-form-label fw-semibold fs-6" ><b><?php 
																	if($party_details->TYPE_OF_RECORD=='O'){
																	echo ($party_details->CITY=='')?'--':$party_details->CITY;
																	}
																	else
																	{
																		$area_det=$this->db->query("select * from CITY where CITYID='".$party_details->CITY_ID."'")->row();
																		echo $area_det->CITYNAME;
																	}

																	?></b></label>
																	
																	<div class="fv-plugins-message-container invalid-feedback"></div>
																</div>
																<!--end::Left Section-->
																<!--begin::Label-->
																<label class="col-lg-1 col-form-label fw-semibold fs-6">Village</label>
																<!--end::Label-->
																<!--begin::Left Section-->
																<div class="col-lg-3 fv-row fv-plugins-icon-container">
																	<label class="col col-form-label fw-semibold fs-6" ><b><?php 
																	if($party_details->TYPE_OF_RECORD=='O'){
																	echo ($party_details->ADDRESS2=='')?'--':$party_details->ADDRESS2;
																	}
																	else
																	{
																		$area_det=$this->db->query("select * from VILLAGE where VILLAGEID='".$party_details->VILLAGE_ID."'")->row();
																		echo $area_det->VILLAGENAME;
																	}
																	?></b></label>
																	
																	<div class="fv-plugins-message-container invalid-feedback"></div>
																</div>
																<!--end::Left Section-->
																<!--begin::Label-->
																<label class="col-lg-1 col-form-label fw-semibold fs-6">Street</label>
																<!--end::Label-->
																<!--begin::Col-->
																<div class="col-lg-3 fv-row fv-plugins-icon-container">
																	<label class="col col-form-label fw-semibold fs-6" ><b><?php 
																	if($party_details->TYPE_OF_RECORD=='O'){
																	echo ($party_details->ADDRESS1=='')?'--':$party_details->ADDRESS1;
																	}
																	else
																	{
																		$area_det=$this->db->query("select * from STREET where STREETID='".$party_details->STREET_ID."'")->row();
																		echo $area_det->STREETNAME;
																	}
																	?></b></label>
																	
																	<div class="fv-plugins-message-container invalid-feedback"></div>
																</div>
																<!--end::Col-->
																<!--begin::Label-->
																<label class="col-lg-1 col-form-label fw-semibold fs-6">Landmark</label>
																<!--end::Label-->
																<!--begin::Left Section-->
																<div class="col-lg-3 fv-row fv-plugins-icon-container">
																	<label class="col col-form-label fw-semibold fs-6" ><b><?php echo ($party_details->LANDMARK=='')?'--':$party_details->LANDMARK;?></b></label>
																	
																	<div class="fv-plugins-message-container invalid-feedback"></div>
																</div>
																<!--end::Left Section-->
																<!--begin::Label-->
																<label class="col-lg-1 col-form-label fw-semibold fs-6">Mobile</label>
																<!--end::Label-->
																<!--begin::Col-->
																<div class="col-lg-3 fv-row fv-plugins-icon-container">
																	<label class="col col-form-label fw-semibold fs-6" ><b><?php echo ($party_details->PHONE=='')?'--':$party_details->PHONE;?></b></label>
																	<div class="fv-plugins-message-container invalid-feedback"></div>
																</div>
																<!--end::Col-->
																<!--begin::Label-->
																<label class="col-lg-1 col-form-label fw-semibold fs-6">Whatsapp</label>
																<!--end::Label-->
																<!--begin::Col-->
																<div class="col-lg-3 fv-row fv-plugins-icon-container">
																	<label class="col col-form-label fw-semibold fs-6" ><b><?php echo ($party_details->WHATSAPP=='')?'--':$party_details->WHATSAPP;?></b></label>
																	<div class="fv-plugins-message-container invalid-feedback"></div>
																</div>
																<!--end::Col-->
																
																<!--begin::Label-->
																<label class="col-lg-1 col-form-label fw-semibold fs-6">Phone</label>
																<!--end::Label-->
																<!--begin::Col-->
																<div class="col-lg-3 fv-row fv-plugins-icon-container">
																	<label class="col col-form-label fw-semibold fs-6" ><b><?php echo ($party_details->PHONE2=='')?'--':$party_details->PHONE2;?></b></label>
																	
																	<div class="fv-plugins-message-container invalid-feedback"></div>
																</div>
																<!--end::Col-->
																<!--begin::Label-->
																<label class="col-lg-1 col-form-label fw-semibold fs-6">Email</label>
																<!--end::Label-->

																<!--begin::Col-->
																<div class="col-lg-3 fv-row fv-plugins-icon-container">
																	<label class="col col-form-label fw-semibold fs-6" ><b><?php echo ($party_details->EMAIL=='')?'--':$party_details->EMAIL;?></b></label>
																	
																	<div class="fv-plugins-message-container invalid-feedback"></div>
																</div>
																<!--end::Col-->			
																<!--begin::Label-->
																<label class="col-lg-1 col-form-label fw-semibold fs-6">Aadhar</label>
																<!--end::Label-->
																<!--begin::Col-->
																<div class="col-lg-3 fv-row fv-plugins-icon-container">
																	<label class="col col-form-label fw-semibold fs-6" ><b><?php echo ($party_details->AADHAAR_NO=='')?'--':$party_details->AADHAAR_NO;?></b></label>
																	
																	<div class="fv-plugins-message-container invalid-feedback"></div>
																</div>
																<!--end::Col-->
																<!--begin::Label-->
																<label class="col-lg-1 col-form-label fw-semibold fs-6">ID Type</label>
																<!--end::Label-->
																<!--begin::Left Section-->
																<div class="col-lg-3 fv-row fv-plugins-icon-container">
																	<label class="col col-form-label fw-semibold fs-6" ><b><?php echo ($party_details->ID_TYPE=='')?'--':$party_details->ID_TYPE;?></b></label>
																	
																	<div class="fv-plugins-message-container invalid-feedback"></div>
																</div>
																<!--begin::Label-->
																<label class="col-lg-1 col-form-label fw-semibold fs-6">ID No</label>
																<!--end::Label-->
																<!--begin::Col-->
																<div class="col-lg-3 fv-row fv-plugins-icon-container">
																	<label class="col col-form-label fw-semibold fs-6" ><b><?php echo ($party_details->ID_NUMBER=='')?'--':$party_details->ID_NUMBER;?></b></label>
																	
																	<div class="fv-plugins-message-container invalid-feedback"></div>
																</div>
																<!--end::Col-->
																<!--begin::Label-->
																<label class="col-lg-1 col-form-label fw-semibold fs-6">Work</label>
																<!--end::Label-->
																<!--begin::Left Section-->
																<div class="col-lg-3 fv-row fv-plugins-icon-container">
																	<label class="col col-form-label fw-semibold fs-6" ><b><?php echo ($party_details->WORK_TYPE=='')?'--':$party_details->WORK_TYPE;?></b></label>
																	
																	<div class="fv-plugins-message-container invalid-feedback"></div>
																</div>
																<label class="col-lg-1 col-form-label fw-semibold fs-6">Rating</label>
																<div class="btn-group w-100 w-lg-25" data-kt-buttons="true" data-kt-buttons-target="[data-kt-button]">
																    <label class="btn btn-outline-secondary text-muted text-hover-black text-active-black btn-outline <?php if($party_details->RATING==3){echo "btn-success"; } else{ echo "btn-active-success";} ?>" data-kt-button="true" style="border-color: #6c7072 !important;">
																        <input class="btn-check" type="radio" name="rating" id="rating" value="3" <?php if($party_details->RATING==3){echo "selected"; } else{ echo " ";} ?>/>
																        Good
																    </label>
																    <label class="btn btn-outline-secondary text-muted text-hover-black text-active-black btn-outline <?php if($party_details->RATING==2){echo "btn-warning"; } else{ echo "btn-active-warning";} ?>" data-kt-button="true" style="border-color: #6c7072 !important;">
																        <input class="btn-check" type="radio" name="rating" id="rating" checked="checked" value="2" <?php if($party_details->RATING==2){echo "selected"; } else{ echo " ";} ?> />
																        Average
																    </label>
																    <label class="btn btn-outline-secondary text-muted text-hover-black text-active-black btn-outline <?php if($party_details->RATING==1){echo "btn-danger"; } else{ echo "btn-active-danger";} ?>" data-kt-button="true" style="border-color: #6c7072 !important;">
																        <input class="btn-check" type="radio" name="rating" id="rating" value="1" <?php if($party_details->RATING==1){echo "selected"; } else{ echo " ";} ?>  />
																        Bad
																    </label>
																</div>
																
															</div>
															<div class="row mb-9">
																<!--begin::Label-->
																<label class="col-lg-1 col-form-label fw-semibold fs-6">Party</label>
																<!--end::Label-->
																<!--begin::Col-->
																<div class="col-lg-3">
																	<!-- <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['image']); ?>" > -->
																	<!--begin::Image input-->
																	<div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url('assets/media/svg/avatars/blank.svg')">
																		<!--begin::Preview existing avatar-->
																		<?php 
																			if($party_details->PHOTO == '')
																			{
																		?>
																		<div class="image-input-wrapper w-125px h-125px" style="background-image: url(<?php echo base_url();?>assets/images/party.jpg)"></div>
																		<?php 
																			}
																			else
																			{

																		?>
																		<?php 
																			// $str_photo=str_replace('data:image/jpeg;base64,', '', $party_details->PHOTO);
																			if($party_details->TYPE_OF_RECORD=='N')
																			{?>
																				<img src="<?php echo $party_details->PHOTO; ?>" height="125px" width="125px" >
																			<?php }
																			else
																			{
																			$st=strpos(base64_encode($party_details->PHOTO),'data:image/jpeg;base64,');
																			if($st==false)
																			{	?>
																				<img src="data:image/jpeg;base64,<?php echo base64_encode($party_details->PHOTO); ?>" height="125px" width="125px" >
																			 	<!-- <img src="<?php echo $party_details->PHOTO; ?>" height="125px" width="125px" > -->
																			 	<?php
																			}
																			else
																			{
																			?>
																		<img src="data:image/jpeg;base64,<?php echo base64_encode($party_details->PHOTO); ?>" height="125px" width="125px" >
																		<!-- <img src="<?php echo $party_details->PHOTO; ?>" height="125px" width="125px" > -->

																		<?php
																			}
																			}
																			}
																		?>
																		<!--end::Preview existing avatar-->
																		<!--begin::Cancel-->
																		<span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" data-kt-initialized="1">
																			<i class="bi bi-x fs-2"></i>
																		</span>
																		<!--end::Cancel-->
																	</div>
																	<!--end::Image input-->

																	<!--begin::Hint-->
																	
																	<!--end::Hint-->
																</div>
																<!--end::Col-->
																<!--begin::Label-->
																<label class="col-lg-1 col-form-label fw-semibold fs-6">Signature</label>
																<!--end::Label-->
																<!--begin::Col-->
																<div class="col-lg-3">
																	<!-- <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['image']); ?>" > -->
																	<!--begin::Image input-->
																	<div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url('<?php echo base_url(); ?>assets/images/signature.jpg')">
																		<!--begin::Preview existing avatar-->
																		<?php 
																			if($party_details->SIGNATURE == '')
																			{
																		?>
																		<div class="image-input-wrapper w-125px h-125px" style="background-image: url(<?php echo base_url();?>assets/images/signature.jpg)"></div>
																		<?php 
																			}
																			else
																			{
																				if($party_details->TYPE_OF_RECORD=='N')
																			{?>
																				<img src="<?php echo $party_details->SIGNATURE; ?>" height="125px" width="125px" >
																			<?php }
																			else
																			{

																		?>
																		<?php 

																			// $str_photo=str_replace('data:image/jpeg;base64,', '', $party_details->PHOTO);
																			$st=strpos($party_details->SIGNATURE,'data:image/jpeg;base64,');
																			if($st==false)
																			{	?>
																				<!-- <img src="data:image/jpeg;base64,<?php echo base64_encode($party_details->PHOTO); ?>" height="125px" width="125px" > -->
																			 	<img src="<?php echo $party_details->PHOTO; ?>" height="125px" width="125px" >
																			 	<?php
																			}
																			else
																			{
																			?>
																		<!-- <img src="data:image/jpeg;base64,<?php echo base64_encode($party_details->PHOTO); ?>" height="125px" width="125px" > -->
																		<img src="<?php echo $phparty_details->PHOTO; ?>" height="125px" width="125px" >

																		<?php
																			}
																			}
																			}
																		?>
																		<!--end::Preview existing avatar-->
																		<!--begin::Cancel-->
																		<span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" data-kt-initialized="1">
																			<i class="bi bi-x fs-2"></i>
																		</span>
																		<!--end::Cancel-->
																	</div>
																	<!--end::Image input-->
																	
																	<!--begin::Hint-->
																	
																	<!--end::Hint-->
																</div>
																<!--begin::Label-->
																<label class="col-lg-1 col-form-label fw-semibold fs-6">Other</label>
																<!--end::Label-->
																	<!--begin::Col-->
																	<div class="col-lg-3">
																		<!--begin::Image input-->
																		<div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url('<?php echo base_url();?>assets/images/party_proof.jpg')">
																			<?php 
																			if($party_details->OTHER_PHOTO == '')
																			{
																			?>
																			<!--begin::Preview existing avatar-->
																			<div class="image-input-wrapper w-125px h-125px" style="background-image: url(<?php echo base_url();?>assets/images/party_proof.jpg)">
																				
																			</div>
																			<?php 
																			}
																			else
																			{

																		?>
																		<img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($party_details->OTHER_PHOTO); ?> " height="125px" width="125px" >
																		<?php
																			}
																		?>
																			<!--end::Preview existing avatar-->
																			<!--begin::Cancel-->
																			<span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" data-kt-initialized="1">
																				<i class="bi bi-x fs-2"></i>
																			</span>
																			<!--end::Cancel-->
																		</div>
																		<!--end::Image input-->
																	</div>
																	<!--end::Col-->	

															</div>
															<?php 
															$nominee_details=$this->db->query("select * from NOMINEE where PID='".$party_details->PID."'")->result_array();

															?>

															<label class="col-form-label fw-bold fs-4">Nominee Information</label>
						 
															<div class="row" >
																<div class="col-lg-12">
																	<table class="table align-middle table-row-dashed table-striped table-hover fs-7 gy-1 gs-2">
																		<thead>
																			<tr class="text-start text-muted fw-bold fs-7 gs-0">
																				<th>Nominee Name</th>
																				<th>Relation</th>
																				<th>Mobile No</th>
																			</tr>
																		</thead>
																		<tbody class="text-gray-600 fw-semibold">
																			<?php 
																			$i=0;
																				// for($i=0;$i<$cnt;$i++)
																				foreach ($nominee_details as $nlist) 
																				{
																			?>
																				<tr>
																					<td><?php echo $nlist['NOMINEE_NAME']; ?></td>
																					<td><?php echo $nlist['RELATION']; ?></td>
																					<td><?php echo $nlist['MOBILE_NO']; ?></td>
																				</tr>
																			<?php 
																			$i++;
																				}
																			?>
																			</tbody>
																		</table>
																	</div>
																</div>

															<?php 
															
															$bank_details=$this->db->query("select * from party_bank_upi_details where party_id='".$party_details->PID."'")->result_array();


															?>

															<label class="col-form-label fw-bold fs-4">Payment Information</label>
						 
															<div class="row" >
																<div class="col-lg-12">
																	<table class="table align-middle table-row-dashed table-striped table-hover fs-7 gy-1 gs-2">
																		<thead>
																			<tr class="text-start text-muted fw-bold fs-7 gs-0">
																				<th>Type</th>
																				<th>Payment/Bank Name</th>
																				<th>Acc No/Phone No</th>
																				<th>Holder Name</th>
																				<th>Branch Name</th>
																				<th>IFSC Code</th>
																			
																			</tr>
																		</thead>
																		<tbody class="text-gray-600 fw-semibold">
																			<?php 
																			$i=0;
																				// for($i=0;$i<$cnt;$i++)
																				foreach ($bank_details as $bank_details) 
																				{
																			?>
																				<tr>
																					<td><?php echo $bank_details['payment_type']; ?></td>
																					<td><?php echo $bank_details['account_name']; ?></td>
																					<td><?php echo $bank_details['phone_account_no']; ?></td>
																					
																					<td><?php echo $bank_details['account_holder_name']; ?></td>
																					
																					<td><?php echo $bank_details['branch_name']; ?></td>
																					<td><?php echo $bank_details['ifsc_code']; ?></td>
																				</tr>
																			<?php 
																			$i++;
																				}
																			?>
																			</tbody>
																		</table>
																	</div>
																</div>
														</div>
														<?php 
													$result=$this->db->query("select * from RECEIPT_MASTER where BILLNO in(select distinct BILLNO from LOANS where PID='".$party_details->PID."') order by BILLNO, RECEIPT_DATE desc ")->result_array();

													?>
													
														<div class="tab-pane fade " id="kt_tab_pane_1_1" role="tabpanel">
															<div class="row">
															<!-- <div class="row fixTableHead_party dataTables_scroll"> -->
																<table class="table align-middle table-row-dashed table-striped table-hover fs-7 gy-1 gs-2" id="kt_datatable_sidebar_paryloanhistory_receipt">
																    <thead>
																        <tr class="text-start text-muted fw-bold fs-7 gs-0">
																            <th class="min-w-100px cy">Receipt SNo</th>
																            <th class="min-w-100px">Receipt Date</th>
																            <th class="min-w-100px">Loan No</th>
																            <th class="min-w-100px">Calc. Loan Amount<small>(Cal. Prin + Cal. Int)</small></th>
																            <th class="min-w-100px">Net Payable</th>
																            <th class="min-w-100px">Paid Amount</th>
																            <th class="min-w-80px">Balance Net Payable</th>
																            <th class="min-w-100px">Loan Balance</th>
																            <th class="min-w-25px">Voucher No</th>
																        </tr>
																    </thead>
																    <tbody class="text-gray-600 fw-semibold">
																    	<?php 
																    	foreach ($result as $llist) 
																    	{
																    	?>
																        <tr>
																            <td class="cy ple1"><?php 
																            
																            	echo $llist['RECEIPT_SNO'];
																            ?></td>
																            <td class="ple1"><?php echo $llist['RECEIPT_DATE']; ?></td>
																            <td class="ple1"><?php echo $llist['BILLNO']; ?></td>
																            <td class="ple1"><?php echo $llist['TOTAL']; ?></td>
																            <td class="ple1"><?php echo $llist['NETPAYABLE']; ?></td>
																            <td class="ple1"><?php echo $llist['PAIDAMOUNT']; ?></td>
																            <td class="ple1"><?php echo $llist['BALANCE']; ?></td>
																            <td class="ple1"><?php echo $llist['LOAN_BALANCE']; ?></td>
																            <td class="ple1"><?php echo $llist['VOUCHER_SNO']; ?></td>
																            
																        </tr>
																        <?php 
																        	}
																        ?>
																    </tbody>
																    
																</table>
															</div>
														</div>
														<div class="tab-pane fade " id="kt_tab_pane_1" role="tabpanel">
															<!-- <div class="row fixTableHead_party"> -->
															<div class="row">
																<table class="table align-middle table-row-dashed table-striped table-hover fs-7 gy-1 gs-2" id="kt_datatable_sidebar_paryloanhistory_loan">
																    <thead>
																        <tr class="text-start text-muted fw-bold fs-7 gs-0">
																            <th class="min-w-100px cy">company</th>
																            <th class="min-w-100px">Loan Date</th>
																            <th class="min-w-100px">Ren From</th>
																            <th class="min-w-100px">Loan No</th>
																            <th class="min-w-80px">Amount</th>
																            <th class="min-w-100px">Int Scheme</th>
																            <th class="min-w-25px">Int%</th>
																            <th class="min-w-125px">Nominee</th>
																            <th class="min-w-25px">Active</th>
																            <th class="min-w-80px">Cls Date</th>
																            <th class="min-w-125px">Cls Type</th>
																            <th class="min-w-80px">Ren TO</th>
																            <th class="min-w-100px">Remarks</th>
																            <th class="min-w-100px">Status</th>
																            <th class="min-w-100px">AltInfo</th>
																            <th class="min-w-100px">Sell To</th>
																            <th class="min-w-100px">PaperAction</th>
																            <th class="min-w-150px">Loan Summary</th>
																        </tr>
																    </thead>
																    <tbody class="text-gray-600 fw-semibold">
																    	<?php 
																    	foreach ($result as $llist) 
																    	{
																    	?>
																        <tr>
																            <td class="cy ple1"><?php 
																            $comp_name=$this->db->query("SELECT * FROM COMPANY WHERE COMPANYCODE='".$llist['COMPANYCODE']."'")->row();
																            	echo $comp_name->COMPANYNAME;
																            ?></td>
																            <td class="ple1"><?php echo $llist['ENDATE']; ?></td>
																            <td class="ple1"><?php echo $llist['REN_FROM_BILLNO']; ?></td>
																            <td class="ple1"><?php echo $llist['BILLNO']; ?></td>
																            <td class="ple1"><?php echo $llist['AMOUNT']; ?></td>
																            <td class="ple1"><?php echo $llist['INTEREST']; ?></td>
																            <td class="ple1"></td>
																            <td class="ple1"><?php echo $llist['NOMINEE']; ?></td>
																            <td class="ple1"><?php echo $llist['ACTIVE']; ?></td>
																            <td class="ple1">
																            	<?php 
																            	if( $llist['ACTIVE']=='Y')
																            	{
																            		echo "";
																            	} 
																            	else
																            	{
																            		echo $llist['CLOSEDATE'];
																            	}
																            	?>
																            	
																            </td>
																            <td class="ple1"><?php 
																            	if( $llist['ACTIVE']=='Y')
																            	{
																            		echo "";
																            	} 
																            	else {
																            		echo $llist['CLOSING_STATUS'];	
																            	}
																            	?></td>
																            <td class="ple1"><?php echo $llist['REN_TO_BILLNO']; ?></td>
																            <td class="ple1"><?php echo $llist['REMARKS']; ?></td>
																            <td class="ple1"><?php echo $llist['STATUS']; ?></td>
																            <td class="ple1"><?php echo $llist['ALT_REMARKS']; ?></td>
																            <td class="ple1"><?php echo $llist['SELLINGTO']; ?></td>
																             <td class="ple1"><?php echo $llist['PAPER_ACTION']; ?></td>
																            <!-- <td>
																            	<a href="#" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm" data-bs-toggle="modal" data-bs-target="#kt_modal_view_particular_party_loan_summary_history_sidebar">
																						<i class="bi bi-eye-fill eyc"></i>
																				</a>
																				<a href="#" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm" data-bs-toggle="modal" data-bs-target="#kt_modal_delete_particular_party_loan_summary_history_sidebar">
																					<span class="svg-icon svg-icon-3">
																						<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																							<path d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z" fill="currentColor"></path>
																							<path opacity="0.5" d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z" fill="currentColor"></path>
																							<path opacity="0.5" d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z" fill="currentColor"></path>
																						</svg>
																					</span>
																				</a>
																			</td> -->
																        </tr>
																        <?php 
																        	}
																        ?>
																    </tbody>
																    
																</table>
															</div>
														</div>
														<div class="tab-pane fade" id="kt_tab_pane_2" role="tabpanel">
															<div class="row">
															<!-- <div class="row fixTableHead_party"> -->
																<table class="table align-middle table-row-dashed table-striped table-hover fs-7 gy-1 gs-2" id="kt_datatable_sidebar_paryloanhistory_credit">
																    <thead>
																        <tr class="text-start text-muted fw-bold fs-7 gs-0">
																            <th class="min-w-100px cy">Company</th>
																            <th class="min-w-100px">Date</th>
																            <th class="min-w-100px">Acc No</th>
																            <th class="min-w-100px">Manual No</th>
																            <th class="min-w-50px">Type</th>
																            <th class="min-w-25px">Particulars</th>
																            <th class="min-w-100px">Amount</th>
																            <th class="min-w-25px">Remarks</th>
																            <th class="min-w-80px">Balance</th>
																        </tr>
																    </thead>
																    <tbody class="text-gray-600 fw-semibold">
																        <tr>
																            <td class="cy ple1">AGB</td>
																            <td class="ple1">01/04/2022</td>
																            <td class="ple1">63</td>
																            <td class="ple1">M-11234</td>
																            <td class="ple1">Gold Ornaments</td>
																            <td class="ple1">Opening</td>
																            <td class="ple1">0</td>
																            <td class="ple1">Sale M-11234</td>
																            <td class="ple1"></td>
																        </tr>
																    </tbody>
																</table>
															</div>
														</div>
														<div class="tab-pane fade" id="kt_tab_pane_3" role="tabpanel">
															<div class="row">
															<!-- <div class="row fixTableHead_party"> -->
																<table class="table align-middle table-row-dashed table-striped table-hover fs-7 gy-1 gs-2" id="kt_datatable_sidebar_paryloanhistory_chit">
																    <thead>
																        <tr class="text-start text-muted fw-bold fs-7 gs-0">
																            <th class="min-w-100px cy">company</th>
																            <th class="min-w-100px">Date</th>
																            <th class="min-w-100px">Group</th>
																            <th class="min-w-100px">Acc No</th>
																            <th class="min-w-100px">Manual No</th>
																            <th class="min-w-50px">Op.Bal</th>
																            <th class="min-w-25px">Op.Wt</th>
																            <th class="min-w-25px">Remarks</th>
																            <th class="min-w-80px">Balance</th>
																        </tr>
																    </thead>
																    <tbody class="text-gray-600 fw-semibold">
																        <tr>
																            <td class="cy ple1"></td>
																            <td class="ple1"></td>
																            <td class="ple1"></td>
																            <td class="ple1"></td>
																            <td class="ple1"></td>
																            <td class="ple1"></td>
																            <td class="ple1"></td>
																            <td class="ple1"></td>
																            <td class="ple1"></td>
																        </tr>
																    </tbody>
																</table>
															</div>
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
				<!-- </div> -->
				<?php $this->load->view("footer");?>
				</div>
				<!--end::Wrapper-->
			</div>
			<!--end::Page-->
		</div>
		<!--end::Root-->
		

		<?php $this->load->view("script");?>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
		<input type="hidden" id="baseurl" value="<?php echo base_url();?>">


		

		
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
</script>
		<script>
			$("#kt_datatable_sidebar_paryloanhistory_loan").DataTable({
					 "responsive":true,
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
			$('#kt_datatable_sidebar_paryloanhistory_loan').wrap('<div class="dataTables_scroll" />');
			</script>

			<script>
			$("#kt_datatable_sidebar_paryloanhistory_receipt").DataTable({
					 "responsive":true,
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
			$('#kt_datatable_sidebar_paryloanhistory_receipt').wrap('<div class="dataTables_scroll" />');
			</script>
			<script>
			$("#kt_datatable_sidebar_paryloanhistory_credit").DataTable({
				 "responsive":true,
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
			$('#kt_datatable_sidebar_paryloanhistory_credit').wrap('<div class="dataTables_scroll" />');
			</script>
			<script>
			$("#kt_datatable_sidebar_paryloanhistory_chit").DataTable({
				 "responsive":true,
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
			$('#kt_datatable_sidebar_paryloanhistory_chit').wrap('<div class="dataTables_scroll" />');
			</script>

	</body>
	<!--end::Body-->
</html>