<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/***************************************************************
    Purpose : To handle all the Area database details 2022-08-22
****************************************************************/
class Area_model extends CI_Model
{
  function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Calcutta'); 
    }

    // To get area list
    public function get_area_list()
    {
        $this->db->reconnect();
        $result  = $this->db->query("SELECT a.*,z.ZONENAME FROM AREA a,ZONE_MASTER z WHERE a.ZONE_SNO = z.SNO ORDER BY a.SNO DESC")->result_array();
        save_query_in_log();
        $this->db->close();
        return $result;
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

    // To get last area details
    public function get_last_area_details()
    {
        $this->db->reconnect();
        $result  = $this->db->query("SELECT TOP 1 * FROM AREA ORDER BY SNO DESC")->row();
        save_query_in_log();
        $this->db->close();
        return $result;
    }
	/*public function area_active($data, $id)
	{
		$this->db->reconnect();
		$result = $this->db->query("UPDATE AREA SET STATUS = '".$data['status']."',MODIFIEDON = '".$data['modified_on']."',MODIFIEDBY = '".$data['modified_by']."' WHERE SNO = '".$id."'");
		save_query_in_log();
        $this->db->close();
		return $result;
	}*/

    // To get area unique
    public function area_unique($val)
    {
        $this->db->reconnect();
        $result  = $this->db->query("SELECT * FROM AREA WHERE AREANAME = '".$val."'")->row();
        save_query_in_log();
        $this->db->close();
        return $result;
    }

    // To add area
    public function add_area($data)
    {
        $this->db->reconnect();
        $result  = $this->db->query("INSERT INTO AREA (SNO,AREANAME,ZONE_SNO)VALUES ('".$data['sno']."','".$data['area']."','".$data['zone_id']."')");
        save_query_in_log();
        $this->db->close();
        return $result;
    }

    // To get area details by area id
    public function get_area_by_area_id($did)
    {
        $this->db->reconnect();
        $result  = $this->db->query("SELECT * FROM AREA WHERE SNO = '".$did."'")->row();
        save_query_in_log();
        $this->db->close();
        return $result;
    }

    // To get area unique edit
    public function area_unique_edit($val,$dcid)
    {
        $this->db->reconnect();
        $result  = $this->db->query("SELECT * FROM AREA WHERE AREANAME = '".$val."' AND SNO != '".$dcid."'")->row();
        save_query_in_log();
        $this->db->close();
        return $result;
    }

    // To update area
    public function update_area($data)
    {
        $this->db->reconnect();
        $result  = $this->db->query("UPDATE AREA SET AREANAME = '".$data['area']."',ZONE_SNO = '".$data['zone_id']."' WHERE SNO = '".$data['area_id']."'");
        save_query_in_log();
        $this->db->close();
        return $result;
    }

    // To delete area
    public function area_delete($uid)
    {
        $this->db->reconnect();
        $result  = $this->db->query("DELETE FROM AREA WHERE SNO = '".$uid."'");
        save_query_in_log();
        $this->db->close();
        return $result;
    }


}
?>                        