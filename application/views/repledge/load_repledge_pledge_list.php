<!--begin::Modal dialog-->
			<div class="modal-dialog modal-xl">
				<!--begin::Modal content-->
				<div class="modal-content rounded">
					<!--begin::Modal header-->
					<div class="modal-header justify-content-end border-0 pb-0">
						<!--begin::Close-->
						<div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal" onclick="close_pledge_list_modal();">
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
							<h1 class="mb-3">Pledge Info</h1>	
						</div>
						<!--end::Heading-->
						<div class="row">
							<div class="col-lg-8">
								<div class="row">
									<label class="col-lg-2 col-form-label fw-semibold fs-6">Date</label>
									<label class="col-lg-4 col-form-label fw-bold fs-5"><?php echo date_format(date_create($repledge_master->ENDATE),'d-m-Y'); ?></label>
									<label class="col-lg-2 col-form-label fw-semibold fs-6">Loan No</label>
									<label class="col-lg-4 col-form-label fw-bold fs-5"><?php echo $repledge_master->RP_BILLNO; ?></label>
									<label class="col-lg-2 col-form-label fw-semibold fs-6">Company</label>
									<label class="col-lg-10 col-form-label fw-bold fs-5"><?php 
									$cmp=$this->db->query("select * from COMPANY where COMPANYCODE='".$repledge_master->COMPANYCODE."'")->row();
									echo $cmp->COMPANYNAME;
									?></label>
									<label class="col-lg-2 col-form-label fw-semibold fs-6">Party</label>
									<label class="col-lg-10 col-form-label fw-bold fs-5"><?php echo $loan_details->NAME; ?></label>
								</div>
							</div>
							<div class="col-lg-4">
								<div class="row">
									<div class="col-lg-6 fv-row mt-2">
										<div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url(assets/images/Party.jpg)">
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
										<div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url(assets/images/Jewel.jpg)">
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
				            <th class="min-w-50px">Sno</th>
				            <th class="min-w-50px">Item</th>
				            <!-- <th class="min-w-80px">Sub Item</th> -->
				            <th class="min-w-300px">Description</th>
				            <th class="min-w-80px">Purity</th>
				            <th class="min-w-80px">Weight(gms)</th>
									</tr>
								</thead>
								<tbody class="text-gray-600 fw-semibold">
									<?php  $i=0; foreach ($pledge_info as $plist) {
										
									?>
									<tr <?php echo ($plist['STATUS']=='BANK')?'style="color:red"':''; ?>>
							            <td><?php echo $i+1; ?></td>
										<td class="ple1"><?php echo $plist['PLEDGENAME']; ?></td>
							            <!-- <td class="ple1">Ladies Ring</td> -->
							            <td class="ple1"><?php echo $plist['DESCRIPTION']; ?></td>
							            <td class="ple1"><?php echo $plist['PURITY']; ?></td>
							            <td class="ple1"><?php echo $plist['WEIGHT']; ?></td>
							        </tr>
				        		<?php 
				        				$i++;
				        			} 
				        		?>
							  </tbody>
							</table>
						</div>
					</div>
					<!--end::Modal body-->
				</div>
				<!--end::Modal content-->
			</div>
			<!--end::Modal dialog