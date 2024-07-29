<?php $this->load->view("common");?>
<?php $this->load->helper('directory'); ?>

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
</style>
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
									<h1 class="d-flex align-items-center text-dark fw-bold my-1 fs-3">Property History
									<!--begin::Separator-->
									<span class="h-20px border-gray-400 border-start ms-3 mx-2"></span>&nbsp;
									<?php if (isset($property_view)) { ?>
									<?php if($property_view->ploat_no == $property_view->prop_sts_update){ ?>
										<label class="col-form-label fw-semibold fs-7" >
										<span style="background-color:#B6BD4F;border-radius: 8px;padding: 5px 15px 5px 15px;">Not Sold</span>
									</label>

									<?php }else{ ?>
									<?php if($property_view->prop_sts_update !='0'){ ?>
										<label class="col-form-label fw-semibold fs-7" >
										<span style="background-color:#46dcf9;border-radius: 8px;padding: 5px 15px 5px 15px;">Partial Sold</span>
									</label>
									<?php  }else{   ?>

									<?php if($property_view->prop_sts_update<= 0){ ?>
									<label class="col-form-label fw-semibold fs-7" ><span style="background-color:#f1416c;border-radius: 8px;padding: 5px 10px 5px 10px;">Sold Out</span>
									</label>
									<?php  }  }  } }?>
									<!--end::Separator-->
									<!--begin::Description-->
									<!--end::Description-->
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
										<?php if (isset($property_view)) { ?>
										<div class="card-body py-4">
											
											<div class="row mt-4">
												<!-- <label class="col-lg-2 col-form-label fw-semibold fs-6">Date</label> -->
												<div class="row">
												 <div class="col-lg-10">
													<div class="row">

														<div class="col-lg-3 fv-row">
															<i class='fas fa-calendar-alt fs-3 me-3' title="Date"></i>&nbsp;
															<label class="col-form-label fw-bold fs-6" title="Date"><?php 

															$date=date('d-m-Y',strtotime($property_view->date)); ?>
																<?php $date_format  = $this->db->query("SELECT * FROM general_settings ")->row();
				                                             $format= $date_format->date_format;
				                                             echo date("$format", strtotime($date));
				                                        	?>
															</label>
														</div>
														
														<div class="col-lg-3 fv-row">
															<div class="row">
															<div class="col-lg-5 fv-row">
															<label class="col-form-label fw-bold fs-6">Property ID</label>
															</div>
															<div class="col-lg-7 fv-row">
															<label class="col-form-label fw-bold fs-5" title="Property ID"><?php  echo $property_view->property_id;?></label>
														     </div>
															</div>
														</div>
														<div class="col-lg-4 " title="Party Info">
																<div class="row">
																<div class="col-lg-2 fv-row">
																<i class="fa fa-user fs-3 mt-4"></i>
															   </div>
															   <div class="col-lg-10 fv-row">
																<label class="col-form-label fw-bold fs-6"><?php if(isset($party_details->NAME)){
																	echo $party_details->NAME; }
																	?></label>
																</div>
															</div>
														</div>
													
														<div class="row">
															<div class="col-lg-3" title="Party Phone">
																<div class="row">
																	<div class="col-lg-1 fv-row">
																		<i class="fas fa-mobile-android-alt fs-3 mt-4" aria-hidden="true" title="Mobile"></i>
																	</div>
																	<div class="col-lg-10 fv-row">
																		<label class="col-form-label fw-bold fs-6"><?php if(isset($party_details->NAME)){
																	echo $party_details->PHONE; }
																	?></label>
																	</div>
																</div>
															</div>
															<div class="col-lg-3" title="Party Ratting">
																<div class="row">
																	<div class="col-lg-5 fv-row">
																		&nbsp;<label class="col-form-label fw-bold fs-6">Ratting</label>
																	</div>
																	<div class="col-lg-7 fv-row">
																		<label class="col-form-label fw-bold fs-4">
																			<span><i class="fa-solid fa-star" style="
																			<?php 
																			if($party_details->RATING==3) echo 'color:#50cd89;';
																			if($party_details->RATING==2) echo 'color:#ffc700;';
																			if($party_details->RATING ==1) echo 'color:#FF0000;';
																			if($party_details->RATING=='') echo 'color:#d2d4dc;';
																			?>">
																			</i>
																		</span>
																	</label>
																	</div>
																</div>
															</div>
															<div class="col-lg-6" title="Party Address">
																<div class="row">
																	<div class="col-lg-1 fv-row mt-2">
																		<span class="fs-3">
																		<svg width="28px" height="28px" class="fw-bold" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg">
																			<title>Party Address</title>><style type="text/css">.st0{fill:none;stroke:#3A3A5D;stroke-width:2;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;}</style>
																			<g id="Direction">
																			<path d="M18.091,26.344a1.995,1.995,0,0,0-.689-1.456,2.1117,2.1117,0,0,0-2.834,0,1.995,1.995,0,0,0-.689,1.456,2.7129,2.7129,0,0,0-2.522,2.704v.65h9.256v-.65A2.7129,2.7129,0,0,0,18.091,26.344Z" style="fill:#3A3A5D"/>
																			<polygon points="13.268 9.925 13.268 6.194 8.211 6.194 6.157 8.053 8.211 9.925 13.268 9.925" style="fill:#3A3A5D"/>
																			<polygon points="23.863 10.211 18.702 10.211 18.702 13.955 23.863 13.955 25.943 12.083 23.863 10.211" style="fill:#3A3A5D"/>
																			<polygon points="13.268 14.228 8.211 14.228 6.157 16.1 8.211 17.972 13.268 17.972 13.268 14.228" style="fill:#3A3A5D"/>
																			<path d="M14.568,6.805V23.354a3.3738,3.3738,0,0,1,2.834,0V6.818a3.2831,3.2831,0,0,1-1.417.325A3.1179,3.1179,0,0,1,14.568,6.805Z" style="fill:#3A3A5D"/>
																			<path d="M15.985,5.843a1.8952,1.8952,0,0,0,1.417-.624,1.86,1.86,0,0,0,.52-1.3,1.937,1.937,0,0,0-3.874,0,1.86,1.86,0,0,0,.52,1.3A1.8952,1.8952,0,0,0,15.985,5.843Z" style="fill:#3A3A5D"/>
																			</g>
																		</svg>
															      </span>
																	</div>
																	<div class="col-lg-11 fv-row mt-1">
																		<label class="col-form-label fw-bold fs-6"><?php if(isset($party_details->NAME)){


																	$address=$party_details->ADDRESS1.', '.$party_details->ADDRESS2.', '.$party_details->CITY;
																	echo $address; }
																	?></label>
																	</div>
																</div>
																

																
															</div>
														</div>
													</div>		
													<div class="row">
														<div class="col-lg-3">
															<i class="fas fa-laptop-house fs-3" title="Property Type"></i>&nbsp;
															<label class="col-form-label fw-bold fs-6" title="Property Type"><?php echo $property_view->property_type; ?></label>
														</div>
														<div class="col-lg-3">
															<i class="fas fa-search-location fs-3" title="Reference Name"></i>
															<!-- <i class="fas fa-file-invoice fs-6" title="Reference Name"></i> -->
															<label class="col-form-label fw-bold fs-6" title="Reference Name"><?php echo $property_view->ref_name; ?></label>
														</div>
														<!-- <label class="col-lg-2 col-form-label fw-semibold fs-6">Property Type</label> -->
														<div class="col-lg-4" title="Latitude Longitude">
															<i class="bi bi-geo-alt-fill fs-4 me-2"></i>
															<label class="col-form-label fw-bold fs-6"><?php echo $property_view->lattitude; ?></label>&nbsp;
															<label class="col-form-label fw-bold fs-6"><?php echo $property_view->longtitude; ?></label>
														</div>
														
														
													</div>
											     </div>
												<div class="col-lg-2">
													<div class="row">
													<div class="col-lg-4 fv-row">
															<div class="col-lg-4 fv-row">
																<div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url(assets/images/Party.jpg)">
																	<?php
																	if($party_details->PHOTO!='')
																         {
																         $div='<img src="data:image/jpg;charset=utf8;base64,'.base64_encode($party_details->PHOTO).'"  height="125px" width="125px">';
																         }
																         else
																         {
																          $div='<img src="'.base_url().'assets/images/party.jpg" height="125px" width="125px" >';
																         }
																         echo $div;
																	?>
																</div>
															</div>
														</div>
													</div>
												</div>
										</div>
										<div class="row">
											<div class="col-lg-4" title="Plot Area">
															<svg version="1.1" id="Uploaded to svgrepo.com" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" 
																 width="30px" height="30px" viewBox="0 0 32 32" xml:space="preserve"><title>Plot Area</title><style type="text/css">.blueprint_een{fill:#3A3A5D;}.st0{fill:#3A3A5D;}</style>
															<path class="blueprint_een" d="M20,8H8v5h1v4.586l-3-3l-5,5V29h18V13h1V8z M8.585,20H3.414L6,17.414L8.585,20z M7,27H6v-2h1V27z
																 M8,27v-3H5v3H3v-6h7v6H8z M15,27h-2v-2h2V27z M17,27h-1v-3h-4v3h-1V12h6V27z M18,11h-8v-1h8V11z M16,19h-4v4h4V19z M15,22h-2v-2h2
																V22z M16,14h-4v4h4V14z M15,17h-2v-2h2V17z M19,7h-1V6h1V7z M19,5h-1V4h1V5z M20,4h1v1h-1V4z M22,4h1v1h-1V4z M24,4h1v1h-1V4z M26,4
																h1v1h-1V4z M28,4h1v1h-1V4z M31,4v1h-1V4H31z M30,6h1v1h-1V6z M30,8h1v1h-1V8z M30,10h1v1h-1V10z M30,12h1v1h-1V12z M30,14h1v1h-1
																V14z M30,16h1v1h-1V16z M30,18h1v1h-1V18z M30,20h1v1h-1V20z M30,22h1v1h-1V22z M30,24h1v1h-1V24z M30,26h1v1h-1V26z M30,28h1v1h-1
																V28z M28,28h1v1h-1V28z M26,28h1v1h-1V28z M24,28h1v1h-1V28z M22,28h1v1h-1V28z M20,28h1v1h-1V28z"/>
															</svg>&nbsp;
														<!-- <label class="col-lg-2 col-form-label fs-6 fw-semibold">Plot Area</label> -->
															<!-- <i class="fas fa-clone"></i> -->
															<i class="fas fa-list-ol fs-4"></i>&nbsp;
															<label class="col-form-label fs-6 fw-bold" title="Number of Plot Area"><?php echo $property_view->ploat_no; ?></label>&nbsp;
															<i 	class="fas fa-layer-group fs-6" title="Type of Plot Area"></i>&nbsp;
															<label class="col-form-label fw-bold fs-6" title="Type of Plot Area"><?php echo $property_view->ploat_type; ?></label>&nbsp;
															<i class="fas fa-money-bill-wave fs-6" title="Per Price of Plot Area"></i>&nbsp;
															<label class="col-form-label fw-bold fs-6" title="Per Price of Plot Area"><?php echo $property_view->price_per_ploat; ?></label>
														</div>
														<div class="col-lg-4" title="Sale Plot Area">
															<svg version="1.1" id="Uploaded to svgrepo.com" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" 
																 width="30px" height="30px" viewBox="0 0 32 32" xml:space="preserve"><title>Sale Plot Area</title><style type="text/css">.blueprint_een{fill:#3A3A5D;}.st0{fill:#3A3A5D;}</style>
															<path class="blueprint_een" d="M20,8H8v5h1v4.586l-3-3l-5,5V29h18V13h1V8z M8.585,20H3.414L6,17.414L8.585,20z M7,27H6v-2h1V27z
																 M8,27v-3H5v3H3v-6h7v6H8z M15,27h-2v-2h2V27z M17,27h-1v-3h-4v3h-1V12h6V27z M18,11h-8v-1h8V11z M16,19h-4v4h4V19z M15,22h-2v-2h2
																V22z M16,14h-4v4h4V14z M15,17h-2v-2h2V17z M19,7h-1V6h1V7z M19,5h-1V4h1V5z M20,4h1v1h-1V4z M22,4h1v1h-1V4z M24,4h1v1h-1V4z M26,4
																h1v1h-1V4z M28,4h1v1h-1V4z M31,4v1h-1V4H31z M30,6h1v1h-1V6z M30,8h1v1h-1V8z M30,10h1v1h-1V10z M30,12h1v1h-1V12z M30,14h1v1h-1
																V14z M30,16h1v1h-1V16z M30,18h1v1h-1V18z M30,20h1v1h-1V20z M30,22h1v1h-1V22z M30,24h1v1h-1V24z M30,26h1v1h-1V26z M30,28h1v1h-1
																V28z M28,28h1v1h-1V28z M26,28h1v1h-1V28z M24,28h1v1h-1V28z M22,28h1v1h-1V28z M20,28h1v1h-1V28z"/>
															</svg>&nbsp;
															<!-- <i class="fas fa-clone"></i> -->
															<i class="fas fa-list-ol fs-4"></i>&nbsp;
															<label class="col-form-label fs-6 fw-bold" title="Number of Plot Area"><?php echo $ploat_total; ?></label>&nbsp;
															<i 	class="fas fa-layer-group fs-6" title="Type of Plot Area"></i>&nbsp;
															<label class="col-form-label fw-bold fs-6" title="Type of Plot Area"><?php echo $property_view->ploat_type; ?></label>&nbsp;
															<i class="fas fa-money-bill-wave fs-6" title="Total Sale Price"></i>&nbsp;
															<label class="col-form-label fw-bold fs-6" title="Sale Per Price of Plot Area"><?php echo $total_amount; ?></label>
														</div>
											
											<div class="col-lg-4 col-form-label" title="Address">
													<div class="row">
														<div class="col-lg-2">
															<span class="fs-4">
														<svg width="28px" height="28px" class="fw-bold" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg">
															<title>Address</title>><style type="text/css">.st0{fill:none;stroke:#3A3A5D;stroke-width:2;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;}</style>
															<g id="Direction">
															<path d="M18.091,26.344a1.995,1.995,0,0,0-.689-1.456,2.1117,2.1117,0,0,0-2.834,0,1.995,1.995,0,0,0-.689,1.456,2.7129,2.7129,0,0,0-2.522,2.704v.65h9.256v-.65A2.7129,2.7129,0,0,0,18.091,26.344Z" style="fill:#3A3A5D"/>
															<polygon points="13.268 9.925 13.268 6.194 8.211 6.194 6.157 8.053 8.211 9.925 13.268 9.925" style="fill:#3A3A5D"/>
															<polygon points="23.863 10.211 18.702 10.211 18.702 13.955 23.863 13.955 25.943 12.083 23.863 10.211" style="fill:#3A3A5D"/>
															<polygon points="13.268 14.228 8.211 14.228 6.157 16.1 8.211 17.972 13.268 17.972 13.268 14.228" style="fill:#3A3A5D"/>
															<path d="M14.568,6.805V23.354a3.3738,3.3738,0,0,1,2.834,0V6.818a3.2831,3.2831,0,0,1-1.417.325A3.1179,3.1179,0,0,1,14.568,6.805Z" style="fill:#3A3A5D"/>
															<path d="M15.985,5.843a1.8952,1.8952,0,0,0,1.417-.624,1.86,1.86,0,0,0,.52-1.3,1.937,1.937,0,0,0-3.874,0,1.86,1.86,0,0,0,.52,1.3A1.8952,1.8952,0,0,0,15.985,5.843Z" style="fill:#3A3A5D"/>
															</g>
														</svg>
													</span>
														</div>
														<div class="col-lg-10">
															<label class="fw-bold fs-6"><?php echo $property_view->street; ?>,</label>
													<label class="fw-bold fs-6">&nbsp;<?php echo $property_view->area;   ?>,</label>
													<label class="fw-bold fs-6">&nbsp;<?php echo $property_view->city;   ?>,</label>
													<label class="fw-bold fs-6">&nbsp;<?php echo $property_view->pincode;   ?>,</label>
													<label class="fw-bold fs-6">&nbsp;<?php echo $property_view->state; ?>.</label>
														</div>
													</div>
												</div>


										</div>
											<div class="row">
												
												<div class="col-lg-4" title="Property Amount">
													<label>
														<i class="fas fa-money-bill-alt fs-2"></i>&emsp;
													</label>
													<label class="col-form-label fw-bold fs-6">
														<?php echo $property_view->pro_amount; ?>
													</label>
												</div>
												<div class="col-lg-4" title="Property Total Amount">
													<label>
														<i class="fas fa-money-bill-alt fs-2"></i>&emsp;
													</label>
													<label class="col-form-label fw-bold fs-6">
														<?php echo $property_view->total_property_amount; ?>
													</label>
												</div>

												<div class="col-lg-4">
													<div class="row">
														<div class="col-lg-2">
															
															<label class="col-form-label fw-semibold fs-6">
													<svg width="22px" height="22px" version="1.1" id="Icons" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 32 32" xml:space="preserve"><title>Amenitites</title><style type="text/css">.st0{color:#3A3A5D;fill:none;stroke:#3A3A5D;stroke-width:2;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;}</style><polyline class="st0" points="11,31 11,10 21,10 21,31 "/><polyline class="st0" points="21,31 21,16 30,16 30,31 "/><polyline class="st0" points="2,31 2,21 11,21 11,31 "/><rect x="12" y="7" class="st0" width="8" height="3"/><rect x="14" y="4" class="st0" width="4" height="3"/><line class="st0" x1="16" y1="1" x2="16" y2="4"/><line class="st0" x1="14" y1="14" x2="18" y2="14"/><line class="st0" x1="3" y1="25" x2="7" y2="25"/><line class="st0" x1="3" y1="29" x2="7" y2="29"/><line class="st0" x1="14" y1="18" x2="18" y2="18"/><line class="st0" x1="14" y1="22" x2="18" y2="22"/><line class="st0" x1="14" y1="26" x2="18" y2="26"/><line class="st0" x1="14" y1="30" x2="18" y2="30"/><line class="st0" x1="24" y1="20" x2="24" y2="21"/><line class="st0" x1="27" y1="20" x2="27" y2="21"/><line class="st0" x1="24" y1="24" x2="24" y2="25"/><line class="st0" x1="27" y1="24" x2="27" y2="25"/><line class="st0" x1="24" y1="28" x2="24" y2="29"/><line class="st0" x1="27" y1="28" x2="27" y2="29"/></svg>&emsp;</label>
														</div>
													
														<div class="col-lg-10">
													<label class="col-form-label fw-bold fs-6"><?php $values= json_decode($property_view->amenities); foreach ($values as  $val) {?>
														<span><?php echo $val ?></span><span>,</span>

													<?php } ?> </label>
												</div>

													</div>
												</div>
											</div>
												<div class="row">
												
										
											
												
												</div>
												<div class="col-lg-8 mt-4">
													<span class="me-3">
														<svg width="23px" height="23px" viewBox="0 0 24 24" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
														    <!-- Uploaded to: SVG Repo, www.svgrepo.com, Generator: SVG Repo Mixer Tools -->
														    <title>Description</title><style type="text/css">.st0{color:#3A3A5D;fill:none;stroke:#3A3A5D;stroke-width:2;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;}</style><g id="🔍-System-Icons" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><g id="ic_fluent_text_description_24_filled" fill="#212121" fill-rule="nonzero"><path d="M3,17 L15,17 C15.5522847,17 16,17.4477153 16,18 C16,18.5128358 15.6139598,18.9355072 15.1166211,18.9932723 L15,19 L3,19 C2.44771525,19 2,18.5522847 2,18 C2,17.4871642 2.38604019,17.0644928 2.88337887,17.0067277 L3,17 L15,17 L3,17 Z M3,13 L21,13 C21.5522847,13 22,13.4477153 22,14 C22,14.5128358 21.6139598,14.9355072 21.1166211,14.9932723 L21,15 L3,15 C2.44771525,15 2,14.5522847 2,14 C2,13.4871642 2.38604019,13.0644928 2.88337887,13.0067277 L3,13 L21,13 L3,13 Z M3,9 L21,9 C21.5522847,9 22,9.44771525 22,10 C22,10.5128358 21.6139598,10.9355072 21.1166211,10.9932723 L21,11 L3,11 C2.44771525,11 2,10.5522847 2,10 C2,9.48716416 2.38604019,9.06449284 2.88337887,9.00672773 L3,9 L21,9 L3,9 Z M3,5 L21,5 C21.5522847,5 22,5.44771525 22,6 C22,6.51283584 21.6139598,6.93550716 21.1166211,6.99327227 L21,7 L3,7 C2.44771525,7 2,6.55228475 2,6 C2,5.48716416 2.38604019,5.06449284 2.88337887,5.00672773 L3,5 L21,5 L3,5 Z" id="🎨-Color">
															</path></g></g>
														</svg>
													</span>
													<label class="col-form-label fw-bold fs-6" title="Description"><?php echo $property_view->description; ?></label>
												</div>
											</div>
												

									    		<?php  if(isset($purchase_view[0])){ ?>
											    	<div class="row mt-2 ">
									                    <label class="col-form-label fw-bold fs-2 text-start">Purchase Payment Information</label>
															<div class="row">
															<table id="purchase_table_scroll" class="table align-middle table-row-dashed table-striped table-hover fs-7 gy-1 gs-2">
															    <thead> 
															        <tr class="fw-bold fs-6 text-gray-600">
															        	<th class="min-w-50px">Sno</th>
																		<th class="min-w-50px">Date</th>
																		<th class="min-w-100px">Receipt ID</th>
																		<th class="min-w-100px">Purchase ID</th>
																		<th class="min-w-100px">Net Amount</th>
																		<th class="min-w-80px">Paid Amount</th>
																		<th class="min-w-80px">Balance Amount</th>
															        </tr>
															    </thead>
															    <tbody class="text-gray-600 fw-semibold fs-6 ">
															    	
                             	   <?php $i=1; foreach($purchase_view as $plist){ 

																	$date=date('d-m-Y',strtotime($plist['receipt_date']));
																	?>	
																 <tr>
																 	<td><?php echo $i; ?></td>
																 	<td><?php $date_format  = $this->db->query("SELECT * FROM general_settings ")->row();
							                                             $format= $date_format->date_format;
							                                             echo date("$format", strtotime($date));
							                                        	?></td>
																 	<td><?php echo $plist['recepit_id'];?></td>
																 	<td><?php echo $plist['property_id'];?></td>
																 	<td>
																 		<?php $net_amount = $plist['net_amount']; echo number_format($net_amount,2,'.',',');?>
																 	</td>
																 	<td><?php $cr_paid_amount = $plist['cr_paid_amount']; echo number_format($cr_paid_amount,2,'.',',');?></td>
																 	<td><?php $pro_amount = $plist['cr_balance_amount']; echo number_format($pro_amount,2,'.',',');?></td>   
																 </tr>
                                 		<?php $i++; }?>

													    	</tbody>
														</table>
													</div>
												
																	
												 </div>	
												 <?php }?>
												 <?php  if(isset($sales_payment_view[0])){ ?>
											    	<div class="row mt-2 ">
											    		

									                    <label class="col-form-label fw-bold fs-2 text-start">Sale Payment Information</label>
															<div class="row">
															<table id="sales_table_scroll" class="table align-middle table-row-dashed table-striped table-hover fs-7 gy-1 gs-2">
															    <thead> 
															        <tr class="fw-bold fs-6 text-gray-600">
															        <th class="min-w-50px">Sno</th>
																		<th class="min-w-50px">Date</th>
																		<th class="min-w-50px">Receipt ID</th>
																		<th class="min-w-50px">Sale ID</th>
																		<!-- <th class="min-w-50px">Party Name</th> -->
																		<th class="min-w-100px">Net Amount</th>
																		<th class="min-w-100px">Paid Amount</th>
																		<th class="min-w-80px">Balance Amount</th>
															        </tr>
															    </thead>
															    <tbody class="text-gray-600 fw-semibold fs-6 ">
															    	
                                 	  <?php foreach($sales_payment_view as $i=> $slist){ 

				                             $date=date('d-m-Y',strtotime($slist['receipt_date'])); ?>

																<tr>
																	<td><?php echo $i+1; ?></td>
																 	<td>
																 		<?php $date_format  = $this->db->query("SELECT * FROM general_settings ")->row();
							                                             $format= $date_format->date_format;
							                                             echo date("$format", strtotime($date));
							                                        	?>
																 	</td>
																 	<td><?php echo $slist['recepit_id'];?></td>
																 	<td><?php echo $slist['property_id'];?></td>
																 	<!-- <td><?php echo $party_name_get;?></td> -->

																 	<td>
																 		<?php $net_amount = $slist['net_amount']; echo number_format($net_amount,2,'.',',');?>
																 	</td>
																 	<td><?php $cr_paid_amount = $slist['cr_paid_amount']; echo number_format($cr_paid_amount,2,'.',',');?></td>
																 	<td><?php $pro_amount = $slist['cr_balance_amount']; echo number_format($pro_amount,2,'.',',');?></td>
			   													</tr>
				                                         		<?php $i++; }
				                                         		?>

													    	</tbody>
														</table>
													</div>
												
																	
												 </div>	
												 <?php }?>
											<!--end::Table-->
										</div>
									<?php } ?>
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
		<input type="hidden" id="baseurl" value="<?php echo base_url(); ?>">
		<?php $this->load->view("script");?>
		<script src="<?php echo base_url(); ?>assets/plugins/custom/fslightbox/fslightbox.bundle.js"></script>
		<!-- <script src="js/products-list.js"></script> -->
		<script>
			$("#sales_table_scroll").DataTable({
				//"aaSorting":[],
				"sorting":false,
				"paging": false,
				// "responsive": true,
				 "language": {
				  "lengthMenu": "Show _MENU_",
				 },
				 "dom":
				  "<'row'" +
				  // "<'col-sm-6 d-flex align-items-center justify-conten-start'i>" +
				  ">" +

				  "<'table-responsive'tr>" +

				  "<'row'" +
				  // "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'li>" +
				  // "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'1p>" +
				  ">"
				});
			$('#sales_table_scroll').wrap('<div class="dataTables_scroll" />');
		</script>
		<script>
			$("#purchase_table_scroll").DataTable({
				//"aaSorting":[],
				"sorting":false,
				"paging": false,
				// "responsive": true,
				 "language": {
				  "lengthMenu": "Show _MENU_",
				 },
				 "dom":
				  "<'row'" +
				  // "<'col-sm-6 d-flex align-items-center justify-conten-start'i>" +
				  ">" +

				  "<'table-responsive'tr>" +

				  "<'row'" +
				  // "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'li>" +
				  // "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'1p>" +
				  ">"
				});
			$('#purchase_table_scroll').wrap('<div class="dataTables_scroll" />');
		</script>
		
	</body>
	<!--end::Body-->
</html>