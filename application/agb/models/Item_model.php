<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/***************************************************************
    Purpose : To handle all the Item database details 2022-08-19
****************************************************************/
class Item_model extends CI_Model
{
  function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Calcutta'); 
    }


    public function get_unit_list()
    {
        $this->db->reconnect();
        $result  = $this->db->query("SELECT * FROM UNITS")->result_array();
        save_query_in_log();
        $this->db->close();
        return $result;
    }

    
    public function get_category_list()
    {
        $this->db->reconnect();
        $result  = $this->db->query("SELECT * FROM CATEGORY")->result_array();
        save_query_in_log();
        $this->db->close();
        return $result;
    }

    // To get item list
    public function get_item_list()
    {
        $this->db->reconnect();
        $result  = $this->db->query("SELECT * FROM ITEMS ")->result_array();
        save_query_in_log();
        $this->db->close();
        return $result;
    }

    // To get item unique
    public function item_unique($val)
    {
        $this->db->reconnect();
        $result  = $this->db->query("SELECT * FROM ITEMS WHERE ITEMNAME = '".$val."'")->row();
        save_query_in_log();
        $this->db->close();
        return $result;
    }

    // To add item
    public function add_item($data)
    {
        $this->db->reconnect();
        $result  = $this->db->query("INSERT INTO ITEMS (SNO,ITEMNAME,jewel_type_id,STATUS,CREATED_ON
        ,CREATED_BY
        )VALUES ('".$data['sno']."','".$data['Name_item']."','".$data['item_type']."','".$data['status']."','".$data['created_on']."','".$data['created_by']."')");
        save_query_in_log();
        $this->db->close();
        return $result;
    }

    // To get last item details
    public function get_last_item_details()
    {
        $this->db->reconnect();
        $result  = $this->db->query("SELECT TOP 1 * FROM ITEMS ORDER BY SNO DESC")->row();
        save_query_in_log();
        $this->db->close();
        return $result;
    }

    // // To get last item code details
    // public function get_last_item_code_details()
    // {
    //     $this->db->reconnect();
    //     $result  = $this->db->query("SELECT TOP 1 * FROM ITEMS ORDER BY ITEM_CODE DESC")->row();
    //     save_query_in_log();
    //     $this->db->close();
    //     return $result;
    // }

    public function Item_active($data,$id)
    {
        $this->db->reconnect();
        $result = $this->db->query("UPDATE ITEMS SET STATUS = '".$data['status']."' WHERE ITEMNAME = '".$id."'");
        save_query_in_log();
        $this->db->close();
        return $result;
    }

    // To get item details by item id
    public function get_item_by_item_id($did)
    {
        $this->db->reconnect();
        $result  = $this->db->query("SELECT * FROM ITEMS WHERE SNO = '".$did."'")->row();
        save_query_in_log();
        $this->db->close();
        return $result;
    }

    // To get item unique edit
    public function item_unique_edit($val,$dcid)
    {
        $this->db->reconnect();
        $result  = $this->db->query("SELECT * FROM ITEMS WHERE ITEMNAME = '".$val."' AND SNO != '".$dcid."'")->row();
        save_query_in_log();
        $this->db->close();
        return $result;
    }

    // To update item 
    public function update_item($data)
    {
        $this->db->reconnect();
        $result  = $this->db->query("UPDATE ITEMS SET 
            ITEMNAME = '".$data['name_item_edit']."', 
          
            jewel_type_id = '".$data['item_type_edit']."'
            
            WHERE SNO = '".$data['sno_edit']."'");
        save_query_in_log();
        $this->db->close();
        return $result;
    }

    // To delete item
    public function item_delete($uid)
    {
        $this->db->reconnect();
        $result  = $this->db->query("DELETE FROM ITEMS WHERE SNO = '".$uid."'");
        save_query_in_log();
        $this->db->close();
        return $result;
    }


}
?>                        