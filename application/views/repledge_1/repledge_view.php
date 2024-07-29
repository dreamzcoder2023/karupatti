<?php $this->load->view("common");?>
<style>
	.dataTables_scroll
    {
        position: relative;
        overflow: auto;
        min-height: 100px;
        max-height: 200px;/*the maximum height you want to achieve*/
        width: 100%;
    }
  .dataTables_scroll thead{
    position: -webkit-sticky;
    position: sticky;
    top: 0;
   background-color: #ec9629;
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
									<h1 class="d-flex align-items-center text-dark fw-bold my-1 fs-3">Repledge View
									<!--begin::Separator-->
									<span class="h-20px border-gray-400 border-start ms-3 mx-2"></span>
									<label class="d-flex align-items-center text-primary fw-bold my-1 fs-5">
										<span>RP Bill No &emsp;-&emsp;</span>
										<span><?php echo $repledge_master->RP_BILLNO; ?></span>
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
											<div class="row">
												<label class="col-lg-1 col-form-label fw-semibold fs-6">Date</label>
												<label class="col-lg-2 col-form-label fw-bold fs-5"><?php echo date_format(date_create($repledge_master->ENDATE),'d-m-Y'); ?></label>
												<label class="col-lg-1 col-form-label fw-semibold fs-6">Company</label>
												<label class="col-lg-5 col-form-label fw-bold fs-5"><?php 
												$cmp=$this->db->query("select * from COMPANY where COMPANYCODE='".$repledge_master->COMPANYCODE."'")->row(); echo $cmp->COMPANYNAME; ?></label>
												<label class="col-lg-1 col-form-label fw-semibold fs-6">Type</label>
												<label class="col-lg-2 col-form-label fw-bold fs-5"><?php echo ($repledge_master->MIXED=='Y')?'MIXED':'INDIVIDUAL'; ?></label>
												<label class="col-lg-1 col-form-label fw-semibold fs-6">Bank</label>
												<label class="col-lg-2 col-form-label fw-bold fs-5"><?php echo $repledge_master->BANK; ?></label>
												<label class="col-lg-1 col-form-label fw-semibold fs-6">Bank No</label>
												<label class="col-lg-2 col-form-label fw-bold fs-5"><?php echo $repledge_master->BANKNO; ?></label>
												<div class="col-lg-6 d-flex justify-content-end align-items-center">
													<label class="col-form-label text-center fw-semibold fs-3 me-3">
														<?php  if($repledge_master->ACTIVE=='Y'){ ?>
														<span style="background-color:#5aad52;border-radius: 8px;padding: 5px 15px 5px 15px;">Active</span>
													<?php }else{ ?>
													
														<span style="background-color:#ff5b5b;border-radius: 8px;padding: 5px 15px 5px 15px;">InActive</span>
													<?php } ?>
													</label>
												</div>
											</div>
											<div class="row mt-2">
												<label class="col-form-label fw-bold fs-4">Repledge Item Details</label>
												<table id="rp_view_table" class="table align-middle table-row-dashed table-striped table-hover fs-7 gy-1 gs-2">
													<thead>
													  <tr class="text-start text-muted fw-bold fs-7 gs-0">
													  	<th class="min-w-25px">Sno</th>
													   	<th class="min-w-80px">Loan No</th>
													   	<th class="min-w-100px">Company</th>
													   	<th class="min-w-80px">Item Type</th>
													   	<th class="min-w-80px">Item</th>
													   	<!-- <th class="min-w-100px">Description</th> -->
													   	<th class="min-w-50px">Qty</th>
													    <th class="min-w-80px">Weight(gms)</th>
															<th class="min-w-80px">Loan Amount</th>
															<th class="min-w-50px">Action</th>
													  </tr>
													</thead>
													<tbody class="text-gray-600 fw-semibold">
														<?php 
																$i=0;
																foreach($repledge_details as $r_det){
														?>
														<tr>
															<td><?php echo $i+1;?></td>
									            <td><?php echo $r_det['BILLNO'];?></td>
									            <td class="ple1"><?php echo $cmp->COMPANYNAME;?></td>
									            <td class="ple1">Gold</td>
									            <td class="ple1"><?php echo $r_det['PLEDGES']; ?></td>
									            <!-- <td class="ple1">Ladies Ring</td> -->
															<td><?php echo $r_det['QTY']; ?></td>
									            <td><?php echo $r_det['WEIGHT']; ?></td>
									            <td><?php echo $r_det['LOANAMOUNT']; ?></td>
									            <td>
									            	<?php $bno=str_replace('/', '_',  $r_det['BILLNO']); ?>
									            	<span class="text-end" onclick="load_pledge_info('<?php echo $bno;?>');">
									            		
																	<!-- <a href="<?php echo base_url();?>repledge/load_pledge_info/<?php echo $bno; ?>" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm"> -->
																		<!--  data-bs-toggle="modal" data-bs-target="#viewrepledge_pledge_info" -->
																	<i class="bi bi-eye-fill eyc" ></i>
																	<!-- </a> -->
																</span>
									            </td>
									       	  </tr>
									       	<?php 
									       				$i++;
									       			} 
									       		?>
													</tbody>
												</table>
											</div>
											<div class="d-flex justify-content-end">
												<label class="col-lg-1 col-form-label fw-bold fs-4">Total</label>
												<label class="col-lg-1 col-form-label fw-bold fs-4 text-center"><?php echo $repledge_master->NETQTY; ?></label>
												<label class="col-lg-1 col-form-label fw-bold fs-4 text-end"><?php echo $repledge_master->NETWEIGHT; ?></label>
												<label class="col-lg-2 col-form-label fw-bold fs-4 text-center"><?php echo $repledge_master->NETLOANAMOUNT; ?></label>
												<label class="col-lg-1"></label>
											</div>
											<div class="row">
												<label class="col-form-label fw-bold fs-4">Bank Interest Details</label>
												<label class="col-lg-1 col-form-label fw-semibold fs-6">Amount</label>
												<label class="col-lg-2 col-form-label fw-bold fs-5"><?php echo $repledge_master->AMOUNT; ?></label>
												<label class="col-lg-1 col-form-label fw-semibold fs-6">Others</label>
												<label class="col-lg-2 col-form-label fw-bold fs-5"><?php echo $repledge_master->OTHERS; ?></label>
												<div class="col-lg-1">
													<label class="col-form-label fw-semibold fs-6">Appr.Charge</label>
												</div>
												<div class="col-lg-2">
													<label class="col-form-label fw-bold fs-5 ms-2"><?php echo $repledge_master->APP_CHARGE; ?></label>
												</div>
												<div class="col-lg-3">
													<label class="col-form-label fw-bold fs-3">NetAmount</label>&emsp;
													<label class="col-form-label fw-bold fs-3"><?php echo $repledge_master->NETAMOUNT; ?></label>
												</div>
											</div>
											<div class="row">
												<div class="col-lg-6">
													<div class="row">
														<label class="col-lg-2 col-form-label fw-semibold fs-6">Int (%)</label>
														<label class="col-lg-4 col-form-label fw-bold fs-5"><?php echo $repledge_master->INTEREST; ?></label>
														<label class="col-lg-2 col-form-label fw-semibold fs-6">Months</label>
														<label class="col-lg-4 col-form-label fw-bold fs-5"><?php echo $repledge_master->MONTHS; ?></label>
													</div>
													<div class="row">
														<div class="col-lg-2">
															<label class="col-form-label fw-semibold fs-6">Iter.Month</label>
														</div>
														<label class="col-lg-4 col-form-label fw-bold fs-5"><?php echo $repledge_master->ITERATION; ?></label>
														<label class="col-lg-2 col-form-label fw-semibold fs-6">(+)Int</label>
														<label class="col-lg-4 col-form-label fw-bold fs-5"><?php echo $repledge_master->PLUSINT; ?></label>
													</div>
												</div>
												<div class="col-lg-6">
													<div class="row">
														<div class="col-lg-2">
															<label class="col-form-label fw-semibold fs-6">Description</label>
														</div>
														<label class="col-lg-9 col-form-label fw-bold fs-5">-</label>
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
				<?php $this->load->view("footer");?>
				</div>
				<!--end::Wrapper-->
			</div>
			<!--end::Page-->
		</div>
		<!--end::Root-->
		<!--begin::Modal - View Pledge Info-->
		<div class="modal fade" id="viewrepledge_pledge_info" tabindex="-1" aria-hidden="true">
			
		</div>
		<!--end::Modal - View Pledge Info-->
		<?php $this->load->view("script"); ?>
		<!-- <script src="js/repledge-list.js"></script> -->
		<script>
		function gen_svg()
		{
			var svg_gen = document.getElementById("svg_gen");
			svg_gen.style.visibility = "visible";
			setTimeout(function() {
				         svg_gen.style.visibility = "hidden";
				        }, 2000);
		}
	</script>
	<script>
		      $("#rp_view_table").kendoTooltip({
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
			$("#rp_view_table").DataTable({
				// "ordering": false,
				// "aaSorting":[],
				"sorting":false,
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
				$('#rp_view_table').wrap('<div class="dataTables_scroll" />');
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
		      $("#rp_entry_table").kendoTooltip({
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
			$("#rp_entry_table").DataTable({
				// "ordering": false,
				// "aaSorting":[],
				"sorting": false,
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
			$('#rp_entry_table').wrap('<div class="dataTables_scroll_rp_entry" />');
			</script>
   		<script>
		      $("#rp_add_view_pledge_info_table").kendoTooltip({
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
			$("#rp_add_view_pledge_info_table").DataTable({
				// "ordering": false,
				// "aaSorting":[],
				"sorting": false,
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
			$('#rp_add_view_pledge_info_table').wrap('<div class="dataTables_scroll" />');
			</script>
   		
		<script>
			function all_pd() 
			{
				var all_period = document.getElementById("all_period").value;
				 if(all_period == 'period')
				  {
				  	$("#period_date1").show();
				  	$("#period_date2").show();
				  }
				  else
				  {
				  	$("#period_date1").hide();
				  	$("#period_date2").hide();
				  }
			}

			function fil_bank()
			{
				var check_bank = document.getElementById("check_bank");

				if (check_bank.checked)
				{
					$('#bank_filter').removeAttr('disabled');
			  	} else 
			  	{
			  		$('#bank_filter').attr('disabled', 'disabled');
			  	}
			}

			function fil_staff()
			{
				var check_staff = document.getElementById("check_staff");

				if (check_staff.checked)
				{
					$('#staff_filter').removeAttr('disabled');
			  	} else 
			  	{
			  		$('#staff_filter').attr('disabled', 'disabled');
			  	}
			}
			function bill_type_dp_down()
			{
				var bill_type_d_box = document.getElementById("bill_type_d_box").value;
				var bill_type_t_field = document.getElementById("bill_type_t_field");
				if (bill_type_d_box == "") 
				{
					bill_type_t_field.style.display = "none";
				}
				else if (bill_type_d_box == "bill_no")
				{
					bill_type_t_field.style.display = "block";
					document.getElementById("bill_type_fil").innerHTML="Bill No";
				}
				else if (bill_type_d_box == "bank_no")
				{
					bill_type_t_field.style.display = "block";
					document.getElementById("bill_type_fil").innerHTML="Bank No";
				}
				else
				{
					bill_type_t_field.style.display = "block";
					document.getElementById("bill_type_fil").innerHTML="RP Bill No";
				}
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

				$("#kt_daterangepicker_48").flatpickr({
								dateFormat: "d-m-Y",
							});
				$("#kt_daterangepicker_49").flatpickr({
								dateFormat: "d-m-Y",
							});
				$("#kt_daterangepicker_repledge_from").flatpickr({
								dateFormat: "d-m-Y",
							});
				$("#kt_daterangepicker_repledge_to").flatpickr({
								dateFormat: "d-m-Y",
							});

				$("#kt_daterangepicker_repledge_add_date").flatpickr({
								dateFormat: "d-m-Y",
							});
				$("#kt_daterangepicker_repledge_edit_date").flatpickr({
								dateFormat: "d-m-Y",
							});

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
		  $("#kt_datatable_responsive_newrepledge").kendoTooltip({
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
			$("#kt_datatable_responsive_newrepledge").DataTable({
				// "ordering": false,
					// "aaSorting":[],
					"sorting":false,
					"paging": false,
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
				$('#kt_datatable_responsive_newrepledge').wrap('<div class="dataTables_scroll" />');
		</script>
		<script>
		  $("#kt_datatable_responsive_viewrepledge").kendoTooltip({
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
			$("#kt_datatable_responsive_viewrepledge").DataTable({
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
				  ">"
				});
		</script>
		<script>
		  $("#kt_datatable_responsive_editrepledge").kendoTooltip({
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
			$("#kt_datatable_responsive_editrepledge").DataTable({
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
				  ">"
				});
		</script>
		<script >
			function load_pledge_info(bno)
			{
					var baseurl=$('#baseurl').val();
					// var bno="<?php echo $bno;?>";
					var rp_bill_no="<?php echo $repledge_master->RP_BILLNO; ?>";
					// alert(bno);
					$.ajax({
									type: "POST",
									url: baseurl+'repledge/load_pledge_list?',
									async: false,
									type: "POST",
									data: "bno="+bno+'&rp_no='+rp_bill_no,
									dataType: "html",
									success: function(response)
									{
											$('#viewrepledge_pledge_info').empty().append(response);
											$('#viewrepledge_pledge_info').addClass('show');
											$('.modal-backdrop').addClass('show');
											$('#viewrepledge_pledge_info').show();
								   		$('.modal-backdrop').show();
									}
								});
			}

			function close_pledge_list_modal()
			{
						// $('#viewrepledge_pledge_info').empty().append(response);
						$('#viewrepledge_pledge_info').removeClass('show');
						$('.modal-backdrop').removeClass('show');
						$('#viewrepledge_pledge_info').hide();
			   		$('.modal-backdrop').hide();
			}
		</script>
	</body>
	<!--end::Body-->
</html>