<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/***************************************************************
    Purpose : To handle all the Department database details 2022-08-19
****************************************************************/
class Party_search_model extends CI_Model
{
     public $other_db;    
    function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Calcutta'); 
    }
    public function get_fin_years_list()
    {
        $this->db->reconnect();
        $result  = $this->db->query("SELECT TOP 1 * FROM FIN_YEARS  WHERE STATUS='Y' ORDER BY ID DESC")->row();
        save_query_in_log();
        $this->db->close();
        return $result;
    }

    public function get_loan_by_loan_id($id)
    {
        $this->db->reconnect();
        $result  = $this->db->query("SELECT * FROM LOANS WHERE BILLNO='".$id."'")->row();
        save_query_in_log();
        $this->db->close();
        return $result; 
    }
    
    public function getUsers($search)
    {
       $query = $this->db->query("SELECT TOP 25 * FROM PARTIES WHERE NAME LIKE '".$search.'%'."'  OR PHONE LIKE '".$search.'%'."'   ");
      
       $result = $query->result();
    
      return $result;
    }
    public function getUsersPhone($search)
    {
       $query = $this->db->query("SELECT * from PARTIES WHERE PHONE LIKE '".$search.'%'."'  ");
      
       $result = $query->result();
    
      return $result;
    }
    public function getUsersMembership($search)
    {
        
       $query = $this->db->query("SELECT * from PARTIES a LEFT JOIN  MEMBERSHIP_CARD b ON a.PID=b.PID  WHERE b.MEMBERSHIP_NO LIKE '".$search.'%'."'  ");
      
       $result = $query->result();
    
      return $result;
    }

    public function getUsersLoans($search)
    {
        
       $query = $this->db->query("SELECT * from PARTIES a LEFT JOIN  LOANS b ON a.PID=b.PID  WHERE b.BILLNO LIKE '".$search.'%'."'  ");
      
       $result = $query->result();
    
      return $result;
    }
    //  ************************************************Real Estate********************************************************//
    // property
    public function realestate_view_property($pid)
    {
        $this->db->reconnect();
        $result  = $this->db->query("SELECT * FROM realestate_purchase WHERE party_id= '".$pid."'  AND property_status='Existing' AND status='Y' ORDER BY id DESC")->result_array();
        save_query_in_log();
        $this->db->close();
        return $result;
    }
    // Purchase
    public function realestate_view_purchase($pid)
    {
        $this->db->reconnect();
        $result  = $this->db->query("SELECT * FROM realestate_purchase WHERE party_id= '".$pid."' AND property_status='New' AND status='Y' ORDER BY id DESC")->result_array();
        save_query_in_log();
        $this->db->close();
        return $result;
    }
    // sale
    public function realestate_view_sale($pid)
    {
        $this->db->reconnect();
        $result  = $this->db->query("SELECT * FROM realestate_sale WHERE party_id= '".$pid."' AND status='Y' ORDER BY id DESC")->result_array();
        save_query_in_log();
        $this->db->close();
        return $result;
    }

}