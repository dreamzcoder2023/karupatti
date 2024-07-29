<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/***************************************************************
    Purpose : To handle all the Profitandloss database details 2022-10-17
****************************************************************/
class Profitandloss_model extends CI_Model
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

    public function get_expense_group()
    {
        $this->other_db->reconnect();
        $result  = $this->other_db->query("SELECT DISTINCT GROUP_NAME FROM ACC_LEDGERS WHERE COMPANYCODE='".$_SESSION['COMPANYCODE']."' AND SUPER_ID='4' order by GROUP_NAME")->result_array();
        save_query_in_log();
        $this->other_db->close();
        return $result;
    }

    public function get_income_group()
    {
        $this->other_db->reconnect();
        $result  = $this->other_db->query("SELECT DISTINCT GROUP_NAME FROM ACC_LEDGERS WHERE COMPANYCODE='".$_SESSION['COMPANYCODE']."' AND SUPER_ID='3' order by GROUP_NAME")->result_array();
        save_query_in_log();
        $this->other_db->close();
        return $result;
    }

    public function get_ledger_group_list_by_group_name($lgpname)
    {
        $this->other_db->reconnect();
        $result  = $this->other_db->query("SELECT * FROM ACC_LEDGERS WHERE COMPANYCODE='".$_SESSION['COMPANYCODE']."' AND SUPER_ID='4' AND GROUP_NAME = '".$lgpname."'")->result_array();
        save_query_in_log();
        $this->other_db->close();
        return $result;
    }

    public function get_income_ledger_group_list_by_group_name($lgpname)
    {
        $this->other_db->reconnect();
        $result  = $this->other_db->query("SELECT * FROM ACC_LEDGERS WHERE COMPANYCODE='".$_SESSION['COMPANYCODE']."' AND SUPER_ID='3' AND GROUP_NAME = '".$lgpname."'")->result_array();
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

    public function get_expense_ledger_credit_debit($lgpname,$sdate,$edate)
    {
        $this->other_db->reconnect();
        $result  = $this->other_db->query("SELECT SUM(DEBIT) AS TOTALDEBITS, SUM(CREDIT) AS TOTALCREDITS FROM VOUCHER_MASTER, VOUCHER_DETAILS WHERE VOUCHER_MASTER.MASTER_SNO = VOUCHER_DETAILS.VOUCHER_MASTER_SNO AND LEDGER_SNO='".$lgpname."' AND TRANSDATE>= '".$sdate."' AND TRANSDATE<= '".$edate."'  AND COMPANYCODE='".$_SESSION['COMPANYCODE']."'")->row();
        save_query_in_log();
        $this->other_db->close();
        return $result;
    }

}
?>