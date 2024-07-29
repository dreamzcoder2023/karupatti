<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/* ************************************************************************************
		Purpose : To handle all the bank functions
***************************************************************************************/
class Bank extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model(array("Bank_model"));
		//if ($this->session->userdata['username'] == TRUE)
		if (isset($this->session->userdata['username']) && $this->session->userdata['username'] == TRUE)
        {
            //do something
        }else{
            redirect('login'); //if session is not there, redirect to login page
        } 
		date_default_timezone_set("Asia/Kolkata");
		$this->session->set_userdata('comtitle', 'Bank');
	}
	public function index()
	{
		$data['b_settings'] = $this->Bank_model->get_bank_list();
		$this->load->view('bank/bank_list',$data);
	}

	//Bank Edit
    public function bank_edit()
    {
        $cid = $_POST['id'];
        $data['bank_details'] = $this->Bank_model->get_bank_by_bank_id($cid);
        $this->load->view('bank/bank_edit',$data);
    }

    public function bank_view()
    {
        $cid = $_POST['id'];
        $data['bank_details'] = $this->Bank_model->get_bank_by_bank_id($cid);
        $this->load->view('bank/bank_view',$data);
    }
	

	public function bank_save()
	{
		$data['bank_id'] = $this->input->post('bank_id');
		$data['bank_name'] = $this->input->post('bank_name');
		$data['branch_name'] = $this->input->post('branch_name');
		$data['address'] = $this->input->post('address');
		$data['company'] = $this->input->post('company');
		$data['ifsc'] = $this->input->post('ifsc');
		$data['acc_no'] = $this->input->post('acc_no');
		$data['name'] = $this->input->post('person_name');
		// $data['created_on'] = date('Y-m-d H:i:s');
    	// $data['created_by'] = $_SESSION['username'];

    	$result = $this->Bank_model->bank_save($data);
	      if($result){
				$this->session->set_flashdata('g_success', 'Bank have been Added successfully...');
	      }else{
	      	   $this->session->set_flashdata('g_err', 'Could not add bank details!');
	      }
		redirect('Bank'); 

	}

	public function bank_update()
	{
		$data['bank_id'] = $this->input->post('bank_id');
		$data['bank_name'] = $this->input->post('bank_name');
		$data['branch_name'] = $this->input->post('branch_name');
		$data['address'] = $this->input->post('address');
		$data['company'] = $this->input->post('company');
		$data['ifsc'] = $this->input->post('ifsc');
		$data['acc_no'] = $this->input->post('acc_no');
		$data['name'] = $this->input->post('person_name');
		// $data['modified_on'] = date('Y-m-d H:i:s');
    	// $data['modified_by'] = 1;

    	$result = $this->Bank_model->bank_update($data);
	      if($result){
				$this->session->set_flashdata('g_success', 'Bank have been Updated successfully...');
	      }else{
	      	   $this->session->set_flashdata('g_err', 'Could not update bank details!');
	      }
		redirect('Bank'); 

	}

	//To Delete Department
    public function bank_delete()
    {
        $uid = $data['bid']=$_POST['id'];
        $data['bank_details'] = $this->db->query("SELECT * FROM BANKS WHERE SNO='".$uid."'")->row();

        $this->load->view('bank/bank_delete',$data);
    }

    public function delete()
    { 
        $bid=$_POST['field'];
        $result = $this->Bank_model->bank_delete($bid);
        if ($result) {
            $this->session->set_flashdata('g_success', 'Bank has been Deleted successfully.');
        }
        else{
            $this->session->set_flashdata('g_err', 'Something went wrong');
        }
    }

     public function bank_active(){
        $id = $this->input->post('id');
        $data['status'] = $this->input->post('status');
        $result = $this->Bank_model->bank_active($data,$id);
        echo $data['status'];
        if ($result) {
            if ($data['status']=='N') {
            $this->session->set_flashdata('g_success', 'Bank has been Deactive successfully.');
            }else{
                $this->session->set_flashdata('g_success', 'Bank has been Active successfully.');
            }
        }
        else{
            $this->session->set_flashdata('g_err', 'Something went wrong');
        }
    }
     public function bank_unique()
    {
        $val = $_POST['value'];
        // $ccode = $_SESSION['COMPANYCODE'];
        $result = $this->Bank_model->bank_unique($val);
        echo count((array)$result);
    }

}
?>