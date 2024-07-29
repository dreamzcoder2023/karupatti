<!--begin::Modal dialog-->
<div class="modal-dialog modal-m">
	<!--begin::Modal content-->
	<div class="modal-content rounded">
		<div class="swal2-icon swal2-warning swal2-icon-show" style="display: flex;">
			<div class="swal2-icon-content"><i class="fas fa-check eyc fs-1"></i></div></div>
			<div class="swal2-html-container" id="swal2-html-container" style="display: block;">
				<b><span><?php
				// $item_name  = $this->db->query("SELECT * FROM tag_entry WHERE  tag_no='". $aid."' ")->row();
				echo $tagentry_list->tag_id;
				// echo $aid; ?></span><span> - <?php
					$item_name  = $this->db->query("SELECT * FROM ITEMS WHERE  SNO='". $tagentry_list->item_name."' ")->row();
					echo $item_name->ITEMNAME;
				// echo $tagentry_list->item_name;  ?> </span><span>- <?php 
				$item_name  = $this->db->query("SELECT * FROM SUBITEM_LIST WHERE  SUB_ID='". $tagentry_list->subitem_name."' ")->row();echo $item_name->SUBITEM_NAME;
				// echo $tagentry_list->subitem_name;  ?><br></span></b>
				<p class="mt-2">Are you sure you want to Approve?</p></div>
			<div class="d-flex flex-center flex-row-fluid pt-12">
				<button type="submit" class="btn btn-primary me-3" data-bs-dismiss="modal" onclick="approvetag('<?php echo $aid;?>')">Yes</button>
				<button type="reset" class="btn btn-secondary " data-bs-dismiss="modal" onclick="closeApproveModal();">No</button>
			</div><br><br>
	</div>
	<!--end::Modal content-->
</div>
<!--end::Modal dialog-->
