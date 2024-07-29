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
									<h1 class="d-flex align-items-center text-dark fw-bold my-1 fs-3">Suppliers List
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
				                         <a href="javascript:;" class="close" data-dismiss="alert" aria-label="close">×</a>
				                        <?php echo $this->session->flashdata('g_success'); ?>
				                        </div>
				                        <?php } ?>

				                        <?php if($this->session->flashdata('g_err')){?>
				                        <div class="alert alert-success" id="alertaddmessage">
				                         <a href="javascript:;" class="close" data-dismiss="alert" aria-label="close">×</a>
				                        <?php echo $this->session->flashdata('g_err'); ?>
				                        </div>
				                        <?php } ?>


										<!--begin::Card header-->
										<div class="card-header1 border-0 pt-6">
											<div class="row">
												<div class="col-lg-7">
													
												</div>
												
												<div class="col-lg-5">
													<div class="row" style="float: right !important;">
														<div class="col-lg-auto pt-9">
															<!--begin::Add user-->
															<button type="button" class="btn btn-primary"data-bs-toggle="modal" data-bs-target="#kt_modal_newsuppliers">New Supplier</button>
															<!--end::Add user-->
														</div>
														
													</div>
												</div>
											</div>
											<!--end::Card title-->
										</div>
									<!--end::Card header-->
										<!--begin::Card body-->
										<div class="card-body py-4">
											<!--begin::Table-->
											<table id="kt_datatable_supplier_list" class="table align-middle table-row-dashed table-striped table-hover fs-6 gy-1 gs-2">
													<thead>
													   <tr class="fw-bold fs-7 text-gray-800 px-7">
															<th class="min-w-90px">Name</th>
															<th class="min-w-90px">A/C Group</th>
															<th class="min-w-20px">Phone</th>
															<th class="min-w-30px">Email</th>													
															<th class="min-w-80px" title="Address,City,State">Address</th>
															<th class="min-w-20px">PAN No</th>
															<th class="min-w-30px">GSTIN No</th>
															<th class="min-w-30px">Status</th>
															<th class="min-w-100px"><span class="text-end">Actions</span></th>
												        </tr>
												    </thead>
										<!--begin::Table body-->
											<tbody class="text-gray-600 fw-semibold">
												<?php $i=1; foreach($suppliers_list as $supplierslist){?>
											<!--begin::Table row-->
												<tr>
													<td>

														<?php  echo $supplierslist['LEDGER_NAME']?$supplierslist['LEDGER_NAME']:''; ?>
													</td>
													<td>
														<?php $type = $supplierslist['GROUP_NAME']?$supplierslist['GROUP_NAME']:''; ?>
														<?php if($type=='RE_AGENT'){ ?>
															<label class="col-form-label fw-semibold fs-7 "><span style="background-color:#10d3ff;border-radius: 8px;padding: 5px 10px 5px 10px;" >RealeState</span></label>

														<?php }?>
														<?php if($type=='Karupatti'){ ?>

															<label class="col-form-label fw-semibold fs-7 "><span style="background-color:#967259;border-radius: 8px;padding: 5px 10px 5px 10px;" >Karupatti</span></label>

														<?php } if($type=='SUPPLIERS'){?>

															<label class="col-form-label fw-semibold fs-7 "><span style="background-color:#ffc700;border-radius: 8px;padding: 5px 10px 5px 10px;" >Suppliers</span></label>

														<?php } ?>

														<?php  if($type=='Suppliers-karupatti'){?>

															<label class="col-form-label fw-semibold fs-7 "><span style="background-color:#c56894;border-radius: 8px;padding: 5px 10px 5px 10px;" >Karupatti&nbsp;Courier</span></label>

														<?php } ?>										


													</td>
													
													<td>
														<?php echo $supplierslist['PHONE']?$supplierslist['PHONE']:'-';?>
													</td>
													<td class="ple1">
														<?php echo $supplierslist['EMAIL']?$supplierslist['EMAIL']:'-';?>
													</td>
													<td class="ple1">
														<?php 

														$add    = $supplierslist['ADDRESS']?$supplierslist['ADDRESS'].' ,':'- ,';
														$city   = $supplierslist['CITY']?$supplierslist['CITY'].' ,':'- ,';
														$state  = $supplierslist['STATE']?$supplierslist['STATE'].' .':'- .';

														 ?>
														<?php echo $add.$city.$state;?>
													</td>
													<td class="ple1">
														<?php echo $supplierslist['PAN_NO']?$supplierslist['PAN_NO']:'-';?>
													</td>
													<td class="ple1">
														<?php echo $supplierslist['GST_NO']?$supplierslist['GST_NO']:'-';?>
													</td>
													<td>
														<label class="form-check form-switch form-check-custom form-check-solid">
															<!-- <input class="form-check-input" type="checkbox" value="1" checked="checked"> -->
															<input class="form-check-input w-35px h-20px" type="checkbox" <?php if($supplierslist['Status']=='Y'){echo "checked";} ?> id="activeunactive_suppliers_<?php echo $i;?>" name="activeunactive_suppliers_<?php echo $i;?>" onchange="activeunactive_suppliers('<?php echo $supplierslist['LEDGER_SNO'];?>',<?php echo $i;?>)" value="<?php echo $supplierslist['Status'];?>">
														</label>
													</td>
													<!--begin::Action=-->
													<td>
													<span class="text-end">
													<a href="javascript:;" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm" data-bs-toggle="modal" data-bs-target="#kt_modal_viewsuppliers" onclick="suppliers_view('<?php echo $supplierslist['LEDGER_SNO'];?>')">
													<i class="bi bi-eye-fill eyc"></i>
													</a>
													<a href="" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1" data-bs-toggle="modal" data-bs-target="#kt_modal_editsuppliers" onclick="suppliers_edit('<?php echo $supplierslist['LEDGER_SNO'];?>')">
													<!--begin::Svg Icon | path: icons/duotune/art/art005.svg-->
													<span class="svg-icon svg-icon-3">
													<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
													<path opacity="0.3" d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z" fill="currentColor"></path>
													<path d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z" fill="currentColor"></path>
												</svg>
											</span>
											<!--end::Svg Icon-->
										</a>
											<a href="javascript:;" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm" data-bs-toggle="modal" data-bs-target="#kt_modal_deletesuppliers" onclick="suppliers_delete('<?php echo $supplierslist['LEDGER_SNO'];?>')">
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
													<!--end::Table row-->
													<?php $i++;}?>
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
	<!--begin::Modal - New Suppliers-->
	<div class="modal fade" id="kt_modal_newsuppliers" tabindex="-1" aria-hidden="true">
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
					<form name="suppliers_add_form" id="suppliers_add_form" method="POST" action="<?php echo base_url(); ?>Suppliers/suppliers_save" enctype="multipart/form-data"  onsubmit="return suppliers_validation();">
				<!-- 		<input type="hidden" name="groupid_suppliers" id="groupid_suppliers" 
						value="< ?php echo $supplierslist->GROUP_ID;?>" >
						<input type="hidden" name="superid_suppliers" id="superid_suppliers" 
						value="< ?php echo $supp_super_id->SUPER_ID;?>"> -->
					<div class="modal-body pt-0 pb-15 px-5 px-xl-20">
						<!--begin::Heading-->
						<div class="mb-13 text-center">
							<h1 class="mb-3">New Supplier</h1>	
						</div>
						<!--end::Heading-->
						<div class="row">
							<div class="col-lg-6">
								<div style="padding: 10px 10px 10px 10px !important;box-shadow: 0 3px 6px #00002947;border-radius: 5px;background-color: white !important;">
									<div class="row">
										<label class="col-lg-5 col-form-label required fw-semibold fs-6">Supplier Name</label>
										<div class="col-lg-7 fv-row fv-plugins-icon-container">
											<input type="text" name="add_suppname_supplier" id="add_suppname_supplier" class="form-control form-control-lg form-control-solid" placeholder="Supplier Name" >
											<div class="fv-plugins-message-container invalid-feedback" id="add_suppname_supplier_err"></div>
										</div>
									</div>
										<div class="row">
										<label class="col-lg-5 col-form-label required fw-semibold fs-6">Address</label>
										<div class="col-lg-7 fv-row fv-plugins-icon-container">
											<input type="text" name="add_addr_supplier" id="add_addr_supplier" class="form-control form-control-lg form-control-solid" placeholder="Supplier Address" >
											<div class="fv-plugins-message-container invalid-feedback" id="add_addr_supplier_err"></div>
										</div>
									</div>
									<div class="row">
									<label class="col-lg-5 col-form-label fw-semibold fs-6">Zone</label>
								
										<div class="col-lg-7 fv-row fv-plugins-icon-container">
											<input type="text" name="add_zone_supplier" id="add_zone_supplier" class="form-control form-control-lg form-control-solid" oninput="this.value = this.value.replace(/[^A-Za-z]/g, '').replace(/(\..*)\./g, '$1');" placeholder="Zone">
											<div class="fv-plugins-message-container invalid-feedback" id="add_zone_supplier"></div>
										</div>
									
									</div>
									<div class="row">
										<label class="col-lg-5 col-form-label required fw-semibold fs-6">City</label>
									<div class="col-lg-7 fv-row fv-plugins-icon-container">
										<input type="text" name="add_city_supplier" id="add_city_supplier" class="form-control form-control-lg form-control-solid" oninput="this.value = this.value.replace(/[^A-Za-z]/g, '').replace(/(\..*)\./g, '$1');" placeholder="City">
										<div class="fv-plugins-message-container invalid-feedback" id="add_city_supplier_err"></div>
									</div>
									</div>
									<div class="row">
										<label class="col-lg-5 col-form-label required fw-semibold fs-6">State</label>
										<div class="col-lg-7 fv-row">
										<select class="form-select form-select-solid" data-control="select2" name="state_list_supplier"  id="state_list_supplier" data-hide-search="false" data-dropdown-parent="#kt_modal_newsuppliers">
										<option value="">Select State</option>
										<?php foreach($states_list as $statelist)
										{?>

										<option value="<?php echo $statelist['STATE_NAME'];?>" <?php if ($statelist['STATE_NAME']=='Tamil Nadu'){echo 'selected';}else{echo '';} ?>><?php echo $statelist['STATE_NAME'];?></option><?php
										}?>
										</select>
										<div class="fv-plugins-message-container invalid-feedback" id="state_list_supplier_err"></div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-lg-6">
								<div style="padding: 10px 10px 10px 10px !important;box-shadow: 0 3px 6px #00002947;border-radius: 5px;background-color: white !important;">
									<div class="row">
										<label class="col-lg-5 col-form-label required fw-semibold fs-6">Category</label>
										<div class="col-lg-7 fv-row">
										<select class="form-select form-select-solid" data-dropdown-parent="#kt_modal_newsuppliers"data-control="select2" name="accgrp_list_supp"  id="accgrp_list_supp" data-hide-search="false" >
										<!-- <option value="">Select Account Group</option>  -->
										<option value="SUPPLIERS"><?php echo 'Suppliers';?></option>
										<option value="Suppliers-karupatti"><?php echo 'Karupatti-courier';?></option>
										<option value="Karupatti"><?php echo 'Karupatti'; ?></option>
										<option value="'RE_AGENT"><?php echo 'Realestate'; ?></option>
										
										</select>

										<div class="fv-plugins-message-container invalid-feedback" id="accgrp_list_supp_err"></div>
										</div>
									</div>
									<div class="row">
										<label class="col-lg-5 col-form-label required fw-semibold fs-6">Mobile</label>
										<div class="col-lg-7 fv-row fv-plugins-icon-container">
											<input type="text" name="add_phone_supplier" id="add_phone_supplier" class="form-control form-control-lg form-control-solid" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" maxlength="10" onkeyup="supplier_phone_unique(this.value);" placeholder="Mobile number" pattern="^(?:(?:\+|0{0,2})91(\s*[\-]\s*)?|[0]?)?[6789]\d{9}$" title="Enter Valid mobile number ex.6311111111">
											<div class="fv-plugins-message-container invalid-feedback" id="add_phone_supplier_err"></div>
										</div>
									</div>
									<div class="row">
										<label class="col-lg-5 col-form-label fw-semibold fs-6">Email ID</label>
										<div class="col-lg-7 fv-row fv-plugins-icon-container">
											<input type="text" name="add_email_supplier" id="add_email_supplier" class="form-control form-control-lg form-control-solid" placeholder="Email ID">
											<div class="fv-plugins-message-container invalid-feedback"></div>
										</div>
									</div>
									<div class="row">
										<label class="col-lg-5 col-form-label required fw-semibold fs-6">ID Type</label>
										<div class="col-lg-7 fv-row">
										<select class="form-select form-select-solid" data-control="select2" name="add_idtype_list_supp"  id="add_idtype_list_supp" data-hide-search="false" data-dropdown-parent="#kt_modal_newsuppliers">
										<option value="">Select ID Type</option>
										<?php foreach($idtype_list as $idtypelist)
										{?>
										<option value="<?php echo $idtypelist['IDTYPENAME'];?>"><?php echo $idtypelist['IDTYPENAME'];?></option><?php
										}?>
										</select>
										<div class="fv-plugins-message-container invalid-feedback" id="add_idtype_list_supp_err"></div>
										</div>
									</div>
									<div class="row">
										<label class="col-lg-5 col-form-label fw-semibold fs-6">PAN No</label>
										<div class="col-lg-7 fv-row fv-plugins-icon-container">
											<input type="text" name="add_pan_no_supplier" id="add_pan_no_supplier" class="form-control form-control-lg form-control-solid" placeholder="PAN No" oninput="this.value = this.value.replace(/[^A-Za-z0-9]/g, '').replace(/(\..*)\./g, '$1');">
											<div class="fv-plugins-message-container invalid-feedback" id="add_pan_no_supplier_err"></div>
										</div>
									</div>
									<div class="row">
										<label class="col-lg-5 col-form-label fw-semibold fs-6">GSTIN No</label>
										<div class="col-lg-7 fv-row fv-plugins-icon-container">
											<input type="text" name="add_gstin_no_supplier" class="form-control form-control-lg form-control-solid"  maxlength="15" placeholder="GSTIN No" oninput="this.value = this.value.replace(/[^A-Za-z0-9/\\-]/g, '').replace(/(\..*)\./g, '$1');">
											<div class="fv-plugins-message-container invalid-feedback"></div>
										</div>
									</div>
									<div class="row">
										<label class="col-lg-5 col-form-label required fw-semibold fs-6">Opening Balance</label>
										<div class="col-lg-4 fv-row fv-plugins-icon-container">
											<input type="text" name="add_op_bal_supplier" id="add_op_bal_supplier" class="form-control form-control-lg form-control-solid" placeholder="Opening Balance" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
											<div class="fv-plugins-message-container invalid-feedback" id="add_op_bal_supplier_err"></div>
										</div>
										<div class="col-lg-3 fv-row fv-plugins-icon-container">
										<select class="form-select form-select-solid" data-control="select2" name="add_op_dr_supp"  id="add_op_dr_supp" data-hide-search="false" data-dropdown-parent="#kt_modal_newsuppliers">
										<option value="">Select </option>
										<?php //foreach($op_list as $oplist)
										{?>
										<option value="CR">CR</option>
										<option value="DR">DR</option>

										<?php
										}//?>
										</select>
										<div class="fv-plugins-message-container invalid-feedback" id="add_op_dr_supp_err"></div>
										</div>
									</div>
									<div class="row">
										<label class="col-lg-5 col-form-label fw-semibold fs-6">Remarks</label>
										<div class="col-lg-7 fv-row fv-plugins-icon-container">
											<textarea class="form-control form-control-solid" name="add_remarks_suppliers" rows="3" placeholder="Remarks"></textarea>
											<div class="fv-plugins-message-container invalid-feedback"></div>
										</div>
									</div>
								</div>
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
									<button type="submit" class="btn btn-primary" id="save_changes_add_suppliers">Save Changes</button>
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
	</div>
