<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/***************************************************************
    Purpose : To handle all the Department database details 2022-08-19
****************************************************************/
class Totalpledges_model extends CI_Model
{
  function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Kolkata'); 
    }

    public function get_status_list()
    {

        // $this->db->reconnect();
        // $result  = $this->db->query("SELECT TOP 50 PLEDGEINFO.PLEDGENAME, PLEDGEINFO.DESCRIPTION, PLEDGEINFO.WEIGHT, PLEDGEINFO.QTY,LOANS.ENDATE, LOANS.ACTIVE from PLEDGEINFO, LOANS WHERE LOANS.VOUCHER_SNO!=''")->result_array();
        // save_query_in_log();
        // $this->db->close();

        $this->db->reconnect();
        $result  = $this->db->query("SELECT PLEDGENAME AS ITEMNAME, COUNT(QTY) AS QUANTITY , SUM(WEIGHT) AS WEIGHT FROM PLEDGEINFO GROUP BY PLEDGENAME ORDER BY PLEDGENAME")->result_array();
        save_query_in_log();
        $this->db->close();
        return $result;

        //print_r($result);exit();

        // print_r("SELECT PLEDGENAME AS ITEMNAME, COUNT(QTY) AS QUANTITY , COUNT(WEIGHT) AS WEIGHT FROM PLEDGEINFO GROUP BY PLEDGENAME;"); exit;
        // return $result;
    }
  


}

?>                   