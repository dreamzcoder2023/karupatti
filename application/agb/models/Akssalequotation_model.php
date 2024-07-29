<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*************************************************************************************
    Purpose : To handle all the Area database details 2022-01-05
**************************************************************************************/
class Akssalequotation_model extends CI_Model
{
	public $other_db;
  function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Calcutta'); 
		
		$fin_year=$this->get_fin_years_list();
		
        $db=substr($fin_year->DBNAME,0,strlen($fin_year->DBNAME)-4);
		
        $db_user=$fin_year->USERNAME?$fin_year->USERNAME:'';
        $db_pass=$fin_year->PASSWORD?$fin_year->PASSWORD:'';
		
        $config_app = switch_db_dynamic($db,$db_user,$db_pass);
		
        $this->other_db = $this->load->database($config_app,TRUE);
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
    public function get_sale_list_view($sid)
    {
        $this->db->reconnect();
        $result  = $this->db->query("SELECT * FROM AKS_SALE_QUTOTATION_ENTRY WHERE sid= '".$sid."'")->result_array();
        save_query_in_log();
        $this->db->close();
        return $result;
    }
    public function get_sale_sup_view($sid)
    {
        $this->db->reconnect();
        $result  = $this->other_db->query("SELECT * FROM ACC_LEDGERS WHERE GROUP_NAME='Karupatti' AND LEDGER_SNO='".$sid."' ORDER BY LEDGER_NAME ASC")->row();
        save_query_in_log();
        $this->db->close();
        return $result;
    }
    public function get_sale_ship_view($sid)
    {
        $this->db->reconnect();
        $result  = $this->db->query("SELECT * FROM AKS_SALE_QUTOTATION_ENTRY WHERE sid= '".$sid."' AND status='S' ")->result_array();
        save_query_in_log();
        $this->db->close();
        return $result;
    }
    public function get_sale_ship_check($sid)
    {
        $this->db->reconnect();
        $result  = $this->db->query("SELECT * FROM AKS_SALE_QUTOTATION_ENTRY WHERE sid= '$sid' AND status='D' ")->row();
        print_r($result); exit;
        save_query_in_log();
        $this->db->close();
        return $result;
    }
    public function get_cart_view($sid){
       $this->db->reconnect();
        $result  = $this->db->query("SELECT * FROM AKS_SALE_QUTOTATION_CART WHERE sale_id  = '".$sid."' AND status=0 ")->result_array();
       
        save_query_in_log();
        $this->db->close();
      
        return $result;

    }
    public function get_cart_pos($product_id){
       $this->db->reconnect();
        $result  = $this->db->query("SELECT * FROM AKS_SALE_QUTOTATION_CART WHERE sale_id  = '".$product_id."' AND status=0")->result_array();
        // print_r($result);exit();
        // $id = $this->input->post('id');
        // $cname = $this->input->post('cname');
        save_query_in_log();
        $this->db->close();
      
        return $result;

    }
     public function get_cart_print($product_id){
       $this->db->reconnect();
        $result  = $this->db->query("SELECT * FROM AKS_SALE_QUTOTATION_CART WHERE sale_id  = '".$product_id."' AND status=0")->result_array();
        // print_r($result);exit();
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
     public function get_sale_pos($spos)
    {
       
         $this->db->reconnect();
         $result  = $this->db->query("SELECT * FROM AKS_SALE_QUTOTATION_ENTRY WHERE sid='".$spos."' ")->result_array();
        
        // print_r($result);exit();

        save_query_in_log();
        $this->db->close();
        return $result;
    }
    public function get_sale_print($sprint)
    {
       
         $this->db->reconnect();
         $result  = $this->db->query("SELECT * FROM AKS_SALE_QUTOTATION_ENTRY WHERE sid='".$sprint."' ")->result_array();
        
        // print_r($result);

        save_query_in_log();
        $this->db->close();
        return $result;
    }
   public function get_cart_list($plid)
    {
        $this->db->reconnect();
        $result  = $this->db->query("SELECT * FROM AKS_PRD_MASTER  WHERE AKS_PRD_MID = '".$plid."'")->row();
        // print_r($result);
        // $id = $this->input->post('id');
        // $cname = $this->input->post('cname');
        save_query_in_log();
        $this->db->close();
      
        return $result;

        
        
        // $result = $this->Aksproduct_model->($cname);
        $data['status'] = $this->input->post('status');
       
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

    public function del_approve($data)
    {
        $this->db->reconnect();

        $res=$this->db->query("   
            (sale_dl_sts,sale_track_id) values ('".$data['sale_del_by']."','".$data['sale_track_id']."')");
         
    }
   public function sale_entry($data,$saledate){
         $result  = $this->db->query("INSERT INTO AKS_SALE_QUTOTATION_ENTRY         

           (sale_date
           ,sale_id
           ,sale_party
           ,sale_prd_count
           ,sale_prd_tot_amt
           ,sale_dis_amt
           ,sale_net_amt
           ,sale_cash
           ,balance_cash
           ,create_by
           ,create_on
           ,status
           ,id_party
           ,remarks
           ,party_type
           )
     VALUES
           (
           '".$saledate."',
           '".$data['sale_id']."',
           '".$data['sale_party']."',
           '".$data['sale_prd_count']."',
           '".$data['sale_prd_tot_amt']."',
           '".$data['sale_dis_amt']."',
           '".$data['sale_net_amt']."',
           '".$data['sale_cash']."',
           '".$data['balance_cash']."',
           '".$data['create_by']."',
           '".$data['create_on']."',
           '".$data['status']."',
           '".$data['id_partys']."',
           '".$data['remarks']."',
           '".$data['party_type']."'

           )");
      
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
                                            'Sale',
                                            '".$data['pay_mode']."',
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
                                            'Sale',
                                            '".$data['pay_mode']."',
                                            '".$data['cheque_amt']."',
                                            '".$data['cheque_supbk']."',
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
                                           ,pure_metal_weight)
                                           
                                           VALUES(
                                             'Sale',
                                            '".$data['pay_mode']."',
                                            '".$data['rtgs_amt']."',
                                            '".$data['rtgs_refno']."',
                                            '".$data['rtgs_bank']."',
                                            '".$data['rtgs_detail']."',
                                            '".$data['sale_id']."'
                                             ,'-','-','-','-','0','0','0'
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
                                           ,pure_metal_weight)
                                           
                                           VALUES(
                                            'Sale',
                                            '".$data['pay_mode']."',
                                            '".$data['upi_amt']."',
                                            '".$data['upi_refno']."',
                                            '".$data['upi_bank']."',
                                            '".$data['upi_detail']."',
                                            '".$data['sale_id']."',
                                             '-','-','-','-','0','0','0'
                                            )");
             save_query_in_log();
             $this->db->close(); 
             return $upi;
  }
}

    public function last_sid_details()
        {
            $this->db->reconnect();
            // $result  = $this->db->query("SELECT TOP 1 * FROM PRODUCTS ORDER BY ITEM_SNO DESC")->row();
            $result  = $this->db->query("SELECT * FROM AKS_SALE_QUTOTATION_ENTRY ORDER BY sale_id DESC")->row();
            // print_r($result);exit;
            save_query_in_log();
            $this->db->close(); 
            return $result;
        }
    public function getSupplier()
      {
        $this->other_db->reconnect();
        $result  = $this->other_db->query("SELECT * FROM ACC_LEDGERS WHERE GROUP_NAME='Karupatti' ORDER BY LEDGER_NAME ASC")->result_array();
        save_query_in_log();
        return $result;
      }
    
    public function get_sale_list_fill($fdate,$tdate,$offset,$page_limit)
    {
        $this->db->reconnect();
      // $result  = $this->db->query("SELECT * FROM AKS_SALE_QUTOTATION_ENTRY WHERE status='Y' $fdate $tdate $party_name $sale_id order by sid desc")->result_array();
      
        $result = $this->db->query(" SELECT  * FROM  ( SELECT *, ROW_NUMBER() OVER (ORDER BY sale_id DESC) AS sl FROM AKS_SALE_QUTOTATION_ENTRY WHERE  status!='N'  $fdate $tdate )N  WHERE  sl BETWEEN $offset AND $page_limit ")->result_array();

         // $result = $this->db->query(" SELECT  * FROM  ( SELECT *, ROW_NUMBER() OVER (ORDER BY pid DESC) AS sl FROM AKS_PURCHASE_ENTRY WHERE  status='Y' $fdate $tdate $sup_name $pur_id )N  WHERE  sl BETWEEN $offset AND $page_limit ")->result_array();

        // print_r($result);

        save_query_in_log();
        $this->db->close();
        return $result;
       
    }
 
public function get_sale_menu($pid)
    {
        $this->db->reconnect();
        $result  = $this->db->query("SELECT * FROM   AKS_PRD_MASTER WHERE AKS_PRD_MID = '".$pid."'")->row();
        save_query_in_log();
        $this->db->close();
        return $result;
    }

public function get_sale_detail()
    {
        $this->db->reconnect();
        $result  = $this->db->query("SELECT * FROM AKS_PRD_MASTER WHERE STATUS='Y'")->result_array();
        // print_r($result);
        // exit;
        save_query_in_log();
        $this->db->close();
        return $result;
    }
public function getParty($search)
      {
        $query = $this->db->query("SELECT TOP 25 * FROM PARTIES WHERE IS_KARUPATTI='1' AND STATUS='Y' AND ( PHONE LIKE '".$search.'%'."' OR NAME LIKE '".$search.'%'."')  ");
        $result = $query->result();
        save_query_in_log();
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
    public function get_supplier_list()
    {
        $this->other_db->reconnect();
        $result  = $this->other_db->query("SELECT * FROM ACC_LEDGERS WHERE GROUP_NAME='Suppliers-karupatti'" )->result_array();
        save_query_in_log();
        $this->other_db->close();
        return $result;
    }

    // ******************************************Edit Updated**********************************************

    public function get_salequo_edit_list($id)
    {
        $this->db->reconnect();
        $result  = $this->db->query("SELECT * FROM AKS_SALE_QUTOTATION_ENTRY WHERE sid='".$id."' AND status='Y'  ")->row();
        // print_r($result);
        // exit;
        save_query_in_log();
        $this->db->close();
        return $result;
    }
    public function get_edit_cart_list($slid)
    {
        $this->db->reconnect();
        $result  = $this->db->query("SELECT * FROM AKS_SALE_QUTOTATION_CART  WHERE sale_id = '".$slid."' AND status=0 ")->result_array();
        save_query_in_log();
        $this->db->close();
      
        return $result;

    }
    
    public function salequo_update($data,$saledate){

         $result  = $this->db->query("UPDATE AKS_SALE_QUTOTATION_ENTRY  SET

            sale_date = '".$saledate."',

            sale_party    = '".$data['sale_party']."',
            id_party     = '".$data['id_partys']."',
            party_type    = '".$data['party_type']."',

            sale_prd_count    = '".$data['sale_prd_count']."',
           
            sale_prd_tot_amt = '".$data['sale_prd_tot_amt']."',
            sale_dis_amt = '".$data['sale_dis_amt']."',
            sale_net_amt ='".$data['sale_net_amt']."',
            
            
            modified_by = '".$data['modified_by']."',
            modified_on = '".$data['modified_on']."',
            status = '".$data['status']."',
            
            remarks = '".$data['remarks']."'
            WHERE sale_id  = '".$data['sale_id']."'



            ");
      
           save_query_in_log();
          $this->db->close(); 
          return $result;

    }

}
?>    