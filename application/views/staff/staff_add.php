<?php $this->load->view("common");?>

<style>
	@media screen {
  #printSection {
      display: none;
  }
}

@media print {
  body * {
    visibility:hidden;
  }
  #printSection, #printSection * {
    visibility:visible;
  }
  #printSection {
    position:absolute;
    left:0;
    top:0;
  }
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
									<h1 class="d-flex align-items-center text-dark fw-bold my-1 fs-3">New Staff 
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

	                    <div class="alert alert-success alert-dismissible" style="display:none;" id="active_staff" role="alert">
                          <!-- <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          </button> -->
                          Staff has been activated successfully
                      </div>
                        <div class="alert alert-danger alert-dismissible" style="display:none;" id="deactive_staff" role="alert">
                            <!-- <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            </button> -->
                            Staff has been deactivated successfully
                        </div>
								<!--begin::Card body-->
								<div class="card-body py-4">
									<form name="staff_add_form" id="staff_add_form" method="POST" action="<?php echo base_url();?>Staff/staff_save" enctype="multipart/form-data" onsubmit="return staff_validation();">
										<div class="row">
											<label class="col-lg-2 col-form-label required fw-semibold fs-6">Company</label>
											<div class="col-lg-2 fv-row">
												<select class="form-select form-select-solid" data-control="select2" name="company_list_new"  id="company_list_new" data-hide-search="true" >
													<!-- onchange="staffid_inc();" -->
												<option value="">Select Company</option>
												<?php foreach($company_list as $comlist)
												{?>
												<option value="<?php echo $comlist['COMPANYCODE'];?>"><?php echo $comlist['COMPANYNAME'];?></option><?php
												 }?>
												</select>
												 <div class="fv-plugins-message-container invalid-feedback" id="company_list_new_err"></div>
											</div>
											<label class="col-lg-2 col-form-label required fw-semibold fs-6"> Name</label>
											<div class="col-lg-2 fv-row fv-plugins-icon-container">
												<input type="text" name="add_sname_staff_list" id="add_sname_staff_list" class="form-control form-control-lg form-control-solid" placeholder="Staff Name">
												<div class="fv-plugins-message-container invalid-feedback" id="add_sname_staff_list_err"></div>
											</div>
											<label class="col-lg-2 col-form-label required fw-semibold fs-6">F.Name</label>
											<div class="col-lg-2 fv-row fv-plugins-icon-container">
												<input type="text" name="add_fname_staff_list" id="add_fname_staff_list" class="form-control form-control-lg form-control-solid" placeholder="Father/Guardian">
												<div class="fv-plugins-message-container invalid-feedback" id="add_fname_staff_list_err"></div>
											</div>
											<label class="col-lg-2 col-form-label required fw-semibold fs-6">Gender</label>
											<div class="col-lg-2 fv-row">
												<!--begin::Select-->
												<select class="form-select form-select-solid" data-control="select2" name="add_sgender_staff_list" id="add_sgender_staff_list" data-hide-search="true">
													<option value="">Select</option>
													<option value="0">Male</option>
													<option value="1">Female</option>
												</select>
													<!--end::Select-->
												<div class="fv-plugins-message-container invalid-feedback" id="add_sgender_staff_list_err"></div>
											</div>
											<label class="col-lg-2 col-form-label required fw-semibold fs-6">City</label>
											<div class="col-lg-2 fv-row">
												<input type="text" name="city_list_new" id="city_list_new" class="form-control form-control-lg form-control-solid" placeholder="City" >
											<!--begin::Select-->
												<!-- <select class="form-select form-select-solid" data-control="select2" name="city_list_new"  id="city_list_new" data-hide-search="true">
												<option value="">Select City</option>
												<?php foreach($city_list as $citylist)
												{?>
												<option value="<?php echo $citylist['CITYID'];?>"><?php echo $citylist['CITYNAME'];?></option><?php
												 }?>
												</select> -->
												<!--end::Select-->
												<div class="fv-plugins-message-container invalid-feedback" id="city_list_new_err"></div>
											</div>
											<!--End::Left Section-->					
											
											<!--begin::Label-->
											<label class="col-lg-2 col-form-label required fw-semibold fs-6">Aadhar.No</label>
											<!--end::Label-->
											<!--begin::Col-->
											<div class="col-lg-2 fv-row fv-plugins-icon-container">
												<input type="text" name="add_saadharno_staff_list" id="add_saadharno_staff_list" class="form-control form-control-lg form-control-solid" placeholder="Aadhar Number" >
												<div class="fv-plugins-message-container invalid-feedback" 
												id="add_saadharno_staff_list_err"></div>
											</div>
											<!--end::Col-->	
														<!--begin::Label-->
											<label class="col-lg-2 col-form-label fw-semibold fs-6">ID Proof</label>
											<!--end::Label-->
											<!--begin::Col-->
											<div class="col-lg-2 fv-row fv-plugins-icon-container">
												<input type="text" name="add_sidproof_staff_list" id="add_sidproof_staff_list" class="form-control form-control-lg form-control-solid" placeholder="Id Proof">
												<div class="fv-plugins-message-container invalid-feedback" id="add_sidproof_staff_list_err"></div>
											</div>
											<!--end::Col-->							
											<!--begin::Label-->
											<label class="col-lg-2 col-form-label required fw-semibold fs-6">Phone</label>
											<!--end::Label-->
											<!--begin::Col-->
											<div class="col-lg-2 fv-row fv-plugins-icon-container">
												<input type="text" name="add_sphone_staff_list" id="add_sphone_staff_list" class="form-control form-control-lg form-control-solid" placeholder="Phone No"
												onkeyup="staff_phone_unique(this.value);">
												<div class="fv-plugins-message-container invalid-feedback" id="add_sphone_staff_list_err"></div>
											</div>
											<!--end::Col-->
											<!--begin::Label-->
											<label class="col-lg-2 col-form-label required fw-semibold fs-6">DOB</label>
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
													<input class="form-control form-control-solid ps-12" name="add_dob_staff_list" placeholder="Date of Birth" id="kt_datepicker_dob_add_staff_list"/>
												</div>
												<div class="fv-plugins-message-container invalid-feedback" id="kt_datepicker_dob_add_staff_list_err" ></div>
											</div>
											<!--end::Col-->
											<!--begin::Label-->
											<label class="col-lg-2 col-form-label required fw-semibold fs-6"> Age</label>
											<!--end::Label-->
											<!--begin::Col-->
											<div class="col-lg-2 fv-row fv-plugins-icon-container">
												<input type="text" name="add_sage_staff_list" id="add_sage_staff_list" class="form-control form-control-lg form-control-solid" placeholder="Staff Age">
												<div class="fv-plugins-message-container invalid-feedback" id="add_sage_staff_list_err"></div>
											</div>
											<!--end::Col-->					
											<!--begin::Label-->
											<label class="col-lg-2 col-form-label required fw-semibold fs-6">DOJ</label>
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
													<input class="form-control form-control-solid ps-12" name="add_doj_staff_list" placeholder="Date of Joining" id="kt_datepicker_doj_add_staff_list" />
												</div>
												<div class="fv-plugins-message-container invalid-feedback" id="kt_datepicker_doj_add_staff_list_err" ></div>
											</div>
											<!--end::Col-->
											<!--begin::Label-->
											<label class="col-lg-2 col-form-label fw-semibold fs-6">RelvdDate</label>
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
													<input class="form-control form-control-solid ps-12" name="add_relvdate_staff_list" placeholder="Date of Relieving" id="kt_datepicker_relvdate_add_staff_list" />
												<!--	<div class="fv-plugins-message-container invalid-feedback" id="kt_datepicker_relvdate_add_staff_list_err"></div>-->
												</div>
											</div>
											<!--end::Col-->			
											<!--begin::Label-->
											<label class="col-lg-2 col-form-label required fw-semibold fs-6">Dept</label>
											<!--end::Label-->
											<!--begin::Col-->
											<div class="col-lg-2 fv-row fv-plugins-icon-container">
												<!-- <input type="text" name="add_sdept_staff_list" id="add_sdept_staff_list" class="form-control form-control-lg form-control-solid" placeholder="Department"> -->
												<select class="form-select form-select-solid" data-control="select2" name="add_sdept_staff_list" id="add_sdept_staff_list" data-hide-search="true">
													<option value="">Select</option>
													<?php
													foreach ($department_list as $dptlist) {
														?>
														<option value="<?php echo $dptlist['DEPARTMENTID']; ?>"><?php echo $dptlist['DEPARTMENTNAME'];?></option>
													<?php 
													}
													?>
												</select>
												<div class="fv-plugins-message-container invalid-feedback" id="add_sdept_staff_list_err" ></div>
											</div>
											<!--end::Col-->
											<!--begin::Label-->
											<label class="col-lg-2 col-form-label required fw-semibold fs-6">Designtn</label>
											<!--end::Label-->
											<!--begin::Col-->
											<div class="col-lg-2 fv-row fv-plugins-icon-container">
												<!-- <input type="text" name="add_sdesig_staff_list" id="add_sdesig_staff_list" class="form-control form-control-lg form-control-solid" placeholder="Designation"> -->
												<select class="form-select form-select-solid" data-control="select2" name="add_sdesig_staff_list" id="add_sdesig_staff_list" data-hide-search="true">
													<option value="">Select</option>
													<?php
													foreach ($designation_list as $dsglist) {
														?>
														<option value="<?php echo $dsglist['DESIGNATIONID']; ?>"><?php echo $dsglist['DESIGNATIONNAME'];?></option>
													<?php 
													}
													?>
												</select>
												<div class="fv-plugins-message-container invalid-feedback" id="add_sdesig_staff_list_err" ></div>
											</div>
											<!--end::Col-->
											<label class="col-lg-2 col-form-label required fw-semibold fs-6">Work.Hrs</label>
											<div class="col-lg-2 fv-row fv-plugins-icon-container">
												<input type="text" name="add_swrkhrs_staff_list" id="add_swrkhrs_staff_list" class="form-control form-control-lg form-control-solid" placeholder="Working hrs/day">
												<div class="fv-plugins-message-container invalid-feedback" id="add_swrkhrs_staff_list_err"></div>
											</div>
											
											<label class="col-lg-2 col-form-label required fw-semibold fs-6">Username</label>
											<div class="col-lg-2 fv-row fv-plugins-icon-container">
												<input type="text" name="add_suname_staff_list" id="add_suname_staff_list" class="form-control form-control-lg form-control-solid" placeholder="Username">
												<div class="fv-plugins-message-container invalid-feedback" id="add_suname_staff_list_err"></div>
											</div>
											<label class="col-lg-2 col-form-label required fw-semibold fs-6">Password</label>
											<div class="col-lg-2 fv-row fv-plugins-icon-container">
												<input type="Password" name="add_spw_staff_list" id="add_spw_staff_list" class="form-control form-control-lg form-control-solid" placeholder="Password">
												<div class="fv-plugins-message-container invalid-feedback" id="add_spw_staff_list_err"></div>
											</div>
												
												<label class="col-lg-2 col-form-label required fw-semibold fs-6">Min.LDays</label>
											<div class="col-lg-2 fv-row fv-plugins-icon-container">
												<input type="text" name="add_sminleavedays_staff_list" id="add_sminleavedays_staff_list" class="form-control form-control-lg form-control-solid" placeholder="Min leave days">
												<div class="fv-plugins-message-container invalid-feedback" id="add_sminleavedays_staff_list_err"></div>
											</div>
											<!--begin::Label-->
											<label class="col-lg-2 col-form-label required fw-semibold fs-6">Address</label>
											<!--end::Label-->
											<!--begin::Col-->
											<div class="col-lg-2 fv-row fv-plugins-icon-container">
												<textarea class="form-control form-control-solid" rows="1" 
												name="add_saddress_staff_list" id="add_saddress_staff_list" ></textarea>
												<div class="fv-plugins-message-container invalid-feedback" id="add_saddress_staff_list_err"></div>
											</div>
											<!--end::Col-->
											
											<label class="col-lg-2 col-form-label required fw-semibold fs-6">Role</label>
											<div class="col-lg-2 fv-row">
											<!--begin::Select-->
												<select class="form-select form-select-solid" data-control="select2" name="role_list_new"  id="role_list_new" data-hide-search="true" onchange="set_user_permission()">
												<option value="">Select Role</option>
												<?php foreach($role_list as $rolelist)
												{?>
												<option value="<?php echo $rolelist['ROLEID'];?>"><?php echo $rolelist['ROLENAME'];?></option><?php
												 }?>
												</select>
												<!--end::Select-->
												<div class="fv-plugins-message-container invalid-feedback" id="role_list_new_err"></div>
											</div>
											<div class="col-lg-3 fv-row fv-plugins-icon-container fv-plugins-bootstrap5-row-invalid">
												<div class="d-flex align-items-center">
													<label class="form-check form-check-inline form-check-solid is-invalid">
														<input class="form-check-input" name="mobileapp_add" 
														id="mobileapp_add" type="checkbox">
													</label>
													<span class="col-form-label fw-semibold fs-6">Mobile Application Allowed</span>
												</div>
											</div>

											<label class="col-lg-2 col-form-label required fw-semibold fs-6">Transaction Password</label>
								
											<div class="col-lg-2 fv-row fv-plugins-icon-container">
												<input type="Password" name="staff_tpwd" id="staff_tpwd" class="form-control form-control-lg form-control-solid" placeholder="Password"
												value="">
												<div class="fv-plugins-message-container invalid-feedback" id="staff_tpwd_err"></div>
											</div>
											<div class="row" id="permission_accordion" style="display: none;">
											</div>
											<div class="row">
												<label class="col-lg-1 col-form-label required fw-semibold fs-6">Staff</label>
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
															<input type="file" name="add_sphoto_staff_list" id="add_sphoto_staff_list" accept=".png, .jpg, .jpeg">
															<input type="hidden" name="add_sphoto_remove_staff_list">
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
														<div class="fv-plugins-message-container invalid-feedback" id="add_sphoto_staff_list_err"></div>
													</div>
													<!--end::Image input-->
													<!--begin::Hint-->
													<div class="form-text">Allowed file types: png, jpg, jpeg.</div>
													<!--end::Hint-->
												</div>
												<label class="col-lg-1 col-form-label required fw-semibold fs-6">ID</label>
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
															<input type="file" name="add_idphoto_staff_list" id="add_idphoto_staff_list" accept=".png, .jpg, .jpeg">
															<input type="hidden" name="add_idphoto_remove_staff_list">
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
														<div class="fv-plugins-message-container invalid-feedback" id="add_idphoto_staff_list_err"></div>
													</div>
													<!--end::Image input-->
													<!--begin::Hint-->
													<div class="form-text">Allowed file types: png, jpg, jpeg.</div>
													<!--end::Hint-->
												</div>
											</div>
											<div class="separator separator-content border-dark my-6"><span class="w-200px fw-bold fs-4">Salary Details</span></div>
											<div class="row fv-row">
												<!--begin::Label-->
												<label class="col-lg-2 col-form-label required fw-semibold fs-6">Basic Salary</label>
												<!--end::Label-->
												<!--begin::Col-->
												<div class="col-lg-2 fv-row fv-plugins-icon-container">
													<input type="text" name="add_sbassal_staff_list" id="add_sbassal_staff_list" class="form-control form-control-lg form-control-solid" placeholder="Basic Salary">
													<div class="fv-plugins-message-container invalid-feedback" id="add_sbassal_staff_list_err"></div>
												</div>
												<!--end::Col-->
													<!--begin::Label-->
												<label class="col-lg-2 col-form-label fw-semibold fs-6">PF per month</label>
												<!--end::Label-->
												<!--begin::Col-->
												<div class="col-lg-2 fv-row fv-plugins-icon-container">
													<input type="text" name="pfpermonth" id="pfpermonth" class="form-control form-control-lg form-control-solid" placeholder="PF per month">
													<div class="fv-plugins-message-container invalid-feedback"></div>
												</div>
												<!--end::Col-->
												<!--begin::Label-->
												<label class="col-lg-2 col-form-label fw-semibold fs-6"> Allowance 1</label>
												<!--end::Label-->
												<!--begin::Col-->
												<div class="col-lg-2 fv-row fv-plugins-icon-container">
													<input type="text" name="allwone" id="allwone" class="form-control form-control-lg form-control-solid" placeholder="Allowance">
													<div class="fv-plugins-message-container invalid-feedback"></div>
												</div>
												<!--end::Col-->
												<!--begin::Label-->
												<label class="col-lg-2 col-form-label fw-semibold fs-6"> Allowance 2</label>
												<!--end::Label-->
												<!--begin::Col-->
												<div class="col-lg-2 fv-row fv-plugins-icon-container">
													<input type="text" name="allwtwo" id="allwtwo" class="form-control form-control-lg form-control-solid" placeholder="Allowance 2">
													<div class="fv-plugins-message-container invalid-feedback"></div>
												</div>
												<!--end::Col-->
												<!--begin::Label-->
												<label class="col-lg-2 col-form-label fw-semibold fs-6"> Allowance 3</label>
												<!--end::Label-->
												<!--begin::Col-->
												<div class="col-lg-2 fv-row fv-plugins-icon-container">
													<input type="text" name="allwthree" id="allwthree" class="form-control form-control-lg form-control-solid" placeholder="Allowance 3">
													<div class="fv-plugins-message-container invalid-feedback"></div>
												</div>
												<!--end::Col-->
													<!--begin::Label-->
												<label class="col-lg-2 col-form-label fw-semibold fs-6">Incentive</label>
												<!--end::Label-->
												<!--begin::Col-->
												<div class="col-lg-2 fv-row fv-plugins-icon-container">
													<input type="text" name="incentive" id="incentive" class="form-control form-control-lg form-control-solid" placeholder="Incentive">
													<div class="fv-plugins-message-container invalid-feedback"></div>
												</div>
												<!--end::Col-->
												<!--begin::Label-->
												<label class="col-lg-2 col-form-label fw-semibold fs-6">Leave Deduction</label>
												<!--end::Label-->
												<!--begin::Col-->
												<div class="col-lg-2 fv-row fv-plugins-icon-container">
													<input type="text" name="leaveded" id="leaveded" class="form-control form-control-lg form-control-solid" placeholder="Leave Deduction">
													<div class="fv-plugins-message-container invalid-feedback"></div>
												</div>
												<!--end::Col-->
												<!--begin::Label-->
												<label class="col-lg-2 col-form-label fw-semibold fs-6">Net Salary</label>
												<!--end::Label-->
												<!--begin::Col-->
												<div class="col-lg-2 fv-row fv-plugins-icon-container">
													<input type="text" name="add_snetsal_staff_list" id="add_snetsal_staff_list" class="form-control form-control-lg form-control-solid" placeholder="Net Salary">
													<div class="fv-plugins-message-container invalid-feedback" id="add_snetsal_staff_list"></div>
												</div>
												<!--end::Col-->
											</div>								
											<!--begin::Actions-->
											<div class="row">
												<div class="d-flex justify-content-end mt-3">
													<button type="button" class="btn btn-sm btn-outline btn-outline-solid btn-outline-warning btn-active-light-primary me-3" id="btnPrint" >Print</button>
													<button type="reset" class="btn btn-secondary me-3" data-bs-dismiss="modal">Cancel</button>
													<button type="submit" class="btn btn-primary" id="save_changes_add_staff_list">Save Changes</button>
												</div>
											</div>
										</div>
									</form>
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
		<!--begin::Modal - add staff-->
		<div class="modal fade" id="kt_modal_add_staff" tabindex="-1" aria-hidden="true">
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
								<h1 class="mb-3">New Staff</h1>
							</div>
							<!--end::Heading-->
							
							<!--end::Actions-->
						</div>
						<!--end::Modal body-->
					</form>
				</div>
					<!--end::Modal content-->
				</div>
				<!--end::Modal dialog-->
		</div>
		<!--end::Modal - add staff-->
		<!--begin::Modal - edit staff-->
		<div class="modal fade" id="kt_modal_edit_staff" tabindex="-1" aria-hidden="true">
			
		</div>
		<!--end::Modal - edit staff-->
		<!--begin::Modal - view staff-->
		<div class="modal fade" id="kt_modal_view_staff" tabindex="-1" aria-hidden="true">
			
		</div>
		<!--end::Modal - view staff-->
		<!--begin::Modal - delete staff-->
		<div class="modal fade" id="kt_modal_delete_staff" tabindex="-1" aria-hidden="true">
			
		</div>
		<!--end::Modal - delete staff-->


	<!-- Staff Print Start-->
		<div class="modal fade" id="kt_modal_add_staff_print" tabindex="-1" aria-hidden="true">
			<!-- <form id="kt_add_staff_list_form" class="form"> -->
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
							<div style="display: flex;flex-wrap: wrap;box-sizing: border-box;" id="staff_print">
								<div style="flex: 0 0 100%;max-width: 100%;position: relative;width: 100%;padding-right: 10px;padding-left: 10px;box-sizing: border-box;display: block;">
									<img src="assets/images/logo-1.jpg" style="border-radius: 10px;height: 130px;width: 130px;" />
									<h2 style="text-align: center;margin-top: -60px;">NEW STAFF FORM</h2>
									<p style="border-radius: 10px;border: 1px solid black;padding: 20px;width: 90px;height: 90px;float:right;margin-top: -100px;"></p>
									<section style="background-color: #ffffff;margin: 15px 0;display: block;box-sizing: border-box;">
										<header style="width: 100%;display: inline-block;border-bottom: 2px solid #186b9d;vertical-align: top;position: relative;box-sizing: border-box;margin-top: -20px;">
											<h2 style="font-family: 'Oswald', Arial, Helvetica, sans-serif;font-size:16px;padding-left: 15px;line-height: 30px;color: #676767;font-weight: 300;text-transform: uppercase;display: inline-block;float: left!important;margin: 10px 0;margin-block-start: 0.83em;margin-block-end: 0.83em;margin-inline-start: 0px;margin-inline-end: 0px;" name="employee_name"><b>Name of Employee - </b></h2>
										</header>
										<div style="width: 100%;"><br>
											<style>
												#staff_detils_print, #staff_detils_print td,#staff_detils_print th {
												  border: 1px solid black;
												}

												#staff_detils_print {
												  border-collapse: collapse;
												  width: 100%;
												}

												#staff_detils_print th {
												  height:60px !important;
												  padding-left: 10px;
												  padding-bottom: 50px !important;
												}
												#staff_detils_print td {
													height:60px !important;
													padding-bottom: 30px !important;
													padding-left: 10px;
													font-size: 14px;
													font-family: 'Oswald', Arial, Helvetica, sans-serif;
												}
											</style>
											<table id="staff_detils_print">
												<tbody>
													<tr>
														<td>Date :</td>
														<td>Staff ID : </td>
														<td>Company :</td>
													</tr>
													<tr>
														<td>Father/Guardian Name :</td>
														<td>Gender :</td>
														<td>City :</td>
													</tr>
													<tr>
														<td>ID Proof :</td>
														<td>ID Proof No :</td>
														<td>Phone No : <br></td>
													</tr>
													<tr>
														<td>DOB :</td>
														<td>Age :</td>
														<td>DOJ :</td>
													</tr>
													<tr>
														<td>Department :</td>
														<td>Role :</td>
														<td>Minimum Leave Days :</td>
													</tr>
													<tr>
														<td>Username :</td>
														<td>Password :</td>
														<td>Work Hrs(Day) :</td>
													</tr>
													<tr>
														<td>Address : <br><br><br><br></td>
														<td colspan="2">Mobile Application : &emsp; Yes / No</td>
													</tr>
												</tbody>
											</table>
										</div>
									</section>
									<section style="background-color: #ffffff;margin: 15px 0;display: block;box-sizing: border-box;">
										<header style="width: 100%;display: inline-block;border-bottom: 2px solid #186b9d;vertical-align: top;position: relative;box-sizing: border-box;">
											<h2 style="margin-top: 10px;font-family: 'Oswald', Arial, Helvetica, sans-serif;font-size:16px;padding-left: 15px;line-height: 30px;color: #676767;font-weight: 300;text-transform: uppercase;display: inline-block;float: left!important;margin: 10px 0;margin-block-start: 0.83em;margin-block-end: 0.83em;margin-inline-start: 0px;margin-inline-end: 0px;"><b>SALARY DETAILS </b></h2>
										</header>
										
										<div style="width: 100%;"><br>
											<style>
												#staff_sly_print,#staff_sly_print td,#staff_sly_print th {
												  border: 1px solid black;
												}

												#staff_sly_print {
												  border-collapse: collapse;
												  width: 100%;
												}

												#staff_sly_print th {
												  height:30px;
												  padding-left: 10px;
												}
												#staff_sly_print td {
													height:30px;
													padding-left: 10px;
												}
											</style>
											<table id="staff_sly_print">
												<tbody>
													<tr>
														<td>Basic Salary :</td>
														<td>PF(Month) :</td>
														<td>Allowance 1 :</td>
													</tr>
													<tr>
														<td>Allowance 2 :</td>
														<td>Allowance 3 :</td>
														<td>Incentive :</td>
													</tr>
													<tr>
														<td>Leave Deduction :</td>
														<td colspan="2">Net Salary :</td>
													</tr>
												</tbody>
											</table>
										</div>
									</section>
								</div>
							</div>
						</div>
						<!--end::Modal body-->
					</div>
					<!--end::Modal content-->
				</div>
				<!--end::Modal dialog-->
			<!-- </form> -->
		</div>
		<!-- Staff Print End-->

		<input type="hidden" id="baseurl" value="<?php echo base_url();?>">
		<?php $this->load->view("script");?>
		<!-- <script src="js/staff-list.js"></script> -->
