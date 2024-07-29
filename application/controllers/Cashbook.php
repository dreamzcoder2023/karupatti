<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/* ************************************************************************************
		Purpose : To handle all Cashbook functions 2022-09-28
***************************************************************************************/
class Cashbook extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model(array("Cashbook_model","Accountsgroup_model"));
    	$this->load->library('user_agent');
        $fin_year=$this->Accountsgroup_model->get_fin_years_list();
        $db=substr($fin_year->DBNAME,0,strlen($fin_year->DBNAME)-4);
        //echo $db;exit;
        $config_app = switch_db_dynamic($db);
        
        $this->Cashbook_model->other_db = $this->load->database($config_app,TRUE);
    	if (isset($this->session->userdata['username']) && $this->session->userdata['username'] == TRUE)
        {
            //do something
        }else{
            redirect('login'); //if session is not there, redirect to login page
        } 
		date_default_timezone_set("Asia/Kolkata");
    	$this->session->set_userdata('comtitle', 'Cashbook');
	}

    public function index()
    {
        $ccode = $_SESSION['COMPANYCODE'];
        $cdate = date('Y-m-d');
        if($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            $day_period = $this->input->post('day_period');
            $start_date = $this->input->post('start_date');
            if($day_period=='day')
            {
                $end_date = $start_date;
            }
            else
            {
                $end_date = $this->input->post('end_date');
            }
            $voucher_type = $this->input->post('voucher_type');
            $account_type = $this->input->post('account_type');

            $data['day_period'] = $day_period;
            $data['start_date'] = $start_date;
            $data['end_date'] = $end_date;
            $data['voucher_type'] = $voucher_type;
            $data['account_type'] = $account_type;
        }
        else
        {
            $cdate = date('Y-m-d');

            $start_date = $cdate;
            $end_date = $cdate;

            $data['day_period'] = 'day';
            $data['start_date'] = $cdate;
            $data['end_date'] = $cdate;
            $voucher_type = $data['voucher_type'] = 'ALL';
            $account_type = $data['account_type'] = 'ALL';
        }

        $this->Cashbook_model->delete_account_voucher();

        //MERGE ALL LOAN ENTRY
        $loan_list = $this->Cashbook_model->get_loan_list($start_date,$end_date);
        $k=0;foreach($loan_list as $llist)
        {
            if($llist['PAID_CASH']>0)
            {
                $k++;
                $this->Cashbook_model->insert_loan_account_voucher_credit($llist['VOUCHER_SNO'],$llist['BILLNO'],$llist['ENDATE'],'LOAN_PAYMENT',$llist['NAME'],$llist['BILLNO'],'',$llist['PAID_CASH'],$llist['ADDED_TIME'],$k);
            }
        }

        //MERGE ALL LOAN RECEIPTS
        $loan_receipt_list = $this->Cashbook_model->get_loan_receipt_list($start_date,$end_date);
        $k=0;foreach($loan_receipt_list as $llist)
        {
            $party_details = $this->Cashbook_model->get_party_name($llist['BILLNO']);
            $pname = $party_details->NAME;
            $k=1;
            $this->Cashbook_model->insert_loan_account_voucher_debit($llist['VOUCHER_SNO'],$llist['RECEIPT_SNO'],$llist['RECEIPT_DATE'],'LOAN_RECEIPT',$pname,$llist['BILLNO'],'',$llist['PAIDAMOUNT'],$llist['ADDED_TIME'],$k);
        }

        //MERGE ALL REDEMPTIONS
        $loan_redemption_list = $this->Cashbook_model->get_loan_redemption_list($start_date,$end_date);
        $k=0;foreach($loan_redemption_list as $llist)
        {
            $party_details = $this->Cashbook_model->get_party_name($llist['BILLNO']);
            $pname = $party_details->NAME;
            $k=1;
            $this->Cashbook_model->insert_loan_account_voucher_debit($llist['VOUCHER_SNO'],$llist['BILLNO'],$llist['RETURNDATE'],'REDEMPTION',$pname,$llist['BILLNO'],'',$llist['PAIDAMOUNT'],$llist['ADDED_TIME'],$k);
        }

        //MERGE ALL REPLEDGE ENTRY
        $repledge_list = $this->Cashbook_model->get_repledge_list($start_date,$end_date);
        $k=0;foreach($repledge_list as $llist)
        {
            $k=1;
            $this->Cashbook_model->insert_loan_account_voucher_debit($llist['VOUCHER_SNO'],$llist['RP_SNO'],$llist['ENDATE'],'REPLEDGE',$llist['BANK'],$llist['RP_BILLNO'],'',$llist['RECEIVED_CASH'],$llist['ADDED_TIME'],$k);
        }

        //MERGE ALL REPLEDGE RECEIPTS
        $repledge_receipt_list = $this->Cashbook_model->get_repledge_receipt_list($start_date,$end_date);
        $k=0;foreach($repledge_receipt_list as $llist)
        {
            $k=1;
            $this->Cashbook_model->insert_loan_account_voucher_credit($llist['VOUCHER_SNO'],$llist['RP_RECEIPTNO'],$llist['RECEIPT_DATE'],'RP_RECEIPT',$llist['BANK'],$llist['RP_BILLNO'],'',$llist['AMOUNT'],$llist['ADDED_TIME'],$k);
        }

        //MERGE ALL REPLEDGE RETURN
        $repledge_return_list = $this->Cashbook_model->get_repledge_return_list($start_date,$end_date);
        $k=0;foreach($repledge_return_list as $llist)
        {
            $k=1;
            $this->Cashbook_model->insert_loan_account_voucher_credit($llist['VOUCHER_SNO'],$llist['RP_SNO'],$llist['RETURN_DATE'],'RP_RETURN',$llist['BANK'],$llist['RP_BILLNO'],'',$llist['PAID_CASH'],$llist['ADDED_TIME'],$k);
        }

        //MERGE ALL JEWEL_PURCHASE ENTRY
        $jewel_purchase_list = $this->Cashbook_model->get_jewel_purchase_list($start_date,$end_date);
        $k=0;foreach($jewel_purchase_list as $llist)
        {
            if($llist['PAID_CASH']>0)
            {
                $k++;
                $this->Cashbook_model->insert_loan_account_voucher_credit($llist['VOUCHER_SNO'],$llist['BILLNO'],$llist['ENDATE'],'JEWEL_PURCHASE',$llist['NAME'],$llist['BILLNO'],'',$llist['PAID_CASH'],$llist['ADDED_TIME'],$k);
            }
        }

        //MERGE ALL JEWEL_SALES ENTRY
        $jewel_sales_list = $this->Cashbook_model->get_jewel_sales_list($start_date,$end_date);
        $k=0;foreach($jewel_sales_list as $llist)
        {
            /*$party_details = $this->Cashbook_model->get_jewel_party_name($llist['BILLNO']);
            $pname = $party_details->NAME;*/
            $pname = $llist['BILL_NAME'];
            if($llist['RECEIVED_AMOUNT']>0)
            {
                $k++;
                $this->Cashbook_model->insert_loan_account_voucher_debit($llist['VOUCHER_SNO'],$llist['BILLNO'],$llist['BILL_DATE'],'JEWEL_SALES',$pname,$llist['BILLNO'],'',$llist['RECEIVED_AMOUNT'],$llist['ADDED_TIME'],$k);
            }
        }

        //GET ALL OTHER ACCOUNT VOUCHERS
        $other_account_voucher_list = $this->Cashbook_model->get_other_account_voucher_list($start_date,$end_date);
        $k=0;foreach($other_account_voucher_list as $llist)
        {
            if($llist['TRANSTYPE'] == "CASH PAY")
            {
                $voucher_master_details = $this->Cashbook_model->get_voucher_master_details_list($llist['MASTER_SNO']);
                foreach($voucher_master_details as $vmd)
                {
                    $amt = $vmd['DEBIT']-$vmd['CREDIT'];
                    $this->Cashbook_model->insert_vm_account_voucher_credit($llist['MASTER_SNO'],$llist['TRANSDATE'],$llist['VOUCHER_TYPE'],$vmd['LEDGER_NAME'],$llist['MASTER_SNO'],$llist['DESCRIPTION'],$amt,$vmd['SUPER_ID'],$llist['ADDED_TIME'],$vmd['ROWNO']);

                    if($llist['VOUCHER_TYPE']=='MRI_PAYMENT')
                    {
                        $amt = $vmd['DEBIT']-$vmd['CREDIT'];
                        $this->Cashbook_model->insert_vm_account_voucher_credit($llist['MASTER_SNO'],$llist['TRANSDATE'],$llist['VOUCHER_TYPE'],$vmd['LEDGER_NAME'],$llist['REF_NO'],$llist['DESCRIPTION'],$amt,$vmd['SUPER_ID'],$llist['ADDED_TIME'],$vmd['ROWNO']);
                    }
                }
            }

            if($llist['TRANSTYPE'] == "CASH RCPT" && $llist['VOUCHER_TYPE'] == "MRI_CLOSE")
            {
                $voucher_master_details = $this->Cashbook_model->get_voucher_master_details_without_group_list($llist['MASTER_SNO']);
                foreach($voucher_master_details as $vmd)
                {
                    $vCashValue = 0;
                    if($vmd['LEDGER_SNO']==1)
                    {
                        $vCashValue = $vmd['DEBIT'];
                    }
                    if($vmd['ROWNO']==1)
                    {
                        $this->Cashbook_model->insert_vm_account_voucher_debit($llist['MASTER_SNO'],$llist['TRANSDATE'],$llist['VOUCHER_TYPE'],$vmd['LEDGER_NAME'],$llist['REF_NO'],$llist['DESCRIPTION'],$vCashValue,$vmd['SUPER_ID'],$llist['ADDED_TIME'],$vmd['ROWNO']);
                    }
                }
            }

            if($llist['TRANSTYPE'] == "CASH RCPT" && $llist['VOUCHER_TYPE'] != "MRI_CLOSE")
            {
                $voucher_master_details = $this->Cashbook_model->get_voucher_master_details_list($llist['MASTER_SNO']);
                foreach($voucher_master_details as $vmd)
                {
                    if(($vmd['CREDIT']-$vmd['DEBIT'])>0)
                    {
                        $amt = $vmd['CREDIT']-$vmd['DEBIT'];
                        $this->Cashbook_model->insert_vm_account_voucher_debit($llist['MASTER_SNO'],$llist['TRANSDATE'],$llist['VOUCHER_TYPE'],$vmd['LEDGER_NAME'],$llist['MASTER_SNO'],$llist['DESCRIPTION'],$amt,$vmd['SUPER_ID'],$llist['ADDED_TIME'],$vmd['ROWNO']);
                    }
                    else
                    {
                        $amt = $vmd['DEBIT']-$vmd['CREDIT'];
                        $this->Cashbook_model->insert_vm_account_voucher_credit($llist['MASTER_SNO'],$llist['TRANSDATE'],$llist['VOUCHER_TYPE'],$vmd['LEDGER_NAME'],$llist['MASTER_SNO'],$llist['DESCRIPTION'],$amt,$vmd['SUPER_ID'],$llist['ADDED_TIME'],$vmd['ROWNO']);
                    }

                    if($llist['VOUCHER_TYPE']=="MRI_RECEIPT")
                    {
                        $amt = $vmd['CREDIT']-$vmd['DEBIT'];
                        $this->Cashbook_model->insert_vm_account_voucher_debit($llist['MASTER_SNO'],$llist['TRANSDATE'],$llist['VOUCHER_TYPE'],$vmd['LEDGER_NAME'],$llist['REF_NO'],$llist['DESCRIPTION'],$amt,$vmd['SUPER_ID'],$llist['ADDED_TIME'],$vmd['ROWNO']);
                    }
                }
            }

            if($llist['TRANSTYPE'] == "CONTRA" || $llist['TRANSTYPE'] != "SALES" || $llist['TRANSTYPE'] != "PURCHASE" || $llist['TRANSTYPE'] != "PURCHASE_RETURN" || $llist['TRANSTYPE'] != "SALES_RETURN" || $llist['TRANSTYPE'] != "JEWEL_PURCHASE" || $llist['TRANSTYPE'] != "JEWEL_SALES")
            {
                $voucher_master_details = $this->Cashbook_model->get_voucher_master_details_with_group_list($llist['MASTER_SNO']);
                foreach($voucher_master_details as $vmd)
                {
                    if(($vmd['CREDIT']-$vmd['DEBIT'])>0)
                    {
                        $amt = $vmd['CREDIT']-$vmd['DEBIT'];
                        $this->Cashbook_model->insert_vm_account_voucher_debit($llist['MASTER_SNO'],$llist['TRANSDATE'],$llist['VOUCHER_TYPE'],$vmd['LEDGER_NAME'],$llist['MASTER_SNO'],$llist['DESCRIPTION'],$amt,$vmd['SUPER_ID'],$llist['ADDED_TIME'],$vmd['ROWNO']);
                    }
                    else
                    {
                        $amt = $vmd['DEBIT']-$vmd['CREDIT'];
                        $this->Cashbook_model->insert_vm_account_voucher_credit($llist['MASTER_SNO'],$llist['TRANSDATE'],$llist['VOUCHER_TYPE'],$vmd['LEDGER_NAME'],$llist['MASTER_SNO'],$llist['DESCRIPTION'],$amt,$vmd['SUPER_ID'],$llist['ADDED_TIME'],$vmd['ROWNO']);
                    }
                }
            }
        }

        if($account_type!='ALL')
        {
            $acc_group_details = $this->Cashbook_model->get_account_group_details($account_type);
            $gsno = $acc_group_details->GROUP_SNO;

            $atype = " AND AC_SUPER_ID='".$gsno."'";
        }
        else
        {
            $atype = '';
        }

        if($voucher_type!='ALL')
        {
            $vtype = " AND VOUCHER_TYPE='".$voucher_type."'";
        }
        else
        {
            $vtype = '';
        }

        $data['cashbook_list'] = $this->Cashbook_model->get_cashbook_list($atype,$vtype);

        $fin_year=$this->Accountsgroup_model->get_fin_years_list();

        $fyear_start_date = new DateTime($fin_year->FDATE);
        $fyear_start_date->modify('-1 day');
        $data['fyear_start_date'] = $fyear_start_date->format('Y-m-d');

        $fyear_end_date = new DateTime($end_date);
        $fyear_end_date->modify('-1 day');
        $data['fyear_end_date'] = $fyear_end_date->format('Y-m-d');

        //print_r($data);exit;
        $this->load->view('cashbook/cashbook_list',$data);
    }

}
?>