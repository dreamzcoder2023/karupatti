	
	<!--begin::Modal dialog-->		
		<div class="modal-dialog modal-md">
			<!--begin::Modal content-->
			<div class="modal-content rounded">
				<!--begin::Modal header-->
				<div class="modal-header justify-content-end border-0 pb-0">
					<!--begin::Close-->
					<button class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
						<!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
						<span class="svg-icon svg-icon-1">
							<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
								<rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="currentColor" />
								<rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="currentColor" />
							</svg>
						</span>
						<!--end::Svg Icon-->
					</button>
					<!--end::Close-->
				</div>
				<!--end::Modal header-->
				<div class="modal-body pt-0 pb-15 px-5 px-xl-20">
					<!--begin::Heading-->
					<div class="mb-6 text-center">
						<h1 class="mb-3">Modify Category</h1>
					</div>
					<form method="POST" action="<?php echo base_url(); ?>Assetcategory/update" enctype="multipart/form-data" onsubmit="return editvalidation();">
					<input type="hidden" id="edit_id" name="edit_id" value="<?php echo $edit->assetcategoryid?$edit->assetcategoryid:'';?>">
					<div class="row">
						<label class="col-lg-3 col-form-label required fw-semibold fs-6">Category</label>
						<div class="col-lg-9 fv-row fv-plugins-icon-container">
							<input type="text" name="assetcategoryname_edit" class="form-control form-control-lg1 form-control-solid" placeholder="Enter Category Name" id="assetcategoryname_edit" value="<?php echo $edit->assetcategoryname?$edit->assetcategoryname:'';?>" onkeyup="checkunique_edit()">
							<div class="fv-plugins-message-container invalid-feedback" id="assetcategoryname_edit_err"></div>
						</div>
					</div>
					<div class="d-flex justify-content-center align-items-center mt-6">
						<button type="reset" class="btn btn-secondary me-3" data-bs-dismiss="modal">Cancel</button>
						<button type="submit" class="btn btn-primary" id="btnSubmit_ed">Update Category</button>
					</div>
				</form>
				</div>
			</div>
			<!--end::Modal dialog-->
		</div>
	<!--end::Modal dialog-->



<input type="hidden" id="baseurl" value="<?php echo base_url();?>">

	<script> 

		var euniq = 0;
		function checkunique_edit()
		{
		   var id           = $('#edit_id').val();
		   var val          = $('#assetcategoryname_edit').val();
		   var baseurl      = $("#baseurl").val();
		   // alert(val)
		   if (val!='') {
			   $.ajax({
			      type:"POST",
			      url:baseurl+'Assetcategory/checkunique_edit',
			      data:"value="+val+"&id="+id,
			      cache: false,
			      dataType: "html",
			      success: function(result){
			        if(result==1)
			        {
			            $('#assetcategoryname_edit_err').html('Asset Category already exists!');
			            $('#btnSubmit_ed').prop('disabled', true);
			            euniq = 1;
			        }
			        else
			        {
			            $('#assetcategoryname_edit_err').html('');
			            $('#btnSubmit_ed').prop('disabled', false);
			            euniq = 0;
			        }
			      }
			   });
		   }
		}
			function  editvalidation(){

				var err = 0;
				var assetcategoryname_edit   = $('#assetcategoryname_edit').val();
				

				// alert(acnts_users_edit);


					if(assetcategoryname_edit.trim()==""){


						$('#assetcategoryname_edit_err').html('Enter category Required..!!');
						
						err++;
												

					}
					else{

						if (euniq==1) {
					    		 $('#assetcategoryname_edit_err').html('Product Category already exists !');
					        	err++;
					    	}
					    	else{
							$('#assetcategoryname_edit_err').html('');
							}

						$('#assetcategoryname_edit_err').html('');
					}

					if (err>0) { return false; }else{ return true;} 

			}
		</script>