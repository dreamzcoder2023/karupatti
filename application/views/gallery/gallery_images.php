<?php $this->load->view("common");?>
<style>
	.dataTables_scroll
    {
        position: relative;
        overflow: auto;
        min-height: 200px;
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
		<script>if ( document.documentElement ) { const defaultThemeMode = "system"; const name = document.body.getAttribute("data-kt-name"); let themeMode = localStorage.getItem("kt_" + ( name !== null ? name + "_" : "" ) + "theme_mode_value"); if ( themeMode === null ) { if ( defaultThemeMode === "system" ) { themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light"; } else { themeMode = defaultThemeMode; } } document.documentElement.setAttribute("data-theme", themeMode); }</script>
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
									<h1 class="d-flex align-items-center text-dark fw-bold my-1 fs-3">Gallery
									<!--begin::Separator-->
									<span class="h-20px border-gray-200 border-start ms-3 mx-2"></span>
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
										<!--begin::Card body-->
										<div class="card-body py-4">
											<div class="loader">
											</div>
											
											<div class="row">
												<label class="col-lg-1 col-form-label fw-semibold fs-6"><span class="fw-bold text-gray-800 cursor-pointer text-hover-primary fs-3 fs-xl-1"><?php foreach($subitem as $slist){ echo $slist['SUBITEM_NAME'];   } ?></span></label>
												<div class="col-lg-2 fv-row fv-plugins-icon-container">
													
												</div>
											
												<div class="col-lg-2 fv-row fv-plugins-icon-container">
												
												</div>
												<div class="col-lg-2 fv-row fv-plugins-icon-container">
												
											</div>
												</div>
											
											<div class="row">
											<?php  foreach($subitem as $slist){  $img_count=0;?>
												<?php $tagged_detail =$this->db->query("SELECT * FROM tag_entry WHERE subitem_name='".$slist['SUB_ID']."'  ")->result_array(); ?>
													<?php foreach($tagged_detail as $tlist){ 
														
														$image_url =  base_url().'tag_img/'. $tlist['img']; 
														if(@getimagesize($image_url)){
														?>
												<div class="col-lg-2">
													<!--begin::Overlay-->
													

													<a class="d-block overlay" data-fslightbox="lightbox-basic"  href=" <?php echo base_url() ?>tag_img/<?php echo $tlist['img']; ?>">
													    <!--begin::Image-->
													    <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded min-h-175px"
													        style="background-image:url('<?php echo base_url() ?>tag_img/<?php echo $tlist['img']; ?>')">
													    </div>
													    <!--end::Image-->
													    <!--begin::Action-->
													    <div class="overlay-layer card-rounded bg-dark bg-opacity-25 shadow">
													        <i class="bi bi-eye-fill text-white fs-2x"></i>
													    </div>
													    <!--end::Action-->
													</a>
													<?php  ?>
													<!--end::Overlay-->
													<div class="mb-2">
														<!--begin::Title-->
														<div class="text-center">
															<span class="fw-bold text-gray-800 cursor-pointer text-hover-primary fs-3 fs-xl-1"><?php // echo $slist['SUBITEM_NAME'] ?></span>
														</div>
														<!--end::Title-->
													</div>
												</div>
												<?php $img_count+=1; }
											} 
											if($img_count==0){ ?>
												<div class="col-lg-2">
													<!--begin::Overlay-->
													

													<a class="d-block overlay" data-fslightbox="lightbox-basic" href="assets/gallery/1.jpg">
													    <!--begin::Image-->
													    <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded min-h-175px"
													        style="background-image:url('assets/gallery/1.jpg')">
													    </div>
													    <!--end::Image-->
													    <!--begin::Action-->
													    <div class="overlay-layer card-rounded bg-dark bg-opacity-25 shadow">
													        <i class="bi bi-eye-fill text-white fs-2x"></i>
													    </div>
													    <!--end::Action-->
													</a>
													<?php  ?>
													<!--end::Overlay-->
													<div class="mb-2">
														<!--begin::Title-->
														<div class="text-center">
															<span class="fw-bold text-gray-800 cursor-pointer text-hover-primary fs-3 fs-xl-1"><?php echo $slist['SUBITEM_NAME'] ?></span>
														</div>
														<!--end::Title-->
													</div>
												</div>
											<?php 
											}  } ?>
												
											
											</div>
										</div>
										<!--end::Card body-->
									</div>
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
		<?php $this->load->view("script");?>

		<script src="assets/plugins/custom/fslightbox/fslightbox.bundle.js"></script>

<script>
		function get_subitem(){
		// alert(val);
        var aid = $('#item').val()
        var baseurl= $("#baseurl").val();
	
		res=aid.split('_'); 
		item_type=res[0];
		item_id=res[1];
	
        $.ajax({
        type: "POST",
        url: baseurl+'Gallery/get_subitem',
        async: false,
        type: "POST",
        data: "typeid="+item_id,
        dataType: "html",
        success: function(response)
        {
			
        $('#subitem').empty().append(response);

        }
	

        });
		}
		</script>
		<script>
			function send_via()
			{
				var send_via_dbox = document.getElementById("send_via_dbox").value;
				var others_label = document.getElementById('others_label');
				var others_tbox = document.getElementById('others_tbox');
				 if (send_via_dbox=="OTHERS") 
				  {
				  	others_label.style.display = "block";
				  	others_tbox.style.display = "block";
				  }
				  else
				  {
				  	others_label.style.display = "none";
				  	others_tbox.style.display = "none";
				  }
			}
		</script>
		<script>
		      $("#add_jst_tag_table").kendoTooltip({
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
			$("#add_jst_tag_table").DataTable({
				// "sorting":false,
				// "paging": false,
				 "aaSorting":[],
				//"responsive": true,
				 "language": {
				  "lengthMenu": "Show _MENU_",
				 },
				 "dom":
				  "<'row'" +
				  // "<'col-sm-6 d-flex align-items-center justify-conten-start'l>" +
				  // "<'col-sm-6 d-flex align-items-center justify-content-end'f>" +
				  ">" +

				  "<'table-responsive'tr>" +

				  "<'row'" +
				  "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
				  // "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
				  ">"
				});
			$('#add_jst_tag_table').wrap('<div class="dataTables_scroll" />');
		</script>
		<script>
		      $("#add_jst_nontag_table").kendoTooltip({
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
			$("#add_jst_nontag_table").DataTable({
				// "sorting":false,
				// "paging": false,
				 "aaSorting":[],
				//"responsive": true,
				 "language": {
				  "lengthMenu": "Show _MENU_",
				 },
				 "dom":
				  "<'row'" +
				  // "<'col-sm-6 d-flex align-items-center justify-conten-start'l>" +
				  // "<'col-sm-6 d-flex align-items-center justify-content-end'f>" +
				  ">" +

				  "<'table-responsive'tr>" +

				  "<'row'" +
				  "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
				  // "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
				  ">"
				});
			$('#add_jst_nontag_table').wrap('<div class="dataTables_scroll" />');
		</script>
	</body>
	<!--end::Body-->
</html>