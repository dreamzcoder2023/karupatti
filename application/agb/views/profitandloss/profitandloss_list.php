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
									<h1 class="d-flex align-items-center text-dark fw-bold my-1 fs-3">Profit & Loss
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
										<form action="<?php echo base_url();?>profitandloss" method="post">
	                        				<div class="row px-4 py-4">
												<!-- <label class="col-lg-1 col-form-label fw-semibold fs-6">Select</label> -->
												<div class="col-lg-2 fv-row fv-plugins-icon-container">
													<label class="form-label">Month/Period</label>
													<select class="form-select form-select-solid" data-control="select2" data-hide-search="true" id="month_period" name="month_period">	
														<option value="month" <?php echo $month_period=='month'?'selected':'';?>>Month</option>				
														<option value="period" <?php echo $month_period=='period'?'selected':'';?>>Period</option>
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
													<label class="form-label">Type</label>
													<select class="form-select form-select-solid" data-control="select2" data-hide-search="true" id="type" name="type">	
														<option value="detailed" <?php echo $type=='detailed'?'selected':'';?>>Detailed</option>				
														<option value="summary" <?php echo $type=='summary'?'selected':'';?>>Summary</option>
													</select>
												</div>
												<div class="col-lg-2 fv-row fv-plugins-icon-container">
													<label class="form-label">Balance Type</label>
													<select class="form-select form-select-solid" data-control="select2" data-hide-search="true" id="balance_type" name="balance_type">	
														<option value="all" <?php echo $balance_type=='all'?'selected':'';?>>All</option>				
														<option value="greater_zero" <?php echo $balance_type=='greater_zero'?'selected':'';?>>Balance > 0</option>
													</select>
												</div>
									            <div class="col-lg-2 fv-row fv-plugins-icon-container">
													<button type="submit" class="btn btn-sm btn-outline btn-outline-solid btn-outline-warning btn-active-light-primary mt-9">Go</button>
												</div>
											</div>
										</form>
										<!--begin::Card body-->
										<div class="card-body py-4">
											<div class="row">
												<div class="col-lg-6">
													<!--begin::Table-->
													<table class="table align-middle table-row-dashed table-striped table-hover fs-7 gy-1 gs-2">
														<!--begin::Table head-->
														<thead>
															<!--begin::Table row-->
															<tr class="text-start text-muted fw-bold fs-7 gs-0">
																<!-- <th class="min-w-125px cy" style="width: 20%;">Company</th> -->
																<th class="min-w-125px">Expense</th>
																<th class="min-w-125px">Amount</th>
																<th class="min-w-125px">Total</th>
															</tr>
															<!--end::Table row-->
														</thead>
														<!--end::Table head-->
														<!--begin::Table body-->
														<tbody class="text-gray-600 fw-semibold">
															<?php $totDebits=0;$vGrossLTotal=0; 

															if($vOpeningStockValue>0)
															{
																?>
																<tr>
																	<td><b>OPENING STOCK - GOLD</b></td>
																	<td></td>
																	<td align="right"><?php echo number_format($vOpeningStockValue,2);?></td>
																</tr>
																<?php $totDebits = $totDebits + $vOpeningStockValue;
																$gold_cs_stock = $this->Profitandloss_model->get_gold_product_list();
																$tot = 0;
																//print_r($gold_cs_stock);exit;
																foreach($gold_cs_stock as $gcs)
																{
																	if(!is_null($gcs['OP_VALUE']))
																		$mm = $gcs['OP_VALUE'];
																	else
																		$mm = 0;															

																	if($balance_type=='greater_zero')
																	{
																		if($mm!=0)
																		{
																			if($type=='detailed')
																			{
																			?>
																				<tr>
																					<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $gcs['ITEM_NAME'].' - ( '.$gcs['OP_QTY'].' )';?></td>
																					<td align="right"><?php echo number_format($mm,2);?></td>
																					<td></td>
																				</tr>
																			<?php }
																		}
																	}
																	else
																	{
																		if($type=='detailed')
																		{
																		?>
																			<tr>
																				<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $gcs['ITEM_NAME'].' - ( '.$gcs['OP_QTY'].' )';?></td>
																				<td align="right"><?php echo number_format($mm,2);?></td>
																				<td></td>
																			</tr>
																		<?php }
																	}
																}

															}

															if($vOpeningStockValue2>0)
															{
																?>
																<tr>
																	<td><b>OPENING STOCK - SILVER</b></td>
																	<td></td>
																	<td align="right"><?php echo number_format($vOpeningStockValue2,2);?></td>
																</tr>
																<?php $totDebits = $totDebits + $vOpeningStockValue2;
																$silver_cs_stock = $this->Profitandloss_model->get_silver_product_list();
																$tot = 0;
																foreach($silver_cs_stock as $scs)
																{
																	if(!is_null($scs['OP_VALUE']))
																		$mm = $scs['OP_VALUE'];
																	else
																		$mm = 0;															

																	if($balance_type=='greater_zero')
																	{
																		if($mm!=0)
																		{
																			if($type=='detailed')
																			{
																			?>
																				<tr>
																					<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $scs['ITEM_NAME'];?></td>
																					<td align="right"><?php echo number_format($mm,2);?></td>
																					<td></td>
																				</tr>
																			<?php }
																		}
																	}
																	else
																	{
																		if($type=='detailed')
																		{
																		?>
																			<tr>
																				<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $scs['ITEM_NAME'];?></td>
																				<td align="right"><?php echo number_format($mm,2);?></td>
																				<td></td>
																			</tr>
																		<?php }
																	}
																}

															}

															foreach($expense_ledger_list as $ellist)
															{
																$tot=0;
																$group_list = $this->Profitandloss_model->get_ledger_group_list_by_group_name($ellist['GROUP_NAME']);
																foreach($group_list as $glist)
																{
																	$vOpeningBalance = 0;
																	$vOpeningSide = '';
																	$vClosingBalance = 0;
																	$vClosingSide = '';
																	$acc_led_group = $this->Profitandloss_model->get_account_ledger_group($glist['LEDGER_SNO']);
																	if(count((array)$acc_led_group)>0)
																	{
																		$vOpeningBalance = $acc_led_group->OP_BALANCE;
																		$vOpeningSide = $acc_led_group->OP_SIDE;
																	}

																	$expense_ledger_credit_debit = $this->Profitandloss_model->get_expense_ledger_credit_debit($glist['LEDGER_SNO'],$start_date,$end_date);
																	if(is_null($expense_ledger_credit_debit->TOTALDEBITS))
																	{
																		$vTotDebit = 0;
																	}
																	else
																	{
																		$vTotDebit = $expense_ledger_credit_debit->TOTALDEBITS;
																	}

																	if(is_null($expense_ledger_credit_debit->TOTALCREDITS))
																	{
																		$vTotCredit = 0;
																	}
																	else
																	{
																		$vTotCredit = $expense_ledger_credit_debit->TOTALCREDITS;
																	}

																	/*if(strtolower($vOpeningSide) == 'dr')
																	{
																		$vTotDebit = $vTotDebit + $vOpeningBalance;
																	}
																	else
																	{
																		$vTotCredit = $vTotCredit + $vOpeningBalance;
																	}*/
																	$vClosingBalance = $vClosingBalance + ($vOpeningBalance + $vTotDebit - $vTotCredit);

																	$mm = $vClosingBalance;

																	if($balance_type=='greater_zero')
																	{
																		if($mm!=0)
																		{
																			$tot = $tot + $mm;
																		}
																	}
																	else
																	{
																		$tot = $tot + $mm;
																	}
																}
																$totDebits+=$tot;
																?>
																<tr>
																	<td><b><?php echo $ellist['GROUP_NAME'];?></b></td>
																	<td></td>
																	<td align="right"><?php echo number_format($tot,2);?></td>
																</tr>

																<?php foreach($group_list as $glist)
																{
																	$vOpeningBalance = 0;
																	$vOpeningSide = '';
																	$vClosingBalance = 0;
																	$vClosingSide = '';
																	$acc_led_group = $this->Profitandloss_model->get_account_ledger_group($glist['LEDGER_SNO']);
																	if(count((array)$acc_led_group)>0)
																	{
																		$vOpeningBalance = $acc_led_group->OP_BALANCE;
																		$vOpeningSide = $acc_led_group->OP_SIDE;
																	}

																	$expense_ledger_credit_debit = $this->Profitandloss_model->get_expense_ledger_credit_debit($glist['LEDGER_SNO'],$start_date,$end_date);
																	if(is_null($expense_ledger_credit_debit->TOTALDEBITS))
																	{
																		$vTotDebit = 0;
																	}
																	else
																	{
																		$vTotDebit = $expense_ledger_credit_debit->TOTALDEBITS;
																	}

																	if(is_null($expense_ledger_credit_debit->TOTALCREDITS))
																	{
																		$vTotCredit = 0;
																	}
																	else
																	{
																		$vTotCredit = $expense_ledger_credit_debit->TOTALCREDITS;
																	}

																	/*if(strtolower($vOpeningSide) == 'dr')
																	{
																		$vTotDebit = $vTotDebit + $vOpeningBalance;
																	}
																	else
																	{
																		$vTotCredit = $vTotCredit + $vOpeningBalance;
																	}*/
																	$vClosingBalance = $vClosingBalance + ($vOpeningBalance + $vTotDebit - $vTotCredit);

																	$mm = $vClosingBalance;

																	if($balance_type=='greater_zero')
																	{
																		if($mm!=0)
																		{
																			if($type=='detailed')
																			{
																			?>
																				<tr>
																					<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $glist['LEDGER_NAME'];?></td>
																					<td align="right"><?php echo number_format($mm,2);?></td>
																					<td></td>
																				</tr>
																			<?php }
																		}
																	}
																	else
																	{
																		if($type=='detailed')
																		{
																		?>
																			<tr>
																				<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $glist['LEDGER_NAME'];?></td>
																				<td align="right"><?php echo number_format($mm,2);?></td>
																				<td></td>
																			</tr>
																		<?php }
																	}
																}
																?>
															<?php }
															?>

															<tr>
																<td></td>
																<td><b>Total</b></td>
																<td align="right"><?php echo number_format($totDebits,2);?></td>
															</tr>

														</tbody>
														<!--end::Table body-->
													</table>
													<!--end::Table-->
												</div>

												<div class="col-lg-6">
													<!--begin::Table-->
													<table class="table align-middle table-row-dashed table-striped table-hover fs-7 gy-1 gs-2">
														<!--begin::Table head-->
														<thead>
															<!--begin::Table row-->
															<tr class="text-start text-muted fw-bold fs-7 gs-0">
																
																<!-- <th class="min-w-125px cy" style="width: 20%;">Company</th> -->
																<th class="min-w-125px">Expense</th>
																<th class="min-w-125px">Amount</th>
																<th class="min-w-125px">Total</th>
															</tr>
															<!--end::Table row-->
														</thead>
														<!--end::Table head-->
														<!--begin::Table body-->
														<tbody class="text-gray-600 fw-semibold">
															<?php $totCredits=0;$vGrossLTotal=0; 

															if($vClosingStockValue>0)
															{
																?>
																<tr>
																	<td><b>CLOSING STOCK - GOLD</b></td>
																	<td></td>
																	<td align="right"><?php echo number_format($vClosingStockValue,2);?></td>
																</tr>
																<?php $totCredits = $totCredits + $vClosingStockValue;
																$gold_cs_stock = $this->Profitandloss_model->get_gold_product_list();
																$tot = 0;
																//print_r($gold_cs_stock);exit;
																foreach($gold_cs_stock as $gcs)
																{		
																	$voucher_master_rate = $this->Profitandloss_model->get_last_invoice_master_by_item($gcs['ITEM_SNO'],$end_date);
																	if(count((array)$voucher_master_rate)>0 && !is_null($voucher_master_rate->RATE))
																	{
																		$previousPurchaseRate = $voucher_master_rate->RATE;
																	}
																	else
																	{
																		$product_rate_details = $this->Profitandloss_model->get_product_by_item_no($gcs['ITEM_SNO']);
																		if(count((array)$product_rate_details)>0 && !is_null($product_rate_details->OP_RATE))
																		{
																			$previousPurchaseRate = $product_rate_details->OP_RATE;
																		}
																		elseif(count((array)$product_rate_details)>0 && !is_null($product_rate_details->PURCHASE_RATE))
																		{
																			$previousPurchaseRate = $product_rate_details->PURCHASE_RATE;
																		}
																	}
																	$mm = $vClosingStockAmt = $gcs['STOCK_QTY']*$previousPurchaseRate;

																	if($balance_type=='greater_zero')
																	{
																		if($mm!=0)
																		{
																			if($type=='detailed')
																			{
																			?>
																				<tr>
																					<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $gcs['ITEM_NAME'].' - ( '.$gcs['OP_QTY'].' )';?></td>
																					<td align="right"><?php echo number_format($mm,2);?></td>
																					<td></td>
																				</tr>
																			<?php }
																		}
																	}
																	else
																	{
																		if($type=='detailed')
																		{
																		?>
																			<tr>
																				<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $gcs['ITEM_NAME'].' - ( '.$gcs['OP_QTY'].' )';?></td>
																				<td align="right"><?php echo number_format($mm,2);?></td>
																				<td></td>
																			</tr>
																		<?php }
																	}
																}

															}

															if($vClosingStockValue2>0)
															{
																?>
																<tr>
																	<td><b>CLOSING STOCK - SILVER</b></td>
																	<td></td>
																	<td align="right"><?php echo number_format($vClosingStockValue2,2);?></td>
																</tr>
																<?php $totCredits = $totCredits + $vClosingStockValue2;
																$silver_cs_stock = $this->Profitandloss_model->get_silver_product_list();
																$tot = 0;
																foreach($silver_cs_stock as $scs)
																{
																	$voucher_master_rate = $this->Profitandloss_model->get_last_invoice_master_by_item($gcs['ITEM_SNO'],$end_date);
																	if(count((array)$voucher_master_rate)>0 && !is_null($voucher_master_rate->RATE))
																	{
																		$previousPurchaseRate = $voucher_master_rate->RATE;
																	}
																	else
																	{
																		$product_rate_details = $this->Profitandloss_model->get_product_by_item_no($gcs['ITEM_SNO']);
																		if(count((array)$product_rate_details)>0 && !is_null($product_rate_details->OP_RATE))
																		{
																			$previousPurchaseRate = $product_rate_details->OP_RATE;
																		}
																		elseif(count((array)$product_rate_details)>0 && !is_null($product_rate_details->PURCHASE_RATE))
																		{
																			$previousPurchaseRate = $product_rate_details->PURCHASE_RATE;
																		}
																	}
																	$mm = $vClosingStockAmt = $gcs['STOCK_QTY']*$previousPurchaseRate;														

																	if($balance_type=='greater_zero')
																	{
																		if($mm!=0)
																		{
																			if($type=='detailed')
																			{
																			?>
																				<tr>
																					<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $scs['ITEM_NAME'];?></td>
																					<td align="right"><?php echo number_format($mm,2);?></td>
																					<td></td>
																				</tr>
																			<?php }
																		}
																	}
																	else
																	{
																		if($type=='detailed')
																		{
																		?>
																			<tr>
																				<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $scs['ITEM_NAME'];?></td>
																				<td align="right"><?php echo number_format($mm,2);?></td>
																				<td></td>
																			</tr>
																		<?php }
																	}
																}

															}

															foreach($income_ledger_list as $ellist)
															{
																$tot=0;
																$group_list = $this->Profitandloss_model->get_income_ledger_group_list_by_group_name($ellist['GROUP_NAME']);
																foreach($group_list as $glist)
																{
																	$vOpeningBalance = 0;
																	$vOpeningSide = '';
																	$vClosingBalance = 0;
																	$vClosingSide = '';
																	$acc_led_group = $this->Profitandloss_model->get_account_ledger_group($glist['LEDGER_SNO']);
																	if(count((array)$acc_led_group)>0)
																	{
																		$vOpeningBalance = $acc_led_group->OP_BALANCE;
																		$vOpeningSide = $acc_led_group->OP_SIDE;
																	}

																	$expense_ledger_credit_debit = $this->Profitandloss_model->get_expense_ledger_credit_debit($glist['LEDGER_SNO'],$start_date,$end_date);
																	if(is_null($expense_ledger_credit_debit->TOTALDEBITS))
																	{
																		$vTotDebit = 0;
																	}
																	else
																	{
																		$vTotDebit = $expense_ledger_credit_debit->TOTALDEBITS;
																	}

																	if(is_null($expense_ledger_credit_debit->TOTALCREDITS))
																	{
																		$vTotCredit = 0;
																	}
																	else
																	{
																		$vTotCredit = $expense_ledger_credit_debit->TOTALCREDITS;
																	}

																	/*if(strtolower($vOpeningSide) == 'dr')
																	{
																		$vTotDebit = $vTotDebit + $vOpeningBalance;
																	}
																	else
																	{
																		$vTotCredit = $vTotCredit + $vOpeningBalance;
																	}*/
																	$vClosingBalance = $vClosingBalance + ($vOpeningBalance + $vTotDebit - $vTotCredit);

																	$mm = $vClosingBalance;

																	if($balance_type=='greater_zero')
																	{
																		if($mm!=0)
																		{
																			$tot = $tot + abs($mm);
																		}
																	}
																	else
																	{
																		$tot = $tot + abs($mm);
																	}
																}
																$totCredits+=$tot;
																?>
																<tr>
																	<td><b><?php echo $ellist['GROUP_NAME'];?></b></td>
																	<td></td>
																	<td align="right"><?php echo number_format($tot,2);?></td>
																</tr>

																<?php foreach($group_list as $glist)
																{
																	$vOpeningBalance = 0;
																	$vOpeningSide = '';
																	$vClosingBalance = 0;
																	$vClosingSide = '';
																	$acc_led_group = $this->Profitandloss_model->get_account_ledger_group($glist['LEDGER_SNO']);
																	if(count((array)$acc_led_group)>0)
																	{
																		$vOpeningBalance = $acc_led_group->OP_BALANCE;
																		$vOpeningSide = $acc_led_group->OP_SIDE;
																	}

																	$expense_ledger_credit_debit = $this->Profitandloss_model->get_expense_ledger_credit_debit($glist['LEDGER_SNO'],$start_date,$end_date);
																	if(is_null($expense_ledger_credit_debit->TOTALDEBITS))
																	{
																		$vTotDebit = 0;
																	}
																	else
																	{
																		$vTotDebit = $expense_ledger_credit_debit->TOTALDEBITS;
																	}

																	if(is_null($expense_ledger_credit_debit->TOTALCREDITS))
																	{
																		$vTotCredit = 0;
																	}
																	else
																	{
																		$vTotCredit = $expense_ledger_credit_debit->TOTALCREDITS;
																	}

																	/*if(strtolower($vOpeningSide) == 'dr')
																	{
																		$vTotDebit = $vTotDebit + $vOpeningBalance;
																	}
																	else
																	{
																		$vTotCredit = $vTotCredit + $vOpeningBalance;
																	}*/
																	$vClosingBalance = $vClosingBalance + ($vOpeningBalance + $vTotDebit - $vTotCredit);

																	$mm = $vClosingBalance;

																	if($balance_type=='greater_zero')
																	{
																		if($mm!=0)
																		{
																			if($type=='detailed')
																			{
																			?>
																				<tr>
																					<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $glist['LEDGER_NAME'];?></td>
																					<td align="right"><?php echo number_format(abs($mm),2);?></td>
																					<td></td>
																				</tr>
																			<?php 
																			}
																		}
																	}
																	else
																	{
																			if($type=='detailed')
																			{
																			?>
																				<tr>
																					<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $glist['LEDGER_NAME'];?></td>
																					<td align="right"><?php echo number_format(abs($mm),2);?></td>
																					<td></td>
																				</tr>
																			<?php 
																		}
																	}
																}
																?>
															<?php }
															?>

															<tr>
																<td></td>
																<td><b>Total</b></td>
																<td align="right"><?php echo number_format($totCredits,2);?></td>
															</tr>

														</tbody>
														<!--end::Table body-->
													</table>
													<!--end::Table-->
												</div>
											</div>
											<br>

											<?php
												$txtTotalDebit = number_format(abs($totDebits),2);
												$txtTotalCredit = number_format(abs($totCredits),2);
												if(abs($totDebits) < abs($totCredits))
												{
													$txtTotalDebit = number_format(abs($totCredits),2);
													$pl = '<b>Net Profit : '.number_format((abs($totCredits) - abs($totDebits)),2).'</b>';
												}
												else
												{
													$txtTotalCredit = number_format(abs($totDebits),2);
													$pl = '<b>Net Loss : '.number_format((abs($totDebits) - abs($totCredits)),2).'</b>';
												}
											?>

											<div class="row">
												<div class="col-lg-12" style="text-align:right"><h2><?php echo $pl;?></h2></div>
											</div>

											<div class="row">
												<div class="col-lg-6" style="text-align:right"><h2><b>Total : <?php echo $txtTotalDebit;?></b></h2></div>
												<div class="col-lg-6" style="text-align:right"><h2><b>Total : <?php echo $txtTotalCredit;?></b></h2></div>
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

		<!--begin::Modal - edit company-->
		<div class="modal fade" id="kt_modal_editdept" tabindex="-1" aria-hidden="true">
			
		</div>
		<!--end::Modal - edit company-->

		<!--begin::Modal - add department-->
		<div class="modal fade" id="kt_modal_adddept" tabindex="-1" aria-hidden="true">
			
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
						<div class="mb-7 text-center">
							<h1>Profit & Loss Entry [Spend Money,Expenses]</h1>
						</div>
						<!--end::Heading-->
						<form id="general_validate" style="width: 100%;" method="POST" action="<?php echo base_url(); ?>payment/payment_save" enctype="multipart/form-data" onsubmit="return payment_validation();">
							<!-- <input type="hidden" id="keyval" name="keyval" value="<?php //echo $kval;?>"> -->
							<div style="padding: 5px 5px 5px 5px !important;box-shadow: 0 3px 6px #00002947;border-radius: 5px;background-color: #f5f5f1;">
								<div class="row">
									<div class="col-lg-8">
										<div class="row">
											<label class="col-lg-1 col-form-label required fw-semibold fs-6">Date</label>
											<div class="col-lg-3 fv-row">
												<div class="d-flex align-items-center">
													<input type="date" class="form-control form-control-solid" name="add_date_payments" placeholder="Select Date" id="add_date_payments" />
												</div>
												<div class="fv-plugins-message-container invalid-feedback" id="add_date_payments_err"></div>
											</div>
											<label class="col-lg-1 col-form-label fw-semibold fs-6">Sno</label>
											<div class="col-lg-3 fv-row fv-plugins-icon-container">
												<input type="text" name="sno" id="sno" class="form-control form-control-lg form-control-solid" value="<?php echo $sno;?>" readonly>
												<div class="fv-plugins-message-container invalid-feedback"></div>
											</div>
											<div class="col-lg-3 fv-row fv-plugins-icon-container">
												<input type="text" name="detail_sno" id="detail_sno" class="form-control form-control-lg form-control-solid" value="<?php echo $detail_sno;?>" readonly>
												<div class="fv-plugins-message-container invalid-feedback" id="detail_sno_err"></div>
											</div>
										</div>
									</div>
									<div class="col-lg-4">
										<div class="row">
											<label class="col-lg-3 col-form-label fw-bold fs-5">User :</label>
											<label class="col-lg-9 close-form close-form-solid fw-bold text-danger fs-4"><?php echo $_SESSION['username'];?></label>
										</div><br>
										<div class="row">
											<label class="col-lg-3 col-form-label fw-bold fs-5">Time :</label>
											<label class="col-lg-9 close-form close-form-solid fw-bold text-danger fs-4"><?php date_default_timezone_set('Asia/Kolkata');echo date("d M Y h:i:sa"); ?></label>
										</div>
									</div>
								</div>
							</div><br>
							<div style="padding: 5px 5px 5px 5px !important;box-shadow: 0 3px 6px #00002947;border-radius: 5px;background-color: #f5f5f1;">
								<div class="row">
									<div class="col-lg-12">
										<div id="kt_docs_repeater_basic_add">
											<div class="form-group">
												<div id="mcontent10">
													<div class="row" id="mid0">
														<label class="col-lg-2 col-form-label fw-semibold fs-6">Account Ledger</label>
														<div class="col-lg-3 fv-row">
															<input type="text" class="form-control form-control-lg form-control-solid" name="account_led_name[]" id="account_led_name0" onkeyup="ledger_autocomplete(0);"><span id="opbal0"></span>
															<input type="hidden" class="form-control form-control-lg form-control-solid" name="account_led_id[]" id="account_led_id0">
															<div class="fv-plugins-message-container invalid-feedback" id="account_led_id_err0"></div>
														</div>
														<label class="col-lg-1 col-form-label fw-semibold fs-6">Amount</label>
														<div class="col-lg-3 fv-row">
															<input type="text" class="form-control mb-2 mb-md-0" placeholder="Enter Amount" name="add_amt_payments[]" id="add_amt_payments0" style="font-size: 17px !important;font-weight: 600 !important;" onkeyup="getProfit & LossAmount(0)" onkeypress="return isNumberKey(event,this);"/>
															<div class="fv-plugins-message-container invalid-feedback" id="add_amt_payments_err0"></div>
														</div>
														<!-- <div class="col-lg-2 fv-row">
															<a href="javascript:;" data-repeater-delete="" class="btn btn-sm btn-danger mt-md-3">
															<i class="la la-trash-o fs-3"></i>Delete</a>
														</div> -->
													</div>
												</div>
											</div>
											<div class="col-lg-2 form-group fv-row">
												<a href="javascript:;" onclick="add_payment()" class="btn btn-sm btn-outline btn-outline-solid btn-outline-warning btn-active-light-primary me-2">
												Add</a>
											</div>
										</div>
										<input type="hidden" id="acc_led_id" value="1">
									</div>
								</div>
							</div><br>
							<div style="padding: 5px 5px 5px 5px !important;box-shadow: 0 3px 6px #00002947;border-radius: 5px;background-color: #f5f5f1;">
								<div class="row">
									<label class="col-lg-2 col-form-label required fw-semibold fs-6">Paid From</label>
									<div class="col-lg-3 fv-row">
										<input type="text" class="form-control form-control-lg form-control-solid" name="paid_account_led_name" id="paid_account_led_name" onkeyup="paid_ledger_autocomplete();">
										<input type="hidden" class="form-control form-control-lg form-control-solid" name="paid_account_led_id" id="paid_account_led_id">
										<div class="fv-plugins-message-container invalid-feedback" id="paid_account_led_id_err"></div>
									</div>
									<label class="col-lg-1 col-form-label required fw-semibold fs-6">Total</label>
									<div class="col-lg-3 fv-row">
										<input type="text" class="form-control mb-2 mb-md-0" id="add_tota_payments" name="add_tota_payments" style="font-size: 17px !important;font-weight: 600 !important;" readonly/>
									</div>
									<label class="col-lg-1 col-form-label fw-semibold fs-6">Description</label>
									<div class="col-lg-2 fv-row fv-plugins-icon-container">
										<textarea class="form-control form-control-solid" id="description" name="description" rows="2" style="margin-top: 8px !important;"></textarea>
									</div>
								</div>
							</div><br>
							<div class="row">
								<div class="col-lg-3 fv-row fv-plugins-icon-container fv-plugins-bootstrap5-row-invalid">
									<div class="d-flex align-items-center">
										<label class="form-check form-check-inline form-check-solid me-5 is-invalid">
											<input class="form-check-input" name="communication[]" type="checkbox" value="1">
										</label>
										<span class="col-form-label fw-semibold fs-6">Save & Print</span>
									</div>
								</div>
								<!-- <div class="col-lg-3 fv-row fv-plugins-icon-container fv-plugins-bootstrap5-row-invalid">
									<div class="d-flex align-items-center">
										<label class="form-check form-check-inline form-check-solid me-5 is-invalid">
											<input class="form-check-input" name="show_party" id="show_party" type="checkbox">
										</label>
										<span class="col-form-label fw-semibold fs-6">Show Loans Parties</span>
									</div>
								</div> -->
								
								<div class="col-lg-2"></div>
								<!-- <div class="col-lg-1">
									<div class="d-flex flex-center flex-row-fluid pt-2">
										<button type="submit" class="btn btn-outline btn-outline-solid btn-outline-warning btn-active-light-primary me-10" data-bs-dismiss="modal">Print</button>
									</div>
								</div> -->
								<div class="col-lg-1">
									<div class="d-flex flex-center flex-row-fluid pt-2">
										<button type="reset" class="btn btn-secondary me-3" data-bs-dismiss="modal">Cancel</button>
									</div>
								</div>
								<div class="col-lg-2">
									<div class="d-flex flex-center flex-row-fluid pt-2">
										<button type="submit" class="btn btn-primary" id="save_changes_add_payments">Save Changes</button>
									</div>
								</div>
							</div>
						</form>
						<div class="row">
							<!-- <table class="table align-middle table-row-dashed table-striped table-hover fs-7 gy-1 gs-2" id="kt_datatable_dom_positioning_add_payments_table">
								<thead>
									<tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">
										<th class="min-w-20px cy">Sno</th>
										<th class="min-w-30px">Date</th>
										<th class="min-w-100px">Ledger</th>
										<th class="min-w-60px">Amount</th>
										<th class="min-w-60px">Paid By</th>
										<th class="min-w-100px">Description</th>
									</tr>
								</thead>
								<tbody class="text-gray-600 fw-semibold">
									<tr>
										<td class="cy">A2047</td>
										<td>27/06/2022</td>
										<td class="ple1">Tharmam @ Other Expenses</td>
										<td>2</td>
										<td>Cash</td>
										<td></td>
									</tr>
									<tr>
										<td class="cy">A2055</td>
										<td>27/06/2022</td>
										<td class="ple1">LKC 4000/- 2019-20 Assets</td>
										<td>5000</td>
										<td>Cash</td>
										<td>New</td>
									</tr>
									<tr>
										<td class="cy">A2054</td>
										<td>27/06/2022</td>
										<td class="ple1">Senthil Chits - 1000(09/04/2022)</td>
										<td>1000</td>
										<td>Cash</td>
										<td></td>
									</tr>
									<tr>
										<td class="cy">A2050</td>
										<td>27/06/2022</td>
										<td class="ple1">Other & Stationary Expenses</td>
										<td>70</td>
										<td>Cash</td>
										<td>A4 Sheets</td>
									</tr>
									<tr>
										<td class="cy">A2048</td>
										<td>27/06/2022</td>
										<td class="ple1">Busfare All Staff Expenses</td>
										<td>30</td>
										<td>Cash</td>
										<td>Sathya</td>
									</tr>
									<tr>
										<td class="cy">A2046</td>
										<td>27/06/2022</td>
										<td class="ple1">Other & Stationary Expenses</td>
										<td>500</td>
										<td>Cash</td>
										<td>Brother printer Services</td>
									</tr>
									<tr>
										<td class="cy">A2046</td>
										<td>27/06/2022</td>
										<td class="ple1">Other & Stationary Expenses</td>
										<td>500</td>
										<td>Cash</td>
										<td>Brother printer Services</td>
									</tr>
									<tr>
										<td class="cy">A2046</td>
										<td>27/06/2022</td>
										<td class="ple1">Other & Stationary Expenses</td>
										<td>500</td>
										<td>Cash</td>
										<td>Brother printer Services</td>
									</tr>
									<tr>
										<td class="cy">A2046</td>
										<td>27/06/2022</td>
										<td class="ple1">Other & Stationary Expenses</td>
										<td>500</td>
										<td>Cash</td>
										<td>Brother printer Services</td>
									</tr>
									<tr>
										<td class="cy">A2046</td>
										<td>27/06/2022</td>
										<td class="ple1">Other & Stationary Expenses</td>
										<td>500</td>
										<td>Cash</td>
										<td>Brother printer Services</td>
									</tr>
									<tr>
										<td class="cy">A2046</td>
										<td>27/06/2022</td>
										<td class="ple1">Other & Stationary Expenses</td>
										<td>500</td>
										<td>Cash</td>
										<td>Brother printer Services</td>
									</tr>
									<tr>
										<td class="cy">A2046</td>
										<td>27/06/2022</td>
										<td class="ple1">Other & Stationary Expenses</td>
										<td>500</td>
										<td>Cash</td>
										<td>Brother printer Services</td>
									</tr>
									<tr>
										<td class="cy">A2046</td>
										<td>27/06/2022</td>
										<td class="ple1">Other & Stationary Expenses</td>
										<td>500</td>
										<td>Cash</td>
										<td>Brother printer Services</td>
									</tr>
									<tr>
										<td class="cy">A2046</td>
										<td>27/06/2022</td>
										<td class="ple1">Other & Stationary Expenses</td>
										<td>500</td>
										<td>Cash</td>
										<td>Brother printer Services</td>
									</tr>

								</tbody>
								<tfoot>
									<tr class="text-start text-muted fw-bold fs-6 text-uppercase gs-0">
										<th class="min-w-20px cy"></th>
										<th class="min-w-30px"></th>
										<th class="min-w-100px">Total</th>
										<th class="min-w-60px">6602</th>
										<th class="min-w-60px"></th>
										<th class="min-w-100px"></th>
									</tr>
								</tfoot>
							</table> -->	
						</div>
						
						<!--begin::Actions-->
						<!-- <div class="row">
							<div class="col-lg-9"></div>
							<div class="col-lg-1">
								<div class="d-flex flex-center flex-row-fluid pt-12">
									<button type="reset" class="btn btn-secondary me-3" data-bs-dismiss="modal">Cancel</button>
								</div>
							</div>
							<div class="col-lg-2">
								<div class="d-flex flex-center flex-row-fluid pt-12">
									<button type="submit" class="btn btn-success" data-bs-dismiss="modal">Save Changes</button>
								</div>
							</div>
						</div> -->
						<!--end::Actions-->
					</div>
					<!--end::Modal body-->
				</div>
				<!--end::Modal content-->
			</div>
			<!--end::Modal dialog-->
		</div>
		<!--end::Modal - add department-->
		
		<!--begin::Modal - edit company-->
		<div class="modal fade" id="kt_modal_editpayment" tabindex="-1" aria-hidden="true">
			
		</div>
		<!--end::Modal - edit company-->
		<!--begin::Modal - view company-->
