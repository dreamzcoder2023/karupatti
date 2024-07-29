<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/***************************************************************
    Purpose : To handle all the Department database details 2022-08-19
****************************************************************/
class Loanslistview_model extends CI_Model
{
  function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Kolkata'); 
    }


    // public function get_option_list()
    // {
    //     $this->db->reconnect();
    //     $result  = $this->db->query("SELECT TOP 1000 * FROM LOANS;")->result_array();
    //     save_query_in_log();
    //     $this->db->close();
    //     return $result;
    // }

    public function get_company_list()
    {
        $this->db->reconnect();
        // $result  = $this->db->query("SELECT * FROM INTERESTLIST ORDER BY INTID DESC")->result_array();
        $result  = $this->db->query("SELECT * FROM COMPANY WHERE ACTIVE='Y'")->result_array();
        save_query_in_log();
        $this->db->close();
        return $result;
    }

    public function get_zone_list()
    {
        $this->db->reconnect();
        // $result  = $this->db->query("SELECT * FROM INTERESTLIST ORDER BY INTID DESC")->result_array();
        $result  = $this->db->query("SELECT * FROM ZONE_MASTER")->result_array();
        save_query_in_log();
        $this->db->close();
        return $result;
    }

    public function get_area_list($sno)
    {
        $this->db->reconnect();
        // $result  = $this->db->query("SELECT * FROM INTERESTLIST ORDER BY INTID DESC")->result_array();
        $result  = $this->db->query("SELECT * FROM AREA WHERE ZONE_SNO='".$sno."'")->result_array();
        save_query_in_log();
        $this->db->close();
        return $result;
        // print_r($result);exit(); 

    }

    public function get_city_list($zone_sno,$area_sno)
    {
        $this->db->reconnect();
        // $result  = $this->db->query("SELECT * FROM INTERESTLIST ORDER BY INTID DESC")->result_array();
        $result  = $this->db->query("SELECT * FROM CITY WHERE ZONEID='".$zone_sno."' AND AREAID='".$area_sno."' ")->result_array();
        save_query_in_log();
        $this->db->close();
        return $result;
        // print_r($result);exit(); 

    }

    public function get_village_list($zone_sno,$area_sno,$city_sno)
    {
        $this->db->reconnect();
        // $result  = $this->db->query("SELECT * FROM INTERESTLIST ORDER BY INTID DESC")->result_array();
        $result  = $this->db->query("SELECT * FROM VILLAGE WHERE ZONEID='".$zone_sno."' AND AREAID='".$area_sno."' AND CITYID='".$city_sno."'")->result_array();
        save_query_in_log();
        $this->db->close();
        return $result;
    } 

    public function get_street_list($zone_sno,$area_sno,$city_sno,$village_sno)
    {
        $this->db->reconnect();
        // $result  = $this->db->query("SELECT * FROM INTERESTLIST ORDER BY INTID DESC")->result_array();
        $result  = $this->db->query("SELECT * FROM STREET WHERE ZONEID='".$zone_sno."' AND AREAID='".$area_sno."' AND CITYID='".$city_sno."' AND VILLAGEID='".$village_sno."'")->result_array();
        save_query_in_log();
        $this->db->close();
        return $result;
    }

    public function get_interest_list()
    {
        $this->db->reconnect();
        // $result  = $this->db->query("SELECT * FROM INTERESTLIST ORDER BY INTID DESC")->result_array();
        $result  = $this->db->query("SELECT DISTINCT INTNAME FROM INTERESTLIST ORDER BY INTNAME")->result_array();
        save_query_in_log();
        $this->db->close();
        return $result;
    }

    public function get_interest_group_list()
    {
        $this->db->reconnect();
        // $result  = $this->db->query("SELECT * FROM INTERESTLIST ORDER BY INTID DESC")->result_array();
        $result  = $this->db->query("SELECT * FROM INT_GROUPS ORDER BY INT_GROUP_NAME")->result_array();
        save_query_in_log();
        $this->db->close();
        return $result;
    }

    //  public function get_loanlist_view($cmplstvw,$vlstvw,$stlstvw,$area,$intlstvw,$intgrplstvw)
    // {
       
    //     $this->db->reconnect();
    //     $result  = $this->db->query("SELECT P.PID, P.NAME, P.FATHERSNAME, P.ADDRESS1, P.ADDRESS2, P.AREA, P.PHONE,
    //     C.COMPANYCODE, C.COMPANYNAME , L.COMPANYCODE ,I.INTNAME, I.INT_GROUP,L.AMOUNT,L.JEWEL_TYPE
    //     FROM COMPANY C
    //     LEFT JOIN LOANS L ON C.COMPANYCODE=L.COMPANYCODE 
    //     LEFT JOIN PARTIES P ON P.PID=L.PID
    //     LEFT JOIN INTERESTLIST I ON I.INTNAME=L.INTERESTTYPE $cmplstvw $vlstvw $stlstvw $area $intlstvw $intgrplstvw")->result_array();
    //     save_query_in_log();
    //     $this->db->close();
    //     return $result;        
    // }

    // public function get_loanlist_view($cmplstvw,$vlstvw,$stlstvw,$area,$intlstvw,$intgrplstvw,$loanlstvw,$jwltypevw)

    //  {

    //     // print_r($query);exit();
    //     $this->db->reconnect();
    //     $result  = $this->db->query("SELECT TOP 1000 * FROM LOANS L,COMPANY.COMPANYCODE, COMPANY.COMPANYNAME,
    //         LEFT JOIN LOANS L ON L.COMPANYCODE=COMPANY.COMPANYCODE
    //         LEFT JOIN PARTIES P ON P.PID=L.PID
    //         LEFT JOIN INTERESTLIST I ON I.INTNAME=L.INTERESTTYPE 
    //         WHERE VOUCHER_SNO!='' $cmplstvw $vlstvw $stlstvw $area $intlstvw $intgrplstvw $loanlstvw $jwltypevw")->result_array();
    //     // print_r($result);exit();
    //     save_query_in_log();
    //     $this->db->close();
    //     return $result;

    // } 

    public function get_loanlist_view($cmplstvw,$zonelst,$ctyvw,$vlstvw,$stlstvw,$area,$intlstvw,$intgrplstvw,$loanall,$loantypselect,$jwlall,$jwltypselect,$date,$amtvw,$wghtvw,$status,$bank_status,$alter_remarks)

     {

        // print_r($cmplstvw.$vlstvw.$stlstvw.$area.$intlstvw.$intgrplstvw.$loanall.$loantypselect.$jwlall.$jwltypselect.$date.$amtvw.$wghtvw.$status.$bank_status.$alter_remarks);exit();


        $this->db->reconnect();
        $result  = $this->db->query("SELECT TOP 1000 COMPANY.COMPANYCODE,COMPANY.COMPANYNAME,P.AREA,P.ADDRESS1,P.ADDRESS2,P.CITY,P.PHONE,P.PID, LOANS. *
            FROM LOANS 
            LEFT JOIN COMPANY 
            ON LOANS.COMPANYCODE = COMPANY.COMPANYCODE
            LEFT JOIN PARTIES P ON P.PID=LOANS.PID
            LEFT JOIN INTERESTLIST I ON I.INTNAME=LOANS.INTERESTTYPE WHERE LOANS.VOUCHER_SNO!=''  $cmplstvw $zonelst$ctyvw $vlstvw $stlstvw $area $intlstvw $intgrplstvw $loanall $loantypselect $jwlall $jwltypselect $date $amtvw $wghtvw $status $bank_status $alter_remarks")->result_array();
        // print_r("SELECT TOP 1000 COMPANY.COMPANYCODE,COMPANY.COMPANYNAME,P.AREA,P.ADDRESS1,P.ADDRESS2,P.CITY,P.PHONE,P.PID, LOANS. *
        //     FROM LOANS 
        //     LEFT JOIN COMPANY 
        //     ON LOANS.COMPANYCODE = COMPANY.COMPANYCODE
        //     LEFT JOIN PARTIES P ON P.PID=LOANS.PID
        //     LEFT JOIN INTERESTLIST I ON I.INTNAME=LOANS.INTERESTTYPE WHERE LOANS.VOUCHER_SNO!=''  $cmplstvw $zonelst$ctyvw $vlstvw $stlstvw $area $intlstvw $intgrplstvw $loanall $loantypselect $jwlall $jwltypselect $date $amtvw $wghtvw $status $bank_status $alter_remarks");exit();

        save_query_in_log();
        $this->db->close();
        return $result;

    } 


}

?>                   