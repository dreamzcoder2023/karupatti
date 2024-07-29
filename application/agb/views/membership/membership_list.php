<?php $this->load->view("common"); ?>
<!-- Auto Complete CSS Start -->
<style>
	.xdsoft_autocomplete,
.xdsoft_autocomplete div,
.xdsoft_autocomplete span{
/*	-moz-box-sizing: border-box !important;
	box-sizing: border-box !important;*/
}

.xdsoft_autocomplete{
display:inline;
position:relative;
word-spacing: normal;
text-transform: none;
text-indent: 0px;
text-shadow: none;
text-align: start;
}
/*.xdsoft_autocomplete_dropdown
{
	left: 0px !important;
    top: 31px !important;
    margin-left: 0px !important;
    margin-right: 0px !important;
    width: 500px !important;
    display: none !important;
    max-height: 475px !important;
}*/

.xdsoft_autocomplete .xdsoft_input{
	position:relative;
	z-index:2;
}
.xdsoft_autocomplete .xdsoft_autocomplete_dropdown{
	position:absolute;
	border: 1px solid #ccc;
	border-top-color: #d9d9d9;
	box-shadow: 0 2px 4px rgba(0,0,0,0.2);
	-webkit-box-shadow: 0 2px 4px rgba(0,0,0,0.2);
	cursor: default;
	display:none;
	z-index: 1001;
	margin-top:-1px;
	background-color:#fff;
	/*min-width:100%;*/
	width: 240px !important;
	overflow:auto;
	max-height: 300px !important;
    /*overflow-y: auto !important;
    overflow-x: auto !important;*/
    /*padding-right: 20px !important;*/
}
.xdsoft_autocomplete .xdsoft_autocomplete_hint{
	position:absolute;
	z-index:1;
	color:#ccc !important;
	-webkit-text-fill-color:#ccc !important;
	text-fill-color:#ccc  !important;
	overflow:hidden !important;
	white-space: pre  !important;
}

.xdsoft_autocomplete .xdsoft_autocomplete_hint span{
	color:transparent;
	opacity: 0.0;
}

.xdsoft_autocomplete .xdsoft_autocomplete_dropdown > .xdsoft_autocomplete_copyright{
	color:#ddd;
	font-size:10px;
	text-decoration:none;
	right:5px;
	position:absolute;
	margin-top:-15px;
	z-index:1002;
}
.xdsoft_autocomplete .xdsoft_autocomplete_dropdown > div{
	background:#fff;
	white-space: nowrap;
	cursor: pointer;
	line-height: 1.5em;
	padding: 2px 0px 2px 0px;
}
.xdsoft_autocomplete .xdsoft_autocomplete_dropdown > div.active{
	background: #0097CF;
	color: #FFFFFF;
}

