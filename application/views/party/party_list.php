<?php $this->load->view("common");?>
<!-- <script src="<?php echo base_url();?>assets/js/webcam/jquery.min.js"></script> -->
<script src="<?php echo base_url();?>assets/js/webcam/webcam.min.js"></script>
<style>
	.dataTables_scroll
    {
        position: relative;
        overflow: auto;
        max-height: 115px;/*the maximum height you want to achieve*/
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
									<h1 class="d-flex align-items-center text-dark fw-bold my-1 fs-3">Party List
										<span class="h-20px border-gray-400 border-start ms-3 mx-2"></span>
											<label class="d-flex align-items-center text-primary fw-bold my-1 fs-5">
												<span>Party &emsp;-</span>
												<span>&emsp;<?php echo $partyname ? $partyname :' All' ?></span>
											</label>
										<span class="h-20px border-gray-400 border-start ms-3 mx-2"></span>
											<label class="d-flex align-items-center text-primary fw-bold my-1 fs-5">
												<span>Father &emsp;-</span>
												<span>&emsp;<?php echo $fathername ? $fathername :' All' ?></span>
											</label>
										<!-- <span class="h-20px border-gray-400 border-start ms-3 mx-2"></span>
											<label class="d-flex align-items-center text-primary fw-bold my-1 fs-5">
												<span>Area &emsp;-</span>
												<span>&emsp;< ?php echo $areafill ? $areafill :' All' ?></span>
											</label>
										<span class="h-20px border-gray-400 border-start ms-3 mx-2"></span>
											<label class="d-flex align-items-center text-primary fw-bold my-1 fs-5">
												<span>City &emsp;-</span>
												<span>&emsp;< ?php echo $cityfill ? $cityfill :' All' ?></span>
											</label> -->
										<span class="h-20px border-gray-400 border-start ms-3 mx-2"></span>
											<label class="d-flex align-items-center text-primary fw-bold my-1 fs-5">
												<span>Phone &emsp;-</span>
												<span>&emsp;<?php echo $phonefill ? $phonefill :' All' ?></span>
											</label>
									</h1>
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
																				<b><span id="err_msg"> <?php echo $this->session->flashdata('g_err'); ?></span></b>
																				</div>
																			<div class="d-flex flex-center flex-row-fluid pt-12">
																				<button type="submit" class="btn btn-primary me-3" data-bs-dismiss="modal">Ok</button>
																				
																			</div><br><br>
																	</div>
																	<!--end::Modal content-->
																</div>
																<!--end::Modal dialog-->
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
											<!--begin::Filter-->
											<button type="button"
												class="btn btn-sm btn-outline btn-outline-solid btn-outline-warning btn-active-light-primary me-3" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Filter
											</button>
											<div class="menu menu-sub menu-sub-dropdown w-300px w-md-325px" data-kt-menu="true">
												<div class="px-7 py-5" data-kt-user-table-filter="form">
													<form method="POST" action="<?php echo base_url(); ?>Party" id="fill_form">
														<div class="scroll-y mh-325px my-1 px-1">
															<div class="mb-2">
																<label class="form-label fs-6 fw-semibold">Name</label>
																<div class="fv-row fv-plugins-icon-container">
																	<input type="text" name="partyname" id="partyname" class="form-control form-control-lg1 form-control-solid" placeholder="Party Name" value="<?php echo $partyname ? $partyname:''; ?>">
																  <div class="fv-plugins-message-container invalid-feedback"></div>
																</div>
															</div>
															<div class="mb-2">
																<label class="form-label fs-6 fw-semibold">Father Name</label>
																<div class="fv-row fv-plugins-icon-container">
																	<input type="text" name="fathername" id="fathername" class="form-control form-control-lg1 form-control-solid" placeholder="Father Name" value="<?php echo $fathername; ?>">
																  <div class="fv-plugins-message-container invalid-feedback"></div>
																</div>
															</div>
															<!-- <div class="mb-2">
																<label class="form-label fs-6 fw-semibold">Area</label>
																<div class="fv-row fv-plugins-icon-container">
																	<input type="text" name="areafill" id="areafill" class="form-control form-control-lg1 form-control-solid" placeholder="Area" value="< ?php echo $areafill; ?>">
																  <div class="fv-plugins-message-container invalid-feedback"></div>
																</div>
															</div>
															<div class="mb-2">
																<label class="form-label fs-6 fw-semibold">City</label>
																<div class="fv-row fv-plugins-icon-container">
																	<input type="text" name="cityfill" id="cityfill" class="form-control form-control-lg1 form-control-solid" placeholder="City" value="< ?php echo $cityfill; ?>">
																  <div class="fv-plugins-message-container invalid-feedback"></div>
																</div>
															</div> -->
															<div class="mb-2">
																<label class="form-label fs-6 fw-semibold">Phone Number</label>
																<div class="fv-row fv-plugins-icon-container">
																	<input type="text" name="phonefill" id="phonefill" class="form-control form-control-lg1 form-control-solid" placeholder="Phone Number" value="<?php echo $phonefill; ?>">
																  <div class="fv-plugins-message-container invalid-feedback"></div>
																</div>
															</div>
															<div class="d-flex justify-content-end">
																<button type="reset" class="btn btn-light btn-active-light-primary fw-semibold me-2 px-6" data-kt-menu-dismiss="true" data-kt-user-table-filter="reset" onclick="reset_fill()">Reset</button>
																<button type="submit" class="btn btn-primary fw-semibold px-6" data-kt-menu-dismiss="true" data-kt-user-table-filter="filter">Apply</button>
															</div>
														</div>
												  </form>
								        </div>
							        </div>
											<!--begin::Add user-->
											<a href="<?php echo base_url();?>party/party_add" target="_blank"> <button type="button" class="btn btn-primary"  data-bs-toggle="modal" >
											<!--begin::Svg Icon | path: icons/duotune/arrows/arr075.svg-->
											<span class="svg-icon svg-icon-2">
												<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
													<rect opacity="0.5" x="11.364" y="20.364" width="16" height="2" rx="1" transform="rotate(-90 11.364 20.364)" fill="currentColor" />
													<rect x="4.36396" y="11.364" width="16" height="2" rx="1" fill="currentColor" />
												</svg>
											</span>
											<!--end::Svg Icon-->New Party</button></a>
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
											<tr class="text-start text-muted fw-bold fs-7 gs-0">
												<th class="min-w-25px">Party Details</th>
												<th class="min-w-25px">Address</th>
												<!-- <th class="min-w-25px">Zone</th>
												<th class="min-w-25px">Area</th> -->
												<th class="min-w-25px">Phone</th>
												<th class="min-w-25px">Rating</th>
												<!-- <th class="min-w-25px">Status</th> -->
												<th class="min-w-25px"><span class="text-end">Actions</span></th>
											</tr>
											<!--end::Table row-->
										</thead>
										<!--end::Table head-->
										<!--begin::Table body-->
										<tbody class="text-gray-600 fw-semibold">
											<!--begin::Table row-->
											<?php  $i=1; foreach($party_list as $plist){?>
											
											<tr>
												
												<!--begin::User=-->
												<td class="d-flex align-items-center">
													<!--begin:: Avatar -->
													<div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
														<?php

														if($plist['PARTY_IMAGE'] != "")
														{

														?>
															<img src="<?php echo $plist['PARTY_IMAGE']; ?>" height="125px" width="125px" >
														<?php
															}
															else
															{
														?>
															
														<?php 
															if($plist['PHOTO']!="")
															{
																if($plist['TYPE_OF_RECORD']=='N')
																{?>
																	<img src="<?php echo $plist['PHOTO']; ?>" height="125px" width="125px" >
																<?php 
																}
																else
																{
														?>
															<img src="data:image/jpeg;base64,<?php echo base64_encode($plist['PHOTO']); ?>"  >
														<?php 
															}
															}
															else
															{?>
																<img src="<?php echo base_url();?>assets/images/party.jpg"  >
															<?php }}
														?>
													</div>
													<!--end::Avatar-->
													<!--begin::User details-->
													<div class="d-flex flex-column">
														<a href="javascript:;" class="text-gray-800 text-hover-primary mb-1"><?php  echo ucwords(strtolower($plist['NAME'])); ?></a>
														<span><?php  echo $plist['PID']; ?></span>
														
													</div>
													<!--begin::User details-->
												</td>
												<!--end::User=-->
												<td>
												<?php  
												if($plist['TYPE_OF_RECORD']=='O')
												{
													$zone=$this->db->query("SELECT * from ZONE_MASTER z, AREA A where A.ZONE_SNO=Z.SNO and A.AREANAME='".$plist['AREA']."'")->row();
													if (isset($zone)) {
													echo ucwords(strtolower($plist['CITY']))."<br>".$plist['AREA']."<br>".$zone->ZONENAME	; 
													}else{ echo '-';}
												}
												else
												{
													$address = $this->db->query("select A.AREANAME,Z.ZONENAME,C.CITYNAME FROM CITY C, ZONE_MASTER Z, AREA A where Z.SNO=A.ZONE_SNO and A.SNO=c.AREAID and c.CITYID=".$plist['CITY_ID'])->row();
													if (isset($address)) {
														
													
													echo ucwords(strtolower($address->CITYNAME))."<br>".$address->AREANAME."<br>".$address->ZONENAME;
													}
												}
												?></td>
												<!--begin::Role=-->
												<!-- <td><?php echo $plist['ZONENAME']; ?></td> -->
												<!--end::Role=-->
												<!--begin::Last login=-->
												<!-- <td>
													<?php  echo $plist['AREA']; ?>
												</td> -->
												<!--end::Last login=-->
												<!--begin::Two step=-->
												<td><?php  echo $plist['PHONE']; ?></td>
												<!--end::Two step=-->
												 <td><?php 
												if($plist['RATING']==3)
												{
													// echo '<b><span class="badge badge-success" style=>GOOD</span></b>';
													echo '<span><i class="fa-solid fa-star fs-3" style="color:#50cd89;"></i> Good</span>';
												}
												else if($plist['RATING']==2)
												{
													// echo '<b><span class="badge badge-warning">AVERAGE</span></b>';
													echo '<span><i class="fa-solid fa-star fs-3" style="color:#ffc700;"></i> Average</span>';
												}
												else if($plist['RATING']==1)
												{
													// echo '<b><span class="badge badge-danger">BAD</span></b>';
													echo '<span><i class="fa-solid fa-star fs-3" style="color:red;"></i> Bad</span>';
												}
												else
												{
													echo '<span><i class="fa-solid fa-star fs-3" style="color:#d2d4dc;"></i> Nil</span>';
												}
												?></td>
												<!--begin::Joined-->
												<!-- <td>
													<label class="form-check form-switch form-check-custom form-check-solid">
															<input class="form-check-input" type="checkbox" value="1" checked="checked">
													</label>
													
												</td> -->
												<!--begin::Action=-->
												<td>
													<span class="text-end">
														<a href="<?php echo base_url();?>Party/party_view/<?php echo $plist['PID']; ?>" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm" target="_blank">
															<i class="bi bi-eye-fill eyc"></i>
														</a>
														<a href="<?php echo base_url();?>Party/party_edit/<?php echo $plist['PID']; ?>" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1" target="_blank">
															<span class="svg-icon svg-icon-3">
																<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																	<path opacity="0.3" d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z" fill="currentColor"></path>
																	<path d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z" fill="currentColor"></path>
																</svg>
															</span>
														</a>
														<!-- <a href="#" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1" data-bs-toggle="modal" data-bs-target="#kt_modal_edit_party" onclick="party_edit('<?php //echo $plist['PID'];?>')" >
															<span class="svg-icon svg-icon-3">
																<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																	<path opacity="0.3" d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z" fill="currentColor"></path>
																	<path d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z" fill="currentColor"></path>
																</svg>
															</span>
														</a> -->
														<a href="javascript:;" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm" data-bs-toggle="modal" data-bs-target="#kt_modal_delete_party" onclick="party_delete('<?php echo $plist['PID'];?>')">
															<!--begin::Svg Icon | path: icons/duotune/general/gen027.svg-->
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
											<?php $i++; }?>
											<!--end::Table row-->
										</tbody>
										<!--end::Table body-->
									</table>
									<!--end::Table-->
									<?php 
														$coun   = ceil($count/50);
														$c_page = isset($_GET['page']) ? $_GET['page'] : 1;
													?>
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
																<?php $paging_info = get_paging_info1($count,50,$c_page); ?>

																<form   method="POST" id="filter_form" action="" enctype="multipart/form-data" >
																<input type="hidden" id="partyname" name="partyname"  value="<?php echo $partyname; ?>">
																<input type="hidden" id="fathername" name="fathername"  value="<?php echo $fathername; ?>">
																<!-- <input type="hidden" id="areafill" name="areafill"  value="< ?php echo $areafill; ?>">
																<input type="hidden" id="cityfill" name="cityfill"  value="< ?php echo $cityfill; ?>"> -->
																<input type="hidden" id="phonefill" name="phonefill"  value="<?php echo $phonefill; ?>">
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
		<!--begin::Modal - party history-->
		<div class="modal fade" id="kt_modal_party_history" tabindex="-1" aria-hidden="true">
			
		</div>
		<!--end::Modal - party history-->
		<!--begin::Modal - view particular party loan summary history-->
		<div class="modal fade" id="kt_modal_view_particular_party_loan_summary_history" tabindex="-1" aria-hidden="true">
			
		</div>
		<!--end::Modal -view particular party loan summary history-->
		<!--begin::Modal - add party-->
		<div class="modal fade" id="kt_modal_add_party" tabindex="-1" aria-hidden="true">
			<!--begin::Modal dialog-->
			<div class="modal-dialog modal-xl">
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
					<div class="modal-body pt-0 pb-15 px-5 px-xl-20">
						<!--begin::Heading-->
						<div class="mb-13 text-center">
							<h1 class="mb-3">New Party</h1>
						</div>
						<form name="party_add_form" id="party_add_form" method="POST" action="<?php echo base_url(); ?>party/party_save" enctype="multipart/form-data" onsubmit="return party_validation();">
						<!--end::Heading-->
						<div class="row mb-6">
							<!--begin::Label-->
							<span class="text-muted fw-semibold fs-5" style="text-align: right !important;">Party ID: 
								<?php 
									$prefix=$_SESSION['LOANPREFIX'];
									$pidqry=$this->db->query("SELECT TOP 1 PID FROM PARTIES WHERE PID LIKE '".$prefix."%' ORDER BY PID DESC");
									$pidres=$pidqry->row();
									$last_data=$pidres->PID;
	                            	$exlno = substr($last_data,1);
	                            	$next_value = (int)$exlno + 1;
	                            	$p_id1=str_pad($next_value,6,0,STR_PAD_LEFT);
	                            	$p_id=$prefix.$p_id1;
									echo $p_id;
							?></span>
							<input type="hidden" id="party_id" name="party_id" value="<?php echo $p_id;?>">
							<label class="col-lg-1 col-form-label required fw-semibold fs-6">Name</label>
							<!--end::Label-->
							<!--begin::Col-->
							<div class="col-lg-3 fv-row fv-plugins-icon-container">
								<input type="text" name="party_name" id="party_name" class="form-control form-control-lg form-control-solid" placeholder="Party Name">
								<div class="fv-plugins-message-container invalid-feedback" id="party_name_err" name="party_name_err"></div>
							</div>
							<!--end::Col-->			
							<!--begin::Label-->
							<label class="col-lg-1 col-form-label required fw-semibold fs-6">L.Name</label>
							<!--end::Label-->
							<!--begin::Col-->
							<div class="col-lg-3 fv-row fv-plugins-icon-container">
								<div class="row"> 
								<div class="col-lg-4">
									<select class="form-select form-select-solid" data-control="select2" data-placeholder="" name="prefix" id="prefix" data-hide-search="true" >
										<option value="S/o">S/o</option>
										<option value="D/o">D/o</option>
										<option value="W/o">W/o</option>
										<option value="C/o">C/o</option>
									</select></div>
								<div class="col-lg-8">
								<input type="text" name="lname" id="lname" class="form-control form-control-lg form-control-solid col-lg-2" placeholder="Last"></div>
								</div>
								<div class="fv-plugins-message-container invalid-feedback"  id="lname_err" name="lname_err"></div>
							</div>
							<!--end::Col-->
							<!--begin::Label-->
							<label class="col-lg-1 col-form-label fw-semibold fs-6">Oth.Name</label>
							<!--end::Label-->
							<!--begin::Col-->
							<div class="col-lg-3 fv-row fv-plugins-icon-container">
								<input type="text" name="oname" id="oname" class="form-control form-control-lg form-control-solid" placeholder="Guardian Name">
								<div class="fv-plugins-message-container invalid-feedback" name="oname_err" id="oname_err" ></div>
							</div>
							<!--end::Col-->
							<!--begin::Label-->
							<label class="col-lg-1 col-form-label fw-semibold fs-6">Mother</label>
							<!--end::Label-->
							<!--begin::Col-->
							<div class="col-lg-3 fv-row fv-plugins-icon-container">
								<input type="text" name="mother_name" id="mother_name" class="form-control form-control-lg form-control-solid" placeholder="Mother Name">
								<div class="fv-plugins-message-container invalid-feedback" name="mother_name_err" id="mother_name_err" ></div>
							</div>
							<!--end::Col-->
							
							<!--begin::Label-->
							<label class="col-lg-1 col-form-label required fw-semibold fs-6">Zone</label>
							<!--end::Label-->
							<!--begin::Left Section-->
							<div class="col-lg-3">
								<!--begin::Select-->
								<select class="form-select form-select-solid" data-control="select2" data-placeholder="Select Zone" name="zone" id="zone" data-hide-search="true" onchange="get_area()" >
									<option selected>Select Zone</option>
									<?php
										$zqry=$this->db->query("SELECT * FROM ZONE_MASTER ");
										$zonelist=$zqry->result_array();
										$j=1;
										foreach($zonelist as $zlist1)
										{

									?>
										<option value="<?php echo $zlist1['SNO']; ?>"> <?php echo $zlist1['ZONENAME'];?></option>
									<?php 
											$j++;
										}
									?>	
								</select>
								<!--end::Select-->
							</div>
							<!--end::Left Section-->
							<!--begin::Label-->
							<label class="col-lg-1 col-form-label required fw-semibold fs-6">Area</label>
							<!--end::Label-->
							<!--begin::Left Section-->
							<div class="col-lg-3">
								<!--begin::Select-->
								<select class="form-select form-select-solid" data-control="select2" data-placeholder="Select Area" data-hide-search="true" name="area" id="area" onchange="get_city()">
									<option selected>Select Area</option>
									
								</select>
								<!--end::Select-->
							</div>

							
							<!-- <div class="col-lg-2 fv-row fv-plugins-icon-container"> -->
								<!-- <div class="row"> 
								<div class="col-lg-1"> -->
								<!-- <input type="text" name="company" class="form-control form-control-lg form-control-solid" placeholder="Address" style="width:35px;"></div> -->
								<!-- <div class="col-lg-2"> -->
								<!-- <input type="text" name="company" class="form-control form-control-lg form-control-solid col-lg-2" placeholder="Address"> </div> --> 
								<!-- </div> -->
								<!-- <div class="fv-plugins-message-container invalid-feedback"></div> -->
							<!-- </div> -->
							<!--begin::Label-->
							<label class="col-lg-1 col-form-label required fw-semibold fs-6">City</label>
							<!--end::Label-->
							<!--begin::Left Section-->
							<div class="col-lg-3">
								<!--begin::Select-->
								<select class="form-select form-select-solid" name="city" id="city" data-control="select2" data-placeholder="Select City" data-hide-search="true" onchange="get_village()">
									<option selected>Select City</option>
									
								</select>
								<!--end::Select-->
							</div>
							<!--end::Left Section-->
							<!--begin::Label-->
							<label class="col-lg-1 col-form-label required fw-semibold fs-6">Village</label>
							<!--end::Label-->
							<!--begin::Left Section-->
							<div class="col-lg-3">
								<!--begin::Select-->
								<select class="form-select form-select-solid" data-control="select2" data-placeholder="Select Village" data-hide-search="true" name="village" id="village"  onchange="get_street()">
									<option selected>Select Village</option>
									
								</select>
								<!--end::Select-->
							</div>
							<!--end::Left Section-->
							<!--begin::Label-->
							<label class="col-lg-1 col-form-label fw-semibold fs-6">Street</label>
							<!--end::Label-->
							<!--begin::Col-->
							<div class="col-lg-3 fv-row fv-plugins-icon-container">
								<!--begin::Select-->
								<select class="form-select form-select-solid" data-control="select2" data-placeholder="Select Street" data-hide-search="true" name="street" id="street">
									<option selected>Select Street</option>
									
								</select>
								<!--end::Select-->
								<!-- <div class="row"> 
								<div class="col-lg-3">
								<input type="text" name="doorno" id="doorno" class="form-control form-control-lg form-control-solid" placeholder="DoorNo" ></div>
								<div class="col-lg-9">
								<input type="text" name="address" id="address" class="form-control form-control-lg form-control-solid col-lg-2" placeholder="Address"></div>
								</div> -->
								<div class="fv-plugins-message-container invalid-feedback" name="address_err" id="address_err"></div>
							</div>
							<!--end::Col-->
							<!--begin::Label-->
							<label class="col-lg-1 col-form-label fw-semibold fs-6">Landmark</label>
							<!--end::Label-->
							<!--begin::Left Section-->
							<div class="col-lg-3 fv-row fv-plugins-icon-container">
								<input type="text" name="landmark" id="landmark" class="form-control form-control-lg form-control-solid" placeholder="Landmark" required>
								<div class="fv-plugins-message-container invalid-feedback" name="landmark_err" id="landmark_err"></div>
							</div>
							<!--end::Left Section-->
							<!--begin::Label-->
							<label class="col-lg-1 col-form-label required fw-semibold fs-6">Mobile</label>
							<!--end::Label-->
							<!--begin::Col-->
							<div class="col-lg-3 fv-row fv-plugins-icon-container">
								<input type="text" name="mobile" id="mobile" class="form-control form-control-lg form-control-solid" placeholder="Mobile" required>
								<div class="fv-plugins-message-container invalid-feedback" name="mobile_err" id="mobile_err"></div>
							</div>
							<!--end::Col-->
							<!--begin::Label-->
							<label class="col-lg-1 col-form-label  fw-semibold fs-6">Phone</label>
							<!--end::Label-->
							<!--begin::Col-->
							<div class="col-lg-3 fv-row fv-plugins-icon-container">
								<input type="text" name="phone2" id="phone2" class="form-control form-control-lg form-control-solid" placeholder=" Alter Phone" >
								<div class="fv-plugins-message-container invalid-feedback" name="phone2_err" id="phone2_err"></div>
							</div>
							<!--end::Col-->
							<!--begin::Col-->
							<div class="col-lg-1 fv-row fv-plugins-icon-container fv-plugins-bootstrap5-row-invalid">
								<!--begin::Options-->
								<div class="d-flex align-items-center mt-3">
									<!--begin::Option-->
									<label class="form-check form-check-inline form-check-solid me-5 is-invalid" style="float: right;padding-left: 80px;">
										<input class="form-check-input" name="w_chk" id="w_chk" type="checkbox" checked  onclick="EnableDisableTextBox()">
										<!--<span class="fw-semibold ps-2 fs-6">Branch Status</span>-->
									</label>
									<!--end::Option-->
								</div>
								<!--end::Options-->
							</div>
							<!--end::Col-->
							<!--begin::Label-->
							<label class="col-lg-3 col-form-label fw-semibold fs-6">Phone no Same as WhatsApp no</label>
							<!--end::Label-->
							<!-- <div id="whatsapp" style="display: none;"> -->
								<!--begin::Label-->
								<label id="w_lbl" name="w_lbl" class="col-lg-1 col-form-label required fw-semibold fs-6" style="display: none;">Whatsapp No</label>
								<!--end::Label-->
								<!--begin::Col-->
								<div class="col-lg-3 fv-row fv-plugins-icon-container" id="w_div" style="display: none;">
									<input type="text" name="w_no" id="w_no" class="form-control form-control-lg form-control-solid" placeholder=" Whatsapp Phone" style="display: none;"  >
									<div class="fv-plugins-message-container invalid-feedback" id="w_msg_div" style="display: none;"></div>
								</div>
								<!--end::Col-->
							<!-- </div> -->
							
							<!--begin::Label-->
							<label class="col-lg-1 col-form-label fw-semibold fs-6">Email</label>
							<!--end::Label-->
							<!--begin::Col-->
							<div class="col-lg-3 fv-row fv-plugins-icon-container">
								<input type="text" name="email" id="email" class="form-control form-control-lg form-control-solid" placeholder="Email ID">
								<div class="fv-plugins-message-container invalid-feedback" name="email_err" id="email_err" ></div>
							</div>
							<!--end::Col-->			
							<!--begin::Label-->
							<label class="col-lg-1 col-form-label required fw-semibold fs-6">Aadhar</label>
							<!--end::Label-->
							<!--begin::Col-->
							<div class="col-lg-3 fv-row fv-plugins-icon-container">
								<input type="text" name="aadhar" id="aadhar" class="form-control form-control-lg form-control-solid" placeholder="Aadhar No" required>
								<div class="fv-plugins-message-container invalid-feedback" name="aadhar_err" id="aadhar_err" ></div>
							</div>
							<!--end::Col-->
							<!--begin::Label-->
							<label class="col-lg-1 col-form-label  fw-semibold fs-6">ID Type</label>
							<!--end::Label-->
							<!--begin::Left Section-->
							<div class="col-lg-3">
								<!--begin::Select-->
								<select class="form-select form-select-solid" data-control="select2" data-placeholder="Select ID" data-hide-search="true" id="idtype" name="idtype">
									<option selected="">Select ID</option>
									<?php
										$idqry=$this->db->query("SELECT * FROM IDTYPE where status!=2");
										$idlist=$idqry->result_array();
										$i=1;
										foreach($idlist as $list1)
										{

									?>
										<option value="<?php echo $list1['IDTYPENAME']; ?>"> <?php echo $list1['IDTYPENAME'];?></option>
									<?php 
										$i++;
										}
									?>
								</select>
								<!--end::Select-->
							</div>
							<!--begin::Label-->
							<label class="col-lg-1 col-form-label fw-semibold fs-6">ID No</label>
							<!--end::Label-->
							<!--begin::Col-->
							<div class="col-lg-3 fv-row fv-plugins-icon-container">
								<input type="text" name="id_no" id="id_no" class="form-control form-control-lg form-control-solid" placeholder="ID Number">
								<div class="fv-plugins-message-container invalid-feedback" name="id_no_err" id="id_no_err" ></div>
							</div>
							<!--end::Col-->
							<!--begin::Label-->
							<label class="col-lg-1 col-form-label  fw-semibold fs-6">Work</label>
							<!--end::Label-->
							<!--begin::Left Section-->
							<div class="col-lg-3">
								<!--begin::Select-->
								<select class="form-select form-select-solid" data-control="select2" data-placeholder="Select Work" data-hide-search="true" id="worktype" name="worktype">
									<option selected="">Select Work</option>
									<?php
										$wqry=$this->db->query("SELECT * FROM WORKTYPE ");
										$worklist=$wqry->result_array();
										$w=1;
										foreach($worklist as $wlist)
										{

									?>
										<option value="<?php echo $wlist['WORKTYPENAME']; ?>"> <?php echo $wlist['WORKTYPENAME'];?></option>
									<?php 
										$w++;
										}
									?>
									<!-- <option value="2">Lawyer</option> -->
								</select>
								<!--end::Select-->
							</div>
							<!-- <div class="col-lg-3"></div> -->
							
							<div class="row">
							<label class="col-lg-2 col-form-label required fw-semibold fs-6">Customer Rating</label>
							<div class="btn-group w-100 w-lg-25" data-kt-buttons="true" data-kt-buttons-target="[data-kt-button]">
							    <label class="btn btn-outline-secondary text-muted text-hover-black text-active-black btn-outline btn-active-success" data-kt-button="true" style="border-color: #6c7072 !important;">
							        <input class="btn-check" type="radio" name="rating" id="rating" value="3"/>
							        Good
							    </label>
							    <label class="btn btn-outline-secondary text-muted text-hover-black text-active-black btn-outline btn-active-warning" data-kt-button="true" style="border-color: #6c7072 !important;">
							        <input class="btn-check" type="radio" name="rating" id="rating" checked="checked" value="2"/>
							        Average
							    </label>
							    <label class="btn btn-outline-secondary text-muted text-hover-black text-active-black btn-outline btn-active-danger" data-kt-button="true" style="border-color: #6c7072 !important;">
							        <input class="btn-check" type="radio" name="rating" id="rating" value="1" />
							        Bad
							    </label>
							</div>
						</div>
						</div>
						<div class="row mb-6">
							<!--begin::Label-->
							<label class="col-lg-1 col-form-label required fw-semibold fs-6">Party</label>
							<!--end::Label-->
							<!--begin::Col-->
							<div class="col-lg-3">
								<div class="image-input image-input-outline" data-kt-image-input="true" >
									<!--begin::Preview existing avatar-->
									<div class="image-input-wrapper w-125px h-125px" style="background-image: url(assets/media/svg/avatars/blank.svg)" id="my_camera" > </div>
									<!--begin::Label-->
														<label class="btn btn-icon btn-circle  btn-active-color-primary bg-body shadow w-40px h-25px" data-kt-image-input-action="change" data-bs-toggle="tooltip" data-kt-initialized="1">
															<i class="bi bi-pencil-fill fs-7 "></i>
															<!--begin::Inputs-->
															<input type="file" name="party_photo" id="party_photo" accept=".png, .jpg, .jpeg">
															<input type="hidden" name="add_party_remove_redemp">
															<!--end::Inputs-->
														</label>
														<!--end::Label-->
														<!--begin::Cancel-->
														<span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" data-kt-initialized="1">
															<i class="bi bi-x fs-2 "></i>
														</span>
														<!--end::Cancel-->
														<!--begin::Remove-->
														<span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" data-kt-initialized="1">
															<i class="bi bi-x fs-2 "></i>
														</span>
														<!--end::Remove-->
									<div id="results" class="image-input-wrapper w-125px h-125px" style="display: none;">Your captured image will appear here...</div>
									
									
								</div>
								
								<div class="btn btn-outline btn-outline-solid btn-outline-warning btn-active-light-primary me-10" id="take_party_photo" onclick="take_party()" > Take Photo </div>
								<div class="btn btn-outline btn-outline-solid btn-outline-warning btn-active-light-primary me-10" id="p_snap" onclick="party_snapshot()" style="display: none;"> Capture </div>
								<textarea hidden="hidden" id="party_photo_data" name="party_photo_data"></textarea>

								
							</div>
							<!--end::Col-->
							<label class="col-lg-1 col-form-label fw-semibold fs-6">Signature</label>
							<div class="col-lg-3">
								<!--begin::Image input-->
								<div class="image-input image-input-outline" data-kt-image-input="true" >
									<div class="image-input-wrapper w-125px h-125px" style="background-image: url(assets/media/svg/avatars/blank.svg)" id="my_camera_sign"> </div>
									<!--begin::Preview existing avatar-->
									<label class="btn btn-icon btn-circle  btn-active-color-primary bg-body shadow w-40px h-25px" data-kt-image-input-action="change" data-bs-toggle="tooltip" data-kt-initialized="1">
													<i class="bi bi-pencil-fill fs-7 "></i>
													<!--begin::Inputs-->
													<input type="file" name="sign_photo" id="sign_photo" accept=".png, .jpg, .jpeg">
													<input type="hidden" name="add_party_remove_redemp">
													<!--end::Inputs-->
												</label>
												<!--end::Label-->
												<!--begin::Cancel-->
												<span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" data-kt-initialized="1">
													<i class="bi bi-x fs-2 "></i>
												</span>
												<!--end::Cancel-->
												<!--begin::Remove-->
												<span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" data-kt-initialized="1">
													<i class="bi bi-x fs-2 "></i>
												</span>
												<!--end::Remove-->
							
									<div id="results_sign" class="image-input-wrapper w-125px h-125px" style="display: none;">Your captured image will appear here...</div>

								</div>
								<div class="btn btn-outline btn-outline-solid btn-outline-warning btn-active-light-primary me-10" id="take_sign_photo" onclick="take_sign()" > Take Signature </div>
								<div class="btn btn-outline btn-outline-solid btn-outline-warning btn-active-light-primary me-10" id="s_snap" onclick="sign_snapshot()" style="display: none;"> Capture </div>			
								<textarea hidden="hidden" id="sign_photo_data" name="sign_photo_data"></textarea>					
							</div>
							<!--begin::Label-->
							<label class="col-lg-1 col-form-label required fw-semibold fs-6">ID Photo</label>
							<!--end::Label-->
								<!--begin::Col-->
								<div class="col-lg-3">
									<!--begin::Image input-->
									<div class="image-input image-input-outline" data-kt-image-input="true" >
										<!--begin::Preview existing avatar-->
										<div class="image-input-wrapper w-125px h-125px" style="background-image: url(assets/media/svg/avatars/blank.svg)" id="my_camera_other"> </div>
										<!--begin::Preview existing avatar-->
									<label class="btn btn-icon btn-circle  btn-active-color-primary bg-body shadow w-40px h-25px" data-kt-image-input-action="change" data-bs-toggle="tooltip" data-kt-initialized="1">
															<i class="bi bi-pencil-fill fs-7 "></i>
															<!--begin::Inputs-->
															<input type="file" name="sign_photo" id="sign_photo" accept=".png, .jpg, .jpeg">
															<input type="hidden" name="add_party_remove_redemp">
															<!--end::Inputs-->
														</label>
														<!--end::Label-->
														<!--begin::Cancel-->
														<span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" data-kt-initialized="1">
															<i class="bi bi-x fs-2 "></i>
														</span>
														<!--end::Cancel-->
														<!--begin::Remove-->
														<span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" data-kt-initialized="1">
															<i class="bi bi-x fs-2 "></i>
														</span>
														<!--end::Remove-->
										<div id="results_other" class="image-input-wrapper w-125px h-125px" style="display: none;">Your captured image will appear here...</div>
										
									</div>
									<div class="btn btn-outline btn-outline-solid btn-outline-warning btn-active-light-primary me-10" id="take_other_photo" onclick="take_other()" > Take ID Photo </div>
										<div class="btn btn-outline btn-outline-solid btn-outline-warning btn-active-light-primary me-10" id="o_snap" onclick="other_snapshot()" style="display: none;"> Capture </div>
									<textarea hidden="hidden" id="other_photo_data" name="other_photo_data"></textarea>
								</div>
								<!--end::Col-->	
								
								<label class="col-form-label fw-bold fs-4"><u>Bank Details</u></label>
						 <div style="padding: 10px 10px 10px 10px !important;box-shadow: 0 3px 6px #00002947;border-radius: 5px;background-color: #f5f5f1;" >
							
							<!-- <div id="add_more_bank_det"> -->

							<div class="row" >
								<div class="col-lg-12">
									<div id="kt_docs_repeater_basic_add">
										<div class="form-group">
											<div id="mcontent10">
												<div class="row" id="mid0">
													<div class="col-lg-2 fv-row">
														<input type="text" class="form-control mb-2 mb-md-0" placeholder="Bank Name" name="add_bank_name[]" id="add_bank_name0">
													</div>
													
													<div class="col-lg-2 fv-row">
														<input type="text" class="form-control mb-2 mb-md-0" placeholder="Branch Name" name="add_branch_name[]" id="add_branch_name0">
													</div>
													<div class="col-lg-2 fv-row">
														<input type="text" class="form-control mb-2 mb-md-0" placeholder="A/c Holder Name" name="add_acc_name[]" id="add_acc_name0">
													</div>
													<div class="col-lg-2 fv-row">
														<input type="text" class="form-control mb-2 mb-md-0" placeholder="A/C Number" name="add_acc_no[]" id="add_acc_no0">
													</div>
													<div class="col-lg-2 fv-row">
														<input type="text" class="form-control mb-2 mb-md-0" placeholder="IFSC Code" name="add_ifsc_code[]" id="add_ifsc_code0">
													</div>
													<!-- <div class="col-lg-2 fv-row">
														<button type="button" class="btn btn-sm btn-danger mt-md-3" onclick="remove_bank(0);" >
														<i class="la la-trash-o fs-3"></i>Delete</button>
													</div> -->
												</div>
											</div>
										</div>
										<div class="col-lg-2 form-group fv-row">
											<a href="javascript:;" onclick="add_bank()" class="btn btn-sm  btn-success me-2">
											+ </a>
										</div>
									</div>
									<input type="hidden" id="acc_led_id" value="1">
								</div>			
								
							</div>
						</div>

						</div>
						<!-- </div>  -->
						

						<!--begin::Actions-->
						<div class="row" style="margin-top: -3rem !important;">
							<div class="col-lg-9"></div>
							<div class="col-lg-1">
								<div class="d-flex flex-center flex-row-fluid pt-12">
									<button type="reset" class="btn btn-secondary me-3" data-bs-dismiss="modal">Cancel</button>
								</div>
							</div>
							<div class="col-lg-2">
								<div class="d-flex flex-center flex-row-fluid pt-12">
									<button type="submit" class="btn btn-primary" >Save Changes</button>
								</div>
							</div>
						</div>
						<!--end::Actions-->
					</div>
					<!--end::Modal body-->
				</div>
				<!--end::Modal content-->
			</div>
			<!--end::Modal dialog-->
		</form>
		</div>
		<!--end::Modal - add party-->
		<!--begin::Modal - edit party-->
		<div class="modal fade" id="kt_modal_edit_party" tabindex="-1" aria-hidden="true">
			
		</div>
		<!--end::Modal - edit party-->
		<!--begin::Modal - view party-->
		<div class="modal fade" id="kt_modal_view_party" tabindex="-1" aria-hidden="true">
			
		</div>
		<!--end::Modal - view party-->
		<!--begin::Modal - view party-->
		<div class="modal fade" id="kt_modal_view_party_history" tabindex="-1" aria-hidden="true">
			
		</div>
		<!--end::Modal - view party-->
		<!--begin::Modal - delete party-->
		<div class="modal fade" id="kt_modal_delete_party" tabindex="-1" aria-hidden="true">
			
		</div>
		<!--end::Modal - delete party-->

		<?php $this->load->view("script");?>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
		<input type="hidden" id="baseurl" value="<?php echo base_url();?>">
		
<script type="text/javascript">
	$( document ).ready(function() {
	
		document.getElementById("pop_up_success").click();
	});
</script>
 <script>
			function reset_fill(){

				$('#partyname').val('');
				$('#fathername').val('');
				// $('#areafill').val('');
				// $('#cityfill').val('');
				$('#phonefill').val('');
				$('#fill_form').submit();
			}

		</script>
		<script>

			$(document).ready(function() {
				
				$(".move_to").on("click", function () {
					value=$(this).val();
					// alert(value);
					$('#filter_form').attr('action', "<?php echo base_url(); ?>Party?page="+value);
					$("#filter_form").submit();
					e.preventDefault();
				});
			});
		</script>
		
		<script>
			// $('#more_bank').click(function(){
				// alert("gy")
				// var count=$('#bank_count').val();
				// alert(count);
				// var cont = $("#add_more_bank_det");
				// alert('success');
				// alert('<div class="row" id="add_details'+count+'"><div class="col-lg-2 fv-row"><input type="text" class="form-control mb-2 mb-md-0" placeholder="Bank Name" name="add_bank_name[]" id="add_bank_name'+count+'"></div><div class="col-lg-2 fv-row"><input type="text" class="form-control mb-2 mb-md-0" placeholder="Branch Name" name="add_branch_name[]" id="add_branch_name'+count+'"></div><div class="col-lg-2 fv-row"><input type="text" class="form-control mb-2 mb-md-0" placeholder="A/c Holder Name" name="add_acc_name[]" id="add_acc_name'+count+'"></div><div class="col-lg-2 fv-row"><input type="text" class="form-control mb-2 mb-md-0" placeholder="A/C Number" name="add_acc_no[]" id="add_acc_no'+count+'"></div><div class="col-lg-2 fv-row"><input type="text" class="form-control mb-2 mb-md-0" placeholder="IFSC Code" name="add_ifsc_code[]" id="add_ifsc_code'+count+'"></div><div class="col-lg-2 fv-row"><button type="button" class="btn btn-sm btn-danger mt-md-3" onclick="remove_bank('+count+')" ><i class="la la-trash-o fs-3"></i>Delete</button></div></div>');
				// cont.append('<div class="row" id="add_details'+count+'"><div class="col-lg-2 fv-row"><input type="text" class="form-control mb-2 mb-md-0" placeholder="Bank Name" name="add_bank_name[]" id="add_bank_name'+count+'"></div><div class="col-lg-2 fv-row"><input type="text" class="form-control mb-2 mb-md-0" placeholder="Branch Name" name="add_branch_name[]" id="add_branch_name'+count+'"></div><div class="col-lg-2 fv-row"><input type="text" class="form-control mb-2 mb-md-0" placeholder="A/c Holder Name" name="add_acc_name[]" id="add_acc_name'+count+'"></div><div class="col-lg-2 fv-row"><input type="text" class="form-control mb-2 mb-md-0" placeholder="A/C Number" name="add_acc_no[]" id="add_acc_no'+count+'"></div><div class="col-lg-2 fv-row"><input type="text" class="form-control mb-2 mb-md-0" placeholder="IFSC Code" name="add_ifsc_code[]" id="add_ifsc_code'+count+'"></div><div class="col-lg-2 fv-row"><button type="button" class="btn btn-sm btn-danger mt-md-3" onclick="remove_bank('+count+')" ><i class="la la-trash-o fs-3"></i>Delete</button></div></div>');

			// });
			// $("#kt_datatable_both_scrolls").DataTable({
			//     "scrollY": 180,
			//     "scrollX": true
			//     // "ordering":false
			// });

			//  $("#kt_datatable_view_particular_party_loan_summary_history_both_scrolls").DataTable({
			//     "scrollY": 150,
			//     "scrollX": true
			//     // "ordering":false
			// });
		</script>

<script type="text/javascript">
	function add_bank()
{
    var count=$('#acc_led_id').val();
    var cont = $("#mcontent10");
    
    cont.append('<div class="row" id="mid'+count+'"><div class="col-lg-2 fv-row"><input type="text" class="form-control mb-2 mb-md-0" placeholder="Bank Name" name="add_bank_name[]" id="add_bank_name'+count+'"></div><div class="col-lg-2 fv-row"><input type="text" class="form-control mb-2 mb-md-0" placeholder="Branch Name" name="add_branch_name[]" id="add_branch_name'+count+'"></div><div class="col-lg-2 fv-row"><input type="text" class="form-control mb-2 mb-md-0" placeholder="A/c Holder Name" name="add_acc_name[]" id="add_acc_name'+count+'"></div><div class="col-lg-2 fv-row">	<input type="text" class="form-control mb-2 mb-md-0" placeholder="A/C Number" name="add_acc_no[]" id="add_acc_no'+count+'">		</div><div class="col-lg-2 fv-row">	<input type="text" class="form-control mb-2 mb-md-0" placeholder="IFSC Code" name="add_ifsc_code[]" id="add_ifsc_code'+count+'"></div> <div class="col-lg-2 fv-row"><button type="button" class="btn btn-sm btn-danger mt-md-3" onclick="delete_bank('+count+');" >	<i class="la la-trash-o fs-3"></i>Delete</button></div>	</div>');

    count=Number(count)+1;
    $('#acc_led_id').val(count);

}

function delete_bank(i)
{
	$('#mid'+i).remove();
}
</script>

		
		<script>
			$('#kt_datatable_dom_positioning').DataTable( {
	"aaSorting": [],
        dom: 'Bfrtip',
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5'
        ]
    } );
	
	var title = $('title').text() + ' | ' + 'Party';
    $(document).attr("title", title);

		</script>
