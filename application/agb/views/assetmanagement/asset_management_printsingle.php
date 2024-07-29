    <?php if ($print) { ?>
        <head>
        <title>Ayyanar Gold Bank :: ERP</title>
        <link rel="shortcut icon" href="<?php echo base_url();?>assets/images/fav-icon-1.jpg" /></head>

        <center>
            <div style="height:189px;width: 284px;max-width: 284px;font-family: calibri;">
                <table width="100%" style="padding: 5px;padding-top: 0px !important;border: 1px solid black !important;border-radius: 10px !important;">
                    <thead>
                        <tr>
                            <td style="font-size:16px; font-weight: bolder;max-width: 20% !important;">
                                <span>ID</span>
                                <span style="float: right;">:</span>
                            </td>
                            <td style="font-size:16px; font-weight: bolder;max-width: 80% !important;"><?php echo $print->assetnumber?$print->assetnumber:'' ?></td>
                        </tr>
                        <tr>
                            <td style="font-size:16px; font-weight: bolder;max-width: 20% !important;">
                                <span>Company</span>
                                <span style="float: right;">:</span>
                            </td>
                            <td style="font-size:16px; font-weight: bolder;max-width: 80% !important;">
                                <?php 
                                $company = $print->COMPANYNAME?$print->COMPANYNAME:'';
                                if (strlen($company) > 18) {
                                                                $companyhide = substr($company, 0, 18) ."...";
                                                            } else{
                                                                $companyhide = $company;    
                                                            }
                                        echo $companyhide; 
                                ?>
                            </td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                             <td style="font-size:13px;max-width: 20% !important;">
                                <span>Asset Name</span>
                                <span style="float: right;">:</span>
                            </td>
                            <td style="font-size:13px;max-width: 80% !important;"> 
                                <?php 
                                $asset = $print->assetname?$print->assetname:'';
                                if (strlen($asset) > 25) {
                                                                $assethide = substr($asset, 0, 25) ."...";
                                                            } else{
                                                                $assethide = $asset;    
                                                            }
                                        echo $assethide; 
                                ?>
                            </td>
                        </tr>
                        <tr>
                             <td style="font-size:13px;max-width: 20% !important;">
                                <span>Category</span>
                                <span style="float: right;">:</span>
                            </td>
                            <td style="font-size:13px;max-width: 80% !important;">

                                <?php 
                                $assetcat = $print->assetcategoryname?$print->assetcategoryname:'';
                                if (strlen($assetcat) > 25) {
                                                                $assetcathide = substr($assetcat, 0, 25) ."...";
                                                            } else{
                                                                $assetcathide = $assetcat;    
                                                            }
                                        echo $assetcathide; 
                                ?>

                            </td>
                        </tr>
                        <tr>
                             <td style="font-size:13px;max-width: 20% !important;">
                                <span>Purchase Date</span>
                                <span style="float: right;">:</span>
                            </td>
                            <td style="font-size:13px;max-width: 80% !important;">
                            <?php
                                $date = $print->purchasedate?$print->purchasedate:date('Y-d-m');
                                $date_format  = $this->db->query("SELECT * FROM general_settings ")->row();
                                    $format= $date_format->date_format;
                                    echo date("$format", strtotime($date));
                                ?>
                            </td>
                        </tr>
                        <tr>
                             <td style="font-size:13px;max-width: 20% !important;">
                                <span>Allocated</span>
                                <span style="float: right;">:</span>
                            </td>
                            <td style="font-size:13px;max-width: 80% !important;">
                                <?php   
                                    if ($print->allocatedtype==1) {
                                        echo 'Company'; }else { echo 'Staff' ;} 
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <center>
                                    <div>
                                        <span style="font-size:13px; font-weight: bolder;"> 
                                            <?php 
                                                    $per = $print->assetperiod?$print->assetperiod:'-';
                                                    $dur = $print->assetduration?$print->assetduration:'-';
                                                    if ($dur==1) {
                                                       $durat = $per.' Month';
                                                    }else{
                                                       $durat = $per.' year';
                                                    } 
                                                echo $durat;            
                                            ?>  
                                        </span>
                                    </div>
                                    <img src="" id="barcode" height="35" width="200">
                                </center>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </center>

        <script src="https://cdn.jsdelivr.net/jsbarcode/3.6.0/JsBarcode.all.min.js"></script>
        <script>
            JsBarcode("#barcode", "<?php echo $print->assetnumber; ?>", {
                  displayValue: false
                });
        </script>
         <script type="text/javascript">
            printContent()
            function printContent() {
              window.print();
            }

        </script>  
        <?php } ?>

