<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/* ************************************************************************************
		Purpose : To handle all Interestgroup functions 2022-08-19
***************************************************************************************/
class Interestgroup extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model(array("Interestgroup_model"));
    	$this->load->library('user_agent');
    	if (isset($this->session->userdata['username']) && $this->session->userdata['username'] == TRUE)
        {
            //do something
        }else{
            redirect('login'); //if session is not there, redirect to login page
        } 
		date_default_timezone_set("Asia/Kolkata");
    	$this->session->set_userdata('comtitle', 'Interest Group');
	}

    public function index()
    {
        $data['interest_group_list'] = $this->Interestgroup_model->get_interest_group_list();
        $this->load->view('interest_group/interest_group_list',$data);
    }

    public function interest_group_unique()
    {
        $val = $_POST['value'];
        $result = $this->Interestgroup_model->interest_group_unique($val);
        echo count((array)$result);
    }

    //To save Interestgroup
    public function interest_group_save()
    {
        $data['interest_group'] = $this->input->post('interest_group');

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

        $data['role'] = $urole;*/

        $last_interest_group_detail = $this->Interestgroup_model->get_last_interest_group_details();

        $last_data= $last_interest_group_detail->INT_GROUP_SNO;
        //$exlno = substr($last_data,5);
        $next_value = (int)$last_data + 1;
        $uid=str_pad($next_value,3,0,STR_PAD_LEFT);
        //$s_no=$r_no1;

        $data['sno'] = $uid;

        $result = $this->Interestgroup_model->add_interest_group($data);
        if($result)
        {
            $this->session->set_flashdata('g_success', 'Interest Group have been Added successfully...');
        }else{
           $this->session->set_flashdata('g_err', 'Could not add Interest Group details!');
        }
        redirect('interestgroup');
    }

    //Interestgroup Edit
    public function interest_group_edit()
    {
        $dcid = $_POST['id'];
        $data['interest_group_details'] = $this->Interestgroup_model->get_interest_group_by_interest_group_id($dcid);
        $this->load->view('interest_group/interest_group_edit',$data);
    }

    public function interest_group_unique_edit()
    {
        $val = $_POST['value'];
        $dcid = $_POST['dcid'];
        $result = $this->Interestgroup_model->interest_group_unique_edit($val,$dcid);
        echo count((array)$result);
    }

    //To update Interestgroup
    public function interest_group_update()
    {
        $data['sno'] = $this->input->post('sno');
        $data['interest_group'] = $this->input->post('interest_group');

        $result = $this->Interestgroup_model->update_interest_group($data);
        if($result)
        {
            $this->session->set_flashdata('g_success', 'Interest Group have been Updated successfully...');
        }else{
           $this->session->set_flashdata('g_err', 'Could not update Interest Group details!');
        }
        redirect('interestgroup');
    }

    //To Delete Interestgroup
    public function interest_group_delete()
    {
        $uid = $data['bid']=$_POST['id'];
        $data['interest_group_details'] = $this->db->query("SELECT * FROM INT_GROUPS WHERE INT_GROUP_SNO='".$uid."'")->row();
        $this->load->view('interest_group/interest_group_delete',$data);
    }

    public function delete()
    { 
        $bid=$_POST['field'];
        $result = $this->Interestgroup_model->interest_group_delete($bid);
        if ($result) {
            $this->session->set_flashdata('g_success', 'Interest Group has been Deleted successfully.');
        }
        else{
            $this->session->set_flashdata('g_err', 'Something went wrong');
        }
    }

}
?>