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
									<h1 class="d-flex align-items-center text-dark fw-bold my-1 fs-3">Document Charge Lists
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
			                            Document Charge has been activated successfully
			                        </div>
			                        <div class="alert alert-danger alert-dismissible" style="display:none;" id="deactive" role="alert">
			                            <!-- <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			                            </button> -->
			                            Document Charge has been deactivated successfully
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
											<button type="button" class="btn btn-primary"  data-bs-toggle="modal" data-bs-target="#kt_modal_add_doc_charge">New Doc.Chrge</button>
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
									<table class="table align-middle table-row-dashed table-striped table-hover fs-7 gy-1 gs-2" id="kt_datatable_dom_positioning">
										<!--begin::Table head-->
										<thead>
											<!--begin::Table row-->
											<tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">
												
												<th class="min-w-125px cy" style="width: 26%;">From Amount</th>
												<th class="min-w-125px" style="width: 26%;">To Amount</th>
												<th class="min-w-125px" style="width: 28%;">DC Amount</th>
												<th class="min-w-125px" style="width: 10%;">Status</th>
												<th class="min-w-125px" style="width: 10%;"><span class="text-end">Actions</span></th>
											</tr>
											<!--end::Table row-->
										</thead>
										<!--end::Table head-->
										<!--begin::Table body-->
										<tbody class="text-gray-600 fw-semibold">

											<?php $i=1; foreach($document_list as $documentlist){?>
											<tr>
												<td class="cy"><?php echo $documentlist['FROM_AMT'];?></td>
												<td><?php echo $documentlist['TO_AMT'];?></td>
												<td><?php echo $documentlist['DC_AMT'];?></td>
												<td>
													<label class="form-check form-switch form-check-custom form-check-solid">
															<input class="form-check-input w-35px h-20px" type="checkbox" <?php if($documentlist['STATUS']=='Y'){echo "checked";} ?> id="activeunactive_doc_charge_<?php echo $i;?>"  name="activeunactive_doc_charge_<?php echo $i;?>" onchange="activeunactive_doc_charge('<?php echo $documentlist['DC_ID']; ?>',<?php echo $i;?>)" value="<?php echo $documentlist['STATUS'];?>">
													</label>
												</td>
												<td>
													<span class="text-end">
													<a href="#" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1" data-bs-toggle="modal" data-bs-target="#kt_modal_edit_doc_charge" onclick="doc_charge_edit('<?php echo $documentlist['DC_ID'];?>')">
														<!--begin::Svg Icon | path: icons/duotune/art/art005.svg-->
														<span class="svg-icon svg-icon-3">
															<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																<path opacity="0.3" d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z" fill="currentColor"></path>
																<path d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z" fill="currentColor"></path>
															</svg>
														</span>
														<!--end::Svg Icon-->
													</a>
													<a href="#" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm" data-bs-toggle="modal" data-bs-target="#kt_modal_delete_doc_charge" onclick="doc_charge_delete('<?php echo $documentlist['DC_ID'];?>')">
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
		<!--begin::Modal - add itempurity-->
		<div class="modal fade" id="kt_modal_add_doc_charge" tabindex="-1" aria-hidden="true">
			<!-- <form id="kt_add_itempurity_list_form" class="form"> -->
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
						<form name="add_doc_charge" id="add_doc_charge" method="POST" action="<?php echo base_url();?>Documentcharge/doc_charge_save" enctype="multipart/form-data" onsubmit="return document_validation();">
						<div class="modal-body pt-0 pb-15 px-5 px-xl-20">
							<!--begin::Heading-->
							<div class="mb-10 text-center">
								<h1 class="mb-3">New Document Charge</h1>
								
							</div>
							<!--end::Heading-->
							<div class="row">
								<label class="col-lg-4 col-form-label required fw-semibold fs-6">From Amount</label>
								<div class="col-lg-8 fv-row fv-plugins-icon-container">
									<input type="text" name="from_amount" class="form-control form-control-lg form-control-solid" placeholder="From Amount" onkeyup="doc_charge_from_unique(this.value);">
									<div class="fv-plugins-message-container invalid-feedback" id="from_amount_err"></div>
								</div>
							</div>
							<div class="row">
								<label class="col-lg-4 col-form-label required fw-semibold fs-6">To Amount</label>
								<div class="col-lg-8 fv-row fv-plugins-icon-container">
									<input type="text" name="to_amount" class="form-control form-control-lg form-control-solid" placeholder="To Amount" onkeyup="doc_charge_to_unique(this.value);">
									<div class="fv-plugins-message-container invalid-feedback" id="to_amount_err" ></div>
								</div>
							</div>
							<div class="row">
								<label class="col-lg-4 col-form-label required fw-semibold fs-6">DC Amount</label>
								<div class="col-lg-8 fv-row fv-plugins-icon-container">
									<input type="text" name="dc_amount" class="form-control form-control-lg form-control-solid" placeholder="DC Amount" onkeyup="dc_amount_unique(this.value);">
									<div class="fv-plugins-message-container invalid-feedback" id="dc_amount_err"></div>
								</div>
							</div>
							<div class="d-flex justify-content-center mt-3">
								<button type="reset" class="btn btn-secondary me-2" data-bs-dismiss="modal">Cancel</button>
								<button type="submit" class="btn btn-primary" id="">Save Changes</button>
							</div>
						</div>
						<!--end::Modal body-->
					</form>
					</div>
					<!--end::Modal content-->
				</div>
				<!--end::Modal dialog-->
			<!-- </form> -->
		</div>
		<!--end::Modal - add itempurity-->
		<!--begin::Modal - edit itempurity-->
		<div class="modal fade" id="kt_modal_edit_doc_charge" tabindex="-1" aria-hidden="true">
			
		</div>
		<!--end::Modal - edit itempurity-->
		<!--begin::Modal - delete itempurity-->
		<div class="modal fade" id="kt_modal_delete_doc_charge" tabindex="-1" aria-hidden="true">

		</div>
		<!--end::Modal - delete itempurity-->
		<input type="hidden" id="baseurl" value="<?php echo base_url();?>">
		<?php $this->load->view("script");?>
		<!-- <script src="js/itempurity-list.js"></script> -->
		<script>
			$("#kt_datatable_dom_positioning").DataTable({
				 // "ordering": false,
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
function activeunactive_doc_charge(val,ival) {
	var unactive;
	var unactv;
	var baseurl= $("#baseurl").val();
	var a = $("#activeunactive_doc_charge_"+ival).val();
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
		url:baseurl+'Documentcharge/doc_charge_active',
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
	         window.location = baseurl+"Documentcharge";
	        }, 3000);
		},
		error: function (error) {
			alert('error; ' + eval(error));
			setTimeout(function() {
	         window.location = baseurl+"Documentcharge";
	        }, 3000);
		}
	});
}	
</script>

