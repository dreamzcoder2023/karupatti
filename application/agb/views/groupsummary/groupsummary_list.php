<?php $this->load->view("common");?>

		<link href="<?php echo base_url();?>assets/jquery.autocomplete.css" rel="stylesheet" type="text/css" />
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
									<h1 class="d-flex align-items-center text-dark fw-bold my-1 fs-3">Group Summary
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
				                        <?php if($this->session->flashdata('g_success')){?>
				                        <div class="alert alert-success" id="alertaddmessage">
				                         <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
				                        <?php echo $this->session->flashdata('g_success'); ?>
				                        </div>
				                        <?php } ?>

				                        <?php if($this->session->flashdata('g_err')){?>
				                        <div class="alert alert-success" id="alertaddmessage">
				                         <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
				                        <?php echo $this->session->flashdata('g_err'); ?>
				                        </div>
				                        <?php } ?>
										<form action="<?php echo base_url();?>groupsummary" method="post">
	                        				<div class="row px-4 py-6">
												<!-- <label class="col-lg-1 col-form-label fw-semibold fs-6">Select</label> -->
												<div class="col-lg-2 fv-row fv-plugins-icon-container">
													<label class="form-label">Account Group</label>
													<input type="text" class="form-control form-control-lg form-control-solid" name="account_group_name" id="account_group_name" onkeyup="ledger_autocomplete();" value="<?php echo $account_group_name;?>">
													<input type="hidden" class="form-control form-control-lg form-control-solid" name="account_group_id" id="account_group_id" value="<?php echo $account_group_id;?>">
													<br>
													<span id="opbal"></span>
												</div>
												<div class="col-lg-2 fv-row fv-plugins-icon-container">
													<label class="form-label">Filter By</label>
													<select class="form-select form-select-solid" data-control="select2" data-hide-search="true" id="filter_by" name="filter_by" onchange = "getDate(this.value);">	
														<option value="thisyear" <?php echo $filter_by=='thisyear'?'selected':'';?>>This Year</option>
														<option value="thismonth" <?php echo $filter_by=='thismonth'?'selected':'';?>>This Month</option>
														<option value="thisweek" <?php echo $filter_by=='thisweek'?'selected':'';?>>This Week</option>
														<option value="lastmonth" <?php echo $filter_by=='lastmonth'?'selected':'';?>>Last Month</option>
														<option value="lastweek" <?php echo $filter_by=='lastweek'?'selected':'';?>>Last Week</option>
													</select>
												</div>
												<div class="col-lg-2 fv-row">
														<label class="form-label">From</label>
													<div class="d-flex align-items-center">
														<input type="date" class="form-control form-control-solid ps-12" name="start_date" placeholder="Select" id="start_date" value="<?php echo $start_date; ?>" />
													</div>
												</div>
												<div class="col-lg-2 fv-row">
														<label class="form-label">To</label>
													<div class="d-flex align-items-center">
														<input type="date" class="form-control form-control-solid ps-12" name="end_date" placeholder="Select" id="end_date" value="<?php echo $end_date; ?>" />
													</div>
												</div>
									            <div class="col-lg-2 fv-row fv-plugins-icon-container">
													<button type="submit" class="btn btn-sm btn-outline btn-outline-solid btn-outline-warning btn-active-light-primary mt-9">Go</button>
												</div>
											</div>
										</form>
										<!--begin::Card body-->
										<div class="card-body py-4">
											<?php if($account_group_id!=''){
											?>
												<table class="table align-middle table-row-dashed table-striped table-hover fs-7 gy-1 gs-2" id="kt_datatable_dom_positioning">
													<!--begin::Table head-->
													<thead>
														<!--begin::Table row-->
														<tr class="text-start text-muted fw-bold fs-7 gs-0">
															<!-- <th class="min-w-125px cy" style="width: 20%;">Company</th> -->
															<th class="min-w-125px">SNo</th>
															<th class="min-w-125px">Ledger</th>
															<th class="min-w-125px">Group</th>
															<th class="min-w-125px">Debit</th>
															<th class="min-w-125px">Credit</th>
														</tr>
														<!--end::Table row-->
													</thead>
													<!--end::Table head-->
													<!--begin::Table body-->
													<tbody class="text-gray-600 fw-semibold">
														<?php 
															$total_cr_balance = 0;
															$total_dr_balance = 0;
															$acc_ledger_summary = $this->Groupsummary_model->get_account_ledger_closing_summary();
															if(count((array)$acc_ledger_summary)>0)
															{
																$i=1;foreach($acc_ledger_summary as $als)
																{?>
																	<tr>
																		<td><?php echo $i;?></td>
																		<td><?php echo $als['lgr_clsg_name'];?></td>
																		<td><?php echo $als['lgr_clsg_grup'];?></td>
																		<?php if($als['lgr_clsg_tsid']=='dr'){?>
																			<td align="right"><?php echo $als['lgr_clsg_tbal']!='0.00'?number_format($als['lgr_clsg_tbal'],2):'';?></td>
																			<td></td>
																		<?php $total_dr_balance = $total_dr_balance + $als['lgr_clsg_tbal'];}
																		else{?>
																			<td></td>
																			<td align="right"><?php echo $als['lgr_clsg_tbal']!='0.00'?number_format($als['lgr_clsg_tbal'],2):'';?></td>
																		<?php $total_cr_balance = $total_cr_balance + $als['lgr_clsg_tbal'];}?>
																	</tr>
																<?php $i++;}
															}
														?>
														<tr>
															<td></td>
															<td></td>
															<td><b>Total</b></td>
															<td align="right"><?php echo $total_dr_balance!='0.00'?number_format($total_dr_balance,2):'';?></td>
															<td align="right"><?php echo $total_cr_balance!='0.00'?number_format($total_cr_balance,2):'';?></td>
														</tr>
														<tr>
															<td></td>
															<td></td>
															<?php if($total_dr_balance > $total_cr_balance){?>
																<td><b>Closing Balance is... Dr</b></td>
																<td align="right"><?php echo number_format(($total_dr_balance - $total_cr_balance),2);?></td>
																<td align="right"></td>
															<?php }else if($total_cr_balance > $total_dr_balance){?>
																<td><b>Closing Balance is... Cr</b></td>
																<td align="right"></td>
																<td align="right"><?php echo number_format(($total_cr_balance - $total_dr_balance),2);?></td>
															<?php }else{?>
																<td><b>Closing Balance is... Cr</b></td>
																<td align="right"></td>
																<td align="right"><?php echo number_format(($total_cr_balance - $total_dr_balance),2);?></td>
															<?php }?>
														</tr>
													</tbody>
												</table>
											<?php }?>
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
		<!--End::View Company-->

		<input type="hidden" id="baseurl" value="<?php echo base_url();?>">
		<?php $this->load->view("script");?>
		<script src="<?php echo base_url();?>assets/jquery.autocomplete.js"></script>
		<script>

