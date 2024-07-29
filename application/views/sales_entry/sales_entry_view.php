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
									<h1 class="d-flex align-items-center text-dark fw-bold my-1 fs-3">View Sales
									<!--begin::Separator-->
									<span class="h-20px border-gray-400 border-start ms-3 mx-2"></span>
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
											<!--begin::Table-->
												<div class="row">
													<div class="col-lg-6">
														<div class="row">
															<label class="col-lg-2 col-form-label fw-semibold fs-6">Date</label>
															<label class="col-lg-10 col-form-label fw-bold fs-6"><?php



															 $date_format  = $this->db->query("SELECT * FROM general_settings  ")->row();
															 $format= $date_format->date_format;
															 echo date("$format", strtotime($sales_entry_list->sales_date));
															// echo $sales_entry_list->sales_date; ?></label>
															<label class="col-lg-2 col-form-label fw-semibold fs-6">Company</label>
															<label class="col-lg-8 col-form-label fw-bold fs-6"><?php
															 $company  = $this->db->query("SELECT * FROM COMPANY WHERE ACTIVE='Y' AND COMPANYCODE='". $sales_entry_list->company_id."' ")->row();
															 echo isset($company->COMPANYNAME) ? $company->COMPANYNAME :"-";
															//echo $sales_entry_list->company_id; ?></label>
															<?php $party_detail= $this->db->query("SELECT * FROM PARTIES WHERE PID='".$sales_entry_list->party_id."'  ")->row(); 


																//print_r($party_detail);
															?>
															<label class="col-lg-6 col-form-label fw-bold fs-6"><i class="fa fa-address-card fs-6" aria-hidden="true" title="Card No"></i>&emsp;<?php echo isset($party_detail->MEMBERSHIP_ID) ? $party_detail->MEMBERSHIP_ID : "-"; ?>
																<!-- <i class="fas fa-times-circle fs-5" style="color:red;"></i> -->
																<i class="fas fa-check-circle fs-5" style="color:#50cd89;"></i>
															</label>
															<label class="col-lg-3 col-form-label fw-bold fs-6" name="" id="" ><span style="background-color:#FFAA00;border-radius: 8px;padding: 5px 15px 5px 15px;">Gold</span></label>
															<label class="col-lg-3 col-form-label fw-bold fs-6" name="" id=""><i class="fa-solid fa-coins fs-6" title="Points"></i>&emsp;<?php echo isset($party_detail->MEMBERSHIP_POINTS) ? $party_detail->MEMBERSHIP_POINTS : "-"; ?></label>
														</div>
													</div>
													<div class="col-lg-4">
														<div class="row">
														
															<label class="col-lg-12 col-form-label fw-bold fs-6" name="" id="">
																<i class="fa fa-user fs-6" aria-hidden="true" title="Last Name"></i>&emsp;<?php echo isset($party_detail->NAME) ? $party_detail->NAME : "-"; ?></label>
															<label class="col-lg-12 col-form-label fw-bold fs-6" name="" id="">
																<i class="fa-solid fa-location-dot fs-6" aria-hidden="true" title="Address"></i>
															&emsp;<?php echo isset($party_detail->ADDRESS1) ? $party_detail->ADDRESS1 : "-"; ?></label>
															<label class="col-lg-6 col-form-label fw-bold fs-6" name="" id="">
																	<i class="fas fa-mobile-android-alt fs-6" aria-hidden="true" title="Mobile"></i>
																&emsp;<?php echo isset($party_detail->PHONE) ? $party_detail->PHONE : "-" ; ?></label>
																<label class="col-lg-6 col-form-label fw-bold fs-6">
																<?php 		if($party_detail->RATING==1){ ?>
	                	<i class="fa-solid fa-star " style="color:red;"></i>&nbsp;Bad
	               <?php  }
	                else if($party_detail->RATING==2){ ?>
	                	<i class="fa-solid fa-star " style="color:#ffc700;"></i>&nbsp;Average	
	              <?php   }
	                else if($party_detail->RATING==3){ ?>
	                	<i class="fa-solid fa-star " style="color:#50cd89;"></i>&nbsp;Good
	              <?php   }
	                else{ ?>
	                	<i class="fa-solid fa-star " style="color:#d2d4dc;"></i>&nbsp;-	
	           <?php      } ?>
																<!--<span><i class="fa-solid fa-star" style="color:#50cd89;"></i></span>
															&nbsp;Good--></label>
														</div>
													</div>
													<div class="col-lg-2">
														<!--begin::Image input-->
														<div class="image-input image-input-outline" data-kt-image-input="true">
															<!--begin::Preview existing avatar-->
														<?php 	if($party_detail->PHOTO!='')
         { ?>
         <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($party_detail->PHOTO); ?>"  height="125px" width="125px">
		
        <?php  }
         else
         { ?>
         
		 <img src="<?php echo base_url(); ?>'assets/images/party.jpg" height="125px" width="125px" >
       <?php   } ?>
															
															<!--end::Preview existing avatar-->
														</div>
														<!--end::Image input-->
														<!--begin::Hint-->
														<div class="form-text"></div>
													</div>
												</div>
												<div class="accordion" id="kt_accordion_item_list_view">
												    <div class="accordion-item">
												        <h2 class="accordion-header" id="kt_accordion_item_list_view_header_1">
												            <button class="accordion-button fw-bold fs-6 collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#kt_accordion_item_list_view_body_1" aria-expanded="false" aria-controls="kt_accordion_item_list_view_body_1">
												            Tagged Item &emsp; - &emsp; Count <span>&emsp; <?php if(isset($sales_entry_list->sales_gold_count)){ $gold_count=$sales_entry_list->sales_gold_count; }else{ $gold_count=0; } if(isset($sales_entry_list->sales_silver_count)){ $silver_count=$sales_entry_list->sales_silver_count; }else{ $silver_count=0; } if(isset($sales_entry_list->sales_nt_count)){ $nt_count=$sales_entry_list->sales_nt_count; }else{ $nt_count=0; } echo $gold_count+$silver_count-$nt_count; ?> &emsp; - &emsp;</span> Total Amount <span>&emsp; <?php   echo round($sales_entry_list->sales_gold_amount)+round($sales_entry_list->sales_silver_amount)-round($sales_entry_list->nt_total_amount); ?></span>
												            </button>
												        </h2>
												        <div id="kt_accordion_item_list_view_body_1" class="accordion-collapse collapse" aria-labelledby="kt_accordion_item_list_view_header_1" data-bs-parent="#kt_accordion_item_list_view">
												            <div class="accordion-body">
												           	  	<table class="table align-middle table-row-dashed table-striped table-hover fs-7 gy-1 gs-2" id="view_salesentry_table">
																			    <thead>
																			        <tr class="text-start text-muted fw-bold fs-7 gs-0">
																		            <th class="min-w-25px">Sno</th>
																		            <th class="min-w-80px">Tag No</th>
																		            <th class="min-w-50px">Item Name</th>
																		            <th class="min-w-80px">Sub Item</th>
																		            <th class="min-w-50px">Img</th>
																		            <th class="min-w-25px">Quality</th>
																								<th class="min-w-25px">Purity</th>
																					      <th class="min-w-50px">Wgt(gms)</th>
																								<th class="min-w-50px">St Wgt(gms)</th>
																								<th class="min-w-50px">Net Wgt(gms)</th>
																								<th class="min-w-50px">HC Amt</th>
																								<th class="min-w-50px">MC Amt</th>
																								<th class="min-w-50px">WC Amt</th>
																								<th class="min-w-50px">Metal wgt(gms)</th>
																					      <th class="min-w-80px">Amount</th>
																			        </tr>
																			    </thead>
																			    <tbody class="text-gray-600 fw-semibold">

																				<?php $i=1; foreach($sales_entry_detail_list as $detail_list){ ?>
																			    	<tr>
																			    		<td><?php echo $i; ?></td>
																			    		<td class="ple1"><?php echo $detail_list['tag_no']; ?></td>
																	            <td class="ple1"><?php
																				$item_name  = $this->db->query("SELECT * FROM ITEMS WHERE  SNO='". $detail_list['item_name']."' ")->row();
																				echo $item_name->ITEMNAME;
	
																				//echo $detail_list['item_name']; ?></td>
																	            <td class="ple1"><?php
																				$item_name  = $this->db->query("SELECT * FROM SUBITEM_LIST WHERE  SUB_ID='". $detail_list['subitem_name']."' ")->row();
																				echo $item_name->SUBITEM_NAME;
																				// echo $detail_list['subitem_name']; ?></td>
																	            <td>
																	            <?php	$image_url =  base_url().'tag_img/'. $detail_list['img']; 
if(@getimagesize($image_url)){
?>
<a href="javascript:;" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm">
                                                <div class="image-input" data-kt-image-input="true">
                                                                    <div class="image-input-wrapper w-40px h-40px" style="background-image: url(<?php echo base_url() ?>tag_img/<?php echo $detail_list['img']; ?>)"></div>
                                                                </div>
                                                            </a>

<?php 
}else{
?>
<a href="javascript:;" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm">
                                                <div class="image-input" data-kt-image-input="true">
                                                                    <div class="image-input-wrapper w-40px h-40px" style="background-image: url(<?php echo base_url() ?>assets/media/svg/avatars/blank_jwl.svg)"></div>
                                                                </div>
                                                            </a>

<?php
}										?>
																	            </td>
																	            <td><?php
																				$quality  = $this->db->query("SELECT * FROM ITEMPURITY WHERE  ITEMPURITYID='". $detail_list['quality']."' ")->row();
																				echo $quality->ITEMPURITYNAME;
																				// echo $detail_list['quality']; ?></td>
																	            <td><?php echo isset($detail_list['purity']) ? $detail_list['purity'] : "-"; ?></td>
																	            <td><?php echo isset($detail_list['weight']) ? $detail_list['weight'] : "-"; ?></td>
																	            <td><?php echo isset($detail_list['stone']) ? $detail_list['stone'] : "-"; ?></td>
																	            <td><?php echo isset($detail_list['net_weight']) ? $detail_list['net_weight'] : "-" ; ?></td>
																	            <td><?php echo isset($detail_list['hc_amount']) ? $detail_list['hc_amount'] : "-"; ?></td>
																	            <td><?php echo isset($detail_list['mc_amount']) ? $detail_list['mc_amount'] : "-"; ?></td>
																	            <td><?php echo isset($detail_list['wc_amount']) ? $detail_list['wc_amount'] : "-"; ?></td>
																	            <td><?php echo isset($detail_list['metal_weight']) ? $detail_list['metal_weight'] : "-" ; ?></td>
																	            <td><?php echo isset($detail_list['total_amount']) ? $detail_list['total_amount'] : "-"; ?></td>
																			    	</tr>
																					<?php $i++; } ?>
																			    </tbody>
																			</table>
												            </div>
												        </div>
												    </div>
												</div><br>
												<div class="accordion" id="kt_accordion_old_jewel_exchange_view">
												    <div class="accordion-item">
												        <h2 class="accordion-header" id="kt_accordion_old_jewel_exchange_view_header_2">
												            <button class="accordion-button fw-bold fs-6 collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#kt_accordion_old_jewel_exchange_view_body_2" aria-expanded="false" aria-controls="kt_accordion_old_jewel_exchange_view_body_2">
												            Non Tagged Item &emsp; - &emsp; Count <span>&emsp; <?php echo $sales_entry_list->nt_count; ?> &emsp; - &emsp;</span> Total Amount <span>&emsp; <?php echo $sales_entry_list->nt_total_amount; ?></span>
												            </button>
												        </h2>
												        <div id="kt_accordion_old_jewel_exchange_view_body_2" class="accordion-collapse collapse" aria-labelledby="kt_accordion_old_jewel_exchange_view_header_2" data-bs-parent="#kt_accordion_old_jewel_exchange_view">
												            <div class="accordion-body">
												           	  	<table class="table align-middle table-row-dashed table-striped table-hover fs-7 gy-1 gs-2 dataTable" id="view_nontagged_entry_table">
																			    <thead>
																			        <tr class="text-start text-muted fw-bold fs-7 gs-0">
																		         
																		            <th class="min-w-80px">Item Type</th>
																					<th class="min-w-100px">Item </th>
																		            <th class="min-w-100px">Sub Item</th>
																		            <th class="min-w-25px">Img</th>
																		            <th class="min-w-25px">Quality</th>
																								<th class="min-w-50px">Purity %</th>
																		            <th class="min-w-80px">Weight(gms)</th>
																								<th class="min-w-50px">Stone Wgt(gms)</th>
																								<th class="min-w-80px">Net Wgt(gms)</th>
																								<th class="min-w-50px">Hallmark Charges</th>
																								<th class="min-w-50px">Making Charges</th>
																								<th class="min-w-50px">Wastage Amt</th>
																								<th class="min-w-50px">Metal Wgt(gms)</th>
																		            <th class="min-w-80px">Amount</th>
																		        	</tr>
																			    </thead>
																			    <tbody class="text-gray-600 fw-semibold">
																				<?php foreach($sales_entry_detail_nontag as $detail_list){ ?>
																			    	<tr>
																			    	
																			    		<td class="ple1"><?php 
																						$item_type=$this->db->query("SELECT * FROM jewel_type WHERE jewel_type_id='".$detail_list['item_type']."'  ")->row();
																						echo $item_type->jewel_type;
																						//  echo $detail_list['item_type']; ?> </td>
																						<td class="ple1"> <?php
																						$item_name  = $this->db->query("SELECT * FROM ITEMS WHERE  SNO='". $detail_list['item_name']."' ")->row();
																						echo $item_name->ITEMNAME;
																						// echo $detail_list['item_type'];
																						 ?></td>
																			    		<td class="ple1"><?php $item_name  = $this->db->query("SELECT * FROM SUBITEM_LIST WHERE  SUB_ID='". $detail_list['subitem_name']."' ")->row();
																						echo $item_name->SUBITEM_NAME;
																						//echo $detail_list['item_name']; ?></td>
																			    		<td>
																						<?php	$image_url =  base_url().'assets/images/sales_non_tag_img/'. $detail_list['img']; 
if(@getimagesize($image_url)){
?>
<a href="javascript:;" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm">
                                                <div class="image-input" data-kt-image-input="true">
                                                                    <div class="image-input-wrapper w-40px h-40px" style="background-image: url(<?php echo base_url() ?>assets/images/sales_non_tag_img/<?php echo $detail_list['img']; ?>)"></div>
                                                                </div>
                                                            </a>

<?php 
}else{
?>
<a href="javascript:;" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm">
                                                <div class="image-input" data-kt-image-input="true">
                                                                    <div class="image-input-wrapper w-40px h-40px" style="background-image: url(<?php echo base_url() ?>assets/media/svg/avatars/blank_jwl.svg)"></div>
                                                                </div>
                                                            </a>

<?php
}										?>
																	            </td>
																			    		<td class="ple1"><?php
																						 $quality  = $this->db->query("SELECT * FROM ITEMPURITY WHERE  ITEMPURITYID='". $detail_list['quality']."' ")->row();
																						 echo $quality->ITEMPURITYNAME;
																						// echo $detail_list['quality']; ?></td>
																			    		<td class="ple1"><?php echo $detail_list['purity']; ?></td>
																			    		<td class="ple1"><?php echo $detail_list['weight']; ?></td>
																			    		<td class="ple1"><?php echo $detail_list['stone']; ?></td>
																			    		<td class="ple1"><?php echo $detail_list['net_weight']; ?></td>
																			    		<td class="ple1"><?php echo $detail_list['hc_amount']; ?></td>
																			    		<td class="ple1"><?php echo $detail_list['mc_amount']; ?></td>
																			    		<td class="ple1"><?php echo $detail_list['wc_amount']; ?></td>
																			    		<td class="ple1"><?php echo $detail_list['metal_weight']; ?></td>
																			        <td class="ple1"><?php echo $detail_list['total_amount']; ?></td>
																			    	</tr>
																					<?php } ?>
																			    </tbody>
																			</table>
												            </div>
												        </div>
												    </div>
												</div><br>
												<div class="accordion" id="kt_accordion_pure_gold_exchange_view">
												    <div class="accordion-item">
												        <h2 class="accordion-header" id="kt_accordion_pure_gold_exchange_view_header_3">
												            <button class="accordion-button fw-bold fs-6 collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#kt_accordion_pure_gold_exchange_view_body_3" aria-expanded="false" aria-controls="kt_accordion_pure_gold_exchange_view_body_3">
												            Exchange -  Old Metal &emsp; - &emsp; Count <span>&emsp; <?php echo $sales_entry_list->oge_gold_count+$sales_entry_list->oge_silver_count; ?> &emsp; - &emsp;</span> Total Amount <span>&emsp; <?php echo $sales_entry_list->old_gold_amount; ?></span>
												            </button>
												            <!-- <div class="d-flex justify-content-end">
												            	<label class="col-form-label fw-bold fs-5 me-6">Count :<span>&emsp; 0</span></label>
												            	<label class="col-form-label fw-bold fs-5 me-3">Total Amount :<span>&emsp; 0.00</span></label>
												            </div> -->
												        </h2>
												        <div id="kt_accordion_pure_gold_exchange_view_body_3" class="accordion-collapse collapse" aria-labelledby="kt_accordion_pure_gold_exchange_view_header_3" data-bs-parent="#kt_accordion_pure_gold_exchange_view">
												            <div class="accordion-body">
												           	  <table class="table align-middle table-row-dashed table-striped table-hover fs-7 gy-1 gs-2 dataTable" id="view_puregold_entry_table">
																			    <thead>
																			     <!-- style=" background-color: #A7D3F0 !important;border: 1px solid #606060 !important;color: black !important;"> -->
																			        <tr class="text-start text-muted fw-bold fs-7 gs-0">
																		            <th class="min-w-25px">Sno</th>
																		            <th class="min-w-100px">Item Type</th>
																		            <th class="min-w-150px">Item Name</th>
																		            <th class="min-w-150px">Sub Item</th>
																		            <th class="min-w-50px">Quality</th>
																								<th class="min-w-50px">Purity(%)</th>
																		            <th class="min-w-50px">Wgt(gms)</th>
																		            <th class="min-w-50px">St Wgt(gms)</th>
																		            <th class="min-w-50px">Less(gms)</th>
																		            <th class="min-w-50px">Net Wgt(gms)</th>
																		            <th class="min-w-50px">Img</th>
																		            <th class="min-w-80px">Est Amount</th>
																		        </tr>
																			    </thead>
																			    <tbody class="text-gray-600 fw-semibold">
																				<?php $i=1; foreach($sales_entry_old_exchange_list as $old_list)
                                    { ?>	
																				<tr>
																			    		<td><?php echo $i; ?></td>
																			    		<td class="ple1"><?php
																						$item_type=$this->db->query("SELECT * FROM jewel_type WHERE jewel_type_id='".$old_list['item_type']."'  ")->row();
																						echo $item_type->jewel_type;
																						// echo $old_list['item_type']; ?></td>
																			    		<td class="ple1"><?php 
																						$item_name  = $this->db->query("SELECT * FROM ITEMS WHERE  SNO='". $old_list['item_name']."' ")->row();
																						echo $item_name->ITEMNAME;
																						// echo $old_list['item_name']; ?></td>
																			    		<td class="ple1"><?php
																						// $item_name  = $this->db->query("SELECT * FROM SUBITEM_LIST WHERE  SUB_ID='". $old_list['subitem_name']."' ")->row();
																						// echo $item_name->SUBITEM_NAME;
																						echo $old_list['subitem_name']; ?></td>
																			    		<td class="ple1"><?php
																						$quality  = $this->db->query("SELECT * FROM ITEMPURITY WHERE  ITEMPURITYID='". $old_list['quality']."' ")->row();
																						echo $quality->ITEMPURITYNAME;
																						// echo $old_list['quality']; ?></td>
																			    		<td class="ple1"><?php echo $old_list['purity']; ?></td>
																			    		<td class="ple1"><?php echo $old_list['weight']; ?></td>
																			    		<td class="ple1"><?php echo $old_list['st_weight']; ?></td>
																			    		<td class="ple1"><?php echo $old_list['less']; ?></td>
																			    		<td class="ple1"><?php echo $old_list['net_weight']; ?></td>
																			    		<td>
																						<?php	$image_url =  base_url().'assets/images/old_gold_exchange_img/'. $old_list['img']; 
if(@getimagesize($image_url)){
?>
<a href="javascript:;" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm">
                                                <div class="image-input" data-kt-image-input="true">
                                                                    <div class="image-input-wrapper w-40px h-40px" style="background-image: url(<?php echo base_url() ?>assets/images/old_gold_exchange_img/<?php echo $old_list['img']; ?>)"></div>
                                                                </div>
                                                            </a>

<?php 
}else{
?>
<a href="javascript:;" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm">
                                                <div class="image-input" data-kt-image-input="true">
                                                                    <div class="image-input-wrapper w-40px h-40px" style="background-image: url(<?php echo base_url() ?>assets/media/svg/avatars/blank_jwl.svg)"></div>
                                                                </div>
                                                            </a>

<?php
}										?>

																			    		</td>
																			        <td class="ple1"><?php echo $old_list['est_amount']; ?></td>
																			    	</tr>
																					<?php $i++; }  ?>
																			    </tbody>
																			</table>
												            </div>
												        </div>
												    </div>
												</div><br>
												<div class="row mt-2">
													<div class="col-lg-6">
														<div class="px-4" style="border:1.9px solid black;border-radius: 10px;">
															<label class="col-lg-12 col-form-label fw-bold fs-6 text-center">Sales</label>
															<table>
																<thead class="col-form-label fw-semibold fs-6">
																	<td class="col-lg-4">Type</td>
																	<td class="col-lg-4">Count</td>
																	<td class="col-lg-4">Wgt(gms)</td>
																	<td class="col-lg-4">Amount</td>
																</thead>
																<tbody class="col-form-label fw-bold fs-6">
																	<tr>
																		<td class="col-lg-4">Gold</td>
																		<td class="col-lg-4"><?php echo $sales_entry_list->sales_gold_count; ?></td>
																		<td class="col-lg-4"><?php echo $sales_entry_list->sales_gold_weight; ?></td>
																		<td class="col-lg-4"><?php echo $sales_entry_list->sales_gold_amount; ?></td>
																	</tr>
																	<tr>
																		<td class="col-lg-4">Silver</td>
																		<td class="col-lg-4"><?php echo $sales_entry_list->sales_silver_count; ?></td>	
																		<td class="col-lg-4"><?php echo $sales_entry_list->sales_silver_weight; ?></td>
																		<td class="col-lg-4"><?php echo $sales_entry_list->sales_silver_amount; ?></td>
																	</tr>
																</tbody>
															</table>
															<div class="col-lg-12 d-flex justify-content-center align-items-center mt-2">
																<label class="col-form-label fw-semibold fs-6">Total Amount &emsp;</label>
																<label class="col-form-label fw-bold fs-3"><?php echo $sales_entry_list->sales_amount; ?></td></label>
															</div>
														</div>
													</div>
													<div class="col-lg-6">
														<div class="px-4" style="border:1.9px solid black;border-radius: 10px;">
															<label class="col-lg-12 col-form-label fw-bold fs-6 text-center">Old Gold Exchange</label>
															<table>
																<thead class="col-form-label fw-semibold fs-6">
																	<td class="col-lg-4">Type</td>
																	<td class="col-lg-4">Count</td>
																	<td class="col-lg-4">Wgt(gms)</td>
																	<td class="col-lg-4">Amount</td>
																</thead>
																<tbody class="col-form-label fw-bold fs-6">
																	<tr>
																		<td class="col-lg-4">Gold</td>
																		<td class="col-lg-4"><?php echo $sales_entry_list->oge_gold_count; ?></td>
																		<td class="col-lg-4"><?php echo $sales_entry_list->oge_gold_weight; ?></td>
																		<td class="col-lg-4"><?php echo $sales_entry_list->oge_gold_amount; ?></td>
																	</tr>
																	<tr>
																		<td class="col-lg-4">Silver</td>
																		<td class="col-lg-4"><?php echo $sales_entry_list->oge_silver_count; ?></td>
																		<td class="col-lg-4"><?php echo $sales_entry_list->oge_silver_weight; ?></td>
																		<td class="col-lg-4"><?php echo $sales_entry_list->oge_silver_amount; ?></td>
																	</tr>
																</tbody>
															</table>
															<div class="col-lg-12 d-flex justify-content-center align-items-center mt-2">
																<label class="col-form-label fw-semibold fs-6">Total Amount &emsp;</label>
																<label class="col-form-label fw-bold fs-3"><?php echo $sales_entry_list->old_gold_amount; ?></label>
															</div>
														</div>
													</div>
												</div>
												<div class="d-flex justify-content-center">
													<label class="col-form-label fw-bold fs-1">Net Payable &emsp;- </label>
													<label class="col-form-label fw-bold fs-1">&emsp;<?php echo $sales_entry_list->net_payable; ?></label>
												</div>
												<div class="row">
												<label class="col-lg-2 col-form-label fw-semibold fs-6">Adjustment Discount</label>
												<div class="col-lg-2">
												<!--	<input type="text" class="form-control form-control-lg form-control-solid" placeholder="Amount" value="0" id="adj_discount" name="adj_discount" onkeyup="adj_dis()">-->
												<label class="col-form-label fw-bold fs-2" id="total_amount_ad" name="total_amount_ad"><?php echo $sales_entry_list->adjustment_discount; ?></label>
													<div class="fv-plugins-message-container invalid-feedback"></div>
												</div>
												<div class="col-lg-4 text-center">
													<label class="col-form-label fw-bold fs-2">Total Amount &emsp;</label>
													<label class="col-form-label fw-bold fs-2" id="total_amount_ad" name="total_amount_ad"><?php echo $sales_entry_list->net_payable-$sales_entry_list->adjustment_discount; ?></label>
												</div>
												
											</div>
												<div class="row">
													<label class="col-form-label fw-bold fs-5">Party Payment Details</label>
												<!--	<div class="col-lg-2 fv-row fv-plugins-icon-container fv-plugins-bootstrap5-row-invalid">
														<div class="d-flex align-items-center mt-1">
															<label class="form-check form-check-inline form-check-solid me-5 is-invalid">
																<input class="form-check-input" name="" checked disabled type="checkbox" value="1">
															</label>
															<label class="col-form-label fw-semibold fs-6 me-5">Cash</label>
														</div>
													</div>
													<div class="col-lg-2 fv-row fv-plugins-icon-container fv-plugins-bootstrap5-row-invalid">
														<div class="d-flex align-items-center mt-1">
															<label class="form-check form-check-inline form-check-solid me-5 is-invalid">
																<input class="form-check-input" name="" checked disabled type="checkbox" value="1">
															</label>
															<label class="col-form-label fw-semibold fs-6">Cheque</label>
														</div>
													</div>
													<div class="col-lg-2 fv-row fv-plugins-icon-container fv-plugins-bootstrap5-row-invalid">
														<div class="d-flex align-items-center mt-1">
															<label class="form-check form-check-inline form-check-solid me-5 is-invalid">
																<input class="form-check-input" name="" checked disabled type="checkbox" value="1">
															</label>
															<label class="col-form-label fw-semibold fs-6">RTGS</label>
														</div>
													</div>
													<div class="col-lg-2 fv-row fv-plugins-icon-container fv-plugins-bootstrap5-row-invalid">
														<div class="d-flex align-items-center mt-1">
															<label class="form-check form-check-inline form-check-solid me-5 is-invalid">
																<input class="form-check-input" name="" checked disabled type="checkbox" value="1">
															</label>
															<label class="col-form-label fw-semibold fs-6">UPI</label>
														</div>
													</div>
												</div>-->
												<?php if($sales_entry_list->cash_amt!=0){ ?>
												<div class="row">
													<label class="col-lg-1 col-form-label fw-semibold fs-6" id="cash_lt_ey_label">Cash</label>
													<label class="col-lg-2 col-form-label fw-bold fs-4"><?php echo $sales_entry_list->cash_amt; ?></label>
													<label class="col-lg-1 col-form-label fw-semibold fs-6" id="cheque_lt_ey_label">Details</label>
													<label class="col-lg-2 col-form-label fw-bold fs-4"><?php echo $sales_entry_list->cash_details; ?></label>
												</div>
												<?php } ?>
												<?php if($sales_entry_list->cheque_amt!=0){ ?>
												<div class="row">
													<label class="col-lg-1 col-form-label fw-semibold fs-6" id="cheque_lt_ey_label">Cheque</label>
													<label class="col-lg-2 col-form-label fw-bold fs-4"><?php echo $sales_entry_list->cheque_amt; ?></label>
													<label class="col-lg-1 col-form-label fw-semibold fs-6" id="bank_lt_ey_label">Bank</label>
													<label class="col-lg-2 col-form-label fw-bold fs-4"><?php echo $sales_entry_list->cheque_bank; ?></label>
													<label class="col-lg-1 col-form-label fw-semibold fs-6" id="cheque_lt_ey_label">Cheq no</label>
													<label class="col-lg-2 col-form-label fw-bold fs-4"><?php echo $sales_entry_list->cheque_no; ?></label>
													<label class="col-lg-1 col-form-label fw-semibold fs-6" id="cheque_lt_ey_label">Details</label>
													<label class="col-lg-2 col-form-label fw-bold fs-4"><?php echo $sales_entry_list->cheque_details; ?></label>
												</div>
												<?php } ?>
												<?php if($sales_entry_list->rtgs_amt!=0){ ?>
												<div class="row">
													<label class="col-lg-1 col-form-label fw-semibold fs-6" id="rtgs_lt_ey_label">RTGS</label>
													<label class="col-lg-2 col-form-label fw-bold fs-4"><?php echo $sales_entry_list->rtgs_amt; ?></label>
													<label class="col-lg-1 col-form-label fw-semibold fs-6" id="bank_lt_ey_label">Bank</label>
													<label class="col-lg-2 col-form-label fw-bold fs-4"><?php echo $sales_entry_list->rtgs_bank; ?></label>
													<label class="col-lg-1 col-form-label fw-semibold fs-6" id="bank_lt_ey_label">RTGS No</label>
													<label class="col-lg-2 col-form-label fw-bold fs-4"><?php echo $sales_entry_list->rtgs_no; ?></label>
													<label class="col-lg-1 col-form-label fw-semibold fs-6" id="">Details</label>
													<label class="col-lg-2 col-form-label fw-bold fs-4"><?php echo $sales_entry_list->rtgs_details; ?></label>
												</div>
												<?php } ?>
												<?php if($sales_entry_list->upi_amt!=0){ ?>
												<div class="row">
													<label class="col-lg-1 col-form-label fw-semibold fs-6" id="">UPI</label>
													<label class="col-lg-2 col-form-label fw-bold fs-4"><?php echo $sales_entry_list->upi_amt; ?></label>
													<label class="col-lg-1 col-form-label fw-semibold fs-6" id="">Trans No</label>
													<label class="col-lg-2 col-form-label fw-bold fs-4"><?php echo $sales_entry_list->upi_trans_no; ?></label>
													<label class="col-lg-1 col-form-label fw-semibold fs-6" id="">Details</label>
													<label class="col-lg-2 col-form-label fw-bold fs-4"><?php echo $sales_entry_list->upi_details; ?></label>
												</div>
												<?php } ?>
												<div class="row">
													<label class="col-lg-1 col-form-label fw-semibold fs-6">Net Payable</label>
													<label class="col-lg-2 col-form-label fw-bold fs-3"  title="Total Amount">
														<i class="fa-solid fa-indian-rupee-sign fs-4 text-dark"></i>&nbsp;
														<?php $tot_amt= $sales_entry_list->net_payable-$sales_entry_list->adjustment_discount; echo number_format($tot_amt,2,'.',',');?>
													</label>
													<!-- <label class="col-lg-2 col-form-label fw-bold fs-2"></label> -->
													<label class="col-lg-1 col-form-label fw-semibold fs-6">Paid Amount</label>
													<label class="col-lg-2 col-form-label fw-bold fs-3"  title="Total Amount">
														<i class="fa-solid fa-indian-rupee-sign fs-4 text-dark"></i>&nbsp;
														<?php $tot_amt2= $sales_entry_list->paid_amount; echo number_format($tot_amt2,2,'.',',');?>
													</label>
													<label class="col-lg-1 col-form-label fw-semibold fs-6">Balance Amount</label>
													<label class="col-lg-2 col-form-label fw-bold fs-3"  title="Total Amount">
														<i class="fa-solid fa-indian-rupee-sign fs-4 text-dark"></i>&nbsp;
														<?php $tot_amt3= $sales_entry_list->balance_amount; echo number_format($tot_amt3,2,'.',',');?>
													</label>
													<div class="col-lg-3">
														<label class="form-check form-check-inline form-check-solid is-invalid py-5">
															<input class="form-check-input" name="" checked type="checkbox" id="" disabled>
															<span class="col-form-label fw-semibold fs-6">Add Balance to Credit</span>
														</label>
													</div>
												</div>
											<!--end::Table-->
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
		<?php $this->load->view("script");?>
		<!-- <script src="js/products-list.js"></script> -->
		<script>
			$("#view_salesentry_table").DataTable({
				//"aaSorting":[],
				"sorting":false,
				"paging": false,
				// "responsive": true,
				 "language": {
				  "lengthMenu": "Show _MENU_",
				 },
				 "dom":
				  "<'row'" +
				  "<'col-sm-6 d-flex align-items-center justify-conten-start'l>" +
				  ">" +

				  "<'table-responsive'tr>" +

				  "<'row'" +
				  "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
				  "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
				  ">"
				});
			$('#view_salesentry_table').wrap('<div class="dataTables_scroll" />');
		</script>
		<script>
	      $("#view_salesentry_table").kendoTooltip({
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
	      });
	      $("#view_nontagged_entry_table").kendoTooltip({
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
			$("#view_nontagged_entry_table").DataTable({
				//"aaSorting":[],
				"sorting":false,
				"paging": false,
				// "responsive": true,
				 "language": {
				  "lengthMenu": "Show _MENU_",
				 },
				 "dom":
				  "<'row'" +
				  "<'col-sm-6 d-flex align-items-center justify-conten-start'l>" +
				  ">" +

				  "<'table-responsive'tr>" +

				  "<'row'" +
				  "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
				  "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
				  ">"
				});
			$('#view_oldjewel_entry_table').wrap('<div class="dataTables_scroll" />');
		</script>

		<script>
			$("#view_puregold_entry_table").DataTable({
				//"aaSorting":[],
				"sorting":false,
				"paging": false,
				// "responsive": true,
				 "language": {
				  "lengthMenu": "Show _MENU_",
				 },
				 "dom":
				  "<'row'" +
				  "<'col-sm-6 d-flex align-items-center justify-conten-start'l>" +
				  ">" +

				  "<'table-responsive'tr>" +

				  "<'row'" +
				  "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
				  "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
				  ">"
				});
			$('#view_puregold_entry_table').wrap('<div class="dataTables_scroll" />');
		</script>
	</body>
	<!--end::Body-->
</html>