<!--end::Modal - Suppliers-->

<!--begin::Modal - Edit Products-->
	<div class="modal fade" id="kt_modal_editsuppliers" tabindex="-1" aria-hidden="true">
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
				</div>
				<!--end::Modal content-->
			</div>
		<!--end::Modal dialog-->
	</div>
<!--end::Modal - Edit Products-->
<!--begin::Modal - delete Suppliers-->
	<div class="modal fade" id="kt_modal_deletesuppliers" tabindex="-1" aria-hidden="true">
		<!--begin::Modal dialog-->
			<div class="modal-dialog modal-m">
			<!--begin::Modal content-->
			<div class="modal-content rounded">
			<div class="swal2-icon swal2-warning swal2-icon-show" style="display: flex;">
			<div class="swal2-icon-content">!</div></div>
			
			<br><br>
			</div>
			<!--end::Modal content-->
			</div>
			<!--end::Modal dialog-->
		
	</div>
<!--end::Modal - delete Suppliers-->

<!--begin::Modal - View Products-->
	<div class="modal fade" id="kt_modal_viewsuppliers" tabindex="-1" aria-hidden="true">
		<!--begin::Modal dialog-->
			<div class="modal-dialog modal-xl">
				<!--begin::Modal content-->
				<div class="modal-content rounded">
					<!--begin::Modal header-->
					<div class="modal-header justify-content-end border-0 pb-0">
						<!--begin::Close-->
						<div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal" onclick="closeViewModalSuppliers();">
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
							<h1 class="mb-3">View Supplier Details</h1>	
						</div>
						<!--end::Heading-->
						
					</div>
					<!--end::Modal body-->
			</div>
		<!--end::Modal content-->
	</div>
