<?php $this->load->view("common"); ?>
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
    background-color: #fff;
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
									<h1 class="d-flex align-items-center text-dark fw-bold my-1 fs-3">Chit List
									<!--begin::Separator-->
									<span class="h-20px border-gray-400 border-start ms-3 mx-2"></span>
									<label class="d-flex align-items-center text-primary fw-bold my-1 fs-5">
										<span>Party &emsp;-</span>
										<span>&emsp;<?php if($party_fil==''){ echo "All"; }else{ echo $party_fil; } ?></span>
									</label></h1>
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
							<?php if(isset($_SESSION['Chit entryView'])){ if($_SESSION['Chit entryView']==1){?>
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
															<div class="row">
																<div class="col-lg-6">
																	<div class="text-center">
																		<label class="form-label fs-3 fw-bold">Selvamagal</label>
																	</div>
																	<div class="text-center">
																		<label class="text-success fs-2 fw-bold"><?php foreach($sm_count as $sm) echo $sm['sm_count']; ?></label>
																	</div>
																</div>
																<div class="col-lg-6">
																	<div class="text-center">
																		<label class="form-label fs-3 fw-bold">Thangamagal</label>
																	</div>
																	<div class="text-center">
																		<label class="text-success fs-2 fw-bold"><?php foreach($tmc_count as $tm) foreach($tmg_count as $tmg) echo $tm['tmc_count']+$tmg['tmg_count']; ?></label>
																	</div>
																</div>
															</div>
														</div>
														<div class="col-lg-4">
															<div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
																<!--begin::Filter-->
																<button type="button" class="btn btn-sm btn-outline btn-outline-solid btn-outline-warning btn-active-light-primary me-3" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
																	Filter</button>	
																<div class="menu menu-sub menu-sub-dropdown w-300px w-md-325px" data-kt-menu="true">
																  <div class="px-7 py-5" data-kt-user-table-filter="form">	
																		<form method="POST" autocomplete="off" action="<?php echo base_url(); ?>Chit/" enctype="multipart/form-data" id="fill_form">		
																				<div class="mb-2">
																				<label class="form-label fs-6 fw-semibold">Party</label>
																					<div class="col-lg-12 fv-row fv-plugins-icon-container">
																						<input type="text" name="party_fil" id="party_fil" class="form-control form-control-lg form-control-solid" placeholder="Party Name" value="<?php echo $party_fil?$party_fil:''; ?>">
																					</div>
																				</div>
																				<div class="d-flex justify-content-end">
																					<button type="reset" class="btn btn-light btn-active-light-primary fw-semibold me-2 px-6" data-kt-menu-dismiss="true" data-kt-user-table-filter="reset" onclick="reset_fill()">Reset</button>
																					<button type="submit" class="btn btn-primary fw-semibold px-6" data-kt-menu-dismiss="true" data-kt-user-table-filter="filter">Apply</button>
																				</div>
																		</form>
																	</div>
																</div>
																<form method="POST" id="list_export1" action="<?php echo base_url(); ?>Chit/chit_list_export">
																	<input type="hidden" id="party_fil" name="party_fil" value="<?php echo $party_fil; ?>">
																 </form>
																	<button type="button" id="submit_export" class="btn btn-sm btn-outline btn-outline-solid btn-outline-warning btn-active-light-primary me-3">Export</button>
																
																<!-- <button type="button" class="btn btn-sm btn-outline btn-outline-solid btn-outline-warning btn-active-light-primary me-3">Export</button> -->
																<?php if(isset($_SESSION['Chit entryAdd'])){ if($_SESSION['Chit entryAdd']==1){?>
																	<span>
																		<a href="<?php echo base_url();?>Chit/chit_add" target="_blank">
																		<button type="button" class="btn btn-primary">
																			<span class="svg-icon svg-icon-2">
																				<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																					<rect opacity="0.5" x="11.364" y="20.364" width="16" height="2" rx="1" transform="rotate(-90 11.364 20.364)" fill="currentColor" />
																					<rect x="4.36396" y="11.364" width="16" height="2" rx="1" fill="currentColor" />
																				</svg>
																			</span>
																      New Chit
																    </button>
																	</a>
																</span>
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
													<table id="chit_list_table" class="table align-middle table-striped table-hover fs-7 gy-1 gs-2">
														<thead>
														   <tr class="text-start text-muted fw-bold fs-7 gs-0">
															   	<th class="min-w-25px">Sno</th>
																	<th class="min-w-100px">Party Info</th>
																	<th class="min-w-80px" >Selvamagal</th>
		                            	<th class="min-w-25px" colspan="2" rowspan="1"> 
		                            		<span class="ms-18">Thangamagal</span> 
		                            	</th>
																	<th class="min-w-80px" >Tot no of Chit</th>
																	<th class="min-w-150px" style="width: 20%;"> 
																		<span class="text-end">Actions</span> 
																	</th>
															</tr>
		                          <tr class="text-start text-muted fw-bold fs-7 gs-0">
															   	<th class="min-w-50px" ></th>
																	<th class="min-w-100px" > </th>
																	<th class="min-w-100px" >Amount</th>
		                              <th class="min-w-25px" >Amount</th>
		                              <th class="min-w-100px" >Gold(gms)</th>
		                              <th class="min-w-125p" ></th>
																	<th class="min-w-125p" ></th>
													  	</tr>
														</thead>
														<tbody class="text-gray-600 fw-semibold">
															<?php 
																$i=1; 
																	foreach ($arr as $val){
																		?>
															<tr>
																<td><?php echo $i; ?></td>
																<td class="ple1">
																	<span class="align-items-center"><i class="fa-solid fa-star fs-5" 
																		style="<?php 
																			if($val['rating']==3) echo 'color:#50cd89;';
																			if($val['rating']==2) echo 'color:#ffc700;';
																			if($val['rating']==1) echo 'color:red;';
																			if($val['rating']=='' || is_null($val['rating'])) echo 'color:#d2d4dc;';
																			?>">
																			</i>&nbsp;<?php echo $val['name'];?>
																	</span>
																</td>
																<td>
																	<span><i class="fas fa-list-ol fs-5" title="Selvamagal Cash Chit Count"></i>&nbsp; <?php echo $val['sm_count']; ?></span>&emsp;
																	<span><i class="fa-solid fa-indian-rupee-sign fs-7 text-dark"></i>&nbsp;<?php $s_m_amt = $val['sm_ava_balance']; echo isset($s_m_amt)? number_format($s_m_amt,2,'.',','):'0.00';?>
																	</span>
																</td>
			                          <td>
			                            <i class="fas fa-list-ol fs-5" title="Thangamagal Cash Chit Count"></i>&nbsp;<?php echo $val['tmc_count']; ?>&emsp;
			                            <span><i class="fa-solid fa-indian-rupee-sign fs-7 text-dark"></i>&nbsp;<?php $t_m_amt = $val['tmc_ava_balance']; echo isset($t_m_amt)? number_format($t_m_amt,2,'.',','):'0.00';?>
																	</span>
			                          </td>
																<td> 
																	<label>
																		<i class="fas fa-list-ol fs-5" title="Thangamagal Gold Chit Count"></i>&nbsp;
																		<?php echo $val['tmg_count']; ?>&emsp;
																		<span class="fs-6 text-gray-800 text-hover-primary fw-semibold" align="left">
																			<!--Gold-->
																			<svg fill="#d4af37" width="20px" height="20px" viewBox="0 0 32 32" version="1.1" xmlns="http://www.w3.org/2000/svg">
																				<path d="M11.652 19.245l-0.001-0.001-0.005-0.003zM30.671 16.098l-2.207-5.839-8.022-4.361-16.624 8.861-2.431 6.495 9.8 5.214 0.161-7.067-7.624-4.353 0.654 0.346-0.373-0.215 1.332 0.708-1.212-0.708 7.526 4.065 16.205-8.376-2.594 1.424 3.037-1.551-6.011 3.183-10.434 5.727-0.668 6.816 19.484-10.371zM11.976 17.206l-4.389-2.342 4.269 1.32 13.070-5.8-12.95 6.822z">
																				</path>
																			</svg>
																		</span>
																		<span class="text-start" align="right">
																			<?php echo isset($val['tmg_ava_balance']) ? round($val['tmg_ava_balance'],2):0; ?> 
																		</span>
																	</label>
																</td>
																<td><?php echo '&nbsp',$val['sm_count']+$val['tmc_count']+$val['tmg_count'].'&nbsp';?> 
																</td>
																<td>
																	<span class="text-end">
																		<?php if(isset($_SESSION['Chit entryView'])){ if($_SESSION['Chit entryView']==1){?>
																			<a href="javascript:;" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm" data-bs-toggle="modal" data-bs-target="#kt_view_chit_details" title="View" onclick="list_view('<?php echo $val['pid'];?>');">
																			<i class="bi bi-eye-fill eyc"></i>
																			</a>
																		<?php }} ?>
																		<?php if(isset($_SESSION['Chit depositView'])){ if($_SESSION['Chit depositView']==1){?>
																			<a href="javascript:;">
																			<button type="button" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm" data-bs-toggle="modal" data-bs-target="#kt_deposit_chit_details" title="Deposit" onclick="deposit_view('<?php echo $val['pid'];?>');">
																			<i class="bi bi-piggy-bank-fill eyc"></i>
																			</button>
																			</a>
																		<?php }} ?>
																		<?php if(isset($_SESSION['Chit withdrawView'])){ if($_SESSION['Chit withdrawView']==1){?>
																			<a href="javascript:;">
																			<button type="button" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm" data-bs-toggle="modal" data-bs-target="#kt_withdraw_chit_details" title="Withdraw" onclick="widthdraw_view('<?php echo $val['pid'];?>');">
																			<i class="fa-solid fa-right-from-bracket eyc fs-4"></i>
																			</button>
																			</a>
																		<?php }} ?>
																		<?php if(isset($_SESSION['Transaction HistoryView'])){ if($_SESSION['Transaction HistoryView']==1){?>
																			<a href="<?php echo base_url();?>Chit/chit_transaction_history/<?php echo $val['pid']; ?>" target="_blank">
																			<button type="button" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm" data-bs-toggle="modal" title="Transaction-History" data-bs-target="javascript:;">
																			<i class="fas fa-history eyc fs-4"></i>
																			</button>
																			</a>
																		<?php }} ?>
																	</span>
																</td>
															</tr>
															<?php $i++; } ?>
														</tbody>
													</table>
													<?php 
														$coun = ceil( $count/10);
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
													<?php $paging_info = get_paging_info1($count,10,$c_page); ?>

																<form   method="POST" id="filter_form" action="" enctype="multipart/form-data" >
																	
																	

																<input type="hidden" id="party_fil" name="party_fil"  value="<?php echo $party_fil; ?>">



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
							<?php }}else{?><?php $this->load->view("common_role_permission_err"); ?><?php } ?>
					</div>
					<!--end::Content-->
				<?php $this->load->view("footer");?>
				</div>
				<!--end::Wrapper-->
			</div>
			<!--end::Page-->
		</div>
		<!--end::Root-->
		<div class="modal fade" id="kt_view_chit_details" tabindex="-1" aria-hidden="true">
		<!-- <form id="kt_add_product_form" class="form"> -->
				<!--begin::Modal dialog-->
				<div class="modal-dialog modal-xl" role="document" style="max-width:1250px;">
					<!--begin::Modal content-->
					<div class="modal-content rounded">
						<!--begin::Modal header-->
						<div class="modal-header justify-content-end border-0 pb-0">
							<!--begin::Close-->
							<div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal" onclick="closeViewModal();">
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
								<h1 class="mb-3">Chit Details</h1>	
							</div>
							<!--end::Heading-->
							<table id="chit_view_table" class="table align-middle table-striped table-hover fs-7 gy-4 gs-2">
								<thead>
									<tr class="text-start text-muted fw-bold fs-7 gs-0">
										<th class="min-w-25px">Sno</th>
										<th class="min-w-25px">Date</th>
										<th class="min-w-125px">Chit ID</th>
										<th class="min-w-25px">Scheme</th>
										<th class="min-w-100px">Chit Amount</th>
										<th class="min-w-25px">Collection Type</th>
										<th class="min-w-25px">Collection Day</th>
										<th class="min-w-80px">Deposit</th>
										<th class="min-w-80px">Withdraw</th>
										<th class="min-w-80px">Avl.Balance</th>
										<th class="min-w-90px">Actions</th>
									</tr>
								</thead>
								<tbody class="text-gray-600 fw-semibold " id="chit_list">
									
								</tbody>
							</table>
							<!--end::Actions-->
						</div>
						<!--end::Modal body-->
					</div>
					<!--end::Modal content-->
				</div>
				<!--end::Modal dialog-->
			<!-- </form> -->
		</div>
		<div class="modal fade" id="kt_deposit_chit_details" tabindex="-1" aria-hidden="true">
		<!-- <form id="kt_add_product_form" class="form"> -->
				<!--begin::Modal dialog-->
				<div class="modal-dialog modal-xl">
					<!--begin::Modal content-->
					<div class="modal-content rounded">
						<!--begin::Modal header-->
						<div class="modal-header justify-content-end border-0 pb-0">
							<!--begin::Close-->
							<div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal" onclick="closeViewModal();">
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
								<h1 class="mb-3">Chit Details - Deposit</h1>	
							</div>
							<!--end::Heading-->
							<table id="chit_deposit_table" class="table align-middle table-striped table-hover fs-7 gy-4 gs-2">
								<thead>
									<tr class="text-start text-muted fw-bold fs-7 gs-0">
										<th class="min-w-25px">Sno</th>
										<th class="min-w-25px">Date</th>
										<th class="min-w-125px">Chit ID</th>
										<th class="min-w-50px">Scheme</th>
										<th class="min-w-100px">Chit Amount</th>
										<th class="min-w-25px">Collection Type</th>
										<th class="min-w-25px">Collection Day</th>
										<th class="min-w-90px">Deposit</th>
										<th class="min-w-90px">Withdraw</th>
										<th class="min-w-90px">Avl.Balance</th>
										<th class="min-w-50px">Actions</th>
									</tr>
								</thead>
								<tbody class="text-gray-600 fw-semibold" id="chit_list_deposit">
									
								</tbody>
							</table>
							<!--end::Actions-->
						</div>
						<!--end::Modal body-->
					</div>
					<!--end::Modal content-->
				</div>
				<!--end::Modal dialog-->
			<!-- </form> -->
		</div>
		<div class="modal fade" id="kt_withdraw_chit_details" tabindex="-1" aria-hidden="true">
		<!-- <form id="kt_add_product_form" class="form"> -->
				<!--begin::Modal dialog-->
				<div class="modal-dialog modal-xl">
					<!--begin::Modal content-->
					<div class="modal-content rounded">
						<!--begin::Modal header-->
						<div class="modal-header justify-content-end border-0 pb-0">
							<!--begin::Close-->
							<div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal" onclick="closeViewModal();">
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
								<h1 class="mb-3">Chit Details - Withdraw</h1>	
							</div>
							<!--end::Heading-->
							<table id="chit_withdraw_table" class="table align-middle table-striped table-hover fs-7 gy-4 gs-2">
								<thead>
									<tr class="text-start text-muted fw-bold fs-7 gs-0">
										<th class="min-w-25px">Sno</th>
										<th class="min-w-25px">Date</th>
										<th class="min-w-125px">Chit ID</th>
										<th class="min-w-50px">Scheme</th>
										<th class="min-w-100px">Chit Amount</th>
										<th class="min-w-25px">Collection Type</th>
										<th class="min-w-25px">Collection Day</th>
										<th class="min-w-90px">Deposit</th>
										<th class="min-w-90px">Withdraw</th>
										<th class="min-w-90px">Avl.Balance</th>
										<th class="min-w-50px">Actions</th>
									</tr>
								</thead>
								<tbody class="text-gray-600 fw-semibold" id="chit_list_withdraw">
									
								</tbody>
							</table>
							<!--end::Actions-->
						</div>
						<!--end::Modal body-->
					</div>
					<!--end::Modal content-->
				</div>
				<!--end::Modal dialog-->
			<!-- </form> -->
		</div>
		<!-- Flash Data::Start -->
		<?php if(isset($_SESSION['g_success'])){?>
                <div class="menu-item px-3">
                        <a href="#" id="pop_up_success" class="menu-link flex-stack px-3" data-bs-toggle="modal" data-bs-target="#success_modal"></a>
                        </div>
                 <?php } ?>
                <?php if(isset($_SESSION['g_err'])){?>
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
                            <b><span> <?php echo $_SESSION['g_success']; ?></span></b>
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
                            <b><span> <?php echo $_SESSION['g_err']; ?></span></b>
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
			
		<?php $this->load->view("script");?>
		<?php if(isset($_SESSION['Chit entryView'])){ if($_SESSION['Chit entryView']==1){?>
		<input type="hidden" id="baseurl" value="<?php echo base_url(); ?>">
		<!-- <script src="js/products-list.js"></script> -->
		<!-- Export Script::Start -->
		<script>
				$(document).ready(function(){
					$('#submit_export').click(function(){
						// alert(1)
					$('#list_export1').submit();
					});
				});
		</script>
		<!-- Export Script::End -->
		<!-- Flash Data Script::Start -->
		<script>
			function reset_fill(){

				$('#party_fil').val('');
				$('#fill_form').submit();
			}

		</script>
		<script>	
			<?php if($this->session->flashdata('g_success') || $this->session->flashdata('g_err')){?> 
			    $(document).ready( function() {
		        document.getElementById("pop_up_success").click()
		        });
		    <?php } ?>
    </script>
    </script>
		<!-- Flash Data Script::End -->
		<!-- Sales list day fillter start -->
		<script>
			function list_view(val)
			{
				// alert(val);
				// alert(val);
				var baseurl= $("#baseurl").val();
				// var str = val.replace('_','/');
				
				
				$.ajax({
				type: "GET",
				url: baseurl+'Chit/chit_list_modal',
				async: false,
				type: "GET",
				data: "party_id="+val,
				dataType: "json",
				success: function(response)
				
				{
					
					var list= ''
					var chit_id = ''
					var closed = '';
					var edit = '';
					var remove = '';
					if(response.length > 0){

						response.map((data,i)=>{
							collection_date="-";
							$scheme = '';
							if(response[i].scheme_type==1)
							{
								$scheme = "Selvamagal";
							}
							else if(response[i].scheme_type==2)
							{
								$scheme = "Thangamagal Cash";
							}
							else if(response[i].scheme_type==3)
							{
								$scheme = "Thangamagal Gold";
							}

							$collection = '';
							if(response[i].collection_type==1)
							{
								$collection = "Daily";
								collection_date="-";
							}
							else if(response[i].collection_type==2)
							{
								$collection = "Weekly";
								if(response[i].collection_day==1){
                   collection_date="Sunday";
								}
								else if(response[i].collection_day==2){
                   collection_date="Monday";
								}
								else if(response[i].collection_day==3){
                    collection_date="Tuesday";
								}
								else if(response[i].collection_day==4){
                  collection_date="Wednesday";
								}
								else if(response[i].collection_day==5){
                   collection_date="Thursday";
								}
								else if(response[i].collection_day==6){
                   collection_date="Friday";
								}
								else if(response[i].collection_day==7){
                    collection_date="Saturday";
								}
								else {
									collection_date="-";
								}
							
							}
							else if(response[i].collection_type==3)
							{
								$collection = "Monthly";
								collection_date = response[i].collection_date;
							}
							if(response[i].chit_id == null || response[i].chit_id == '')
							{
								chit_id = '';
							}
							else
							{
								chit_id = response[i].chit_id;
							}
							var chitid = chit_id.replace("/","_");
							if(response[i].tot_withdraw == null || response[i].tot_withdraw == '')
							{
								total_withdraw = '0.00';
								// alert(1)
							}
							else{
								total_withdraw = response[i].tot_withdraw;
								// alert(2)
							}
							if(response[i].type == 2)
							{
								closed = "<i class='fa-solid fa-circle-xmark fs-4 text-danger' title='closed'></i>";
								edit = '';
								remove = "<i class='fa-solid fa-circle-xmark fs-4 text-danger' title='closed'></i>";
								chit_id = "<span class='text-danger'>"+chit_id+"</span>";
							}
							else
							{
								closed = '';
								edit = "<a href='<?php echo base_url(); ?>Chit/edit_chit/"+chitid+"' class='btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1' title='close'><i class='fa-solid fa-circle-xmark fs-4'></i></a>"
								remove = "<a href='<?php echo base_url(); ?>Chit/chit_delete/"+chitid+"' class='btn btn-icon btn-bg-light btn-active-color-primary btn-sm' title='delete'><span class='svg-icon svg-icon-3'><svg width='24' height='24' viewBox='0 0 24 24' fill='none' xmlns='http://www.w3.org/2000/svg'><path d='M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z' fill='currentColor'></path><path opacity='0.5' d='M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z' fill='currentColor'></path><path opacity='0.5' d='M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z' fill='currentColor'></path></svg></span></a>"
							}
							// date = (format('DD-MM-YYYY',response[i].chit_date));
							// chit_amount=response[i].chit_amount;
							chit_amt= parseFloat(response[i].chit_amount);
							var chit_amount = chit_amt.toLocaleString('en-IN', {
								    maximumFractionDigits: 2,
								    style: 'currency',
								    currency: 'INR'
								});
								dept = parseFloat(response[i].tot_deposit);
									var tot_deposit = dept.toLocaleString('en-IN', {
								    maximumFractionDigits: 2,
								    style: 'currency',
								    currency: 'INR'
								});
									widr = parseFloat(response[i].tot_withdraw);
							  var total_withdraw = widr.toLocaleString('en-IN', {
								    maximumFractionDigits: 2,
								    style: 'currency',
								    currency: 'INR'
								});
								abal = parseFloat(response[i].ava_balance);
							  var ava_balance = abal.toLocaleString('en-IN', {
								    maximumFractionDigits: 2,
								    style: 'currency',
								    currency: 'INR'
								});
								if (response[i].scheme_type =='3') {
									tot_deposit    = response[i].tot_deposit.toFixed(3)+'&nbsp;(gms)';							
									total_withdraw = response[i].tot_withdraw.toFixed(3)+'&nbsp;(gms)';				 
									ava_balance    = response[i].ava_balance.toFixed(3)+'&nbsp;(gms)';	
								}
							
							list += "<tr><td>"+[i+1]+"</td><td class='ple1'><p id='chit_date'>"+response[i].chit_date+"</p></td><td><p id='chit_id'>"+chit_id+"&nbsp;"+closed+"</p></td><td><p id='scheme_type'>"+$scheme+"</p></td><td><p>"+chit_amount+"</p></td><td><p id='colection_type'>"+$collection+"</p></td><td id='coll_dt'> "+collection_date+"</td>	<td><p id='tot_deposit'>"+tot_deposit+"</p></td>	<td><p id='tot_withdraw'>"+total_withdraw+"</p></td><td><p id='ava_amt'>"+ava_balance+"</p></td><td>"+edit+"&nbsp;"+remove+"</td></tr>" 
							
						})
					}
					// alert(list);
					$('#chit_list').html(list);	
				}
			});
			}
		</script>
		<script>
			function deposit_view(val)
			{
			
				var baseurl= $("#baseurl").val();
				
				
				
				$.ajax({
				type: "GET",
				url: baseurl+'Chit/chit_list_modal',
				async: false,
				type: "GET",
				data: "party_id="+val,
				dataType: "json",
				success: function(response)
				// alert(data);
				// console.log(response)
				{

					// alert(response);
					var list= '';
					var closed = '';
					var deposit = '';

					if(response.length > 0){

						response.map((data,i)=>{

							$scheme = '';
							if(response[i].scheme_type==1)
							{
								$scheme = "Selvamagal";
							}
							else if(response[i].scheme_type==2)
							{
								$scheme = "Thangamagal Cash";
							}
							else if(response[i].scheme_type==3)
							{
								$scheme = "Thangamagal Gold";
							}

							$collection = '';
							if(response[i].collection_type==1)
							{
								$collection = "Daily";
								collection_date="-";
							}
							else if(response[i].collection_type==2)
							{
								$collection = "Weekly";
								if(response[i].collection_day==1){
                  collection_date="Sunday";
								}
								if(response[i].collection_day==2){
                  collection_date="Monday";
								}
								if(response[i].collection_day==3){
                  collection_date="Tuesday";
								}
								if(response[i].collection_day==4){
                  collection_date="Wednesday";
								}
								if(response[i].collection_day==5){
                  collection_date="Thursday";
								}
								if(response[i].collection_day==6){
                  collection_date="Friday";
								}
								if(response[i].collection_day==7){
                  collection_date="Saturday";
								}
							
							}
							else if(response[i].collection_type==3)
							{
								$collection = "Monthly";
								collection_date = response[i].collection_date;
							}

							if(response[i].tot_withdraw == null || response[i].tot_withdraw == '')
							{
								total_withdraw = '0.00';
								// alert(1)
							}
							else{
								total_withdraw = response[i].tot_withdraw;
								// alert(2)
							}
							
							if(response[i].chit_id == null || response[i].chit_id == '')
							{
								chit_id = '';
							}
							else
							{
								chit_id = response[i].chit_id;
							}
							if(response[i].type == 2)
							{
								closed = "<i class='fa-solid fa-circle-xmark fs-4 text-danger' title='Chit Closed'></i>";
								deposit = "<i class='fa-solid fa-circle-xmark fs-4 text-danger' title='Chit Closed'></i>";
								chit_id = "<span class='text-danger'>"+chit_id+"</span>";
							}
							else
							{
								closed = '';
								deposit = "<a target='_blank' href='<?php echo base_url(); ?>Chit/chit_deposit/"+response[i].sno +"'><i class='bi bi-piggy-bank-fill eyc'></i></a>"
							}
								chit_amt= parseFloat(response[i].chit_amount);
									var chit_amount = chit_amt.toLocaleString('en-IN', {
								    maximumFractionDigits: 2,
								    style: 'currency',
								    currency: 'INR'
								});
								dept = parseFloat(response[i].tot_deposit);
									var tot_deposit = dept.toLocaleString('en-IN', {
								    maximumFractionDigits: 2,
								    style: 'currency',
								    currency: 'INR'
								});
									widr = parseFloat(response[i].tot_withdraw);
							  var total_withdraw = widr.toLocaleString('en-IN', {
								    maximumFractionDigits: 2,
								    style: 'currency',
								    currency: 'INR'
								});
								abal = parseFloat(response[i].ava_balance);
							  var ava_balance = abal.toLocaleString('en-IN', {
								    maximumFractionDigits: 2,
								    style: 'currency',
								    currency: 'INR'
								});
								if (response[i].scheme_type =='3') {

									tot_deposit = response[i].tot_deposit.toFixed(3)+'&nbsp;(gms)';							
									total_withdraw = response[i].tot_withdraw.toFixed(3)+'&nbsp;(gms)';				 
									ava_balance = response[i].ava_balance.toFixed(3)+'&nbsp;(gms)';							  

								}
							list += "<tr><td>"+[i+1]+"</td><td class='ple1'><p id='chit_date'>"+response[i].chit_date +"</p></td><td><p id='chit_id'>"+chit_id+"&nbsp;"+closed+"</p></td><td><p id='scheme_type'>"+$scheme+"</p></td><td><p>"+chit_amount+"</p></td><td><p id='colection_type'>"+$collection+"</p></td> <td><p id='colection_ty'>"+collection_date+"</p></td><td><p id='tot_deposit'>"+tot_deposit+"</p></td>	<td><p id='tot_withdraw'>"+total_withdraw+"</p></td>	<td><p id='ava_balance'>"+ava_balance+"</p></td><td>"+deposit+"</td></tr>" 
						})

					}
					$('#chit_list_deposit').html(list)
				}
			});
			}
		</script>
		<script>
			function widthdraw_view(val)
			{
				var baseurl= $("#baseurl").val();
				$.ajax({
				type: "GET",
				url: baseurl+'Chit/chit_list_modal',
				async: false,
				type: "GET",
				data: "party_id="+val,
				dataType: "json",
				success: function(response)
				// alert(data);
				// console.log(response)
				{
					var list= ''
					var collection_day = ''
					var coll = ''
					var chit_id = ''
					var withdraw = '';
					// var count= 0
					// var nt_wt_tot= 0

					if(response.length > 0){

						response.map((data,i)=>{

							$scheme = '';
							if(response[i].scheme_type==1)
							{
								$scheme = "Selvamagal";
							}
							else if(response[i].scheme_type==2)
							{
								$scheme = "Thangamagal Cash";
							}
							else if(response[i].scheme_type==3)
							{
								$scheme = "Thangamagal Gold";
							}

							$collection = '';
							if(response[i].collection_type==1)
							{
								$collection = "Daily";
								collection_date = "-";
							}
							else if(response[i].collection_type==2)
							{
								$collection = "Weekly";
								if(response[i].collection_day==1){
                  collection_date = "Sunday";
								}
								if(response[i].collection_day==2){
                  collection_date = "Monday";
								}
								if(response[i].collection_day==3){
                  collection_date = "Tuesday";
								}
								if(response[i].collection_day==4){
                  collection_date = "Wednesday";
								}
								if(response[i].collection_day==5){
                  collection_date = "Thursday";
								}
								if(response[i].collection_day==6){
                  collection_date = "Friday";
								}
								if(response[i].collection_day==7){
                  collection_date = "Saturday";
								}
							
							}
							else if(response[i].collection_type==3)
							{
								$collection = "Monthly";
								collection_date = response[i].collection_date;
							}
						
							if (response[i].scheme_type !='3' && response[i].type == 1)
							{
								var withdraw="<a target = '_blank' href='<?php echo base_url(); ?>Chit/chit_withdraw/"+response[i].sno +"'><i class='fa-solid fa-right-from-bracket eyc fs-4'></i></a>";
								var closed = '';

							}
							else if(response[i].type == 2)
							{
								var withdraw="";
								var closed = "<i class='fa-solid fa-circle-xmark fs-4 text-danger' title='closed'></i>"
								
							}
							else
							{
								var withdraw = '';
								var closed = '';
							}
							if(response[i].tot_withdraw == null || response[i].tot_withdraw == '')
							{
								total_withdraw = '0.00';
								// alert(1)
							}
							else{
								total_withdraw = response[i].tot_withdraw;
								// alert(2)
							}

							if(response[i].chit_id == null || response[i].chit_id == '')
							{
								chit_id = '';
							}
							else
							{
								chit_id = response[i].chit_id;
							}
							chit_amt= parseFloat(response[i].chit_amount);
									var chit_amount = chit_amt.toLocaleString('en-IN', {
								    maximumFractionDigits: 2,
								    style: 'currency',
								    currency: 'INR'
								});
							dept = parseFloat(response[i].tot_deposit);
									var tot_deposit = dept.toLocaleString('en-IN', {
								    maximumFractionDigits: 2,
								    style: 'currency',
								    currency: 'INR'
								});
									widr = parseFloat(response[i].tot_withdraw);
							  var total_withdraw = widr.toLocaleString('en-IN', {
								    maximumFractionDigits: 2,
								    style: 'currency',
								    currency: 'INR'
								});
								abal = parseFloat(response[i].ava_balance);
							  var ava_balance = abal.toLocaleString('en-IN', {
								    maximumFractionDigits: 2,
								    style: 'currency',
								    currency: 'INR'
								});


								if (abal==0) {

									var withdraw="";
								  // var closed = "<i class='fa-solid fa-circle-xmark fs-4 text-danger' title='closed'></i>"

								}
								if (response[i].scheme_type =='3') {

									tot_deposit = response[i].tot_deposit.toFixed(3)+'&nbsp;(gms)';							
									total_withdraw = response[i].tot_withdraw.toFixed(3)+'&nbsp;(gms)';				 
									ava_balance = response[i].ava_balance.toFixed(3)+'&nbsp;(gms)';
								  

								}



							list += "<tr><td>"+[i+1]+"</td><td class='ple1'><p id='chit_date'>"+response[i].chit_date +"</p></td>	<td><p id='chit_id'>"+chit_id+"&nbsp;"+closed+"</p></td><td><p id='scheme_type'>"+$scheme+"</p></td><td><p id='chit_amount'>"+chit_amount+"</p></td><td><p id='colection_type'>"+$collection+"</p></td><td><p id='colection_ty'>"+collection_date+"</p></td><td><p id='tot_deposit'>"+tot_deposit+"</p></td>	<td><p id='tot_withdraw'>"+total_withdraw+"</p></td><td><p id='ava_balance'>"+ava_balance+"</p></td><td>"+withdraw+"</td></tr>" 
							
						
							
						})

					}
					$('#chit_list_withdraw').html(list)
					
				}
			});
			}
		</script>
		
		<script>

		$(document).ready(function() {
			
			$(".move_to").on("click", function () {
				value=$(this).val();
				// alert(value);
				$('#filter_form').attr('action', "<?php echo base_url(); ?>Chit?page="+value);
				$("#filter_form").submit();
				e.preventDefault();
			});
		});
		</script>
		<script>
			function date_fill_sales_list()
			{
				var dt_fill_sales_list = document.getElementById('dt_fill_sales_list').value;
				var today_dt_sales_list = document.getElementById('today_dt_sales_list');
				var week_from_dt_sales_list = document.getElementById('week_from_dt_sales_list');
				var week_to_dt_sales_list = document.getElementById('week_to_dt_sales_list');
				var monthly_dt_sales_list = document.getElementById('monthly_dt_sales_list');
				var from_dt_sales_list = document.getElementById('from_dt_sales_list');
				var to_dt_sales_list = document.getElementById('to_dt_sales_list');
				var from_date_fillter_sales_list = document.getElementById('from_date_fillter_sales_list');
				var to_date_fillter_sales_list = document.getElementById('to_date_fillter_sales_list');

				if (dt_fill_sales_list == "today") 
				{
					today_dt_sales_list.style.display = "block";
					monthly_dt_sales_list.style.display = "none";
					from_dt_sales_list.style.display = "none";
					to_dt_sales_list.style.display = "none";
					week_from_dt_sales_list.style.display = "none";
					week_to_dt_sales_list.style.display = "none";
					$("#today_date_fillter_sales_list").flatpickr({
								dateFormat: "d-m-Y",
							});
				}
				else if (dt_fill_sales_list == "week")
				{
					today_dt_sales_list.style.display = "none";
					week_from_dt_sales_list.style.display = "block";
					week_to_dt_sales_list.style.display = "block";
					monthly_dt_sales_list.style.display = "none";
					from_dt_sales_list.style.display = "none";
					to_dt_sales_list.style.display = "none";

					var curr = new Date; // get current date
					var first = curr.getDate() - curr.getDay(); // First day is the day of the month - the day of the week
					var last = first + 6; // last day is the first day + 6

					var firstday = new Date(curr.setDate(first)).toISOString().slice(0,10);
					firstday = firstday.split("-").reverse().join("-");
					var lastday = new Date(curr.setDate(last)).toISOString().slice(0,10);
					lastday = lastday.split("-").reverse().join("-");
					$('#week_from_date_fillter_sales_list').val(firstday);
					$('#week_to_date_fillter_sales_list').val(lastday);
					
				}
				else if (dt_fill_sales_list == "monthly")
				{
					today_dt_sales_list.style.display = "none";
					monthly_dt_sales_list.style.display = "block";
					from_dt_sales_list.style.display = "none";
					to_dt_sales_list.style.display = "none";
					week_from_dt_sales_list.style.display = "none";
					week_to_dt_sales_list.style.display = "none";
					$("#monthly_date_fillter_sales_list").flatpickr({
								dateFormat: "m-Y",
							});
				}
				else if (dt_fill_sales_list == "custom Date")
				{
					today_dt_sales_list.style.display = "none";
					monthly_dt_sales_list.style.display = "none";
					from_dt_sales_list.style.display = "block";
					to_dt_sales_list.style.display = "block";
					week_from_dt_sales_list.style.display = "none";
					week_to_dt_sales_list.style.display = "none";

					$("#from_date_fillter_sales_list").flatpickr({
								dateFormat: "d-m-Y",
							});
					$("#to_date_fillter_sales_list").flatpickr({
								dateFormat: "d-m-Y",
							});
				}
				else
				{
					today_dt_sales_list.style.display = "none";
					monthly_dt_sales_list.style.display = "none";
					from_dt_sales_list.style.display = "none";
					to_dt_sales_list.style.display = "none";
					week_from_dt_sales_list.style.display = "none";
					week_to_dt_sales_list.style.display = "none";
				}
			}
		</script>
		<!-- Sales list day fillter end -->
		<script>
			$("#chit_deposit_table").DataTable({
				
				"responsive": true,
				"paging": false,
				"sorting": false,
				"info": false,

				"aaSorting":[],
				 "language": {
				  "lengthMenu": "Show _MENU_",
				 },
				});
			$("#chit_withdraw_table").DataTable({
				
				"responsive": true,
				"paging": false,
				"sorting": false,
				"info": false,

				"aaSorting":[],
				 "language": {
				  "lengthMenu": "Show _MENU_",
				 },
				});
			$("#chit_view_table").DataTable({
				
				"responsive": true,
				"paging": false,
				"sorting": false,
				"info": false,

				"aaSorting":[],
				 "language": {
				  "lengthMenu": "Show _MENU_",
				 },
				});

			$("#chit_list_table").DataTable({
				
				"responsive": true,
				"paging": false,
				"sorting": false,
				"info": false,

				"aaSorting":[],
				 "language": {
				  "lengthMenu": "Show _MENU_",
				 },
				});
		</script>
		<script>
	      $("#chit_list_table").kendoTooltip({
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
	  <?php }} ?>

	</body>
	<!--end::Body-->
</html>

