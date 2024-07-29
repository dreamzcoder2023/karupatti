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
									<h1 class="d-flex align-items-center text-dark fw-bold my-1 fs-3">Manage System
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
                            <!-- <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            </button> -->
                            System has been activated successfully
                        </div>
                        <div class="alert alert-danger alert-dismissible" style="display:none;" id="deactive" role="alert">
                            <!-- <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            </button> -->
                            System has been deactivated successfully
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
										<!--begin::Export-->
										<!--	<button type="button" class="btn btn-primary me-3" data-bs-toggle="modal" data-bs-target="#kt_modal_export_users">-->
											<!--begin::Svg Icon | path: icons/duotune/arrows/arr078.svg-->
										<!--	<span class="svg-icon svg-icon-2">
												<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
													<rect opacity="0.3" x="12.75" y="4.25" width="12" height="2" rx="1" transform="rotate(90 12.75 4.25)" fill="currentColor" />
													<path d="M12.0573 6.11875L13.5203 7.87435C13.9121 8.34457 14.6232 8.37683 15.056 7.94401C15.4457 7.5543 15.4641 6.92836 15.0979 6.51643L12.4974 3.59084C12.0996 3.14332 11.4004 3.14332 11.0026 3.59084L8.40206 6.51643C8.0359 6.92836 8.0543 7.5543 8.44401 7.94401C8.87683 8.37683 9.58785 8.34458 9.9797 7.87435L11.4427 6.11875C11.6026 5.92684 11.8974 5.92684 12.0573 6.11875Z" fill="currentColor" />
													<path opacity="0.3" d="M18.75 8.25H17.75C17.1977 8.25 16.75 8.69772 16.75 9.25C16.75 9.80228 17.1977 10.25 17.75 10.25C18.3023 10.25 18.75 10.6977 18.75 11.25V18.25C18.75 18.8023 18.3023 19.25 17.75 19.25H5.75C5.19772 19.25 4.75 18.8023 4.75 18.25V11.25C4.75 10.6977 5.19771 10.25 5.75 10.25C6.30229 10.25 6.75 9.80228 6.75 9.25C6.75 8.69772 6.30229 8.25 5.75 8.25H4.75C3.64543 8.25 2.75 9.14543 2.75 10.25V19.25C2.75 20.3546 3.64543 21.25 4.75 21.25H18.75C19.8546 21.25 20.75 20.3546 20.75 19.25V10.25C20.75 9.14543 19.8546 8.25 18.75 8.25Z" fill="currentColor" />
												</svg>
											</span>-->
											<!--end::Svg Icon--><!--Export</button>-->
											<!--end::Export-->
										<!--	<button type="button" class="btn btn-primary"  data-bs-toggle="modal" data-bs-target="#" style="margin-right: 10px !important;">Reset Active</button>-->
											<!--begin::Add user-->
											<button type="button" class="btn btn-primary"  data-bs-toggle="modal" data-bs-target="#kt_modal_add_system">
											<!--begin::Svg Icon | path: icons/duotune/arrows/arr075.svg-->
											<span class="svg-icon svg-icon-2">
												<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
													<rect opacity="0.5" x="11.364" y="20.364" width="16" height="2" rx="1" transform="rotate(-90 11.364 20.364)" fill="currentColor" />
													<rect x="4.36396" y="11.364" width="16" height="2" rx="1" fill="currentColor" />
												</svg>
											</span>
											<!--end::Svg Icon-->New System</button>
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
														<h2 class="fw-bold">Export System</h2>
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
									<table class="table align-middle table-row-dashed table-striped table-hover fs-7 gy-1 gs-2" id="kt_datatable_dom_positioning_systems">
										<!--begin::Table head-->
										<thead>
											<!--begin::Table row-->
										<tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">
											<th class="min-w-125px cy" style="width: 27%;">System Name</th>
											<th class="min-w-125px" style="width: 26%;">System Code</th>
											<th class="min-w-125px" style="width: 27%;">Loan Prefix</th>
											<th class="min-w-125px" style="width: 10%;">Status</th>
											<th class="min-w-125px" style="width: 10%;"><span class="text-end">Actions</span></th>
											</tr>
											<!--end::Table row-->
										</thead>
										<!--end::Table head-->
										<!--begin::Table body-->
										<tbody class="text-gray-600 fw-semibold">
											<!--begin::Table row-->

											<?php $i=1; foreach($systems_list as $slist){?>
											<tr>
												<!--begin::Joined-->
												<td><?php echo $slist['SYS_NAME'];?></td>
												<td><?php echo $slist['SYS_CODE'];?></td>
												<td><?php echo $slist['LOANPREFIX'];?></td>
												<td>
													<label class="form-check form-switch form-check-custom form-check-solid">
															<!-- <input class="form-check-input" type="checkbox" value="1" checked="checked"> -->
															<input class="form-check-input w-35px h-20px" type="checkbox" <?php if($slist['ACTIVE']=='Y'){echo "checked";} ?> id="activeunactive_systems_<?php echo $i;?>"  name="activeunactive_systems_<?php echo $i;?>" onchange="activeunactive_systems('<?php echo $slist['SYS_ID']; ?>',<?php echo $i;?>)" value="<?php echo $slist['ACTIVE'];?>">
													</label>
												</td>
												<!--begin::Actions=-->
												<td>
													<span class="text-end">
													
													<a href="javascript:;" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1" data-bs-toggle="modal" data-bs-target="#kt_modal_edit_system" onclick="systems_edit('<?php echo $slist['SYS_ID'];?>')">
																		<!--begin::Svg Icon | path: icons/duotune/art/art005.svg-->
																		<span class="svg-icon svg-icon-3">
																			<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																				<path opacity="0.3" d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z" fill="currentColor"></path>
																				<path d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z" fill="currentColor"></path>
																			</svg>
																		</span>
																		<!--end::Svg Icon-->
																	</a>
																	<a href="javascript:;" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm" data-bs-toggle="modal" data-bs-target="#kt_modal_delete_system" onclick="systems_delete('<?php echo $slist['SYS_ID'];?>')">
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
	<!--begin::Modal - add system-->
		<div class="modal fade" id="kt_modal_add_system" tabindex="-1" aria-hidden="true">
			<!-- <form id="kt_add_systems_list_form" class="form"> JS Validation ID-->
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
					<form name="add_systems_list_form" id="add_systems_list_form" method="POST" action="<?php echo base_url();?>systems/systems_save" enctype="multipart/form-data" onsubmit="return systems_validation();">
						<div class="modal-body pt-0 pb-15 px-5 px-xl-20">
							<!--begin::Heading-->
							<div class="mb-13 text-center">
								<h1 class="mb-3">New System</h1>
							</div>
							<!--end::Heading-->
						
							<div class="row mb-6">
								<!--begin::Label-->
								<label class="col-lg-4 col-form-label required fw-semibold fs-6">System Name</label>
								<!--end::Label-->
								<!--begin::Col-->
								<div class="col-lg-8 fv-row fv-plugins-icon-container">
									<input type="text" name="systems_name"  id="systems_name" class="form-control form-control-lg form-control-solid" 
									placeholder="Systems Name" onkeyup="systems_name_unique(this.value);">
									<div class="fv-plugins-message-container invalid-feedback" 
									id="systems_name_err"></div>
								</div>
								<!--end::Col-->
								</div>	
								<div class="row mb-6">
								<!--begin::Label-->
								<label class="col-lg-4 col-form-label required fw-semibold fs-6">System Code</label>
								<!--end::Label-->
								<!--begin::Col-->
								<div class="col-lg-8 fv-row fv-plugins-icon-container">
									<input type="text" name="systems_code" id="systems_code" class="form-control form-control-lg form-control-solid" placeholder="System Code"onkeyup="systems_code_unique(this.value);">
									<div class="fv-plugins-message-container invalid-feedback" 
									id="systems_code_err"></div>
								</div>
								<!--end::Col-->
							</div>
							<div class="row mb-6">
								<!--begin::Label-->
								<label class="col-lg-4 col-form-label required fw-semibold fs-6">Loan Prefix</label>
								<!--end::Label-->
								<!--begin::Col-->
								<div class="col-lg-8 fv-row fv-plugins-icon-container">
									<input type="text" name="loanprefix" id="loanprefix" class="form-control form-control-lg form-control-solid" placeholder="Loan Prefix" 
									onkeyup="loanprefix_unique(this.value);">
									<div class="fv-plugins-message-container invalid-feedback" 
									id="loanprefix_err"></div>
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
										<button type="submit" class="btn btn-primary" id="save_changes_add_systems">Save Changes</button>
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
		<!--end::Modal - add system-->
		<!--begin::Modal - edit system-->
		<div class="modal fade" id="kt_modal_edit_system" tabindex="-1" aria-hidden="true">
			
		</div>
		<!--end::Modal - edit system-->
		<!--begin::Modal - delete system-->
		<div class="modal fade" id="kt_modal_delete_system" tabindex="-1" aria-hidden="true">
			
		</div>
		<!--end::Modal - delete system-->
		<input type="hidden" id="baseurl" value="<?php echo base_url();?>">
		<?php $this->load->view("script");?>
		<!-- <script src="js/systems-list.js"></script> -->
<script>
// $("#kt_datatable_dom_positioning").DataTable({
// 	 // "ordering": false,
// 	 "aaSorting":[],
//  "language": {
//   "lengthMenu": "Show _MENU_",
//    },
//  "dom":
//   "<'row'" +
//   "<'col-sm-6 d-flex align-items-center justify-conten-start'l>" +
//   "<'col-sm-6 d-flex align-items-center justify-content-end'f>" +
//   ">" +

//   "<'table-responsive'tr>" +

//   "<'row'" +
//   "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
//   "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
//   ">"
// });

$('#kt_datatable_dom_positioning_systems').DataTable( {
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

<!--List page status  Verification-->

<script>
	function activeunactive_systems(val,ival) {
	var unactive;
	var unactv;
	var baseurl= $("#baseurl").val();
	var a = $("#activeunactive_systems_"+ival).val();
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
		url:baseurl+'systems/systems_active',
		data:datastring,
		cache: false,
		dataType: "html",
		success: function(result){
			// alert(result+unactive);
			if(a=='N'){
	            $("#active").css('display','block');
				$("#active").addClass('response');
	        }else{
	            $("#deactive").css('display','block');
				$("#deactive").addClass('response');
	        }      
            setTimeout(function() {
	         window.location = baseurl+"systems";
	        }, 3000);
		},
		error: function (error) {
			alert('error; ' + eval(error));
			setTimeout(function() {
	         window.location = baseurl+"systems";
	        }, 3000);
		}
	});
}	
</script>

<!--New Systems - Unique check-->
<script>
var snberr=0;
function systems_name_unique(val)
{
	var baseurl= $("#baseurl").val();
	$.ajax({
		type:"POST",
		url:baseurl+'systems/systems_name_unique',
		data:{'value':val},
		cache: false,
		dataType: "html",
			success: function(result){
			if(result>0)
			{
				$('#systems_name_err').html('System Name already exist!');
				snberr=1;
			}
			else
			{
				$('#systems_name_err').html('');
				snberr=0;
			}
		}
	});
}
</script>

<script>
var scberr=0;
function systems_code_unique(val)
{
	var baseurl= $("#baseurl").val();
	$.ajax({
		type:"POST",
		url:baseurl+'systems/systems_code_unique',
		data:{'value':val},
		cache: false,
		dataType: "html",
			success: function(result){
			if(result>0)
			{
				$('#systems_code_err').html('System Code already exist!');
				scberr=1;
			}
			else
			{
				$('#systems_code_err').html('');
				scberr=0;
			}
		}
	});
}
</script>
<script>
var lpberr=0;
function loanprefix_unique(val)
{
	var baseurl= $("#baseurl").val();
	$.ajax({
		type:"POST",
		url:baseurl+'systems/loanprefix_unique',
		data:{'value':val},
		cache: false,
		dataType: "html",
			success: function(result){
			if(result>0)
			{
				$('#loanprefix_err').html('Loan Prefix already exist!');
				lpberr=1;
			}
			else
			{
				$('#loanprefix_err').html('');
				lpberr=0;
			}
		}
	});
}
</script>

<!--New Systems - Validation check-->
<script>
function systems_validation()
{
	//system Name empty Check
	var err = 0;
	var systems_name = $('#systems_name').val();

    if(systems_name.trim()==''){
        $('#systems_name_err').html('Enter System!');
        err++;
    }else{
        //$('#systems_err').html('');
        if(snberr>0)
		{
			$('#systems_name_err').html('System already exist!');
			err++;
		}
		else
		{
			$('#systems_name_err').html('');
		}
    }
    //System Code empty Check
	var systems_code = $('#systems_code').val();

    if(systems_code.trim()==''){
        $('#systems_code_err').html('Enter System Code!');
        err++;
    }else{
        if(scberr>0)
		{
			$('#systems_code_err').html('System Code already exist!');
			err++;
		}
		else
		{
			$('#systems_code_err').html('');
		}
    }
    //Loan Prefix empty Check
	var loanprefix = $('#loanprefix').val();

    if(loanprefix.trim()==''){
        $('#loanprefix_err').html('Enter Loan Prefix!');
        err++;
    }else{
        if(lpberr>0)
		{
			$('#loanprefix_err').html('Loan Prefix exist!');
			err++;
		}
		else
		{
			$('#loanprefix_err').html('');
		}
    }
    
   if(err>0){ return false; }else { return true; }
}		
</script>
 
 <!--Modal - Systems Delete -->
<script>

function systems_delete(val){
	var baseurl= $("#baseurl").val();
	//alert(val);
	$.ajax({
	type: "POST",
	url: baseurl+'systems/systems_delete',
	async: false,
	type: "POST",
	data: "id="+val,
	dataType: "html",
	success: function(response)
	{
	$('#kt_modal_delete_system').empty().append(response);
	$('#kt_modal_delete_system').addClass('show');
	//$("#kt_modal_delete_role").css("display", "block");
	}
	});
	}

function removeSystems(val)

	{ 
	var baseurl= $("#baseurl").val();
	$.ajax({
	type: "POST",
	url: baseurl+'systems/delete',
	async: false,
	data:"field="+val,
	success: function(response)
	{
	window.location.href = baseurl+'systems';
	}
	});
	}

function closeDeleteModalSystems()
	{
		var baseurl= $("#baseurl").val();
		$('#kt_modal_delete_system').removeClass('show');
		$('.modal-backdrop').removeClass('show');
		window.location.href = baseurl+'systems';
	}
</script>

<!--Modal - Systems Edit -->

<script>
	
	var title = $('title').text() + ' | ' + 'systems';
	$(document).attr("title", title);

function systems_edit(val)
{
	var baseurl= $("#baseurl").val();
	//alert(val);
	$.ajax({
	type: "POST",
	url: baseurl+'systems/systems_edit',
	async: false,
	type: "POST",
	data: "id="+val,
	dataType: "html",
	success: function(response)
	{

	$('#kt_modal_edit_system').empty().append(response);
	$('#kt_modal_edit_system').addClass('show');
	//$("#kt_modal_editdept").css("display", "block");
	}
	});
}

function closeEditModalsystems()
{
	var baseurl= $("#baseurl").val();
	$('#kt_modal_edit_system').removeClass('show');
	//$("#kt_modal_update_role").css("display", "none");
	$('.modal-backdrop').removeClass('show');
	window.location.href = baseurl+'systems';
}

</script>
<script>
//Edit Modal - Unique Check

var snberre=0;
function systems_name_unique_edit(val)
{
	var baseurl= $("#baseurl").val();
	$.ajax({
		type:"POST",
		url:baseurl+'systems/systems_name_unique_edit',
		data:{'value':val},
		cache: false,
		dataType: "html",
			success: function(result){
			if(result>0)
			{
				$('#systems_name_edit_err').html('System Name already exist!');
				snberre=1;
			}
			else
			{
				$('#systems_name_edit_err').html('');
				snberre=0;
			}
		}
	});
}

var scberre=0;
function systems_code_unique_edit(val)
{
	var baseurl= $("#baseurl").val();
	$.ajax({
		type:"POST",
		url:baseurl+'systems/systems_code_unique_edit',
		// data:{'value':val,'scid':scid},
		data:{'value':val},
		cache: false,
		dataType: "html",
			success: function(result){
			if(result>0)
			{
				$('#systems_code_edit_err').html('System Code already exist!');
				scberre=1;
			}
			else
			{
				$('#systems_code_edit_err').html('');
				scberre=0;
			}
		}
	});
}

var lpberre=0;
function loanprefix_unique_edit(val)
{
	var baseurl= $("#baseurl").val();
	$.ajax({
		type:"POST",
		url:baseurl+'systems/loanprefix_unique_edit',
		data:{'value':val},
		cache: false,
		dataType: "html",
			success: function(result){
			if(result>0)
			{
				$('#loanprefix_edit_err').html('Loan Prefix already exist!');
				lpberre=1;
			}
			else
			{
				$('#loanprefix_edit_err').html('');
				lpberre=0;
			}
		}
	});
}
</script>
<script>
//Edit Modal - Validation Check
function systems_edit_validation()
{
	var systemserre = 0;
	var systems_name_edit = $('#systems_name_edit').val();
	
    if(systems_name_edit.trim()==''){
        $('#systems_name_edit_err').html('Enter System Name!');	
        systemserre++;
    }else{
        
        if(snberre>0)
		{
			$('#systems_name_edit_err').html('System Name already exist!');
			systemserre++;
		}
		else
		{
			$('#systems_name_edit_err').html('');
		}
    }
    
	var systems_code_edit = $('#systems_code_edit').val();

    if(systems_code_edit.trim()==''){
        $('#systems_code_edit_err').html('Enter System Code!');	
        systemserre++;
    }else{
        
        if(scberre>0)
		{
			$('#systems_code_edit_err').html('System Code already exist!');
			systemserre++;
		}
		else
		{
			$('#systems_code_edit_err').html('');
		}
    }

    var loanprefix_edit = $('#loanprefix_edit').val();

    if(loanprefix_edit.trim()==''){
        $('#loanprefix_edit_err').html('Enter Loan Prefix!');	
        systemserre++;
    }else{
        
        if(lpberre>0)
		{
			$('#loanprefix_edit_err').html('Loan Prefix already exist!');
			systemserre++;
		}
		else
		{
			$('#loanprefix_edit_err').html('');
		}
    }

    if(systemserre>0){ return false; }else{ return true; }
}
</script>

</body>
	<!--end::Body-->
</html>