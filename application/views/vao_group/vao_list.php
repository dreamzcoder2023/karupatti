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
									<h1 class="d-flex align-items-center text-dark fw-bold my-1 fs-3">VAO Group List
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
			                            Vao group has been activated successfully
			                        </div>
			                        <div class="alert alert-danger alert-dismissible" style="display:none;" id="deactive_item_master" role="alert">
			                           <!--  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			                            </button> -->
			                            Vao group been deactivated successfully
			                        </div>
								<div class="col-xxl-8">
									<!--begin::Tables Widget 9-->
									


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
											<!--end::Svg Icon-->ADD VAO Group</button>
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
									<table class="table align-middle table-row-dashed table-striped table-hover fs-7 gy-1 gs-2 dataTable" id="kt_datatable_vaolist">
										<!--begin::Table head-->
										<thead>
											<!--begin::Table row-->
											<tr class="text-start text-muted fw-bold fs-7  gs-0">
												<th class="min-w-50px">Sno</th>
												<th class="min-w-350px">VAO Group Name</th>
												<th class="min-w-100px">Status</th>
												<th class="min-w-100px"><span class="text-end">Actions</span></th>
											</tr>
											<!--end::Table row-->
										</thead>
										<!--end::Table head-->
										<!--begin::Table body-->
										<tbody class="text-gray-600 fw-semibold">
											<!--begin::Table row-->
											<?php $i=1; foreach($Vao_list as $vlist){?>
											<tr>
												
												<td><?php echo $i;?></td>
												
												<!-- <td><?php echo $vlist['VAO_GID'];?></td> -->
												
												<td><?php echo $vlist['VAO_NAME'];?></td>
												<td>
														<label class="form-check form-switch form-check-custom form-check-solid">
																<!-- <input class="form-check-input" type="checkbox" value="1" checked="checked"> -->
																<input class="form-check-input w-35px h-20px" type="checkbox" <?php if($vlist['STATUS']=='Y'){echo "checked";} ?> id="activeunactive_items_<?php echo $i;?>" name="activeunactive_items_<?php echo $i;?>" onchange="activeunactive_items('<?php echo $vlist['VAO_NAME']; ?>',<?php echo $i;?>)" value="<?php echo $vlist['STATUS'];?>">
														</label>
													</td>
												<!--begin::Action=-->
												<td>
													<span class="text-end">
													

													<a href="javascript:;" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1" data-bs-toggle="modal" data-bs-target="#kt_modal_editdept" onclick="vao_edit('<?php echo $vlist['SNO'];?>')">
																		<!--begin::Svg Icon | path: icons/duotune/art/art005.svg-->
																		<span class="svg-icon svg-icon-3">
																			<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																				<path opacity="0.3" d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z" fill="currentColor"></path>
																				<path d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z" fill="currentColor"></path>
																			</svg>
																		</span>
																		<!--end::Svg Icon-->
																	</a>
													<a href="javascript:;" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm" data-bs-toggle="modal" data-bs-target="#kt_modal_delete_item" onclick="vao_delete('<?php echo $vlist['SNO'];?>')">
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
		<div class="modal fade" id="kt_modal_add_newitem" tabindex="-1" aria-hidden="true" data-bs-backdrop="static">
			<!--begin::Modal dialog-->
				<div class="modal-dialog modal-s">
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
						<form name="item_add_form" id="item_add_form" method="POST" action="<?php echo base_url(); ?>Vao_group/Vao_save" enctype="multipart/form-data" onsubmit="return vao_validation();">
						<div class="modal-body pt-0 pb-15 px-5 px-xl-20">
							<!--begin::Heading-->
								<div class="mb-13 text-center">
									<h1 class="mb-3">New VAO Group</h1>	
								</div>
							<!--end::Heading-->
							
							
								<!--end::Label-->
								<!--begin::Label-->
							    <!-- </div> -->
							    <div class="row">
									<label class="col-lg-5 col-form-label required fw-semibold fs-6">VAO Group Name</label>
									<!--end::Label-->
									<!--begin::Col-->
									<div class="col-lg-7 fv-row fv-plugins-icon-container">
										<input type="text" name="vao_name" id="vao_name" class="form-control form-control-lg form-control-solid" placeholder="Enter VAO Group Name" onkeyup="checkunique_add()">
										<input type="hidden" id="increment_name" name="increment_name" value="">
										<div class="fv-plugins-message-container invalid-feedback" id="vao_name_err"></div>
								   </div>
								<!--end::Col-->
								
								
								
							</div>
							
							<!--begin::Actions-->
							<div class="row">
								<div class="d-flex justify-content-md-end mt-13">
			                        <button type="reset" class="btn btn-secondary me-2" data-bs-dismiss="modal">Cancel</button>
								    <button type="submit" class="btn btn-primary" id="btnSubmit">Add VAO</button>
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
		<div class="modal fade" id="kt_modal_editdept" tabindex="-1" aria-hidden="true" data-bs-backdrop="static">
				<div class="modal-dialog modal-s">
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
					
					<!--end::Modal body-->
				</div>
				<!--end::Modal content-->
			</div>
		</div>
		<!--end::Modal - edit company-->
		
		<!--begin::Modal - view company-->


		<!--End::View Company-->
		<!--begin::Modal - delete item-->
		<div class="modal fade" id="kt_modal_delete_item" tabindex="-1" aria-hidden="true">
			
		</div>
		<!--end::Modal - delete item-->
		<input type="hidden" id="baseurl" value="<?php echo base_url();?>">
		<?php $this->load->view("script");?>

		<script>
			$('#kt_datatable_vaolist').DataTable( {
				"aaSorting": [],
				"responsive": true,
		        dom: 'Bfrtip',
		        buttons: [
		        			{
					            extend: 'copyHtml5',
			                    exportOptions: {columns: [1]}
			                },
			                {
			                    extend: 'excelHtml5',
			                    title: 'VAO Group List',
			                    exportOptions: {columns: [1]}
			                },
			                {
			                    extend: 'csvHtml5',
			                    title: 'VAO Group List',
			                    exportOptions: {columns: [1]}
			                },
			                {
			                    extend: 'pdfHtml5',
			                    title: 'VAO Group List',
			                    exportOptions: {columns: [1]}
			                },
		        ]
		    } );

		</script>
<script>

function vao_edit(val){
var baseurl= $("#baseurl").val();
//alert(val);
$.ajax({
type: "POST",
url: baseurl+'Vao_group/vao_edit',
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
	window.location.href = baseurl+'Vao_group';
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
		url:baseurl+'Vao_group/item_active',
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



function vao_delete(val){
var baseurl= $("#baseurl").val();
//alert(val);
$.ajax({
type: "POST",
url: baseurl+'Vao_group/vao_delete',
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
url: baseurl+'Vao_group/delete',
async: false,
data:"field="+val,
success: function(response)
{
window.location.href = baseurl+'Vao_group';
}
});
}

function closeDeleteModal()
{
	var baseurl= $("#baseurl").val();
	$('#kt_modal_delete_item').removeClass('show');
	$('.modal-backdrop').removeClass('show');
	window.location.href = baseurl+'Vao_group';
}



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
		url:baseurl+'Vao_group/Item_active',
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
	         window.location = baseurl+"Vao_group";
	        }, 3000);
		},
		error: function (error) {
			alert('error; ' + eval(error));
			setTimeout(function() {
	         window.location = baseurl+"Vao_group";
	        }, 3000);
		}
	});
}	
</script>
<script>
var uniq = 0;
	function checkunique_add()
	{
		var val          = $('#vao_name').val();
		var baseurl      = $("#baseurl").val();
		// alert(val)
		if (val!='') {
			$.ajax({
				type:"POST",
				url:baseurl+'Vao_group/checkunique_add',
				data:"value="+val,
				cache: false,
				dataType: "html",
				success: function(result){
				if(result==1)
				{
					$('#vao_name_err').html(' Vao Group already exists!');
					$('#btnSubmit').prop('disabled', true);
					uniq = 1;
				}
				else
				{
					$('#vao_name_err').html('');
					$('#btnSubmit').prop('disabled', false);
					uniq = 0;
				}
				}
			});
		}
	}
function vao_validation()
{

	var err = 0;


	var vao_name= $('#vao_name').val();

    if(vao_name.trim()=='')
			    {
			        $('#vao_name_err').html('Enter Vao Group Name !');
			        err++;
			    }
			    else
			    {
			       
					$('#vao_name_err').html('');
					
			    }


    
    


   

    
if(err>0){ return false; }else{ return true; }

   

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
	url: baseurl+'item/vao_increment',
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