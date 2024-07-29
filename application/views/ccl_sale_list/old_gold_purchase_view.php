<!--begin::Modal dialog-->
			<div class="modal-dialog modal-xl">
				<!--begin::Modal content-->
				<div class="modal-content rounded">
					<!--begin::Modal header-->
					<div class="modal-header justify-content-end border-0 pb-0">
						<!--begin::Close-->
						<div class="btn btn-sm btn-icon btn-active-color-primary" onclick="close_old_gold_purchase_view_modal()">
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
					<!--begin::Modal body-->
					<!--begin::Modal body-->
					<div class="modal-body pt-0 pb-15 px-5 px-xl-20">
						<!--begin::Heading-->
						<div class="mb-1 text-center">
							<h1>View Sale Value for Pledge Item</h1>
						</div>
						<div class="d-flex align-items-center justify-content-end">

							<?php 
							 	$red_res=$this->db->query("select * from LOANS where BILLNO='".$ccl_sale_list->billno."'")->row();
							 	if($red_res->CLOSING_STATUS=='COMPANY_CLOSE')
							 	{ ?>
							 		<span class="badge badge-circle text-black" style="background:#b0dfff;">CL</span>&emsp;
							 	<?php }
							 	if($red_res->CLOSING_STATUS=='CUSTOMER_SALE')
							 	{ ?> 
							 		<span class="badge badge-circle text-black" style="background:#fbe2d5;">CS</span>&emsp;
							 	<?php }
								?> 
							<?php if($ccl_sale_list->ccl_status=='Request') { ?>
							<label class="col-form-label fw-bold fs-5">
								<span style="background-color:#b0dfff;border-radius: 8px;padding: 5px 15px 5px 15px;">Request Send</span>
							</label>
						<?php } else if($ccl_sale_list->ccl_status=='Reject') { ?>
							<label class="col-form-label fw-bold fs-5">
								<span style="background-color:red;color:white;border-radius: 8px;padding: 5px 15px 5px 15px;">Rejected</span>
							</label>
						<?php } else if($ccl_sale_list->ccl_status=='Accept') { ?>
							<label class="col-form-label fw-semibold fs-7" name="" id="" ><span style="background-color:#a3ff9b;border-radius: 8px;padding: 5px 15px 5px 15px;">Accepted</span>
							</label>
						<?php } ?>
						</div>
						<input type="hidden" name="">
						<div class="row">
							<label class="col-lg-1 col-form-label fw-semibold fs-6">Date</label>
							<label class="col-lg-2 col-form-label fw-bold fs-6"><?php echo date_format(date_create($ccl_sale_list->ccl_date),'d-m-Y'); ?></label>
							<label class="col-lg-1 col-form-label fw-semibold fs-6">Company</label>
							<label class="col-lg-5 col-form-label fw-bold fs-6">
								<?php 
								$cmp_det=$this->db->query("select * from COMPANY where COMPANYCODE='".$ccl_sale_list->company_code."'")->row();
								echo $cmp_det->COMPANYNAME;
								?>
									
							</label>
							<label class="col-lg-1 col-form-label fw-semibold fs-6">Loan No</label>
							<label class="col-lg-2 col-form-label fw-bold fs-6"><?php echo $ccl_sale_list->billno; ?></label>
							<input type="hidden" name="ccl_bill_no" id="ccl_bill_no" value="<?php echo $ccl_sale_list->billno; ?>">
							<input type="hidden" name="ccl_id" id="ccl_id" value="<?php echo $ccl_sale_list->ccl_sale_list_id; ?>">
						</div>
						<div class="row mt-4">
          		<!-- <label class="col-form-label fw-bold fs-5">Pledge Items</label> -->
          		<table class="table align-middle table-row-dashed table-striped table-hover fs-7 gy-1 gs-2" id="ccl_pending_view">
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
				            <th class="min-w-80px">Pur Wgt(gms)</th>
				            <th class="min-w-50px">Img</th>
									</tr>
								</thead>
								<tbody class="text-gray-600 fw-semibold">

									<?php 
										$i=$wt=$stn_wt=$l=$nt_wt=$pur=0; 
										$tot_pur_weight=$pur_weight=0;
										$cnt=count((array)$updated_pledge_list);

										foreach ($updated_pledge_list as $upd_pl)
										{
									?>
									<tr>
										<td><?php echo $i+1; ?></td>
				            <td class="ple1"><?php echo $upd_pl['PLEDGENAME']." - ".$upd_pl['DESCRIPTION']; ?></td>
				            <td><?php echo $upd_pl['PURITY']; ?></td>
				            <td><?php echo $upd_pl['PURITY_PERCENT']; ?></td>
				            <td><?php echo $upd_pl['WEIGHT']; ?></td>
				            <td><?php echo $upd_pl['STONEWEIGHT']; ?></td>
				            <td><?php echo $upd_pl['LESS']; ?></td>
				            <td><?php echo $upd_pl['NETWEIGHT']; ?></td>
				            <td><?php 
				            $pur_weight=$upd_pl['NETWEIGHT']*($upd_pl['PURITY_PERCENT']/100);
				            echo $pur_weight; ?></td>
				            <td>
				            	<div class="image-input mt-2 me-6" data-kt-image-input="true">
												<div class="image-input-wrapper w-40px h-40px"style="background-image: url(assets/images/sample_jewel.jpg)"></div>
											</div>
				            </td>
				        	</tr>
						   		<?php 
						   				$i++; 
						   				$wt+=$upd_pl['WEIGHT'];
						   				$stn_wt+=$upd_pl['STONEWEIGHT'];
						   				$l+=$upd_pl['LESS'];
						   				$nt_wt+=$upd_pl['NETWEIGHT'];
						   				$pur+=$upd_pl['PURITY_PERCENT'];
						   				$tot_pur_weight+=$pur_weight;
						   			} 
						   			$pur_per=$pur/$cnt;
						   		?>
							   </tbody>
							</table>
			          	</div>
			          	<div class="row">
							<label class="col-lg-1 col-form-label fw-semibold fs-6">Weight</label>
							<label class="col-lg-1 col-form-label fw-bold fs-6"><?php echo number_format($wt,3); ?></label>
							<label class="col-lg-1 col-form-label fw-semibold fs-6">Stoneless</label>
							<label class="col-lg-1 col-form-label fw-bold fs-6"><?php echo number_format($stn_wt,3); ?></label>
							<label class="col-lg-1 col-form-label fw-semibold fs-6">Less</label>
							<label class="col-lg-1 col-form-label fw-bold fs-6"><?php echo number_format($l,3); ?></label>
							<label class="col-lg-1 col-form-label fw-semibold fs-6">Net.Wght</label>
							<label class="col-lg-1 col-form-label fw-bold fs-6"><?php echo number_format($nt_wt,3); ?></label>
							<label class="col-lg-1 col-form-label fw-semibold fs-6">Pur.Wght</label>
							<label class="col-lg-1 col-form-label fw-bold fs-6"><?php echo number_format($tot_pur_weight,3); ?></label>
							<label class="col-lg-1 col-form-label fw-semibold fs-6">CurrRate</label>
							<label class="col-lg-1 col-form-label fw-bold fs-6"><?php echo $_SESSION['CUR_GOLD_RATE']; ?></label>
							<label class="col-lg-1 col-form-label fw-semibold fs-6">Purity%</label>
							<label class="col-lg-1 col-form-label fw-bold fs-6"><?php echo number_format($pur_per,2); ?></label>
						<!-- </div>
						<div class="row"> -->
							<label class="col-lg-2 col-form-label fw-semibold fs-6">Sales Amount</label>
							<label class="col-lg-2 col-form-label fw-bold fs-5"><?php echo $ccl_sale_list->curr_sales_amount; ?></label>
							<label class="col-lg-1 col-form-label fw-semibold fs-6">Description</label>
							<div class="col-lg-4">
								<?php if($ccl_sale_list->ccl_status=='Request'){ ?>
								<textarea class="form-control form-select-solid fw-semibold fs-5" rows="2" id="rej_acc_desc" name="rej_acc_desc"></textarea>
								<div class="fv-plugins-message-container invalid-feedback"></div>
								<?php } else { ?>
									<label class="col-lg-12 col-form-label fw-bold fs-5"><?php echo $ccl_sale_list->description; ?></label>
								<?php } ?>
							</div>
							<label class="col-lg-3 col-form-label fw-semibold fs-6">Req. Sales Amount/gm</label>
							<label class="col-lg-1 col-form-label fw-bold fs-6"><?php echo $ccl_sale_list->curr_sales_amount/$tot_pur_weight; ?></label>
							<!-- <label class="col-lg-2 col-form-label fw-semibold fs-6">New Sales Amount</label>
							<div class="col-lg-2">
							<input type="text" class="form-control form-control-lg1 form-control-solid" placeholder="Sales Amount" name="ccl_sale_amt" id="ccl_sale_amt" value="0"></div> -->
							
						</div>
						<?php if($ccl_sale_list->ccl_status=='Request'){ ?>
						<div class="d-flex align-items-center justify-content-end mt-2">
							<button class="btn btn-danger me-3" onclick="reject();">Reject</button>
							<button type="submit" class="btn btn-primary" onclick="accept();" >Accept</button>
						</div>
						<?php } ?>
						<!--end::Modal body-->
					</div>

				</div>
				<!--end::Modal content-->
			</div>

	<script type="text/javascript">
		function reject() 
		{
			var baseurl="<?php echo base_url();?>";
			var id=$('#ccl_id').val();
			var bno=$('#ccl_bill_no').val();
			var desc=$('#rej_acc_desc').val();
			// var ccl_sale_amt=$('#ccl_sale_amt').val();
			var ccl_sale_amt=0;

			$.ajax({
				type: "POST",
				url: baseurl+'ccl_sale_list/ccl_reject?',
				async: false,
				type: "POST",
				data: "bno="+bno+"&ccl_id="+id+"&ccl_sale_amt="+ccl_sale_amt,
				dataType: "html",
				success: function(response)
				{
					if(response==1)
					{
					// $('#kt_modal_view_ccl_pending_list').empty().append(response);
					$('#kt_modal_view_old_gold_purchase').removeClass('show');
					$('#kt_modal_view_old_gold_purchase').hide();
					// $('.modal-backdrop').addClass('hide');
			   		$('.modal-backdrop').hide();
			   		window.href=baseurl+"ccl_sale_list/old_gold_purchase";
		   			}
		   			else
		   			{
		   				alert("error");
		   			}
		   			
		   		// Amount is high, ccl rejected for Rs.35071.4 Feasible amount is 33000
				}

			});

		}
	</script>
	<script type="text/javascript">
		function accept() 
		{
			var baseurl="<?php echo base_url();?>";
			var id=$('#ccl_id').val();
			var bno=$('#ccl_bill_no').val();
			var desc=$('#rej_acc_desc').val();
			// var ccl_sale_amt=$('#ccl_sale_amt').val();
			var ccl_sale_amt=0;

			$.ajax({
				type: "POST",
				url: baseurl+'ccl_sale_list/ccl_accept?',
				async: false,
				type: "POST",
				data: "bno="+bno+"&ccl_id="+id+"&ccl_sale_amt="+ccl_sale_amt,
				dataType: "html",
				success: function(response)
				{
					if(response==1)
					{
					// $('#kt_modal_view_ccl_pending_list').empty().append(response);
					$('#kt_modal_view_old_gold_purchase').removeClass('show');
					$('#kt_modal_view_old_gold_purchase').hide();
					// $('.modal-backdrop').addClass('hide');
			   		$('.modal-backdrop').hide();
			   		window.href=baseurl+"ccl_sale_list/old_gold_purchase";
		   			}
		   			else
		   			{
		   				alert("error");
		   			}
		   			
		   		// Amount is high, ccl rejected for Rs.35071.4 Feasible amount is 33000
				}

			});

		}
	</script>