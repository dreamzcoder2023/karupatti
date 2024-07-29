<?php $this->load->view("common");?>
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
									<h1 class="d-flex align-items-center text-dark fw-bold my-1 fs-3">General Setting
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
										<!--begin::Body-->
										<div class="card-body py-3">
											<form class="form w-100" novalidate="novalidate" id="kt_sign_in_form" action="settings/general_settings_update" method="post" enctype="multipart/form-data">
											<div class="row mb-6">
												<div class="col-lg-1">
												</div>
												<input type="hidden" name="oldlogo" value="<?php echo $g_settings->logo;?>">
                                        <input type="hidden" name="oldfav" value="<?php echo $g_settings->favicon;?>">
												<!--begin::Label-->
												<label class="col-lg-1 col-form-label fw-semibold fs-6">Logo</label>
												<!--end::Label-->
												<!--begin::Col-->
												<div class="col-lg-3">
													<!--begin::Image input-->
													<div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url('assets/media/svg/avatars/blank.svg')">
														<!--begin::Preview existing avatar-->

														<div class="image-input-wrapper w-125px h-125px" style="background-image: url(<?php echo base_url();?><?php echo 'assets/images/'.$g_settings->logo; ?>)"></div>
														<!--end::Preview existing avatar-->
														<!--begin::Label-->
														<label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" data-kt-initialized="1">
															<i class="bi bi-pencil-fill fs-7"></i>
															<!--begin::Inputs-->
															<input type="file" name="logo" id="logo" accept=".png, .jpg, .jpeg">
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
												<div class="col-lg-2">
												</div>
												<!--begin::Label-->
												<label class="col-lg-1 col-form-label fw-semibold fs-6">Fav Icon</label>
												<!--end::Label-->
												<!--begin::Col-->
												<div class="col-lg-3">
													<!--begin::Image input-->
													<div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url('assets/media/svg/avatars/blank.svg')">
														<!--begin::Preview existing avatar-->
														<div class="image-input-wrapper w-125px h-125px" style="background-image: url(<?php echo base_url();?><?php echo 'assets/images/'.$g_settings->favicon; ?>)"></div>
														<!--end::Preview existing avatar-->
														<!--begin::Label-->
														<label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" data-kt-initialized="1">
															<i class="bi bi-pencil-fill fs-7"></i>
															<!--begin::Inputs-->
															<input type="file" name="favicon" id="favicon" accept=".png, .jpg, .jpeg">
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
											<div class="row mb-6">
												<!--begin::Label-->
												<label class="col-lg-1 col-form-label required fw-semibold fs-6">Title</label>
												<!--end::Label-->
												<!--begin::Col-->
												<div class="col-lg-2 fv-row fv-plugins-icon-container">
													<input type="text" name="title"  id="title" class="form-control form-control-lg form-control-solid" placeholder="Company name" value="<?php echo $g_settings->Title; ?>">
													<div class="fv-plugins-message-container invalid-feedback"></div>
												</div>
												<!--end::Col-->
												<div class="col-lg-1"></div>
												<!--begin::Label-->
												<label class="col-lg-1 col-form-label required fw-semibold fs-6">Date</label>
												<!--end::Label-->
												<!--begin::Left Section-->
											<div class="col-lg-2 d-flex align-self-center">
												<div class="flex-grow-1 me-3">
													<!--begin::Select-->
													<select class="form-select form-select-solid" data-control="select2" data-placeholder="select format" data-hide-search="true" name="date_format" id="date_format">

														<option value="d-M-Y" <?php echo $g_settings->date_format=='d-M-Y'?'selected':'';?>>dd-mmm-yyyy</option>
														<option value="d/m/Y" <?php echo $g_settings->date_format=='d/m/Y'?'selected':'';?>>dd/mm/yyyy</option>
														<option value="Y-m-d" <?php echo $g_settings->date_format=='Y-m-d'?'selected':'';?>>yyyy-mm-dd</option>
														<option value="Y/m/d" <?php echo $g_settings->date_format=='Y/m/d'?'selected':'';?>>yyyy/mm/dd</option>
													</select>
													<!--end::Select-->
												</div>
											</div>
											<!--end::Left Section-->
											<div class="col-lg-1"></div>
												<!--begin::Label-->
												<label class="col-lg-1 col-form-label required fw-semibold fs-6">Time</label>
												<!--end::Label-->
												<!--begin::Left Section-->
											<div class="col-lg-3 d-flex align-self-center">
												<div class="flex-grow-1 me-3">
													<!--begin::Select-->
													<select class="form-select form-select-solid" data-control="select2" data-placeholder="Time Zone" data-hide-search="true" name="timezone" id="timezone">
														<option value="Asia/Kolkata" selected>Asia/Kolkata (UTC+05:30)</option>
														<!-- <option value=""></option> -->
													</select>
													<!--end::Select-->
												</div>
											</div>
											<!--end::Left Section-->
									
												<!--begin::Label-->
												<!--<label class="col-lg-2 col-form-label fw-semibold fs-6">
													<span class="required">Phone No</span>
													<i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" aria-label="Phone number must be active" data-kt-initialized="1"></i>
												</label>-->
												<!--end::Label-->
												<!--begin::Col-->
												<!--phone number <div class="col-lg-3 fv-row fv-plugins-icon-container">
													<input type="tel" name="phone" class="form-control form-control-lg form-control-solid" placeholder="Phone number" value="9895989596">
												<div class="fv-plugins-message-container invalid-feedback"></div></div>-->
												<!--end::Col-->
												<!--<div class="fv-row mb-10 fv-plugins-icon-container fv-plugins-bootstrap5-row-valid">-->
													<!--begin::Label-->
													<!--<label class="form-label">Address</label>-->
													<!--end::Label-->
													<!--begin::Input-->
													<!--<textarea name="business_description" class="form-control form-control-lg form-control-solid" rows="3"></textarea>-->
													<!--end::Input-->
													<!--<div class="fv-plugins-message-container invalid-feedback"></div>
												</div>-->
											</div>
											<!-- <div class="row mb-6"> -->
												<!--begin::Label-->
												<!-- <label class="col-lg-1 col-form-label fw-semibold fs-6">Language</label> -->
												<!--end::Label-->
												<!--begin::Left Section-->
											<!-- <div class="col-lg-2 d-flex align-self-center"> -->
												<!-- <div class="flex-grow-1 me-3"> -->
													<!--begin::Select-->
													<!-- <select class="form-select form-select-solid" data-control="select2" data-placeholder="dd-mm-yyyy" data-hide-search="true"> -->
														<!-- <option value="0">English</option> -->
													<!-- </select> -->
													<!--end::Select-->
												<!-- </div> -->
											<!-- </div> -->
											<!--end::Left Section-->
												<!-- <div class="col-lg-1"></div> -->
												<!--begin::Label-->
												<!-- <label class="col-lg-1 col-form-label fw-semibold fs-6">Currency</label> -->
												<!--end::Label-->
												<!--begin::Left Section-->
											<!-- <div class="col-lg-2 d-flex align-self-center"> -->
												<!-- <div class="flex-grow-1 me-3"> -->
													<!--begin::Select-->
													<!-- <select class="form-select form-select-solid" data-control="select2" data-placeholder="dd-mm-yyyy" data-hide-search="true"> -->
														<!-- <option value="0">INR</option>
														<option value="1">EURO</option>
														<option value="2">USD</option>
													</select> -->
													<!--end::Select-->
												<!-- </div> -->
											<!-- </div> -->
											<!--end::Left Section-->
										<!-- </div> -->
										<div class="row">
										<div class="col-lg-10"></div>
										<div class="col-lg-2">
											<button class="btn btn-success" id="save" name="save">Save Changes</button>
										</div></div>
									</form>
										</div>
										<!--begin::Body-->
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
		
		<?php $this->load->view("script");?>
	</body>
	<!--end::Body-->
</html>