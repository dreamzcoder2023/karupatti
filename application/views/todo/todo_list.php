<?php $this->load->view("common.php");?>
<style>
	.dataTables_scroll
    {
        position: relative;
        overflow: auto;
        min-height: 300px;
        max-height: 300px;/*the maximum height you want to achieve*/
        width: 100%;
    }
  .dataTables_scroll thead{
    position: -webkit-sticky;
    position: sticky;
    top: 0;
    background-color: #ec9629 !important;
    z-index: 2;
  }
  .card-sub {
    cursor: move;
    /*border: none;
    -webkit-box-shadow: 0 0 1px 2px rgba(0, 0, 0, 0.05), 0 -2px 1px -2px rgba(0, 0, 0, 0.04), 0 0 0 -1px rgba(0, 0, 0, 0.05);
    box-shadow: 0 0 1px 2px rgba(0, 0, 0, 0.05), 0 -2px 1px -2px rgba(0, 0, 0, 0.04), 0 0 0 -1px rgba(0, 0, 0, 0.05)*/
	}
	.k-tooltip-content
	{
		min-width: 150px !important;
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
									<h1 class="d-flex align-items-center text-dark fw-bold my-1 fs-3">To Do List
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
											<div class="d-flex justify-content-end align-items-center">
												<button type="submit" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_new_todo">New To Do</button>
											</div>
											<div class="row">
												<div class="col-lg-6">
													<div class="row">
														<label class="col-lg-12 col-form-label fw-bold fs-2 text-center">Incomplete To Do's</label>
														<div class="col-lg-12">
															<form id="full_complete_form" method="post" >
																	<input type="hidden" name="completedesc" id="completedesc" value="">
															<table class="table align-middle table-row-dashed table-striped table-hover fs-7 gy-1 gs-2" id="unfinished_to_do_table">
																<!--begin::Table head-->
																<thead>
																	<tr class="text-start text-muted fw-bold fs-7 gs-0 gy-2">
																		<!-- <th class="min-w-25px"></th> -->
																		<th class="min-w-80px d-flex align-items-center">
																			<input class="form-check-input me-1" type="checkbox"  id="incomp_todo_checkall">
																			<span class="fs-7">Select</span>
															      </th>
																		<th class="min-w-50px">Type</th>
																		<th class="min-w-150px">Incomplete</th>
																		<th class="min-w-80px">Allocated To</th>
																		<th class="min-w-80px"><span class="text-end">Actions</span></th>
																	</tr>
																</thead>
																<!--end::Table head-->
																<!--begin::Table body-->
																<tbody class="text-gray-600 fw-semibold sortable row_position" >
																	<?php if(isset($todoincomplete)){ foreach ($todoincomplete as $i => $iclist) {

																		$yes = 0; // Initialize the variable with a default value

																			if ($iclist['type'] == 1) {
																			    if ($iclist['selfid'] == $_SESSION['USERID']) {
																			        $yes = 1;
																			    }
																			} elseif ($iclist['type'] == 2) {
																			    $staffid = isset($iclist['allocatedto']) ? json_decode($iclist['allocatedto']) : [];
																			    $filteredArray = array_filter($staffid, function ($element) {
																			        return $element == $_SESSION['USERID'];
																			    });

																			    if (!empty($filteredArray)) {
																			        $yes = 1;
																			    }
																			}

																			if ($iclist['created_by'] === $_SESSION['username']) {
																			    $yes = 1;
																			}

																			$currentDateTime = date('Y-m-d H:i:s');
																			if ($iclist['date'] > $currentDateTime) {
																			    $yes = 1;
																			}




																			if ($yes>0) {

																		?>

																		

																	<tr id="<?php echo $iclist['todoid'] ?>">
																		<td>
												            	<input class="form-check-input incomp_todo_chk" type="checkbox"  id="checked<?php echo $i; ?>" name="checked[]" value="<?php echo $iclist['todoid']; ?>">

																			<span class="fw-semibold fs-7"></span>
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
																			<label><?php echo $iclist['description']?$iclist['description']:'-'; ?></label>
																			<label class="d-block">
																				<span class="badge badge-info fs-8"><?php date_default_timezone_set("Asia/Calcutta"); echo date("d-m-Y h:i A",strtotime($iclist['date'])); ?></span>
																			</label>
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
																		<td>
																			<span class="text-end">
																				<a href="javascript:;" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1" data-bs-toggle="modal" data-bs-target="#kt_modal_edit_todo" onclick="todoedit(<?php echo $iclist['todoid']; ?>)">
																					<span class="svg-icon svg-icon-3">
																						<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																							<path opacity="0.3" d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z" fill="currentColor"></path>
																							<path d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z" fill="currentColor"></path>
																						</svg>
																					</span>
																				</a>
																				<a href="javascript:;" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm" data-bs-toggle="modal" data-bs-target="#kt_modal_delete_todo"  onclick="tododelete(<?php echo $iclist['todoid']; ?>)" >
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
														</form>
														</div>
													</div>
												</div>
												<div class="col-lg-6">
													<div class="row">
														<label class="col-lg-12 col-form-label fw-bold fs-2 text-center">Completed To Do's</label>
														<div class="col-lg-12">
															<form id="full_incomplete_form" method="post" >
															<table class="table align-middle table-row-dashed table-striped table-hover fs-7 gy-1 gs-2" id="finished_to_do_table">
																<!--begin::Table head-->
																<thead>
																	<tr class="text-start text-muted fw-bold fs-7 gs-0 gy-2">
																		<!-- <th class="min-w-25px"></th> -->
																		<th class="min-w-80px d-flex align-items-center">
																			<input class="form-check-input me-1" type="checkbox" checked  id="comp_todo_checkall">
																			<span class="fs-7">Unselect</span>
															      </th>
																		<th class="min-w-50px">Type</th>
																		<th class="min-w-125px">complete</th>
																		<th class="min-w-50px">Allocated To</th>
																		<th class="min-w-100px"><span class="text-end">Actions</span></th>
																	</tr>
																</thead>
																<!--end::Table head-->
																<!--begin::Table body-->

																	<tbody class="text-gray-600 fw-semibold sortable rowcompleted_position">
																		<?php if(isset($todocomplete)){ foreach ($todocomplete as $i => $clist) {  

																				$yes = 0; // Initialize the variable with a default value

																				if ($clist['type'] == 1) {
																				    if ($clist['selfid'] == $_SESSION['USERID']) {
																				        $yes = 1;
																				    }
																				} elseif ($clist['type'] == 2) {
																				    $staffid = isset($clist['allocatedto']) ? json_decode($clist['allocatedto']) : [];
																				    $filteredArray = array_filter($staffid, function ($element) {
																				        return $element == $_SESSION['USERID'];
																				    });

																				    if (!empty($filteredArray)) {
																				        $yes = 1;
																				    }
																				}

																				if ($clist['created_by'] === $_SESSION['username']) {
																				    $yes = 1;
																				}

																			if ($yes>0) {
																		?>
																		<tr id="<?php echo $clist['todoid'] ?>">
																			<td>
													            	<input class="form-check-input comp_todo_chk" checked type="checkbox" id="checkednotcom<?php echo $i; ?>" name="checkednotcom[]" value="<?php echo $clist['todoid']; ?>">
													            	<input  type="hidden" id="idget<?php echo $i; ?>" name="idget[]" value="<?php echo $clist['todoid']; ?>">
																				<span class="fw-semibold fs-7"></span>
													            </td>
													            <td>		
												            			<?php 
												            				if($clist['type']==1){
															            		echo "Self";
																            }else{
																            	echo "Others";
																            } 
															            ?>
														          </td>
																			<td class="ple1">
																				<label><del><?php echo $clist['description']?$clist['description']:'-'; ?></del></label>
																				<label class="d-block">
																					<span class="badge badge-info fs-8"><?php date_default_timezone_set("Asia/Calcutta"); echo date("d-m-Y h:i A",strtotime($clist['date'])); ?></span>
																				</label>
																			</td>
																			<td class="ple1">

																				<?php 
												            				if($clist['type']==1){
															            		echo "-";
																            }
																            else{
															            		$users = isset($clist['allocatedto']) ? json_decode($clist['allocatedto']) : [];
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
																			<td>
																				<span class="text-end">
																					<a href="javascript:;" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm" data-bs-toggle="modal" data-bs-target="#kt_modal_view_todo" title="View" onclick="view(<?php echo $clist['todoid']; ?>)">
																						<i class="bi bi-eye-fill eyc"></i>
																					</a>
																					<a href="javascript:;" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1" data-bs-toggle="modal" data-bs-target="#kt_modal_edit_todo" onclick="todoedit(<?php echo $clist['todoid']; ?>)">
																					<span class="svg-icon svg-icon-3">
																						<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																							<path opacity="0.3" d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z" fill="currentColor"></path>
																							<path d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z" fill="currentColor"></path>
																						</svg>
																					</span>
																				</a>
																					<a href="javascript:;" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm" data-bs-toggle="modal" data-bs-target="#kt_modal_delete_todo"  onclick="tododelete(<?php echo $clist['todoid']; ?>,)" >
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
																		<?php $i++; }}} ?>
																	</tbody>
																<!--end::Table body-->
															</table>

															</form>
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
				<?php $this->load->view("footer.php");?>
				</div>
				<!--end::Wrapper-->
			</div>
			<!--end::Page-->
		</div>
		<!--end::Root-->
		<!--begin::Modal - New To Do's -->
		<div class="modal fade" id="kt_modal_new_todo" tabindex="-1" aria-hidden="true" data-bs-keyboard="false" data-bs-backdrop="static">
			<div class="modal-dialog modal-md">
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
							<h1 class="mb-3">New To Do</h1>
						</div>
						<!--  -->
						<form  enctype="multipart/form-data" method="POST"  action="<?php echo base_url(); ?>Todo/add"  onsubmit="return addvalidation();">
							<div class="row">
								<div class="col-lg-4">
									<label class="col-form-label required fw-semibold fs-6">Date</label>
								</div>
								<div class="col-lg-8 fv-row">
									<div class="d-flex align-items-center">
										<span class="svg-icon position-absolute ms-4 svg-icon-2 dt">
											<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
												<path opacity="0.3" d="M21 22H3C2.4 22 2 21.6 2 21V5C2 4.4 2.4 4 3 4H21C21.6 4 22 4.4 22 5V21C22 21.6 21.6 22 21 22Z" fill="currentColor" />
												<path d="M6 6C5.4 6 5 5.6 5 5V3C5 2.4 5.4 2 6 2C6.6 2 7 2.4 7 3V5C7 5.6 6.6 6 6 6ZM11 5V3C11 2.4 10.6 2 10 2C9.4 2 9 2.4 9 3V5C9 5.6 9.4 6 10 6C10.6 6 11 5.6 11 5ZM15 5V3C15 2.4 14.6 2 14 2C13.4 2 13 2.4 13 3V5C13 5.6 13.4 6 14 6C14.6 6 15 5.6 15 5ZM19 5V3C19 2.4 18.6 2 18 2C17.4 2 17 2.4 17 3V5C17 5.6 17.4 6 18 6C18.6 6 19 5.6 19 5Z" fill="currentColor" />
												<path d="M8.8 13.1C9.2 13.1 9.5 13 9.7 12.8C9.9 12.6 10.1 12.3 10.1 11.9C10.1 11.6 10 11.3 9.8 11.1C9.6 10.9 9.3 10.8 9 10.8C8.8 10.8 8.59999 10.8 8.39999 10.9C8.19999 11 8.1 11.1 8 11.2C7.9 11.3 7.8 11.4 7.7 11.6C7.6 11.8 7.5 11.9 7.5 12.1C7.5 12.2 7.4 12.2 7.3 12.3C7.2 12.4 7.09999 12.4 6.89999 12.4C6.69999 12.4 6.6 12.3 6.5 12.2C6.4 12.1 6.3 11.9 6.3 11.7C6.3 11.5 6.4 11.3 6.5 11.1C6.6 10.9 6.8 10.7 7 10.5C7.2 10.3 7.49999 10.1 7.89999 10C8.29999 9.90003 8.60001 9.80003 9.10001 9.80003C9.50001 9.80003 9.80001 9.90003 10.1 10C10.4 10.1 10.7 10.3 10.9 10.4C11.1 10.5 11.3 10.8 11.4 11.1C11.5 11.4 11.6 11.6 11.6 11.9C11.6 12.3 11.5 12.6 11.3 12.9C11.1 13.2 10.9 13.5 10.6 13.7C10.9 13.9 11.2 14.1 11.4 14.3C11.6 14.5 11.8 14.7 11.9 15C12 15.3 12.1 15.5 12.1 15.8C12.1 16.2 12 16.5 11.9 16.8C11.8 17.1 11.5 17.4 11.3 17.7C11.1 18 10.7 18.2 10.3 18.3C9.9 18.4 9.5 18.5 9 18.5C8.5 18.5 8.1 18.4 7.7 18.2C7.3 18 7 17.8 6.8 17.6C6.6 17.4 6.4 17.1 6.3 16.8C6.2 16.5 6.10001 16.3 6.10001 16.1C6.10001 15.9 6.2 15.7 6.3 15.6C6.4 15.5 6.6 15.4 6.8 15.4C6.9 15.4 7.00001 15.4 7.10001 15.5C7.20001 15.6 7.3 15.6 7.3 15.7C7.5 16.2 7.7 16.6 8 16.9C8.3 17.2 8.6 17.3 9 17.3C9.2 17.3 9.5 17.2 9.7 17.1C9.9 17 10.1 16.8 10.3 16.6C10.5 16.4 10.5 16.1 10.5 15.8C10.5 15.3 10.4 15 10.1 14.7C9.80001 14.4 9.50001 14.3 9.10001 14.3C9.00001 14.3 8.9 14.3 8.7 14.3C8.5 14.3 8.39999 14.3 8.39999 14.3C8.19999 14.3 7.99999 14.2 7.89999 14.1C7.79999 14 7.7 13.8 7.7 13.7C7.7 13.5 7.79999 13.4 7.89999 13.2C7.99999 13 8.2 13 8.5 13H8.8V13.1ZM15.3 17.5V12.2C14.3 13 13.6 13.3 13.3 13.3C13.1 13.3 13 13.2 12.9 13.1C12.8 13 12.7 12.8 12.7 12.6C12.7 12.4 12.8 12.3 12.9 12.2C13 12.1 13.2 12 13.6 11.8C14.1 11.6 14.5 11.3 14.7 11.1C14.9 10.9 15.2 10.6 15.5 10.3C15.8 10 15.9 9.80003 15.9 9.70003C15.9 9.60003 16.1 9.60004 16.3 9.60004C16.5 9.60004 16.7 9.70003 16.8 9.80003C16.9 9.90003 17 10.2 17 10.5V17.2C17 18 16.7 18.4 16.2 18.4C16 18.4 15.8 18.3 15.6 18.2C15.4 18.1 15.3 17.8 15.3 17.5Z" fill="currentColor" />
											</svg>
										</span>
										<input class="form-control form-control-solid ps-12" name="todo_date" placeholder="Schedule Date" id="todo_date" value="<?php echo date("d-m-Y h:i A"); ?>"//>
									</div>
									<div class="fv-plugins-message-container invalid-feedback" id="todo_date_err"></div>
								</div>
								<label class="col-lg-4 col-form-label required fw-semibold fs-6">Type</label>
								<div class="col-lg-8 fv-row">
									<select class="form-select form-select-solid" name="todo_type" id="todo_type" data-control="select2" data-hide-search="false" data-dropdown-parent="#kt_modal_new_todo" onchange="todo_type_func();">
										<option value="">Select Type</option>
										<option value="1">Self</option>
										<option value="2">Others</option>
									</select>
									<div class="fv-plugins-message-container invalid-feedback" id="todo_type_err"></div>
								</div>
								<label class="col-lg-4 col-form-label required fw-semibold fs-6" id="todo_type_lab" style="display:none;">Allocate To</label>
								<div class="col-lg-8 fv-row" id="todo_type_tbox" style="display:none;">
									<select class="form-select form-select-solid" name="allocatedto[]" id="allocatedto" data-control="select2" data-dropdown-parent="#kt_modal_new_todo" data-allow-clear="true" multiple="multiple" data-placeholder="Select Users">

										<?php if (isset($userlist)) {
											foreach ($userlist as $key => $ulist) { 
												if ($ulist['USER_ID']!=$_SESSION['USERID']) {?>
												<option value="<?php echo  $ulist['USER_ID']?$ulist['USER_ID']:''; ?>"><?php echo ucfirst($ulist['STAFFNAME']?$ulist['STAFFNAME']:'-'); ?></option>
												
										<?php } } } ?>
										
									</select>
									<div class="fv-plugins-message-container invalid-feedback" id="allocatedto_err"></div>
								</div>
								<div class="col-lg-12 fv-row">
									<label class="required fw-semibold fs-6">Description</label>
									<textarea class="form-control form-control-solid" rows="5" placeholder="Enter Description" name="toddesc" id="toddesc"></textarea>
									<div class="fv-plugins-message-container invalid-feedback" id="toddesc_err"></div>
								</div>
							</div>
							<div class="d-flex justify-content-center align-items-center mt-6">
								<button type="reset" class="btn btn-secondary me-3" data-bs-dismiss="modal">Cancel</button>
								<button type="submit" class="btn btn-primary">Create To Do</button>
							</div>
						</form>
					</div>
				</div>
				<!--end::Modal dialog-->
			</div>
		</div>
		<!--end::Modal - New To Do's -->

		<!--begin::Modal - Edit To Do's -->
		<div class="modal fade" id="kt_modal_edit_todo" tabindex="-1" aria-hidden="true" data-bs-keyboard="false" data-bs-backdrop="static">
			<div class="modal-dialog modal-md">
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
							<h1 class="mb-3">Modify To Do</h1>
						</div>
						
						<div class="d-flex justify-content-center align-items-center mt-6">
							<button type="reset" class="btn btn-secondary me-3" data-bs-dismiss="modal">Cancel</button>
							<!-- <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Update</button> -->
						</div>
					</div>
				</div>
				<!--end::Modal dialog-->
			</div>
		</div>
		<!--end::Modal - Edit To Do's -->

		<!--begin::Modal - Delete To Do's-->
		<div class="modal fade" id="kt_modal_delete_todo" tabindex="-1" aria-hidden="true" data-bs-keyboard="false" data-bs-backdrop="static">
			<!--begin::Modal dialog-->
			<div class="modal-dialog modal-m">
				<!--begin::Modal content-->
				<div class="modal-content rounded">
					<div class="swal2-icon swal2-warning swal2-icon-show" style="display:flex;">
						<div class="swal2-icon-content">?</div></div>
						<div class="swal2-html-container" id="swal2-html-container" style="display: block;">Are you sure you want to Delete To Do's?</div>
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
		<!--end::Modal - Delete To Do's-->
		
		<!--begin::Modal - To Do Completed-->
		<div class="modal fade" id="kt_modal_complete_todo" tabindex="-1" aria-hidden="true" data-bs-keyboard="false" data-bs-backdrop="static">
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
							<h1 class="mb-3">Completed To Do</h1>
						</div>
						<div class="row mt-3">
							<div class="col-lg-12 fv-row">
								<label class="fw-semibold required fs-6">Remarks</label>
								<textarea class="form-control form-control-solid" data-kt-autosize="true" rows="4" name="com_remark" id="com_remark"></textarea>
								<div class="fv-plugins-message-container invalid-feedback"></div>
							</div>
						</div>

						<div class="d-flex align-items-center justify-content-center mt-4">
							<button type="button" class="btn btn-primary me-3" id="btm_full_comp">Complete</button>
							<button type="button" class="btn btn-secondary" id="lock_cancel_butt" data-bs-dismiss="modal">Cancel</button>
						</div>
					</div>
				</div>
				<!--end::Modal dialog-->
			</div>
		</div>
		<!--end::Modal -  To Do Completed-->

		<!--begin::Modal - View Completed To Do-->
		<div class="modal fade" id="kt_modal_view_todo" tabindex="-1" aria-hidden="true" data-bs-keyboard="false" data-bs-backdrop="static">
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
							<h1 class="mb-3">View Completed To Do</h1>
						</div>
						<div class="row mt-3">
							<div class="col-lg-12 fv-row">
								<div class="fw-semibold fs-6">Remarks</div>
								<label class="fw-bold fs-5" id="completed_remark">-</label>
							</div>
						</div>
					</div>
				</div>
				<!--end::Modal dialog-->
			</div>
		</div>
		<!--end::Modal - View Completed To Do-->
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
		<script src="<?php echo base_url(); ?>assets/custom_js/draggable.js"></script>
		<script>	
		<?php if($this->session->flashdata('g_success') || $this->session->flashdata('g_err')){?> 
		    $(document).ready( function() {
	       		 document.getElementById("pop_up_success").click()
	        });
	    <?php } ?>
  	</script>
  	<script>
		var baseurl= $("#baseurl").val();
  		

  		$(document).ready(function() {
		  $("#btm_full_comp").click(function() {

		    var text = $('#com_remark').val();
		    if (text=='') {
		    	$('#com_remark').addClass('error');
		    	$('#com_remark').focus();
		    	Swal.fire({
							title: 'Error!',
							text: 'Enter Description is Required.. ',
							icon: 'error',
							confirmButtonText: 'Okay'
						});
		    }
		    else{ 

		    	$('#completedesc').val(text);


		    	if ($('.incomp_todo_chk:checked').length>0){

						  $('#full_complete_form').attr('action', "<?php echo base_url(); ?>Todo/completemulitple");
						  // $('#full_complete_form').attr('target', '_blank');
						  $("#full_complete_form").submit();
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
		    

		  });
		});

	  		
  	</script>
  	<script>

  		function view(val)
		{
				// alert(val);
		
				// alert(baseurl);
				$.ajax({
				type: "GET",
				url: baseurl+'Todo/view',
				async: false,
				type: "GET",
				data: "id="+val,
				dataType: "json",
				success: function(response)
				{					
					$('#completed_remark').html(response.remark);
					
				}
			});
			    
		}
  	</script>
  	
  	<script>
  		function todoedit(val) {
  			var baseurl= $("#baseurl").val();
  			$.ajax({
						type: "POST",
						url: baseurl+'Todo/edit',
						async: false,
						type: "POST",
						data: "id="+val,
						dataType: "html",
						success: function(response)
						{

							$('#kt_modal_edit_todo').empty().append(response);
							$('#kt_modal_edit_todo').addClass('show');
						}
						});
		}
  	</script>
		<script>

			function tododelete(id) {

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
							url: baseurl+'Todo/delete',
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
			$('.incomp_todo_chk').on('click', function(e){
			   if(e.target.checked)
			   {
			     $('#kt_modal_complete_todo').modal('show');

			   }
			});
		</script>
		<script>
		 $('#kt_modal_new_todo').on('show.bs.modal', function (e) {
			  var taskFlatpickr = {
					   enableTime: true,
					    altInput: true,
					    time_12hr: false,
					    altFormat: "d-m-Y H:i K",
					    defaultDate: "today",
					    minDate: "today" // Disable previous dates
					};
			var test = flatpickr("#todo_date", taskFlatpickr);
			});
		</script>
		<script>
			function todo_type_func()
			{
				var todo_type = document.getElementById("todo_type").value;
				var todo_type_lab = document.getElementById("todo_type_lab");
				var todo_type_tbox = document.getElementById("todo_type_tbox");

				if (todo_type == "1") 
				{
					todo_type_lab.style.display="none";
					todo_type_tbox.style.display="none";
				}
				else
				{
					todo_type_lab.style.display="block";
					todo_type_tbox.style.display="block";	
				}
			}
		</script>
		

		<script> 
			function  addvalidation(){
				var err = 0;
				var todo_date    = $('#todo_date').val();
				var todo_type    = $('#todo_type').val();
				var allocatedto  = $('#allocatedto').val();
				var toddesc      = $('#toddesc').val();

					if(todo_date.trim()==""){
					
						$('#todo_date_err').html('Select Date is Required..!');		

						err++;
					}
					else{
						$('#todo_date_err').html('');
					}
					if(todo_type.trim()==""){

						$('#todo_type_err').html('Select Type is Required..!');		

						err++;
					}
					else{
						$('#todo_type_err').html('');
					}

					if (todo_type==2) {

						if(allocatedto==""){
						$('#allocatedto_err').html('Select Allocated To is Required..!');		

							err++;
						}
						else{
							$('#allocatedto_err').html('');
						}

					}
					
					if(toddesc.trim()==""){
						$('#toddesc_err').html('Enter Description is Required..!');		

						err++;
					}
					else{
						$('#toddesc_err').html('');
					}

					
					if (err>0) { return false; }else{ return true;} 

			}
		</script>
		<script>
			$( document ).ready(function() {
			   $(".sortable").sortable();
			        $(".sortable").disableSelection();
			});
		</script>
		<!-- Incomplete To Do's Check Box Start -->
		<script>
			$('#incomp_todo_checkall').change(function () {
		    $('.incomp_todo_chk').prop('checked', this.checked);

		    var chk = document.getElementById("incomp_todo_checkall");

		    if (chk.checked == true) {
		        $('#kt_modal_complete_todo').modal('show');
		    }
		});

		$('.incomp_todo_chk').change(function () {
		    if ($('.incomp_todo_chk:checked').length == $('.incomp_todo_chk').length) {
		        $('#incomp_todo_checkall').prop('checked', true);
		        $('#kt_modal_complete_todo').modal('show');
		    } else {
		        $('#incomp_todo_checkall').prop('checked', false);
		    }
		});

		</script>
		<!-- Incomplete To Do's Check Box End -->

		<!-- Complete To Do's Check Box Start -->
		<script>
			$('#comp_todo_checkall').change(function () {
			    $('.comp_todo_chk').prop('checked',this.checked);

			    if ($('.comp_todo_chk:checked').length==0){

						$('#full_incomplete_form').attr('action', "<?php echo base_url(); ?>Todo/incompletemulitple");
						  // $('#full_complete_form').attr('target', '_blank');
						  $("#full_incomplete_form").submit();
						  e.preventDefault();

					}else{

						Swal.fire({
								title: 'Error!',
								text:  'Please Uncheck Any one of the checkbox.. ',
								icon:  'error',
								confirmButtonText: 'Okay'
							});
					}

			});

			$('.comp_todo_chk').change(function () {
			 if ($('.comp_todo_chk:checked').length == $('.comp_todo_chk').length){
			  $('#comp_todo_checkall').prop('checked',true);


			 }
			 else {

			  $('#comp_todo_checkall').prop('checked',false);
			  	
			  $('#full_incomplete_form').attr('action', "<?php echo base_url(); ?>Todo/incompletemulitple");
						  // $('#full_complete_form').attr('target', '_blank');
						  $("#full_incomplete_form").submit();
						  e.preventDefault();

			 }
			});
		</script>
		<!-- Complete To Do's Check Box End -->


<!---drap n drop update--->

<script type="text/javascript">  
    $( ".row_position" ).sortable({  
        delay: 150,  
        stop: function() {  
            var selectedData = new Array();  
            $('.row_position>tr').each(function() {  
                selectedData.push($(this).attr("id"));  
            });  
            updateOrder(selectedData);  
        }  
    });  
  
    function updateOrder(data) 
    { 
    	console.log(data);
    	var formData = new FormData();
			formData.append('positiondata', data);
	
	    $.ajax(
			{
					url: baseurl+'Todo/todopositionsetfunc',
					type: 'POST',
					data: formData,
					async: false,
					cache: false,
					contentType: false,
					processData: false,
					success: function (response) 
					{

						// console.log('success');

					}

			}); 
    }  
</script>  
<script type="text/javascript">  
    $( ".rowcompleted_position" ).sortable({  
        delay: 150,  
        stop: function() {  
            var selectedData = new Array();  
            $('.rowcompleted_position>tr').each(function() {  
                selectedData.push($(this).attr("id"));  
            });  
            updateOrdercompleted(selectedData);  
        }  
    });  
  
    function updateOrdercompleted(data) 
    { 
    	console.log(data);
    	var formData = new FormData();
			formData.append('positioncompleteddata', data);
	
	    $.ajax(
			{
					url: baseurl+'Todo/todopositioncompletedsetfunc',
					type: 'POST',
					data: formData,
					async: false,
					cache: false,
					contentType: false,
					processData: false,
					success: function (response) 
					{

						// console.log('success');

					}

			}); 
    }  
</script>  
		<script>
		      $("#unfinished_to_do_table").kendoTooltip({
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
			$("#unfinished_to_do_table").DataTable({
				"sorting":false,
				// "paging": false,
				 // "aaSorting":[],
				//"responsive": true,
				"pageLength": 25000,
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
			$('#unfinished_to_do_table').wrap('<div class="dataTables_scroll" />');
		</script>
		<script>
		      $("#finished_to_do_table").kendoTooltip({
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
			$("#finished_to_do_table").DataTable({
				"sorting":false,
				"pageLength": 25000,
				// "paging": false,
				 // "aaSorting":[],
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
			$('#finished_to_do_table').wrap('<div class="dataTables_scroll" />');
		</script>
	</body>
	<!--end::Body-->
</html>