<?php $this->load->view("common");?>
	<!--begin::Body-->
	<body data-kt-name="metronic" id="kt_body" class="header-fixed header-tablet-and-mobile-fixed toolbar-enabled toolbar-fixed aside-enabled aside-fixed">
		<!--begin::Theme mode setup on page load-->
		<script>if ( document.documentElement ) { const defaultThemeMode = "system"; const name = document.body.getAttribute("data-kt-name"); let themeMode = localStorage.getItem("kt_" + ( name !== null ? name + "_" : "" ) + "theme_mode_value"); if ( themeMode === null ) { if ( defaultThemeMode === "system" ) { themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light"; } else { themeMode = defaultThemeMode; } } document.documentElement.setAttribute("data-theme", themeMode); }
		</script>
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
									<h1 class="d-flex align-items-center text-dark fw-bold my-1 fs-3">Add Jewel Settlement 
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
											<form method="POST" action="<?php echo base_url(); ?>jewelsettlement/jewelsettelement_save" enctype="multipart/form-data" onsubmit="return false" id="add_jewel" >

												<div class="modal-body pt-0 pb-15 px-5 px-xl-20">
													<!--begin::Heading-->
													<div class="mb-7 text-center">
														<h1>Jewel Final Settlement</h1>
													</div>
													<!--end::Heading-->
													<div class="row">
														<!--begin::Label-->
														<label class="col-md-1 col-form-label required fw-bold fs-6">Bill No</label>
														<!--end::Label-->
														<!--begin::Col-->
														<div class="col-lg-2 fv-row fv-plugins-icon-container">
															<input type="text" name="bill_no_jl_final_settlement" class="form-control form-control-lg form-control-solid" placeholder="Bill No" value="" onkeyup="validate_bill_no(event);" list="datalist" id="bill_no">

															<!-- On keyup calls the function everytime a key is released -->
															<datalist id="datalist">
																
															</datalist>

															<div class="fv-plugins-message-container invalid-feedback"></div>
															<!-- <input type="text" list="datalist" onkeyup="ac(this.value)"> -->

														</div>
														<!--end::Col-->
														<div class="col-lg-5"></div>
														<!--begin::Col-->
														<label class="col-form-label required fw-bold fs-6" style="flex: 0 0 auto;width: 10.33333333%;">Issue Date</label>
														<div class="col-lg-2 fv-row">
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
																<input class="form-control form-control-solid ps-12" name="from_date" placeholder="Issue Date" id="kt_datepicker_jewel_settlement_issue_date" value="<?php echo date('y-m-d');?>"/>
															</div>
														</div>
														<!--end::Col-->
														<div class="col-lg-4">
															<label class="col-form-label fw-bold fs-6">Name :</label>
															<label class="col-form-label fw-semibold fs-6" id="party_name"></label>
														</div>
														<div class="col-lg-4">
															<label class="col-form-label fw-bold fs-6">Address :</label>
															<label class="col-form-label fw-semibold fs-6" id="party_address"></label>
														</div>
														<div class="col-lg-4">
															<label class="close-form close-form-solid fw-bold text-danger fs-4" id="cus_transfer"></label>
														</div>
													</div>
													<div><label class="col-lg-2 col-form-label fw-bold fs-6"><u>Payment Details</u></label></div>
													<div class="row">
														<div class="col-lg-8">
															<div style="padding: 10px 10px 10px 10px !important;box-shadow: 0 3px 6px #00002947;border-radius: 5px;background-color: #f5f5f1 !important;">
																<div class="row">
																	<!--begin::Label-->
																	<label class="col-md-2 col-form-label fw-bold fs-6">Month</label>
																	<!--end::Label-->
																	<!--begin::Col-->
																	<div class="col-md-2 fv-row fv-plugins-icon-container">
																		<input type="text" name="months" class="form-control form-control-md form-control-solid" value="" id="months" readonly>
																		<div class="fv-plugins-message-container invalid-feedback"></div>
																	</div>
																	<!--end::Col-->
																	<!--begin::Label-->
																	<label class="col-md-2 col-form-label fw-bold fs-6">Day</label>
																	<!--end::Label-->
																	<!--begin::Col-->
																	<div class="col-md-2 fv-row fv-plugins-icon-container">
																		<input type="text" name="days" class="form-control form-control-md form-control-solid" value=""id="days" readonly>
																		<div class="fv-plugins-message-container invalid-feedback"></div>
																	</div>
																	<!--end::Col-->
																	<!--begin::Label-->
																	<label class="col-md-2 col-form-label fw-bold fs-6">Total Pay</label>
																	<!--end::Label-->
																	<!--begin::Col-->
																	<div class="col-md-2 fv-row fv-plugins-icon-container">
																		<input type="text" name="total_pay" class="form-control form-control-md form-control-solid" placeholder="Bill No" value="" id="total_pay" readonly>
																		<div class="fv-plugins-message-container invalid-feedback"></div>
																	</div>
																	<!--end::Col-->
																</div>
																<div class="row">
																	<!--begin::Label-->
																	<label class="col-md-2 col-form-label fw-bold fs-6">Other Char</label>
																	<!--end::Label-->
																	<!--begin::Col-->
																	<div class="col-md-2 fv-row fv-plugins-icon-container">
																		<input type="text" name="other_charge" class="form-control form-control-md form-control-solid" placeholder="Month" value="" id="other_charge" readonly>
																		<div class="fv-plugins-message-container invalid-feedback"></div>
																	</div>
																	<!--end::Col-->
																	<!--begin::Label-->
																	<label class="col-md-2 col-form-label fw-bold fs-6">Discount</label>
																	<!--end::Label-->
																	<!--begin::Col-->
																	<div class="col-md-2 fv-row fv-plugins-icon-container">
																		<input type="text" name="discount" class="form-control form-control-md form-control-solid" placeholder="Day" value="" id="discount" readonly>
																		<div class="fv-plugins-message-container invalid-feedback"></div>
																	</div>
																	<!--end::Col-->
																	<!--begin::Label-->
																	<label class="col-md-2 col-form-label fw-bold fs-6">Recv Cash</label>
																	<!--end::Label-->
																	<!--begin::Col-->
																	<div class="col-md-2 fv-row fv-plugins-icon-container">
																		<input type="text" name="received" value="" id="received" class="form-control form-control-md form-control-solid" placeholder=""  style="font-size: 17px !important;font-weight: 600 !important;margin-top: 8px !important;" readonly>
																		<div class="fv-plugins-message-container invalid-feedback"></div>
																	</div>
																	<!--end::Col-->
																</div>
																<div class="row">
																	<!--begin::Label-->
																	<label class="col-md-2 col-form-label fw-bold fs-6">Net Pay</label>
																	<!--end::Label-->
																	<!--begin::Col-->
																	<div class="col-md-2 fv-row fv-plugins-icon-container">
																		<input type="text" name="net_pay" class="form-control form-control-md form-control-solid" placeholder="Month" value="" id="net_pay" style="font-size: 17px !important;font-weight: 600 !important;margin-top: 8px !important;" readonly>
																		<div class="fv-plugins-message-container invalid-feedback"></div>
																	</div>
																	<!--end::Col-->
																	<!--begin::Label-->
																	<label class="col-md-2 col-form-label fw-bold fs-6">Balance</label>
																	<!--end::Label-->
																	<!--begin::Col-->
																	<div class="col-md-2 fv-row fv-plugins-icon-container">
																		<input type="text" name="company" class="form-control form-control-md form-control-solid" placeholder="Day" value="" id="balance" style="font-size: 17px !important;font-weight: 600 !important;margin-top: 8px !important;" readonly>
																		<div class="fv-plugins-message-container invalid-feedback"></div>
																	</div>
																	<!--end::Col-->
																</div>
															</div><br>
															<div style="padding: 10px 10px 10px 10px !important;box-shadow: 0 3px 6px #00002947;border-radius: 5px;background-color: #f5f5f1 !important;">
																<div class="row">
																	<label class="col-md-2 col-form-label fw-bold fs-6">Closed By</label>
																	<!--begin::Left Section-->
																	<div class="col-md-3">
																		<!--begin::Select-->
																		<select class="form-select form-select-solid" data-control="select2" data-hide-search="true" disabled id="select_closed">	
																			<option value="PARTY" selected>Party</option>				
																			<option value="NOMINEE">Nominee</option>
																			<option value="OTHERS">Others</option>
																		</select>
																		<!--end::Select-->
																	</div>
																	<!--begin::Col-->
																	<div class="col-md-3 fv-row fv-plugins-icon-container">
																		<input type="text" name="company" class="form-control form-control-md form-control-solid" value="" id="party_name_list" readonly>
																		<div class="fv-plugins-message-container invalid-feedback"></div>
																	</div>
																	<!--end::Col-->
																	<!--begin::Label-->
																	<label class="col-md-2 col-form-label required fw-bold fs-6">BillNo</label>
																	<!--end::Label-->
																	<!--begin::Col-->
																	<div class="fv-row fv-plugins-icon-container" style="flex: 0 0 auto;width: 15.66666667%;">
																		<input type="text" name="billno_jl_final_settlement" class="form-control form-control-md form-control-solid" placeholder="Bill No" style="font-size: 17px !important;font-weight: 600 !important;margin-top: 8px !important;" id="bill_no_2" readonly>
																		<div class="fv-plugins-message-container invalid-feedback"></div>
																	</div>
																	<!--end::Col-->
																</div>
																<div class="row">
																	<label class="col-lg-2 col-form-label fw-bold fs-6">Issued to</label>
																	<!--begin::Left Section-->
																	<div class="col-md-3">
																		<!--begin::Select-->
																		<select class="form-select form-select-solid" data-control="select2" data-hide-search="true" id="select_issue">	
																			<option value="PARTY" selected>Party</option>				
																			<option value="NOMINEE">Nominee</option>
																			<option value="OTHERS">Others</option>
																		</select>
																		<!--end::Select-->
																	</div>
																	<!--begin::Col-->
																	<div class="col-md-3 fv-row fv-plugins-icon-container">
																		<input type="text" name="company" class="form-control form-control-md form-control-solid" value="" id="issue_by">
																		<div class="fv-plugins-message-container invalid-feedback"></div>
																	</div>
																	<!--end::Col-->
																</div>
															</div>
														</div>
														<div class="col-lg-4">
															<div style="padding: 10px 10px 10px 10px !important;box-shadow: 0 3px 6px #00002947;border-radius: 5px;background-color: #f5f5f1 !important;">
																<div class="row">
																	<label class="col-lg-5 col-form-label fw-bold fs-6">Loan Date : </label>
																	<label class="col-lg-7 col-form-label fw-semibold fs-6" id="loan_date"></label>
																</div>
																<div class="row">
																	<label class="col-lg-5 col-form-label fw-bold fs-6">Interest </label>
																	<label class="col-lg-7 col-form-label fw-semibold fs-6" id="interest"></label>
																</div>
																<div class="row">
																	<label class="col-lg-5 col-form-label fw-bold fs-6">Loan Amount </label>
																	<label class="col-lg-7 col-form-label fw-semibold fs-6" id="loan_amount"></label>
																</div>
																<div class="row">
																	<label class="col-lg-5 col-form-label fw-bold fs-6">weight </label>
																	<label class="col-lg-7 col-form-label fw-semibold fs-6" id="weight"></label>
																</div>
																<div class="row">
																	<label class="col-lg-5 col-form-label fw-bold fs-6">Period </label>
																	<label class="col-lg-7 col-form-label fw-semibold fs-6" id="period"></label>
																</div>
																<div class="row">
																	<label class="col-lg-5 col-form-label fw-bold fs-6">Closing Date </label>
																	<label class="col-lg-7 col-form-label fw-semibold fs-6" id="close_date"></label>
																</div>
															</div>
														</div>
													</div>
													<br>
													<div class="row card mb-5" >
														<table id="settings_jl_fl_set" class="table table-striped border rounded table-hover gs-2 gy-1 fs-7">
														    <thead>
														        <tr class="fw-bold fs-6 text-uppercase gs-0">
														            <th class="min-w-20px">Sno</th>
														            <th class="min-w-80px">Pledge No</th>
														            <th class="min-w-80px">Pledge</th>
														            <th class="min-w-80px">Description</th>
														            <th class="min-w-80px">Purity</th>
														            <th class="min-w-20px">Qty</th>
														            <th class="min-w-50px">Weight</th>
														            <th class="min-w-80px">Status</th>
														            <th class="min-w-100px">Bank</th>
														        </tr>
														    </thead>
														    <tbody id="pledge_info">
														        
														    </tbody>
														</table>
													</div>
													<div class="row">
														<!--begin::Label-->
														<label class="col-lg-1 col-form-label fw-bold fs-6">Party</label>
														<!--end::Label-->
														<!--begin::Col-->
														<!-- <div class="col-lg-2">
															
															<div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url('assets/media/svg/avatars/blank.svg')">
																
																<div class="image-input-wrapper w-125px h-125px" style="background-image: url(assets/images/sample.jpg)"></div>
																
																<span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" data-kt-initialized="1">
																	<i class="bi bi-x fs-2"></i>
																</span>
																
															</div>
															
														</div> -->
														<div class="col-lg-2 fv-row">
															<!--begin::Image input-->
															<div class="image-input image-input-outline" data-kt-image-input="true"
																style="background: #c6c6c6 !important;box-shadow: 8px #c6c6c6;  border: 1px solid;box-shadow: 1px 1px #888888;"
															>
																<!--begin::Preview existing avatar-->
																<div class="image-input-wrapper">
																	<div id="party_photo" class="image-input image-input-outline" data-kt-image-input="true">

																	</div>

																</div>
																<!--end::Preview existing avatar-->
																<!--begin::Label-->
																<label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" data-kt-initialized="1">
																	<i class="bi bi-pencil-fill fs-10"></i>
																	<!--begin::Inputs-->
																	<input type="text" name="add_party_new_loan" accept=".png, .jpg, .jpeg">
																	<input type="hidden" name="add_party_remove_new_loan">
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
																
															</div>
															
														</div>
														<!--end::Col-->
														<!--begin::Label-->
														<label class="col-lg-1 col-form-label fw-bold fs-6">Jewel</label>
														<!--end::Label-->
														<!--begin::Col-->
														<!-- <div class="col-lg-2">
															
															<div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url('assets/media/svg/avatars/blank.svg')">
																
																<div class="image-input-wrapper w-125px h-125px" style="background-image: url(assets/images/sample_jewel.jpg)"></div>
															
																<span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" data-kt-initialized="1">
																	<i class="bi bi-x fs-2"></i>
																</span>
																
															</div>
															
														</div> -->
														<div class="col-lg-2 fv-row">
															<!--begin::Image input-->
															<div class="image-input image-input-outline" data-kt-image-input="true"
																style="background: #c6c6c6 !important;box-shadow: 8px #c6c6c6;  border: 1px solid;box-shadow: 1px 1px #888888;"
															>
																<!--begin::Preview existing avatar-->
																<div class="image-input-wrapper">
																	<div id="jewel_photo" class="image-input image-input-outline" data-kt-image-input="true">

																	</div>

																</div>
																<!--end::Preview existing avatar-->
																<!--begin::Label-->
																<label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" data-kt-initialized="1">
																	<i class="bi bi-pencil-fill fs-10"></i>
																	<!--begin::Inputs-->
																	<input type="text" name="add_party_new_loan" accept=".png, .jpg, .jpeg">
																	<input type="hidden" name="add_party_remove_new_loan">
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
																
															</div>
															
														</div>
														<!--begin::Label-->
														<label class="col-lg-1 col-form-label fw-bold fs-6">Others</label>
														<!--end::Label-->
														<!--begin::Col-->
														<!-- <div class="col-lg-2">
															
															<div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url('')">
																
																<div class="image-input-wrapper w-125px h-125px" style="background-image: url()"></div>
																
																<span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" data-kt-initialized="1">
																	<i class="bi bi-x fs-2"></i>
																</span>
																
															</div>
															
														</div> -->
														<div class="col-lg-2 fv-row">
															<!--begin::Image input-->
															<div class="image-input image-input-outline" data-kt-image-input="true"
																style="background: #c6c6c6 !important;box-shadow: 8px #c6c6c6;  border: 1px solid;box-shadow: 1px 1px #888888;"
															>
																<!--begin::Preview existing avatar-->
																<div class="image-input-wrapper">
																	<div id="others_photo" class="image-input image-input-outline" data-kt-image-input="true">

																	</div>

																</div>
																<!--end::Preview existing avatar-->
																<!--begin::Label-->
																<label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" data-kt-initialized="1">
																	<i class="bi bi-pencil-fill fs-10"></i>
																	<!--begin::Inputs-->
																	<input type="text" name="add_party_new_loan" accept=".png, .jpg, .jpeg">
																	<input type="hidden" name="add_party_remove_new_loan">
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
																
															</div>
															
														</div>
														<!--end::Col-->
														<!--begin::Label-->
														<label class="col-lg-1 col-form-label fw-bold fs-6">Document</label>
														<!--end::Label-->
														<!--begin::Col-->
														<!-- <div class="col-lg-2">
															
															<div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url('')">
																
																<div class="image-input-wrapper w-125px h-125px" style="background-image: url()"></div>
																
																<span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" data-kt-initialized="1">
																	<i class="bi bi-x fs-2"></i>
																</span>
																
															</div>
															
														</div> -->
														<div class="col-lg-2 fv-row">
															<!--begin::Image input-->
															<div class="image-input image-input-outline" data-kt-image-input="true"
																style="background: #c6c6c6 !important;box-shadow: 8px #c6c6c6;  border: 1px solid;box-shadow: 1px 1px #888888;"
															>
																<!--begin::Preview existing avatar-->
																<div class="image-input-wrapper">
																	<div id="doc_photo" class="image-input image-input-outline" data-kt-image-input="true">

																	</div>

																</div>
																<!--end::Preview existing avatar-->
																<!--begin::Label-->
																<label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" data-kt-initialized="1">
																	<i class="bi bi-pencil-fill fs-10"></i>
																	<!--begin::Inputs-->
																	<input type="text" name="add_party_new_loan" accept=".png, .jpg, .jpeg">
																	<input type="hidden" name="add_party_remove_new_loan">
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
																
															</div>
															
														</div>
													</div><br>
													<div class="card-footer py-8">
														<button class="btn btn-outline btn-outline-solid btn-outline-warning btn-active-light-primary me-2 mb-2" data-bs-dismiss="modal">Loan Entry</button>
														<button class="btn btn-outline btn-outline-solid btn-outline-warning btn-active-light-primary me-2 mb-2" data-bs-dismiss="modal">Loan Summary</button>
														<button class="btn btn-outline btn-outline-solid btn-outline-warning btn-active-light-primary me-2 mb-2" data-bs-dismiss="modal">Pledge View</button>
														<button class="btn btn-outline btn-outline-solid btn-outline-warning btn-active-light-primary me-2 mb-2" data-bs-dismiss="modal">Party History</button>
														<button class="btn btn-outline btn-outline-solid btn-outline-warning btn-active-light-primary me-2 mb-2" data-bs-dismiss="modal">Redemption</button>
													</div>
													<div class="row">
														<div class="col-lg-8"></div>
														<div class="col-lg-4">
															<div class="row">
																<div class="col-lg-3"></div>
																<div class="col-lg-3 d-flex flex-center">
																	<button type="reset" class="btn btn-secondary me-3" data-bs-dismiss="modal">Cancel</button>
																</div>
																<div class="col-lg-6 flex-center">
																	<p  class="btn btn-primary" id="jewel_settlement">Save Changes</p>
																</div>
															</div>
														</div>
													</div>
												</div>
												<!--end::Modal body-->					
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
	<!--end::Modal - New Loan-->

	 <!-- Modal -->
  	
	<!--begin::Modal - edit Loan-->
	<div class="modal fade" id="kt_modal_editloan_receipts" tabindex="-1" aria-hidden="true">
		
	</div>
	<!--end::Modal - edit loan-->
	<!--begin::Modal - view loan-->
	<div class="modal fade" id="kt_modal_viewloan_receipts" tabindex="-1" aria-hidden="true">
	
	</div>
	<!--end::Modal - view loan-->
	<!--begin::Modal - deleteloan-->
	<div class="modal fade" id="kt_modal_deleteloan_receipts" tabindex="-1" aria-hidden="true">
		
	</div>

	<div id="confirm" class="modal fade">
		<div class="modal-dialog modal-confirm">
			<div class="modal-content">
				<div class="modal-header d-flex  w-100">
					<!-- <div class="icon-box">
						<i class="material-icons">&#xE5CD;</i>
					</div>		 -->				
					<h4 class="modal-title w-80">Are you sure?</h4>	
	                <p style="border:1px solid #c6c6c6;padding:5px;cursor: pointer;" class="close w-20"  aria-hidden="true" id="con1_close">&times;</p>
				</div>
				<div class="modal-body">
					<p>Do you want's to confirm?.Processing next step</p>
				</div>
				<div class="modal-footer justify-content-center">
					<p type="button" class="btn btn-secondary"  id="con_close">Cancel</p>
					<button type="button" class="btn btn-danger" id="con_submit">Proceed</button>
				</div>
				

				
			</div>
		</div>
	</div>  
	<!--end::Modal - delete loan-->
	<input type="hidden" id="base_url" value="<?php echo base_url();?>">
	<?php $this->load->view("script");?>
	<script>

		$('#con_close').click(function () {
			$('#confirm').modal('hide');
		});
		$('#con1_close').click(function () {
			$('#confirm').modal('hide');
		});

		$('#con_submit').click(function () {
			var bill_no = $('#bill_no').val();
			var base_url = $('#base_url').val();
			
			var closed_by = $('#select_closed').val();
			var closed_name = $('#party_name_list').val();
			var issued_to = $('#select_issue').val();
			var issued_name = $('#issue_by').val();
			

			$.ajax({
				type: "POST",
				url: base_url+'jewelSettlement/jewelsettelement_save',
				
				data: "bill_no="+bill_no+"&closed_by="+closed_by+"&closed_name="+closed_name+"&issued_to="+issued_to+"&issued_name="+issued_name,
				
				success: function(response)
				{
					
					$('#confirm').modal('hide');

					location.reload();
				}
			});
			
			
			
		});
		


		var name = "";
		var nominee = "";
		
		function validate_bill_no(e){

			// let el = document.querySelector("input[name='test']")

			// el.addEventListener('input', (e)=>{
			//  console.log(e.keyCode)
			// })


			var key_code = e.keyCode;
			var bill_no = e.target.value.trim();

			if(key_code != 13){

				var base_url = $('#base_url').val();

				$.ajax({
					type: "POST",
					url: base_url+'jewelSettlement/autocomplete',
					async: false,
					data: "bill_no="+bill_no,
					dataType: "html",
					success: function(response)
					{
						$('#datalist').html(response);	
					}
				});

				

			}else{
				save_jewel(1);
				var base_url = $('#base_url').val();

				$.ajax({
					type: "POST",
					url: base_url+'jewelSettlement/get_loan_details',
					async: false,
					data: "bill_no="+bill_no,
					dataType: "html",
					success: function(response)
					{
						if(response == 0){
							alert("please enter valid bill no");
							// $("#myModal").modal("show");

							$('#party_name').html("");
							$('#party_address').html("");
							$('#cus_transfer').html("");
							$('#loan_date').html("");
							$('#interest').html("");
							$('#loan_amount').html("");
							$('#weight').html("");
							$('#period').html("");
							$('#close_date').html("");
							$('#party_name_list').val("");
							$('#issue_by').val('');
							$('#bill_no_2').val('');


							$('#party_photo').html('');
							$('#jewel_photo').html('');
							$('#bill_no_2').html();
							$('#bill_no_2').html();

							$('#pledge_info').html('');
							//alert(response.loans['BILLNO']);
							

							// console.log(data.loan['ACTIVE']);
						}else{

							var data = $.parseJSON(response);
							var loan = data.loan;
							var party = data.part_details;
							var pledge = data.pledge_items;
							var payment = data.payment_details;

							name    = party['NAME'];
							nominee = loan['NOMINEE'];
							

							$('#party_name').html(party['NAME']);
							$('#party_address').html(party['ADDRESS1']+party['ADDRESS2']);
							$('#cus_transfer').html(loan['CLOSING_STATUS']);

							$('#loan_date').html(": "+loan['ENDATE']);
							$('#interest').html(": "+loan['INTEREST']);
							$('#loan_amount').html(": "+loan['AMOUNT']);
							$('#weight').html(": "+loan['WEIGHT']);
							$('#period').html(": "+loan['MONTHS']);
							$('#close_date').html(": "+loan['CLOSEDATE']);
							$('#party_name_list').val(party['NAME']);
							$('#issue_by').val(party['NAME']);
							$('#bill_no_2').val(loan['BILLNO']);


							if(payment){
								$('#months').val(data.months);
								$('#days').val(data.days);
								$('#total_pay').val(payment['TOTALPAY']);
								$('#other_charge').val(payment['NOTICECHARGE']);
								$('#discount').val(payment['DISCOUNT']);
								$('#received').val(payment['PAIDAMOUNT']);
								$('#net_pay').val(payment['NETPAYABLE']);
								$('#balance').val(payment['BALANCE']);
							}else{
								$('#months').val('');
								$('#days').val('');
								$('#total_pay').val('');
								$('#other_charge').val('');
								$('#discount').val('');
								$('#received').val('');
								$('#net_pay').val('');
								$('#balance').val('');
							}


							$('#party_photo').html('<img src="'+data.party_photo+' " height="115px" width="115px" >');
							$('#jewel_photo').html('<img src="'+data.jewel_photo+' " height="115px" width="115px" >');
							$('#bill_no_2').html();
							$('#bill_no_2').html();

							$('#pledge_info').html(pledge);

						}	
					}
				});
				
			}
		
			return false;

		}

		
		$('#select_issue').on('change', function() {

		  	var val = this.value;
		  	if(val == 'PARTY'){

		  		$('#issue_by').val(name)

		  	}else if(val == "NOMINEE"){
		  		$('#issue_by').val(nominee)
		  	}else if(val == 'OTHER'){
		  		$('#issue_by').val('')
		  	}


		});


		function save_jewel(a=2){
			
			var err =0;
			if(a == 1){
				err = 1;
			}else if(a == 2){
				

				if($('#bill_no').val() == ""){

					alert('please enter your bill no');
					$('#bill_no').focus();
					
				}


				err = 1;

			}else if(a == 3){
				err =0;
			}


			if(err > 0){return false;}else{return true};

					


		}

		$('#jewel_settlement').click(function(){

			if($('#bill_no').val() == ""){

				alert('please enter your bill no');
				$('#bill_no').focus();
					
			}else{
				$('#confirm').modal('show');
			}
			
		})

		
		
	</script>

</body>
<!--end::Body-->
</html>