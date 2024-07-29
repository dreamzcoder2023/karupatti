<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/* ************************************************************************************
		Purpose : To handle all Groupsummary functions 2022-10-19
***************************************************************************************/
class Groupsummary extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model(array("Groupsummary_model","Accountsgroup_model"));
    	$this->load->library('user_agent');
        $fin_year=$this->Accountsgroup_model->get_fin_years_list();
        $db=substr($fin_year->DBNAME,0,strlen($fin_year->DBNAME)-4);
        //echo $db;exit;
        $config_app = switch_db_dynamic($db);
        
        $this->Groupsummary_model->other_db = $this->load->database($config_app,TRUE);
    	if (isset($this->session->userdata['username']) && $this->session->userdata['username'] == TRUE)
        {
            //do something
        }else{
            redirect('login'); //if session is not there, redirect to login page
        } 
		date_default_timezone_set("Asia/Kolkata");
    	$this->session->set_userdata('comtitle', 'Groupsummary');
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
            $account_group_name = $this->input->post('account_group_name');
            $account_group_id = $this->input->post('account_group_id');

            $data['filter_by'] = $filter_by;
            $data['start_date'] = $start_date;
            $data['end_date'] = $end_date;
            $data['account_group_name'] = $account_group_name;
            $data['account_group_id'] = $account_group_id;
            $fin_year=$this->Accountsgroup_model->get_fin_years_list();
            $data['fin_year_start_date'] = $fin_year->FDATE;

            $this->make_trail_balance_summary($start_date,$end_date,'',TRUE,$account_group_id,TRUE);
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
            $data['account_group_name'] = '';
            $data['account_group_id'] = '';
            $data['fin_year_start_date'] = $fin_year->FDATE;
        }
        //print_r($data);exit;

        $this->load->view('groupsummary/groupsummary_list',$data);
    }

    public function get_account_group()
    {
        $search =  $_GET['query'];  
        $rows = $this->Groupsummary_model->get_account_group($search);

        $res='[';
        if(count($rows)>0) {
          foreach($rows as $row )
          {
              $title='';
              $title = $row->GROUP_NAME;
              $res.='{ "title":"'.$title.'","id": "'.$row->GROUP_SNO.'"},';
              
          }
          $res=rtrim($res,',');
          $res.=']';
        }
        else{
          $res.=']';
        }
        print_r($res);die();
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

    public function make_trail_balance_summary($sdate,$edate,$vCompCode,$bOpening,$vGroupCode,$vShowAllLedgers)
    {
        $this->Groupsummary_model->delete_ledger_closing_summary();

        $ledger_list = $this->Groupsummary_model->get_ledger_list($vGroupCode);
        if(count((array)$ledger_list)>0)
        {
            foreach($ledger_list as $llist)
            {
                $single_ledger_list = $this->Groupsummary_model->get_single_ledger_list($llist['LEDGER_SNO']);
                $selected_ledger = $single_ledger_list->LEDGER_NAME;
                $vLedgerID = $single_ledger_list->LEDGER_SNO;

                $GetLedgerAmount = '';
                $vOpeningBalance = $single_ledger_list->OP_BALANCE;
                $vOpeningSide = $single_ledger_list->OP_SIDE;

                $vmaster_details = $this->Groupsummary_model->get_voucher_master_details($vLedgerID,$sdate,$edate);
                $vTotDebit = is_null($vmaster_details->Debit)?0:$vmaster_details->Debit;
                $vTotCredit = is_null($vmaster_details->Credit)?0:$vmaster_details->Credit;

                if($bOpening==True)
                {
                    if(strtolower($vOpeningSide)=='dr')
                    {
                        $vTotDebit = $vTotDebit + $vOpeningBalance;
                    }
                    else
                    {
                        $vTotCredit = $vTotCredit + $vOpeningBalance;
                    }
                }

                $vTotBalance = $vTotDebit - $vTotCredit;
                if($vTotBalance>0)
                {
                    $vClosingBalance = $vTotBalance;
                    $vClosingSide = 'dr';
                }
                elseif($vTotBalance<0)
                {
                    $vClosingBalance = abs($vTotBalance);
                    $vClosingSide = 'cr';
                }
                else
                {
                    $vClosingBalance = 0;
                    $vClosingSide = 'dr';
                }
                $GetLedgerAmount = $vClosingBalance.' '.$vClosingSide;

                $vLedgerBalance = $vClosingBalance;
                $vLedgerSide = $vClosingSide;

                if($vLedgerID!='0')
                {
                    $selected_group_details = $this->Groupsummary_model->get_selected_group_detail($single_ledger_list->GROUP_ID);
                    $selected_group = $selected_group_details->GROUP_NAME;

                    $selected_primary_group_details = $this->Groupsummary_model->get_selected_primary_group_detail($selected_group);
                    $selected_primary_group = $selected_primary_group_details->UNDER_GROUP;
                }
                else
                {
                    $selected_group = '';
                    $selected_primary_group = '';
                }

                $this->Groupsummary_model->insert_acc_ledger_closing_summary($single_ledger_list->SUPER_ID,$single_ledger_list->LEDGER_SNO,$single_ledger_list->LEDGER_NAME,$selected_group,$selected_primary_group,$vLedgerBalance,$vLedgerSide);
            }
        }
    }

}
?>