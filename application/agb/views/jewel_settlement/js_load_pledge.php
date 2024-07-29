<!--begin::Modal dialog-->
			<div class="modal-dialog modal-xl">
				<!--begin::Modal content-->
				<div class="modal-content rounded">
					<!--begin::Modal header-->
					<div class="modal-header justify-content-end border-0 pb-0">
						<!--begin::Close-->
						<div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal" onclick="closeUpdatePledgeModal()"> 
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
					<form method="POST" action="<?php echo base_url();?>jewelsettlement/fsd_update_pledges" enctype="multipart/form-data"  >
					<div class="modal-body pt-0 pb-15 px-5 px-xl-20">
						<!--begin::Heading-->
						<div class="mb-13 text-center">
							<h1 class="mb-3">Update Pledge Item</h1>
						</div>
						<div class="row">
							<label class="col-lg-1 col-form-label fw-semibold fs-6">Date</label>
							<label class="col-lg-2 col-form-label fw-bold fs-6"><?php echo $loan_details->ENDATE; ?></label>
							<label class="col-lg-1 col-form-label fw-semibold fs-6">Company</label>
							<label class="col-lg-5 col-form-label fw-bold fs-6"><?php 
							$res=$this->db->query("select * from COMPANY where COMPANYCODE='".$loan_details->COMPANYCODE."'")->row();
							echo $res->COMPANYNAME; ?></label>
							<label class="col-lg-1 col-form-label fw-semibold fs-6">Loan No</label>
							<label class="col-lg-2 col-form-label fw-bold fs-6"><?php echo $loan_details->BILLNO; ?></label>
							<input type="hidden" name="bill_no" id="bill_no" value="<?php echo $loan_details->BILLNO;?>">
						</div>
						<div class="row mt-4">
          					<!-- <label class="col-form-label fw-bold fs-5">Pledge Items</label> -->
			          		<table class="table align-middle table-row-dashed table-striped table-hover fs-7 gy-1 gs-2" id="update_pledge_item">
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
							            <th class="min-w-80px">Pure Wgt(gms)</th>
							            <th class="min-w-50px">Img</th>
									</tr>
								</thead>
								<tbody class="text-gray-600 fw-semibold">
									<?php 
								
										$cnt=count((array)$pledge_list);
										$stn_less =number_format( $loan_details->STONELESS/$cnt,3);
										$less =number_format($loan_details->LESS/$cnt,3);
										$tot_pur_weight=0;
										$i=0; 
										foreach ($pledge_list as $plist) 
										{ 
											if($new_count<=0)
											{
											if($plist['TYPE_OF_RECORD']=='N')
											{
										?>
										<tr>
											<td><?php echo $i+1; ?></td>
								            <td class="ple1">
								            	<!-- <span class="btn btn-icon btn-circle fs-8 fw-bold shadow text-white mb-1" style="background:red;width: 20px !important;height: 20px !important;">BJ</span> -  -->
								            	<span><?php echo $plist['PLEDGENAME']." - ".$plist['DESCRIPTION']; ?></span>
								            	<input type="hidden" name="pledge_name[]" id="pledge_name<?php echo $i;?>" value="<?php echo $plist['PLEDGENAME'];?>">
								            	<input type="hidden" name="pledge_description[]" id="pledge_description<?php echo $i;?>" value="<?php echo $plist['DESCRIPTION'];?>">
								            	<input type="hidden" name="old_pledge_id[]" id="old_pledge_id<?php echo $i;?>" value="<?php echo $plist['PLEDGE_ID'];?>">
								            	
								            </td>
								            <td><?php echo $plist['PURITY']; ?>
								            <input type="hidden" name="pledge_purity[]" id="pledge_purity<?php echo $i;?>" value="<?php echo $plist['PURITY'];?>" >
								            	
								            </td>
								            <td>
								            	<input type="text" class="form-control form-control-lg form-control-solid fs-7" name="pledge_pur_percent[]" id="pledge_pur_percent<?php echo $i;?>" value="<?php echo $plist['PURITY_PERCENT']; ?>"  oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" onkeyup="calc_upd_pledge_value(<?php echo $i;?>);">
								            	<input type="hidden" name="hid_pledge_pur_percent[]" id="hid_pledge_pur_percent<?php echo $i;?>" value="<?php echo $plist['PURITY_PERCENT']; ?>" >
								            </td>
								            <td>
								            	<input type="text" class="form-control form-control-lg form-control-solid fs-7" name="pledge_weight[]" id="pledge_weight<?php echo $i;?>" value="<?php echo $plist['WEIGHT']; ?>" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" onkeyup="calc_upd_pledge_value(<?php echo $i;?>);">
								            	<input type="hidden" name="hid_pledge_weight[]" id="hid_pledge_weight<?php echo $i;?>" value="<?php echo $plist['WEIGHT']; ?>" >
								            </td>
								            <td>
								            	<input type="text" class="form-control form-control-lg form-control-solid fs-7" name="pledge_stone_weight[]" id="pledge_stone_weight<?php echo $i;?>"  value="<?php echo $plist['STONEWEIGHT']; ?>" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" onkeyup="calc_upd_pledge_value(<?php echo $i;?>);">
												<input type="hidden" name="hid_pledge_stone_weight[]" id="hid_pledge_stone_weight<?php echo $i;?>" value="<?php echo $stn_less; ?>" >

								            </td>
								            <td>
								            	<input type="text" class="form-control form-control-lg form-control-solid fs-7" name="pledge_less[]" id="pledge_less<?php echo $i;?>"  value="<?php echo $plist['LESS']; ?>" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" onkeyup="calc_upd_pledge_value(<?php echo $i;?>);">
												<input type="hidden" name="hid_pledge_less[]" id="hid_pledge_less<?php echo $i;?>" value="<?php echo $less; ?>" >
								            </td>
								            <td>
								            	<input type="text" class="form-control form-control-lg form-control-solid fs-7"  name="pledge_net_weight[]" id="pledge_net_weight<?php echo $i;?>"  value="<?php echo $plist['NETWEIGHT']; ?>" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" readonly>
								            	<input type="hidden" name="hid_pledge_net_weight[]" id="hid_pledge_net_weight<?php echo $i;?>" value="<?php echo $plist['NETWEIGHT']; ?>" >
								            </td>
								            <td id="pur_weight<?php echo $i;?>">
											
									            	<?php 
									            	$pur_weight=$plist['NETWEIGHT']*($plist['PURITY_PERCENT']/100);
									            	echo round($pur_weight,3); 
									            	$tot_pur_weight+=$pur_weight;
									            	?>

								            </td>
								            <td>
												<!-- <input type="hidden" name="pledge_pure_weight[]" id="pledge_pure_weight<?php echo $i;?>" value="<?php echo $plist['PURITY'];?>" > -->

								            	<div class="image-input mt-2 me-6" data-kt-image-input="true">
													<!-- <div class="image-input-wrapper w-40px h-40px"style="background-image: url(assets/images/sample_jewel.jpg)"></div> -->
													<img src="<?php echo base_url();?>assets/images/sample_jewel.jpg" height="30" width="30" name="pledge_image[]" id="pledge_image<?php echo $i;?>">
												</div>
								            </td>
							        	</tr>
							   		<?php
							   				}
							   				else
							   				{
							   		?>
							   			<tr>
											<td><?php echo $i+1; ?></td>
								            <td class="ple1">
								            	<!-- <span class="btn btn-icon btn-circle fs-8 fw-bold shadow text-white mb-1" style="background:red;width: 20px !important;height: 20px !important;">BJ</span> -  -->
								            	<span><?php echo $plist['PLEDGENAME']." - ".$plist['DESCRIPTION']; ?></span>
								            	<input type="hidden" name="pledge_name[]" id="pledge_name<?php echo $i;?>" value="<?php echo $plist['PLEDGENAME'];?>">
								            	<input type="hidden" name="pledge_description[]" id="pledge_description<?php echo $i;?>" value="<?php echo $plist['DESCRIPTION'];?>">
								            	<input type="hidden" name="old_pledge_id[]" id="old_pledge_id<?php echo $i;?>" value="<?php echo $plist['PLEDGE_ID'];?>">
								            	
								            </td>
								            <td><?php echo $plist['PURITY']; ?>
								            	<input type="hidden" name="pledge_purity[]" id="pledge_purity<?php echo $i;?>" value="<?php echo $plist['PURITY'];?>">
								            </td>
								            <td>
								            	<input type="text" class="form-control form-control-lg form-control-solid fs-7" name="pledge_pur_percent[]" id="pledge_pur_percent<?php echo $i;?>" value="<?php echo $loan_details->QUALITY; ?>" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" onkeyup="calc_upd_pledge_value(<?php echo $i;?>);">
								            	<input type="hidden" name="hid_pledge_pur_percent[]" id="hid_pledge_pur_percent<?php echo $i;?>" value="<?php echo $loan_details->QUALITY; ?>" >
								            </td>
								            <td>
								            	<input type="text" class="form-control form-control-lg form-control-solid fs-7" name="pledge_weight[]" id="pledge_weight<?php echo $i;?>" value="<?php echo $plist['WEIGHT']; ?>" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" onkeyup="calc_upd_pledge_value(<?php echo $i;?>);">
								            	<input type="hidden" name="hid_pledge_weight[]" id="hid_pledge_weight<?php echo $i;?>" value="<?php echo $plist['WEIGHT']; ?>" >
								            </td>
								            <td>
								            	<input type="text" class="form-control form-control-lg form-control-solid fs-7" name="pledge_stone_weight[]" id="pledge_stone_weight<?php echo $i;?>" value="<?php echo $stn_less; ?>" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" onkeyup="calc_upd_pledge_value(<?php echo $i;?>);">
								            	<input type="hidden" name="hid_pledge_stone_weight[]" id="hid_pledge_stone_weight<?php echo $i;?>" value="<?php echo $stn_less; ?>" >
								            </td>
								            <td>
								            	<input type="text" class="form-control form-control-lg form-control-solid fs-7" name="pledge_less[]" id="pledge_less<?php echo $i;?>"  value="<?php echo $less; ?>" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" onkeyup="calc_upd_pledge_value(<?php echo $i;?>);">
								            	<input type="hidden" name="hid_pledge_less[]" id="hid_pledge_less<?php echo $i;?>" value="<?php echo $less; ?>" >
								            </td>
								            <td>
								            	<input type="text" class="form-control form-control-lg form-control-solid fs-7" name="pledge_net_weight[]" id="pledge_net_weight<?php echo $i;?>"  value="<?php 
								            	$net_weight=$plist['WEIGHT']-$stn_less-$less;
								            	echo $net_weight; ?>" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
								            	<input type="hidden" name="hid_pledge_net_weight[]" id="hid_pledge_net_weight<?php echo $i;?>" value="<?php echo $net_weight; ?>" >
								            </td>
								            <td id="pur_weight<?php echo $i;?>">
									            	<?php 
										            	$pur_weight=$net_weight*($loan_details->QUALITY/100);
										            	echo round($pur_weight,3); 
										            	$tot_pur_weight+=$pur_weight;
									            	?>
									            	
								            </td>
								            <td>
												<!-- <input type="hidden" name="pledge_pure_weight[]" id="pledge_pure_weight<?php echo $i;?>" value="<?php echo $plist['PURITY'];?>" > -->
								            	<div class="image-input mt-2 me-6" data-kt-image-input="true">
													<!-- <div class="image-input-wrapper w-40px h-40px"style="background-image: url(assets/images/sample_jewel.jpg)"></div> -->
													<img src="<?php echo base_url();?>assets/images/sample_jewel.jpg" height="30" width="30" name="pledge_image[]" id="pledge_image<?php echo $i;?>">
												</div>
								            </td>
							        	</tr>
							   		<?php 

							   				}
							   				}
							   				else
							   				{ 
							   		?>
							   			<tr>
											<td><?php echo $i+1; ?></td>
								            <td class="ple1">
								            	<!-- <span class="btn btn-icon btn-circle fs-8 fw-bold shadow text-white mb-1" style="background:red;width: 20px !important;height: 20px !important;">BJ</span> -  -->
								            	<span><?php echo $plist['PLEDGENAME']." - ".$plist['DESCRIPTION']; ?></span>
								            	<input type="hidden" name="pledge_name[]" id="pledge_name<?php echo $i;?>" value="<?php echo $plist['PLEDGENAME'];?>">
								            	<input type="hidden" name="pledge_description[]" id="pledge_description<?php echo $i;?>" value="<?php echo $plist['DESCRIPTION'];?>">
								            	<input type="hidden" name="old_pledge_id[]" id="old_pledge_id<?php echo $i;?>" value="<?php echo $plist['OLD_PLEDGE_ID'];?>">
								            	
								            </td>
								            <td><?php echo $plist['PURITY']; ?>
								            <input type="hidden" name="pledge_purity[]" id="pledge_purity<?php echo $i;?>" value="<?php echo $plist['PURITY'];?>" >
								            	
								            </td>
								            <td>
								            	<input type="text" class="form-control form-control-lg form-control-solid fs-7" name="pledge_pur_percent[]" id="pledge_pur_percent<?php echo $i;?>" value="<?php echo $plist['PURITY_PERCENT']; ?>"  oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" onkeyup="calc_upd_pledge_value(<?php echo $i;?>);">
								            	<input type="hidden" name="hid_pledge_pur_percent[]" id="hid_pledge_pur_percent<?php echo $i;?>" value="<?php echo $plist['PURITY_PERCENT']; ?>" >
								            </td>
								            <td>
								            	<input type="text" class="form-control form-control-lg form-control-solid fs-7" name="pledge_weight[]" id="pledge_weight<?php echo $i;?>" value="<?php echo $plist['WEIGHT']; ?>" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" onkeyup="calc_upd_pledge_value(<?php echo $i;?>);">
								            	<input type="hidden" name="hid_pledge_weight[]" id="hid_pledge_weight<?php echo $i;?>" value="<?php echo $plist['WEIGHT']; ?>" >
								            </td>
								            <td>
								            	<input type="text" class="form-control form-control-lg form-control-solid fs-7" name="pledge_stone_weight[]" id="pledge_stone_weight<?php echo $i;?>"  value="<?php echo $plist['STONEWEIGHT']; ?>" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" onkeyup="calc_upd_pledge_value(<?php echo $i;?>);">
												<input type="hidden" name="hid_pledge_stone_weight[]" id="hid_pledge_stone_weight<?php echo $i;?>" value="<?php echo $stn_less; ?>" >

								            </td>
								            <td>
								            	<input type="text" class="form-control form-control-lg form-control-solid fs-7" name="pledge_less[]" id="pledge_less<?php echo $i;?>"  value="<?php echo $plist['LESS']; ?>" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" onkeyup="calc_upd_pledge_value(<?php echo $i;?>);">
												<input type="hidden" name="hid_pledge_less[]" id="hid_pledge_less<?php echo $i;?>" value="<?php echo $less; ?>" >
								            </td>
								            <td>
								            	<input type="text" class="form-control form-control-lg form-control-solid fs-7"  name="pledge_net_weight[]" id="pledge_net_weight<?php echo $i;?>"  value="<?php echo $plist['NETWEIGHT']; ?>" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" readonly>
								            	<input type="hidden" name="hid_pledge_net_weight[]" id="hid_pledge_net_weight<?php echo $i;?>" value="<?php echo $plist['NETWEIGHT']; ?>" >
								            </td>
											<td id="pur_weight<?php echo $i;?>">
									            	<?php 
									            	$pur_weight=$plist['NETWEIGHT']*($plist['PURITY_PERCENT']/100);
									            	echo round($pur_weight,3); 
									            	$tot_pur_weight+=$pur_weight;
									            	?>

									            	
								            </td>
								            <td>
												<!-- <input type="hidden" name="pledge_pure_weight[]" id="pledge_pure_weight<?php echo $i;?>" value="<?php echo $plist['PURITY'];?>" > -->
								            	<div class="image-input mt-2 me-6" data-kt-image-input="true">
													<!-- <div class="image-input-wrapper w-40px h-40px"style="background-image: url(assets/images/sample_jewel.jpg)"></div> -->
													<img src="<?php echo base_url();?>assets/images/sample_jewel.jpg" height="30" width="30" name="pledge_image[]" id="pledge_image<?php echo $i;?>">
												</div>
								            </td>
							        	</tr>
							   				<?php 
							   				}
							   				$i++;
							   			} 
							   		?>
								</tbody>
										   
							</table>
			          	</div>
			          	<?php  if($new_count<=0) { ?>
				       <div class="row">
									<label class="col-lg-1 col-form-label fw-semibold fs-6">Weight</label>
									<label class="col-lg-1 col-form-label fw-bold fs-6" id="tot_weight"><?php echo $loan_details->WEIGHT; ?></label>
									<label class="col-lg-1 col-form-label fw-semibold fs-6">Stoneless</label>
									<label class="col-lg-1 col-form-label fw-bold fs-6" id="tot_stone_less"><?php echo $loan_details->STONELESS; ?></label>
									<label class="col-lg-1 col-form-label fw-semibold fs-6">Less</label>
									<label class="col-lg-1 col-form-label fw-bold fs-6" id="tot_less"><?php echo $loan_details->LESS; ?></label>
									<label class="col-lg-1 col-form-label fw-semibold fs-6">Net.Wght</label>
									<label class="col-lg-1 col-form-label fw-bold fs-6" id="tot_net_weight"><?php echo $loan_details->NETWEIGHT; ?></label>
									<label class="col-lg-1 col-form-label fw-semibold fs-6">Pur.Wght</label>
									<label class="col-lg-1 col-form-label fw-bold fs-6" id="tot_pur_weight"><?php echo $tot_pur_weight; ?></label>
									<label class="col-lg-1 col-form-label fw-semibold fs-6">OldCurRate</label>
									<label class="col-lg-1 col-form-label fw-bold fs-6" style="color: red"><?php echo $loan_details->CURRENTRATE; ?></label>
									<label class="col-lg-1 col-form-label fw-semibold fs-6">Purity%</label>
									<label class="col-lg-1 col-form-label fw-bold fs-6" id="purity_percent"><?php echo $loan_details->QUALITY; ?></label>
									<label class="col-lg-1 col-form-label fw-semibold fs-6">CurrRate</label>
									<label class="col-lg-1 col-form-label fw-bold fs-6" id="curr_rate"><?php echo $_SESSION['CUR_GOLD_RATE']; ?></label>
									<input type="hidden" name="cur_rate" id="cur_rate" value="<?php echo $_SESSION['CUR_GOLD_RATE']; ?>">
									<input type="hidden" name="old_rate" id="old_rate" value="<?php echo $loan_details->CURRENTRATE; ?>">
							</div>
						<?php } else 
								{ 
										$pledge_values=$this->db->query("SELECT SUM(WEIGHT) as WEIGHT, SUM(STONEWEIGHT) as STONELESS, SUM(LESS) as LESS, SUM(NETWEIGHT) as NETWEIGHT, SUM(OLD_PLEDGE_RATE)/COUNT(OLD_PLEDGE_RATE) as CURRENTRATE,SUM(PURITY_PERCENT)/COUNT(PURITY_PERCENT) as QUALITY FROM FSD_UPDATED_PLEDGEINFO where BILLNO='".$loan_details->BILLNO."'")->row();
							?>
							 <div class="row">
									<label class="col-lg-1 col-form-label fw-semibold fs-6">Weight</label>
									<label class="col-lg-1 col-form-label fw-bold fs-6" id="tot_weight"><?php echo $pledge_values->WEIGHT; ?></label>
									<label class="col-lg-1 col-form-label fw-semibold fs-6">Stoneless</label>
									<label class="col-lg-1 col-form-label fw-bold fs-6" id="tot_stone_less"><?php echo $pledge_values->STONELESS; ?></label>
									<label class="col-lg-1 col-form-label fw-semibold fs-6">Less</label>
									<label class="col-lg-1 col-form-label fw-bold fs-6" id="tot_less"><?php echo $pledge_values->LESS; ?></label>
									<label class="col-lg-1 col-form-label fw-semibold fs-6">Net.Wght</label>
									<label class="col-lg-1 col-form-label fw-bold fs-6" id="tot_net_weight"><?php echo $pledge_values->NETWEIGHT; ?></label>
									<label class="col-lg-1 col-form-label fw-semibold fs-6">Pur.Wght</label>
									<label class="col-lg-1 col-form-label fw-bold fs-6" id="tot_pur_weight"><?php echo $tot_pur_weight; ?></label>
									<label class="col-lg-1 col-form-label fw-semibold fs-6">OldCurRate</label>
									<label class="col-lg-1 col-form-label fw-bold fs-6" style="color: red"><?php echo $pledge_values->CURRENTRATE; ?></label>
									<label class="col-lg-1 col-form-label fw-semibold fs-6">Purity%</label>
									<label class="col-lg-1 col-form-label fw-bold fs-6" id="purity_percent"><?php echo $pledge_values->QUALITY; ?></label>
									<label class="col-lg-1 col-form-label fw-semibold fs-6">CurrRate</label>
									<label class="col-lg-1 col-form-label fw-bold fs-6" id="curr_rate"><?php echo $_SESSION['CUR_GOLD_RATE']; ?></label>
									<input type="hidden" name="cur_rate" id="cur_rate" value="<?php echo $_SESSION['CUR_GOLD_RATE']; ?>">
									<input type="hidden" name="old_rate" id="old_rate" value="<?php echo $pledge_values->CURRENTRATE; ?>">
							</div>
						<?php } ?>
						<div class="d-flex justify-content-end mt-4">
							<button type="reset" class="btn btn-secondary me-3" data-bs-dismiss="modal" onclick="closeUpdatePledgeModal()">Cancel</button>
							<button type="submit" class="btn btn-primary" >Update</button>
						</div>
						
					</div>
					<!--end::Modal body-->
					</form>	
				</div>
				<!--end::Modal content-->
			</div>

