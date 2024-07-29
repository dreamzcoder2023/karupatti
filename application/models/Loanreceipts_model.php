<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/***************************************************************
    Purpose : To handle all the Loan Receipts database details 2022-11-01
****************************************************************/
class Loanreceipts_model extends CI_Model
{
  function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Calcutta'); 
    }

    public function get_verify_stafflist()
    {
        $this->db->reconnect();
        $result  = $this->db->query("SELECT DISTINCT VERIFIED_USER FROM LOANS")->result_array();
        save_query_in_log();
        $this->db->close();
        return $result;
    }
    public function get_loan_receipts_list($fdate,$tdate)
    {
        $this->db->reconnect();
        $result = $this->db->query("SELECT * FROM RECEIPT_MASTER WHERE RECEIPT_SNO != '' AND $fdate $tdate ORDER BY RECEIPT_DATE DESC")->result_array();
        save_query_in_log();
        $this->db->close();
        return $result;


    }
    public function get_loan_receipts_list_footer($fdate,$tdate1)
    {
        $this->db->reconnect();
        $result  = $this->db->query("SELECT SUM(PRINCIPAL) AS PRINCIPAL, SUM(INT_AMOUNT) AS INTEREST , SUM(MAINTAINCHARGE + NOTICECHARGE + FORMCHARGE) AS OTHERS , SUM(R.HL_AMOUNT) AS HL_AMOUNT , SUM(DISCOUNT) AS DISCOUNT , SUM(PAIDAMOUNT) AS TOTAL FROM RECEIPT_MASTER R,LOANS L WHERE $fdate $tdate1 L.BILLNO=R.BILLNO AND L.COMPANYCODE='".$_SESSION['COMPANYCODE']."' ")->result_array();
        save_query_in_log();
        $this->db->close();
        return $result;
    }
    public function chk_loan_no($billno)
    {
        $this->db->reconnect();
        $result = $this->db->query("SELECT BILLNO FROM LOANS WHERE BILLNO='".$billno."' ")->result_array();
        //print_r(count($result));exit();
        save_query_in_log();
        $this->db->close();
        if(count($result)>0)
        {
            //print_r($result);exit();
            return $result;
        }
        else
        {
            //print_r("false");exit();
            return false;
        }
    }
    public function get_loan_receipts_details($billno)
    {
        $this->db->reconnect();
        $result = $this->db->query("SELECT LOAN_SNO,VOUCHER_SNO,PID,NAME,BILLNO,LOAN_TYPE,ENDATE,AMOUNT,PLEDGEINFO,PLEDGE_SUMMARY,JEWEL_TYPE,WEIGHT,STONELESS,LESS,NETWEIGHT,CURRENTRATE,QUALITY,PERGRAMVALUE,TOTALSALESRATE,MONTHS,LOANDAYS,INTERESTTYPE,INTEREST,ADVANCEMONTHS,ADVANCEINTEREST,TOTALINTEREST,DCPERCENT,DCAMOUNT,PROCESSING_CHARGE,HL_AMOUNT,NETPAYABLE,PAID_CASH,PAIDPRINCIPAL,PAIDINTEREST,BALANCE,DUEDATE,LASTRECEIPTDATE,LASTRECEIPTMONTH,NOMINEE,RELATION,REN_FROM_BILLNO,REN_TO_BILLNO,ACTIVE,CLOSEDATE,REMARKS,STATUS,CLOSING_STATUS,COMPANYCODE,ATTENDED_USER,ADDED_USER,ADDED_TIME,CHK_VERIFIED,VERIFIED_USER,ALT_REMARKS,PAPER_ACTION,MODIFIED_TIME,BATCHNO,HL_TRANS_SNO,BRANCH_AMOUNT,BRANCH_LEDGER_SNO,CUSTOMER_REMARKS,ODSMS_COUNT,NOTICE_COUNT,NOTICE_DATE1,NOTICE_DATE2,NOTICE_DATE3,REDEMPTION_PERIOD FROM LOANS WHERE BILLNO='".$billno."' ")->result_array();

        // $result = $this->db->query("SELECT * FROM LOANS WHERE BILLNO='".$billno."' ")->result_array();
        save_query_in_log();
        $this->db->close();
        return $result;
    }
    public function get_party_details($pid)
    {
        $this->db->reconnect();
        $result = $this->db->query("SELECT PID,NAME,LASTNAME_PREFIX,FATHERSNAME,DOORNO,ADDRESS1,ADDRESS2,CITY,AREA,ZONE_SNO,PHONE,PHONE2,IDPROOF,REFERENCE,CHK_BAD_DEBTOR,AADHAAR_NO,ID_TYPE,ID_NUMBER,LANDMARK,RATING,AREA_SNO,WORK_TYPE,EMAIL,OTHER_NAME,MOTHER_NAME,CREDIT_ID,CHIT_ID,WHATSAPP FROM PARTIES WHERE PID='".$pid."' ")->result_array();
        save_query_in_log();
        $this->db->close();
        return $result;
    }
    public function get_loan_prefix($loan_prefix)
    {
        $this->db->reconnect();
        $result = $this->db->query("SELECT KEYVALUE FROM KEYMASTER WHERE KEYNAME='".$loan_prefix."' ")->result_array();
        save_query_in_log();
        $this->db->close();
        return $result;
    }
    public function get_lt_recetpt_date($billno)
    {
        $this->db->reconnect();
        $result = $this->db->query("SELECT RECEIPT_DATE FROM RECEIPT_MASTER WHERE BILLNO='".$billno."' ORDER BY ROWNO DESC")->row();
        // print_r($result);exit();
        save_query_in_log();
        $this->db->close();
        if (!is_null($result)) 
        {
            return $result;
        }
        else
        {
            return $result = false;
        }

        //return $result;
    }
    public function get_lt_recetpt_data($billno)
    {
        $this->db->reconnect();
        $result = $this->db->query("SELECT TOP 1 * FROM RECEIPT_MASTER WHERE BILLNO='".$billno."' ORDER BY ROWNO DESC ")->row();
        // print_r($result);exit();
        save_query_in_log();
        $this->db->close();
        return $result;
    }
    public function get_party_photo($nom_id)
      {
        $this->db->reconnect();
        $result  = $this->db->query("SELECT PHOTO FROM PARTIES WHERE PID='".$nom_id."' ")->row();
        save_query_in_log();
        $this->db->close();
        //print_r($result->PHOTO);exit();
        if (empty($result->PHOTO) || is_null($result->PHOTO)) 
        {
            return $result = false;
        }
        else
        {
            return $result->PHOTO;
        }
        //return $result; 
      }

        public function get_jewel_photo($billno)
      {
        $this->db->reconnect();
        $result  = $this->db->query("SELECT ITEM_PHOTO FROM LOANS WHERE BILLNO='".$billno."' ")->row();
        //print_r($result->ITEM_PHOTO);exit();
        save_query_in_log();
        $this->db->close();
        if (empty($result->ITEM_PHOTO) || is_null($result->ITEM_PHOTO)) 
        {
            return $result = false;
        }
        else
        {
            return $result->ITEM_PHOTO;
        }
        //return $result; 
      }
      public function get_receipts_slno($billno)
        {
            $this->db->reconnect();
            $result = $this->db->query("SELECT * FROM RECEIPT_MASTER WHERE BILLNO='".$billno."' ")->result_array();
            save_query_in_log();
            $this->db->close();
            
            return $result;
        }

        public function get_paid_calculation($bill_no,$vCalcDate,$receipts_slno)
        {
            $this->db->reconnect();
            $result = $this->db->query("SELECT SUM(PRINCIPAL) AS PRINCIPAL,SUM(INT_AMOUNT) AS INT_AMOUNT FROM RECEIPT_MASTER WHERE BILLNO='".$bill_no."' AND ROWNO < '".$receipts_slno."' AND RECEIPT_DATE<='".$vCalcDate."' ")->row();
            save_query_in_log();
            $this->db->close();
            return $result;
        }
        public function get_paid_calculation_less($bill_no)
        {
            $this->db->reconnect();
            $result = $this->db->query("SELECT TOP 1 PRINCIPAL, INT_AMOUNT FROM RECEIPT_MASTER WHERE BILLNO='".$bill_no."' ORDER BY ROWNO DESC ")->row();
            // print_r($result);exit();
            save_query_in_log();
            $this->db->close();

            if($result)
            {
                //print_r($result->PRINCIPAL.'_'.$result->INT_AMOUNT);exit();
                return $result;
            }
            else
            { 
               
                return false;
            }
            //return $result;
        }
        public function get_rp_calculation($bill_no)
        {
            $this->db->reconnect();
            $result = $this->db->query("SELECT * FROM RECEIPT_MASTER WHERE BILLNO='".$bill_no."' ")->row();
            save_query_in_log();
            $this->db->close();
            return $result;
        }
        public function get_rp_calculation_max_row($bill_no)
        {
            $this->db->reconnect();
            $result = $this->db->query("SELECT * FROM RECEIPT_MASTER WHERE BILLNO='".$bill_no."'  ORDER BY ROWNO ASC")->result_array();
            save_query_in_log();
          
            $this->db->close();
            // print_r($result);exit();
            return $result;
        }

        // To get Loanreceipts details by sno
        public function get_last_sno_details($p_id)
        {
            $this->db->reconnect();
            $result  = $this->db->query("SELECT TOP 1 * FROM RECEIPT_MASTER WHERE RECEIPT_SNO LIKE %'".$_SESSION['LOANPREFIX']."'% ORDER BY RECEIPT_DATE DESC")->row();

            
            save_query_in_log();
            $this->db->close();
            print_r($result) ;exit;
            return $result;

        }

        public function add_loanreceipts_db($data){

            $this->db->reconnect();

            $result = $this->db->query("INSERT INTO RECEIPT_MASTER(RECEIPT_SNO,
                BILLNO,
                RECEIPT_DATE,
                CALC_PRINCIPAL,
                CALC_INTEREST,
                TOTAL,
                PAID_TOTAL,
                TOTALPAY,
                MAINTAINCHARGE,
                NOTICECHARGE,
                FORMCHARGE,
                HL_AMOUNT,
                DISCOUNT,
                NETPAYABLE,
                PAIDAMOUNT,
                INT_AMOUNT,
                PRINCIPAL,
                BALANCE,
                LOAN_BALANCE,
                CHK_OD,
                CHK_REVISED,
                REVISED_DATE,
                REVISED_AMOUNT,
                REVISED_INT,
                ROWNO,
                RECEIPT_TYPE,
                ATTENDED_USER,
                ADDED_USER,
                ADDED_TIME,
                CHK_VERIFIED,
                VERIFIED_USER,
                PREV_ROW_NO,
                VOUCHER_SNO,
                HL_TRANS_SNO,
                CHK_RETURN_REMAINDER
                ) VALUES ('".$data['receipt_billno']."',".$data['billno']."',".$data['receipt_date']."',".$data['calc_principal']."',".$data['calc_interest']."',".$data['calc_total']."',".$data['paid_total']."',".$data['total_pay']."',".$data['maintaincharge']."',".$data['noticecharge']."',".$data['formcharge']."',".$data['hl_amount']."',".$data['discount']."',".$data['netpayable']."',".$data['pay_amount']."',".$data['pay_interest']."',".$data['pay_principal']."',".$data['pay_balanace']."',".$data['loan_balanace']."',".$data['chk_od']."',".$data['chk_revised']."',".$data['revised_date']."',".$data['revised_amt']."',".$data['revised_int']."',".$data['row_no']."',".$data['receipt_type']."',".$data['attended_user']."',".$data['added_user']."',".$data['added_time']."',".$data['chk_verified']."',".$data['verified_user']."',".$data['prev_rowno']."',".$data['voucher_slno']."',".$data['hl_tans_slno']."',".$data['chk_return_remainder']."')");



            if($result){

                $keyms_upd  = $this->db->query("UPDATE KEYMASTER SET KEYVALUE = '".$data['key_value']."' WHERE KEYNAME = '".$data['key_name']."'");

                $result = $this->db->query("UPDATE LOANS SET LASTRECEIPTDATE='".$data['receipt_date']."', PAIDPRINCIPAL='".$data['pay_principal']."', PAIDINTEREST='".$data['pay_interest']."', BALANCE='".$data['pay_balanace']."' WHERE BILLNO = '".$data['billno']."'");

            }
            save_query_in_log();
           
            $this->db->close();
           
            return $result;

        }

    // To delete products
    public function loanreceipts_delete($sno)
    {
        $this->db->reconnect();
        // $result  = $this->db->query("UPDATE SYSTEMS SET STATUS = '2' WHERE SYS_ID = '".$sys_id."'");
        $result  = $this->db->query("DELETE FROM RECEIPT_MASTER WHERE RECEIPT_SNO = '".$sno."'");
        save_query_in_log();
        $this->db->close();
        return $result;
    }

    //  To View Loanreceipts
        public function get_loanreceipts_view($rpt_view)
    {
        $this->db->reconnect();
        //$result  = $this->db->query("SELECT LOANS.ENDATE, LOANS.AMOUNT, LOANS.PLEDGEINFO, LOANS.NETWEIGHT,LOANS.MONTHS,LOANS.LOANDAYS,LOANS.HL_AMOUNT,LOANS.NETPAYABLE,LOANS.PAID_CASH,LOANS.PAIDPRINCIPAL,LOANS.PAIDINTEREST,LOANS.BALANCE,LOANS.LASTRECEIPTDATE,PARTIES.NAME,PARTIES.ADDRESS1,PARTIES.ADDRESS2,PARTIES.PHOTO,LEFT JOIN PARTIES ON PARTIES.PID = LOANS.PID * FROM RECEIPT_MASTER LEFT JOIN LOANS ON RECEIPT_MASTER.BILLNO = LOANS.BILLNO  WHERE RECEIPT_MASTER.RECEIPT_SNO = '".$rpt_view."'")->row();

        $result  = $this->db->query("SELECT LOANS.ENDATE, LOANS.AMOUNT, LOANS.PLEDGEINFO, LOANS.NETWEIGHT,LOANS.MONTHS,LOANS.LOANDAYS,LOANS.HL_AMOUNT,LOANS.NETPAYABLE,LOANS.PAID_CASH,LOANS.PAIDPRINCIPAL,LOANS.PAIDINTEREST,LOANS.BALANCE,LOANS.LASTRECEIPTDATE,PARTIES.NAME,PARTIES.ADDRESS1,PARTIES.ADDRESS2,PARTIES.PHOTO,* FROM RECEIPT_MASTER LEFT JOIN LOANS ON RECEIPT_MASTER.BILLNO = LOANS.BILLNO LEFT JOIN PARTIES ON LOANS.PID = PARTIES.PID WHERE RECEIPT_MASTER.RECEIPT_SNO = '".$rpt_view."'")->row();
        //print_r($result);exit();
        save_query_in_log();
        $this->db->close();
        return $result;
    }
    
    // To get Loanreceipts details by Loanreceipts id
    public function get_loan_receipts_edit($pdid)
    {
        $this->db->reconnect();
        $result  = $this->db->query("SELECT * FROM RECEIPT_MASTER WHERE RECEIPT_SNO = '".$pdid."'")->row();
        save_query_in_log();
        $this->db->close();
        return $result;
    }


    // To update Loanreceipts
  
    public function update_loanreceipts($data)
    {

        $result = $this->db->query("UPDATE RECEIPT_MASTER SET
                                      
                        INT_AMOUNT = '".$data['int_amount']."',
                        PRINCIPAL = '".$data['principal']."',
                        PAIDAMOUNT = '".$data['paid_amount']."',
                        BALANCE = '".$data['balance']."',
                        ADDED_USER = '".$data['added_user_ed']."',
                        ADDED_TIME = '".$data['updated_on_ed']."',
                        CHK_REVISED = '".$data['revised']."', 
                        RECEIPT_DATE = '".$data['receipt_date']."' 
                        WHERE RECEIPT_SNO = '".$data['receipt_sno']."'");

        if($result){
            $result1 = $this->db->query("UPDATE LOANS SET
                                      
                        LASTRECEIPTDATE = '".$data['updated_on_ed']."',
                        PAIDPRINCIPAL = '".$data['principal']."',
                        PAIDINTEREST = '".$data['paid_amount']."',
                        BALANCE = '".$data['balance']."'
                        
                        WHERE BILLNO = '".$data['bill_no']."'");

            save_query_in_log();
            $this->db->close();
            return $result;
        }

          
    }






}
?>                        