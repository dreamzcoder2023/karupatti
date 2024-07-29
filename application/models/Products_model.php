<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/***************************************************************
    Purpose : To handle all the Department database details 2022-08-19
****************************************************************/
class Products_model extends CI_Model
{
    public $other_db;    
    function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Calcutta'); 
    }

    // To get department list
    public function get_products_list()
    {
        $this->db->reconnect();
        $result  = $this->db->query("SELECT * FROM PRODUCTS ORDER BY ITEM_SNO DESC")->result_array();
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

    public function get_fin_years_list()
    {
        $this->db->reconnect();
        $result  = $this->db->query("SELECT TOP 1 * FROM FIN_YEARS  WHERE STATUS='Y' ORDER BY ID DESC")->row();
        save_query_in_log();
        $this->db->close();
        return $result;
    }
    
    // public function  get_company_list_add()
    // {
    //     $this->db->reconnect();
    //     // $result  = $this->db->query("SELECT U.ACTIVECOMPANY FROM USERLIST U LEFT JOIN PRODUCTS P ON U.ACTIVECOMPANY=P.COMPANYCODE WHERE COMPANYCODE = '".$ccode."'")->row();
    //     $result  = $this->db->query("SELECT * from COMPANY")->row();
    //     save_query_in_log();
    //     $this->db->close();
    //     return $result;   
    // }
    
    // To get Product details by sno
    public function get_last_sno_details()
    {
        $this->other_db->reconnect();
        // $result  = $this->db->query("SELECT TOP 1 * FROM PRODUCTS ORDER BY ITEM_SNO DESC")->row();
        $result  = $this->other_db->query("SELECT KEYVALUE FROM KEYMASTER WHERE KEYNAME='PRODUCTS';")->row();
        save_query_in_log();
        $this->other_db->close(); 
        return $result;
    }



    public function products_active($data,$id)
    {
        $this->db->reconnect();
        $result = $this->db->query("UPDATE PRODUCTS SET Status = '".$data['Status']."'WHERE ITEM_SNO = '".$id."'");
        save_query_in_log();
        $this->db->close();
        return $result;
    }

    // To add new products
    public function add_products($data)
    {
        $this->db->reconnect();
        $result  = $this->db->query("INSERT INTO PRODUCTS (ITEM_SNO,
            ITEM_CODE,
            ITEM_NAME,
            METAL,
            UNIT_NAME,
            CATEGORY,
            PURCHASE_RATE,
            SALES_RATE,
            HSN_CODE,
            OP_QTY,
            OP_RATE,
            OP_VALUE,
            STOCK_QTY,
            CLOSING_RATE,
            CLOSING_VALUE,
            PURCHASE_GST,
            COMPANYCODE,
            ADDED_USER,
            ADDED_TIME,
            Status,
            Remarks) VALUES('".$data['prod_id']."',
            '".$data['prod_code']."',
            '".$data['prod_name']."',
            '".$data['prod_metal']."',
            '".$data['prod_unit']."',
            '".$data['prod_category']."',
            '".$data['prod_pur_rate']."',
            '".$data['sales_rate']."',
            '".$data['prod_hsn']."',
            '".$data['prod_op_stk']."',
            '".$data['prod_op_rate']."',
            '".$data['prod_op_val']."',
            '".$data['prod_curr_stk']."',
            '".$data['prod_rate']."',
            '".$data['prod_curr_val']."',
            '".$data['prod_gst']."',
            '".$data['company_code']."',
            '".$data['added_user']."',
            '".$data['created_on']."',
            'Y',
            '".$data['prod_rmks']."')");
        // print_r($result);exit();
        save_query_in_log();
        $this->db->close(); 
        return $result;
    }

    // To delete products
    public function products_delete($sno)
    {
        $this->db->reconnect();
        // $result  = $this->db->query("UPDATE SYSTEMS SET STATUS = '2' WHERE SYS_ID = '".$sys_id."'");
        $result  = $this->db->query("DELETE FROM PRODUCTS  WHERE ITEM_SNO = '".$sno."'");
        save_query_in_log();
        $this->db->close();
        return $result;
    }

    public function get_products_view($pd_vw)
    {
        $this->db->reconnect();
        $result  = $this->db->query("SELECT * FROM PRODUCTS WHERE ITEM_SNO = '".$pd_vw."'")->row();
        // print_r($result);exit();
        save_query_in_log();
        $this->db->close();
        return $result;
    }

    // To get Product details by Products ID
    public function get_prod_by_sno($did)
    {
        $this->db->reconnect();
        $result  = $this->db->query("SELECT * FROM PRODUCTS WHERE ITEM_SNO = '".$did."'")->row();
        save_query_in_log();
        $this->db->close();
        return $result;
    }

    // To get Product details by Productid
    public function get_product_details_id($pdid)
    {
        $this->db->reconnect();
        $result  = $this->db->query("SELECT * FROM PRODUCTS WHERE ITEM_SNO = '".$pdid."'")->row();
        save_query_in_log();
        $this->db->close();
        return $result;
    }


    // To update Products
  
    public function update_products($data)
    {
        $result = $this->db->query("UPDATE PRODUCTS SET 

            ITEM_CODE='".$data['prod_code_edit']."',
            ITEM_NAME='".$data['prod_name_edit']."',
            METAL='".$data['prod_metal_edit']."',
            UNIT_NAME='".$data['prod_unit_edit']."',
            CATEGORY='".$data['prod_category_edit']."',
            PURCHASE_RATE='".$data['prod_pur_rate_edit']."',
            SALES_RATE='".$data['sales_rate_edit']."',
            HSN_CODE='".$data['prod_hsn_edit']."',
            OP_QTY='".$data['prod_op_stk_edit']."',
            OP_RATE='".$data['prod_op_rate_edit']."',
            OP_VALUE='".$data['prod_op_val_edit']."',
            STOCK_QTY='".$data['prod_curr_stk_edit']."',
            CLOSING_RATE='".$data['prod_rate_edit']."',
            CLOSING_VALUE='".$data['prod_curr_val_edit']."',
            PURCHASE_GST='".$data['prod_gst_edit']."',
            Remarks='".$data['prod_rmks_edit']."',
            ADDED_USER='".$data['added_user_edit']."',
            COMPANYCODE='".$data['company_code_edit']."',
            ADDED_TIME='".$data['modified_on_edit']."'  WHERE ITEM_SNO = '".$data['edit_products']."'");
            save_query_in_log();
            $this->db->close();
            return $result;
    }


}

?>                   