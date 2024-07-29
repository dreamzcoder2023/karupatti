<?php $this->load->view("common");?>
<style>
	.dataTables_scroll
    {
        position: relative;
        overflow: auto;
        max-height: 218px;/*the maximum height you want to achieve*/
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
									<h1 class="d-flex align-items-center text-dark fw-bold my-1 fs-3">View Sale Quotation
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
					<div id="kt_content_container" class="container-xxl">
							<!--begin::Row-->
							<div class="row gy-5 g-xl-8">
								<!--begin::Col-->
								<div class="col-xxl-8">
									<!--begin::Tables Widget 9-->
									<div class="card card-xxl-stretch mb-5 mb-xl-8">
										<form name="sale_deliverymode_form" id="sale_order_form" method="POST" action="<?php echo base_url(); ?>Sales_quotation/sales_quotation_save" enctype="multipart/form-data"  onsubmit="return sale_order_validation()">	
											<!--begin::Card body-->
											<div class="card-body py-4">
												<div class="loader">
												</div>
												<div class="row">
													<div class="col-lg-6">
														<div class="row">
															<label class="col-lg-3 col-form-label fw-semibold fs-6">Date</label>
															<label class="col-lg-9 col-form-label fw-bold fs-6">
																<?php
																	$date_format  = $this->db->query("SELECT * FROM general_settings  ")->row();
																	$format= $date_format->date_format;
																	echo date("$format", strtotime($quotation->QUOT_DATE));
																?>
															</label>

															<label class="col-lg-3 col-form-label fw-semibold fs-6">PARTY Name</label>
															<label class="col-lg-9 col-form-label fw-bold fs-6">
																<?php echo $quotation->NAME; ?>
															</label>


															<label class="col-lg-3 col-form-label fw-semibold fs-6">Company</label>
															<label class="col-lg-9 col-form-label fw-bold fs-6">
																<?php echo $quotation->COMPANY_NAME; ?>
															</label>
															
															
														</div>
													</div>
													<div class="col-lg-4">
														<div class="row">
														
															<label class="col-lg-12 col-form-label fw-bold fs-6" name="" id="">
																<i class="fa fa-user fs-6" aria-hidden="true" title="Last Name"></i>&emsp;<?php echo isset($quotation->NAME) ? $quotation->NAME : "-"; ?></label>
															<label class="col-lg-12 col-form-label fw-bold fs-6" name="" id="">
																<i class="fa-solid fa-location-dot fs-6" aria-hidden="true" title="Address"></i>
															&emsp;<?php echo isset($quotation->ADDRESS) ? $quotation->ADDRESS : "-"; ?></label>
															<label class="col-lg-6 col-form-label fw-bold fs-6" name="" id="">
																	<i class="fas fa-mobile-android-alt fs-6" aria-hidden="true" title="Mobile"></i>
																&emsp;<?php echo isset($quotation->PHONE) ? $quotation->PHONE : "-" ; ?></label>
																<label class="col-lg-6 col-form-label fw-bold fs-6">
																<?php 		if($quotation->RATING==1){ ?>
																			<i class="fa-solid fa-star " style="color:red;"></i>&nbsp;Bad
																	<?php  }
																		else if($quotation->RATING==2){ ?>
																			<i class="fa-solid fa-star " style="color:#ffc700;"></i>&nbsp;Average	
																	<?php   }
																		else if($quotation->RATING==3){ ?>
																			<i class="fa-solid fa-star " style="color:#50cd89;"></i>&nbsp;Good
																	<?php   }
																		else{ ?>
																			<i class="fa-solid fa-star " style="color:#d2d4dc;"></i>&nbsp;-	
																<?php      } ?>
															</label>
														</div>
													</div>
													<div class="col-lg-2">

														<!--begin::Image input-->
														<div class="image-input image-input-outline" data-kt-image-input="true">
															<!--begin::Preview existing avatar-->
															<?php if($quotation->PHOTO){ ?>
																<?php echo $quotation->PHOTO; ?> 
															
															<?php  }else{ ?>

																<img  src="<?php echo base_url(); ?>assets/images/party.jpg" height="125px" width="125px" >
															
															<?php   } ?>
															
															<!--end::Preview existing avatar-->
														</div>
														<!--end::Image input-->
														<!--begin::Hint-->
														<div class="form-text"></div>
													</div>
												</div>
												<div class="accordion mt-2" id="kt_accordion_item_list_view">
												    <div class="accordion-item">
												        <h2 class="accordion-header" id="kt_accordion_item_list_view_header_1">
												            <button class="accordion-button fw-bold fs-6 collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#kt_accordion_item_list_view_body_1" aria-expanded="true" aria-controls="kt_accordion_item_list_view_body_1">
												            Tagged Item &emsp; - &emsp; Count <span>&emsp; <?php echo count($selected_values); ?></span>&emsp;&emsp; Total Amount <span>&emsp; <?php echo array_sum($selected_amount); ?></span>
												            </button>
												        </h2>
												        <div id="kt_accordion_item_list_view_body_1" class="accordion-collapse collapse show" aria-labelledby="kt_accordion_item_list_view_header_1" data-bs-parent="#kt_accordion_item_list_view">
												            <div class="accordion-body">
												           	  	<table class="table align-middle table-row-dashed table-striped table-hover fs-7 gy-1 gs-2" id="view_salesentry_table">
																	<thead>
																		<tr class="text-start text-muted fw-bold fs-7 gs-0">
																			<th class="min-w-100px">Tag No</th>
																			<th class="min-w-100px">Item Type</th>
																			<th class="min-w-100px">Item Name</th>
																			<th class="min-w-50px">Quality</th>
																			<th class="min-w-50px">Purity</th>
																			<th class="min-w-50px">Wgt(gms)</th>
																			<th class="min-w-50px">St Wgt(gms)</th>
																			<th class="min-w-50px">Net Wgt(gms)</th>
																			<th class="min-w-50px">Img</th>
																			<th class="min-w-80px">Est Amount</th>
																		</tr>
																	</thead>
																	<tbody class="text-gray-600 fw-semibold">

																		<?php foreach($quotation->TAG_ITEMS as $key => $tag){?>

																			<tr id="row_<?php echo $key; ?>">
																				<td><?php echo $tag->tag_id; ?></td>
																				<td><?php echo $tag->metal_type; ?></td>
																				<td><?php echo $tag->item_name; ?></td>
																				<td><?php echo $tag->quality; ?></td>
																				<td><?php echo $tag->purity; ?></td>
																				<td><?php echo $tag->weight; ?></td>
																				<td><?php echo $tag->stone_weight; ?></td>
																				<td><?php echo $tag->net_weight; ?></td>
																				<td>
																				<?php 
																					$img_url = base_url()."tag_img/".$tag->img;

																					if($tag->img){ ?>
																						<a class="d-block overlay" data-fslightbox="lightbox-basic" href="<?php echo $img_url; ?>">
																							<!--begin::Image-->
																							<div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded w-40px h-40px"
																								style="background-image:url('<?php echo $img_url;?>')">
																							</div>
																							<!--end::Image-->
																							<!--begin::Action-->
																							<div class="overlay-layer card-rounded bg-dark bg-opacity-25 shadow  w-40px h-40px">
																								<i class="bi bi-eye-fill text-white fs-3"></i>
																							</div>
																							<!--end::Action-->
																						</a>



																					<?php }else{ ?>

																						<a class="d-block overlay" data-fslightbox="lightbox-basic" href="assets/images/Jewel.jpg">
																							<!--begin::Image-->
																							<div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded w-40px h-40px"
																								style="background-image:url('assets/images/Jewel.jpg')">
																							</div>
																							<!--end::Image-->
																							<!--begin::Action-->
																							<div class="overlay-layer card-rounded bg-dark bg-opacity-25 shadow  w-40px h-40px">
																								<i class="bi bi-eye-fill text-white fs-3"></i>
																							</div>
																							<!--end::Action-->
																						</a>

																					<?php } ?>
																				</td>
																				<td><?php echo $tag->est_amount; ?></td>
																			</tr>

																			<?php } ?>
																	</tbody>
																</table>
												            </div>
												        </div>
												    </div>
												</div><br>
												<!--end::Actions-->
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
					</div>
					<!--end::Content-->
					<?php $this->load->view("footer");?>
				</div>
				<!--end::Wrapper-->
			</div>
			<!--end::Page-->
		</div>
		<!--end::Root-->
		<?php $this->load->view("script");?>
		<!-- <script src="js/products-list.js"></script> -->
		<script>
			$("#view_salesentry_table").DataTable({
				//"aaSorting":[],
				"sorting":false,
				"paging": false,
				// "responsive": true,
				 "language": {
				  "lengthMenu": "Show _MENU_",
				 },
				 "dom":
				  "<'row'" +
				  "<'col-sm-6 d-flex align-items-center justify-conten-start'l>" +
				  ">" +

				  "<'table-responsive'tr>" +

				  "<'row'" +
				  "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
				  "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
				  ">"
				});
			$('#view_salesentry_table').wrap('<div class="dataTables_scroll" />');
		</script>
		<script>
	      $("#view_salesentry_table").kendoTooltip({
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
	      });
	    
	    </script>
		

		
	</body>
	<!--end::Body-->
</html>