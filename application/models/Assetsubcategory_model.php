<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*******************************************************************************************************
    Purpose : To handle all the Assetsubcategory_model database details 2024-01-20 By Vasanth
********************************************************************************************************/
class Assetsubcategory_model extends CI_Model
{
  function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Calcutta'); 
    }


    public function list()
    {
        $this->db->reconnect();
        $result  = $this->db->query("SELECT assetsubcategory.* , assetcategory.assetcategoryname
         FROM assetsubcategory 
         LEFT JOIN assetcategory ON assetsubcategory.assetcategoryid = assetcategory.assetcategoryid
         WHERE assetsubcategory.status!='2' ORDER BY assetsubcategoryid DESC ")->result_array();
        save_query_in_log();
        $this->db->close();
        return $result;
    }
    public function assetcategorylist()
    {
        $this->db->reconnect();
        $result  = $this->db->query("SELECT * FROM assetcategory WHERE status='1' ORDER BY assetcategoryname ASC ")->result_array();
        save_query_in_log();
        $this->db->close();
        return $result;
    }

    public function assetsubcategory_active_status($data,$id)
    {
        $this->db->reconnect();
        $result = $this->db->query("UPDATE assetsubcategory SET status = '".$data['status']."' WHERE assetsubcategoryid = '".$id."'");
        save_query_in_log();
        $this->db->close();
        return $result;
    }

    public function add($data)
    {
        $this->db->reconnect();
        $result = $this->db->query("
                                    INSERT INTO assetsubcategory (
                                        assetcategoryid,
                                        assetsubcategoryname,
                                        status,
                                        created_on,
                                        created_by
                                    )
                                    VALUES (
                                        '".$data['assetcategoryid']."',
                                        '".$data['assetsubcategoryname']."',
                                        '".$data['status']."',
                                        '".$data['created_on']."',
                                        '".$data['created_by']."'
                                    )
                                ");
        save_query_in_log();
        $this->db->close();
        return $result;
    }


    

    public function editdata($id)
    {
        $this->db->reconnect();
        $result  = $this->db->query("SELECT * FROM assetsubcategory WHERE assetsubcategoryid='".$id."' ")->row();
        save_query_in_log();
        $this->db->close();
        return $result;
    }

     public function update($data)
    {
        $this->db->reconnect();
        $result = $this->db->query("
                                    UPDATE assetsubcategory
                                    SET
                                        assetcategoryid      = '".$data['assetcategoryid']."',
                                        assetsubcategoryname = '".$data['assetsubcategoryname']."',
                                        modified_on       = '".$data['modified_on']."',
                                        modified_by       = '".$data['modified_by']."' 
                                    WHERE
                                        assetsubcategoryid   = '".$data['assetsubcategoryid']."'
                                ");
        save_query_in_log();
        $this->db->close();
        return $result;
    }

    // To delete assetsubcategory
    public function assetsubcategory_delete($uid)
    {
        $this->db->reconnect();
        $result  = $this->db->query("UPDATE assetsubcategory SET STATUS = '2' WHERE assetsubcategoryid = '".$uid."'");
        save_query_in_log();
        $this->db->close();
        return $result;
    } 


    


}
?>                        