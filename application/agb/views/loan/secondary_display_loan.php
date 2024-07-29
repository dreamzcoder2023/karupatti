<?php $this->load->view("common");?>
<style>
	.dataTables_scroll
    {
        position: relative;
        overflow: auto;
        height: 285px;
        max-height: 285px;/*the maximum height you want to achieve*/
        width: 100%;
    }
  .dataTables_scroll thead{
    position: -webkit-sticky;
    position: sticky;
    top: 0;
    /*background-color: #fff;*/
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
				<!-- Sidebar -->
				<!--begin::Wrapper-->
				<div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper"  style="padding-top: 2% !important;padding-left: 0px !important;">
				<!-- header -->
					<!--begin::Content-->
					<div class="content d-flex flex-column flex-column-fluid" id="kt_content" style="padding: 5px 0 !important;">
						<!--begin::Container-->
						<div id="kt_content_container" class="container-xxl">
							<!--begin::Row-->
							<div class="row gy-5 g-xl-8">
								<!--begin::Col-->
								<div class="col-xxl-8">
									<!--begin::Tables Widget 9-->
									<div class="card card-xxl-stretch" style="background-color:#d4af37 !important;">
									  <!-- style="background: url('assets/images/Notification.jpg');"> -->
										<div class="card-body" style="padding: 0.5rem 0.5rem !important;height: 640px;">
											<div class="row">
												<div class="col-lg-1">
													<?php
														
													?>
													<div class="aside-logo py-3 px-3" id="kt_aside_logo">
														<a href="index.php" class="d-flex align-items-center">
															<img alt="Logo" src="<?php echo base_url(); ?>assets/images/logo-1.jpg" class="h-100px logo" style="border-radius: 10px; " />
														</a>
													</div>
												</div>
												<div class="col-lg-7 d-flex align-items-center">
													<h1 class="text-dark fw-bold my-1 mx-5"  style="font-size: 30px !important;"><span>
													<?php echo $party['COMPANYNAME']; ?>
													</span></h1>
												</div>
												<div class="col-lg-4 d-flex align-items-center">
													<label class="col-form-label fw-bold fw-bold" style="font-size: 30px !important;">
														<span>New Loan</span>
													</label>
												</div>
											</div>
											<div class="row px-3">
												<div class="col-lg-4">
													<div class="row">
														<label class="col-lg-12 mb-2 fw-bold fs-1" title="Party Name">
															<i class="fa fa-user fs-1" aria-hidden="true" title="Last Name"></i> 
															<span name="first_name" id="first_name"><?php echo $party['NAME']; ?></span>
														</label>
														<label class="col-lg-12 mb-2 fw-bold fs-1" name="" id="">
															<i class="fas fa-mobile-android-alt fs-1" aria-hidden="true" title="Mobile"></i> 
															<span name="mobile" id="mobile"><?php echo $party['PHONE']; ?></span>
														</label>
														<label class="col-lg-12 mb-2 fw-bold fs-1" name="" id="">
															<i class="fa-solid fa-location-dot fs-1" aria-hidden="true" title="Address"></i> 
															<span name="address" id="address"><?php echo $address;?></span>
														</label>
													</div>
												</div>
												<div class="col-lg-4">
													<div class="row">
														<label class="col-lg-12 mb-2 fw-bold fs-1" title="Card No">
															<i class="fa fa-address-card fs-1" aria-hidden="true" title="Card No"></i> 
															<?php
															
															if(isset($card)){?>
															<span id="membership_card_no" name="membership_card_no" title="Membership card No : <?php echo $card->MEMBERSHIP_ID ? $card->MEMBERSHIP_ID : '-' ; ?>"><?php echo $card->MEMBERSHIP_ID ? $card->MEMBERSHIP_ID : '-' ; ?></span>
														<?php	}else{ ?>
															<span id="membership_card_no" name="membership_card_no" title="Membership card No : '-' ">-</span>
														<?php } ?>
														</label>
														<label class="col-lg-6 mb-2 fw-bold fs-1">
															<i class="fas fa-credit-card fs-1" title="Card type"></i>&emsp;
															<?php if(isset($card)){?>
															<span title="Card Type: <?php echo $card->CARD_TYPE ? $card->CARD_TYPE : '-' ; ?>"><?php echo $card->CARD_TYPE ? $card->CARD_TYPE : '-' ; ?></span>
															<?php }else{ ?>
																<span title="Card Type: '-'">-</span>
																<?php  }?>
														</label>
														<label class="col-lg-6 mb-2 fw-bold fs-1">
															<i class="fa-solid fa-coins fs-1" title="Points"></i> 
															<?php if(isset($card)){?>
															<span title="Membership Points: <?php echo $card->POINTS ? $card->POINTS : '0' ; ?>"><?php echo $card->POINTS ? $card->POINTS : '0' ; ?></span>
															<?php}else{ ?>
																<span title="Membership Points: '-'">-</span>
																<?php  }?>
														</label>
														<label class="col-lg-12 mb-2 fw-bold fs-1" name="" id="">
															<i class="fas fa-user-friends fs-1" title="Nominee"></i>&nbsp;&nbsp;
															<span name="nominee" id="nominee"><?php echo $party['NOMINEE']; ?></span>
															
															<span>&nbsp;-&nbsp;</span>
															<span name="relation" id="relation"><?php echo $party['RELATION']; ?></span>
														</label>
													</div>
												</div>
												<div class="col-lg-4">
													<div class="row">
														<div class="col-lg-6 fv-row">
															<div class="image-input image-input-outline" data-kt-image-input="true">
																<div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url(assets/media/svg/avatars/blank.svg)" id="party_photo" name="party_photo">
																	<div style="background-image: url(<?php echo base_url();?>assets/images/party.jpg)">
																	<?php echo $party_photo; ?>
																	</div>
																</div>
															</div>
														</div>
														<div class="col-lg-6 fv-row">
															<div class="image-input image-input-outline" data-kt-image-input="true">
																<div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url(assets/media/svg/avatars/blank.svg)" id="party_photo" name="party_photo">
																	<div style="background-image: url(<?php echo base_url();?>assets/images/party.jpg)">
																	<?php echo $jewel_photo; ?>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div class="row px-3">
												<div class="col-lg-6">
													<div class="row mt-2">
														<label class="col-lg-4 mb-2 fw-bold fs-1" title="Jewel Type">
															<i class="fas fa-gem fs-1" title="Jewel Type"></i> 
															<span><?php echo $party['JEWEL_TYPE']; ?></span>
														</label>
														<label class="col-lg-3 mb-2 fw-bold fs-1" title="Scheme">
															<i class="fas fa-sticky-note fs-1" title="Scheme"></i> 
															<span><?php echo $party['INTERESTTYPE']; ?></span>
														</label>
														<label class="col-lg-5 mb-2 fw-bold fs-1" title="Total Net Weight" style="font-size:2.2rem !important;">
															<i class="fas fa-balance-scale fs-1" title="Total Net Weight"></i>&nbsp;
															<span><?php echo $pl_weight->tot_net_weight; ?> gms</span>
														</label>
													</div>
												</div>
												<div class="col-lg-6"></div>
												<div class="col-lg-8">
													<div class="row">
														<table id="pledge_item_sd" class="table align-middle fs-7 gy-1 gs-2">
															<thead>
															  <tr>
															  	<th></th>
															   	<th></th>
															  </tr>
															</thead>
															<tbody>
															<?php foreach ($pledge as $ple) { ?>
																<tr>
																	<td>
																		<label class="fw-bold fs-1" title="Pledged Items">
																			<i class="fa-solid fa-link fs-1" title="Pledged Items"></i>&nbsp;&nbsp;
																			<span><?php echo $ple['PLEDGENAME']; echo " - ".$ple['DESCRIPTION'];?></span>
																		</label>
																	</td>
																	<td>
																		<label class="fw-bold fs-1" title="Net Weight">
																			<i class="fas fa-balance-scale-right fs-1" title="Net Weight"></i>&nbsp;
																			<span><?php echo $ple['NETWEIGHT'];?> gms</span>
																		</label>
																	</td>
																</tr>
																<?php } ?>
															</tbody>
														</table>
													</div>
												</div>
												<div class="col-lg-4">
													<div class="row">
														<label class="col-lg-12 fw-bold mt-2" style="font-size: 28px !important;">
															<span>Loan Amount</span>&emsp;
															<span><?php $amt=0;

															if($pl_weight->pur_per >0){
															$ppur=($pl_weight->pur_per/$pl_weight->pl_cnt)/100;
															$amt=($pl_weight->tot_net_weight*$ppur*$_SESSION['CUR_GOLD_RATE'])*(95/100);
															}
															echo (IND_money_format(round($amt)));  ?></span>
														</label>
														<label class="col-lg-12 fw-bold mt-2" style="font-size: 28px !important;">
															<span>Monthly Interest</span>&emsp;
															<span><?php if($amt > 0){ echo $m_int =(IND_money_format($amt * $party['INTEREST'] / 100)); } ?></span>
														</label>
														<!-- <label class="col-form-label text-center fw-bold fw-bold fs-1">Payment Info</label> -->
														<?php $arr = ['Cash','Cheque','RTGS','UPI']; foreach ($pay as $key => $p) {  ?>
														<label class="col-lg-6 mb-2 fw-bold fs-2">
															<span><?php echo $p['type_of_payment']; ?></span>&emsp;
															<span><?php if($p['type_of_payment']==$arr[$key])
															{
																echo $p['amount'];
															}
															else
															{
																echo '';
															}
															?></span>
														</label>
														<?php } ?>
													</div>
												</div>
											
											</div>
											<!-- <div style="padding: 10px !important;box-shadow: 0 3px 6px #00002947;border-radius: 5px;background-color: #f5f5f1;"> -->
												<!-- <div class="row" style="margin-left: 1rem !important;">
													<label class="col-lg-12 fw-bold" style="font-size: 28px !important;color: #0534df !important;">Your Transaction has been processed step by step.</label>
												</div> -->
												<!-- <div class="row" style="margin-left: 1rem !important;">
													<label class="col-lg-12 col-form-label fw-bold" style="font-size: 28px !important;color: #0534df !important;">Your Loan has been Sanctioned.</label>
												</div> -->
											<!-- </div> -->
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
				<!-- footer -->
				</div>
				<!--end::Wrapper-->
			</div>
			<!--end::Page-->
		</div>
		
		<!--end::Root-->
		<?php $this->load->view("script");?>
		<script>
		window.setTimeout( function() {
		window.location.reload();
		}, 30000);
</script>
<script>
			$("#pledge_item_sd").DataTable({
				"aaSorting":[],
				// "sorting":false,
				// "paging": false,
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
			$('#pledge_item_sd').wrap('<div class="dataTables_scroll" />');
		</script>
	</body>
	<!--end::Body-->
</html>