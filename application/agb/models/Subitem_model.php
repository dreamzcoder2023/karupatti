<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/***************************************************************
    Purpose : To handle all the Item database details 2022-08-19
****************************************************************/
class Subitem_model extends CI_Model
{
  function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Calcutta'); 
    }


    public function get_item_name_list()
    {
        $this->db->reconnect();
        $result  = $this->db->query("SELECT * FROM ITEMS ")->result_array();
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
    public function get_Subitem_list()
    {
        $this->db->reconnect();
        $result  = $this->db->query("SELECT * FROM SUBITEM_LIST ORDER BY SUB_ID DESC")->result_array();
        //$result  = $this->db->query("SELECT ITEMS.*,SUBITEM_LIST.SUB_ID,SUBITEM_LIST.ITEM_NAME,SUBITEM_LIST.SUBITEM_CATEGORY,SUBITEM_LIST.SUBITEM_NAME FROM SUBITEM_LIST,ITEMS WHERE SUBITEM_LIST.ITEM_NAME=ITEMS.ITEMNAME ORDER BY SUBITEM_LIST.SUB_ID DESC")->result_array();
        save_query_in_log();
        $this->db->close();
        return $result;
    }

    // // To get item unique
    // public function item_unique($val)
    // {
    //     $this->db->reconnect();
    //     $result  = $this->db->query("SELECT * FROM ITEMS WHERE ITEMNAME = '".$val."'")->row();
    //     save_query_in_log();
    //     $this->db->close();
    //     return $result;
    // }


    // To get item details by item id
    public function get_Subitem_category()
    {
        $this->db->reconnect();
        $result  = $this->db->query("SELECT * FROM SUBITEM_LIST");
        save_query_in_log();
        $this->db->close();
        return $result;
    }


    // To add item
    public function add_subitem($data)
    {
        $this->db->reconnect();
        // print_r("INSERT INTO SUBITEM_LIST (SUB_ID,item_id,jewel_type_id,SUBITEM_NAME,CREATED_ON,CREATED_BY,STATUS)VALUES ('".$data['sno']."','".$data['item_type']."','".$data['itemname_sub']."','".$data['Subitemname_sub']."','".$data['created_on']."','".$data['created_by']."','".$data['status']."')");exit;
        $result  = $this->db->query("INSERT INTO SUBITEM_LIST (SUB_ID,item_id,jewel_type_id,SUBITEM_NAME,CREATED_ON,CREATED_BY,STATUS)VALUES ('".$data['sno']."','".$data['itemname_sub']."','".$data['item_type']."','".$data['Subitemname_sub']."','".$data['created_on']."','".$data['created_by']."','".$data['status']."')");
        save_query_in_log();
        $this->db->close();
        return $result;
    }

    // To get last item details
    public function get_last_item_details()
    {
        $this->db->reconnect();
        $result  = $this->db->query("SELECT TOP 1 * FROM SUBITEM_LIST ORDER BY SUB_ID DESC")->row();
        save_query_in_log();
        $this->db->close();
        return $result;
    }


    public function Subitem_active($data,$id)
    {
        $this->db->reconnect();
        $result = $this->db->query("UPDATE SUBITEM_LIST SET STATUS = '".$data['status']."' WHERE SUB_ID = '".$id."'");
        save_query_in_log();
        $this->db->close();
        return $result;
    }

    // To get item details by item id
    public function get_item_by_item_id($did)
    {
        $this->db->reconnect();
        $result  = $this->db->query("SELECT * FROM SUBITEM_LIST WHERE SUB_ID = '".$did."'")->row();
        save_query_in_log();
        $this->db->close();
        return $result;
    }



    // // To get item unique edit
    // public function item_unique_edit($val,$dcid)
    // {
    //     $this->db->reconnect();
    //     $result  = $this->db->query("SELECT * FROM ITEMS WHERE ITEMNAME = '".$val."' AND SNO != '".$dcid."'")->row();
    //     save_query_in_log();
    //     $this->db->close();
    //     return $result;
    // }

    // To update item
    public function update_subitem($data)
    {
        $this->db->reconnect();
        $result  = $this->db->query("UPDATE SUBITEM_LIST SET 
            jewel_type_id = '".$data['item_type_edit']."',
            item_id = '".$data['itemname_sub_edit']."', 
            SUBITEM_NAME = '".$data['subitemname_edit']."',
           
            MODIFIED_ON = '".$data['modified_on']."',
            MODIFIED_BY = '".$data['modified_by']."'
            WHERE SUB_ID = '".$data['sno_edit']."'");
        save_query_in_log();
        $this->db->close();
        return $result;
    }

    // To delete item
    public function Subitem_delete($uid)
    {
        $this->db->reconnect();
        $result  = $this->db->query("DELETE FROM SUBITEM_LIST WHERE SUB_ID = '".$uid."'");
        save_query_in_log();
        $this->db->close();
        return $result;
    }


}
?>                        