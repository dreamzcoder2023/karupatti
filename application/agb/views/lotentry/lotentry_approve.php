<!--begin::Modal dialog-->
	<div class="modal-dialog modal-m">
		<!--begin::Modal content-->
		<div class="modal-content rounded">
			<div class="swal2-icon swal2-warning swal2-icon-show" style="display: flex;">
				<div class="swal2-icon-content">&#x2713;</div></div>
				<div class="swal2-html-container" id="swal2-html-container" style="display: block;">
					<b><span><?php echo $Lotentry->lot_no; ?> </span></b>
					<p class="mt-2">Are you sure you want to Approve?</p></div>
				<div class="d-flex flex-center flex-row-fluid pt-12">
					
					<button type="reset" class="btn btn-secondary me-3" data-bs-dismiss="modal" onclick="closeViewModal()">No</button>
	                <button type="submit" class="btn btn-primary me-3" data-bs-dismiss="modal" onclick="approvelot('<?php echo $id;?>')">Yes</button>
	            </div><br><br>
		</div>
		<!--end::Modal content-->
	</div>
<!--end::Modal dialog-->
