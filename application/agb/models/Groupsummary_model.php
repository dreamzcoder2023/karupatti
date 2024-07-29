<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/************************************************************************
    Purpose : To handle all the Groupsummary database details 2022-10-19
************************************************************************/
class Groupsummary_model extends CI_Model
{
    public $other_db;
  function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Calcutta'); 
    }

    public function get_account_group($search)
    {
        $query = $this->other_db->query("SELECT *FROM ACC_GROUPS WHERE COMPANYCODE='".$_SESSION['COMPANYCODE']."' AND CHK_PRIMARY='N' AND GROUP_NAME LIKE '".$search."%' ORDER BY GROUP_NAME");
        $result = $query->result();
        return $result;
    }

    public function delete_ledger_closing_summary()
    {
        $this->other_db->reconnect();
        $result  = $this->other_db->query("DELETE FROM Acc_Ledger_Closing_Summary");
        save_query_in_log();
        $this->other_db->close();
        return $result;
    }

    public function get_ledger_list($vGroupCode)
    {
        $this->other_db->reconnect();
        $result  = $this->other_db->query("SELECT DISTINCT LEDGER_SNO FROM ACC_LEDGERS WHERE GROUP_ID='".$vGroupCode."' AND COMPANYCODE='".$_SESSION['COMPANYCODE']."'")->result_array();
        save_query_in_log();
        $this->other_db->close();
        return $result;
    }

    public function get_single_ledger_list($lsno)
    {
        $this->other_db->reconnect();
        $result  = $this->other_db->query("SELECT * FROM ACC_LEDGERS WHERE COMPANYCODE='".$_SESSION['COMPANYCODE']."' AND LEDGER_SNO = '".$lsno."'")->row();
        save_query_in_log();
        $this->other_db->close();
        return $result;
    }

    public function get_voucher_master_details($vLedgerID,$sdate,$edate)
    {
        $this->other_db->reconnect();
        $result  = $this->other_db->query("SELECT SUM(DEBIT) as Debit,SUM(CREDIT) as Credit FROM VOUCHER_MASTER, VOUCHER_DETAILS WHERE VOUCHER_MASTER.MASTER_SNO = VOUCHER_DETAILS.VOUCHER_MASTER_SNO AND LEDGER_SNO='".$vLedgerID."' AND TRANSDATE>= '".$sdate."' AND TRANSDATE<= '".$edate."'  AND COMPANYCODE='".$_SESSION['COMPANYCODE']."'")->row();
        save_query_in_log();
        $this->other_db->close();
        return $result;
    }

    public function get_selected_group_detail($gid)
    {
        $this->other_db->reconnect();
        $result  = $this->other_db->query("SELECT GROUP_NAME FROM ACC_GROUPS WHERE GROUP_SNO='".$gid."'")->row();
        save_query_in_log();
        $this->other_db->close();
        return $result;
    }

    public function get_selected_primary_group_detail($gid)
    {
        $this->other_db->reconnect();
        $result  = $this->other_db->query("SELECT UNDER_GROUP FROM ACC_GROUPS WHERE GROUP_NAME='".$gid."'")->row();
        save_query_in_log();
        $this->other_db->close();
        return $result;
    }

    public function insert_acc_ledger_closing_summary($sid,$lsno,$lname,$sg,$spg,$lbal,$lside)
    {
        $this->other_db->reconnect();
        $result  = $this->other_db->query("INSERT INTO ACC_LEDGER_CLOSING_SUMMARY(LGR_SUPER_ID,LGR_CLSG_ID,LGR_CLSG_NAME,LGR_CLSG_GRUP,LGR_CLSG_PGRP,LGR_CLSG_TBAL,LGR_CLSG_TSID) VALUES ('".$sid."','".$lsno."','".$lname."','".$sg."','".$spg."','".$lbal."','".$lside."')");
        save_query_in_log();
        $this->other_db->close();
        return $result;
    }

    public function get_account_ledger_closing_summary()
    {
        $this->other_db->reconnect();
        $result  = $this->other_db->query("SELECT * FROM Acc_Ledger_Closing_Summary order by lgr_clsg_name")->result_array();
        save_query_in_log();
        $this->other_db->close();
        return $result;
    }

}
?>