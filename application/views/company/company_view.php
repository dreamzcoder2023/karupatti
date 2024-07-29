<!--begin::Modal dialog-->
<div class="modal-dialog modal-xl">
	<!--begin::Modal content-->
	<div class="modal-content rounded">
		<!--begin::Modal header-->
		<div class="modal-header justify-content-end border-0 pb-0">
			<!--begin::Close-->
			<div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal" >
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
		<!--begin::Modal body-->
		<form name="company_view_form" id="company_view_form" method="POST" action="<?php echo base_url(); ?>company/company_view" enctype="multipart/form-data" >
			<input type="hidden" id="company_id" name="company_id" value="<?php echo $company_details->COMPANYCODE;?>">
		<div class="modal-body pt-0 pb-15 px-5 px-xl-20">
			<!--begin::Heading-->
			<div class="mb-13 text-center">
				<h1 class="mb-3">View Company Details</h1>
			</div>
			<!--end::Heading-->
			<!--end::Heading-->
			<div class="row mt-3">													
				<!--begin::Label-->
				<label class="col-lg-1   fw-semibold fs-6"> Name</label>
				<!--end::Label-->
				<!--begin::Col-->
				<div class="col-lg-3">
					<label class="fw-bold fs-5"><?php echo $company_details->COMPANYNAME; ?></label> 
				</div>
				<!--end::Col-->
				
				<!--begin::Label-->
				<label class="col-lg-1   fw-semibold fs-6">Address</label>
				<!--end::Label-->
				<!--begin::Col-->
				<div class="col-lg-3 fv-row fv-plugins-icon-container">
					<label class="fw-bold fs-5"><?php echo $company_details->ADDRESS1;?></label>
				</div>
				<!--end::Col-->
				<!--begin::Label-->
				<label class="col-lg-1   fw-semibold fs-6">Address</label>
				<!--end::Label-->
				<!--begin::Col-->
				<div class="col-lg-3 fv-row fv-plugins-icon-container">
					<label class="fw-bold fs-5"><?php echo $company_details->ADDRESS2;?></label>
				</div>
			</div>
			<div class="row mt-3">	
				<!--begin::Label-->
				<label class="col-lg-1   fw-semibold fs-6">City</label>
				<!--end::Label-->
				<!--begin::Left Section-->
				<div class="col-lg-3">
				<!--begin::Select-->
					<label class="fw-bold fs-5"><?php echo $company_details->CITY; ?></label>
					<!--end::Select-->
				</div>
				<!--end::Left Section-->
				<!--begin::Label-->
				<label class="col-lg-1   fw-semibold fs-6">Pincode</label>
				<!--end::Label-->
				<!--begin::Col-->
				<div class="col-lg-3">
				    <label class="fw-bold fs-5"><?php echo $company_details->PINCODE;?></label>
				</div>
				<!--end::Col-->
				<!--begin::Label-->
				<label class="col-lg-1   fw-semibold fs-6">State</label>
				<!--end::Label-->
				<!--begin::Left Section-->
				<div class="col-lg-3">
					<label class="fw-bold fs-5"><?php echo $company_details->STATE; ?></label>
				</div>
			</div>
			<div class="row mt-3">	
				<!--begin::Label-->
				<label class="col-lg-1   fw-semibold fs-6">Phone</label>
				<!--end::Label-->
				<!--begin::Col-->
				<div class="col-lg-3">
					<label class="fw-bold fs-5"><?php echo $company_details->PHONE; ?></label>
				</div>
				<!--end::Col-->
				
				<!--begin::Label-->
				<label class="col-lg-1   fw-semibold fs-6">Email</label>
				<!--end::Label-->
				<!--begin::Col-->
				<div class="col-lg-3">
				  <label class="fw-bold fs-5"><?php echo $company_details->EMAIL; ?></label>
				</div>
				<!--end::Col-->							
				<!--begin::Label-->
				<label class="col-lg-1   fw-semibold fs-6">PAN No</label>
				<!--end::Label-->
				<!--begin::Col-->
				<div class="col-lg-3">
				<label class="fw-bold fs-5"><?php echo $company_details->PAN_NO; ?></label>
				</div>
				<!--end::Col-->
			</div>
			<div class="row mt-3">	
				<!--begin::Label-->
				<label class="col-lg-1   fw-semibold fs-6">GSTIN</label>
				<!--end::Label-->
				<!--begin::Col-->
				<div class="col-lg-3 fv-row fv-plugins-icon-container">
					<label class="fw-bold fs-5"><?php echo $company_details->GST_NO; ?></label>
				</div>
				<!--end::Col-->
				<!--begin::Label-->
				<label class="col-lg-1   fw-semibold fs-6">Reg No.</label>
				<!--end::Label-->
				<!--begin::Col-->
				<div class="col-lg-3 fv-row fv-plugins-icon-container">
					<label class="fw-bold fs-5"><?php echo $company_details->REGNO; ?></label>
				</div>
				<!--end::Col-->
				<!--begin::Label-->
				<label class="col-lg-1   fw-semibold fs-6">B. Type</label>
				<!--end::Label-->
				<!--begin::Col-->
				<div class="col-lg-3 fv-row fv-plugins-icon-container">
					<!--begin::Select-->
					<label class="fw-bold fs-5">
						<?php 
							if($company_details->BUSINESS_TYPE==0){
								echo "Jewel Business"; 
							}
							else if($company_details->BUSINESS_TYPE==2)  {
								echo "Others Business";
							}
							else if($company_details->BUSINESS_TYPE==1)  {
								echo "Loan Business";
							}else{
								echo "-";
							}
						?>
					</label>
					<!--end::Select-->
				</div>
				<!--end::Col-->							
			</div>
			<div class="row mt-3">								
				<!--begin::Label-->
				<label class="col-lg-1   fw-semibold fs-6">Code</label>
				<!--end::Label-->
				<!--begin::Col-->
				<div class="col-lg-3 fv-row fv-plugins-icon-container">
					<label class="fw-bold fs-5"><?php echo $company_details->LOGINCODE; ?><label class="fw-bold fs-5">
				</div>
				
				<!--begin::Label-->
				<label class="col-lg-1   fw-semibold fs-6">Logo</label>
				<!--end::Label-->
				<!--begin::Col-->
				<div class="col-lg-3">
					<!--begin::Overlay-->
					<!--begin::Image-->
					<?php if ($company_details->COMPANY_LOGO) {?>
						<!--begin::Preview existing avatar-->
						<a class="d-block overlay" target="_blank" data-fslightbox="lightbox-basic" href="<?php echo base_url()?>assets/images/company_logo/<?php echo $company_details->COMPANY_LOGO ; ?>">
							<div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded w-100px h-100px"
							style="background-image:url('<?php echo base_url()?>assets/images/company_logo/<?php echo $company_details->COMPANY_LOGO ; ?>');border:solid black 1px;"></div>
							<!--end::Preview existing avatar-->
							<div class="overlay-layer card-rounded bg-dark bg-opacity-25 shadow w-100px h-100px">
							<i class="bi bi-eye-fill text-white fs-2x"></i>
							</div> 
						</a>
					<?php } else{ ?>
						<a class="d-block overlay" target="_blank" data-fslightbox="lightbox-basic" href="<?php echo base_url()?>assets/images/agb_logo.jpg">
							<div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded w-100px h-100px"
							style="background-image:url('<?php echo base_url()?>assets/images/agb_logo.jpg')"></div>
							<!--end::Preview existing avatar-->
							<div class="overlay-layer card-rounded bg-dark bg-opacity-25 shadow w-100px h-100px">
							<i class="bi bi-eye-fill text-white fs-2x"></i>
							</div> 
						</a>
					<?php } ?>
					<!--end::Image-->
				<!--end::Overlay-->
				</div>
			</div>
		<!--end::Modal body-->
	</div>
	<!--end::Modal content-->
</div>
<!--end::Modal dialog-->