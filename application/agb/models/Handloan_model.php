<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/***************************************************************
    Purpose : To handle all the Area database details 2022-08-22
****************************************************************/
class Handloan_model extends CI_Model
{
  function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Calcutta'); 
    }


public function  get_company_list()
    {
        $this->db->reconnect();
        // $result  = $this->db->query("SELECT C.COMPANYNAME ,C.COMPANYCODE,U.* FROM COMPANY C LEFT JOIN USERLIST U ON C.COMPANYCODE=U.ACTIVECOMPANY WHERE U.USERNAME='".$name."' ")->result_array();
        $result  = $this->db->query("SELECT * FROM COMPANY WHERE ACTIVE!='N'")->result_array();
        save_query_in_log();
        $this->db->close();
        return $result;   
    }

 public function getUsers($search)
  {
     $query = $this->db->query("SELECT TOP 25 * from PARTIES where NAME LIKE '".$search.'%'."'  ");
    //$query = $this->db->query("SELECT * from PARTIES where NAME LIKE '".'%'.$search.'%'."' ORDER BY NAME,LASTNAME_PREFIX,FATHERSNAME,ADDRESS1,ADDRESS2 ASC ");
    $result = $query->result();
    return $result;
  }
  public function get_hl_id_key_value($lprefix)
    {
        $kname = "HL_TRANS-".$lprefix;
        $query = $this->db->query("SELECT * FROM KEYMASTER WHERE KEYNAME='".$kname."'");
        $result = $query->row();
        return $result;
    }
    public function get_hl_trans_key_value($lprefix)
    {
        $kname = "HL_TRANS-".$lprefix;
        $query = $this->db->query("SELECT * FROM KEYMASTER WHERE KEYNAME='".$kname."'");
        $result = $query->row();
        return $result;
    }
    public function chitsave($data)
        {
         if($data['chit_red_amount']>0) {
            $ac_chit = $this->db->query("INSERT INTO payment_inward_outward
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
                                                'Hl_receipts',
                                                'Chit Redeem',
                                                '".$data['chit_red_amount']."',
                                                '".$data['chit_id']."',
                                                '',
                                                '".$data['chit_red_detail']."',
                                                '".$data['ac_HandLoan_id']."',
                                                '".$data['party_ids']."','CR','-','-','0','0','0'
                                                )");
                 save_query_in_log();
                 $this->db->close(); 
                 return $ac_chit;
        }
    }
    public function chittransreddemadd($data)
    {
      if($data['scm_chit']=='1')

                {

                    // $closing_amount = $data['ac_chit_av_amount']-$data['ac_chit_red_amount'];

                    $result=$this->db->query("INSERT INTO CHIT_TRANSACTION (trans_date
                    ,party_id
                    ,scheme_type
                    ,scheme_id
                    ,transaction_type
                    ,opening_amount
                    ,processing_amount
                    ,closing_balance
                    ,amt_paid
                    ,per_gram
                    ,status
                    ,created_by
                    ,created_on
                    ,payment_id
                    ,transaction_id)
                    VALUES (
                    '".$data['chit_date']."',
                    '".$data['party_ids']."',
                    '1' ,
                    '".$data['sch_id_chit']."',
                    '2',
                    '".$data['chit_av_amount']."',
                    '".$data['chit_red_amount']."',
                    '".$data['curr_chit_amount']."',
                    '',
                    '',
                    'Y',
                    '".$_SESSION['username']."' ,
                    '".date('Y-m-d H:i:s')."',
                    '".$data['chitpid']."',
                    '".$data['trans_id']."'
                    )
                    ");
                }

            if($data['scm_chit']=='2')
                {

                    // $closing_amount=$data['chit_av_amount']-$data['chit_red_amount'];

                    $result=$this->db->query("  INSERT INTO CHIT_TRANSACTION (trans_date
                    ,party_id
                    ,scheme_type
                    ,scheme_id
                    ,transaction_type
                    ,opening_amount
                    ,processing_amount
                    ,closing_balance
                    ,amt_paid
                    ,per_gram
                    ,status
                    ,created_by
                    ,created_on
                    ,payment_id
                    ,transaction_id)
                    VALUES ('".$data['chit_date']."',
                    '".$data['party_ids']."',
                    '2' ,
                    '".$data['sch_id_chit']."',
                    '2',
                    '".$data['chit_av_amount']."',
                    '".$data['chit_red_amount']."',
                    '".$data['curr_chit_amount']."',
                    '',
                    '',
                    'Y',
                    '".$_SESSION['username']."' ,
                    '".date('Y-m-d H:i:s')."',
                    '".$data['chitpid']."',
                    '".$data['trans_id']."')
                    ");
                }

        save_query_in_log();
        $this->db->close();
        return $result;

    }

    public function hl_trans_add($data)
    {
        $this->db->reconnect();

        // $result  = $this->db->query("INSERT INTO HL_TRANS(HL_TRANS_SNO,HL_DATE,HL_ENTRY_TYPE,HL_LOAN_TYPE,HL_PID,HL_BILLNO,HL_DEBIT,HL_CREDIT,HL_REMARKS,COMPANYCODE,ADDED_USER,ADDED_TIME) VALUES('".$data['HL_TRANS_NO']."', '".$data['hl_date']."','4','".$data['type']."','".$data['party_id']."','".$data['loan_no']."','".$data['hl_amount']."','".$data['ac_amt']."','-','".$_SESSION['COMPANYCODE']."','".$_SESSION['username']."','".date('Y-m-d H:i:s')."')");
        if($data['hl_amount']>0){

         $result  = $this->db->query("INSERT INTO HL_TRANS
           (HL_TRANS_SNO
           ,HL_DATE
           ,HL_ENTRY_TYPE
           ,HL_LOAN_TYPE
           ,HL_PID
           ,HL_BILLNO
           ,HL_DEBIT
           ,HL_CREDIT
           ,HL_REMARKS
           ,ADDED_USER
           ,ADDED_TIME
           ,COMPANYCODE)
     VALUES
           ('".$data['HL_TRANS_NO']."'
           ,'".$data['hl_date']."'
           ,'4'
           ,'ADVANCE'
           ,'".$data['party_ids']."'
           ,'".$data['HandLoan_id']."'
           ,'".$data['hl_amount']."'
           ,'0'
           ,'".$data['remark']."'
           ,'".$_SESSION['username']."'
           ,'".date('Y-m-d H:i:s')."'
           ,'".$data['company_id']."')");
        }

        if($data['ac_amount']>0){

         $result  = $this->db->query("INSERT INTO HL_TRANS
           (HL_TRANS_SNO
           ,HL_DATE
           ,HL_ENTRY_TYPE
           ,HL_LOAN_TYPE
           ,HL_PID
           ,HL_BILLNO
           ,HL_DEBIT
           ,HL_CREDIT
           ,HL_REMARKS
           ,ADDED_USER
           ,ADDED_TIME
           ,COMPANYCODE)
     VALUES
           ('".$data['HL_TRANS_NO']."'
           ,'".$data['hl_date']."'
           ,'5'
           ,'ADVANCE'
           ,'".$data['party_ids']."'
           ,'".$data['HandLoan_id']."'
           ,'0'
           ,'".$data['ac_amount']."'
           ,'".$data['remark']."'
           ,'".$_SESSION['username']."'
           ,'".date('Y-m-d H:i:s')."'
           ,'".$data['company_id']."')");
        }
        

        save_query_in_log();
        $this->db->close();
        return $result;
    }
    public function hl_cashsave($data)
    {
     if($data['cash_amount']>0) {
    $hl_cash = $this->db->query("INSERT INTO payment_inward_outward
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
                                            'HandLoan',
                                            'Cash',
                                            '".$data['cash_amount']."',
                                            '".$data['cash_detail']."',
                                            '".$data['HandLoan_id']."'
                                            ,'".$data['party_ids']."','DR','-','-','0','0','0'
                                            )");


             save_query_in_log();
             $this->db->close(); 

             return $hl_cash;
           }
    }

    public function hl_chequesave($data)
    {
      if($data['cheque_amt']>0) {
      $hl_cheque = $this->db->query("INSERT INTO payment_inward_outward
                                           (module_name
                                           ,type_of_payment
                                           ,amount
                                           ,party_bank
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
                                            'HandLoan',
                                            'Cheque',
                                            '".$data['cheque_amt']."',
                                            '".$data['cheque_party']."',
                                            '".$data['cheque_refno']."',
                                            '".$data['cheque_cmb']."',
                                            '".$data['cheque_detail']."',
                                            '".$data['HandLoan_id']."'
                                             ,'".$data['party_ids']."'
                                             ,'DR','-','-','0','0','0'
                                            )");
            // print_r($hl_cheque);exit();
             save_query_in_log();
             $this->db->close(); 
             return $hl_cheque;
           }

    }
    public function hl_rtgssave($data)
    {
         if($data['rtgs_amt']>0) {
    $hl_rtgs = $this->db->query("INSERT INTO payment_inward_outward
                                           (module_name
                                           ,type_of_payment
                                           ,amount
                                           ,party_bank
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
                                             'HandLoan',
                                            'RTGS',
                                            '".$data['rtgs_amt']."',
                                            '".$data['rtgs_party_bk']."',
                                            '".$data['rtgs_refno']."',
                                            '".$data['rtgs_cbank']."',
                                            '".$data['rtgs_detail']."',
                                            '".$data['HandLoan_id']."'
                                             ,'".$data['party_ids']."'
                                             ,'DR','-','-','0','0','0'
                                            )");
             save_query_in_log();
             $this->db->close(); 
             return $hl_rtgs;
      }
    }
    public function hl_upisave($data)
    {
     if($data['upi_amt']>0) {
    $hl_upi = $this->db->query("INSERT INTO payment_inward_outward
                                           (module_name
                                           ,type_of_payment
                                           ,amount
                                           ,party_bank
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
                                            'HandLoan',
                                            'UPI',
                                            '".$data['upi_amt']."',
                                            '".$data['upi_party_bk']."',
                                            '".$data['upi_refno']."',
                                            '".$data['upi_cbank']."',
                                            '".$data['upi_detail']."',
                                            '".$data['HandLoan_id']."',
                                            '".$data['party_ids']."'
                                             ,'DR','-','-','0','0','0'
                                            )");
             save_query_in_log();
             $this->db->close(); 
             return $hl_upi;
  }

}
public function ac_cashsave($data)
    {
     if($data['ac_cash_amount']>0) {
    $ac_cash = $this->db->query("INSERT INTO payment_inward_outward
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
                                            'Hl_receipts',
                                            'Cash',
                                            '".$data['ac_cash_amount']."',
                                            '".$data['ac_cash_detail']."',
                                            '".$data['ac_HandLoan_id']."'
                                            ,'".$data['party_ids']."','CR','-','-','0','0','0'
                                            )");
             save_query_in_log();
             $this->db->close(); 
             return $ac_cash;
           }
    }

    public function ac_chequesave($data)
    {
      if($data['ac_cheque_amt']>0) {
      $ac_cheque = $this->db->query("INSERT INTO payment_inward_outward
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
                                            'Hl_receipts',
                                            'Cheque',
                                            '".$data['ac_cheque_amt']."',
                                            '".$data['ac_cheque_supbk']."',
                                            '".$data['ac_cheque_refno']."',
                                            '".$data['ac_cheque_detail']."',
                                            '".$data['ac_HandLoan_id']."'
                                             ,'".$data['party_ids']."','CR','-','-','0','0','0'
                                            )");
             save_query_in_log();
             $this->db->close(); 
             return $ac_cheque;
           }

    }
    public function ac_rtgssave($data)
    {
         if($data['ac_rtgs_amt']>0) {
    $ac_rtgs = $this->db->query("INSERT INTO payment_inward_outward
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
                                             'Hl_receipts',
                                            'RTGS',
                                            '".$data['ac_rtgs_amt']."',
                                            '".$data['ac_rtgs_refno']."',
                                            '".$data['ac_rtgs_bank']."',
                                            '".$data['ac_rtgs_detail']."',
                                            '".$data['ac_HandLoan_id']."'
                                             ,'".$data['party_ids']."','CR','-','-','0','0','0'
                                            )");
             save_query_in_log();
             $this->db->close(); 
             return $ac_rtgs;
      }
    }
    public function ac_upisave($data)
    {
     if($data['ac_upi_amt']>0) {
    $ac_upi = $this->db->query("INSERT INTO payment_inward_outward
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
                                            'Hl_receipts',
                                            'UPI',
                                            '".$data['ac_upi_amt']."',
                                            '".$data['ac_upi_refno']."',
                                            '".$data['ac_upi_bank']."',
                                            '".$data['ac_upi_detail']."',
                                            '".$data['ac_HandLoan_id']."',
                                             '".$data['party_ids']."','CR','-','-','0','0','0'
                                            )");
             save_query_in_log();
             $this->db->close(); 
             return $ac_upi;
  }
}
   public function paymentmemsave($data)
    {
     if($data['mem_red_point']>0) {
    $ac_mem = $this->db->query("INSERT INTO payment_inward_outward
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
                                            'Hl_receipts',
                                            'Membership Redeem',
                                            '".$data['mem_red_point']."',
                                            '".$data['mem_card_no']."',
                                            '',
                                            '".$data['mem_red_detail']."',
                                            '".$data['billno']."',
                                             '".$data['party_ids']."','CR','-','-','0','0','0'
                                            )");
             save_query_in_log();
             $this->db->close(); 
             return $ac_mem;
  }
}
  
public function membershipcardhistory($memdata)
    {
     if($memdata['mem_red_point']>0) {
    $mem_card = $this->db->query("INSERT INTO MEMBERSHIP_HISTORY
           (MEMBERSHIP_NO
           ,PID
           ,LOG_DATE
           ,PROCESS
           ,POINTS_EARNED          
           ,CREATED_BY
           ,CREATED_ON
           ,STATUS_TYPE
           ,BILLNO
           )
        VALUES
               ('".$memdata['mem_card_no']."'
               ,'".$memdata['party_ids']."'
               ,'".$memdata['mem_date']."'
               ,'".$memdata['process']."'
               ,'".$memdata['mem_red_point']."'
               ,'".$_SESSION['username']."'
               ,'".date('Y-m-d H:i:s')."'
               ,'OUT'
               ,'".$memdata['billno']."'
                ) ");

        $memdata['$cur_point'] = $this->db->query("SELECT * FROM MEMBERSHIP_CARD WHERE PID='".$memdata['party_ids']."' AND MEMBERSHIP_NO ='".$memdata['mem_card_no']."' ")->row();

        $cur_points = $memdata['$cur_point']->POINTS;
        $red_point  = $memdata['mem_red_point'];
        $bal_points = $cur_points - $red_point;
        $cpoints    = $bal_points;

        if($cpoints>0){

          $mem_car_up  = $this->db->query("UPDATE MEMBERSHIP_CARD SET POINTS='".$cpoints."' WHERE PID='".$memdata['party_ids']."' AND MEMBERSHIP_NO ='".$memdata['mem_card_no']."' ");
        }
        if($mem_car_up>0){
          $party_mem_up  = $this->db->query("UPDATE PARTIES SET MEMBERSHIP_POINTS='".$cpoints."' WHERE PID='".$memdata['party_ids']."'");
        }

     save_query_in_log();
     $this->db->close(); 
     return $mem_card;
  }
}
public function get_modal_chit_list($party_id)
    {
        // print_r($party_id);exit();
        $this->db->reconnect();
        $chit_amt = $this->db->query("SELECT * FROM CHIT_LIST WHERE party_id = '".$party_id."' ")->row();
        save_query_in_log();
        $this->db->close();
        return $chit_amt;
    }
     public function get_party_details_by_party_id($pid)
    {
        $query = $this->db->query("SELECT * FROM PARTIES WHERE PID = '".$pid."'");
        $result = $query->row();
        return $result;
    }
     public function get_loan_party_list($search)
    {
        $query = $this->db->query("SELECT * FROM LOANS WHERE BILLNO LIKE '".$search."%' ORDER BY BILLNO");
        $result = $query->result();
        return $result;
    }
    public function get_hloan_party($pid)
    {
        $query = $this->db->query("SELECT * FROM PARTIES WHERE PID = '".$pid."'");
        $result = $query->row();
        return $result;
    }

    public function update_hl_trans_keymaster($tanskey)
    {
        $this->db->reconnect();
        $res  = $this->db->query("UPDATE KEYMASTER SET KEYVALUE=KEYVALUE+1 WHERE KEYNAME='".$tanskey."'");
        save_query_in_log();
        $this->db->close();
        return $res;
    }

    public function get_hl_pay_key_value($lprefix)
    {
        $kname = "HL_PAYMENTS-".$lprefix;
        $query = $this->db->query("SELECT * FROM KEYMASTER WHERE KEYNAME='".$kname."'");
        $result = $query->row();
        return $result;
    }
    public function get_hl_rec_key_value($lprefix)
    {
        $kname = "HL_RECEIPTS-".$lprefix;
        $query = $this->db->query("SELECT * FROM KEYMASTER WHERE KEYNAME='".$kname."'");
        $result = $query->row();
        return $result;
    }

    public function get_voucher_master_key_value($lprefix)
    {
        $kname = "VOUCHER_MASTER-".$lprefix;
        $query = $this->other_db->query("SELECT * FROM KEYMASTER WHERE KEYNAME='".$kname."'");
        $result = $query->row();
        return $result;
    }

    public function hl_payment_add($data)
    {
        $this->db->reconnect();
       
        if($data['hl_amount']>0){
        $results  = $this->db->query("INSERT INTO HL_PAYMENTS
           (HL_SNO
           ,ENDATE
           ,HL_TYPE
           ,BILLNO
           ,PID
           ,AMOUNT
           ,PAID_BY
           ,REMARKS
           ,VOUCHER_SNO
           ,HL_TRANS_SNO
           ,ADDED_USER
           ,ADDED_TIME
           ,COMPANYCODE)
     VALUES
           ('".$data['HL_SNO']."'
           ,'".$data['hl_pay_date']."'
           ,'ADVANCE'
           ,'".$data['HandLoan_id']."'
           ,'".$data['party_ids']."'
           ,'".$data['hl_amount']."'
           ,'CASH'
           ,''
           ,''
           ,'".$data['HL_TRANS_NO']."'
           ,'".$_SESSION['username']."'
           ,'".date('Y-m-d H:i:s')."'
           ,'".$_SESSION['COMPANYCODE']."')");
        }
        if($data['ac_amount']>0){



          $results  = $this->db->query("INSERT INTO HL_RECEIPTS
           (HL_SNO
           ,ENDATE
           ,HL_TYPE
           ,BILLNO
           ,PID
           ,AMOUNT
           ,PAID_BY
           ,REMARKS
           ,VOUCHER_SNO
           ,HL_TRANS_SNO
           ,ADDED_USER
           ,ADDED_TIME
           ,COMPANYCODE)
     VALUES
           ('".$data['HL_SNO_rec']."'
           ,'".$data['hl_pay_date']."'
           ,'ADVANCE'
           ,'".$data['HandLoan_id']."'
           ,'".$data['party_ids']."'
           ,'".$data['ac_amount']."'
           ,'CASH'
           ,''
           ,''
           ,'".$data['HL_TRANS_NO']."'
           ,'".$_SESSION['username']."'
           ,'".date('Y-m-d H:i:s')."'
           ,'".$_SESSION['COMPANYCODE']."')");

        }



        save_query_in_log();
        $this->db->close();
        return $results;
    }

    public function update_hl_payment_keymaster($vname)
    {
        $this->db->reconnect();
        $result  = $this->db->query("UPDATE KEYMASTER SET KEYVALUE=KEYVALUE+1 WHERE KEYNAME='".$vname."'");
        save_query_in_log();
        $this->db->close();
        return $result;
    }
    public function get_hl_party($pid)
    {
        $this->db->reconnect();
        $result  = $this->db->query("SELECT * FROM HL_TRANS WHERE HL_PID='".$pid."'")->row();
        save_query_in_log();
        $this->db->close();
        return $result;
    }
    public function get_hl_cash($pid){
       $this->db->reconnect();
        $result  = $this->db->query("SELECT * FROM payment_inward_outward where bill_no='".$pid."' AND type_of_payment='Cash' ")->row();
       
        save_query_in_log();
        $this->db->close();
      
        return $result;

    }
    public function get_hl_cheque($pid){
       $this->db->reconnect();
       $result  = $this->db->query("SELECT * FROM payment_inward_outward where bill_no='".$pid."' AND type_of_payment='Cheque' ")->row();
        // $result  = $this->db->query("SELECT * FROM payment_inward_outward where bill_no='".$pid."' AND type_of_payment='Cheque' ")->row();
       
        save_query_in_log();
        $this->db->close();
      
        return $result;

    }
    public function get_hl_rtgs($pid){
       $this->db->reconnect();

         $result  = $this->db->query("SELECT * FROM payment_inward_outward where bill_no='".$pid."' AND type_of_payment='RTGS' ")->row();
       
        save_query_in_log();
        $this->db->close();
      
        return $result;

    }
    public function get_hl_upi($pid){
       $this->db->reconnect();
         $result  = $this->db->query("SELECT * FROM payment_inward_outward where bill_no='".$pid."' AND type_of_payment='UPI' ")->row();
       
        save_query_in_log();
        $this->db->close();
      
        return $result;

    }
    public function get_ac_cash($pid){
       $this->db->reconnect();
        $result  = $this->db->query("SELECT * FROM payment_inward_outward where bill_no='".$pid."' AND type_of_payment='Cash' ")->row();
       
        save_query_in_log();
        $this->db->close();
      
        return $result;

    }
    public function get_ac_cheque($pid){
       $this->db->reconnect();
       $result  = $this->db->query("SELECT * FROM payment_inward_outward where bill_no='".$pid."' AND type_of_payment='Cheque' ")->row();
       
       
        save_query_in_log();
        $this->db->close();
      
        return $result;

    }
    public function get_ac_rtgs($pid){
       $this->db->reconnect();

         $result  = $this->db->query("SELECT * FROM payment_inward_outward where bill_no='".$pid."' AND type_of_payment='RTGS' ")->row();
       
        save_query_in_log();
        $this->db->close();
      
        return $result;

    }
    public function get_ac_upi($pid){
       $this->db->reconnect();
         $result  = $this->db->query("SELECT * FROM payment_inward_outward where bill_no='".$pid."' AND type_of_payment='UPI' ")->row();
       
        save_query_in_log();
        $this->db->close();
      
        return $result;

    }
   
    public function get_payment_details($sdid){
       $this->db->reconnect();
        $result  = $this->db->query("SELECT * FROM payment_inward_outward where bill_no='".$sdid."'  ")->result_array();
       
        save_query_in_log();
        $this->db->close();
      
        return $result;

    }
    public function get_list_fill($fdate,$tdate){

    $this->db->reconnect();
     
        
        // $result = $this->db->query(" SELECT  * FROM  ( SELECT *, ROW_NUMBER() OVER (ORDER BY HL_DATE DESC) AS sl FROM HL_TRANS
        //  WHERE HL_PID='".$hl_id."'  $fdate $tdate $type $utype)N  WHERE  sl BETWEEN $offset AND $page_limit ")->result_array();


      $result  = $this->db->query("SELECT  * FROM  ( SELECT HL_PID as hl_pid, ROW_NUMBER() OVER (ORDER BY ADDED_TIME DESC) AS sl FROM HL_TRANS WHERE HL_PID!='0'  $fdate $tdate GROUP BY HL_PID  )N  WHERE  sl BETWEEN '1' AND '2' ")->result_array();

      // $data['party_list']   = $this->db->query("SELECT  * FROM  ( SELECT DISTINCT HL_PID , ROW_NUMBER() OVER (ORDER BY HL_PID DESC) AS sl FROM HL_TRANS WHERE HL_PID!='0' $fdate $tdate )N  WHERE  sl BETWEEN '1' AND '10' ")->result_array();


         

        // print_r($result);exit();

        save_query_in_log();
        $this->db->close();
        return $result;

   }


    public function get_hl_hst_fill($hl_id,$type,$utype,$fdate,$tdate,$offset,$page_limit){

    $this->db->reconnect();
     
        
        $result = $this->db->query(" SELECT  * FROM  ( SELECT *, ROW_NUMBER() OVER (ORDER BY ADDED_TIME DESC) AS sl FROM HL_TRANS
         WHERE HL_PID='".$hl_id."'  $fdate $tdate $type $utype)N  WHERE  sl BETWEEN $offset AND $page_limit ")->result_array();

            // SELECT  * FROM  ( SELECT *, ROW_NUMBER() OVER (ORDER BY stk_id DESC) AS sl FROM AKS_STOCK WHERE   prd_id='15' AND stk_date>='2023-04-08')N  WHERE  sl BETWEEN 1 AND 10        

        // print_r($result);exit();

        save_query_in_log();
        $this->db->close();
        return $result;

   }
   public function overallhistorylist($type,$utype,$fdate,$tdate,$offset,$page_limit){

    $this->db->reconnect();

    // print_r("SELECT  * FROM  ( SELECT *, ROW_NUMBER() OVER (ORDER BY ADDED_TIME DESC) AS sl FROM HL_TRANS
    //      WHERE HL_PID!=''  $fdate $tdate $type $utype)N  WHERE  sl BETWEEN $offset AND $page_limit");
     // exit;
        
        $result = $this->db->query(" SELECT  * FROM  ( SELECT *, ROW_NUMBER() OVER (ORDER BY ADDED_TIME DESC) AS sl FROM HL_TRANS
         WHERE HL_PID!=''  $fdate $tdate $type $utype)N  WHERE  sl BETWEEN $offset AND $page_limit ")->result_array();

        save_query_in_log();
        $this->db->close();
        return $result;

   }

   

}
?>    