<!--begin::Modal dialog-->
			<div class="modal-dialog modal-xl">
				<!--begin::Modal content-->
				<div class="modal-content rounded">
					<!--begin::Modal header-->
					<div class="modal-header justify-content-end border-0 pb-0">
						<!--begin::Close-->
						<div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal" onclick="CloseSaletoCCLlistModal()">
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
					<form method="POST" action="<?php echo base_url();?>jewelsettlement/send_to_ccl_sale_list ">
					<!--begin::Modal body-->
						<div class="modal-body pt-0 pb-15 px-5 px-xl-20">
							<!--begin::Heading-->
							<div class="mb-13 text-center">
								<h1 class="mb-3">Sale Value for Pledge Item</h1>
							</div>
							<div class="row">
								<label class="col-lg-1 col-form-label fw-semibold fs-6">Date</label>
								<label class="col-lg-2 col-form-label fw-bold fs-6"><?php echo date('Y-m-d');?></label>
								<label class="col-lg-1 col-form-label fw-semibold fs-6">Company</label>
								<label class="col-lg-5 col-form-label fw-bold fs-6"><?php 
								$res=$this->db->query("select * from COMPANY where COMPANYCODE='".$loan_details->COMPANYCODE."'")->row();
								echo $res->COMPANYNAME; ?></label>
								<label class="col-lg-1 col-form-label fw-semibold fs-6">Loan No</label>
								<label class="col-lg-2 col-form-label fw-bold fs-6"><?php echo $loan_details->BILLNO; ?></label>
								<input type="hidden" name="bill_no" id="bill_no" value="<?php echo $loan_details->BILLNO;?>">
								<input type="hidden" name="company_code" id="company_code" value="<?php echo $loan_details->COMPANYCODE;?>">
								<input type="hidden" name="party_id" id="party_id" value="<?php echo $loan_details->PID;?>">
							</div>
							<div class="row mt-4">
			          		<!-- <label class="col-form-label fw-bold fs-5">Pledge Items</label> -->
			          		<table class="table align-middle table-row-dashed table-striped table-hover fs-7 gy-1 gs-2" id="sale_entry_table">
									<thead>
										<tr class="text-start text-muted fw-bold fs-7 gs-0">
											<th class="min-w-25px">Sno</th>
					            <th class="min-w-100px">Item-Sub Item</th>
					            <th class="min-w-50px">Quality</th>
					            <th class="min-w-50px">Purity(%)</th>
					            <th class="min-w-80px">Weight(gms)</th>
					            <th class="min-w-50px">St.Wgt(gms)</th>
					            <th class="min-w-50px">Less(gms)</th>
					            <th class="min-w-80px">Nt Wgt(gms)</th>
					            <th class="min-w-50px">Img</th>
										</tr>
									</thead>
									<tbody class="text-gray-600 fw-semibold">
										<?php 
											$cnt=count((array)$upd_pledge_list);
											
											
											$i=0; $st_less=0; $less=0; $net_weight=0;$weight=0; $pur_per=0;
											foreach ($upd_pledge_list as $plist) 
											{ 
										?>
										<tr>
											<td><?php echo $i+1; ?></td>
								            <td class="ple1"><?php echo $plist['PLEDGENAME']." - ".$plist['DESCRIPTION']; ?></td>
								            <td><?php echo $plist['PURITY']; ?></td>
								            <td><?php echo $plist['PURITY_PERCENT']; ?></td>
								            <td><?php echo $plist['WEIGHT']; ?></td>
								            <td><?php echo $plist['STONEWEIGHT']; ?></td>
								            <td><?php echo $plist['LESS']; ?></td>
								            <td><?php echo $plist['NETWEIGHT']; ?></td>
								            <td>
								            	<div class="image-input mt-2 me-6" data-kt-image-input="true">
																<div class="image-input-wrapper w-40px h-40px"style="background-image: url(assets/images/sample_jewel.jpg)"></div>
															</div>
								            </td>
					        			</tr>

					        		<?php 		$weight+=$plist['WEIGHT'];
					        					$st_less+=$plist['STONEWEIGHT'];
					        					$less+=$plist['LESS'];
					        					$net_weight+=$plist['NETWEIGHT'];
					        					$pur_per+=$plist['PURITY_PERCENT'];
					        					$i++;
					        				} 
					        				$c=($cnt>0)?$cnt:1;
					        				$pur_per1=$pur_per/$c;
					        				$sale_rate=(($pur_per1/100)*$weight)*$_SESSION['CUR_GOLD_RATE'];
					        				?>
								   </tbody>
								</table>
	          				</div>
	          				<div class="row" >
								<label class="col-lg-1 col-form-label fw-semibold fs-6">Weight</label>
								<label class="col-lg-1 col-form-label fw-bold fs-6"><?php echo $weight; ?></label>
								<label class="col-lg-1 col-form-label fw-semibold fs-6">Stoneless</label>
								<label class="col-lg-1 col-form-label fw-bold fs-6"><?php echo $st_less; ?></label>
								<label class="col-lg-1 col-form-label fw-semibold fs-6">Less</label>
								<label class="col-lg-1 col-form-label fw-bold fs-6"><?php echo $less;?></label>
								<label class="col-lg-1 col-form-label fw-semibold fs-6">Net.Wght</label>
								<label class="col-lg-1 col-form-label fw-bold fs-6"><?php echo $net_weight; ?></label>
								<label class="col-lg-1 col-form-label fw-semibold fs-6">CurrRate</label>
								<label class="col-lg-1 col-form-label fw-bold fs-6"><?php echo $_SESSION['CUR_GOLD_RATE']; ?></label>
								<label class="col-lg-1 col-form-label fw-semibold fs-6">Purity%</label>
								<label class="col-lg-1 col-form-label fw-bold fs-6"><?php echo $pur_per1;?></label>
							</div>
							<div class="row" >
								<label class="col-lg-2 col-form-label fw-semibold fs-6" >Loan Amount</label>
								<label class="col-lg-1 col-form-label fw-bold fs-6" style="color: blue;"><?php echo $loan_details->AMOUNT; ?></label>
								<label class="col-lg-1 col-form-label fw-semibold fs-6" >Interest</label>
								<label class="col-lg-1 col-form-label fw-bold fs-6" style="color: blue;"><?php echo $txtInterest; ?></label>
								<label class="col-lg-2 col-form-label fw-semibold fs-6" >Paid Amount</label>
								<label class="col-lg-1 col-form-label fw-bold fs-6" style="color: blue;"><?php echo ($txtPaidPrincipal+$txtPaidInterest); ?></label>
								<label class="col-lg-2 col-form-label fw-semibold fs-6" >Total Amount</label>
								<label class="col-lg-1 col-form-label fw-bold fs-6" style="color:blue;" id="orgnl_calc_value"><?php echo $calc_value; ?></label>

							</div>
							<?php 

								if($loan_details->CLOSING_STATUS=='CUSTOMER_SALE')
									{
										$sale_rate= $redemption_details->PURCHASE_AMOUNT;
									}
									if($loan_details->CLOSING_STATUS=='COMPANY_CLOSE')
									{
										// echo $sale_rate;
										$sale_rate=($loan_details->AMOUNT+$txtInterest)-($txtPaidPrincipal+$txtPaidInterest);
									}
							?>
							<div class="row" >
								<label class="col-lg-1 col-form-label required fw-semibold fs-6">Sales Amount</label>
								<div class="col-lg-3">
									<input type="hidden" name="orgnl_sale_value" id="orgnl_sale_value" value="<?php 
									if($loan_details->CLOSING_STATUS=='CUSTOMER_SALE')
									{
										echo $redemption_details->PURCHASE_AMOUNT;
									}
									if($loan_details->CLOSING_STATUS=='COMPANY_CLOSE')
									{
										// echo $sale_rate;
										$cal_sale_rate=($loan_details->AMOUNT+$txtInterest)-($txtPaidPrincipal+$txtPaidInterest);
									}
									 ?>">
									<input type="text" class="form-control form-control-lg1 form-control-solid" placeholder="Sales Amount" name="ccl_sale_amt" id="ccl_sale_amt" onkeyup="calcualte_curr_sale_rate_profit_loss()" value="<?php 
									if($loan_details->CLOSING_STATUS=='CUSTOMER_SALE')
									{
										echo $redemption_details->PURCHASE_AMOUNT;
									}
									if($loan_details->CLOSING_STATUS=='COMPANY_CLOSE')
									{
										// echo $sale_rate;
										$cal_sale_rate=($loan_details->AMOUNT+$txtInterest)-($txtPaidPrincipal+$txtPaidInterest);
									}
									 ?>">
									<div class="fv-plugins-message-container invalid-feedback"></div>
								</div>
								<label class="col-lg-1 col-form-label fw-bold fs-6" id="lbl_profit_loss" >
								<?php 
									if($sale_rate>$calc_value)
									{
										$is_profit_loss='P';
								?>
								
									<span style="background-color:#B6BD4F;border-radius: 8px;padding: 5px 15px 5px 15px;" id= "span_profit" >Profit</span>
								<?php } 
									  else 
									  {
											$is_profit_loss='L';
								 ?>
									<span style="background-color:red;color: white; border-radius: 8px;padding: 5px 15px 5px 15px;">Loss</span>
								
								<?php } ?>
								</label>
								<label class="col-lg-2 col-form-label fw-bold fs-5" id="profit_loss_amount"><?php 
								if($loan_details->CLOSING_STATUS=='CUSTOMER_SALE')
									{
										echo number_format($redemption_details->PURCHASE_AMOUNT-($loan_details->AMOUNT+$txtInterest)-($txtPaidPrincipal+$txtPaidInterest),2);
									}
									if($loan_details->CLOSING_STATUS=='COMPANY_CLOSE')
									{
										// echo $sale_rate;
										$cal_sale_rate=($loan_details->AMOUNT+$txtInterest)-($txtPaidPrincipal+$txtPaidInterest);
										echo number_format($cal_sale_rate,2);
									}
								//echo number_format(($sale_rate-$calc_value),2); ?></label>
								<input type="hidden" name="p_l_amount" id="p_l_amount" value="<?php echo ($sale_rate-$calc_value); ?>">
								<label class="col-lg-1 col-form-label fw-semibold fs-6">Sales To</label>
								<label class="col-lg-4 col-form-label fw-bold fs-6">AGM - A GOLD MAIN - & OLD GOLD PURCHES</label>
								<input type="hidden" name="is_profit_loss" id="is_profit_loss" value="<?php echo $is_profit_loss; ?>">
							</div>
							<!-- <div class="row">
								<label class="col-lg-1 col-form-label fw-semibold fs-6">Sale To</label>
								<label class="col-lg-4 col-form-label fw-bold fs-6">AGM - A GOLD MAIN - & OLD GOLD PURCHES</label>
							</div> -->
							<div class="d-flex justify-content-end mt-4">
								<button type="reset" class="btn btn-secondary me-3" data-bs-dismiss="modal" onclick="CloseSaletoCCLlistModal()">Cancel</button>
								<button type="submit" class="btn btn-primary" >Send Request</button>
								<!-- onclick="send_to_ccl_sale_request()" -->
							</div>
							<!--end::Modal body-->
						</div>
					</form>
				</div>
				<!--end::Modal content-->
			</div>

			<script type="text/javascript">
				function calcualte_curr_sale_rate_profit_loss() 
				{
					var osv=parseFloat($('#orgnl_sale_value').val());
					var curr_val= parseFloat($('#ccl_sale_amt').val());
					var calc_val= parseFloat($('#orgnl_calc_value').html());


					var bal=curr_val-calc_val;
					// alert(bal);
					if(bal<0) 
					{
						// loss
						str='<span style="background-color:red;color: white; border-radius: 8px;padding: 5px 15px 5px 15px;">Loss</span>';
						$('#lbl_profit_loss').empty().append(str);
						$('#is_profit_loss').val('L');
						$('#profit_loss_amount').html(bal.toFixed(2));
						$('#p_l_amount').val(bal.toFixed(2));

					}
					else
					{
						//profit
						str='<span style="background-color:#B6BD4F;border-radius: 8px;padding: 5px 15px 5px 15px;" id= "span_profit" >Profit</span>';
						$('#lbl_profit_loss').empty().append(str);
						$('#is_profit_loss').val('P');
						$('#profit_loss_amount').html(bal.toFixed(2));
						$('#p_l_amount').val(bal.toFixed(2));
					}


				}
			</script>