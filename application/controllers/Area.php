<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/* ************************************************************************************
		Purpose : To handle all Area functions 2022-08-22
***************************************************************************************/
class Area extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model(array("Area_model"));
    	$this->load->library('user_agent');
    	if (isset($this->session->userdata['username']) && $this->session->userdata['username'] == TRUE)
        {
            //do something
        }else{
            redirect('login'); //if session is not there, redirect to login page
        } 
		date_default_timezone_set("Asia/Kolkata");
    	$this->session->set_userdata('comtitle', 'Area');
	}

    public function index()
    {
        $data['area_list'] = $this->Area_model->get_area_list();
        $data['zone_list'] = $this->Area_model->get_zone_list();
        $this->load->view('area/area_list',$data);
    }

    /*public function area_active(){
        $id = $this->input->post('id');
        $data['status'] = $this->input->post('status');
        $data['modified_on'] = date('Y-m-d H:i:s');
        $data['modified_by'] = $_SESSION['USERID'];
        $result = $this->Area_model->area_active($data,$id);
        echo 1;
    }*/

    public function area_unique()
    {
        $val = $_POST['value'];
        $result = $this->Area_model->area_unique($val);
        echo count((array)$result);
    }

    //To save Area
    public function area_save()
    {
        $data['area'] = $this->input->post('area');
        $data['zone_id'] = $this->input->post('zone_id');

        $last_area_detail = $this->Area_model->get_last_area_details();

        $last_data= $last_area_detail->SNO;
        //$exlno = substr($last_data,5);
        $next_value = (int)$last_data + 1;
        $uid=str_pad($next_value,3,0,STR_PAD_LEFT);
        //$s_no=$r_no1;

        $data['sno'] = $uid;

        $result = $this->Area_model->add_area($data);
        if($result)
        {
            $this->session->set_flashdata('g_success', 'Area have been Added successfully...');
        }else{
           $this->session->set_flashdata('g_err', 'Could not add Area details!');
        }
        redirect('Area');
    }

    //Area Edit
    public function area_edit()
    {
        $dcid = $_POST['id'];
        $data['area_details'] = $this->Area_model->get_area_by_area_id($dcid);
        $data['zone_list'] = $this->Area_model->get_zone_list();
        $this->load->view('area/area_edit',$data);
    }

    public function area_unique_edit()
    {
        $val = $_POST['value'];
        $dcid = $_POST['dcid'];
        $result = $this->Area_model->area_unique_edit($val,$dcid);
        echo count((array)$result);
    }

    //To update Area
    public function area_update()
    {
        $data['area_id'] = $this->input->post('area_id');
        $data['zone_id'] = $this->input->post('zone_id');
        $data['area'] = $this->input->post('area');

        $result = $this->Area_model->update_area($data);
        if($result)
        {
            $this->session->set_flashdata('g_success', 'Area have been Updated successfully...');
        }else{
           $this->session->set_flashdata('g_err', 'Could not update Area details!');
        }
        redirect('Area');
    }

    //To Delete Area
    public function area_delete()
    {
        $uid = $data['bid']=$_POST['id'];
        $data['area_details'] = $this->Area_model->get_area_by_area_id($uid);
        $this->load->view('area/area_delete',$data);
    }

    public function delete()
    { 
        $bid=$_POST['field'];
        $result = $this->Area_model->area_delete($bid);
        if ($result) {
            $this->session->set_flashdata('g_success', 'Area has been Deleted successfully.');
        }
        else{
            $this->session->set_flashdata('g_err', 'Something went wrong');
        }
    }

}
?>