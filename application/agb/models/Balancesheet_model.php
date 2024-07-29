<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/***************************************************************
    Purpose : To handle all the Balancesheet database details 2022-08-19
****************************************************************/
class Balancesheet_model extends CI_Model
{
    public $other_db;
  function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Calcutta'); 
    }

    public function get_gold_opening_stock()
    {
        $this->other_db->reconnect();
        $result  = $this->other_db->query("SELECT SUM(OP_QTY) as gopqty,SUM(OP_VALUE) as gopval FROM PRODUCTS WHERE COMPANYCODE='".$_SESSION['COMPANYCODE']."' AND METAL='GOLD'")->row();
        save_query_in_log();
        $this->other_db->close();
        return $result;
    }

    public function get_silver_opening_stock()
    {
        $this->other_db->reconnect();
        $result  = $this->other_db->query("SELECT SUM(OP_QTY) as sopqty,SUM(OP_VALUE) as sopval FROM PRODUCTS WHERE COMPANYCODE='".$_SESSION['COMPANYCODE']."' AND METAL='SILVER'")->row();
        save_query_in_log();
        $this->other_db->close();
        return $result;
    }

    public function get_gold_product_list()
    {
        $this->other_db->reconnect();
        $result  = $this->other_db->query("SELECT * FROM PRODUCTS WHERE COMPANYCODE='".$_SESSION['COMPANYCODE']."' AND METAL='GOLD'")->result_array();
        save_query_in_log();
        $this->other_db->close();
        return $result;
    }

    public function get_silver_product_list()
    {
        $this->other_db->reconnect();
        $result  = $this->other_db->query("SELECT * FROM PRODUCTS WHERE COMPANYCODE='".$_SESSION['COMPANYCODE']."' AND METAL='SILVER'")->result_array();
        save_query_in_log();
        $this->other_db->close();
        return $result;
    }

    public function get_last_invoice_master_by_item($isno,$edate)
    {
        $this->db->reconnect();
        $result  = $this->db->query("SELECT TOP 1 RATE FROM INV_MASTER,INV_DETAILS WHERE INV_MASTER.MASTER_SNO=INV_DETAILS.MASTER_SNO AND INV_DETAILS.ITEM_ID='".$isno."' AND BILL_DATE<= '".$edate."' ORDER BY BILL_DATE DESC")->row();
        save_query_in_log();
        $this->db->close();
        return $result;
    }

    public function get_product_by_item_no($isno)
    {
        $this->other_db->reconnect();
        $result  = $this->other_db->query("SELECT OP_RATE,PURCHASE_RATE FROM PRODUCTS WHERE ITEM_SNO='".$isno."'")->row();
        save_query_in_log();
        $this->other_db->close();
        return $result;
    }

    public function get_income_ledger_list()
    {
        $this->other_db->reconnect();
        $result  = $this->other_db->query("SELECT  LEDGER_SNO FROM ACC_LEDGERS WHERE COMPANYCODE='".$_SESSION['COMPANYCODE']."' AND SUPER_ID='3'")->result_array();
        save_query_in_log();
        $this->other_db->close();
        return $result;
    }

    public function get_income_voucher_master_amount_by_ledger_no($lsno,$sdate,$edate)
    {
        $this->other_db->reconnect();
        $result  = $this->other_db->query("SELECT SUM(CREDIT-DEBIT) as creditamt FROM VOUCHER_MASTER, VOUCHER_DETAILS WHERE VOUCHER_MASTER.MASTER_SNO = VOUCHER_DETAILS.VOUCHER_MASTER_SNO AND COMPANYCODE='".$_SESSION['COMPANYCODE']."' AND TRANSDATE>= '".$sdate."' AND TRANSDATE<= '".$edate."' AND LEDGER_SNO='".$lsno."' GROUP BY LEDGER_SNO")->row();
        save_query_in_log();
        $this->other_db->close();
        return $result;
    }

    public function get_expense_ledger_list()
    {
        $this->other_db->reconnect();
        $result  = $this->other_db->query("SELECT  LEDGER_SNO FROM ACC_LEDGERS WHERE COMPANYCODE='".$_SESSION['COMPANYCODE']."' AND SUPER_ID='4'")->result_array();
        save_query_in_log();
        $this->other_db->close();
        return $result;
    }

    public function get_expense_voucher_master_amount_by_ledger_no($lsno,$sdate,$edate)
    {
        $this->other_db->reconnect();
        $result  = $this->other_db->query("SELECT SUM(DEBIT-CREDIT) as debitamt FROM VOUCHER_MASTER, VOUCHER_DETAILS WHERE VOUCHER_MASTER.MASTER_SNO = VOUCHER_DETAILS.VOUCHER_MASTER_SNO AND COMPANYCODE='".$_SESSION['COMPANYCODE']."' AND TRANSDATE>= '".$sdate."' AND TRANSDATE<= '".$edate."' AND LEDGER_SNO='".$lsno."' GROUP BY LEDGER_SNO")->row();
        save_query_in_log();
        $this->other_db->close();
        return $result;
    }

    public function get_liabilities_group()
    {
        $this->other_db->reconnect();
        $result  = $this->other_db->query("SELECT DISTINCT GROUP_NAME FROM ACC_LEDGERS WHERE COMPANYCODE='".$_SESSION['COMPANYCODE']."' AND LEDGER_SNO <> '0' AND SUPER_ID='2' order by GROUP_NAME")->result_array();
        save_query_in_log();
        $this->other_db->close();
        return $result;
    }

    public function get_assets_group()
    {
        $this->other_db->reconnect();
        $result  = $this->other_db->query("SELECT DISTINCT GROUP_NAME FROM ACC_LEDGERS WHERE COMPANYCODE='".$_SESSION['COMPANYCODE']."' AND LEDGER_SNO <> '0' AND SUPER_ID='1' AND GROUP_ID <> '10' order by GROUP_NAME")->result_array();
        save_query_in_log();
        $this->other_db->close();
        return $result;
    }

    public function get_ledger_group_list_by_group_name($lgpname)
    {
        $this->other_db->reconnect();
        $result  = $this->other_db->query("SELECT * FROM ACC_LEDGERS WHERE COMPANYCODE='".$_SESSION['COMPANYCODE']."' AND LEDGER_SNO <> '0' AND SUPER_ID='2' AND GROUP_NAME = '".$lgpname."'")->result_array();
        save_query_in_log();
        $this->other_db->close();
        return $result;
    }

    public function get_asset_ledger_group_list_by_group_name($lgpname)
    {
        $this->other_db->reconnect();
        $result  = $this->other_db->query("SELECT * FROM ACC_LEDGERS WHERE COMPANYCODE='".$_SESSION['COMPANYCODE']."' AND LEDGER_SNO <> '0' AND SUPER_ID='1' AND GROUP_ID <> '10' AND GROUP_NAME = '".$lgpname."'")->result_array();
        save_query_in_log();
        $this->other_db->close();
        return $result;
    }

    public function get_account_ledger_group($lgpname)
    {
        $this->other_db->reconnect();
        $result  = $this->other_db->query("SELECT *FROM ACC_LEDGERS WHERE LEDGER_SNO = '".$lgpname."' AND COMPANYCODE='".$_SESSION['COMPANYCODE']."'")->row();
        save_query_in_log();
        $this->other_db->close();
        return $result;
    }

    public function get_liabilities_ledger_credit_debit($lgpname,$sdate,$edate)
    {
        $this->other_db->reconnect();
        $result  = $this->other_db->query("SELECT SUM(DEBIT) AS TOTALDEBITS, SUM(CREDIT) AS TOTALCREDITS FROM VOUCHER_MASTER, VOUCHER_DETAILS WHERE VOUCHER_MASTER.MASTER_SNO = VOUCHER_DETAILS.VOUCHER_MASTER_SNO AND LEDGER_SNO='".$lgpname."' AND TRANSDATE>= '".$sdate."' AND TRANSDATE<= '".$edate."'  AND COMPANYCODE='".$_SESSION['COMPANYCODE']."'")->row();
        save_query_in_log();
        $this->other_db->close();
        return $result;
    }

    public function get_credit_opening_balance()
    {
        $this->other_db->reconnect();
        $result  = $this->other_db->query("SELECT SUM(OP_BALANCE) as copbal FROM ACC_LEDGERS WHERE LEDGER_SNO='0' AND COMPANYCODE='".$_SESSION['COMPANYCODE']."' AND OP_SIDE='cr'")->row();
        save_query_in_log();
        $this->other_db->close();
        return $result;
    }

    public function get_debit_opening_balance()
    {
        $this->other_db->reconnect();
        $result  = $this->other_db->query("SELECT SUM(OP_BALANCE) as dopbal FROM ACC_LEDGERS WHERE LEDGER_SNO='0' AND COMPANYCODE='".$_SESSION['COMPANYCODE']."' AND OP_SIDE='dr'")->row();
        save_query_in_log();
        $this->other_db->close();
        return $result;
    }

    public function get_all_debit_opening_balance()
    {
        $this->other_db->reconnect();
        $result  = $this->other_db->query("SELECT SUM(OP_BALANCE) as debopbal FROM ACC_LEDGERS WHERE COMPANYCODE='".$_SESSION['COMPANYCODE']."' AND UPPER(OP_SIDE)='DR'")->row();
        save_query_in_log();
        $this->other_db->close();
        return $result;
    }

    public function get_all_credit_opening_balance()
    {
        $this->other_db->reconnect();
        $result  = $this->other_db->query("SELECT SUM(OP_BALANCE) as creopbal FROM ACC_LEDGERS WHERE COMPANYCODE='".$_SESSION['COMPANYCODE']."' AND UPPER(OP_SIDE)='CR'")->row();
        save_query_in_log();
        $this->other_db->close();
        return $result;
    }

    public function get_loan_party_account_ledger()
    {
        $this->other_db->reconnect();
        $result  = $this->other_db->query("SELECT *FROM ACC_LEDGERS WHERE GROUP_ID = '10' AND COMPANYCODE='".$_SESSION['COMPANYCODE']."'")->result_array();
        save_query_in_log();
        $this->other_db->close();
        return $result;
    }

    public function get_voucher_master_amount_by_ledger_no($lsno,$sdate,$edate)
    {
        $this->other_db->reconnect();
        $result  = $this->other_db->query("SELECT SUM(DEBIT-CREDIT) AS TOTBAL FROM VOUCHER_MASTER, VOUCHER_DETAILS WHERE VOUCHER_MASTER.MASTER_SNO = VOUCHER_DETAILS.VOUCHER_MASTER_SNO AND LEDGER_SNO='".$lsno."' AND TRANSDATE>= '".$sdate."' AND TRANSDATE<= '".$edate."'  AND COMPANYCODE='".$_SESSION['COMPANYCODE']."'")->row();
        save_query_in_log();
        $this->other_db->close();
        return $result;
    }

}
?>