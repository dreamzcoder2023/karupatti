<!--begin::Table body-->
										<!--<tbody class="text-gray-600 fw-semibold">
											<?php $i=1; foreach($logdetails_list as $logdetailslist){?>-->
											<!--begin::Table row-->
										<!--	<tr>-->
												<!--begin::User=-->
											<!--	<td class="cy">
													<?php echo $logdetailslist['LOG_DATE'];?>-->
												<!--</td>-->
												<!--end::User=-->
												<!--begin::Role=-->
											<!--	<td>
													<?php echo $logdetailslist['TRANS_NO'];?>-->
											<!--	</td>-->
												<!--end::Role=-->
												<!--begin::Last login=-->
											<!--	<td>-->
													<?php echo $logdetailslist['LOG_DETAILS'];?>
												</td>
												<!--end::Last login=-->
												<!--begin::Two step=-->
												<td>
													<?php echo $logdetailslist['LOG_CODE'];?>
												</td>
												<!--end::Two step=-->
												<!--begin::Joined-->
												<td>
													<?php echo $logdetailslist['ADDED_USER'];?>
												</td>
											
											</tr>
											<?php $i++;}?>
											<!--end::Table row-->
										</tbody>
										<!--end::Table body-->

$deptpid = $this->input->post('filterpid');
$deptcontid = $this->input->post('filtercontid');

if($deptpid != '')
{
    $dptpval = "AND ps.project_id='".$deptpid."'";
}
else{
    $dptpval = '';
}

if($deptcontid != '')
{
    $dptcontval = "AND ps.contractor_id='".$deptcontid."'";
}
else{
    $dptcontval = '';
}


$data['structure_list'] = $this->db->query("SELECT ps.*,p.project_name,e.name,c.company_name,st.structure_type FROM project_structure ps, project p, employee e,company c,structure_type st WHERE ps.project_id = p.project_id AND ps.employee_ids = e.employee_id AND p.company_id = c.company_id AND ps.structure_type_id = st.structure_type_id AND ps.status!=2 $dptpval $dptcontval")->result_array();