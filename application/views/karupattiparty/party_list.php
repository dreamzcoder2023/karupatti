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
									<h1 class="d-flex align-items-center text-dark fw-bold my-1 fs-3">Karupatti Party List
									<!--begin::Separator-->
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
									<span class="h-20px border-gray-400 border-start ms-3 mx-2"></span>
										<label class="d-flex align-items-center text-primary fw-bold my-1 fs-5">
											<span>Area &emsp;-</span>
											<span>&emsp;<?php echo $areafill ? $areafill :' All' ?></span>
										</label>
									<span class="h-20px border-gray-400 border-start ms-3 mx-2"></span>
										<label class="d-flex align-items-center text-primary fw-bold my-1 fs-5">
											<span>City &emsp;-</span>
											<span>&emsp;<?php echo $cityfill ? $cityfill :' All' ?></span>
										</label>
									<span class="h-20px border-gray-400 border-start ms-3 mx-2"></span>
										<label class="d-flex align-items-center text-primary fw-bold my-1 fs-5">
											<span>Phone &emsp;-</span>
											<span>&emsp;<?php echo $phonefill ? $phonefill :' All' ?></span>
										</label>

									
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
																				<button type="submit" class="btn btn-primary me-3" data-bs-dismiss="modal" class="scrolltop" data-kt-scrolltop="true">Ok</button>
																				
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
																				<button type="submit" class="btn btn-primary me-3"class="scrolltop" data-kt-scrolltop="true">Ok</button>
																				
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
											<!--begin::Add user-->

											<!--begin::Filter-->
											<button type="button"
												class="btn btn-sm btn-outline btn-outline-solid btn-outline-warning btn-active-light-primary me-3" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Filter
											</button>
											<div class="menu menu-sub menu-sub-dropdown w-300px w-md-325px" data-kt-menu="true">
												<div class="px-7 py-5" data-kt-user-table-filter="form">
													<form method="POST" action="<?php echo base_url(); ?>Karuppattiparty" id="fill_form">
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
															<div class="mb-2">
																<label class="form-label fs-6 fw-semibold">Area</label>
																<div class="fv-row fv-plugins-icon-container">
																	<input type="text" name="areafill" id="areafill" class="form-control form-control-lg1 form-control-solid" placeholder="Area" value="<?php echo $areafill; ?>">
																  <div class="fv-plugins-message-container invalid-feedback"></div>
																</div>
															</div>
															<div class="mb-2">
																<label class="form-label fs-6 fw-semibold">City</label>
																<div class="fv-row fv-plugins-icon-container">
																	<input type="text" name="cityfill" id="cityfill" class="form-control form-control-lg1 form-control-solid" placeholder="City" value="<?php echo $cityfill; ?>">
																  <div class="fv-plugins-message-container invalid-feedback"></div>
																</div>
															</div>
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

											<a class="menu-link" href="javascript:;" data-bs-toggle="modal" data-bs-target="#kt_modal_add_party" onclick="karupattiparty_add();">
											<!--begin::Svg Icon | path: icons/duotune/arrows/arr075.svg-->
											<button type="button" class="btn btn-primary">
											<span class="svg-icon svg-icon-2">
												<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
													<rect opacity="0.5" x="11.364" y="20.364" width="16" height="2" rx="1" transform="rotate(-90 11.364 20.364)" fill="currentColor" />
													<rect x="4.36396" y="11.364" width="16" height="2" rx="1" fill="currentColor" />
												</svg>
											</span>
											<!--end::Svg Icon-->New Karupatti Party</button></a>
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
									<table id="karupatipartytable" class="table align-middle table-row-dashed table-striped table-hover fs-7 gy-1 gs-2 dataTable no-footer">
									
										<!--begin::Table head-->
										<thead>
											<!--begin::Table row-->
											<tr class="text-start text-muted fw-bold fs-7 gs-0">
												<th class="w-100px">Party Details</th>
												<th class="min-w-250px">Address</th>
												<th class="min-w-50px">Pincode</th>
												<th class="min-w-50px">Phone</th>
												<th class="min-w-50px">City</th>
												<!-- <th class="min-w-25px">Rating</th> -->
												<th class="min-w-25px text-center" >Actions</th>
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
												<!-- <td class="d-flex align-items-center ">
													<div class="symbol symbol-circle symbol-50px overflow-hidden ">
													
													</div>
													<div class="d-flex flex-column">
														<A  class="text-gray-800 text-hover-primary">< ?php  echo ucwords(strtolower($plist['NAME'])); ?></span>
														<span>< ?php echo $plist['PID']; ?></A>														
													</div>
												</td> -->

												<td>
		                        <!-- <div > -->
		                            <!-- <div class="d-flex align-items-center"> -->
		                                <!-- <div class="symbol symbol-35px me-1">
		                                   < ?php
																					if($plist['PARTY_IMAGE'] != "")
																					{ ?>
																						<img src="< ?php echo $plist['PARTY_IMAGE']; ?>" height="125px" width="125px" >
																					< ?php } 
																					else { ?>
																						
																					< ?php 
																						if($plist['PHOTO']!="")
																						{
																							if($plist['TYPE_OF_RECORD']=='N')
																							{?>
																							<img src="< ?php echo $plist['PHOTO']; ?>" height="125px" width="125px" >
																							< ?php 
																							}
																							else
																							{
																					?>
																						<img src="data:image/jpeg;base64,< ?php echo base64_encode($plist['PHOTO']); ?>"  >
																					< ?php 
																						}
																						}
																						else
																						{?>
																							<img src="< ?php echo base_url();?>assets/images/party.jpg"  >
																						< ?php }}
																					?>
		                                </div> -->
		                            <!-- </div> -->
		                            <!-- <div class="d-flex flex-column"> -->
		                                <span><?php  echo $plist['NAME']?$plist['NAME']:''; ?></span><br/>
																		<span class="badge badge-sm badge-primary badge-square fs-7"><?php echo $plist['PID']; ?></span>		
		                            <!-- </div> -->
		                        <!-- </div> -->
		                    </td>
												<!--end::User=-->
												<td class="ple1">
													<!-- < ?php  
														if($plist['TYPE_OF_RECORD']=='O'){
		                    			$CITY=  ($plist['CITY']=='')?'--':$plist['CITY'];
							                }
							                else
							                {
							                    $city_det=$this->db->query("SELECT * FROM CITY WHERE CITYID='".$plist['CITY_ID']."'")->row();
							                    $CITY=  $city_det?$city_det->CITYNAME:'--';
							                }
							                if($plist['TYPE_OF_RECORD']=='O'){
							                     $ADDRESS2=($plist['ADDRESS2']=='')?'--':$plist['ADDRESS2'];
							                }
							                else
							                {
							                    $vil_det =$this->db->query("SELECT * FROM VILLAGE WHERE VILLAGEID='".$plist['VILLAGE_ID']."'")->row();
							                    $ADDRESS2 = $vil_det?$vil_det->VILLAGENAME:'--';
							                }

							                if($plist['TYPE_OF_RECORD']=='O'){
							                     $ADDRESS1 = ($plist['ADDRESS1']=='')?'--':$plist['ADDRESS1'];
							                }
							                else
							                {
							                    $street_det=$this->db->query("SELECT * FROM STREET WHERE STREETID='".$plist['STREET_ID']."'")->row();
							                    $ADDRESS1 =  $street_det?$street_det->STREETNAME:'--';
							                }
							             
							                $pin     = $plist['PINCODE'] ?'-'.$plist['PINCODE'] :'';
							                $address = $ADDRESS1.', '.$ADDRESS2.' ,'.$CITY.$pin;												
															echo ucwords(strtolower($address));
														?> -->
														<?php
																	$address = '';
																	$parts = [];

																	if (!empty($plist['ADDRESS1'])) {
																	    $parts[] = $plist['ADDRESS1'];
																	}

																	if (!empty($plist['CITY'])) {
																	    $parts[] = $plist['CITY'];
																	}

																	if (!empty($plist['STATE'])) {
																	    $parts[] = $plist['STATE'];
																	}

																	if (!empty($plist['COUNTRY'])) {
																	    $parts[] = $plist['COUNTRY'];
																	}

																	$address = implode(', ', $parts);

																	echo $address.'.';
														?>
												</td>
											
												<td><?php  echo $plist['PINCODE']?$plist['PINCODE']:'-'; ?></td>
												<td><?php  echo $plist['PHONE']?$plist['PHONE']:'-'; ?></td>
												<td><?php  echo $plist['CITY']?$plist['CITY']:'-'; ?></td>
												<!--end::Two step=-->
												 <!-- <td>< ?php 
												if($plist['RATING']==3)
												{
													echo '<span><i class="fa-solid fa-star fs-3" style="color:#50cd89;"></i> Good</span>';
												}
												else if($plist['RATING']==2)
												{
													echo '<span><i class="fa-solid fa-star fs-3" style="color:#ffc700;"></i> Average</span>';
												}
												else if($plist['RATING']==1)
												{
													echo '<span><i class="fa-solid fa-star fs-3" style="color:red;"></i> Bad</span>';
												}
												else
												{
													echo '<span><i class="fa-solid fa-star fs-3" style="color:#d2d4dc;"></i> Nil</span>';
												}
												?></td> -->
												<!--begin::Joined-->
												<td align="right">
													<span class="text-end">
														<a href="<?php echo base_url();?>Karuppattiparty/party_view/<?php echo $plist['PID']; ?>" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm" target="_blank">
															<i class="bi bi-eye-fill eyc"></i>
														</a>
														 <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#kt_modal_edit_party" onclick="karupattiparty_edit('<?php echo $plist['PID']; ?>');" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1" target="_blank">

															<span class="svg-icon svg-icon-3">
																<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																	<path opacity="0.3" d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z" fill="currentColor"></path>
																	<path d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z" fill="currentColor"></path>
																</svg>
															</span>
														</a> 
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
																<input type="hidden" id="areafill" name="areafill"  value="<?php echo $areafill; ?>">
																<input type="hidden" id="cityfill" name="cityfill"  value="<?php echo $cityfill; ?>">
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

		<!--begin::Modal - delete party-->
		<div class="modal fade" id="kt_modal_delete_party" tabindex="-1" aria-hidden="true">
			
		</div>
		<!--end::Modal - delete party-->
		<div class="modal fade" id="kt_modal_edit_party" tabindex="-1" aria-hidden="true">

		</div>
	
		<input type="hidden" id="baseurl" value="<?php echo base_url();?>">
		<?php $this->load->view("script");?>
		<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script> -->
		
		
		<script>	
			<?php if($this->session->flashdata('g_success') || $this->session->flashdata('g_err')){?> 
			    $(document).ready( function() {
		        document.getElementById("pop_up_success").click()
		        });
		    <?php } ?>
    </script>

    
		<script type="text/javascript">

					function karupattiparty_edit(val) {

						
						var baseurl= $("#baseurl").val();
							// alert(val);
							$.ajax({
							type: "POST",
							url: baseurl+'Karuppattiparty/karpatti_party_edit',
							data:"id="+val,
							async: false,
							type: "POST",							
							success: function(response)
							{
								$('#kt_modal_edit_party').empty().append(response);
								$('#kt_modal_edit_party').addClass('show');
							}
							});


					}



				</script>


    <script>
			function reset_fill(){

				$('#partyname').val('');
				$('#fathername').val('');
				$('#areafill').val('');
				$('#cityfill').val('');
				$('#phonefill').val('');
				$('#fill_form').submit();
			}

		</script>
		<script>

			$(document).ready(function() {
				
				$(".move_to").on("click", function () {
					value=$(this).val();
					// alert(value);
					$('#filter_form').attr('action', "<?php echo base_url(); ?>Karuppattiparty?page="+value);
					$("#filter_form").submit();
					e.preventDefault();
				});
			});
		</script>
		
		<script>
			 $("#karupatipartytable").kendoTooltip({
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
	      $("#karupatipartytable").DataTable({
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
	
	var title = $('title').text() + ' | ' + 'Karuppattiparty';
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
	url: baseurl+'Karuppattiparty/get_area',
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
	url: baseurl+'Karuppattiparty/get_city',
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
	url: baseurl+'Karuppattiparty/get_village',
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
	url: baseurl+'Karuppattiparty/get_street',
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
	url: baseurl+'Karuppattiparty/party_view',
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
	url: baseurl+'Karuppattiparty/party_history_view',
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
	window.location.href = baseurl+'Karuppattiparty';
}
function closeHistoryViewModal()
{
	var baseurl= $("#baseurl").val();
	$('#kt_modal_view_party_history').removeClass('show');
	//$("#kt_modal_update_role").css("display", "none");
	$('.modal-backdrop').removeClass('show');
	window.location.href = baseurl+'Karuppattiparty';
}
function party_delete(val)
{
	var baseurl= $("#baseurl").val();
	//alert(val);
	$.ajax({
	type: "POST",
	url: baseurl+'Karuppattiparty/party_delete',
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
	url: baseurl+'Karuppattiparty/delete',
	async: false,
	data:"field="+val,
	success: function(response)
	{
	window.location.href = baseurl+'Karuppattiparty';
	}
	});
}
function closeDeleteModal()
{
		var baseurl= $("#baseurl").val();
		$('#kt_modal_delete_party').removeClass('show');
		$('.modal-backdrop').removeClass('show');
		window.location.href = baseurl+'Karuppattiparty';
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
url: baseurl+'Karuppattiparty/get_area_edit',
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