<script>
      $("#update_pledge_item").kendoTooltip({
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



<script type="text/javascript">
	
	
	function calc_upd_pledge_value(i)
	{
		
		var upd_tot_pur_weight=0;
		
			//old values
			var old_tot_weight=parseFloat($('#tot_weight').html());
			var old_tot_stn_less=parseFloat($('#tot_stone_less').html());
			var old_tot_less=parseFloat($('#tot_less').html());
			var old_tot_net_weight=parseFloat($('#tot_net_weight').html());

			var old_tot_pur_weight=parseFloat($('#tot_pur_weight').html());

			var old_pur_per=$('#hid_pledge_pur_percent'+i).val();
			var old_pwgt=parseFloat($('#hid_pledge_weight'+i).val());
			var old_pstn_wgt=parseFloat($('#hid_pledge_stone_weight'+i).val());
			var old_pless=parseFloat($('#hid_pledge_less'+i).val());
			var old_net_wgt=parseFloat($('#hid_pledge_net_weight'+i).val());

			var old_pur_wgt=parseFloat($('#hid_pledge_pur_weight'+i).val());

			var pledge_pur_percent=parseFloat($('#pledge_pur_percent'+i).val());

			//entered current value
			var pur_per=parseFloat($('#pledge_pur_percent'+i).val());
			var pwgt=parseFloat($('#pledge_weight'+i).val());
			var pstn_wgt=parseFloat($('#pledge_stone_weight'+i).val());
			var pless=parseFloat($('#pledge_less'+i).val());

			var pledge_net_weight=parseFloat($('#pledge_net_weight'+i).val());

			//Purity calc - 05-10-2023

			var pur_weight=(pledge_net_weight * pledge_pur_percent /100);

			var net_wgt=pwgt - pstn_wgt - pless;

			
			//alert(old_pstn_wgt);
			
			// calculate tot by reducing old value & add new value
			var upd_tot_weight=parseFloat(old_tot_weight - old_pwgt)+pwgt;
			var upd_tot_stn_less=parseFloat(old_tot_stn_less - old_pstn_wgt)+pstn_wgt;
			var upd_tot_less=parseFloat(old_tot_less - old_pless)+pless;
			var upd_tot_net_weight=parseFloat(old_tot_net_weight - old_net_wgt)+net_wgt;

			console.log(old_tot_pur_weight);
			console.log(old_pur_wgt);
			console.log(pur_weight);

			upd_tot_pur_weight=parseFloat(old_tot_pur_weight - old_pur_wgt)+pur_weight;
		
			// alert(net_wgt);
			// var gval=net_wgt*parseFloat(pur_per);
			// alert(gval);
			

			$('#pledge_net_weight'+i).val(net_wgt.toFixed(3));

			$('#pur_weight'+i).html(pur_weight.toFixed(3));

			$('#purity_percent').html(pur_per.toFixed(2));
			// alert(upd_tot_weight);
			$('#tot_weight').html(upd_tot_weight.toFixed(3));
			$('#tot_stone_less').html(upd_tot_stn_less.toFixed(3));
			$('#tot_less').html(upd_tot_less.toFixed(3));
			$('#tot_net_weight').html(upd_tot_net_weight.toFixed(3));
			

			$('#hid_pledge_pur_percent'+i).val(pur_per.toFixed(2));
			$('#hid_pledge_weight'+i).val(pwgt.toFixed(3));
			$('#hid_pledge_stone_weight'+i).val(pstn_wgt.toFixed(3));
			$('#hid_pledge_less'+i).val(pless.toFixed(3));
			$('#hid_pledge_net_weight'+i).val(net_wgt.toFixed(3));
			$('#hid_pledge_pur_weight'+i).val(pur_weight.toFixed(3));

			let count=<?php echo count((array)$pledge_list); ?>


			
			let total_pur=0;
			for(let j=0;j<count;j++){

				  let pur= parseFloat($('#pur_weight'+j).html());
				 
				  total_pur=total_pur+pur;
				
			}
			
			
			$('#tot_pur_weight').html(total_pur.toFixed(3));
	}

</script>