<!--end::Modal - View Products-->


		<input type="hidden" id="baseurl" value="<?php echo base_url();?>">
		<?php $this->load->view("script");?>

		<script>

				$("#kt_daterangepicker_suppliers_from").flatpickr({
								dateFormat: "d-m-Y",
							});
				$("#kt_daterangepicker_suppliers_to").flatpickr({
								dateFormat: "d-m-Y",
							});

				$("#kt_daterangepicker_newsupplier").flatpickr({
								dateFormat: "d-m-Y",
							});
				$("#kt_daterangepicker_Modifysupplier").flatpickr({
								dateFormat: "d-m-Y",
							});
				$("#kt_daterangepicker_supplier_from").flatpickr({
								dateFormat: "d-m-Y",
							});
				$("#kt_daterangepicker_supplier_to").flatpickr({
								dateFormat: "d-m-Y",
							});
		</script>
		<script>
		  $("#kt_datatable_supplier_list").kendoTooltip({
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
		  $("#kt_datatable_responsive_newsuppliers").kendoTooltip({
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
		  $("#kt_datatable_responsive_viewsuppliers").kendoTooltip({
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
		  $("#kt_datatable_responsive_editsuppliers").kendoTooltip({
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
	function activeunactive_suppliers(val,ival) {
	var unactive;
	var unactv;
	var baseurl= $("#baseurl").val();
	var a = $("#activeunactive_suppliers_"+ival).val();
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
		url:baseurl+'Suppliers/suppliers_active',
		data:datastring,
		cache: false,
		dataType: "html",
		success: function(result){
			// alert(result+unactive);
			if(a=='N'){
	            $("#active_supplier").css('display','block');
				$("#active_supplier").addClass('response');
	        }else{
	            $("#deactive_supplier").css('display','block');
				$("#deactive_supplier").addClass('response');
	        }      
            setTimeout(function() {
	         window.location = baseurl+"Suppliers";
	        }, 1000);
		},
		error: function (error) {
			alert('error; ' + eval(error));
			setTimeout(function() {
	         window.location = baseurl+"Suppliers";
	        }, 1000);
		}
	});
}	
</script>

<script>
function suppliers_delete(val)
{
	var baseurl= $("#baseurl").val();
	// alert(val);
	$.ajax({
	type: "POST",
	url: baseurl+'Suppliers/suppliers_delete',
	async: false,
	type: "POST",
	data: "id="+val,
	dataType: "html",
	success: function(response)
	{
	$('#kt_modal_deletesuppliers').empty().append(response);
	$('#kt_modal_deletesuppliers').addClass('show');
	}
	});
}

function removesuppliers(val)

{ 
	var baseurl= $("#baseurl").val();
	$.ajax({
	type: "POST",
	url: baseurl+'Suppliers/delete',
	async: false,
	data:"field="+val,
	success: function(response)
	{
	window.location.href = baseurl+'Suppliers';
	}
	});
}

function closeDeleteModalSuppliers()
	{
		var baseurl= $("#baseurl").val();
		$('#kt_modal_deletesuppliers').removeClass('show');
		$('.modal-backdrop').removeClass('show');
		window.location.href = baseurl+'Suppliers';
	}
</script>

<!--Modal - Edit Products-->

<script>

function suppliers_edit(val)
{
	var baseurl= $("#baseurl").val();
	//alert(val);
	$.ajax({
	type: "POST",
	url: baseurl+'Suppliers/suppliers_edit',
	async: false,
	type: "POST",
	data: "id="+val,
	dataType: "html",
	success: function(response)
	{

	$('#kt_modal_editsuppliers').empty().append(response);
	$('#kt_modal_editsuppliers').addClass('show');
	//$("#kt_modal_editdept").css("display", "block");
	}
	});
}

function closeEditModalSuppliers()
{
	var baseurl= $("#baseurl").val();
	$('#kt_modal_editsuppliers').removeClass('show');
	//$("#kt_modal_update_role").css("display", "none");
	$('.modal-backdrop').removeClass('show');
	window.location.href = baseurl+'Suppliers';
}
</script>

<script>
	//View Modal

function suppliers_view(val)
	{
		var baseurl= $("#baseurl").val();
		// alert(val);
		$.ajax({
		type: "POST",
		url: baseurl+'Suppliers/suppliers_view',
		async: false,
		type: "POST",
		data: "id="+val,
		dataType: "html",
		success: function(response)
		{
		$('#kt_modal_viewsuppliers').empty().append(response);
		$('#kt_modal_viewsuppliers').addClass('show');
		}
		});
	}
function closeViewModalSuppliers()
	{
		var baseurl= $("#baseurl").val();
		$('#kt_modal_viewsuppliers').removeClass('show');
		//$("#kt_modal_update_role").css("display", "none");
		$('.modal-backdrop').removeClass('show');
		// window.location.href = baseurl+'Suppliers';
	}
</script>

<script>
//staff Mobile Unique validation
		var berr=0;
			function supplier_phone_unique(val)
			{

				// alert(val)
				var baseurl= $("#baseurl").val();
				if (val!='') {

					$.ajax({
					type:"POST",
					url:baseurl+'Suppliers/supplier_phone_unique',
					data:{'value':val},
					cache: false,
					dataType: "html",
					success: function(result)
					{
						console.log(result);
						if(result>0)
						{
							$('#add_phone_supplier_err').html('Mobile Number already exist!');
							berr=1;
						}
						else
						{
							$('#add_phone_supplier_err').html('');
							berr=0;
						}
					}
				});


				}else{
					$('#add_phone_supplier_err').html('Enter Mobile Number is Required !');
				}
				
			}
function suppliers_validation()
{

	var err = 0;
	var add_suppname_supplier = $('#add_suppname_supplier').val();
    if(add_suppname_supplier.trim()=='')
    {
        $('#add_suppname_supplier_err').html('Enter Supplier Name!');
        err++;
    }
    else

    {
    	$('#add_suppname_supplier_err').html('');

    }

    var add_addr_supplier = $('#add_addr_supplier').val();
    if(add_addr_supplier.trim()=='')
    {
        $('#add_addr_supplier_err').html('Enter Address!');
        err++;
    }
    else

    {
    	$('#add_addr_supplier_err').html('');

    }


    var add_city_supplier = $('#add_city_supplier').val();
    if(add_city_supplier.trim()=='')
    {
        $('#add_city_supplier_err').html('Enter City!');
        err++;
    }
    else

    {
    	$('#add_city_supplier_err').html('');

    }

    var state_list_supplier = $('#state_list_supplier').val();
    if(state_list_supplier.trim()=='')
    {
        $('#state_list_supplier_err').html('Enter State!');
        err++;
    }
    else

    {
    	$('#state_list_supplier_err').html('');

    }


    var accgrp_list_supp = $('#accgrp_list_supp').val();
    if(accgrp_list_supp.trim()=='')
    {
        $('#accgrp_list_supp_err').html('Please Select Account Group!');
        err++;
    }
    else

    {
    	$('#accgrp_list_supp_err').html('');

    }

    var add_phone_supplier = $('#add_phone_supplier').val();

    if(add_phone_supplier.trim()==''){
        $('#add_phone_supplier_err').html('Enter phone Number!');
        err++;
    }else{
        if(berr>0)
		{
			$('#add_phone_supplier_err').html('Mobile Number already exist!');
			err++;
		}
		else
		{	
			// if (berr==0) {
			    $('#add_phone_supplier_err').html('');
			// }else{
				// $('#add_phone_supplier_err').html('Mobile is already exit !');
			// }
		}
    }

    var add_idtype_list_supp = $('#add_idtype_list_supp').val();
    if(add_idtype_list_supp.trim()=='')
    {
        $('#add_idtype_list_supp_err').html('Please select IDType!');
        err++;
    }
    else

    {
    	$('#add_idtype_list_supp_err').html('');

    }


    var add_op_bal_supplier = $('#add_op_bal_supplier').val();
    if(add_op_bal_supplier.trim()=='')
    {
        $('#add_op_bal_supplier_err').html('Enter Op Balance!');
        err++;
    }
    else

    {
    	$('#add_op_bal_supplier_err').html('');

    }
    var add_op_dr_supp = $('#add_op_dr_supp').val();
    if(add_op_dr_supp.trim()=='')
    {
        $('#add_op_dr_supp_err').html('Select Op Balance Type!');
        err++;
    }
    else

    {
    	$('#add_op_dr_supp_err').html('');

    }
    

    if(err>0){ return false; }else { return true; }

}	
</script>
<script>
//Supplier Mobile Unique validation
		var berredit=0;
			function suppliers_phone_unique_edit(val)

			{
				// alert(val);

					var baseurl= $("#baseurl").val();
					if (val!='') {
						$.ajax({
							type:"POST",
							url:baseurl+'Suppliers/suppliers_phone_unique_edit',
							data:{'value':val},
							cache: false,
							dataType: "html",
								success: function(result){
								if(result>0)
								{
									$('#edit_phone_supplier_err').html('Mobile Number already exist!');
									berredit=1;
								}
								else
								{
									$('#edit_phone_supplier_err').html('');
									berredit=0;
								}
							}
						});
				}
				else{
					$('#edit_phone_supplier_err').html('Enter Mobile Number is Required !');
				}
			}
function suppliers_validation_edit()
{
	var err1 = 0;
	var edit_suppname_supplier = $('#edit_suppname_supplier').val();
    if(edit_suppname_supplier.trim()=='')
    {
        $('#edit_suppname_supplier_err').html('Enter Supplier Name!');
        err1++;
    }
    else

    {
    	$('#edit_suppname_supplier_err').html('');

    }

    var edit_suppaddress_supplier = $('#edit_suppaddress_supplier').val();
    if(edit_suppaddress_supplier.trim()=='')
    {
        $('#edit_suppaddress_supplier_err').html('Enter Address!');
        err1++;
    }
    else

    {
    	$('#edit_suppaddress_supplier_err').html('');

    }


    var edit_city_supplier = $('#edit_city_supplier').val();
    if(edit_city_supplier.trim()=='')
    {
        $('#edit_city_supplier_err').html('Enter City!');
        err1++;
    }
    else

    {
    	$('#edit_city_supplier_err').html('');

    }

    var state_list_supplier_edit = $('#state_list_supplier_edit').val();
    if(state_list_supplier_edit.trim()=='')
    {
        $('#state_list_supplier_edit_err').html('Enter State!');
        err1++;
    }
    else

    {
    	$('#state_list_supplier_edit_err').html('');

    }


    var accgrp_list_supp_edit = $('#accgrp_list_supp_edit').val();
    if(accgrp_list_supp_edit.trim()=='')
    {
        $('#accgrp_list_supp_edit_err').html('Please Select Account Group!');
        err1++;
    }
    else

    {
    	$('#accgrp_list_supp_edit_err').html('');

    }

    var edit_phone_supplier = $('#edit_phone_supplier').val();

    if(edit_phone_supplier.trim()==''){
        $('#edit_phone_supplier_err').html('Enter Mobile Number!');
        err1++;
    }else{
    	
        if(berredit>0)	
		
		{
			$('#edit_phone_supplier_err').html('Phone Number already exist!');
			err1++;
		}
		else
		{
			$('#edit_phone_supplier_err').html('');
		}

    }

    var edit_id_ty_supplier = $('#edit_id_ty_supplier').val();
    if(edit_id_ty_supplier.trim()=='')
    {
        $('#edit_id_ty_supplier_err').html('Please select IDType!');
        err1++;
    }
    else

    {
    	$('#edit_id_ty_supplier_err').html('');

    }


    var edit_op_bal_supplier = $('#edit_op_bal_supplier').val();
    if(edit_op_bal_supplier.trim()=='')
    {
        $('#edit_op_bal_supplier_err').html('Enter Op Balance!');
        err1++;
    }
    else

    {
    	$('#edit_op_bal_supplier_err').html('');

    }

    if(err1>0){ return false; }else { return true; }

}	
</script>

<script>
	$('#kt_datatable_supplier_list').DataTable( {
		"aaSorting": [],
		"responsive": true,
        dom: 'Bfrtip',
        buttons: [
        			{
			            extend: 'copyHtml5',
			            title: 'Supplier List',
	                    exportOptions: {columns: [0,1,2,3,4,5,6]}
	                },
	                {
	                    extend: 'excelHtml5',
	                    title: 'Supplier List',
	                    exportOptions: {columns: [0,1,2,3,4,5,6]}
	                },
	                {
	                    extend: 'csvHtml5',
	                    title: 'Supplier List',
	                    exportOptions: {columns: [0,1,2,3,4,5,6]}
	                },
	                {
	                    extend: 'pdfHtml5',
	                    title: 'Supplier List',
	                    exportOptions: {columns: [0,1,2,3,4,5,6]}
	                },
        ]
    } );		
</script>
<!-- Unique Validation-->
	</body>
	<!--end::Body-->
</html>