<?php $this->load->view("common.php") ?>


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
  /*Auto complete css start*/

		.xdsoft_autocomplete,
		.xdsoft_autocomplete div,
		.xdsoft_autocomplete span{
		/*	-moz-box-sizing: border-box !important;
			box-sizing: border-box !important;*/
		}

		.xdsoft_autocomplete{
		display:inline;
		position:relative;
		word-spacing: normal;
		text-transform: none;
		text-indent: 0px;
		text-shadow: none;
		text-align: start;
		}
		/*.xdsoft_autocomplete_dropdown
		{
			left: 0px !important;
			top: 31px !important;
			margin-left: 0px !important;
			margin-right: 0px !important;
			width: 500px !important;
			display: none !important;
			max-height: 475px !important;
		}*/

		.xdsoft_autocomplete .xdsoft_input{
			position:relative;
			z-index:2;
		}
		.xdsoft_autocomplete .xdsoft_autocomplete_dropdown{
			position:absolute;
			border: 1px solid #ccc;
			border-top-color: #d9d9d9;
			box-shadow: 0 2px 4px rgba(0,0,0,0.2);
			-webkit-box-shadow: 0 2px 4px rgba(0,0,0,0.2);
			cursor: default;
			display:none;
			z-index: 1001;
			margin-top:-1px;
			background-color:#fff;
			/*min-width:100%;*/
			width: 170px !important;
			overflow:auto;
			max-height: 300px !important;
			/*overflow-y: auto !important;
			overflow-x: auto !important;*/
			/*padding-right: 20px !important;*/
		}
		.xdsoft_autocomplete .xdsoft_autocomplete_hint{
			position:absolute;
			z-index:1;
			color:#ccc !important;
			-webkit-text-fill-color:#ccc !important;
			text-fill-color:#ccc  !important;
			overflow:hidden !important;
			white-space: pre  !important;
		}

		.xdsoft_autocomplete .xdsoft_autocomplete_hint span{
			color:transparent;
			opacity: 0.0;
		}

		.xdsoft_autocomplete .xdsoft_autocomplete_dropdown > .xdsoft_autocomplete_copyright{
			color:#ddd;
			font-size:10px;
			text-decoration:none;
			right:5px;
			position:absolute;
			margin-top:-15px;
			z-index:1002;
		}
		.xdsoft_autocomplete .xdsoft_autocomplete_dropdown > div{
			background:#fff;
			white-space: nowrap;
			cursor: pointer;
			line-height: 1.5em;
			padding: 2px 0px 2px 0px;
		}
		.xdsoft_autocomplete .xdsoft_autocomplete_dropdown > div.active{
			background: #0097CF;
			color: #FFFFFF;
		}

		/*Auto complete css end*/
