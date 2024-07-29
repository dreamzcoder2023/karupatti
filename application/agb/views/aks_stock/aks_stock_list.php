<?php $this->load->view("common");?>
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
									<h1 class="d-flex align-items-center text-dark fw-bold my-1 fs-3">Stock List
									<!--begin::Separator-->
									<span class="h-20px border-gray-400 border-start ms-3 mx-2"></span>
									<label class="d-flex align-items-center text-primary fw-bold my-1 fs-5">
										<span>Category &emsp;-</span>
										<span>&emsp;<?php if($category_name==''){ echo "All"; }else{ echo $category_list_get->AKSCATEGORY_NAME; } ?></span>
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
									<div class="col-lg-12">
										<div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
											<!--begin::Filter-->
											<button type="button" class="btn btn-sm btn-outline btn-outline-solid btn-outline-warning btn-active-light-primary me-3" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Filter
											</button>
											<div class="menu menu-sub menu-sub-dropdown w-300px w-md-325px" data-kt-menu="true">
												<div class="px-7 py-5" data-kt-user-table-filter="form">
													<form method="POST" action="<?php echo base_url(); ?>Aksstock/"id="fill_form">
													<div class="mb-2">
														<label class="form-label fs-6 fw-semibold">Category</label>
												            <select class="form-select form-select-solid"data-control="select2" data-hide-search="false" id="category_name" name="category_name">	
											<option value="">All</option>
											<?php  foreach($category_list as $clist)
											{?>
											<option 
											<?php if ($category_name==$clist['AKSCATEGORY_ID']){ echo 'selected';}else{ echo ''; } ?> 
											value="<?php echo $clist['AKSCATEGORY_ID']; ?>" ><?php echo $clist['AKSCATEGORY_NAME'] ?> <?php  }?>

										   </select>
													</div>
													<div class="d-flex justify-content-end">
														<button type="reset" class="btn btn-light btn-active-light-primary fw-semibold me-2 px-6" data-kt-menu-dismiss="true" data-kt-user-table-filter="reset" onclick="reset_fill()">Reset</button>
														<button type="submit" class="btn btn-primary fw-semibold px-6" data-kt-menu-dismiss="true" data-kt-user-table-filter="filter">Apply</button>
													</div>
												</form>
												</div>
											</div>
											<button type="button"class="btn btn-sm btn-outline btn-outline-solid btn-outline-warning btn-active-light-primary me-3" onclick="export_list()">Export</button>
										</div>
									</div>	
									<!--end::Card title-->
									<div class="row mt-4"></div>
								     <!--begin::Table-->
									<table id="stocktable" class="table align-middle table-row-dashed table-striped table-hover fs-7 gy-1 gs-2 dataTable no-footer">
										<thead>
										  <tr class="text-start text-muted fw-bold fs-7 gs-0">
												<th class="min-w-50px">Sno</th>
												<th class="min-w-100px">Category</th>
												<th class="min-w-300px">Product Name</th>
												<th class="min-w-100px">Current Stock (gms)</th>
												<th class="min-w-100px">Stock Status</th>
												<th class="min-w-100px">Action</th>
										  </tr>  
										</thead>
										<tbody class="text-gray-600 fw-semibold">
											<?php if(!empty($category_fill)){  foreach($category_fill as $i=> $plist){?>
											<tr <?php if ($plist['STATUS']=='N'){?>style="pointer-events: none;opacity: 0.5;" <?php } ?>>
												
												<td><?php echo $i+1; ?></td>
												<td class="ple1"><?php echo $plist['AKSCATEGORY_NAME'];?></td>
												<td class="d-flex align-items-center"> 
													<?php $image_url =  base_url().'assets/images/aks_product_image/'. $plist['AKS_PRD_IMG']; 
											           if($image_url && $plist['AKS_PRD_IMG']){
											         	?>
				                                                       <a href="<?php echo base_url() ?>assets/images/aks_product_image/<?php echo 
				                                                       $plist['AKS_PRD_IMG'];  ?>" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm" data-fslightbox="lightbox-basic" >

									            	   	 <div class="image-input" data-kt-image-input="true">
													<div class="image-input-wrapper w-40px h-40px" style="background-image: url(<?php echo base_url() ?>assets/images/aks_product_image/<?php echo $plist['AKS_PRD_IMG']; ?>)">
													</div>
												 </div>
												</a>
                                                        <?php 
                                                      }else{
                                                       ?>
                                                   	<a href="javascript:;" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm"  >
								                      	<div class="image-input" data-kt-image-input="true">
													<div class="image-input-wrapper w-40px h-40px" style="background-image: url(<?php echo base_url() ?>assets/images/karupatti.jpg)"></div>
												</div>
												</a>
			 	
				                                                       <?php }?>		
												 <div class="d-flex flex-column">
														<a href="javascript:;" class="text-gray-800 text-hover-primary mb-1 ms-3"><?php echo $plist['AKS_PRD_NAME']?$plist['AKS_PRD_NAME']:'-';?></a>
												 </div>
											</td>
											
												<td><?php echo $plist['PRD_CUR_QTY'];?></td>
													<td>

													<?php if($plist['PRD_CUR_QTY'] < $plist['AKS_MIN_STK'] ){ ?>

														<label class="col-form-label fw-semibold fs-7"><span style="background-color:#f1416c;border-radius: 5px;padding: 2px 5px 2px 5px;">Low Stock</span>
														</label>
												<?php } else{?>



												<?php if($plist['PRD_CUR_QTY'] > $plist['AKS_MAX_STK'] ){ ?>
												<label class="col-form-label fw-semibold fs-7 me-3"><span style="background-color:#eb5d14;border-radius: 5px;padding: 2px 5px 2px 5px;">Maximum</span>
													</label>
											
												<?php }else{?> 
													<label class="col-form-label fw-semibold fs-7 me-3"><span style="background-color:#7dad52;border-radius: 5px;padding: 2px 5px 2px 5px;">Medium</span>
													</label>

												<?php } }?>
												
												</td>

												<!--begin::Action=-->
												<td <?php if ($plist['STATUS']=='N'){?> style="pointer-events: all;opacity: 1;" <?php } ?>>
												<span class="text-end">
													<a href="<?php echo base_url();?>Aksstock/stock_history/<?php echo $plist['AKS_PRD_MID']; ?>" target="_blank"
														class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm">
														<i class="fas fa-history eyc fs-4" title="Stock History" ></i>
												    </a>
												</span>
												<!--end::Action=-->
											    </td>
											</tr>
											<?php $i++; } }?>
										</tbody>
									</table>
									<?php 
										$coun = ceil( $count/50);
										$c_page = isset($_GET['page']) ? $_GET['page'] : 1;
									?>
									<?php
										function get_paging_info1($tot_rows,$pp,$curr_page)
										{
											$pages = ceil($tot_rows / $pp); // calc pages

											$data = array(); // start out array
											$data['si']        = ($curr_page * $pp) - $pp; // what row to start at
											$data['pages']     = $pages;                   // add the pages
											$data['curr_page'] = $curr_page;               // Whats the current page
											$paging_info['curr_url'] = "http://eibs.elysiumproduct.com/";

											return $data; //return the paging data

										}?>
									<?php $paging_info = get_paging_info1($count,50,$c_page); ?>

												<form   method="POST" id="filter_form" action="" enctype="multipart/form-data" >
													
													

													<input type="hidden" id="category_name" name="category_name"  value="<?php echo $category_name; ?>">

													
												<ul class="pagination " style="float:right;" >
												<!-- If the current page is more than 1, show the First and Previous links -->
												<?php if($paging_info['curr_page'] > 1) : ?>
												
												<li class='paginate_button page-item move_to' value="<?php echo ($paging_info['curr_page'] - 1); ?>" > <a aria-controls='kt_roles_view_table' data-dt-idx='1' tabindex='0' class='page-link cursor-pointer'  title='Page <?php echo ($paging_info['curr_page'] - 1); ?>'><</a></li>
												
												<?php endif; ?>

												<?php
													//setup starting point

													//$max is equal to number of links shown
													$max = 3;
													if($paging_info['curr_page'] < $max)
														$sp = 1;
													elseif($paging_info['curr_page'] >= ($paging_info['pages'] - floor($max / 2)) )
														$sp = $paging_info['pages'] - $max + 1;
													elseif($paging_info['curr_page'] >= $max)
														$sp = $paging_info['curr_page']  - floor($max/2);
												?>

												<!-- If the current page >= $max then show link to 1st page -->
												<?php if($paging_info['curr_page'] >= $max) : ?>

												<li class='paginate_button page-item move_to' value="1" ><a aria-controls='kt_roles_view_table' data-dt-idx='1' tabindex='0' class='page-link cursor-pointer' onclick="form_submit()"  title='Page 1'>1</a></li>
												<!--<li class='paginate_button page-item '><input type="submit" name="first_page" value="Update" />  </li>-->
												..
												<?php endif; ?>
												<!-- Loop though max number of pages shown and show links either side equal to $max / 2 -->
												<?php for($i = $sp; $i <= ($sp + $max -1);$i++) : ?>

													<?php
														if($i > $paging_info['pages'])
															continue;
													?>

													<?php if($paging_info['curr_page'] == $i) : ?>

														<li class='paginate_button page-item active move_to' value="<?php echo $i; ?>"> <a aria-controls='kt_roles_view_table' data-dt-idx='1' tabindex='0' onclick="form_submit()" class='page-link cursor-pointer text-hover-dark'  
														title='Page <?php echo $i; ?>'><?php echo $i; ?></a></li>

													<?php else : ?>

													<li class='paginate_button page-item move_to ' value="<?php echo $i; ?>"> <a aria-controls='kt_roles_view_table' data-dt-idx='1' tabindex='0' onclick="form_submit()" class='page-link cursor-pointer'  title='Page <?php echo $i; ?>'><?php echo $i; ?></a></li>

													<?php endif; ?>

												<?php endfor; ?>
												<!-- If the current page is less than say the last page minus $max pages divided by 2-->
												<?php if($paging_info['curr_page'] < ($paging_info['pages'] - floor($max / 2))) : ?>

													..
													<li class='paginate_button page-item  move_to' value="<?php echo $paging_info['pages']; ?>"><a  aria-controls='kt_roles_view_table' data-dt-idx='1' tabindex='0' onclick="submit()" class='page-link cursor-pointer'   title='Page <?php echo $paging_info['pages']; ?>'><?php echo $paging_info['pages']; ?></a></li>

												<?php endif; ?>

												<!-- Show last two pages if we're not near them -->
												<?php if($paging_info['curr_page'] < $paging_info['pages']) : ?>

													<li class='paginate_button page-item move_to ' value="<?php echo ($paging_info['curr_page'] + 1); ?>">  <a aria-controls='kt_roles_view_table' data-dt-idx='1' tabindex='0' onclick="submit()" class='page-link cursor-pointer'  title='Page <?php echo ($paging_info['curr_page'] + 1); ?>'>></a></li>

												

												<?php endif; ?>
												</ul>
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
		<!-- Flash Data::Start -->
	     	 	<?php if($this->session->flashdata('g_success')){?>
	            	<div class="menu-item px-3">
	                    <a href="#" id="pop_up_success" class="menu-link flex-stack px-3" data-bs-toggle="modal" data-bs-target="#success_modal"></a>
	                </div>
	            		 <?php } ?>
	             <?php if($this->session->flashdata('g_err')){?>
	                    <div class="menu-item px-3">
	           			 <a href="#" id="pop_up_success" class="menu-link flex-stack px-3" data-bs-toggle="modal" data-bs-target="#error_modal"></a>
	         		   </div>
	             <?php } ?>
			     <div class="modal fade" id="success_modal" tabindex="-1" aria-hidden="true">
			            <!--begin::Modal dialog-->
			            <div class="modal-dialog modal-dialog-centered modal-m">
			                <!--begin::Modal content-->
			                <div class="modal-content rounded">
			                    <div class="swal2-icon swal2-success swal2-icon-show" style="display: flex;">
			                        <div class="swal2-icon-content">&#x2713;</div></div>
			                        <div class="swal2-html-container" id="swal2-html-container" style="display: block;">
			                            <b><span> <?php echo $this->session->flashdata('g_success'); ?></span></b>
			                            </div>
			                        <div class="d-flex flex-center flex-row-fluid pt-12">
			                            <button type="submit" class="btn btn-primary me-3" data-bs-dismiss="modal">Ok</button>
			                            
			                        </div><br><br>
			                </div>
			                <!--end::Modal content-->
			            </div>
			            <!--end::Modal dialog-->
			        </div>
			        <div class="modal fade" id="error_modal" tabindex="-1" aria-hidden="true">
			            <!--begin::Modal dialog-->
			            <div class="modal-dialog modal-dialog-centered modal-m">
			                <!--begin::Modal content-->
			                <div class="modal-content rounded">
			                    <div class="swal2-icon swal2-icon-show" style="display: flex;border: 3px solid red !important;">
			                        <div class="swal2-icon-content" style="color:red">&#x2715;</div></div>
			                        <div class="swal2-html-container" id="swal2-html-container" style="display: block;">
			                            <b><span> <?php echo $this->session->flashdata('g_err'); ?></span></b>
			                            </div>
			                        <div class="d-flex flex-center flex-row-fluid pt-12">
			                            <button type="submit" class="btn btn-primary me-3" data-bs-dismiss="modal">Ok</button>
			                            
			                        </div><br><br>
			                </div>
			                <!--end::Modal content-->
			            </div>
			            <!--end::Modal dialog-->
	       			 </div>
		<!-- Flash Data::End -->
	<input type="hidden" id="baseurl" value="<?php echo base_url();?>">
		<?php $this->load->view("script");?>
		<script type="text/javascript">
			
			function export_list() {
			    var value = <?php echo $export_stock; ?>;
			    var values = [];
			    // console.log(value[0]);
			    value.map((data, i) => {

			    	if (data.PRD_CUR_QTY<data.AKS_MIN_STK) {

			    		var sts = 'Low Stock';
			    	}else{
				    	if(data.PRD_CUR_QTY>data.AKS_MAX_STK) {

				    		var sts = 'Maximum Stock';
				    	}else{
				    		var sts = 'Medium Stock';
				    	}
			    	}		

			        values.push({
			            'Sl.No': i + 1,
			            'Category Name': data.AKSCATEGORY_NAME,
			            'Product Name': data.AKS_PRD_NAME,
			            'Current Stock': data.PRD_CUR_QTY,
			            'Stock Status': sts
			        });
			    });

			    var filename = 'AksProductStockList.xlsx';
			    var ws = XLSX.utils.json_to_sheet(values);
			    var wb = XLSX.utils.book_new();

			    XLSX.utils.book_append_sheet(wb, ws, "Sheet1");

			    XLSX.writeFile(wb, filename);
			}
		</script>
		<script>
			function reset_fill(){

				$('#category_name').val('');
				$('#fill_form').submit();
			}

		</script>
		<script>	
		<?php if($this->session->flashdata('g_success') || $this->session->flashdata('g_err')){?> 
		    $(document).ready( function() {
	        document.getElementById("pop_up_success").click()
	        });
	   <?php } ?>
        </script>
		<!-- <script src="js/products-list.js"></script> -->
		<script>

		$(document).ready(function() {
			
			$(".move_to").on("click", function () {
				value=$(this).val();
				// alert(value);
				$('#filter_form').attr('action', "<?php echo base_url(); ?>Aksstock?page="+value);
				$("#filter_form").submit();
				e.preventDefault();
			});
		});
		</script>
		<script> 
			$("#stocktable").kendoTooltip({
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
			$("#stocktable").DataTable({
				    "sorting":false,
				    // "info":true,
				    "responsive": true,
				    "lengthMenu": [[10, 25, 50], [10, 25, 50]],
				    "pageLength": 50,
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
				        ">"
				});
		</script>
	</body>
	<!--end::Body-->
</html>