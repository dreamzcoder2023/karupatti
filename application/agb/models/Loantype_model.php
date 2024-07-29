<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/***************************************************************
    Purpose : To handle all the Loantype database details 2022-08-19
****************************************************************/
class Loantype_model extends CI_Model
{
  function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Calcutta'); 
    }

    // To get loan_type list
    public function get_loan_type_list()
    {
        $this->db->reconnect();
        $result  = $this->db->query("SELECT * FROM LOANTYPE WHERE STATUS!=2 ORDER BY LOANTYPEID DESC")->result_array();
        save_query_in_log();
        $this->db->close();
        return $result;
    }

    // To get loan_type unique
    public function loan_type_unique($val)
    {
        $this->db->reconnect();
        $result  = $this->db->query("SELECT * FROM LOANTYPE WHERE LOANTYPE = '".$val."' AND STATUS!=2")->row();
        save_query_in_log();
        $this->db->close();
        return $result;
    }

    // To add loan_type
    public function add_loan_type($data)
    {
        $this->db->reconnect();
        $result  = $this->db->query("INSERT INTO LOANTYPE (LOANTYPE,CREATEDBY,CREATEDON,STATUS)VALUES ('".$data['loan_type']."','".$data['created_by']."','".$data['created_on']."','".$data['status']."')");
        save_query_in_log();
        $this->db->close();
        return $result;
    }

    // To get last loan_type details
    public function get_last_loan_type_details()
    {
        $this->db->reconnect();
        $result  = $this->db->query("SELECT TOP 1 * FROM LOANTYPE ORDER BY LOANTYPEID DESC")->row();
        save_query_in_log();
        $this->db->close();
        return $result;
    }

    // To get loan_type details by loan_type id
    public function get_loan_type_by_loan_type_id($did)
    {
        $this->db->reconnect();
        $result  = $this->db->query("SELECT * FROM LOANTYPE WHERE LOANTYPEID = '".$did."'")->row();
        save_query_in_log();
        $this->db->close();
        return $result;
    }

    // To get loan_type unique edit
    public function loan_type_unique_edit($val,$dcid)
    {
        $this->db->reconnect();
        $result  = $this->db->query("SELECT * FROM LOANTYPE WHERE LOANTYPE = '".$val."' AND LOANTYPEID != '".$dcid."' AND STATUS!=2")->row();
        save_query_in_log();
        $this->db->close();
        return $result;
    }

    // To update loan_type
    public function update_loan_type($data)
    {
        $this->db->reconnect();
        $result  = $this->db->query("UPDATE LOANTYPE SET LOANTYPE = '".$data['loan_type']."',MODIFIEDON = '".$data['modified_on']."',MODIFIEDBY = '".$data['modified_by']."' WHERE LOANTYPEID = '".$data['sno']."'");
        save_query_in_log();
        $this->db->close();
        return $result;
    }

    // To delete loan_type
    public function loan_type_delete($uid)
    {
        $this->db->reconnect();
        $result  = $this->db->query("UPDATE LOANTYPE SET STATUS = '2' WHERE LOANTYPEID = '".$uid."'");
        save_query_in_log();
        $this->db->close();
        return $result;
    }


}
?>                        