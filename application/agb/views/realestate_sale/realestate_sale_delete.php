
<div class="modal-dialog modal-m">
	<!--begin::Modal content-->
	<div class="modal-content rounded">
		<div class="swal2-icon swal2-warning swal2-icon-show" style="display: flex;">
			<div class="swal2-icon-content">!</div></div>
			<div class="swal2-html-container" id="swal2-html-container" style="display: block;">Are you sure you want to delete <?php echo $proprety_details->sale_id;?>?</div>
			<div class="d-flex flex-center flex-row-fluid pt-12">
				<button type="reset" class="btn btn-secondary me-3" data-bs-dismiss="modal" onclick="closeDeleteModal();">No</button>
				<button type="submit" class="btn btn-primary " data-bs-dismiss="modal" onclick="removeprop('<?php echo $proprety_details->sale_id;?>')" >Yes</button>
			</div><br><br>
		<!-- </div> 