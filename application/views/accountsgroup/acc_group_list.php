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
									<h1 class="d-flex align-items-center text-dark fw-bold my-1 fs-3">Groups List
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

										<form method="POST" action="<?php echo base_url(); ?>Accountsgroup" enctype="multipart/form-data"> 
										<div class="row" style="padding: 1rem 1rem 0rem 1rem !important;">
											<div class="col-3">
											<!-- <label class="col-lg-1 col-form-label fw-semibold fs-6">Select</label> -->
											<select class="form-select form-select-solid" data-control="select2" data-hide-search="true"  id="acc_grp" name="acc_grp"  >
													<option >Select</option>
													<?php 
													
													$acc_grp_res=$this->Accountsgroup_model->get_dd_acc_group_list();
													// $acc_grp_res = $acc_grp_qry->result_array();
													foreach ($acc_grp_res as $acc_list) 
													{
													?>
													
													<option value="<?php echo $acc_list['GROUP_SNO']; ?>" <?php if($acc_list['GROUP_SNO']==$acc_grp){echo "selected"; } ?> > <?php echo $acc_list['GROUP_NAME']; ?> </option>
													<?php 
													}
													?>
												</select>
											</div>
											<div class="col-3">
												<button type="submit" class="btn btn-sm btn-outline btn-outline-solid btn-outline-warning btn-active-light-primary">Go</button>
											</div>
											
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
											
											<button type="button" class="btn btn-primary"  data-bs-toggle="modal" data-bs-target="#kt_modal_newaccgroup">
											<!--begin::Svg Icon | path: icons/duotune/arrows/arr075.svg-->
											<span class="svg-icon svg-icon-2">
												<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
													<rect opacity="0.5" x="11.364" y="20.364" width="16" height="2" rx="1" transform="rotate(-90 11.364 20.364)" fill="currentColor" />
													<rect x="4.36396" y="11.364" width="16" height="2" rx="1" fill="currentColor" />
												</svg>
											</span>
											<!--end::Svg Icon-->New Group</button>
											<!--end::Add user-->
										</div>
										<!--end::Toolbar-->
										
									</div>
									</form>
									<!--end::Card toolbar-->
								</div>
								<!--begin::Card body-->
								<div class="card-body py-4">
									<!--begin::Table-->
									<table class="table align-middle table-row-dashed table-striped table-hover fs-6 gy-1 gs-2" id="kt_datatable_account_group_list">
										<!--begin::Table head-->
										<thead>
											<!--begin::Table row-->
											<tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">
												<th class="min-w-25px">Sno</th>
												<th class="min-w-25px">Group ID</th>
												<th class="min-w-25px">Group Name</th>
												<th class="min-w-25px">Under Group</th>
												<th class="min-w-25px">Description</th>
												<th class="min-w-25px">Pre-defined</th>
												<th class="min-w-15px" style="width: 15%;"><span class="text-end">Actions</span></th>
											</tr>
											<!--end::Table row-->
										</thead>
										<!--end::Table head-->
										<!--begin::Table body-->
										<tbody class="text-gray-600 fw-semibold">
											<?php $i=1; foreach($acc_grp_list as $aglist){?>
											<!--begin::Table row-->
											<tr>
												
												<td><?php echo $i; ?></td>
												<td><?php echo $aglist['GROUP_SNO'];?></td>
												<td><?php echo $aglist['GROUP_NAME']?$aglist['GROUP_NAME']:'-';?></td>
												<td><?php echo $aglist['UNDER_GROUP']?$aglist['UNDER_GROUP']:'-';?></td>
												<td class="ple1"><?php echo $aglist['DESCRIPTION']?$aglist['DESCRIPTION']:'-';?></td>
												<td><?php echo $aglist['CHK_PREDEFINED']?$aglist['CHK_PREDEFINED']:'-';?></td>
												<!--begin::Action=-->
												<td>
													<?php if($aglist['CHK_PREDEFINED']=='N' ){?>
													<span class="text-end">
														
													<a href="javascript:;" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1" data-bs-toggle="modal" data-bs-target="#kt_modal_editaccgroup" onclick="acc_grp_edit('<?php echo $aglist['GROUP_SNO'];?>')">
																		<!--begin::Svg Icon | path: icons/duotune/art/art005.svg-->
																		<span class="svg-icon svg-icon-3">
																			<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																				<path opacity="0.3" d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z" fill="currentColor"></path>
																				<path d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z" fill="currentColor"></path>
																			</svg>
																		</span>
																		<!--end::Svg Icon-->
																	</a>
																
																	<a href="javascript:;" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm" data-bs-toggle="modal" data-bs-target="#kt_modal_delete_accgroup" onclick="acc_grp_delete('<?php echo $aglist['GROUP_SNO'];?>')">
																		<!--begin::Svg Icon | path: icons/duotune/general/gen027.svg-->
																		<span class="svg-icon svg-icon-3">
																			<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																				<path d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z" fill="currentColor"></path>
																				<path opacity="0.5" d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z" fill="currentColor"></path>
																				<path opacity="0.5" d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z" fill="currentColor"></path>
																			</svg>
																		</span>
																		<!--end::Svg Icon-->
																	</a>
																	<?php }?>
																</span>
												</td>
												<!--end::Action=-->										
											</tr>
											<?php 
												$i++;
												}
											?>
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
		<!--begin::Modal - new accgroup-->
		<div class="modal fade" id="kt_modal_newaccgroup" tabindex="-1" aria-hidden="true">
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
					<form name="acc_grp_add_form" id="acc_grp_add_form" method="POST" action="<?php echo base_url(); ?>Accountsgroup/accountsgroup_save" enctype="multipart/form-data" onsubmit="return add_acc_grp_validate()"> 
					<div class="modal-body pt-0 pb-15 px-5 px-xl-20">
						<!--begin::Heading-->
						<div class="mb-2 text-center">
							<h1 class="mb-3">New Group</h1>
						</div>
						<!--end::Heading-->
						<div class="row">
							<div class="col-lg-8"></div>
							<div class="col-lg-4">
								<label class="col-form-label fw-semibold fs-6">Code</label>
								<label class="col-form-label fw-semibold fs-6">: 
									<?php 
										// $code_qry=$this->db->query("SELECT KEYVALUE FROM KEYMASTER WHERE KEYNAME='ACC_GROUPS-".$_SESSION['LOANPREFIX']."'");
										// $code_res=$code_qry->row();
										// $val= $code_res->KEYVALUE+1;
										$code = $_SESSION['LOANPREFIX'].$prefix_count;
										echo $code;
									?>
									<input type="hidden" class="form-control form-control-lg form-control-solid" placeholder="Group Name" value="<?php echo $code; ?>" name="grp_sno" id="grp_sno">
								</label>
							</div>
						</div>
						<div class="row">
							<!--begin::Label-->
							<label class="col-lg-4 col-form-label required fw-semibold fs-6">Group Name</label>
							<!--end::Label-->
							<!--begin::Col-->
							<div class="col-lg-8 fv-row fv-plugins-icon-container">
								<input type="text" class="form-control form-control-lg form-control-solid" placeholder="Group Name" value="" name="grp_name" id="grp_name" onkeyup="acc_grp_unique(this.value);">
								<div class="fv-plugins-message-container invalid-feedback" id=
								"acc_grp_name_err" name="acc_grp_name_err"></div>
							</div>
							<!--end::Col-->
						</div>
						<div class="row">
							<label class="col-md-4 col-form-label required fw-semibold fs-6">Main Groups</label>
							<!--begin::Col-->
							<div class="col-lg-8 fv-row fv-plugins-icon-container">
								<!--begin::Select-->
								<select class="form-select form-select-solid" data-control="select2" name="under_grp" id="under_grp" onchange="return get_grp_details(this.val)" data-dropdown-parent="#kt_modal_newaccgroup">	
									<option value="">Select Groups</option>
									<?php 
										foreach($under_grp_list as $ulist)
										{
									?>
										<option value="<?php echo $ulist['GROUP_NAME']; ?>"> <?php echo $ulist['GROUP_NAME'] ?></option>
									<?php 
										}
									?>
								</select>
								<div class="fv-plugins-message-container invalid-feedback" id=
								"main_grp_name_err" name="main_grp_name_err"></div>
								<!--end::Select-->
							</div>
						</div>
						<center>
						<div class="row">
							
							<!--begin::Label-->
								<label class="col-lg-4 col-form-label  fw-bold fs-6" id="main_grp" name="main_grp" style="color: blue;"></label>
							
							<!--end::Label-->
							<!--begin::Col-->
							<div class="col-lg-8 fv-row fv-plugins-icon-container">
								
									<label class="col-lg-4 col-form-label  fw-bold fs-6" id="sub_grp" name="sub_grp" style="color: blue;"></label>
								
							</div>
							<!--end::Col-->
							
						</div>
						</center>
						<div class="row">
							<!--begin::Label-->
							<label class="col-lg-4 col-form-label  fw-semibold fs-6">Description</label>
							<!--end::Label-->
							<!--begin::Col-->
							<div class="col-lg-8 fv-row fv-plugins-icon-container">
								<input type="text" name="description" id="description" class="form-control form-control-lg form-control-solid" placeholder="Description" value="">
								<div class="fv-plugins-message-container invalid-feedback"></div>
							</div>
							<!--end::Col-->
						</div>
						<!-- <div class="row"> -->
							<!-- <div class="col-lg-8 fv-row fv-plugins-icon-container"> -->
								<!--begin::Label-->
								<!-- <label class="col-form-label  fw-semibold fs-6"> -->
									<!-- <input class="form-check-input" name="pre_defined" id="pre_defined" type="checkbox"  style="left: 30px">  &nbsp;&nbsp;&nbsp;  Is Pre-Defined -->
								<!-- </label> -->
								<!--end::Label-->
							<!-- </div> -->
							<!--end::Col-->
						<!-- </div> -->
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
									<button type="submit" class="btn btn-primary" >Save Changes</button>
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
		<!--end::Modal - new accgroup-->
        <!--begin::Modal - edit accgroup-->
		<div class="modal fade" id="kt_modal_editaccgroup" tabindex="-1" aria-hidden="true">
			<!--begin::Modal dialog-->
			<div class="modal-dialog modal-m">
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
					<div class="modal-body pt-0 pb-15 px-5 px-xl-20">
						<!--begin::Heading-->
						<div class="mb-13 text-center">
							<h1 class="mb-3">Modify Group Details</h1>
						</div>
						<!--end::Heading-->
						
						<!--end::Actions-->
					</div>
					<!--end::Modal body-->
				</div>
				<!--end::Modal content-->
			</div>
			<!--end::Modal dialog-->
		</div>
		<!--end::Modal - edit accgroup-->

		<!--begin::Modal - delete accgroup-->
		<div class="modal fade" id="kt_modal_delete_accgroup" tabindex="-1" aria-hidden="true">				
			<!--begin::Modal dialog-->
			<div class="modal-dialog modal-m">
				<!--begin::Modal content-->
				<div class="modal-content rounded">
					<div class="swal2-icon swal2-warning swal2-icon-show" style="display: flex;">
						<div class="swal2-icon-content">!</div></div>
						
				</div>
				<!--end::Modal content-->
			</div>
			<!--end::Modal dialog-->
		</div>
		<!--end::Modal - delete interestscheme-->
		<?php $this->load->view("script");?>
		<input type="hidden" id="baseurl" value="<?php echo base_url();?>">
		<script>
		$('#kt_datatable_account_group_list').DataTable( {
			"aaSorting": [],
		        dom: 'Bfrtip',
		        buttons: [
		            // 'copyHtml5',
		            // 'excelHtml5',
		            // 'csvHtml5',
		            // 'pdfHtml5'

                        {
                            extend: 'copyHtml5',
                             title: 'Groups List',
                            exportOptions: {columns: [ 1,2,3,4,5]}
                        },
                        {
                            extend: 'excelHtml5',
                            title: 'Groups List',
                            exportOptions: {columns: [ 1,2,3,4,5]}
                        },
                        {
                            extend: 'csvHtml5',
                            title: 'Groups List',
                            exportOptions: {columns: [ 1,2,3,4,5]}
                        },
                        {
                            extend: 'pdfHtml5',
                            title: 'Groups List',
                            exportOptions: {columns: [ 1,2,3,4,5]}
                        },
		        ]
		    } );	
		    </script>	
		    <script>
	     
		        $("#kt_datatable_account_group_list").kendoTooltip({
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
<script >
function sel_acc_group_list(val)
{
	var baseurl= $("#baseurl").val();
	// var val=$("#acc_grp").val()
	// alert(val);
	$.ajax({
	type: "POST",
	url: baseurl+'Accountsgroup/index',
	async: false,
	type: "POST",
	data: "sts="+val,
	dataType: "html",
	success: function(response)
	{
		window.location.reload();
	}
	});
}


var berr=0;
function acc_grp_unique(val)
{
	var baseurl= $("#baseurl").val();
	$.ajax({
		type:"POST",
		url:baseurl+'Accountsgroup/acc_grp_unique',
		data:{'value':val},
		cache: false,
		dataType: "html",
			success: function(result){
			if(result>0)
			{
				$('#acc_grp_name_err').html('Accounts Group already exist!');
				berr=1;
			}
			else
			{
				$('#acc_grp_name_err').html('');
				berr=0;
			}
		}
	});
}

function add_acc_grp_validate()
{
	var err = 0;
	var acc_grp_name = $('#grp_name').val();
	var main_grp_name = $('#under_grp').val();
	// alert(main_grp_name);
    if(acc_grp_name.trim()=='')
    {
        $('#acc_grp_name_err').html('Enter Accounts Group Name!');
        err++;
    }
    else
    {
        // $('#village_err').html('');
        if(berr>0)
		{
			$('#acc_grp_name_err').html('Accounts Group Name already exist!');
			err++;
		}
		else
		{
			$('#acc_grp_name_err').html('');
		}
    }
    if(main_grp_name.trim()=='')
    {
        $('#main_grp_name_err').html('Select Under Group category!');
        err++;
    }
    else
    {
			$('#main_grp_name_err').html('');
    }
    
    if(err>0){ return false; }else{ return true; }
}

function get_grp_details(val)
{
	var baseurl= $("#baseurl").val();
	var under_grp=$("#under_grp").val();
	
	// alert(under_grp);
	$.ajax({
	type: "POST",
	url: baseurl+'Accountsgroup/get_under_grp_details',
	async: false,
	type: "POST",
	data: "ug="+under_grp,
	dataType: "html",
	success: function(response)
	{
		var res=response.split('||');
		$('#main_grp').html(res[0]);
		if(res[1]==1)
		{$('#sub_grp').html("ASSETS");}
		else if(res[1]==2)
		{$('#sub_grp').html("LIABILITIES");}
		else if(res[1]==3)
		{$('#sub_grp').html("INCOME");}
		else if(res[1]==4)
		{$('#sub_grp').html("EXPENSE");}
	
	}
	});
}
function get_grp_details_edit(val)
{
	var baseurl= $("#baseurl").val();
	var under_grp=$("#under_grp_edit").val();
	
	// alert(under_grp);
	$.ajax({
	type: "POST",
	url: baseurl+'Accountsgroup/get_under_grp_details_edit',
	async: false,
	type: "POST",
	data: "ug="+under_grp,
	dataType: "html",
	success: function(response)
	{
		var res=response.split('||');
		$('#main_grp_edit').html(res[0]);
		if(res[1]==1)
		{$('#sub_grp_edit').html("ASSETS");}
		else if(res[1]==2)
		{$('#sub_grp_edit').html("LIABILITIES");}
		else if(res[1]==3)
		{$('#sub_grp_edit').html("INCOME");}
		else if(res[1]==4)
		{$('#sub_grp_edit').html("EXPENSE");}
	}
	});
}

function acc_grp_edit(val)
{
	var baseurl= $("#baseurl").val();
	// alert(baseurl);
	$.ajax({
	type: "POST",
	url: baseurl+'Accountsgroup/acc_grp_edit',
	async: false,
	type: "POST",
	data: "id="+val,
	dataType: "html",
	success: function(response)
	{
		$('#kt_modal_editaccgroup').empty().append(response);
		$('#kt_modal_editaccgroup').addClass('show');
	//$("#kt_modal_editdept").css("display", "block");
	}
});
}

function closeEditModal()
{
	var baseurl= $("#baseurl").val();
	$('#kt_modal_editaccgroup').removeClass('show');
	//$("#kt_modal_update_role").css("display", "none");
	$('.modal-backdrop').removeClass('show');
	window.location.href = baseurl+'Accountsgroup';
}

function acc_grp_delete(val)
{
	var baseurl= $("#baseurl").val();
	// alert(val);
	$.ajax({
	type: "POST",
	url: baseurl+'Accountsgroup/acc_grp_delete',
	async: false,
	type: "POST",
	data: "id="+val,
	dataType: "html",
	success: function(response)
	{
	$('#kt_modal_delete_accgroup').empty().append(response);
	$('#kt_modal_delete_accgroup').addClass('show');
	//$("#kt_modal_delete_role").css("display", "block");
	}
	});
}

function removeAccGroup(val)
{ 
	var baseurl= $("#baseurl").val();
	$.ajax({
	type: "POST",
	url: baseurl+'Accountsgroup/delete',
	async: false,
	data:"field="+val,
	success: function(response)
	{
		window.location.href = baseurl+'Accountsgroup';
	}
	});
}
function closeDeleteModal()
{
		var baseurl= $("#baseurl").val();
		$('#kt_modal_delete_accgroup').removeClass('show');
		$('.modal-backdrop').removeClass('show');
		window.location.href = baseurl+'Accountsgroup';
}
		</script>
	</body>
	<!--end::Body-->
</html>