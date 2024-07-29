<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/* ************************************************************************************
		Purpose : To handle all Department functions 2022-08-19
***************************************************************************************/
class Products extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model(array("Products_model"));
    	$this->load->library('user_agent');

        $fin_year=$this->Products_model->get_fin_years_list();
        $db=substr($fin_year->DBNAME,0,strlen($fin_year->DBNAME)-4);
        // echo $db;exit();

        $config_app = switch_db_dynamic($db);
        $this->Suppliers_model->other_db = $this->load->database($config_app,TRUE);


    	if (isset($this->session->userdata['username']) && $this->session->userdata['username'] == TRUE)
        {
            //do something
        }else{
            redirect('login'); //if session is not there, redirect to login page
        } 
		date_default_timezone_set("Asia/Kolkata");
    	$this->session->set_userdata('comtitle', 'Products');
	}

    public function index()
    {   
         
        $data['unit_list'] = $this->Products_model->get_unit_list();
        $data['category_list'] = $this->Products_model->get_category_list();
        // $data['metal_list'] = $this->Products_model->get_metallist_list();
        $data['products_list'] = $this->Products_model->get_products_list();
        $this->load->view('Products/products_list',$data);
    }

    public function products_active()

    {
        $id = $this->input->post('id');
        $data['Status'] = $this->input->post('Status');
        $result = $this->Products_model->products_active($data,$id);
        echo 1;
    }

    public function products_save()
    {   
        
        // $data['prod_id'] = $this->input->post('add_pid_prod');
        $data['prod_code'] = $this->input->post('add_itcode_prod');
        $data['prod_name'] = $this->input->post('add_Iname_prod');
        $data['prod_metal'] = $this->input->post('metal_list_prod');
        $data['prod_unit'] = $this->input->post('unit_list_prod');
        $data['prod_category'] = $this->input->post('category_list_prod');
        $data['prod_pur_rate'] = $this->input->post('add_pur_rat_prod');
        $data['sales_rate'] = $this->input->post('add_sl_rat_prod');
        $data['prod_hsn'] = $this->input->post('add_hsn_prod');
        $data['prod_op_stk'] = $this->input->post('add_op_st_prod');
        $data['prod_op_rate'] = $this->input->post('add_op_rat_prod');
        $data['prod_op_val'] = $this->input->post('add_op_vl_prod');
        $data['prod_curr_stk'] = $this->input->post('add_cur_st_prod');
        $data['prod_rate'] = $this->input->post('add_cur_rt_prod');
        $data['prod_curr_val'] = $this->input->post('add_cur_val_prod');
        $data['prod_gst'] = $this->input->post('add_gst_per_prod');
        $data['prod_rmks'] = $this->input->post('prod_rmks');
        $data['added_user'] = $_SESSION['username'];
        $data['company_code'] = $_SESSION['COMPANYCODE'];
        $data['created_on'] = date('Y-m-d H:i:s');
       

        $last_sno_detail = $this->Products_model->get_last_sno_details();
  
        $last_data= $last_sno_detail->ITEM_SNO;
        //echo $last_data;exit;
        //$exlno = substr($last_data,5);
        $next_value = (int)$last_data + 1;
        $uid=str_pad($next_value,3,0,STR_PAD_LEFT);
        //$s_no=$r_no1;
        $data['prod_id'] = $uid;
        //print_r($data);exit;

        $result = $this->Products_model->add_products($data);

        if($result)
        {
            $this->session->set_flashdata('g_success', 'Products have been Added successfully...');
        }else{
           $this->session->set_flashdata('g_err', 'Could not add Products details!');
        }
        redirect('Products');
    }

    //To Delete Products
    public function products_delete()
    {
        $sno = $data['sno']=$_POST['id'];
        $data['products_list'] = $this->db->query("SELECT * FROM PRODUCTS WHERE ITEM_SNO='".$sno."'")->row();
        // print_r($data);exit();
        $this->load->view('Products/products_delete',$data);
    }

    public function delete()
    { 
        $sno=$_POST['field'];
        $result = $this->Products_model->products_delete($sno);
        if ($result) {
            $this->session->set_flashdata('g_success', 'Product has been Deleted successfully.');
        }
        else{
            $this->session->set_flashdata('g_err', 'Something went wrong');
        }
    }

    //Products Edit
    public function products_edit()
    {
        $pdid = $_POST['id'];
        $data['unit_list'] = $this->Products_model->get_unit_list();
        $data['category_list'] = $this->Products_model->get_category_list();
        $data['products_list_edit'] = $this->Products_model->get_product_details_id($pdid);
        $this->load->view('Products/products_edit',$data);
    }

    //To update Products
    public function products_update()
    {    
        $data['edit_products'] = $this->input->post('edit_products');
        $data['prod_code_edit'] = $this->input->post('edit_itcode_prod');
        $data['prod_name_edit'] = $this->input->post('edit_Iname_prod');
        $data['Product_list_edit'] = $this->input->post('metal_list_prod_edit');
        $data['prod_unit_edit'] = $this->input->post('unit_list_prod_edit');
        $data['prod_category_edit'] = $this->input->post('category_list_prod_edit');
        $data['prod_pur_rate_edit'] = $this->input->post('edit_pur_rat_prod');
        $data['sales_rate_edit'] = $this->input->post('edit_sl_rat_prod');
        $data['prod_hsn_edit'] = $this->input->post('edit_hsn_prod');
        $data['prod_op_stk_edit'] = $this->input->post('edit_op_st_prod');
        $data['prod_op_rate_edit'] = $this->input->post('edit_op_rat_prod');
        $data['prod_op_val_edit'] = $this->input->post('edit_op_vl_prod');
        $data['prod_curr_stk_edit'] = $this->input->post('edit_cur_st_prod');
        $data['prod_rate_edit'] = $this->input->post('edit_cur_rt_prod');
        $data['prod_curr_val_edit'] = $this->input->post('edit_cur_val_prod');
        $data['prod_gst_edit'] = $this->input->post('edit_gst_per_prod');
        $data['prod_rmks_edit'] = $this->input->post('prod_rmks_edit');
        $data['added_user_edit'] = $_SESSION['username'];
        $data['company_code_edit'] = $_SESSION['COMPANYCODE'];
        $data['modified_on_edit'] = date('Y-m-d H:i:s');
       
        $result = $this->Products_model->update_products($data);
        if($result)
        {
            $this->session->set_flashdata('g_success', 'Product details have been Updated successfully...');
        }else{
           $this->session->set_flashdata('g_err', 'Could not update Product details!');
        }
        redirect('Products');
    }


    // To View the Product Details

    public function products_view()
    {
        
        $pd_vw = $_POST['id'];
        // $data['company_list'] = $this->staff_model->get_company_list();
        // $data['city_list'] = $this->staff_model->get_city_list();
        // $data['role_list'] = $this->staff_model->get_role_list();
        $data['products_list'] = $this->Products_model->get_products_view($pd_vw);
        $this->load->view('Products/products_view',$data);

    }

}
?>