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
									<h1 class="d-flex align-items-center text-dark fw-bold my-1 fs-3">Interest Wise Report
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
									
									<!--begin::Card toolbar-->
									<div class="card-toolbar">
										<!--begin::Toolbar-->
										<div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
											<!--begin::Filter-->
											<!-- <button type="button" class="btn btn-primary me-3" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
											<span class="svg-icon svg-icon-2">
												<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="256" height="256" viewBox="0 0 256 256" xml:space="preserve">
													<g transform="translate(128 128) scale(0.72 0.72)" style="">
														<g style="stroke: none; stroke-width: 0; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: none; fill-rule: nonzero; opacity: 1;" transform="translate(-175.05 -175.05000000000004) scale(3.89 3.89)" >
															<path d="M 37.882 90 c -0.338 0 -0.676 -0.086 -0.981 -0.258 c -0.629 -0.354 -1.019 -1.02 -1.019 -1.742 V 45.354 L 3.923 3.208 C 3.464 2.604 3.388 1.791 3.726 1.11 S 4.758 0 5.517 0 h 78.966 c 0.76 0 1.453 0.43 1.791 1.11 s 0.262 1.493 -0.197 2.098 L 54.118 45.354 V 79.37 c 0 0.699 -0.365 1.348 -0.963 1.71 l -14.237 8.63 C 38.601 89.903 38.241 90 37.882 90 z M 9.543 4 l 29.932 39.474 c 0.264 0.348 0.406 0.772 0.406 1.208 v 39.767 l 10.236 -6.205 V 44.682 c 0 -0.437 0.143 -0.861 0.406 -1.208 L 80.457 4 H 9.543 z M 52.118 79.37 h 0.01 H 52.118 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(255,255,255); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" /></g></g>
												</svg>

											</span>Filter</button> -->
											<!--begin::Menu 1-->
											<!--<div class="menu menu-sub menu-sub-dropdown w-300px w-md-325px" data-kt-menu="true">
												
												<div class="px-7 py-5">
													<div class="fs-5 text-dark fw-bold">Filter Options</div>
												</div>
												
												<div class="separator border-gray-200"></div>
												<div class="px-7 py-5" data-kt-user-table-filter="form">
													<div class="mb-10">
														<label class="form-label fs-6 fw-semibold">Role:</label>
														<select class="form-select form-select-solid fw-bold" data-kt-select2="true" data-placeholder="Select option" data-allow-clear="true" data-kt-user-table-filter="role" data-hide-search="true">
															<option></option>
															<option value="Administrator">Administrator</option>
															<option value="Analyst">Analyst</option>
															<option value="Developer">Developer</option>
															<option value="Support">Support</option>
															<option value="Trial">Trial</option>
														</select>
													</div>
													<div class="mb-10">
														<label class="form-label fs-6 fw-semibold">Two Step Verification:</label>
														<select class="form-select form-select-solid fw-bold" data-kt-select2="true" data-placeholder="Select option" data-allow-clear="true" data-kt-user-table-filter="two-step" data-hide-search="true">
															<option></option>
															<option value="Enabled">Enabled</option>
														</select>
													</div>
													<div class="d-flex justify-content-end">
														<button type="reset" class="btn btn-light btn-active-light-primary fw-semibold me-2 px-6" data-kt-menu-dismiss="true" data-kt-user-table-filter="reset">Reset</button>
														<button type="submit" class="btn btn-primary fw-semibold px-6" data-kt-menu-dismiss="true" data-kt-user-table-filter="filter">Apply</button>
													</div>
													
												</div>
											
											</div>-->
											<!--end::Menu 1-->
											<!--end::Filter-->
										</div>
										<!--end::Toolbar-->
										<!--begin::Group actions-->
										<div class="d-flex justify-content-end align-items-center d-none" data-kt-user-table-toolbar="selected">
											<!--<div class="fw-bold me-5">
											<span class="me-2" data-kt-user-table-select="selected_count"></span>Selected</div>-->
											<button type="button" class="btn btn-danger" data-kt-user-table-select="delete_selected">Delete Selected</button>
										</div>
										<!--end::Group actions-->
										<!--begin::Modal - Adjust Balance-->
										<div class="modal fade" id="kt_modal_export_users" tabindex="-1" aria-hidden="true">
											<!--begin::Modal dialog-->
											<div class="modal-dialog modal-dialog-centered mw-650px">
												<!--begin::Modal content-->
												<div class="modal-content">
													<!--begin::Modal header-->
													<div class="modal-header">
														<!--begin::Modal title-->
														<h2 class="fw-bold">Export Party</h2>
														<!--end::Modal title-->
														<!--begin::Close-->
														<div class="btn btn-icon btn-sm btn-active-icon-primary" data-kt-users-modal-action="close">
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
									
													<!--end::Modal body-->
												</div>
												<!--end::Modal content-->
											</div>
											<!--end::Modal dialog-->
										</div>
										<!--end::Modal - New Card-->
									</div>
									<!--end::Card toolbar-->
							
								<!--end::Card header-->
						
							<!--begin::Card body-->
							<div class="card-body py-4">
								<form name="interestwise_report_form" id="interestwise_report_form" method="POST" action="<?php echo base_url(); ?>Interestwisereport" enctype="multipart/form-data">
								<div class="row">
									<div class="col-lg-4">
												<div class="row">
													<div class="col-lg-1"></div>
													<div class="col-lg-8 fv-row fv-plugins-icon-container fv-plugins-bootstrap5-row-invalid">
														<div class="d-flex align-items-center">
															<label class="form-check form-check-inline form-check-solid me-5 is-invalid">
																<input class="form-check-input" name="intwisebillno" id="intwisebillno" type="checkbox" 

																<?php

																if(isset($_POST['intwisebillno'])) echo "checked";


																?>

																>
															</label>
															<span class="col-form-label fw-semibold fs-6">Bill No</span>
														</div>
													</div>
												</div>
											<!-- <?php $intwisebillno ?> -->
												<div class="row">
													<div class="col-lg-1"></div>
													<div class="col-lg-8 fv-row fv-plugins-icon-container fv-plugins-bootstrap5-row-invalid">
														<div class="d-flex align-items-center">
															<label class="form-check form-check-inline form-check-solid me-5 is-invalid">
																<input class="form-check-input" name="intwiseinttype" id="intwiseinttype" type="checkbox"


																<?php

																if(isset($_POST['intwiseinttype'])) echo "checked";


																?>
																>
															</label>
															<span class="col-form-label fw-semibold fs-6">Interest Type</span>
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-lg-1"></div>
													<div class="col-lg-8 fv-row fv-plugins-icon-container fv-plugins-bootstrap5-row-invalid">
														<div class="d-flex align-items-center">
															<label class="form-check form-check-inline form-check-solid me-5 is-invalid">
																<input class="form-check-input" name="intwiseperiod" id="intwiseperiod" type="checkbox"

																<?php

																if(isset($_POST['intwiseperiod'])) echo "checked";


																?>

																>
															</label>
															<span class="col-form-label fw-semibold fs-6">Period</span>
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-lg-1"></div>
													<div class="col-lg-5 fv-row fv-plugins-icon-container fv-plugins-bootstrap5-row-invalid">
														<div class="d-flex align-items-center">
															<label class="form-check form-check-inline form-check-solid me-5 is-invalid">
																<input class="form-check-input" name="intwisename" id="intwisename" type="checkbox"

																<?php

																if(isset($_POST['intwisename'])) echo "checked";


																?>

																>
															</label>
															<span class="col-form-label fw-semibold fs-6">Name</span>
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-lg-1"></div>
													<div class="col-lg-5 fv-row fv-plugins-icon-container fv-plugins-bootstrap5-row-invalid">
														<div class="d-flex align-items-center">
															<label class="form-check form-check-inline form-check-solid me-5 is-invalid">
																<input class="form-check-input" name="intwiseactive" id="intwiseactive" type="checkbox"
																<?php

																if(isset($_POST['intwiseactive'])) echo "checked";


																?>
																>
															</label>
															<span class="col-form-label fw-semibold fs-6">Active</span>
														</div>
													</div>
												</div>
											
								</div>
								<div class="col-lg-6">
								
										<!-- 	<div class="row">
												<div class="col-lg-5 fv-row fv-plugins-icon-container fv-plugins-bootstrap5-row-invalid">
													<div class="d-flex align-items-center">
														<label class="form-check form-check-inline form-check-solid me-5 is-invalid">
															<input class="form-check-input" name="intwiseloandateasc" id="intwiseloandateasc"  type="radio">
														</label>
														<span class="col-form-label fw-semibold fs-6">Loan Date - Ascending</span>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-lg-5 fv-row fv-plugins-icon-container fv-plugins-bootstrap5-row-invalid">
													<div class="d-flex align-items-center">
														<label class="form-check form-check-inline form-check-solid me-5 is-invalid">
															<input class="form-check-input" name="intwiseloandateasc" id="intwiseloandatedesc" type="radio">
														</label>
														<span class="col-form-label fw-semibold fs-6">Loan Date - Descending</span>
													</div>
												</div>
											</div> -->
							<!--begin::Label-->
							<div class="row">

									<div class="col-lg-3 d-flex align-items-center">
										<div class="form-check form-check-custom">
											<input class="form-check-input2" type="radio" id="loan_date" name="int_report" value="int_report" 

											<?php if(isset($_POST['int_report'])) {
														if($_POST['int_report'] == "int_report" ) echo "checked";
													}?>/>
										</div>

										<div class="d-flex flex-column">
											<div class="fs-6 fw-semibold text-muted" style="padding-left: 10px;">Loan Date</div>
										</div>
									</div>		

								<div class="col-lg-4 fv-row">
								<!--begin::Select-->
									<select class="form-select form-select-solid" data-control="select2" name="intwiseloandateasc" id="intwiseloandateasc" data-hide-search="true">
										<option value="">Select</option>
										<option value="Ascending" 

										<?php
											if(isset($_POST['int_report'])){

													if($_POST['int_report'] == "int_report"){
														if(isset($_POST['intwiseloandateasc'])){

															if($_POST['intwiseloandateasc']=="Ascending")
															echo "selected";
														}
															
													}
												
												}

											
										?>

										>Ascending</option>
										<option value="Descending"

										<?php

										if(isset($_POST['int_report'])){

													if($_POST['int_report'] == "int_report"){

														if($_POST['int_report'] == "int_report"){
															if(isset($_POST['intwiseloandateasc'])){
																
																if($_POST['intwiseloandateasc']=="Descending")
																echo "selected";
															}
																
														}
														
													}
												
												}

										
										?>

										>Descending</option>
									</select>
									<!--end::Select-->
									<div class="fv-plugins-message-container invalid-feedback" ></div>
								</div>
						
						</div>

							<div class="row">

									<div class="col-lg-3 d-flex align-items-center">
										<div class="form-check form-check-custom">
											<input class="form-check-input2" type="radio" id="loan_amt" name="int_report" value="loan_amt" 




											<?php if(isset($_POST['int_report'])) {

														if($_POST['int_report'] == "loan_amt" ) echo "checked";
													}?>

											/>
										</div>

										<div class="d-flex flex-column">
											<div class="fs-6 fw-semibold text-muted" style="padding-left: 10px;">Amount</div>
										</div>
									</div>
								
								<!--end::Label-->				
								<div class="col-lg-4 fv-row">
								<!--begin::Select-->
									<select class="form-select form-select-solid" data-control="select2" name="intwiseamountasc" id="intwiseamountasc" data-hide-search="true">
										<option value="">Select</option>

										<option value="Ascending"

										<?php

												if(isset($_POST['int_report'])){

													if($_POST['int_report'] == "loan_amt"){

															if(isset($_POST['intwiseamountasc'])){
																
																if($_POST['intwiseamountasc']=="Ascending")
																echo "selected";
															}
																
														
														
													}
												
												}
											
										?>
										>Ascending</option>
										<option value="Descending"

										 <?php

											if(isset($_POST['int_report'])){

													if($_POST['int_report'] == "loan_amt"){

															if(isset($_POST['intwiseamountasc'])){
																
																if($_POST['intwiseamountasc']=="Descending")
																echo "selected";
															}		
														
													}
												
											}

										
										?>

										>Descending</option>
									</select>
									<!--end::Select-->
									<div class="fv-plugins-message-container invalid-feedback" ></div>
								</div>
							</div>


											<!-- <div class="row">
												<div class="col-lg-5 fv-row fv-plugins-icon-container fv-plugins-bootstrap5-row-invalid">
													<div class="d-flex align-items-center">
														<label class="form-check form-check-inline form-check-solid me-5 is-invalid" >
															<input class="form-check-input" name="intwiseamountasc" id="intwiseamountasc" type="radio">
														</label>
														<span class="col-form-label fw-semibold fs-6">Amount - Ascending</span>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-lg-5 fv-row fv-plugins-icon-container fv-plugins-bootstrap5-row-invalid">
													<div class="d-flex align-items-center">
														<label class="form-check form-check-inline form-check-solid me-5 is-invalid">
															<input class="form-check-input" name="intwiseamountasc"  type="radio" id="intwiseamountdesc">
														</label>
														<span class="col-form-label fw-semibold fs-6">Amount - Descending</span>
													</div>
												</div>
											</div> -->
										
									</div>
									
									<div class="col-lg-1">
											<div class="row">
												<div class="d-flex flex-center flex-row-fluid pt-4">
													<button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Go</button>
												</div>
											</div>
											<!-- <div class="row">
												<div class="d-flex flex-center flex-row-fluid pt-8">
													<button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Text File</button>
												</div>
											</div> -->
									
									</div>
								</div>
									<!--end::Table-->
								</form>
								<!--begin::Table-->
								<br>
							<table class="table table-striped table-hover table-row-bordered fs-7 gy-1 gs-2" 
							id="kt_datatable_responsive_interestwise_list">

								<thead>
	    							<tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">
							            
							            <th class="min-w-50px">Loan Date</th>
							            <th class="min-w-100px">Party Name</th>
							            <th class="min-w-80px">Amount</th>
							            <th class="min-w-100px">Bill No</th> 
							            <th class="min-w-80px">Active</th>
							            <th class="min-w-80px">Short</th>
	    							</tr>
								</thead>
								<tbody class="text-gray-600 fw-semibold">
									<?php $i=1; foreach($intreport_list as $interestwiselist){?>
									<tr>
							            
							            <td><?php echo $interestwiselist['ENDATE'];?></td>
							            <td><?php echo $interestwiselist['NAME'];?></td>
							            <td><?php echo $interestwiselist['AMOUNT'];?></td>
							            <td><?php echo $interestwiselist['BILLNO'];?></td>
							            <td><?php echo $interestwiselist['ACTIVE'];?></td>
							            <td><?php

										        // if($interestwiselist['BILLNO'])
										        // {
										        //     $shortexp = substr($interestwiselist['BILLNO'],0,9);
										           
										        //     echo $shortexp[0],$shortexp[1],$shortexp[2],$shortexp[3];
										        // }
										        // else
										        // {
										        //     $shexp = "";
										        // }

							            		if($interestwiselist['BILLNO'])
										        {
										            $shortexp = explode("/",$interestwiselist['BILLNO']);

										     		$data = preg_match("/^[0-9]+$/", $shortexp[0]);

										     		if($data)

										     		{

										     			echo $shortexp[0];
										     		}else{

										     			$value = explode("-",$shortexp[0]);
										     			echo $value[1];
										     		}
										            // if (!System.Text.RegularExpressions.Regex.IsMatch(textbox.Text, "[0-9]"))

										            // {


										            // }
										            // else
										            // {

										            // 	echo $shortexp;	

										            // 	}				            	

										        }
										        
										        else
										        {
										            $shexp = "";
										        }

										        // if($interestwiselist['BILLNO'])
										        // {
										        //     $shortexp = str_split($interestwiselist['BILLNO'],2);
										           
										        //     print_r( $shortexp);
										        // }
										        // else
										        // {
										        //     $shexp = "";
										        // }
										      


							            ?></td>
							        </tr>
							        <?php $i++;}?>
							    </tbody>
							</table>
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
		<input type="hidden" id="baseurl" value="<?php echo base_url();?>">
		<?php $this->load->view("script");?>

		<script>
		
		$('#kt_datatable_responsive_interestwise_list').DataTable( {
		"aaSorting": [],
        dom: 'Bfrtip',
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5'
        ]
    } );

</script>


<!-- <script>

		$('input:radio[name="intwiseloandateasc"]').change(function() {

	        if ($(this).val()=='select_ascend_value') 
	        {
	        	
	            $('#loanasc').attr('disabled',true);
	         
	        }else
	        {
	        	
	            $('#loanasc').removeAttr('disabled');
	          
	        }
	    });

	    $('input:radio[name="intwiseloandateasc"]').change(function() {

	        if ($(this).val()=='select_decend_value') 
	        {
	            $('#loandesc').attr('disabled',true);
	     
	        } else
	        {
	            $('#loandesc').removeAttr('disabled');
	      
	        }
	    });
	</script> -->


	</body>
	<!--end::Body-->
</html>