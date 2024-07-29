<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/* ************************************************************************************
		Purpose : To handle all the City functions
***************************************************************************************/
class City extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model(array("City_model"));
		//if ($this->session->userdata['username'] == TRUE)
		if (isset($this->session->userdata['username']) && $this->session->userdata['username'] == TRUE)
        {
            //do something
        }else{
            redirect('login'); //if session is not there, redirect to login page
        } 
		date_default_timezone_set("Asia/Kolkata");
		$this->session->set_userdata('comtitle', 'City');
	}

	//City Edit
    public function city_edit()
    {
        $cid = $_POST['id'];
        $data['city_details'] = $this->City_model->get_city_by_city_id($cid);
        $this->load->view('city/city_edit',$data);
    }

    public function city_view()
    {
        $cid = $_POST['id'];
        $data['city_details'] = $this->City_model->get_city_by_city_id($cid);
        $this->load->view('city/city_view',$data);
    }
	public function index()
	{
		$data['city_list'] = $this->City_model->get_city_list();
		$this->load->view('city/city_list',$data);
	}

	// public function city_add()
	// {
	// 	$data['level_list'] = $this->City_model->get_level_list();
	// 	$this->load->view('city/city_add',$data);
	// }

	public function city_save()
	{
		// $data['city_id'] = $this->input->post('city_id');
        $data['area'] = $this->input->post('area');
        $data['zone'] = $this->input->post('zone');
		$data['city_name'] = $this->input->post('city');
		$data['created_on'] = date('Y-m-d H:i:s');
    	$data['created_by'] = 1;

    	$result = $this->City_model->city_save($data);
	      if($result){
				$this->session->set_flashdata('g_success', 'City have been Added successfully...');
	      }else{
	      	   $this->session->set_flashdata('g_err', 'Could not add city details!');
	      }
		redirect('City'); 

	}

	public function city_update()
	{
		$data['city_id'] = $this->input->post('city_id');
		$data['city_name'] = $this->input->post('city_edit');
        $data['area'] = $this->input->post('area_edit');
        $data['zone'] = $this->input->post('zone_edit');
		
		$data['modified_on'] = date('Y-m-d H:i:s');
    	$data['modified_by'] = 1;

    	$result = $this->City_model->city_update($data);
	      if($result){
				$this->session->set_flashdata('g_success', 'City have been Updated successfully...');
	      }else{
	      	   $this->session->set_flashdata('g_err', 'Could not update city details!');
	      }
		redirect('City'); 

	}

	//To Delete Department
    public function city_delete()
    {
        $uid = $data['bid']=$_POST['id'];
        $data['city_details'] = $this->db->query("SELECT * FROM CITY WHERE CITYID=".$uid)->row();
        $this->load->view('city/city_delete',$data);
    }
    public function get_area()
    {
        $zid = $_POST['zoneid'];
        $zone_area = $this->City_model->get_area_by_zone_id($zid);
        //print_r($zone_area);
        // exit();
        // $data['area_details'] = $this->db->query("SELECT * FROM AREA WHERE ZONE_SNO='".$uid."'")->result_array();
        $option = '<option value="">Select Area</option>';
        foreach($zone_area as $arealist)
        {
            $option.='<option value="'.$arealist['SNO'].'">'.$arealist['AREANAME'].'</option>';
        }
        echo $option;
        //return $option;
    }
    public function get_area_edit()
    {
        $zid = $_POST['zoneid'];
        $zone_area = $this->City_model->get_area_by_zone_id($zid);
        //print_r($zone_area);
        // exit();
        // $data['area_details'] = $this->db->query("SELECT * FROM AREA WHERE ZONE_SNO='".$uid."'")->result_array();
        $option = '<option value="">Select Area</option>';
        foreach($zone_area as $arealist)
        {
            $option.='<option value="'.$arealist['SNO'].'">'.$arealist['AREANAME'].'</option>';
        }
        echo $option;
        //return $option;
    }

    public function delete()
    { 
        $bid=$_POST['field'];
        $result = $this->City_model->city_delete($bid);
        if ($result) {
            $this->session->set_flashdata('g_success', 'City has been Deleted successfully.');
        }
        else{
            $this->session->set_flashdata('g_err', 'Something went wrong');
        }
    }

     public function city_active(){
        $id = $this->input->post('id');
        $data['status'] = $this->input->post('status');
        $result = $this->City_model->city_active($data,$id);
        echo $data['status'];
        if ($result) {
            if ($data['status']==0) {
            $this->session->set_flashdata('g_success', 'City has been Deactive successfully.');
            }else{
                $this->session->set_flashdata('g_success', 'City has been Active successfully.');
            }
        }
        else{
            $this->session->set_flashdata('g_err', 'Something went wrong');
        }
    }
     public function city_unique()
    {
        $data['val']  = $_POST['value'];
        $data['zone'] = $_POST['zone'];
        $data['area'] = $_POST['area'];
        // $ccode = $_SESSION['COMPANYCODE'];
        $result = $this->City_model->city_unique($data);
        echo count((array)$result);
    }
     public function city_unique_edit()
    {
        $data['val']  = $_POST['value'];
        $data['id'] = $_POST['id'];
        $data['zone'] = $_POST['zone'];
        $data['area'] = $_POST['area'];
        $result = $this->City_model->city_unique_edit($data);
        echo count((array)$result);
    }

}
?>