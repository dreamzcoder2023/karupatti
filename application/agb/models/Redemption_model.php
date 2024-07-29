<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/***************************************************************
    Purpose : To handle all the Village database details 2022-08-19
****************************************************************/
class Redemption_model extends CI_Model
{
    public $other_db;
  function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Calcutta'); 
    }
    public function get_redemption_list()
    {
        $this->other_db->reconnect();
         $result  = $this->db->query("SELECT TOP 2000 REDEMPTIONS.*,LOANS.NAME AS CNAME,LOANS.COMPANYCODE,PARTIES.RATING,LOANS.JEWEL_TYPE,LOANS.AMOUNT,LOANS.INTERESTTYPE FROM REDEMPTIONS, LOANS, PARTIES WHERE LOANS.COMPANYCODE='".$_SESSION['COMPANYCODE']."' AND REDEMPTIONS.BILLNO=LOANS.BILLNO and PARTIES.PID=LOANS.PID and PARTIES.PID=REDEMPTIONS.PID ORDER BY RETURNDATE DESC")->result_array();
        // $result  = $this->db->query("SELECT REDEMPTIONS.*,LOANS.NAME AS CNAME,LOANS.COMPANYCODE FROM REDEMPTIONS, LOANS WHERE LOANS.COMPANYCODE='".$_SESSION['COMPANYCODE']."' AND REDEMPTIONS.BILLNO=LOANS.BILLNO AND RETURNDATE>='".$data['from']."'  AND RETURNDATE<= '".$data['to']."' ".$data['cond']. " ORDER BY RETURNDATE DESC")->result_array();
        save_query_in_log();
        $this->db->close();
        // print_r($result);
        return $result;
    }  
    public function getLoan($search)
      {
        // echo "SELECT l.BILLNO,c.COMPANYNAME,l.LOAN_TYPE,l.ENDATE,l.AMOUNT, i.PERIOD, l.INTERESTTYPE,l.WEIGHT,l.STONELESS,l.LESS,l.NETWEIGHT, l.MONTHS,l.LOANDAYS,l.ITEM_PHOTO,l.NOMINEE,l.RELATION,l.NOMINEE_ID,l.LOAN_STATUS, p.PID, p.NAME,p.ADDRESS1,p.ADDRESS2,p.PHONE,p.CITY,p.MEMBERSHIP_ID,p.MEMBERSHIP_POINTS,p.RATING,p.PHOTO,p.OTHER_PHOTO from LOANS l, PARTIES p, COMPANY c, INTERESTLIST i WHERE l.PID=p.PID and i.INTNAME=l.INTERESTTYPE and l.COMPANYCODE=c.COMPANYCODE and l.LOAN_STATUS>=1 and l.ACTIVE='Y' and (l.CLOSING_STATUS IS NULL or l.CLOSING_STATUS='') and ( l.CLOSEDATE IS NULL or  l.CLOSEDATE ='' )  and  l.BILLNO LIKE '".$search.'%'."' ";
         $query = $this->db->query("SELECT B.*,V.*,D.*,l.BILLNO,c.COMPANYNAME,l.LOAN_TYPE,l.ENDATE,l.AMOUNT, i.PERIOD, l.INTERESTTYPE,l.WEIGHT,l.STONELESS,l.LESS,l.NETWEIGHT, l.MONTHS,l.LOANDAYS,l.ITEM_PHOTO,l.NOMINEE,l.RELATION,l.NOMINEE_ID,l.LOAN_STATUS, p.PID, p.NAME,p.ADDRESS1,p.ADDRESS2,p.PHONE,p.CITY,p.MEMBERSHIP_ID,p.MEMBERSHIP_POINTS,p.RATING,p.PHOTO,p.OTHER_PHOTO from LOANS l, PARTIES p LEFT JOIN STREET B ON p.STREET_ID=B.STREETID
         LEFT JOIN VILLAGE V
        ON p.VILLAGE_ID=V.VILLAGEID LEFT JOIN CITY D ON p.CITY_ID=D.CITYID ,COMPANY c,INTERESTLIST i WHERE l.PID=p.PID and i.INTNAME=l.INTERESTTYPE and l.COMPANYCODE=c.COMPANYCODE and l.LOAN_STATUS>=1 and l.ACTIVE='Y' and ( l.CLOSEDATE IS NULL or  l.CLOSEDATE ='' )  and  l.BILLNO LIKE '".$search.'%'."' ");
        
        $result = $query->result();
        return $result;
      } 
      public function insert_pay_to_party($data)
    {
         $this->db->reconnect();
       
        $result  = $this->db->query("INSERT INTO payment_inward_outward(module_name, type_of_payment, amount, party_bank, cheque_ref_no, company_bank, remarks, bill_no, party_id, payment_side, metal_type, quality, purity, weight, pure_metal_weight,  created_by, created_on, record_status) VALUES('".$data['module_name']."','".$data['type']."','".$data['amt']."','".$data['p_bank']."','".$data['ref_no']."','".$data['c_bank']."','".$data['det']."','".$data['billno']."','".$data['pid']."','DR','','','','0.00','0.00','".$data['created_by']."','".$data['created_on']."','0')");

        save_query_in_log();
        $this->db->close();
        return $result;  
    }
    public function insert_party_payment($data)
    {
         $this->db->reconnect();
       
        $result  = $this->db->query("INSERT INTO payment_inward_outward(module_name, type_of_payment, amount, party_bank, cheque_ref_no, company_bank, remarks, bill_no, party_id, payment_side, metal_type, quality, purity, weight, pure_metal_weight,  created_by, created_on, record_status) VALUES('".$data['module_name']."','".$data['type']."','".$data['amt']."','".$data['p_bank']."','".$data['ref_no']."','".$data['c_bank']."','".$data['det']."','".$data['billno']."','".$data['pid']."','CR','','','','0.00','0.00','".$data['created_by']."','".$data['created_on']."','0')");

        save_query_in_log();
        $this->db->close();
        return $result;  
    }
    public function  get_pledge_list($search)
    {   
        $query = $this->db->query("SELECT * from ITEMS where ITEMNAME LIKE '".'%'.$search.'%'."' ORDER BY ITEMNAME ASC ");
        $result = $query->result();
        return $result;
    }
    public function insert_receive_from_party($data)
    {
         $this->db->reconnect();
        // $result  = $this->db->query("INSERT INTO party_payment_receive(type_of_payment, amount, party_bank, cheque_ref_no, company_bank, remarks, bill_no, party_id, created_by, created_on) VALUES('".$data['type']."','".$data['amt']."','".$data['p_bank']."','".$data['ref_no']."','".$data['c_bank']."','".$data['det']."','".$data['billno']."','".$data['pid']."','".$data['created_by']."','".$data['created_on']."')");
         $result  = $this->db->query("INSERT INTO payment_inward_outward(module_name, type_of_payment, amount, party_bank, cheque_ref_no, company_bank, remarks, bill_no, party_id, payment_side, metal_type, quality, purity, weight, pure_metal_weight,  created_by, created_on, record_status) VALUES('Redemption - Multi Jewel - Receive','".$data['type']."','".$data['amt']."','".$data['p_bank']."','".$data['ref_no']."','".$data['c_bank']."','".$data['det']."','".$data['billno']."','".$data['pid']."','CR','','','','0.00','0.00','".$data['created_by']."','".$data['created_on']."','0')");
        save_query_in_log();
        $this->db->close();
        return $result;  
    }
          
}

?>                        