</style>
<!-- Auto Complete CSS end -->
<!--begin::Body-->
<body data-kt-name="metronic" id="kt_body"
	class="header-fixed header-tablet-and-mobile-fixed toolbar-enabled toolbar-fixed aside-enabled aside-fixed">
	<!--begin::Theme mode setup on page load-->
	<script>if (document.documentElement) { const defaultThemeMode = "system"; const name = document.body.getAttribute("data-kt-name"); let themeMode = localStorage.getItem("kt_" + (name !== null ? name + "_" : "") + "theme_mode_value"); if (themeMode === null) { if (defaultThemeMode === "system") { themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light"; } else { themeMode = defaultThemeMode; } } document.documentElement.setAttribute("data-theme", themeMode); }</script>
	<!--end::Theme mode setup on page load-->
	<!--begin::Main-->
	<!--begin::Root-->
	<div class="d-flex flex-column flex-root">
		<!--begin::Page-->
		<div class="page d-flex flex-row flex-column-fluid">
			<?php $this->load->view("sidebar"); ?>
			<!--begin::Wrapper-->
			<div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
				<?php $this->load->view("header"); ?>
				<!--begin::Toolbar-->
				<div class="toolbar py-2" id="kt_toolbar">
					<!--begin::Container-->
					<div id="kt_toolbar_container" class="container-fluid d-flex align-items-center">
						<!--begin::Page title-->
						<div class="flex-grow-1 flex-shrink-0 me-5">
							<!--begin::Page title-->
							<div data-kt-swapper="true" data-kt-swapper-mode="prepend"
								data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}"
								class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
								<!--begin::Title-->
								<h1 class="d-flex align-items-center text-dark fw-bold my-1 fs-3">Membership List
									<span class="h-20px border-gray-400 border-start ms-3 mx-2"></span>
									<!-- <label class="d-flex align-items-center text-primary fw-bold my-1 fs-5">
										<span>Membership card Type &emsp;-</span>
										<span>&emsp;All</span>
									</label>
									<span class="h-20px border-gray-400 border-start ms-3 mx-2"></span>
									<label class="d-flex align-items-center text-primary fw-bold my-1 fs-5">
										<span>Party&emsp;-</span>
										<span>&emsp;Roshan</span>
									</label> -->
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
										<!--begin::Card title-->
										<div class="row">
											<div class="col-lg-8">
												<div class="row">
													<div class="col-lg-4">
														<div class="text-center">
															<label class="form-label fs-3 fw-bold">Silver</label>
														</div>
														<div class="text-center">
															<label class="text-success fs-2 fw-bold"><?php echo $silver_count;?></label>
														</div>
													</div>
													<div class="col-lg-4">
														<div class="text-center">
															<label class="form-label fs-3 fw-bold">Gold</label>
														</div>
														<div class="text-center">
															<label class="text-success fs-2 fw-bold"><?php echo $gold_count;?></label>
														</div>
													</div>
													<div class="col-lg-4">
														<div class="text-center">
															<label class="form-label fs-3 fw-bold">Platinum</label>
														</div>
														<div class="text-center">
															<label class="text-success fs-2 fw-bold"><?php echo $platinum_count;?></label>
														</div>
													</div>
												</div>
											</div>
											<div class="col-lg-4">
												<div class="d-flex justify-content-end"
													data-kt-user-table-toolbar="base">
													<!--begin::Filter-->
													<button type="button"
														class="btn btn-sm btn-outline btn-outline-solid btn-outline-warning btn-active-light-primary me-3" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Filter
													</button>
													<div class="menu menu-sub menu-sub-dropdown w-300px w-md-325px" data-kt-menu="true">
														<form action="<?php echo base_url();?>Membership" method="POST" >
															<div class="px-7 py-5" data-kt-user-table-filter="form">
																<div class="mb-2">
																	<label class="form-label fs-6 fw-semibold">Membership card Type</label>
																	<select name="ary[]" class="form-select form-select-solid"
																		data-control="select2" data-close-on-select="true"
																		data-allow-clear="true" multiple="multiple">
																		<option value="" selected>All</option>
																		<option value="Silver">Silver</option>
																		<option value="Gold">Gold</option>
																		<option value="Platinum">Platinum</option>
																	</select>
																</div>
																<div class="mb-2">
																	<label class="form-label fs-6 fw-semibold">Party</label>
																	<div class="fv-row fv-plugins-icon-container">
																		<input type="text" name="party_name_fill" id="party_name_fill" class="form-control form-control-lg1 form-control-solid" placeholder="Party Name" value="<?php echo $party_nm_fill; ?>">
																	  <div class="fv-plugins-message-container invalid-feedback"></div>
																	</div>
																	<div class="d-flex justify-content-end">
																		<button type="reset" class="btn btn-light btn-active-light-primary fw-semibold me-2 px-6" data-kt-menu-dismiss="true" data-kt-user-table-filter="reset">Reset</button>
																		<button type="submit"class="btn btn-primary fw-semibold px-6" data-kt-menu-dismiss="true" data-kt-user-table-filter="filter">Apply
																		</button>
																	</div>
																</div>
															</div>
														</form>
													</div>
													<button type="button"class="btn btn-sm btn-outline btn-outline-solid btn-outline-warning btn-active-light-primary me-3"data-bs-toggle="modal" data-bs-target="#">Export
													</button>
													<!--begin::add member-->
													<button type="button" class="btn btn-primary" data-bs-toggle="modal"data-bs-target="#kt_modal_new_membership">New Membership</button>
													<!--end::Add member-->
													</a>
												</div>
											</div>
										</div>
										<!--end::Card title-->
									</div>
									<!--end::Card header-->
									<!--begin::Card body-->
									<div class="card-body py-4">
										<table id="kt_datatable_responsive_membership"
											class="table align-middle table-row-dashed table-striped table-hover fs-7 gy-1 gs-2 dataTable">
											<thead>
												<tr class="text-start text-muted fw-bold fs-7 gs-0">
													<th class="min-w-50px">Sno</th>
													<th class="min-w-80px">Membership Card Type</th>
													<th class="min-w-100px">Party</th>
													<th class="min-w-150px">Available Points</th>
													<th class="min-w-100px">Issue Date</th>
													<th class="min-w-100px">Expiry Date</th>
													<th class="min-w-100px">Action</th>
												</tr>
											</thead>
											<tbody class="text-gray-600 fw-semibold">
												<?php 
													$i=1;
														foreach ($mem_list as $mlist) {	
													?>
												<tr>
													<td><?php echo $i; ?></td>
												
													<td>
														<?php
															if($mlist['CARD_TYPE'] == 'Silver')
															{
														?>
															<label class="col-form-label fw-semibold fs-7" name="" id=""><span style="background-color:#C0C0C0;border-radius: 8px;padding: 5px 15px 5px 15px;">Silver</span>
															</label>
														<?php 
															}
															elseif($mlist['CARD_TYPE'] == 'Gold')
															{
														?>
																<label class="col-form-label fw-semibold fs-7" name="" id=""><span style="background-color:#ffaa00;border-radius: 8px;padding: 5px 15px 5px 15px;">Gold</span>
																</label>
														<?php
															}
															elseif($mlist['CARD_TYPE'] == 'Platinum')
															{
														?>
															<label class="col-form-label fw-semibold fs-7" name="" id=""><span style="background-color:#E5E4E2;border-radius: 8px;padding: 5px 15px 5px 15px;">Platinum</span>
															</label>
														<?php
															}
															else{
															?>
															<label class="col-form-label fw-semibold fs-7" name="" id="">-</label>
														<?php
															}
															?>
														<!-- <?php //echo $mlist['CARD_TYPE'];?> -->
													</td>
													<td><?php echo $mlist['NAME'];?></td>
													<td><?php echo $mlist['POINTS'];?></td>
													<td>
														<?php echo date_format(date_create($mlist['ISSUE_DATE']),$_SESSION['DATE_PATTERN']);?>
													</td>
													<td>
														<?php echo date_format(date_create($mlist['EXP_DATE']),$_SESSION['DATE_PATTERN']);?>
													</td>
													<td>
														<span class="text-end">
															<a href="<?php echo base_url(); ?>Membership/membership_history/<?php echo $mlist['PID'];?>" target="_blank" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm">
																<i class="fas fa-history eyc fs-4" title="Membership History"></i>
															</a>
															<a href="#"
																class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1" data-bs-toggle="modal" data-bs-target="#kt_modal_change_membership"
																title="Change Membership" onclick="change_membership_edit('<?php echo $mlist['PID'];?>')">
																<i class="fa-solid fa-file-pen eyc fs-4"></i>
															</a>
															<!-- <a href="membership_history.php" target="_blank"
																class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm">
																<i class="fas fa-history eyc fs-4" title="Membership History"></i>
															</a>
															<a href="#"
																class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1"
																data-bs-toggle="modal" data-bs-target="#kt_modal_change_membership"
																title="Change Membership Type">
																<i class="fa-solid fa-file-pen eyc fs-4"></i>
															</a> -->
														</span>
													</td>
												</tr>
												<?php 
														$i++;
														}
													?>
											</tbody>
										</table>

										<?php 
										$coun = ceil( $count/10);
										$c_page = isset($_GET['page']) ? $_GET['page'] : 1;
									?>
									<?php $paging_info = get_paging_info1($count,10,$c_page); ?>
									<form   method="POST" id="filter_form" action="" enctype="multipart/form-data" >
									    <!-- <input type="hidden" id="dt_fill" name="dt_fill"  value="<?php echo $dt_fill; ?>">
									    <input type="hidden" id="from_date_fillter" name="from_date_fillter" value="<?php echo $from_date_fillter; ?>">
										<input type="hidden" id="to_date_fillter" name="to_date_fillter" value="<?php echo $to_date_fillter; ?>">
										<input type="hidden" id="company_fill" name="company_fill"  value="<?php echo $company_fill; ?>">
										<input type="hidden" id="type_fill" name="type_fill"  value="<?php echo $type_fill; ?>"> -->
										<ul class="pagination " style="float:right;" >
										<!-- If the current page is more than 1, show the First and Previous links -->
										<?php if($paging_info['curr_page'] > 1) : ?>
										   
										   <li class='paginate_button page-item move_to' value="<?php echo ($paging_info['curr_page'] - 1); ?>" > <a aria-controls='kt_roles_view_table' data-dt-idx='1' tabindex='0' class='page-link'  title='Page <?php echo ($paging_info['curr_page'] - 1); ?>'><</a></li>
										   
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
											<?php if($paging_info['curr_page'] >= $max) : ?>\
										   <li class='paginate_button page-item move_to' value="1" ><a aria-controls='kt_roles_view_table' data-dt-idx='1' tabindex='0' class='page-link' onclick="form_submit()"  title='Page 1'>1</a></li>
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

									        <li class='paginate_button page-item active move_to' value="<?php echo $i; ?>"> <a aria-controls='kt_roles_view_table' data-dt-idx='1' tabindex='0' onclick="form_submit()" class='page-link' title='Page <?php echo $i; ?>'><?php echo $i; ?></a></li>
									    <?php else : ?>

									       <li class='paginate_button page-item move_to ' value="<?php echo $i; ?>"> <a aria-controls='kt_roles_view_table' data-dt-idx='1' tabindex='0' onclick="form_submit()" class='page-link'  title='Page <?php echo $i; ?>'><?php echo $i; ?></a></li>

									    <?php endif; ?>

									<?php endfor; ?>
									<!-- If the current page is less than say the last page minus $max pages divided by 2-->
									<?php if($paging_info['curr_page'] < ($paging_info['pages'] - floor($max / 2))) : ?>

									    ..
									    <li class='paginate_button page-item  move_to' value="<?php echo $paging_info['pages']; ?>"><a  aria-controls='kt_roles_view_table' data-dt-idx='1' tabindex='0' onclick="submit()" class='page-link'   title='Page <?php echo $paging_info['pages']; ?>'><?php echo $paging_info['pages']; ?></a></li>

									<?php endif; ?>

									<!-- Show last two pages if we're not near them -->
									<?php if($paging_info['curr_page'] < $paging_info['pages']) : ?>

									  	<li class='paginate_button page-item move_to ' value="<?php echo ($paging_info['curr_page'] + 1); ?>">  <a aria-controls='kt_roles_view_table' data-dt-idx='1' tabindex='0' onclick="submit()" class='page-link'  title='Page <?php echo ($paging_info['curr_page'] + 1); ?>'>></a></li>

									   

									<?php endif; ?>
									</ui>
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
				<?php $this->load->view("footer"); ?>
			</div>
			<!--end::Root-->
			<!--end::Modal body-->
		</div>
		<!--end::Modal content-->
	</div>
	<!--end::Modal dialog-->
	</div>
	<!--end::Modal - Membership Entry-->
	
	<!--begin::Modal - Change membership-->
	<div class="modal fade" id="kt_modal_change_membership" tabindex="-1" aria-hidden="true">
		
		
	</div>
	<!--end::Change membership-->
	<!--end::Modal dialog-->
	</div>
	<!--begin::Modal - New membership-->
	<div class="modal fade" id="kt_modal_new_membership" tabindex="-1" aria-hidden="true">
		<!--begin::Modal dialog-->
		<div class="modal-dialog modal-s">
			<!--begin::Modal content-->
			<div class="modal-content rounded">
				<!--begin::Modal header-->
				<div class="modal-header justify-content-end border-0 pb-0">
					<!--begin::Close-->
					<div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
						<!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
						<span class="svg-icon svg-icon-1">
							<svg width="24" height="24" viewBox="0 0 24 24" fill="none"
								xmlns="http://www.w3.org/2000/svg">
								<rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1"
									transform="rotate(-45 6 17.3137)" fill="currentColor" />
								<rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)"
									fill="currentColor" />
							</svg>
						</span>
						<!--end::Svg Icon-->
					</div>
					<!--end::Close-->
				</div>
				<!--end::Modal header-->
				<!--begin::Modal body-->
				<!--begin::Modal body-->
				<div class="modal-body pt-0 pb-15 px-5 px-xl-20">
					<!--begin::Heading-->
					<div class="mb-5 text-center">
						<h1 class="mb-3">New Membership</h1>
					</div>
					<!--end::Heading-->
					<form method="POST" class="form" action="<?php echo base_url(); ?>Membership/membership_save" enctype="multipart/form-data" onsubmit="return membership_add_validation();">
						<div class="row">
							<label class="col-lg-4 col-form-label required fw-semibold fs-6">Issue Date</label>
							<div class="col-lg-8 fv-row">
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
									<input class="form-control form-control-solid ps-12" name="kt_datepicker_issue_date" placeholder="Date" id="kt_datepicker_issue_date" />
								</div>
								<div class="fv-plugins-message-container invalid-feedback" id="add_mem_issue_date_err"></div>
							</div>
						</div>
						<div class="row">
							<label class="col-lg-4 col-form-label required fw-semibold fs-6">Party</label>
							<div class="col-lg-8 fv-row fv-plugins-icon-container">
								<input type="text" name="first_name" id="first_name" class="form-control form-control-lg1 form-control-solid" placeholder="Party Name" oninput="this.value = this.value.replace(/[^A-Za-z. ]/g, '').replace(/(\..*)\./g, '$1');">
								<input type="hidden" name="first_name_id_hidden" id="first_name_id_hidden" value="">
								<div class="fv-plugins-message-container invalid-feedback" id="first_name_err"></div>
							</div>
						</div>
						<div class="row">
							<label class="col-lg-4 col-form-label required fw-semibold fs-6">Type</label>
							<div class="col-lg-8">
								<select class="form-select form-select-solid" data-control="select2"
									data-hide-search="true" id="mem_type" name="mem_type" onchange="member_type();">
									<option value="">Select Type</option>
									<option value="Silver">Silver</option>
									<option value="Gold">Gold</option>
									<option value="Platinum">Platinum</option>
								</select>
								<div class="fv-plugins-message-container invalid-feedback" id="mem_type_err"></div>
							</div>
						</div>
						<div class="row">
							<label class="col-lg-4 col-form-label required fw-semibold fs-6">Card No</label>
							<div class="col-lg-8">
								<select class="form-select form-select-solid" data-control="select2"
									data-hide-search="true" id="mem_card_no" name="mem_card_no" onchange="member_card_no();">
									<option value="">Select Card No</option>
									
								</select>
								<div class="fv-plugins-message-container invalid-feedback" id="mem_card_no_err"></div>
							</div>
							<!-- <div class="col-lg-8 fv-row fv-plugins-icon-container">
								<input type="text" name="mem_card_no" id="mem_card_no" class="form-control form-control-lg1 form-control-solid"
									placeholder="Scan Here.." onkeyup="card_no_unique(this.value);">
								<div class="fv-plugins-message-container invalid-feedback" id="mem_card_no_err"></div>
							</div> -->
						</div>
						<div class="row">
							<label class="col-lg-4 col-form-label fw-semibold fs-6">Expiry Date</label>
							<label class="col-lg-8 col-form-label fw-bold fs-5" id="exp_date"></label>
							<input type="hidden" id="exp_date_hid" name="exp_date_hid">
							<!-- <div class="col-lg-8 fv-row">
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
									<input class="form-control form-control-solid ps-12" name="kt_exp_date" placeholder="Date" id="kt_exp_date" />
								</div>
								<div class="fv-plugins-message-container invalid-feedback" id="kt_datepicker_exp_date_err"></div>
							</div> -->
						</div>
						<div class="row">
							<label class="col-lg-4 col-form-label fw-semibold fs-6">Add Points</label>
							<div class="col-lg-8 fv-row fv-plugins-icon-container">
								<input type="text" name="mem_add_points" id="mem_add_points"  oninput="this.value = this.value.replace(/[^0-9. ]/g, '').replace(/(\..*)\./g, '$1');" class="form-control form-control-lg1 form-control-solid" placeholder="Points" >
							</div>
						</div>
						<!--butt-->
						<div class="d-flex justify-content-center mt-13">
							<button type="reset" class="btn btn-secondary me-2" data-bs-dismiss="modal">Cancel</button>
							<button type="submit" class="btn btn-primary" id="save_changes_new_mem" onclick="checkifpartyexist()">New Membership</button>
						</div>
					</form>
					<!--end::Modal body-->
				</div>
				<!--end::Modal content-->
			</div>
			<!--end::Modal dialog-->
		</div>
		<!-- </form> -->
	</div>
	<!--end::Modal - New membership -->
	<!-- Begin :: Modal - Flash data Membership-->
	<?php echo $this->session->flashdata('g_success'); if($this->session->flashdata('g_success')){?>
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

	<!--script start-->
	<input type="hidden" id="baseurl" value="<?php echo base_url(); ?>">
	<?php $this->load->view("script"); ?>
	 <script>
	 $(document).ready( function() {
        document.getElementById("pop_up_success").click()
        });
		
		$(document).ready(function() {
			
	        $(".move_to").on("click", function () {
				value=$(this).val();
				// alert(value);
	            $('#filter_form').attr('action', "<?php echo base_url(); ?>Membership?page="+value);
	            $("#filter_form").submit();
	            e.preventDefault();
	        });
	    });

		
	</script>
	<script src="assets/jquery.autocomplete.js"></script>
	<script>
		var title = $('title').text() + ' | ' + 'Membership List ';
    	$(document).attr("title", title);
	</script>
	
	<script>
	
		function close_chagne_mem_modal()
			{
				var baseurl= $("#baseurl").val();
				$('#kt_modal_change_membership').removeClass('show');
				//$("#kt_modal_update_role").css("display", "none");
				$('.modal-backdrop').removeClass('show');
				window.location.href = baseurl+'Membership';
			}
	</script>
	<script>
		function member_type(){
			var baseurl= $("#baseurl").val();
			var mem_type= $("#mem_type").val();
			// var mem_card_no= $("#mem_card_no").val();
			//alert(val);
			$.ajax({
			type: "POST",
			url: baseurl+'Membership/get_membership_type',
			async: false,
			type: "POST",
			data: "mem_type="+mem_type,
			dataType: "html",
			success: function(response)
			{
				$('#mem_card_no').empty().append(response);
			}
			});

			}
	</script>
	<script>
		function member_card_no(){
			var baseurl= $("#baseurl").val();
			var mem_card_no= $("#mem_card_no").val();
			//alert(val);
			$.ajax({
			type: "POST",
			url: baseurl+'Membership/get_membership_exp_date',
			async: false,
			type: "POST",
			data: "mem_card_no="+mem_card_no,
			dataType: "html",
			success: function(response)
			{
				// date('Y-m-d H:i:s');
				var exp_dt = response.trim();
				var exp_dt1 = response.trim();
				exp_dt = exp_dt.split("-").reverse().join("-");
				$('#exp_date').html(exp_dt);
				$('#exp_date_hid').val(exp_dt1);
			}
			});

			}
	</script>
	<script>
		function change_member_card_no(){
			var baseurl= $("#baseurl").val();
			var change_mem_card_no= $("#change_mem_card_no").val();
			//alert(val);
			$.ajax({
			type: "POST",
			url: baseurl+'Membership/get_change_membership_exp_date',
			async: false,
			type: "POST",
			data: "change_mem_card_no="+change_mem_card_no,
			dataType: "html",
			success: function(response)
			{
				// date('Y-m-d H:i:s');
				var exp_dt = response.trim();
				var exp_dt1 = response.trim();
				exp_dt = exp_dt.split("-").reverse().join("-");
				$('#change_exp_date').html(exp_dt);
				$('#change_exp_date_hid').val(exp_dt1);
			}
			});

			}
	</script>
	<script>
		
		function change_member_type(){
			var baseurl= $("#baseurl").val();
			var change_mem_type= $("#change_mem_type").val();
			// var mem_card_no= $("#mem_card_no").val();
			//alert(val);
			$.ajax({
			type: "POST",
			url: baseurl+'Membership/get_change_membership_type',
			async: false,
			type: "POST",
			data: "change_mem_type="+change_mem_type,
			dataType: "html",
			success: function(response)
			{
				$('#change_mem_card_no').empty().append(response);
				
			}
			});

			}
	</script>
	
	<script>
		function change_membership_edit(val){
			var baseurl= $("#baseurl").val();
			//alert(val);
			$.ajax({
			type: "POST",
			url: baseurl+'Membership/change_membership',
			async: false,
			type: "POST",
			data: "id="+val,
			dataType: "html",
			success: function(response)
			{
			$('#kt_modal_change_membership').empty().append(response);
			$('#kt_modal_change_membership').addClass('show');
			//$("#kt_modal_editdept").css("display", "block");
			}
			});
			}
	</script>
	<script>
		var berr=0;
			// function card_no_unique(val)
			// {
			// 	var baseurl= $("#baseurl").val();
			// 	$.ajax({
			// 		type:"POST",
			// 		url:baseurl+'Membership/card_no_unique',
			// 		data:{'value':val},
			// 		cache: false,
			// 		dataType: "html",
			// 			success: function(result){
			// 			if(result>0)
			// 			{
			// 				$('#mem_card_no_err').html('Already Issued Card No!');
			// 				berr=1;
			// 			}
			// 			else
			// 			{
			// 				$('#mem_card_no_err').html('');
			// 				berr=0;
			// 			}
			// 		}
			// 	});
			// }

			function membership_add_validation()
			{
				// var baseurl= $("#baseurl").val();
				 var val= $("#mem_card_no").val();
				 var err = 0;
				//Issue Date Field
				var add_mem_issue_date = $('#kt_datepicker_issue_date').val();
			    if(add_mem_issue_date.trim()==''){
			        $('#add_mem_issue_date_err').html('Please Select a Issue Date!');
			        err++;
			    }else{
			    	$('#add_mem_issue_date_err').html('');
			    }

			    //Party Name Field 
			    var first_name = $('#first_name').val();
			    if(first_name.trim()==''){
			        $('#first_name_err').html('Please Enter Party Name!');
			        err++;
			    }else{
			    	$('#first_name_err').html('');
			    }

				var party_name_id = $('#first_name_id_hidden').val();
				

				if(party_name_id.trim() == ''){
					$('#first_name_err').html('Invalid Party Name!');
			        err++;
			    }else{
			    	$('#first_name_err').html('');
			    }
				

				//Membership Type Field 
				var mem_type = $('#mem_type').val();
			    if(mem_type.trim()==''){
			        $('#mem_type_err').html('Please Select a Type!');
			        err++;
			    }else{
			    	$('#mem_type_err').html('');
			    }			    
			    
			    //Card No Field 
				var mem_card_no = $('#mem_card_no').val();
			    if(mem_card_no.trim()==''){
			        $('#mem_card_no_err').html('Please Select a Card No!');
			        err++;
			    }else{
			    	if(berr>0)
					{
						$('#mem_card_no_err').html('Already Issued Card No!');
						err++;
					}
					else
					{
						$('#mem_card_no_err').html('');
					}
			    }


			    if(err>0){ return false; }else{ return true; }
			}
	</script>
	<script>
		// change membership Validation
		var berr1=0;
		function change_membership_validation()
			{
				var err1 = 0;

				//Issue Date Field
				var issue_date_change_mem = $('#issue_date_change_mem').val();
			    if(issue_date_change_mem.trim()==''){
			        $('#issue_date_change_mem_err').html('Please Select a Issue Date!');
			        err1++;
			    }else{
			    	$('#issue_date_change_mem_err').html('');
			    }

				//Membership Type Field 
				var change_mem_type = $('#change_mem_type').val();
			    if(change_mem_type.trim()==''){
			        $('#change_mem_type_err').html('Please Select a Type!');
			        err1++;
			    }else{
			    	$('#change_mem_type_err').html('');
			    }			    
			    
			    //Card No Field 
				var change_mem_card_no = $('#change_mem_card_no').val();
			    if(change_mem_card_no.trim()==''){
			        $('#change_mem_card_no_err').html('Please Select a Card No!');
			        err1++;
			    }else{
			    	if(berr1>0)
					{
						$('#change_mem_card_no_err').html('Already Issued Card No!');
						err1++;
					}
					else
					{
						$('#change_mem_card_no_err').html('');
					}
			    }
			    // return false;

			    if(err1>0){ return false; }else{ return true; }
			}
	</script>
	<script>
		var baseurl = $("#baseurl").val();
	        $("#first_name").autocomplete({ 
	                valueKey:'title',
	                source:[{
	                url:baseurl+'Membership/Partyname?query=%QUERY%',
	                type:'remote',
	                ajax:{
	                  dataType : 'json',
	                }
	            }]}).on('selected.xdsoft',function(e,suggestion,ui){ 
	                $("#first_name").val(suggestion.firstname);
	                $('#first_name_id_hidden').val(suggestion.id);
	                 // const arr_modal = {modal:"#kt_modal_newloan", values:["#jewel_type","#loan_type","#add_relation_new_loan","#int_type","#add_ptyname_new_loan","#credit_ledger"]};
	                 // kt_modal("#kt_modal_particular_loan_lists",suggestion.id,arr_modal);
	        });
	</script>
	
	<script>

		$("#kt_datepicker_issue_date").flatpickr({
			dateFormat: "<?php echo date('d-m-Y'); ?>",
			maxDate: "today",
		});
		$("#kt_exp_date").flatpickr({
			dateFormat: "d-m-Y",
		});
	</script>

</body>
<!--end::Body-->

</html>