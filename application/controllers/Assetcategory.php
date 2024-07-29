<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/* ************************************************************************************
		Purpose : To handle all Assetcategory functions 2024-01-20 By Vasanth
***************************************************************************************/
class Assetcategory extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model(array("Assetcategory_model"));
    	$this->load->library('user_agent');
    	if (isset($this->session->userdata['username']) && $this->session->userdata['username'] == TRUE)
        {
            //do something
        }else{
            redirect('login'); //if session is not there, redirect to login page
        } 
		date_default_timezone_set("Asia/Kolkata");
    	$this->session->set_userdata('comtitle', 'Assetcategory');
	}

    public function index()
    {   

        $data['assetcategorylist'] = $this->Assetcategory_model->list();
        $this->load->view('assetcategory/assetcategorys_list',$data);
        // $this->load->view('assetcategory/assetcategorys_list');
    }


    public function assetcategory_active()

    {
        $id = $this->input->post('id');
        $data['status'] = $this->input->post('status');
        $result = $this->Assetcategory_model->assetcategory_active_status($data,$id);
        echo 1;
    } 

    public function checkunique_add()
    {

        $name = $_POST['value'];
        $result = $this->db->query("SELECT * FROM assetcategory WHERE assetcategoryname='".$name."' AND status!='2' ")->row();
        
        if($result){ echo 1; }else{ echo 0; }
    }
    public function checkunique_edit()
    {
        $id   = $_POST['id'];
        $name = $_POST['value'];


        $result = $this->db->query("SELECT * FROM assetcategory WHERE assetcategoryname='".$name."' AND  assetcategoryid!='".$id."' AND status!='2' ")->row();
        if($result){ echo 1; }else{ echo 0; }
    }

    //To save assetcategory
    public function assetcategoryadd()
    {  
        
        $data['assetcategoryname']  = $this->input->post('assetcategoryname');
        $data['created_on']     = date('Y-m-d H:i:s');
        $data['created_by']     = $_SESSION['username'];
        $data['status']         = 1;
       
        $result = $this->Assetcategory_model->add($data);
        if($result)
        {
            $this->session->set_flashdata('g_success', 'Asset category have been Added successfully...');
        }else{
            $this->session->set_flashdata('g_err', 'Could not add Asset category details!');
        }
        redirect('Assetcategory');
    }
    //Assetcategory Edit
        public function edit()
        {   

            $id = $_POST['id'];
            $data['edit'] = $this->Assetcategory_model->editdata($id);           

            $this->load->view('assetcategory/assetcategorys_edit',$data);
            // $this->load->view('assetcategory/assetcategorys_list');
        }    

    //To update assetcategory
    public function update()
    {     
              
        $data['assetcategoryid']     = $this->input->post('edit_id');
        $data['assetcategoryname']     = $this->input->post('assetcategoryname_edit');        
        $data['modified_on']   = date('Y-m-d H:i:s');
        $data['modified_by']   = $_SESSION['username'];        
        
        $result = $this->Assetcategory_model->update($data);

        if($result)
        {
            $this->session->set_flashdata('g_success', 'Asset category have been Updated successfully...');
        }else{
           $this->session->set_flashdata('g_err', 'Could not update Asset category details!');
        }
        redirect('Assetcategory');
    }

    //To Delete Assetcategory
    public function deleteassetcategory()
    {
        $data['bid'] =$_POST['id'];
        $data['details'] = $this->db->query("SELECT * FROM assetcategory WHERE assetcategoryid='".$data['bid']."'")->row();
        $this->load->view('assetcategory/assetcategory_delete',$data);
    }

    public function delete()
    { 
        $bid=$_POST['field'];
        $result = $this->Assetcategory_model->assetcategory_delete($bid);
        if ($result) {
            $this->session->set_flashdata('g_success', 'Asset category has been Deleted successfully.');
        }
        else{
            $this->session->set_flashdata('g_err', 'Something went wrong');
        }
    }

}
?>