<script>
			// $("#kt_datatable_dom_positioning").DataTable({
			// 	// "ordering": false,
			// 	"aaSorting":[],
			// 	 "language": {
			// 	  "lengthMenu": "Show _MENU_",
			// 	 },
			// 	 "dom":
			// 	  "<'row'" +
			// 	  "<'col-sm-6 d-flex align-items-center justify-conten-start'l>" +
			// 	  "<'col-sm-6 d-flex align-items-center justify-content-end'f>" +
			// 	  ">" +

			// 	  "<'table-responsive'tr>" +

			// 	  "<'row'" +
			// 	  "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
			// 	  "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
			// 	  ">"
			// 	});
		$('#kt_datatable_dom_positioning_stafflist').DataTable( {
		"aaSorting": [],
        dom: 'Bfrtip',
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5'
        ]
    } );
</script>
<script>
			$("#kt_datepicker_dob_add_staff_list").flatpickr({
				dateFormat: "d-m-Y",
			});
			$("#kt_datepicker_doj_add_staff_list").flatpickr({
				dateFormat: "d-m-Y",
			});
			$("#kt_datepicker_relvdate_add_staff_list").flatpickr({
				dateFormat: "d-m-Y",
			});
			$("#kt_datepicker_dob_edit_staff").flatpickr({
				dateFormat: "d-m-Y",
			});
			$("#kt_datepicker_doj_edit_staff").flatpickr({
				dateFormat: "d-m-Y",
			});
			$("#kt_datepicker_relvd_edit_staff").flatpickr({
				dateFormat: "d-m-Y",
			});
			$("#kt_datepicker_dob_view_staff_list").flatpickr({
				dateFormat: "d-m-Y",
			});
			$("#kt_datepicker_doj_view_staff_list").flatpickr({
				dateFormat: "d-m-Y",
			});
