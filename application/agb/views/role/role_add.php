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
									<h1 class="d-flex align-items-center text-dark fw-bold my-1 fs-3">New Role 
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

                       <form name="role_add_form" id="role_add_form" method="POST" action="<?php echo base_url(); ?>role/role_save" enctype="multipart/form-data" onsubmit="return role_validation();">
								
								<!--begin::Card body-->
								<div class="card-body py-4">
									<div class="row ">
										<label class="col-lg-2 col-form-label required fw-semibold fs-6">Role Name</label>
													<!--end::Label-->
													<!--begin::Col-->
													<div class="col-lg-4 fv-row fv-plugins-icon-container">
														<input type="text" id="role" name="role" class="form-control form-control-lg form-control-solid" placeholder="Role Name" onkeyup="role_unique(this.value);">
														<div class="fv-plugins-message-container invalid-feedback" id="role_err"></div>
													</div>
													<!-- <div class="col-lg-4 fv-row fv-plugins-icon-container">
														<div class="mb-0">
											                <div class="form-check">
											                    <input class="form-check-input" type="checkbox" value="1" id="select_all" name="select_all" checked="" onclick="select_all_permission();">
											                    <label class="form-check-label" for="flexCheckChecked" >
											                        Select All
											                    </label>
											                </div>
											            </div>
													</div> -->
									</div>
									<hr>
									<h3>Role Permissions</h3><br>
									<?php 
									foreach ($menu_list as $mlist) 
									{
									?>
									<div class="row">
										<div class="col-lg-3 fv-row fv-plugins-icon-container">
											<div class="form-check">
												 <input type="hidden" id="menuid" name="menuid[]" value="<?php echo $mlist['MENU_ID'];?>">
							                    <input class="form-check-input" type="checkbox" value="1" id="<?php echo 'menuid_'.$mlist['MENU_ID'];?>" name="menu_id[<?php echo $mlist['MENU_ID']; ?>]" checked="" onclick="select_permission(this.id);">
							                    <h4><label class="form-check-label" for="flexCheckChecked" style="">
							                        <?php echo $mlist['MENU_NAME'];?>
							                    </label></h4>

							                </div>
										</div>
										<?php 
										if(($mlist['IS_PARENT']==0 && $mlist['PARENT_MENU_ID']==0)||($mlist['VALUE']=="View~Add~Edit~Delete~Verify"))
										{
											$permission=explode('~', $mlist['VALUE']);
											$cnt=count($permission);
											for ($i=0;$i<$cnt;$i++)
											{
												?>
										<div class="col-lg-1 fv-row fv-plugins-icon-container">
											<!-- <input type="hidden" id="permission" name="permission[]" value="<?php echo $mlist['MENU_ID'];?>"> -->
											<input class="form-check-input" type="checkbox" value="1" id="<?php echo $mlist['MENU_ID'].'_'.$permission[$i];?>" name="<?php echo $permission[$i];?>permission[<?php echo $mlist['MENU_ID']; ?>]" checked="">
							                    <label class="form-check-label" for="flexCheckChecked" >
							                        <?php echo $permission[$i];?>
							                    </label>
										</div>		
										<?php
											}
											}
											else
											{
												$permission=explode('~', $mlist['VALUE']);
												$cnt=count($permission);
												for ($i=0;$i<$cnt;$i++)
												{
												?>

												<div class="col-lg-1 fv-row fv-plugins-icon-container">
											<!-- <input type="hidden" id="permission" name="permission[]" value="<?php echo $mlist['MENU_ID'];?>"> -->
											<input class="form-check-input" type="checkbox" value="1" id="<?php echo $mlist['MENU_ID'].'_'.$permission[$i];?>" name="<?php echo $permission[$i];?>permission[<?php echo $mlist['MENU_ID']; ?>]" checked="" style="display: none;">
							                    <label class="form-check-label" for="flexCheckChecked" style="display: none" >
							                        <?php echo $permission[$i];?>
							                    </label>
										</div>		
											<?php }}
										?>
									</div>
									<br>
									
									<?php 
										$sub_menu_list=$this->db->query("select * from MENU where PARENT_MENU_ID=".$mlist['MENU_ID']." order by MENU_ID asc")->result_array();
										foreach ($sub_menu_list as $smlist) {
										?>
										<!-- if() -->
										<div class="row">
										<div class="col-lg-3 fv-row fv-plugins-icon-container">
											<input type="hidden" id="menuid" name="menuid[]" value="<?php echo $smlist['MENU_ID'];?>">
											<input class="form-check-input" type="checkbox" value="1" id="<?php echo 'menuid_'.$smlist['MENU_ID'];?>" name="menu_id[<?php echo $smlist['MENU_ID']; ?>]" checked="" onclick="select_single_permission(this.id);">
							                    <label class="form-check-label" for="flexCheckChecked"><b>
							                        <?php echo $smlist['MENU_NAME'];?>
							                    </b></label>

										</div>
										<?php 
											$permission=explode('~', $smlist['VALUE']);
											$cnt=count($permission);
											for ($i=0;$i<$cnt;$i++)
											{
												?>
										<div class="col-lg-1 fv-row fv-plugins-icon-container">
											<!-- <input type="hidden" id="permission" name="permission[]" value="<?php echo $mlist['MENU_ID'];?>"> -->
											<input class="form-check-input" type="checkbox" value="1" id="<?php echo $smlist['MENU_ID'].'_'.$permission[$i];?>" name="<?php echo $permission[$i];?>permission[<?php echo $smlist['MENU_ID']; ?>]" checked="">
							                    <label class="form-check-label" for="flexCheckChecked" >
							                        <?php echo $permission[$i];?>
							                    </label>
										</div>		
										<?php
											}
										?>
										
									</div>
									<br>
										<?php											
										}
										?>

									<?php 
									}
									?>
									<div class="row">
								<div class="col-lg-8"></div>

								<div class="col-lg-1">
									<div class="d-flex  flex-row-fluid pt-12">
										<button type="reset" class="btn btn-secondary me-3" data-bs-dismiss="modal">Cancel</button>
									</div>
								</div>
								<div class="col-lg-3">
									<div class="d-flex  flex-row-fluid pt-12">
										<button type="submit" class="btn btn-primary">Save Changes</button>
									</div>
								</div>
							</div>
								</div>
								<!--end::Card body-->
							</form>

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
		
		<!--begin::Modal - edit company-->
		<div class="modal fade" id="kt_modal_editdept" tabindex="-1" aria-hidden="true">
			
		</div>
		<!--end::Modal - edit company-->
		
		<!--begin::Modal - delete role-->
		<div class="modal fade" id="kt_modal_delete_role" tabindex="-1" aria-hidden="true">
			
		</div>
		<!--end::Modal - delete role-->
		<input type="hidden" id="baseurl" value="<?php echo base_url();?>">
		<?php $this->load->view("script");?>
		<script>

