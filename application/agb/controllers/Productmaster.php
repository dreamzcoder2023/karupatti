<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/* ************************************************************************************
		Purpose : To handle all Department functions 2022-08-19
***************************************************************************************/
class Productmaster extends CI_Controller {

	// public function __construct()
	// {
	// 	parent::__construct();
	// 	$this->load->model(array("Productmaster_model"));
 //    	$this->load->library('user_agent');

 //        $fin_year=$this->Productmaster_model->get_fin_years_list();
 //        $db=substr($fin_year->DBNAME,0,strlen($fin_year->DBNAME)-4);
 //        // echo $db;exit();

 //        $config_app = switch_db_dynamic($db);
 //        $this->Productmaster_model->other_db = $this->load->database($config_app,TRUE);


 //    	if (isset($this->session->userdata['username']) && $this->session->userdata['username'] == TRUE)
 //        {
 //            //do something
 //        }else{
 //            redirect('login'); //if session is not there, redirect to login page
 //        } 
	// 	date_default_timezone_set("Asia/Kolkata");
 //    	$this->session->set_userdata('comtitle', 'Productmaster');
	// }

    public function __construct()
    {
        parent::__construct();
        $this->load->model(array("Productmaster_model"));
        $this->load->library('user_agent');
        if (isset($this->session->userdata['username']) && $this->session->userdata['username'] == TRUE)
        {
            //do something
        }else{
            redirect('login'); //if session is not there, redirect to login page
        } 
        date_default_timezone_set("Asia/Kolkata");
        $this->session->set_userdata('comtitle', 'Productmaster');
    }

    public function index()
    {   
         
        $data['unit_list'] = $this->Productmaster_model->get_unit_list();
        $data['category_list'] = $this->Productmaster_model->get_category_list();
        //$data['metal_list'] = $this->Productmaster_model->get_metallist_list();
        $data['products_master'] = $this->Productmaster_model->get_products_list();
        $this->load->view('productmaster/product_master',$data);
    }

    public function products_active()

    {
        $id = $this->input->post('id');
        $data['status'] = $this->input->post('status');
        $result = $this->Productmaster_model->products_active($data,$id);
        echo 1;
    }

    public function productmaster_save()
    {   
        
        // $data['prod_id'] = $this->input->post('add_pid_prod');
        //$data['add_pid_prodmaster'] = $this->input->post('add_pid_prodmaster');
        $data['add_itcode_prodmaster'] = $this->input->post('add_itcode_prodmaster');
        $data['add_Iname_prodmaster'] = $this->input->post('add_Iname_prodmaster');
        $data['add_mty_prodmaster'] = $this->input->post('add_mty_prodmaster');
        $data['add_uty_prodmaster'] = $this->input->post('add_uty_prodmaster');
        $data['add_cty_prodmaster'] = $this->input->post('add_cty_prodmaster');   
        $data['added_user'] = $_SESSION['username'];
        $data['created_on'] = date('Y-m-d H:i:s');
       

        $last_sno_detail = $this->Productmaster_model->get_last_sno_details();
  
        $last_data= $last_sno_detail->KEYVALUE;
        //echo $last_data;exit;
        //$exlno = substr($last_data,5);
        $next_value = (int)$last_data + 1;
        $uid=str_pad($next_value,3,0,STR_PAD_LEFT);
        //$s_no=$r_no1;
        $data['prod_id'] = $uid;
        //print_r($data);exit;

        $res = $this->Productmaster_model->get_updated_keyvalue($data);

        $result = $this->Productmaster_model->add_productmaster($data);

        if($result)
        {
            $this->session->set_flashdata('g_success', 'Product Master have been Added successfully...');
        }else{
           $this->session->set_flashdata('g_err', 'Could not add Products details!');
        }
        redirect('Productmaster');
    }

    //To Delete Products
    public function productmaster_delete()
    {
        $sno = $data['sno']=$_POST['id'];
        $data['products_master'] = $this->db->query("SELECT * FROM PRODUCT_MASTER WHERE PRODUCT_ID='".$sno."'")->row();
        // print_r($data);exit();
        $this->load->view('productmaster/product_master_delete',$data);
    }

    public function delete()
    { 
        $sno=$_POST['field'];
        $result = $this->Productmaster_model->productmaster_delete($sno);
        if ($result) {
            $this->session->set_flashdata('g_success', 'Product master has been deleted successfully.');
        }
        else{
            $this->session->set_flashdata('g_err', 'Something went wrong');
        }
    }

    //Products Edit
    public function productmaster_edit()
    {
        $pdid = $_POST['id'];
        $data['unit_list'] = $this->Productmaster_model->get_unit_list();
        $data['category_list'] = $this->Productmaster_model->get_category_list();
        $data['productmaster_list_edit'] = $this->Productmaster_model->get_product_details_id($pdid);
        $this->load->view('Productmaster/product_master_edit',$data);
    }

    //To update Products
    public function productmaster_update()
    {    
        $data['edit_pid_prodmaster'] = $this->input->post('edit_pid_prodmaster');
        $data['edit_itcode_prodmaster'] = $this->input->post('edit_itcode_prodmaster');
        $data['edit_Iname_prodmaster'] = $this->input->post('edit_Iname_prodmaster');
        $data['edit_metal_prodmaster'] = $this->input->post('edit_metal_prodmaster');
        $data['edit_unit_prodmaster'] = $this->input->post('edit_unit_prodmaster');
        $data['edit_cty_prodmaster'] = $this->input->post('edit_cty_prodmaster');
        $data['added_user_edit'] = $_SESSION['username'];
        $data['company_code_edit'] = $_SESSION['COMPANYCODE'];
        $data['modified_on_edit'] = date('Y-m-d H:i:s');
       
        $result = $this->Productmaster_model->update_productmaster($data);
        if($result)
        {
            $this->session->set_flashdata('g_success', 'Product master details have been updated successfully...');
        }else{
           $this->session->set_flashdata('g_err', 'Could not update Product details!');
        }
        redirect('Productmaster');
    }


    // // To View the Product Details

    public function productmaster_view()
    {
        
        $pd_vw = $_POST['id'];
        // $data['company_list'] = $this->staff_model->get_company_list();
        // $data['city_list'] = $this->staff_model->get_city_list();
        // $data['role_list'] = $this->staff_model->get_role_list();
        $data['productmaster_view_list'] = $this->Productmaster_model->get_products_view($pd_vw);
        $this->load->view('productmaster/product_master_view',$data);

    }

}
?>