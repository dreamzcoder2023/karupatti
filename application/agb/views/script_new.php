<!--begin::Javascript-->
		<script>var hostUrl = "assets/";</script>
		<!--begin::Global Javascript Bundle(used by all pages)-->
		<script src="assets/plugins/global/plugins.bundle.js"></script>
		<script src="assets/js/scripts.bundle.js"></script>
		<!--end::Global Javascript Bundle-->
		<!--begin::Vendors Javascript(used by this page)-->
		<script src="assets/plugins/custom/fullcalendar/fullcalendar.bundle.js"></script>
		<script src="assets/js/amcharts/index.js"></script>
		<script src="assets/js/amcharts/xy.js"></script>
		<script src="assets/js/amcharts/percent.js"></script>
		<script src="assets/js/amcharts/radar.js"></script>
		<script src="assets/js/amcharts/Animated.js"></script>
		<script src="assets/js/amcharts/map.js"></script>
		<script src="assets/js/amcharts/worldLow.js"></script>
		<script src="assets/js/amcharts/continentsLow.js"></script>
		<script src="assets/js/amcharts/usaLow.js"></script>
		<script src="assets/js/amcharts/worldTimeZonesLow.js"></script>
		<script src="assets/js/amcharts/worldTimeZoneAreasLow.js"></script>
		<script src="assets/plugins/custom/datatables/datatables.bundle.js"></script>
		<script src="assets/js/custom/apps/file-manager/list.js"></script>
		<script src="assets/js/custom/apps/user-management/users/list/table.js"></script>
		<script src="assets/js/custom/apps/user-management/users/list/export-users.js"></script>
		<script src="assets/js/custom/apps/user-management/users/list/add.js"></script>
		<script src="assets/js/custom/documentation/forms/select2.js"></script>
		<script src="assets/js/custom/documentation/search.js"></script>
		<script src="assets/js/custom/documentation/documentation.js"></script>
		<script src="assets/plugins/custom/formrepeater/formrepeater.bundle.js"></script>
		<!--end::Vendors Javascript-->
		<!-- starting js validation-->
		<script src="js/label-print.js"></script>
		<script src="js/settings-option.js"></script>
		<script src="js/loan-days.js"></script>
		<script src="js/loan-receipts.js"></script>
		<script src="js/newhfloan-list.js"></script>
		<script src="js/jewelfinal-settlement.js"></script>
		<script src="js/oldgoldsales-entry.js"></script>
		<!-- Ending js validation-->
		<script src="js/sms.js"></script>
		<script src="js/mobileapp.js"></script>
		<script src="js/watsapp.js"></script>
		<script src="js/email.js"></script>
		<!--begin::Custom Javascript(used by this page)-->
		<script src="assets/js/widgets.bundle.js"></script>
		<script src="assets/js/custom/widgets.js"></script>
		<script src="assets/js/custom/apps/chat/chat.js"></script>
		<script src="assets/js/custom/utilities/modals/upgrade-plan.js"></script>
		<script src="assets/js/custom/utilities/modals/create-campaign.js"></script>
		<script src="assets/js/custom/utilities/modals/offer-a-deal/type.js"></script>
		<script src="assets/js/custom/utilities/modals/offer-a-deal/details.js"></script>
		<script src="assets/js/custom/utilities/modals/offer-a-deal/finance.js"></script>
		<script src="assets/js/custom/utilities/modals/offer-a-deal/complete.js"></script>
		<script src="assets/js/custom/utilities/modals/offer-a-deal/main.js"></script>
		<script src="assets/js/custom/utilities/modals/new-card.js"></script>
		<script src="assets/js/custom/utilities/modals/new-address.js"></script>
		<script src="assets/js/custom/utilities/modals/users-search.js"></script>
		<script src="assets/js/custom/authentication/sign-in/general.js"></script>
    	<script src="https://kendo.cdn.telerik.com/2022.2.621/js/kendo.all.min.js"></script>
    	<!-- calculator start -->
    	<script src="assets/calculator/main.js"></script>
		<script src="assets/calculator/Calculator.js"></script>
		<script src="assets/calculator/Calculations.js"></script>

		<script src="assets/js/webcam/jquery.min.js"></script>
		<script src="assets/js/webcam/webcam.min.js"></script>
		<!-- calculator end -->
    	<script>
    		$("#kt_datepicker_cstart").flatpickr({
				dateFormat: "d-m-Y",
			});
			$("#kt_datepicker_cend").flatpickr({
				dateFormat: "d-m-Y",
			});
			$("#kt_datepicker_nstart").flatpickr({
				dateFormat: "d-m-Y",
			});
			$("#kt_datepicker_nend").flatpickr({
				dateFormat: "d-m-Y",
			});
			$("#kt_datepicker_new_hf_loan_date").flatpickr({
				dateFormat: "d-m-Y",
			});
			$("#kt_datepicker_new_hf_loan_duedate").flatpickr({
				dateFormat: "d-m-Y",
			});
			$("#kt_datepicker_repledgereceipt").flatpickr({
				dateFormat: "d-m-Y",
			});
			$("#kt_daterangepicker_repledge_return_date").flatpickr({
				dateFormat: "d-m-Y",
			});
		</script>
    	<script>
			function nom_radio_hf_loan()
			{
				var nominee_radio_hf_loan = document.getElementById("nominee_radio_hf_loan");
				var nominee_id_hf_loan = document.getElementById("nominee_id_hf_loan");
				var nominee_id_tbox_hf_loan = document.getElementById("nominee_id_tbox_hf_loan");
				var relation_id_hf_loan = document.getElementById("relation_id_hf_loan");
				var relation_id_tbox_hf_loan = document.getElementById("relation_id_tbox_hf_loan");

				if (nominee_radio_hf_loan.checked == true)
				{
				    nominee_id_hf_loan.style.display = "block";
				    nominee_id_tbox_hf_loan.style.display = "block";
				    relation_id_hf_loan.style.display = "block";
				    relation_id_tbox_hf_loan.style.display = "block";
			  	} else 
			  	{
			     	nominee_id_hf_loan.style.display = "none";
				    nominee_id_tbox_hf_loan.style.display = "none";
				    relation_id_hf_loan.style.display = "none";
				    relation_id_tbox_hf_loan.style.display = "none";
			  	}
			}
		</script>
		<script>
				$("#kt_datatable_dom_positioning_add_hf_loan").DataTable({
					// "ordering": false,
					"aaSorting":[],
					 "language": {
					  "lengthMenu": "Show _MENU_",
					 },
					 "dom":
					  "<'row'" +
					  ">" +

					  "<'table-responsive'tr>" +

					  "<'row'" +
					  ">"
					 
					});
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
	      $("#settings_jl_fl_set").kendoTooltip({
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
				$("#settings_jl_fl_set").DataTable({
					// "ordering": false,
					"aaSorting":[],
					 "language": {
					  "lengthMenu": "Show _MENU_",
					 },
					 "dom":
					  "<'row'" +
					  ">" +

					  "<'table-responsive'tr>" +

					  "<'row'" +
					  ">"
					 
					});
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
				$("#ol_gl_sl_entry").DataTable({
					// "ordering": false,
					"aaSorting":[],
					 "language": {
					  "lengthMenu": "Show _MENU_",
					 },
					 "dom":
					  "<'row'" +
					  ">" +

					  "<'table-responsive'tr>" +

					  "<'row'" +
					  ">"
					 
					});
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
			$("#kt_datatable_responsive_repledgereturn").DataTable({
				 // "ordering": false,
				 "sorting":false,
				"paging": false,
				 // "aaSorting":[],
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
			$('#kt_datatable_responsive_repledgereturn').wrap('<div class="dataTables_scroll_repledge_return" />');
		</script>
		<!--end::Custom Javascript-->
		<script>
			$("#kt_datepicker_ledgerview_from").flatpickr({
				dateFormat: "d-m-Y",
			});
			$("#kt_datepicker_ledgerview_to").flatpickr({
				dateFormat: "d-m-Y",
			});
			$("#kt_datepicker_combinedreport_from").flatpickr({
				dateFormat: "d-m-Y",
			});
			$("#kt_datepicker_combinedreport_to").flatpickr({
				dateFormat: "d-m-Y",
			});
			$("#kt_datepicker_combinedreport_month").flatpickr({
				dateFormat: "d-m-Y",
			});
			$("#kt_datepicker_repledgedreports_month").flatpickr({
				dateFormat: "d-m-Y",
			});
			$("#kt_datepicker_weightwisereport_from").flatpickr({
				dateFormat: "d-m-Y",
			});
			$("#kt_datepicker_weightwisereport_to").flatpickr({
				dateFormat: "d-m-Y",
			});
			$("#kt_datepicker_financialsummary_from").flatpickr({
				dateFormat: "d-m-Y",
			});
			$("#kt_datepicker_financialsummary_to").flatpickr({
				dateFormat: "d-m-Y",
			});
			$("#kt_datepicker_interestsummary_from").flatpickr({
				dateFormat: "d-m-Y",
			});
			$("#kt_datepicker_interestsummary_to").flatpickr({
				dateFormat: "d-m-Y",
			});
			$("#kt_datepicker_businessregister_from").flatpickr({
				dateFormat: "d-m-Y",
			});
			$("#kt_datepicker_businessregister_to").flatpickr({
				dateFormat: "d-m-Y",
			});
			
			$("#kt_datepicker_hand_loan_receipts_date").flatpickr({
				dateFormat: "d-m-Y",
			});
			$("#kt_datepicker_hand_loan_summary_date").flatpickr({
				dateFormat: "d-m-Y",
			});
		</script>
		<script>
			$('input:radio[name="int_radio_handrec_report"]').change(function() {
		        if ($(this).val()=='select_int_value_handrec_report') 
		        {
		        	// alert("if");
		            $('#int_group_tbox_handrec_report').attr('disabled',true);
		        } else
		        {
		            $('#int_group_tbox_handrec_report').removeAttr('disabled');
		            // alert("else");
		        }
		    });
		    $('input:radio[name="int_radio_handrec_report"]').change(function() {
		        if ($(this).val()=='int_group_value_handrec_report') 
		        {
		            $('#select_interest_tbox_handrec_report').attr('disabled',true);
		        } else
		        {
		            $('#select_interest_tbox_handrec_report').removeAttr('disabled');
		        }
		    });
		</script>
		
		<!--end::Javascript-->
		<script>
			$("#kt_datepicker_loan_receipts_date").flatpickr({
				dateFormat: "d-m-Y",
			});
		</script>
		<script>
		function daily_comb_click()
			{
				var daily_comb = document.getElementById("daily_comb");
				var monthly_comb = document.getElementById("monthly_comb");
				var period_comb = document.getElementById("period_comb");
				var start_comb = document.getElementById("start_date_comb");
				var end_comb = document.getElementById("end_date_comb");
				var blockeffect = document.getElementById("blockeffect_comb");

				if (daily_comb.checked == true)
				{
				   start_date_comb.style.display = "none";
				   end_date_comb.style.display = "none";
				   start_month_comb.style.display="none";
				   blockeffect_comb.style.display="none";
			  	}
			  	else 
			  	{
			     	start_month_comb.style.display = "none";
			     	start_date_comb.style.display = "none";
				    end_date_comb.style.display = "none";
				    blockeffect_comb.style.display="none";
			  	}
			}

		</script>
		<script>
			function monthly_comb_click()
			{
				var daily_comb = document.getElementById("daily_comb");
				var monthly_comb = document.getElementById("monthly_comb");
				var period_comb = document.getElementById("period_comb");
				var start_comb_month = document.getElementById("start_month_comb");
				var blockeffect = document.getElementById("blockeffect_comb");

				if (monthly_comb.checked == true)
				{
				   start_month_comb.style.display = "block";
				   start_date_comb.style.display = "none";
				   end_date_comb.style.display = "none";
				   blockeffect_comb.style.display="block";
				   
			  	} 
			  	else 
			  	{
			     	start_month_comb.style.display = "none";
			     	start_date_comb.style.display = "none";
				    end_date_comb.style.display = "none";
				    blockeffect_comb.style.display="none";
			  	}
			}
		</script>
		<script>
			function period_comb_click()
			{
				var daily_comb = document.getElementById("daily_comb");
				var monthly_comb = document.getElementById("monthly_comb");
				var period_comb = document.getElementById("period_comb");
				var start_comb_month = document.getElementById("start_month_comb");

				if (period_comb.checked == true)
				{
				   start_month_comb.style.display = "none";
				   start_date_comb.style.display = "block";
				   end_date_comb.style.display = "block";
				   blockeffect_comb.style.display="block";

				   
			  	} else 
			  	{
			     	start_month_comb.style.display = "none";
			     	start_date_comb.style.display = "none";
				    end_date_comb.style.display = "none";
				    blockeffect_comb.style.display="none";
			  	}			  	
			}
		</script>
<script>
	$('input:radio[name="int_radio_rere_col_report"]').change(function() {
        if ($(this).val()=='select_int_value_rere_col_report') 
        {
        	// alert("if");
            $('#int_group_tbox_rere_col_report').attr('disabled',true);
        } else
        {
            $('#int_group_tbox_rere_col_report').removeAttr('disabled');
            // alert("else");
        }
    });
    $('input:radio[name="int_radio_rere_col_report"]').change(function() {
        if ($(this).val()=='int_group_value_rere_col_report') 
        {
            $('#select_interest_tbox_rere_col_report').attr('disabled',true);
        } else
        {
            $('#select_interest_tbox_rere_col_report').removeAttr('disabled');
        }
    });
</script>