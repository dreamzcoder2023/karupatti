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
									<h1 class="d-flex align-items-center text-dark fw-bold my-1 fs-3">Remainder
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
										<div class="alert alert-success alert-dismissible" style="display:none;" id="active_item_master" role="alert">
					                        Remainder has been activated successfully
					                    </div>
					                    <div class="alert alert-success alert-dismissible" style="display:none;" id="deactive_item_master" role="alert">
					                        Remainder has been deactivated successfully
					                    </div>
										<!--begin::Card body-->
										<div class="card-body py-4">
											<div class="d-flex justify-content-end align-items-center">
												<button type="submit" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_new_remainder">New Remainder</button>
											</div>
											<table class="table align-middle table-row-dashed table-striped table-hover fs-7 gy-1 gs-2" id="kt_datatable_loan_od">
												<!--begin::Table head-->
												<thead>
													<tr class="text-start text-muted fw-bold fs-7 gs-0">
														<th class="min-w-80px">Date</th>
														<th class="min-w-80px">Type</th>
														<th class="min-w-80px">Allocated To</th>
														<th class="min-w-80px">Recurring Type</th>
														<th class="min-w-80px">Recurring</th>
														<th class="min-w-150px">Description</th>
														<th class="min-w-50px">Status</th>
														<th class="min-w-80px"><span class="text-end">Actions</span></th>
													</tr>
												</thead>
												<!--end::Table head-->
												<!--begin::Table body-->
												<tbody class="text-gray-600 fw-semibold">
													<?php if(isset($remainder_list)){ foreach ($remainder_list as $i => $iclist) {

														$yes = 0; // Initialize the variable with a default value

													if ($iclist['type'] == 1) {
													    if ($iclist['selfid'] == $_SESSION['USERID']) {
													        $yes = 1;
													    }
													} 
													elseif ($iclist['type'] == 2) {
													    $staffid = isset($iclist['allocatedto']) ? json_decode($iclist['allocatedto']) : [];
													    $filteredArray = array_filter($staffid, function ($element) {
													        return $element == $_SESSION['USERID'];
													    });

													    if (!empty($filteredArray)) {
													        $yes = 1;
													    }
													}

													if ($iclist['created_by'] == $_SESSION['username']) {
													    $yes = 1;
													}

													if ($yes>0) {

													?>
													<tr>
														<td>
															<?php $date_format  = $this->db->query("SELECT * FROM general_settings ")->row();
																 $format= $date_format->date_format;
																 echo date("$format", strtotime($iclist['date']));
															?>
														</td>
												<td>

													<?php 
							            				if($iclist['type']==1){
										            		echo "Self";
											            }else{
											            	echo "Others";
											            } 
									            	?>
									          	</td>
												<td class="ple1">

													<?php 
							            				if($iclist['type']==1){
										            		echo "-";
											            }
											            else{
										            		$users = isset($iclist['allocatedto']) ? json_decode($iclist['allocatedto']) : [];
															$staffnames = [];
															foreach ($users as $usr) {
															    $staffdata = $this->db->query("SELECT * FROM STAFFS WHERE USER_ID='".$usr."' ")->row();
															    if ($staffdata) {
															        $staffnames[] = ucfirst(ltrim($staffdata->STAFFNAME, ','));
															    }
															}
															echo implode(', ', $staffnames);																					 
														}
										            ?>

												</td>
												<td class="ple1">
													<?php 
														if($iclist['Recurringtype']==1){
										            		echo "Daily";
											            }
											            else if ($iclist['Recurringtype']==2) {
											            	echo "Weekly";
											            }
											            else if ($iclist['Recurringtype']==3) {
											            	echo "Monthly";
											            }
											            else if ($iclist['Recurringtype']==4) {
											            	echo "Speicific Date";
											            }
											            else  {
											            	echo "-";
											            }
												 	?>

												 </td>
												<td>
													<span class="badge badge-info fs-7">

														<?php 
															if($iclist['Recurringtype']==1){
											            		date_default_timezone_set("Asia/Calcutta"); echo date("h:i A",strtotime($iclist['daily']));
												            }
												            else if ($iclist['Recurringtype']==2) {
												            	date_default_timezone_set("Asia/Calcutta"); echo date("h:i A",strtotime($iclist['week']));
												            }
												            else if ($iclist['Recurringtype']==3) {
												            	date_default_timezone_set("Asia/Calcutta"); echo date("d-Y h:i A",strtotime($iclist['month']));
												            }
												            else if ($iclist['Recurringtype']==4) {
												            	date_default_timezone_set("Asia/Calcutta"); echo date("d-m-Y h:i A",strtotime($iclist['specificday']));
												            }
												            else  {
												            	echo "-";
												            }
													 	?>

													</span>
												</td>
												<td class="ple1"><?php echo $iclist['description']?$iclist['description']:'-'; ?></td>
												<td>
													<label class="form-check form-switch form-check-custom form-check-solid cursor-pointer">
														<input class="form-check-input w-35px h-20px cursor-pointer" type="checkbox" <?php if($iclist['status']==1){echo "checked";} ?> id="activeunactive_<?php echo $i;?>" name="activeunactive_<?php echo $i;?>" onchange="activeunactive('<?php echo $iclist['remainderid']; ?>',<?php echo $i;?>)" value="<?php echo $iclist['status'];?>">
													</label>
												</td>
												<td>
													<span class="text-end">
														<!-- <a href="#" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm" data-bs-toggle="modal" data-bs-target="#kt_modal_viewloan" title="View">
															<i class="bi bi-eye-fill eyc"></i>
														</a> -->
														<a href="javascript:;" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1" data-bs-toggle="modal" data-bs-target="#kt_modal_edit_remainder" onclick="remainderedit(<?php echo $iclist['remainderid']; ?>)">
															<span class="svg-icon svg-icon-3">
																<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																	<path opacity="0.3" d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z" fill="currentColor"></path>
																	<path d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z" fill="currentColor"></path>
																</svg>
															</span>
														</a>
														<a href="javascript:;" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm" data-bs-toggle="modal" data-bs-target="#kt_modal_delete_remainder" onclick="remainderdelete(<?php echo $iclist['remainderid']; ?>)">
															<span class="svg-icon svg-icon-3">
																<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																	<path d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z" fill="currentColor"></path>
																	<path opacity="0.5" d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z" fill="currentColor"></path>
																	<path opacity="0.5" d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z" fill="currentColor"></path>
																</svg>
															</span>
														</a>
													</span>
												</td>
											</tr>
												<?php $i++; } } } ?>													
												</tbody>
												<!--end::Table body-->
											</table>
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
		<!--begin::Modal - New Remainder -->
		<div class="modal fade" id="kt_modal_new_remainder" tabindex="-1" aria-hidden="true" data-bs-keyboard="false" data-bs-backdrop="static">
			<div class="modal-dialog modal-lg">
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
							<h1 class="mb-3">New Remainder</h1>
						</div>
						<form enctype="multipart/form-data" id="remainder_form" method="POST"  action="<?php echo base_url(); ?>Remainder/add"  >
							<div class="row">
								<div class="col-lg-2">
									<label class="col-form-label required fw-semibold fs-6">Date</label>
								</div>
								<div class="col-lg-4 fv-row">
									<div class="d-flex align-items-center">
										<span class="svg-icon position-absolute ms-4 svg-icon-2 dt">
											<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
												<path opacity="0.3" d="M21 22H3C2.4 22 2 21.6 2 21V5C2 4.4 2.4 4 3 4H21C21.6 4 22 4.4 22 5V21C22 21.6 21.6 22 21 22Z" fill="currentColor" />
												<path d="M6 6C5.4 6 5 5.6 5 5V3C5 2.4 5.4 2 6 2C6.6 2 7 2.4 7 3V5C7 5.6 6.6 6 6 6ZM11 5V3C11 2.4 10.6 2 10 2C9.4 2 9 2.4 9 3V5C9 5.6 9.4 6 10 6C10.6 6 11 5.6 11 5ZM15 5V3C15 2.4 14.6 2 14 2C13.4 2 13 2.4 13 3V5C13 5.6 13.4 6 14 6C14.6 6 15 5.6 15 5ZM19 5V3C19 2.4 18.6 2 18 2C17.4 2 17 2.4 17 3V5C17 5.6 17.4 6 18 6C18.6 6 19 5.6 19 5Z" fill="currentColor" />
												<path d="M8.8 13.1C9.2 13.1 9.5 13 9.7 12.8C9.9 12.6 10.1 12.3 10.1 11.9C10.1 11.6 10 11.3 9.8 11.1C9.6 10.9 9.3 10.8 9 10.8C8.8 10.8 8.59999 10.8 8.39999 10.9C8.19999 11 8.1 11.1 8 11.2C7.9 11.3 7.8 11.4 7.7 11.6C7.6 11.8 7.5 11.9 7.5 12.1C7.5 12.2 7.4 12.2 7.3 12.3C7.2 12.4 7.09999 12.4 6.89999 12.4C6.69999 12.4 6.6 12.3 6.5 12.2C6.4 12.1 6.3 11.9 6.3 11.7C6.3 11.5 6.4 11.3 6.5 11.1C6.6 10.9 6.8 10.7 7 10.5C7.2 10.3 7.49999 10.1 7.89999 10C8.29999 9.90003 8.60001 9.80003 9.10001 9.80003C9.50001 9.80003 9.80001 9.90003 10.1 10C10.4 10.1 10.7 10.3 10.9 10.4C11.1 10.5 11.3 10.8 11.4 11.1C11.5 11.4 11.6 11.6 11.6 11.9C11.6 12.3 11.5 12.6 11.3 12.9C11.1 13.2 10.9 13.5 10.6 13.7C10.9 13.9 11.2 14.1 11.4 14.3C11.6 14.5 11.8 14.7 11.9 15C12 15.3 12.1 15.5 12.1 15.8C12.1 16.2 12 16.5 11.9 16.8C11.8 17.1 11.5 17.4 11.3 17.7C11.1 18 10.7 18.2 10.3 18.3C9.9 18.4 9.5 18.5 9 18.5C8.5 18.5 8.1 18.4 7.7 18.2C7.3 18 7 17.8 6.8 17.6C6.6 17.4 6.4 17.1 6.3 16.8C6.2 16.5 6.10001 16.3 6.10001 16.1C6.10001 15.9 6.2 15.7 6.3 15.6C6.4 15.5 6.6 15.4 6.8 15.4C6.9 15.4 7.00001 15.4 7.10001 15.5C7.20001 15.6 7.3 15.6 7.3 15.7C7.5 16.2 7.7 16.6 8 16.9C8.3 17.2 8.6 17.3 9 17.3C9.2 17.3 9.5 17.2 9.7 17.1C9.9 17 10.1 16.8 10.3 16.6C10.5 16.4 10.5 16.1 10.5 15.8C10.5 15.3 10.4 15 10.1 14.7C9.80001 14.4 9.50001 14.3 9.10001 14.3C9.00001 14.3 8.9 14.3 8.7 14.3C8.5 14.3 8.39999 14.3 8.39999 14.3C8.19999 14.3 7.99999 14.2 7.89999 14.1C7.79999 14 7.7 13.8 7.7 13.7C7.7 13.5 7.79999 13.4 7.89999 13.2C7.99999 13 8.2 13 8.5 13H8.8V13.1ZM15.3 17.5V12.2C14.3 13 13.6 13.3 13.3 13.3C13.1 13.3 13 13.2 12.9 13.1C12.8 13 12.7 12.8 12.7 12.6C12.7 12.4 12.8 12.3 12.9 12.2C13 12.1 13.2 12 13.6 11.8C14.1 11.6 14.5 11.3 14.7 11.1C14.9 10.9 15.2 10.6 15.5 10.3C15.8 10 15.9 9.80003 15.9 9.70003C15.9 9.60003 16.1 9.60004 16.3 9.60004C16.5 9.60004 16.7 9.70003 16.8 9.80003C16.9 9.90003 17 10.2 17 10.5V17.2C17 18 16.7 18.4 16.2 18.4C16 18.4 15.8 18.3 15.6 18.2C15.4 18.1 15.3 17.8 15.3 17.5Z" fill="currentColor" />
											</svg>
										</span>
										<input class="form-control form-control-solid ps-12" name="remainder_date" placeholder="Schedule Date" id="remainder_date" />
									</div>
									<div class="fv-plugins-message-container invalid-feedback" id="remainder_date_err"></div>
								</div>
								<label class="col-lg-2 col-form-label required fw-semibold fs-6">Type</label>
								<div class="col-lg-4 fv-row">
									<select class="form-select form-select-solid" name="remain_type" id="remain_type" data-control="select2" data-hide-search="false" data-dropdown-parent="#kt_modal_new_remainder" onchange="rem_type_func();">
										<option value="">Select Type</option>
										<option value="1">Self</option>
										<option value="2">Others</option>
									</select>
									<div class="fv-plugins-message-container invalid-feedback" id="remain_type_err"></div>
								</div>
								<label class="col-lg-2 col-form-label required fw-semibold fs-6" id="remain_type_lab" style="display:none;">Allocate To</label>
								<div class="col-lg-4 fv-row" id="remain_type_tbox" style="display:none;">
									<select class="form-select form-select-solid" name="allocatedto[]" id="allocatedto" data-control="select2" data-hide-search="false" data-dropdown-parent="#kt_modal_new_remainder" multiple="multiple" data-placeholder="Select">
										<?php if (isset($userlist)) {
											foreach ($userlist as $key => $ulist) { 
												if ($ulist['USER_ID']!=$_SESSION['USERID']) {?>
												<option value="<?php echo  $ulist['USER_ID']?$ulist['USER_ID']:''; ?>"><?php echo ucfirst($ulist['STAFFNAME']?$ulist['STAFFNAME']:'-'); ?></option>
												
										<?php } } } ?>
									</select>
									<div class="fv-plugins-message-container invalid-feedback" id="allocatedto_err"></div>
								</div>
								<label class="col-lg-2 col-form-label required fw-semibold fs-6">Recurring</label>
								<div class="col-lg-4 fv-row">
									<select class="form-select form-select-solid" name="recur_type" id="recur_type" data-control="select2" data-hide-search="false" data-dropdown-parent="#kt_modal_new_remainder" onchange="recurring_func();">
										<option value="">Select</option>
										<option value="1">Daily</option>
										<option value="2">Weekly</option>
										<option value="3">Monthly</option>
										<option value="4">Speicific Date</option>
									</select>
									<div class="fv-plugins-message-container invalid-feedback" id="recur_type_err"></div>
								</div>
								<label class="col-lg-2 col-form-label required fw-semibold fs-6" id="remain_daily_lab" style="display: none;">Daily</label>
								<div class="col-lg-4 fv-row" id="remain_daily_tbox" style="display: none;">
									<div class="d-flex align-items-center">
										<span class="svg-icon position-absolute ms-4 svg-icon-2 dt">
											<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
												<path opacity="0.3" d="M21 22H3C2.4 22 2 21.6 2 21V5C2 4.4 2.4 4 3 4H21C21.6 4 22 4.4 22 5V21C22 21.6 21.6 22 21 22Z" fill="currentColor" />
												<path d="M6 6C5.4 6 5 5.6 5 5V3C5 2.4 5.4 2 6 2C6.6 2 7 2.4 7 3V5C7 5.6 6.6 6 6 6ZM11 5V3C11 2.4 10.6 2 10 2C9.4 2 9 2.4 9 3V5C9 5.6 9.4 6 10 6C10.6 6 11 5.6 11 5ZM15 5V3C15 2.4 14.6 2 14 2C13.4 2 13 2.4 13 3V5C13 5.6 13.4 6 14 6C14.6 6 15 5.6 15 5ZM19 5V3C19 2.4 18.6 2 18 2C17.4 2 17 2.4 17 3V5C17 5.6 17.4 6 18 6C18.6 6 19 5.6 19 5Z" fill="currentColor" />
												<path d="M8.8 13.1C9.2 13.1 9.5 13 9.7 12.8C9.9 12.6 10.1 12.3 10.1 11.9C10.1 11.6 10 11.3 9.8 11.1C9.6 10.9 9.3 10.8 9 10.8C8.8 10.8 8.59999 10.8 8.39999 10.9C8.19999 11 8.1 11.1 8 11.2C7.9 11.3 7.8 11.4 7.7 11.6C7.6 11.8 7.5 11.9 7.5 12.1C7.5 12.2 7.4 12.2 7.3 12.3C7.2 12.4 7.09999 12.4 6.89999 12.4C6.69999 12.4 6.6 12.3 6.5 12.2C6.4 12.1 6.3 11.9 6.3 11.7C6.3 11.5 6.4 11.3 6.5 11.1C6.6 10.9 6.8 10.7 7 10.5C7.2 10.3 7.49999 10.1 7.89999 10C8.29999 9.90003 8.60001 9.80003 9.10001 9.80003C9.50001 9.80003 9.80001 9.90003 10.1 10C10.4 10.1 10.7 10.3 10.9 10.4C11.1 10.5 11.3 10.8 11.4 11.1C11.5 11.4 11.6 11.6 11.6 11.9C11.6 12.3 11.5 12.6 11.3 12.9C11.1 13.2 10.9 13.5 10.6 13.7C10.9 13.9 11.2 14.1 11.4 14.3C11.6 14.5 11.8 14.7 11.9 15C12 15.3 12.1 15.5 12.1 15.8C12.1 16.2 12 16.5 11.9 16.8C11.8 17.1 11.5 17.4 11.3 17.7C11.1 18 10.7 18.2 10.3 18.3C9.9 18.4 9.5 18.5 9 18.5C8.5 18.5 8.1 18.4 7.7 18.2C7.3 18 7 17.8 6.8 17.6C6.6 17.4 6.4 17.1 6.3 16.8C6.2 16.5 6.10001 16.3 6.10001 16.1C6.10001 15.9 6.2 15.7 6.3 15.6C6.4 15.5 6.6 15.4 6.8 15.4C6.9 15.4 7.00001 15.4 7.10001 15.5C7.20001 15.6 7.3 15.6 7.3 15.7C7.5 16.2 7.7 16.6 8 16.9C8.3 17.2 8.6 17.3 9 17.3C9.2 17.3 9.5 17.2 9.7 17.1C9.9 17 10.1 16.8 10.3 16.6C10.5 16.4 10.5 16.1 10.5 15.8C10.5 15.3 10.4 15 10.1 14.7C9.80001 14.4 9.50001 14.3 9.10001 14.3C9.00001 14.3 8.9 14.3 8.7 14.3C8.5 14.3 8.39999 14.3 8.39999 14.3C8.19999 14.3 7.99999 14.2 7.89999 14.1C7.79999 14 7.7 13.8 7.7 13.7C7.7 13.5 7.79999 13.4 7.89999 13.2C7.99999 13 8.2 13 8.5 13H8.8V13.1ZM15.3 17.5V12.2C14.3 13 13.6 13.3 13.3 13.3C13.1 13.3 13 13.2 12.9 13.1C12.8 13 12.7 12.8 12.7 12.6C12.7 12.4 12.8 12.3 12.9 12.2C13 12.1 13.2 12 13.6 11.8C14.1 11.6 14.5 11.3 14.7 11.1C14.9 10.9 15.2 10.6 15.5 10.3C15.8 10 15.9 9.80003 15.9 9.70003C15.9 9.60003 16.1 9.60004 16.3 9.60004C16.5 9.60004 16.7 9.70003 16.8 9.80003C16.9 9.90003 17 10.2 17 10.5V17.2C17 18 16.7 18.4 16.2 18.4C16 18.4 15.8 18.3 15.6 18.2C15.4 18.1 15.3 17.8 15.3 17.5Z" fill="currentColor" />
											</svg>
										</span>
										<input class="form-control form-control-solid ps-12" name="remainder_daily" id="remainder_daily" />
									</div>
									<div class="fv-plugins-message-container invalid-feedback" id="remainder_daily_err"></div>
								</div>
								<label class="col-lg-2 col-form-label required fw-semibold fs-6" id="remain_monthly_lab" style="display: none;">Monthly</label>
								<div class="col-lg-4 fv-row" id="remain_monthly_tbox" style="display: none;">
									<div class="d-flex align-items-center">
										<span class="svg-icon position-absolute ms-4 svg-icon-2 dt">
											<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
												<path opacity="0.3" d="M21 22H3C2.4 22 2 21.6 2 21V5C2 4.4 2.4 4 3 4H21C21.6 4 22 4.4 22 5V21C22 21.6 21.6 22 21 22Z" fill="currentColor" />
												<path d="M6 6C5.4 6 5 5.6 5 5V3C5 2.4 5.4 2 6 2C6.6 2 7 2.4 7 3V5C7 5.6 6.6 6 6 6ZM11 5V3C11 2.4 10.6 2 10 2C9.4 2 9 2.4 9 3V5C9 5.6 9.4 6 10 6C10.6 6 11 5.6 11 5ZM15 5V3C15 2.4 14.6 2 14 2C13.4 2 13 2.4 13 3V5C13 5.6 13.4 6 14 6C14.6 6 15 5.6 15 5ZM19 5V3C19 2.4 18.6 2 18 2C17.4 2 17 2.4 17 3V5C17 5.6 17.4 6 18 6C18.6 6 19 5.6 19 5Z" fill="currentColor" />
												<path d="M8.8 13.1C9.2 13.1 9.5 13 9.7 12.8C9.9 12.6 10.1 12.3 10.1 11.9C10.1 11.6 10 11.3 9.8 11.1C9.6 10.9 9.3 10.8 9 10.8C8.8 10.8 8.59999 10.8 8.39999 10.9C8.19999 11 8.1 11.1 8 11.2C7.9 11.3 7.8 11.4 7.7 11.6C7.6 11.8 7.5 11.9 7.5 12.1C7.5 12.2 7.4 12.2 7.3 12.3C7.2 12.4 7.09999 12.4 6.89999 12.4C6.69999 12.4 6.6 12.3 6.5 12.2C6.4 12.1 6.3 11.9 6.3 11.7C6.3 11.5 6.4 11.3 6.5 11.1C6.6 10.9 6.8 10.7 7 10.5C7.2 10.3 7.49999 10.1 7.89999 10C8.29999 9.90003 8.60001 9.80003 9.10001 9.80003C9.50001 9.80003 9.80001 9.90003 10.1 10C10.4 10.1 10.7 10.3 10.9 10.4C11.1 10.5 11.3 10.8 11.4 11.1C11.5 11.4 11.6 11.6 11.6 11.9C11.6 12.3 11.5 12.6 11.3 12.9C11.1 13.2 10.9 13.5 10.6 13.7C10.9 13.9 11.2 14.1 11.4 14.3C11.6 14.5 11.8 14.7 11.9 15C12 15.3 12.1 15.5 12.1 15.8C12.1 16.2 12 16.5 11.9 16.8C11.8 17.1 11.5 17.4 11.3 17.7C11.1 18 10.7 18.2 10.3 18.3C9.9 18.4 9.5 18.5 9 18.5C8.5 18.5 8.1 18.4 7.7 18.2C7.3 18 7 17.8 6.8 17.6C6.6 17.4 6.4 17.1 6.3 16.8C6.2 16.5 6.10001 16.3 6.10001 16.1C6.10001 15.9 6.2 15.7 6.3 15.6C6.4 15.5 6.6 15.4 6.8 15.4C6.9 15.4 7.00001 15.4 7.10001 15.5C7.20001 15.6 7.3 15.6 7.3 15.7C7.5 16.2 7.7 16.6 8 16.9C8.3 17.2 8.6 17.3 9 17.3C9.2 17.3 9.5 17.2 9.7 17.1C9.9 17 10.1 16.8 10.3 16.6C10.5 16.4 10.5 16.1 10.5 15.8C10.5 15.3 10.4 15 10.1 14.7C9.80001 14.4 9.50001 14.3 9.10001 14.3C9.00001 14.3 8.9 14.3 8.7 14.3C8.5 14.3 8.39999 14.3 8.39999 14.3C8.19999 14.3 7.99999 14.2 7.89999 14.1C7.79999 14 7.7 13.8 7.7 13.7C7.7 13.5 7.79999 13.4 7.89999 13.2C7.99999 13 8.2 13 8.5 13H8.8V13.1ZM15.3 17.5V12.2C14.3 13 13.6 13.3 13.3 13.3C13.1 13.3 13 13.2 12.9 13.1C12.8 13 12.7 12.8 12.7 12.6C12.7 12.4 12.8 12.3 12.9 12.2C13 12.1 13.2 12 13.6 11.8C14.1 11.6 14.5 11.3 14.7 11.1C14.9 10.9 15.2 10.6 15.5 10.3C15.8 10 15.9 9.80003 15.9 9.70003C15.9 9.60003 16.1 9.60004 16.3 9.60004C16.5 9.60004 16.7 9.70003 16.8 9.80003C16.9 9.90003 17 10.2 17 10.5V17.2C17 18 16.7 18.4 16.2 18.4C16 18.4 15.8 18.3 15.6 18.2C15.4 18.1 15.3 17.8 15.3 17.5Z" fill="currentColor" />
											</svg>
										</span>
										<input class="form-control form-control-solid ps-12" name="remainder_monthly" id="remainder_monthly" />
									</div>
									<div class="fv-plugins-message-container invalid-feedback" id="remainder_monthly_err"></div>
								</div>
								<label class="col-lg-2 col-form-label required fw-semibold fs-6" id="remain_spec_dt_lab" style="display: none;">Spec.Date</label>
								<div class="col-lg-4 fv-row" id="remain_spec_dt_tbox" style="display: none;">
									<div class="d-flex align-items-center">
										<span class="svg-icon position-absolute ms-4 svg-icon-2 dt">
											<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
												<path opacity="0.3" d="M21 22H3C2.4 22 2 21.6 2 21V5C2 4.4 2.4 4 3 4H21C21.6 4 22 4.4 22 5V21C22 21.6 21.6 22 21 22Z" fill="currentColor" />
												<path d="M6 6C5.4 6 5 5.6 5 5V3C5 2.4 5.4 2 6 2C6.6 2 7 2.4 7 3V5C7 5.6 6.6 6 6 6ZM11 5V3C11 2.4 10.6 2 10 2C9.4 2 9 2.4 9 3V5C9 5.6 9.4 6 10 6C10.6 6 11 5.6 11 5ZM15 5V3C15 2.4 14.6 2 14 2C13.4 2 13 2.4 13 3V5C13 5.6 13.4 6 14 6C14.6 6 15 5.6 15 5ZM19 5V3C19 2.4 18.6 2 18 2C17.4 2 17 2.4 17 3V5C17 5.6 17.4 6 18 6C18.6 6 19 5.6 19 5Z" fill="currentColor" />
												<path d="M8.8 13.1C9.2 13.1 9.5 13 9.7 12.8C9.9 12.6 10.1 12.3 10.1 11.9C10.1 11.6 10 11.3 9.8 11.1C9.6 10.9 9.3 10.8 9 10.8C8.8 10.8 8.59999 10.8 8.39999 10.9C8.19999 11 8.1 11.1 8 11.2C7.9 11.3 7.8 11.4 7.7 11.6C7.6 11.8 7.5 11.9 7.5 12.1C7.5 12.2 7.4 12.2 7.3 12.3C7.2 12.4 7.09999 12.4 6.89999 12.4C6.69999 12.4 6.6 12.3 6.5 12.2C6.4 12.1 6.3 11.9 6.3 11.7C6.3 11.5 6.4 11.3 6.5 11.1C6.6 10.9 6.8 10.7 7 10.5C7.2 10.3 7.49999 10.1 7.89999 10C8.29999 9.90003 8.60001 9.80003 9.10001 9.80003C9.50001 9.80003 9.80001 9.90003 10.1 10C10.4 10.1 10.7 10.3 10.9 10.4C11.1 10.5 11.3 10.8 11.4 11.1C11.5 11.4 11.6 11.6 11.6 11.9C11.6 12.3 11.5 12.6 11.3 12.9C11.1 13.2 10.9 13.5 10.6 13.7C10.9 13.9 11.2 14.1 11.4 14.3C11.6 14.5 11.8 14.7 11.9 15C12 15.3 12.1 15.5 12.1 15.8C12.1 16.2 12 16.5 11.9 16.8C11.8 17.1 11.5 17.4 11.3 17.7C11.1 18 10.7 18.2 10.3 18.3C9.9 18.4 9.5 18.5 9 18.5C8.5 18.5 8.1 18.4 7.7 18.2C7.3 18 7 17.8 6.8 17.6C6.6 17.4 6.4 17.1 6.3 16.8C6.2 16.5 6.10001 16.3 6.10001 16.1C6.10001 15.9 6.2 15.7 6.3 15.6C6.4 15.5 6.6 15.4 6.8 15.4C6.9 15.4 7.00001 15.4 7.10001 15.5C7.20001 15.6 7.3 15.6 7.3 15.7C7.5 16.2 7.7 16.6 8 16.9C8.3 17.2 8.6 17.3 9 17.3C9.2 17.3 9.5 17.2 9.7 17.1C9.9 17 10.1 16.8 10.3 16.6C10.5 16.4 10.5 16.1 10.5 15.8C10.5 15.3 10.4 15 10.1 14.7C9.80001 14.4 9.50001 14.3 9.10001 14.3C9.00001 14.3 8.9 14.3 8.7 14.3C8.5 14.3 8.39999 14.3 8.39999 14.3C8.19999 14.3 7.99999 14.2 7.89999 14.1C7.79999 14 7.7 13.8 7.7 13.7C7.7 13.5 7.79999 13.4 7.89999 13.2C7.99999 13 8.2 13 8.5 13H8.8V13.1ZM15.3 17.5V12.2C14.3 13 13.6 13.3 13.3 13.3C13.1 13.3 13 13.2 12.9 13.1C12.8 13 12.7 12.8 12.7 12.6C12.7 12.4 12.8 12.3 12.9 12.2C13 12.1 13.2 12 13.6 11.8C14.1 11.6 14.5 11.3 14.7 11.1C14.9 10.9 15.2 10.6 15.5 10.3C15.8 10 15.9 9.80003 15.9 9.70003C15.9 9.60003 16.1 9.60004 16.3 9.60004C16.5 9.60004 16.7 9.70003 16.8 9.80003C16.9 9.90003 17 10.2 17 10.5V17.2C17 18 16.7 18.4 16.2 18.4C16 18.4 15.8 18.3 15.6 18.2C15.4 18.1 15.3 17.8 15.3 17.5Z" fill="currentColor" />
											</svg>
										</span>
										<input class="form-control form-control-solid ps-12" name="remainder_speicific_date" placeholder="Schedule Date" id="remainder_speicific_date"/>
									</div>
									<div class="fv-plugins-message-container invalid-feedback" id="remainder_speicific_date_err"></div>
								</div>
								<label class="col-lg-2 col-form-label required fw-semibold fs-6" id="remain_weekly_day_lab" style="display:none;">Day</label>
								<div class="col-lg-4 fv-row" id="remain_weekly_day_tbox" style="display:none;">
									<select class="form-select form-select-solid" name="weekdays[]" id="weekdays" data-control="select2" data-hide-search="false" data-dropdown-parent="#kt_modal_new_remainder" multiple="multiple" data-placeholder="Select">
										<option value="">Select</option>
										<option value="0">All</option>
										<option value="1">Sunday</option>
										<option value="2">Monday</option>
										<option value="3">Tuesday</option>
										<option value="4">Wednesday</option>
										<option value="5">Thursday</option>
										<option value="6">Friday</option>
										<option value="7">Saturday</option>
									</select>
									<div class="fv-plugins-message-container invalid-feedback" id="weekdays_err"></div>
								</div>
								<label class="col-lg-2 col-form-label required fw-semibold fs-6" id="remain_weekly_time_lab" style="display: none;">Weekly</label>
								<div class="col-lg-4 fv-row" id="remain_weekly_time_tbox" style="display: none;">
									<div class="d-flex align-items-center">
										<span class="svg-icon position-absolute ms-4 svg-icon-2 dt">
											<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
												<path opacity="0.3" d="M21 22H3C2.4 22 2 21.6 2 21V5C2 4.4 2.4 4 3 4H21C21.6 4 22 4.4 22 5V21C22 21.6 21.6 22 21 22Z" fill="currentColor" />
												<path d="M6 6C5.4 6 5 5.6 5 5V3C5 2.4 5.4 2 6 2C6.6 2 7 2.4 7 3V5C7 5.6 6.6 6 6 6ZM11 5V3C11 2.4 10.6 2 10 2C9.4 2 9 2.4 9 3V5C9 5.6 9.4 6 10 6C10.6 6 11 5.6 11 5ZM15 5V3C15 2.4 14.6 2 14 2C13.4 2 13 2.4 13 3V5C13 5.6 13.4 6 14 6C14.6 6 15 5.6 15 5ZM19 5V3C19 2.4 18.6 2 18 2C17.4 2 17 2.4 17 3V5C17 5.6 17.4 6 18 6C18.6 6 19 5.6 19 5Z" fill="currentColor" />
												<path d="M8.8 13.1C9.2 13.1 9.5 13 9.7 12.8C9.9 12.6 10.1 12.3 10.1 11.9C10.1 11.6 10 11.3 9.8 11.1C9.6 10.9 9.3 10.8 9 10.8C8.8 10.8 8.59999 10.8 8.39999 10.9C8.19999 11 8.1 11.1 8 11.2C7.9 11.3 7.8 11.4 7.7 11.6C7.6 11.8 7.5 11.9 7.5 12.1C7.5 12.2 7.4 12.2 7.3 12.3C7.2 12.4 7.09999 12.4 6.89999 12.4C6.69999 12.4 6.6 12.3 6.5 12.2C6.4 12.1 6.3 11.9 6.3 11.7C6.3 11.5 6.4 11.3 6.5 11.1C6.6 10.9 6.8 10.7 7 10.5C7.2 10.3 7.49999 10.1 7.89999 10C8.29999 9.90003 8.60001 9.80003 9.10001 9.80003C9.50001 9.80003 9.80001 9.90003 10.1 10C10.4 10.1 10.7 10.3 10.9 10.4C11.1 10.5 11.3 10.8 11.4 11.1C11.5 11.4 11.6 11.6 11.6 11.9C11.6 12.3 11.5 12.6 11.3 12.9C11.1 13.2 10.9 13.5 10.6 13.7C10.9 13.9 11.2 14.1 11.4 14.3C11.6 14.5 11.8 14.7 11.9 15C12 15.3 12.1 15.5 12.1 15.8C12.1 16.2 12 16.5 11.9 16.8C11.8 17.1 11.5 17.4 11.3 17.7C11.1 18 10.7 18.2 10.3 18.3C9.9 18.4 9.5 18.5 9 18.5C8.5 18.5 8.1 18.4 7.7 18.2C7.3 18 7 17.8 6.8 17.6C6.6 17.4 6.4 17.1 6.3 16.8C6.2 16.5 6.10001 16.3 6.10001 16.1C6.10001 15.9 6.2 15.7 6.3 15.6C6.4 15.5 6.6 15.4 6.8 15.4C6.9 15.4 7.00001 15.4 7.10001 15.5C7.20001 15.6 7.3 15.6 7.3 15.7C7.5 16.2 7.7 16.6 8 16.9C8.3 17.2 8.6 17.3 9 17.3C9.2 17.3 9.5 17.2 9.7 17.1C9.9 17 10.1 16.8 10.3 16.6C10.5 16.4 10.5 16.1 10.5 15.8C10.5 15.3 10.4 15 10.1 14.7C9.80001 14.4 9.50001 14.3 9.10001 14.3C9.00001 14.3 8.9 14.3 8.7 14.3C8.5 14.3 8.39999 14.3 8.39999 14.3C8.19999 14.3 7.99999 14.2 7.89999 14.1C7.79999 14 7.7 13.8 7.7 13.7C7.7 13.5 7.79999 13.4 7.89999 13.2C7.99999 13 8.2 13 8.5 13H8.8V13.1ZM15.3 17.5V12.2C14.3 13 13.6 13.3 13.3 13.3C13.1 13.3 13 13.2 12.9 13.1C12.8 13 12.7 12.8 12.7 12.6C12.7 12.4 12.8 12.3 12.9 12.2C13 12.1 13.2 12 13.6 11.8C14.1 11.6 14.5 11.3 14.7 11.1C14.9 10.9 15.2 10.6 15.5 10.3C15.8 10 15.9 9.80003 15.9 9.70003C15.9 9.60003 16.1 9.60004 16.3 9.60004C16.5 9.60004 16.7 9.70003 16.8 9.80003C16.9 9.90003 17 10.2 17 10.5V17.2C17 18 16.7 18.4 16.2 18.4C16 18.4 15.8 18.3 15.6 18.2C15.4 18.1 15.3 17.8 15.3 17.5Z" fill="currentColor" />
											</svg>
										</span>
										<input class="form-control form-control-solid ps-12" name="remainder_weekly_time" id="remainder_weekly_time" />
									</div>
									<div class="fv-plugins-message-container invalid-feedback" id="remainder_weekly_time_err"></div>
								</div>
							</div>
							<div class="row">
								<label class="col-lg-2 col-form-label required fw-semibold fs-6">Description</label>
								<div class="col-lg-10 fv-row">
									<textarea class="form-control form-control-solid" rows="3" placeholder="Enter Description" name="remainder_desc" id="remainder_desc"></textarea>
									<div class="fv-plugins-message-container invalid-feedback" id="remainder_desc_err"></div>
								</div>
							</div>
							<div class="d-flex justify-content-end align-items-center mt-6">
								<button type="reset" class="btn btn-secondary me-3" data-bs-dismiss="modal">Cancel</button>
								<button type="button" class="btn btn-primary" onclick="addvalidation();" id="submit_btn">Create Remainder</button>
							</div>
						</form>
					</div>
				</div>
				<!--end::Modal dialog-->
			</div>
		</div>
		<!--end::Modal - New Remainder -->
		<!--begin::Modal - New Remainder -->
		<div class="modal fade" id="kt_modal_edit_remainder" tabindex="-1" aria-hidden="true" data-bs-keyboard="false" data-bs-backdrop="static">
			<div class="modal-dialog modal-lg">
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
							<h1 class="mb-3">Modify Remainder</h1>
						</div>
						<div class="row" id="edit_remainder_model">
							<div class="row">
	<form enctype="multipart/form-data" id="remainder_form" method="POST"  action="<?php echo base_url(); ?>Remainder/add"  >
		<div class="row">
			<div class="col-lg-2">
				<label class="col-form-label required fw-semibold fs-6">Date</label>
			</div>
			<div class="col-lg-4 fv-row">
				<div class="d-flex align-items-center">
					<span class="svg-icon position-absolute ms-4 svg-icon-2 dt">
						<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path opacity="0.3" d="M21 22H3C2.4 22 2 21.6 2 21V5C2 4.4 2.4 4 3 4H21C21.6 4 22 4.4 22 5V21C22 21.6 21.6 22 21 22Z" fill="currentColor" />
							<path d="M6 6C5.4 6 5 5.6 5 5V3C5 2.4 5.4 2 6 2C6.6 2 7 2.4 7 3V5C7 5.6 6.6 6 6 6ZM11 5V3C11 2.4 10.6 2 10 2C9.4 2 9 2.4 9 3V5C9 5.6 9.4 6 10 6C10.6 6 11 5.6 11 5ZM15 5V3C15 2.4 14.6 2 14 2C13.4 2 13 2.4 13 3V5C13 5.6 13.4 6 14 6C14.6 6 15 5.6 15 5ZM19 5V3C19 2.4 18.6 2 18 2C17.4 2 17 2.4 17 3V5C17 5.6 17.4 6 18 6C18.6 6 19 5.6 19 5Z" fill="currentColor" />
							<path d="M8.8 13.1C9.2 13.1 9.5 13 9.7 12.8C9.9 12.6 10.1 12.3 10.1 11.9C10.1 11.6 10 11.3 9.8 11.1C9.6 10.9 9.3 10.8 9 10.8C8.8 10.8 8.59999 10.8 8.39999 10.9C8.19999 11 8.1 11.1 8 11.2C7.9 11.3 7.8 11.4 7.7 11.6C7.6 11.8 7.5 11.9 7.5 12.1C7.5 12.2 7.4 12.2 7.3 12.3C7.2 12.4 7.09999 12.4 6.89999 12.4C6.69999 12.4 6.6 12.3 6.5 12.2C6.4 12.1 6.3 11.9 6.3 11.7C6.3 11.5 6.4 11.3 6.5 11.1C6.6 10.9 6.8 10.7 7 10.5C7.2 10.3 7.49999 10.1 7.89999 10C8.29999 9.90003 8.60001 9.80003 9.10001 9.80003C9.50001 9.80003 9.80001 9.90003 10.1 10C10.4 10.1 10.7 10.3 10.9 10.4C11.1 10.5 11.3 10.8 11.4 11.1C11.5 11.4 11.6 11.6 11.6 11.9C11.6 12.3 11.5 12.6 11.3 12.9C11.1 13.2 10.9 13.5 10.6 13.7C10.9 13.9 11.2 14.1 11.4 14.3C11.6 14.5 11.8 14.7 11.9 15C12 15.3 12.1 15.5 12.1 15.8C12.1 16.2 12 16.5 11.9 16.8C11.8 17.1 11.5 17.4 11.3 17.7C11.1 18 10.7 18.2 10.3 18.3C9.9 18.4 9.5 18.5 9 18.5C8.5 18.5 8.1 18.4 7.7 18.2C7.3 18 7 17.8 6.8 17.6C6.6 17.4 6.4 17.1 6.3 16.8C6.2 16.5 6.10001 16.3 6.10001 16.1C6.10001 15.9 6.2 15.7 6.3 15.6C6.4 15.5 6.6 15.4 6.8 15.4C6.9 15.4 7.00001 15.4 7.10001 15.5C7.20001 15.6 7.3 15.6 7.3 15.7C7.5 16.2 7.7 16.6 8 16.9C8.3 17.2 8.6 17.3 9 17.3C9.2 17.3 9.5 17.2 9.7 17.1C9.9 17 10.1 16.8 10.3 16.6C10.5 16.4 10.5 16.1 10.5 15.8C10.5 15.3 10.4 15 10.1 14.7C9.80001 14.4 9.50001 14.3 9.10001 14.3C9.00001 14.3 8.9 14.3 8.7 14.3C8.5 14.3 8.39999 14.3 8.39999 14.3C8.19999 14.3 7.99999 14.2 7.89999 14.1C7.79999 14 7.7 13.8 7.7 13.7C7.7 13.5 7.79999 13.4 7.89999 13.2C7.99999 13 8.2 13 8.5 13H8.8V13.1ZM15.3 17.5V12.2C14.3 13 13.6 13.3 13.3 13.3C13.1 13.3 13 13.2 12.9 13.1C12.8 13 12.7 12.8 12.7 12.6C12.7 12.4 12.8 12.3 12.9 12.2C13 12.1 13.2 12 13.6 11.8C14.1 11.6 14.5 11.3 14.7 11.1C14.9 10.9 15.2 10.6 15.5 10.3C15.8 10 15.9 9.80003 15.9 9.70003C15.9 9.60003 16.1 9.60004 16.3 9.60004C16.5 9.60004 16.7 9.70003 16.8 9.80003C16.9 9.90003 17 10.2 17 10.5V17.2C17 18 16.7 18.4 16.2 18.4C16 18.4 15.8 18.3 15.6 18.2C15.4 18.1 15.3 17.8 15.3 17.5Z" fill="currentColor" />
						</svg>
					</span>
					<?php   
							$dates = $edit->date?$edit->date:date("d-m-Y");
							$remaindates = date("d-m-Y", strtotime($dates));										
					?>
					<input class="form-control form-control-solid ps-12" name="remainder_date_edit" placeholder="Schedule Date" id="remainder_date_edit" value="<?php echo $remaindates; ?>"/>
				</div>
				<div class="fv-plugins-message-container invalid-feedback" id="remainder_date_edit_err"></div>
			</div>
			<label class="col-lg-2 col-form-label required fw-semibold fs-6">Type</label>
			<div class="col-lg-4 fv-row">
				<select class="form-select form-select-solid" name="remain_type_edit" id="remain_type_edit" data-control="select2" data-hide-search="false" data-dropdown-parent="#kt_modal_edit_remainder" onchange="rem_type_func_edit();">
					<option value="">Select Type</option>
					<option value="1"<?php if ($edit->type==1) {echo 'selected';}?>>Self</option>
					<option value="2"<?php if ($edit->type==2) {echo 'selected';}?>>Others</option>
				</select>
				<div class="fv-plugins-message-container invalid-feedback" id="allocatedto_err"></div>
			</div>
			<label class="col-lg-2 col-form-label required fw-semibold fs-6" id="remain_type_lab_edit" style="display:none;">Allocate To</label>
			<div class="col-lg-4 fv-row" id="remain_type_tbox_edit" style="display:none;">
				<select class="form-select form-select-solid" name="allocatedto_edit" id="allocatedto_edit" data-control="select2" data-hide-search="false" data-dropdown-parent="#kt_modal_edit_remainder" multiple="multiple" data-placeholder="Select">
					<?php
							$allocated = $edit->allocatedto ? json_decode($edit->allocatedto) : [];

							if (isset($userlist)) {
							    foreach ($userlist as $ulist) {
							        $selected = in_array($ulist['USER_ID'], $allocated) ? 'selected' : '';
							        $staffname = ucfirst($ulist['STAFFNAME'] ?? '-');
							        $userId = $ulist['USER_ID'] ?? '';
							        echo "<option value=\"$userId\" $selected>$staffname</option>";
							    }
							}
					?>
				</select>
				<div class="fv-plugins-message-container invalid-feedback" id="allocatedto_edit_err"></div>
			</div>
			<label class="col-lg-2 col-form-label required fw-semibold fs-6">Recurring</label>
			<div class="col-lg-4 fv-row">
				<select class="form-select form-select-solid" name="recur_type_edit" id="recur_type_edit" data-control="select2" data-hide-search="false" data-dropdown-parent="#kt_modal_edit_remainder" onchange="recurring_func_edit();">
					<option value="">Select</option>
					<option value="1" <?php if ($edit->Recurringtype==1) {echo 'selected';}?>>Daily</option>
					<option value="2" <?php if ($edit->Recurringtype==2) {echo 'selected';}?>>Weekly</option>
					<option value="3" <?php if ($edit->Recurringtype==3) {echo 'selected';}?>>Monthly</option>
					<option value="4" <?php if ($edit->Recurringtype==4) {echo 'selected';}?>>Speicific Date</option>
				</select>
			</div>
			<label class="col-lg-2 col-form-label required fw-semibold fs-6" id="remain_daily_lab_edit" style="display: none;">Daily</label>
			<div class="col-lg-4 fv-row" id="remain_daily_tbox_edit" style="display: none;">
				<div class="d-flex align-items-center">
					<span class="svg-icon position-absolute ms-4 svg-icon-2 dt">
						<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path opacity="0.3" d="M21 22H3C2.4 22 2 21.6 2 21V5C2 4.4 2.4 4 3 4H21C21.6 4 22 4.4 22 5V21C22 21.6 21.6 22 21 22Z" fill="currentColor" />
							<path d="M6 6C5.4 6 5 5.6 5 5V3C5 2.4 5.4 2 6 2C6.6 2 7 2.4 7 3V5C7 5.6 6.6 6 6 6ZM11 5V3C11 2.4 10.6 2 10 2C9.4 2 9 2.4 9 3V5C9 5.6 9.4 6 10 6C10.6 6 11 5.6 11 5ZM15 5V3C15 2.4 14.6 2 14 2C13.4 2 13 2.4 13 3V5C13 5.6 13.4 6 14 6C14.6 6 15 5.6 15 5ZM19 5V3C19 2.4 18.6 2 18 2C17.4 2 17 2.4 17 3V5C17 5.6 17.4 6 18 6C18.6 6 19 5.6 19 5Z" fill="currentColor" />
							<path d="M8.8 13.1C9.2 13.1 9.5 13 9.7 12.8C9.9 12.6 10.1 12.3 10.1 11.9C10.1 11.6 10 11.3 9.8 11.1C9.6 10.9 9.3 10.8 9 10.8C8.8 10.8 8.59999 10.8 8.39999 10.9C8.19999 11 8.1 11.1 8 11.2C7.9 11.3 7.8 11.4 7.7 11.6C7.6 11.8 7.5 11.9 7.5 12.1C7.5 12.2 7.4 12.2 7.3 12.3C7.2 12.4 7.09999 12.4 6.89999 12.4C6.69999 12.4 6.6 12.3 6.5 12.2C6.4 12.1 6.3 11.9 6.3 11.7C6.3 11.5 6.4 11.3 6.5 11.1C6.6 10.9 6.8 10.7 7 10.5C7.2 10.3 7.49999 10.1 7.89999 10C8.29999 9.90003 8.60001 9.80003 9.10001 9.80003C9.50001 9.80003 9.80001 9.90003 10.1 10C10.4 10.1 10.7 10.3 10.9 10.4C11.1 10.5 11.3 10.8 11.4 11.1C11.5 11.4 11.6 11.6 11.6 11.9C11.6 12.3 11.5 12.6 11.3 12.9C11.1 13.2 10.9 13.5 10.6 13.7C10.9 13.9 11.2 14.1 11.4 14.3C11.6 14.5 11.8 14.7 11.9 15C12 15.3 12.1 15.5 12.1 15.8C12.1 16.2 12 16.5 11.9 16.8C11.8 17.1 11.5 17.4 11.3 17.7C11.1 18 10.7 18.2 10.3 18.3C9.9 18.4 9.5 18.5 9 18.5C8.5 18.5 8.1 18.4 7.7 18.2C7.3 18 7 17.8 6.8 17.6C6.6 17.4 6.4 17.1 6.3 16.8C6.2 16.5 6.10001 16.3 6.10001 16.1C6.10001 15.9 6.2 15.7 6.3 15.6C6.4 15.5 6.6 15.4 6.8 15.4C6.9 15.4 7.00001 15.4 7.10001 15.5C7.20001 15.6 7.3 15.6 7.3 15.7C7.5 16.2 7.7 16.6 8 16.9C8.3 17.2 8.6 17.3 9 17.3C9.2 17.3 9.5 17.2 9.7 17.1C9.9 17 10.1 16.8 10.3 16.6C10.5 16.4 10.5 16.1 10.5 15.8C10.5 15.3 10.4 15 10.1 14.7C9.80001 14.4 9.50001 14.3 9.10001 14.3C9.00001 14.3 8.9 14.3 8.7 14.3C8.5 14.3 8.39999 14.3 8.39999 14.3C8.19999 14.3 7.99999 14.2 7.89999 14.1C7.79999 14 7.7 13.8 7.7 13.7C7.7 13.5 7.79999 13.4 7.89999 13.2C7.99999 13 8.2 13 8.5 13H8.8V13.1ZM15.3 17.5V12.2C14.3 13 13.6 13.3 13.3 13.3C13.1 13.3 13 13.2 12.9 13.1C12.8 13 12.7 12.8 12.7 12.6C12.7 12.4 12.8 12.3 12.9 12.2C13 12.1 13.2 12 13.6 11.8C14.1 11.6 14.5 11.3 14.7 11.1C14.9 10.9 15.2 10.6 15.5 10.3C15.8 10 15.9 9.80003 15.9 9.70003C15.9 9.60003 16.1 9.60004 16.3 9.60004C16.5 9.60004 16.7 9.70003 16.8 9.80003C16.9 9.90003 17 10.2 17 10.5V17.2C17 18 16.7 18.4 16.2 18.4C16 18.4 15.8 18.3 15.6 18.2C15.4 18.1 15.3 17.8 15.3 17.5Z" fill="currentColor" />
						</svg>
					</span>
					<?php   
						$re_daily = $edit->daily?$edit->daily:date("h:i A");
						$remaindaily = date("h:i A", strtotime($re_daily));						
					?>
					<input class="form-control form-control-solid ps-12" name="remainder_daily_edit" id="remainder_daily_edit" value="<?php echo $remaindaily; ?>" />
				</div>
				<div class="fv-plugins-message-container invalid-feedback" id="remainder_daily_edit_err"></div>
			</div>
			<label class="col-lg-2 col-form-label required fw-semibold fs-6" id="remain_monthly_lab_edit" style="display: none;">Monthly</label>
			<div class="col-lg-4 fv-row" id="remain_monthly_tbox_edit" style="display: none;">
				<div class="d-flex align-items-center">
					<span class="svg-icon position-absolute ms-4 svg-icon-2 dt">
						<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path opacity="0.3" d="M21 22H3C2.4 22 2 21.6 2 21V5C2 4.4 2.4 4 3 4H21C21.6 4 22 4.4 22 5V21C22 21.6 21.6 22 21 22Z" fill="currentColor" />
							<path d="M6 6C5.4 6 5 5.6 5 5V3C5 2.4 5.4 2 6 2C6.6 2 7 2.4 7 3V5C7 5.6 6.6 6 6 6ZM11 5V3C11 2.4 10.6 2 10 2C9.4 2 9 2.4 9 3V5C9 5.6 9.4 6 10 6C10.6 6 11 5.6 11 5ZM15 5V3C15 2.4 14.6 2 14 2C13.4 2 13 2.4 13 3V5C13 5.6 13.4 6 14 6C14.6 6 15 5.6 15 5ZM19 5V3C19 2.4 18.6 2 18 2C17.4 2 17 2.4 17 3V5C17 5.6 17.4 6 18 6C18.6 6 19 5.6 19 5Z" fill="currentColor" />
							<path d="M8.8 13.1C9.2 13.1 9.5 13 9.7 12.8C9.9 12.6 10.1 12.3 10.1 11.9C10.1 11.6 10 11.3 9.8 11.1C9.6 10.9 9.3 10.8 9 10.8C8.8 10.8 8.59999 10.8 8.39999 10.9C8.19999 11 8.1 11.1 8 11.2C7.9 11.3 7.8 11.4 7.7 11.6C7.6 11.8 7.5 11.9 7.5 12.1C7.5 12.2 7.4 12.2 7.3 12.3C7.2 12.4 7.09999 12.4 6.89999 12.4C6.69999 12.4 6.6 12.3 6.5 12.2C6.4 12.1 6.3 11.9 6.3 11.7C6.3 11.5 6.4 11.3 6.5 11.1C6.6 10.9 6.8 10.7 7 10.5C7.2 10.3 7.49999 10.1 7.89999 10C8.29999 9.90003 8.60001 9.80003 9.10001 9.80003C9.50001 9.80003 9.80001 9.90003 10.1 10C10.4 10.1 10.7 10.3 10.9 10.4C11.1 10.5 11.3 10.8 11.4 11.1C11.5 11.4 11.6 11.6 11.6 11.9C11.6 12.3 11.5 12.6 11.3 12.9C11.1 13.2 10.9 13.5 10.6 13.7C10.9 13.9 11.2 14.1 11.4 14.3C11.6 14.5 11.8 14.7 11.9 15C12 15.3 12.1 15.5 12.1 15.8C12.1 16.2 12 16.5 11.9 16.8C11.8 17.1 11.5 17.4 11.3 17.7C11.1 18 10.7 18.2 10.3 18.3C9.9 18.4 9.5 18.5 9 18.5C8.5 18.5 8.1 18.4 7.7 18.2C7.3 18 7 17.8 6.8 17.6C6.6 17.4 6.4 17.1 6.3 16.8C6.2 16.5 6.10001 16.3 6.10001 16.1C6.10001 15.9 6.2 15.7 6.3 15.6C6.4 15.5 6.6 15.4 6.8 15.4C6.9 15.4 7.00001 15.4 7.10001 15.5C7.20001 15.6 7.3 15.6 7.3 15.7C7.5 16.2 7.7 16.6 8 16.9C8.3 17.2 8.6 17.3 9 17.3C9.2 17.3 9.5 17.2 9.7 17.1C9.9 17 10.1 16.8 10.3 16.6C10.5 16.4 10.5 16.1 10.5 15.8C10.5 15.3 10.4 15 10.1 14.7C9.80001 14.4 9.50001 14.3 9.10001 14.3C9.00001 14.3 8.9 14.3 8.7 14.3C8.5 14.3 8.39999 14.3 8.39999 14.3C8.19999 14.3 7.99999 14.2 7.89999 14.1C7.79999 14 7.7 13.8 7.7 13.7C7.7 13.5 7.79999 13.4 7.89999 13.2C7.99999 13 8.2 13 8.5 13H8.8V13.1ZM15.3 17.5V12.2C14.3 13 13.6 13.3 13.3 13.3C13.1 13.3 13 13.2 12.9 13.1C12.8 13 12.7 12.8 12.7 12.6C12.7 12.4 12.8 12.3 12.9 12.2C13 12.1 13.2 12 13.6 11.8C14.1 11.6 14.5 11.3 14.7 11.1C14.9 10.9 15.2 10.6 15.5 10.3C15.8 10 15.9 9.80003 15.9 9.70003C15.9 9.60003 16.1 9.60004 16.3 9.60004C16.5 9.60004 16.7 9.70003 16.8 9.80003C16.9 9.90003 17 10.2 17 10.5V17.2C17 18 16.7 18.4 16.2 18.4C16 18.4 15.8 18.3 15.6 18.2C15.4 18.1 15.3 17.8 15.3 17.5Z" fill="currentColor" />
						</svg>
					</span>
					<input class="form-control form-control-solid ps-12" name="remainder_monthly_edit" id="remainder_monthly_edit" />
				</div>
				<div class="fv-plugins-message-container invalid-feedback" id="allocatedto_edit_err"></div>
			</div>
			<label class="col-lg-2 col-form-label required fw-semibold fs-6" id="remain_spec_dt_lab_edit" style="display: none;">Spec.Date</label>
			<div class="col-lg-4 fv-row" id="remain_spec_dt_tbox_edit" style="display: none;">
				<div class="d-flex align-items-center">
					<span class="svg-icon position-absolute ms-4 svg-icon-2 dt">
						<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path opacity="0.3" d="M21 22H3C2.4 22 2 21.6 2 21V5C2 4.4 2.4 4 3 4H21C21.6 4 22 4.4 22 5V21C22 21.6 21.6 22 21 22Z" fill="currentColor" />
							<path d="M6 6C5.4 6 5 5.6 5 5V3C5 2.4 5.4 2 6 2C6.6 2 7 2.4 7 3V5C7 5.6 6.6 6 6 6ZM11 5V3C11 2.4 10.6 2 10 2C9.4 2 9 2.4 9 3V5C9 5.6 9.4 6 10 6C10.6 6 11 5.6 11 5ZM15 5V3C15 2.4 14.6 2 14 2C13.4 2 13 2.4 13 3V5C13 5.6 13.4 6 14 6C14.6 6 15 5.6 15 5ZM19 5V3C19 2.4 18.6 2 18 2C17.4 2 17 2.4 17 3V5C17 5.6 17.4 6 18 6C18.6 6 19 5.6 19 5Z" fill="currentColor" />
							<path d="M8.8 13.1C9.2 13.1 9.5 13 9.7 12.8C9.9 12.6 10.1 12.3 10.1 11.9C10.1 11.6 10 11.3 9.8 11.1C9.6 10.9 9.3 10.8 9 10.8C8.8 10.8 8.59999 10.8 8.39999 10.9C8.19999 11 8.1 11.1 8 11.2C7.9 11.3 7.8 11.4 7.7 11.6C7.6 11.8 7.5 11.9 7.5 12.1C7.5 12.2 7.4 12.2 7.3 12.3C7.2 12.4 7.09999 12.4 6.89999 12.4C6.69999 12.4 6.6 12.3 6.5 12.2C6.4 12.1 6.3 11.9 6.3 11.7C6.3 11.5 6.4 11.3 6.5 11.1C6.6 10.9 6.8 10.7 7 10.5C7.2 10.3 7.49999 10.1 7.89999 10C8.29999 9.90003 8.60001 9.80003 9.10001 9.80003C9.50001 9.80003 9.80001 9.90003 10.1 10C10.4 10.1 10.7 10.3 10.9 10.4C11.1 10.5 11.3 10.8 11.4 11.1C11.5 11.4 11.6 11.6 11.6 11.9C11.6 12.3 11.5 12.6 11.3 12.9C11.1 13.2 10.9 13.5 10.6 13.7C10.9 13.9 11.2 14.1 11.4 14.3C11.6 14.5 11.8 14.7 11.9 15C12 15.3 12.1 15.5 12.1 15.8C12.1 16.2 12 16.5 11.9 16.8C11.8 17.1 11.5 17.4 11.3 17.7C11.1 18 10.7 18.2 10.3 18.3C9.9 18.4 9.5 18.5 9 18.5C8.5 18.5 8.1 18.4 7.7 18.2C7.3 18 7 17.8 6.8 17.6C6.6 17.4 6.4 17.1 6.3 16.8C6.2 16.5 6.10001 16.3 6.10001 16.1C6.10001 15.9 6.2 15.7 6.3 15.6C6.4 15.5 6.6 15.4 6.8 15.4C6.9 15.4 7.00001 15.4 7.10001 15.5C7.20001 15.6 7.3 15.6 7.3 15.7C7.5 16.2 7.7 16.6 8 16.9C8.3 17.2 8.6 17.3 9 17.3C9.2 17.3 9.5 17.2 9.7 17.1C9.9 17 10.1 16.8 10.3 16.6C10.5 16.4 10.5 16.1 10.5 15.8C10.5 15.3 10.4 15 10.1 14.7C9.80001 14.4 9.50001 14.3 9.10001 14.3C9.00001 14.3 8.9 14.3 8.7 14.3C8.5 14.3 8.39999 14.3 8.39999 14.3C8.19999 14.3 7.99999 14.2 7.89999 14.1C7.79999 14 7.7 13.8 7.7 13.7C7.7 13.5 7.79999 13.4 7.89999 13.2C7.99999 13 8.2 13 8.5 13H8.8V13.1ZM15.3 17.5V12.2C14.3 13 13.6 13.3 13.3 13.3C13.1 13.3 13 13.2 12.9 13.1C12.8 13 12.7 12.8 12.7 12.6C12.7 12.4 12.8 12.3 12.9 12.2C13 12.1 13.2 12 13.6 11.8C14.1 11.6 14.5 11.3 14.7 11.1C14.9 10.9 15.2 10.6 15.5 10.3C15.8 10 15.9 9.80003 15.9 9.70003C15.9 9.60003 16.1 9.60004 16.3 9.60004C16.5 9.60004 16.7 9.70003 16.8 9.80003C16.9 9.90003 17 10.2 17 10.5V17.2C17 18 16.7 18.4 16.2 18.4C16 18.4 15.8 18.3 15.6 18.2C15.4 18.1 15.3 17.8 15.3 17.5Z" fill="currentColor" />
						</svg>
					</span>
					<input class="form-control form-control-solid ps-12" name="remainder_speicific_date_edit" placeholder="Schedule Date" id="remainder_speicific_date_edit" value="10-09-2023"/>
				</div>
				<div class="fv-plugins-message-container invalid-feedback" id="allocatedto_edit_err"></div>
			</div>
			<label class="col-lg-2 col-form-label required fw-semibold fs-6" id="remain_weekly_day_lab_edit" style="display:none;">Day</label>
			<div class="col-lg-4 fv-row" id="remain_weekly_day_tbox_edit" style="display:none;">
				<select class="form-select form-select-solid" name="weekdays_edit[]" id="weekdays_edit" data-control="select2" data-hide-search="false" data-dropdown-parent="#kt_modal_edit_remainder" multiple="multiple" data-placeholder="Select">
					<option value="0">All</option>
					<option value="1">Sunday</option>
					<option value="2">Monday</option>
					<option value="3">Tuesday</option>
					<option value="4">Wednesday</option>
					<option value="5">Thursday</option>
					<option value="6">Friday</option>
					<option value="7">Saturday</option>
				</select>
				
				<div class="fv-plugins-message-container invalid-feedback" id="weekdays_edit_err"></div>
			</div>
			<label class="col-lg-2 col-form-label required fw-semibold fs-6" id="remain_weekly_time_lab_edit" style="display: none;">Weekly</label>
			<div class="col-lg-4 fv-row" id="remain_weekly_time_tbox_edit" style="display: none;">
				<div class="d-flex align-items-center">
					<span class="svg-icon position-absolute ms-4 svg-icon-2 dt">
						<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path opacity="0.3" d="M21 22H3C2.4 22 2 21.6 2 21V5C2 4.4 2.4 4 3 4H21C21.6 4 22 4.4 22 5V21C22 21.6 21.6 22 21 22Z" fill="currentColor" />
							<path d="M6 6C5.4 6 5 5.6 5 5V3C5 2.4 5.4 2 6 2C6.6 2 7 2.4 7 3V5C7 5.6 6.6 6 6 6ZM11 5V3C11 2.4 10.6 2 10 2C9.4 2 9 2.4 9 3V5C9 5.6 9.4 6 10 6C10.6 6 11 5.6 11 5ZM15 5V3C15 2.4 14.6 2 14 2C13.4 2 13 2.4 13 3V5C13 5.6 13.4 6 14 6C14.6 6 15 5.6 15 5ZM19 5V3C19 2.4 18.6 2 18 2C17.4 2 17 2.4 17 3V5C17 5.6 17.4 6 18 6C18.6 6 19 5.6 19 5Z" fill="currentColor" />
							<path d="M8.8 13.1C9.2 13.1 9.5 13 9.7 12.8C9.9 12.6 10.1 12.3 10.1 11.9C10.1 11.6 10 11.3 9.8 11.1C9.6 10.9 9.3 10.8 9 10.8C8.8 10.8 8.59999 10.8 8.39999 10.9C8.19999 11 8.1 11.1 8 11.2C7.9 11.3 7.8 11.4 7.7 11.6C7.6 11.8 7.5 11.9 7.5 12.1C7.5 12.2 7.4 12.2 7.3 12.3C7.2 12.4 7.09999 12.4 6.89999 12.4C6.69999 12.4 6.6 12.3 6.5 12.2C6.4 12.1 6.3 11.9 6.3 11.7C6.3 11.5 6.4 11.3 6.5 11.1C6.6 10.9 6.8 10.7 7 10.5C7.2 10.3 7.49999 10.1 7.89999 10C8.29999 9.90003 8.60001 9.80003 9.10001 9.80003C9.50001 9.80003 9.80001 9.90003 10.1 10C10.4 10.1 10.7 10.3 10.9 10.4C11.1 10.5 11.3 10.8 11.4 11.1C11.5 11.4 11.6 11.6 11.6 11.9C11.6 12.3 11.5 12.6 11.3 12.9C11.1 13.2 10.9 13.5 10.6 13.7C10.9 13.9 11.2 14.1 11.4 14.3C11.6 14.5 11.8 14.7 11.9 15C12 15.3 12.1 15.5 12.1 15.8C12.1 16.2 12 16.5 11.9 16.8C11.8 17.1 11.5 17.4 11.3 17.7C11.1 18 10.7 18.2 10.3 18.3C9.9 18.4 9.5 18.5 9 18.5C8.5 18.5 8.1 18.4 7.7 18.2C7.3 18 7 17.8 6.8 17.6C6.6 17.4 6.4 17.1 6.3 16.8C6.2 16.5 6.10001 16.3 6.10001 16.1C6.10001 15.9 6.2 15.7 6.3 15.6C6.4 15.5 6.6 15.4 6.8 15.4C6.9 15.4 7.00001 15.4 7.10001 15.5C7.20001 15.6 7.3 15.6 7.3 15.7C7.5 16.2 7.7 16.6 8 16.9C8.3 17.2 8.6 17.3 9 17.3C9.2 17.3 9.5 17.2 9.7 17.1C9.9 17 10.1 16.8 10.3 16.6C10.5 16.4 10.5 16.1 10.5 15.8C10.5 15.3 10.4 15 10.1 14.7C9.80001 14.4 9.50001 14.3 9.10001 14.3C9.00001 14.3 8.9 14.3 8.7 14.3C8.5 14.3 8.39999 14.3 8.39999 14.3C8.19999 14.3 7.99999 14.2 7.89999 14.1C7.79999 14 7.7 13.8 7.7 13.7C7.7 13.5 7.79999 13.4 7.89999 13.2C7.99999 13 8.2 13 8.5 13H8.8V13.1ZM15.3 17.5V12.2C14.3 13 13.6 13.3 13.3 13.3C13.1 13.3 13 13.2 12.9 13.1C12.8 13 12.7 12.8 12.7 12.6C12.7 12.4 12.8 12.3 12.9 12.2C13 12.1 13.2 12 13.6 11.8C14.1 11.6 14.5 11.3 14.7 11.1C14.9 10.9 15.2 10.6 15.5 10.3C15.8 10 15.9 9.80003 15.9 9.70003C15.9 9.60003 16.1 9.60004 16.3 9.60004C16.5 9.60004 16.7 9.70003 16.8 9.80003C16.9 9.90003 17 10.2 17 10.5V17.2C17 18 16.7 18.4 16.2 18.4C16 18.4 15.8 18.3 15.6 18.2C15.4 18.1 15.3 17.8 15.3 17.5Z" fill="currentColor" />
						</svg>
					</span>
					<input class="form-control form-control-solid ps-12" name="remainder_weekly_time_edit" id="remainder_weekly_time_edit" />
				</div>
				<div class="fv-plugins-message-container invalid-feedback" id="allocatedto_edit_err"></div>
			</div>
		</div>
		<div class="row">
			<label class="col-lg-2 col-form-label required fw-semibold fs-6">Description</label>
			<div class="col-lg-10 fv-row">
				<textarea class="form-control form-control-solid" rows="3" placeholder="Enter Description" name="remainder_desc" id="remainder_desc"><?php echo $edit->description?$edit->description:'-'; ?></textarea>
				<div class="fv-plugins-message-container invalid-feedback" id="remainder_desc_err"></div>
			</div>
		</div>
		<div class="d-flex justify-content-end align-items-center mt-6">
			<button type="reset" class="btn btn-secondary me-3" data-bs-dismiss="modal">Cancel</button>
			<button type="button" class="btn btn-primary" data-bs-dismiss="modal" id="edit_submit_btn">Update</button>
		</div>
	</form>
