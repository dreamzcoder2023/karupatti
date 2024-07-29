<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/* ************************************************************************************
		Purpose : To handle all Supplier functions 2022-08-19
***************************************************************************************/
class Suppliers extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model(array("Suppliers_model"));
    	// $this->load->library('user_agent');

        $fin_year=$this->Suppliers_model->get_fin_years_list();
        $db=substr($fin_year->DBNAME,0,strlen($fin_year->DBNAME)-4);
        // echo $db;exit();

        $config_app = switch_db_dynamic($db);
        $this->Suppliers_model->other_db = $this->load->database($config_app,TRUE);

    	if (isset($this->session->userdata['username']) && $this->session->userdata['username'] == TRUE)
        {
            //do something
        }else{
            redirect('login'); //if session is not there, redirect to login page
        } 
		date_default_timezone_set("Asia/Kolkata");
    	$this->session->set_userdata('comtitle', 'Suppliers');
	}

    public function index()
    {   
         
        $data['states_list'] = $this->Suppliers_model->get_states_list();
        $data['idtype_list'] = $this->Suppliers_model->get_idtype_list();
        $data['group_list'] = $this->Suppliers_model->get_acc_group_list();
        $data['op_list'] = $this->Suppliers_model->get_op_list_list();
        $data['suppliers_list'] = $this->Suppliers_model->get_suppliers_list();
        $data['acc_ledgers_list'] = $this->Suppliers_model->get_acc_ledgers_list();
        // print_r($data['suppliers_list']);
        // exit();
        $this->load->view('Suppliers/suppliers_list',$data);
    }

    public function suppliers_active()

    {
        $id = $this->input->post('id');
        $data['Status'] = $this->input->post('Status');
        $result = $this->Suppliers_model->suppliers_active($data,$id);
        echo $data['status'];
        if ($result) {
            if ($data['status']==1) {
                $this->session->set_flashdata('g_success', 'Supplier has been Deactive successfully.');
            }else{
                $this->session->set_flashdata('g_success', 'Supplier has been Active successfully.');
            }
        }
        else{
            $this->session->set_flashdata('g_err', 'Something went wrong');
        }
    }


     public function supplier_phone_unique()
    {
        $val = $_POST['value'];
        $result = $this->Suppliers_model->supplier_phone_unique($val);
        echo count((array)$result);
    }
    public function suppliers_phone_unique_edit()
    {
        $val = $_POST['value'];
        $result = $this->Suppliers_model->suppliers_phone_unique_edit($val);
        echo count((array)$result);
    }

    public function suppliers_save()
    {   
        

        $data['supp_name'] = $this->input->post('add_suppname_supplier');
        $data['supp_addr'] = $this->input->post('add_addr_supplier');
        $data['supp_zone'] = $this->input->post('add_zone_supplier');
        $data['supp_city'] = $this->input->post('add_city_supplier');
        $data['supp_state'] = $this->input->post('state_list_supplier');
        $data['supp_accgrp'] = $this->input->post('accgrp_list_supp');
        $data['supp_chkpredefined'] =$this->input->post('checkpredefined_suppliers');
        $data['supp_phone'] = $this->input->post('add_phone_supplier');
        $data['supp_email'] = $this->input->post('add_email_supplier');
        $data['supp_id_type'] = $this->input->post('add_idtype_list_supp');
        // $data['supp_id_no'] = $this->input->post('add_id_no_supplier');
        $data['supp_pan_no'] = $this->input->post('add_pan_no_supplier');
        // $data['supp_cin_no'] = $this->input->post('add_cin_no_supplier');
        $data['supp_gst_no'] = $this->input->post('add_gstin_no_supplier');
        $data['supp_op_bal'] = $this->input->post('add_op_bal_supplier');
        $data['supp_op_dr'] = $this->input->post('add_op_dr_supp');


        if ($data['supp_op_dr']=='DR') {

            $data['debit']  =$data['supp_op_bal'];
            $data['balance']=$data['supp_op_bal'];
            
        }else{

            $data['debit']  = 0;

        }
        if ($data['supp_op_dr']=='CR') {

            $data['credit']  = $data['supp_op_bal'];
            $data['balance'] = $data['supp_op_bal'];
            
        }else{

            $data['credit']=0;


        }


        $data['supp_rmks'] = $this->input->post('add_remarks_suppliers');
        $data['added_user'] = $_SESSION['username'];
        $data['company_code'] = $_SESSION['COMPANYCODE'];
        $data['created_on'] = date('Y-m-d H:i:s');

        $group_id = $this->Suppliers_model->get_group_id_list();
        $data['supp_group_id'] = $group_id->GROUP_SNO;

        $super_id = $this->Suppliers_model->get_super_id_list();
        $data['supp_super_id'] = $super_id->AC_SUPER_ID;

        // print_r($data);exit();

        $last_sno_detail = $this->Suppliers_model->get_last_sno_details();
  
        $last_data = $last_sno_detail->KEYVALUE;
        //echo $last_data;exit;
        //$exlno = substr($last_data,5);
        $next_value = (int)$last_data + 1;

        // $uid='L'.str_pad(5,00000,$next_value);

        $uid='L'.str_pad($next_value,5);
        //$s_no=$r_no1;
        $data['supp_id'] = $uid;



        // print_r($data);

        $result = $this->Suppliers_model->add_suppliers($data);

        if ($result) {
            $result2 = $this->Suppliers_model->add_suppliers_partymaster($data);
            $res     = $this->Suppliers_model->get_updated_keyvalue();
        }else{
            $result2='';
        }
        
        // print_r($result);
        // exit();
        if($result2)
        {
            $this->session->set_flashdata('g_success', 'Supplier have been added successfully...');
        }else{
           $this->session->set_flashdata('g_err', 'Could not add supplier details!');
        }
        redirect('Suppliers');

    }

    //To Delete Suppliers
    public function suppliers_delete()
    {
        $sno = $data['sno']=$_POST['id'];
        $data['suppliers_list'] = $this->Suppliers_model->get_suppliers_details_id_delete($sno);
        $data['get_suppliers_details_id_delete_partymaster'] = $this->Suppliers_model->get_suppliers_details_id_delete_partymaster($sno);
        $data['sup_name'] = $data['suppliers_list']?$data['suppliers_list']->LEDGER_NAME:'-';
        // print_r($sno);exit();
        // $data['suppliers_list'] = $this->other_db->query("SELECT * FROM ACC_LEDGERS WHERE LEDGER_SNO='".$sno."'")->row();
        // print_r("SELECT * FROM ACC_LEDGERS WHERE LEDGER_SNO='".$sno."'");exit();
        // print_r($data['suppliers_list']);exit();
        $this->load->view('Suppliers/suppliers_delete',$data);
    }

    public function delete()
    { 
        $sno=$_POST['field'];
        $result = $this->Suppliers_model->suppliers_delete($sno);
        $result = $this->Suppliers_model->suppliers_delete_partymaster($sno);

        if ($result) {
            $this->session->set_flashdata('g_success', 'Supplier has been deleted successfully.');
        }
        else{
            $this->session->set_flashdata('g_err', 'Something went wrong');
        }
    }

    //Suppliers Edit
    public function suppliers_edit()
    {
        $suppid = $_POST['id'];
        $data['states_list'] = $this->Suppliers_model->get_states_list();
        $data['group_list'] = $this->Suppliers_model->get_acc_group_list();
        $data['idtype_list'] = $this->Suppliers_model->get_idtypeedit_list();       
        $data['op_list'] = $this->Suppliers_model->get_op_list_list();
        $data['suppliers_list_edit'] = $this->Suppliers_model->get_suppliers_details_id($suppid);

        // print_r($data);exit();
        $this->load->view('Suppliers/suppliers_edit',$data);

         // print_r($data);exit();
    
    }

    //To update Suppliers
    public function suppliers_update()

    {   

        $data['edit_suppliers'] = $this->input->post('edit_suppliers'); 
        $data['supp_name'] = $this->input->post('edit_suppname_supplier');
        $data['supp_addr_edit'] = $this->input->post('edit_suppaddress_supplier');
        $data['supp_zone_edit'] = $this->input->post('edit_zone_supplier');
        // $data['supp_area_edit'] = $this->input->post('edit_area_supplier');
        $data['supp_city_edit'] = $this->input->post('edit_city_supplier');
        // $data['supp_village_edit'] = $this->input->post('edit_village_supplier');
        // $data['supp_street_edit'] = $this->input->post('edit_street_supplier');
        $data['supp_state_ed'] = $this->input->post('state_list_supplier_edit');
        $data['supp_accgroup_edit'] = $this->input->post('accgrp_list_supp_edit');
        $data['supp_phone_edit'] = $this->input->post('edit_phone_supplier');
        $data['supp_email_edit'] = $this->input->post('edit_email_supplier');
        $data['supp_id_type_edit'] = $this->input->post('edit_id_ty_supplier');
        // $data['supp_id_no_edit'] = $this->input->post('edit_id_no_supplier');
        $data['supp_pan_no_edit'] = $this->input->post('edit_pan_no_supplier');
        // $data['supp_cin_no_edit'] = $this->input->post('edit_cin_no_supplier');
        $data['supp_gstin_no_edit'] = $this->input->post('edit_gstin_no_supplier');
        $data['supp_op_bal_edit'] = $this->input->post('edit_op_bal_supplier');
        $data['supp_op_dr_edit'] = $this->input->post('edit_op_dr_supp');
        $data['supp_remarks_edit'] = $this->input->post('edit_remarks_suppliers');
        $data['added_user_edit'] = $_SESSION['username'];
        $data['company_code_edit'] = $_SESSION['COMPANYCODE'];
        $data['modified_on_edit'] = date('Y-m-d H:i:s');

        $result = $this->Suppliers_model->update_suppliers($data);

        $result = $this->Suppliers_model->update_suppliers_partymaster($data);        

         // print_r($result);exit();
        
        if($result)
        {
            $this->session->set_flashdata('g_success', 'Suppliers details have been updated successfully...');
        }else{
           $this->session->set_flashdata('g_err', 'Could not update suppliers details!');
        }
        redirect('Suppliers');


    }


    // To View the Supplier Details

    public function suppliers_view()
    {
        
        $supp_vw = $_POST['id'];
        // $data['company_list'] = $this->staff_model->get_company_list();
        // $data['city_list'] = $this->staff_model->get_city_list();
        // $data['role_list'] = $this->staff_model->get_role_list();
        $data['suppliers_view_list'] = $this->Suppliers_model->get_suppliers_view($supp_vw);
        $this->load->view('Suppliers/suppliers_view',$data);

    }

}
?>