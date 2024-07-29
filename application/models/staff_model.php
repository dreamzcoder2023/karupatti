<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/***************************************************************
    Purpose : To handle all the Department database details 2022-08-19
****************************************************************/
class staff_model extends CI_Model
{
  function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Calcutta'); 
    }

    // To get department list
    public function get_staff_list()
    {
        $this->db->reconnect();
        $result  = $this->db->query("SELECT * FROM STAFFS ORDER BY SNO DESC")->result_array();
        save_query_in_log();
        $this->db->close();
        return $result;
    }

    // To get company Details using Table - Company
    public function get_company_list()
    {
        $this->db->reconnect();
        // $result  = $this->db->query("SELECT * FROM INTERESTLIST ORDER BY INTID DESC")->result_array();
        $result  = $this->db->query("SELECT * FROM COMPANY")->result_array();
        save_query_in_log();
        $this->db->close();
        return $result;
    }

      public function get_city_list()
    {
        $this->db->reconnect();
        // $result  = $this->db->query("SELECT * FROM INTERESTLIST ORDER BY INTID DESC")->result_array();
        $result  = $this->db->query("SELECT * FROM CITY")->result_array();
        save_query_in_log();
        $this->db->close();
        return $result;
    }
      public function get_role_list()
    {
        $this->db->reconnect();
        // $result  = $this->db->query("SELECT * FROM INTERESTLIST ORDER BY INTID DESC")->result_array();
        $result  = $this->db->query("SELECT * FROM ROLE")->result_array();
        save_query_in_log();
        $this->db->close();
        return $result;
    }

    // public function  get_company_list_add($compname)
    // {
    //     $this->db->reconnect();
    //     $result  = $this->db->query("SELECT C.COMPANYNAME FROM STAFFS S JOIN COMPANY C ON C.COMPANYCODE=I.COMPANY WHERE S.SNO = '".$compname."'")->row();
    //     save_query_in_log();
    //     $this->db->close();
    //     return $result;   
    // }
    
    // To get staff details by sno
    public function get_last_sno_details()
    {
        $this->db->reconnect();
        $result  = $this->db->query("SELECT TOP 1 * FROM STAFFS ORDER BY SNO DESC")->row();
        save_query_in_log();
        $this->db->close(); 
        return $result;
    }

        // To get staff details by sno
    public function get_last_userid()
    {
        $this->db->reconnect();
        $result  = $this->db->query("SELECT TOP 1 * FROM USERLIST ORDER BY USERID DESC")->row();
        save_query_in_log();
        $this->db->close(); 
        return $result;
    }

    public function staff_active($data, $id)
    {
        $this->db->reconnect();
        $result = $this->db->query("UPDATE STAFFS SET STATUS = '".$data['Status']."'WHERE SNO = '".$id."'");
        save_query_in_log();
        $this->db->close();
        return $result;
    }

    // To add Staff
    public function add_staff($data)
    {
        $this->db->reconnect();
        $result  = $this->db->query("INSERT INTO STAFFS (SNO,STAFFNAME,DESIGNATION,PHONE,Department,JoinedDate,ReleivedDate,Status,StaffID,FatherName,Gender,City,AadharNo,IDProof,DOB,Age,Role,Username,Password,WorkHrs,MinLeavDays,Address,MobileApp,StaffPhoto,IDPhoto,Basicsalry,PFpermonth,allowance1,allowance2,allowance3,Incentive,Leavededuction,Netsalary,COMPANYCODE,TRANSACTION_PWD)VALUES ('".$data['sno']."','".$data['staff_name']."','".$data['staff_desig']."','".$data['staff_phone']."','".$data['staff_dept']."','".$data['staff_doj']."','".$data['staff_relvdate']."','Y','".$data['staff_id']."','".$data['staff_fname']."','".$data['staff_gender']."','".$data['staff_city']."','".$data['staff_aadhar']."','".$data['staff_idproof']."','".$data['staff_dob']."','".$data['staff_age']."','".$data['staff_role']."','".$data['staff_uname']."','".$data['staff_passwd']."','".$data['staff_wrkhrs']."','".$data['staff_minleavedays']."','".$data['staff_address']."','".$data['staff_mobappallw']."','".$data['staff_staffphoto']."','".$data['staff_idphoto']."','".$data['staff_basicsalry']."','".$data['staff_pfpermonth']."','".$data['staff_allwone']."','".$data['staff_allwtwo']."','".$data['staff_allwthree']."','".$data['staff_incentive']."','".$data['staff_leavded']."','".$data['staff_netsal']."','".$data['staff_company']."','".$data['staff_t_pwd']."')");

        save_query_in_log();
        $this->db->close(); 
        return $result;
    }


    // To add Staff in userlist
    public function add_userlist($data)
    {
        $this->db->reconnect();
        $result_user  = $this->db->query("INSERT INTO USERLIST (USERID,NAME,USERNAME,PASS,ROLE,ACTIVECOMPANY,USERLEVEL,LOANPREFIX,PASSWORD)VALUES ('".$data['userid']."','".$data['staff_name']."','".$data['staff_uname']."','','".$data['staff_role']."','".$data['staff_company']."','','','".$data['staff_passwd']."')");

        save_query_in_log();
        $this->db->close();

        return $result_user;
    }

    // To delete staff
    public function staff_delete($sno)
    {
        $this->db->reconnect();
        // $result  = $this->db->query("UPDATE SYSTEMS SET STATUS = '2' WHERE SYS_ID = '".$sys_id."'");
        $result  = $this->db->query("DELETE FROM STAFFS  WHERE SNO = '".$sno."'");
        save_query_in_log();
        $this->db->close();
        return $result;
    }

    // To get Staff details by Staff id
    public function get_staff_by_sno($did)
    {
        $this->db->reconnect();
        $result  = $this->db->query("SELECT * FROM STAFFS WHERE SNO = '".$did."'")->row();
        save_query_in_log();
        $this->db->close();
        return $result;
    }

    // To get Staff details by Staff id
    public function get_stafflist_by_stafflist_id($stid)
    {
        $this->db->reconnect();
        $result  = $this->db->query("SELECT * FROM STAFFS WHERE SNO = '".$stid."'")->row();
        save_query_in_log();
        $this->db->close();
        return $result;
    }

    // To get Staff details by Staff id in Userlist
    public function get_stafflist_by_id_userlist($stid)
    {
        $this->db->reconnect();
        $result_usered  = $this->db->query("SELECT * FROM USERLIST WHERE USERID = '".$stid."'")->row();
        save_query_in_log();
        $this->db->close();

        //print_r($result_usered);exit;
        return $result_usered;
    }


    // To update staff
  
    public function update_staff($data)
    {
        $result = $this->db->query("UPDATE STAFFS SET

            COMPANYCODE='".$data['edit_staff_company']."',
            STAFFNAME='".$data['staff_name_edit']."',
            DESIGNATION='".$data['staff_desig_edit']."',
            PHONE='".$data['staff_phone_edit']."',
            Department='".$data['staff_dept_edit']."',
            JoinedDate='".$data['staff_doj_edit']."',
            ReleivedDate='".$data['staff_relvdate_edit']."',
            StaffID='".$data['staff_id_edit']."',
            FatherName='".$data['staff_fname_edit']."',
            Gender='".$data['staff_gender_edit']."',
            City='".$data['staff_city_edit']."',
            AadharNo='".$data['staff_aadharno_edit']."',
            IDProof='".$data['staff_idproof_edit']."',
            DOB='".$data['staff_dob_edit']."',
            Age='".$data['staff_age_edit']."',
            Role='".$data['staff_role_edit']."',
            Username='".$data['staff_uname_edit']."',
            Password='".$data['staff_passwd_edit']."',
            WorkHrs='".$data['staff_wrkhrs_edit']."',
            MinLeavDays='".$data['staff_minleavedays_edit']."',
            Address='".$data['staff_address_edit']."',
            MobileApp='".$data['staff_mobappallw_edit']."',
            StaffPhoto='".$data['staff_staffphoto_edit']."',
            IDPhoto='".$data['staff_idphoto_edit']."',
            Basicsalry='".$data['staff_basicsalry_edit']."',
            PFpermonth='".$data['staff_pfpermonth_edit']."',
            allowance1='".$data['staff_allwone_edit']."',
            allowance2='".$data['staff_allwtwo_edit']."',
            allowance3='".$data['staff_allwthree_edit']."',
            Incentive='".$data['staff_incentive_edit']."',
            Leavededuction='".$data['staff_leavded_edit']."',
            Netsalary='".$data['staff_netsal_edit']."',
            TRANSACTION_PWD='".$data['staff_trans_passwd_edit']."' WHERE SNO = '".$data['edit_staff']."'");
            // print_r($data ['stafflist_edit_details']);exit;
            save_query_in_log();
            $this->db->close();
            return $result;
    }




    public function update_user_ed($data)
    {
        $result_usered = $this->db->query("UPDATE USERLIST SET

            USERNAME='".$data['staff_uname_edit']."',
            PASSWORD='".$data['staff_passwd_edit']."' 
            WHERE NAME = '".$data['staff_name_edit']."'");
            //print_r($result_usered);exit;
            save_query_in_log();
            $this->db->close();
            return $result_usered;
    }

    // To get staff phone number unique
    public function staff_phone_unique($val)
    {   
        $this->db->reconnect();
        $result  = $this->db->query("SELECT * FROM STAFFS WHERE PHONE = '".$val."'")->row();
        save_query_in_log();
        $this->db->close();
        return $result;
    }

    
    // To get staff phone number edit unique
    public function staff_phone_unique_edit($val)
    {   
        $this->db->reconnect();
        $result  = $this->db->query("SELECT * FROM STAFFS WHERE PHONE = '".$val."'")->row();
        save_query_in_log();
        $this->db->close();
        return $result;
    }

    public function get_staff_by_staff_id_view($st_vw)
    {
        $this->db->reconnect();
            $result  = $this->db->query("SELECT COMPANY.COMPANYNAME, CITY.CITYNAME,
           ROLE.ROLENAME,STAFFS. *
                FROM STAFFS
                LEFT JOIN COMPANY 
                ON STAFFS.COMPANYCODE = COMPANY.COMPANYCODE
                LEFT JOIN CITY 
                ON STAFFS.CITY = CITY.CITYID
                LEFT JOIN ROLE 
                ON STAFFS.ROLE = ROLE.ROLEID  WHERE STAFFS.SNO = '".$st_vw."'")->row();
        // print_r($result);exit();
        save_query_in_log();
        $this->db->close();
        return $result;
    }


}

?>                   