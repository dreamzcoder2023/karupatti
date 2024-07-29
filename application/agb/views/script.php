		<!--begin::Javascript-->

		<script>var hostUrl = "assets/";</script>
		<!--begin::Global Javascript Bundle(used by all pages)-->
		<script src="<?php echo base_url();?>assets/plugins/global/plugins.bundle.js"></script>
		<script src="<?php echo base_url();?>assets/js/scripts.bundle.js"></script>
		<!--end::Global Javascript Bundle-->
		<!--begin::Vendors Javascript(used by this page)-->
		<script src="<?php echo base_url();?>assets/plugins/custom/fullcalendar/fullcalendar.bundle.js"></script>
		<script src="<?php echo base_url();?>assets/js/amcharts/index.js"></script>
		<script src="<?php echo base_url();?>assets/js/amcharts/xy.js"></script>
		<script src="<?php echo base_url();?>assets/js/amcharts/percent.js"></script>
		<script src="<?php echo base_url();?>assets/js/amcharts/radar.js"></script>
		<script src="<?php echo base_url();?>assets/js/amcharts/Animated.js"></script>
		<script src="<?php echo base_url();?>assets/js/amcharts/map.js"></script>
		<script src="<?php echo base_url();?>assets/js/amcharts/worldLow.js"></script>
		<script src="<?php echo base_url();?>assets/js/amcharts/continentsLow.js"></script>
		<script src="<?php echo base_url();?>assets/js/amcharts/usaLow.js"></script>
		<script src="<?php echo base_url();?>assets/js/amcharts/worldTimeZonesLow.js"></script>
		<script src="<?php echo base_url();?>assets/js/amcharts/worldTimeZoneAreasLow.js"></script>
		<script src="<?php echo base_url();?>assets/plugins/custom/datatables/datatables.bundle.js"></script>
		<script src="<?php echo base_url();?>assets/js/custom/apps/file-manager/list.js"></script>
		<script src="<?php echo base_url();?>assets/js/custom/apps/user-management/users/list/table.js"></script>
		<!-- <script src="< ?php echo base_url();?>assets/js/custom/apps/user-management/users/list/export-users.js"></script> -->
		<!-- <script src="< ?php echo base_url();?>assets/js/custom/apps/user-management/users/list/add.js"></script> -->
		<!--end::Vendors Javascript-->
		<!--begin::Custom Javascript(used by this page)-->
		<script src="<?php echo base_url();?>assets/js/widgets.bundle.js"></script>
		<script src="<?php echo base_url();?>assets/js/custom/widgets.js"></script>
		<script src="<?php echo base_url();?>assets/js/custom/apps/chat/chat.js"></script>
		<script src="<?php echo base_url();?>assets/js/custom/utilities/modals/upgrade-plan.js"></script>
		<script src="<?php echo base_url();?>assets/js/custom/utilities/modals/create-campaign.js"></script>
		<script src="<?php echo base_url();?>assets/js/custom/utilities/modals/offer-a-deal/type.js"></script>
		<script src="<?php echo base_url();?>assets/js/custom/utilities/modals/offer-a-deal/details.js"></script>
		<script src="<?php echo base_url();?>assets/js/custom/utilities/modals/offer-a-deal/finance.js"></script>
		<script src="<?php echo base_url();?>assets/js/custom/utilities/modals/offer-a-deal/complete.js"></script>
		<script src="<?php echo base_url();?>assets/js/custom/utilities/modals/offer-a-deal/main.js"></script>
		<script src="<?php echo base_url();?>assets/js/custom/utilities/modals/new-card.js"></script>
		<script src="<?php echo base_url();?>assets/js/custom/utilities/modals/new-address.js"></script>
		<script src="<?php echo base_url();?>assets/js/custom/utilities/modals/users-search.js"></script>
		
		<!-- <script src="< ?php echo base_url();?>assets/js/custom/authentication/sign-in/general.js"></script> -->
		<script src="<?php echo base_url();?>assets/plugins/custom/fslightbox/fslightbox.bundle.js"></script>
		<!-- <script src="< ?php echo base_url();?>assets/custom_js/sweetalert.js"></script> -->
    	<script src="https://kendo.cdn.telerik.com/2022.2.621/js/kendo.all.min.js"></script>
    	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.13.1/xlsx.full.min.js"></script> 
    	<style type="text/css">
			
			 .tooltipcopie {
			  position: absolute;
			/*  top: -25px;*/
			/*  left: 50%;*/
			/*  transform: translateX(-50%);*/
			  background-color: #000;
			  color: #fff;
			  padding: 3px 13px 3px 10px;
			  border-radius: 5px;
			  opacity: 0;
			  transition: opacity 0.3s ease;
			}

			.tooltipcopie.shows {
			  opacity: 1;
			}

		</style>
    	<script type="text/javascript">

			function copiedclipboardagno(billno, id) {
			  var textArea = document.createElement("textarea");
			  textArea.value = billno;
			  document.body.appendChild(textArea);
			  textArea.select();
			  document.execCommand("copy");
			  document.body.removeChild(textArea);

				let tooltip = document.getElementById("tooltipcopie" + id);
					tooltip.style.display = "block";
					tooltip.innerHTML = 'Copied!';
					tooltip.classList.add("shows");
					setTimeout(function() {
					  tooltip.classList.remove("shows");
					  tooltip.innerHTML = '';
					}, 2000);


			}
  		</script>
		<script type="text/javascript">

			setTimeout(function() 
			{
				$(".loader").fadeOut("slow");
			}, 2000);
			// window.scrollTo(0, 0);
			
		</script>
		<script>
			$("#kt_datepicker_jewel_settlement_issue_date").flatpickr({
				dateFormat: "d-m-Y",
			});
		</script>
		<script>
			$("#kt_datepicker_old_gold_sales_entry_billdate").flatpickr({
				dateFormat: "d-m-Y",
			});
		</script>
		<script>
	      $("#jl_fl_set").kendoTooltip({
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
	      $("#ol_gl_sl_entry").kendoTooltip({
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
	      $("#rp_receipt").kendoTooltip({
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
			function normal() {

				var nor = document.getElementById("norm");

				var newrp = document.getElementById("new_rpbill");
		        new_rpbill.style.display = norm.checked ? "block" : "none";
		        var new_rpbill_tbox = document.getElementById("new_rpbill_tbox");
		        new_rpbill_tbox.style.display = norm.checked ? "block" : "none";

		        var trans = document.getElementById("transf");

		        var newrp = document.getElementById("new_rpbill");
		        new_rpbill.style.display = transf.checked ? "block" : "none";
		        var new_rpbill_tbox = document.getElementById("new_rpbill_tbox");
		        new_rpbill_tbox.style.display = transf.checked ? "block" : "none";

		    }
		    function transfer() {

				var trans = document.getElementById("transf");

		        var newrp = document.getElementById("new_rpbill");
		        new_rpbill.style.display = transf.checked ? "block" : "none";
		        var new_rpbill_tbox = document.getElementById("new_rpbill_tbox");
		        new_rpbill_tbox.style.display = transf.checked ? "block" : "none";
		    }
		</script>
		<script>
	      $("#kt_datatable_responsive_repledgereturn").kendoTooltip({
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
	      $("#acc_ledger_list").kendoTooltip({
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
<script type="text/javascript">
$(document).ready(function (){
setTimeout(function(){
$('.alert').fadeOut('fast');
            }, 3000);
}); 
</script>
		<!--end::Custom Javascript-->
		<!--end::Javascript-->

		<script>
			 $('#kt_modal_daylock').on('show.bs.modal', function (e) {
				  var taskFlatpickrConfig = {
				      enableTime: true,
				      altInput: true,
				      time_12hr:false,
				      // dateFormat: "d-m-Y h:i K"
				      altFormat: "d-m-Y h:i K"
				  };
				  var taskFlatpickrConfig_1 = {
				      enableTime: true,
				      noCalendar: true,
				      // altInput: true,
				      altFormat: "h:i K"
				  };

					var test = flatpickr("#daylock_st_date", taskFlatpickrConfig);
				   var test = flatpickr("#kt_datepicker_daylock_end_date", taskFlatpickrConfig);
				});
		</script>
		