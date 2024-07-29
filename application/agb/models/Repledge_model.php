<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/***************************************************************
    Purpose : To handle all the Department database details 2022-08-19
****************************************************************/
class Repledge_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Kolkata');    
    } 
    public function get_repledge_list()
    {
      $this->db->reconnect();
      $result  = $this->db->query("SELECT * FROM REPLEDGE_MASTER WHERE ACTIVE='Y' ORDER BY ENDATE DESC")->result_array();
      save_query_in_log();
      $this->db->close();
      return $result;
    }
    public function get_company_list()
    {
      $this->db->reconnect();
      $result  = $this->db->query("SELECT * FROM COMPANY")->result_array();
      save_query_in_log();
      $this->db->close();
      return $result;
    }
    public function get_bank_list()
    {
      $this->db->reconnect();
      $result  = $this->db->query("SELECT * FROM REPLEDGE_BANKDETAILS WHERE isActive = '1'")->result_array();
      save_query_in_log();
      $this->db->close();
      return $result;
    }
    public function getbankdetailscheck($banknameval)
    {
          $this->db->reconnect();
          $result  = $this->db->query("SELECT * FROM SUB_REPLEDGE_BANKDETAILS WHERE bank_Name LIKE '".$banknameval."%' AND isActive = '1'")->result_array();
          save_query_in_log();
          $this->db->close();
          return $result;
    }
    public function getfinalbankdetails($banknameval)
    {
            $this->db->reconnect();
          $result  = $this->db->query("SELECT * FROM REPLEDGE_BANKDETAILS WHERE bank_Name LIKE '".$banknameval."%' AND isActive = '1'")->result_array();
          save_query_in_log();
          $this->db->close();
          return $result;

    }
    public function get_staff_list()
    {
        $this->db->reconnect();
        $result  = $this->db->query("SELECT * FROM STAFFS ")->result_array();
        save_query_in_log();
        $this->db->close();
        return $result;
    }
    public function get_interest_list(){
        $this->db->reconnect();
       
        $result  = $this->db->query("SELECT * FROM INTERESTLIST")->result_array();
        save_query_in_log();
        $this->db->close();
        return $result;
    }
    public function getkey($prefix)
    {
         $this->db->reconnect();
       
        $result  = $this->db->query("SELECT * FROM KEYMASTER where KEYNAME='REPLEDGE-".$prefix."'")->row();
        save_query_in_log();
        $this->db->close();
        return $result;
    }
    public function getLoan($search)
    {
      $this->db->reconnect();
        $query = $this->db->query("SELECT l.BILLNO from LOANS l WHERE l.ACTIVE='Y' and l.CLOSEDATE is null and l.BILLNO LIKE  '".'%'.$search.'%'."' ");
      // $query = $this->db->query("select * from REDEMPTIONS where CLOSING_TYPE='COMPANY_CLOSE' and  NEWBILLNO LIKE '".'%'.$search.'%'."' ");
      $result = $query->result();
      save_query_in_log();
      $this->db->close();
      return $result;
    } 
    public function getreceiptrbbillno($search)
    {
        $this->db->reconnect();
        $query = $this->db->query("SELECT BILLNO from RECEIPT_MASTER  WHERE BILLNO LIKE  '".'%'.$search.'%'."'");
        // $query = $this->db->query("select * from REDEMPTIONS where CLOSING_TYPE='COMPANY_CLOSE' and  NEWBILLNO LIKE '".'%'.$search.'%'."' ");
        $result = $query->result();
        save_query_in_log();
        $this->db->close();
        return $result;

    }
    public function get_viewreceiptrepledge_data($billnovall)
    {
        $this->db->reconnect();
          $query = $this->db->query("SELECT *  FROM PLEDGEINFO a  
          left join RECEIPT_DETAILS b on b.BILLNO = a.BILLNO  
          left join LOANS c on c.BILLNO = a.BILLNO
          left join COMPANY d on d.COMPANYCODE = c.COMPANYCODE WHERE a.BILLNO ='".$billnovall."'");
          $result = $query->result_array();
          save_query_in_log();
        $this->db->close();
        return $result;
    }
    public function get_repledgereturn_data($RBbillno)
    {
        $this->db->reconnect();
        $query = $this->db->query("SELECT a.*,b.*,c.*  FROM REPLEDGE_DETAILS a  
        left join REPLEDGE_MASTER b on b.RP_BILLNO = a.RP_BILLNO
        left join COMPANY c on c.COMPANYCODE = b.COMPANYCODE  WHERE a.RP_BILLNO ='".$RBbillno."'");
        $result = $query->result_array();

        save_query_in_log();
        $this->db->close();
        return $result;
    }
    public function get_repledgereceipt_data($RBbillno)
    {
        $this->db->reconnect();
        $query = $this->db->query("SELECT * FROM RECEIPT_MASTER WHERE BILLNO ='".$RBbillno."'");
        $result = $query->result_array();
        save_query_in_log();
        $this->db->close();
        return $result;
    }
    public function get_returnloan_data($BILLNO)
    {
          $this->db->reconnect();
          $query = $this->db->query("SELECT a.*,d.*,c.COMPANYCODE,c.COMPANYNAME,c.BUSINESS_TYPE 
          FROM REPLEDGE_MASTER a 
          left join COMPANY c on c.COMPANYCODE =a.COMPANYCODE
           left join RECEIPT_MASTER d on d.BILLNO = a.RP_BILLNO  WHERE a.RP_BILLNO ='".$BILLNO."'");
          $result = $query->result_array();
          save_query_in_log();
          $this->db->close();
          return $result;
    }
    public function get_returnval_data($RBbillno)
    {
        $this->db->reconnect();
        $query = $this->db->query("SELECT * FROM REPLEDGE_RETURN WHERE RP_BILLNO ='".$RBbillno."'");
        $result = $query->result_array();
        save_query_in_log();
        $this->db->close();
        return $result;
    }
    public function get_return_list($sdate,$edate,$sodr,$cmp)
    {
        $this->db->reconnect();
        $query = $this->db->query("SELECT a.*,b.*,c.COMPANYNAME FROM REPLEDGE_RETURN a
        left join REPLEDGE_MASTER b on b.RP_BILLNO = a.RP_BILLNO 
        left join COMPANY c on c.COMPANYCODE = b.COMPANYCODE where $sdate $edate  $cmp $sodr ");
        $result = $query->result_array();
        save_query_in_log();
        $this->db->close();
        return $result;
    }
    public function get_returnrepledge_data($returnnoval)
    {
        $this->db->reconnect();
        $query = $this->db->query("SELECT a.*,b.*,d.*,c.COMPANYNAME FROM REPLEDGE_RETURN a
        left join REPLEDGE_DETAILS b on b.RP_BILLNO = a.RP_BILLNO 
        left join REPLEDGE_MASTER d on d.RP_BILLNO = a.RP_BILLNO 
        left join COMPANY c on c.COMPANYCODE = d.COMPANYCODE where a.RP_BILLNO ='".$returnnoval."'
        order by a.RP_BILLNO DESC");
        
        $result = $query->result_array();
        save_query_in_log();
        $this->db->close();
        return $result;
    }
    public function getbankdetails()
    {
      $query = $this->db->query("SELECT * FROM REPLEDGE_BANKDETAILS where isActive='1'");
      $result =  $query->result_array();
      save_query_in_log();
      $this->db->close();
      return $result;
    }
    

}

?>                   