</script>
<script>
	function activeunactive_staff(val,ival) {
	var unactive;
	var unactv;
	var baseurl= $("#baseurl").val();
	var a = $("#activeunactive_staff_"+ival).val();
	if(a=='N') {
		unactive='Y';
		unactv="Active"
	}
	else{
		unactive='N';
		unactv="In-Active"
	}
	var datastring="id="+val+"&Status="+unactive;
	$.ajax({
		type:"POST",
		url:baseurl+'staff/staff_active',
		data:datastring,
		cache: false,
		dataType: "html",
		success: function(result){
			// alert(result+unactive);
			if(a=='N'){
	            $("#active_staff").css('display','block');
				$("#active_staff").addClass('response');
	        }else{
	            $("#deactive_staff").css('display','block');
				$("#deactive_staff").addClass('response');
	        }      
            setTimeout(function() {
	         window.location = baseurl+"staff";
	        }, 3000);
		},
		error: function (error) {
			alert('error; ' + eval(error));
			setTimeout(function() {
	         window.location = baseurl+"staff";
	        }, 3000);
		}
	});
}	
</script>

<script>
function set_user_permission()
{
	var baseurl=$('#baseurl').val();
	var role_id=$('#role_list_new').val();

	// alert(role_id);
	$.ajax({
		type:"POST",
		url:baseurl+'staff/staff_permission',
		data:"roleid="+role_id,
		cache: false,
		dataType: "html",
		success: function(result){
			$("#permission_accordion").empty().append(result);
			$("#permission_accordion").css('display','block');
		}
	});
}
function set_user_permission_edit()
{
	var baseurl=$('#baseurl').val();
	var role_id_edit=$('#edit_staff_role').val();

	$.ajax({
		type:"POST",
		url:baseurl+'staff/staff_permission_edit',
		data:"roleid="+role_id_edit,
		cache: false,
		dataType: "html",
		success: function(result){
			$("#permission_accordion_edit").empty().append(result);
			$("#permission_accordion_edit").css('display','block');
		}
	});
}

