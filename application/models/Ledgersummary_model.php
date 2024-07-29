<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/************************************************************************
    Purpose : To handle all the Ledgersummary database details 2022-10-18
************************************************************************/
class Ledgersummary_model extends CI_Model
{
    public $other_db;
  function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Calcutta'); 
    }

    public function get_ledger_info($lid)
    {
        $this->other_db->reconnect();
        $result  = $this->other_db->query("SELECT al.GROUP_NAME,ag.UNDER_GROUP FROM ACC_LEDGERS al, ACC_GROUPS ag WHERE al.GROUP_NAME = ag.GROUP_NAME AND al.LEDGER_SNO = '".$lid."'")->row();
        save_query_in_log();
        $this->other_db->close();
        return $result;
    }

    public function delete_account_specific_ledger()
    {
        $this->other_db->reconnect();
        $result  = $this->other_db->query("DELETE FROM Acc_Specific_Ledger");
        save_query_in_log();
        $this->other_db->close();
        return $result;
    }

    public function get_account_ledger_by_ledger_sno($lid)
    {
        $this->other_db->reconnect();
        $result  = $this->other_db->query("SELECT *FROM ACC_LEDGERS WHERE LEDGER_SNO='".$lid."' AND COMPANYCODE='".$_SESSION['COMPANYCODE']."'")->row();
        save_query_in_log();
        $this->other_db->close();
        return $result;
    }

    public function insert_open_bal_account_specific_ledger($data)
    {
        $this->other_db->reconnect();
        $result  = $this->other_db->query("INSERT INTO Acc_Specific_Ledger(VoucherNo,Voucher_Slno,TransVoucher,VoucherType,TransType,TransDate,TransLedger,TransAmount,TransSide,CompanyCode) VALUES ('".$data['VoucherNo']."','".$data['Voucher_Slno']."','".$data['TransVoucher']."','".$data['vouchertype']."','".$data['Transtype']."','".$data['TransDate']."','".$data['TransLedger']."','".$data['TransAmount']."','".$data['TransSide']."','".$data['CompanyCode']."')");
        save_query_in_log();
        $this->other_db->close();
        return $result;
    }

    public function get_voucher_master_details_by_ledger_sno($lid,$sdate,$edate)
    {
        $this->other_db->reconnect();
        $result  = $this->other_db->query("SELECT VOUCHER_MASTER.*,VOUCHER_DETAILS.*,ACC_LEDGERS.LEDGER_NAME FROM VOUCHER_MASTER,VOUCHER_DETAILS,ACC_LEDGERS WHERE VOUCHER_MASTER.MASTER_SNO=VOUCHER_DETAILS.VOUCHER_MASTER_SNO AND VOUCHER_MASTER.COMPANYCODE=ACC_LEDGERS.COMPANYCODE AND VOUCHER_DETAILS.LEDGER_SNO=ACC_LEDGERS.LEDGER_SNO AND VOUCHER_DETAILS.LEDGER_SNO='".$lid."' AND TRANSDATE>= '".$sdate."' AND TRANSDATE<= '".$edate."'  AND VOUCHER_MASTER.COMPANYCODE='".$_SESSION['COMPANYCODE']."'")->result_array();
        save_query_in_log();
        $this->other_db->close();
        return $result;
    }

    public function insert_voucher_master_account_specific_ledger($data)
    {
        $this->other_db->reconnect();
        $result  = $this->other_db->query("INSERT INTO Acc_Specific_Ledger(VoucherNo,Voucher_Slno,TransVoucher,TransDate,TransTime,TransWeekday,TransLedger,TransAmount,TransSide,TransNarration,TransUser,VoucherType,TransType,CompanyCode,REF_NO) VALUES ('".$data['VoucherNo']."','".$data['Voucher_Slno']."','".$data['TransVoucher']."','".$data['TransDate']."','".$data['TransTime']."','".$data['TransWeekday']."','".$data['TransLedger']."','".$data['TransAmount']."','".$data['TransSide']."','".$data['TransNarration']."','".$data['TransUser']."','".$data['VoucherType']."','".$data['Transtype']."','".$data['CompanyCode']."','".$data['ref_no']."')");
        save_query_in_log();
        $this->other_db->close();
        return $result;
    }

    public function get_account_specific_ledger_list()
    {
        $this->other_db->reconnect();
        $result  = $this->other_db->query("SELECT *FROM ACC_SPECIFIC_LEDGER ORDER BY TRANSDATE,TRANSTIME,VOUCHERNO")->result_array();
        save_query_in_log();
        $this->other_db->close();
        return $result;
    }

    public function get_account_ledger_by_group_sno($lid)
    {
        $this->other_db->reconnect();
        $result  = $this->other_db->query("SELECT *FROM ACC_GROUPS WHERE GROUP_SNO='".$lid."'")->row();
        save_query_in_log();
        $this->other_db->close();
        return $result;
    }

    public function get_loan_detail_by_ref_no($lid)
    {
        $this->db->reconnect();
        $result  = $this->db->query("SELECT NAME FROM LOANS WHERE BILLNO='".$lid."'")->row();
        save_query_in_log();
        $this->db->close();
        return $result;
    }

    public function get_voucher_master_record($vno,$tledger,$ttype)
    {
        $this->other_db->reconnect();
        $result  = $this->other_db->query("SELECT *FROM VOUCHER_MASTER,VOUCHER_DETAILS,ACC_LEDGERS WHERE VOUCHER_MASTER.MASTER_SNO=VOUCHER_DETAILS.VOUCHER_MASTER_SNO AND VOUCHER_MASTER.COMPANYCODE=ACC_LEDGERS.COMPANYCODE AND VOUCHER_DETAILS.LEDGER_SNO=ACC_LEDGERS.LEDGER_SNO AND MASTER_SNO='".$vno."' AND LEDGER_NAME <> '".$tledger."' AND VOUCHER_MASTER.TRANSTYPE='".$ttype."' ORDER BY ROWNO")->result_array();
        save_query_in_log();
        $this->other_db->close();
        return $result;
    }

}
?>