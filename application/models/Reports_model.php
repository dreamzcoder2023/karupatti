<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/***************************************************************
    Purpose : To handle all the Area database details 2022-08-22
****************************************************************/
class Reports_model extends CI_Model 
{
  public $other_db;
 
    function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Calcutta'); 
       
    }
    /*public function getallagentsdata()
    {
      $this->other_db->reconnect();
      $result  = $this->other_db->query("SELECT LEDGER_NAME,GROUP_NAME,LEDGER_SNO,COMPANYCODE FROM ACC_LEDGERS where GROUP_NAME='RE_AGENT'")->result_array();
      save_query_in_log();
      $this->other_db->close();
      return $result;   
    }*/
    public function get_fin_years_list()
    {
        $this->db->reconnect();
        $result  = $this->db->query("SELECT TOP 1 * FROM FIN_YEARS  WHERE STATUS='Y' ORDER BY ID DESC")->row();
        save_query_in_log();
        $this->db->close();
        return $result;
    }
    public function getallagentsdata()
    {
      $this->other_db->reconnect();
      $result  = $this->db->query("SELECT agent_name FROM realestate_agents group by agent_name ")->result_array();
      save_query_in_log();
      $this->other_db->close();
      return $result;   
    }
    public function getchittotsumofamt()
    {
       $this->other_db->reconnect();
       $result  = $this->db->query("SELECT * FROM CHIT_MASTER")->result_array();
       save_query_in_log();
       $this->other_db->close();
       return $result;   
    }
    public function getchittransactionsvalue()
    {
       $this->other_db->reconnect();
       $result  = $this->db->query("SELECT a.*,b.*,c.*,d.* FROM CHIT_TRANSACTION a 
        left join PARTIES b on b.PID =a.party_id
        left join CHIT_LIST c on c.party_id =a.party_id 
        left join payment_inward_outward d on d.bill_no = a.scheme_id")->result_array();
       save_query_in_log();
       $this->other_db->close();
       return $result;  

    }
    public function getagent_totnumamount_list($fdate,$tdate)
    {
        $this->db->reconnect();
        // $fdate $tdate
        $result  = $this->db->query("SELECT 
                                    a.property_id AS ag_prop, a.agent_name, a.amount AS agent_amt_give, a.Refname AS ag_ref, a.agent_id AS agent_id_main,
                                    b.property_id AS pur_prop, b.date AS pur_date, b.ploat_no AS pur_plno, b.ploat_type AS pur_type,
                                    b.total_property_amount AS pur_tot_amt, b.land_name AS pur_land_name, b.party_id AS pur_party,b.id AS pur_id,b.property_status AS pur_status,

                                    c.property_id AS sale_prop, c.date AS sale_date, c.ploat_no AS sale_plno, c.ploat_type AS sale_type,
                                    c.total_property_amount AS sale_tot_amt, c.land_name AS sale_land_name, c.party_id AS sale_party,c.id As sale_id,

                                    p.NAME AS pur_party_name,p.RATING AS pur_party_rat,pa.NAME AS sale_party_name,pa.RATING AS sale_party_rat

                                    FROM realestate_agents a  
                                    LEFT JOIN realestate_purchase b ON b.property_id = a.property_id 
                                    LEFT JOIN realestate_sale c ON c.sale_id = a.property_id 
                                    LEFT JOIN PARTIES p ON b.party_id = p.PID 
                                    LEFT JOIN PARTIES pa ON c.party_id = pa.PID 
                                    WHERE a.agent_id != '' AND a.property_id != '' 
                                    ORDER BY a.id DESC" )->result_array();

        // print_r($fdate);
         // exit;
        save_query_in_log();
        $this->db->close();
        return $result;
    }
    public function getfilteragent_totnumamount_list($dt_fill,$angetname,$sdate,$edate,$sodr)
    {
      $this->db->reconnect();
      //print_r($angetname);exit;
      if($angetname=="ALL" || $dt_fill=='ALL')
      { 
          $result  = $this->db->query("SELECT a.*,b.* FROM realestate_purchase a left join realestate_agents b on b.property_id = a.property_id ")->result_array();
      }
      else if($angetname!="ALL" || $dt_fill=='ALL'){
          $result  = $this->db->query("SELECT a.*,b.* FROM realestate_purchase a left join realestate_agents b on b.property_id = a.property_id where b.agent_name LIKE '".'%'.$angetname.'%'."'")->result_array();
      }
      else if($angetname!="ALL" || $sdate!="" || $edate!=""  || $sodr!="")
      {
          $result = $this->db->query("SELECT a.*,b.* FROM realestate_purchase a left join realestate_agents b on b.property_id = a.property_id where b.agent_name LIKE '".'%'.$angetname.'%'."' AND  $sdate $edate $sodr")->result_array();
      }
      else
      {
          $result  = $this->db->query("SELECT a.*,b.* FROM realestate_purchase a left join realestate_agents b on b.property_id = a.property_id ")->result_array();
      }
      
      save_query_in_log();
      $this->db->close();
      return $result;
    }
    //  public function get_chit_all_transaction_list($party_fil,$tdate,$fdate,$scheme_sel,$sta_sel,$chit_id_fill)
    // {
    //     $this->db->reconnect();
    //     $result  = $this->db->query("SELECT * FROM ( SELECT PARTIES.NAME, PARTIES.RATING, PARTIES.PID, PARTIES.MEMBERSHIP_POINTS, 
    //     CHIT_TRANSACTION.sno, CHIT_TRANSACTION.party_id, CHIT_TRANSACTION.trans_date,CHIT_TRANSACTION.scheme_type, 
    //     CHIT_TRANSACTION.scheme_id, CHIT_TRANSACTION.transaction_type, CHIT_TRANSACTION.opening_amount, 
    //     CHIT_TRANSACTION.processing_amount, CHIT_TRANSACTION.closing_balance, CHIT_TRANSACTION.amt_paid, CHIT_TRANSACTION.payment_id,
    //     CHIT_TRANSACTION.type, CHIT_LIST.chit_id, ROW_NUMBER() OVER ( ORDER BY CHIT_TRANSACTION.sno DESC ) AS sl FROM PARTIES
    //     INNER JOIN CHIT_TRANSACTION 
    //     ON PARTIES.PID = CHIT_TRANSACTION.party_id 
    //     INNER JOIN CHIT_LIST 
    //     ON CHIT_LIST.scheme_id = CHIT_TRANSACTION.scheme_id
    //     WHERE CHIT_TRANSACTION.status = 'Y' $party_fil $fdate $tdate $scheme_sel $sta_sel $chit_id_fill)N WHERE sl BETWEEN $offset AND $page_limit ORDER BY N.sno DESC")->result_array();
    //     save_query_in_log();
    //     $this->db->close();
    //     return $result;
    // }
    public function getallsupplierdata($sdate,$edate,$adv_amt,$balance_ck,$purchase_ck,$suppiler_name)
    {


        $result = $this->db->query("SELECT                                       
                                            a.pur_id,                                           
                                            a.pur_sup,
                                            a.prd_count,
                                            SUM(a.pur_cash)    AS advanceamt,
                                            SUM(a.prd_tot_amt) AS prototalamt,
                                            SUM(a.balance_cash)AS purdisamt,
                                            a.pur_date,
                                            SUM(a.pur_net_amt) AS purnetamt 

                                        FROM 
                                            AKS_PURCHASE_ENTRY a 
                                        WHERE 
                                            a.status='Y' $sdate $edate $adv_amt $balance_ck $purchase_ck $suppiler_name
                                        GROUP BY 
                                            a.pur_id, 
                                            a.pur_date, 
                                            a.pur_sup, 
                                            a.prd_count 
                                        ORDER BY 
                                            a.pur_id DESC")->result_array();
            save_query_in_log();
            $this->db->close();
            return $result;


       

         
       
    }
    public function getmulproductname($ID)
    {
        $this->db->reconnect();
        $result  = $this->db->query("SELECT a.price,a.product_wgt,b.AKS_PRD_NAME FROM AKS_PURCHASE_CART a 
          left join AKS_PRD_MASTER b on b.AKS_PRD_MID = a.product_id
        left join AKS_PURCHASE_ENTRY c on c.pur_id=a.pur_id where a.pur_id='".$ID."' AND a.status=0
        group by c.pur_id,a.id,a.product_id,c.pur_date,a.product_wgt,a.pur_price,a.price,b.AKS_PRD_NAME")->result_array();
        save_query_in_log();
        $this->db->close();
        return $result;
    }
    public function get_suppliername_list()
    {
       

        $this->other_db->reconnect();
       $result  = $this->db->query("SELECT * FROM ACC_LEDGERS WHERE GROUP_NAME='Karupatti' AND Status!='D' ORDER BY ADDED_TIME DESC")->result_array();
       save_query_in_log();
       $this->other_db->close();
       return $result;  



    }
    public function getnoticeissuereports($currentdate,$companyname,$noticetype,$schemetype,$jeweltype,$zoneval,$areaval,$cityval,$monthly_date_fillter,$from_date_fillter,$to_date_fillter,$villageval,$streetval,$finalfromdate,$finaltodate)
    { 

     //print_r($companyname);exit;

      if($companyname=='ALL' && $schemetype=='ALL' && $jeweltype=='ALL')
      { 

          $this->db->reconnect();
          $result  = $this->db->query("SELECT a.*,b.*,c.*,d.*,e.* FROM LOANS a 
          left join COMPANY b on b.COMPANYCODE=a.COMPANYCODE 
          left join PARTIES c on c.PID=a.PID 
          left join INTERESTLIST d on d.INTNAME =a.INTERESTTYPE
          left join RECEIPT_MASTER e on e.BILLNO =a.BILLNO  where a.ACTIVE!='N'")->result_array();
          save_query_in_log();
          $this->db->close();


          return $result;
      }
      else
      { 
        //print_r('else');exit;
          /*if($schemetype!='ALL'){
            //print_r('28');exit;
      $this->db->reconnect();
                $result  = $this->db->query("SELECT a.*,b.*,c.*,d.*,e.* FROM LOANS a 
                left join COMPANY b on b.COMPANYCODE=a.COMPANYCODE 
                left join PARTIES c on c.PID=a.PID 
                left join INTERESTLIST d on d.INTNAME =a.INTERESTTYPE
                left join RECEIPT_MASTER e on e.BILLNO =a.BILLNO  where a.ACTIVE!='N'  AND d.INTNAME='".$schemetype."'")->result_array();
                save_query_in_log();
                $this->db->close();

          }
          else if($jeweltype!="ALL")
          {
            // print_r('2824');exit;
                $this->db->reconnect();
                $result  = $this->db->query("SELECT a.*,b.*,c.*,d.*,e.* FROM LOANS a 
                left join COMPANY b on b.COMPANYCODE=a.COMPANYCODE 
                left join PARTIES c on c.PID=a.PID 
                left join INTERESTLIST d on d.INTNAME =a.INTERESTTYPE
                left join RECEIPT_MASTER e on e.BILLNO =a.BILLNO  where a.ACTIVE!='N'  AND a.JEWEL_TYPE='".$jeweltype."'")->result_array();
                save_query_in_log();
                $this->db->close();

          }
          else if($companyname!='ALL')
          {
             //print_r('282428');exit;
 
             $this->db->reconnect();
                $result  = $this->db->query("SELECT a.*,b.*,c.*,d.*,e.* FROM LOANS a 
                left join COMPANY b on b.COMPANYCODE=a.COMPANYCODE 
                left join PARTIES c on c.PID=a.PID 
                left join INTERESTLIST d on d.INTNAME =a.INTERESTTYPE
                left join RECEIPT_MASTER e on e.BILLNO =a.BILLNO  where a.ACTIVE!='N' AND a.COMPANYCODE='".$companyname."'")->result_array();
                save_query_in_log();
                $this->db->close();
          }
          else{
         // print_r('28242824');exit;
           $this->db->reconnect();
                $result  = $this->db->query("SELECT a.*,b.*,c.*,d.*,e.* FROM LOANS a 
                left join COMPANY b on b.COMPANYCODE=a.COMPANYCODE 
                left join PARTIES c on c.PID=a.PID 
                left join INTERESTLIST d on d.INTNAME =a.INTERESTTYPE
                left join RECEIPT_MASTER e on e.BILLNO =a.BILLNO  where a.ACTIVE!='N'")->result_array();
                save_query_in_log();
                $this->db->close();

          }*/
          $this->db->reconnect();
                $result  = $this->db->query("SELECT a.*,b.*,c.*,d.*,e.* FROM LOANS a 
                 join COMPANY b on b.COMPANYCODE=a.COMPANYCODE 
                 join PARTIES c on c.PID=a.PID 
                 join INTERESTLIST d on d.INTNAME =a.INTERESTTYPE
                 join RECEIPT_MASTER e on e.BILLNO =a.BILLNO  where a.ACTIVE!='N'")->result_array();
                save_query_in_log();
                $this->db->close();
          /*print_r("SELECT a.*,b.*,c.*,d.*,e.* FROM LOANS a 
                 join COMPANY b on b.COMPANYCODE=a.COMPANYCODE 
                 join PARTIES c on c.PID=a.PID 
                 join INTERESTLIST d on d.INTNAME =a.INTERESTTYPE
                 join RECEIPT_MASTER e on e.BILLNO =a.BILLNO  where a.ACTIVE!='N'");exit;*/

          return $result;
      }
    }
    public function getexpiredloan()
    {
        $currentdate = date('Y-m-d');
        $this->db->reconnect();
        $result  = $this->db->query("SELECT a.*,b.*,c.*,d.*,e.* FROM LOANS a 
         join COMPANY b on b.COMPANYCODE=a.COMPANYCODE 
         join PARTIES c on c.PID=a.PID 
         join INTERESTLIST d on d.INTNAME =a.INTERESTTYPE
         join RECEIPT_MASTER e on e.BILLNO =a.BILLNO where a.ENDATE < '".$currentdate."' AND a.ACTIVE!='N'")->result_array();
        save_query_in_log();
        $this->db->close();
         return $result;
    }
    public function getodloan(){

        $currentdate = date('Y-m-d');
        $this->db->reconnect();
        $result  = $this->db->query("SELECT a.*,b.*,c.*,d.*,e.* FROM LOANS a 
         join COMPANY b on b.COMPANYCODE=a.COMPANYCODE 
         join PARTIES c on c.PID=a.PID 
         join INTERESTLIST d on d.INTNAME =a.INTERESTTYPE
         join RECEIPT_MASTER e on e.BILLNO =a.BILLNO where a.ENDATE < '".$currentdate."' AND a.ACTIVE!='N'")->result_array();
        save_query_in_log();
        $this->db->close();
         return $result;
    }
    public function getoutstandingloandetails()
    {
        $currentdate = date('Y-m-d');
        $this->db->reconnect();
        $result  = $this->db->query("SELECT a.*,b.*,c.*,d.*,e.* FROM LOANS a 
         join COMPANY b on b.COMPANYCODE=a.COMPANYCODE 
         join PARTIES c on c.PID=a.PID 
         join INTERESTLIST d on d.INTNAME =a.INTERESTTYPE
         join RECEIPT_MASTER e on e.BILLNO =a.BILLNO where  a.ACTIVE!='N'")->result_array();
        save_query_in_log();
        $this->db->close();
         return $result;

    }
    public function getcompanyvalue()
    {
        $this->db->reconnect();
        $result  = $this->db->query("SELECT * FROM COMPANY")->result_array();
        save_query_in_log();
        $this->db->close();
        return $result;
    }
    public function getzonevalue(){

      $this->db->reconnect();
        $result  = $this->db->query("SELECT * FROM ZONE_MASTER")->result_array();
        save_query_in_log();
        $this->db->close();
        return $result;

    }
    public function getareaname(){
       $this->db->reconnect();
        $result  = $this->db->query("SELECT * FROM AREA")->result_array();
        save_query_in_log();
        $this->db->close();
        return $result;

    }
    public function getcityname()
    {
        $this->db->reconnect();
        $result  = $this->db->query("SELECT * FROM CITY")->result_array();
        save_query_in_log();
        $this->db->close();
        return $result;
    }
    public function getvillagename()
    {
        $this->db->reconnect();
        $result  = $this->db->query("SELECT * FROM VILLAGE")->result_array();
        save_query_in_log();
        $this->db->close();
        return $result;

    }
    public function getstreetname()
    {
        $this->db->reconnect();
        $result  = $this->db->query("SELECT * FROM STREET")->result_array();
        save_query_in_log();
        $this->db->close();
        return $result;

    }
    public function getintresttype(){

        $this->db->reconnect();
        $result  = $this->db->query("SELECT * FROM INTERESTLIST")->result_array();
        save_query_in_log();
        $this->db->close();
        return $result;
    }
    public function getnontaggedsalesdetails()
    {
        $this->db->reconnect();
        $result  = $this->db->query("SELECT a.*,b.* FROM salesentry_detail a
            join COMPANY b on b.COMPANYCODE =a.item_name WHERE a.sale_item_tag='Non tag'")->result_array();
         save_query_in_log();
        $this->db->close();
        return $result;
    }
    public function get_purc_list($pid)
    {
        $this->db->reconnect();
        $result  = $this->db->query("SELECT * FROM AKS_PURCHASE_ENTRY WHERE pur_id= '".$pid."'")->result_array();
        save_query_in_log();
        $this->db->close();
        return $result;
    }
    public function get_cart_view($pid){
       $this->db->reconnect();
        $result  = $this->db->query("SELECT * FROM AKS_PURCHASE_CART WHERE pur_id = '".$pid."' AND status=0")->result_array();
        // print_r($result);
        // $id = $this->input->post('id');
        // $cname = $this->input->post('cname');
        save_query_in_log();
        $this->db->close();
      
        return $result;

    }
}
?>