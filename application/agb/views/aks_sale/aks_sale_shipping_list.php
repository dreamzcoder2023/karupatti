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
									<h1 class="d-flex align-items-center text-dark fw-bold my-1 fs-3">Sale Packing List
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
											<div class="row">

												<label class="col-lg-1 col-form-label fw-semibold fs-6">Scan Here</label>

												<div class="col-lg-3 fv-row fv-plugins-icon-container">
													<div class="input-group flex-nowrap">
														<input type="text" id="scan_item" name="scan_item" class="form-control form-control-lg form-control-solid" placeholder="Scan Here"  aria-describedby="click_to_scan" autocomplete="off">
														<span class="input-group-text cursor-pointer fs-6 btn btn-sm btn-primary" id="click_to_scan" onclick="courier_delivery()"style="margin-top: 8px !important;padding: 5px 10px 2px 10px !important;"  >Ok</span>
													</div>
													<div class="fv-plugins-message-container invalid-feedback" id="scan_no_err"></div>
												</div>
												<div class="col-lg-2">
												</div>
												<div class="col-lg-3">
													<div class="text-center">
														<label class="form-label fs-3 fw-bold">To be Scanned</label>
													</div>
													<div class="text-center">
														<i class="fas fa-box me-1 fs-4"></i>
														<label class="text-success fs-3 fw-bold" id="to_be_scanned"><?php echo $count; ?></label>
													</div>
												</div>
												<div class="col-lg-3">
													<div class="text-center">
														<label class="form-label fs-3 fw-bold">Scanned</label>
													</div>
													<div class="text-center">
														<label class="text-success fs-3 fw-bold" id="scanned_items">0</label>
													</div>
												</div>
											</div>
											<div class="row mt-4">
												<div class="col-lg-6">
													<div class="row">
														<div class="px-4" style="border:1.9px solid black;border-radius: 10px;">
															<div class="text-center">
																<label class="col-form-label fw-bold fs-3">Item to be Scan</label>
															</div>
															<table id="aks_sales_packing_list" class="table align-middle table-row-dashed table-striped table-hover fs-7 gy-1 gs-2">
																<thead>
																  <tr class="text-start text-muted fw-bold fs-7 gs-0">
																	<th class="min-w-125px">Date</th>
																	<th class="min-w-50px">No.of.Item</th>

																	<?php $user_get = $_SESSION['USERID']?$_SESSION['USERID']:''; 
																		$staff_details=$this->db->query("SELECT * FROM STAFFS WHERE USER_ID='".$user_get."' ")->row(); 
																		if (isset($staff_details->Role)) {
																	?>
																	<?php if ($staff_details->Role<=3){?>	
																		<th class="min-w-100px">Bill Id</th>
																		<th class="min-w-80px">Total Price</th>
																		<th class="min-w-50px">Action</th>
																	<?php } } ?>

																  </tr>
																</thead>
																<tbody class="text-gray-600 fw-semibold" id="to_be_scan_table">
																<?php $i=0; foreach($sale_list as $slist){ ?>
																<tr id="tr<?php echo str_replace('/','_',$slist['sale_id']); ?>">
																	
																		<td class="ple1"><?php $date_format  = $this->db->query("SELECT * FROM general_settings ")->row();
																		 $format= $date_format->date_format;
																		 echo date("$format", strtotime($slist['sale_date']));?>
																		</td>
																		
																		<td class="ple1"><?php echo $slist['sale_prd_count']; ?></td>
																		<?php if (isset($staff_details->Role)) {
																		if ($staff_details->Role<=3){?>	
																		<td class="ple1"><?php echo $slist['sale_id']; ?></td>
																		<td class="ple1"><i class="fa-solid fa-indian-rupee-sign fs-7 text-dark"></i>&nbsp;<?php $sale_amt = $slist['sale_net_amt']; echo number_format($sale_amt,2,'.',',');?></td>
																		<td>
																		<input type="hidden" id="id<?php echo str_replace('/','_',$slist['sale_id']); ?>" value="<?php echo $slist['sid']; ?>" >
																			<span class="text-end">
																				<a href="#" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm" data-bs-toggle="modal" data-bs-target="#sales_scanned" onclick="view_sale('<?php echo $slist['sid']; ?>')">
																				<i class="bi bi-eye-fill eyc"></i>
																				</a>
																			</span>
																	    </td>
														    	<?php }  }?>
																	</tr>
																	<?php $i++; } ?>
																	
																</tbody>
															</table>
														</div>
													</div>
												</div>
												<div class="col-lg-6">
													<div class="row">
														<div class="px-4" style="border:1.9px solid black;border-radius: 10px;">
															<div class="text-center">
																<label class="col-form-label fw-bold fs-3">Scanned</label>
															</div>
															<table id="aks_sales_packing_list_scanned" class="table align-middle table-row-dashed table-striped table-hover fs-7 gy-1 gs-2">
																<thead>
																  <tr class="text-start text-muted fw-bold fs-7 gs-0">
																  	<!--<th class="min-w-50px">Sno</th>-->
																	<th class="min-w-100px">Date</th>
																	<th class="min-w-50px">No.of.Item</th>
																	<?php 
																	if (isset($staff_details->Role)) {
																	 if ($staff_details->Role<=3){?>	
																		<th class="min-w-80px">Bill Id</th>
																		<th class="min-w-80px">Total Price</th>
																		<th class="min-w-80px">Action</th>
																  <?php } }?>

																  </tr>
																</thead>
																<tbody class="text-gray-600 fw-semibold" id="table_dest">
																
																</tbody>
															</table>
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
	<!--begin::Modal - Sales to be scanned-->
	<!--end::Modal - Sales to be scanned-->

	<!--begin::Modal - Sales to be scanned-->
	<div class="modal fade" id="sales_scanned" tabindex="-1" aria-hidden="true">
		<!--begin::Modal dialog-->
		<div class="modal-dialog modal-lg	">
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
				<div class="modal-body pt-0 pb-15 px-5 px-xl-20">
					<!--begin::Heading-->
					<div class="mb-10 text-center">
						<h1>View Sales Packing Details</h1>	
					</div>
					<!--end::Heading-->
				    <div class="row">
						<label class="col-lg-1 col-form-label fw-semibold fs-6">Date</label>
						<label class="col-lg-3 col-form-label fw-bold fs-5" id="sale_date"></label>
					  	<label class="col-lg-1 col-form-label fw-semibold fs-6">Bill Id</label>
					  	<label class="col-lg-3 col-form-label fw-bold fs-5" id="sale_id"></label>
						<label class="col-lg-1 col-form-label fw-semibold fs-6">Party</label>
						<label class="col-lg-3 col-form-label fw-bold fs-5" id="sale_party"></label>
						<label class="col-lg-1 col-form-label fw-semibold fs-6">Tot.Qty</label>
						<label class="col-lg-3 col-form-label text-center fw-bold fs-5" id="total_item">0</label>
						<label class="col-lg-1 col-form-label fw-semibold fs-6">Tot.Amt</label>
						<label class="col-lg-3 col-form-label fw-bold fs-5 text-center" id="tot_amount">0</label>
						<label class="col-lg-1 col-form-label fw-semibold fs-6">Discount</label>
						<label class="col-lg-3 col-form-label text-center fw-bold fs-5" id="discount">0</label>
						<label class="col-lg-1 col-form-label fw-semibold fs-6">Del.Chg</label>
						<label class="col-lg-3 col-form-label text-center fw-bold fs-5" id="del_chg">0</label>
						<label class="col-lg-1 col-form-label fw-semibold fs-6">Net.Amt</label>
						<label class="col-lg-3 col-form-label text-center fw-bold fs-5" id="net_amount">0</label>
					</div>
				    <div class="row">
				   		<label class="col-lg-2 col-form-label fw-semibold fs-6">Delivered By</label>
				   		<label class="col-lg-10 col-form-label fw-bold fs-5" id="delivered_by"></label>
				    </div>
				    <div class="row">
					   	<table id="view_table_scroll" class="table align-middle table-row-dashed table-striped table-hover fs-7 gy-1 gs-2" >
							<thead>
								<tr class="text-start text-muted fw-bold fs-7 gs-0">
									<th class="min-w-25px">Sno</th>
							  	    <th class="min-w-50px">Product</th>
									<th class="min-w-25px">Wgt(g)</th>
									<th class="min-w-50px">price per g</th>
									<th class="min-w-50px">Total Price</th>
								</tr>
							</thead>
							<tbody class="text-gray-600 fw-semibold" id="sale_view_table">
							</tbody>	
						</table>
				    </div>
					<div id="shipment_div">

					</div>
					<div class="d-flex align-items-center justify-content-center mt-2">
						<label class="col-lg-3 col-form-label fw-bold fs-3">Total Amount</label>
						<label class="col-lg-2 col-form-label fw-bold fs-3" id="total_amount">0</label>
				    </div>
				</div>
				<!--end::Modal body-->
			</div>
			<!--end::Modal content-->
		</div>
		<!--end::Modal dialog-->
	</div>
	<!--end::Modal - Sales to be scanned-->
	<input type="hidden" data-bs-toggle="modal" data-bs-target="#pop_up_model_err" id="pop_up_alert_err" >
			<div class="modal fade" id="pop_up_model_err" tabindex="-1" aria-hidden="true" >
				<!--begin::Modal dialog-->
				 <div class="modal-dialog modal-dialog-centered modal-m">
			            <!--begin::Modal content-->
			            <div class="modal-content rounded">
			                <div class="swal2-icon swal2-icon-show" style="display: flex;border: 3px solid red !important;">
			                    <div class="swal2-icon-content" style="color:red">&#x2715;</div></div>
			                    <div class="swal2-html-container" id="swal2-html-container" style="display: block;">
			                        <b><span id="message_err"></span></b>
			                        </div>
			                    <div class="d-flex flex-center flex-row-fluid pt-12">
			                        <button type="submit" class="btn btn-primary me-3" data-bs-dismiss="modal">OK</button>
			                        
			                    </div><br><br>
			            </div>
			            <!--end::Modal content-->
			        </div>
				<!--end::Modal dialog-->
			</div>

	<!-- script :: beign -->
	<?php $this->load->view("script");?>
		<!-- <script src="js/products-list.js"></script> -->
		<script>
			$(document).ready(function(){
			$("#scan_item").on("keypress", function(event) {
		  		if(event.which==13)
		        $("#click_to_scan").trigger('click'); 
	      		});
	       });
        </script>
		<script>
		    function courier_delivery(){

		    	var check = $("#scan_item").val();
		    	if (check!='') {
					var charges 	= $("#charges_enter").val();
					var tracking_id = $("#tracking_id_enter").val();
					var id          = $("#scan_item").val();
					var count1      = $("#to_be_scanned").text();
					var count2      = $("#scanned_items").text();
					var val         = id.replaceAll('/', '_');
					var baseurl     = $("#baseurl").val();
					$.ajax({
							type: "POST",
							url: baseurl+'Akssale/shipping_status',
							async: false,
							type: "POST",
							data: "id="+val,
							dataType: "html",
							success: function(response)
							{
								// alert(response);
								var res=response.split('||');
									// alert(res[1]);	
								if (res[1]=='false') { 

									$(document).ready( function() {
				        document.getElementById("pop_up_alert_err").click()
				        	$('#message_err').html('Bill ID is invalid');
				        });

									 // $("#scan_no_err").html('Bill ID is invalid');
								}
								if (res[2]=='S') { 

									$(document).ready( function() {
				        document.getElementById("pop_up_alert_err").click()
				        	$('#message_err').html('Bill ID is Already Exit');
				        });
								}
              }});	
							// alert(count2)
							if(count2==0){
							  $("#table_dest").empty();
							}	
							var tr = $('#tr'+val).closest("tr").remove().clone();

							$("#table_dest").append(tr);	
								
						    $("#scan_item").val('');

						    var scanned = document.getElementById("table_dest").rows.length;
						    $("#scanned_items").html(parseInt(scanned));

						     var to_be_scan = document.getElementById("to_be_scan_table").rows.length;
						    $("#to_be_scanned").html(parseInt(to_be_scan));
						    
			    }
			    else{
			    	var scan = $('#scan_item').val();
			    	if (scan.trim()=='') {

			    		$("#scan_no_err").html('Enter Bill ID is Required !');
			    	}else{
			    		$("#scan_no_err").html('Bill ID is invalid');
			    	}
			    	
			    }

			}
		</script> 
		<script>
			function total_calc(){
				// alert(1);
				var charge= $("#charges_enter").val();
				var amount= $("#net_amount_scan").text();
				var total=parseFloat(charge)+parseFloat(amount);
				$('#total_amount_scan').html(total);
			}
		</script>

		<script>
			function view_sale(val)
			{

				var baseurl= $("#baseurl").val();
				// alert(baseurl);
				// alert(val);
				$.ajax({
				type: "GET",
				url: baseurl+'Akssale/sales_view',
				async: false,
				type: "GET",
				data: "id="+val,
				dataType: "json",
				success: function(response)
				{

					// $('#sales_scanned').empty().append(response);
					$('#sales_scanned').addClass('show');
					// alert(response)
					$('#sale_date').html(response.sale_date);
					$('#sale_id').html(response.sale_id);
					$('#sale_party').html(response.sale_party);
					$('#total_item').html(response.sale_prd_count);
					$('#tot_amount').html(response.sale_prd_tot_amt);
					$('#del_chg').html(parseFloat(response.sale_net_amt)+parseFloat(response.sale_dis_amt)-parseFloat(response.sale_prd_tot_amt));
					$('#net_amount').html(response.sale_net_amt);
					$('#del_mode').html(response.sale_deliverymode);
					
					$('#discount').html(response.sale_dis_amt);
					$('#net_amount1').html(response.sale_net_amt);
					$('#cash_amount').html(response.sale_cash);
					$('#paid_amount').html(response.sale_cash);
					$('#balance_amount').html(response.balance_cash);
					if(response.sale_deliverymode=='Direct'){
						$('#delivered_by').html('Direct');
					}
					else{
						$('#delivered_by').html(response.delivery_by);

					}
					if(response.shipment_charges==null){
						shipment_charges=0;
					}
					else{
						shipment_charges=response.shipment_charges;
					}

					$('#total_amount').html(parseFloat(response.sale_net_amt));		
					if( response.sale_track_id!=null){

						var div='<div class="row"><label class="col-lg-2 col-form-label fw-semibold fs-6">Tracking ID</label><label class="col-lg-3 col-form-label fw-bold fs-5">'+response.sale_track_id+'</label><label class="col-lg-2 col-form-label fw-semibold fs-6">Charges</label><label class="col-lg-3 col-form-label fw-bold fs-5">'+response.shipment_charges+'</label></div>'
					}
					else{
							var div='';
					}

						$('#shipment_div').empty().append(div);
				}
			});

				var baseurl= $("#baseurl").val();
				$.ajax({
					type: "POST",
					url: baseurl+'Akssale/sale_view_table',
					async: false,
					data: "id="+val,
					dataType: "html",
					success: function(response)
					{
						if (response) {
						  $("#sale_view_table").empty().append(response);
						}
					  
				  }
	    	});
			 
				var baseurl= $("#baseurl").val();
				// alert(baseurl);
				$.ajax({
				type: "POST",
				url: baseurl+'Akssale/payment_details',
				async: false,
				data: "id="+val,
				dataType: "html",
				success: function(response)
				{
					if (response) {
					var res=response.split('||');

			    
						$('#sale_table_payment').empty();
						$('#sale_table_payment').append(res[1]);
						$('#sale_table_payment').append(res[2]);
						$('#sale_table_payment').append(res[3]);
						$('#sale_table_payment').append(res[4]);

				    }
				}
			    });
			}
		</script>
		<script>
			$("#aks_sales_packing_list").DataTable({
				"aaSorting":[],
				// "sorting":false,
				// "paging": false,
				// "responsive": true,
				"iDisplayLength": "5000",
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
		 		$('#aks_sales_packing_list').wrap('<div class="dataTables_scroll" />');
		 	</script>
		 	<script>
		      $("#aks_sales_packing_list").kendoTooltip({
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
				$("#aks_sales_packing_list_scanned").DataTable({
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
		 		$('#aks_sales_packing_list_scanned').wrap('<div class="dataTables_scroll" />');
		 	</script>
		 	<script>
		      $("#aks_sales_packing_list_scanned").kendoTooltip({
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
	</body>
	<!--end::Body-->
</html>