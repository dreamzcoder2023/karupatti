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

  #view_only
  {
  	background: rgba(80, 205, 137, 0.5) !important;
  	/*background-color: unset !important;
  	color: unset !important;*/
  }
  #kt_modal_view_individual_loan_party_2{

  	background-color: #0000007d !important;
  }
   #kt_modal_view_individual_loan_party_1{

  	background-color: #0000007d !important;
  }
   .error {
    border: solid 2px #f31700 !important;
	border-color:#f31700 !important;
}
</style>
	<!--begin::Body-->
	<link href="assets/jquery.autocomplete.css" rel="stylesheet" type="text/css" />
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
									<h1 class="d-flex align-items-center text-dark fw-bold my-1 fs-3">Merge Party
									<!--begin::Separator-->
									<span class="h-20px border-gray-400 border-start ms-3 mx-2"></span>
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
										<!--begin::Card body-->
										<div class="card-body py-4">
											<div class="row">
												<div class="col-lg-6">
													<div class="px-4" style="border-radius: 10px;padding-bottom: 10px;box-shadow: 0 5px 10px #00002947;">
														<label class="col-lg-12 col-form-label fw-bold fs-5 text-center">Party Basic Details</label>
														<div class="row">
															<label class="col-lg-3 col-form-label required fw-semibold fs-6">Party Name</label>
															<div class="col-lg-6">
																<input type="text" name="partyNameone" class="form-control form-control-lg1 form-control-solid" placeholder="Party Name" id="partyNameone" value="" />
																<input type="hidden" name="loannopartyone" id="loannopartyone" value=""/>
																<input type="hidden" name="loannopartyoneparyID" id="loannopartyoneparyID" value=""/>
																<div class="fv-plugins-message-container invalid-feedback" id=""></div>
															</div>
															<label class="col-lg-3 col-form-label fw-bold fs-6">
																<span >
																	<i class="fa-solid fa-star fs-4" style="color:#50cd89;"></i>&nbsp;
																</span>
																<span id="partyonerateingstatus"></span>
															</label>
															<label class="col-lg-8 col-form-label fw-bold fs-6">
																<span>
																	<i class="fa-solid fa-location-dot fs-6" aria-hidden="true" title="Address"></i>&emsp;
																</span>
																<span id="partyoneaddress">-</span>
																<input type="hidden" name="partyoneaddressval" id="partyoneaddressval" value="" />
															</label>
															<label class="col-lg-4 col-form-label fw-bold fs-6">
																<span>
																	<i class="fas fa-mobile-android-alt fs-6" aria-hidden="true" title="Mobile"></i>&emsp;
																</span>
																<span id="partyphone">-</span>
															</label>
														</div>
														<div class="row">
															<div class="col-lg-4 fv-row" >
																<div class="image-input image-input-outline" data-kt-image-input="true" >
																	<div class="image-input-wrapper"  id="partyimage"><img src="<?php echo base_url(); ?>assets/images/Party.jpg " width="120px" height="120px"></div>
																</div>
															</div>
															<div class="col-lg-4 fv-row">
																<div class="image-input image-input-outline" data-kt-image-input="true" st>
																	<div class="image-input-wrapper"  id="singnature"><img src="<?php echo base_url(); ?>assets/images/Signature.jpg " width="120px" height="120px"></div>
																</div>
															</div>
															<div class="col-lg-4 fv-row">
																<div class="image-input image-input-outline" data-kt-image-input="true" >
																	<div class="image-input-wrapper"  id="idproof"><img src="<?php echo base_url(); ?>assets/images/Party_Proof.jpg " width="120px" height="120px"></div>
																</div>
															</div>
														</div>
													</div>
													<div class="row mt-2">
														<div class="col-lg-12">
															<div class="px-4" style="border-radius: 10px;padding-bottom: 10px;box-shadow: 0 5px 10px #00002947;height: 280px !important;">
																<h4 class="fw-bold py-2">Loan List</h4>
																<table class="table align-middle table-row-dashed table-striped table-hover fs-7 gy-1 gs-2" id="party_1_table">
																	<thead>
																		<tr class="text-start text-muted fw-bold fs-7 gs-0" style="background-color:#ec9629 !important;">
													            <th class="w-25px">Company</th>
													            <th class="w-50px">Loan No</th>
													            <th class="w-50px">Item Count</th>
													            <th class="w-50px">Weight<br>(gms)</th>
													            <th class="w-50px">Nt Wgt<br>(gms)</th>
													            <th class="w-50px">Img</th>
													            <th class="w-25px" style="max-width:80px !important;">Action</th>
																		</tr>
																	</thead>
																	<tbody class="text-gray-600 fw-semibold" id="partypledgedata">
																		
													        	
																   </tbody>
																   
																</table>
															</div>
														</div>
													</div>
												</div>
												<div class="col-lg-6">
													<div class="px-4" style="border-radius: 10px;padding-bottom: 10px;box-shadow: 0 5px 10px #00002947;">
														<label class="col-lg-12 col-form-label fw-bold fs-5 text-center">Party Basic Details</label>
														<div class="row">
															<label class="col-lg-3 col-form-label required fw-semibold fs-6">Party Name</label>
															<div class="col-lg-6">
																<input type="text" name="PartyNamesecound" class="form-control form-control-lg1 form-control-solid" placeholder="Party Name" id="PartyNamesecound" value="" onchange="getpartysecdetails(this.value);">
																<input type="hidden" name="PartyNamesecoundval" id="PartyNamesecoundval" value="" />
																<input type="hidden" name="PartyNamesecoundvalpartyID" id="PartyNamesecoundvalpartyID" value="" />
																<div class="fv-plugins-message-container invalid-feedback" id=""></div>
															</div>
															<label class="col-lg-3 col-form-label fw-bold fs-6">
																<span id="partytworatingcolor">
																	
																</span>
																<span id="partytworateingstatus">-</span>
															</label>
															<label class="col-lg-8 col-form-label fw-bold fs-6">
																<span>
																	<i class="fa-solid fa-location-dot fs-6" aria-hidden="true" title="Address"></i>&emsp;
																</span>
																<span id="partytwoaddress">-</span>
																<input type="hidden" name="partytwoaddressval" id="partytwoaddressval" value="" />
															</label>
															<label class="col-lg-4 col-form-label fw-bold fs-6">
																<span>
																	<i class="fas fa-mobile-android-alt fs-6" aria-hidden="true" title="Mobile"></i>&emsp;
																</span>
																<span id="partyphonetwo">-</span>
															</label>
														</div>
														<div class="row">
															<div class="col-lg-4 fv-row">
																<div class="image-input image-input-outline" data-kt-image-input="true" >
																	<div class="image-input-wrapper"  id="partysecimage"><img src="<?php echo base_url(); ?>assets/images/Party.jpg " width="120px" height="120px"></div>
																</div>
															</div>
															<div class="col-lg-4 fv-row">
																<div class="image-input image-input-outline" data-kt-image-input="true" >
																	<div class="image-input-wrapper" id="singnaturesec">
																		<img src="<?php echo base_url(); ?>assets/images/Signature.jpg " width="120px" height="120px">
																	</div>
																</div>
															</div>
															<div class="col-lg-4 fv-row">
																<div class="image-input image-input-outline" data-kt-image-input="true" >
																	<div class="image-input-wrapper" id="idproofsec"><img src="<?php echo base_url(); ?>assets/images/Party_Proof.jpg " width="120px" height="120px"></div>
																</div>
															</div>
														</div>
													</div>
													<div class="row mt-2">
														<div class="col-lg-12">
															<div class="px-4" style="border-radius: 10px;padding-bottom: 10px;box-shadow: 0 5px 10px #00002947;height: 280px !important;">
																<h4 class="fw-bold py-2">Loan List</h4>
																<table class="table align-middle table-row-dashed table-striped table-hover fs-7 gy-1 gs-2" id="party_2_table">
																	<thead>
																		<tr class="text-start text-muted fw-bold fs-7 gs-0" style="background-color:#ec9629 !important;">
													            <th class="w-25px">Company</th>
													            <th class="w-50px">Loan No</th>
													            <th class="w-50px">Item Count</th>
													            <th class="w-50px">Weight<br>(gms)</th>
													            <th class="w-50px">Nt Wgt<br>(gms)</th>
													            <th class="w-50px">Img</th>
													            <th class="w-25px" style="max-width:80px !important;">Action</th>
																		</tr>
																	</thead>
																	<tbody class="text-gray-600 fw-semibold" id="partytwotbody">
																		
													        	
																   </tbody>
																  
																</table>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div class="row mt-2">
												<label class="col-lg-1 col-form-label required fw-semibold fs-6">Merge Party</label>
												<div class="col-lg-2">
													<select class="form-select form-select-solid" name="mergepartyname" id="mergepartyname" data-control="select2" data-hide-search="true">	
														<option value="">--Select party--</option>
														
													</select>
												</div>
												<div class="col-lg-1">
													<label class="col-form-label required fw-semibold fs-6">Reason</label>
												</div>
												<div class="col-lg-3">
													<textarea class="form-control form-select-solid fw-semibold fs-5" rows="2" id="mergeremarks" name="mergeremarks" value=""></textarea>
													<div class="fv-plugins-message-container invalid-feedback"></div>
												</div>
											</div>
											<div class="d-flex align-items-center justify-content-end mt-4">
												<button type="reset" class="btn btn-secondary me-2" onclick="resetmergepartypage();">RESET</button>
												<button type="submit" class="btn btn-primary" id="save_changes_add_new_loan" onclick="updatemergeparty();">Merge Party</button>
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
					</div>
					<!--end::Content-->
				<?php $this->load->view("footer");?>
				</div>
				<!--end::Wrapper-->
			</div>
			<!--end::Page-->
		</div>
		<!--end::Root-->
		<!--begin::Modal - verify Lock Out-->
		<div class="modal" id="kt_modal_verify_mergeparty" tabindex="-1" aria-hidden="true">
			<!--begin::Modal dialog-->
			<div class="modal-dialog modal-m">
				<!--begin::Modal content-->
				<div class="modal-content rounded">
					<div class="swal2-icon swal2-warning swal2-icon-show" style="display: flex;">
						<div class="swal2-icon-content">&#x2713;</div></div>
						<div class="swal2-html-container" id="swal2-html-container" style="display: block;">
							<b><span></span></b>
							<p class="mt-2">Are you sure you want to Merge party?</p></div>
						<div class="d-flex flex-center flex-row-fluid pt-3">
							<button type="submit" class="btn btn-primary me-3" onclick="mergepartyconfirmfunction();">Yes</button>
							<button type="reset" class="btn btn-secondary" onclick="closemodelmergeokayfunc();">No</button>
						</div><br><br>
				</div>
				<!--end::Modal content-->
			</div>
			<!--end::Modal dialog-->
		</div>
		<!--end::Modal - verify Lock Out-->
		<div class="modal fade" id="kt_modal_view_individual_loan_party_1" tabindex="-1" aria-hidden="true" style="background-color:#00000;">
			<!--begin::Modal dialog-->
			<div class="modal-dialog modal-xl-loan">
				<!--begin::Modal content-->
				<div class="modal-content rounded">
					<!--begin::Modal header-->
					<div class="modal-header justify-content-end border-0 pb-0">
						<!--begin::Close-->
						<div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
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
						<div class="mb-3 text-center">
							<h1 class="mb-3">Individual Loan</h1>
						</div>
						<div class="row">
							<label class="col-lg-1 col-form-label fw-semibold fs-6">Date</label>
							<label class="col-lg-2 col-form-label fw-bold fs-6">20-01-2023</label>
							<label class="col-lg-1 col-form-label fw-semibold fs-6">Loan No</label>
							<label class="col-lg-2 col-form-label fw-bold fs-6">MIP-430/22</label>
							<label class="col-lg-1 col-form-label fw-semibold fs-6">Scheme/<br>Int(%)</label>
							<label class="col-lg-1 col-form-label fw-bold fs-6">
								<span>MIP</span>
								<span>/</span>
								<span>2.5</span>
								<!-- <span>&nbsp;%</span> -->
							</label>
							<label class="col-lg-1 col-form-label fw-semibold fs-6">Company</label>
							<label class="col-lg-3 col-form-label fw-bold fs-6">AGB - Main Branch Ayyanar Gold Bankers SKD</label>
						</div>
						<div class="row mt-4">
          		<!-- <label class="col-form-label fw-bold fs-5">Pledge Items</label> -->
          		<table class="table align-middle table-row-dashed table-striped table-hover fs-7 gy-3 gs-2" id="individual_loan_pledge_item">
								<thead>
									<tr class="text-start text-muted fw-bold fs-7 gs-0">
										<th class="min-w-25px">Sno</th>
				            <th class="min-w-80px">Pledge</th>
				            <th class="min-w-80px">Description</th>
				            <th class="min-w-50px">Quality</th>
				            <th class="min-w-50px">Purity(%)</th>
				            <th class="min-w-50px">Qty</th>
				            <th class="min-w-80px">Weight<br>(gms)</th>
				            <th class="min-w-50px">St.Wgt<br>(gms)</th>
				            <th class="min-w-50px">Less<br>(gms)</th>
				            <th class="min-w-80px">Nt Wgt<br>(gms)</th>
				            <th class="min-w-80px">Pure Wgt<br>(gms)</th>
				            <th class="min-w-50px">Damage</th>
				            <th class="min-w-50px">Img</th>
									</tr>
								</thead>
								<tbody class="text-gray-600 fw-semibold">
									<tr>
										<td>1</td>
				            <td class="ple1">MURUKKU  MATTAL</td>
				            <td class="ple1">SEAL ILLAI</td>
				            <td class="ple1">NON-KDM</td>
				            <td>88</td>
				            <td>2</td>
				            <td>2.000</td>
				            <td>0.050</td>
				            <td>0.050</td>
				            <td>1.900</td>
				            <td>1.672</td>
				            <td class="ple1">No</td>
				            <td>-</td>   
				        	</tr>
								</tbody>
							</table>
          	</div>
          	<div class="row">
          		<div class="col-lg-12">
          			<div class="row">
          				<label class="col-lg-1 col-form-label fw-semibold fs-6">CurrRate</label>
									<label class="col-lg-1 col-form-label fw-bold fs-6">4571.00</label>
									<label class="col-lg-1 col-form-label fw-semibold fs-6">Gram.Val</label>
									<label class="col-lg-1 col-form-label fw-bold fs-6">91</label>
									<label class="col-lg-1 col-form-label fw-semibold fs-6">SalesRate</label>
									<label class="col-lg-1 col-form-label fw-bold fs-6">91</label>
          			</div>
          		</div>
						</div>
						<!--end::Modal body-->
					</div>

				</div>
				<!--end::Modal content-->
			</div>
		</div>


			<div class="modal fade" id="kt_modal_view_individual_loan_party_2" tabindex="-1" aria-hidden="true" style="background-color: #00000;">
			<!--begin::Modal dialog-->
			<div class="modal-dialog modal-xl-loan">
				<!--begin::Modal content-->
				<div class="modal-content rounded">
					<!--begin::Modal header-->
					<div class="modal-header justify-content-end border-0 pb-0">
						<!--begin::Close-->
						<div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
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
						<div class="mb-3 text-center">
							<h1 class="mb-3">Individual Loan</h1>
						</div>
						<div class="row">
							<label class="col-lg-1 col-form-label fw-semibold fs-6">Date</label>
							<label class="col-lg-2 col-form-label fw-bold fs-6">20-01-2023</label>
							<label class="col-lg-1 col-form-label fw-semibold fs-6">Loan No</label>
							<label class="col-lg-2 col-form-label fw-bold fs-6">MIP-430/22</label>
							<label class="col-lg-1 col-form-label fw-semibold fs-6">Scheme/<br>Int(%)</label>
							<label class="col-lg-1 col-form-label fw-bold fs-6">
								<span>MIP</span>
								<span>/</span>
								<span>2.5</span>
								<!-- <span>&nbsp;%</span> -->
							</label>
							<label class="col-lg-1 col-form-label fw-semibold fs-6">Company</label>
							<label class="col-lg-3 col-form-label fw-bold fs-6">AGB - Main Branch Ayyanar Gold Bankers SKD</label>
						</div>
						<div class="row mt-4">
          		<!-- <label class="col-form-label fw-bold fs-5">Pledge Items</label> -->
          		<table class="table align-middle table-row-dashed table-striped table-hover fs-7 gy-3 gs-2" id="individual_loan_pledge_item">
								<thead>
									<tr class="text-start text-muted fw-bold fs-7 gs-0">
										<th class="min-w-25px">Sno</th>
				            <th class="min-w-80px">Pledge</th>
				            <th class="min-w-80px">Description</th>
				            <th class="min-w-50px">Quality</th>
				            <th class="min-w-50px">Purity(%)</th>
				            <th class="min-w-50px">Qty</th>
				            <th class="min-w-80px">Weight<br>(gms)</th>
				            <th class="min-w-50px">St.Wgt<br>(gms)</th>
				            <th class="min-w-50px">Less<br>(gms)</th>
				            <th class="min-w-80px">Nt Wgt<br>(gms)</th>
				            <th class="min-w-80px">Pure Wgt<br>(gms)</th>
				            <th class="min-w-50px">Damage</th>
				            <th class="min-w-50px" style="display: none;">Img</th>
									</tr>
								</thead>
								<tbody class="text-gray-600 fw-semibold">
									<tr>
										<td>1</td>
				            <td class="ple1">MURUKKU  MATTAL</td>
				            <td class="ple1">SEAL ILLAI</td>
				            <td class="ple1">NON-KDM</td>
				            <td>88</td>
				            <td>2</td>
				            <td>2.000</td>
				            <td>0.050</td>
				            <td>0.050</td>
				            <td>1.900</td>
				            <td>1.672</td>
				            <td class="ple1">No</td>
				            <td style="display: none;">-</td>   
				        	</tr>
								</tbody>
							</table>
          	</div>
          	<div class="row">
          		<div class="col-lg-12">
          			<div class="row">
          				<label class="col-lg-1 col-form-label fw-semibold fs-6">CurrRate</label>
									<label class="col-lg-1 col-form-label fw-bold fs-6">4571.00</label>
									<label class="col-lg-1 col-form-label fw-semibold fs-6">Gram.Val</label>
									<label class="col-lg-1 col-form-label fw-bold fs-6">91</label>
									<label class="col-lg-1 col-form-label fw-semibold fs-6">SalesRate</label>
									<label class="col-lg-1 col-form-label fw-bold fs-6">91</label>
          			</div>
          		</div>
						</div>
						<!--end::Modal body-->
					</div>

				</div>
				<!--end::Modal content-->
			</div>
		</div>


