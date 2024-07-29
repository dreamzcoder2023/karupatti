<?php $this->load->view("common");?>

		<link href="<?php echo base_url();?>assets/jquery.autocomplete.css" rel="stylesheet" type="text/css" />
	<!--begin::Body-->
	<body data-kt-name="metronic" id="kt_body" class="header-fixed header-tablet-and-mobile-fixed toolbar-enabled toolbar-fixed aside-enabled aside-fixed">
		<!--begin::Theme mode setup on page load-->
		<script>if ( document.documentElement ) { const defaultThemeMode = "system"; const name = document.body.getAttribute("data-kt-name"); let themeMode = localStorage.getItem("kt_" + ( name !== null ? name + "_" : "" ) + "theme_mode_value"); if ( themeMode === null ) { if ( defaultThemeMode === "system" ) { themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light"; } else { themeMode = defaultThemeMode; } } document.documentElement.setAttribute("data-theme", themeMode); }</script>
		<!--end::Theme mode setup on page load-->
		<!--begin::Main-->
		<!--begin::Root-->
		<div class="d-flex flex-column flex-root">
			<!--begin::Page-->
			<div class="page d-flex flex-row flex-column-fluid">
				<?php $this->load->view("sidebar");?>
				<!--begin::Wrapper-->
				<div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
				<?php $this->load->view("header");?>
				<!--begin::Toolbar-->
					<div class="toolbar py-2" id="kt_toolbar">
						<!--begin::Container-->
						<div id="kt_toolbar_container" class="container-fluid d-flex align-items-center">
							<!--begin::Page title-->
							<div class="flex-grow-1 flex-shrink-0 me-5">
								<!--begin::Page title-->
								<div data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
									<!--begin::Title-->
									<h1 class="d-flex align-items-center text-dark fw-bold my-1 fs-3">Payment List
									<!--begin::Separator-->
									<span class="h-20px border-gray-200 border-start ms-3 mx-2"></span>
									<!--end::Separator-->
									<!--begin::Description-->
									
									<!--end::Description--></h1>
									<!--end::Title-->
								</div>
								<!--end::Page title-->
							</div>
							<!--end::Page title-->
							
						</div>
						<!--end::Container-->
					</div>
					<!--end::Toolbar-->	
					<!--begin::Content-->
					<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
						<!--begin::Container-->
						<div id="kt_content_container" class="container-xxl">
							<!--begin::Row-->
							<div class="row gy-5 g-xl-8">
								<!--begin::Col-->
								<div class="col-xxl-8">
									<!--begin::Tables Widget 9-->
									<div class="card card-xxl-stretch mb-5 mb-xl-8">
				                        <?php if($this->session->flashdata('g_success')){?>
				                        <div class="alert alert-success" id="alertaddmessage">
				                         <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
				                        <?php echo $this->session->flashdata('g_success'); ?>
				                        </div>
				                        <?php } ?>

				                        <?php if($this->session->flashdata('g_err')){?>
				                        <div class="alert alert-success" id="alertaddmessage">
				                         <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
				                        <?php echo $this->session->flashdata('g_err'); ?>
				                        </div>
				                        <?php } ?>
										<form action="<?php echo base_url();?>payment" method="post">
	                        				<div class="row px-4 py-4">
					                    		<div class="col-lg-10">
					                    			<div class="row">
					                    				<!-- <label class="col-lg-1 col-form-label fw-semibold fs-6">Select</label> -->
														<div class="col-lg-2 fv-row fv-plugins-icon-container">
															<select class="form-select form-select-solid" data-control="select2" data-hide-search="true" id="day_period" name="day_period" onchange="dy_pd()">	
																<!-- <option value="0">Select</option> -->
																<option value="day" <?php echo $day_period=='day'?'selected':'';?>>Day</option>				
																<option value="period" <?php echo $day_period=='period'?'selected':'';?>>Period</option>
															</select>
														</div>
														<div class="col-lg-2 fv-row">
															<div class="d-flex align-items-center">
																<input type="date" class="form-control form-control-solid ps-12" name="start_date" placeholder="Select" id="start_date" value="<?php echo $start_date; ?>" />
															</div>
														</div>
														<div class="col-lg-2 fv-row" id="period_date" style="<?php echo $day_period=='day'?'display: none;':'display:block';?>">
															<div class="d-flex align-items-center">
																<input type="date" class="form-control form-control-solid ps-12" name="end_date" placeholder="Select" id="end_date" value="<?php echo $end_date; ?>" />
															</div>
														</div>
														<div class="col-lg-2 fv-row fv-plugins-icon-container">
															<select class="form-select form-select-solid" data-control="select2" data-hide-search="true" id="sortorder" name="sortorder">	
																<!-- <option value="0">Select</option> -->
																<option value="1" <?php echo $sortorder=='1'?'selected':'';?>>Asc</option>				
																<option value="2" <?php echo $sortorder=='2'?'selected':'';?>>Desc</option>
															</select>
														</div>
														<div class="col-lg-2 fv-row fv-plugins-icon-container">
															<button type="submit" class="btn btn-sm btn-outline btn-outline-solid btn-outline-warning btn-active-light-primary me-3">Go</button>
														</div>
					                    			</div>
					                    		</div>
					                    		<div class="col-lg-2">
					                    			<div class="row">
					                    				<div class="col-lg-12">
															<a href="javascript:;" data-bs-toggle="modal" data-bs-target="#kt_modal_adddept">
																<button type="button" class="btn btn-primary" id="export">
																<span class="svg-icon svg-icon-2">
																	<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																		<rect opacity="0.5" x="11.364" y="20.364" width="16" height="2" rx="1" transform="rotate(-90 11.364 20.364)" fill="currentColor" />
																		<rect x="4.36396" y="11.364" width="16" height="2" rx="1" fill="currentColor" />
																	</svg>
																</span>New Payment</button>
															</a>
														</div>
					                    			</div>
					                    		</div>
											</div>
										</form>
										<!--begin::Card body-->
										<div class="card-body py-4">
											<!--begin::Table-->
											<table class="table align-middle table-row-dashed table-striped table-hover fs-7 gy-1 gs-2" id="kt_datatable_dom_positioning">
												<!--begin::Table head-->
												<thead>
													<!--begin::Table row-->
													<tr class="text-start text-muted fw-bold fs-7 gs-0">
														<!-- <th class="min-w-125px cy" style="width: 20%;">Company</th> -->
														<th class="min-w-125px">SNo</th>
														<th class="min-w-125px">Date</th>
														<th class="min-w-125px">Ledger</th>
														<th class="min-w-125px">Amount</th>
														<th class="min-w-125px">Paid By</th>
														<th class="min-w-125px">Description</th>
														<th class="min-w-125px"><span class="text-end">Actions</span></th>
													</tr>
													<!--end::Table row-->
												</thead>
												<!--end::Table head-->
												<!--begin::Table body-->
												<tbody class="text-gray-600 fw-semibold">
													<!--begin::Table row-->
													<?php $i=1; foreach($payment_list as $dlist){
														$pledger = $this->Payment_model->get_ledger_details_by_voucher_master_no($dlist['MASTER_SNO']);
														$lname = '';$amt=0;foreach($pledger as $pl)
														{
															$lname.=$pl['LEDGER_NAME'].',';
														}
														$lname = rtrim($lname,',');


														$pbyledger = $this->Payment_model->get_paidby_ledger_details_by_voucher_master_no($dlist['MASTER_SNO']);
														$pbylname = '';$amt=0;foreach($pbyledger as $pbyl)
														{
															$pbylname.=$pbyl['LEDGER_NAME'].',';
														}
														$pbylname = rtrim($pbylname,',');
														?>
													<tr>
														
														<td><?php echo $dlist['MASTER_SNO'];?></td>
														<td><?php echo $dlist['TRANSDATE'];?></td>
														<td><?php echo $lname;?></td>
														<td><?php echo number_format($dlist['AMOUNT'],2);?></td>
														<td><?php echo $pbylname;?></td>
														<td><?php echo $dlist['DESCRIPTION'];?></td>
														<td>
															<a href="javascript:;" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1" data-bs-toggle="modal" data-bs-target="#kt_modal_editpayment" onclick="payment_edit('<?php echo $dlist['MASTER_SNO'];?>')">
																				<!--begin::Svg Icon | path: icons/duotune/art/art005.svg-->
																				<span class="svg-icon svg-icon-3">
																					<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																						<path opacity="0.3" d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z" fill="currentColor"></path>
																						<path d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z" fill="currentColor"></path>
																					</svg>
																				</span>
																				<!--end::Svg Icon-->
																			</a>

																			<a href="javascript:;" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm" data-bs-toggle="modal" data-bs-target="#kt_modal_delete_payment" onclick="payment_delete('<?php echo $dlist['MASTER_SNO'];?>')">
																				<!--begin::Svg Icon | path: icons/duotune/general/gen027.svg-->
																				<span class="svg-icon svg-icon-3">
																					<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																						<path d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z" fill="currentColor"></path>
																						<path opacity="0.5" d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z" fill="currentColor"></path>
																						<path opacity="0.5" d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z" fill="currentColor"></path>
																					</svg>
																				</span>
																				<!--end::Svg Icon-->
																			</a>
														</td>
													</tr>
													<?php $i++;}?>
													<!--end::Table row-->
												</tbody>
												<!--end::Table body-->
											</table>
											<!--end::Table-->
										</div>
										<!--end::Card body-->
									</div>
									<!--end::Tables Widget 9-->
								</div>
								<!--end::Col-->
							</div>
							<!--end::Row-->
						</div>
						<!--end::Container-->
					</div>
					<!--end::Content-->
				<?php $this->load->view("footer");?>
				</div>
				<!--end::Wrapper-->
			</div>
			<!--end::Page-->
		</div>
		<!--end::Root-->

		<!--begin::Modal - edit company-->
		<div class="modal fade" id="kt_modal_editdept" tabindex="-1" aria-hidden="true">
			
		</div>
		<!--end::Modal - edit company-->

		<!--begin::Modal - add department-->
		<div class="modal fade" id="kt_modal_adddept" tabindex="-1" aria-hidden="true">
			
			<!--begin::Modal dialog-->
			<div class="modal-dialog modal-xl">
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
					<!--begin::Modal body-->
					<div class="modal-body pt-0 pb-15 px-5 px-xl-20">
						<!--begin::Heading-->
						<div class="mb-7 text-center">
							<h1>Payment Entry [Spend Money,Expenses]</h1>
						</div>
						<!--end::Heading-->
						<form id="general_validate" style="width: 100%;" method="POST" action="<?php echo base_url(); ?>payment/payment_save" enctype="multipart/form-data" onsubmit="return payment_validation();">
							<!-- <input type="hidden" id="keyval" name="keyval" value="<?php //echo $kval;?>"> -->
							<div class="row">
								<div class="col-lg-8">
									<div class="row">
										<label class="col-lg-1 col-form-label required fw-semibold fs-6">Date</label>
										<div class="col-lg-3 fv-row">
											<div class="d-flex align-items-center">
												<input type="date" class="form-control form-control-solid" name="add_date_payments" placeholder="Select Date" id="add_date_payments" />
											</div>
											<div class="fv-plugins-message-container invalid-feedback" id="add_date_payments_err"></div>
										</div>
										<label class="col-lg-1 col-form-label fw-semibold fs-6">Sno</label>
										<div class="col-lg-3 fv-row fv-plugins-icon-container">
											<input type="text" name="sno" id="sno" class="form-control form-control-lg form-control-solid" value="<?php echo $sno;?>" readonly>
											<div class="fv-plugins-message-container invalid-feedback"></div>
										</div>
										<div class="col-lg-3 fv-row fv-plugins-icon-container">
											<input type="text" name="detail_sno" id="detail_sno" class="form-control form-control-lg form-control-solid" value="<?php echo $detail_sno;?>" readonly>
											<div class="fv-plugins-message-container invalid-feedback" id="detail_sno_err"></div>
										</div>
									</div>
								</div>
								<div class="col-lg-4">
									<div class="row">
										<label class="col-lg-3 col-form-label fw-bold fs-5">User :</label>
										<!-- <label class="col-lg-9 close-form close-form-solid fw-bold text-danger fs-4"><?php //echo $_SESSION['username'];?></label> -->
										<div class="col-lg-9 col-form-label">
											<label class="badge badge-primary text-black fw-bold fs-5"><?php echo $_SESSION['username'];?></label>
										</div>
									</div>
									<div class="row">
										<label class="col-lg-3 col-form-label fw-bold fs-5">Time :</label>
										<!-- <label class="col-lg-9 close-form close-form-solid fw-bold text-danger fs-4"><?php //date_default_timezone_set('Asia/Kolkata');echo date("d M Y h:i:sa"); ?></label> -->
										<div class="col-lg-9 col-form-label">
											<label class="badge badge-primary text-black fw-bold fs-5"><?php date_default_timezone_set('Asia/Kolkata');echo date("d M Y h:i:sa"); ?></label>
										</div>
									</div>
								</div>
							</div>
							<!-- <div class="row">
								<label class="col-lg-1 col-form-label required fw-semibold fs-6">Date</label>
								<div class="col-lg-2 fv-row">
									<div class="d-flex align-items-center">
										<input type="date" class="form-control form-control-solid" name="add_date_payments" placeholder="Select Date" id="add_date_payments" />
									</div>
									<div class="fv-plugins-message-container invalid-feedback" id="add_date_payments_err"></div>
								</div>
								<div class="col-lg-3 col-form-label">
									<label class="fw-semibold fs-6 me-1">Payment ID </label>
									<label class="fw-bold fs-6"><?php echo $sno;?></label>
									<label class="fw-bold fs-6">/</label>
									<label class="fw-bold fs-6"><?php echo $detail_sno;?></label>
								</div>
								<div class="col-lg-3 col-form-label">
									<label class="fw-semibold fs-6 me-2">User</label>
									<label class="badge badge-primary text-black fw-bold fs-5"><?php echo $_SESSION['username'];?></label>
								</div>
								
								<div class="col-lg-3 col-form-label">
									<label class="fw-semibold fs-6 me-2">Time</label>
									<label class="badge badge-primary text-black fw-bold fs-5"><?php date_default_timezone_set('Asia/Kolkata');echo date("d M Y h:i:sa"); ?></label>
								</div>
							</div> -->
							<div class="row">
								<div class="col-lg-12">
									<div id="kt_docs_repeater_basic_add">
										<div class="form-group">
											<div id="mcontent10">
												<div class="row" id="mid0">
													<label class="col-lg-2 col-form-label fw-semibold fs-6">Account Ledger</label>
													<div class="col-lg-3 fv-row">
														<input type="text" class="form-control form-control-lg form-control-solid" name="account_led_name[]" id="account_led_name0" onkeyup="ledger_autocomplete(0);"><span id="opbal0"></span>
														<input type="hidden" class="form-control form-control-lg form-control-solid" name="account_led_id[]" id="account_led_id0">
														<div class="fv-plugins-message-container invalid-feedback" id="account_led_id_err0"></div>
													</div>
													<label class="col-lg-1 col-form-label fw-semibold fs-6">Amount</label>
													<div class="col-lg-3 fv-row">
														<input type="text" class="form-control mb-2 mb-md-0" placeholder="Enter Amount" name="add_amt_payments[]" id="add_amt_payments0" style="font-size: 17px !important;font-weight: 600 !important;" onkeyup="getPaymentAmount(0)" onkeypress="return isNumberKey(event,this);"/>
														<div class="fv-plugins-message-container invalid-feedback" id="add_amt_payments_err0"></div>
													</div>
													<!-- <div class="col-lg-2 fv-row">
														<a href="javascript:;" data-repeater-delete="" class="btn btn-sm btn-danger mt-md-3">
														<i class="la la-trash-o fs-3"></i>Delete</a>
													</div> -->
												</div>
											</div>
										</div>
										<div class="col-lg-2 form-group fv-row">
											<a href="javascript:;" onclick="add_payment()" class="btn btn-sm btn-outline btn-outline-solid btn-outline-warning btn-active-light-primary me-2">
											Add</a>
										</div>
									</div>
									<input type="hidden" id="acc_led_id" value="1">
								</div>
							</div>
							<div class="row">
								<label class="col-lg-2 col-form-label required fw-semibold fs-6">Paid From</label>
								<div class="col-lg-3 fv-row">
									<input type="text" class="form-control form-control-lg form-control-solid" name="paid_account_led_name" id="paid_account_led_name" onkeyup="paid_ledger_autocomplete();">
									<input type="hidden" class="form-control form-control-lg form-control-solid" name="paid_account_led_id" id="paid_account_led_id">
									<div class="fv-plugins-message-container invalid-feedback" id="paid_account_led_id_err"></div>
								</div>
								<label class="col-lg-1 col-form-label required fw-semibold fs-6">Total</label>
								<div class="col-lg-3 fv-row">
									<input type="text" class="form-control mb-2 mb-md-0" id="add_tota_payments" name="add_tota_payments" style="font-size: 17px !important;font-weight: 600 !important;" readonly/>
								</div>
								<label class="col-lg-1 col-form-label fw-semibold fs-6">Description</label>
								<div class="col-lg-2 fv-row fv-plugins-icon-container">
									<textarea class="form-control form-control-solid" id="description" name="description" rows="2" style="margin-top: 8px !important;"></textarea>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-3 fv-row fv-plugins-icon-container fv-plugins-bootstrap5-row-invalid">
									<div class="d-flex align-items-center">
										<label class="form-check form-check-inline form-check-solid me-5 is-invalid">
											<input class="form-check-input" name="communication[]" type="checkbox" value="1">
										</label>
										<span class="col-form-label fw-semibold fs-6">Save & Print</span>
									</div>
								</div>
								<!-- <div class="col-lg-3 fv-row fv-plugins-icon-container fv-plugins-bootstrap5-row-invalid">
									<div class="d-flex align-items-center">
										<label class="form-check form-check-inline form-check-solid me-5 is-invalid">
											<input class="form-check-input" name="show_party" id="show_party" type="checkbox">
										</label>
										<span class="col-form-label fw-semibold fs-6">Show Loans Parties</span>
									</div>
								</div> -->
								<!-- <div class="col-lg-1">
									<div class="d-flex flex-center flex-row-fluid pt-2">
										<button type="submit" class="btn btn-outline btn-outline-solid btn-outline-warning btn-active-light-primary me-10" data-bs-dismiss="modal">Print</button>
									</div>
								</div> -->
								<!-- <div class="col-lg-1">
									<div class="d-flex flex-center flex-row-fluid pt-2">
										<button type="reset" class="btn btn-secondary me-3" data-bs-dismiss="modal">Cancel</button>
									</div>
								</div>
								<div class="col-lg-2">
									<div class="d-flex flex-center flex-row-fluid pt-2">
										<button type="submit" class="btn btn-primary" id="save_changes_add_payments">Save Changes</button>
									</div>
								</div> -->
							</div>
							<div class="d-flex align-items-center justify-content-end mt-6">
								<button type="reset" class="btn btn-secondary me-3" data-bs-dismiss="modal">Cancel</button>
								<button type="submit" class="btn btn-primary" id="save_changes_add_payments">Save Changes</button>
							</div>
						</form>
					</div>
					<!--end::Modal body-->
				</div>
				<!--end::Modal content-->
			</div>
			<!--end::Modal dialog-->
		</div>
		<!--end::Modal - add department-->
		
		<!--begin::Modal - edit company-->
		<div class="modal fade" id="kt_modal_editpayment" tabindex="-1" aria-hidden="true">
			
		</div>
		<!--end::Modal - edit company-->
		<!--begin::Modal - view company-->
<div class="modal fade" id="kt_modal_viewdept" tabindex="-1" aria-hidden="true">
			<!--begin::Modal dialog-->
			<div class="modal-dialog modal-m">
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
					<!--begin::Modal body-->
					<div class="modal-body pt-0 pb-15 px-5 px-xl-20">
						<!--begin::Heading-->
						<div class="mb-13 text-center">
							<h1 class="mb-3">Payment Details</h1>
						</div>
						<!--end::Heading-->
						<div class="row mb-6">
							<!--begin::Label-->
							<label class="col-lg-4 col-form-label fw-semibold fs-6">Company</label>
							<!--end::Label-->
							<!--begin::Left Section-->
												<div class="col-lg-8">
												<!--begin::Select-->
													<select class="form-select form-select-solid" data-control="select2" data-placeholder="Select Company" data-hide-search="true" disabled>
														<option value="3">Ayyanar Gold Bank</option>
														<option value="3">Ayyanar Gold Bank 1</option>
														<option value="3">Ayyanar Gold Bank 2</option>
														<option value="1">Ayyanar Gold Bank 3</option>
														<option value="3">Ayyanar Gold Bank 4</option>
													</select>
													<!--end::Select-->
												</div>
											<!--end::Left Section-->
						</div>
							<div class="row mb-6">
								<!--begin::Label-->
												<label class="col-lg-4 col-form-label fw-semibold fs-6">Dept</label>
												<!--end::Label-->
												<!--begin::Col-->
												<div class="col-lg-8 fv-row fv-plugins-icon-container">
													<input type="text" name="company" class="form-control form-control-lg form-control-solid" placeholder="Payment Name" Value="Accounts" disabled>
													<div class="fv-plugins-message-container invalid-feedback"></div>
												</div>
												<!--end::Col-->	
							</div>
					</div>
					<!--end::Modal body-->
				</div>
				<!--end::Modal content-->
			</div>
			<!--end::Modal dialog-->
		</div>
		<!--End::View Company-->
		<!--begin::Modal - delete department-->
		<div class="modal fade" id="kt_modal_delete_department" tabindex="-1" aria-hidden="true">
			
		</div>
		<!--end::Modal - delete department-->

		<div class="modal fade" id="kt_modal_delete_payment" tabindex="-1" aria-hidden="true">
			
		</div>

		<input type="hidden" id="baseurl" value="<?php echo base_url();?>">
		<?php $this->load->view("script");?>
		<script src="<?php echo base_url();?>assets/jquery.autocomplete.js"></script>
		<script>

var title = $('title').text() + ' | ' + 'Payment';
    $(document).attr("title", title);

var base = $('#baseurl').val();



function isNumberKey(evt, obj)
{ 
    var charCode = (evt.which) ? evt.which : event.keyCode
    var value = obj.value;
    var dotcontains = value.indexOf(".") != -1;
    if (dotcontains)
        if (charCode == 46) return false;
    if (charCode == 46) return true;
    if (charCode > 31 && (charCode < 48 || charCode > 57))
        return false;
    return true;
}


function payment_validation()
{
    var err = 0;
    var detail_sno = $('#detail_sno').val();
    var paid_account_led_id = $('#paid_account_led_id').val();
    var add_date_payments = $('#add_date_payments').val();

    if(add_date_payments.trim()==''){
        $('#add_date_payments_err').html('Date is required!');
        err++;
    }else{
        $('#add_date_payments_err').html('');
    }

    if(detail_sno.trim()==''){
        $('#detail_sno_err').html('Detail SNO is required!');
        err++;
    }else{
        $('#detail_sno_err').html('');
    }

    if(paid_account_led_id.trim()==''){
        $('#paid_account_led_id_err').html('Account Ledger is required!');
        err++;
    }else{
        $('#paid_account_led_id_err').html('');
    }

    var bav=0
$("div[id^='mid']").each(function(){
  var id = this.id;
  var res = id.substring(3);
  var account_led_id=$('#account_led_id'+res).val();
  var add_amt_payments=$('#add_amt_payments'+res).val();
     
     if(bav==0)  
  {
    if(account_led_id==''){
        $('#account_led_id_err'+res).html('Account Ledger is required!');
        err++;
      }else{
        $('#account_led_id_err'+res).html('');
      }
      if(add_amt_payments==''){
        $('#add_amt_payments_err'+res).html('Amount is required!');
        err++;
      }else{
        $('#add_amt_payments_err'+res).html('');
      }
  }
  else
  {
    if(account_led_id!='' && add_amt_payments==''){
        $('#add_amt_payments_err'+res).html('Amount is required!');
        err++;
      }else{
        $('#add_amt_payments_err'+res).html('');
      }
  }
  bav++;
});
    

    if(err>0){ return false; }else{ return true; }
}

function ledger_autocomplete(i)
{
	//var spval = $('#show_party').val();
	/*var spval = $('#show_party').is(":checked");
	var showparty = '';
	if(spval)
	{
		showparty = 1;
	}
	else
	{
		showparty = 0;
	}*/
	var showparty = 0;
	//alert(showparty);
	$("#account_led_name"+i).autocomplete({ 
            valueKey:'title',
            source:[{
            url: base+'payment/get_payment_ledger?type=PRO_MANA&query=%QUERY%&showparty='+showparty,
            type:'remote',
            ajax:{

              dataType : 'json',
            }
        }]}).on('selected.xdsoft',function(e,suggestion,ui){ 
            $("#account_led_name"+i).val(suggestion.title);
            $('#account_led_id'+i).val(suggestion.id);
            $('#opbal'+i).html(suggestion.opbal);
          
    });
        $("#account_led_name"+i).focus();
}



function paid_ledger_autocomplete()
{
	$("#paid_account_led_name").autocomplete({ 
            valueKey:'title',
            source:[{
            url: base+'payment/get_payment_paid_ledger?type=PRO_MANA&query=%QUERY%',
            type:'remote',
            ajax:{

              dataType : 'json',
            }
        }]}).on('selected.xdsoft',function(e,suggestion,ui){ 
            $("#paid_account_led_name").val(suggestion.title);
            $('#paid_account_led_id').val(suggestion.id);
          
    });
        $("#paid_account_led_name").focus();
}

function getPaymentAmount(i)
{
	var gamt = 0;
    $("input[id^='account_led_id']").each(function(){
        var id = this.id;
        var res = id.substring(14);
        var amt = $('#add_amt_payments'+res).val();
        if(amt=='')
        {
        	amt=0;
        }
        gamt = parseFloat(gamt)+parseFloat(amt);
    });

    $('#add_tota_payments').val(gamt.toFixed(2));
}

function add_payment()
{
    var count=$('#acc_led_id').val();
    var cont = $("#mcontent10");
    
    cont.append('<div class="row" id="mid'+count+'"><label class="col-lg-2 col-form-label fw-semibold fs-6">Account Ledger</label><div class="col-lg-3 fv-row"><input type="text" class="form-control form-control-lg form-control-solid" name="account_led_name[]" id="account_led_name'+count+'" onkeyup="ledger_autocomplete('+count+');"><span id="opbal'+count+'"></span><input type="hidden" class="form-control form-control-lg form-control-solid" name="account_led_id[]" id="account_led_id'+count+'"><div class="fv-plugins-message-container invalid-feedback" id="account_led_id_err'+count+'"></div></div><label class="col-lg-1 col-form-label fw-semibold fs-6">Amount</label><div class="col-lg-3 fv-row"><input type="text" class="form-control mb-2 mb-md-0" placeholder="Enter Amount" name="add_amt_payments[]" id="add_amt_payments'+count+'" style="font-size: 17px !important;font-weight: 600 !important;" onkeyup="getPaymentAmount('+count+')" onkeypress="return isNumberKey(event,this);"/><div class="fv-plugins-message-container invalid-feedback" id="add_amt_payments_err'+count+'"></div></div><div class="col-lg-2 fv-row"><a href="javascript:;" onclick="delete_payment('+count+')" class="btn btn-sm btn-danger mt-md-3"><i class="la la-trash-o fs-3"></i>Delete</a></div></div>');


    count=Number(count)+1;
    $('#acc_led_id').val(count);

}

function delete_payment(i)
{
	$('#mid'+i).remove();

	var gamt = 0;
    $("input[id^='account_led_id']").each(function(){
        var id = this.id;
        var res = id.substring(14);
        var amt = $('#add_amt_payments'+res).val();
        if(amt=='')
        {
        	amt=0;
        }
        gamt = parseFloat(gamt)+parseFloat(amt);
    });

    $('#add_tota_payments').val(gamt.toFixed(2));
}






function payment_edit_validation()
{
    var err = 0;
    var detail_sno_edit = $('#detail_sno_edit').val();
    var paid_account_led_id_edit = $('#paid_account_led_id_edit').val();
    var add_date_payments_edit = $('#add_date_payments_edit').val();

    if(add_date_payments_edit.trim()==''){
        $('#add_date_payments_edit_err').html('Date is required!');
        err++;
    }else{
        $('#add_date_payments_edit_err').html('');
    }

    if(detail_sno_edit.trim()==''){
        $('#detail_sno_edit_err').html('Detail SNO is required!');
        err++;
    }else{
        $('#detail_sno_edit_err').html('');
    }

    if(paid_account_led_id_edit.trim()==''){
        $('#paid_account_led_id_edit_err').html('Account Ledger is required!');
        err++;
    }else{
        $('#paid_account_led_id_edit_err').html('');
    }

    var bav=0
$("div[id^='mid_edit']").each(function(){
  var id = this.id;
  var res = id.substring(8);
  var account_led_id_edit=$('#account_led_id_edit'+res).val();
  var add_amt_payments_edit=$('#add_amt_payments_edit'+res).val();
     
     if(bav==0)  
  {
    if(account_led_id_edit==''){
        $('#account_led_id_edit_err'+res).html('Account Ledger is required!');
        err++;
      }else{
        $('#account_led_id_edit_err'+res).html('');
      }
      if(add_amt_payments_edit==''){
        $('#add_amt_payments_edit_err'+res).html('Amount is required!');
        err++;
      }else{
        $('#add_amt_payments_edit_err'+res).html('');
      }
  }
  else
  {
    if(account_led_id_edit!='' && add_amt_payments_edit==''){
        $('#add_amt_payments_edit_err'+res).html('Amount is required!');
        err++;
      }else{
        $('#add_amt_payments_edit_err'+res).html('');
      }
  }
  bav++;
});
    

    if(err>0){ return false; }else{ return true; }
}

function ledger_autocomplete_edit(i)
{
	//var spval = $('#show_party').val();
	var spval = $('#show_party').is(":checked");
	/*var showparty = '';
	if(spval)
	{
		showparty = 1;
	}
	else
	{
		showparty = 0;
	}*/
	var showparty = 0;
	//alert(showparty);
	$("#account_led_name_edit"+i).autocomplete({ 
            valueKey:'title',
            source:[{
            url: base+'payment/get_payment_ledger?type=PRO_MANA&query=%QUERY%&showparty='+showparty,
            type:'remote',
            ajax:{

              dataType : 'json',
            }
        }]}).on('selected.xdsoft',function(e,suggestion,ui){ 
            $("#account_led_name_edit"+i).val(suggestion.title);
            $('#account_led_id_edit'+i).val(suggestion.id);
            $('#opbal_edit'+i).html(suggestion.opbal);
          
    });
        $("#account_led_name_edit"+i).focus();
}



function paid_ledger_autocomplete_edit()
{
	$("#paid_account_led_name_edit").autocomplete({ 
            valueKey:'title',
            source:[{
            url: base+'payment/get_payment_paid_ledger?type=PRO_MANA&query=%QUERY%',
            type:'remote',
            ajax:{

              dataType : 'json',
            }
        }]}).on('selected.xdsoft',function(e,suggestion,ui){ 
            $("#paid_account_led_name_edit").val(suggestion.title);
            $('#paid_account_led_id_edit').val(suggestion.id);
          
    });
        $("#paid_account_led_name_edit").focus();
}

function getPaymentAmountEdit(i)
{
	var gamt = 0;
    $("input[id^='account_led_id_edit']").each(function(){
        var id = this.id;
        var res = id.substring(19);
        var amt = $('#add_amt_payments_edit'+res).val();
        if(amt=='')
        {
        	amt=0;
        }
        gamt = parseFloat(gamt)+parseFloat(amt);
    });

    $('#add_tota_payments_edit').val(gamt.toFixed(2));
}

function add_payment_edit()
{
    var count=$('#acc_led_id_edit').val();
    var cont = $("#mcontent_edit10");
    
    cont.append('<div class="row" id="mid_edit'+count+'"><label class="col-lg-2 col-form-label fw-semibold fs-6">Account Ledger</label><div class="col-lg-3 fv-row"><input type="text" class="form-control form-control-lg form-control-solid" name="account_led_name[]" id="account_led_name_edit'+count+'" onkeyup="ledger_autocomplete_edit('+count+');"><span id="opbal_edit'+count+'"></span><input type="hidden" class="form-control form-control-lg form-control-solid" name="account_led_id[]" id="account_led_id_edit'+count+'"><div class="fv-plugins-message-container invalid-feedback" id="account_led_id_edit_err'+count+'"></div></div><label class="col-lg-1 col-form-label fw-semibold fs-6">Amount</label><div class="col-lg-3 fv-row"><input type="text" class="form-control mb-2 mb-md-0" placeholder="Enter Amount" name="add_amt_payments[]" id="add_amt_payments_edit'+count+'" style="font-size: 17px !important;font-weight: 600 !important;" onkeyup="getPaymentAmountEdit('+count+')" onkeypress="return isNumberKey(event,this);"/><div class="fv-plugins-message-container invalid-feedback" id="add_amt_payments_edit_err'+count+'"></div></div><div class="col-lg-2 fv-row"><a href="javascript:;" onclick="delete_payment_edit('+count+')" class="btn btn-sm btn-danger mt-md-3"><i class="la la-trash-o fs-3"></i>Delete</a></div></div>');


    count=Number(count)+1;
    $('#acc_led_id_edit').val(count);

}

function delete_payment_edit(i)
{
	$('#mid_edit'+i).remove();

	var gamt = 0;
    $("input[id^='account_led_id_edit']").each(function(){
        var id = this.id;
        var res = id.substring(19);
        var amt = $('#add_amt_payments_edit'+res).val();
        if(amt=='')
        {
        	amt=0;
        }
        gamt = parseFloat(gamt)+parseFloat(amt);
    });

    $('#add_tota_payments_edit').val(gamt.toFixed(2));
}



			function dy_pd() 
			{
				var day_period = document.getElementById("day_period").value;
				 if(day_period == 'period')
				  {
				  	$("#period_date").show();
				  }
				  else
				  {
				  	$("#period_date").hide();
				  }
			}

			

function payment_edit(val){
var baseurl= $("#baseurl").val();
//alert(val);
$.ajax({
type: "POST",
url: baseurl+'payment/payment_edit',
async: false,
type: "POST",
data: "id="+val,
dataType: "html",
success: function(response)
{
$('#kt_modal_editpayment').empty().append(response);
$('#kt_modal_editpayment').addClass('show');
//$("#kt_modal_editdept").css("display", "block");
}
});
}

function closeEditModal()
{
	var baseurl= $("#baseurl").val();
	$('#kt_modal_editpayment').removeClass('show');
	//$("#kt_modal_update_role").css("display", "none");
	$('.modal-backdrop').removeClass('show');
	window.location.href = baseurl+'payment';
}

function payment_delete(val){
var baseurl= $("#baseurl").val();
//alert(val);
$.ajax({
type: "POST",
url: baseurl+'payment/payment_delete',
async: false,
type: "POST",
data: "id="+val,
dataType: "html",
success: function(response)
{
$('#kt_modal_delete_payment').empty().append(response);
$('#kt_modal_delete_payment').addClass('show');
//$("#kt_modal_delete_role").css("display", "block");
}
});
}

function removePayment(val)
{ 
var baseurl= $("#baseurl").val();
$.ajax({
type: "POST",
url: baseurl+'payment/delete',
async: false,
data:"field="+val,
success: function(response)
{
window.location.href = baseurl+'payment';
}
});
}

function closeDeleteModal()
{
	var baseurl= $("#baseurl").val();
	$('#kt_modal_delete_payment').removeClass('show');
	$('.modal-backdrop').removeClass('show');
	window.location.href = baseurl+'payment';
}	

// $('#kt_datatable_dom_positioning').DataTable( {
// 	"aaSorting": [],
//         dom: 'Bfrtip',
//         buttons: [
//             'copyHtml5',
//             'excelHtml5',
//             'csvHtml5',
//             'pdfHtml5'
//         ]
//     } );


    $("#kt_datatable_dom_positioning").DataTable({
		"ordering": false,
		// "aaSorting":[],
		// "buttons": [
		//             'copy', 'csv', 'excel', 'pdf', 'print'
		//         ],
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

		
		// $("#add_date_payments").flatpickr({
		// 		dateFormat: "d/m/Y",
		// 	});	
		</script>
	</body>
	<!--end::Body-->
</html>