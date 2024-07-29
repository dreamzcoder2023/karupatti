<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/***************************************************************
    Purpose : To handle all the Department database details 2022-08-19
****************************************************************/
class Department_model extends CI_Model
{
  function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Calcutta'); 
    }

    // To get department list
    public function get_department_list()
    {
        $this->db->reconnect();
        $result  = $this->db->query("SELECT * FROM DEPARTMENT WHERE STATUS!=2 ORDER BY DEPARTMENTID DESC")->result_array();
        save_query_in_log();
        $this->db->close();
        return $result;
    }
	public function department_active($data, $id)
	{
		$this->db->reconnect();
		$result = $this->db->query("UPDATE DEPARTMENT SET STATUS = '".$data['status']."',MODIFIEDON = '".$data['modified_on']."',MODIFIEDBY = '".$data['modified_by']."' WHERE DEPARTMENTID = '".$id."'");
		save_query_in_log();
        $this->db->close();
		return $result;
	}

    // To get department unique
    public function department_unique($val,$ccode)
    {
        $this->db->reconnect();
        $result  = $this->db->query("SELECT * FROM DEPARTMENT WHERE DEPARTMENTNAME = '".$val."' AND COMPANYCODE = '".$ccode."' AND STATUS!=2")->row();
        save_query_in_log();
        $this->db->close();
        return $result;
    }

    // To add department
    public function add_department($data)
    {
        $this->db->reconnect();
        $result  = $this->db->query("INSERT INTO DEPARTMENT (DEPARTMENTNAME,COMPANYCODE,CREATEDON,CREATEDBY,STATUS)VALUES ('".$data['department']."','".$data['company_code']."','".$data['created_on']."','".$data['created_by']."','0')");
        save_query_in_log();
        $this->db->close();
        return $result;
    }

    // To get department details by department id
    public function get_department_by_department_id($did)
    {
        $this->db->reconnect();
        $result  = $this->db->query("SELECT * FROM DEPARTMENT WHERE DEPARTMENTID = '".$did."'")->row();
        save_query_in_log();
        $this->db->close();
        return $result;
    }

    // To get department unique edit
    public function department_unique_edit($val,$dcid)
    {
        $this->db->reconnect();
        $result  = $this->db->query("SELECT * FROM DEPARTMENT WHERE DEPARTMENTNAME = '".$val."' AND DEPARTMENTID != '".$dcid."' AND STATUS!=2")->row();
        save_query_in_log();
        $this->db->close();
        return $result;
    }

    // To update department
    public function update_department($data)
    {
        $this->db->reconnect();
        $result  = $this->db->query("UPDATE DEPARTMENT SET DEPARTMENTNAME = '".$data['department']."',COMPANYCODE = '".$data['company_code']."',MODIFIEDON = '".$data['modified_on']."',MODIFIEDBY = '".$data['modified_by']."' WHERE DEPARTMENTID = '".$data['department_id']."'");
        save_query_in_log();
        $this->db->close();
        return $result;
    }

    // To delete department
    public function department_delete($uid)
    {
        $this->db->reconnect();
        $result  = $this->db->query("UPDATE DEPARTMENT SET STATUS = '2' WHERE DEPARTMENTID = '".$uid."'");
        save_query_in_log();
        $this->db->close();
        return $result;
    }


}
?>                        