


<div class="modal-dialog modal-md">
<!--begin::Modal content-->
<div class="modal-content rounded">
	<!--begin::Modal header-->
	<div class="modal-header justify-content-end border-0 pb-0">
		<!--begin::Close-->
		<div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
			<!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
			<span class="svg-icon svg-icon-1" onclick="closeModal()">
				<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
					<rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="currentColor" />
					<rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="currentColor" />
				</svg>
			</span>
			
		</div>
		<!--end::Close-->
	</div>
	<!--end::Modal header-->
	<!--begin::Modal body-->
	<div class="modal-body pt-0 pb-8 px-5 px-xl-20">
		<!--begin::Heading-->
		<div class="mb-7 text-center">
			<h3><?php echo $details->sale_id?$details->sale_id:'-'; ?> Order OnHold</h3>
		</div>
		<!--end::Heading-->
		<div class="row">
			<label class="col-lg-4 col-form-label fw-semibold fs-6">Reason</label>
			<div class="col-lg-8 fv-row fv-plugins-icon-container">
				<textarea class="form-control form-select-solid fw-semibold fs-5" rows="4" id="reason_on_hold" name="reason_on_hold"></textarea>
			</div>
		</div>
		<div class="mt-4 d-flex justify-content-center">
				<button type="reset" class="btn btn-secondary me-2" data-bs-dismiss="modal" onclick="closeModal()">Cancel</button>
				<button type="submit" class="btn btn-primary" id="" onclick="hold_order('<?php echo $details->sid;?>')">Yes</button>
		</div>
	</div>
	<!--end::Modal body-->
</div>
<!--end::Modal content-->
</div>