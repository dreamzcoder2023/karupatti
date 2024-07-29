<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/***************************************************************
    Purpose : To handle all the Department database details 2022-08-19
****************************************************************/
class Sales_quotation_model extends CI_Model
{
    public $other_db;    
    function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Calcutta'); 
    }

    public function getParty($search)
    {
        $query = $this->db->query("SELECT TOP 25 * from PARTIES where ( PHONE LIKE '".$search.'%'."' OR NAME LIKE '".$search.'%'."')  ");
        $result = $query->result();
        save_query_in_log();
        return $result;
    }

    
    public function get_supplier_name_list()
    {
        $this->other_db->reconnect();
        $result  = $this->other_db->query("SELECT * FROM ACC_LEDGERS WHERE GROUP_NAME='SUPPLIERS' ORDER BY LEDGER_NAME;")->result_array();
        save_query_in_log();
        $this->other_db->close();

        //print_r($result);exit();
        return $result;
    }

    public function get_supplier_info($id)
    {
        $this->other_db->reconnect();
        $result  = $this->other_db->query("SELECT * FROM ACC_LEDGERS WHERE LEDGER_SNO='".$id."'")->row();
        save_query_in_log();
        $this->other_db->close();

        //print_r($result);exit();
        return $result;
    }


    public function  get_company_list()
    {
        $this->db->reconnect();
        // $result  = $this->db->query("SELECT C.COMPANYNAME ,C.COMPANYCODE,U.* FROM COMPANY C LEFT JOIN USERLIST U ON C.COMPANYCODE=U.ACTIVECOMPANY WHERE U.USERNAME='".$name."' ")->result_array();
        $result  = $this->db->query("SELECT * FROM COMPANY WHERE ACTIVE!='N'")->result_array();
        save_query_in_log();
        $this->db->close();
        return $result;   
    }

    public function  get_tag_list()
    {

        $tag_details  = $this->db->query("SELECT * FROM tag_entry WHERE status='A' AND tag_id IS NOT NULL ")->result_array();
        save_query_in_log();
        $this->db->close();
        return $tag_details; 

    }

    public function  get_tag_item($tag_id)
    {
        $tag_details  = $this->db->query("SELECT * FROM tag_entry WHERE tag_id='".$tag_id."' ")->row();
        save_query_in_log();
        $this->db->close();
        return $tag_details; 
    
    }
    

    public function get_sub_item_list()
    {
        $this->db->reconnect();
        $result  = $this->db->query("SELECT SUBITEM_NAME FROM SUBITEM_LIST")->result_array();
        save_query_in_log();
        $this->db->close();

        //print_r($result);exit();
        return $result;
    }

    public function get_item_list()
    {
        $this->db->reconnect();
        $result  = $this->db->query("SELECT ITEMNAME FROM ITEMS")->result_array();
        save_query_in_log();
        $this->db->close();

        //print_r($result);exit();
        return $result;
    }

    // To get bank Details
    public function get_banks_list()
    {
        $this->db->reconnect();
        $result  = $this->db->query("SELECT DISTINCT BANKNAME FROM BANKS")->result_array();
        save_query_in_log();
        $this->db->close();
        return $result;
    }

    
    public function get_salesentry_list()
    {
        $this->db->reconnect();
        $result  = $this->db->query("SELECT * FROM SALES_ENTRY")->result_array();
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

    public function last_sale_quotation_id()
    {
        $this->db->reconnect();
        $result  = $this->db->query("SELECT * FROM SALES_QUOTATION   ORDER BY ID DESC")->row();
        save_query_in_log();
        $this->db->close();
        return $result;
    }



     // To add new Lotentry
    public function add_quotation_entry($data)
    {  


        $this->db->reconnect(); 
        $result  = $this->db->query("INSERT INTO SALES_QUOTATION (
            QUOT_ID,
            QUOT_DATE,
            QUOT_TYPE,
            PARTY_ID,
            SUPPLIER_ID,
            COMPANY_CODE,
            TAG_ITEMS,
            IS_SALE,
            CREATED_BY,
            CREATED_ON,
            ADDED_USER
            ) 
            VALUES(

                '".$data['quot_id']."',
                '".$data['quot_date']."',
                '".$data['quot_type']."',
                '".$data['party_id']."',
                '".$data['supplier_id']."',
                '".$data['company']."',
                '".$data['tag_items']."',
                '".$data['is_sale']."',
                '".$data['created_by']."',
                '".$data['created_on']."',
                '".$data['added_user']."')");
           
        
        save_query_in_log();
       
        $this->db->close(); 
        return $result;
    }
    

    public function sales_quotation_edit($id)
    {
        $this->db->reconnect();
        $result  = $this->db->query("SELECT * FROM SALES_QUOTATION WHERE ID = '".$id."'")->row();
        // print_r($result);exit();
        save_query_in_log();
        $this->db->close();
        return $result;
    }

    public function delete_tag_item($data)
    {
        $this->db->reconnect(); 

        $delete=$this->db->query("UPDATE SALES_QUOTATION SET 

           
            STATUS ='2' 
            WHERE TAG_ITEMS = '".$data['tag_id']."' AND QUOT_ID = '".$data['quot_id']."' ");        
        
        save_query_in_log();
       
        $this->db->close(); 
        return $delete;
    }

    

    

    public function update_quotation_entry($data)
    {  

        $this->db->reconnect(); 

        $update=$this->db->query("UPDATE SALES_QUOTATION SET 

            QUOT_DATE='".$data['quot_date']."',
            QUOT_TYPE ='".$data['quot_type']."',
            PARTY_ID='".$data['party_id']."',
            SUPPLIER_ID='".$data['supplier_id']."',
            COMPANY_CODE='".$data['company']."',
            TAG_ITEMS='".$data['tag_items']."',  
            MODIFIED_BY='".$data['modified_by']."' ,
            MODIFIED_ON='".$data['modified_on']."' 
            WHERE ID='".$data['id']."'");        
        
        save_query_in_log();
       
        $this->db->close(); 
        return $update;
    }







    public function lotentry_active($data,$id)
    {
        $this->db->reconnect();
        $result = $this->db->query("UPDATE LOTENTRY SET STATUS = '".$data['status']."' WHERE LOT_ID = '".$id."'");
        save_query_in_log();
        $this->db->close();
        return $result;
    }

   


    public function add_product_master($data)
    {
        $this->db->reconnect();
        //print_r($data);exit();
        $res = $this->db->query("INSERT INTO LOTENTRY (LOT_ID,
            SUPPLIER,
            METAL_TYPE,
            ITEM_NAME,
            ITEM_PURITY,
            TOTAL_COUNT,
            TOTAL_WEIGHT,
            CHARGES,
            METAL_AMT,
            PAID_AMOUNT,
            ENTRY_DATE,
            RTGS,
            BANK,
            CHEQUE_BANK,
            BALANCE_AMT,
            CREATED_ON,
            CREATED_BY,
            STATUS
            ) VALUES('".$data['lot_id']."',
            '".$data['supplier_name']."',
            '".$data['metal_type']."',
            '".json_encode($data['all_item_name'])."',
            '".json_encode($data['purity_lot'])."',
            '".$data['all_count']."',
            '".$data['all_weight']."',
            '".$data['other_charges']."',
            '".$data['amount_pay']."',
            '".$data['paid_amount_pay']."',
            '".$data['date']."',
            '".$data['rtgs_pay']."',
            '".$data['bank_rtgs']."',
            '".$data['bank_cheq']."',
            '".$data['bal_amount']."',
            '".$data['created_on']."',
            '".$data['added_user']."',
            '".$data['status']."')");
        save_query_in_log();
        $this->db->close(); 

        return $res;
    }


    // // To delete Lot Entry
    // public function lotentry_delete($sno)
    // {
    //     $this->db->reconnect();
    //     // $result  = $this->db->query("UPDATE SYSTEMS SET STATUS = '2' WHERE SYS_ID = '".$sys_id."'");
    //     $result  = $this->db->query("DELETE FROM LOTENTRY WHERE LOT_ID = '".$sno."'");
    //     save_query_in_log();
    //     $this->db->close();
    //     return $result;
    // }

    

    public function get_items_list_view($lot_vw)
    {   

        $this->db->reconnect();
        $result  = $this->db->query("SELECT * FROM PURCHASE_ENTRY WHERE LOT_ID = '".$lot_vw."'")->row();
        //print_r($result);exit();
        save_query_in_log();
        $this->db->close();
        return $result;
    }

    public function getUsers($search)
    {
       $query = $this->db->query("SELECT * from PARTIES where NAME LIKE '".$search.'%'."'  ");
      
       $result = $query->result();
    
       return $result;
    }


    public function delete_quotation($id){
        $this->db->reconnect(); 

        $update=$this->db->query("UPDATE SALES_QUOTATION SET 
            STATUS='1' 
            WHERE ID='".$id."'");        
        
        save_query_in_log();
       
        $this->db->close(); 
        return $update;
    }
}

?>                   