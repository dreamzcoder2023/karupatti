    

        <center>
            <div style="height:189px;width: 284px;font-family: calibri;">
                <table width="100%" style="padding: 5px;">
                    <thead>
                        <tr>
                            <td colspan="2" style="font-size:45px; font-weight: bolder;text-align: center !important;"><?php echo $loan_details->BILLNO;?></td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td style="font-size: 16px; font-weight: bold;">
                                <span>NAME &nbsp;:&nbsp;</span>
                                <span style="text-align-last: end;"><?php echo $loan_details->NAME;?></span>
                            </td>
                            <!-- <td style="font-size: 16px; font-weight: bold;">
                                <span>SANMUGAVALLI</span>
                            </td> -->
                        </tr>
                        <tr>
                            <td style="font-size: 16px; font-weight: bold;">
                                <span>WEIGHT &nbsp;:&nbsp;</span>
                                <span><?php echo $loan_details->NETWEIGHT;?></span>&emsp;&nbsp;
                                <span>PERIOD : </span>
                                <span><?php echo $loan_details->REDEMPTION_PERIOD;?> D</span>
                            </td>
                            <!-- <td style="font-size: 16px; font-weight: bold;text-align: left;">
                                <span>8.100</span>&nbsp;
                                <span>PERIOD : </span>
                                <span>60 D</span>
                            </td> -->
                        </tr>
                        <tr>
                            <td style="font-size: 16px; font-weight: bold;">
                                <span>DATE &nbsp;:&nbsp;</span>
                                <span><?php echo date_format(date_create($loan_details->ENDATE),"d/m/Y");?></span>&emsp;
                                <span>AMT : </span>
                                <span><?php echo $loan_details->AMOUNT;?></span>
                            </td>
                        </tr>
                        <tr>
                            <td style="font-size: 16px; font-weight: bold;">
                                <?php $pl_info=$this->db->query("select * from PLEDGEINFO where BILLNO='".$loan_details->BILLNO."'")->result_array();
                                $pl_name=''; $i=0;
                                    foreach($pl_info as $plist)
                                    {
                                        if($i==0)
                                            $pl_name=$plist['PLEDGENAME'];
                                        else
                                            $pl_name.=",".$plist['PLEDGENAME'];
                                        $i++;
                                    }
                                 ?>

                                <span><?php echo $pl_name;?></span>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <center>
                                    <img src="<?php echo base_url();?>/assets/images/barcode.png" height="40" width="200">
                                </center>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </center>