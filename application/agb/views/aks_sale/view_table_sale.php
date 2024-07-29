
<table class="table align-middle table-row-dashed table-striped table-hover fs-7 gy-2 gs-2" id="kt_datatable_view_table">
	<thead>
		<tr class="text-start text-muted fw-bold fs-7 gs-0">
	  	    <th class="min-w-100px">Product</th>
			<th class="min-w-80px">Shipment<br>Wgt(gms)</th>
			<th class="min-w-80px">Delivered<br>Wgt(gms)</th>
			<th class="min-w-100px">Balance / Billed<br>Wgt(gms)</th>
			<th class="min-w-80px">Price<br>Per(gms)</th>
			<th class="min-w-80px" align="end">Price</th>
		</tr>
	</thead>
	<tbody class="text-gray-600 fw-semibold">
		<?php 
			$tot_price=0; 
			$bill_tot_wgt=0; 
			$pack_tot =0; 
			$ship_tot =0; 
			$bal_tot  =0; 

			foreach ($cart_view as $i => $view){  
			$prd_data   = $this->db->query("SELECT * FROM AKS_PRD_MASTER WHERE AKS_PRD_MID ='".intval($view['product_id'])."' ")->row(); 
			$prd_name   = $prd_data?$prd_data->AKS_PRD_NAME:'-';
			$tot_price += $view["price"]?$view["price"]:0;
			$bill_tot_wgt += $view["product_wgt"]?$view["product_wgt"]:0;			
			$pack_tot += $view["packed_wgt"]?$view["packed_wgt"]:0;
			$ship_tot += $view["shiped_wgt"]?$view["shiped_wgt"]:0;

			$balance = $view["product_wgt"] - $view["packed_wgt"] - $view["shiped_wgt"];
			$bal_tot += $balance?$balance:0;



		?>
		<tr>
			<td class="ple1"><?php echo $prd_name; ?></td>
			<td><?php echo $view['packed_wgt']?$view['packed_wgt']:0; ?></td>
			<td><?php echo $view['shiped_wgt']?$view['shiped_wgt']:0; ?></td>
			<td>
				<span class="badge badge-danger fs-7"><?php echo $balance?$balance:0; ?></span>
				<span>/</span>
				<span><?php echo $view["product_wgt"]?$view["product_wgt"]:0;?></span>
			</td>
			<td align="end">
				<span><?php echo $view["sale_price"]?$view["sale_price"]:0; ?></span>
				<span>/</span>
				<span><?php if(isset($prd_data)){ echo  $prd_data->AKS_PRD_WT?$prd_data->AKS_PRD_WT:0; } else{echo '-'; } ?></span>
			</td>
			<td align="end"><?php echo number_format($view["price"]?$view["price"]:0,2,'.',','); ?></td>
	    </tr>
	    <?php $i++;} ?>
	</tbody>
	<tfoot style="position: -webkit-sticky; position: sticky; bottom: 0;background-color: #ec9629 !important; z-index: 2;">
		<tr class="text-start text-muted fw-bold fs-7">
	  	    <th class="min-w-100px">Total</th>
			<th class="min-w-80px"><?php echo $pack_tot?$pack_tot:0; ?></th>
			<th class="min-w-80px"><?php echo $ship_tot?$ship_tot:0; ?></th>
			<th class="min-w-100px">
				<span class="badge badge-danger fs-7"><?php echo $bal_tot?$bal_tot:0; ?></span>
				<span>/</span>
				<span><?php echo $bill_tot_wgt?$bill_tot_wgt:0; ?></span>
			</th>
			<th class="min-w-80px"></th>
			<th class="min-w-80px text-end">₹ <?php echo number_format($tot_price,2,'.',','); ?></th>
		</tr>
	</tfoot>	
</table>

<!-- <script src="js/products-list.js"></script> -->
		 <script>
			$("#kt_datatable_view_table").DataTable({
				//"aaSorting":[],
				"sorting":false,
				"paging": false,
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

				  "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
				  // "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
				   ">"
				});
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
	      })
			$("#ship_pack_table").DataTable({
				//"aaSorting":[],
				"sorting":false,
				"paging": false,
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
			$('#ship_pack_table').wrap('<div class="dataTables_scroll" />');

				$("#payment_table").DataTable({
				//"aaSorting":[],
				"sorting":false,
				"paging": false,
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
			$('#payment_table').wrap('<div class="dataTables_scroll" />');
			
		</script>