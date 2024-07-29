<?php $this->load->view("common");?>
<style>
	.dataTables_scroll
    {
        position: relative;
        overflow: auto;
        height: 250px;
        max-height: 250px;/*the maximum height you want to achieve*/
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
		<script>if ( document.documentElement ) { const defaultThemeMode = "system"; const name = document.body.getAttribute("data-kt-name"); let themeMode = localStorage.getItem("kt_" + ( name !== null ? name + "_": "" ) + "theme_mode_value"); if ( themeMode === null ) { if ( defaultThemeMode === "system" ) { themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light"; } else { themeMode = defaultThemeMode; } } document.documentElement.setAttribute("data-theme", themeMode); }</script>
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
									<h1 class="d-flex align-items-center text-dark fw-bold my-1 fs-3">Membership Card Available
									<!--begin::Separator-->
									<span class="h-20px border-gray-400 border-start ms-3 mx-2"></span>
									<label class="d-flex align-items-center text-primary fw-bold my-1 fs-5">
										<span>Card Type &emsp;-</span>
										<span>&emsp;<?php if($card_type_fill!=''){ if($card_type_fill=='1'){ echo "Silver"; } if($card_type_fill=='2'){ echo "Gold"; }if($card_type_fill=='3'){ echo "Platinum"; } }else{  echo "All" ;} ?></span>
									</label>
									<span class="h-20px border-gray-400 border-start ms-3 mx-2"></span>
									<label class="d-flex align-items-center text-primary fw-bold my-1 fs-5">
										<span>User &emsp;-</span>
										<span>&emsp;<?php if($user_fill!=''){echo $user_fill; }else{ echo "All";} ?></span>
									</label>
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
																<a class="nav-link  btn btn-active-light btn-color-black-800 btn-active-color-primary rounded-bottom-0 fw-bold fs-6"  href="<?php echo base_url(); ?>Membershipcardavailable">Card Available</a>
															</li>
															<li class="nav-item">
																<a class="nav-link  active btn btn-active-light btn-color-black-800 btn-active-color-primary rounded-bottom-0 fw-bold fs-6" data-bs-toggle="tab" href="#kt_tab_pane_card_activate_list">Available List</a>
															</li>
														</ul>
													</div>
												</div>
												<div class="tab-content" id="myTabContent">
													<div class="tab-pane fade " id="kt_tab_pane_card_activate" role="tabpanel">
														<div class="row">
															<!-- <label class="col-lg-1 col-form-label fw-semibold fs-6">Date</label>
															<div class="col-lg-2 fv-row">
																<div class="d-flex align-items-center">
																	<span class="svg-icon position-absolute ms-4 svg-icon-2 dt">
																		<svg width="24" height="24" viewBox="0 0 24 24" fill="none"
																			xmlns="http://www.w3.org/2000/svg">
																			<path opacity="0.3"
																				d="M21 22H3C2.4 22 2 21.6 2 21V5C2 4.4 2.4 4 3 4H21C21.6 4 22 4.4 22 5V21C22 21.6 21.6 22 21 22Z"
																				fill="currentColor" />
																			<path
																				d="M6 6C5.4 6 5 5.6 5 5V3C5 2.4 5.4 2 6 2C6.6 2 7 2.4 7 3V5C7 5.6 6.6 6 6 6ZM11 5V3C11 2.4 10.6 2 10 2C9.4 2 9 2.4 9 3V5C9 5.6 9.4 6 10 6C10.6 6 11 5.6 11 5ZM15 5V3C15 2.4 14.6 2 14 2C13.4 2 13 2.4 13 3V5C13 5.6 13.4 6 14 6C14.6 6 15 5.6 15 5ZM19 5V3C19 2.4 18.6 2 18 2C17.4 2 17 2.4 17 3V5C17 5.6 17.4 6 18 6C18.6 6 19 5.6 19 5Z"
																				fill="currentColor" />
																			<path
																				d="M8.8 13.1C9.2 13.1 9.5 13 9.7 12.8C9.9 12.6 10.1 12.3 10.1 11.9C10.1 11.6 10 11.3 9.8 11.1C9.6 10.9 9.3 10.8 9 10.8C8.8 10.8 8.59999 10.8 8.39999 10.9C8.19999 11 8.1 11.1 8 11.2C7.9 11.3 7.8 11.4 7.7 11.6C7.6 11.8 7.5 11.9 7.5 12.1C7.5 12.2 7.4 12.2 7.3 12.3C7.2 12.4 7.09999 12.4 6.89999 12.4C6.69999 12.4 6.6 12.3 6.5 12.2C6.4 12.1 6.3 11.9 6.3 11.7C6.3 11.5 6.4 11.3 6.5 11.1C6.6 10.9 6.8 10.7 7 10.5C7.2 10.3 7.49999 10.1 7.89999 10C8.29999 9.90003 8.60001 9.80003 9.10001 9.80003C9.50001 9.80003 9.80001 9.90003 10.1 10C10.4 10.1 10.7 10.3 10.9 10.4C11.1 10.5 11.3 10.8 11.4 11.1C11.5 11.4 11.6 11.6 11.6 11.9C11.6 12.3 11.5 12.6 11.3 12.9C11.1 13.2 10.9 13.5 10.6 13.7C10.9 13.9 11.2 14.1 11.4 14.3C11.6 14.5 11.8 14.7 11.9 15C12 15.3 12.1 15.5 12.1 15.8C12.1 16.2 12 16.5 11.9 16.8C11.8 17.1 11.5 17.4 11.3 17.7C11.1 18 10.7 18.2 10.3 18.3C9.9 18.4 9.5 18.5 9 18.5C8.5 18.5 8.1 18.4 7.7 18.2C7.3 18 7 17.8 6.8 17.6C6.6 17.4 6.4 17.1 6.3 16.8C6.2 16.5 6.10001 16.3 6.10001 16.1C6.10001 15.9 6.2 15.7 6.3 15.6C6.4 15.5 6.6 15.4 6.8 15.4C6.9 15.4 7.00001 15.4 7.10001 15.5C7.20001 15.6 7.3 15.6 7.3 15.7C7.5 16.2 7.7 16.6 8 16.9C8.3 17.2 8.6 17.3 9 17.3C9.2 17.3 9.5 17.2 9.7 17.1C9.9 17 10.1 16.8 10.3 16.6C10.5 16.4 10.5 16.1 10.5 15.8C10.5 15.3 10.4 15 10.1 14.7C9.80001 14.4 9.50001 14.3 9.10001 14.3C9.00001 14.3 8.9 14.3 8.7 14.3C8.5 14.3 8.39999 14.3 8.39999 14.3C8.19999 14.3 7.99999 14.2 7.89999 14.1C7.79999 14 7.7 13.8 7.7 13.7C7.7 13.5 7.79999 13.4 7.89999 13.2C7.99999 13 8.2 13 8.5 13H8.8V13.1ZM15.3 17.5V12.2C14.3 13 13.6 13.3 13.3 13.3C13.1 13.3 13 13.2 12.9 13.1C12.8 13 12.7 12.8 12.7 12.6C12.7 12.4 12.8 12.3 12.9 12.2C13 12.1 13.2 12 13.6 11.8C14.1 11.6 14.5 11.3 14.7 11.1C14.9 10.9 15.2 10.6 15.5 10.3C15.8 10 15.9 9.80003 15.9 9.70003C15.9 9.60003 16.1 9.60004 16.3 9.60004C16.5 9.60004 16.7 9.70003 16.8 9.80003C16.9 9.90003 17 10.2 17 10.5V17.2C17 18 16.7 18.4 16.2 18.4C16 18.4 15.8 18.3 15.6 18.2C15.4 18.1 15.3 17.8 15.3 17.5Z"
																				fill="currentColor" />
																		</svg>
																	</span>
																	<input class="form-control form-control-solid ps-12" name="today_date" placeholder="Date" id="today_date" value="<?php echo date("d-m-Y");?>" />
																</div>
															</div> -->
															<label class="col-lg-1 col-form-label fw-semibold fs-6">Card Type</label>
															<div class="col-lg-2">
																<select class="form-select form-select-solid" data-control="select2"
																	data-hide-search="true">
																	<option value="0">Select Type</option>
																	<option value="1">Silver</option>
																	<option value="2">Gold</option>
																	<option value="3">Platinum</option>
																</select>
															</div>
															<label class="col-lg-1 col-form-label fw-semibold fs-6">Scan Card</label>
															<div class="col-lg-2">
																<input type="text" name="" class="form-control form-control-lg form-control-solid" placeholder="Scan Here">
																<div class="fv-plugins-message-container invalid-feedback"></div>
															</div>
															<label class="col-lg-1 col-form-label fw-semibold fs-6">Expiry Date</label>
															<div class="col-lg-2 fv-row">
																<div class="d-flex align-items-center">
																	<span class="svg-icon position-absolute ms-4 svg-icon-2 dt">
																		<svg width="24" height="24" viewBox="0 0 24 24" fill="none"
																			xmlns="http://www.w3.org/2000/svg">
																			<path opacity="0.3"
																				d="M21 22H3C2.4 22 2 21.6 2 21V5C2 4.4 2.4 4 3 4H21C21.6 4 22 4.4 22 5V21C22 21.6 21.6 22 21 22Z"
																				fill="currentColor" />
																			<path
																				d="M6 6C5.4 6 5 5.6 5 5V3C5 2.4 5.4 2 6 2C6.6 2 7 2.4 7 3V5C7 5.6 6.6 6 6 6ZM11 5V3C11 2.4 10.6 2 10 2C9.4 2 9 2.4 9 3V5C9 5.6 9.4 6 10 6C10.6 6 11 5.6 11 5ZM15 5V3C15 2.4 14.6 2 14 2C13.4 2 13 2.4 13 3V5C13 5.6 13.4 6 14 6C14.6 6 15 5.6 15 5ZM19 5V3C19 2.4 18.6 2 18 2C17.4 2 17 2.4 17 3V5C17 5.6 17.4 6 18 6C18.6 6 19 5.6 19 5Z"
																				fill="currentColor" />
																			<path
																				d="M8.8 13.1C9.2 13.1 9.5 13 9.7 12.8C9.9 12.6 10.1 12.3 10.1 11.9C10.1 11.6 10 11.3 9.8 11.1C9.6 10.9 9.3 10.8 9 10.8C8.8 10.8 8.59999 10.8 8.39999 10.9C8.19999 11 8.1 11.1 8 11.2C7.9 11.3 7.8 11.4 7.7 11.6C7.6 11.8 7.5 11.9 7.5 12.1C7.5 12.2 7.4 12.2 7.3 12.3C7.2 12.4 7.09999 12.4 6.89999 12.4C6.69999 12.4 6.6 12.3 6.5 12.2C6.4 12.1 6.3 11.9 6.3 11.7C6.3 11.5 6.4 11.3 6.5 11.1C6.6 10.9 6.8 10.7 7 10.5C7.2 10.3 7.49999 10.1 7.89999 10C8.29999 9.90003 8.60001 9.80003 9.10001 9.80003C9.50001 9.80003 9.80001 9.90003 10.1 10C10.4 10.1 10.7 10.3 10.9 10.4C11.1 10.5 11.3 10.8 11.4 11.1C11.5 11.4 11.6 11.6 11.6 11.9C11.6 12.3 11.5 12.6 11.3 12.9C11.1 13.2 10.9 13.5 10.6 13.7C10.9 13.9 11.2 14.1 11.4 14.3C11.6 14.5 11.8 14.7 11.9 15C12 15.3 12.1 15.5 12.1 15.8C12.1 16.2 12 16.5 11.9 16.8C11.8 17.1 11.5 17.4 11.3 17.7C11.1 18 10.7 18.2 10.3 18.3C9.9 18.4 9.5 18.5 9 18.5C8.5 18.5 8.1 18.4 7.7 18.2C7.3 18 7 17.8 6.8 17.6C6.6 17.4 6.4 17.1 6.3 16.8C6.2 16.5 6.10001 16.3 6.10001 16.1C6.10001 15.9 6.2 15.7 6.3 15.6C6.4 15.5 6.6 15.4 6.8 15.4C6.9 15.4 7.00001 15.4 7.10001 15.5C7.20001 15.6 7.3 15.6 7.3 15.7C7.5 16.2 7.7 16.6 8 16.9C8.3 17.2 8.6 17.3 9 17.3C9.2 17.3 9.5 17.2 9.7 17.1C9.9 17 10.1 16.8 10.3 16.6C10.5 16.4 10.5 16.1 10.5 15.8C10.5 15.3 10.4 15 10.1 14.7C9.80001 14.4 9.50001 14.3 9.10001 14.3C9.00001 14.3 8.9 14.3 8.7 14.3C8.5 14.3 8.39999 14.3 8.39999 14.3C8.19999 14.3 7.99999 14.2 7.89999 14.1C7.79999 14 7.7 13.8 7.7 13.7C7.7 13.5 7.79999 13.4 7.89999 13.2C7.99999 13 8.2 13 8.5 13H8.8V13.1ZM15.3 17.5V12.2C14.3 13 13.6 13.3 13.3 13.3C13.1 13.3 13 13.2 12.9 13.1C12.8 13 12.7 12.8 12.7 12.6C12.7 12.4 12.8 12.3 12.9 12.2C13 12.1 13.2 12 13.6 11.8C14.1 11.6 14.5 11.3 14.7 11.1C14.9 10.9 15.2 10.6 15.5 10.3C15.8 10 15.9 9.80003 15.9 9.70003C15.9 9.60003 16.1 9.60004 16.3 9.60004C16.5 9.60004 16.7 9.70003 16.8 9.80003C16.9 9.90003 17 10.2 17 10.5V17.2C17 18 16.7 18.4 16.2 18.4C16 18.4 15.8 18.3 15.6 18.2C15.4 18.1 15.3 17.8 15.3 17.5Z"
																				fill="currentColor" />
																		</svg>
																	</span>
																	<input class="form-control form-control-solid ps-12" name="exp_date_card_act" placeholder="Date" id="exp_date_card_act"/>
																</div>
															</div>
															<div class="col-lg-2">
																<button class="btn btn-sm btn-primary me-2">Add</button>
															</div>
															<!-- <div class="d-flex align-items-center justify-content-end">
																<button class="btn btn-sm btn-primary me-2">Add</button>
															</div> -->
														</div>
														<div class="row mt-4">
															<table id="kt_datatable_card_activate" class="table align-middle table-row-dashed table-striped table-hover fs-7 gy-1 gs-2 dataTable">
																	<thead>
																	   <tr class="text-start text-muted fw-bold fs-7 gs-0">
																	   	<th class="min-w-50px">Sno</th>
																	   	<th class="min-w-150px">Card Type</th>
																	   	<th class="min-w-150px">Card No</th>
																	    <th class="min-w-150px">Expiry Date</th>
																			<th class="min-w-100px">Action</th>
																	   </tr>
																	</thead>
																	<tbody class="text-gray-600 fw-semibold">
																		<tr>
																			<td>1</td>
																      <td>Gold</td>
																      <td>20222300003</td>
																      <td>16-03-2035</td>
																      <td>
																				<span class="text-end">
																					<a href="#" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm" data-bs-toggle="modal" data-bs-target="#">
																						<i class="fas fa-trash eyc fs-4"></i>
																					</a>
																				</span>
																			</td>
														        </tr>
														        <tr>
																			<td>2</td>
																      <td>Silver</td>
																      <td>20222300004</td>
																      <td>18-03-2035</td>
																      <td>
																				<span class="text-end">
																					<a href="#" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm" data-bs-toggle="modal" data-bs-target="#">
																						<i class="fas fa-trash eyc fs-4"></i>
																					</a>
																				</span>
																			</td>
														        </tr>
														        <tr>
																			<td>3</td>
																      <td>Platinum</td>
																      <td>20222300005</td>
																      <td>22-03-2035</td>
																      <td>
																				<span class="text-end">
																					<a href="#" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm" data-bs-toggle="modal" data-bs-target="#">
																						<i class="fas fa-trash eyc fs-4"></i>
																					</a>
																				</span>
																			</td>
														        </tr>
														        <tr>
																			<td>4</td>
																      <td>Gold</td>
																      <td>20222300006</td>
																      <td>05-04-2035</td>
																      <td>
																				<span class="text-end">
																					<a href="#" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm" data-bs-toggle="modal" data-bs-target="#">
																						<i class="fas fa-trash eyc fs-4"></i>
																					</a>
																				</span>
																			</td>
														        </tr>
														        <tr>
																			<td>5</td>
																      <td>Silver</td>
																      <td>20222300007</td>
																      <td>09-04-2035</td>
																      <td>
																				<span class="text-end">
																					<a href="#" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm" data-bs-toggle="modal" data-bs-target="#">
																						<i class="fas fa-trash eyc fs-4"></i>
																					</a>
																				</span>
																			</td>
														        </tr>
																	</tbody>
															</table>
															<div class="d-flex align-items-center justify-content-end">
																<button class="btn btn-primary me-2">Activate</button>
															</div>
														</div>
													</div>
													<div class="tab-pane fade show active" id="kt_tab_pane_card_activate_list" role="tabpanel">
														<div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
															<!--begin::Filter-->
															<button type="button" class="btn btn-sm btn-outline btn-outline-solid btn-outline-warning btn-active-light-primary me-3" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
																Filter</button>
															<div class="menu menu-sub menu-sub-dropdown w-300px w-md-325px" data-kt-menu="true">
																<div class="px-7 py-5" data-kt-user-table-filter="form">
																<form method="POST" action="<?php echo base_url(); ?>/Membershipcardavailable/list"    >
																	<div class="mb-2">
																		<label class="form-label fs-6 fw-semibold">Card Type</label>
																		<select class="form-select form-select-solid fw-semibold" data-control="select2" data-close-on-select="true" name="card_type_fill" id="card_type_fill">	
																			<option value="" selected>All</option>
																			<option value="Silver" <?php if($card_type_fill=='Silver'){ echo "selected"; }?>>Silver</option>
																			<option value="Gold" <?php if($card_type_fill=='Gold'){ echo "selected"; }?>>Gold</option>
																			<option value="Platinum" <?php if($card_type_fill=='Platinum'){ echo "selected"; }?>>Platinum</option>
																		</select>
																	</div>
																	<div class="mb-2">
																		<label class="form-label fs-6 fw-semibold">User</label>
																		<select class="form-select form-select-solid fw-semibold" data-control="select2" data-close-on-select="true" name="user_fill" id="user_fill">	
																			<option value="" selected>All</option>
																			<?php foreach($user_list as $ulist){ ?>
																					<option value="<?php echo $ulist['NAME']; ?>"  <?php if($user_fill==$ulist['NAME']){ echo "selected"; } ?>><?php echo $ulist['NAME']; ?></option>
                                                                                    <?php } ?>
																		</select>
																	</div>
																	<div class="d-flex justify-content-end">
																		<button type="reset" class="btn btn-light btn-active-light-primary fw-semibold me-2 px-6" data-kt-menu-dismiss="true" data-kt-user-table-filter="reset">Reset</button>
																		<button type="submit" class="btn btn-primary fw-semibold px-6" data-kt-menu-dismiss="true" data-kt-user-table-filter="filter">Apply</button>
																	</div>
																</div>
																</form>
															</div>
															<button type="button" class="btn btn-sm btn-outline btn-outline-solid btn-outline-warning btn-active-light-primary me-3" data-bs-toggle="modal" data-bs-target="#" style="display: none;">
																Export</button>
														</div>
														<div class="row mt-4">
															<table id="kt_datatable_card_activate_list" class="table align-middle table-row-dashed table-striped table-hover fs-7 gy-4 gs-2 dataTable">
																	<thead>
																	   <tr class="text-start text-muted fw-bold fs-7 gs-0">
																	   	<th class="min-w-50px">Sno</th>
																	   	<th class="min-w-150px">User</th>
																	   	<th class="min-w-150px">Card Type</th>
																	   	<th class="min-w-150px">Card No</th>
																	    <th class="min-w-150px">Expiry Date</th>
																	   <!-- <th class="min-w-150px">Status</th>-->
																			<!-- <th class="min-w-100px">Action</th> -->
																	   </tr>
																	</thead>
																	<tbody class="text-gray-600 fw-semibold">
																	<?php $i=1; foreach($activate_list as $alist){ ?>
																		<tr>
																			<td><?php echo $i; ?> </td>
																      <td><?php echo $alist['CREATED_BY']; ?></td>
																      <td><?php
																	 
																		echo $alist['CARD_TYPE'];
																	 

																	   ?></td>
																      <td><?php echo $alist['MEMBERSHIP_NO']; ?></td>
																      <td><?php echo $alist['EXP_DATE']; ?></td>
																    
																      <!-- <td>
																				<span class="text-end">
																					<a href="#" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm" data-bs-toggle="modal" data-bs-target="#">
																						<i class="fas fa-trash eyc fs-4"></i>
																					</a>
																				</span>
																			</td> -->
														        </tr>
<?php  $i++; } ?>
														        
																	</tbody>
															</table>

															<?php 
										$coun = ceil( $count/10);
										$c_page = isset($_GET['page']) ? $_GET['page'] : 1;
									?>
									<?php $paging_info = get_paging_info1($count,10,$c_page); ?>

<form   method="POST" id="filter_form" action="" enctype="multipart/form-data" >
	
   
	<input type="hidden" id="card_type_fill" name="card_type_fill"  value="<?php echo $card_type_fill; ?>">
	<input type="hidden" id="user_fill" name="user_fill"  value="<?php echo $user_fill; ?>">
	
	


                                  

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
														</div>
													</div>
												</div>
											<!--begin::Table-->
											<!--end::Table-->
										</div>
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
		<?php $this->load->view("script");?>
		<!-- <script src="js/products-list.js"></script> -->


		<script>

$(document).ready(function() {
	
	$(".move_to").on("click", function () {
		value=$(this).val();
		// alert(value);
		$('#filter_form').attr('action', "<?php echo base_url(); ?>Membershipcardavailable/list?page="+value);
		$("#filter_form").submit();
		e.preventDefault();
	});
});
</script>
		<script>
			      $("#kt_datatable_card_activate").kendoTooltip({
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
			      $("#kt_datatable_card_activate_list").kendoTooltip({
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
			
			$("#exp_date_card_act").flatpickr({
								dateFormat: "d-m-Y",
							});
			$("#today_date").flatpickr({
								dateFormat: "d-m-Y",
							});
</script>
<script>
			$("#kt_datatable_card_activate").DataTable({
				
				// "responsive": true,
				"aaSorting":[],
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
			$('#kt_datatable_card_activate').wrap('<div class="dataTables_scroll" />');
		</script>
		
	</body>
	<!--end::Body-->
</html>