<script >
function get_area()
{
	var zid = $('#zone').val()
	var baseurl= $("#baseurl").val();
	 // alert(zone);
	$.ajax({
	type: "POST",
	url: baseurl+'party/get_area',
	async: false,
	type: "POST",
	data: "zoneid="+zid,
	dataType: "html",
	success: function(response)
	{
		$('#area').empty().append(response);
	//$("#kt_modal_delete_village").css("display", "block");
	}
	});
}
function get_city(){
	var aid = $('#area').val()
	var baseurl= $("#baseurl").val();
	 // alert(aid);
	$.ajax({
	type: "POST",
	url: baseurl+'party/get_city',
	async: false,
	type: "POST",
	data: "areaid="+aid,
	dataType: "html",
	success: function(response)
	{
	$('#city').empty().append(response);
	//$("#kt_modal_delete_village").css("display", "block");
	}
	});
}
function get_village(){
	var cid = $('#city').val()
	var baseurl= $("#baseurl").val();
	 // alert(aid);
	$.ajax({
	type: "POST",
	url: baseurl+'party/get_village',
	async: false,
	type: "POST",
	data: "cityid="+cid,
	dataType: "html",
	success: function(response)
	{
	$('#village').empty().append(response);
	//$("#kt_modal_delete_village").css("display", "block");
	}
	});
}
function get_street(){
	var vid = $('#village').val()
	var baseurl= $("#baseurl").val();
	 // alert(aid);
	$.ajax({
	type: "POST",
	url: baseurl+'party/get_street',
	async: false,
	type: "POST",
	data: "villageid="+vid,
	dataType: "html",
	success: function(response)
	{
	$('#street').empty().append(response);
	//$("#kt_modal_delete_village").css("display", "block");
	}
	});
}
function party_validation()
{
	var err = 0;
	var party_name = $('#party_name').val();
	var lname = $('#lname').val();
	var zone = $('#zone').val();
	var area = $('#area').val();
	var city = $('#city').val();
	var village = $('#village').val();
	var mobile = $('#mobile').val();
	// var aadhar = $('#aadhar').val();
	var rating = $('#rating').val();
    if(party_name.trim()=='')
    {
        $('#party_err').html('Enter Party Name!');
        err++;
    }
    else
    {
       
		$('#party_err').html('');
		
    }
    if(lname.trim()=='')
    {
        $('#lname_err').html('Enter Father name!');
        err++;
    }
    else
    {
		$('#lname_err').html('');
    }
    if(zone.trim()=='')
    {
        $('#zone_err').html('Please Select Zone!');
        err++;
    }
    else
    {
		$('#zone_err').html('');
    }
    if(area.trim()=='')
    {
        $('#area_err').html('Please Select Area!');
        err++;
    }
    else
    {
		$('#area_err').html('');
    }
    if(city.trim()=='')
    {
        $('#city_err').html('Please Select City!');
        err++;
    }
    else
    {
		$('#city_err').html('');
    }
    if(village.trim()=='')
    {
        $('#village_err').html('Please Select Village!');
        err++;
    }
    else
    {
		$('#village_err').html('');
    }
    if(mobile.trim()=='')
    {
        $('#mobile_err').html('Enter Mobile Number!');
        err++;
    }
    else
    {
		$('#mobile_err').html('');
    }
  //   if(aadhar.trim()=='')
  //   {
  //       $('#aadhar_err').html('Enter Aadhar Number!');
  //       err++;
  //   }
  //   else
  //   {
		// $('#aadhar_err').html('');
  //   }
    if(rating.trim()=='')
    {
        $('#rating_err').html('Please Select Customer Rating!');
        err++;
    }
    else
    {
		$('#rating_err').html('');
    }
    if(err>0){ return false; }else{ return true; }
}		

