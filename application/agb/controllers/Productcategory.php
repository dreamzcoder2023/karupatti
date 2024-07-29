<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/* ************************************************************************************
		Purpose : To handle all Department functions 2022-08-19
***************************************************************************************/
class Productcategory extends CI_Controller {

	// public function __construct()
	// {
	// 	parent::__construct();
	// 	$this->load->model(array("Productcategory_model"));
 //    	$this->load->library('user_agent');

 //        $fin_year=$this->Productcategory_model->get_fin_years_list();
 //        $db=substr($fin_year->DBNAME,0,strlen($fin_year->DBNAME)-4);
 //        // echo $db;exit();

 //        $config_app = switch_db_dynamic($db);
 //        $this->Productcategory_model->other_db = $this->load->database($config_app,TRUE);


 //    	if (isset($this->session->userdata['username']) && $this->session->userdata['username'] == TRUE)
 //        {
 //            //do something
 //        }else{
 //            redirect('login'); //if session is not there, redirect to login page
 //        } 
	// 	date_default_timezone_set("Asia/Kolkata");
 //    	$this->session->set_userdata('comtitle', 'Productcategory');
	// }

    public function __construct()
    {
        parent::__construct();
        $this->load->model(array("Productcategory_model"));
        $this->load->library('user_agent');
        if (isset($this->session->userdata['username']) && $this->session->userdata['username'] == TRUE)
        {
            //do something
        }else{
            redirect('login'); //if session is not there, redirect to login page
        } 
        date_default_timezone_set("Asia/Kolkata");
        $this->session->set_userdata('comtitle', 'Productcategory');
    }

    public function index()
    {   
         
        // $data['unit_list'] = $this->Productmaster_model->get_unit_list();
        //$data['category_list'] = $this->Productmaster_model->get_category_list();
        // $data['metal_list'] = $this->Productmaster_model->get_metallist_list();
        $data['products_category'] = $this->Productcategory_model->get_products_list();
        $this->load->view('productcategory/product_category',$data);
    }

    public function productcategory_active()

    {
        $id = $this->input->post('id');
        $data['Status'] = $this->input->post('Status');
        $result = $this->Productcategory_model->productcategory_active($data,$id);
        echo 1;
    }

    public function productcategory_save()
    {   
        
        // $data['prod_id'] = $this->input->post('add_pid_prod');
        $data['category_name'] = $this->input->post('category_name');
        $data['Status'] = 'Y';
        $data['created_by'] = $_SESSION['username'];
        $data['company_code'] = $_SESSION['COMPANYCODE'];
        $data['created_on'] = date('Y-m-d H:i:s');
        
        $last_sno_detail = $this->Productcategory_model->get_last_sno_details();
  
        $last_data= $last_sno_detail->KEYVALUE;
        //echo $last_data;exit;
        //$exlno = substr($last_data,5);
        $next_value = (int)$last_data + 1;
        //$uid=str_pad($next_value,3,0,STR_PAD_LEFT);
        //$s_no=$r_no1;
        $data['cat_id'] = $next_value;
        //print_r($data);exit;

        $res = $this->Productcategory_model->get_updated_keyvalue();

        $result = $this->Productcategory_model->add_productcategory($data);

        if($result)
        {
            $this->session->set_flashdata('g_success', 'Product Category have been Added successfully...');
        }else{
           $this->session->set_flashdata('g_err', 'Could not add Product Category details!');
        }
        redirect('Productcategory');
    }

    //To Delete Product Category
    public function productcategory_delete()
    {
        $sno = $data['sno']=$_POST['id'];
        $data['products_category'] = $this->db->query("SELECT * FROM PRODUCT_CATEGORY WHERE CATEGORY_ID='".$sno."'")->row();
        //print_r($data);exit();
        $this->load->view('Productcategory/product_category_delete',$data);
    }

    public function delete()
    { 
        $sno=$_POST['field'];
        $result = $this->Productcategory_model->productcategory_delete($sno);
        if ($result) {
            $this->session->set_flashdata('g_success', 'Product category has been Deleted successfully.');
        }
        else{
            $this->session->set_flashdata('g_err', 'Something went wrong');
        }
    }

    //Productcategory Edit
    public function productcategory_edit()
    {
        $pdid = $_POST['id'];
        //$data['unit_list'] = $this->Products_model->get_unit_list();
        //$data['category_list'] = $this->Products_model->get_category_list();
        $data['products_list_edit'] = $this->Productcategory_model->get_product_category_id($pdid);
        $this->load->view('Productcategory/product_category_edit',$data);
    }

    //To update Products
    public function productcategory_update()
    {    
    
       
        $data['prodcategory_edit'] = $this->input->post('prodcategory_edit');
        $data['prodcategory_name'] = $this->input->post('category_name_edit');
        $data['company_code_edit'] = $_SESSION['COMPANYCODE'];
        $data['added_user_edit'] = $_SESSION['username'];
        $data['modified_on_edit'] = date('Y-m-d H:i:s');
       
        $result = $this->Productcategory_model->update_productcategory($data);
        if($result)
        {
            $this->session->set_flashdata('g_success', 'Product category  have been updated successfully...');
        }else{
           $this->session->set_flashdata('g_err','Could not update Product Catgeory!');
        }
        redirect('Productcategory');
    } 

}
?>