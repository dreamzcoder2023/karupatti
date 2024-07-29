	
	<!--begin::Modal dialog-->
		<div class="modal-dialog modal-md">
			<!--begin::Modal content-->
			<div class="modal-content rounded">
				<!--begin::Modal header-->
				<div class="modal-header justify-content-end border-0 pb-0" style="padding:0px !important;">
					<!--begin::Close-->
					<button type="button" class="btn btn-sm btn-icon btn-active-color-primary close" data-bs-dismiss="modal" aria-label="Close">
						<!-- <span class="svg-icon svg-icon-1">
							<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
								<rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="currentColor" />
								<rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="currentColor" />
							</svg>
						</span> -->
					</button>
					<!--end::Close-->
				</div>
				<!--end::Modal header-->
				<!--begin::Modal body-->
				<div class="modal-body pt-0 pb-15 px-5 px-xl-20">
					<!--begin::Heading-->
					<div class="mb-3 text-center">
						<h1 class="mb-3">Update Announcements</h1>
					</div>
					<!--end::Heading-->
					<form method="POST" action="<?php echo base_url(); ?>Announcement/update" enctype="multipart/form-data" onsubmit="return editvalidation();">
						<input type="hidden" id="edit_id" name="edit_id" value="<?php echo $edit->id?$edit->id:'';?>">
						<div class="row">
							<label class="col-lg-4 col-form-label required fw-semibold fs-6">Start Date</label>
							<div class="col-lg-8">
								<div class="d-flex align-items-center">
									<span class="svg-icon position-absolute ms-4 svg-icon-2 dt">
										<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
											<path opacity="0.3" d="M21 22H3C2.4 22 2 21.6 2 21V5C2 4.4 2.4 4 3 4H21C21.6 4 22 4.4 22 5V21C22 21.6 21.6 22 21 22Z" fill="currentColor" />
											<path d="M6 6C5.4 6 5 5.6 5 5V3C5 2.4 5.4 2 6 2C6.6 2 7 2.4 7 3V5C7 5.6 6.6 6 6 6ZM11 5V3C11 2.4 10.6 2 10 2C9.4 2 9 2.4 9 3V5C9 5.6 9.4 6 10 6C10.6 6 11 5.6 11 5ZM15 5V3C15 2.4 14.6 2 14 2C13.4 2 13 2.4 13 3V5C13 5.6 13.4 6 14 6C14.6 6 15 5.6 15 5ZM19 5V3C19 2.4 18.6 2 18 2C17.4 2 17 2.4 17 3V5C17 5.6 17.4 6 18 6C18.6 6 19 5.6 19 5Z" fill="currentColor" />
											<path d="M8.8 13.1C9.2 13.1 9.5 13 9.7 12.8C9.9 12.6 10.1 12.3 10.1 11.9C10.1 11.6 10 11.3 9.8 11.1C9.6 10.9 9.3 10.8 9 10.8C8.8 10.8 8.59999 10.8 8.39999 10.9C8.19999 11 8.1 11.1 8 11.2C7.9 11.3 7.8 11.4 7.7 11.6C7.6 11.8 7.5 11.9 7.5 12.1C7.5 12.2 7.4 12.2 7.3 12.3C7.2 12.4 7.09999 12.4 6.89999 12.4C6.69999 12.4 6.6 12.3 6.5 12.2C6.4 12.1 6.3 11.9 6.3 11.7C6.3 11.5 6.4 11.3 6.5 11.1C6.6 10.9 6.8 10.7 7 10.5C7.2 10.3 7.49999 10.1 7.89999 10C8.29999 9.90003 8.60001 9.80003 9.10001 9.80003C9.50001 9.80003 9.80001 9.90003 10.1 10C10.4 10.1 10.7 10.3 10.9 10.4C11.1 10.5 11.3 10.8 11.4 11.1C11.5 11.4 11.6 11.6 11.6 11.9C11.6 12.3 11.5 12.6 11.3 12.9C11.1 13.2 10.9 13.5 10.6 13.7C10.9 13.9 11.2 14.1 11.4 14.3C11.6 14.5 11.8 14.7 11.9 15C12 15.3 12.1 15.5 12.1 15.8C12.1 16.2 12 16.5 11.9 16.8C11.8 17.1 11.5 17.4 11.3 17.7C11.1 18 10.7 18.2 10.3 18.3C9.9 18.4 9.5 18.5 9 18.5C8.5 18.5 8.1 18.4 7.7 18.2C7.3 18 7 17.8 6.8 17.6C6.6 17.4 6.4 17.1 6.3 16.8C6.2 16.5 6.10001 16.3 6.10001 16.1C6.10001 15.9 6.2 15.7 6.3 15.6C6.4 15.5 6.6 15.4 6.8 15.4C6.9 15.4 7.00001 15.4 7.10001 15.5C7.20001 15.6 7.3 15.6 7.3 15.7C7.5 16.2 7.7 16.6 8 16.9C8.3 17.2 8.6 17.3 9 17.3C9.2 17.3 9.5 17.2 9.7 17.1C9.9 17 10.1 16.8 10.3 16.6C10.5 16.4 10.5 16.1 10.5 15.8C10.5 15.3 10.4 15 10.1 14.7C9.80001 14.4 9.50001 14.3 9.10001 14.3C9.00001 14.3 8.9 14.3 8.7 14.3C8.5 14.3 8.39999 14.3 8.39999 14.3C8.19999 14.3 7.99999 14.2 7.89999 14.1C7.79999 14 7.7 13.8 7.7 13.7C7.7 13.5 7.79999 13.4 7.89999 13.2C7.99999 13 8.2 13 8.5 13H8.8V13.1ZM15.3 17.5V12.2C14.3 13 13.6 13.3 13.3 13.3C13.1 13.3 13 13.2 12.9 13.1C12.8 13 12.7 12.8 12.7 12.6C12.7 12.4 12.8 12.3 12.9 12.2C13 12.1 13.2 12 13.6 11.8C14.1 11.6 14.5 11.3 14.7 11.1C14.9 10.9 15.2 10.6 15.5 10.3C15.8 10 15.9 9.80003 15.9 9.70003C15.9 9.60003 16.1 9.60004 16.3 9.60004C16.5 9.60004 16.7 9.70003 16.8 9.80003C16.9 9.90003 17 10.2 17 10.5V17.2C17 18 16.7 18.4 16.2 18.4C16 18.4 15.8 18.3 15.6 18.2C15.4 18.1 15.3 17.8 15.3 17.5Z" fill="currentColor" />
										</svg>
									</span>
									<?php   
											$date = $edit->startdate?$edit->startdate:date("d-m-Y h:i A");
											$startedate = date("Y-m-d h:i", strtotime($date));										
									?>
									<input type="datetime-local" class="form-control form-control-solid ps-12" name="ancts_start_date_edit" placeholder="Start Date" id="ancts_start_date_edit" value="<?php echo $startedate; ?>"/>
								</div>
								<div class="fv-plugins-message-container invalid-feedback" id="ancts_start_date_edit_err"></div>
							</div>

							
							<label class="col-lg-4 col-form-label required fw-semibold fs-6">End Date</label>
							<div class="col-lg-8">
								<div class="d-flex align-items-center">
									<span class="svg-icon position-absolute ms-4 svg-icon-2 dt">
										<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
											<path opacity="0.3" d="M21 22H3C2.4 22 2 21.6 2 21V5C2 4.4 2.4 4 3 4H21C21.6 4 22 4.4 22 5V21C22 21.6 21.6 22 21 22Z" fill="currentColor" />
											<path d="M6 6C5.4 6 5 5.6 5 5V3C5 2.4 5.4 2 6 2C6.6 2 7 2.4 7 3V5C7 5.6 6.6 6 6 6ZM11 5V3C11 2.4 10.6 2 10 2C9.4 2 9 2.4 9 3V5C9 5.6 9.4 6 10 6C10.6 6 11 5.6 11 5ZM15 5V3C15 2.4 14.6 2 14 2C13.4 2 13 2.4 13 3V5C13 5.6 13.4 6 14 6C14.6 6 15 5.6 15 5ZM19 5V3C19 2.4 18.6 2 18 2C17.4 2 17 2.4 17 3V5C17 5.6 17.4 6 18 6C18.6 6 19 5.6 19 5Z" fill="currentColor" />
											<path d="M8.8 13.1C9.2 13.1 9.5 13 9.7 12.8C9.9 12.6 10.1 12.3 10.1 11.9C10.1 11.6 10 11.3 9.8 11.1C9.6 10.9 9.3 10.8 9 10.8C8.8 10.8 8.59999 10.8 8.39999 10.9C8.19999 11 8.1 11.1 8 11.2C7.9 11.3 7.8 11.4 7.7 11.6C7.6 11.8 7.5 11.9 7.5 12.1C7.5 12.2 7.4 12.2 7.3 12.3C7.2 12.4 7.09999 12.4 6.89999 12.4C6.69999 12.4 6.6 12.3 6.5 12.2C6.4 12.1 6.3 11.9 6.3 11.7C6.3 11.5 6.4 11.3 6.5 11.1C6.6 10.9 6.8 10.7 7 10.5C7.2 10.3 7.49999 10.1 7.89999 10C8.29999 9.90003 8.60001 9.80003 9.10001 9.80003C9.50001 9.80003 9.80001 9.90003 10.1 10C10.4 10.1 10.7 10.3 10.9 10.4C11.1 10.5 11.3 10.8 11.4 11.1C11.5 11.4 11.6 11.6 11.6 11.9C11.6 12.3 11.5 12.6 11.3 12.9C11.1 13.2 10.9 13.5 10.6 13.7C10.9 13.9 11.2 14.1 11.4 14.3C11.6 14.5 11.8 14.7 11.9 15C12 15.3 12.1 15.5 12.1 15.8C12.1 16.2 12 16.5 11.9 16.8C11.8 17.1 11.5 17.4 11.3 17.7C11.1 18 10.7 18.2 10.3 18.3C9.9 18.4 9.5 18.5 9 18.5C8.5 18.5 8.1 18.4 7.7 18.2C7.3 18 7 17.8 6.8 17.6C6.6 17.4 6.4 17.1 6.3 16.8C6.2 16.5 6.10001 16.3 6.10001 16.1C6.10001 15.9 6.2 15.7 6.3 15.6C6.4 15.5 6.6 15.4 6.8 15.4C6.9 15.4 7.00001 15.4 7.10001 15.5C7.20001 15.6 7.3 15.6 7.3 15.7C7.5 16.2 7.7 16.6 8 16.9C8.3 17.2 8.6 17.3 9 17.3C9.2 17.3 9.5 17.2 9.7 17.1C9.9 17 10.1 16.8 10.3 16.6C10.5 16.4 10.5 16.1 10.5 15.8C10.5 15.3 10.4 15 10.1 14.7C9.80001 14.4 9.50001 14.3 9.10001 14.3C9.00001 14.3 8.9 14.3 8.7 14.3C8.5 14.3 8.39999 14.3 8.39999 14.3C8.19999 14.3 7.99999 14.2 7.89999 14.1C7.79999 14 7.7 13.8 7.7 13.7C7.7 13.5 7.79999 13.4 7.89999 13.2C7.99999 13 8.2 13 8.5 13H8.8V13.1ZM15.3 17.5V12.2C14.3 13 13.6 13.3 13.3 13.3C13.1 13.3 13 13.2 12.9 13.1C12.8 13 12.7 12.8 12.7 12.6C12.7 12.4 12.8 12.3 12.9 12.2C13 12.1 13.2 12 13.6 11.8C14.1 11.6 14.5 11.3 14.7 11.1C14.9 10.9 15.2 10.6 15.5 10.3C15.8 10 15.9 9.80003 15.9 9.70003C15.9 9.60003 16.1 9.60004 16.3 9.60004C16.5 9.60004 16.7 9.70003 16.8 9.80003C16.9 9.90003 17 10.2 17 10.5V17.2C17 18 16.7 18.4 16.2 18.4C16 18.4 15.8 18.3 15.6 18.2C15.4 18.1 15.3 17.8 15.3 17.5Z" fill="currentColor" />
										</svg>
									</span>
									<?php   
											$edate = $edit->enddate?$edit->enddate:date("d-m-Y h:i A");
											$enddate = date("Y-m-d h:i", strtotime($edate));										
									?>
									<input type="datetime-local" class="form-control form-control-solid ps-12" name="ancts_end_date_edit" placeholder="End Date" id="ancts_end_date_edit" value="<?php echo $enddate; ?>"/>
								</div>
								<div class="fv-plugins-message-container invalid-feedback" id="ancts_end_date_edit_err"></div>
							</div>
							<label class="col-lg-4 col-form-label required fw-semibold fs-6">Announcements</label>
							<div class="col-lg-8 fv-row">
								<textarea class="form-control form-select-solid fw-semibold fs-5" rows="3" name="ancts_txt_edit" id="ancts_txt_edit" ><?php echo $edit->announcement?$edit->announcement:''; ?></textarea>
								<div class="fv-plugins-message-container invalid-feedback" id="ancts_txt_edit_err"></div>
							</div>
							<label class="col-lg-4 col-form-label required fw-semibold fs-6">Users</label>
							<div class="col-lg-8 fv-row fv-plugins-icon-container">
								<select class="form-select form-select-solid" name="acnts_users_edit[]" id="acnts_users_edit" data-control="select2" data-dropdown-parent="#kt_modal_edit_announcements" data-allow-clear="true" multiple="multiple" data-placeholder="Select Users">
									<?php
										$staffid = $edit->userid ? json_decode($edit->userid) : [];

										if (isset($userlist)) {
										    foreach ($userlist as $ulist) {
										        $selected = in_array($ulist['USER_ID'], $staffid) ? 'selected' : '';
										        $staffname = ucfirst($ulist['STAFFNAME'] ?? '-');
										        $userId = $ulist['USER_ID'] ?? '';
										        echo "<option value=\"$userId\" $selected>$staffname</option>";
										    }
										}
									?>
								</select>
								<div class="fv-plugins-message-container invalid-feedback" id="acnts_users_edit_err"></div>
							</div>
						</div>
						<div class="d-flex justify-content-center align-items-center mt-6">
							<!-- onclick="closeEditModal();" -->
							<button type="reset" class="btn btn-secondary me-3" data-bs-dismiss="modal" >Cancel</button>
							<button type="submit" class="btn btn-primary" id="wishes_update_butt_edit" name="wishes_update_butt_edit">Update Announcement</button>
						</div>
					</form>


					<!--end::Actions-->
				</div>
				<!--end::Modal body-->
			</div>
			<!--end::Modal content-->
		</div>
	<!--end::Modal dialog-->

