<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/* ************************************************************************************
        Purpose : To handle all Department functions 2022-08-19
***************************************************************************************/
class Loansummary extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model(array("Loansummary_model"));
        $this->load->library('user_agent');
        if (isset($this->session->userdata['username']) && $this->session->userdata['username'] == TRUE)
        {
            //do something
        }else{
            redirect('login'); //if session is not there, redirect to login page
        } 
        date_default_timezone_set("Asia/Kolkata");
        $this->session->set_userdata('comtitle','Loansummary');
    }

    public function upd_remarks(){

        $bill_no = $_POST['bill_no'];

        if($bill_no){
            $remarks = $_POST['input_value'];
            // echo ($remarks);exit;
            $this->Loansummary_model->get_remarks($bill_no,$remarks);

            echo "success";
        }
        

        //print_r($data);exit();

       // print_r ($data['remarks']);

    }

     public function index()
     {
         if(isset($_POST['bill_no'])){

            $bill_no = $_POST['bill_no'];
            // $remarks = $_POST['up_remks'];
            // // echo ($remarks);exit;
            // $this->Loansummary_model->get_remarks($bill_no,$remarks);

          
            
        // echo $_POST['bill_no'];exit();

            $data['loan_data'] = $this->Loansummary_model->get_loan_details($bill_no);

            $data['loan_view'] = $this->Loansummary_model->get_status_loan_details($bill_no);


            // $data['redem_view'] = $this->Loansummary_model->get_closed_loan_details($bill_no);

             // print_r($data);exit();
        }

        else
        {
            $data['loan_data'] = array();
        }

       
        $this->load->view('loansummary/loansummary',$data);

    }
  


    

    
}      