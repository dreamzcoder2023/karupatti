<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/***************************************************************
    Purpose : To handle all the Worktype database details 2022-08-19
****************************************************************/
class Worktype_model extends CI_Model
{
  function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Calcutta'); 
    }

    // To get worktype list
    public function get_worktype_list()
    {
        $this->db->reconnect();
        $result  = $this->db->query("SELECT * FROM WORKTYPE WHERE STATUS!=2 ORDER BY WORKTYPEID DESC")->result_array();
        save_query_in_log();
        $this->db->close();
        return $result;
    }
	public function worktype_active($data, $id)
	{
		$this->db->reconnect();
		$result = $this->db->query("UPDATE WORKTYPE SET STATUS = '".$data['status']."',MODIFIEDON = '".$data['modified_on']."',MODIFIEDBY = '".$data['modified_by']."' WHERE WORKTYPEID = '".$id."'");
		save_query_in_log();
        $this->db->close();
		return $result;
	}

    // To get worktype unique
    public function worktype_unique($val)
    {   
        $this->db->reconnect();
        $result  = $this->db->query("SELECT * FROM WORKTYPE WHERE STATUS!=2 AND WORKTYPENAME = '".$val."'")->row();
        save_query_in_log();
        $this->db->close();
        return $result;
    }

    // To add worktype
    public function worktype_save($data)
    {
        $this->db->reconnect();
        $result  = $this->db->query("INSERT INTO WORKTYPE (WORKTYPENAME,CREATEDON,CREATEDBY,STATUS)VALUES ('".$data['worktype_name']."','".$data['created_on']."',".$data['created_by'].",1)");
        save_query_in_log();
        $this->db->close(); 
        return $result;
    }

    // To get worktype details by worktype id
    public function get_worktype_by_worktype_id($did)
    {
        $this->db->reconnect();
        $result  = $this->db->query("SELECT * FROM WORKTYPE WHERE WORKTYPEID = ".$did)->row();
        save_query_in_log();
        $this->db->close();
        return $result;
    }

    // To get worktype unique edit
    public function worktype_unique_edit($val,$dcid)
    {
        $this->db->reconnect();
        $result  = $this->db->query("SELECT * FROM WORKTYPE WHERE STATUS!=2 AND WORKTYPENAME = '".$val."' AND WORKTYPEID != ".$dcid)->row();
        save_query_in_log();
        $this->db->close();
        return $result;
    }

    // To update worktype
    public function worktype_update($data)
    {
        $this->db->reconnect();
        $result  = $this->db->query("UPDATE WORKTYPE SET WORKTYPENAME = '".$data['worktype_name']."',MODIFIEDON = '".$data['modified_on']."',MODIFIEDBY = '".$data['modified_by']."' WHERE WORKTYPEID = '".$data['worktype_id']."'");
        save_query_in_log();
        $this->db->close();
        return $result;
    }

    // To delete worktype
    public function worktype_delete($uid)
    {
        $this->db->reconnect();
        $result  = $this->db->query("UPDATE WORKTYPE SET STATUS = '2' WHERE WORKTYPEID = ".$uid);
        save_query_in_log();
        $this->db->close();
        return $result;
    }


}
?>                        