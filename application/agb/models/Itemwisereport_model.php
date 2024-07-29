<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/***************************************************************
    Purpose : To handle all the Department database details 2022-08-19
****************************************************************/
class Itemwisereport_model extends CI_Model
{
  function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Kolkata'); 
    }

    public function get_item_list()
    {
        $this->db->reconnect();
        // $result  = $this->db->query("SELECT * FROM INTERESTLIST ORDER BY INTID DESC")->result_array();
        $result  = $this->db->query("SELECT DISTINCT PLEDGENAME FROM PLEDGEINFO ORDER BY PLEDGENAME")->result_array();
        save_query_in_log();
        $this->db->close();
        return $result;
    }


    public function get_status_list($status,$search, $search_desc, $weight, $filter_date)
    {

        $this->db->reconnect();
        $result  = $this->db->query("SELECT TOP 1000 LOANS.NAME, LOANS.ENDATE, LOANS.BILLNO, LOANS.AMOUNT, LOANS.PLEDGEINFO,PLEDGEINFO.PLEDGENAME, PLEDGEINFO.DESCRIPTION, PLEDGEINFO.WEIGHT, LOANS.ACTIVE From PLEDGEINFO, LOANS WHERE LOANS.VOUCHER_SNO!='' $status $search $search_desc $weight $filter_date")->result_array();

        // print_r("SELECT TOP 1000 LOANS.NAME, LOANS.ENDATE, LOANS.BILLNO, LOANS.AMOUNT, LOANS.PLEDGEINFO,PLEDGEINFO.PLEDGENAME, PLEDGEINFO.DESCRIPTION, PLEDGEINFO.WEIGHT, LOANS.ACTIVE From PLEDGEINFO, LOANS WHERE LOANS.VOUCHER_SNO!='' $status $search $search_desc $weight $filter_date");exit();
        save_query_in_log();
        $this->db->close();
        // print_r($result); exit;
        return $result;
    }


    // public function get_status_list($status,$search, $search_desc, $weight, $filter_date)
    // {

    //     $this->db->reconnect();
    //     $result  = $this->db->query("SELECT TOP 1000 PLEDGEINFO.BILLNO,PLEDGEINFO.PLEDGENAME,PLEDGEINFO.DESCRIPTION,PLEDGEINFO.WEIGHT,LOANS.NAME, LOANS. *

    //         FROM LOANS

    //         LEFT JOIN PLEDGEINFO

    //         ON  LOANS.BILLNO = PLEDGEINFO.BILLNO

    //         AND LOANS.PLEDGEINFO = PLEDGEINFO.DESCRIPTION WHERE LOANS.VOUCHER_SNO!=''  $status $search $search_desc $weight $filter_date")->result_array();
    //     save_query_in_log();
    //     $this->db->close();
    //     // print_r($result); exit;
    //     return $result;
    // }





    // } 

}

?>                   