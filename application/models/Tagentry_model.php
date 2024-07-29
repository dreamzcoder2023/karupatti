<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/***************************************************************
    Purpose : To handle all the Department database details 2022-08-19
****************************************************************/
class Tagentry_model extends CI_Model
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
        $result  = $this->other_db->query("SELECT *FROM ACC_LEDGERS WHERE GROUP_NAME='SUPPLIERS' ORDER BY LEDGER_NAME;")->result_array();
        save_query_in_log();
        $this->other_db->close();

        //print_r($result);exit();
        return $result;
    }

    
    public function get_banks_list()
    {
        $this->db->reconnect();
        $result  = $this->db->query("SELECT * FROM BANKS")->result_array();
        save_query_in_log();
        $this->db->close();
        return $result;
    }

   
    public function get_itemname_list()
    {
        $this->db->reconnect();
        $result  = $this->db->query("SELECT DISTINCT ITEM_NAME FROM PURCHASE_ENTRY")->result_array();
        save_query_in_log();
        $this->db->close();
        return $result;
    }


    public function get_metal_list()
    {
        $this->db->reconnect();
        $result  = $this->db->query("SELECT DISTINCT METAL_TYPE FROM LOTENTRY")->result_array();
        save_query_in_log();
        $this->db->close();
        return $result;
    }

    
    public function get_tagentry_list()
    {
        $this->db->reconnect();
        $result  = $this->db->query("SELECT LOTENTRY.METAL_TYPE,LOTENTRY.ENTRY_DATE, PURCHASE_ENTRY.LOT_ID,PURCHASE_ENTRY.ITEM_NAME,PURCHASE_ENTRY.SUBITEM_NAME,PURCHASE_ENTRY.CHK_TAG,PURCHASE_ENTRY.SNO FROM PURCHASE_ENTRY,LOTENTRY WHERE PURCHASE_ENTRY.LOT_ID = LOTENTRY.LOT_ID;")->result_array();
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

    public function tag_entry_selection($date,$metal_type,$item_name)
    {
        

        $this->db->reconnect();

        $result = $this->db->query("SELECT LOTENTRY.METAL_TYPE,LOTENTRY.ENTRY_DATE, LOTENTRY.ITEM_NAME, PURCHASE_ENTRY.LOT_ID,PURCHASE_ENTRY.ITEM_NAME,PURCHASE_ENTRY.SUBITEM_NAME,PURCHASE_ENTRY.CHK_TAG,PURCHASE_ENTRY.SNO FROM PURCHASE_ENTRY,LOTENTRY WHERE PURCHASE_ENTRY.LOT_ID = LOTENTRY.LOT_ID $date $metal_type $item_name")->result_array();
        save_query_in_log();     
        $this->db->close();
        return $result;
   } 


    public function tag_active($data,$ids)
    {
        
        //print_r($ids);exit();
        foreach($ids as $id){

        $this->db->reconnect();

        $result = $this->db->query("UPDATE PURCHASE_ENTRY SET CHK_TAG = '".$data."' WHERE SNO = '".$id."'");
        save_query_in_log();
        
        }
        $this->db->close();
         return $result;
   } 

}

?>                   