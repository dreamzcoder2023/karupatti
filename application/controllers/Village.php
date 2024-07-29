<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/* ************************************************************************************
		Purpose : To handle all the village functions
***************************************************************************************/
class Village extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model(array("Village_model"));
		//if ($this->session->userdata['username'] == TRUE)
		if (isset($this->session->userdata['username']) && $this->session->userdata['username'] == TRUE)
        {
            //do something
        }else{
            redirect('login'); //if session is not there, redirect to login page
        } 
		date_default_timezone_set("Asia/Kolkata");
		$this->session->set_userdata('comtitle', 'Village');
	}

	//Village Edit
    public function village_edit()
    {
        $cid = $_POST['id'];
        $data['village_details'] = $this->Village_model->get_village_by_village_id($cid);
        $this->load->view('village/village_edit',$data);
    }

    public function village_view()
    {
        $cid = $_POST['id'];
        $data['village_details'] = $this->Village_model->get_village_by_village_id($cid);
        $this->load->view('village/village_view',$data);
    }
	public function index()
	{
		$data['village_list'] = $this->Village_model->get_village_list();
		$this->load->view('village/village_list',$data);
	}

	// public function village_add()
	// {
	// 	$data['level_list'] = $this->Village_model->get_level_list();
	// 	$this->load->view('village/village_add',$data);
	// }

	public function village_save()
	{
		// $data['village_id'] = $this->input->post('village_id');
        $data['area'] = $this->input->post('area');
        $data['zone'] = $this->input->post('zone');
        $data['city'] = $this->input->post('city');
		$data['village_name'] = $this->input->post('village');
		$data['created_on'] = date('Y-m-d H:i:s');
    	$data['created_by'] = 1;

    	$result = $this->Village_model->village_save($data);
	      if($result){
				$this->session->set_flashdata('g_success', 'Village have been Added successfully...');
	      }else{
	      	   $this->session->set_flashdata('g_err', 'Could not add village details!');
	      }
		redirect('village'); 

	}

	public function village_update()
	{
		$data['village_id'] = $this->input->post('village_id');
		$data['village_name'] = $this->input->post('village_edit');
        $data['area'] = $this->input->post('area_edit');
        $data['zone'] = $this->input->post('zone_edit');
        $data['city'] = $this->input->post('city_edit');		
		$data['modified_on'] = date('Y-m-d H:i:s');
    	$data['modified_by'] = 1;

    	$result = $this->Village_model->village_update($data);
	      if($result){
				$this->session->set_flashdata('g_success', 'Village have been Updated successfully...');
	      }else{
	      	   $this->session->set_flashdata('g_err', 'Could not update village details!');
	      }
		redirect('village'); 

	}

	//To Delete Department
    public function village_delete()
    {
        $uid = $_POST['id'];
        $data['village_details'] = $this->db->query("SELECT * FROM VILLAGE WHERE VILLAGEID=".$uid)->row();
        $this->load->view('village/village_delete',$data);
    }
    public function get_area()
    {
        $zid = $_POST['zoneid'];
        $zone_area = $this->Village_model->get_area_by_zone_id($zid);
        $option = '<option value="">Select Area</option>';
        foreach($zone_area as $arealist)
        {
            $option.='<option value="'.$arealist['SNO'].'">'.$arealist['AREANAME'].'</option>';
        }
        echo $option;
        //return $option;
    }
    public function get_city()
    {
        $aid = $_POST['areaid'];
        $area_city = $this->Village_model->get_city_by_area_id($aid);

        $option = '<option value="">Select City</option>';
        foreach($area_city as $citylist)
        {
            $option.='<option value="'.$citylist['CITYID'].'">'.$citylist['CITYNAME'].'</option>';
        }
        echo $option;
        //return $option;
    }
    public function get_area_edit()
    {
        $zid = $_POST['zoneid'];
        $zone_area = $this->Village_model->get_area_by_zone_id($zid);
        $option = '<option value="">Select Area</option>';
        foreach($zone_area as $arealist)
        {
            $option.='<option value="'.$arealist['SNO'].'">'.$arealist['AREANAME'].'</option>';
        }
        echo $option;
        //return $option;
    }
    public function get_city_edit()
    {
        $aid = $_POST['areaid'];
        $area_city = $this->Village_model->get_city_by_area_id($aid);
        $option = '<option value="">Select City</option>';
        foreach($area_city as $citylist)
        {
            $option.='<option value="'.$citylist['CITYID'].'">'.$citylist['CITYNAME'].'</option>';
        }
        echo $option;
        //return $option;
    }

    public function delete()
    { 
        $bid=$_POST['field'];
        $result = $this->Village_model->village_delete($bid);
        if ($result) {
            $this->session->set_flashdata('g_success', 'Village has been Deleted successfully.');
        }
        else{
            $this->session->set_flashdata('g_err', 'Something went wrong');
        }
    }

     public function village_active(){
        $id = $this->input->post('id');
        $data['status'] = $this->input->post('status');
        $data['modified_on'] = date('Y-m-d H:i:s');
        $data['modified_by'] = 1;
        $result = $this->Village_model->village_active($data,$id);
        echo $data['status'];
        if ($result) {
            if ($data['status']==0) {
            $this->session->set_flashdata('g_success', 'Village has been Deactive successfully.');
            }else{
                $this->session->set_flashdata('g_success', 'Village has been Active successfully.');
            }
        }
        else{
            $this->session->set_flashdata('g_err', 'Something went wrong');
        }
    }
     public function village_unique()
    {
        $data['val']  = $_POST['value'];
        $data['zone'] = $_POST['zone'];
        $data['area'] = $_POST['area'];
        $data['city'] = $_POST['city'];
        $result = $this->Village_model->village_unique($data);
        echo count((array)$result);
    }
     public function village_unique_edit()
    {
        $data['val']  = $_POST['value'];
        $data['id']   = $_POST['id'];
        $data['zone'] = $_POST['zone'];
        $data['area'] = $_POST['area'];
        $data['city'] = $_POST['city'];
        $result = $this->Village_model->village_unique_edit($data);
        echo count((array)$result);
    }

}
?>