	
	<div class="modal-dialog modal-s">
			<!--begin::Modal content-->
			<div class="modal-content rounded">
				<!--begin::Modal header-->
				<div class="modal-header justify-content-end border-0 pb-0">
					<!--begin::Close-->
					<div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal" onclick="close_chagne_mem_modal();">
						<!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
						<span class="svg-icon svg-icon-1">
							<svg width="24" height="24" viewBox="0 0 24 24" fill="none"
								xmlns="http://www.w3.org/2000/svg">
								<rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1"
									transform="rotate(-45 6 17.3137)" fill="currentColor" />
								<rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)"
									fill="currentColor" />
							</svg>
						</span>
						<!--end::Svg Icon-->
					</div>
					<!--end::Close-->
				</div>
				<!--end::Modal header-->
				<!--begin::Modal body-->
				<!--begin::Modal body-->
				<div class="modal-body pt-0 pb-15 px-5 px-xl-20">
					<!--begin::Heading-->
					<div class="mb-6 text-center">
						<h1 class="mb-3">Change Membership</h1>
					</div>
					<form method="POST" action="<?php echo base_url(); ?>Membership/change_membership_save" enctype="multipart/form-data" onsubmit="return change_membership_validation()">
					<!-- <form method="POST" class="form" action="<?php echo base_url(); ?>Membership/change_membership_save" enctype="multipart/form-data" onsubmit="return change_membership_validation();"> -->
						<div class="row">
							<label class="col-lg-12 col-form-label fw-bold fs-5" title="Party">
								<span><i class="fa fa-user fs-4" aria-hidden="true" title="Party"></i>&emsp;</span><span><?php echo $change_mem_details->NAME;?></span>
								<input type="hidden" name="party_id_change_mem" id="party_id_change_mem" value="<?php echo $change_mem_details->PID;?>">
							</label>
							<label class="col-lg-7 col-form-label fw-bold fs-5" title="Card No"><i class="fa fa-address-card fs-4" aria-hidden="true" title="Card No"></i>&emsp;<?php echo $change_mem_details->MEMBERSHIP_NO;?></label>
							<label class="col-lg-5 col-form-label fw-bold fs-5" name="" id="" title="Issue/Activate Date">
								<i class="fas fa-calendar-check fs-3" title="Issue/Activate Date"></i>&emsp;
								<?php echo date_format(date_create($change_mem_details->ISSUE_DATE),$_SESSION['DATE_PATTERN']);?>
							</label>
							<label class="col-lg-3 col-form-label fw-bold fs-6" name="" id="">
								<?php if ($change_mem_details->CARD_TYPE == "Silver") { ?>
									<span style="background-color:#C0C0C0;border-radius: 8px;padding: 5px 15px 5px 15px;"><?php echo $change_mem_details->CARD_TYPE;?></span>
								<?php 
								}
								elseif ($change_mem_details->CARD_TYPE == "Gold") { ?>
									<span style="background-color:#ffaa00;border-radius: 8px;padding: 5px 15px 5px 15px;"><?php echo $change_mem_details->CARD_TYPE;?></span>
								<?php 
								}
								elseif ($change_mem_details->CARD_TYPE == "Platinum") { ?>
									<span style="background-color:#E5E4E2;border-radius: 8px;padding: 5px 15px 5px 15px;"><?php echo $change_mem_details->CARD_TYPE;?></span>
								<?php 
								}
								else { ?>
									<span>-</span>
								<?php 
								}?>	
							</label>
							<label class="col-lg-4 col-form-label fw-bold fs-5" name="" id="" title="Available Points">
								&emsp;<i class="fa-solid fa-coins fs-4" title="Available Points"></i>&emsp;<?php echo $change_mem_details->POINTS;?>
							</label>
							<label class="col-lg-5 col-form-label fw-bold fs-5" name="" id="" title="Expiry Date">
								<i class="fas fa-calendar-times fs-3" title="Expiry Date"></i>&emsp;<?php echo date_format(date_create($change_mem_details->EXP_DATE),$_SESSION['DATE_PATTERN']);?>
							</label>
							<div class="col-lg-6 d-flex align-items-center mt-3">
								<div class="form-check form-check-custom me-3">
									<input class="form-check-input2" type="radio" id="change_plan" name="change_plan_issue_new" value="change_plan_val" />
								</div>
								<div class="d-flex flex-column">
									<div class="fs-6 fw-semibold text-muted">Change Plan</div>
								</div>
							</div>
							<div class="col-lg-6 d-flex align-items-center mt-3">
								<div class="form-check form-check-custom me-3">
									<input class="form-check-input2" type="radio" id="Issue_date" name="change_plan_issue_new" value="issue_new_val" />
								</div>
								<div class="d-flex flex-column">
									<div class="fs-6 fw-semibold text-muted">Issue New</div>
								</div>
							</div>
						</div>
						<div class="row mt-2">
							<label class="col-lg-4 col-form-label required fw-semibold fs-6" id="issue_lab" style="display: none;">Issue Date</label>
							<div class="col-lg-8 fv-row" id="issue_tbox" style="display: none;">
								<div class="d-flex align-items-center">
									<span class="svg-icon position-absolute ms-4 svg-icon-2 dt">
										<svg width="24" height="24" viewBox="0 0 24 24" fill="none"
											xmlns="http://www.w3.org/2000/svg">
											<path opacity="0.3"
												d="M21 22H3C2.4 22 2 21.6 2 21V5C2 4.4 2.4 4 3 4H21C21.6 4 22 4.4 22 5V21C22 21.6 21.6 22 21 22Z"
												fill="currentColor" />
											<path
												d="M6 6C5.4 6 5 5.6 5 5V3C5 2.4 5.4 2 6 2C6.6 2 7 2.4 7 3V5C7 5.6 6.6 6 6 6ZM11 5V3C11 2.4 10.6 2 10 2C9.4 2 9 2.4 9 3V5C9 5.6 9.4 6 10 6C10.6 6 11 5.6 11 5ZM15 5V3C15 2.4 14.6 2 14 2C13.4 2 13 2.4 13 3V5C13 5.6 13.4 6 14 6C14.6 6 15 5.6 15 5ZM19 5V3C19 2.4 18.6 2 18 2C17.4 2 17 2.4 17 3V5C17 5.6 17.4 6 18 6C18.6 6 19 5.6 19 5Z"
												fill="currentColor" />
											<path
												d="M8.8 13.1C9.2 13.1 9.5 13 9.7 12.8C9.9 12.6 10.1 12.3 10.1 11.9C10.1 11.6 10 11.3 9.8 11.1C9.6 10.9 9.3 10.8 9 10.8C8.8 10.8 8.59999 10.8 8.39999 10.9C8.19999 11 8.1 11.1 8 11.2C7.9 11.3 7.8 11.4 7.7 11.6C7.6 11.8 7.5 11.9 7.5 12.1C7.5 12.2 7.4 12.2 7.3 12.3C7.2 12.4 7.09999 12.4 6.89999 12.4C6.69999 12.4 6.6 12.3 6.5 12.2C6.4 12.1 6.3 11.9 6.3 11.7C6.3 11.5 6.4 11.3 6.5 11.1C6.6 10.9 6.8 10.7 7 10.5C7.2 10.3 7.49999 10.1 7.89999 10C8.29999 9.90003 8.60001 9.80003 9.10001 9.80003C9.50001 9.80003 9.80001 9.90003 10.1 10C10.4 10.1 10.7 10.3 10.9 10.4C11.1 10.5 11.3 10.8 11.4 11.1C11.5 11.4 11.6 11.6 11.6 11.9C11.6 12.3 11.5 12.6 11.3 12.9C11.1 13.2 10.9 13.5 10.6 13.7C10.9 13.9 11.2 14.1 11.4 14.3C11.6 14.5 11.8 14.7 11.9 15C12 15.3 12.1 15.5 12.1 15.8C12.1 16.2 12 16.5 11.9 16.8C11.8 17.1 11.5 17.4 11.3 17.7C11.1 18 10.7 18.2 10.3 18.3C9.9 18.4 9.5 18.5 9 18.5C8.5 18.5 8.1 18.4 7.7 18.2C7.3 18 7 17.8 6.8 17.6C6.6 17.4 6.4 17.1 6.3 16.8C6.2 16.5 6.10001 16.3 6.10001 16.1C6.10001 15.9 6.2 15.7 6.3 15.6C6.4 15.5 6.6 15.4 6.8 15.4C6.9 15.4 7.00001 15.4 7.10001 15.5C7.20001 15.6 7.3 15.6 7.3 15.7C7.5 16.2 7.7 16.6 8 16.9C8.3 17.2 8.6 17.3 9 17.3C9.2 17.3 9.5 17.2 9.7 17.1C9.9 17 10.1 16.8 10.3 16.6C10.5 16.4 10.5 16.1 10.5 15.8C10.5 15.3 10.4 15 10.1 14.7C9.80001 14.4 9.50001 14.3 9.10001 14.3C9.00001 14.3 8.9 14.3 8.7 14.3C8.5 14.3 8.39999 14.3 8.39999 14.3C8.19999 14.3 7.99999 14.2 7.89999 14.1C7.79999 14 7.7 13.8 7.7 13.7C7.7 13.5 7.79999 13.4 7.89999 13.2C7.99999 13 8.2 13 8.5 13H8.8V13.1ZM15.3 17.5V12.2C14.3 13 13.6 13.3 13.3 13.3C13.1 13.3 13 13.2 12.9 13.1C12.8 13 12.7 12.8 12.7 12.6C12.7 12.4 12.8 12.3 12.9 12.2C13 12.1 13.2 12 13.6 11.8C14.1 11.6 14.5 11.3 14.7 11.1C14.9 10.9 15.2 10.6 15.5 10.3C15.8 10 15.9 9.80003 15.9 9.70003C15.9 9.60003 16.1 9.60004 16.3 9.60004C16.5 9.60004 16.7 9.70003 16.8 9.80003C16.9 9.90003 17 10.2 17 10.5V17.2C17 18 16.7 18.4 16.2 18.4C16 18.4 15.8 18.3 15.6 18.2C15.4 18.1 15.3 17.8 15.3 17.5Z"
												fill="currentColor" />
										</svg>
									</span>
									<input class="form-control form-control-solid ps-12" name="issue_date_change_mem" placeholder="Date" id="issue_date_change_mem" />
								</div>
								<div class="fv-plugins-message-container invalid-feedback" id="issue_date_change_mem_err"></div>
							</div>
							<label class="col-lg-4 col-form-label required fw-semibold fs-6" id="type_lab" style="display: none;">Type</label>
							<div class="col-lg-8" id="type_tbox" style="display: none;">
								<select class="form-select form-select-solid" data-control="select2"
									data-hide-search="true" id="change_mem_type" name="change_mem_type" onchange="change_member_type();">
									<option value="">Select Type</option>
									<option value="Silver">Silver</option>
									<option value="Gold">Gold</option>
									<option value="Platinum">Platinum</option>
								</select>
								<div class="fv-plugins-message-container invalid-feedback" id="change_mem_type_err"></div>
							</div>
							<!--begin::Label-->
							<label class="col-lg-4 col-form-label required fw-semibold fs-6" id="card_no_lab" style="display: none;">Card No</label>
							<!--end::Label-->
							<!--begin::Col-->
							<div class="col-lg-8" id="card_no_tbox" style="display: none;">
								<select class="form-select form-select-solid" data-control="select2"
									data-hide-search="true" id="change_mem_card_no" name="change_mem_card_no" onchange="change_member_card_no();">
									<option value="">Select Type</option>
									
								</select>
								<div class="fv-plugins-message-container invalid-feedback" id="change_mem_card_no_err"></div>
							</div>
							<label class="col-lg-4 col-form-label fw-semibold fs-6" id="exp_dt_lab" style="display: none;">Expiry Date</label>
							<div class="col-lg-8"  id="exp_dt_tbox" style="display: none;">
								<label class="col-form-label fw-bold fs-5" id="change_exp_date"></label>
								<input type="hidden" id="change_exp_date_hid" name="change_exp_date_hid">
							</div>
							<label class="col-lg-4 col-form-label fw-semibold fs-6" id="chge_add_points_lab" style="display: none;">Add Points</label>
							<div class="col-lg-8 fv-row fv-plugins-icon-container" id="chge_add_points_tbox" style="display: none;">
								<input type="text" name="chge_mem_add_points" id="chge_mem_add_points" class="form-control form-control-lg form-control-solid" placeholder="Points" >
							</div>
							<label class="col-lg-4 col-form-label fw-semibold fs-6" id="des_lab" style="display: none;">Description</label>
							<div class="col-lg-8 fv-row fv-plugins-icon-container" id="des_tbox" style="display: none;">
								<textarea class="form-control form-select-solid fw-semibold fs-5" id="change_mem_disc" name="change_mem_disc" rows="1"></textarea>
								<div class="fv-plugins-message-container invalid-feedback"></div>
							</div>
						</div>
						<!--End::Actions-->
						<div class="d-flex justify-content-center mt-4">
							<button type="reset" class="btn btn-secondary me-3" data-bs-dismiss="modal" onclick="close_chagne_mem_modal();">Cancel</button>
							<button type="submit" class="btn btn-primary" id="save_changes_change_mem">Change Membership</button>
						</div>
						<!--end::Modal body-->
						<input type="hidden" id="change_mem_edit" name="change_mem_edit" value="<?php echo $change_mem_details->PID;?>">
					</form>
				</div>
			</div>
			<!--end::Modal content-->
		</div>


