<?php $this->load->view("common");?>
<style>
	.dataTables_scroll
    {
        position: relative;
        overflow: auto;
        max-height: 255px;/*the maximum height you want to achieve*/
        width: 100%;
    }
  .dataTables_scroll thead{
    position: -webkit-sticky;
    position: sticky;
    top: 0;
    background-color: #ec9629 !important;
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
									<h1 class="d-flex align-items-center text-dark fw-bold my-1 fs-3">Old Gold Wallet
									<!--begin::Separator-->
									<span class="h-20px border-gray-400 border-start ms-3 mx-2"></span>
									<label class="d-flex align-items-center text-primary fw-bold my-1 fs-5">
										<span>Jewel Type &emsp;-</span>
										<span>&emsp;<?php if($type_fill==''){ echo "All"; }else{
										 $item_type=$this->db->query("SELECT * FROM jewel_type WHERE jewel_type_id='".$type_fill."'  ")->row();
										 echo $item_type->jewel_type;	
											// echo $type_fill;
											 } ?></span>
									</label>
									<span class="h-20px border-gray-400 border-start ms-3 mx-2"></span>
									<label class="d-flex align-items-center text-primary fw-bold my-1 fs-5">
										<span>Item &emsp;-</span>
										<span>&emsp;<?php if($item_fill==''){ echo "All"; }else{ 
											 $item_name=$this->db->query("SELECT * FROM ITEMS WHERE SNO='".$item_fill."'  ")->row();
											 echo $item_name->ITEMNAME;	
										 } ?></span>
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
										<!--begin::Card header-->
										<div class="card-header1 border-0 pt-6">
											<!--begin::Card title-->
											<div class="row">
												<div class="col-lg-10">
													<div class="row">
														<div class="col-lg-6">
															<div class="row">
																<label class="col-lg-4 form-label text-center fs-2 fw-bold">Gold</label>
																<div class="col-lg-8 text-center">
																	<label class="text-success fs-2 fw-bold">
																	<!-- <span class="me-3"> -->
																		<svg fill="#d4af37" width="30px" height="30px" viewBox="0 0 32 32" version="1.1" xmlns="http://www.w3.org/2000/svg">
																		<path d="M11.652 19.245l-0.001-0.001-0.005-0.003zM30.671 16.098l-2.207-5.839-8.022-4.361-16.624 8.861-2.431 6.495 9.8 5.214 0.161-7.067-7.624-4.353 0.654 0.346-0.373-0.215 1.332 0.708-1.212-0.708 7.526 4.065 16.205-8.376-2.594 1.424 3.037-1.551-6.011 3.183-10.434 5.727-0.668 6.816 19.484-10.371zM11.976 17.206l-4.389-2.342 4.269 1.32 13.070-5.8-12.95 6.822z"></path>
																		</svg>
																	<!-- </span> -->
																	<?php 
																			$gold =  $old_gold_wallet_gold->gold_weight ? $old_gold_wallet_gold->gold_weight: 0;
																			echo number_format($gold , 3);
																	?> (gms)</label>
																	<div>
																		<label class="text-success fs-2 fw-bold">
																			<span><i class="fas fa-list-ol fs-2"></i>&nbsp;</span>
																		<?php echo $old_gold_wallet_gold->gold_count ? $old_gold_wallet_gold->gold_count : 0; ?></label>
																	</div>
																</div>
															</div>
														</div>
														<div class="col-lg-6">
															<div class="row">
																<label class="col-lg-4 form-label text-center fs-2 fw-bold">Silver</label>
																<div class="col-lg-8 text-center">
																	<label class="text-success text-center fs-2 fw-bold">
																		<!-- <span class="me-3"> -->
																			<svg fill="#C0C0C0" width="30px" height="30px" viewBox="0 0 32 32" version="1.1" xmlns="http://www.w3.org/2000/svg">
																			<path d="M11.652 19.245l-0.001-0.001-0.005-0.003zM30.671 16.098l-2.207-5.839-8.022-4.361-16.624 8.861-2.431 6.495 9.8 5.214 0.161-7.067-7.624-4.353 0.654 0.346-0.373-0.215 1.332 0.708-1.212-0.708 7.526 4.065 16.205-8.376-2.594 1.424 3.037-1.551-6.011 3.183-10.434 5.727-0.668 6.816 19.484-10.371zM11.976 17.206l-4.389-2.342 4.269 1.32 13.070-5.8-12.95 6.822z"></path>
																			</svg>
																		<!-- </span> -->
																		<?php 
																			$silver =  $old_gold_wallet_silver->silver_weight?$old_gold_wallet_silver->silver_weight:0; 
																			echo number_format($silver , 3);
																		?>(gms)</label>
																		<div class="text-center">
																			<label class="text-success fs-2 fw-bold">
																				<span><i class="fas fa-list-ol fs-2"></i>&nbsp;</span>
																				<?php echo $old_gold_wallet_silver->silver_count ? $old_gold_wallet_silver->silver_count:0; ?></label>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
												<div class="col-lg-2">
													<div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
														<!--begin::Filter-->
														<button type="button" class="btn btn-sm btn-outline btn-outline-solid btn-outline-warning btn-active-light-primary me-3" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
														<!-- <span class="svg-icon svg-icon-2">
															<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																<path d="M19.0759 3H4.72777C3.95892 3 3.47768 3.83148 3.86067 4.49814L8.56967 12.6949C9.17923 13.7559 9.5 14.9582 9.5 16.1819V19.5072C9.5 20.2189 10.2223 20.7028 10.8805 20.432L13.8805 19.1977C14.2553 19.0435 14.5 18.6783 14.5 18.273V13.8372C14.5 12.8089 14.8171 11.8056 15.408 10.964L19.8943 4.57465C20.3596 3.912 19.8856 3 19.0759 3Z" fill="currentColor" />
															</svg>
														</span> -->
															Filter</button>
														<div class="menu menu-sub menu-sub-dropdown w-300px w-md-325px" data-kt-menu="true">
															<div class="px-7 py-5" data-kt-user-table-filter="form">
															<form method="POST" action="<?php echo base_url(); ?>Old_gold/old_gold_wallet" id="fill_form">
																<div class="mb-2">
																	<label class="form-label fs-6 fw-semibold">Jewel Type</label>																
																	<select class="form-select form-select-solid" data-control="select2" name="type_fill" id="type_fill">
																		<option value="" selected>All</option>
																		<?php foreach($metal_type_list as $mtlist){?>
																				<option value="<?php echo $mtlist['jewel_type_id'] ;?>" <?php if($type_fill==$mtlist['jewel_type_id']){ echo "selected"; } ?>><?php echo $mtlist['jewel_type'];?></option>
																		<?php } ?>
																	</select>
																</div>
																<div class="mb-2">
																	<label class="form-label fs-6 fw-semibold">Item</label>
																	<select class="form-select form-select-solid" data-control="select2"  name="item_fill" id="item_fill">
																		<option value="" >All</option>
																		<?php foreach($old_gold_wallet_filter as $ilist){ ?>
																			 <option value="<?php echo $ilist['SNO']; ?>" <?php if($item_fill==$ilist['SNO']){ echo "selected"; } ?> ><?php echo $ilist['ITEMNAME']; ?></option>
																			
																			<?php } ?>
																	</select>
																</div>
																<div class="d-flex justify-content-end">
																	<button type="reset" class="btn btn-light btn-active-light-primary fw-semibold me-2 px-6" data-kt-menu-dismiss="true" data-kt-user-table-filter="reset" onclick="reset_fill()">Reset</button>
																	<button type="submit" class="btn btn-primary fw-semibold px-6" data-kt-menu-dismiss="true" data-kt-user-table-filter="filter">Apply</button>
																</div>
															</div>
															</form>
														</div>
													</div>
												</div>
											</div>
											<!--end::Card title-->
										</div>
										<!--end::Card header-->
										<!--begin::Card body-->
										<div class="card-body py-4">
											<table id="kt_datatable_responsive" class="table align-middle table-row-dashed table-striped table-hover fs-7 gy-1 gs-2">
											    <thead>
											        <tr class="text-start text-muted fw-bold fs-7 gs-0">
											        	<th class="min-w-50px">Sno</th>
											        	<!--<th class="min-w-150px">Company</th>-->
											        	<th class="min-w-80px">Jewel Type</th>
											        	<th class="min-w-80px">Item</th>
											        	<th class="min-w-80px">Count</th>
										            <th class="min-w-100px">Net Weight(gms)</th>
										            <th class="min-w-80px" style="width: 10%;">Action</th>
											        </tr>
											    </thead>
											    <tbody class="text-gray-600 fw-semibold">
												<?php 
												$i=1;
												foreach($old_gold_wallet as $oglist){ ?>
											        <tr>
											        	<td><?php echo $i; ?></td>
											        	
											          <td><?php 
													 $item_type=$this->db->query("SELECT * FROM jewel_type WHERE jewel_type_id='".$oglist['jewel_type_id']."'  ")->row();
													 echo $item_type->jewel_type;   ?></td>
											          <td><?php echo $oglist['ITEMNAME']?$oglist['ITEMNAME']:0;  ?></td>
											          <td><?php echo $oglist['OLD_GOLD_COUNT']?$oglist['OLD_GOLD_COUNT']:0;  ?></td>
											          <td>
											          	<?php 
																			$gold =  $oglist['OLD_GOLD_WEIGHT'] ? $oglist['OLD_GOLD_WEIGHT']: 0;
																			echo number_format($gold , 3);
																	?> (gms)
																</td>
										            <td>
																	<span class="text-end">
																		<a href="javascript:;" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm" data-bs-toggle="modal" data-bs-target="#kt_modal_view_pure_gold_wallet" onclick="old_gold_wallet_view('<?php  echo $oglist['SNO']; ?>')">
																			<i class="fas fa-calendar-check eyc" title="Pick for Conversion"></i>
																		</a>
																	</span>
																</td>
											        </tr>
											       <?php $i++; } ?>
											    </tbody>
											</table>
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
							<h1>View Old Gold Wallet</h1>
						</div>
						<div class="row">
							<label class="col-lg-1 col-form-label fw-semibold fs-6">JewelType</label>
							<label class="col-lg-1 col-form-label fw-bold fs-5" id="old_gold_jewel_type" name="old_gold_jewel_type"> </label>
							<div class="col-lg-3">
								<label class="col-form-label fw-semibold fs-6">Item &emsp;</label>
								<label class="col-form-label fw-bold fs-5" id="old_gold_item" name="old_gold_item"></label>
							</div>
							<label class="col-lg-2 col-form-label fw-semibold fs-6">Total No of Item</label>
							<label class="col-lg-1 col-form-label fw-bold fs-5" id="old_gold_count" name="old_gold_count">0</label>
							<label class="col-lg-2 col-form-label fw-semibold fs-6">Total Net Weight</label>
							<label class="col-lg-2 col-form-label fw-bold fs-5" id="old_gold_weight" name="old_gold_weight"> 0.00 (gms)</label>
						</div>
						<!--<form method="POST" action="<?php echo base_url(); ?>Old_gold/old_gold_add_lot"  >-->
						<table id="view_pure_gold_wallet_table" class="table align-middle table-row-dashed table-striped table-hover fs-7 gy-1 gs-2 dataTable">
							<thead>
							  <tr class="text-start text-muted fw-bold fs-7 gs-0">
							  	<th class="min-w-50px">
							  		<div class="fv-row fv-plugins-icon-container fv-plugins-bootstrap5-row-invalid d-flex align-items-center">
											<div class="d-flex align-items-center">
												<label class="form-check form-check-inline form-check-solid is-invalid">
													<input class="form-check-input" name="select_all" id="select_all" type="checkbox" value="1" onclick="select_all()">
											<span class="col-form-label fw-bold fs-7">All</span>
												</label>
											</div>
										
										</div>
							  	</th>
							   	<th class="min-w-100px">Date</th>
							   	<th class="min-w-100px">Company</th>
							    <th class="min-w-100px">Generate No</th>
									<th class="min-w-50px">Img</th>
									<th class="min-w-100px">Subitem Name</th>
									<th class="min-w-80px">Wgt(gms)</th>
									<th class="min-w-50px">Stone(gms)</th>
									<th class="min-w-50px">Less(gms)</th>
									<th class="min-w-80px">Net Wgt(gms)</th>
							  </tr>
							  
							</thead>
							
						<input type="hidden" name="checkbox_count" id="checkbox_count">
							<tbody class="text-gray-600 fw-semibold" name="old_gold_table_rows" id="old_gold_table_rows">
							
							</tbody>
						</table>
						
						<div class="row">
							<div class="col-lg-2 fv-row fv-plugins-icon-container fv-plugins-bootstrap5-row-invalid d-flex align-items-center">
								<div class="d-flex align-items-center">
									<label class="form-check form-check-inline form-check-solid is-invalid">
										<input class="form-check-input" name="new_lot_radio" id="new_lot_radio" type="checkbox" value="1" onclick="new_lot_radio()">
								<span class="col-form-label fw-semibold fs-6">New Lot</span>
									</label>
								</div>
							</div>
							<div class="col-lg-2 fv-row fv-plugins-icon-container fv-plugins-bootstrap5-row-invalid d-flex align-items-center">
								<div class="d-flex align-items-center">
									<label class="form-check form-check-inline form-check-solid is-invalid">
										<input class="form-check-input" name="exis_lot_radio" type="checkbox" value="1" id="exis_lot_radio" onclick="exist_lot_radio()">
								<span class="col-form-label fw-semibold fs-6">Existing Lot</span>
									</label>
								</div>
							</div>
							<div class="col-lg-3"  id="exis_lot_radio_tbox" style="display: none;">
								<select class="form-select form-select-solid" data-control="select2" data-hide-search="true" id="exis_lot_no" id="exis_lot_no">	
									<option value="">Select Convertion Lot</option>
									<?php $get_lot_no= $this->db->query("SELECT * FROM old_gold_lot WHERE status='Y' ")->result_array(); 
									foreach($get_lot_no as $llist){ ?>
									<option value="<?php echo $llist['ref_no'] ?>"><?php echo $llist['ref_no'] ?></option>
									<?php  } ?>
								</select>
							</div>
							<div class="d-flex justify-content-end mt-6 px-9">
								<button type="reset" class="btn btn-secondary me-3" data-bs-dismiss="modal">Cancel</button>
								
								<button type="submit" class="btn btn-primary" onclick="add_convert_lot()">Add to Convertion Lot</button>
								
								</div>
						</div>
						<!--</form>-->
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
				function reset_fill(){

					$('#item_fill').val('');
					$('#type_fill').val('');				
					$('#fill_form').submit();
				}
			</script>

<script>
$(document).ready(function(){
	
});
function select_all(){

	
	
	var select_all = document.getElementById("select_all");
	
if(select_all.checked){
	for(i=1;i<=count;i++){
	 $('#checkbox'+i).prop('checked', true);
}
}
else{
	for(i=1;i<count;i++){
	 $('#checkbox'+i).prop('checked', false);
}
}

}
</script>

<script>
function add_convert_lot(){
	var baseurl= $("#baseurl").val();
	var lot_no= $("#exis_lot_no").val();
	var count=$('#checkbox_count').val();
	var check_box_checked=[];
	for(i=1;i<=count;i++){
		var select_all = document.getElementById("checkbox"+i);
if(select_all.checked){
	var x = document.getElementById("checkbox"+i).value;
	check_box_checked.push(x);
}
}
// alert(lot_no);

$.ajax({
				type: "POST",
				url: baseurl+'Old_gold/old_gold_add_lot?',
				async: false,
				type: "POST",
				data: "count="+count+"&checked="+check_box_checked+"&lot_no="+lot_no,
				dataType: "html",
				success: function(response)
				{
					window.location.href = baseurl+'Old_gold/old_gold_wallet';
				}
			});

}

</script>


		<script>
		function old_gold_wallet_view(val){
//  alert(val);

var baseurl= $("#baseurl").val();
				// alert(baseurl);
				$.ajax({
				type: "POST",
				url: baseurl+'Old_gold/old_gold_wallet_view',
				async: false,
				type: "POST",
				data: "id="+val,
				dataType: "html",
				success: function(response)
				{
					res=response.split('||');
					$('#old_gold_jewel_type').html(res[1]);
					$('#old_gold_item').html(res[2]);
					$('#old_gold_count').html(res[3]);
					$('#old_gold_weight').html(res[4]);
					// $('#old_gold_item_weight').html(res[5]);
					 $('#old_gold_table_rows').empty().append(res[5]);
			
				}
			});
			count=$('.checkbox').length;
			$('#checkbox_count').val(count);
			

		}
		</script>
		
		<script>
			function exist_lot_radio()
			{
				var exis_lot_radio = document.getElementById("exis_lot_radio");
				var exis_lot_radio_tbox = document.getElementById("exis_lot_radio_tbox");

				if (exis_lot_radio.checked)
				{
			    exis_lot_radio_tbox.style.display = "block";
				
		  	} 
		  	else 
		  	{
		     	exis_lot_radio_tbox.style.display = "none";
		  	}
			}
		</script>
		<script>
			$("#view_pure_gold_wallet_table").DataTable({
				//"aaSorting":[],
				"sorting":false,
				"paging": false,
				// "responsive": true,
				 "language": {
				  "lengthMenu": "Show _MENU_",
				 },
				 "dom":
				  "<'row'" +
				  "<'col-sm-6 d-flex align-items-center justify-conten-start'l>" +
				  ">" +

				  "<'table-responsive'tr>" +

				  "<'row'" +
				  "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
				  "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
				  ">"
				});
			$('#view_pure_gold_wallet_table').wrap('<div class="dataTables_scroll" />');
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
	      $("#view_pure_gold_wallet_table").kendoTooltip({
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