
        <div class="row">
        <table id="kt_datatable_view_table" class="table align-middle table-row-dashed table-striped table-hover fs-7 gy-1 gs-2" >
            <thead>
                <tr class="text-start text-muted fw-bold fs-7 gs-0">
                    <th class="min-w-25px">Sno</th>
                    <th class="min-w-50px">Product</th>
                    <th class="min-w-25px">Wgt(g)</th>
                    <th class="min-w-50px">price per g</th>
                    <th class="min-w-50px">Total Price</th>
                </tr>
            </thead>
            <tbody class="text-gray-600 fw-semibold">
        <?php 
        $tot_wgt = 0; $tot_amt = 0;
        foreach ($cart_view as $i => $view)
        {
            $tot_wgt+=$view["product_wgt"];
            $tot_amt+=$view["price"];
         $prdname  = $this->db->query("SELECT * FROM AKS_PRD_MASTER WHERE AKS_PRD_MID ='".intval($view['product_id'])."' ")->row();
     	?>
         <tr id="tr">
                <td><?php echo $i+1; ?></td>
                <td><?php echo $prdname->AKS_PRD_NAME; ?></td>
                <td><?php echo $view["product_wgt"]; ?> g</td>
                <td><?php echo number_format($view["sale_price"],2,'.',','); ?><span class="text-end"> /<?php echo $prdname->AKS_PRD_WT; ?> g</span></td>
                <td><?php echo number_format($view["price"],2,'.',','); ?></td>
            </tr>
        <?php $i++;} ?>
            </tbody>
            <tfoot style="position: -webkit-sticky; position: sticky; bottom: 0;background-color: #ec9629 !important; z-index: 2;">
                <tr class="text-start text-muted fw-bold fs-7">
                        
                        <td></td>
                        <td>Total Weight</td>
                        <td><?php $order_grams = floatval($tot_wgt ? $tot_wgt :0);
                                    $order_kilograms = $order_grams / 1000;
                                     echo $order_kilograms.' Kg'; ?></td>
                        <td></td>
                        <td><?php echo number_format($tot_amt ? $tot_amt :0,2,'.',','); ?></td>
                    </tr>
                </tfoot>
        </table>
		 <script>

			$('#kt_datatable_view_table').wrap('<div class="dataTables_scroll" />');
			$("#kt_datatable_view_table").kendoTooltip({
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
	  </script>