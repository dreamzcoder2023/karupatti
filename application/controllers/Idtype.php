<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/* ************************************************************************************
		Purpose : To handle all the idtype functions
***************************************************************************************/
class Idtype extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model(array("Idtype_model"));
		//if ($this->session->userdata['username'] == TRUE)
		if (isset($this->session->userdata['username']) && $this->session->userdata['username'] == TRUE)
        {
            //do something
        }else{
            redirect('login'); //if session is not there, redirect to login page
        } 
		date_default_timezone_set("Asia/Kolkata");
		$this->session->set_userdata('comtitle', 'IDtype');
	}

	//Idtype Edit
    public function idtype_edit()
    {
        $cid = $_POST['id'];
        $data['idtype_details'] = $this->Idtype_model->get_idtype_by_idtype_id($cid);
        $this->load->view('idtype/idtype_edit',$data);
    }

    public function idtype_view()
    {
        $cid = $_POST['id'];
        $data['idtype_details'] = $this->Idtype_model->get_idtype_by_idtype_id($cid);
        $this->load->view('idtype/idtype_view',$data);
    }
	public function index()
	{
		$data['idtype_list'] = $this->Idtype_model->get_idtype_list();
		$this->load->view('idtype/idtype_list',$data);
	}

	// public function idtype_add()
	// {
	// 	$data['level_list'] = $this->Idtype_model->get_level_list();
	// 	$this->load->view('idtype/idtype_add',$data);
	// }

	public function idtype_save()
	{
		// $data['idtype_id'] = $this->input->post('idtype_id');
		$data['idtype_name'] = $this->input->post('idtype');
		$data['created_on'] = date('Y-m-d H:i:s');
    	$data['created_by'] = 1;

    	$result = $this->Idtype_model->idtype_save($data);
	      if($result){
				$this->session->set_flashdata('g_success', 'Idtype have been Added successfully...');
	      }else{
	      	   $this->session->set_flashdata('g_err', 'Could not add idtype details!');
	      }
		redirect('Idtype'); 

	}

	public function idtype_update()
	{
		$data['idtype_id'] = $this->input->post('idtype_id');
		$data['idtype_name'] = $this->input->post('idtype_edit_name');
		
		$data['modified_on'] = date('Y-m-d H:i:s');
    	$data['modified_by'] = 1;

    	$result = $this->Idtype_model->idtype_update($data);
	      if($result){
				$this->session->set_flashdata('g_success', 'Idtype have been Updated successfully...');
	      }else{
	      	   $this->session->set_flashdata('g_err', 'Could not update idtype details!');
	      }
		redirect('Idtype'); 

	}

	//To Delete Department
    public function idtype_delete()
    {
        $uid = $data['bid']=$_POST['id'];
        $data['idtype_details'] = $this->db->query("SELECT * FROM IDTYPE WHERE IDTYPEID=".$uid)->row();
        $this->load->view('idtype/idtype_delete',$data);
    }

    public function delete()
    { 
        $bid=$_POST['field'];
        $result = $this->Idtype_model->idtype_delete($bid);
        if ($result) {
            $this->session->set_flashdata('g_success', 'Idtype has been Deleted successfully.');
        }
        else{
            $this->session->set_flashdata('g_err', 'Something went wrong');
        }
    }

     public function idtype_active(){
        $id = $this->input->post('id');
        $data['status'] = $this->input->post('status');
        $result = $this->Idtype_model->idtype_active($data,$id);
        echo $data['status'];
        if ($result) {
        	if ($data['status']==0) {
            $this->session->set_flashdata('g_success', 'Idtype has been Deactive successfully.');
        	}else{
        		$this->session->set_flashdata('g_success', 'Idtype has been Active successfully.');
        	}
        }
        else{
            $this->session->set_flashdata('g_err', 'Something went wrong');
        }
    }
     public function idtype_unique()
    {
        $val = $_POST['value'];
        // $ccode = $_SESSION['COMPANYCODE'];
        $result = $this->Idtype_model->idtype_unique($val);
        echo count((array)$result);
    }
     public function idtype_unique_edit()
    {
        $val = $_POST['value'];
        $dcid = $_POST['dcid'];
        $result = $this->Idtype_model->idtype_unique_edit($val,$dcid);
        echo count((array)$result);
    }

}
?>