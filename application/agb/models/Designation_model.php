<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/***************************************************************
    Purpose : To handle all the Designation database details 2022-08-22
****************************************************************/
class Designation_model extends CI_Model
{
  function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Calcutta'); 
    }

    // To get designation list
    public function get_designation_list()
    {
        $this->db->reconnect();
        $result  = $this->db->query("SELECT * FROM DESIGNATION WHERE STATUS!=2 ORDER BY DESIGNATIONID DESC")->result_array();
        save_query_in_log();
        $this->db->close();
        return $result;
    }
	public function designation_active($data, $id)
	{
		$this->db->reconnect();
		$result = $this->db->query("UPDATE DESIGNATION SET STATUS = '".$data['status']."',MODIFIEDON = '".$data['modified_on']."',MODIFIEDBY = '".$data['modified_by']."' WHERE DESIGNATIONID = '".$id."'");
		save_query_in_log();
        $this->db->close();
		return $result;
	}

    // To get designation unique
    public function designation_unique($val,$ccode)
    {
        $this->db->reconnect();
        $result  = $this->db->query("SELECT * FROM DESIGNATION WHERE DESIGNATIONNAME = '".$val."' AND STATUS!=2")->row();
        save_query_in_log();
        $this->db->close();
        return $result;
    }

    // To add designation
    public function add_designation($data)
    {
        $this->db->reconnect();
        $result  = $this->db->query("INSERT INTO DESIGNATION (DESIGNATIONNAME,CREATEDON,CREATEDBY,STATUS)VALUES ('".$data['designation']."','".$data['created_on']."','".$data['created_by']."','0')");
        save_query_in_log();
        $this->db->close();
        return $result;
    }

    // To get designation details by designation id
    public function get_designation_by_designation_id($did)
    {
        $this->db->reconnect();
        $result  = $this->db->query("SELECT * FROM DESIGNATION WHERE DESIGNATIONID = '".$did."'")->row();
        save_query_in_log();
        $this->db->close();
        return $result;
    }

    // To get designation unique edit
    public function designation_unique_edit($val,$dcid)
    {
        $this->db->reconnect();
        $result  = $this->db->query("SELECT * FROM DESIGNATION WHERE DESIGNATIONNAME = '".$val."' AND DESIGNATIONID != '".$dcid."' AND STATUS!=2")->row();
        save_query_in_log();
        $this->db->close();
        return $result;
    }

    // To update designation
    public function update_designation($data)
    {
        $this->db->reconnect();
        $result  = $this->db->query("UPDATE DESIGNATION SET DESIGNATIONNAME = '".$data['designation']."',MODIFIEDON = '".$data['modified_on']."',MODIFIEDBY = '".$data['modified_by']."' WHERE DESIGNATIONID = '".$data['designation_id']."'");
        save_query_in_log();
        $this->db->close();
        return $result;
    }

    // To delete designation
    public function designation_delete($uid)
    {
        $this->db->reconnect();
        $result  = $this->db->query("UPDATE DESIGNATION SET STATUS = '2' WHERE DESIGNATIONID = '".$uid."'");
        save_query_in_log();
        $this->db->close();
        return $result;
    }


}
?>                        