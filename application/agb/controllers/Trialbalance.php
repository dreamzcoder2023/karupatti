<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/* ************************************************************************************
		Purpose : To handle all Trialbalance functions 2022-09-28
***************************************************************************************/
class Trialbalance extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model(array("Trialbalance_model","Accountsgroup_model"));
    	$this->load->library('user_agent');
        $fin_year=$this->Accountsgroup_model->get_fin_years_list();
        $db=substr($fin_year->DBNAME,0,strlen($fin_year->DBNAME)-4);
        //echo $db;exit;
        $config_app = switch_db_dynamic($db);
        
        $this->Trialbalance_model->other_db = $this->load->database($config_app,TRUE);
    	if (isset($this->session->userdata['username']) && $this->session->userdata['username'] == TRUE)
        {
            //do something
        }else{
            redirect('login'); //if session is not there, redirect to login page
        } 
		date_default_timezone_set("Asia/Kolkata");
    	$this->session->set_userdata('comtitle', 'Trialbalance');
	}

    public function index()
    {
        $ccode = $_SESSION['COMPANYCODE'];
        $cdate = date('Y-m-d');

        /*echo "<pre>";
        print_r($_POST);
        exit;*/

        if($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            $group_type = $this->input->post('group_type');
            $start_date = $this->input->post('start_date');
            $end_date = $this->input->post('end_date');

            $opbal_type = $this->input->post('opbal_type');
            $is_grouped_val = $this->input->post('is_grouped');

            if($this->input->post('is_grouped')=='on')
                $is_grouped = 1;
            else
                $is_grouped = 0;

            $data['group_type'] = $group_type;
            $data['start_date'] = $start_date;
            $data['end_date'] = $end_date;
            $data['opbal_type'] = $opbal_type;
            $data['is_grouped'] = $is_grouped;
        }
        else
        {
            $cdate = date('Y-m-d');

            $start_date = $cdate;
            $end_date = $cdate;

            $group_type = $data['group_type'] = 'main_group';
            $data['start_date'] = $cdate;
            $data['end_date'] = $cdate;
            $opbal_type = $data['opbal_type'] = 'with_opening';
            $is_grouped = $data['is_grouped'] = 0;
        }


        $this->make_trail_balance_summary($start_date,$end_date,$opbal_type);

        if($is_grouped==1)
        {
            if($group_type=='main_group')
            {
                $data['trialbalance_list'] = $this->Trialbalance_model->get_main_group_grouped_trialbalance_list();
            }
            elseif($group_type=='primary_group')
            {
                $data['trialbalance_list'] = $this->Trialbalance_model->get_primary_group_grouped_trialbalance_list();
            }
            else
            {
                $data['trialbalance_list'] = array();
            }
        }
        else
        {
            if($group_type=='main_group')
            {
                $data['trialbalance_list'] = $this->Trialbalance_model->get_main_group_trialbalance_list();
                $data['ledger_wise'] = 0;
            }
            elseif($group_type=='primary_group')
            {
                $data['trialbalance_list'] = $this->Trialbalance_model->get_primary_group_trialbalance_list();
                $data['ledger_wise'] = 0;
            }
            else
            {
                $data['trialbalance_list'] = array();
                $data['ledger_wise'] = 1;
            }
        }

//print_r($data);exit;
        /*$data['trialbalance_list'] = $this->Trialbalance_model->get_trialbalance_list($atype,$vtype);

        $fin_year=$this->Accountsgroup_model->get_fin_years_list();

        $fyear_start_date = new DateTime($fin_year->FDATE);
        $fyear_start_date->modify('-1 day');
        $data['fyear_start_date'] = $fyear_start_date->format('Y-m-d');

        $fyear_end_date = new DateTime($end_date);
        $fyear_end_date->modify('-1 day');
        $data['fyear_end_date'] = $fyear_end_date->format('Y-m-d');*/

        //print_r($data);exit;
        $this->load->view('trialbalance/trialbalance_list',$data);
    }



    public function trialbalance_view()
    {
        $ccode = $_SESSION['COMPANYCODE'];
        $cdate = date('Y-m-d');

        /*echo "<pre>";
        print_r($_POST);
        exit;*/

        $group_type = $this->input->post('group_type_view');
        $start_date = $this->input->post('start_date_view');
        $end_date = $this->input->post('end_date_view');

        $opbal_type = $this->input->post('opbal_type_view');
        $is_grouped = $this->input->post('is_grouped_view');

        /*if($this->input->post('is_grouped')=='on')
            $is_grouped = 1;
        else
            $is_grouped = 0;*/

        $data['group_type'] = $group_type;
        $data['start_date'] = $start_date;
        $data['end_date'] = $end_date;
        $data['opbal_type'] = $opbal_type;
        $data['is_grouped'] = $is_grouped;

        if($is_grouped==1)
        {
            if($group_type=='main_group')
            {
                $data['trialbalance_list'] = $this->Trialbalance_model->get_main_group_grouped_trialbalance_list();
            }
            elseif($group_type=='primary_group')
            {
                $data['trialbalance_list'] = $this->Trialbalance_model->get_primary_group_grouped_trialbalance_list();
            }
            else
            {
                $data['trialbalance_list'] = array();
            }
        }
        else
        {
            if($group_type=='main_group')
            {
                $data['trialbalance_list'] = $this->Trialbalance_model->get_main_group_trialbalance_list();
                $data['ledger_wise'] = 0;
            }
            elseif($group_type=='primary_group')
            {
                $data['trialbalance_list'] = $this->Trialbalance_model->get_primary_group_trialbalance_list();
                $data['ledger_wise'] = 0;
            }
            else
            {
                $data['trialbalance_list'] = array();
                $data['ledger_wise'] = 1;
            }
        }
        $this->load->view('trialbalance/trialbalance_list',$data);
    }

    public function make_trail_balance_summary($sdate,$edate,$optype)
    {
        $this->Trialbalance_model->delete_ledger_closing_summary();

        $ledger_list = $this->Trialbalance_model->get_ledger_list();
        foreach($ledger_list as $llist)
        {
            $single_ledger_list = $this->Trialbalance_model->get_single_ledger_list($llist['LEDGER_SNO']);
            $selected_ledger = $single_ledger_list->LEDGER_NAME;
            $vLedgerID = $single_ledger_list->LEDGER_SNO;

            $GetLedgerAmount = '';
            $vOpeningBalance = $single_ledger_list->OP_BALANCE;
            $vOpeningSide = $single_ledger_list->OP_SIDE;

            $vmaster_details = $this->Trialbalance_model->get_voucher_master_details($vLedgerID,$sdate,$edate);
            $vTotDebit = is_null($vmaster_details->Debit)?0:$vmaster_details->Debit;
            $vTotCredit = is_null($vmaster_details->Credit)?0:$vmaster_details->Credit;

            if($optype=='with_opening')
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

            if($vLedgerID!=0)
            {
                $selected_group_details = $this->Trialbalance_model->get_selected_group_detail($single_ledger_list->GROUP_ID);
                $selected_group = $selected_group_details->GROUP_NAME;

                $selected_primary_group_details = $this->Trialbalance_model->get_selected_primary_group_detail($selected_group);
                $selected_primary_group = $selected_primary_group_details->UNDER_GROUP;
            }
            else
            {
                $selected_group = '';
                $selected_primary_group = '';
            }

            if($vLedgerBalance>0)
            {
                $this->Trialbalance_model->insert_acc_ledger_closing_summary($single_ledger_list->SUPER_ID,$single_ledger_list->LEDGER_SNO,$single_ledger_list->LEDGER_NAME,$selected_group,$selected_primary_group,$vLedgerBalance,$vLedgerSide);
            }
        }
    }

}
?>