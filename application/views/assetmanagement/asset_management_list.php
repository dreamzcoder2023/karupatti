<?php $this->load->view("common.php");?>
<style>
	#chit_cus_sch #chit_cus_sch_tltip {
		  display: none;
			}
	#chit_cus_sch:hover #chit_cus_sch_tltip {
	  display: block;
	  position: absolute;
	  margin-top: 0.5em;
	  margin-left: -4.5em !important;
	  color: white;
	  background: black;
	  padding: 3px 13px 3px 10px;
	  border-radius: 5px;
	  font-size: 12px;
	}
	.k-tooltip-content
	{
		min-width: 150px !important;
	}
	.k-animation-container
	{
		max-width: 300px !important;
	}
	.k-animation-container-sm
	{
		max-width: 300px !important;
	}
	.error 
	{
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
									<h1 class="d-flex align-items-center text-dark fw-bold my-1 fs-3">Asset Management
									<!--begin::Separator-->
									<span class="h-20px border-gray-400 border-start ms-3 mx-2"></span>
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
										<!--begin::Card body-->
										<div class="card-body py-4">
											<div class="d-flex justify-content-end align-items-center">
												<a href="javascript:;"  onclick="full_print();">
													<button type="button" class="btn btn-sm btn-outline btn-outline-solid btn-outline-warning btn-active-light-primary me-3">Print</button>
												</a>
												<button type="button" class="btn btn-sm btn-outline btn-outline-solid btn-outline-warning btn-active-light-primary me-3">Export</button>
												<button type="submit" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_new_asset">New Asset</button>
												<!-- <a href="asset_mgnt_add.php" target="_blank">
													<button type="button" class="btn btn-primary">New Asset</button>
												</a> -->
											</div>
											<form id="full_print_form" method="post" >
												<table class="table align-middle table-row-dashed table-striped table-hover fs-7 gy-1 gs-2" id="kt_datatable_asset_mgnt">
													<!--begin::Table head-->
													<thead>
														<tr class="text-start text-muted fw-bold fs-7 gs-0">
															<th class="min-w-50px">
																<input class="form-check-input me-1" type="checkbox" name="all" id="asset_print_checkall">
																<span class="fs-7">Select</span>
														    </th>

															<th class="min-w-80px">Date / Company</th>
															<th class="min-w-80px">Pur.Date /<br>Asset No</th>
															<th class="min-w-80px">Category /<br>Sub Cate.</th>
															<th class="min-w-80px">Asset Name</th>
															<th class="min-w-50px">Value</th>
															<th class="min-w-80px">Allocated To</th>
															<th class="min-w-80px">Place /<br>Used By</th>
															<th class="min-w-25px">Image</th>
															<th class="min-w-150px">Status</th>
															<th class="min-w-125px"><span class="text-end">Actions</span></th>
														</tr>
													</thead>
													<!--end::Table head-->
													<!--begin::Table body-->

													<tbody class="text-gray-600 fw-semibold">

														<?php if(isset($assetmanagementlist)){ 
															foreach ($assetmanagementlist as $i => $list) { ?>
															<tr>
																<td>
													            	<input class="form-check-input asset_print_chk" type="checkbox" id="checked<?php echo $i; ?>" name="checked[]" value="<?php echo $list['assetmanagementid']; ?>">

													            	<input type="hidden" name="print_count" id="print_count" value="<?php echo $i?$i:0; ?>">
																	<span class="fw-semibold fs-7"></span>
													            </td>
																<td class="ple1">

																	<span> 
																		<?php
																     	$date_format  = $this->db->query("SELECT * FROM general_settings ")->row();
																	 	 	$format= $date_format->date_format;
																	 		echo date("$format", strtotime($list['assetdate']));
																		?>
																	</span>
																	<span class="d-block">
																		<?php 
																			if (isset($list['companycode'])){
																				$company  = $this->db->query("SELECT * FROM COMPANY WHERE ACTIVE='Y' AND COMPANYCODE='". $list['companycode']."' ")->row();

																					if(isset($company)){
																					 	echo $company->COMPANYNAME;
																					}else{
																						echo '-';
																					}

																			}else{
																				echo '-';
																			}
																			
																	 	?>
																	</span>
																</td>
																<td>
																	<span><?php  echo date("$format", strtotime($list['purchasedate'])); ?></span>
																	<label class="d-block">
																	 	<span class="badge badge-info fs-7 fw-semibold"><?php echo $list['assetnumber'];?></span>
																	</label>
																</td>
																<td class="ple1">
																	<span><?php echo $list['assetcategoryname'];?></span>
																	<span class="d-block fs-7"><?php echo $list['assetsubcategoryname'];?></span>
																</td>
																<td class="ple1"><?php echo $list['assetname']; ?></td>
																<td>
																	<span class="badge badge-success fs-7 fw-semibold"><?php echo number_format($list['assetvalue']?$list['assetvalue']:0,2,'.',','); ?></span>
																</td>
																<td class="ple1">
																	<?php if ($list['allocatedtype']==1) {
																	echo 'Company'; }else { echo 'Staff' ;} ?>
																</td>
																<td class="ple1">

																	<?php
																		if ($list['allocatedtype']==1) {
																			echo $list['allocatedtocompany']; 
																		} 
																		else 
																		{ 
																			if (isset($list['allocatedtostaff'])){
																				$staff  = $this->db->query("SELECT * FROM STAFFS WHERE SNO='". $list['allocatedtostaff']."' ")->row();

																					if(isset($staff)){
																					 	echo $staff->STAFFNAME?$staff->STAFFNAME:'-';
																					}else{
																						echo '-';
																					}

																			}else{
																				echo '-';
																			}
																		}
																	 ?>														
																</td>
																<td>
																	<?php $image_url =  base_url().'assets/images/assetimages/asset/'.$list['assetimage'];
																	 if($image_url && $list['assetimage']!=''){?> 

																		<a class="d-block overlay"  href="<?php echo base_url(); ?>assets/images/assetimages/asset/<?php echo $list['assetimage']; ?>" data-fslightbox="lightbox-basic">
																		    <!--begin::Image-->
																		    <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded w-35px h-35px"
																		    style="background-image:url('<?php echo base_url(); ?>assets/images/assetimages/asset/<?php echo $list['assetimage']; ?>')">
																		    </div>
																		    <!--end::Image-->
																		    <!--begin::Action-->
																		    <div class="overlay-layer card-rounded bg-dark bg-opacity-25 shadow w-35px h-35px">
																		        <i class="bi bi-eye-fill text-white fs-2"></i>
																		    </div>
																		    <!--end::Action-->
																  	</a>
									                              <?php }else{?>
									                               <a class="d-block overlay"  href="assets/images/asset.jpg" data-fslightbox="lightbox-basic_list">
																	    <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded w-35px h-35px"
																	    style="background-image:url('assets/images/asset.jpg')">
																	    </div>
																	    <div class="overlay-layer card-rounded bg-dark bg-opacity-25 shadow w-35px h-35px">
																	        <i class="bi bi-eye-fill text-white fs-2"></i>
																	    </div>
																 	</a>
																	<?php }?>																	
																</td>
																<td>
																	<?php 

																	if ($list['status']==1){
																		echo '<label class="col-form-label fw-semibold fs-7">
																					<span style="background-color:#50cd89;border-radius: 8px;padding: 5px 15px 5px 15px;">Working</span>
																				</label>';
																	} 
																	if ($list['status']==2){
																		echo '<label class="col-form-label fw-semibold fs-7">
																				<span style="background-color:#7bfff9;border-radius: 8px;padding: 5px 15px 5px 15px;">Maintenance</span>
																				</label>';
																	} 
																	if ($list['status']==3){
																		echo '<label class="col-form-label fw-semibold fs-7">
																				<span style="background-color:#5fbdff;border-radius: 8px;padding: 5px 15px 5px 15px;">Repair</span>
																			</label>';
																	} 
																	if ($list['status']==4){
																		echo '<label class="col-form-label fw-semibold fs-7">
																				<span style="background-color:red;color: white;border-radius: 8px;padding: 5px 15px 5px 15px;">Damage</span>
																			</label>';
																	} 
																	if ($list['status']==5){
																		echo '<label class="col-form-label fw-semibold fs-7">
																				<span style="background-color:#ffc700;border-radius: 8px;padding: 5px 15px 5px 15px;">Need To Change</span>
																			</label>';
																	} 
																	if ($list['status']==6){
																		echo '<label class="col-form-label fw-semibold fs-7">
																					<span style="background-color:#ff4ea0;color: white;border-radius: 8px;padding: 5px 15px 5px 15px;">Dead</span>
																				</label>';
																	} 
																	?>
																</td>
																<td>

																	<span class="text-end">

																		<a href="javascript:;" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm" data-bs-toggle="modal" data-bs-target="#kt_modal_view_asset" title="View" onclick="assetview(<?php echo $list['assetmanagementid']; ?>)">
																			<i class="bi bi-eye-fill eyc"></i>
																		</a>
																		<a href="<?php echo base_url();?>Assetmanagement/assetmanagementhistory/<?php echo $list['assetmanagementid']; ?>" target="_blank" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm" title="History">
																			<i class="fas fa-clock-rotate-left eyc fs-3"></i>
																		</a>
																		<button class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
																			<i class="fas fa-ellipsis-v eyc"></i>
																		</button>
																		<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-250px py-3" data-kt-menu="true" style="">
																			<div class="scroll-y mh-200px my-2 px-1">
																				<?php if ($list['status']==1) { ?>

																				<div class="menu-item px-3">
																					<a href="javascript:;" data-bs-toggle="modal" data-bs-target="#kt_modal_asset_maintenance" class="menu-link px-3" onclick="statuschage('<?php echo $list['assetmanagementid']; ?>',2,'<?php echo $list['assetname']; ?>')">Give For Maintenance</a>
																				</div>
																				<div class="menu-item px-3">
																					<a href="javascript:;" data-bs-toggle="modal" data-bs-target="#kt_modal_asset_repair" class="menu-link px-3"onclick="statuschage('<?php echo $list['assetmanagementid']; ?>',3,'<?php echo $list['assetname']; ?>')">Give For Repair</a>
																				</div>
																				<div class="menu-item px-3">
																					<a href="javascript:;" data-bs-toggle="modal" data-bs-target="#kt_modal_asset_damage" class="menu-link px-3" onclick="statuschage('<?php echo $list['assetmanagementid']; ?>',4,'<?php echo $list['assetname']; ?>')">Damege</a>
																				</div>
																				<div class="menu-item px-3">
																					<a href="javascript:;" data-bs-toggle="modal" data-bs-target="#kt_modal_asset_change" class="menu-link px-3" onclick="statuschage('<?php echo $list['assetmanagementid']; ?>',5,'<?php echo $list['assetname']; ?>')">Need To Change</a>
																				</div>
																				<div class="menu-item px-3">
																					<a href="javascript:;" data-bs-toggle="modal" data-bs-target="#kt_modal_asset_dead" class="menu-link px-3" onclick="statuschage('<?php echo $list['assetmanagementid']; ?>',6,'<?php echo $list['assetname']; ?>')">Dead</a>
																				</div>
																				<?php } ?>
																				<?php if ($list['status']==2) { ?>
																				<div class="menu-item px-3">
																					<a href="javascript:;" data-bs-toggle="modal" data-bs-target="#kt_modal_asset_working" class="menu-link px-3" onclick="statuschage('<?php echo $list['assetmanagementid']; ?>',1,'<?php echo $list['assetname']; ?>')">Working Well</a>
																				</div>
																				<div class="menu-item px-3">
																					<a href="javascript:;" data-bs-toggle="modal" data-bs-target="#kt_modal_asset_repair" class="menu-link px-3"onclick="statuschage('<?php echo $list['assetmanagementid']; ?>',3,'<?php echo $list['assetname']; ?>')">Give For Repair</a>
																				</div>
																				<div class="menu-item px-3">
																					<a href="javascript:;" data-bs-toggle="modal" data-bs-target="#kt_modal_asset_damage" class="menu-link px-3" onclick="statuschage('<?php echo $list['assetmanagementid']; ?>',4,'<?php echo $list['assetname']; ?>')">Damege</a>
																				</div>
																				<div class="menu-item px-3">
																					<a href="javascript:;" data-bs-toggle="modal" data-bs-target="#kt_modal_asset_change" class="menu-link px-3" onclick="statuschage('<?php echo $list['assetmanagementid']; ?>',5,'<?php echo $list['assetname']; ?>')">Need To Change</a>
																				</div>
																				<div class="menu-item px-3">
																					<a href="javascript:;" data-bs-toggle="modal" data-bs-target="#kt_modal_asset_dead" class="menu-link px-3" onclick="statuschage('<?php echo $list['assetmanagementid']; ?>',6,'<?php echo $list['assetname']; ?>')">Dead</a>
																				</div>
																				<?php } ?>
																				<?php if ($list['status']==3) { ?>
																				<div class="menu-item px-3">
																					<a href="javascript:;" data-bs-toggle="modal" data-bs-target="#kt_modal_asset_working" class="menu-link px-3" onclick="statuschage('<?php echo $list['assetmanagementid']; ?>',1,'<?php echo $list['assetname']; ?>')">Working Well</a>
																				</div>
																				<div class="menu-item px-3">
																					<a href="javascript:;" data-bs-toggle="modal" data-bs-target="#kt_modal_asset_damage" class="menu-link px-3" onclick="statuschage('<?php echo $list['assetmanagementid']; ?>',4,'<?php echo $list['assetname']; ?>')">Damege</a>
																				</div>
																				<div class="menu-item px-3">
																					<a href="javascript:;" data-bs-toggle="modal" data-bs-target="#kt_modal_asset_change" class="menu-link px-3" onclick="statuschage('<?php echo $list['assetmanagementid']; ?>',5,'<?php echo $list['assetname']; ?>')">Need To Change</a>
																				</div>
																				<div class="menu-item px-3">
																					<a href="javascript:;" data-bs-toggle="modal" data-bs-target="#kt_modal_asset_dead" class="menu-link px-3" onclick="statuschage('<?php echo $list['assetmanagementid']; ?>',6,'<?php echo $list['assetname']; ?>')">Dead</a>
																				</div>
																				<?php } ?>
																				<?php if ($list['status']==4) { ?>
																				<div class="menu-item px-3">
																					<a href="javascript:;" data-bs-toggle="modal" data-bs-target="#kt_modal_asset_working" class="menu-link px-3" onclick="statuschage('<?php echo $list['assetmanagementid']; ?>',1,'<?php echo $list['assetname']; ?>')">Working Well</a>
																				</div>
																				<div class="menu-item px-3">
																					<a href="javascript:;" data-bs-toggle="modal" data-bs-target="#kt_modal_asset_repair" class="menu-link px-3"onclick="statuschage('<?php echo $list['assetmanagementid']; ?>',3,'<?php echo $list['assetname']; ?>')">Give For Repair</a>
																				</div>
																				<div class="menu-item px-3">
																					<a href="javascript:;" data-bs-toggle="modal" data-bs-target="#kt_modal_asset_change" class="menu-link px-3" onclick="statuschage('<?php echo $list['assetmanagementid']; ?>',5,'<?php echo $list['assetname']; ?>')">Need To Change</a>
																				</div>
																				<div class="menu-item px-3">
																					<a href="javascript:;" data-bs-toggle="modal" data-bs-target="#kt_modal_asset_dead" class="menu-link px-3" onclick="statuschage('<?php echo $list['assetmanagementid']; ?>',6,'<?php echo $list['assetname']; ?>')">Dead</a>
																				</div>
																				<?php } ?>

																				<?php if ($list['status']==5) { ?>
																				<div class="menu-item px-3">
																					<a href="javascript:;" data-bs-toggle="modal" data-bs-target="#kt_modal_asset_dead" class="menu-link px-3" onclick="statuschage('<?php echo $list['assetmanagementid']; ?>',6,'<?php echo $list['assetname']; ?>')">Dead</a>
																				</div>
																				<?php } ?>
																				<div class="menu-item px-3">
																					<a href="<?php echo base_url(); ?>Assetmanagement/printsingle/<?php echo $list['assetmanagementid']; ?>" target="_blank" class="menu-link px-3">Print</a>
																				</div>
																				<!-- < ?php if ($list['status']!=6) { ?> -->
																				<!-- <div class="menu-item px-3">
																					<a href="javascript:;" data-bs-toggle="modal" data-bs-target="#kt_modal_edit_asset" class="menu-link px-3">Edit</a>
																				</div> -->
																				<!-- < ?php } ?> -->
																				<div class="menu-item px-3">
																					<a href="javascript:;" data-bs-toggle="modal" data-bs-target="#kt_modal_delete_asset" class="menu-link px-3" onclick="statuschage('<?php echo $list['assetmanagementid']; ?>',0,'<?php echo $list['assetname']; ?>')">Delete</a>
																				</div>
																			</div>
																		</div>
																	</span>
																</td>
															</tr>
														<?php $i++; } } ?>
													</tbody>
													<!--end::Table body-->
												</table>
											</form>
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
		<!--begin::Modal - New Asset -->
		<div class="modal fade" id="kt_modal_new_asset" tabindex="-1" aria-hidden="true" data-bs-keyboard="false" data-bs-backdrop="static">
			<div class="modal-dialog modal-xl-loan">
				<!--begin::Modal content-->
				<div class="modal-content rounded">
					<!--begin::Modal header-->
					<div class="modal-header justify-content-end border-0 pb-0">
						<!--begin::Close-->
						<button class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
							<!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
							<span class="svg-icon svg-icon-1">
								<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
									<rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="currentColor" />
									<rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="currentColor" />
								</svg>
							</span>
							<!--end::Svg Icon-->
						</button>
						<!--end::Close-->
					</div>
					<!--end::Modal header-->
					<div class="modal-body pt-0 pb-15 px-5 px-xl-20">
						<!--begin::Heading-->
						<div class="mb-3 text-center">
							<h1 class="mb-3">New Asset</h1>
						</div>
						<form method="POST" action="<?php echo base_url(); ?>Assetmanagement/assetmanagementadd" enctype="multipart/form-data" onsubmit="return addvalidation(); ">
							<!-- addvalidation(); -->
							<div class="row">
								<label class="col-lg-1 col-form-label required fw-semibold fs-6">Date</label>
								<div class="col-lg-2 fv-row">
									<div class="d-flex align-items-center">
										<span class="svg-icon position-absolute ms-4 svg-icon-2 dt">
											<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
												<path opacity="0.3" d="M21 22H3C2.4 22 2 21.6 2 21V5C2 4.4 2.4 4 3 4H21C21.6 4 22 4.4 22 5V21C22 21.6 21.6 22 21 22Z" fill="currentColor" />
												<path d="M6 6C5.4 6 5 5.6 5 5V3C5 2.4 5.4 2 6 2C6.6 2 7 2.4 7 3V5C7 5.6 6.6 6 6 6ZM11 5V3C11 2.4 10.6 2 10 2C9.4 2 9 2.4 9 3V5C9 5.6 9.4 6 10 6C10.6 6 11 5.6 11 5ZM15 5V3C15 2.4 14.6 2 14 2C13.4 2 13 2.4 13 3V5C13 5.6 13.4 6 14 6C14.6 6 15 5.6 15 5ZM19 5V3C19 2.4 18.6 2 18 2C17.4 2 17 2.4 17 3V5C17 5.6 17.4 6 18 6C18.6 6 19 5.6 19 5Z" fill="currentColor" />
												<path d="M8.8 13.1C9.2 13.1 9.5 13 9.7 12.8C9.9 12.6 10.1 12.3 10.1 11.9C10.1 11.6 10 11.3 9.8 11.1C9.6 10.9 9.3 10.8 9 10.8C8.8 10.8 8.59999 10.8 8.39999 10.9C8.19999 11 8.1 11.1 8 11.2C7.9 11.3 7.8 11.4 7.7 11.6C7.6 11.8 7.5 11.9 7.5 12.1C7.5 12.2 7.4 12.2 7.3 12.3C7.2 12.4 7.09999 12.4 6.89999 12.4C6.69999 12.4 6.6 12.3 6.5 12.2C6.4 12.1 6.3 11.9 6.3 11.7C6.3 11.5 6.4 11.3 6.5 11.1C6.6 10.9 6.8 10.7 7 10.5C7.2 10.3 7.49999 10.1 7.89999 10C8.29999 9.90003 8.60001 9.80003 9.10001 9.80003C9.50001 9.80003 9.80001 9.90003 10.1 10C10.4 10.1 10.7 10.3 10.9 10.4C11.1 10.5 11.3 10.8 11.4 11.1C11.5 11.4 11.6 11.6 11.6 11.9C11.6 12.3 11.5 12.6 11.3 12.9C11.1 13.2 10.9 13.5 10.6 13.7C10.9 13.9 11.2 14.1 11.4 14.3C11.6 14.5 11.8 14.7 11.9 15C12 15.3 12.1 15.5 12.1 15.8C12.1 16.2 12 16.5 11.9 16.8C11.8 17.1 11.5 17.4 11.3 17.7C11.1 18 10.7 18.2 10.3 18.3C9.9 18.4 9.5 18.5 9 18.5C8.5 18.5 8.1 18.4 7.7 18.2C7.3 18 7 17.8 6.8 17.6C6.6 17.4 6.4 17.1 6.3 16.8C6.2 16.5 6.10001 16.3 6.10001 16.1C6.10001 15.9 6.2 15.7 6.3 15.6C6.4 15.5 6.6 15.4 6.8 15.4C6.9 15.4 7.00001 15.4 7.10001 15.5C7.20001 15.6 7.3 15.6 7.3 15.7C7.5 16.2 7.7 16.6 8 16.9C8.3 17.2 8.6 17.3 9 17.3C9.2 17.3 9.5 17.2 9.7 17.1C9.9 17 10.1 16.8 10.3 16.6C10.5 16.4 10.5 16.1 10.5 15.8C10.5 15.3 10.4 15 10.1 14.7C9.80001 14.4 9.50001 14.3 9.10001 14.3C9.00001 14.3 8.9 14.3 8.7 14.3C8.5 14.3 8.39999 14.3 8.39999 14.3C8.19999 14.3 7.99999 14.2 7.89999 14.1C7.79999 14 7.7 13.8 7.7 13.7C7.7 13.5 7.79999 13.4 7.89999 13.2C7.99999 13 8.2 13 8.5 13H8.8V13.1ZM15.3 17.5V12.2C14.3 13 13.6 13.3 13.3 13.3C13.1 13.3 13 13.2 12.9 13.1C12.8 13 12.7 12.8 12.7 12.6C12.7 12.4 12.8 12.3 12.9 12.2C13 12.1 13.2 12 13.6 11.8C14.1 11.6 14.5 11.3 14.7 11.1C14.9 10.9 15.2 10.6 15.5 10.3C15.8 10 15.9 9.80003 15.9 9.70003C15.9 9.60003 16.1 9.60004 16.3 9.60004C16.5 9.60004 16.7 9.70003 16.8 9.80003C16.9 9.90003 17 10.2 17 10.5V17.2C17 18 16.7 18.4 16.2 18.4C16 18.4 15.8 18.3 15.6 18.2C15.4 18.1 15.3 17.8 15.3 17.5Z" fill="currentColor" />
											</svg>
										</span>
										<input class="form-control form-control-solid ps-12" name="asset_date" placeholder="Schedule Date" id="asset_date" value="<?php echo date('d-m-Y'); ?>"/>
									</div>
									<div class="fv-plugins-message-container invalid-feedback" name="date_err" id="date_err" ></div>
								</div>
								<!-- <label class="col-lg-1 col-form-label required fw-semibold fs-6">Company</label> -->
								<div class="col-lg-1">
									<label class="col-form-label required fw-semibold fs-6">Company</label>
								</div>
								<div class="col-lg-5 fv-row fv-plugins-icon-container">
									<select class="form-select form-select-solid" name="assetcompany" id="assetcompany" data-control="select2" data-hide-search="false" data-dropdown-parent="#kt_modal_new_asset">	
										<option value="">Select</option>
										<?php foreach($company_list as $company_list)
										{?>
										<option value="<?php echo $company_list['COMPANYCODE'] ;?>"><?php echo $company_list['COMPANYNAME'];?></option><?php
										 }?>
									</select>
									<div class="fv-plugins-message-container invalid-feedback" name="assetcompany_err" id="assetcompany_err" ></div>
								</div>
								<div class="col-lg-12 mt-4">
									<table class="table align-middle table-row-dashed table-striped table-hover fs-7 gy-1 gs-2" id="kt_datatable_asset_mgnt_add">
										<thead>
											<tr class="text-start text-muted fw-bold fs-7 gs-0">
												<th class="min-w-100px" style="min-width: 120px !important;">Pur.Date</th>
												<th class="min-w-80px">Cate. / Sub Cate.</th>
												<th class="min-w-125px">Name</th>
												<th class="min-w-80px">Value</th>
												<th class="min-w-80px">Allocated</th>
												<th class="min-w-50px">Place / Used By</th>
												<th class="min-w-25px">War.Duration</th>
												<th class="min-w-25px">War.Period</th>
												<th class="min-w-25px">Image</th>
												<th class="min-w-25px">War.card</th>
												<th class="min-w-50px" style="min-width:60px !important;">Remarks</th>
											</tr>
										</thead>
										<tbody class="text-gray-600 fw-semibold">
											<?php for ($i=0; $i <3 ; $i++) { ?>
												<tr>
													<td>
														<div class="d-flex align-items-center">
															<span class="svg-icon position-absolute ms-4 svg-icon-2 dt">
																<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																	<path opacity="0.3" d="M21 22H3C2.4 22 2 21.6 2 21V5C2 4.4 2.4 4 3 4H21C21.6 4 22 4.4 22 5V21C22 21.6 21.6 22 21 22Z" fill="currentColor" />
																	<path d="M6 6C5.4 6 5 5.6 5 5V3C5 2.4 5.4 2 6 2C6.6 2 7 2.4 7 3V5C7 5.6 6.6 6 6 6ZM11 5V3C11 2.4 10.6 2 10 2C9.4 2 9 2.4 9 3V5C9 5.6 9.4 6 10 6C10.6 6 11 5.6 11 5ZM15 5V3C15 2.4 14.6 2 14 2C13.4 2 13 2.4 13 3V5C13 5.6 13.4 6 14 6C14.6 6 15 5.6 15 5ZM19 5V3C19 2.4 18.6 2 18 2C17.4 2 17 2.4 17 3V5C17 5.6 17.4 6 18 6C18.6 6 19 5.6 19 5Z" fill="currentColor" />
																	<path d="M8.8 13.1C9.2 13.1 9.5 13 9.7 12.8C9.9 12.6 10.1 12.3 10.1 11.9C10.1 11.6 10 11.3 9.8 11.1C9.6 10.9 9.3 10.8 9 10.8C8.8 10.8 8.59999 10.8 8.39999 10.9C8.19999 11 8.1 11.1 8 11.2C7.9 11.3 7.8 11.4 7.7 11.6C7.6 11.8 7.5 11.9 7.5 12.1C7.5 12.2 7.4 12.2 7.3 12.3C7.2 12.4 7.09999 12.4 6.89999 12.4C6.69999 12.4 6.6 12.3 6.5 12.2C6.4 12.1 6.3 11.9 6.3 11.7C6.3 11.5 6.4 11.3 6.5 11.1C6.6 10.9 6.8 10.7 7 10.5C7.2 10.3 7.49999 10.1 7.89999 10C8.29999 9.90003 8.60001 9.80003 9.10001 9.80003C9.50001 9.80003 9.80001 9.90003 10.1 10C10.4 10.1 10.7 10.3 10.9 10.4C11.1 10.5 11.3 10.8 11.4 11.1C11.5 11.4 11.6 11.6 11.6 11.9C11.6 12.3 11.5 12.6 11.3 12.9C11.1 13.2 10.9 13.5 10.6 13.7C10.9 13.9 11.2 14.1 11.4 14.3C11.6 14.5 11.8 14.7 11.9 15C12 15.3 12.1 15.5 12.1 15.8C12.1 16.2 12 16.5 11.9 16.8C11.8 17.1 11.5 17.4 11.3 17.7C11.1 18 10.7 18.2 10.3 18.3C9.9 18.4 9.5 18.5 9 18.5C8.5 18.5 8.1 18.4 7.7 18.2C7.3 18 7 17.8 6.8 17.6C6.6 17.4 6.4 17.1 6.3 16.8C6.2 16.5 6.10001 16.3 6.10001 16.1C6.10001 15.9 6.2 15.7 6.3 15.6C6.4 15.5 6.6 15.4 6.8 15.4C6.9 15.4 7.00001 15.4 7.10001 15.5C7.20001 15.6 7.3 15.6 7.3 15.7C7.5 16.2 7.7 16.6 8 16.9C8.3 17.2 8.6 17.3 9 17.3C9.2 17.3 9.5 17.2 9.7 17.1C9.9 17 10.1 16.8 10.3 16.6C10.5 16.4 10.5 16.1 10.5 15.8C10.5 15.3 10.4 15 10.1 14.7C9.80001 14.4 9.50001 14.3 9.10001 14.3C9.00001 14.3 8.9 14.3 8.7 14.3C8.5 14.3 8.39999 14.3 8.39999 14.3C8.19999 14.3 7.99999 14.2 7.89999 14.1C7.79999 14 7.7 13.8 7.7 13.7C7.7 13.5 7.79999 13.4 7.89999 13.2C7.99999 13 8.2 13 8.5 13H8.8V13.1ZM15.3 17.5V12.2C14.3 13 13.6 13.3 13.3 13.3C13.1 13.3 13 13.2 12.9 13.1C12.8 13 12.7 12.8 12.7 12.6C12.7 12.4 12.8 12.3 12.9 12.2C13 12.1 13.2 12 13.6 11.8C14.1 11.6 14.5 11.3 14.7 11.1C14.9 10.9 15.2 10.6 15.5 10.3C15.8 10 15.9 9.80003 15.9 9.70003C15.9 9.60003 16.1 9.60004 16.3 9.60004C16.5 9.60004 16.7 9.70003 16.8 9.80003C16.9 9.90003 17 10.2 17 10.5V17.2C17 18 16.7 18.4 16.2 18.4C16 18.4 15.8 18.3 15.6 18.2C15.4 18.1 15.3 17.8 15.3 17.5Z" fill="currentColor" />
																</svg>
															</span>
															<input class="form-control form-control-solid ps-12 fs-7" name="asset_pur_date_add[]" placeholder="Date" id="asset_pur_date_add<?php echo $i; ?>" value="<?php echo date('d-m-Y'); ?>"/>
														</div>
													</td>
													<td>
														<select class="form-select form-select-solid fs-7" data-width="125px" name="subcatory_id[]" id="subcatory_id<?php echo $i; ?>" data-control="select2" data-hide-search="false" data-dropdown-parent="#kt_modal_new_asset">
															<option value="">Select</option>
															<?php foreach ($grouplist as $g => $val) {?>
																<optgroup label='<?php echo $val['assetcategoryname']; ?>'>
																	<?php foreach ($val['list'] as $key => $lt) {?>
																		<option value="<?php echo $lt['assetsubcategoryid']; ?>"> 
																			<?php echo $lt['assetsubcategoryname']; ?> 
																		</option>
																	<?php } ?>
																</optgroup>
															<?php } ?>
														</select>
													</td>
													<td>
														<input type="text" name="assetname[]" class="form-control form-control-lg1 form-control-solid fs-7" placeholder="Name" id="assetname<?php echo $i; ?>">
													</td>
													<td>
														<input type="text" name="assetvalue[]" class="form-control form-control-lg1 form-control-solid fs-7" placeholder="Value" id="assetvalue<?php echo $i; ?>">
													</td>
													<td>
														<select class="form-select form-select-solid fs-7" data-width="110px" name="atypechange[]" id="atypechange<?php echo $i; ?>" data-control="select2" data-hide-search="false" data-dropdown-parent="#kt_modal_new_asset" onchange="typechange(<?php echo $i; ?>)">
															<option value="">Select</option>
															<option value="1">Company</option>
															<option value="2">Staff</option>
														</select>
													</td>
													<td id="companytd<?php echo $i; ?>">

														<input type="text" name="assetallcompany[]" class="form-control form-control-lg1 form-control-solid fs-7" placeholder="Place" id="assetallcompany<?php echo $i; ?>" >
													</td>
													<td id="stafftd<?php echo $i; ?>" style="display: none;">
														<select class="form-select form-select-solid fs-7" data-width="110px" name="assetallstaff[]" id="assetallstaff<?php echo $i; ?>" data-control="select2" data-hide-search="false"data-dropdown-parent="#kt_modal_new_asset" >
															<option value="">Select</option>
															<?php foreach ($staff_list as  $slist) { ?>
																<option value="<?php echo $slist['SNO']; ?>"><?php echo ucfirst($slist['STAFFNAME']); ?></option>
															<?php } ?>
														</select>
													</td>
													<td>
														<input type="text" name="assetduration[]" class="form-control form-control-lg1 form-control-solid fs-7" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" placeholder="Duration" id="assetduration<?php echo $i; ?>">
													</td>
													<td>
														<select class="form-select form-select-solid fs-7" data-width="80px" name="assetperiod[]" id="assetperiod<?php echo $i; ?>" data-control="select2" data-hide-search="false" data-dropdown-parent="#kt_modal_new_asset">
															<option value="">Select</option>
															<option value="1">Month</option>
															<option value="2">Year</option>
														</select>
													</td>
													<td>
										            	<div class="image-input mt-2" data-kt-image-input="true">
															<div class="image-input-wrapper w-40px h-40px" style="background-image: url(assets/images/asset.jpg)"></div>
															<!--end::Preview existing avatar-->
															<!--begin::Label-->
															<label class="btn btn-icon btn-active-color-primary w-40px h-25px" data-kt-image-input-action="change" data-bs-toggle="tooltip" data-kt-initialized="1">
																<i class="bi bi-pencil-fill fs-8 ms-3"></i>
																<!--begin::Inputs-->
																<input type="file"   name="upload[asset][]" id="assetimage<?php echo $i; ?>" accept=".png, .jpg, .jpeg">
																<input type="hidden" name="assetimage_remove">
																<!--end::Inputs-->
															</label>
															<!--end::Label-->
															<!--begin::Cancel-->
															<span class="btn btn-icon btn-active-color-primary w-25px h-20px" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" data-kt-initialized="1">
																<i class="bi bi-x fs-3 ms-2"></i>
															</span>
															<!--end::Cancel-->
															<!--begin::Remove-->
															<span class="btn btn-icon btn-active-color-primary w-25px h-20px" data-kt-image-input-action="remove" data-bs-toggle="tooltip" data-kt-initialized="1">
																<i class="bi bi-x fs-3 ms-2"></i>
															</span>
															<!--end::Remove-->
														</div>
										            </td>
										            <td>
										            	<div class="image-input mt-2" data-kt-image-input="true">
															<div class="image-input-wrapper w-40px h-40px" style="background-image: url(assets/images/warrenty_card.jpg)"></div>
															<!--end::Preview existing avatar-->
															<!--begin::Label-->
															<label class="btn btn-icon btn-active-color-primary w-40px h-25px" data-kt-image-input-action="change" data-bs-toggle="tooltip" data-kt-initialized="1">
																<i class="bi bi-pencil-fill fs-8 ms-3"></i>
																<!--begin::Inputs-->
																<input type="file" name="upload[warranty][]" id="warranty<?php echo $i; ?>" accept=".png, .jpg, .jpeg">
																<input type="hidden" name="warranty_remove">
																<!--end::Inputs-->
															</label>
															<!--end::Label-->
															<!--begin::Cancel-->
															<span class="btn btn-icon btn-active-color-primary w-25px h-20px" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" data-kt-initialized="1">
																<i class="bi bi-x fs-3 ms-2"></i>
															</span>
															<!--end::Cancel-->
															<!--begin::Remove-->
															<span class="btn btn-icon btn-active-color-primary w-25px h-20px" data-kt-image-input-action="remove" data-bs-toggle="tooltip" data-kt-initialized="1">
																<i class="bi bi-x fs-3 ms-2"></i>
															</span>
															<!--end::Remove-->
														</div>
										            </td>
													<td>
														<textarea class="form-control form-control-solid fs-7" rows="1" placeholder="Remarks" name="remarks[]" id="remarks<?php echo $i; ?>"></textarea>
													</td>
												</tr>
											<?php } ?>
											<?php for ($i=3; $i <7 ; $i++) { ?>

												<tr id="asset_mgnt_tr_<?php echo $i; ?>" style="display: none;">
													<td>
														<div class="d-flex align-items-center">
															<span class="svg-icon position-absolute ms-4 svg-icon-2 dt">
																<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																	<path opacity="0.3" d="M21 22H3C2.4 22 2 21.6 2 21V5C2 4.4 2.4 4 3 4H21C21.6 4 22 4.4 22 5V21C22 21.6 21.6 22 21 22Z" fill="currentColor" />
																	<path d="M6 6C5.4 6 5 5.6 5 5V3C5 2.4 5.4 2 6 2C6.6 2 7 2.4 7 3V5C7 5.6 6.6 6 6 6ZM11 5V3C11 2.4 10.6 2 10 2C9.4 2 9 2.4 9 3V5C9 5.6 9.4 6 10 6C10.6 6 11 5.6 11 5ZM15 5V3C15 2.4 14.6 2 14 2C13.4 2 13 2.4 13 3V5C13 5.6 13.4 6 14 6C14.6 6 15 5.6 15 5ZM19 5V3C19 2.4 18.6 2 18 2C17.4 2 17 2.4 17 3V5C17 5.6 17.4 6 18 6C18.6 6 19 5.6 19 5Z" fill="currentColor" />
																	<path d="M8.8 13.1C9.2 13.1 9.5 13 9.7 12.8C9.9 12.6 10.1 12.3 10.1 11.9C10.1 11.6 10 11.3 9.8 11.1C9.6 10.9 9.3 10.8 9 10.8C8.8 10.8 8.59999 10.8 8.39999 10.9C8.19999 11 8.1 11.1 8 11.2C7.9 11.3 7.8 11.4 7.7 11.6C7.6 11.8 7.5 11.9 7.5 12.1C7.5 12.2 7.4 12.2 7.3 12.3C7.2 12.4 7.09999 12.4 6.89999 12.4C6.69999 12.4 6.6 12.3 6.5 12.2C6.4 12.1 6.3 11.9 6.3 11.7C6.3 11.5 6.4 11.3 6.5 11.1C6.6 10.9 6.8 10.7 7 10.5C7.2 10.3 7.49999 10.1 7.89999 10C8.29999 9.90003 8.60001 9.80003 9.10001 9.80003C9.50001 9.80003 9.80001 9.90003 10.1 10C10.4 10.1 10.7 10.3 10.9 10.4C11.1 10.5 11.3 10.8 11.4 11.1C11.5 11.4 11.6 11.6 11.6 11.9C11.6 12.3 11.5 12.6 11.3 12.9C11.1 13.2 10.9 13.5 10.6 13.7C10.9 13.9 11.2 14.1 11.4 14.3C11.6 14.5 11.8 14.7 11.9 15C12 15.3 12.1 15.5 12.1 15.8C12.1 16.2 12 16.5 11.9 16.8C11.8 17.1 11.5 17.4 11.3 17.7C11.1 18 10.7 18.2 10.3 18.3C9.9 18.4 9.5 18.5 9 18.5C8.5 18.5 8.1 18.4 7.7 18.2C7.3 18 7 17.8 6.8 17.6C6.6 17.4 6.4 17.1 6.3 16.8C6.2 16.5 6.10001 16.3 6.10001 16.1C6.10001 15.9 6.2 15.7 6.3 15.6C6.4 15.5 6.6 15.4 6.8 15.4C6.9 15.4 7.00001 15.4 7.10001 15.5C7.20001 15.6 7.3 15.6 7.3 15.7C7.5 16.2 7.7 16.6 8 16.9C8.3 17.2 8.6 17.3 9 17.3C9.2 17.3 9.5 17.2 9.7 17.1C9.9 17 10.1 16.8 10.3 16.6C10.5 16.4 10.5 16.1 10.5 15.8C10.5 15.3 10.4 15 10.1 14.7C9.80001 14.4 9.50001 14.3 9.10001 14.3C9.00001 14.3 8.9 14.3 8.7 14.3C8.5 14.3 8.39999 14.3 8.39999 14.3C8.19999 14.3 7.99999 14.2 7.89999 14.1C7.79999 14 7.7 13.8 7.7 13.7C7.7 13.5 7.79999 13.4 7.89999 13.2C7.99999 13 8.2 13 8.5 13H8.8V13.1ZM15.3 17.5V12.2C14.3 13 13.6 13.3 13.3 13.3C13.1 13.3 13 13.2 12.9 13.1C12.8 13 12.7 12.8 12.7 12.6C12.7 12.4 12.8 12.3 12.9 12.2C13 12.1 13.2 12 13.6 11.8C14.1 11.6 14.5 11.3 14.7 11.1C14.9 10.9 15.2 10.6 15.5 10.3C15.8 10 15.9 9.80003 15.9 9.70003C15.9 9.60003 16.1 9.60004 16.3 9.60004C16.5 9.60004 16.7 9.70003 16.8 9.80003C16.9 9.90003 17 10.2 17 10.5V17.2C17 18 16.7 18.4 16.2 18.4C16 18.4 15.8 18.3 15.6 18.2C15.4 18.1 15.3 17.8 15.3 17.5Z" fill="currentColor" />
																</svg>
															</span>
															<input class="form-control form-control-solid ps-12 fs-7" name="asset_pur_date_add[]" placeholder="Date" id="asset_pur_date_add<?php echo $i; ?>" value="<?php echo date('d-m-Y'); ?>"/>
														</div>
													</td>
													<td>
														<select class="form-select form-select-solid fs-7" data-width="125px" name="subcatory_id[]" id="subcatory_id<?php echo $i; ?>" data-control="select2" data-hide-search="false" data-dropdown-parent="#kt_modal_new_asset">
															<option value="">Select</option>
															<?php foreach ($grouplist as $g => $val) {?>
																<optgroup label='<?php echo $val['assetcategoryname']; ?>'>
																	<?php foreach ($val['list'] as $key => $lt) {?>
																		<option value="<?php echo $lt['assetsubcategoryid']; ?>"> 
																			<?php echo $lt['assetsubcategoryname']; ?> 
																		</option>
																	<?php } ?>
																</optgroup>
															<?php } ?>
														</select>
													</td>
													<td>
														<input type="text" name="assetname[]" class="form-control form-control-lg1 form-control-solid fs-7" placeholder="Name" id="assetname<?php echo $i; ?>">
													</td>
													<td>
														<input type="text" name="assetvalue[]" class="form-control form-control-lg1 form-control-solid fs-7" placeholder="Value" id="assetvalue<?php echo $i; ?>">
													</td>
													<td>
														<select class="form-select form-select-solid fs-7" data-width="110px" name="atypechange[]" id="atypechange<?php echo $i; ?>" data-control="select2" data-hide-search="false" data-dropdown-parent="#kt_modal_new_asset" onchange="typechange(<?php echo $i; ?>)">
															<option value="">Select</option>
															<option value="1">Company</option>
															<option value="2">Staff</option>
														</select>
													</td>
													<td id="companytd<?php echo $i; ?>">

														<input type="text" name="assetallcompany[]" class="form-control form-control-lg1 form-control-solid fs-7" placeholder="Place" id="assetallcompany<?php echo $i; ?>" >
													</td>
													<td id="stafftd<?php echo $i; ?>" style="display: none;">
														<select class="form-select form-select-solid fs-7" data-width="110px" name="assetallstaff[]" id="assetallstaff<?php echo $i; ?>" data-control="select2" data-hide-search="false"data-dropdown-parent="#kt_modal_new_asset" >
															<option value="">Select</option>
															<?php foreach ($staff_list as  $slist) { ?>
																<option value="<?php echo $slist['SNO']; ?>"><?php echo ucfirst($slist['STAFFNAME']); ?></option>
															<?php } ?>
														</select>
													</td>
													<td>
														<input type="text" name="assetduration[]" class="form-control form-control-lg1 form-control-solid fs-7" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" placeholder="Duration" id="assetduration<?php echo $i; ?>">
													</td>
													<td>
														<select class="form-select form-select-solid fs-7" data-width="80px" name="assetperiod[]" id="assetperiod<?php echo $i; ?>" data-control="select2" data-hide-search="false" data-dropdown-parent="#kt_modal_new_asset">
															<option value="">Select</option>
															<option value="1">Month</option>
															<option value="2">Year</option>
														</select>
													</td>
													<td>
										            	<div class="image-input mt-2" data-kt-image-input="true">
															<div class="image-input-wrapper w-40px h-40px" style="background-image: url(assets/images/asset.jpg)"></div>
															<!--end::Preview existing avatar-->
															<!--begin::Label-->
															<label class="btn btn-icon btn-active-color-primary w-40px h-25px" data-kt-image-input-action="change" data-bs-toggle="tooltip" data-kt-initialized="1">
																<i class="bi bi-pencil-fill fs-8 ms-3"></i>
																<!--begin::Inputs-->
																<input type="file"   name="assetimage[]" id="assetimage<?php echo $i; ?>" accept=".png, .jpg, .jpeg">
																<input type="hidden" name="assetimage_remove">
																<!--end::Inputs-->
															</label>
															<!--end::Label-->
															<!--begin::Cancel-->
															<span class="btn btn-icon btn-active-color-primary w-25px h-20px" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" data-kt-initialized="1">
																<i class="bi bi-x fs-3 ms-2"></i>
															</span>
															<!--end::Cancel-->
															<!--begin::Remove-->
															<span class="btn btn-icon btn-active-color-primary w-25px h-20px" data-kt-image-input-action="remove" data-bs-toggle="tooltip" data-kt-initialized="1">
																<i class="bi bi-x fs-3 ms-2"></i>
															</span>
															<!--end::Remove-->
														</div>
										            </td>
										            <td>
										            	<div class="image-input mt-2" data-kt-image-input="true">
															<div class="image-input-wrapper w-40px h-40px" style="background-image: url(assets/images/warrenty_card.jpg)"></div>
															<!--end::Preview existing avatar-->
															<!--begin::Label-->
															<label class="btn btn-icon btn-active-color-primary w-40px h-25px" data-kt-image-input-action="change" data-bs-toggle="tooltip" data-kt-initialized="1">
																<i class="bi bi-pencil-fill fs-8 ms-3"></i>
																<!--begin::Inputs-->
																<input type="file" name="warranty[]" id="warranty<?php echo $i; ?>" accept=".png, .jpg, .jpeg">
																<input type="hidden" name="warranty_remove">
																<!--end::Inputs-->
															</label>
															<!--end::Label-->
															<!--begin::Cancel-->
															<span class="btn btn-icon btn-active-color-primary w-25px h-20px" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" data-kt-initialized="1">
																<i class="bi bi-x fs-3 ms-2"></i>
															</span>
															<!--end::Cancel-->
															<!--begin::Remove-->
															<span class="btn btn-icon btn-active-color-primary w-25px h-20px" data-kt-image-input-action="remove" data-bs-toggle="tooltip" data-kt-initialized="1">
																<i class="bi bi-x fs-3 ms-2"></i>
															</span>
															<!--end::Remove-->
														</div>
										            </td>
													<td>
														<textarea class="form-control form-control-solid fs-7" rows="1" placeholder="Remarks" name="remarks[]" id="remarks<?php echo $i; ?>"></textarea>
													</td>
												</tr>

											<?php } ?>
										</tbody>
									</table>
								</div>
								<div class="d-flex justify-content-end align-items-center mt-3">
									<a href="javascript:;" onclick="show_more_func();" id="show_more_lab">
										<span class="col-form-label text-hover-primary fw-bold fs-6">Show More..</span>
									</a>
									<a href="javascript:;" onclick="hide_func();" style="display:none;" id="hide_lab">
										<span class="col-form-label text-hover-primary fw-bold fs-6">Hide</span>
									</a>
								</div>
							</div>
							<div class="d-flex justify-content-end align-items-center mt-4">
								<button type="reset" class="btn btn-secondary me-3" data-bs-dismiss="modal">Cancel</button>
								<button type="submit" class="btn btn-primary" >Create Asset</button>
							</div>
						</form>
					</div>
				</div>
				<!--end::Modal dialog-->
			</div>
		</div>
		<!--end::Modal - New Asset -->

		<!--begin::Modal - Edit Asset -->
		<div class="modal fade" id="kt_modal_edit_asset" tabindex="-1" aria-hidden="true" data-bs-keyboard="false" data-bs-backdrop="static">
			<div class="modal-dialog modal-xl-loan">
				<!--begin::Modal content-->
				<div class="modal-content rounded">
					<!--begin::Modal header-->
					<div class="modal-header justify-content-end border-0 pb-0">
						<!--begin::Close-->
						<button class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
							<!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
							<span class="svg-icon svg-icon-1">
								<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
									<rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="currentColor" />
									<rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="currentColor" />
								</svg>
							</span>
							<!--end::Svg Icon-->
						</button>
						<!--end::Close-->
					</div>
					<!--end::Modal header-->
					<div class="modal-body pt-0 pb-15 px-5 px-xl-20">
						<!--begin::Heading-->
						<div class="mb-3 text-center">
							<div class="row">
								<div class="col-lg-7 d-flex justify-content-end align-items-center">
									<h1 class="mb-3">Modify Asset</h1>
								</div>
								<div class="col-lg-5 d-flex justify-content-end align-items-center">
									<label class="col-form-label fw-semibold fs-5">
										<span style="background-color:#50cd89;border-radius: 8px;padding: 5px 15px 5px 15px;">Working</span>
									</label>
									<!-- <label class="col-form-label fw-semibold fs-5">
										<span style="background-color:red;border-radius: 8px;padding: 5px 15px 5px 15px;">Damage</span>
									</label>
									<label class="col-form-label fw-semibold fs-5">
										<span style="background-color:#5fbdff;border-radius: 8px;padding: 5px 15px 5px 15px;">Repair</span>
									</label>
									<label class="col-form-label fw-semibold fs-5">
										<span style="background-color:#ffc700;border-radius: 8px;padding: 5px 15px 5px 15px;">Need To Change</span>
									</label>
									<label class="col-form-label fw-semibold fs-5">
										<span style="background-color:#ff4ea0;border-radius: 8px;padding: 5px 15px 5px 15px;">Dead</span>
									</label> -->
								</div>
							</div>
						</div>
						<div class="row">
							<label class="col-lg-1 col-form-label required fw-semibold fs-6">Date</label>
							<div class="col-lg-2 fv-row">
								<div class="d-flex align-items-center">
									<span class="svg-icon position-absolute ms-4 svg-icon-2 dt">
										<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
											<path opacity="0.3" d="M21 22H3C2.4 22 2 21.6 2 21V5C2 4.4 2.4 4 3 4H21C21.6 4 22 4.4 22 5V21C22 21.6 21.6 22 21 22Z" fill="currentColor" />
											<path d="M6 6C5.4 6 5 5.6 5 5V3C5 2.4 5.4 2 6 2C6.6 2 7 2.4 7 3V5C7 5.6 6.6 6 6 6ZM11 5V3C11 2.4 10.6 2 10 2C9.4 2 9 2.4 9 3V5C9 5.6 9.4 6 10 6C10.6 6 11 5.6 11 5ZM15 5V3C15 2.4 14.6 2 14 2C13.4 2 13 2.4 13 3V5C13 5.6 13.4 6 14 6C14.6 6 15 5.6 15 5ZM19 5V3C19 2.4 18.6 2 18 2C17.4 2 17 2.4 17 3V5C17 5.6 17.4 6 18 6C18.6 6 19 5.6 19 5Z" fill="currentColor" />
											<path d="M8.8 13.1C9.2 13.1 9.5 13 9.7 12.8C9.9 12.6 10.1 12.3 10.1 11.9C10.1 11.6 10 11.3 9.8 11.1C9.6 10.9 9.3 10.8 9 10.8C8.8 10.8 8.59999 10.8 8.39999 10.9C8.19999 11 8.1 11.1 8 11.2C7.9 11.3 7.8 11.4 7.7 11.6C7.6 11.8 7.5 11.9 7.5 12.1C7.5 12.2 7.4 12.2 7.3 12.3C7.2 12.4 7.09999 12.4 6.89999 12.4C6.69999 12.4 6.6 12.3 6.5 12.2C6.4 12.1 6.3 11.9 6.3 11.7C6.3 11.5 6.4 11.3 6.5 11.1C6.6 10.9 6.8 10.7 7 10.5C7.2 10.3 7.49999 10.1 7.89999 10C8.29999 9.90003 8.60001 9.80003 9.10001 9.80003C9.50001 9.80003 9.80001 9.90003 10.1 10C10.4 10.1 10.7 10.3 10.9 10.4C11.1 10.5 11.3 10.8 11.4 11.1C11.5 11.4 11.6 11.6 11.6 11.9C11.6 12.3 11.5 12.6 11.3 12.9C11.1 13.2 10.9 13.5 10.6 13.7C10.9 13.9 11.2 14.1 11.4 14.3C11.6 14.5 11.8 14.7 11.9 15C12 15.3 12.1 15.5 12.1 15.8C12.1 16.2 12 16.5 11.9 16.8C11.8 17.1 11.5 17.4 11.3 17.7C11.1 18 10.7 18.2 10.3 18.3C9.9 18.4 9.5 18.5 9 18.5C8.5 18.5 8.1 18.4 7.7 18.2C7.3 18 7 17.8 6.8 17.6C6.6 17.4 6.4 17.1 6.3 16.8C6.2 16.5 6.10001 16.3 6.10001 16.1C6.10001 15.9 6.2 15.7 6.3 15.6C6.4 15.5 6.6 15.4 6.8 15.4C6.9 15.4 7.00001 15.4 7.10001 15.5C7.20001 15.6 7.3 15.6 7.3 15.7C7.5 16.2 7.7 16.6 8 16.9C8.3 17.2 8.6 17.3 9 17.3C9.2 17.3 9.5 17.2 9.7 17.1C9.9 17 10.1 16.8 10.3 16.6C10.5 16.4 10.5 16.1 10.5 15.8C10.5 15.3 10.4 15 10.1 14.7C9.80001 14.4 9.50001 14.3 9.10001 14.3C9.00001 14.3 8.9 14.3 8.7 14.3C8.5 14.3 8.39999 14.3 8.39999 14.3C8.19999 14.3 7.99999 14.2 7.89999 14.1C7.79999 14 7.7 13.8 7.7 13.7C7.7 13.5 7.79999 13.4 7.89999 13.2C7.99999 13 8.2 13 8.5 13H8.8V13.1ZM15.3 17.5V12.2C14.3 13 13.6 13.3 13.3 13.3C13.1 13.3 13 13.2 12.9 13.1C12.8 13 12.7 12.8 12.7 12.6C12.7 12.4 12.8 12.3 12.9 12.2C13 12.1 13.2 12 13.6 11.8C14.1 11.6 14.5 11.3 14.7 11.1C14.9 10.9 15.2 10.6 15.5 10.3C15.8 10 15.9 9.80003 15.9 9.70003C15.9 9.60003 16.1 9.60004 16.3 9.60004C16.5 9.60004 16.7 9.70003 16.8 9.80003C16.9 9.90003 17 10.2 17 10.5V17.2C17 18 16.7 18.4 16.2 18.4C16 18.4 15.8 18.3 15.6 18.2C15.4 18.1 15.3 17.8 15.3 17.5Z" fill="currentColor" />
										</svg>
									</span>
									<input class="form-control form-control-solid ps-12" name="asset_date_edit" placeholder="Schedule Date" id="asset_date_edit" value="09-10-2022"/>
								</div>
							</div>
							<label class="col-lg-1 col-form-label fw-semibold fs-6">Asset No</label>
							<div class="col-lg-2 fv-row">
								<input type="text" name="" class="form-control form-control-lg1 form-control-solid" placeholder="Asset No" id="" value="AST-0001">
								<div class="fv-plugins-message-container invalid-feedback" id=""></div>
							</div>
							<!-- <label class="col-lg-1 col-form-label required fw-semibold fs-6">Company</label> -->
							<div class="col-lg-1">
								<label class="col-form-label required fw-semibold fs-6">Company</label>
							</div>
							<div class="col-lg-5 fv-row fv-plugins-icon-container">
								<select class="form-select form-select-solid" name="" id="" data-control="select2" data-hide-search="false" data-dropdown-parent="#kt_modal_edit_asset">	
									<option value="">Select</option>
									<option value="1" selected>AGB - MAIN BRANCH AYYANAR GOLD BANKERS SKD</option>
									<option value="2">AGN - NARIPPAYUR (NR) 3- BRANCH</option>
									<option value="3">AGM - A GOLD MAIN - & OLD GOLD PURCHES</option>
									<option value="4">AKP - KANNIRAJAPURAM (KP) 4 BRANCH</option>
									<option value="5">AGK - KADALADI (KD) 5 BRANCH</option>
								</select>
							</div>
							<div class="col-lg-12 mt-4">
								<table class="table align-middle table-row-dashed table-striped table-hover fs-7 gy-1 gs-2" id="kt_datatable_asset_mgnt_edit">
									<thead>
										<tr class="text-start text-muted fw-bold fs-7 gs-0">
											<th class="min-w-100px" style="min-width: 120px !important;">Pur.Date</th>
											<th class="min-w-80px">Cate. / Sub Cate.</th>
											<th class="min-w-125px">Name</th>
											<th class="min-w-80px">Value</th>
											<th class="min-w-80px">Allocated</th>
											<th class="min-w-50px">Place / Used By</th>
											<th class="min-w-25px">War.Duration</th>
											<th class="min-w-25px">War.Period</th>
											<th class="min-w-25px">Image</th>
											<th class="min-w-25px">War.card</th>
											<th class="min-w-50px" style="min-width:60px !important;">Remarks</th>
										</tr>
									</thead>
									<tbody class="text-gray-600 fw-semibold">
										<tr>
											<td>
												<div class="d-flex align-items-center">
													<span class="svg-icon position-absolute ms-4 svg-icon-2 dt">
														<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
															<path opacity="0.3" d="M21 22H3C2.4 22 2 21.6 2 21V5C2 4.4 2.4 4 3 4H21C21.6 4 22 4.4 22 5V21C22 21.6 21.6 22 21 22Z" fill="currentColor" />
															<path d="M6 6C5.4 6 5 5.6 5 5V3C5 2.4 5.4 2 6 2C6.6 2 7 2.4 7 3V5C7 5.6 6.6 6 6 6ZM11 5V3C11 2.4 10.6 2 10 2C9.4 2 9 2.4 9 3V5C9 5.6 9.4 6 10 6C10.6 6 11 5.6 11 5ZM15 5V3C15 2.4 14.6 2 14 2C13.4 2 13 2.4 13 3V5C13 5.6 13.4 6 14 6C14.6 6 15 5.6 15 5ZM19 5V3C19 2.4 18.6 2 18 2C17.4 2 17 2.4 17 3V5C17 5.6 17.4 6 18 6C18.6 6 19 5.6 19 5Z" fill="currentColor" />
															<path d="M8.8 13.1C9.2 13.1 9.5 13 9.7 12.8C9.9 12.6 10.1 12.3 10.1 11.9C10.1 11.6 10 11.3 9.8 11.1C9.6 10.9 9.3 10.8 9 10.8C8.8 10.8 8.59999 10.8 8.39999 10.9C8.19999 11 8.1 11.1 8 11.2C7.9 11.3 7.8 11.4 7.7 11.6C7.6 11.8 7.5 11.9 7.5 12.1C7.5 12.2 7.4 12.2 7.3 12.3C7.2 12.4 7.09999 12.4 6.89999 12.4C6.69999 12.4 6.6 12.3 6.5 12.2C6.4 12.1 6.3 11.9 6.3 11.7C6.3 11.5 6.4 11.3 6.5 11.1C6.6 10.9 6.8 10.7 7 10.5C7.2 10.3 7.49999 10.1 7.89999 10C8.29999 9.90003 8.60001 9.80003 9.10001 9.80003C9.50001 9.80003 9.80001 9.90003 10.1 10C10.4 10.1 10.7 10.3 10.9 10.4C11.1 10.5 11.3 10.8 11.4 11.1C11.5 11.4 11.6 11.6 11.6 11.9C11.6 12.3 11.5 12.6 11.3 12.9C11.1 13.2 10.9 13.5 10.6 13.7C10.9 13.9 11.2 14.1 11.4 14.3C11.6 14.5 11.8 14.7 11.9 15C12 15.3 12.1 15.5 12.1 15.8C12.1 16.2 12 16.5 11.9 16.8C11.8 17.1 11.5 17.4 11.3 17.7C11.1 18 10.7 18.2 10.3 18.3C9.9 18.4 9.5 18.5 9 18.5C8.5 18.5 8.1 18.4 7.7 18.2C7.3 18 7 17.8 6.8 17.6C6.6 17.4 6.4 17.1 6.3 16.8C6.2 16.5 6.10001 16.3 6.10001 16.1C6.10001 15.9 6.2 15.7 6.3 15.6C6.4 15.5 6.6 15.4 6.8 15.4C6.9 15.4 7.00001 15.4 7.10001 15.5C7.20001 15.6 7.3 15.6 7.3 15.7C7.5 16.2 7.7 16.6 8 16.9C8.3 17.2 8.6 17.3 9 17.3C9.2 17.3 9.5 17.2 9.7 17.1C9.9 17 10.1 16.8 10.3 16.6C10.5 16.4 10.5 16.1 10.5 15.8C10.5 15.3 10.4 15 10.1 14.7C9.80001 14.4 9.50001 14.3 9.10001 14.3C9.00001 14.3 8.9 14.3 8.7 14.3C8.5 14.3 8.39999 14.3 8.39999 14.3C8.19999 14.3 7.99999 14.2 7.89999 14.1C7.79999 14 7.7 13.8 7.7 13.7C7.7 13.5 7.79999 13.4 7.89999 13.2C7.99999 13 8.2 13 8.5 13H8.8V13.1ZM15.3 17.5V12.2C14.3 13 13.6 13.3 13.3 13.3C13.1 13.3 13 13.2 12.9 13.1C12.8 13 12.7 12.8 12.7 12.6C12.7 12.4 12.8 12.3 12.9 12.2C13 12.1 13.2 12 13.6 11.8C14.1 11.6 14.5 11.3 14.7 11.1C14.9 10.9 15.2 10.6 15.5 10.3C15.8 10 15.9 9.80003 15.9 9.70003C15.9 9.60003 16.1 9.60004 16.3 9.60004C16.5 9.60004 16.7 9.70003 16.8 9.80003C16.9 9.90003 17 10.2 17 10.5V17.2C17 18 16.7 18.4 16.2 18.4C16 18.4 15.8 18.3 15.6 18.2C15.4 18.1 15.3 17.8 15.3 17.5Z" fill="currentColor" />
														</svg>
													</span>
													<input class="form-control form-control-solid ps-12 fs-7" name="asset_pur_date_edit" placeholder="Date" id="asset_pur_date_edit" value="09-10-2023" />
												</div>
											</td>
											<td>
												<select class="form-select form-select-solid fs-7" data-width="125px" name="" id="" data-control="select2" data-hide-search="false" data-dropdown-parent="#kt_modal_new_asset">
													<option value="">Select</option>
													<optgroup label="Electronics">
													    <option value="1">Mobile</option>
														<option value="2" selected>Monitor</option>
														<option value="3">Keyboard</option>
														<option value="4">Mouse</option>
													</optgroup>
													<optgroup label="Stationery">
													    <option value="1">Gum Bottle</option>
													    <option value="2">Plastic Scale</option>
													    <option value="3">Note Books</option>
													</optgroup>
												</select>
											</td>
											<td>
												<input type="text" name="" class="form-control form-control-lg1 form-control-solid fs-7" placeholder="Name" id="" value="BenQ Monitor">
											</td>
											<td>
												<input type="text" name="" class="form-control form-control-lg1 form-control-solid fs-7" placeholder="Value" id="" value="14,999.00">
											</td>
											<td>
												<select class="form-select form-select-solid fs-7" data-width="110px" name="" id="" data-control="select2" data-hide-search="false" data-dropdown-parent="#kt_modal_edit_asset">
													<option value="">Select</option>
													<option value="1" selected>Company</option>
													<option value="2">Staff</option>
												</select>
											</td>
											<td>
												<input type="text" name="" class="form-control form-control-lg1 form-control-solid fs-7" placeholder="Place" id="" value="Accounts Department Corner">
											</td>
											<!-- <td>
												<select class="form-select form-select-solid fs-7" data-width="110px" name="" id="" data-control="select2" data-hide-search="false" data-dropdown-parent="#kt_modal_new_asset">
													<option value="">Select</option>
													<option value="1">Esakki</option>
													<option value="2">Priya</option>
													<option value="3">Vasan</option>
													<option value="4">Gowri</option>
												</select>
											</td> -->
											<td>
												<input type="text" name="" class="form-control form-control-lg1 form-control-solid fs-7" placeholder="Duration" value="6" id="">
											</td>
											<td>
												<select class="form-select form-select-solid fs-7" data-width="80px" name="" id="" data-control="select2" data-hide-search="false" data-dropdown-parent="#kt_modal_new_asset">
													<option value="">Select</option>
													<option value="1" selected>Month</option>
													<option value="2">Year</option>
												</select>
											</td>
											<td>
								            	<div class="image-input mt-2" data-kt-image-input="true">
													<div class="image-input-wrapper w-40px h-40px" style="background-image: url(assets/images/BenQ_GW2780T_27inch.jpg)"></div>
													<!--end::Preview existing avatar-->
													<!--begin::Label-->
													<label class="btn btn-icon btn-active-color-primary w-40px h-25px" data-kt-image-input-action="change" data-bs-toggle="tooltip" data-kt-initialized="1">
														<i class="bi bi-pencil-fill fs-8 ms-3"></i>
														<!--begin::Inputs-->
														<input type="file" name="add_party_redemp" accept=".png, .jpg, .jpeg">
														<input type="hidden" name="add_party_remove_redemp">
														<!--end::Inputs-->
													</label>
													<!--end::Label-->
													<!--begin::Cancel-->
													<span class="btn btn-icon btn-active-color-primary w-25px h-20px" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" data-kt-initialized="1">
														<i class="bi bi-x fs-3 ms-2"></i>
													</span>
													<!--end::Cancel-->
													<!--begin::Remove-->
													<span class="btn btn-icon btn-active-color-primary w-25px h-20px" data-kt-image-input-action="remove" data-bs-toggle="tooltip" data-kt-initialized="1">
														<i class="bi bi-x fs-3 ms-2"></i>
													</span>
													<!--end::Remove-->
												</div>
								            </td>
								            <td>
								            	<div class="image-input mt-2" data-kt-image-input="true">
													<div class="image-input-wrapper w-40px h-40px" style="background-image: url(assets/images/warrenty_card.jpg)"></div>
													<!--end::Preview existing avatar-->
													<!--begin::Label-->
													<label class="btn btn-icon btn-active-color-primary w-40px h-25px" data-kt-image-input-action="change" data-bs-toggle="tooltip" data-kt-initialized="1">
														<i class="bi bi-pencil-fill fs-8 ms-3"></i>
														<!--begin::Inputs-->
														<input type="file" name="add_party_redemp" accept=".png, .jpg, .jpeg">
														<input type="hidden" name="add_party_remove_redemp">
														<!--end::Inputs-->
													</label>
													<!--end::Label-->
													<!--begin::Cancel-->
													<span class="btn btn-icon btn-active-color-primary w-25px h-20px" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" data-kt-initialized="1">
														<i class="bi bi-x fs-3 ms-2"></i>
													</span>
													<!--end::Cancel-->
													<!--begin::Remove-->
													<span class="btn btn-icon btn-active-color-primary w-25px h-20px" data-kt-image-input-action="remove" data-bs-toggle="tooltip" data-kt-initialized="1">
														<i class="bi bi-x fs-3 ms-2"></i>
													</span>
													<!--end::Remove-->
												</div>
								            </td>
											<td>
												<textarea class="form-control form-control-solid fs-7" rows="1" placeholder="Remarks" name="" id="">BenQ GW2780T 27 inch (68cm) 1920 X 1080 Pixels IPS Full HD Ultra-Slim Bezel Monitor- Height Adjustment, Eye Care, Anti-Glare, Brightness Intelligence, Speakers, Color Weakness Mode, HDMI, DP (Black)</textarea>
											</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
						<div class="d-flex justify-content-end align-items-center mt-4">
							<button type="reset" class="btn btn-secondary me-3" data-bs-dismiss="modal">Cancel</button>
							<button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Update</button>
						</div>
					</div>
				</div>
				<!--end::Modal dialog-->
			</div>
		</div>
		<!--end::Modal - Edit Asset -->

		<!--begin::Modal - View Asset -->
		<div class="modal fade" id="kt_modal_view_asset" tabindex="-1" aria-hidden="true" data-bs-keyboard="false" data-bs-backdrop="static">
			<div class="modal-dialog modal-xl-loan">
				<!--begin::Modal content-->
				<div class="modal-content rounded">
					<!--begin::Modal header-->
					<div class="modal-header justify-content-end border-0 pb-0">
						<!--begin::Close-->
						<button class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
							<!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
							<span class="svg-icon svg-icon-1">
								<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
									<rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="currentColor" />
									<rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="currentColor" />
								</svg>
							</span>
							<!--end::Svg Icon-->
						</button>
						<!--end::Close-->
					</div>
					<!--end::Modal header-->
					<div class="modal-body pt-0 pb-15 px-5 px-xl-20">
						<!--begin::Heading-->
						<div class="mb-3 text-center">
							<div class="row">
								<div class="col-lg-7 d-flex justify-content-end align-items-center">
									<h1 class="mb-3">View Asset</h1>
								</div>
								<div class="col-lg-5 d-flex justify-content-end align-items-center" id="asset_status_view">
									
								</div>
							</div>
						</div>
						<div class="row">
							<label class="col-lg-1 col-form-label fw-semibold fs-6">Date</label>
							<label class="col-lg-2 col-form-label fw-bold fs-5" id="asset_dateview">XX-XX-XXXX</label>
							<label class="col-lg-1 col-form-label fw-semibold fs-6">Asset No</label>
							<label class="col-lg-2 col-form-label fw-bold fs-5" id="asset_no_view">AST-0001</label>
							<div class="col-lg-1">
								<label class="col-form-label fw-semibold fs-6">Company</label>
							</div>
							<label class="col-lg-5 col-form-label fw-bold fs-5" id="companyname_view"></label>
							<div class="col-lg-12 mt-4">
								<table class="table align-middle table-row-dashed table-striped table-hover fs-7 gy-1 gs-2" id="kt_datatable_asset_mgnt_view">
									<thead>
										<tr class="text-start text-muted fw-bold fs-7 gs-0">
											<th class="min-w-80px">Pur.Date</th>
											<th class="min-w-50px">Category</th>
											<th class="min-w-50px">Sub Category</th>
											<th class="min-w-50px">Name</th>
											<th class="min-w-80px">Value</th>
											<th class="min-w-80px">Allocated</th>
											<th class="min-w-50px">Place / Used</th>
											<th class="min-w-25px">War.Duration</th>
											<th class="min-w-25px">Image</th>
											<th class="min-w-25px">War.card</th>
											<th class="min-w-200px">Remarks</th>
										</tr>
									</thead>
									<tbody class="text-gray-600 fw-semibold" id="asset_table_row_view">
										
									</tbody>
								</table>
							</div>
							<div class="col-lg-12 mt-4">
								<label class="fw-semibold fs-6">Issue Description</label>
								<div>
									<label class="col-form-label fw-bold fs-5 ms-8" id="issuedescription_view">-</label>
								</div>
							</div>
							<div class="col-lg-12 mt-4">
								<label class="fw-semibold fs-6">Repair & Maintenance Description</label>
								<div>
									<label class="col-form-label fw-bold fs-5 ms-8" id="maintenacedescription_view">-</label>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!--end::Modal dialog-->
			</div>
		</div>
		<!--end::Modal - View Asset -->

		<!--begin::Modal - Delete Asset-->
		<div class="modal fade" id="kt_modal_delete_asset" tabindex="-1" aria-hidden="true" data-bs-keyboard="false" data-bs-backdrop="static">
			<!--begin::Modal dialog-->
			<div class="modal-dialog modal-m">
				<!--begin::Modal content-->
				<div class="modal-content rounded">
					<div class="swal2-icon swal2-warning swal2-icon-show" style="display:flex;">
						<div class="swal2-icon-content">?</div></div>
						<div class="swal2-html-container" id="swal2-html-container" style="display: block;">Are you sure you want to Delete This <b><span id="del_asset_name"></span></b> Asset?</div>
						<div class="d-flex flex-center flex-row-fluid pt-12">
							<input type="hidden" name="del_asset_id" id="del_asset_id">
							<button type="submit" class="btn btn-primary me-3" id="delsubmit">Confirm</button>
							<button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
						</div><br><br>
				</div>
				<!--end::Modal content-->
			</div>
			<!--end::Modal dialog-->
		</div>
		<!--end::Modal - Delete Asset-->

		<!--begin::Modal - Repair Asset-->
		<div class="modal fade" id="kt_modal_asset_repair" tabindex="-1" aria-hidden="true" data-bs-keyboard="false" data-bs-backdrop="static">
			<div class="modal-dialog modal-md">
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
					<div class="modal-body pt-0 pb-6 px-6 px-xl-10">
						<!--begin::Heading-->
						<div class="mb-6 text-center">
							<h1 class="mb-3">Repair Asset <span id="rep_asset_name"></span></h1>
						</div>
						<div class="row mt-3">
							<div class="col-lg-12 fv-row">
								<label class="fw-semibold required fs-6">Description</label>
								<textarea class="form-control form-control-solid" data-kt-autosize="true" rows="4" name="repair_text" id="repair_text"></textarea>
								<div class="fv-plugins-message-container invalid-feedback"></div>
							</div>
						</div>
						<input type="hidden" name="rep_asset_id" id="rep_asset_id" value="">
						<div class="d-flex align-items-center justify-content-center mt-4">
							<button type="button" class="btn btn-primary me-3" id="repairsubmit">Repair</button>
							<button type="button" class="btn btn-secondary" id="lock_cancel_butt" data-bs-dismiss="modal">Cancel</button>
						</div>
					</div>
				</div>
				<!--end::Modal dialog-->
			</div>
		</div>
		<!--end::Modal - Repair Asset-->

		<!--begin::Modal - Damage Asset-->
		<div class="modal fade" id="kt_modal_asset_damage" tabindex="-1" aria-hidden="true" data-bs-keyboard="false" data-bs-backdrop="static">
			<div class="modal-dialog modal-md">
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
					<div class="modal-body pt-0 pb-6 px-6 px-xl-10">
						<!--begin::Heading-->
						<div class="mb-6 text-center">
							<h1 class="mb-3">Damage Asset <span id="dam_asset_name"></span></h1>
						</div>
						<div class="row mt-3">
							<div class="col-lg-12 fv-row">
								<label class="fw-semibold required fs-6">Description</label>
								<textarea class="form-control form-control-solid" data-kt-autosize="true" rows="4" name="dam_desc" id="dam_desc"></textarea>
								<div class="fv-plugins-message-container invalid-feedback"></div>
							</div>
						</div>
						<input type="hidden" name="dam_asset_id" id="dam_asset_id">
						<div class="d-flex align-items-center justify-content-center mt-4">
							<button type="button" class="btn btn-primary me-3" id="damsubmit">Damage</button>
							<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
						</div>
					</div>
				</div>
				<!--end::Modal dialog-->
			</div>
		</div>
		<!--end::Modal - Damage Asset-->

		<!--begin::Modal - Change Asset-->
		<div class="modal fade" id="kt_modal_asset_change" tabindex="-1" aria-hidden="true" data-bs-keyboard="false" data-bs-backdrop="static">
			<div class="modal-dialog modal-md">
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
					<div class="modal-body pt-0 pb-6 px-6 px-xl-10">
						<!--begin::Heading-->
						<div class="mb-6 text-center">
							<h1 class="mb-3">Change Asset <span id="nc_asset_name"></span></h1>
						</div>
						<div class="row mt-3">
							<div class="col-lg-12 fv-row">
								<label class="fw-semibold required fs-6">Description</label>
								<textarea class="form-control form-control-solid" data-kt-autosize="true" rows="4" name="nc_desc" id="nc_desc"></textarea>
								<div class="fv-plugins-message-container invalid-feedback"></div>
							</div>
						</div>
						<input type="hidden" name="nc_asset_id" id="nc_asset_id">

						<div class="d-flex align-items-center justify-content-center mt-4">
							<button type="button" class="btn btn-primary me-3" id="ncsubmit">Update</button>
							<button type="button" class="btn btn-secondary"  data-bs-dismiss="modal">Cancel</button>
						</div>
					</div>
				</div>
				<!--end::Modal dialog-->
			</div>
		</div>
		<!--end::Modal - Change Asset-->

		<!--begin::Modal - Dead Asset-->
		<div class="modal fade" id="kt_modal_asset_dead" tabindex="-1" aria-hidden="true" data-bs-keyboard="false" data-bs-backdrop="static">
			<div class="modal-dialog modal-md">
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
					<div class="modal-body pt-0 pb-6 px-6 px-xl-10">
						<!--begin::Heading-->
						<div class="mb-6 text-center">
							<h1 class="mb-3">Dead Asset <span id="dead_asset_name"></span></h1>
						</div>
						<div class="row mt-3">
							<div class="col-lg-12 fv-row">
								<label class="fw-semibold required fs-6">Description</label>
								<textarea class="form-control form-control-solid" data-kt-autosize="true" rows="4" name="dead_desc" id="dead_desc"></textarea>
								<div class="fv-plugins-message-container invalid-feedback"></div>
							</div>
						</div>
						<div class="d-flex align-items-center justify-content-center mt-4">
							<input type="hidden" name="dead_asset_id" id="dead_asset_id">
							<button type="button" class="btn btn-primary me-3" id="deadsubmit">Dead</button>
							<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
						</div>
					</div>
				</div>
				<!--end::Modal dialog-->
			</div>
		</div>
		<!--end::Modal - Dead Asset-->

		<!--begin::Modal - Working Asset-->
		<div class="modal fade" id="kt_modal_asset_working" tabindex="-1" aria-hidden="true" data-bs-keyboard="false" data-bs-backdrop="static">
			<!--begin::Modal dialog-->
			<div class="modal-dialog modal-m">
				<!--begin::Modal content-->
				<div class="modal-content rounded">
					<div class="swal2-icon swal2-warning swal2-icon-show" style="display:flex;">
						<div class="swal2-icon-content">?</div></div>
						<div class="swal2-html-container" id="swal2-html-container" style="display: block;">Are you sure you want to Working <b><span id="work_asset_name"></span></b> This Asset?</div>
						<div class="d-flex flex-center flex-row-fluid pt-12">
							<input type="hidden" name="work_asset_id" id="work_asset_id" value="">
							<button type="submit" class="btn btn-primary me-3"  id="worksubmit">Confirm</button>
							<button type="reset"  class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
						</div><br><br>
				</div>
				<!--end::Modal content-->
			</div>
			<!--end::Modal dialog-->
		</div>
		<!--end::Modal - Working Asset-->

		<!--begin::Modal - maintence Asset-->
		<div class="modal fade" id="kt_modal_asset_maintenance" tabindex="-1" aria-hidden="true" data-bs-keyboard="false" data-bs-backdrop="static">
			<div class="modal-dialog modal-md">
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
					<div class="modal-body pt-0 pb-6 px-6 px-xl-10">
						<!--begin::Heading-->
						<div class="mb-6 text-center">
							<h1 class="mb-3">Maintenance Asset <span id="main_asset_name"></span></h1>
						</div>
						<div class="row mt-3">
							<div class="col-lg-12 fv-row">
								<label class="fw-semibold required fs-6">Description</label>
								<textarea class="form-control form-control-solid" data-kt-autosize="true" rows="4" name="main_desc" id="main_desc"></textarea>
								<div class="fv-plugins-message-container invalid-feedback"></div>
							</div>
						</div>
						<input type="hidden" name="main_asset_id" id="main_asset_id">
						<div class="d-flex align-items-center justify-content-center mt-4">
							<button type="button" class="btn btn-primary me-3" id="main_submit">Maintenance</button>
							<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
						</div>
					</div>
				</div>
				<!--end::Modal dialog-->
			</div>
		</div>
		<!--end::Modal - maintence Asset-->
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
	<script src="assets/plugins/custom/fslightbox/fslightbox.bundle.js"></script>
	<script>

		function full_print() {

				if ($('.asset_print_chk:checked').length>0){

					  $('#full_print_form').attr('action', "<?php echo base_url(); ?>Assetmanagement/printmulitple");
					  $('#full_print_form').attr('target', '_blank');
					  $("#full_print_form").submit();
					  e.preventDefault();
				}else{

					Swal.fire({
							title: 'Error!',
							text:  'Please Check Any one of the checkbox.. ',
							icon:  'error',
							confirmButtonText: 'Okay'
						});
				}
			  
		}

	</script>
	<script>	
		<?php if($this->session->flashdata('g_success') || $this->session->flashdata('g_err')){?> 
		    $(document).ready( function() {
	        document.getElementById("pop_up_success").click()
	        });
	    <?php } ?>
    </script>
	<!-- Asset - Print Check Box Start -->
	<script>
		$('#asset_print_checkall').change(function () {
		    $('.asset_print_chk').prop('checked',this.checked);
		});

		$('.asset_print_chk').change(function () {
		 if ($('.asset_print_chk:checked').length == $('.asset_print_chk').length){
		  $('#asset_print_checkall').prop('checked',true);
		 }
		 else {
		  $('#asset_print_checkall').prop('checked',false);
		 }
		});
	</script>
	<script> 

		function addvalidation(){


			var err =0;
				var dateval        = $('#asset_date').val();
				var company        = $('#assetcompany').val();

				

				if(dateval.trim()=='')
				{
					$('#date_err').html('select date !');
					err++;
				}
				else
				{
					$('#date_err').html('');
				}

				if(company.trim()=='')
				{
					$('#assetcompany_err').html('select Company is Required !');
					err++;
				}
				else
				{
					$('#assetcompany_err').html('');
				}


				if(err>0){ return false; }else{ return true; }
		}
	</script>

	<!-- Asset - Print Check Box End -->

	<script> 
		var baseurl= $("#baseurl").val();
		function statuschage(id,sts,asset) {

			// Working
			if (sts==1) {
				$('#work_asset_id').val(id);
				$('#work_asset_name').html(asset);
			}
			// Maintain
			if (sts==2) {
				$('#main_asset_id').val(id);
				$('#main_asset_name').html('['+ asset +']');
			}
			// Repair
			if (sts==3) {
				$('#rep_asset_id').val(id);
				$('#rep_asset_name').html('['+ asset +']');
			}
			// Damege
			if (sts==4) {
				$('#dam_asset_id').val(id);
				$('#dam_asset_name').html('['+ asset +']');
			}
			// Need to be Change 
			if (sts==5) {
				$('#nc_asset_id').val(id);
				$('#nc_asset_name').html('['+ asset +']');
			}
			// Dead
			if (sts==6) {
				$('#dead_asset_id').val(id);
				$('#dead_asset_name').html('['+ asset +']');
			}

			// to delete
			if (sts==0) {
				$('#del_asset_id').val(id);
				$('#del_asset_name').html(asset);
			}

		}
		// working ajax
		$(document).ready(function() {
		  $("#worksubmit").click(function() {
		    var workid = $('#work_asset_id').val();
		    if (workid!='') {
			    $.ajax({
					type: "POST",
					url: baseurl+'Assetmanagement/working',
					async: false,
					type: "POST",
					data: "id="+workid,
					dataType: "html",
					success: function(response)
					{
							

						if (response) {

							location.reload();
						}
						
							
						
					}
				});
			}

		  });
		});

		// givemaintenance ajax
		$(document).ready(function() {
		  $("#main_submit").click(function() {
		    var main_id = $('#main_asset_id').val();
		    var text = $('#main_desc').val();

		    if (text=='') {

		    	$('#main_desc').addClass('error');
		    	$('#main_desc').focus();

		    	Swal.fire({
							title: 'Error!',
							text:  'Enter Maintenance Description is Required.. ',
							icon:  'error',
							confirmButtonText: 'Okay'
						});
		    }
		    else{
		    	if (main_id!='') {
				    $.ajax({
						type: "POST",
						url: baseurl+'Assetmanagement/givemaintenance',
						async: false,
						type: "POST",
						data: "id="+main_id+'&text='+text,
						dataType: "html",
						success: function(response)
						{	
							if (response) {
								location.reload();
							}
						}
					});
				}
		    }
		    

		  });
		});	

		// Repair ajax
		$(document).ready(function() {
		  $("#repairsubmit").click(function() {
		    var rep_id = $('#rep_asset_id').val();
		    var text = $('#repair_text').val();
		    if (text=='') {
		    	$('#repair_text').addClass('error');
		    	$('#repair_text').focus();
		    	Swal.fire({
							title: 'Error!',
							text: 'Enter Repair Description is Required.. ',
							icon: 'error',
							confirmButtonText: 'Okay'
						});
		    }
		    else{
		    	if (rep_id!='') {
				    $.ajax({
						type: "POST",
						url: baseurl+'Assetmanagement/repair',
						async: false,
						type: "POST",
						data: "id="+rep_id+'&text='+text,
						dataType: "html",
						success: function(response)
						{	
							if (response) {
								location.reload();
							}
						}
					});
				}
		    }
		    

		  });
		});

		//Damege
		$(document).ready(function() {
		  $("#damsubmit").click(function() {
		    var dam_id = $('#dam_asset_id').val();
		    var text = $('#dam_desc').val();
		    if (text=='') {
		    	$('#dam_desc').addClass('error');
		    	$('#dam_desc').focus();
		    	Swal.fire({
							title: 'Error!',
							text:  'Enter Damage Description is Required.. ',
							icon:  'error',
							confirmButtonText: 'Okay'
						});
		    }
		    else{
		    	if (dam_id!='') {
				    $.ajax({
						type: "POST",
						url: baseurl+'Assetmanagement/damage',
						async: false,
						type: "POST",
						data: "id="+dam_id+'&text='+text,
						dataType: "html",
						success: function(response)
						{	
							if (response) {
								location.reload();
							}
						}
					});
				}
		    }
		    

		  });
		});
		
		//need to submit
		$(document).ready(function() {
		  $("#ncsubmit").click(function() {
		    var dam_id = $('#nc_asset_id').val();
		    var text = $('#nc_desc').val();
		    if (text=='') {
		    	$('#nc_desc').addClass('error');
		    	$('#nc_desc').focus();
		    	Swal.fire({
							title: 'Error!',
							text:  'Enter Change Description is Required.. ',
							icon:  'error',
							confirmButtonText: 'Okay'
						});
		    }
		    else{
		    	if (dam_id!='') {
				    $.ajax({
						type: "POST",
						url: baseurl+'Assetmanagement/needchange',
						async: false,
						type: "POST",
						data: "id="+dam_id+'&text='+text,
						dataType: "html",
						success: function(response)
						{	
							if (response) {
								location.reload();
							}
						}
					});
				}
		    }
		    

		  });
		});

		//dead
		$(document).ready(function() {
		  $("#deadsubmit").click(function() {
		    var dead_id = $('#dead_asset_id').val();
		    var text    = $('#dead_desc').val();
		    if (text=='') {
		    	$('#dead_desc').addClass('error');
		    	$('#dead_desc').focus();
		    	Swal.fire({
							title: 'Error!',
							text:  'Enter Dead Description is Required.. ',
							icon:  'error',
							confirmButtonText: 'Okay'
						});
		    }
		    else{
		    	if (dead_id!='') {
				    $.ajax({
						type: "POST",
						url: baseurl+'Assetmanagement/dead',
						async: false,
						type: "POST",
						data: "id="+dead_id+'&text='+text,
						dataType: "html",
						success: function(response)
						{	
							if (response) {
								location.reload();
							}
						}
					});
				}
		    }
		    

		  });
		});

		// delete ajax
		$(document).ready(function() {
		  $("#delsubmit").click(function() {
		    var del_id = $('#del_asset_id').val();
		    if (del_id!='') {
			    $.ajax({
					type: "POST",
					url: baseurl+'Assetmanagement/delete',
					async: false,
					type: "POST",
					data: "id="+del_id,
					dataType: "html",
					success: function(response)
					{
							

						if (response) {

							location.reload();
						}
						
							
						
					}
				});
			}

		  });
		});
	</script>

	<script>
		function assetview(val)
		{
				// alert(val);
				var baseurl= $("#baseurl").val();
				// alert(baseurl);
				$.ajax({
				type: "GET",
				url: baseurl+'Assetmanagement/view',
				async: false,
				type: "GET",
				data: "id="+val,
				dataType: "json",
				success: function(response)
				{
					


					
					$('#companyname_view').html(response.COMPANYNAME);
					$('#asset_no_view').html(response.assetnumber);

					main = response.maintenacedescription;
					if (main!='') {

						$('#maintenacedescription_view').html(response.maintenacedescription);
					}else{

						$('#maintenacedescription_view').html('-');
					}
					
					iss = response.issuedescription;
					if (iss!='') {

						$('#issuedescription_view').html(response.issuedescription);
					}else{

						$('#issuedescription_view').html('-');
					}
					
					


					if (response.status==1){
						status = '<label class="col-form-label fw-semibold fs-7"><span style="background-color:#50cd89;border-radius: 8px;padding: 5px 15px 5px 15px;">Working</span></label>';
					} 
					if (response.status==2){
						status = '<label class="col-form-label fw-semibold fs-7"><span style="background-color:#7bfff9;border-radius: 8px;padding: 5px 15px 5px 15px;">Maintenance</span></label>';
					} 
					if (response.status==3){
						status = '<label class="col-form-label fw-semibold fs-7"><span style="background-color:#5fbdff;border-radius: 8px;padding: 5px 15px 5px 15px;">Repair</span></label>';
					} 
					if (response.status==4){
						status = '<label class="col-form-label fw-semibold fs-7"><span style="background-color:red;color: white;border-radius: 8px;padding: 5px 15px 5px 15px;">Damage</span></label>';
					} 
					if (response.status==5){
						status = '<label class="col-form-label fw-semibold fs-7"><span style="background-color:#ffc700;border-radius: 8px;padding: 5px 15px 5px 15px;">Need To Change</span></label>';
					} 
					if (response.status==6){
						status = '<label class="col-form-label fw-semibold fs-7"><span style="background-color:#ff4ea0;color: white;border-radius: 8px;padding: 5px 15px 5px 15px;">Dead</span></label>';
					} 

					$('#asset_status_view').html(status);

					var date = new Date(response.assetdate); 
					var dateFormat = date.getDate() + "-" + (date.getMonth()+1) + "-" + date.getFullYear();

					$('#asset_dateview').html(dateFormat);
				}
			});
			$.ajax({
				type: "POST",
				url: baseurl+'Assetmanagement/tableview',
				async: false,
				type: "POST",
				data: "id="+val,
				dataType: "html",
				success: function(response)
				{
						

					if (response) {

						$('#asset_table_row_view').empty().append(response);
					}else{

						$('#asset_table_row_view').html();
					}
					
						
					
				}
			});


			    
		}

	</script>
	<script>
		function typechange(id) {

			var type = $('#atypechange'+id).val();

			// alert(type)

			if (type.trim()=='') {

				$('#companytd'+id).show();
				$('#stafftd'+id).hide();

			}

			if (type==1) {

				$('#companytd'+id).show();
				$('#stafftd'+id).hide();

			}

			if (type==2) {

				$('#companytd'+id).hide();
				$('#stafftd'+id).show();
			}

		}
	</script>
	<script>
		function show_more_func()
		{
			$("#asset_mgnt_tr_3").show();
			$("#asset_mgnt_tr_4").show();
			$("#asset_mgnt_tr_5").show();
			$("#asset_mgnt_tr_6").show();
			$("#hide_lab").show();
			$("#show_more_lab").hide();
		}
		function hide_func()
		{
			$("#asset_mgnt_tr_3").hide();
			$("#asset_mgnt_tr_4").hide();
			$("#asset_mgnt_tr_5").hide();
			$("#asset_mgnt_tr_6").hide();
			$("#hide_lab").hide();
			$("#show_more_lab").show();
		}
	</script>
	<script>
		$("#asset_date").flatpickr({
				dateFormat: "d-m-Y",
			});

		for (var i = 0; i<7; i++) {
				$("#asset_pur_date_add"+i).flatpickr({
						dateFormat: "d-m-Y",
					});
		}
		
		$("#asset_date_edit").flatpickr({
				dateFormat: "d-m-Y",
			});
		$("#asset_pur_date_edit").flatpickr({
				dateFormat: "d-m-Y",
			});
	</script>
	<script>
	      $("#kt_datatable_asset_mgnt_add1").kendoTooltip({
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
	<script>
			$("#kt_datatable_asset_mgnt_add").DataTable({
				"ordering": false,
				"pageing": false,
				"sorting": false,
				"info": false,
				// "aaSorting":[],
				// "iDisplayLength": "10000",
				 "language": {
				  "lengthMenu": "Show _MENU_",
				 },
				 "dom":
				  "<'row'" +
				  // "<'col-sm-6 d-flex align-items-center justify-conten-start'l>" +
				  // "<'col-sm-6 d-flex align-items-center justify-content-end'f>" +
				  ">" +

				  "<'table-responsive'tr>" +

				  "<'row'" +
				  // "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
				  // "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
				  ">"
				});
			// $('#kt_datatable_asset_mgnt_add').wrap('<div class="dataTables_scroll" />');
		</script>
		<script>
	      $("#kt_datatable_asset_mgnt_edit").kendoTooltip({
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
	<script>
			$("#kt_datatable_asset_mgnt_edit").DataTable({
				"ordering": false,
				// "aaSorting":[],
				// "iDisplayLength": "10000",
				 "language": {
				  "lengthMenu": "Show _MENU_",
				 },
				 "dom":
				  "<'row'" +
				  // "<'col-sm-6 d-flex align-items-center justify-conten-start'l>" +
				  // "<'col-sm-6 d-flex align-items-center justify-content-end'f>" +
				  ">" +

				  "<'table-responsive'tr>" +

				  "<'row'" +
				  // "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
				  // "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
				  ">"
				});
			// $('#kt_datatable_asset_mgnt_edit').wrap('<div class="dataTables_scroll" />');
		</script>
		<script>
	      $("#kt_datatable_asset_mgnt_view").kendoTooltip({
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
	<script>
			$("#kt_datatable_asset_mgnt_view").DataTable({
				"ordering": false,
				// "aaSorting":[],
				// "iDisplayLength": "10000",
				 "language": {
				  "lengthMenu": "Show _MENU_",
				 },
				 "dom":
				  "<'row'" +
				  // "<'col-sm-6 d-flex align-items-center justify-conten-start'l>" +
				  // "<'col-sm-6 d-flex align-items-center justify-content-end'f>" +
				  ">" +

				  "<'table-responsive'tr>" +

				  "<'row'" +
				  // "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
				  // "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
				  ">"
				});
			// $('#kt_datatable_asset_mgnt_view').wrap('<div class="dataTables_scroll" />');
		</script>
		<script>
	      $("#kt_datatable_asset_mgnt").kendoTooltip({
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
	<script>
			$("#kt_datatable_asset_mgnt").DataTable({
				"ordering": false,
				// "aaSorting":[],
				// "iDisplayLength": "10000",
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
			// $('#kt_datatable_asset_mgnt').wrap('<div class="dataTables_scroll" />');
		</script>
	</body>
	<!--end::Body-->
	</html>