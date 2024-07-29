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
				<?php $this->load->view("header"); ?>
				<!--begin::Toolbar-->
					<div class="toolbar py-2" id="kt_toolbar">
						<!--begin::Container-->
						<div id="kt_toolbar_container" class="container-fluid d-flex align-items-center">
							<!--begin::Page title-->
							<div class="flex-grow-1 flex-shrink-0 me-5">
								<!--begin::Page title-->
								<div data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
									<!--begin::Title-->
									<h1 class="d-flex align-items-center text-dark fw-bold my-1 fs-3">Bank List
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
											
											<button type="button" class="btn btn-primary"  data-bs-toggle="modal" data-bs-target="#kt_modal_new_bank_modal">
											<!--begin::Svg Icon | path: icons/duotune/arrows/arr075.svg-->
											<span class="svg-icon svg-icon-2">
												<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
													<rect opacity="0.5" x="11.364" y="20.364" width="16" height="2" rx="1" transform="rotate(-90 11.364 20.364)" fill="currentColor" />
													<rect x="4.36396" y="11.364" width="16" height="2" rx="1" fill="currentColor" />
												</svg>
											</span>
											<!--end::Svg Icon-->New Bank</button>
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
									<table class="table align-middle table-row-dashed table-striped table-hover fs-6 gy-1 gs-2" id="kt_datatable_bank_list">
										<!--begin::Table head-->
										<thead>
											<!--begin::Table row-->
											<tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">
												<th class="min-w-25px cy">Bank</th>
												<th class="min-w-25px">Branch/Place</th>
												<th class="min-w-25px">IFSC Code</th>
												<th class="min-w-25px">Company</th>
												<th class="min-w-25px">Address</th>
												<th class="min-w-25px">A/C No</th>
												<th class="min-w-25px">A/C Name</th>
												<th class="min-w-25px">Status</th>
												<th class="min-w-25px"><span class="text-end">Actions</span></th>
											</tr>
											<!--end::Table row-->
										</thead>
										<!--end::Table head-->
										<!--begin::Table body-->
										<tbody class="text-gray-600 fw-semibold">
											<?php
												$i=1;
												foreach($b_settings as $bank_settings)
												{
											?>
										<!--Begin::Table row-->
											<tr>
												<td><?php echo $bank_settings['BANKNAME']?$bank_settings['BANKNAME']:'-'; ?></td>
												<td class="ple1"><?php echo $bank_settings['BRANCH']?$bank_settings['BRANCH']:'-'; ?></td>
												<td class="ple1"><?php echo $bank_settings['IFSC']?$bank_settings['IFSC']:'-'; ?></td>
												<td class="ple1">
													<?php 
													$cqry=$this->db->query("SELECT * FROM COMPANY WHERE COMPANYCODE='".$bank_settings['COMPANYCODE']."'")->row();
													echo $cqry?$cqry->COMPANYNAME:''?$cqry->COMPANYNAME:'-';
													?>
												</td>
												<td class="ple1"><?php echo $bank_settings['ADDRESS']?$bank_settings['ADDRESS']:'-'; ?></td>
												<td class="ple1"><?php echo $bank_settings['ACCOUNTNO']?$bank_settings['ACCOUNTNO']:'-'; ?></td>
												<td class="ple1"><?php echo $bank_settings['PERSONNAME']?$bank_settings['PERSONNAME']:'-'; ?></td>
												<td>
													<label class="form-check form-switch form-check-custom form-check-solid ">
															<input class="form-check-input w-35px h-20px" type="checkbox" id="activeunactive_<?php echo $i;?>"  name="activeunactive_<?php echo $i;?>" onchange="activeunactive('<?php echo $bank_settings['SNO']; ?>',<?php echo $i; ?>)" value=
															<?php 
															if($bank_settings['ACTIVE']=='Y')
															{ echo "'1' checked='checked'";}
															else if($bank_settings['ACTIVE']=='N')
															{ echo "'0'";}
															?> >
													</label>
												</td>
												<!--begin::Action=-->
												<td>
													<span class="text-end">
													<a href="javascript:;" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm" data-bs-toggle="modal" data-bs-target="#kt_modal_view_bank" onclick="bank_view('<?php echo $bank_settings['SNO']; ?>')">
														<i class="bi bi-eye-fill eyc"></i>
													</a>
													<a href="editcompany.php" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1" data-bs-toggle="modal" data-bs-target="#kt_modal_edit_bank" onclick="bank_edit('<?php echo $bank_settings['SNO']; ?>')">
																		<!--begin::Svg Icon | path: icons/duotune/art/art005.svg-->
																		<span class="svg-icon svg-icon-3">
																			<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																				<path opacity="0.3" d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z" fill="currentColor"></path>
																				<path d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z" fill="currentColor"></path>
																			</svg>
																		</span>
																		<!--end::Svg Icon-->
																	</a>
													<a href="javascript:;" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm" data-bs-toggle="modal" data-bs-target="#kt_modal_delete_bank" onclick="bank_delete('<?php echo $bank_settings['SNO']; ?>')">
																		<!--begin::Svg Icon | path: icons/duotune/general/gen027.svg-->
																		<span class="svg-icon svg-icon-3">
																			<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																				<path d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z" fill="currentColor"></path>
																				<path opacity="0.5" d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z" fill="currentColor"></path>
																				<path opacity="0.5" d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z" fill="currentColor"></path>
																			</svg>
																		</span>
																		<!--end::Svg Icon-->
																	</a></span>
												</td>
												<!--end::Action=-->
											</tr>
											<!--end::Table row-->
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
		<!--begin::Modal-New Bank-->
		<div class="modal fade" id="kt_modal_new_bank_modal" tabindex="-1" aria-hidden="true">
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
						<form name="bank_add_form" id="bank_add_form" method="POST" action="<?php echo base_url(); ?>Bank/bank_save" onsubmit="return bank_validation();">

						<?php
							$qry=$this->db->query("SELECT TOP 1 SNO FROM BANKS ORDER BY SNO DESC");
							$res=$qry->row();
							$last_data= $res->SNO;
                            $exlno = substr($last_data,1);
                            $next_value = (int)$exlno + 1;
                            $r_no1=str_pad($next_value,3,0,STR_PAD_LEFT);
                            $s_no="R".$r_no1;
						?>
						<input type="hidden" id="bank_id" name="bank_id" value="<?php echo $s_no;?>">
						<!--begin::Heading-->
						<div class="mb-13 text-center">
							<h1 class="mb-3">New Bank</h1>
							<div class="text-muted fw-semibold fs-5">Please update the following details to include a Bank</div>
						</div>
						<!--end::Heading-->

						<div class="row mb-6">
												<!--begin::Label-->
												<label class="col-lg-1 col-form-label required fw-semibold fs-6">Bank</label>
												<!--end::Label-->
												<!--begin::Col-->
												<div class="col-lg-3 fv-row fv-plugins-icon-container">
													<input type="text" name="bank_name" id="bank_name" class="form-control form-control-lg form-control-solid" placeholder="Bank Name" required onkeyup="bank_unique(this.value);">
													<div class="fv-plugins-message-container invalid-feedback" name="bank_name_err" id="bank_name_err"></div>
												</div>
												<!--end::Col-->
												
												<!--begin::Label-->
												<label class="col-lg-1 col-form-label required fw-semibold fs-6">Branch</label>
												<!--end::Label-->
												<!--begin::Col-->
												<div class="col-lg-3 fv-row fv-plugins-icon-container">
													<input type="text" name="branch_name" id="branch_name" class="form-control form-control-lg form-control-solid" placeholder="Branch/Place">
													<div class="fv-plugins-message-container invalid-feedback" name="branch_name_err" id="branch_name_err"></div>
												</div>
												<!--end::Col-->
												
												<!--begin::Label-->
												<label class="col-lg-1 col-form-label  fw-semibold fs-6">IFSC</label>
												<!--end::Label-->
												<!--begin::Col-->
												<div class="col-lg-3 fv-row fv-plugins-icon-container">
													<input type="text" name="ifsc" id="ifsc" class="form-control form-control-lg form-control-solid" placeholder="IFSC Code">
													<div class="fv-plugins-message-container invalid-feedback"></div>
												</div>
												<!--end::Col-->
												
												<!--begin::Label-->
												<label class="col-lg-1 col-form-label  fw-semibold fs-6">Company</label>
												<!--end::Label-->
												<!--begin::Left Section-->
												<div class="col-lg-3">
													<!--begin::Select-->
													<select class="form-select form-select-solid" data-control="select2" data-placeholder="Select Zone" data-hide-search="true" name="company" id="company">

														<option value="">Select Company</option>	
														<?php 
														
															$qry=$this->db->query("SELECT  COMPANYCODE,COMPANYNAME FROM COMPANY WHERE ACTIVE='Y'");
															$res=$qry->result();
															foreach ($res as $comp_list) 
															{
																?>
																<option value="<?php echo $comp_list->COMPANYCODE; ?>"> <?php echo $comp_list->COMPANYNAME; ?></option>
																<?php
															}
															?> 	
													</select>
												</div>
													<!--end::Select-->
												<!--end::Col-->
												<!--begin::Label-->
												<label class="col-lg-1 col-form-label  fw-semibold fs-6">Address</label>
												<!--end::Label-->
												<!--begin::Col-->
												<div class="col-lg-3 fv-row fv-plugins-icon-container">
													<input type="text" name="address" id="address" class="form-control form-control-lg form-control-solid" placeholder="Address">
													<div class="fv-plugins-message-container invalid-feedback"></div>
												</div>
												<!--end::Col-->
												<!--begin::Label-->
												<label class="col-lg-1 col-form-label  fw-semibold fs-6">A/C No</label>
												<!--end::Label-->
												<!--begin::Col-->
												<div class="col-lg-3 fv-row fv-plugins-icon-container">
													<input type="text" name="acc_no" id="acc_no" class="form-control form-control-lg form-control-solid" placeholder="Account Number">
													<div class="fv-plugins-message-container invalid-feedback"></div>
												</div>
												<!--end::Col-->
												<!--begin::Label-->
												<label class="col-lg-1 col-form-label  fw-semibold fs-6"> Name</label>
												<!--end::Label-->
												<!--begin::Col-->
												<div class="col-lg-3 fv-row fv-plugins-icon-container">
													<input type="text" name="person_name" id="person_name" class="form-control form-control-lg form-control-solid" placeholder="Person Name">
													<div class="fv-plugins-message-container invalid-feedback"></div>
												</div>
												<!--end::Col-->
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
									<button type="submit" class="btn btn-primary" >Save Changes</button>
								</div>
							</div>
						</div>
						<!--end::Actions-->
					</form>
					</div>
					<!--end::Modal body-->
				
				</div>
				<!--end::Modal content-->
			</div>
			<!--end::Modal dialog-->
		</div>
		<!--end::Modal - New Bank-->
	
		<!--begin::Modal - view company-->
		<div class="modal fade" id="kt_modal_view_bank" tabindex="-1" aria-hidden="true">
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
								<h1 class="mb-3">View Bank Details</h1>
							</div>
							<!--end::Heading-->
							
						<!--end::Modal body-->
						</div>				
					</div>
					<!--end::Modal content-->
				</div>
				<!--end::Modal dialog-->
	    </div>
		<!--end::Modal - view Department-->
		<!--begin::Modal-Edit Bank-->
		<div class="modal fade" id="kt_modal_edit_bank" tabindex="-1" aria-hidden="true">

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
							<h1 class="mb-3">Modify Bank Details</h1>
						</div>
						<!--end::Heading-->
						<!--end::Actions-->
					</div>
					<!--end::Modal body-->
				</div>
				<!--end::Modal content-->
			</div>
			<!--end::Modal dialog-->
			
		</div>
		<!--end::Modal - Edit Bank-->
		<!--begin::Modal - delete company-->
		<div class="modal fade" id="kt_modal_delete_bank" tabindex="-1" aria-hidden="true">
			<!--begin::Modal dialog-->
			<div class="modal-dialog modal-m">
				<!--begin::Modal content-->
				<div class="modal-content rounded">
					<div class="swal2-icon swal2-warning swal2-icon-show" style="display: flex;">
						<div class="swal2-icon-content">!</div></div>
						<br><br>
				</div>
				<!--end::Modal content-->
			</div>
			<!--end::Modal dialog-->
		</div>
		<!--end::Modal - delete company-->
		<input type="hidden" id="baseurl" value="<?php echo base_url();?>">
		<?php $this->load->view("script");?>

		<script>
		$('#kt_datatable_bank_list').DataTable( {
			"aaSorting": [],
		        dom: 'Bfrtip',
		        buttons: [
		            // 'copyHtml5',
		            // 'excelHtml5',
		            // 'csvHtml5',
		            // 'pdfHtml5'

                        {
                            extend: 'copyHtml5',
                            exportOptions: {columns: [ 0,1,2,3,4,5,6]}
                        },
                        {
                            extend: 'excelHtml5',
                            title: 'Bank List',
                            exportOptions: {columns: [ 0,1,2,3,4,5,6]}
                        },
                        {
                            extend: 'csvHtml5',
                            title: 'Bank List',
                            exportOptions: {columns: [ 0,1,2,3,4,5,6]}
                        },
                        {
                            extend: 'pdfHtml5',
                            title: 'Bank List',
                            exportOptions: {columns: [ 0,1,2,3,4,5,6]}
                        },
		        ]
		    } );	
		    </script>	
		    <script>
	     
		        $("#kt_datatable_bank_list").kendoTooltip({
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


			function bank_edit(val)
			{
				var baseurl= $("#baseurl").val();
				// alert(baseurl);
				$.ajax({
				type: "POST",
				url: baseurl+'Bank/bank_edit',
				async: false,
				type: "POST",
				data: "id="+val,
				dataType: "html",
				success: function(response)
				{
				$('#kt_modal_edit_bank').empty().append(response);
				$('#kt_modal_edit_bank').addClass('show');
				//$("#kt_modal_editdept").css("display", "block");
				}
			});
			}
			function bank_view(val)
			{
				var baseurl= $("#baseurl").val();
				// alert(baseurl);
				$.ajax({
				type: "POST",
				url: baseurl+'Bank/bank_view',
				async: false,
				type: "POST",
				data: "id="+val,
				dataType: "html",
				success: function(response)
				{
				$('#kt_modal_view_bank').empty().append(response);
				$('#kt_modal_view_bank').addClass('show');
				//$("#kt_modal_editdept").css("display", "block");
				}
			});
			}
			function closeViewModal()
			{
				var baseurl= $("#baseurl").val();
				$('#kt_modal_view_bank').removeClass('show');
				//$("#kt_modal_update_role").css("display", "none");
				$('.modal-backdrop').removeClass('show');
				window.location.href = baseurl+'Bank';
			}
			function closeEditModal()
			{
				var baseurl= $("#baseurl").val();
				$('#kt_modal_edit_bank').removeClass('show');
				//$("#kt_modal_update_role").css("display", "none");
				$('.modal-backdrop').removeClass('show');
				window.location.href = baseurl+'Bank';
			}
			var berr=0;
			function bank_unique(val)
			{
				var baseurl= $("#baseurl").val();
				$.ajax({
					type:"POST",
					url:baseurl+'Bank/bank_unique',
					data:{'value':val},
					cache: false,
					dataType: "html",
						success: function(result){
						if(result>0)
						{
							$('#bank_name_err').html('Bank already exist!');
							berr=1;
						}
						else
						{
							$('#bank_name_err').html('');
							berr=0;
						}
					}
				});
			}

			function bank_edit_validation()
			{
				var erre = 0;
				var bank = $('#bank_name_edit').val();
				var branch = $('#branch_name_edit').val();
				alert($('#bank_name_edit').val());
			    if(bank.trim()==''){
			        $('#bank_name_edit_err').html('Enter Bank Name!');
			        erre++;
			    }else{
			        //$('#bank_err').html('');
			        if(berre>0)
					{
						$('#bank_name_edit_err').html('bank already exist!');
						erre++;
					}
					else
					{
						$('#bank_name_edit_err').html('');
					}
			    }
			    if(branch.trim()==''){
			        $('#branch_name_edit_err').html('Enter Branch Name!');
			        erre++;
			    }else{
			        
						$('#branch_name_edit_err').html('');
					
			    }
			    
			    if(erre>0){ return false; }else{ return true; }
			}


			function bank_validation()
			{
				var err = 0;
				var bank = $('#bank_name').val();
				var branch = $('#branch_name').val();

			    if(bank.trim()==''){
			        $('#bank_name_err').html('Enter Bank Name!');
			        err++;
			    }else{
			        //$('#bank_err').html('');
			        if(berr>0)
					{
						$('#bank_name_err').html('Bank already exist!');
						err++;
					}
					else
					{
						$('#bank_name_err').html('');
					}
			    }
			    if(branch.trim()==''){
			        $('#branch_name_err').html('Enter Branch Name!');
			        err++;
			    }else{
						$('#branch_name_err').html('');
			    }
			    
			    if(err>0){ return false; }else{ return true; }
			}

			function bank_delete(val)
			{
				var baseurl= $("#baseurl").val();
				//alert(val);
				$.ajax({
				type: "POST",
				url: baseurl+'Bank/bank_delete',
				async: false,
				type: "POST",
				data: "id="+val,
				dataType: "html",
				success: function(response)
				{
				$('#kt_modal_delete_bank').empty().append(response);
				$('#kt_modal_delete_bank').addClass('show');
				//$("#kt_modal_delete_role").css("display", "block");
				}
				});
			}


			function removeBank(val)
			{ 
				var baseurl= $("#baseurl").val();
				$.ajax({
				type: "POST",
				url: baseurl+'Bank/delete',
				async: false,
				data:"field="+val,
				success: function(response)
				{
				window.location.href = baseurl+'Bank';
				}
				});
			}
			function closeDeleteModal()
			{
					var baseurl= $("#baseurl").val();
					$('#kt_modal_delete_bank').removeClass('show');
					$('.modal-backdrop').removeClass('show');
					window.location.href = baseurl+'Bank';
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
					url:baseurl+'Bank/bank_active',
					data:datastring,
					cache: false,
					dataType: "html",
					success: function(result){
						// alert(result+unactive);
						if(a == 'Y'){
				            $("#active").css('display','block');
							$("#active").addClass('response');
				        }else{
				            $("#deactive").css('display','block');
							$("#deactive").addClass('response');
				        }      
			            setTimeout(function() {
				         window.location = baseurl+"Bank";
				        }, 1000);
					},
					error: function (error) {
						alert('error; ' + eval(error));
						setTimeout(function() {
				         window.location = baseurl+"Bank";
				        }, 1000);
					}
				});
			}
		</script>
	</body>
	<!--end::Body-->
</html>