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
   <center class="invoice">
        <div style="height:566px;width: 797px;font-family: calibri !important;padding: 5px !important;padding-right: 10px !important;">
            
                <body>
                    <table id="base">
                        <?php  foreach($sale_print as $i=> $sprint){ ?>



                            <?php 
                            if ($sprint['party_type']=='party') { 

                                $party_detail  = $this->db->query("SELECT * FROM PARTIES WHERE PID ='".$sprint['id_party']."' ")->row();

                                $party_name = $party_detail->NAME;
                                $father_name = $party_detail->NAME;
                                $phone      = $party_detail->PHONE;
                                $gst_no     = $party_detail->GST_NO;

                                 if($party_detail->TYPE_OF_RECORD=='O'){
                                    $CITY=  ($party_detail->CITY=='')?'--':$party_detail->CITY;
                                    }
                                    else
                                    {
                                        $area_det=$this->db->query("select * from CITY where CITYID='".$party_detail->CITY_ID."'")->row();
                                        $CITY=  $area_det->CITYNAME;
                                    }
                                    if($party_detail->TYPE_OF_RECORD=='O'){
                                         $ADDRESS2=($party_detail->ADDRESS2=='')?'--':$party_detail->ADDRESS2;
                                    }
                                    else
                                    {
                                        $area_det =$this->db->query("select * from VILLAGE where VILLAGEID='".$party_detail->VILLAGE_ID."'")->row();
                                        $ADDRESS2 = $area_det->VILLAGENAME;
                                    }

                                    if($party_detail->TYPE_OF_RECORD=='O'){
                                         $ADDRESS1 = ($party_detail->ADDRESS1=='')?'--':$party_detail->ADDRESS1;
                                    }
                                    else
                                    {
                                        $area_det=$this->db->query("select * from STREET where STREETID='".$party_detail->STREET_ID."'")->row();
                                        $ADDRESS1 =  $area_det->STREETNAME;
                                    }
                                    $shiping_data  = $this->db->query("SELECT * FROM AKS_SHIPPING_ADDRESS WHERE party_id ='".$sprint['id_party']."' ")->row();

                                    if (isset($shiping_data)) {

                                       $address = $shiping_data->address.', '.$shiping_data->city.', '.$shiping_data->state.' - '.$shiping_data->pincode; 
                                    }
                                    else{
                                        $address = $ADDRESS1.', '.$ADDRESS2.', '.$CITY; 
                                    }   
                                }else if($sprint['party_type']=='supplier'){

                                    $party_detail = $this->Akssalequotation_model->get_sale_sup_view($sprint['id_party']);

                                      $party_name = $party_detail->LEDGER_NAME?$party_detail->LEDGER_NAME:'-';
                                      $father_name  = $party_detail->LASTNAME?$party_detail->LASTNAME:'';
                                      $address1  = $party_detail->ADDRESS?$party_detail->ADDRESS:'';
                                      $address2  = $party_detail->ADDRESS2?$party_detail->ADDRESS2:'';
                                      $city      = $party_detail->CITY?$party_detail->CITY:'';
                                      $state     = $party_detail->STATE?$party_detail->STATE:'';
                                      $phone     = $party_detail->PHONE?$party_detail->PHONE:'';
                                      $email     = $party_detail->EMAIL?$party_detail->EMAIL:'';
                                      $gst_no    = $party_detail->GST_NO?$party_detail->GST_NO:'';
                                      $address   = $address1.$address2.' ,'.$city.$state;



                                }else{


                                      $party_name   = $sprint['sale_party']?$sprint['sale_party']:'-';
                                      $father_name  = '';                                     
                                      $phone        = '-';
                                      $email        = '-';
                                      $gst_no       = '-';
                                      $address      = '-';


                                }
                            ?>

                        <tr>
                            <td style="width: 1%;" rowspan="2">
                                <img src="<?php echo base_url('assets/images/aks_logo.png')?>" width="100" height="100" style="float:left;padding-top: 0px;">
                            </td>
                           <?php 
                                $company_data = $this->db->query("SELECT * FROM COMPANY WHERE COMPANYCODE='003' ")->row(); 
                            ?>
                            <td style="padding-left:5px;width: 50%;padding-bottom: 15px;">
                                <p style="font-weight:bold;font-size: 16px;"><?php echo $company_data?$company_data->COMPANYNAME:'AKS AYYANAR KARUPATI SAYALKUDI'; ?></p>
                                <p style="font-size: 12px;"><?php echo $company_data?$company_data->ADDRESS1.',':'-'; ?></p>
                                <p style="font-size: 12px;"><?php echo $company_data?$company_data->ADDRESS2.',':'-'; ?></p>

                                <p style="font-size: 12px;">
                                    <?php echo $company_data?$company_data->CITY.' - ':'-'; ?>
                                    <?php echo $company_data?$company_data->PINCODE.',':'-'; ?>
                                </p>
                                <p style="font-size: 12px;">
                                    <span style="float:left;"><?php echo $company_data?$company_data->STATE.'.':'-'; ?></span>
                                    <span style="display: flex !important;align-items: center !important;justify-content: flex-end !important;padding-right: 10px;">St.Code &nbsp; : 33</span>
                                </p>
                                <p style="font-weight: bold;font-size: 12px;">
                                    <span>PH &nbsp;</span>
                                    <span><?php echo $company_data?$company_data->PHONE:'-'; ?></span>
                                </p>
                            </td>
                            <td style="width: 50%;padding-top: 0px;">

                                <p style="font-weight: bold; font-size: 16px; text-align: center;">
                                    <?php echo 'Sale Quotation'; ?></p>
                                <p style="font-weight: bold; font-size: 16px;">Billed To</p>
                                <p style="font-size:    14px;padding-left: 30px; font-weight: bold;"><?php echo $party_name;?> <?php echo $father_name;?></p>

                                <p style="padding-left: 30px;font-size: 13px;"><?php echo $address?$address:'';?></p>
                                <p style="padding-left: 30px;font-size: 12px;"> &nbsp;</p>
                                <p style="padding-left: 30px;font-size: 2px;"> &nbsp;</p>
                                <p style="padding-left: 30px;font-size: 12px;"> &nbsp;</p>
                                <p style="padding-left: 30px;">
                                
                                    <label style="float:left;font-size: 12px;">
                                        <span>GSTIN &nbsp;  </span>
                                        <span><?php echo $gst_no; ?></span>
                                    </label>
                                    <label style="float:right; padding-right: 10px;">
                                        <span style="font-weight:bold;font-size: 12px;">PH &nbsp;  </span>
                                        <span style="font-weight:bold;font-size: 12px;"><?php echo $phone; ?></span>
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
                            <?php $i=0; $wgtss=0; $total_amount_sum=0; foreach($print_cart_view as  $cprint){ 

                                 $count = count($cprint);
                                ?>

                                <?php  $prdname  = $this->db->query("SELECT * FROM AKS_PRD_MASTER WHERE AKS_PRD_MID ='".$cprint['product_id']."' ")->row();?>
                               <?php 

                                    $wgtss += $cprint['product_wgt']; 
                                    $total_amount_sum += $cprint['price']; 



                               ?>                       
                            <tr >
                                <td style="text-align:center;border-bottom-style: hidden; "><?php echo $i+1; ?></td>
                                <td style="text-align:start;border-bottom-style: hidden;"><?php echo $prdname->AKS_PRD_NAME; ?></td>
                                <td style="text-align:center;border-bottom-style: hidden;" colspan ="2"><?php echo $cprint['HSN_CODE']; ?></td>
                                <td style="text-align: center;border-bottom-style: hidden;"><?php echo $cprint['sale_price']; ?> /<?php  
                                    $grams = floatval($prdname->AKS_PRD_WT?$prdname->AKS_PRD_WT:0);
                                    $kilograms = $grams / 1000;
                                     echo $kilograms.' Kg'; ?>
                                </td>
                                <td style="text-align:center;border-bottom-style: hidden;">
                                    <?php 
                                    $order_grams = floatval($cprint['product_wgt']?$cprint['product_wgt']:0);
                                    $order_kilograms = $order_grams / 1000;
                                     echo $order_kilograms.' Kg';?></td>
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
                       
                         <tfoot>
                            <tr>
                                <td class="ft_wgt" colspan="6" style="text-align: right;"><h4>Total Amount&emsp;</h4></td>
                               
                              
                              
                                <td class="ft_wgt" style="text-align:center;">

                                    <?php $grand_total = floatval($total_amount_sum)-floatval($sprint['sale_dis_amt']?$sprint['sale_dis_amt']:0); echo number_format($grand_total,2,'.',','); ?></td>
                            </tr>
                        </tfoot>
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
                                <td class="ft_wgt" colspan="6" style="text-align: right;"><h4>Discount&emsp;</h4></td>
                               
                              
                              
                                <td class="ft_wgt" style="text-align:center;"><?php echo number_format($sprint['sale_dis_amt'],2,'.',','); ?></td>
                            </tr>
                        </tfoot>
                    </table>
                    <table id="charges">
                        <tr style="">
                            <td class="ft_wgt" style="border-top-style: hidden;text-align: center;font-weight:bold !important;" rowspan="2"><span>No of Item</span></td>
                            <td class="ft_wgt" style="border-top-style: hidden;text-align: center;font-weight:bold !important;" rowspan="2"><span>Total Values</span></td>
                            <td class="ft_wgt" style="border-top-style: hidden;text-align: center;font-weight:bold !important;" colspan="2"><span>CGST</span></td>
                            <td class="ft_wgt" style="border-top-style: hidden;text-align: center;font-weight:bold !important;" colspan="2"><span>SGST</span></td>
                            <td class="ft_wgt" style="border-top-style: hidden;text-align: center;font-weight:bold !important;" colspan="2"><span>IGST</span></td>
                            <td class="ft_wgt" style="width: 101px; border-top-style: hidden;text-align: center;font-weight:bold !important;" rowspan="2"><span>Grand Amount</span></td>
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
                            <td style="text-align:center;"><?php echo $sprint['sale_prd_count']; ?></td>
                            <td style="text-align:center;"><?php echo number_format($grand_total,2,'.',','); ?></td>
                            
                            <?php 
                                  $price = $grand_total; 

                                  $gst = 2.5;

                                  // $cgst = $price * 2.5 ;

                                   $cgst =( $gst * $price ) / 100  ;

                                   $sgst =( $gst * $price ) / 100  ;

                                   $gtotal = $price + $cgst+ $sgst;

                                ?>

                            <td style="text-align:center;">2.5</td>
                            <td style="text-align:center;"><?php echo number_format($cgst,2,'.',','); ?></td>

                            <td style="text-align:center;">2.5</td>
                            <td style="text-align:center;"><?php echo number_format($cgst,2,'.',','); ?></td>
 
                            <td style="text-align:center;">0</td>
                            <td style="text-align:center;">0</td>

                            

                            <td style="text-align:center;"><?php echo number_format($gtotal,2,'.',','); ?></td>
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
                                <img src="" id="barcode" height="38" width="250">
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
     <script src="https://cdn.jsdelivr.net/jsbarcode/3.6.0/JsBarcode.all.min.js"></script>
        <script>
            // JsBarcode("#barcode", "<?php echo $sprint['sale_id']; ?>");
            JsBarcode("#barcode", "<?php echo $sprint['sale_id']; ?>", {
                  displayValue: false
                });
        </script>

        <script type="text/javascript">
            printContent()
            function printContent() {
              window.print();
            }

        </script>