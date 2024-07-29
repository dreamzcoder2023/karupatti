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
  .dataTables_scroll_rp_entry
    {
        position: relative;
        overflow: auto;
        min-height: 180px;
        max-height: 200px;/*the maximum height you want to achieve*/
        width: 100%;
    }
  .dataTables_scroll_rp_entry thead{
    position: -webkit-sticky;
    position: sticky;
    top: 0;
   background-color: #ec9629;
    z-index: 2;
  }
  .error {
    border: solid 2px #f31700 !important;
	border-color:#f31700 !important;
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
			
			<div class="page d-flex flex-row flex-column-fluid">
				<?php $this->load->view("sidebar");?>
				
				<div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
				<?php $this->load->view("header");?>
				
					<div class="toolbar py-2" id="kt_toolbar">
						
						<div id="kt_toolbar_container" class="container-fluid d-flex align-items-center">
							
							<div class="flex-grow-1 flex-shrink-0 me-5">
								
								<div data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
									
									<h1 class="d-flex align-items-center text-dark fw-bold my-1 fs-3">Repledge Bank List
									
									<span class="h-20px border-gray-200 border-start ms-3 mx-2"></span>
									
									
									</h1>
									
								</div>
								
							</div>
							
							
						</div>
						
					</div>
					
					<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
					
						<div id="kt_content_container" class="container-xxl">
							
							<div class="row gy-5 g-xl-8">
								
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
			                         <div class="alert alert-success alert-dismissible" style="display:none;" id="active_item_master" role="alert">
			                          
			                            Bank has been Added successfully
			                        </div>
			                        <div class="alert alert-danger alert-dismissible" style="display:none;" id="deactive_item_master" role="alert">
			                          
			                            Bank has been Added successfully
			                        </div>


								
								<div class="card-header border-0 pt-6">
									
									<div class="card-title">
										
									</div>
									
									<div class="card-toolbar">
										
										<div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
											
											
											<button type="button" class="btn btn-primary"  data-bs-toggle="modal" data-bs-target="#kt_modal_add_newitem" onclick="itemincrement()">
											
											<span class="svg-icon svg-icon-2">
												<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
													<rect opacity="0.5" x="11.364" y="20.364" width="16" height="2" rx="1" transform="rotate(-90 11.364 20.364)" fill="currentColor" />
													<rect x="4.36396" y="11.364" width="16" height="2" rx="1" fill="currentColor" />
												</svg>
											</span>
											
										</div>
										
										<div class="d-flex justify-content-end align-items-center d-none" data-kt-user-table-toolbar="selected">
											<!--<div class="fw-bold me-5">
											<span class="me-2" data-kt-user-table-select="selected_count"></span>Selected</div>-->
											<button type="button" class="btn btn-danger" data-kt-user-table-select="delete_selected">Delete Selected</button>
										</div>
										
										<div class="modal fade" id="kt_modal_export_users" tabindex="-1" aria-hidden="true">
											
											<div class="modal-dialog modal-dialog-centered mw-650px">
												
												<div class="modal-content">
												
													<div class="modal-header">
													
														<h2 class="fw-bold">Export</h2>
													
														<div class="btn btn-icon btn-sm btn-active-icon-primary" data-kt-users-modal-action="close">
														
															<span class="svg-icon svg-icon-1">
																<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																	<rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="currentColor" />
																	<rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="currentColor" />
																</svg>
															</span>
															
														</div>
														
													</div>
												
													<div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
														
														<form id="kt_modal_export_users_form" class="form" action="#">
														
															<div class="fv-row mb-10">
																
																<label class="fs-6 fw-semibold form-label mb-2">Select Item:</label>
																
																<select name="role" data-control="select2" data-placeholder="Select Company" data-hide-search="true" class="form-select form-select-solid fw-bold">
																	<option></option>
																	<option value="Item Details">Item Details</option>
																	<option value="all">All</option>
																</select>
																
															</div>
															
															<div class="fv-row mb-10">
																
																<label class="required fs-6 fw-semibold form-label mb-2">Select Export Format:</label>
																
																<select name="format" data-control="select2" data-placeholder="Select a format" data-hide-search="true" class="form-select form-select-solid fw-bold">
																	<option></option>
																	<option value="excel">Excel</option>
																	<option value="pdf">PDF</option>
																	<option value="cvs">CVS</option>
																	<option value="zip">ZIP</option>
																</select>
																
															</div>
															
															<div class="text-center">
																<button type="reset" class="btn btn-light me-3" data-kt-users-modal-action="cancel">Discard</button>
																<button type="submit" class="btn btn-primary" data-kt-users-modal-action="submit">
																	<span class="indicator-label">Submit</span>
																	<span class="indicator-progress">Please wait...
																	<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
																</button>
															</div>
															
														</form>
														
													</div>
													
												</div>
												
											</div>
											
										</div>
										
										
									</div>
									
								</div>
								
								<div class="card-body py-4">
									
									<table class="table align-middle table-row-dashed table-striped table-hover fs-7 gy-1 gs-2 dataTable" id="kt_datatable_dom_positioning">
										<thead>
											<tr class="text-start text-muted fw-bold fs-7  gs-0">
												<th class="min-w-125px" style="width: 20%;" >Sno</th>
												<th class="min-w-125px" style="width: 50%;" >Bank Name</th>
												<th class="min-w-125px" style="width: 20%;" >Bank Branch</th>
                                                <th class="min-w-125px" style="width: 20%;" >Bank Address</th>
												<th class="min-w-125px" style="width: 5%;">Status</th>
											</tr>
										</thead>
										<tbody class="text-gray-600 fw-semibold">
											<?php 
                                                $i=1;
                                                foreach($bankdetails as $bankval)
                                                {
	                                               // print_r($bankval['isActive']);exit;
	                                                if($bankval['isActive']=='1')
	                                                {
	                                                    $status ='Active';
	                                                }
	                                                else
	                                                {
	                                                    $status ='IN-Active';
	                                                }
                                                   
                                            ?>
											<tr>
												<td><?php echo $i; ?></td>
												<td><?php echo $bankval['bank_Name']; ?></td>
                                                <td><?php echo $bankval['bank_Branch']; ?></td>
                                                <td><?php echo $bankval['bank_Address']; ?></td>
												<td><?php echo $status; ?></td>
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
			</div>
            <?php $this->load->view("footer");?>
	    </div>			
    </div>	
</div>
		
<div class="modal fade" id="kt_modal_add_newitem" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content rounded">
            <div class="modal-header justify-content-end border-0 pb-0">
                <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                    <span class="svg-icon svg-icon-1">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="currentColor" />
                            <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="currentColor" />
                        </svg>
                    </span>
                </div>
            </div>
            <form name="item_add_form" id="item_add_form" method="POST" action="" enctype="multipart/form-data" >
                <div class="modal-body pt-0 pb-15 px-5 px-xl-20">
                    <div class="mb-13 text-center">
                        <h1 class="mb-3">Add Bank</h1>	
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <label>Bank Name : </label>
                            <div>
                                <input class="form-control" type="text" id="bankname" name="bankname" value="" placeholder="Please Enter Bank Name" />
                                <span class="error_msg" id="banknameerror" name="banknameerror"></span> 
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <label>Precentage : </label>
                            <div>
                            	<select class="form-select form-select-solid" data-control="select2" id="bankprecentage" name="bankprecentage[]" data-close-on-select="false" data-allow-clear="true" multiple="multiple">
                            		<option value="0.50" selected>0.50%</option>
									<option value="1.50">1.50%</option>
									<option value="1.75">1.75%</option>
									<option value="2.0">2.0%</option>
									<option value="2.50">2.50%</option>
									<option value="2.75">2.75%</option>
									<option value="2.80">2.80%</option>
									<option value="3.0">3.0%</option>
									<option value="3.50">3.50%</option>
									<option value="4.0">4.0%</option>
									<option value="4.50">4.50%</option>
									<option value="4.70">4.70%</option>
									<option value="5.0">5.0%</option>
									<option value="5.50">5.50%</option>
									<option value="5.75">5.75%</option>
									<option value="6.00">6.00%</option>
									<option value="6.75">6.75%</option>
								</select>
                                <span class="error_msg" id="bankprecentageerror" name="bankprecentageerror"></span> 
                            </div>
                        </div>
                        </div>
                        <br/>
                        <div class="row">
	                        <div class="col-lg-6">
	                            <label>Branch : </label>
	                            <div>
	                                <input class="form-control" type="text" id="bankbranch" name="bankbranch" value="" placeholder="Please Enter Bank Branch Name"/>
	                                <span class="error_msg" id="bankbrancherror" name="bankbrancherror"></span> 
	                            </div>
	                        </div>
	                        <div class="col-lg-6">
	                        <label>Address : </label>
	                            <div>
	                                <input class="form-control" type="text" id="bankaddress" name="bankaddress" value="" placeholder="Please Enter Bank Branch Address"/>
	                                <span class="error_msg" id="bankaddresserror" name="bankaddresserror"></span> 
	                            </div>
	                        </div>
                        </div>
                        <br/>
                        <div class="row">
	                        
	                        <div class="col-lg-6">
	                        <label>Months : </label>
	                            <div>
	                                <input class="form-control" type="number" id="bankmonths" name="bankmonths" value="" placeholder="Please Enter  Month value"/>
	                                <span class="error_msg" id="bankmonthserror" name="bankmonthserror"></span> 
	                            </div>
	                        </div>
	                        <div class="col-lg-6">
	                            <label>Iter.Month : </label>
	                            <div>
	                                <input class="form-control" type="number" id="bankplusintmonth" name="bankplusintmonth" value="" placeholder="Please Enter  itration Month value"/>
	                                <span class="error_msg" id="bankplusintmontherror" name="bankplusintmontherror"></span> 
	                            </div>
	                        </div>
                        </div>
                        <br/>
                        <div class="row">

	                        <div class="col-lg-6">
	                        	<label>(+)Int : </label>
	                            <div>
	                                <input class="form-control" type="text" id="bankplusint" name="bankplusint" value="" placeholder="Please Enter  itration intrest %"/>
	                                <span class="error_msg" id="bankplusinterror" name="bankplusinterror"></span> 
	                            </div>
	                        </div>
                        </div>
                </div>
                <div class="row">
                    <div class="col-lg-9"></div>
                    <div class="col-lg-1">
                        <div class="d-flex flex-center flex-row-fluid pt-12">
                            <button type="reset" class="btn btn-secondary me-3" data-bs-dismiss="modal">Cancel</button>
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="d-flex flex-center flex-row-fluid pt-12">
                            <button type="button" class="btn btn-primary" id="submit" onclick="savebankfun()">Save Changes</button>
                        </div>
                    </div>
                </div>
                <br/>
            </div>
        </form>
    </div>
</div>
</div>	
<div class="modal fade" id="kt_modal_editdept" tabindex="-1" aria-hidden="true"> 
</div>
<div class="modal fade" id="kt_modal_viewdept" tabindex="-1" aria-hidden="true">
			<div class="modal-dialog modal-m">
				<div class="modal-content rounded">
				
					<div class="modal-header justify-content-end border-0 pb-0">
						
						<div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
							
							<span class="svg-icon svg-icon-1">
								<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
									<rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="currentColor" />
									<rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="currentColor" />
								</svg>
							</span>
							
						</div>
						
					</div>
					
					<div class="modal-body pt-0 pb-15 px-5 px-xl-20">
						
						<div class="mb-13 text-center">
							<h1 class="mb-3">Item Details</h1>
						</div>
						
						<div class="row mb-6">
							<!--begin::Label-->
							<label class="col-lg-4 col-form-label fw-semibold fs-6">Company</label>
							
												<div class="col-lg-8">
												
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
													<input type="text" name="company" class="form-control form-control-lg form-control-solid" placeholder="Item Name" Value="Accounts" disabled>
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
		<!--begin::Modal - delete item-->
		<div class="modal fade" id="kt_modal_delete_item" tabindex="-1" aria-hidden="true">
			
		</div>
		<!--end::Modal - delete item-->
		<input type="hidden" id="baseurl" value="<?php echo base_url();?>">
		<?php $this->load->view("script");?>
        <script>
            $("#kt_datatable_dom_positioning").DataTable(
            {
                //"ordering": false,
                "aaSorting": [],
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
		var baseurl= $("#baseurl").val();
		function savebankfun()
		{
			var bankname         = $('#bankname').val();
			var bankprecentage   = $('#bankprecentage').val();
			var bankbranch 	     = $('#bankbranch').val();
			var bankaddress      = $('#bankaddress').val();
			var bankmonths       = $('#bankmonths').val();
			var bankplusintmonth = $('#bankplusintmonth').val();
			var bankplusint      = $('#bankplusint').val();


			if(bankname.trim()=="")
			{
				$('#bankname').focus();
				$('#bankname').addClass('error');
				Swal.fire({
				title: 'Error!',
				text: 'Please Enter Your Bank Name.',
				icon: 'error',
				confirmButtonText: 'Okay'
				})
				return false;
			}
			else if(bankprecentage=="")
			{

				$('#bankprecentage').focus();
				$('#bankprecentage').addClass('error');
				$('#bankname').removeClass("error");
				Swal.fire({
				title: 'Error!',
				text: 'Please Select Your Bank-precentage',
				icon: 'error',
				confirmButtonText: 'Okay'
				})
				return false;
			}
			else if(bankbranch.trim()=="")
			{

				$('#bankbranch').focus();
				$('#bankbranch').addClass('error');
				$('#bankprecentage').removeClass("error");
				$('#bankname').removeClass("error");
				Swal.fire({
				title: 'Error!',
				text: 'Please Enter Your Bank Branch',
				icon: 'error',
				confirmButtonText: 'Okay'
				})
				return false;
			}
			else if(bankaddress.trim()==""){
				$('#bankaddress').focus();
				$('#bankaddress').addClass('error');
				$('#bankprecentage').removeClass("error");
				$('#bankname').removeClass("error");
				$('#bankbranch').removeClass("error");
				Swal.fire({
				title: 'Error!',
				text: 'Please Enter Your Bank Address',
				icon: 'error',
				confirmButtonText: 'Okay'
				})
				return false;
			}
			
			else if(bankmonths.trim()==""){

				$('#bankmonths').focus();
				$('#bankmonths').addClass('error');
				$('#bankprecentage').removeClass("error");
				$('#bankname').removeClass("error");
				$('#bankbranch').removeClass("error");
				$('#bankaddress').removeClass("error");
				Swal.fire({
				title: 'Error!',
				text: 'Please Enter Your Bank Months',
				icon: 'error',
				confirmButtonText: 'Okay'
				})
				return false;
			}
			else if(bankplusintmonth.trim()==""){
				$('#bankplusintmonth').focus();
				$('#bankplusintmonth').addClass('error');
				$('#bankprecentage').removeClass("error");
				$('#bankname').removeClass("error");
				$('#bankbranch').removeClass("error");
				$('#bankaddress').removeClass("error");
				$('#bankmonths').removeClass("error");
				Swal.fire({
				title: 'Error!',
				text: 'Please Enter Your Bank Months',
				icon: 'error',
				confirmButtonText: 'Okay'
				})
				return false;
			}
			else if(bankplusint.trim()=="")
			{
				$('#bankplusint').focus();
				$('#bankplusint').addClass('error');
				$('#bankprecentage').removeClass("error");
				$('#bankname').removeClass("error");
				$('#bankbranch').removeClass("error");
				$('#bankaddress').removeClass("error");
				$('#bankmonths').removeClass("error");
				$('#bankplusintmonth').removeClass("error");
				Swal.fire({
				title: 'Error!',
				text: 'Please Enter Your Bank itration Month intrest',
				icon: 'error',
				confirmButtonText: 'Okay'
				})
				return false;
			}
			else
			{
				$('#bankprecentage').removeClass("error");
				$('#bankname').removeClass("error");
				$('#bankbranch').removeClass("error");
				$('#bankaddress').removeClass("error");
				$('#bankintrest').removeClass("error");
				$('#bankmonths').removeClass("error");
				$('#bankplusintmonth').removeClass("error");
				$('#bankplusint').removeClass("error");

				var formData = new FormData();
				formData.append('bankname', bankname);
				formData.append('bankprecentage', bankprecentage);
				formData.append('bankbranch', bankbranch);
				formData.append('bankaddress', bankaddress);
				formData.append('bankmonths', bankmonths);
				formData.append('bankplusintmonth', bankplusintmonth);
				formData.append('bankplusint', bankplusint);
					

				$.ajax(
				{
					url: baseurl+'repledge/bankdatasave',
					type: 'POST',
					data: formData,
					async: false,
					cache: false,
					contentType: false,
					processData: false,
					success: function (response) 
					{
						var returnedData = JSON.parse(response);
						console.log(returnedData);
						if(returnedData.return_code == 0)
						{
							Swal.fire({
								title: 'Success',
								text: 'Repledge Bank Added Successfully.',
								icon: 'success',
								confirmButtonText: 'Okay'
							})
							$('#kt_modal_add_newitem').hide();
							location.reload();
						}
						else
						{
							Swal.fire({
								title: 'error',
								text: 'Repledge Bank Added Not Successfully.',
								icon: 'error',
								confirmButtonText: 'Okay'
							})
							$('#kt_modal_add_newitem').show();


						}


					}
				});
			}
		}
		</script>
	</body>
</html>