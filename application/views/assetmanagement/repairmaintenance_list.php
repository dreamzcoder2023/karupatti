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
									<h1 class="d-flex align-items-center text-dark fw-bold my-1 fs-3">Asset Repair & Maintenance
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
											<form id="full_print_form" method="post" >
												<table class="table align-middle table-row-dashed table-striped table-hover fs-7 gy-1 gs-2" id="kt_datatable_asset_mgnt">
													<!--begin::Table head-->
													<thead>
														<tr class="text-start text-muted fw-bold fs-7 gs-0">
															<th class="min-w-150px">Date / Company</th>
															<th class="min-w-100px">Pur.Date /<br>Asset No</th>
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
																
																<td class="ple1">

																	<span> 
																		<?php
																		$c_date = date_format(date_create($list["created_on"]),'d-m-Y');
																		echo $c_date;
																     	$date_format  = $this->db->query("SELECT * FROM general_settings ")->row();
																	 	 	$format= $date_format->date_format;
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

																		<a href="javascript:;" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm" data-bs-toggle="modal" data-bs-target="#kt_modal_view_asset" title="View" onclick="assetview(<?php echo $list['assetmanagementid']; ?>),<?php echo $list['assetmanagement_historyid']; ?>">
																			<i class="bi bi-eye-fill eyc"></i>
																		</a>
																		<!-- <a href="< ?php echo base_url();?>Assetmanagement/assetmanagementhistory/< ?php echo $list['assetmanagementid']; ?>" target="_blank" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm" title="History">
																			<i class="fas fa-clock-rotate-left eyc fs-3"></i>
																		</a> -->
																		<button class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
																			<i class="fas fa-ellipsis-v eyc"></i>
																		</button>
																		<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-250px py-3" data-kt-menu="true" style="">
																			<div class="scroll-y mh-200px my-2 px-1">
																				<?php if ($list['status']==1) { ?>

																				<div class="menu-item px-3">
																					<a href="javascript:;" data-bs-toggle="modal" data-bs-target="#kt_modal_asset_maintenance" class="menu-link px-3" onclick="statuschage('<?php echo $list['assetmanagementid']; ?>',<?php echo $list['assetmanagement_historyid']; ?>,2,'<?php echo $list['assetname']; ?>')">Give For Maintenance</a>
																				</div>
																				<div class="menu-item px-3">
																					<a href="javascript:;" data-bs-toggle="modal" data-bs-target="#kt_modal_asset_repair" class="menu-link px-3"onclick="statuschage('<?php echo $list['assetmanagementid']; ?>',<?php echo $list['assetmanagement_historyid']; ?>,3,'<?php echo $list['assetname']; ?>')">Give For Repair</a>
																				</div>
																				<div class="menu-item px-3">
																					<a href="javascript:;" data-bs-toggle="modal" data-bs-target="#kt_modal_asset_damage" class="menu-link px-3" onclick="statuschage('<?php echo $list['assetmanagementid']; ?>',<?php echo $list['assetmanagement_historyid']; ?>,4,'<?php echo $list['assetname']; ?>')">Damege</a>
																				</div>
																				<div class="menu-item px-3">
																					<a href="javascript:;" data-bs-toggle="modal" data-bs-target="#kt_modal_asset_change" class="menu-link px-3" onclick="statuschage('<?php echo $list['assetmanagementid']; ?>',<?php echo $list['assetmanagement_historyid']; ?>,5,'<?php echo $list['assetname']; ?>')">Need To Change</a>
																				</div>
																				<div class="menu-item px-3">
																					<a href="javascript:;" data-bs-toggle="modal" data-bs-target="#kt_modal_asset_dead" class="menu-link px-3" onclick="statuschage('<?php echo $list['assetmanagementid']; ?>',<?php echo $list['assetmanagement_historyid']; ?>,6,'<?php echo $list['assetname']; ?>')">Dead</a>
																				</div>
																				<?php } ?>
																				<?php if ($list['status']==2) { ?>
																				<div class="menu-item px-3">
																					<a href="javascript:;" data-bs-toggle="modal" data-bs-target="#kt_modal_asset_working" class="menu-link px-3" onclick="statuschage('<?php echo $list['assetmanagementid']; ?>',<?php echo $list['assetmanagement_historyid']; ?>,1,'<?php echo $list['assetname']; ?>')">Working Well</a>
																				</div>
																				<div class="menu-item px-3">
																					<a href="javascript:;" data-bs-toggle="modal" data-bs-target="#kt_modal_asset_repair" class="menu-link px-3"onclick="statuschage('<?php echo $list['assetmanagementid']; ?>',<?php echo $list['assetmanagement_historyid']; ?>,3,'<?php echo $list['assetname']; ?>')">Give For Repair</a>
																				</div>
																				<div class="menu-item px-3">
																					<a href="javascript:;" data-bs-toggle="modal" data-bs-target="#kt_modal_asset_damage" class="menu-link px-3" onclick="statuschage('<?php echo $list['assetmanagementid']; ?>',<?php echo $list['assetmanagement_historyid']; ?>,4,'<?php echo $list['assetname']; ?>')">Damege</a>
																				</div>
																				<div class="menu-item px-3">
																					<a href="javascript:;" data-bs-toggle="modal" data-bs-target="#kt_modal_asset_change" class="menu-link px-3" onclick="statuschage('<?php echo $list['assetmanagementid']; ?>',<?php echo $list['assetmanagement_historyid']; ?>,5,'<?php echo $list['assetname']; ?>')">Need To Change</a>
																				</div>
																				<div class="menu-item px-3">
																					<a href="javascript:;" data-bs-toggle="modal" data-bs-target="#kt_modal_asset_dead" class="menu-link px-3" onclick="statuschage('<?php echo $list['assetmanagementid']; ?>',<?php echo $list['assetmanagement_historyid']; ?>,6,'<?php echo $list['assetname']; ?>')">Dead</a>
																				</div>
																				<?php } ?>
																				<?php if ($list['status']==3) { ?>
																				<div class="menu-item px-3">
																					<a href="javascript:;" data-bs-toggle="modal" data-bs-target="#kt_modal_asset_working" class="menu-link px-3" onclick="statuschage('<?php echo $list['assetmanagementid']; ?>',<?php echo $list['assetmanagement_historyid']; ?>,1,'<?php echo $list['assetname']; ?>')">Working Well</a>
																				</div>
																				<div class="menu-item px-3">
																					<a href="javascript:;" data-bs-toggle="modal" data-bs-target="#kt_modal_asset_damage" class="menu-link px-3" onclick="statuschage('<?php echo $list['assetmanagementid']; ?>',<?php echo $list['assetmanagement_historyid']; ?>,4,'<?php echo $list['assetname']; ?>')">Damege</a>
																				</div>
																				<div class="menu-item px-3">
																					<a href="javascript:;" data-bs-toggle="modal" data-bs-target="#kt_modal_asset_change" class="menu-link px-3" onclick="statuschage('<?php echo $list['assetmanagementid']; ?>',<?php echo $list['assetmanagement_historyid']; ?>,5,'<?php echo $list['assetname']; ?>')">Need To Change</a>
																				</div>
																				<div class="menu-item px-3">
																					<a href="javascript:;" data-bs-toggle="modal" data-bs-target="#kt_modal_asset_dead" class="menu-link px-3" onclick="statuschage('<?php echo $list['assetmanagementid']; ?>',<?php echo $list['assetmanagement_historyid']; ?>,6,'<?php echo $list['assetname']; ?>')">Dead</a>
																				</div>
																				<?php } ?>
																				<?php if ($list['status']==4) { ?>
																				<div class="menu-item px-3">
																					<a href="javascript:;" data-bs-toggle="modal" data-bs-target="#kt_modal_asset_working" class="menu-link px-3" onclick="statuschage('<?php echo $list['assetmanagementid']; ?>',<?php echo $list['assetmanagement_historyid']; ?>,1,'<?php echo $list['assetname']; ?>')">Working Well</a>
																				</div>
																				<div class="menu-item px-3">
																					<a href="javascript:;" data-bs-toggle="modal" data-bs-target="#kt_modal_asset_repair" class="menu-link px-3"onclick="statuschage('<?php echo $list['assetmanagementid']; ?>',<?php echo $list['assetmanagement_historyid']; ?>,3,'<?php echo $list['assetname']; ?>')">Give For Repair</a>
																				</div>
																				<div class="menu-item px-3">
																					<a href="javascript:;" data-bs-toggle="modal" data-bs-target="#kt_modal_asset_change" class="menu-link px-3" onclick="statuschage('<?php echo $list['assetmanagementid']; ?>',<?php echo $list['assetmanagement_historyid']; ?>,5,'<?php echo $list['assetname']; ?>')">Need To Change</a>
																				</div>
																				<div class="menu-item px-3">
																					<a href="javascript:;" data-bs-toggle="modal" data-bs-target="#kt_modal_asset_dead" class="menu-link px-3" onclick="statuschage('<?php echo $list['assetmanagementid']; ?>',<?php echo $list['assetmanagement_historyid']; ?>,6,'<?php echo $list['assetname']; ?>')">Dead</a>
																				</div>
																				<?php } ?>

																				<?php if ($list['status']==5) { ?>
																				<div class="menu-item px-3">
																					<a href="javascript:;" data-bs-toggle="modal" data-bs-target="#kt_modal_asset_dead" class="menu-link px-3" onclick="statuschage('<?php echo $list['assetmanagementid']; ?>',<?php echo $list['assetmanagement_historyid']; ?>,6,'<?php echo $list['assetname']; ?>')">Dead</a>
																				</div>
																				<?php } ?>
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
							<h1 class="mb-3">Working Asset <span id="work_asset_name"></span></h1>
						</div>
						<div class="row mt-3">
							<div class="col-lg-12 fv-row">
								<label class="fw-semibold required fs-6">Description</label>
								<textarea class="form-control form-control-solid" data-kt-autosize="true" rows="4" name="work_desc" id="work_desc"></textarea>
								<div class="fv-plugins-message-container invalid-feedback"></div>
							</div>
						</div>
						<div class="d-flex align-items-center justify-content-center mt-4">
							<input type="hidden" name="work_asset_id" id="work_asset_id">
							<button type="button" class="btn btn-primary me-3" id="worksubmit">Confirm</button>
							<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
						</div>
					</div>
				</div>
				<!--end::Modal dialog-->
			</div>
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
	<input type="hidden" id="historyid_hidden" value="">

	<?php $this->load->view("script.php");?>
	<script src="assets/plugins/custom/fslightbox/fslightbox.bundle.js"></script>
	<script>	
		<?php if($this->session->flashdata('g_success') || $this->session->flashdata('g_err')){?> 
		    $(document).ready( function() {
	        document.getElementById("pop_up_success").click()
	        });
	    <?php } ?>
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
		function statuschage(id,his,sts,asset) {

			// Working
			if (sts==1) {
				$('#work_asset_id').val(id);
				$('#work_asset_name').html('['+ asset +']');
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

			$('#historyid_hidden').val(his);



		}
		// working ajax
		$(document).ready(function() {
		  $("#worksubmit").click(function() {
		    var workid = $('#work_asset_id').val();
		    var text = $('#work_desc').val();
		    var historyid = $('#historyid_hidden').val();
		    if (text=='') {
		    	$('#work_desc').addClass('error');
		    	$('#work_desc').focus();

		    	Swal.fire({
							title: 'Error!',
							text:  'Enter Working Description is Required.. ',
							icon:  'error',
							confirmButtonText: 'Okay'
						});
		    }
		    else{
		    	 if (workid!='') {
				    $.ajax({
						type: "POST",
						url: baseurl+'Assetmanagement/rmworking',
						async: false,
						type: "POST",
						data: "id=" + workid + "&text=" + text + "&historyid=" + historyid,
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

		// givemaintenance ajax
		$(document).ready(function() {
		  $("#main_submit").click(function() {
		    var main_id = $('#main_asset_id').val();
		    var text = $('#main_desc').val();
		    var historyid = $('#historyid_hidden').val();
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
						url: baseurl+'Assetmanagement/rmgivemaintenance',
						async: false,
						type: "POST",
						data: "id="+main_id+'&text='+text+ "&historyid=" + historyid,
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
		    var historyid = $('#historyid_hidden').val();
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
						url: baseurl+'Assetmanagement/rmrepair',
						async: false,
						type: "POST",
						data: "id="+rep_id+'&text='+text+ "&historyid=" + historyid,
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
		    var historyid = $('#historyid_hidden').val();
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
						url: baseurl+'Assetmanagement/rmdamage',
						async: false,
						type: "POST",
						data: "id="+dam_id+'&text='+text+ "&historyid=" + historyid,
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
		    var historyid = $('#historyid_hidden').val();
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
						url: baseurl+'Assetmanagement/rmneedchange',
						async: false,
						type: "POST",
						data: "id="+dam_id+'&text='+text+ "&historyid=" + historyid,
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
		    var historyid = $('#historyid_hidden').val();
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
						url: baseurl+'Assetmanagement/rmdead',
						async: false,
						type: "POST",
						data: "id="+dead_id+'&text='+text+ "&historyid=" + historyid,
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