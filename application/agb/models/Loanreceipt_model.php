<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/***************************************************************
    Purpose : To handle all the Loan Receipts database details 2022-11-01
****************************************************************/
class Loanreceipt_model extends CI_Model
{
  function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Calcutta'); 
    }
   
    public function get_loan_receipts_list($fdate,$tdate,$page_limit,$offset,$comp)
    {
        $this->db->reconnect();
         // $result = $this->db->query("SELECT * FROM RECEIPT_MASTER WHERE RECEIPT_SNO != '' $fdate $tdate  ORDER BY RECEIPT_DATE DESC")->result_array();
        $result = $this->db->query("SELECT  * FROM ( SELECT L.NAME, L.PID, L.INTERESTTYPE,  L.COMPANYCODE, L.MONTHS, L.LOANDAYS, R.RECEIPT_SNO, R.RECEIPT_DATE, R.BILLNO,R.PRINCIPAL,R.INT_AMOUNT, R.MAINTAINCHARGE,  R.NOTICECHARGE, R.FORMCHARGE, R.HL_AMOUNT,R.DISCOUNT, R.PAIDAMOUNT, ROW_NUMBER() OVER (ORDER BY R.RECEIPT_DATE DESC) AS sl  FROM RECEIPT_MASTER R, LOANS L WHERE R.BILLNO=L.BILLNO and R.RECEIPT_SNO != ''  $fdate $tdate $comp )N WHERE sl BETWEEN $offset AND $page_limit ORDER BY N.RECEIPT_DATE DESC")->result_array();
        // echo "SELECT  * FROM ( SELECT L.NAME, L.PID, L.INTERESTTYPE,  L.COMPANYCODE, L.MONTHS, L.LOANDAYS, R.RECEIPT_SNO, R.RECEIPT_DATE, R.BILLNO,R.PRINCIPAL,R.INT_AMOUNT, R.MAINTAINCHARGE,  R.NOTICECHARGE, R.FORMCHARGE, R.HL_AMOUNT,R.DISCOUNT, R.PAIDAMOUNT, ROW_NUMBER() OVER (ORDER BY R.RECEIPT_DATE DESC) AS sl  FROM RECEIPT_MASTER R, LOANS L WHERE R.BILLNO=L.BILLNO and R.RECEIPT_SNO != ''  $fdate $tdate $comp )N WHERE sl BETWEEN $offset AND $page_limit ORDER BY N.RECEIPT_DATE DESC"; 
        // exit;
        save_query_in_log();
        $this->db->close();
        return $result;


    }
    public function getUsers($search)
  {
     $query = $this->db->query("SELECT * from PARTIES where NAME LIKE '".$search.'%'."'  ");
    //$query = $this->db->query("SELECT * from PARTIES where NAME LIKE '".'%'.$search.'%'."' ORDER BY NAME,LASTNAME_PREFIX,FATHERSNAME,ADDRESS1,ADDRESS2 ASC ");
    $result = $query->result();
    return $result;
  }
  public function getLoan($search)
  {

     $query = $this->db->query("SELECT B.*,V.*,D.*,l.BILLNO,c.COMPANYNAME,l.LOAN_TYPE,
     l.ENDATE,l.AMOUNT, i.PERIOD, l.INTERESTTYPE,l.WEIGHT,l.STONELESS,l.LESS,l.NETWEIGHT, 
     l.MONTHS,l.LOANDAYS,l.ITEM_PHOTO,l.NOMINEE,l.RELATION,l.NOMINEE_ID, p.PID, p.NAME,
     p.ADDRESS1,p.ADDRESS2,p.PHONE,p.CITY,p.MEMBERSHIP_ID,p.MEMBERSHIP_POINTS,p.RATING,
     p.PHOTO,p.OTHER_PHOTO from LOANS l,PARTIES p  LEFT JOIN STREET B ON p.STREET_ID=B.STREETID
      LEFT JOIN VILLAGE V
     ON p.VILLAGE_ID=V.VILLAGEID LEFT JOIN CITY D ON p.CITY_ID=D.CITYID ,COMPANY c,INTERESTLIST i  WHERE l.PID=p.PID and i.INTNAME=l.INTERESTTYPE and l.COMPANYCODE=c.COMPANYCODE and l.LOAN_STATUS>=1 and l.ACTIVE='Y' and  l.BILLNO LIKE '%".$search.'%'."'  AND l.CLOSING_STATUS IS NULL AND l.CLOSEDATE IS NULL");
    
    $result = $query->result();
    return $result;
  }
  public function get_loan_receipts_details($billno)
    {
        $this->db->reconnect();
        $result = $this->db->query("SELECT LOAN_SNO, VOUCHER_SNO, PID, NAME, BILLNO, LOAN_TYPE, ENDATE, AMOUNT, PLEDGEINFO, PLEDGE_SUMMARY, JEWEL_TYPE, WEIGHT, STONELESS, LESS, NETWEIGHT, CURRENTRATE, QUALITY, PERGRAMVALUE, TOTALSALESRATE, MONTHS, LOANDAYS, INTERESTTYPE, INTEREST, ADVANCEMONTHS, ADVANCEINTEREST, TOTALINTEREST, DCPERCENT, DCAMOUNT, PROCESSING_CHARGE, HL_AMOUNT, NETPAYABLE,PAID_CASH,PAIDPRINCIPAL,PAIDINTEREST,BALANCE,DUEDATE,LASTRECEIPTDATE,LASTRECEIPTMONTH,NOMINEE,RELATION,REN_FROM_BILLNO,REN_TO_BILLNO,ACTIVE,CLOSEDATE,REMARKS,STATUS,CLOSING_STATUS,COMPANYCODE,ATTENDED_USER,ADDED_USER,ADDED_TIME,CHK_VERIFIED,VERIFIED_USER,ALT_REMARKS,PAPER_ACTION,MODIFIED_TIME,BATCHNO,HL_TRANS_SNO,BRANCH_AMOUNT,BRANCH_LEDGER_SNO,CUSTOMER_REMARKS,ODSMS_COUNT,NOTICE_COUNT,NOTICE_DATE1,NOTICE_DATE2,NOTICE_DATE3,REDEMPTION_PERIOD FROM LOANS WHERE BILLNO='".$billno."' ")->result_array();
        save_query_in_log();
        $this->db->close();
        return $result;
    }
    public function get_receipt_details1($billno,$rid)
    {
        $this->db->reconnect();
        $result=$this->db->query("SELECT *FROM RECEIPT_MASTER WHERE BILLNO='".$billno."' and RECEIPT_SNO='".$rid."'")->row();
        save_query_in_log();
        $this->db->close();
        // print_r($result);
        return $result;   
    }

    public function get_receipt_details($billno)
    {
        $this->db->reconnect();
        $result=$this->db->query("SELECT *FROM RECEIPT_MASTER WHERE BILLNO='".$billno."'")->row();
        save_query_in_log();
        $this->db->close();
        // print_r($result);
        return $result;   
    }
    public function check_receipt_entry($billno)
    {
        $this->db->reconnect();
        $result=$this->db->query("SELECT *FROM RECEIPT_MASTER WHERE BILLNO='".$billno."'")->result_array();
        save_query_in_log();
        if(count($result)>0)
        {
            return true;
        }
        else
        {
            return false;
        }
        
    }
     public function get_max_receipt_no($billno)
    {
        $this->db->reconnect();
        $result=$this->db->query("SELECT MAX(ROWNO) AS ROWNO FROM RECEIPT_MASTER WHERE BILLNO='".$billno."'")->row();
        save_query_in_log();
        if(!is_null($result))
        {
            return $result->ROWNO;
        }
        else
        {
            return 0;
        }
        
    }
    public function get_receipt_rowno($billno,$rowno)
    {
        // SELECT *FROM RECEIPT_MASTER WHERE BILLNO='" & Trim$(txtBillNo.Text) & "' AND ROWNO = 
        $this->db->reconnect();
        $result=$this->db->query("SELECT *FROM RECEIPT_MASTER WHERE BILLNO='".$billno."' AND ROWNO =".$rowno)->row();
        save_query_in_log();
        $this->db->close();
        return $result;   
    }
    public function get_paid_receipt_details($billno,$chkOD,$vLoanPeriod, $vLoanIntPercent)
    {
        $this->db->reconnect();
        $result=$this->db->query("SELECT * FROM RECEIPT_MASTER WHERE BILLNO='".$billno."' ORDER BY RECEIPT_DATE ASC")->result_array();
        save_query_in_log();
        $this->db->close();
        $paid_details="";
         $loan_det=$this->db->query("SELECT * FROM LOANS WHERE BILLNO='".$billno."'")->row();
         $tdate=date('Y-m-d');
        $vloanDate=$loan_det->ENDATE;
        $vloan_interest=$loan_det->INTEREST;
        $vLoanLastDate=date('Y-m-d',strtotime($vloanDate.' +'.$loan_det->MONTHS.' months'));
        $next_edt=$vLoanLastDate;
        $vcalcDate=date('Y-m-d');

        // print_r($vloan_interest."end");
        if($chkOD==false)
        {
            foreach ($result as $res)
            {
                
                if($vLoanLastDate<$res['RECEIPT_DATE'])
                {
                    if($res['CALC_INTEREST'] > 0){
                        $paid_details.= "<tr><td>$vLoanLastDate</td><td>" . date_format(date_create($res['RECEIPT_DATE']),$_SESSION['DATE_PATTERN']) . " </td><td>$vloan_interest</td><td></td><td></td><td>0.00</td><td> " . ($res['PRINCIPAL']+ $res['INT_AMOUNT'])."</td></tr>";
                    }
                    else{
                        $paid_details.= "<tr><td>$vLoanLastDate</td><td>" . date_format(date_create($res['RECEIPT_DATE']),$_SESSION['DATE_PATTERN']) . " </td><td>0.00</td><td></td><td></td><td>0.00</td><td> " . ($res['PRINCIPAL']+ $res['INT_AMOUNT'])."</td></tr>";
                    }
                    
                }
                else
                {
                    $next_edt1=date('Y-m-d',strtotime($next_edt.' +3 months'));
                    $next_edt=$next_edt1;
                    if($res['CALC_INTEREST'] > 0){
                    $paid_details.= "<tr><td>$next_edt</td><td>" . date_format(date_create($res['RECEIPT_DATE']),$_SESSION['DATE_PATTERN']) . " </td><td>$vloan_interest</td><td></td><td></td><td>0.00</td><td> " . ($res['PRINCIPAL']+ $res['INT_AMOUNT'])."</td></tr>";
                    }
                    else{
                        $paid_details.= "<tr><td>$next_edt</td><td>" . date_format(date_create($res['RECEIPT_DATE']),$_SESSION['DATE_PATTERN']) . " </td><td>0.00</td><td></td><td></td><td>0.00</td><td> " . ($res['PRINCIPAL']+ $res['INT_AMOUNT'])."</td></tr>";
                    }
                }
            }
        }
        else
        {

             foreach ($result as $res)
             {
                if($vLoanLastDate<$res['RECEIPT_DATE'])
                {
                    if($res['CALC_INTEREST'] > 0){
                    $paid_details.= "<tr><td>$vLoanLastDate</td><td>" . date_format(date_create($res['RECEIPT_DATE']),$_SESSION['DATE_PATTERN']) ."</td><td>$vloan_interest</td><td>".$res['CALC_PRINCIPAL'] ."</td><td> ".$res['CALC_INTEREST']."</td><td>" . ($res['PRINCIPAL']+ $res['INT_AMOUNT'])." </td><td> ".$res['BALANCE']."</td></tr>";
                    }
                    else{
                        $paid_details.= "<tr><td>$vLoanLastDate</td><td>" . date_format(date_create($res['RECEIPT_DATE']),$_SESSION['DATE_PATTERN']) ."</td><td>0.00</td><td>".$res['CALC_PRINCIPAL'] ."</td><td> ".$res['CALC_INTEREST']."</td><td>" . ($res['PRINCIPAL']+ $res['INT_AMOUNT'])." </td><td> ".$res['BALANCE']."</td></tr>";
                    }
                }
                else
                {
                    $next_edt1=date('Y-m-d',strtotime($next_edt.' +3 months'));
                    $next_edt=$next_edt1;
                    if($res['CALC_INTEREST'] > 0){
                    $paid_details.= "<tr><td>$next_edt</td><td>" . date_format(date_create($res['RECEIPT_DATE']),$_SESSION['DATE_PATTERN']) ."</td><td>$vloan_interest</td><td>".$res['CALC_PRINCIPAL'] ."</td><td> ".$res['CALC_INTEREST']."</td><td>" . ($res['PRINCIPAL']+ $res['INT_AMOUNT'])." </td><td> ".$res['BALANCE']."</td></tr>";
                    }
                    else{
                        $paid_details.= "<tr><td>$next_edt</td><td>" . date_format(date_create($res['RECEIPT_DATE']),$_SESSION['DATE_PATTERN']) ."</td><td>0.00</td><td>".$res['CALC_PRINCIPAL'] ."</td><td> ".$res['CALC_INTEREST']."</td><td>" . ($res['PRINCIPAL']+ $res['INT_AMOUNT'])." </td><td> ".$res['BALANCE']."</td></tr>";
                    }
                }
                 // <p>". " Period : ".$vLoanPeriod. " Months "." Rate : ".$vLoanIntPercent. "</p>"
             }
        }
        return $paid_details;
    }
     public function get_paid_receipt_details1($billno)
    {
        $this->db->reconnect();
        $result=$this->db->query("SELECT *FROM RECEIPT_MASTER WHERE BILLNO='".$billno."' ORDER BY RECEIPT_DATE ASC")->result_array();
        save_query_in_log();
        $this->db->close();
        // print_r($result);
        $paid_details="";
        foreach ($result as $res)
        {
            //print_r($res);exit;
            $loan_det=$this->db->query("SELECT * FROM LOANS WHERE BILLNO='".$billno."'")->row();
             $tdate=date('Y-m-d');
            $vloanDate=$loan_det->ENDATE;
            $vloan_interest=$loan_det->INTEREST;
            // $paid_details.= "As on " . $res['RECEIPT_DATE'] . " *** Paid: " . ($res['PRINCIPAL']+ $res['INT_AMOUNT'])."\n";
            $paid_details.= "<tr><td></td><td>" .date_format(date_create($res['RECEIPT_DATE']),$_SESSION['DATE_PATTERN']) . " </td><td>$vloan_interest</td><td></td><td></td><td> " . ($res['PRINCIPAL']+ $res['INT_AMOUNT'])."</td><td></td></tr>";
        }
        return $paid_details;
    }

    public function get_receipt_summary($billno,$mode)
    {   
        $this->db->reconnect();
        if($mode=="INT")
        {
            $result=$this->db->query("SELECT  MAX(CALC_INTEREST) AS RCPT_AMT FROM RECEIPT_MASTER WHERE CHK_OD='Y' AND BILLNO='" .$billno. "'")->row();
        }
        else
        {
            $result=$this->db->query("SELECT (SUM(PRINCIPAL) + SUM(INT_AMOUNT)) AS RCPT_AMT FROM RECEIPT_MASTER WHERE BILLNO='" .$billno. "'")->row();
        }
        save_query_in_log();
        $this->db->close();
        return $result->RCPT_AMT;
    }

    public function loan_receipt_save($data)
    {
        $this->db->reconnect();

        $result = $this->db->query("INSERT INTO RECEIPT_MASTER(RECEIPT_SNO, CHK_RETURN_REMAINDER,  BILLNO, RECEIPT_DATE, CALC_PRINCIPAL, CALC_INTEREST, INT_AMOUNT, PRINCIPAL, TOTAL, PAID_TOTAL, TOTALPAY, MAINTAINCHARGE, NOTICECHARGE, FORMCHARGE, HL_AMOUNT, DISCOUNT, NETPAYABLE, PAIDAMOUNT, BALANCE, LOAN_BALANCE, CHK_OD, CHK_REVISED, REVISED_DATE, REVISED_AMOUNT, REVISED_INT, ROWNO, RECEIPT_TYPE, ADDED_USER, ADDED_TIME, CHK_VERIFIED) VALUES ('".$data['receipt_sno']."', 'N','".$data['billno']."','".$data['receipt_date']."','".$data['calc_principal']."','".$data['calc_interest']."','".$data['pay_interest']."','".$data['pay_principal']."','".$data['totalpay']."','".$data['txt_paid_amount']."','".$data['totalpay']."','".$data['maint_chg']."','".$data['notice_chg']."','".$data['form_chg']."','".$data['on_acc_chg']."','".$data['discount']."','".$data['netpayable']."','".$data['paid_total']."','".$data['balance']."','".$data['loan_balance']."','Y','Y','".$data['receipt_date']."','".$data['revised_amount']."','".$data['revised_int']."','".$data['row_no']."','PI','".$data['added_user']."','".$data['created_on']."','N')");

        $balance_amount=0;
        if($data['txt_paid_amount'] > $data['calc_interest']){
            $balance_amount=$data['txt_paid_amount']-$data['calc_interest'];
        }
        $paid_value=$this->db->query("SELECT PAIDPRINCIPAL FROM LOANS WHERE BILLNO='".$data['billno']."'")->row();

        $result1 = $this->db->query("UPDATE LOANS SET PAIDPRINCIPAL=$paid_value->PAIDPRINCIPAL-$balance_amount,PAIDINTEREST='".$data['txt_paid_amount']."' where BILLNO='".$data['billno']."' ");

        save_query_in_log();
        $this->db->close();
        return $result;

        }
        public function get_paid_calculation_less($bill_no)
        {
            $this->db->reconnect();
            $result = $this->db->query("SELECT SUM(PRINCIPAL) AS PRINCIPAL,SUM(INT_AMOUNT) AS INT_AMOUNT FROM RECEIPT_MASTER WHERE BILLNO='".$bill_no."' ")->row();
            // print_r($result);exit();
            save_query_in_log();
            $this->db->close();
            if(($result->PRINCIPAL >0 && !is_null($result->PRINCIPAL)) && ($result->INT_AMOUNT >0 && !is_null($result->INT_AMOUNT)))
            {
                //print_r($result->PRINCIPAL.'_'.$result->INT_AMOUNT);exit();
                return $result->PRINCIPAL.'_'.$result->INT_AMOUNT;
            }
            else
            {
                $result->PRINCIPAL = 0;
                $result->INT_AMOUNT = 0;
                return $result->PRINCIPAL.'_'.$result->INT_AMOUNT;
            }
            //return $result;
        }

        public function loan_paid_update($data)
    {
        $this->db->reconnect();

        $balance_amount=0;

        $receipt_details=$this->db->query("SELECT SUM(PRINCIPAL) AS PRINCIPAL,SUM(INT_AMOUNT) AS INT_AMOUNT FROM RECEIPT_MASTER WHERE BILLNO='".$data['billno']."'")->row();

       $principal= $receipt_details->PRINCIPAL;
       $interest_amount= $receipt_details->INT_AMOUNT;


        // if($data['txt_paid_amount'] > $data['calc_interest']){
        //     $balance_amount=$data['txt_paid_amount']-$data['calc_interest'];
        // }
        $paid_value=$this->db->query("SELECT PAIDPRINCIPAL FROM LOANS WHERE BILLNO='".$data['billno']."'")->row();

        $result = $this->db->query("UPDATE LOANS SET PAIDPRINCIPAL=$principal,PAIDINTEREST=$interest_amount where BILLNO='".$data['billno']."' ");

        save_query_in_log();
        $this->db->close();
        return $result;

        }
}
?> 