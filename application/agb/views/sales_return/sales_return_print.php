<html>
	<head>
		
		<style>
			body{
				font-family: Calibri;
				font-size: 14px;
			}
			.ft_wgt{
				font-weight: 600;
			}
			/*table{border-collapse: collapse;width: 100%; border: 1px solid #d9d9d9;}*/
			table{
				border-collapse: collapse;width: 100%;
			}
			table tr,td,th{
				border: 1px solid black;
			}
			#per_item_details tr
			{
				border-top-style: hidden;
				border-right-style: hidden;
				border-bottom-style: hidden;
				border-left-style: hidden;
			}
			#per_item_details td
			{
				border-top-style: hidden;
				border-right-style: hidden;
				border-bottom-style: hidden;
				border-left-style: hidden;
			}
			#base{
				font-family: Calibri;
				font-size: 16px;
			}
			#nxt_base{
				font-family: Calibri;
				font-size: 16px;
			}
			#bill_to{
				font-family: Calibri;
				font-size: 16px;
			}
			#indiv_item{
				font-family: Calibri;
				font-size: 16px;
			}
			#charges{
				font-family: Calibri;
				font-size: 16px;
			}
			#amt_word{
				font-family: Calibri;
				font-size: 16px;
			}
			#decl{
				font-family: Calibri;
				font-size: 16px;
			}
			#particular{
				font-family: Calibri;
				font-size: 16px;
			}
			#base td{
				border: 1px solid black;
			}
			#base tr{
				height: 16px;
			}
			#nxt_base td{
				border: 1px solid black;
			}
			#nxt_base tr{
				height: 16px;
			}
			#bill_to tr
			{
				height: 25px;
			}
			#bill_to td
			{
				width: 300px;
			}
			#indiv_item tr
			{
				height: 25px;
			}
			#indiv_item td
			{
				width: 300px;
			}
			#charges tr{
				height: 30px;
			}
			#charges td{
				width:11px;
			}
			#amt_word tr{
				height: 50px;
			}
			#decl tr{
				height: 25px;
			}
			#decl td{
				width: 350px;
			}
			#particular tr{
				height: 20px;
			}
			#particular td{
				height: 30px !important;
			}
			#particular tbody{
				height: 350px !important;
			}
			#particular{
				height: 100px !important;
			}
			h2{
				height: 10px !important;
			}
			h4{
				height: 3px !important;
			}
			.padd{
				padding: 2px;
			}
			.rw{
				  padding-top: calc(0.775rem + 1px);
    			padding-bottom: calc(0.775rem + 1px);
    			line-height: 1.5;
			}
			#fst_part_item
			{
				height: 200px;
			}
			#snd_part_item
			{
				height: 200px;
			}
			#fst_part_item tr
			{
				border-top-style: hidden;
				border-right-style: hidden;
				border-bottom-style: hidden;
				border-left-style: hidden;
			}
			#fst_part_item td
			{
				border-top-style: hidden;
				border-right-style: hidden;
				border-bottom-style: hidden;
				border-left-style: hidden;
			}
			#snd_part_item tr
			{
				border-top-style: hidden;
				border-right-style: hidden;
				border-bottom-style: hidden;
				border-left-style: hidden;
			}
			#snd_part_item td
			{
				border-top-style: hidden;
				border-right-style: hidden;
				border-bottom-style: hidden;
				border-left-style: hidden;
			}
		</style>
	</head>
	<!-- src="assets/images/agb_logo.jpg" -->
	<!-- style="border-bottom-style: hidden;" -->
	<body>
		<table id="base">
				<tr>
					<td style="width: 30px;height: 30px;" rowspan="4"><img src="<?php echo base_url(); ?>assets/images/agb_logo.jpg" width="110" height="110"></td>
					<td style="border-bottom-style: hidden;font-size: 20px;padding-left:5px;font-weight: 600;">AGB - AYYANAR GOLD BANK</td>
					<td style="width: 200px;height: 10px;border-bottom-style: hidden;text-align: center;font-size: 25px;font-weight: 600;" rowspan="2"><span>JEWELLERY RETURN</span></td>
				</tr>
				<tr>
					<td class="ft_wgt" style="border-bottom-style: hidden;white-space:nowrap;padding-left:5px;"><span><?php  echo $company_detail->ADDRESS1; echo "&nbsp;"; echo $company_detail->ADDRESS2; ?></span></td>
				</tr>
				<tr>
					<td class="ft_wgt" style="border-bottom-style: hidden;padding-left:5px;"><span>Phone No</span>&nbsp;-&nbsp;<span><?php  echo $company_detail->PHONE; ?></span></td>
					<td class="ft_wgt" style="border-bottom-style: hidden;white-space:nowrap;"><span>Bill No &nbsp; <label><?php echo  $sales_return->sales_return_id; ?></label></span></td>
				</tr>
				<tr>
					<td class="ft_wgt" style="padding-left:5px;"><span>GST No &nbsp;- <label><?php  echo $company_detail->GST_NO; ?></label></span></td>
					<td class="ft_wgt" style="white-space:nowrap;"><span>Date &emsp;&nbsp;&nbsp; <label><?php  $date_format  = $this->db->query("SELECT * FROM general_settings  ")->row();
															 $format= $date_format->date_format;
															 echo date("$format", strtotime($sales_return->date)); ?></label></span></td>
				</tr>
		</table>

		<table id="bill_to">
			<tr style="border-top-style: hidden;">
				<td class="ft_wgt" colspan="6" style="border-bottom-style: hidden;padding-left:5px;"><span>Billed To</span></td>
				<!-- <td class="ft_wgt" colspan="3" style="border-bottom-style: hidden;padding-left:5px;"><span>Delivery To</span></td> -->
			</tr>
			<tr style="height:100px;">
				<td style="margin-bottom: 80px;padding-left:5px;" colspan="6">
					<span>
						<label><?php echo $party_detail->NAME; ?></label>,<br>
						<label><?php echo $party_detail->ADDRESS1; ?> &nbsp;<?php echo $party_detail->ADDRESS2; ?></label>,<br>
						<label><?php echo $party_detail->PHONE; ?></label>.
					</span></td>
				<!-- <td colspan="3"></td> -->
			</tr>
		</table>

		<table id="particular">
			<thead>
				<th style="width:5px;height: 20px; border-top-style: hidden;">S.No</th>
				<th style="width:160px;height: 20px;border-top-style: hidden;">Particulars</th>
				<th style="width:60px;height: 20px;border-top-style: hidden;">HSN Code</th>
				<th style="width:60px;height: 20px;border-top-style: hidden;">Weight in grams</th>
				<th style="width:90px;height: 20px;border-top-style: hidden;">Rate Per gram</th>
				<th style="width:110px;height: 20px;border-top-style: hidden;">Total</th>
			</thead>
			<tbody>
			<?php
			$tot_amt=0;
			$i=1; foreach($sales_return_tagged as $slist){ ?>
				<tr style="border-bottom-style: hidden;">
					 <td><?php echo $i; ?> </td>
					<td><?php
					$item_name  = $this->db->query("SELECT * FROM ITEMS WHERE  SNO='". $slist['item_name']."' ")->row();
					$item_type=$this->db->query("SELECT * FROM jewel_type WHERE jewel_type_id='".$item_name->jewel_type_id."'  ")->row();
																		echo $item_type->jewel_type;
																		echo "-";
																		
																		echo $item_name->ITEMNAME;
																		echo "-";
																		$subitem_name  = $this->db->query("SELECT * FROM SUBITEM_LIST WHERE  SUB_ID='". $slist['subitem_name']."' ")->row();
																		echo $subitem_name->SUBITEM_NAME;
																		?></td>
					<td align="center"> <?php echo $item_name->HSN_CODE; ?></td>
					<td align="right"><?php echo $slist['weight']; ?></td>
					<td align="right"><?php echo $slist['current_rate']; ?></td>
					<td align="right"><?php echo $slist['total_amount']; $tot_amt+=$slist['total_amount'] ?></td>
				</tr>
				<?php $i++; } ?>
