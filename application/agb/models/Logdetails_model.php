<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/***************************************************************
    Purpose : To handle all the Department database details 2022-08-19
****************************************************************/
class Logdetails_model extends CI_Model
{
  function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Kolkata'); 
    }


    // To get logdetails
    public function get_logdetails_list($dt)
    {
        
        $this->db->reconnect();
        $result  = $this->db->query("select * from LOGS $dt")->result_array();
        //print_r("select * from LOGS $data");exit();
        //print_r($result);exit();
        save_query_in_log();
        $this->db->close();
        return $result;

    }

    public function get_log_code()
    {
        $this->db->reconnect();
        $result  = $this->db->query("select LOG_CODE from LOGS GROUP BY LOG_CODE")->result_array();
        save_query_in_log();
        $this->db->close();
        return $result;
    }

    public function get_staff_list()
    {
        $this->db->reconnect();
        $result  = $this->db->query("select STAFFNAME from STAFFS")->result_array();
        save_query_in_log();
        $this->db->close();
        return $result;
    }

    public function get_log_list($fdate,$tdate,$ltype,$utype,$oentry)
    {
        $this->db->reconnect();
        $result  = $this->db->query("select * from LOGS WHERE LOG_DETAILS!='' $fdate $tdate $ltype $utype $oentry")->result_array();
        save_query_in_log();
        $this->db->close();
        return $result;
    }    

}

?>                   