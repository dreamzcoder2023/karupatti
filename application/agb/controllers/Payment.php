<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/* ************************************************************************************
		Purpose : To handle all Payment functions 2022-09-28
***************************************************************************************/
class Payment extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model(array("Payment_model","Accountsgroup_model"));
    	$this->load->library('user_agent');
        $fin_year=$this->Accountsgroup_model->get_fin_years_list();
        $db=substr($fin_year->DBNAME,0,strlen($fin_year->DBNAME)-4);
        //echo $db;exit;
        $config_app = switch_db_dynamic($db);
        
        $this->Payment_model->other_db = $this->load->database($config_app,TRUE);
    	if (isset($this->session->userdata['username']) && $this->session->userdata['username'] == TRUE)
        {
            //do something
        }else{
            redirect('login'); //if session is not there, redirect to login page
        } 
		date_default_timezone_set("Asia/Kolkata");
    	$this->session->set_userdata('comtitle', 'Payment');
	}

    public function index()
    {
        $ccode = $_SESSION['COMPANYCODE'];
        $cdate = date('Y-m-d');
        if($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            $day_period = $this->input->post('day_period');
            $start_date = $this->input->post('start_date');
            $end_date = $this->input->post('end_date');
            $sortorder = $this->input->post('sortorder');

            $data['day_period'] = $day_period;
            $data['start_date'] = $start_date;
            $data['end_date'] = $end_date;
            $data['sortorder'] = $sortorder;

            //$deptcompid = $this->input->post('filtercompid');
            if($day_period == 'day')
            {
                $sdate = "AND TRANSDATE>='".$start_date."'";
                $edate = "AND TRANSDATE<='".$start_date."'";
            }
            else{
                $sdate = "AND TRANSDATE>='".$start_date."'";
                $edate = "AND TRANSDATE<='".$end_date."'";
            }
            if($sortorder==1)
            {
                $sodr = ' ORDER BY TRANSDATE ASC,ADDED_TIME ASC';
            }
            else
            {
                $sodr = ' ORDER BY TRANSDATE DESC,ADDED_TIME DESC';
            }
        }
        else
        {
            $cdate = date('Y-m-d');
            $sdate = "AND TRANSDATE>='".date('Y-m-d')."'";
            $edate = "AND TRANSDATE<='".date('Y-m-d')."'";
            $sodr = ' ORDER BY TRANSDATE ASC';

            $data['day_period'] = 'day';
            $data['start_date'] = $cdate;
            $data['end_date'] = $cdate;
            $data['sortorder'] = '1';
        }

        $keymaster = $this->Payment_model->get_payment_key_value($_SESSION['LOANPREFIX']);

        $keval = $keymaster->KEYVALUE;
        //echo $keval;exit;
        //$data['kval'] = $keval;
        $data['detail_sno'] = $_SESSION['LOANPREFIX'].($keval+1);


        $akeymaster = $this->Payment_model->get_account_payment_key_value($_SESSION['LOANPREFIX']);

        $akeval = $akeymaster->KEYVALUE;
        $data['sno'] = $_SESSION['LOANPREFIX'].($akeval+1);
        //print_r($data);exit;

        $data['payment_list'] = $this->Payment_model->get_payment_list($sdate,$edate,$sodr);
        // print_r($data);exit;
        $this->load->view('payment/payment_list',$data);
    }

    public function get_payment_ledger()
    {
        $search =  $_GET['query']; 
        $showparty =  $_GET['showparty']; 
        $rows = $this->Payment_model->get_payment_ledger($search,$showparty);
        //print_r($rows);exit;
        $res='[';
        if(count($rows)>0) {
          foreach($rows as $row )
          {
              $title='';
              $title = $row->LEDGER_NAME;
              $opbal = $row->OP_BALANCE.' '.$row->OP_SIDE;
              $res.='{ "title":"'.$title.'","id": "'.$row->LEDGER_SNO.'","opbal": "'.$opbal.'"},';
              
          }
          $res=rtrim($res,',');
          $res.=']';
        }
        else{
          $res.=']';
        }
        print_r($res);die();
    }

    public function get_payment_paid_ledger()
    {
        $search =  $_GET['query']; 
        $rows = $this->Payment_model->get_payment_paid_ledger($search);
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

    public function payment_save()
    {
/*echo "<pre>";
        print_r($_POST);exit;*/
        $cdate = date('Y-m-d');
        $tdate = $data['ENDATE'] = $this->input->post('add_date_payments');
        $data['VOUCHER_SNO'] = $this->input->post('sno');
        $vmsno = $data['VOUCHER_MASTER_SNO'] = $this->input->post('detail_sno');
        $data['VOUCHERTYPE'] = 'PAYMENT';

        $account_led_id = explode(",",implode(",",$this->input->post('account_led_id')));
        $add_amt_payments = explode(",",implode(",",$this->input->post('add_amt_payments')));

        $paledid = $data['paid_account_led_id'] = $this->input->post('paid_account_led_id');
        $amt = $data['add_tota_payments'] = $this->input->post('add_tota_payments');
        $data['description'] = $this->input->post('description');

        $pldetails = $this->Payment_model->get_paid_ledger_details($paledid);
        $plgid = $pldetails->GROUP_ID;
        if($plgid == 7 || $plgid == 22)
        {
            $data['TRANSTYPE'] = 'CASH PAY';
        }
        elseif($plgid==8)
        {
            $data['TRANSTYPE'] = 'BANK PAY';
        }

        $this->Payment_model->voucher_master_add($data);

        $subcount = count($this->input->post('account_led_id'));
        $s=1;for($i=0;$i<$subcount;$i++)
        {
            $data['ROWNO'] = $s;
            $data['LEDGER_SNO'] = $account_led_id[$i];
            $data['DEBIT'] = $add_amt_payments[$i];
//print_r($data);exit;
            $this->Payment_model->voucher_debit_details_add($data);
        $s++;}

        $data['ROWNO'] = $s;
        $this->Payment_model->voucher_credit_details_add($data);

        //$this->Payment_model->voucher_master_add($data);

        /*$kval = $this->input->post('keyval');
        $ukval = $kval+1;*/

        $kname = "ACC_PAYMENTS-".$_SESSION['LOANPREFIX'];
        $vmname = "VOUCHER_MASTER-".$_SESSION['LOANPREFIX'];

        $result = $this->Payment_model->update_keymaster($kname,$ukval);
        $this->Payment_model->update_voucher_master_keymaster($vmname);

        if($tdate == $cdate)
        {
            $log['log_date'] = date('Y-m-d H:i:s');
            $log['log_details'] = 'Payment Voucher No : '.$vmsno.' Amount :'.$amt.' Added';
            $log['log_code'] = 'ACC_PAYMENT-ADD';
            $log['added_user'] = $_SESSION['username'];
            $this->Payment_model->log_same_date_add($log);
        }
        else
        {
            $log['log_date'] = date('Y-m-d H:i:s');
            $log['log_details'] = 'Payment Voucher No : '.$vmsno.' Amount :'.$amt.' Added';
            $log['log_code'] = 'ACC_PAYMENT-ADD';
            $log['added_user'] = $_SESSION['username'];
            $log['log_type'] = 'P';
            $this->Payment_model->log_different_date_add($log);
        }

        if($result)
        {
            $this->session->set_flashdata('g_success', 'Payment have been Added successfully...');
        }else{
           $this->session->set_flashdata('g_err', 'Could not add Payment details!');
        }
        redirect('payment');
    }

    public function payment_edit()
    {
        $msno = $_POST['id'];

        $data['voucher_master_details'] = $this->Payment_model->get_voucher_master_details($msno);
        $data['voucher_details'] = $this->Payment_model->get_voucher_details($msno);
        $this->load->view('payment/payment_edit',$data);
    }

    public function payment_update()
    {
/*echo "<pre>";
        print_r($_POST);exit;*/
        $data['ENDATE'] = $this->input->post('add_date_payments');
        $data['VOUCHER_SNO'] = $this->input->post('sno');
        $vmsno = $data['VOUCHER_MASTER_SNO'] = $this->input->post('detail_sno');
        $data['VOUCHERTYPE'] = 'PAYMENT';

        $account_led_id = explode(",",implode(",",$this->input->post('account_led_id')));
        $add_amt_payments = explode(",",implode(",",$this->input->post('add_amt_payments')));

        $paledid = $data['paid_account_led_id'] = $this->input->post('paid_account_led_id');
        $amt = $data['add_tota_payments'] = $this->input->post('add_tota_payments');
        $data['description'] = $this->input->post('description');

        $pldetails = $this->Payment_model->get_paid_ledger_details($paledid);
        $plgid = $pldetails->GROUP_ID;
        if($plgid == 7 || $plgid == 22)
        {
            $data['TRANSTYPE'] = 'CASH PAY';
        }
        elseif($plgid==8)
        {
            $data['TRANSTYPE'] = 'BANK PAY';
        }

        $this->Payment_model->voucher_master_update($data);

        $this->Payment_model->delete_voucher_details($vmsno);

        $subcount = count($this->input->post('account_led_id'));
        $s=1;for($i=0;$i<$subcount;$i++)
        {
            $data['ROWNO'] = $s;
            $data['LEDGER_SNO'] = $account_led_id[$i];
            $data['DEBIT'] = $add_amt_payments[$i];
//print_r($data);exit;
            $this->Payment_model->voucher_debit_details_add($data);
        $s++;}

        $data['ROWNO'] = $s;
        $result = $this->Payment_model->voucher_credit_details_add($data);

        //$this->Payment_model->voucher_master_add($data);

        /*$kval = $this->input->post('keyval');
        $ukval = $kval+1;

        $kname = "ACC_PAYMENTS-".$_SESSION['LOANPREFIX'];*/

        //$result = $this->Payment_model->update_keymaster($kname,$ukval);

        $log['log_date'] = date('Y-m-d H:i:s');
        $log['log_details'] = 'Payment Voucher No : '.$vmsno.' Amount :'.$amt.' Modified';
        $log['log_code'] = 'ACC_PAYMENT-EDIT';
        $log['added_user'] = $_SESSION['username'];
        $this->Payment_model->log_same_date_add($log);

        if($result)
        {
            $this->session->set_flashdata('g_success', 'Payment have been Updated successfully...');
        }else{
           $this->session->set_flashdata('g_err', 'Could not update Payment details!');
        }
        redirect('payment');
    }

    public function payment_delete()
    {
        $data['bid']=$_POST['id'];
        //$data['payment_details'] = $this->Area_model->get_payment_by_payment_id($uid);
        $this->load->view('payment/payment_delete',$data);
    }

    public function delete()
    { 
        $vmsno=$_POST['field'];
        $this->Payment_model->delete_voucher_details($vmsno);
        $result = $this->Payment_model->delete_voucher_master($vmsno);

        $log['log_date'] = date('Y-m-d H:i:s');
        $log['log_details'] = 'Payment Voucher No : '.$vmsno.' Deleted';
        $log['log_code'] = 'ACC_PAYMENT-DELETE';
        $log['added_user'] = $_SESSION['username'];
        $this->Payment_model->log_same_date_add($log);

        if ($result) {
            $this->session->set_flashdata('g_success', 'Payment has been Deleted successfully.');
        }
        else{
            $this->session->set_flashdata('g_err', 'Something went wrong');
        }
    }

}
?>