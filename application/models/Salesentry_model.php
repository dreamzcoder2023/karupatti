<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/***************************************************************
    Purpose : To handle all the Department database details 2022-08-19
****************************************************************/
class Salesentry_model extends CI_Model
{
     public $other_db;    
    function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Calcutta'); 
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
    

    // To get Lotentry details by sno
    public function get_last_sno_details()
    {
        $this->db->reconnect();
        // $result  = $this->db->query("SELECT TOP 1 * FROM PRODUCTS ORDER BY ITEM_SNO DESC")->row();
        $result  = $this->db->query("SELECT * FROM LOTENTRY ORDER BY LOT_ID DESC")->row();
        save_query_in_log();
        $this->db->close(); 
        return $result;
    }


    public function lotentry_active($data,$id)
    {
        $this->db->reconnect();
        $result = $this->db->query("UPDATE LOTENTRY SET STATUS = '".$data['status']."' WHERE LOT_ID = '".$id."'");
        save_query_in_log();
        $this->db->close();
        return $result;
    }

    // To add new Lotentry
    public function add_purchase_entry($data)
    {  
        $this->db->reconnect(); 
       $i=0; 
       foreach ($data['item_name'] as $key => $value) {
           
        $last_sno_detail = $this->db->query("SELECT * FROM PURCHASE_ENTRY ORDER BY SNO DESC")->row();
  
        $last_data= $last_sno_detail->SNO;
        //echo $last_data;exit;
        //$exlno = substr($last_data,5);
        $next_value = (int)$last_data + 1;
        $uid=str_pad($next_value,3,0,STR_PAD_LEFT);
        //$s_no=$r_no1;
        $data['pur_id'] = $uid;
        //print_r($data);exit;
            

            $result  = $this->db->query("INSERT INTO PURCHASE_ENTRY (SNO,
            ITEM_NAME,
            SUBITEM_NAME,
            METAL_TYPE,
            COUNT,
            PURITY,
            WEIGHT,
            ENTRY_DATE,
            CREATED_ON,
            CREATED_BY,
            STATUS,
            LOT_ID
            ) VALUES('".$data['pur_id']."',
            '".$value."',
            '".$data['subitem_name'][$i]."',
            '".$data['metal_table']."',
            '".$data['count_table'][$i]."',
            '".$data['purity_table'][$i]."',
            '".$data['weight_table'][$i]."',
            '".$data['entry_date']."',
            '".$data['created_on']."',
            '".$data['added_user']."',
            '".$data['status']."',
            '".$data['lot_id']."')");
        //print_r($result);exit();  
        save_query_in_log();
       
        $i++;

       }
           $this->db->close(); 
          return $result;

        //$emptyRemoved = remove_empty($data['item_name']);

        
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

    public function get_purchaseentry_view($lot_vw)
    {
        $this->db->reconnect();
        $result  = $this->db->query("SELECT * FROM LOTENTRY WHERE LOT_ID = '".$lot_vw."'")->row();
        // print_r($result);exit();
        save_query_in_log();
        $this->db->close();
        return $result;
    }

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
}

?>                   