</script>
 
 <!--Modal - Systems Delete -->
<script>

function doc_charge_delete(val){
	var baseurl= $("#baseurl").val();
	//alert(val);
	$.ajax({
	type: "POST",
	url: baseurl+'Documentcharge/doc_charge_delete',
	async: false,
	type: "POST",
	data: "id="+val,
	dataType: "html",
	success: function(response)
	{
	$('#kt_modal_delete_doc_charge').empty().append(response);
	$('#kt_modal_delete_doc_charge').addClass('show');
	//$("#kt_modal_delete_role").css("display", "block");
	}
	});
	}

function removedoccharge(val)

	{ 
	var baseurl= $("#baseurl").val();
	$.ajax({
	type: "POST",
	url: baseurl+'Documentcharge/delete',
	async: false,
	data:"field="+val,
	success: function(response)
	{
	window.location.href = baseurl+'Documentcharge';
	}
	});
	}

function closeDeleteModalDoccharge()
	{
		var baseurl= $("#baseurl").val();
		$('#kt_modal_delete_doc_charge').removeClass('show');
		$('.modal-backdrop').removeClass('show');
		window.location.href = baseurl+'Documentcharge';
	}
</script>
<script>
	
var title = $('title').text() + ' | ' + 'Documentcharge';
$(document).attr("title", title);

