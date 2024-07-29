<?php $this->load->view("common");?>
<style>
	.dataTables_scroll
    {
        position: relative;
        overflow: auto;
        max-height: 218px;/*the maximum height you want to achieve*/
        width: 100%;
    }
  .dataTables_scroll thead{
    position: -webkit-sticky;
    position: sticky;
    top: 0;
/*   background-color: #ec9629;*/
		background-color: #ec9629 !important;
    z-index: 2;
  }
  #cs_name #down{
		  display: none;
			}
	#cs_name:hover #down{
	  display: block;
	  position: absolute;
	  margin-top: 0.2em;
	  margin-left: -0.7em !important;
	  color: white;
	  background: black;
	  padding: 3px 13px 3px 10px;
	  border-radius: 5px;
	  font-size: 14px;
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
									<h1 class="d-flex align-items-center text-dark fw-bold my-1 fs-3">Company List
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
                         <a href="javascript:;" class="close" data-dismiss="alert" aria-label="close">×</a>
                        <?php echo $this->session->flashdata('g_success'); ?>
                        </div>
                        <?php } ?>

                        <?php if($this->session->flashdata('g_err')){?>
                        <div class="alert alert-success" id="alertaddmessage">
                         <a href="javascript:;" class="close" data-dismiss="alert" aria-label="close">×</a>
                        <?php echo $this->session->flashdata('g_err'); ?>
                        </div>
                        <?php } ?>
								<!--begin::Card header-->
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
											 	
											<button type="button" class="btn btn-primary"  data-bs-toggle="modal" data-bs-target="#kt_modal_company_add">
											<!--begin::Svg Icon | path: icons/duotune/arrows/arr075.svg-->
											<span class="svg-icon svg-icon-2">
												<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
													<rect opacity="0.5" x="11.364" y="20.364" width="16" height="2" rx="1" transform="rotate(-90 11.364 20.364)" fill="currentColor" />
													<rect x="4.36396" y="11.364" width="16" height="2" rx="1" fill="currentColor" />
												</svg>
											</span>
											<!--end::Svg Icon-->New Company</button>
											<!--end::Add user-->
										</div>
									<!--end::Toolbar-->
								
									</div>
									<!--end::Card toolbar-->
								</div>
								<!--end::Card header-->

								<!--begin::Card body-->
								<div class="card-body py-4">
									<!--begin::Table-->
									<table id="company_list"  class="table align-middle table-row-dashed table-striped table-hover fs-7 gy-1 gs-2 dataTable">
										<!--begin::Table head-->
										<thead>
											<!--begin::Table row-->
											<tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">
													
												<th class="min-w-175px">Company Name </th>
												<th class="min-w-175px">Address</th>
												<th class="min-w-100px">Phone </th>
												<th class="min-w-100px">Email</th>
												<th class="min-w-80px">Business Type</th>
												<th class="min-w-50px">Status</th>
												<th class="min-w-125px"><span class="text-end">Actions</span></th>
											</tr>
											<!--end::Table row-->
										</thead>
										<!--end::Table head-->
										<!--begin::Table body-->
										<tbody class="text-gray-600 fw-semibold">
											<!--begin::Table row-->
											<?php $i=1; if(isset($c_settings )){foreach($c_settings as $company_settings) { ?>
											<tr> 
												<td class="d-flex align-items-center"> 

													<?php $image_url =  base_url().'assets/images/company_logo/'. $company_settings['COMPANY_LOGO']; if(@getimagesize($image_url)){?> 
														<div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
															<a class="d-block overlay"  href="<?php echo base_url(); ?>assets/images/company_logo/<?php echo $company_settings['COMPANY_LOGO']; ?>" data-fslightbox="lightbox-basic">
															    <!--begin::Image-->
															    <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded w-35px h-35px"
															    style="background-image:url('<?php echo base_url(); ?>assets/images/company_logo/<?php echo $company_settings['COMPANY_LOGO']; ?>')">
															    </div>
															    <!--end::Image-->
															    <!--begin::Action-->
															    <div class="overlay-layer card-rounded bg-dark bg-opacity-25 shadow w-35px h-35px">
															        <i class="bi bi-eye-fill text-white fs-2"></i>
															    </div>
															    <!--end::Action-->
													  		</a>
													  	</div>
					                              <?php }else{?>
					                              	<div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
						                                <a href="javascript:;" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm"  >
							                      			<div class="image-input" data-kt-image-input="true">
																<img src="assets/images/favicon_agb.jpg" class="w-100" />
															</div>
													  </a> 
													</div>
													<?php }?>		
													 <!--begin::User details-->
														<div class="d-flex flex-column">
															<a href="javascript:;" class="text-gray-800 text-hover-primary mb-1">
																<?php echo  $company_settings['LOGINCODE']?$company_settings['LOGINCODE']:'' ?><br><?php echo $company_settings['COMPANYNAME']; ?></a>

															
														</div>
													<!--begin::User details-->
												</td>
												<!--end::User=-->
												<!--begin::city=-->
												<td class="ple1">
													<?php 
													  $add1    =  $company_settings['ADDRESS1']?$company_settings['ADDRESS1']:'';
													  $add2    =  $company_settings['ADDRESS2']?$company_settings['ADDRESS2']:'';
													  $city    =  $company_settings['CITY']?$company_settings['CITY']:'';;
													  $state   =  $company_settings['STATE']?$company_settings['STATE']:'';;
													  $pincode =  $company_settings['PINCODE']?$company_settings['PINCODE']:'';;
													  $address = $add1.','.$add2.','.$city.','.$state.'-'.$pincode;
													?>

													<?php echo $address; ?></td>
												<!--end::city=-->
												<!--begin::Phone=-->
												<td class="ple1">
													<?php echo $company_settings['PHONE']; ?>
												</td>
												<!--end::Phone=-->
												<!--begin::email=-->
												<td class="ple1"><?php echo $company_settings['EMAIL']; ?></td>
												<!--end::email=-->
												<!--begin::Joined-->
												<td>
													<?php 
														if($company_settings['BUSINESS_TYPE']==0){
															echo "Jewel Business"; 
														}
														else if($company_settings['BUSINESS_TYPE']==2)  {
															echo "Others Business";
														}
														else if($company_settings['BUSINESS_TYPE']==1)  {
															echo "Loan Business";
														}else{
															echo "-";
														}
													?>
														
												</td>
												<!--begin::Joined-->
												<td>
													<label class="form-check form-switch form-check-custom form-check-solid">
															<input class="form-check-input w-35px h-20px" type="checkbox" id="activeunactive_<?php echo $i;?>"  name="activeunactive_<?php echo $i;?>" onchange="activeunactive('<?php echo $company_settings['COMPANYCODE']; ?>',<?php echo $i; ?>)" value=
															<?php 
															if($company_settings['ACTIVE']=='Y')
															{ echo "'1' checked='checked'";}
															else if($company_settings['ACTIVE']=='N')
															{ echo "'0'";}
															?> 
															 >
													</label>
													
												</td>
												<!--begin::Action=-->
												<td>
													<span class="text-end">
													<a href="" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm" data-bs-toggle="modal" data-bs-target="#kt_modal_view_company" onclick="company_view('<?php echo $company_settings['COMPANYCODE']; ?>')">
														<i class="bi bi-eye-fill eyc"></i>
													</a>
													<a href="editcompany.php" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1" data-bs-toggle="modal" data-bs-target="#kt_modal_edit_company" onclick="company_edit('<?php echo $company_settings['COMPANYCODE']; ?>')">
																		<!--begin::Svg Icon | path: icons/duotune/art/art005.svg-->
																		<span class="svg-icon svg-icon-3">
																			<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																				<path opacity="0.3" d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z" fill="currentColor"></path>
																				<path d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z" fill="currentColor"></path>
																			</svg>
																		</span>
																		<!--end::Svg Icon-->
																	</a>
																	<?php if ($company_settings['COMPANYCODE']!='003'){ ?>
																	<a href="javascript:;" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm" data-bs-toggle="modal" data-bs-target="#kt_modal_delete_company" onclick="company_delete('<?php echo $company_settings['COMPANYCODE'];?>')">
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
																<?php } ?>
													</span>
												</td>
												<!--end::Action=-->
											</tr>
											<!--end::Table row-->
											<?php  $i++; } } ?>
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
		<!--begin::Modal - add company-->
		<div class="modal fade" id="kt_modal_company_add" tabindex="-1" aria-hidden="true" data-bs-backdrop="static">
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
					<?php $this->load->view("script");?>
					<!--begin::Modal body-->
					<form name="company_add_form" id="company_add_form" method="POST" action="<?php echo base_url(); ?>Company/company_save" enctype="multipart/form-data" onsubmit="return company_validation();">

						<?php
							$qry=$this->db->query("SELECT TOP 1 COMPANYCODE FROM COMPANY ORDER BY COMPANYCODE DESC");
							$res=$qry->row();
							$last_data= $res->COMPANYCODE;
	                        $next_value = (int)$last_data + 1;
	                        $c_no1=str_pad($next_value,3,0,STR_PAD_LEFT);
						?>
						<input type="hidden" id="company_id" name="company_id" value="<?php echo $c_no1;?>">
							<div class="modal-body pt-0 pb-15 px-5 px-xl-20">
								<!--begin::Heading-->
								<div class="mb-13 text-center">
									<h1 class="mb-3">New Company</h1>
								</div>
								<!--end::Heading-->
								<div class="row mb-6">	
									<label class="col-lg-1 col-form-label required fw-semibold fs-6"> Name</label>
									<!--end::Label-->
									<!--begin::Col-->
									<div class="col-lg-3 fv-row fv-plugins-icon-container">
										
										<input type="text" name="company_name" id="company_name"  class="form-control form-control-lg form-control-solid" placeholder="Company Name"  onkeyup="company_unique(this.value);" >
										<div class="fv-plugins-message-container invalid-feedback" id="company_err"></div>
									</div>
									<!--end::Col-->
									
									<!--begin::Label-->
									<label class="col-lg-1 col-form-label required fw-semibold fs-6">Address&nbsp;1</label>
									<!--end::Label-->
									<!--begin::Col-->
									<div class="col-lg-3 fv-row fv-plugins-icon-container">
										<input type="text" name="address1" id="address1" class="form-control form-control-lg form-control-solid" placeholder="Company Address" >
										<div class="fv-plugins-message-container invalid-feedback" id="address1_err"></div>
									</div>
									<!--end::Col-->
									<!--begin::Label-->
									<div class="col-lg-1">
									<label class=" col-form-label required fw-semibold fs-6">Address&nbsp;2</label>
									</div>
									<!--end::Label-->
									<!--begin::Col-->
									<div class="col-lg-3 fv-row fv-plugins-icon-container">
										<input type="text" name="address2" id="address2" class="form-control form-control-lg form-control-solid" placeholder="Company Address" >
										<div class="fv-plugins-message-container invalid-feedback" id="address2_err"></div>
									</div>
									<!--end::Col-->
									<!--begin::Label-->
									<label class="col-lg-1 col-form-label required fw-semibold fs-6">State</label>
									<!--end::Label-->
									<!--begin::Left Section-->
									<div class="col-lg-3">
									<!--begin::Select-->
										<select id="state" name="state" data-dropdown-parent="#kt_modal_company_add" data-control="select2" class="form-select form-select-solid form-select-lg fs-6" onchange="state_change()"  >
											<option value="">Select State</option>
											<option value="Andra Pradesh">Andra Pradesh</option>
											<option value="Arunachal Pradesh">Arunachal Pradesh</option>
											<option value="Assam">Assam</option>
											<option value="Bihar">Bihar</option>
											<option value="Chhattisgarh">Chhattisgarh</option>
											<option value="Goa">Goa</option>
											<option value="Gujarat">Gujarat</option>
											<option value="Haryana">Haryana</option>
											<option value="Himachal Pradesh">Himachal Pradesh</option>
											<option value="Jammu and Kashmir">Jammu and Kashmir</option>
											<option value="Jharkhand">Jharkhand</option>
											<option value="Karnataka">Karnataka</option>
											<option value="Kerala">Kerala</option>
											<option value="Madya Pradesh">Madya Pradesh</option>
											<option value="Maharashtra">Maharashtra</option>
											<option value="Manipur">Manipur</option>
											<option value="Meghalaya">Meghalaya</option>
											<option value="Mizoram">Mizoram</option>
											<option value="Nagaland">Nagaland</option>
											<option value="Orissa">Orissa</option>
											<option value="Punjab">Punjab</option>
											<option value="Rajasthan">Rajasthan</option>
											<option value="Sikkim">Sikkim</option>
											<option value="Tamil Nadu">Tamil Nadu</option>
											<option value="Telangana">Telangana</option>
											<option value="Tripura">Tripura</option>
											<option value="Uttaranchal">Uttaranchal</option>
											<option value="Uttar Pradesh">Uttar Pradesh</option>
											<option value="West Bengal">West Bengal</option>
											<option disabled style="background-color:#aaa; color:#fff">UNION Territories</option>
											<option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
											<option value="Chandigarh">Chandigarh</option>
											<option value="Dadar and Nagar Haveli">Dadar and Nagar Haveli</option>
											<option value="Daman and Diu">Daman and Diu</option>
											<option value="Delhi">Delhi</option>
											<option value="Lakshadeep">Lakshadeep</option>
											<option value="Pondicherry">Pondicherry</option> 
										</select>
										<!--end::Select-->
										<div class="fv-plugins-message-container invalid-feedback" id="state_err"></div>
									</div>												
									<!--begin::Label-->
									<label class="col-lg-1 col-form-label required fw-semibold fs-6">City</label>
									<!--end::Label-->
									<!--begin::Left Section-->
									<div class="col-lg-3">
									<!--begin::Select-->
											<select id="city" name="city" data-dropdown-parent="#kt_modal_company_add"  aria-label="Select a Currency" data-control="select2" class="form-select form-select-solid form-select-lg fs-6" onchange="city_change()" >
												<option value="">Select City</option>
											</select>
										<!--end::Select-->
										<div class="fv-plugins-message-container invalid-feedback" id="city_err"></div>
									</div>
									<!--end::Left Section-->
									<!--begin::Label-->
									<label class="col-lg-1 col-form-label required fw-semibold fs-6">Pincode</label>
									<!--end::Label-->
									<!--begin::Col-->
									<div class="col-lg-3 fv-row fv-plugins-icon-container">
										<input type="text" name="pincode" id="pincode" class="form-control form-control-lg form-control-solid" placeholder="Pincode" >
										<div class="fv-plugins-message-container invalid-feedback" id="pincode_err"></div>
									</div>
									<!--end::Col-->
									
									<!--begin::Label-->
									<label class="col-lg-1 col-form-label required fw-semibold fs-6">Phone</label>
									<!--end::Label-->
									<!--begin::Col-->
									<div class="col-lg-3 fv-row fv-plugins-icon-container">
										<input type="text" name="phone" id="phone" class="form-control form-control-lg form-control-solid" placeholder="Phone No" >
										<div class="fv-plugins-message-container invalid-feedback" id="phone_err"></div>
									</div>
									<!--end::Col-->
									
									<!--begin::Label-->
									<label class="col-lg-1 col-form-label required fw-semibold fs-6">Email</label>
									<!--end::Label-->
									<!--begin::Col-->
									<div class="col-lg-3 fv-row fv-plugins-icon-container">
										<input type="text"  name="email" id="email"  class="form-control form-control-lg form-control-solid" placeholder="Enter Email ID" >
										<div class="fv-plugins-message-container invalid-feedback" id="email_err"></div>
									</div>
									<!--end::Col-->
									
									<!--begin::Label-->
									<label class="col-lg-1 col-form-label required fw-semibold fs-6">Pan No</label>
									<!--end::Label-->
									<!--begin::Col-->
									<div class="col-lg-3 fv-row fv-plugins-icon-container">
										<input type="text" name="pan_no" id="pan_no"  class="form-control form-control-lg form-control-solid" placeholder="PAN No" >
										<div class="fv-plugins-message-container invalid-feedback" id="pan_no_err"></div>
									</div>
									<!--end::Col-->
									<!--begin::Label-->
									<label class="col-lg-1 col-form-label required fw-semibold fs-6">GSTIN</label>
									<!--end::Label-->
									<!--begin::Col-->
									<div class="col-lg-3 fv-row fv-plugins-icon-container">
										<input type="text" name="gst_no" id="gst_no" maxlength="15"  class="form-control form-control-lg form-control-solid" placeholder="GST No" >
										<div class="fv-plugins-message-container invalid-feedback" id="gst_no_err"></div>
									</div>
									<!--end::Col-->
									<!--begin::Label-->
									<label class="col-lg-1 col-form-label required fw-semibold fs-6">Reg.No</label>
									<!--end::Label-->
									<!--begin::Col-->
									<div class="col-lg-3 fv-row fv-plugins-icon-container">
										<input type="text" name="reg_no" id="reg_no"  class="form-control form-control-lg form-control-solid" placeholder="Reg. No" >
										<div class="fv-plugins-message-container invalid-feedback" id="reg_no_err"></div>
									</div>
									<!--end::Col-->
									<!--begin::Label-->
									<label class="col-lg-1 col-form-label required fw-semibold fs-6">B.Type</label>
									<!--end::Label-->
									<!--begin::Col-->
									<div class="col-lg-3 fv-row fv-plugins-icon-container">
										<!--begin::Select-->
										<select class="form-select form-select-solid" data-dropdown-parent="#kt_modal_company_add" data-control="select2"  data-hide-search="false" id="btype" name="btype" >
											<option value="" selected="">Select Business Type</option>
											<option value="0">Jewel Business</option>
											<option value="1">Loan Business</option>
											<option value="2">Other Business</option>
											
										</select>
										<div class="fv-plugins-message-container invalid-feedback" id="btype_err"></div>
										<!--end::Select-->
									</div>
									<!--end::Col-->												
								</div>
								<div class="row mt-2">
									<div class="col-lg-4">
										<div class="row">
											<div class="col-lg-3"> 
												<div class="row">

													<div class="col-lg-9">
														<label class=" col-form-label fw-semibold fs-6" id="cs_name">
														 <span class="">S.Name</span>
														</label>
													</div>
													<div class="col-lg-3">
														<label class="fw-semibold fs-6 required" id="cs_name" > 
													   		<span class="text-dark"><i class="fa fa-circle-info fs-7"></i></span>
															<span id="down">Ex:AGB</span>
														</label>
													</div>
												</div>
												
											</div>
											<div class="col-lg-9"> 
												<div class="">
													<input type="text" name="code" id="code" class="form-control form-control-lg form-control-solid" placeholder="Company Short Name" value="" maxlength="5">

													<div class="fv-plugins-message-container invalid-feedback" id="code_err"></div>
												</div>
											</div>
										</div>
									</div>
									<label class="col-lg-1 col-form-label required fw-semibold fs-6">Logo</label>								
									<div class="col-lg-3">
										<!--begin::Image input-->
										<div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url('assets/media/svg/avatars/blank.svg')">
											<!--begin::Preview existing avatar-->
											<div class="image-input-wrapper w-125px h-125px" style="background-image: url(assets/media/svg/avatars/blank.svg)"></div>
											<!--end::Preview existing avatar-->
											<!--begin::Label-->
											<label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" data-kt-initialized="1">
												<i class="bi bi-pencil-fill fs-7"></i>
												<!--begin::Inputs-->
												<input type="file" name="company_logo"  id="company_logo" value="" accept=".png, .jpg, .jpeg" >
												<input type="hidden" name="avatar_remove" required>
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
										<div class="fv-plugins-message-container invalid-feedback" id="company_logo_err"></div>
									</div>
								</div>						
								<!--begin::Actions-->
								<div class="row">
									<div class="col-lg-9"></div>
									<div class="col-lg-1">
										<div class="d-flex flex-center flex-row-fluid pt-12">
											<button type="reset" class="btn btn-secondary me-3" data-bs-dismiss="modal">Cancel</button>
										</div>
									</div>
									<div class="col-lg-2">
										<div class="d-flex flex-center flex-row-fluid pt-12">
											<button type="submit" class="btn btn-primary" id="add_submit">Save Changes</button>
										</div>
									</div>
								</div>
								<!--end::Actions-->
							</div>
						</form>
					</div>
					<!--end::Modal content-->
				</div>
			<!--end::Modal dialog-->
		</div>
		<!--end::Modal - add company-->
		<!--begin::Modal - edit company-->
		<div class="modal fade" id="kt_modal_edit_company" tabindex="-1" aria-hidden="true" data-bs-backdrop="static">
				<div class="modal-dialog modal-xl">
					<!--begin::Modal content-->
					<div class="modal-content rounded">
						<!--begin::Modal header-->
						<div class="modal-header justify-content-end border-0 pb-0">
							<!--begin::Close-->
							<div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal"  onclick="closeEditModal();">
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
					
					</div>
					<!--end::Modal content-->
				</div>
		</div>
		<!--end::Modal - edit company-->
		<!--begin::Modal - view company-->
		<div class="modal fade" id="kt_modal_view_company" tabindex="-1" aria-hidden="true" data-bs-backdrop="static">
				<!--begin::Modal dialog-->
				<div class="modal-dialog modal-xl">
					<!--begin::Modal content-->
					<div class="modal-content rounded">
						<!--begin::Modal header-->
						<div class="modal-header justify-content-end border-0 pb-0">
							<!--begin::Close-->
							<div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal" >
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
							<h1 class="mb-3">Company Details</h1>
						</div>
						<!--end::Heading-->
				</div>
				<!--end::Modal content-->
			</div>
			<!--end::Modal dialog-->
			</div>
		</div>
		<!--end::Modal - view company-->
		<!--begin::Modal - delete company-->
		<div class="modal fade" id="kt_modal_delete_company" tabindex="-1" aria-hidden="true" data-bs-backdrop="static">
			
		</div>
		<!--end::Modal - delete company-->
		<input type="hidden" id="baseurl" value="<?php echo base_url();?>">
		<?php $this->load->view("script");?>
		<script>
