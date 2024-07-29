<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/***************************************************************
    Purpose : To handle all the City database details 2022-08-19
****************************************************************/
class City_model extends CI_Model
{
  function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Calcutta'); 
    }

    // To get city list
    public function  get_area_by_zone_id($id)
    {
        $this->db->reconnect();
        $result  = $this->db->query("SELECT * FROM AREA WHERE ZONE_SNO='".$id."'")->result_array();
        // echo "SELECT * FROM AREA WHERE ZONE_SNO='".$id."'";
        // print_r($result);
        // exit();
        save_query_in_log();
        $this->db->close();
        return $result;   
    }
    public function get_city_list()
    {
        $this->db->reconnect();
        $result  = $this->db->query("SELECT * FROM CITY ORDER BY CITYID DESC")->result_array();
        save_query_in_log();
        $this->db->close();
        return $result;
    }
	public function city_active($data, $id)
	{
		$this->db->reconnect();
		$result = $this->db->query("UPDATE CITY SET STATUS = '".$data['status']."',MODIFIEDON = '".$data['modified_on']."',MODIFIEDBY = '".$data['modified_by']."' WHERE CITYID = '".$id."'");
		save_query_in_log();
        $this->db->close();
		return $result;
	}

    // To get city unique
    public function city_unique($data)
    {   
        $this->db->reconnect();
        $result  = $this->db->query("SELECT * FROM CITY WHERE   AREAID='".$data['area']."' AND ZONEID='".$data['zone']."' AND CITYNAME = '".$data['val']."' ")->row();
        save_query_in_log();
        $this->db->close();
        return $result;
    }

    // To add city
    public function city_save($data)
    {
        $this->db->reconnect();
        $result  = $this->db->query("INSERT INTO CITY (CITYNAME,AREAID,ZONEID,CREATEDON,CREATEDBY,STATUS)VALUES ('".$data['city_name']."','".$data['area']."','".$data['zone']."','".$data['created_on']."',".$data['created_by'].",1)");
        save_query_in_log();
        $this->db->close(); 
        return $result;
    }

    // To get city details by city id
    public function get_city_by_city_id($did)
    {
        $this->db->reconnect();
        $result  = $this->db->query("SELECT * FROM CITY WHERE CITYID = ".$did)->row();
        save_query_in_log();
        $this->db->close();
        return $result;
    }

    // To get city unique edit
    public function city_unique_edit($data)
    {
        $this->db->reconnect();
        $result  = $this->db->query("SELECT * FROM CITY WHERE CITYNAME = '".$data['val']."' AND AREAID='".$data['area']."' AND ZONEID='".$data['zone']."' AND CITYID != ".$data['id'])->row();
        save_query_in_log();
        $this->db->close();
        return $result;
    }

    // To update city
    public function city_update($data)
    {
        $this->db->reconnect();
        $result  = $this->db->query("UPDATE CITY SET CITYNAME = '".$data['city_name']."',AREAID='".$data['area']."',ZONEID='".$data['zone']."',MODIFIEDON = '".$data['modified_on']."',MODIFIEDBY = '".$data['modified_by']."' WHERE CITYID = '".$data['city_id']."'");
        save_query_in_log();
        $this->db->close();
        return $result;
    }

    // To delete city
    public function city_delete($uid)
    {
        $this->db->reconnect();
        $result  = $this->db->query("DELETE FROM CITY WHERE CITYID = '".$uid."'");
        save_query_in_log();
        $this->db->close();
        return $result;
    }


}
?>                        