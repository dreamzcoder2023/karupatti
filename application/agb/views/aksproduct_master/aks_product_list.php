<?php $this->load->view("common");?>
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
									<h1 class="d-flex align-items-center text-dark fw-bold my-1 fs-3">Product List
										<!--begin::Separator-->
										
										<span class="h-20px border-gray-400 border-start ms-3 mx-2"></span>
										<label class="d-flex align-items-center text-primary fw-bold my-1 fs-5">
											<span>Category &emsp;-</span>
											<span>&emsp; <?php if($category_name==''){ echo "All"; }else{ echo $category_list_get->AKSCATEGORY_NAME; } ?>

										</span>
										</label>
										
										<!--end::Description-->
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
									<?php if(isset($_SESSION['Karupatti MasterView'])){ if($_SESSION['Karupatti MasterView']==1){?>
									<!--begin::Tables Widget 9-->
	                <div class="card card-xxl-stretch mb-5 mb-xl-8">
										<!--begin::Card body-->
										<div class="card-body py-4">
											<div class="d-flex justify-content-end py-6 px-9">
											  
											 <div class="col-lg-8">
												<div class="row">
													<div class="col-lg-4">
														<div class="text-center">
															<label class="form-label fs-3 fw-bold">Category</label>
														</div>
														<div class="text-center">
															<label class="text-success fs-2 fw-bold">
																<?php echo str_pad($category_count->count?$category_count->count:0, 2, '0', STR_PAD_LEFT); ?>
																
															</label>
														</div>
													</div>
													<div class="col-lg-4">
														<div class="text-center">
															<label class="form-label fs-3 fw-bold">Product</label>
														</div>
														<div class="text-center">
															<label class="text-success fs-2 fw-bold"> 
																<?php $prd_counts=count($category_fill); echo str_pad($prd_counts?$prd_counts:0, 2, '0', STR_PAD_LEFT); ?></label>
														</div>
													</div>
												</div>
											</div>	

											<div class="col-lg-4">

												<div class="d-flex justify-content-end"
													data-kt-user-table-toolbar="base">
													<!--begin::Filter-->
													<button type="button"
														class="btn btn-sm btn-outline btn-outline-solid btn-outline-warning btn-active-light-primary me-3" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Filter
													</button>
													<div class="menu menu-sub menu-sub-dropdown w-300px w-md-325px" data-kt-menu="true">
														<div class="px-7 py-5" data-kt-user-table-filter="form">
															<form method="POST" action="<?php echo base_url(); ?>Aksproductmaster" id="fill_form">
																<div class="scroll-y mh-300px my-1 px-1">	
																	<div class="mb-2">
																		<label class="form-label fs-6 fw-semibold">Category</label>														
																		<select class="form-select form-select-solid" data-control="select2"  id="category_name" name="category_name">	
																			<option value="">All</option>
																			<?php foreach($category_list as $clist)
																			{?>
																			<option <?php if ($category_name==$clist['AKSCATEGORY_ID']){ echo 'selected';}else{ echo ''; } ?> value="<?php echo $clist['AKSCATEGORY_ID']; ?>" >

																				<?php echo $clist['AKSCATEGORY_NAME']; ?></option>

																			<?php  }?>																		 
															       </select>
															      </div>
															    </div>														      
														        <div class="d-flex justify-content-end">
																		<button type="reset" class="btn btn-light btn-active-light-primary fw-semibold me-2 px-6" data-kt-menu-dismiss="true" data-kt-user-table-filter="reset" onclick="reset_fill()">Reset</button>
																		<button type="submit" class="btn btn-primary fw-semibold px-6" data-kt-menu-dismiss="true" data-kt-user-table-filter="filter">Apply</button>
															   </div>
														    </form>
														</div>
													</div>
													<button type="button"class="btn btn-sm btn-outline btn-outline-solid btn-outline-warning btn-active-light-primary me-3"data-bs-toggle="modal" data-bs-target="#" onclick="export_list()">Export
													</button>
													<?php if(isset($_SESSION['Karupatti MasterAdd'])){ 
														if($_SESSION['Karupatti MasterAdd']==1){?>
														  <a href="<?php echo base_url();?>Aksproductmaster/aksaddproduct" target="_blank"> 
																<button type="button" class="btn btn-primary">New Product</button>
													    </a>
												   <?php }} ?>
												</div>
											</div>	
										</div>
										<div class="row">
											<!--begin::Table-->
											<div class="d-flex justify-content-end">												
														<label class=" col-form-label fw-semibold fs-6 me-2">
														<span class="btn btn-icon btn-circle fs-8 fw-bold text-white " style="background:red;width: 20px !important;height: 20px !important;">P</span> Purchase</label>
														<label class=" col-form-label fw-semibold fs-6 ">
														<span class="btn btn-icon btn-circle fs-8 fw-bold text-white " style="background:#ec9629;width: 20px !important;height: 20px !important;">S</span> Sale
														</label>
											</div>
											<table id="product_table" class="table align-middle table-row-dashed table-striped table-hover fs-7 gy-1 gs-2 dataTable no-footer" >
												<thead>
												  <tr class="text-start text-muted fw-bold fs-7 gs-0">
														<th class="min-w-50px">Sno</th>
														<th class="min-w-100px">Category</th>
														<th class="min-w-150px">Product</th>
														<th class="min-w-75px">HSN Code</th>
														<th class="min-w-50px">Unit</th>
														<th class="min-w-50px">Sale Price</th>
														<th class="min-w-100px">Purchase Price</th>
														<th class="min-w-50px" title="Minimum Stock Alert">Min&nbsp;Stk(gms)</th>
														<th class="min-w-50px" title="Maximum Stock Alert">Max&nbsp;Stk(gms)</th>
														<th class="min-w-100px">Description</th>
														<th class="min-w-50px">Action</th>
													</tr>
												   </tr>    
												</thead>

												<tbody class="text-gray-600 fw-semibold">
													<?php if (!empty($category_fill)) { foreach($category_fill as $i=> $plist){?>  
													<tr>
														<td><?php echo $i+1; ?></td>
														
															<td>
																<?php echo $plist['AKSCATEGORY_NAME'];?> 
																<?php if ($plist['PRODUCT_TYPE']=='W') { ?>
																<span class="badge badge-info fw-bold fs-9">Website</span>
															  <?php } ?>
																<br>
																<?php if ($plist['IS_PURCHASE'] == '1' && $plist['IS_SALE'] == '1') { ?>														   
															        <span class="btn btn-icon btn-circle fs-8 fw-bold text-white" style="background:red;width: 20px !important;height: 20px !important;">P</span> 
															        <span class="btn btn-icon btn-circle fs-8 fw-bold text-white" style="background:#ec9629;width: 20px !important;height: 20px !important;">S</span> 															   
																<?php } else if ($plist['IS_PURCHASE'] == '1') {
															    echo '<label><span class="btn btn-icon btn-circle fs-8 fw-bold text-white" style="background:red;width: 20px !important;height: 20px !important;">P</span></label>';
																} else if ($plist['IS_SALE'] == '1') {
																    echo '<label><span class="btn btn-icon btn-circle fs-8 fw-bold text-white" style="background:#ec9629;width: 20px !important;height: 20px !important;">S</span></label>';
																} ?>



															 <input type="hidden" name="prd_edit_id_hidden" id="prd_edit_id_hidden" value="<?php echo $plist['AKS_PRD_MID'];?>">
														</td>
														<td class="ple1"> 
															<div  class="d-flex align-items-center">
																<?php $image_url =  base_url().'assets/images/aks_product_image/'.$plist['AKS_PRD_IMG'];
																 if($image_url && $plist['AKS_PRD_IMG']!=''){?> 

																	<a class="d-block overlay"  href="<?php echo base_url(); ?>assets/images/aks_product_image/<?php echo $plist['AKS_PRD_IMG']; ?>" data-fslightbox="lightbox-basic">
																	    <!--begin::Image-->
																	    <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded w-35px h-35px"
																	    style="background-image:url('<?php echo base_url(); ?>assets/images/aks_product_image/<?php echo $plist['AKS_PRD_IMG']; ?>')">
																	    </div>
																	    <!--end::Image-->
																	    <!--begin::Action-->
																	    <div class="overlay-layer card-rounded bg-dark bg-opacity-25 shadow w-35px h-35px">
																	        <i class="bi bi-eye-fill text-white fs-2"></i>
																	    </div>
																	    <!--end::Action-->
															  	</a>
	                              <?php }else{?>
	                                <a href="javascript:;" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm"  >
						                      	<div class="image-input" data-kt-image-input="true">
																			<div class="image-input-wrapper w-40px h-40px" style="background-image: url(<?php echo base_url() ?>assets/images/karupatti.jpg)"></div>
																		</div>
																  </a> 
																<?php }?>		

																 <div class="d-flex flex-column">
																		<a href="javascript:;" class="text-gray-800 text-hover-primary mb-1 ms-3 "><?php echo $plist['AKS_PRD_NAME'];?></a>
																 </div>

															 </div>
														</td>
														<td><?php echo $plist['HSN_CODE'] ?$plist['HSN_CODE']:'-';?></td>
														<td><?php echo $plist['AKS_PRD_WT'] ? $plist['AKS_PRD_WT'] : 0;?> g</td>
														<td align="end"><i class="fa-solid fa-indian-rupee-sign fs-7 text-dark"></i>&nbsp;<?php $sale_amt = $plist['AKS_PRD_PRICE']; echo number_format($sale_amt,2,'.',',');?></td>
														<td align="end"><i class="fa-solid fa-indian-rupee-sign fs-7 text-dark"></i>&nbsp;<?php $pur_amt = $plist['AKS_PUR_PRICE']; echo number_format($pur_amt,2,'.',',');?></td>
														<td> <span title="Minimum Stock Alert"><?php echo $plist['AKS_MIN_STK'] ? $plist['AKS_MIN_STK'].' g' :'0 g';?></span></td>
														<td> <span title="Maximum Stock Alert"><?php echo $plist['AKS_MAX_STK'] ? $plist['AKS_MAX_STK'].' g':'0 g';?></span></td>
														<td class="ple1"><?php echo $plist['AKS_PRD_DETAIL']?$plist['AKS_PRD_DETAIL']:'-';?></td>
														<!--begin::Action=-->
														<td>
																<span class="text-end">
																	<?php if(isset($_SESSION['Karupatti MasterEdit'])){ if($_SESSION['Karupatti MasterEdit']==1){?>
																	<a href="<?php echo base_url();?>Aksproductmaster/edit_prd/<?php echo $plist['AKS_PRD_MID'];?>"  target="_blank"
																	class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1" title="Edit Product">
																		<i class="fa-solid fa-file-pen eyc fs-4" ></i>	
															    </a>
															    <?php }} ?>
															    <?php if(isset($_SESSION['Karupatti MasterDelete'])){ if($_SESSION['Karupatti MasterDelete']==1){?>
																    <a href="javascript:;" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm" data-bs-toggle="modal" data-bs-target="#kt_modal_delete_aks_products" 
																    onclick="prd_delete('<?php echo $plist['AKS_PRD_MID'];?>')">
																		<!--begin::Svg Icon | path: icons/duotune/general/gen027.svg-->
																		<span class="svg-icon svg-icon-2">
																			<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																				<path d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z" fill="currentColor"></path>
																				<path opacity="0.5" d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z" fill="currentColor"></path>
																				<path opacity="0.5" d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z" fill="currentColor"></path>
																			</svg>
																		</span>
																		<!--end::Svg Icon-->
																	</a>
																  <?php }} ?>
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
								<?php }}else{?><?php $this->load->view("common_role_permission_err"); ?><?php } ?>
								<!--end::Col-->
							</div>
							<!--end::Row-->
						</div>
						<!--end::Container-->
					</div>
					<!--end::Content-->
				</div>
				<?php $this->load->view("footer");?>
				<!--end::Wrapper-->
			</div>
			<!--end::Page-->
		</div>
	<!-- Flash Data::Start -->
	     	<?php if($this->session->flashdata('g_success')){?>
            	<div class="menu-item px-3">
                    <a href="javascript:;" id="pop_up_success" class="menu-link flex-stack px-3" data-bs-toggle="modal" data-bs-target="#success_modal"></a>
                </div>
            		 <?php } ?>
             <?php if($this->session->flashdata('g_err')){?>
                    <div class="menu-item px-3">
           			 <a href="javascript:;" id="pop_up_success" class="menu-link flex-stack px-3" data-bs-toggle="modal" data-bs-target="#error_modal"></a>
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
	<!--begin::Modal - delete Products-->
	<div class="modal fade" id="kt_modal_delete_aks_products" tabindex="-1" aria-hidden="true">

		<div class="modal-dialog modal-m">
				<!--begin::Modal content-->
				<?php if ($prd_details->PRD_CUR_QTY==0){ ?>
					<div class="modal-content rounded">
						<div class="swal2-icon swal2-warning swal2-icon-show" style="display: flex;">
						<div class="swal2-icon-content">!</div>
						</div>
						<div class="swal2-html-container" id="swal2-html-container" style="display: block;">Are you sure you want to delete <?php echo $prd_details->AKS_PRD_NAME;?>?</div>
						<div class="d-flex flex-center flex-row-fluid pt-12">
							<button type="reset" class="btn btn-secondary me-3" data-bs-dismiss="modal" >No</button>
							<button type="submit" class="btn btn-primary " data-bs-dismiss="modal" onclick="removeprd('<?php echo $prd_details->AKS_PRD_MID;?>')">Yes</button>
						</div><br><br>
					</div>
				<?php }else{ ?>
					<!--begin::Modal dialog-->
						<div class="modal-dialog modal-dialog-centered modal-m">
				            <!--begin::Modal content-->
				            <div class="modal-content rounded">
				                <div class="swal2-icon swal2-icon-show" style="display: flex;border: 3px solid red !important;">
				                    <div class="swal2-icon-content" style="color:red">&#x2715;</div></div>
				                    <div class="swal2-html-container" id="swal2-html-container" style="display: block;">
				                        <b><span><?php echo $prd_details->AKS_PRD_NAME;?></span><br><span> Is Already Occured In Stock So Could'nt Delete.</span></b>
				                        </div>
				                    <div class="d-flex flex-center flex-row-fluid pt-12">
				                        <button type="submit" class="btn btn-primary me-3" data-bs-dismiss="modal">OK</button>
				                        
				                    </div><br><br>
				            </div>
				            <!--end::Modal content-->
				        </div>
					<!--end::Modal dialog-->
				<?php } ?>
			</div>

	</div>
	<!--end::Modal - delete Products-->
		<?php $this->load->view("script");?>
		<!-- <script src="js/products-list.js"></script> -->
		<script type="text/javascript">
			
			function export_list() {
			    var value = <?php echo $export_products; ?>;
			    var values = [];
			    // console.log(value[0]);
			    value.map((data, i) => {
			      
			        values.push({
			            'Sl.No': i + 1,
			            'Category Name': data.AKSCATEGORY_NAME,
			            'Product Name': data.AKS_PRD_NAME,
			            'HSN Code': data.HSN_CODE,
			            'Unit (gms)': data.AKS_PRD_WT+' g',
			            'Sale Price': data.AKS_PRD_PRICE,
			            'Purchase Price': data.AKS_PUR_PRICE,
			            'Minmum Stock (gms)': data.AKS_MIN_STK+' g',
			            'Maximum Stock (gms)': data.AKS_MAX_STK+' g',
			            'Description': data.AKS_PRD_DETAIL
			        });
			    });

			    var filename = 'AksProductList.xlsx';
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
		<script>

		$(document).ready(function() {
			
			$(".move_to").on("click", function () {
				value=$(this).val();
				// alert(value);
				$('#filter_form').attr('action', "<?php echo base_url(); ?>Aksproductmaster?page="+value);
				$("#filter_form").submit();
				e.preventDefault();
			});
		});
		</script>
		
		<script>
	     
	      $("#product_table").kendoTooltip({
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
				$("#product_table").DataTable({
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
        <script>
			function date_fill_nontag_list()
			{
				var dt_fill_nontag_list = document.getElementById('dt_fill_nontag_list').value;
				var today_dt_nontag_list = document.getElementById('today_dt_nontag_list');
				var week_from_dt_nontag_list = document.getElementById('week_from_dt_nontag_list');
				var week_to_dt_nontag_list = document.getElementById('week_to_dt_nontag_list');
				var monthly_dt_nontag_list = document.getElementById('monthly_dt_nontag_list');
				var from_dt_nontag_list = document.getElementById('from_dt_nontag_list');
				var to_dt_nontag_list = document.getElementById('to_dt_nontag_list');
				var from_date_fillter_nontag_list = document.getElementById('from_date_fillter_nontag_list');
				var to_date_fillter_nontag_list = document.getElementById('to_date_fillter_nontag_list');

				if (dt_fill_nontag_list == "today") 
				{
					today_dt_nontag_list.style.display = "block";
					monthly_dt_nontag_list.style.display = "none";
					from_dt_nontag_list.style.display = "none";
					to_dt_nontag_list.style.display = "none";
					week_from_dt_nontag_list.style.display = "none";
					week_to_dt_nontag_list.style.display = "none";
					$("#today_date_fillter_nontag_list").flatpickr({
								dateFormat: "d-m-Y",
							});
				}
				else if (dt_fill_nontag_list == "week")
				{
					today_dt_nontag_list.style.display = "none";
					week_from_dt_nontag_list.style.display = "block";
					week_to_dt_nontag_list.style.display = "block";
					monthly_dt_nontag_list.style.display = "none";
					from_dt_nontag_list.style.display = "none";
					to_dt_nontag_list.style.display = "none";

					var curr = new Date; // get current date
					var first = curr.getDate() - curr.getDay(); // First day is the day of the month - the day of the week
					var last = first + 6; // last day is the first day + 6

					var firstday = new Date(curr.setDate(first)).toISOString().slice(0,10);
					firstday = firstday.split("-").reverse().join("-");
					var lastday = new Date(curr.setDate(last)).toISOString().slice(0,10);
					lastday = lastday.split("-").reverse().join("-");
					$('#week_from_date_fillter_nontag_list').val(firstday);
					$('#week_to_date_fillter_nontag_list').val(lastday);
					
				}
				else if (dt_fill_nontag_list == "monthly")
				{
					today_dt_nontag_list.style.display = "none";
					monthly_dt_nontag_list.style.display = "block";
					from_dt_nontag_list.style.display = "none";
					to_dt_nontag_list.style.display = "none";
					week_from_dt_nontag_list.style.display = "none";
					week_to_dt_nontag_list.style.display = "none";
					$("#monthly_date_fillter_nontag_list").flatpickr({
								dateFormat: "m-Y",
							});
				}
				else if (dt_fill_nontag_list == "custom Date")
				{
					today_dt_nontag_list.style.display = "none";
					monthly_dt_nontag_list.style.display = "none";
					from_dt_nontag_list.style.display = "block";
					to_dt_nontag_list.style.display = "block";
					week_from_dt_nontag_list.style.display = "none";
					week_to_dt_nontag_list.style.display = "none";

					$("#from_date_fillter_nontag_list").flatpickr({
								dateFormat: "d-m-Y",
							});
					$("#to_date_fillter_nontag_list").flatpickr({
								dateFormat: "d-m-Y",
							});
				}
				else
				{
					today_dt_nontag_list.style.display = "none";
					monthly_dt_nontag_list.style.display = "none";
					from_dt_nontag_list.style.display = "none";
					to_dt_nontag_list.style.display = "none";
					week_from_dt_nontag_list.style.display = "none";
					week_to_dt_nontag_list.style.display = "none";
				}
			}
		</script>
		 <script>
			$("#view_table_scroll").DataTable({
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
			$('#view_table_scroll').wrap('<div class="dataTables_scroll" />');
		</script>
		<script>
			function image_view(val)
			{
				var baseurl= $("#baseurl").val();
				//alert(val);
				$.ajax({
				type: "POST",
				url: baseurl+'assets/images/aks_product_image/',
				async: false,
				type: "POST",
				data: "id="+val,
				dataType: "html",
				success: function(response)
				{
				$('#kt_modal_view_jewel_img').empty().append(response);
				}
			});
			}
			function prd_delete(val){
			var baseurl= $("#baseurl").val();
			// alert(val);
			$.ajax({
			type: "POST",
			url: baseurl+'Aksproductmaster/prd_delete',
			async: false,
			type: "POST",
			data: "id="+val,
			dataType: "html",
			success: function(response)
			{
			$('#kt_modal_delete_aks_products').empty().append(response);
			$('#kt_modal_delete_aks_products').addClass('show');
			//$("#kt_modal_delete_city").css("display", "block");
			}
			});
			}
			function removeprd(val)
			{ 
			var baseurl= $("#baseurl").val();
			$.ajax({
			type: "POST",
			url: baseurl+'Aksproductmaster/delete',
			async: false,
			data:"field="+val,
			success: function(response)
			{
			window.location.href = baseurl+'Aksproductmaster';
			}
			});
			}


			function closeDeleteModal()
			{
				var baseurl= $("#baseurl").val();
				$('#kt_modal_delete_aks_products').removeClass('show');
				$('.modal-backdrop').removeClass('show');
				window.location.href = baseurl+'Aksproductmaster';
			}

			function prd_edit(val){
				var baseurl= $("#baseurl").val();
				var val= $("#prd_edit_id_hidden").val();
			
				}


				function closeEditModal()
				{
					var baseurl= $("#baseurl").val();
					$('#').removeClass('show');
					//$("#kt_modal_update_city").css("display", "none");
					$('.modal-backdrop').removeClass('show');
					window.location.href = baseurl+'Aksproductmaster';
				}


		</script>
		<script>

	function getcat(){

		

	}
	
</script>
	</body>
	<!--end::Body-->
</html>