function select_permission(id)
{

	var baseurl= $("#baseurl").val();
	var menu_id=id;
	res=menu_id.split("_");
	
	select_single_permission(menu_id);
	if(document.getElementById(id).checked==true)
	{
		$.ajax({
		type:"POST",
		url:baseurl+'staff/fetch_sub_menu_details',
		data:{'value':res[1]},
		cache: false,
		dataType: "html",
			success: function(result){
				// alert(result);
				res1=result.split("||");
				sm_id=res1[1].split(",");
				sm_perm=res1[2].split(",");
				
				count=sm_id.length;
				for (i=0;i<count;i++)
				{
					// alert('menuid_'+sm_id[i]);
					document.getElementById('menuid_'+sm_id[i]).checked=true;
					document.getElementById('menuid_'+sm_id[i]).value='1'; //val('1');
					single_perm=sm_perm[i].split("~");
					for(j=0;j<single_perm.length;j++)
					{
						// alert(sm_id[i]+'_'+single_perm[j]);
						document.getElementById(sm_id[i]+'_'+single_perm[j]).checked=true;
						document.getElementById(sm_id[i]+'_'+single_perm[j]).value='1';
					}
				}
				
		}
	});

	}
	else
	{
		// alert("else");
		$.ajax({
		type:"POST",
		url:baseurl+'staff/fetch_sub_menu_details',
		data:{'value':res[1]},
		cache: false,
		dataType: "html",
			success: function(result){
				// alert(result);
				res1=result.split("||");
				sm_id=res1[1].split(",");
				sm_perm=res1[2].split(",");
				
				count=sm_id.length;
				for (i=0;i<count;i++)
				{
					// alert('menuid_'+sm_id[i]);
					document.getElementById('menuid_'+sm_id[i]).checked=false;
					document.getElementById('menuid_'+sm_id[i]).value='0';
					single_perm=sm_perm[i].split("~");
					for(j=0;j<single_perm.length;j++)
					{
						// alert(sm_id[i]+'_'+single_perm[j]);
						document.getElementById(sm_id[i]+'_'+single_perm[j]).checked=false;
						document.getElementById(sm_id[i]+'_'+single_perm[j]).value='0';
					}
				}
				
		}
	});
	}
}
function select_single_permission(id)
{
	// alert("submenu");
	var baseurl= $("#baseurl").val();
	var menu_id=id;
	res=menu_id.split("_");
	// alert(res[1]);
	if(document.getElementById(id).checked==true)
	{
		document.getElementById(id).value='1';
		$.ajax({
		type:"POST",
		url:baseurl+'staff/fetch_menu_permission',
		data:{'value':res[1]},
		cache: false,
		dataType: "html",
			success: function(result){
				// alert(result);
				res1=result.split("||");
				// alert(res1[1]);
				sm_perm=res1[1].split("~");
				// alert(sm_perm);
				count=sm_perm.length;
				for (i=0;i<count;i++)
				{
					document.getElementById(res[1]+'_'+sm_perm[i]).checked=true;
					document.getElementById(res[1]+'_'+sm_perm[i]).value='1';
				}
				
		}
	});
	}
	else
	{
		document.getElementById(id).value='0';
		$.ajax({
		type:"POST",
		url:baseurl+'staff/fetch_menu_permission',
		data:{'value':res[1]},
		cache: false,
		dataType: "html",
			success: function(result){
				// alert(result);
				res1=result.split("||");
				// alert(res1[1]);
				sm_perm=res1[1].split("~");
				// alert(sm_perm);
				count=sm_perm.length;
				for (i=0;i<count;i++)
				{
					document.getElementById(res[1]+'_'+sm_perm[i]).checked=false;
					document.getElementById(res[1]+'_'+sm_perm[i]).value='0';
				}
				
		}
	});
	}

}
</script>

