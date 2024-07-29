<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/* ************************************************************************************
		Purpose : To handle all Loantype functions 2022-08-19
***************************************************************************************/
class Loantype extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model(array("Loantype_model"));
    	$this->load->library('user_agent');
    	if (isset($this->session->userdata['username']) && $this->session->userdata['username'] == TRUE)
        {
            //do something
        }else{
            redirect('login'); //if session is not there, redirect to login page
        } 
		date_default_timezone_set("Asia/Kolkata");
    	$this->session->set_userdata('comtitle', 'Loan Type');
	}

    public function index()
    {
        $data['loan_type_list'] = $this->Loantype_model->get_loan_type_list();
        $this->load->view('loan_type/loan_type_list',$data);
    }

    public function loan_type_unique()
    {
        $val = $_POST['value'];
        $result = $this->Loantype_model->loan_type_unique($val);
        echo count((array)$result);
    }

    //To save Loantype
    public function loan_type_save()
    {
        $data['loan_type'] = $this->input->post('loan_type');
        $data['status'] = $this->input->post('status');
        $data['created_on'] = date('Y-m-d H:i:s');
        $data['created_by'] = $_SESSION['USERID'];

        $result = $this->Loantype_model->add_loan_type($data);
        if($result)
        {
            $this->session->set_flashdata('g_success', 'Loan Type have been Added successfully...');
        }else{
           $this->session->set_flashdata('g_err', 'Could not add Loan Type details!');
        }
        redirect('loantype');
    }

    //Loantype Edit
    public function loan_type_edit()
    {
        $dcid = $_POST['id'];
        $data['loan_type_details'] = $this->Loantype_model->get_loan_type_by_loan_type_id($dcid);
        $this->load->view('loan_type/loan_type_edit',$data);
    }

    public function loan_type_unique_edit()
    {
        $val = $_POST['value'];
        $dcid = $_POST['dcid'];
        $result = $this->Loantype_model->loan_type_unique_edit($val,$dcid);
        echo count((array)$result);
    }

    //To update Loantype
    public function loan_type_update()
    {
        $data['sno'] = $this->input->post('sno');
        $data['loan_type'] = $this->input->post('loan_type');
        $data['modified_on'] = date('Y-m-d H:i:s');
        $data['modified_by'] = $_SESSION['USERID'];

        $result = $this->Loantype_model->update_loan_type($data);
        if($result)
        {
            $this->session->set_flashdata('g_success', 'Loan Type have been Updated successfully...');
        }else{
           $this->session->set_flashdata('g_err', 'Could not update Loan Type details!');
        }
        redirect('loantype');
    }

    //To Delete Loantype
    public function loan_type_delete()
    {
        $uid = $data['bid']=$_POST['id'];
        $data['loan_type_details'] = $this->db->query("SELECT * FROM LOANTYPE WHERE LOANTYPEID='".$uid."'")->row();
        $this->load->view('loan_type/loan_type_delete',$data);
    }

    public function delete()
    { 
        $bid=$_POST['field'];
        $result = $this->Loantype_model->loan_type_delete($bid);
        if ($result) {
            $this->session->set_flashdata('g_success', 'Loan Type has been Deleted successfully.');
        }
        else{
            $this->session->set_flashdata('g_err', 'Something went wrong');
        }
    }

}
?>