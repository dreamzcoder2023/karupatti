<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/***************************************************************
    Purpose : To handle all the Hand Loan Summary database details 2022-08-19
****************************************************************/
class Handloansummary_model extends CI_Model
{
    public $other_db;
  function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Calcutta'); 
    }

    public function get_company_list()
    {
        $query = $this->db->query("SELECT COMPANYNAME,COMPANYCODE FROM COMPANY WHERE ACTIVE='Y' ORDER BY COMPANYCODE");
        $result = $query->result_array();
        return $result;
    }
    public function get_handloansummary_list($sdate,$ccode)
    {
        $this->db->reconnect();
        $result  = $this->db->query("SELECT DISTINCT PID FROM HL_PAYMENTS WHERE ENDATE<='".$sdate."' $ccode")->result_array();
        save_query_in_log();
        $this->other_db->close();
        return $result;
    }
    public function get_party_by_id($pid)
    {
        $this->db->reconnect();
        $result  = $this->db->query("SELECT * FROM PARTIES WHERE PID='".$pid."'")->row();
        save_query_in_log();
        $this->other_db->close();
        return $result;
    }
    public function get_party_debit_credit_amount($pid,$ccode)
    {
        $this->db->reconnect();
        $result  = $this->db->query("SELECT cast(SUM(HL_DEBIT-HL_CREDIT) as varchar) AS TOTAL FROM HL_TRANS WHERE HL_PID='".$pid."' $ccode")->row();
        save_query_in_log();
        $this->other_db->close();
        return $result;
    }

}
?>