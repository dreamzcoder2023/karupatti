<?php $this->load->view("common");?>
<style>
	.dataTables_scroll
    {
        position: relative;
        overflow: auto;
        height: 270px;
        max-height: 270px;/*the maximum height you want to achieve*/
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
									<h1 class="d-flex align-items-center text-dark fw-bold my-1 fs-3">Membership Points Update
									<!--begin::Separator-->
									<span class="h-20px border-gray-400 border-start ms-3 mx-2"></span>
									<!-- <label class="d-flex align-items-center text-primary fw-bold my-1 fs-5">
										<span>Company &emsp;-</span>
										<span>&emsp;All</span>
									</label> -->
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
										<form action="<?php echo base_url();?>Mcard_point/membership_points_update" method="post">
										<div class="card-body py-4">
											<div class="row mt-4">
												<div class="col-lg-8">
													<table class="table align-middle table-row-dashed table-striped table-hover fs-7 gy-1 gs-2" id="kt_datatable_mem_points_update_table">
														<thead>
															<tr class="text-start text-muted fw-bold fs-7 gs-0">
																<th class="min-w-25px">Sno</th>
																<th class="min-w-80px">Type</th>
																<th class="min-w-80px">For Amount</th>
																<th class="min-w-80px" style="min-width: 60px !important;">Points</th>
															</tr>
														</thead>
														<tbody class="text-gray-600 fw-semibold fs-7">
														<?php $i=1; foreach($membership_points as $mp) { ?>
															<tr>
																<td><?php echo $mp['ID']; ?>
																	<input type="hidden" class="form-control form-control-lg form-control-solid fs-7" id="sno" name="sno[]" value="<?php echo $mp['ID']; ?>">
																</td>
																<td><?php echo $mp['TYPE']; ?>
																	<input type="hidden" class="form-control form-control-lg form-control-solid fs-7" id="type" name="type[]" value="<?php echo $mp['TYPE']; ?>">
																</td>
																<td><?php echo $mp['FOR_AMOUNT']; ?>
																	<input type="hidden" class="form-control form-control-lg form-control-solid fs-7" id="for_amount" name="for_amount[]" value="<?php echo $mp['FOR_AMOUNT']; ?>">
																</td>
																<td>
																	<input type="text" class="form-control form-control-lg form-control-solid fs-7" id="points" name="points[]" value="<?php echo $mp['POINTS']; ?>">
																</td>
															</tr>
															<?php $i++; } ?>
														</tbody>
													</table>
												</div>
												
												<div class="d-flex justify-content-end mt-4">
													<!-- <button type="reset" class="btn btn-secondary me-2" data-bs-dismiss="modal">Cancel</button> -->
													<button type="submit" class="btn btn-primary">Update Points</button>
													</form>
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
				<?php $this->load->view("footer");?>
				</div>
				<!--end::Wrapper-->
			</div>
			<!--end::Page-->
		</div>
		<!--end::Root-->

	<?php $this->load->view("script");?>
	<!-- <script src="js/newloan-list.js"></script> -->
	<script>
		$("#kt_datatable_mem_points_update_table").kendoTooltip({
			filter: "td",
			show: function (e) {
				if (this.content.text() != "") {
					$('[role="tooltip"]').css("visibility", "visible");
				}
			},
			hide: function () {
				$('[role="tooltip"]').css("visibility", "hidden");
			},
			content: function (e) {
				var element = e.target[0];
				if (element.offsetWidth < element.scrollWidth) {
					return e.target.text();
				} else {
					return "";
				}
			}
		});
	</script>
	<script>
			$("#kt_datatable_mem_points_update_table").DataTable({
				 // "ordering": false,
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
			// $('#kt_datatable_loans_table').wrap('<div class="dataTables_scroll" />');
		</script>
		<script>
			$("#kt_datepicker_date_1").flatpickr({
				dateFormat: "d-m-Y",
			});
			$("#kt_datepicker_date_2").flatpickr({
				dateFormat: "d-m-Y",
			});
			$("#kt_datepicker_date_3").flatpickr({
				dateFormat: "d-m-Y",
			});
		</script>
	</body>
	<!--end::Body-->
	</html>