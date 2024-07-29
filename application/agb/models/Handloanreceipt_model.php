<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/***************************************************************
    Purpose : To handle all the Hand Loan Receipt database details 2022-08-19
****************************************************************/
class Handloanreceipt_model extends CI_Model
{
    public $other_db;
  function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Calcutta'); 
    }
    public function get_handloanreceipt_list($sdate,$edate,$sodr)
    {
        $this->db->reconnect();
        $result  = $this->db->query("SELECT * FROM HL_RECEIPTS WHERE COMPANYCODE='".$_SESSION['COMPANYCODE']."' $sdate $edate $sodr")->result_array();
        save_query_in_log();
        $this->other_db->close();
        return $result;
    }
    public function get_party_ledger_by_id($pid)
    {
        $this->other_db->reconnect();
        $result  = $this->other_db->query("SELECT LEDGER_NAME FROM ACC_LEDGERS WHERE COMPANYCODE= '".$_SESSION['COMPANYCODE']."' AND LEDGER_SNO='".$pid."'")->row();
        save_query_in_log();
        $this->other_db->close();
        return $result;
    }

    public function get_account_handloanreceipt_key_value($lprefix)
    {
        $kname = "ACC_RECEIPTS-".$lprefix;
        $query = $this->other_db->query("SELECT * FROM KEYMASTER WHERE KEYNAME='".$kname."'");
        $result = $query->row();
        return $result;
    }

    public function get_party_list($search)
    {
        $query = $this->db->query("SELECT * FROM PARTIES WHERE NAME LIKE '".$search."%' OR PHONE LIKE '".$search."%' ORDER BY NAME");
        $result = $query->result();
        return $result;
    }

    public function get_party_details_by_party_id($pid)
    {
        $query = $this->db->query("SELECT * FROM PARTIES WHERE PID = '".$pid."'");
        $result = $query->row();
        return $result;
    }

    public function get_loan_party_list($search)
    {
        $query = $this->db->query("SELECT * FROM LOANS WHERE BILLNO LIKE '".$search."%' ORDER BY BILLNO");
        $result = $query->result();
        return $result;
    }

    public function get_handloanreceipt_paid_ledger($search)
    {
        $query = $this->other_db->query("SELECT *FROM ACC_LEDGERS WHERE COMPANYCODE='".$_SESSION['COMPANYCODE']."' AND GROUP_ID IN('7','8','22') ORDER BY LEDGER_NAME");
        $result = $query->result();
        return $result;
    }

    public function get_paid_ledger_details($paledid)
    {
        $query = $this->other_db->query("SELECT *FROM ACC_LEDGERS WHERE COMPANYCODE='".$_SESSION['COMPANYCODE']."' AND LEDGER_SNO = '".$paledid."'");
        $result = $query->row();
        return $result;
    }

    public function get_hl_trans_key_value($lprefix)
    {
        $kname = "HL_TRANS-".$lprefix;
        $query = $this->db->query("SELECT * FROM KEYMASTER WHERE KEYNAME='".$kname."'");
        $result = $query->row();
        return $result;
    }

    public function hl_trans_add($data)
    {
        $this->db->reconnect();
        $result  = $this->db->query("INSERT INTO HL_TRANS(HL_TRANS_SNO,HL_DATE,HL_ENTRY_TYPE,HL_LOAN_TYPE,HL_PID,HL_BILLNO,HL_DEBIT,HL_CREDIT,HL_REMARKS,COMPANYCODE,ADDED_USER,ADDED_TIME) VALUES('".$data['HL_TRANS_NO']."', '".$data['add_date_hand_loan_receipts']."','5','".$data['type']."','".$data['party_id']."','".$data['loan_no']."','0','".$data['amount']."','".$data['description']."','".$_SESSION['COMPANYCODE']."','".$_SESSION['username']."','".date('Y-m-d H:i:s')."')");
        save_query_in_log();
        $this->db->close();
        return $result;
    }

    public function update_hl_trans_keymaster($vname)
    {
        $this->db->reconnect();
        $result  = $this->db->query("UPDATE KEYMASTER SET KEYVALUE=KEYVALUE+1 WHERE KEYNAME='".$vname."'");
        save_query_in_log();
        $this->db->close();
        return $result;
    }

    public function get_hl_pay_key_value($lprefix)
    {
        $kname = "HL_RECEIPTS-".$lprefix;
        $query = $this->db->query("SELECT * FROM KEYMASTER WHERE KEYNAME='".$kname."'");
        $result = $query->row();
        return $result;
    }

    public function get_voucher_master_key_value($lprefix)
    {
        $kname = "VOUCHER_MASTER-".$lprefix;
        $query = $this->other_db->query("SELECT * FROM KEYMASTER WHERE KEYNAME='".$kname."'");
        $result = $query->row();
        return $result;
    }

    public function hl_receipt_add($data)
    {
        $this->db->reconnect();
        $result  = $this->db->query("INSERT INTO HL_RECEIPTS(HL_SNO,ENDATE,HL_TYPE,BILLNO,PID,AMOUNT,PAID_BY,REMARKS,HL_TRANS_SNO,VOUCHER_SNO,COMPANYCODE,ADDED_USER,ADDED_TIME) VALUES('".$data['HL_SNO']."','".$data['add_date_hand_loan_receipts']."','".$data['type']."','".$data['loan_no']."','".$data['party_id']."','".$data['amount']."','".$data['paid_from']."','".$data['description']."','".$data['HL_TRANS_NO']."','".$data['VOUCHER_MASTER_SNO']."','".$_SESSION['COMPANYCODE']."','".$_SESSION['username']."','".date('Y-m-d H:i:s')."')");
        save_query_in_log();
        $this->db->close();
        return $result;
    }

    public function update_hl_receipt_keymaster($vname)
    {
        $this->db->reconnect();
        $result  = $this->db->query("UPDATE KEYMASTER SET KEYVALUE=KEYVALUE+1 WHERE KEYNAME='".$vname."'");
        save_query_in_log();
        $this->db->close();
        return $result;
    }

    public function get_party_account_ledger_by_company($pid)
    {
        $query = $this->other_db->query("SELECT * FROM ACC_LEDGERS WHERE LEDGER_SNO='".$pid."' AND COMPANYCODE = '".$_SESSION['COMPANYCODE']."'");
        $result = $query->row();
        return $result;
    }

    public function party_account_ledger_add($data)
    {
    	//echo "INSERT INTO ACC_LEDGERS(LEDGER_SNO,LEDGER_NAME,GROUP_NAME,GROUP_ID,SUPER_ID,OP_BALANCE,OP_SIDE,CHK_PREDEFINED,DESCRIPTION,COMPANYCODE,ADDRESS,CITY,PHONE,ADDED_USER,ADDED_TIME) VALUES('".$data['pid']."','".$data['pname']."','LOAN PARTY(S)','10','1','0','DR','N','','".$_SESSION['COMPANYCODE']."','".$data['address1']."','".$data['city']."','".$data['pno']."','Admin','".date('Y-m-d H:i:s')."')";exit;
        $this->other_db->reconnect();
        $result  = $this->other_db->query("INSERT INTO ACC_LEDGERS(LEDGER_SNO,LEDGER_NAME,GROUP_NAME,GROUP_ID,SUPER_ID,OP_BALANCE,OP_SIDE,CHK_PREDEFINED,DESCRIPTION,COMPANYCODE,ADDRESS,CITY,PHONE,ADDED_USER,ADDED_TIME) VALUES('".$data['party_id']."','".$data['pname']."','LOAN PARTY(S)','10','1','0','DR','N','','".$_SESSION['COMPANYCODE']."','".$data['address1']."','".$data['city']."','".$data['pno']."','Admin','".date('Y-m-d H:i:s')."')");
        save_query_in_log();
        $this->other_db->close();
        return $result;
    }

    public function voucher_master_add($data)
    {
        $this->other_db->reconnect();
        $result  = $this->other_db->query("INSERT INTO VOUCHER_MASTER(MASTER_SNO,DETAILS_SNO,TRANSDATE,AMOUNT,VOUCHER_TYPE,TRANSTYPE,DESCRIPTION,ADDED_USER,ADDED_TIME) VALUES('".$data['VOUCHER_MASTER_SNO']."','".$data['sno']."','".$data['add_date_hand_loan_receipts']."','".$data['amount']."','ON ACCOUNT','".$data['TRANSTYPE']."','".$data['description']."','".$_SESSION['username']."','".date('Y-m-d H:i:s')."')");
        save_query_in_log();
        $this->other_db->close();
        return $result;
    }

    public function update_keymaster($kname)
    {
        $this->other_db->reconnect();
        $result  = $this->other_db->query("UPDATE KEYMASTER SET KEYVALUE=KEYVALUE+1 WHERE KEYNAME='".$kname."'");
        save_query_in_log();
        $this->other_db->close();
        return $result;
    }

    public function update_voucher_master_keymaster($vname)
    {
        $this->other_db->reconnect();
        $result  = $this->other_db->query("UPDATE KEYMASTER SET KEYVALUE=KEYVALUE+1 WHERE KEYNAME='".$vname."'");
        save_query_in_log();
        $this->other_db->close();
        return $result;
    }

    public function voucher_debit_details_add($data)
    {
        $this->other_db->reconnect();
        $result  = $this->other_db->query("INSERT INTO VOUCHER_DETAILS (VOUCHER_MASTER_SNO,VOUCHER_SNO,ENDATE,ROWNO,LEDGER_SNO,DEBIT,CREDIT,VOUCHERTYPE,TRANSTYPE)VALUES ('".$data['VOUCHER_MASTER_SNO']."','".$data['sno']."','".$data['add_date_hand_loan_receipts']."','1','".$data['party_id']."','0.00','".$data['amount']."','ON ACCOUNT','".$data['TRANSTYPE']."')");
        save_query_in_log();
        $this->other_db->close();
        return $result;
    }

    public function voucher_credit_details_add($data)
    {
        $this->other_db->reconnect();
        $result  = $this->other_db->query("INSERT INTO VOUCHER_DETAILS (VOUCHER_MASTER_SNO,VOUCHER_SNO,ENDATE,ROWNO,LEDGER_SNO,DEBIT,CREDIT,VOUCHERTYPE,TRANSTYPE)VALUES ('".$data['VOUCHER_MASTER_SNO']."','".$data['sno']."','".$data['add_date_hand_loan_receipts']."','2','".$data['paid_from_id']."','".$data['amount']."','0.00','ON ACCOUNT','".$data['TRANSTYPE']."')");
        save_query_in_log();
        $this->other_db->close();
        return $result;
    }

    public function log_same_date_add($data)
    {
        $this->db->reconnect();
        $result  = $this->db->query("INSERT INTO LOGS (LOG_DATE,LOG_DETAILS,LOG_CODE,ADDED_USER)VALUES ('".$data['log_date']."','".$data['log_details']."','".$data['log_code']."','".$data['added_user']."')");
        save_query_in_log();
        $this->db->close();
        return $result;
    }

    public function log_different_date_add($data)
    {
        $this->db->reconnect();
        $result  = $this->db->query("INSERT INTO LOGS (LOG_DATE,LOG_DETAILS,LOG_CODE,ADDED_USER,LOG_TYPE)VALUES ('".$data['log_date']."','".$data['log_details']."','".$data['log_code']."','".$data['added_user']."','".$data['log_type']."')");
        save_query_in_log();
        $this->db->close();
        return $result;
    }

    public function get_hl_payment_details($hlsno)
    {
        $query = $this->db->query("SELECT * FROM HL_RECEIPTS WHERE HL_SNO='".$hlsno."'");
        $result = $query->row();
        return $result;
    }

    public function get_party_by_id($pid)
    {
        $query = $this->db->query("SELECT * FROM PARTIES WHERE PID='".$pid."'");
        $result = $query->row();
        return $result;
    }

    public function get_voucher_master_by_id($vmsno)
    {
        $query = $this->other_db->query("SELECT *FROM VOUCHER_MASTER WHERE MASTER_SNO='".$vmsno."'");
        $result = $query->row();
        return $result;
    }

    public function get_voucher_details($vmsno)
    {
        $query = $this->other_db->query("SELECT *FROM VOUCHER_DETAILS WHERE VOUCHER_MASTER_SNO='".$vmsno."'");
        $result = $query->result_array();
        return $result;
    }

    public function get_ledger_details_by_name($vmsno)
    {
        $query = $this->other_db->query("SELECT *FROM ACC_LEDGERS WHERE LEDGER_NAME='".$vmsno."' AND COMPANYCODE = '".$_SESSION['COMPANYCODE']."'");
        $result = $query->row();
        return $result;
    }

    public function hl_trans_update($data,$vHLTransNo)
    {
        $this->db->reconnect();
        $result  = $this->db->query("UPDATE HL_TRANS SET HL_DATE='".$data['add_date_hand_loan_receipts']."',HL_ENTRY_TYPE='5',HL_LOAN_TYPE='".$data['type']."',HL_PID='".$data['party_id']."',HL_BILLNO='".$data['loan_no']."',HL_DEBIT='0',HL_CREDIT='".$data['amount']."',HL_REMARKS='".$data['description']."' WHERE HL_TRANS_SNO='".$vHLTransNo."'");
        save_query_in_log();
        $this->db->close();
        return $result;
    }

    public function hl_payment_update($data,$vHLPaymentNo,$vHLTransNo)
    {
        $this->db->reconnect();
        $result  = $this->db->query("UPDATE HL_RECEIPTS SET ENDATE='".$data['add_date_hand_loan_receipts']."',HL_TYPE='".$data['type']."',BILLNO='".$data['loan_no']."',PID='".$data['party_id']."',AMOUNT='".$data['amount']."',PAID_BY='".$data['paid_from']."',REMARKS='".$data['description']."',HL_TRANS_SNO='".$vHLTransNo."' WHERE HL_SNO ='".$vHLPaymentNo."'");
        save_query_in_log();
        $this->db->close();
        return $result;
    }

    public function voucher_master_update($data,$voucher_master_sno)
    {
        $this->other_db->reconnect();
        $result  = $this->other_db->query("UPDATE VOUCHER_MASTER SET TRANSTYPE='".$data['TRANSTYPE']."',TRANSDATE='".$data['add_date_hand_loan_receipts']."',AMOUNT='".$data['amount']."',DESCRIPTION='".$data['description']."' WHERE MASTER_SNO='".$voucher_master_sno."'");
        save_query_in_log();
        $this->other_db->close();
        return $result;
    }

    public function delete_voucher_details($vmsno)
    {
        $this->other_db->reconnect();
        $result  = $this->other_db->query("DELETE FROM VOUCHER_DETAILS WHERE VOUCHER_MASTER_SNO = '".$vmsno."'");
        save_query_in_log();
        $this->other_db->close();
        return $result;
    }

    public function delete_voucher_master($vmsno)
    {
        $this->other_db->reconnect();
        $result  = $this->other_db->query("DELETE FROM VOUCHER_MASTER WHERE MASTER_SNO = '".$vmsno."'");
        save_query_in_log();
        $this->other_db->close();
        return $result;
    }

    public function delete_hl_payments($vmsno)
    {
        $this->db->reconnect();
        $result  = $this->db->query("DELETE FROM HL_RECEIPTS WHERE HL_SNO = '".$vmsno."'");
        save_query_in_log();
        $this->db->close();
        return $result;
    }

    public function delete_hl_trans($vmsno)
    {
        $this->db->reconnect();
        $result  = $this->db->query("DELETE FROM HL_TRANS WHERE HL_TRANS_SNO = '".$vmsno."'");
        save_query_in_log();
        $this->db->close();
        return $result;
    }

}
?>