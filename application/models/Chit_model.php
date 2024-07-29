<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/***************************************************************
    Purpose : To handle all the Chit database details 2022-08-18
****************************************************************/
class Chit_model extends CI_Model
{
    public $other_db;
  function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Calcutta'); 
    }
 /* ************************************************************************************
                        Purpose : To handle Admin Chit Function 2022-08-18
            **********************************************************************/

    // To get Lotentry details
    public function getUsers($search)
      {
        $query = $this->db->query("SELECT TOP 25 * from PARTIES where NAME LIKE '".$search.'%'."'  ");
        // print_r("SELECT * from PARTIES where NAME LIKE '".$search.'%'."'  ");exit();
        $result = $query->result();
        save_query_in_log();
        return $result;
      }
      public function getParty($search)
      {
        $query = $this->db->query("SELECT * from PARTIES where NAME LIKE '".$search.'%'."'  ");
        $result = $query->result();
        save_query_in_log();
        return $result;
      }
      public function getChit($search)
      {
        $query = $this->db->query("SELECT * from CHIT_LIST where chit_id LIKE '".$search.'%'."'  ");
        // $result = $this->db->query("SELECT PT.NAME,PT.ADDRESS1,PT.ADDRESS2,PT.CITY,PT.PHONE,PT.RATING,PT.MEMBERSHIP_ID,PT.MEMBERSHIP_POINTS,CL.chit_id,CL.scheme_id,CL.collection_type,CM.sm_cash_chit_count,CM.tm_cash_chit_count,CM.tm_gold_chit_count FROM CHIT_LIST as CL ,PARTIES as  PT, CHIT_MASTER as CM WHERE CL.chit_id LIKE '".$search.'%'."' AND CL.party_id = PT.PID ")->result_array();
        $result = $query->result();
        save_query_in_log();
        return $result;
      }

    public function add_chit_entry($data,$tot_deposit,$sale_id)
    {
        $this->db->reconnect();
        $date_time = date("Y-m-d h:i:s");
        $chit_date = date("Y-m-d",strtotime($data['chit_date']));
        // print_r($sale_id);exit();
        // $result = $this->db->query("SELECT PID FROM PARTIES WHERE NAME = 'party_name' ");
        $result = $this->db->query("INSERT INTO CHIT_LIST (party_id,chit_date,collection_type
        ,collection_day,collection_date,scheme_type,scheme_id,tot_deposit,ava_balance,status,created_on,modified_on,created_by,modified_by,chit_id,type,chit_amount) VALUES ('".$data['party_id_hidden']."','".$chit_date."','".$data['collection_type']."',
                 '".$data['collec_day']."','".$data['collec_date']."','".$data['scheme_type']."','".$sale_id."','".$tot_deposit."','".$tot_deposit."','Y','".$date_time."','".$date_time."','".$data['created_by']."','".$data['modified_by']."','".$data['chit_id']."','1','".$data['chit_amount']."')");
        $res = $this->db->query("INSERT INTO CHIT_TRANSACTION (party_id,trans_date,scheme_type,scheme_id,transaction_type,opening_amount,processing_amount,closing_balance,amt_paid,per_gram,status,created_by,created_on,modified_by,modified_on,type) 
                                VALUES ('".$data['party_id_hidden']."','".$chit_date."','".$data['scheme_type']."','".$sale_id."','1','0','".$tot_deposit."','".$tot_deposit."','". $data['tm_gold_box']."','". $data['current_gold_rate']."','Y','".$data['created_by']."','".$date_time."','".$data['modified_by']."','".$date_time."','1') ");
        save_query_in_log();
        $this->db->close();
        return $result;
    }
    public function add_chit_transaction()
    {
        $this->db->reconnect();
        save_query_in_log();
        $this->db->close();
    }
    public function get_chit_modal_list($party_id)
    {
            // print_r($party_id);exit();
            $this->db->reconnect();
            $chit_list = $this->db->query("SELECT * FROM CHIT_LIST where party_id = '".$party_id."' AND status = 'Y' ORDER BY sno DESC")->result_array();
            save_query_in_log();
            $this->db->close();
            return $chit_list;
    }
    public function get_chit_modal_transaction($id)
    {
            // print_r($id);exit();
            $this->db->reconnect();
            $chit_list = $this->db->query("SELECT * FROM payment_inward_outward WHERE payment_id IN (".$id.");")->result_array();
            // print_r($chit_list);exit;
            save_query_in_log();
            $this->db->close();
            return $chit_list;
    }
    public function add_mpoint($data)
    {
        $this->db->reconnect();
        if ($data['m_points_ad']!='') {

        $m_point = $this->db->query("UPDATE PARTIES SET 
                    MEMBERSHIP_POINTS = COALESCE(MEMBERSHIP_POINTS, 0)+'".$data['m_points_ad']."', 
                    RATING    = '".$data['cus_rating']."'
                    WHERE PID = '".$data['party_id_hidden']."' ");
        $m_point2 = $this->db->query("UPDATE MEMBERSHIP_CARD SET 
                    POINTS = COALESCE(POINTS, 0)+'".$data['m_points_ad']."'
                    WHERE MEMBERSHIP_ID = '".$data['membership_id_hidden']."' ");
         }
         else{
            $m_point='';
         }
        save_query_in_log();
        $this->db->close();
        return $m_point;
    }
    public function add_master_sm($data)
    {
        $this->db->reconnect();
        $date_time = date("Y-m-d h:i:s");
        if($data['scheme_type']==1)
        {
        $r = $this->db->query("INSERT INTO CHIT_MASTER (
            party_id,sm_cash_chit_count,tm_cash_chit_count,tm_gold_chit_count,sm_cash_ava_amt,tm_cash_ava_amt,
            tm_gold_ava_amt,status,created_by,created_on,modified_by,modified_on) 
             VALUES (
            '".$data['party_id_hidden']."','1','','','".$data['sm_cash_box']."','".$data['tm_cash_box']."',
            '".$data['net_gm_lab1']."','Y','".$data['created_by']."','".$date_time."','".$data['modified_by']."','".$date_time."')");
        }
        else if($data['scheme_type']==2)
        {
        $r = $this->db->query("INSERT INTO CHIT_MASTER (
            party_id,sm_cash_chit_count,tm_cash_chit_count,tm_gold_chit_count,status,sm_cash_ava_amt,tm_cash_ava_amt,
            tm_gold_ava_amt,created_by,created_on,modified_by,modified_on) 
             VALUES (
            '".$data['party_id_hidden']."','','1','','Y','".$data['sm_cash_box']."','".$data['tm_cash_box']."',
            '".$data['net_gm_lab1']."','".$data['created_by']."','".$date_time."','".$data['modified_by']."','".$date_time."')");
        }
        else if($data['scheme_type']==3)
        {
        $r = $this->db->query("INSERT INTO CHIT_MASTER (
            party_id,sm_cash_chit_count,tm_cash_chit_count,tm_gold_chit_count,status,sm_cash_ava_amt,tm_cash_ava_amt,
            tm_gold_ava_amt,created_by,created_on,modified_by,modified_on) 
             VALUES (
            '".$data['party_id_hidden']."','','','1','Y','".$data['sm_cash_box']."','".$data['tm_cash_box']."',
            '".$data['net_gm_lab1']."','".$data['created_by']."','".$date_time."','".$data['modified_by']."','".$date_time."')");
        } 
        else
        {
            $r = '';
        }
        save_query_in_log();
        $this->db->close();
        return $r;
    }
    public function up_master_sm($data)
    {
        $this->db->reconnect();
        $date_time = date("Y-m-d h:i:s");
        if($data['scheme_type']==1)
        {
        $r = $this->db->query("UPDATE CHIT_MASTER SET
            party_id = '".$data['party_id_hidden']."',
            sm_cash_chit_count = sm_cash_chit_count+'1',
            tm_cash_chit_count = tm_cash_chit_count+'',
            tm_gold_chit_count = tm_gold_chit_count+'',
            sm_cash_ava_amt = sm_cash_ava_amt+'".$data['sm_cash_box']."',
            status =  'Y',
            created_by =  '".$data['created_by']."',
            created_on =  '".$date_time."',
            modified_by = '".$data['modified_by']."',
            modified_on =  '".$date_time."'
            WHERE party_id = '".$data['party_id_hidden']."' ");
        }
        else if($data['scheme_type']==2)
        {
        $r = $this->db->query("UPDATE CHIT_MASTER SET
            party_id = '".$data['party_id_hidden']."',
            sm_cash_chit_count = sm_cash_chit_count+'',
            tm_cash_chit_count = tm_cash_chit_count+'1',
            tm_gold_chit_count = tm_gold_chit_count+'',
           
            tm_cash_ava_amt = tm_cash_ava_amt+'".$data['tm_cash_box']."',
           
            status =  'Y',
            created_by =  '".$data['created_by']."',
            created_on =  '".$date_time."',
            modified_by = '".$data['modified_by']."',
            modified_on =  '".$date_time."'
            WHERE party_id = '".$data['party_id_hidden']."' ");
        }
        else if($data['scheme_type']==3)
        {
        $r = $this->db->query("UPDATE CHIT_MASTER SET
            party_id = '".$data['party_id_hidden']."',
            sm_cash_chit_count = sm_cash_chit_count+'',
            tm_cash_chit_count = tm_cash_chit_count+'',
            tm_gold_chit_count = tm_gold_chit_count+'1',
           
            tm_gold_ava_amt = tm_gold_ava_amt+'".$data['net_gm_lab1']."',
            status         =  'Y',
            created_by     =  '".$data['created_by']."',
            created_on     =  '".$date_time."',
            modified_by    = '".$data['modified_by']."',
            modified_on    =  '".$date_time."'
            WHERE party_id = '".$data['party_id_hidden']."' ");
        }
        else{
            $r = '';
        }
        save_query_in_log();
        $this->db->close();
        return $r;
    }
    public function add_master_tm($data)
    {
        $this->db->reconnect();
        $date_time = date("Y-m-d h:i:s");
        if($data['scheme_type']==2)
        {
        $r = $this->db->query("INSERT INTO CHIT_MASTER (
            party_id,sm_cash_chit_count,tm_cash_chit_count,tm_gold_chit_count,status,sm_cash_ava_amt,tm_cash_ava_amt,
            tm_gold_ava_amt,created_by,created_on,modified_by,modified_on) 
            VALUES (
            '".$data['party_id_hidden']."','','1','','Y','".$data['sm_cash_box']."','".$data['tm_cash_box']."',
            '".$data['tm_gold_box']."','".$data['created_by']."','".$date_time."','".$data['modified_by']."','".$date_time."')");
             }
        save_query_in_log();
        $this->db->close();
        return $r;
    }
    
    public function add_master_tmg($data)
    {
        $this->db->reconnect();
        $date_time = date("Y-m-d h:i:s");
        
        save_query_in_log();
        $this->db->close();
             
    }
    
    // public function add_amount_entry($data)
    // {
    //     $this->db->reconnect();
        
    //     save_query_in_log();
    //     $this->db->close();
    // } 
    public function add_cash_entry($data)
    {
        $this->db->reconnect();
        $date_time = date("Y-m-d h:i:s");
        if($data['cash_amt']>0) {
        $cash = $this->db->query("INSERT INTO payment_inward_outward 
                (module_name,type_of_payment,amount,party_bank,cheque_ref_no,remarks,bill_no,party_id,payment_side,
                metal_type,quality,purity,weight,pure_metal_weight,created_by,created_on,record_status) 
                VALUES (
                'Chit','".$data['cash_val']."','".$data['cash_amt']."','','','".$data['cash_details']."',
                '".$data['chit_id']."','".$data['party_id_hidden']."','CR','0','0','0','0','0','".$data['created_by']."','".$date_time."',
                '0')");
                }
                else{
                    $cash='';
                }
        save_query_in_log();
        $this->db->close();
        return $cash;
    }
    public function add_bank_entry($data)
    {
        $this->db->reconnect();
        $date_time = date("Y-m-d h:i:s");

        if($data['bank_amt']>0) {
        
        $bank = $this->db->query("INSERT INTO payment_inward_outward 
                (module_name,type_of_payment,amount,party_bank,cheque_ref_no,remarks,bill_no,party_id,payment_side,
                metal_type,quality,purity,weight,pure_metal_weight,created_by,created_on,record_status) 
                VALUES (
                    'Chit','".$data['bank_val']."','".$data['bank_amt']."','".$data['bank_name']."','".$data['cheque_no']."',
                    '".$data['bank_details']."','".$data['chit_id']."','".$data['party_id_hidden']."','CR','0',
                    '0','0','0','0','".$data['created_by']."','".$date_time."',
                    '0')");

                }else{
                    $bank='';
                }
        save_query_in_log();
        $this->db->close();
        return $bank;
    }
    public function add_rtgs_entry($data)
    {
        $this->db->reconnect();
        $date_time = date("Y-m-d h:i:s");
        if($data['rtgs_amt']>0) {
        $rtgs = $this->db->query("INSERT INTO payment_inward_outward 
                (module_name,type_of_payment,amount,party_bank,cheque_ref_no,remarks,bill_no,party_id,payment_side,
                metal_type,quality,purity,weight,pure_metal_weight,created_by,created_on,record_status) 
                VALUES (
                    'Chit','".$data['rtgs_val']."','".$data['rtgs_amt']."','".$data['rtgs_name']."','".$data['rtgs_no']."',
                    '".$data['rtgs_details']."','".$data['chit_id']."','".$data['party_id_hidden']."','CR','0',
                    '0','0','0','0','".$data['created_by']."','".$date_time."',
                    '0')");
                }else{
                    $rtgs='';
                }
        save_query_in_log();
        $this->db->close();
        return $rtgs;
    }
    public function add_upi_entry($data)
    {
        $this->db->reconnect();
        $date_time = date("Y-m-d h:i:s");
        if($data['upi_amt']>0) {
        $upi = $this->db->query("INSERT INTO payment_inward_outward 
                (module_name,type_of_payment,amount,party_bank,cheque_ref_no,remarks,bill_no,party_id,payment_side,
                metal_type,quality,purity,weight,pure_metal_weight,created_by,created_on,record_status) 
                VALUES (
                    'Chit','".$data['upi_val']."','".$data['upi_amt']."','','".$data['upi_no']."','".$data['upi_details']."',
                    '".$data['chit_id']."','".$data['party_id_hidden']."','CR','0','0','0','0','0','".$data['created_by']."','".$date_time."',
                    '0')");
        }
        else{
            $upi='';
        }

        save_query_in_log();
        $this->db->close();
        return $upi;
    }
    public function dp_chit_entry($data)
    {
        $this->db->reconnect();
        $date_time = date("Y-m-d h:i:s");
        // print_r($data['chit_date']);
        $chit_date = date("Y-m-d",strtotime($data['chit_date']));
        if($data['sm_cash_box'] != '')
        {
        $result = $this->db->query("UPDATE CHIT_LIST SET 
                tot_deposit = COALESCE(tot_deposit, 0)+".$data['sm_cash_box'].",
                ava_balance = COALESCE(ava_balance, 0)+".$data['sm_cash_box'].",
                modified_by='".$_SESSION['username'] ."',
                modified_on = '".$date_time."'
                WHERE party_id = '".$data['party_id_hidden']."' AND  chit_id = '".$data['chit_id']."' ");

        $result1 = $this->db->query("UPDATE CHIT_MASTER SET 
                sm_cash_ava_amt = COALESCE(sm_cash_ava_amt, 0)+".$data['sm_cash_box']."
                WHERE party_id = '".$data['party_id_hidden']."'");
        }
       
        if($data['tm_cash_box'] != '')
        {
        
            $result = $this->db->query("UPDATE CHIT_LIST SET                
            tot_deposit = COALESCE(tot_withdraw, 0)+".$data['tm_cash_box'].",
            ava_balance = COALESCE(ava_balance, 0)+".$data['tm_cash_box'].",
           modified_by='".$_SESSION['username'] ."',
            modified_on = '".$date_time."'
            WHERE party_id = '".$data['party_id_hidden']."' AND  chit_id = '".$data['chit_id']."' ");

            $result1 = $this->db->query("UPDATE CHIT_MASTER SET 
                                  
            tm_cash_ava_amt = COALESCE(tm_cash_ava_amt, 0)+".$data['tm_cash_box']."
          
            WHERE party_id = '".$data['party_id_hidden']."'");


        }
        if($data['tm_gold_box'] != '')
        {
            $result = $this->db->query("UPDATE CHIT_LIST SET                                    
            tot_deposit = COALESCE(tot_deposit, 0)+".$data['net_gm_lab1'].",
            ava_balance = COALESCE(ava_balance, 0)+".$data['net_gm_lab1'].",
            modified_by='".$_SESSION['username'] ."',
            modified_on = '".$date_time."'
            WHERE party_id = '".$data['party_id_hidden']."' AND  chit_id = '".$data['chit_id']."' ");

            $result1 = $this->db->query("UPDATE CHIT_MASTER SET 
                                  
            tm_gold_ava_amt = COALESCE(tm_gold_ava_amt, 0)+".$data['net_gm_lab1']."
          
            WHERE party_id = '".$data['party_id_hidden']."'");
        }
        save_query_in_log();
        $this->db->close();
        return $result;
    }
    public function dp_chit_trans($data)
    {
        $date_time = date("Y-m-d h:i:s");
        $chit_date = date("Y-m-d",strtotime($data['chit_date']));
        
        if($data['sm_cash_box']!='')
        {

            $closing_amount=$data['ava_balance']+$data['sm_cash_box'];

           $result=$this->db->query("INSERT INTO CHIT_TRANSACTION (trans_date
           ,party_id,scheme_type,scheme_id,transaction_type,opening_amount,processing_amount,closing_balance
           ,amt_paid,per_gram,status,created_by,created_on,type)
           VALUES ('".$chit_date."',
           '".$data['party_id_hidden']."','1' ,'".$data['scheme_id']."','1','".$data['ava_balance']."',
           '".$data['sm_cash_box']."','".$closing_amount."','','','Y','".$_SESSION['username']."' ,
           '".date('Y-m-d H:i:s')."','1' )
           ");
           return $result;
        }
       
        if($data['tm_cash_box']!='')
        {

            $closing_amount=$data['ava_balance']+$data['tm_cash_box'];

            $result=$this->db->query("  INSERT INTO CHIT_TRANSACTION (trans_date
            ,party_id,scheme_type,scheme_id,transaction_type,opening_amount,processing_amount,closing_balance
            ,amt_paid,per_gram,status,created_by,created_on,type)
            VALUES ('".$chit_date."',
            '".$data['party_id_hidden']."','2' ,'".$data['scheme_id']."','1','".$data['ava_balance']."',
            '".$data['tm_cash_box']."','".$closing_amount."','','','Y','".$_SESSION['username']."' ,
            '".date('Y-m-d H:i:s')."' ,'1')
            ");
            return $result;
        }
        if($data['tm_gold_box']!='')
        {
            $closing_amount=$data['ava_balance']+$data['net_gm_lab1'];

            $result=$this->db->query("  INSERT INTO CHIT_TRANSACTION (trans_date
            ,party_id,scheme_type,scheme_id,transaction_type,opening_amount,processing_amount,closing_balance
            ,amt_paid,per_gram,status,created_by,created_on,type)
            VALUES ('".$chit_date."',
            '".$data['party_id_hidden']."','3' ,'".$data['scheme_id']."','1','".$data['ava_balance']."',
            '".$data['net_gm_lab1']."','".$closing_amount."','".$data['tm_gold_box']."','','Y',
            '".$_SESSION['username']."' ,'".date('Y-m-d H:i:s')."','1' )
            ");
        }
        return $result;
    }
    public function dp_cash_entry($data)
    {
        $this->db->reconnect();
        $date_time = date("Y-m-d h:i:s");

        if($data['cash_amt']>0) {
        
            $cash = $this->db->query("INSERT INTO payment_inward_outward 
                    (module_name,type_of_payment,amount,party_bank,cheque_ref_no,remarks,bill_no,party_id,
                    payment_side,metal_type,quality,purity,weight,pure_metal_weight,created_by,created_on,
                    record_status) VALUES (
                        'Chit','".$data['cash_val']."','".$data['cash_amt']."','','','".$data['cash_details']."',
                        '".$data['chit_id']."','".$data['party_id_hidden']."','CR','0','0','0','0','0','".$data['created_by']."','".$date_time."',
                        '0')");
            save_query_in_log();
            $this->db->close();
            return $cash;
        }
    }
    public function dp_bank_entry($data)
    {
        $this->db->reconnect();
        $date_time = date("Y-m-d h:i:s");

        if($data['bank_amt']>0) {
        
            $bank = $this->db->query("INSERT INTO payment_inward_outward 
                    (module_name,type_of_payment,amount,party_bank,cheque_ref_no,remarks,bill_no,party_id,
                    payment_side,metal_type,quality,purity,weight,pure_metal_weight,created_by,created_on,
                    record_status) VALUES (
                        'Chit','".$data['bank_val']."','".$data['bank_amt']."','".$data['bank_name']."',
                        '".$data['cheque_no']."','".$data['bank_details']."','".$data['chit_id']."',
                        '".$data['party_id_hidden']."','CR','0','0','0','0','0','".$data['created_by']."','".$date_time."',
                        '0')");
            save_query_in_log();
            $this->db->close();
            return $bank;
        }
    }
    public function dp_rtgs_entry($data)
    {
        $this->db->reconnect();
        $date_time = date("Y-m-d h:i:s");

        if($data['rtgs_amt']>0) {
        
            $rtgs = $this->db->query("INSERT INTO payment_inward_outward 
                    (module_name,type_of_payment,amount,party_bank,cheque_ref_no,remarks,bill_no,party_id,
                    payment_side,metal_type,quality,purity,weight,pure_metal_weight,created_by,created_on,
                    record_status) VALUES (
                        'Chit','".$data['rtgs_val']."','".$data['rtgs_amt']."','".$data['rtgs_name']."',
                        '".$data['rtgs_no']."','".$data['rtgs_details']."','".$data['chit_id']."',
                        '".$data['party_id_hidden']."','CR','0','0','0','0','0','".$data['created_by']."','".$date_time."',
                        '0')");
            save_query_in_log();
            $this->db->close();
            return $rtgs;
        }
    }
    public function dp_upi_entry($data)
    {
        $this->db->reconnect();
        $date_time = date("Y-m-d h:i:s");
        if($data['upi_amt']>0) {        
            $upi = $this->db->query("INSERT INTO payment_inward_outward 
                    (module_name,type_of_payment,amount,party_bank,cheque_ref_no,remarks,bill_no,party_id,
                    payment_side,metal_type,quality,purity,weight,pure_metal_weight,created_by,created_on,
                    record_status) VALUES (
                        'Chit','".$data['upi_val']."','".$data['upi_amt']."','','".$data['upi_no']."','".$data['upi_details']."',
                        '".$data['chit_id']."','".$data['party_id_hidden']."','CR','0','0','0','0','0','".$data['created_by']."','".$date_time."',
                        '0')");
            save_query_in_log();
            $this->db->close();
            return $upi;
        }
    }
    public function wd_chit_entry($data)
    {
        $this->db->reconnect();
        $date_time = date("Y-m-d h:i:s");
        $chit_date = date("Y-m-d",strtotime($data['chit_date']));


        $result = $this->db->query("INSERT INTO CHIT_LIST (party_id,chit_date,scheme_type,tot_deposit,ava_balance,status,created_on,modified_on,created_by,modified_by,type) 
        VALUES ('".$data['party_id_hidden']."','".$chit_date."','".$data['scheme_type']."','".$data['sm_cash_box']."','".$data['tm_cash_box']."','Y','".$date_time."','".$date_time."','".$data['created_by']."','".$data['modified_by']."','1')");

        // $res = $this->db->query("INSERT INTO CHIT_TRANSACTION (party_id,trans_date,scheme_type) VALUES ('".$data['party_id_hidden']."','".$chit_date."','".$data['scheme_type']."' ) ");
        // $r = $this->db->query("INSERT INTO CHIT_MASTER (party_id) VALUES ('".$data['party_id_hidden']."')");
        // $pay_add = $this->db->query("INSERT INTO payment_inward_outward (module_name,type_of_payment,amount,party_bank,cheque_ref_no,remarks,bill_no,party_id,payment_side,metal_type,quality,purity,weight,pure_metal_weight,created_by,created_on,record_status) VALUES ('Chit','".$data['payment_type']."','".$data['cash_amt']."','".$data['bank_name']."','".$data['cheque_no']."','".$data['cash_details']."','".$data['chit_id']."','".$data['party_id_hidden']."','DR','0','0','0','0','0','0','YYYY-MM-DD HH:MI:SS','0')");
        save_query_in_log();
        $this->db->close();
        return $result;
    }
    public function wd_chit_trans($data)
    {
        $date_time = date("Y-m-d h:i:s");
        $chit_date = date("Y-m-d",strtotime($data['chit_date']));
        if($data['sm_cash_box']!='')
        {
            $closing_amount=$data['ava_balance']-$data['sm_cash_box'];

            $result=$this->db->query("  INSERT INTO CHIT_TRANSACTION (trans_date
            ,party_id,scheme_type,scheme_id,transaction_type,opening_amount,processing_amount,closing_balance
            ,amt_paid,per_gram,status,created_by,created_on,modified_by,modified_on,type)
            VALUES ('".$chit_date."',
            '".$data['party_id_hidden']."','1' ,'".$data['scheme_id']."','1','".$data['ava_balance']."',
            '".$data['sm_cash_box']."','".$closing_amount."','','','Y','".$_SESSION['username']."' ,
            '".date('Y-m-d H:i:s')."','".$_SESSION['username']."','".date('Y-m-d H:i:s')."','1' )
            ");
        }
        if($data['tm_cash_box']!='')
        {
            $closing_amount=$data['ava_balance']-$data['tm_cash_box'];

            $result=$this->db->query("  INSERT INTO CHIT_TRANSACTION (trans_date
            ,party_id,scheme_type,scheme_id,transaction_type,opening_amount,processing_amount,closing_balance
            ,amt_paid,per_gram,status,created_by,created_on,modified_by,created_by,type)
            VALUES 
            ('".$chit_date."','".$data['party_id_hidden']."','1' ,'".$data['scheme_id']."','1','".$data['ava_balance']."',
            '".$data['tm_cash_box']."','".$closing_amount."','','','Y','".$_SESSION['username']."' ,'".date('Y-m-d H:i:s')."',
            ,'".$_SESSION['username']."','".date('Y-m-d H:i:s')."','1')
            ");
        }
        return $result;
   
    }
    public function wd_cash_entry($data)
    {
        $this->db->reconnect();
        $date_time = date("Y-m-d h:i:s");

        if($data['cash_amt']>0) {
        
            $cash = $this->db->query("INSERT INTO payment_inward_outward 
                    (module_name,type_of_payment,amount,party_bank,cheque_ref_no,remarks,bill_no,party_id,payment_side,
                    metal_type,quality,purity,weight,pure_metal_weight,created_by,created_on,record_status) 
                    VALUES (
                        'Chit','".$data['cash_val']."','".$data['cash_amt']."','','','".$data['cash_details']."',
                        '".$data['chit_id']."','".$data['party_id_hidden']."','DR','0','0','0','0','0','".$data['created_by']."','".$date_time."',
                        '0')");
            save_query_in_log();
            $this->db->close();
            return $cash;
        }
    }
    public function wd_bank_entry($data)
    {
        $this->db->reconnect();
        $date_time = date("Y-m-d h:i:s");

        if($data['bank_amt']>0) {
        
            $bank = $this->db->query("INSERT INTO payment_inward_outward 
                    (module_name,type_of_payment,amount,company_bank,cheque_ref_no,remarks,bill_no,party_id,payment_side,
                    metal_type,quality,purity,weight,pure_metal_weight,created_by,created_on,record_status) 
                    VALUES ('Chit','".$data['bank_val']."','".$data['bank_amt']."','".$data['bank_name']."','".$data['cheque_no']."','".$data['bank_details']."',
                        '".$data['chit_id']."','".$data['party_id_hidden']."','DR','0','0','0','0','0','".$data['created_by']."','".$date_time."',
                        '0')");

            save_query_in_log();
            $this->db->close();
            return $bank;
        }
    }
    public function wd_rtgs_entry($data)
    {
        $this->db->reconnect();
        $date_time = date("Y-m-d h:i:s");

        if($data['rtgs_amt']>0) {
        
            $rtgs = $this->db->query("INSERT INTO payment_inward_outward 
                    (module_name,type_of_payment,amount,party_bank,cheque_ref_no,remarks,bill_no,party_id,payment_side,
                    metal_type,quality,purity,weight,pure_metal_weight,created_by,created_on,record_status) 
                    VALUES (
                        'Chit','".$data['rtgs_val']."','".$data['rtgs_amt']."','".$data['rtgs_name']."','".$data['rtgs_no']."',
                        '".$data['rtgs_details']."','".$data['chit_id']."','".$data['party_id_hidden']."','DR','0',
                        '0','0','0','0','".$_SESSION['username']."','".$date_time."','0')");
            save_query_in_log();
            $this->db->close();
            return $rtgs;
        }
    }
    public function wd_upi_entry($data)
    {
        $this->db->reconnect();
        $date_time = date("Y-m-d h:i:s");

        if($data['upi_amt']>0) {
        
            $upi = $this->db->query("INSERT INTO payment_inward_outward 
                    (module_name,type_of_payment,amount,party_bank,cheque_ref_no,remarks,bill_no,party_id,payment_side,
                    metal_type,quality,purity,weight,pure_metal_weight,created_by,created_on,record_status) 
                    VALUES (
                        'Chit','".$data['upi_val']."','".$data['upi_amt']."','','".$data['upi_no']."','".$data['upi_details']."',
                        '".$data['chit_id']."','".$data['party_id_hidden']."','DR','0','0','0','0','0','".$_SESSION['username']."','".$date_time."',
                        '0')");
            save_query_in_log();
            $this->db->close();
            return $upi;
        }
    }
    public function get_chit_list($party_fil,$offset,$page_limit)
    {
        $this->db->reconnect();
        // print_r("SELECT PARTIES.NAME, PARTIES.PID, PARTIES.RATING, CHIT_MASTER.sno, CHIT_MASTER.sm_cash_chit_count, CHIT_MASTER.party_id, CHIT_MASTER.sm_cash_ava_amt, CHIT_MASTER.tm_cash_chit_count, CHIT_MASTER.tm_cash_ava_amt, CHIT_MASTER.tm_gold_chit_count, CHIT_MASTER.tm_gold_ava_amt
        // FROM PARTIES
        // INNER JOIN CHIT_MASTER ON PARTIES.PID = CHIT_MASTER.party_id WHERE CHIT_MASTER.status = 'Y' ORDER BY CHIT_MASTER.sno DESC $party_fil");exit;
        $result  = $this->db->query("SELECT * FROM ( SELECT PARTIES.NAME, PARTIES.PID, PARTIES.RATING, CHIT_MASTER.party_id, CHIT_MASTER.sno, ROW_NUMBER() 
        OVER ( ORDER BY CHIT_MASTER.sno DESC ) AS sl FROM PARTIES
        INNER JOIN CHIT_MASTER ON PARTIES.PID = CHIT_MASTER.party_id WHERE CHIT_MASTER.status = 'Y' $party_fil )N
        WHERE sl BETWEEN $offset AND $page_limit ORDER BY N.sno DESC ")->result_array();
        save_query_in_log();
        $this->db->close();
        // print_r($result);exit;
       // return $sm_count;
        return $result;
    }
    
    public function get_all_transaction_list($party_fil,$tdate,$fdate,$scheme_sel,$sta_sel,$offset,$page_limit,$chit_id_fill)
    {
        $this->db->reconnect();
        $result  = $this->db->query("SELECT * FROM ( SELECT PARTIES.NAME, PARTIES.RATING, PARTIES.PID, PARTIES.MEMBERSHIP_POINTS, 
        CHIT_TRANSACTION.sno, CHIT_TRANSACTION.party_id, CHIT_TRANSACTION.trans_date,CHIT_TRANSACTION.scheme_type, 
        CHIT_TRANSACTION.scheme_id, CHIT_TRANSACTION.transaction_type, CHIT_TRANSACTION.opening_amount, 
        CHIT_TRANSACTION.processing_amount, CHIT_TRANSACTION.closing_balance, CHIT_TRANSACTION.amt_paid, CHIT_TRANSACTION.payment_id,
        CHIT_TRANSACTION.type, CHIT_LIST.chit_id, ROW_NUMBER() OVER ( ORDER BY CHIT_TRANSACTION.sno DESC ) AS sl FROM PARTIES
        INNER JOIN CHIT_TRANSACTION 
        ON PARTIES.PID = CHIT_TRANSACTION.party_id 
        INNER JOIN CHIT_LIST 
        ON CHIT_LIST.scheme_id = CHIT_TRANSACTION.scheme_id
        WHERE CHIT_TRANSACTION.status = 'Y' $party_fil $fdate $tdate $scheme_sel $sta_sel $chit_id_fill)N WHERE sl BETWEEN $offset AND $page_limit ORDER BY N.sno DESC")->result_array();
        save_query_in_log();
        $this->db->close();
        return $result;
    }
    public function get_one_transaction_list($tdate,$fdate,$scheme_sel,$sta_sel,$pid,$offset,$page_limit)
    {
        $this->db->reconnect();
        $result  = $this->db->query("SELECT * FROM ( SELECT PARTIES.NAME, PARTIES.RATING, PARTIES.PID, PARTIES.MEMBERSHIP_POINTS, 
        CHIT_TRANSACTION.sno, CHIT_TRANSACTION.party_id, CHIT_TRANSACTION.trans_date,CHIT_TRANSACTION.scheme_type, 
        CHIT_TRANSACTION.scheme_id, CHIT_TRANSACTION.transaction_type, CHIT_TRANSACTION.opening_amount, 
        CHIT_TRANSACTION.processing_amount, CHIT_TRANSACTION.closing_balance, CHIT_TRANSACTION.amt_paid , CHIT_TRANSACTION.payment_id ,
        CHIT_TRANSACTION.type, CHIT_LIST.chit_id , ROW_NUMBER() OVER ( ORDER BY CHIT_TRANSACTION.sno DESC ) AS sl FROM PARTIES
        INNER JOIN CHIT_TRANSACTION 
        ON PARTIES.PID = CHIT_TRANSACTION.party_id 
        INNER JOIN CHIT_LIST 
        ON CHIT_LIST.scheme_id = CHIT_TRANSACTION.scheme_id
        WHERE CHIT_TRANSACTION.party_id = '".$pid."' AND CHIT_TRANSACTION.status = 'Y' $fdate $tdate $scheme_sel $sta_sel )N WHERE sl BETWEEN $offset AND $page_limit ORDER BY N.sno DESC")->result_array();
        // print_r($result);exit;
        save_query_in_log();
        $this->db->close();
        return $result;
    }
    public function get_modal_chit_list($party_id)
    {
        // print_r($party_id);exit();
        $this->db->reconnect();
        $result = $this->db->query("SELECT * FROM CHIT_LIST WHERE party_id = '".$party_id."' ")->row();
        save_query_in_log();
        $this->db->close();
        return $result;
    }
    public function get_modal_trans_list($party_id)
    {
        // print_r($party_id);exit();
        $this->db->reconnect();
        $result = $this->db->query("SELECT PARTIES.MEMBERSHIP_POINTS, payment_inward_outward.type_of_payment, CHIT_TRANSACTION.trans_date, CHIT_TRANSACTION.scheme_type, CHIT_TRANSACTION.transaction_type, CHIT_TRANSACTION.scheme_id, CHIT_TRANSACTION.opening_amount, CHIT_TRANSACTION.processing_amount, CHIT_TRANSACTION.closing_balance 
        FROM ((PARTIES 
        INNER JOIN payment_inward_outward ON PARTIES.PID = payment_inward_outward.party_id)
        INNER JOIN CHIT_TRANSACTION ON PARTIES.PID = CHIT_TRANSACTION.party_id)")->row();
        save_query_in_log();
        $this->db->close();
        return $result;
    }
    public function get_chit_list_view()
    {
        $this->db->reconnect();
        $result  = $this->db->query("SELECT * FROM CHIT_LIST")->result_array();
        save_query_in_log();
        $this->db->close();
        return $result;
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
    public function get_banks_list()
    {
        $this->db->reconnect();
        $result  = $this->db->query("SELECT * FROM BANKS")->result_array();
        save_query_in_log();
        $this->db->close();
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
    public function get_sub_item_list()
    {
        $this->db->reconnect();
        $result  = $this->db->query("SELECT SUBITEM_NAME FROM SUBITEM_LIST")->result_array();
        save_query_in_log();
        $this->db->close();

        //print_r($result);exit();
        return $result;
    }
    

    public function add_lotentry_master($data)
    {
        $this->db->reconnect();
        //print_r($data);exit();
        $res = $this->db->query("INSERT INTO lot_entry (
            supplier, lot_date, company_id, metal_type, item_count,item_weight,pure_metal_weight,
            pure_metal_rate,amount,charges,amount_to_pay,cash,cheque_amt,cheque_bank,cheque_number,
            rtgs_amt,rtgs_bank,rtgs_number,metal,metal_amount,metal_purity,metal_weight,cash_detail,
            cheque_detail,rtgs_detail,paid_amount,balance_amount,lot_no,img,created_on,created_by,
            status
            ) VALUES(
            '".$data['supplier_name']."','".$data['date']."','".$data['company_id']."','".$data['metal_type']."',
           '".$data['all_count']."','".$data['all_weight']."','".$data['pure_metal_weight1']."','".$data['pure_metal_rate1']."',
           '".$data['t_amount']."','".$data['other_charges']."','".$data['amount_pay']."','".$data['cash_pay']."',
            '".$data['cheq_pay']."','".$data['bank_cheq']."','".$data['cheq_no']."','".$data['rtgs_pay']."',
            '".$data['bank_rtgs']."','".$data['rtgs_trans']."','".$data['metal']."','".$data['metal_pay']."',
            '".$data['purity_pay']."','".$data['metal_weight']."','".$data['cash_detail']."','".$data['cheque_detail']."',
            '".$data['rtgs_detail']."','".$data['paid_amount_pay']."','".$data['bal_amount']."','".$data['lot_no']."',
            '".$data['lot_no1']."','".$data['created_on']."','".$data['added_user']."','".$data['status']."')");
        save_query_in_log();
        $this->db->close();
        return $res;
    }
        public function get_last_sno_details()
        {
            $this->db->reconnect();
            // $result  = $this->db->query("SELECT TOP 1 * FROM PRODUCTS ORDER BY ITEM_SNO DESC")->row();
            $result  = $this->db->query("SELECT * FROM lot_entry ORDER BY lot_id DESC")->row();
            save_query_in_log();
            $this->db->close(); 
            return $result;
        }
        public function wt_chit_entry($data)
        {
            $this->db->reconnect();
            $date_time = date("Y-m-d h:i:s");
            // print_r($data['chit_date']);
            $chit_date = date("Y-m-d",strtotime($data['chit_date']));
            if($data['sm_cash_box'] != '')
            {
        
                $result = $this->db->query("UPDATE CHIT_LIST SET               
                tot_withdraw = COALESCE(tot_withdraw, 0)+".$data['sm_cash_box'].",
                ava_balance = ava_balance-".$data['sm_cash_box'].",
                modified_by='".$_SESSION['username'] ."',
                modified_on = '".$date_time."'
                WHERE party_id = '".$data['party_id_hidden']."' AND  chit_id = '".$data['chit_id']."' ");

                $result1 = $this->db->query("UPDATE CHIT_MASTER SET 
                sm_cash_ava_amt = sm_cash_ava_amt-".$data['sm_cash_box']."
                WHERE party_id = '".$data['party_id_hidden']."'");
            }
           
            if($data['tm_cash_box'] != '')
            {
            
                $result = $this->db->query("UPDATE CHIT_LIST SET  
                tot_withdraw = COALESCE(tot_withdraw, 0)+".$data['tm_cash_box'].",
                ava_balance = ava_balance-".$data['tm_cash_box'].",
                modified_by='".$_SESSION['username'] ."',
                modified_on = '".$date_time."'
                WHERE party_id = '".$data['party_id_hidden']."' AND  chit_id = '".$data['chit_id']."' ");

                $result1 = $this->db->query("UPDATE CHIT_MASTER SET 
                tm_cash_ava_amt = tm_cash_ava_amt-".$data['tm_cash_box']."
                WHERE party_id = '".$data['party_id_hidden']."'");
            }
            if($data['tm_gold_box'] != '')
            {
                $result = $this->db->query("UPDATE CHIT_LIST SET 
                tot_withdraw = COALESCE(tot_withdraw, 0)+".$data['tm_gold_box'].",
                ava_balance = ava_balance-".$data['tm_gold_box'].",
                modified_by='".$_SESSION['username'] ."',
                modified_on = '".$date_time."'
                WHERE party_id = '".$data['party_id_hidden']."' AND  chit_id = '".$data['chit_id']."' ");

                $result1 = $this->db->query("UPDATE CHIT_MASTER SET 
                tm_gold_ava_amt = tm_gold_ava_amt-".$data['tm_gold_box']."
                WHERE party_id = '".$data['party_id_hidden']."'");
            }
            save_query_in_log();
            $this->db->close();
            return $result;
        }
        public function wt_chit_trans($data)
        {
            $date_time = date("Y-m-d h:i:s");
            $chit_date = date("Y-m-d",strtotime($data['chit_date']));
            
            if($data['sm_cash_box']!='')
            {
                $closing_amount=$data['ava_balance']-$data['sm_cash_box'];
               $result=$this->db->query("  INSERT INTO CHIT_TRANSACTION 
               (trans_date,party_id,scheme_type,scheme_id,transaction_type,opening_amount,processing_amount
               ,closing_balance,amt_paid,per_gram,status,created_by,created_on,type)
               VALUES 
               ('".$chit_date."','".$data['party_id_hidden']."','1' ,'".$data['scheme_id']."','2','".$data['ava_balance']."',
               '".$data['sm_cash_box']."','".$closing_amount."','','','Y','".$_SESSION['username']."' ,'".date('Y-m-d H:i:s')."', 
               '1')
               ");
     
            }
           
            if($data['tm_cash_box']!='')
            {
                $closing_amount=$data['ava_balance']-$data['tm_cash_box'];
                $result=$this->db->query("  INSERT INTO CHIT_TRANSACTION 
                (trans_date,party_id,scheme_type,scheme_id,transaction_type,opening_amount,processing_amount
                ,closing_balance,amt_paid,per_gram,status,created_by,created_on,type)
                VALUES 
                ('".$chit_date."','".$data['party_id_hidden']."','2' ,'".$data['scheme_id']."','2','".$data['ava_balance']."',
                '".$data['tm_cash_box']."','".$closing_amount."','','','Y','".$_SESSION['username']."' ,'".date('Y-m-d H:i:s')."',
                '1')
                ");
            }
            if($data['tm_gold_box']!='')
            {
                $closing_amount=$data['ava_balance']-$data['tm_gold_box'];
                $result=$this->db->query("  INSERT INTO CHIT_TRANSACTION 
                (trans_date,party_id,scheme_type,scheme_id,transaction_type,opening_amount,processing_amount,closing_balance
                ,amt_paid,per_gram,status,created_by,created_on,type)
                VALUES 
                ('".$chit_date."','".$data['party_id_hidden']."','1' ,'".$data['scheme_id']."','','".$data['ava_balance']."',
                '".$data['tm_gold_box']."','".$closing_amount."','','','Y','".$_SESSION['username']."' ,'".date('Y-m-d H:i:s')."',
                '1')
                ");
            }
            return $result;
        }
        public function edit_chit($chit_id,$scheme_id)
        {
            $chit_list = $this->db->query("UPDATE CHIT_LIST SET type = '2' WHERE chit_id = '".$chit_id."' ");
            $chit_trans = $this->db->query("UPDATE CHIT_TRANSACTION SET type = '2' WHERE scheme_id = '".$scheme_id."' ");
        }

} // class end
