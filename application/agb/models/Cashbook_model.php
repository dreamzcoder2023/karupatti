<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/***************************************************************
    Purpose : To handle all the Cashbook database details 2022-08-19
****************************************************************/
class Cashbook_model extends CI_Model
{
    public $other_db;
  function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Calcutta'); 
    }
    public function get_cashbook_list($atype,$vtype)
    {
        $this->other_db->reconnect();
        $result  = $this->other_db->query("SELECT *FROM ACC_VOUCHERS WHERE 1=1 $atype $vtype ORDER BY ENDATE,ADDED_TIME,ROWNO")->result_array();
        save_query_in_log();
        $this->other_db->close();
        return $result;
    }

    public function delete_account_voucher()
    {
        $this->other_db->reconnect();
        $result  = $this->other_db->query("DELETE FROM ACC_VOUCHERS");
        save_query_in_log();
        $this->other_db->close();
        return $result;
    }

    public function get_loan_list($sdate,$edate)
    {
        $this->db->reconnect();
        $result  = $this->db->query("SELECT * FROM LOANS WHERE COMPANYCODE='".$_SESSION['COMPANYCODE']."' AND ENDATE>='".$sdate."' AND ENDATE<='".$edate."'")->result_array();
        save_query_in_log();
        $this->db->close();
        return $result;
    }

    public function get_loan_receipt_list($sdate,$edate)
    {
        $this->db->reconnect();
        $result  = $this->db->query("SELECT RECEIPT_MASTER.*,LOANS.COMPANYCODE FROM RECEIPT_MASTER, LOANS WHERE LOANS.COMPANYCODE='".$_SESSION['COMPANYCODE']."' AND RECEIPT_MASTER.BILLNO=LOANS.BILLNO AND RECEIPT_DATE>='".$sdate."' AND RECEIPT_DATE<='".$edate."'")->result_array();
        save_query_in_log();
        $this->db->close();
        return $result;
    }

    public function get_loan_redemption_list($sdate,$edate)
    {
        $this->db->reconnect();
        $result  = $this->db->query("SELECT REDEMPTIONS.*,LOANS.COMPANYCODE FROM REDEMPTIONS, LOANS WHERE LOANS.COMPANYCODE='".$_SESSION['COMPANYCODE']."' AND REDEMPTIONS.BILLNO=LOANS.BILLNO AND RETURNDATE>='".$sdate."' AND RETURNDATE<='".$edate."'")->result_array();
        save_query_in_log();
        $this->db->close();
        return $result;
    }

    public function get_repledge_list($sdate,$edate)
    {
        $this->db->reconnect();
        $result  = $this->db->query("SELECT *FROM REPLEDGE_MASTER WHERE CHK_VERIFIED='Y' AND COMPANYCODE='".$_SESSION['COMPANYCODE']."' AND ENDATE>='".$sdate."' AND ENDATE<='".$edate."'")->result_array();
        save_query_in_log();
        $this->db->close();
        return $result;
    }

    public function get_repledge_receipt_list($sdate,$edate)
    {
        $this->db->reconnect();
        $result  = $this->db->query("SELECT RP_RECEIPTS.*,REPLEDGE_MASTER.COMPANYCODE FROM RP_RECEIPTS,REPLEDGE_MASTER  WHERE RP_RECEIPTS.CHK_VERIFIED='Y' AND REPLEDGE_MASTER.COMPANYCODE='".$_SESSION['COMPANYCODE']."' AND RP_RECEIPTS.RP_SNO=REPLEDGE_MASTER.RP_SNO AND RECEIPT_DATE>='".$sdate."' AND RECEIPT_DATE<='".$edate."'")->result_array();
        save_query_in_log();
        $this->db->close();
        return $result;
    }

    public function get_repledge_return_list($sdate,$edate)
    {
        $this->db->reconnect();
        $result  = $this->db->query("SELECT REPLEDGE_RETURN.*,REPLEDGE_MASTER.COMPANYCODE FROM REPLEDGE_RETURN,REPLEDGE_MASTER WHERE REPLEDGE_RETURN.CHK_VERIFIED='Y' AND REPLEDGE_MASTER.COMPANYCODE='".$_SESSION['COMPANYCODE']."' AND REPLEDGE_RETURN.RP_SNO=REPLEDGE_MASTER.RP_SNO AND REPLEDGE_RETURN.RETURN_DATE>='".$sdate."' AND REPLEDGE_RETURN.RETURN_DATE<='".$edate."'")->result_array();
        save_query_in_log();
        $this->db->close();
        return $result;
    }

    public function get_jewel_purchase_list($sdate,$edate)
    {
        $this->db->reconnect();
        $result  = $this->db->query("SELECT *FROM JEWEL_PURCHASE WHERE COMPANYCODE='".$_SESSION['COMPANYCODE']."' AND ENDATE>='".$sdate."' AND ENDATE<='".$edate."'")->result_array();
        save_query_in_log();
        $this->db->close();
        return $result;
    }

    public function get_jewel_sales_list($sdate,$edate)
    {
        $this->db->reconnect();
        $result  = $this->db->query("SELECT JEWEL_SALES.*,JEWEL_PURCHASE.COMPANYCODE FROM JEWEL_SALES, JEWEL_PURCHASE WHERE JEWEL_PURCHASE.COMPANYCODE='".$_SESSION['COMPANYCODE']."' AND JEWEL_SALES.BILLNO=JEWEL_PURCHASE.BILLNO AND BILL_DATE>='".$sdate."' AND BILL_DATE<='".$edate."'")->result_array();
        save_query_in_log();
        $this->db->close();
        return $result;
    }

    public function get_other_account_voucher_list($sdate,$edate)
    {
        $this->other_db->reconnect();
        $result  = $this->other_db->query("SELECT *FROM VOUCHER_MASTER WHERE COMPANYCODE='".$_SESSION['COMPANYCODE']."' AND TRANSDATE>='".$sdate."' AND TRANSDATE<='".$sdate."' ORDER BY TRANSDATE,ADDED_TIME")->result_array();
        save_query_in_log();
        $this->other_db->close();
        return $result;
    }

    public function get_voucher_master_details_list($msno)
    {
        $this->other_db->reconnect();
        $result  = $this->other_db->query("SELECT *FROM VOUCHER_MASTER,VOUCHER_DETAILS,ACC_LEDGERS WHERE VOUCHER_MASTER.MASTER_SNO=VOUCHER_DETAILS.VOUCHER_MASTER_SNO AND VOUCHER_MASTER.COMPANYCODE=ACC_LEDGERS.COMPANYCODE AND VOUCHER_DETAILS.LEDGER_SNO=ACC_LEDGERS.LEDGER_SNO AND MASTER_SNO='".$msno."' AND GROUP_ID NOT IN ('7','8','22') ORDER BY ROWNO")->result_array();
        save_query_in_log();
        $this->other_db->close();
        return $result;
    }

    public function get_voucher_master_details_without_group_list($msno)
    {
        $this->other_db->reconnect();
        $result  = $this->other_db->query("SELECT *FROM VOUCHER_MASTER,VOUCHER_DETAILS,ACC_LEDGERS WHERE VOUCHER_MASTER.MASTER_SNO=VOUCHER_DETAILS.VOUCHER_MASTER_SNO AND VOUCHER_MASTER.COMPANYCODE=ACC_LEDGERS.COMPANYCODE AND VOUCHER_DETAILS.LEDGER_SNO=ACC_LEDGERS.LEDGER_SNO AND MASTER_SNO='".$msno."' ORDER BY ROWNO DESC")->result_array();
        save_query_in_log();
        $this->other_db->close();
        return $result;
    }

    public function get_voucher_master_details_with_group_list($msno)
    {
        $this->other_db->reconnect();
        $result  = $this->other_db->query("SELECT *FROM VOUCHER_MASTER,VOUCHER_DETAILS,ACC_LEDGERS WHERE VOUCHER_MASTER.MASTER_SNO=VOUCHER_DETAILS.VOUCHER_MASTER_SNO AND VOUCHER_MASTER.COMPANYCODE=ACC_LEDGERS.COMPANYCODE AND VOUCHER_DETAILS.LEDGER_SNO=ACC_LEDGERS.LEDGER_SNO AND MASTER_SNO='".$msno."' AND GROUP_ID NOT IN ('8') ORDER BY ROWNO")->result_array();
        save_query_in_log();
        $this->other_db->close();
        return $result;
    }

    public function get_party_name($bno)
    {
        $this->db->reconnect();
        $result  = $this->db->query("SELECT NAME FROM LOANS WHERE BILLNO='".$bno."'")->row();
        save_query_in_log();
        $this->db->close();
        return $result;
    }

    public function get_jewel_party_name($bno)
    {
        $this->db->reconnect();
        $result  = $this->db->query("SELECT NAME FROM JEWEL_PURCHASE WHERE BILLNO='".$bno."'")->row();
        save_query_in_log();
        $this->db->close();
        return $result;
    }

    public function insert_loan_account_voucher_credit($vsno,$sno,$edate,$vtype,$lname,$bno,$desc,$amt,$atime,$row)
    {
        $this->other_db->reconnect();
        $result  = $this->other_db->query("INSERT INTO ACC_VOUCHERS(VOUCHER_SNO,SNO,ENDATE,VOUCHER_TYPE,LEDGER_NAME,BILLNO,DESCRIPTION,AMOUNT,CREDIT,ADDED_TIME,ROWNO) VALUES('".$vsno."','".$sno."','".$edate."','".$vtype."','".$lname."','".$bno."','".$desc."','".$amt."','".$amt."','".$atime."','".$row."')");
        save_query_in_log();
        $this->other_db->close();
        return $result;
    }

    public function insert_loan_account_voucher_debit($vsno,$sno,$edate,$vtype,$lname,$bno,$desc,$amt,$atime,$row)
    {
        $this->other_db->reconnect();
        $result  = $this->other_db->query("INSERT INTO ACC_VOUCHERS(VOUCHER_SNO,SNO,ENDATE,VOUCHER_TYPE,LEDGER_NAME,BILLNO,DESCRIPTION,AMOUNT,DEBIT,ADDED_TIME,ROWNO) VALUES('".$vsno."','".$sno."','".$edate."','".$vtype."','".$lname."','".$bno."','".$desc."','".$amt."','".$amt."','".$atime."','".$row."')");
        save_query_in_log();
        $this->other_db->close();
        return $result;
    }

    public function insert_vm_account_voucher_credit($vsno,$edate,$vtype,$lname,$bno,$desc,$amt,$sid,$atime,$row)
    {
        $this->other_db->reconnect();
        $result  = $this->other_db->query("INSERT INTO ACC_VOUCHERS(SNO,ENDATE,VOUCHER_TYPE,LEDGER_NAME,BILLNO,DESCRIPTION,CREDIT,AC_SUPER_ID,ADDED_TIME,ROWNO) VALUES('".$vsno."','".$edate."','".$vtype."','".$lname."','".$bno."','".$desc."','".$amt."','".$sid."','".$atime."','".$row."')");
        save_query_in_log();
        $this->other_db->close();
        return $result;
    }

    public function insert_vm_account_voucher_debit($vsno,$edate,$vtype,$lname,$bno,$desc,$amt,$sid,$atime,$row)
    {
        $this->other_db->reconnect();
        $result  = $this->other_db->query("INSERT INTO ACC_VOUCHERS(SNO,ENDATE,VOUCHER_TYPE,LEDGER_NAME,BILLNO,DESCRIPTION,DEBIT,AC_SUPER_ID,ADDED_TIME,ROWNO) VALUES('".$vsno."','".$edate."','".$vtype."','".$lname."','".$bno."','".$desc."','".$amt."','".$sid."','".$atime."','".$row."')");
        save_query_in_log();
        $this->other_db->close();
        return $result;
    }

    public function get_account_group_details($gname)
    {
        $this->other_db->reconnect();
        $result  = $this->other_db->query("SELECT GROUP_SNO FROM ACC_GROUPS WHERE COMPANYCODE='".$_SESSION['COMPANYCODE']."' AND GROUP_NAME = '".$gname."'")->row();
        save_query_in_log();
        $this->other_db->close();
        return $result;
    }

    public function get_account_ledger_opening_balance()
    {
        $this->other_db->reconnect();
        $result  = $this->other_db->query("SELECT *FROM ACC_LEDGERS WHERE LEDGER_SNO='1' AND COMPANYCODE='".$_SESSION['COMPANYCODE']."'")->row();
        save_query_in_log();
        $this->other_db->close();
        return $result;
    }

    public function get_op_balance($sdate,$edate)
    {
        $this->other_db->reconnect();
        $result  = $this->other_db->query("SELECT SUM(DEBIT) AS TOTALDEBITS, SUM(CREDIT) AS TOTALCREDITS FROM VOUCHER_MASTER, VOUCHER_DETAILS WHERE VOUCHER_MASTER.MASTER_SNO = VOUCHER_DETAILS.VOUCHER_MASTER_SNO AND LEDGER_SNO='1' AND TRANSDATE>= '".$sdate."' AND TRANSDATE<= '".$edate."'  AND COMPANYCODE='".$_SESSION['COMPANYCODE']."'")->row();
        save_query_in_log();
        $this->other_db->close();
        return $result;
    }

}
?>