<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/***************************************************************
    Purpose : To handle all the Area database details 2022-08-22
****************************************************************/
class Aks_stock_model extends CI_Model
{
  function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Calcutta'); 
    }
    public function get_prd_list()
    {
        $this->db->reconnect();
        // $result  = $this->db->query("SELECT * FROM AKS_PRD_MASTER ORDER BY AKS_PRD_MID ")->result_array();

        $result = $this->db->query("SELECT PRD.AKS_PRD_MID,PRD.AKS_CAT_NAME as AKS_CAT_ID,PRD.AKS_PRD_NAME,PRD.AKS_PRD_WT,PRD.AKS_PRD_PRICE,PRD.AKS_PUR_PRICE,PRD.AKS_MIN_STK,PRD.AKS_MAX_STK,PRD.AKS_PRD_DETAIL,PRD.AKS_PRD_IMG,PRD.PRD_CUR_QTY,PRD.STATUS,PRDC.AKSCATEGORY_NAME from   AKS_PRD_MASTER  PRD ,AKSPRODUCT_CATEGORY  PRDC  WHERE PRD.AKS_CAT_NAME=PRDC.AKSCATEGORY_ID AND PRD.STATUS='Y' ")->result_array();
        // print_r($result);

        save_query_in_log();
        $this->db->close();
        return $result;
      }
  public function  get_stk_his_list($prd_ids)
    {
        $this->db->reconnect();
        // $result  = $this->db->query("SELECT * FROM AKS_STOCK ORDER BY stk_id DESC")->result_array();
        $result  = $this->db->query("SELECT * FROM AKS_STOCK WHERE prd_id = '".$prd_ids."' ORDER BY stk_date DESC  ")->result_array();
        // print_r($result);
        // exit();
        save_query_in_log();
        $this->db->close();
        return $result;
    }

    public function  get_prd_name_list($prd_ids)
    {
        $this->db->reconnect();
        // $result  = $this->db->query("SELECT * FROM AKS_STOCK ORDER BY stk_id DESC")->result_array();
        $result  = $this->db->query("SELECT * FROM AKS_PRD_MASTER WHERE AKS_PRD_MID = '".$prd_ids."'")->result_array();
        // print_r($result);
        // exit();
        save_query_in_log();
        $this->db->close();
        return $result;
    }
    
    public function get_cat($prd_ids)
    {
        $this->db->reconnect();
        $result  = $this->db->query("SELECT PRD.AKS_PRD_MID,PRD.AKS_CAT_NAME as AKS_CAT_ID,PRD.AKS_PRD_NAME,PRD.AKS_PRD_WT,PRD.AKS_PRD_PRICE,PRD.AKS_PUR_PRICE,PRD.AKS_MIN_STK,PRD.AKS_MAX_STK,PRD.AKS_PRD_DETAIL,PRD.AKS_PRD_IMG,PRD.STATUS,PRDC.AKSCATEGORY_NAME from   AKS_PRD_MASTER  PRD ,AKSPRODUCT_CATEGORY  PRDC  WHERE PRD.AKS_CAT_NAME=PRDC.AKSCATEGORY_ID AND AKS_PRD_MID = '".$prd_ids."' ")->result_array();


        // $result  = $this->db->query("SELECT * FROM AKS_PRD_MASTER WHERE AKS_PRD_MID = '".$prd_ids."' ")->result_array();
        save_query_in_log();
        $this->db->close();
        return $result;
    }
      public function update_stock($curt_stk,$prd_ids){

        // print_r($curt_stk);exit();
        $this->db->reconnect();
        $result  = $this->db->query("UPDATE AKS_PRD_MASTER SET PRD_CUR_QTY='".$curt_stk."' where AKS_PRD_MID=". $prd_ids);
        // $res= $this->db->query("UPDATE AKS_PRD_MASTER set PRD_CUR_QTY='". $curt_stk."' where AKS_PRD_MID=". $prd_ids);
        
        // print_r($result);
        // exit();
        save_query_in_log();
        $this->db->close();
        return $result;

      }
      public function cat_fill($cname,$offset,$page_limit)
    {
     

      $this->db->reconnect();
       

        $result = $this->db->query(" SELECT * FROM ( SELECT  PRD.AKS_PRD_MID,PRD.AKS_CAT_NAME as AKS_CAT_ID,PRD.AKS_PRD_NAME,PRD.AKS_PRD_WT,PRD.AKS_PRD_PRICE,PRD.AKS_PUR_PRICE,PRD.AKS_MIN_STK,PRD.AKS_MAX_STK,PRD.AKS_PRD_DETAIL,PRD.AKS_PRD_IMG,PRD.STATUS,PRD.PRD_CUR_QTY,PRDC.AKSCATEGORY_NAME, ROW_NUMBER() OVER (ORDER BY PRD.AKS_PRD_MID  DESC) AS sl from   AKS_PRD_MASTER  PRD , AKSPRODUCT_CATEGORY  PRDC  WHERE  PRD.AKS_CAT_NAME=PRDC.AKSCATEGORY_ID $cname)N WHERE sl BETWEEN $offset AND $page_limit ")->result_array();

        // print_r($result);exit();
        

        save_query_in_log();
        $this->db->close();
        return $result;
      
    }
   public function get_stk_hst_fill($prd_ids,$type,$fdate,$tdate,$offset,$page_limit){

    $this->db->reconnect();
     
        
        $result = $this->db->query(" SELECT  * FROM  ( SELECT *, ROW_NUMBER() OVER (ORDER BY stk_id DESC) AS sl FROM AKS_STOCK
         WHERE prd_id='".$prd_ids."'  $fdate $tdate $type)N  WHERE  sl BETWEEN $offset AND $page_limit ")->result_array();

            // SELECT  * FROM  ( SELECT *, ROW_NUMBER() OVER (ORDER BY stk_id DESC) AS sl FROM AKS_STOCK WHERE   prd_id='15' AND stk_date>='2023-04-08')N  WHERE  sl BETWEEN 1 AND 10


         

        // print_r($result);exit();

        save_query_in_log();
        $this->db->close();
        return $result;

   }
   public function upd_stk($curt_stksscurt_stkss,$prd_ids)
      {
        $query = $this->db->query("UPDATE AKS_PRD_MASTER set PRD_CUR_QTY='". $curt_stkss."' where AKS_PRD_MID=". $prd_ids);
        $result = $query->result();
        save_query_in_log();
        return $result;
      }
}
?>    