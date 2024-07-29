<?php $this->load->view("common.php");?>
<style>
	#asset_mgnt #asset_mgnt_tltip {
		  display: none;
			}
	#asset_mgnt:hover #asset_mgnt_tltip {
	  /*display: block;*/
	  display: flex;
	  justify-content: center !important;
	  align-items: center !important;
	  position: absolute;
	  margin-top: 0.5em;
	  /*margin-left: -4.5em !important;*/
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
									<h1 class="d-flex align-items-center text-dark fw-bold my-1 fs-3">Asset Management History
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
										<?php if(isset($view)){ ?>

										<div class="card-body py-4">								
												<div class="row">
													<div class="col-lg-2">
														<div class="text-center">
															<label class="form-label fs-4 fw-bold">Pur.Date / Asset No</label>
														</div>
														<div class="text-center">
															<label class="text-success fs-4 fw-bold">
																<?php 
																		$date_format  = $this->db->query("SELECT * FROM general_settings ")->row();
																 	 	$format= $date_format->date_format;
																 		echo date("$format", strtotime($view->purchasedate));
															 	?>
															</label>
															<label class="d-block text-info fs-4 fw-bold"><?php echo $view->assetnumber; ?></label>
														</div>
													</div>
													<?php 
														if (isset($view->companycode)){
															$company  = $this->db->query("SELECT * FROM COMPANY WHERE ACTIVE='Y' AND COMPANYCODE='". $view->companycode."' ")->row();

																if(isset($company)){
																 	$company =$company->COMPANYNAME;
																}else{
																	$company ='-';
																}

														}else{
															$company ='-';
														}

												            if (strlen($company) > 16) {
												                $companyhide = substr($company, 0, 16) ."...";
												            } else{
												            	$companyhide = $company;	
												            }
												 	?>
													<div class="col-lg-2">
														<div class="text-center">
															<label class="form-label fs-4 fw-bold">Company / Date</label>
														</div>
														<div class="text-center" id="asset_mgnt">
															
															<label class="text-success fs-4 fw-bold"><?php echo $companyhide; ?></label>
															<span id="asset_mgnt_tltip"><?php echo $company; ?></span>
														</div>
														<label class="d-block text-info text-center fs-4 fw-bold"><?php echo date("$format", strtotime($view->assetdate)); ?></label>
													</div>
													<div class="col-lg-2">
														<div class="text-center">
															<label class="form-label fs-4 fw-bold">Category / Sub Cate.</label>
														</div>
														<div class="text-center" id="asset_mgnt">											

															<?php
															$cat = $view->assetcategoryname?$view->assetcategoryname:'-';
															 	if (strlen($cat) > 16) {
												                $cate = substr($cat, 0, 16) ."...";
												            	}else{ $cate = $cat; } 

												            $subcat = $view->assetsubcategoryname?$view->assetsubcategoryname:'-';
															 	if (strlen($subcat) > 16) {
												                $subcate = substr($subcat, 0, 16) ."...";
												            	}
												            	else{ 
												            		$subcate = $subcat; 
												            	} 

											            	?>
															<label class="text-success fs-4 fw-bold"><?php echo $cate; ?></label>
															<?php if (strlen($cat) > 16) { ?>
																<span id="asset_mgnt_tltip"><?php echo $cat; ?></span>
															<?php } ?>
															<label class="d-block text-info text-center fs-4 fw-bold">
																<?php echo $subcate; ?></label>
															<?php if (strlen($subcat) > 16) {?>
																<span id="asset_mgnt_tltip"><?php echo $subcat; ?></span>
															<?php } ?>

														</div>
													</div>
													<?php
														$asset = $view->assetname?$view->assetname:'-';
														 	if (strlen($asset) > 16) {
											                $assetname = substr($asset, 0, 16) ."...";
											            	}else{ $assetname = $asset; } 

										            	?>
													<div class="col-lg-2">

														<div class="text-center">
															<label class="form-label fs-4 fw-bold">Asset / Value</label>
														</div>
														<div class="text-center" id="asset_mgnt">
															<label class="text-success fs-4 fw-bold"><?php echo $assetname; ?></label>
															<?php if (strlen($asset) > 16) { ?>
																<span id="asset_mgnt_tltip"><?php echo $asset; ?></span>
															<?php } ?>
														</div>

														<label class="d-block text-info text-center fs-4 fw-bold"><?php echo number_format($view->assetvalue,2,'.',','); ?></label>
													</div>
													<div class="col-lg-2">
														<div class="text-center">
															<label class="form-label fs-4 fw-bold">Place / Used By</label>
														</div>
														<div class="text-center" id="asset_mgnt">
															<label class="text-success fs-4 fw-bold">

																<?php
																	if ($view->allocatedtype==1) {
																		$place = $view->allocatedtocompany; 
																	} 
																	else 
																	{ 
																		if (isset($view->allocatedtostaff)){
																			$staff  = $this->db->query("SELECT * FROM STAFFS WHERE SNO='". $view->allocatedtostaff."' ")->row();

																				if(isset($staff)){
																				 	$place = $staff->STAFFNAME?$staff->STAFFNAME:'-';
																				}else{
																					$place = '-';
																				}

																		}else{
																			$place = '-';
																		}
																	}
																	if (strlen($place)>16) {
																			$placed = substr($place, 0, 16) ."...";
																	}else{
																		$placed = $place;
																	}
																 ?>	

																 <?php echo $placed; ?>
																</label>
															<span id="asset_mgnt_tltip"><?php echo $place; ?></span>
														</div>
													</div>
													<div class="col-lg-1">
														<label class="text-center fs-4 fw-bold">Image</label>
														<?php $image_url =  base_url().'assets/images/assetimages/asset/'.$view->assetimage;
															 if($image_url && $view->assetimage!=''){?> 

																<a class="d-block overlay"  href="<?php echo base_url(); ?>assets/images/assetimages/asset/<?php echo $view->assetimage; ?>" data-fslightbox="lightbox-basic">
																    <!--begin::Image-->
																    <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-roundedw-50px h-50px w-50px"
																    style="background-image:url('<?php echo base_url(); ?>assets/images/assetimages/asset/<?php echo $view->assetimage; ?>')">
																    </div>
																    <!--end::Image-->
																    <!--begin::Action-->
																     <div class="overlay-layer card-rounded bg-dark bg-opacity-25 shadow w-50px h-50px">
																        <i class="bi bi-eye-fill text-white fs-2"></i>
																    </div>
																    <!--end::Action-->
														  	</a>
							                              <?php }else{?>
							                               <a class="d-block overlay"  href="assets/images/asset.jpg" data-fslightbox="lightbox-basic_list">
															    <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-roundedw-50px h-50px w-50px"
															    style="background-image:url('assets/images/asset.jpg')">
															    </div>
															    <div class="overlay-layer card-rounded bg-dark bg-opacity-25 shadow w-50px h-50px">
														        <i class="bi bi-eye-fill text-white fs-2"></i>
														    </div>
														 	</a>
														<?php }?>
													 </div>
													<div class="col-lg-1">
														<label class="text-center fs-4 fw-bold">W.Card</label>
													 	<?php $image_urls =  base_url().'assets/images/assetimages/warranty/'.$view->assetimage;
															 if($image_urls && $view->assetwarranty!=''){?> 

																<a class="d-block overlay"  href="<?php echo base_url(); ?>assets/images/assetimages/warranty/<?php echo $view->assetwarranty; ?>" data-fslightbox="lightbox-basic">
																    <!--begin::Image-->
																    <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-roundedw-50px h-50px w-50px"
																    style="background-image:url('<?php echo base_url(); ?>assets/images/assetimages/warranty/<?php echo $view->assetwarranty; ?>')">
																    </div>
																    <!--end::Image-->
																    <!--begin::Action-->
																     <div class="overlay-layer card-rounded bg-dark bg-opacity-25 shadow w-50px h-50px">
																        <i class="bi bi-eye-fill text-white fs-2"></i>
																    </div>
																    <!--end::Action-->
														  	</a>
							                              <?php }else{?>
							                               <a class="d-block overlay"  href="assets/images/asset.jpg" data-fslightbox="lightbox-basic_list">
															    <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-roundedw-50px h-50px w-50px"
															    style="background-image:url('assets/images/asset.jpg')">
															    </div>
															    <div class="overlay-layer card-rounded bg-dark bg-opacity-25 shadow w-50px h-50px">
														        <i class="bi bi-eye-fill text-white fs-2"></i>
														    </div>
														 	</a>
														<?php }?>
													</div>
													<div class="col-lg-12 mt-4">
														<table class="table align-middle table-row-dashed table-striped table-hover fs-7 gy-1 gs-2" id="kt_datatable_asset_mgnt_history">
															<thead>
																<tr class="text-start text-muted fw-bold fs-7 gs-0">
																	<th class="min-w-80px">Date & Time</th>
																	<th class="min-w-100px">Issue</th>
																	<th class="min-w-200px">Issue Description</th>
																	<th class="min-w-80px">Created / Resolved By</th>
																	<th class="min-w-200px">Remarks</th>
																	<th class="min-w-80px">Status</th>
																</tr>
															</thead>
															<tbody class="text-gray-600 fw-semibold">

																<?php if(isset($history_list)){ foreach ($history_list as $i => $hlist) { ?>
																<tr>
																	<td class="">
																		<?php
																			$c_date = date_format(date_create($hlist["created_on"]),'d-m-Y');
															                $c_time = date_format(date_create($hlist["created_on"]),'H:i');

															                $cr_time = date("h:i A", strtotime($c_time));
															                $created_date = $c_date.' & '.$cr_time;
															                echo $created_date;
																		?>
																	</td>
																	<td class="ple1"><?php echo $hlist["issue"]?$hlist["issue"]:'-'; ?></td>
																	<td class="ple1"><?php echo $hlist["issuedescription"]?$hlist["issuedescription"]:'-'; ?></td>
																	<td class="ple1"><?php echo $hlist["created_by"]?$hlist["created_by"]:'-'; ?> <?php  if (isset($hlist["modified_by"])) {

																					echo $hlist["modified_by"]?' / ' .$hlist["modified_by"]:'-'; 

																			}?>
																	</td>
																	<td class="ple1"><?php echo $hlist["remarks"]?$hlist["remarks"]:'-'; ?></td>
																	<td >
																		<?php 

																	if ($hlist['status']==1){
																		echo '<label class="col-form-label fw-semibold fs-7">
																					<span style="background-color:#50cd89;border-radius: 8px;padding: 5px 15px 5px 15px;">Working</span>
																				</label>';
																	} 
																	if ($hlist['status']==2){
																		echo '<label class="col-form-label fw-semibold fs-7">
																				<span style="background-color:#7bfff9;border-radius: 8px;padding: 5px 15px 5px 15px;">Maintenance</span>
																				</label>';
																	} 
																	if ($hlist['status']==3){
																		echo '<label class="col-form-label fw-semibold fs-7">
																				<span style="background-color:#5fbdff;border-radius: 8px;padding: 5px 15px 5px 15px;">Repair</span>
																			</label>';
																	} 
																	if ($hlist['status']==4){
																		echo '<label class="col-form-label fw-semibold fs-7">
																				<span style="background-color:red;color: white;border-radius: 8px;padding: 5px 15px 5px 15px;">Damage</span>
																			</label>';
																	} 
																	if ($hlist['status']==5){
																		echo '<label class="col-form-label fw-semibold fs-7">
																				<span style="background-color:#ffc700;border-radius: 8px;padding: 5px 15px 5px 15px;">Need To Change</span>
																			</label>';
																	} 
																	if ($hlist['status']==6){
																		echo '<label class="col-form-label fw-semibold fs-7">
																					<span style="background-color:#ff4ea0;color: white;border-radius: 8px;padding: 5px 15px 5px 15px;">Dead</span>
																				</label>';
																	} 
																	?>
																	</td>
																</tr>
																<?php $i++; } } ?>
																
															</tbody>
														</table>
													</div>
												</div>											
									  	</div>
									  	<?php } ?>
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

	<?php $this->load->view("script.php");?>
	<script src="assets/plugins/custom/fslightbox/fslightbox.bundle.js"></script>

	
	<script>
      $("#kt_datatable_asset_mgnt_history").kendoTooltip({
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
			$("#kt_datatable_asset_mgnt_history").DataTable({
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
			// $('#kt_datatable_asset_mgnt_history').wrap('<div class="dataTables_scroll" />');
		</script>
	</body>
	<!--end::Body-->
	</html>