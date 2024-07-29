<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/***************************************************************
    Purpose : To handle all the Department database details 2022-08-19
****************************************************************/
class Systems_model extends CI_Model
{
  function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Calcutta'); 
    }

    // To get systems list
    public function get_systems_list()
    {
        $this->db->reconnect();
        // $result  = $this->db->query("SELECT * FROM SYSTEMS WHERE STATUS!=2 ORDER BY SYS_ID DESC")->result_array();
        $result  = $this->db->query("SELECT * FROM SYSTEMS ORDER BY SYS_ID DESC")->result_array();
        save_query_in_log();
        $this->db->close();
        return $result;
    }
	public function systems_active($data, $id)
    {
        $this->db->reconnect();
        $result = $this->db->query("UPDATE SYSTEMS SET ACTIVE = '".$data['Active']."'WHERE SYS_ID = '".$id."'");
        save_query_in_log();
        $this->db->close();
        return $result;
    }

    // To get systems name unique
    public function systems_name_unique($val)
    {   
        $this->db->reconnect();
        $result  = $this->db->query("SELECT * FROM SYSTEMS WHERE SYS_NAME = '".$val."'")->row();
        save_query_in_log();
        $this->db->close();
        return $result;
    }

    // To get systems Code unique
    public function systems_code_unique($val)
    {   
        $this->db->reconnect();
        $result  = $this->db->query("SELECT * FROM SYSTEMS WHERE SYS_CODE = '".$val."'")->row();
        save_query_in_log();
        $this->db->close();
        return $result;
    }

    // To get Loan Prefix unique
    public function loanprefix_unique($val)
    {   
        $this->db->reconnect();
        $result  = $this->db->query("SELECT * FROM SYSTEMS WHERE LOANPREFIX = '".$val."'")->row();
        save_query_in_log();
        $this->db->close();
        return $result;
    }

     // To add Systems
    public function add_systems($data)
    {
        $this->db->reconnect();
        $result  = $this->db->query("INSERT INTO SYSTEMS (SYS_ID,SYS_NAME,SYS_CODE,LOANPREFIX,ACTIVE)VALUES ('".$data['sys_id']."','".$data['systems_name']."','".$data['systems_code']."','".$data['loanprefix']."','Y')");
        save_query_in_log();
        $this->db->close(); 
        return $result;
    }

    public function get_last_sys_id_details()
    {
        $this->db->reconnect();
        $result  = $this->db->query("SELECT TOP 1 * FROM SYSTEMS ORDER BY SYS_ID DESC")->row();
        save_query_in_log();
        $this->db->close(); 
        return $result;
    }


// To delete systems
    public function systems_delete($sys_id)
    {
        $this->db->reconnect();
        // $result  = $this->db->query("UPDATE SYSTEMS SET STATUS = '2' WHERE SYS_ID = '".$sys_id."'");
        $result  = $this->db->query("DELETE FROM SYSTEMS  WHERE SYS_ID = '".$sys_id."'");
        save_query_in_log();
        $this->db->close();
        return $result;
    }

// To get System details by System id
    public function get_systems_by_systems_id($did)
    {
        $this->db->reconnect();
        $result  = $this->db->query("SELECT * FROM SYSTEMS WHERE SYS_ID = '".$did."'")->row();
        save_query_in_log();
        $this->db->close();
        return $result;
    }

// To update systems
    public function update_systems($data)
    {
        $this->db->reconnect();
        $result  = $this->db->query("UPDATE SYSTEMS SET SYS_NAME = '".$data['systems_name_edit']."',SYS_CODE = '".$data['systems_code_edit']."',LOANPREFIX = '".$data['loanprefix_edit']."' WHERE SYS_ID = '".$data['sys_id_edit']."'");
        save_query_in_log();
        $this->db->close();
        return $result;
    }

// To get Systems unique edit
    public function systems_name_unique_edit($val)
    {
        $this->db->reconnect();
        $result  = $this->db->query("SELECT * FROM SYSTEMS WHERE SYS_NAME = '".$val."'")->row();
        save_query_in_log();
        $this->db->close();
        return $result;
    }
    public function systems_code_unique_edit($val)
    {
        $this->db->reconnect();
        $result  = $this->db->query("SELECT * FROM SYSTEMS WHERE SYS_CODE = '".$val."'")->row();
        save_query_in_log();
        $this->db->close();
        return $result;
    }
    public function loanprefix_unique_edit($val)
    {
        $this->db->reconnect();
        $result  = $this->db->query("SELECT * FROM SYSTEMS WHERE LOANPREFIX = '".$val."'")->row();
        save_query_in_log();
        $this->db->close();
        return $result;
    }


   } 
?>                        