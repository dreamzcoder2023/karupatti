<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/* ************************************************************************************
        Purpose : To handle all the village functions
***************************************************************************************/
class Day_lock extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();


        //  $this->load->model(array("Redemption_model","Accountsgroup_model",
        //     "Loan_model","Loanreceipt_model"));
        
        // $fin_year=$this->Accountsgroup_model->get_fin_years_list();
        // $db=substr($fin_year->DBNAME,0,strlen($fin_year->DBNAME)-4);
        
        // $config_app = switch_db_dynamic($db);
        // $this->Redemption_model->other_db = $this->load->database($config_app,TRUE);

        //if ($this->session->userdata['username'] == TRUE)
        if (isset($this->session->userdata['username']) && $this->session->userdata['username'] == TRUE)
        {
            

        }else{
            redirect('login'); //if session is not there, redirect to login page
        } 
        date_default_timezone_set("Asia/Kolkata");
        $dt_flag=1;
        $this->session->set_userdata('comtitle', 'Redemption');
    }
    public function index()
    {
        $first='2023-06-23 13:52:50';
        $last='2011-01-03 17:13:00';

        $start_date=date('Y-m-d',strtotime($first));
        $start_time=date('G:i',strtotime($first));
        $end_date=date('Y-m-d',strtotime($last));
        $end_time=date('G:i',strtotime($last));
        $before=date("Y-m-d G:i:s",strtotime($first)-(60*30));
        $date = date('Y-m-d G:i:s');
        if($date==$before){
            $this->load->view('day_lock/day_lock');
        }
        else{
            $this->load->view('day_lock/day_lock');
            // redirect('Day_lock');      
        }
    }
    public function update()
    {
    $start_date=date("Y-m-d G:i:s",strtotime($_POST['start_date']));
    // print_r($start_date);exit;
    $end_date=date("Y-m-d G:i:s",strtotime($_POST['end_date']));
    $res=$this->db->query("Update day_lock set start_date='".$start_date."' , end_date='".$end_date."' where id='1'");
    }
}