<?php for($j=$i-1;$j<=10;$j++){ ?>
				<tr style="border-top-style: hidden;" >
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
			</tr>
					<?php  } ?>
			</tbody>
			<tfoot>
				<tr>
					<td class="ft_wgt" colspan="5" style="text-align: right;"><h4>Total</h4></td>
					<td class="ft_wgt" align="right">  <?php echo $tot_amt; ?></td>
				</tr>
			</tfoot>
		</table>

		<table id="charges">
			<tr>
				<td class="ft_wgt" style="border-top-style: hidden;text-align: center;" rowspan="2"><span>No of Item</span></td>
				<td class="ft_wgt" style="border-top-style: hidden;text-align: center;" rowspan="2"><span>Total Values</span></td>
				<td class="ft_wgt" style="border-top-style: hidden;text-align: center;" colspan="2"><span>CGST</span></td>
				<td class="ft_wgt" style="border-top-style: hidden;text-align: center;" colspan="2"><span>SGST</span></td>
				<td class="ft_wgt" style="border-top-style: hidden;text-align: center;" colspan="2"><span>IGST</span></td>
				<td class="ft_wgt" style="width: 110px; border-top-style: hidden;text-align: center;" rowspan="2"><span>Total Amount</span></td>
			</tr>
			<tr>
				<td class="ft_wgt" style="text-align: center;"><span>Percen(%)</span></td>
				<td class="ft_wgt" style="text-align: center;"><span>Amount</span></td>

				<td class="ft_wgt" style="text-align: center;"><span>Percen(%)</span></td>
				<td class="ft_wgt" style="text-align: center;"><span>Amount</span></td>

				<td class="ft_wgt" style="text-align: center;"><span>Percen(%)</span></td>
				<td class="ft_wgt" style="text-align: center;"><span>Amount</span></td>
			</tr>
			<tr>
				<td><?php echo $i-1; ?></td>
				<td><?php echo $tot_amt; ?></td>

				<td><?php echo "1.5" ?></td>
				<td><?php $cgst=$tot_amt*1.5/100; echo $cgst; ?></td>

				<td><?php echo "1.5" ?></td>
				<td> <?php $sgst=$tot_amt*1.5/100; echo $sgst; ?></td>

				<td><?php echo  "0"; ?></td>
				<td><?php echo  "0"; ?></td>

				<td><?php $total=$tot_amt+$cgst+$sgst; echo $total; ?></td>
			</tr>
		</table>
		<table id="amt_word">
			<tr>
				<td style="border-top-style: hidden;padding-left:5px;"><span class="ft_wgt">Amount In Words</span> <label><?php echo amt_to_words($total); ?></label></td>
			</tr>
		</table>
		<table id="decl">
			<tbody>
			<tr>
				<td class="ft_wgt" style="border-top-style: hidden;border-bottom-style: hidden;padding-left:5px;"><span>Account Details</span></td>
				<td class="ft_wgt" style="border-top-style: hidden;border-bottom-style: hidden;padding-left:5px;"><span>Decleration</span></td>
			</tr>
			<tr>
				<td style="padding-left: 5px;padding-top: 7px;">
				<span>Account Name</span>&emsp;<span style="padding-left: 0px;"><?php if(isset($bank_detail->PERSONNAME)){ echo $bank_detail->PERSONNAME; }; ?></span><br>
					<span>Account No</span>&emsp;<span style="padding-left: 18px;"><?php if(isset($bank_detail->ACCOUNTNO)){ echo $bank_detail->ACCOUNTNO; }; ?></span><br>
					<span>Bank</span>&emsp;<span style="padding-left: 61px;"><?php if(isset($bank_detail->BANKNAME)){ echo $bank_detail->BANKNAME; }; ?></span><br>
					<span>IFSC Code</span>&emsp;<span style="padding-left: 30px;"><?php if(isset($bank_detail->IFSC)){ echo $bank_detail->IFSC; }; ?></span>
				</td>
				<td style="padding-left:5px;"><span>I hereby declare that the above-mentioned information is accurate to the best of my knowledge and belief</span></td>
			</tr>
		</tbody>
			<tfoot>
				<td style="border-top-style: hidden;">
				</td>
				<td style="border-top-style: hidden;text-align: right;"><h4>Authorized Signature</h4></td>
			</tfoot>
		</table><br><br><br>

		

		<?php
		
		$i=1; foreach($sales_return_tagged as $slist){ ?>
	<table id="nxt_base">
			<tr>
				<td style="width: 30px;height: 30px;" rowspan="4"><img src="<?php echo base_url(); ?>assets/images/agb_logo.jpg" width="110" height="110"></td>
				<td style="border-bottom-style: hidden;font-size: 20px;padding-left:5px;font-weight: 600;">AGB - AYYANAR GOLD BANK</td>
				<td style="width: 200px;height: 10px;border-bottom-style: hidden;text-align: center;font-size: 25px;font-weight: 600;" rowspan="2"><span>JEWEL CERTIFICATE</span></td>
			</tr>
			<tr>
				<td class="ft_wgt" style="border-bottom-style: hidden;white-space:nowrap;padding-left:5px;"><span><?php  echo $company_detail->ADDRESS1; echo "&nbsp;"; echo $company_detail->ADDRESS2; ?></span></td>
			</tr>
			<tr>
				<td class="ft_wgt" style="border-bottom-style: hidden;padding-left:5px;"><span>Phone No</span>&nbsp;-&nbsp;<span><?php  echo $company_detail->PHONE; ?></span></td>
				<td class="ft_wgt" style="border-bottom-style: hidden;white-space:nowrap;"><span>Bill No &nbsp; <label><?php echo $sales_return->sales_return_id; ?></label></span></td>
			</tr>
			<tr>
				<td class="ft_wgt" style="padding-left:5px;"><span>GST No &nbsp;- <label><?php  echo $company_detail->GST_NO; ?></label></span></td>
				<td class="ft_wgt" style="white-space:nowrap;"><span>Date &emsp;&nbsp;&nbsp; <label> <?php $date_format  = $this->db->query("SELECT * FROM general_settings  ")->row();
														 $format= $date_format->date_format;
														 echo date("$format", strtotime($sales_return->date)); //echo $sales_order->sales_order_date; ?></label></span></td>
			</tr>
	</table>

		<table style="border-top-style: hidden;">
			<tr>
				<td style="width:50%;border-right-style: hidden;">
					<table id="fst_part_item">
							<tr>
								<td style="padding-left:5px;">
									<span class="rw">Item Name</span>
								</td>
								<td>
									<span class="ft_wgt rw"><?php $item_name  = $this->db->query("SELECT * FROM ITEMS WHERE  SNO='". $slist['item_name']."' ")->row();
																		echo $item_name->ITEMNAME; ?></span>
								</td>
							</tr>
							<tr>
								<td style="padding-left:5px;">
									<span class="rw">Weight (gms)</span>
								</td>
								<td>
									<span class="ft_wgt rw"><?php echo $slist['weight']; ?></span>
								</td>
							</tr>
							<tr>
								<td style="padding-left:5px;">
									<span class="rw">Stone (gms)</span>
								</td>
								<td>
									<span class="ft_wgt rw">0.000</span>
								</td>
							</tr>
							<tr>
								<td style="padding-left:5px;">
									<span class="rw">Less (gms)</span>
								</td>
								<td>
									<span class="ft_wgt rw">0.000</span>
								</td>
							</tr>
							<tr>
								<td style="padding-left:5px;">
									<span class="rw">Net Weight (gms)</span>
								</td>
								<td>
									<span class="ft_wgt rw"><?php echo $slist['weight']; ?></span>
								</td>
							</tr>
					</table>
				</td>
				<td style="width:50%">
					<table id="snd_part_item">
							<tr>
								<td>
									<span class="rw">Wastage (%)</span>
								</td>
								<td>
									<span class="ft_wgt rw">0</span>
								</td>
							</tr>
							<tr>
								<td>
									<span class="rw">Current Rate(per gms)</span>
								</td>
								<td>
									<span class="ft_wgt rw">	<?php echo $slist['current_rate']; ?></span>
								</td>
							</tr>
							<tr>
								<td>
									<span class="rw">Purity(%)</span>
								</td>
								<td>
									<span class="ft_wgt rw"><?php echo $slist['purity']; ?></span>
								</td>
							</tr>
							<tr>
								<td>
									<span class="rw">Sales Rate</span>
								</td>
								<td>
									<span class="ft_wgt rw"><?php echo $slist['current_rate']; ?></span>
								</td>
							</tr>
							<tr>
								<td>
									<span class="rw">Total Amount</span>
								</td>
								<td>
									<span class="ft_wgt rw"><?php echo $slist['total_amount']; ?></span>
								</td>
							</tr>
					</table>
				</td>
			</tr>
		</table>
		<table id="indiv_item">
			<tr style="border-top-style: hidden;">
				<td style="width: 100px;height: 600px;">
				<?php 											$image_url =  base_url().'assets/images/sales_order_image/'. $slist['img']; 
																		if(@getimagesize($image_url)){  ?>
						<center><img src="<?php echo base_url(); ?>assets/images/sales_order_image/<?php echo $slist['img']; ?>" width="300" height="300"></center>
						<?php }  else {   ?>
							<center><img src="<?php echo base_url(); ?>assets/images/jewel.jpg" width="300" height="300"></center>
							
							<?php }  ?>
					</td>
			</tr>
		</table> 
		<?php } ?>
		
        <script type="text/javascript">
    // //$(window).on('load',function() {var baseurl= $("#baseurl").val(); window.print(); window.location.href = baseurl+'order';});
    // var baseurl= $("#baseurl").val();
    // opener.location.href = baseurl+'proformainvoice';
    // function printpage()
    //     {
    //       var baseurl= $("#baseurl").val(); window.print();window.close(); //window.location.href = baseurl+'workorder';
    //     }
</script>
	</body>
</html>