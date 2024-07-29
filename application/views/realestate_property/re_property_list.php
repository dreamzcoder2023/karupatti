<?php $this->load->view("common.php") ; ?>
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
				<?php $this->load->view("sidebar.php") ; ?>
				<!--begin::Wrapper-->
				<div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
				<?php  $this->load->view("header.php"); ?>
				<!--begin::Toolbar-->
					<div class="toolbar py-2" id="kt_toolbar">
						<!--begin::Container-->
						<div id="kt_toolbar_container" class="container-fluid d-flex align-items-center">
							<!--begin::Page title-->
							<div class="flex-grow-1 flex-shrink-0 me-5">
								<!--begin::Page title-->
								<div data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
									<!--begin::Title-->
									<h1 class="d-flex align-items-center text-dark fw-bold my-1 fs-3">Property List
									<!--begin::Separator-->
									
									<span class="h-20px border-gray-400 border-start ms-3 mx-2"></span>
									<label class="d-flex align-items-center text-primary fw-bold my-1 fs-5">
										<span>Property Type&emsp;-</span>
										<span>&emsp;<?php if($pro_type==''){ echo "All"; }else{ echo $pro_type; } ?></span>
									</label>
									<span class="h-20px border-gray-400 border-start ms-3 mx-2"></span>
									<label class="d-flex align-items-center text-primary fw-bold my-1 fs-5">
										<span>Plot Area Type &emsp;-</span>
										<span>&emsp;<?php if($ploat_type_fill==''){ echo "All"; }else{ echo $ploat_type_fill; } ?></span>
									</label>
									<span class="h-20px border-gray-400 border-start ms-3 mx-2"></span>
									<label class="d-flex align-items-center text-primary fw-bold my-1 fs-5">
										<span>VAO Group &emsp;-</span>
										<span>&emsp;<?php if($vaogroupfill==''){ echo "All"; }else{ echo $vaogroupfill; } ?></span>
									</label>
									<span class="h-20px border-gray-400 border-start ms-3 mx-2"></span>
									<label class="d-flex align-items-center text-primary fw-bold my-1 fs-5">
										<span>Amenities &emsp;-</span>
										<span>&emsp;<?php if($amenitiesfill==''){ echo "All"; }else{ echo $amenitiesfill; } ?></span>
									</label>
									<span class="h-20px border-gray-400 border-start ms-3 mx-2"></span>
									
									
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
										<!--begin::Card header-->
										<div class="card-header1 border-0 pt-6">
											<div class="row">
												<div class="col-lg-8">
													
												</div>
												<div class="col-lg-4">
													<div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
														<!--begin::Filter-->
														<button type="button" class="btn btn-sm btn-outline btn-outline-solid btn-outline-warning btn-active-light-primary me-3" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
														
															Filter</button>
														<div class="menu menu-sub menu-sub-dropdown w-300px w-md-325px" data-kt-menu="true">
															<div class="px-7 py-5" data-kt-user-table-filter="form">
																<form method="POST" action="<?php echo base_url(); ?>Realestateproperty" id="fill_form">
																	<div class="scroll-y mh-325px my-1 px-1">
																		<div class="mb-2">
																			<label class="form-label fs-6 fw-semibold">Property Type</label>
																			<select class="form-select form-select-solid fw-semibold" data-control="select2" data-hide-search="false" name="pro_type" id="pro_type">	
																				<option value="" selected>All</option>
																				<option value="Land" <?php if($pro_type=="Land"){ echo "selected"; } ?>>Land</option>
																				<option value="House" <?php if($pro_type=="House"){ echo "selected"; } ?>>House</option>
																				<option value="Commercial"<?php if($pro_type=="Commercial"){ echo "selected"; } ?>>Commercial</option>
																				<option value="Industrial"<?php if($pro_type=="Industrial"){ echo "selected"; } ?>>Industrial</option>
																				<option value="Agriculture"<?php if($pro_type=="Agriculture"){ echo "selected"; } ?>>Agriculture</option>
																			</select>
																		</div>
																		<div class="mb-2">
																			<label class="form-label fs-6 fw-semibold">Plot Area Type</label>
																			<select class="form-select form-select-solid fw-semibold" data-control="select2" data-hide-search="false" name="ploat_type_fill" id="ploat_type_fill">	
																				<option value="" selected>All</option>
																				<option value="Cent" <?php if($ploat_type_fill=="Cent"){ echo "selected"; } ?>>Cent</option>
																	            <option value="Acre"<?php if($ploat_type_fill=="Acre"){ echo "selected"; } ?>>Acre</option>
																	            <option value="Sq.ft"<?php if($ploat_type_fill=="Sq.ft"){ echo "selected"; } ?>>Sq.ft</option>
																			</select>
																		</div>
																		<div class="mb-2">
																			<label class="form-label fs-6 fw-semibold">VAO Group</label>
																			<select class="form-select form-select-solid fw-semibold" data-control="select2" data-hide-search="false" name="vaogroupfill" id="vaogroupfill">	
																				<option value="" selected>All</option>
																				<?php  foreach($vao_group as $vlist) {?>
																					<option value="<?php echo $vlist['VAO_NAME'] ;?>" <?php if($vaogroupfill==$vlist['VAO_NAME']){ echo "selected"; } ?> ><?php echo $vlist['VAO_NAME'];?></option>
																				<?php }?>
																			   </select>
																			</select>
																		</div>
																		<div class="mb-2">
																			<label class="form-label fs-6 fw-semibold">Amenities</label>
																			<select class="form-select form-select-solid fw-semibold" data-control="select2" data-hide-search="false" name="amenitiesfill" id="amenitiesfill">	
																				<option value="" selected="">All</option>
																				<option value="Near by School" <?php if($amenitiesfill=="Near by School"){ echo "selected"; } ?>>Near by School</option>
																				<option value="Near by College" <?php if($amenitiesfill=="Near by College"){ echo "selected"; } ?>>Near by College</option>
																				<option value="Near by Hospital" <?php if($amenitiesfill=="Near by Hospital"){ echo "selected"; } ?>>Near by Hospital</option>
																			</select>
																		</div>
																		<div class="d-flex justify-content-end">
																			<button type="reset" class="btn btn-light btn-active-light-primary fw-semibold me-2 px-6" data-kt-menu-dismiss="true" data-kt-user-table-filter="reset" onclick="reset_fill()">Reset</button>
																			<button type="submit" class="btn btn-primary fw-semibold px-6" data-kt-menu-dismiss="true" data-kt-user-table-filter="filter">Apply</button>
																		</div>
																	</div>
																</form>														
															</div>
														</div>
														<button type="button"class="btn btn-sm btn-outline btn-outline-solid btn-outline-warning btn-active-light-primary me-3" onclick="export_list()">Export
														</button>
														<?php if(isset($_SESSION['Property List Add'])){ if($_SESSION['Property List Add']==1){?>
														<a href="<?php echo base_url();?>Realestateproperty/realestate_property_entry" target="_blank">
															<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#">
															<span class="svg-icon svg-icon-2">
																<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																	<rect opacity="0.5" x="11.364" y="20.364" width="16" height="2" rx="1" transform="rotate(-90 11.364 20.364)" fill="currentColor" />
																	<rect x="4.36396" y="11.364" width="16" height="2" rx="1" fill="currentColor" />
																</svg>
															</span>New Property</button>
														</a>
													    <?php }} ?>
													</div>
												</div>
											</div>
											<!--end::Card title-->
										</div>
										<!--end::Card header-->
										<!--begin::Card body-->
										<div class="card-body py-4">
											<!--begin::Table-->
											<table id="realestate_property_table" class="table align-middle table-row-dashed table-striped table-hover fs-7 gy-1 gs-2 dataTable no-footer">
												<thead>
													<tr class="text-start text-muted fw-bold fs-7 gs-0">
														<th class="min-w-50px">Sno</th>
														<th class="min-w-100px">Land Name / <br>Land Lord</th>
														<th class="min-w-100px">Property ID</th>
														<th class="min-w-100px">Party Info</th>
														<th class="min-w-100px">Ref.Name / <br>Property Type</th>
														<th class="min-w-100px">VAO Group /<br> Amenities</th>
														<th class="min-w-100px"><span class="ms-2">Plot Area </span><br>(No / Type)</th>
														<th class="min-w-125px">Total Amount</th>
														<th style="width: 20%;">Status</th>
														<th style="width: 17%;"><span class="text-end">Actions</span></th>
													</tr>
												</thead>
												<tbody class="text-gray-600 fw-semibold">
												<?php if(isset($pro_por_list)){ foreach ($pro_por_list as $i => $plist) { ?> 
													<tr>
														<td><?php echo $i+1; ?></td>
														<td class="ple1">
															<?php echo $plist['land_name'];?><br> <?php echo $plist['land_lord']?$plist['land_lord']:'-';?></td>
														<td class="ple1">
														   <i class="fa fa-copy fs-4" title="Copy Bill No" style="cursor: pointer;" onclick="copiedclipboardagno('<?php echo $plist['property_id'];?>', '<?php echo $i; ?>');"></i>													

															<?php echo $plist['property_id'];?>
															
															<span style="display: none;" class="ms-2 tooltipcopie" id="tooltipcopie<?php echo $i;?>"></span>
															</td>
														<td class="ple1">
															<span class="align-items-center"><?php echo $plist['party_name'] ;?></span>
														</td>
														<td class="ple1">
																<span class="align-items-center"><?php echo $plist['ref_name']?$plist['ref_name']:'-' ;?><br><?php echo $plist['property_type']?$plist['property_type']:'-' ;?></span>
														</td>
														<td class="ple1">
															<span class="align-items-center">
																	<?php echo $plist['vao_group']?$plist['vao_group']:'-' ;?> <br> <?php

																		$amenities = isset($plist['amenities']) ? json_decode($plist['amenities']) : [];
																		$amen = [];
																		foreach ($amenities as $amn) {
																		   
																		    if ($amn) {
																		        $amen[] = ucfirst(ltrim($amn, ','));
																		    }
																		}
																		echo implode(', ', $amen);
																	?>
															</span>
														</td>
														<td><i class="bi bi-geo-alt-fill fs-7"></i>&nbsp;<?php echo $plist['ploat_no'];?> / <?php echo $plist['ploat_type'];?></td>
														
														<!-- <td>< ?php echo $plist['pro_amount'];?></td> -->
														<td align="end"><i class="fa-solid fa-indian-rupee-sign fs-7 text-dark"></i>&nbsp;<?php $prop_amt = $plist['total_property_amount']; echo number_format($prop_amt,2,'.',',');?></td>
														<td>
															<?php if($plist['ploat_no'] == $plist['prop_sts_update']){ ?>
																<label class="col-form-label fw-semibold fs-7" >
																<span style="background-color:#B6BD4F;border-radius: 8px;padding: 5px 15px 5px 15px;">Not Sold</span>
															</label>

															<?php }else{ ?>
															<?php if($plist['prop_sts_update'] !='0'){ ?>
																<label class="col-form-label fw-semibold fs-7" >
																<span style="background-color:#46dcf9;border-radius: 8px;padding: 4px 8px 4px 10px;">Partial Sold</span>
															</label>
															<?php  }else{   ?>

															<?php if($plist['prop_sts_update']<= 0){ ?>
															<label class="col-form-label fw-semibold fs-7" ><span style="background-color:#f1416c;border-radius: 8px;padding: 5px 10px 5px 10px;">Sold Out</span>
															</label>
															<?php  }  }  }?>
														</td>
														<td class="">
															<span class="text-end">

																<a href="<?php echo base_url();?>Realestateproperty/realestate_property_view/<?php echo $plist['id']; ?>" target="_blank" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm">
																<i class="bi bi-eye-fill eyc fs-3"></i>
																</a>
																<button class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
																		<i class="fas fa-ellipsis-v eyc"></i>
																	</button>
																	<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px py-3" data-kt-menu="true" style="">
																		<?php if(isset($_SESSION['Property List Edit'])){ if($_SESSION['Property List Edit']==1){?>
																		<?php if($plist['ploat_no'] == $plist['prop_sts_update']){ ?>
																		<div class="menu-item px-3">
																			<a href="<?php echo base_url();?>Realestateproperty/realestate_property_edit/<?php echo $plist['id']; ?>" target="_blank" class="menu-link flex-stack px-3">Edit</a>
																		</div>
																		<?php } } }?>
																		<div class="menu-item px-3">
																			 <a href="<?php echo base_url();?>Realestateproperty/re_property_history/<?php echo $plist['id']; ?>" target="_blank" class="menu-link flex-stack px-3">History</a>
																		</div>
																		<?php if(isset($_SESSION['Property List Delete'])){ if($_SESSION['Property List Delete']==1){?>
																		<?php if($plist['ploat_no'] == $plist['prop_sts_update']){ ?>
																		<div class="menu-item px-3">
																			<a href="#"  data-bs-toggle="modal" data-bs-target="#kt_modal_delete_re_property"
																					onclick="property_del('<?php echo $plist['id'];?>')"class="menu-link flex-stack px-3">Delete</a>
																		</div>
																		<?php }}} ?>
																	</div>
																
															</span>
														</td>
													</tr>
													<?php $i++; } } ?>
												</tbody>
											</table>
											<?php 
												$coun = ceil( $count/50);
												$c_page = isset($_GET['page']) ? $_GET['page'] : 1;
											?>
											<?php $paging_info = get_paging_info1($count,50,$c_page); ?>

														<form   method="POST" id="filter_form" action="" enctype="multipart/form-data" >
															
															

															<input type="hidden" id="pro_type" name="pro_type"  value="<?php echo $pro_type; ?>">
															
															<input type="hidden" id="ploat_type_fill" name="ploat_type_fill"  value="<?php echo $ploat_type_fill; ?>">

															<input type="hidden" id="vaogroupfill" name="vaogroupfill"  value="<?php echo $vaogroupfill; ?>">
															<input type="hidden" id="amenitiesfill" name="amenitiesfill"  value="<?php echo $amenitiesfill; ?>">



														<ul class="pagination " style="float:right;" >
														<!-- If the current page is more than 1, show the First and Previous links -->
														<?php if($paging_info['curr_page'] > 1) : ?>
														
														<li class='paginate_button page-item move_to' value="<?php echo ($paging_info['curr_page'] - 1); ?>" > <a aria-controls='kt_roles_view_table' data-dt-idx='1' tabindex='0' class='page-link cursor-pointer'  title='Page <?php echo ($paging_info['curr_page'] - 1); ?>'><</a></li>
														
														<?php endif; ?>



														<?php
															//setup starting point

															//$max is equal to number of links shown
															$max = 3;
															if($paging_info['curr_page'] < $max)
																$sp = 1;
															elseif($paging_info['curr_page'] >= ($paging_info['pages'] - floor($max / 2)) )
																$sp = $paging_info['pages'] - $max + 1;
															elseif($paging_info['curr_page'] >= $max)
																$sp = $paging_info['curr_page']  - floor($max/2);
														?>

														<!-- If the current page >= $max then show link to 1st page -->
														<?php if($paging_info['curr_page'] >= $max) : ?>

														<li class='paginate_button page-item move_to' value="1" ><a aria-controls='kt_roles_view_table' data-dt-idx='1' tabindex='0' class='page-link cursor-pointer' onclick="form_submit()"  title='Page 1'>1</a></li>
														<!--<li class='paginate_button page-item '><input type="submit" name="first_page" value="Update" />  </li>-->
														..
														<?php endif; ?>
														<!-- Loop though max number of pages shown and show links either side equal to $max / 2 -->
														<?php for($i = $sp; $i <= ($sp + $max -1);$i++) : ?>

															<?php
																if($i > $paging_info['pages'])
																	continue;
															?>

															<?php if($paging_info['curr_page'] == $i) : ?>

																<li class='paginate_button page-item active move_to' value="<?php echo $i; ?>"> <a aria-controls='kt_roles_view_table' data-dt-idx='1' tabindex='0' onclick="form_submit()" class='page-link cursor-pointer text-hover-dark'  
																title='Page <?php echo $i; ?>'><?php echo $i; ?></a></li>

															<?php else : ?>

															<li class='paginate_button page-item move_to ' value="<?php echo $i; ?>"> <a aria-controls='kt_roles_view_table' data-dt-idx='1' tabindex='0' onclick="form_submit()" class='page-link cursor-pointer'  title='Page <?php echo $i; ?>'><?php echo $i; ?></a></li>

															<?php endif; ?>

														<?php endfor; ?>
														<!-- If the current page is less than say the last page minus $max pages divided by 2-->
														<?php if($paging_info['curr_page'] < ($paging_info['pages'] - floor($max / 2))) : ?>

															..
															<li class='paginate_button page-item  move_to' value="<?php echo $paging_info['pages']; ?>"><a  aria-controls='kt_roles_view_table' data-dt-idx='1' tabindex='0' onclick="submit()" class='page-link cursor-pointer'   title='Page <?php echo $paging_info['pages']; ?>'><?php echo $paging_info['pages']; ?></a></li>

														<?php endif; ?>

														<!-- Show last two pages if we're not near them -->
														<?php if($paging_info['curr_page'] < $paging_info['pages']) : ?>

															<li class='paginate_button page-item move_to ' value="<?php echo ($paging_info['curr_page'] + 1); ?>">  <a aria-controls='kt_roles_view_table' data-dt-idx='1' tabindex='0' onclick="submit()" class='page-link cursor-pointer'  title='Page <?php echo ($paging_info['curr_page'] + 1); ?>'>></a></li>

														

														<?php endif; ?>
														</ul>
														</form>
														<?php
														function get_paging_info1($tot_rows,$pp,$curr_page)
														{
															$pages = ceil($tot_rows / $pp); // calc pages

															$data = array(); // start out array
															$data['si']        = ($curr_page * $pp) - $pp; // what row to start at
															$data['pages']     = $pages;                   // add the pages
															$data['curr_page'] = $curr_page;               // Whats the current page
															$paging_info['curr_url'] = "http://eibs.elysiumproduct.com/";

															return $data; //return the paging data

														}?>
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
				<?php $this->load->view("footer.php") ?>
				</div>
				<!--end::Wrapper-->
			</div>
	<!--begin::Modal - delete Products-->
	<div class="modal fade" id="kt_modal_delete_re_property" tabindex="-1" aria-hidden="true">
		<!--begin::Modal dialog-->
		
		<!--end::Modal dialog-->
	</div>
	<!--end::Modal - delete Products-->
			<!-- Flash Data::Start -->
		     	<?php if($this->session->flashdata('g_success')){?>
                	<div class="menu-item px-3">
                        <a href="#" id="pop_up_success" class="menu-link flex-stack px-3" data-bs-toggle="modal" data-bs-target="#success_modal"></a>
                    </div>
                		 <?php } ?>
	             <?php if($this->session->flashdata('g_err')){?>
                        <div class="menu-item px-3">
               			 <a href="#" id="pop_up_success" class="menu-link flex-stack px-3" data-bs-toggle="modal" data-bs-target="#error_modal"></a>
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
			<!--end::Page-->
		</div>
		<!--end::Root-->

		
	
		<input type="hidden" id="baseurl" value="<?php echo base_url();?>">
		<?php $this->load->view("script.php")  ?>
		<!-- <script src="js/party-list.js"></script> -->
		<script>
			function reset_fill(){

				$('#pro_type').val('');
				$('#ploat_type_fill').val('');
				$('#vaogroupfill').val('');
				$('#amenitiesfill').val('');
				$('#fill_form').submit();
			}

		</script>
		<script type="text/javascript">
			
			function export_list() {

			    var value = <?php echo $exportreporperty; ?>;
					var values = [];

					value.map((data, i) => {	
					    var plot = data.ploat_no;
					    var sts = data.prop_sts_update;

					    if (plot == sts) {
					        var status = 'Not Sold';
					    } else {
					        if (sts != '0') {
					            var status = 'Partial Sold';
					        } else {
					            if (sts <= 0) {
					                var status = 'Sold Out';
					            }
					        }
					    }

					    var total = parseFloat(data.total_property_amount).toLocaleString('en-IN', {
					        maximumFractionDigits: 2,
					        style: 'currency',
					        currency: 'INR'
					    });

					    var arraystring  = JSON.parse(data.amenities);
					    var string = arraystring.join(",");

					    values.push({
					        'Sl.No': i + 1,
					        'Land Name': data.land_name,
					        'Property ID': data.property_id,
					        'Party Info': data.party_name,
					        'Reference Name': data.ref_name,
					        'Land Lord': data.land_lord,
					        'Property type': data.property_type,
					        'VAO Group': data.vao_group,
					        'Amenities': string,
					        'Plot Area No / Type': data.ploat_no + ' / ' + data.ploat_type,
					        'Total Amount': total,
					        'Status': status
					    });
					});

			    var filename = 'REPropertyList.xlsx';
			    var ws = XLSX.utils.json_to_sheet(values);
			    var wb = XLSX.utils.book_new();

			    XLSX.utils.book_append_sheet(wb, ws, "Sheet1");

			    XLSX.writeFile(wb, filename);
			}


		</script>

		<!-- Flash Data Script::Start -->
        <script>	
		<?php if($this->session->flashdata('g_success') || $this->session->flashdata('g_err')){?> 
		    $(document).ready( function() {
	        document.getElementById("pop_up_success").click()
	        });
	    <?php } ?>
        </script>
		<!-- Flash Data Script::End -->
		<!--delete script-->
		<script>
			function property_del(val){
			var baseurl= $("#baseurl").val();
			// alert(val);
			$.ajax({
			type: "POST",
			url: baseurl+'Realestateproperty/property_delete',
			async: false,
			type: "POST",
			data: "id="+val,
			
			success: function(response)
			{
			$('#kt_modal_delete_re_property').empty().append(response);
			$('#kt_modal_delete_re_property').addClass('show');
			//$("#kt_modal_delete_city").css("display", "block");
			}
			});
			}
			function removeprop(val)
			{ 
			var baseurl= $("#baseurl").val();
			// alert(val);
			$.ajax({
			type: "POST",
			url: baseurl+'Realestateproperty/delete',
			async: false,
			data:"field="+val,
			success: function(response)
			{
			window.location.href = baseurl+'Realestateproperty';
			}
			});
			}


			function closeDeleteModal()
			{
				var baseurl= $("#baseurl").val();
				$('#kt_modal_delete_re_property').removeClass('show');
				$('.modal-backdrop').removeClass('show');
				window.location.href = baseurl+'Realestateproperty';
			}
		</script>

		
		<script>

		$(document).ready(function() {
			
			$(".move_to").on("click", function () {
				value=$(this).val();
				// alert(value);
				$('#filter_form').attr('action', "<?php echo base_url(); ?>Realestateproperty?page="+value);
				$("#filter_form").submit();
				e.preventDefault();
			});
		});
		</script>
		
		<script>
	      $("#realestate_property_table").kendoTooltip({
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
			
			$("#realestate_property_table").DataTable({
				    "sorting":false,
				    // "info":true,
				    "responsive": true,
				    "lengthMenu": [[10, 25, 50], [10, 25, 50]],
				    "pageLength": 50,
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
				        ">"
				});
		</script>
		


		
		
		
        <script>

            $("#kt_daterangepicker_lot_entry_from").flatpickr({
                            dateFormat: "d-m-Y",
                        });
            $("#kt_daterangepicker_lot_entry_to").flatpickr({
                            dateFormat: "d-m-Y",
                        });
            $("#kt_daterangepicker_lot_entry_add_date").flatpickr({
                            dateFormat: "d-m-Y",
                        });
            $("#kt_daterangepicker_lot_entry_edit_date").flatpickr({
                            dateFormat: "d-m-Y",
                        });
            $("#kt_daterangepicker_lot_entry_view_date").flatpickr({
                            dateFormat: "d-m-Y",
                        });

            

        </script>
	</body>
	<!--end::Body-->
</html>