<?php $this->load->view("common");?>

<style>
	.dataTables_scroll
    {
        position: relative;
        overflow: auto;
        max-height: 200px;/*the maximum height you want to achieve*/
        width: 100%;
    }
  .dataTables_scroll thead{
    position: -webkit-sticky;
    position: sticky;
    top: 0;
   background-color: #ec9629;
    z-index: 2;
  }
</style>
	<!--begin::Body-->
	<body data-kt-name="metronic" id="kt_body" class="header-fixed header-tablet-and-mobile-fixed toolbar-enabled toolbar-fixed aside-enabled aside-fixed">
		<!--begin::Theme mode setup on page load-->
		<script>if ( document.documentElement ) { const defaultThemeMode = "system"; const name = document.body.getAttribute("data-kt-name"); let themeMode = localStorage.getItem("kt_" + ( name !== null ? name + "_": "" ) + "theme_mode_value"); if ( themeMode === null ) { if ( defaultThemeMode === "system" ) { themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light"; } else { themeMode = defaultThemeMode; } } document.documentElement.setAttribute("data-theme", themeMode); }</script>
		<!--end::Theme mode setup on page load-->
		<!--begin::Main-->
		<!--begin::Root-->
		<div class="d-flex flex-column flex-root">
			<!--begin::Page-->
			<div class="page d-flex flex-row flex-column-fluid">
			<?php $this->load->view("sidebar");?>

				<!--begin::Wrapper-->
				<div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
				<?php $this->load->view("header");?>

				<!--begin::Toolbar-->
					<div class="toolbar py-2" id="kt_toolbar">
						<!--begin::Container-->
						<div id="kt_toolbar_container" class="container-fluid d-flex align-items-center">
							<!--begin::Page title-->
							<div class="flex-grow-1 flex-shrink-0 me-5">
								<!--begin::Page title-->
								<div data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
									<!--begin::Title-->
									<h1 class="d-flex align-items-center text-dark fw-bold my-1 fs-3">Tagged Item Barcode Print
									<!--begin::Separator-->
									<span class="h-20px border-gray-400 border-start ms-3 mx-2"></span>
									<!--end::Separator-->
									<!--begin::Description-->
									<!--end::Description--></h1>
									<!--end::Title-->
								</div>
								<!--end::Page title-->
							</div>
							<!--end::Page title-->
							
						</div>
						<!--end::Container-->
					</div>
					<!--end::Toolbar-->	
					<!--begin::Content-->
					<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
						<!--begin::Container-->
						<div id="kt_content_container" class="container-xxl">
							<!--begin::Row-->
							<div class="row gy-5 g-xl-8">
								<!--begin::Col-->
								<div class="col-xxl-8">
									<!--begin::Tables Widget 9-->
									<div class="card card-xxl-stretch mb-5 mb-xl-8">
									<form action="<?php echo base_url(); ?>tagentry/tag_entry_pos" method="POST" >
										<!--begin::Card body-->
										<div class="card-body py-4">
											<div class="d-flex align-items-center justify-content-end mt-2">
												<button type="submit" class="btn btn-sm btn-primary">Print Barcode</button>
											</div>
											<div class="row">
												<table id="kt_datatable_barcode_print" class="table align-middle table-row-dashed table-striped table-hover fs-7 gy-1 gs-2 dataTable">
													<thead>
													  <tr class="text-start text-muted fw-bold fs-7 gs-0">
													   	<th class="min-w-50px">
													   		<div class="fv-row fv-plugins-icon-container fv-plugins-bootstrap5-row-invalid d-flex align-items-center">
																	<div class="d-flex align-items-center">
																		<label class="form-check form-check-inline form-check-solid is-invalid">
																			<input class="form-check-input" type="checkbox" id="select_all" name="select_all"  onclick="select_all1()"> 
																			<span class="col-form-label fw-bold fs-7">Select</span>
																		</label>
																	</div>
																</div>
													   	</th>
													    <th class="min-w-100px">Tag No</th>
															<th class="min-w-100px">Img</th>
															<th class="min-w-200px">Item Name</th>
															<th class="min-w-200px">Subitem Name</th>
															<th class="min-w-150px">Metal Wgt(gms)</th>
													  </tr>
													</thead>
													<tbody class="text-gray-600 fw-semibold">
													<?php $i=0; foreach($tagentry_list as $tlist){ ?>
														<tr>
									            <td>
									            	<div class="fv-row fv-plugins-icon-container fv-plugins-bootstrap5-row-invalid d-flex align-items-center">
																	<div class="d-flex align-items-center">
																		<label class="form-check form-check-inline form-check-solid is-invalid">
																		<input class="form-check-input count_checkbox" type="checkbox" name="checkbox[]" id="checkbox<?php echo $i; ?>" value="<?php echo $tlist['tag_id']; ?>" onclick="select_all2()">
																		</label>
																	</div>
																</div>
									            </td>
									            <td><?php echo $tlist['tag_id']; ?></td>
									            <td>
												<?php	$image_url =  base_url().'tag_img/'. $tlist['img']; 
if(@getimagesize($image_url)){
	?>
	 <a href="javascript:;" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm">
										            	<div class="image-input" data-kt-image-input="true">
																			<div class="image-input-wrapper w-40px h-40px" style="background-image: url(<?php echo base_url() ?>tag_img/<?php echo $tlist['img']; ?>)"></div>
																		</div>
																	</a>
 	
	<?php 
 }else{
	?>
 <a href="javascript:;" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm">
										            	<div class="image-input" data-kt-image-input="true">
																			<div class="image-input-wrapper w-40px h-40px" style="background-image: url(<?php echo base_url() ?>assets/media/svg/avatars/blank_jwl.svg)"></div>
																		</div>
																	</a>
 	
	<?php
	}										?>											
									            </td>
									            <td> <?php  $item_name  = $this->db->query("SELECT * FROM ITEMS WHERE  SNO='". $tlist['item_name']."' ")->row();
																			echo $item_name->ITEMNAME; ?></td>
									            <td><?php 
																			$subitem_name  = $this->db->query("SELECT * FROM SUBITEM_LIST WHERE  SUB_ID='". $tlist['subitem_name']."' ")->row();
																			echo $subitem_name->SUBITEM_NAME; ?></td>
									            <td><?php echo $tlist['metal_weight']; ?></td>
									        	</tr>
												<?php $i++; } ?>
														
													</tbody>
												</table>
											</div>
										</div>
									</div>
									</form>
									<!--end::Tables Widget 9-->
								</div>
								<!--end::Col-->
							</div>
							<!--end::Row-->
						</div>
						<!--end::Container-->
					</div>
					<!--end::Content-->
					<?php $this->load->view("footer");?>

				</div>
				<!--end::Wrapper-->
			</div>
			<!--end::Page-->
		</div>
		<!--end::Root-->
		<!--begin::Modal - View Jewel Image-->
		<div class="modal fade" id="kt_modal_view_jewel_img" tabindex="-1" aria-hidden="true">
			<!--begin::Modal dialog-->
			<div class="modal-dialog modal-xs">
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
							
						</div>
						<!--end::Close-->
					</div>
					<!--end::Modal header-->
					<!--begin::Modal body-->
					<div class="modal-body">
						<div class="d-flex justify-content-center">
							<div class="image-input" data-kt-image-input="true">
								<div class="image-input-wrapper w-250px h-250px" style="background-image: url(assets/images/sample_jewel.jpg)"></div>
							</div>
						</div>
					</div>
					<!--end::Modal body-->
				</div>
				<!--end::Modal content-->
			</div>
			<!--end::Modal dialog-->
		</div>
		<!--end::Modal -View Jewel Image-->

		<!--begin::Modal - Verify tag entry-->
		<div class="modal fade" id="kt_modal_verify_tag_entry" tabindex="-1" aria-hidden="true">
			<!--begin::Modal dialog-->
			<div class="modal-dialog modal-m">
				<!--begin::Modal content-->
				<div class="modal-content rounded">
					<div class="swal2-icon swal2-warning swal2-icon-show" style="display: flex;">
						<div class="swal2-icon-content">&#x2713;</div></div>
						<div class="swal2-html-container" id="swal2-html-container" style="display: block;">
							<b><span>TG-0001/23</span><span> - Chain </span><span>- Hand Chain<br></span></b>
							<p class="mt-2">Are you sure you want to Approve?</p></div>
						<div class="d-flex flex-center flex-row-fluid pt-12">
							<button type="submit" class="btn btn-primary me-3" data-bs-dismiss="modal">Yes</button>
							<button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
						</div><br><br>
				</div>
				<!--end::Modal content-->
			</div>
			<!--end::Modal dialog-->
		</div>
		<!--end::Modal - Verify tag entry-->
		<?php $this->load->view("script");?>

	
		<script>

function select_all1(){

// alert(1);
var count=$('.count_checkbox').length;
var select_all = document.getElementById("select_all");
if(select_all.checked){
for(i=0;i<count;i++){
$('#checkbox'+i).prop('checked', true);
}
}
else{
for(i=0;i<count;i++){
$('#checkbox'+i).prop('checked', false);
}
}
}

		</script>

		<script>
      $("#kt_datatable_barcode_print").kendoTooltip({
        filter: "td",
        show: function(e){
          if(this.content.text() !=""){
            $('[role="tooltip"]').css("visibility", "visible");
          }
        },
        hide: function(){
          $('[role="tooltip"]').css("visibility", "hidden");
        },
        content: function(e){
          var element = e.target[0];
          if(element.offsetWidth < element.scrollWidth){
            return e.target.text();
          }else{
            return "";
          }
        }
      })
		</script>
		<script>
			$("#kt_datatable_barcode_print").DataTable({
				
				// "responsive": true,
				// "aaSorting":[],
				"sorting":false,
				 "language": {
				  "lengthMenu": "Show _MENU_",
				 },
				 "dom":
				  "<'row'" +
				  "<'col-sm-6 d-flex align-items-center justify-conten-start'l>" +
				  "<'col-sm-6 d-flex align-items-center justify-content-end'f>" +
				  ">" +

				  "<'table-responsive'tr>" +

				  "<'row'" +
				  "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
				  "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
				  ">"
				});
		</script>
	</body>
	<!--end::Body-->
</html>