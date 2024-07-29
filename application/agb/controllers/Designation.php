<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/* ************************************************************************************
		Purpose : To handle all Designation functions 2022-08-22
***************************************************************************************/
class Designation extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model(array("Designation_model"));
    	$this->load->library('user_agent');
    	if (isset($this->session->userdata['username']) && $this->session->userdata['username'] == TRUE)
        {
            //do something
        }else{
            redirect('login'); //if session is not there, redirect to login page
        } 
		date_default_timezone_set("Asia/Kolkata");
    	$this->session->set_userdata('comtitle', 'Designation');
	}

    public function index()
    {
        $data['designation_list'] = $this->Designation_model->get_designation_list();
        $this->load->view('designation/designation_list',$data);
    }

    public function designation_active(){
        $id = $this->input->post('id');
        $data['status'] = $this->input->post('status');
        $data['modified_on'] = date('Y-m-d H:i:s');
        $data['modified_by'] = $_SESSION['USERID'];
        $result = $this->Designation_model->designation_active($data,$id);
        echo $data['status'];
        if ($result) {
            if ($data['status']==1) {
            $this->session->set_flashdata('g_success', 'Designation has been Deactive successfully.');
            }else{
                $this->session->set_flashdata('g_success', 'Designation has been Active successfully.');
            }
        }
        else{
            $this->session->set_flashdata('g_err', 'Something went wrong');
        }
    }

    public function designation_unique()
    {
        $val = $_POST['value'];
        $ccode = $_SESSION['COMPANYCODE'];
        $result = $this->Designation_model->designation_unique($val,$ccode);
        echo count((array)$result);
    }

    //To save Designation
    public function designation_save()
    {
        $data['designation'] = $this->input->post('designation');
        $data['company_code'] = $_SESSION['COMPANYCODE'];
        $data['created_on'] = date('Y-m-d H:i:s');
        $data['created_by'] = $_SESSION['USERID'];

        /*if($ulevel == 0)
            $urole = 'OWNER';
        elseif($ulevel == 1)
            $urole = 'SUPER ADMIN';
        elseif($ulevel == 2)
            $urole = 'ADMINISTRATOR';
        elseif($ulevel == 3)
            $urole = 'USER';
        else
            $urole = 'BEGINNER';

        $data['role'] = $urole;

        $last_user_detail = $this->User_model->get_last_user_details();

        $last_data= $last_user_detail->USERID;
        //$exlno = substr($last_data,5);
        $next_value = (int)$last_data + 1;
        $uid=str_pad($next_value,4,0,STR_PAD_LEFT);
        //$s_no=$r_no1;

        $data['userid'] = $uid;*/

        $result = $this->Designation_model->add_designation($data);
        if($result)
        {
            $this->session->set_flashdata('g_success', 'Designation have been Added successfully...');
        }else{
           $this->session->set_flashdata('g_err', 'Could not add Designation details!');
        }
        redirect('Designation');
    }

    //Designation Edit
    public function designation_edit()
    {
        $dcid = $_POST['id'];
        $data['designation_details'] = $this->Designation_model->get_designation_by_designation_id($dcid);
        $this->load->view('designation/designation_edit',$data);
    }

    public function designation_unique_edit()
    {
        $val = $_POST['value'];
        $dcid = $_POST['dcid'];
        $result = $this->Designation_model->designation_unique_edit($val,$dcid);
        echo count((array)$result);
    }

    //To update Designation
    public function designation_update()
    {
        $data['designation_id'] = $this->input->post('designation_id');
        $data['designation'] = $this->input->post('designation');
        $data['company_code'] = $_SESSION['COMPANYCODE'];
        $data['modified_on'] = date('Y-m-d H:i:s');
        $data['modified_by'] = $_SESSION['USERID'];

        $result = $this->Designation_model->update_designation($data);
        if($result)
        {
            $this->session->set_flashdata('g_success', 'Designation have been Updated successfully...');
        }else{
           $this->session->set_flashdata('g_err', 'Could not update Designation details!');
        }
        redirect('Designation');
    }

    //To Delete Designation
    public function designation_delete()
    {
        $uid = $data['bid']=$_POST['id'];
        $data['designation_details'] = $this->db->query("SELECT * FROM DESIGNATION WHERE DESIGNATIONID='".$uid."'")->row();
        $this->load->view('designation/designation_delete',$data);
    }

    public function delete()
    { 
        $bid=$_POST['field'];
        $result = $this->Designation_model->designation_delete($bid);
        if ($result) {
            $this->session->set_flashdata('g_success', 'Designation has been Deleted successfully.');
        }
        else{
            $this->session->set_flashdata('g_err', 'Something went wrong');
        }
    }

}
?>