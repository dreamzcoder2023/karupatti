<!--begin::Modal dialog-->
<div class="modal-dialog modal-m">
	<!--begin::Modal content-->
	<div class="modal-content rounded">
		<div class="swal2-icon swal2-warning swal2-icon-show" style="display: flex;">
			<div class="swal2-icon-content">!</div></div>
			<div class="swal2-html-container" id="swal2-html-container" style="display: block;">
				<b><span><?php echo $tagentry_list->tag_id; ?></span>&nbsp;<span> - <?php $item_name  = $this->db->query("SELECT * FROM ITEMS WHERE  SNO='".$tagentry_list->item_name."' ")->row();
					 if(isset($item_name->ITEMNAME)){ echo $item_name->ITEMNAME; }else{ echo '-';}  ?> </span>&nbsp;<span> - <?php $item_name  = $this->db->query("SELECT * FROM SUBITEM_LIST WHERE  SUB_ID='". $tagentry_list->subitem_name."' ")->row();
					 if(isset($item_name->SUBITEM_NAME)){ echo $item_name->SUBITEM_NAME; }else{ echo '-';}   ?><br></span>&nbsp;</b>
				<p class="mt-2">Are you sure convert to Non Tag?</p></div>
			<div class="d-flex flex-center flex-row-fluid pt-12">
				<button type="submit" class="btn btn-primary me-3" data-bs-dismiss="modal" onclick="non_approvetag('<?php echo $aid;?>')">Yes</button>
				<button type="reset" class="btn btn-secondary" data-bs-dismiss="modal" onclick="closenonApproveModal();">No</button>
			</div><br><br>
	</div>
	<!--end::Modal content-->
</div>
<!--end::Modal dialog-->
