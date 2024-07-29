<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/***************************************************************
    Purpose : To handle all the Department database details 2022-08-19
****************************************************************/
class Redemptionreport_model extends CI_Model
{
  function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Kolkata');    
    } 

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
        $result  = $this->db->query("SELECT DISTINCT INT_GROUP_NAME FROM INT_GROUPS ORDER BY INT_GROUP_NAME")->result_array();
        save_query_in_log();
        $this->db->close();
        return $result;
    }


     public function get_redemp_list($companyid,$zoneid,$areaid,$cityid,$villageid,$streetid,$date,$intreport,$intgrpredem,$weight_report,$amtvw,$jewel,$closing,$loan,$bank,$alter,$date_return)
    {

        $this->db->reconnect();
        
            $result  = $this->db->query("SELECT REDEMPTIONS.*,LOANS.NAME,LOANS.AMOUNT,LOANS.WEIGHT, LOANS.JEWEL_TYPE, LOANS.INTERESTTYPE, LOANS.LOAN_TYPE, LOANS.STATUS, LOANS.ALT_REMARKS,LOANS.COMPANYCODE,LOANS.PAPER_ACTION,LOANS.CUSTOMER_REMARKS,PARTIES.ZONE_SNO,PARTIES.AREA,PARTIES.CITY, PARTIES.ADDRESS1,PARTIES.ADDRESS2 FROM REDEMPTIONS,LOANS,PARTIES WHERE REDEMPTIONS.BILLNO=LOANS.BILLNO AND LOANS.PID=PARTIES.PID  $companyid  $areaid $cityid $villageid $streetid $date $intreport $intgrpredem $weight_report $amtvw $jewel $closing $loan $bank $alter $date_return")->result_array();


             //print_r("SELECT REDEMPTIONS.*,LOANS.NAME,LOANS.AMOUNT,LOANS.WEIGHT, LOANS.JEWEL_TYPE, LOANS.INTERESTTYPE, LOANS.LOAN_TYPE, LOANS.STATUS, LOANS.ALT_REMARKS,LOANS.COMPANYCODE,LOANS.PAPER_ACTION,LOANS.CUSTOMER_REMARKS,PARTIES.ZONE_SNO,PARTIES.AREA,PARTIES.CITY, PARTIES.ADDRESS1,PARTIES.ADDRESS2 FROM REDEMPTIONS,LOANS,PARTIES WHERE REDEMPTIONS.BILLNO=LOANS.BILLNO AND LOANS.PID=PARTIES.PID  $companyid $areaid $cityid $villageid $streetid $date $intreport $intgrpredem $weight_report $amtvw $jewel $closing $loan $bank $alter $date_return");exit();
        save_query_in_log();
        $this->db->close();
        return $result;
    }




}

?>                   