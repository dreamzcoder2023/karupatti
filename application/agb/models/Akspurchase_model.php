<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/***************************************************************
    Purpose : To handle all the Area database details 2022-08-22
****************************************************************/
class Akspurchase_model extends CI_Model
{
    public $other_db;
    function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Calcutta'); 
    }
    public function  get_category_name($id)
    {
        $this->db->reconnect();
        $result  = $this->db->query("SELECT * FROM AKSPRODUCT_CATEGORY WHERE AKSCATEGORY_ID='".$id."'")->result_array();
        
        // print_r($result);
        // exit();
        save_query_in_log();
        $this->db->close();
        return $result;
    }
    public function get_purc_list($pid)
    {
        $this->db->reconnect();
        $result  = $this->db->query("SELECT * FROM AKS_PURCHASE_ENTRY WHERE pid= '".$pid."'")->result_array();
        save_query_in_log();
        $this->db->close();
        return $result;
    }
    public function get_category($cid){

      $this->db->reconnect();
        $result  = $this->db->query("SELECT * FROM AKSPRODUCT_CATEGORY WHERE AKSCATEGORY_ID  = '".$cid."'")->row();
        // print_r($result);
        // $id = $this->input->post('id');
        // $cname = $this->input->post('cname');
        save_query_in_log();
        $this->db->close();
      
        return $result;
    }
    public function get_cart_view($pid){
       $this->db->reconnect();
        $result  = $this->db->query("SELECT * FROM AKS_PURCHASE_CART WHERE pur_id = '".$pid."' AND status=0 ")->result_array();
        // print_r($result);
        // $id = $this->input->post('id');
        // $cname = $this->input->post('cname');
        save_query_in_log();
        $this->db->close();
      
        return $result;

    }
    public function get_cart_view_production($pid){
       $this->db->reconnect();
        $result  = $this->db->query("SELECT * FROM AKS_PURCHASE_PRODUCTION_CART WHERE pur_id = '".$pid."' AND status=0")->result_array();
        // print_r($result);
        // $id = $this->input->post('id');
        // $cname = $this->input->post('cname');
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
    public function get_prd_detail($pdid)
    {
        $this->db->reconnect();
        $result  = $this->db->query("SELECT * FROM AKS_PRD_MASTER WHERE AKS_PRD_MID = '".$pdid."' AND PRODUCT_TYPE ='P' AND IS_PURCHASE ='1'")->row();
        // print_r($result);
        // $id = $this->input->post('id');
        // $cname = $this->input->post('cname');
        save_query_in_log();
        $this->db->close();
      
        return $result;

        


    }

    
     public function get_stk_hst_list($slid)
    {
        $this->db->reconnect();
        $result  = $this->db->query("SELECT * FROM AKS_PRD_MASTER WHERE AKS_PRD_MID = '".$slid."'")->row();
        // print_r($result);
        
        save_query_in_log();
        $this->db->close();
      
        return $result;


    }
   public function get_cart_list($plid)
    {
        $this->db->reconnect();
        $result  = $this->db->query("SELECT * FROM AKS_PRD_MASTER WHERE AKS_PRD_MID = '".$plid."'")->row();
        // print_r($result);
        // $id = $this->input->post('id');
        // $cname = $this->input->post('cname');
        save_query_in_log();
        $this->db->close();
      
        return $result;


        
        
        // $result = $this->Aksproduct_model->($cname);
        // $data['status'] = $this->input->post('status');
       
        $res = $this->db->query(" INSERT INTO AKS_PUR_CART
                                           (pur_prd_img
                                           ,pur_prd_name
                                           ,pur_prd_wgt
                                           ,pur_prd_price
                                           ,status
                                           ,create_by
                                           ,create_on)
                                     VALUES
                                            ('".$data['pur_prd_img']."',
                                             '".$data['pur_prd_name']."',
                                             '".$data['pur_prd_wgt']."',
                                             '".$data['pur_prd_price']."',
                                             '".$data['status']."',
                                             '".$data['created_by']."',
                                             '".$data['created_on']."')");
        save_query_in_log();
        $this->db->close(); 
        return $res;
    }

    public function purchase_entry($data){

     $pur_date = date("Y-m-d",strtotime($data['pur_date'])); 
      if ($data['prd_count']>0) {
           $result  = $this->db->query("INSERT INTO AKS_PURCHASE_ENTRY
                                        (
                                             pur_date
                                            ,pur_id
                                            ,pur_sup
                                            ,supplier_id
                                            ,prd_count
                                            ,prd_tot_amt
                                            ,pur_dis_amt
                                            ,pur_net_amt
                                           
                                            ,pur_cash
                                            ,balance_cash
                                            ,production_chk
                                            ,mackingcharges
                                            ,net_amt_pro
                                            ,total_amt_pro
                                            ,tallyamount
                                            
                                            ,create_by
                                            ,create_on
                                            ,status
                                        )
                                        VALUES
                                        (
                                             '".$pur_date."',
                                             '".$data['pur_id']."',
                                             '".$data['pur_sup']."',
                                             '".$data['supplier_id']."',
                                             '".$data['prd_count']."',
                                             '".$data['prd_tot_amt']."',
                                             '".$data['pur_dis_amt']."',
                                             '".$data['pur_net_amt']."',
                                        
                                             '".$data['pur_cash']."',
                                             '".$data['balance_cash']."',

                                             '".$data['production_chk']."',
                                             '".$data['mackingcharges']."',
                                             '".$data['net_amt_pro']."',
                                             '".$data['total_amt_pro']."',
                                             '".$data['tallyamount']."',

                                            
                                             
                                             '".$data['create_by']."',
                                             '".$data['create_on']."',
                                             '".$data['status']."')"
                                        );
             // print_r($pur_date);exit;
               save_query_in_log();
               $this->db->close(); 
               return $result;
        }
    }

    public function purchase_entry_update($data,$id){

     $pur_date = date("Y-m-d",strtotime($data['pur_date'])); 
        if ($data['prd_count']>0) {
           $data = array(
                        'pur_date' => $pur_date,
                        'pur_sup' => $data['pur_sup'],
                        'supplier_id' => $data['supplier_id'],
                        'prd_count' => $data['prd_count'],
                        'prd_tot_amt' => $data['prd_tot_amt'],
                        'pur_dis_amt' => $data['pur_dis_amt'],
                        'pur_net_amt' => $data['pur_net_amt'],
                        'pur_cash' => $data['pur_cash'],
                        'balance_cash' => $data['balance_cash'],
                        'production_chk' => $data['production_chk'],
                        'mackingcharges' => $data['mackingcharges'],
                        'net_amt_pro' => $data['net_amt_pro'],
                        'total_amt_pro' => $data['total_amt_pro'],
                        'tallyamount' => $data['tallyamount'],
                        'create_by' => $data['create_by'],
                        'create_on' => $data['create_on'],
                        'status' => $data['status']
                    );

            $this->db->where('pur_id', $id);
            $result=$this->db->update('AKS_PURCHASE_ENTRY', $data);

             // print_r($pur_date);exit;
               save_query_in_log();
               $this->db->close(); 
               return $result;
        }
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
                                           ,created_by
                                           ,created_on
                                           )
                                           
                                           VALUES(
                                            'AKS_PURCHASE',
                                            'Cash',
                                            '".$data['cash_amount']."',
                                            '".$data['cash_detail']."',
                                            '".$data['pur_id']."'
                                            ,'-','-','-','-','0','0','0'
                                            , '".$_SESSION['username']."', '".date('Y-m-d H:i:s')."'
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
                                           ,pure_metal_weight
                                           ,created_by
                                           ,created_on
                                           )
                                           
                                           
                                           VALUES(
                                            'AKS_PURCHASE',
                                            'Cheque',
                                            '".$data['cheque_amt']."',
                                            '".$data['cheque_supbk']."',
                                            '".$data['cheque_refno']."',
                                            '".$data['cheque_detail']."',
                                            '".$data['pur_id']."'
                                             ,'-','-','-','-','0','0','0'
                                            , '".$_SESSION['username']."', '".date('Y-m-d H:i:s')."'
                                            )");
             save_query_in_log();
             $this->db->close(); 
             return $cheque;
           }

    }
    public function rtgssave($data)
    {
         if($data['rtgs_amt']>0) {
    $rtgs = $this->db->query("INSERT INTO payment_inward_outward
                                           (module_name
                                           ,type_of_payment
                                           ,amount
                                           ,cheque_ref_no
                                           ,company_bank
                                           ,remarks
                                           ,bill_no
                                           ,party_id
                                           ,payment_side
                                           ,metal_type
                                           ,quality
                                           ,purity
                                           ,weight
                                           ,pure_metal_weight
                                           ,created_by
                                           ,created_on
                                           )
                                           
                                           VALUES(
                                             'AKS_PURCHASE',
                                            'RTGS',
                                            '".$data['rtgs_amt']."',
                                            '".$data['rtgs_refno']."',
                                            '".$data['rtgs_bank']."',
                                            '".$data['rtgs_detail']."',
                                            '".$data['pur_id']."'
                                             ,'-','-','-','-','0','0','0'
                                              , '".$_SESSION['username']."', '".date('Y-m-d H:i:s')."'
                                            )");
             save_query_in_log();
             $this->db->close(); 
             return $rtgs;
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
                                           ,company_bank
                                           ,remarks
                                           ,bill_no
                                           ,party_id
                                           ,payment_side
                                           ,metal_type
                                           ,quality
                                           ,purity
                                           ,weight
                                           ,pure_metal_weight
                                           ,created_by
                                           ,created_on
                                           )
                                           
                                           VALUES(
                                            'AKS_PURCHASE',
                                            'UPI',
                                            '".$data['upi_amt']."',
                                            '".$data['upi_refno']."',
                                            '".$data['upi_bank']."',
                                            '".$data['upi_detail']."',
                                            '".$data['pur_id']."',
                                             '-','-','-','-','0','0','0'
                                              , '".$_SESSION['username']."', '".date('Y-m-d H:i:s')."'
                                            )");
             save_query_in_log();
             $this->db->close(); 
             return $upi;
  }
}


    public function last_pid_details()
        {
            $this->db->reconnect();
            $result  = $this->db->query("SELECT * FROM AKS_PURCHASE_ENTRY ORDER BY pid DESC")->row();
            save_query_in_log();
            $this->db->close(); 
            return $result;
        }
    
    
 public function get_pur_list($fdate,$tdate,$sup_name,$pur_id,$offset,$page_limit)
    {
        $this->db->reconnect();
        $result = $this->db->query("SELECT  * FROM  ( SELECT *, ROW_NUMBER() OVER (ORDER BY pid DESC) AS sl FROM AKS_PURCHASE_ENTRY WHERE  status='Y' $fdate $tdate $sup_name $pur_id )N  WHERE  sl BETWEEN $offset AND $page_limit ")->result_array();
        save_query_in_log();
        $this->db->close();
        return $result;
       
    }
  public function get_supplier_name_list($sup_name)
    {
        $this->db->reconnect();
        $result  = $this->db->query("SELECT * FROM AKS_PURCHASE_ENTRY WHERE status='Y' $sup_name order by pid desc")->result_array();
        save_query_in_log();
        $this->db->close();

        //print_r($result);exit();
        return $result;
    }