var title = $('title').text() + ' | ' + 'Role';
    $(document).attr("title", title);



var berr=0;
function role_unique(val)
{
	var baseurl= $("#baseurl").val();
	$.ajax({
		type:"POST",
		url:baseurl+'role/role_unique',
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

function select_all_permission(id)
{	
	var all=$('#select_all').val();
	alert("all");

}	
function select_permission(id)
{

	var baseurl= $("#baseurl").val();
	var menu_id=id;
	res=menu_id.split("_");
	
	select_single_permission(menu_id);
	if(document.getElementById(id).checked==true)
	{
		$.ajax({
		type:"POST",
		url:baseurl+'role/fetch_sub_menu_details',
		data:{'value':res[1]},
		cache: false,
		dataType: "html",
			success: function(result){
				// alert(result);
				res1=result.split("||");
				sm_id=res1[1].split(",");
				sm_perm=res1[2].split(",");
				
				count=sm_id.length;
				for (i=0;i<count;i++)
				{
					// alert('menuid_'+sm_id[i]);
					document.getElementById('menuid_'+sm_id[i]).checked=true;
					document.getElementById('menuid_'+sm_id[i]).value='1'; //val('1');
					single_perm=sm_perm[i].split("~");
					for(j=0;j<single_perm.length;j++)
					{
						// alert(sm_id[i]+'_'+single_perm[j]);
						document.getElementById(sm_id[i]+'_'+single_perm[j]).checked=true;
						document.getElementById(sm_id[i]+'_'+single_perm[j]).value='1';
					}
				}
				
		}
	});

	}
	else
	{
		// alert("else");
		$.ajax({
		type:"POST",
		url:baseurl+'role/fetch_sub_menu_details',
		data:{'value':res[1]},
		cache: false,
		dataType: "html",
			success: function(result){
				// alert(result);
				res1=result.split("||");
				sm_id=res1[1].split(",");
				sm_perm=res1[2].split(",");
				
				count=sm_id.length;
				for (i=0;i<count;i++)
				{
					// alert('menuid_'+sm_id[i]);
					document.getElementById('menuid_'+sm_id[i]).checked=false;
					document.getElementById('menuid_'+sm_id[i]).value='0';
					single_perm=sm_perm[i].split("~");
					for(j=0;j<single_perm.length;j++)
					{
						// alert(sm_id[i]+'_'+single_perm[j]);
						document.getElementById(sm_id[i]+'_'+single_perm[j]).checked=false;
						document.getElementById(sm_id[i]+'_'+single_perm[j]).value='0';
					}
				}
				
		}
	});
	}
}
function select_single_permission(id)
{
	// alert("submenu");
	var baseurl= $("#baseurl").val();
	var menu_id=id;
	res=menu_id.split("_");
	// alert(res[1]);
	if(document.getElementById(id).checked==true)
	{
		document.getElementById(id).value='1';
		$.ajax({
		type:"POST",
		url:baseurl+'role/fetch_menu_permission',
		data:{'value':res[1]},
		cache: false,
		dataType: "html",
			success: function(result){
				// alert(result);
				res1=result.split("||");
				// alert(res1[1]);
				sm_perm=res1[1].split("~");
				// alert(sm_perm);
				count=sm_perm.length;
				for (i=0;i<count;i++)
				{
					document.getElementById(res[1]+'_'+sm_perm[i]).checked=true;
					document.getElementById(res[1]+'_'+sm_perm[i]).value='1';
				}
				
		}
	});
	}
	else
	{
		document.getElementById(id).value='0';
		$.ajax({
		type:"POST",
		url:baseurl+'role/fetch_menu_permission',
		data:{'value':res[1]},
		cache: false,
		dataType: "html",
			success: function(result){
				// alert(result);
				res1=result.split("||");
				// alert(res1[1]);
				sm_perm=res1[1].split("~");
				// alert(sm_perm);
				count=sm_perm.length;
				for (i=0;i<count;i++)
				{
					document.getElementById(res[1]+'_'+sm_perm[i]).checked=false;
					document.getElementById(res[1]+'_'+sm_perm[i]).value='0';
				}
				
		}
	});
	}

}

	
		</script>
	</body>
	<!--end::Body-->
</html>