<input type="hidden" id="baseurl" value="<?php echo base_url();?>">
<?php $this->load->view("script");?>
<script src="assets/plugins/custom/fslightbox/fslightbox.bundle.js"></script>
	<script> 
			function  editvalidation(){

				var err = 0;
				var ancts_start_date_edit   = $('#ancts_start_date_edit').val();
				var ancts_end_date_edit     = $('#ancts_end_date_edit').val();
				var ancts_txt_edit          = $('#ancts_txt_edit').val();
				var acnts_user         = $('#acnts_users_edit').val();

				// alert(acnts_users_edit);


					if(ancts_start_date_edit.trim()==""){


						$('#ancts_start_date_edit_err').html('Select Start Date Is Required..!');
						
						err++;
												

					}
					else{

						$('#ancts_start_date_edit_err').html('');
					}

					if(ancts_end_date_edit.trim()==""){
						

						$('#ancts_end_date_edit_err').html('Select End Date Is Required..!');
						err++;
											

					}
					else{

						$('#ancts_end_date_edit_err').html('');
					}

					if(ancts_txt_edit.trim() =="")
					{
						
						$('#ancts_txt_edit_err').html('Enter Announcement Required..!');
						err++;
											

					}
					else{

						$('#ancts_txt_edit_err').html('');
					}
					if(acnts_user=="")
					{
						$('#acnts_users_edit_err').html('Select Users Is Required..!');

						err++;

					}
					else{

						$('#acnts_users_edit_err').html('');
					}

					// alert(err) ;

					if (err>0) { return false; }else{ return true;} 

			}
		</script>

<script type="text/javascript">
	
	var ancts_start_date_edit = "<?php echo $edit->startdate ? $edit->startdate : date("d-m-Y h:i A"); ?>";
	var ancts_end_date_edit = "<?php echo $edit->enddate ? $edit->enddate : date("d-m-Y h:i A"); ?>";
	var taskFlatpickr = {
	    enableTime: true,
	    altInput: true,
	    time_12hr: false,
	    altFormat: "d-m-Y h:i K",
	    defaultDate: ancts_start_date_edit
	};
	var taskFlatpickr2 = {
	    enableTime: true,
	    altInput: true,
	    time_12hr: false,
	    altFormat: "d-m-Y h:i K",
	    defaultDate: ancts_end_date_edit
	};

	flatpickr("#ancts_start_date_edit", taskFlatpickr);
	flatpickr("#ancts_end_date_edit", taskFlatpickr2);


	    // alert(start);
	// });


</script>