<?php $this->load->view("common");?>

		<link href="<?php echo base_url();?>assets/jquery.autocomplete.css" rel="stylesheet" type="text/css" />
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
									<h1 class="d-flex align-items-center text-dark fw-bold my-1 fs-3">Ledger Summary
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
										<form action="<?php echo base_url();?>ledgersummary" method="post">
	                        				<div class="row px-4 py-4">
												<!-- <label class="col-lg-1 col-form-label fw-semibold fs-6">Select</label> -->
												<div class="col-lg-2 fv-row fv-plugins-icon-container">
													<label class="form-label">Ledger</label>
													<input type="text" class="form-control form-control-lg form-control-solid" name="account_led_name" id="account_led_name" onkeyup="ledger_autocomplete();" value="<?php echo $account_led_name;?>">
													<input type="hidden" class="form-control form-control-lg form-control-solid" name="account_led_id" id="account_led_id" value="<?php echo $account_led_id;?>">
													<br>
													<span id="opbal"></span>
												</div>
												<div class="col-lg-2 fv-row fv-plugins-icon-container">
													<label class="form-label">Filter By</label>
													<select class="form-select form-select-solid" data-control="select2" data-hide-search="true" id="filter_by" name="filter_by" onchange = "getDate(this.value);">	
														<option value="thisyear" <?php echo $filter_by=='thisyear'?'selected':'';?>>This Year</option>
														<option value="thismonth" <?php echo $filter_by=='thismonth'?'selected':'';?>>This Month</option>
														<option value="thisweek" <?php echo $filter_by=='thisweek'?'selected':'';?>>This Week</option>
														<option value="lastmonth" <?php echo $filter_by=='lastmonth'?'selected':'';?>>Last Month</option>
														<option value="lastweek" <?php echo $filter_by=='lastweek'?'selected':'';?>>Last Week</option>
													</select>
												</div>
												<div class="col-lg-2 fv-row">
														<label class="form-label">From</label>
													<div class="d-flex align-items-center">
														<input type="date" class="form-control form-control-solid ps-12" name="start_date" placeholder="Select" id="start_date" value="<?php echo $start_date; ?>" />
													</div>
												</div>
												<div class="col-lg-2 fv-row">
														<label class="form-label">To</label>
													<div class="d-flex align-items-center">
														<input type="date" class="form-control form-control-solid ps-12" name="end_date" placeholder="Select" id="end_date" value="<?php echo $end_date; ?>" />
													</div>
												</div>
												<div class="col-lg-2 fv-row fv-plugins-icon-container">
													<label class="form-label">Sort</label>
													<select class="form-select form-select-solid" data-control="select2" data-hide-search="true" id="sort_type" name="sort_type">	
														<option value="asc" <?php echo $sort_type=='asc'?'selected':'';?>>ASC</option>				
														<option value="desc" <?php echo $sort_type=='desc'?'selected':'';?>>DESC</option>
													</select>
												</div>
									            <div class="col-lg-2 fv-row fv-plugins-icon-container">
													<button type="submit" class="btn btn-sm btn-outline btn-outline-solid btn-outline-warning btn-active-light-primary mt-9">Go</button>
												</div>
											</div>
										</form>
										<!--begin::Card body-->
										<div class="card-body py-4">
											<?php if($account_led_id!=''){
												$ledger_dr_total = 0;
												$ledger_cr_total = 0;
											?>
												<table class="table align-middle table-row-dashed table-striped table-hover fs-7 gy-1 gs-2" id="kt_datatable_responsive_summaryledgerpage">
													<!--begin::Table head-->
													<thead>
														<!--begin::Table row-->
														<tr class="text-start text-muted fw-bold fs-7 gs-0">
															<!-- <th class="min-w-125px cy" style="width: 20%;">Company</th> -->
															<th class="min-w-125px">Date</th>
															<th class="min-w-125px">Vchr. Type</th>
															<th class="min-w-125px">V.No</th>
															<th class="min-w-125px">Particulars</th>
															<th class="min-w-125px">Debit</th>
															<th class="min-w-125px">Credit</th>
															<th class="min-w-125px">Closing Balance</th>
															<th class="min-w-125px">User</th>
															<th class="min-w-125px">Ref No.</th>
															<th class="min-w-125px">Description</th>
														</tr>
														<!--end::Table row-->
													</thead>
													<!--end::Table head-->
													<!--begin::Table body-->
													<tbody class="text-gray-600 fw-semibold">
														<?php
															$this->Ledgersummary_model->delete_account_specific_ledger();
															$acc_ledger_det = $this->Ledgersummary_model->get_account_ledger_by_ledger_sno($account_led_id);
															if(count((array)$acc_ledger_det)>0)
															{
																$data['VoucherNo'] = '';
																$data['Voucher_Slno'] = '1';
																$data['TransVoucher'] = '1';
																$data['vouchertype'] = 'opening balance';
																$data['Transtype'] = 'opening balance';
																$data['TransDate'] = $fin_year_start_date;
																$data['TransLedger'] = $acc_ledger_det->LEDGER_NAME;
																$data['TransAmount'] = $acc_ledger_det->OP_BALANCE;
																$data['TransSide'] = $acc_ledger_det->OP_SIDE;
																$data['CompanyCode'] = $acc_ledger_det->COMPANYCODE;
																$this->Ledgersummary_model->insert_open_bal_account_specific_ledger($data);
															}

															$vAmount = 0;
															$vSide = '';

															$voucher_master_details = $this->Ledgersummary_model->get_voucher_master_details_by_ledger_sno($account_led_id,$fin_year_start_date,$end_date);
															if(count((array)$voucher_master_details)>0)
															{
																foreach($voucher_master_details as $vmdet)
																{
																	$data1['VoucherNo'] = $vmdet['MASTER_SNO'];
																	$data1['Voucher_Slno'] = $vmdet['ROWNO'];
																	$data1['TransVoucher'] = '0';
																	$data1['TransDate'] = $vmdet['TRANSDATE'];
																	$data1['TransTime'] = $vmdet['ADDED_TIME'];
																	$data1['TransWeekday'] = '';
																	$data1['TransLedger'] = $vmdet['LEDGER_NAME'];
																	if($vmdet['DEBIT'] > $vmdet['CREDIT'])
																	{
																		$data1['TransAmount'] = $vmdet['DEBIT'];
																		$data1['TransSide'] = 'dr';
																		$vAmount = $vmdet['DEBIT'];
		            													$vSide = "dr";
																	}
																	else
																	{
																		$data1['TransAmount'] = $vmdet['CREDIT'];
																		$data1['TransSide'] = 'cr';
																		$vAmount = $vmdet['CREDIT'];
		            													$vSide = "cr";
																	}
																	$data1['TransNarration'] = $vmdet['DESCRIPTION'];
																	$data1['TransUser'] = $vmdet['ADDED_USER'];
																	$data1['VoucherType'] = $vmdet['VOUCHER_TYPE'];
																	$data1['Transtype'] = $vmdet['TRANSTYPE'];
																	$data1['CompanyCode'] = $vmdet['COMPANYCODE'];
																	$data1['ref_no'] = $vmdet['AREFNO'];
																	$this->Ledgersummary_model->insert_voucher_master_account_specific_ledger($data1);
																}
															}

															$account_specific_ledger_list = $this->Ledgersummary_model->get_account_specific_ledger_list();
															$b=0;
															$account_ledger_group_id_det = $this->Ledgersummary_model->get_account_ledger_by_ledger_sno($account_led_id);
															$vGroupSNo = $account_ledger_group_id_det->GROUP_ID;

															$account_ledger_group_side_det = $this->Ledgersummary_model->get_account_ledger_by_group_sno($vGroupSNo);
															$vSide = $account_ledger_group_side_det->GROUP_SIDE;
															if(count((array)$account_specific_ledger_list)>0)
															{
																$s=0;foreach($account_specific_ledger_list as $asllist)
																{
																	if($asllist['TransDate']>=$start_date && $asllist['TransDate']<=$end_date)
																	{?>

																		<?php if($s==0 && $b>0){?>
																			<tr>
																				<td><?php echo $start_date;?></td>
																				<td></td>
																				<td></td>
																				<td>Opening Balance is ...</td>
																				<?php if($ledger_dr_total > $ledger_cr_total){?>
																					<td align="right"><?php echo number_format(($ledger_dr_total - $ledger_cr_total),2);?></td>
																					<td></td>
																					<td align="right"><?php echo number_format(($ledger_dr_total - $ledger_cr_total),2);?> DR</td>
																				<?php }elseif($ledger_cr_total > $ledger_dr_total){?>
																					<td></td>
																					<td align="right"><?php echo number_format(($ledger_cr_total - $ledger_dr_total),2);?></td>
																					<td align="right"><?php echo number_format(($ledger_cr_total - $ledger_dr_total),2);?> CR</td>
																				<?php }else{
																					if(strtolower($vSide)=='dr'){?>
																					?>
																						<td align="right"><?php echo number_format(($ledger_dr_total - $ledger_cr_total),2);?></td>
																						<td></td>
																					<?php }else{?>
																						<td></td>
																						<td align="right"><?php echo number_format(($ledger_dr_total - $ledger_cr_total),2);?></td>
																					<?php }?>
																					<td align="right"><?php echo number_format(($ledger_cr_total - $ledger_dr_total),2);?> <?php echo $vSide;?></td>
																				<?php }?>
																				<td></td>
																				<td></td>
																				<td></td>
																			</tr>
																		<?php $s=1;$b=0;}?>
																		<tr>
																			<td><?php echo $asllist['TransDate'];?></td>
																			<td><?php echo $asllist['VoucherType']!='opening balance'?$asllist['VoucherType']:'';?></td>
																			<td><?php echo $asllist['VoucherNo'];?></td>
																			<?php if($asllist['VoucherType']=='opening balance'){?>
																				<td>Opening Balance</td>
																			<?php }else{
																				$vTempLedgerName = "";
		        																$vFinalLedgerName = "";
																				if($asllist['TransType']!='')
																				{
																					$voucher_master_record = $this->Ledgersummary_model->get_voucher_master_record($asllist['VoucherNo'],$asllist['TransLedger'],$asllist['TransType']);
																					$vTempLedgerName = strtolower($voucher_master_record[0]['LEDGER_NAME']);
																					if($asllist['TransLedger']=='CASH' || $asllist['TransLedger']=='LOAN SUSPENSE A/C')
																					{
																						if($asllist['Transtype']=='LOAN_PAYMENT' || $asllist['Transtype']=='LOAN_RECEIPT' || $asllist['Transtype']=='REDEMPTION')
																						{
																							$loan_details = $this->Ledgersummary_model->get_loan_detail_by_ref_no($voucher_master_record[0]['REF_NO']);
																							if(count((array)$loan_details)>0)
																							{
																								if(is_null($loan_details->NAME))
																								{
																									$GetLedgerNamePrint = '';
																								}
																								else
																								{
																									$GetLedgerNamePrint = $loan_details->NAME;
																								}
																							}
																						}
																					}

																					foreach($voucher_master_record as $vmr)
																					{
																						if($vmr['GROUP_ID']==7 || $vmr['GROUP_ID']==8)
																						{
																							$vFinalLedgerName = strtolower($vmr['LEDGER_NAME']);
																						}
																					}

																					if($vFinalLedgerName!='')
																					{
																						$GetLedgerNamePrint = $vFinalLedgerName;
																					}
																					else
																					{
																						$GetLedgerNamePrint = $vTempLedgerName;
																					}

																				}
																				?>
																				<td><?php echo $GetLedgerNamePrint;?></td>
																			<?php }?>

																			<?php if(strtolower($asllist['TransSide'])=='dr')
																			{?>
																				<td align="right"><?php echo number_format($asllist['TransAmount'],2);?></td>
																				<td></td>
																			<?php $ledger_dr_total = $ledger_dr_total + $asllist['TransAmount'];}
																			else{?>
																				<td></td>
																				<td align="right"><?php echo number_format($asllist['TransAmount'],2);?></td>
																			<?php $ledger_cr_total = $ledger_cr_total + $asllist['TransAmount'];}?>

																			<?php if($ledger_dr_total > $ledger_cr_total){?>
																				<td align="right"><?php echo number_format(($ledger_dr_total - $ledger_cr_total),2);?> Dr</td>
																			<?php }elseif($ledger_cr_total > $ledger_dr_total){?>
																				<td align="right"><?php echo number_format(($ledger_cr_total - $ledger_dr_total),2);?> Cr</td>
																			<?php }else{?>
																				<td align="right"><?php echo number_format(($ledger_cr_total - $ledger_dr_total),2);?> <?php echo $vSide;?></td>
																			<?php }?>

																			<td><?php echo $asllist['TransUser'];?></td>
																			<td><?php echo $asllist['REF_NO'];?></td>
																			<td><?php echo $asllist['TransNarration'];?></td>

																		</tr>
																	<?php
																	}elseif($asllist['TransDate'] < $start_date)
																	{
																		if(strtolower($asllist['TransSide']) == 'dr')
																            $ledger_dr_total = $ledger_dr_total + $asllist['TransAmount'];
																        else
																            $ledger_cr_total = $ledger_cr_total + $asllist['TransAmount'];
																	$b=1;}
																}

																if($s==0 && $b>0){?>
																	<tr>
																		<td><?php echo $start_date;?></td>
																		<td></td>
																		<td></td>
																		<td>Opening Balance is ...</td>
																		<?php if($ledger_dr_total > $ledger_cr_total){?>
																			<td align="right"><?php echo number_format(($ledger_dr_total - $ledger_cr_total),2);?></td>
																			<td></td>
																			<td align="right"><?php echo number_format(($ledger_dr_total - $ledger_cr_total),2);?> DR</td>
																		<?php }elseif($ledger_cr_total > $ledger_dr_total){?>
																			<td></td>
																			<td align="right"><?php echo number_format(($ledger_cr_total - $ledger_dr_total),2);?></td>
																			<td align="right"><?php echo number_format(($ledger_cr_total - $ledger_dr_total),2);?> CR</td>
																		<?php }else{
																			if(strtolower($vSide)=='dr'){?>
																			?>
																				<td align="right"><?php echo number_format(($ledger_dr_total - $ledger_cr_total),2);?></td>
																				<td></td>
																			<?php }else{?>
																				<td></td>
																				<td align="right"><?php echo number_format(($ledger_dr_total - $ledger_cr_total),2);?></td>
																			<?php }?>
																			<td align="right"><?php echo number_format(($ledger_cr_total - $ledger_dr_total),2);?> <?php echo $vSide;?></td>
																		<?php }?>
																		<td></td>
																		<td></td>
																		<td></td>
																	</tr>
																<?php $s=1;$b=0;?>															
																	<tr>
																		<td></td>
																		<td></td>
																		<td></td>
																		<td>Total</td>
																		<?php if($ledger_dr_total > $ledger_cr_total){?>
																			<td align="right"><?php echo number_format(($ledger_dr_total - $ledger_cr_total),2);?></td>
																			<td align="right">0.00</td>
																		<?php }elseif($ledger_cr_total > $ledger_dr_total){?>
																			<td align="right">0.00</td>
																			<td align="right"><?php echo number_format(($ledger_cr_total - $ledger_dr_total),2);?></td>
																		<?php }else{
																			if(strtolower($vSide)=='dr'){?>
																			?>
																				<td align="right"><?php echo number_format(($ledger_dr_total - $ledger_cr_total),2);?></td>
																				<td align="right">0.00</td>
																			<?php }else{?>
																				<td align="right">0.00</td>
																				<td align="right"><?php echo number_format(($ledger_dr_total - $ledger_cr_total),2);?></td>
																			<?php }?>
																		<?php }?>
																		<td></td>
																		<td></td>
																		<td></td>
																		<td></td>
																	</tr>
																<?php }else{?>
																	<tr>
																		<td></td>
																		<td></td>
																		<td></td>
																		<td align="right">Total</td>
																		<td><?php echo number_format($ledger_dr_total,2);?></td>
																		<td align="right"><?php echo number_format($ledger_cr_total,2);?></td>
																		<td></td>
																		<td></td>
																		<td></td>
																		<td></td>
																	</tr>
																<?php }

																?>
																<tr>
																	<td><?php echo $end_date;?></td>
																	<td></td>
																	<td></td>
																	<?php if($ledger_dr_total < $ledger_cr_total){?>
																		<td><b>Closing Balance is.....Cr</b></td>
																		<td></td>
																		<td align="right"><?php echo number_format(($ledger_cr_total - $ledger_dr_total),2);?></td>
																	<?php }elseif($ledger_cr_total < $ledger_dr_total){?>
																		<td><b>Closing Balance is.....Dr</b></td>
																		<td align="right"><?php echo number_format(($ledger_dr_total - $ledger_cr_total),2);?></td>
																		<td></td>
																	<?php }else{?>
																		<td><b>Closing Balance is.....<?php echo $vSide;?></b></td>
																		<?php if(strtolower($vSide)=='dr'){?>
																			<td align="right"><?php echo number_format(($ledger_dr_total - $ledger_cr_total),2);?></td>
																			<td></td>
																		<?php }else{?>
																			<td></td>
																			<td align="right"><?php echo number_format(($ledger_dr_total - $ledger_cr_total),2);?></td>
																		<?php }?>
																	<?php }?>
																	<td></td>
																	<td></td>
																	<td></td>
																	<td></td>
																</tr>
															<?php }
														?>
													</tbody>
												</table>
											<?php }?>
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
		<!--End::View Company-->

		<input type="hidden" id="baseurl" value="<?php echo base_url();?>">
		<?php $this->load->view("script");?>
		<script src="<?php echo base_url();?>assets/jquery.autocomplete.js"></script>
		
		<script>
			$("#kt_datatable_responsive_summaryledgerpage").DataTable({
			"ordering": false,
			// "aaSorting":[],
			// "buttons": [
			//             'copy', 'csv', 'excel', 'pdf', 'print'
			//         ],
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

var title = $('title').text() + ' | ' + 'Ledger Summary';
    $(document).attr("title", title);

var base = $('#baseurl').val();



function isNumberKey(evt, obj)
{ 
    var charCode = (evt.which) ? evt.which : event.keyCode
    var value = obj.value;
    var dotcontains = value.indexOf(".") != -1;
    if (dotcontains)
        if (charCode == 46) return false;
    if (charCode == 46) return true;
    if (charCode > 31 && (charCode < 48 || charCode > 57))
        return false;
    return true;
}

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



function ledger_autocomplete(i)
{
	var showparty = 0;
	//alert(showparty);
	$("#account_led_name").autocomplete({ 
            valueKey:'title',
            source:[{
            url: base+'payment/get_payment_ledger?type=PRO_MANA&query=%QUERY%&showparty='+showparty,
            type:'remote',
            ajax:{

              dataType : 'json',
            }
        }],
minLength: 3}).on('selected.xdsoft',function(e,suggestion,ui){ 
            $("#account_led_name").val(suggestion.title);
            $('#account_led_id').val(suggestion.id);
            //$('#opbal').html(suggestion.opbal);

            /*var pid = $('#account_led_id').val();
            //alert(pid);

            var baseurl= $("#baseurl").val();
			//alert(val);
			$.ajax({
			type: "POST",
			url: baseurl+'ledgersummary/get_ledger_info',
			async: false,
			type: "POST",
			data: "id="+pid,
			dataType: "html",
			success: function(response)
			{
				//var resp = response.split('||');
				$('#opbal').html(response);
			}
			});*/
          
    });
        $("#account_led_name").focus();
}

function getDate(val)
{
	var baseurl= $("#baseurl").val();
	//alert(val);
	$.ajax({
	type: "POST",
	url: baseurl+'ledgersummary/getDate',
	async: false,
	type: "POST",
	data: "val="+val,
	dataType: "html",
	success: function(response)
	{
		var resp = response.split('||');
		$('#start_date').val(resp[1]);
		$('#end_date').val(resp[2]);
	}
	});
}
		</script>
	</body>
	<!--end::Body-->
</html>