<!--begin::Modal dialog-->
<div class="modal-dialog modal-m">
	<!--begin::Modal content-->
	
	<div class="modal-content rounded">
		<div class="swal2-icon swal2-warning swal2-icon-show" style="display: flex;">
			<div class="swal2-icon-content">!</div></div>
			<div class="swal2-html-container" id="swal2-html-container" style="display: block;">Are you sure 
			<b><?php echo $details->sale_id?$details->sale_id:'-'; ?></b> Order is Release?</div>

			
						
			<div class="d-flex flex-center flex-row-fluid pt-12">
				<button type="submit" class="btn btn-primary me-3" data-bs-dismiss="modal" onclick="unhold_order('<?php echo $details->sid;?>')">Yes</button>
				<button type="reset" class="btn btn-secondary" data-bs-dismiss="modal" onclick="closeuhModal();">No</button>
			</div><br><br>
	</div>
	<!--end::Modal content-->
</div>
<!--end::Modal dialog-->