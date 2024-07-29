<!-- <form id="kt_add_product_form" class="form"> -->
				<!--begin::Modal dialog-->
				<div class="modal-dialog modal-xl">
					<!--begin::Modal content-->
					<div class="modal-content rounded">
						<!--begin::Modal header-->
						<div class="modal-header justify-content-end border-0 pb-0">
							<!--begin::Close-->
							<div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal" onclick="closeViewModal();">
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
								<h1 class="mb-3">Chit Details</h1>	
							</div>
							<!--end::Heading-->
							<table id="kt_datatable_responsive" class="table align-middle table-striped table-hover fs-7 gy-4 gs-2">
								<thead>
									<tr class="text-start text-muted fw-bold fs-7 gs-0">
										<th class="min-w-25px">Sno</th>
										<th class="min-w-25px">Date</th>
										<th class="min-w-100px">Chit ID</th>
										<th class="min-w-100px">Scheme</th>
										<th class="min-w-100px">Collection Type</th>
										<!--<th class="min-w-100px">Collection Day</th>-->
										<th class="min-w-100px">Deposit</th>
										<th class="min-w-100px">Withdraw</th>
										<th class="min-w-100px">Available Balance</th>
										<th class="min-w-125px" style="width: 10%;"><span class="text-end">Actions</span></th>
									</tr>
								</thead>
								<tbody class="text-gray-600 fw-semibold">
									<?php $i=1; foreach($modal_list as $mlist) { ?>
									<tr>
										<td><?php echo $i; ?></td>
										<td><?php echo $mlist['chit_date']; ?></td>
										<td><?php echo $mlist['party_id']; ?></td>
										<td><?php 
                                            if($mlist['scheme_type']==3){echo "<span>Thangamagal</span>";
                                            }elseif($mlist['scheme_type']==2){echo "<span>Thangamagal</span>";
                                            }elseif($mlist['scheme_type']==1){echo "<span>Selvamagal</span>"; 
                                            }else  echo "<span>-</span>";
                                        ?></td>
										<td><?php 
                                            if($mlist['collection_type']==3){echo "<span>Monthly</span>";
                                            }elseif($mlist['collection_type']==2){echo "<span>Weekly</span>";
                                            }elseif($mlist['collection_type']==1){echo "<span>Daily</span>"; 
                                            }else  echo "<span>-</span>";
                                        ?></td>
										<td><?php echo $mlist['tot_deposit']; ?></td>
										<td><?php echo $mlist['tot_withdraw']; ?></td>
										<td><?php echo $mlist['ava_balance']; ?></td>
										<td><a href="chit_transaction_history.php" target="_blank">
											<button type="button" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm" data-bs-toggle="modal" title="Transaction-History" data-bs-target="#">
											<i class="fas fa-history eyc fs-4"></i>
											</button>
										</a></td>
									</tr>
                                    <?php $i++; } ?>
								</tbody>
							</table>
							<!--end::Actions-->
						</div>
						<!--end::Modal body-->
					</div>
					<!--end::Modal content-->
				</div>
				<!--end::Modal dialog-->
			<!-- </form> -->