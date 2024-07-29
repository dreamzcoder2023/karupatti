<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/***************************************************************
    Purpose : To handle all the Interestgroup database details 2022-08-19
****************************************************************/
class Interestgroup_model extends CI_Model
{
  function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Calcutta'); 
    }

    // To get interest_group list
    public function get_interest_group_list()
    {
        $this->db->reconnect();
        $result  = $this->db->query("SELECT * FROM INT_GROUPS ORDER BY INT_GROUP_SNO DESC")->result_array();
        save_query_in_log();
        $this->db->close();
        return $result;
    }

    // To get interest_group unique
    public function interest_group_unique($val)
    {
        $this->db->reconnect();
        $result  = $this->db->query("SELECT * FROM INT_GROUPS WHERE INT_GROUP_NAME = '".$val."'")->row();
        save_query_in_log();
        $this->db->close();
        return $result;
    }

    // To add interest_group
    public function add_interest_group($data)
    {
        $this->db->reconnect();
        $result  = $this->db->query("INSERT INTO INT_GROUPS (INT_GROUP_SNO,INT_GROUP_NAME)VALUES ('".$data['sno']."','".$data['interest_group']."')");
        save_query_in_log();
        $this->db->close();
        return $result;
    }

    // To get last interest_group details
    public function get_last_interest_group_details()
    {
        $this->db->reconnect();
        $result  = $this->db->query("SELECT TOP 1 * FROM INT_GROUPS ORDER BY INT_GROUP_SNO DESC")->row();
        save_query_in_log();
        $this->db->close();
        return $result;
    }

    // To get interest_group details by interest_group id
    public function get_interest_group_by_interest_group_id($did)
    {
        $this->db->reconnect();
        $result  = $this->db->query("SELECT * FROM INT_GROUPS WHERE INT_GROUP_SNO = '".$did."'")->row();
        save_query_in_log();
        $this->db->close();
        return $result;
    }

    // To get interest_group unique edit
    public function interest_group_unique_edit($val,$dcid)
    {
        $this->db->reconnect();
        $result  = $this->db->query("SELECT * FROM INT_GROUPS WHERE INT_GROUP_NAME = '".$val."' AND INT_GROUP_SNO != '".$dcid."'")->row();
        save_query_in_log();
        $this->db->close();
        return $result;
    }

    // To update interest_group
    public function update_interest_group($data)
    {
        $this->db->reconnect();
        $result  = $this->db->query("UPDATE INT_GROUPS SET INT_GROUP_NAME = '".$data['interest_group']."' WHERE INT_GROUP_SNO = '".$data['sno']."'");
        save_query_in_log();
        $this->db->close();
        return $result;
    }

    // To delete interest_group
    public function interest_group_delete($uid)
    {
        $this->db->reconnect();
        $result  = $this->db->query("DELETE FROM INT_GROUPS WHERE INT_GROUP_SNO = '".$uid."'");
        save_query_in_log();
        $this->db->close();
        return $result;
    }


}
?>                        