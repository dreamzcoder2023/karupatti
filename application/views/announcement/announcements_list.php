<?php $this->load->view("common.php");?>
<style>
	.dataTables_scroll
    {
        position: relative;
        overflow: auto;
        max-height: 200px;/*the maximum height you want to achieve*/
        width: 100%;
    }
  .dataTables_scroll thead{
    position: -webkit-sticky;
    position: sticky;
    top: 0;
    background-color: #fff;
    z-index: 2;
  }
  .dataTables_scroll_rp_entry
    {
        position: relative;
        overflow: auto;
        min-height: 180px;
        max-height: 200px;/*the maximum height you want to achieve*/
        width: 100%;
    }
  .dataTables_scroll_rp_entry thead{
    position: -webkit-sticky;
    position: sticky;
    top: 0;
    background-color: #fff;
    z-index: 2;
  }
  .error {
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
									<h1 class="d-flex align-items-center text-dark fw-bold my-1 fs-3">Announcements List
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
										<div class="alert alert-success alert-dismissible" style="display:none;" id="active_item_master" role="alert">
			                            Announcement has been activated successfully
			                        </div>
			                        <div class="alert alert-success alert-dismissible" style="display:none;" id="deactive_item_master" role="alert">
			                            Announcement has been deactivated successfully
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
											<button type="button" class="btn btn-primary"  data-bs-toggle="modal" data-bs-target="#kt_modal_new_announcements">
											<!--begin::Svg Icon | path: icons/duotune/arrows/arr075.svg-->
											<span class="svg-icon svg-icon-2">
												<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
													<rect opacity="0.5" x="11.364" y="20.364" width="16" height="2" rx="1" transform="rotate(-90 11.364 20.364)" fill="currentColor" />
													<rect x="4.36396" y="11.364" width="16" height="2" rx="1" fill="currentColor" />
												</svg>
											</span>
											<!--end::Svg Icon-->New Announcements</button>
											<!--end::Add user-->
										</div>
										<!--end::Toolbar-->
									</div>
									<!--end::Card toolbar-->
								</div>
								<!--end::Card header-->
								<!--begin::Card body-->
								<div class="card-body py-4">
									<!--end::Navbar-->

										<!--begin::Left Section-->
									<!--begin::Table-->
									<table class="table align-middle table-row-dashed table-striped table-hover fs-7 gy-1 gs-2" id="kt_datatable_dom_positioning">
										<thead>
											<tr class="text-start text-muted fw-bold fs-7 gs-0">
												<th class="min-w-50px">S.No</th>
												<th class="min-w-100px">Start Date</th>
												<th class="min-w-100px">End Date</th>
												<th class="min-w-250px">Announcements</th>
												<th class="min-w-200px">Users</th>
												<th class="min-w-100px" style="width: 5%;">Status</th>
												<th class="min-w-100px" style="width: 5%;"><span class="text-end">Actions</span></th>
											</tr>
										</thead>
										<tbody class="text-gray-600 fw-semibold">
											<?php if(isset($announcementlist)){ 
												foreach ($announcementlist as $i => $list) { ?>
											<tr>
												<td><?php echo $i+1; ?></td>
												<td>
													<?php 
														    $s_date = date_format(date_create($list["startdate"]),'d-M-Y');
											                $s_time = date_format(date_create($list["startdate"]),'H:i');
											                $st_time = date("h:i A", strtotime($s_time));
											                $startdate = $s_date.'  '.$st_time;
															echo $startdate; 
													?> 
												</td>
												<td><?php  
															$e_date  = date_format(date_create($list["enddate"]),'d-M-Y');
											                $e_time  = date_format(date_create($list["enddate"]),'H:i');
											                $en_time = date("h:i A", strtotime($e_time));
											                $enddate = $e_date.'  '.$en_time;
															echo $enddate; 
													?> 
												</td>
												<td class="ple1"><?php echo $list['announcement']; ?></td>
												<td class="ple1">
														<?php $users = isset($list['userid']) ? json_decode($list['userid']) : [];
															$staffnames = [];
															foreach ($users as $usr) {
															    $staffdata = $this->db->query("SELECT * FROM STAFFS WHERE USER_ID='".$usr."' ")->row();
															    if ($staffdata) {
															        $staffnames[] = ucfirst(ltrim($staffdata->STAFFNAME, ','));
															    }
															}
															echo implode(', ', $staffnames);	 
														?>
												</td>
												<td>
													<label class="form-check form-switch form-check-custom form-check-solid cursor-pointer">
														<input class="form-check-input w-35px h-20px cursor-pointer" type="checkbox" <?php if($list['status']==1){echo "checked";} ?> id="activeunactive_items_<?php echo $i;?>" name="activeunactive_items_<?php echo $i;?>" onchange="activeunactive_items('<?php echo $list['id']; ?>',<?php echo $i;?>)" value="<?php echo $list['status'];?>">
													</label>
												</td>
												<!--begin::Action=-->
												<td>
													<span class="text-end">
														<a href="editcompany.php" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1" data-bs-toggle="modal" data-bs-target="#kt_modal_edit_announcements" onclick="editan('<?php echo $list['id']; ?>')">
															<!--begin::Svg Icon | path: icons/duotune/art/art005.svg-->
															<span class="svg-icon svg-icon-3">
																<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																	<path opacity="0.3" d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z" fill="currentColor"></path>
																	<path d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z" fill="currentColor"></path>
																</svg>
															</span>
															<!--end::Svg Icon-->
														</a>
														<a href="#" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm" data-bs-toggle="modal" data-bs-target="#kt_modal_delete_announcements">
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
											<?php }} ?>
										</tbody>
										<!--end::Table body-->
									</table>
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
				<?php $this->load->view("footer.php");?>
				</div>
				<!--end::Wrapper-->
			</div>
			<!--end::Page-->
		</div>
		<!--end::Root-->
		<!--begin::Modal - edit company-->
		<div class="modal fade" id="kt_modal_edit_announcements" tabindex="-1" aria-hidden="true" data-bs-backdrop="static">
						
						<!--begin::Modal dialog-->
							<div class="modal-dialog modal-md">
								<!--begin::Modal content-->
								<div class="modal-content rounded">
									<!--begin::Modal header-->
									<div class="modal-header justify-content-end border-0 pb-0" style="padding:0px !important;">
										<!--begin::Close-->
										<button type="button" class="btn btn-sm btn-icon btn-active-color-primary close" data-bs-dismiss="modal" aria-label="Close">
											<!-- <span class="svg-icon svg-icon-1">
												<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
													<rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="currentColor" />
													<rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="currentColor" />
												</svg>
											</span> -->
										</button>
										<!--end::Close-->
									</div>
									<!--end::Modal header-->
									<!--begin::Modal body-->
									<div class="modal-body pt-0 pb-15 px-5 px-xl-20">
										<!--begin::Heading-->
										<div class="mb-3 text-center">
											<h1 class="mb-3">Update Announcements</h1>
										</div>
										<!--end::Heading-->
									

										<!--end::Actions-->
									</div>
									<!--end::Modal body-->
								</div>
								<!--end::Modal content-->
							</div>
						<!--end::Modal dialog-->
		</div>
		<!--end::Modal - edit Wishes-->
		<!--begin::Modal - add Wishes-->
		<div class="modal fade" id="kt_modal_new_announcements" tabindex="-1" aria-hidden="true" data-bs-backdrop="static">
			<!--begin::Modal dialog-->
			<div class="modal-dialog modal-md">
				<!--begin::Modal content-->
				<div class="modal-content rounded">
					<!--begin::Modal header-->
					<div class="modal-header justify-content-end border-0 pb-0" style="padding:0px !important;">
						<!--begin::Close-->
						<button type="button" class="btn btn-sm btn-icon btn-active-color-primary close" data-bs-dismiss="modal" aria-label="Close">
							<!-- <span class="svg-icon svg-icon-1">
								<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
									<rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="currentColor" />
									<rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="currentColor" />
								</svg>
							</span> -->
						</button>
						<!--end::Close-->
					</div>
					<!--end::Modal header-->
					<!--begin::Modal body-->
					<div class="modal-body pt-0 pb-15 px-5 px-xl-20">
						<!--begin::Heading-->
						<div class="mb-3 text-center">
							<h1 class="mb-3">New Announcements</h1>
						</div>
						<!--end::Heading-->
						<!--   -->
						<form name="item_add_form" enctype="multipart/form-data" method="POST"  action="<?php echo base_url(); ?>Announcement/announcementadd" onsubmit="return addvalidation();">
							<div class="row">
								<label class="col-lg-4 col-form-label required fw-semibold fs-6">Start Date</label>
								<div class="col-lg-8">
									<div class="d-flex align-items-center">
										<span class="svg-icon position-absolute ms-4 svg-icon-2 dt">
											<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
												<path opacity="0.3" d="M21 22H3C2.4 22 2 21.6 2 21V5C2 4.4 2.4 4 3 4H21C21.6 4 22 4.4 22 5V21C22 21.6 21.6 22 21 22Z" fill="currentColor" />
												<path d="M6 6C5.4 6 5 5.6 5 5V3C5 2.4 5.4 2 6 2C6.6 2 7 2.4 7 3V5C7 5.6 6.6 6 6 6ZM11 5V3C11 2.4 10.6 2 10 2C9.4 2 9 2.4 9 3V5C9 5.6 9.4 6 10 6C10.6 6 11 5.6 11 5ZM15 5V3C15 2.4 14.6 2 14 2C13.4 2 13 2.4 13 3V5C13 5.6 13.4 6 14 6C14.6 6 15 5.6 15 5ZM19 5V3C19 2.4 18.6 2 18 2C17.4 2 17 2.4 17 3V5C17 5.6 17.4 6 18 6C18.6 6 19 5.6 19 5Z" fill="currentColor" />
												<path d="M8.8 13.1C9.2 13.1 9.5 13 9.7 12.8C9.9 12.6 10.1 12.3 10.1 11.9C10.1 11.6 10 11.3 9.8 11.1C9.6 10.9 9.3 10.8 9 10.8C8.8 10.8 8.59999 10.8 8.39999 10.9C8.19999 11 8.1 11.1 8 11.2C7.9 11.3 7.8 11.4 7.7 11.6C7.6 11.8 7.5 11.9 7.5 12.1C7.5 12.2 7.4 12.2 7.3 12.3C7.2 12.4 7.09999 12.4 6.89999 12.4C6.69999 12.4 6.6 12.3 6.5 12.2C6.4 12.1 6.3 11.9 6.3 11.7C6.3 11.5 6.4 11.3 6.5 11.1C6.6 10.9 6.8 10.7 7 10.5C7.2 10.3 7.49999 10.1 7.89999 10C8.29999 9.90003 8.60001 9.80003 9.10001 9.80003C9.50001 9.80003 9.80001 9.90003 10.1 10C10.4 10.1 10.7 10.3 10.9 10.4C11.1 10.5 11.3 10.8 11.4 11.1C11.5 11.4 11.6 11.6 11.6 11.9C11.6 12.3 11.5 12.6 11.3 12.9C11.1 13.2 10.9 13.5 10.6 13.7C10.9 13.9 11.2 14.1 11.4 14.3C11.6 14.5 11.8 14.7 11.9 15C12 15.3 12.1 15.5 12.1 15.8C12.1 16.2 12 16.5 11.9 16.8C11.8 17.1 11.5 17.4 11.3 17.7C11.1 18 10.7 18.2 10.3 18.3C9.9 18.4 9.5 18.5 9 18.5C8.5 18.5 8.1 18.4 7.7 18.2C7.3 18 7 17.8 6.8 17.6C6.6 17.4 6.4 17.1 6.3 16.8C6.2 16.5 6.10001 16.3 6.10001 16.1C6.10001 15.9 6.2 15.7 6.3 15.6C6.4 15.5 6.6 15.4 6.8 15.4C6.9 15.4 7.00001 15.4 7.10001 15.5C7.20001 15.6 7.3 15.6 7.3 15.7C7.5 16.2 7.7 16.6 8 16.9C8.3 17.2 8.6 17.3 9 17.3C9.2 17.3 9.5 17.2 9.7 17.1C9.9 17 10.1 16.8 10.3 16.6C10.5 16.4 10.5 16.1 10.5 15.8C10.5 15.3 10.4 15 10.1 14.7C9.80001 14.4 9.50001 14.3 9.10001 14.3C9.00001 14.3 8.9 14.3 8.7 14.3C8.5 14.3 8.39999 14.3 8.39999 14.3C8.19999 14.3 7.99999 14.2 7.89999 14.1C7.79999 14 7.7 13.8 7.7 13.7C7.7 13.5 7.79999 13.4 7.89999 13.2C7.99999 13 8.2 13 8.5 13H8.8V13.1ZM15.3 17.5V12.2C14.3 13 13.6 13.3 13.3 13.3C13.1 13.3 13 13.2 12.9 13.1C12.8 13 12.7 12.8 12.7 12.6C12.7 12.4 12.8 12.3 12.9 12.2C13 12.1 13.2 12 13.6 11.8C14.1 11.6 14.5 11.3 14.7 11.1C14.9 10.9 15.2 10.6 15.5 10.3C15.8 10 15.9 9.80003 15.9 9.70003C15.9 9.60003 16.1 9.60004 16.3 9.60004C16.5 9.60004 16.7 9.70003 16.8 9.80003C16.9 9.90003 17 10.2 17 10.5V17.2C17 18 16.7 18.4 16.2 18.4C16 18.4 15.8 18.3 15.6 18.2C15.4 18.1 15.3 17.8 15.3 17.5Z" fill="currentColor" />
											</svg>
										</span>
										<input type="datetime-local" class="form-control form-control-solid ps-12"  id="ancts_start_date" name="ancts_start_date" placeholder="Start Date" value="<?php echo date("d-m-Y h:i A"); ?>"/>
										
									</div>
									<div class="fv-plugins-message-container invalid-feedback" id="ancts_start_date_err"></div>
								</div>
								<label class="col-lg-4 col-form-label required fw-semibold fs-6">End Date</label>
								<div class="col-lg-8">
									<div class="d-flex align-items-center">
										<span class="svg-icon position-absolute ms-4 svg-icon-2 dt">
											<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
												<path opacity="0.3" d="M21 22H3C2.4 22 2 21.6 2 21V5C2 4.4 2.4 4 3 4H21C21.6 4 22 4.4 22 5V21C22 21.6 21.6 22 21 22Z" fill="currentColor" />
												<path d="M6 6C5.4 6 5 5.6 5 5V3C5 2.4 5.4 2 6 2C6.6 2 7 2.4 7 3V5C7 5.6 6.6 6 6 6ZM11 5V3C11 2.4 10.6 2 10 2C9.4 2 9 2.4 9 3V5C9 5.6 9.4 6 10 6C10.6 6 11 5.6 11 5ZM15 5V3C15 2.4 14.6 2 14 2C13.4 2 13 2.4 13 3V5C13 5.6 13.4 6 14 6C14.6 6 15 5.6 15 5ZM19 5V3C19 2.4 18.6 2 18 2C17.4 2 17 2.4 17 3V5C17 5.6 17.4 6 18 6C18.6 6 19 5.6 19 5Z" fill="currentColor" />
												<path d="M8.8 13.1C9.2 13.1 9.5 13 9.7 12.8C9.9 12.6 10.1 12.3 10.1 11.9C10.1 11.6 10 11.3 9.8 11.1C9.6 10.9 9.3 10.8 9 10.8C8.8 10.8 8.59999 10.8 8.39999 10.9C8.19999 11 8.1 11.1 8 11.2C7.9 11.3 7.8 11.4 7.7 11.6C7.6 11.8 7.5 11.9 7.5 12.1C7.5 12.2 7.4 12.2 7.3 12.3C7.2 12.4 7.09999 12.4 6.89999 12.4C6.69999 12.4 6.6 12.3 6.5 12.2C6.4 12.1 6.3 11.9 6.3 11.7C6.3 11.5 6.4 11.3 6.5 11.1C6.6 10.9 6.8 10.7 7 10.5C7.2 10.3 7.49999 10.1 7.89999 10C8.29999 9.90003 8.60001 9.80003 9.10001 9.80003C9.50001 9.80003 9.80001 9.90003 10.1 10C10.4 10.1 10.7 10.3 10.9 10.4C11.1 10.5 11.3 10.8 11.4 11.1C11.5 11.4 11.6 11.6 11.6 11.9C11.6 12.3 11.5 12.6 11.3 12.9C11.1 13.2 10.9 13.5 10.6 13.7C10.9 13.9 11.2 14.1 11.4 14.3C11.6 14.5 11.8 14.7 11.9 15C12 15.3 12.1 15.5 12.1 15.8C12.1 16.2 12 16.5 11.9 16.8C11.8 17.1 11.5 17.4 11.3 17.7C11.1 18 10.7 18.2 10.3 18.3C9.9 18.4 9.5 18.5 9 18.5C8.5 18.5 8.1 18.4 7.7 18.2C7.3 18 7 17.8 6.8 17.6C6.6 17.4 6.4 17.1 6.3 16.8C6.2 16.5 6.10001 16.3 6.10001 16.1C6.10001 15.9 6.2 15.7 6.3 15.6C6.4 15.5 6.6 15.4 6.8 15.4C6.9 15.4 7.00001 15.4 7.10001 15.5C7.20001 15.6 7.3 15.6 7.3 15.7C7.5 16.2 7.7 16.6 8 16.9C8.3 17.2 8.6 17.3 9 17.3C9.2 17.3 9.5 17.2 9.7 17.1C9.9 17 10.1 16.8 10.3 16.6C10.5 16.4 10.5 16.1 10.5 15.8C10.5 15.3 10.4 15 10.1 14.7C9.80001 14.4 9.50001 14.3 9.10001 14.3C9.00001 14.3 8.9 14.3 8.7 14.3C8.5 14.3 8.39999 14.3 8.39999 14.3C8.19999 14.3 7.99999 14.2 7.89999 14.1C7.79999 14 7.7 13.8 7.7 13.7C7.7 13.5 7.79999 13.4 7.89999 13.2C7.99999 13 8.2 13 8.5 13H8.8V13.1ZM15.3 17.5V12.2C14.3 13 13.6 13.3 13.3 13.3C13.1 13.3 13 13.2 12.9 13.1C12.8 13 12.7 12.8 12.7 12.6C12.7 12.4 12.8 12.3 12.9 12.2C13 12.1 13.2 12 13.6 11.8C14.1 11.6 14.5 11.3 14.7 11.1C14.9 10.9 15.2 10.6 15.5 10.3C15.8 10 15.9 9.80003 15.9 9.70003C15.9 9.60003 16.1 9.60004 16.3 9.60004C16.5 9.60004 16.7 9.70003 16.8 9.80003C16.9 9.90003 17 10.2 17 10.5V17.2C17 18 16.7 18.4 16.2 18.4C16 18.4 15.8 18.3 15.6 18.2C15.4 18.1 15.3 17.8 15.3 17.5Z" fill="currentColor" />
											</svg>
										</span>
										<input type="datetime-local" class="form-control form-control-solid ps-12" name="ancts_end_date" placeholder="End Date" id="ancts_end_date" value="<?php echo date("d-m-Y h:i A"); ?>"/>
										
									</div>
									<div class="fv-plugins-message-container invalid-feedback" id="ancts_end_date_err"></div>
								</div>
								<label class="col-lg-4 col-form-label required fw-semibold fs-6">Announcements</label>
								<div class="col-lg-8 fv-row">
									<textarea class="form-control form-select-solid fw-semibold fs-5" rows="3" name="ancts_txt" id="ancts_txt"  ></textarea>
									<div class="fv-plugins-message-container invalid-feedback" id="ancts_txt_err"></div>
								</div>
								<label class="col-lg-4 col-form-label required fw-semibold fs-6">Users</label>
								<div class="col-lg-8 fv-row fv-plugins-icon-container">
									<select class="form-select form-select-solid" name="acnts_users[]" id="acnts_users" data-control="select2" data-dropdown-parent="#kt_modal_new_announcements" data-allow-clear="true" multiple="multiple" data-placeholder="Select Users">

										<?php if (isset($userlist)) {
											foreach ($userlist as $key => $ulist) {?>
												<option value="<?php echo  $ulist['USER_ID']?$ulist['USER_ID']:''; ?>"><?php echo ucfirst($ulist['STAFFNAME']?$ulist['STAFFNAME']:'-'); ?></option>
												
										<?php } } ?>
										
									</select>
									<div class="fv-plugins-message-container invalid-feedback" id="acnts_users_err"></div>
								</div>
							</div>
							<div class="d-flex justify-content-center align-items-center mt-6">
								<button type="reset" class="btn btn-secondary me-3" data-bs-dismiss="modal">Cancel</button>
								<button type="submit" class="btn btn-primary">Create Announcement</button>
							</div>
						</form>
						<!--end::Actions-->
					</div>
					<!--end::Modal body-->
				</div>
				<!--end::Modal content-->
			</div>
			<!--end::Modal dialog-->
		</div>
		<!--end::Modal - add Wishes-->
		
		<!--begin::Modal - delete Wishes-->
		<div class="modal fade" id="kt_modal_delete_announcements" tabindex="-1" aria-hidden="true">
			<!--begin::Modal dialog-->
			<div class="modal-dialog modal-m">
				<!--begin::Modal content-->
				<div class="modal-content rounded">
					<div class="swal2-icon swal2-warning swal2-icon-show" style="display:flex;">
						<div class="swal2-icon-content">!</div></div>
						<div class="swal2-html-container" id="swal2-html-container" style="display: block;">Are you sure you want to delete?</div>
						<div class="d-flex flex-center flex-row-fluid pt-12">
							<button type="submit" class="btn btn-danger me-3" data-bs-dismiss="modal">Yes, delete!</button>
							<button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">No,cancel</button>
						</div><br><br>
				</div>
				<!--end::Modal content-->
			</div>
			<!--end::Modal dialog-->
		</div>
		<!--end::Modal - delete Wishes-->
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
			function activeunactive_items(val,ival) {
			var unactive;
			var unactv;
			var baseurl= $("#baseurl").val();
			var a = $("#activeunactive_items_"+ival).val();
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
				url:baseurl+'Announcement/announce_active',
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
		</script>
		<script>
			 $('#kt_modal_new_announcements').on('show.bs.modal', function (e) {
				  var taskFlatpickr = {
					   enableTime: true,
					    altInput: true,
					    time_12hr: false,
					    altFormat: "d-m-Y H:i K",
					    defaultDate: "today",
					    minDate: "today" // Disable previous dates
					};

					flatpickr("#ancts_start_date", taskFlatpickr);

				  flatpickr("#ancts_end_date", taskFlatpickr);

				    // alert(start);
				});
		</script>
		<script> 
			function  addvalidation(){
				var err = 0;
				var ancts_start_date   = $('#ancts_start_date').val();
				var ancts_end_date     = $('#ancts_end_date').val();
				var ancts_txt          = $('#ancts_txt').val();
				var acnts_user         = $('#acnts_users').val();

				// alert(acnts_users);

					if (ancts_end_date >= ancts_start_date) {

						$('#ancts_end_date_err').html('');
					} else {
					  
					  	$('#ancts_end_date_err').html('Invalid Invalid date range');
					  	err++;
					}



					if(ancts_start_date.trim()==""){


						$('#ancts_start_date_err').html('Select Start Date Is Required..!');
						
						err++;
												

					}
					else{

						$('#ancts_start_date_err').html('');
					}

					if(ancts_end_date.trim()==""){
						

						$('#ancts_end_date_err').html('Select End Date Is Required..!');
						err++;
											

					}
					else{

						$('#ancts_end_date_err').html('');
					}

					if(ancts_txt.trim() =="")
					{
						
						$('#ancts_txt_err').html('Enter Announcement Required..!');
						err++;
											

					}
					else{

						$('#ancts_txt_err').html('');
					}
					if(acnts_user=="")
					{
						$('#acnts_users_err').html('Select Users Is Required..!');

						err++;

					}
					else{

						$('#acnts_users_err').html('');
					}

					// alert(err) ;

					if (err>0) { return false; }else{ return true;} 

			}
		</script>
		<script>
			$("#kt_datatable_dom_positioning").DataTable({
				// "ordering": false,
				"aaSorting":[],
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
		</script>
		<script>
		      $("#kt_datatable_dom_positioning").kendoTooltip({
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
				function editan(val) {

						var baseurl= $("#baseurl").val();
						//alert(val);
						$.ajax({
						type: "POST",
						url: baseurl+'Announcement/edit',
						async: false,
						type: "POST",
						data: "id="+val,
						dataType: "html",
						success: function(response)
						{

							$('#kt_modal_edit_announcements').empty().append(response);
							$('#kt_modal_edit_announcements').addClass('show');
						}
						});
				}

				function closeEditModal()
					{
						var baseurl= $("#baseurl").val();
						$('#kt_modal_edit_announcements').removeClass('show');
						//$("#kt_modal_update_role").css("display", "none");
						$('.modal-backdrop').removeClass('show');
						location.reload();
					}
		</script>
	</body>
	<!--end::Body-->
</html>