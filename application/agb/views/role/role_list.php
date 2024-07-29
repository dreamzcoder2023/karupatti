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
									<h1 class="d-flex align-items-center text-dark fw-bold my-1 fs-3">Role List
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
											<a href="<?php echo base_url();?>Role/role_add">
											<button type="button" class="btn btn-primary"  data-bs-toggle="modal" >
											<!--begin::Svg Icon | path: icons/duotune/arrows/arr075.svg-->
											<span class="svg-icon svg-icon-2">

												<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
													<rect opacity="0.5" x="11.364" y="20.364" width="16" height="2" rx="1" transform="rotate(-90 11.364 20.364)" fill="currentColor" />
													<rect x="4.36396" y="11.364" width="16" height="2" rx="1" fill="currentColor" />
												</svg>
											</span>
											<!--end::Svg Icon-->New Role</button></a>
											<!--end::Add user-->
										</div>
										<!--end::Toolbar-->									
										
									</div>
									<!--end::Card toolbar-->
								</div>
								<!--end::Card header-->
								<!--begin::Card body-->
								<div class="card-body py-4">
									<!--begin::Table-->
									<table class="table align-middle table-row-dashed table-striped table-hover fs-6 gy-1 gs-2" id="kt_datatable_role_list">
										<!--begin::Table head-->
										<thead>
											<!--begin::Table row-->
											<tr class="text-start text-muted fw-bold fs-7 gs-0">
												
												<!-- <th class="min-w-125px cy" style="width: 20%;">Company</th> -->
												<th class="min-w-125px" style="width: 60%;" >Role Name</th>
												<th class="min-w-125px" style="width: 5%;">Status</th>
												<th class="min-w-125px" style="width: 15%;"><span class="text-end">Actions</span></th>
											</tr>
											<!--end::Table row-->
										</thead>
										<!--end::Table head-->
										<!--begin::Table body-->
										<tbody class="text-gray-600 fw-semibold">
											<!--begin::Table row-->
											<?php $i=1; foreach($role_list as $dlist){?>
											<tr>
												
												<td><?php echo $dlist['ROLENAME'];?></td>
												<td>
													<label class="form-check form-switch form-check-custom form-check-solid">
															<!-- <input class="form-check-input" type="checkbox" value="1" checked="checked"> -->
															<input class="form-check-input w-35px h-20px" type="checkbox" <?php if($dlist['STATUS']==0){echo "checked";} ?> id="activeunactive_<?php echo $i;?>"  name="activeunactive_<?php echo $i;?>" onchange="activeunactive(<?php echo $dlist['ROLEID']; ?>,<?php echo $i; ?>)" value="<?php echo $dlist['STATUS'];?>">
													</label>
												</td>
												<!--begin::Action=-->
												<td>
													<span class="text-end">
													<!-- <a href="javascript:;" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm" data-bs-toggle="modal" data-bs-target="#kt_modal_viewdept">
														<i class="bi bi-eye-fill eyc"></i>
													</a> -->
													<!-- <a href="javascript:;" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1" data-bs-toggle="modal" data-bs-target="#kt_modal_editdept" onclick="role_edit('<?php echo $dlist['ROLEID'];?>')"> -->
														<a href="<?php echo base_url();?>Role/role_edit/<?php echo $dlist['ROLEID'];?>" data-toggle="m-tooltip" data-placement="top" title="Update">
														<!-- <a href="javascript:;" onclick="role_edit('<?php echo $dlist['ROLEID'];?>')"> -->
																		<!--begin::Svg Icon | path: icons/duotune/art/art005.svg-->
																		<span class="svg-icon svg-icon-3">
																			<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																				<path opacity="0.3" d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z" fill="currentColor"></path>
																				<path d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z" fill="currentColor"></path>
																			</svg>
																		</span>
																		<!--end::Svg Icon-->
																	</a>
													<a href="javascript:;" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm" data-bs-toggle="modal" data-bs-target="#kt_modal_delete_role" onclick="role_delete('<?php echo $dlist['ROLEID'];?>')">
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
		<!--begin::Modal - add role-->
		<div class="modal fade" id="kt_modal_adddept" tabindex="-1" aria-hidden="true">
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
					<form name="role_add_form" id="role_add_form" method="POST" action="<?php echo base_url(); ?>Role/role_save" enctype="multipart/form-data" onsubmit="return role_validation();">
						<div class="modal-body pt-0 pb-15 px-5 px-xl-20">
							<!--begin::Heading-->
							<div class="mb-13 text-center">
								<h1 class="mb-3">New Role</h1>
							</div>
								<div class="row mb-6">
									<!--begin::Label-->
													<label class="col-lg-4 col-form-label required fw-semibold fs-6">Dept</label>
													<!--end::Label-->
													<!--begin::Col-->
													<div class="col-lg-8 fv-row fv-plugins-icon-container">
														<input type="text" id="role" name="role" class="form-control form-control-lg form-control-solid" placeholder="Role Name" onkeyup="role_unique(this.value);">
														<div class="fv-plugins-message-container invalid-feedback" id="role_err"></div>
													</div>
													<!--end::Col-->	
								</div>
							<!--begin::Actions-->
							<div class="row">
								<div class="col-lg-4"></div>
								<div class="col-lg-2">
									<div class="d-flex flex-center flex-row-fluid pt-12">
										<button type="reset" class="btn btn-secondary me-3" data-bs-dismiss="modal">Cancel</button>
									</div>
								</div>
								<div class="col-lg-6">
									<div class="d-flex flex-center flex-row-fluid pt-12">
										<button type="submit" class="btn btn-success">Save Changes</button>
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
		<!--end::Modal - add role-->
		
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
							<h1 class="mb-3">Role Details</h1>
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
													<input type="text" name="company" class="form-control form-control-lg form-control-solid" placeholder="Role Name" Value="Accounts" disabled>
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
		<!--begin::Modal - delete role-->
		<div class="modal fade" id="kt_modal_delete_role" tabindex="-1" aria-hidden="true">
			<!--begin::Modal dialog-->
			<div class="modal-dialog modal-m">
				<!--begin::Modal content-->
				<div class="modal-content rounded">
					<div class="swal2-icon swal2-warning swal2-icon-show" style="display:flex;">
						<div class="swal2-icon-content">!</div></div>
						<br><br>
				</div>
				<!--end::Modal content-->
			</div>
			<!--end::Modal dialog-->			
		</div>
		<!--end::Modal - delete role-->
		<input type="hidden" id="baseurl" value="<?php echo base_url();?>">
		<?php $this->load->view("script");?>
		<script>

var title = $('title').text() + ' | ' + 'Role';
    $(document).attr("title", title);

function role_edit(val){
var baseurl= $("#baseurl").val();

// alert(val);
$.ajax({
url: baseurl+'Role/role_edit',
async: false,
type: "POST",
data: "id="+val,
dataType: "html",
success: function(response)
{
	window.location.href = baseurl+'Role/role_edit';
// $('#kt_modal_editdept').empty().append(response);
// $('#kt_modal_editdept').addClass('show');
// $("#kt_modal_editdept").css("display", "block");
}
});

}

function closeEditModal()
{
	var baseurl= $("#baseurl").val();
	$('#kt_modal_editdept').removeClass('show');
	//$("#kt_modal_update_role").css("display", "none");
	$('.modal-backdrop').removeClass('show');
	window.location.href = baseurl+'Role';
}


var berr=0;
function role_unique(val)
{
	var baseurl= $("#baseurl").val();
	$.ajax({
		type:"POST",
		url:baseurl+'Role/role_unique',
		data:{'value':val},
		cache: false,
		dataType: "html",
			success: function(result){
			if(result>0)
			{
				$('#role_err').html('Role already exist!');
				berr=1;
			}
			else
			{
				$('#role_err').html('');
				berr=0;
			}
		}
	});
}
function role_validation()
{
	var err = 0;
	var role_name = $('#role').val();

    if(role_name.trim()==''){
        $('#role_err').html('Enter Role!');
        err++;
    }else{
        //$('#role_err').html('');
        if(berr>0)
		{
			$('#role_err').html('Role already exist!');
			err++;
		}
		else
		{
			$('#role_err').html('');
		}
    }
    
    if(err>0){ return false; }else{ return true; }
}		


var berre=0;
function role_unique_edit(val,dcid)
{
	var baseurl= $("#baseurl").val();
	$.ajax({
		type:"POST",
		url:baseurl+'Role/role_unique_edit',
		data:{'value':val,'dcid':dcid},
		cache: false,
		dataType: "html",
			success: function(result){
			if(result>0)
			{
				$('#role_edit_err').html('Role already exist!');
				berre=1;
			}
			else
			{
				$('#role_edit_err').html('');
				berre=0;
			}
		}
	});
}
function role_edit_validation()
{
	var erre = 0;
	var role = $('#role_edit').val();

    if(role.trim()==''){
        $('#role_edit_err').html('Enter Role Name!');
        erre++;
    }else{
        //$('#role_err').html('');
        if(berre>0)
		{
			$('#role_edit_err').html('Role already exist!');
			erre++;
		}
		else
		{
			$('#role_edit_err').html('');
		}
    }
    
    if(erre>0){ return false; }else{ return true; }
}



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
		url:baseurl+'Role/role_active',
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
	         window.location = baseurl+"Role";
	        }, 3000);
		},
		error: function (error) {
			alert('error; ' + eval(error));
			setTimeout(function() {
	         window.location = baseurl+"Role";
	        }, 3000);
		}
	});
}



