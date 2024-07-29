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
									<h1 class="d-flex align-items-center text-dark fw-bold my-1 fs-3">Sub Item List
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
			                         <div class="alert alert-success alert-dismissible" style="display:none;" id="active_subitem_master" role="alert">
			                           <!--  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			                            </button> -->
			                            Subitem has been activated successfully
			                        </div>
			                        <div class="alert alert-danger alert-dismissible" style="display:none;" id="deactive_subitem_master" role="alert">
			                           <!--  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			                            </button> -->
			                            Subitem has been deactivated successfully
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
											
											<button type="button" class="btn btn-primary"  data-bs-toggle="modal" data-bs-target="#kt_modal_add_newsubitem">
											<!--begin::Svg Icon | path: icons/duotune/arrows/arr075.svg-->
											<span class="svg-icon svg-icon-2">
												<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
													<rect opacity="0.5" x="11.364" y="20.364" width="16" height="2" rx="1" transform="rotate(-90 11.364 20.364)" fill="currentColor" />
													<rect x="4.36396" y="11.364" width="16" height="2" rx="1" fill="currentColor" />
												</svg>
											</span>
											<!--end::Svg Icon-->New SubItem</button>
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
									<table class="table align-middle table-row-dashed table-striped table-hover fs-6 gy-1 gs-2" id="kt_datatable_dom_positioning">
										<!--begin::Table head-->
										<thead>
											<!--begin::Table row-->
											<tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">
												
												<th class="min-w-125px" style="width: 20%;" >Category</th>
												<th class="min-w-125px" style="width: 30%;" >Item Name</th>
												<th class="min-w-125px" style="width: 30%;" >Sub Item Name</th>
												<th class="min-w-125px" style="width: 10%;" >Item Prefix</th>
												<th class="min-w-125px" style="width: 5%;">Status</th>
												<th class="min-w-125px" style="width: 15%;"><span class="text-end">Actions</span></th>
											</tr>
											<!--end::Table row-->
										</thead>
										<!--end::Table head-->
										<!--begin::Table body-->
										<tbody class="text-gray-600 fw-semibold">
											<!--begin::Table row-->
											<?php $i=1; foreach($Subitem_list as $sublist){?>
											<tr>
												<td><?php echo $sublist['ITEM_CATEGORY'];?></td>
												<td><?php echo $sublist['ITEM_NAME'];?></td>
												<td><?php echo $sublist['SUBITEM_NAME'];?></td>
												<td><?php echo $sublist['ITEM_PREFIX'];?></td> 
												<td>
													<label class="form-check form-switch form-check-custom form-check-solid">
														<!-- <input class="form-check-input" type="checkbox" value="1" checked="checked"> -->
														<input class="form-check-input w-35px h-20px" type="checkbox" <?php if($sublist['STATUS']=='Y'){echo "checked";} ?> id="activeunactive_subitems_<?php echo $i;?>" name="activeunactive_subitems_<?php echo $i;?>" onchange="activeunactive_subitems('<?php echo $sublist['SUB_ID']; ?>',<?php echo $i;?>)" value="<?php echo $sublist['STATUS'];?>">
													</label>
												</td>
												<!--begin::Action=-->
												<td>
													<span class="text-end">
													<!-- <a href="#" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm" data-bs-toggle="modal" data-bs-target="#kt_modal_viewdept">
														<i class="bi bi-eye-fill eyc"></i>
													</a> -->
													<a href="javascript:;" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1" data-bs-toggle="modal" data-bs-target="#kt_modal_edit_subitem" onclick="subitem_edit('<?php echo $sublist['SUB_ID'];?>')">
																		<!--begin::Svg Icon | path: icons/duotune/art/art005.svg-->
																		<span class="svg-icon svg-icon-3">
																			<svg width="24" height="24" 	viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																				<path opacity="0.3" d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z" fill="currentColor"></path>
																				<path d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z" fill="currentColor"></path>
																			</svg>
																		</span>
																		<!--end::Svg Icon-->
																	</a>
													<a href="javascript:;" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm" data-bs-toggle="modal" data-bs-target="#kt_modal_delete_subitem" onclick="subitem_delete('<?php echo $sublist['SUB_ID'];?>')">
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
		<div class="modal fade" id="kt_modal_add_newsubitem" tabindex="-1" aria-hidden="true">
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
					<form name="Subitem_add_form" id="Subitem_add_form" method="POST" action="<?php echo base_url(); ?>Subitem/Subitem_save" enctype="multipart/form-data" onsubmit="return new_subitem_validation();">
						<div class="modal-body pt-0 pb-15 px-5 px-xl-20">
							<!--begin::Heading-->
							<div class="mb-13 text-center">
								<h1 class="mb-3">New SubItem</h1>	
							</div>
							<!--end::Heading-->
							<!-- <input type="hidden" id="subitem_category" name="subitem_category" value="<?php echo $sublist->ITEM_CATEGORY;?>">
							<input type="hidden" id="subitem_prefix" name="subitem_prefix" value="<?php echo $subitem_details->ITEM_PREFIX;?>"> -->
						<div class="repeater">
								    <div class="row">
								    <label class="col-lg-2 col-form-label required fw-semibold fs-6 data-fields" data-parent="question_type" data-sub="">Item Name</label>
										<div class="col-lg-3 data-fields" data-parent="question_type" data-sub="CASH">
											<select class="form-select form-select-solid" data-control="select2" name="itemname_sub"  id="itemname_sub" data-hide-search="true">
												<option value="">Select</option>

												 	<?php foreach($itemname_list as $itemnamelist)
													{?>
													<option value="<?php echo $itemnamelist['ITEMNAME'];?>"><?php echo $itemnamelist['ITEMNAME'];?></option><?php
													 }?>
											</select>
											<div class="fv-plugins-message-container invalid-feedback" id="itemname_sub_err"></div>
										</div>
										<label class="col-lg-2 col-form-label required fw-semibold fs-6">Subitem Name</label>
										<div class="col-lg-3">
											<input type="text" class="form-control form-control-lg form-control-solid" placeholder="Details" name="Subitem_Sub" id="subitem_Sub"/>
											<div class="fv-plugins-message-container invalid-feedback" id="subitem_Sub_err"></div>
										</div>
										<div class="col-lg-1 del" style="display: none;">
											<a href="javascript:;" class="btn btn-sm btn-danger mt-md-3 btn-delete">
											<i class="la la-trash-o fs-3"></i></a>
										</div>
								    </div>
								</div>
								<div class="form-group">
									<a href="javascript:;" class="btn btn-sm btn-outline btn-outline-solid btn-outline-warning btn-active-light-primary me-2 btn-add" value="1">
									Add</a>
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
		<div class="modal fade" id="kt_modal_edit_subitem" tabindex="-1" aria-hidden="true">
			
		</div>
		<!--end::Modal - edit company-->
		<!--begin::Modal - view company-->

		<!--begin::Modal - delete item-->
		<div class="modal fade" id="kt_modal_delete_subitem" tabindex="-1" aria-hidden="true">
			
		</div>
		<!--end::Modal - delete item-->
		<input type="hidden" id="baseurl" value="<?php echo base_url();?>">
		<?php $this->load->view("script");?>
<script>

var title = $('title').text() + ' | ' + 'Subitem';
    $(document).attr("title", title);

function subitem_edit(val){
var baseurl= $("#baseurl").val();
//alert(val);
$.ajax({
type: "POST",
url: baseurl+'Subitem/subitem_edit',
async: false,
type: "POST",
data: "id="+val,
dataType: "html",
success: function(response)
{
$('#kt_modal_edit_subitem').empty().append(response);
$('#kt_modal_edit_subitem').addClass('show');
//$("#kt_modal_editdept").css("display", "block");
}
});
}

function closeEditModal()
{
	var baseurl= $("#baseurl").val();
	$('#kt_modal_edit_subitem').removeClass('show');
	//$("#kt_modal_update_role").css("display", "none");
	$('.modal-backdrop').removeClass('show');
	window.location.href = baseurl+'Subitem';
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

function subitem_delete(val){
var baseurl= $("#baseurl").val();
//alert(val);
$.ajax({
type: "POST",
url: baseurl+'subitem/subitem_delete',
async: false,
type: "POST",
data: "id="+val,
dataType: "html",
success: function(response)
{
$('#kt_modal_delete_subitem').empty().append(response);
$('#kt_modal_delete_subitem').addClass('show');
//$("#kt_modal_delete_role").css("display", "block");
}
});
}

function removeSubItem(val)
{ 
var baseurl= $("#baseurl").val();
$.ajax({
type: "POST",
url: baseurl+'Subitem/delete',
async: false,
data:"field="+val,
success: function(response)
{
window.location.href = baseurl+'Subitem';
}
});
}

function closeDeleteModal()
{
	var baseurl= $("#baseurl").val();
	$('#kt_modal_delete_subitem').removeClass('show');
	$('.modal-backdrop').removeClass('show');
	window.location.href = baseurl+'Subitem';
}


			/*$("#kt_datatable_dom_positioning").DataTable({
				"ordering": false,
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
});*/

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

<script>
	function activeunactive_subitems(val,ival) {
	var unactive;
	var unactv;
	var baseurl= $("#baseurl").val();
	var a = $("#activeunactive_subitems_"+ival).val();
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
	            $("#active_subitem_master").css('display','block');
				$("#active_subitem_master").addClass('response');
	        }else{
	            $("#deactive_subitem_master").css('display','block');
				$("#deactive_subitem_master").addClass('response');
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
function new_subitem_validation()
{

	var err = 0;

	var itemname_sub = $('#itemname_sub').val();
    if(itemname_sub.trim()=='')
    {
        $('#itemname_sub_err').html('Select Item Name!');
        err++;
    }
    else

    {
    	$('#itemname_sub_err').html('');

    }

	var subitem_Sub = $('#subitem_Sub').val();
    if(subitem_Sub.trim()=='')
    {
        $('#subitem_Sub_err').html('Enter Sub item!');
        err++;
    }
    else

    {
    	$('#subitem_Sub_err').html('');

    }


    if(err>0){ return false; }else { return true; }

}	
</script>

<script>
function edit_subitem_validation()
{

	var err = 0;

	var itemname_sub_edit = $('#itemname_sub_edit').val();
    if(itemname_sub_edit.trim()=='')
    {
        $('#itemname_sub_edit_err').html('Select Item Name!');
        err++;
    }
    else

    {
    	$('#itemname_sub_edit_err').html('');

    }

	var subitemname_edit = $('#subitemname_edit').val();
    if(subitemname_edit.trim()=='')
    {
        $('#subitemname_edit_err').html('Enter Sub Item!');
        err++;
    }
    else

    {
    	$('#subitemname_edit_err').html('');

    }

    if(err>0){ return false; }else { return true; }

}	
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
	</body>
	<!--end::Body-->
</html>