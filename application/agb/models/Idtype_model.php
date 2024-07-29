<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/***************************************************************
    Purpose : To handle all the Idtype database details 2022-08-19
****************************************************************/
class Idtype_model extends CI_Model
{
  function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Calcutta'); 
    }

    // To get idtype list
    public function get_idtype_list()
    {
        $this->db->reconnect();
        $result  = $this->db->query("SELECT * FROM IDTYPE WHERE STATUS!=2 ORDER BY IDTYPEID DESC")->result_array();
        save_query_in_log();
        $this->db->close();
        return $result;
    }
	public function idtype_active($data, $id)
	{
		$this->db->reconnect();
		$result = $this->db->query("UPDATE IDTYPE SET STATUS = '".$data['status']."',MODIFIEDON = '".$data['modified_on']."',MODIFIEDBY = '".$data['modified_by']."' WHERE IDTYPEID = '".$id."'");
		save_query_in_log();
        $this->db->close();
		return $result;
	}

    // To get idtype unique
    public function idtype_unique($val)
    {   
        $this->db->reconnect();
        $result  = $this->db->query("SELECT * FROM IDTYPE WHERE STATUS!=2 AND IDTYPENAME = '".$val."'")->row();
        save_query_in_log();
        $this->db->close();
        return $result;
    }

    // To add idtype
    public function idtype_save($data)
    {
        $this->db->reconnect();
        $result  = $this->db->query("INSERT INTO IDTYPE (IDTYPENAME,CREATEDON,CREATEDBY,STATUS)VALUES ('".$data['idtype_name']."','".$data['created_on']."',".$data['created_by'].",1)");
        save_query_in_log();
        $this->db->close(); 
        return $result;
    }

    // To get idtype details by idtype id
    public function get_idtype_by_idtype_id($did)
    {
        $this->db->reconnect();
        $result  = $this->db->query("SELECT * FROM IDTYPE WHERE STATUS!=2 AND IDTYPEID = ".$did)->row();
        save_query_in_log();
        $this->db->close();
        return $result;
    }

    // To get idtype unique edit
    public function idtype_unique_edit($val,$dcid)
    {
        $this->db->reconnect();
        $result  = $this->db->query("SELECT * FROM IDTYPE WHERE STATUS!=2 AND  IDTYPENAME = '".$val."' AND IDTYPEID != ".$dcid)->row();
        save_query_in_log();
        $this->db->close();
        return $result;
    }

    // To update idtype
    public function idtype_update($data)
    {
        $this->db->reconnect();
        $result  = $this->db->query("UPDATE IDTYPE SET IDTYPENAME = '".$data['idtype_name']."',MODIFIEDON = '".$data['modified_on']."',MODIFIEDBY = '".$data['modified_by']."' WHERE IDTYPEID = '".$data['idtype_id']."'");
        save_query_in_log();
        $this->db->close();
        return $result;
    }

    // To delete idtype
    public function idtype_delete($uid)
    {
        $this->db->reconnect();
        $result  = $this->db->query("UPDATE IDTYPE SET STATUS = '2' WHERE IDTYPEID = ".$uid);
        save_query_in_log();
        $this->db->close();
        return $result;
    }


}
?>                        