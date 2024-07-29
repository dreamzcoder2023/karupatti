<?php $this->load->view("common");?>
<style>
	.dataTables_scroll
    {
        position: relative;
        overflow: auto;
        max-height: 300px;/*the maximum height you want to achieve*/
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
	<body 
		data-kt-name="metronic" id="kt_body" class="header-fixed header-tablet-and-mobile-fixed toolbar-enabled toolbar-fixed aside-enabled aside-fixed">
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
									<h1 class="d-flex align-items-center text-dark fw-bold my-1 fs-3">Adjust Stock
									<!--begin::Separator-->
									<span class="h-20px border-gray-200 border-start ms-3 mx-2"></span>
									
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
												<label class="col-lg-2 col-form-label fw-semibold fs-6 ">Category</label>
											    	<div class="col-lg-3 fv-row fv-plugins-icon-container mb-10">
														<select class="form-select form-select-solid" name="category_select" id="category_select" data-control="select2" data-hide-search="fasle" onchange="category_selected()">
															<option value="all" selected>All</option>
															<?php foreach($category_list1 as $category_list)
															{?>
															<option value="<?php echo $category_list['AKSCATEGORY_ID'] ;?>" <?php if($category_list1==$category_list['AKSCATEGORY_NAME']){ echo "selected"; } ?>
															><?php echo $category_list['AKSCATEGORY_NAME'];?></option><?php
															 }?>															
								            </select>
													</div>	
											</div>
											<!--begin::Table-->
											<form method="POST" action="<?php echo base_url(); ?>Aksstock/stock_update" id="submit_form">
											<table id="adjust_table" class="table align-middle table-row-dashed table-striped table-hover fs-7 gy-1 gs-2 mb-20 dataTable ">
												<thead>
												  <tr class="text-start text-muted fw-bold fs-7 gs-0">
														<th class="min-w-50px">Sno</th>
														<th class="min-w-50px">Product</th>
														<th class="min-w-50px">Current Qty (gms)</th>
														<th class="min-w-100px">Adjust Stock (gms)</th>
														<th class="min-w-100px">Description</th>
													</tr>    
												</thead>
												<tbody class="text-gray-600 fw-semibold" id="cat_change">

												</tbody>
											</table>
											<input type="hidden" name="count_hidden" id="count_hidden" value="0">
											<label class="fv-plugins-message-container invalid-feedback text-end fs-6" id="submit_err"></label>
											<div class="d-flex justify-content-md-end mt-13">
											
						              <a type="reset" class="btn btn-secondary me-3"  href="<?php echo base_url(); ?>Aksstock">Cancel</a>
		                      <div id="update_btn" class="btn btn-primary">Update Stock</div>
											</div>
										 </form>
										<!--end::Card body-->
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
	<input type="hidden" id="baseurl" value="<?php echo base_url();?>">
		<?php $this->load->view("script");?>
		<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
				<!-- <script src="js/products-list.js"></script> -->
		<script>
			
			function stk_valdidate(id){
				// alert(id)
				var adjust_stk   = parseFloat($('#adjust_stk'+id).val());
				var curr_qty     = parseFloat($('#cur_qty_hidden'+id).val());
				if(curr_qty==''){ curr_qty=0;}
				if(adjust_stk==''){ adjust_stk=0;}

				var balance = curr_qty - adjust_stk;
				// alert(balance)

				if(balance<0){

				    // alert("Please Check The Enter Count is Exceed");
				     Swal.fire({
												title: 'Mismatch Error!',
												text: 'Please Check The Enter Count is Exceed..',
												icon: 'error',
												confirmButtonText: 'Okay'
												});

				    $('#adjust_stk'+id).val('0');
				   
			    }
				else{					

			        var bal_total = balance; 
			         $('#bal_stk'+id).val(bal_total);
				   }
					var tot_qty   = 0;
					var cat_count = document.getElementById("cat_change").rows.length;
					var count     = parseInt(cat_count);
					// alert(count)

					for(var i=1; i<=count; i++){

						var tot_quantity = $('#adjust_stk'+i).val();
						tot_qty += parseFloat(tot_quantity);

					}
					$('#count_hidden').val(tot_qty);


				}
				$(document).ready(function(){
					$("#update_btn").click(function(){
						
						// alert('yss');
						var tot = $('#count_hidden').val();
						// alert(tot)

						if(tot == 0) {

							// alert(0)
							// $('#submit_err').html('Please Adjust Any One Of Product !');

							Swal.fire({
												title: 'Error!',
												text: 'Please Adjust Any One Of The Product !..',
												icon: 'error',
												confirmButtonText: 'Okay'
												});


						}
						else{

							// alert(1);
							 $('#submit_form').submit();
							 $('#submit_err').html('');
						}
					});
				});
		</script>

		<script>		
			category_selected()
			function category_selected(){

				// var category_type = document.getElementById("category_select").value;
				// alret (category_type);
				var val= $("#category_select").val();
				var baseurl= $("#baseurl").val();
				// alert(val);
				$.ajax({
					type: "POST",
					url: baseurl+'Aksstock/category_select',
					async: false,
					type: "POST",
					data: "id="+val,
					dataType: "html",
					success: function(response)
					{
						$("#cat_change").empty().append(response);
					}
					});

			}
		</script>
		<script>
			$("#adjust_table").DataTable({
				//"aaSorting":[],
				"sorting":false,
				"paging": false,
				"responsive": true,
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
			$('#adjust_table').wrap('<div class="dataTables_scroll" />');
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