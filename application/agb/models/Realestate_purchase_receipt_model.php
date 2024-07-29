<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/***************************************************************
    Purpose : To handle all the Realestate_purchase_receipt_model database details 2022-04-25
****************************************************************/
class Realestate_purchase_receipt_model extends CI_Model

{
  function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Calcutta'); 
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
   
    public function get_payment_details($sdid){
       $this->db->reconnect();
        $result  = $this->db->query("SELECT * FROM payment_inward_outward where bill_no='".$sdid."'  ")->result_array();
        // print_r($result);
        // $id = $this->input->post('id');
        // $cname = $this->input->post('cname');
        save_query_in_log();
        $this->db->close();
      
        return $result;

    }
    public function get_pr_list_view($sid)
    {
        $this->db->reconnect();
        $result  = $this->db->query("SELECT * FROM realestate_purchase_receipt WHERE status='Y' AND id='".$sid."' ")->result_array();
        save_query_in_log();
        $this->db->close();
        return $result;
    }
    public function last_p_r_id_details()
        {
            $this->db->reconnect();
            // $result  = $this->db->query("SELECT TOP 1 * FROM PRODUCTS ORDER BY ITEM_SNO DESC")->row();
            $result  = $this->db->query("SELECT * FROM realestate_purchase_receipt ORDER BY id DESC")->row();
            // print_r($result);exit;
            save_query_in_log();
            $this->db->close(); 
            return $result;
        }


   
    
    
 public function get_pur_list($fdate,$tdate,$party_name,$pro_type,$ploat_type,$offset,$page_limit)
    {
        $this->db->reconnect();
        // $result  = $this->db->query("SELECT * FROM realestate_purchase WHERE status='Y' $fdate $tdate $party_name  $pro_type $ploat_type order by id desc")->result_array();
        $result = $this->db->query(" SELECT  * FROM  ( SELECT *, ROW_NUMBER() OVER (ORDER BY id DESC) AS sl FROM realestate_purchase WHERE  property_status='New' AND status='Y' $fdate $tdate $party_name  $pro_type $ploat_type )N  WHERE  sl BETWEEN $offset AND $page_limit ")->result_array();

        // print_r($result);

        save_query_in_log();
        $this->db->close();
        return $result;
       
    }
  public function get_pur_det($prop_pur_id)
    {
       
         $this->db->reconnect();
         $result  = $this->db->query("SELECT * FROM realestate_purchase WHERE id='".$prop_pur_id."' AND status='Y' ")->row();
        
        // print_r($result);

        save_query_in_log();
        $this->db->close();
        return $result;
    }
  public function prop_pur_recp_entry($data){

     
         $rec_date=date('Y-m-d',strtotime($data['rec_date']));
         $result  = $this->db->query("INSERT INTO realestate_purchase_receipt
           (recepit_id
           ,property_id
           ,receipt_date
           ,net_amount
           ,cr_paid_amount
           ,cr_balance_amount
           ,net_payable
           ,status
           ,create_by
           ,create_on
           )
     VALUES
           ('".$data['recepit_id']."'
           ,'".$data['pur_id_rec']."'
       
           , '".$rec_date."'
           ,'".$data['net_amount']."'
           ,'".$data['cr_paid']."'
           ,'".$data['cr_bal']."'
           ,'".$data['net_payable']."'
           
           ,'Y'
           , '".$_SESSION['username']."' 
           ,'".date('Y-m-d H:i:s')."')");  

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
                                            'RE-Property-Purchase-Receipt',
                                            'Cash',
                                            '".$data['cash_amount']."',
                                            '".$data['cash_detail']."',
                                            '".$data['recepit_id']."'
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
                                            'RE-Property-Purchase-Receipt',
                                            'Cheque',
                                            '".$data['cheque_amt']."',
                                            '".$data['cheque_bk']."',
                                            '".$data['cheque_refno']."',
                                            '".$data['cheque_detail']."',
                                            '".$data['recepit_id']."'
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
                                            'RE-Property-Purchase-Receipt',
                                            'UPI',
                                            '".$data['upi_amt']."',
                                            '".$data['upi_refno']."',
                                            
                                            '".$data['upi_detail']."',
                                            '".$data['recepit_id']."',
                                             '-','-','-','-','0','0','0'
                                            )");
             save_query_in_log();
             $this->db->close(); 
             return $upi;
  }
}


    public function last_pid_details()
        {
            $this->db->reconnect();
            // $result  = $this->db->query("SELECT TOP 1 * FROM PRODUCTS ORDER BY ITEM_SNO DESC")->row();
            $result  = $this->db->query("SELECT * FROM realestate_purchase ORDER BY id DESC")->row();
            // print_r($result);exit;
            save_query_in_log();
            $this->db->close(); 
            return $result;
        }
  
}
?>    