<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/* ************************************************************************************
		Purpose : To handle all Department functions 2022-08-19
***************************************************************************************/
class Documentcharge extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model(array("Documentcharge_model"));
    	$this->load->library('user_agent');
    	if (isset($this->session->userdata['username']) && $this->session->userdata['username'] == TRUE)
        {
            //do something
        }else{
            redirect('login'); //if session is not there, redirect to login page
        } 
		date_default_timezone_set("Asia/Kolkata");
    	$this->session->set_userdata('comtitle','Documentcharge');
	}

    public function index()
    {
        $data['document_list'] = $this->Documentcharge_model->get_documentcharge_list();
        $this->load->view('documentcharge/doc_charge_list',$data);
    }

    public function doc_charge_active()
    

    {
        $id = $this->input->post('id');
        $data['Active'] = $this->input->post('status');
        $result = $this->Documentcharge_model->doc_charge_active($data,$id);
        echo 1;
    }

    public function doc_charge_save()

    {

        $data['from_amount'] = $this->input->post('from_amount');
        $data['to_amount'] = $this->input->post('to_amount');
        $data['dc_amount'] = $this->input->post('dc_amount');
        $data['created_on'] = date('Y-m-d H:i:s');
        $data['created_by'] = $_SESSION['USERID'];

        $last_doc_id_detail = $this->Documentcharge_model->get_last_id_details();
  
        $last_data= $last_doc_id_detail->DC_ID;
        //echo $last_data;exit;
        //$exlno = substr($last_data,5);
        $next_value = (int)$last_data + 1;
        $uid=str_pad($next_value,3,0,STR_PAD_LEFT);
        //$s_no=$r_no1;
        $data['doc_id'] = $uid;
        //print_r($data);exit;

        $result = $this->Documentcharge_model->add_doc_charge($data);
        if($result)
        {
            $this->session->set_flashdata('g_success', 'Document charge have been Added successfully...');
        }else{
           $this->session->set_flashdata('g_err', 'Could not add Document charge details!');
        }
        redirect('Documentcharge');
    
    }

    public function doc_charge_delete()
    {
        $doc_id = $data['doc_id']=$_POST['id'];
        $data['doc_charge_details'] = $this->db->query("SELECT * FROM DOC_CHARGE WHERE DC_ID='".$doc_id."'")->row();
        $this->load->view('Documentcharge/doc_charge_delete',$data);
    }

    public function delete()
    { 
        $doc_id=$_POST['field'];

        $result = $this->Documentcharge_model->doc_charge_delete($doc_id);

        if ($result) {

            $this->session->set_flashdata('g_success','Document charge has been deleted successfully.');
        }
        else{
            $this->session->set_flashdata('g_err','Something went wrong');
        }
    }

    public function doc_charge_edit()
    {
        $dcid = $_POST['id'];
        $data['doc_charge_details'] = $this->Documentcharge_model->get_doc_charge_id($dcid);
        $this->load->view('Documentcharge/doc_charge_edit',$data);
    }

    public function doc_charge_update()
    {
        
        $data['doc_id_edit'] = $this->input->post('doc_id_edit');
        $data['from_amt_edit'] = $this->input->post('from_amt_edit');
        $data['to_amt_edit'] = $this->input->post('to_amt_edit');
        $data['dc_amt_edit'] = $this->input->post('dc_amt_edit');     

        $result = $this->Documentcharge_model->update_doc_charge($data);

        if($result)
        {
            $this->session->set_flashdata('g_success', 'Document Charge details have been updated successfully...');
        }else{
           $this->session->set_flashdata('g_err', 'Could not update Document Charge details!');
        }
        redirect('Documentcharge');
    }


      public function doc_charge_from_unique()
    {
        $val = $_POST['value'];
        // $sys_id = $_SESSION['sys_id'];
        $result = $this->Documentcharge_model->doc_charge_from_unique($val);
        echo count((array)$result);
    }

    public function doc_charge_to_unique()
    {
        $val = $_POST['value'];
        // $sys_id = $_SESSION['sys_id'];
        $result = $this->Documentcharge_model->doc_charge_to_unique($val);
        echo count((array)$result);
    }

    public function dc_amount_unique()
    {
        $val = $_POST['value'];
        // $sys_id = $_SESSION['sys_id'];
        $result = $this->Documentcharge_model->dc_amount_unique($val);
        echo count((array)$result);
    }

}
?>