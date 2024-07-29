<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/* ************************************************************************************
		Purpose : To handle all Assetsubcategory functions 2024-01-20 By Vasanth
***************************************************************************************/
class Assetsubcategory extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model(array("Assetsubcategory_model"));
    	$this->load->library('user_agent');
    	if (isset($this->session->userdata['username']) && $this->session->userdata['username'] == TRUE)
        {
            //do something
        }else{
            redirect('login'); //if session is not there, redirect to login page
        } 
		date_default_timezone_set("Asia/Kolkata");
    	$this->session->set_userdata('comtitle', 'Assetsubcategory');
	}

    public function index()
    {   

        $data['assetsubcategorylist'] = $this->Assetsubcategory_model->list();
        $data['assetcategorylist']    = $this->Assetsubcategory_model->assetcategorylist();

        $this->load->view('assetsubcategory/assetsubcategory_list',$data);
    }


    public function assetsubcategory_active()

    {
        $id = $this->input->post('id');
        $data['status'] = $this->input->post('status');
        $result = $this->Assetsubcategory_model->assetsubcategory_active_status($data,$id);

        // print_r($result); exit;
        echo $data['status'];
    } 

    public function checkunique_add()
    {

        $name = $_POST['value'];
        $cat  = $_POST['cat'];
        $result = $this->db->query("SELECT * FROM assetsubcategory WHERE assetsubcategoryname='".$name."' AND assetcategoryid='".$cat."' AND status!='2' ")->row();
        
        if($result){ echo 1; }else{ echo 0; }
    }
    public function checkunique_edit()
    {
        $id   = $_POST['id'];
        $name = $_POST['value'];
        $cat  = $_POST['cat'];


        $result = $this->db->query("SELECT * FROM assetsubcategory WHERE assetsubcategoryname='".$name."' AND assetcategoryid='".$cat."' AND  assetsubcategoryid!='".$id."' AND status!='2' ")->row();
        if($result){ echo 1; }else{ echo 0; }
    }

    //To save assetsubcategory
    public function assetsubcategoryadd()
    {  
        
        $data['assetcategoryid']       = $this->input->post('assetcategoryid');
        $data['assetsubcategoryname']  = $this->input->post('assetsubcategoryname');
        $data['created_on']            = date('Y-m-d H:i:s');
        $data['created_by']            = $_SESSION['username'];
        $data['status']                = 1;
       
        $result = $this->Assetsubcategory_model->add($data);
        if($result)
        {
            $this->session->set_flashdata('g_success', 'Asset Sub category have been Added successfully...');
        }else{
            $this->session->set_flashdata('g_err', 'Could not add Asset Sub category details!');
        }
        redirect('Assetsubcategory');
    }
    //Assetsubcategory Edit
        public function edit()
        {   

            $id = $_POST['id'];
            $data['edit'] = $this->Assetsubcategory_model->editdata($id);   
            $data['assetcategorylist']    = $this->Assetsubcategory_model->assetcategorylist();        

            $this->load->view('assetsubcategory/assetsubcategory_edit',$data);
        }    

    //To update assetsubcategory
    public function update()
    {     

                      
        $data['assetsubcategoryid']     = $this->input->post('edit_id');
        $data['assetcategoryid']        = $this->input->post('assetcategoryid_edit');        
        $data['assetsubcategoryname']   = $this->input->post('assetsubcategoryname_edit');        
        $data['modified_on']   = date('Y-m-d H:i:s');
        $data['modified_by']   = $_SESSION['username'];        
        
        $result = $this->Assetsubcategory_model->update($data);

        if($result)
        {
            $this->session->set_flashdata('g_success', 'Asset Sub category have been Updated successfully...');
        }else{
           $this->session->set_flashdata('g_err', 'Could not update Asset Sub category details!');
        }
        redirect('Assetsubcategory');
    }

    //To Delete Assetsubcategory
    public function deleteassetsubcategory()
    {
        $data['bid'] =$_POST['id'];
        $data['details'] = $this->db->query("SELECT * FROM assetsubcategory WHERE assetsubcategoryid='".$data['bid']."'")->row();
        $this->load->view('assetsubcategory/assetsubcategory_delete',$data);
    }

    public function delete()
    { 
        $bid=$_POST['field'];
        $result = $this->Assetsubcategory_model->assetsubcategory_delete($bid);
        if ($result) {
            $this->session->set_flashdata('g_success', 'Asset Sub category has been Deleted successfully.');
        }
        else{
            $this->session->set_flashdata('g_err', 'Something went wrong');
        }
    }

}
?>