<?php if(isset($_SESSION['Karupatti MasterEdit'])){ if($_SESSION['Karupatti MasterEdit']==1){?>
<!--begin::Modal dialog-->
<div class="modal-dialog modal-m">
	<!--begin::Modal content-->
	<?php if ($prd_details->PRD_CUR_QTY==0){ ?>
		<div class="modal-content rounded">
			<div class="swal2-icon swal2-warning swal2-icon-show" style="display: flex;">
			<div class="swal2-icon-content">!</div>
			</div>
			<div class="swal2-html-container" id="swal2-html-container" style="display: block;">Are you sure you want to delete <?php echo $prd_details->AKS_PRD_NAME;?>?</div>
			<div class="d-flex flex-center flex-row-fluid pt-12">
				<button type="reset" class="btn btn-secondary me-3" data-bs-dismiss="modal" data-bs-dismiss="modal">No</button>
				<button type="submit" class="btn btn-primary " data-bs-dismiss="modal" onclick="removeprd('<?php echo $prd_details->AKS_PRD_MID;?>')">Yes</button>
			</div><br><br>
		</div>
	<?php }else{ ?>
		<!--begin::Modal dialog-->
			<div class="modal-dialog modal-dialog-centered modal-m">
	            <!--begin::Modal content-->
	            <div class="modal-content rounded">
	                <div class="swal2-icon swal2-icon-show" style="display: flex;border: 3px solid red !important;">
	                    <div class="swal2-icon-content" style="color:red">&#x2715;</div></div>
	                    <div class="swal2-html-container" id="swal2-html-container" style="display: block;">
	                        <b><span><?php echo $prd_details->AKS_PRD_NAME;?></span><br><span> Is Already Occured In Stock So Could'nt Delete.</span></b>
	                        </div>
	                    <div class="d-flex flex-center flex-row-fluid pt-12">
	                        <button type="submit" class="btn btn-primary me-3" data-bs-dismiss="modal"  >OK</button>
	                        
	                    </div><br><br>
	            </div>
	            <!--end::Modal content-->
	        </div>
		<!--end::Modal dialog-->
	<?php } ?>
</div>
<?php }}else{?><?php $this->load->view("common_role_permission_err"); ?><?php } ?>