<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/* ************************************************************************************
		Purpose : To handle all Vao_group functions 2022-08-19
***************************************************************************************/
class Vao_group extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model(array("Vao_group_model"));
    	$this->load->library('user_agent');
    	if (isset($this->session->userdata['username']) && $this->session->userdata['username'] == TRUE)
        {
            //do something
        }else{
            redirect('login'); //if session is not there, redirect to login page
        } 
		date_default_timezone_set("Asia/Kolkata");
    	$this->session->set_userdata('comtitle', 'Vao_group');
	}

    public function index()
    {   

      
        $data['Vao_list'] = $this->Vao_group_model->get_vao_list();
        $this->load->view('vao_group/vao_list',$data);
    }



    public function checkunique_add()
    {

        $name = $_POST['value'];
        $result = $this->db->query("SELECT * FROM VAO_GROUP WHERE VAO_NAME='".$name."' AND status!='2' ")->row();
        
        if($result){ echo 1; }else{ echo 0; }
    }

    public function checkunique_edit()
    {
        $id   = $_POST['id'];
        $name = $_POST['value'];


        $result = $this->db->query("SELECT * FROM VAO_GROUP WHERE VAO_NAME='".$name."' AND  SNO!='".$id."' AND status!='2' ")->row();
        if($result){ echo 1; }else{ echo 0; }
    }


    public function Item_active()

    {
        $id = $this->input->post('id');
        $data['status'] = $this->input->post('status');
        $result = $this->Vao_group_model->Item_active($data,$id);
        echo 1;
    }

    public function vao_increment()

    {
        $cat_id = $_POST['cat_id'];

         $cat = $this->db->query("SELECT  * FROM CATEGORY WHERE CAT_SNO = '".$cat_id."'")->row();

        
        $cat_fltr = substr($cat->CAT_NAME, 0, 1);

        $last_item_code_detail = $this->Vao_group_model->get_last_item_details();

        $last_data_item= $last_item_code_detail->ITEM_CODE;
        $exlno = substr($last_data_item,1);
        $next_value = (int)$exlno + 1;
        $uid_item = $next_value;
        //$s_no=$r_no1;
        $data['item_code'] = $cat_fltr.$uid_item;
        echo $data['item_code'];

        //print_r($data['item_code']);exit();

    }

    //To save Vao group
    public function Vao_save()
    {
     

        $data['VAO_GID'] =str_replace(' ', '', $this->input->post('increment_name'));
        $data['VAO_NAME'] = $this->input->post('vao_name');
        $data['created_on'] = date('Y-m-d H:i:s');
        $data['created_by'] = $_SESSION['username'];
        $data['status'] = 'Y';

        $last_item_detail = $this->Vao_group_model->get_last_vao_details();

        $last_data= $last_item_detail->SNO;
        //$exlno = substr($last_data,5);
        $next_value = (int)$last_data + 1;
        $uid=str_pad($next_value,3,0,STR_PAD_LEFT);
        //$s_no=$r_no1;
        $data['vao_id'] = $uid;


        // print_r($data);
        // exit;
        $result = $this->Vao_group_model->add_vao($data);
        if($result)
        {
            $this->session->set_flashdata('g_success', 'Vao group have been Added successfully...');
        }else{
           $this->session->set_flashdata('g_err', 'Could not add Vao group details!');
        }
        redirect('Vao_group');
    }

    //Vao group Edit
    public function vao_edit()
    {
        $dcid = $_POST['id'];
        
        $data['vao_details'] = $this->Vao_group_model->get_vao_by_vao_id($dcid);
        $this->load->view('vao_group/vao_edit',$data);
    }

    public function item_unique_edit()
    {
        $val = $_POST['value'];
        $dcid = $_POST['dcid'];
        $result = $this->Vao_group_model->item_unique_edit($val,$dcid);
        echo count((array)$result);
    }

    //To update Vao group
    public function vao_update()
    {
        
        $data['sno_edit'] = $this->input->post('sno_edit');
        $data['vao_ed_name'] = $this->input->post('vao_name_edit');
        
        
        
        $result = $this->Vao_group_model->update_vao($data);
        if($result)
        {
            $this->session->set_flashdata('g_success', 'Vao group have been Updated successfully...');
        }else{
           $this->session->set_flashdata('g_err', 'Could not update Vao group details!');
        }
        redirect('Vao_group');
    }

    //To Delete Vao group
    public function vao_delete()
    {
        $uid = $data['bid']=$_POST['id'];
        $data['vao_details'] = $this->db->query("SELECT * FROM VAO_GROUP WHERE SNO='".$uid."'")->row();
        $this->load->view('vao_group/vao_delete',$data);
    }

    public function delete()
    { 
        $bid=$_POST['field'];
        $result = $this->Vao_group_model->vao_delete($bid);
        if ($result) {
            $this->session->set_flashdata('g_success', 'Vao group has been Deleted successfully.');
        }
        else{
            $this->session->set_flashdata('g_err', 'Something went wrong');
        }
    }

}
?>