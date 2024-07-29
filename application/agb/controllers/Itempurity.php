<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/* ************************************************************************************
		Purpose : To handle all Itempurity functions 2022-08-19
***************************************************************************************/
class Itempurity extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model(array("Itempurity_model"));
    	$this->load->library('user_agent');
    	if (isset($this->session->userdata['username']) && $this->session->userdata['username'] == TRUE)
        {
            //do something
        }else{
            redirect('login'); //if session is not there, redirect to login page
        } 
		date_default_timezone_set("Asia/Kolkata");
    	$this->session->set_userdata('comtitle', 'Item Purity');
	}

    public function index()
    {
        $data['item_purity_list'] = $this->Itempurity_model->get_item_purity_list();
        $this->load->view('item_purity/item_purity_list',$data);
    }

    public function item_purity_unique()
    {
        $val = $_POST['value'];
        $result = $this->Itempurity_model->item_purity_unique($val);
        echo count((array)$result);
    }

    //To save Itempurity
    public function item_purity_save()
    {
        $data['item_purity'] = $this->input->post('item_purity');
        $data['item_purity_percentage'] = $this->input->post('item_purity_percentage');
        $data['status'] = $this->input->post('status');
        $data['created_on'] = date('Y-m-d H:i:s');
        $data['created_by'] = $_SESSION['USERID'];
      //  print_r($data['item_purity_percentage']);exit;

        $result = $this->Itempurity_model->add_item_purity($data);
        if($result)
        {
            $this->session->set_flashdata('g_success', 'Item Purity have been Added successfully...');
        }else{
           $this->session->set_flashdata('g_err', 'Could not add Item Purity details!');
        }
        redirect('itempurity');
    }

    //Itempurity Edit
    public function item_purity_edit()
    {
        $dcid = $_POST['id'];
        $data['item_purity_details'] = $this->Itempurity_model->get_item_purity_by_item_purity_id($dcid);
        $this->load->view('item_purity/item_purity_edit',$data);
    }

    public function item_purity_unique_edit()
    {
        $val = $_POST['value'];
        $dcid = $_POST['dcid'];
        $result = $this->Itempurity_model->item_purity_unique_edit($val,$dcid);
        echo count((array)$result);
    }

    //To update Itempurity
    public function item_purity_update()
    {
        $data['sno'] = $this->input->post('sno');
        $data['item_percentage'] = $this->input->post('item_percentage');
        $data['item_purity'] = $this->input->post('item_purity');
        $data['modified_on'] = date('Y-m-d H:i:s');
        $data['modified_by'] = $_SESSION['USERID'];

        $result = $this->Itempurity_model->update_item_purity($data);
        if($result)
        {
            $this->session->set_flashdata('g_success', 'Item Purity have been Updated successfully...');
        }else{
           $this->session->set_flashdata('g_err', 'Could not update Item Purity details!');
        }
        redirect('itempurity');
    }

    //To Delete Itempurity
    public function item_purity_delete()
    {
        $uid = $data['bid']=$_POST['id'];
        $data['item_purity_details'] = $this->db->query("SELECT * FROM ITEMPURITY WHERE ITEMPURITYID='".$uid."'")->row();
        $this->load->view('item_purity/item_purity_delete',$data);
    }

    public function delete()
    { 
        $bid=$_POST['field'];
        $result = $this->Itempurity_model->item_purity_delete($bid);
        if ($result) {
            $this->session->set_flashdata('g_success', 'Item Purity has been Deleted successfully.');
        }
        else{
            $this->session->set_flashdata('g_err', 'Something went wrong');
        }
    }

}
?>