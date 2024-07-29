<?php $this->load->view("common");?>
<style>
	.dataTables_scroll
    {
        position: relative;
        overflow: auto;
        max-height: 218px;/*the maximum height you want to achieve*/
        width: 100%;
    }
  .dataTables_scroll thead{
    position: -webkit-sticky;
    position: sticky;
    top: 0;
    /*background-color: #fff;*/
    background-color: #ec9629;
    z-index: 2;
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
									<h1 class="d-flex align-items-center text-dark fw-bold my-1 fs-3">View Lot Entry
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
										<!--begin::Card header-->
										<!-- <div class="card-header1 border-0 pt-6">
											
											
										</div> -->
										<!--end::Card header-->
										<!--begin::Card body-->
										<div class="card-body py-4">
											<!-- <div style="padding: 10px 10px 10px 10px !important;box-shadow: 0 3px 6px #00002947;border-radius: 5px;background-color: #f5f5f1 !important;"> -->
												<div class="row">
													<div class="col-lg-10">
														<div class="row">
															<label class="col-lg-2 col-form-label fw-semibold fs-6">Company</label>
															<label class="col-lg-4 col-form-label fw-bold fs-5"> 
																<?php $company  = $this->db->query("SELECT * FROM COMPANY WHERE ACTIVE='Y' AND COMPANYCODE='". $lotentry->company_id."' ")->row(); echo $company->COMPANYNAME; ?>
															</label>
															<label class="col-lg-2 col-form-label fw-semibold fs-6">Date</label>
															<label class="col-lg-4 col-form-label fw-bold fs-5">
																<?php $date_format  = $this->db->query("SELECT * FROM general_settings ")->row();
																 $format= $date_format->date_format;
																 echo date("$format", strtotime($lotentry->lot_date));?>
															 </label>
															<!-- <div class="col-lg-6"> -->
																<label class="col-lg-2 col-form-label fw-semibold fs-6">Supplier &emsp;</label>
																<label class="col-lg-4 col-form-label fw-bold fs-5"> <?php echo $lotentry->supplier;?></label>
															<!-- </div> -->
															<label class="col-lg-2 col-form-label fw-semibold fs-6">Metal Type</label>
															<label class="col-lg-4 col-form-label fw-bold fs-5"> <?php $item_type= $this->db->query("SELECT * FROM jewel_type WHERE jewel_type_id='".$lotentry->metal_type."' ")->row(); echo $item_type->jewel_type;?></label>
														</div>
													</div>
													<div class="col-lg-2">
														<div class="row">
															<div class="col-lg-12">
															<?php	$image_url =  base_url().'lot_img/'. $lotentry->img; 
															    if(@getimagesize($image_url)){ ?>
																	<a class="d-block overlay"  href="<?php echo base_url(); ?>lot_img/<?php echo $lotentry->img; ?> " data-fslightbox="lightbox-basic">
																	    <!--begin::Image-->
																	    <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded w-125px h-125px"
																	    style="background-image:url('<?php echo base_url(); ?>lot_img/<?php echo $lotentry->img; ?>')">
																	    </div>
																	    <!--end::Image-->
																	    <!--begin::Action-->
																	    <div class="overlay-layer card-rounded bg-dark bg-opacity-25 shadow w-125px h-125px">
																	        <i class="bi bi-eye-fill text-white fs-3"></i>
																	    </div>
																	    <!--end::Action-->
																	</a>
																<?php }else{ ?>
																	 <a href="javascript:;" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm"   >
									            						<div class="image-input" data-kt-image-input="true">
																			<div class="image-input-wrapper w-125px h-125px" style="background-image: url(<?php echo base_url() ?>assets/images/Lot_images.jpg)">
																			</div>
																		</div>
																	</a>
															<?php } ?>
														</div>	
														</div>
													</div>
												</div>
												<div class="row mt-4"></div>
													<table class="table align-middle table-row-dashed table-striped table-hover fs-7 gy-4 gs-2" id="view_lotentry_table mt-4">
												    <thead>
                                  						<tr class="text-start text-muted fw-bold fs-7 gs-0">
												            <th class="min-w-50px">Sno</th>
												            <th class="min-w-100px">Lot ID</th>
												            <th class="min-w-150px">Item Name</th>
															<th class="min-w-100px">Count</th>
												            <th class="min-w-100px">Quality</th>
															<th class="min-w-100px">Purity</th>
												            <th class="min-w-100px">Weight(gms)</th>
															<th class="min-w-100px">Metal Wgt(gms)</th>
															<th class="min-w-100px">Amount</th>
												        </tr>
												    </thead>
												    <tbody class="text-gray-600 fw-semibold">
                                                    	<?php $i=1; foreach($lotentry_details as $llist){ ?>
													    	<tr>
													    		<td><?php echo $i; ?></td>
	                                                            <td>
															            	<?php echo $lotentry->lot_no;?>
															            </td>
														            <td>
														            	
															         <?php 
																	 $item= $this->db->query("SELECT * FROM ITEMS WHERE SNO='". $llist['item_name']."' ")->row();
																	echo $item->ITEMNAME
																	// echo $llist['item_name'];?>
														            </td>
														         
														             <td>
														             	<?php echo $llist['count'];?>
														            </td>
																	<td>
														            	<?php 
																		 $quality  = $this->db->query("SELECT * FROM ITEMPURITY WHERE  ITEMPURITYID='". $llist['quality']."' ")->row();
																		 echo $quality->ITEMPURITYNAME;
																		
																		// echo $llist['quality'];?>
														            </td>
																	<td>
														            	<?php echo $llist['purity'];?>
														            </td>
														            <td>
														            	<?php echo $llist['weight'];?>
														            </td>
																	<td>
														            	<?php echo $llist['metal_weight'];?>
														            </td>
																	<td>
														            	<?php echo $llist['metal_amount'];?>
														            </td>
													    	</tr>
                                                        <?php $i++; } ?>
												    </tbody>
												    <tfoot>
												    		<tr class="text-start text-muted fw-bold fs-5 gs-0">
												    			<td></td>
													    		<td></td>
													    		
													    		<td>Total</td>
													    		<td><?php echo $lotentry->item_count;?></td>
																<td></td>
																<td></td>

													    		<td><?php echo $lotentry->item_weight;?></td>
																<td><?php echo $lotentry->pure_metal_weight;?></td>
																<td><?php echo $lotentry->pure_metal_rate;?></td>
													    	</tr>
												    </tfoot>
													</table>
													<div class="separator separator-content border-dark my-6"><span class="w-200px fw-bold fs-4">Payment Details</span></div>
													<div class="row">
														<label class="col-lg-1 col-form-label fw-semibold fs-6">Amount</label>
														<label class="col-lg-2 col-form-label fw-bold fs-5">
															<i class="fa-solid fa-indian-rupee-sign fs-5 text-dark"></i>&nbsp;<?php $tot_amt= $lotentry->amount; echo number_format($tot_amt,2,'.',',');?> 
														</label>
														<label class="col-lg-1 col-form-label fw-semibold fs-6">Charges</label>
														<label class="col-lg-2 col-form-label fw-bold fs-5">
														<i class="fa-solid fa-indian-rupee-sign fs-5 text-dark"></i>&nbsp;<?php $tot_camt= $lotentry->charges; echo number_format($tot_camt,2,'.',',');?> 
														</label>
														<label class="col-lg-1 col-form-label fw-semibold fs-6">Total</label>
														<label class="col-lg-2 col-form-label fw-bold fs-5"><i class="fa-solid fa-indian-rupee-sign fs-5 text-dark"></i>&nbsp;<?php $pay_tot_amt= $lotentry->amount_to_pay; echo number_format($pay_tot_amt,2,'.',',');?> 
														</label>
													</div>
													<table class="table align-middle table-row-dashed table-striped table-hover fs-7 gy-1 gs-2" id="view_payment_table">
													    <thead>
	                                  						<tr class="text-start text-muted fw-bold fs-7 gs-0">
													            <th class="min-w-100px">Mode</th>
													            <th class="min-w-150px">Amount / Mt.Type</th>
																<th class="min-w-100px">Bank / Mt.pur</th>
													            <th class="min-w-100px">Cheque No / RTGS No / Mt.wgt</th>
																<th class="min-w-200px">Detail / Mt.Amount</th>
													        </tr>
													    </thead>
													    <tbody class="text-gray-600 fw-semibold">
													    	<?php if($lotentry->cash>0 ){ ?> 
													    	<tr>
													    		<td><label class="fw-semibold fs-6">Cash</label></td>
													    		<td>
													    			<label class="fw-bold fs-5"><i class="fa-solid fa-indian-rupee-sign fs-5 text-dark"></i>&nbsp;<?php $cash_tot_amt = $lotentry->cash; echo number_format($cash_tot_amt,2,'.',',');?> 
																	</label> 
																</td>
													    		<td><label class="fw-bold fs-5">-
													    			</label>
													    		</td>
													    		<td><label class="fw-bold fs-5">
													    				-
													    			</label>
													    		</td>
													    		<td class="ple1">
													    			<label class="fw-bold fs-5">
													    				<?php echo $lotentry->cash_detail?$lotentry->cash_detail:'-';?>
													    			</label>
																</td>
													    	</tr>
													    	<?php } ?>
													    	<?php if($lotentry->cheque_amt>0 ){ ?> 
													    	<tr>
													    		<td><label class="fw-semibold fs-6">Cheque</label></td>
													    		<td>
													    			<label class="fw-bold fs-5">
													    			<i class="fa-solid fa-indian-rupee-sign fs-5 text-dark"></i>&nbsp;<?php $aqtot_amt= $lotentry->cheque_amt; echo number_format($aqtot_amt,2,'.',',');?></label> 
																</td>
													    		<td>
													    			<label class="fw-bold fs-5"><?php if($lotentry->cheque_bank!=''){ echo $lotentry->cheque_bank; } else { echo '-'; }?> <?php //echo $lotentry->cheque_bank;?>
													    			</label>
													    		</td>
													    		<td>
													    			<label class="fw-bold fs-5"> <?php if($lotentry->cheque_number!=''){ echo $lotentry->cheque_number; } else { echo '-'; }?>
													    			</label>
													    		</td>
													    		<td class="ple1">
													    			<label class="fw-bold fs-5">
													    				<?php echo $lotentry->cheque_detail?$lotentry->cheque_detail:'-';?>
													    			</label>
																</td>
													    	</tr>
													    	<?php } ?>
													    	<?php if($lotentry->rtgs_amt>0 ){ ?> 
													    	<tr>
													    		<td>
													    			<label class="fw-semibold fs-6">RTGS
													    			</label>
													    		</td>
													    		<td>
													    			<label class="fw-bold fs-5"> <i class="fa-solid fa-indian-rupee-sign fs-5 text-dark"></i>&nbsp;<?php $rtgs_amt= $lotentry->rtgs_amt; echo number_format($rtgs_amt,2,'.',',');?></label> 
																</td>
													    		<td>
													    			<label class="fw-bold fs-5"> <?php if($lotentry->rtgs_bank!=''){ echo $lotentry->rtgs_bank; } else { echo '-'; }?>
													    			</label>
													    		</td>
													    		<td>
													    			<label class="fw-bold fs-5"> <?php if($lotentry->metal!=''){ echo $lotentry->rtgs_number; } else { echo '-'; }?>
													    			</label>
													    		</td>
													    		<td class="ple1">
													    			<label class="fw-bold fs-5">
													    				<?php echo $lotentry->rtgs_detail?$lotentry->rtgs_detail:'-';?>
													    			</label>
																</td>
													    	</tr>
													    	<?php } ?>
													    	<?php if($lotentry->metal_amount>0 ){ ?> 
													    	<tr>
													    		<td>
													    			<label class="fw-semibold fs-6">Metal</label>
													    		</td>
													    		<td>
													    			<label class="fw-bold fs-5"> 
																		<?php $metal_type_list = $this->db->query("SELECT * FROM jewel_type WHERE jewel_type_id='".$lotentry->metal."'  ")->row();?>
																		<?php if($metal_type_list!=''){ echo $metal_type_list->jewel_type; } else { echo '-'; }?>
																	</label> 
																</td>
													    		<td>
													    			<label class="fw-bold fs-5"> <?php if($lotentry->metal!=''){ echo $lotentry->metal_purity; } else { echo '-'; }?></label>
													    		</td>
													    		<td>
													    			<label class="fw-bold fs-5"><?php echo IND_money_format($lotentry->metal_weight,3);?>
													    			</label>
													    		</td>
													    		<td>
													    			<label class="fw-bold fs-5"> <i class="fa-solid fa-indian-rupee-sign fs-5 text-dark"></i>&nbsp;<?php $tot_mamt= $lotentry->metal_amount?$lotentry->metal_amount:0; echo number_format($tot_mamt,2,'.',',');?>
													    			</label>
																</td>
													    	</tr>
													    	<?php } ?>
													    </tbody>
													</table>
													<div class="row mt-4">
														<label class="col-lg-2 col-form-label fw-semibold fs-6">Total Amount</label>
														<label class="col-lg-2 col-form-label fw-bold fs-3"> <i class="fa-solid fa-indian-rupee-sign fs-5 text-dark"></i>&nbsp;<?php $tot_mamt= $lotentry->amount_to_pay?$lotentry->amount_to_pay:0; echo number_format($tot_mamt,2,'.',',');?></label>
														<label class="col-lg-2 col-form-label fw-semibold fs-6">Paid Amount</label>
														<label class="col-lg-2 col-form-label fw-bold fs-3"> <i class="fa-solid fa-indian-rupee-sign fs-5 text-dark"></i>&nbsp;<?php $tot_mamt= $lotentry->paid_amount?$lotentry->paid_amount:0; echo number_format($tot_mamt,2,'.',',');?></label>
														<label class="col-lg-2 col-form-label fw-semibold fs-6">Balance Amount</label>
														<label class="col-lg-2 col-form-label fw-bold fs-3"> <i class="fa-solid fa-indian-rupee-sign fs-5 text-dark"></i>&nbsp;<?php $tot_mamt= $lotentry->balance_amount?$lotentry->balance_amount:0; echo number_format($tot_mamt,2,'.',',');?></label>
													</div>
												<!-- </div> -->
										</div>
										<!--end::Card body-->
										<?php  if($lotentry->status!='A'){ ?>

											<div class="row">
										<div class="col-lg-8"></div>
										<div class="col-lg-2">
											<div class="d-flex flex-center flex-row-fluid pt-5 me-2">
											<?php  if($lotentry->status!='U'){ ?>
												<a href="#" class="menu-link px-3" data-bs-toggle="modal" data-bs-target="#kt_modal_update_tag_entry" onclick="lot_edit('<?php echo $lotentry->lot_id; ?>')">
													<button type="reset" class="btn btn-primary md-2" >Send For Update </button>
												</a>	
												<?php } ?>

											</div>
										</div>
										<div class="col-lg-2">
											<div class="flex-center flex-row-fluid pt-5 me-2">
											
												<a href="#" class="menu-link flex-stack px-3" data-bs-toggle="modal" data-bs-target="#kt_modal_verify_tag_entry" onclick="lot_approve('<?php echo $lotentry->lot_id; ?>')">
													<button type="submit" class="btn btn-primary" id="">Approve</button>
												</a>
											</div>
										</div>
									</div>
									<?php } ?>
									<br> 
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
		<div class="modal fade" id="kt_modal_update_tag_entry" tabindex="-1" aria-hidden="true">

	<!--begin::Modal dialog-->
<div class="modal-dialog modal-md">
				<!--begin::Modal content-->
				<div class="modal-content rounded">
					<!--begin::Modal header-->
					<div class="modal-header justify-content-end border-0 pb-0">
						<!--begin::Close-->
						<div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
							<!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
							<span class="svg-icon svg-icon-1" onclick="closeViewModal()">
								<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
									<rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="currentColor" />
									<rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="currentColor" />
								</svg>
							</span>
							
						</div>
						<!--end::Close-->
					</div>
					<!--end::Modal header-->
					<!--begin::Modal body-->
					<div class="modal-body pt-0 pb-8 px-5 px-xl-20">
						<!--begin::Heading-->
						<div class="mb-7 text-center">
							<h1>Update Lot Item </h1>
						</div>
						<!--end::Heading-->
						<div class="row">
							<label class="col-lg-4 col-form-label fw-semibold fs-6">Description</label>
							<div class="col-lg-8 fv-row fv-plugins-icon-container">
								<textarea class="form-control form-select-solid fw-semibold fs-5" rows="4" id="update_description" name="update_description"></textarea>
								<input type="hidden" id="update_id_hide" name="update_id_hide" >
								<div class="fv-plugins-message-container invalid-feedback"></div>
							</div>
						</div>
						<div class="mt-4 d-flex justify-content-center">
								<button type="reset" class="btn btn-secondary me-2" data-bs-dismiss="modal" onclick="closeViewModal()">Cancel</button>
								<button type="submit" class="btn btn-primary" id="" onclick="updatelot()">Update</button>
						</div>
					</div>
					<!--end::Modal body-->
				</div>
				<!--end::Modal content-->
			</div>


						<!--end::Modal dialog-->
		</div>
		<div class="modal fade" id="kt_modal_verify_tag_entry" tabindex="-1" aria-hidden="true">
		<!--begin::Modal dialog-->
    <div class="modal-dialog modal-m">
				<!--begin::Modal content-->
				<div class="modal-content rounded">
					<div class="swal2-icon swal2-warning swal2-icon-show" style="display: flex;">
						<div class="swal2-icon-content">&#x2713;</div></div>
						<div class="swal2-html-container" id="swal2-html-container" style="display: block;">
							<b><span id="approve_span"  ></span></b>
							<input type="hidden" id="approve_span1" >
							<p class="mt-2">Are you sure you want to Approve?</p></div>
						<div class="d-flex flex-center flex-row-fluid pt-12">
							
							<button type="reset" class="btn btn-secondary me-3" data-bs-dismiss="modal" onclick="closeViewModal()">No</button>
                            <button type="submit" class="btn btn-primary me-3" data-bs-dismiss="modal" id="approve_lot" onclick="approvelot()">Yes</button>
                        </div><br><br>
				</div>
				<!--end::Modal content-->
			</div>
			<!--end::Modal dialog-->


				</div>
		<?php $this->load->view("script");?>
		<!-- <script src="js/products-list.js"></script> -->
		<script>

		function lot_edit(val)
			{
				var baseurl= $("#baseurl").val();
				// alert(val);
				$.ajax({
				type: "POST",
				url: baseurl+'Lotentry/lotentry_update_required',
				async: false,
				type: "POST",
				data: "id="+val,
				dataType: "html",
				success: function(response)
				{
					
					$('#update_id_hide').val(response);		
				// $('#kt_modal_update_tag_entry').empty().append(response);
				// $('#kt_modal_update_tag_entry').addClass('show');
				//$("#kt_modal_delete_role").css("display", "block");
				}
				});
			}
			function updatelot()
			{ 
				// var val=1;
				//alert(val);
				var update_description= $("#update_description").val();
				var val= $("#update_id_hide").val();
				//alert(update_description);
				var baseurl= $("#baseurl").val();
				$.ajax({
				type: "POST",
				url: baseurl+'Lotentry/update_required?',
				async: false,
				data:"field="+val+"&update_description="+update_description,
				success: function(res)
				{
				window.location.href = baseurl+'Lotentry';
				}
				});
			}
			function approvelot()
			{ 
				// alert(val);exit();
				var val = document.getElementById('approve_span1').value;
				// alert(val);
				// var str=val.replace('/','_');
				var baseurl= $("#baseurl").val();
				$.ajax({
				type: "POST",
				url: baseurl+'Lotentry/approve',
				async: false,
				data:"field="+val,
				success: function(res)
				{
				window.location.href = baseurl+'Lotentry';
				}
				});
			}
			</script>
			<script>
		function lot_approve(val)
			{
				var baseurl= $("#baseurl").val();
				//alert(val);
				$.ajax({
				type: "POST",
				url: baseurl+'Lotentry/lotentry_approve',
				async: false,
				type: "POST",
				data: "id="+val,
				dataType: "html",
				success: function(response)
				{
					var resp=response.split('||');

					$('#approve_span').html(resp[2]);		
					$('#approve_span1').val(resp[1]);		

			//	$('#kt_modal_verify_tag_entry').empty().append(response);
				// $('#kt_modal_verify_tag_entry').addClass('show');
				//$("#kt_modal_delete_role").css("display", "block");
				}
				});
			}
        </script>
		<script>
			      $("#kt_datatable_responsive_approved").kendoTooltip({
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
			      $("#kt_datatable_responsive_not_approved").kendoTooltip({
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
			$("#add_tagentry_date").flatpickr({
				dateFormat: "d-m-Y",});
		</script>
		<script>
			$("#view_lotentry_table").DataTable({
				//"aaSorting":[],
				"sorting":false,
				"paging": false,
				"info": false,
				// "responsive": true,
				 "language": {
				  "lengthMenu": "Show _MENU_",
				 },
				 "dom":
				  "<'row'" +
				  // "<'col-sm-6 d-flex align-items-center justify-conten-start'l>" +
				  ">" +

				  "<'table-responsive'tr>" +

				  "<'row'" +
				  // "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
				  // "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
				  ">"
				});
			$('#view_lotentry_table').wrap('<div class="dataTables_scroll" />');
		</script>
		<script>
			$("#view_payment_table").DataTable({
				//"aaSorting":[],
				"sorting":false,
				"paging": false,
				"info": false,
				// "responsive": true,
				 "language": {
				  "lengthMenu": "Show _MENU_",
				 },
				 "dom":
				  "<'row'" +
				  // "<'col-sm-6 d-flex align-items-center justify-conten-start'l>" +
				  ">" +

				  "<'table-responsive'tr>" +

				  "<'row'" +
				  // "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
				  // "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
				  ">"
				});
			$('#view_payment_table').wrap('<div class="dataTables_scroll" />');
		</script>
		<script>
	      $("#view_payment_table").kendoTooltip({
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
			
			$("#date_add_tag").flatpickr({
								dateFormat: "d-m-Y",
							});
			// $("#to_date_fillter").flatpickr({
			// 					dateFormat: "d-m-Y",
			// 				});



				$("#kt_daterangepicker_lot_entry_from").flatpickr({
								dateFormat: "d-m-Y",
							});
				$("#kt_daterangepicker_lot_entry_to").flatpickr({
								dateFormat: "d-m-Y",
							});
				$("#kt_daterangepicker_lot_entry_add_date").flatpickr({
								dateFormat: "d-m-Y",
							});
				$("#kt_daterangepicker_lot_entry_edit_date").flatpickr({
								dateFormat: "d-m-Y",
							});
				$("#kt_daterangepicker_lot_entry_view_date").flatpickr({
								dateFormat: "d-m-Y",
							});

			$("#kt_datatable_responsive_approved").DataTable({
				
				"responsive": true,
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

				$("#kt_datatable_responsive_not_approved").DataTable({
				
				"responsive": true,
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
	</body>
	<!--end::Body-->
</html>