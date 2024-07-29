<?php for($i=0;$i<$count;$i++){
if(isset($tag_no[$i])){ 
$tag=str_replace('/','_',$tag_no[$i]) ;
$tag_entry = $this->db->query("SELECT * FROM tag_entry WHERE tag_id ='".$tag_no[$i]."' ")->row();
?>
        <!-- <center> -->
        <div style="height:49px;width: 207px;float: left !important;font-family: calibri;">
                <table width="100%" style="padding: 5px;padding-top: 0px !important;">
                    <tbody>
                        <tr>
                            <td style="font-size: 12px; font-weight: bold;">
                                <span><?php $item_name  = $this->db->query("SELECT * FROM ITEMS WHERE  SNO='". $tag_entry->item_name."' ")->row();
																			echo $item_name->ITEMNAME;
                                                                            // echo  $tag_entry->item_name; ?></span><br>
                                <span><?php echo $tag_entry->metal_weight; ?></span>
                            </td>
                            <td style="display: flex !important;justify-content: flex-end !important;align-items: center !important;padding: 0px;padding-top: 10px !important;">
                                <img src="<?php echo base_url(); ?>assets/images/barcode/<?php echo $tag; ?>.png " height="25" width="60">
                            </td>
                            <td style="font-size: 10px; font-weight: bold;width: 26% !important;">
                                <span><?php
                                $item_type  = $this->db->query("SELECT * FROM jewel_type WHERE  jewel_type_id='". $tag_entry->metal_type."' ")->row();
                                echo $item_type->jewel_type;
                                // echo $tag_entry->metal_type; ?></span><br>
                                <!-- <span>Silver</span><br> -->
                                <span><?php
                                $purity  = $this->db->query("SELECT * FROM ITEMPURITY WHERE  ITEMPURITYID='". $tag_entry->quality."' ")->row();
                                echo $purity->ITEMPURITYNAME;
                                // echo $tag_entry->quality; ?></span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            
        <!-- </center> -->
        <br>
        <br>
        <br>
        <?php } } ?>