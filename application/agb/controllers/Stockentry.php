<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/* ************************************************************************************
        Purpose : To handle all Department functions 2022-08-19
***************************************************************************************/
class Stockentry extends CI_Controller {

    // public function __construct()
    // {
    //     parent::__construct();
    //     $this->load->model(array("Tagentry_model"));
    //     $this->load->library('user_agent');

    //     $fin_year=$this->Tagentry_model->get_fin_years_list();
    //     $db=substr($fin_year->DBNAME,0,strlen($fin_year->DBNAME)-4);
    //     // echo $db;exit();

    //     $config_app = switch_db_dynamic($db);
    //     $this->Tagentry_model->other_db = $this->load->database($config_app,TRUE);


    //     if (isset($this->session->userdata['username']) && $this->session->userdata['username'] == TRUE)
    //     {
    //         //do something
    //     }else{
    //         redirect('login'); //if session is not there, redirect to login page
    //     } 
    //     date_default_timezone_set("Asia/Kolkata");
    //     $this->session->set_userdata('comtitle', 'Stockentry');
    // }

    public function __construct()
    {
        parent::__construct();
        $this->load->model(array("Stockentry_model"));
        $this->load->library('user_agent');
        if (isset($this->session->userdata['username']) && $this->session->userdata['username'] == TRUE)
        {
            //do something
        }else{
            redirect('login'); //if session is not there, redirect to login page
        } 
        date_default_timezone_set("Asia/Kolkata");
        $this->session->set_userdata('comtitle', 'Stockentry');
    }

    public function index()
    {   
         
        //$data['suppliers_list'] = $this->Tagentry_model->get_supplier_name_list();
        //$data['bankers_list'] = $this->Tagentry_model->get_banks_list();
        
        //$data['attended_by'] = $this->Purchaseentry_model->get_stafflist_list();
        //$data['products_master'] = $this->Lotentry_model->get_products_list();
        $date = '';
        $from_date = $this->input->post('from_date');
        $to_date = $this->input->post('to_date');

        $c_from_date = date("Y-m-d",strtotime($from_date));
        $t_to_date = date("Y-m-d",strtotime($to_date));
        // $fdexp = explode('-', $from_date);
        // $from_date = $fdexp[2].'-'.$fdexp[1].'-'.$fdexp[0];
        // $to_date = $this->input->post('to_date');
        // $fdexp = explode('-', $to_date);
        // $to_date = $fdexp[2].'-'.$fdexp[1].'-'.$fdexp[0];
        $data['from_date'] = $c_from_date;
        $data['to_date'] = $t_to_date;
        $date = "AND LOTENTRY.ENTRY_DATE BETWEEN '".$c_from_date."' AND '".$t_to_date."' ";

                

        if($date !='')
        {
        
        // print_r($alter_remarks);exit();
            $data['stockentry_list'] = $this->Stockentry_model->get_stockentry_list($date);
        }
        else
        {   
            $data['stockentry_list'] = array();
        }            
        
        $this->load->view('stockentry/stock_entry',$data);
    }

    public function audit_active()

    {
        $id = $this->input->post('id');
        $data['Active'] = $this->input->post('status');
        $result = $this->Stockentry_model->audit_active($data,$id);
        echo 1;
    }
   
}
?>