function role_delete(val){
var baseurl= $("#baseurl").val();
//alert(val);
$.ajax({
type: "POST",
url: baseurl+'Role/role_delete',
async: false,
type: "POST",
data: "id="+val,
dataType: "html",
success: function(response)
{
$('#kt_modal_delete_role').empty().append(response);
$('#kt_modal_delete_role').addClass('show');
//$("#kt_modal_delete_role").css("display", "block");
}
});
}

function removeRole(val)
{ 
var baseurl= $("#baseurl").val();
$.ajax({
type: "POST",
url: baseurl+'Role/delete',
async: false,
data:"field="+val,
success: function(response)
{
window.location.href = baseurl+'Role';
}
});
}

function closeDeleteModal()
{
	var baseurl= $("#baseurl").val();
	$('#kt_modal_delete_role').removeClass('show');
	$('.modal-backdrop').removeClass('show');
	window.location.href = baseurl+'Role';
}

	</script>
	<script>
	$('#kt_datatable_role_list').DataTable( {
		"aaSorting": [],
		"responsive": true,
        dom: 'Bfrtip',
        buttons: [
        			{
			            extend: 'copyHtml5',
			            title: 'Role List',
	                    exportOptions: {columns: [0]}
	                },
	                {
	                    extend: 'excelHtml5',
	                    title: 'Role List',
	                    exportOptions: {columns: [0]}
	                },
	                {
	                    extend: 'csvHtml5',
	                    title: 'Role List',
	                    exportOptions: {columns: [0]}
	                },
	                {
	                    extend: 'pdfHtml5',
	                    title: 'Role List',
	                    exportOptions: {columns: [0]}
	                },
        ]
    } );		
</script>
	</body>
	<!--end::Body-->
</html>