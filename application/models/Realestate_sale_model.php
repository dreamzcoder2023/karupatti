<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/***************************************************************
    Purpose : To handle all the Area database details 2022-04-25
****************************************************************/
class Realestate_sale_model extends CI_Model
{
  function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Calcutta'); 
    }
    
    public function get_pur_list($fdate,$tdate,$party_name,$pro_type,$ploat_type,$offset,$page_limit,$vaofill,$amenfill)
    {
        $this->db->reconnect();
       
        $result = $this->db->query(" SELECT  * FROM  ( SELECT *, ROW_NUMBER() OVER (ORDER BY id DESC) AS sl FROM realestate_sale WHERE  status='Y' $fdate $tdate $party_name  $pro_type $ploat_type $vaofill $amenfill)N  WHERE  sl BETWEEN $offset AND $page_limit ")->result_array();

        

        save_query_in_log();
        $this->db->close();
        return $result;
       
    }
  public function get_porperty($pid)
  {


    $this->db->reconnect();
         $result  = $this->db->query("SELECT * from realestate_purchase where property_id = '".$pid.'%'."'  ")->row();
        
        // print_r($result);

        save_query_in_log();
        $this->db->close();
        return $result;

  }
  public function get_agent_list_drop_down()
    {

        $this->other_db->reconnect();

        $result  = $this->other_db->query("SELECT * FROM ACC_LEDGERS  WHERE GROUP_NAME='RE_AGENT' ORDER BY GROUP_NAME ASC" )->result_array();
        save_query_in_log();
        // print_r("SELECT * FROM ACC_LEDGERS  WHERE LEDGER_NAME LIKE '".$search.'%'."'   AND GROUP_NAME='RE_AGENT');exit;
        $this->other_db->close();
        
        return $result;
    }
    public function get_sale_view($prop_sale_id)
    {
       
         $this->db->reconnect();
         $result  = $this->db->query("SELECT * FROM realestate_sale WHERE id=".$prop_sale_id." ")->row();
        
        // print_r($result);

        save_query_in_log();
        $this->db->close();
        return $result;
    }

  
   
    

    public function get_cash($pid){
       $this->db->reconnect();
        $result  = $this->db->query("SELECT * FROM payment_inward_outward where bill_no='".$pid."' AND type_of_payment='Cash' ")->row();
        // print_r($result);
        // $id = $this->input->post('id');
        // $cname = $this->input->post('cname');
        save_query_in_log();
        $this->db->close();
      
        return $result;

    }
    public function get_cheque($pid){
       $this->db->reconnect();
        $result  = $this->db->query("SELECT * FROM payment_inward_outward where bill_no='".$pid."' AND type_of_payment='Cheque' ")->row();
        // print_r($result);
        // $id = $this->input->post('id');
        // $cname = $this->input->post('cname');
        save_query_in_log();
        $this->db->close();
      
        return $result;

    }
    public function get_rtgs($pid){
       $this->db->reconnect();
         $result  = $this->db->query("SELECT * FROM payment_inward_outward where bill_no='".$pid."' AND type_of_payment='RTGS' ")->row();
        // print_r($result);
        // $id = $this->input->post('id');
        // $cname = $this->input->post('cname');
        save_query_in_log();
        $this->db->close();
      
        return $result;

    }
    public function get_upi($pid){
       $this->db->reconnect();
         $result  = $this->db->query("SELECT * FROM payment_inward_outward where bill_no='".$pid."' AND type_of_payment='UPI' ")->row();
        // print_r($result);
        // $id = $this->input->post('id');
        // $cname = $this->input->post('cname');
        save_query_in_log();
        $this->db->close();
      
        return $result;

    }
    public function get_payment_details($pdid){
       $this->db->reconnect();
        $result  = $this->db->query("SELECT * FROM payment_inward_outward where bill_no='".$pdid."'  ")->result_array();
        // print_r($result);
        // $id = $this->input->post('id');
        // $cname = $this->input->post('cname');
        save_query_in_log();
        $this->db->close();
      
        return $result;

    }
   

    
   

 


    public function last_pid_details()
        {
            $this->db->reconnect();
            // $result  = $this->db->query("SELECT TOP 1 * FROM PRODUCTS ORDER BY ITEM_SNO DESC")->row();
            // $result  = $this->db->query("SELECT * FROM realestate_sale ORDER BY id ")->row();
            $result  = $this->db->query("SELECT * FROM realestate_sale ORDER BY id DESC")->row();
            // print_r($result);exit;
            save_query_in_log();
            $this->db->close(); 
            return $result;
        }

    
 
 public function property_entry($data){

     
         $sale_date = date("Y-m-d",strtotime($data['porp_date'])); 
         
         $result  = $this->db->query("INSERT INTO realestate_sale
           (property_id
           ,sale_id
           ,date
           ,party_name
           ,ref_name
           ,vao_group
           ,register_office
           ,property_type
           ,servey_no
           ,partental_dno
           ,document_curno
           ,patta_no
           ,street
           ,area
           ,city
           ,state
           ,lattitude
           ,longtitude
           ,ploat_areano
           ,ploat_areatype
           ,price_per_ploat
           ,ploat_no
           ,ploat_type
           ,pro_amount
           ,paid_amount
           ,balance_amount
           ,amenities
           ,description
           ,agent_name1
           ,agent_amt1
           ,document_images
           ,created_by
           ,created_on
           ,status
           ,total_property_amount
           ,party_id
           ,prop_sts_update
           ,land_name
           ,land_lord
           ,pincode
           ,actual_buying_rate
           ,by_buying_rate)
     VALUES
           ('".$data['property_id']."'
           ,'".$data['sale_id']."'
           ,'".$sale_date."'
           ,'".$data['party_name']."'
           ,'".$data['ref_name']."'
           ,'".$data['vao_group']."'
           ,'".$data['register_office']."'
           ,'".$data['property_type']."'
           ,'".$data['servey_no']."'
           ,'".$data['partental_dno']."'
           ,'".$data['document_curno']."'
           ,'".$data['patta_no']."'
           ,'".$data['street']."'
           ,'".$data['area']."'
           ,'".$data['city']."'
           ,'".$data['state']."'
           ,'".$data['lattitude']."'
           ,'".$data['longtitude']."'
           ,'".$data['ploat_areano']."'
           ,'".$data['ploat_areatype']."'
           ,'".$data['price_per_ploat']."'
           ,'".$data['ploat_no']."'
           ,'".$data['ploat_type']."'
           ,'".$data['pro_amount']."'
           ,'".$data['paid_amount']."'
           ,'".$data['balance_amount']."'
           ,'".$data['amenities']."'
           ,'".$data['description']."'
           ,'".$data['agent_count']."'
           ,'".$data['agent_amt_total']."'
           ,'".$data['image_id']."'
           ,'".$data['create_by']."'
           ,'".$data['create_on']."'
           ,'".$data['status']."'
           ,'".$data['total_property_amount']."'
           ,'".$data['party_id']."',
            '".$data['prop_sts_update']."',
            '".$data['land_name']."',
            '".$data['land_lord']."',
            '".$data['pincode']."',
            '".$data['actual_buying_rate']."',
            '".$data['by_buying_rate']."')");       


     
           // print_r($por_date);exit;
             save_query_in_log();
             $this->db->close(); 
             return $result;

    }
    

    public function cashsave($data)
    {
     if($data['cash_amount']>0) {
    $cash = $this->db->query("INSERT INTO payment_inward_outward
                                           (module_name
                                           ,type_of_payment
                                           ,amount
                                           ,remarks
                                           ,bill_no
                                           ,party_id
                                           ,payment_side
                                           ,metal_type
                                           ,quality
                                           ,purity
                                           ,weight
                                           ,pure_metal_weight
                                           )
                                           
                                           VALUES(
                                            'RE-Property-sale',
                                            'Cash',
                                            '".$data['cash_amount']."',
                                            '".$data['cash_detail']."',
                                            '".$data['sale_id']."'
                                            ,'-','-','-','-','0','0','0'
                                            )");


             save_query_in_log();
             $this->db->close(); 
             return $cash;
           }
    }

    public function chequesave($data)
    {
      if($data['cheque_amt']>0) {
      $cheque = $this->db->query("INSERT INTO payment_inward_outward
                                           (module_name
                                           ,type_of_payment
                                           ,amount
                                           ,party_bank
                                           ,cheque_ref_no 
                                           ,remarks
                                           ,bill_no
                                           ,party_id
                                           ,payment_side
                                           ,metal_type
                                           ,quality
                                           ,purity
                                           ,weight
                                           ,pure_metal_weight)
                                           
                                           
                                           VALUES(
                                            'RE-Property-sale',
                                            'Cheque',
                                            '".$data['cheque_amt']."',
                                            '".$data['cheque_bk']."',
                                            '".$data['cheque_refno']."',
                                            '".$data['cheque_detail']."',
                                            '".$data['sale_id']."'
                                             ,'-','-','-','-','0','0','0'
                                            )");
             save_query_in_log();
             $this->db->close(); 
             return $cheque;
           }

    }
    
    public function upisave($data)
    {
     if($data['upi_amt']>0) {
    $upi = $this->db->query("INSERT INTO payment_inward_outward
                                           (module_name
                                           ,type_of_payment
                                           ,amount
                                           ,cheque_ref_no
                                         
                                           ,remarks
                                           ,bill_no
                                           ,party_id
                                           ,payment_side
                                           ,metal_type
                                           ,quality
                                           ,purity
                                           ,weight
                                           ,pure_metal_weight)
                                           
                                           VALUES(
                                            'RE-Property-sale',
                                            'UPI',
                                            '".$data['upi_amt']."',
                                            '".$data['upi_refno']."',
                                            
                                            '".$data['upi_detail']."',
                                            '".$data['sale_id']."',
                                             '-','-','-','-','0','0','0'
                                            )");
             save_query_in_log();
             $this->db->close(); 
             return $upi;
  }

}

 public function rec_cashsave($data)
    {
     if($data['cash_amount']>0) {
    $cash = $this->db->query("INSERT INTO payment_inward_outward
                                           (module_name
                                           ,type_of_payment
                                           ,amount
                                           ,remarks
                                           ,bill_no
                                           ,party_id
                                           ,payment_side
                                           ,metal_type
                                           ,quality
                                           ,purity
                                           ,weight
                                           ,pure_metal_weight
                                           )
                                           
                                           VALUES(
                                            'RE-Property-Sale-Receipt',
                                            'Cash',
                                            '".$data['rcp_cash_amount']."',
                                            '".$data['rcp_cash_detail']."',
                                            '".$data['recepit_id']."'
                                            ,'-','-','-','-','0','0','0'
                                            )");


             save_query_in_log();
             $this->db->close(); 
             return $cash;
           }
    }

    public function rec_chequesave($data)
    {
      if($data['cheque_amt']>0) {
      $cheque = $this->db->query("INSERT INTO payment_inward_outward
                                           (module_name
                                           ,type_of_payment
                                           ,amount
                                           ,party_bank
                                           ,cheque_ref_no 
                                           ,remarks
                                           ,bill_no
                                           ,party_id
                                           ,payment_side
                                           ,metal_type
                                           ,quality
                                           ,purity
                                           ,weight
                                           ,pure_metal_weight)
                                           
                                           
                                           VALUES(
                                            'RE-Property-Sale-Receipt',
                                            'Cheque',
                                            '".$data['rcp_cheque_amt']."',
                                            '".$data['rcp_cheque_bk']."',
                                            '".$data['rcp_cheque_refno']."',
                                            '".$data['rcp_cheque_detail']."',
                                            '".$data['recepit_id']."'
                                             ,'-','-','-','-','0','0','0'
                                            )");
             save_query_in_log();
             $this->db->close(); 
             return $cheque;
           }

    }
    
    public function rec_upisave($data)
    {
     if($data['upi_amt']>0) {
    $upi = $this->db->query("INSERT INTO payment_inward_outward
                                           (module_name
                                           ,type_of_payment
                                           ,amount
                                           ,cheque_ref_no
                                         
                                           ,remarks
                                           ,bill_no
                                           ,party_id
                                           ,payment_side
                                           ,metal_type
                                           ,quality
                                           ,purity
                                           ,weight
                                           ,pure_metal_weight)
                                           
                                           VALUES(
                                            'RE-Property-Sale-Receipt',
                                            'UPI',
                                            '".$data['rcp_upi_amt']."',
                                            '".$data['rcp_upi_refno']."',
                                            
                                            '".$data['rcp_upi_detail']."',
                                            '".$data['recepit_id']."',
                                             '-','-','-','-','0','0','0'
                                            )");
             save_query_in_log();
             $this->db->close(); 
             return $upi;
  }

 
}
public function property_update($data){
         $por_date = date("Y-m-d",strtotime($data['porp_date'])); 

         $result  = $this->db->query(" UPDATE realestate_sale


   SET
       date = '".$por_date."'
      
       ,price_per_ploat = '".$data['price_per_ploat']."' 
      ,ploat_no = '".$data['ploat_no']."'
      ,ploat_type = '".$data['ploat_type']."'
      ,pro_amount = '".$data['pro_amount']."'
      ,agent_amt1 = '".$data['agent_amt_total']."'
      ,modified_by = '".$data['modify_by']."'
      ,modified_on = '".$data['modify_on']."'
      ,paid_amount = '".$data['paid_amount']."'
      ,balance_amount = '".$data['balance_amount'] ."'
      ,total_property_amount = '".$data['total_property_amount'] ."'
     

       WHERE sale_id='".$data['sale_id']."'");
          
           save_query_in_log();
           $this->db->close(); 
           return $result;

    }

 public function up_cashsave($data)
    {
     if($data['cash_amount']>0) {
    $cash = $this->db->query("UPDATE payment_inward_outward

             SET 
              amount  ='".$data['cash_amount']."',
              remarks = '".$data['cash_detail']."'
              WHERE bill_no='".$data['sale_id']."' AND type_of_payment ='Cash'  ");


             save_query_in_log();
             $this->db->close(); 
             return $cash;
           }
    }

    public function up_chequesave($data)
    {
      if($data['cheque_amt']>0) {
      $cheque = $this->db->query("UPDATE payment_inward_outward

                          SET
                           
                           amount        ='".$data['cheque_amt']."',
                           party_bank    ='".$data['cheque_bk']."',
                           cheque_ref_no ='".$data['cheque_refno']."',
                           remarks       ='".$data['cheque_detail']."'
                           WHERE bill_no='".$data['sale_id']."' AND type_of_payment ='Cheque'
                           ");

             save_query_in_log();
             $this->db->close(); 
             return $cheque;
           }

    }
    
    public function up_upisave($data)
    {
     if($data['upi_amt']>0) {
    $upi = $this->db->query("UPDATE payment_inward_outward

                            SET
                           
                           amount        ='".$data['upi_amt']."',
                           cheque_ref_no ='".$data['upi_refno']."',
                           remarks       ='".$data['upi_detail']."'
                           WHERE bill_no='".$data['sale_id']."' AND type_of_payment ='UPI'
                           ");
                                          
                                          
             save_query_in_log();
             $this->db->close(); 
             return $upi;
  }
}
 public function last_p_r_id_details()
        {
            $this->db->reconnect();
            // $result  = $this->db->query("SELECT TOP 1 * FROM PRODUCTS ORDER BY ITEM_SNO DESC")->row();
            $result  = $this->db->query("SELECT * FROM realestate_sale_receipt ORDER BY id DESC")->row();
            // print_r($result);exit;
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
    public function get_agent_list($search)
    {

        $this->other_db->reconnect();

        $result  = $this->other_db->query("SELECT TOP 25 * FROM ACC_LEDGERS  WHERE  LEDGER_NAME LIKE '".$search.'%'."'  AND GROUP_NAME='RE-AGENT' " )->result_array();
        save_query_in_log();
        // print_r("SELECT * FROM ACC_LEDGERS  WHERE LEDGER_NAME LIKE '".$search.'%'."'   AND GROUP_NAME='RE-AGENT');exit;
        $this->other_db->close();
        
        return $result;
    }
    public function getUsers($search)
  {
     $query = $this->db->query("SELECT TOP 30 * from PARTIES where NAME LIKE '".$search.'%'."' OR PHONE LIKE '".$search.'%'."'  ");
     $result = $query->result();
    return $result;
  }
  public function prop_delete($sid)
    {
        $this->db->reconnect(); 
       // AKS_PRD_MASTER set PRD_CUR_QTY='".$qtot."' where AKS_PRD_MID=". $prdd
        $result  = $this->db->query("UPDATE realestate_sale SET status='N' WHERE sale_id='".$sid."'");
        save_query_in_log();
        $this->db->close();
        return $result;
    }
    public function prop_receipt_delete($sid)
    {
        $this->db->reconnect(); 
       // AKS_PRD_MASTER set PRD_CUR_QTY='".$qtot."' where AKS_PRD_MID=". $prdd

        $result  = $this->db->query("UPDATE realestate_sale_receipt SET status='N' WHERE property_id='".$sid."'");
        save_query_in_log();
        $this->db->close();
        return $result;
    }
}
?>    