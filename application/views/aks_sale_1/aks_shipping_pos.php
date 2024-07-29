    
        
        <center>
            <div style="height:570px;width: 381px;font-family: calibri;">
                <table width="100%"  style="padding: 5px;padding-top: 5px !important;padding-bottom: 0px !important;padding-left: 0px !important;line-height: 1.2rem !important;">
                    <thead>
                        <tr>
                            <th colspan="2">
                                <span style="font-size: 24px; font-weight: bold;float: left !important;padding-bottom: 5px !important;padding-top: 5px !important;">Sender Details</span>
                            </th>
                        </tr>
                        <tr>
                            <th rowspan="3">
                                <img src="<?php echo base_url('assets/images/aks_logo.png')?>" height="100px" style="float:left !important;">
                                
                            </th>
                            <th rowspan="3" style="font-size: 18px !important; font-weight: bold;">
                                <span style="float: left !important;font-size: 24px !important;">Sri Ayyanar Karuppati</span><br>
                                <span style="float: left !important;">VVR Nagar,Sayalkudi - 623120</span><br>
                                <span style="float: left !important;">Ph : 6381277794,9952171862</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr><td colspan="2"><hr style="border-top: 1px dashed;"></td></tr>
                        <tr>


                            <td colspan="2">
                                <span style="font-size: 24px; font-weight: bold;float: left !important;padding-bottom: 5px !important;">Delivery Details</span>
                            </td>
                        </tr>
                        <?php  foreach($sale_pos as $i=> $spos){ 

                        	$date=date('d-m-Y',strtotime($spos['sale_date']));


                        	?>
                        	 <?php  $party_detail  = $this->db->query("SELECT * FROM PARTIES WHERE PID ='".$spos['id_party']."' ")->row(); ?>
                              
                        <tr>
                        	

                            <td colspan="2" style="font-size: 20px !important;">
                                <label style="text-align-last: start;">
                                    <span>Name</span>
                                    <span style="text-align-last:end !important;">&emsp;&emsp;:</span>
                                </label>
                                <label style="padding-left:12px !important;"><?php echo $spos['sale_party'];?></label>
                            </td>
                        </tr>
                        <tr>
                            <td style="font-size: 20px !important;padding-bottom: 30px !important;">
                                    <span>Address</span>&emsp;&nbsp;&nbsp;:
                                    <!-- <span style="text-align-last:end !important;">:</span> -->
                            </td>
                            <td style="font-size: 20px !important;padding-left:0px !important; ">


	                            	<!-- <p> &nbsp; &nbsp;<?php echo $spos['shipment_to'];?></p> -->
                                <p style="padding-left: 10px;"><?php echo $spos['shipment_to'];?></p>
                               <!--  <p style="padding-left: 30px;font-size: 12px;"> &nbsp;</p>
                                <p style="padding-left: 30px;font-size: 2px;"> &nbsp;</p>
                                <p style="padding-left: 30px;font-size: 12px;"> &nbsp;</p> -->
	                             
	                                
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" style="font-size: 20px !important;">
                                <label style="text-align-last: start;">
                                    <span>Mobile</span>&emsp;&nbsp;&nbsp;&nbsp;
                                    <span style="text-align-last:end !important;"> :</span>
                                </label>
                                <label style="padding-left:10px !important;">
                                    <span><?php echo $party_detail->PHONE; ?>&nbsp;,</span>
                                    <span style="font-weight: bold;"></span>
                                    <span><?php echo $party_detail->PHONE2; ?></span>
                                </label>
                            </td>
                        </tr>
                        <tr><td colspan="2"><hr style="border-top: 1px dashed;"></td></tr>
                        <?php $i++; }?>
                    </tbody>
                    <!-- <style type="text/css">
                        #tab td{
                            border-bottom: 1px dashed;
                        }
                        #tab {
                            border-collapse: collapse !important;
                            
                        }
                    </style> -->
                </table>
                <div style="padding: 10px !important;padding-top: 0px !important;">
                    <table id="tab" width="100%"  style="line-height: 1.5rem !important;">
                 
                        <thead>
                            <tr>
                                <th>
                                    <span style="font-size: 24px; font-weight: bold;float: left !important;">Product Details</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                        	
                            <tr>
                            	<?php $i=0; $wgtss=0;   foreach($print_cart_view_pos as   $cpos){ 

                            		$wgtss += $cpos['product_wgt'];




                            		?>  <?php $i++; } ?>

                                <td colspan="2" style="font-size: 20px;">
                                    <label style="text-align-last: start;">
                                        <span>Total No of Product</span>
                                        <span style="text-align-last:end !important;">&nbsp;&nbsp; :</span>
                                    </label>&nbsp;&nbsp;
                                    <label><?php echo $spos['sale_prd_count'];?></label>
                                </td>
                            </tr>
                          
                            <tr>
                                <td colspan="2" style="font-size: 20px;">
                                    <label style="text-align-last: start;">
                                        <span>Total Weight(gms)</span>
                                        <span style="text-align-last:end !important;">&nbsp;&nbsp;&nbsp;&nbsp; :</span>
                                    </label>&nbsp;&nbsp;
                                    <label><?php echo $wgtss; ?></label>
                                    <!-- <label><?php echo $print_cart_view_pos->product_wgt; ?></label> -->
                                </td>
                            </tr>
                            
                            <tr>
                                <td colspan="2" style="font-size: 20px;font-weight: bold;">
                                    <label style="text-align-last: start;">
                                        <span>Total Amount</span>
                                        <span style="text-align-last:end !important;">&emsp;&emsp;&nbsp;&nbsp;&nbsp;&nbsp;:</span>
                                    </label>&nbsp;&nbsp;
                                    <label><?php echo $spos['sale_prd_tot_amt'];?>.00</label>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2" style="font-size: 20px !important;">
                                    <label style="text-align-last: start;">
                                        <span>Date</span>&emsp;&nbsp;&nbsp;&nbsp;
                                        <span style="padding-left:99px !important;"> :</span>
                                    </label>
                                    <label style="padding-left:15px !important;">
                                        <span><?php echo $date;?></span>
                                    </label>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2" style="font-size: 20px !important;">
                                    <label style="text-align-last: start;">
                                        <span>Bill No</span>&emsp;&nbsp;&nbsp;&nbsp;
                                        <span style="padding-left:85px !important;"> :</span>
                                    </label>
                                    <label style="padding-left:15px !important;">
                                        <span><?php echo $spos['sale_id'];?></span>
                                    </label>
                                </td>
                            </tr>
                            
                        </tbody>
                 
                    </table><br>
                </div>
            <!-- <center><img src="<?php echo base_url('assets/images/barcode.jpg')?>" height="50"></center>  -->
            </div>
        </center>