function doc_charge_edit(val)
{
	var baseurl= $("#baseurl").val();
	//alert(val);
	$.ajax({
	type: "POST",
	url: baseurl+'Documentcharge/doc_charge_edit',
	async: false,
	type: "POST",
	data: "id="+val,
	dataType: "html",
	success: function(response)
	{

	$('#kt_modal_edit_doc_charge').empty().append(response);
	$('#kt_modal_edit_doc_charge').addClass('show');
	//$("#kt_modal_editdept").css("display", "block");
	}
	});
}

function closeEditModalDoccharge()
{
	var baseurl= $("#baseurl").val();
	$('#kt_modal_edit_doc_charge').removeClass('show');
	//$("#kt_modal_update_role").css("display", "none");
	$('.modal-backdrop').removeClass('show');
	window.location.href = baseurl+'Documentcharge';
}

</script>

<!--New Systems - Unique check-->
<script>
var frmerr=0;
function doc_charge_from_unique(val)
{
	var baseurl= $("#baseurl").val();
	$.ajax({
		type:"POST",
		url:baseurl+'Documentcharge/doc_charge_from_unique',
		data:{'value':val},
		cache: false,
		dataType: "html",
			success: function(result){
			if(result>0)
			{
				$('#from_amount_err').html('From Amount already exist!');
				frmerr=1;
			}
			else
			{
				$('#from_amount_err').html('');
				frmerr=0;
			}
		}
	});
}
</script>

<script>
var toerr=0;
function doc_charge_to_unique(val)
{
	var baseurl= $("#baseurl").val();
	$.ajax({
		type:"POST",
		url:baseurl+'Documentcharge/doc_charge_to_unique',
		data:{'value':val},
		cache: false,
		dataType: "html",
			success: function(result){
			if(result>0)
			{
				$('#to_amount_err').html('To Amount already exist!');
				toerr=1;
			}
			else
			{
				$('#to_amount_err').html('');
				toerr=0;
			}
		}
	});
}
</script>
<script>
var dcerr=0;
function dc_amount_unique(val)
{
	var baseurl= $("#baseurl").val();
	$.ajax({
		type:"POST",
		url:baseurl+'Documentcharge/dc_amount_unique',
		data:{'value':val},
		cache: false,
		dataType: "html",
			success: function(result){
			if(result>0)
			{
				$('#dc_amount_err').html('Document Charge already exist!');
				dcerr=1;
			}
			else
			{
				$('#dc_amount_err').html('');
				dcerr=0;
			}
		}
	});
}
</script>
<!--New Document Charge - Validation check-->
<script>
function document_validation()
{
	//From Amount empty Check
	var err = 0;
	var from_amount = $('#from_amount').val();

    if(from_amount.trim()==''){
        $('#from_amount_err').html('Enter From Amount!');
        err++;
    }else{
        //$('#systems_err').html('');
        if(frmerr>0)
		{
			$('#from_amount_err').html('Amount already exist!');
			err++;
		}
		else
		{
			$('#from_amount_err').html('');
		}
    }
    //To Amount empty Check
	var to_amount = $('#to_amount').val();

    if(to_amount.trim()==''){
        $('#to_amount_err').html('Enter To Amount!');
        err++;
    }else{
        if(toerr>0)
		{
			$('#to_amount_err').html('Amount already exist!');
			err++;
		}
		else
		{
			$('#to_amount_err').html('');
		}
    }
    //Document Charge empty Check
	var doc_charge = $('#dc_amount').val();

    if(doc_charge.trim()==''){
        $('#dc_amount_err').html('Enter Document charge Amount!');
        err++;
    }else{
        if(dcerr>0)
		{
			$('#dc_amount_err').html('Document Charge already Exist!');
			err++;
		}
		else
		{
			$('#dc_amount_err').html('');
		}
    }
    
   if(err>0){ return false; }else { return true; }
}		
</script>
</body>
<!--end::Body-->
</html>