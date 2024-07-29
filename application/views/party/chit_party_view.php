<?php $this->load->view("common");?>
<style>
    .dataTables_scroll2
    {
        position: relative;
        overflow: auto;
        max-height: 450px;/*the maximum height you want to achieve*/
        width: 100%;
    }
  .dataTables_scroll2 thead{
    position: -webkit-sticky;
    position: sticky;
    top: 0;
    /*background-color: #fff;*/
    background-color: #ec9629;
    z-index: 2;
  }
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
									<h1 class="d-flex align-items-center text-dark fw-bold my-1 fs-3">Party
										<label class="d-flex align-items-center text-dark fw-bold my-1 fs-3">
											<span>&nbsp;-&nbsp;</span>
											<?php if(isset($party_details)){ ?>
											<?php 
												if($party_details->RATING==3)
												{
													// echo '<b><span class="badge badge-success" style=>GOOD</span></b>';
													echo '<span><i class="fa-solid fa-star fs-3" style="color:#50cd89;"></i> </span>';
												}
												else if($party_details->RATING==2)
												{
													// echo '<b><span class="badge badge-warning">AVERAGE</span></b>';
													echo '<span><i class="fa-solid fa-star fs-3" style="color:#ffc700;"></i> </span>';
												}
												else if($party_details->RATING==1)
												{
													// echo '<b><span class="badge badge-danger">BAD</span></b>';
													echo '<span><i class="fa-solid fa-star fs-3" style="color:red;"></i> </span>';
												}
												else
												{
													echo '<span><i class="fa-solid fa-star fs-3" style="color:#d2d4dc;"></i> </span>';
												}
												?>
											<span>&nbsp;<?php echo $party_details->NAME;?>&nbsp;<?php echo $party_details->FATHERSNAME; }?>	
										</label>
									<!--begin::Separator-->
									<span class="h-20px border-gray-400 border-start ms-3 mx-2"></span></h1>
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
											<?php if(isset($party_details)){ ?>
												<div class="card-body py-4">	
													<div class="mb-5 hover-scroll-x">
														<div class="d-grid">
															<ul class="nav nav-tabs flex-nowrap text-nowrap" role="tablist">
																<li class="nav-item" role="presentation">
																	<a class="nav-link btn btn-active-light btn-color-black-800 btn-active-color-primary rounded-bottom-0 fw-bold fs-6 "  href="<?php echo base_url();?>Party/party_view/<?php echo $party_details->PID;?>" aria-selected="true" role="tab">Party Info</a>
																</li>
																<li class="nav-item" role="presentation">
																	<a class="nav-link btn btn-active-light btn-color-black-800 btn-active-color-primary rounded-bottom-0 fw-bold fs-6"  href="<?php echo base_url();?>Party/party_loan_view/<?php echo $party_details->PID;?>" aria-selected="false" role="tab" tabindex="-1">Loans</a>
																</li>
																<li class="nav-item" role="presentation">
																	<a class="nav-link btn btn-active-light btn-color-black-800 btn-active-color-primary rounded-bottom-0 fw-bold fs-6"  href="<?php echo base_url();?>Party/party_jewel_view/<?php echo $party_details->PID;?>" aria-selected="false" role="tab" tabindex="-1">Jewel</a>
																</li>
																<li class="nav-item" role="presentation">
																	<a class="nav-link btn btn-active-light btn-color-black-800 btn-active-color-primary rounded-bottom-0 fw-bold fs-6 active" data-bs-toggle="tab" href="#kt_tab_pane_chit"  aria-selected="true" role="tab" >Chit</a>
																</li>
																<li class="nav-item" role="presentation">
																	<a class="nav-link btn btn-active-light btn-color-black-800 btn-active-color-primary rounded-bottom-0 fw-bold fs-6"  href="<?php echo base_url();?>Party/karupatti_party_view/<?php echo $party_details->PID ;?>" aria-selected="false" role="tab" tabindex="-1">Karuppati</a>
																</li>
																<li class="nav-item" role="presentation">
																	<a class="nav-link btn btn-active-light btn-color-black-800 btn-active-color-primary rounded-bottom-0 fw-bold fs-6"  href="<?php echo base_url();?>Party/realestate_party_view/<?php echo $party_details->PID ;?>" aria-selected="false" role="tab" tabindex="-1">Real Estate</a>
																</li>
																<li class="nav-item">
																	<a class="nav-link btn btn-active-light btn-color-black-800 btn-active-color-primary rounded-bottom-0 fw-bold fs-6"  href="<?php echo base_url();?>Party/membership_party_view/<?php echo $party_details->PID;?>">Membership</a>
																</li>
																<li class="nav-item">
																	<a class="nav-link btn btn-active-light btn-color-black-800 btn-active-color-primary rounded-bottom-0 fw-bold fs-6"  href="<?php echo base_url();?>Party/party_rating_view/<?php echo $party_details->PID;?>">Rating History</a>
																</li>
															</ul>
														</div>
													</div>
													<div class="tab-content" id="myTabContent">
														<div class="tab-pane fade active show" id="kt_tab_pane_chit"role="tabpanel">
															<div class="row">
																<div class="col-lg-12">
																	<div class="row">
																		<div class="col-lg-4">
																			<div class="text-center">
																				<label class="form-label fs-3 fw-bold">Selvamagal</label>
																			</div>
																			<div class="text-center">
																				<label class="fw-bold fs-3">
																					<i class="fas fa-list-ol fs-3" title="Selvamagal Cash Chit Count"></i>&nbsp; <?php echo $sm_count; ?> &emsp; 
																					<i class="fas fa-money-bill-wave fs-4 me-2" title="Available Amount"></i>
																					<span class="align-items-center fs-3 fw-bold" title="Available Amount"><i class="fa-solid fa-indian-rupee-sign fs-6 text-dark"></i>&nbsp;<?php $sm_cashs = $sm_cash; echo number_format($sm_cashs,2,'.',',');?>
																					</span>
																				</label>
																			</div>
																		</div>
																		<div class="col-lg-4">
																			<div class="text-center">
																				<label class="form-label fs-3 fw-bold">Thangamagal Cash</label>
																			</div>
																			<div class="text-center">
																				<label class="fw-bold fs-3">
																					<i class="fas fa-list-ol fs-3" title="Thangamagal Cash Chit Count"></i>&nbsp;<?php echo $tmc_count; ?>&emsp;
																					<i class="fas fa-money-bill-wave fs-4 me-2" title="Available Amount"></i>
																					<span class="align-items-center fs-4 fw-bold" title="Available Amount"><i class="fa-solid fa-indian-rupee-sign fs-6 text-dark"></i>&nbsp;<?php $tm_cashs = $tm_cash; echo number_format($tm_cashs,2,'.',',');?>
																					</span>
																				</label>
																			</div>
																		</div>
																		<div class="col-lg-4">
																			<div class="text-center">
																				<label class="form-label fs-3 fw-bold">Thangamagal Gold</label>
																			</div>
																			<div class="text-center">
																				<label class="fw-bold fs-3">
																					<i class="fas fa-list-ol" title="Thangamagal Gold Chit Count"></i>&nbsp;
																					<?php echo $tmg_count; ?>&emsp;
																					<i class="fas fa-balance-scale fs-4 me-2" title="Available Gold"></i>
																					<span class="align-items-center" title="Available Gold"><?php echo $tm_gold; ?> gms</span>
																				</label>
																			</div>
																		</div>
																	</div>
																</div>
															</div>
															<table id="chit_table_party_view" class="table align-middle table-striped table-hover fs-7 gy-1 gs-2">
																<thead>
																	<tr class="text-center text-muted fw-bold fs-7 gs-0">
																		<th class="min-w-25px">Sno</th>
																		<th class="min-w-75">Date</th>
																		<th class="min-w-100px">User</th>
																		<th class="min-w-25px">Type</th>
																		<th class="min-w-100px">Scheme</th>
																		<th class="min-w-80px">Scheme Type</th>
																		<th class="min-w-125px">Open Balance</th>
																		<th class="min-w-150px">Process Amount</th>
																		<th class="min-w-125px">Closing Balance</th>
																		<th class="min-w-125px">Status</th>
																	</tr>
																</thead>
																<tbody class="text-gray-600 fw-semibold">
																	<?php $i=1; foreach($arr as $val) { ?>
																	<tr>
																		<td><?php echo $i; ?></td>
																		<td>
																			<?php $date_format  = $this->db->query("SELECT * FROM general_settings ")->row();
																			 $format= $date_format->date_format;
																			 echo date("$format", strtotime($val['trans_date']));
																			?> 
																		</td>
																		<td class="ple1">
																		<!-- <span><i class="fa-solid fa-star fs-7" style="color:orange;"></i></span> -->
																		<span class="align-items-center"><?php echo $val['created_by']; ?></span></td>
																		<td><?php echo $val['type']; ?></td>
																		<td>
																			<label>
																				<span>
																					<?php echo $val['scheme']; ?>
																				</span>
																				<span class="d-block">
																					<?php echo $val['scheme_id']; ?>
																				</span>
																			</label>
																			
																		</td>
																		<td><?php echo $val['sche_ty']; ?></td>
																		<td><?php echo $val['opening_amount']; ?></td>
																		<td><?php echo $val['processing_amount']; ?></td>
																		<td><?php echo $val['closing_balance']; ?></td>
																		<td><label class="col-form-label fw-semibold fs-7" name="" id="">
																				<?php echo $val['status']; ?>
																			</label>
																		</td>
																	</tr>
																	<?php $i++; } ?>
																</tbody>
															</table>
														</div>
													</div>
												</div>
											<?php } ?>
											<!--end::Card body-->
										</div>
									</div>
									<!--end::Tables Widget 9-->
								</div>
								<!--end::Col-->
							</div>
							<!--end::Row-->
						</div>
						<!--end::Container-->
					<?php $this->load->view("footer");?>
					</div>
					<!--end::Content-->
				</div>
				<!--end::Wrapper-->
			</div>
			<!--end::Page-->
		</div>
		<!--end::Root-->
		<input type="hidden" id="baseurl" value="<?php echo base_url(); ?>">
		<?php $this->load->view("script");?>
		<script>
			$("#chit_table_party_view").DataTable({
				//"aaSorting":[],
				"sorting":false,
				"paging": true,
				"pageLength": 25,
				"responsive": true,
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
			$('#chit_table_party_view').wrap('<div class="dataTables_scroll2" />');
		</script>
	</body>
	<!--end::Body-->
</html>