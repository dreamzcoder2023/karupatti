<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/***************************************************************
    Purpose : To handle all the Department database details 2022-08-19
****************************************************************/
class Repledgereport_model extends CI_Model
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
        $result  = $this->db->query("SELECT * FROM COMPANY WHERE ACTIVE='Y' ORDER BY COMPANYNAME")->result_array();
        save_query_in_log();
        $this->db->close();
        return $result;
    }

    public function get_interest_list()
    {
        $this->db->reconnect();
        // $result  = $this->db->query("SELECT * FROM INTERESTLIST ORDER BY INTID DESC")->result_array();
        $result  = $this->db->query("SELECT DISTINCT INTEREST FROM REPLEDGE_MASTER ORDER BY INTEREST")->result_array();
        save_query_in_log();
        $this->db->close();
        return $result;
    }

    public function get_bank_list()
    {
        $this->db->reconnect();
        // $result  = $this->db->query("SELECT * FROM INTERESTLIST ORDER BY INTID DESC")->result_array();
        $result  = $this->db->query("SELECT * FROM BANKS ORDER BY BANKNAME")->result_array();
        save_query_in_log();
        $this->db->close();
        return $result;
    }

    public function get_staff_list()
    {
        $this->db->reconnect();
        // $result  = $this->db->query("SELECT * FROM INTERESTLIST ORDER BY INTID DESC")->result_array();
        $result  = $this->db->query("SELECT * FROM STAFFS ORDER BY STAFFNAME")->result_array();
        save_query_in_log();
        $this->db->close();
        return $result;
    }


    public function get_repledge_return_list($companyid,$interestid,$bankid,$report_view,$date,$status,$mixstatus,$weight_report,$staffid,$date_return,$typestatus)


    {
        
        $value='';
        $end_result='';

        $this->db->reconnect();

        if($report_view=='1'){

            if($typestatus=='G'){

                      $val = [];

                //$p_master = $this->db->query("SELECT * FROM REPLEDGE_MASTER WHERE RP_BILLNO!='' $companyid $interestid $bankid $date $status $mixstatus $weight_report $staffid $date_return")->result_array();

                $p_master = $this->db->query("SELECT REPLEDGE_MASTER.*,REPLEDGE_RETURN.RETURN_DATE,REPLEDGE_RETURN.NETPAY FROM REPLEDGE_MASTER,REPLEDGE_RETURN WHERE REPLEDGE_MASTER.RP_BILLNO=REPLEDGE_RETURN.RP_BILLNO $companyid $interestid $bankid $status $mixstatus $date $weight_report $staffid $date_return")->result_array();


                foreach ($p_master as $key => $value){

                    $p_details = $this->db->query("SELECT * FROM REPLEDGE_DETAILS WHERE RP_BILLNO='".$value['RP_BILLNO']."'")->result_array();

                    //$p_details  = $this->db->query("SELECT TOP 1000 REPLEDGE_DETAILS.*,REPLEDGE_MASTER.NETWEIGHT,REPLEDGE_MASTER.COMPANYCODE,REPLEDGE_MASTER.INTEREST AS INTPERCENT,REPLEDGE_MASTER.STAFF,REPLEDGE_MASTER.ACTIVE,REPLEDGE_MASTER.MIXED,REPLEDGE_MASTER.ENDATE,REPLEDGE_MASTER.RETURN_DATE,REPLEDGE_RETURN.RETURN_DATE,REPLEDGE_RETURN.NETPAY FROM REPLEDGE_DETAILS,REPLEDGE_MASTER,REPLEDGE_RETURN WHERE REPLEDGE_MASTER.RP_SNO=REPLEDGE_RETURN.RP_SNO AND REPLEDGE_RETURN.CHK_VERIFIED='Y' AND REPLEDGE_DETAILS.RP_BILLNO='".$value['RP_BILLNO']."'")->result_array();

                    $val[] = [
                               'p_master'=>$p_master[$key],
                                'p_details'=>$p_details
                            ];
                    
                }


               $result = $val;
               //print_r("SELECT REPLEDGE_MASTER.*,REPLEDGE_RETURN.RETURN_DATE,REPLEDGE_RETURN.NETPAY FROM REPLEDGE_MASTER,REPLEDGE_RETURN WHERE REPLEDGE_MASTER.RP_BILLNO=REPLEDGE_RETURN.RP_BILLNO $companyid $interestid $bankid $date $status $mixstatus $weight_report $staffid $date_return");exit;

                }else if($typestatus=='S'){

                $result  = $this->db->query("SELECT BANK, COUNT(*) AS COUNT,SUM(LOANAMOUNT) AS AMOUNT,SUM(INTEREST) AS INTEREST,SUM(OTHERS) AS OTHERS,SUM(DISCOUNT)AS DISCOUNT FROM REPLEDGE_RETURN WHERE CHK_VERIFIED='Y' $companyid $interestid $bankid $date $mixstatus $weight_report $staffid $date_return GROUP BY BANK ORDER BY BANK ")->result_array();


                }else{

                    $result  = $this->db->query("SELECT REPLEDGE_RETURN.*,REPLEDGE_MASTER.NETWEIGHT,REPLEDGE_MASTER.COMPANYCODE,REPLEDGE_MASTER.INTEREST AS INTPERCENT,REPLEDGE_MASTER.STAFF,REPLEDGE_MASTER.ACTIVE,REPLEDGE_MASTER.MIXED,REPLEDGE_MASTER.ENDATE,REPLEDGE_MASTER.RETURN_DATE FROM REPLEDGE_RETURN,REPLEDGE_MASTER WHERE REPLEDGE_MASTER.RP_SNO=REPLEDGE_RETURN.RP_SNO AND REPLEDGE_RETURN.CHK_VERIFIED='Y' $companyid $interestid $bankid $date $mixstatus $weight_report $staffid $date_return")->result_array();

            }

           


        }else if($report_view=='2'){

            if($typestatus=='G'){

                $result=[];

            }elseif($typestatus=='S'){

                //$result  = $this->db->query("SELECT BANK, COUNT(*) AS COUNT,SUM(AMOUNT) AS AMOUNT,SUM(INTEREST) AS INTEREST,SUM(OTHERS) AS OTHERS FROM REPLEDGE_MASTER WHERE CHK_VERIFIED='Y' $companyid $interestid $bankid $date $mixstatus $weight_report $staffid $date_return GROUP BY BANK ORDER BY BANK")->result_array();

                $result  = $this->db->query("SELECT BANK, COUNT(*) AS COUNT,SUM(AMOUNT)AS AMOUNT,SUM(INTEREST) AS INTEREST FROM REPLEDGE_DETAILS WHERE RP_BILLNO!='' $companyid $interestid $bankid $date $mixstatus $weight_report $staffid $date_return GROUP BY BANK ORDER BY BANK")->result_array();


            }else {

                 //$result  = $this->db->query("SELECT DISTINCT REPLEDGE_RETURN.*,PLEDGEINFO.BILLNO,PLEDGEINFO.PNO,REPLEDGE_MASTER.NETWEIGHT,REPLEDGE_MASTER.COMPANYCODE,REPLEDGE_MASTER.INTEREST,REPLEDGE_MASTER.STAFF,REPLEDGE_MASTER.ACTIVE,REPLEDGE_MASTER.MIXED,REPLEDGE_MASTER.ENDATE,REPLEDGE_MASTER.RETURN_DATE FROM REPLEDGE_RETURN,REPLEDGE_MASTER,PLEDGEINFO WHERE REPLEDGE_MASTER.RP_BILLNO=REPLEDGE_RETURN.RP_BILLNO AND PLEDGEINFO.BILLNO=REPLEDGE_MASTER.RP_BILLNO AND REPLEDGE_RETURN.CHK_VERIFIED='Y' $bankid $date $weight_report $staffid $date_return")->result_array();

                  $result  = $this->db->query("SELECT * FROM REPLEDGE_DETAILS WHERE BILLNO!='' $bankid $date $weight_report $staffid $date_return")->result_array();
                
            }
           //   print_r("SELECT * FROM REPLEDGE_DETAILS WHERE BILLNO!='' $bankid $date $weight_report $staffid $date_return");exit();  

        }else{



            if($typestatus=='G'){
                $val = [];

                $p_master = $this->db->query("SELECT * FROM REPLEDGE_MASTER WHERE RP_BILLNO!='' $companyid $interestid $bankid $date $status $mixstatus $weight_report $staffid")->result_array();

                foreach ($p_master as $key => $value){

                   $p_details = $this->db->query("SELECT * FROM REPLEDGE_DETAILS WHERE RP_BILLNO='".$value['RP_BILLNO']."'")->result_array();

                   

                    $val[] = [
                               'p_master'=>$p_master[$key],
                                'p_details'=>$p_details
                            ];
                    
                }

               $result = $val;


            }elseif($typestatus=='S'){

                $result  = $this->db->query("SELECT BANK,COUNT(*) AS COUNT,SUM(AMOUNT) AS AMOUNT FROM REPLEDGE_MASTER WHERE ACTIVE='Y' $companyid $interestid $bankid $date $status $mixstatus $weight_report $staffid GROUP BY BANK ORDER BY BANK")->result_array();

            }else{

              $result  = $this->db->query("SELECT *FROM REPLEDGE_MASTER WHERE RP_SNO!='' $status $companyid $interestid $bankid $date $mixstatus $weight_report $staffid $date_return ORDER BY ENDATE,RP_SNO")->result_array();   
            }

        }
         
        //print_r($result);exit();
        save_query_in_log();
        $this->db->close();
        return $result;
    }



}

?>                   