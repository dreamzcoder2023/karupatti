<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/***************************************************************
    Purpose : To handle all the Area database details 2022-04-25
****************************************************************/
class Realestate_property_model extends CI_Model
{
    public $other_db;
  function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Calcutta'); 
        
    }

  public function  get_vao_group_name()
    {
        $this->db->reconnect();
        $result  = $this->db->query("SELECT * FROM VAO_GROUP")->result_array();
        
        // print_r($result);
        // exit();
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
        $result  = $this->db->query("SELECT * FROM AKS_PRD_MASTER WHERE AKS_PRD_MID = '".$pdid."'")->row();
        // print_r($result);
        // $id = $this->input->post('id');
        // $cname = $this->input->post('cname');
        save_query_in_log();
        $this->db->close();
      
        return $result;

        


    }

    public function getagentlistdropdown()
    {

        $this->other_db->reconnect();

        $result  = $this->other_db->query("SELECT * FROM ACC_LEDGERS  WHERE GROUP_NAME='RE_AGENT' ORDER BY GROUP_NAME ASC" )->result_array();
        save_query_in_log();
        // print_r("SELECT * FROM ACC_LEDGERS  WHERE LEDGER_NAME LIKE '".$search.'%'."'   AND GROUP_NAME='RE_AGENT');exit;
        $this->other_db->close();
        
        return $result;
    }

    
    
   public function property_entry($data){
         $por_date = date("Y-m-d",strtotime($data['porp_date'])); 
         $result  = $this->db->query("INSERT INTO realestate_purchase
           (property_id
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
           ,price_per_ploat
           ,ploat_no
           ,ploat_type
           ,pro_amount
           ,amenities
           ,description
           ,agent_name1
           ,agent_amt1
           ,document_images
           ,created_by
           ,created_on
           ,status
           ,paid_amount
           ,balance_amount
           ,property_status
           ,Prop_sts
           ,total_property_amount
           ,party_id
           ,prop_sts_update
           ,land_name
           ,land_lord
           ,pincode
           ,actual_buying_rate
           ,by_buying_rate
           ,stamp_paper_charges
           ,duty_charges
           ,vendor_charges
           ,actual_process_fees
           ,actual_stamp_paper_charges
           ,actual_duty_charges
           ,actual_vendor_charges
           ,process_fees
           ,acre
           ,cent
           ,squarefeet) VALUES
           ('".$data['property_ids']."',
            '".$por_date."', 
            '".$data['party_name']."',  
            '".$data['ref_name']."',  
            '".$data['vao_group']."',        
            '".$data['register_office']."',        
            '".$data['property_type']."',        
            '".$data['servey_no']."',        
            '".$data['partental_dno']."',        
            '".$data['document_curno']."',        
            '".$data['patta_no']."',        
            '".$data['street']."',        
            '".$data['area']."',        
            '".$data['city']."',        
            '".$data['state']."',        
            '".$data['lattitude']."',        
            '".$data['longtitude']."',       
            '".$data['price_per_ploat']."',        
            '".$data['ploat_no']."',        
            '".$data['ploat_type']."',        
            '".$data['pro_amount']."',        
            '".json_encode($data['amenities'])."',        
            '".$data['description']."',        
            '".$data['agent_count']."',   
            '".$data['agent_amt_tot']."',  
            '".$data['image_id']."',       
            '".$data['create_by']."',      
            '".$data['create_on']."',    
            '".$data['status']."',
            '".$data['paid_amount']."',        
            '".$data['balance_amount'] ."',
            '".$data['property_status']."',     
            '".$data['Prop_sts']."',     
            '".$data['total_property_amount']."',
            '".$data['party_id']."',
            '".$data['prop_sts_update']."',
            '".$data['land_name']."',
            '".$data['land_lord']."',
            '".$data['pincode']."',
            '".$data['actual_buying_rate']."',
            '".$data['by_buying_rate']."',
            '".$data['stamp_paper_charges']."',
            '".$data['duty_charges']."',
            '".$data['vendor_charges']."',
            '".$data['actual_process_fees']."',
            '".$data['actual_stamp_paper_charges']."',
            '".$data['actual_duty_charges']."',
            '".$data['actual_vendor_charges']."',
            '".$data['process_fees']."',

            '".$data['acre']."',
            '".$data['cent']."',
            '".$data['squarefeet']."'
        )");
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
                                            'RE-Property',
                                            'Cash',
                                            '".$data['cash_amount']."',
                                            '".$data['cash_detail']."',
                                            '".$data['property_id']."'
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
                                            'RE-Property',
                                            'Cheque',
                                            '".$data['cheque_amt']."',
                                            '".$data['cheque_bk']."',
                                            '".$data['cheque_refno']."',
                                            '".$data['cheque_detail']."',
                                            '".$data['property_id']."'
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
                                            'RE-Property',
                                            'UPI,
                                            '".$data['upi_amt']."',
                                            '".$data['upi_refno']."',
                                            
                                            '".$data['upi_detail']."',
                                            '".$data['property_id']."',
                                             '-','-','-','-','0','0','0'
                                            )");
             save_query_in_log();
             $this->db->close(); 
             return $upi;
  }
}
public function update_property_entry($data){
         $por_date = date("Y-m-d",strtotime($data['porp_date'])); 

         $result  = $this->db->query(" UPDATE realestate_purchase


    SET
       date = '".$por_date."'
      ,ref_name = '".$data['ref_name']."' 
      ,vao_group = '".$data['vao_group']."'
      ,register_office = '".$data['register_office']."'
      ,property_type = '".$data['property_type']."'
      ,servey_no = '".$data['servey_no']."' 
      ,partental_dno = '".$data['partental_dno']."' 
      ,document_curno =  '".$data['document_curno']."' 
      ,patta_no = '".$data['patta_no']."' 
      ,street = '".$data['street']."'
      ,area = '".$data['area']."' 
      ,city =  '".$data['city']."' 
      ,state = '".$data['state']."' 
      ,lattitude = '".$data['lattitude']."'
      ,longtitude = '".$data['longtitude']."'
      ,price_per_ploat = '".$data['price_per_ploat']."' 
      ,ploat_no = '".$data['ploat_no']."'
      ,ploat_type = '".$data['ploat_type']."'
      ,pro_amount = '".$data['pro_amount']."'
      ,description = '".$data['description']."'
      ,agent_name1 = '".$data['agent_count']."'
      ,agent_amt1 = '".$data['agent_amt_tot']."'
      ,modified_by = '".$data['modify_by']."'
      ,modified_on = '".$data['modify_on']."'
      ,paid_amount = '".$data['paid_amount']."'
      ,balance_amount = '".$data['balance_amount'] ."'
      ,total_property_amount = '".$data['total_property_amount']."'
      ,prop_sts_update = '".$data['prop_sts_update']."'
      ,amenities = '".json_encode($data['amenities'])."'
      ,land_name = '".$data['land_name']."'
      ,land_lord = '".$data['land_lord']."'
      ,pincode = '".$data['pincode']."',
        actual_buying_rate= '".$data['actual_buying_rate']."',
        by_buying_rate='".$data['by_buying_rate']."',
        stamp_paper_charges='".$data['stamp_paper_charges']."',
        duty_charges='".$data['duty_charges']."',
        vendor_charges='".$data['vendor_charges']."',
        actual_process_fees='".$data['actual_process_fees']."',
        actual_stamp_paper_charges='".$data['actual_stamp_paper_charges']."',
        actual_duty_charges='".$data['actual_duty_charges']."',
        actual_vendor_charges='".$data['actual_vendor_charges']."',
        process_fees='".$data['process_fees']."',
        acre='".$data['acre']."',
        cent='".$data['cent']."',
        squarefeet='".$data['squarefeet']."'

        WHERE property_id='".$data['property_id']."'"




        );
          
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
              WHERE bill_no='".$data['property_id']."' AND type_of_payment ='Cash'  ");


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
                           WHERE bill_no='".$data['property_id']."' AND type_of_payment ='Cheque'
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
                           WHERE bill_no='".$data['property_id']."' AND type_of_payment ='UPI'
                           ");
                                          
                                          
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
    
    
 public function get_por_list($pro_type,$ploat_type,$offset,$page_limit,$vaofill,$amenfill)
    {
        $this->db->reconnect();
        // $result  = $this->db->query("SELECT * FROM realestate_purchase WHERE status='Y' $fdate $tdate $party_name  $pro_type $ploat_type order by id desc")->result_array();
        $result = $this->db->query(" SELECT  * FROM  ( SELECT *, ROW_NUMBER() OVER (ORDER BY id DESC) AS sl FROM realestate_purchase WHERE  property_status='Existing' AND status='Y' $pro_type $ploat_type $vaofill $amenfill)N  WHERE  sl BETWEEN $offset AND $page_limit ")->result_array();

        // print_r($result);

        save_query_in_log();
        $this->db->close();
        return $result;
       
    }
  public function get_por_view($prop_id)
    {
       
         $this->db->reconnect();
         $result  = $this->db->query("SELECT * FROM realestate_purchase WHERE id=".$prop_id." AND property_status='Existing'  ")->row();
        
        // print_r($result);

        save_query_in_log();
        $this->db->close();
        return $result;
    }
    public function getUsers($search)
  {
     $query = $this->db->query("SELECT TOP 30 * from PARTIES where NAME LIKE '".$search.'%'."' OR PHONE LIKE '".$search.'%'."'  ");
    //$query = $this->db->query("SELECT * from PARTIES where AND PHONE LIKE '".$search.'%'."' ORDER BY NAME,LASTNAME_PREFIX,FATHERSNAME,ADDRESS1,ADDRESS2 ASC ");
    $result = $query->result();
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

        $result  = $this->other_db->query("SELECT TOP 30 * FROM ACC_LEDGERS  WHERE  LEDGER_NAME LIKE '".$search.'%'."'  AND GROUP_NAME='RE-AGENT' " )->result_array();
        save_query_in_log();
        // print_r("SELECT * FROM ACC_LEDGERS  WHERE LEDGER_NAME LIKE '".$search.'%'."'   AND GROUP_NAME='RE-AGENT');exit;
        $this->other_db->close();
        
        return $result;
    }
    public function prop_delete($uid)
    {
        $this->db->reconnect(); 
       // AKS_PRD_MASTER set PRD_CUR_QTY='".$qtot."' where AKS_PRD_MID=". $prdd
        $result  = $this->db->query("UPDATE realestate_purchase SET status='N' WHERE property_id='".$uid."'");
        save_query_in_log();
        $this->db->close();
        return $result;
    }
 
}
?>    