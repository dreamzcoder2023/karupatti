<div class="row">
	<form enctype="multipart/form-data" id="remainderedit_form" method="POST"  action="<?php echo base_url(); ?>Remainder/update"  >
		<input type="hidden" name="edit_id" id="edit_id" value="<?php echo $edit->remainderid?$edit->remainderid:'';  ?>">
		<div class="row">
			<div class="col-lg-2">
				<label class="col-form-label required fw-semibold fs-6">Date</label>
			</div>
			<div class="col-lg-4 fv-row">
				<div class="d-flex align-items-center">
					<span class="svg-icon position-absolute ms-4 svg-icon-2 dt">
						<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path opacity="0.3" d="M21 22H3C2.4 22 2 21.6 2 21V5C2 4.4 2.4 4 3 4H21C21.6 4 22 4.4 22 5V21C22 21.6 21.6 22 21 22Z" fill="currentColor" />
							<path d="M6 6C5.4 6 5 5.6 5 5V3C5 2.4 5.4 2 6 2C6.6 2 7 2.4 7 3V5C7 5.6 6.6 6 6 6ZM11 5V3C11 2.4 10.6 2 10 2C9.4 2 9 2.4 9 3V5C9 5.6 9.4 6 10 6C10.6 6 11 5.6 11 5ZM15 5V3C15 2.4 14.6 2 14 2C13.4 2 13 2.4 13 3V5C13 5.6 13.4 6 14 6C14.6 6 15 5.6 15 5ZM19 5V3C19 2.4 18.6 2 18 2C17.4 2 17 2.4 17 3V5C17 5.6 17.4 6 18 6C18.6 6 19 5.6 19 5Z" fill="currentColor" />
							<path d="M8.8 13.1C9.2 13.1 9.5 13 9.7 12.8C9.9 12.6 10.1 12.3 10.1 11.9C10.1 11.6 10 11.3 9.8 11.1C9.6 10.9 9.3 10.8 9 10.8C8.8 10.8 8.59999 10.8 8.39999 10.9C8.19999 11 8.1 11.1 8 11.2C7.9 11.3 7.8 11.4 7.7 11.6C7.6 11.8 7.5 11.9 7.5 12.1C7.5 12.2 7.4 12.2 7.3 12.3C7.2 12.4 7.09999 12.4 6.89999 12.4C6.69999 12.4 6.6 12.3 6.5 12.2C6.4 12.1 6.3 11.9 6.3 11.7C6.3 11.5 6.4 11.3 6.5 11.1C6.6 10.9 6.8 10.7 7 10.5C7.2 10.3 7.49999 10.1 7.89999 10C8.29999 9.90003 8.60001 9.80003 9.10001 9.80003C9.50001 9.80003 9.80001 9.90003 10.1 10C10.4 10.1 10.7 10.3 10.9 10.4C11.1 10.5 11.3 10.8 11.4 11.1C11.5 11.4 11.6 11.6 11.6 11.9C11.6 12.3 11.5 12.6 11.3 12.9C11.1 13.2 10.9 13.5 10.6 13.7C10.9 13.9 11.2 14.1 11.4 14.3C11.6 14.5 11.8 14.7 11.9 15C12 15.3 12.1 15.5 12.1 15.8C12.1 16.2 12 16.5 11.9 16.8C11.8 17.1 11.5 17.4 11.3 17.7C11.1 18 10.7 18.2 10.3 18.3C9.9 18.4 9.5 18.5 9 18.5C8.5 18.5 8.1 18.4 7.7 18.2C7.3 18 7 17.8 6.8 17.6C6.6 17.4 6.4 17.1 6.3 16.8C6.2 16.5 6.10001 16.3 6.10001 16.1C6.10001 15.9 6.2 15.7 6.3 15.6C6.4 15.5 6.6 15.4 6.8 15.4C6.9 15.4 7.00001 15.4 7.10001 15.5C7.20001 15.6 7.3 15.6 7.3 15.7C7.5 16.2 7.7 16.6 8 16.9C8.3 17.2 8.6 17.3 9 17.3C9.2 17.3 9.5 17.2 9.7 17.1C9.9 17 10.1 16.8 10.3 16.6C10.5 16.4 10.5 16.1 10.5 15.8C10.5 15.3 10.4 15 10.1 14.7C9.80001 14.4 9.50001 14.3 9.10001 14.3C9.00001 14.3 8.9 14.3 8.7 14.3C8.5 14.3 8.39999 14.3 8.39999 14.3C8.19999 14.3 7.99999 14.2 7.89999 14.1C7.79999 14 7.7 13.8 7.7 13.7C7.7 13.5 7.79999 13.4 7.89999 13.2C7.99999 13 8.2 13 8.5 13H8.8V13.1ZM15.3 17.5V12.2C14.3 13 13.6 13.3 13.3 13.3C13.1 13.3 13 13.2 12.9 13.1C12.8 13 12.7 12.8 12.7 12.6C12.7 12.4 12.8 12.3 12.9 12.2C13 12.1 13.2 12 13.6 11.8C14.1 11.6 14.5 11.3 14.7 11.1C14.9 10.9 15.2 10.6 15.5 10.3C15.8 10 15.9 9.80003 15.9 9.70003C15.9 9.60003 16.1 9.60004 16.3 9.60004C16.5 9.60004 16.7 9.70003 16.8 9.80003C16.9 9.90003 17 10.2 17 10.5V17.2C17 18 16.7 18.4 16.2 18.4C16 18.4 15.8 18.3 15.6 18.2C15.4 18.1 15.3 17.8 15.3 17.5Z" fill="currentColor" />
						</svg>
					</span>
					<?php   
							$dates = $edit->date?$edit->date:date("d-m-Y");
							$remaindates = date("d-m-Y", strtotime($dates));										
					?>
					<input class="form-control form-control-solid ps-12" name="remainder_date_edit" placeholder="Schedule Date" id="remainder_date_edit" value="<?php echo $remaindates; ?>"/>
				</div>
				<div class="fv-plugins-message-container invalid-feedback" id="remainder_date_edit_err"></div>
			</div>
			<label class="col-lg-2 col-form-label required fw-semibold fs-6">Type</label>
			<div class="col-lg-4 fv-row">
				<select class="form-select form-select-solid" name="remain_type_edit" id="remain_type_edit" data-control="select2" data-hide-search="false" data-dropdown-parent="#kt_modal_edit_remainder" onchange="rem_type_func_edit();">
					<option value="">Select Type</option>
					<option value="1"<?php if ($edit->type==1) {echo 'selected';}?>>Self</option>
					<option value="2"<?php if ($edit->type==2) {echo 'selected';}?>>Others</option>
				</select>
				<div class="fv-plugins-message-container invalid-feedback" id="remain_type_edit_err"></div>
			</div>
			<label class="col-lg-2 col-form-label required fw-semibold fs-6" id="remain_type_lab_edit" style="display:none;">Allocate To</label>
			<div class="col-lg-4 fv-row" id="remain_type_tbox_edit" style="display:none;">
				<select class="form-select form-select-solid" name="allocatedto_edit[]" id="allocatedto_edit" data-control="select2" data-hide-search="false" data-dropdown-parent="#kt_modal_edit_remainder" multiple="multiple" data-placeholder="Select">
					<?php
							$allocated = $edit->allocatedto ? json_decode($edit->allocatedto) : [];

							if (isset($userlist)) {
							    foreach ($userlist as $ulist) {
							        $selected = in_array($ulist['USER_ID'], $allocated) ? 'selected' : '';
							        $staffname = ucfirst($ulist['STAFFNAME'] ?? '-');
							        $userId = $ulist['USER_ID'] ?? '';
							        echo "<option value=\"$userId\" $selected>$staffname</option>";
							    }
							}
					?>
				</select>
				<div class="fv-plugins-message-container invalid-feedback" id="allocatedto_edit_err"></div>
			</div>
			<label class="col-lg-2 col-form-label required fw-semibold fs-6">Recurring</label>
			<div class="col-lg-4 fv-row">
				<select class="form-select form-select-solid" name="recur_type_edit" id="recur_type_edit" data-control="select2" data-hide-search="false" data-dropdown-parent="#kt_modal_edit_remainder" onchange="recurring_func_edit();">
					<option value="">Select</option>
					<option value="1" <?php if ($edit->Recurringtype==1) {echo 'selected';}?>>Daily</option>
					<option value="2" <?php if ($edit->Recurringtype==2) {echo 'selected';}?>>Weekly</option>
					<option value="3" <?php if ($edit->Recurringtype==3) {echo 'selected';}?>>Monthly</option>
					<option value="4" <?php if ($edit->Recurringtype==4) {echo 'selected';}?>>Speicific Date</option>
				</select>
				<div class="fv-plugins-message-container invalid-feedback" id="recur_type_edit_err"></div>
			</div>
			<label class="col-lg-2 col-form-label required fw-semibold fs-6" id="remain_daily_lab_edit" style="display: none;">Daily</label>
			<div class="col-lg-4 fv-row" id="remain_daily_tbox_edit" style="display: none;">
				<div class="d-flex align-items-center">
					<span class="svg-icon position-absolute ms-4 svg-icon-2 dt">
						<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path opacity="0.3" d="M21 22H3C2.4 22 2 21.6 2 21V5C2 4.4 2.4 4 3 4H21C21.6 4 22 4.4 22 5V21C22 21.6 21.6 22 21 22Z" fill="currentColor" />
							<path d="M6 6C5.4 6 5 5.6 5 5V3C5 2.4 5.4 2 6 2C6.6 2 7 2.4 7 3V5C7 5.6 6.6 6 6 6ZM11 5V3C11 2.4 10.6 2 10 2C9.4 2 9 2.4 9 3V5C9 5.6 9.4 6 10 6C10.6 6 11 5.6 11 5ZM15 5V3C15 2.4 14.6 2 14 2C13.4 2 13 2.4 13 3V5C13 5.6 13.4 6 14 6C14.6 6 15 5.6 15 5ZM19 5V3C19 2.4 18.6 2 18 2C17.4 2 17 2.4 17 3V5C17 5.6 17.4 6 18 6C18.6 6 19 5.6 19 5Z" fill="currentColor" />
							<path d="M8.8 13.1C9.2 13.1 9.5 13 9.7 12.8C9.9 12.6 10.1 12.3 10.1 11.9C10.1 11.6 10 11.3 9.8 11.1C9.6 10.9 9.3 10.8 9 10.8C8.8 10.8 8.59999 10.8 8.39999 10.9C8.19999 11 8.1 11.1 8 11.2C7.9 11.3 7.8 11.4 7.7 11.6C7.6 11.8 7.5 11.9 7.5 12.1C7.5 12.2 7.4 12.2 7.3 12.3C7.2 12.4 7.09999 12.4 6.89999 12.4C6.69999 12.4 6.6 12.3 6.5 12.2C6.4 12.1 6.3 11.9 6.3 11.7C6.3 11.5 6.4 11.3 6.5 11.1C6.6 10.9 6.8 10.7 7 10.5C7.2 10.3 7.49999 10.1 7.89999 10C8.29999 9.90003 8.60001 9.80003 9.10001 9.80003C9.50001 9.80003 9.80001 9.90003 10.1 10C10.4 10.1 10.7 10.3 10.9 10.4C11.1 10.5 11.3 10.8 11.4 11.1C11.5 11.4 11.6 11.6 11.6 11.9C11.6 12.3 11.5 12.6 11.3 12.9C11.1 13.2 10.9 13.5 10.6 13.7C10.9 13.9 11.2 14.1 11.4 14.3C11.6 14.5 11.8 14.7 11.9 15C12 15.3 12.1 15.5 12.1 15.8C12.1 16.2 12 16.5 11.9 16.8C11.8 17.1 11.5 17.4 11.3 17.7C11.1 18 10.7 18.2 10.3 18.3C9.9 18.4 9.5 18.5 9 18.5C8.5 18.5 8.1 18.4 7.7 18.2C7.3 18 7 17.8 6.8 17.6C6.6 17.4 6.4 17.1 6.3 16.8C6.2 16.5 6.10001 16.3 6.10001 16.1C6.10001 15.9 6.2 15.7 6.3 15.6C6.4 15.5 6.6 15.4 6.8 15.4C6.9 15.4 7.00001 15.4 7.10001 15.5C7.20001 15.6 7.3 15.6 7.3 15.7C7.5 16.2 7.7 16.6 8 16.9C8.3 17.2 8.6 17.3 9 17.3C9.2 17.3 9.5 17.2 9.7 17.1C9.9 17 10.1 16.8 10.3 16.6C10.5 16.4 10.5 16.1 10.5 15.8C10.5 15.3 10.4 15 10.1 14.7C9.80001 14.4 9.50001 14.3 9.10001 14.3C9.00001 14.3 8.9 14.3 8.7 14.3C8.5 14.3 8.39999 14.3 8.39999 14.3C8.19999 14.3 7.99999 14.2 7.89999 14.1C7.79999 14 7.7 13.8 7.7 13.7C7.7 13.5 7.79999 13.4 7.89999 13.2C7.99999 13 8.2 13 8.5 13H8.8V13.1ZM15.3 17.5V12.2C14.3 13 13.6 13.3 13.3 13.3C13.1 13.3 13 13.2 12.9 13.1C12.8 13 12.7 12.8 12.7 12.6C12.7 12.4 12.8 12.3 12.9 12.2C13 12.1 13.2 12 13.6 11.8C14.1 11.6 14.5 11.3 14.7 11.1C14.9 10.9 15.2 10.6 15.5 10.3C15.8 10 15.9 9.80003 15.9 9.70003C15.9 9.60003 16.1 9.60004 16.3 9.60004C16.5 9.60004 16.7 9.70003 16.8 9.80003C16.9 9.90003 17 10.2 17 10.5V17.2C17 18 16.7 18.4 16.2 18.4C16 18.4 15.8 18.3 15.6 18.2C15.4 18.1 15.3 17.8 15.3 17.5Z" fill="currentColor" />
						</svg>
					</span>
					<?php   
						$re_daily = $edit->daily?$edit->daily:date("h:i A");
						$remaindaily = date("h:i A", strtotime($re_daily));						
					?>
					<input class="form-control form-control-solid ps-12" name="remainder_daily_edit" id="remainder_daily_edit" value="<?php echo $remaindaily; ?>" />
				</div>
				<div class="fv-plugins-message-container invalid-feedback" id="remainder_daily_edit_err"></div>
			</div>
			<label class="col-lg-2 col-form-label required fw-semibold fs-6" id="remain_monthly_lab_edit" style="display: none;">Monthly</label>
			<div class="col-lg-4 fv-row" id="remain_monthly_tbox_edit" style="display: none;">
				<div class="d-flex align-items-center">
					<span class="svg-icon position-absolute ms-4 svg-icon-2 dt">
						<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path opacity="0.3" d="M21 22H3C2.4 22 2 21.6 2 21V5C2 4.4 2.4 4 3 4H21C21.6 4 22 4.4 22 5V21C22 21.6 21.6 22 21 22Z" fill="currentColor" />
							<path d="M6 6C5.4 6 5 5.6 5 5V3C5 2.4 5.4 2 6 2C6.6 2 7 2.4 7 3V5C7 5.6 6.6 6 6 6ZM11 5V3C11 2.4 10.6 2 10 2C9.4 2 9 2.4 9 3V5C9 5.6 9.4 6 10 6C10.6 6 11 5.6 11 5ZM15 5V3C15 2.4 14.6 2 14 2C13.4 2 13 2.4 13 3V5C13 5.6 13.4 6 14 6C14.6 6 15 5.6 15 5ZM19 5V3C19 2.4 18.6 2 18 2C17.4 2 17 2.4 17 3V5C17 5.6 17.4 6 18 6C18.6 6 19 5.6 19 5Z" fill="currentColor" />
							<path d="M8.8 13.1C9.2 13.1 9.5 13 9.7 12.8C9.9 12.6 10.1 12.3 10.1 11.9C10.1 11.6 10 11.3 9.8 11.1C9.6 10.9 9.3 10.8 9 10.8C8.8 10.8 8.59999 10.8 8.39999 10.9C8.19999 11 8.1 11.1 8 11.2C7.9 11.3 7.8 11.4 7.7 11.6C7.6 11.8 7.5 11.9 7.5 12.1C7.5 12.2 7.4 12.2 7.3 12.3C7.2 12.4 7.09999 12.4 6.89999 12.4C6.69999 12.4 6.6 12.3 6.5 12.2C6.4 12.1 6.3 11.9 6.3 11.7C6.3 11.5 6.4 11.3 6.5 11.1C6.6 10.9 6.8 10.7 7 10.5C7.2 10.3 7.49999 10.1 7.89999 10C8.29999 9.90003 8.60001 9.80003 9.10001 9.80003C9.50001 9.80003 9.80001 9.90003 10.1 10C10.4 10.1 10.7 10.3 10.9 10.4C11.1 10.5 11.3 10.8 11.4 11.1C11.5 11.4 11.6 11.6 11.6 11.9C11.6 12.3 11.5 12.6 11.3 12.9C11.1 13.2 10.9 13.5 10.6 13.7C10.9 13.9 11.2 14.1 11.4 14.3C11.6 14.5 11.8 14.7 11.9 15C12 15.3 12.1 15.5 12.1 15.8C12.1 16.2 12 16.5 11.9 16.8C11.8 17.1 11.5 17.4 11.3 17.7C11.1 18 10.7 18.2 10.3 18.3C9.9 18.4 9.5 18.5 9 18.5C8.5 18.5 8.1 18.4 7.7 18.2C7.3 18 7 17.8 6.8 17.6C6.6 17.4 6.4 17.1 6.3 16.8C6.2 16.5 6.10001 16.3 6.10001 16.1C6.10001 15.9 6.2 15.7 6.3 15.6C6.4 15.5 6.6 15.4 6.8 15.4C6.9 15.4 7.00001 15.4 7.10001 15.5C7.20001 15.6 7.3 15.6 7.3 15.7C7.5 16.2 7.7 16.6 8 16.9C8.3 17.2 8.6 17.3 9 17.3C9.2 17.3 9.5 17.2 9.7 17.1C9.9 17 10.1 16.8 10.3 16.6C10.5 16.4 10.5 16.1 10.5 15.8C10.5 15.3 10.4 15 10.1 14.7C9.80001 14.4 9.50001 14.3 9.10001 14.3C9.00001 14.3 8.9 14.3 8.7 14.3C8.5 14.3 8.39999 14.3 8.39999 14.3C8.19999 14.3 7.99999 14.2 7.89999 14.1C7.79999 14 7.7 13.8 7.7 13.7C7.7 13.5 7.79999 13.4 7.89999 13.2C7.99999 13 8.2 13 8.5 13H8.8V13.1ZM15.3 17.5V12.2C14.3 13 13.6 13.3 13.3 13.3C13.1 13.3 13 13.2 12.9 13.1C12.8 13 12.7 12.8 12.7 12.6C12.7 12.4 12.8 12.3 12.9 12.2C13 12.1 13.2 12 13.6 11.8C14.1 11.6 14.5 11.3 14.7 11.1C14.9 10.9 15.2 10.6 15.5 10.3C15.8 10 15.9 9.80003 15.9 9.70003C15.9 9.60003 16.1 9.60004 16.3 9.60004C16.5 9.60004 16.7 9.70003 16.8 9.80003C16.9 9.90003 17 10.2 17 10.5V17.2C17 18 16.7 18.4 16.2 18.4C16 18.4 15.8 18.3 15.6 18.2C15.4 18.1 15.3 17.8 15.3 17.5Z" fill="currentColor" />
						</svg>
					</span>
					<?php   
						$re_monthly = $edit->month?$edit->month:date("d-m-Y h:i A");
						$remainmonthly = date("Y-m-d h:i A", strtotime($re_monthly));						
					?>
					<input class="form-control form-control-solid ps-12" name="remainder_monthly_edit" id="remainder_monthly_edit" value="<?php echo $remainmonthly; ?>" />
				</div>
				<div class="fv-plugins-message-container invalid-feedback" id="remainder_monthly_edit_err"></div>
			</div>
			<label class="col-lg-2 col-form-label required fw-semibold fs-6" id="remain_spec_dt_lab_edit" style="display: none;">Spec.Date</label>
			<div class="col-lg-4 fv-row" id="remain_spec_dt_tbox_edit" style="display: none;">
				<div class="d-flex align-items-center">
					<span class="svg-icon position-absolute ms-4 svg-icon-2 dt">
						<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path opacity="0.3" d="M21 22H3C2.4 22 2 21.6 2 21V5C2 4.4 2.4 4 3 4H21C21.6 4 22 4.4 22 5V21C22 21.6 21.6 22 21 22Z" fill="currentColor" />
							<path d="M6 6C5.4 6 5 5.6 5 5V3C5 2.4 5.4 2 6 2C6.6 2 7 2.4 7 3V5C7 5.6 6.6 6 6 6ZM11 5V3C11 2.4 10.6 2 10 2C9.4 2 9 2.4 9 3V5C9 5.6 9.4 6 10 6C10.6 6 11 5.6 11 5ZM15 5V3C15 2.4 14.6 2 14 2C13.4 2 13 2.4 13 3V5C13 5.6 13.4 6 14 6C14.6 6 15 5.6 15 5ZM19 5V3C19 2.4 18.6 2 18 2C17.4 2 17 2.4 17 3V5C17 5.6 17.4 6 18 6C18.6 6 19 5.6 19 5Z" fill="currentColor" />
							<path d="M8.8 13.1C9.2 13.1 9.5 13 9.7 12.8C9.9 12.6 10.1 12.3 10.1 11.9C10.1 11.6 10 11.3 9.8 11.1C9.6 10.9 9.3 10.8 9 10.8C8.8 10.8 8.59999 10.8 8.39999 10.9C8.19999 11 8.1 11.1 8 11.2C7.9 11.3 7.8 11.4 7.7 11.6C7.6 11.8 7.5 11.9 7.5 12.1C7.5 12.2 7.4 12.2 7.3 12.3C7.2 12.4 7.09999 12.4 6.89999 12.4C6.69999 12.4 6.6 12.3 6.5 12.2C6.4 12.1 6.3 11.9 6.3 11.7C6.3 11.5 6.4 11.3 6.5 11.1C6.6 10.9 6.8 10.7 7 10.5C7.2 10.3 7.49999 10.1 7.89999 10C8.29999 9.90003 8.60001 9.80003 9.10001 9.80003C9.50001 9.80003 9.80001 9.90003 10.1 10C10.4 10.1 10.7 10.3 10.9 10.4C11.1 10.5 11.3 10.8 11.4 11.1C11.5 11.4 11.6 11.6 11.6 11.9C11.6 12.3 11.5 12.6 11.3 12.9C11.1 13.2 10.9 13.5 10.6 13.7C10.9 13.9 11.2 14.1 11.4 14.3C11.6 14.5 11.8 14.7 11.9 15C12 15.3 12.1 15.5 12.1 15.8C12.1 16.2 12 16.5 11.9 16.8C11.8 17.1 11.5 17.4 11.3 17.7C11.1 18 10.7 18.2 10.3 18.3C9.9 18.4 9.5 18.5 9 18.5C8.5 18.5 8.1 18.4 7.7 18.2C7.3 18 7 17.8 6.8 17.6C6.6 17.4 6.4 17.1 6.3 16.8C6.2 16.5 6.10001 16.3 6.10001 16.1C6.10001 15.9 6.2 15.7 6.3 15.6C6.4 15.5 6.6 15.4 6.8 15.4C6.9 15.4 7.00001 15.4 7.10001 15.5C7.20001 15.6 7.3 15.6 7.3 15.7C7.5 16.2 7.7 16.6 8 16.9C8.3 17.2 8.6 17.3 9 17.3C9.2 17.3 9.5 17.2 9.7 17.1C9.9 17 10.1 16.8 10.3 16.6C10.5 16.4 10.5 16.1 10.5 15.8C10.5 15.3 10.4 15 10.1 14.7C9.80001 14.4 9.50001 14.3 9.10001 14.3C9.00001 14.3 8.9 14.3 8.7 14.3C8.5 14.3 8.39999 14.3 8.39999 14.3C8.19999 14.3 7.99999 14.2 7.89999 14.1C7.79999 14 7.7 13.8 7.7 13.7C7.7 13.5 7.79999 13.4 7.89999 13.2C7.99999 13 8.2 13 8.5 13H8.8V13.1ZM15.3 17.5V12.2C14.3 13 13.6 13.3 13.3 13.3C13.1 13.3 13 13.2 12.9 13.1C12.8 13 12.7 12.8 12.7 12.6C12.7 12.4 12.8 12.3 12.9 12.2C13 12.1 13.2 12 13.6 11.8C14.1 11.6 14.5 11.3 14.7 11.1C14.9 10.9 15.2 10.6 15.5 10.3C15.8 10 15.9 9.80003 15.9 9.70003C15.9 9.60003 16.1 9.60004 16.3 9.60004C16.5 9.60004 16.7 9.70003 16.8 9.80003C16.9 9.90003 17 10.2 17 10.5V17.2C17 18 16.7 18.4 16.2 18.4C16 18.4 15.8 18.3 15.6 18.2C15.4 18.1 15.3 17.8 15.3 17.5Z" fill="currentColor" />
						</svg>
					</span>
					
					<?php   
						$re_specdate = $edit->specificday?$edit->specificday:date("d-m-Y h:i A");
						$remainspecdate = date("Y-m-d h:i A", strtotime($re_specdate));						
					?>
					<input class="form-control form-control-solid ps-12" name="remainder_speicific_date_edit" placeholder="Schedule Date" id="remainder_speicific_date_edit" value="<?php echo $remainspecdate; ?>"/>
				</div>
				<div class="fv-plugins-message-container invalid-feedback" id="remainder_speicific_date_edit_err"></div>
			</div>
			<label class="col-lg-2 col-form-label required fw-semibold fs-6" id="remain_weekly_day_lab_edit" style="display:none;">Day</label>
			<div class="col-lg-4 fv-row" id="remain_weekly_day_tbox_edit" style="display:none;">
				<select class="form-select form-select-solid" name="weekdays_edit[]" id="weekdays_edit" data-control="select2" data-hide-search="false" data-dropdown-parent="#kt_modal_edit_remainder" multiple="multiple" data-placeholder="Select">

					<?php
					$weekdays = json_decode($edit->weekdays ? $edit->weekdays : '[""]', true);

						$days = [
						    0 => "All",
						    1 => "Sunday",
						    2 => "Monday",
						    3 => "Tuesday",
						    4 => "Wednesday",
						    5 => "Thursday",
						    6 => "Friday",
						    7 => "Saturday"
						];

					?>

					<option value="">Select</option>
					<?php foreach ($days as $key => $day) { ?>
					     <option value="<?php echo $key; ?>" <?php if (in_array($key, (array)$weekdays)) { echo 'selected'; } ?>><?php echo $day; ?></option>
					<?php } ?>


				</select>
				
				<div class="fv-plugins-message-container invalid-feedback" id="weekdays_edit_err"></div>
			</div>
			<label class="col-lg-2 col-form-label required fw-semibold fs-6" id="remain_weekly_time_lab_edit" style="display: none;">Weekly</label>
			<div class="col-lg-4 fv-row" id="remain_weekly_time_tbox_edit" style="display: none;">
				<div class="d-flex align-items-center">
					<span class="svg-icon position-absolute ms-4 svg-icon-2 dt">
						<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path opacity="0.3" d="M21 22H3C2.4 22 2 21.6 2 21V5C2 4.4 2.4 4 3 4H21C21.6 4 22 4.4 22 5V21C22 21.6 21.6 22 21 22Z" fill="currentColor" />
							<path d="M6 6C5.4 6 5 5.6 5 5V3C5 2.4 5.4 2 6 2C6.6 2 7 2.4 7 3V5C7 5.6 6.6 6 6 6ZM11 5V3C11 2.4 10.6 2 10 2C9.4 2 9 2.4 9 3V5C9 5.6 9.4 6 10 6C10.6 6 11 5.6 11 5ZM15 5V3C15 2.4 14.6 2 14 2C13.4 2 13 2.4 13 3V5C13 5.6 13.4 6 14 6C14.6 6 15 5.6 15 5ZM19 5V3C19 2.4 18.6 2 18 2C17.4 2 17 2.4 17 3V5C17 5.6 17.4 6 18 6C18.6 6 19 5.6 19 5Z" fill="currentColor" />
							<path d="M8.8 13.1C9.2 13.1 9.5 13 9.7 12.8C9.9 12.6 10.1 12.3 10.1 11.9C10.1 11.6 10 11.3 9.8 11.1C9.6 10.9 9.3 10.8 9 10.8C8.8 10.8 8.59999 10.8 8.39999 10.9C8.19999 11 8.1 11.1 8 11.2C7.9 11.3 7.8 11.4 7.7 11.6C7.6 11.8 7.5 11.9 7.5 12.1C7.5 12.2 7.4 12.2 7.3 12.3C7.2 12.4 7.09999 12.4 6.89999 12.4C6.69999 12.4 6.6 12.3 6.5 12.2C6.4 12.1 6.3 11.9 6.3 11.7C6.3 11.5 6.4 11.3 6.5 11.1C6.6 10.9 6.8 10.7 7 10.5C7.2 10.3 7.49999 10.1 7.89999 10C8.29999 9.90003 8.60001 9.80003 9.10001 9.80003C9.50001 9.80003 9.80001 9.90003 10.1 10C10.4 10.1 10.7 10.3 10.9 10.4C11.1 10.5 11.3 10.8 11.4 11.1C11.5 11.4 11.6 11.6 11.6 11.9C11.6 12.3 11.5 12.6 11.3 12.9C11.1 13.2 10.9 13.5 10.6 13.7C10.9 13.9 11.2 14.1 11.4 14.3C11.6 14.5 11.8 14.7 11.9 15C12 15.3 12.1 15.5 12.1 15.8C12.1 16.2 12 16.5 11.9 16.8C11.8 17.1 11.5 17.4 11.3 17.7C11.1 18 10.7 18.2 10.3 18.3C9.9 18.4 9.5 18.5 9 18.5C8.5 18.5 8.1 18.4 7.7 18.2C7.3 18 7 17.8 6.8 17.6C6.6 17.4 6.4 17.1 6.3 16.8C6.2 16.5 6.10001 16.3 6.10001 16.1C6.10001 15.9 6.2 15.7 6.3 15.6C6.4 15.5 6.6 15.4 6.8 15.4C6.9 15.4 7.00001 15.4 7.10001 15.5C7.20001 15.6 7.3 15.6 7.3 15.7C7.5 16.2 7.7 16.6 8 16.9C8.3 17.2 8.6 17.3 9 17.3C9.2 17.3 9.5 17.2 9.7 17.1C9.9 17 10.1 16.8 10.3 16.6C10.5 16.4 10.5 16.1 10.5 15.8C10.5 15.3 10.4 15 10.1 14.7C9.80001 14.4 9.50001 14.3 9.10001 14.3C9.00001 14.3 8.9 14.3 8.7 14.3C8.5 14.3 8.39999 14.3 8.39999 14.3C8.19999 14.3 7.99999 14.2 7.89999 14.1C7.79999 14 7.7 13.8 7.7 13.7C7.7 13.5 7.79999 13.4 7.89999 13.2C7.99999 13 8.2 13 8.5 13H8.8V13.1ZM15.3 17.5V12.2C14.3 13 13.6 13.3 13.3 13.3C13.1 13.3 13 13.2 12.9 13.1C12.8 13 12.7 12.8 12.7 12.6C12.7 12.4 12.8 12.3 12.9 12.2C13 12.1 13.2 12 13.6 11.8C14.1 11.6 14.5 11.3 14.7 11.1C14.9 10.9 15.2 10.6 15.5 10.3C15.8 10 15.9 9.80003 15.9 9.70003C15.9 9.60003 16.1 9.60004 16.3 9.60004C16.5 9.60004 16.7 9.70003 16.8 9.80003C16.9 9.90003 17 10.2 17 10.5V17.2C17 18 16.7 18.4 16.2 18.4C16 18.4 15.8 18.3 15.6 18.2C15.4 18.1 15.3 17.8 15.3 17.5Z" fill="currentColor" />
						</svg>
					</span>
					<?php   
						$re_week = $edit->week?$edit->week:date("h:i A");
						$remainweek = date("h:i A", strtotime($re_week));						
					?>
					<input class="form-control form-control-solid ps-12" name="remainder_weekly_time_edit" id="remainder_weekly_time_edit" value="<?php echo $remainweek; ?>" />
				</div>
				<div class="fv-plugins-message-container invalid-feedback" id="remainder_weekly_time_edit_err"></div>
			</div>
		</div>
		<div class="row">
			<label class="col-lg-2 col-form-label required fw-semibold fs-6">Description</label>
			<div class="col-lg-10 fv-row">
				<textarea class="form-control form-control-solid" rows="3" placeholder="Enter Description" name="remainder_descedit" id="remainder_descedit"><?php echo $edit->description?$edit->description:'-'; ?></textarea>
				<div class="fv-plugins-message-container invalid-feedback" id="remainder_descedit_err"></div>
			</div>
		</div>
		<div class="d-flex justify-content-end align-items-center mt-6">
			<button type="reset" class="btn btn-secondary me-3" data-bs-dismiss="modal" >Cancel</button>
			<button type="button" class="btn btn-primary" id="edit_submit_btn" onclick="editvalidation()">Update</button>
		</div>
	</form>
