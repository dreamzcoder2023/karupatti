<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/***************************************************************
    Purpose : To handle all the Department database details 2022-08-19
****************************************************************/
class Weightwisereport_model extends CI_Model
{
  function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Kolkata'); 
    }

    // public function get_weightwise_list()
    // {
    //     $this->db->reconnect();
    //     // $result  = $this->db->query("SELECT * FROM INTERESTLIST ORDER BY INTID DESC")->result_array();
    //     $result  = $this->db->query("SELECT DISTINCT PLEDGENAME FROM PLEDGEINFO ORDER BY PLEDGENAME")->result_array();
    //     save_query_in_log();
    //     $this->db->close();
    //     return $result;
    // }


    public function get_status_list($weight, $filter_date)
    {

        $this->db->reconnect();
        $result  = $this->db->query("SELECT TOP 1000 PLEDGEINFO.PLEDGENAME, PLEDGEINFO.DESCRIPTION, PLEDGEINFO.WEIGHT, PLEDGEINFO.QTY,LOANS.ENDATE, LOANS.ACTIVE from PLEDGEINFO, LOANS WHERE LOANS.VOUCHER_SNO!='' $weight $filter_date")->result_array();
        save_query_in_log();
        $this->db->close();
        // print_r("SELECT TOP 1000 PLEDGEINFO.PLEDGENAME, PLEDGEINFO.DESCRIPTION, PLEDGEINFO.WEIGHT, PLEDGEINFO.QTY,LOANS.ENDATE, LOANS.ACTIVE from PLEDGEINFO, LOANS WHERE LOANS.VOUCHER_SNO!='' $weight $filter_date"); exit;
        return $result;
    }

    // public function get_loanlist_view($cmplstvw,$vlstvw,$stlstvw,$area,$intlstvw,$intgrplstvw,$loanall,$loantypselect,$jwlall,$jwltypselect,$date,$amtvw,$wghtvw,$status,$bank_status,$alter_remarks)

    //  {

    //     // print_r($alter_remarks);exit();


    //     $this->db->reconnect();
    //     $result  = $this->db->query("SELECT TOP 2000 COMPANY.COMPANYCODE,COMPANY.COMPANYNAME,P.AREA,P.ADDRESS1,P.ADDRESS2,P.CITY,P.PHONE,P.PID, LOANS. *
    //         FROM LOANS 
    //         LEFT JOIN COMPANY 
    //         ON LOANS.COMPANYCODE = COMPANY.COMPANYCODE
    //         LEFT JOIN PARTIES P ON P.PID=LOANS.PID
    //         LEFT JOIN INTERESTLIST I ON I.INTNAME=LOANS.INTERESTTYPE WHERE LOANS.VOUCHER_SNO!=''  $cmplstvw $vlstvw $stlstvw $area $intlstvw $intgrplstvw $loanall $loantypselect $jwlall $jwltypselect $date $amtvw $wghtvw $status $bank_status $alter_remarks")->result_array();
    //     // print_r ($result);exit();
    //     save_query_in_log();
    //     $this->db->close();
    //     return $result;


    // } 

}

?>                   