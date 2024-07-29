<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/* ************************************************************************************
		Purpose : To handle all Department functions 2022-08-19
***************************************************************************************/
class Department extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model(array("Department_model"));
    	$this->load->library('user_agent');
    	if (isset($this->session->userdata['username']) && $this->session->userdata['username'] == TRUE)
        {
            //do something
        }else{
            redirect('login'); //if session is not there, redirect to login page
        } 
		date_default_timezone_set("Asia/Kolkata");
    	$this->session->set_userdata('comtitle', 'Department');
	}

    public function index()
    {
        $data['department_list'] = $this->Department_model->get_department_list();
        $this->load->view('department/department_list',$data);
    }

    public function department_active(){
        $id = $this->input->post('id');
        $data['status'] = $this->input->post('status');
        $data['modified_on'] = date('Y-m-d H:i:s');
        $data['modified_by'] = $_SESSION['USERID'];
        $result = $this->Department_model->department_active($data,$id);
        echo $data['status'];
        if ($result) {
            if ($data['status']==1) {
                $this->session->set_flashdata('g_success', 'Department has been Deactive successfully.');
            }else{
                $this->session->set_flashdata('g_success', 'Department has been Active successfully.');
            }
        }
        else{
            $this->session->set_flashdata('g_err', 'Something went wrong');
        }
    }

    public function department_unique()
    {
        $val = $_POST['value'];
        $ccode = $_SESSION['COMPANYCODE'];
        $result = $this->Department_model->department_unique($val,$ccode);
        echo count((array)$result);
    }

    //To save Department
    public function department_save()
    {
        $data['department'] = $this->input->post('department');
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

        $result = $this->Department_model->add_department($data);
        if($result)
        {
            $this->session->set_flashdata('g_success', 'Department have been Added successfully...');
        }else{
           $this->session->set_flashdata('g_err', 'Could not add Department details!');
        }
        redirect('Department');
    }

    //Department Edit
    public function department_edit()
    {
        $dcid = $_POST['id'];
        $data['department_details'] = $this->Department_model->get_department_by_department_id($dcid);
        $this->load->view('department/department_edit',$data);
    }

    public function department_unique_edit()
    {
        $val = $_POST['value'];
        $dcid = $_POST['dcid'];
        $result = $this->Department_model->department_unique_edit($val,$dcid);
        echo count((array)$result);
    }

    //To update Department
    public function department_update()
    {
        $data['department_id'] = $this->input->post('department_id');
        $data['department'] = $this->input->post('department');
        $data['company_code'] = $_SESSION['COMPANYCODE'];
        $data['modified_on'] = date('Y-m-d H:i:s');
        $data['modified_by'] = $_SESSION['USERID'];

        $result = $this->Department_model->update_department($data);
        if($result)
        {
            $this->session->set_flashdata('g_success', 'Department have been Updated successfully...');
        }else{
           $this->session->set_flashdata('g_err', 'Could not update Department details!');
        }
        redirect('Department');
    }

    //To Delete Department
    public function department_delete()
    {
        $uid = $data['bid']=$_POST['id'];
        $data['department_details'] = $this->db->query("SELECT * FROM DEPARTMENT WHERE DEPARTMENTID='".$uid."'")->row();
        $this->load->view('department/department_delete',$data);
    }

    public function delete()
    { 
        $bid=$_POST['field'];
        $result = $this->Department_model->department_delete($bid);
        if ($result) {
            $this->session->set_flashdata('g_success', 'Department has been Deleted successfully.');
        }
        else{
            $this->session->set_flashdata('g_err', 'Something went wrong');
        }
    }

}
?>