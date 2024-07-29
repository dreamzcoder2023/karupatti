<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/***************************************************************
    Purpose : To handle all the Department database details 2022-08-19
****************************************************************/
class Smslogs_model extends CI_Model
{
  function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Kolkata'); 
    }


    public function get_sms_logs()
    {
        $this->db->reconnect();
        $result  = $this->db->query("select sms_type from SMS_LOGS GROUP BY sms_type")->result_array();
        save_query_in_log();
        $this->db->close();
        return $result;
    }

       public function get_partyid_list()
    {
        $this->db->reconnect();
        $result  = $this->db->query("select party_id from SMS_LOGS")->result_array();
        save_query_in_log();
        $this->db->close();
        return $result;
    }


   public function get_smslog_list($fdate,$tdate,$ltype)
    {
        $this->db->reconnect();
        $result  = $this->db->query("SELECT PARTIES.NAME,PARTIES.PHONE,SMS_LOGS.id_no,SMS_LOGS.ref_no,SMS_LOGS.sms_type,SMS_LOGS.sms_date,SMS_LOGS.party_id,SMS_LOGS.isSent
        FROM PARTIES
        LEFT JOIN SMS_LOGS
        ON SMS_LOGS.party_id = PARTIES.PID WHERE sms_type!='' $fdate $tdate $ltype")->result_array();
        save_query_in_log();
        $this->db->close();
        return $result;
    }    

    
}

?>                   