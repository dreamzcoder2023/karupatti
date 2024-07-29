<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/* ************************************************************************************
		Purpose : To handle all the Street functions
***************************************************************************************/
class Street extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model(array("Street_model"));
		//if ($this->session->userdata['username'] == TRUE)
		if (isset($this->session->userdata['username']) && $this->session->userdata['username'] == TRUE)
        {
            //do something
        }else{
            redirect('login'); //if session is not there, redirect to login page
        } 
		date_default_timezone_set("Asia/Kolkata");
		$this->session->set_userdata('comtitle', 'Street');
	}

	//Street Edit
    public function street_edit()
    {
        $cid = $_POST['id'];
        $data['street_details'] = $this->Street_model->get_street_by_street_id($cid);
        $this->load->view('street/street_edit',$data);
    }

    public function street_view()
    {
        $cid = $_POST['id'];
        $data['street_details'] = $this->Street_model->get_street_by_street_id($cid);
        $this->load->view('street/street_view',$data);
    }
	public function index()
	{
		$data['street_list'] = $this->Street_model->get_street_list();
		$this->load->view('street/street_list',$data);
	}

	// public function street_add()
	// {
	// 	$data['level_list'] = $this->Street_model->get_level_list();
	// 	$this->load->view('street/street_add',$data);
	// }

	public function street_save()
	{
		// $data['street_id'] = $this->input->post('street_id');
        $data['area'] = $this->input->post('area');
        $data['zone'] = $this->input->post('zone');
        $data['city'] = $this->input->post('city');
        $data['village'] = $this->input->post('village');
		$data['street_name'] = $this->input->post('street');
		$data['created_on'] = date('Y-m-d H:i:s');
    	$data['created_by'] = 1;

    	$result = $this->Street_model->street_save($data);
	      if($result){
				$this->session->set_flashdata('g_success', 'Street have been Added successfully...');
	      }else{
	      	   $this->session->set_flashdata('g_err', 'Could not add street details!');
	      }
		redirect('Street'); 

	}

	public function street_update()
	{
		$data['street_id'] = $this->input->post('street_id');
		$data['street_name'] = $this->input->post('street_edit');
        $data['area'] = $this->input->post('area_edit');
        $data['zone'] = $this->input->post('zone_edit');
        $data['city'] = $this->input->post('city_edit');		
        $data['village'] = $this->input->post('village_edit');        
		$data['modified_on'] = date('Y-m-d H:i:s');
    	$data['modified_by'] = 1;

    	$result = $this->Street_model->street_update($data);
	      if($result){
				$this->session->set_flashdata('g_success', 'Street have been Updated successfully...');
	      }else{
	      	   $this->session->set_flashdata('g_err', 'Could not update street details!');
	      }
		redirect('Street'); 

	}

	//To Delete Department
    public function street_delete()
    {
        $uid = $_POST['id'];
        $data['street_details'] = $this->db->query("SELECT * FROM STREET WHERE STREETID=".$uid)->row();
        $this->load->view('street/street_delete',$data);
    }
    public function get_area()
    {
        $zid = $_POST['zoneid'];
        $zone_area = $this->Street_model->get_area_by_zone_id($zid);
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
        $area_city = $this->Street_model->get_city_by_area_id($aid);

        $option = '<option value="">Select City</option>';
        foreach($area_city as $citylist)
        {
            $option.='<option value="'.$citylist['CITYID'].'">'.$citylist['CITYNAME'].'</option>';
        }
        echo $option;
        //return $option;
    }
     public function get_village()
    {
        $aid = $_POST['cityid'];
        $city_village = $this->Street_model->get_village_by_city_id($aid);

        $option = '<option value="">Select Village</option>';
        foreach($city_village as $villagelist)
        {
            $option.='<option value="'.$villagelist['VILLAGEID'].'">'.$villagelist['VILLAGENAME'].'</option>';
        }
        echo $option;
        //return $option;
    }
    public function get_area_edit()
    {
        $zid = $_POST['zoneid'];
        $zone_area = $this->Street_model->get_area_by_zone_id($zid);
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
        $area_city = $this->Street_model->get_city_by_area_id($aid);
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
        $result = $this->Street_model->street_delete($bid);
        if ($result) {
            $this->session->set_flashdata('g_success', 'Street has been Deleted successfully.');
        }
        else{
            $this->session->set_flashdata('g_err', 'Something went wrong');
        }
    }

     public function street_active(){
        $id = $this->input->post('id');
        $data['status'] = $this->input->post('status');
        $data['modified_on'] = date('Y-m-d H:i:s');
        $data['modified_by'] = 1;
        $result = $this->Street_model->street_active($data,$id);
        echo $data['status'];
        if ($result) {
            if ($data['status']==0) {
            $this->session->set_flashdata('g_success', 'Street has been Deactive successfully.');
            }else{
                $this->session->set_flashdata('g_success', 'Street has been Active successfully.');
            }
        }
        else{
            $this->session->set_flashdata('g_err', 'Something went wrong');
        }
    }
     public function street_unique()
    {
        $val = $_POST['value'];
        // $ccode = $_SESSION['COMPANYCODE'];
        $result = $this->Street_model->street_unique($val);
        echo count((array)$result);
    }
     public function street_unique_edit()
    {
        $val = $_POST['value'];
        $dcid = $_POST['dcid'];
        $result = $this->Street_model->street_unique_edit($val,$dcid);
        echo count((array)$result);
    }

}
?>