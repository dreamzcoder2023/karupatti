<?php $this->load->view("common");?>
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
									<h1 class="d-flex align-items-center text-dark fw-bold my-1 fs-3">Ledger List
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
									<form method="POST" action="<?php echo base_url(); ?>accountsledger" enctype="multipart/form-data"> 
									<!--begin::Tables Widget 9-->
									<div class="card card-xxl-stretch mb-5 mb-xl-8">
										
										
									<!--begin::Card header-->
									<div class="row" style="padding: 1rem 1rem 0rem 1rem !important;">
											<div class="col-2">
												<label class="col-lg-12 col-form-label fw-semibold fs-6">Account Type</label>
												<select class="form-select form-select-solid" data-control="select2" data-hide-search="true"  id="acc_grp" name="acc_grp"  onchange=" return get_acc_main_grp_list();">
														<option value="ALL">ALL</option>
														<?php 
														
														$acc_grp_res=$this->Accountsledger_model->get_dd_acc_group_list();
														// $acc_grp_res = $acc_grp_qry->result_array();
														foreach ($acc_grp_res as $acc_list) 
														{
														?>
														
														<option value="<?php echo $acc_list['GROUP_SNO']; ?>" <?php  if ($acc_type==$acc_list['GROUP_SNO']){echo "selected";} ?> > <?php echo $acc_list['GROUP_NAME']; ?> </option>
														<?php 
														}
														?>
													</select>
											</div>
											<div class="col-2">
												<label class="col-lg-12 col-form-label fw-semibold fs-6">Main Group</label>

												<select class="form-select form-select-solid" data-control="select2" data-hide-search="true"  id="acc_main_grp" name="acc_main_grp" onchange=" return get_acc_sub_grp_list();" >
														<option value="ALL">ALL</option>
														<?php 
														
														$acc_grp_res=$this->Accountsledger_model->get_acc_main_grp_list('ALL');
														// $acc_grp_res = $acc_grp_qry->result_array();
														foreach ($acc_grp_res as $acc_list) 
														{
														?>
														
														<option value="<?php echo $acc_list['GROUP_SNO']; ?>"  <?php  if ($acc_main==$acc_list['GROUP_SNO']){echo "selected";} ?>  > <?php echo $acc_list['GROUP_NAME']; ?> </option>
														<?php 
														}
														?>
													</select>
											</div>
											<div class="col-2">
												<label class="col-lg-12 col-form-label fw-semibold fs-6">User Group</label>
												<select class="form-select form-select-solid" data-control="select2" data-hide-search="true"  id="acc_sub_grp" name="acc_sub_grp"  >
														<option value="ALL">ALL</option>
														<?php 
														
														$acc_grp_res=$this->Accountsledger_model->get_acc_sub_grp_list('ALL');
														// $acc_grp_res = $acc_grp_qry->result_array();
														foreach ($acc_grp_res as $acc_list) 
														{
														?>
														
														<option value="<?php echo $acc_list['GROUP_SNO']; ?>" <?php  if ($acc_sub==$acc_list['GROUP_SNO']){echo "selected";} ?>> <?php echo $acc_list['GROUP_NAME']; ?> </option>
														<?php 
														}
														?>
													</select>
											</div>
											<div class="col-2">
												<!-- <br><br><br> -->
												<input class="form-check-input my-15" name="party_chk" id="party_chk" type="checkbox" <?php if($show_party=="on"){echo "checked";} ?> > <label class=" col-form-label fw-semibold fs-6  my-12">Show Parties</label>
											</div>
											<div class="col-2">
												<!-- <br><br><br> -->
												<button type="submit" class="btn btn-sm btn-outline btn-outline-solid  my-15 btn-outline-warning btn-active-light-primary">Go</button>
											</div>
											
										</div>
										<?php if($this->session->flashdata('g_success')){?>
			                        <div class="alert alert-success" id="alertaddmessage">
			                         <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
			                        <?php echo $this->session->flashdata('g_success'); ?>
			                        </div>
			                        <?php } ?>

			                        <?php if($this->session->flashdata('g_err')){?>
			                        <div class="alert alert-danger" id="alertaddmessage">
			                         <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
			                        <?php echo $this->session->flashdata('g_err'); ?>
			                        </div>
			                        <?php } ?>
									<div class="card-header border-0 pt-6">
										<!--begin::Card title-->
										<div class="card-title">
										
										</div>
									<!--begin::Card title-->
										<!--begin::Card toolbar-->
										<div class="card-toolbar">
										<!--begin::Toolbar-->
										<div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
												
											<!--begin::Add user-->
											
											<button type="button" class="btn btn-primary"  data-bs-toggle="modal" data-bs-target="#kt_modal_new_account_ledger">
											<!--begin::Svg Icon | path: icons/duotune/arrows/arr075.svg-->
											<span class="svg-icon svg-icon-2">
												<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
													<rect opacity="0.5" x="11.364" y="20.364" width="16" height="2" rx="1" transform="rotate(-90 11.364 20.364)" fill="currentColor" />
													<rect x="4.36396" y="11.364" width="16" height="2" rx="1" fill="currentColor" />
												</svg>
											</span>
											<!--end::Svg Icon-->New Ledger</button>
											<!--end::Add user-->
										</div>
										<!--end::Toolbar-->

									</div>
									</form>
									<!--end::Card toolbar-->
								</div>
								<!--begin::Card body-->
								<div class="card-body py-4">
									<!--begin::Table-->
									<table class="table align-middle table-row-dashed table-striped table-hover fs-6 gy-2" id="acc_ledger_list">
										<!--begin::Table head-->
										<thead>
											<!--begin::Table row-->
											<tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">
												<th class="min-w-25px cy">Sno</th>
												<th class="min-w-80px">Ledger ID</th>
												<th class="min-w-200px">Ledger Name</th>
												<th class="min-w-100px">Main Group</th>
												<th class="min-w-80px">Type</th>
												<th class="min-w-125px">Opening Balance</th>
												<th class="min-w-25px">Cr/Dr</th>
												<th class="min-w-100px">Description</th>
												<th class="min-w-25px" style="width: 10%;">Pre-defined</th>
												<th class="min-w-35px" style="width: 15%;"><span class="text-end">Actions</span></th>
											</tr>
											<!--end::Table row-->
										</thead>
										<!--end::Table head-->
										<!--begin::Table body-->
										<tbody class="text-gray-600 fw-semibold">
											<?php $i=1; foreach($acc_ledger_list as $aglist){?>
											<tr>
												<td class="cy"><?php echo $i; ?></td>
												<td><?php echo $aglist['LEDGER_SNO']; ?></td>
												<td><?php echo $aglist['LEDGER_NAME']; ?></td>
												<td>
												<?php
													if($aglist['GROUP_ID']!=0 || $aglist['GROUP_ID']!='' )
													{
													$acc_sub_grp_name=$this->Accountsledger_model->get_acc_sub_grp_name($aglist['GROUP_ID']);
												
													echo $acc_sub_grp_name; }
													else
													{
														echo " ";
													}
															?></td>
												<td><?php 
													if($aglist['SUPER_ID']==1)
													{
														echo "ASSETS";
													}
													else if($aglist['SUPER_ID']==2)
													{
														echo "LIABILITIES";
													}
													else if($aglist['SUPER_ID']==3)
													{
														echo "INCOME";
													}
													else if($aglist['SUPER_ID']==4)
													{
														echo "EXPENSE";
													}
												 	?>
												 		
												 </td>
												<td><?php if($aglist['OP_BALANCE']>0) { echo $aglist['OP_BALANCE']; } ?></td>
												<td><?php if($aglist['OP_BALANCE']>0) { echo $aglist['OP_SIDE']; } ?></td>
												<td class="ple1"><?php echo $aglist['DESCRIPTION']; ?></td>
												<td><?php echo $aglist['CHK_PREDEFINED']; ?></td>
												<!--begin::Action=-->
												<td>
													<span class="text-end">
													<a href="#" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1" data-bs-toggle="modal" data-bs-target="#kt_modal_edit_account_ledger" onclick="acc_ledger_edit('<?php echo $aglist['LEDGER_SNO'];?>')">
																		<!--begin::Svg Icon | path: icons/duotune/art/art005.svg-->
																		<span class="svg-icon svg-icon-3">
																			<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																				<path opacity="0.3" d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z" fill="currentColor"></path>
																				<path d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z" fill="currentColor"></path>
																			</svg>
																		</span>
																		<!--end::Svg Icon-->
																	</a>
																	<?php if($aglist['CHK_PREDEFINED']=='N'){ ?>
													<a href="#" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm" data-bs-toggle="modal" data-bs-target="#kt_modal_delete_account_ledger" onclick="acc_ledger_delete('<?php echo $aglist['LEDGER_SNO'];?>')">
																		<!--begin::Svg Icon | path: icons/duotune/general/gen027.svg-->
																		<span class="svg-icon svg-icon-3">
																			<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																				<path d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z" fill="currentColor"></path>
																				<path opacity="0.5" d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z" fill="currentColor"></path>
																				<path opacity="0.5" d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z" fill="currentColor"></path>
																			</svg>
																		</span>
																		<!--end::Svg Icon-->
																	</a><?php } ?> </span>
												</td>
												<!--end::Action=-->
											</tr>
											<?php 
												$i++;
												}
											?>
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

							</form>
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
		<!--begin::Modal - new accgroup-->
		<div class="modal fade" id="kt_modal_new_account_ledger" tabindex="-1" aria-hidden="true">
			<!--begin::Modal dialog-->
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
					<!--begin::Modal body-->
					<form name="acc_ledger_add_form" id="acc_ledger_add_form" method="POST" action="<?php echo base_url(); ?>accountsledger/accountsledger_save" enctype="multipart/form-data" onsubmit="return add_acc_ledger_validate()"> 
					<div class="modal-body pt-0 pb-15 px-5 px-xl-20">
						<!--begin::Heading-->
						<div class="mb-2 text-center">
							<h1 class="mb-3">New Ledger</h1>
						</div>
						<!--end::Heading-->
						<div class="row">
							<div class="col-lg-9"></div>
							<div class="col-lg-3">
								<label class="col-form-label fw-semibold fs-6">Code</label>
								<label class="col-form-label fw-semibold fs-6">: 
									<?php 
										// $code_qry=$this->other_db->query("SELECT KEYVALUE FROM KEYMASTER WHERE KEYNAME='ACC_GROUPS-".$_SESSION['LOANPREFIX']."'");
										// $code_res=$code_qry->row();
										// $val= $code_res->KEYVALUE+1;
										$code = $_SESSION['LOANPREFIX'].$prefix_count;
										echo $code;
									?>

								</label>
								<input type="hidden" class="form-control form-control-lg form-control-solid" placeholder="Group Name" value="<?php echo $code; ?>" name="ledger_sno" id="ledger_sno">
							</div>
						</div>
						
						<div class="row">
							<div class="col-lg-3">
											<!--begin::Label-->
							<label class=" col-form-label required fw-semibold fs-6">Ledger Name</label>
							</div>
							<!--end::Label-->
							<!--begin::Col-->
							<div class="col-lg-3">
							<!-- <div class="col-lg-4 fv-row fv-plugins-icon-container"> -->
								<input type="text" class="form-control form-control-lg form-control-solid" placeholder="Ledger Name" value="" id="ledger_name" name="ledger_name" onkeyup="acc_ledger_unique(this.value);">
								<div class="fv-plugins-message-container invalid-feedback" id="ledger_name_err" name="ledger_name_err"></div>
							</div>
							<!--end::Col-->
						<!-- </div>
						<div class="row"> -->
							
							<div class="col-lg-2">
							<label class=" col-form-label required fw-semibold fs-6">Acc Groups</label></div>
							<div class="col-lg-4">
							
							<!--begin::Col-->
							<!-- <div class="col-lg-4 fv-row fv-plugins-icon-container"> -->
								<!--begin::Select-->
								<select class="form-select form-select-solid" data-control="select2" name="under_grp" id="under_grp" onchange="return get_grp_details(this.val)" >	
									<option value="">Select Groups</option>
									<?php 
										foreach($under_grp_list as $ulist)
										{
									?>
										<option value="<?php echo $ulist['GROUP_SNO']; ?>"> <?php echo $ulist['GROUP_NAME'] ?></option>
									<?php 
										}
									?>
								</select>
								<div class="fv-plugins-message-container invalid-feedback" id="main_grp_name_err" name="main_grp_name_err"></div>
								<!--end::Select-->
							</div>
						</div>
						
						<div class="row">
							<label class="col-lg-3 col-form-label fw-semibold fs-6">Opg Balance</label>
							<!--end::Label-->
							<!--begin::Col-->
							<div class="col-lg-2 fv-row fv-plugins-icon-container">
								<input type="text" class="form-control form-control-lg form-control-solid" placeholder="0" value="" id="opg_bal" name="opg_bal">
								<div class="fv-plugins-message-container invalid-feedback"></div>
							</div>
							<!--end::Col-->
							<div class="col-lg-2 fv-row fv-plugins-icon-container">
								<!--begin::Select-->
								<select class="form-select form-select-solid" data-control="select2" data-hide-search="true" id="bal_side" name="bal_side">	
									<option value="CR">CR</option>				
									<option value="DR">DR</option>
								</select>
								<!--end::Select-->
							</div>
								<label class="col-lg-2 col-form-label  fw-bold fs-6" id="main_grp" name="main_grp" style="color: blue;"></label>

								<label class="col-lg-2 col-form-label  fw-bold fs-6" id="sub_grp" name="sub_grp" style="color: blue;"></label>
						</div>
						<div class="row">
							<!--begin::Col-->
							<label class="col-lg-3 col-form-label fw-semibold fs-6">Remarks</label>
							<div class="col-lg-6 fv-row fv-plugins-icon-container">
								<textarea class="form-control" data-kt-autosize="true" rows="1" style="margin-top: 8px !important;" id="remarks" name="remarks"></textarea>
							</div>
							<!--end::Col-->
						</div><br>
						<div id="gaddr" name="gaddr" style="display: none; border: 1px solid black; padding: 20px;">
							<div class="row">
								<label class="col-lg-2 col-form-label fw-semibold fs-6">Address</label>
								<div class="col-lg-4 fv-row fv-plugins-icon-container"><textarea class="form-control" data-kt-autosize="true" rows="2" style="margin-top: 8px !important;" id="addr" name="addr"></textarea></div>
							<!-- </div> -->
							<!-- <div class="row"> -->
								<label class="col-lg-2 col-form-label fw-semibold fs-6">City</label>
								<div class="col-lg-4 fv-row fv-plugins-icon-container">
								<input type="text" class="form-control form-control-lg form-control-solid" placeholder="City" value="" id="city" name="city" >
								
								</div>
							</div>
							<div class="row">
								<label class="col-lg-2 col-form-label fw-semibold fs-6">State</label>
								<!--begin::Col-->
								<div class="col-lg-4 fv-row fv-plugins-icon-container">
									<!--begin::Select-->
									<select class="form-select form-select-solid" data-control="select2" name="state" id="state"  >	
										<option value="">Select States</option>
										<?php 
											$state=$this->db->query("SELECT * FROM STATES ORDER BY STATE_NAME")->result_array();

											foreach($state as $slist)
											{
										?>
											<option value="<?php echo $slist['STATE_NAME']; ?>" <?php if($slist['STATE_NAME']=='Tamil Nadu'){echo 'selected';} else {echo '';} ?> > <?php echo $slist['STATE_NAME']; ?></option>
										<?php 
											}
										?>
									</select>
									<!-- <div class="fv-plugins-message-container invalid-feedback" id=
									"main_grp_name_err" name="main_grp_name_err"></div> -->
									<!--end::Select-->
								</div>
							<!-- </div> -->
							<!-- <div class="row"> -->
								<label class="col-lg-2 col-form-label fw-semibold fs-6">Phone</label>
								<div class="col-lg-4 fv-row fv-plugins-icon-container">
								<input type="text" class="form-control form-control-lg form-control-solid" placeholder="phone" value="" id="phone" name="phone" >
								
							</div>
							</div>
							<div class="row">
								<label class="col-lg-2 col-form-label fw-semibold fs-6">Email</label>
								<div class="col-lg-4 fv-row fv-plugins-icon-container">
								<input type="text" class="form-control form-control-lg form-control-solid" placeholder="email" value="" id="email" name="email" >
								
							</div>
							<!-- </div> -->
							<!-- <div class="row"> -->
								<label class="col-lg-2 col-form-label fw-semibold fs-6">GST IN</label>
								<div class="col-lg-4 fv-row fv-plugins-icon-container">
								<input type="text" class="form-control form-control-lg form-control-solid" placeholder="gst" value="" id="gst" name="gst" >
								
								</div>
							</div>
							<div class="row">
								<label class="col-lg-2 col-form-label fw-semibold fs-6">PAN No</label>
								<div class="col-lg-4 fv-row fv-plugins-icon-container">
								<input type="text" class="form-control form-control-lg form-control-solid" placeholder="pan_no" value="" id="pan_no" name="pan_no" >
								
							</div>
							</div>
						</div>
						<!--begin::Actions-->
						<div class="row">
							<div class="col-lg-8"></div>
							<div class="col-lg-1">
								<div class="d-flex flex-center flex-row-fluid pt-12">
									<button type="reset" class="btn btn-secondary me-3" data-bs-dismiss="modal">Cancel</button>
								</div>
							</div>
							<div class="col-lg-3">
								<div class="d-flex flex-center flex-row-fluid pt-12">
									<button type="submit" class="btn btn-success" >Save Changes</button>
								</div>
							</div>
							<!-- <div class="col-lg-1"></div> -->
						</div>
						<!--end::Actions-->
					</div>
					<!--end::Modal body-->
					</form>
				</div>
				<!--end::Modal content-->
			</div>
			<!--end::Modal dialog-->
		</div>
		<!--end::Modal - new accgroup-->
        <!--begin::Modal - edit accgroup-->
		<div class="modal fade" id="kt_modal_edit_account_ledger" tabindex="-1" aria-hidden="true">
			
		</div>
		<!--end::Modal - edit accgroup-->
		<!--begin::Modal - View accgroup-->
		<div class="modal fade" id="kt_modal_view_account_ledger" tabindex="-1" aria-hidden="true">
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
						<div class="mb-2 text-center">
							<h1 class="mb-3">Ledger Details</h1>
						</div>
						<!--end::Heading-->
						<div class="row">
							<div class="col-lg-8"></div>
							<div class="col-lg-4">
								<label class="col-form-label fw-semibold fs-6">Code</label>
								<label class="col-form-label fw-semibold fs-6">: 1001</label>
							</div>
						</div>
						<div class="row">
							<label class="col-md-4 col-form-label fw-semibold fs-6">Groups</label>
							<!--begin::Col-->
							<div class="col-lg-8 fv-row fv-plugins-icon-container">
								<!--begin::Select-->
								<select class="form-select form-select-solid" placeholder="Select Groups" data-control="select2" data-hide-search="true" disabled>	
									<option value="0">Select Groups</option>
									<option value="1" selected="select">All</option>				
									<option value="2">Assets</option>
									<option value="3">Liabilites</option>
									<option value="4">Income</option>
									<option value="5">Expenses</option>
								</select>
								<!--end::Select-->
							</div>
						</div>
						<div class="row">
							<!--begin::Label-->
							<label class="col-lg-4 col-form-label fw-semibold fs-6">Ledger Name</label>
							<!--end::Label-->
							<!--begin::Col-->
							<div class="col-lg-8 fv-row fv-plugins-icon-container">
								<input type="text" name="city" class="form-control form-control-lg form-control-solid" placeholder="Group Name" value="A-Gold Interest Colculation" readonly>
								<div class="fv-plugins-message-container invalid-feedback"></div>
							</div>
							<!--end::Col-->
						</div>
						<div class="row">
							<label class="col-md-4 col-form-label fw-semibold fs-6">Acc Groups</label>
							<!--begin::Col-->
							<div class="col-lg-8 fv-row fv-plugins-icon-container">
								<!--begin::Select-->
								<select class="form-select form-select-solid" data-control="select2" data-hide-search="true" disabled>	
									<option value="0">Select Groups</option>
									<option value="1">AGB From HO Liabilites</option>				
									<option value="2">AGB To HO Payable Assets</option>
									<option value="3" selected="select">Bank Accounts</option>
									<option value="4">Bank OD A/C</option>
									<option value="5">Building Group My Home & Shop Including</option>
									<option value="6">Capital Accounts</option>
									<option value="7">Cash In Hand</option>
								</select>
								<!--end::Select-->
							</div>
						</div>
						<div class="row">
							<!--begin::Label-->
							<label class="col-lg-4 col-form-label fw-semibold fs-6">Opg Balance</label>
							<!--end::Label-->
							<!--begin::Col-->
							<div class="col-lg-5 fv-row fv-plugins-icon-container">
								<input type="text" name="city" class="form-control form-control-lg form-control-solid" placeholder="Description" value="655443" readonly>
								<div class="fv-plugins-message-container invalid-feedback"></div>
							</div>
							<!--end::Col-->
							<div class="col-lg-3 fv-row fv-plugins-icon-container">
								<!--begin::Select-->
								<select class="form-select form-select-solid" data-control="select2" data-hide-search="true" disabled>	
									<option value="1" selected="select">CR</option>				
									<option value="2">DR</option>
								</select>
								<!--end::Select-->
							</div>
						</div>
						<div class="row">
							<!--begin::Col-->
							<label class="col-lg-4 col-form-label fw-semibold fs-6">Remarks</label>
							<div class="col-lg-8 fv-row fv-plugins-icon-container">
								<textarea class="form-control" data-kt-autosize="true" rows="2" style="margin-top: 8px !important;" readonly>A - GOLD INTREST INCOME TO HO</textarea>
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
		<!--end::Modal - View accgroup-->
		<!--begin::Modal - delete accgroup-->
		<div class="modal fade" id="kt_modal_delete_account_ledger" tabindex="-1" aria-hidden="true">
			
		</div>
		<!--end::Modal - delete interestscheme-->
		<?php $this->load->view("script");?>
		<input type="hidden" id="baseurl" value="<?php echo base_url();?>">
		<script>
			$('#acc_ledger_list').DataTable( {
		"aaSorting": [],
        dom: 'Bfrtip',
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5'
        ]
    } );		
    var title = $('title').text() + ' | ' + 'Accounts Ledger';
    $(document).attr("title", title);
		</script>
		<script>
	      $("#kt_datatable_dom_positioning").kendoTooltip({
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
function get_acc_main_grp_list()
{
	var gid = $('#acc_grp').val()
	var baseurl= $("#baseurl").val();
	var chk=document.getElementById("party_chk").checked;
	 // alert(chk);
	$.ajax({
	type: "POST",
	url: baseurl+'accountsledger/get_acc_main_grp_list',
	async: false,
	type: "POST",
	data: "grpid="+gid,
	dataType: "html",
	success: function(response)
	{
		$('#acc_main_grp').empty().append(response);
	}
	});
}
function get_acc_sub_grp_list()
{
	var gid = $('#acc_main_grp').val()
	var baseurl= $("#baseurl").val();
	 // alert(zone);
	$.ajax({
	type: "POST",
	url: baseurl+'accountsledger/get_acc_sub_grp_list',
	async: false,
	type: "POST",
	data: "grpid="+gid,
	dataType: "html",
	success: function(response)
	{
		$('#acc_sub_grp').empty().append(response);
	}
	});
}


var berr=0;
function acc_ledger_unique(val)
{
	var baseurl= $("#baseurl").val();
	$.ajax({
		type:"POST",
		url:baseurl+'accountsledger/acc_ledger_unique',
		data:{'value':val},
		cache: false,
		dataType: "html",
			success: function(result){
			if(result>0)
			{
				$('#ledger_name_err').html('Accounts Ledger already exist!');
				berr=1;
			}
			else
			{
				$('#ledger_name_err').html('');
				berr=0;
			}
		}
	});
}

function add_acc_ledger_validate()
{
	var err = 0;
	var acc_grp_name = $('#ledger_name').val();
	var main_grp_name = $('#under_grp').val();
	// alert(main_grp_name);
    if(acc_grp_name.trim()=='')
    {
        $('#ledger_name_err').html('Enter Accounts Ledger Name!');
        err++;
    }
    else
    {
        // $('#village_err').html('');
        if(berr>0)
		{
			$('#ledger_name_err').html('Accounts Ledger Name already exist!');
			err++;
		}
		else
		{
			$('#ledger_grp_name_err').html('');
		}
    }
    if(main_grp_name.trim()=='')
    {
        $('#main_grp_name_err').html('Select Under Group category!');
        err++;
    }
    else
    {
			$('#main_grp_name_err').html('');
    }
    
    if(err>0){ return false; }else{ return true; }
}

berre=0
function acc_ledger_edit_validate()
{
	var erre = 0;
	var acc_grp_name = $('#ledger_name_edit').val();
	var main_grp_name = $('#under_grp_edit').val();
	// alert(main_grp_name);
    if(acc_grp_name.trim()=='')
    {
        $('#ledger_name_edit_err').html('Enter Accounts Ledger Name!');
        erre++;
    }
    else
    {
        // $('#village_err').html('');
        if(berre>0)
		{
			$('#ledger_name_edit_err').html('Accounts Ledger Name already exist!');
			erre++;
		}
		else
		{
			$('#ledger_grp_name_err').html('');
		}
    }
    if(main_grp_name.trim()=='')
    {
        $('#main_grp_name_edit_err').html('Select Under Group category!');
        erre++;
    }
    else
    {
			$('#main_grp_name_edit_err').html('');
    }
    
    if(erre>0){ return false; }else{ return true; }
}

var berre=0;
function acc_ledger_unique_edit(val)
{
	var baseurl= $("#baseurl").val();
	$.ajax({
		type:"POST",
		url:baseurl+'accountsledger/acc_ledger_unique_edit',
		data:{'value':val},
		cache: false,
		dataType: "html",
			success: function(result){
			if(result>0)
			{
				$('#ledger_name_edit_err').html('Accounts Ledger already exist!');
				berre=1;
			}
			else
			{
				$('#ledger_name_edit_err').html('');
				berre=0;
			}
		}
	});
}
function get_grp_details(val)
{
	var baseurl= $("#baseurl").val();
	var under_grp=$("#under_grp").val();
	
	// alert(under_grp);
	$.ajax({
	type: "POST",
	url: baseurl+'accountsledger/get_under_grp_details',
	async: false,
	type: "POST",
	data: "ug="+under_grp,
	dataType: "html",
	success: function(response)
	{
		var res=response.split('||');
		$('#main_grp').html(res[0]);
		if(res[1]==1)
		{$('#sub_grp').html("ASSETS");}
		else if(res[1]==2)
		{$('#sub_grp').html("LIABILITIES");}
		else if(res[1]==3)
		{$('#sub_grp').html("INCOME");}
		else if(res[1]==4)
		{$('#sub_grp').html("EXPENSE");}
		if(res[2]=='Y')
		{
			document.getElementById('gaddr').style.display = "block";
		}
		else
		{
			document.getElementById('gaddr').style.display = "none";
		}
	}
	});
	
}

function get_grp_details_edit(val)
{
	var baseurl= $("#baseurl").val();
	var under_grp=$("#under_grp_edit").val();
	
	// alert(under_grp);
	$.ajax({
	type: "POST",
	url: baseurl+'accountsledger/get_under_grp_details_edit',
	async: false,
	type: "POST",
	data: "ug="+under_grp,
	dataType: "html",
	success: function(response)
	{
		var res=response.split('||');
		$('#main_grp_edit').html(res[0]);
		if(res[1]==1)
		{$('#sub_grp_edit').html("ASSETS");}
		else if(res[1]==2)
		{$('#sub_grp_edit').html("LIABILITIES");}
		else if(res[1]==3)
		{$('#sub_grp_edit').html("INCOME");}
		else if(res[1]==4)
		{$('#sub_grp_edit').html("EXPENSE");}
		if(res[2]=='Y')
		{
			document.getElementById('gaddr_edit').style.display = "block";
		}
		else
		{
			document.getElementById('gaddr_edit').style.display = "none";
		}
	}
	});
	
}

function acc_ledger_edit(val)
{
	var baseurl= $("#baseurl").val();
	// alert(baseurl);
	$.ajax({
	type: "POST",
	url: baseurl+'accountsledger/acc_ledger_edit',
	async: false,
	type: "POST",
	data: "id="+val,
	dataType: "html",
	success: function(response)
	{
		$('#kt_modal_edit_account_ledger').empty().append(response);
		$('#kt_modal_edit_account_ledger').addClass('show');
	
	}
});
}

function closeEditModal()
{
	var baseurl= $("#baseurl").val();
	$('#kt_modal_edit_account_ledger').removeClass('show');
	//$("#kt_modal_update_role").css("display", "none");
	$('.modal-backdrop').removeClass('show');
	window.location.href = baseurl+'accountsledger';
}

function acc_ledger_delete(val)
{
	var baseurl= $("#baseurl").val();
	// alert(val);
	$.ajax({
	type: "POST",
	url: baseurl+'accountsledger/acc_ledger_delete',
	async: false,
	type: "POST",
	data: "id="+val,
	dataType: "html",
	success: function(response)
	{
	$('#kt_modal_delete_account_ledger').empty().append(response);
	$('#kt_modal_delete_account_ledger').addClass('show');
	//$("#kt_modal_delete_role").css("display", "block");
	}
	});
}

function removeAccLedger(val)
{ 
	var baseurl= $("#baseurl").val();
	$.ajax({
	type: "POST",
	url: baseurl+'accountsledger/delete',
	async: false,
	data:"field="+val,
	success: function(response)
	{
		window.location.href = baseurl+'accountsledger';
	}
	});
}
function closeDeleteModal()
{
		var baseurl= $("#baseurl").val();
		$('#kt_modal_delete_account_ledger').removeClass('show');
		$('.modal-backdrop').removeClass('show');
		window.location.href = baseurl+'accountsledger';
}

</script>
	</body>
	<!--end::Body-->
</html>