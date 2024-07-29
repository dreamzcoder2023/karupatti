<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/***************************************************************
    Purpose : To handle all the Itempurity database details 2022-08-19
****************************************************************/
class Itempurity_model extends CI_Model
{
  function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Calcutta'); 
    }

    // To get item_purity list
    public function get_item_purity_list()
    {
        $this->db->reconnect();
        $result  = $this->db->query("SELECT * FROM ITEMPURITY WHERE STATUS!=2 ORDER BY ITEMPURITYID DESC")->result_array();
        save_query_in_log();
        $this->db->close();
        return $result;
    }

    // To get item_purity unique
    public function item_purity_unique($val)
    {
        $this->db->reconnect();
        $result  = $this->db->query("SELECT * FROM ITEMPURITY WHERE ITEMPURITYNAME = '".$val."' AND STATUS!=2")->row();
        save_query_in_log();
        $this->db->close();
        return $result;
    }

    // To add item_purity
    public function add_item_purity($data)
    {
        $this->db->reconnect();
    //    print_r($data['item_purity_percentage']);exit;
        $result  = $this->db->query("INSERT INTO ITEMPURITY (ITEMPURITYNAME,PERCENTAGE,CREATEDBY,CREATEDON,STATUS)VALUES ('".$data['item_purity']."','".$data['item_purity_percentage']."','".$data['created_by']."','".$data['created_on']."','".$data['status']."')");
        save_query_in_log();
        $this->db->close();
        return $result;
    }

    // To get last item_purity details
    public function get_last_item_purity_details()
    {
        $this->db->reconnect();
        $result  = $this->db->query("SELECT TOP 1 * FROM ITEMPURITY ORDER BY ITEMPURITYID DESC")->row();
        save_query_in_log();
        $this->db->close();
        return $result;
    }

    // To get item_purity details by item_purity id
    public function get_item_purity_by_item_purity_id($did)
    {
        $this->db->reconnect();
        $result  = $this->db->query("SELECT * FROM ITEMPURITY WHERE ITEMPURITYID = '".$did."'")->row();
        save_query_in_log();
        $this->db->close();
        return $result;
    }

    // To get item_purity unique edit
    public function item_purity_unique_edit($val,$dcid)
    {
        $this->db->reconnect();
        $result  = $this->db->query("SELECT * FROM ITEMPURITY WHERE ITEMPURITYNAME = '".$val."' AND ITEMPURITYID != '".$dcid."' AND STATUS!=2")->row();
        save_query_in_log();
        $this->db->close();
        return $result;
    }

    // To update item_purity
    public function update_item_purity($data)
    {
        $this->db->reconnect();
        $result  = $this->db->query("UPDATE ITEMPURITY SET ITEMPURITYNAME = '".$data['item_purity']."',PERCENTAGE = '".$data['item_percentage']."',MODIFIEDON = '".$data['modified_on']."',MODIFIEDBY = '".$data['modified_by']."' WHERE ITEMPURITYID = '".$data['sno']."'");
        save_query_in_log();
        $this->db->close();
        return $result;
    }

    // To delete item_purity
    public function item_purity_delete($uid)
    {
        $this->db->reconnect();
        $result  = $this->db->query("UPDATE ITEMPURITY SET STATUS = '2' WHERE ITEMPURITYID = '".$uid."'");
        save_query_in_log();
        $this->db->close();
        return $result;
    }


}
?>                        