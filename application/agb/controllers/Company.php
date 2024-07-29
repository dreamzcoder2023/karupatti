<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/* ************************************************************************************
		Purpose : To handle all the Company functions
***************************************************************************************/
class Company extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model(array("Company_model"));
		//if ($this->session->userdata['username'] == TRUE)
		if (isset($this->session->userdata['username']) && $this->session->userdata['username'] == TRUE)
        {
            //do something
        }else{
            redirect('login'); //if session is not there, redirect to login page
        } 
		date_default_timezone_set("Asia/Kolkata");
		$this->session->set_userdata('comtitle', 'Company');
	}
	public function index()
	{
		$data['c_settings'] = $this->Company_model->get_company_list();
		$this->load->view('company/companylist',$data);
	}

	//Company Edit
    public function company_edit()
    {
        $cid = $_POST['id'];
        $data['edit'] = $this->Company_model->get_company_by_company_id($cid);
        $data['company_details'] = $this->Company_model->get_company_by_company_id($cid);
        $this->load->view('company/company_edit',$data);
    }

    public function company_view()
    {
        $cid = $_POST['id'];
        $data['company_details'] = $this->Company_model->get_company_by_company_id($cid);
        $this->load->view('company/company_view',$data);
    }
	

	// public function company_add()
	// {
	// 	$data['level_list'] = $this->Company_model->get_level_list();
	// 	$this->load->view('company/company_add',$data);
	// }

	public function company_save()
	{
		$data['company_id'] = $this->input->post('company_id');
		$data['company_name'] = $this->input->post('company_name');
		$data['address1'] = $this->input->post('address1');
		$data['address2'] = $this->input->post('address2');
		$data['city'] = $this->input->post('city');
		$data['pincode'] = $this->input->post('pincode');
		$data['state'] = $this->input->post('state');
		$data['phone'] = $this->input->post('phone');
		$data['email'] = $this->input->post('email');
		$data['pan_no'] = $this->input->post('pan_no');
		$data['gst_no'] = $this->input->post('gst_no');
		$data['reg_no'] = $this->input->post('reg_no');
		$data['btype'] = $this->input->post('btype');
		$data['pcname'] = $this->input->post('pcname');
		$data['paddress'] = $this->input->post('paddress');
		$data['code'] = $this->input->post('code');
		$data['clogo'] = '';
		$data['created_on'] = date('Y-m-d H:i:s');
    	$data['created_by'] = 1;

    	if($_FILES['company_logo']['name'] ){
            $_FILES['file']['name'] = $_FILES['company_logo']['name'];
            $_FILES['file']['type'] = $_FILES['company_logo']['type'];
            $_FILES['file']['tmp_name'] = $_FILES['company_logo']['tmp_name'];
            $_FILES['file']['error'] = $_FILES['company_logo']['error'];
            $_FILES['file']['size'] = $_FILES['company_logo']['size'];
            $extent = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
            $config['upload_path'] = 'assets/images/company_logo'; 
            $config['allowed_types'] = 'jpg|jpeg|png';
            $config['max_size'] = '50000';
            $config['file_name'] = $data['company_id'].'company_logo';
            $this->load->library('upload',$config); 
            if($this->upload->do_upload('file')){
              $uploadData = $this->upload->data();
              $filename = $uploadData['file_name'];
              $data['totalFiles'][] = $filename;
            }
              $data['company_logo'] = $data['company_id'].'company_logo'.".".$extent;
        	}


        	// print_r($data); exit();

    	$result = $this->Company_model->company_save($data);
	      if($result){
				$this->session->set_flashdata('g_success', 'Company have been Added successfully...');
	      }else{
	      	   $this->session->set_flashdata('g_err', 'Could not add company details!');
	      }
		redirect('Company'); 

	}

	public function company_update()
	{
		$data['company_id'] = $this->input->post('ed_company_id');
		$data['company_name'] = $this->input->post('company_name_edit');
		$data['address1'] = $this->input->post('ed_address1');
		$data['address2'] = $this->input->post('ed_address2');
		$data['city'] = $this->input->post('ed_city');
		$data['pincode'] = $this->input->post('ed_pincode');
		$data['state'] = $this->input->post('ed_state');
		$data['phone'] = $this->input->post('ed_phone');
		$data['email'] = $this->input->post('ed_email');
		$data['pan_no'] = $this->input->post('ed_pan_no');
		$data['gst_no'] = $this->input->post('ed_gst_no');
		$data['reg_no'] = $this->input->post('ed_reg_no');
		$data['btype'] = $this->input->post('ed_btype');
		$data['pcname'] = $this->input->post('ed_pcname');
		$data['paddress'] = $this->input->post('ed_paddress');
		$data['code'] = $this->input->post('ed_code');
		$old_img = $this->input->post('old_img');
		// $data['modified_on'] = date('Y-m-d H:i:s');
  //   	$data['modified_by'] = 1;

		// print_r($data); exit();
		 if($_FILES['company_logo_ed']['name']!=''){

             unlink("assets/images/company_logo/".$old_img);

            $_FILES['file']['name'] = $_FILES['company_logo_ed']['name'];

            $_FILES['file']['type'] = $_FILES['company_logo_ed']['type'];

            $_FILES['file']['tmp_name'] = $_FILES['company_logo_ed']['tmp_name'];

            $_FILES['file']['error'] = $_FILES['company_logo_ed']['error'];

            $_FILES['file']['size'] = $_FILES['company_logo_ed']['size'];

            $extent = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);

            $config['upload_path'] = 'assets/images/company_logo'; 

            $config['allowed_types'] = 'jpg|jpeg|png';

            $config['max_size'] = '50000';

            $config['file_name'] = $data['company_id'].'company_logo';

            $this->load->library('upload',$config); 

            if($this->upload->do_upload('file')){

                $uploadData = $this->upload->data();

                $filename = $uploadData['file_name'];

                $data['totalFiles'][] = $filename;
            }
            $data['company_logo'] = $data['company_id'].'company_logo'.".".$extent;
            // $data['company_logo'] = $id.".png";
        }else{

            $data['company_logo'] = $old_img;
        }

        // print_r($data); exit();
    	$result = $this->Company_model->company_update($data);
	      if($result){
				$this->session->set_flashdata('g_success', 'Company have been Updated successfully...');
	      }else{
	      	   $this->session->set_flashdata('g_err', 'Could not update company details!');
	      }
		redirect('Company'); 

	}

	//To Delete Department
    public function company_delete()
    {
        $uid = $data['bid']=$_POST['id'];
        $data['company_details'] = $this->db->query("SELECT * FROM COMPANY WHERE COMPANYCODE='".$uid."'")->row();
        $this->load->view('company/company_delete',$data);
    }

    public function delete()
    { 
        $bid=$_POST['field'];
        $result = $this->Company_model->company_delete($bid);
        if ($result) {
            $this->session->set_flashdata('g_success', 'Company has been Deleted successfully.');
        }
        else{
            $this->session->set_flashdata('g_err', 'Something went wrong');
        }
    }

     public function company_active(){
        $id = $this->input->post('id');
        $data['status'] = $this->input->post('status');
        $result = $this->Company_model->company_active($data,$id);
        echo 1;
    }
     public function company_unique()
    {
        $val = $_POST['value'];
        // $ccode = $_SESSION['COMPANYCODE'];
        $result = $this->Company_model->company_unique($val);
        echo count((array)$result);
    }
    public function company_unique_edit()
    {
        $val = $_POST['value'];
        $id = $_POST['id'];
        // $ccode = $_SESSION['COMPANYCODE'];
        $result = $this->Company_model->company_unique_edit($val,$id);
        echo count((array)$result);
    }

    

}
?>