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
									<h1 class="d-flex align-items-center text-dark fw-bold my-1 fs-3">Lock In View
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
												<label class="col-lg-1 col-form-label fw-semibold fs-6">Date</label>
												<label class="col-lg-2 col-form-label fw-bold fs-5"><?php echo date('d-m-Y',strtotime($lock_in_lock_out->created_on)); ?></label>
												<label class="col-lg-1 col-form-label fw-semibold fs-6">Company</label>
												<label class="col-lg-4 col-form-label fw-bold fs-5"><?php
                                                            $company = $this->db->query("SELECT * FROM COMPANY WHERE ACTIVE='Y' AND COMPANYCODE='".$lock_in_lock_out->company."' ")->row();
                                                            echo $company->COMPANYNAME; ?></label>
												<label class="col-lg-1 col-form-label fw-semibold fs-6">User</label>
												<label class="col-lg-3 col-form-label fw-bold fs-5"><?php echo $lock_in_lock_out->created_by; ?></label>
												<label class="col-lg-1 col-form-label fw-semibold fs-6">Count</label>
												<label class="col-lg-2 col-form-label fw-bold fs-5"><?php echo $lock_in_lock_out->item_count; ?></label>
												<div class="col-lg-4">
													<label class="col-form-label fw-semibold fs-6">Nt.Wgt(gms) &emsp;</label>
													<label class="col-form-label fw-bold fs-5"><?php echo $lock_in_lock_out->net_weight; ?></label>
												</div>
											</div>
											<div class="row">
												<table id="kt_datatable_loan_audit_view" class="table align-middle table-row-dashed table-striped table-hover fs-7 gy-1 gs-2">
													<thead>
													  <tr class="text-start text-muted fw-bold fs-7 gs-0">
													  	<th class="min-w-25px">Sno</th>
													   	<th class="min-w-100px">Company</th>
													   	<th class="min-w-100px">Loan No</th>
													   	<!--<th class="min-w-200px">Item-SubItem</th>
													   	<th class="min-w-100px">No of Item</th>-->
													    <th class="min-w-80px">Weight(gms)</th>
															<th class="min-w-100px">Net Wgt(gms)</th>
															<th class="min-w-100px">Action</th>
													  </tr>
													</thead>
													<tbody class="text-gray-600 fw-semibold">
													<?php $i=0; foreach($lock_in_lock_out_detail as $hlist){ 
        $loan_details=$this->db->query("select * from LOANS where BILLNO='".$hlist['loan_no']."'")->row();
														
														?>
														<tr>
															<td><?php echo $i+1; ?></td>
									            <td class="ple1"><?php 
												 $company = $this->db->query("SELECT * FROM COMPANY WHERE ACTIVE='Y' AND COMPANYCODE='".$loan_details->COMPANYCODE."' ")->row();
												 echo $company->COMPANYNAME;
												?></td>
									            <td><?php echo $hlist['loan_no']; ?></td>
									            <!--<td class="ple1">Chain - Hand Chain,Baby Chain</td>
															<td>2</td>-->
									            <td><?php  echo $loan_details->WEIGHT; ?></td>
									            <td><?php  echo $loan_details->NETWEIGHT; ?></td>
									            <td>
																<a href="javascript:;" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm" data-bs-toggle="modal" data-bs-target="#kt_modal_view_individual_pledge_item" onclick="detail_view('<?php echo $loan_details->BILLNO; ?>')">
																	<i class="bi bi-eye-fill fs-2"></i>
																</a>
									            </td>
									       	  </tr>
											 <?php 
															$i++; }  ?>
													
													</tbody>
												</table>
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
		<!--begin::Modal - add loan view individual pledge item-->
		<div class="modal fade" id="kt_modal_view_individual_pledge_item" tabindex="-1" aria-hidden="true">
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
						<div class="mb-13 text-center">
							<h1 class="mb-3">Pledge Item</h1>
						</div>
						<div class="row">
							<label class="col-lg-1 col-form-label fw-semibold fs-6">Company</label>
							<label class="col-lg-4 col-form-label fw-bold fs-5" id="view_company"></label>
							<label class="col-lg-1 col-form-label fw-semibold fs-6">Loan No</label>
							<label class="col-lg-2 col-form-label fw-bold fs-5" id="view_loan_no"></label>
							<label class="col-lg-1 col-form-label fw-semibold fs-6">Type</label>
							<label class="col-lg-1 col-form-label fw-bold fs-5" id="view_jewel_type"></label>
							<!--<label class="col-lg-1 col-form-label fw-semibold fs-6">Count</label>
							<label class="col-lg-1 col-form-label fw-bold fs-5">2</label>-->
							<div class="col-lg-2">
								<label class="col-form-label fw-semibold fs-6">Nt.Wgt(gms) &emsp;</label>
								<label class="col-form-label fw-bold fs-5" id="view_net_weight">0.000</label>
							</div>
							
						</div>
						<div class="row mt-4">
							<table class="table align-middle table-row-dashed table-striped table-hover fs-7 gy-1 gs-2" id="view_loan_pledge_item_lockin">
								<thead>
									<tr class="text-start text-muted fw-bold fs-7 gs-0">
										<th class="min-w-50px">Sno</th>
				            <th class="min-w-150px">Item-Sub Item</th>
				            <th class="min-w-80px">Quality</th>
				            <!--<th class="min-w-80px">Purity(%)</th>-->
				            <th class="min-w-80px">Weight(gms)</th>
				            <th class="min-w-100px">Stone Wgt(gms)</th>
				            <th class="min-w-80px">Less(gms)</th>
				            <th class="min-w-80px">Nt Wgt(gms)</th>
				            <th class="min-w-50px">Img</th>
									</tr>
								</thead>
								<tbody class="text-gray-600 fw-semibold" id="view_tbody">
									<tr>
										<td>1</td>
				            <td class="ple1">Chain-Hand Chain</td>
				            <td>KDM</td>
				            <td>91</td>
				            <td>2.400</td>
				            <td>0.100</td>
				            <td>0.100</td>
				            <td>2.200</td>
				            <td>
				            	<div class="image-input mt-2 me-6" data-kt-image-input="true">
												<div class="image-input-wrapper w-40px h-40px"style="background-image: url(assets/images/sample_jewel.jpg)"></div>
												<!--end::Preview existing avatar-->
											</div>
				            </td>
				        	</tr>
						   		<tr>
						   			<td>2</td>
				            <td>Chain-Baby Chain</td>
				            <td>KDM</td>
				            <td>91</td>
				            <td>1.200</td>
				            <td>0.100</td>
				            <td>0.100</td>
				            <td>1.000</td>
				            <td>
				            	<div class="image-input mt-2 me-6" data-kt-image-input="true">
												<div class="image-input-wrapper w-40px h-40px"style="background-image: url(assets/images/sample_jewel.jpg)"></div>
												<!--end::Preview existing avatar-->
											</div>
				            </td>
						       </tr>
							   </tbody>
							</table>
						</div>
						<!--end::Modal body-->
					</div>

				</div>
				<!--end::Modal content-->
			</div>
		</div>
		<!--end::add loan view individual pledge item-->
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

			      $("#view_loan_pledge_item").kendoTooltip({
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
			    </script>
				<script>
			function detail_view(val){
				// alert(1);
				var baseurl= $("#baseurl").val();
				$.ajax({
				type: "POST",
				url: baseurl+'Lock_in_lock_out/pledge_item_view',
				async: false,
				type: "POST",
				data: "id="+val,
				dataType: "html",
				success: function(response)
				{
				res=response.split("||");
				$('#view_company').html(res[0]);
				$('#view_loan_no').html(res[1]);
				$('#view_net_weight').html(res[3]);
				$('#view_jewel_type').html(res[2]);
				$('#view_tbody').empty().append(res[4]);
				
				}});
			}
			</script>
		<script>

			      $("#kt_datatable_loan_audit_view").kendoTooltip({
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
			    </script>
			    <script>

			$("#view_loan_pledge_item").DataTable({
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
		 		$('#view_loan_pledge_item').wrap('<div class="dataTables_scroll" />');
	   		</script>
			    <script>

			$("#kt_datatable_loan_audit_view").DataTable({
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
		 		$('#kt_datatable_loan_audit_view').wrap('<div class="dataTables_scroll" />');
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