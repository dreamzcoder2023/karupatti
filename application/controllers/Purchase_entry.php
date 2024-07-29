<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/* ************************************************************************************
		Purpose : To handle all Department functions 2022-08-19
***************************************************************************************/
class Purchase_entry extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model(array("Purchaseentry_model"));
       	$this->load->library('user_agent');

           $fin_year=$this->Purchaseentry_model->get_fin_years_list();
        $db=substr($fin_year->DBNAME,0,strlen($fin_year->DBNAME)-4);
        // echo $db;exit();

        $config_app = switch_db_dynamic($db);
        $this->Purchaseentry_model->other_db = $this->load->database($config_app,TRUE);


    	if (isset($this->session->userdata['username']) && $this->session->userdata['username'] == TRUE)
        {
            //do something
        }else{
            redirect('login'); //if session is not there, redirect to login page
        } 
		date_default_timezone_set("Asia/Kolkata");
    	$this->session->set_userdata('comtitle', 'Purchase_entry');
	}

    // public function __construct()
    // {
    //     parent::__construct();
    //     $this->load->model(array("Lotentry_model"));
    //     $this->load->library('user_agent');
    //     if (isset($this->session->userdata['username']) && $this->session->userdata['username'] == TRUE)
    //     {
    //         //do something
    //     }else{
    //         redirect('login'); //if session is not there, redirect to login page
    //     } 
    //     date_default_timezone_set("Asia/Kolkata");
    //     $this->session->set_userdata('comtitle', 'Lotentry');
    // }

    public function index()
    {   
         
        $data['suppliers_list'] = $this->Purchaseentry_model->get_supplier_name_list();
        $data['bankers_list'] = $this->Purchaseentry_model->get_banks_list();
        $data['Lotentry_list'] = $this->Purchaseentry_model->get_lotentry_list();
        $data['item_list'] = $this->Purchaseentry_model->get_item_list();
        //$data['attended_by'] = $this->Purchaseentry_model->get_stafflist_list();
        //$data['products_master'] = $this->Lotentry_model->get_products_list();
        $this->load->view('purchase_entry/purchase_entry',$data);
    }

    // public function lotentry_delete()
    // {
    //     $sno = $data['sno']=$_POST['id'];
    //     $data['Lotentry_list'] = $this->db->query("SELECT * FROM LOTENTRY WHERE LOT_ID='".$sno."'")->row();
    //     // print_r($data);exit();
    //     $this->load->view('lotentry/lotentry_delete',$data);
    // }

    // public function delete()
    // { 
    //     $sno=$_POST['field'];
    //     $result = $this->Lotentry_model->lotentry_delete($sno);
    //     if ($result) {
    //         $this->session->set_flashdata('g_success', 'Lot entry has been deleted successfully.');
    //     }
    //     else{
    //         $this->session->set_flashdata('g_err', 'Something went wrong');
    //     }
    // }

    public function add_purchase_entry(){


    $data['suppliers_list'] = $this->Purchaseentry_model->get_supplier_name_list();
    $data['bankers_list'] = $this->Purchaseentry_model->get_banks_list();
    $data['Lotentry_list'] = $this->Purchaseentry_model->get_lotentry_list();
    $data['item_list'] = $this->Purchaseentry_model->get_item_list();
    $data['subitem_list'] = $this->Purchaseentry_model->get_sub_item_list();

    $this->load->view('Purchase_entry/new_purchase_page',$data);
        
    }

    public function get_total_values(){

        $data['total_values'] = $this->Purchaseentry_model->get_zone_list();
    }

    // public function lotentrylist_active()

    // {
    //     $id = $this->input->post('id');
    //     $data['status'] = $this->input->post('status');
    //     $result = $this->Lotentry_model->lotentry_active($data,$id);
    //     echo 1;
    // }

    // To view the Lot entry Details

    public function purchaseentry_view()
    {
        
        $lot_vw = $_POST['id'];
        $data['suppliers_list'] = $this->Purchaseentry_model->get_supplier_name_list();
        $data['bankers_list'] = $this->Purchaseentry_model->get_banks_list();
        //$data['role_list'] = $this->Lotentry_model->get_role_list();
        $data['purchaseentry_view_list'] = $this->Purchaseentry_model->get_purchaseentry_view($lot_vw);
        $data['purchaseentry_items_list'] = $this->Purchaseentry_model->get_items_list_view($lot_vw);
        $this->load->view('purchase_entry/view_purchase_page',$data);

    }

    //Autocomplete fuction

    public function item_name_select()
    {
        
        //$t1=$_POST['item_gold'];
        $data['item_list'] = $this->Purchaseentry_model->get_item_list();
        //$this->load->view('purchase_entry/new_purchase_page',$data);

        echo json_encode($data);

    }

    public function puchase_entry_save()

    {   
      

        $data['item_name'] = array_filter($this->input->post('item_gold'));
        $data['subitem_name'] = array_filter($this->input->post('subitem_gold'));
        $data['purity_table'] = array_filter($this->input->post('gold_purity'));
        $data['count_table'] = array_filter($this->input->post('gold_count'));
        $data['weight_table'] = array_filter($this->input->post('gold_weight'));
        $data['metal_table'] = $this->input->post('metal_new_purchase');
        $data['entry_date'] = $this->input->post('date');
        $data['status'] = 'Y';
        $data['added_user'] = $_SESSION['username'];
        $data['created_on'] = date('Y-m-d H:i:s');

        //print_r($data['metal_table']);exit();


        $data['date'] = $this->input->post('date');
        $data['supplier_name'] = $this->input->post('supplier_list_newpurchase');
        $data['metal_type'] = $this->input->post('metal_new_purchase');
        $data['all_item_name'] = array_filter($this->input->post('item_gold'));
        //$data['subitem_name'] = $this->input->post('subitem_gold');
        $data['purity_lot'] = array_filter($this->input->post('gold_purity'));
        $data['all_count'] = array_sum($this->input->post('gold_count'));
        $data['all_weight'] = array_sum($this->input->post('gold_weight'));
        // $data['total_count'] = $this->input->post('total_count');
        // $data['total_weight'] = $this->input->post('total_weight');
        $data['other_charges'] = $this->input->post('other_charges');
        $data['amount_pay']    = $this->input->post('amount_pay');
        $data['paid_amount_pay'] = $this->input->post('paid_amount_pay')?$this->input->post('paid_amount_pay'):0;
        $data['bal_amount']    = $this->input->post('bal_amount')?$this->input->post('bal_amount'):0; 
        $data['cash_pay'] = $this->input->post('cash_pay');
        $data['cheq_pay'] = $this->input->post('cheq_pay');
        $data['bank_cheq'] = $this->input->post('bank_cheq');
        $data['cheq_no'] = $this->input->post('cheq_no');
        $data['rtgs_pay'] = $this->input->post('rtgs_pay')?$this->input->post('rtgs_pay'):0;
        $data['bank_rtgs'] = $this->input->post('bank_rtgs');
        $data['rtgs_trans'] = $this->input->post('rtgs_trans');
        $data['purity_pay'] = $this->input->post('purity_pay');
        $data['rate_pay'] = $this->input->post('rate_pay');
        $data['metal_pay'] = $this->input->post('metal_pay');


        $last_sno_detail = $this->Purchaseentry_model->get_last_sno_details();
        
        $last_data= $last_sno_detail ? $last_sno_detail->LOT_ID:0;

        //echo $last_data;exit;
        //$exlno = substr($last_data,5);
        $next_value = (int)$last_data + 1;
        //$uid=str_pad($next_value,3,0,STR_PAD_LEFT);
        //$s_no=$r_no1;
        $data['lot_id'] = $next_value;
        //print_r($data);exit;

        $res = $this->Purchaseentry_model->add_product_master($data);


        if($res)
        {
            
            $result = $this->Purchaseentry_model->add_purchase_entry($data);

            $this->session->set_flashdata('g_success', 'Purchase entry have been added successfully...');
        }else{
           $this->session->set_flashdata('g_err', 'Could not add Purchase entry details!');
        }
        redirect('Purchase_entry');
    }

}
?>