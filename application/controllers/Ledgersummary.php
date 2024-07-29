<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/* ************************************************************************************
		Purpose : To handle all Ledgersummary functions 2022-10-18
***************************************************************************************/
class Ledgersummary extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model(array("Ledgersummary_model","Accountsgroup_model"));
    	$this->load->library('user_agent');
        $fin_year=$this->Accountsgroup_model->get_fin_years_list();
        $db=substr($fin_year->DBNAME,0,strlen($fin_year->DBNAME)-4);
        //echo $db;exit;
        $config_app = switch_db_dynamic($db);
        
        $this->Ledgersummary_model->other_db = $this->load->database($config_app,TRUE);
    	if (isset($this->session->userdata['username']) && $this->session->userdata['username'] == TRUE)
        {
            //do something
        }else{
            redirect('login'); //if session is not there, redirect to login page
        } 
		date_default_timezone_set("Asia/Kolkata");
    	$this->session->set_userdata('comtitle', 'Ledgersummary');
	}

    public function index()
    {
        $ccode = $_SESSION['COMPANYCODE'];
        $cdate = date('Y-m-d');

        if($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            $filter_by = $this->input->post('filter_by');
            $stdate = $start_date = $this->input->post('start_date');
            $end_date = $this->input->post('end_date');
            $sort_type = $this->input->post('sort_type');
            $account_led_name = $this->input->post('account_led_name');
            $account_led_id = $this->input->post('account_led_id');

            $data['filter_by'] = $filter_by;
            $data['start_date'] = $start_date;
            $data['end_date'] = $end_date;
            $data['sort_type'] = $sort_type;
            $data['account_led_name'] = $account_led_name;
            $data['account_led_id'] = $account_led_id;
            $fin_year=$this->Accountsgroup_model->get_fin_years_list();
            $data['fin_year_start_date'] = $fin_year->FDATE;
        }
        else
        {
            $cdate = date('Y-m-d');

            $stdate = $start_date = $cdate;
            $end_date = $cdate;

            $filter_by = $data['filter_by'] = 'thisyear';
            $fin_year=$this->Accountsgroup_model->get_fin_years_list();
            $data['start_date'] = $fin_year->FDATE;
            $data['end_date'] = $fin_year->LDATE;
            $sort_type = $data['sort_type'] = 'asc';
            $data['account_led_name'] = '';
            $data['account_led_id'] = '';
            $data['fin_year_start_date'] = $fin_year->FDATE;
        }
        //print_r($data);exit;

        $this->load->view('ledgersummary/ledgersummary_list',$data);
    }

    public function get_ledger_info()
    {
        $ledger_id = $_POST['id'];

        $ledger_info = $this->Ledgersummary_model->get_ledger_info($ledger_id);

        echo $ledger_info->GROUP_NAME.' --- '.$ledger_info->UNDER_GROUP;
    }

    public function getDate()
    {
        $fby = $_POST['val'];
        if($fby == 'thisyear')
        {
            $fin_year=$this->Accountsgroup_model->get_fin_years_list();
            $start_date = $fin_year->FDATE;
            $end_date = $fin_year->LDATE;
        }
        elseif($fby == 'thismonth')
        {
            $start_date = date('Y-m-01');
            $end_date = date('Y-m-t');
            if($end_date>date('Y-m-d'))
            {
                $end_date = date('Y-m-d');
            }
        }
        elseif($fby == 'thisweek')
        {
            $monday = strtotime("last monday");
            $monday = date('w', $monday)==date('w') ? $monday+7*86400 : $monday;
            $sunday = strtotime(date("Y-m-d",$monday)." +6 days");
            $start_date = date("Y-m-d",$monday);
            $end_date = date("Y-m-d",$sunday);
            if($end_date>date('Y-m-d'))
            {
                $end_date = date('Y-m-d');
            }
        }
        elseif($fby == 'lastmonth')
        {
            $start_date = date('Y-m-d', strtotime('first day of last month'));
            $end_date = date('Y-m-d', strtotime('last day of last month'));
        }
        else
        {
            $previous_week = strtotime("-1 week +1 day");
            $start_week = strtotime("last monday midnight",$previous_week);
            $end_week = strtotime("next sunday",$start_week);
            $start_date = date("Y-m-d",$start_week);
            $end_date = date("Y-m-d",$end_week);
        }

        echo 'date||'.$start_date.'||'.$end_date;
    }

}
?>