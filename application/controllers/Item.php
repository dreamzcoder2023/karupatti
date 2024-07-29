<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/* ************************************************************************************
		Purpose : To handle all Item functions 2022-08-19
***************************************************************************************/
class Item extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model(array("Item_model"));
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

       $data['item_type_list']  = $this->db->query("SELECT * FROM jewel_type  ")->result_array();
        $data['item_list'] = $this->Item_model->get_item_list();
        $this->load->view('item/item_list',$data);
    }

    public function item_unique()
    {
        $val = $_POST['value'];
        $result = $this->Item_model->item_unique($val);
        echo count((array)$result);
    }


    public function Item_active()

    {
        $id = $this->input->post('id');
        $data['status'] = $this->input->post('status');
        $result = $this->Item_model->Item_active($data,$id);
        echo 1;
    }

    public function item_increment()

    {
        $cat_id = $_POST['cat_id'];

         $cat = $this->db->query("SELECT  * FROM CATEGORY WHERE CAT_SNO = '".$cat_id."'")->row();

        
        $cat_fltr = substr($cat->CAT_NAME, 0, 1);

        $last_item_code_detail = $this->Item_model->get_last_item_details();

        $last_data_item= $last_item_code_detail->ITEM_CODE;
        $exlno = substr($last_data_item,1);
        $next_value = (int)$exlno + 1;
        $uid_item = $next_value;
        //$s_no=$r_no1;
        $data['item_code'] = $cat_fltr.$uid_item;
        echo $data['item_code'];

        //print_r($data['item_code']);exit();

    }

    //To save Item
    public function item_save()
    {
       

        $data['item_code'] =str_replace(' ', '', $this->input->post('increment_name'));
        
        $data['item_type'] = $this->input->post('item_type');
        $data['Name_item'] = $this->input->post('Name_item');
        $data['created_on'] = date('Y-m-d H:i:s');
        $data['created_by'] = $_SESSION['USERID'];
        $data['status'] = 'Y';

        $last_item_detail = $this->Item_model->get_last_item_details();

        $last_data= $last_item_detail->SNO;
        //$exlno = substr($last_data,5);
        $next_value = (int)$last_data + 1;
        $uid=str_pad($next_value,3,0,STR_PAD_LEFT);
        //$s_no=$r_no1;
        $data['sno'] = $uid;


        $result = $this->Item_model->add_item($data);
        if($result)
        {
            $this->session->set_flashdata('g_success', 'Item have been Added successfully...');
        }else{
           $this->session->set_flashdata('g_err', 'Could not add Item details!');
        }
        redirect('Item');
    }

    //Item Edit
    public function item_edit()
    {
        $dcid = $_POST['id'];
        $data['item_type_list']  = $this->db->query("SELECT * FROM jewel_type  ")->result_array();
        $data['item_details'] = $this->Item_model->get_item_by_item_id($dcid);
        $this->load->view('item/item_edit',$data);
    }

    public function item_unique_edit()
    {
        $val = $_POST['value'];
        $dcid = $_POST['dcid'];
        $result = $this->Item_model->item_unique_edit($val,$dcid);
        echo count((array)$result);
    }

    //To update Item
    public function item_update()
    {
        $data['sno_edit'] = $this->input->post('sno_edit');
       
        $data['name_item_edit'] = $this->input->post('name_item_edit');
      

        $data['item_type_edit'] = $this->input->post('item_type_edit');

        $result = $this->Item_model->update_item($data);
        if($result)
        {
            $this->session->set_flashdata('g_success', 'Item have been Updated successfully...');
        }else{
           $this->session->set_flashdata('g_err', 'Could not update Item details!');
        }
        redirect('item');
    }

    //To Delete Item
    public function item_delete()
    {
        $uid = $data['bid']=$_POST['id'];
        $data['item_details'] = $this->db->query("SELECT * FROM ITEMS WHERE SNO='".$uid."'")->row();
        $this->load->view('item/item_delete',$data);
    }

    public function delete()
    { 
        $bid=$_POST['field'];
        $result = $this->Item_model->item_delete($bid);
        if ($result) {
            $this->session->set_flashdata('g_success', 'Item has been Deleted successfully.');
        }
        else{
            $this->session->set_flashdata('g_err', 'Something went wrong');
        }
    }

}
?>