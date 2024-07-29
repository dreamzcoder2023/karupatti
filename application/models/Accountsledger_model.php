<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/***************************************************************
    Purpose : To handle all the Village database details 2022-08-19
****************************************************************/
class Accountsledger_model extends CI_Model
{
    public $other_db;
  function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Calcutta'); 
    }
    public function get_dd_acc_group_list()
    {
        $this->other_db->reconnect();

        $result  = $this->other_db->query("SELECT * FROM ACC_GROUPS WHERE COMPANYCODE='".$_SESSION['COMPANYCODE']."' AND CHK_PRIMARY='Y' ORDER BY GROUP_NAME")->result_array();
        save_query_in_log();
        $this->other_db->close();
        return $result;
    }

    public function get_acc_main_grp_list($gid)
    {

         $this->other_db->reconnect();
         if($gid=='ALL')
         {
            $result  = $this->other_db->query("SELECT * FROM ACC_GROUPS WHERE COMPANYCODE='".$_SESSION['COMPANYCODE']. "' AND CHK_PREDEFINED='Y' AND CHK_PRIMARY='N' ORDER BY GROUP_NAME")->result_array();
        }
        else
        {   
            $result  = $this->other_db->query("SELECT * FROM ACC_GROUPS WHERE COMPANYCODE='".$_SESSION['COMPANYCODE']. "' AND CHK_PREDEFINED='Y' AND CHK_PRIMARY='N' AND AC_SUPER_ID=".$gid." ORDER BY GROUP_NAME")->result_array();
        }
        save_query_in_log();
        $this->other_db->close();
        return $result;
    }

    public function get_acc_sub_grp_name($data)
    {
        $this->other_db->reconnect();
        $result  = $this->other_db->query("SELECT GROUP_NAME FROM ACC_GROUPS WHERE GROUP_SNO='".$data. "' ")->row();
        save_query_in_log();
        $this->other_db->close();
        // print_r($result);
        // echo $result->GROUP_NAME;
        // exit();
        return $result->GROUP_NAME;
    }
    public function get_acc_sub_grp_list($gid)
    {

         $this->other_db->reconnect();
         if($gid=='ALL')
         {
            $result  = $this->other_db->query("SELECT * FROM ACC_GROUPS WHERE COMPANYCODE='".$_SESSION['COMPANYCODE']. "' AND CHK_PREDEFINED='N' AND CHK_PRIMARY='N' ORDER BY GROUP_NAME")->result_array();
        }
        else
        {   
            $result  = $this->other_db->query("SELECT * FROM ACC_GROUPS WHERE COMPANYCODE='".$_SESSION['COMPANYCODE']. "' AND CHK_PREDEFINED='N' AND CHK_PRIMARY='N' AND AC_GROUP_ID='".$gid."' ORDER BY GROUP_NAME")->result_array();
        }
        save_query_in_log();
        $this->other_db->close();
        // print_r($result);
        // echo $result->num_rows();
        return $result;
        
    }
    public function get_acc_ledgers_list($cond)
    {
        $this->other_db->reconnect();
        $result  = $this->other_db->query("SELECT *FROM ACC_LEDGERS WHERE COMPANYCODE='".$_SESSION['COMPANYCODE']. "' ".$cond)->result_array();
        save_query_in_log();
        $this->other_db->close();
        // print_r($result);
        return $result;
    }   
    public function get_under_grp_details($grp_name)
    {
        $this->db->reconnect();
        $result  = $this->other_db->query("SELECT UNDER_GROUP,GROUP_SNO,AC_SUPER_ID,GROUP_LEVEL+1 AS GROUP_LEVEL,GROUP_SIDE,GETADDRESS FROM ACC_GROUPS WHERE COMPANYCODE='".$_SESSION['COMPANYCODE']."' and GROUP_SNO='".$grp_name."'")->row();
        save_query_in_log();
        $this->db->close();
        return $result;
    }
    public function get_under_grp_details_edit($grp_name)
    {
        $this->db->reconnect();
        $result  = $this->other_db->query("SELECT UNDER_GROUP,GROUP_SNO,AC_SUPER_ID,GROUP_LEVEL+1 AS GROUP_LEVEL,GROUP_SIDE,GETADDRESS FROM ACC_GROUPS WHERE COMPANYCODE='".$_SESSION['COMPANYCODE']."' and GROUP_SNO='".$grp_name."'")->row();
        save_query_in_log();
        $this->db->close();
        return $result;
    }
    public function get_under_grp_list()
    {
        $this->other_db->reconnect();
        $result  = $this->other_db->query("SELECT * FROM ACC_GROUPS WHERE COMPANYCODE='".$_SESSION['COMPANYCODE']."' AND CHK_PRIMARY='N' AND CHK_VISIBLE='Y' ORDER BY GROUP_NAME")->result_array();
        save_query_in_log();
        $this->other_db->close();
        return $result;
    }
    public function acc_ledger_unique($val)
    {   
        $this->other_db->reconnect();
        $result  = $this->other_db->query("SELECT * FROM ACC_LEDGERS WHERE LEDGER_NAME = '".$val."' AND COMPANYCODE='".$_SESSION['COMPANYCODE']."'")->row();
        save_query_in_log();
        $this->other_db->close();
        return $result;
    }
    public function acc_ledger_unique_edit($val)
    {   
        $this->other_db->reconnect();
        $result  = $this->other_db->query("SELECT * FROM ACC_LEDGERS WHERE LEDGER_NAME = '".$val."' AND COMPANYCODE='".$_SESSION['COMPANYCODE']."'")->row();
        save_query_in_log();
        $this->other_db->close();
        return $result;
    }
    public function get_count_value()
    {
        $this->other_db->reconnect();

        $result  = $this->other_db->query("SELECT KEYVALUE+1 as KEYVALUE FROM KEYMASTER WHERE KEYNAME ='ACC_LEDGERS-'+'".$_SESSION['LOANPREFIX']."'")->row();
        save_query_in_log();
        $this->other_db->close();
        return $result->KEYVALUE;   
    }
    public function acc_ledger_save($data)
    {
        $this->db->reconnect();
        if($data['get_addr']=='Y')
        {
            $result  = $this->other_db->query("INSERT INTO ACC_LEDGERS (LEDGER_SNO, LEDGER_NAME, GROUP_NAME, GROUP_ID, SUPER_ID, OP_BALANCE, OP_SIDE, CHK_PREDEFINED, DESCRIPTION, ADDRESS, CITY, STATE, PHONE, EMAIL, PAN_NO, GST_NO, COMPANYCODE, ADDED_USER, ADDED_TIME)VALUES ('".$data['ledger_sno']."','".$data['ledger_name']."','".$data['under_grp_name']."','".$data['ledger_id']."','".$data['super_id'] ."',".$data['opg_bal'] .",'".$data['bal_side']."','".$data['pre_defined']."','".$data['remarks']."','".$data['address']."','".$data['city']."','".$data['state']."','".$data['phone']."','".$data['email']."','".$data['pan_no']."','".$data['gst']."','".$_SESSION['COMPANYCODE']."','".$_SESSION['username']."','".date('Y-m-d H:i:s')."')");
        }
        else
        {
            $result  = $this->other_db->query("INSERT INTO ACC_LEDGERS (LEDGER_SNO, LEDGER_NAME, GROUP_NAME, GROUP_ID, SUPER_ID, OP_BALANCE, OP_SIDE, CHK_PREDEFINED, DESCRIPTION, COMPANYCODE, ADDED_USER, ADDED_TIME)VALUES ('".$data['ledger_sno']."','".$data['ledger_name']."','".$data['under_grp_name']."','".$data['ledger_id']."','".$data['super_id'] ."',".$data['opg_bal'] .",'".$data['bal_side']."','".$data['pre_defined']."','".$data['remarks']."','".$_SESSION['COMPANYCODE']."','".$_SESSION['username']."','".date('Y-m-d H:i:s')."')");
        }
        save_query_in_log();
        $log_update=$this->other_db->query("UPDATE KEYMASTER SET KEYVALUE=KEYVALUE+1 WHERE KEYNAME='ACC_LEDGERS-'+'" .$_SESSION['LOANPREFIX']. "'");
        save_query_in_log();
        $log_update1=$this->db->query("UPDATE KEYMASTER SET KEYVALUE=KEYVALUE+1 WHERE KEYNAME='ACC_LEDGERS-'+'" .$_SESSION['LOANPREFIX']. "'");
        save_query_in_log();
        
        $this->db->close();
        return $result;
    }
    public function acc_ledger_update($data)
    {
        $this->db->reconnect();
        if($data['get_addr']=='Y')
        {
             
            $result  = $this->other_db->query("UPDATE ACC_LEDGERS SET LEDGER_NAME='".$data['ledger_name']."',GROUP_NAME='".$data['under_grp_name']."',GROUP_ID='".$data['ledger_id']."',SUPER_ID='".$data['super_id']."',OP_BALANCE='".$data['opg_bal']."',OP_SIDE='".$data['bal_side']."', CHK_PREDEFINED='".$data['pre_defined']."',DESCRIPTION='".$data['remarks']."',ADDRESS='".$data['address']."',CITY='".$data['city']."', STATE='".$data['state']."', PHONE='".$data['phone']."',EMAIL='".$data['email']."',PAN_NO='".$data['pan_no']."', GST_NO='".$data['gst']."' WHERE COMPANYCODE='".$_SESSION['COMPANYCODE']."' AND LEDGER_SNO='".$data['ledger_sno']."' ");
        }
        else
        {
           
            $result  = $this->other_db->query("UPDATE ACC_LEDGERS SET LEDGER_NAME='".$data['ledger_name']."',GROUP_NAME='".$data['under_grp_name']."',GROUP_ID='".$data['ledger_id']."',SUPER_ID='".$data['super_id']."',OP_BALANCE='".$data['opg_bal']."',OP_SIDE='".$data['bal_side']."', CHK_PREDEFINED='".$data['pre_defined']."',DESCRIPTION='".$data['remarks']."' WHERE COMPANYCODE='".$_SESSION['COMPANYCODE']."' AND LEDGER_SNO='".$data['ledger_sno']."' ");
        }
        save_query_in_log();

        $this->db->close();
        return $result;
    }
    public function get_acc_by_acc_id($id)
    {
        $this->other_db->reconnect();
        $result  = $this->other_db->query("SELECT * FROM ACC_LEDGERS WHERE LEDGER_SNO = '".$id."' AND COMPANYCODE='".$_SESSION['COMPANYCODE']."'")->row();
        save_query_in_log();
        $this->other_db->close();
        return $result;
    }
    public function get_lbl_text_edit($grp_name)
    {
        $this->db->reconnect();
        $result  = $this->other_db->query("SELECT UNDER_GROUP,GROUP_SNO,AC_SUPER_ID,GROUP_LEVEL+1 AS GROUP_LEVEL,GROUP_SIDE,GETADDRESS FROM ACC_GROUPS WHERE COMPANYCODE='".$_SESSION['COMPANYCODE']."' and GROUP_NAME='".$grp_name."'")->row();
        save_query_in_log();
        $this->db->close();
        return $result;
    }
    public function get_sel_del_data($id)
    {
        $result= $this->other_db->query("SELECT * FROM ACC_LEDGERS WHERE COMPANYCODE='".$_SESSION['COMPANYCODE']."' AND LEDGER_SNO='".$id."' ")->row();
        return $result;
    }
    public function acc_ledger_delete($id)
    {
        $result=$this->other_db->query("SELECT COUNT(GROUP_ID) AS SUBGROUPCOUNT  FROM ACC_LEDGERS   WHERE COMPANYCODE='".$_SESSION['COMPANYCODE']."' AND GROUP_ID='".$id."' ")->row();
        $sub_count=$result->SUBGROUPCOUNT;
        $result1= $this->other_db->query("SELECT COUNT(SUPER_ID) AS LEDGERCOUNT  FROM ACC_LEDGERS   WHERE COMPANYCODE='".$_SESSION['COMPANYCODE']."' AND SUPER_ID='".$id."'")->row();
        $ledger_count=$result1->LEDGERCOUNT;
        if($sub_count > 0 || $ledger_count > 0)
        {
            return $sub_count."||".$ledger_count;
        }
        else
        {
            $res=$this->other_db->query("DELETE FROM ACC_LEDGERS WHERE COMPANYCODE='".$_SESSION['COMPANYCODE']."' AND LEDGER_SNO='".$id."' ");
            // print_r($res); exit();
            return $res;
        }
    }
}
?>                        