</div>
<div id="script_commend_div">
<input type="hidden" id="baseurl" value="<?php echo base_url();?>">
<?php $this->load->view("script.php");?>
</div>
<script src="<?php echo base_url(); ?>assets/plugins/custom/fslightbox/fslightbox.bundle.js"></script>

    <script>
		rem_type_func_edit()
			function rem_type_func_edit()
			{
				var remain_type_edit = document.getElementById("remain_type_edit").value;
				var remain_type_lab_edit = document.getElementById("remain_type_lab_edit");
				var remain_type_tbox_edit = document.getElementById("remain_type_tbox_edit");

				if (remain_type_edit == 1) 
				{
					remain_type_lab_edit.style.display="none";
					remain_type_tbox_edit.style.display="none";
				}
				else if (remain_type_edit == 2) 
				{
					remain_type_lab_edit.style.display="block";
					remain_type_tbox_edit.style.display="block";	
				}
			}
	</script>
	<script>
		recurring_func_edit()
		function recurring_func_edit()
		{
			var recur_type_edit = document.getElementById("recur_type_edit").value;
			var remain_daily_lab_edit = document.getElementById("remain_daily_lab_edit");
			var remain_daily_tbox_edit = document.getElementById("remain_daily_tbox_edit");
			var remain_weekly_day_lab_edit = document.getElementById("remain_weekly_day_lab_edit");
			var remain_weekly_day_tbox_edit = document.getElementById("remain_weekly_day_tbox_edit");
			var remain_weekly_time_lab_edit = document.getElementById("remain_weekly_time_lab_edit");
			var remain_weekly_time_tbox_edit = document.getElementById("remain_weekly_time_tbox_edit");
			var remain_monthly_lab_edit = document.getElementById("remain_monthly_lab_edit");
			var remain_monthly_tbox_edit = document.getElementById("remain_monthly_tbox_edit");
			var remain_spec_dt_lab_edit = document.getElementById("remain_spec_dt_lab_edit");
			var remain_spec_dt_tbox_edit = document.getElementById("remain_spec_dt_tbox_edit");
			
			if (recur_type_edit == 1) 
			{
				remain_daily_lab_edit.style.display="block";
				remain_daily_tbox_edit.style.display="block";
				remain_weekly_day_lab_edit.style.display="none";
				remain_weekly_day_tbox_edit.style.display="none";
				remain_weekly_time_lab_edit.style.display="none";
				remain_weekly_time_tbox_edit.style.display="none";
				
				remain_monthly_lab_edit.style.display="none";
				remain_monthly_tbox_edit.style.display="none";
				remain_spec_dt_lab_edit.style.display="none";
				remain_spec_dt_tbox_edit.style.display="none";
			}
			else if (recur_type_edit == 2) 
			{
				remain_daily_lab_edit.style.display="none";
				remain_daily_tbox_edit.style.display="none";
				remain_weekly_day_lab_edit.style.display="block";
				remain_weekly_day_tbox_edit.style.display="block";
				remain_weekly_time_lab_edit.style.display="block";
				remain_weekly_time_tbox_edit.style.display="block";
				
				remain_monthly_lab_edit.style.display="none";
				remain_monthly_tbox_edit.style.display="none";
				remain_spec_dt_lab_edit.style.display="none";
				remain_spec_dt_tbox_edit.style.display="none";
			}
			else if (recur_type_edit == 3) 
			{
				remain_daily_lab_edit.style.display="none";
				remain_daily_tbox_edit.style.display="none";
				remain_weekly_day_lab_edit.style.display="none";
				remain_weekly_day_tbox_edit.style.display="none";
				remain_weekly_time_lab_edit.style.display="none";
				remain_weekly_time_tbox_edit.style.display="none";
				
				remain_monthly_lab_edit.style.display="block";
				remain_monthly_tbox_edit.style.display="block";
				remain_spec_dt_lab_edit.style.display="none";
				remain_spec_dt_tbox_edit.style.display="none";
			}
			else if (recur_type_edit == 4) 
			{
				remain_daily_lab_edit.style.display="none";
				remain_daily_tbox_edit.style.display="none";
				remain_weekly_day_lab_edit.style.display="none";
				remain_weekly_day_tbox_edit.style.display="none";
				remain_weekly_time_lab_edit.style.display="none";
				remain_weekly_time_tbox_edit.style.display="none";
				
				remain_monthly_lab_edit.style.display="none";
				remain_monthly_tbox_edit.style.display="none";
				remain_spec_dt_lab_edit.style.display="block";
				remain_spec_dt_tbox_edit.style.display="block";
			}

		}
	</script>
	<script>

		var remainder_daily_edit = "<?php echo $edit->daily ? $edit->daily:date("h:i A"); ?>";
		var dailyedit = {
		  enableTime: true,
		  noCalendar: true,
		  altInput: true,
		  altFormat: "h:i K",
		  defaultDate: remainder_daily_edit
		};

		var test = flatpickr("#remainder_daily_edit", dailyedit);
	</script>
	</script>
	<script>
		 // $('#kt_modal_edit_remainder').on('show.bs.modal', function (e) {
		var remainder_week_edit = "<?php echo $edit->week ? $edit->week:date("h:i A"); ?>";
			  var editweekly_time = {
			       enableTime: true,
				  noCalendar: true,
				  altInput: true,
				  altFormat: "h:i K",
			      defaultDate: remainder_week_edit
			  };
			var test = flatpickr("#remainder_weekly_time_edit", editweekly_time);
			// });
	</script>	
	<script>
			 var editspecificday = "<?php echo $edit->specificday ? $edit->specificday : date('d-m-Y h:i A'); ?>";
				var editspec_date = {
				    enableTime: true,
				    altInput: true,
				    time_12hr: false,
				    altFormat: "d-m-Y h:i K",
				    defaultDate: editspecificday // Corrected variable name
				};
				var test = flatpickr("#remainder_speicific_date_edit", editspec_date); // Corrected variable name
				$("#remainder_date_edit").flatpickr({
				    dateFormat: "d-m-Y",
				    maxDate: "today"
				});
	</script>
	<script>		 
	 	 var remain_monthly = "<?php echo $edit->month ? $edit->month : date("d-m-Y h:i A"); ?>";
			var editmonthly = {
			    enableTime: true,
			    altInput: true,
			    time_12hr: false,
			    altFormat: "d-m-Y h:i K",
			    defaultDate: remain_monthly
			};
		flatpickr("#remainder_monthly_edit", editmonthly);
	</script>
		
	
	<script> 
			function  editvalidation(){
				var err = 0;

				var remainder_date_edit      = $('#remainder_date_edit').val();
				var remain_type_edit         = $('#remain_type_edit').val();
				var allocatedto_edit         = $('#allocatedto_edit').val();
				var remainder_descedit       = $('#remainder_descedit').val();
				var recur_type_edit                 = $('#recur_type_edit').val();
				var remainder_daily_edit       = $('#remainder_daily_edit').val();
				var remainder_monthly_edit          = $('#remainder_monthly_edit').val();
				var remainder_speicific_date_edit_err   = $('#remainder_speicific_date_edit_err').val();
				var remainder_weekly_time_edit      = $('#remainder_weekly_time_edit').val();
				var weekdays_edit                   = $('#weekdays_edit').val();

					if(remainder_date_edit.trim()==""){
					
						$('#remainder_date_edit_err').html('Select Date is Required..!');		

						err++;
					}
					else{
						$('#remainder_date_edit_err').html('');
					}

					if (err==0) {
						if(remain_type_edit.trim()==""){

							$('#remain_type_edit_err').html('Select Type is Required..!');		

							err++;
						}
						else{
							$('#remain_type_edit_err').html('');
						}

					}
					if (err==0) {
						if (remain_type_edit==2) {

							if(allocatedto_edit==""){
							$('#allocatedto_edit_err').html('Select Allocated To is Required..!');		

								err++;
							}
							else{
								$('#allocatedto_edit_err').html('');
							}

						}
					}
					if (err==0) {	
						if(recur_type_edit.trim()==""){
							$('#recur_type_edit_err').html('Select Recurring is Required..!');		

							err++;
						}
						else{
							$('#recur_type_edit_err').html('');
						}
					}
					
					if (err==0) {
						if (recur_type_edit==1) {
							if(remainder_daily_edit.trim()==""){
								$('#remainder_daily_edit_err').html('Select daily time is Required..!');		

								err++;
							}
							else{
								$('#remainder_daily_edit_err').html('');
							}
						}
					}
					if (err==0) {
						if (recur_type_edit==2) {

							if(weekdays_edit==""){

								$('#weekdays_edit_err').html('Select weekly days is Required..!');		

								err++;
							}
							else{
								$('#weekdays_edit_err').html('');
							}

							if(remainder_weekly_time_edit.trim()==""){
								$('#remainder_weekly_time_edit_err').html('Select weekly time is Required..!');		

								err++;
							}
							else{
								$('#remainder_weekly_time_edit_err').html('');
							}

							
						}
					}
					if (err==0) {
						if (recur_type_edit==3) {
							if(remainder_monthly_edit.trim()==""){
								$('#remainder_monthly_edit_err').html('Select  monthly date & time is Required..!');		

								err++;
							}
							else{
								$('#remainder_monthly_edit_err').html('');
							}
						}
					}
					if (err==0) {
						if (recur_type_edit==4) {
							if(remainder_speicific_date_edit_err.trim()==""){
								$('#remainder_speicific_date_edit_err_err').html('Select Speicific Date is Required..!');		

								err++;
							}
							else{
								$('#remainder_speicific_date_edit_err_err').html('');
							}
						}
					}
					
					
					if (err==0) {
						if(remainder_descedit.trim()==""){
							$('#remainder_descedit_err').html('Enter Description is Required..!');		

							err++;
						}
						else{
							$('#remainder_descedit_err').html('');
						}
					}

					// alert(err)
					if (err>0) { return false; }
					else{ 

						  $("#remainderedit_form").submit();
						  $('#edit_submit_btn').prop('disabled', true);
						  e.preventDefault();						
						  return true;
					} 

			}
		</script>