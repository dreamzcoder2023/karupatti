<!--begin::Modal dialog-->
			<div class="modal-dialog modal-xl">
				<!--begin::Modal content-->
				<div class="modal-content rounded">
					<!--begin::Modal header-->
					<div class="modal-header justify-content-end border-0 pb-0">
						<!--begin::Close-->
						<div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal" onclick="closeHistoryViewModal();">
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
					<form name="party_history_view_form" id="party_history_view_form" method="POST" action="<?php echo base_url(); ?>party/party_history_view" enctype="multipart/form-data" >
						<input type="hidden" id="party_id" name="party_id" value="<?php echo $party_details->PID;?>">
					<div class="modal-body pt-0 pb-15 px-5 px-xl-20">
						<!--begin::Heading-->
						<div class="mb-13 text-center">
							<h1 class="mb-3">View Party History</h1>
						</div>
						<!--end::Heading-->
						<div class="row mb-6">
							<!--begin::Label-->
							<span class="text-muted fw-semibold fs-5" style="text-align: right !important;">Party ID: <?php echo $party_details->PID;?></span>
							<label class="col-lg-1 col-form-label fw-semibold fs-6">Name</label>
							<!--end::Label-->
							<!--begin::Col-->
							<div class="col-lg-3 fv-row fv-plugins-icon-container">
								<input type="text" name="company" class="form-control form-control-lg form-control-solid" placeholder="Party Name" value="<?php echo $party_details->NAME;?>" readonly>
								<div class="fv-plugins-message-container invalid-feedback"></div>
							</div>
							<!--end::Col-->			
							<!--begin::Label-->
							<label class="col-lg-1 col-form-label fw-semibold fs-6">Father</label>
							<!--end::Label-->
							<!--begin::Col-->
							<div class="col-lg-3 fv-row fv-plugins-icon-container">
								<div class="row"> 
								<div class="col-lg-4">
									<input type="text" name="lname" id="lname" class="form-control form-control-lg form-control-solid col-lg-2" placeholder="Last" value="<?php echo $party_details->LASTNAME_PREFIX;?>" readonly>
									</div>
								<div class="col-lg-8">
								<input type="text" name="lname" id="lname" class="form-control form-control-lg form-control-solid col-lg-2" placeholder="Last" value="<?php echo $party_details->FATHERSNAME;?>" readonly></div>
								</div>
								<div class="fv-plugins-message-container invalid-feedback"  id="lname_err" name="lname_err"></div>
							</div>
							<!--end::Col-->
							<!--begin::Label-->
							<label class="col-lg-1 col-form-label fw-semibold fs-6">Other</label>
							<!--end::Label-->
							<!--begin::Col-->
							<div class="col-lg-3 fv-row fv-plugins-icon-container">
								<input type="text" name="lname" id="lname" class="form-control form-control-lg form-control-solid col-lg-2" placeholder="Last" value="<?php echo $party_details->OTHER_NAME;?>" readonly>
								<div class="fv-plugins-message-container invalid-feedback"></div>
							</div>
							<!--end::Col-->
							<!--begin::Label-->
							<label class="col-lg-1 col-form-label fw-semibold fs-6">Mother </label>
							<!--end::Label-->
							<!--begin::Col-->
							<div class="col-lg-3 fv-row fv-plugins-icon-container">
								<input type="text" name="lname" id="lname" class="form-control form-control-lg form-control-solid col-lg-2" placeholder="Last" value="<?php echo $party_details->MOTHER_NAME;?>" readonly>
								<div class="fv-plugins-message-container invalid-feedback"></div>
							</div>
							<!--end::Col-->
							<!--begin::Label-->
							<label class="col-lg-1 col-form-label fw-semibold fs-6">City</label>
							<!--end::Label-->
							<!--begin::Left Section-->
							<div class="col-lg-3 fv-row fv-plugins-icon-container">
								<input type="text" name="lname" id="lname" class="form-control form-control-lg form-control-solid col-lg-2" placeholder="Last" value="<?php echo $party_details->CITY;?>" readonly>
								<div class="fv-plugins-message-container invalid-feedback"></div>
							</div>
							<!--end::Left Section-->
							<!--begin::Label-->
							<label class="col-lg-1 col-form-label fw-semibold fs-6">Zone</label>
							<!--end::Label-->
							<!--begin::Left Section-->
							<div class="col-lg-3">
								<!--begin::Select-->
								<?php 
									 
									$zqry=$this->db->query("SELECT * FROM ZONE_MASTER WHERE SNO='".$party_details->ZONE_SNO."'");
									$zonelist=$zqry->row();
									?>
								<input type="text" name="lname" id="lname" class="form-control form-control-lg form-control-solid col-lg-2" placeholder="Last" value="<?php  
								if(!is_null($party_details->ZONE_SNO))
								{
									echo $zonelist->ZONENAME;
								}
								else
								{
									echo ' '; 
								}  
								?>" readonly>
								<!--end::Select-->
							</div>
							<!--end::Left Section-->
							<!--begin::Label-->
							<label class="col-lg-1 col-form-label fw-semibold fs-6">Area</label>
							<!--end::Label-->
							<!--begin::Left Section-->
							<div class="col-lg-3 fv-row fv-plugins-icon-container">
								<input type="text" name="lname" id="lname" class="form-control form-control-lg form-control-solid col-lg-2" placeholder="Last" value="<?php echo $party_details->AREA; ?>" readonly>
								<div class="fv-plugins-message-container invalid-feedback"></div>
							</div>
							<!--begin::Label-->
							<label class="col-lg-1 col-form-label fw-semibold fs-6">Address</label>
							<!--end::Label-->
							<!--begin::Col-->
							<div class="col-lg-3 fv-row fv-plugins-icon-container">
								<input type="text" name="company" class="form-control form-control-lg form-control-solid" placeholder="Address" value="<?php echo $party_details->ADDRESS1; ?>" readonly >
								<div class="fv-plugins-message-container invalid-feedback"></div>
							</div>
							<!--end::Col-->
							<!--begin::Label-->
							<label class="col-lg-1 col-form-label fw-semibold fs-6">Mobile</label>
							<!--end::Label-->
							<!--begin::Col-->
							<div class="col-lg-3 fv-row fv-plugins-icon-container">
								<input type="text" name="company" class="form-control form-control-lg form-control-solid" placeholder="Mobile" value="<?php echo $party_details->PHONE; ?>" readonly>
								<div class="fv-plugins-message-container invalid-feedback"></div>
							</div>
							<!--end::Col-->
							<!--begin::Label-->
							<label class="col-lg-1 col-form-label fw-semibold fs-6">Whatsapp</label>
							<!--end::Label-->
							<!--begin::Col-->
							<div class="col-lg-3 fv-row fv-plugins-icon-container">
								<input type="text" name="company" class="form-control form-control-lg form-control-solid" placeholder="Mobile" value="<?php echo $party_details->WHATSAPP; ?>" readonly>
								<div class="fv-plugins-message-container invalid-feedback"></div>
							</div>
							<!--end::Col-->
							
							<!--begin::Label-->
							<label class="col-lg-1 col-form-label fw-semibold fs-6">Phone</label>
							<!--end::Label-->
							<!--begin::Col-->
							<div class="col-lg-3 fv-row fv-plugins-icon-container">
								<input type="text" name="company" class="form-control form-control-lg form-control-solid" placeholder=" Alter Phone" value="<?php echo $party_details->PHONE2; ?>" readonly>
								<div class="fv-plugins-message-container invalid-feedback"></div>
							</div>
							<!--end::Col-->
							<!--begin::Label-->
							<label class="col-lg-1 col-form-label fw-semibold fs-6">Email</label>
							<!--end::Label-->
							<!--begin::Col-->
							<div class="col-lg-3 fv-row fv-plugins-icon-container">
								<input type="text" name="company" class="form-control form-control-lg form-control-solid" placeholder="Email ID" value="<?php echo $party_details->EMAIL; ?>" readonly>
								<div class="fv-plugins-message-container invalid-feedback"></div>
							</div>
							<!--end::Col-->			
							<!--begin::Label-->
							<label class="col-lg-1 col-form-label fw-semibold fs-6">Aadhar</label>
							<!--end::Label-->
							<!--begin::Col-->
							<div class="col-lg-3 fv-row fv-plugins-icon-container">
								<input type="text" name="company" class="form-control form-control-lg form-control-solid" placeholder="Aadhar No" value="<?php echo $party_details->AADHAAR_NO; ?>" readonly>
								<div class="fv-plugins-message-container invalid-feedback"></div>
							</div>
							<!--end::Col-->
							<!--begin::Label-->
							<label class="col-lg-1 col-form-label fw-semibold fs-6">ID Type</label>
							<!--end::Label-->
							<!--begin::Left Section-->
							<div class="col-lg-3 fv-row fv-plugins-icon-container">
								<input type="text" name="company" class="form-control form-control-lg form-control-solid" placeholder="Aadhar No" value="<?php echo $party_details->ID_TYPE; ?>" readonly>
								<div class="fv-plugins-message-container invalid-feedback"></div>
							</div>
							<!--begin::Label-->
							<label class="col-lg-1 col-form-label fw-semibold fs-6">ID No</label>
							<!--end::Label-->
							<!--begin::Col-->
							<div class="col-lg-3 fv-row fv-plugins-icon-container">
								<input type="text" name="company" class="form-control form-control-lg form-control-solid" placeholder="ID Number" value="<?php echo $party_details->ID_NUMBER; ?>" readonly>
								<div class="fv-plugins-message-container invalid-feedback"></div>
							</div>
							<!--end::Col-->
							<!--begin::Label-->
							<label class="col-lg-1 col-form-label fw-semibold fs-6">Work</label>
							<!--end::Label-->
							<!--begin::Left Section-->
							<div class="col-lg-3 fv-row fv-plugins-icon-container">
								<input type="text" name="company" class="form-control form-control-lg form-control-solid" placeholder="ID Number" value="<?php echo $party_details->WORK_TYPE; ?>" readonly>
								<div class="fv-plugins-message-container invalid-feedback"></div>
							</div>
							<label class="col-lg-2 col-form-label fw-semibold fs-6">Customer Rating</label>
							
							<!--begin:Label-->
							<div class="col-lg-1 d-flex align-items-center me-2 bg-success " style="border-radius: 15px;">
								<!--begin:Input-->
								<div class="form-check form-check-custom">
									<input class="form-check-input2" type="radio" checked="checked" name="account_plan" value="2" disabled  <?php if($party_details->RATING==3){echo "selected"; } else{ echo " ";} ?>/>
								</div>
								<!--end:Input-->
								<!--begin::Description-->
								<div class="d-flex flex-column">
									<div class="fs-6 fw-semibold text-muted" style="padding-left: 10px;">Good</div>
								</div>
								<!--end:Description-->
							</div>
							<!--end:Label-->
							<!--begin:Label-->
							<div class="col-lg-1 d-flex align-items-center me-2 bg-warning" style="border-radius: 15px;">
								<!--begin:Input-->
								<div class="form-check form-check-custom">
									<input class="form-check-input2" type="radio" name="account_plan" value="2" disabled  <?php if($party_details->RATING==2){echo "selected"; } else{ echo " ";} ?>/>
								</div>
								<!--end:Input-->
								<!--begin::Description-->
								<div class="d-flex flex-column">
									<div class="fs-6 fw-semibold text-muted"  style="padding-left: 10px;">Avg</div>
								</div>
								<!--end:Description-->
							</div>
							<!--end:Label-->
							<!--begin:Label-->
							<div class="col-lg-1 d-flex align-items-center me-2 bg-danger" style="border-radius: 15px;">
								<!--begin:Input-->
								<input class="form-check-input2" type="radio" name="account_plan" value="1" disabled <?php if($party_details->RATING==1){echo "selected"; } else{ echo " ";} ?> />
								<!--end:Input-->
								<!--begin::Description-->
								<div class="d-flex flex-column">
									<div class="fs-6 fw-semibold text-muted"  style="padding-left: 10px;">Bad</div>
								</div>
								<!--end:Description-->
							</div>
							<!--end:Label-->
						</div>
						<div class="row mb-6">
							<!--begin::Label-->
							<label class="col-lg-1 col-form-label fw-semibold fs-6">Party</label>
							<!--end::Label-->
							<!--begin::Col-->
							<div class="col-lg-3">
								<!-- <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['image']); ?>" > -->
								<!--begin::Image input-->
								<div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url('assets/media/svg/avatars/blank.svg')">
									<!--begin::Preview existing avatar-->
									<?php 
										if($party_details->PHOTO == '')
										{
									?>
									<div class="image-input-wrapper w-125px h-125px" style="background-image: url(assets/media/svg/avatars/blank.svg)"></div>
									<?php 
										}
										else
										{

									?>
									<img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($party_details->PHOTO); ?> " height="125px" width="125px" >
									<?php
										}
									?>
									<!--end::Preview existing avatar-->
									<!--begin::Cancel-->
									<span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" data-kt-initialized="1">
										<i class="bi bi-x fs-2"></i>
									</span>
									<!--end::Cancel-->
								</div>
								<!--end::Image input-->
								<!--begin::Hint-->
								
								<!--end::Hint-->
							</div>
							<!--end::Col-->
							<!--begin::Label-->
							<label class="col-lg-1 col-form-label fw-semibold fs-6">Other</label>
							<!--end::Label-->
								<!--begin::Col-->
								<div class="col-lg-3">
									<!--begin::Image input-->
									<div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url('assets/media/svg/avatars/blank.svg')">
										<?php 
										if($party_details->OTHER_PHOTO == '')
										{
										?>
										<!--begin::Preview existing avatar-->
										<div class="image-input-wrapper w-125px h-125px" style="background-image: url(assets/media/svg/avatars/blank.svg)">
											
										</div>
										<?php 
										}
										else
										{

									?>
									<img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($party_details->OTHER_PHOTO); ?> " height="125px" width="125px" >
									<?php
										}
									?>
										<!--end::Preview existing avatar-->
										<!--begin::Cancel-->
										<span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" data-kt-initialized="1">
											<i class="bi bi-x fs-2"></i>
										</span>
										<!--end::Cancel-->
									</div>
									<!--end::Image input-->
									<!--begin::Hint-->
									<div class="form-text">Allowed file types: png, jpg, jpeg.</div>
									<!--end::Hint-->
								</div>
								<!--end::Col-->	

						</div>

						<?php 
							$loan_qry=$this->db->query("SELECT * FROM LOANS WHERE PID='".$party_details->PID."' ORDER BY ENDATE");
							$loan_res=$loan_qry->result_array();
						?>
						<div class="rounded border p-10">
													<div class="mb-5 hover-scroll-x">
														<div class="d-grid">
															<ul class="nav nav-tabs flex-nowrap text-nowrap">
																<li class="nav-item">
																	<a class="nav-link active btn btn-active-light btn-color-black-800 btn-active-color-primary rounded-bottom-0 fw-bold fs-6" data-bs-toggle="tab" href="#kt_tab_pane_1">Loans</a>
																</li>
																<li class="nav-item">
																	<a class="nav-link btn btn-active-light btn-color-black-800 btn-active-color-primary rounded-bottom-0 fw-bold fs-6" data-bs-toggle="tab" href="#kt_tab_pane_2">Credits</a>
																</li>
																<li class="nav-item">
																	<a class="nav-link btn btn-active-light btn-color-black-800 btn-active-color-primary rounded-bottom-0 fw-bold fs-6" data-bs-toggle="tab" href="#kt_tab_pane_3">Chits</a>
																</li>
																<!-- <li class="nav-item">
																	<a class="nav-link btn btn-active-light btn-color-black-800 btn-active-color-primary rounded-bottom-0 fw-bold fs-6" data-bs-toggle="tab" href="#kt_tab_pane_4">Hand Loan</a>
																</li>
																<li class="nav-item">
																	<a class="nav-link btn btn-active-light btn-color-black-800 btn-active-color-primary rounded-bottom-0 fw-bold fs-6" data-bs-toggle="tab" href="#kt_tab_pane_5">ALP(Ayyanar Land Promoters)</a>
																</li> -->
															</ul>
														</div>
													</div>
													<?php 
													$result=$this->db->query("SELECT L.*, R.SELLINGAMOUNT, R.SELLINGREMARKS, R.SELLINGTO FROM LOANS L INNER JOIN REDEMPTIONS R ON L.BILLNO=R.BILLNO WHERE L.PID='".$party_details->PID."'")->result_array();

													?>
													<div class="tab-content" id="myTabContent">
														<div class="tab-pane fade show active" id="kt_tab_pane_1" role="tabpanel">
															<div class="row">
																<table class="table align-middle table-row-dashed table-striped table-hover fs-7 gy-1 gs-2" id="kt_datatable_sidebar_paryloanhistory_loan">
																    <thead>
																        <tr class="text-start text-muted fw-bold fs-7 gs-0">
																            <th class="min-w-100px cy">company</th>
																            <th class="min-w-100px">Loan Date</th>
																            <th class="min-w-100px">Ren From</th>
																            <th class="min-w-100px">Loan No</th>
																            <th class="min-w-80px">Amount</th>
																            <th class="min-w-100px">Int Scheme</th>
																            <th class="min-w-25px">Int%</th>
																            <th class="min-w-125px">Nominee</th>
																            <th class="min-w-25px">Active</th>
																            <th class="min-w-80px">Cls Date</th>
																            <th class="min-w-125px">Cls Type</th>
																            <th class="min-w-80px">Ren TO</th>
																            <th class="min-w-100px">Remarks</th>
																            <th class="min-w-100px">Status</th>
																            <th class="min-w-100px">AltInfo</th>
																            <th class="min-w-100px">Sell To</th>
																            <th class="min-w-100px">PaperAction</th>
																            <!-- <th class="min-w-150px">Loan Summary</th> -->
																        </tr>
																    </thead>
																    <tbody class="text-gray-600 fw-semibold">
																    	<?php 
																    	foreach ($result as $llist) 
																    	{
																    	?>
																        <tr>
																            <td class="cy ple1"><?php 
																            $comp_name=$this->db->query("SELECT * FROM COMPANY WHERE COMPANYCODE='".$llist['COMPANYCODE']."'")->row();
																            	echo $comp_name->COMPANYNAME;
																            ?></td>
																            <td class="ple1"><?php echo $llist['ENDATE']; ?></td>
																            <td class="ple1"><?php echo $llist['REN_FROM_BILLNO']; ?></td>
																            <td class="ple1"><?php echo $llist['BILLNO']; ?></td>
																            <td class="ple1"><?php echo $llist['AMOUNT']; ?></td>
																            <td class="ple1"><?php echo $llist['INTEREST']; ?></td>
																            <td class="ple1"></td>
																            <td class="ple1"><?php echo $llist['NOMINEE']; ?></td>
																            <td class="ple1"><?php echo $llist['ACTIVE']; ?></td>
																            <td class="ple1">
																            	<?php 
																            	if( $llist['ACTIVE']=='Y')
																            	{
																            		echo "";
																            	} 
																            	else
																            	{
																            		echo $llist['CLOSEDATE'];
																            	}
																            	?>
																            	
																            </td>
																            <td class="ple1"><?php 
																            	if( $llist['ACTIVE']=='Y')
																            	{
																            		echo "";
																            	} 
																            	else {
																            		echo $llist['CLOSING_STATUS'];	
																            	}
																            	?></td>
																            <td class="ple1"><?php echo $llist['REN_TO_BILLNO']; ?></td>
																            <td class="ple1"><?php echo $llist['REMARKS']; ?></td>
																            <td class="ple1"><?php echo $llist['STATUS']; ?></td>
																            <td class="ple1"><?php echo $llist['ALT_REMARKS']; ?></td>
																            <td class="ple1"><?php echo $llist['SELLINGTO']; ?></td>
																             <td class="ple1"><?php echo $llist['PAPER_ACTION']; ?></td>
																            <!-- <td>
																            	<a href="#" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm" data-bs-toggle="modal" data-bs-target="#kt_modal_view_particular_party_loan_summary_history_sidebar">
																						<i class="bi bi-eye-fill eyc"></i>
																				</a>
																				<a href="#" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm" data-bs-toggle="modal" data-bs-target="#kt_modal_delete_particular_party_loan_summary_history_sidebar">
																					<span class="svg-icon svg-icon-3">
																						<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																							<path d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z" fill="currentColor"></path>
																							<path opacity="0.5" d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z" fill="currentColor"></path>
																							<path opacity="0.5" d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z" fill="currentColor"></path>
																						</svg>
																					</span>
																				</a>
																			</td> -->
																        </tr>
																        <?php 
																        	}
																        ?>
																    </tbody>
																    
																</table>
															</div>
														</div>
														<div class="tab-pane fade" id="kt_tab_pane_2" role="tabpanel">
															<div class="row">
																<table class="table table-striped border rounded table-hover fs-7 gs-2 gy-1" id="kt_datatable_sidebar_paryloanhistory_credit">
																    <thead>
																        <tr class="fw-bold fs-7 text-gray-800">
																            <th class="min-w-100px cy">Company</th>
																            <th class="min-w-100px">Date</th>
																            <th class="min-w-100px">Acc No</th>
																            <th class="min-w-100px">Manual No</th>
																            <th class="min-w-50px">Type</th>
																            <th class="min-w-25px">Particulars</th>
																            <th class="min-w-100px">Amount</th>
																            <th class="min-w-25px">Remarks</th>
																            <th class="min-w-80px">Balance</th>
																        </tr>
																    </thead>
																    <tbody>
																    	<?php 
																    		$credit_result=$this->db->query("SELECT * FROM CREDIT_CUSTOMERS WHERE PID='".$party_details->PID."'")->result_array();
																    		foreach ($credit_result as $clist) {
																    			
																    	?>
																        <tr>
																            <td class="cy ple1">
																            	<?php 
																            	$comp_name1=$this->db->query("SELECT * FROM COMPANY WHERE COMPANYCODE='".$clist['COMPANYCODE']."'")->row();
																            	echo $comp_name1->COMPANYNAME;
																            	?>
																            </td>
																            <td class="ple1"><?php echo $clist['OP_DATE']; ?></td>
																            <td class="ple1"><?php echo $clist['ACC_NO']; ?></td>
																            <td class="ple1"><?php echo $clist['MANUAL_NO']; ?></td>
																            <td class="ple1"><?php echo $clist['JEWEL_TYPE']; ?></td>
																            <td class="ple1"><?php echo "Opening.."; ?></td>
																            <td class="ple1"><?php echo $clist['OP_BALANCE']; ?></td>
																            <td class="ple1"><?php echo $clist['REMARKS']; ?></td>
																            <td class="ple1"></td>
																        </tr>
																        <?php 
																        	}
																        ?>
																    </tbody>
																</table>
															</div>
														</div>
														<div class="tab-pane fade" id="kt_tab_pane_3" role="tabpanel">
															<div class="row">
																<table class="table table-striped border rounded table-hover fs-7 gs-2 gy-1" id="kt_datatable_sidebar_paryloanhistory_chit">
																    <thead>
																        <tr class="fw-bold fs-7 text-gray-800">
																            <th class="min-w-100px cy">company</th>
																            <th class="min-w-100px">Date</th>
																            <th class="min-w-100px">Group</th>
																            <th class="min-w-100px">Acc No</th>
																            <th class="min-w-100px">Manual No</th>
																            <th class="min-w-50px">Op.Bal</th>
																            <th class="min-w-25px">Op.Wt</th>
																            <th class="min-w-25px">Remarks</th>
																            <th class="min-w-80px">Balance</th>
																        </tr>
																    </thead>
																    <tbody>
																    	<?php 
																    		$chit_result=$this->db->query("SELECT * FROM CHIT_CUSTOMERS WHERE PID='".$party_details->PID."'")->result_array();
																    		foreach ($chit_result as $chlist) {
																    			
																    	?>
																        <tr>
																            <td class="cy ple1"><?php 
																            	$comp_name2=$this->db->query("SELECT * FROM COMPANY WHERE COMPANYCODE='".$chlist['COMPANYCODE']."'")->row();
																            	echo $comp_name2->COMPANYNAME;
																            	?></td>
																            <td class="ple1"><?php echo $chlist['CHIT_DATE']; ?></td>
																            <td class="ple1"><?php echo $chlist['SAVINGS_GROUP_SNO']; ?></td>
																            <td class="ple1"><?php echo $chlist['MEMBER_NO']; ?></td>
																            <td class="ple1"><?php echo $chlist['MANUAL_NO']; ?></td>
																            <td class="ple1"><?php echo $chlist['OP_BALANCE']; ?></td>
																            <td class="ple1"><?php echo $chlist['OP_WT']; ?></td>
																            <td class="ple1"><?php echo $chlist['REMARKS']; ?></td>
																            <td class="ple1"></td>
																        </tr>
																        <?php 
																        	}
																        ?>
																    </tbody>
																</table>
															</div>
														</div>
													</div>
												</div>
						<!--begin::Actions-->
						<!-- <div class="row">
							<div class="col-lg-9"></div>
							<div class="col-lg-1">
								<div class="d-flex flex-center flex-row-fluid pt-12">
									<button type="reset" class="btn btn-secondary me-3" data-bs-dismiss="modal">Cancel</button>
								</div>
							</div>
							<div class="col-lg-2">
								<div class="d-flex flex-center flex-row-fluid pt-12">
									<button type="submit" class="btn btn-success" data-bs-dismiss="modal">Save Changes</button>
								</div>
							</div>
						</div> -->
						<!--end::Actions-->
					</div>
					<!--end::Modal body-->
				</div>
				<!--end::Modal content-->
			</div>
			<!--end::Modal dialog-->
			<script>
		      $("#kt_datatable_sidebar_paryloanhistory_loan").kendoTooltip({
		        filter: "td",
		        show: function(e){
		          if(this.content.text() !=""){
		            $('[role="tooltip"]').css("visibility", "visible");
		          }
		        },
		        hide: function(){
		          $('[role="tooltip"]').css("visibility", "hidden");
		        },
		        content: function(e){
		          var element = e.target[0];
		          if(element.offsetWidth < element.scrollWidth){
		            return e.target.text();
		          }else{
		            return "";
		          }
		        }
		      })
   		</script>
			<script>
			$("#kt_datatable_sidebar_paryloanhistory_loan").DataTable({
					 "responsive":true,
					 "aaSorting":[],
					 "language": {
					  "lengthMenu": "Show _MENU_",
					 },
					 "dom":
					  "<'row'" +
					  "<'col-sm-6 d-flex align-items-center justify-conten-start'l>" +
					  "<'col-sm-6 d-flex align-items-center justify-content-end'f>" +
					  ">" +

					  "<'table-responsive'tr>" +

					  "<'row'" +
					  "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
					  "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
					  ">"
				});

			</script>
			<script>
		      $("#kt_datatable_sidebar_paryloanhistory_credit").kendoTooltip({
		        filter: "td",
		        show: function(e){
		          if(this.content.text() !=""){
		            $('[role="tooltip"]').css("visibility", "visible");
		          }
		        },
		        hide: function(){
		          $('[role="tooltip"]').css("visibility", "hidden");
		        },
		        content: function(e){
		          var element = e.target[0];
		          if(element.offsetWidth < element.scrollWidth){
		            return e.target.text();
		          }else{
		            return "";
		          }
		        }
		      })
   		</script>
			<script>
			$("#kt_datatable_sidebar_paryloanhistory_credit").DataTable({
				 "responsive":true,
				 "aaSorting":[],
				 "language": {
				  "lengthMenu": "Show _MENU_",
				 },
				 "dom":
				  "<'row'" +
				  "<'col-sm-6 d-flex align-items-center justify-conten-start'l>" +
				  "<'col-sm-6 d-flex align-items-center justify-content-end'f>" +
				  ">" +

				  "<'table-responsive'tr>" +

				  "<'row'" +
				  "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
				  "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
				  ">"
				});
			</script>
			<script>
		      $("#kt_datatable_sidebar_paryloanhistory_chit").kendoTooltip({
		        filter: "td",
		        show: function(e){
		          if(this.content.text() !=""){
		            $('[role="tooltip"]').css("visibility", "visible");
		          }
		        },
		        hide: function(){
		          $('[role="tooltip"]').css("visibility", "hidden");
		        },
		        content: function(e){
		          var element = e.target[0];
		          if(element.offsetWidth < element.scrollWidth){
		            return e.target.text();
		          }else{
		            return "";
		          }
		        }
		      })
   		</script>
			<script>
			$("#kt_datatable_sidebar_paryloanhistory_chit").DataTable({
				 "responsive":true,
				 "aaSorting":[],
				 "language": {
				  "lengthMenu": "Show _MENU_",
				 },
				 "dom":
				  "<'row'" +
				  "<'col-sm-6 d-flex align-items-center justify-conten-start'l>" +
				  "<'col-sm-6 d-flex align-items-center justify-content-end'f>" +
				  ">" +

				  "<'table-responsive'tr>" +

				  "<'row'" +
				  "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
				  "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
				  ">"
				});
			</script>
