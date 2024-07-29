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
									<h1 class="d-flex align-items-center text-dark fw-bold my-1 fs-3">Products Master List
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
				                    <div class="alert alert-success alert-dismissible" style="display:none;" id="active_product_master" role="alert">
			                            <!-- <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			                            </button> -->
			                            Product has been activated successfully
			                        </div>
			                        <div class="alert alert-danger alert-dismissible" style="display:none;" id="deactive_product_master" role="alert">
			                            <!-- <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			                            </button> -->
			                            Product has been deactivated successfully
			                        </div>
										<!--begin::Card header-->
										<div class="card-header1 border-0 pt-6">
											<div class="row">
												<div class="col-lg-7"></div>
												<div class="col-lg-5">
													<div class="row" style="float: right !important;">
														<div class="col-lg-auto pt-9" data-bs-toggle="modal" data-bs-target="#kt_modal_new_products_master">
															<!--begin::Add user-->
															<button type="button" class="btn btn-primary">New Product Master</button>
															<!--end::Add user-->
														</div>
														<!--begin::Modal - Adjust Balance-->
														<div class="modal fade" id="kt_modal_export_users" tabindex="-1" aria-hidden="true">
															<!--begin::Modal dialog-->
															<div class="modal-dialog modal-dialog-centered mw-650px">
																<!--begin::Modal content-->
																<div class="modal-content">
																	<!--begin::Modal header-->
																	<div class="modal-header">
																		<!--begin::Modal title-->
																		<h2 class="fw-bold">Export Product Entries</h2>
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
																				<label class="fs-6 fw-semibold form-label mb-2">Select Product:</label>
																				<!--end::Label-->
																				<!--begin::Input-->
																				<select name="role" data-control="select2" data-placeholder="Select Redemption" data-hide-search="true" class="form-select form-select-solid fw-bold">
																					<option value="bank">Bank</option>
																					<option value="staff">Staff</option>
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
												</div>
											</div>
											<!--end::Card title-->
										</div>
										<!--end::Card header-->
										<!--begin::Card body-->
										<div class="card-body py-4">
											<!--begin::Table-->
											<table id="kt_datatable_responsive_product_master" class="table align-middle table-row-dashed table-striped table-hover fs-7 gy-1 gs-2 dataTable no-footer">
												<thead>
												   <tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">
												  <!--   <th class="min-w-100px">ProductID</th> -->
													<th class="min-w-50px">Itemcode</th>
													<th class="min-w-100px">ItemName</th>
													<th class="min-w-100px">Metal Type</th>
													<th class="min-w-80px">Unit Type</th>
													<th class="min-w-80px">Category</th>
													<th class="min-w-80px">Status</th>
													<th class="min-w-125px" style="width: 10% !important;"><span class="text-end">Actions</span></th>
												        </tr>
												</thead>
												<tbody class="text-gray-600 fw-semibold">
													<?php $i=1; foreach($products_master as $productmaster){?>
													<tr>
														<td class="cy"><?php echo $productmaster['ITEM_CODE'];?></td>
														<td><?php echo $productmaster['ITEM_NAME'];?></td>
														<td><?php echo $productmaster['METAL_TYPE'];?></td>
														<td><?php echo $productmaster['UNIT_TYPE'];?></td>
														<td><?php echo $productmaster['CATEGORY_NAME'];?></td>
															<td>
														<label class="form-check form-switch form-check-custom form-check-solid">
																<!-- <input class="form-check-input" type="checkbox" value="1" checked="checked"> -->
																<input class="form-check-input w-35px h-20px" type="checkbox" <?php if($productmaster['STATUS']=='Y'){echo "checked";} ?> id="activeunactive_master_<?php echo $i;?>" name="activeunactive_master_<?php echo $i;?>" onchange="activeunactive_master('<?php echo $productmaster['PRODUCT_ID']; ?>',<?php echo $i;?>)" value="<?php echo $productmaster['STATUS'];?>">
														</label>
													</td>
														<!--begin::Action=-->
														<td>
															<span class="text-end">
															<a href="#" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm" data-bs-toggle="modal" data-bs-target="#kt_modal_view_products_master" onclick="productmaster_view('<?php echo $productmaster['PRODUCT_ID'];?>')">
																<i class="bi bi-eye-fill eyc"></i>
															</a>
															<a href="#" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1" data-bs-toggle="modal" data-bs-target="#kt_modal_edit_products_master" onclick="productmaster_edit('<?php echo $productmaster['PRODUCT_ID'];?>')">
																				<!--begin::Svg Icon | path: icons/duotune/art/art005.svg-->
																				<span class="svg-icon svg-icon-3">
																					<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																						<path opacity="0.3" d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z" fill="currentColor"></path>
																						<path d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z" fill="currentColor"></path>
																					</svg>
																				</span>
																				<!--end::Svg Icon-->
																			</a>
															<a href="#" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm" data-bs-toggle="modal" data-bs-target="#kt_modal_delete_products_master" onclick="productmaster_delete('<?php echo $productmaster['PRODUCT_ID'];?>')">
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
												</tbody>
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
	<!--begin::Modal - New Products Master-->
	<div class="modal fade" id="kt_modal_new_products_master" tabindex="-1" aria-hidden="true">
		<!-- <form id="kt_add_product_form" class="form"> -->
			<!--begin::Modal dialog-->
			<div class="modal-dialog modal-lg">
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
					<form name="productmaster_add_form" id="productmaster_add_form" method="POST" action="<?php echo base_url(); ?>Productmaster/productmaster_save" enctype="multipart/form-data" onsubmit="return new_productmaster_validation();">
					<div class="modal-body pt-0 pb-15 px-5 px-xl-20">
						<!--begin::Heading-->
						<div class="mb-13 text-center">
							<h1 class="mb-3">New Product Master</h1>	
						</div>
						<!--end::Heading-->
						<div class="row">
							<!-- <label class="col-lg-2 col-form-label required fw-semibold fs-6">Product ID</label>
							<div class="col-lg-4 fv-row fv-plugins-icon-container">
								<input type="text" name="add_pid_prodmaster" class="form-control form-control-lg form-control-solid" placeholder="Product ID" oninput="this.value = this.value.replace(/[^A-Za-z0-9/\\-]/g, '').replace(/(\..*)\./g, '$1');">
								<div class="fv-plugins-message-container invalid-feedback"></div>
							</div> -->
							<label class="col-lg-2 col-form-label required fw-semibold fs-6">Item Code</label>
							<div class="col-lg-4 fv-row fv-plugins-icon-container">
								<input type="text" name="add_itcode_prodmaster" id="add_itcode_prodmaster" class="form-control form-control-lg form-control-solid" placeholder="Item Code/SKU" oninput="this.value = this.value.replace(/[^A-Za-z0-9/\\-]/g, '').replace(/(\..*)\./g, '$1');">
								<div class="fv-plugins-message-container invalid-feedback" id="add_itcode_prodmaster_err"></div>
							</div>
					
							<label class="col-lg-2 col-form-label required fw-semibold fs-6">Item Name</label>
							<div class="col-lg-4 fv-row fv-plugins-icon-container">
								<input type="text" name="add_Iname_prodmaster" id="add_Iname_prodmaster" class="form-control form-control-lg form-control-solid" placeholder="Item Name" oninput="this.value = this.value.replace(/[^A-Za-z]/g, '').replace(/(\..*)\./g, '$1');">
								<div class="fv-plugins-message-container invalid-feedback" id="add_Iname_prodmaster_err"></div>
							</div>
							<label class="col-lg-2 col-form-label required fw-semibold fs-6">Metal Type</label>
							<div class="col-lg-4 fv-row">
								<select class="form-select form-select-solid" name="add_mty_prodmaster" id="add_mty_prodmaster"data-control="select2" data-hide-search="true">
									<option value="">Select</option>
									<option value="GOLD">GOLD</option>
									<option value="SILVER">SILVER</option>
									<option value="STONE GOLD">STONE GOLD</option>
								</select>
								<div class="fv-plugins-message-container invalid-feedback" id="add_mty_prodmaster_err"></div>
							</div>
					
							<label class="col-lg-2 col-form-label required fw-semibold fs-6">Unit Type</label>
							<div class="col-lg-4 fv-row">
								<select class="form-select form-select-solid" name="add_uty_prodmaster" id="add_uty_prodmaster"data-control="select2" data-hide-search="true">
									<option value="">Select</option>
									<?php foreach($unit_list as $unitlist)
									{?>
									<option value="<?php echo $unitlist['UNIT_NAME'];?>"><?php echo $unitlist['UNIT_NAME'];?></option><?php
									 }?>
								</select>
								<div class="fv-plugins-message-container invalid-feedback" id="add_uty_prodmaster_err"></div>
							</div>
							<label class="col-lg-2 col-form-label required fw-semibold fs-6">Category</label>
							<div class="col-lg-4 fv-row">
								<select class="form-select form-select-solid" name="add_cty_prodmaster" id="add_cty_prodmaster"data-control="select2" data-hide-search="true">
									<option value="">Select</option>
									<?php foreach($category_list as $categorylist)
									{?>
									<option value="<?php echo $categorylist['CAT_NAME'];?>"><?php echo $categorylist['CAT_NAME'];?></option><?php
									 }?>
								</select>
								<div class="fv-plugins-message-container invalid-feedback" id="add_cty_prodmaster_err"></div>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-8"></div>
							<div class="col-lg-1">
								<div class="d-flex flex-center flex-row-fluid pt-12">
									<button type="reset" class="btn btn-secondary me-8" data-bs-dismiss="modal">Cancel</button>
								</div>
							</div>
							<div class="col-lg-3">
								<div class="d-flex flex-center flex-row-fluid pt-12">
									<button type="submit" class="btn btn-primary" id="save_changes_productmaster">Save Changes</button>
								</div>
							</div>
						</div>		
						<!-- <div class="d-flex flex-center flex-row-fluid pt-12">
							<button type="reset" class="btn btn-secondary me-5" data-bs-dismiss="modal">Cancel</button>
							<button type="submit" class="btn btn-primary " id="">Save Changes</button>
						</div> -->
					</div>
					<!--end::Modal body-->
				</div>
				<!--end::Modal content-->
			</div>
			<!--end::Modal dialog-->
		<!-- </form> -->
	</div>
	<!--end::Modal - New Products Master-->

	<!--begin::Modal - Edit Products Master-->
	<div class="modal fade" id="kt_modal_edit_products_master" tabindex="-1" aria-hidden="true">
		
	</div>
	<!--end::Modal - Edit Products Master-->
<!--begin::Modal - View Products Master-->
	<div class="modal fade" id="kt_modal_view_products_master" tabindex="-1" aria-hidden="true">
		
	</div>
	<!--end::Modal - View Products Master-->
	<!--begin::Modal - delete Products Master-->
	<div class="modal fade" id="kt_modal_delete_products_master" tabindex="-1" aria-hidden="true">
		
	</div>
	<!--end::Modal - delete Products Master-->
	<input type="hidden" id="baseurl" value="<?php echo base_url();?>">
	<?php $this->load->view("script");?>
		<!-- <script src="js/products-list.js"></script> -->
		<script>
			$("#kt_datatable_responsive_product_master").DataTable({
				
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
	function activeunactive_master(val,ival) {
	var unactive;
	var unactv;
	var baseurl= $("#baseurl").val();
	var a = $("#activeunactive_master_"+ival).val();
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
		url:baseurl+'Productmaster/products_active',
		data:datastring,
		cache: false,
		dataType: "html",
		success: function(result){
			// alert(result+unactive);
			if(a=='N'){
	            $("#active_product_master").css('display','block');
				$("#active_product_master").addClass('response');
	        }else{
	            $("#deactive_product_master").css('display','block');
				$("#deactive_product_master").addClass('response');
	        }      
            setTimeout(function() {
	         window.location = baseurl+"Productmaster";
	        }, 3000);
		},
		error: function (error) {
			alert('error; ' + eval(error));
			setTimeout(function() {
	         window.location = baseurl+"Productmaster";
	        }, 3000);
		}
	});
}	
</script>	

<script>
	//View Modal

function productmaster_view(val)
	{
		var baseurl= $("#baseurl").val();
		// alert(baseurl);
		$.ajax({
		type: "POST",
		url: baseurl+'Productmaster/productmaster_view',
		async: false,
		type: "POST",
		data: "id="+val,
		dataType: "html",
		success: function(response)
		{
		$('#kt_modal_view_products_master').empty().append(response);
		$('#kt_modal_view_products_master').addClass('show');
		}
		});
	}
function closeViewModalProducts()
	{
		var baseurl= $("#baseurl").val();
		$('#kt_modal_view_products_master').removeClass('show');
		//$("#kt_modal_update_role").css("display", "none");
		$('.modal-backdrop').removeClass('show');
		window.location.href = baseurl+'Productmaster';
	}
</script>

<script>

function productmaster_delete(val)
{
	var baseurl= $("#baseurl").val();
	//alert(val);
	$.ajax({
	type: "POST",
	url: baseurl+'Productmaster/productmaster_delete',
	async: false,
	type: "POST",
	data: "id="+val,
	dataType: "html",
	success: function(response)
	{
	$('#kt_modal_delete_products_master').empty().append(response);
	$('#kt_modal_delete_products_master').addClass('show');
	//$("#kt_modal_delete_role").css("display", "block");
	}
	});
}

function removeproductmaster(val)

{ 
	var baseurl= $("#baseurl").val();
	$.ajax({
	type: "POST",
	url: baseurl+'Productmaster/delete',
	async: false,
	data:"field="+val,
	success: function(response)
	{
	window.location.href = baseurl+'Productmaster';
	}
	});
}

function closeDeleteModalProductmaster()
	{
		var baseurl= $("#baseurl").val();
		$('#kt_modal_delete_products_master').removeClass('show');
		$('.modal-backdrop').removeClass('show');
		window.location.href = baseurl+'Productmaster';
	}
</script>

<!--Modal - Edit Products-->

<script>

var title = $('title').text() + ' | ' + 'Productmaster';
$(document).attr("title", title);

function productmaster_edit(val)
{
	var baseurl= $("#baseurl").val();
	//alert(val);
	$.ajax({
	type: "POST",
	url: baseurl+'Productmaster/productmaster_edit',
	async: false,
	type: "POST",
	data: "id="+val,
	dataType: "html",
	success: function(response)
	{

	$('#kt_modal_edit_products_master').empty().append(response);
	$('#kt_modal_edit_products_master').addClass('show');
	//$("#kt_modal_editdept").css("display", "block");
	}
	});
}

function closeEditModalproductmaster()
{
	var baseurl= $("#baseurl").val();
	$('#kt_modal_edit_products_master').removeClass('show');
	//$("#kt_modal_update_role").css("display", "none");
	$('.modal-backdrop').removeClass('show');
	window.location.href = baseurl+'Productmaster';
}
</script>

<script>
function new_productmaster_validation()
{

	var err = 0;

	var add_itcode_prodmaster = $('#add_itcode_prodmaster').val();
    if(add_itcode_prodmaster.trim()=='')
    {
        $('#add_itcode_prodmaster_err').html('Enter Item Code!');
        err++;
    }
    else

    {
    	$('#add_itcode_prodmaster_err').html('');

    }

	var add_Iname_prodmaster = $('#add_Iname_prodmaster').val();
    if(add_Iname_prodmaster.trim()=='')
    {
        $('#add_Iname_prodmaster_err').html('Enter Item Name!');
        err++;
    }
    else

    {
    	$('#add_Iname_prodmaster_err').html('');

    }

    var add_mty_prodmaster= $('#add_mty_prodmaster').val();
    if(add_mty_prodmaster.trim()=='')
    {
        $('#add_mty_prodmaster_err').html('Enter Metal Type!');
        err++;
    }
    else

    {
    	$('#add_mty_prodmaster_err').html('');

    }


    var add_uty_prodmaster = $('#add_uty_prodmaster').val();
    if(add_uty_prodmaster.trim()=='')
    {
        $('#add_uty_prodmaster_err').html('Enter Unit Type!');
        err++;
    }
    else

    {
    	$('#add_uty_prodmaster_err').html('');

    }

    var add_cty_prodmaster = $('#add_cty_prodmaster').val();
    if(add_cty_prodmaster.trim()=='')
    {
        $('#add_cty_prodmaster_err').html('Enter Category!');
        err++;
    }
    else

    {
    	$('#add_cty_prodmaster_err').html('');

    }


    if(err>0){ return false; }else { return true; }

}	
</script>

<script>
function edit_productmaster_validation()
{
	var err1 = 0;
	// var edit_pid_prodmaster = $('#edit_pid_prodmaster').val();
 //    if(edit_pid_prodmaster.trim()=='')
 //    {
 //        $('#edit_pid_prodmaster_err').html('Enter Supplier Name!');
 //        err1++;
 //    }
 //    else

 //    {
 //    	$('#edit_suppname_supplier_err').html('');

 //    }

    var edit_itcode_prodmaster = $('#edit_itcode_prodmaster').val();
    if(edit_itcode_prodmaster.trim()=='')
    {
        $('#edit_itcode_prodmaster_err').html('Enter Item Code!');
        err1++;
    }
    else

    {
    	$('#edit_itcode_prodmaster_err').html('');

    }


    var edit_Iname_prodmaster = $('#edit_Iname_prodmaster').val();
    if(edit_Iname_prodmaster.trim()=='')
    {
        $('#edit_Iname_prodmaster_err').html('Enter Item name!');
        err1++;
    }
    else

    {
    	$('#edit_Iname_prodmaster_err').html('');

    }

    var edit_metal_prodmaster = $('#edit_metal_prodmaster').val();
    if(edit_metal_prodmaster.trim()=='')
    {
        $('#edit_metal_prodmaster_err').html('Enter Metal Type!');
        err1++;
    }
    else

    {
    	$('#edit_metal_prodmaster_err').html('');

    }


    var edit_unit_prodmaster = $('#edit_unit_prodmaster').val();
    if(edit_unit_prodmaster.trim()=='')
    {
        $('#edit_unit_prodmaster_err').html('Enter Unit Type!');
        err1++;
    }
    else

    {
    	$('#edit_unit_prodmaster_err').html('');

    }

    var edit_cty_prodmaster = $('#edit_cty_prodmaster').val();
    if(edit_cty_prodmaster.trim()=='')
    {
        $('#edit_cty_prodmaster_err').html('Please select Category!');
        err1++;
    }
    else

    {
    	$('#edit_cty_prodmaster_err').html('');

    }

    if(err1>0){ return false; }else { return true; }

}	
</script>

	</body>
	<!--end::Body-->
</html>