<script>

function staff_delete(val)
{
	var baseurl= $("#baseurl").val();
	//alert(val);
	$.ajax({
	type: "POST",
	url: baseurl+'staff/staff_delete',
	async: false,
	type: "POST",
	data: "id="+val,
	dataType: "html",
	success: function(response)
	{
	$('#kt_modal_delete_staff').empty().append(response);
	$('#kt_modal_delete_staff').addClass('show');
	//$("#kt_modal_delete_role").css("display", "block");
	}
	});
}

function removeStaff(val)

{ 
	var baseurl= $("#baseurl").val();
	$.ajax({
	type: "POST",
	url: baseurl+'staff/delete',
	async: false,
	data:"field="+val,
	success: function(response)
	{
	window.location.href = baseurl+'staff';
	}
	});
}

function closeDeleteModalStaff()
	{
		var baseurl= $("#baseurl").val();
		$('#kt_modal_delete_staff').removeClass('show');
		$('.modal-backdrop').removeClass('show');
		window.location.href = baseurl+'staff';
	}
</script>


<!--Modal - Staff Edit -->

<script>
	
var title = $('title').text() + ' | ' + 'staff';
$(document).attr("title", title);

function staff_edit(val)
{
	var baseurl= $("#baseurl").val();
	//alert(val);
	$.ajax({
	type: "POST",
	url: baseurl+'staff/staff_edit',
	async: false,
	type: "POST",
	data: "id="+val,
	dataType: "html",
	success: function(response)
	{

	$('#kt_modal_edit_staff').empty().append(response);
	$('#kt_modal_edit_staff').addClass('show');
	//$("#kt_modal_editdept").css("display", "block");
	}
	});
}

// function user_edit(val)
// {
// 	var baseurl= $("#baseurl").val();
// 	//alert(val);
// 	$.ajax({
// 	type: "POST",
// 	url: baseurl+'userlist/user_edit',
// 	async: false,
// 	type: "POST",
// 	data: "id="+val,
// 	dataType: "html",
// 	success: function(response)
// 	{

// 	$('#kt_modal_edit_staff').empty().append(response);
// 	$('#kt_modal_edit_staff').addClass('show');
// 	//$("#kt_modal_editdept").css("display", "block");
// 	}
// 	});
// }

function closeEditModalstaff()
{
	var baseurl= $("#baseurl").val();
	$('#kt_modal_edit_staff').removeClass('show');
	//$("#kt_modal_update_role").css("display", "none");
	$('.modal-backdrop').removeClass('show');
	window.location.href = baseurl+'staff';
}

//View Modal

function staff_view(val)
	{
		var baseurl= $("#baseurl").val();
		// alert(baseurl);
		$.ajax({
		type: "POST",
		url: baseurl+'Staff/staff_view',
		async: false,
		type: "POST",
		data: "id="+val,
		dataType: "html",
		success: function(response)
		{
		$('#kt_modal_view_staff').empty().append(response);
		$('#kt_modal_view_staff').addClass('show');
		//$("#kt_modal_editdept").css("display", "block");
		}
		});
	}
function closeViewModalStaff()
	{
		var baseurl= $("#baseurl").val();
		$('#kt_modal_view_staff').removeClass('show');
		//$("#kt_modal_update_role").css("display", "none");
		$('.modal-backdrop').removeClass('show');
		window.location.href = baseurl+'Staff';
	}
</script>

