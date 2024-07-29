<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/******************************************************************************************************
    Purpose : To handle all the Karuppattiparty_model database details 2024-02-01 by vasanth
*******************************************************************************************************/
class Karuppattiparty_model extends CI_Model
{
  function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Calcutta'); 
    }

    // public function get_party_list()
    // {
    //     $this->db->reconnect();
    //     // $result  = $this->db->query("SELECT * FROM PARTIES  ORDER BY PID DESC")->result_array();
    //     // $result  = $this->db->query("SELECT  top 2000 p.*,Z.ZONENAME,a.ZONE_SNO FROM PARTIES p left join AREA a  on a.AREANAME=p.AREA JOIN ZONE_MASTER Z ON A.ZONE_SNO=Z.SNO where PID like 'A005%' ORDER BY P.PID DESC")->result_array();
    //     save_query_in_log();
    //     $this->db->close();
    //     return $result;
    // }
    // SELECT [ZONENAME] FROM AREA A, ZONE_MASTER Z WHERE AREANAME='SKD - VVR NAGAR WEST' AND Z.SNO=A.ZONE_SNO
    
     // To get village list
    public function  get_area_by_zone_id($id)
    {
        $this->db->reconnect();
        $result  = $this->db->query("SELECT * FROM AREA WHERE ZONE_SNO='".$id."'")->result_array();
        // echo "SELECT * FROM AREA WHERE ZONE_SNO='".$id."'";
        // print_r($result);
        // exit();
        save_query_in_log();
        $this->db->close();
        return $result;   
    }
    public function  get_city_by_area_id($id)
    {
        $this->db->reconnect();
        $result  = $this->db->query("SELECT * FROM CITY c join AREA a on a.SNO=c.AREAID  where a.SNO='".$id."'")->result_array();
        // print_r($result);
        // exit();
        save_query_in_log();
        $this->db->close();
        return $result;   
    }
    public function  get_village_by_city_id($id)
    {
        $this->db->reconnect();
        $result  = $this->db->query("SELECT * FROM VILLAGE v join CITY c on c.CITYID=v.CITYID WHERE c.CITYID='".$id."'")->result_array();
        // echo "SELECT * FROM AREA WHERE ZONE_SNO='".$id."'";
        // print_r($result);
        // exit();
        save_query_in_log();
        $this->db->close();
        return $result;   
    }
    public function  get_street_by_village_id($id)
    {
        $this->db->reconnect();
        $result  = $this->db->query("SELECT * FROM STREET s join VILLAGE v on v.VILLAGEID=s.VILLAGEID WHERE v.VILLAGEID='".$id."'")->result_array();
        save_query_in_log();
        $this->db->close();
        return $result;   
    }
    // To add village
    public function party_save($data)
    {   
        $this->db->reconnect();
        $result  = $this->db->query("INSERT INTO PARTIES (PID, NAME, LASTNAME_PREFIX, FATHERSNAME, OTHER_NAME, MOTHER_NAME, DOORNO, ADDRESS1, ADDRESS2, CITY, LANDMARK, AREA, ZONE_SNO, PHONE, PHONE2, WHATSAPP,EMAIL, WORK_TYPE, AADHAAR_NO, ID_TYPE, ID_NUMBER, RATING, PHOTO, SIGNATURE, OTHER_PHOTO, MODIFIED_ON, TYPE_OF_RECORD, ZONE_ID, AREA_ID, CITY_ID, VILLAGE_ID, STREET_ID, PARTY_IMAGE, SIGNATURE_IMAGE, IDPROOF_IMAGE, CREATED_ON)VALUES ('".$data['party_id']."','".$data['party_name']."','".$data['prefix']."','".$data['lname']."','".$data['oname'] ."','".($data['mother_name']) ."','".$data['doorno']."','".$data['address']."','".$data['village']."','".$data['city']."','".$data['landmark'] ."','".$data['area'] ."','".$data['zone']."','".$data['mobile']."','".$data['phone2']."','".$data['w_no'] ."','".$data['email']."','".$data['worktype']."','".$data['aadhar'] ."','".$data['idtype']."','". $data['id_no']."','".$data['rating']."','".$data['party_photo']."','".$data['sign_photo']."','".$data['other_photo']."','".$data['modified_on']."','N', '".$data['zone']."','".$data['area']."','".$data['city']."','".$data['village']."','".$data['street']."','".$data['party_image']."','".$data['sign_image']."','".$data['id_image']."','".$data['modified_on']."')");
        save_query_in_log();
        $key_update=$this->db->query("UPDATE KEYMASTER SET KEYVALUE=KEYVALUE+1 WHERE KEYNAME LIKE 'PARTIES-".$_SESSION['LOANPREFIX']."'");
        save_query_in_log();
        $this->db->close(); 
        return $result;
    }
   
    
    
   
    
   
   

    public function get_party_by_party_id($pid)
    {
        $this->db->reconnect();
        $result  = $this->db->query("SELECT * FROM PARTIES WHERE PID = '".$pid."'")->row();
        save_query_in_log();
        $this->db->close();
        return $result;
    }
    public function get_party_by_shiping_id($party_id)
    {
        $this->db->reconnect();
        $result  = $this->db->query("SELECT * FROM AKS_SHIPPING_ADDRESS WHERE party_id = '".$party_id."'")->row();
        save_query_in_log();
        $this->db->close();
        return $result;
    }
    public function get_loans_by_party_id($pid)
    {
        $this->db->reconnect();
        $result  = $this->db->query("SELECT l.*,c.COMPANYNAME FROM LOANS l,COMPANY c WHERE l.PID = '".$pid."' and  l.COMPANYCODE=c.COMPANYCODE AND l.LOAN_STATUS !=0 order by l.ENDATE desc")->result_array();
        save_query_in_log();
        $this->db->close();
        return $result;
    }
    public function get_receipts_by_party_id($pid)
    {
        $this->db->reconnect();
        $result  = $this->db->query("SELECT c.COMPANYNAME,r.BILLNO,r.RECEIPT_DATE,r.CALC_PRINCIPAL, r.CALC_INTEREST, l.INTERESTTYPE,(r.MAINTAINCHARGE+r.NOTICECHARGE+r.FORMCHARGE)as CHARGES,r.HL_AMOUNT,r.PAIDAMOUNT from  RECEIPT_MASTER r, LOANS l, COMPANY c where l.BILLNO=r.BILLNO and l.COMPANYCODE=c.COMPANYCODE and l.PID='".$pid."' order by RECEIPT_DATE desc")->result_array();
        save_query_in_log();
        $this->db->close();
        return $result;
    }
    public function get_redemption_by_party_id($pid)
    {
        $this->db->reconnect();
        $result  = $this->db->query("SELECT r.RETURNDATE,l.LOAN_STATUS,c.COMPANYNAME,r.BILLNO,r.RETURNDATE,l.INTERESTTYPE,l.JEWEL_TYPE,COUNT(p.BILLNO) as no_of_item,l.AMOUNT,r.CLOSING_TYPE FROM  REDEMPTIONS r, LOANS l, COMPANY c, PLEDGEINFO p 
        WHERE l.BILLNO=r.BILLNO and l.COMPANYCODE=c.COMPANYCODE and p.BILLNO=r.BILLNO and l.PID='".$pid."' group by r.RETURNDATE,c.COMPANYNAME,r.BILLNO,r.RETURNDATE,l.INTERESTTYPE,l.JEWEL_TYPE,l.AMOUNT,r.CLOSING_TYPE,l.LOAN_STATUS ORDER BY r.RETURNDATE desc")->result_array();
        save_query_in_log();
        $this->db->close();
        return $result;
    }
    
    public function party_delete($uid)
    {
        $this->db->reconnect();
        $result  = $this->db->query("UPDATE PARTIES SET STATUS='N' WHERE PID = '".$uid."'");
        save_query_in_log();
        
        $this->db->close();
        return $result;
    }
    public function party_update($data)
    {
         if($data['party_image'] !="" && $data['party_photo'] =="")
        {
            $partyimage = isset($data['party_image']) ? $data['party_image'] : "";

        }
       

        if($data['sign_image'] !="" && $data['sign_photo'] =="")
        {
            $signimage = isset($data['sign_image']) ? $data['sign_image'] : "";

        }
        
        if($data['id_image'] !="" && $data['other_photo'] =="")
        {
            $otherimage = isset($data['id_image']) ? $data['id_image'] : "";

        }

        
        $result = $this->db->query("UPDATE PARTIES SET NAME='".strtoupper($data['party_name'])."',".
                "LASTNAME_PREFIX='".$data['prefix']."', FATHERSNAME='".strtoupper($data['lname'])."',".
                "OTHER_NAME='".strtoupper($data['oname'])."', MOTHER_NAME='".strtoupper($data['mother_name'])."',".
                "DOORNO='".$data['doorno']."', ADDRESS1='".strtoupper($data['address'])."',".
                "ADDRESS2='".strtoupper($data['village'])."', CITY='".strtoupper($data['city'])."',".
                "AREA='".strtoupper($data['area'])."', ZONE_SNO='".$data['zone']."',".
                "PHONE='".$data['mobile']."', PHONE2='".$data['phone2']."',".
                "WHATSAPP='".$data['w_no']."', AADHAAR_NO='".$data['aadhar']."',".
                "ID_TYPE='".$data['idtype']."', ID_NUMBER='".$data['id_no']."',".
                "LANDMARK='".$data['landmark']."', RATING='".$data['rating']."',".
                "WORK_TYPE='".$data['worktype']."', EMAIL='".$data['email']."' ,".
                "PHOTO='".$data['party_photo']."', SIGNATURE='".$data['sign_photo']."' ,".
                "OTHER_PHOTO='".$data['other_photo']."',PARTY_IMAGE='".$partyimage."',SIGNATURE_IMAGE='".$signimage."',IDPROOF_IMAGE='".$otherimage."',".
                "MODIFIED_ON='".$data['modified_on']."'".
                " WHERE PID='".$data['party_id']."'");
        save_query_in_log();
        $loan_update=$this->db->query("UPDATE LOANS SET NAME='".strtoupper($data['party_name'])."' WHERE PID='".$data['party_id']."'");
        
        save_query_in_log();
        return $result;
    }
    public function party_loan_summary($pid)
    {
        $this->db->reconnect();
      $result=$this->db->query("SELECT LOANS.*, R.SELLINGAMOUNT, R.SELLINGREMARKS, R.SELLINGTO FROM LOANS L INNER JOIN REDEMPTIONS R ON L.BILLNO=R.BILLNO WHERE LOANS.PID='".$pid."'")->result_array();
       save_query_in_log();
        $this->db->close();
        return $result; 
    
    // select LOANS.*, REDEMPTIONS.SELLINGAMOUNT, REDEMPTIONS.SELLINGREMARKS, REDEMPTIONS.SELLINGTO
   // from [BANKERS].[dbo].[LOANS] inner join [BANKERS].[dbo].[redemptions] on LOANS.BILLNO=REDEMPTIONS.BILLNO
    }
    public function getStreet($search)
    {
        $this->db->reconnect();
        $query = $this->db->query("select s.* from temp_street s  where s.STREETNAME like '".'%'.$search.'%'."'  ");
        // $query = $this->db->query("select s.* from STREET s, VILLAGE v where s.VILLAGEID=v.VILLAGEID and v.VILLAGEID=".$vid." and s.STREETNAME like '".'%'.$search.'%'."'  ");
    
        $result = $query->result();
        return $result;
    }
     public function getpincode($search)
    {
        $this->db->reconnect();
        $query = $this->db->query("SELECT TOP 25 PINCODE FROM PARTIES WHERE PINCODE LIKE '".'%'.$search.'%'."' GROUP BY PINCODE ");
    
        $result = $query->result();
        return $result;
    }
    public function getcitytown($search)
    {
        $this->db->reconnect();
        $query = $this->db->query("SELECT TOP 25 CITY FROM PARTIES WHERE CITY LIKE '".'%'.$search.'%'."' GROUP BY CITY ");    
        $result = $query->result();
        return $result;
    }
     // ****************************************************JEWEL***************************************************// 
    public function get_jewel_by_party_id($pid)
    {
        $this->db->reconnect();
        $result  = $this->db->query("SELECT * FROM salesentry WHERE party_id = '".$pid."' order by created_on desc")->result_array();
        save_query_in_log();
        $this->db->close();
        return $result;
    }
    // ****************************************************RATTING HISTORY***************************************************// 
    public function get_rating_by_party_id($pid)
    {
        $this->db->reconnect();
        $result  = $this->db->query("SELECT c.*,p.NAME FROM CUSTOMER_RATING_HISTORY c,PARTIES p WHERE c.PID = '".$pid."' and c.PID=p.PID order by c.LOG_DATE desc")->result_array();
        save_query_in_log();
        $this->db->close();
        return $result;
    }
    // ****************************************************MEMBERSHIP VIEW***************************************************// 
    public function get_membership_by_party_id($pid)
    {
        $this->db->reconnect();
        $result  = $this->db->query("SELECT c.*,p.NAME FROM MEMBERSHIP_HISTORY c,PARTIES p WHERE c.PID = '".$pid."' and c.PID=p.PID order by c.LOG_DATE desc")->result_array();
        save_query_in_log();
        $this->db->close();
        return $result;
    }
    // ****************************************************Karupatti***************************************************// 
    public function party_aksale_list_view($pid)
    {
        $this->db->reconnect();
        $result  = $this->db->query("SELECT * FROM AKS_SALE_ENTRY WHERE id_party= '".$pid."' ORDER BY sale_id DESC")->result_array();
        save_query_in_log();
        $this->db->close();
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





    //  ************************************************Chit********************************************************//
    public function get_chit_trans($pid)
    {
        $this->db->reconnect();
        // print_r("SELECT PARTIES.NAME, CHIT_TRANSACTION.trans_date ,
        // CHIT_TRANSACTION.created_by , CHIT_TRANSACTION.transaction_type ,
        // CHIT_TRANSACTION.scheme_type , CHIT_TRANSACTION.opening_amount ,
        // CHIT_TRANSACTION.processing_amount , CHIT_TRANSACTION.closing_balance ,
        // CHIT_TRANSACTION.party_id
        // FROM PARTIES
        // INNER JOIN CHIT_TRANSACTION ON PARTIES.PID = CHIT_TRANSACTION.party_id 
        // WHERE CHIT_TRANSACTION.party_id = '".$pid."' ");exit;
        $result  = $this->db->query("SELECT PARTIES.NAME, CHIT_TRANSACTION.trans_date ,
                                    CHIT_TRANSACTION.created_by,CHIT_TRANSACTION.transaction_type ,
                                    CHIT_TRANSACTION.scheme_type,CHIT_TRANSACTION.opening_amount ,
                                    CHIT_TRANSACTION.processing_amount,CHIT_TRANSACTION.closing_balance,
                                    CHIT_TRANSACTION.party_id , CHIT_TRANSACTION.amt_paid ,
                                    CHIT_TRANSACTION.per_gram,
                                    CHIT_TRANSACTION.scheme_id 
                                    FROM PARTIES
                                    INNER JOIN CHIT_TRANSACTION ON PARTIES.PID = CHIT_TRANSACTION.party_id 
                                    WHERE CHIT_TRANSACTION.party_id = '".$pid."' ORDER BY CHIT_TRANSACTION.sno DESC ")->result_array();

        save_query_in_log();
        $this->db->close();
        return $result;
    }

 /*babu*/

public function partyupdate($partyPIDval,$mergepartyID,$mergeremarks)
    {
        $this->db->reconnect();
        $result  = $this->db->query("UPDATE PARTIES set MERGE_PID='".$partyPIDval."',MERGE_STATUS='1',MERGE_REASONS='".$mergeremarks."' where PID='".$mergepartyID."'");
        save_query_in_log();
        $this->db->close();
        return $result;
    }

public function checkmergedetails($PID)
    {
        $this->db->reconnect();
        $result  = $this->db->query("SELECT * FROM PARTIES where PID='".$PID."' AND MERGE_STATUS='1' AND MERGE_PID!='".$PID."'")->result();

        /*print_r("SELECT * FROM PARTIES where PID='".$PID."' AND MERGE_STATUS='1' AND MERGE_PID!=NULL");exit;*/
        save_query_in_log();
        $this->db->close();
        return $result;
    }

    public function getpartydata($search)
    {
        $this->db->reconnect();
        $query = $this->db->query("SELECT * from PARTIES where NAME like '".$search.'%'."'");

        

      
        $result = $query->result();
        return $result;
    }
    
    public function gettwopartydata($partytwoID){
         $this->db->reconnect();
       $query = $this->db->query("SELECT a.*,b.VILLAGENAME,d.CITYNAME,e.STREETNAME,f.AREANAME,g.* from PARTIES a left join VILLAGE b on b.VILLAGEID =a.VILLAGE_ID
        left join STATE c on c.STATE_ID = a.STATE
        left join CITY d on d.CITYID = a.CITY_ID
        left join STREET e on e.STREETID = a.STREET_ID
        left join AREA f on f.SNO = a.AREA_ID
        left join LOANS g on g.PID = a.PID where g.PID='".$partytwoID."'");
        $result = $query->result();
        return $result;

    }
     public function getpartyname($BILLNO)
    {
        $this->db->reconnect();
        $query = $this->db->query("SELECT * FROM LOANS where BILLNO='".$BILLNO."'");
        $result = $query->result();
        return $result;

    }
    public function checkloandata($PID)
    {
        $this->db->reconnect();
        $query = $this->db->query("SELECT * FROM LOANS where PID='".$PID."'");
        $result = $query->result();
        return $result;

    }
     
    public function getonepartydata($partyIDone){
        $this->db->reconnect();
        $query = $this->db->query("SELECT a.*,b.VILLAGENAME,d.CITYNAME,e.STREETNAME,f.AREANAME,g.* from PARTIES a left join VILLAGE b on b.VILLAGEID =a.VILLAGE_ID
        left join STATE c on c.STATE_ID = a.STATE
        left join CITY d on d.CITYID = a.CITY_ID
        left join STREET e on e.STREETID = a.STREET_ID
        left join AREA f on f.SNO = a.AREA_ID
        left join LOANS g on g.PID = a.PID where g.PID='".$partyIDone."'");

        $result = $query->result();
        return $result;
    }
    public function checkpartymegestatus($PID)
    {
        $this->db->reconnect();
        $result  = $this->db->query("SELECT * FROM PARTIES where MERGE_PID='".$PID."'")->result();
        save_query_in_log();
        $this->db->close();
        return $result;
    }
    public function getpledgedata($PID)
    {
        $this->db->reconnect();
        $query = $this->db->query("SELECT count(a.BILLNO) as itemcount,a.BILLNO,sum(b.NETWEIGHT) as totnetwight,a.DESCRIPTION,a.IS_DAMAGE,a.PURITY_PERCENT,b.LESS,a.STONEWEIGHT,a.PURITY,a.QTY,sum(a.WEIGHT) as totweight,b.COMPANYCODE,c.COMPANYNAME,b.PID FROM PLEDGEINFO a
        join LOANS b on b.BILLNO = a.BILLNO
        left join COMPANY c on c.COMPANYCODE = b.COMPANYCODE
        where b.PID='".$PID."' group by a.DESCRIPTION,a.IS_DAMAGE,a.PURITY_PERCENT,b.LESS,a.STONEWEIGHT,a.PURITY,a.QTY,a.BILLNO,b.NETWEIGHT,b.COMPANYCODE,c.COMPANYNAME,b.PID");
        $result = $query->result_array();
        return $result;
    }
      public function getviewpledgedata($bill_no)
    {
        $this->db->reconnect();
        $query = $this->db->query("SELECT count(a.BILLNO) as itemcount,a.BILLNO,sum(b.NETWEIGHT) as totnetwight,a.DESCRIPTION,a.IS_DAMAGE,a.PURITY_PERCENT,b.LESS,a.STONEWEIGHT,a.PURITY,a.QTY,sum(a.WEIGHT) as totweight,b.COMPANYCODE,c.COMPANYNAME,b.PID FROM PLEDGEINFO a
        join LOANS b on b.BILLNO = a.BILLNO
        left join COMPANY c on c.COMPANYCODE = b.COMPANYCODE
        where a.BILLNO='".$bill_no."' group by a.DESCRIPTION,a.IS_DAMAGE,a.PURITY_PERCENT,b.LESS,a.STONEWEIGHT,a.PURITY,a.QTY,a.BILLNO,b.NETWEIGHT,b.COMPANYCODE,c.COMPANYNAME,b.PID");
        $result = $query->result_array();
        return $result;
    }

    /*babu*/
}
?>