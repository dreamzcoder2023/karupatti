<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/***************************************************************
    Purpose : To handle all the Daybook database details 2022-08-19
****************************************************************/
class Daybook_model extends CI_Model
{
    public $other_db;
  function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Calcutta'); 
    }
    public function get_daybook_list($atype,$vtype)
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

    public function insert_loan_account_voucher($sno,$edate,$vtype,$lname,$bno,$desc,$amt,$atime,$row)
    {
        $this->other_db->reconnect();
        $result  = $this->other_db->query("INSERT INTO ACC_VOUCHERS(SNO,ENDATE,VOUCHER_TYPE,LEDGER_NAME,BILLNO,DESCRIPTION,AMOUNT,DEBIT,ADDED_TIME,ROWNO) VALUES('".$sno."','".$edate."','".$vtype."','".$lname."','".$bno."','".$desc."','".$amt."','".$amt."','".$atime."', '".$row."')");
        save_query_in_log();
        $this->other_db->close();
        return $result;
    }

    public function insert_loan_account_voucher_credit($sno,$edate,$vtype,$lname,$bno,$desc,$amt,$atime,$row)
    {
        $this->other_db->reconnect();
        $result  = $this->other_db->query("INSERT INTO ACC_VOUCHERS(SNO,ENDATE,VOUCHER_TYPE,LEDGER_NAME,BILLNO,DESCRIPTION,AMOUNT,CREDIT,ADDED_TIME,ROWNO) VALUES('".$sno."','".$edate."','".$vtype."','".$lname."','".$bno."','".$desc."','".$amt."','".$amt."','".$atime."', '".$row."')");
        save_query_in_log();
        $this->other_db->close();
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

    public function get_party_by_loan_bill_no($bno)
    {
        $this->db->reconnect();
        $result  = $this->db->query("SELECT * FROM LOANS WHERE BILLNO='".$bno."'")->row();
        save_query_in_log();
        $this->db->close();
        return $result;
    }

    public function get_redemption_list($sdate,$edate)
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

    public function get_voucher_master_list($sdate,$edate)
    {
        $this->other_db->reconnect();
        $result  = $this->other_db->query("SELECT *FROM VOUCHER_MASTER WHERE COMPANYCODE='".$_SESSION['COMPANYCODE']."' AND TRANSDATE>='".$sdate."' AND TRANSDATE<='".$edate."' ORDER BY TRANSDATE,ADDED_TIME")->result_array();
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

    public function insert_style2_account_voucher($mno,$tdate,$vtype,$lname,$rno,$desc,$deb,$cre,$sid,$atime,$row)
    {
        $this->other_db->reconnect();
        $result  = $this->other_db->query("INSERT INTO ACC_VOUCHERS(SNO,ENDATE,VOUCHER_TYPE,LEDGER_NAME,BILLNO,DESCRIPTION,DEBIT,CREDIT,AC_SUPER_ID,ADDED_TIME,ROWNO) VALUES('".$mno."','".$tdate."','".$vtype."','".$lname."','".$rno."','','".$deb."','".$cre."','".$sid."','".$atime."','".$row."')");
        save_query_in_log();
        $this->other_db->close();
        return $result;
    }

    public function get_voucher_master_details_bank($msno)
    {
        $this->other_db->reconnect();
        $result  = $this->other_db->query("SELECT *FROM VOUCHER_MASTER,VOUCHER_DETAILS,ACC_LEDGERS WHERE VOUCHER_MASTER.MASTER_SNO=VOUCHER_DETAILS.VOUCHER_MASTER_SNO AND VOUCHER_MASTER.COMPANYCODE=ACC_LEDGERS.COMPANYCODE AND VOUCHER_DETAILS.LEDGER_SNO=ACC_LEDGERS.LEDGER_SNO AND MASTER_SNO='".$msno."' ORDER BY ROWNO")->result_array();
        save_query_in_log();
        $this->other_db->close();
        return $result;
    }

    public function get_voucher_master_details_purchase($msno)
    {
        $this->other_db->reconnect();
        $result  = $this->other_db->query("SELECT *FROM VOUCHER_MASTER,VOUCHER_DETAILS,ACC_LEDGERS WHERE VOUCHER_MASTER.MASTER_SNO=VOUCHER_DETAILS.VOUCHER_MASTER_SNO AND VOUCHER_MASTER.COMPANYCODE=ACC_LEDGERS.COMPANYCODE AND VOUCHER_DETAILS.LEDGER_SNO=ACC_LEDGERS.LEDGER_SNO AND MASTER_SNO='".$msno."' AND GROUP_ID NOT IN ('8') ORDER BY ROWNO")->result_array();
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

}
?>