</div>

<input type="hidden" id="baseurl" value="<?php echo base_url();?>">
<?php $this->load->view("script.php");?>
<script src="<?php echo base_url(); ?>assets/plugins/custom/fslightbox/fslightbox.bundle.js"></script>

    
		
	
						<script> 
								function  editvalidation(){
									var err = 0;

									var remainder_date_edit      = $('#remainder_date_edit').val();
									var remain_type_edit         = $('#remain_type_edit').val();
									var allocatedto_edit         = $('#allocatedto_edit').val();
									var remainder_desc             = $('#remainder_desc').val();
									var recur_type                 = $('#recur_type').val();
									var remainder_daily_edit       = $('#remainder_daily_edit').val();
									var remainder_monthly          = $('#remainder_monthly').val();
									var remainder_speicific_date   = $('#remainder_speicific_date').val();
									var remainder_weekly_time      = $('#remainder_weekly_time').val();
									var weekdays                   = $('#weekdays').val();

										if(remainder_date_edit.trim()==""){
										
											$('#remainder_date_edit_err').html('Select Date is Required..!');		

											err++;
										}
										else{
											$('#remainder_date_edit_err').html('');
										}

										if (err==0) {
											if(remain_type_edit.trim()==""){

												$('#remain_type_edit_err').html('Select Type is Required..!');		

												err++;
											}
											else{
												$('#remain_type_edit_err').html('');
											}

										}
										if (err==0) {
											if (remain_type_edit==2) {

												if(allocatedto_edit==""){
												$('#allocatedto_edit_err').html('Select Allocated To is Required..!');		

													err++;
												}
												else{
													$('#allocatedto_edit_err').html('');
												}

											}
										}
										if (err==0) {	
											if(recur_type.trim()==""){
												$('#recur_type_err').html('Select Recurring is Required..!');		

												err++;
											}
											else{
												$('#recur_type_err').html('');
											}
										}
										
										if (err==0) {
											if (recur_type==1) {
												if(remainder_daily_edit.trim()==""){
													$('#remainder_daily_edit_err').html('Select daily time is Required..!');		

													err++;
												}
												else{
													$('#remainder_daily_edit_err').html('');
												}
											}
										}
										if (err==0) {
											if (recur_type==2) {

												if(weekdays==""){

													$('#weekdays_err').html('Select weekly days is Required..!');		

													err++;
												}
												else{
													$('#weekdays_err').html('');
												}

												if(remainder_weekly_time.trim()==""){
													$('#remainder_weekly_time_err').html('Select weekly time is Required..!');		

													err++;
												}
												else{
													$('#remainder_weekly_time_err').html('');
												}

												
											}
										}
										if (err==0) {
											if (recur_type==3) {
												if(remainder_monthly.trim()==""){
													$('#remainder_monthly_err').html('Select  monthly date & time is Required..!');		

													err++;
												}
												else{
													$('#remainder_monthly_err').html('');
												}
											}
										}
										if (err==0) {
											if (recur_type==4) {
												if(remainder_speicific_date.trim()==""){
													$('#remainder_speicific_date_err').html('Select Speicific Date is Required..!');		

													err++;
												}
												else{
													$('#remainder_speicific_date_err').html('');
												}
											}
										}
										
										
										if (err==0) {
											if(remainder_desc.trim()==""){
												$('#remainder_desc_err').html('Enter Description is Required..!');		

												err++;
											}
											else{
												$('#remainder_desc_err').html('');
											}
										}

										// alert(err)
										if (err>0) { return false; }
										else{ 

											  $("#remainderedit_form").submit();
											  $('#edit_submit_btn').prop('disabled', true);
											  e.preventDefault();						
											  return true;
										} 

								}
							</script>
						</div>
					</div>
				</div>
				<!--end::Modal dialog-->
			</div>
		</div>
		<!--end::Modal - New Remainder -->

		<!--begin::Modal - Delete Remainder-->
		<div class="modal fade" id="kt_modal_delete_remainder" tabindex="-1" aria-hidden="true" data-bs-keyboard="false" data-bs-backdrop="static">
			<!--begin::Modal dialog-->
			<div class="modal-dialog modal-m">
				<!--begin::Modal content-->
				<div class="modal-content rounded">
					<div class="swal2-icon swal2-warning swal2-icon-show" style="display:flex;">
						<div class="swal2-icon-content">?</div></div>
						<div class="swal2-html-container" id="swal2-html-container" style="display: block;">Are you sure you want to Delete This Remainder?</div>
						<div class="d-flex flex-center flex-row-fluid pt-12">
							<input type="hidden" name="deleteid_hidden" id="deleteid_hidden">
							<button type="submit" class="btn btn-primary me-3" id="delsubmit">Confirm</button>
							<button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
						</div><br><br>
				</div>
				<!--end::Modal content-->
			</div>
			<!--end::Modal dialog-->
		</div>
		<!--end::Modal - Delete Remainder-->

		
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
	    <input type="hidden" id="baseurl" value="<?php echo base_url(); ?>">
		<?php $this->load->view("script.php");?>

		<script>	
			<?php if($this->session->flashdata('g_success') || $this->session->flashdata('g_err')){?> 
			    $(document).ready( function() {
		        document.getElementById("pop_up_success").click()
		        });
		    <?php } ?>
	    </script>

	    <script>
		rem_type_func_edit()
			function rem_type_func_edit()
			{
				var remain_type_edit = document.getElementById("remain_type_edit").value;
				var remain_type_lab_edit = document.getElementById("remain_type_lab_edit");
				var remain_type_tbox_edit = document.getElementById("remain_type_tbox_edit");

				if (remain_type_edit == 1) 
				{
					remain_type_lab_edit.style.display="none";
					remain_type_tbox_edit.style.display="none";
				}
				else if (remain_type_edit == 2) 
				{
					remain_type_lab_edit.style.display="block";
					remain_type_tbox_edit.style.display="block";	
				}
			}
	</script>
	<script>
		recurring_func_edit()
		function recurring_func_edit()
		{
			var recur_type_edit = document.getElementById("recur_type_edit").value;
			var remain_daily_lab_edit = document.getElementById("remain_daily_lab_edit");
			var remain_daily_tbox_edit = document.getElementById("remain_daily_tbox_edit");
			var remain_weekly_day_lab_edit = document.getElementById("remain_weekly_day_lab_edit");
			var remain_weekly_day_tbox_edit = document.getElementById("remain_weekly_day_tbox_edit");
			var remain_weekly_time_lab_edit = document.getElementById("remain_weekly_time_lab_edit");
			var remain_weekly_time_tbox_edit = document.getElementById("remain_weekly_time_tbox_edit");
			var remain_monthly_lab_edit = document.getElementById("remain_monthly_lab_edit");
			var remain_monthly_tbox_edit = document.getElementById("remain_monthly_tbox_edit");
			var remain_spec_dt_lab_edit = document.getElementById("remain_spec_dt_lab_edit");
			var remain_spec_dt_tbox_edit = document.getElementById("remain_spec_dt_tbox_edit");
			
			if (recur_type_edit == 1) 
			{
				remain_daily_lab_edit.style.display="block";
				remain_daily_tbox_edit.style.display="block";
				remain_weekly_day_lab_edit.style.display="none";
				remain_weekly_day_tbox_edit.style.display="none";
				remain_weekly_time_lab_edit.style.display="none";
				remain_weekly_time_tbox_edit.style.display="none";
				
				remain_monthly_lab_edit.style.display="none";
				remain_monthly_tbox_edit.style.display="none";
				remain_spec_dt_lab_edit.style.display="none";
				remain_spec_dt_tbox_edit.style.display="none";
			}
			else if (recur_type_edit == 2) 
			{
				remain_daily_lab_edit.style.display="none";
				remain_daily_tbox_edit.style.display="none";
				remain_weekly_day_lab_edit.style.display="block";
				remain_weekly_day_tbox_edit.style.display="block";
				remain_weekly_time_lab_edit.style.display="block";
				remain_weekly_time_tbox_edit.style.display="block";
				
				remain_monthly_lab_edit.style.display="none";
				remain_monthly_tbox_edit.style.display="none";
				remain_spec_dt_lab_edit.style.display="none";
				remain_spec_dt_tbox_edit.style.display="none";
			}
			else if (recur_type_edit == 3) 
			{
				remain_daily_lab_edit.style.display="none";
				remain_daily_tbox_edit.style.display="none";
				remain_weekly_day_lab_edit.style.display="none";
				remain_weekly_day_tbox_edit.style.display="none";
				remain_weekly_time_lab_edit.style.display="none";
				remain_weekly_time_tbox_edit.style.display="none";
				
				remain_monthly_lab_edit.style.display="block";
				remain_monthly_tbox_edit.style.display="block";
				remain_spec_dt_lab_edit.style.display="none";
				remain_spec_dt_tbox_edit.style.display="none";
			}
			else if (recur_type_edit == 4) 
			{
				remain_daily_lab_edit.style.display="none";
				remain_daily_tbox_edit.style.display="none";
				remain_weekly_day_lab_edit.style.display="none";
				remain_weekly_day_tbox_edit.style.display="none";
				remain_weekly_time_lab_edit.style.display="none";
				remain_weekly_time_tbox_edit.style.display="none";
				
				remain_monthly_lab_edit.style.display="none";
				remain_monthly_tbox_edit.style.display="none";
				remain_spec_dt_lab_edit.style.display="block";
				remain_spec_dt_tbox_edit.style.display="block";
			}

		}
	</script>
	<script>
		 $('#kt_modal_edit_remainder').on('show.bs.modal', function (e) {
			  var daily = {
			      enableTime: true,
			      noCalendar: true,
			      altInput: true,
			      // disable: [rmydays, rmySpecificdays],
			      // minDate: 'today',
			      // maxDate: 'today',
			      defaultDate: "09-10-2023 11:30 AM",
			      // altInput: true,
			      // altFormat: "d-m-Y h:i K"
			      altFormat: "h:i K"
			  };
			var test = flatpickr("#remainder_daily_edit", daily);
			});
	</script>
	
	<script>
		 $('#kt_modal_edit_remainder').on('show.bs.modal', function (e) {
			  var weekly_time = {
			      enableTime: true,
			      noCalendar: true,
			      altInput: true,
			      // minDate: 'today',
			      defaultDate: "10.00 AM",
			      // altInput: true,
			      altFormat: "h:i K"
			  };
			var test = flatpickr("#remainder_weekly_time_edit", weekly_time);
			});
	</script>
	
	<script>
		 $('#kt_modal_edit_remainder').on('show.bs.modal', function (e) {
			  var taskFlatpickrConfig = {
			      enableTime: true,
			      // noCalendar: true,
			      altInput: true,
			      defaultDate: "today",
			      altInput: true,
			      altFormat: "d-m-Y h:i K"
			      // altFormat: "h:i K"
			      // position:"above"
			  };
			  var taskFlatpickrConfig_1 = {
			      // enableTime: true,
			      // noCalendar: true,
			      altInput: true,
			      defaultDate: "today",
			      altInput: true,
			      // altFormat: "d-m-Y h:i K"
			      altFormat: "d-m-Y"
			  };

				var test = flatpickr("#remainder_speicific_date_edit", taskFlatpickrConfig);
			   var test1 = flatpickr("#remainder_date_edit", taskFlatpickrConfig_1);
			});
	</script>
	
						<script>
							 $('#kt_modal_edit_remainder').on('show.bs.modal', function (e) {
								  var monthly = {
								      enableTime: true,
								      // noCalendar: true,
								      altInput: true,
								      // disable: [rmydays, rmySpecificdays],
								      // minDate: 'today',
								      // maxDate: 'today',
								      default: "today",
								      // altInput: true,
								      // altFormat: "10-2023 h:i K"
								      altFormat: "d-m-Y h:i K"
								  };
								var test = flatpickr("#remainder_monthly_edit", monthly);
								});
						</script>

    	<script>
	  		function remainderedit(val) {
	  			var baseurl= $("#baseurl").val();
	  			$.ajax({
							type: "POST",
							url: baseurl+'Remainder/edit',
							async: false,
							type: "POST",
							data: "id="+val,
							dataType: "html",
							success: function(response)
							{

								$('#edit_remainder_model').empty().append(response);
								$('#kt_modal_edit_remainder').addClass('show');
								
							}
							});
			}
	  	</script>
	    <script> 

			function  addvalidation(){
				var err = 0;

				var remainder_date      = $('#remainder_date').val();
				var remain_type         = $('#remain_type').val();
				var allocatedto         = $('#allocatedto').val();
				var remainder_desc      = $('#remainder_desc').val();
				var recur_type          = $('#recur_type').val();
				var remainder_daily            = $('#remainder_daily').val();
				var remainder_monthly          = $('#remainder_monthly').val();
				var remainder_speicific_date   = $('#remainder_speicific_date').val();
				var remainder_weekly_time      = $('#remainder_weekly_time').val();
				var weekdays                   = $('#weekdays').val();

					if(remainder_date.trim()==""){
					
						$('#remainder_date_err').html('Select Date is Required..!');		

						err++;
					}
					else{
						$('#remainder_date_err').html('');
					}

					if (err==0) {
						if(remain_type.trim()==""){

							$('#remain_type_err').html('Select Type is Required..!');		

							err++;
						}
						else{
							$('#remain_type_err').html('');
						}

					}
					if (err==0) {
						if (remain_type==2) {

							if(allocatedto==""){
							$('#allocatedto_err').html('Select Allocated To is Required..!');		

								err++;
							}
							else{
								$('#allocatedto_err').html('');
							}

						}
					}
					if (err==0) {	
						if(recur_type.trim()==""){
							$('#recur_type_err').html('Select Recurring is Required..!');		

							err++;
						}
						else{
							$('#recur_type_err').html('');
						}
					}
					
					if (err==0) {
						if (recur_type==1) {
							if(remainder_daily.trim()==""){
								$('#remainder_daily_err').html('Select daily time is Required..!');		

								err++;
							}
							else{
								$('#remainder_daily_err').html('');
							}
						}
					}
					if (err==0) {
						if (recur_type==2) {

							if(weekdays==""){

								$('#weekdays_err').html('Select weekly days is Required..!');		

								err++;
							}
							else{
								$('#weekdays_err').html('');
							}

							if(remainder_weekly_time.trim()==""){
								$('#remainder_weekly_time_err').html('Select weekly time is Required..!');		

								err++;
							}
							else{
								$('#remainder_weekly_time_err').html('');
							}

							
						}
					}
					if (err==0) {
						if (recur_type==3) {
							if(remainder_monthly.trim()==""){
								$('#remainder_monthly_err').html('Select  monthly date & time is Required..!');		

								err++;
							}
							else{
								$('#remainder_monthly_err').html('');
							}
						}
					}
					if (err==0) {
						if (recur_type==4) {
							if(remainder_speicific_date.trim()==""){
								$('#remainder_speicific_date_err').html('Select Speicific Date is Required..!');		

								err++;
							}
							else{
								$('#remainder_speicific_date_err').html('');
							}
						}
					}
					
					
					if (err==0) {
						if(remainder_desc.trim()==""){
							$('#remainder_desc_err').html('Enter Description is Required..!');		

							err++;
						}
						else{
							$('#remainder_desc_err').html('');
						}
					}

					// alert(err)
					if (err>0) { return false; }
					else{ 

						  $("#remainder_form").submit();
						  $('#submit_btn').prop('disabled', true);
						  e.preventDefault();						
						  return true;
					} 

			}
		</script>
		<script> 
			function  editvalidation(){
				var err = 0;

				var remainder_date_edit      = $('#remainder_date_edit').val();
				var remain_type_edit         = $('#remain_type_edit').val();
				var allocatedto_edit         = $('#allocatedto_edit').val();
				var remainder_desc             = $('#remainder_desc').val();
				var recur_type                 = $('#recur_type').val();
				var remainder_daily_edit       = $('#remainder_daily_edit').val();
				var remainder_monthly          = $('#remainder_monthly').val();
				var remainder_speicific_date   = $('#remainder_speicific_date').val();
				var remainder_weekly_time      = $('#remainder_weekly_time').val();
				var weekdays                   = $('#weekdays').val();

					if(remainder_date_edit.trim()==""){
					
						$('#remainder_date_edit_err').html('Select Date is Required..!');		

						err++;
					}
					else{
						$('#remainder_date_edit_err').html('');
					}

					if (err==0) {
						if(remain_type_edit.trim()==""){

							$('#remain_type_edit_err').html('Select Type is Required..!');		

							err++;
						}
						else{
							$('#remain_type_edit_err').html('');
						}

					}
					if (err==0) {
						if (remain_type_edit==2) {

							if(allocatedto_edit==""){
							$('#allocatedto_edit_err').html('Select Allocated To is Required..!');		

								err++;
							}
							else{
								$('#allocatedto_edit_err').html('');
							}

						}
					}
					if (err==0) {	
						if(recur_type.trim()==""){
							$('#recur_type_err').html('Select Recurring is Required..!');		

							err++;
						}
						else{
							$('#recur_type_err').html('');
						}
					}
					
					if (err==0) {
						if (recur_type==1) {
							if(remainder_daily_edit.trim()==""){
								$('#remainder_daily_edit_err').html('Select daily time is Required..!');		

								err++;
							}
							else{
								$('#remainder_daily_edit_err').html('');
							}
						}
					}
					if (err==0) {
						if (recur_type==2) {

							if(weekdays==""){

								$('#weekdays_err').html('Select weekly days is Required..!');		

								err++;
							}
							else{
								$('#weekdays_err').html('');
							}

							if(remainder_weekly_time.trim()==""){
								$('#remainder_weekly_time_err').html('Select weekly time is Required..!');		

								err++;
							}
							else{
								$('#remainder_weekly_time_err').html('');
							}

							
						}
					}
					if (err==0) {
						if (recur_type==3) {
							if(remainder_monthly.trim()==""){
								$('#remainder_monthly_err').html('Select  monthly date & time is Required..!');		

								err++;
							}
							else{
								$('#remainder_monthly_err').html('');
							}
						}
					}
					if (err==0) {
						if (recur_type==4) {
							if(remainder_speicific_date.trim()==""){
								$('#remainder_speicific_date_err').html('Select Speicific Date is Required..!');		

								err++;
							}
							else{
								$('#remainder_speicific_date_err').html('');
							}
						}
					}
					
					
					if (err==0) {
						if(remainder_desc.trim()==""){
							$('#remainder_desc_err').html('Enter Description is Required..!');		

							err++;
						}
						else{
							$('#remainder_desc_err').html('');
						}
					}

					// alert(err)
					if (err>0) { return false; }
					else{ 

						  $("#remainderedit_form").submit();
						  $('#edit_submit_btn').prop('disabled', true);
						  e.preventDefault();						
						  return true;
					} 

			}
		</script>

    	<script>

			function remainderdelete(id) {

				$('#deleteid_hidden').val(id);

			}
			// delete ajax
				$(document).ready(function() {
				  $("#delsubmit").click(function() {
				    var del_id = $('#deleteid_hidden').val();
				    var baseurl= $("#baseurl").val();
				    if (del_id!='') {
					    $.ajax({
							type: "POST",
							url: baseurl+'Remainder/delete',
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
		var baseurl= $("#baseurl").val();
		function activeunactive(val,ival) {
				var unactive;
				var unactv;
				
				var a = $("#activeunactive_"+ival).val();
				if(a=='0') {
					unactive='1';
					unactv="Active"
				}
				else{
					unactive='0';
					unactv="In-Active"
				}
				var datastring="id="+val+"&status="+unactive;
				$.ajax({
					type:"POST",
					url:baseurl+'Remainder/active_unactive',
					data:datastring,
					cache: false,
					dataType: "html",
					success: function(result){

						if(a=='0'){
				         $("#active_item_master").css('display','block');
							   $("#active_item_master").addClass('response');
				        }else{
				         $("#deactive_item_master").css('display','block');
							   $("#deactive_item_master").addClass('response');
				        }      
			            setTimeout(function() {
				        	 location.reload();
				        }, 2000);
					}
				});
			}	

		function rem_type_func()
		{
			var remain_type = document.getElementById("remain_type").value;
			var remain_type_lab = document.getElementById("remain_type_lab");
			var remain_type_tbox = document.getElementById("remain_type_tbox");

			if (remain_type == 1) 
			{
				remain_type_lab.style.display="none";
				remain_type_tbox.style.display="none";
			}
			else if(remain_type == 2)
			{
				remain_type_lab.style.display="block";
				remain_type_tbox.style.display="block";	
			}
		}
	</script>
	<script>
		function recurring_func()
		{
			var recur_type = document.getElementById("recur_type").value;
			var remain_daily_lab = document.getElementById("remain_daily_lab");
			var remain_daily_tbox = document.getElementById("remain_daily_tbox");
			var remain_weekly_day_lab = document.getElementById("remain_weekly_day_lab");
			var remain_weekly_day_tbox = document.getElementById("remain_weekly_day_tbox");
			var remain_weekly_time_lab = document.getElementById("remain_weekly_time_lab");
			var remain_weekly_time_tbox = document.getElementById("remain_weekly_time_tbox");
			var remain_monthly_lab = document.getElementById("remain_monthly_lab");
			var remain_monthly_tbox = document.getElementById("remain_monthly_tbox");
			var remain_spec_dt_lab = document.getElementById("remain_spec_dt_lab");
			var remain_spec_dt_tbox = document.getElementById("remain_spec_dt_tbox");
			
			if (recur_type == 1) 
			{
				remain_daily_lab.style.display="block";
				remain_daily_tbox.style.display="block";
				remain_weekly_day_lab.style.display="none";
				remain_weekly_day_tbox.style.display="none";
				remain_weekly_time_lab.style.display="none";
				remain_weekly_time_tbox.style.display="none";
				
				remain_monthly_lab.style.display="none";
				remain_monthly_tbox.style.display="none";
				remain_spec_dt_lab.style.display="none";
				remain_spec_dt_tbox.style.display="none";
			}
			else if (recur_type == 2) 
			{
				remain_daily_lab.style.display="none";
				remain_daily_tbox.style.display="none";
				remain_weekly_day_lab.style.display="block";
				remain_weekly_day_tbox.style.display="block";
				remain_weekly_time_lab.style.display="block";
				remain_weekly_time_tbox.style.display="block";
				
				remain_monthly_lab.style.display="none";
				remain_monthly_tbox.style.display="none";
				remain_spec_dt_lab.style.display="none";
				remain_spec_dt_tbox.style.display="none";
			}
			else if (recur_type == 3) 
			{
				remain_daily_lab.style.display="none";
				remain_daily_tbox.style.display="none";
				remain_weekly_day_lab.style.display="none";
				remain_weekly_day_tbox.style.display="none";
				remain_weekly_time_lab.style.display="none";
				remain_weekly_time_tbox.style.display="none";
				remain_monthly_lab.style.display="block";
				remain_monthly_tbox.style.display="block";
				remain_spec_dt_lab.style.display="none";
				remain_spec_dt_tbox.style.display="none";
			}
			else if(recur_type == 4) 
			{
				remain_daily_lab.style.display="none";
				remain_daily_tbox.style.display="none";
				remain_weekly_day_lab.style.display="none";
				remain_weekly_day_tbox.style.display="none";
				remain_weekly_time_lab.style.display="none";
				remain_weekly_time_tbox.style.display="none";
				
				remain_monthly_lab.style.display="none";
				remain_monthly_tbox.style.display="none";
				remain_spec_dt_lab.style.display="block";
				remain_spec_dt_tbox.style.display="block";
			}

		}
	</script>
	
	<!-- <script>
		function recurring_func()
		{
			var recur_type = document.getElementById("recur_type").value;
			var remain_daily_lab = document.getElementById("remain_daily_lab");
			var remain_daily_tbox = document.getElementById("remain_daily_tbox");
			var remain_weekly_time_lab = document.getElementById("remain_weekly_time_lab");
			var remain_weekly_time_tbox = document.getElementById("remain_weekly_time_tbox");
			var remain_weekly_from_lab = document.getElementById("remain_weekly_from_lab");
			var remain_weekly_from_tbox = document.getElementById("remain_weekly_from_tbox");
			var remain_weekly_to_lab = document.getElementById("remain_weekly_to_lab");
			var remain_weekly_to_tbox = document.getElementById("remain_weekly_to_tbox");
			var remain_monthly_lab = document.getElementById("remain_monthly_lab");
			var remain_monthly_tbox = document.getElementById("remain_monthly_tbox");
			var remain_spec_dt_lab = document.getElementById("remain_spec_dt_lab");
			var remain_spec_dt_tbox = document.getElementById("remain_spec_dt_tbox");
			
			if (recur_type == "daily") 
			{
				remain_daily_lab.style.display="block";
				remain_daily_tbox.style.display="block";
				remain_weekly_time_lab.style.display="none";
				remain_weekly_time_tbox.style.display="none";
				remain_weekly_from_lab.style.display="none";
				remain_weekly_from_tbox.style.display="none";
				remain_weekly_to_lab.style.display="none";
				remain_weekly_to_tbox.style.display="none";
				remain_monthly_lab.style.display="none";
				remain_monthly_tbox.style.display="none";
				remain_spec_dt_lab.style.display="none";
				remain_spec_dt_tbox.style.display="none";
			}
			else if (recur_type == "weekly") 
			{
				remain_daily_lab.style.display="none";
				remain_daily_tbox.style.display="none";
				remain_weekly_time_lab.style.display="block";
				remain_weekly_time_tbox.style.display="block";
				remain_weekly_from_lab.style.display="block";
				remain_weekly_from_tbox.style.display="block";
				remain_weekly_to_lab.style.display="block";
				remain_weekly_to_tbox.style.display="block";
				remain_monthly_lab.style.display="none";
				remain_monthly_tbox.style.display="none";
				remain_spec_dt_lab.style.display="none";
				remain_spec_dt_tbox.style.display="none";
			}
			else if (recur_type == "monthly") 
			{
				remain_daily_lab.style.display="none";
				remain_daily_tbox.style.display="none";
				remain_weekly_time_lab.style.display="none";
				remain_weekly_time_tbox.style.display="none";
				remain_weekly_from_lab.style.display="none";
				remain_weekly_from_tbox.style.display="none";
				remain_weekly_to_lab.style.display="none";
				remain_weekly_to_tbox.style.display="none";
				remain_monthly_lab.style.display="block";
				remain_monthly_tbox.style.display="block";
				remain_spec_dt_lab.style.display="none";
				remain_spec_dt_tbox.style.display="none";
			}
			else
			{
				remain_daily_lab.style.display="none";
				remain_daily_tbox.style.display="none";
				remain_weekly_time_lab.style.display="none";
				remain_weekly_time_tbox.style.display="none";
				remain_weekly_from_lab.style.display="none";
				remain_weekly_from_tbox.style.display="none";
				remain_weekly_to_lab.style.display="none";
				remain_weekly_to_tbox.style.display="none";
				remain_monthly_lab.style.display="none";
				remain_monthly_tbox.style.display="none";
				remain_spec_dt_lab.style.display="block";
				remain_spec_dt_tbox.style.display="block";
			}

		}
	</script> -->
	<script>
		 $('#kt_modal_new_remainder').on('show.bs.modal', function (e) {
			  var daily = {
			      enableTime: true,
			      noCalendar: true,
			      altInput: true,
			      // disable: [rmydays, rmySpecificdays],
			      // minDate: 'today',
			      // maxDate: 'today',
			      defaultDate: "09-10-2023 11:30 AM",
			      // altInput: true,
			      // altFormat: "d-m-Y h:i K"
			      altFormat: "h:i K"
			  };
			var test = flatpickr("#remainder_daily", daily);
			});
	</script>
	
	<!-- <script>
		 $('#kt_modal_new_remainder').on('show.bs.modal', function (e) {
			  var weekly = {
			      // enableTime: true,
			      altInput: true,
			      minDate: 'today',
			      defaultDate: "2023-10-09",
			      // altInput: true,
			      altFormat: "d-m-Y"
			  };
			var test = flatpickr("#remainder_weekly_from", weekly);
			});
	</script> -->
	<script>
		 $('#kt_modal_new_remainder').on('show.bs.modal', function (e) {
			  var weekly_time = {
			      enableTime: true,
			      noCalendar: true,
			      altInput: true,
			      // minDate: 'today',
			      defaultDate: "10.00 AM",
			      // altInput: true,
			      altFormat: "h:i K"
			  };
			var test = flatpickr("#remainder_weekly_time", weekly_time);
			});
	</script>
	
	<script>
		 $('#kt_modal_new_remainder').on('show.bs.modal', function (e) {
			  var taskFlatpickrConfig = {
			      enableTime: true,
			      // noCalendar: true,
			      altInput: true,
			      defaultDate: "today",
			      altInput: true,
			      altFormat: "d-m-Y h:i K"
			      // altFormat: "h:i K"
			      // position:"above"
			  };
			  var taskFlatpickrConfig_1 = {
			      // enableTime: true,
			      // noCalendar: true,
			      altInput: true,
			      defaultDate: "today",
			      altInput: true,
			      // altFormat: "d-m-Y h:i K"
			      // maxDate:"today",
			      altFormat: "d-m-Y"
			  };

				var test = flatpickr("#remainder_speicific_date", taskFlatpickrConfig);
			   var test1 = flatpickr("#remainder_date", taskFlatpickrConfig_1);
			});
	</script>
	
	<script>
		 $('#kt_modal_new_remainder').on('show.bs.modal', function (e) {
			  var monthly = {
			      enableTime: true,
			      // noCalendar: true,
			      altInput: true,
			      // disable: [rmydays, rmySpecificdays],
			      // minDate: 'today',
			      // maxDate: 'today',
			      default: "today",
			      // altInput: true,
			      // altFormat: "10-2023 h:i K"
			      altFormat: "d-m-Y h:i K"
			  };
			var test = flatpickr("#remainder_monthly", monthly);
			});
	</script>
	
		<script>
	      $("#kt_datatable_loan_od").kendoTooltip({
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
			$("#kt_datatable_loan_od").DataTable({
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
			// $('#kt_datatable_loan_od').wrap('<div class="dataTables_scroll" />');
		</script>
	</body>
	<!--end::Body-->
	</html>