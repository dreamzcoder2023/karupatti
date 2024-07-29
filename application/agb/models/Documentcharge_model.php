<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/***************************************************************
    Purpose : To handle all the Department database details 2022-08-19
****************************************************************/
class Documentcharge_model extends CI_Model
{
  function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Calcutta'); 
    }

    // To get department list
    public function get_documentcharge_list()
    {
        $this->db->reconnect();
        $result  = $this->db->query("SELECT * FROM DOC_CHARGE WHERE DC_ID!='NULL'")->result_array();
        save_query_in_log();
        $this->db->close();
        return $result;
    }

    public function doc_charge_active($data, $id)
    {
        $this->db->reconnect();
        $result = $this->db->query("UPDATE DOC_CHARGE SET STATUS = '".$data['Active']."'WHERE DC_ID = '".$id."'");
        save_query_in_log();
        $this->db->close();
        return $result;
    }

       public function get_last_id_details()
    {
        $this->db->reconnect();
        $result  = $this->db->query("SELECT TOP 1 * FROM DOC_CHARGE ORDER BY DC_ID DESC")->row();
        save_query_in_log();
        $this->db->close(); 
        return $result;
    }

    public function add_doc_charge($data)
    {
        $this->db->reconnect();
        $result  = $this->db->query("INSERT INTO DOC_CHARGE (DC_ID,FROM_AMT,TO_AMT,DC_AMT,CREATEDBY,CREATEDON,STATUS)VALUES ('".$data['doc_id']."','".$data['from_amount']."','".$data['to_amount']."','".$data['dc_amount']."','".$data['created_by']."','".$data['created_on']."','Y')");
        save_query_in_log();
        $this->db->close(); 
        return $result;
    }

    public function doc_charge_delete($doc_id)
    {
        $this->db->reconnect();
        // $result  = $this->db->query("UPDATE SYSTEMS SET STATUS = '2' WHERE SYS_ID = '".$sys_id."'");
        $result  = $this->db->query("DELETE FROM DOC_CHARGE  WHERE DC_ID = '".$doc_id."'");
        save_query_in_log();
        $this->db->close();
        return $result;
    }

    // To get System details by System id
    public function get_doc_charge_id($dcid)
    {
        $this->db->reconnect();
        $result  = $this->db->query("SELECT * FROM DOC_CHARGE WHERE DC_ID = '".$dcid."'")->row();
        save_query_in_log();
        $this->db->close();
        return $result;
    }

// To update systems
    public function update_doc_charge($data)
    {
        $this->db->reconnect();
        $result  = $this->db->query("UPDATE DOC_CHARGE SET FROM_AMT = '".$data['from_amt_edit']."',TO_AMT = '".$data['to_amt_edit']."',DC_AMT = '".$data['dc_amt_edit']."' WHERE DC_ID= '".$data['doc_id_edit']."'");
        save_query_in_log();
        $this->db->close();
        return $result;
    }

    
    public function doc_charge_from_unique($val)
    {   
        $this->db->reconnect();
        $result  = $this->db->query("SELECT * FROM DOC_CHARGE WHERE FROM_AMT = '".$val."'")->row();
        save_query_in_log();
        $this->db->close();
        return $result;
    }

   
    public function doc_charge_to_unique($val)
    {   
        $this->db->reconnect();
        $result  = $this->db->query("SELECT * FROM DOC_CHARGE WHERE TO_AMT = '".$val."'")->row();
        save_query_in_log();
        $this->db->close();
        return $result;
    }

    
    public function dc_amount_unique($val)
    {   
        $this->db->reconnect();
        $result  = $this->db->query("SELECT * FROM DOC_CHARGE WHERE DC_AMT = '".$val."'")->row();
        save_query_in_log();
        $this->db->close();
        return $result;
    }

}
?>                        