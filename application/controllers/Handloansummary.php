<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/* ************************************************************************************
		Purpose : To handle all Hand Loan Summary functions 2022-09-28
***************************************************************************************/
class Handloansummary extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model(array("Handloansummary_model","Accountsgroup_model"));
    	$this->load->library('user_agent');
        $fin_year=$this->Accountsgroup_model->get_fin_years_list();
        $db=substr($fin_year->DBNAME,0,strlen($fin_year->DBNAME)-4);
        //echo $db;exit;
        $config_app = switch_db_dynamic($db);
        
        $this->Handloansummary_model->other_db = $this->load->database($config_app,TRUE);
    	if (isset($this->session->userdata['username']) && $this->session->userdata['username'] == TRUE)
        {
            //do something
        }else{
            redirect('login'); //if session is not there, redirect to login page
        } 
		date_default_timezone_set("Asia/Kolkata");
    	$this->session->set_userdata('comtitle', 'Handloansummary');
	}

    public function index()
    {
        $ccode = $_SESSION['COMPANYCODE'];
        $cdate = date('Y-m-d');
        if($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            $start_date = $this->input->post('start_date');
            $company_code = $this->input->post('company_code');

            $data['start_date'] = $start_date;
            $data['company_code'] = $company_code;

            $sdate = "AND ENDATE<='".$start_date."'";

            if($company_code!='')
            {
                $ccode = " AND COMPANYCODE = '".$company_code."'";
            }
            else
            {
                $ccode = '';
            }
        }
        else
        {
            $start_date = date('Y-m-d');
            $sdate = "AND ENDATE>='".date('Y-m-d')."'";

            $data['start_date'] = $cdate;
            $data['company_code'] = '';
            $ccode = '';
        }
        $data['ccode'] = $ccode;
        $data['company_list'] = $this->Handloansummary_model->get_company_list();
        $data['handloansummary_list'] = $this->Handloansummary_model->get_handloansummary_list($start_date,$ccode);
        //print_r($data);exit;
        $this->load->view('handloansummary/handloansummary_list',$data);
    }
    public function party_history_view()
    {
        $pid = $_POST['id'];
        $data['party_details'] = $this->Handloansummary_model->get_party_by_id($pid);
        $this->load->view('handloansummary/party_history_detail',$data);
    }

}
?>