<script>
		$('input:radio[name="change_plan_issue_new"]').change(function() {

			var issue_lab = document.getElementById("issue_lab");
			var issue_tbox = document.getElementById("issue_tbox");
			var type_lab = document.getElementById("type_lab");
			var type_tbox = document.getElementById("type_tbox");
			var card_no_lab = document.getElementById("card_no_lab");
			var card_no_tbox = document.getElementById("card_no_tbox");
			var exp_dt_lab = document.getElementById("exp_dt_lab");
			var exp_dt_tbox = document.getElementById("exp_dt_tbox");
			var chge_add_points_lab = document.getElementById("chge_add_points_lab");
			var chge_add_points_tbox = document.getElementById("chge_add_points_tbox");
			var des_lab = document.getElementById("des_lab");
			var des_tbox = document.getElementById("des_tbox");
			

		        if ($(this).val()=='change_plan_val') 
		        {
		        	issue_lab.style.display = "block";
					issue_tbox.style.display = "block";
					type_lab.style.display = "block";
					type_tbox.style.display = "block";
					card_no_lab.style.display = "block";
					card_no_tbox.style.display = "block";
					exp_dt_lab.style.display = "block";
					exp_dt_tbox.style.display = "block";
					chge_add_points_lab.style.display = "block";
					chge_add_points_tbox.style.display = "block";
					des_lab.style.display = "block";
					des_tbox.style.display = "block";
		        } else
		        {
		            issue_lab.style.display = "block";
					issue_tbox.style.display = "block";
					type_lab.style.display = "block";
					type_tbox.style.display = "block";
					card_no_lab.style.display = "block";
					card_no_tbox.style.display = "block";
					exp_dt_lab.style.display = "block";
					exp_dt_tbox.style.display = "block";
					chge_add_points_lab.style.display = "block";
					chge_add_points_tbox.style.display = "block";
					des_lab.style.display = "block";
					des_tbox.style.display = "block";
		        }
		    });
	</script>
	<script>
		$("#issue_date_change_mem").flatpickr({
			dateFormat: "<?php echo date('d-m-Y'); ?>",
			maxDate: "today",
		});
		$("#exp_date_change_mem").flatpickr({
			dateFormat: "d-m-Y",
		});
	</script>
	