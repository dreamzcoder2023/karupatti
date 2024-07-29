<div class="modal-dialog modal-lg">
			<!--begin::Modal content-->
			<div class="modal-content rounded">
				<!--begin::Modal header-->
				<div class="modal-header justify-content-end border-0 pb-0">
					<!--begin::Close-->
					<div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal" onclick="closeOnAccountModal();">
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
				<div class="modal-body pt-0 pb-15 px-5 px-xl-20">
					<!-- <div class="mb-13 text-center">
						<h1 class="mb-3">View Loan</h1>
					</div> -->
					<div style="padding:10px 10px 10px 10px !important;box-shadow: 0 3px 6px #00002947; border-radius: 5px; background-color: #f5f5f1 !important;">
						<table class="table table-striped table-hover table-row-bordered fs-7 gy-1 gs-2" id="kt_datatable_dom_positioning_view_loan_particular_party">
							<thead>
								<tr class="fw-semibold fs-6 text-uppercase text-gray-800">
						            <th class="min-w-100px">Date</th>
						            <th class="min-w-100px">Type</th>
						            <th class="min-w-100px">Debit</th>
						            <th class="min-w-100px">Credit</th>
						            <th class="min-w-100px">Remarks</th>
						            <th class="min-w-100px">Company</th>
								</tr>
							</thead>
							<tbody>
								<?php 
								$ledger_dr_total = 0;
								$ledger_cr_total = 0;
								foreach($hl_trans_details as $hltdet){?>
								<tr>
						            <td><?php echo $hltdet['HL_DATE'];?></td>
						            <td><?php echo $hltdet['HL_LOAN_TYPE'];?></td>
						            <?php if($hltdet['HL_DEBIT']==0){?>
						            	<td></td>
						            <?php }else{?>
						            	<td align="right"><?php echo $hltdet['HL_DEBIT'];?></td>
						            <?php }?>
						            <?php if($hltdet['HL_CREDIT']==0){?>
						            	<td></td>
						            <?php }else{?>
						            	<td align="right"><?php echo $hltdet['HL_CREDIT'];?></td>
						            <?php }?>
						            <td><?php echo $hltdet['HL_REMARKS'];?></td>
						            <td ><?php echo $hltdet['COMPANYCODE'];?></td>
						        </tr>
						        <?php 
						        $ledger_dr_total = $ledger_dr_total + $hltdet['HL_DEBIT'];
        						$ledger_cr_total = $ledger_cr_total + $hltdet['HL_CREDIT'];
						    }?>

						    <tr>
						    	<td></td>
						    	<td>Total...</td>
						    	<td><?php echo number_format($ledger_dr_total,2);?></td>
						    	<td><?php echo number_format($ledger_cr_total,2);?></td>
						    	<td></td>
						    	<td></td>
						    </tr>

						    <tr>
						    	<td></td>
						    	<?php if($ledger_dr_total < $ledger_cr_total){?>
						    	<td>Balance...Cr.</td>
						    	<td></td>
						    	<td><?php echo number_format(($ledger_cr_total-$ledger_dr_total),2);?></td>
						    	<?php }else{?>
						    	<td>Balance...Dr.</td>
						    	<td><?php echo number_format(($ledger_dr_total-$ledger_cr_total),2);?></td>
						    	<td></td>
						    	<?php }?>
						    	<td></td>
						    	<td></td>
						    </tr>
						    </tbody>
						</table>
						<div class="card-footer d-flex justify-content-end py-6 px-9">
							<button class="btn btn-secondary" data-bs-dismiss="modal" onclick="closeOnAccountModal();">Cancel</button>
						</div>
					</div>
				</div>
			</div>
			<!--end::Modal dialog-->
		</div>