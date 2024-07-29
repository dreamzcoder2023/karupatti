<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/* ************************************************************************************
		Purpose : To handle all Daybook functions 2022-09-28
***************************************************************************************/
class Daybook extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model(array("Daybook_model","Accountsgroup_model"));
    	$this->load->library('user_agent');
        $fin_year=$this->Accountsgroup_model->get_fin_years_list();
        $db=substr($fin_year->DBNAME,0,strlen($fin_year->DBNAME)-4);
        //echo $db;exit;
        $config_app = switch_db_dynamic($db);
        
        $this->Daybook_model->other_db = $this->load->database($config_app,TRUE);
    	if (isset($this->session->userdata['username']) && $this->session->userdata['username'] == TRUE)
        {
            //do something
        }else{
            redirect('login'); //if session is not there, redirect to login page
        } 
		date_default_timezone_set("Asia/Kolkata");
    	$this->session->set_userdata('comtitle', 'Daybook');
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
            $style_type = $this->input->post('style_type');

            $data['day_period'] = $day_period;
            $data['start_date'] = $start_date;
            $data['end_date'] = $end_date;
            $data['voucher_type'] = $voucher_type;
            $data['account_type'] = $account_type;
            $data['style_type'] = $style_type;
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
            $style_type = $data['style_type'] = 'style1';
        }

        $this->Daybook_model->delete_account_voucher();
        if($style_type == 'style1')
        {
            //MERGE ALL LOAN ENTRY
            $loan_list = $this->Daybook_model->get_loan_list($start_date,$end_date);
            foreach($loan_list as $llist)
            {
                $k=1;
                $this->Daybook_model->insert_loan_account_voucher($llist['BILLNO'],$llist['ENDATE'],'LOAN_PAYMENT',$llist['NAME'],$llist['BILLNO'],'',$llist['AMOUNT'],$llist['ADDED_TIME'],$k);

                if($llist['ADVANCEINTEREST']>0)
                {
                    $k++;
                    $this->Daybook_model->insert_loan_account_voucher_credit($llist['BILLNO'],$llist['ENDATE'],'LOAN_PAYMENT','Interest Income',$llist['BILLNO'],'',$llist['ADVANCEINTEREST'],$llist['ADDED_TIME'],$k);
                }
                if($llist['HL_AMOUNT']>0)
                {
                    $k++;
                    $this->Daybook_model->insert_loan_account_voucher_credit($llist['BILLNO'],$llist['ENDATE'],'LOAN_PAYMENT',$llist['NAME'],$llist['BILLNO'],'ADVANCE',$llist['HL_AMOUNT'],$llist['ADDED_TIME'],$k);
                }
                if($llist['DCAMOUNT']>0)
                {
                    $k++;
                    $this->Daybook_model->insert_loan_account_voucher_credit($llist['BILLNO'],$llist['ENDATE'],'LOAN_PAYMENT','Document Income',$llist['BILLNO'],'',$llist['DCAMOUNT'],$llist['ADDED_TIME'],$k);
                }
            }

            //MERGE ALL LOAN RECEIPTS
            $loan_receipt_list = $this->Daybook_model->get_loan_receipt_list($start_date,$end_date);
            foreach($loan_receipt_list as $llist)
            {
                $party_details = $this->Daybook_model->get_party_by_loan_bill_no($llist['BILLNO']);
                $k=1;
                $this->Daybook_model->insert_loan_account_voucher_credit($llist['RECEIPT_SNO'],$llist['RECEIPT_DATE'],'LOAN_RECEIPT',$party_details->NAME,$llist['BILLNO'],'',$llist['PRINCIPAL'],$llist['ADDED_TIME'],$k);

                if($llist['INT_AMOUNT']!=0)
                {
                    $k++;
                    if($llist['INT_AMOUNT']>0)
                    {
                        $this->Daybook_model->insert_loan_account_voucher_credit($llist['RECEIPT_SNO'],$llist['RECEIPT_DATE'],'LOAN_RECEIPT','Interest Income',$llist['BILLNO'],'',$llist['INT_AMOUNT'],$llist['ADDED_TIME'],$k);
                    }
                    else
                    {
                        $this->Daybook_model->insert_loan_account_voucher($llist['RECEIPT_SNO'],$llist['RECEIPT_DATE'],'LOAN_RECEIPT','Interest Income',$llist['BILLNO'],'',abs($llist['INT_AMOUNT']),$llist['ADDED_TIME'],$k);
                    }
                }
                if($llist['MAINTAINCHARGE']>0)
                {
                    $this->Daybook_model->insert_loan_account_voucher_credit($llist['RECEIPT_SNO'],$llist['RECEIPT_DATE'],'LOAN_RECEIPT','Paper Action',$llist['BILLNO'],'',$llist['MAINTAINCHARGE'],$llist['ADDED_TIME'],$k);
                }
                if($llist['NOTICECHARGE']>0)
                {
                    $this->Daybook_model->insert_loan_account_voucher_credit($llist['RECEIPT_SNO'],$llist['RECEIPT_DATE'],'LOAN_RECEIPT','Notice Charge',$llist['BILLNO'],'',$llist['NOTICECHARGE'],$llist['ADDED_TIME'],$k);
                }
                if($llist['FORMCHARGE']>0)
                {
                    $this->Daybook_model->insert_loan_account_voucher_credit($llist['RECEIPT_SNO'],$llist['RECEIPT_DATE'],'LOAN_RECEIPT','Form Missing',$llist['BILLNO'],'',$llist['FORMCHARGE'],$llist['ADDED_TIME'],$k);
                }
                if($llist['DISCOUNT']!=0)
                {
                    $k++;
                    if($llist['DISCOUNT']>0)
                    {
                        $this->Daybook_model->insert_loan_account_voucher_credit($llist['RECEIPT_SNO'],$llist['RECEIPT_DATE'],'LOAN_RECEIPT','Discount',$llist['BILLNO'],'',$llist['DISCOUNT'],$llist['ADDED_TIME'],$k);
                    }
                    else
                    {
                        $this->Daybook_model->insert_loan_account_voucher($llist['RECEIPT_SNO'],$llist['RECEIPT_DATE'],'LOAN_RECEIPT','Discount',$llist['BILLNO'],'',$llist['DISCOUNT'],$llist['ADDED_TIME'],$k);
                    }
                }
            }

            //MERGE ALL REDEMPTIONS
            $redemption_list = $this->Daybook_model->get_redemption_list($start_date,$end_date);
            foreach($redemption_list as $llist)
            {
                $party_details = $this->Daybook_model->get_party_by_loan_bill_no($llist['BILLNO']);
                $k=1;
                $this->Daybook_model->insert_loan_account_voucher_credit($llist['BILLNO'],$llist['RETURNDATE'],'REDEMPTION',$party_details->NAME,$llist['BILLNO'],'',$llist['PRINCIPAL']-$llist['PAIDPRINCIPAL'],$llist['ADDED_TIME'],$k);

                if($llist['INTEREST']!=0)
                {
                    $k++;
                    if($llist['INTEREST']>0)
                    {
                        $this->Daybook_model->insert_loan_account_voucher_credit($llist['BILLNO'],$llist['RETURNDATE'],'REDEMPTION','Interest Income',$llist['BILLNO'],'',$llist['INTEREST'],$llist['ADDED_TIME'],$k);
                    }
                    else
                    {
                        $this->Daybook_model->insert_loan_account_voucher($llist['BILLNO'],$llist['RETURNDATE'],'REDEMPTION','Interest Income',$llist['BILLNO'],'',$llist['INTEREST'],$llist['ADDED_TIME'],$k);
                    }
                }
                if($llist['MAINTAINCHARGE']>0)
                {
                    $this->Daybook_model->insert_loan_account_voucher_credit($llist['BILLNO'],$llist['RETURNDATE'],'REDEMPTION','Paper Action',$llist['BILLNO'],'',$llist['MAINTAINCHARGE'],$llist['ADDED_TIME'],$k);
                }
                if($llist['NOTICECHARGE']>0)
                {
                    $this->Daybook_model->insert_loan_account_voucher_credit($llist['BILLNO'],$llist['RETURNDATE'],'REDEMPTION','Notice Charge',$llist['BILLNO'],'',$llist['NOTICECHARGE'],$llist['ADDED_TIME'],$k);
                }
                if($llist['FORMCHARGE']>0)
                {
                    $this->Daybook_model->insert_loan_account_voucher_credit($llist['BILLNO'],$llist['RETURNDATE'],'REDEMPTION','Form Missing',$llist['BILLNO'],'',$llist['FORMCHARGE'],$llist['ADDED_TIME'],$k);
                }
                if($llist['DISCOUNT']>0)
                {
                    $this->Daybook_model->insert_loan_account_voucher($llist['BILLNO'],$llist['RETURNDATE'],'REDEMPTION','Discount',$llist['BILLNO'],'',$llist['DISCOUNT'],$llist['ADDED_TIME'],$k);
                }
                if($llist['PROFIT']>0)
                {
                    $this->Daybook_model->insert_loan_account_voucher_credit($llist['BILLNO'],$llist['RETURNDATE'],'REDEMPTION','Profit on Selling Jewels',$llist['BILLNO'],'',$llist['PROFIT'],$llist['ADDED_TIME'],$k);
                }
                if($llist['LOSS']>0)
                {
                    $this->Daybook_model->insert_loan_account_voucher($llist['BILLNO'],$llist['RETURNDATE'],'REDEMPTION','Loss on Selling Jewels',$llist['BILLNO'],'',$llist['LOSS'],$llist['ADDED_TIME'],$k);
                }
            }

            //MERGE ALL REPLEDGE ENTRY
            $repledge_list = $this->Daybook_model->get_repledge_list($start_date,$end_date);
            foreach($repledge_list as $llist)
            {
                $k=1;
                $this->Daybook_model->insert_loan_account_voucher_credit($llist['BILLNO'],$llist['ENDATE'],'REPLEDGE',$llist['BANK'],$llist['RP_BILLNO'],'',$llist['AMOUNT'],$llist['ADDED_TIME'],$k);

                if($llist['APP_CHARGE']>0)
                {
                    $this->Daybook_model->insert_loan_account_voucher($llist['BILLNO'],$llist['ENDATE'],'REPLEDGE','Appraiser Expenses',$llist['RP_BILLNO'],'',$llist['APP_CHARGE'],$llist['ADDED_TIME'],$k);
                }
                if($llist['OTHERS']>0)
                {
                    $this->Daybook_model->insert_loan_account_voucher($llist['BILLNO'],$llist['ENDATE'],'REPLEDGE','Other Expenses',$llist['RP_BILLNO'],'',$llist['OTHERS'],$llist['ADDED_TIME'],$k);
                }
            }

            //MERGE ALL REPLEDGE RECEIPTS
            $repledge_receipt_list = $this->Daybook_model->get_repledge_receipt_list($start_date,$end_date);
            foreach($repledge_receipt_list as $llist)
            {
                 $k=1;
                $this->Daybook_model->insert_loan_account_voucher($llist['RP_RECEIPTNO'],$llist['RECEIPT_DATE'],'RP_RECEIPT',$llist['BANK'],$llist['RP_BILLNO'],'',$llist['AMOUNT'],$llist['ADDED_TIME'],$k);
            }

            //MERGE ALL REPLEDGE RETURN
            $repledge_return_list = $this->Daybook_model->get_repledge_return_list($start_date,$end_date);
            foreach($repledge_return_list as $llist)
            {
                 $k=1;
                $this->Daybook_model->insert_loan_account_voucher($llist['RP_SNO'],$llist['RETURN_DATE'],'RP_RETURN',$llist['BANK'],$llist['BANKNO'],'',$llist['LOANAMOUNT']-$llist['PAIDAMOUNT'],$llist['ADDED_TIME'],$k);

                if($llist['INTEREST']>0)
                {
                    $this->Daybook_model->insert_loan_account_voucher($llist['RP_SNO'],$llist['RETURN_DATE'],'RP_RETURN','Interest Expenses',$llist['BANKNO'],'',$llist['INTEREST'],$llist['ADDED_TIME'],$k);
                }
                if($llist['OTHERS']>0)
                {
                    $this->Daybook_model->insert_loan_account_voucher($llist['RP_SNO'],$llist['RETURN_DATE'],'RP_RETURN','Other Expenses',$llist['BANKNO'],'',$llist['OTHERS'],$llist['ADDED_TIME'],$k);
                }
                if($llist['DISCOUNT']>0)
                {
                    $this->Daybook_model->insert_loan_account_voucher_credit($llist['RP_SNO'],$llist['RETURN_DATE'],'RP_RETURN','Discount Received',$llist['BANKNO'],'',$llist['DISCOUNT'],$llist['ADDED_TIME'],$k);
                }
            }

        }
        else
        {
            $voucher_master_list = $this->Daybook_model->get_voucher_master_list($start_date,$end_date);
            foreach($voucher_master_list as $llist)
            {
                if($llist['VOUCHER_TYPE'] == "LOAN_PAYMENT" || $llist['VOUCHER_TYPE'] == "LOAN_RECEIPT" || $llist['VOUCHER_TYPE'] == "REDEMPTION" || $llist['VOUCHER_TYPE'] == "REPLEDGE" || $llist['VOUCHER_TYPE'] == "RP_RECEIPT" || $llist['VOUCHER_TYPE'] == "RP_RETURN" || $llist['VOUCHER_TYPE'] == "JEWEL_PURCHASE" || $llist['VOUCHER_TYPE'] == "JEWEL_SALES")
                {
                    $voucher_master_det = $this->Daybook_model->get_voucher_master_details_list($llist['MASTER_SNO']);
                    foreach($voucher_master_det as $vmdet)
                    {
                        $this->Daybook_model->insert_style2_account_voucher($llist['MASTER_SNO'],$llist['TRANSDATE'],$llist['VOUCHER_TYPE'],$vmdet['LEDGER_NAME'],$llist['REF_NO'],'',$vmdet['DEBIT'],$vmdet['CREDIT'],$vmdet['SUPER_ID'],$llist['ADDED_TIME'],$vmdet['ROWNO']);
                    }
                }

                if($llist['TRANSTYPE'] == "CASH PAY" || $llist['TRANSTYPE'] == "CASH RCPT")
                {
                    $voucher_master_det = $this->Daybook_model->get_voucher_master_details_list($llist['MASTER_SNO']);
                    foreach($voucher_master_det as $vmdet)
                    {
                        $this->Daybook_model->insert_style2_account_voucher($llist['MASTER_SNO'],$llist['TRANSDATE'],$llist['VOUCHER_TYPE'],$vmdet['LEDGER_NAME'],$llist['MASTER_SNO'],$llist['DESCRIPTION'],$vmdet['DEBIT'],$vmdet['CREDIT'],$vmdet['SUPER_ID'],$llist['ADDED_TIME'],$vmdet['ROWNO']);
                        if($llist['VOUCHER_TYPE'] == "MRI_PAYMENT" Or $llist['VOUCHER_TYPE'] == "MRI_RECEIPT" Or $llist['VOUCHER_TYPE'] == "MRI_CLOSE")
                        {
                            $this->Daybook_model->insert_style2_account_voucher($llist['MASTER_SNO'],$llist['TRANSDATE'],$llist['VOUCHER_TYPE'],$vmdet['LEDGER_NAME'],$llist['REF_NO'],$llist['DESCRIPTION'],$vmdet['DEBIT'],$vmdet['CREDIT'],$vmdet['SUPER_ID'],$llist['ADDED_TIME'],$vmdet['ROWNO']);
                        }
                    }
                }

                if($llist['TRANSTYPE'] == "BANK PAY" || $llist['TRANSTYPE'] == "BANK RCPT" || $llist['TRANSTYPE'] == "JOURNAL")
                {
                    $voucher_master_det = $this->Daybook_model->get_voucher_master_details_bank($llist['MASTER_SNO']);
                    foreach($voucher_master_det as $vmdet)
                    {
                        $this->Daybook_model->insert_style2_account_voucher($llist['MASTER_SNO'],$llist['TRANSDATE'],$llist['VOUCHER_TYPE'],$vmdet['LEDGER_NAME'],$llist['MASTER_SNO'],$llist['DESCRIPTION'],$vmdet['DEBIT'],$vmdet['CREDIT'],$vmdet['SUPER_ID'],$llist['ADDED_TIME'],$vmdet['ROWNO']);
                    }
                }

                if($llist['TRANSTYPE'] == "CONTRA" || $llist['TRANSTYPE'] == "SALES" || $llist['TRANSTYPE'] == "PURCHASE" || $llist['TRANSTYPE'] == "PURCHASE_RETURN" || $llist['TRANSTYPE'] == "SALES_RETURN" || $llist['TRANSTYPE'] == "JEWEL_PURCHASE" || $llist['TRANSTYPE'] == "JEWEL_SALES")
                {
                    $voucher_master_det = $this->Daybook_model->get_voucher_master_details_purchase($llist['MASTER_SNO']);
                    foreach($voucher_master_det as $vmdet)
                    {
                        $this->Daybook_model->insert_style2_account_voucher($llist['MASTER_SNO'],$llist['TRANSDATE'],$llist['VOUCHER_TYPE'],$vmdet['LEDGER_NAME'],$llist['MASTER_SNO'],$llist['DESCRIPTION'],$vmdet['DEBIT'],$vmdet['CREDIT'],$vmdet['SUPER_ID'],$llist['ADDED_TIME'],$vmdet['ROWNO']);
                    }
                }
            }
        }

        if($account_type!='ALL')
        {
            $acc_group_details = $this->Daybook_model->get_account_group_details($account_type);
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

        $data['daybook_list'] = $this->Daybook_model->get_daybook_list($atype,$vtype);
        //print_r($data);exit;
        $this->load->view('daybook/daybook_list',$data);
    }

}
?>