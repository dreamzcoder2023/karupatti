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
									<h1 class="d-flex align-items-center text-dark fw-bold my-1 fs-3">Party History List
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
			                        <form name="party_view_form" id="party_view_form" method="POST" action="<?php echo base_url(); ?>party/party_view" enctype="multipart/form-data" >
										<input type="hidden" id="party_id" name="party_id" value="<?php echo $party_details->PID;?>">
									<!--begin::Tables Widget 9-->
										<div class="card card-xxl-stretch mb-5 mb-xl-8">
											<!--begin::Card body-->
											<div class="card-body py-4">
												<div style="padding: 5px 5px 5px 5px !important;box-shadow: 0 3px 6px #00002947;border-radius: 5px;background-color: #f5f5f1;">
													<div class="row">
														<label class="col-lg-1 col-form-label fw-semibold fs-6">Company</label>
														<div class="col-lg-3">
															<select class="form-select form-select-solid" data-control="select2" data-hide-search="true">	
																<option selected="">Select Company</option>
																<option value="0">AGB-Main Branch Ayyanar Gold Bank</option>				
																<option value="1">AGN-Narippayur NR(3)-Branch</option>
																<option value="2">AGM-A Gold Main & Old Gold Purchase</option>
																<option value="3">HO & ALP-Head Office(ATC)</option>
																<option value="4">VPR-S V Palanisamy Combined All</option>
															</select>
														</div>
														<div class="col-lg-2">
															<label class="col-form-label fw-semibold fs-6">Customer Rating</label>
														</div>
														<div class="col-lg-2">
															<label class="close-form close-form-solid fw-bold text-danger fs-4">Good</label>
														</div>
														<!-- <div class="col-lg-1"></div> -->
														<div class="col-lg-1 d-flex align-items-center me-2">
															<div class="form-check form-check-custom">
																<input class="form-check-input2" type="radio" name="type" />
															</div>
															<div class="d-flex flex-column">
																<div class="fs-6 fw-semibold text-muted" style="padding-left: 10px;">Active</div>
															</div>
														</div>
														<div class="col-lg-1 d-flex align-items-center me-2">
															<div class="form-check form-check-custom">
																<input class="form-check-input2" type="radio" name="type" />
															</div>
															<div class="d-flex flex-column">
																<div class="fs-6 fw-semibold text-muted" style="padding-left: 10px;">Closed</div>
															</div>
														</div>
														<div class="col-lg-1 d-flex align-items-center me-2">
															<div class="form-check form-check-custom">
																<input class="form-check-input2" type="radio" name="type" />
															</div>
															<div class="d-flex flex-column">
																<div class="fs-6 fw-semibold text-muted" style="padding-left: 10px;">All</div>
															</div>
														</div>
													</div>
												</div><br>
												<div style="padding: 5px 5px 5px 5px !important;box-shadow: 0 3px 6px #00002947;border-radius: 5px;background-color: #f5f5f1;">
													<div class="row">
														<!--begin::Label-->
														<span class="text-muted fw-semibold fs-5" style="text-align: right !important;">Party ID: P001</span>
														<label class="col-lg-1 col-form-label fw-semibold fs-6">Name</label>
														<!--end::Label-->
														<!--begin::Col-->
														<div class="col-lg-3 fv-row fv-plugins-icon-container">
															<input type="text" name="company" class="form-control form-control-lg form-control-solid" placeholder="Party Name" value="Kannan K" readonly>
															<div class="fv-plugins-message-container invalid-feedback"></div>
														</div>
														<!--end::Col-->			
														<!--begin::Label-->
														<label class="col-lg-1 col-form-label fw-semibold fs-6">Father</label>
														<!--end::Label-->
														<!--begin::Col-->
														<div class="col-lg-3 fv-row fv-plugins-icon-container">
															<input type="text" name="company" class="form-control form-control-lg form-control-solid" placeholder="Father Name" value="Kumar S" readonly>
															<div class="fv-plugins-message-container invalid-feedback"></div>
														</div>
														<!--end::Col-->
														<!--begin::Label-->
														<label class="col-lg-1 col-form-label fw-semibold fs-6">Guardian</label>
														<!--end::Label-->
														<!--begin::Col-->
														<div class="col-lg-3 fv-row fv-plugins-icon-container">
															<input type="text" name="company" class="form-control form-control-lg form-control-solid" placeholder="Guardian Name" readonly>
															<div class="fv-plugins-message-container invalid-feedback"></div>
														</div>
														<!--end::Col-->
													</div>
													<div class="row">
														<!--begin::Label-->
														<label class="col-lg-1 col-form-label fw-semibold fs-6">Mother</label>
														<!--end::Label-->
														<!--begin::Col-->
														<div class="col-lg-3 fv-row fv-plugins-icon-container">
															<input type="text" name="company" class="form-control form-control-lg form-control-solid" placeholder="Mother Name" value="Priya K" readonly>
															<div class="fv-plugins-message-container invalid-feedback"></div>
														</div>
														<!--end::Col-->
														<!--begin::Label-->
														<label class="col-lg-1 col-form-label fw-semibold fs-6">City</label>
														<!--end::Label-->
														<!--begin::Left Section-->
														<div class="col-lg-3">
															<!--begin::Select-->
															<select class="form-select form-select-solid" data-control="select2" data-placeholder="Select City" data-hide-search="true">
																
																<option value="0">Ramanathapuram</option>
																<option value="1">Kamuthi</option>
																<option value="2">Manamadurai</option>
															</select>
															<!--end::Select-->
														</div>
														<!--end::Left Section-->
														<!--begin::Label-->
														<label class="col-lg-1 col-form-label fw-semibold fs-6">Zone</label>
														<!--end::Label-->
														<!--begin::Left Section-->
														<div class="col-lg-3">
															<!--begin::Select-->
															<select class="form-select form-select-solid" data-control="select2" data-placeholder="Select Zone" data-hide-search="true" disabled>
																<option value="0">Sayalkudi</option>
																<option value="1">Kannirajapuram</option>
																<option value="2">Pernali</option>
																<option value="3">Kattlankulam</option>
															</select>
															<!--end::Select-->
														</div>
														<!--end::Left Section-->
													</div>
													<div class="row">
														<!--begin::Label-->
														<label class="col-lg-1 col-form-label fw-semibold fs-6">Area</label>
														<!--end::Label-->
														<!--begin::Left Section-->
														<div class="col-lg-3">
															<!--begin::Select-->
															<select class="form-select form-select-solid" data-control="select2" data-placeholder="Select Area" data-hide-search="true" disabled>
																<option value="0">Sayalkudi</option>
																<option value="1">Kattlankulam</option>
																<option value="2">Pernali</option>
																<option value="3">Kannirajapuram</option>
															</select>
															<!--end::Select-->
														</div>
														<!--begin::Label-->
														<label class="col-lg-1 col-form-label fw-semibold fs-6">Address</label>
														<!--end::Label-->
														<!--begin::Col-->
														<div class="col-lg-3 fv-row fv-plugins-icon-container">
															<input type="text" name="company" class="form-control form-control-lg form-control-solid" placeholder="Address" value="Kovil Street">
															<div class="fv-plugins-message-container invalid-feedback"></div>
														</div>
														<!--end::Col-->
														<!--begin::Label-->
														<label class="col-lg-1 col-form-label fw-semibold fs-6">Mobile</label>
														<!--end::Label-->
														<!--begin::Col-->
														<div class="col-lg-3 fv-row fv-plugins-icon-container">
															<input type="text" name="company" class="form-control form-control-lg form-control-solid" placeholder="Mobile" value="9895969895">
															<div class="fv-plugins-message-container invalid-feedback"></div>
														</div>
													</div>
												</div><br>
												
												<div class="row">
													<!--begin::Label-->
													<label class="col-lg-1 col-form-label fw-semibold fs-6">Party</label>
													<!--end::Label-->
													<!--begin::Col-->
													<div class="col-lg-3">
														<!--begin::Image input-->
														<div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url('assets/media/svg/avatars/blank.svg')">
															<!--begin::Preview existing avatar-->
															<div class="image-input-wrapper w-125px h-125px" style="background-image: url(assets/images/sample.jpg)"></div>
															<!--end::Preview existing avatar-->
															<!--begin::Label-->
															<label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" data-kt-initialized="1">
																<i class="bi bi-pencil-fill fs-7"></i>
																<!--begin::Inputs-->
																<input type="file" name="avatar" accept=".png, .jpg, .jpeg">
																<input type="hidden" name="avatar_remove">
																<!--end::Inputs-->
															</label>
															<!--end::Label-->
															<!--begin::Cancel-->
															<span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" data-kt-initialized="1">
																<i class="bi bi-x fs-2"></i>
															</span>
															<!--end::Cancel-->
															<!--begin::Remove-->
															<span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" data-kt-initialized="1">
																<i class="bi bi-x fs-2"></i>
															</span>
															<!--end::Remove-->
														</div>
														<!--end::Image input-->
														<!--begin::Hint-->
														<div class="form-text">Allowed file types: png, jpg, jpeg.</div>
														<!--end::Hint-->
													</div>
													<!--end::Col-->

												</div>
												<!--begin::Toolbar-->
												<div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
													<!--begin::Add user-->
													
													<!-- <button type="button" class="btn btn-primary"  data-bs-toggle="modal" data-bs-target="#">View</button> -->
													<!--end::Add user-->
												</div>
												<!--end::Toolbar-->
												<!--begin::Group actions-->
												<div class="d-flex justify-content-end align-items-center d-none" data-kt-user-table-toolbar="selected">
													<!--<div class="fw-bold me-5">
													<span class="me-2" data-kt-user-table-select="selected_count"></span>Selected</div>-->
													<!-- <button type="button" class="btn btn-danger" data-kt-user-table-select="delete_selected">Delete Selected</button> -->
												</div>
												<!--end::Group actions-->
													
												<!--begin::Table-->
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
													$result=$this->db->query("SELECT LOANS.*, R.SELLINGAMOUNT, R.SELLINGREMARKS, R.SELLINGTO FROM LOANS L INNER JOIN REDEMPTIONS R ON L.BILLNO=R.BILLNO WHERE LOANS.PID='".$party_details->PID."'")->result_array();

													?>
													<div class="tab-content" id="myTabContent">
														<div class="tab-pane fade show active" id="kt_tab_pane_1" role="tabpanel">
															<div class="row fixTableHead_party">
																<table class="table table-striped border rounded table-hover fs-7 gs-2 gy-1" id="kt_datatable_sidebar_paryloanhistory_loan">
																    <thead>
																        <tr class="fw-bold fs-7 text-gray-800">
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
																            <th class="min-w-150px">Loan Summary</th>
																        </tr>
																    </thead>
																    <tbody>
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
															<div class="row fixTableHead_party">
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
																        <tr>
																            <td class="cy ple1">AGB</td>
																            <td class="ple1">01/04/2022</td>
																            <td class="ple1">63</td>
																            <td class="ple1">M-11234</td>
																            <td class="ple1">Gold Ornaments</td>
																            <td class="ple1">Opening</td>
																            <td class="ple1">0</td>
																            <td class="ple1">Sale M-11234</td>
																            <td class="ple1"></td>
																        </tr>
																    </tbody>
																</table>
															</div>
														</div>
														<div class="tab-pane fade" id="kt_tab_pane_3" role="tabpanel">
															<div class="row fixTableHead_party">
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
																        <tr>
																            <td class="cy ple1"></td>
																            <td class="ple1"></td>
																            <td class="ple1"></td>
																            <td class="ple1"></td>
																            <td class="ple1"></td>
																            <td class="ple1"></td>
																            <td class="ple1"></td>
																            <td class="ple1"></td>
																            <td class="ple1"></td>
																        </tr>
																    </tbody>
																</table>
															</div>
														</div>
													</div>
												</div>
												
												<!--end::Table-->
											</div>
											<!--end::Card body-->
										</div>
									<!--end::Tables Widget 9-->
								</form>	
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
		<!--begin::Modal - view particular party loan summary history-->
		<div class="modal fade" id="kt_modal_view_particular_party_loan_summary_history_sidebar" tabindex="-1" aria-hidden="true">
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
							<h1>Loan Summary</h1>
						</div>
						<!--end::Heading-->
						<div class="row mb-6">
							<div class="col-lg-8">
								<div class="row">
									<!--begin::Label-->
									<label class="col-md-2 col-form-label required fw-bold fs-6">Bill No</label>
									<!--end::Label-->
									<!--begin::Col-->
									<div class="col-lg-3 fv-row fv-plugins-icon-container">
										<input type="text" name="company" class="form-control form-control-lg form-control-solid" placeholder="Bill No" value="DSJ-356/21">
										<div class="fv-plugins-message-container invalid-feedback"></div>
									</div>
									<!--end::Col-->		
									<!--begin::Label-->
									<div class="col-lg-4">
										<label class="col-form-label fw-bold fs-6">Loan Date</label>
										<label class="col-form-label fw-semibold fs-6">: <?php echo date("d M Y"); ?></label>
									</div>
									<!--end::Label-->
									<!--begin::Label-->
									<div class="col-lg-3">
										<label class="col-form-label fw-bold fs-6">Loan Period</label>
										<label class="col-form-label fw-semibold fs-6">: 6 Month</label>
									</div>
									<!--end::Label-->	
								</div>
								<div class="row">	
									<!--begin::Label-->
									<div class="col-lg-5">
										<label class="col-form-label fw-bold fs-6">Name</label>
										<label class="col-form-label fw-semibold fs-6">: Kumar</label>
									</div>
									<!--end::Label-->
									<!--begin::Label-->
									<div class="col-lg-4">
										<label class="col-form-label fw-bold fs-6">Loan Amount</label>
										<label class="col-form-label fw-semibold fs-6">: 2000</label>
									</div>
									<!--end::Label-->
									<!--begin::Label-->
									<div class="col-lg-3">
										<label class="col-form-label fw-bold fs-6">Interest</label>
										<label class="col-form-label fw-semibold fs-6">: 2.5 %</label>
									</div>
									<!--end::Label-->	
								</div>
								<div class="row">	
									<!--begin::Label-->
									<div class="col-lg-5">
										<label class="col-form-label fw-bold fs-6">Address</label>
										<label class="col-form-label fw-semibold fs-6">: Nadutheru Ganthi Nagar</label>
									</div>
									<!--end::Label-->
									<!--begin::Label-->
									<div class="col-lg-4">
										<label class="col-form-label fw-bold fs-6">Renewal TO</label>
										<label class="col-form-label fw-semibold fs-6">: DSJ-16/19</label>
									</div>
									<!--end::Label-->
									<!--begin::Label-->
									<div class="col-lg-3">
										<label class="col-form-label fw-bold fs-6">Net Weight</label>
										<label class="col-form-label fw-semibold fs-6">: 1.80</label>
									</div>
									<!--end::Label-->	
								</div>
								<div class="row">	
									<!--begin::Label-->
									<div class="col-lg-5">
										<label class="col-form-label fw-bold fs-6">Renewal From</label>
										<label class="col-form-label fw-semibold fs-6">:</label>
									</div>
									<!--end::Label-->
									<!--begin::Label-->
									<div class="col-lg-4">
										<label class="col-form-label fw-bold fs-6">Nominee</label>
										<label class="col-form-label fw-semibold fs-6">:</label>
									</div>
									<!--end::Label-->
									<!--begin::Label-->
									<div class="col-lg-3">
										<label class="col-form-label fw-bold fs-6">Relation</label>
										<label class="col-form-label fw-semibold fs-6">:</label>
									</div>
									<!--end::Label-->	
								</div>
								<div class="row">	
									<!--begin::Label-->
									<div class="col-lg-12">
										<label class="col-form-label fw-bold fs-6">Pledge Detail</label>
										<label class="col-form-label fw-semibold fs-6">: Manga Kasu-2(KM Seal 1+1 Rose Stone)</label>
									</div>
									<!--end::Label-->
								</div>
								<div class="row">	
									<!--begin::Label-->
									<label class="col-md-3 col-form-label fw-bold fs-6">Customer Remarks</label>
									<!--end::Label-->
									<!--begin::Col-->
									<div class="col-lg-5 fv-row fv-plugins-icon-container">
										<input type="text" name="company" class="form-control form-control-lg form-control-solid" placeholder="Remarks">
									</div>
									<!--end::Col-->	
									<div class="col-lg-3 d-flex flex-center flex-row-fluid">
										<button type="submit" class="btn btn-success" data-bs-dismiss="modal">Update Remarks</button>
									</div>
								</div>
							</div>
							<div class="col-lg-4">
								<div class="row">
									<!--begin::Label-->
									<div class="col-lg-12">
										<label class="close-form close-form-solid fw-bold text-danger fs-4">Closed</label>
										<label class="close-form close-form-solid fw-bold text-danger fs-4">Customer Transfer</label>
									</div>
									<!--end::Label-->
								</div>
								<div class="row">
									<!--begin::Label-->
									<div class="col-lg-12">
										<label class="col-form-label fw-bold fs-6">Total Period</label>
										<label class="col-form-label fw-semibold fs-6">: 0 Year 0 Month 2 Days</label>
									</div>
									<!--end::Label-->
								</div>
								<div class="row">
									<!--begin::Label-->
									<div class="col-lg-12">
										<label class="col-form-label fw-bold fs-6">Last Receipt Date</label>
										<label class="col-form-label fw-semibold fs-6">: <?php echo date("d M Y"); ?></label>
									</div>
									<!--end::Label-->
								</div>
								<div class="row">
									<!--begin::Label-->
									<div class="col-lg-12">
										<label class="col-form-label fw-bold fs-6">Paid Principal</label>
										<label class="col-form-label fw-semibold fs-6">: 2000.00</label>
									</div>
									<!--end::Label-->
								</div>
								<div class="row">
									<!--begin::Label-->
									<div class="col-lg-12">
										<label class="col-form-label fw-bold fs-6">Paid Interest</label>
										<label class="col-form-label fw-semibold fs-6">: 50.00</label>
									</div>
									<!--end::Label-->
								</div>
								<div class="row">
									<!--begin::Label-->
									<div class="col-lg-12">
										<label class="col-form-label fw-bold fs-6">Loan Balance</label>
										<label class="col-form-label fw-semibold fs-6">:</label>
									</div>
									<!--end::Label-->
								</div>
							</div>
							<!-- <div class="col-lg-4">
								<label class="col-form-label fw-bold fs-6">Loan Amount</label>
								<label class="col-form-label fw-semibold fs-6">: 2000</label>	
							</div> -->
						</div>

						<div class="row fixTableHead_party">
							<table id="kt_datatable_view_particular_party_loan_summary_history_both_scrolls" class="table table-striped border rounded table-hover gs-2 gy-1">
							    <thead>
							        <tr class="fw-bold fs-6 text-gray-800">
							            <th class="min-w-100px cy">Receipt Date</th>
							            <th class="min-w-100px">Receipt No</th>
							            <th class="min-w-100px">Particulars</th>
							            <th class="min-w-80px">Months</th>
							            <th class="min-w-100px">Principal</th>
							            <th class="min-w-80px">Interest</th>
							            <th class="min-w-80px">Others</th>
							            <th class="min-w-100px">Discount</th>
							            <th class="min-w-100px">Total</th>
							        </tr>
							    </thead>
							    <tbody>
							        <tr>
							            <td class="cy">13/06/2021</td>
							            <td></td>
							            <td>Loan</td>
							            <td></td>
							            <td>2000.00</td>
							            <td>0.00</td>
							            <td></td>
							            <td></td>
							            <td>-2000.00</td>
							        </tr>
							        <tr>
							            <td class="cy">15/06/2021</td>
							            <td></td>
							            <td>Redemption</td>
							            <td></td>
							            <td>2000.00</td>
							            <td>50.00</td>
							            <td></td>
							            <td></td>
							            <td>2050.00</td>
							        </tr>
							    </tbody>
							    <!--  <tfoot>
						            <tr class="fw-bold fs-6 text-gray-800">
							           <th class="min-w-100px cy"></th>
							            <th class="min-w-100px"></th>
							            <th class="min-w-100px"></th>
							            <th class="min-w-100px">Total</th>
							            <th class="min-w-100px">0.00</th>
							            <th class="min-w-80px">50.00</th>
							            <th class="min-w-100px"></th>
							            <th class="min-w-100px"></th>
							            <th class="min-w-100px">50.00</th>
							        </tr>
						        </tfoot> -->
							</table>	
						</div>
					</div>
					<!--end::Modal body-->
				</div>
				<!--end::Modal content-->
			</div>
			<!--end::Modal dialog-->
		</div>
		<!--end::Modal -view particular party loan summary history-->
		<!--begin::Modal - delete party-->
		<div class="modal fade" id="kt_modal_delete_particular_party_loan_summary_history_sidebar" tabindex="-1" aria-hidden="true">
			<!--begin::Modal dialog-->
			<div class="modal-dialog modal-m">
				<!--begin::Modal content-->
				<div class="modal-content rounded">
					<div class="swal2-icon swal2-warning swal2-icon-show" style="display: flex;">
						<div class="swal2-icon-content">!</div></div>
						<div class="swal2-html-container" id="swal2-html-container" style="display: block;">Are you sure you want to delete?</div>
						<div class="d-flex flex-center flex-row-fluid pt-12">
							<button type="submit" class="btn btn-danger me-3" data-bs-dismiss="modal">Yes</button>
							<button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
						</div><br><br>
				</div>
				<!--end::Modal content-->
			</div>
			<!--end::Modal dialog-->
		</div>
		<!--end::Modal - delete party-->
		<?php $this->load->view("script");?>
		<input type="hidden" id="baseurl" value="<?php echo base_url();?>">

		<script>
			$('#kt_datatable_dom_positioning').DataTable( {
		"aaSorting": [],
        dom: 'Bfrtip',
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5'
        ]
    } );		

	var title = $('title').text() + ' | ' + 'Party History';
    $(document).attr("title", title);

			$('input:radio[name="party_history"]').change(function() {

		        if ($(this).val()=='sidebar_loan_no_value') 
		        {
		        	$('#sidebar_loan_no_tbox').removeAttr('disabled');
		            $('#sidebar_name_tbox').attr('disabled',true);
		            $('#sidebar_phone_tbox').attr('disabled',true);
		        } 
		        else if ($(this).val()=='sidebar_name_value')
		        {
		        	$('#sidebar_name_tbox').removeAttr('disabled');
		        	$('#sidebar_loan_no_tbox').attr('disabled',true);
		            $('#sidebar_phone_tbox').attr('disabled',true);
		        }
		        else if ($(this).val()=='sidebar_phone_value')
		        {
		        	$('#sidebar_phone_tbox').removeAttr('disabled');
		        	$('#sidebar_loan_no_tbox').attr('disabled',true);
		            $('#sidebar_name_tbox').attr('disabled',true);
		        }
		        else
		        {
		        	$('#sidebar_loan_no_tbox').removeAttr('disabled');
		            $('#sidebar_name_tbox').removeAttr('disabled');
		            $('#sidebar_phone_tbox').removeAttr('disabled');
		        }
		    });
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

	</body>
	<!--end::Body-->
</html>