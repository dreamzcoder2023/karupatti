<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/***************************************************************
    Purpose : To handle all the Area database details 2022-08-22
****************************************************************/
class Aks_sale_model extends CI_Model
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
        $result  = $this->db->query("SELECT * FROM AKS_SALE_ENTRY WHERE sid= '".$sid."'")->result_array();
        save_query_in_log();
        $this->db->close();
        return $result;
    }
    public function get_sale_ship_view($sid)
    {
        $this->db->reconnect();
        $result  = $this->db->query("SELECT * FROM AKS_SALE_ENTRY WHERE sid= '".$sid."' AND status='S' ")->result_array();
        save_query_in_log();
        $this->db->close();
        return $result;
    }
    public function get_sale_ship_check($sid)
    {
        $this->db->reconnect();
        $result  = $this->db->query("SELECT * FROM AKS_SALE_ENTRY WHERE sid= '$sid' AND status='D' ")->row();
        print_r($result); exit;
        save_query_in_log();
        $this->db->close();
        return $result;
    }
    public function get_cart_view($sid){
       $this->db->reconnect();
        $result  = $this->db->query("SELECT * FROM AKS_SALE_CART WHERE sale_id  = '".$sid."' AND status=0 ")->result_array();
       
        save_query_in_log();
        $this->db->close();
      
        return $result;

    }
    public function get_cart_pos($sid){
       $this->db->reconnect();
        $result  = $this->db->query("SELECT * FROM AKS_SALE_CART WHERE sale_id  = '".$sid."' AND status=0 ")->result_array();
        // print_r($result);exit();
        // $id = $this->input->post('id');
        // $cname = $this->input->post('cname');
        save_query_in_log();
        $this->db->close();
      
        return $result;

    }
     public function get_cart_print($sid){
       $this->db->reconnect();
        $result  = $this->db->query("SELECT * FROM AKS_SALE_CART WHERE sale_id  = '".$sid."' AND status=0 ")->result_array();
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
         $result  = $this->db->query("SELECT * FROM AKS_SALE_ENTRY WHERE sid='".$spos."' ")->result_array();
        
        // print_r($result);exit();

        save_query_in_log();
        $this->db->close();
        return $result;
    }
    public function get_sale_print($sprint)
    {
       
         $this->db->reconnect();
         $result  = $this->db->query("SELECT * FROM AKS_SALE_ENTRY WHERE sid='".$sprint."' ")->result_array();
        
        // print_r($result);

        save_query_in_log();
        $this->db->close();
        return $result;
    }
    
    public function get_quo_cart_list($slid)
    {
        $this->db->reconnect();
        $result  = $this->db->query("SELECT * FROM AKS_SALE_QUTOTATION_CART  WHERE sale_id = '".$slid."' AND status=0")->result_array();
        save_query_in_log();
        $this->db->close();
      
        return $result;

    }
   public function get_cart_list($plid)
    {
        $this->db->reconnect();
        $result  = $this->db->query("SELECT * FROM AKS_PRD_MASTER  WHERE AKS_PRD_MID = '".$plid."' ")->row();
        // print_r($result);
        // $id = $this->input->post('id');
        // $cname = $this->input->post('cname');
        save_query_in_log();
        $this->db->close();
      
        return $result;
    }

    public function del_approve($data)
    {
        $this->db->reconnect();

        $res=$this->db->query("   
            (sale_dl_sts,sale_track_id) values ('".$data['sale_del_by']."','".$data['sale_track_id']."')");
         
    }
    public function sale_entry($data,$saledate){
         $result  = $this->db->query("INSERT INTO AKS_SALE_ENTRY
          

           (sale_date
           ,sale_id
           ,sale_party
           ,sale_prd_count
           ,sale_deliverymode
           ,delivery_by
           ,shipment_to
           ,sale_prd_tot_amt
           ,sale_dis_amt
           ,sale_net_amt
           ,sale_cash
           ,balance_cash
           ,create_by
           ,create_on
           ,status
           ,id_party
           ,shipment_charges
           ,remarks
           ,partial_packing
           ,sale_type
           ,del_supplier_id
           ,other_bill
           )
     VALUES
           (
           '".$saledate."',
           '".$data['sale_id']."',
           '".$data['sale_party']."',
           '".$data['sale_prd_count']."',
           '".$data['sale_deliverymode']."',
           '".$data['sale_delivery']."',
           '".$data['sale_shipment']."',
           '".$data['sale_prd_tot_amt']."',
           '".$data['sale_dis_amt']."',
           '".$data['sale_net_amt']."',
           '".$data['sale_cash']."',
           '".$data['balance_cash']."',
           '".$data['create_by']."',
           '".$data['create_on']."',
           '".$data['status']."',
           '".$data['id_partys']."',
           '".$data['shipment_charges']."',
           '".$data['remarks']."',
           '0',
           '".$data['type']."',
           '".$data['del_supplier_id']."',
           '".$data['other_bill']."'
           )");
      
           save_query_in_log();
          $this->db->close(); 
          return $result;

    }

     public function websale_entry($data,$saledate){
         $result  = $this->db->query("INSERT INTO AKS_SALE_ENTRY        

           (sale_date
           ,sale_id
           ,sale_party
           ,sale_prd_count
           ,sale_deliverymode
           ,sale_prd_tot_amt
           ,sale_dis_amt
           ,sale_net_amt
           ,sale_cash
           ,balance_cash
           ,create_by
           ,create_on
           ,status
           ,id_party
           ,shipment_charges
           ,remarks
           ,partial_packing
           ,sale_type
           ,del_supplier_id
           ,other_bill
           )
     VALUES
           (
           '".$saledate."',
           '".$data['sale_id']."',
           '".$data['sale_party']."',
           '".$data['sale_prd_count']."',
           '".$data['sale_deliverymode']."',
           '".$data['sale_prd_tot_amt']."',
           '".$data['sale_dis_amt']."',
           '".$data['sale_net_amt']."',
           '".$data['sale_cash']."',
           '".$data['balance_cash']."',
           '".$data['create_by']."',
           '".$data['create_on']."',
           '".$data['status']."',
           '".$data['id_partys']."',
           '".$data['shipment_charges']."',
           '".$data['remarks']."',
           '0',
           '".$data['type']."',
           '".$data['del_supplier_id']."',
           '".$data['other_bill']."'
           
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
                                           ,created_by
                                           ,created_on)
                                           
                                           VALUES(
                                            'Karupatti Sale',
                                            'Cash',
                                            '".$data['cash_amount']."',
                                            '".$data['cash_detail']."',
                                            '".$data['sale_id']."'
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
                                           ,created_on)
                                           
                                           
                                           VALUES(
                                            'Karupatti Sale',
                                            'Cheque',
                                            '".$data['cheque_amt']."',
                                            '".$data['cheque_supbk']."',
                                            '".$data['cheque_refno']."',
                                            '".$data['cheque_detail']."',
                                            '".$data['sale_id']."'
                                             ,'-','-','-','-','0','0','0'
                                              , '".$_SESSION['username']."', '".date('Y-m-d H:i:s')."'
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
                                           ,created_on)
                                           
                                           VALUES(
                                            'Karupatti Sale',
                                            'UPI',
                                            '".$data['upi_amt']."',
                                            '".$data['upi_refno']."',
                                            '".$data['upi_bank']."',
                                            '".$data['upi_detail']."',
                                            '".$data['sale_id']."',
                                             '-','-','-','-','0','0','0'
                                              , '".$_SESSION['username']."', '".date('Y-m-d H:i:s')."'
                                            )");
             save_query_in_log();
             $this->db->close(); 
             return $upi;
  }
}

public function upcashsave($data)
    {
        if($data['cash_amount']>0) {

        $cash = $this->db->query("UPDATE  payment_inward_outward SET 
                                   amount  ='".$data['cash_amount']."',
                                   remarks ='".$data['cash_detail']."'

                                   WHERE bill_no= '".$data['sale_id']."' AND type_of_payment='Cash'

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

                                   WHERE bill_no= '".$data['sale_id']."' AND type_of_payment='Cash'

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
                                           WHERE bill_no= '".$data['sale_id']."' AND type_of_payment='Cheque'

                                ");
             save_query_in_log();
             $this->db->close(); 
             return $cheque;
        }
        if($data['cheque_amt']<1) {
             $cheque = $this->db->query("UPDATE payment_inward_outward SET

                                           amount = '0',
                                           type_of_payment = 'Cheque Update'
                                           WHERE bill_no= '".$data['sale_id']."' AND type_of_payment='Cheque'

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
                                           WHERE bill_no= '".$data['sale_id']."' AND type_of_payment='UPI' ");
             save_query_in_log();
             $this->db->close(); 
             return $upi;
        }
        if($data['upi_amt']<1) {
            $upi = $this->db->query("UPDATE  payment_inward_outward SET
                                          
                                           amount = '0',
                                           type_of_payment = 'UPI Update'
                                           WHERE bill_no= '".$data['sale_id']."' AND type_of_payment='UPI' ");
             save_query_in_log();
             $this->db->close(); 
             return $upi;
        }
}

    public function last_sid_details()
        {
            $this->db->reconnect();
            // $result  = $this->db->query("SELECT TOP 1 * FROM PRODUCTS ORDER BY ITEM_SNO DESC")->row();
            $result  = $this->db->query("SELECT * FROM AKS_SALE_ENTRY WHERE partial_packing='0' ORDER BY sale_id DESC")->row();
            // print_r($result);exit;
            save_query_in_log();
            $this->db->close(); 
            return $result;
        }
    
     public function get_sale_list_fill($fdate,$tdate,$party_name,$sale_id,$offset,$page_limit,$stsfill,$closed_bill_sts)
    {
        $this->db->reconnect();
      // $result  = $this->db->query("SELECT * FROM AKS_SALE_ENTRY WHERE status='Y' $fdate $tdate $party_name $sale_id order by sid desc")->result_array();
      
        $result = $this->db->query(" SELECT  * FROM  ( SELECT *, ROW_NUMBER() OVER (ORDER BY sale_id DESC) AS sl FROM AKS_SALE_ENTRY WHERE  status!='N'  $fdate $tdate $party_name $closed_bill_sts $sale_id  $stsfill )N  WHERE  sl BETWEEN $offset AND $page_limit ")->result_array();

         // $result = $this->db->query(" SELECT  * FROM  ( SELECT *, ROW_NUMBER() OVER (ORDER BY pid DESC) AS sl FROM AKS_PURCHASE_ENTRY WHERE  status='Y' $fdate $tdate $sup_name $pur_id )N  WHERE  sl BETWEEN $offset AND $page_limit ")->result_array();

        // print_r($result);

        save_query_in_log();
        $this->db->close();
        return $result;
       
    }

   
 
    public function get_sale_menu($pid)
    {
        $this->db->reconnect();
        $result  = $this->db->query("SELECT * FROM   AKS_PRD_MASTER WHERE AKS_PRD_MID = '".$pid."' AND IS_SALE=1")->row();
        save_query_in_log();
        $this->db->close();
        return $result;
    }

    public function get_sale_detail()
    {
        $this->db->reconnect();
        $result  = $this->db->query("SELECT * FROM AKS_PRD_MASTER WHERE STATUS='Y' AND IS_SALE=1")->result_array();
        // print_r($result);
        // exit;
        save_query_in_log();
        $this->db->close();
        return $result;
    }

    public function getquotationlist()
    {
        $this->db->reconnect();
        $result  = $this->db->query("SELECT * FROM AKS_SALE_QUTOTATION_ENTRY WHERE status='Y' AND party_type!='' ")->result_array();
        // print_r($result);
        // exit;
        save_query_in_log();
        $this->db->close();
        return $result;
    }

    public function get_sale_quo_list($id)
    {
        $this->db->reconnect();
        $result  = $this->db->query("SELECT * FROM AKS_SALE_QUTOTATION_ENTRY WHERE sid='".$id."' AND status='Y'")->row();
        // print_r($result);
        // exit;
        save_query_in_log();
        $this->db->close();
        return $result;
    }
    
    public function getparty_list($id)
    {
        $this->db->reconnect();
        $result  = $this->db->query("SELECT * FROM PARTIES WHERE PID='".$id."' ")->row();
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
        $result  = $this->other_db->query("SELECT * FROM ACC_LEDGERS WHERE GROUP_NAME='Suppliers-karupatti' AND Status='Y'" )->result_array();
        save_query_in_log();
        $this->other_db->close();
        return $result;
    }

    // Edit Updated

    public function get_sale_edit_list($id)
    {
        $this->db->reconnect();
        $result  = $this->db->query("SELECT * FROM AKS_SALE_ENTRY WHERE sid='".$id."' AND status='Y'  ")->row();
        // print_r($result);
        // exit;
        save_query_in_log();
        $this->db->close();
        return $result;
    }
    public function get_edit_cart_list($slid)
    {
        $this->db->reconnect();
        $result  = $this->db->query("SELECT * FROM AKS_SALE_CART  WHERE sale_id = '".$slid."' AND status=0 ")->result_array();
        save_query_in_log();
        $this->db->close();
      
        return $result;

    }
    public function get_edit_web_cart_list($slid)
    {
        $this->db->reconnect();
        $result  = $this->db->query("SELECT * FROM AKS_WEB_SALE_LIST  WHERE web_id = '".$slid."' AND status='W' ")->row();
        save_query_in_log();
        $this->db->close();
      
        return $result;

    }
    
    public function sale_update($data,$saledate){

         $result  = $this->db->query("UPDATE AKS_SALE_ENTRY  SET

            sale_date = '".$saledate."',
            sale_prd_count    = '".$data['sale_prd_count']."',
            sale_deliverymode = '".$data['sale_deliverymode']."',
            delivery_by ='".$data['sale_delivery']."', 
            shipment_to ='".$data['sale_shipment']."',
            sale_prd_tot_amt = '".$data['sale_prd_tot_amt']."',
            sale_dis_amt = '".$data['sale_dis_amt']."',
            sale_net_amt ='".$data['sale_net_amt']."',
            sale_cash = '".$data['sale_cash']."',
            balance_cash = '".$data['sale_cash']."',
            create_by = '".$data['create_by']."',
            create_on = '".$data['create_on']."',

            modified_by = '".$data['modified_by']."',
            modified_on = '".$data['modified_on']."',
            status = '".$data['status']."',
            shipment_charges = '".$data['shipment_charges']."',
            remarks = '".$data['remarks']."'

            WHERE sale_id  = '".$data['sale_id']."'



            ");
      
           save_query_in_log();
          $this->db->close(); 
          return $result;

    }
    //******************************** Website 

    public function get_web_sale_list_fill($fdate,$tdate,$party_name,$offset,$page_limit)
    {
        $this->db->reconnect();
      // $result  = $this->db->query("SELECT * FROM AKS_SALE_ENTRY WHERE status='Y' $fdate $tdate $party_name $sale_id order by sid desc")->result_array();
      
        $result = $this->db->query(" SELECT  * FROM  ( SELECT *, ROW_NUMBER() OVER (ORDER BY wid DESC) AS sl FROM AKS_WEB_SALE_LIST WHERE  convert_status = 0  $fdate $tdate $party_name ) N  WHERE  sl BETWEEN $offset AND $page_limit ")->result_array();

        // $result = $this->db->query(" SELECT  * FROM  ( SELECT *, ROW_NUMBER() OVER (ORDER BY pid DESC) AS sl FROM AKS_PURCHASE_ENTRY WHERE  status='Y' $fdate $tdate $sup_name $pur_id )N  WHERE  sl BETWEEN $offset AND $page_limit ")->result_array();

        // print_r($result);

        save_query_in_log();
        $this->db->close();
        return $result;
       
    }

}
?>    