function party_view(val)
{
	var baseurl= $("#baseurl").val();
	// alert(baseurl);
	$.ajax({
	type: "POST",
	url: baseurl+'party/party_view',
	async: false,
	type: "POST",
	data: "id="+val,
	dataType: "html",
	success: function(response)
	{
	// $('#kt_modal_view_party').empty().append(response);
	// $('#kt_modal_view_party').addClass('show');
	//$("#kt_modal_editdept").css("display", "block");
	}
});
}
function party_history_view(val)
{
	var baseurl= $("#baseurl").val();
	// alert(baseurl);
	$.ajax({
	type: "POST",
	url: baseurl+'party/party_history_view',
	async: false,
	type: "POST",
	data: "id="+val,
	dataType: "html",
	success: function(response)
	{
	$('#kt_modal_view_party_history').empty().append(response);
	$('#kt_modal_view_party_history').addClass('show');
	//$("#kt_modal_editdept").css("display", "block");
	}
});
}
function closeViewModal()
{
	var baseurl= $("#baseurl").val();
	$('#kt_modal_view_party').removeClass('show');
	//$("#kt_modal_update_role").css("display", "none");
	$('.modal-backdrop').removeClass('show');
	window.location.href = baseurl+'party';
}
function closeHistoryViewModal()
{
	var baseurl= $("#baseurl").val();
	$('#kt_modal_view_party_history').removeClass('show');
	//$("#kt_modal_update_role").css("display", "none");
	$('.modal-backdrop').removeClass('show');
	window.location.href = baseurl+'party';
}
function party_delete(val)
{
	var baseurl= $("#baseurl").val();
	//alert(val);
	$.ajax({
	type: "POST",
	url: baseurl+'party/party_delete',
	async: false,
	type: "POST",
	data: "id="+val,
	dataType: "html",
	success: function(response)
	{
	$('#kt_modal_delete_party').empty().append(response);
	$('#kt_modal_delete_party').addClass('show');
	//$("#kt_modal_delete_role").css("display", "block");
	}
	});
}

