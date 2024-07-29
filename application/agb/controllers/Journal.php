<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/* ************************************************************************************
		Purpose : To handle all Journal functions 2022-09-28
***************************************************************************************/
class Journal extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model(array("Journal_model","Accountsgroup_model"));
    	$this->load->library('user_agent');
        $fin_year=$this->Accountsgroup_model->get_fin_years_list();
        $db=substr($fin_year->DBNAME,0,strlen($fin_year->DBNAME)-4);
        //echo $db;exit;
        $config_app = switch_db_dynamic($db);
        
        $this->Journal_model->other_db = $this->load->database($config_app,TRUE);
    	if (isset($this->session->userdata['username']) && $this->session->userdata['username'] == TRUE)
        {
            //do something
        }else{
            redirect('login'); //if session is not there, redirect to login page
        } 
		date_default_timezone_set("Asia/Kolkata");
    	$this->session->set_userdata('comtitle', 'Journal');
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
                $sdate = "AND VOUCHER_MASTER.TRANSDATE>='".$start_date."'";
                $edate = "AND VOUCHER_MASTER.TRANSDATE<='".$start_date."'";
            }
            else{
                $sdate = "AND VOUCHER_MASTER.TRANSDATE>='".$start_date."'";
                $edate = "AND VOUCHER_MASTER.TRANSDATE<='".$end_date."'";
            }
            if($sortorder==1)
            {
                $sodr = ' ORDER BY VOUCHER_MASTER.TRANSDATE ASC,VOUCHER_MASTER.ADDED_TIME ASC,ROWNO';
            }
            else
            {
                $sodr = ' ORDER BY VOUCHER_MASTER.TRANSDATE DESC,VOUCHER_MASTER.ADDED_TIME DESC,ROWNO';
            }
        }
        else
        {
            $cdate = date('Y-m-d');
            $sdate = "AND VOUCHER_MASTER.TRANSDATE>='".date('Y-m-d')."'";
            $edate = "AND VOUCHER_MASTER.TRANSDATE<='".date('Y-m-d')."'";
            $sodr = ' ORDER BY VOUCHER_MASTER.TRANSDATE ASC';

            $data['day_period'] = 'day';
            $data['start_date'] = $cdate;
            $data['end_date'] = $cdate;
            $data['sortorder'] = '1';
        }

        $keymaster = $this->Journal_model->get_journal_key_value($_SESSION['LOANPREFIX']);

        $keval = $keymaster->KEYVALUE;
        //echo $keval;exit;
        //$data['kval'] = $keval;
        $data['detail_sno'] = $_SESSION['LOANPREFIX'].($keval+1);


        $akeymaster = $this->Journal_model->get_account_journal_key_value($_SESSION['LOANPREFIX']);

        $akeval = $akeymaster->KEYVALUE;
        $data['sno'] = $_SESSION['LOANPREFIX'].($akeval+1);
        //print_r($data);exit;

        $data['journal_list'] = $this->Journal_model->get_journal_list($sdate,$edate,$sodr);
        //print_r($data);exit;
        $this->load->view('journal/journal_list',$data);
    }

    public function get_journal_ledger()
    {
        $search =  $_GET['query']; 
        $showparty =  $_GET['showparty']; 
        $rows = $this->Journal_model->get_journal_ledger($search,$showparty);
        //print_r($rows);exit;
        $res='[';
        if(count($rows)>0) {
          foreach($rows as $row )
          {
              $title='';
              $title = $row->LEDGER_NAME;
              //$opbal = $row->OP_BALANCE.' '.$row->OP_SIDE;
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

    public function journal_save()
    {
/*echo "<pre>";
        print_r($_POST);exit;*/
        $cdate = date('Y-m-d');
        $tdate = $data['ENDATE'] = $this->input->post('add_date_journals');
        $data['VOUCHER_SNO'] = $this->input->post('sno');
        $vmsno = $data['VOUCHER_MASTER_SNO'] = $this->input->post('detail_sno');
        $data['VOUCHERTYPE'] = 'JOURNAL';

        $account_led_id = explode(",",implode(",",$this->input->post('account_led_id')));
        $debit = explode(",",implode(",",$this->input->post('debit')));
        $credit = explode(",",implode(",",$this->input->post('credit')));
        $data['description'] = $this->input->post('description');

        $data['total_debit'] = $this->input->post('total_debit');
        $amt = $data['total_credit'] = $this->input->post('total_credit');
        $data['TRANSTYPE'] = 'JOURNAL';

        $this->Journal_model->voucher_master_add($data);

        $subcount = count($this->input->post('account_led_id'));
        $s=1;for($i=0;$i<$subcount;$i++)
        {
            $data['ROWNO'] = $s;
            $data['LEDGER_SNO'] = $account_led_id[$i];
            $data['DEBIT'] = $debit[$i];
            $data['CREDIT'] = $credit[$i];
//print_r($data);exit;
            $this->Journal_model->voucher_details_add($data);
        $s++;}

        /*$data['ROWNO'] = $s;
        $this->Journal_model->voucher_credit_details_add($data);*/

        //$this->Journal_model->voucher_master_add($data);

        /*$kval = $this->input->post('keyval');
        $ukval = $kval+1;*/

        $kname = "ACC_JOURNALS-".$_SESSION['LOANPREFIX'];
        $vmname = "VOUCHER_MASTER-".$_SESSION['LOANPREFIX'];

        $result = $this->Journal_model->update_keymaster($kname);
        $this->Journal_model->update_voucher_master_keymaster($vmname);

        if($tdate == $cdate)
        {
            $log['log_date'] = date('Y-m-d H:i:s');
            $log['log_details'] = 'Journal Voucher No : '.$vmsno.' Amount :'.$amt.' Added';
            $log['log_code'] = 'JOURNAL-ADD';
            $log['added_user'] = $_SESSION['username'];
            $this->Journal_model->log_same_date_add($log);
        }
        else
        {
            $log['log_date'] = date('Y-m-d H:i:s');
            $log['log_details'] = 'Journal Voucher No : '.$vmsno.' Amount :'.$amt.' Added';
            $log['log_code'] = 'JOURNAL-ADD';
            $log['added_user'] = $_SESSION['username'];
            $log['log_type'] = 'P';
            $this->Journal_model->log_different_date_add($log);
        }

        if($result)
        {
            $this->session->set_flashdata('g_success', 'Journal have been Added successfully...');
        }else{
           $this->session->set_flashdata('g_err', 'Could not add Journal details!');
        }
        redirect('journal');
    }

    public function journal_edit()
    {
        $msno = $_POST['id'];

        $data['voucher_master_details'] = $this->Journal_model->get_voucher_master_details($msno);
        $data['voucher_details'] = $this->Journal_model->get_voucher_details($msno);
        $this->load->view('journal/journal_edit',$data);
    }

    public function journal_update()
    {
/*echo "<pre>";
        print_r($_POST);exit;*/
        $cdate = date('Y-m-d');
        $tdate = $data['ENDATE'] = $this->input->post('add_date_journals');
        $data['VOUCHER_SNO'] = $this->input->post('sno');
        $vmsno = $data['VOUCHER_MASTER_SNO'] = $this->input->post('detail_sno');
        $data['VOUCHERTYPE'] = 'JOURNAL';

        $account_led_id = explode(",",implode(",",$this->input->post('account_led_id')));
        $debit = explode(",",implode(",",$this->input->post('debit')));
        $credit = explode(",",implode(",",$this->input->post('credit')));
        $data['description'] = $this->input->post('description');

        $data['total_debit'] = $this->input->post('total_debit');
        $amt = $data['total_credit'] = $this->input->post('total_credit');
        $data['TRANSTYPE'] = 'JOURNAL';

        $this->Journal_model->voucher_master_update($data);

        $this->Journal_model->delete_voucher_details($vmsno);

        $subcount = count($this->input->post('account_led_id'));
        $s=1;for($i=0;$i<$subcount;$i++)
        {
            $data['ROWNO'] = $s;
            $data['LEDGER_SNO'] = $account_led_id[$i];
            $data['DEBIT'] = $debit[$i];
            $data['CREDIT'] = $credit[$i];
//print_r($data);exit;
            $this->Journal_model->voucher_details_add($data);
        $s++;}

        /*$data['ROWNO'] = $s;
        $this->Journal_model->voucher_credit_details_add($data);*/

        //$this->Journal_model->voucher_master_add($data);

        /*$kval = $this->input->post('keyval');
        $ukval = $kval+1;*/

        $kname = "ACC_JOURNALS-".$_SESSION['LOANPREFIX'];
        $vmname = "VOUCHER_MASTER-".$_SESSION['LOANPREFIX'];

        $result = $this->Journal_model->update_keymaster($kname);
        $this->Journal_model->update_voucher_master_keymaster($vmname);

        if($tdate == $cdate)
        {
            $log['log_date'] = date('Y-m-d H:i:s');
            $log['log_details'] = 'Journal Voucher No : '.$vmsno.' Amount :'.$amt.' Added';
            $log['log_code'] = 'ACC_JOURNAL-EDIT';
            $log['added_user'] = $_SESSION['username'];
            $this->Journal_model->log_same_date_add($log);
        }
        else
        {
            $log['log_date'] = date('Y-m-d H:i:s');
            $log['log_details'] = 'Journal Voucher No : '.$vmsno.' Amount :'.$amt.' Added';
            $log['log_code'] = 'ACC_JOURNAL-EDIT';
            $log['added_user'] = $_SESSION['username'];
            $log['log_type'] = 'P';
            $this->Journal_model->log_different_date_add($log);
        }

        if($result)
        {
            $this->session->set_flashdata('g_success', 'Journal have been Updated successfully...');
        }else{
           $this->session->set_flashdata('g_err', 'Could not update Journal details!');
        }
        redirect('journal');
    }

    public function journal_delete()
    {
        $data['bid']=$_POST['id'];
        //$data['journal_details'] = $this->Area_model->get_journal_by_journal_id($uid);
        $this->load->view('journal/journal_delete',$data);
    }

    public function delete()
    { 
        $vmsno=$_POST['field'];
        $this->Journal_model->delete_voucher_details($vmsno);
        $result = $this->Journal_model->delete_voucher_master($vmsno);

        $log['log_date'] = date('Y-m-d H:i:s');
        $log['log_details'] = 'Payment Voucher No : '.$vmsno.' Deleted';
        $log['log_code'] = 'JOURNAL-DELETE';
        $log['added_user'] = $_SESSION['username'];
        $this->Journal_model->log_same_date_add($log);

        if ($result) {
            $this->session->set_flashdata('g_success', 'Journal has been Deleted successfully.');
        }
        else{
            $this->session->set_flashdata('g_err', 'Something went wrong');
        }
    }

}
?>