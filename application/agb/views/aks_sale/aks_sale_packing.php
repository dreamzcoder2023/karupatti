<?php $this->load->view("common");?>
<style>
	.dataTables_scroll
    {
        position: relative;
        overflow: auto;
        /*min-height: 218px;*/
        max-height: 250px;/*the maximum height you want to achieve*/
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
									<h1 class="d-flex align-items-center text-dark fw-bold my-1 fs-3">Sales Packing List
									<!--begin::Separator-->
									<span class="h-20px border-gray-400 border-start ms-3 mx-2"></span><?php echo $sale_detail->sale_id?$sale_detail->sale_id:''; ?>
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
												<label class="col-lg-2 col-form-label fw-bold fs-5"><?php echo $sale_detail->sale_date; ?></label>
											  <label class="col-lg-1 col-form-label fw-semibold fs-6">Sale Id</label>
											  <label class="col-lg-2 col-form-label fw-bold fs-5"><?php echo $sale_detail->sid; ?></label>
												<label class="col-lg-1 col-form-label fw-semibold fs-6">Party</label>
											  <label class="col-lg-2 col-form-label fw-bold fs-5"><?php echo $sale_detail->sale_party; ?></label>
											  <label class="col-lg-3 col-form-label fw-bold fs-5 text-center">
											  	<span style="background-color:#FFAA00;border-radius: 8px;padding: 5px 15px 5px 15px;"><?php echo ucfirst($sale_detail->sale_deliverymode); ?></span>
											  </label>
												<label class="col-lg-1 col-form-label fw-semibold fs-6">Total Items</label>
											  <label class="col-lg-2 col-form-label fw-bold fs-5"><?php echo $sale_detail->sale_prd_count; ?></label>
												<label class="col-lg-1 col-form-label fw-semibold fs-6">Net Amt</label>
											  <label class="col-lg-2 col-form-label fw-bold fs-5"><?php echo $sale_detail->sale_net_amt; ?></label>
											</div>
											<form method="post" id="packing_form"action="<?php echo base_url(); ?>Akssale/partial_packing"  enctype="multipart/form-data">

											<div class="row mt-4">

												<table class="table align-middle table-row-dashed table-striped table-hover fs-7 gy-2 gs-2 dataTable" id="update_sale_packing">
											    <thead>
											        <tr class="text-start text-muted fw-bold fs-7 gs-0">
										            <th data-orderable="false" class="w-10px pe-2">
																	<div class="form-check form-check-sm form-check-custom me-3">
																			<input class="form-check-input" type="checkbox" id="select_all_checkbox"  value="1" />
																	</div>
																</th>
										            <th class="min-w-100px">Product</th>
										            <th class="min-w-80px">Wgt/gms</th>
																<th class="min-w-80px">Packed Wgt/gms</th>
																<th class="min-w-80px">Balance Wgt/gms</th>
										            <th class="min-w-100px" style="width:150px !important;">Updated Wgt/gms</th>
										            <th class="min-w-100px">Price Per gram</th>
										            <th class="min-w-100px">Price</th>
											        </tr>
											    </thead>
											    <tbody class="text-gray-600 fw-semibold">
												<?php $i=0; foreach($sale_list_detail as $slist){ ?>

													<?php if($slist['product_wgt']-$slist['packed_wgt']>0){ ?>
												    	<tr>
												    		<td>
																<div class="form-check form-check-sm form-check-custom">
																	<input class="form-check-input pack_chk" type="checkbox" name="checkbox[<?php echo $i; ?>]" id="checkbox<?php echo $i; ?>" value="<?php echo $slist['id']; ?>"/>
																	<input type="hidden" name="checked[]" id="checked<?php echo $i; ?>" value="<?php echo $slist['product_id']; ?> "/>
																	<input type="hidden" name="prd_id_hidden[]" id="prd_id_hidden<?php echo $i; ?>" value="<?php echo $slist['product_id']; ?> "/>
																	<input  type="hidden" name="id_hidden[]" id="id_hidden<?php echo $i; ?>" value="<?php echo $slist['id']; ?> "/>
																</div>
															</td>
												    		<td> 
												    			<?php
																$product_detail=$this->db->query("SELECT * FROM AKS_PRD_MASTER WHERE AKS_PRD_MID='".$slist['product_id']."'")->row();
																echo $product_detail->AKS_PRD_NAME; ?> 

															</td>
												    		<td><?php echo $slist['product_wgt']; ?></td>
															<td><?php echo $slist['packed_wgt']; ?></td>
															<td><?php echo $slist['product_wgt']-$slist['packed_wgt']; ?></td>
												    		<td>
															<input type="text" class="form-control form-control form-control-solid" name="packed_weight[<?php echo $i; ?>]" id="packed_weight<?php echo $i; ?>" value="<?php echo $slist['product_wgt']-$slist['packed_wgt']; ?>" onkeyup="weight_check(<?php echo $i; ?>)">

												    		<input type="hidden" class="form-control form-control form-control-solid" name="packed_weight_hidden[]" id="packed_weight_hidden<?php echo $i; ?>" value="<?php echo $slist['product_wgt']-$slist['packed_wgt']; ?>">
												    		</td>
												    		<td><?php echo $product_detail->AKS_PRD_PRICE.'/'.$product_detail->AKS_PRD_WT;  ?></td>
												    		<td><?php echo $slist['price']; ?></td>
												    	</tr>
													<?php $i++; } }?> 
											   		 </tbody>
												</table>
											</div>
											<input  type="hidden" value="0" name="count_hidden" id="count_hidden" />
											<div class="d-flex justify-content-end fv-plugins-message-container invalid-feedback" id="submit_err"></div>
											<div class="d-flex justify-content-end align-items-center mt-2">
											<input type="hidden" name="sale_id" id="sale_id" value="<?php echo $sale_detail->sale_id; ?>" >
												<input type="hidden" name="sale_count" id="sale_count" value="<?php echo $sale_detail->sale_prd_count; ?>" >
												<button type="button" class="btn btn-primary" id="packingsubmitbutton" onclick="add_validation();">Generate Packing</button>
											</div>
											
									  </div>
										<!--end::Card body-->
										</form>
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
		<input type="hidden" data-bs-toggle="modal" data-bs-target="#pop_up_model_err" id="pop_up_alert_err" >
			<div class="modal fade" id="pop_up_model_err" tabindex="-1" aria-hidden="true" >
				<!--begin::Modal dialog-->
				 <div class="modal-dialog modal-dialog-centered modal-sm">
			            <!--begin::Modal content-->
			            <div class="modal-content rounded">
			                <div class="swal2-icon swal2-icon-show" style="display: flex;border: 3px solid red !important;">
			                    <div class="swal2-icon-content" style="color:red">&#x2715;</div></div>
			                    <div class="swal2-html-container" id="swal2-html-container" style="display: block;">
			                        <b><span id="message_err"></span></b>
			                        </div>
			                    <div class="d-flex flex-center flex-row-fluid pt-12">
			                        <button type="submit" class="btn btn-primary me-3" data-bs-dismiss="modal" >OK</button>
			                        
			                    </div><br><br>
			            </div>
			            <!--end::Modal content-->
			        </div>
				<!--end::Modal dialog-->
			</div>
		<!--end::Root-->
	<?php $this->load->view("script");?>
	<script> 
		function add_validation(){

			// alert('yes');
			var erre = 0;
				var count = $("#count_hidden").val();
				if (count == 0) {

					 $('#submit_err').html('Please Check Any One Of The Product!');
				        erre++;
				}else{
					$('#submit_err').html('');
					$('#submit_form').submit();
				}
				if(erre>0){ return false; }else{ 

					
								$("#packing_form").submit();
						  $('#packingsubmitbutton').prop('disabled', true);
						  e.preventDefault();		

					return true; }

		}
	</script>
	<script>
		$(function(){
			$('#select_all_checkbox').click(function(){
				if (this.checked) {
					$(".pack_chk").prop("checked", true);
					$("#count_hidden").val(1);
				} else {
					$(".pack_chk").prop("checked", false);
					$("#count_hidden").val(0);
				}	
			});
			
			$(".pack_chk").click(function(){


				var numberOfCheckboxes = $(".pack_chk").length;
				var numberOfCheckboxesChecked = $('.pack_chk:checked').length;
				// alert(numberOfCheckboxesChecked);
				
				if(numberOfCheckboxes == numberOfCheckboxesChecked) {
					$("#select_all_checkbox").prop("checked", true);
					
				} else {
					$("#select_all_checkbox").prop("checked", false);
				}
				if(numberOfCheckboxesChecked>0) {

					$("#count_hidden").val(1);
				} else {
					$("#count_hidden").val(0);
				}
			});
		});

		</script>
	<script>
	function weight_check(id){
		val   = $('#packed_weight'+id).val();
		val1  = $('#packed_weight_hidden'+id).val();
		if(parseInt(val1)<parseInt(val)){
			$('#packed_weight'+id).val('0');
			$(document).ready(function() {
				document.getElementById("pop_up_alert_err").click()
				$('#message_err').html('Enter Count is Exceed...');
			});
		}
	}
	</script>
	<script>
	      $("#update_sale_packing").kendoTooltip({
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
		$("#update_sale_packing").DataTable({
			// "ordering": false,
			"paging": false,
			"sorting": false,
			// "aaSorting":[],
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
		$('#update_sale_packing').wrap('<div class="dataTables_scroll" />');
    </script>
	<script>
		$("#kt_datepicker_From").flatpickr({
			dateFormat: "d-m-Y",
		});
	</script>
</body>
<!--end::Body-->
</html>