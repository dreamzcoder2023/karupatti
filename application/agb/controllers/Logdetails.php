<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/* ************************************************************************************
		Purpose : To handle all Department functions 2022-08-19
***************************************************************************************/
class Logdetails extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model(array("Logdetails_model"));
    	$this->load->library('user_agent');
    	if (isset($this->session->userdata['username']) && $this->session->userdata['username'] == TRUE)
        {
            //do something
        }else{
            redirect('login'); //if session is not there, redirect to login page
        } 
		date_default_timezone_set("Asia/Kolkata");
    	$this->session->set_userdata('comtitle', 'Logdetails');
	}

     public function index()
     {
        $data['log_code'] = $this->Logdetails_model->get_log_code();
        $data['staff_list'] = $this->Logdetails_model->get_staff_list();

        /*if(isset($_POST))
        {
            print_r($_POST);exit;
        }*/

        $from_date = $this->input->post('from_date');
        $to_date = $this->input->post('to_date');
        $logtype_logdetails = $this->input->post('logtype_logdetails');
        $username_logdetails = $this->input->post('username_logdetails');
        $oldentry_list = $this->input->post('oldentry_list');

        $data['from_date'] = $from_date;
        $data['to_date'] = $to_date;
        $data['logtype_logdetails'] = $logtype_logdetails;
        $data['username_logdetails'] = $username_logdetails;
        $data['oldentry_list'] = $oldentry_list;

        if($from_date != '')
        {
            $fdexp = explode('-', $from_date);
            $fd = $fdexp[2].'-'.$fdexp[1].'-'.$fdexp[0];
            $fdate = "AND CAST(LOG_DATE as DATE)>='".$fd."'";
        }
        else{
            $fdate = "";
        }

        if($to_date != '')
        {
            $tdexp = explode('-', $to_date);
            $td = $tdexp[2].'-'.$tdexp[1].'-'.$tdexp[0];
            $tdate = "AND CAST(LOG_DATE as DATE)<='".$td."'";
        }
        else{
            $tdate = "";
        }

        if($logtype_logdetails != '')
        {
            $ltype = "AND LOG_CODE='".$logtype_logdetails."'";
        }
        else{
            $ltype = "";
        }

        if($username_logdetails != '')
        {
            $utype = "AND ADDED_USER='".$username_logdetails."'";
        }
        else{
            $utype = "";
        }

        //print_r($data);exit;

        if($oldentry_list != '')
        {
            $oentry = "AND LOG_TYPE='P'";
        }
        else{
            $oentry = "";
        }

        if($fdate!='' || $tdate!='' || $ltype!='' || $utype!='' || $oentry!='')
        {
            $data['log_list'] = $this->Logdetails_model->get_log_list($fdate,$tdate,$ltype,$utype,$oentry);
        }
        else
        {
            $data['log_list'] = array();
        }

        $this->load->view('logs/logdetails_list',$data);
     }

}
?>