<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/***************************************************************
    Purpose : To handle all the Zone database details 2022-08-22
****************************************************************/
class Zone_model extends CI_Model
{
  function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Calcutta'); 
    }

    // To get zone list
    public function get_zone_list()
    {
        $this->db->reconnect();
        $result  = $this->db->query("SELECT * FROM ZONE_MASTER ORDER BY SNO DESC")->result_array();
        save_query_in_log();
        $this->db->close();
        return $result;
    }

    // To get last zone details
    public function get_last_zone_details()
    {
        $this->db->reconnect();
        $result  = $this->db->query("SELECT TOP 1 * FROM ZONE_MASTER ORDER BY SNO DESC")->row();
        save_query_in_log();
        $this->db->close();
        return $result;
    }
	/*public function zone_active($data, $id)
	{
		$this->db->reconnect();
		$result = $this->db->query("UPDATE ZONE_MASTER SET STATUS = '".$data['status']."',MODIFIEDON = '".$data['modified_on']."',MODIFIEDBY = '".$data['modified_by']."' WHERE SNO = '".$id."'");
		save_query_in_log();
        $this->db->close();
		return $result;
	}*/

    // To get zone unique
    public function zone_unique($val)
    {
        $this->db->reconnect();
        $result  = $this->db->query("SELECT * FROM ZONE_MASTER WHERE ZONENAME = '".$val."'")->row();
        save_query_in_log();
        $this->db->close();
        return $result;
    }

    // To add zone
    public function add_zone($data)
    {
        $this->db->reconnect();
        $result  = $this->db->query("INSERT INTO ZONE_MASTER (SNO,ZONENAME)VALUES ('".$data['sno']."','".$data['zone']."')");
        save_query_in_log();
        $this->db->close();
        return $result;
    }

    // To get zone details by zone id
    public function get_zone_by_zone_id($did)
    {
        $this->db->reconnect();
        $result  = $this->db->query("SELECT * FROM ZONE_MASTER WHERE SNO = '".$did."'")->row();
        save_query_in_log();
        $this->db->close();
        return $result;
    }

    // To get zone unique edit
    public function zone_unique_edit($val,$dcid)
    {
        $this->db->reconnect();
        $result  = $this->db->query("SELECT * FROM ZONE_MASTER WHERE ZONENAME = '".$val."' AND SNO != '".$dcid."'")->row();
        save_query_in_log();
        $this->db->close();
        return $result;
    }

    // To update zone
    public function update_zone($data)
    {
        $this->db->reconnect();
        $result  = $this->db->query("UPDATE ZONE_MASTER SET ZONENAME = '".$data['zone']."' WHERE SNO = '".$data['zone_id']."'");
        save_query_in_log();
        $this->db->close();
        return $result;
    }

    // To delete zone
    public function zone_delete($uid)
    {
        $this->db->reconnect();
        $result  = $this->db->query("DELETE FROM ZONE_MASTER WHERE SNO = '".$uid."'");
        save_query_in_log();
        $this->db->close();
        return $result;
    }


}
?>                        