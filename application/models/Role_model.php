<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/***************************************************************
    Purpose : To handle all the Role database details 2022-08-19
****************************************************************/
class Role_model extends CI_Model
{
  function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Calcutta'); 
    }

    // To get role list
    public function get_role_list()
    {
        $this->db->reconnect();
        $result  = $this->db->query("SELECT * FROM ROLE WHERE STATUS!=2 ORDER BY ROLEID DESC")->result_array();
        save_query_in_log();
        $this->db->close();
        return $result;
    }
	public function role_active($data, $id)
	{
		$this->db->reconnect();
		$result = $this->db->query("UPDATE ROLE SET STATUS = '".$data['status']."',MODIFIEDON = '".$data['modified_on']."',MODIFIEDBY = '".$data['modified_by']."' WHERE ROLEID = '".$id."'");
		save_query_in_log();
        $this->db->close();
		return $result;
	}

    // To get role unique
    public function role_unique($val,$ccode)
    {
        $this->db->reconnect();
        $result  = $this->db->query("SELECT * FROM ROLE WHERE ROLENAME = '".$val."' AND  STATUS!=2")->row();
        save_query_in_log();
        $this->db->close();
        return $result;
    }

    // To add role
    public function add_role($data)
    {
        $this->db->reconnect();
        $result  = $this->db->query("INSERT INTO ROLE (ROLENAME,CREATEDON,CREATEDBY,STATUS)VALUES ('".$data['role']."','".$data['created_on']."','".$data['created_by']."','0')");
        save_query_in_log();
        $this->db->close();
        return $result;
    }

    // To get role details by role id
    public function get_role_by_role_id($did)
    {
        $this->db->reconnect();
        $result  = $this->db->query("SELECT * FROM ROLE WHERE ROLEID = '".$did."' AND STATUS!=2")->row();
        save_query_in_log();
        $this->db->close();
        return $result;
    }

    // To get role unique edit
    public function role_unique_edit($val,$dcid)
    {
        $this->db->reconnect();
        $result  = $this->db->query("SELECT * FROM ROLE WHERE ROLENAME = '".$val."' AND ROLEID != '".$dcid."' AND STATUS!=2")->row();
        save_query_in_log();
        $this->db->close();
        return $result;
    }

    // To update role
    public function update_role($data)
    {
        $this->db->reconnect();
        $result  = $this->db->query("UPDATE ROLE SET ROLENAME = '".$data['role']."',MODIFIEDON = '".$data['modified_on']."',MODIFIEDBY = '".$data['modified_by']."' WHERE ROLEID = '".$data['role_id']."'");
        save_query_in_log();
        $this->db->close();
        return $result;
    }

    // To delete role
    public function role_delete($uid)
    {
        $this->db->reconnect();
        $role_permission= $this->db->query("DELETE FROM  ROLE_PERMISSION WHERE ROLE_ID = '".$uid."'");
        $result  = $this->db->query("UPDATE ROLE SET STATUS = '2' WHERE ROLEID = '".$uid."'");
        save_query_in_log();
        $this->db->close();
        return $result;
    }


}
?>                        