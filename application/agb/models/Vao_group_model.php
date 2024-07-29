<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/***************************************************************
    Purpose : To handle all the Item database details 2022-08-19
****************************************************************/
class Vao_group_model extends CI_Model
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
    public function get_vao_list()
    {
        $this->db->reconnect();
        $result  = $this->db->query("SELECT * FROM VAO_GROUP WHERE STATUS!='D' ORDER BY SNO DESC")->result_array();
        save_query_in_log();
        $this->db->close();
        return $result;
    }

    // To get item unique
    public function item_unique($val)
    {
        $this->db->reconnect();
        $result  = $this->db->query("SELECT * FROM VAO_GROUP WHERE VAO_NAME = '".$val."'")->row();
        save_query_in_log();
        $this->db->close();
        return $result;
    }

    // To add ite m   = '".$data['hsn_code_no']."',
    public function add_vao($data)
    {
        $this->db->reconnect();
        $result  = $this->db->query("INSERT INTO VAO_GROUP (VAO_GID
           ,VAO_NAME
           ,STATUS
           ,CREATED_ON
           ,CREATED_BY
          

             

        )VALUES ('".$data['vao_id']."','".$data['VAO_NAME']."','".$data['status']."','".$data['created_on']."','".$data['created_by']."')");


        save_query_in_log();
        $this->db->close();
        return $result;
    }

    // To get last item details
    public function get_last_vao_details()
    {
        $this->db->reconnect();
        $result  = $this->db->query("SELECT TOP 1 * FROM VAO_GROUP ORDER BY SNO DESC")->row();
        save_query_in_log();
        $this->db->close();
        return $result;
    }

    // // To get last item code details
    // public function get_last_item_code_details()
    // {
    //     $this->db->reconnect();
    //     $result  = $this->db->query("SELECT TOP 1 * FROM VAO_GROUP ORDER BY ITEM_CODE DESC")->row();
    //     save_query_in_log();
    //     $this->db->close();
    //     return $result;
    // }

    public function Item_active($data,$id)
    {
        $this->db->reconnect();
        $result = $this->db->query("UPDATE VAO_GROUP SET STATUS = '".$data['status']."' WHERE VAO_NAME = '".$id."'");
        save_query_in_log();
        $this->db->close();
        return $result;
    }

    // To get item details by item id
    public function get_vao_by_vao_id($did)
    {
        $this->db->reconnect();
        $result  = $this->db->query("SELECT * FROM VAO_GROUP WHERE SNO = '".$did."'")->row();
        save_query_in_log();
        $this->db->close();
        return $result;
    }

    // To get item unique edit
    public function item_unique_edit($val,$dcid)
    {
        $this->db->reconnect();
        $result  = $this->db->query("SELECT * FROM VAO_GROUP WHERE VAO_NAME = '".$val."' AND SNO != '".$dcid."'")->row();
        save_query_in_log();
        $this->db->close();
        return $result;
    }

    // To update item 
    public function update_vao($data)
    {
        $this->db->reconnect();
        $result  = $this->db->query("UPDATE VAO_GROUP SET 

           

            VAO_NAME = '".$data['vao_ed_name']."'  WHERE SNO = '".$data['sno_edit']."' ");
        save_query_in_log();
        $this->db->close();
        return $result;
    }

    // To delete item
    public function vao_delete($uid)
    {
        $this->db->reconnect();
        $result  = $this->db->query("UPDATE VAO_GROUP SET STATUS = 'D' WHERE SNO = '".$uid."'");
        save_query_in_log();
        $this->db->close();
        return $result;
    }


}
?>                        