function removeParty(val)
{ 
	var baseurl= $("#baseurl").val();
	$.ajax({
	type: "POST",
	url: baseurl+'party/delete',
	async: false,
	data:"field="+val,
	success: function(response)
	{
	window.location.href = baseurl+'party';
	}
	});
}
function closeDeleteModal()
{
		var baseurl= $("#baseurl").val();
		$('#kt_modal_delete_party').removeClass('show');
		$('.modal-backdrop').removeClass('show');
		window.location.href = baseurl+'party';
}
function party_edit(val)
{
	var baseurl= $("#baseurl").val();
	// alert(baseurl);
	$.ajax({
	type: "POST",
	url: baseurl+'party/party_edit',
	async: false,
	type: "POST",
	data: "id="+val,
	dataType: "html",
	success: function(response)
	{
	$('#kt_modal_edit_party').empty().append(response);
	$('#kt_modal_edit_party').addClass('show');
	//$("#kt_modal_editdept").css("display", "block");
	}
});
}
function closeEditModal()
{
	var baseurl= $("#baseurl").val();
	$('#kt_modal_edit_party').removeClass('show');
	//$("#kt_modal_update_role").css("display", "none");
	$('.modal-backdrop').removeClass('show');
	window.location.href = baseurl+'party';
}

function party_edit_validation()
{
	var erre = 0;
	var party_name = $('#party_name_edit').val();
	var lname = $('#lname_edit').val();
	var zone = $('#zone_edit').val();
	var area = $('#area_edit').val();
	var city = $('#city_edit').val();
	var village = $('#village_edit').val();
	var mobile = $('#mobile_edit').val();
	// var aadhar = $('#aadhar').val();
	var rating = $('#rating_edit').val();
    if(party_name.trim()=='')
    {
        $('#party_edit_err').html('Enter Party Name!');
        erre++;
    }
    else
    {
       
		$('#party_edit_err').html('');
		
    }
    if(lname.trim()=='')
    {
        $('#lname_edit_err').html('Enter Father name!');
        erre++;
    }
    else
    {
		$('#lname_edit_err').html('');
    }
    if(zone.trim()=='')
    {
        $('#zone_edit_err').html('Please Select Zone!');
        erre++;
    }
    else
    {
		$('#zone_edit_err').html('');
    }
    if(area.trim()=='')
    {
        $('#area_edit_err').html('Please Select Area!');
        erre++;
    }
    else
    {
		$('#area_edit_err').html('');
    }
    if(city.trim()=='')
    {
        $('#city_edit_err').html('Please Select City!');
        erre++;
    }
    else
    {
		$('#city_edit_err').html('');
    }
    if(village.trim()=='')
    {
        $('#village_edit_err').html('Please Select Village!');
        erre++;
    }
    else
    {
		$('#village_edit_err').html('');
    }
    if(mobile.trim()=='')
    {
        $('#mobile_edit_err').html('Enter Mobile Number!');
        erre++;
    }
    else
    {
		$('#mobile_edit_err').html('');
    }
  //   if(aadhar.trim()=='')
  //   {
  //       $('#aadhar_err').html('Enter Aadhar Number!');
  //       err++;
  //   }
  //   else
  //   {
		// $('#aadhar_err').html('');
  //   }
    if(rating.trim()=='')
    {
        $('#rating_edit_err').html('Please Select Customer Rating!');
        erre++;
    }
    else
    {
		$('#rating_edit_err').html('');
    }
    if(erre>0){ return false; }else{ return true; }
}	

