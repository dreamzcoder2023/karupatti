<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/***************************************************************
    Purpose : To handle all the Membership database details 2022-08-19
****************************************************************/
class Membership_model extends CI_Model
{
  function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Calcutta'); 
    }

    // To get Membership list
    // public function get_membership_list()
    // {
    //     $this->db->reconnect();
    //     // $result  = $this->db->query("SELECT * FROM INTERESTLIST ORDER BY INTID DESC")->result_array();
    //     $result  = $this->db->query("SELECT P.NAME,MC.* FROM MEMBERSHIP_CARD MC LEFT JOIN PARTIES P ON P.PID=MC.PID ORDER BY MC.MEMBERSHIP_ID DESC")->result_array();

    //     $result  = $this->db->query(" SELECT * FROM 
    //       ( SELECT P.NAME,MC.*, ROW_NUMBER() OVER (ORDER BY MC.MEMBERSHIP_ID DESC) AS sl FROM  MEMBERSHIP_CARD MC LEFT JOIN PARTIES P ON P.PID=MC.PID )N WHERE sl BETWEEN $offset AND $page_limit")->result_array();
    //     save_query_in_log();
    //     $this->db->close();
    //     return $result;
    // }

    //To get Parties name in Auotocomplete
    public function getUsers($search)
      {
         $query = $this->db->query("SELECT * from PARTIES where NAME LIKE '".$search.'%'."'  ");
        $result = $query->result();
        return $result;
      }

    //To Check Card No unique
    public function card_no_unique($data)
    {   
        $this->db->reconnect();
        $result  = $this->db->query("SELECT * FROM MEMBERSHIP_CARD WHERE PID='".$data['party_id_change_mem']."' AND STATUS='Y' ")->row();
        save_query_in_log();
        $this->db->close();
        return $result;
    }

    // Stored Membership Details
    public function membership_save($data)
    {
        $company_code=$_SESSION['COMPANYCODE'];
        $this->db->reconnect();
        $result  = $this->db->query("INSERT INTO MEMBERSHIP_CARD 
        (MEMBERSHIP_NO,CARD_TYPE,POINTS,PID,ISSUE_DATE,EXP_DATE,CREATED_ON,CREATED_BY,STATUS,COMPANYCODE)VALUES ('".$data['mem_card_no']."','".$data['mem_type']."','".$data['mem_add_points']."','".$data['first_name_id_hidden']."','".$data['issue_date']."','".$data['exp_date']."','".$data['created_on']."','".$data['added_user']."','Y','".$company_code."')");
        save_query_in_log();
        $this->db->close(); 
        return $result;
    }

    // Update Membership Details in parties
    public function update_membership_in_parties($mem_points_tot,$mem_id,$pid)
    {
        $this->db->reconnect();
         
        $result  = $this->db->query("UPDATE PARTIES SET MEMBERSHIP_ID = '".$mem_id."', MEMBERSHIP_POINTS= '".$mem_points_tot."' WHERE PID = '".$pid."'");
        save_query_in_log();
        $this->db->close(); 
        return $result;
    }

    // Update Membership Activate table
    public function update_membership_activate($mem_act_id)
    {
        // print_r($mem_act_id->ACTIVATE_ID);exit();
        $this->db->reconnect();
        $result  = $this->db->query("UPDATE MEMBERSHIP_ACTIVATE SET STATUS = 'N' WHERE ACTIVATE_ID = '".$mem_act_id->ACTIVATE_ID."' ");
          // print_r("UPDATE MEMBERSHIP_ACTIVATE SET STATUS = 'N' WHERE ACTIVATE_ID = '".$mem_act_id->ACTIVATE_ID."' ");exit();
        save_query_in_log();
        $this->db->close(); 
        return $result;
    }

    public function get_mem_activate_list($mem_type)
    {   
        $this->db->reconnect();
        $result  = $this->db->query("SELECT MEMBERSHIP_NO FROM MEMBERSHIP_ACTIVATE WHERE CARD_TYPE='".$mem_type."' AND STATUS='Y' ")->result_array();
        save_query_in_log();
        $this->db->close();
        return $result;
    }
    public function get_mem_activate_exp_date($mem_card_no)
    {   
        $this->db->reconnect();
        $result  = $this->db->query("SELECT EXP_DATE FROM MEMBERSHIP_ACTIVATE WHERE MEMBERSHIP_NO='".$mem_card_no."' AND STATUS='Y' ")->row();
        save_query_in_log();
        $this->db->close();
        return $result;
    }

    public function get_mem_activate_id($mem_type,$mem_card_no)
    {   
        $this->db->reconnect();
        $result  = $this->db->query("SELECT ACTIVATE_ID FROM MEMBERSHIP_ACTIVATE WHERE CARD_TYPE='".$mem_type."' AND MEMBERSHIP_NO='".$mem_card_no."' AND STATUS='Y' ")->row();
        save_query_in_log();
        $this->db->close();
        return $result;
    }

    public function get_mem_details_by_mem_id($memid)
    {
        $this->db->reconnect();
        $result  = $this->db->query("SELECT P.NAME,P.MEMBERSHIP_POINTS,MC.* FROM MEMBERSHIP_CARD MC LEFT JOIN PARTIES P ON P.PID=MC.PID WHERE MC.PID = '".$memid."' ")->row();
        save_query_in_log();
        $this->db->close();
        return $result;
    }

    // change Membership card Type
    public function get_change_mem_activate_list($change_mem_type)
    {   
        $this->db->reconnect();
        $result  = $this->db->query("SELECT MEMBERSHIP_NO FROM MEMBERSHIP_ACTIVATE WHERE CARD_TYPE='".$change_mem_type."' AND STATUS='Y' ")->result_array();
        save_query_in_log();
        $this->db->close();
        return $result;
    }
    public function change_membership_save($data,$plan_type,$process)
    {
        // print_r($data['change_exp_date_hid']);exit();
        $this->db->reconnect();
        $result  = $this->db->query("UPDATE MEMBERSHIP_CARD SET MEMBERSHIP_NO='".$data['change_mem_card_no']."', CARD_TYPE='".$data['change_mem_type']."', POINTS='".$data['chge_mem_add_points']."', ISSUE_DATE='".$data['chge_issue_date']."', EXP_DATE='".$data['change_exp_date_hid']."', MODIFIED_ON='".$data['modified_on']."', MODIFIED_BY='".$data['modified_user']."', DESCRIPTION='".$data['change_mem_disc']."', PLAN_TYPE='".$plan_type."', STATUS = 'Y' WHERE PID = '".$data['party_id_change_mem']."' ");
        save_query_in_log();
        $this->db->close(); 
        return $result;
    }

    public function update_change_membership_activate($data)
    {
        $this->db->reconnect();
        $result  = $this->db->query("UPDATE MEMBERSHIP_ACTIVATE SET STATUS = 'N' WHERE MEMBERSHIP_NO = '".$data['change_mem_card_no']."' ");
        save_query_in_log();
        $this->db->close(); 
        return $result;
    }

    public function update_add_membership_sts_type($status_type,$data)
    {
        $this->db->reconnect();
        $result  = $this->db->query("UPDATE MEMBERSHIP_HISTORY SET STATUS_TYPE = '".$status_type."' WHERE PID = '".$data['first_name_id_hidden']."' AND MEMBERSHIP_NO = '".$data['mem_card_no']."' ");
        save_query_in_log();
        $this->db->close(); 
        return $result;
    }

    public function update_change_membership_sts_type($status_type,$data)
    {
        $this->db->reconnect();
        $result  = $this->db->query("UPDATE MEMBERSHIP_HISTORY SET STATUS_TYPE = '".$status_type."' WHERE PID = '".$data['party_id_change_mem']."' AND MEMBERSHIP_NO = '".$data['change_mem_card_no']."' ");
        save_query_in_log();
        $this->db->close(); 
        return $result;
    }
    public function get_mem_history_party_name($pid)
    {
        $this->db->reconnect();
        $result  = $this->db->query(" SELECT NAME FROM PARTIES WHERE PID='".$pid."' ")->row();
        save_query_in_log();
        $this->db->close(); 
        return $result;
    }
    

    public function update_change_membership_in_parties($data)
    {
        $this->db->reconnect();
        $result  = $this->db->query("UPDATE PARTIES SET MEMBERSHIP_ID = '".$data['chge_mem_id']."', MEMBERSHIP_POINTS = '".$data['chge_mem_add_points']."' WHERE PID = '".$data['party_id_change_mem']."' ");
        save_query_in_log();
        $this->db->close(); 
        return $result;
    }

    // get Membership History details
    public function get_mem_history_list($pid,$fdate,$tdate,$uname,$tname,$sname,$offset,$page_limit)
    {   
        $this->db->reconnect();
        // $result  = $this->db->query("SELECT * FROM MEMBERSHIP_HISTORY WHERE PID='".$pid."' $fdate $tdate $uname $tname $sname ")->result_array();
        // print_r(" SELECT * FROM 
        //   ( SELECT *, ROW_NUMBER() OVER (ORDER BY LOG_DATE DESC) AS sl FROM  MEMBERSHIP_HISTORY WHERE PID='".$pid."' $fdate $tdate $uname $tname $sname )N WHERE sl BETWEEN $offset AND $page_limit");exit();
        $result = $this->db->query(" SELECT * FROM 
          ( SELECT *, ROW_NUMBER() OVER (ORDER BY LOG_DATE DESC) AS sl FROM  MEMBERSHIP_HISTORY WHERE PID='".$pid."' $fdate $tdate $uname $tname $sname )N WHERE sl BETWEEN $offset AND $page_limit")->result_array();

        save_query_in_log();
        $this->db->close();
        return $result;
    }

    // get User List
    public function get_user_list()
    {   
        $this->db->reconnect();
        $result  = $this->db->query("SELECT * FROM USERLIST ")->result_array();
        save_query_in_log();
        $this->db->close();
        return $result;
    }
    public function get_process_list()
    {   
        $this->db->reconnect();
        $result  = $this->db->query("SELECT PROCESS FROM MEMBERSHIP_HISTORY GROUP BY PROCESS")->result_array();
        save_query_in_log();
        $this->db->close();
        return $result;
    }

}
?>                        