<div class="modal fade" id="kt_modal_viewdept" tabindex="-1" aria-hidden="true">
			<!--begin::Modal dialog-->
			<div class="modal-dialog modal-m">
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
						<div class="mb-13 text-center">
							<h1 class="mb-3">Profit & Loss Details</h1>
						</div>
						<!--end::Heading-->
						<div class="row mb-6">
							<!--begin::Label-->
							<label class="col-lg-4 col-form-label fw-semibold fs-6">Company</label>
							<!--end::Label-->
							<!--begin::Left Section-->
												<div class="col-lg-8">
												<!--begin::Select-->
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
													<input type="text" name="company" class="form-control form-control-lg form-control-solid" placeholder="Profit & Loss Name" Value="Accounts" disabled>
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
		<!--begin::Modal - delete department-->
		<div class="modal fade" id="kt_modal_delete_department" tabindex="-1" aria-hidden="true">
			
		</div>
		<!--end::Modal - delete department-->

		<div class="modal fade" id="kt_modal_delete_payment" tabindex="-1" aria-hidden="true">
			
		</div>

		<input type="hidden" id="baseurl" value="<?php echo base_url();?>">
		<?php $this->load->view("script");?>
		<script src="<?php echo base_url();?>assets/jquery.autocomplete.js"></script>
		<script>

var title = $('title').text() + ' | ' + 'Profit & Loss';
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

// $('#kt_datatable_dom_positioning').DataTable( {
// 	"aaSorting": [],
//         dom: 'Bfrtip',
//         buttons: [
//             'copyHtml5',
//             'excelHtml5',
//             'csvHtml5',
//             'pdfHtml5'
//         ]
//     } );	
		</script>
		<script>
		$("#kt_datatable_dom_positioning").DataTable({
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
	</body>
	<!--end::Body-->
</html>