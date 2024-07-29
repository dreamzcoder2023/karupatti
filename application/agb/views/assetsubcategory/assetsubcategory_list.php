<?php $this->load->view("common.php");?>
<style>
	.dataTables_scroll
    {
        position: relative;
        overflow: auto;
        max-height: 200px;/*the maximum height you want to achieve*/
        width: 100%;
    }
  .dataTables_scroll thead{
    position: -webkit-sticky;
    position: sticky;
    top: 0;
    background-color: #fff;
    z-index: 2;
  }
  .dataTables_scroll_rp_entry
    {
        position: relative;
        overflow: auto;
        min-height: 180px;
        max-height: 200px;/*the maximum height you want to achieve*/
        width: 100%;
    }
  .dataTables_scroll_rp_entry thead{
    position: -webkit-sticky;
    position: sticky;
    top: 0;
    background-color: #fff;
    z-index: 2;
  }
  .error {
    border: solid 2px #f31700 !important;
	border-color:#f31700 !important;
}
</style>
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
				<?php $this->load->view("sidebar.php");?>
				<!--begin::Wrapper-->
				<div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
				<?php $this->load->view("header.php");?>
				<!--begin::Toolbar-->
					<div class="toolbar py-2" id="kt_toolbar">
						<!--begin::Container-->
						<div id="kt_toolbar_container" class="container-fluid d-flex align-items-center">
							<!--begin::Page title-->
							<div class="flex-grow-1 flex-shrink-0 me-5">
								<!--begin::Page title-->
								<div data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
									<!--begin::Title-->
									<h1 class="d-flex align-items-center text-dark fw-bold my-1 fs-3">Asset Sub Category
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
										<div class="alert alert-success alert-dismissible" style="display:none;" id="active_item_master" role="alert">
			                            Asset Sub Category has been activated successfully
			                        </div>
			                        <div class="alert alert-success alert-dismissible" style="display:none;" id="deactive_item_master" role="alert">
			                            Asset Sub Category has been deactivated successfully
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
											<button type="button" class="btn btn-primary"  data-bs-toggle="modal" data-bs-target="#kt_modal_new_sub_category">
											<!--begin::Svg Icon | path: icons/duotune/arrows/arr075.svg-->
											<span class="svg-icon svg-icon-2">
												<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
													<rect opacity="0.5" x="11.364" y="20.364" width="16" height="2" rx="1" transform="rotate(-90 11.364 20.364)" fill="currentColor" />
													<rect x="4.36396" y="11.364" width="16" height="2" rx="1" fill="currentColor" />
												</svg>
											</span>
											<!--end::Svg Icon-->New Sub Category</button>
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
									<table class="table align-middle table-row-dashed table-striped table-hover fs-7 gy-1 gs-2" id="asset_category_table">
										<thead>
											<tr class="text-start text-muted fw-bold fs-7 gs-0">
													<th class="min-w-50px" style="width:10% !important;">S.No</th>
													<th class="min-w-150px" style="width:30% !important;">Category</th>
													<th class="min-w-150px" style="width:30% !important;">Sub Category</th>
													<th class="min-w-50px" style="width:15% !important;">Status</th>
													<th class="min-w-80px" style="width:15% !important;"><span class="text-end">Actions</span></th>
											</tr>
										</thead>
										<tbody class="text-gray-600 fw-semibold">
											<?php if(isset($assetsubcategorylist)){ 
												foreach ($assetsubcategorylist as $i => $list) { ?>
											<tr>
												<td><?php echo $i+1; ?></td>
												<td class="ple1"><?php echo $list['assetcategoryname']; ?></td>
												<td class="ple1"><?php echo $list['assetsubcategoryname']; ?></td>
												<td>
													<label class="form-check form-switch form-check-custom form-check-solid cursor-pointer">
														<input class="form-check-input w-35px h-20px cursor-pointer" type="checkbox" <?php if($list['status']==1){echo "checked";} ?> id="activeunactive_<?php echo $i;?>" name="activeunactive_<?php echo $i;?>" onchange="activeunactive_items('<?php echo $list['assetsubcategoryid']; ?>',<?php echo $i;?>)" value="<?php echo $list['status'];?>">
													</label>
												</td>
												<!--begin::Action=-->
												<td>
													<span class="text-end">
														<a href="javascript:;" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1" data-bs-toggle="modal" data-bs-target="#kt_modal_edit_subcategory" onclick="edit('<?php echo $list['assetsubcategoryid']; ?>')">
															<span class="svg-icon svg-icon-3">
																<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																	<path opacity="0.3" d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z" fill="currentColor"></path>
																	<path d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z" fill="currentColor"></path>
																</svg>
															</span>
															<!--end::Svg Icon-->
														</a>
														<a href="javascript:;" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm" data-bs-toggle="modal" data-bs-target="#kt_modal_delete_category" onclick="deleteassetcategory('<?php echo $list['assetsubcategoryid'];?>')">
															<span class="svg-icon svg-icon-3">
																<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																	<path d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z" fill="currentColor"></path>
																	<path opacity="0.5" d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z" fill="currentColor"></path>
																	<path opacity="0.5" d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z" fill="currentColor"></path>
																</svg>
															</span>
															<!--end::Svg Icon-->
														</a>
													</span>
												</td>
												<!--end::Action=-->
											</tr>
											<?php }} ?>
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
				<?php $this->load->view("footer.php");?>
				</div>
				<!--end::Wrapper-->
			</div>
			<!--end::Page-->
		</div>
		<!--end::Root-->
		<!--begin::Modal - edit company-->
		<div class="modal fade" id="kt_modal_edit_subcategory" tabindex="-1" aria-hidden="true" data-bs-backdrop="static">
			<!--begin::Modal dialog-->		
				<div class="modal-dialog modal-md">
					<!--begin::Modal content-->
					
					<!--end::Modal dialog-->
				</div>
			<!--end::Modal dialog-->
		</div>
		<!--end::Modal - edit Wishes-->
		<!--begin::Modal - add Wishes-->
		<div class="modal fade" id="kt_modal_new_sub_category" tabindex="-1" aria-hidden="true" data-bs-backdrop="static">
			<!--begin::Modal dialog-->
			<div class="modal-dialog modal-md">
				<!--begin::Modal content-->
				<div class="modal-content rounded">
					<!--begin::Modal header-->
					<div class="modal-header justify-content-end border-0 pb-0" style="padding:0px !important;">
						<!--begin::Close-->
						<button type="button" class="btn btn-sm btn-icon btn-active-color-primary close" data-bs-dismiss="modal" aria-label="Close">
							<span class="svg-icon svg-icon-1 px-3">
								<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
									<rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="currentColor" />
									<rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="currentColor" />
								</svg>
							</span>
						</button>
						<!--end::Close-->
					</div>
					<!--end::Modal header-->
					<!--begin::Modal body-->
					<div class="modal-body pt-0 pb-15 px-5 px-xl-20">
						<!--begin::Heading-->
						<div class="mb-3 text-center">
							<h1 class="mb-3">New Sub Category</h1>
						</div>
						<!--end::Heading-->
						<!--   -->
						<form name="item_add_form" enctype="multipart/form-data" method="POST"  action="<?php echo base_url(); ?>Assetsubcategory/assetsubcategoryadd" onsubmit="return addvalidation();">
							<div class="row">
								<label class="col-lg-4 col-form-label required fw-semibold fs-6">Category</label>
									<div class="col-lg-8 fv-row">
										<select class="form-select form-select-solid" name="assetcategoryid" id="assetcategoryid" data-control="select2" data-hide-search="false" data-dropdown-parent="#kt_modal_new_sub_category">
											<option value="">Select</option>
											<?php if(isset($assetcategorylist)){ 
												foreach ($assetcategorylist as $clist) { ?>
												<option value="<?php echo $clist['assetcategoryid']; ?>"><?php echo ucfirst($clist['assetcategoryname']); ?></option>
											<?php } } ?>
										</select>
										<div class="fv-plugins-message-container invalid-feedback" id="assetcategoryid_err"></div>
									</div>
									<label class="col-lg-4 col-form-label required fw-semibold fs-6">Sub Category</label>
										<div class="col-lg-8 fv-row fv-plugins-icon-container">
											<input type="text" name="assetsubcategoryname" class="form-control form-control-lg1 form-control-solid" placeholder="Enter Sub Category Name" id="assetsubcategoryname" onkeyup="checkunique_add();">
											<div class="fv-plugins-message-container invalid-feedback" id="assetsubcategoryname_err"></div>
										</div>
								</div>
							<div class="d-flex justify-content-center align-items-center mt-6">
								<button type="reset" class="btn btn-secondary me-3" data-bs-dismiss="modal">Cancel</button>
								<button type="submit" class="btn btn-primary" id="btnSubmit">Create Category</button>
							</div>
						</form>
						<!--end::Actions-->
					</div>
					<!--end::Modal body-->
				</div>
				<!--end::Modal content-->
			</div>
			<!--end::Modal dialog-->
		</div>
		<!--end::Modal - add Wishes-->
		
		<!--begin::Modal - delete Wishes-->
		<div class="modal fade" id="kt_modal_delete_category" tabindex="-1" aria-hidden="true">
			<!--begin::Modal dialog-->
				<div class="modal-dialog modal-m">
					<!--begin::Modal content-->
					
					<!--end::Modal content-->
				</div>
				<!--end::Modal dialog-->
		</div>
		<!--end::Modal - delete Wishes-->
		<!-- Flash Data::Start -->
	     		<?php if($this->session->flashdata('g_success')){?>
            	<div class="menu-item px-3">
                    <a href="javascript:;" id="pop_up_success" class="menu-link flex-stack px-3" data-bs-toggle="modal" data-bs-target="#success_modal"></a>
                </div>
            		 <?php } ?>
             <?php if($this->session->flashdata('g_err')){?>
                    <div class="menu-item px-3">
           			 <a href="javascript:;" id="pop_up_success" class="menu-link flex-stack px-3" data-bs-toggle="modal" data-bs-target="#error_modal"></a>
         		   </div>
             <?php } ?>
		     <div class="modal fade" id="success_modal" tabindex="-1" aria-hidden="true">
		            <!--begin::Modal dialog-->
		            <div class="modal-dialog modal-dialog-centered modal-m">
		                <!--begin::Modal content-->
		                <div class="modal-content rounded">
		                    <div class="swal2-icon swal2-success swal2-icon-show" style="display: flex;">
		                        <div class="swal2-icon-content">&#x2713;</div></div>
		                        <div class="swal2-html-container" id="swal2-html-container" style="display: block;">
		                            <b><span> <?php echo $this->session->flashdata('g_success'); ?></span></b>
		                            </div>
		                        <div class="d-flex flex-center flex-row-fluid pt-12">
		                            <button type="submit" class="btn btn-primary me-3" data-bs-dismiss="modal">Ok</button>
		                            
		                        </div><br><br>
		                </div>
		                <!--end::Modal content-->
		            </div>
		            <!--end::Modal dialog-->
		        </div>
		        <div class="modal fade" id="error_modal" tabindex="-1" aria-hidden="true">
		            <!--begin::Modal dialog-->
		            <div class="modal-dialog modal-dialog-centered modal-m">
		                <!--begin::Modal content-->
		                <div class="modal-content rounded">
		                    <div class="swal2-icon swal2-icon-show" style="display: flex;border: 3px solid red !important;">
		                        <div class="swal2-icon-content" style="color:red">&#x2715;</div></div>
		                        <div class="swal2-html-container" id="swal2-html-container" style="display: block;">
		                            <b><span> <?php echo $this->session->flashdata('g_err'); ?></span></b>
		                            </div>
		                        <div class="d-flex flex-center flex-row-fluid pt-12">
		                            <button type="submit" class="btn btn-primary me-3" data-bs-dismiss="modal">Ok</button>
		                            
		                        </div><br><br>
		                </div>
		                <!--end::Modal content-->
		            </div>
		            <!--end::Modal dialog-->
       			 </div>
		<!-- Flash Data::End -->
		<input type="hidden" id="baseurl" value="<?php echo base_url();?>">
		<?php $this->load->view("script.php");?>
		<script>	
			<?php if($this->session->flashdata('g_success') || $this->session->flashdata('g_err')){?> 
			    $(document).ready( function() {
		       		 document.getElementById("pop_up_success").click()
		        });
		    <?php } ?>
    	</script>
		<script>
			function activeunactive_items(val,ival) {
				var unactive;
				var unactv;
				var baseurl= $("#baseurl").val();
				var a = $("#activeunactive_"+ival).val();
				if(a=='0') {
					unactive='1';
					unactv="Active"
				}
				else{
					unactive='0';
					unactv="In-Active"
				}
				var datastring="id="+val+"&status="+unactive;
				$.ajax({
					type:"POST",
					url:baseurl+'Assetsubcategory/assetsubcategory_active',
					data:datastring,
					cache: false,
					dataType: "html",
					success: function(result){

						if(a=='0'){
				         $("#active_item_master").css('display','block');
							   $("#active_item_master").addClass('response');
				        }else{
				         $("#deactive_item_master").css('display','block');
							   $("#deactive_item_master").addClass('response');
				        }      
			            setTimeout(function() {
				        	 location.reload();
				        }, 2000);
					}
				});
			}	
		</script>
		<script> 

			var uniq = 0;
				function checkunique_add()
				{
				   var val          = $('#assetsubcategoryname').val();
				   var cat          = $('#assetcategoryid').val();
				   var baseurl      = $("#baseurl").val();
				   // alert(val)
				   if (val!='') {
					   $.ajax({
					      type:"POST",
					      url:baseurl+'Assetsubcategory/checkunique_add',
					      data:"value="+val+"&cat="+cat,
					      cache: false,
					      dataType: "html",
					      success: function(result){
					        if(result==1)
					        {
					            $('#assetsubcategoryname_err').html('Asset Sub Category already exists!');
					            $('#btnSubmit').prop('disabled', true);
					            uniq = 1;
					        }
					        else
					        {
					            $('#assetsubcategoryname_err').html('');
					            $('#btnSubmit').prop('disabled', false);
					            uniq = 0;
					        }
					      }
					   });
				   }
				}
			function  addvalidation(){

				var err = 0;
				var assetsubcategoryname          = $('#assetsubcategoryname').val();

				// alert(acnts_users);

					if(assetsubcategoryname.trim() =="")
					{
						
						$('#assetsubcategoryname_err').html('Enter Sub Category Required..!');
						err++;
											

					}
					else{

						if(uniq == 1)
			      {
			         $('#assetsubcategoryname_err').html('Asset Sub Category already exists!');
			         err++;
			      }
			      else
			      {
			      	
			         $('#assetsubcategoryname_err').html('');
			      }
					}

					var assetcategoryid          = $('#assetcategoryid').val();

					if(assetcategoryid.trim() =="")
					{
						
						$('#assetcategoryid_err').html('Select Category Required..!');
						err++;
					}
					else{
			       $('#assetcategoryid_err').html('');
					}
					
					// alert(err) ;

					if (err>0) { return false; }else{ return true;} 

			}
		</script>
		<script>
			$("#asset_category_table").DataTable({
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
				function edit(val) {

						var baseurl= $("#baseurl").val();
						//alert(val);
						$.ajax({
						type: "POST",
						url: baseurl+'Assetsubcategory/edit',
						async: false,
						type: "POST",
						data: "id="+val,
						dataType: "html",
						success: function(response)
						{

							if (response) {

								$('#kt_modal_edit_subcategory').empty().append(response);
							  $('#kt_modal_edit_subcategory').addClass('show');
							}

							
						}
						});
				}

				function closeEditModal()
					{
						var baseurl= $("#baseurl").val();
						$('#kt_modal_edit_subcategory').removeClass('show');
						//$("#kt_modal_update_role").css("display", "none");
						$('.modal-backdrop').removeClass('show');
						location.reload();
					}


			function deleteassetcategory(val){
					var baseurl= $("#baseurl").val();
					//alert(val);
					$.ajax({
					type: "POST",
					url: baseurl+'Assetsubcategory/deleteassetsubcategory',
					async: false,
					type: "POST",
					data: "id="+val,
					dataType: "html",
					success: function(response)
					{
					  $('#kt_modal_delete_category').empty().append(response);
					  $('#kt_modal_delete_category').addClass('show');
					//$("#kt_modal_delete_role").css("display", "block");
					}
					});
			}

			function removecategory(val)
			{ 
					var baseurl= $("#baseurl").val();
					$.ajax({
					type: "POST",
					url: baseurl+'Assetsubcategory/delete',
					async: false,
					data:"field="+val,
					success: function(response)
					{
						location.reload();
					}
					});
			}
		</script>
	</body>
	<!--end::Body-->
</html>