function get_area_edit(){
	var zid = $('#zone_edit').val()
var baseurl= $("#baseurl").val();
 // alert(zone);
$.ajax({
type: "POST",
url: baseurl+'party/get_area_edit',
async: false,
type: "POST",
data: "zoneid="+zid,
dataType: "html",
success: function(response)
{
$('#area_edit').empty().append(response);
//$("#kt_modal_delete_village").css("display", "block");
}
});
}


</script>
<script type="text/javascript">
    function EnableDisableTextBox() {
        var wa = document.getElementById("whatsapp");
        var chk_val=document.getElementById("w_chk");
        var chk_val1=document.getElementById("w_chk").checked;
        // alert(chk_val1);
        if (chk_val1==false) {
        	// wa.style="display: block";
        	document.getElementById("w_lbl").style="display:block;"
        	document.getElementById("w_no").style="display:block;"
        	document.getElementById("w_div").style="display:block;"
        	document.getElementById("w_msg_div").style="display:block;"
            //txtPassportNumber.focus();
        }
        else
        {
        	// wa.style="display: none";
        	document.getElementById("w_lbl").style="display:none;"
        	document.getElementById("w_no").style="display:none;"
        	document.getElementById("w_div").style="display:none;"
        	document.getElementById("w_msg_div").style="display:none;"
        }

    }
    function EEnableDisableTextBox() {
        // var wa = document.getElementById("whatsapp_edit");
        var chk_val=document.getElementById("w_chk_edit");
        var chk_val1=document.getElementById("w_chk_edit").checked;
        // alert(chk_val1);
        if (chk_val1==false) {
        	// wa.style="display: block";
        	document.getElementById("w_lbl_edit").style="display:block;"
        	document.getElementById("w_no_edit").style="display:block;"
        	document.getElementById("w_div_edit").style="display:block;"
        	document.getElementById("w_msg_div_edit").style="display:block;"
            //txtPassportNumber.focus();
        }
        else
        {
        	// wa.style="display: none";
        	document.getElementById("w_lbl_edit").style="display:none;"
        	document.getElementById("w_no_edit").style="display:none;"
        	document.getElementById("w_div_edit").style="display:none;"
        	document.getElementById("w_msg_div_edit").style="display:none;"
        }

    }
