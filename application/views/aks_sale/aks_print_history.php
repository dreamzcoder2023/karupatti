
<div class="col-lg-12">
    <table class="table align-middle table-row-dashed table-striped table-hover fs-7 gy-1 gs-2" id="kt_datatable_aks_pos_print_history" style="margin: 0 auto;">
        <thead>
            <tr class="text-start text-muted fw-bold fs-7 gs-0">
                <th class="min-w-50px">S.No</th>
                <th class="min-w-150px">Company</th>
                <th class="min-w-100px">User</th>
                <th class="min-w-100px">Date & Time</th>
                <th class="min-w-80px">Count</th>
            </tr>
        </thead>
        <tbody class="text-gray-600 fw-semibold">
            <?php if(isset($print_history_list)){ 
                foreach ($print_history_list as $h => $hlist) { 

                    $p_date = date_format(date_create($hlist["created_on"]),'d-M-Y');
                    $p_time = date_format(date_create($hlist["created_on"]),'H:i');  
                    $pr_time = date("h:i A", strtotime($p_time));
                    $print_date = $p_date.' & '.$pr_time;       
            ?>
            <tr>
                <td>1</td>
                <td class="ple1"><?php echo $hlist['company_name']?$hlist['company_name']:'-'; ?></td>
                <td class="ple1"><?php echo ucfirst($hlist['created_by']?$hlist['created_by']:'-'); ?></td>
                <td>
                    <span class="badge badge-info fs-7"><?php echo $print_date; ?></span>
                </td>
                <td>
                    <span class="badge badge-primary fs-7 badge-circle text-black"><?php echo $hlist['entry_count']?$hlist['entry_count']:'-'; ?></span>
                </td>
            </tr>
            <?php $h++;} } ?>
        </tbody>
    </table>
</div>
<script>     
    $("#kt_datatable_aks_pos_print_history").kendoTooltip({
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
      });
</script>
<script>
    $("#kt_datatable_aks_pos_print_history").DataTable({
     "ordering": false,
     // "aaSorting":[],
     "paging":false,
     // "sorting":false,
      "language": {
       "lengthMenu": "Show _MENU_",
      },
      "dom":
       "<'row'" +
       "<'col-sm-6 d-flex align-items-center justify-conten-start'l>" +
       // "<'col-sm-6 d-flex align-items-center justify-content-end'f>" +
       ">" +

       "<'table-responsive'tr>" +

       "<'row'" +
       "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
       "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
       ">"
     });
    $('#kt_datatable_aks_pos_print_history').wrap('<div class="dataTables_scroll_aks_pos_print_history" />');
</script>
