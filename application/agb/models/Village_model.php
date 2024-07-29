<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/***************************************************************
    Purpose : To handle all the Village database details 2022-08-19
****************************************************************/
class Village_model extends CI_Model
{
  function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Calcutta'); 
    }

    // To get village list
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
    public function get_village_list()
    {
        $this->db->reconnect();
        $result  = $this->db->query("SELECT * FROM VILLAGE WHERE STATUS!=2 ORDER BY VILLAGEID DESC")->result_array();
        save_query_in_log();
        $this->db->close();
        return $result;
    }
	public function village_active($data, $id)
	{
		$this->db->reconnect();
		$result = $this->db->query("UPDATE VILLAGE SET STATUS = '".$data['status']."',MODIFIED_ON = '".$data['modified_on']."',MODIFIED_BY = '".$data['modified_by']."' WHERE VILLAGEID = ".$id);
		save_query_in_log();
        $this->db->close();
		return $result;
	}

    // To get village unique
    public function village_unique($data)
    {   
        $this->db->reconnect();
        $result  = $this->db->query("SELECT * FROM VILLAGE WHERE AREAID='".$data['area']."' AND ZONEID='".$data['zone']."'AND CITYID='".$data['city']."' AND VILLAGENAME = '".$data['val']."'")->row();
        save_query_in_log();
        $this->db->close();
        return $result;
    }

    // To add village
    public function village_save($data)
    {
        $this->db->reconnect();
        $result  = $this->db->query("INSERT INTO VILLAGE (VILLAGENAME,ZONEID,AREAID,CITYID,CREATED_ON,CREATED_BY,STATUS)VALUES ('".$data['village_name']."','".$data['zone']."','".$data['area']."',".$data['city'].",'".$data['created_on']."',".$data['created_by'].",1)");
        save_query_in_log();
        $this->db->close(); 
        return $result;
    }

    // To get village details by village id
    public function get_village_by_village_id($did)
    {
        $this->db->reconnect();
        $result  = $this->db->query("SELECT * FROM VILLAGE WHERE VILLAGEID = ".$did)->row();
        save_query_in_log();
        $this->db->close();
        return $result;
    }

    // To get village unique edit
    public function village_unique_edit($data)
    {
        $this->db->reconnect();
        $result  = $this->db->query("SELECT * FROM VILLAGE WHERE AREAID='".$data['area']."' AND ZONEID='".$data['zone']."'AND CITYID='".$data['city']."' AND VILLAGENAME = '".$data['val']."'  AND VILLAGEID != ".$data['id'])->row();
        save_query_in_log();
        $this->db->close();
        return $result;
    }

    // To update village
    public function village_update($data)
    {
        $this->db->reconnect();
        $result  = $this->db->query("UPDATE VILLAGE SET VILLAGENAME = '".$data['village_name']."',AREAID='".$data['area']."',ZONEID='".$data['zone']."',CITYID=".$data['city'].",MODIFIED_ON = '".$data['modified_on']."',MODIFIED_BY = '".$data['modified_by']."' WHERE VILLAGEID = '".$data['village_id']."'");
        save_query_in_log();
        $this->db->close();
        return $result;
    }

    // To delete village
    public function village_delete($uid)
    {
        $this->db->reconnect();
        $result  = $this->db->query("UPDATE VILLAGE SET STATUS=2 WHERE VILLAGEID = '".$uid."'");
        save_query_in_log();
        $this->db->close();
        return $result;
    }


}
?>                        