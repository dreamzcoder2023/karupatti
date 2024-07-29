<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/* ************************************************************************************
		Purpose : To handle all Item functions 2022-08-19
***************************************************************************************/
class Subitem extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model(array("Subitem_model"));
    	$this->load->library('user_agent');
    	if (isset($this->session->userdata['username']) && $this->session->userdata['username'] == TRUE)
        {
            //do something
        }else{
            redirect('login'); //if session is not there, redirect to login page
        } 
		date_default_timezone_set("Asia/Kolkata");
    	$this->session->set_userdata('comtitle', 'Item');
	}

    public function index()
    {   

        $data['itemname_list'] = $this->Subitem_model->get_item_name_list();
        $data['item_type_list']  = $this->db->query("SELECT * FROM jewel_type  ")->result_array();
        $data['Subitem_list'] = $this->Subitem_model->get_Subitem_list();
        $this->load->view('subitem/subitem_list',$data);
    }

    // public function item_unique()
    // {
    //     $val = $_POST['value'];
    //     $result = $this->Subitem_model->item_unique($val);
    //     echo count((array)$result);
    // }


    public function Subitem_active()

    {
        $id = $this->input->post('id');
        $data['status'] = $this->input->post('status');
        $data['modified_on'] = date('Y-m-d H:i:s');
        $data['modified_by'] = $_SESSION['username'];
        $result = $this->Subitem_model->Subitem_active($data,$id);
        echo 1;
    }

    // //To save Item
    public function Subitem_save()
    {
        $data['item_type'] = $this->input->post('item_type');
        $data['itemname_sub'] = $this->input->post('itemname_sub');
        $data['Subitemname_sub'] = $this->input->post('Subitem_Sub');
       

       
        $data['status'] = 'Y';
        $data['created_on'] = date('Y-m-d H:i:s');
        $data['created_by'] = $_SESSION['username'];

        $last_item_detail = $this->Subitem_model->get_last_item_details();

        $last_data= $last_item_detail->SUB_ID;
        //$exlno = substr($last_data,5);
        $next_value = (int)$last_data + 1;
        $uid=str_pad($next_value,1,0,STR_PAD_LEFT);
        //$s_no=$r_no1;

        $data['sno'] = $uid;
        

        $result = $this->Subitem_model->add_subitem($data);
        if($result)
        {
            $this->session->set_flashdata('g_success', 'SubItem(s) have been Added successfully...');
        }else{
           $this->session->set_flashdata('g_err', 'Could not add Subitem(s) details!');
        }
        redirect('Subitem');
    }

    //Item Edit
    public function subitem_edit()
    {
        $dcid = $_POST['id'];
        $data['item_type_list']  = $this->db->query("SELECT * FROM jewel_type  ")->result_array();
        $data['itemname_list_edit'] = $this->Subitem_model->get_item_name_list();
        $data['subitem_details'] = $this->Subitem_model->get_item_by_item_id($dcid);
        $this->load->view('subitem/subitem_edit',$data);
    }

    // public function item_unique_edit()
    // {
    //     $val = $_POST['value'];
    //     $dcid = $_POST['dcid'];
    //     $result = $this->Item_model->item_unique_edit($val,$dcid);
    //     echo count((array)$result);
    // }

    //To update Item
    public function subitem_update()
    {
        $data['sno_edit'] = $this->input->post('sno_edit');
        $data['item_type_edit'] = $this->input->post('item_type_edit');
        $data['itemname_sub_edit'] = $this->input->post('itemname_sub_edit');
        $data['subitemname_edit'] = $this->input->post('subitemname_edit');
     

        $data['modified_on'] = date('Y-m-d H:i:s');
        $data['modified_by'] = $_SESSION['USERID'];

        //$data['item'] = $this->input->post('item');

        $result = $this->Subitem_model->update_subitem($data);
        if($result)
        {
            $this->session->set_flashdata('g_success', 'Subitem have been updated successfully...');
        }else{
           $this->session->set_flashdata('g_err', 'Could not update Subitem details!');
        }
        redirect('Subitem');
    }

    //To Delete Item
    public function subitem_delete()
    {
        $uid = $data['bid']=$_POST['id'];
        $data['Subitem_list'] = $this->db->query("SELECT * FROM SUBITEM_LIST WHERE SUB_ID='".$uid."'")->row();
        $this->load->view('subitem/subitem_delete',$data);
    }

    public function delete()
    { 
        $bid=$_POST['field'];
        $result = $this->Subitem_model->subitem_delete($bid);
        if ($result) {
            $this->session->set_flashdata('g_success', 'Subitem has been deleted successfully.');
        }
        else{
            $this->session->set_flashdata('g_err', 'Something went wrong');
        }
    }

}
?>