public function get_pur_price($pid)
    {
        $this->db->reconnect();
        $result  = $this->db->query("SELECT * FROM   AKS_PRD_MASTER WHERE AKS_PRD_MID = '".$pid."'")->row();
        save_query_in_log();
        $this->db->close();
        return $result;
    }

public function get_pur_detail()
    {
        $this->db->reconnect();
        $result  = $this->db->query("SELECT * FROM AKS_PRD_MASTER WHERE STATUS='Y' AND PRODUCT_TYPE ='P' AND IS_PURCHASE ='1'")->result_array();
        // print_r($result);
        // exit;
        save_query_in_log();
        $this->db->close();
        return $result;
    }
 public function prd_delete($uid)
    {
        $this->db->reconnect();
        $result  = $this->db->query("UPDATE AKS_PURCHASE_ENTRY SET STATUS='N'  WHERE pur_id = '".$uid."'");
        save_query_in_log();
        $this->db->close();
        return $result;
    }
    public function pur_cur_up($uid)
    {
        $this->db->reconnect();

          $res  = $this->db->query("UPDATE AKS_PRD_MASTER set PRD_CUR_QTY='". $curt_stk."' where AKS_PRD_MID=". $prd_ids);
       
          save_query_in_log();
          $this->db->close();
          return $res;
    }
    public function getSupplier()
      {
        $this->other_db->reconnect();
        $result  = $this->other_db->query("SELECT * FROM ACC_LEDGERS WHERE GROUP_NAME='Karupatti' AND Status='Y' ORDER BY LEDGER_NAME ASC")->result_array();
    //   print_r($result);exit;
        save_query_in_log();
        return $result;
      }
      public function get_supplier_by_id($sno)
      {
        $this->other_db->reconnect();
        $result  = $this->other_db->query("SELECT * FROM ACC_LEDGERS WHERE GROUP_NAME='Karupatti' AND LEDGER_SNO='".$sno."' ORDER BY LEDGER_NAME")->row();
        save_query_in_log();
        return $result;
      }
       public function supplier_update($data,$id)
      {
        $this->other_db->reconnect();
         $result  = $this->other_db->query("UPDATE ACC_LEDGERS SET credit  = '".$data['credit']."',debit   = '".$data['debit']."',balance = '".$data['balance']."' WHERE LEDGER_SNO ='".$id."' ");
        // $result  = $this->other_db->from('ACC_LEDGERS')->where("LEDGER_SNO",$id)->set($data)->update();
        save_query_in_log();
        return $result;
      }


      // Purschase Edit

    public function get_purchase_edit_list($id)
    {
        $this->db->reconnect();
        $result  = $this->db->query("SELECT * FROM AKS_PURCHASE_ENTRY WHERE pid = '".$id."' AND status='Y'  ")->row();
        // print_r($result);
        // exit;
        save_query_in_log();
        $this->db->close();
        return $result;
    }
    public function get_edit_cart_list($pur_id)
    {
        $this->db->reconnect();
        $result  = $this->db->query("SELECT * FROM AKS_PURCHASE_CART  WHERE pur_id = '".$pur_id."' AND status=0 ")->result_array();
        save_query_in_log();
        $this->db->close();
      
        return $result;

    }
    public function get_edit_pro_cart_list($pur_id)
    {
        $this->db->reconnect();
        $result  = $this->db->query("SELECT * FROM AKS_PURCHASE_PRODUCTION_CART  WHERE pur_id = '".$pur_id."' AND status=0 ")->result_array();
        save_query_in_log();
        $this->db->close();
      
        return $result;

    }

    public function upcashsave($data)
    {
        if($data['cash_amount']>0) {

        $cash = $this->db->query("UPDATE  payment_inward_outward SET 
                                   amount  ='".$data['cash_amount']."',
                                   remarks ='".$data['cash_detail']."'

                                   WHERE bill_no= '".$data['pur_id']."' AND type_of_payment='Cash'

                                ");

             save_query_in_log();
             $this->db->close(); 
             return $cash;
           }
        if ($data['cash_amount']<1) {
            $cash = $this->db->query("UPDATE  payment_inward_outward SET 
                                   amount  ='0',
                                   remarks ='',
                                   type_of_payment = 'Cash Update'

                                   WHERE bill_no= '".$data['pur_id']."' AND type_of_payment='Cash'

                                ");
             save_query_in_log();
             $this->db->close(); 
             return $cash;
        }
    }

    public function upchequesave($data)
    {
      if($data['cheque_amt']>0) {
      $cheque = $this->db->query("UPDATE payment_inward_outward SET
                                           amount = '".$data['cheque_amt']."',
                                           party_bank ='".$data['cheque_supbk']."',
                                           cheque_ref_no  ='".$data['cheque_refno']."',
                                           remarks = '".$data['cheque_detail']."'
                                           WHERE bill_no= '".$data['pur_id']."' AND type_of_payment='Cheque'

                                ");
             save_query_in_log();
             $this->db->close(); 
             return $cheque;
        }
        if($data['cheque_amt']<1) {
             $cheque = $this->db->query("UPDATE payment_inward_outward SET

                                           amount = '0',
                                           type_of_payment = 'Cheque Update'
                                           WHERE bill_no= '".$data['pur_id']."' AND type_of_payment='Cheque'

                                ");
             save_query_in_log();
             $this->db->close(); 
             return $cheque;
        }

    }
    
    public function upupisave($data)
    {   
        if($data['upi_amt']>0) {
            $upi = $this->db->query("UPDATE  payment_inward_outward SET
                                          
                                           amount = '".$data['upi_amt']."',
                                           cheque_ref_no = '".$data['upi_refno']."',
                                           company_bank =  '".$data['upi_bank']."',
                                           remarks =  '".$data['upi_detail']."'
                                           WHERE bill_no= '".$data['pur_id']."' AND type_of_payment='UPI' ");
             save_query_in_log();
             $this->db->close(); 
             return $upi;
        }
        if($data['upi_amt']<1) {
            $upi = $this->db->query("UPDATE  payment_inward_outward SET
                                          
                                           amount = '0',
                                           type_of_payment = 'UPI Update'
                                           WHERE bill_no= '".$data['pur_id']."' AND type_of_payment='UPI' ");
             save_query_in_log();
             $this->db->close(); 
             return $upi;
        }
    }
}
?>    