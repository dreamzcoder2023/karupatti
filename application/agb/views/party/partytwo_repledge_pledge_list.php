<!--begin::Modal dialog-->
			<div class="modal-dialog modal-xl">
				<!--begin::Modal content-->
				<div class="modal-content rounded">
					<!--begin::Modal header-->
					<div class="modal-header justify-content-end border-0 pb-0">
						<!--begin::Close-->
						<div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal" onclick="closetwo_pledge_list_modal();">
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
							<div class="col-lg-12">
								<div class="row">
									<?php
										//print_r($loantwo_details->BILLNO);exit;
									?>
									<label class="col-lg-1 col-form-label fw-semibold fs-6">Date</label>
									<label class="col-lg-2 col-form-label fw-bold fs-6"><?php echo $loantwo_details->ENDATE; ?></label>
									<label class="col-lg-1 col-form-label fw-semibold fs-6">Loan No</label>
									<label class="col-lg-2 col-form-label fw-bold fs-6"><?php echo $loantwo_details->BILLNO; ?></label>
									<label class="col-lg-1 col-form-label fw-semibold fs-6">Scheme/<br>Int(%)</label>
									<label class="col-lg-1 col-form-label fw-bold fs-6">
										<span><?php echo $loantwo_details->INTERESTTYPE;?></span>
										<span>/</span>
										<span><?php echo $loantwo_details->INTEREST;?></span>
									<span>&nbsp;%</span>
									</label>
									<label class="col-lg-1 col-form-label fw-semibold fs-6">Company</label>
									<label class="col-lg-3 col-form-label fw-bold fs-6"><?php echo $loantwo_details->COMPANYNAME; ?></label>
								</div>
							</div>
							

							<table class="table align-middle table-row-dashed table-striped table-hover fs-7 gy-3 gs-2" id="individual_loan_pledge_item">
								<thead>
									
									<tr class="text-start text-muted fw-bold fs-7 gs-0">
										<th class="min-w-25px">Sno</th>
							            <th class="min-w-80px">Pledge</th>
							            <th class="min-w-80px">Description</th>
							            <th class="min-w-50px" style="display:none;">Quality</th>
							            <th class="min-w-50px">Purity(%)</th>
							            <th class="min-w-50px">Qty</th>
							            <th class="min-w-80px">Weight<br>(gms)</th>
							            <th class="min-w-50px">St.Wgt<br>(gms)</th>
							            <th class="min-w-50px">Less<br>(gms)</th>
							            <th class="min-w-80px">Nt Wgt<br>(gms)</th>
							            <th class="min-w-80px">Pure Wgt<br>(gms)</th>
							            <th class="min-w-50px">Damage</th>
							            
									</tr>
									
								</thead>
								<tbody class="text-gray-600 fw-semibold">
									<?php  
									$i=1; 
									$totalqtyval =0;
									$totalweightval =0;
									$totalstoneweightval= 0;
									$totallessval =0;
									$totalnetweightval =0;
									$totalnetpurityprecentval =0;
									foreach ($partytwopledge_info as $plist) 
									{
										///echo "<pre>";
										//print_r($plist);
										//echo "</pre>";exit;

										$billno  = isset($plist['BILLNO']) ? $plist['BILLNO'] : "-";
										$totnetwight  = isset($plist['totnetwight']) ? $plist['totnetwight'] : "0.00";
										$IS_DAMAGE  = isset($plist['IS_DAMAGE']) ? $plist['IS_DAMAGE'] : "-";
										$PURITY_PERCENT  = isset($plist['PURITY_PERCENT']) ? $plist['PURITY_PERCENT'] : "0.00";
										$LESS  = isset($plist['LESS']) ? $plist['LESS'] : "0.00";
										$STONEWEIGHT  = isset($plist['STONEWEIGHT']) ? $plist['STONEWEIGHT'] : "0.00";
										$PURITY  = isset($plist['PURITY']) ? $plist['PURITY'] : "0.00";
										$QTY  = isset($plist['QTY']) ? $plist['QTY'] : "0.00";
										$totweight  = isset($plist['totweight']) ? $plist['totweight'] : "0.00";
										$COMPANYCODE  = isset($plist['COMPANYCODE']) ? $plist['COMPANYCODE'] : "-";
										$DESCRIPTION  = isset($plist['DESCRIPTION']) ? $plist['DESCRIPTION'] : "-";

										if($IS_DAMAGE ='N')
										{
											$damageval ='NO';

										}
										else{

											$damageval ='YES';
										}
										
										
									?>
									<tr>
										<td><?php echo $i; ?></td>
							            <td class="ple1"><?php echo $billno; ?></td>
							            <td class="ple1"><?php echo $DESCRIPTION; ?></td>
							            <td><?php echo $PURITY; ?></td>
							            <td><?php echo $QTY; ?></td>
							            <td><?php echo $totweight; ?></td>
							            <td><?php echo $STONEWEIGHT; ?></td>
							            <td><?php echo $LESS; ?></td>
							            <td><?php echo $totnetwight; ?></td>
							            <td><?php echo $PURITY_PERCENT; ?></td>
							            <td class="ple1"><?php echo $damageval; ?></td>
							           
				            
				        			</tr>
				        			<?php 
				        				$i++;
				        				$totalqtyval +=$QTY;
				        				$totalweightval +=$totweight;
				        				$totalstoneweightval +=$STONEWEIGHT;
				        				$totallessval +=$LESS;
				        				$totalnetweightval +=$totnetwight;
				        				$totalnetpurityprecentval +=$PURITY_PERCENT;
				        				} 
				        			?>
							   </tbody>
							   <tfoot>
									<tr class="text-black fw-bold fs-6 gs-0">
										<th class="min-w-25px"></th>
							            <th class="min-w-80px"></th>
							            <th class="min-w-80px"></th>
							            <th class="min-w-50px">Total</th>
							            <th class="min-w-50px"><?php echo $totalqtyval; ?></th>
							            <th class="min-w-80px"><?php echo $totalweightval; ?></th>
							            <th class="min-w-50px"><?php echo $totalstoneweightval; ?></th>
							            <th class="min-w-50px"><?php echo $totallessval; ?></th>
							            <th class="min-w-80px"><?php echo $totalnetweightval; ?></th>
							            <th class="min-w-80px"><?php echo $totalnetpurityprecentval; ?></th>
									</tr>
								</tfoot>
							</table>
						</div>
					</div>
					<!--end::Modal body-->
				</div>
				<!--end::Modal content-->
			</div>
			<!--end::Modal dialog