<?php $this->load->view("common");?>
<style>
	.dataTables_scroll
    {
        position: relative;
        overflow: auto;
        min-height: 200px;
        max-height: 200px;/*the maximum height you want to achieve*/
        width: 100%;
    }
  .dataTables_scroll thead{
    position: -webkit-sticky;
    position: sticky;
    top: 0;
   background-color: #ec9629;
    z-index: 2;
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
									<h1 class="d-flex align-items-center text-dark fw-bold my-1 fs-3">Gallery
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
										<!--begin::Card body-->
										<div class="card-body py-4">
											<div class="mb-5 hover-scroll-x">
												<div class="d-grid">
													<ul class="nav nav-tabs flex-nowrap text-nowrap">
														<li class="nav-item">
															<a class="nav-link active btn btn-active-light btn-color-black-800 btn-active-color-primary rounded-bottom-0 fw-bold fs-6" data-bs-toggle="tab" href="#kt_tab_gallery">Gallery</a>
														</li>
														<li class="nav-item">
															<a class="nav-link btn btn-active-light btn-color-black-800 btn-active-color-primary rounded-bottom-0 fw-bold fs-6"  href="<?php echo base_url(); ?>Gallery/gallerylist" >
															List</a>
														</li>
													</ul>
												</div>
											</div>
											<div class="loader">
											</div>
											<div class="tab-content" id="myTabContent">
												<div class="tab-pane fade show active" id="kt_tab_gallery" role="tabpanel">
													<div class="row mt-4">
														<form action="<?php echo base_url(); ?>Gallery" method="POST">
															<div class="row">
																<label class="col-lg-1 col-form-label fw-semibold fs-6">Item</label>
																<div class="col-lg-2 fv-row fv-plugins-icon-container">
																	<select class="form-select form-select-solid" data-control="select2"  id="item" name="item" onchange="itemchange()">	
																	<option value="">All</option>
																	<?php if (isset($item)) { foreach ($item as $ilist) {
																		if ($ilist['SNO'] == $items) {
												                $val = 'selected';
												            } else {
												                $val = '';
												            }
																	echo '<option value="'.$ilist['SNO'].'" ' . $val . ' >'.$ilist['ITEMNAME'].'</option>'; } } ?>
																	</select>
																</div>
																<label class="col-lg-1 col-form-label fw-semibold fs-6">Subitem</label>
																<div class="col-lg-2 fv-row fv-plugins-icon-container">
																	<select class="form-select form-select-solid" data-control="select2"  id="subitem" name="subitem">	
																		<option value="">All</option>
																	
																	</select>
																</div>
																<div class="col-lg-2 fv-row fv-plugins-icon-container">
																<button type="submit" class="btn btn-primary fw-semibold px-6" data-kt-menu-dismiss="true" data-kt-user-table-filter="filter">Apply</button>
																</div>
															</div>
														</form>
														<div class="row mt-6">
														<?php  foreach($gallery as $list){  $img_count=0; ?>
															<?php 
																	$image_url =  $list['itemimage']?$list['itemimage']:''; 
																	if($image_url){ ?>


																		<div class="col-lg-2">
																				<!--begin::Overlay-->
																				<a class="d-block overlay" data-fslightbox="lightbox-basic" href="<?php base_url(); ?>assets/gallery/<?php echo $list['itemimage']; ?>">
																				    <!--begin::Image-->
																				    <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded min-h-175px"
																				        style="background-image:url('<?php base_url(); ?>assets/gallery/<?php echo $list['itemimage']; ?>')">
																				    </div>
																				    <!--end::Image-->
																				    <!--begin::Action-->
																				    <div class="overlay-layer card-rounded bg-dark bg-opacity-25 shadow">
																				        <i class="bi bi-eye-fill text-white fs-2x"></i>
																				    </div>
																				    <!--end::Action-->
																				</a>
																				<!--end::Overlay-->
																				<div class="mb-2">
																					<!--begin::Title-->
																					<div class="text-center">
																						<span class="fw-bold text-gray-800 cursor-pointer text-hover-primary fs-3 fs-xl-1"><?php echo $list['subitemname']; ?></span>
																					</div>
																					<!--end::Title-->
																				</div>
																			</div>

															<?php }else{?> 

																<div class="col-lg-2">
																				<!--begin::Overlay-->
																				<a class="d-block overlay" data-fslightbox="lightbox-basic" href="<?php base_url(); ?>assets/images/jewel.jpg">
																				    <!--begin::Image-->
																				    <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded min-h-175px"
																				        style="background-image:url('<?php base_url(); ?>assets/images/jewel.jpg')">
																				    </div>
																				    <!--end::Image-->
																				    <!--begin::Action-->
																				    <div class="overlay-layer card-rounded bg-dark bg-opacity-25 shadow">
																				        <i class="bi bi-eye-fill text-white fs-2x"></i>
																				    </div>
																				    <!--end::Action-->
																				</a>
																				<!--end::Overlay-->
																				<div class="mb-2">
																					<!--begin::Title-->
																					<div class="text-center">
																						<span class="fw-bold text-gray-800 cursor-pointer text-hover-primary fs-3 fs-xl-1"><?php echo $list['subitemname']; ?></span>
																					</div>
																					<!--end::Title-->
																				</div>
																			</div>

															<?php }  } ?>
													</div>
												</div>
											</div>

												
											
											</div>
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
		<input type="hidden" id="baseurl" value="<?php echo base_url(); ?>">
		<?php $this->load->view("script");?>

		<script src="assets/plugins/custom/fslightbox/fslightbox.bundle.js"></script>

	<script>
		var baseurl= $("#baseurl").val();
		itemchange();
			function itemchange(){

				var item =$('#item').val();

				var subid = '<?php echo $subitems ? $subitems:''; ?>';

				// alert(item);

				$.ajax({
				        type: "POST",
				        url: baseurl+'Gallery/get_subitem',
				        async: false,
				        type: "POST",
				        data: "typeid="+item+"&sub_id="+subid,
				        dataType: "html",
				        success: function(response)
				        {
							
				          $('#subitem').empty().append(response);

				        }
        });

			}
		</script>
	</body>
	<!--end::Body-->
</html>