<script>
function staff_validation()
{
	//system Name empty Check
	var err = 0;
	var company_list_new = $('#company_list_new').val();
	var add_sname_staff_list = $('#add_sname_staff_list').val();
	var add_fname_staff_list = $('#add_fname_staff_list').val();
	var add_sgender_staff_list = $('#add_sgender_staff_list').val();
	var city_list_new = $('#city_list_new').val();
	var add_saadharno_staff_list = $('#add_saadharno_staff_list').val();
	var add_sidproof_staff_list = $('#add_sidproof_staff_list').val();
	var add_sphone_staff_list = $('#add_sphone_staff_list').val();
	var kt_datepicker_dob_add_staff_list = $('#kt_datepicker_dob_add_staff_list').val();
	var add_sage_staff_list = $('#add_sage_staff_list').val();
	var kt_datepicker_doj_add_staff_list = $('#kt_datepicker_doj_add_staff_list').val();
	var add_sdept_staff_list = $('#add_sdept_staff_list').val();
	var add_sdesig_staff_list = $('#add_sdesig_staff_list').val();
	var role_list_new = $('#role_list_new').val();
	var add_suname_staff_list = $('#add_suname_staff_list').val();
	var add_spw_staff_list = $('#add_spw_staff_list').val();
	var add_swrkhrs_staff_list = $('#add_swrkhrs_staff_list').val();
	var add_sminleavedays_staff_list = $('#add_sminleavedays_staff_list').val();
	var add_saddress_staff_list = $('#add_saddress_staff_list').val();
	var add_sphoto_staff_list = $('#add_sphoto_staff_list').val();
	var add_idphoto_staff_list = $('#add_idphoto_staff_list').val();
	var add_sbassal_staff_list = $('#add_sbassal_staff_list').val();


	// alert("hi");
    if(company_list_new.trim()==''){
        $('#company_list_new_err').html('Enter Company!');
        err++;
    }else{
        //$('#systems_err').html('');
  //       if(clnw>0)
		// {
		// 	$('#company_list_new_err').html('Company already exist!');
		// 	err++;
		// }
		// else
		// {
			$('#company_list_new_err').html('');
		// }
    }
  
	

    if(add_sname_staff_list.trim()==''){
        $('#add_sname_staff_list_err').html('Enter Staff Name!');
        err++;
    }else{
  //       if(stnme>0)
		// {
		// 	$('#add_sname_staff_list_err').html('Name already exist!');
		// 	err++;
		// }
		// else
		// {
			$('#add_sname_staff_list_err').html('');
		// }
    }
   
	

    if(add_fname_staff_list.trim()==''){
        $('#add_fname_staff_list_err').html('Enter Father Name!');
        err++;
    }else{
  //       if(stfnmerr>0)
		// {
		// 	$('#add_fname_staff_list_err').html('Father Name already exist!');
		// 	err++;
		// }
		// else
		// {
			$('#add_fname_staff_list_err').html('');
		// }
    }
	

    if(add_sgender_staff_list.trim()==''){
        $('#add_sgender_staff_list_err').html('Enter Gender!');
        err++;
    }else{
  //       if(stgnerr>0)
		// {
		// 	$('#add_sgender_staff_list_err').html('Gneder already exist!');
		// 	err++;
		// }
		// else
		// {
			$('#add_sgender_staff_list_err').html('');
		// }
    }

	

    if(city_list_new.trim()==''){
        $('#city_list_new_err').html('Enter City Name!');
        err++;
    }else{
  //       if(sctymerr>0)
		// {
		// 	$('#city_list_new_err').html('City Name already exist!');
		// 	err++;
		// }
		// else
		// {
			$('#city_list_new_err').html('');
		// }
    }

	
    if(add_saadharno_staff_list.trim()==''){
        $('#add_saadharno_staff_list_err').html('Enter Aadhar Number!');
        err++;
    }else{
  //       if(stadhnumerr>0)
		// {
		// 	$('#add_saadharno_staff_list_err').html('Aadhar Number already exist!');
		// 	err++;
		// }
		// else
		// {
			$('#add_saadharno_staff_list_err').html('');
		// }
    }

	

    if(add_sidproof_staff_list.trim()==''){
        $('#add_sidproof_staff_list_err').html('Enter ID Proof!');
        err++;
    }else{
  //       if(stfnmerr>0)
		// {
		// 	$('#add_sidproof_staff_list_err').html('ID Proof already exist!');
		// 	err++;
		// }
		// else
		// {
			$('#add_sidproof_staff_list_err').html('');
		// }
    }

	
    if(add_sphone_staff_list.trim()==''){
        $('#add_sphone_staff_list_err').html('Enter phone Number!');
        err++;
    }else{
  //       if(stphnumerr>0)
		// {
		// 	$('#add_sphone_staff_list_err').html('Phone Number already exist!');
		// 	err++;
		// }
		// else
		// {
			$('#add_sphone_staff_list_err').html('');
		// }
    }

	

    if(kt_datepicker_dob_add_staff_list.trim()==''){
        $('#kt_datepicker_dob_add_staff_list_err').html('Enter DateofBirth!');
        err++;
    }else{
  //       if(stdobmerr>0)
		// {
		// 	$('#kt_datepicker_dob_add_staff_list_err').html('DateofBirth already exist!');
		// 	err++;
		// }
		// else
		// {
			$('#kt_datepicker_dob_add_staff_list_err').html('');
		// }
    }

	

    if(add_sage_staff_list.trim()==''){
        $('#add_sage_staff_list_err').html('Enter Age!');
        err++;
    }else{
  //       if(stagerr>0)
		// {
		// 	$('#add_sage_staff_list_err').html('Age already exist!');
		// 	err++;
		// }
		// else
		// {
			$('#add_sage_staff_list_err').html('');
		// }
    }

    

    if(kt_datepicker_doj_add_staff_list.trim()==''){
        $('#kt_datepicker_doj_add_staff_list_err').html('Enter DateofJoining!');
        err++;
    }else{
  //       if(stdojmerr>0)
		// {
		// 	$('#kt_datepicker_doj_add_staff_list_err').html('DateofJoining already exist!');
		// 	err++;
		// }
		// else
		// {
			$('#kt_datepicker_doj_add_staff_list_err').html('');
		// }
    }

    
    

    if(add_sdept_staff_list.trim()==''){
        $('#add_sdept_staff_list_err').html('Enter Department!');
        err++;
    }else{
  //       if(stfnmerr>0)
		// {
		// 	$('#add_sdept_staff_list_err').html('Department already exist!');
		// 	err++;
		// }
		// else
		// {
			$('#add_sdept_staff_list_err').html('');
		// }
    }
    

    if(add_sdesig_staff_list.trim()==''){
        $('#add_sdesig_staff_list_err').html('Enter Designation!');
        err++;
    }else{
  //       if(stdesigerr>0)
		// {
		// 	$('#add_sdesig_staff_list_err').html('Designation already exist!');
		// 	err++;
		// }
		// else
		// {
			$('#add_sdesig_staff_list_err').html('');
		// }
    }

    

    if(role_list_new.trim()==''){
        $('#role_list_new_err').html('Enter Role!');
        err++;
    }else{
  //       if(strolerr>0)
		// {
		// 	$('#role_list_new_err').html('Role already exist!');
		// 	err++;
		// }
		// else
		// {
			$('#role_list_new_err').html('');
		// }
    }

    

    if(add_suname_staff_list.trim()==''){
        $('#add_suname_staff_list_err').html('Enter Username!');
        err++;
    }else{
  //       if(stusnmerr>0)
		// {
		// 	$('#add_suname_staff_list_err').html('Username exist!');
		// 	err++;
		// }
		// else
		// {
			$('#add_suname_staff_list_err').html('');
		// }
    }

    

    if(add_spw_staff_list.trim()==''){
        $('#add_spw_staff_list_err').html('Enter Password!');
        err++;
    }else{
  //       if(stpwderr>0)
		// {
		// 	$('#add_spw_staff_list_err').html('Password already exist!');
		// 	err++;
		// }
		// else
		// {
			$('#add_spw_staff_list_err').html('');
		// }
    }


    

    if(add_swrkhrs_staff_list.trim()==''){
        $('#add_swrkhrs_staff_list_err').html('Enter Work Hours!');
        err++;
    }else{
  //       if(stwrkhrserr>0)
		// {
		// 	$('#add_swrkhrs_staff_list_err').html('Work Hours already exist!');
		// 	err++;
		// }
		// else
		// {
			$('#add_swrkhrs_staff_list_err').html('');
		// }
    }


    

    if(add_sminleavedays_staff_list.trim()==''){
        $('#add_sminleavedays_staff_list_err').html('Enter Password!');
        err++;
    }else{
  //       if(stminlverr>0)
		// {
		// 	$('#add_sminleavedays_staff_list_err').html('Password already exist!');
		// 	err++;
		// }
		// else
		// {
			$('#add_sminleavedays_staff_list_err').html('');
		// }
    }


    

    if(add_saddress_staff_list.trim()==''){
        $('#add_saddress_staff_list_err').html('Enter Address!');
        err++;
    }else{
  //       if(stadderr>0)
		// {
		// 	$('#add_saddress_staff_list_err').html('Address already exist!');
		// 	err++;
		// }
		// else
		// {
			$('#add_saddress_staff_list_err').html('');
		// }
    }


    

    if(add_sphoto_staff_list.trim()==''){
        $('#add_sphoto_staff_list_err').html('Enter Staff Photo!');
        err++;
    }else{
  //       if(stphtomerr>0)
		// {
		// 	$('#add_sphoto_staff_list_err').html('Password already exist!');
		// 	err++;
		// }
		// else
		// {
			$('#add_sphoto_staff_list_err').html('');
		// }
    }

   
    if(add_idphoto_staff_list.trim()==''){
        $('#add_idphoto_staff_list_err').html('Enter ID Photo!');
        err++;
    }else{
  //       if(stidphtoerr>0)
		// {
		// 	$('#add_idphoto_staff_list_err').html('Password already exist!');
		// 	err++;
		// }
		// else
		// {
			$('#add_idphoto_staff_list_err').html('');
		// }
    }

    

    if(add_sbassal_staff_list.trim()==''){
        $('#add_sbassal_staff_list_err').html('Enter Basic Salary!');
        err++;
    }else{
  //       if(stbssalerr>0)
		// {
		// 	$('#add_sbassal_staff_list_err').html('Basic Salary already exist!');
		// 	err++;
		// }
		// else
		// {
			$('#add_sbassal_staff_list_err').html('');
		// }
    }
    
   if(err>0){ return false; }else { return true; }
}		
</script>

