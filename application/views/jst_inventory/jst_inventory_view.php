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
									<h1 class="d-flex align-items-center text-dark fw-bold my-1 fs-3">View - JST [Jewel Sending by Transport]
									<!--begin::Separator-->
									<span class="h-20px border-gray-200 border-start ms-3 mx-2"></span>
									 [<?php echo $jst?$jst->jst_id:''; ?> ]
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
										<?php if (!empty($jst)) { ?>
										<div class="card-body py-4 mb-5">
											<div class="row">
												<label class="col-lg-1 col-form-label fw-semibold fs-6">Date</label>
												<label class="col-lg-3 col-form-label fw-bold fs-5"><?php
												 $date_format  = $this->db->query("SELECT * FROM general_settings  ")->row();
												 $format= $date_format->date_format;
												 echo date("$format", strtotime($jst->date));
												// echo $jst->date; ?></label>
												<div class="col-lg-4">
													<label class="col-form-label fw-semibold fs-6">From &emsp;</label>
													<label class="col-form-label fw-bold fs-5"><?php
													 $company  = $this->db->query("SELECT * FROM COMPANY WHERE ACTIVE='Y' AND COMPANYCODE='". $jst->from_company."' ")->row();
													 echo $company->COMPANYNAME;
													// echo $jst->from_company; ?></label>
												</div>
												<div class="col-lg-4">
													<label class="col-form-label fw-semibold fs-6">To &emsp;</label>
													<label class="col-form-label fw-bold fs-5"><?php
													 $company  = $this->db->query("SELECT * FROM COMPANY WHERE ACTIVE='Y' AND COMPANYCODE='". $jst->to_company."' ")->row();
													 echo $company->COMPANYNAME;
													// echo $jst->to_company; ?></label>
												</div>
												<label class="col-lg-1 col-form-label fw-semibold fs-6">Send Via</label>
												<label class="col-lg-3 col-form-label fw-bold fs-5"><?php 
												 $staff  = $this->db->query("SELECT * FROM STAFFS WHERE  SNO='". $jst->send_via."' ")->row();
												 echo $staff->STAFFNAME;
												// echo $jst->send_via; ?></label>
												<label class="col-lg-1 col-form-label fw-semibold fs-6">Cash</label>
												<label class="col-lg-3 col-form-label fw-bold fs-5"><i class="fa-solid fa-indian-rupee-sign fs-7 text-dark"></i>&nbsp;<?php echo number_format($jst->cash?$jst->cash:0,2,'.',','); ?></label>
												<label class="col-lg-1 col-form-label fw-semibold fs-6">User</label>
												<label class="col-lg-3 col-form-label fw-bold fs-5"><?php echo $jst->created_by; ?></label>
												<div class="col-lg-10"></div>
												<label class="col-lg-2 col-form-label fw-semibold fs-6" name="" id="">
												<?php if($jst->status=='Y'){ ?>
													<span style="background-color:#ffc700;border-radius: 8px;padding: 5px 15px 5px 15px;">Action Required</span>
											<?php } ?>
											<?php if($jst->status=='M'){ ?>
													<span style="background-color:#308ecf;border-radius: 8px;padding: 5px 15px 5px 15px;">Missed some</span>
											<?php } ?>
											<?php if($jst->status=='R'){ ?>
													<span style="background-color:#5aad52;border-radius: 8px;padding: 5px 15px 5px 15px;">Received</span>
											<?php } ?>
													</label>
											
											</div>
											<div class="row">
													<!-- <label class="col-form-label fw-bold fs-3 text-center">Summary</label> -->
													<label class="col-lg-6 col-form-label fw-bold fs-4 text-center">Tagged Item</label>
													<label class="col-lg-6 col-form-label fw-bold fs-4 text-center">Old Metal</label>
													<div class="col-lg-3">
														<div class="row">
															<label class="col-lg-4 form-label text-center fs-4 fw-bold">Gold</label>
															<div class="col-lg-8 text-center">
																<label class="text-success fs-2 fw-bold">
																<span title="Tagged Item Gold Weight">
																	<svg fill="#d4af37" width="30px" height="30px" viewBox="0 0 32 32" version="1.1" xmlns="http://www.w3.org/2000/svg">
																	<path d="M11.652 19.245l-0.001-0.001-0.005-0.003zM30.671 16.098l-2.207-5.839-8.022-4.361-16.624 8.861-2.431 6.495 9.8 5.214 0.161-7.067-7.624-4.353 0.654 0.346-0.373-0.215 1.332 0.708-1.212-0.708 7.526 4.065 16.205-8.376-2.594 1.424 3.037-1.551-6.011 3.183-10.434 5.727-0.668 6.816 19.484-10.371zM11.976 17.206l-4.389-2.342 4.269 1.32 13.070-5.8-12.95 6.822z"></path>
																	</svg>
																</span>
																<?php echo $jst->tagged_item_gold_weight ? number_format($jst->tagged_item_gold_weight,3):'0.00'; ?>(gms)</label>
																<div>
																	<label class="text-success fs-2 fw-bold">
																		<span><i class="fas fa-list-ol fs-2" title="Tagged Item Gold Count"></i>&nbsp;</span>
																		<?php echo $jst->tagged_item_gold_count; ?></label>
																</div>
															</div>
														</div>
													</div>
													<div class="col-lg-3">
														<div class="row">
															<label class="col-lg-4 form-label text-center fs-4 fw-bold">Silver</label>
															<div class="col-lg-8 text-center">
																<label class="text-success text-center fs-2 fw-bold">
																	<span title="Tagged Item Silver Weight">
																		<svg fill="#C0C0C0" width="30px" height="30px" viewBox="0 0 32 32" version="1.1" xmlns="http://www.w3.org/2000/svg">
																		<path d="M11.652 19.245l-0.001-0.001-0.005-0.003zM30.671 16.098l-2.207-5.839-8.022-4.361-16.624 8.861-2.431 6.495 9.8 5.214 0.161-7.067-7.624-4.353 0.654 0.346-0.373-0.215 1.332 0.708-1.212-0.708 7.526 4.065 16.205-8.376-2.594 1.424 3.037-1.551-6.011 3.183-10.434 5.727-0.668 6.816 19.484-10.371zM11.976 17.206l-4.389-2.342 4.269 1.32 13.070-5.8-12.95 6.822z"></path>
																		</svg>
																	</span>
																	<?php echo $jst->tagged_item_silver_weight ? number_format($jst->tagged_item_silver_weight,3):'0.000'; ?>(gms)</label>
																	<div class="text-center">
																		<label class="text-success fs-2 fw-bold">
																			<span><i class="fas fa-list-ol fs-2" title="Tagged Item Silver Count"></i>&nbsp;</span>
																			<?php echo $jst->tagged_item_silver_count; ?></label>
																</div>
															</div>
														</div>
													</div>
													<div class="col-lg-6">
														<div class="row">
															<div class="col-lg-12 text-center">
																<label class="text-success fs-2 fw-bold">
																<!-- <span class="me-3"> -->
																	<label><i class="fas fa-balance-scale fs-3" title="Old Metal Total Weight"></i></label>
																<!-- </span> -->
																<?php echo $jst->old_metal_weight ? number_format($jst->old_metal_weight,3):'0.000'; ?>(gms)</label>
																<div>
																	<label class="text-success fs-2 fw-bold">
																		<span><i class="fas fa-list-ol fs-2" title="Old Metal Total Count"></i>&nbsp;</span>
																		<?php echo $jst->old_metal_count; ?></label>
																</div>
															</div>
														</div>
													</div>
												</div>
												<div class="accordion" id="kt_accordion_tagged_jst">
											    <div class="accordion-item">
											        <h2 class="accordion-header" id="kt_accordion_tagged_jst_header">
											            <button class="accordion-button fw-bold fs-6 collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#kt_accordion_tagged_jst_body" aria-expanded="true" aria-controls="kt_accordion_tagged_jst_body">
											            Tagged Item 
											            </button>
											        </h2>
											        <div id="kt_accordion_tagged_jst_body" class="accordion-collapse collapse show" aria-labelledby="kt_accordion_tagged_jst_header" data-bs-parent="#kt_accordion_tagged_jst">
											            <div class="accordion-body">
											           	  <table class="table align-middle  table-hover fs-7 gy-4 gs-2 dataTable" id="add_jst_tag_table">
																	    <thead>
																	        <tr class="text-start text-muted fw-bold fs-7 gs-0">
															            <th class="min-w-25px">Sno</th>
															            <th class="min-w-125px">Tag ID</th>
															            <th class="min-w-125px">Item Type</th>
															            <th class="min-w-150px">Item</th>
															            <th class="min-w-150px">SubItem</th>
																					<th class="min-w-50px">Weight(gms)</th>
															        </tr>
																	    </thead>
																	    <tbody class="text-gray-600 fw-semibold">
																	    <?php  $i=1; if(isset($tagged_detail)){ 
																	    	$i=1;
																	    	foreach($tagged_detail as $tlist){ ?>	 
																			<tr 
																			<?php if($tlist['status']=='M'){ ?> style="background-color:#ff6161 !important;" <?php }?>>
																	    		<td><?php echo $i; ?></td>
																	    		<td><?php echo $tlist['tagged_id']?$tlist['tagged_id']:'-';  ?></td>
																	    		<td>
																	    				<?php
																								$item_type=$this->db->query("SELECT * FROM jewel_type WHERE jewel_type_id='".$tlist['item_type']."'  ")->row();
																								echo $item_type?$item_type->jewel_type:'-';
																							?>
																					</td>
																	    		<td>
																	    			<?php
																							$item_name  = $this->db->query("SELECT * FROM ITEMS WHERE  SNO='". $tlist['item']."' ")->row();
																							echo $item_name?$item_name->ITEMNAME:'-';?>
																					</td>
																					<td>
																			 				<?php $subitem_name  = $this->db->query("SELECT * FROM SUBITEM_LIST WHERE  SUB_ID='". $tlist['subitem']."' ")->row();
																							 	echo $subitem_name?$subitem_name->SUBITEM_NAME:'-';
																							?>
																					</td>
																	    		<td>
																	    			<?php echo $tlist['net_weight'] ? number_format($tlist['net_weight'],3):'0.000';  ?>
																	    		</td>
																	    	</tr>
																			<?php $i++; } }?>
																	    </tbody>
																	</table>
											            </div>
											        </div>
											    </div>
												</div><br>
												<div class="accordion" id="kt_accordion_old_gold_jst">
											    <div class="accordion-item">
											        <h2 class="accordion-header" id="kt_accordion_old_gold_jst_header_1">
											            <button class="accordion-button fw-bold fs-6 collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#kt_accordion_old_gold_jst_body_1" aria-expanded="false" aria-controls="kt_accordion_old_gold_jst_body_1">
											            Old Metal 
											            </button>
											        </h2>
											        <div id="kt_accordion_old_gold_jst_body_1" class="accordion-collapse collapse" aria-labelledby="kt_accordion_old_gold_jst_header_1" data-bs-parent="#kt_accordion_old_gold_jst">
											            <div class="accordion-body">
											           	  <table class="table align-middle table-hover fs-7 gy-4 gs-2 dataTable" id="add_jst_nontag_table">
																	    <thead>
																	       <tr class="text-start text-muted fw-bold fs-7 gs-0">
															            <th class="min-w-50px">Sno</th>
															            <th class="min-w-125px">Company</th>
															            <th class="min-w-125px">ID No</th>
															            <th class="min-w-150px">Count</th>
																					<th class="min-w-50px">Weight(gms)</th>
															        </tr>
																	    </thead>
																	    <tbody class="text-gray-600 fw-semibold">
																		<?php  $i=1;if(isset($old_metal_detail)){ $i=1;
																			foreach($old_metal_detail as $olist){ ?>	 
																					<tr  <?php if($olist['status']=='M'){ ?> style="background-color:#ff6161 !important;" <?php }  ?>  >
																	    		<td><?php echo $i; ?></td>
																	    		<td class="ple1"><?php
																				 					$company_get  = $this->db->query("SELECT * FROM COMPANY WHERE ACTIVE='Y' AND COMPANYCODE='". $olist['company']."' ")->row();
																									if(isset($company_get)){
																									 	echo  $company_get->COMPANYNAME;
																									}else{
																										echo '-';
																									}
																						 ?>
																					</td>
																	    		<td><?php echo $olist['sales_id'] ? $olist['sales_id']:'-'; ?></td>
																	    		<td><?php echo $olist['count']?$olist['count']:0; ?></td>
																	    		<td><?php echo $olist['weight'] ? number_format($olist['weight'] ,3):'0.000'; ?></td>
																	    	</tr>
																			<?php $i++; } }?>
																	    </tbody>
																	</table>
											            </div>
											        </div>
											    </div>
												</div>
												
												<?php if($jst->status=='M'){ ?>
													<div class="row">
													<div class="col-lg-1">
														<label class="col-form-label fw-semibold fs-6">Description</label>
													</div>
													<label class="col-lg-11 col-form-label fw-semibold fs-5"><?php echo $jst->description; ?></label>
												</div>
													<?php } ?>
												<?php if($jst->status=='Y'){ ?>
												<div class="d-flex justify-content-end mt-4">
													<a href="<?php echo base_url(); ?>Jst_inventory/jst_missed/<?php echo $jst_id; ?>" target="_blank">
														<button class="btn btn-primary me-2">Missed Some</button>
													</a>
													<a href="javascript:;" data-bs-toggle="modal" data-bs-target="#kt_modal_receive">
														<button class="btn btn-primary">Receive</button>
													</a>
												</div>
												<?php } ?>
											<!-- </div> -->
										</div>
										<!--end::Card body-->
										<?php } ?>
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
		<div class="modal fade" id="kt_modal_receive" tabindex="-1" aria-hidden="true">
			<!--begin::Modal dialog-->
			<div class="modal-dialog modal-m">
				<!--begin::Modal content-->
				<div class="modal-content rounded">
					<div class="swal2-icon swal2-warning swal2-icon-show" style="display: flex;">
						<div class="swal2-icon-content">&#x2713;</div></div>
						<div class="swal2-html-container" id="swal2-html-container" style="display: block;">Are you sure you want to Receive?</div>
						<div class="d-flex flex-center flex-row-fluid pt-12">
						<a href="<?php echo base_url(); ?>/Jst_inventory/jst_receive/<?php echo $jst_id; ?>">	
						<button type="submit" class="btn btn-primary me-3" data-bs-dismiss="modal">Yes</button></a>
							<button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
						</div><br><br>
				</div>
				<!--end::Modal content-->
			</div>
			<!--end::Modal dialog-->
		</div>

		<?php $this->load->view("script");?>

		<script>
			function send_via()
			{
				var send_via_dbox = document.getElementById("send_via_dbox").value;
				var others_label = document.getElementById('others_label');
				var others_tbox = document.getElementById('others_tbox');
				 if (send_via_dbox=="OTHERS") 
				  {
				  	others_label.style.display = "block";
				  	others_tbox.style.display = "block";
				  }
				  else
				  {
				  	others_label.style.display = "none";
				  	others_tbox.style.display = "none";
				  }
			}
		</script>
		<script>
		      $("#add_jst_tag_table").kendoTooltip({
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
			$("#add_jst_tag_table").DataTable({
				// "sorting":false,
				// "paging": false,
				 "aaSorting":[],
				//"responsive": true,
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
				  "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
				  // "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
				  ">"
				});
			$('#add_jst_tag_table').wrap('<div class="dataTables_scroll" />');
		</script>
		<script>
		      $("#add_jst_nontag_table").kendoTooltip({
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
			$("#add_jst_nontag_table").DataTable({
				// "sorting":false,
				// "paging": false,
				 "aaSorting":[],
				//"responsive": true,
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
				  "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
				  // "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
				  ">"
				});
			$('#add_jst_nontag_table').wrap('<div class="dataTables_scroll" />');
		</script>
	</body>
	<!--end::Body-->
</html>