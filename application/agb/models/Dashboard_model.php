<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Dashboard_model extends CI_Model 
{
  public function __construct() {
    parent::__construct();
    $this->load->database();
  }

  public function get_appraisal_list()
  {
    $result = $this->db->query("SELECT * FROM appraisal")->result_array();
    save_query_in_log();
    return $result;
  }

  public function get_reviewer_employee()
  {
    $result = $this->db->query("SELECT * FROM t_emp_mstr WHERE app_reviewer=1")->result_array();
    save_query_in_log();
    return $result;
  }

  //Loan Dashboard count
  public function getloantodaycount(){
    $result = $this->db->query("SELECT BILLNO FROM LOANS WHERE ADDED_TIME='".date('Y-m-d H:i:s')."'")->result_array();
    $todaycount =count($result);
    return $todaycount;
  }
  public function getloanyesterdaycount()
  {
      $result = $this->db->query("SELECT BILLNO FROM LOANS WHERE ADDED_TIME='".date('Y-m-d H:i:s',strtotime("-1 days"))."'")->result_array();
      $yesterdaycount =count($result);
      return $yesterdaycount;
  }
  public function getoverallcount()
  {
      $result = $this->db->query("SELECT BILLNO FROM LOANS")->result_array();
      $overallcount =count($result);
      return $overallcount;

  }

  //receipt dashboard count
  public function getreceipttodaycount(){
      $result = $this->db->query("SELECT BILLNO FROM RECEIPT_MASTER where ADDED_TIME='".date('Y-m-d H:i:s')."'")->result_array();
      $todayreceiptdaycount =count($result);
      return $todayreceiptdaycount;
  }

  public function getreceiptyesterdaycount(){
      $result = $this->db->query("SELECT BILLNO FROM RECEIPT_MASTER where ADDED_TIME='".date('Y-m-d',strtotime("-1 days"))."'")->result_array();
      $yesterdayreceiptdaycount =count($result);
      return $yesterdayreceiptdaycount;
  }

  public function getreceiptoverallcount(){
      $result = $this->db->query("SELECT BILLNO FROM RECEIPT_MASTER")->result_array();
      $overallreceiptdaycount =count($result);
      return $overallreceiptdaycount;
  }


  //get company based loanamt total

  public function getakploanamt(){
      $result = $this->db->query("SELECT sum(AMOUNT) as totalamt FROM LOANS where COMPANYCODE='009'")->result_array();
      $akploanamt =$result;
      return $akploanamt;

  }
  public function getagkloanamt()
  {
      $result = $this->db->query("SELECT sum(AMOUNT) as totalamt FROM LOANS where COMPANYCODE='010'")->result_array();
      $agkloanamt =$result;
      return $agkloanamt;
  }

  public function getagnloanamt()
  {
      $result = $this->db->query("SELECT sum(AMOUNT) as totalamt FROM LOANS where COMPANYCODE='002'")->result_array();
      $agnloanamt =$result;
      return $agnloanamt;
  }

  public function getagbloanamt()
  {
      $result = $this->db->query("SELECT sum(AMOUNT) as totalamt FROM LOANS where COMPANYCODE='001'")->result_array();
     $agnloanamt =$result;
      return $agnloanamt;
  }
  //receipt company based show amount total chart value
  public function getreceiptagbloanamt()
  {
     $result = $this->db->query("SELECT sum(a.TOTAL) as totalamt FROM RECEIPT_MASTER a left join LOANS b on b.BILLNO =a.BILLNO where b.COMPANYCODE ='001' group by a.TOTAL")->result_array();
     $agbloanamt =$result;
      return $agbloanamt;
  }
  public function getreceiptakploanamt()
  {
     $result = $this->db->query("SELECT sum(a.TOTAL) as totalamt FROM RECEIPT_MASTER a left join LOANS b on b.BILLNO =a.BILLNO where b.COMPANYCODE ='009' group by a.TOTAL")->result_array();
     $akploanamt = $result;
     return $akploanamt;
  }
  public function getreceiptagkloanamt()
  {
     $result = $this->db->query("SELECT sum(a.TOTAL) as totalamt FROM RECEIPT_MASTER a left join LOANS b on b.BILLNO =a.BILLNO where b.COMPANYCODE ='010' group by a.TOTAL")->result_array();
     $agkloanamt = $result;
    return $agkloanamt;
  }
  public function getreceiptagnloanamt()
  {
     $result = $this->db->query("SELECT sum(a.TOTAL) as totalamt FROM RECEIPT_MASTER a left join LOANS b on b.BILLNO =a.BILLNO where b.COMPANYCODE ='002' group by a.TOTAL")->result_array();
     $agnloanamt =$result;
     return $agnloanamt;
  }

}
?>