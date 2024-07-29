<?php $this->load->view("common");?>
<script src="<?php echo base_url();?>assets/js/webcam/webcam.min.js"></script>

<style>
	.dataTables_scroll
    {
        position: relative;
        overflow: auto;
        max-height: 358px;/*the maximum height you want to achieve*/
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
									<h1 class="d-flex align-items-center text-dark fw-bold my-1 fs-3">Add Tag Entry
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
										<!--begin::Card header-->
										<!-- <div class="card-header1 border-0 pt-6">
											
											
										</div> -->
										<!--end::Card header-->
										<!--begin::Card body-->
										<div class="card-body py-4">
										<form method="post" action="<?php echo base_url(); ?>Tagentry/tagentry_add/<?php echo $lot_id.'_'.$row_id;  ?>" >
											<!-- <div style="padding: 10px 10px 10px 10px !important;box-shadow: 0 3px 6px #00002947;border-radius: 5px;background-color: #f5f5f1 !important;"> -->
												<div class="row">
													<div class="col-lg-10">
														<div class="row">
															<div class="col-lg-1">
																<label class="col-form-label required fw-semibold fs-6">Company</label>
															</div>
															<div class="col-lg-2 fv-row">
																<select class="form-select form-select-solid" data-control="select2" name="company_id"  id="company_id" data-hide-search="true">
																	<option value="">Select</option>
																	<?php foreach($company_list as $company_list)
																	{?>
																	<option value="<?php echo $company_list['COMPANYCODE'] ;?>" <?php if($company_list['COMPANYCODE']==$Lotentry->company_id){ echo "selected"; } ?>><?php echo $company_list['COMPANYNAME'];?></option><?php
																	 }?>
																</select>
																<span class="m-form__help text-danger" id="company_id_err"></span>
																<!--<div class="fv-plugins-message-container invalid-feedback" id="company_id_err"></div>-->
															</div>
															<label class="col-lg-1 col-form-label required fw-semibold fs-6">Date</label>
															<div class="col-lg-2">
																<div class="d-flex align-items-center">
																		<!--begin::Svg Icon | path: icons/duotune/general/gen014.svg-->
																		<span class="svg-icon position-absolute ms-4 svg-icon-2 dt">
																			<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																				<path opacity="0.3" d="M21 22H3C2.4 22 2 21.6 2 21V5C2 4.4 2.4 4 3 4H21C21.6 4 22 4.4 22 5V21C22 21.6 21.6 22 21 22Z" fill="currentColor" />
																				<path d="M6 6C5.4 6 5 5.6 5 5V3C5 2.4 5.4 2 6 2C6.6 2 7 2.4 7 3V5C7 5.6 6.6 6 6 6ZM11 5V3C11 2.4 10.6 2 10 2C9.4 2 9 2.4 9 3V5C9 5.6 9.4 6 10 6C10.6 6 11 5.6 11 5ZM15 5V3C15 2.4 14.6 2 14 2C13.4 2 13 2.4 13 3V5C13 5.6 13.4 6 14 6C14.6 6 15 5.6 15 5ZM19 5V3C19 2.4 18.6 2 18 2C17.4 2 17 2.4 17 3V5C17 5.6 17.4 6 18 6C18.6 6 19 5.6 19 5Z" fill="currentColor" />
																				<path d="M8.8 13.1C9.2 13.1 9.5 13 9.7 12.8C9.9 12.6 10.1 12.3 10.1 11.9C10.1 11.6 10 11.3 9.8 11.1C9.6 10.9 9.3 10.8 9 10.8C8.8 10.8 8.59999 10.8 8.39999 10.9C8.19999 11 8.1 11.1 8 11.2C7.9 11.3 7.8 11.4 7.7 11.6C7.6 11.8 7.5 11.9 7.5 12.1C7.5 12.2 7.4 12.2 7.3 12.3C7.2 12.4 7.09999 12.4 6.89999 12.4C6.69999 12.4 6.6 12.3 6.5 12.2C6.4 12.1 6.3 11.9 6.3 11.7C6.3 11.5 6.4 11.3 6.5 11.1C6.6 10.9 6.8 10.7 7 10.5C7.2 10.3 7.49999 10.1 7.89999 10C8.29999 9.90003 8.60001 9.80003 9.10001 9.80003C9.50001 9.80003 9.80001 9.90003 10.1 10C10.4 10.1 10.7 10.3 10.9 10.4C11.1 10.5 11.3 10.8 11.4 11.1C11.5 11.4 11.6 11.6 11.6 11.9C11.6 12.3 11.5 12.6 11.3 12.9C11.1 13.2 10.9 13.5 10.6 13.7C10.9 13.9 11.2 14.1 11.4 14.3C11.6 14.5 11.8 14.7 11.9 15C12 15.3 12.1 15.5 12.1 15.8C12.1 16.2 12 16.5 11.9 16.8C11.8 17.1 11.5 17.4 11.3 17.7C11.1 18 10.7 18.2 10.3 18.3C9.9 18.4 9.5 18.5 9 18.5C8.5 18.5 8.1 18.4 7.7 18.2C7.3 18 7 17.8 6.8 17.6C6.6 17.4 6.4 17.1 6.3 16.8C6.2 16.5 6.10001 16.3 6.10001 16.1C6.10001 15.9 6.2 15.7 6.3 15.6C6.4 15.5 6.6 15.4 6.8 15.4C6.9 15.4 7.00001 15.4 7.10001 15.5C7.20001 15.6 7.3 15.6 7.3 15.7C7.5 16.2 7.7 16.6 8 16.9C8.3 17.2 8.6 17.3 9 17.3C9.2 17.3 9.5 17.2 9.7 17.1C9.9 17 10.1 16.8 10.3 16.6C10.5 16.4 10.5 16.1 10.5 15.8C10.5 15.3 10.4 15 10.1 14.7C9.80001 14.4 9.50001 14.3 9.10001 14.3C9.00001 14.3 8.9 14.3 8.7 14.3C8.5 14.3 8.39999 14.3 8.39999 14.3C8.19999 14.3 7.99999 14.2 7.89999 14.1C7.79999 14 7.7 13.8 7.7 13.7C7.7 13.5 7.79999 13.4 7.89999 13.2C7.99999 13 8.2 13 8.5 13H8.8V13.1ZM15.3 17.5V12.2C14.3 13 13.6 13.3 13.3 13.3C13.1 13.3 13 13.2 12.9 13.1C12.8 13 12.7 12.8 12.7 12.6C12.7 12.4 12.8 12.3 12.9 12.2C13 12.1 13.2 12 13.6 11.8C14.1 11.6 14.5 11.3 14.7 11.1C14.9 10.9 15.2 10.6 15.5 10.3C15.8 10 15.9 9.80003 15.9 9.70003C15.9 9.60003 16.1 9.60004 16.3 9.60004C16.5 9.60004 16.7 9.70003 16.8 9.80003C16.9 9.90003 17 10.2 17 10.5V17.2C17 18 16.7 18.4 16.2 18.4C16 18.4 15.8 18.3 15.6 18.2C15.4 18.1 15.3 17.8 15.3 17.5Z" fill="currentColor" />
																			</svg>
																		</span>
																		<!--end::Svg Icon-->
																		<input class="form-control form-control-solid ps-12" name="date_add_tag" placeholder="To Date" id="date_add_tag" value="<?php echo date("d-m-Y"); ?>"/>
																</div>
															</div>
															<label class="col-lg-1 col-form-label fw-semibold fs-6">Lot No</label>
															<label class="col-lg-2 col-form-label fw-bold fs-5"><?php echo $Lotentry->lot_no;  ?></label>
															<label class="col-lg-1 col-form-label fw-semibold fs-6">Type</label>
															<label class="col-lg-2 col-form-label fw-bold fs-5"><?php $item_type= $this->db->query("SELECT * FROM jewel_type WHERE jewel_type_id='". $Lotentry->metal_type."' ")->row(); echo $item_type->jewel_type;  $metal_type=$Lotentry->metal_type;  ?></label>
															<label class="col-lg-1 col-form-label fw-semibold fs-6">Supplier</label>
															<label class="col-lg-2 col-form-label fw-bold fs-5"><?php echo $Lotentry->supplier;  ?></label>
															<?php $i=1; foreach($lotentry_details as $ldlist){
																	if($row_id==$i){
																	?>
																
															<label class="col-lg-1 col-form-label fw-semibold fs-6">Item</label>
															<label class="col-lg-2 col-form-label fw-bold fs-5"><?php $item_type = $this->db->query("SELECT * FROM ITEMS  WHERE SNO ='".$ldlist['item_name'] ."'  ")->row(); 
																echo  $item_type->ITEMNAME;
																$item_name=$ldlist['item_name'];$lot_detail_id=$ldlist['id']; ?></label>
															<div class="col-lg-3">
																<label class="col-form-label fw-semibold fs-6">Total No.of SubItem &nbsp; &nbsp;</label>
																<label class="col-form-label fw-bold fs-5"><?php  echo $ldlist['count']; ?></label><br>
																<span class="col-form-label fw-bold fs-6">Tag &nbsp;: <?php  echo $ldlist['tagged']; ?> Pcs; <?php  echo $ldlist['tagged_weight']; ?> gms<br>Non-Tag &nbsp;: <?php  echo $ldlist['non_tagged']; ?> ; <?php  echo $ldlist['non_tagged_weight']; ?> gms</span>
															</div>
															<label class="col-lg-1 col-form-label fw-semibold fs-6">Tot.Wgt</label>
															<label class="col-lg-2 col-form-label fw-bold fs-5"> <?php echo $ldlist['weight'];  ?> (gms)</label>
															<?php }  $i++; }  ?>
														</div>
													</div>
													<div class="col-lg-2">
														<div class="row">
															<label class="col-lg-12 col-form-label fw-semibold fs-6">SubItem Count</label>
															<div class="col-lg-12 fv-row fv-plugins-icon-container">
															<input type="hidden" name="non_tag" id="non_tag" value="<?php echo $ldlist['non_tagged'];  ?>">
																<input type="text"  class="form-control form-control-lg form-control-solid" placeholder="" value="<?php echo $count; ?>" name="subitem_count" id="subitem_count" onkeyup="subitem_check()">
																<div class="fv-plugins-message-container invalid-feedback"></div>
															</div>
															<div class="col-lg-12 d-flex justify-content-center">
																<button class="btn btn-outline btn-sm btn-outline-solid btn-outline-warning btn-active-light-primary mt-2">Generate Tag</button>
															</div>
														</div>
													</div>
												</div><br>
												</form> 
													
													<form action="<?php echo base_url(); ?>Tagentry/tagentry_save " method="post" enctype="multipart/form-data"  onsubmit="return tagentry_validation();">
													<table class="table align-middle table-row-dashed table-striped table-hover fs-7 gy-1 gs-2 dataTable" id="add_tagentry_table" >
												    <thead>
												        <tr class="text-start text-muted fw-bold fs-7 gs-0">
												            <!--<th class="w-50px">Sno</th>-->
												            <th class="min-w-100px" width="11%">Tag No</th>
												            <th class="w-200px">Sub Item</th>
												            <th class="min-w-25px">Quality</th>
															<th class="min-w-25px">Purity(%)</th>
												            <th class="min-w-50px">Wgt(gms)</th>
												            <th class="min-w-50px">Stone(gms)</th>
												            <th class="min-w-50px">Net Wgt(gms)</th>
															<th class="min-w-50px">Hallmark Charges</th>
															<th class="min-w-50px">Making Charges</th>
															<th class="min-w-50px">Wastage Charges(%)</th>
															<th class="min-w-50px">Metal Wgt(gms)</th>
															<th class="min-w-80px">Img</th>
												        </tr>
												    </thead>
												    <tbody class="text-gray-600 fw-semibold" >
													<?php if(isset($tag_entry))
													{ $j=$tag_entry->tag_no+1; } 
													else{
														$j=1;
													}
													
													 for($i=0;$i<$count;$i++){  ?> 
												    	<tr>
															<input type="hidden" value="<?php echo $count; ?>" name="count" id="count" >
															<input type="hidden" value="<?php echo $item_name; ?>" name="item_name" id="item_name" >
															<input type="hidden" value="<?php echo $Lotentry->company_id; ?>" name="company_id" id="company_id" >
															<input type="hidden" value="<?php echo $lot_detail_id; ?>" name="lot_detail_id" id="lot_detail_id" >
															<input type="hidden" value="<?php echo $metal_type; ?>" name="metal_type" id="metal_type" >
															<input type="hidden" value="<?php echo $date_add_tag; ?>" name="date_add_tag" id="date_add_tag" >
												            <td>
													            <input type="hidden"  name="tagno[]" id="tagno<?php echo $i; ?>" value="<?php echo $j; ?>" >
																<input  type="text" class="form-control_tex form-control-lg_tex form-control-solid_tex" name="tagno1[]" id="tagno1<?php echo $i; ?>" value="<?php $tag_no=str_pad($j,4,0,STR_PAD_LEFT);  
																$prefix="TAG-";
																$y=date("y");
																$suffix="/".$y;  $tag_id=$prefix.$tag_no.$suffix;  echo $tag_id; ?>" readonly>
												            </td>
												            <td>
																<select data-width="190px" class="form-select form-select-solid" data-control="select2" data-hide-search="false" name="subitem[]" id="subitem<?php echo $i; ?>" >	
																	<option value="">Select SubItem</option>	
																	<?php $subitem_list = $this->db->query("SELECT * FROM SUBITEM_LIST WHERE jewel_type_id='".$metal_type ."' AND item_id='".$item_name ."' AND STATUS='Y'   ")->result_array(); ?>
																	<?php foreach($subitem_list as $slist){   ?>			
																	<option value="<?php echo $slist['SUB_ID']  ?>"><?php echo $slist['SUBITEM_NAME']  ?></option>
																	<?php  } ?>
																</select>
																<div class="m-form__help text-danger" id="subitem_err<?php echo $i; ?>"></div>
												            </td>
												            <td>
																<select data-width="100px" class="form-select form-select-solid" data-control="select2" data-hide-search="false" name="quality[]" id="quality<?php echo $i; ?>" onchange="item_purity(<?php echo $i;?>);">	
																	<option value="">Select</option>	
																	<?php foreach($purity_list as $plist){   ?>			
																	<option value="<?php echo $plist['ITEMPURITYID'];  ?>"><?php echo $plist['ITEMPURITYNAME'];  ?></option>
																	<?php  } ?>
																</select>
																<div class="m-form__help text-danger" id="quality_err<?php echo $i; ?>"></div>
															</td>
															<td>
																<input type="text" class="form-control form-control-lg form-control-solid" value="0" name="purity[]"  id="purity<?php echo $i; ?>" xs>
																<div class="m-form__help text-danger" id="purity_err<?php echo $i; ?>"></div>
																</td>
												            <td>
													            <input type="text" class="form-control form-control-lg form-control-solid" value="0" name="weight[]"  id="weight<?php echo $i; ?>" onkeyup="net_weight(<?php echo $i; ?>)">
																<span class="m-form__help text-danger" id="weight_err<?php echo $i; ?>"></span>
																</td>
												            <td>
													            <input type="text" class="form-control form-control-lg form-control-solid" value="0" name="stone[]" id="stone<?php echo $i; ?>" onkeyup="net_weight(<?php echo $i; ?>)">
																<span class="m-form__help text-danger" id="stone_err<?php echo $i; ?>"></span>
																</td>
												            <td>
													            <input type="text" class="form-control form-control-lg form-control-solid" value="0" name="net_weight[]" id="net_weight<?php echo $i; ?>" readonlys>
																<span class="m-form__help text-danger" id="net_weight_err<?php echo $i; ?>"></span>
																</td>
															<td>
													            <input type="text" class="form-control form-control-lg form-control-solid" value="" name="hallmark_charges[]" id="hallmark_charges<?php echo $i; ?>">
																<div class="m-form__help text-danger" id="hallmark_charges_err<?php echo $i; ?>"></div>
																</td>
															<td>
													            <input type="text" class="form-control form-control-lg form-control-solid" value="" name="making_charges[]" id="making_charges<?php echo $i; ?>">
																<span class="m-form__help text-danger" id="making_charges_err<?php echo $i; ?>"></span>	</td>
												            
																</td>
															<td>
													            <input type="text" class="form-control form-control-lg form-control-solid" value="" name="wastage_charges[]" id="wastage_charges<?php echo $i; ?>" onkeyup="metal_weight(<?php echo $i; ?>)">
																<span class="m-form__help text-danger" id="wastage_charges_err<?php echo $i; ?>"></span>	</td>
												            
																</td>
																<td>
													            <input type="text" class="form-control form-control-lg form-control-solid" value="0" name="metal_weight[]" id="metal_weight<?php echo $i; ?>" readonlys>
																<span class="m-form__help text-danger" id="net_weight_err<?php echo $i; ?>"></span>
																</td>
												            <td>

												            	<div class="image-input mt-2" data-kt-image-input="true" style="background-image: url(assets/media/svg/avatars/blank_jwl.svg)" id="load_image_selected<?php echo $i; ?>">
																				<div class="image-input-wrapper w-40px h-40px" style="background-image: url(assets/media/svg/avatars/blank_jwl.svg)"></div>
																				<!--end::Preview existing avatar-->
																				<!--begin::Label-->
																				<label class="btn btn-icon btn-active-color-primary w-40px h-25px" data-kt-image-input-action="change" data-bs-toggle="tooltip" data-kt-initialized="1">
																					<!--<i class="bi bi-pencil-fill fs-8 ms-3"></i>-->
																					<a href="#" class="menu-link flex-stack px-3" data-bs-toggle="modal" data-bs-target="#kt_modal_camera" onclick="id_set('<?php echo $i; ?>')"><i class="fa fa-camera" aria-hidden="true"></i></a>
																					<!--begin::Inputs-->
																					<input type="file" name="add_party_redemp[]" id="add_party_redemp" accept=".png, .jpg, .jpeg">
																					<input type="hidden" name="add_party_remove_redemp">
																					<!--end::Inputs-->
																				</label>
																				<!--end::Label-->
																				<!--begin::Cancel-->
																				<span class="btn btn-icon btn-active-color-primary w-25px h-20px" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" data-kt-initialized="1">
																					<i class="bi bi-x fs-3 ms-2"></i>
																				</span>
																				<!--end::Cancel-->
																				<!--begin::Remove-->
																				<span class="btn btn-icon btn-active-color-primary w-25px h-20px" data-kt-image-input-action="remove" data-bs-toggle="tooltip" data-kt-initialized="1">
																					<i class="bi bi-x fs-3 ms-2"></i>
																				</span>
																				<!--end::Remove-->
																			</div>
																			<textarea hidden="hidden" name="inventory_jewel_image_data[]" id="inventory_jewel_image_data<?php echo $i; ?>"></textarea>
												            </td>
												    	</tr>
												    	<?php $j++; } ?>
												    </tbody>
													</table>
													<input type="hidden" id="image_id">
													
													<div class="d-flex justify-content-end mt-6 px-9">
														<button type="reset" class="btn btn-secondary me-3" data-bs-dismiss="modal">Cancel</button>
														<button type="submit" class="btn btn-primary">Save Changes</button>
													</div>
													</form>
												<!-- </div> -->
									</div>
										<!--end::Card body-->
											<!-- <div class="row">
										<div class="col-lg-9"></div>
										<div class="col-lg-1">
											<div class="d-flex flex-center flex-row-fluid pt-5 me-2">
												<button type="reset" class="btn btn-secondary md-2" data-bs-dismiss="modal">Cancel</button>
											</div>
										</div>
										<div class="col-lg-2">
											<div class="flex-center flex-row-fluid pt-5 me-2">
												<button type="submit" class="btn btn-primary" id="">Print All Tag</button>
											</div>
										</div>
									</div>
									<br> -->
									</div>
									<!--end::Tables Widget 9-->
								
								</div>
								<!--end::Col-->

							</div>
							<!--end::Row-->


						</div>
						<!--end::Container-->
						<!--begin::Modal - view capture image -->
		<div class="modal fade" id="kt_modal_camera" tabindex="-1" aria-hidden="true">
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
					
					<div class="modal-body pt-0 pb-15 px-5 px-xl-20">
						<!--begin::Heading-->
						<div class="mb-13 text-center">
							<h1 class="mb-3">Capture Image</h1>
						</div>
						<!--end::Heading-->
						<!--end::Heading-->	
						<div class="row">
							<div class="col-lg-6">
								<div class="row">
									<div id="my_camera" style="max-height: 330px;height: 330px;width: 100%;max-width: 100%;border: 1px solid;">
										
									</div>
								</div>
								<div class="d-flex justify-content-center align-items-center mt-6">
									<div class="btn btn-primary" id="take_jewel_photo1" onclick="take_jewel_photo()">Take Jewel Photo</div>
									<button type="submit" class="btn btn-primary" id="capture" onclick="jewel_snapshot()" style="display: none;">Capture</button>
								</div>
							</div>
							<div class="col-lg-6">
								<div class="row">
									<input type="hidden" name="img_count" id="img_count" value="1">
									<div class="col-lg-4 fv-row">
										<a href="javascript:;" onclick="select_image_1();">
											<div class="image-input image-input-outline" data-kt-image-input="true" id="img_1" style="background-image: url(<?php echo base_url();?>assets/images/Jewel.jpg);">
													<div class="image-input-wrapper w-150px h-150px"   style="background-image: url(<?php echo base_url();?>assets/images/Jewel.jpg)"></div>
											</div>
											<textarea hidden="hidden" name="img_1_data" id="img_1_data"></textarea>
										</a>
									</div>
									<div class="col-lg-4 fv-row">
										<a href="javascript:;" onclick="select_image_2();">
											<div class="image-input image-input-outline" data-kt-image-input="true" id="img_2" style="background-image: url(<?php echo base_url();?>assets/images/Jewel.jpg)">
													<div class="image-input-wrapper w-150px h-150px"  style="background-image: url(<?php echo base_url();?>assets/images/Jewel.jpg)"></div>
											</div>
											<textarea hidden="hidden" name="img_2_data" id="img_2_data"></textarea>
										</a>
									</div>
									<div class="col-lg-4 fv-row">
										<a href="javascript:;" onclick="select_image_3();">
											<div class="image-input image-input-outline" data-kt-image-input="true" id="img_3" style="background-image: url(<?php echo base_url();?>assets/images/Jewel.jpg)">
													<div class="image-input-wrapper w-150px h-150px"  style="background-image: url(<?php echo base_url();?>assets/images/Jewel.jpg)"></div>
											</div>
											<textarea hidden="hidden" name="img_3_data" id="img_3_data"></textarea>
										</a>
									</div>
								</div>
								<div class="row mt-4">
									
									<div class="col-lg-4 fv-row">
										<a href="javascript:;" onclick="select_image_4();">
											<div class="image-input image-input-outline" data-kt-image-input="true" id="img_4" style="background-image: url(<?php echo base_url();?>assets/images/Jewel.jpg)">
													<div class="image-input-wrapper w-150px h-150px"  style="background-image: url(<?php echo base_url();?>assets/images/Jewel.jpg)"></div>
											</div>
											<textarea hidden="hidden" name="img_4_data" id="img_4_data"></textarea>
										</a>
									</div>
									<div class="col-lg-4 fv-row">
										<a href="javascript:;" onclick="select_image_5();">
											<div class="image-input image-input-outline" data-kt-image-input="true" id="img_5" style="background-image: url(<?php echo base_url();?>assets/images/Jewel.jpg)">
													<div class="image-input-wrapper w-150px h-150px"  style="background-image: url(<?php echo base_url();?>assets/images/Jewel.jpg)"></div>
											</div>
											<textarea hidden="hidden" name="img_5_data" id="img_5_data"></textarea>
										</a>
									</div>
									<div class="col-lg-4 fv-row">
										<a href="javascript:;" onclick="select_image_6();">
											<div class="image-input image-input-outline" data-kt-image-input="true" id="img_6" style="background-image: url(<?php echo base_url();?>assets/images/Jewel.jpg)">
													<div class="image-input-wrapper w-150px h-150px"  style="background-image: url(<?php echo base_url();?>assets/images/Jewel.jpg)"></div>
											</div>
											<textarea hidden="hidden" name="img_6_data" id="img_6_data"></textarea>
										</a>
									</div>
									<input type="hidden" name="img_selected_id" value="" id="img_selected_id" value="">
									<div class="d-flex justify-content-center align-items-center mt-13">
										<div type="submit" class="btn btn-primary" onclick="put_capture_jewel_photo()">Submit</div>
									</div>
								</div>
							</div>
						</div>
						<!--end::Modal body-->
					</div>
					<!--end::Modal content-->
				</div>
				<!--end::Modal dialog-->
			</div>
			<!--end::Modal - view payment-->
		</div>
		<!--end::Modal - view capture image -->
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
		<script>
function id_set(id){
	
	$('#image_id').val(id);
	var cnt=Number($("#img_count").val());
						$("#img_count").val('1');
						
						for(i=1;i<cnt;i++){

$('#jewel_photo_'+i).attr("src","<?php echo base_url(); ?>assets/images/Jewel.jpg");

document.getElementById("img_"+i).style.border = "none";

						}
	
}
		</script>
		<script>
			function select_image_1()
			{
				document.getElementById("img_1").style.border = "3px solid #ec9629";
				document.getElementById("img_2").style.border = "none";
				document.getElementById("img_3").style.border = "none";
				document.getElementById("img_4").style.border = "none";
				document.getElementById("img_5").style.border = "none";
				document.getElementById("img_6").style.border = "none";
				$('#img_selected_id').val('img_1');
			};
			function select_image_2()
			{
				document.getElementById("img_1").style.border = "none";
				document.getElementById("img_2").style.border = "3px solid #ec9629";
				document.getElementById("img_3").style.border = "none";
				document.getElementById("img_4").style.border = "none";
				document.getElementById("img_5").style.border = "none";
				document.getElementById("img_6").style.border = "none";
				$('#img_selected_id').val('img_2');
			};
			function select_image_3()
			{
				document.getElementById("img_1").style.border = "none";
				document.getElementById("img_2").style.border = "none";
				document.getElementById("img_3").style.border = "3px solid #ec9629";
				document.getElementById("img_4").style.border = "none";
				document.getElementById("img_5").style.border = "none";
				document.getElementById("img_6").style.border = "none";
				$('#img_selected_id').val('img_3');
			};
			function select_image_4()
			{
				document.getElementById("img_1").style.border = "none";
				document.getElementById("img_2").style.border = "none";
				document.getElementById("img_3").style.border = "none";
				document.getElementById("img_4").style.border = "3px solid #ec9629";
				document.getElementById("img_5").style.border = "none";
				document.getElementById("img_6").style.border = "none";
				$('#img_selected_id').val('img_4');
			};
			function select_image_5()
			{
				document.getElementById("img_1").style.border = "none";
				document.getElementById("img_2").style.border = "none";
				document.getElementById("img_3").style.border = "none";
				document.getElementById("img_4").style.border = "none";
				document.getElementById("img_5").style.border = "3px solid #ec9629";
				document.getElementById("img_6").style.border = "none";
				$('#img_selected_id').val('img_5');
			};
			function select_image_6()
			{
				document.getElementById("img_1").style.border = "none";
				document.getElementById("img_2").style.border = "none";
				document.getElementById("img_3").style.border = "none";
				document.getElementById("img_4").style.border = "none";
				document.getElementById("img_5").style.border = "none";
				document.getElementById("img_6").style.border = "3px solid #ec9629";
				$('#img_selected_id').val('img_6');
			};
		</script>
<script language="JavaScript">
		    

		    function take_jewel_photo()

		    {
		    	// alert("hi");
		    	Webcam.set({
		        width: 494,
		        height: 330,
		        image_format: 'jpeg',
		        jpeg_quality: 90
		    	});
		  		Webcam.attach('#my_camera');
		  		document.getElementById('take_jewel_photo1').style.display="none";
		  		document.getElementById('capture').style.display="block";
		  		// document.getElementById('my_camera').style.display="block";
		        // document.getElementById('results').style.display="none";
		    }
		  
		    function jewel_snapshot() {
		    	// alert("hi");
		    	var cnt=Number($("#img_count").val());
		        	// alert(cnt);
		      //   Webcam.start('#my_camera')
					   // .then(result =>{
					   //    console.log("webcam started");
					   // })
					   // .catch(err => {
					   //     console.log(err);
					   // });
		        Webcam.snap( function(data_uri) {
		        	if(cnt<=6)
		        	{
			            // $(".image-tag").val(data_uri);
			            document.getElementById('img_'+cnt).innerHTML = '<img src="'+data_uri+'" id="jewel_photo_'+cnt+'" name="jewel_photo_'+cnt+'" height="150" width="150" />';
			            document.getElementById('img_'+cnt+'_data').innerHTML=data_uri;

			            // document.getElementById('party_photo_data').innerHTML =data_uri;
			            // document.getElementById('my_camer	a').style.display="none";
			            // document.getElementById('results').style.display="block";
			            document.getElementById('take_jewel_photo1').style.display="block";
			            document.getElementById('capture').style.display="none";
			            $("#img_count").val(Number(cnt)+1);
			            Webcam.reset('#my_camera');
		            }
		            else
		            {
		            	alert("Choose anyone image from 6 images");

		            }

		        } );
		    }
		    function put_capture_jewel_photo()
		    {
		    	var sel_id=$('#img_selected_id').val();
		    	// alert(sel_id);
				var image_id=$('#image_id').val();
		    	var img_data=$('#'+sel_id+'_data').val();
		    	// alert(image_id);
		    	document.getElementById('load_image_selected'+image_id).innerHTML='<img src="'+img_data+'" id="loan_jewel_photo" name="loan_jewel_photo" height="40" width="40" />';
				
				document.getElementById('inventory_jewel_image_data'+image_id).innerHTML=img_data;
		    	
				$('#kt_modal_camera').hide();
		    	$('.modal-backdrop').hide();
		    	// document.getElementById('subitem_count').focus();
				// $('#subitem_count').focus();
				var $body = $(document.body);
				$body.css("overflow", "auto");
				$body.width("auto");

		    }
		    
		</script>
		<script>
		function metal_weight(i){
			var wastage_charges = $('#wastage_charges'+i).val();
			var net_weight = $('#net_weight'+i).val();
			var metal_weight=parseFloat(net_weight)+parseFloat(net_weight * wastage_charges/100);
			$('#metal_weight'+i).val(parseFloat(metal_weight).toFixed(3));
		} 

		function item_purity(i){
		
        var aid = $('#quality'+i).val()
		//alert(aid);
        var baseurl= $("#baseurl").val();
         // alert(aid);
         // if (aid!='') {
	        $.ajax({
	        type: "POST",
	        url: baseurl+'Tagentry/get_purity',
	        async: false,
	        type: "POST",
	        data: "typeid="+aid,
	        dataType: "html",
	        success: function(response)
	        {
			if (aid!='') {	
	        	$('#purity'+i).val(parseFloat(response));
	    	}else{
	    		$('#purity'+i).val(0);
	    	}
					       
	        }
	        });
        	// }
		}
function subitem_check(){

var subitem_count =document.getElementById("subitem_count").value;
var non_tag =document.getElementById("non_tag").value;
//alert(non_tag);
	if(parseInt(subitem_count)>parseInt(non_tag)){
	alert("subitem count is more than non tag items ");
	document.getElementById("subitem_count").value='0';
//$('#subitem_count').val()=0;
	}

}

function net_weight(i){
	
	var weight = $('#weight'+i).val();
	var stone = $('#stone'+i).val();
	var total=parseFloat(weight)+parseFloat(stone);
	$('#net_weight'+i).val(total);
	//alert(total);
}

function tagentry_validation(){
	var err = 0;
	var count = $('#count').val();
	for(var i=0;parseInt(i)<parseInt(count);i++ ){
		var subitem = $('#subitem'+i).val();
		var purity = $('#purity'+i).val();
		var weight = $('#weight'+i).val();
		var stone = $('#stone'+i).val();
		var net_weight = $('#net_weight'+i).val();
		var hallmark_charges = $('#hallmark_charges'+i).val();
		var making_charges = $('#making_charges'+i).val();
		var wastage_charges = $('#wastage_charges'+i).val();
	

	if(subitem.trim()==''){
                $('#subitem_err'+i).html('subitem is required!');
                err++;
            }else{
                $('#subitem_err'+i).html('');
            }

			if(purity.trim()==''){
                $('#purity_err'+i).html('purity is required!');
                err++;
            }else{
                $('#purity_err'+i).html('');
            }

			if(weight.trim()==''){
                $('#weight_err'+i).html('weight is required!');
                err++;
            }else{
                $('#weight_err'+i).html('');
            }

			if(stone.trim()==''){
                $('#stone_err'+i).html('stone is required!');
                err++;
            }else{
                $('#stone_err'+i).html('');
            }

			if(net_weight.trim()==''){
                $('#net_weight_err'+i).html('net weight is required!');
                err++;
            }else{
                $('#net_weight_err'+i).html('');
            }

			if(hallmark_charges.trim()==''){
                $('#hallmark_charges_err'+i).html('hallmark charges is required!');
                err++;
            }else{
                $('#hallmark_charges_err'+i).html('');
            }

			if(making_charges.trim()==''){
                $('#making_charges_err'+i).html('making charges is required!');
                err++;
            }else{
                $('#making_charges_err'+i).html('');
            }

			if(wastage_charges.trim()==''){
                $('#wastage_charges_err'+i).html('wastage charges is required!');
                err++;
            }else{
                $('#wastage_charges_err'+i).html('');
            }


		}

if(err>0){ return false; }else{ return true; }

}



			      $("#kt_datatable_responsive_approved").kendoTooltip({
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
			      $("#kt_datatable_responsive_not_approved").kendoTooltip({
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
			$("#add_tagentry_date").flatpickr({
				dateFormat: "d-m-Y",});
		</script>
		<script>
			$("#add_tagentry_table").DataTable({
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
			$('#add_tagentry_table').wrap('<div class="dataTables_scroll" />');
		</script>
		<script>
			
			$("#date_add_tag").flatpickr({
								dateFormat: "d-m-Y",
							});
			// $("#to_date_fillter").flatpickr({
			// 					dateFormat: "d-m-Y",
			// 				});



				$("#kt_daterangepicker_lot_entry_from").flatpickr({
								dateFormat: "d-m-Y",
							});
				$("#kt_daterangepicker_lot_entry_to").flatpickr({
								dateFormat: "d-m-Y",
							});
				$("#kt_daterangepicker_lot_entry_add_date").flatpickr({
								dateFormat: "d-m-Y",
							});
				$("#kt_daterangepicker_lot_entry_edit_date").flatpickr({
								dateFormat: "d-m-Y",
							});
				$("#kt_daterangepicker_lot_entry_view_date").flatpickr({
								dateFormat: "d-m-Y",
							});

			$("#kt_datatable_responsive_approved").DataTable({
				
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

				$("#kt_datatable_responsive_not_approved").DataTable({
				
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
	</body>
	<!--end::Body-->
</html>