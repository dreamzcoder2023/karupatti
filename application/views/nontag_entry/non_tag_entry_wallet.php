<?php $this->load->view("common");?>
<style>
	.dataTables_scroll
    {
        position: relative;
        overflow: auto;
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
									<h1 class="d-flex align-items-center text-dark fw-bold my-1 fs-3">Non Tagged
										<!--begin::Separator-->
										<span class="h-20px border-gray-400 border-start ms-3 mx-2"></span>
										<label class="d-flex align-items-center text-primary fw-bold my-1 fs-5">
											<span>Jewel Type &emsp;-</span>
											<span>&emsp;<?php if($jewel_type_fill==''){ echo "All"; } else{ $jewel_type  = $this->db->query("SELECT * FROM jewel_type WHERE  jewel_type_id='". $jewel_type_fill."' ")->row();
																				 echo $jewel_type->jewel_type;  } ?> </span>
										</label>										
										<!--end::Separator--> 
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
											<div class="mb-5 hover-scroll-x">
													<div class="d-grid">
														<ul class="nav nav-tabs flex-nowrap text-nowrap">
															<li class="nav-item">
																<a class="nav-link  btn btn-active-light btn-color-black-800 btn-active-color-primary rounded-bottom-0 fw-bold fs-6" href="<?php echo base_url(); ?>Nontag_entry">List</a>
															</li>
															<li class="nav-item">
																<a class="nav-link  active btn btn-active-light btn-color-black-800 btn-active-color-primary rounded-bottom-0 fw-bold fs-6" data-bs-toggle="tab" href="#kt_tab_pane_2">Wallet</a>
															</li>
														</ul>
													</div>
												</div>
													<div class="tab-pane fade show active" id="kt_tab_pane_2" role="tabpanel">
														<div class="row">
															<div class="col-lg-8">
																<div class="row">
																	<div class="col-lg-6">
																		<div class="text-center">
																			<label class="form-label fs-2 fw-bold">Total Count</label>
																		</div>
																		<div class="text-center">
																			<label class="text-success fs-2 fw-bold">
                                                                            <?php 
																			if($jewel_type_fill==''){
																			$jewel_type_id='';							
																			}
																			else{
																				$jewel_type_id=" WHERE jewel_type_id='".$jewel_type_fill."'";
																			}
                                                                            $item_total=$this->db->query("SELECT SUM(COUNT) AS tot_count ,SUM(WEIGHT) AS tot_weight FROM ITEMS   $jewel_type_id ")->row();
                                                                         if(isset($item_total->tot_count)){
																			echo $item_total->tot_count;
																		 }
																		 else{
																			echo "0";
																		 }
                                                                                ?>
                                                                            
                                                                            </label>
																		</div>
																	</div>
																	<div class="col-lg-6">
																		<div class="text-center">
																			<label class="form-label fs-2 fw-bold">Total Weight(gms)</label>
																		</div>
																		<div class="text-center">
																			<label class="text-success fs-2 fw-bold"><?php  if(isset($item_total->tot_weight)){
																			echo number_format($item_total->tot_weight,3);
																		 }
																		 else{
																			echo "0";
																		 } ?></label>
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
																			<form method="POST" action="<?php echo base_url(); ?>Nontag_entry/non_tag_entry_wallet" id="fill_form">
																				<div class="mb-2">
																					<label class="form-label fs-6 fw-semibold">Jewel Type</label>
																					<select class="form-select form-select-solid fw-semibold" data-control="select2" data-close-on-select="true"  id="jewel_type_fill" name="jewel_type_fill">	
																						<option value="" >All</option>
																						<?php foreach($metal_type_list as $mtlist)
																									{?>
																									<option value="<?php echo $mtlist['jewel_type_id'] ;?>" <?php if($jewel_type_fill==$mtlist['jewel_type_id']){ echo "selected"; } ?>><?php echo $mtlist['jewel_type'];?></option><?php
																									 }?>
																					</select>
																				</div>
																				<div class="d-flex justify-content-end">
																					<button type="reset" class="btn btn-light btn-active-light-primary fw-semibold me-2 px-6" data-kt-menu-dismiss="true" data-kt-user-table-filter="reset" onclick="reset_fill()">Reset</button>
																					<button type="submit" class="btn btn-primary fw-semibold px-6" data-kt-menu-dismiss="true" data-kt-user-table-filter="filter">Apply</button>
																				</div>
																			</form>
																		</div>
																	</div>																	
																	<button type="button" class="btn btn-sm btn-outline btn-outline-solid btn-outline-warning btn-active-light-primary me-3" data-bs-toggle="modal" data-bs-target="#">
																		Export</button>
																</div>
															</div>
														</div>
														<div class="row">
															<table id="kt_datatable_tagged_wallet" class="table align-middle table-row-dashed table-striped table-hover fs-7 gy-1 gs-2">
														    <thead>
														        <tr class="text-start text-muted fw-bold fs-7 gs-0">
														        	<th class="min-w-50px">Sno</th>
														        	<th class="min-w-100px">Jewel Type</th>
														        	<th class="min-w-100px">Item</th>
														        	<th class="min-w-100px">Count</th>
													            <th class="min-w-100px">Net Weight(gms)</th>
													            <th class="min-w-50px" style="width: 10%;">Action</th>
														        </tr>
														    </thead>
														    <tbody class="text-gray-600 fw-semibold">
                                                            <?php
															if($jewel_type_fill==''){
																$jewel_type_id='';							
																}
																else{
																	$jewel_type_id=" AND jewel_type_id='".$jewel_type_fill."'";
																}
															
															$i=1; foreach($Lotentry_item as $item){ ?>
																<?php $item_type = $this->db->query("SELECT * FROM ITEMS  WHERE SNO ='".$item['item_name'] ."' $jewel_type_id  ")->row(); 
																
															if(isset($item_type->jewel_type_id)){
																$jewel_type = $this->db->query("SELECT * FROM jewel_type  WHERE jewel_type_id ='".$item_type->jewel_type_id ."'  ")->row();
															
															?>

														        <tr>
                                                            
														        	<td><?php echo $i; ?></td>
														          <td><?php
                                                                 
                                                                  echo $jewel_type->jewel_type; ?></td>
														          <td><?php  echo $item_type->ITEMNAME; ?>  </td>
														          <td>  
                                                                  <?php
                                                                //   $count=0;
                                                                //   $weight=0;
                                                                //  $get_lot_no= $this->db->query("SELECT * FROM lot_entry_detail  WHERE item_name='".$item['item_name']."' ")->result_array();
                                                                //   foreach($get_lot_no as $get_lot){
                                                                //  $get_status = $this->db->query("SELECT * FROM lot_entry  WHERE lot_id='".$get_lot['lot_id']."' ")->row();
                                                                // // echo $get_status->status;
                                                                // if(isset( $get_status->status))
                                                                // {
                                                                //  if($get_status->status=="A") {

                                                                // $count+=$get_lot['non_tagged'];
                                                                // $weight+=$get_lot['non_tagged_weight'];
                                                                // }
                                                                // }
                                                                // }
																if(isset($item_type->COUNT)){
                                                                echo $item_type->COUNT;
																}else{
																	echo "0";
																}
                                                                 ?>
                                                                  </td>
														          <td><?php if(isset($item_type->WEIGHT)){
                                                                echo number_format($item_type->WEIGHT,3);
																}else{
																	echo "0";
																} ?></td>
													            <td>
																
																				<span class="text-end">
																					<a href="<?php echo base_url() ; ?>Nontag_entry/nontag_wallet_view/<?php echo $item['item_name']; ?>" target="__blank" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm">
																						<i class="bi bi-eye-fill eyc"></i>
																					</a>
																				</span>
																			</td>
														        </tr>
														      <?php $i++; } } ?>
														    </tbody>
															</table>
														</div>
													</div>
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
		<!-- non tag list day fillter start -->
		<script>
			function reset_fill(){

				$('#jewel_type_fill').val('');
				$('#fill_form').submit();
			}

		</script>
		<script>

				$("#kt_datatable_tagged_wallet").DataTable({
				
				"responsive": true,
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
		</script>
		<script>
      $("#kt_datatable_tagged_wallet").kendoTooltip({
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
	</body>
	<!--end::Body-->
</html>