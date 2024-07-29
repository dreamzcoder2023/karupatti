<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/***************************************************************
    Purpose : To handle all the Department database details 2022-08-19
****************************************************************/
class Loansummary_model extends CI_Model
{
  function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Kolkata');    
    } 


    public function get_loan_details($bill_no)
    {
        $this->db->reconnect();
      
        // $result  = $this->db->query("SELECT * FROM INTERESTLIST ORDER BY INTID DESC")->result_array();
        $result  = $this->db->query("SELECT * FROM LOANS,PARTIES WHERE LOANS.PID=PARTIES.PID AND LOANS.BILLNO='".$bill_no."'")->result_array();


        save_query_in_log();
        $this->db->close();

       
        return $result;    

    }

      public function get_remarks($bill_no,$remarks)
    {
        $this->db->reconnect();
       $result= $this->db->query("UPDATE LOANS SET CUSTOMER_REMARKS='".$remarks."' WHERE LOANS.BILLNO='".$bill_no."'");

        // print_r("UPDATE LOANS SET CUSTOMER_REMARKS='".$remarks."' WHERE LOANS.BILLNO='".$bill_no."'");exit();
        save_query_in_log();
        $this->db->close();

        return $result;   

    }

    public function get_status_loan_details($bill_no)
    {   
        $result = [];
        $status  = $this->db->query("SELECT * FROM LOANS,PARTIES WHERE LOANS.PID=PARTIES.PID AND LOANS.BILLNO='".$bill_no."'")->result_array();

        $this->db->reconnect();
            // $result  = $this->db->query("SELECT * FROM INTERESTLIST ORDER BY INTID DESC")->result_array();
            $result[]  = $this->db->query("SELECT * FROM LOANS,PARTIES WHERE LOANS.PID=PARTIES.PID AND LOANS.BILLNO='".$bill_no."'")->result_array();
            save_query_in_log();
            $this->db->close();
            
        if($status){
            if($status[0]['ACTIVE'] != 'Y'){
                $result_redem="";
                $this->db->reconnect();
                // $result  = $this->db->query("SELECT * FROM INTERESTLIST ORDER BY INTID DESC")->result_array();
                $result[] = $this->db->query("SELECT * FROM RECEIPT_MASTER WHERE BILLNO='".$bill_no."' ORDER BY RECEIPT_DATE,ROWNO,ADDED_TIME")->result_array();

      
                $result[]  = $this->db->query("SELECT * FROM REDEMPTIONS WHERE BILLNO='".$bill_no."'")->result_array();   

            }
        }

            save_query_in_log();
            $this->db->close();

            return $result;
        
    }

}

?>                   