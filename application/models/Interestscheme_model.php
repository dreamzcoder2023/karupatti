<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/***************************************************************
    Purpose : To handle all the Interestscheme database details 2022-08-19
****************************************************************/
class Interestscheme_model extends CI_Model
{
  function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Calcutta'); 
    }

    // To get Interestscheme list
    public function get_interestscheme_list($sts)
    {
        $this->db->reconnect();
        // $result  = $this->db->query("SELECT * FROM INTERESTLIST ORDER BY INTID DESC")->result_array();
        $result  = $this->db->query("SELECT C.COMPANYNAME,I.* FROM INTERESTLIST I LEFT JOIN COMPANY C ON C.COMPANYCODE=I.COMPANY $sts ORDER BY I.INTID DESC")->result_array();
        save_query_in_log();
        $this->db->close();
        return $result;
    }
    public function  get_company_list()
    {
        $this->db->reconnect();
        $result  = $this->db->query("SELECT * FROM COMPANY")->result_array();
        save_query_in_log();
        $this->db->close();
        return $result;   
    }
    public function  get_company_list_view($intschid_view)
    {
        $this->db->reconnect();
        $result  = $this->db->query("SELECT C.COMPANYNAME FROM INTERESTLIST I JOIN COMPANY C ON C.COMPANYCODE=I.COMPANY WHERE I.INTID = '".$intschid_view."'")->row();
        save_query_in_log();
        $this->db->close();
        return $result;   
    }

    public function  get_group_list()
    {
        $this->db->reconnect();
        $result  = $this->db->query("SELECT INT_GROUP FROM INTERESTLIST GROUP BY INT_GROUP")->result_array();
        save_query_in_log();
        $this->db->close();
        return $result;   
    }
    public function  get_group_list_view($intschid_view)
    {
        $this->db->reconnect();
        $result  = $this->db->query("SELECT * FROM INTERESTLIST WHERE INTID = '".$intschid_view."'")->row();
        save_query_in_log();
        $this->db->close();
        return $result;   
    }
    public function  get_default_loan_type_list()
    {
        $this->db->reconnect();
        $result  = $this->db->query("SELECT * FROM INTERESTLIST")->result_array();
        save_query_in_log();
        $this->db->close();
        return $result;   
    }
    public function  get_default_loan_type_list_view()
    {
        $this->db->reconnect();
        $result  = $this->db->query("SELECT * FROM INTERESTLIST")->result_array();
        save_query_in_log();
        $this->db->close();
        return $result;   
    }
    public function  get_loan_period_type_list()
    {
        $this->db->reconnect();
        $result  = $this->db->query("SELECT * FROM INTERESTLIST")->result_array();
        save_query_in_log();
        $this->db->close();
        return $result;   
    }
    public function  get_loan_period_type_list_view()
    {
        $this->db->reconnect();
        $result  = $this->db->query("SELECT * FROM INTERESTLIST")->result_array();
        save_query_in_log();
        $this->db->close();
        return $result;   
    }
    public function  get_max_period_type_list()
    {
        $this->db->reconnect();
        $result  = $this->db->query("SELECT * FROM INTERESTLIST")->result_array();
        save_query_in_log();
        $this->db->close();
        return $result;   
    }
    public function  get_max_period_type_list_view()
    {
        $this->db->reconnect();
        $result  = $this->db->query("SELECT * FROM INTERESTLIST")->result_array();
        save_query_in_log();
        $this->db->close();
        return $result;   
    }
    public function get_last_item_details()
    {
        $this->db->reconnect();
        $result  = $this->db->query("SELECT TOP 1 * FROM INTERESTLIST ORDER BY INTID DESC")->row();
        save_query_in_log();
        $this->db->close();
        return $result;
    }
    public function interestscheme_save($data)
    {
        $this->db->reconnect();
        $result  = $this->db->query("INSERT INTO INTERESTLIST (INTID,INTNAME,INTEREST,INT_GROUP,ROUNDUP,PERIOD,LP_TYPE,MAXPERIOD,MP_TYPE,LOAN_TYPE,ACTIVE,COMPANY)VALUES ('".$data['intid']."','".$data['add_sname_int_scheme']."','".$data['add_interest_int_scheme']."','".$data['add_sl_group_int_scheme']."','1','".$data['add_ln_period_int_scheme']."','".$data['add_lp_type_int_scheme']."','".$data['add_mx_period_int_scheme']."','".$data['add_mp_type_int_scheme']."','".$data['add_sl_def_ln_ty_int_scheme']."','Y','".$data['add_sl_company_int_scheme']."')");
        save_query_in_log();
        $this->db->close(); 
        return $result;
    }
    // public function get_status_list($sts)
    // {
    //     $this->db->reconnect();
    //     $result = $this->db->query("SELECT * FROM INTERESTLIST $sts")->result_array();
    //     //echo "SELECT * FROM INTERESTLIST $sts";exit;
    //     // print_r($result);exit();
    //     save_query_in_log();
    //     $this->db->close();
    //     return $result;
    // }
    public function intsch_active($data, $id)
    {
        $this->db->reconnect();
        $result = $this->db->query("UPDATE INTERESTLIST SET ACTIVE = '".$data['status']."' WHERE INTID = '".$id."'");
        save_query_in_log();
        $this->db->close();
        return $result;
    }
    // To get interestscheme details by interestscheme id
    public function get_interestscheme_by_interestscheme_id($intschid)
    {
        $this->db->reconnect();
        $result  = $this->db->query("SELECT * FROM INTERESTLIST WHERE INTID = '".$intschid."'")->row();
        save_query_in_log();
        $this->db->close();
        return $result;
    }
    public function get_interestscheme_by_interestscheme_id_view($intschid_view)
    {
        $this->db->reconnect();
        $result  = $this->db->query("SELECT C.COMPANYNAME,I.* FROM INTERESTLIST I LEFT JOIN COMPANY C ON C.COMPANYCODE=I.COMPANY WHERE I.INTID = '".$intschid_view."'")->row();
        save_query_in_log();
        $this->db->close();
        return $result;
    }
    public function  get_ints_list()
    {
        $this->db->reconnect();
        $result  = $this->db->query("SELECT * FROM COMPANY")->result_array();
        save_query_in_log();
        $this->db->close();
        return $result;   
    }
    // To update department
    public function update_ineterestscheme($data)
    {
        $this->db->reconnect();
        $result  = $this->db->query("UPDATE INTERESTLIST SET INTNAME = '".$data['edit_sname_int_scheme']."',INTEREST = '".$data['edit_interest_int_scheme']."',INT_GROUP = '".$data['edit_sl_group_int_scheme']."',ROUNDUP = '1',PERIOD = '".$data['edit_ln_period_int_scheme']."',LP_TYPE = '".$data['edit_lp_type_int_scheme']."',MAXPERIOD = '".$data['edit_mx_period_int_scheme']."',MP_TYPE = '".$data['edit_mp_type_int_scheme']."',LOAN_TYPE = '".$data['edit_sl_def_ln_ty_int_scheme']."',COMPANY = '".$data['edit_sl_company_int_scheme']."' WHERE INTID = '".$data['edit_intid']."'");
        // print_r($result);exit();
        save_query_in_log();
        $this->db->close();
        return $result;
    }

    public function interest_scheme_delete($uid)
    {
        $this->db->reconnect();
        $result  = $this->db->query("DELETE FROM INTERESTLIST WHERE INTID = '".$uid."'");
        save_query_in_log();
        $this->db->close();
        return $result;
    }
    // To get Interest Scheme unique
    public function scheme_name_unique($val)
    {   
        $this->db->reconnect();
        $result  = $this->db->query("SELECT * FROM INTERESTLIST WHERE INTNAME = '".$val."'")->row();
        save_query_in_log();
        $this->db->close();
        return $result;
    }
    public function scheme_name_unique_edit($val)
    {   
        $this->db->reconnect();
        $result  = $this->db->query("SELECT * FROM INTERESTLIST WHERE INTNAME = '".$val."'")->row();
        save_query_in_log();
        $this->db->close();
        return $result;
    }

    // // To add department
    // public function add_department($data)
    // {
    //     $this->db->reconnect();
    //     $result  = $this->db->query("INSERT INTO DEPARTMENT (DEPARTMENTNAME,COMPANYCODE,CREATEDON,CREATEDBY,STATUS)VALUES ('".$data['department']."','".$data['company_code']."','".$data['created_on']."','".$data['created_by']."','0')");
    //     save_query_in_log();
    //     $this->db->close(); 
    //     return $result;
    // }

    // // To get department unique edit
    // public function department_unique_edit($val,$dcid)
    // {
    //     $this->db->reconnect();
    //     $result  = $this->db->query("SELECT * FROM DEPARTMENT WHERE DEPARTMENTNAME = '".$val."' AND DEPARTMENTID != '".$dcid."'")->row();
    //     save_query_in_log();
    //     $this->db->close();
    //     return $result;
    // }

    // // To delete department
    // public function department_delete($uid)
    // {
    //     $this->db->reconnect();
    //     $result  = $this->db->query("UPDATE DEPARTMENT SET STATUS = '2' WHERE DEPARTMENTID = '".$uid."'");
    //     save_query_in_log();
    //     $this->db->close();
    //     return $result;
    // }


}
?>                        