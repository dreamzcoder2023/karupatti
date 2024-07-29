    <head>

        <title>AKS - AYYANAR KARUPPATI SAYALKUDI</title>
        <link rel="shortcut icon" href="<?php echo base_url();?>assets/images/aks_logo.png" />
    </head>
        
        <center>
            <div style="height:570px;width: 381px;font-family: calibri;">
                <table width="100%"  style="padding: 5px;padding-top: 5px !important;padding-bottom: 0px !important;padding-left: 0px !important;line-height: 1.5rem !important;">
                    <thead>
                          <?php  foreach($sale_pos as $i=> $spos){ 

                            $date=date('d-m-Y',strtotime($spos['sale_date']));

                            ?>
                             <?php  $party_detail  = $this->db->query("SELECT * FROM PARTIES WHERE PID ='".$spos['id_party']."' ")->row();  ?>
                        <tr>
                            <th colspan="2">
                                <span style="font-size: 24px; font-weight: bold;float: left !important;padding-bottom: 5px !important;padding-top: 5px !important;">Sender Details</span>
                                <span style="font-size: 18px; font-weight: bold;float: right !important;padding-bottom: 5px !important;padding-top: 5px !important;"> <?php $date_format  = $this->db->query("SELECT * FROM general_settings ")->row();
                                             $format= $date_format->date_format;
                                             echo date("$format", strtotime($spos['sale_date']));
                                             ?></span>
                            </th>
                        </tr>
                        <tr>
                            <?php 
                                $company_info = company_info('003');
                            ?>
                            <th rowspan="3">
                                <?php echo $company_info->COMPANY_LOGO; ?>
                                
                            </th>
                            <th rowspan="3" style="font-size: 17px !important; ">

                                <span style="float: left !important;font-size: 17px !important;font-weight: bolder;"><?php echo $company_info?$company_info->COMPANYNAME:''; ?>
                                </span>
                                <br>
                                <span style="float: left !important;">
                                    <?php echo $company_info?$company_info->ADDRESS1.',':'-'; ?>
                                    <?php echo $company_info?$company_info->ADDRESS2.',':'-'; ?>
                                </span>
                                    <br>
                                <span style="float: left !important;">
                                     <?php echo $company_info?$company_info->CITY.' - ':'-'; ?>
                                     <?php echo $company_info?$company_info->PINCODE.',':'-'; ?>
                                </span>
                                <br>
                                <span style="float: left !important;">Ph : <?php echo $company_info?$company_info->PHONE.',':'-'; ?></span>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr><td colspan="2"><hr style="border-top: 1px dashed;"></td></tr>
                        <tr>


                            <td colspan="2">
                                <span style="font-size: 24px; font-weight: bold;float: left !important;padding-bottom: 5px !important;">To:-</span>

                                <span style="font-size: 18px; font-weight: bold;float: right !important;padding-bottom: 5px !important;padding-top: 5px !important;"> <?php echo $spos['sale_id']; ?></span>
                            </td>
                        </tr>
                      
                              
                        <tr>
                        	

                            <td colspan="2" style="font-size: 20px !important;">
                                
                                <div style="">
                                    <label style="text-align-last: start;  font-weight: bold;border-bottom: 1px solid black;">
                                        <span>Name</span>
                                        <span style="text-align-last:end !important;">&emsp;&emsp;:</span>
                                    </label>
                                    <label style="padding-left:12px !important;  font-weight: bold;border-bottom: 1px solid black;"><?php echo ucfirst($spos['sale_party']?$spos['sale_party']:'');?></label>
                                </div>
                                
                            </td>
                        </tr>
                        <tr>
                             <td colspan="2" style="font-size: 20px !important;">
                                    <!-- <span style="border-bottom: 1px solid black;font-weight: bold;">Address&emsp;&nbsp;&nbsp;:</span> -->
                           <!--  </td>
                            <td style="font-size: 20px !important;padding-left:0px !important; "> -->

                                <label style="padding-left:12px !important; font-weight: bold;">
                                    <?php
                                     $shipping = $this->db->query("SELECT * FROM AKS_SHIPPING_ADDRESS WHERE party_id='" . $party_detail->PID . "'")->row();
        
                                    if ($shipping) {
                                        $ship_add = $shipping->address ? $shipping->address . ', ' : '--';
                                        $ship_cty = $shipping->city ? $shipping->city . ' - ' : '--';
                                        $ship_pin = $shipping->pincode ? $shipping->pincode : '--';
                                       echo $shipment_address = $ship_add . $ship_cty . $ship_pin;
                                    } else {?>

                                         <?php echo $party_detail?$party_detail->ADDRESS1.' ,':'';?>

                                        <?php if(isset($party_detail->STATE)){ ?>
                                        
                                            <span style="padding-left:0px;"><?php echo $party_detail->CITY?$party_detail->CITY.' ,':''; ?></span>
                                            <?php } ?>
                                            <?php if(isset($party_detail->STATE)){ ?>
                                            
                                            <span style="text-align: justify;padding-left:0px;"><?php echo $party_detail->STATE.' - '.$party_detail->PINCODE; ?></span>
                                            <?php } ?>
                                            <?php if(isset($party_detail->COUNTRY)){ ?>
                                            <span style="padding-left:0px;"><?php echo $party_detail->COUNTRY.'.'; ?></span>
                                            <?php } ?>
                                   <?php } ?>


                               

                                </label>	                             
	                                
                            </td>
                        </tr>
                         <tr>
                            <td style="font-size: 20px !important; width: 110px !important;">
                                    <span style="border-bottom: 1px solid black;font-weight: bold;">Landmark&nbsp;&nbsp;&nbsp;:</span>
                            </td>
                            <td style="font-size: 20px !important;">
                                <span><?php  if(isset($party_detail)){ echo $party_detail->LANDMARK?$party_detail->LANDMARK:'-'; } ?></span>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" style="font-size: 20px !important;">
                                <label style="text-align-last: start;">
                                    <span style="border-bottom: 1px solid black;font-weight: bold;">Mobile&emsp;&nbsp;&nbsp;&nbsp;:</span>
                                </label>
                                <label style="padding-left:10px !important;">
                                    <span><?php echo $party_detail?$party_detail->PHONE:''; ?>&nbsp;<?php  if(isset($party_detail)){ echo $party_detail->PHONE2?','.$party_detail->PHONE2:''; } ?></span>
                                </label>
                            </td>
                        </tr>
                        <!-- <tr>
                            <td colspan="2" style="font-size: 20px !important;">
                                <label style="text-align-last: start;">
                                    <span>Gmail</span>&emsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <span style="text-align-last:end !important;"> :</span>
                                </label>
                                <label style="padding-left:10px !important;">
                                    <span>< ?php echo $party_detail?$party_detail->EMAIL:''; ?>&nbsp;</span>
                                </label>
                            </td>
                        </tr> -->
                        <tr><td colspan="2"><hr style="border-top: 1px dashed;"></td></tr>
                        <?php $i++; }?>
                    </tbody>
                </table>
                <div style="padding: 10px !important;padding-top: 0px !important;">
                    <table id="tab" width="100%"  style="line-height: 1.5rem !important;">
                        
                        <thead>
                            <tr>
                                <th>
                                    <span style="font-size: 24px; font-weight: bold;float: left !important;">Product Details</span>
                                    <span style="font-size: 15px; font-weight: bold;float: right !important;padding-bottom: 0px !important;padding-top: 5px !important;border-bottom: 1px solid black;"> <?php echo ucfirst($spos['delivery_by']?$spos['delivery_by']:''); ?></span>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $i=0; $wgtss=0; $prd_count=count($print_cart_view_pos);  foreach($print_cart_view_pos as   $cpos){ 

                                $wgtss += $cpos['product_wgt'];
                                $tracking_id=$cpos['tracking_id']; $i++; } 
                            ?>
                            <tr>
                                <td colspan="2" style="font-size: 19px;">
                                    <label style="text-align-last: start;">
                                        <span>Total No of Product</span>
                                        <span style="text-align-last:end !important;"> :</span>
                                    </label>
                                    <label>
                                        <span>&nbsp;<?php echo $prd_count;?></span>
                                        <span>&nbsp;/&nbsp;</span>
                                        <span><?php echo $wgtss; ?></span>
                                        <span>gms</span>
                                    </label>
                                </td>
                            </tr>
                        </tbody>
                 
                    </table>
                    <img src="" id="barcode" height="50" width="250" style="padding-right: 50px;padding-top: 5px;">
                </div>
            </div>
        </center>
        <!-- <script src="https://cdn.jsdelivr.net/jsbarcode/3.6.0/JsBarcode.all.min.js"></script> -->
        <script src="<?php echo base_url();?>assets/custom_js/barcode.js"></script>
        <script>

            // JsBarcode("#barcode", "<?php echo $spos['sale_id']; ?>");
            JsBarcode("#barcode", "<?php echo $spos['sale_id']; ?>", {
                  displayValue: false
                });
        </script>
         <script type="text/javascript">
            printContent()
            function printContent() {
              window.print();
            }

        </script>    
            
