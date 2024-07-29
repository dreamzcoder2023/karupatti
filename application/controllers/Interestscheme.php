<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/* ************************************************************************************
		Purpose : To handle all Interestscheme functions 2022-08-19
***************************************************************************************/
class Interestscheme extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model(array("Interestscheme_model"));
    	$this->load->library('user_agent');
    	if (isset($this->session->userdata['username']) && $this->session->userdata['username'] == TRUE)
        {
            //do something
        }else{
            redirect('login'); //if session is not there, redirect to login page
        } 
		date_default_timezone_set("Asia/Kolkata");
    	$this->session->set_userdata('comtitle', 'Interest Scheme');
	}

    public function index()
    {
        
        $data['company_list'] = $this->Interestscheme_model->get_company_list();
        $data['group_list'] = $this->Interestscheme_model->get_group_list();
        $status = $this->input->post('status');
        $data['sts_list'] = $status;
        if($status != '')
        {
            $sts = "WHERE I.ACTIVE = '".$status."'";
        }
        else{
            $sts = "";
        }
        //$data['status_list'] = $this->Interestscheme_model->get_status_list($sts);
        $data['intscheme_list'] = $this->Interestscheme_model->get_interestscheme_list($sts);
        $this->load->view('Interest_scheme/intscheme_list',$data);
    }
    public function interestscheme_save()
    {
        // $data['INTID'] = $this->input->post('INTID');
        $data['add_sl_company_int_scheme'] = $this->input->post('add_sl_company_int_scheme');
        $data['add_sname_int_scheme'] = $this->input->post('add_sname_int_scheme');
        $data['add_sl_group_int_scheme'] = $this->input->post('add_sl_group_int_scheme');
        $data['add_sl_def_ln_ty_int_scheme'] = $this->input->post('add_sl_def_ln_ty_int_scheme');
        $data['add_interest_int_scheme'] = $this->input->post('add_interest_int_scheme');
        $data['add_ln_period_int_scheme'] = $this->input->post('add_ln_period_int_scheme');
        $data['add_lp_type_int_scheme'] = $this->input->post('add_lp_type_int_scheme');
        $data['add_mx_period_int_scheme'] = $this->input->post('add_mx_period_int_scheme');
        $data['add_mp_type_int_scheme'] = $this->input->post('add_mp_type_int_scheme');
        // $data['created_on'] = date('Y-m-d H:i:s');
        // $data['created_by'] = 1;
        $last_item_detail = $this->Interestscheme_model->get_last_item_details();

        $last_data= $last_item_detail->INTID;
        $next_value = (int)$last_data + 1;
        $uid=str_pad($next_value,3,0,STR_PAD_LEFT);
        $data['intid'] = $uid;
        // print_r($data);exit;
        $result = $this->Interestscheme_model->interestscheme_save($data);
          if($result){
                $this->session->set_flashdata('g_success', 'Interest Scheme have been Added successfully...');
          }else{
               $this->session->set_flashdata('g_err', 'Could not add Interest Scheme details!');
          }
        redirect('Interestscheme'); 

    }
    // public function interestscheme_sort()
    // {
    //     $data['status'] = $this->input->post('status');
    //     $result = $this->Interestscheme_model->interestscheme_sort($data);
    //     if($result){
    //             $this->session->set_flashdata('g_success', 'Interest Scheme Status have been Display successfully...');
    //       }else{
    //            $this->session->set_flashdata('g_err', 'Could not display Interest Scheme Status!');
    //       }
    //     redirect('Interestscheme'); 
    // }
    public function intsch_active(){
        $id = $this->input->post('id');
        $data['status'] = $this->input->post('status');
        // $data['modified_on'] = date('Y-m-d H:i:s');
        // $data['modified_by'] = $_SESSION['USERID'];
        $result = $this->Interestscheme_model->intsch_active($data,$id);
        echo 1;
    }
    //Interest Scheme Edit
    public function intscheme_edit()
    {
        $intsid = $_POST['id'];
        $data['interestscheme_edit_details'] = $this->Interestscheme_model->get_interestscheme_by_interestscheme_id($intsid);
        // $data['intslist'] = $this->Interestscheme_model->get_ints_list();
        $data['company_list'] = $this->Interestscheme_model->get_company_list();
        $data['group_list'] = $this->Interestscheme_model->get_group_list();
        $data['default_loan_type_list'] = $this->Interestscheme_model->get_default_loan_type_list();
        $data['loan_period_type_list'] = $this->Interestscheme_model->get_loan_period_type_list();
        $data['max_period_type_list'] = $this->Interestscheme_model->get_max_period_type_list();
        $this->load->view('Interest_scheme/intscheme_edit',$data);

    }
    public function intscheme_view()
    {
        $intsid_view = $_POST['id'];
        $data['interestscheme_view_details'] = $this->Interestscheme_model->get_interestscheme_by_interestscheme_id_view($intsid_view);
        // $data['intslist'] = $this->Interestscheme_model->get_ints_list();
        // $data['company_list_view'] = $this->Interestscheme_model->get_company_list_view($intsid_view);
        // $data['group_list_view'] = $this->Interestscheme_model->get_group_list_view($intsid_view);
        // $data['default_loan_type_list_view'] = $this->Interestscheme_model->get_default_loan_type_list_view();
        // $data['loan_period_type_list_view'] = $this->Interestscheme_model->get_loan_period_type_list_view();
        // $data['max_period_type_list_view'] = $this->Interestscheme_model->get_max_period_type_list_view();
        $this->load->view('Interest_scheme/intscheme_view',$data);

    }
    public function interestscheme_update()
    {
        $data['edit_intid'] = $this->input->post('edit_intid');
        $data['edit_sl_company_int_scheme'] = $this->input->post('edit_sl_company_int_scheme');
        $data['edit_sname_int_scheme'] = $this->input->post('edit_sname_int_scheme');
        $data['edit_sl_group_int_scheme'] = $this->input->post('edit_sl_group_int_scheme');
        //print_r($_POST);exit();
        if($this->input->post('edit_de_ln_ty')=='on')
        {
            $data['edit_sl_def_ln_ty_int_scheme'] = $this->input->post('edit_sl_def_ln_ty_int_scheme');
        }
        else
        {
            $data['edit_sl_def_ln_ty_int_scheme'] = '';   
        }
        $data['edit_interest_int_scheme'] = $this->input->post('edit_interest_int_scheme');
        $data['edit_ln_period_int_scheme'] = $this->input->post('edit_ln_period_int_scheme');
        $data['edit_lp_type_int_scheme'] = $this->input->post('edit_lp_type_int_scheme');
        $data['edit_mx_period_int_scheme'] = $this->input->post('edit_mx_period_int_scheme');
        $data['edit_mp_type_int_scheme'] = $this->input->post('edit_mp_type_int_scheme');

        $result = $this->Interestscheme_model->update_ineterestscheme($data,$chech_box_loan_type);
        if($result)
        {
            $this->session->set_flashdata('g_success', 'Ineterest Scheme have been Updated successfully...');
        }else{
           $this->session->set_flashdata('g_err', 'Could not update Ineterest Scheme details!');
        }
        redirect('Interestscheme');
    }

    //To Delete Interest Scheme
    public function interestscheme_delete()
    {
        $uid = $data['intid']=$_POST['id'];
        $data['interestscheme_edit_details'] = $this->db->query("SELECT * FROM INTERESTLIST WHERE INTID=".$uid)->row();
        $this->load->view('Interest_scheme/intscheme_delete',$data);
    }

    public function delete()
    { 
        $bid=$_POST['field'];
        $result = $this->Interestscheme_model->interest_scheme_delete($bid);
        if ($result) {
            $this->session->set_flashdata('g_success', 'Ineterest Scheme has been Deleted successfully.');
        }
        else{
            $this->session->set_flashdata('g_err', 'Something went wrong');
        }
    }
    public function scheme_name_unique()
    {
        $val = $_POST['value'];
        $result = $this->Interestscheme_model->scheme_name_unique($val);
        echo count((array)$result);
    }
    public function scheme_name_unique_edit()
    {
        $val = $_POST['value'];
        $result = $this->Interestscheme_model->scheme_name_unique_edit($val);
        echo count((array)$result);
    }

    // //To save Department
    // public function department_save()
    // {
    //     $data['department'] = $this->input->post('department');
    //     $data['company_code'] = $_SESSION['COMPANYCODE'];
    //     $data['created_on'] = date('Y-m-d H:i:s');
    //     $data['created_by'] = $_SESSION['USERID'];

    //     $result = $this->Department_model->add_department($data);
    //     if($result)
    //     {
    //         $this->session->set_flashdata('g_success', 'Department have been Added successfully...');
    //     }else{
    //        $this->session->set_flashdata('g_err', 'Could not add Department details!');
    //     }
    //     redirect('department');
    // }

    // public function department_unique_edit()
    // {
    //     $val = $_POST['value'];
    //     $dcid = $_POST['dcid'];
    //     $result = $this->Department_model->department_unique_edit($val,$dcid);
    //     echo count((array)$result);
    // }

    // //To update Department

    // //To Delete Department
    // public function department_delete()
    // {
    //     $uid = $data['bid']=$_POST['id'];
    //     $data['department_details'] = $this->db->query("SELECT * FROM DEPARTMENT WHERE DEPARTMENTID='".$uid."'")->row();
    //     $this->load->view('department/department_delete',$data);
    // }

    // public function delete()
    // { 
    //     $bid=$_POST['field'];
    //     $result = $this->Department_model->department_delete($bid);
    //     if ($result) {
    //         $this->session->set_flashdata('g_success', 'Department has been Deleted successfully.');
    //     }
    //     else{
    //         $this->session->set_flashdata('g_err', 'Something went wrong');
    //     }
    // }

}
?>
