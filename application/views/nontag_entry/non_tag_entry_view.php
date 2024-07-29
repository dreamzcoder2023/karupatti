<!--begin::Modal dialog-->
<div class="modal-dialog modal-xl">
				<!--begin::Modal content-->
				<div class="modal-content rounded">
					<!--begin::Modal header-->
					<div class="modal-header justify-content-end border-0 pb-0">
						<!--begin::Close-->
						<div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
							<!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
							<span class="svg-icon svg-icon-1" onclick="closeViewModal();">
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
							<h1>View Non Tagged List</h1>
						</div>
						<!--end::Heading-->
						<!-- <div style="padding: 10px 10px 10px 10px !important;box-shadow: 0 3px 6px #00002947;border-radius: 5px;background-color: #f5f5f1 !important;"> -->
							<div class="row">
								<div class="col-lg-10">
									<div class="row">
										<label class="col-lg-1 col-form-label fw-semibold fs-6">Date</label>
										<label class="col-lg-2 col-form-label fw-bold fs-5">: <?php
										 $date_format  = $this->db->query("SELECT * FROM general_settings  ")->row();
										 $format= $date_format->date_format;
										 echo date("$format", strtotime($Lotentry_list_view->lot_date));
										// echo $Lotentry_list_view->lot_date; ?></label>
										<label class="col-lg-1 col-form-label fw-semibold fs-6">Lot No</label>
										<label class="col-lg-2 col-form-label fw-bold fs-5">: <?php  echo $Lotentry_list_view->lot_no; ?></label>
										<!-- <div class="col-lg-2">
											<select class="form-select form-select-solid" data-control="select2" data-dropdown-parent="#kt_modal_add_tagentry">	
												<option value="">Select Lot No</option>				
												<option value="1">LT-0001/22</option>
												<option value="2">LT-0253/22</option>
												<option value="3">LT-1254/22</option>
												<option value="4">LT-4563/22</option>
											</select>
										</div> -->
										<!-- <div class="col-lg-2 fv-row fv-plugins-icon-container">
											<input type="text" name="" class="form-control form-control-lg form-control-solid" placeholder="Select Lot No">
											<div class="fv-plugins-message-container invalid-feedback"></div>
										</div> -->
										<label class="col-lg-2 col-form-label fw-semibold fs-6">Item Type</label>
										<!-- <div class="col-lg-2">
											<select class="form-select form-select-solid" data-control="select2" data-dropdown-parent="#kt_modal_add_tagentry">	
												<option value="">Select Item Type</option>				
												<option value="1">Gold</option>
												<option value="2">Silver</option>
												<option value="3">Stone Gold</option>
											</select>
										</div> -->
										<label class="col-lg-1 col-form-label fw-bold fs-5">: <?php  $item_type= $this->db->query("SELECT * FROM jewel_type WHERE jewel_type_id='". $Lotentry_list_view->metal_type."' ")->row();  echo $item_type->jewel_type; ?></label>
									</div>
									<div class="row">
										<label class="col-lg-1 col-form-label fw-semibold fs-6">Supplier</label>
										<label class="col-lg-2 col-form-label fw-bold fs-5">: <?php  echo $Lotentry_list_view->supplier; ?></label>
										<label class="col-lg-2 col-form-label fw-semibold fs-6">Total No of Item</label>
										<label class="col-lg-1 col-form-label fw-bold fs-5">: <?php   echo $Lotentry_list_view->item_count;   ?></label>
										<label class="col-lg-2 col-form-label fw-semibold fs-6">Total Weight</label>
										<label class="col-lg-2 col-form-label fw-bold fs-5">:<?php  echo number_format($Lotentry_list_view->item_weight,3); ?> (gms)</label>
									</div>
								</div>
								<div class="col-lg-2">
									<div class="row">
										<label class="col-lg-5 col-form-label fw-semibold fs-6">Lot Photo</label>
										<div class="col-lg-7 fv-row">
											<?php	$image_url =  base_url().'lot_img/'. $Lotentry_list_view->img; 
															    if(@getimagesize($image_url)){ ?>
																	<a class="d-block overlay"  href="<?php echo base_url(); ?>lot_img/<?php echo $Lotentry_list_view->img; ?> " data-fslightbox="lightbox-basic">
																	    <!--begin::Image-->
																	    <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded w-80px h-80px"
																	    style="background-image:url('<?php echo base_url(); ?>lot_img/<?php echo $Lotentry_list_view->img; ?>')">
																	    </div>
																	    <!--end::Image-->
																	    <!--begin::Action-->
																	    <div class="overlay-layer card-rounded bg-dark bg-opacity-25 shadow w-80px h-80px">
																	        <i class="bi bi-eye-fill text-white fs-3"></i>
																	    </div>
																	    <!--end::Action-->
																	</a>
																<?php }else{ ?>
																	 <a href="javascript:;" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm"   >
									            						<div class="image-input" data-kt-image-input="true">
																			<div class="image-input-wrapper w-80px h-80px" style="background-image: url(<?php echo base_url() ?>assets/images/Lot_images.jpg)">
																			</div>
																		</div>
																	</a>
															<?php } ?>		
	
													</div>
												<!--end::Image input-->
										</div>
									</div>
								</div>
							</div><br>
							<table class="table align-middle table-row-dashed table-striped table-hover fs-7 gy-1 gs-2 dataTable" id="add_tagentry_table">
							    <thead > 
							    	<!-- style=" background-color: #A7D3F0 !important;border: 1px solid #606060 !important;color: black !important;"> -->
							        <tr class="text-start text-muted fw-bold fs-7 gs-0">
							            <th class="min-w-50px">Sno</th>
							            <th class="min-w-150px">Item Name</th>
							            <th class="min-w-80px">Total Count</th>
							            <th class="min-w-80px">Count(Tag/Non Tag)</th>
							            <th class="min-w-125px">Total Wgt(gms)</th>
							            <th class="min-w-125px">Wgt(Tag/Non Tag)</th>
										
							            <th class="min-w-50px">Action</th>
							        </tr>
							    </thead>
							    <tbody class="text-gray-600 fw-semibold">
                                    <?php $i=1; foreach($lotentry_details as $ldlist){ ?>
							    	<tr>
							    		<td><?php echo $i; ?></td>
							    		<td class="ple1"> <?php
										$item_type = $this->db->query("SELECT * FROM ITEMS  WHERE SNO ='".$ldlist['item_name'] ."'  ")->row(); 
										echo  $item_type->ITEMNAME; ?></td>
							    		<td><?php echo $ldlist['count']; ?></td>
							    		<td><?php echo $ldlist['tagged'].'/'. ($ldlist['count']-$ldlist['tagged']); ?></td>
							    		<td><?php echo  number_format($ldlist['weight'],3); ?></td>
										<td><?php echo  number_format($ldlist['tagged_weight'],3).'/'. number_format($ldlist['weight']-$ldlist['tagged_weight'],3); ?></td>
							    		<td>
							    			<a href="<?php echo base_url(); ?>Tagentry/tagentry_add/<?php echo $Lotentry_list_view->lot_id.'_'.$i;  ?>" target="_blank">
							    				<!-- <i class="fas fa-plus-circle" title="Add Tag"></i> -->
													<button type="button" class="btn btn-sm btn-outline btn-outline-solid btn-outline-warning btn-active-light-primary">Add Tag Entry</button>
												</a>
							    		</td>
							    	</tr>
							    	<?php  $i++; } ?>
							    </tbody>
							</table>
						<!-- </div> -->
						<!-- <div class="d-flex justify-content-end mt-6 px-9">
							<button type="reset" class="btn btn-secondary me-3" data-bs-dismiss="modal">Cancel</button>
							<button type="submit" class="btn btn-primary">Save Changes</button>
						</div> -->
                        </div>
					<!--end::Modal body-->
				</div>
				<!--end::Modal content-->
			</div>
			<!--end::Modal dialog-->
			<?php $this->load->view("script");?>