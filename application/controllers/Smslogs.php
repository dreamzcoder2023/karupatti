<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/* ************************************************************************************
        Purpose : To handle all Department functions 2022-08-19
***************************************************************************************/
class Smslogs extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model(array("Smslogs_model"));
        $this->load->library('user_agent');
        if (isset($this->session->userdata['username']) && $this->session->userdata['username'] == TRUE)
        {
            //do something
        }else{
            redirect('login'); //if session is not there, redirect to login page
        } 
        date_default_timezone_set("Asia/Kolkata");
        $this->session->set_userdata('comtitle', 'Smslogs');
    }

     public function index()
     {
       
        $data['sms_type'] = $this->Smslogs_model->get_sms_logs();
        $data['party_id'] = $this->Smslogs_model->get_partyid_list();
        // $data['PARTYNAME'] = $this->Smslogs_model->get_partyname_view();
        // $data['ISSENT'] = $this->Smslogs_model->get_smstatus_view();

        $from_date_smslogs = $this->input->post('from_date_smslogs');
        $to_date_smslogs = $this->input->post('to_date_smslogs');
        $logtype_smslogs = $this->input->post('logtype_smslogs');
        
        $data['from_date_smslogs'] = $from_date_smslogs;
        $data['to_date_smslogs'] = $to_date_smslogs;
        $data['logtype_smslogs'] = $logtype_smslogs;
       

        if($from_date_smslogs != '')
        {
            $fdexp = explode('-', $from_date_smslogs);
            $fd = $fdexp[2].'-'.$fdexp[1].'-'.$fdexp[0];
            $fdate = "AND CAST(sms_date as DATE)>='".$fd."'";
        }
        else{
            $fdate = "";
        }

        if($to_date_smslogs != '')
        {
            $tdexp = explode('-', $to_date_smslogs);
            $td = $tdexp[2].'-'.$tdexp[1].'-'.$tdexp[0];
            $tdate = "AND CAST(sms_date as DATE)<='".$td."'";
        }
        else{
            $tdate = "";
        }

        if($logtype_smslogs != '')
        {
            $ltype = "AND sms_type='".$logtype_smslogs."'";
        }
        else{
            $ltype = "";
        }


        if($fdate!='' || $tdate!='' || $ltype!='')
        {
            $data['sms_log_list'] = $this->Smslogs_model->get_smslog_list($fdate,$tdate,$ltype);
        }
        else
        {
            $data['sms_log_list'] = array();
        }

        $this->load->view('smslogs/smslogs_list',$data);
     }

}
?>