<!-- Unique Validation-->
<script>
//staff Mobile Unique validation
			var berr=0;
			function staff_phone_unique(val)
			{
				var baseurl= $("#baseurl").val();
				$.ajax({
					type:"POST",
					url:baseurl+'Staff/staff_phone_unique',
					data:{'value':val},
					cache: false,
					dataType: "html",
						success: function(result){
						if(result>0)
						{
							$('#add_sphone_staff_list_err').html('Mobile Number already exist!');
							berr=1;
						}
						else
						{
							$('#add_sphone_staff_list_err').html('');
							berr=0;
						}
					}
				});
			}

function staff_edit_validation()
			{
				var err1 = 0;
				//Company Edit Field
				var edit_staff_company = $('#edit_staff_company').val();
			    if(edit_staff_company.trim()==''){
			        $('#edit_staff_company_err').html('Please Select a Company!');
			        err1++;
			    }else{
			        if(berr1>0)
					{
						$('#edit_staff_company_err').html('Company already exist!');
						err1++;
					}
					else
					{
						$('#edit_staff_company_err').html('');
					}
			  }

		
				//Company Edit Field
				var edit_sname_staff_list = $('#edit_sname_staff_list').val();
			    if(edit_sname_staff_list.trim()==''){
			        $('#edit_sname_staff_list_err').html('Please Select staff Name!');
			        err1++;
			    }else{
			        if(berr1>0)
					{
						$('#edit_sname_staff_list_err').html('Staff Name already exist!');
						err1++;
					}
					else
					{
						$('#edit_sname_staff_list_err').html('');
					}
			    }

			    var edit_fname_staff_list = $('#edit_fname_staff_list').val();
			    if(edit_fname_staff_list.trim()==''){
			        $('#edit_fname_staff_list_err').html('Enter Father Name!');
			        err1++;
			    }else{
			        if(stfnmerre>0)
					{
						$('#edit_fname_staff_list_err').html('Father Name already exist!');
						err1++;
					}
					else
					{
						$('#edit_fname_staff_list_err').html('');
					}
			  }

		
				var edit_staffgender_staff_list = $('#edit_staffgender_staff_list').val();

			    if(edit_staffgender_staff_list.trim()==''){
			        $('#edit_staffgender_staff_list_err').html('Enter Gender!');
			        err1++;
			    }else{
			        if(stgnerre>0)
					{
						$('#edit_staffgender_staff_list_err').html('Gender already exist!');
						err1++;
					}
					else
					{
						$('#edit_staffgender_staff_list_err').html('');
					}
			  }


				var edit_staff_city = $('#edit_staff_city').val();

			    if(edit_staff_city.trim()==''){
			        $('#edit_staff_city_err').html('Enter City Name!');
			        err1++;
			    }else{
			        if(sccitye>0)
					{
						$('#edit_staff_city_err').html('City Name already exist!');
						err1++;
					}
					else
					{
						$('#edit_staff_city_err').html('');
					}
			    }

				var edit_saadharno_staff_list = $('#edit_saadharno_staff_list').val();

			    if(edit_saadharno_staff_list.trim()==''){
			        $('#edit_saadharno_staff_list_err').html('Enter Aadhar Number!');
			        err1++;
			    }else{
			        if(staadhare>0)
					{
						$('#edit_saadharno_staff_list_err').html('Aadhar Number already exist!');
						err1++;
					}
					else
					{
						$('#edit_saadharno_staff_list_err').html('');
					}
			    }

				var edit_sidproof_staff_list = $('#edit_sidproof_staff_list').val();

			    if(edit_sidproof_staff_list.trim()==''){
			        $('#edit_sidproof_staff_list_err').html('Enter ID Proof!');
			        err1++;
			    }else{
			        if(stidprferre>0)
					{
						$('#edit_sidproof_staff_list_err').html('ID Proof already exist!');
						err1++;
					}
					else
					{
						$('#edit_sidproof_staff_list_err').html('');
					}
			    }

				var edit_sphone_staff_list = $('#edit_sphone_staff_list').val();

			    if(edit_sphone_staff_list.trim()==''){
			        $('#edit_sphone_staff_list_err').html('Enter phone Number!');
			        err1++;
			    }else{
			        if(stphnumerre>0)
					{
						$('#edit_sphone_staff_list_err').html('Phone Number already exist!');
						err1++;
					}
					else
					{
						$('#edit_sphone_staff_list_err').html('');
					}
			    }

				var kt_datepicker_dob_edit_staff = $('#kt_datepicker_dob_edit_staff').val();

			    if(kt_datepicker_dob_edit_staff.trim()==''){
			        $('#kt_datepicker_dob_edit_staff_err').html('Enter DateofBirth!');
			        err1++;
			    }else{
			        if(stdobmerre>0)
					{
						$('#kt_datepicker_dob_edit_staff_err').html('DateofBirth already exist!');
						err1++;
					}
					else
					{
						$('#kt_datepicker_dob_edit_staff_err').html('');
					}
			    }

				var edit_sage_staff_list = $('#edit_sage_staff_list').val();

			    if(edit_sage_staff_list.trim()==''){
			        $('#edit_sage_staff_list_err').html('Enter Age!');
			        err1++;
			    }else{
			        if(stagerre>0)
					{
						$('#edit_sage_staff_list_err').html('Age already exist!');
						err1++;
					}
					else
					{
						$('#edit_sage_staff_list_err').html('');
					}
			    }

			    var kt_datepicker_doj_edit_staff = $('#kt_datepicker_doj_edit_staff').val();

			    if(kt_datepicker_doj_edit_staff.trim()==''){
			        $('#kt_datepicker_doj_edit_staff_err').html('Enter DateofJoining!');
			        err1++;
			    }else{
			        if(stdojmerre>0)
					{
						$('#kt_datepicker_doj_edit_staff_err').html('DateofJoining already exist!');
						err1++;
					}
					else
					{
						$('#kt_datepicker_doj_edit_staff_err').html('');
					}
			    }

			    
			    var edit_sdept_staff_list = $('#edit_sdept_staff_list').val();

			    if(edit_sdept_staff_list.trim()==''){
			        $('#add_sdept_staff_list_err').html('Enter Department!');
			        err1++;
			    }else{
			        if(stdepterre>0)
					{
						$('#edit_sdept_staff_list_err').html('Department already exist!');
						err1++;
					}
					else
					{
						$('#edit_sdept_staff_list_err').html('');
					}
			    }
			    var edit_sdesig_staff_list = $('#edit_sdesig_staff_list').val();

			    if(edit_sdesig_staff_list.trim()==''){
			        $('#edit_sdesig_staff_list_err').html('Enter Designation!');
			        err1++;
			    }else{
			        if(stdesigerre>0)
					{
						$('#edit_sdesig_staff_list_err').html('Designation already exist!');
						err1++;
					}
					else
					{
						$('#edit_sdesig_staff_list_err').html('');
					}
			    }

			    var edit_staff_role = $('#edit_staff_role').val();

			    if(edit_staff_role.trim()==''){
			        $('#edit_staff_role_err').html('Enter Role!');
			        err1++;
			    }else{
			        if(strolerre>0)
					{
						$('#edit_staff_role_err').html('Role already exist!');
						err1++;
					}
					else
					{
						$('#edit_staff_role_err').html('');
					}
			    }

			    var edit_suname_staff_list = $('#edit_suname_staff_list').val();

			    if(edit_suname_staff_list.trim()==''){
			        $('#edit_suname_staff_list_err').html('Enter Username!');
			        err1++;
			    }else{
			        if(stusnmerre>0)
					{
						$('#edit_suname_staff_list_err').html('Username exist!');
						err1++;
					}
					else
					{
						$('#edit_suname_staff_list_err').html('');
					}
			    }

			    var edit_spw_staff_list = $('#edit_spw_staff_list').val();

			    if(edit_spw_staff_list.trim()==''){
			        $('#edit_spw_staff_list_err').html('Enter Password!');
			        err1++;
			    }else{
			        if(stpwderre>0)
					{
						$('#edit_spw_staff_list_err').html('Password already exist!');
						err1++;
					}
					else
					{
						$('#edit_spw_staff_list_err').html('');
					}
			    }


			    var edit_swrkhrs_staff_list = $('#edit_swrkhrs_staff_list').val();

			    if(edit_swrkhrs_staff_list.trim()==''){
			        $('#edit_swrkhrs_staff_list_err').html('Enter Work Hours!');
			        err1++;
			    }else{
			        if(stwrkhrserre>0)
					{
						$('#edit_swrkhrs_staff_list_err').html('Work Hours already exist!');
						err1++;
					}
					else
					{
						$('#edit_swrkhrs_staff_list_err').html('');
					}
			    }


			    var edit_sminleavedays_staff_list = $('#edit_sminleavedays_staff_list').val();

			    if(edit_sminleavedays_staff_list.trim()==''){
			        $('#edit_sminleavedays_staff_list_err').html('Enter Min Leav Days!');
			        err1++;
			    }else{
			        if(stminlverre>0)
					{
						$('#edit_sminleavedays_staff_list_err').html('Minimum Leave days already exist!');
						err1++;
					}
					else
					{
						$('#edit_sminleavedays_staff_list_err').html('');
					}
				}	

			    var edit_saddress_staff_list = $('#edit_saddress_staff_list').val();

			    if(edit_saddress_staff_list.trim()==''){
			        $('#edit_saddress_staff_list_err').html('Enter Address!');
			        err1++;
			    }else{
			        if(stadderre>0)
					{
						$('#edit_saddress_staff_list_err').html('Address already exist!');
						err1++;
					}
					else
					{
						$('#edit_saddress_staff_list_err').html('');
					}
			    }

			    var edit_sphoto_staff_list = $('#edit_sphoto_staff_list').val();

			    if(edit_sphoto_staff_list.trim()==''){
			        $('#edit_sphoto_staff_list_err').html('Enter Staff Photo!');
			        err1++;
			    }else{
			        if(stphtomerre>0)
					{
						$('#edit_sphoto_staff_list_err').html('Password already exist!');
						err1++;
					}
					else
					{
						$('#edit_sphoto_staff_list_err').html('');
					}
			    }

			    var edit_id_photo_staff_list = $('#edit_id_photo_staff_list').val();

			    if(edit_id_photo_staff_list.trim()==''){
			        $('#edit_id_photo_staff_list_err').html('Enter ID Photo!');
			        err1++;
			    }else{
			        if(stphtomerre>0)
					{
						$('#edit_id_photo_staff_list_err').html('ID already exist!');
						err1++;
					}
					else
					{
						$('#edit_id_photo_staff_list_err').html('');
					}
			    }

			    var edit_sbassal_staff_list = $('#edit_sbassal_staff_list').val();

			    if(edit_sbassal_staff_list.trim()==''){
			        $('#edit_sbassal_staff_list_err').html('Enter Basic Salary!');
			        err1++;
			    }else{
			        if(stbssalerre>0)
					{
						$('#edit_sbassal_staff_list_err').html('Basic Salary already exist!');
						err1++;
					}
					else
					{
						$('#edit_sbassal_staff_list_err').html('');
					}
			    }

			    if(err1>0){ return false; }else{ return true; }
			}

