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
									<h1 class="d-flex align-items-center text-dark fw-bold my-1 fs-3">Loan Summary List
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
										<!--begin::Card body-->
										<div class="card-body py-4">
										<form name="loansummary_form" id="loansummary_form" method="POST" action="<?php echo base_url(); ?>Loansummary" enctype="multipart/form-data">			
											<div class="row mb-6">
												<div class="col-lg-8">
													<div style="padding: 5px 5px 5px 5px !important;box-shadow: 0 3px 6px #00002947;border-radius: 5px;background-color: #f5f5f1;">
														<div class="row">
															<!--begin::Label-->
															<label class="col-md-2 col-form-label required fw-bold fs-6">Bill No</label>
															<!--end::Label-->
															<!--begin::Col-->
															<div class="col-lg-3 fv-row fv-plugins-icon-container">
																<input type="text" name="bill_no" id="bill_no" class="form-control form-control-lg form-control-solid" placeholder="Bill No" value=<?php if(isset($_POST['bill_no']))echo $_POST['bill_no'];?>>
																<div class="fv-plugins-message-container invalid-feedback"></div>
															</div>
															<!--end::Col-->		
															<!--begin::Label-->
															<div class="col-lg-4">
															<label class="col-form-label fw-bold fs-6">Loan Date</label>
															
															<label class="col-form-label fw-semibold fs-6">: <?php if(isset($_POST['bill_no'])){
																if($loan_data) echo date("d-M-Y",strtotime($loan_data[0]['ENDATE']));}?></label>
															</div>
															<!--end::Label-->
															<!--begin::Label-->
															<div class="col-lg-3">
															<label class="col-form-label fw-bold fs-6">Loan Period</label>
															
															<label class="col-form-label fw-semibold fs-6">: <?php if(isset($_POST['bill_no'])){
															 // echo $loan_data[0]['MONTHS'];
															}?>
																
															<?php
															if(isset($_POST['bill_no'])){
																
																if($loan_data){	$value = substr($loan_data[0]['INTERESTTYPE'],0,2); 
																

																	if(($value == 'F-') || ($value == 'H-')){
																		echo "Days";
																	}else{
																		echo "Months";
																	}	
																}
																
															}
														
															?>

															</label>
															
															</div>
															<!--end::Label-->	
														</div>
														<div class="row">	
															<!--begin::Label-->
															<div class="col-lg-5">
															<label class="col-form-label fw-bold fs-6">Name</label>
															
															<label class="col-form-label fw-semibold fs-6">: <?php if(isset($_POST['bill_no'])){
																if($loan_data)  echo $loan_data[0]['NAME'];}?></label>
															
															</div>
															<!--end::Label-->
															<!--begin::Label-->
															<div class="col-lg-4">
															<label class="col-form-label fw-bold fs-6">Loan Amount</label>
														
															<label class="col-form-label fw-semibold fs-6">: <?php if(isset($_POST['bill_no'])){
																if($loan_data) echo $loan_data[0]['AMOUNT'];}?></label>
															
															</div>
															<!--end::Label-->
															<!--begin::Label-->
															<div class="col-lg-3">
																<label class="col-form-label fw-bold fs-6">Interest</label>
															
															<label class="col-form-label fw-semibold fs-6">: <?php if(isset($_POST['bill_no'])){
																if($loan_data) echo $loan_data[0]['INTEREST'];}?>%</label>
														
															</div>
															<!--end::Label-->	
														</div>
														<div class="row">	
															<!--begin::Label-->
															<div class="col-lg-5">
																<label class="col-form-label fw-bold fs-6">Address:</label>
																<label class="col-form-label fw-semibold fs-6"><?php if(isset($_POST['bill_no'])){
																if($loan_data) echo $loan_data[0]['ADDRESS1']." ".$loan_data[0]['ADDRESS2'];}?></label>

															</div>
															<!--end::Label-->
															<!--begin::Label-->
															<div class="col-lg-4">
																<label class="col-form-label fw-bold fs-6">Renewal From</label>
																<label class="col-form-label fw-semibold fs-6">: <?php if(isset($_POST['bill_no'])){
																if($loan_data) echo $loan_data[0]['REN_FROM_BILLNO'];}?></label>
															</div>
															<!--end::Label-->
															<!--begin::Label-->
															<div class="col-lg-3">
																<label class="col-form-label fw-bold fs-6">Renewal To</label>
																<label class="col-form-label fw-semibold fs-6">: <?php if(isset($_POST['bill_no'])){
																if($loan_data) echo $loan_data[0]['REN_TO_BILLNO'];}?></label>
															</div>
															<!--end::Label-->	
														</div>
														<div class="row">	
															<!--begin::Label-->
															<div class="col-lg-5">
																<label class="col-form-label fw-bold fs-6">Net Weight</label>
																<label class="col-form-label fw-semibold fs-6">: <?php if(isset($_POST['bill_no'])){
																if($loan_data) echo $loan_data[0]['NETWEIGHT'];}?></label>
															</div>
															<!--end::Label-->
															<!--begin::Label-->
															<div class="col-lg-4">
																<label class="col-form-label fw-bold fs-6">Nominee</label>
																<label class="col-form-label fw-semibold fs-6">: <?php if(isset($_POST['bill_no'])){
																if($loan_data) echo $loan_data[0]['NOMINEE'];}?></label>
															</div>
															<!--end::Label-->
															<!--begin::Label-->
															<div class="col-lg-3">
																<label class="col-form-label fw-bold fs-6">Relation</label>
																<label class="col-form-label fw-semibold fs-6">: <?php if(isset($_POST['bill_no'])){
																if($loan_data) echo $loan_data[0]['RELATION'];}?></label>
															</div>
															<!--end::Label-->	
														</div>
														<div class="row">	
															<!--begin::Label-->
															<div class="col-lg-12">
																<label class="col-form-label col-lg-2 fw-bold fs-6">Pledge Detail:</label>
																<label class="col-form-label col-lg-8 fw-semibold fs-6 text-wrap text-justify"> <?php if(isset($_POST['bill_no'])){
																if($loan_data) echo $loan_data[0]['PLEDGEINFO'];}?></label>
															</div>
															<!--end::Label-->
														</div>

														<div class="row">	
															<!--begin::Label-->
															<label class="col-md-3 col-form-label fw-bold fs-6">Customer Remarks</label>
															<!--end::Label-->
															<!--begin::Col-->
															<div class="col-lg-5 fv-row fv-plugins-icon-container">
															<input type="text" name="up_remks" id="in_remks" class="form-control form-control-lg form-control-solid" value=<?php 

															if(isset($_POST['bill_no'])){

																// echo cus_remks;exit();
																echo $loan_data[0]['CUSTOMER_REMARKS'];
															}
															?>>
															</div>
															<!--end::Col-->	
															<div class="col-lg-3 d-flex flex-center flex-row-fluid">
															<p class="btn btn-primary" data-bs-dismiss="modal" id="up_remks" onclick='get_remarks();'>Update Remarks</p>
															</div>
														</div>
														<div class="col-lg-1"></div>
														<div class="row">	
															<!--begin::Label-->
															<label class="col-md-3 col-form-label fw-bold fs-6">Int Amount</label>
															<!--end::Label-->
															<!--begin::Col-->
															<div class="col-lg-2 fv-row fv-plugins-icon-container">
																<input type="text" name="Interest" class="form-control form-control-lg form-control-solid" placeholder="Interest">
															</div>

															<!--end::Col-->	
														</div>
													</div>
												</div>
												<div class="col-lg-4">
													<div style="padding: 5px 5px 5px 5px !important;box-shadow: 0 3px 6px #00002947;border-radius: 5px;background-color: #f5f5f1;">
														<div class="row">
															<!--begin::Label-->
															<div class="col-lg-12">
															<?php
															if(isset($_POST['bill_no'])){
																{
																if($loan_data) 
																if($loan_data[0]['ACTIVE']=='Y'){
																	?>
																	<label class="close-form close-form-solid fw-bold text-success fs-4">ACTIVE</label>
																	<?php
																}else{
																?>
																<label class="close-form close-form-solid fw-bold text-danger fs-4">CLOSED</label>
																<label class="close-form close-form-solid fw-bold text-danger fs-4">
																<?php 
																	echo $loan_data[0]['CLOSING_STATUS'];
																	?>
																</label>
																<?php		
																	}
																}
															}
																?>
															</div>
															<!--end::Label-->
														</div>
														<div class="row">
															<!--begin::Label-->
															<div class="col-lg-12">
																<label class="col-form-label fw-bold fs-6">Total Period</label>
																<label class="col-form-label fw-semibold fs-6">: <?php

																if(isset($_POST['bill_no'])){

																	if($loan_data){

																		if($loan_data[0]['ACTIVE']=='Y'){

																			$date1 = date("d-m-Y",strtotime($loan_data[0]['ENDATE']));

																			$date2 = date('d-m-Y');

																		$datetime1 = date_create($date1);
																		$datetime2 = date_create($date2);
																		 
																		  // Calculates the difference between DateTime objects
																		  $interval = date_diff($datetime1, $datetime2);
																		  $year = $interval->format('%y');
																		  $month = $interval->format('%m');
																		  $days = $interval->format('%d');

																		  $months = ($year*12)+$month;
																		 
																		  $val = $months." "."Months"." ".$days." "."Days";
																		  // Printing result in years & months format
																		  echo $val;// $interval->format(' %m months %d days');
																		}else{
																		$date1 = date("d-M-Y",strtotime($loan_data[0]['ENDATE']));

																		$date2 = date("d-M-Y",strtotime($loan_data[0]['CLOSEDATE']));

																		 $datetime1 = date_create($date1);
																		 $datetime2 = date_create($date2);
																		 
																		  // Calculates the difference between DateTime objects
																		  $interval = date_diff($datetime1, $datetime2);
																		  $year = $interval->format('%y');
																		  $month = $interval->format('%m');
																		  $days = $interval->format('%d');

																		  $months = ($year*12)+$month;
																		 
																		  $val = $months." "."Months"." ".$days." "."Days";
																		  // Printing result in years & months format
																		  echo $val;// $interval->format(' %m months %d days');
																		}
																	}
																}
																?></label>
															</div>
															<!--end::Label-->
														</div>
														<div class="row">
															<!--begin::Label-->
															<div class="col-lg-12">
																<label class="col-form-label fw-bold fs-6">Last Receipt Date</label>
																<label class="col-form-label fw-semibold fs-6">: <!-- <?php 

																//if(isset($_POST['bill_no']) && $loan_data[0]['LASTRECEIPTDATE']!='')echo $loan_data[0]['LASTRECEIPTDATE'];else echo $loan_data[0]['ENDATE'];?> -->
																
																<?php

																if(isset($_POST['bill_no'])){

																	if($loan_data){

																		if($loan_data[0]['ACTIVE']=='Y'){

																$date = $loan_data[0]['LASTRECEIPTDATE'];
																$endate = $loan_data[0]['ENDATE'];
        														$c_date = date("d-M-Y",strtotime($date));
        														$en_date =date("d-M-Y",strtotime($endate));
        														

        														if($loan_data[0]['LASTRECEIPTDATE']){
        															echo $c_date;
        														}
        															else {

        															 echo $en_date;	
																		}
																	}

																else{
																	
																	$retdate=$loan_view[2][0]['RETURNDATE'];
																	$ret_date =date("d-M-Y",strtotime($retdate));	
																	if( $loan_view[2][0]['RETURNDATE']){
        															echo $ret_date;

																		}
																	}
																}
															}
														?>		
															
																</label>
															</div>
															<!--end::Label-->
														</div>
														<div class="row">
															<!--begin::Label-->
															<div class="col-lg-12">
																<label class="col-form-label fw-bold fs-6">Paid Principal</label>
																<label class="col-form-label fw-semibold fs-6">: <?php if(isset($_POST['bill_no'])) 
																if($loan_data){

																	if($loan_data[0]['ACTIVE']=='Y'){
																			echo $loan_data[0]['PAIDPRINCIPAL'];	
																		}else{

																			echo $loan_view[2][0]['PRINCIPAL'];

																		}

																}?></label>
															</div>
															<!--end::Label-->
														</div>
														<div class="row">
															<!--begin::Label-->
															<div class="col-lg-12">
																<label class="col-form-label fw-bold fs-6">Paid Interest</label>
																<label class="col-form-label fw-semibold fs-6">: <?php if(isset($_POST['bill_no']))
																if($loan_data)

																	{

																	if($loan_data[0]['ACTIVE']=='Y'){
																			echo $loan_data[0]['PAIDINTEREST'];	
																		}else{

																			echo $loan_view[2][0]['INTEREST'];

																		}
																	}
																		
																?>
																		
																	</label>
															</div>
															<!--end::Label-->
														</div>
														<div class="row">
															<!--begin::Label-->
															<div class="col-lg-12">
																<label class="col-form-label fw-bold fs-6">Loan Balance</label>
																<label class="col-form-label fw-semibold fs-6">: <?php if(isset($_POST['bill_no']))

																if($loan_data)

																	{
																		if($loan_data[0]['ACTIVE']=='Y'){
																			echo $loan_data[0]['BALANCE'];	
																		}else{

																			echo "-";

																		}
																		}?></label>
															</div>
															<!--end::Label-->
														</div>
														<div class="row">
														<div class="col-lg-5 d-flex flex-center ">
															<button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Loan Entry</button>
														</div>
														<div class="col-lg-1"></div>
														<div class="col-lg-5 d-flex flex-center ">
																<button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Send SMS</button>
															</div>
														</div>
													</div>
												</div>
												<!-- <div class="col-lg-4">
													<label class="col-form-label fw-bold fs-6">Loan Amount</label>
													<label class="col-form-label fw-semibold fs-6">: 2000</label>	
												</div> -->
											</div>
											<!--begin::Table-->
											<div class="row">
												<table id="kt_datatable_view_particular_party_loan_summary_history_both_scrolls_report" class="table table-striped border rounded table-hover fs-7 gs-2 gy-1">
												    <thead>
												        <tr class="fw-bold fs-7 text-gray-800">
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
												    <?php if(isset($_POST['bill_no'])){ 

												    	if($loan_data){
												    	?>
												    	<tr>
												    		<td class="cy">
												            <?php 
												            		
													            if($loan_data[0]){

													            	echo date("d-m-Y",strtotime($loan_view[0][0]['ENDATE']));
													            }	

												            ?>

												            </td>
												            <td class="ple1"></td>
												            <td class="ple1">Loan</td>
												            <td class="ple1"></td>
												            <td class="ple1">
												            	
												            	<?php 

													          		if($loan_view[0]){

													            		echo "-".$loan_view[0][0]['AMOUNT'];
													            	}
												            	

												            	?>
												            </td>
												            <td class="ple1">
												            	<?php 

												            	
																if($loan_data){
												            		echo "0.00";
												            	}

												            	?>
												            </td>
												            <td class="ple1"></td>
												            <td class="ple1"></td>
												            <td class="ple1">	

												            	<?php 

												            	
																if($loan_data){
												            		echo "-".$loan_view[0][0]['AMOUNT'];
												            	}

												            	?></td>
												    		
												    	</tr>

												    	<?php

												        	if($loan_data[0]['ACTIVE']=='N'){

												        		if($loan_view[1]){
												        			
												        			foreach ($loan_view[1] as $key => $loan_View) {
												        			
												        ?>

												    	<tr>

												    		<td class="ple1">
												        	<?php 

												        			//recept data
												            	echo date("d-m-Y",strtotime($loan_View['ADDED_TIME']));
												            	
												            ?>
												            		
												            </td>	
												        	<td class="ple1">
												        	<?php 

												            	echo $loan_View['RECEIPT_SNO'];

												            ?>
												        	</td>
												        	<td class="ple1">Receipt</td>
												        	<td class="ple1"></td>
												        	<td class="ple1">
												        	<?php echo $loan_View['PRINCIPAL'];?>
												        	</td>
												        	<td class="ple1"><?php echo $loan_View['INT_AMOUNT'];?>	
												        	</td>	
												        	<td class="ple1">
												        	<?php
												        		echo $loan_View['MAINTAINCHARGE']+
												        			$loan_View['NOTICECHARGE']+
												        			$loan_View['FORMCHARGE']+
												        			$loan_View['HL_AMOUNT'];
												        	?>	
												        	</td>
												        	<td class="ple1">
												        	<?php echo $loan_View['DISCOUNT']; ?>	
												        	</td>
												        	<td class="ple1">
												        	<?php echo $loan_View['PAIDAMOUNT']; ?>	
												        	</td>
												    		
												    	</tr>

												   		<?php } } 

												   		if($loan_view[2]){
																foreach ($loan_view[2] as $key => $loan_Red) {

															?>

												    	<tr>
															<td class="ple1">
												        		<?php 
																	echo date("d-m-Y",strtotime($loan_Red['RETURNDATE']));
												            	
												            	?>
												            	
												            </td>	
												        	<td class="ple1"></td>
												        	<td class="ple1">Redemption</td>
												        	<td class="ple1"></td>
												        	<td class="ple1">
											        			<?php 
											            			echo $loan_Red['PRINCIPAL']-$loan_Red['PAIDPRINCIPAL'];
											            	
											            		?>
												            			
												            </td>	
												        	<td class="ple1">
												        		<?php 

											            			echo $loan_Red['INTEREST']-$loan_Red['PAIDINTEREST'];

											            		?>
											            					
											            	</td>
												        	<td class="ple1"></td>
												        	<td class="ple1"></td>
												        	<td class="ple1">
												        		<?php 
																	echo $loan_Red['PRINCIPAL']-$loan_Red['PAIDPRINCIPAL']+$loan_view[2][0]['INTEREST']-$loan_view[2][0]['PAIDINTEREST'];

											            		?>
												        	</td>
												    	</tr>
												    <?php } } } } }?>
												       
												    </tbody>
												    <tfoot>
												     	<?php if($loan_data){?>
												     
											            <tr class="fw-bold fs-6 text-gray-800">
												           	<th class="min-w-100px cy"></th>
												            <th class="min-w-100px"></th>
												            <th class="min-w-100px"></th>
												            <th class="min-w-100px">Total</th>
												            <th class="min-w-100px">
												            	<?php 
																
												            	if(isset($_POST['bill_no'])){

												            		$val = [];	
												            		$val2 = [];
												            		$val3 = [];


														            if($loan_data[0]['ACTIVE'] == 'N'){

														            	if($loan_view[1]){

														            		foreach ($loan_view[1] 
														            			as $key =>
														            			$loanView){
														            			$val[] = $loanView['PRINCIPAL']; 
																			}
														            	}

														            	
													            		if($loan_view[2]){

													            			foreach ($loan_view[2] as $key => $loan_red) {
														            			$val2[]= $loan_red['PRINCIPAL']; 
														            			$val3[]= $loan_red['PAIDPRINCIPAL'];
													            			}
													            		}



													            		echo array_sum($val)+array_sum($val2)-array_sum($val3)-$loan_data[0]['AMOUNT'];
													            		

												            		}else{
												            			
												            			echo "-".$loan_data[0]['AMOUNT'];
																		
												            		}

												            	}
												        
												            	?>
												            	
												            </th>

												            <th class="min-w-80px">	
												            <?php 

												            	if(isset($_POST['bill_no'])){

												            		if($loan_data[0]['ACTIVE']=='N'){
													            		if($loan_view[0]){
													            	
															            	$val = [];
															            	
															            	foreach ($loan_view[1] as $key => $loanView) {
															            		$val[] = $loanView['INT_AMOUNT']; 
															            	}
															            	
															            	$val2 = [];
															            	$val3=[];
															            	if($loan_view[2]){
																            	foreach ($loan_view[2] as $key => $loan_red) {
																            			$val2[]= $loan_red['INTEREST']; 
														            					$val3[]= $loan_red['PAIDINTEREST'];
														            			}
													            			}

													            			echo "0.00"+array_sum($val)+array_sum($val2)-array_sum($val3);
													            		}

												            		}
												            	}
												            ?>
												            	
												            </th>
												            <th class="min-w-100px"></th>
												            <th class="min-w-100px"></th>
												            <th class="min-w-100px">
												            	<?php 

												            	if(isset($_POST['bill_no'])){

												            		$val =[];
												            	 	
																	if($loan_view[0]){

														            	foreach ($loan_view[0] as $key => $loanView){
														            		$val[] = $loanView['AMOUNT']; 
														            	}
														            }


														            $val2 = [];

														            if($loan_data[0]['ACTIVE'] == 'N'){

															            foreach ($loan_view[1] as $key => $loanView) 
															            {
															            	$val2[] = $loanView['PAIDAMOUNT']; 
															            }
														            }
														            


														            		
														            $val3 = [];
														            $val4 = [];
														            $val5 = [];
														            $val6=[];

														            if($loan_data[0]['ACTIVE'] == 'N'){

															            foreach ($loan_view[2] as $key => $loan_red)
															            {
															            	$val3[]= $loan_red['PRINCIPAL']; 
															            		$val4[]= $loan_red['PAIDPRINCIPAL'];
															            	$val5[]= $loan_red['INTEREST'];
															            	$val6[]= $loan_red['PAIDINTEREST']; 
															            }
															        }

														            echo array_sum($val2)+array_sum($val3)-array_sum($val4)+array_sum($val5)-array_sum($val6)-array_sum($val);

														        }
														    
														    ?>
												            	
												            </th>
												        </tr>
											        </tfoot>
											    <?php } ?>
												    
												</table>	
											</div>											<!--end::Table-->
										</div>
										<!--end::Card body-->
									</form>
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
			$("#kt_datatable_view_particular_party_loan_summary_history_both_scrolls_report").DataTable({
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
			      $("#kt_datatable_view_particular_party_loan_summary_history_both_scrolls_report").kendoTooltip({
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

		var input = document.getElementById("bill_no");

		input.addEventListener("keypress", function(event) {
		if (event.key === "Enter") {
		event.preventDefault();

		//alert(input.value);

		$('#loansummary_form').submit();		

			// alert(up_remks);exit;

		// 	var baseurl= $("#baseurl").val();
		// 	var inputval = document.getElementById("up_remks");
		// 	// alert(inputval);
		// 	$.ajax({
		// 	type: "POST",
		// 	url: baseurl+'Loansummary/upd_remarks',
		// 	async: false,
		// 	type: "POST",
		// 	data: "id="+input.value+"&input_value="+inputval,
		// 	dataType: "html",
		// 	success: function(response)
		// 	{
		// 		// alert();
		// 		//location.reload();
		// 		console.log(response);
		// 	}
		// });
		   
		  }
		});

		</script>

		<script>
			
		function get_remarks(){
			
		 	var baseurl= $("#baseurl").val();
		 	var inputval = document.getElementById("in_remks").value;
			// alert(baseurl);
		 	$.ajax({
			type: "POST",
			url: baseurl+'Loansummary/upd_remarks',
			async: false,
			type: "POST",
			data: "input_value="+inputval+"&bill_no="+input.value,
			dataType: "html",
			success: function(response)
			{
				//alert(response);
				//location.reload();
			}
		});		   
		}
		</script>
	</body>
	<!--end::Body-->
</html>