$('#company_list').DataTable( {
	// "aaSorting": [],
	"ordering": false,
	"responsive": true,
        dom: 'Bfrtip', 
        
        buttons: [
					            {
					            extend: 'copyHtml5',
			                    exportOptions: {columns: [0,1,2,3,4]}
			                },
			                {
			                    extend: 'excelHtml5',
			                    title: 'Company List',
			                    exportOptions: {columns: [0,1,2,3,4]}
			                },
			                {
			                    extend: 'csvHtml5',
			                    title: 'Company List',
			                    exportOptions: {columns: [0,1,2,3,4]}
			                },
			                {
			                    extend: 'pdfHtml5',
			                    title: 'Company List',
			                    exportOptions: {columns: [0,1,2,3,4]}
			                },
                ]
    } );
		</script>
		<script>
	      $("#company_list").kendoTooltip({
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
		<script >
			var title = $('title').text() + ' | ' + 'Company';
			    $(document).attr("title", title);

			function company_edit(val)
			{
				var baseurl= $("#baseurl").val();
				// alert(baseurl);
				$.ajax({
				type: "POST",
				url: baseurl+'Company/company_edit',
				async: false,
				type: "POST",
				data: "id="+val,
				dataType: "html",
				success: function(response)
				{
				$('#kt_modal_edit_company').empty().append(response);
				$('#kt_modal_edit_company').addClass('show');
				//$("#kt_modal_editdept").css("display", "block");
				}
			});
			}
			function company_view(val)
			{
				var baseurl= $("#baseurl").val();
				// alert(baseurl);
				$.ajax({
				type: "POST",
				url: baseurl+'Company/company_view',
				async: false,
				type: "POST",
				data: "id="+val,
				dataType: "html",
				success: function(response)
				{
				$('#kt_modal_view_company').empty().append(response);
				$('#kt_modal_view_company').addClass('show');
				//$("#kt_modal_editdept").css("display", "block");
				}
			});
			}
			function closeViewModal()
			{
				var baseurl= $("#baseurl").val();
				$('#kt_modal_view_company').removeClass('show');
				//$("#kt_modal_update_role").css("display", "none");
				$('.modal-backdrop').removeClass('show');
				window.location.href = baseurl+'Company';
			}
			function closeEditModal()
			{
				var baseurl= $("#baseurl").val();
				$('#kt_modal_edit_company').removeClass('show');
				//$("#kt_modal_update_role").css("display", "none");
				$('.modal-backdrop').removeClass('show');
				window.location.href = baseurl+'Company';
			}
			var berr=0;
			function company_unique(val)
			{
				var baseurl= $("#baseurl").val();
				$.ajax({
					type:"POST",
					url:baseurl+'Company/company_unique',
					data:{'value':val},
					cache: false,
					dataType: "html",
						success: function(result){
						if(result>0)
						{
							$('#company_err').html('Company already exist!');
							$('#add_submit').prop('disabled', true);
							
							berr=1;
						}
						else
						{
							$('#company_err').html('');
							 $('#add_submit').prop('disabled', false);
							berr=0;
						}
					}
				});
			}

			
			function company_validation()
			{
				var err = 0;
				var company_name = $('#company_name').val();

			    if(company_name.trim()==''){
			        $('#company_err').html('Enter company!');
			        err++;
			    }else{
			        //$('#company_err').html('');
			        if(err>0)
					{
						$('#company_err').html('company already exist!');
						err++;
					}
					else
					{
						$('#company_err').html('');
					}
			    }
			    var company_logo = $('#company_logo').val();

			    if(company_logo.trim()==''){
			        $('#company_logo_err').html('Select Company Logo !');
			        err++;
			    }else{			        
						$('#company_logo_err').html('');
					
			    }



			    var state = $('#state').val();

			    if(state.trim()==''){
			        $('#state_err').html('Select State is Required !');
			        err++;
			    }else{			        
						$('#state_err').html('');
					
			    }
			    var city = $('#city').val();

			    if(city.trim()==''){
			        $('#city_err').html('Select City is Required !');
			        err++;
			    }else{			        
						$('#city_err').html('');
					
			    }
			    var email = $('#email').val();

			    if(email.trim()==''){
			        $('#email_err').html('Email is required !');
			        err++;
			    }else{			        
						$('#email_err').html('');
					
			    }
			    var btype = $('#btype').val();

			    if(btype.trim()==''){
			        $('#btype_err').html('Business Type is Required !');
			        err++;
			    }else{			        
						$('#btype_err').html('');
					
			    }
			    var phone = $('#phone').val();

			    if(phone.trim()==''){
			        $('#phone_err').html('Phone Number is Required !');
			        err++;
			    }else{			        
						$('#phone_err').html('');
					
			    }
			    var address1 = $('#address1').val();

			    if(address1.trim()==''){
			        $('#address1_err').html('Address 1 is Required !');
			        err++;
			    }else{			        
						$('#address1_err').html('');
					
			    }
			    var address2 = $('#address2').val();

			    if(address2.trim()==''){
			        $('#address2_err').html('Address 2 is Required !');
			        err++;
			    }else{			        
						$('#address2_err').html('');
					
			    }
			    var pincode = $('#pincode').val();

			    if(pincode.trim()==''){
			        $('#pincode_err').html('Pincode is Required !');
			        err++;
			    }else{			        
						$('#pincode_err').html('');
					
			    }
			    var pan_no = $('#pan_no').val();

			    if(pan_no.trim()==''){
			        $('#pan_no_err').html('Pan Number is Required !');
			        err++;
			    }else{			        
						$('#pan_no_err').html('');
					
			    }
			    var reg_no = $('#reg_no').val();

			    if(reg_no.trim()==''){
			        $('#reg_no_err').html('Register Number is Required !');
			        err++;
			    }else{			        
						$('#reg_no_err').html('');
					
			    }
			    var gst_no = $('#gst_no').val();

			    if(gst_no.trim()==''){
			        $('#gst_no_err').html('Register Number is Required !');
			        err++;
			    }else{			        
						$('#gst_no_err').html('');
					
			    }
			    var code = $('#code').val();

			    if(code.trim()==''){
			        $('#code_err').html('Printer Option Company Code is Required !');
			        err++;
			    }else{			        
						$('#code_err').html('');
					
			    }
			   //  var pcname = $('#pcname').val();

			   //  if(pcname.trim()==''){
			   //      $('#pcname_err').html('Printer Option Company Name is Required !');
			   //      err++;
			   //  }else{			        
						// $('#pcname_err').html('');
					
			   //  }
			   //  var paddress = $('#paddress').val();

			   //  if(paddress.trim()==''){
			   //      $('#paddress_err').html('Printer Option Company Address  is Required !');
			   //      err++;
			   //  }else{			        
						// $('#paddress_err').html('');
					
			   //  }
			    
			    if(err>0){ return false; }else{ return true; }
			}	
			function activeunactive(val,ival) 
			{
				var unactive;
				var unactv;
				// var cid=string(val);
				// alert(cid);
				var baseurl= $("#baseurl").val();
				var a = $("#activeunactive_"+ival).val();
				// alert(a);
				if(a==1) {
					unactive='N';
					unactv="Active"
					// alert(unactive);
				}
				else{
					unactive='Y';
					unactv="In-Active"
					// alert(unactive);
				}
				var datastring="id="+val+"&status="+unactive;
				$.ajax({
					type:"POST",
					url:baseurl+'Company/company_active',
					data:datastring,
					cache: false,
					dataType: "html",
					success: function(result){
						// alert(result+unactive);
						if(a == 1){
				            $("#active").css('display','block');
							$("#active").addClass('response');
				        }else{
				            $("#deactive").css('display','block');
							$("#deactive").addClass('response');
				        }      
			            setTimeout(function() {
				         window.location = baseurl+"company";
				        }, 3000);
					},
					error: function (error) {
						alert('error; ' + eval(error));
						setTimeout(function() {
				         window.location = baseurl+"company";
				        }, 3000);
					}
				});
			}

			function company_delete(val)
			{
				var baseurl= $("#baseurl").val();
				//alert(val);
				$.ajax({
				type: "POST",
				url: baseurl+'Company/company_delete',
				async: false,
				type: "POST",
				data: "id="+val,
				dataType: "html",
				success: function(response)
				{
				$('#kt_modal_delete_company').empty().append(response);
				$('#kt_modal_delete_company').addClass('show');
				//$("#kt_modal_delete_role").css("display", "block");
				}
				});
			}

			function removeCompany(val)
			{ 
				var baseurl= $("#baseurl").val();
				$.ajax({
				type: "POST",
				url: baseurl+'Company/delete',
				async: false,
				data:"field="+val,
				success: function(response)
				{
				window.location.href = baseurl+'Company';
				}
				});
			}
			function closeDeleteModal()
			{
					var baseurl= $("#baseurl").val();
					$('#kt_modal_delete_company').removeClass('show');
					$('.modal-backdrop').removeClass('show');
					window.location.href = baseurl+'Company';
			}
		</script>

		<!-- state city  -->
		<script>
			state_change()
			function state_change(){

				// alert('yes');

				var AndraPradesh = ["Anantapur","Chittoor","East Godavari","Guntur","Kadapa","Krishna","Kurnool","Prakasam","Nellore","Srikakulam","Visakhapatnam","Vizianagaram","West Godavari"];
				var ArunachalPradesh = ["Anjaw","Changlang","Dibang Valley","East Kameng","East Siang","Kra Daadi","Kurung Kumey","Lohit","Longding","Lower Dibang Valley","Lower Subansiri","Namsai","Papum Pare","Siang","Tawang","Tirap","Upper Siang","Upper Subansiri","West Kameng","West Siang","Itanagar"];
				var Assam = ["Baksa","Barpeta","Biswanath","Bongaigaon","Cachar","Charaideo","Chirang","Darrang","Dhemaji","Dhubri","Dibrugarh","Goalpara","Golaghat","Hailakandi","Hojai","Jorhat","Kamrup Metropolitan","Kamrup (Rural)","Karbi Anglong","Karimganj","Kokrajhar","Lakhimpur","Majuli","Morigaon","Nagaon","Nalbari","Dima Hasao","Sivasagar","Sonitpur","South Salmara Mankachar","Tinsukia","Udalguri","West Karbi Anglong"];
				var Bihar = ["Araria","Arwal","Aurangabad","Banka","Begusarai","Bhagalpur","Bhojpur","Buxar","Darbhanga","East Champaran","Gaya","Gopalganj","Jamui","Jehanabad","Kaimur","Katihar","Khagaria","Kishanganj","Lakhisarai","Madhepura","Madhubani","Munger","Muzaffarpur","Nalanda","Nawada","Patna","Purnia","Rohtas","Saharsa","Samastipur","Saran","Sheikhpura","Sheohar","Sitamarhi","Siwan","Supaul","Vaishali","West Champaran"];
				var Chhattisgarh = ["Balod","Baloda Bazar","Balrampur","Bastar","Bemetara","Bijapur","Bilaspur","Dantewada","Dhamtari","Durg","Gariaband","Janjgir Champa","Jashpur","Kabirdham","Kanker","Kondagaon","Korba","Koriya","Mahasamund","Mungeli","Narayanpur","Raigarh","Raipur","Rajnandgaon","Sukma","Surajpur","Surguja"];
				var Goa = ["North Goa","South Goa"];
				var Gujarat = ["Ahmedabad","Amreli","Anand","Aravalli","Banaskantha","Bharuch","Bhavnagar","Botad","Chhota Udaipur","Dahod","Dang","Devbhoomi Dwarka","Gandhinagar","Gir Somnath","Jamnagar","Junagadh","Kheda","Kutch","Mahisagar","Mehsana","Morbi","Narmada","Navsari","Panchmahal","Patan","Porbandar","Rajkot","Sabarkantha","Surat","Surendranagar","Tapi","Vadodara","Valsad"];
				var Haryana = ["Ambala","Bhiwani","Charkhi Dadri","Faridabad","Fatehabad","Gurugram","Hisar","Jhajjar","Jind","Kaithal","Karnal","Kurukshetra","Mahendragarh","Mewat","Palwal","Panchkula","Panipat","Rewari","Rohtak","Sirsa","Sonipat","Yamunanagar"];
				var HimachalPradesh = ["Bilaspur","Chamba","Hamirpur","Kangra","Kinnaur","Kullu","Lahaul Spiti","Mandi","Shimla","Sirmaur","Solan","Una"];
				var JammuKashmir = ["Anantnag","Bandipora","Baramulla","Budgam","Doda","Ganderbal","Jammu","Kargil","Kathua","Kishtwar","Kulgam","Kupwara","Leh","Poonch","Pulwama","Rajouri","Ramban","Reasi","Samba","Shopian","Srinagar","Udhampur"];
				var Jharkhand = ["Bokaro","Chatra","Deoghar","Dhanbad","Dumka","East Singhbhum","Garhwa","Giridih","Godda","Gumla","Hazaribagh","Jamtara","Khunti","Koderma","Latehar","Lohardaga","Pakur","Palamu","Ramgarh","Ranchi","Sahebganj","Seraikela Kharsawan","Simdega","West Singhbhum"];
				var Karnataka = ["Bagalkot","Bangalore Rural","Bangalore Urban","Belgaum","Bellary","Bidar","Vijayapura","Chamarajanagar","Chikkaballapur","Chikkamagaluru","Chitradurga","Dakshina Kannada","Davanagere","Dharwad","Gadag","Gulbarga","Hassan","Haveri","Kodagu","Kolar","Koppal","Mandya","Mysore","Raichur","Ramanagara","Shimoga","Tumkur","Udupi","Uttara Kannada","Yadgir"];
				var Kerala = ["Alappuzha","Ernakulam","Idukki","Kannur","Kasaragod","Kollam","Kottayam","Kozhikode","Malappuram","Palakkad","Pathanamthitta","Thiruvananthapuram","Thrissur","Wayanad"];
				var MadhyaPradesh = ["Agar Malwa","Alirajpur","Anuppur","Ashoknagar","Balaghat","Barwani","Betul","Bhind","Bhopal","Burhanpur","Chhatarpur","Chhindwara","Damoh","Datia","Dewas","Dhar","Dindori","Guna","Gwalior","Harda","Hoshangabad","Indore","Jabalpur","Jhabua","Katni","Khandwa","Khargone","Mandla","Mandsaur","Morena","Narsinghpur","Neemuch","Panna","Raisen","Rajgarh","Ratlam","Rewa","Sagar","Satna",
				"Sehore","Seoni","Shahdol","Shajapur","Sheopur","Shivpuri","Sidhi","Singrauli","Tikamgarh","Ujjain","Umaria","Vidisha"];
				var Maharashtra = ["Ahmednagar","Akola","Amravati","Aurangabad","Beed","Bhandara","Buldhana","Chandrapur","Dhule","Gadchiroli","Gondia","Hingoli","Jalgaon","Jalna","Kolhapur","Latur","Mumbai City","Mumbai Suburban","Nagpur","Nanded","Nandurbar","Nashik","Osmanabad","Palghar","Parbhani","Pune","Raigad","Ratnagiri","Sangli","Satara","Sindhudurg","Solapur","Thane","Wardha","Washim","Yavatmal"];
				var Manipur = ["Bishnupur","Chandel","Churachandpur","Imphal East","Imphal West","Jiribam","Kakching","Kamjong","Kangpokpi","Noney","Pherzawl","Senapati","Tamenglong","Tengnoupal","Thoubal","Ukhrul"];
				var Meghalaya = ["East Garo Hills","East Jaintia Hills","East Khasi Hills","North Garo Hills","Ri Bhoi","South Garo Hills","South West Garo Hills","South West Khasi Hills","West Garo Hills","West Jaintia Hills","West Khasi Hills"];
				var Mizoram = ["Aizawl","Champhai","Kolasib","Lawngtlai","Lunglei","Mamit","Saiha","Serchhip","Aizawl","Champhai","Kolasib","Lawngtlai","Lunglei","Mamit","Saiha","Serchhip"];
				var Nagaland = ["Dimapur","Kiphire","Kohima","Longleng","Mokokchung","Mon","Peren","Phek","Tuensang","Wokha","Zunheboto"];
				var Odisha = ["Angul","Balangir","Balasore","Bargarh","Bhadrak","Boudh","Cuttack","Debagarh","Dhenkanal","Gajapati","Ganjam","Jagatsinghpur","Jajpur","Jharsuguda","Kalahandi","Kandhamal","Kendrapara","Kendujhar","Khordha","Koraput","Malkangiri","Mayurbhanj","Nabarangpur","Nayagarh","Nuapada","Puri","Rayagada","Sambalpur","Subarnapur","Sundergarh"];
				var Punjab = ["Amritsar","Barnala","Bathinda","Faridkot","Fatehgarh Sahib","Fazilka","Firozpur","Gurdaspur","Hoshiarpur","Jalandhar","Kapurthala","Ludhiana","Mansa","Moga","Mohali","Muktsar","Pathankot","Patiala","Rupnagar","Sangrur","Shaheed Bhagat Singh Nagar","Tarn Taran"];
				var Rajasthan = ["Ajmer","Alwar","Banswara","Baran","Barmer","Bharatpur","Bhilwara","Bikaner","Bundi","Chittorgarh","Churu","Dausa","Dholpur","Dungarpur","Ganganagar","Hanumangarh","Jaipur","Jaisalmer","Jalore","Jhalawar","Jhunjhunu","Jodhpur","Karauli","Kota","Nagaur","Pali","Pratapgarh","Rajsamand","Sawai Madhopur","Sikar","Sirohi","Tonk","Udaipur"];
				var Sikkim = ["East Sikkim","North Sikkim","South Sikkim","West Sikkim"];
				var TamilNadu = ["Ariyalur","Chennai","Coimbatore","Cuddalore","Dharmapuri","Dindigul","Erode","Kanchipuram","Kanyakumari","Karur","Krishnagiri","Madurai","Nagapattinam","Namakkal","Nilgiris","Perambalur","Pudukkottai","Ramanathapuram","Salem","Sivaganga","Thanjavur","Theni","Thoothukudi","Tiruchirappalli","Tirunelveli","Tiruppur","Tiruvallur","Tiruvannamalai","Tiruvarur","Vellore","Viluppuram","Virudhunagar"];
				var Telangana = ["Adilabad","Bhadradri Kothagudem","Hyderabad","Jagtial","Jangaon","Jayashankar","Jogulamba","Kamareddy","Karimnagar","Khammam","Komaram Bheem","Mahabubabad","Mahbubnagar","Mancherial","Medak","Medchal","Nagarkurnool","Nalgonda","Nirmal","Nizamabad","Peddapalli","Rajanna Sircilla","Ranga Reddy","Sangareddy","Siddipet","Suryapet","Vikarabad","Wanaparthy","Warangal Rural","Warangal Urban","Yadadri Bhuvanagiri"];
				var Tripura = ["Dhalai","Gomati","Khowai","North Tripura","Sepahijala","South Tripura","Unakoti","West Tripura"];
				var UttarPradesh = ["Agra","Aligarh","Allahabad","Ambedkar Nagar","Amethi","Amroha","Auraiya","Azamgarh","Baghpat","Bahraich","Ballia","Balrampur","Banda","Barabanki","Bareilly","Basti","Bhadohi","Bijnor","Budaun","Bulandshahr","Chandauli","Chitrakoot","Deoria","Etah","Etawah","Faizabad","Farrukhabad","Fatehpur","Firozabad","Gautam Buddha Nagar","Ghaziabad","Ghazipur","Gonda","Gorakhpur","Hamirpur","Hapur","Hardoi","Hathras","Jalaun","Jaunpur","Jhansi","Kannauj","Kanpur Dehat","Kanpur Nagar","Kasganj","Kaushambi","Kheri","Kushinagar","Lalitpur","Lucknow","Maharajganj","Mahoba","Mainpuri","Mathura","Mau","Meerut","Mirzapur","Moradabad","Muzaffarnagar","Pilibhit","Pratapgarh","Raebareli","Rampur","Saharanpur","Sambhal","Sant Kabir Nagar","Shahjahanpur","Shamli","Shravasti","Siddharthnagar","Sitapur","Sonbhadra","Sultanpur","Unnao","Varanasi"];
				var Uttarakhand  = ["Almora","Bageshwar","Chamoli","Champawat","Dehradun","Haridwar","Nainital","Pauri","Pithoragarh","Rudraprayag","Tehri","Udham Singh Nagar","Uttarkashi"];
				var WestBengal = ["Alipurduar","Bankura","Birbhum","Cooch Behar","Dakshin Dinajpur","Darjeeling","Hooghly","Howrah","Jalpaiguri","Jhargram","Kalimpong","Kolkata","Malda","Murshidabad","Nadia","North 24 Parganas","Paschim Bardhaman","Paschim Medinipur","Purba Bardhaman","Purba Medinipur","Purulia","South 24 Parganas","Uttar Dinajpur"];
				var AndamanNicobar = ["Nicobar","North Middle Andaman","South Andaman"];
				var Chandigarh = ["Chandigarh"];
				var DadraHaveli = ["Dadra Nagar Haveli"];
				var DamanDiu = ["Daman","Diu"];
				var Delhi = ["Central Delhi","East Delhi","New Delhi","North Delhi","North East Delhi","North West Delhi","Shahdara","South Delhi","South East Delhi","South West Delhi","West Delhi"];
				var Lakshadweep = ["Lakshadweep"];
				var Puducherry = ["Karaikal","Mahe","Puducherry","Yanam"];

				// var StateSelected='Tamil Nadu';

				// $("#state").change(function(){
				  var StateSelected = $("#state").val();
				  $("#state_hidden").val(StateSelected);  
				  var optionsList;
				  var htmlString = "";

				  switch (StateSelected) {
				    case "Andra Pradesh":
				        optionsList = AndraPradesh;
				        break;
				    case "Arunachal Pradesh":
				        optionsList = ArunachalPradesh;
				        break;
				    case "Assam":
				        optionsList = Assam;
				        break;
				    case "Bihar":
				        optionsList = Bihar;
				        break;
				    case "Chhattisgarh":
				        optionsList = Chhattisgarh;
				        break;
				    case "Goa":
				        optionsList = Goa;
				        break;
				    case  "Gujarat":
				        optionsList = Gujarat;
				        break;
				    case "Haryana":
				        optionsList = Haryana;
				        break;
				    case "Himachal Pradesh":
				        optionsList = HimachalPradesh;
				        break;
				    case "Jammu and Kashmir":
				        optionsList = JammuKashmir;
				        break;
				    case "Jharkhand":
				        optionsList = Jharkhand;
				        break;
				    case  "Karnataka":
				        optionsList = Karnataka;
				        break;
				    case "Kerala":
				        optionsList = Kerala;
				        break;
				    case  "Madya Pradesh":
				        optionsList = MadhyaPradesh;
				        break;
				    case "Maharashtra":
				        optionsList = Maharashtra;
				        break;
				    case  "Manipur":
				        optionsList = Manipur;
				        break;
				    case "Meghalaya":
				        optionsList = Meghalaya ;
				        break;
				    case  "Mizoram":
				        optionsList = Mizoram;
				        break;
				    case "Nagaland":
				        optionsList = Nagaland;
				        break;
				    case  "Orissa":
				        optionsList = Orissa;
				        break;
				    case "Punjab":
				        optionsList = Punjab;
				        break;
				    case  "Rajasthan":
				        optionsList = Rajasthan;
				        break;
				    case "Sikkim":
				        optionsList = Sikkim;
				        break;
				    case  "Tamil Nadu":
				        optionsList = TamilNadu;
				        break;
				    case  "Telangana":
				        optionsList = Telangana;
				        break;
				    case "Tripura":
				        optionsList = Tripura ;
				        break;
				    case  "Uttaranchal":
				        optionsList = Uttaranchal;
				        break;
				    case  "Uttar Pradesh":
				        optionsList = UttarPradesh;
				        break;
				    case "West Bengal":
				        optionsList = WestBengal;
				        break;
				    case  "Andaman and Nicobar Islands":
				        optionsList = AndamanNicobar;
				        break;
				    case "Chandigarh":
				        optionsList = Chandigarh;
				        break;
				    case  "Dadar and Nagar Haveli":
				        optionsList = DadraHaveli;
				        break;
				    case "Daman and Diu":
				        optionsList = DamanDiu;
				        break;
				    case  "Delhi":
				        optionsList = Delhi;
				        break;
				    case "Lakshadeep":
				        optionsList = Lakshadeep ;
				        break;
				    case  "Pondicherry":
				        optionsList = Pondicherry;
				        break;
				}

				  for(var i = 0; i < optionsList.length; i++){
				    htmlString = htmlString+"<option value='"+ optionsList[i] +"'>"+ optionsList[i] +"</option>";
				  }
				  $("#city").html(htmlString);
			}
			city_change()
			function city_change(){

				var city_selected = $("#city").val();

				  $("#city_hidden").val(city_selected);    
			}
		</script>
	</body>
	<!--end::Body-->
</html>