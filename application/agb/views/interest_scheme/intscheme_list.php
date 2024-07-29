<?php $this->load->view("common"); ?>
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
				<?php $this->load->view("sidebar"); ?>
				<!--begin::Wrapper-->
				<div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
				<?php $this->load->view("header"); ?>
				<!--begin::Toolbar-->
					<div class="toolbar py-2" id="kt_toolbar">
						<!--begin::Container-->
						<div id="kt_toolbar_container" class="container-fluid d-flex align-items-center">
							<!--begin::Page title-->
							<div class="flex-grow-1 flex-shrink-0 me-5">
								<!--begin::Page title-->
								<div data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
									<!--begin::Title-->
									<h1 class="d-flex align-items-center text-dark fw-bold my-1 fs-3">Interest Scheme List
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
				                        <div class="alert alert-success alert-dismissible" style="display:none;" id="active" role="alert">
				                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
				                            </button>
				                            Interest Scheme has been activated successfully
				                        </div>
				                        <div class="alert alert-danger alert-dismissible" style="display:none;" id="deactive" role="alert">
				                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
				                            </button>
				                            Interest Scheme has been deactivated successfully
				                        </div>
				                        <form method="POST" action="<?php echo base_url(); ?>interestscheme" enctype="multipart/form-data"> 
											<div class="row" style="padding: 1rem 1rem 0rem 1rem !important;">
												<label class="form-label">Status</label>
												<div class="col-lg-2 fv-row d-flex">
													<select class="form-select form-select-solid cdrop" data-control="select2" data-hide-search="true" name="status" id="status">
														<option value="">All</option>
														<option value="Y" <?php if("Y"==$sts_list){echo "selected";}else{echo "";}?>>Active</option>
														<option value="N" <?php if("N"==$sts_list){echo "selected";}else{echo "";}?>>In Active</option>
													</select>
												</div>
												<div class="col-lg-1">
													<!--begin::Add user-->
													<button type="submit" class="btn btn-sm btn-outline btn-outline-solid btn-outline-warning btn-active-light-primary">Go</button>
													<!--end::Add user-->
												</div>
												<div class="col-lg-7"></div>
												<!--begin::Toolbar-->
												<div class="col-lg-2 d-flex justify-content-end" data-kt-user-table-toolbar="base">
													<button type="button" class="btn btn-primary"  data-bs-toggle="modal" data-bs-target="#kt_modal_newscheme">
													<span class="svg-icon svg-icon-2">
														<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
															<rect opacity="0.5" x="11.364" y="20.364" width="16" height="2" rx="1" transform="rotate(-90 11.364 20.364)" fill="currentColor" />
															<rect x="4.36396" y="11.364" width="16" height="2" rx="1" fill="currentColor" />
														</svg>
													</span>New Scheme</button>
												</div>
												<!--end::Toolbar-->
											</div>
											<!-- <input type="hidden" id="edit_intid" name="edit_intid" value="<?php echo $interestscheme_edit_details->INTID;?>"> -->
										</form>
								<!--begin::Card body-->
								<div class="card-body py-4">
									<!--begin::Table-->
									<table class="table align-middle table-row-dashed table-striped table-hover fs-7 gy-1 gs-2" id="kt_datatable_dom_positioning">
										<!--begin::Table head-->
										<thead>
											<!--begin::Table row-->
											<tr class="text-start text-muted fw-bold fs-7 gs-0">
												<th class="min-w-25px cy">Company Name</th>
												<th class="min-w-25px">Sch Name</th>
												<th class="min-w-25px">Interest%</th>
												<th class="min-w-25px">Group Name</th>
												<th class="min-w-25px">Loan Type</th>
												<th class="min-w-25px">Ln Prd</th>
												<th class="min-w-25px">LP Type</th>
												<th class="min-w-25px">Mx Prd</th>
												<th class="min-w-25px">MP Type</th>
												<th class="min-w-25px" style="width: 5%;">Status</th>
												<th class="min-w-25px" style="width: 13%;"><span class="text-end">Actions</span></th>
											</tr>
											<!--end::Table row-->
										</thead>
										<!--end::Table head-->
										<!--begin::Table body-->
										<tbody class="text-gray-600 fw-semibold">
											<!--begin::Table row-->
											<?php $i=1; foreach($intscheme_list as $intsch_list){?>
											<tr>
												<td><?php echo $intsch_list['COMPANYNAME'];?></td>
												<td><?php echo $intsch_list['INTNAME'];?></td>
												<td><?php echo $intsch_list['INTEREST'];?></td>
												<td><?php echo $intsch_list['INT_GROUP'];?></td>
												<td><?php echo $intsch_list['LOAN_TYPE'];?></td>
												<td><?php echo $intsch_list['PERIOD'];?></td>
												<td><?php echo $intsch_list['LP_TYPE'];?></td>
												<td><?php echo $intsch_list['MAXPERIOD'];?></td>
												<td><?php echo $intsch_list['MP_TYPE'];?></td>
												<td>
													<label class="form-check form-switch form-check-custom form-check-solid">
															<!-- <input class="form-check-input" type="checkbox" value="1" checked="checked"> -->
															<input class="form-check-input w-35px h-20px" type="checkbox" <?php if($intsch_list['ACTIVE']=="Y"){echo "checked";} ?> id="activeunactive_<?php echo $i;?>"  name="activeunactive_<?php echo $i;?>" onchange="activeunactive(<?php echo $intsch_list['INTID']; ?>,<?php echo $i; ?>)" value="<?php echo $intsch_list['ACTIVE'];?>">
													</label>
												</td>
												<!--begin::Action=-->
												<td>
													<span class="text-end">
														<a href="#" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm" data-bs-toggle="modal" data-bs-target="#kt_modal_viewscheme" onclick="intsch_view('<?php echo $intsch_list['INTID'];?>')">
														<i class="bi bi-eye-fill eyc"></i>
													</a>
													<a href="#" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1" data-bs-toggle="modal" data-bs-target="#kt_modal_editscheme" onclick="intsch_edit('<?php echo $intsch_list['INTID'];?>')">
																		<!--begin::Svg Icon | path: icons/duotune/art/art005.svg-->
																		<span class="svg-icon svg-icon-3">
																			<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																				<path opacity="0.3" d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z" fill="currentColor"></path>
																				<path d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z" fill="currentColor"></path>
																			</svg>
																		</span>
																		<!--end::Svg Icon-->
																	</a>
													<a href="#" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm" data-bs-toggle="modal" data-bs-target="#kt_modal_delete_interestscheme" onclick="intsch_delete('<?php echo $intsch_list['INTID'];?>')">
																		<!--begin::Svg Icon | path: icons/duotune/general/gen027.svg-->
																		<span class="svg-icon svg-icon-3">
																			<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																				<path d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z" fill="currentColor"></path>
																				<path opacity="0.5" d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z" fill="currentColor"></path>
																				<path opacity="0.5" d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z" fill="currentColor"></path>
																			</svg>
																		</span>
																		<!--end::Svg Icon-->
																	</a></span>
												</td>
												<!--end::Action=-->
											</tr>
											<?php $i++;}?>
											<!--end::Table row-->
										</tbody>
										<!--end::Table body-->
									</table>
									<!--end::Table-->
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
		<!--begin::Modal-New Scheme-->
		<div class="modal fade" id="kt_modal_newscheme" tabindex="-1" aria-hidden="true">
			<!-- <form id="kt_add_intscheme_list_form" class="form"> -->
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
									<h1 class="mb-3">New Scheme</h1>
								</div>
								<!--end::Heading-->
								<form name="intscheme_add_form" class="form" id="intscheme_add_form" method="POST" action="<?php echo base_url(); ?>interestscheme/interestscheme_save" enctype="multipart/form-data" onsubmit="return interest_scheme_validation();"> 
									<div class="row">
										<div class="col-lg-6">
											<div style="padding:10px 10px 10px 10px !important;box-shadow: 0 3px 6px #00002947; border-radius: 5px; background-color: #f5f5f1 !important;">
												<div class="row">
													<label class="col-lg-4 col-form-label required fw-semibold fs-6" >Company</label>
													<div class="col-lg-8 fv-row">
														<select class="form-select form-select-solid cdrop" data-control="select2" data-hide-search="true" id="add_sl_company_int_scheme" name="add_sl_company_int_scheme">
															<option value="">Select Company</option>
															<?php
																foreach($company_list as $comlist)
																{
															?>
																<option value="<?php echo $comlist['COMPANYCODE']; ?>"> <?php echo $comlist['COMPANYNAME'];?></option>
															<?php 
																}
															?>
														</select>
														<div class="fv-plugins-message-container invalid-feedback" id="company_err"></div>
													</div>
												</div>
												<div class="row">
													<label class="col-lg-4 col-form-label required fw-semibold fs-6">Scheme Name</label>
													<div class="col-lg-8 fv-row fv-plugins-icon-container">
														<input type="text" id="scheme_name_add_err_tbox" name="add_sname_int_scheme" class="form-control form-control-lg form-control-solid" placeholder="Scheme Name" onkeyup="scheme_name_unique(this.value);" oninput="this.value = this.value.replace(/[^A-Za-z0-9.-]/g, '').replace(/(\..*)\./g, '$1');">
														<div class="fv-plugins-message-container invalid-feedback" id="scheme_name_err"></div>
													</div>
												</div>
												<div class="row">
													<label class="col-lg-4 col-form-label required fw-semibold fs-6" >Group</label>
													<div class="col-lg-8 fv-row">
														<select class="form-select form-select-solid cdrop" data-control="select2" data-hide-search="true" id="add_sl_group_int_scheme" name="add_sl_group_int_scheme">
															<option value="">Select Group</option>
															<?php
																foreach($group_list as $grplist)
																{
															?>
																<option value="<?php echo $grplist['INT_GROUP']; ?>"> <?php echo $grplist['INT_GROUP'];?></option>
															<?php 
																}
															?>
														</select>
														<div class="fv-plugins-message-container invalid-feedback" id="group_name_err"></div>
													</div>
												</div>
												<div class="row">
													<div class="col-lg-5 fv-row fv-plugins-icon-container fv-plugins-bootstrap5-row-invalid">
														<div class="d-flex align-items-center">
															<label class="form-check form-check-inline form-check-solid me-5 is-invalid">
																<input class="form-check-input" name="communication[]" type="checkbox" value="1" onclick="add_default_loan_type()" id="add_de_ln_ty">
															</label>
															<span class="col-form-label fw-semibold fs-6">Default Loan Type</span>
														</div>
														<div class="fv-plugins-message-container invalid-feedback" id="loan_ty_err"></div>
													</div>
													<div class="col-lg-7 fv-row" id="add_default_loan_type_tbox" style="display: none;">
														<select class="form-select form-select-solid cdrop" data-control="select2" data-hide-search="true" id="loan_type_err_tbox" name="add_sl_def_ln_ty_int_scheme">
															<option value="">Select Default Loan Type</option>
															<option value="New">New</option>
															<option value="Renewal">Renewal</option>
															<option value="Auctioned">Auctioned</option>
														</select>
														<div class="fv-plugins-message-container invalid-feedback" id="loan_type_err"></div>
													</div>
												</div>
											</div>
										</div>
										<div class="col-lg-6">
											<div style="padding:10px 10px 10px 10px !important;box-shadow: 0 3px 6px #00002947; border-radius: 5px; background-color: #f5f5f1 !important;">
												<div class="row">
													<label class="col-lg-4 col-form-label required fw-semibold fs-6">Interest %</label>
													<div class="col-lg-8 fv-row fv-plugins-icon-container">
														<input type="text" name="add_interest_int_scheme" id="add_interest_int_scheme" class="form-control form-control-lg form-control-solid" placeholder="Interest %" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
														<div class="fv-plugins-message-container invalid-feedback" id="interest_err"></div>
													</div>
												</div>
												<div class="row">
													<label class="col-lg-4 col-form-label required fw-semibold fs-6">Loan Period</label>
													<div class="col-lg-3 fv-row fv-plugins-icon-container">
														<input type="text" name="add_ln_period_int_scheme" id="add_ln_period_int_scheme" class="form-control form-control-solid" placeholder="" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">
														<div class="fv-plugins-message-container invalid-feedback" id="loan_period_err"></div>
													</div>
													<div class="col-lg-5 fv-row">
														<select class="form-select form-select-solid cdrop" data-control="select2" id="add_lp_type_int_scheme" name="add_lp_type_int_scheme" data-hide-search="true">
															<option value="">Select Period Type</option>
															<option value="Months">Month</option>
															<option value="Days">Days</option>
														</select>
														<div class="fv-plugins-message-container invalid-feedback" id="loan_period_type_err"></div>
													</div>
												</div>
												<div class="row">
													<label class="col-lg-4 col-form-label required fw-semibold fs-6">Max Period</label>
													<div class="col-lg-3 fv-row fv-plugins-icon-container">
														<input type="text" name="add_mx_period_int_scheme" id="add_mx_period_int_scheme" class="form-control form-control-solid" placeholder="" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">
														<div class="fv-plugins-message-container invalid-feedback" id="max_period_err"></div>
													</div>
													<div class="col-lg-5 fv-row">
														<select class="form-select form-select-solid cdrop" data-control="select2" id="add_mp_type_int_scheme" name="add_mp_type_int_scheme" data-hide-search="true">
															<option value="">Select Period Type</option>
															<option value="Months">Month</option>
															<option value="Days">Days</option>
														</select>
														<div class="fv-plugins-message-container invalid-feedback" id="max_period_type_err"></div>
													</div>
												</div>
											</div>
										</div>
									</div>	
									<div class="row">
										<div class="col-lg-9"></div>
										<div class="col-lg-1">
											<div class="d-flex flex-center flex-row-fluid pt-12">
												<button type="reset" class="btn btn-secondary me-3" data-bs-dismiss="modal">Cancel</button>
											</div>
										</div>
										<div class="col-lg-2">
											<div class="d-flex flex-center flex-row-fluid pt-12">
												<button type="submit" class="btn btn-primary" id="save_changes_add_int_scheme">Save Changes</button>
											</div>
											<!-- <div class="d-flex flex-center flex-row-fluid pt-12">
												<button type="submit" class="btn btn-primary" id="save_changes_add_int_scheme" onclick="window.location.href='<?php echo base_url(); ?>interestscheme/interestscheme_save'">Save Changes</button>
											</div> -->
										</div>
									</div>
									<!--end::Actions-->
								</form>
							</div>
							<!--end::Modal body-->
					</div>
					<!--end::Modal content-->
				</div>
				<!--end::Modal dialog-->
			<!-- </form> -->
		</div>
		<!--end::Modal - New Scheme-->
		<!--begin::Modal-Edit Scheme-->
		<div class="modal fade" id="kt_modal_editscheme" tabindex="-1" aria-hidden="true">

		</div>
		<!--end::Modal - Edit Scheme-->

		<!--begin::Modal-view Scheme-->
		<div class="modal fade" id="kt_modal_viewscheme" tabindex="-1" aria-hidden="true">

		</div>
		<!--end::Modal - view Scheme-->

		<!--begin::Modal - delete interestscheme-->
		<div class="modal fade" id="kt_modal_delete_interestscheme" tabindex="-1" aria-hidden="true">

		</div>
		<!--end::Modal - delete interestscheme-->
		<input type="hidden" id="baseurl" value="<?php echo base_url(); ?>">
		<?php $this->load->view("script");?>
		<!-- <script>
			function save_button()
			{
				alert("save_button");
				var baseurl= $("#baseurl").val();
				//var value_1 = "id="+val;
				var value_2 = "add_sl_company_int_scheme";
				var value_3 = "add_sname_int_scheme";
				var value_4 = "add_sl_group_int_scheme";
				var value_5 = "add_sl_def_ln_ty_int_scheme";
				var value_6 = "add_interest_int_scheme";
				var value_7 = "add_ln_period_int_scheme";
				var value_8 = "add_lp_type_int_scheme";
				var value_9 = "add_mx_period_int_scheme";
				var value_10 = "add_mp_type_int_scheme";
				$.ajax({
					alert("ajax");
				type: "POST",
				url: baseurl+'interestscheme/interestscheme_save',
				
				
				data: { data_1: value_1, data_2: value_2, data_3: value_3,data_4: value_4, data_5: value_5,data_6: value_6,data_7: value_7,data_8: value_8,data_9: value_9,data_10: value_10},
				// data: "id="+val,
				// data: "add_sl_company_int_scheme",
				// data: "add_sname_int_scheme",
				// data: "add_sl_group_int_scheme",
				// data: "add_sl_def_ln_ty_int_scheme",
				// data: "add_interest_int_scheme",
				// data: "add_ln_period_int_scheme",
				// data: "add_lp_type_int_scheme",
				// data: "add_mx_period_int_scheme",
				// data: "add_mp_type_int_scheme",
				dataType: "html",
				success: function(response)
				{
					window.location = baseurl+"interestscheme/interestscheme_save";
				// $('#kt_modal_editscheme').empty().append(response);
				// $('#kt_modal_editscheme').addClass('show');
				//$("#kt_modal_editdept").css("display", "block");
				}
				});
				//window.location.href='<?php echo base_url(); ?>interestscheme/interestscheme_save';
			}
		</script> -->
		<script>
			var title = $('title').text() + ' | ' + 'Interest Scheme';
    		$(document).attr("title", title);

			function intsch_edit(val){
			var baseurl= $("#baseurl").val();
			//alert(val);
			$.ajax({
			type: "POST",
			url: baseurl+'interestscheme/intscheme_edit',
			async: false,
			type: "POST",
			data: "id="+val,
			dataType: "html",
			success: function(response)
			{
			$('#kt_modal_editscheme').empty().append(response);
			$('#kt_modal_editscheme').addClass('show');
			//$("#kt_modal_editdept").css("display", "block");
			}
			});

			 	//check box field edit 
				var edit_default_loan_type_tbox = document.getElementById("edit_default_loan_type_tbox");
				if ($('#loan_type_edit_err_tbox').val()!=='') 
				{
					//alert("if");
					$( "#edit_de_ln_ty" ).prop( "checked", true );
					edit_default_loan_type_tbox.style.display = "block";
				}
				else
				{
					//alert("else");
					$( "#edit_de_ln_ty" ).prop( "checked", false );
					edit_default_loan_type_tbox.style.display = "none";
				}


			}

			function intsch_view(val){
			var baseurl= $("#baseurl").val();
			//alert(val);
			$.ajax({
			type: "POST",
			url: baseurl+'interestscheme/intscheme_view',
			async: false,
			type: "POST",
			data: "id="+val,
			dataType: "html",
			success: function(response)
			{
			$('#kt_modal_viewscheme').empty().append(response);
			$('#kt_modal_viewscheme').addClass('show');
			//$("#kt_modal_editdept").css("display", "block");
			}
			});

			//check box field view
				var view_default_loan_type_tbox = document.getElementById("view_default_loan_type_tbox");
				if ($('#view_sl_def_ln_ty_int_scheme').val()!=='') 
				{
					//alert("if");
					$( "#view_de_ln_ty" ).prop( "checked", true );
					view_default_loan_type_tbox.style.display = "block";
				}
				else
				{
					//alert("else");
					$( "#view_de_ln_ty" ).prop( "checked", false );
					view_default_loan_type_tbox.style.display = "none";
				}
			}

			function closeEditModal()
			{
				var baseurl= $("#baseurl").val();
				$('#kt_modal_editscheme').removeClass('show');
				//$("#kt_modal_update_role").css("display", "none");
				$('.modal-backdrop').removeClass('show');
				window.location.href = baseurl+'interestscheme';
			}
			function closeViewModal()
			{
				var baseurl= $("#baseurl").val();
				$('#kt_modal_viewscheme').removeClass('show');
				//$("#kt_modal_update_role").css("display", "none");
				$('.modal-backdrop').removeClass('show');
				window.location.href = baseurl+'interestscheme';
			}		


			function activeunactive(val,ival) {
				var unactive;
				var unactv;
				var baseurl= $("#baseurl").val();
				var a = $("#activeunactive_"+ival).val();
				if(a=="N") {
					unactive="Y";
					unactv="Active"
				}
				else{
					unactive="N";
					unactv="In-Active"
				}
				var datastring="id="+val+"&status="+unactive;
				$.ajax({
					type:"POST",
					url:baseurl+'interestscheme/intsch_active',
					data:datastring,
					cache: false,
					dataType: "html",
					success: function(result){
						// alert(result+unactive);
						if(a == "N"){
				            $("#active").css('display','block');
							$("#active").addClass('response');
				        }else{
				            $("#deactive").css('display','block');
							$("#deactive").addClass('response');
				        }      
			            setTimeout(function() {
				         window.location = baseurl+"interestscheme";
				        }, 1000);
					},
					error: function (error) {
						alert('error; ' + eval(error));
						setTimeout(function() {
				         window.location = baseurl+"interestscheme";
				        }, 1000);
					}
				});
			}

			function intsch_delete(val)
			{
				var baseurl= $("#baseurl").val();
				//alert(val);
				$.ajax({
				type: "POST",
				url: baseurl+'interestscheme/interestscheme_delete',
				async: false,
				type: "POST",
				data: "id="+val,
				dataType: "html",
				success: function(response)
				{
				$('#kt_modal_delete_interestscheme').empty().append(response);
				$('#kt_modal_delete_interestscheme').addClass('show');
				}
				});
			}

			function removeinterestscheme(val)
			{ 
			var baseurl= $("#baseurl").val();
			$.ajax({
			type: "POST",
			url: baseurl+'interestscheme/delete',
			async: false,
			data:"field="+val,
			success: function(response)
			{
			window.location.href = baseurl+'interestscheme';
			}
			});
			}

			function closeDeleteModal()
			{
				var baseurl= $("#baseurl").val();
				$('#kt_modal_delete_interestscheme').removeClass('show');
				$('.modal-backdrop').removeClass('show');
				window.location.href = baseurl+'interestscheme';
			}

			//Scheme Name Unique validation
			var berr=0;
			function scheme_name_unique(val)
			{
				var baseurl= $("#baseurl").val();
				$.ajax({
					type:"POST",
					url:baseurl+'interestscheme/scheme_name_unique',
					data:{'value':val},
					cache: false,
					dataType: "html",
						success: function(result){
						if(result>0)
						{
							$('#scheme_name_err').html('Scheme Name already exist!');
							berr=1;
						}
						else
						{
							$('#scheme_name_err').html('');
							berr=0;
						}
					}
				});
			}

			function interest_scheme_validation()
			{
				var err = 0;
				//Company Field
				var add_sl_company_int_scheme = $('#add_sl_company_int_scheme').val();
			    if(add_sl_company_int_scheme.trim()==''){
			        $('#company_err').html('Please Select a Company!');
			        err++;
			    }else{
			        if(berr>0)
					{
						$('#company_err').html('Company already exist!');
						err++;
					}
					else
					{
						$('#company_err').html('');
					}
			    }

			    //Scheme Name Field
				var scheme_name_add_err_tbox = $('#scheme_name_add_err_tbox').val();
			    if(scheme_name_add_err_tbox.trim()==''){
			        $('#scheme_name_err').html('Enter Scheme Name!');
			        err++;
			    }else{
			        if(berr>0)
					{
						$('#scheme_name_err').html('Scheme Name already exist!');
						err++;
					}
					else
					{
						$('#scheme_name_err').html('');
					}
			    }

			    //Group Name Field
			    var add_sl_group_int_scheme = $('#add_sl_group_int_scheme').val();
			    if(add_sl_group_int_scheme.trim()==''){
			        $('#group_name_err').html('Please Select a Group!');
			        err++;
			    }else{
			        if(berr>0)
					{
						$('#group_name_err').html('Group already exist!');
						err++;
					}
					else
					{
						$('#group_name_err').html('');
					}
			    }

			    //Default Loan Type Field
			    var loan_type_err_tbox = $('#loan_type_err_tbox').val();
			    var add_de_ln_ty = document.getElementById("add_de_ln_ty");
			    if (add_de_ln_ty.checked == true)
				{
					if(loan_type_err_tbox.trim()=='')
					{
			        $('#loan_type_err').html('Please Select a Default Loan Type!');
			        err++;
			    	}
			    	else
			    	{
				        if(berr>0)
						{
							$('#loan_type_err').html('Default Loan Type already exist!');
							err++;
						}
						else
						{
							$('#loan_type_err').html('');
						}
				    }
				}
				else
				{
					$('#loan_type_err').html('');
				}
			    

			     //Interest Field
				var add_interest_int_scheme = $('#add_interest_int_scheme').val();
			    if(add_interest_int_scheme.trim()==''){
			        $('#interest_err').html('Enter Interest!');
			        err++;
			    }else{
			        if(berr>0)
					{
						$('#interest_err').html('Interest already exist!');
						err++;
					}
					else
					{
						$('#interest_err').html('');
					}
			    }

			    //Loan Period Field
				var add_ln_period_int_scheme = $('#add_ln_period_int_scheme').val();
			    if(add_ln_period_int_scheme.trim()==''){
			        $('#loan_period_err').html('Enter Loan Period!');
			        err++;
			    }else{
			        if(berr>0)
					{
						$('#loan_period_err').html('Loan Period already exist!');
						err++;
					}
					else
					{
						$('#loan_period_err').html('');
					}
			    }

			    //Select Loan Period Type Field
			    var add_lp_type_int_scheme = $('#add_lp_type_int_scheme').val();
			    if(add_lp_type_int_scheme.trim()==''){
			        $('#loan_period_type_err').html('Please Select a Loan Period Type!');
			        err++;
			    }else{
			        if(berr>0)
					{
						$('#loan_period_type_err').html('Loan Period Type already exist!');
						err++;
					}
					else
					{
						$('#loan_period_type_err').html('');
					}
			    }

			    //Max Period Field
				var add_mx_period_int_scheme = $('#add_mx_period_int_scheme').val();
			    if(add_mx_period_int_scheme.trim()==''){
			        $('#max_period_err').html('Enter Max Period!');
			        err++;
			    }else{
			        if(berr>0)
					{
						$('#max_period_err').html('Max Period already exist!');
						err++;
					}
					else
					{
						$('#max_period_err').html('');
					}
			    }

			    //Select Max Period Type Field
			    var add_mp_type_int_scheme = $('#add_mp_type_int_scheme').val();
			    if(add_mp_type_int_scheme.trim()==''){
			        $('#max_period_type_err').html('Please Select a Max Period Type!');
			        err++;
			    }else{
			        if(berr>0)
					{
						$('#max_period_type_err').html('Max Period Type already exist!');
						err++;
					}
					else
					{
						$('#max_period_type_err').html('');
					}
			    }
			    
			    if(err>0){ return false; }else{ return true; }
			}	



			//Scheme Name Unique edit validation
			var berr1=0;
			function scheme_name_unique_edit(val)
			{
				var baseurl= $("#baseurl").val();
				$.ajax({
					type:"POST",
					url:baseurl+'interestscheme/scheme_name_unique_edit',
					data:{'value':val},
					cache: false,
					dataType: "html",
						success: function(result){
						if(result>0)
						{
							$('#scheme_name_edit_err').html('Scheme Name already exist!');
							berr1=1;
						}
						else
						{
							$('#scheme_name_edit_err').html('');
							berr1=0;
						}
					}
				});
			}


			function interest_scheme_validation_edit()
			{

				var err1 = 0;
				//Company Edit Field
				var company_edit_err_tbox = $('#company_edit_err_tbox').val();
			    if(company_edit_err_tbox.trim()==''){
			        $('#company_edit_err').html('Please Select a Company!');
			        err1++;
			    }else{
			        if(berr1>0)
					{
						$('#company_edit_err').html('Company already exist!');
						err1++;
					}
					else
					{
						$('#company_edit_err').html('');
					}
			    }

			    //Scheme Name edit Field
				var scheme_name_edit_err_tbox = $('#scheme_name_edit_err_tbox').val();
			    if(scheme_name_edit_err_tbox.trim()==''){
			        $('#scheme_name_edit_err').html('Enter Scheme Name!');
			        err1++;
			    }else{
			        if(berr1>0)
					{
						$('#scheme_name_edit_err').html('Scheme Name already exist!');
						err1++;
					}
					else
					{
						$('#scheme_name_edit_err').html('');
					}
			    }

			    //Group Name Edit Field
			    var group_name_edit_err_tbox = $('#group_name_edit_err_tbox').val();
			    if(group_name_edit_err_tbox.trim()==''){
			        $('#group_name_edit_err').html('Please Select a Group!');
			        err1++;
			    }else{
			        if(berr1>0)
					{
						$('#group_name_edit_err').html('Group already exist!');
						err1++;
					}
					else
					{
						$('#group_name_edit_err').html('');
					}
			    }

			    //Default Loan Edit Type Field
			    var loan_type_edit_err_tbox = $('#loan_type_edit_err_tbox').val();
			    var edit_de_ln_ty = document.getElementById("edit_de_ln_ty");
			    if (edit_de_ln_ty.checked == true)
				{
					if(loan_type_edit_err_tbox.trim()=='')
					{
			        $('#loan_type_edit_err').html('Please Select a Default Loan Type!');
			        err1++;
			    	}
			    	else
			    	{
				        if(berr1>0)
						{
							$('#loan_type_edit_err').html('Default Loan Type already exist!');
							err1++;
						}
						else
						{
							$('#loan_type_edit_err').html('');
						}
				    }
				}
				else
				{
					$('#loan_type_edit_err').html('');
				}

			     //Interest Edit Field
				var interest_edit_err_tbox = $('#interest_edit_err_tbox').val();
			    if(interest_edit_err_tbox.trim()==''){
			        $('#interest_edit_err').html('Enter Interest!');
			        err1++;
			    }else{
			        if(berr1>0)
					{
						$('#interest_edit_err').html('Interest already exist!');
						err1++;
					}
					else
					{
						$('#interest_edit_err').html('');
					}
			    }

			    //Loan Period Edit Field
				var loan_period_edit_err_tbox = $('#loan_period_edit_err_tbox').val();
			    if(loan_period_edit_err_tbox.trim()==''){
			        $('#loan_period_edit_err').html('Enter Loan Period!');
			        err1++;
			    }else{
			        if(berr1>0)
					{
						$('#loan_period_edit_err').html('Loan Period already exist!');
						err1++;
					}
					else
					{
						$('#loan_period_edit_err').html('');
					}
			    }

			    //Select Loan Period Type Edit Field
			    var loan_period_type_edit_err_tbox = $('#loan_period_type_edit_err_tbox').val();
			    if(loan_period_type_edit_err_tbox.trim()==''){
			        $('#loan_period_type_edit_err').html('Please Select a Loan Period Type!');
			        err1++;
			    }else{
			        if(berr1>0)
					{
						$('#loan_period_type_edit_err').html('Loan Period Type already exist!');
						err1++;
					}
					else
					{
						$('#loan_period_type_edit_err').html('');
					}
			    }

			    //Max Period Edit Field
				var max_period_edit_err_tbox = $('#max_period_edit_err_tbox').val();
			    if(max_period_edit_err_tbox.trim()==''){
			        $('#max_period_edit_err').html('Enter Max Period!');
			        err1++;
			    }else{
			        if(berr1>0)
					{
						$('#max_period_edit_err').html('Max Period already exist!');
						err1++;
					}
					else
					{
						$('#max_period_edit_err').html('');
					}
			    }

			    //Select Max Period Type Edit Field
			    var max_period_type_edit_err_tbox = $('#max_period_type_edit_err_tbox').val();
			    if(max_period_type_edit_err_tbox.trim()==''){
			        $('#max_period_type_edit_err').html('Please Select a Max Period Type!');
			        err1++;
			    }else{
			        if(berr1>0)
					{
						$('#max_period_type_edit_err').html('Max Period Type already exist!');
						err1++;
					}
					else
					{
						$('#max_period_type_edit_err').html('');
					}
			    }
			    
			    if(err1>0){ return false; }else{ return true; }
			}

		</script>
		<!-- <script>
			"use strict";
				var KTAddIntSchemeList = function() {
					var e, t;
					return {
						init: function() {
							(e = document.getElementById("intscheme_add_form")) && (e.querySelector("#save_changes_add_int_scheme"), t = FormValidation.formValidation(e, {
								fields: {
									
									add_sl_company_int_scheme: {
										validators: {
											notEmpty: {
												message: "Please Select a Company"
											}
										}
									},
									add_sname_int_scheme: {
										validators: {
											notEmpty: {
												message: "Scheme Name is Required"
											}
										}
									},
									add_sl_group_int_scheme: {
										validators: {
											notEmpty: {
												message: "Please Select a Group"
											}
										}
									},
									add_mx_period_int_scheme: {
										validators: {
											notEmpty: {
												message: "Max Period is Required"
											}
										}
									},
									add_interest_int_scheme: {
										validators: {
											notEmpty: {
												message: "Interest is Required"
											}
										}
									},
									add_ln_period_int_scheme: {
										validators: {
											notEmpty: {
												message: "Loan Period is Required"
											}
										}
									},
									add_sl_def_ln_ty_int_scheme: {
										validators: {
											notEmpty: {
												message: "Please Select a Default Loan Type"
											}
										}
									}
								},
								plugins: {
									trigger: new FormValidation.plugins.Trigger,
									submitButton: new FormValidation.plugins.SubmitButton,
									bootstrap: new FormValidation.plugins.Bootstrap5({
										rowSelector: ".fv-row",
										eleInvalidClass: "",
										eleValidClass: ""
									})
								}
							}), $(e.querySelector('[name="add_sl_group_int_scheme"]')).on("change", (function() {
								t.revalidateField("add_sl_group_int_scheme")
							})), $(e.querySelector('[name="add_sl_def_ln_ty_int_scheme"]')).on("change", (function() {
								t.revalidateField("add_sl_def_ln_ty_int_scheme")
							})), $(e.querySelector('[name="add_sl_company_int_scheme"]')).on("change", (function() {
								t.revalidateField("add_sl_company_int_scheme")
							})))
						}
					}
				}();
				KTUtil.onDOMContentLoaded((function() {
					KTAddIntSchemeList.init()
				}));
		</script> -->
		<script>
			function add_default_loan_type()
			{
				var add_de_ln_ty = document.getElementById("add_de_ln_ty");
				var add_default_loan_type_tbox = document.getElementById("add_default_loan_type_tbox");

				if (add_de_ln_ty.checked == true)
				{
				    add_default_loan_type_tbox.style.display = "block";
			  	} else 
			  	{
			     	add_default_loan_type_tbox.style.display = "none";
			  	}
			}
		</script>
		<script>
			function edit_default_loan_type()
			{
				var edit_de_ln_ty = document.getElementById("edit_de_ln_ty");
				var edit_default_loan_type_tbox = document.getElementById("edit_default_loan_type_tbox");

				if (edit_de_ln_ty.checked == true)
				{
				    edit_default_loan_type_tbox.style.display = "block";
			  	} else 
			  	{
			     	edit_default_loan_type_tbox.style.display = "none";
			  	}
			}
		</script>
		<script>
			function view_default_loan_type()
			{
				var view_de_ln_ty = document.getElementById("view_de_ln_ty");
				var view_default_loan_type_tbox = document.getElementById("view_default_loan_type_tbox");

				if (view_de_ln_ty.checked == true)
				{
				    view_default_loan_type_tbox.style.display = "block";
			  	} else 
			  	{
			     	view_default_loan_type_tbox.style.display = "none";
			  	}
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
		</script>
	</body>
	<!--end::Body-->
</html>