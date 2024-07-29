<div class="modal-dialog modal-lg">
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
				<div class="modal-body pt-0 pb-15 px-5 px-xl-20">
					<!-- <div class="mb-13 text-center">
						<h1 class="mb-3">View Loan</h1>
					</div> -->
					<div style="padding:10px 10px 10px 10px !important;box-shadow: 0 3px 6px #00002947; border-radius: 5px; background-color: #f5f5f1 !important;">
						<div class="row">
							<div class="col-lg-6">
								<div class="row">
									<label class="col-lg-2 col-form-label fw-semibold fs-6">Name</label>
									<label class="col-lg-10 col-form-label fw-bold fs-6">: <?php echo $party_details->NAME;?></label>
								</div>
								<div class="row">
									<label class="col-lg-4 col-form-label fw-semibold fs-6">Father Name</label>
									<label class="col-lg-8 col-form-label fw-bold fs-6">: <?php echo $party_details->LASTNAME_PREFIX;?>, <?php echo $party_details->FATHERSNAME;?></label>
								</div>
								<div class="row">
									<label class="col-lg-3 col-form-label fw-semibold fs-6">Address</label>
									<label class="col-lg-9 col-form-label fw-bold fs-6">: <?php echo $party_details->DOORNO;?>, <?php echo $party_details->ADDRESS1;?>, <?php echo $party_details->ADDRESS2;?></label>
								</div>
							</div>
							<div class="col-lg-6">
								<div class="row">
									<?php if(count((array)$active_party_loans)>0)
									{
										$loan_count = 'Already have '.count((array)$active_party_loans).' Loans';
									}
									else
									{
										$loan_count = 'No Active Loan';
									}
									?>
									<label class="col-lg-12 col-form-label fw-bold fs-2" style="color: #f1416c;"><?php echo $loan_count;?></label>
								</div>
								<div class="row">
									<label class="col-lg-6 col-form-label fw-semibold fs-6">Customer Rating</label>
									<?php if($party_details->RATING==3){?>
									<label class="col-lg-6 col-form-label fw-bold fs-3 text-center" style="background: var(--bs-success);border-radius: 10px;">Good</label>
									<?php }elseif($party_details->RATING==2){?>
									<label class="col-lg-6 col-form-label fw-bold fs-3 text-center" style="background: var(--bs-warning);border-radius: 10px;">Average</label>
									<?php }elseif($party_details->RATING==1){?>
									<label class="col-lg-6 col-form-label fw-bold fs-3 text-center" style="background: var(--bs-danger);border-radius: 10px;">Bad</label>
									<?php }else{?>
									<?php }?>
								</div>
							</div>
						</div>
						<table class="table table-striped table-hover table-row-bordered fs-7 gy-1 gs-2" id="kt_datatable_dom_positioning_view_loan_particular_party">
							<thead>
								<tr class="fw-semibold fs-6 text-uppercase text-gray-800">
						            <th class="min-w-100px">Name</th>
						            <th class="min-w-100px">Bill No</th>
						            <th class="min-w-100px">Endate</th>
						            <th class="min-w-100px">Amount</th>
						            <th class="min-w-100px">Active</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach($party_loans as $ploans){?>
								<tr>
						            <td><?php echo $ploans['NAME'];?></td>
						            <td><?php echo $ploans['BILLNO'];?></td>
						            <td><?php echo $ploans['ENDATE'];?></td>
						            <td align="right"><?php echo $ploans['AMOUNT'];?></td>
						            <td><?php echo $ploans['ACTIVE'];?></td>
						        </tr>
						        <?php }?>
						    </tbody>
						</table>
						<div class="card-footer d-flex justify-content-end py-6 px-9">
							<button class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
						</div>
					</div>
				</div>
			</div>
			<!--end::Modal dialog-->
		</div>