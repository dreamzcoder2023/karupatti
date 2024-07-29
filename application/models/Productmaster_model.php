<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/***************************************************************
    Purpose : To handle all the Department database details 2022-08-19
****************************************************************/
class Productmaster_model extends CI_Model
{
    // public $other_db;    
    function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Calcutta'); 
    }

    // To get department list
    public function get_products_list()
    {
        $this->db->reconnect();
        $result  = $this->db->query("SELECT * FROM PRODUCT_MASTER ORDER BY PRODUCT_ID ASC")->result_array();
        save_query_in_log();
        $this->db->close();
        return $result;
    }

    // To get Unit Details using PRODUCTS
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

    // public function get_fin_years_list()
    // {
    //     $this->db->reconnect();
    //     $result  = $this->db->query("SELECT TOP 1 * FROM FIN_YEARS  WHERE STATUS='Y' ORDER BY ID DESC")->row();
    //     save_query_in_log();
    //     $this->db->close();
    //     return $result;
    // }
    
    // // public function  get_company_list_add()
    // // {
    // //     $this->db->reconnect();
    // //     // $result  = $this->db->query("SELECT U.ACTIVECOMPANY FROM USERLIST U LEFT JOIN PRODUCTS P ON U.ACTIVECOMPANY=P.COMPANYCODE WHERE COMPANYCODE = '".$ccode."'")->row();
    // //     $result  = $this->db->query("SELECT * from COMPANY")->row();
    // //     save_query_in_log();
    // //     $this->db->close();
    // //     return $result;   
    // // }
    
    // To get Product details by sno
    public function get_last_sno_details()
    {
        $this->db->reconnect();
        // $result  = $this->db->query("SELECT TOP 1 * FROM PRODUCTS ORDER BY ITEM_SNO DESC")->row();
        $result  = $this->db->query("SELECT KEYVALUE FROM KEYMASTER WHERE KEYNAME='PRODUCT_MASTER';")->row();
        save_query_in_log();
        $this->db->close(); 
        return $result;
    }


    public function products_active($data,$id)
    {
        $this->db->reconnect();
        $result = $this->db->query("UPDATE PRODUCT_MASTER SET STATUS = '".$data['status']."' WHERE PRODUCT_ID = '".$id."'");
        save_query_in_log();
        $this->db->close();
        return $result;
    }

    // To add new product_master
    public function add_productmaster($data)
    {
        $this->db->reconnect();
        $result  = $this->db->query("INSERT INTO PRODUCT_MASTER (PRODUCT_ID,
            ITEM_CODE,
            ITEM_NAME,
            METAL_TYPE,
            UNIT_TYPE,
            CATEGORY_NAME,
            CREATED_ON,
            CREATED_BY,
            STATUS
            ) VALUES('".$data['prod_id']."',
            '".$data['add_itcode_prodmaster']."',
            '".$data['add_Iname_prodmaster']."',
            '".$data['add_mty_prodmaster']."',
            '".$data['add_uty_prodmaster']."',
            '".$data['add_cty_prodmaster']."',
            '".$data['created_on']."',
            '".$data['added_user']."',
            'Y')");
        // print_r($result);exit();
        save_query_in_log();
        $this->db->close(); 
        return $result;
    }


    public function get_updated_keyvalue()
    {
        $this->db->reconnect();

        $res = $this->db->query("UPDATE KEYMASTER SET KEYVALUE=KEYVALUE+1 WHERE KEYNAME='PRODUCT_MASTER'");
        save_query_in_log();
        $this->db->close(); 
        return $res;
    }


    // To delete products
    public function productmaster_delete($sno)
    {
        $this->db->reconnect();
        // $result  = $this->db->query("UPDATE SYSTEMS SET STATUS = '2' WHERE SYS_ID = '".$sys_id."'");
        $result  = $this->db->query("DELETE FROM PRODUCT_MASTER WHERE PRODUCT_ID = '".$sno."'");
        save_query_in_log();
        $this->db->close();
        return $result;
    }

    public function get_products_view($pd_vw)
    {
        $this->db->reconnect();
        $result  = $this->db->query("SELECT * FROM PRODUCT_MASTER WHERE PRODUCT_ID = '".$pd_vw."'")->row();
        // print_r($result);exit();
        save_query_in_log();
        $this->db->close();
        return $result;
    }

    // // To get Product details by Products ID
    // public function get_prod_by_sno($did)
    // {
    //     $this->db->reconnect();
    //     $result  = $this->db->query("SELECT * FROM PRODUCTS WHERE ITEM_SNO = '".$did."'")->row();
    //     save_query_in_log();
    //     $this->db->close();
    //     return $result;
    // }

    // To get Product details by Productid
    public function get_product_details_id($pdid)
    {
        $this->db->reconnect();
        $result  = $this->db->query("SELECT * FROM PRODUCT_MASTER WHERE PRODUCT_ID = '".$pdid."'")->row();
        save_query_in_log();
        $this->db->close();
        return $result;
    }


    // To update Product Master
  
    public function update_productmaster($data)
    {
        $result = $this->db->query("UPDATE PRODUCT_MASTER SET 

            ITEM_CODE='".$data['edit_itcode_prodmaster']."',
            ITEM_NAME='".$data['edit_Iname_prodmaster']."',
            METAL_TYPE='".$data['edit_metal_prodmaster']."',
            UNIT_TYPE='".$data['edit_unit_prodmaster']."',
            CATEGORY_NAME='".$data['edit_cty_prodmaster']."',
            MODIFIED_BY='".$data['added_user_edit']."',
            MODIFIED_ON='".$data['modified_on_edit']."'  WHERE PRODUCT_ID = '".$data['edit_pid_prodmaster']."'");
            save_query_in_log();
            $this->db->close();
            return $result;
    }


}

?>                   