</style>
	<!--begin::Body-->
	<link href="assets/jquery.autocomplete.css" rel="stylesheet" type="text/css" />
	<body data-kt-name="metronic" id="kt_body" class="header-fixed header-tablet-and-mobile-fixed toolbar-enabled toolbar-fixed aside-enabled aside-fixed">
		<!--begin::Theme mode setup on page load-->
		<script>if ( document.documentElement ) { const defaultThemeMode = "system"; const name = document.body.getAttribute("data-kt-name"); let themeMode = localStorage.getItem("kt_" + ( name !== null ? name + "_": "" ) + "theme_mode_value"); if ( themeMode === null ) { if ( defaultThemeMode === "system" ) { themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light"; } else { themeMode = defaultThemeMode; } } document.documentElement.setAttribute("data-theme", themeMode); }</script>
		<!--end::Theme mode setup on page load-->
		<!--begin::Main-->
		<!--begin::Root-->
		<div class="d-flex flex-column flex-root">
			<!--begin::Page-->
			<div class="page d-flex flex-row flex-column-fluid">
				<?php $this->load->view("sidebar.php")?>
				<!--begin::Wrapper-->
				<div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
				<?php $this->load->view("header.php")?>
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
											<span>&nbsp;-&nbsp;</span>
											<?php if (isset($party_detail->RATING)) {?>
											<span>
												<i class="fa-solid fa-star fs-3" style="
										          <?php
										          		
									          			if($party_detail->RATING ==3) echo 'color:#50cd89;';
														if($party_detail->RATING ==2) echo 'color:#ffc700;';
														if($party_detail->RATING ==1) echo 'color:red;';
														if($party_detail->RATING =='') echo 'color:#d2d4dc;';
													?>">
												</i>
											</span>&nbsp;
											<span>&nbsp;<?php echo $party_detail->NAME;?>&nbsp;<?php echo $party_detail->FATHERSNAME;?></span>
											<?php } ?>
										</label>
									</h1>
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
											<div class="card-body py-4">
											<form id="party_search_form" method="post" action="" enctype="multipart/form-data" >	
												<div class="row">												
													<label class="col-lg-1 col-form-label required fw-semibold fs-6">Type<i class="fa-solid fa-circle-info fs-7 ms-2"  title="AutoComplete Select Party Details"></i></label>
													<div class="col-lg-3">
														<select class="form-select form-select-solid" data-control="select2" data-hide-search="true" id="party_search_type" name="party_search_type" onchange="get_search_type()">	
															<!--<option value="">Select</option>-->
															<option value="1" <?php if($party_search_type=='1'){ echo 'selected'; } ?>>Party Name</option>
															<option value="2" <?php if($party_search_type=='2'){ echo 'selected'; } ?>>Phone No</option>
															<!-- <option value="3" < ?php if($party_search_type=='3'){ echo 'selected'; } ?>>Membership ID</option>
															<option value="4" < ?php if($party_search_type=='4'){ echo 'selected'; } ?>>Loan No</option> -->
														</select>
													</div>
													<input type="hidden" name="search_type_hidden" id="search_type_hidden" value="1"> 
													<!-- <label class="col-lg-1 col-form-label fw-semibold fs-6">Enter</label> -->
													<div class="col-lg-3">
														<input type="text" name="party_search" id="party_search" class="form-control form-control-lg form-control-solid" value="<?php echo $party_search; ?>" placeholder="Select Party Details">
														<input type="hidden" name="party_search_id" id="party_search_id" value="<?php if(isset($party_detail->PID)){echo $party_detail->PID; } ?>"> 
													</div>
													<div class="col-lg-1">
														<input type="button" name="party_submit" id="party_submit" class="btn btn-sm btn-outline btn-outline-solid btn-outline-warning btn-active-light-primary" value="Go" onclick="submit_form()" >
													</div>														
												</div> 
											</form>
											<div class="mb-5 hover-scroll-x mt-4">
												<div class="d-grid">
													<ul class="nav nav-tabs flex-nowrap text-nowrap" role="tablist">
														<li class="nav-item" role="presentation">
															<a class="nav-link btn btn-active-light btn-color-black-800 btn-active-color-primary rounded-bottom-0 fw-bold fs-6 active"   aria-selected="true" >Party Info</a>
														</li>
														<li class="nav-item" role="presentation">
															<a class="nav-link btn btn-active-light btn-color-black-800 btn-active-color-primary rounded-bottom-0 fw-bold fs-6"   aria-selected="false" onclick="submit_form_loan()"  style="display:none;">Loans</a>
														</li>
														<li class="nav-item" role="presentation">
															<a class="nav-link btn btn-active-light btn-color-black-800 btn-active-color-primary rounded-bottom-0 fw-bold fs-6"   aria-selected="false" onclick="submit_form_jewel()"  style="display:none;">Jewel</a>
														</li>
														<li class="nav-item" role="presentation">
															<a class="nav-link btn btn-active-light btn-color-black-800 btn-active-color-primary rounded-bottom-0 fw-bold fs-6"   aria-selected="false" onclick="submit_form_chit()" style="display:none;">Chit</a>
														</li>
														<li class="nav-item" role="presentation">
															<a class="nav-link btn btn-active-light btn-color-black-800 btn-active-color-primary rounded-bottom-0 fw-bold fs-6"   aria-selected="false" onclick="submit_form_karupatti()">Karuppati</a>
														</li>
														<li class="nav-item" role="presentation">
															<a class="nav-link btn btn-active-light btn-color-black-800 btn-active-color-primary rounded-bottom-0 fw-bold fs-6"   aria-selected="false" onclick="submit_form_realestate()">Real Estate</a>
														</li>
														<li class="nav-item">
															<a class="nav-link btn btn-active-light btn-color-black-800 btn-active-color-primary rounded-bottom-0 fw-bold fs-6"   aria-selected="false" onclick="submit_form_membership()"style="display:none;">Membership</a>
														</li>
														<li class="nav-item">
															<a class="nav-link btn btn-active-light btn-color-black-800 btn-active-color-primary rounded-bottom-0 fw-bold fs-6"   aria-selected="false" onclick="submit_form_rating_history()"style="display:none;">Rating History</a>
														</li>
													</ul>
												</div>
											</div>
												<div class="tab-content" id="myTabContent">
													<div class="tab-pane fade active show" id="kt_tab_pane_party_info" role="tabpanel">
														<div class="row mb-6">
															<span class="text-muted fw-bold fs-6" style="text-align: right !important;">Party ID: <?php if(isset($party_detail->PID)){echo $party_detail->PID; } ?></span>
															<label class="col-lg-1 col-form-label fw-semibold fs-6">Name</label>
															<label class="col-lg-3 col-form-label fw-bold fs-6" id="party_name"><?php if(isset($party_detail->NAME)){echo $party_detail->NAME; } ?></label>
															<div class="col-lg-1">
																<label class="col-form-label fw-semibold fs-6">F/O.Name</label>
															</div>
															<label class="col-lg-3 col-form-label fw-bold fs-6" id="party_fname"><?php if(isset($party_detail->FATHERSNAME)){echo $party_detail->FATHERSNAME; } ?></label>
															<label class="col-lg-1 col-form-label fw-semibold fs-6">Area</label>
															<label class="col-lg-3 col-form-label fw-bold fs-6"><?php if(isset($party_detail->AREANAME)){echo $party_detail->AREANAME; } ?></label>
															<label class="col-lg-1 col-form-label fw-semibold fs-6">City</label>
															<label class="col-lg-3 col-form-label fw-bold fs-6"><?php if(isset($party_detail->CITYNAME)){echo $party_detail->CITYNAME; } ?></label>
															<label class="col-lg-1 col-form-label fw-semibold fs-6">Village</label>
															<label class="col-lg-3 col-form-label fw-bold fs-6"><?php if(isset($party_detail->VILLAGENAME)){echo $party_detail->VILLAGENAME; } ?></label>
															<label class="col-lg-1 col-form-label fw-semibold fs-6">Street</label>
															<label class="col-lg-3 col-form-label fw-bold fs-6"><?php if(isset($party_detail->STREETNAME)){echo $party_detail->STREETNAME; } ?></label>
															<label class="col-lg-1 col-form-label fw-semibold fs-6">Mobile</label>
															<label class="col-lg-3 col-form-label fw-bold fs-6"><?php if(isset($party_detail->PHONE)){echo $party_detail->PHONE; } ?></label>
															<label class="col-lg-1 col-form-label fw-semibold fs-6">Email</label>
															<label class="col-lg-3 col-form-label fw-bold fs-6"><?php if(isset($party_detail->EMAIL)){echo $party_detail->EMAIL; } ?></label>
															<label class="col-lg-1 col-form-label fw-semibold fs-6">Aadhar</label>
															<label class="col-lg-3 col-form-label fw-bold fs-6"><?php if(isset($party_detail->AADHAAR_NO)){echo $party_detail->AADHAAR_NO; } ?></label>
															<label class="col-lg-1 col-form-label fw-semibold fs-6">ID Type</label>
															<label class="col-lg-3 col-form-label fw-bold fs-6"><?php if(isset($party_detail->ID_TYPE)){echo $party_detail->ID_TYPE; } ?></label>
															<label class="col-lg-1 col-form-label fw-semibold fs-6">ID No</label>
															<label class="col-lg-3 col-form-label fw-bold fs-6"><?php if(isset($party_detail->ID_NUMBER)){echo $party_detail->ID_NUMBER; } ?></label>
															<label class="col-lg-1 col-form-label fw-semibold fs-6">Rating</label>
															<label class="col-lg-3 col-form-label fw-bold fs-6">
															<?php 
															//print_r($party_detail);exit;
															if (isset($party_detail->RATING)) {?>
																<span>
																	<?php 
																		if($party_detail->RATING==3)
																		{
																			echo '<span><i class="fa-solid fa-star fs-3" style="color:#50cd89;"></i> </span> - GOOD';
																		}
																		else if($party_detail->RATING==2)
																		{
																			echo '<span><i class="fa-solid fa-star fs-3" style="color:#ffc700;"></i> </span> - AVERAGE';
																		}
																		else if($party_detail->RATING==1)
																		{
																			echo '<span><i class="fa-solid fa-star fs-3" style="color:red;"></i> </span> - BAD';
																		}
																		else
																		{
																			echo '<span><i class="fa-solid fa-star fs-3" style="color:#d2d4dc;"></i></span>';
																		}
																		?>
																</span>
															<?php } ?>
															</label>
														</div>
														<div class="row mb-9">
																<label class="col-lg-1 col-form-label fw-semibold fs-6">Party</label>
																<div class="col-lg-3">
																	<div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url('assets/images/Party.jpg')">
																		<?php
																		if(isset($party_detail->PARTY_IMAGE) !=""){
																			?>
																				<img class="image-input-wrapper"  src="<?php echo $party_detail->PARTY_IMAGE; ?>" height="125px" width="125px" >
																			<?php
																		}
																		else{


																		?>
																		<?php 

																			if(isset($party_detail->PHOTO)){ 

																			if($party_detail->TYPE_OF_RECORD=='N'){ 
																		?>
																			<img class="image-input-wrapper"  src="<?php echo $party_detail->PHOTO; ?>" height="125px" width="125px" >
																			<?php } else { ?>
																			<img class="image-input-wrapper"  src="data:image/jpeg;base64,<?php echo base64_encode($party_detail->PHOTO); ?>" height="125px" width="125px" >
																		<?php } }else{?>
																			<div class="image-input-wrapper w-125px h-125px" style="background-image: url('assets/images/Party.jpg')">
																			</div>
																		<?php } }?>
																	</div>
																</div>
																
																<label class="col-lg-1 col-form-label fw-semibold fs-6">Signature</label>

																<div class="col-lg-3">
																	<div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url('assets/images/Signature.jpg')">
																		<?php
																		if(isset($party_detail->SIGNATURE_IMAGE) !=""){
																			?>
																				<img class="image-input-wrapper"  src="<?php echo $party_detail->SIGNATURE_IMAGE; ?>" height="125px" width="125px" >
																			<?php
																		}
																		else{


																		?>
																		<?php
																		 		if(isset($party_detail->SIGNATURE)){ 
																				if($party_detail->TYPE_OF_RECORD=='N'){
																		?>
																		<img class="image-input-wrapper"  src="<?php echo $party_detail->SIGNATURE; ?>" height="125px" width="125px" >
																		
																		<?php } else { ?>
																		<img class="image-input-wrapper"  src="data:image/jpeg;base64,<?php echo base64_encode($party_detail->SIGNATURE); ?>" height="125px" width="125px" >
																		<?php } } else{?>
																			<div class="image-input-wrapper w-125px h-125px" style="background-image: url('assets/images/Signature.jpg')">
																			</div>
																		<?php } }?>
																	</div> 
																</div>
																<label class="col-lg-1 col-form-label fw-semibold fs-6">ID PROOF</label>
																<div class="col-lg-3">
																	<div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url('<?php echo base_url();?>assets/images/Party_Proof.jpg')">
																		<?php
																		if(isset($party_detail->IDPROOF_IMAGE) !=""){
																			?>
																				<img class="image-input-wrapper"  src="<?php echo $party_detail->IDPROOF_IMAGE; ?>" height="125px" width="125px" >
																			<?php
																		}
																		else{


																		?>
																		<?php
																			if(isset($party_detail->OTHER_PHOTO)){
																			  	if($party_detail->TYPE_OF_RECORD=='N'){
																		?>
																		<img class="image-input-wrapper"  src="<?php echo $party_detail->OTHER_PHOTO; ?>" height="125px" width="125px" >
																		
																		<?php } else { ?>
																		<img class="image-input-wrapper" src="data:image/jpeg;base64,<?php echo base64_encode($party_detail->OTHER_PHOTO); ?>" height="125px" width="125px" >
																		<?php } }else{?>
																			<div class="image-input-wrapper w-125px h-125px" style="background-image: url('assets/images/Party_Proof.jpg')">
																			</div>
																		<?php } }?>
																	</div>
																</div>
															</div>
														
														<?php 
														if(isset($party_detail->PID)){
															$nominee_details=$this->db->query("select * from NOMINEE where PID='".$party_detail->PID."'")->result_array();
														}
														else{
															$nominee_details=[];
														}
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
															if(isset($party_detail->PID)){
															$bank_details=$this->db->query("select * from party_bank_upi_details where party_id='".$party_detail->PID."'")->result_array();
															}
															else{
																$bank_details=[];
															}
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
																				<?php $i=0;
																					foreach ($bank_details as $bank_details){
																				?>
																					<tr>
																						<td><?php echo $i+1;?></td>
																						<td class="ple1"><?php echo $bank_details['payment_type']; ?></td>
																						<td class="ple1"><?php echo $bank_details['account_name']; ?></td>
																						<td class="ple1"><?php echo $bank_details['phone_account_no']; ?></td>
																						<td class="ple1"><?php echo $bank_details['account_holder_name']; ?></td>
																						<td class="ple1"><?php echo $bank_details['branch_name']; ?></td>
																						<td class="ple1"><?php echo $bank_details['ifsc_code']; ?></td>
																					</tr>
																					<?php $i++; } ?>
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
									<!--end::Card body-->
									</div>
									<!--end::Tables Widget 9-->
								</div>
								<!--end::Col-->
							</div>
							<!--end::Row-->
						</div>
						<!--end::Container-->
					<?php $this->load->view("footer.php")?>
					</div>
					<!--end::Content-->
				</div>
				<!--end::Wrapper-->
			</div>
			<!--end::Page-->
		</div>
		<!--end::Root-->
		<input type="hidden" id="baseurl" value="<?php echo base_url(); ?>">
		<?php $this->load->view("script.php")?>
		<script src="<?php echo base_url(); ?>assets/jquery.autocomplete.js"></script>
		<script>
				function get_search_type(){
					var party_search_type = $("#party_search_type").val();
					$('#search_type_hidden').val(party_search_type);	
				}
		</script>
		<script>
			// function test(){
				var party_search_type = $("#party_search_type").val();
				// if	(party_search_type=='1'){
				var baseurl = $("#baseurl").val();
				var type = $("#party_search_type").val();
				$("#party_search").autocomplete({ 
			                valueKey:'title',
			                source:[{
			                url:baseurl+'Partysearch/userList?query=%QUERY%&type='+type,
			                type:'remote',
			                ajax:{
			                  dataType : 'json',
			                }
			           		}]}).on('selected.xdsoft',function(e,suggestion,ui){ 
			                $("#party_search").val(suggestion.firstname);
							$('#party_search_id').val(suggestion.id);
					        });
						// }
				// }
			</script>
			<script>
			function submit_form(){
				$('#party_search_form').attr('action', "<?php echo base_url(); ?>Partysearch");
			            $("#party_search_form").submit();
			            e.preventDefault();
			}
			</script>
			<script>
			function submit_form_loan(){
				
			    $('#party_search_form').attr('action', "<?php echo base_url(); ?>Partysearch/loans");
			            $("#party_search_form").submit();
			            e.preventDefault();
			}
			</script>
			<script>
			function submit_form_jewel(){
				
			    $('#party_search_form').attr('action', "<?php echo base_url(); ?>Partysearch/jewel");
			            $("#party_search_form").submit();
			            e.preventDefault();
			}
			</script>
			<script>
			function submit_form_chit(){
				
			    $('#party_search_form').attr('action', "<?php echo base_url(); ?>Partysearch/chit");
			            $("#party_search_form").submit();
			            e.preventDefault();
			}
			</script>
			<script>
			function submit_form_karupatti(){
				
			    $('#party_search_form').attr('action', "<?php echo base_url(); ?>Partysearch/karupatti");
			            $("#party_search_form").submit();
			            e.preventDefault();
			}
			</script>
			<script>
			function submit_form_realestate(){
				
			    $('#party_search_form').attr('action', "<?php echo base_url(); ?>Partysearch/realestate");
			            $("#party_search_form").submit();
			            e.preventDefault();
			}
			</script>
			<script>
			function submit_form_membership(){
				
			    $('#party_search_form').attr('action', "<?php echo base_url(); ?>Partysearch/membership");
			            $("#party_search_form").submit();
			            e.preventDefault();
			}
			</script>
			<script>
			function submit_form_rating_history(){
				
			    $('#party_search_form').attr('action', "<?php echo base_url(); ?>Partysearch/rating_history");
			            $("#party_search_form").submit();
			            e.preventDefault();
			}
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
	</body>
	<!--end::Body-->
</html>