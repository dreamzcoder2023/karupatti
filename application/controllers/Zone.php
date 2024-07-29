<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/* ************************************************************************************
		Purpose : To handle all Zone functions 2022-08-22
***************************************************************************************/
class Zone extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model(array("Zone_model"));
    	$this->load->library('user_agent');
    	if (isset($this->session->userdata['username']) && $this->session->userdata['username'] == TRUE)
        {
            //do something
        }else{
            redirect('login'); //if session is not there, redirect to login page
        } 
		date_default_timezone_set("Asia/Kolkata");
    	$this->session->set_userdata('comtitle', 'Zone');
	}

    public function index()
    {
        $data['zone_list'] = $this->Zone_model->get_zone_list();
        $this->load->view('zone/zone_list',$data);
    }

    /*public function zone_active(){
        $id = $this->input->post('id');
        $data['status'] = $this->input->post('status');
        $data['modified_on'] = date('Y-m-d H:i:s');
        $data['modified_by'] = $_SESSION['USERID'];
        $result = $this->Zone_model->zone_active($data,$id);
        echo 1;
    }*/

    public function zone_unique()
    {
        $val = $_POST['value'];
        $result = $this->Zone_model->zone_unique($val);
        echo count((array)$result);
    }

    //To save Zone
    public function zone_save()
    {
        $data['zone'] = $this->input->post('zone');

        $last_zone_detail = $this->Zone_model->get_last_zone_details();

        $last_data= $last_zone_detail->SNO;
        //$exlno = substr($last_data,5);
        $next_value = (int)$last_data + 1;
        $uid=str_pad($next_value,3,0,STR_PAD_LEFT);
        //$s_no=$r_no1;

        $data['sno'] = $uid;

        $result = $this->Zone_model->add_zone($data);
        if($result)
        {
            $this->session->set_flashdata('g_success', 'Zone have been Added successfully...');
        }else{
           $this->session->set_flashdata('g_err', 'Could not add Zone details!');
        }
        redirect('Zone');
    }

    //Zone Edit
    public function zone_edit()
    {
        $dcid = $_POST['id'];
        $data['zone_details'] = $this->Zone_model->get_zone_by_zone_id($dcid);
        $this->load->view('zone/zone_edit',$data);
    }

    public function zone_unique_edit()
    {
        $val = $_POST['value'];
        $dcid = $_POST['dcid'];
        $result = $this->Zone_model->zone_unique_edit($val,$dcid);
        echo count((array)$result);
    }

    //To update Zone
    public function zone_update()
    {
        $data['zone_id'] = $this->input->post('zone_id');
        $data['zone'] = $this->input->post('zone');

        $result = $this->Zone_model->update_zone($data);
        if($result)
        {
            $this->session->set_flashdata('g_success', 'Zone have been Updated successfully...');
        }else{
           $this->session->set_flashdata('g_err', 'Could not update Zone details!');
        }
        redirect('Zone');
    }

    //To Delete Zone
    public function zone_delete()
    {
        $uid = $data['bid']=$_POST['id'];
        $data['zone_details'] = $this->Zone_model->get_zone_by_zone_id($uid);
        $this->load->view('zone/zone_delete',$data);
    }

    public function delete()
    { 
        $bid=$_POST['field'];
        $result = $this->Zone_model->zone_delete($bid);
        if ($result) {
            $this->session->set_flashdata('g_success', 'Zone has been Deleted successfully.');
        }
        else{
            $this->session->set_flashdata('g_err', 'Something went wrong');
        }
    }

}
?>