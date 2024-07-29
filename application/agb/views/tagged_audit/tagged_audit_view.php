<?php $this->load->view("common");?>
<style>
	.dataTables_scroll
    {
        position: relative;
        overflow: auto;
        min-height: 270px;
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
									<h1 class="d-flex align-items-center text-dark fw-bold my-1 fs-3">Audit - Tagged View
									<!--begin::Separator-->
									<span class="h-20px border-gray-400 border-start ms-3 mx-2"></span>
									<!-- <label class="d-flex align-items-center text-primary fw-bold my-1 fs-5">
										<span>Company &emsp;-</span>
										<span>&emsp;All</span>
									</label>
									<span class="h-20px border-gray-400 border-start ms-3 mx-2"></span>
									<label class="d-flex align-items-center text-primary fw-bold my-1 fs-5">
										<span>Type &emsp;-</span>
										<span>&emsp;All</span>
									</label>
									<span class="h-20px border-gray-400 border-start ms-3 mx-2"></span>
									<label class="d-flex align-items-center text-primary fw-bold my-1 fs-5">
										<span>Jewel Type &emsp;-</span>
										<span>&emsp;All</span>
									</label>
									<span class="h-20px border-gray-400 border-start ms-3 mx-2"></span>
									<label class="d-flex align-items-center text-primary fw-bold my-1 fs-5">
										<span>Date &emsp;-</span>
										<span>&emsp;Today</span>
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
										<div class="card-body py-4">
											<div class="row">
												<table id="kt_datatable_audit_tagged_entry_scanned_view" class="table align-middle table-row-dashed table-striped table-hover fs-7 gy-4 gs-2">
													<thead>
														<tr class="text-start text-muted fw-bold fs-7 gs-0">
														<th class="min-w-25px">Sno</th>
														<th class="min-w-100px">Tag ID</th>
														<th class="min-w-150px">Item-SubItem</th>
														<th class="min-w-50px">Wgt(gms)</th>
															<th class="min-w-80px">Net Wgt(gms)</th>
														</tr>
													</thead>
													<tbody class="text-gray-600 fw-semibold">
													<?php $i=1; foreach($tagged_audit_list as $tlist){ ?>
														<tr>
															<td><?php echo $i; ?></td>
															<td><?php echo $tlist['tag_id']; ?></td>
															<td class="ple1"><?php
															  $item_name  = $this->db->query("SELECT * FROM ITEMS WHERE  SNO='". $tlist['item']."' ")->row();
															echo $item_name->ITEMNAME.'-'.$tlist['subitem']; ?></td>
															<td><?php echo $tlist['weight']; ?></td>
															<td><?php echo $tlist['net_weight']; ?></td>
														</tr>
														<?php $i++; } ?>
													<!--	<tr>
															<td>2</td>
															<td>TG-0002/23</td>
															<td class="ple1">Ring - Baby Chain</td>
															<td>1.600</td>
															<td>1.900</td>
														</tr>-->
													</tbody>
												</table>
											</div>
											<form action="<?php echo base_url(); ?>Tagged_audit/tagged_audit_resolve" method="POST">
											<div class="row">
  												<div class="col-lg-2">
												  <label class="col-form-label fw-bold fs-4">Count &emsp;</label>
												  <label class="col-form-label fw-bold fs-4"><?php echo $tagged_audit->scanned_count; ?></label>
												</div>
												<div class="col-lg-3">
												  <label class="col-form-label fw-bold fs-4">Weight(gms) &emsp;</label>
												  <label class="col-form-label fw-bold fs-4"><?php echo $tagged_audit->scanned_weight; ?></label>
												</div>
												<?php if($tagged_audit->bal_count!=0){ ?>
												<label class="col-lg-1 col-form-label fw-semibold fs-6">Description</label>
												<label class="col-lg-6 col-form-label fw-bold fs-5"><?php if($tagged_audit->description==""){ echo "-"; }else{ echo $tagged_audit->description; } ?></label>
												<?php if($tagged_audit->status == 'R'){ ?>
												<label class="col-lg-1 col-form-label fw-semibold fs-6">Resolve</label>
												<label class="col-lg-6 col-form-label fw-bold fs-5"><?php if($tagged_audit->resolve==""){ echo "-"; }else{ echo $tagged_audit->resolve; } ?></label>
												<?php }  else {?>
												<label class="col-lg-1 col-form-label fw-semibold fs-6">Resolve</label>
												<div class="col-lg-5 fv-row fv-plugins-icon-container">
													<textarea class="form-control form-control-solid" rows="2" placeholder="" name="resolve" id="resolve"></textarea>
												</div>
												<?php } } ?>
											</div>
											
											<div class="d-flex justify-content-end mt-2">
											<input type="hidden" name="resolve_id" id="resolve_id" value="<?php echo $tagged_audit->id; ?>" >
												<!-- <button type="reset" class="btn btn-secondary me-3" data-bs-dismiss="modal">Cancel</button> -->
												<?php if($tagged_audit->status == 'Y'){ ?>
												<button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Resolve</button>
												<?php }  ?>
												</div>
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
		<!--begin::Modal - view old to pure gold entry-->
		<div class="modal fade" id="kt_modal_view_pure_gold_wallet" tabindex="-1" aria-hidden="true">
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
					<div class="modal-body pt-0 pb-5 px-5 px-xl-20">
						<!--begin::Heading-->
						<div class="mb-7 text-center">
							<h1>View Old Gold List</h1>
						</div>
						<div class="row">
							<label class="col-lg-1 col-form-label fw-semibold fs-6">Date</label>
							<label class="col-lg-2 col-form-label fw-bold fs-5"> <?php echo date("d-m-Y"); ?></label>
							<label class="col-lg-1 col-form-label fw-semibold fs-6">Company</label>
							<label class="col-lg-3 col-form-label fw-bold fs-5">AGB - Main Branch Sayalkudi</label>
							<label class="col-lg-1 col-form-label fw-semibold fs-6">Type</label>
							<label class="col-lg-1 col-form-label fw-bold fs-5">Loan</label>
							<div class="col-lg-3">
								<label class="col-form-label fw-semibold fs-6">By &emsp;</label>
								<label class="col-form-label fw-bold fs-5">Roshan</label>
							</div>
						</div>
						<div class="row">
							<label class="col-lg-2 col-form-label fw-semibold fs-6">Total No of Item</label>
							<label class="col-lg-1 col-form-label fw-bold fs-5">5</label>
							<label class="col-lg-2 col-form-label fw-semibold fs-6">Total Net Weight</label>
							<label class="col-lg-2 col-form-label fw-bold fs-5"> 200.00 (gms)</label>
							<label class="col-lg-1 col-form-label fw-semibold fs-6">JewelType</label>
							<label class="col-lg-2 col-form-label fw-bold fs-5"> Gold</label>
						</div>
						<table id="view_pure_gold_wallet_table" class="table align-middle table-row-dashed table-striped table-hover fs-7 gy-1 gs-2 dataTable">
							<thead>
							   <tr class="text-start text-muted fw-bold fs-7 gs-0">
							   		<th class="min-w-50px">SNo</th>
							   		<th class="min-w-80px">Date</th>
							    	<th class="min-w-100px">Generate No</th>
							    	<th class="min-w-50px">JwType</th>
									<th class="min-w-50px">Img</th>
									<th class="min-w-80px">Item Name</th>
									<th class="min-w-100px">Subitem Name</th>
									<th class="min-w-80px">Wgt(gms)</th>
									<th class="min-w-50px">Stone(gms)</th>
									<th class="min-w-50px">Less(gms)</th>
									<th class="min-w-80px">Net Wgt(gms)</th>
							   </tr>
							</thead>
							<tbody class="text-gray-600 fw-semibold">
								<tr>
						            <td>1</td>
						            <td>12-02-2022</td>
						            <td>MIP-123/22</td>
						            <td>Gold</td>
						            <td>
						            	<a href="javascript:;" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm">
							            	<div class="image-input" data-kt-image-input="true">
												<div class="image-input-wrapper w-40px h-40px" style="background-image: url(assets/images/sample_jewel.jpg)"></div>
											</div>
										</a>
						            </td>
						            <td>Chain</td>
						            <td>Hand Chain</td>
						            <td>3.200</td>
						            <td>0.200</td>
						            <td>0.200</td>
						            <td>3.600</td>
						        </tr>
								<tr>
						            <td>2</td>
						            <td>10-02-2022</td>
						            <td>MIP-553/22</td>
						            <td>Gold</td>
						            <td>
						            	<a href="javascript:;" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm">
							            	<div class="image-input" data-kt-image-input="true">
												<div class="image-input-wrapper w-40px h-40px" style="background-image: url(assets/images/sample_jewel.jpg)"></div>
											</div>
										</a>
									</td>
						            <td>Chain</td>
						            <td>Hand Chain</td>
						            <td>4.200</td>
						            <td>0.200</td>
						            <td>0.200</td>
						            <td>4.600</td>
						        </tr>
						        <tr>
						            <td>3</td>
						            <td>12-01-2023</td>
						            <td>TIP-563/22</td>
						            <td>Gold</td>
						            <td>
						            	<a href="javascript:;" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm">
							            	<div class="image-input" data-kt-image-input="true">
												<div class="image-input-wrapper w-40px h-40px" style="background-image: url(assets/images/sample_jewel.jpg)"></div>
											</div>
										</a>
						            </td>
						            <td>Valayal</td>
						            <td>Stone Valayal</td>
						            <td>4.300</td>
						            <td>0.200</td>
						            <td>0.200</td>
						            <td>4.700</td>
						        </tr>
						        <tr>
						            <td>4</td>
						            <td>25-06-2022</td>
						            <td>SIP-576/22</td>
						            <td>Gold</td>
						            <td>
						            	<a href="javascript:;" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm">
							            	<div class="image-input" data-kt-image-input="true">
												<div class="image-input-wrapper w-40px h-40px" style="background-image: url(assets/images/sample_jewel.jpg)"></div>
											</div>
										</a>
						            </td>
						            <td>Chain</td>
						            <td>Hand Chain</td>
						            <td>3.500</td>
						            <td>0.300</td>
						            <td>0.100</td>
						            <td>3.900</td>
						        </tr>
						        <tr>
						            <td>5</td>
						            <td>06-06-2022</td>
						            <td>TIP-586/22</td>
						            <td>Gold</td>
						            <td>
						            	<a href="javascript:;" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm">
							            	<div class="image-input" data-kt-image-input="true">
												<div class="image-input-wrapper w-40px h-40px" style="background-image: url(assets/images/sample_jewel.jpg)"></div>
											</div>
										</a>
						            </td>
						            <td>Chain</td>
						            <td>Hand Chain</td>
						            <td>4.400</td>
						            <td>0.200</td>
						            <td>0.200</td>
						            <td>4.800</td>
						        </tr>
							</tbody>
					</table>
					</div>
					<!--end::Modal body-->
				</div>
				<!--end::Modal content-->
			</div>
			<!--end::Modal dialog-->
		</div>
		<!--end::Modal - view old to pure gold entry-->
		<!--begin::Modal - delete old to pure gold entry-->
		<div class="modal fade" id="kt_modal_delete_pure_gold_entry" tabindex="-1" aria-hidden="true">
			<!--begin::Modal dialog-->
			<div class="modal-dialog modal-m">
				<!--begin::Modal content-->
				<div class="modal-content rounded">
					<div class="swal2-icon swal2-warning swal2-icon-show" style="display: flex;">
						<div class="swal2-icon-content">!</div></div>
						<div class="swal2-html-container" id="swal2-html-container" style="display: block;">Are you sure you want to delete?</div>
						<div class="d-flex flex-center flex-row-fluid pt-12">
							<button type="submit" class="btn btn-danger me-3" data-bs-dismiss="modal">Yes</button>
							<button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
						</div><br><br>
				</div>
				<!--end::Modal content-->
			</div>
			<!--end::Modal dialog-->
		</div>
		<!--end::Modal - delete old to pure gold entry-->
		<?php $this->load->view("script");?>
		<!-- <script src="js/purchaseregister-list.js"></script> -->
		<script>

			      $("#kt_datatable_audit_tagged_entry_scanned_view").kendoTooltip({
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

			      $("#kt_datatable_audit_tagged_entry_view").kendoTooltip({
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

			      $("#kt_datatable_audit_tagged_entry_view").DataTable({
				"aaSorting":[],
				"iDisplayLength": "25",
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
		 		$('#kt_datatable_audit_tagged_entry_view').wrap('<div class="dataTables_scroll" />');

		 		$("#kt_datatable_audit_tagged_entry_scanned_view").DataTable({
				"aaSorting":[],
				// "sorting":false,
				// "paging": false,
				// "responsive": true,
				"iDisplayLength": "25",
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
		 		$('#kt_datatable_audit_tagged_entry_scanned_view').wrap('<div class="dataTables_scroll" />');
	   		</script>
		<!-- <script>
			$(document).ready(function()
			{ 
				$('form').find("input[type=textarea], input[type=password], textarea").each(function(ev)
				{
				    if(!$(this).val()) { 
				    $(this).attr("placeholder", "Type your answer here");
					}
				});
			});
		</script> -->
		<!-- old_gold list day fillter start -->
		<script>
			function date_fill_old_gold_list()
			{
				var dt_fill_old_gold_list = document.getElementById('dt_fill_old_gold_list').value;
				var today_dt_old_gold_list = document.getElementById('today_dt_old_gold_list');
				var week_from_dt_old_gold_list = document.getElementById('week_from_dt_old_gold_list');
				var week_to_dt_old_gold_list = document.getElementById('week_to_dt_old_gold_list');
				var monthly_dt_old_gold_list = document.getElementById('monthly_dt_old_gold_list');
				var from_dt_old_gold_list = document.getElementById('from_dt_old_gold_list');
				var to_dt_old_gold_list = document.getElementById('to_dt_old_gold_list');
				var from_date_fillter_old_gold_list = document.getElementById('from_date_fillter_old_gold_list');
				var to_date_fillter_old_gold_list = document.getElementById('to_date_fillter_old_gold_list');

				if (dt_fill_old_gold_list == "today") 
				{
					today_dt_old_gold_list.style.display = "block";
					monthly_dt_old_gold_list.style.display = "none";
					from_dt_old_gold_list.style.display = "none";
					to_dt_old_gold_list.style.display = "none";
					week_from_dt_old_gold_list.style.display = "none";
					week_to_dt_old_gold_list.style.display = "none";
					$("#today_date_fillter_old_gold_list").flatpickr({
								dateFormat: "d-m-Y",
							});
				}
				else if (dt_fill_old_gold_list == "week")
				{
					today_dt_old_gold_list.style.display = "none";
					week_from_dt_old_gold_list.style.display = "block";
					week_to_dt_old_gold_list.style.display = "block";
					monthly_dt_old_gold_list.style.display = "none";
					from_dt_old_gold_list.style.display = "none";
					to_dt_old_gold_list.style.display = "none";

					var curr = new Date; // get current date
					var first = curr.getDate() - curr.getDay(); // First day is the day of the month - the day of the week
					var last = first + 6; // last day is the first day + 6

					var firstday = new Date(curr.setDate(first)).toISOString().slice(0,10);
					firstday = firstday.split("-").reverse().join("-");
					var lastday = new Date(curr.setDate(last)).toISOString().slice(0,10);
					lastday = lastday.split("-").reverse().join("-");
					$('#week_from_date_fillter_old_gold_list').val(firstday);
					$('#week_to_date_fillter_old_gold_list').val(lastday);
					
				}
				else if (dt_fill_old_gold_list == "monthly")
				{
					today_dt_old_gold_list.style.display = "none";
					monthly_dt_old_gold_list.style.display = "block";
					from_dt_old_gold_list.style.display = "none";
					to_dt_old_gold_list.style.display = "none";
					week_from_dt_old_gold_list.style.display = "none";
					week_to_dt_old_gold_list.style.display = "none";
					$("#monthly_date_fillter_old_gold_list").flatpickr({
								dateFormat: "m-Y",
							});
				}
				else if (dt_fill_old_gold_list == "custom Date")
				{
					today_dt_old_gold_list.style.display = "none";
					monthly_dt_old_gold_list.style.display = "none";
					from_dt_old_gold_list.style.display = "block";
					to_dt_old_gold_list.style.display = "block";
					week_from_dt_old_gold_list.style.display = "none";
					week_to_dt_old_gold_list.style.display = "none";

					$("#from_date_fillter_old_gold_list").flatpickr({
								dateFormat: "d-m-Y",
							});
					$("#to_date_fillter_old_gold_list").flatpickr({
								dateFormat: "d-m-Y",
							});
				}
				else
				{
					today_dt_old_gold_list.style.display = "none";
					monthly_dt_old_gold_list.style.display = "none";
					from_dt_old_gold_list.style.display = "none";
					to_dt_old_gold_list.style.display = "none";
					week_from_dt_old_gold_list.style.display = "none";
					week_to_dt_old_gold_list.style.display = "none";
				}
			}
		</script>
		<!-- loan list day fillter end -->
		<script>
			$('#kt_docs_repeater_basic_add').repeater({
			    initEmpty: false,

			    defaultValues: {
			        'text-input': 'foo'
			    },

			    show: function () {
			        $(this).slideDown();
			    },

			    hide: function (deleteElement) {
			        $(this).slideUp(deleteElement);
			    }
			});

			$('#kt_docs_repeater_basic_edit').repeater({
			    initEmpty: false,

			    defaultValues: {
			        'text-input': 'foo'
			    },

			    show: function () {
			        $(this).slideDown();
			    },

			    hide: function (deleteElement) {
			        $(this).slideUp(deleteElement);
			    }
			});
			$('#kt_docs_repeater_basic_view').repeater({
			    initEmpty: false,

			    defaultValues: {
			        'text-input': 'foo'
			    },

			    show: function () {
			        $(this).slideDown();
			    },

			    hide: function (deleteElement) {
			        $(this).slideUp(deleteElement);
			    }
			});
		</script>
		<script>
	      $("#kt_datatable_responsive").kendoTooltip({
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
	      $("#kt_modal_add_old_pure_gold_entry_table").kendoTooltip({
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
	      $("#kt_modal_edit_old_pure_gold_entry_table").kendoTooltip({
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
	      $("#kt_modal_view_old_pure_gold_entry_table").kendoTooltip({
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
			$("#kt_datatable_responsive").DataTable({
				// "ordering": false,
				"aaSorting":[],
				// "responsive": true,
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
			$("#kt_modal_add_old_pure_gold_entry_table").DataTable({
				// "ordering": false,
				"aaSorting":[],
				"responsive": true,
				 "language": {
				  "lengthMenu": "Show _MENU_",
				 },
				 "dom":
				  "<'row'" +
				  ">" +

				  "<'table-responsive'tr>" +

				  "<'row'" +
				  "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
				  "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
				  ">"
				});
			$("#kt_modal_add_pure_gold_entry_table").DataTable({
				// "ordering": false,
				"aaSorting":[],
				"responsive": true,
				 "language": {
				  "lengthMenu": "Show _MENU_",
				 },
				 "dom":
				  "<'row'" +
				  ">" +

				  "<'table-responsive'tr>" +

				  "<'row'" +
				  "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
				  "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
				  ">"
				});
		</script>
		<script>
			$("#kt_modal_edit_pure_gold_entry_table").DataTable({
				// "ordering": false,
				"aaSorting":[],
				"responsive": true,
				 "language": {
				  "lengthMenu": "Show _MENU_",
				 },
				 "dom":
				  "<'row'" +
				  ">" +

				  "<'table-responsive'tr>" +

				  "<'row'" +
				  "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
				  "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
				  ">"
				});
			$("#kt_modal_edit_old_pure_gold_entry_table").DataTable({
				// "ordering": false,
				"aaSorting":[],
				"responsive": true,
				 "language": {
				  "lengthMenu": "Show _MENU_",
				 },
				 "dom":
				  "<'row'" +
				  ">" +

				  "<'table-responsive'tr>" +

				  "<'row'" +
				  "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
				  "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
				  ">"
				});
		</script>
		<script>
			$("#kt_modal_view_pure_gold_entry_table").DataTable({
				// "ordering": false,
				"aaSorting":[],
				"responsive": true,
				 "language": {
				  "lengthMenu": "Show _MENU_",
				 },
				 "dom":
				  "<'row'" +
				  ">" +

				  "<'table-responsive'tr>" +

				  "<'row'" +
				  "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
				  "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
				  ">"
				});
			$("#kt_modal_view_old_pure_gold_entry_table").DataTable({
				// "ordering": false,
				"aaSorting":[],
				"responsive": true,
				 "language": {
				  "lengthMenu": "Show _MENU_",
				 },
				 "dom":
				  "<'row'" +
				  ">" +

				  "<'table-responsive'tr>" +

				  "<'row'" +
				  "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
				  "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
				  ">"
				});
		</script>
		<script>
			$("#kt_datepicker_from").flatpickr({
				dateFormat: "d-m-Y",
			});
			$("#kt_datepicker_to").flatpickr({
				dateFormat: "d-m-Y",
			});
			$("#kt_datepicker_add_pure_gold_inv_date").flatpickr({
				dateFormat: "d-m-Y",
			});
			$("#kt_datepicker_add_pure_gold_date").flatpickr({
				dateFormat: "d-m-Y",
			});
			$("#kt_datepicker_add_pure_gold_pay_date").flatpickr({
				dateFormat: "d-m-Y",
			});
			$("#kt_datepicker_edit_pure_gold_inv_date").flatpickr({
				dateFormat: "d-m-Y",
			});
			$("#kt_datepicker_edit_pure_gold_date").flatpickr({
				dateFormat: "d-m-Y",
			});
			$("#kt_datepicker_edit_pure_gold_pay_date").flatpickr({
				dateFormat: "d-m-Y",
			});
			$("#kt_datepicker_view_pure_gold_inv_date").flatpickr({
				dateFormat: "d-m-Y",
			});
			$("#kt_datepicker_view_pure_gold_date").flatpickr({
				dateFormat: "d-m-Y",
			});
			$("#kt_datepicker_view_pure_gold_pay_date").flatpickr({
				dateFormat: "d-m-Y",
			});
		</script>
	</body>
	<!--end::Body-->
</html>