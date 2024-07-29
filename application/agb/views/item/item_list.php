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
									<h1 class="d-flex align-items-center text-dark fw-bold my-1 fs-3">Item List
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
			                         <div class="alert alert-success alert-dismissible" style="display:none;" id="active_item_master" role="alert">
			                           <!--  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			                            </button> -->
			                            Item has been activated successfully
			                        </div>
			                        <div class="alert alert-danger alert-dismissible" style="display:none;" id="deactive_item_master" role="alert">
			                           <!--  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			                            </button> -->
			                            Item has been deactivated successfully
			                        </div>


								<!--begin::Card header-->
								<div class="card-header border-0 pt-6">
									<!--begin::Card title-->
									<div class="card-title">
										
									</div>
									<!--begin::Card title-->
									<!--begin::Card toolbar-->
									<div class="card-toolbar">
										<!--begin::Toolbar-->
										<div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
											<!--begin::Add user-->
											
											<button type="button" class="btn btn-primary"  data-bs-toggle="modal" data-bs-target="#kt_modal_add_newitem" onclick="itemincrement()";>
											<!--begin::Svg Icon | path: icons/duotune/arrows/arr075.svg-->
											<span class="svg-icon svg-icon-2">
												<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
													<rect opacity="0.5" x="11.364" y="20.364" width="16" height="2" rx="1" transform="rotate(-90 11.364 20.364)" fill="currentColor" />
													<rect x="4.36396" y="11.364" width="16" height="2" rx="1" fill="currentColor" />
												</svg>
											</span>
											<!--end::Svg Icon-->New Item</button>
											<!--end::Add user-->
										</div>
										<!--end::Toolbar-->
										<!--begin::Group actions-->
										<div class="d-flex justify-content-end align-items-center d-none" data-kt-user-table-toolbar="selected">
											<!--<div class="fw-bold me-5">
											<span class="me-2" data-kt-user-table-select="selected_count"></span>Selected</div>-->
											<button type="button" class="btn btn-danger" data-kt-user-table-select="delete_selected">Delete Selected</button>
										</div>
										<!--end::Group actions-->
										<!--begin::Modal - Adjust Balance-->
										<div class="modal fade" id="kt_modal_export_users" tabindex="-1" aria-hidden="true">
											<!--begin::Modal dialog-->
											<div class="modal-dialog modal-dialog-centered mw-650px">
												<!--begin::Modal content-->
												<div class="modal-content">
													<!--begin::Modal header-->
													<div class="modal-header">
														<!--begin::Modal title-->
														<h2 class="fw-bold">Export</h2>
														<!--end::Modal title-->
														<!--begin::Close-->
														<div class="btn btn-icon btn-sm btn-active-icon-primary" data-kt-users-modal-action="close">
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
													<div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
														<!--begin::Form-->
														<form id="kt_modal_export_users_form" class="form" action="#">
															<!--begin::Input group-->
															<div class="fv-row mb-10">
																<!--begin::Label-->
																<label class="fs-6 fw-semibold form-label mb-2">Select Item:</label>
																<!--end::Label-->
																<!--begin::Input-->
																<select name="role" data-control="select2" data-placeholder="Select Company" data-hide-search="true" class="form-select form-select-solid fw-bold">
																	<option></option>
																	<option value="Item Details">Item Details</option>
																	<option value="all">All</option>
																</select>
																<!--end::Input-->
															</div>
															<!--end::Input group-->
															<!--begin::Input group-->
															<div class="fv-row mb-10">
																<!--begin::Label-->
																<label class="required fs-6 fw-semibold form-label mb-2">Select Export Format:</label>
																<!--end::Label-->
																<!--begin::Input-->
																<select name="format" data-control="select2" data-placeholder="Select a format" data-hide-search="true" class="form-select form-select-solid fw-bold">
																	<option></option>
																	<option value="excel">Excel</option>
																	<option value="pdf">PDF</option>
																	<option value="cvs">CVS</option>
																	<option value="zip">ZIP</option>
																</select>
																<!--end::Input-->
															</div>
															<!--end::Input group-->
															<!--begin::Actions-->
															<div class="text-center">
																<button type="reset" class="btn btn-light me-3" data-kt-users-modal-action="cancel">Discard</button>
																<button type="submit" class="btn btn-primary" data-kt-users-modal-action="submit">
																	<span class="indicator-label">Submit</span>
																	<span class="indicator-progress">Please wait...
																	<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
																</button>
															</div>
															<!--end::Actions-->
														</form>
														<!--end::Form-->
													</div>
													<!--end::Modal body-->
												</div>
												<!--end::Modal content-->
											</div>
											<!--end::Modal dialog-->
										</div>
										<!--end::Modal - New Card-->
										
									</div>
									<!--end::Card toolbar-->
								</div>
								<!--end::Card header-->
								<!--begin::Card body-->
								<div class="card-body py-4">
									<!--begin::Table-->
									<table class="table align-middle table-row-dashed table-striped table-hover fs-7 gy-1 gs-2 dataTable" id="kt_datatable_dom_positioning">
										<!--begin::Table head-->
										<thead>
											<!--begin::Table row-->
											<tr class="text-start text-muted fw-bold fs-7  gs-0">
												
											
												<th class="min-w-125px" style="width: 20%;" >Sno</th>
												<th class="min-w-125px" style="width: 50%;" >Item Type</th>
												<th class="min-w-125px" style="width: 20%;" >Item Name</th>
												<th class="min-w-125px" style="width: 5%;">Status</th>
												<th class="min-w-125px" style="width: 15%;"><span class="text-end">Actions</span></th>
											</tr>
											<!--end::Table row-->
										</thead>
										<!--end::Table head-->
										<!--begin::Table body-->
										<tbody class="text-gray-600 fw-semibold">
											<!--begin::Table row-->
											<?php $i=1; foreach($item_list as $dlist){?>
											<tr>
												
												<td><?php echo $i;?></td>
												
												
												<td><?php
												if($dlist['jewel_type_id']!=''){
												$item_type=$this->db->query("SELECT * FROM jewel_type WHERE jewel_type_id='".$dlist['jewel_type_id'] ."' ")->row();
												echo $item_type->jewel_type;
												}
												//echo $dlist['jewel_type_id'];?></td>
												<td><?php echo $dlist['ITEMNAME'];?></td>
												<td>
													<label class="form-check form-switch form-check-custom form-check-solid">
															<!-- <input class="form-check-input" type="checkbox" value="1" checked="checked"> -->
															<input class="form-check-input w-35px h-20px" type="checkbox" <?php if($dlist['STATUS']=='Y'){echo "checked";} ?> id="activeunactive_items_<?php echo $i;?>" name="activeunactive_items_<?php echo $i;?>" onchange="activeunactive_items('<?php echo $dlist['ITEMNAME']; ?>',<?php echo $i;?>)" value="<?php echo $dlist['STATUS'];?>">
													</label>
													</td>
												<!--begin::Action=-->
												<td>
													<span class="text-end">
													<!-- <a href="#" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm" data-bs-toggle="modal" data-bs-target="#kt_modal_viewdept">
														<i class="bi bi-eye-fill eyc"></i>
													</a> -->
													<a href="javascript:;" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1" data-bs-toggle="modal" data-bs-target="#kt_modal_editdept" onclick="item_edit('<?php echo $dlist['SNO'];?>')">
																		<!--begin::Svg Icon | path: icons/duotune/art/art005.svg-->
																		<span class="svg-icon svg-icon-3">
																			<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																				<path opacity="0.3" d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z" fill="currentColor"></path>
																				<path d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z" fill="currentColor"></path>
																			</svg>
																		</span>
																		<!--end::Svg Icon-->
																	</a>
													<a href="javascript:;" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm" data-bs-toggle="modal" data-bs-target="#kt_modal_delete_item" onclick="item_delete('<?php echo $dlist['SNO'];?>')">
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
		<!--begin::Modal - add item-->
		<div class="modal fade" id="kt_modal_add_newitem" tabindex="-1" aria-hidden="true">
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
					<form name="item_add_form" id="item_add_form" method="POST" action="<?php echo base_url(); ?>Item/item_save" enctype="multipart/form-data" onsubmit="return new_item_validation();">
					<div class="modal-body pt-0 pb-15 px-5 px-xl-20">
						<!--begin::Heading-->
							<div class="mb-13 text-center">
								<h1 class="mb-3">New Item</h1>	
							</div>
						<!--end::Heading-->
						<div class="row">
							

							<!--begin::Col-->
							<!-- <div class="col-lg-1 fv-row fv-plugins-icon-container">
								<input type="text" name="item_code" id="item_code" class="form-control form-control-lg form-control-solid" value="<?php echo $dlist['ITEM_CODE'];?>">
								<div class="fv-plugins-message-container invalid-feedback" id="item_code_err"></div>
							</div> -->
							<!--end::Col-->
							<!--begin::Label-->
							<label class="col-lg-2 col-form-label required fw-semibold fs-6">Item type </label>
							<!--end::Label-->
							<!--begin::Left Section-->
							<div class="col-lg-2 fv-row">
							<!--begin::Select-->
								<select class="form-select form-select-solid" data-control="select2" name="item_type"  id="item_type" data-hide-search="true">
									<option value="">Select</option>
									<?php foreach($item_type_list as $itemtypelist)
									{?>
									<option value="<?php echo $itemtypelist['jewel_type_id'];?>"><?php echo $itemtypelist['jewel_type'];?></option><?php
									 }?>
								</select>
								<!--end::Select-->
								<div class="fv-plugins-message-container invalid-feedback" id="item_type_err"></div>
							</div>
							<!--end::Left Section-->
							<!--begin::Label-->
							<!-- <label class="col-lg-2 col-form-label fw-semibold fs-6">Item Code</label> -->
							<!--end::Label-->

							<!--begin::Label-->
						<!-- 	<label class="col-lg-2 col-form-label fw-semibold fs-6" name="" id="inc_name">:</label> -->
							<input type="hidden" id="increment_name" name="increment_name" value="">
							<!--end::Label-->
							<!--begin::Label-->
							<label class="col-lg-2 col-form-label required fw-semibold fs-6">Item Name</label>
							<!--end::Label-->
							<!--begin::Col-->
							<div class="col-lg-2 fv-row fv-plugins-icon-container">
								<input type="text" name="Name_item" id="Name_item" class="form-control form-control-lg form-control-solid">
								<div class="fv-plugins-message-container invalid-feedback" id="name_item_err"></div>
							</div>
							<!--end::Col-->
							
							
							<!--begin::Label-->
							<!-- <label class="col-lg-1 col-form-label required fw-semibold fs-6">Unit</label> -->
							<!--end::Label-->
							<!--begin::Col-->
							<!-- <div class="col-lg-2 fv-row">
								<select class="form-select form-select-solid" name="unit_item" id="unit_item"data-control="select2" data-hide-search="true">
									<option value="">Select</option>
									<?php foreach($unit_list as $unitlist)
									{?>
									<option value="<?php echo $unitlist['UNIT_NAME'];?>"><?php echo $unitlist['UNIT_NAME'];?></option><?php
									 }?>
								</select>
								<div class="fv-plugins-message-container invalid-feedback" id="unit_item_err"></div>
							</div> -->
							<!--end::Col-->
							
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
									<button type="submit" class="btn btn-primary" id="">Save Changes</button>
								</div>
							</div>
						</div>
						<!--end::Actions-->
					</div>
				</form>
					<!--end::Modal body-->
				</div>
				<!--end::Modal content-->
			</div>
		<!--end::Modal dialog-->
	</div>
		<!--end::Modal - add item-->
		
		<!--begin::Modal - edit company-->
		<div class="modal fade" id="kt_modal_editdept" tabindex="-1" aria-hidden="true">
			
		</div>
		<!--end::Modal - edit company-->
		<!--begin::Modal - view company-->
<div class="modal fade" id="kt_modal_viewdept" tabindex="-1" aria-hidden="true">
			<!--begin::Modal dialog-->
			<div class="modal-dialog modal-m">
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
							<h1 class="mb-3">Item Details</h1>
						</div>
						<!--end::Heading-->
						<div class="row mb-6">
							<!--begin::Label-->
							<label class="col-lg-4 col-form-label fw-semibold fs-6">Company</label>
							<!--end::Label-->
							<!--begin::Left Section-->
												<div class="col-lg-8">
												<!--begin::Select-->
													<select class="form-select form-select-solid" data-control="select2" data-placeholder="Select Company" data-hide-search="true" disabled>
														<option value="3">Ayyanar Gold Bank</option>
														<option value="3">Ayyanar Gold Bank 1</option>
														<option value="3">Ayyanar Gold Bank 2</option>
														<option value="1">Ayyanar Gold Bank 3</option>
														<option value="3">Ayyanar Gold Bank 4</option>
													</select>
													<!--end::Select-->
												</div>
											<!--end::Left Section-->
						</div>
							<div class="row mb-6">
								<!--begin::Label-->
												<label class="col-lg-4 col-form-label fw-semibold fs-6">Dept</label>
												<!--end::Label-->
												<!--begin::Col-->
												<div class="col-lg-8 fv-row fv-plugins-icon-container">
													<input type="text" name="company" class="form-control form-control-lg form-control-solid" placeholder="Item Name" Value="Accounts" disabled>
													<div class="fv-plugins-message-container invalid-feedback"></div>
												</div>
												<!--end::Col-->	
							</div>
					</div>
					<!--end::Modal body-->
				</div>
				<!--end::Modal content-->
			</div>
			<!--end::Modal dialog-->
		</div>
		<!--End::View Company-->
		<!--begin::Modal - delete item-->
		<div class="modal fade" id="kt_modal_delete_item" tabindex="-1" aria-hidden="true">
			
		</div>
		<!--end::Modal - delete item-->
		<input type="hidden" id="baseurl" value="<?php echo base_url();?>">
		<?php $this->load->view("script");?>
<script>

var title = $('title').text() + ' | ' + 'Item';
    $(document).attr("title", title);

function item_edit(val){
var baseurl= $("#baseurl").val();
//alert(val);
$.ajax({
type: "POST",
url: baseurl+'item/item_edit',
async: false,
type: "POST",
data: "id="+val,
dataType: "html",
success: function(response)
{
$('#kt_modal_editdept').empty().append(response);
$('#kt_modal_editdept').addClass('show');
//$("#kt_modal_editdept").css("display", "block");
}
});
}

function closeEditModal()
{
	var baseurl= $("#baseurl").val();
	$('#kt_modal_editdept').removeClass('show');
	//$("#kt_modal_update_role").css("display", "none");
	$('.modal-backdrop').removeClass('show');
	window.location.href = baseurl+'item';
}


var berr=0;
function item_unique(val)
{
	var baseurl= $("#baseurl").val();
	$.ajax({
		type:"POST",
		url:baseurl+'item/item_unique',
		data:{'value':val},
		cache: false,
		dataType: "html",
			success: function(result){
			if(result>0)
			{
				$('#item_err').html('Item already exist!');
				berr=1;
			}
			else
			{
				$('#item_err').html('');
				berr=0;
			}
		}
	});
}
function item_validation()
{
	var err = 0;
	var item_name = $('#item').val();

    if(item_name.trim()==''){
        $('#item_err').html('Enter Item!');
        err++;
    }else{
        //$('#item_err').html('');
        if(berr>0)
		{
			$('#item_err').html('Item already exist!');
			err++;
		}
		else
		{
			$('#item_err').html('');
		}
    }
    
    if(err>0){ return false; }else{ return true; }
}		


var berre=0;
function item_unique_edit(val,dcid)
{
	var baseurl= $("#baseurl").val();
	$.ajax({
		type:"POST",
		url:baseurl+'item/item_unique_edit',
		data:{'value':val,'dcid':dcid},
		cache: false,
		dataType: "html",
			success: function(result){
			if(result>0)
			{
				$('#item_edit_err').html('Item already exist!');
				berre=1;
			}
			else
			{
				$('#item_edit_err').html('');
				berre=0;
			}
		}
	});
}
// function edit_item_validation()
// {
// 	var erre = 0;
// 	var item = $('#item_edit').val();

//     if(item.trim()==''){
//         $('#item_edit_err').html('Enter Item Name!');
//         erre++;
//     }else{
//         //$('#item_err').html('');
//         if(berre>0)
// 		{
// 			$('#item_edit_err').html('Item already exist!');
// 			erre++;
// 		}
// 		else
// 		{
// 			$('#item_edit_err').html('');
// 		}
//     }
    
//     if(erre>0){ return false; }else{ return true; }
// }



function activeunactive(val,ival) {
	var unactive;
	var unactv;
	var baseurl= $("#baseurl").val();
	var a = $("#activeunactive_"+ival).val();
	if(a==1) {
		unactive=0;
		unactv="Active"
	}
	else{
		unactive=1;
		unactv="In-Active"
	}
	var datastring="id="+val+"&status="+unactive;
	$.ajax({
		type:"POST",
		url:baseurl+'item/item_active',
		data:datastring,
		cache: false,
		dataType: "html",
		success: function(result){
			// alert(result+unactive);
			if(a == 1){
	            $("#active").css('display','block');
				$("#active").addClass('response');
	        }else{
	            $("#deactive").css('display','block');
				$("#deactive").addClass('response');
	        }      
            setTimeout(function() {
	         window.location = baseurl+"item";
	        }, 3000);
		},
		error: function (error) {
			alert('error; ' + eval(error));
			setTimeout(function() {
	         window.location = baseurl+"item";
	        }, 3000);
		}
	});
}



function item_delete(val){
var baseurl= $("#baseurl").val();
//alert(val);
$.ajax({
type: "POST",
url: baseurl+'item/item_delete',
async: false,
type: "POST",
data: "id="+val,
dataType: "html",
success: function(response)
{
$('#kt_modal_delete_item').empty().append(response);
$('#kt_modal_delete_item').addClass('show');
//$("#kt_modal_delete_role").css("display", "block");
}
});
}

function removeItem(val)
{ 
var baseurl= $("#baseurl").val();
$.ajax({
type: "POST",
url: baseurl+'item/delete',
async: false,
data:"field="+val,
success: function(response)
{
window.location.href = baseurl+'item';
}
});
}

function closeDeleteModal()
{
	var baseurl= $("#baseurl").val();
	$('#kt_modal_delete_item').removeClass('show');
	$('.modal-backdrop').removeClass('show');
	window.location.href = baseurl+'item';
}


			$("#kt_datatable_dom_positioning").DataTable({
				//"ordering": false,
				"aaSorting": [],
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
	function activeunactive_items(val,ival) {
	var unactive;
	var unactv;
	var baseurl= $("#baseurl").val();
	var a = $("#activeunactive_items_"+ival).val();
	if(a=='N') {
		unactive='Y';
		unactv="Active"
	}
	else{
		unactive='N';
		unactv="In-Active"
	}
	var datastring="id="+val+"&status="+unactive;
	$.ajax({
		type:"POST",
		url:baseurl+'Item/Item_active',
		data:datastring,
		cache: false,
		dataType: "html",
		success: function(result){
			// alert(result+unactive);
			if(a=='N'){
	            $("#active_item_master").css('display','block');
				$("#active_item_master").addClass('response');
	        }else{
	            $("#deactive_item_master").css('display','block');
				$("#deactive_item_master").addClass('response');
	        }      
            setTimeout(function() {
	         window.location = baseurl+"Item";
	        }, 3000);
		},
		error: function (error) {
			alert('error; ' + eval(error));
			setTimeout(function() {
	         window.location = baseurl+"Item";
	        }, 3000);
		}
	});
}	
</script>
<script>
function new_item_validation()
{

	var err = 0;

	var item_type = $('#item_type').val();
    if(item_code.trim()=='')
    {
        $('#item_type_err').html('Enter Item Type!');
        err++;
    }
    else

    {
    	$('#item_type_err').html('');

    }

	

    var name_item= $('#Name_item').val();
    if(name_item.trim()=='')
    {
        $('#name_item_err').html('Enter Item Name!');
        err++;
    }
    else

    {
    	$('#name_item_err').html('');

    }


   

    


    if(err>0){ return false; }else { return true; }

}	
</script>

<script>
function edit_item_validation()
{

	var err = 0;

	var item_code_edit = $('#item_code_edit').val();
    if(item_code_edit.trim()=='')
    {
        $('#item_code_edit_err').html('Enter Item Code!');
        err++;
    }
    else

    {
    	$('#item_code_edit_err').html('');

    }

	var category_item_edit = $('#category_item_edit').val();
    if(category_item_edit.trim()=='')
    {
        $('#category_item_edit_err').html('Select Category!');
        err++;
    }
    else

    {
    	$('#category_item_edit_err').html('');

    }

    var name_item_edit= $('#name_item_edit').val();
    if(name_item_edit.trim()=='')
    {
        $('#name_item_edit_err').html('Enter Item Name!');
        err++;
    }
    else

    {
    	$('#name_item_edit_err').html('');

    }


    var prefix_item_edit = $('#prefix_item_edit').val();
    if(prefix_item_edit.trim()=='')
    {
        $('#prefix_item_edit_err').html('Enter Item Prefix!');
        err++;
    }
    else

    {
    	$('#prefix_item_edit_err').html('');

    }

    var unit_item_edit = $('#unit_item_edit').val();
    if(unit_item_edit.trim()=='')
    {
        $('#unit_item_edit_err').html('Select Unit!');
        err++;
    }
    else

    {
    	$('#unit_item_edit_err').html('');

    }


    if(err>0){ return false; }else { return true; }

}	
</script>

<script type="text/javascript">
	

	$('#category_item').change(function(){

		//alert('test');
		var select_val=$(this).val();
		
		//var value=select_val.substring(0, 1);


		var inc_val = '';
	

	var baseurl= $("#baseurl").val();
	$.ajax({
	type: "POST",
	url: baseurl+'item/item_increment',
	data: 'cat_id='+select_val,
	success: function(response)
	{
		//var result = JSON.stringify(response);
		 inc_val = response;

		 $('#increment_name').val(inc_val);
		// alert(inc_val)
	//$('#kt_modal_add_newitem').empty().append(response);
	//$('#kt_modal_add_newitem').addClass('show');	
	//window.location.href = baseurl+'item';
	}
	});
	


		//alert(value);
		// $('#inc_name').html(':'+(value+inc_val).trim());
		

	})
</script>		
	</body>
	<!--end::Body-->
</html>