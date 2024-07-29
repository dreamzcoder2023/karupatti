<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/********************************************************************************************
    Purpose : To handle all the Assetcategory_model database details 2024-01-20 By Vasanth
*********************************************************************************************/
class Assetcategory_model extends CI_Model
{
  function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Calcutta'); 
    }


    public function list()
    {
        $this->db->reconnect();
        $result  = $this->db->query("SELECT * FROM assetcategory WHERE status!='2' ORDER BY assetcategoryid DESC ")->result_array();
        save_query_in_log();
        $this->db->close();
        return $result;
    }

    public function assetcategory_active_status($data,$id)
    {
        $this->db->reconnect();
        $result = $this->db->query("UPDATE assetcategory SET status = '".$data['status']."' WHERE assetcategoryid = '".$id."'");
        save_query_in_log();
        $this->db->close();
        return $result;
    }

    public function add($data)
    {
        $this->db->reconnect();
        $result = $this->db->query("
                                    INSERT INTO assetcategory (
                                        assetcategoryname,
                                        status,
                                        created_on,
                                        created_by
                                    )
                                    VALUES (
                                        '".$data['assetcategoryname']."',
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
        $result  = $this->db->query("SELECT * FROM assetcategory WHERE assetcategoryid='".$id."' ")->row();
        save_query_in_log();
        $this->db->close();
        return $result;
    }

     public function update($data)
    {
        $this->db->reconnect();
        $result = $this->db->query("
                                    UPDATE assetcategory
                                    SET
                                        assetcategoryname = '".$data['assetcategoryname']."',
                                        modified_on       = '".$data['modified_on']."',
                                        modified_by       = '".$data['modified_by']."' 
                                    WHERE
                                        assetcategoryid   = '".$data['assetcategoryid']."'
                                ");
        save_query_in_log();
        $this->db->close();
        return $result;
    }

    // To delete assetcategory
    public function assetcategory_delete($uid)
    {
        $this->db->reconnect();
        $result  = $this->db->query("UPDATE assetcategory SET STATUS = '2' WHERE assetcategoryid = '".$uid."'");
        save_query_in_log();
        $this->db->close();
        return $result;
    } 


    


}
?>                        