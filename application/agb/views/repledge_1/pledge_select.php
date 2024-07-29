<!--begin::Modal dialog-->
			<div class="modal-dialog modal-xl">
				<!--begin::Modal content-->
				<div class="modal-content rounded">
					<!--begin::Modal header-->
					<div class="modal-header justify-content-end border-0 pb-0">
						<!--begin::Close-->
						<div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal" onclick="close_pledge_view();">
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
						<!-- <form action="<?php //echo base_url();?>repledge/push_selected_pledge" method="POST" > -->
							<!-- <form onsubmit="return push_selected_pledge();"> -->
						<!--begin::Heading-->
						<div class="mb-13 text-center">
							<h1 class="mb-3">Pledge Info</h1>	
						</div>
						<!--end::Heading-->
						<div class="row">
							<div class="col-lg-8">
								<div class="row">
									<label class="col-lg-2 col-form-label fw-semibold fs-6">Date</label>
									<label class="col-lg-4 col-form-label fw-bold fs-5"><?php echo $loan_details->ENDATE; ?></label>
									<label class="col-lg-2 col-form-label fw-semibold fs-6">Loan No</label>
									<label class="col-lg-4 col-form-label fw-bold fs-5"><?php echo $loan_details->BILLNO; ?><input type="hidden" name="sel_ple_bill_no" id="sel_ple_bill_no"></label>
									<label class="col-lg-2 col-form-label fw-semibold fs-6">Company</label>
									<label class="col-lg-10 col-form-label fw-bold fs-5"><?php 
									$clist=$this->db->query("select * from COMPANY where COMPANYCODE='".$loan_details->COMPANYCODE."'")->row();
									echo $clist->COMPANYNAME; ?></label>
									<label class="col-lg-2 col-form-label fw-semibold fs-6">Party</label>
									<label class="col-lg-10 col-form-label fw-bold fs-5"><?php echo $loan_details->NAME; ?></label>
								</div>
							</div>
							<div class="col-lg-4">
								<div class="row">
									<div class="col-lg-6 fv-row mt-2">
										<div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url(<?php echo base_url();?>assets/images/Party.jpg)">
											<?php
											$plist=$this->db->query("select * from PARTIES where PID='".$loan_details->PID."'")->row();
											if(isset($plist->PHOTO))
											{ 
												if($plist->TYPE_OF_RECORD=='N')
												{
												?>
												<img class="image-input-wrapper"  src="<?php echo $plist->PHOTO; ?>" height="120px" width="120px" >
													
												<?php }
												else
												{?>
													<img class="image-input-wrapper"  src="data:image/jpeg;base64,<?php echo base64_encode($plist->PHOTO); ?>" height="120px" width="120px" >
											<?php 
											}
											}
											else{
											 ?>
											<div class="image-input-wrapper"  style="background-image: url(<?php echo base_url();?>assets/images/Party.jpg)"></div>
										<?php } ?>
										</div>
									</div>
									<div class="col-lg-6 fv-row mt-2">
										<div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url(<?php echo base_url();?>assets/images/Jewel.jpg)">
											<?php
											
											if(isset($loan_details->ITEM_PHOTO))
											{ 
												if($loan_details->TYPE_OF_RECORD=='N')
												{
												?>
												<img class="image-input-wrapper"  src="<?php echo $loan_details->ITEM_PHOTO; ?>" height="120px" width="120px" >
													
												<?php }
												else
												{?>
													<img class="image-input-wrapper"  src="data:image/jpeg;base64,<?php echo base64_encode($loan_details->ITEM_PHOTO); ?>" height="120px" width="120px" >
											<?php 
											}
											}
											else{
											 ?>
											<div class="image-input-wrapper"  style="background-image: url(<?php echo base_url();?>assets/images/Jewel.jpg)"></div>
											<?php } ?>
										</div>
									</div>
								</div>
							</div>
							<table  class="table align-middle table-row-dashed table-striped table-hover fs-7 gy-4 gs-2" id="rp_add_view_pledge_info_table">
								<thead>
									<tr class="text-start text-muted fw-bold fs-7 gs-0">
				            <th class="min-w-50px">
				            		<div class="form-check form-check-sm form-check-custom">
										<input class="form-check-input" type="checkbox" onclick="checkAll(this)" checked >&nbsp;&nbsp;<label class="mt-4">Select</label>
											</div>
				            		
				            </th>
				            <th class="min-w-50px">Item</th>
				            <!-- <th class="min-w-80px">Sub Item</th> -->
				            <th class="min-w-300px">Description</th>
				            <th class="min-w-80px">Purity</th>
				            <th class="min-w-80px">Weight(gms)</th>
									</tr>
								</thead>
								<tbody class="text-gray-600 fw-semibold">
									<?php $i=0; foreach($pledge_details as $plist)
									{
										?>
									<tr>
							            <td>
							            	<div class="form-check form-check-sm form-check-custom">
												<input class="form-check-input"  type="checkbox" value="<?php echo $plist['PLEDGE_ID'];?>" id="pledge_checked<?php echo $i;?>" name="pledge_checked[]" checked>
											</div>
										</td>
										<td class="ple1"><?php echo $plist['PLEDGENAME']; ?></td>
							            <!-- <td class="ple1">Ladies Ring</td> -->
							            <td class="ple1"><?php echo $plist['DESCRIPTION']; ?></td>
							            <td class="ple1"><?php echo $plist['PURITY']; ?></td>
							            <td class="ple1"><?php echo $plist['WEIGHT']; ?></td>
				        			</tr>

				        		<?php 	$i++; } ?>
							  </tbody>
							</table>
							<input type="hidden" name="pledge_count" id="pledge_count" value="<?php echo count((array)$pledge_details); ?>">
						</div>
						<div class="d-flex justify-content-end mt-4">
							<button type="reset" class="btn btn-secondary me-3" data-bs-dismiss="modal" onclick="close_pledge_view();">Cancel</button>
							<button type="submit" class="btn btn-primary" onclick="return push_selected_pledge()" >OK</button>
						</div>
						<!-- </form> -->
					</div>
					<!--end::Modal body-->
				</div>
				<!--end::Modal content-->
			</div>
			<!--end::Modal dialog