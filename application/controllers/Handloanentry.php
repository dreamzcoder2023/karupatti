<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/* ************************************************************************************
		Purpose : To handle all Hand Loan Entry functions 2022-09-28
***************************************************************************************/
class Handloanentry extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model(array("Handloanentry_model","Accountsgroup_model"));
    	$this->load->library('user_agent');
        $fin_year=$this->Accountsgroup_model->get_fin_years_list();
        $db=substr($fin_year->DBNAME,0,strlen($fin_year->DBNAME)-4);
        //echo $db;exit;
        $config_app = switch_db_dynamic($db);
        
        $this->Handloanentry_model->other_db = $this->load->database($config_app,TRUE);
    	if (isset($this->session->userdata['username']) && $this->session->userdata['username'] == TRUE)
        {
            //do something
        }else{
            redirect('login'); //if session is not there, redirect to login page
        } 
		date_default_timezone_set("Asia/Kolkata");
    	$this->session->set_userdata('comtitle', 'Handloanentry');
	}

    public function index()
    {
        $ccode = $_SESSION['COMPANYCODE'];
        $cdate = date('Y-m-d');
        if($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            //$day_period = $this->input->post('day_period');
            $start_date = $this->input->post('start_date');
            $end_date = $this->input->post('end_date');
            $sortorder = $this->input->post('sortorder');

            //$data['day_period'] = $day_period;
            $data['start_date'] = $start_date;
            $data['end_date'] = $end_date;
            $data['sortorder'] = $sortorder;

            //$deptcompid = $this->input->post('filtercompid');
            /*if($day_period == 'day')
            {
                $sdate = "AND ENDATE>='".$start_date."'";
                $edate = "AND ENDATE<='".$start_date."'";
            }
            else{
                $sdate = "AND ENDATE>='".$start_date."'";
                $edate = "AND ENDATE<='".$end_date."'";
            }*/

            $sdate = "AND ENDATE>='".$start_date."'";
            $edate = "AND ENDATE<='".$end_date."'";

            if($sortorder==1)
            {
                $sodr = ' ORDER BY ENDATE ASC,ADDED_TIME';
            }
            else
            {
                $sodr = ' ORDER BY ENDATE DESC,ADDED_TIME';
            }
        }
        else
        {
            $cdate = date('Y-m-d');
            $sdate = "AND ENDATE>='".date('Y-m-d')."'";
            $edate = "AND ENDATE<='".date('Y-m-d')."'";
            $sodr = ' ORDER BY ENDATE ASC';

            $data['start_date'] = $cdate;
            $data['end_date'] = $cdate;
            $data['sortorder'] = '1';
        }

        /*$keymaster = $this->Handloanentry_model->get_handloanentry_key_value($_SESSION['LOANPREFIX']);

        $keval = $keymaster->KEYVALUE;
        //echo $keval;exit;
        //$data['kval'] = $keval;
        $data['detail_sno'] = $_SESSION['LOANPREFIX'].($keval+1);*/


        $akeymaster = $this->Handloanentry_model->get_account_handloanentry_key_value($_SESSION['LOANPREFIX']);

        $akeval = $akeymaster->KEYVALUE;
        $data['sno'] = $_SESSION['LOANPREFIX'].($akeval+1);
        //print_r($data);exit;

        $data['handloanentry_list'] = $this->Handloanentry_model->get_handloanentry_list($sdate,$edate,$sodr);
        //print_r($data);exit;
        $this->load->view('handloanentry/handloanentry_list',$data);
    }

    public function get_party_list()
    {
        $search =  $_GET['query']; 
        $rows = $this->Handloanentry_model->get_party_list($search);
        //print_r($rows);exit;
        $res='[';
        if(count($rows)>0) {
          foreach($rows as $row )
          {
              $title='';
              $title = $row->NAME.' - '.$row->FATHERSNAME.' - '.$row->PHONE;
              $res.='{ "title":"'.$title.'","id": "'.$row->PID.'"},';
              
          }
          $res=rtrim($res,',');
          $res.=']';
        }
        else{
          $res.=']';
        }
        print_r($res);die();
    }

    public function get_party_details()
    {
        $pid = $_POST['id'];
        $pdet = $this->Handloanentry_model->get_party_details_by_party_id($pid);
        echo $pdet->PID.'||'.$pdet->NAME.'||'.$pdet->LASTNAME_PREFIX.'||'.$pdet->FATHERSNAME.'||'.$pdet->AREA.'||'.$pdet->DOORNO.'||'.$pdet->ADDRESS1.'||'.$pdet->ADDRESS2.'||'.$pdet->CITY.'||'.$pdet->PHONE;
    }

    public function get_loan_party_list()
    {
        $search =  $_GET['query']; 
        $rows = $this->Handloanentry_model->get_loan_party_list($search);
        //print_r($rows);exit;
        $res='[';
        if(count($rows)>0) {
          foreach($rows as $row )
          {
              $title='';
              $title = $row->BILLNO;
              $res.='{ "title":"'.$title.'","id": "'.$row->PID.'"},';
              
          }
          $res=rtrim($res,',');
          $res.=']';
        }
        else{
          $res.=']';
        }
        print_r($res);die();
    }

    public function get_handloanentry_paid_ledger()
    {
        $search =  $_GET['query']; 
        $rows = $this->Handloanentry_model->get_handloanentry_paid_ledger($search);
        //print_r($rows);exit;
        $res='[';
        if(count($rows)>0) {
          foreach($rows as $row )
          {
              $title='';
              $title = $row->LEDGER_NAME;
              $res.='{ "title":"'.$title.'","id": "'.$row->LEDGER_SNO.'"},';
              
          }
          $res=rtrim($res,',');
          $res.=']';
        }
        else{
          $res.=']';
        }
        print_r($res);die();
    }


    public function handloanentry_save()
    {
        $cdate = date('Y-m-d');
        $tdate = $data['add_date_hand_loan_entrys'] = $this->input->post('add_date_hand_loan_entrys');
        $data['type'] = $this->input->post('type');
        $rno = $data['sno'] = $this->input->post('sno');
        $int_radio_handpay_report = $this->input->post('int_radio_handpay_report');
        if($int_radio_handpay_report=='lno')
        {
            $data['loan_no'] = $this->input->post('loan_no');
            $pid = $data['party_id'] = $this->input->post('loan_party_id');
        }
        else
        {
            $data['loan_no'] = '';
            $pid = $data['party_id'] = $this->input->post('party_id');
        }
        $data['amount'] = $this->input->post('amount');
        $data['paid_from'] = $this->input->post('paid_from');
        $paledid = $data['paid_from_id'] = $this->input->post('paid_from_id');
        $data['description'] = $this->input->post('description');

        $pldetails = $this->Handloanentry_model->get_paid_ledger_details($paledid);
        $plgid = $pldetails->GROUP_ID;
        if($plgid == 7 || $plgid == 22)
        {
            $data['TRANSTYPE'] = 'CASH PAY';
        }
        elseif($plgid==8)
        {
            $data['TRANSTYPE'] = 'BANK PAY';
        }

        $data['address1'] = $this->input->post('address1');
        $data['city'] = $this->input->post('city');
        $data['pno'] = $this->input->post('pno');
        $data['pid'] = $this->input->post('pid');        
        $data['pname'] = $this->input->post('pname');

        $hltrans_no = $this->Handloanentry_model->get_hl_trans_key_value($_SESSION['LOANPREFIX']);
        $hltrans = $hltrans_no->KEYVALUE;
        $data['HL_TRANS_NO'] = $_SESSION['LOANPREFIX'].($hltrans+1);


        $hltrans_insert = $this->Handloanentry_model->hl_trans_add($data);
        $tanskey = "HL_TRANS-".$_SESSION['LOANPREFIX'];
        $this->Handloanentry_model->update_hl_trans_keymaster($tanskey);


        $hlpay_no = $this->Handloanentry_model->get_hl_pay_key_value($_SESSION['LOANPREFIX']);
        $hlpay = $hlpay_no->KEYVALUE;
        $data['HL_SNO'] = $_SESSION['LOANPREFIX'].($hlpay+1);

        $vmaster_no = $this->Handloanentry_model->get_voucher_master_key_value($_SESSION['LOANPREFIX']);
        $vmaster = $vmaster_no->KEYVALUE;
        $data['VOUCHER_MASTER_SNO'] = $_SESSION['LOANPREFIX'].($vmaster+1);

        $hlpayment_insert = $this->Handloanentry_model->hl_payment_add($data);
        $hlpaykey = "HL_PAYMENTS-".$_SESSION['LOANPREFIX'];
        $this->Handloanentry_model->update_hl_payment_keymaster($hlpaykey);

        $party_account_ledger = $this->Handloanentry_model->get_party_account_ledger_by_company($pid);
        if(count((array)$party_account_ledger)==0)
        {
            $this->Handloanentry_model->party_account_ledger_add($data);
        }

        $voucher_master_add = $this->Handloanentry_model->voucher_master_add($data);

        $kname = "ACC_PAYMENTS-".$_SESSION['LOANPREFIX'];
        $vmname = "VOUCHER_MASTER-".$_SESSION['LOANPREFIX'];

        $result = $this->Handloanentry_model->update_keymaster($kname);
        $this->Handloanentry_model->update_voucher_master_keymaster($vmname);

        $this->Handloanentry_model->voucher_debit_details_add($data);
        $result = $this->Handloanentry_model->voucher_credit_details_add($data);

        if($tdate == $cdate)
        {
            $log['log_date'] = date('Y-m-d H:i:s');
            $log['log_details'] = 'On Account Voucher No : '.$rno.' Added';
            $log['log_code'] = 'ACC_PAYMENT-ADD';
            $log['added_user'] = $_SESSION['username'];
            $this->Handloanentry_model->log_same_date_add($log);
        }
        else
        {
            $log['log_date'] = date('Y-m-d H:i:s');
            $log['log_details'] = 'On Account Voucher No : '.$rno.' Added';
            $log['log_code'] = 'ACC_PAYMENT-ADD';
            $log['added_user'] = $_SESSION['username'];
            $log['log_type'] = 'P';
            $this->Handloanentry_model->log_different_date_add($log);
        }

        if($result)
        {
            $this->session->set_flashdata('g_success', 'Hand Loan Entry have been Added successfully...');
        }else{
           $this->session->set_flashdata('g_err', 'Could not add Hand Loan Entry details!');
        }
        redirect('handloanentry');
    }

    public function handloanentry_edit()
    {
        $hlsno = $_POST['id'];
        $hl_payment_details = $data['hl_payment_details'] = $this->Handloanentry_model->get_hl_payment_details($hlsno);
        $vmsno = $hl_payment_details->VOUCHER_SNO;
        $pid = $hl_payment_details->PID;
        $data['party_details'] = $this->Handloanentry_model->get_party_by_id($pid);
        $data['voucher_master_details'] = $this->Handloanentry_model->get_voucher_master_by_id($vmsno);
        $data['voucher_details'] = $this->Handloanentry_model->get_voucher_details($vmsno);
        $this->load->view('handloanentry/handloanentry_edit',$data);
    }


    public function handloanentry_update()
    {
        $cdate = date('Y-m-d');
        $vHLTransNo = $this->input->post('vHLTransNo');
        $data['VOUCHER_MASTER_SNO'] = $voucher_master_sno = $this->input->post('voucher_master_sno');
        $vHLPaymentNo = $this->input->post('vHLPaymentNo');

        $tdate = $data['add_date_hand_loan_entrys'] = $this->input->post('add_date_hand_loan_entrys');
        $data['type'] = $this->input->post('type');
        $rno = $data['sno'] = $this->input->post('sno');
        $int_radio_handpay_report = $this->input->post('int_radio_handpay_report');
        if($int_radio_handpay_report=='lno')
        {
            $data['loan_no'] = $this->input->post('loan_no');
            $pid = $data['party_id'] = $this->input->post('loan_party_id');
        }
        else
        {
            $data['loan_no'] = '';
            $pid = $data['party_id'] = $this->input->post('party_id');
        }
        $data['amount'] = $this->input->post('amount');
        $data['paid_from'] = $this->input->post('paid_from');
        $paledid = $data['paid_from_id'] = $this->input->post('paid_from_id');
        $data['description'] = $this->input->post('description');

        $pldetails = $this->Handloanentry_model->get_paid_ledger_details($paledid);
        $plgid = $pldetails->GROUP_ID;
        if($plgid == 7 || $plgid == 22)
        {
            $data['TRANSTYPE'] = 'CASH PAY';
        }
        elseif($plgid==8)
        {
            $data['TRANSTYPE'] = 'BANK PAY';
        }

        $data['address1'] = $this->input->post('address1');
        $data['city'] = $this->input->post('city');
        $data['pno'] = $this->input->post('pno');
        $data['pid'] = $this->input->post('pid');        
        $data['pname'] = $this->input->post('pname');

        /*$hltrans_no = $this->Handloanentry_model->get_hl_trans_key_value($_SESSION['LOANPREFIX']);
        $hltrans = $hltrans_no->KEYVALUE;
        $data['HL_TRANS_NO'] = $_SESSION['LOANPREFIX'].($hltrans+1);*/


        $hltrans_insert = $this->Handloanentry_model->hl_trans_update($data,$vHLTransNo);

        $hlpayment_insert = $this->Handloanentry_model->hl_payment_update($data,$vHLPaymentNo,$vHLTransNo);

        $party_account_ledger = $this->Handloanentry_model->get_party_account_ledger_by_company($pid);
        if(count((array)$party_account_ledger)==0)
        {
            $this->Handloanentry_model->party_account_ledger_add($data);
        }

        $voucher_master_add = $this->Handloanentry_model->voucher_master_update($data,$voucher_master_sno);

        $this->Handloanentry_model->delete_voucher_details($voucher_master_sno);

        $this->Handloanentry_model->voucher_debit_details_add($data);
        $result = $this->Handloanentry_model->voucher_credit_details_add($data);

        $log['log_date'] = date('Y-m-d H:i:s');
        $log['log_details'] = 'On Account Voucher No : '.$rno.' Modified';
        $log['log_code'] = 'ACC_PAYMENT-EDIT';
        $log['added_user'] = $_SESSION['username'];
        $this->Handloanentry_model->log_same_date_add($log);

        if($result)
        {
            $this->session->set_flashdata('g_success', 'Hand Loan Entry have been Updated successfully...');
        }else{
           $this->session->set_flashdata('g_err', 'Could not update Hand Loan Entry details!');
        }
        redirect('handloanentry');
    }

    public function handloanentry_delete()
    {
        $data['bid']=$_POST['id'];
        //$data['handloanentry_details'] = $this->Area_model->get_handloanentry_by_handloanentry_id($uid);
        $this->load->view('handloanentry/handloanentry_delete',$data);
    }

    public function delete()
    { 
        $hlsno=$_POST['field'];
        $hl_payment_details = $this->Handloanentry_model->get_hl_payment_details($hlsno);
        $hltsno = $hl_payment_details->HL_TRANS_SNO;
        $vmsno = $hl_payment_details->VOUCHER_SNO;

        $this->Handloanentry_model->delete_hl_payments($hlsno);
        $this->Handloanentry_model->delete_hl_trans($hltsno);

        $this->Handloanentry_model->delete_voucher_details($vmsno);
        $result = $this->Handloanentry_model->delete_voucher_master($vmsno);

        $log['log_date'] = date('Y-m-d H:i:s');
        $log['log_details'] = 'On Account Voucher No : '.$vmsno.' Deleted';
        $log['log_code'] = 'ACC_PAYMENT-DELETE';
        $log['added_user'] = $_SESSION['username'];
        $this->Handloanentry_model->log_same_date_add($log);

        if ($result) {
            $this->session->set_flashdata('g_success', 'Hand Loan Entry has been Deleted successfully.');
        }
        else{
            $this->session->set_flashdata('g_err', 'Something went wrong');
        }
    }

}
?>