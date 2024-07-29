<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/***************************************************************
    Purpose : To handle all the Village database details 2022-08-19
****************************************************************/
class Accountsgroup_model extends CI_Model
{
    public $other_db;
  function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Calcutta'); 
    }
    public function get_acc_group_list($sts)
    {
        $this->other_db->reconnect();

        $result  = $this->other_db->query("SELECT * FROM ACC_GROUPS WHERE COMPANYCODE='".$_SESSION['COMPANYCODE']."' AND CHK_PRIMARY='N' ".$sts." ORDER BY CHK_PREDEFINED DESC, GROUP_NAME")->result_array();

        save_query_in_log();
        $this->other_db->close();
        return $result;
    }
    public function get_count_value()
    {
        $this->other_db->reconnect();

        $result  = $this->other_db->query("SELECT KEYVALUE+1 as KEYVALUE FROM KEYMASTER WHERE KEYNAME ='ACC_GROUPS-'+'".$_SESSION['LOANPREFIX']."'")->row();
        save_query_in_log();
        $this->other_db->close();
        return $result->KEYVALUE;   
    }
    //SELECT * FROM ACC_GROUPS WHERE COMPANYCODE='".$_SESSION['COMPANYCODE']."' AND CHK_PRIMARY='Y' ORDER BY GROUP_NAME
    public function get_dd_acc_group_list()
    {
        $this->other_db->reconnect();

        $result  = $this->other_db->query("SELECT * FROM ACC_GROUPS WHERE COMPANYCODE='".$_SESSION['COMPANYCODE']."' AND CHK_PRIMARY='Y' ORDER BY GROUP_NAME")->result_array();
        save_query_in_log();
        $this->other_db->close();
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
    public function get_under_grp_list_edit()
    {
        $this->other_db->reconnect();
        $result  = $this->other_db->query("SELECT * FROM ACC_GROUPS WHERE COMPANYCODE='".$_SESSION['COMPANYCODE']."' ORDER BY GROUP_NAME")->result_array();
        save_query_in_log();
        $this->other_db->close();
        return $result;
    }
    public function get_fin_years_list()
    {
        $this->db->reconnect();
        $result  = $this->db->query("SELECT TOP 1 * FROM FIN_YEARS  WHERE STATUS='Y' ORDER BY ID DESC")->row();
        save_query_in_log();
        $this->db->close();
        return $result;
    }
    public function get_under_grp_details($grp_name)
    {
        $this->db->reconnect();
        $result  = $this->other_db->query("SELECT UNDER_GROUP,GROUP_SNO,AC_SUPER_ID,GROUP_LEVEL+1 AS GROUP_LEVEL,GROUP_SIDE,GETADDRESS FROM ACC_GROUPS WHERE COMPANYCODE='".$_SESSION['COMPANYCODE']."' and GROUP_NAME='".$grp_name."'")->row();
        save_query_in_log();
        $this->db->close();
        return $result;
    }
    public function get_under_grp_details_edit($grp_name)
    {
        $this->db->reconnect();
        $result  = $this->other_db->query("SELECT UNDER_GROUP,GROUP_SNO,AC_SUPER_ID,GROUP_LEVEL+1 AS GROUP_LEVEL,GROUP_SIDE,GETADDRESS FROM ACC_GROUPS WHERE COMPANYCODE='".$_SESSION['COMPANYCODE']."' and GROUP_NAME='".$grp_name."'")->row();
        save_query_in_log();
        $this->db->close();
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

    public function acc_group_save($data)
    {
        $this->db->reconnect();
        $result  = $this->other_db->query("INSERT INTO ACC_GROUPS (GROUP_SNO, GROUP_NAME, AC_GROUP_ID, AC_SUPER_ID, UNDER_GROUP, GROUP_LEVEL, GROUP_SIDE, GETADDRESS, CHK_VISIBLE, CHK_PRIMARY, CHK_PREDEFINED,DESCRIPTION, COMPANYCODE, ADDED_USER, ADDED_TIME)VALUES ('".$data['grp_sno']."','".$data['grp_name']."','".$data['group_id']."','".$data['super_id']."','".$data['under_grp'] ."','".$data['grp_level'] ."','".$data['grp_side']."','".$data['get_addr']."','".$data['visible']."','".$data['primary']."','".$data['pre_defined'] ."','".$data['description'] ."','".$_SESSION['COMPANYCODE']."','".$_SESSION['username']."','".date('Y-m-d H:i:s')."')");
        save_query_in_log();
        $log_update=$this->other_db->query("UPDATE KEYMASTER SET KEYVALUE=KEYVALUE+1 WHERE KEYNAME='ACC_GROUPS-'+'" .$_SESSION['LOANPREFIX']. "'");
        $log_update1=$this->db->query("UPDATE KEYMASTER SET KEYVALUE=KEYVALUE+1 WHERE KEYNAME='ACC_GROUPS-'+'" .$_SESSION['LOANPREFIX']. "'");
        save_query_in_log();
        $this->db->close();
        return $result;
    }
    
    public function acc_grp_unique($val)
    {   
        $this->other_db->reconnect();
        $result  = $this->other_db->query("SELECT * FROM ACC_GROUPS WHERE GROUP_NAME = '".$val."' AND COMPANYCODE='".$_SESSION['COMPANYCODE']."'")->row();
        save_query_in_log();
        $this->other_db->close();
        return $result;
    }

    public function acc_grp_update($data)
    {
        
        $this->db->reconnect();
        $result  = $this->other_db->query("UPDATE ACC_GROUPS SET GROUP_NAME='".$data['grp_name']."',AC_GROUP_ID='".$data['group_id']."',AC_SUPER_ID='".$data['super_id']."',UNDER_GROUP='".$data['under_grp']."',GROUP_LEVEL='".$data['grp_level']."',GROUP_SIDE='".$data['grp_side']."',GETADDRESS='".$data['get_addr']."',DESCRIPTION='".$data['description']."' WHERE  COMPANYCODE='".$_SESSION['COMPANYCODE']."' AND GROUP_SNO='".$data['grp_sno']."'");
        save_query_in_log();
        $result1  = $this->other_db->query("UPDATE ACC_LEDGERS SET GROUP_NAME='".$data['grp_name']."' WHERE COMPANYCODE='".$_SESSION['COMPANYCODE']."'  AND GROUP_ID='".$data['grp_sno']."' ");
        save_query_in_log();
        $result2  = $this->db->query("INSERT INTO LOGS (LOG_DATE,LOG_DETAILS, ADDED_USER) VALUES('".date('Y-m-d H:i:s')."','Account Group : ".$data['grp_name']." Modified','".$_SESSION['USERNAME']."' )");
        save_query_in_log();

        $this->db->close();
        return $result;
    }
    public function get_acc_by_acc_id($id)
    {
        $this->other_db->reconnect();
        $result  = $this->other_db->query("SELECT * FROM ACC_GROUPS WHERE GROUP_SNO = '".$id."' AND COMPANYCODE='".$_SESSION['COMPANYCODE']."'")->row();
        save_query_in_log();
        $this->other_db->close();
        return $result;
    }
    public function get_sel_del_data($id)
    {
        $result= $this->other_db->query("SELECT * FROM ACC_GROUPS WHERE COMPANYCODE='".$_SESSION['COMPANYCODE']."' AND GROUP_SNO='".$id."' ")->row();
        return $result;
    }
    public function acc_grp_delete($id)
    {
        $result=$this->other_db->query("SELECT COUNT(AC_GROUP_ID) AS SUBGROUPCOUNT  FROM ACC_GROUPS   WHERE COMPANYCODE='".$_SESSION['COMPANYCODE']."' AND AC_GROUP_ID='".$id."' ")->row();
        $sub_count=$result->SUBGROUPCOUNT;
        $result1= $this->other_db->query("SELECT COUNT(GROUP_ID) AS LEDGERCOUNT  FROM ACC_LEDGERS   WHERE COMPANYCODE='".$_SESSION['COMPANYCODE']."' AND GROUP_ID='".$id."'")->row();
        $ledger_count=$result1->LEDGERCOUNT;
        if($sub_count > 0 || $ledger_count > 0)
        {
            return $sub_count."||".$ledger_count;
        }
        else
        {
            $res=$this->other_db->query("DELETE FROM ACC_GROUPS WHERE COMPANYCODE='".$_SESSION['COMPANYCODE']."' AND GROUP_SNO='".$id."' ");
            // print_r($res); exit();
            return $res;
        }
    }
}
?>                        
