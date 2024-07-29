<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/***************************************************************
    Purpose : To handle all the Department database details 2022-08-19
****************************************************************/
class Interestwise_model extends CI_Model
{
  function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Kolkata'); 
    }


    public function get_option_list()
    {
        $this->db->reconnect();
        $result  = $this->db->query("SELECT TOP 1000 * FROM LOANS;")->result_array();
        save_query_in_log();
        $this->db->close();
        return $result;
    }   

     public function get_intwisereport_list($query)

     {

        // print_r($query);exit();
        $this->db->reconnect();
        $result  = $this->db->query("SELECT TOP 1000 * FROM LOANS WHERE PID!='' $query")->result_array();
        // print_r($result);exit();
        save_query_in_log();
        $this->db->close();
        return $result;


    }    


}

?>                   