<?php $this->load->view("common");?>
<style>
	.dataTables_scroll
    {
        position: relative;
        overflow: auto;
        max-height: 200px;/*the maximum height you want to achieve*/
        width: 100%;
    }
  .dataTables_scroll thead{
    position: -webkit-sticky;
    position: sticky;
    top: 0;
  background-color: #ec9629;
    z-index: 2;
  }

  .dataTables_scroll_nomiee_bank
    {
      position: relative;
      overflow: auto;
      height: 140px;
      max-height: 200px;/*the maximum height you want to achieve*/
      width: 100%;
    }
  .dataTables_scroll_nomiee_bank thead
  {
    position: -webkit-sticky;
    position: sticky;
    top: 0;
   background-color: #ec9629;
    z-index: 2;
  }
</style>
	<!--begin::Body-->
	<body data-kt-name="metronic" id="kt_body" class="header-fixed header-tablet-and-mobile-fixed toolbar-enabled toolbar-fixed aside-enabled aside-fixed">
		<!--begin::Theme mode setup on page load-->
		<script>if ( document.documentElement ) { const defaultThemeMode = "system"; const name = document.body.getAttribute("data-kt-name"); let themeMode = localStorage.getItem("kt_" + ( name !== null ? name + "_": "" ) + "theme_mode_value"); if ( themeMode === null ) { if ( defaultThemeMode === "system" ) { themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light"; } else { themeMode = defaultThemeMode; } } document.documentElement.setAttribute("data-theme", themeMode); }</script>
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
									<h1 class="d-flex align-items-center text-dark fw-bold my-1 fs-3">Party
										<label class="d-flex align-items-center text-dark fw-bold my-1 fs-3">
											<span>&nbsp;-&nbsp; </span>
											<?php if(isset($party_details)){ ?>
											<?php 
												if($party_details->RATING==3)
												{
													// echo '<b><span class="badge badge-success" style=>GOOD</span></b>';
													echo '<span><i class="fa-solid fa-star fs-3" style="color:#50cd89;"></i> </span>';
												}
												else if($party_details->RATING==2)
												{
													// echo '<b><span class="badge badge-warning">AVERAGE</span></b>';
													echo '<span><i class="fa-solid fa-star fs-3" style="color:#ffc700;"></i> </span>';
												}
												else if($party_details->RATING==1)
												{
													// echo '<b><span class="badge badge-danger">BAD</span></b>';
													echo '<span><i class="fa-solid fa-star fs-3" style="color:red;"></i> </span>';
												}
												else
												{
													echo '<span><i class="fa-solid fa-star fs-3" style="color:#d2d4dc;"></i> </span>';
												}
												?>
											<span>&nbsp;<?php echo $party_details->NAME;?>&nbsp;<?php echo $party_details->FATHERSNAME; }?></span>
										</label>
									<!--begin::Separator-->
									<span class="h-20px border-gray-400 border-start ms-3 mx-2"></span>
									<!-- <label class="d-flex align-items-center text-primary fw-bold my-1 fs-5">
										<span>Company &emsp;-</span>
										<span>&emsp;All</span>
									</label> -->
									<!-- <span class="h-20px border-gray-400 border-start ms-3 mx-2"></span>
									<label class="d-flex align-items-center text-primary fw-bold my-1 fs-5">
										<span>Status &emsp;-</span>
										<span>&emsp;All</span>
									</label>
									<span class="h-20px border-gray-400 border-start ms-3 mx-2"></span>
									<label class="d-flex align-items-center text-primary fw-bold my-1 fs-5">
										<span>Item Type &emsp;-</span>
										<span>&emsp;All</span>
									</label>
									<span class="h-20px border-gray-400 border-start ms-3 mx-2"></span>
									<label class="d-flex align-items-center text-primary fw-bold my-1 fs-5">
										<span>Date &emsp;-</span>
										<span>&emsp;Today</span>
									</label> -->
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
			            <!-- </div> -->
								<!--begin::Card body-->
								<?php if(isset($party_details)){ ?>
								<div class="card-body py-4">	

													<div class="mb-5 hover-scroll-x">
														<div class="d-grid">
															<ul class="nav nav-tabs flex-nowrap text-nowrap" role="tablist">
																<li class="nav-item" role="presentation">
																	<a class="nav-link btn btn-active-light btn-color-black-800 btn-active-color-primary rounded-bottom-0 fw-bold fs-6 active" data-bs-toggle="tab" href="#kt_tab_pane_party_info" aria-selected="true" role="tab">Party Info</a>
																</li>
																<li class="nav-item" role="presentation">
																	<a class="nav-link btn btn-active-light btn-color-black-800 btn-active-color-primary rounded-bottom-0 fw-bold fs-6"  href="<?php echo base_url();?>Party/party_loan_view/<?php echo $party_details->PID ;?>" aria-selected="false" role="tab" tabindex="-1">Loans</a>
																</li>
																<li class="nav-item" role="presentation">
																	<a class="nav-link btn btn-active-light btn-color-black-800 btn-active-color-primary rounded-bottom-0 fw-bold fs-6"  href="<?php echo base_url();?>Party/party_jewel_view/<?php echo $party_details->PID;?>" aria-selected="false" role="tab" tabindex="-1">Jewel</a>
																</li>
																<li class="nav-item" role="presentation">
																	<a class="nav-link btn btn-active-light btn-color-black-800 btn-active-color-primary rounded-bottom-0 fw-bold fs-6"  href="<?php echo base_url();?>Party/chit_party_view/<?php echo $party_details->PID;?>" aria-selected="false" role="tab" tabindex="-1">Chit</a>
																</li>
																<li class="nav-item" role="presentation">
																	<a class="nav-link btn btn-active-light btn-color-black-800 btn-active-color-primary rounded-bottom-0 fw-bold fs-6"  href="<?php echo base_url();?>Party/karupatti_party_view/<?php echo $party_details->PID ;?>" aria-selected="false" role="tab" tabindex="-1">Karuppati</a>
																</li>
																<li class="nav-item" role="presentation">
																	<a class="nav-link btn btn-active-light btn-color-black-800 btn-active-color-primary rounded-bottom-0 fw-bold fs-6"  href="<?php echo base_url();?>Party/realestate_party_view/<?php echo $party_details->PID ;?>" aria-selected="false" role="tab" tabindex="-1">Real Estate</a>
																</li>
																<li class="nav-item">
																	<a class="nav-link btn btn-active-light btn-color-black-800 btn-active-color-primary rounded-bottom-0 fw-bold fs-6"  href="<?php echo base_url();?>Party/membership_party_view/<?php echo $party_details->PID;?>">Membership</a>
																</li>
																<li class="nav-item">
																	<a class="nav-link btn btn-active-light btn-color-black-800 btn-active-color-primary rounded-bottom-0 fw-bold fs-6"  href="<?php echo base_url();?>Party/party_rating_view/<?php echo $party_details->PID;?>">Rating History</a>
																</li>
															</ul>
														</div>
													</div>
													<div class="tab-content" id="myTabContent">
														<div class="tab-pane fade active show" id="kt_tab_pane_party_info" role="tabpanel">
															<div class="row mb-6">
																<span class="text-muted fw-bold fs-6" style="text-align: right !important;">Party ID: <?php echo $party_details->PID;?></span>
																<label class="col-lg-1 col-form-label fw-semibold fs-6">Name</label>
																<label class="col-lg-3 col-form-label fw-bold fs-6"><?php echo $party_details->NAME;?></label>
																<label class="col-lg-1 col-form-label fw-semibold fs-6">L.Name</label>
																<label class="col-lg-3 col-form-label fw-bold fs-6"><?php echo $party_details->FATHERSNAME;?></label>
																<div class="col-lg-1">
																	<label class="col-form-label fw-semibold fs-6">F/Oth.Name</label>
																</div>
																<label class="col-lg-3 col-form-label fw-bold fs-6"><?php echo ($party_details->OTHER_NAME=='')?'--':$party_details->OTHER_NAME;?></label>
																<label class="col-lg-1 col-form-label fw-semibold fs-6">Mother</label>
																<label class="col-lg-3 col-form-label fw-bold fs-6"><?php echo ($party_details->MOTHER_NAME=='')?'--':$party_details->MOTHER_NAME;?></label>
																<label class="col-lg-1 col-form-label fw-semibold fs-6">Zone</label>
																<label class="col-lg-3 col-form-label fw-bold fs-6"><?php 
																		 
																		$zqry=$this->db->query("SELECT * FROM ZONE_MASTER WHERE SNO='".$party_details->ZONE_SNO."'");
																		$zonelist=$zqry->row();
																		echo (!is_null($party_details->ZONE_SNO))?$zonelist->ZONENAME:'--';
																		?>
																			
																</label>
																<label class="col-lg-1 col-form-label fw-semibold fs-6">Area</label>
																<label class="col-lg-3 col-form-label fw-bold fs-6"><?php 
																	if($party_details->TYPE_OF_RECORD=='O'){
																	echo ($party_details->AREA=='')?'--':$party_details->AREA;}
																	else
																	{
																		$area_det=$this->db->query("select * from AREA where SNO='".$party_details->AREA_ID."'")->row();
																		echo $area_det->AREANAME;
																	}
																	?>
																		
																	</label>
																<label class="col-lg-1 col-form-label fw-semibold fs-6">City</label>
																<label class="col-lg-3 col-form-label fw-bold fs-6"><?php 
																	if($party_details->TYPE_OF_RECORD=='O'){
																	echo ($party_details->CITY=='')?'--':$party_details->CITY;
																	}
																	else
																	{
																		$area_det=$this->db->query("select * from CITY where CITYID='".$party_details->CITY_ID."'")->row();
																		echo $area_det->CITYNAME;
																	}

																	?></label>
																<label class="col-lg-1 col-form-label fw-semibold fs-6">Village</label>
																<label class="col-lg-3 col-form-label fw-bold fs-6"><?php 
																	if($party_details->TYPE_OF_RECORD=='O'){
																	echo ($party_details->ADDRESS2=='')?'--':$party_details->ADDRESS2;
																	}
																	else
																	{
																		$area_det=$this->db->query("select * from VILLAGE where VILLAGEID='".$party_details->VILLAGE_ID."'")->row();
																		echo $area_det->VILLAGENAME;
																	}
																	?></label>
																<label class="col-lg-1 col-form-label fw-semibold fs-6">Street</label>
																<label class="col-lg-3 col-form-label fw-bold fs-6"><?php 
																	if($party_details->TYPE_OF_RECORD=='O'){
																	echo ($party_details->ADDRESS1=='')?'--':$party_details->ADDRESS1;
																	}
																	else
																	{
																		$area_det=$this->db->query("select * from STREET where STREETID='".$party_details->STREET_ID."'")->row();
																		echo $area_det->STREETNAME;
																	}
																	?></label>
																<label class="col-lg-1 col-form-label fw-semibold fs-6">Landmark</label>
																<label class="col-lg-3 col-form-label fw-bold fs-6"><?php echo ($party_details->LANDMARK=='')?'--':$party_details->LANDMARK;?></label>
																<label class="col-lg-1 col-form-label fw-semibold fs-6">Mobile</label>
																<label class="col-lg-3 col-form-label fw-bold fs-6"><?php echo ($party_details->PHONE=='')?'--':$party_details->PHONE;?></label>
																<label class="col-lg-1 col-form-label fw-semibold fs-6">Whatsapp</label>
																<label class="col-lg-3 col-form-label fw-bold fs-6"><?php echo ($party_details->WHATSAPP=='')?'--':$party_details->WHATSAPP;?></label>
																<label class="col-lg-1 col-form-label fw-semibold fs-6">Phone</label>
																<label class="col-lg-3 col-form-label fw-bold fs-6"><?php echo ($party_details->PHONE2=='')?'--':$party_details->PHONE2;?></label>
																<label class="col-lg-1 col-form-label fw-semibold fs-6">Email</label>
																<label class="col-lg-3 col-form-label fw-bold fs-6"><?php echo ($party_details->EMAIL=='')?'--':$party_details->EMAIL;?></label>
																<label class="col-lg-1 col-form-label fw-semibold fs-6">Aadhar</label>
																<label class="col-lg-3 col-form-label fw-bold fs-6"><?php echo ($party_details->AADHAAR_NO=='')?'--':$party_details->AADHAAR_NO;?></label>
																<label class="col-lg-1 col-form-label fw-semibold fs-6">ID Type</label>
																<label class="col-lg-3 col-form-label fw-bold fs-6"><?php echo ($party_details->ID_TYPE=='')?'--':$party_details->ID_TYPE;?></label>
																<label class="col-lg-1 col-form-label fw-semibold fs-6">ID No</label>
																<label class="col-lg-3 col-form-label fw-bold fs-6"><?php echo ($party_details->ID_NUMBER=='')?'--':$party_details->ID_NUMBER;?></label>
																<label class="col-lg-1 col-form-label fw-semibold fs-6">Work</label>
																<label class="col-lg-3 col-form-label fw-bold fs-6"><?php echo ($party_details->WORK_TYPE=='')?'--':$party_details->WORK_TYPE;?></label>
																<label class="col-lg-1 col-form-label fw-semibold fs-6">Rating</label>
																<label class="col-lg-3 col-form-label fw-bold fs-6">
																	<?php 
																	if($party_details->RATING==3)
																	{
																		// echo '<b><span class="badge badge-success" style=>GOOD</span></b>';
																		echo '<span><i class="fa-solid fa-star fs-3" style="color:#50cd89;"></i>Good </span>';
																	}
																	else if($party_details->RATING==2)
																	{
																		// echo '<b><span class="badge badge-warning">AVERAGE</span></b>';
																		echo '<span><i class="fa-solid fa-star fs-3" style="color:#ffc700;"></i> Average</span>';
																	}
																	else if($party_details->RATING==1)
																	{
																		// echo '<b><span class="badge badge-danger">BAD</span></b>';
																		echo '<span><i class="fa-solid fa-star fs-3" style="color:red;"></i>Bad </span>';
																	}
																	else
																	{
																		echo '<span><i class="fa-solid fa-star fs-3" style="color:#d2d4dc;"></i> </span>';
																	}
																	?>
																</label>
															</div>
															<div class="row mb-9">
																<label class="col-lg-1 col-form-label fw-semibold fs-6">Party</label>
																<div class="col-lg-3">
																	<div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url('<?php echo base_url(); ?>assets/images/Party.jpg')">
																				<?php 
																		if($party_details->PARTY_IMAGE !="")
																		{
																			//print_r($party_details->IDPROOF_IMAGE);exit;
																			
																			?>
																			<img class="image-input-wrapper"  src="<?php echo $party_details->PARTY_IMAGE; ?>" height="125px" width="125px" >

																			<?php


																			}
																		else{

																			?>


																		<?php 
																			if($party_details->PHOTO == '')
																			{
																		?>
																		<div class="image-input-wrapper w-125px h-125px" style="background-image: url('<?php echo base_url(); ?>assets/images/Party.jpg')">
																		</div>
																		<?php }
																		else
																		{
																		if($party_details->TYPE_OF_RECORD=='N')
																		{
																	?>
																	<img class="image-input-wrapper"  src="<?php echo $party_details->PHOTO; ?>" height="125px" width="125px" >
																		
																	<?php }
																	else
																	{?>
																		<img class="image-input-wrapper"  src="data:image/jpeg;base64,<?php echo base64_encode($party_details->PHOTO); ?>" height="125px" width="125px" >
																		<?php 
																	 }
																	}}?>
																	</div>
																</div>
																<label class="col-lg-1 col-form-label fw-semibold fs-6">Signature</label>
																<div class="col-lg-3">
																	<div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url('<?php echo base_url(); ?>assets/images/Signature.jpg')">
																			<?php 
																			if($party_details->SIGNATURE_IMAGE !="")
																			{

																				//$party_details->IDPROOF_IMAGE
																			
																			?>


																					<img class="image-input-wrapper"  src="<?php echo $party_details->SIGNATURE_IMAGE; ?>" height="125px" width="125px" >


																			<?php

																			}
																			else
																			{
																				?>
																		

																		<?php 
																			if($party_details->SIGNATURE == '')
																			{
																		?>
																		<div class="image-input-wrapper w-125px h-125px" style="background-image: url('<?php echo base_url(); ?>assets/images/Signature.jpg')">
																		</div>
																	<?php }
																		else
																		{
																			if($party_details->TYPE_OF_RECORD=='N')
																			{
																	?>
																	<img class="image-input-wrapper"  src="<?php echo $party_details->SIGNATURE; ?>" height="125px" width="125px" >
																		
																	<?php }
																	else
																	{?>
																		<img class="image-input-wrapper"  src="data:image/jpeg;base64,<?php echo base64_encode($party_details->SIGNATURE); ?>" height="125px" width="125px" >
																		<?php 
																	 }
																	}}?>
																	</div>
																</div>
																<label class="col-lg-1 col-form-label fw-semibold fs-6"> 
																	ID Photo
																</label>
																	<div class="col-lg-3">
																		<div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url('<?php echo base_url();?>assets/images/Party_Proof.jpg')">
																		<?php
																			if($party_details->IDPROOF_IMAGE !="")
																			{
																				?>
																					<img class="image-input-wrapper"  src="<?php echo $party_details->IDPROOF_IMAGE; ?>" height="125px" width="125px" >
																			<?php
																			}
																			else
																			{
																			?>

																		<?php 
																			if($party_details->OTHER_PHOTO == '')
																			{
																		?>
																		<div class="image-input-wrapper w-125px h-125px" style="background-image: url('<?php echo base_url();?>assets/images/Party_Proof.jpg')">
																		</div>
																	<?php }
																		else
																		{
																			if($party_details->TYPE_OF_RECORD=='N')
																			{
																	?>
																	<img class="image-input-wrapper"  src="<?php echo $party_details->OTHER_PHOTO; ?>" height="125px" width="125px" >
																		
																	<?php }
																	else
																	{?>
																		<img class="image-input-wrapper"  src="data:image/jpeg;base64,<?php echo base64_encode($party_details->OTHER_PHOTO); ?>" height="125px" width="125px" >
																		<?php 
																	 }
																	}}?>
																	</div>
																	</div>
															</div>
															<?php 
															$nominee_details=$this->db->query("select * from NOMINEE where PID='".$party_details->PID."'")->result_array();

															?>
															<div class="row">
																<div class="col-lg-4">
																	<div style="border-radius: 10px;padding-bottom: 20px;box-shadow: 0 5px 10px #00002947;">
																		<div class="row px-6">
																			<label class="col-form-label fw-bold fs-4 text-center">Nominee Information</label>
																			<table class="table align-middle table-row-dashed table-striped table-hover fs-7 gy-4 gs-2" id="nominee_table">
																				<thead>
																					<tr class="text-start text-muted fw-bold fs-7 gs-0">
																						<th class="min-w-25px">Sno</th>
																						<th class="min-w-100px">Nominee Name</th>
																						<th class="min-w-80px">Relation</th>
																						<th class="min-w-80px">Mobile No</th>
																					</tr>
																				</thead>
																				<tbody class="text-gray-600 fw-semibold">
																					<?php 
																					$i=0;
																						// for($i=0;$i<$cnt;$i++)
																						foreach ($nominee_details as $nlist) 
																						{
																					?>
																					<tr>
																						<td><?php echo $i+1;?></td>
																						<td class="ple1"><?php echo $nlist['NOMINEE_NAME']; ?></td>
																						<td class="ple1"><?php echo $nlist['RELATION']; ?></td>
																						<td class="ple1"><?php echo $nlist['MOBILE_NO']; ?></td>
																					</tr>
																				<?php 	
																					$i++;
																					} 
																				?>
																					
																				</tbody>
																			</table>
																		</div>
																	</div>
																</div>
																<?php 
															
															$bank_details=$this->db->query("select * from party_bank_upi_details where party_id='".$party_details->PID."'")->result_array();


															?>
																<div class="col-lg-8">
																	<div style="border-radius: 10px;padding-bottom: 20px;box-shadow: 0 5px 10px #00002947;">
																		<div class="row px-6">
																			<label class="col-form-label fw-bold fs-4 text-center">Bank Account Information</label>
																			<table class="table align-middle table-row-dashed table-striped table-hover fs-7 gy-4 gs-2" id="bank_acc_table">
																				<thead>
																					<tr class="text-start text-muted fw-bold fs-7 gs-0">
																						<th class="min-w-25px">Sno</th>
																						<th class="min-w-50px">Type</th>
																						<th class="min-w-80px">Bank Name</th>
																						<th class="min-w-80px">Acc No/Phone No</th>
																						<th class="min-w-80px">Holder Name</th>
																						<th class="min-w-80px">Branch Name</th>
																						<th class="min-w-80px">IFSC Code</th>
																					</tr>
																				</thead>
																				<tbody class="text-gray-600 fw-semibold">
																					<?php 
																					$i=0;
																						// for($i=0;$i<$cnt;$i++)
																						foreach ($bank_details as $bank_details) 
																						{
																					?>
																					<tr>
																						<td><?php echo $i+1;?></td>
																						<td class="ple1"><?php echo $bank_details['payment_type']; ?></td>
																						<td class="ple1"><?php echo $bank_details['account_name']; ?></td>
																						<td class="ple1" ><?php echo $bank_details['phone_account_no']; ?> </td>
																						<td class="ple1"><?php echo $bank_details['account_holder_name']; ?></td>
																						<td class="ple1"><?php echo $bank_details['branch_name']; ?></td>
																						<td class="ple1"><?php echo $bank_details['ifsc_code']; ?></td>
																					</tr>
																					<?php 	
																					$i++;
																					} 
																				?>
																				</tbody>
																			</table>
																		</div>
																	</div>
																</div>
															</div>
														</div>
														<div class="tab-pane fade" id="kt_tab_pane_all_loans" role="tabpanel">
															<div class="row">
																<div class="col-lg-8">
																	<div class="row">
																		<div class="col-lg-3">
																			<label class="required fw-semibold fs-6">Type</label>
																				<select class="form-select form-select-solid" data-control="select2" data-hide-search="true">	
																					<option value="">Select</option>
																					<option value="loan">Loan</option>
																					<option value="receipts">Receipts</option>
																					<option value="redemption">Redemption</option>
																					<option value="repledge">Repledge</option>
																					<option value="mri_loan">MRI Loan</option>
																					<option value="mri_receipts">MRI Receipts</option>
																					<option value="mri_redemption">MRI Redemption</option>
																					<option value="hand_loan">Hand Loan</option>
																				</select>
																		</div>
																		<div class="col-lg-1 mt-7">
																			<button class="btn btn-sm btn-outline btn-outline-solid btn-outline-warning btn-active-light-primary me-2">Go</button>
																		</div>
																	</div>
																</div>
																<div class="col-lg-4">
																	
																</div>
															</div>
															<!-- Party New Loan Details Start -->
															<div class="row">
																<label class="col-form-label fw-bold fs-3">Loan Details</label>
																<table class="table align-middle table-row-dashed table-striped table-hover fs-7 gy-1 gs-2" id="party_loan">
																	<thead>
																		<tr class="text-start text-muted fw-bold fs-7 gs-0">
																			<th class="min-w-25px">Sno</th>
																			<th class="min-w-80px">Date</th>
																			<th class="min-w-80px">Loan No</th>
																			<th class="min-w-80px">Expiry Date</th>
																			<th class="min-w-80px">Scheme - Int</th>
																			<th class="min-w-80px" style="min-width: 70px !important;">Jewel Type</th>
																			<th class="min-w-50px" style="min-width: 60px !important;">No of Item</th>
																			<th class="min-w-50px">Loan Amt</th>
																			<th class="min-w-200px" style="min-width: 170px !important;">Status</th>
																			<th class="min-w-50px"><span class="text-end">Actions</span></th>
																		</tr>
																	</thead>
																	<tbody class="text-gray-600 fw-semibold">
																		<tr>
																			<td>1</td>
																			<td>25/01/2023</td>
																			<td class="ple1">MIP-256/23</td>
																			<td>25/03/2023</td>
																			<td>MIP - 1.25</td>
																			<td>Gold</td>
																			<td>2</td>
																			<td class="ple1">60000.00</td>
																			<td>
																				<label class="col-form-label fw-semibold fs-7" name="" id="" ><span style="background-color:#5aad52;border-radius: 8px;padding: 5px 15px 5px 15px;">Locked In</span>
																				</label>
																			</td>
																			<td>
																				<span class="text-end">
																					<a href="party_loan_view.php" target="_blank" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm">
																						<i class="bi bi-eye-fill eyc"></i>
																					</a>
																				</span>
																			</td>
																		</tr>
																		<tr>
																			<td>2</td>
																			<td>20/02/2015</td>
																			<td class="ple1">TIP-258/15</td>
																			<td>20/05/2015</td>
																			<td>TIP - 1.5</td>
																			<td>Gold</td>
																			<td>1</td>
																			<td class="ple1">15000.00</td>
																			<td>
																				<label class="col-form-label fw-semibold fs-7"><span style="background-color:#6f8790;border-radius: 8px;padding: 5px 15px 5px 15px;">Repledge</span>
																				</label>
																			</td>
																			<td>
																				<span class="text-end">
																					<a href="party_loan_view.php" target="_blank" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm">
																						<i class="bi bi-eye-fill eyc"></i>
																					</a>
																				</span>
																			</td>
																		</tr>
																	</tbody>
																</table>
															</div>
															<!-- Party New Loan Details end -->
															<hr class="mt-2">
															<!-- Party New Loan Receipts Details Start -->
															<div class="row">
																<label class="col-form-label fw-bold fs-3">Loan Receipts Details</label>
																<table class="table align-middle table-row-dashed table-striped table-hover fs-7 gy-1 gs-2" id="party_loan_receipts">
																	<thead>
																		<tr class="text-start text-muted fw-bold fs-7 gs-0">
																			<th class="min-w-25px">Sno</th>
																				<th class="min-w-80px">Recpt Date</th>
																				<th class="min-w-50px">Company</th>
																				<th class="min-w-80px">Loan No</th>
																				<th class="min-w-80px">Int Type</th>
																				<th class="min-w-80px">Principal</th>
																				<th class="min-w-50px">Int Amt</th>
																				<th class="min-w-50px">Charges</th>
																				<th class="min-w-50px">H/L Bal</th>
																				<th class="min-w-50px">On Acc</th>
																				<th class="min-w-80px">Paid</th>
																				<th class="min-w-50px"><span class="text-end">Actions</span></th>
																		</tr>
																	</thead>
																	<tbody class="text-gray-600 fw-semibold">
																		<tr>
																			<td>1</td>
																			<td>10-03-2023</td>
																			<td class="ple1">AGB - Main Branch Sayalkudi</td>
																			<td>MIP-256/23</td>
																			<td>MIP-1.25</td>
																			<td>60000.00</td>
																			<td>750.00</td>
																			<td>0.00</td>
																			<td>-</td>
																			<td>1000.00</td>
																			<td>3000.00</td>
																			<td>
																				<span class="text-end">
																					<a href="javascript:;" target="_blank" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm" data-bs-toggle="modal" data-bs-target="#kt_modal_view_party_loan_receipts">
																						<i class="bi bi-eye-fill eyc"></i>
																					</a>
																				</span>
																			</td>
																		</tr>
																	</tbody>
																</table>
															</div>
															<!-- Party New Loan Receipts Details End -->
															<hr class="mt-2">
															<!-- Party New Loan Redemption Details Start -->
															<div class="row">
																<label class="col-form-label fw-bold fs-3">Loan Redemption Details</label>
																<table class="table align-middle table-row-dashed table-striped table-hover fs-7 gy-1 gs-2" id="party_loan_redemption">
																	<thead>
																		<tr class="text-start text-muted fw-bold fs-7 gs-0">
																			<th class="min-w-25px">Sno</th>
																			<th class="min-w-25px">Date</th>
																			<th class="min-w-80px">Company</th>
																			<th class="min-w-100px">Redemption No</th>
																			<th class="min-w-80px">Scheme - Int</th>
																			<th class="min-w-50px">J.Type</th>
																			<th class="min-w-50px">No of Item</th>
																			<th class="min-w-25px">Loan Amt</th>
																			<th class="min-w-150px">Status</th>
																			<th class="min-w-50px"><span class="text-end">Actions</span></th>
																		</tr>
																	</thead>
																	<tbody class="text-gray-600 fw-semibold">
																		<tr>
																			<td>1</td>
																			<td>25/03/2012</td>
																			<td class="ple1">AGB - Main Branch Sayalkudi</td>
																			<td class="ple1">MIP-186/22</td>
																			<td>MIP - 2.5</td>
																			<td>Gold</td>
																			<td>3</td>
																			<td class="ple1">10000.00</td>
																			<td>
																				<label class="col-form-label fw-semibold fs-7" name="" id="" ><span style="background-color:#ffdf6f;border-radius: 8px;padding: 5px 15px 5px 15px;">Customer Close</span>
																				</label>
																			</td>
																			<td>
																				<span class="text-end">
																					<a href="#" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm" data-bs-toggle="modal" data-bs-target="#kt_modal_view_party_loan_redemption">
																						<i class="bi bi-eye-fill eyc"></i>
																					</a>
																				</span>
																			</td>
																		</tr>
																		<tr>
																			<td>2</td>
																			<td>20/02/2015</td>
																			<td class="ple1">AGB - Main Branch Sayalkudi</td>
																			<td class="ple1">TIP-258/22</td>
																			<td>TIP - 1.5</td>
																			<td>Gold</td>
																			<td>1</td>
																			<td class="ple1">15000.00</td>
																			<td>
																				<label class="col-form-label fw-semibold fs-7"><span style="background-color:#fed4df;border-radius: 8px;padding: 5px 15px 5px 15px;">Customer Transfer</span>
																				</label>
																			</td>
																			<td>
																				<span class="text-end">
																					<a href="#" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm" data-bs-toggle="modal" data-bs-target="#kt_modal_view_party_loan_redemption">
																						<i class="bi bi-eye-fill eyc"></i>
																					</a>
																				</span>
																			</td>
																		</tr>
																	</tbody>
																</table>
															</div>
															<!-- Party New Loan Redemption Details end -->
															<hr class="mt-2">
															<!-- Party MRI Loan Details Start -->
															<div class="row">
																<label class="col-form-label fw-bold fs-3">MRI Loan Details</label>
																<table class="table align-middle table-row-dashed table-striped table-hover fs-7 gy-1 gs-2" id="party_mri_loan">
																	<thead>
																		<tr class="text-start text-muted fw-bold fs-7 gs-0">
																			<th class="min-w-25px">Sno</th>
																			<th class="min-w-80px">Date</th>
																			<th class="min-w-80px">Loan No</th>
																			<th class="min-w-50px">CCL No</th>
																			<th class="min-w-80px">Expiry Date</th>
																			<th class="min-w-80px">Scheme - Int</th>
																			<th class="min-w-80px" style="min-width: 70px !important;">Jewel Type</th>
																			<th class="min-w-50px" style="min-width: 60px !important;">No of Item</th>
																			<th class="min-w-50px">Loan Amt</th>
																			<th class="min-w-200px" style="min-width: 170px !important;">Status</th>
																			<th class="min-w-50px"><span class="text-end">Actions</span></th>
																		</tr>
																	</thead>
																	<tbody class="text-gray-600 fw-semibold">
																		<tr>
																			<td>1</td>
																			<td>25/03/2012</td>
																			<td class="ple1">MRI-01/23</td>
																			<td class="ple1">02/23</td>
																			<td>25/01/2012</td>
																			<td>MRI - 2.0</td>
																			<td>Gold</td>
																			<td>3</td>
																			<td class="ple1">10000.00</td>
																			<td>
																				<label class="col-form-label fw-semibold fs-7" name="" id="" ><span style="background-color:#5aad52;border-radius: 8px;padding: 5px 15px 5px 15px;">Locked In</span>
																				</label>
																			</td>
																			<td>
																				<span class="text-end">
																					<a href="javascript:;" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm">
																						<i class="bi bi-eye-fill eyc"></i>
																					</a>
																				</span>
																			</td>
																		</tr>
																		<tr>
																			<td>2</td>
																			<td>20/02/2015</td>
																			<td class="ple1">MRI-02/23</td>
																			<td class="ple1">03/23</td>
																			<td>20/05/2015</td>
																			<td>MRI - 2.5</td>
																			<td>Gold</td>
																			<td>1</td>
																			<td class="ple1">15000.00</td>
																			<td>
																				<label class="col-form-label fw-semibold fs-7"><span style="background-color:#6f8790;border-radius: 8px;padding: 5px 15px 5px 15px;">Repledge</span>
																				</label>
																			</td>
																			<td>
																				<span class="text-end">
																					<a href="javascript:;" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm">
																						<i class="bi bi-eye-fill eyc"></i>
																					</a>
																				</span>
																			</td>
																		</tr>
																	</tbody>
																</table>
															</div>
															<!-- Party MRI Loan Details end -->
															<hr class="mt-2">
															<!-- Party MRI Loan Receipts Details Start -->
															<div class="row">
																<label class="col-form-label fw-bold fs-3">MRI Loan Receipts Details</label>
																<table class="table align-middle table-row-dashed table-striped table-hover fs-7 gy-1 gs-2" id="party_mri_loan_receipts">
																	<thead>
																		<tr class="text-start text-muted fw-bold fs-7 gs-0">
																			<th class="min-w-25px">Sno</th>
																				<th class="min-w-80px">Recpt Date</th>
																				<th class="min-w-50px">Company</th>
																				<th class="min-w-80px">Loan No</th>
																				<th class="min-w-50px">CCL No</th>
																				<th class="min-w-80px">Int Type</th>
																				<th class="min-w-80px">Principal</th>
																				<th class="min-w-50px">Int Amt</th>
																				<th class="min-w-50px">Charges</th>
																				<th class="min-w-50px">H/L Bal</th>
																				<th class="min-w-80px">Paid</th>
																				<th class="min-w-50px"><span class="text-end">Actions</span></th>
																		</tr>
																	</thead>
																	<tbody class="text-gray-600 fw-semibold">
																		<tr>
																			<td>1</td>
																			<td>25-10-2023</td>
																			<td class="ple1">AGB - Main Branch Sayalkudi</td>
																			<td>MRI-01/23</td>
																			<td>02/23</td>
																			<td>MRI-2.0</td>
																			<td>10000.00</td>
																			<td>927.01</td>
																			<td>500.00</td>
																			<td>1000.00</td>
																			<td>3000.00</td>
																			<td>
																				<span class="text-end">
																					<a href="javascript:;" target="_blank" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm" data-bs-toggle="modal" data-bs-target="#kt_modal_view_loan_receipts">
																						<i class="bi bi-eye-fill eyc"></i>
																					</a>
																				</span>
																			</td>
																		</tr>
																	</tbody>
																</table>
															</div>
															<!-- Party MRI Loan Receipts Details End -->
															<hr class="mt-2">
															<!-- Party MRI Loan Redemption Details Start -->
															<div class="row">
																<label class="col-form-label fw-bold fs-3">MRI Loan Redemption Details</label>
																<table class="table align-middle table-row-dashed table-striped table-hover fs-7 gy-1 gs-2" id="party_mri_loan_redemption">
																	<thead>
																		<tr class="text-start text-muted fw-bold fs-7 gs-0">
																			<th class="min-w-25px">Sno</th>
																			<th class="min-w-25px">Date</th>
																			<th class="min-w-80px">Company</th>
																			<th class="min-w-100px">Redemption No</th>
																			<th class="min-w-50px">CCL No</th>
																			<th class="min-w-80px">Scheme - Int</th>
																			<th class="min-w-50px">J.Type</th>
																			<th class="min-w-50px">No of Item</th>
																			<th class="min-w-25px">Loan Amt</th>
																			<th class="min-w-150px">Status</th>
																			<th class="min-w-50px"><span class="text-end">Actions</span></th>
																		</tr>
																	</thead>
																	<tbody class="text-gray-600 fw-semibold">
																		<tr>
																			<td>1</td>
																			<td>25/03/2012</td>
																			<td class="ple1">AGB - Main Branch Sayalkudi</td>
																			<td class="ple1">MRI-01/23</td>
																			<td class="ple1">02/23</td>
																			<td>MRI - 2.0</td>
																			<td>Gold</td>
																			<td>3</td>
																			<td class="ple1">10000.00</td>
																			<td>
																				<label class="col-form-label fw-semibold fs-7" name="" id="" ><span style="background-color:#b0dfff;border-radius: 8px;padding: 5px 15px 5px 15px;">Company Close</span>
																				</label>
																			</td>
																			<td>
																				<span class="text-end">
																					<a href="#" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm" data-bs-toggle="modal" data-bs-target="#kt_modal_view_redemption">
																						<i class="bi bi-eye-fill eyc"></i>
																					</a>
																				</span>
																			</td>
																		</tr>
																		<tr>
																			<td>2</td>
																			<td>20/02/2015</td>
																			<td class="ple1">AGB - Main Branch Sayalkudi</td>
																			<td class="ple1">MRI-02/23</td>
																			<td class="ple1">03/23</td>
																			<td>MRI - 2.5</td>
																			<td>Gold</td>
																			<td>1</td>
																			<td class="ple1">15000.00</td>
																			<td>
																				<label class="col-form-label fw-semibold fs-7"><span style="background-color:#fed4df;border-radius: 8px;padding: 5px 15px 5px 15px;">Company Transfer</span>
																				</label>
																			</td>
																			<td>
																				<span class="text-end">
																					<a href="#" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm" data-bs-toggle="modal" data-bs-target="#kt_modal_view_redemption">
																						<i class="bi bi-eye-fill eyc"></i>
																					</a>
																				</span>
																			</td>
																		</tr>
																	</tbody>
																</table>
															</div>
															<!-- Party MRI Loan Redemption Details end -->
															<hr class="mt-2">
															<!-- Party Hand Loan Details Start -->
															<div class="row">
																<label class="col-form-label fw-bold fs-3">Hand Loan Details</label>
																<table class="table align-middle table-row-dashed table-striped table-hover fs-7 gy-1 gs-2" id="party_hand_loan">
																	<thead>
																		<tr class="text-start text-muted fw-bold fs-7 gs-0">
																			<th class="min-w-25px">Sno</th>
																			<th class="min-w-25px">Date</th>
																			<th class="min-w-50px">Company</th>
																			<th class="min-w-80px">H/L No</th>
																			<th class="min-w-100px">Type</th>
																			<th class="min-w-100px">Status</th>
																			<th class="min-w-80px">Amount</th>
																			<th class="min-w-80px">Avai.Amt</th>
																			<th class="min-w-80px">Bal.Amt</th>
																			<th class="min-w-80px"><span class="text-end">Actions</span></th>
																		</tr>
																	</thead>
																	<tbody class="text-gray-600 fw-semibold">
																		<tr>
																			<td>1</td>
																			<td>15/03/2023</td>
																			<td class="ple1">AGB - Main Branch Sayalkudi</td>
																			<td>HL-0001/23</td>
																			<td>Hand Loan</td>
																			<td>
																				<label class="col-form-label fw-semibold fs-7"><span
																						style="background-color:#B6BD4F;border-radius: 8px;padding: 5px 15px 5px 15px;">H/L</span>
																				</label>
																			</td>
																			<td>1000.00</td>
																			<td>2000.00</td>
																			<td>3000.00</td>
																			<td>
																				<span class="text-end">
																					<a href="#" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm" data-bs-toggle="modal" data-bs-target="#kt_modal_view_hand_loan">
																						<i class="bi bi-eye-fill eyc"></i>
																					</a>
																				</span>
																			</td>
																		</tr>
																		<tr>
																			<td>2</td>
																			<td>16/03/2023</td>
																			<td class="ple1">AGB - Main Branch Sayalkudi</td>
																			<td>HL-0002/23</td>
																			<td>Receipt</td>
																			<td>
																				<label class="col-form-label fw-semibold fs-7">
																					<span style="background-color:#46dcf9;border-radius: 8px;padding: 5px 15px 5px 15px;">On A/c</span>
																				</label>
																			</td>
																			<td>500.00</td>
																			<td>4500.00</td>
																			<td>4000.00</td>
																			<td>
																				<span class="text-end">
																					<a href="#" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm" data-bs-toggle="modal" data-bs-target="#kt_modal_view_hand_loan">
																						<i class="bi bi-eye-fill eyc"></i>
																					</a>
																				</span>
																			</td>
																		</tr>
																	</tbody>
																</table>
															</div>
															<!-- Party Hand Loan Details end -->
														</div>										
														
												</div>
											</div>
											<?php } ?>
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
					<?php $this->load->view("footer");?>
					</div>
					<!--end::Content-->
				</div>
				<!--end::Wrapper-->
			</div>
			<!--end::Page-->
		</div>
		<!--end::Root-->
		<!--begin::Modal - View Jewel Image-->
		<div class="modal fade" id="kt_modal_view_jewel_img" tabindex="-1" aria-hidden="true">
			<!--begin::Modal dialog-->
			<div class="modal-dialog modal-xs">
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
							
						</div>
						<!--end::Close-->
					</div>
					<!--end::Modal header-->
					<!--begin::Modal body-->
					<div class="modal-body">
						<div class="d-flex justify-content-center">
							<div class="image-input" data-kt-image-input="true">
								<div class="image-input-wrapper w-250px h-250px" style="background-image: url(assets/images/sample_jewel.jpg)"></div>
							</div>
						</div>
					</div>
					<!--end::Modal body-->
				</div>
				<!--end::Modal content-->
			</div>
			<!--end::Modal dialog-->
		</div>
		<!--end::Modal -View Jewel Image-->

		<!--begin::Modal - view karupati sales details-->
		<div class="modal fade" id="kt_modal_view_sale" tabindex="-1" aria-hidden="true">
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
					<div class="modal-body pt-0 pb-5 px-1 px-xl-20">
						<div class="mb-3 text-center">
							<h1>View Sale Details</h1>
						</div>
						<div class="row">
							<label class="col-lg-1 col-form-label fw-semibold fs-6">Date</label>
							<label class="col-lg-2 col-form-label fw-bold fs-5">06-04-2023</label>
						 	<label class="col-lg-1 col-form-label fw-semibold fs-6">Sale Id</label>
							<label class="col-lg-2 col-form-label fw-bold fs-5">AKSS-005/23</label>
							<label class="col-lg-1 col-form-label  fw-semibold fs-6">Party</label>
							<label class="col-lg-3 col-form-label fw-bold fs-5">ROSEMERI</label>
							<label class="col-lg-2 col-form-label fw-bold fs-5 text-center d-flex justify-content-center" style="background-color:#46dcf9;border-radius: 8px;">
								<span>Courier</span>&nbsp;-&nbsp;
								<span>Pending</span>
							</label>
							<!-- <label class="col-lg-2 col-form-label fw-bold fs-5 text-center d-flex justify-content-center" style="background-color:#B6BD4F;border-radius: 8px;">
								<span>Direct</span>&nbsp;-&nbsp;
								<span>Delivered</span>
							</label> -->
						</div>
						<div class="row">
							<label class="col-lg-1 col-form-label fw-semibold fs-6">Tot.Items</label>
							<label class="col-lg-2 col-form-label fw-bold fs-5">2</label>
					  	<label class="col-lg-1 col-form-label fw-semibold fs-6">Tot.Price</label>
							<label class="col-lg-2 col-form-label fw-bold fs-5">54.00</label>
							<div class="col-lg-6">
								<label class="col-form-label fw-semibold fs-6 me-3">Delivered By</label>
								<label class="col-form-label fw-bold fs-5">Professional Courier Service</label>
							</div>
							<div class="col-lg-4">
								<label class="col-form-label fw-semibold fs-6 me-2">Tracking ID</label>
								<label class="col-form-label fw-bold fs-5">PCD12345678</label>
							</div>
							
						</div>
						<div class="row">
							<label class="col-form-label fw-bold fs-2">Product Details</label>
							<table class="table align-middle table-row-dashed table-striped table-hover fs-7 gy-4 gs-2" id="kt_datatable_karuppati_view_table">
								<thead>
									<tr class="text-start text-muted fw-bold fs-7 gs-0">
										<th class="min-w-25px">Sno</th>
										<th class="min-w-25px">Product</th>
										<th class="min-w-80px">Wgt/gms</th>
										<th class="min-w-100px">Price Per Grams</th>
										<th class="min-w-100px">Price</th>
									</tr>
								</thead>
								<tbody class="text-gray-600 fw-semibold">
									<tr>
										<td>1</td>
										<td>Old Jaggery</td>
										<td>100</td>
										<td>25/100</td>
										<td>25</td>
									</tr>
									<tr>
										<td>2</td>
										<td>Palm Candy</td>
										<td>500</td>
										<td>60/1000</td>
										<td>30</td>
									</tr>
								</tbody>
							</table>
						</div>
						<div class="row">
							<div class="col-lg-4">
								<label class="col-form-label fw-semibold fs-5">Total Amount</label>&emsp;
								<label class="col-form-label fw-bold fs-3 text-end">55.00</label>
							</div>
							<div class="col-lg-4">
								<label class="col-form-label  fw-semibold fs-5">Discount</label>&emsp;
						  	<label class="col-form-label fw-bold fs-3 text-end">1.00</label>
							</div>
							<div class="col-lg-4">
								<label class="col-form-label  fw-semibold fs-5">Net Amount</label>&emsp;
						  	<label class="col-form-label fw-bold fs-3 text-end">54.00</label>
							</div>
						  <!-- <div class="col-lg-3">
								<label class="col-form-label fw-semibold fs-5">Delivery Details</label>&emsp;
								<label class="col-form-label fw-bold fs-3 text-end">Courier</label>
					 	  </div> -->
						</div>
						<div class="row">
							<label class="col-form-label fw-bold fs-2">Payment Details</label>
							<table class="table align-middle fs-7 gy-1 gs-2" id="kt_datatable_karuppati_view_payment_table">
								<thead>
									<tr class="text-start text-muted fw-bold fs-7 gs-0">
										<th class="min-w-50px">Payment Mode</th>
										<th class="min-w-100px">Amount</th>
										<th class="min-w-100px">Reference No</th>
										<th class="min-w-100px">Bank</th>
										<th class="min-w-100px">Details</th>
									</tr>
								</thead>
								<tbody class="text-gray-600 fw-bold fs-5">
									<tr>
										<td>Cash</td>
										<td>50.00</td>
										<td>587496</td>
										<td>SBI</td>
										<td>Sample</td>
									</tr>
								</tbody>
							</table>
						</div>
						<div class="row">
							<div class="col-lg-6 text-center">
								<label class="col-form-label fw-bold fs-2">Paid Amount  </label>
								<label class="col-form-label fw-bold fs-3">50</label>
							</div>
							<div class="col-lg-6 text-center">
								<label class="col-form-label fw-bold fs-2">Balance Amount  </label>
								<label class="col-form-label fw-bold fs-3">4</label>
							</div>
						</div>
					</div>
					<!--end::Modal body-->
				</div>
				<!--end::Modal content-->
			</div>
			<!--end::Modal dialog-->
		</div>
		<!--end::Modal -view karupati sales details-->

		<!--begin::Modal - view party loan receipts-->
		<div class="modal fade" id="kt_modal_view_party_loan_receipts" tabindex="-1" aria-hidden="true">
			<div class="modal-dialog modal-xl-loan">
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
						<!--begin::Heading-->
						<div class="mb-3 text-center">
							<h1 class="mb-3">View Loan Receipts</h1>
						</div>
						<div class="row">
							<div class="col-lg-6">
								<div class="px-4" style="border-radius: 10px;padding-bottom: 20px;box-shadow: 0 5px 10px #00002947;">
									<div class="row">
										<label class="col-lg-6 col-form-label fw-bold fs-5 text-end">Loan Information</label>
										<div class="col-lg-6 text-end">
											<label class="col-form-label fw-bold fs-3 text-primary">Loan No &emsp;</label>
											<label class="col-form-label fw-bold fs-3 text-primary">MIP-256/23</label>
										</div>
									</div>
									<div class="row">
										<label class="col-lg-8 col-form-label fw-bold fs-6" name="" id="">
											<i class="fa fa-user fs-6" aria-hidden="true" title="Last Name"></i>&emsp;Abilash Kannan
										</label>
										<label class="col-lg-4 col-form-label fw-bold fs-6">
											<span><i class="fa-solid fa-star fs-6" style="color:#50cd89;"></i></span>&nbsp;Good
										</label>
										<label class="col-lg-2 col-form-label fw-semibold fs-6">Company</label>
										<label class="col-lg-10 col-form-label fw-bold fs-6">AGB - MAIN BRANCH SAYALKUDI</label>
										<label class="col-lg-2 col-form-label fw-semibold fs-6">Int Type</label>
										<label class="col-lg-4 col-form-label fw-bold fs-6">MIP-1.25</label>
										<div class="col-lg-2">
											<label class="col-form-label fw-bold fs-5 text-white" style="border-radius: 8px;padding: 5px 10px 5px 10px;background-color: red;">Overdue</label>
										</div>
										<div class="col-lg-4">
											<label class="col-form-label fw-bold fs-6">3 Month 16 Days</label>
										</div>
										<label class="col-lg-2 col-form-label fw-semibold fs-6">Loan Date</label>
										<label class="col-lg-4 col-form-label fw-bold fs-6">25-01-2023</label>
										<label class="col-lg-2 col-form-label fw-semibold fs-6">Exp.Date</label>
										<label class="col-lg-4 col-form-label fw-bold fs-6">25-03-2023</label>
										<div class="col-lg-6">
											<label class="col-form-label"><i class="fas fa-money-bill-wave fs-4"></i>&emsp;</span></label>
											<label class="col-form-label fw-bold fs-2">60000.00</label>
										</div>
										<div class="col-lg-2">
											<label class="col-form-label"><span><i class="fas fa-list-ol fs-4"></i>&emsp;</span></label>
											<label class="col-form-label fw-bold fs-4">2</label>
										</div>
										<div class="col-lg-4">
											<label class="col-form-label"><span><i class="fas fa-balance-scale fs-4"></i></span>&emsp;</label>
											<label class="col-form-label fw-bold fs-4">32.800</label>
										</div>
										<label class="col-lg-3 col-form-label fw-semibold fs-6">Last Rcpt Count</label>
										<div class="col-lg-3">
											<label class="col-form-label fw-bold fs-6">1</label>
										</div>
										<label class="col-lg-3 col-form-label fw-semibold fs-6">Last Rcpt Date</label>
										<div class="col-lg-3">
											<label class="col-form-label fw-bold fs-6">10-03-2023</label>
										</div>
										<div class="col-lg-12">
											<div class="row">
												<table class="ms-2">
													<thead class="fw-bold fs-6">
														<td class="col-lg-4">Actual</td>
														<td class="col-lg-4">Paid</td>
														<td class="col-lg-4">Balance</td>
													</thead>
													<tbody class="fw-semibold fs-6">
														<tr>
															<td class="col-lg-4">
																<span>Pri : </span>
																<span>60000.00</span>
															</td>
															<td class="col-lg-4">0.00</td>
															<td class="col-lg-4">60000.00</td>
														</tr>
														<tr>
															<td class="col-lg-4">
																<span>Int : </span>
																<span>750.00</span>
															</td>
															<td class="col-lg-4">0.00</td>
															<td class="col-lg-4">750.00</td>
														</tr>
													</tbody>
												</table>
											</div>
										</div>
										<div class="col-lg-4 fv-row mt-4">
											<div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url(assets/media/svg/avatars/signature_blank.png)">
												<div class="image-input-wrapper"  style="background-image: url(assets/images/Jewel.jpg)"></div>
											</div>
										</div>
										<div class="col-lg-4 fv-row mt-4">
											<div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url(assets/images/Party.jpg)">
												<div class="image-input-wrapper"  style="background-image: url(assets/images/Party.jpg)"></div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-lg-6">
								<div class="px-4" style="border-radius: 10px;padding-bottom: 8px;box-shadow: 0 5px 10px #00002947;">
									<div class="row">
					            		<label class="col-lg-8 text-center col-form-label fw-bold fs-4">Charges</label>
					            		<div class="col-lg-4">
														<label class="col-form-label fw-semibold fs-6">
															<span style="background-color:#5aad52;border-radius: 8px;padding: 5px 15px 5px 15px;">Locked In</span>
														</label>
													</div>
					            		<div class="col-lg-6">
					            			<label class="col-form-label fw-semibold fs-6">Maintain Charge &emsp;</label>
					            			<label class="col-form-label fw-bold fs-5">0.00</label>
					            		</div>
					            		<div class="col-lg-6">
					            			<label class="col-form-label fw-semibold fs-6">Notice Charge &emsp;</label>
					            			<label class="col-form-label fw-bold fs-5">0.00</label>
					            		</div>
					            		<div class="col-lg-6">
					            			<label class="col-form-label fw-semibold fs-6">Form Missing &emsp;</label>
					            			<label class="col-form-label fw-bold fs-5">0.00</label>
					            		</div>
					            		<div class="col-lg-6">
					            			<label class="col-form-label fw-semibold fs-6">Deduct From M.Card &emsp;</label>
					            			<label class="col-form-label fw-bold fs-5">0.00</label>
					            		</div>
					            		<div class="col-lg-6">
					            			<label class="col-form-label fw-semibold fs-6">Discount &emsp;</label>
					            			<label class="col-form-label fw-bold fs-5">0.00</label>
					            		</div>
					            		<div class="col-lg-6">
					            			<label class="col-form-label fw-bold fs-3">Total &emsp;</label>
					            			<label class="col-form-label fw-bold fs-3">0.00</label>
					            		</div>
					            		<div class="col-lg-6">
					            			<label class="col-form-label fw-bold fs-3">Finalized Charges &emsp;</label>
					            			<label class="col-form-label fw-bold fs-3">0.00</label>
					            		</div>
					            	</div>
					            	<div class="row">
					            		<label class="col-lg-12 text-center col-form-label fw-bold fs-4">Payment To Receive</label>
					            		<div class="col-lg-6">
					            			<label class="col-form-label fw-semibold fs-6">Total Charge &emsp;</label>
					            			<label class="col-form-label fw-bold fs-5">0.00</label>
					            		</div>
					            		<div class="col-lg-6">
					            			<label class="col-form-label fw-semibold fs-6">H/L Balance &emsp;</label>
					            			<label class="col-form-label fw-bold fs-5">0.00</label>
					            		</div>
					            		<div class="col-lg-6">
					            			<label class="col-form-label fw-semibold fs-6">On Account &emsp;</label>
					            			<label class="col-form-label fw-bold fs-5"><span style="background-color:#ff5b5b;border-radius: 8px;padding: 5px 15px 5px 15px;">1000.00</span>
											</label>
					            		</div>
					            		<div class="col-lg-6">
					            			<label class="col-form-label fw-semibold fs-6">Paid Amount &emsp;</label>
					            			<label class="col-form-label fw-bold fs-3">3000.00</label>
					            		</div>
					            		<div class="col-lg-6">
					            			<label class="col-form-label fw-semibold fs-6">Customer Rating &emsp;</label>
					            			<label class="col-form-label fw-bold fs-5">Good</label>
					            		</div>
					            		<div class="col-lg-6">
					            			<label class="col-form-label fw-semibold fs-6">M.Points &emsp;</label>
					            			<label class="col-form-label fw-bold fs-5">0</label>
					            		</div>
					            		<div class="d-flex justify-content-center align-items-center mt-8">
											<label class="col-form-label fw-bold fs-1 mt-3">Net Payable &emsp; <span>60750.00</span></label>
										</div>
					            	</div><br>
								</div>
							</div>
						</div>
						<div class="row mt-4">
							<div class="accordion" id="kt_accordion_item_list_receive">
							    <div class="accordion-item">
							        <h2 class="accordion-header" id="kt_accordion_item_list_receive_header_1">
							            <button class="accordion-button fw-bold fs-6 collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#kt_accordion_item_list_receive_body_1" aria-expanded="false" aria-controls="kt_accordion_item_list_receive_body_1">
							            Party Payment Details</button>
							        </h2>
							        <div id="kt_accordion_item_list_receive_body_1" class="accordion-collapse collapse" aria-labelledby="kt_accordion_item_list_receive_header_1" data-bs-parent="#kt_accordion_item_list_receive">
							            <div class="accordion-body">
							            	<!-- <div class="row">
															<label class="col-lg-2 col-form-label fw-bold fs-3">Total to Receive</label>
															<label class="col-lg-2 col-form-label fw-bold fs-3">0.00</label>
														</div> -->
														<table class="table align-middle fs-7 gy-2 gs-2" id="view_ln_dels_pyt_receive_frm_party">
															<thead>
																<tr class="text-start text-muted fw-semibold fs-5 gs-0">
											            <th class="min-w-100px">Mode</th>
											            <th class="min-w-100px">Amount</th>
											            <th class="min-w-200px">Party Bank/Ref No</th>
											            <th class="min-w-200px">Company Bank/Ref No</th>
											            <th class="min-w-200px">Details</th>
																</tr>
															</thead>
															<tbody class="text-gray-600 fw-bold fs-4">
																<tr>
											            <td>Cash</td>
											            <td>1000.00</td>
											            <td>-</td>
											            <td>-</td>
											            <td>-</td>
											        	</tr>
											        	<tr>
											            <td>Cheque</td>
											            <td>1000.00</td>
											            <td>SBI</td>
											            <td>1254863</td>
											            <td>-</td>
											        	</tr>
											        	<tr>
											            <td>RTGS</td>
											            <td>500.00</td>
											            <td>8965412</td>
											            <td>SBI</td>
											            <td>-</td>
											        	</tr>
											        	<tr>
											            <td>UPI</td>
											            <td>500.00</td>
											            <td>4587965</td>
											            <td>SBI</td>
											            <td>-</td>
											        	</tr>
														  </tbody>
														</table>
														<div class="row mt-4">
															<div class="col-lg-4 text-center">
																<label class="col-form-label fw-bold fs-3">Net Payable &emsp;</label>
																<label class="col-form-label fw-bold fs-3">60750.00</label>
															</div>
															<div class="col-lg-4 text-center">
																<label class="col-form-label fw-bold fs-3">Paid Amount &emsp;</label>
																<label class="col-form-label fw-bold fs-3">3000.00</label>
															</div>
															<div class="col-lg-4 text-center">
																<label class="col-form-label fw-bold fs-3">Balance Amount &emsp;</label>
																<label class="col-form-label fw-bold fs-3">58750.00</label>
															</div>
														</div>
							            </div>
							        </div>
							    </div>
							</div>
						</div>
						<!-- <div class="d-flex justify-content-center mt-4">
							<a href="loan_view.php" target="_blank">
							<button class="btn btn-primary me-2">Click Here to View Loan History</button></a>
						</div> -->
					</div>
				</div>
				<!--end::Modal dialog-->
			</div>
		</div>
		<!--end::Modal - view party loan receipts-->

		<!--begin::Modal - view party loan redemption-->
		<div class="modal fade" id="kt_modal_view_party_loan_redemption" tabindex="-1" aria-hidden="true">
			<div class="modal-dialog modal-xl-loan">
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
						<!--begin::Heading-->
						<div class="mb-3 text-center">
							<h1 class="mb-3">View Redemption - 
								<label class="col-form-label fw-semibold fs-4">
									<span style="background-color:#ffdf6f;border-radius: 8px;padding: 5px 15px 5px 15px;">Customer Close</span>
								</label>
							</h1>
						</div>
						<div class="row">
							<div class="col-lg-6">
								<div class="px-4" style="border-radius: 10px;padding-bottom: 10px;box-shadow: 0 5px 10px #00002947;">
									<div class="row">
										<label class="col-lg-6 col-form-label fw-bold fs-5 text-end">Party Basic Details</label>
										<div class="col-lg-6 text-end">
											<label class="col-form-label fw-bold fs-3 text-primary">Redemp No  </label>
											<label class="col-form-label fw-bold fs-3 text-primary">MIP-256/22</label>
										</div>
									</div>
									<div class="row">
										<div class="col-lg-6">
											<div class="row">
												<label class="col-lg-12 col-form-label fw-bold fs-6"><i class="fa fa-address-card fs-6" aria-hidden="true" title="Card No"></i>&emsp;1234-5678-9123-1234
													<!-- <i class="fas fa-times-circle fs-5" style="color:red;"></i> -->
													<i class="fas fa-check-circle fs-5" style="color:green;"></i>
												</label>
												<label class="col-lg-6 col-form-label fw-bold fs-6 text-center" name="" id="" ><span style="background-color:#FFAA00;border-radius: 8px;padding: 5px 15px 5px 15px;">Gold</span></label>
												<label class="col-lg-6 col-form-label fw-bold fs-6" name="" id=""><i class="fa-solid fa-coins fs-6" title="Points"></i>&emsp;10052</label>
												<label class="col-lg-12 col-form-label fw-bold fs-6 mt-2" title="Nominee">
												<span><i class="fas fa-user-friends fs-5" title="Nominee"></i>&emsp;</span>
												<span title="Nominee">Selvam-Brother-9852636352</span></label>
												<div class="col-lg-12" title="Rating">
													<label class="col-form-label fw-bold fs-4">
														<i class="fas fa-star-half-alt"></i>&emsp;
													</label>
													<label class="col-form-label fw-bold fs-6">
															<i class="fa-solid fa-star fs-3" style="color:#50cd89;"></i>
														&nbsp;<span>Good</span></label>
												</div>
											</div>
										</div>
										<div class="col-lg-6">
											<div class="row">
												<label class="col-lg-12 col-form-label fw-bold fs-6" name="" id="">
													<i class="fa fa-user fs-6" aria-hidden="true" title="Last Name"></i>&emsp;Abilash Kannan</label>
												<label class="col-lg-12 col-form-label fw-bold fs-6" name="" id="">
													<i class="fa-solid fa-location-dot fs-6" aria-hidden="true" title="Address"></i>
												&emsp;12,Roja Street,Sayalkudi</label>
												<label class="col-lg-12 col-form-label fw-bold fs-6" name="" id="">
														<i class="fas fa-mobile-android-alt fs-6" aria-hidden="true" title="Mobile"></i>
													&emsp;<span>9852124578</span>
												</label>
												<div class="col-lg-12">
													<label class="col-form-label fw-semibold fs-2" style="color: #1a21e3 !important;font-weight: 600 !important;">H/L Bal &emsp;</label>
													<label class="col-form-label fw-bold fs-2" style="color: #1a21e3 !important;font-weight: 600 !important;">2000.00</label>
												</div>
											</div>
										</div>
									</div>
									<div class="row mt-8">
										<div class="col-lg-4 fv-row">
											<div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url(assets/images/Party.jpg)">
												<div class="image-input-wrapper"  style="background-image: url(assets/images/staff_1.png)"></div>
											</div>
										</div>
										<div class="col-lg-4 fv-row">
											<div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url(assets/media/svg/avatars/aadhaar_blank.png)">
												<div class="image-input-wrapper"  style="background-image: url(assets/images/Party_Proof.jpg)"></div>
											</div>
										</div>
										<div class="col-lg-4 fv-row">
											<div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url(assets/media/svg/avatars/signature_blank.png)">
												<div class="image-input-wrapper"  style="background-image: url(assets/images/Signature.jpg)"></div>
											</div>
										</div>
									</div><br>
								</div>
							</div>
							<div class="col-lg-6">
								<div class="px-4" style="border-radius: 10px;padding-bottom: 20px;box-shadow: 0 5px 10px #00002947;">
									<div class="row">
										<label class="col-lg-8 col-form-label fw-bold fs-5 text-center">Loan Information</label>
										<div class="col-lg-4">
											<label class="col-form-label fw-semibold fs-6">
												<span style="background-color:#5aad52;border-radius: 8px;padding: 5px 15px 5px 15px;">Locked In</span>
											</label>
										</div>
									</div>
									<div class="row">
										<label class="col-lg-2 col-form-label fw-semibold fs-6">Company</label>
										<label class="col-lg-10 col-form-label fw-bold fs-6">AGB - MAIN BRANCH SAYALKUDI</label>
										<label class="col-lg-2 col-form-label fw-semibold fs-6">Int Type</label>
										<label class="col-lg-4 col-form-label fw-bold fs-6">MIP-1.25</label>
										<!-- <div class="col-lg-2">
											<label class="col-form-label fw-bold fs-5 bg-success" style="border-radius: 8px;padding: 5px 10px 5px 10px;">Normal</label>
										</div> -->
										<div class="col-lg-2">
											<label class="col-form-label fw-bold fs-5 text-white" style="border-radius: 8px;padding: 5px 10px 5px 10px;background-color: red;">Overdue</label>
										</div>
										<div class="col-lg-4">
											<label class="col-form-label fw-bold fs-6">3 Month 16 Days</label>
										</div>
										<label class="col-lg-2 col-form-label fw-semibold fs-6">Loan Date</label>
										<label class="col-lg-4 col-form-label fw-bold fs-6">25-01-2023</label>
										<label class="col-lg-2 col-form-label fw-semibold fs-6">Exp.Date</label>
										<label class="col-lg-4 col-form-label fw-bold fs-6">25-03-2023</label>
										<div class="col-lg-6" title="Principal Amount">
											<label class="col-form-label"><i class="fas fa-money-bill-wave fs-4"></i>&emsp;</span></label>
											<label class="col-form-label fw-bold fs-2">60000.00</label>
										</div>
										<div class="col-lg-2" title="Pledge Items Count">
											<!-- <a href="javascript:;"><i class="fas fa-list-ol fs-4" title="Pledge Items Count" data-bs-toggle="modal" data-bs-target="#kt_modal_pledge_items"></i></a> -->
											<label class="col-form-label">
												<span><i class="fas fa-list-ol fs-4"></i>&emsp;</span>
											</label>
											<label class="col-form-label fw-bold fs-4">2</label>
										</div>
										<div class="col-lg-4" title="Weight">
											<label class="col-form-label"><span><i class="fas fa-balance-scale fs-4"></i></span>&emsp;</label>
											<label class="col-form-label fw-bold fs-4">3.200</label>
										</div>
										<div class="col-lg-4 fv-row mt-6">
											<div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url(assets/media/svg/avatars/signature_blank.png)">
												<div class="image-input-wrapper"  style="background-image: url(assets/images/Jewel.jpg)"></div>
											</div>
										</div>
										<div class="col-lg-8">
											<div class="row">
												<div class="col-lg-12">
													<label class="fw-semibold fs-6">Ren.No &emsp;</label>
													<label class="fw-bold fs-5">-</label>
												</div>
											</div>
											<div class="row">
												<label class="col-lg-6 col-form-label fw-semibold fs-6">Last Rcpt Count & Date</label>
												<label class="col-lg-2 col-form-label fw-bold fs-6">1</label>
												<label class="col-lg-4 col-form-label fw-bold fs-6">10-03-2023</label>
											</div>
											<div class="row">
												<table>
													<thead class="fw-bold fs-6 text-center">
														<td class="col-lg-4">Actual</td>
														<td class="col-lg-4">Paid</td>
															<!-- <a href="javascript:;"><i class="fas fa-receipt fa-spin fs-4" title="Payment History" data-bs-toggle="modal" data-bs-target="#kt_modal_receipt_amount_history"></i></a></td> -->
														<td class="col-lg-4">Balance</td>
													</thead>
													<tbody class="fw-semibold fs-6 text-center">
														<tr>
															<td class="col-lg-4">
																<span>Pri : </span>
																<span>10557.50</span>
															</td>
															<td class="col-lg-4">10000.00</td>
															<td class="col-lg-4">557.50</td>
														</tr>
														<tr>
															<td class="col-lg-4">
																<span>Int : </span>
																<span>369.51</span>
															</td>
															<td class="col-lg-4">0.00</td>
															<td class="col-lg-4">369.51</td>
														</tr>
														<tr>
															<td class="col-lg-4 fw-bold fs-5">
																<span>Tot : </span>
																<span>10927.01</span>
															</td>
															<td class="col-lg-4 fw-bold fs-5">10000.00</td>
															<td class="col-lg-4 fw-bold fs-5">927.01</td>
														</tr>
													</tbody>
												</table>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="row mt-4">
							<div class="accordion" id="kt_accordion_item_list">
						    <div class="accordion-item">
						        <h2 class="accordion-header" id="kt_accordion_item_list_header_1">
						            <button class="accordion-button fw-bold fs-6 collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#kt_accordion_item_list_body_1" aria-expanded="false" aria-controls="kt_accordion_item_list_body_1">
						            Pledge Info &emsp; - &emsp; Count <span>&emsp; 2 &emsp; - &emsp;</span> Total Net Weight <span>&emsp; 3.200 gms</span>
						            </button>
						        </h2>
						        <div id="kt_accordion_item_list_body_1" class="accordion-collapse collapse" aria-labelledby="kt_accordion_item_list_header_1" data-bs-parent="#kt_accordion_item_list">
						            <div class="accordion-body">
						            	<table class="table align-middle table-row-dashed table-striped table-hover fs-7 gy-1 gs-2" id="redemp_pledge_info">
														<thead>
															<tr class="text-start text-muted fw-bold fs-7 gs-0">
																<th class="min-w-50px">Sno</th>
										            <th class="min-w-150px">Item-Sub Item</th>
										            <th class="min-w-80px">Quality</th>
										            <th class="min-w-80px">Purity(%)</th>
										            <th class="min-w-80px">Weight(gms)</th>
										            <th class="min-w-100px">Stone Wgt(gms)</th>
										            <th class="min-w-80px">Less(gms)</th>
										            <th class="min-w-80px">Nt Wgt(gms)</th>
										            <th class="min-w-50px">Img</th>
															</tr>
														</thead>
														<tbody class="text-gray-600 fw-semibold">
															<tr>
																<td>1</td>
										            <td class="ple1">Chain-Hand Chain</td>
										            <td>KDM</td>
										            <td>91</td>
										            <td>2.400</td>
										            <td>0.100</td>
										            <td>0.100</td>
										            <td>2.200</td>
										            <td>
										            	<div class="image-input mt-2 me-6" data-kt-image-input="true">
																		<div class="image-input-wrapper w-40px h-40px"style="background-image: url(assets/images/sample_jewel.jpg)"></div>
																	</div>
										            </td>
										        	</tr>
												   		<tr>
												   			<td>2</td>
										            <td>Chain-Baby Chain</td>
										            <td>KDM</td>
										            <td>91</td>
										            <td>1.200</td>
										            <td>0.100</td>
										            <td>0.100</td>
										            <td>1.000</td>
										            <td>
										            	<div class="image-input mt-2 me-6" data-kt-image-input="true">
																		<div class="image-input-wrapper w-40px h-40px"style="background-image: url(assets/images/sample_jewel.jpg)"></div>
																	</div>
										            </td>
												       </tr>
													   </tbody>
													   <tfoot>
															<tr class="text-start text-muted fw-bold fs-6 gs-0">
																<th class="min-w-50px"></th>
										            <th class="min-w-150px"></th>
										            <th class="min-w-80px"></th>
										            <th class="min-w-80px">Total</th>
										            <th class="min-w-80px">3.600</th>
										            <th class="min-w-100px">0.200</th>
										            <th class="min-w-80px">0.200</th>
										            <th class="min-w-80px">3.200</th>
										            <th class="min-w-50px"></th>
															</tr>
														</tfoot>
													</table>
													<div class="row">
														<label class="col-lg-1 col-form-label fw-semibold fs-6">Weight</label>
														<label class="col-lg-1 col-form-label fw-bold fs-6">3.600</label>
														<label class="col-lg-1 col-form-label fw-semibold fs-6">Stoneless</label>
														<label class="col-lg-1 col-form-label fw-bold fs-6">0.200</label>
														<label class="col-lg-1 col-form-label fw-semibold fs-6">Less</label>
														<label class="col-lg-1 col-form-label fw-bold fs-6">0.200</label>
														<label class="col-lg-1 col-form-label fw-semibold fs-6">Net.Wght</label>
														<label class="col-lg-1 col-form-label fw-bold fs-6">3.200</label>
														<label class="col-lg-1 col-form-label fw-semibold fs-6">CurrRate</label>
														<label class="col-lg-1 col-form-label fw-bold fs-6">4571.00</label>
														<label class="col-lg-1 col-form-label fw-semibold fs-6">Purity%</label>
														<label class="col-lg-1 col-form-label fw-bold fs-6">91</label>
													</div>
													<div class="row">
														<label class="col-lg-1 col-form-label fw-semibold fs-6">Gram.Val</label>
														<label class="col-lg-1 col-form-label fw-bold fs-6">5784.00</label>
														<label class="col-lg-1 col-form-label fw-semibold fs-6">SalesRate</label>
														<label class="col-lg-1 col-form-label fw-bold fs-6">14589.00</label>
													</div>
						          	</div>
						        </div>
						    </div>
						  </div>
						</div>
						<!-- Customer Close Start -->
						<div id="cus_close_tbox_view">
							<div class="row mt-4">
								<div class="accordion" id="kt_accordion_item_cus_close">
							    <div class="accordion-item">
							        <h2 class="accordion-header" id="kt_accordion_item_cus_close_header_1">
							            <button class="accordion-button fw-bold fs-6 collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#kt_accordion_item_cus_close_body_1" aria-expanded="false" aria-controls="kt_accordion_item_cus_close_body_1">
							            Customer Close Details</button>
							        </h2>
							        <div id="kt_accordion_item_cus_close_body_1" class="accordion-collapse collapse" aria-labelledby="kt_accordion_item_cus_close_header_1" data-bs-parent="#kt_accordion_item_cus_close">
							            <div class="accordion-body">
							            	<div class="row mt-4">
															<label class="col-lg-2 col-form-label fw-bold fs-3">Customer Close</label>
															<div class="col-lg-10">
																<label class="col-form-label fw-bold fs-3">Total Balance &emsp;</label>
																<label class="col-form-label fw-bold fs-3">10927.01</label>
																<span class="fw-bold fs-3">&emsp;(&nbsp;</span>
																<label class="col-form-label fw-bold fs-3">Principal &emsp;</label>
																<label class="col-form-label fw-bold fs-3">10557.50</label>&emsp;
																<label class="col-form-label fw-bold fs-3">Interest &emsp;</label>
																<label class="col-form-label fw-bold fs-3">369.51</label>
																<span class="fw-bold fs-3">&nbsp;)</span>
															</div>
															<div class="col-lg-4">
																<div class="row">
																	<label class="col-lg-6 col-form-label fw-semibold fs-6">Paper Action Charge</label>
																	<label class="col-lg-6 col-form-label fw-bold fs-5">50.00</label>
																	<label class="col-lg-6 col-form-label fw-semibold fs-6">Notice Charge</label>
																	<label class="col-lg-6 col-form-label fw-bold fs-5">50.00</label>
																	<label class="col-lg-6 col-form-label fw-semibold fs-6">Form Missing</label>
																	<div class="col-lg-6">
																		<div class="image-input image-input-outline " data-kt-image-input="true" style="background-image: url(assets/images/Document.jpg)">
																			<div class="image-input-wrapper w-50px h-50px" style="background-image: url(assets/images/Document.jpg)"></div>
																		</div>
																	</div>
																</div>
															</div>
															<div class="col-lg-4">
																<div class="row">
																	<label class="col-lg-6 col-form-label fw-semibold fs-6">On Account</label>
																	<label class="col-lg-6 col-form-label fw-bold fs-5" style="background-color:#ff5b5b;color: white;border-radius: 8px;">1000.00</label>
																	<label class="col-lg-6 col-form-label fw-semibold fs-6">Discount</label>
																	<label class="col-lg-6 col-form-label fw-bold fs-5">100.00</label>
																	<div class="col-lg-12 text-center">
																		<label class="col-form-label fw-bold fs-2">Net Pay &emsp;</label>
																		<label class="col-form-label fw-bold fs-2">11977.01</label>
																	</div>
																</div>
															</div>
															<div class="col-lg-4">
																<div class="row">
																	<label class="col-lg-6 col-form-label fw-semibold fs-6">Closed By</label>
																	<label class="col-lg-6 col-form-label fw-bold fs-5">Nominee</label>
																	<label class="col-lg-6 col-form-label fw-semibold fs-6">Name</label>
																	<label class="col-lg-6 col-form-label fw-bold fs-5">Selvam</label>
																</div>
															</div>
														</div>
														<div class="row">
															<label class="col-form-label fw-bold fs-4">Party Payment Details</label>
															<table class="table align-middle fs-7 gy-2 gs-2" id="view_redemp_cus_close_pyt_receive_frm_party">
																<thead>
																	<tr class="text-start text-muted fw-semibold fs-5 gs-0">
												            <th class="min-w-150px">Mode</th>
												            <th class="min-w-150px">Amount</th>
												            <th class="min-w-200px">Party Bank/Ref No/<br>Avai.Points/Chit ID</th>
												            <th class="min-w-200px">Company Bank/Ref No/<br>Redm.Points/Redm.Amt</th>
												            <th class="min-w-250px">Details</th>
																	</tr>
																</thead>
																<tbody class="text-gray-600 fw-bold fs-4">
																	<tr>
												            <td>Cash</td>
												            <td>3000.00</td>
												            <td>-</td>
												            <td>-</td>
												            <td>-</td>
												        	</tr>
												        	<tr>
												            <td>Cheque</td>
												            <td>3000.00</td>
												            <td>SBI</td>
												            <td>784569</td>
												            <td>-</td>
												        	</tr>
												        	<tr>
												            <td>RTGS</td>
												            <td>3000.00</td>
												            <td>8596745</td>
												            <td>IOB</td>
												            <td>-</td>
												        	</tr>
												        	<tr>
												            <td>UPI</td>
												            <td>2977.01</td>
												            <td>8574526</td>
												            <td>IOB</td>
												            <td>-</td>
												        	</tr>
												        	<tr>
												            <td>Mem.Card No</td>
												            <td>-</td>
												            <td>-</td>
												            <td>-</td>
												            <td>-</td>
												        	</tr>
												        	<tr>
												            <td>Scheme</td>
												            <td>-</td>
												            <td>-</td>
												            <td>-</td>
												            <td>-</td>
												        	</tr>
															  </tbody>
															</table>
														</div>
														<div class="row mt-4">
															<div class="col-lg-6 text-center">
																<label class="col-form-label fw-bold fs-3">Net Payable &emsp;</label>
																<label class="col-form-label fw-bold fs-3">11977.01</label>
															</div>
															<div class="col-lg-6 text-center">
																<label class="col-form-label fw-bold fs-3">Paid Amount &emsp;</label>
																<label class="col-form-label fw-bold fs-3">11977.01</label>
															</div>
														</div>
														<div class="row mt-4">
															<label class="col-lg-2 col-form-label fw-semibold fs-6">Customer Rating</label>
															<label class="col-lg-1 col-form-label fw-bold fs-5">Good</label>
															<label class="col-lg-2 col-form-label fw-semibold fs-6">Memb.Points Add</label>
															<label class="col-lg-2 col-form-label fw-bold fs-5">30</label>
														</div>
							          	</div>
							        </div>
							    </div>
							  </div>
							</div>
						</div>
						<hr class="mt-2">
						<!-- Customer Close end -->
						<!-- Customer Transfer start -->
						<div id="cus_trans_tbox_view">
							<div class="row mt-4">
								<div class="accordion" id="kt_accordion_item_cus_trans">
							    <div class="accordion-item">
							        <h2 class="accordion-header" id="kt_accordion_item_cus_trans_header_1">
							            <button class="accordion-button fw-bold fs-6 collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#kt_accordion_item_cus_trans_body_1" aria-expanded="false" aria-controls="kt_accordion_item_cus_trans_body_1">
							            Customer Transfer Details</button>
							        </h2>
							        <div id="kt_accordion_item_cus_trans_body_1" class="accordion-collapse collapse" aria-labelledby="kt_accordion_item_cus_trans_header_1" data-bs-parent="#kt_accordion_item_cus_trans">
							            <div class="accordion-body">
							            	<div class="row mt-4">
															<label class="col-lg-3 col-form-label fw-bold fs-3">Customer Transfer</label>
															<div class="col-lg-9">
																<label class="col-form-label fw-bold fs-3">Total Balance &emsp;</label>
																<label class="col-form-label fw-bold fs-3">10927.01</label>
																<span class="fw-bold fs-3">&emsp;(&nbsp;</span>
																<label class="col-form-label fw-bold fs-3">Principal &emsp;</label>
																<label class="col-form-label fw-bold fs-3">10557.50</label>&emsp;
																<label class="col-form-label fw-bold fs-3">Interest &emsp;</label>
																<label class="col-form-label fw-bold fs-3">369.51</label>
																<span class="fw-bold fs-3">&nbsp;)</span>
															</div>
															<div class="col-lg-4">
																<div class="row">
																	<label class="col-lg-6 col-form-label fw-semibold fs-6">Paper Action Charge</label>
																	<label class="col-lg-6 col-form-label fw-bold fs-5">50.00</label>
																	<label class="col-lg-6 col-form-label fw-semibold fs-6">Notice Charge</label>
																	<label class="col-lg-6 col-form-label fw-bold fs-5">50.00</label>
																	<label class="col-lg-6 col-form-label fw-semibold fs-6">Form Missing</label>
																	<div class="col-lg-6">
																		<div class="image-input image-input-outline " data-kt-image-input="true" style="background-image: url(assets/images/Document.jpg)">
																			<div class="image-input-wrapper w-50px h-50px" style="background-image: url(assets/images/Document.jpg)"></div>
																		</div>
																	</div>
																</div>
															</div>
															<div class="col-lg-4">
																<div class="row">
																	<label class="col-lg-6 col-form-label fw-semibold fs-6">On Account</label>
																	<label class="col-lg-6 col-form-label fw-bold fs-5" style="background-color:#ff5b5b;color: white;border-radius: 8px;">1000.00</label>
																	<label class="col-lg-6 col-form-label fw-semibold fs-6">Discount</label>
																	<label class="col-lg-6 col-form-label fw-bold fs-5">100.00</label>
																	<div class="col-lg-12 text-center">
																		<label class="col-form-label fw-bold fs-2">Net Pay &emsp;</label>
																		<label class="col-form-label fw-bold fs-2">11977.01</label>
																	</div>
																</div>
															</div>
															<div class="col-lg-4">
																<div class="row">
																	<label class="col-lg-6 col-form-label fw-semibold fs-6">Closed By</label>
																	<label class="col-lg-6 col-form-label fw-bold fs-5">Nominee</label>
																	<label class="col-lg-6 col-form-label fw-semibold fs-6">Name</label>
																	<label class="col-lg-6 col-form-label fw-bold fs-5">Selvam</label>
																</div>
															</div>
														</div>
														<div class="row">
															<!-- <label class="col-form-label fw-bold fs-5">Party Need More Cash</label> -->
															<label class="col-lg-2 col-form-label fw-semibold fs-6">Payable Amount</label>
															<label class="col-lg-2 col-form-label fw-bold fs-5">0.00</label>
															<label class="col-lg-2 col-form-label fw-semibold fs-6">Balance in Current Loan</label>
															<label class="col-lg-2 col-form-label fw-bold fs-5">11977.01</label>
															<label class="col-lg-2 col-form-label fw-semibold fs-6">Request from New Loan</label>
															<label class="col-lg-2 col-form-label fw-bold fs-5">5000.00</label>
														</div>
							          	</div>
							        </div>
							    </div>
							  </div>
							</div>
							<div class="row mt-4">
								<div class="accordion" id="kt_accordion_item_redemption_cus_trans_party_payment">
							    <div class="accordion-item">
							        <h2 class="accordion-header" id="kt_accordion_item_redemption_cus_trans_party_payment_header_1">
							            <button class="accordion-button fw-bold fs-6 collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#kt_accordion_item_redemption_cus_trans_party_payment_body_1" aria-expanded="false" aria-controls="kt_accordion_item_redemption_cus_trans_party_payment_body_1">
							            Party Payment Details</button>
							        </h2>
							        <div id="kt_accordion_item_redemption_cus_trans_party_payment_body_1" class="accordion-collapse collapse" aria-labelledby="kt_accordion_item_redemption_cus_trans_party_payment_header_1" data-bs-parent="#kt_accordion_item_redemption_cus_trans_party_payment">
							            <div class="accordion-body">
							            	<div class="row">
															<table class="table align-middle fs-7 gy-2 gs-2" id="view_redemp_cus_trans_pyt_receive_frm_party">
																<thead>
																	<tr class="text-start text-muted fw-semibold fs-5 gs-0">
												            <th class="min-w-150px">Mode</th>
												            <th class="min-w-150px">Amount</th>
												            <th class="min-w-200px">Party Bank/Ref No/<br>Avai.Points/Chit ID</th>
												            <th class="min-w-200px">Company Bank/Ref No/<br>Redm.Points/Redm.Amt</th>
												            <th class="min-w-250px">Details</th>
																	</tr>
																</thead>
																<tbody class="text-gray-600 fw-bold fs-4">
																	<tr>
												            <td>Cash</td>
												            <td>0.00</td>
												            <td>-</td>
												            <td>-</td>
												            <td>-</td>
												        	</tr>
												        	<tr>
												            <td>Cheque</td>
												            <td>0.00</td>
												            <td>-</td>
												            <td>-</td>
												            <td>-</td>
												        	</tr>
												        	<tr>
												            <td>RTGS</td>
												            <td>0.00</td>
												            <td>-</td>
												            <td>-</td>
												            <td>-</td>
												        	</tr>
												        	<tr>
												            <td>UPI</td>
												            <td>0.00</td>
												            <td>-</td>
												            <td>-</td>
												            <td>-</td>
												        	</tr>
												        	<tr>
												            <td>Mem.Card No</td>
												            <td>-</td>
												            <td>-</td>
												            <td>-</td>
												            <td>-</td>
												        	</tr>
												        	<tr>
												            <td>Scheme</td>
												            <td>-</td>
												            <td>-</td>
												            <td>-</td>
												            <td>-</td>
												        	</tr>
															  </tbody>
															</table>
														</div>
														<div class="row mt-4">
															<div class="col-lg-6 text-center">
																<label class="col-form-label fw-bold fs-3">Net Payable &emsp;</label>
																<label class="col-form-label fw-bold fs-3">0.00</label>
															</div>
															<div class="col-lg-6 text-center">
																<label class="col-form-label fw-bold fs-3">Paid Amount &emsp;</label>
																<label class="col-form-label fw-bold fs-3">0.00</label>
															</div>
														</div>
							            </div>
							        </div>
							    </div>
								</div>
							</div>
							<div class="row mt-4">
								<div class="accordion" id="kt_accordion_item_redemption_new_loan">
							    <div class="accordion-item">
							        <h2 class="accordion-header" id="kt_accordion_item_redemption_new_loan_header_1">
							            <button class="accordion-button fw-bold fs-6 collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#kt_accordion_item_redemption_new_loan_body_1" aria-expanded="false" aria-controls="kt_accordion_item_redemption_new_loan_body_1">
							            New Loan Entry</button>
							        </h2>
							        <div id="kt_accordion_item_redemption_new_loan_body_1" class="accordion-collapse collapse" aria-labelledby="kt_accordion_item_redemption_new_loan_header_1" data-bs-parent="#kt_accordion_item_redemption_new_loan">
							            <div class="accordion-body">
							            	<div class="row">
							            		<div class="col-lg-1">
							            			<label class="col-form-label fw-semibold fs-6">JewelType</label>
							            		</div>
							            		<label class="col-lg-2 col-form-label fw-bold fs-5">Gold</label>
															<label class="col-lg-1 col-form-label fw-semibold fs-6">Scheme</label>
															<label class="col-lg-2 col-form-label fw-bold fs-5">MIP</label>
															<label class="col-lg-1 col-form-label fw-semibold fs-6">Int Type</label>
															<label class="col-lg-2 col-form-label fw-bold fs-5">2.75</label>
															<div class="col-lg-3">
																<label class="col-form-label fw-semibold fs-6">Expiry Date &emsp;</label>
																<label class="col-form-label fw-bold fs-5">25-06-2023</label>
															</div>
							            	</div>
														<div class="row mt-4">
															<div class="col-lg-4">
																<div class="px-4" style="border-radius: 10px;padding-bottom: 10px;box-shadow: 0 5px 10px #00002947;">
																	<label class="col-lg-12 col-form-label fw-bold fs-5 text-center">Loan Payment Information</label>
																	<div class="row">
																		<label class="col-lg-6 col-form-label fw-semibold fs-6">Loan Amount</label>
																		<label class="col-lg-6 col-form-label fw-bold fs-5" style="font-size: 18px !important;font-weight: 700 !important;color: #1B439E !important;">16977.01</label>
																		<label class="col-lg-6 col-form-label fw-semibold fs-6">Monthly Interest</label>
																		<label class="col-lg-6 col-form-label fw-bold fs-5"><span style="background-color:#C6C6C6;border-radius: 8px;padding: 5px 15px 5px 15px;">250.00</span></label>
																		<label class="col-lg-6 col-form-label fw-semibold fs-6">Redemption period</label>
																		<label class="col-lg-2 col-form-label fw-bold fs-5">30</label>
																		<label class="col-lg-3 col-form-label fw-semibold fs-6" id="loan_per_mon_days">Days</label>
																	</div>
																	<div class="row">
																		<div class="d-flex justify-content-center align-items-center">
																			<label class="col-form-label fw-bold fs-3">Total Loan Amount &emsp; <span>16977.01</span></label>
																		</div>
																	</div>
																</div>
															</div>
															<div class="col-lg-4">
																<div class="px-4" style="border-radius: 10px;padding-bottom: 8px;box-shadow: 0 5px 10px #00002947;">
																	<label class="col-lg-12 col-form-label fw-bold fs-5 text-center">Payment To Receive</label>
																	<div class="row">
																		<div class="col-lg-12 text-center">
																			<label class="col-form-label fw-bold fs-3">Current Loan Net Pay &emsp;</label>
																			<label class="col-form-label fw-bold fs-3">11977.01</label>
																		</div>
																		<label class="col-lg-6 col-form-label fw-semibold fs-6">Processing Charge</label>
																		<label class="col-lg-2 col-form-label fw-bold fs-5">50</label>
																		<label class="col-lg-6 col-form-label fw-semibold fs-6">Document Charge</label>
																		<label class="col-lg-6 col-form-label fw-bold fs-5">50</label>
																	</div>
																	<div class="row mt-1">
																		<label class="col-lg-12 col-form-label fw-bold fs-3 text-center">Total &emsp; <span>12077.01</span></label>
																	</div>
																</div>
															</div>
															<div class="col-lg-4">
																<div class="px-4" style="padding-bottom: 5px;border-radius: 10px;box-shadow: 0 5px 10px #00002947;">
																	<label class="col-lg-12 col-form-label fw-bold fs-5 text-center">To Pay</label>
																	<div class="row">
																		<label class="col-lg-4 col-form-label fw-bold fs-3">Net Pay</label>
																		<label class="col-lg-8 col-form-label fw-bold fs-3">4900.00</label>
																	</div>
																	<div class="row">
																		<label class="col-lg-4 col-form-label fw-semibold fs-6">Remarks</label>
																	</div>
																	<div class="row mb-17">
																		<label class="col-lg-12 col-form-label fw-bold fs-5">-</label>
																	</div>
																</div>
															</div>
														</div>
														<div class="row mt-4">
							            		<label class="col-form-label fw-bold fs-4">Payment From Company</label>
							            		<table class="table align-middle fs-7 gy-2 gs-2" id="view_redemp_cus_trans_to_pay_frm_cmy">
																<thead>
																	<tr class="text-start text-muted fw-semibold fs-5 gs-0">
												            <th class="min-w-100px">Mode</th>
												            <th class="min-w-100px">Amount</th>
												            <th class="min-w-200px">Reference No</th>
												            <th class="min-w-200px">Company Bank</th>
												            <th class="min-w-200px">Party Bank</th>
												            <th class="min-w-200px">Details</th>
																	</tr>
																</thead>
																<tbody class="text-gray-600 fw-bold fs-4">
																	<tr>
												            <td>Cash</td>
												            <td>4900.00</td>
												            <td>-</td>
												            <td>-</td>
												            <td>-</td>
												            <td>-</td>
												        	</tr>
												        	<tr>
												            <td>Cheque</td>
												            <td>0.00</td>
												            <td>-</td>
												            <td>-</td>
												            <td>-</td>
												            <td>-</td>
												        	</tr>
												        	<tr>
												            <td>RTGS</td>
												            <td>0.00</td>
												            <td>-</td>
												            <td>-</td>
												            <td>-</td>
												            <td>-</td>
												        	</tr>
												        	<tr>
												            <td>UPI</td>
												            <td>0.00</td>
												            <td>-</td>
												            <td>-</td>
												            <td>-</td>
												            <td>-</td>
												        	</tr>
															  </tbody>
															</table>
														</div>
							            </div>
							        </div>
							    </div>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-4 text-center">
									<label class="col-form-label fw-semibold fs-6">Net Payable &emsp;</label>
									<label class="col-form-label fw-bold fs-2">4900.00</label>
								</div>
								<div class="col-lg-4 text-center">
									<label class="col-form-label fw-semibold fs-6">Paid Amount &emsp;</label>
									<label class="col-form-label fw-bold fs-2">4900.00</label>
								</div>
								<div class="col-lg-4 text-center">
									<label class="col-form-label fw-semibold fs-6">Balance Amount &emsp;</label>
									<label class="col-form-label fw-bold fs-2">0.00</label>
								</div>
							</div>
							<div class="row mt-4">
								<label class="col-lg-2 col-form-label fw-semibold fs-6">Customer Rating</label>
								<label class="col-lg-1 col-form-label fw-bold fs-5">Good</label>
								<label class="col-lg-2 col-form-label fw-semibold fs-6">Membership Points Add</label>
								<label class="col-lg-2 col-form-label fw-bold fs-5">30</label>
							</div>
						</div>
						<hr class="mt-2">
						<!-- Customer Transfer End -->
						<!-- Customer Sale Start -->
						<div id="cus_sale_tbox_view">
							<div class="row mt-4">
								<div class="accordion" id="kt_accordion_item_cus_sale">
							    <div class="accordion-item">
							        <h2 class="accordion-header" id="kt_accordion_item_cus_sale_header_1">
							            <button class="accordion-button fw-bold fs-6 collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#kt_accordion_item_cus_sale_body_1" aria-expanded="false" aria-controls="kt_accordion_item_cus_sale_body_1">
							            Customer Sale</button>
							        </h2>
							        <div id="kt_accordion_item_cus_sale_body_1" class="accordion-collapse collapse" aria-labelledby="kt_accordion_item_cus_sale_header_1" data-bs-parent="#kt_accordion_item_cus_sale">
							            <div class="accordion-body">
							            	<div class="row">
							            		<label class="col-lg-3 col-form-label fw-bold fs-3">Customer Sale</label>
															<div class="col-lg-9">
																<label class="col-form-label fw-bold fs-3">Total Balance &emsp;</label>
																<label class="col-form-label fw-bold fs-3">10927.01</label>
																<span class="fw-bold fs-3">&emsp;(&nbsp;</span>
																<label class="col-form-label fw-bold fs-3">Principal &emsp;</label>
																<label class="col-form-label fw-bold fs-3">10557.50</label>&emsp;
																<label class="col-form-label fw-bold fs-3">Interest &emsp;</label>
																<label class="col-form-label fw-bold fs-3">369.51</label>
																<span class="fw-bold fs-3">&nbsp;)</span>
															</div>
															<div class="col-lg-4">
																<div class="row">
																	<label class="col-lg-6 col-form-label fw-semibold fs-6">Paper Action Charge</label>
																	<label class="col-lg-6 col-form-label fw-bold fs-5">50.00</label>
																	<label class="col-lg-6 col-form-label fw-semibold fs-6">Notice Charge</label>
																	<label class="col-lg-6 col-form-label fw-bold fs-5">50.00</label>
																	<label class="col-lg-6 col-form-label fw-semibold fs-6">Form Missing</label>
																	<div class="col-lg-6">
																		<div class="image-input image-input-outline " data-kt-image-input="true" style="background-image: url(assets/images/Document.jpg)">
																			<div class="image-input-wrapper w-50px h-50px" style="background-image: url(assets/images/Document.jpg)"></div>
																		</div>
																	</div>
																	<label class="col-lg-6 col-form-label fw-semibold fs-6">Purchase Amount</label>
																	<label class="col-lg-6 col-form-label fw-bold fs-4">14000.00</label>
																</div>
															</div>
															<div class="col-lg-4">
																<div class="row">
																	<label class="col-lg-6 col-form-label fw-semibold fs-6">On Account</label>
																	<label class="col-lg-6 col-form-label fw-bold fs-5" style="background-color:#ff5b5b;color: white;border-radius: 8px;">1000.00</label>
																	<label class="col-lg-6 col-form-label fw-semibold fs-6">Discount</label>
																	<label class="col-lg-6 col-form-label fw-bold fs-5">100.00</label>
																	<div class="col-lg-12 text-center">
																		<label class="col-form-label fw-bold fs-2">Net Pay &emsp;</label>
																		<label class="col-form-label fw-bold fs-2">11977.01</label>
																	</div>
																	<label class="col-lg-6 col-form-label fw-semibold fs-6">Balance</label>
																	<label class="col-lg-6 col-form-label fw-bold fs-4">2022.99</label>
																</div>
															</div>
															<div class="col-lg-4">
																<div class="row">
																	<label class="col-lg-6 col-form-label fw-semibold fs-6">Closed By</label>
																	<label class="col-lg-6 col-form-label fw-bold fs-5">Nominee</label>
																	<label class="col-lg-6 col-form-label fw-semibold fs-6">Name</label>
																	<label class="col-lg-6 col-form-label fw-bold fs-5">Selvam</label>
																	<label class="col-lg-12 col-form-label fw-bold fs-3 text-center">Witness Details</label>
																	<div class="col-lg-12">
																		<table class="table align-middle table-hover fs-7 gy-1 gs-2" id="view_redemp_cus_sale_witness">
																			<thead>
																				<tr class="text-start text-muted fw-bold fs-7 gs-0">
																					<th class="min-w-50px">Name</th>
																					<th class="min-w-50px">Relation</th>
																					<th class="min-w-50px">Mobile</th>
																					<th class="min-w-50px">Remarks</th>
																				</tr>
																			</thead>
																			<tbody class="text-gray-600 fw-semibold">
																				<tr>
																					<td class="ple1">Selvam</td>
																					<td class="ple1">Brother</td>
																					<td class="ple1">9852636352</td>
																					<td class="ple1">-</td>
																				</tr>
																				<tr>
																					<td class="ple1">Subramani</td>
																					<td class="ple1">Father</td>
																					<td class="ple1">8574859685</td>
																					<td class="ple1">-</td>
																				</tr>
																			</tbody>
																		</table>
																	</div>
																</div>
															</div>
							            	</div>
							          	</div>
							        </div>
							    </div>
							  </div>
							</div>
							<div class="row mt-4">
								<div class="accordion" id="kt_accordion_item_redemption_cus_sale_cmy_payment">
							    <div class="accordion-item">
							        <h2 class="accordion-header" id="kt_accordion_item_redemption_cus_sale_cmy_payment_header_1">
							            <button class="accordion-button fw-bold fs-6 collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#kt_accordion_item_redemption_cus_sale_cmy_payment_body_1" aria-expanded="false" aria-controls="kt_accordion_item_redemption_cus_sale_cmy_payment_body_1">
							            Payment From Company</button>
							        </h2>
							        <div id="kt_accordion_item_redemption_cus_sale_cmy_payment_body_1" class="accordion-collapse collapse" aria-labelledby="kt_accordion_item_redemption_cus_sale_cmy_payment_header_1" data-bs-parent="#kt_accordion_item_redemption_cus_sale_cmy_payment">
							            <div class="accordion-body">
							            	<div class="row">
							            		<table class="table align-middle fs-7 gy-2 gs-2" id="view_redemp_cus_sale_to_pay_frm_cmy">
																<thead>
																	<tr class="text-start text-muted fw-semibold fs-5 gs-0">
												            <th class="min-w-100px">Mode</th>
												            <th class="min-w-100px">Amount</th>
												            <th class="min-w-200px">Reference No</th>
												            <th class="min-w-200px">Company Bank</th>
												            <th class="min-w-200px">Party Bank</th>
												            <th class="min-w-200px">Details</th>
																	</tr>
																</thead>
																<tbody class="text-gray-600 fw-bold fs-4">
																	<tr>
												            <td>Cash</td>
												            <td>2538.19</td>
												            <td>-</td>
												            <td>-</td>
												            <td>-</td>
												            <td>-</td>
												        	</tr>
												        	<tr>
												            <td>Cheque</td>
												            <td>0.00</td>
												            <td>-</td>
												            <td>-</td>
												            <td>-</td>
												            <td>-</td>
												        	</tr>
												        	<tr>
												            <td>RTGS</td>
												            <td>0.00</td>
												            <td>-</td>
												            <td>-</td>
												            <td>-</td>
												            <td>-</td>
												        	</tr>
												        	<tr>
												            <td>UPI</td>
												            <td>0.00</td>
												            <td>-</td>
												            <td>-</td>
												            <td>-</td>
												            <td>-</td>
												        	</tr>
															  </tbody>
															</table>
														</div>
							            </div>
							        </div>
							    </div>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-4 text-center">
									<label class="col-form-label fw-semibold fs-6">Net Payable &emsp;</label>
									<label class="col-form-label fw-bold fs-2">2538.19</label>
								</div>
								<div class="col-lg-4 text-center">
									<label class="col-form-label fw-semibold fs-6">Paid Amount &emsp;</label>
									<label class="col-form-label fw-bold fs-2">2538.19</label>
								</div>
								<div class="col-lg-4 text-center">
									<label class="col-form-label fw-semibold fs-6">Balance Amount &emsp;</label>
									<label class="col-form-label fw-bold fs-2">0.00</label>
								</div>
							</div>
							<div class="row mt-4">
								<label class="col-lg-2 col-form-label fw-semibold fs-6">Customer Rating</label>
								<label class="col-lg-1 col-form-label fw-bold fs-5">Good</label>
								<label class="col-lg-2 col-form-label fw-semibold fs-6">Membership Points Add</label>
								<label class="col-lg-2 col-form-label fw-bold fs-5">30</label>
							</div>
						</div>
						<hr class="mt-2">
						<!-- Customer Sale end -->
						<!-- Multi Jewel Start -->
						<div id="multi_jwl_tbox_view">
							<div class="row mt-4">
								<div class="accordion" id="kt_accordion_mul_jwl">
							    <div class="accordion-item">
							        <h2 class="accordion-header" id="kt_accordion_mul_jwl_header_1">
							            <button class="accordion-button fw-bold fs-6 collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#kt_accordion_mul_jwl_body_1" aria-expanded="false" aria-controls="kt_accordion_mul_jwl_body_1">
							            Multi Jewel Details</button>
							        </h2>
							        <div id="kt_accordion_mul_jwl_body_1" class="accordion-collapse collapse" aria-labelledby="kt_accordion_mul_jwl_header_1" data-bs-parent="#kt_accordion_mul_jwl">
							            <div class="accordion-body">
							            	<div class="row">
															<label class="col-lg-2 col-form-label fw-bold fs-3">Multi Jewel</label>
															<div class="col-lg-10">
																<label class="col-form-label fw-bold fs-3">Total Amount &emsp;</label>
																<label class="col-form-label fw-bold fs-3">10927.01</label>
																<span class="fw-bold fs-3">&emsp;(&nbsp;</span>
																<label class="col-form-label fw-bold fs-3">Principal &emsp;</label>
																<label class="col-form-label fw-bold fs-3">10557.50</label>&emsp;
																<label class="col-form-label fw-bold fs-3">Interest &emsp;</label>
																<label class="col-form-label fw-bold fs-3">369.51</label>
																<span class="fw-bold fs-3">&nbsp;)</span>
															</div>
															<div class="col-lg-4">
																<div class="row">
																	<label class="col-lg-6 col-form-label fw-semibold fs-6">Paper Action Charge</label>
																	<label class="col-lg-6 col-form-label fw-bold fs-5">50.00</label>
																	<label class="col-lg-6 col-form-label fw-semibold fs-6">Notice Charge</label>
																	<label class="col-lg-6 col-form-label fw-bold fs-5">50.00</label>
																	<label class="col-lg-6 col-form-label fw-semibold fs-6">Form Missing</label>
																	<div class="col-lg-6">
																		<div class="image-input image-input-outline " data-kt-image-input="true" style="background-image: url(assets/images/Document.jpg)">
																			<div class="image-input-wrapper w-50px h-50px" style="background-image: url(assets/images/Document.jpg)"></div>
																		</div>
																	</div>
																</div>
															</div>
															<div class="col-lg-4">
																<div class="row">
																	<label class="col-lg-6 col-form-label fw-semibold fs-6">On Account</label>
																	<label class="col-lg-6 col-form-label fw-bold fs-5" style="background-color:#ff5b5b;color: white;border-radius: 8px;">1000.00</label>
																	<label class="col-lg-6 col-form-label fw-semibold fs-6">Discount</label>
																	<label class="col-lg-6 col-form-label fw-bold fs-5">100.00</label>
																	<div class="col-lg-12 text-center">
																		<label class="col-form-label fw-bold fs-2">Net Pay &emsp;</label>
																		<label class="col-form-label fw-bold fs-2">11977.01</label>
																	</div>
																</div>
															</div>
															<div class="col-lg-4">
																<div class="row">
																	<label class="col-lg-6 col-form-label fw-semibold fs-6">Closed By</label>
																	<label class="col-lg-6 col-form-label fw-bold fs-5">Nominee</label>
																	<label class="col-lg-6 col-form-label fw-semibold fs-6">Name</label>
																	<label class="col-lg-6 col-form-label fw-bold fs-5">Selvam</label>
																</div>
															</div>
														</div>
							            </div>
							        </div>
							    </div>
								</div>
							</div>
							<div class="row mt-4">
								<div class="accordion" id="kt_accordion_item_redemption_view_loan_mul_jwl">
							    <div class="accordion-item">
							        <h2 class="accordion-header" id="kt_accordion_item_redemption_view_loan_mul_jwl_header_1">
							            <button class="accordion-button fw-bold fs-6 collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#kt_accordion_item_redemption_view_loan_mul_jwl_body_1" aria-expanded="false" aria-controls="kt_accordion_item_redemption_view_loan_mul_jwl_body_1">
							            New Loan Entry</button>
							        </h2>
							        <div id="kt_accordion_item_redemption_view_loan_mul_jwl_body_1" class="accordion-collapse collapse" aria-labelledby="kt_accordion_item_redemption_view_loan_mul_jwl_header_1" data-bs-parent="#kt_accordion_item_redemption_view_loan_mul_jwl">
							            <div class="accordion-body">
							            	<div class="row">
							            		<div class="col-lg-1">
							            			<label class="col-form-label fw-semibold fs-6">JewelType</label>
							            		</div>
							            		<label class="col-lg-2 col-form-label fw-bold fs-5">Gold</label>
															<label class="col-lg-1 col-form-label fw-semibold fs-6">Scheme</label>
															<label class="col-lg-2 col-form-label fw-bold fs-5">MIP</label>
															<label class="col-lg-1 col-form-label fw-semibold fs-6">Int Type</label>
															<label class="col-lg-2 col-form-label fw-bold fs-5">2.75</label>
															<div class="col-lg-3">
																<label class="col-form-label fw-semibold fs-6">Expiry Date &emsp;</label>
																<label class="col-form-label fw-bold fs-5">25-06-2023</label>
															</div>
															<label class="col-lg-12 col-form-label fw-bold fs-3 text-center">Pledge Details</label>
														</div>
														<table class="table align-middle table-hover fs-7 gy-1 gs-2" id="view_redemp_multi_jwl_pledge_info">
															<thead>
																<tr class="text-start text-muted fw-bold fs-7 gs-0">
											            <th class="min-w-100px">Pledge</th>
											            <th class="min-w-100px">Description</th>
											            <th class="min-w-50px">Quality</th>
											            <th class="min-w-50px">Purity(%)</th>
											            <th class="min-w-80px">Weight(gms)</th>
											            <th class="min-w-80px">Stone Wgt(gms)</th>
											            <th class="min-w-80px">Less(gms)</th>
											            <th class="min-w-80px">Nt Wgt(gms)</th>
											            <th class="min-w-50px">Damage</th>
											            <th class="min-w-50px">Img</th>
											            <th class="min-w-100px">Loan Amt</th>
																</tr>
															</thead>
															<tbody id="tbody">
																<tr style="background-color:red !important;">
											            <td style="pointer-events: none;" class="ple1">Ladies Ring</td>
											            <td style="pointer-events: none;" class="ple1">Ring</td>
											            <td style="pointer-events: none;">KDM</td>
											            <td style="pointer-events: none;">91</td>
											            <td style="pointer-events: none;">2.400</td>
											            <td style="pointer-events: none;">0.100</td>
											            <td style="pointer-events: none;">0.100</td>
											            <td style="pointer-events: none;">2.200</td>
											            <td style="pointer-events: none;">yes</td>
											            <td style="pointer-events: none;">
											            	<div class="image-input mt-2 me-6" data-kt-image-input="true">
																			<div class="image-input-wrapper w-40px h-40px"style="background-image: url(assets/images/sample_jewel.jpg)"></div>
																		</div>
											            </td>
											            <td style="pointer-events: none;">8234.19</td>
														    </tr>
													   		<tr>
											            <td class="ple1">Ladies Ring</td>
											            <td class="ple1">Ring</td>
											            <td>KDM</td>
											            <td>91</td>
											            <td>1.200</td>
											            <td>0.100</td>
											            <td>0.100</td>
											            <td>1.000</td>
											            <td>-</td>
											            <td></td>
											            <td>3742.81</td>
													      </tr>
													      <tr>
											            <td class="ple1">Ladies valayal</td>
											            <td class="ple1">valayal</td>
											            <td>KDM</td>
											            <td>91</td>
											            <td>2.400</td>
											            <td>0.100</td>
											            <td>0.100</td>
											            <td>2.200</td>
											            <td>yes</td>
											            <td>
											            	<div class="image-input mt-2 me-6" data-kt-image-input="true">
																			<div class="image-input-wrapper w-40px h-40px"style="background-image: url(assets/gallery/5.jpg)"></div>
																		</div>
											            </td>
											            <td>-</td>
											          </tr>
													    </tbody>
														</table><br>
														<div class="row">
															<label class="col-lg-1 col-form-label fw-semibold fs-6">Weight</label>
															<label class="col-lg-1 col-form-label fw-bold fs-6">6.000</label>
															<label class="col-lg-1 col-form-label fw-semibold fs-6">Stoneless</label>
															<label class="col-lg-1 col-form-label fw-bold fs-6">0.300</label>
															<label class="col-lg-1 col-form-label fw-semibold fs-6">Less</label>
															<label class="col-lg-1 col-form-label fw-bold fs-6">0.300</label>
															<label class="col-lg-1 col-form-label fw-semibold fs-6">Net.Wght</label>
															<label class="col-lg-1 col-form-label fw-bold fs-6">5.400</label>
															<!-- <label class="col-lg-1 col-form-label fw-semibold fs-6">CurrRate</label> --><label class="col-lg-1 col-form-label fw-semibold fs-6">CurrRate</label>
															<label class="col-lg-1 col-form-label fw-bold fs-6">4571.00</label>
															<label class="col-lg-1 col-form-label fw-semibold fs-6">Purity%</label>
															<label class="col-lg-1 col-form-label fw-bold fs-6">91</label>
														</div>
														<div class="row">
															<label class="col-lg-1 col-form-label fw-semibold fs-6">Gram.Val</label>
															<label class="col-lg-1 col-form-label fw-bold fs-6">5784.00</label>
															<label class="col-lg-1 col-form-label fw-semibold fs-6">SalesRate</label>
															<label class="col-lg-1 col-form-label fw-bold fs-6">22462.00</label>
														</div>
														<div class="row mt-4">
															<div class="col-lg-4">
																<div class="px-4" style="border-radius: 10px;padding-bottom: 10px;box-shadow: 0 5px 10px #00002947;">
																	<label class="col-lg-12 col-form-label fw-bold fs-5 text-center">Loan Payment Information</label>
																	<div class="row">
																		<label class="col-lg-6 col-form-label fw-semibold fs-6">Loan Amount</label>
																		<label class="col-lg-6 col-form-label fw-bold fs-6"style="font-size: 18px !important;font-weight: 700 !important;color: #1B439E !important;">20000.00</label>
																		<label class="col-lg-6 col-form-label fw-semibold fs-6">Monthly Interest</label>
																		<label class="col-lg-6 col-form-label fw-bold fs-5">
																			<span style="background-color:#C6C6C6;border-radius: 8px;padding: 5px 15px 5px 15px;">250.00</span>
																		</label>
																		<label class="col-lg-6 col-form-label fw-semibold fs-6">Redemption period</label>
																		<label class="col-lg-3 col-form-label fw-bold fs-6">30</label>
																		<label class="col-lg-3 col-form-label fw-semibold fs-6" id="loan_per_mon_days">Days</label>
																	</div>
																	<div class="row">
																		<div class="d-flex justify-content-center align-items-center">
																			<label class="col-form-label fw-bold fs-3">Total Loan Amount &emsp; <span>20000.00</span></label>
																		</div>
																	</div>
																</div>
															</div>
															<div class="col-lg-4">
																<div class="px-4" style="border-radius: 10px;padding-bottom: 8px;box-shadow: 0 5px 10px #00002947;">
																	<label class="col-lg-12 col-form-label fw-bold fs-5 text-center">Payment To Receive</label>
																	<div class="row">
																		<div class="col-lg-12 text-center">
																			<label class="col-form-label fw-bold fs-3">Current Loan Net Pay &emsp;</label>
																			<label class="col-form-label fw-bold fs-3">11977.01</label>
																		</div>
																		<label class="col-lg-6 col-form-label fw-semibold fs-6">Processing Charge</label>
																		<label class="col-lg-6 col-form-label fw-bold fs-6">50.00</label>
																		<label class="col-lg-6 col-form-label fw-semibold fs-6">Document Charge</label>
																		<label class="col-lg-6 col-form-label fw-bold fs-5">50.00</label>
																	</div>
																	<div class="row mt-1">
																		<label class="col-lg-12 col-form-label fw-bold fs-3 text-center">Total &emsp; <span>12077.01</span></label>
																	</div>
																</div>
															</div>
															<div class="col-lg-4">
																<div class="px-4" style="padding-bottom: 5px;border-radius: 10px;box-shadow: 0 5px 10px #00002947;">
																	<label class="col-lg-12 col-form-label fw-bold fs-5 text-center">To Pay</label>
																	<div class="row">
																		<label class="col-lg-4 col-form-label fw-bold fs-3">Net Pay</label>
																		<label class="col-lg-8 col-form-label fw-bold fs-3">7922.99</label>
																	</div>
																	<div class="row">
																		<label class="col-lg-4 col-form-label fw-semibold fs-6">Remarks</label>
																	</div>
																	<div class="row mb-17">
																		<label class="col-lg-12 col-form-label fw-bold fs-6">-</label>
																	</div>
																</div>
															</div>
														</div>
														<div class="row mt-4">
							            		<label class="col-form-label fw-bold fs-4">Payment From Company</label>
							            		<table class="table align-middle fs-7 gy-2 gs-2" id="view_redemp_multi_jwl_to_pay_frm_cmy">
																<thead>
																	<tr class="text-start text-muted fw-semibold fs-5 gs-0">
												            <th class="min-w-100px">Mode</th>
												            <th class="min-w-100px">Amount</th>
												            <th class="min-w-200px">Reference No</th>
												            <th class="min-w-200px">Company Bank</th>
												            <th class="min-w-200px">Party Bank</th>
												            <th class="min-w-200px">Details</th>
																	</tr>
																</thead>
																<tbody class="text-gray-600 fw-bold fs-4">
																	<tr>
												            <td>Cash</td>
												            <td>7922.99</td>
												            <td>-</td>
												            <td>-</td>
												            <td>-</td>
												            <td>-</td>
												        	</tr>
												        	<tr>
												            <td>Cheque</td>
												            <td>0.00</td>
												            <td>-</td>
												            <td>-</td>
												            <td>-</td>
												            <td>-</td>
												        	</tr>
												        	<tr>
												            <td>RTGS</td>
												            <td>0.00</td>
												            <td>-</td>
												            <td>-</td>
												            <td>-</td>
												            <td>-</td>
												        	</tr>
												        	<tr>
												            <td>UPI</td>
												            <td>0.00</td>
												            <td>-</td>
												            <td>-</td>
												            <td>-</td>
												            <td>-</td>
												        	</tr>
															  </tbody>
															</table>
														</div>
							            </div>
							        </div>
							    </div>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-4 text-center">
									<label class="col-form-label fw-semibold fs-6">Net Payable &emsp;</label>
									<label class="col-form-label fw-bold fs-2">7922.99</label>
								</div>
								<div class="col-lg-4 text-center">
									<label class="col-form-label fw-semibold fs-6">Paid Amount &emsp;</label>
									<label class="col-form-label fw-bold fs-2">7922.99</label>
								</div>
								<div class="col-lg-4 text-center">
									<label class="col-form-label fw-semibold fs-6">Balance Amount &emsp;</label>
									<label class="col-form-label fw-bold fs-2">0.00</label>
								</div>
							</div>
							<div class="row mt-4">
								<label class="col-lg-2 col-form-label fw-semibold fs-6">Customer Rating</label>
								<label class="col-lg-1 col-form-label fw-bold fs-5">Good</label>
								<label class="col-lg-2 col-form-label fw-semibold fs-6">Membership Points Add</label>
								<label class="col-lg-2 col-form-label fw-bold fs-5">30</label>
							</div>
						</div>
						<hr>
						<!-- Multi Jewel End -->
						</div>
						<!-- <div class="d-flex justify-content-center mt-4">
							<a href="redemption_view.php" target="_blank">
							<button class="btn btn-primary me-2">Click Here to View Redemption History</button></a>					
						</div> -->
					</div>
				</div>
				<!--end::Modal dialog-->
			</div>
		</div>
		<!--end::Modal - view party loan redemption-->

		<!--begin::Modal - view party Hand loan-->
		<div class="modal fade" id="kt_modal_view_hand_loan" tabindex="-1" aria-hidden="true">
			<div class="modal-dialog modal-xl-loan">
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
						<!--begin::Heading-->
						<div class="mb-3 text-center">
							<h1 class="mb-3">View Hand Loan</h1>
						</div>
						<div class="row mt-4">
							<div class="accordion" id="kt_accordion_item_list_party">
							    <div class="accordion-item">
							        <h2 class="accordion-header" id="kt_accordion_item_list_party_header_1">
							            <button class="accordion-button fw-bold fs-6 collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#kt_accordion_item_list_party_body_1" aria-expanded="true" aria-controls="kt_accordion_item_list_party_body_1">
							            Party Info</button>
							        </h2>
							        <div id="kt_accordion_item_list_party_body_1" class="accordion-collapse collapse show" aria-labelledby="kt_accordion_item_list_party_header_1" data-bs-parent="#kt_accordion_item_list_party">
							            <div class="accordion-body">
							            	<div class="row">
							            		<div class="col-lg-6">
							            			<div class="row">
							            				<label class="col-lg-12 col-form-label fw-bold fs-6" name="" id="">
																		<i class="fa fa-user fs-6" aria-hidden="true" title="Last Name"></i>&emsp;Abilash Kannan</label>
																	<label class="col-lg-12 col-form-label fw-bold fs-6" name="" id="">
																		<i class="fa-solid fa-location-dot fs-6" aria-hidden="true" title="Address"></i>
																	 12,Roja Street,Sayalkudi &nbsp; <span><i class="fas fa-info-circle fs-6" title="12,Roja Street,Sayalkudi"></i></span></label>
																	<label class="col-lg-6 col-form-label fw-bold fs-6" name="" id="">
																		<i class="fas fa-mobile-android-alt fs-6" aria-hidden="true" title="Mobile"></i>
																		&emsp;9895969895</label>
																	<label class="col-lg-2 col-form-label fw-semibold fs-6">Rating</label>
																	<label class="col-lg-4 col-form-label fw-bold fs-6">
																		<span><i class="fa-solid fa-star fs-6" style="color:#50cd89;"></i></span>&nbsp;Good</label>
																	<label class="col-lg-12 col-form-label fw-semibold fs-6">Nominee &nbsp;
																		<span class="fw-bold fs-6">Selvam-Brother-9852636352
																		&nbsp; <span><i class="fas fa-info-circle fs-6" title="Kumar - Brother - 9795963214"></i></span></span></label>
																	<label class="col-lg-2 col-form-label fw-semibold fs-6">Company</label>
																	<label class="col-lg-10 col-form-label fw-bold fs-6">AGB - MAIN BRANCH SAYALKUDI</label>
							            			</div>
							            		</div>
							            		<div class="col-lg-6">
							            			<div class="row">
																	<div class="col-lg-4 fv-row">
																		<div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url(assets/images/Party.jpg)">
																			<div class="image-input-wrapper"  style="background-image: url(assets/images/Party.jpg)"></div>
																		</div>
																	</div>
																	<div class="col-lg-4 fv-row">
																		<div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url(assets/images/Party_Proof.jpg)">
																			<div class="image-input-wrapper"  style="background-image: url(assets/images/Party_Proof.jpg)"></div>
																		</div>
																	</div>
																	<div class="col-lg-4 fv-row">
																		<div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url(assets/images/Signature.jpg)">
																			<div class="image-input-wrapper"  style="background-image: url(assets/images/Signature.jpg)"></div>
																		</div>
																	</div>
																	<label class="col-lg-2 col-form-label fw-semibold fs-6 mt-4">Date</label>
																	<label class="col-lg-4 col-form-label fw-bold fs-6 mt-4">26-03-2023</label>
																	<div class="col-lg-6">
																		<label class="col-form-label fw-bold fs-2 mt-4">H/L Balance</label>&emsp;
																		<label class="col-form-label fw-bold fs-2 mt-4">3000.00</label>
																	</div>
																</div>
							            		</div>
														</div>
							            </div>
							        </div>
							    </div>
							</div>
						</div>
						<div class="row mt-4">
							<div class="accordion" id="kt_accordion_item_list_hand_loan">
							    <div class="accordion-item">
							        <h2 class="accordion-header" id="kt_accordion_item_list_hand_loan_header_1">
							            <button class="accordion-button fw-bold fs-6 collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#kt_accordion_item_list_hand_loan_body_1" aria-expanded="true" aria-controls="kt_accordion_item_list_hand_loan_body_1">
							            Hand Loan</button>
							        </h2>
							        <div id="kt_accordion_item_list_hand_loan_body_1" class="accordion-collapse collapse show" aria-labelledby="kt_accordion_item_list_hand_loan_header_1" data-bs-parent="#kt_accordion_item_list_hand_loan">
							            <div class="accordion-body">
							            	<div class="row">
							            		<div class="col-lg-4">
							            			<label class="col-form-label fw-bold fs-4">H/L Amount</label>&emsp;
							            			<label class="col-form-label fw-bold fs-4">1000.00</label>&emsp;
							            		</div>
							            	</div>
							            	<div class="row">
							            		<label class="col-form-label fw-bold fs-4 text-center">Payment From Company</label>
							            		<table class="table align-middle fs-7 gy-2 gs-2" id="view_redemp_hand_ln_to_pay_frm_cmy">
																<thead>
																	<tr class="text-start text-muted fw-semibold fs-5 gs-0">
												            <th class="min-w-100px">Mode</th>
												            <th class="min-w-100px">Amount</th>
												            <th class="min-w-200px">Reference No</th>
												            <th class="min-w-200px">Company Bank</th>
												            <th class="min-w-200px">Party Bank</th>
												            <th class="min-w-200px">Details</th>
																	</tr>
																</thead>
																<tbody class="text-gray-600 fw-bold fs-4">
																	<tr>
												            <td>Cash</td>
												            <td>1000.00</td>
												            <td>-</td>
												            <td>-</td>
												            <td>-</td>
												            <td>-</td>
												        	</tr>
												        	<tr>
												            <td>Cheque</td>
												            <td>0.00</td>
												            <td>-</td>
												            <td>-</td>
												            <td>-</td>
												            <td>-</td>
												        	</tr>
												        	<tr>
												            <td>RTGS</td>
												            <td>0.00</td>
												            <td>-</td>
												            <td>-</td>
												            <td>-</td>
												            <td>-</td>
												        	</tr>
												        	<tr>
												            <td>UPI</td>
												            <td>0.00</td>
												            <td>-</td>
												            <td>-</td>
												            <td>-</td>
												            <td>-</td>
												        	</tr>
															  </tbody>
															</table>
														</div>
														<!-- <div class="row mt-4">
															<div class="col-lg-6 text-center">
																<label class="col-form-label fw-bold fs-3">Paid Amount &emsp;</label>
																<label class="col-form-label fw-bold fs-3">9730.00</label>
															</div>
															<div class="col-lg-6 text-center">
																<label class="col-form-label fw-bold fs-3">Balance Amount &emsp;</label>
																<label class="col-form-label fw-bold fs-3">0.00</label>
															</div>
														</div> -->
							            </div>
							        </div>
							    </div>
							</div>
						</div>
						<div class="row mt-4">
							<div class="accordion" id="kt_accordion_item_list_receive">
							    <div class="accordion-item">
							        <h2 class="accordion-header" id="kt_accordion_item_list_receive_header_1">
							            <button class="accordion-button fw-bold fs-6 collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#kt_accordion_item_list_receive_body_1" aria-expanded="true" aria-controls="kt_accordion_item_list_receive_body_1">
							            On Account</button>
							        </h2>
							        <div id="kt_accordion_item_list_receive_body_1" class="accordion-collapse collapse show" aria-labelledby="kt_accordion_item_list_receive_header_1" data-bs-parent="#kt_accordion_item_list_receive">
							            <div class="accordion-body">
							            	<div class="row">
															<label class="col-lg-1 col-form-label fw-bold fs-4">On A/c</label>
															<label class="col-lg-2 col-form-label fw-bold fs-4">1000.00</label>
														</div>
														<div class="row">
															<label class="col-form-label fw-bold fs-4 text-center">Party Payment Details</label>
															<table class="table align-middle fs-7 gy-2 gs-2" id="view_redemp_hand_ln_pyt_receive_frm_party">
																<thead>
																	<tr class="text-start text-muted fw-semibold fs-5 gs-0">
												            <th class="min-w-150px">Mode</th>
												            <th class="min-w-150px">Amount</th>
												            <th class="min-w-200px">Party Bank/Ref No/<br>Avai.Points/Chit ID</th>
												            <th class="min-w-200px">Company Bank/Ref No/<br>Redm.Points/Redm.Amt</th>
												            <th class="min-w-250px">Details</th>
																	</tr>
																</thead>
																<tbody class="text-gray-600 fw-bold fs-4">
																	<tr>
												            <td>Cash</td>
												            <td>1000.00</td>
												            <td>-</td>
												            <td>-</td>
												            <td>-</td>
												        	</tr>
												        	<tr>
												            <td>Cheque</td>
												            <td>0.00</td>
												            <td>-</td>
												            <td>-</td>
												            <td>-</td>
												        	</tr>
												        	<tr>
												            <td>RTGS</td>
												            <td>0.00</td>
												            <td>-</td>
												            <td>-</td>
												            <td>-</td>
												        	</tr>
												        	<tr>
												            <td>UPI</td>
												            <td>0.00</td>
												            <td>-</td>
												            <td>-</td>
												            <td>-</td>
												        	</tr>
												        	<tr>
												            <td>Mem.Card No</td>
												            <td>-</td>
												            <td>-</td>
												            <td>-</td>
												            <td>-</td>
												        	</tr>
												        	<tr>
												            <td>Scheme</td>
												            <td>-</td>
												            <td>-</td>
												            <td>-</td>
												            <td>-</td>
												        	</tr>
															  </tbody>
															</table>
														</div>
														<!-- <div class="row mt-4">
															<div class="col-lg-6 text-center">
																<label class="col-form-label fw-bold fs-3">Paid Amount &emsp;</label>
																<label class="col-form-label fw-bold fs-3">590.00</label>
															</div>
															<div class="col-lg-6 text-center">
																<label class="col-form-label fw-bold fs-3">Balance Amount &emsp;</label>
																<label class="col-form-label fw-bold fs-3">0.00</label>
															</div>
														</div> -->
							            </div>
							        </div>
							    </div>
							</div>
						</div>
					</div>
				</div>
				<!--end::Modal dialog-->
			</div>
		</div>
		<!--end::Modal - view party Hand loan-->

		<!--begin::Modal - view sales receipt-->
		<div class="modal fade" id="kt_modal_view_sales_receipt" tabindex="-1" aria-hidden="true">
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
						<div class="mb-3 text-center">
							<h1 class="mb-3">Payment History</h1>
						</div>
						<!--end::Heading-->
						<!--end::Heading-->	
						<div class="row">
							<label class="col-lg-1 col-form-label fw-semibold fs-6">Date</label>
							<label class="col-lg-2 col-form-label fw-bold fs-5">25-03-2023</label>
							<label class="col-lg-1 col-form-label fw-semibold fs-6">Company</label>
							<label class="col-lg-5 col-form-label fw-bold fs-5">AGB - MAIN BRANCH AYYANAR GOLD BANKERS SKD</label>
							<label class="col-lg-1 col-form-label fw-semibold fs-6">Bill ID</label>
							<label class="col-lg-2 col-form-label fw-bold fs-5">SL-0027/23</label>
						</div>
						<div class="row">
							<label class="col-lg-1 col-form-label fw-semibold fs-6">Party</label>
							<label class="col-lg-6 col-form-label fw-bold fs-5">Abilash Kannan</label>
						</div>
						<table class="table align-middle fs-7 gy-2 gs-2" id="view_sales_recpt_pyt_receive_frm_party">
							<thead>
								<tr class="text-start text-muted fw-semibold fs-5 gs-0">
			            <th class="min-w-150px">Mode</th>
			            <th class="min-w-150px">Amount</th>
			            <th class="min-w-200px">Party Bank/Ref No/<br>Avai.Points/Chit ID</th>
			            <th class="min-w-200px">Company Bank/Ref No/<br>Redm.Points/Redm.Amt</th>
			            <th class="min-w-250px">Details</th>
								</tr>
							</thead>
							<tbody class="text-gray-600 fw-bold fs-4">
								<tr>
			            <td>Cash</td>
			            <td>1000.00</td>
			            <td>-</td>
			            <td>-</td>
			            <td>-</td>
			        	</tr>
			        	<tr>
			            <td>Cheque</td>
			            <td>1000.00</td>
			            <td>SBI</td>
			            <td>584546</td>
			            <td>-</td>
			        	</tr>
			        	<tr>
			            <td>RTGS</td>
			            <td>5000.00</td>
			            <td>565641</td>
			            <td>IOB</td>
			            <td>-</td>
			        	</tr>
			        	<tr>
			            <td>UPI</td>
			            <td>5000.00</td>
			            <td>551541556</td>
			            <td>IOB</td>
			            <td>-</td>
			        	</tr>
			        	<tr>
			            <td>Mem.Card No</td>
			            <td>-</td>
			            <td>-</td>
			            <td>-</td>
			            <td>-</td>
			        	</tr>
			        	<tr>
			            <td>Scheme</td>
			            <td>-</td>
			            <td>-</td>
			            <td>-</td>
			            <td>-</td>
			        	</tr>
						  </tbody>
						</table>
						</div>	
						<!--end::Modal body-->
					</div>
					<!--end::Modal content-->
				</div>
				<!--end::Modal dialog-->
			</div>
			<!--end::Modal - kt_modal_verify_membership_card_receiptt-->
		</div>
		<!--end::Modal - view sales receipt-->

		<?php $this->load->view("script");?>
		<input type="hidden" id="baseurl" value="<?php echo base_url();?>">
		<!-- <script src="js/products-list.js"></script> -->
		<!-- tagged list approved day fillter start -->
		
		<script>
		
	var title = $('title').text() + ' | ' + 'Party View';
    $(document).attr("title", title);

		</script>
		<script>
			$("#view_sales_recpt_pyt_receive_frm_party").DataTable({
				//"aaSorting":[],
				"sorting":false,
				"paging": false,
				// "responsive": true,
				 "language": {
				  "lengthMenu": "Show _MENU_",
				 },
				 "dom":
				  "<'row'" +
				  // "<'col-sm-6 d-flex align-items-center justify-conten-start'l>" +
				  ">" +

				  "<'table-responsive'tr>" +

				  "<'row'" +
				  // "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
				  // "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
				  ">"
				});
			// $('#view_sales_recpt_pyt_receive_frm_party').wrap('<div class="dataTables_scroll" />');
		</script>
		<script>
			$("#view_ln_dels_pyt_receive_frm_party").DataTable({
				//"aaSorting":[],
				"sorting":false,
				"paging": false,
				// "responsive": true,
				 "language": {
				  "lengthMenu": "Show _MENU_",
				 },
				 "dom":
				  "<'row'" +
				  // "<'col-sm-6 d-flex align-items-center justify-conten-start'l>" +
				  ">" +

				  "<'table-responsive'tr>" +

				  "<'row'" +
				  // "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
				  // "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
				  ">"
				});
			// $('#view_ln_dels_pyt_receive_frm_party').wrap('<div class="dataTables_scroll" />');
		</script>
		<script>
			function date_fill_tagged_approved()
			{
				var dt_fill_tagged_approved = document.getElementById('dt_fill_tagged_approved').value;
				var today_dt_tagged_approved = document.getElementById('today_dt_tagged_approved');
				var week_from_dt_tagged_approved = document.getElementById('week_from_dt_tagged_approved');
				var week_to_dt_tagged_approved = document.getElementById('week_to_dt_tagged_approved');
				var monthly_dt_tagged_approved = document.getElementById('monthly_dt_tagged_approved');
				var from_dt_tagged_approved = document.getElementById('from_dt_tagged_approved');
				var to_dt_tagged_approved = document.getElementById('to_dt_tagged_approved');
				var from_date_fillter_tagged_approved = document.getElementById('from_date_fillter_tagged_approved');
				var to_date_fillter_tagged_approved = document.getElementById('to_date_fillter_tagged_approved');

				if (dt_fill_tagged_approved == "today") 
				{
					today_dt_tagged_approved.style.display = "block";
					monthly_dt_tagged_approved.style.display = "none";
					from_dt_tagged_approved.style.display = "none";
					to_dt_tagged_approved.style.display = "none";
					week_from_dt_tagged_approved.style.display = "none";
					week_to_dt_tagged_approved.style.display = "none";
					$("#today_date_fillter_tagged_approved").flatpickr({
								dateFormat: "d-m-Y",
							});
				}
				else if (dt_fill_tagged_approved == "week")
				{
					today_dt_tagged_approved.style.display = "none";
					week_from_dt_tagged_approved.style.display = "block";
					week_to_dt_tagged_approved.style.display = "block";
					monthly_dt_tagged_approved.style.display = "none";
					from_dt_tagged_approved.style.display = "none";
					to_dt_tagged_approved.style.display = "none";

					var curr = new Date; // get current date
					var first = curr.getDate() - curr.getDay(); // First day is the day of the month - the day of the week
					var last = first + 6; // last day is the first day + 6

					var firstday = new Date(curr.setDate(first)).toISOString().slice(0,10);
					firstday = firstday.split("-").reverse().join("-");
					var lastday = new Date(curr.setDate(last)).toISOString().slice(0,10);
					lastday = lastday.split("-").reverse().join("-");
					$('#week_from_date_fillter_tagged_approved').val(firstday);
					$('#week_to_date_fillter_tagged_approved').val(lastday);
					
				}
				else if (dt_fill_tagged_approved == "monthly")
				{
					today_dt_tagged_approved.style.display = "none";
					monthly_dt_tagged_approved.style.display = "block";
					from_dt_tagged_approved.style.display = "none";
					to_dt_tagged_approved.style.display = "none";
					week_from_dt_tagged_approved.style.display = "none";
					week_to_dt_tagged_approved.style.display = "none";
					$("#monthly_date_fillter_tagged_approved").flatpickr({
								dateFormat: "m-Y",
							});
				}
				else if (dt_fill_tagged_approved == "custom Date")
				{
					today_dt_tagged_approved.style.display = "none";
					monthly_dt_tagged_approved.style.display = "none";
					from_dt_tagged_approved.style.display = "block";
					to_dt_tagged_approved.style.display = "block";
					week_from_dt_tagged_approved.style.display = "none";
					week_to_dt_tagged_approved.style.display = "none";

					$("#from_date_fillter_tagged_approved").flatpickr({
								dateFormat: "d-m-Y",
							});
					$("#to_date_fillter_tagged_approved").flatpickr({
								dateFormat: "d-m-Y",
							});
				}
				else
				{
					today_dt_tagged_approved.style.display = "none";
					monthly_dt_tagged_approved.style.display = "none";
					from_dt_tagged_approved.style.display = "none";
					to_dt_tagged_approved.style.display = "none";
					week_from_dt_tagged_approved.style.display = "none";
					week_to_dt_tagged_approved.style.display = "none";
				}
			}
		</script>
		<!-- tagged list approved day fillter end -->

		<!-- tagged list waiting approved day fillter start -->
		<script>
			function date_fill_tagged_waiting_approved()
			{
				var dt_fill_tagged_waiting_approved = document.getElementById('dt_fill_tagged_waiting_approved').value;
				var today_dt_tagged_waiting_approved = document.getElementById('today_dt_tagged_waiting_approved');
				var week_from_dt_tagged_waiting_approved = document.getElementById('week_from_dt_tagged_waiting_approved');
				var week_to_dt_tagged_waiting_approved = document.getElementById('week_to_dt_tagged_waiting_approved');
				var monthly_dt_tagged_waiting_approved = document.getElementById('monthly_dt_tagged_waiting_approved');
				var from_dt_tagged_waiting_approved = document.getElementById('from_dt_tagged_waiting_approved');
				var to_dt_tagged_waiting_approved = document.getElementById('to_dt_tagged_waiting_approved');
				var from_date_fillter_tagged_waiting_approved = document.getElementById('from_date_fillter_tagged_waiting_approved');
				var to_date_fillter_tagged_waiting_approved = document.getElementById('to_date_fillter_tagged_waiting_approved');

				if (dt_fill_tagged_waiting_approved == "today") 
				{
					today_dt_tagged_waiting_approved.style.display = "block";
					monthly_dt_tagged_waiting_approved.style.display = "none";
					from_dt_tagged_waiting_approved.style.display = "none";
					to_dt_tagged_waiting_approved.style.display = "none";
					week_from_dt_tagged_waiting_approved.style.display = "none";
					week_to_dt_tagged_waiting_approved.style.display = "none";
					$("#today_date_fillter_tagged_waiting_approved").flatpickr({
								dateFormat: "d-m-Y",
							});
				}
				else if (dt_fill_tagged_waiting_approved == "week")
				{
					today_dt_tagged_waiting_approved.style.display = "none";
					week_from_dt_tagged_waiting_approved.style.display = "block";
					week_to_dt_tagged_waiting_approved.style.display = "block";
					monthly_dt_tagged_waiting_approved.style.display = "none";
					from_dt_tagged_waiting_approved.style.display = "none";
					to_dt_tagged_waiting_approved.style.display = "none";

					var curr = new Date; // get current date
					var first = curr.getDate() - curr.getDay(); // First day is the day of the month - the day of the week
					var last = first + 6; // last day is the first day + 6

					var firstday = new Date(curr.setDate(first)).toISOString().slice(0,10);
					firstday = firstday.split("-").reverse().join("-");
					var lastday = new Date(curr.setDate(last)).toISOString().slice(0,10);
					lastday = lastday.split("-").reverse().join("-");
					$('#week_from_date_fillter_tagged_waiting_approved').val(firstday);
					$('#week_to_date_fillter_tagged_waiting_approved').val(lastday);
					
				}
				else if (dt_fill_tagged_waiting_approved == "monthly")
				{
					today_dt_tagged_waiting_approved.style.display = "none";
					monthly_dt_tagged_waiting_approved.style.display = "block";
					from_dt_tagged_waiting_approved.style.display = "none";
					to_dt_tagged_waiting_approved.style.display = "none";
					week_from_dt_tagged_waiting_approved.style.display = "none";
					week_to_dt_tagged_waiting_approved.style.display = "none";
					$("#monthly_date_fillter_tagged_waiting_approved").flatpickr({
								dateFormat: "m-Y",
							});
				}
				else if (dt_fill_tagged_waiting_approved == "custom Date")
				{
					today_dt_tagged_waiting_approved.style.display = "none";
					monthly_dt_tagged_waiting_approved.style.display = "none";
					from_dt_tagged_waiting_approved.style.display = "block";
					to_dt_tagged_waiting_approved.style.display = "block";
					week_from_dt_tagged_waiting_approved.style.display = "none";
					week_to_dt_tagged_waiting_approved.style.display = "none";

					$("#from_date_fillter_tagged_waiting_approved").flatpickr({
								dateFormat: "d-m-Y",
							});
					$("#to_date_fillter_tagged_waiting_approved").flatpickr({
								dateFormat: "d-m-Y",
							});
				}
				else
				{
					today_dt_tagged_waiting_approved.style.display = "none";
					monthly_dt_tagged_waiting_approved.style.display = "none";
					from_dt_tagged_waiting_approved.style.display = "none";
					to_dt_tagged_waiting_approved.style.display = "none";
					week_from_dt_tagged_waiting_approved.style.display = "none";
					week_to_dt_tagged_waiting_approved.style.display = "none";
				}
			}
		</script>
		<!-- tagged list waiting approved day fillter end -->
		<script>
			      $("#kt_datatable_responsive_approved").kendoTooltip({
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
			      $("#kt_datatable_responsive_not_approved").kendoTooltip({
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
			      $("#party_hand_loan").kendoTooltip({
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
			      $("#party_mri_loan_redemption").kendoTooltip({
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
			      $("#party_mri_loan_receipts").kendoTooltip({
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
			      $("#party_mri_loan").kendoTooltip({
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
			      $("#nominee_table").kendoTooltip({
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
			      $("#kt_datatable_karuppati_view_table").kendoTooltip({
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
			      $("#kt_datatable_karuppati_view_payment_table").kendoTooltip({
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
			      $("#bank_acc_table").kendoTooltip({
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
			      $("#karuppati_list_lable").kendoTooltip({
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
			      $("#party_loan").kendoTooltip({
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
			      $("#party_loan_receipts").kendoTooltip({
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
			      $("#party_loan_redemption").kendoTooltip({
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
			      $("#sales_table").kendoTooltip({
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
			      $("#sales_receipts_table").kendoTooltip({
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
			      $("#sales_order_table").kendoTooltip({
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
			      $("#sales_return_table").kendoTooltip({
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
			      $("#view_redemp_cus_sale_witness").kendoTooltip({
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
					$("#view_redemp_hand_ln_pyt_receive_frm_party").DataTable({
						//"aaSorting":[],
						"sorting":false,
						// "paging": false,
						// "responsive": true,
						 "language": {
						  "lengthMenu": "Show _MENU_",
						 },
						 "dom":
						  "<'row'" +
						  // "<'col-sm-6 d-flex align-items-center justify-conten-start'l>" +
				  		// "<'col-sm-6 d-flex align-items-center justify-content-end'f>" +
						  ">" +

						  "<'table-responsive'tr>" +

						  "<'row'" +
						  // "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
						  // "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
						  ">"
						});
					// $('#view_redemp_hand_ln_pyt_receive_frm_party').wrap('<div class="dataTables_scroll" />');
				</script>
	   		<script>
					$("#view_redemp_hand_ln_to_pay_frm_cmy").DataTable({
						//"aaSorting":[],
						"sorting":false,
						// "paging": false,
						// "responsive": true,
						 "language": {
						  "lengthMenu": "Show _MENU_",
						 },
						 "dom":
						  "<'row'" +
						  // "<'col-sm-6 d-flex align-items-center justify-conten-start'l>" +
				  		// "<'col-sm-6 d-flex align-items-center justify-content-end'f>" +
						  ">" +

						  "<'table-responsive'tr>" +

						  "<'row'" +
						  // "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
						  // "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
						  ">"
						});
					// $('#view_redemp_hand_ln_to_pay_frm_cmy').wrap('<div class="dataTables_scroll" />');
				</script>
	   		<script>
					$("#view_redemp_multi_jwl_to_pay_frm_cmy").DataTable({
						//"aaSorting":[],
						"sorting":false,
						// "paging": false,
						// "responsive": true,
						 "language": {
						  "lengthMenu": "Show _MENU_",
						 },
						 "dom":
						  "<'row'" +
						  // "<'col-sm-6 d-flex align-items-center justify-conten-start'l>" +
				  		// "<'col-sm-6 d-flex align-items-center justify-content-end'f>" +
						  ">" +

						  "<'table-responsive'tr>" +

						  "<'row'" +
						  // "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
						  // "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
						  ">"
						});
					// $('#view_redemp_multi_jwl_to_pay_frm_cmy').wrap('<div class="dataTables_scroll" />');
				</script>
	   		<script>
					$("#view_redemp_multi_jwl_pledge_info").DataTable({
						//"aaSorting":[],
						"sorting":false,
						// "paging": false,
						// "responsive": true,
						 "language": {
						  "lengthMenu": "Show _MENU_",
						 },
						 "dom":
						  "<'row'" +
						  // "<'col-sm-6 d-flex align-items-center justify-conten-start'l>" +
				  		// "<'col-sm-6 d-flex align-items-center justify-content-end'f>" +
						  ">" +

						  "<'table-responsive'tr>" +

						  "<'row'" +
						  "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
						  // "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
						  ">"
						});
					$('#view_redemp_multi_jwl_pledge_info').wrap('<div class="dataTables_scroll" />');
				</script>
	   		<script>
					$("#view_redemp_cus_sale_to_pay_frm_cmy").DataTable({
						//"aaSorting":[],
						"sorting":false,
						// "paging": false,
						// "responsive": true,
						 "language": {
						  "lengthMenu": "Show _MENU_",
						 },
						 "dom":
						  "<'row'" +
						  // "<'col-sm-6 d-flex align-items-center justify-conten-start'l>" +
				  		// "<'col-sm-6 d-flex align-items-center justify-content-end'f>" +
						  ">" +

						  "<'table-responsive'tr>" +

						  "<'row'" +
						  // "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
						  // "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
						  ">"
						});
					// $('#view_redemp_cus_sale_to_pay_frm_cmy').wrap('<div class="dataTables_scroll" />');
				</script>
	   		<script>
				$("#view_redemp_cus_sale_witness").DataTable({
					//"aaSorting":[],
					"sorting":false,
					"paging": false,
					// "responsive": true,
					 "language": {
					  "lengthMenu": "Show _MENU_",
					 },
					 "dom":
					  "<'row'" +
					  // "<'col-sm-6 d-flex align-items-center justify-conten-start'l>" +
					  ">" +

					  "<'table-responsive'tr>" +

					  "<'row'" +
					  // "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
					  // "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
					  ">"
					});
					// $('#view_redemp_cus_sale_witness').wrap('<div class="dataTables_scroll" />');
			</script>
	   		<script>
					$("#view_redemp_cus_trans_to_pay_frm_cmy").DataTable({
						//"aaSorting":[],
						"sorting":false,
						// "paging": false,
						// "responsive": true,
						 "language": {
						  "lengthMenu": "Show _MENU_",
						 },
						 "dom":
						  "<'row'" +
						  // "<'col-sm-6 d-flex align-items-center justify-conten-start'l>" +
				  		// "<'col-sm-6 d-flex align-items-center justify-content-end'f>" +
						  ">" +

						  "<'table-responsive'tr>" +

						  "<'row'" +
						  // "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
						  // "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
						  ">"
						});
					// $('#view_redemp_cus_trans_to_pay_frm_cmy').wrap('<div class="dataTables_scroll" />');
				</script>
	   		<script>
					$("#view_redemp_cus_trans_pyt_receive_frm_party").DataTable({
						//"aaSorting":[],
						"sorting":false,
						// "paging": false,
						// "responsive": true,
						 "language": {
						  "lengthMenu": "Show _MENU_",
						 },
						 "dom":
						  "<'row'" +
						  // "<'col-sm-6 d-flex align-items-center justify-conten-start'l>" +
				  		// "<'col-sm-6 d-flex align-items-center justify-content-end'f>" +
						  ">" +

						  "<'table-responsive'tr>" +

						  "<'row'" +
						  // "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
						  // "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
						  ">"
						});
					// $('#view_redemp_cus_trans_pyt_receive_frm_party').wrap('<div class="dataTables_scroll" />');
				</script>
	   		<script>
					$("#view_redemp_cus_close_pyt_receive_frm_party").DataTable({
						//"aaSorting":[],
						"sorting":false,
						// "paging": false,
						// "responsive": true,
						 "language": {
						  "lengthMenu": "Show _MENU_",
						 },
						 "dom":
						  "<'row'" +
						  // "<'col-sm-6 d-flex align-items-center justify-conten-start'l>" +
				  		// "<'col-sm-6 d-flex align-items-center justify-content-end'f>" +
						  ">" +

						  "<'table-responsive'tr>" +

						  "<'row'" +
						  // "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
						  // "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
						  ">"
						});
					// $('#view_redemp_cus_close_pyt_receive_frm_party').wrap('<div class="dataTables_scroll" />');
				</script>
	   		<script>
					$("#redemp_pledge_info").DataTable({
						//"aaSorting":[],
						"sorting":false,
						// "paging": false,
						// "responsive": true,
						 "language": {
						  "lengthMenu": "Show _MENU_",
						 },
						 "dom":
						  "<'row'" +
						  // "<'col-sm-6 d-flex align-items-center justify-conten-start'l>" +
				  		// "<'col-sm-6 d-flex align-items-center justify-content-end'f>" +
						  ">" +

						  "<'table-responsive'tr>" +

						  "<'row'" +
						  "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
						  // "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
						  ">"
						});
					$('#redemp_pledge_info').wrap('<div class="dataTables_scroll" />');
				</script>
	   		<script>
					$("#kt_datatable_karuppati_view_table").DataTable({
						//"aaSorting":[],
						"sorting":false,
						// "paging": false,
						// "responsive": true,
						 "language": {
						  "lengthMenu": "Show _MENU_",
						 },
						 "dom":
						  "<'row'" +
						  // "<'col-sm-6 d-flex align-items-center justify-conten-start'l>" +
				  		// "<'col-sm-6 d-flex align-items-center justify-content-end'f>" +
						  ">" +

						  "<'table-responsive'tr>" +

						  "<'row'" +
						  "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
						  // "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
						  ">"
						});
					$('#kt_datatable_karuppati_view_table').wrap('<div class="dataTables_scroll" />');
				</script>
				<script>
					$("#kt_datatable_karuppati_view_payment_table").DataTable({
						//"aaSorting":[],
						"sorting":false,
						// "paging": false,
						// "responsive": true,
						 "language": {
						  "lengthMenu": "Show _MENU_",
						 },
						 "dom":
						  "<'row'" +
						  // "<'col-sm-6 d-flex align-items-center justify-conten-start'l>" +
				  		// "<'col-sm-6 d-flex align-items-center justify-content-end'f>" +
						  ">" +

						  "<'table-responsive'tr>" +

						  "<'row'" +
						  // "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
						  // "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
						  ">"
						});
					 $('#kt_datatable_karuppati_view_payment_table').wrap('<div class="dataTables_scroll" />');
				</script>
				<script>
					$("#sales_table").DataTable({
						//"aaSorting":[],
						"sorting":false,
						// "paging": false,
						// "responsive": true,
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
					// $('#sales_table').wrap('<div class="dataTables_scroll" />');
				</script>
				<script>
					$("#sales_order_table").DataTable({
						//"aaSorting":[],
						"sorting":false,
						// "paging": false,
						// "responsive": true,
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
					// $('#sales_order_table').wrap('<div class="dataTables_scroll" />');
				</script>
				<script>
					$("#sales_receipts_table").DataTable({
						//"aaSorting":[],
						"sorting":false,
						// "paging": false,
						// "responsive": true,
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
					// $('#sales_receipts_table').wrap('<div class="dataTables_scroll" />');
				</script>
				<script>
					$("#sales_return_table").DataTable({
						//"aaSorting":[],
						"sorting":false,
						// "paging": false,
						// "responsive": true,
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
					// $('#sales_return_table').wrap('<div class="dataTables_scroll" />');
				</script>
				<script>
					$("#party_hand_loan").DataTable({
						//"aaSorting":[],
						"sorting":false,
						// "paging": false,
						// "responsive": true,
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
					// $('#party_hand_loan').wrap('<div class="dataTables_scroll" />');
				</script>
				<script>
					$("#party_mri_loan_redemption").DataTable({
						//"aaSorting":[],
						"sorting":false,
						// "paging": false,
						// "responsive": true,
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
					// $('#party_mri_loan_redemption').wrap('<div class="dataTables_scroll" />');
				</script>
				<script>
					$("#party_mri_loan_receipts").DataTable({
						//"aaSorting":[],
						"sorting":false,
						// "paging": false,
						// "responsive": true,
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
					// $('#party_mri_loan_receipts').wrap('<div class="dataTables_scroll" />');
				</script>
				<script>
					$("#party_mri_loan").DataTable({
						//"aaSorting":[],
						"sorting":false,
						// "paging": false,
						// "responsive": true,
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
					// $('#party_mri_loan').wrap('<div class="dataTables_scroll" />');
				</script>
				<script>
					$("#party_loan_redemption").DataTable({
						//"aaSorting":[],
						"sorting":false,
						// "paging": false,
						// "responsive": true,
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
					// $('#party_loan_redemption').wrap('<div class="dataTables_scroll" />');
				</script>
	   		<script>
					$("#karuppati_list_lable").DataTable({
						//"aaSorting":[],
						"sorting":false,
						// "paging": false,
						// "responsive": true,
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
					// $('#karuppati_list_lable').wrap('<div class="dataTables_scroll" />');
				</script>
	   		<script>
					$("#party_loan").DataTable({
						//"aaSorting":[],
						"sorting":false,
						// "paging": false,
						// "responsive": true,
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
					// $('#party_loan').wrap('<div class="dataTables_scroll" />');
				</script>
				<script>
					$("#party_loan_receipts").DataTable({
						//"aaSorting":[],
						"sorting":false,
						// "paging": false,
						// "responsive": true,
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
					// $('#party_loan_receipts').wrap('<div class="dataTables_scroll" />');
				</script>
	   		<script>
					$("#nominee_table").DataTable({
						//"aaSorting":[],
						"sorting":false,
						"paging": false,
						// "responsive": true,
						 "language": {
						  "lengthMenu": "Show _MENU_",
						 },
						 "dom":
						  "<'row'" +
						  // "<'col-sm-6 d-flex align-items-center justify-conten-start'l>" +
						  ">" +

						  "<'table-responsive'tr>" +

						  "<'row'" +
						  "<'col-sm-12 col-md-12 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
						  // "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
						  ">"
						});
					$('#nominee_table').wrap('<div class="dataTables_scroll_nomiee_bank" />');
				</script>
				<script>
					$("#bank_acc_table").DataTable({
						//"aaSorting":[],
						"sorting":false,
						"paging": false,
						// "responsive": true,
						 "language": {
						  "lengthMenu": "Show _MENU_",
						 },
						 "dom":
						  "<'row'" +
						  // "<'col-sm-6 d-flex align-items-center justify-conten-start'l>" +
						  ">" +

						  "<'table-responsive'tr>" +

						  "<'row'" +
						  "<'col-sm-12 col-md-12 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
						  // "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
						  ">"
						});
					$('#bank_acc_table').wrap('<div class="dataTables_scroll_nomiee_bank" />');
				</script>
		<script>
			$("#add_tagentry_date").flatpickr({
				dateFormat: "d-m-Y",});
		</script>
		<script>
			$("#add_tagentry_table").DataTable({
				//"aaSorting":[],
				"sorting":false,
				"paging": false,
				// "responsive": true,
				 "language": {
				  "lengthMenu": "Show _MENU_",
				 },
				 "dom":
				  "<'row'" +
				  "<'col-sm-6 d-flex align-items-center justify-conten-start'l>" +
				  ">" +

				  "<'table-responsive'tr>" +

				  "<'row'" +
				  "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
				  "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
				  ">"
				});
			$('#add_tagentry_table').wrap('<div class="dataTables_scroll" />');
		</script>
		<!-- tagged day fillter start -->
		<script>
			function date_fill()
			{
				var dt_fill = document.getElementById('dt_fill').value;
				var today_dt = document.getElementById('today_dt');
				var week_from_dt = document.getElementById('week_from_dt');
				var week_to_dt = document.getElementById('week_to_dt');
				var monthly_dt = document.getElementById('monthly_dt');
				var from_dt = document.getElementById('from_dt');
				var to_dt = document.getElementById('to_dt');
				var from_date_fillter = document.getElementById('from_date_fillter');
				var to_date_fillter = document.getElementById('to_date_fillter');

				if (dt_fill == "today") 
				{
					today_dt.style.display = "block";
					monthly_dt.style.display = "none";
					from_dt.style.display = "none";
					to_dt.style.display = "none";
					week_from_dt.style.display = "none";
					week_to_dt.style.display = "none";
					$("#today_date_fillter").flatpickr({
								dateFormat: "d-m-Y",
							});
				}
				else if (dt_fill == "week")
				{
					today_dt.style.display = "none";
					week_from_dt.style.display = "block";
					week_to_dt.style.display = "block";
					monthly_dt.style.display = "none";
					from_dt.style.display = "none";
					to_dt.style.display = "none";

					var curr = new Date; // get current date
					var first = curr.getDate() - curr.getDay(); // First day is the day of the month - the day of the week
					var last = first + 6; // last day is the first day + 6

					var firstday = new Date(curr.setDate(first)).toISOString().slice(0,10);
					firstday = firstday.split("-").reverse().join("-");
					var lastday = new Date(curr.setDate(last)).toISOString().slice(0,10);
					lastday = lastday.split("-").reverse().join("-");
					$('#week_from_date_fillter').val(firstday);
					$('#week_to_date_fillter').val(lastday);
					
				}
				else if (dt_fill == "monthly")
				{
					today_dt.style.display = "none";
					monthly_dt.style.display = "block";
					from_dt.style.display = "none";
					to_dt.style.display = "none";
					week_from_dt.style.display = "none";
					week_to_dt.style.display = "none";
					$("#monthly_date_fillter").flatpickr({
								dateFormat: "m-Y",
							});
				}
				else if (dt_fill == "custom Date")
				{
					today_dt.style.display = "none";
					monthly_dt.style.display = "none";
					from_dt.style.display = "block";
					to_dt.style.display = "block";
					week_from_dt.style.display = "none";
					week_to_dt.style.display = "none";

					$("#from_date_fillter").flatpickr({
								dateFormat: "d-m-Y",
							});
					$("#to_date_fillter").flatpickr({
								dateFormat: "d-m-Y",
							});
				}
				else
				{
					today_dt.style.display = "none";
					monthly_dt.style.display = "none";
					from_dt.style.display = "none";
					to_dt.style.display = "none";
					week_from_dt.style.display = "none";
					week_to_dt.style.display = "none";
				}
			}
		</script>
		<!-- tagged day fillter end -->
		<!-- waiting tagged day fillter start -->
		<script>
			function date_fill_wait()
			{
				var dt_fill_wait = document.getElementById('dt_fill_wait').value;
				var today_dt_wait = document.getElementById('today_dt_wait');
				var week_from_dt_wait = document.getElementById('week_from_dt_wait');
				var week_to_dt_wait = document.getElementById('week_to_dt_wait');
				var monthly_dt_wait = document.getElementById('monthly_dt_wait');
				var from_dt_wait = document.getElementById('from_dt_wait');
				var to_dt_wait = document.getElementById('to_dt_wait');
				var from_date_fillter_wait = document.getElementById('from_date_fillter_wait');
				var to_date_fillter_wait = document.getElementById('to_date_fillter_wait');

				if (dt_fill_wait == "today") 
				{
					today_dt_wait.style.display = "block";
					monthly_dt_wait.style.display = "none";
					from_dt_wait.style.display = "none";
					to_dt_wait.style.display = "none";
					week_from_dt_wait.style.display = "none";
					week_to_dt_wait.style.display = "none";
					$("#today_date_fillter_wait").flatpickr({
								dateFormat: "d-m-Y",
							});
				}
				else if (dt_fill_wait == "week")
				{
					today_dt_wait.style.display = "none";
					week_from_dt_wait.style.display = "block";
					week_to_dt_wait.style.display = "block";
					monthly_dt_wait.style.display = "none";
					from_dt_wait.style.display = "none";
					to_dt_wait.style.display = "none";

					var curr = new Date; // get current date
					var first = curr.getDate() - curr.getDay(); // First day is the day of the month - the day of the week
					var last = first + 6; // last day is the first day + 6

					var firstday = new Date(curr.setDate(first)).toISOString().slice(0,10);
					firstday = firstday.split("-").reverse().join("-");
					var lastday = new Date(curr.setDate(last)).toISOString().slice(0,10);
					lastday = lastday.split("-").reverse().join("-");
					$('#week_from_date_fillter_wait').val(firstday);
					$('#week_to_date_fillter_wait').val(lastday);
					
				}
				else if (dt_fill_wait == "monthly")
				{
					today_dt_wait.style.display = "none";
					monthly_dt_wait.style.display = "block";
					from_dt_wait.style.display = "none";
					to_dt_wait.style.display = "none";
					week_from_dt_wait.style.display = "none";
					week_to_dt_wait.style.display = "none";
					$("#monthly_date_fillter_wait").flatpickr({
								dateFormat: "m-Y",
							});
				}
				else if (dt_fill_wait == "custom Date")
				{
					today_dt_wait.style.display = "none";
					monthly_dt_wait.style.display = "none";
					from_dt_wait.style.display = "block";
					to_dt_wait.style.display = "block";
					week_from_dt_wait.style.display = "none";
					week_to_dt_wait.style.display = "none";

					$("#from_date_fillter_wait").flatpickr({
								dateFormat: "d-m-Y",
							});
					$("#to_date_fillter_wait").flatpickr({
								dateFormat: "d-m-Y",
							});
				}
				else
				{
					today_dt_wait.style.display = "none";
					monthly_dt_wait.style.display = "none";
					from_dt_wait.style.display = "none";
					to_dt_wait.style.display = "none";
					week_from_dt_wait.style.display = "none";
					week_to_dt_wait.style.display = "none";
				}
			}
		</script>
		<!-- waiting tagged day fillter end -->
		<script>
			
			// $("#from_date_fillter").flatpickr({
			// 					dateFormat: "d-m-Y",
			// 				});
			// $("#to_date_fillter").flatpickr({
			// 					dateFormat: "d-m-Y",
			// 				});



				$("#kt_daterangepicker_lot_entry_from").flatpickr({
								dateFormat: "d-m-Y",
							});
				$("#kt_daterangepicker_lot_entry_to").flatpickr({
								dateFormat: "d-m-Y",
							});
				$("#kt_daterangepicker_lot_entry_add_date").flatpickr({
								dateFormat: "d-m-Y",
							});
				$("#kt_daterangepicker_lot_entry_edit_date").flatpickr({
								dateFormat: "d-m-Y",
							});
				$("#kt_daterangepicker_lot_entry_view_date").flatpickr({
								dateFormat: "d-m-Y",
							});

			$("#kt_datatable_responsive_approved").DataTable({
				
				"responsive": true,
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

				$("#kt_datatable_responsive_not_approved").DataTable({
				
				"responsive": true,
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

				$("#kt_daterangepicker_lot_entry_from").flatpickr({
								dateFormat: "d-m-Y",
							});
				$("#kt_daterangepicker_lot_entry_to").flatpickr({
								dateFormat: "d-m-Y",
							});
				$("#kt_daterangepicker_lot_entry_add_date").flatpickr({
								dateFormat: "d-m-Y",
							});
				$("#kt_daterangepicker_lot_entry_edit_date").flatpickr({
								dateFormat: "d-m-Y",
							});
				$("#kt_daterangepicker_lot_entry_view_date").flatpickr({
								dateFormat: "d-m-Y",
							});

			$("#kt_datatable_responsive").DataTable({
				
				"responsive": true,
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
		<!-- Membership Script -->
		<script>
		function date_fill_nontag_wallet_history() {
			var dt_fill_nontag_wallet_history = document.getElementById('dt_fill_nontag_wallet_history').value;
			var today_dt_nontag_wallet_history = document.getElementById('today_dt_nontag_wallet_history');
			var week_from_dt_nontag_wallet_history = document.getElementById('week_from_dt_nontag_wallet_history');
			var week_to_dt_nontag_wallet_history = document.getElementById('week_to_dt_nontag_wallet_history');
			var monthly_dt_nontag_wallet_history = document.getElementById('monthly_dt_nontag_wallet_history');
			var from_dt_nontag_wallet_history = document.getElementById('from_dt_nontag_wallet_history');
			var to_dt_nontag_wallet_history = document.getElementById('to_dt_nontag_wallet_history');
			var from_date_fillter_nontag_wallet_history = document.getElementById('from_date_fillter_nontag_wallet_history');
			var to_date_fillter_nontag_wallet_history = document.getElementById('to_date_fillter_nontag_wallet_history');

			if (dt_fill_nontag_wallet_history == "today") {
				today_dt_nontag_wallet_history.style.display = "block";
				monthly_dt_nontag_wallet_history.style.display = "none";
				from_dt_nontag_wallet_history.style.display = "none";
				to_dt_nontag_wallet_history.style.display = "none";
				week_from_dt_nontag_wallet_history.style.display = "none";
				week_to_dt_nontag_wallet_history.style.display = "none";
				$("#today_date_fillter_nontag_wallet_history").flatpickr({
					dateFormat: "d-m-Y",
				});
			}
			else if (dt_fill_nontag_wallet_history == "week") {
				today_dt_nontag_wallet_history.style.display = "none";
				week_from_dt_nontag_wallet_history.style.display = "block";
				week_to_dt_nontag_wallet_history.style.display = "block";
				monthly_dt_nontag_wallet_history.style.display = "none";
				from_dt_nontag_wallet_history.style.display = "none";
				to_dt_nontag_wallet_history.style.display = "none";

				var curr = new Date; // get current date
				var first = curr.getDate() - curr.getDay(); // First day is the day of the month - the day of the week
				var last = first + 6; // last day is the first day + 6

				var firstday = new Date(curr.setDate(first)).toISOString().slice(0, 10);
				firstday = firstday.split("-").reverse().join("-");
				var lastday = new Date(curr.setDate(last)).toISOString().slice(0, 10);
				lastday = lastday.split("-").reverse().join("-");
				$('#week_from_date_fillter_nontag_wallet_history').val(firstday);
				$('#week_to_date_fillter_nontag_wallet_history').val(lastday);

			}
			else if (dt_fill_nontag_wallet_history == "monthly") {
				today_dt_nontag_wallet_history.style.display = "none";
				monthly_dt_nontag_wallet_history.style.display = "block";
				from_dt_nontag_wallet_history.style.display = "none";
				to_dt_nontag_wallet_history.style.display = "none";
				week_from_dt_nontag_wallet_history.style.display = "none";
				week_to_dt_nontag_wallet_history.style.display = "none";
				$("#monthly_date_fillter_nontag_wallet_history").flatpickr({
					dateFormat: "m-Y",
				});
			}
			else if (dt_fill_nontag_wallet_history == "custom Date") {
				today_dt_nontag_wallet_history.style.display = "none";
				monthly_dt_nontag_wallet_history.style.display = "none";
				from_dt_nontag_wallet_history.style.display = "block";
				to_dt_nontag_wallet_history.style.display = "block";
				week_from_dt_nontag_wallet_history.style.display = "none";
				week_to_dt_nontag_wallet_history.style.display = "none";

				$("#from_date_fillter_nontag_wallet_history").flatpickr({
					dateFormat: "d-m-Y",
				});
				$("#to_date_fillter_nontag_wallet_history").flatpickr({
					dateFormat: "d-m-Y",
				});
			}
			else {
				today_dt_nontag_wallet_history.style.display = "none";
				monthly_dt_nontag_wallet_history.style.display = "none";
				from_dt_nontag_wallet_history.style.display = "none";
				to_dt_nontag_wallet_history.style.display = "none";
				week_from_dt_nontag_wallet_history.style.display = "none";
				week_to_dt_nontag_wallet_history.style.display = "none";
			}
		}
	</script>
	<!-- non tag wallet history day fillter end -->
	<script>
		$("#kt_datatable_audit_tagged_entry").kendoTooltip({
			filter: "td",
			show: function (e) {
				if (this.content.text() != "") {
					$('[role="tooltip"]').css("visibility", "visible");
				}
			},
			hide: function () {
				$('[role="tooltip"]').css("visibility", "hidden");
			},
			content: function (e) {
				var element = e.target[0];
				if (element.offsetWidth < element.scrollWidth) {
					return e.target.text();
				} else {
					return "";
				}
			}
		});
		$("#kt_datatable_audit_tagged_entry_scanned").kendoTooltip({
			filter: "td",
			show: function (e) {
				if (this.content.text() != "") {
					$('[role="tooltip"]').css("visibility", "visible");
				}
			},
			hide: function () {
				$('[role="tooltip"]').css("visibility", "hidden");
			},
			content: function (e) {
				var element = e.target[0];
				if (element.offsetWidth < element.scrollWidth) {
					return e.target.text();
				} else {
					return "";
				}
			}
		});
	</script>

	<script>
		$("#kt_datatable_audit_tagged_entry").DataTable({
			"aaSorting": [],
			// "sorting":false,
			// "paging": false,
			// "responsive": true,
			"iDisplayLength": "25",
			"language": {
				"lengthMenu": "Show _MENU_",
			},
			"dom":
				"<'row'" +
				// "<'col-sm-6 d-flex align-items-center justify-conten-start'l>" +
				// "<'col-sm-6 d-flex align-items-center justify-content-end'f>" +
				">" +

				"<'table-responsive'tr>" +

				"<'row'" +
				"<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
				// "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
				">"
		});
		$('#kt_datatable_audit_tagged_entry').wrap('<div class="dataTables_scroll" />');

		$("#kt_datatable_audit_tagged_entry_scanned").DataTable({
			"aaSorting": [],
			// "sorting":false,
			// "paging": false,
			// "responsive": true,
			"iDisplayLength": "25",
			"language": {
				"lengthMenu": "Show _MENU_",
			},
			"dom":
				"<'row'" +
				// "<'col-sm-6 d-flex align-items-center justify-conten-start'l>" +
				// "<'col-sm-6 d-flex align-items-center justify-content-end'f>" +
				">" +

				"<'table-responsive'tr>" +

				"<'row'" +
				"<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
				// "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
				">"
		});
		$('#kt_datatable_audit_tagged_entry_scanned').wrap('<div class="dataTables_scroll" />');
	</script>
	<script>
		$("#kt_datatable_rating_history").DataTable({
			"aaSorting": [],
			// "sorting":false,
			// "paging": false,
			// "responsive": true,
			"iDisplayLength": "25",
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
			// $('#view_nontag_wallet_table').wrap('<div class="dataTables_scroll" />');
	</script>

	<script>
		$("#kt_datatable_membership_history").DataTable({
			"aaSorting": [],
			// "sorting":false,
			// "paging": false,
			// "responsive": true,
			"iDisplayLength": "25",
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
			// $('#view_nontag_wallet_table').wrap('<div class="dataTables_scroll" />');
	</script>
	<!-- Chit Transaction Script -->
	<script>
			$("#view_salesentry_table").DataTable({
				//"aaSorting":[],
				"sorting":false,
				"paging": false,
				// "responsive": true,
				 "language": {
				  "lengthMenu": "Show _MENU_",
				 },
				 "dom":
				  "<'row'" +
				  "<'col-sm-6 d-flex align-items-center justify-conten-start'l>" +
				  ">" +

				  "<'table-responsive'tr>" +

				  "<'row'" +
				  "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
				  "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
				  ">"
				});
			$('#view_salesentry_table').wrap('<div class="dataTables_scroll" />');
		</script>
		<script>
			$("#view_oldjewel_entry_table").DataTable({
				//"aaSorting":[],
				"sorting":false,
				"paging": false,
				// "responsive": true,
				 "language": {
				  "lengthMenu": "Show _MENU_",
				 },
				 "dom":
				  "<'row'" +
				  "<'col-sm-6 d-flex align-items-center justify-conten-start'l>" +
				  ">" +

				  "<'table-responsive'tr>" +

				  "<'row'" +
				  "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
				  "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
				  ">"
				});
			$('#view_oldjewel_entry_table').wrap('<div class="dataTables_scroll" />');
		</script>

		<script>
			$("#view_puregold_entry_table").DataTable({
				//"aaSorting":[],
				"sorting":false,
				"paging": false,
				// "responsive": true,
				 "language": {
				  "lengthMenu": "Show _MENU_",
				 },
				 "dom":
				  "<'row'" +
				  "<'col-sm-6 d-flex align-items-center justify-conten-start'l>" +
				  ">" +

				  "<'table-responsive'tr>" +

				  "<'row'" +
				  "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
				  "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
				  ">"
				});
			$('#view_puregold_entry_table').wrap('<div class="dataTables_scroll" />');
		</script>
		<!-- Sales list day fillter start -->
		<script>
			function date_fill_sales_list()
			{
				var dt_fill_sales_list = document.getElementById('dt_fill_sales_list').value;
				var today_dt_sales_list = document.getElementById('today_dt_sales_list');
				var week_from_dt_sales_list = document.getElementById('week_from_dt_sales_list');
				var week_to_dt_sales_list = document.getElementById('week_to_dt_sales_list');
				var monthly_dt_sales_list = document.getElementById('monthly_dt_sales_list');
				var from_dt_sales_list = document.getElementById('from_dt_sales_list');
				var to_dt_sales_list = document.getElementById('to_dt_sales_list');
				var from_date_fillter_sales_list = document.getElementById('from_date_fillter_sales_list');
				var to_date_fillter_sales_list = document.getElementById('to_date_fillter_sales_list');

				if (dt_fill_sales_list == "today") 
				{
					today_dt_sales_list.style.display = "block";
					monthly_dt_sales_list.style.display = "none";
					from_dt_sales_list.style.display = "none";
					to_dt_sales_list.style.display = "none";
					week_from_dt_sales_list.style.display = "none";
					week_to_dt_sales_list.style.display = "none";
					$("#today_date_fillter_sales_list").flatpickr({
								dateFormat: "d-m-Y",
							});
				}
				else if (dt_fill_sales_list == "week")
				{
					today_dt_sales_list.style.display = "none";
					week_from_dt_sales_list.style.display = "block";
					week_to_dt_sales_list.style.display = "block";
					monthly_dt_sales_list.style.display = "none";
					from_dt_sales_list.style.display = "none";
					to_dt_sales_list.style.display = "none";

					var curr = new Date; // get current date
					var first = curr.getDate() - curr.getDay(); // First day is the day of the month - the day of the week
					
					var last = first + 6; // last day is the first day + 6

					var firstday = new Date(curr.setDate(first)).toISOString().slice(0,10);
					firstday = firstday.split("-").reverse().join("-");
					var lastday = new Date(curr.setDate(last)).toISOString().slice(0,10);
					lastday = lastday.split("-").reverse().join("-");
					$('#week_from_date_fillter_sales_list').val(firstday);
					$('#week_to_date_fillter_sales_list').val(lastday);
					
				}
				else if (dt_fill_sales_list == "monthly")
				{
					today_dt_sales_list.style.display = "none";
					monthly_dt_sales_list.style.display = "block";
					from_dt_sales_list.style.display = "none";
					to_dt_sales_list.style.display = "none";
					week_from_dt_sales_list.style.display = "none";
					week_to_dt_sales_list.style.display = "none";
					$("#monthly_date_fillter_sales_list").flatpickr({
								dateFormat: "m-Y",
							});
				}
				else if (dt_fill_sales_list == "custom Date")
				{
					today_dt_sales_list.style.display = "none";
					monthly_dt_sales_list.style.display = "none";
					from_dt_sales_list.style.display = "block";
					to_dt_sales_list.style.display = "block";
					week_from_dt_sales_list.style.display = "none";
					week_to_dt_sales_list.style.display = "none";

					$("#from_date_fillter_sales_list").flatpickr({
								dateFormat: "d-m-Y",
							});
					$("#to_date_fillter_sales_list").flatpickr({
								dateFormat: "d-m-Y",
							});
				}
				else
				{
					today_dt_sales_list.style.display = "none";
					monthly_dt_sales_list.style.display = "none";
					from_dt_sales_list.style.display = "none";
					to_dt_sales_list.style.display = "none";
					week_from_dt_sales_list.style.display = "none";
					week_to_dt_sales_list.style.display = "none";
				}
			}
		</script>
		<!-- Sales list day fillter end -->
		<script>
			function itm_ty()
			{
				var item_type = document.getElementById("item_type").value;

				var lot_gold = document.getElementById("lot_gold");
				var lot_silver = document.getElementById("lot_silver");
				if (item_type == "") 
				{
					lot_gold.style.display = "none";
					lot_silver.style.display = "none";
				}
				else if (item_type == "gold") 
				{
					lot_gold.style.display = "block";
					lot_silver.style.display = "none";
				}
				else
				{
					lot_gold.style.display = "none";
					lot_silver.style.display = "block";
				}

			};
			function itm_ty_edit()
			{
				var item_type_edit = document.getElementById("item_type_edit").value;

				var lot_gold_edit = document.getElementById("lot_gold_edit");
				var lot_silver_edit = document.getElementById("lot_silver_edit");
				if (item_type_edit == "") 
				{
					lot_gold_edit.style.display = "none";
					lot_silver_edit.style.display = "none";
				}
				else if (item_type_edit == "gold") 
				{
					lot_gold_edit.style.display = "block";
					lot_silver_edit.style.display = "none";
				}
				else
				{
					lot_gold_edit.style.display = "none";
					lot_silver_edit.style.display = "block";
				}

			};
			function itm_ty_view()
			{
				var item_type_view = document.getElementById("item_type_view").value;

				var lot_gold_view = document.getElementById("lot_gold_view");
				var lot_silver_view = document.getElementById("lot_silver_view");
				if (item_type_view == "") 
				{
					lot_gold_view.style.display = "none";
					lot_silver_view.style.display = "none";
				}
				else if (item_type_view == "gold") 
				{
					lot_gold_view.style.display = "block";
					lot_silver_view.style.display = "none";
				}
				else
				{
					lot_gold_view.style.display = "none";
					lot_silver_view.style.display = "block";
				}

			};
		</script>
		<script>
			function cash_lt_ey_radio()
			{
				var cash_lot_entry_radio = document.getElementById("cash_lot_entry_radio");

				var cash_lt_ey_label = document.getElementById("cash_lt_ey_label");
				var cash_lt_ey_tbox = document.getElementById("cash_lt_ey_tbox");

				if (cash_lot_entry_radio.checked == true)
				{
				    cash_lt_ey_label.style.display = "block";
				    cash_lt_ey_tbox.style.display = "block";
			  	} else 
			  	{
			  		cash_lt_ey_label.style.display = "none";
				    cash_lt_ey_tbox.style.display = "none";
			  	}
			};

			function cheque_lt_ey_radio()
			{
				var cheque_lot_entry_radio = document.getElementById("cheque_lot_entry_radio");

				var cheque_lt_ey_label = document.getElementById("cheque_lt_ey_label");
				var cheque_lt_ey_tbox = document.getElementById("cheque_lt_ey_tbox");

				if (cheque_lot_entry_radio.checked == true)
				{
				    cheque_lt_ey_label.style.display = "block";
				    cheque_lt_ey_tbox.style.display = "block";
			  	} else 
			  	{
			     	cheque_lt_ey_label.style.display = "none";
			     	cheque_lt_ey_tbox.style.display = "none";
			  	}
			};

			function rtgs_lt_ey_radio()
			{
				var rtgs_lot_entry_radio = document.getElementById("rtgs_lot_entry_radio");

				var rtgs_lt_ey_label = document.getElementById("rtgs_lt_ey_label");
				var rtgs_lt_ey_tbox = document.getElementById("rtgs_lt_ey_tbox");
				var bank_lt_ey_label = document.getElementById("bank_lt_ey_label");
				var bank_lt_ey_tbox = document.getElementById("bank_lt_ey_tbox");

				if (rtgs_lot_entry_radio.checked == true)
				{
				    rtgs_lt_ey_label.style.display = "block";
				    rtgs_lt_ey_tbox.style.display = "block";
				    bank_lt_ey_label.style.display = "block";
				    bank_lt_ey_tbox.style.display = "block";
			  	} else 
			  	{
			     	rtgs_lt_ey_label.style.display = "none";
			     	rtgs_lt_ey_tbox.style.display = "none";
			     	bank_lt_ey_label.style.display = "none";
			     	bank_lt_ey_tbox.style.display = "none";
			  	}
			};

			function metal_lt_ey_radio()
			{
				var metal_lot_entry_radio = document.getElementById("metal_lot_entry_radio");

				var metal_lt_ey_label = document.getElementById("metal_lt_ey_label");
				var metal_lt_ey_tbox = document.getElementById("metal_lt_ey_tbox");
				var purity_lt_ey_label = document.getElementById("purity_lt_ey_label");
				var purity_lt_ey_tbox = document.getElementById("purity_lt_ey_tbox");
				var rate_lt_ey_label = document.getElementById("rate_lt_ey_label");
				var rate_lt_ey_tbox = document.getElementById("rate_lt_ey_tbox");
				var mtamt_lt_ey_label = document.getElementById("mtamt_lt_ey_label");
				var mtamt_lt_ey_tbox = document.getElementById("mtamt_lt_ey_tbox");

				if (metal_lot_entry_radio.checked == true)
				{
				    metal_lt_ey_label.style.display = "block";
			     	metal_lt_ey_tbox.style.display = "block";
			     	purity_lt_ey_label.style.display = "block";
			     	purity_lt_ey_tbox.style.display = "block";

			     	rate_lt_ey_label.style.display = "block";
			     	rate_lt_ey_tbox.style.display = "block";
			     	mtamt_lt_ey_label.style.display = "block";
			     	mtamt_lt_ey_tbox.style.display = "block";
			  	} else 
			  	{
			     	metal_lt_ey_label.style.display = "none";
			     	metal_lt_ey_tbox.style.display = "none";
			     	purity_lt_ey_label.style.display = "none";
			     	purity_lt_ey_tbox.style.display = "none";

			     	rate_lt_ey_label.style.display = "none";
			     	rate_lt_ey_tbox.style.display = "none";
			     	mtamt_lt_ey_label.style.display = "none";
			     	mtamt_lt_ey_tbox.style.display = "none";
			  	}
			};
		</script>
		<script>
			function cash_lt_ey_radio_edit()
			{
				var cash_lot_entry_radio_edit = document.getElementById("cash_lot_entry_radio_edit");

				var cash_lt_ey_label_edit = document.getElementById("cash_lt_ey_label_edit");
				var cash_lt_ey_tbox_edit = document.getElementById("cash_lt_ey_tbox_edit");

				if (cash_lot_entry_radio_edit.checked == true)
				{
				    cash_lt_ey_label_edit.style.display = "block";
				    cash_lt_ey_tbox_edit.style.display = "block";
			  	} else 
			  	{
			  		cash_lt_ey_label_edit.style.display = "none";
				    cash_lt_ey_tbox_edit.style.display = "none";
			  	}
			};

			function cheque_lt_ey_radio_edit()
			{
				var cheque_lot_entry_radio_edit = document.getElementById("cheque_lot_entry_radio_edit");

				var cheque_lt_ey_label_edit = document.getElementById("cheque_lt_ey_label_edit");
				var cheque_lt_ey_tbox_edit = document.getElementById("cheque_lt_ey_tbox_edit");

				if (cheque_lot_entry_radio_edit.checked == true)
				{
				    cheque_lt_ey_label_edit.style.display = "block";
				    cheque_lt_ey_tbox_edit.style.display = "block";
			  	} else 
			  	{
			     	cheque_lt_ey_label_edit.style.display = "none";
			     	cheque_lt_ey_tbox_edit.style.display = "none";
			  	}
			};

			function rtgs_lt_ey_radio_edit()
			{
				var rtgs_lot_entry_radio_edit = document.getElementById("rtgs_lot_entry_radio_edit");

				var rtgs_lt_ey_label_edit = document.getElementById("rtgs_lt_ey_label_edit");
				var rtgs_lt_ey_tbox_edit = document.getElementById("rtgs_lt_ey_tbox_edit");
				var bank_lt_ey_label_edit = document.getElementById("bank_lt_ey_label_edit");
				var bank_lt_ey_tbox_edit = document.getElementById("bank_lt_ey_tbox_edit");

				if (rtgs_lot_entry_radio_edit.checked == true)
				{
				    rtgs_lt_ey_label_edit.style.display = "block";
				    rtgs_lt_ey_tbox_edit.style.display = "block";
				    bank_lt_ey_label_edit.style.display = "block";
				    bank_lt_ey_tbox_edit.style.display = "block";
			  	} else 
			  	{
			     	rtgs_lt_ey_label_edit.style.display = "none";
			     	rtgs_lt_ey_tbox_edit.style.display = "none";
			     	bank_lt_ey_label_edit.style.display = "none";
			     	bank_lt_ey_tbox_edit.style.display = "none";
			  	}
			};

			function metal_lt_ey_radio_edit()
			{
				var metal_lot_entry_radio_edit = document.getElementById("metal_lot_entry_radio_edit");

				var metal_lt_ey_label_edit = document.getElementById("metal_lt_ey_label_edit");
				var metal_lt_ey_tbox_edit = document.getElementById("metal_lt_ey_tbox_edit");
				var purity_lt_ey_label_edit = document.getElementById("purity_lt_ey_label_edit");
				var purity_lt_ey_tbox_edit = document.getElementById("purity_lt_ey_tbox_edit");
				var rate_lt_ey_label_edit = document.getElementById("rate_lt_ey_label_edit");
				var rate_lt_ey_tbox_edit = document.getElementById("rate_lt_ey_tbox_edit");
				var mtamt_lt_ey_label_edit = document.getElementById("mtamt_lt_ey_label_edit");
				var mtamt_lt_ey_tbox_edit = document.getElementById("mtamt_lt_ey_tbox_edit");

				if (metal_lot_entry_radio_edit.checked == true)
				{
				    metal_lt_ey_label_edit.style.display = "block";
			     	metal_lt_ey_tbox_edit.style.display = "block";
			     	purity_lt_ey_label_edit.style.display = "block";
			     	purity_lt_ey_tbox_edit.style.display = "block";

			     	rate_lt_ey_label_edit.style.display = "block";
			     	rate_lt_ey_tbox_edit.style.display = "block";
			     	mtamt_lt_ey_label_edit.style.display = "block";
			     	mtamt_lt_ey_tbox_edit.style.display = "block";
			  	} else 
			  	{
			     	metal_lt_ey_label_edit.style.display = "none";
			     	metal_lt_ey_tbox_edit.style.display = "none";
			     	purity_lt_ey_label_edit.style.display = "none";
			     	purity_lt_ey_tbox_edit.style.display = "none";

			     	rate_lt_ey_label_edit.style.display = "none";
			     	rate_lt_ey_tbox_edit.style.display = "none";
			     	mtamt_lt_ey_label_edit.style.display = "none";
			     	mtamt_lt_ey_tbox_edit.style.display = "none";
			  	}
			};
		</script>
		<script>
			function cash_lt_ey_radio_view()
			{
				var cash_lot_entry_radio_view = document.getElementById("cash_lot_entry_radio_view");

				var cash_lt_ey_label_view = document.getElementById("cash_lt_ey_label_view");
				var cash_lt_ey_tbox_view = document.getElementById("cash_lt_ey_tbox_view");

				if (cash_lot_entry_radio_view.checked == true)
				{
				    cash_lt_ey_label_view.style.display = "block";
				    cash_lt_ey_tbox_view.style.display = "block";
			  	} else 
			  	{
			  		cash_lt_ey_label_view.style.display = "none";
				    cash_lt_ey_tbox_view.style.display = "none";
			  	}
			};

			function cheque_lt_ey_radio_view()
			{
				var cheque_lot_entry_radio_view = document.getElementById("cheque_lot_entry_radio_view");

				var cheque_lt_ey_label_view = document.getElementById("cheque_lt_ey_label_view");
				var cheque_lt_ey_tbox_view = document.getElementById("cheque_lt_ey_tbox_view");

				if (cheque_lot_entry_radio_view.checked == true)
				{
				    cheque_lt_ey_label_view.style.display = "block";
				    cheque_lt_ey_tbox_view.style.display = "block";
			  	} else 
			  	{
			     	cheque_lt_ey_label_view.style.display = "none";
			     	cheque_lt_ey_tbox_view.style.display = "none";
			  	}
			};

			function rtgs_lt_ey_radio_view()
			{
				var rtgs_lot_entry_radio_view = document.getElementById("rtgs_lot_entry_radio_view");

				var rtgs_lt_ey_label_view = document.getElementById("rtgs_lt_ey_label_view");
				var rtgs_lt_ey_tbox_view = document.getElementById("rtgs_lt_ey_tbox_view");
				var bank_lt_ey_label_view = document.getElementById("bank_lt_ey_label_view");
				var bank_lt_ey_tbox_view = document.getElementById("bank_lt_ey_tbox_view");

				if (rtgs_lot_entry_radio_view.checked == true)
				{
				    rtgs_lt_ey_label_view.style.display = "block";
				    rtgs_lt_ey_tbox_view.style.display = "block";
				    bank_lt_ey_label_view.style.display = "block";
				    bank_lt_ey_tbox_view.style.display = "block";
			  	} else 
			  	{
			     	rtgs_lt_ey_label_view.style.display = "none";
			     	rtgs_lt_ey_tbox_view.style.display = "none";
			     	bank_lt_ey_label_view.style.display = "none";
			     	bank_lt_ey_tbox_view.style.display = "none";
			  	}
			};

			function metal_lt_ey_radio_view()
			{
				var metal_lot_entry_radio_view = document.getElementById("metal_lot_entry_radio_view");

				var metal_lt_ey_label_view = document.getElementById("metal_lt_ey_label_view");
				var metal_lt_ey_tbox_view = document.getElementById("metal_lt_ey_tbox_view");
				var purity_lt_ey_label_view = document.getElementById("purity_lt_ey_label_view");
				var purity_lt_ey_tbox_view = document.getElementById("purity_lt_ey_tbox_view");
				var rate_lt_ey_label_view = document.getElementById("rate_lt_ey_label_view");
				var rate_lt_ey_tbox_view = document.getElementById("rate_lt_ey_tbox_view");
				var mtamt_lt_ey_label_view = document.getElementById("mtamt_lt_ey_label_view");
				var mtamt_lt_ey_tbox_view = document.getElementById("mtamt_lt_ey_tbox_view");

				if (metal_lot_entry_radio_view.checked == true)
				{
				    metal_lt_ey_label_view.style.display = "block";
			     	metal_lt_ey_tbox_view.style.display = "block";
			     	purity_lt_ey_label_view.style.display = "block";
			     	purity_lt_ey_tbox_view.style.display = "block";

			     	rate_lt_ey_label_view.style.display = "block";
			     	rate_lt_ey_tbox_view.style.display = "block";
			     	mtamt_lt_ey_label_view.style.display = "block";
			     	mtamt_lt_ey_tbox_view.style.display = "block";
			  	} else 
			  	{
			     	metal_lt_ey_label_view.style.display = "none";
			     	metal_lt_ey_tbox_view.style.display = "none";
			     	purity_lt_ey_label_view.style.display = "none";
			     	purity_lt_ey_tbox_view.style.display = "none";

			     	rate_lt_ey_label_view.style.display = "none";
			     	rate_lt_ey_tbox_view.style.display = "none";
			     	mtamt_lt_ey_label_view.style.display = "none";
			     	mtamt_lt_ey_tbox_view.style.display = "none";
			  	}
			};
		</script>
		<script>
			$('#kt_docs_repeater_basic_silver_add').repeater({
			    initEmpty: false,

			    defaultValues: {
			        'text-input': 'foo'
			    },

			    show: function () {
			        $(this).slideDown();
			    },

			    hide: function (deleteElement) {
			        $(this).slideUp(deleteElement);
			    }
			});
			$('#kt_docs_repeater_basic_gold_add').repeater({
			    initEmpty: false,

			    defaultValues: {
			        'text-input': 'foo'
			    },

			    show: function () {
			        $(this).slideDown();
			    },

			    hide: function (deleteElement) {
			        $(this).slideUp(deleteElement);
			    }
			});
		</script>
		<script>
			$('#kt_docs_repeater_basic_silver_edit').repeater({
			    initEmpty: false,

			    defaultValues: {
			        'text-input': 'foo'
			    },

			    show: function () {
			        $(this).slideDown();
			    },

			    hide: function (deleteElement) {
			        $(this).slideUp(deleteElement);
			    }
			});
			$('#kt_docs_repeater_basic_gold_edit').repeater({
			    initEmpty: false,

			    defaultValues: {
			        'text-input': 'foo'
			    },

			    show: function () {
			        $(this).slideDown();
			    },

			    hide: function (deleteElement) {
			        $(this).slideUp(deleteElement);
			    }
			});
		</script>
		<script>
			$('#kt_docs_repeater_basic_silver_view').repeater({
			    initEmpty: false,

			    defaultValues: {
			        'text-input': 'foo'
			    },

			    show: function () {
			        $(this).slideDown();
			    },

			    hide: function (deleteElement) {
			        $(this).slideUp(deleteElement);
			    }
			});
			$('#kt_docs_repeater_basic_gold_view').repeater({
			    initEmpty: false,

			    defaultValues: {
			        'text-input': 'foo'
			    },

			    show: function () {
			        $(this).slideDown();
			    },

			    hide: function (deleteElement) {
			        $(this).slideUp(deleteElement);
			    }
			});
		</script>
		<script>

				$("#kt_daterangepicker_lot_entry_from").flatpickr({
								dateFormat: "d-m-Y",
							});
				$("#kt_daterangepicker_lot_entry_to").flatpickr({
								dateFormat: "d-m-Y",
							});
				$("#kt_daterangepicker_lot_entry_add_date").flatpickr({
								dateFormat: "d-m-Y",
							});
				$("#kt_daterangepicker_lot_entry_edit_date").flatpickr({
								dateFormat: "d-m-Y",
							});
				$("#kt_daterangepicker_lot_entry_view_date").flatpickr({
								dateFormat: "d-m-Y",
							});

			// $("#kt_datatable_responsive").DataTable({
				
			// 	"responsive": true,
			// 	"aaSorting":[],
			// 	 "language": {
			// 	  "lengthMenu": "Show _MENU_",
			// 	 },
			// 	 "dom":
			// 	  "<'row'" +
			// 	  "<'col-sm-6 d-flex align-items-center justify-conten-start'l>" +
			// 	  "<'col-sm-6 d-flex align-items-center justify-content-end'f>" +
			// 	  ">" +

			// 	  "<'table-responsive'tr>" +

			// 	  "<'row'" +
			// 	  "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
			// 	  "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
			// 	  ">"
			// 	});


		</script>
		
	</body>
	<!--end::Body-->
</html>