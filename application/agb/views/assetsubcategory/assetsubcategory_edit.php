
	<!--begin::Modal dialog-->		
		<div class="modal-dialog modal-md">
			<!--begin::Modal content-->
			<div class="modal-content rounded">
				<!--begin::Modal header-->
				<div class="modal-header justify-content-end border-0 pb-0">
					<!--begin::Close-->
					<button type="button" class="btn btn-sm btn-icon btn-active-color-primary close" data-bs-dismiss="modal" aria-label="Close">
							<span class="svg-icon svg-icon-1 px-3">
								<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
									<rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="currentColor" />
									<rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="currentColor" />
								</svg>
							</span>
						</button>
					<!--end::Close-->
				</div>
				<!--end::Modal header-->
				<div class="modal-body pt-0 pb-15 px-5 px-xl-20">
					<!--begin::Heading-->
					<div class="mb-6 text-center">
						<h1 class="mb-3">Modify Sub Category</h1>
					</div>
					<form method="POST" action="<?php echo base_url(); ?>Assetsubcategory/update" enctype="multipart/form-data" onsubmit="return editvalidation();">
					<input type="hidden" id="edit_id" name="edit_id" value="<?php echo $edit->assetsubcategoryid?$edit->assetsubcategoryid:'';?>">
					<div class="row">
						<label class="col-lg-4 col-form-label required fw-semibold fs-6">Category</label>
							<div class="col-lg-8 fv-row">
								<select class="form-select form-select-solid" name="assetcategoryid_edit" id="assetcategoryid_edit" data-control="select2" data-hide-search="false" data-dropdown-parent="#kt_modal_edit_subcategory">
								<option value="">Select</option>	
								<?php if(isset($assetcategorylist)){ 
										foreach ($assetcategorylist as $clist) { ?>
										<option value="<?php echo $clist['assetcategoryid']; ?>" <?php if ($clist['assetcategoryid']==$edit->assetcategoryid){
											echo "selected";
										} ?>><?php echo ucfirst($clist['assetcategoryname']); ?></option>
								<?php } } ?>
								</select>
								<div class="fv-plugins-message-container invalid-feedback" id="assetcategoryid_edit_err"></div>
							</div>
						<label class="col-lg-4 col-form-label required fw-semibold fs-6">Sub Category</label>
						<div class="col-lg-8 fv-row fv-plugins-icon-container">
							<input type="text" name="assetsubcategoryname_edit" class="form-control form-control-lg1 form-control-solid" placeholder="Enter Sub Category Name" id="assetsubcategoryname_edit" value="<?php echo $edit->assetsubcategoryname?$edit->assetsubcategoryname:'';?>" onkeyup="checkunique_edit()">
							<div class="fv-plugins-message-container invalid-feedback" id="assetsubcategoryname_edit_err"></div>
						</div>
					</div>
					<div class="d-flex justify-content-center align-items-center mt-6">
						<button type="reset" class="btn btn-secondary me-3" data-bs-dismiss="modal">Cancel</button>
						<button type="submit" class="btn btn-primary" id="btnSubmit_ed">Update</button>
					</div>
				</form>
				</div>
			</div>
			<!--end::Modal dialog-->
		</div>
	<!--end::Modal dialog-->
<input type="hidden" id="baseurl" value="<?php echo base_url();?>">
<?php $this->load->view("script.php");?>

<script> 

		var euniq = 0;
		function checkunique_edit()
		{
		   var id           = $('#edit_id').val();
		   var val          = $('#assetsubcategoryname_edit').val();
		   var cat          = $('#assetcategoryid_edit').val();
		   var baseurl      = $("#baseurl").val();
		   // alert(val)
		   if (val!='') {
			   $.ajax({
			      type:"POST",
			      url:baseurl+'Assetsubcategory/checkunique_edit',
			      data: "value=" + val + "&id=" + id + "&cat=" + cat,
			      cache: false,
			      dataType: "html",
			      success: function(result){
			        if(result==1)
			        {
			            $('#assetsubcategoryname_edit_err').html('Asset Sub Category already exists!');
			            $('#btnSubmit_ed').prop('disabled', true);
			            euniq = 1;
			        }
			        else
			        {
			            $('#assetsubcategoryname_edit_err').html('');
			            $('#btnSubmit_ed').prop('disabled', false);
			            euniq = 0;
			        }
			      }
			   });
		   }
		}
			function  editvalidation(){

				var err = 0;
				var assetsubcategoryname_edit   = $('#assetsubcategoryname_edit').val();
				

				// alert(acnts_users_edit);


					if(assetsubcategoryname_edit.trim()==""){


						$('#assetsubcategoryname_edit_err').html('Enter Sub category Required..!!');
						
						err++;
												

					}
					else{

						if (euniq==1) {
					    		 $('#assetsubcategoryname_edit_err').html('Product Sub Category already exists !');
					        	err++;
					    	}
					    	else{
							$('#assetsubcategoryname_edit_err').html('');
							}

						$('#assetsubcategoryname_edit_err').html('');
					}

					var assetcategoryid_edit          = $('#assetcategoryid_edit').val();

					if(assetcategoryid_edit.trim() =="")
					{
						
						$('#assetcategoryid_edit_err').html('Select Category Required..!');
						err++;
					}
					else{
			       		$('#assetcategoryid_edit_err').html('');
					}

					if (err>0) { return false; }else{ return true;} 

			}
		</script>