var title = $('title').text() + ' | ' + 'Group Summary';
    $(document).attr("title", title);

var base = $('#baseurl').val();



function isNumberKey(evt, obj)
{ 
    var charCode = (evt.which) ? evt.which : event.keyCode
    var value = obj.value;
    var dotcontains = value.indexOf(".") != -1;
    if (dotcontains)
        if (charCode == 46) return false;
    if (charCode == 46) return true;
    if (charCode > 31 && (charCode < 48 || charCode > 57))
        return false;
    return true;
}

// $('#kt_datatable_dom_positioning').DataTable( {
// 	"aaSorting": [],
//         dom: 'Bfrtip',
//         buttons: [
//             'copyHtml5',
//             'excelHtml5',
//             'csvHtml5',
//             'pdfHtml5'
//         ]
//     } );



function ledger_autocomplete(i)
{
	//alert(showparty);
	$("#account_group_name").autocomplete({ 
            valueKey:'title',
            source:[{
            url: base+'groupsummary/get_account_group?type=PRO_MANA&query=%QUERY%',
            type:'remote',
            ajax:{

              dataType : 'json',
            }
        }],
minLength: 3}).on('selected.xdsoft',function(e,suggestion,ui){ 
            $("#account_group_name").val(suggestion.title);
            $('#account_group_id').val(suggestion.id);
            //$('#opbal').html(suggestion.opbal);

            /*var pid = $('#account_group_id').val();
            //alert(pid);

            var baseurl= $("#baseurl").val();
			//alert(val);
			$.ajax({
			type: "POST",
			url: baseurl+'groupsummary/get_ledger_info',
			async: false,
			type: "POST",
			data: "id="+pid,
			dataType: "html",
			success: function(response)
			{
				//var resp = response.split('||');
				$('#opbal').html(response);
			}
			});*/
          
    });
        $("#account_group_name").focus();
}

function getDate(val)
{
	var baseurl= $("#baseurl").val();
	//alert(val);
	$.ajax({
	type: "POST",
	url: baseurl+'groupsummary/getDate',
	async: false,
	type: "POST",
	data: "val="+val,
	dataType: "html",
	success: function(response)
	{
		var resp = response.split('||');
		$('#start_date').val(resp[1]);
		$('#end_date').val(resp[2]);
	}
	});
}
		</script>
		<script>
			$("#kt_datatable_dom_positioning").DataTable({
			"ordering": false,
			// "aaSorting":[],
			// "buttons": [
			//             'copy', 'csv', 'excel', 'pdf', 'print'
			//         ],
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