<?php $this->load->view("script");?>
		<script src="<?php echo base_url();?>assets/jquery.autocomplete.js"></script>
	<input type="hidden" id="baseurl" value="<?php echo base_url();?>">
			<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

			<script>
				  var baseurl = $("#baseurl").val();
				  $("#partyNameone").autocomplete({ 
						 valueKey:'title',
		            source:[{
		            url:baseurl+'party/partydetails?query=%QUERY%',
		            type:'remote',
		            ajax:{
		              dataType : 'json',
		            }
			    }]}).on('selected.xdsoft',function(e,suggestion,ui)
			    { 	

			    		console.log(suggestion);
			    	
			         $("#partyNameone").val(suggestion.partyID);   
			         getpartydetails(suggestion.partyID);
			  	});



			  	$("#PartyNamesecound").autocomplete({ 
						 valueKey:'title',
		            source:[{
		            url:baseurl+'party/secpartydetails?query=%QUERY%',
		            type:'remote',
		            ajax:{
		              dataType : 'json',
		            }
			    }]}).on('selected.xdsoft',function(e,suggestion,ui)
			    { 
			    		//console.log(suggestion);
			         $("#PartyNamesecound").val(suggestion.partyID);   
			         getpartysecdetails(suggestion.partyID);
			  	});
			</script>
			<script>
				function closemodelmergeokayfunc(){
					//alert('close');
					$('#kt_modal_verify_mergeparty').hide();
					return false;
				}
				function mergepartyconfirmfunction()
				{
					  //party one
						var loannopartyone = $('#loannopartyone').val();
						var loannopartyoneparyID = $('#loannopartyoneparyID').val();

						//party Two
						var PartyNamesecoundval = $('#PartyNamesecoundval').val();
						var PartyNamesecoundvalpartyID = $('#PartyNamesecoundvalpartyID').val();

					  //select party ID
						var mergepartyID = $('#mergepartyname').val();

						var mergeremarks = $('#mergeremarks').val();

					  var formData = new FormData();
					  formData.append('mergepartyID', mergepartyID);
					  formData.append('partyonebillno', loannopartyone);
					  formData.append('partyonepartyid', loannopartyoneparyID);
					  formData.append('partytwobillno', PartyNamesecoundval);
					  formData.append('partytwopartyid', PartyNamesecoundvalpartyID);
					   formData.append('mergeremarks', mergeremarks);

					  $.ajax(
					  {
								url: baseurl+'party/mergepartyconfirmfun',
								type: 'POST',
								data: formData,
								async: false,
								cache: false,
								contentType: false,
								processData: false,
								success: function (response) 
								{	
									var returnedData = JSON.parse(response);
									if(returnedData.return_code == 0)
									{

											Swal.fire({
												title: 'Success!',
												text: 'Party Merge Successfully completed..!',
												icon: 'success',
												confirmButtonText: 'Okay'
											})
											location.reload();

									}
									els
									{
										Swal.fire({
												title: 'Success!',
												text: 'Party Merge Not Successfully please check..!',
												icon: 'error',
												confirmButtonText: 'Okay'
											})
									}
							  }

						});
				}
			</script>
			<script>
				function getpartydetails(partyID)
				{
						$('#party_1_table tbody').empty();
						$("#mergepartyname").empty().append(
             '<option value = "">--select---</option>');

						$('#partyNameone').val('');
						$('party_1_table').val('');
						$('#partyoneaddressval').val('');
						$('#partyphone').val('');
						$('#partyonerateingstatus').val('');
						$('#partyimage').val();



					 var partyNameone  = partyID;

					 var formData = new FormData();
					 formData.append('partyIDone', partyNameone);

					  $.ajax(
					  {
								url: baseurl+'party/getallpartydetails',
								type: 'POST',
								data: formData,
								async: false,
								cache: false,
								contentType: false,
								processData: false,
								success: function (response) 
								{
									var returnedData = JSON.parse(response);
									$('#partyimage').html("");
									$('#singnature').html("");
									$('#idproof').html("");
									$('#partyNameone').html("");
									
									if(returnedData.return_code == 0)
									{

										
											//console.log('success partyname');
											console.log(returnedData.partydetails[0].PID);
											$('.odd').show();
											if(returnedData.pledge_info !=""){

												$('.odd').hide();
											}

											var streetname = returnedData.partydetails[0].STREETNAME;
											var villagename = returnedData.partydetails[0].VILLAGENAME;
											var cityname = returnedData.partydetails[0].CITYNAME;
											var partyonephone = returnedData.partydetails[0].PHONE;
											var partyonerating = returnedData.partydetails[0].RATING;
											var IDPROOF_IMAGE  = returnedData.partydetails[0].IDPROOF_IMAGE;
											var PARTY_IMAGE = returnedData.partydetails[0].PARTY_IMAGE;
											var SIGNATURE_IMAGE = returnedData.partydetails[0].SIGNATURE_IMAGE;

											var PHOTO = returnedData.partydetails[0].PHOTO;
											var SIGNATURE =returnedData.partydetails[0].SIGNATURE;
											var OTHER_PHOTO = returnedData.partydetails[0].OTHER_PHOTO;

											var billno = returnedData.partydetails[0].BILLNO;
											var PIDval = returnedData.partydetails[0].PID;
												
											$('#loannopartyone').val(billno);

											$('#loannopartyoneparyID').val(PIDval);


											if(streetname =='null' && villagename == "null" &&  cityname =="null")
											{
													var addresspartyone = '-';
											}
											else
											{
												 var addresspartyone = streetname+','+villagename+','+cityname;
											}
	
											$('#partyoneaddressval').val(addresspartyone);
											var addresssoneavalue = $('#partyoneaddressval').val();
											//console.log(addresssoneavalue);
											if(addresssoneavalue=='null,null,null')
											{
														$('#partyoneaddress').html('-');
											}
											else{

												$('#partyoneaddress').html(addresssoneavalue);
											}

											$('#partyphone').html(partyonephone);
											var rating = '';
											if(partyonerating==1)
											{
												 rating ='Bad'; 
											}
											else if(partyonerating==2)
											{
												 rating ='Average'; 
											}
											else
											{
												 rating ='Good'; 
											}
											//console.log(rating);
											$('#partyonerateingstatus').html(rating);
	
										
											if(PARTY_IMAGE)
											{

												alert('testnull2428');
												$('#partyimage').append("<img src='"+PARTY_IMAGE+"' height='120px' width='120px'>");
												

											}
											else if(PHOTO){
												
												alert('testnull28');
												$('#partyimage').append('<img src="'+PHOTO+'" alt="Red dot" height="120px" width="120px" />');
													
											}
											else{
												alert('elsenull');
												$('#partyimage').append('<img src='+baseurl+'assets/images/Party.jpg alt="Red dot" height="120px" width="120px" >');
											}

											//singnature

											if(SIGNATURE_IMAGE)
											{
												$('#singnature').append("<img src='"+SIGNATURE_IMAGE+"' height='120px' width='120px'>");
												

											}
											else if(SIGNATURE){
												
												//alert('photo');
												$('#singnature').append('<img src="'+SIGNATURE+'" alt="Red dot" height="120px" width="120px" />');
													
											}
										
											else{
												//alert('normal');
												$('#singnature').append('<img src='+baseurl+'assets/images/Signature.jpg alt="Red dot" height="120px" width="120px" >');
											}


											//IDproof

											if(IDPROOF_IMAGE)
											{
												$('#idproof').append("<img src='"+IDPROOF_IMAGE+"' height='120px' width='120px'>");
												

											}
											else if(OTHER_PHOTO){
												
												//alert('photo');
												$('#idproof').append('<img src="'+OTHER_PHOTO+'" alt="Red dot" height="120px" width="120px" />');
													
											}
											
											else{
												//alert('normal');
												$('#idproof').append('<img src='+baseurl+'assets/images/Party_Proof.jpg alt="Red dot" height="120px" width="120px" >');
											}




											//table append 


												// The HTML table.
							var tbl = document.querySelector('#party_1_table');

							// A function to produce a HTML table row as a string.
							var template = function template(d,index) 
							{
								return '<tr >' 
								+ '<td class="ple1">' 
								+ d.COMPANYNAME
								+ '</td>' 
								+ '<td class="ple1">' 
								+ d.BILLNO
								+ '</td>' 
								+ '<td>' 
								+ d.itemcount 
								+ '</td>' 
								+ '<td>' 
								+ d.totweight
								+ '</td>' 
								+ '<td>' 
								+ d.totnetwight
								+ '</td>' 
								+ '<td>' 
								+ '<div class="image-input mt-2 me-6" data-kt-image-input="true">' 
								+ '<div class="image-input-wrapper w-40px h-40px" style="background-image: url(assets/images/Party.jpg)">'
								+ '</div>'
								+ '</div>'
								+ '</td>' 
								+ '<td>' 
								+ '<a  class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm" data-index='+d.BILLNO +' id="billnumber'+index+'"  onclick="load_pledge_info('+index+');">'
								+ '<i class="bi bi-eye-fill eyc" style="font-size: 16px !important;"></i>'
								+ '</a>'
								+ '</td>'
								+ '</tr>';
							};

							var index =1;
							var render = function render(tbl) {
							return function (d) {
								return tbl.innerHTML += d.map(function (i) 
								{
									return template(i,index++);
								}).join('');
							};

							};

							// Fire the render function. 
							render(tbl)(returnedData.pledge_info);

										
											
									}
									else if(returnedData.return_code == 2)
									{
										Swal.fire({
											title: 'Error!',
											text: 'Party Already Merged..!',
											icon: 'error',
											confirmButtonText: 'Okay'
										})

									}
									else
									{
										Swal.fire({
											title: 'Error!',
											text: 'Incorrect PartyName.Please Check.',
											icon: 'error',
											confirmButtonText: 'Okay'
										})
									}
								}
					  });
				}
				
				function close_pledge_list_modal(){
					$('#kt_modal_view_individual_loan_party_1').hide();
				}
				function closetwo_pledge_list_modal(){

					$('#kt_modal_view_individual_loan_party_2').hide();
				}

				function getpartysecdetails(partyID)
				{
						//clear values
						$('#party_2_table tbody').empty();
						$("#mergepartyname").empty().append(
             '<option value = "">--select---</option>');
						$('#PartyNamesecound').val('');
					  $('party_2_table').val('');

					  $('#partytwoaddress').html("");
					  $('#partytworateingstatus').html("");
					  $('#partyphonetwo').html("");
					  $('#partysecimage').html("");
						$('#singnaturesec').html("");
						$('#idproofsec').html("");

						firstPID = $('#loannopartyoneparyID').val();
						if(firstPID=partyID)
						{
								Swal.fire({
												title: 'Error!',
												text: 'Party Already Here..!',
												icon: 'error',
												confirmButtonText: 'Okay'
											})
								return false;

						}

						//get data use Form input ID based
					  var partynamesec  = partyID;
					  var partyoneID  = $('#loannopartyone').val();
					  var partytwoID = $('#PartyNamesecoundval').val();

					  //Store FormData Array and pass ajax post
					  var formData = new FormData();
					  formData.append('partyID', partynamesec);
					  formData.append('partyoneID', partyoneID);
					  formData.append('partytwoID', partytwoID);

					  //Call Ajax func
					  $.ajax(
					  {
								url: baseurl+'party/getallsecpartydetails',
								type: 'POST',
								data: formData,
								async: false,
								cache: false,
								contentType: false,
								processData: false,
								success: function (response) 
								{
									var returnedData = JSON.parse(response);
									$('#partysecimage').html("");
									$('#singnaturesec').html("");
									$('#idproofsec').html("");
									$('#PartyNamesecound').html("");
									
									if(returnedData.return_code == 0)
									{

											//check retuen condition based show the result's	 
											$.each(returnedData.partynameval, function(key, value) 
											{   

													//console.log(value[0].PID);
											    $('#mergepartyname')
											         .append($("<option></option>")
											                    .attr("value", value[0].PID)
											                    .text(value[0].NAME)); 
											});
											$('.odd').show();
											if(returnedData.pledge_info !=""){

												$('.odd').hide();
											}
											//pass the json data to one variable name
											var streetname = returnedData.partydetails[0].STREETNAME;
											var villagename = returnedData.partydetails[0].VILLAGENAME;
											var cityname = returnedData.partydetails[0].CITYNAME;
											var partytwophone = returnedData.partydetails[0].PHONE;
											var partyonerating = returnedData.partydetails[0].RATING;
											var IDPROOF_IMAGE  = returnedData.partydetails[0].IDPROOF_IMAGE;
											var PARTY_IMAGE = returnedData.partydetails[0].PARTY_IMAGE;
											var SIGNATURE_IMAGE = returnedData.partydetails[0].SIGNATURE_IMAGE;
											var PHOTO = returnedData.partydetails[0].PHOTO;
											var SIGNATURE =returnedData.partydetails[0].SIGNATURE;
											var OTHER_PHOTO = returnedData.partydetails[0].OTHER_PHOTO;
											var billno = returnedData.partydetails[0].BILLNO;
											var PIDval = returnedData.partydetails[0].PID;

											//get partysec ID one value.
											$('#PartyNamesecoundval').val(billno);
											$('#PartyNamesecoundvalpartyID').val(PIDval);

											//condition based show the street
											if(streetname =='null' && villagename == "null" &&  cityname =="null")
											{
													var addresspartytwo = '-';
											}
											else
											{
												 var addresspartytwo = streetname+','+villagename+','+cityname;
											}
	
											$('#partytwoaddressval').val(addresspartytwo);
											var addressstwoavalue = $('#partytwoaddressval').val();
											//console.log(addresssoneavalue);
											if(addressstwoavalue=='null,null,null')
											{
													$('#partytwoaddress').html('-');
											}
											else{

												  $('#partytwoaddress').html(addressstwoavalue);
											}

											$('#partyphonetwo').html(partytwophone);
											var rating = '';
											if(partyonerating==1)
											{
												 rating ='Bad'; 
											}
											else if(partyonerating==2)
											{
												 rating ='Average'; 
											}
											else
											{
												 rating ='Good'; 
											}
											//console.log(rating);
											$('#partytworateingstatus').html(rating);
	
										
											if(PARTY_IMAGE)
											{
												$('#partysecimage').append("<img src='"+PARTY_IMAGE+"' height='120px' width='120px'>");
											}
											else if(PHOTO)
											{
												
												$('#partysecimage').append('<img src="'+PHOTO+'" alt="Red dot" height="120px" width="120px" />');	
											}
											else{
											
												$('#partysecimage').append('<img src='+baseurl+'assets/images/Party.jpg alt="Red dot" height="120px" width="120px" >');
											}

											//singnature

											if(SIGNATURE_IMAGE)
											{
												$('#singnaturesec').append("<img src='"+SIGNATURE_IMAGE+"' height='120px' width='120px'>");
												

											}
											else if(SIGNATURE){
												
												//alert('photo');
												$('#singnaturesec').append('<img src="'+SIGNATURE+'" alt="Red dot" height="120px" width="120px" />');
													
											}
											else{
												//alert('normal');
												$('#singnaturesec').append('<img src='+baseurl+'assets/images/Signature.jpg alt="Red dot" height="120px" width="120px" >');
											}


											//IDproof

											if(IDPROOF_IMAGE)
											{
												$('#idproofsec').append("<img src='"+IDPROOF_IMAGE+"' height='120px' width='120px'>");
												

											}
											else if(OTHER_PHOTO){
												
												//alert('photo');
												$('#idproofsec').append('<img src="'+OTHER_PHOTO+'" alt="Red dot" height="120px" width="120px" />');
													
											}
											else{
												//alert('normal');
												$('#idproofsec').append('<img src='+baseurl+'assets/images/Party_Proof.jpg alt="Red dot" height="120px" width="120px" >');
											}

											//table append 
											// The HTML table.
											var tbl = document.querySelector('#party_2_table');

											// A function to produce a HTML table row as a string.
											var template = function template(d,indexx) 
											{
												return '<tr >' 
												+ '<td class="ple1">' 
												+ d.COMPANYNAME
												+ '</td>' 
												+ '<td class="ple1">' 
												+ d.BILLNO
												+ '</td>' 
												+ '<td>' 
												+ d.itemcount 
												+ '</td>' 
												+ '<td>' 
												+ d.totweight
												+ '</td>' 
												+ '<td>' 
												+ d.totnetwight
												+ '</td>' 
												+ '<td>' 
												+ '<div class="image-input mt-2 me-6" data-kt-image-input="true">' 
												+ '<div class="image-input-wrapper w-40px h-40px" style="background-image: url(assets/images/Party.jpg)">'
												+ '</div>'
												+ '</div>'
												+ '</td>' 
												+ '<td>' 
												+ '<a  class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm" data-index='+d.BILLNO +' id="billnumbertwo'+indexx+'"  onclick="loadtwo_pledge_info('+indexx+');">'
												+ '<i class="bi bi-eye-fill eyc" style="font-size: 16px !important;"></i>'
												+ '</a>'
												+ '</td>'
												+ '</tr>';
											};

											var indexx =1;
											var render = function render(tbl) {
											return function (d) {
												return tbl.innerHTML += d.map(function (i) 
												{
													return template(i,indexx++);
												}).join('');
											};

											};

											// Fire the render function. 
											render(tbl)(returnedData.pledge_info);	
									}
									else if(returnedData.return_code == 2)
									{
										Swal.fire({
											title: 'Error!',
											text: 'Party Already Merged..!',
											icon: 'error',
											confirmButtonText: 'Okay'
										})

									}
									else
									{
										Swal.fire({
											title: 'Error!',
											text: 'Incorrect PartyName.Please Check.',
											icon: 'error',
											confirmButtonText: 'Okay'
										})
									}
								}
					  });
				}
				function updatemergeparty()
				{
					var mergepartyid =$('#mergepartyname').val();
					var mergeremarks =$('#mergeremarks').val();
					var partyonerowcount = document.getElementById('party_1_table').rows.length;
					var partytworowcount = document.getElementById('party_2_table').rows.length;
				
				
					if(partyonerowcount<2)
					{

						
						$('#partyNameone').addClass('error');
							$('#partyNameone').focus();
							Swal.fire({
							title: 'Error!',
							text: 'Please Fetch Party One Details..!',
							icon: 'error',
							confirmButtonText: 'Okay'
							})
			
							return false;

					}
					else if(partytworowcount<2)
					{
						
						$('#PartyNamesecound').addClass('error');
							$('#PartyNamesecound').focus();
							$('#partyNameone').removeClass('error');
							Swal.fire({
							title: 'Error!',
							text: 'Please Fetch Party two Details..!',
							icon: 'error',
							confirmButtonText: 'Okay'
							})
			
							return false;

					}
					else if(mergepartyid.trim()=="")
					{
							$('#PartyNamesecound').removeClass('error');
							$('#partyNameone').removeClass('error');

							$('#mergepartyname').addClass('error');
							$('#mergepartyname').focus();
							Swal.fire({
							title: 'Error!',
							text: 'Please Select Merge-Party',
							icon: 'error',
							confirmButtonText: 'Okay'
							})
			
							return false;


					}
					else if(mergeremarks.trim()==""){
							$('#PartyNamesecound').removeClass('error');
							$('#partyNameone').removeClass('error');
							$('#mergepartyname').removeClass('error');
							
							$('#mergeremarks').addClass('error');
							$('#mergeremarks').focus();
							Swal.fire({
							title: 'Error!',
							text: 'Please Enter Your Merge party Reasion..!',
							icon: 'error',
							confirmButtonText: 'Okay'
							})
			
							return false;
					}
					else
					{
							$('#PartyNamesecound').removeClass('error');
							$('#partyNameone').removeClass('error');
							$('#mergepartyname').removeClass('error');
							$('#mergeremarks').removeClass('error');

							$('#kt_modal_verify_mergeparty').show();
							return false;


					}
				}
				function resetmergepartypage(){

					location.reload();
				}
				function loadtwo_pledge_info(indexx){
					var billnotwo = $('#billnumbertwo'+indexx).data('index');
					//alert(billnotwo);
					 var formData = new FormData();
				   formData.append('billnotwo', billnotwo);

					  $.ajax(
						{
						    url: baseurl+'party/loadtwo_pledge_list',
								type: 'POST',
								data: formData,
								async: false,
								cache: false,
								contentType: false,
								processData: false,
								success: function (response) 
								{

										$('#kt_modal_view_individual_loan_party_2').empty().append(response);
										$('#kt_modal_view_individual_loan_party_2').addClass('show');
										$('.modal-backdrop').addClass('show');
										$('#kt_modal_view_individual_loan_party_2').show();
										$('.modal-backdrop').show();
								}
						});

				}
				function load_pledge_info(index)
				{
					 var billno = $('#billnumber'+index).data('index');
					alert(billno);
					 var formData = new FormData();
				   formData.append('billno', billno);

					  $.ajax(
						{
						    url: baseurl+'party/load_pledge_list',
								type: 'POST',
								data: formData,
								async: false,
								cache: false,
								contentType: false,
								processData: false,
								success: function (response) 
								{

										$('#kt_modal_view_individual_loan_party_1').empty().append(response);
										$('#kt_modal_view_individual_loan_party_1').addClass('show');
										$('.modal-backdrop').addClass('show');
										$('#kt_modal_view_individual_loan_party_1').show();
										$('.modal-backdrop').show();
								}
						});
				}
			</script>
   		<script>
		      $("#party_1_table").kendoTooltip({
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
		      $("#party_2_table").kendoTooltip({
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
		      $("#individual_loan_pledge_item").kendoTooltip({
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
			$("#individual_loan_pledge_item").DataTable({
				"ordering": false,
				// "aaSorting":[],
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
			// $('#individual_loan_pledge_item').wrap('<div class="dataTables_scroll" />');
		</script>
   		<script>
			$("#party_1_table").DataTable({
				"ordering": false,
				// "aaSorting":[],
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
			$('#party_1_table').wrap('<div class="dataTables_scroll" />');
		</script>
		<script>
			$("#party_2_table").DataTable({
				"ordering": false,
				// "aaSorting":[],
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
			$('#party_2_table').wrap('<div class="dataTables_scroll" />');
		</script>
		<script>
			$("#kt_datepicker_From").flatpickr({
				dateFormat: "d-m-Y",
			});
		</script>
	</body>
	<!--end::Body-->
	</html>