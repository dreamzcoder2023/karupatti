<?php $this->load->view("common.php") ?>
<link href="<?php echo base_url();?>assets/jquery.autocomplete.css" rel="stylesheet" type="text/css" />
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
    /*background-color: #fff;*/
    background-color: #ec9629;
    z-index: 2;
  }
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
											<?php if (isset($party_detail->RATING)) {?>
											<span>&nbsp;-&nbsp;</span>
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
										<!--begin::Card body-->
										<div class="card-body py-4">
											<form id="party_search_form" method="post" action="" enctype="multipart/form-data" >	
												<div class="row">
													<div class="col-lg-1">
														<label class="col-form-label required fw-semibold fs-6">Type<i class="fa-solid fa-circle-info fs-7 ms-2"  title="AutoComplete Select Party Details"></i></label>
													</div>
													<div class="col-lg-3">
														<select class="form-select form-select-solid" data-control="select2" data-hide-search="true" id="party_search_type" name="party_search_type" placeholder="Select Party Details">
															<option value="1" <?php if($party_search_type=='1'){ echo 'selected'; } ?>>Party Name</option>
															<option value="2" <?php if($party_search_type=='2'){ echo 'selected'; } ?>>Phone No</option>
															<!-- <option value="3" < ?php if($party_search_type=='3'){ echo 'selected'; } ?>>Membership ID</option>
															<option value="4" < ?php if($party_search_type=='4'){ echo 'selected'; } ?>>Loan No</option> -->
														</select>
													</div>
													<div class="col-lg-3">
														<input type="text" name="party_search" id="party_search" class="form-control form-control-lg form-control-solid"  value="<?php echo $party_search; ?>"placeholder="Select Party Details">
														<!-- onkeyup="test()" -->
														<input type="hidden" name="party_search_id" id="party_search_id" value="<?php if(isset($party_detail->PID)){echo $party_detail->PID; } ?>"> 
													</div>
													<div class="col-lg-1">
														<input type="button" name="party_submit" id="party_submit" class="btn btn-sm btn-outline btn-outline-solid btn-outline-warning btn-active-light-primary" placeholder="" value="Go" onclick="submit_form()">
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
															<a class="nav-link btn btn-active-light btn-color-black-800 btn-active-color-primary rounded-bottom-0 fw-bold fs-6"   aria-selected="false" onclick="submit_form_loan()"style="display:none;">Loans</a>
														</li>
														<li class="nav-item" role="presentation">
															<a class="nav-link btn btn-active-light btn-color-black-800 btn-active-color-primary rounded-bottom-0 fw-bold fs-6"   aria-selected="false" onclick="submit_form_jewel()"style="display:none;">Jewel</a>
														</li>
														<li class="nav-item" role="presentation">
															<a class="nav-link btn btn-active-light btn-color-black-800 btn-active-color-primary rounded-bottom-0 fw-bold fs-6"   aria-selected="false" onclick="submit_form_chit()"style="display:none;">Chit</a>
														</li>
														<li class="nav-item" role="presentation">
															<a class="nav-link btn btn-active-light btn-color-black-800 btn-active-color-primary rounded-bottom-0 fw-bold fs-6"   aria-selected="false" onclick="submit_form_karupatti()">Karuppati</a>
														</li>
														<li class="nav-item" role="presentation">
															<a class="nav-link btn btn-active-light btn-color-black-800 btn-active-color-primary rounded-bottom-0 fw-bold fs-6 active"   aria-selected="false">Real Estate</a>
														</li>
														<li class="nav-item">
															<a class="nav-link btn btn-active-light btn-color-black-800 btn-active-color-primary rounded-bottom-0 fw-bold fs-6"   aria-selected="false" onclick="submit_form_membership()"style="display:none;">Membership</a>
														</li>
														<li class="nav-item">
															<a class="nav-link btn btn-active-light btn-color-black-800 btn-active-color-primary rounded-bottom-0 fw-bold fs-6"   aria-selected="false" onclick="submit_form_rating_history()"style="display:none;">Rating History</a>
														</li>
													</ul>
												</div>
											</div>
											<div class="row">
												<div class="col-lg-1 fv-row">
		                                            <label class="col-form-label fw-semibold fs-6">Type</label>
		                                        </div>
		                                        <div class="col-lg-3 fv-row">
		                                            <select name="process_type" id="process_type" aria-label="Select a Currency" data-control="select2" class="form-select form-select-solid form-select-lg fs-6" onchange="type_change()">
		                                                <option value="">All</option>
		                                                <option value="Property" selected>Property</option>
		                                                <option value="Purchase">Purchase</option>
		                                                <option value="Sale">Sale</option>
		                                            </select>  
		                                            <div class="fv-plugins-message-container invalid-feedback" id="process_type_err"></div>
		                                        </div>
											</div>
											<div class="tab-content" id="myTabContent">
												<div class="tab-pane fade active show" id="kt_tab_pane_karuppati"role="tabpanel">
													<!-- Start :: Property Table-->
													<div class="row mt-4" id="property_row" style="display: none!important;">
														<label class="d-flex align-items-center text-dark fw-bold my-1 fs-3">Property</label>
														<table id="re_property_list" class="table align-middle table-row-dashed table-striped table-hover fs-7 gy-1 gs-2 dataTable no-footer">
															<thead>
																<tr class="text-start text-muted fw-bold fs-7 gs-0">
																	<th class="min-w-50px">Sno</th>
																	<th class="min-w-100px">Land Name</th>
																	<th class="min-w-100px">Property ID</th>
																	<th class="min-w-100px">Ref.Name</th>
																	<th class="min-w-100px">Land Lord</th>
																	<th class="min-w-80px">Type</th>
																	<th class="min-w-100px"><span class="ms-2">Plot Area</span><br>
																		<span>(No / Type)</span></th>
																	<th class="min-w-100px">Total Amount</th>
																	<th class="min-w-100px">Status</th>
																	<th class="min-w-100px"><span class="text-end">Actions</span></th>
																</tr>
															</thead>
															<tbody class="text-gray-600 fw-semibold">
																<?php foreach ($property_list as $i => $plist) { ?> 
																	<tr>
																		<td><?php echo $i+1; ?></td>
																		<td><?php echo $plist['land_name'];?></td>
																		<td><?php echo $plist['property_id'];?></td>
																		<td class="ple1">
																			<span class="align-items-center"><?php echo $plist['ref_name'] ;?></span>
																		</td>
																		<td><?php echo $plist['land_lord'];?></td>
																		<td><?php echo $plist['property_type'] ;?></td>
																		<td><i class="bi bi-geo-alt-fill fs-7"></i>&nbsp;<?php echo $plist['ploat_no'];?> / <?php echo $plist['ploat_type'];?></td>
																		
																		<!-- <td><?php echo $plist['pro_amount'];?></td> -->
																		<td>
																			<?php $amt= $plist['total_property_amount']; 
																			echo number_format($amt,2,'.',',');?>
																		</td>
																		<td>
																			<?php if($plist['ploat_no'] == $plist['prop_sts_update']){ ?>
																				<label class="col-form-label fw-semibold fs-7" >
																				<span style="background-color:#B6BD4F;border-radius: 8px;padding: 5px 15px 5px 15px;">Not Sold</span>
																			</label>

																			<?php }else{ ?>
																			<?php if($plist['prop_sts_update'] !='0'){ ?>
																				<label class="col-form-label fw-semibold fs-7" >
																				<span style="background-color:#46dcf9;border-radius: 8px;padding: 5px 15px 5px 15px;">Partial Sold</span>
																			</label>
																			<?php  }else{   ?>

																			<?php if($plist['prop_sts_update']<= 0){ ?>
																			<label class="col-form-label fw-semibold fs-7" ><span style="background-color:#f1416c;border-radius: 8px;padding: 5px 10px 5px 10px;">Sold Out</span>
																			</label>
																			<?php  }  }  }?>
																		</td>
																		<td class="">
																			<span class="text-end">
																				<a href="<?php echo base_url();?>Realestateproperty/realestate_property_view/<?php echo $plist['id']; ?>" target="_blank" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm">
																					<i class="bi bi-eye-fill eyc fs-3"></i>
																				</a>																					
																			</span>
																		</td>
																	</tr>
																<?php $i++; } ?>
															</tbody>
														</table>
														<div class="row mt-4"></div>
													</div>
													<!-- END :: Property Table-->
													<!-- Start :: Purchase Table-->
													<div class="row mt-4" id="purchase_row" style="display: none!important;">
														<label class="d-flex align-items-center text-dark fw-bold my-1 fs-3">Purchase</label>
														<table id="re_purchase_list" class="table align-middle table-row-dashed table-striped table-hover fs-7 gy-1 gs-2 dataTable no-footer">
															<thead>
																<tr class="text-start text-muted fw-bold fs-7 gs-0">
																	<th class="min-w-25px">Sno</th>
																	<th class="min-w-100px">Date</th>
																	<th class="min-w-100px">Land Name</th>
																	<th class="min-w-100px">Purchase ID</th>
																	<th class="min-w-100px">Ref.Name</th>
																	<th class="min-w-100px">Land Lord</th>
																	<th class="min-w-100px"><span class="ms-2">Plot Area</span><br>
																		<span>(No / Type)</span></th>
																	<th class="min-w-100px">Total Amount</th>
																	<th class="min-w-100px">Status</th>
																	<th class="min-w-100px"><span class="text-end">Actions</span></th>
																</tr>
															</thead>
															<tbody class="text-gray-600 fw-semibold">
																<?php foreach($Purchase_list as $i=> $purlist){
																	$date=date('d-m-Y',strtotime($purlist['date']));
																?>
																	<tr>
																	    <td><?php echo $i+1; ?></td>
																		<td><?php echo $date;?></td>
																		<td class="ple1"><?php echo $purlist['land_name'];?></td>
																		<td class="ple1"><?php echo $purlist['property_id'];?>
																			<input type="hidden" name="pur_bill_no_hidden" id="pur_bill_no_hidden" value="<?php echo $purlist['property_id'] ;?>">
																		</td>
																		<td class="ple1">
																			<span class="align-items-center"><?php echo $purlist['ref_name'];?></span>
																		</td>
																		<td class="ple1"><?php echo $purlist['land_lord'];?></td>
																		<td><i class="bi bi-geo-alt-fill fs-7"></i>&nbsp;<?php echo $purlist['ploat_no'];?> / <?php echo $purlist['ploat_type'];?></td>
																		<td>
																			<?php $amt= $purlist['total_property_amount']; 
																			echo number_format($amt,2,'.',',');?>
																		</td>
																		<td>
																			<?php if($purlist['ploat_no'] == $purlist['prop_sts_update']){ ?>
																				<label class="col-form-label fw-semibold fs-7" >
																				<span style="background-color:#B6BD4F;border-radius: 8px;padding: 5px 15px 5px 15px;">Not Sold</span>
																			</label>

																			<?php }else{ ?>
																			<?php if($purlist['prop_sts_update'] !='0'){ ?>
																					<label class="col-form-label fw-semibold fs-7" >
																					<span style="background-color:#46dcf9;border-radius: 8px;padding: 5px 15px 5px 15px;">Partial Sold</span>
																				</label>
																			<?php  }else{   ?>
																			<?php if($purlist['prop_sts_update'] =='0'){ ?>
																			<label class="col-form-label fw-semibold fs-7" ><span style="background-color:#f1416c;border-radius: 8px;padding: 5px 10px 5px 10px;">Sold Out</span>
																				</label>
																			<?php  }  }  }?>
																		</td>
																		<td>
																			<span class="text-end">	
																				<a href="<?php echo base_url();?>Realestatepurchase/realestate_view_purchase/<?php echo $purlist['id']; ?>" target="_blank" 
																				class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm"
																				>
																				<i class="bi bi-eye-fill eyc fs-3"></i>
																		        </a>
																			</span>
																		</td>
																	</tr>
																<?php $i++; }?>
															</tbody>
														</table>
														<div class="row mt-4"></div>
													</div>
													<!-- END :: Purchase Table-->
													<!-- Start :: Sales Table-->
													<div class="row mt-4" id="sale_row" style="display: none!important;">
														<label class="d-flex align-items-center text-dark fw-bold my-1 fs-3">Sale</label>
														<table id="re_sale_list" class="table align-middle table-row-dashed table-striped table-hover fs-7 gy-1 gs-2 dataTable no-footer">
															<thead>
																<tr class="text-start text-muted fw-bold fs-7 gs-0">
																	<th class="min-w-50px">Sno</th>
																	<th class="min-w-100px">Date</th>
																	<th class="min-w-100px">Land Name</th>
																	<th class="min-w-100px">Sale ID</th>
																	<th class="min-w-100px">Ref.Name</th>
																	<th class="min-w-100px">Land Lord</th>
																	<th class="min-w-100px"><span class="ms-2">Plot Area</span><br>
																		<span>(No / Type)</span></th>				
																	<th class="min-w-100px">Amount</th>
																	<th class="min-w-100px">Status</th>
																	<th class="min-w-125px"><span class="text-end">Actions</span></th>
																</tr>
															</thead>
															<tbody class="text-gray-600 fw-semibold">
																<?php  foreach($sale_list as $i=> $slist){ $date=date('d-m-Y',strtotime($slist['date']));?>
																	<tr>
																		<td><?php echo $i+1; ?></td>
																		<td><?php echo $date;?></td>
																		<td class="ple1"><?php echo $slist['land_name'];?></td>
																		<td><?php echo $slist['sale_id'];?></td>
																		<td class="ple1">
																			<span class="align-items-center"><?php echo $slist['ref_name'];?></span>
																		</td>
																		<td><?php echo $slist['land_lord'];?></td>
																		<td>
																			<i class="bi bi-geo-alt-fill fs-7"></i>&nbsp;<?php echo $slist['ploat_no'];?> / <?php echo $slist['ploat_type'];?>
																		</td>
																		<td>
																			<?php $amt= $slist['total_property_amount']; 
																			echo number_format($amt,2,'.',',');?>
																		</td>
																		<td>
																		<?php if($slist['balance_amount'] !='0'){ ?>
																				<label class="col-form-label fw-semibold fs-7" >
																				<span style="background-color:#46dcf9;border-radius: 8px;padding: 5px 15px 5px 15px;">Booked</span>
																			</label>
																		<?php  }else{   ?>

																		<?php if($slist['balance_amount'] =='0'){ ?>
																		<label class="col-form-label fw-semibold fs-7" ><span style="background-color:#B6BD4F;border-radius: 8px;padding: 5px 10px 5px 10px;">Registered</span>
																			</label>
																		<?php   }  }?>
																		</td>
																		<td>
																			<span class="text-end">
																				<a href="<?php echo base_url(); ?>Realestatesale/sales_view/<?php echo $slist['id']; ?>" target="_blank" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm">
																				<i class="bi bi-eye-fill eyc"></i>
																				</a>
																			</span>
																		</td>
																	</tr>
																<?php $i++; }?>
															</tbody>
														</table>
														<div class="row mt-4"></div>
													</div>
													<!-- END :: Sales Table-->
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
		<input type="hidden" id="baseurl" value="<?php echo base_url(); ?>">
		<?php $this->load->view("script.php")?>
		<script src="<?php echo base_url();?>assets/jquery.autocomplete.js"></script>
		<script>
			$("#re_property_list").DataTable({
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
			$('#re_property_list').wrap('<div class="dataTables_scroll2" />');
		</script>
		<script>
	      $("#re_property_list").kendoTooltip({
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
		<!-- purchase  -->
		<script>
			$("#re_purchase_list").DataTable({
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
			$('#re_purchase_list').wrap('<div class="dataTables_scroll2" />');
		</script>
		<script>
	      $("#re_purchase_list").kendoTooltip({
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
		<!-- sales -->
		<script>
			$("#re_sale_list").DataTable({
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
			$('#re_sale_list').wrap('<div class="dataTables_scroll2" />');
		</script>
		<script>
	      $("#re_sale_list").kendoTooltip({
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
			type_change()
			function type_change()
			{
				var type_changes = document.getElementById("process_type").value;
				var property_row = document.getElementById("property_row");
				var purchase_row = document.getElementById("purchase_row");
				var sale_row     = document.getElementById("sale_row");

				if (type_changes=="")
				{
					property_row.style.display    = "block";
					purchase_row.style.display    = "block";
					sale_row.style.display	      = "block";
			  	}
			  	else if(type_changes=="Property")
			  	{
				    property_row.style.display   = "block";
					purchase_row.style.display   = "none";
					sale_row.style.display	     = "none";
			  	}
			  	else if(type_changes=="Sale")
			  	{
					sale_row.style.display	     = "block";
				    property_row.style.display   = "none";
					purchase_row.style.display   = "none";
			  	}
			  	else if(type_changes=="Purchase")
			  	{	
					purchase_row.style.display	= "block";
			  	    property_row.style.display  = "none";
					sale_row.style.display	    = "none";
			  	}
			}
		</script>
		<script>
		function realestate_type_sel(){
			// alert(1);
			var type=$("#realestate_type").val();
			$("#sel_realestate_type").val(type);
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