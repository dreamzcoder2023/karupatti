<html>
    <head>

        <title>AKS - AYYANAR KARUPPATI SAYALKUDI</title>
        <link rel="shortcut icon" href="<?php echo base_url();?>assets/images/aks_logo.png" />
        
        <style>


            body{
                font-family: Calibri;
                font-size: 14px;
            }
            p{
                margin: 0px !important;
            }
            .ft_wgt{
                font-weight: 600;
            }
            /*table{border-collapse: collapse;width: 100%; border: 1px solid #d9d9d9;}*/
            table{
                border-collapse: collapse; width: 100%;
            }
            table tr,td,th{
                border: 1px solid black;
                border-top: 200px;
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
                font-size: 14px;
            }
            #amt_word{
                font-family: Calibri;
                font-size: 14px;
            }
            #decl{
                font-family: Calibri;
                font-size: 16px;
            }
            #particular{
                font-family: Calibri;
                font-size: 14px;
                height: 100px !important;
            }
            #base td{
                border: 1px solid black;
            }
            #base tr{
                height: 20px;
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
                height: 40px;
            }
            #charges td{
                width:11px;
            }
            #amt_word tr{
                height: 40px;
            }
            #decl tr{
                height: 40px;
            }
            #decl td{
                width: 350px;
            }
            #particular tr{
                height: 13px;

            }
            #particular td{
                height: 13px !important;
            }
            #particular tbody{
                height: 50px !important;
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
            .invoice {
                min-height: 1000px;
            }
            @media print {
              .invoice {
                page-break-after: always;
              }
            }


        </style>
    </head>
    <?php if (isset($print_list)) { ?>
        <?php foreach ($print_list as $prc => $val) { ?> 
            <?php 
            $print  = 1; ?>
                <?php if ($print) { ?>                  


                <center class="invoice">
                    <div style="height:566px; width: 797px;font-family: calibri !important;padding: 5px !important;padding-right: 10px !important;">
                        
                            <body>
                                <table id="base">
                                     <?php $sale_print = $this->db->query("SELECT * FROM AKS_SALE_ENTRY WHERE sale_id='".$val."' ")->result_array(); ?>
                                    <?php  foreach($sale_print as $i=> $sprint){  ?>

                                        <?php  $party_detail  = $this->db->query("SELECT * FROM PARTIES WHERE PID ='".$sprint['id_party']."' ")->row();  ?>


                                        <?php if(isset($party_detail)){ if($party_detail->TYPE_OF_RECORD=='O'){
                                                $CITY=  ($party_detail->CITY=='')?'--':$party_detail->CITY;
                                                }
                                                else
                                                {
                                                    $area_det=$this->db->query("SELECT * FROM CITY WHERE CITYID='".$party_detail->CITY_ID."'")->row();
                                                    $CITY=  $area_det?$area_det->CITYNAME:'';
                                                }
                                                if($party_detail->TYPE_OF_RECORD=='O'){
                                                     $ADDRESS2=($party_detail->ADDRESS2=='')?'--':$party_detail->ADDRESS2;
                                                }
                                                else
                                                {
                                                    $area_det =$this->db->query("SELECT * FROM VILLAGE WHERE VILLAGEID='".$party_detail->VILLAGE_ID."'")->row();
                                                    $ADDRESS2 = $area_det?$area_det->VILLAGENAME:'';
                                                }

                                                if($party_detail->TYPE_OF_RECORD=='O'){
                                                     $ADDRESS1 = ($party_detail->ADDRESS1=='')?'--':$party_detail->ADDRESS1;
                                                }
                                                else
                                                {
                                                    $area_det=$this->db->query("SELECT * FROM STREET WHERE STREETID='".$party_detail->STREET_ID."'")->row();
                                                    $ADDRESS1 =  $area_det?$area_det->STREETNAME:'';
                                                }
                                                $shiping_data  = $this->db->query("SELECT * FROM AKS_SHIPPING_ADDRESS WHERE party_id ='".$sprint['id_party']."' ")->row();

                                                if (isset($shiping_data)) {

                                                   $address = $shiping_data->address.', '.$shiping_data->city.', '.$shiping_data->state.' - '.$shiping_data->pincode; 
                                                }
                                                else{
                                                    $address = $ADDRESS1.', '.$ADDRESS2.', '.$CITY; 
                                                }   
                                            }
                                        ?>

                                    <tr>
                                         <?php 
                                                $company_info = company_info('003');
                                            ?>
                                            <td style="width: 1%;" rowspan="2">
                                                <?php echo $company_info->COMPANY_LOGO; ?>
                                            </td>
                                            
                                            <td style="padding-left:5px;width: 50%;padding-bottom: 15px;">
                                                <p style="font-weight:bold;font-size: 16px;"><?php echo $company_info?$company_info->COMPANYNAME:'AKS AYYANAR KARUPATI SAYALKUDI'; ?></p>
                                                <p style="font-size: 12px;"><?php echo $company_info?$company_info->ADDRESS1.',':'-'; ?></p>
                                                <p style="font-size: 12px;"><?php echo $company_info?$company_info->ADDRESS2.',':'-'; ?></p>

                                                <p style="font-size: 12px;">
                                                    <?php echo $company_info?$company_info->CITY.' - ':'-'; ?>
                                                    <?php echo $company_info?$company_info->PINCODE.',':'-'; ?>
                                                </p>
                                                <p style="font-size: 12px;">
                                                    <span style="float:left;"><?php echo $company_info?$company_info->STATE.'.':'-'; ?></span>
                                                    <span style="display: flex !important;align-items: center !important;justify-content: flex-end !important;padding-right: 10px;">St.Code &nbsp; : 33</span>
                                                </p>
                                                <p style="font-weight: bold;font-size: 12px;">
                                                    <span>PH &nbsp;</span>
                                                    <span><?php echo $company_info?$company_info->PHONE:'-'; ?></span>
                                                </p>
                                            </td>
                                        <td style="width: 50%;padding-top: 0px;">

                                            <p style="font-weight: bold; font-size: 16px; text-align: center;"><?php echo ucfirst($sprint['sale_deliverymode']); ?>
                                                <?php if ($sprint['delivery_by']!='') {  echo ' - '.$sprint['delivery_by']; }?></p>
                                            <p style="font-weight: bold; font-size: 16px;">Billed To</p>
                                            <p style="font-size:    14px;padding-left: 30px; font-weight: bold;"><?php echo $party_detail?$party_detail->NAME:'';?> <?php echo $party_detail?$party_detail->FATHERSNAME:'';?></p>
                                            <?php if ($sprint['sale_deliverymode']=='Direct') {?>

                                            <p style="padding-left: 30px;font-size: 13px;"></p>
                                            <p style="padding-left: 30px;font-size: 12px;"> &nbsp;</p>
                                            <p style="padding-left: 30px;font-size: 2px;"> &nbsp;</p>
                                            <p style="padding-left: 30px;font-size: 12px;"> &nbsp;</p>
                                            <p style="padding-left: 30px;">
                                                 
                                            <?php }else{?>

                                            <p style="padding-left: 30px;font-size: 13px;"><?php echo isset($address) ? $address?$address:'' :'';?></p>
                                            <p style="padding-left: 30px;font-size: 12px;"> &nbsp;</p>
                                            <p style="padding-left: 30px;font-size: 2px;"> &nbsp;</p>
                                            <p style="padding-left: 30px;font-size: 12px;"> &nbsp;</p>
                                            <p style="padding-left: 30px;">

                                            <?php } ?>
                                            
                                                <label style="float:left;font-size: 12px;">
                                                    <span>GSTIN &nbsp; - </span>
                                                    <span><?php echo $party_detail?$party_detail->GST_NO:''; ?></span>
                                                </label>
                                                <label style="float:right; padding-right: 10px;">
                                                    <span style="font-weight:bold;font-size: 12px;">PH &nbsp; - </span>
                                                    <span style="font-weight:bold;font-size: 12px;"><?php echo $party_detail?$party_detail->PHONE:''; ?></span>
                                                </label>
                                            </p>
                                        </td>
                                    </tr>
                                    
                                    <tr>
                                        <td style="width:50%;height: 15px;">
                                            <p style="padding-left: 5px; font-weight: bold;font-size: 14px; height: 20px;">
                                                <span>Invoice No &nbsp;- &nbsp;</span>
                                                <span><?php echo $sprint['sale_id'];?></span>
                                            </p>
                                        </td>
                                        <td colspan="2" style="width:50%;">
                                            <p style="padding-left: 30px;font-weight: bold;font-size: 14px;">
                                                <span>Date &nbsp; </span>
                                                <!-- $saledate=date('Y-m-d',strtotime($data['sale_date'])); -->
                                                <span>
                                                    <?php $date_format  = $this->db->query("SELECT * FROM general_settings ")->row();
                                                         $format= $date_format->date_format;
                                                         echo date("$format", strtotime($sprint['sale_date']));
                                                    ?>                                            
                                                </span>
                                            </p>
                                        </td>
                                    </tr>
                                    <?php $i++; }?>
                                </table>
                                <table id="particular">
                                    <thead>
                                        <th style="width:5px;   height: 22px;  border-top-style: hidden;">S.No</th>
                                        <th style="width:280px; height: 22px;  border-top-style: hidden;">Particulars</th>
                                        <th style="width:150px; height: 22px;  border-top-style: hidden;" colspan="2">HSN Code</th>
                                        <th style="width:110px; height: 22px;  border-top-style: hidden;">Rate/Kg</th>
                                        <th style="width:100px; height: 22px;  border-top-style: hidden;">Qty/Kg</th>
                                        <th style="width:130px; height: 22px;  border-top-style: hidden;">Amount</th>
                                    </thead>

                                    <tbody style="font-size:14px !important;">

                                        <?php

                                        $print_cart_view  = $this->db->query("SELECT * FROM AKS_SALE_CART WHERE sale_id  = '".$val."' AND status=0 ")->result_array();

                                         $i=0; $wgtss=0; $count=0; $total_amount_sum=0; foreach($print_cart_view as  $cprint){ 
                                            $count = count($cprint);?>

                                            <?php  $prdname  = $this->db->query("SELECT * FROM AKS_PRD_MASTER WHERE AKS_PRD_MID ='".$cprint['product_id']."' ")->row();?>
                                           <?php 

                                                $wgtss += $cprint['product_wgt']; 
                                                $total_amount_sum += $cprint['price']; 



                                           ?>                       
                                        <tr >
                                            <td style="text-align:center;border-bottom-style: hidden; "><?php echo $i+1; ?></td>
                                            <td style="text-align:start;border-bottom-style: hidden;"><?php echo $prdname->AKS_PRD_NAME; ?></td>
                                            <td style="text-align:center;border-bottom-style: hidden;" colspan ="2"><?php echo $cprint['HSN_CODE']; ?></td>
                                            <td style="text-align: center;border-bottom-style: hidden;"><?php echo $cprint['sale_price']; ?> / <?php  
                                                $grams = floatval($prdname->AKS_PRD_WT?$prdname->AKS_PRD_WT:0);
                                                $kilograms = $grams / 1000;
                                                 echo $kilograms.' Kg'; ?></td>
                                            <td style="text-align:center;border-bottom-style: hidden;"><?php 

                                                $order_grams = floatval($cprint['product_wgt']?$cprint['product_wgt']:0);
                                                $order_kilograms = $order_grams / 1000;
                                                 echo $order_kilograms.' Kg'; 
                                             ?></td>
                                            <td style="text-align:center; border-bottom-style: hidden;"><?php echo number_format($cprint['price'],2,'.',',');  ?></td> 
                                           
                                        </tr>                            

                                        <?php $i++; }?>

                                         <?php
                                        $counts =  35-$count;

                                         $i=0; for($j=$i-1;$j<$counts;$j++){ ?>
                                            <tr style="border-top-style: hidden;" >
                                                <td></td>
                                                <td></td>
                                                <td colspan ="2"></td>
                                                <td></td>
                                                <td></td>
                                                <td ></td>
                                            </tr >
                                        <?php  } ?>
                                        <tr style="border-top-style: hidden;" >
                                                <td></td>
                                                <td></td>
                                                <td colspan ="2"></td>
                                                <td></td>
                                                <td></td>
                                                <td ></td>
                                            </tr>
                                    </tbody>
                                   
                                    
                                   <!--   <tfoot>
                                        <tr>
                                            <td class="ft_wgt" colspan="6" style="text-align: right;"><h4>Total Amount&emsp;</h4></td>              -->                 
                                          
                                          
                                            <!-- <td class="ft_wgt" style="text-align:center;"> -->

                                                <?php $grand_total = floatval($total_amount_sum)+floatval($sprint['shipment_charges']?$sprint['shipment_charges']:0)-floatval($sprint['sale_dis_amt']?$sprint['sale_dis_amt']:0); //echo number_format($grand_total,2,'.',','); ?></td>
                                        <!-- </tr>
                                    </tfoot> -->

                                    <tfoot>

                                        <tr>
                                            <td class="ft_wgt" colspan="5" style="text-align: right;"><h4>Total&emsp;</h4></td>                             
                                            <td class="ft_wgt" style="text-align:center;">
                                                <?php 
                                                $tot_grams = floatval($wgtss?$wgtss:0);
                                                $tot_kilograms = $tot_grams / 1000;
                                                 echo $tot_kilograms.' Kg';?></td>
                                            <td class="ft_wgt" style="text-align:center;"><?php echo number_format($total_amount_sum,2,'.',','); ?></td>
                                        </tr>
                                    </tfoot>
                                     <tfoot>
                                        <tr>
                                            <td class="ft_wgt" colspan="6" style="text-align: right;"><h4>Delivery Charges (+)&emsp;</h4></td>                              
                                          
                                          
                                            <td class="ft_wgt" style="text-align:center;"><?php echo number_format($sprint['shipment_charges'],2,'.',','); ?></td>
                                        </tr>
                                    </tfoot>
                                   <tfoot>
                                        <tr>
                                            <td class="ft_wgt" colspan="6" style="text-align: right;"><h4>Discount (-)&emsp;</h4></td>
                                           
                                          
                                          
                                            <td class="ft_wgt" style="text-align:center;"><?php echo number_format($sprint['sale_dis_amt'],2,'.',','); ?></td>
                                        </tr>
                                    </tfoot>
                                   
                                </table>

                                <table id="charges">
                                    <tr style="">
                                        <td class="ft_wgt" style="border-top-style: hidden;text-align: center;font-weight:bold !important;" rowspan="2"><span>No of Item</span></td>
                                        <td class="ft_wgt" style="width: 80px;border-top-style: hidden;text-align: center;font-weight:bold !important;" rowspan="2"><span>Taxable Values</span></td>
                                        <td class="ft_wgt" style="border-top-style: hidden;text-align: center;font-weight:bold !important;" colspan="2"><span>CGST</span></td>
                                        <td class="ft_wgt" style="border-top-style: hidden;text-align: center;font-weight:bold !important;" colspan="2"><span>SGST</span></td>
                                        <td class="ft_wgt" style="border-top-style: hidden;text-align: center;font-weight:bold !important;" colspan="2"><span>IGST</span></td>
                                        <td class="ft_wgt" style="width: 100px; border-top-style: hidden;text-align: center;font-weight:bold !important;" rowspan="2"><span>Grand Amount</span></td>
                                    </tr>
                                    <tr>
                                        <td class="ft_wgt" style="text-align: center;font-weight:bold !important;"><span>Percent(%)</span></td>
                                        <td class="ft_wgt" style="text-align: center;font-weight:bold !important;"><span>Amount</span></td>

                                        <td class="ft_wgt" style="text-align: center;font-weight:bold !important;"><span>Percent(%)</span></td>
                                        <td class="ft_wgt" style="text-align: center;font-weight:bold !important;"><span>Amount</span></td>

                                        <td class="ft_wgt" style="text-align: center;font-weight:bold !important;"><span>Percent(%)</span></td>
                                        <td class="ft_wgt" style="text-align: center;font-weight:bold !important;"><span>Amount</span></td>
                                    </tr>
                                    <tr>
                                         <?php 
                                         // GST Amount = Original Cost – (Original Cost * (100 / (100 + GST% ) ) )
                                            $price  = $grand_total; 
                                            $gst_percent = 5;
                                            $cal = (floatval($price) * (100 / (100 + $gst_percent)));
                                            $gtotal  = floatval($price) - $cal;
                                            $taxable = floatval($price) - $gtotal;
                                            $gst    = 2.5;
                                            $cgst   = $gtotal / 2;
                                            $sgst   = $gtotal / 2;

                                        ?>
                                        <td style="text-align:center;"><?php echo $sprint['sale_prd_count']; ?></td>
                                        <td style="text-align:center;"><?php echo number_format($taxable,2,'.',','); ?></td>
                                        <td style="text-align:center;">2.5</td>
                                        <td style="text-align:center;"><?php echo number_format($cgst,2,'.',','); ?></td>
                                        <td style="text-align:center;">2.5</td>
                                        <td style="text-align:center;"><?php echo number_format($cgst,2,'.',','); ?></td>
                                        <td style="text-align:center;">0</td>
                                        <td style="text-align:center;">0</td>
                                        <td style="text-align:center;"><?php echo number_format($grand_total,2,'.',','); ?></td>
                                    </tr>
                                </table>
                                <table id="amt_word">
                                    <tr>
                                        <td style="border-top-style: hidden;padding-left:5px;"><span class="ft_wgt">Amount In Words</span> <label> &emsp;<?php echo amt_to_words($gtotal); ?></label></td>
                                    </tr>
                                </table>
                                <table id="">
                                    <tr>
                                        <td style="border-top-style: hidden;padding-left:5px;"><span class="ft_wgt">Remarks </span> <label> &emsp;
                                            <?php 

                                            $remark = $sprint['remarks'] ? $sprint['remarks']:'-';
                                            if (strlen($remark) > 100) {
                                            $remarkstr = substr($remark, 0, 100) ."...";
                                            }else{ $remarkstr = $remark; }   

                                         echo $remarkstr; ?></label></td>
                                    </tr>
                                </table>
                                <table id="decl">
                                    <tbody>
                                    <tr>
                                        <td class="ft_wgt" style="border-top-style: hidden; border-right-style: hidden; border-bottom-style: hidden; padding-left:5px;font-size: 14px;font-weight: 600 !important;">
                                            <span>TERMS & CONDITIONS</span>
                                        </td>
                                    </tr>
                                    <tr>
                                       
                                        <td style="border-top-style: hidden;  padding-left:5px;font-size: 13px;" colspan="2">
                                            <p>1. Goods once sold will not be taken back.</p>
                                            <p>2. Order should be minimum of two kg.</p>
                                            <p>3.The Shipment Discount and Product Discount is Valid for the Particular season Only and will not last after season</p>
                                            <p>4.We are Available Only in Ayyanar karuppati Sayalkudi Website and the whatsapp,Facebook, We are not available in any other Social Platform</p>
                                            
                                        </td>


                                    </tr>
                                </tbody>
                                <tfoot>
                                    <td style="border-top-style: hidden; border-right-style: hidden; padding-left: 15px; padding-bottom: 15px;">
                                        <span>
                                            <img src="" id="barcode<?php echo $prc; ?>" height="38" width="250">
                                        </span>                                    
                                    </td>
                                    <td style="border-top-style: hidden;text-align: right;padding-top: 25px;">
                                         <h4>Authorized Signature&emsp;</h4>
                                     </td>
                                </tfoot>
                                </table>
                            </body>                
                        </html>

                    </div>
                </center>

                <!-- <script src="https://cdn.jsdelivr.net/jsbarcode/3.6.0/JsBarcode.all.min.js"></script> -->
                <script src="<?php echo base_url();?>assets/custom_js/barcode.js"></script>
                <script>
                        // JsBarcode("#barcode", "<?php echo $sprint['sale_id']; ?>");
                        JsBarcode("#barcode<?php echo $prc; ?>", "<?php echo $sprint['sale_id']; ?>", {
                              displayValue: false
                            });
                </script>

                    
            
                <?php } ?>
    <?php } } ?>

<script type="text/javascript">
    printContent()
    function printContent() {
      window.print();

    }
</script>

