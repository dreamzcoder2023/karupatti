<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/***************************************************************
    Purpose : To handle all the Department database details 2022-08-19
****************************************************************/
class Productcategory_model extends CI_Model
{
    //public $other_db;    
    function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Calcutta'); 
    }

    // To get department list
    public function get_products_list()
    {
        $this->db->reconnect();
        $result  = $this->db->query("SELECT * FROM PRODUCT_CATEGORY")->result_array();
        save_query_in_log();
        $this->db->close();
        return $result;
    }

    // // To get Unit Details using PRODUCTS
    // public function get_unit_list()
    // {
    //     $this->db->reconnect();
    //     $result  = $this->db->query("SELECT * FROM UNITS")->result_array();
    //     save_query_in_log();
    //     $this->db->close();
    //     return $result;
    // }

    
    // public function get_category_list()
    // {
    //     $this->db->reconnect();
    //     $result  = $this->db->query("SELECT * FROM CATEGORY")->result_array();
    //     save_query_in_log();
    //     $this->db->close();
    //     return $result;
    // }

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
        $result  = $this->db->query("SELECT KEYVALUE FROM KEYMASTER WHERE KEYNAME='PRODUCT_CATEGORY';")->row();
        //$result  = $this->db->query("SELECT CATEGORY_ID FROM KEYMASTER WHERE KEYNAME='PRODUCTS';")->row();
        save_query_in_log();
        $this->db->close(); 
        return $result;
    }


    public function productcategory_active($data,$id)
    {
        $this->db->reconnect();
        $result = $this->db->query("UPDATE PRODUCT_CATEGORY SET Status = '".$data['Status']."' WHERE CATEGORY_ID = '".$id."'");
        save_query_in_log();
        $this->db->close();
        return $result;
    }

    // To add new product Category
    public function add_productcategory($data)
    {
        $this->db->reconnect();
        $result  = $this->db->query("INSERT INTO PRODUCT_CATEGORY (CATEGORY_ID,
            CATEGORY_NAME,
            STATUS,
            CREATED_ON,
            CREATED_BY) VALUES('".$data['cat_id']."',
            '".$data['category_name']."',
            'Y',
            '".$data['created_on']."',
            '".$data['created_by']."'
            )");
        // print_r($result);exit();
        save_query_in_log();
        $this->db->close(); 
        return $result;
    }


    public function get_updated_keyvalue()
    {
        $this->db->reconnect();

        // $result  = $this->db->query("UPDATE KEYMASTER SET KEYVALUE = '".$uid."' WHERE KEYNAME = '`SUPPLIERS'");
        $result = $this->db->query("UPDATE KEYMASTER SET KEYVALUE=KEYVALUE+1 WHERE KEYNAME='PRODUCT_CATEGORY'");
        save_query_in_log();
        $this->db->close(); 
        return $result;
    }

    // To delete products
    public function productcategory_delete($sno)
    {
        $this->db->reconnect();
        $result  = $this->db->query("DELETE FROM PRODUCT_CATEGORY WHERE CATEGORY_ID = '".$sno."'");
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
    public function get_product_category_id($pdid)
    {
        $this->db->reconnect();
        $result  = $this->db->query("SELECT * FROM PRODUCT_CATEGORY WHERE CATEGORY_ID = '".$pdid."'")->row();
        save_query_in_log();
        $this->db->close();
        return $result;
    }


    // To update Products
  
    public function update_productcategory($data)
    {
        $result = $this->db->query("UPDATE PRODUCT_CATEGORY SET 

            CATEGORY_NAME='".$data['prodcategory_name']."',
            MODIFIED_ON='".$data['modified_on_edit']."',
            MODIFIED_BY='".$data['added_user_edit']."'
            WHERE CATEGORY_ID = '".$data['prodcategory_edit']."'");
            save_query_in_log();
            $this->db->close();
            return $result;
    }


}

?>                   