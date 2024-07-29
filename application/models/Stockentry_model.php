<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/***************************************************************
    Purpose : To handle all the Department database details 2022-08-19
****************************************************************/
class Stockentry_model extends CI_Model
{
    //public $db;    
    function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Calcutta'); 
    }

    // public function get_supplier_name_list()
    // {
    //     $this->other_db->reconnect();
    //     $result  = $this->other_db->query("SELECT *FROM ACC_LEDGERS WHERE GROUP_NAME='SUPPLIERS' ORDER BY LEDGER_NAME;")->result_array();
    //     save_query_in_log();
    //     $this->other_db->close();

    //     //print_r($result);exit();
    //     return $result;
    // }

    // To get bank Details
    public function get_banks_list()
    {
        $this->db->reconnect();
        $result  = $this->db->query("SELECT * FROM BANKS")->result_array();
        save_query_in_log();
        $this->db->close();
        return $result;
    }

    
    // public function get_tagentry_list()
    // {
    //     $this->db->reconnect();
    //     $result  = $this->db->query("SELECT LOTENTRY.METAL_TYPE,LOTENTRY.ENTRY_DATE, PURCHASE_ENTRY.LOT_ID,PURCHASE_ENTRY.ITEM_NAME,PURCHASE_ENTRY.SUBITEM_NAME,PURCHASE_ENTRY.CHK_TAG,PURCHASE_ENTRY.SNO FROM PURCHASE_ENTRY,LOTENTRY WHERE PURCHASE_ENTRY.LOT_ID = LOTENTRY.LOT_ID;")->result_array();
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


   //  public function tag_active($data,$ids)
   //  {
        
   //      //print_r($ids);exit();
   //      foreach($ids as $id){

   //      $this->db->reconnect();

   //      $result = $this->db->query("UPDATE PURCHASE_ENTRY SET CHK_TAG = '".$data."' WHERE SNO = '".$id."'");
   //      save_query_in_log();
        
   //      }
   //      $this->db->close();
   //       return $result;
   // }


    public function get_stockentry_list($date)
    {
        $this->db->reconnect();
        $result  = $this->db->query("SELECT LOTENTRY.METAL_TYPE,LOTENTRY.ENTRY_DATE,LOTENTRY.AUDIT_STATUS, PURCHASE_ENTRY.LOT_ID,PURCHASE_ENTRY.ITEM_NAME,PURCHASE_ENTRY.SUBITEM_NAME,PURCHASE_ENTRY.CHK_TAG,PURCHASE_ENTRY.SNO,PURCHASE_ENTRY.COUNT FROM PURCHASE_ENTRY,LOTENTRY WHERE PURCHASE_ENTRY.LOT_ID = LOTENTRY.LOT_ID AND  CHK_TAG='Y' $date ")->result_array();
        save_query_in_log();
        $this->db->close();
        return $result;
    } 

    public function audit_active($data,$id)
    {
        $this->db->reconnect();
        $result = $this->db->query("UPDATE LOTENTRY SET AUDIT_STATUS = '".$data['Active']."'WHERE LOT_ID = '".$id."'");
        save_query_in_log();
        $this->db->close();
        return $result;
    }
    
    
}

?>                   