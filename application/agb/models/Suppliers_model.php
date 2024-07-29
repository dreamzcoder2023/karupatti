<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/***************************************************************
    Purpose : To handle all the Department database details 2022-08-19
****************************************************************/
class Suppliers_model extends CI_Model
{
  public $other_db;  
  function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Calcutta'); 
    }

    public function get_acc_ledgers_list()
    {
        $this->other_db->reconnect();

        // $result  = $this->other_db->query("SELECT * FROM ACC_LEDGERS WHERE COMPANYCODE='".$_SESSION['COMPANYCODE']."' AND CHK_PREDEFINED='N' ORDER BY CHK_PREDEFINED DESC, GROUP_NAME")->result_array();

         $result  = $this->other_db->query("SELECT *FROM ACC_LEDGERS WHERE GROUP_NAME='SUPPLIERS' AND 
        COMPANYCODE='".$_SESSION['COMPANYCODE']."' ORDER BY LEDGER_NAME")->result_array();

        // print_r($_SESSION['COMPANYCODE']);exit();

        //   $result  = $this->other_db->query("SELECT COMPANY.COMPANYCODE, .*FROM ACC_LEDGERS LEFT JOIN COMPANY 
        //     ON COMPANY.COMPANYCODE = ACC_LEDGERS.COMPANYCODE WHERE GROUP_NAME='SUPPLIERS' AND 
        // COMPANYCODE='".$_SESSION['COMPANYCODE']."' ORDER BY LEDGER_NAME")->result_array();


        //SELECT GROUP_NAME FROM ACC_GROUPS  WHERE COMPANYCODE= '001'  AND GROUP_SNO='18'
        save_query_in_log();
        $this->other_db->close();
        return $result;
    }

    public function get_fin_years_list()
    {
        $this->db->reconnect();
        $result  = $this->db->query("SELECT TOP 1 * FROM FIN_YEARS  WHERE STATUS='Y' ORDER BY ID DESC")->row();
        save_query_in_log();
        $this->db->close();
        return $result;
    }

    public function get_acc_group_list()
    {
        $this->other_db->reconnect();
        $result  = $this->other_db->query("SELECT DISTINCT GROUP_NAME FROM ACC_LEDGERS WHERE GROUP_NAME='SUPPLIERS' OR  GROUP_NAME='Karupatti'" )->result_array();
        save_query_in_log();
        $this->other_db->close();
        return $result;
    }

    public function get_group_id_list()
    {
        $this->other_db->reconnect();
        $result  = $this->other_db->query("SELECT DISTINCT GROUP_SNO FROM ACC_GROUPS WHERE GROUP_NAME LIKE 'SUPPLIERS'" )->row();
        save_query_in_log();
        $this->other_db->close();
        return $result;
    }

    public function get_super_id_list()
    {
        $this->other_db->reconnect();
        $result  = $this->other_db->query("SELECT DISTINCT AC_SUPER_ID FROM ACC_GROUPS WHERE GROUP_NAME LIKE 'SUPPLIERS'")->row();
        save_query_in_log();
        $this->other_db->close();
        return $result;
    }

    // To get state list
    public function get_states_list()
    {
        $this->db->reconnect();
        $result  = $this->db->query("SELECT * FROM STATES")->result_array();
        save_query_in_log();
        $this->db->close();
        return $result;
    }

     // To get ID Type list
    public function get_idtype_list()
    {
        $this->db->reconnect();
        // $result  = $this->db->query("SELECT 
        // tb_1,
        // tb_2.*
        // FROM [BANKERS].[dbo].[ID_TYPE] tb_1
        // LEFT JOIN [FY2022-2023].[dbo].[ACC_LEDGERS] tb_2 ON tb_1.IDTYPENAME = tb_2.IDTYPENAME")->result_array();

        $result = $this->db->query("SELECT * FROM IDTYPE WHERE STATUS=1 ORDER BY IDTYPENAME ASC")->result_array();

        save_query_in_log();
        $this->db->close();
        return $result;
    }
      // To get ID Type list edit
    public function get_idtypeedit_list()
    {
        $this->db->reconnect();
        // $result  = $this->db->query("SELECT 
        // tb_1,
        // tb_2.*
        // FROM [BANKERS].[dbo].[ID_TYPE] tb_1
        // LEFT JOIN [FY2022-2023].[dbo].[ACC_LEDGERS] tb_2 ON tb_1.IDTYPENAME = tb_2.IDTYPENAME")->result_array();

        $result = $this->db->query("SELECT * FROM IDTYPE ORDER BY IDTYPENAME ASC")->result_array();

        save_query_in_log();
        $this->db->close();
        return $result;
    }

      // To get OP_SIDE list
    public function get_op_list_list()
    {
        $this->other_db->reconnect();
        $result  = $this->other_db->query("SELECT DISTINCT GROUP_SIDE FROM ACC_GROUPS")->result_array();
        save_query_in_log();
        $this->other_db->close();
        return $result;
    }

    // To get suppliers list
    public function get_suppliers_list()
    {
        $this->other_db->reconnect();
        // $result  = $this->other_db->query("SELECT *FROM ACC_LEDGERS WHERE GROUP_NAME='SUPPLIERS' AND 
        // COMPANYCODE='".$_SESSION['COMPANYCODE']."' ORDER BY LEDGER_NAME")->result_array();   

         // $result  = $this->other_db->query("SELECT *FROM ACC_LEDGERS WHERE GROUP_NAME='SUPPLIERS' OR GROUP_NAME='Karupatti' ORDER BY ADDED_TIME DESC  ")->result_array();      
         $result = $this->other_db->query("SELECT * FROM ACC_LEDGERS WHERE (GROUP_NAME='SUPPLIERS' OR GROUP_NAME='Karupatti' OR GROUP_NAME='RE_AGENT' OR GROUP_NAME='Suppliers-karupatti') AND Status!='D' ORDER BY ADDED_TIME DESC")->result_array();

        save_query_in_log();
        $this->other_db->close();
        return $result;
    }

     public function suppliers_active($data,$id)
    {
        $this->other_db->reconnect();
        $result = $this->other_db->query("UPDATE ACC_LEDGERS SET Status = '".$data['Status']."'
            WHERE LEDGER_SNO = '".$id."'");
        save_query_in_log();
        $this->other_db->close();
        return $result;
    }
    
     // To get Product details by sno
    public function get_last_sno_details()
    {
        $this->db->reconnect();
        // $result  = $this->db->query("SELECT TOP 1 * FROM PRODUCTS ORDER BY ITEM_SNO DESC")->row();
        $result  = $this->db->query("SELECT KEYVALUE FROM KEYMASTER WHERE KEYNAME='SUPPLIERS' ")->row();
        save_query_in_log();
        $this->db->close(); 
        return $result;
    }


    public function get_updated_keyvalue()
    {
        $this->db->reconnect();

        // $result  = $this->db->query("UPDATE KEYMASTER SET KEYVALUE = '".$uid."' WHERE KEYNAME = '`SUPPLIERS'");
        $result = $this->db->query("UPDATE KEYMASTER SET KEYVALUE=KEYVALUE+1 WHERE KEYNAME='SUPPLIERS'");
        save_query_in_log();
        $this->db->close(); 
        return $result;
    }

    
    // // To get staff details by sno
    // public function get_last_sno_details()
    // {
    //     $this->other_db->reconnect();
    //     $result  = $this->other_db->query("SELECT TOP 1 * FROM ACC_LEDGERS ORDER BY LEDGER_SNO DESC")->row();
    //     // print_r($result);exit();
    //     save_query_in_log();
    //     $this->other_db->close(); 
    //     return $result;
    // }

    // To add new suppliers
    public function add_suppliers($data)
    {
       
        $this->other_db->reconnect();
        $result  = $this->other_db->query("INSERT INTO ACC_LEDGERS (
            COMPANYCODE,
            LEDGER_SNO,
            LEDGER_NAME,
            ADDRESS,
            ADDRESS2,
            CITY,
            STATE,
            GROUP_NAME,
            GROUP_ID,
            SUPER_ID,
            CHK_PREDEFINED,
            PHONE,
            EMAIL,
            PAN_NO,
            GST_NO,
            OP_BALANCE,
            OP_SIDE,
            ADDED_USER,
            ADDED_TIME,
            Status,
            DESCRIPTION,
            IDTYPENAME,
            credit,
            debit,
            balance

            ) VALUES(
            '".$data['company_code']."',
            '".$data['supp_id']."',
            '".$data['supp_name']."',
            '".$data['supp_addr']."',
            '".$data['supp_zone']."',
            '".$data['supp_city']."',
            '".$data['supp_state']."',
            '".$data['supp_accgrp']."',
            '".$data['supp_group_id']."',
            '".$data['supp_super_id']."',
            'N',
            '".$data['supp_phone']."',
            '".$data['supp_email']."',
            '".$data['supp_pan_no']."',
            '".$data['supp_gst_no']."',
            '".$data['supp_op_bal']."',
            '".$data['supp_op_dr']."',
            '".$data['added_user']."',
            '".$data['created_on']."',
            'Y',
            '".$data['supp_rmks']."',
            '".$data['supp_id_type']."',
            '".$data['credit']."',
            '".$data['debit']."',
            '".$data['balance']."'
            )");

       // print_r($result);exit();
        save_query_in_log();
        $this->other_db->close(); 
        return $result;
    }

    // To add new suppliers
    public function add_suppliers_partymaster($data)
    {
        $this->db->reconnect();
        $result  = $this->db->query("INSERT INTO PARTY_MASTER (
            PARTY_TYPE,
            PARTY_SNO,
            PARTY_NAME,
            ADDRESS1,
            ADDRESS2,
            CITY,
            STATE,
            GROUP_ID,
            SUPER_ID,
            PHONE,
            EMAIL,
            PAN_NO,
            GST_NO,
            LEDGER_GROUP,
            OP_BALANCE,
            OP_SIDE,
            ADDED_USER,
            ADDED_TIME) VALUES(
            '1',
            '".$data['supp_id']."',
            '".$data['supp_name']."',
            '".$data['supp_addr']."',
            '".$data['supp_zone']."',
            '".$data['supp_city']."',
            '".$data['supp_state']."',
            '".$data['supp_group_id']."',
            '".$data['supp_super_id']."',
            '".$data['supp_phone']."',
            '".$data['supp_email']."',
            '".$data['supp_pan_no']."',
            '".$data['supp_gst_no']."',
            '".$data['supp_accgrp']."',
            '".$data['supp_op_bal']."',
            '".$data['supp_op_dr']."',
            '".$data['added_user']."',
            '".$data['created_on']."')");

        // print_r($data);exit();
        save_query_in_log();
        $this->db->close(); 
        return $result;


    }

    // To get Suppliers details by supplierid
    public function get_suppliers_details_id_delete($sno)
    {
        $this->other_db->reconnect();
        $result  = $this->other_db->query("SELECT * FROM ACC_LEDGERS WHERE LEDGER_SNO = '".$sno."' ")->row();
        save_query_in_log();
        $this->other_db->close();
        return $result;
    }

     // To get Suppliers details by supplierid
    public function get_suppliers_details_id_delete_partymaster($sno)
    {
        $this->db->reconnect();
        $result  = $this->db->query("SELECT * FROM PARTY_MASTER WHERE PARTY_SNO = '".$sno."'")->row();
        save_query_in_log();
        $this->db->close();
        return $result;
    }


    // To delete Suppliers
    public function suppliers_delete($sno)
    {
        $this->other_db->reconnect();
        $result  = $this->other_db->query("UPDATE ACC_LEDGERS  SET Status='D' WHERE LEDGER_SNO = '".$sno."'");
        save_query_in_log();
        $this->other_db->close();
        return $result;
    }



    // To delete Suppliers
    public function suppliers_delete_partymaster($sno)
    {
        $this->db->reconnect();
        $result  = $this->db->query("DELETE FROM PARTY_MASTER WHERE PARTY_SNO = '".$sno."'");
        save_query_in_log();
        $this->db->close();
        return $result;
    }


    // To get Suppliers details by supplierid
    public function get_suppliers_details_id($suppid)
    {
        $this->other_db->reconnect();
        $result  = $this->other_db->query("SELECT * FROM ACC_LEDGERS WHERE LEDGER_SNO = '".$suppid."'")->row();

        // print_r($result);exit();
        save_query_in_log();
        $this->other_db->close();
        return $result;
    }

     public function update_suppliers($data)
    {
        $result = $this->other_db->query("UPDATE ACC_LEDGERS SET
            
            LEDGER_NAME='".$data['supp_name']."',
            ADDRESS='".$data['supp_addr_edit']."',
            ADDRESS2='".$data['supp_zone_edit']."',
            CITY='".$data['supp_city_edit']."',
            STATE='".$data['supp_state_ed']."',
            GROUP_NAME='".$data['supp_accgroup_edit']."',
            PHONE='".$data['supp_phone_edit']."',
            EMAIL='".$data['supp_email_edit']."',
            IDTYPENAME='".$data['supp_id_type_edit']."',
            PAN_NO='".$data['supp_pan_no_edit']."',
            GST_NO='".$data['supp_gstin_no_edit']."',
            OP_BALANCE='".$data['supp_op_bal_edit']."',
            OP_SIDE='".$data['supp_op_dr_edit']."',
            DESCRIPTION='".$data['supp_remarks_edit']."',
            ADDED_USER='".$data['added_user_edit']."',
            COMPANYCODE='".$data['company_code_edit']."',
            ADDED_TIME='".$data['modified_on_edit']."'  
            WHERE LEDGER_SNO = '".$data['edit_suppliers']."'");
            save_query_in_log();
            $this->other_db->close();
            return $result;

    }


    // To update Products
  
    public function update_suppliers_partymaster($data)
    {
        $result = $this->db->query("UPDATE PARTY_MASTER SET
            
            PARTY_TYPE='1',
            PARTY_NAME='".$data['supp_name']."',
            ADDRESS1='".$data['supp_addr_edit']."',
            ADDRESS2='".$data['supp_zone_edit']."',
            CITY='".$data['supp_city_edit']."',
            STATE='".$data['supp_state_ed']."',
            PHONE='".$data['supp_phone_edit']."',
            EMAIL='".$data['supp_email_edit']."',
            PAN_NO='".$data['supp_pan_no_edit']."',
            GST_NO='".$data['supp_gstin_no_edit']."',
            LEDGER_GROUP='".$data['supp_accgroup_edit']."',
            OP_BALANCE='".$data['supp_op_bal_edit']."',
            OP_SIDE='".$data['supp_op_dr_edit']."',
            ADDED_USER='".$data['added_user_edit']."',
            ADDED_TIME='".$data['modified_on_edit']."'  
            WHERE PARTY_SNO = '".$data['edit_suppliers']."'");
            save_query_in_log();
            $this->db->close();
            return $result;

    }

    //View Modal

        public function get_suppliers_view($supp_vw)
    {
        $this->other_db->reconnect();
        $result  = $this->other_db->query("SELECT * FROM ACC_LEDGERS WHERE LEDGER_SNO = '".$supp_vw."'")->row();
        // print_r($result);exit();
        save_query_in_log();
        $this->other_db->close();
        return $result;
    }


        // To get staff phone number unique
    public function supplier_phone_unique($val)
    {   
        $this->other_db->reconnect();
        $result  = $this->other_db->query("SELECT * FROM ACC_LEDGERS WHERE PHONE = '".$val."'")->row();

        save_query_in_log();
        $this->other_db->close();
        return $result;
    }

        // To get staff phone number edit unique
    public function suppliers_phone_unique_edit($val)
    {   
        $this->other_db->reconnect();
        $result  = $this->other_db->query("SELECT * FROM ACC_LEDGERS WHERE PHONE = '".$val."'")->row();
        save_query_in_log();
        $this->other_db->close();
        return $result;
    }

}

?>                   