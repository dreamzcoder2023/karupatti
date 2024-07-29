<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/***************************************************************
    Purpose : To handle all the Trialbalance database details 2022-08-19
****************************************************************/
class Trialbalance_model extends CI_Model
{
    public $other_db;
  function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Calcutta'); 
    }

    public function delete_ledger_closing_summary()
    {
        $this->other_db->reconnect();
        $result  = $this->other_db->query("DELETE FROM Acc_Ledger_Closing_Summary");
        save_query_in_log();
        $this->other_db->close();
        return $result;
    }

    public function get_ledger_list()
    {
        $this->other_db->reconnect();
        $result  = $this->other_db->query("SELECT DISTINCT LEDGER_SNO FROM ACC_LEDGERS WHERE COMPANYCODE='".$_SESSION['COMPANYCODE']."'")->result_array();
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

    public function get_main_group_grouped_trialbalance_list()
    {
        $this->other_db->reconnect();
        $result  = $this->other_db->query("SELECT DISTINCT LGR_CLSG_GRUP as lclgrp FROM ACC_LEDGER_CLOSING_SUMMARY where lgr_clsg_tbal> 0")->result_array();
        save_query_in_log();
        $this->other_db->close();
        return $result;
    }

    public function get_primary_group_grouped_trialbalance_list()
    {
        $this->other_db->reconnect();
        $result  = $this->other_db->query("SELECT DISTINCT LGR_CLSG_PGRP as lclgrp FROM ACC_LEDGER_CLOSING_SUMMARY where lgr_clsg_tbal> 0")->result_array();
        save_query_in_log();
        $this->other_db->close();
        return $result;
    }

    public function main_group_debit_grouped($lclgrp)
    {
        $this->other_db->reconnect();
        $result  = $this->other_db->query("SELECT SUM(LGR_CLSG_TBAL) AS drtotal FROM ACC_LEDGER_CLOSING_SUMMARY WHERE LGR_CLSG_TSID='dr' AND LGR_CLSG_GRUP='".$lclgrp."'")->row();
        save_query_in_log();
        $this->other_db->close();
        return $result;
    }

    public function main_group_credit_grouped($lclgrp)
    {
        $this->other_db->reconnect();
        $result  = $this->other_db->query("SELECT SUM(LGR_CLSG_TBAL) as crtotal FROM ACC_LEDGER_CLOSING_SUMMARY WHERE LGR_CLSG_TSID='cr' AND LGR_CLSG_GRUP='".$lclgrp."'")->row();
        save_query_in_log();
        $this->other_db->close();
        return $result;
    }

    public function primary_group_debit_grouped($lclgrp)
    {
        $this->other_db->reconnect();
        $result  = $this->other_db->query("SELECT SUM(LGR_CLSG_TBAL) AS drtotal FROM ACC_LEDGER_CLOSING_SUMMARY WHERE LGR_CLSG_TSID='dr' AND LGR_CLSG_PGRP='".$lclgrp."'")->row();
        save_query_in_log();
        $this->other_db->close();
        return $result;
    }

    public function primary_group_credit_grouped($lclgrp)
    {
        $this->other_db->reconnect();
        $result  = $this->other_db->query("SELECT SUM(LGR_CLSG_TBAL) AS crtotal FROM ACC_LEDGER_CLOSING_SUMMARY WHERE LGR_CLSG_TSID='cr' AND LGR_CLSG_PGRP='".$lclgrp."'")->row();
        save_query_in_log();
        $this->other_db->close();
        return $result;
    }

    public function account_ledger_debit_op_bal()
    {
        $this->other_db->reconnect();
        $result  = $this->other_db->query("SELECT SUM(OP_BALANCE) as debbal FROM ACC_LEDGERS WHERE COMPANYCODE='".$_SESSION['COMPANYCODE']."' AND OP_SIDE='dr'")->row();
        save_query_in_log();
        $this->other_db->close();
        return $result;
    }

    public function account_ledger_credit_op_bal()
    {
        $this->other_db->reconnect();
        $result  = $this->other_db->query("SELECT SUM(OP_BALANCE) as crebal FROM ACC_LEDGERS WHERE COMPANYCODE='".$_SESSION['COMPANYCODE']."' AND OP_SIDE='cr'")->row();
        save_query_in_log();
        $this->other_db->close();
        return $result;
    }

    public function get_main_group_trialbalance_list()
    {
        $this->other_db->reconnect();
        $result  = $this->other_db->query("SELECT DISTINCT LGR_CLSG_GRUP as lclgrp FROM ACC_LEDGER_CLOSING_SUMMARY where lgr_clsg_tbal> 0")->result_array();
        save_query_in_log();
        $this->other_db->close();
        return $result;
    }

    public function get_primary_group_trialbalance_list()
    {
        $this->other_db->reconnect();
        $result  = $this->other_db->query("SELECT DISTINCT LGR_CLSG_PGRP as lclgrp FROM ACC_LEDGER_CLOSING_SUMMARY where lgr_clsg_tbal> 0")->result_array();
        save_query_in_log();
        $this->other_db->close();
        return $result;
    }

    public function main_group_account_ledger_close_summary($lgrp)
    {
        $this->other_db->reconnect();
        $result  = $this->other_db->query("SELECT *FROM ACC_LEDGER_CLOSING_SUMMARY WHERE LGR_CLSG_GRUP='".$lgrp."' order by lgr_clsg_name")->result_array();
        save_query_in_log();
        $this->other_db->close();
        return $result;
    }

    public function primary_group_account_ledger_close_summary($lgrp)
    {
        $this->other_db->reconnect();
        $result  = $this->other_db->query("SELECT *FROM ACC_LEDGER_CLOSING_SUMMARY WHERE LGR_CLSG_PGRP='".$lgrp."' order by lgr_clsg_name")->result_array();
        save_query_in_log();
        $this->other_db->close();
        return $result;
    }

    public function ledger_wise_account_ledger_close_summary()
    {
        $this->other_db->reconnect();
        $result  = $this->other_db->query("SELECT *FROM ACC_LEDGER_CLOSING_SUMMARY where lgr_clsg_tbal> 0 order by lgr_clsg_name")->result_array();
        save_query_in_log();
        $this->other_db->close();
        return $result;
    }

}
?>