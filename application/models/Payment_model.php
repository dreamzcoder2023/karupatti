<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/***************************************************************
    Purpose : To handle all the Payment database details 2022-08-19
****************************************************************/
class Payment_model extends CI_Model
{
    public $other_db;
  function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Calcutta'); 
    }
    public function get_payment_list($sdate,$edate,$sodr)
    {
        $this->other_db->reconnect();
        /*$result  = $this->other_db->query("SELECT * FROM VOUCHER_DETAILS WHERE VOUCHERTYPE = 'PAYMENT' AND DEBIT!='0.00' AND ROWNO=1 $sdate $edate $sodr")->result_array();*/
        $result  = $this->other_db->query("SELECT MASTER_SNO,TRANSDATE,AMOUNT,DESCRIPTION,COMPANYCODE,ADDED_USER,ADDED_TIME,VOUCHER_NO FROM VOUCHER_MASTER  WHERE COMPANYCODE='".$_SESSION['COMPANYCODE']."' $sdate $edate AND VOUCHER_TYPE='PAYMENT' $sodr")->result_array();
        save_query_in_log();
        $this->other_db->close();
        return $result;
    }
    public function get_ledger_details_by_voucher_master_no($vmno)
    {
        $this->other_db->reconnect();
        $result  = $this->other_db->query("SELECT LEDGER_NAME FROM VOUCHER_MASTER,VOUCHER_DETAILS,ACC_LEDGERS WHERE VOUCHER_MASTER.MASTER_SNO=VOUCHER_DETAILS.VOUCHER_MASTER_SNO AND VOUCHER_MASTER.COMPANYCODE=ACC_LEDGERS.COMPANYCODE AND VOUCHER_DETAILS.LEDGER_SNO=ACC_LEDGERS.LEDGER_SNO AND GROUP_ID NOT IN('7','8','22') AND VOUCHER_MASTER_SNO='".$vmno."' ORDER BY ROWNO")->result_array();
        save_query_in_log();
        $this->other_db->close();
        return $result;
    }
    public function get_paidby_ledger_details_by_voucher_master_no($vmno)
    {
        $this->other_db->reconnect();
        $result  = $this->other_db->query("SELECT LEDGER_NAME FROM VOUCHER_MASTER,VOUCHER_DETAILS,ACC_LEDGERS WHERE VOUCHER_MASTER.MASTER_SNO=VOUCHER_DETAILS.VOUCHER_MASTER_SNO AND VOUCHER_MASTER.COMPANYCODE=ACC_LEDGERS.COMPANYCODE AND VOUCHER_DETAILS.LEDGER_SNO=ACC_LEDGERS.LEDGER_SNO AND GROUP_ID IN('7','8','22') AND VOUCHER_MASTER_SNO='".$vmno."' ORDER BY ROWNO")->result_array();
        save_query_in_log();
        $this->other_db->close();
        return $result;
    }

    public function get_payment_ledger($search,$showparty)
    {
        //echo "SELECT LEDGER_NAME,LEDGER_SNO FROM ACC_LEDGERS WHERE COMPANYCODE='".$_SESSION['COMPANYCODE']."' AND GROUP_ID NOT IN('7','8','10','22') AND LEDGER_NAME LIKE '".$search."%' ORDER BY LEDGER_NAME";exit;
        /*if($showparty==1)
            $query = $this->other_db->query("SELECT LEDGER_NAME,LEDGER_SNO,cast(OP_BALANCE as varchar) as OP_BALANCE,OP_SIDE FROM ACC_LEDGERS WHERE COMPANYCODE='".$_SESSION['COMPANYCODE']."' AND GROUP_ID NOT IN('7','8','22') AND LEDGER_NAME LIKE '".$search."%' ORDER BY LEDGER_NAME");
        else
            $query = $this->other_db->query("SELECT LEDGER_NAME,LEDGER_SNO,cast(OP_BALANCE as varchar) as OP_BALANCE,OP_SIDE FROM ACC_LEDGERS WHERE COMPANYCODE='".$_SESSION['COMPANYCODE']."' AND GROUP_ID NOT IN('7','8','10','22') AND LEDGER_NAME LIKE '".$search."%' ORDER BY LEDGER_NAME");*/
        $query = $this->other_db->query("SELECT LEDGER_NAME,LEDGER_SNO,cast(OP_BALANCE as varchar) as OP_BALANCE,OP_SIDE FROM ACC_LEDGERS WHERE COMPANYCODE='".$_SESSION['COMPANYCODE']."' AND GROUP_ID NOT IN('7','8','22') AND LEDGER_NAME LIKE '".$search."%' ORDER BY LEDGER_NAME");
        $result = $query->result();
        return $result;
    }

    public function get_payment_paid_ledger($search)
    {
        $query = $this->other_db->query("SELECT * FROM ACC_LEDGERS WHERE COMPANYCODE='".$_SESSION['COMPANYCODE']."' AND GROUP_ID IN('7','8','22') ORDER BY LEDGER_NAME");
        $result = $query->result();
        return $result;
    }

    public function get_payment_key_value($lprefix)
    {
        $kname = "VOUCHER_MASTER-".$lprefix;
        $query = $this->other_db->query("SELECT * FROM KEYMASTER WHERE KEYNAME='".$kname."'");
        $result = $query->row();
        return $result;
    }

    public function get_account_payment_key_value($lprefix)
    {
        $kname = "ACC_PAYMENTS-".$lprefix;
        $query = $this->other_db->query("SELECT * FROM KEYMASTER WHERE KEYNAME='".$kname."'");
        $result = $query->row();
        return $result;
    }

    public function get_paid_ledger_details($paledid)
    {
        $query = $this->other_db->query("SELECT *FROM ACC_LEDGERS WHERE COMPANYCODE='".$_SESSION['COMPANYCODE']."' AND LEDGER_SNO = '".$paledid."'");
        $result = $query->row();
        return $result;
    }

    public function voucher_debit_details_add($data)
    {
        $this->other_db->reconnect();
        //echo "INSERT INTO VOUCHER_DETAILS (VOUCHER_SNO,VOUCHER_MASTER_SNO,ENDATE,ROWNO,LEDGER_SNO,DEBIT,CREDIT,VOUCHERTYPE,TRANSTYPE)VALUES ('".$data['VOUCHER_SNO']."','".$data['VOUCHER_MASTER_SNO']."','".$data['ENDATE']."','".$data['ROWNO']."','".$data['LEDGER_SNO']."','".$data['DEBIT']."','0.00','".$data['VOUCHERTYPE']."','".$data['TRANSTYPE']."')";exit;
        $result  = $this->other_db->query("INSERT INTO VOUCHER_DETAILS (VOUCHER_SNO,VOUCHER_MASTER_SNO,ENDATE,ROWNO,LEDGER_SNO,DEBIT,CREDIT,VOUCHERTYPE,TRANSTYPE)VALUES ('".$data['VOUCHER_SNO']."','".$data['VOUCHER_MASTER_SNO']."','".$data['ENDATE']."','".$data['ROWNO']."','".$data['LEDGER_SNO']."','".$data['DEBIT']."','0.00','".$data['VOUCHERTYPE']."','".$data['TRANSTYPE']."')");
        save_query_in_log();
        $this->other_db->close();
        return $result;
    }

    public function voucher_credit_details_add($data)
    {
        $this->other_db->reconnect();
        $result  = $this->other_db->query("INSERT INTO VOUCHER_DETAILS (VOUCHER_SNO,VOUCHER_MASTER_SNO,ENDATE,ROWNO,LEDGER_SNO,DEBIT,CREDIT,VOUCHERTYPE,TRANSTYPE)VALUES ('".$data['VOUCHER_SNO']."','".$data['VOUCHER_MASTER_SNO']."','".$data['ENDATE']."','".$data['ROWNO']."','".$data['paid_account_led_id']."','0.00','".$data['add_tota_payments']."','".$data['VOUCHERTYPE']."','".$data['TRANSTYPE']."')");
        save_query_in_log();
        $this->other_db->close();
        return $result;
    }

    public function voucher_master_add($data)
    {
        $this->other_db->reconnect();
        $result  = $this->other_db->query("INSERT INTO VOUCHER_MASTER (MASTER_SNO,DETAILS_SNO,VOUCHER_TYPE,TRANSDATE,AMOUNT,DESCRIPTION,COMPANYCODE,ADDED_USER,ADDED_TIME,TRANSTYPE)VALUES ('".$data['VOUCHER_MASTER_SNO']."','".$data['VOUCHER_SNO']."','".$data['VOUCHERTYPE']."','".$data['ENDATE']."','".$data['add_tota_payments']."','".$data['description']."','".$_SESSION['COMPANYCODE']."','".$_SESSION['username']."','".date('Y-m-d H:i:s')."','".$data['TRANSTYPE']."')");
        save_query_in_log();
        $this->other_db->close();
        return $result;
    }

    public function update_keymaster($kname,$ukval)
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

    public function get_voucher_master_details($paledid)
    {
        $query = $this->other_db->query("SELECT * FROM VOUCHER_MASTER WHERE MASTER_SNO = '".$paledid."'");
        $result = $query->row();
        return $result;
    }

    public function get_voucher_details($paledid)
    {
        $query = $this->other_db->query("SELECT vd.*,al.LEDGER_NAME FROM VOUCHER_DETAILS vd,ACC_LEDGERS al WHERE vd.LEDGER_SNO = al.LEDGER_SNO AND vd.VOUCHER_MASTER_SNO = '".$paledid."' AND al.COMPANYCODE='".$_SESSION['COMPANYCODE']."'");
        $result = $query->result_array();
        return $result;
    }

    public function voucher_master_update($data)
    {
        $this->other_db->reconnect();
        $result  = $this->other_db->query("UPDATE VOUCHER_MASTER SET VOUCHER_TYPE = '".$data['VOUCHERTYPE']."',TRANSDATE = '".$data['ENDATE']."',AMOUNT = '".$data['add_tota_payments']."',DESCRIPTION = '".$data['description']."',COMPANYCODE = '".$_SESSION['COMPANYCODE']."',ADDED_USER = '".$_SESSION['username']."',MODIFIED_TIME = '".date('Y-m-d H:i:s')."',TRANSTYPE = '".$data['TRANSTYPE']."' WHERE MASTER_SNO = '".$data['VOUCHER_MASTER_SNO']."'");
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

}
?>