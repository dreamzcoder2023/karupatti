<div class="modal-dialog modal-md">
<!--begin::Modal content-->
<div class="modal-content rounded">
	<!--begin::Modal header-->
	<div class="modal-header justify-content-end border-0 pb-0">
		<!--begin::Close-->
		<div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
			<!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
			<span class="svg-icon svg-icon-1">
				<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
					<rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="currentColor" />
					<rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="currentColor" />
				</svg>
			</span>
			<!--end::Svg Icon-->
		</div>
		<!--end::Close-->
	</div>
	<!--end::Modal header-->
	<div class="modal-body pt-0 pb-15 px-5 px-xl-16">
		<!--begin::Heading-->
		<div class="mb-6 text-center">
			<h1 class="mb-3">Modify Jewel</h1>
		</div>
		<!-- < ?php print_r($edit); ?> -->
		<!-- " -->
		<form method="POST" autocomplete="off" enctype="multipart/form-data" action="<?php echo base_url(); ?>Gallery/update" onsubmit="return edit_validation();">
			<div class="row">
				<input type="hidden" name="edit_id" id="edit_id"  value="<?php echo $edit->gallery_master_id ; ?>">
				<label class="col-lg-4 col-form-label required fw-semibold fs-6">Item Name</label>
				<div class="col-lg-8 fv-row fv-plugins-icon-container">
					<select class="form-select form-select-solid" name="itemnameedit" id="itemnameedit" data-control="select2"  data-dropdown-parent="#kt_modal_edit_jewel" onchange="itemchangeedit();">	
						<option value="">Select</option>
						<?php if (isset($item)) { foreach ($item as $ilist) {
							 if ($ilist['SNO'] == $edit->itemid) {
				                $val = 'selected';
				            } else {
				                $val = '';
				            }
						echo '<option value="'.$ilist['SNO'].'" ' . $val . ' >'.$ilist['ITEMNAME'].'</option>'; } } ?>
					</select>
					<div class="fv-plugins-message-container invalid-feedback" id="itemnameedit_err"></div>
				</div>
				<label class="col-lg-4 col-form-label required fw-semibold fs-6">SubItem Name</label>
				<div class="col-lg-8 fv-row fv-plugins-icon-container">
					<select class="form-select form-select-solid" name="subitemnameedit" id="subitemnameedit" data-control="select2"  data-dropdown-parent="#kt_modal_edit_jewel">	
						<option value="">Select</option>
						
					</select>
					<div class="fv-plugins-message-container invalid-feedback" id="subitemnameedit_err"></div>
				</div>
				<label class="col-lg-4 col-form-label required fw-semibold fs-6 mt-4">Jewel</label>
				<div class="col-lg-8 mt-4">
					<!--begin::Image input-->

					<div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url('<?php echo base_url(); ?>assets/images/jewel.jpg')">
						<!--begin::Preview existing avatar-->
						<?php  if($edit->itemimage!=''){?> 
							<div class="image-input-wrapper" id="image_wrapperedit" style="background-image: url(<?php echo base_url() ?>assets/gallery/<?php echo $edit->itemimage ; ?>)"></div>
						<?php }else{ ?>
						    <div class="image-input-wrapper"  id="image_wrapperedit" style="background-image: url(<?php echo base_url() ?>assets/images/jewel.jpg)"></div>
						<?php } ?>
						<!--begin::Label-->
						<label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" data-kt-initialized="1">
							<i class="bi bi-pencil-fill fs-7"></i>
							<!--begin::Inputs-->
							<input type="file" name="itemimageedit" id="itemimageedit" accept=".png, .jpg, .jpeg" value="<?php echo $edit->itemimage; ?>">
								<input type="text" name="old_img" id="old_img"  value="<?php echo  $edit->itemimage?$edit->itemimage:''; ?>">

							<input type="hidden" name="avatar_remove">
							<!--end::Inputs-->
						</label>
						<!--end::Label-->
						<!--begin::Cancel-->
						<span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" data-kt-initialized="1">
							<i class="bi bi-x fs-2"></i>
						</span>
						<!--end::Cancel-->
						<!--begin::Remove-->
						<span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" data-kt-initialized="1">
							<i class="bi bi-x fs-2"></i>
						</span>
						<!--end::Remove-->
					</div>
					<!--end::Image input-->
					<!--begin::Hint-->
						<div class="form-text">Allowed file types:  png, jpg, jpeg <br> <span class="text-danger">(Max.size 3 mb)</span>. </div>
					<!--end::Hint-->
					<div class="fv-plugins-message-container invalid-feedback" id="itemimageedit_err"></div>
				</div>
				
			</div>
			<div class="d-flex justify-content-center align-items-center mt-8">
				<button type="reset" class="btn btn-secondary me-3" data-bs-dismiss="modal">Cancel</button>
				<button type="submit" class="btn btn-primary">Update Gallery</button>
			</div>
		</form>
	</div>
</div>
<!--end::Modal dialog-->
</div>
<input type="hidden" id="baseurl" value="<?php echo base_url(); ?>">
<?php $this->load->view("script.php");?>
<script>
	$('#itemimageedit').on('change', function() {
	  const size = (this.files[0].size / 1024 / 1024).toFixed(2);
	  if (size > 5) {

	    // alert("File size must be less than or equal to 3 MB");
	    Swal.fire({
				title: 'File Error!',
				text:  'File size must be less than or equal to 3 MB..',
				icon:  'error',
				confirmButtonText: 'Okay'
				});

	    var old_img = $('#old_img').val();
	    if (old_img!='') {
	    	img = 'background-image: url(<?php echo base_url() ?>assets/gallery/<?php echo $edit->itemimage ; ?>)';
	    }else{
	    	img = 'background-image: url(<?php echo base_url() ?>assets/images/jewel.jpg)';
	    }
	    $('#itemimageedit').val('');
	    document.getElementById('image_wrapperedit').style=img;
	  } 
	});
		var baseurl= $("#baseurl").val();
		itemchangeedit();
		function itemchangeedit(){

			var item  = $('#itemnameedit').val();
			var subid = '<?php echo $edit->subitemid?$edit->subitemid:''; ?>';

			// alert(item);

			$.ajax({
			        type: "POST",
			        url: baseurl+'Gallery/subitemdropdownedit',
			        async: false,
			        type: "POST",
			        data: "typeid="+item+"&sub_id="+subid,
			        dataType: "html",
			        success: function(response)
			        {
						
			          $('#subitemnameedit').empty().append(response);

			        }
			});

		}



</script>

<script>
	function edit_validation() 
	{
		var err = 0;
		var itemnameedit    = $('#itemnameedit').val();
		var subitemnameedit = $('#subitemnameedit').val();
		var itemimageedit   = $('#itemimageedit').val();
		if(itemnameedit.trim()=='')
	    {
	        $('#itemnameedit_err').html('Select Item is Required !');
	        err++;
	    }
	    else
	    {
	       
			$('#itemnameedit_err').html('');
			
	    }

	    if(subitemnameedit.trim()=='')
	    {
	        $('#subitemnameedit_err').html('Select Subitem is Required !');
	        err++;
	    }
	    else
	    {
	       
			$('#subitemnameedit_err').html('');
			
	    }
	    if(itemimageedit.trim()=='')
	    {
	        $('#itemimageedit_err').html('Select Jewel Image is Required !');
	        err++;
	    }
	    else
	    {
	       
			$('#itemimageedit_err').html('');
			
	    }
		

	  if(err>0){ return false; }else{ return true; }
	}
	

</script>