</script>

<!-- Configure a few settings and attach camera -->
		<script language="JavaScript">
		    

		    function take_party()
		    {
		    	Webcam.set({
		        width: 125,
		        height: 125,
		        image_format: 'jpeg',
		        jpeg_quality: 90
		    	});
		  		Webcam.attach('#my_camera');
		  		document.getElementById('take_party_photo').style.display="none";
		  		document.getElementById('p_snap').style.display="block";
		  		document.getElementById('my_camera').style.display="block";
		        document.getElementById('results').style.display="none";
		    }
		  
		    function party_snapshot() {
		    	// alert("hi");
		        Webcam.snap( function(data_uri) {
		            // $(".image-tag").val(data_uri);
		            document.getElementById('results').innerHTML = '<img src="'+data_uri+'" id="party_photo" name="party_photo" />';
		            document.getElementById('party_photo_data').innerHTML =data_uri;
		            document.getElementById('my_camera').style.display="none";
		            document.getElementById('results').style.display="block";
		            document.getElementById('take_party_photo').style.display="block";
		            document.getElementById('p_snap').style.display="none";
		            Webcam.reset('#my_camera');

		        } );
		    }
		    
		</script>

		<script language="JavaScript">
		    
		  
		  function take_other()
		    {
		    	Webcam.set({
		        width: 125,
		        height: 125,
		        image_format: 'jpeg',
		        jpeg_quality: 90
		    	});
		  		Webcam.attach('#my_camera_other');
		  		document.getElementById('take_other_photo').style.display="none";
		  		document.getElementById('o_snap').style.display="block";
		  		document.getElementById('my_camera_other').style.display="block";
		        document.getElementById('results_other').style.display="none";
		    }
		    function other_snapshot() {
		    	// alert("hi");
		        Webcam.snap( function(data_uri) {
		            // $(".image-tag").val(data_uri);
		            document.getElementById('results_other').innerHTML = '<img src="'+data_uri+'" id="party_photo" name="party_photo" />';
		            document.getElementById('other_photo_data').innerHTML =data_uri;
		            document.getElementById('my_camera_other').style.display="none";
		            document.getElementById('results_other').style.display="block";
		            document.getElementById('take_other_photo').style.display="block";
		            document.getElementById('o_snap').style.display="none";
		            Webcam.reset('#my_camera_other');

		        } );
		    }
		    
		</script>
		<script language="JavaScript">
		    
		  
		    function take_sign()
		    {
		    	Webcam.set({
		        width: 125,
		        height: 125,
		        image_format: 'jpeg',
		        jpeg_quality: 90
		    });
		  		Webcam.attach('#my_camera_sign');
		  		document.getElementById('take_sign_photo').style.display="none";
		  		document.getElementById('s_snap').style.display="block";
		  		document.getElementById('my_camera_sign').style.display="block";
		        document.getElementById('results_sign').style.display="none";
		    }
		    function sign_snapshot() {
		    	// alert("hi");
		        Webcam.snap( function(data_uri) {
		            // $(".image-tag").val(data_uri);
		            document.getElementById('results_sign').innerHTML = '<img src="'+data_uri+'" id="party_photo" name="party_photo" />';
		            document.getElementById('sign_photo_data').innerHTML =data_uri;
		            document.getElementById('my_camera_sign').style.display="none";
		            document.getElementById('results_sign').style.display="block";
		            document.getElementById('take_sign_photo').style.display="block";
		            document.getElementById('s_snap').style.display="none";
		            Webcam.reset('#my_camera_sign');

		        } );
		    }
		</script>

	</body>
	<!--end::Body-->
</html>