<?php $this->load->view("common.php") ?>
<link href="<?php echo base_url();?>assets/jquery.autocomplete.css" rel="stylesheet" type="text/css" />

<style>
	.dataTables_scroll
    {
        position: relative;
        overflow: auto;
        max-height: 450px;/*the maximum height you want to achieve*/
        width: 100%;
    }
  .dataTables_scroll thead{
    position: -webkit-sticky;
    position: sticky;
    top: 0;
    /*background-color: #fff;*/
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
				<?php $this->load->view("sidebar.php")?>
				<!--begin::Wrapper-->
				<div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
				<?php $this->load->view("header.php")?>
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
											<?php if (isset($party_detail->RATING)) {?>
											<span>
												<i class="fa-solid fa-star fs-3" style="
										          <?php
										          		
									          			if($party_detail->RATING ==3) echo 'color:#50cd89;';
														if($party_detail->RATING ==2) echo 'color:#ffc700;';
														if($party_detail->RATING ==1) echo 'color:red;';
														if($party_detail->RATING =='') echo 'color:#d2d4dc;';
													?>">
												</i>
											</span>&nbsp;
											<span>&nbsp;<?php echo $party_detail->NAME;?>&nbsp;<?php echo $party_detail->FATHERSNAME;?></span>
											<?php } ?>
										</label>
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
			            <!-- </div> -->
											<!--begin::Card body-->
											<div class="card-body py-4">
											<form id="party_search_form" method="post" action="" enctype="multipart/form-data" >	
											<div class="row">
												<label class="col-lg-1 col-form-label required fw-semibold fs-6">Type</label>
													<div class="col-lg-3">
														<select class="form-select form-select-solid" data-control="select2" data-hide-search="true" id="party_search_type" name="party_search_type">	
															<!--<option value="">Select</option>-->
															<option value="1" <?php if($party_search_type=='1'){ echo 'selected'; } ?>>Party Name</option>
															<option value="2" <?php if($party_search_type=='2'){ echo 'selected'; } ?>>Phone No</option>
															<option value="3" <?php if($party_search_type=='3'){ echo 'selected'; } ?>>Membership ID</option>
															<option value="4" <?php if($party_search_type=='4'){ echo 'selected'; } ?>>Loan No</option>
														</select>
													</div>
													<!-- <label class="col-lg-1 col-form-label fw-semibold fs-6">Enter</label> onkeyup="test()"-->
													<div class="col-lg-3">
														<input type="text" name="party_search" id="party_search" class="form-control form-control-lg form-control-solid" placeholder="" value="<?php echo $party_search; ?>" >
													<input type="hidden" name="party_search_id" id="party_search_id" value="<?php if(isset($party_detail->PID)){echo $party_detail->PID; } ?>"> 
														</div>
														<div class="col-lg-1">
														<input type="button" name="party_submit" id="party_submit" class="btn btn-sm btn-outline btn-outline-solid btn-outline-warning btn-active-light-primary  " placeholder="" value="Go" onclick="submit_form()">
														</div>
														
												</div> 
												</form>
												<div class="mb-5 hover-scroll-x mt-4">
													<div class="d-grid">
														<ul class="nav nav-tabs flex-nowrap text-nowrap" role="tablist">
															<li class="nav-item" role="presentation">
																<a class="nav-link btn btn-active-light btn-color-black-800 btn-active-color-primary rounded-bottom-0 fw-bold fs-6 "   onclick="submit_form()" aria-selected="true" >Party Info</a>
															</li>
															<li class="nav-item" role="presentation">
																<a class="nav-link btn btn-active-light btn-color-black-800 btn-active-color-primary rounded-bottom-0 fw-bold fs-6 "   aria-selected="false" onclick="submit_form_loan()" >Loans</a>
															</li>
															<li class="nav-item" role="presentation">
																<a class="nav-link btn btn-active-light btn-color-black-800 btn-active-color-primary rounded-bottom-0 fw-bold fs-6"   aria-selected="false" onclick="submit_form_jewel()">Jewel</a>
															</li>
															<li class="nav-item" role="presentation">
																<a class="nav-link btn btn-active-light btn-color-black-800 btn-active-color-primary rounded-bottom-0 fw-bold fs-6"   aria-selected="false" onclick="submit_form_chit()">Chit</a>
															</li>
															<li class="nav-item" role="presentation">
																<a class="nav-link btn btn-active-light btn-color-black-800 btn-active-color-primary rounded-bottom-0 fw-bold fs-6"   aria-selected="false" onclick="submit_form_karupatti()">Karuppati</a>
															</li>
															<li class="nav-item" role="presentation">
																<a class="nav-link btn btn-active-light btn-color-black-800 btn-active-color-primary rounded-bottom-0 fw-bold fs-6"   aria-selected="false" onclick="submit_form_realestate()">Real Estate</a>
															</li>
															<li class="nav-item">
																<a class="nav-link btn btn-active-light btn-color-black-800 btn-active-color-primary rounded-bottom-0 fw-bold fs-6 active"   aria-selected="false" >Membership</a>
															</li>
															<li class="nav-item">
																<a class="nav-link btn btn-active-light btn-color-black-800 btn-active-color-primary rounded-bottom-0 fw-bold fs-6"   aria-selected="false" onclick="submit_form_rating_history()">Rating History</a>
															</li>
														</ul>
													</div>
												</div>
												<div class="tab-content" id="myTabContent">
													<div class="tab-pane fade active show" id="kt_datatable_tab" role="tabpanel">
														<div class="row">
															<table id="kt_datatable_membership_history"
																class="table align-middle table-row-dashed table-striped table-hover fs-7 gy-1 gs-2">
																<thead>
																	<tr class="text-start text-muted fw-bold fs-7 gs-0">
																		<th class="min-w-25px">Sno</th>
																		<th class="min-w-80px">Date</th>
																		<th class="min-w-80px">Time</th>
																		<th class="min-w-80px">User</th>
																		<th class="min-w-80px">Type</th>
																		<th class="min-w-100px">Status</th>
																		<th class="min-w-50px">Point</th>
																	</tr>
																</thead>
																<tbody class="text-gray-600 fw-semibold">
																	<?php $i=1; foreach ($membership as $mlist){ ?>			
																	<tr>
																		<td><?php echo $i;?></td>
																		<td><?php echo date_format(date_create($mlist['LOG_DATE']),'d-M-Y'); ?></td>
																		<td><?php echo date_format(date_create($mlist['CREATED_ON']),'H:i A'); ?></td>
																		<td><?php echo $mlist['CREATED_BY']; ?></td>
																		<td><?php echo $mlist['PROCESS']; ?></td>
																		<td>
																			<?php $s=strpos($mlist['STATUS_TYPE'],'In');
																			// echo $s;
																				if($s=='In'){ ?>
																				<label class="col-form-label fw-semibold fs-7">
																					<span style="background-color:#B6BD4F;border-radius: 8px;padding: 5px 15px 5px 15px;">IN
																					</span>
																				</label>
																				<?php } else { ?>
																				<label class="col-form-label fw-semibold fs-7">
																					<span style="background-color:#46dcf9;border-radius: 8px;padding: 5px 15px 5px 15px;">OUT
																					</span>
																				</label>
																			<?php } ?>
																		</td>
																		<td><?php echo $mlist['POINTS_EARNED']; ?></td>
																	</tr>
																	<?php $i++; } ?>
																</tbody>
															</table>
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
						<?php $this->load->view("footer.php")?>
					</div>
					<!--end::Content-->
				</div>
				<!--end::Wrapper-->
			</div>
			<!--end::Page-->
		</div>
		<!--end::Root-->
		<?php $this->load->view("script");?>
		<input type="hidden" id="baseurl" value="<?php echo base_url();?>">
		<script src="<?php echo base_url();?>assets/jquery.autocomplete.js"></script>
		<script>
			$("#kt_datatable_membership_history").DataTable({
				//"aaSorting":[],
				"sorting": false,
				"paging" : true,
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
			$('#kt_datatable_membership_history').wrap('<div class="dataTables_scroll" />');
		</script>
		<script>
		function submit_form(){
		    $('#party_search_form').attr('action', "<?php echo base_url(); ?>Partysearch");
		            $("#party_search_form").submit();
		            e.preventDefault();

		}
		</script>
		<script>
		function submit_form_loan(){
			
		    $('#party_search_form').attr('action', "<?php echo base_url(); ?>Partysearch/loans");
		            $("#party_search_form").submit();
		            e.preventDefault();
		}
		</script>
		<script>
		function submit_form_jewel(){
			
		    $('#party_search_form').attr('action', "<?php echo base_url(); ?>Partysearch/jewel");
		            $("#party_search_form").submit();
		            e.preventDefault();
		}
		</script>
		<script>
		function submit_form_chit(){
			
		    $('#party_search_form').attr('action', "<?php echo base_url(); ?>Partysearch/chit");
		            $("#party_search_form").submit();
		            e.preventDefault();
		}
		</script>
		<script>
		function submit_form_karupatti(){
			
		    $('#party_search_form').attr('action', "<?php echo base_url(); ?>Partysearch/karupatti");
		            $("#party_search_form").submit();
		            e.preventDefault();
		}
		</script>
		<script>
		function submit_form_realestate(){
			
		    $('#party_search_form').attr('action', "<?php echo base_url(); ?>Partysearch/realestate");
		            $("#party_search_form").submit();
		            e.preventDefault();
		}
		</script>
		<script>
		function submit_form_membership(){
			
		    $('#party_search_form').attr('action', "<?php echo base_url(); ?>Partysearch/membership");
		            $("#party_search_form").submit();
		            e.preventDefault();
		}
		</script>
		<script>
		function submit_form_rating_history(){
			
		    $('#party_search_form').attr('action', "<?php echo base_url(); ?>Partysearch/rating_history");
		            $("#party_search_form").submit();
		            e.preventDefault();
		}
		</script>
		<script>
			// function test(){
				var party_search_type = $("#party_search_type").val();
				if	(party_search_type=='1'){
				var baseurl = $("#baseurl").val();
				var type = $("#party_search_type").val();
				$("#party_search").autocomplete({ 
				// alert(type);
			                valueKey:'title',
							
			                source:[{
			                url:baseurl+'Partysearch/userList?query=%QUERY%&type='+type,
			                type:'remote',
			                ajax:{
			                  dataType : 'json',
			                }
			            }]}).on('selected.xdsoft',function(e,suggestion,ui){ 
								
			                $("#party_search").val(suggestion.firstname);
							$('#party_search_id').val(suggestion.id);     
			        	});
				}
			// }
		</script>
	</body>
	<!--end::Body-->
</html>