</script>

<script>
var stphnumerre=0;
function staff_phone_unique_edit(val)
{
	var baseurl= $("#baseurl").val();
	$.ajax({
		type:"POST",
		url:baseurl+'Staff/staff_phone_unique_edit',
		data:{'value':val},
		cache: false,
		dataType: "html",
			success: function(result){
			if(result>0)
			{
				$('#edit_sphone_staff_list_err').html('Mobile Number already exist!');
				stphnumerre=1;
			}
			else
			{
				$('#edit_sphone_staff_list_err').html('');
				stphnumerre=0;
			}
		}
	});
}
</script>

		<script>
			document.getElementById("btnPrint").onclick = function () {
			    printElement(document.getElementById("staff_print"));
			}

			function printElement(elem) {
			    // var domClone = elem.cloneNode(true);
			    
			    // var $printSection = document.getElementById("printSection");
			    
			    // if (!$printSection) {
			    //     var $printSection = document.createElement("div");
			    //     $printSection.id = "printSection";
			    //     document.body.appendChild($printSection);
			    // }
			    
			    // $printSection.innerHTML = "";
			    // $printSection.appendChild(domClone);
			    // window.print();

			    $val = $("#staff_print").html();
			   
				var a = window.open();
	            a.document.write($val);
	         
	            a.document.close();
	            a.print();
			}
			// function staff_print(){
			// 	var a = window.open();
			// 	a.document.write('<html>');
	  	//           a.document.write('<body > <h1>Div contents are <br>');
	         
	  //           a.document.write('</body></html>');
	  //           a.document.close();
	  //           a.print();


			// }
		</script>
<script>
	function staffid_inc(){

		//var c_code= $("#company_list_new").val();
		var baseurl= $("#baseurl").val();
		// alert(baseurl);
		$.ajax({
		type: "POST",
		//data:"c_code="+c_code;
		url: baseurl+'Staff/generate_staff_id',
		async: false,
		dataType: "html",
		success: function(response)
		{
		$('#add_sid_staff_list').val(response);
		// alert(response);

		//$('#edit_sid_staff_list'.trim()).val(response);
		//$('#view_staffid_staff'.trim()).val(response);	
		}
		});
	}
</script>



</body>
<!--end::Body-->
</html>