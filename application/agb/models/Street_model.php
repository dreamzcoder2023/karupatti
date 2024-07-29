<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/***************************************************************
    Purpose : To handle all the Street database details 2022-08-19
****************************************************************/
class Street_model extends CI_Model
{
  function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Calcutta'); 
    }

    // To get street list
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
    public function  get_city_by_area_id($id)
    {
        $this->db->reconnect();
        $result  = $this->db->query("SELECT * FROM CITY WHERE AREAID='".$id."'")->result_array();
        // echo "SELECT * FROM AREA WHERE ZONE_SNO='".$id."'";
        // print_r($result);
        // exit();
        save_query_in_log();
        $this->db->close();
        return $result;   
    }
//get_village_by_city_id
    public function  get_village_by_city_id($id)
    {
        $this->db->reconnect();
        $result  = $this->db->query("SELECT * FROM VILLAGE WHERE CITYID='".$id."'")->result_array();
        
        save_query_in_log();
        $this->db->close();
        return $result;   
    }
    public function get_street_list()
    {
        $this->db->reconnect();
        $result  = $this->db->query("SELECT * FROM STREET WHERE STATUS!=2 ORDER BY STREETID DESC")->result_array();
        save_query_in_log();
        $this->db->close();
        return $result;
    }
	public function street_active($data, $id)
	{
		$this->db->reconnect();
		$result = $this->db->query("UPDATE STREET SET STATUS = '".$data['status']."',MODIFIED_ON = '".$data['modified_on']."',MODIFIED_BY = '".$data['modified_by']."' WHERE STREETID = ".$id);
		save_query_in_log();
        $this->db->close();
		return $result;
	}

    // To get street unique
    public function street_unique($val)
    {   
        $this->db->reconnect();
        $result  = $this->db->query("SELECT * FROM STREET WHERE STREETNAME = '".$val."'")->row();
        save_query_in_log();
        $this->db->close();
        return $result;
    }

    // To add street
    public function street_save($data)
    {
        $this->db->reconnect();
        $result  = $this->db->query("INSERT INTO STREET (STREETNAME,ZONEID,AREAID,CITYID,VILLAGEID,CREATED_ON,CREATED_BY,STATUS)VALUES ('".$data['street_name']."','".$data['zone']."','".$data['area']."',".$data['city'].",".$data['village'].",'".$data['created_on']."',".$data['created_by'].",1)");
        save_query_in_log();
        $this->db->close(); 
        return $result;
    }

    // To get street details by street id
    public function get_street_by_street_id($did)
    {
        $this->db->reconnect();
        $result  = $this->db->query("SELECT * FROM STREET WHERE STREETID = ".$did)->row();
        save_query_in_log();
        $this->db->close();
        return $result;
    }

    // To get street unique edit
    public function street_unique_edit($val,$dcid)
    {
        $this->db->reconnect();
        $result  = $this->db->query("SELECT * FROM STREET WHERE STREETNAME = '".$val."' AND STREETID != ".$dcid)->row();
        save_query_in_log();
        $this->db->close();
        return $result;
    }

    // To update street
    public function street_update($data)
    {
        $this->db->reconnect();
        $result  = $this->db->query("UPDATE STREET SET STREETNAME = '".$data['street_name']."',AREAID='".$data['area']."',ZONEID='".$data['zone']."',CITYID=".$data['city'].",VILLAGEID=".$data['village'].",MODIFIED_ON = '".$data['modified_on']."',MODIFIED_BY = '".$data['modified_by']."' WHERE STREETID = '".$data['street_id']."'");
        save_query_in_log();
        $this->db->close();
        return $result;
    }

    // To delete street
    public function street_delete($uid)
    {
        $this->db->reconnect();
        $result  = $this->db->query("UPDATE STREET SET STATUS=2 WHERE STREETID = '".$uid."'");
        save_query_in_log();
        $this->db->close();
        return $result;
    }


}
?>                        