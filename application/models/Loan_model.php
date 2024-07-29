<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/***************************************************************
    Purpose : To handle all the Loan database details 2022-08-19
****************************************************************/
class Loan_model extends CI_Model
{
  function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Calcutta'); 
    }
    public function get_fin_years_list()
    {
        $this->db->reconnect();
        $result  = $this->db->query("SELECT TOP 1 * FROM FIN_YEARS  WHERE STATUS='Y' ORDER BY ID DESC")->row();
        save_query_in_log();
        $this->db->close();
        return $result;
    }
    public function get_member_points($loan_amt)
    {
        // $loan_amt=$this->input->post('ln_amt');
        // $mem_chg=$this->db->query("SELECT * FROM process_based_member_points WHERE from_amount<=".$loan_amt." AND to_amount>=".$loan_amt)->row();
        $mem_chg=$this->db->query("select * from MEMBERSHIP_POINTS_UPDATE where TYPE='New Loan'")->row();

        if(isset($mem_chg))
        {
            $val=$loan_amt/$mem_chg->FOR_AMOUNT;
            $points_earned=$val*$mem_chg->POINTS;
            // return $mem_chg->member_points;
            return $points_earned;
        }
        else
        {
          return 0;
        }
    }
    public function get_acc_ledger_list()
    {
        $this->other_db->reconnect();

        $result  = $this->other_db->query("SELECT * FROM ACC_LEDGERS WHERE SUBSTRING(LTRIM(LEDGER_SNO),1,6)='BRANCH' AND COMPANYCODE='".$_SESSION['COMPANYCODE']."' ORDER BY LEDGER_NAME")->result_array();
        save_query_in_log();
        $this->other_db->close();
        return $result;
    }
    public function get_loan_list($fdate,$tdate,$comp,$status,$page_limit,$offset)
    {
        $this->db->reconnect();
        // $result  = $this->db->query("select * from LOANS WHERE PID!='' $fdate $tdate")->result_array();
        // $result  = $this->db->query("SELECT (P.ADDRESS1 + ',' + P.ADDRESS2) AS ADDRESS,P.RATING, L.* FROM LOANS L INNER JOIN PARTIES P ON P.PID=L.PID WHERE L.LOAN_STATUS!=0 AND L.PID!='' $fdate $tdate $comp $status ORDER BY L.ENDATE DESC")->result_array();
        $result  = $this->db->query("SELECT  * FROM ( SELECT (P.ADDRESS1 + ',' + P.ADDRESS2) AS ADDRESS,P.RATING, L.*, ROW_NUMBER() OVER (ORDER BY L.ENDATE DESC) AS sl FROM LOANS L  INNER JOIN PARTIES P ON P.PID=L.PID WHERE L.LOAN_STATUS!=0 AND L.PID!='' $fdate $tdate $comp $status )N WHERE sl BETWEEN $offset AND $page_limit ORDER BY N.ENDATE DESC")->result_array();
        save_query_in_log();
        $this->db->close();
        return $result;
    }
    
    public function getLoan($search)
  {
     $query = $this->db->query("SELECT l.BILLNO,c.COMPANYNAME,l.LOAN_TYPE,l.ENDATE,l.AMOUNT, i.PERIOD, l.INTERESTTYPE,l.WEIGHT,l.STONELESS,l.LESS,l.NETWEIGHT, l.MONTHS,l.LOANDAYS,l.ITEM_PHOTO,l.NOMINEE,l.RELATION,l.NOMINEE_ID, p.PID, p.NAME,p.ADDRESS1,p.ADDRESS2,p.PHONE,p.CITY,p.MEMBERSHIP_ID,p.MEMBERSHIP_POINTS,p.RATING,p.PHOTO,p.OTHER_PHOTO,l.LOAN_STATUS,p.STREET_ID,p.MEMBERSHIP_POINTS,l.INTEREST,l.JEWEL_TYPE from LOANS l,PARTIES p,COMPANY c,INTERESTLIST i WHERE l.PID=p.PID and i.INTNAME=l.INTERESTTYPE and l.COMPANYCODE=c.COMPANYCODE and l.LOAN_STATUS>=1 and  l.BILLNO LIKE '".$search.'%'."'  ");
    
    $result = $query->result();
    return $result;
  }

     public function  get_company_list()
    {
        $this->db->reconnect();
        // $result  = $this->db->query("SELECT C.COMPANYNAME ,C.COMPANYCODE,U.* FROM COMPANY C LEFT JOIN USERLIST U ON C.COMPANYCODE=U.ACTIVECOMPANY WHERE U.USERNAME='".$name."' ")->result_array();
        // $result  = $this->db->query("SELECT * FROM COMPANY WHERE ACTIVE!='N' and COMPANYCODE in ('001','002','009','010')")->result_array();
        $result  = $this->db->query("SELECT * FROM COMPANY WHERE ACTIVE!='N' and COMPANY_TYPE='L'")->result_array();
        save_query_in_log();
        $this->db->close();
        return $result;   
    }
    public function  get_interest_group_list()
    {
        $this->db->reconnect();
        // $result  = $this->db->query("SELECT * FROM INT_GROUPS ORDER BY INT_GROUP_NAME")->result_array();
        // $result  = $this->db->query("SELECT INT_GROUP FROM INTERESTLIST where ACTIVE='Y' group by INT_GROUP")->result_array();
        $result  = $this->db->query("SELECT INT_GROUP FROM INTERESTLIST where ACTIVE='Y' and (INT_GROUP like 'mip%' or INT_GROUP like 'tip%' or INT_GROUP like 'sip%')  group by INT_GROUP")->result_array();
        //SELECT INT_GROUP FROM INTERESTLIST where ACTIVE='Y' and (INT_GROUP like 'mip%' or INT_GROUP like 'tip%' or INT_GROUP like 'sip%')  group by INT_GROUP 
        save_query_in_log();
        $this->db->close();
        return $result;   
    }
    public function  get_interest_list($val)
    {
        $this->db->reconnect();
        // $result  = $this->db->query("SELECT * FROM INTERESTLIST WHERE ACTIVE='Y' ORDER BY INTNAME")->result_array();
        $result  = $this->db->query("SELECT * from INTERESTLIST where INT_GROUP='".$val."' AND ACTIVE='Y'")->result_array();
        save_query_in_log();
        $this->db->close();
        return $result;   
    }

    public function get_item_purity_list()
    {
        $this->db->reconnect();
        $result  = $this->db->query("SELECT * FROM ITEMPURITY WHERE STATUS!=2 ")->result_array();
        save_query_in_log();
        $this->db->close();
        return $result;         
    }
    public function get_loan_status()
    {
        $this->db->reconnect();
        $result  = $this->db->query("SELECT * FROM loan_status ")->result_array();
        save_query_in_log();
        $this->db->close();
        return $result;      
    }
    public function get_party_details()
    {
        $this->db->reconnect();
        $result  = $this->db->query("SELECT PID,NAME,FATHERSNAME,LASTNAME_PREFIX,ADDRESS1,ADDRESS2,CITY,PHONE,RATING,PHOTO,OTHER_PHOTO,SIGNATURE FROM PARTIES ")->result_array();
        save_query_in_log();
        $this->db->close();
        return $result; 
    }
    public function getUsers($search)
  {
     $query = $this->db->query("SELECT a.*,e.MEMBERSHIP_NO,B.*,C.*,D.* from PARTIES a LEFT JOIN STREET B ON a.STREET_ID=B.STREETID LEFT JOIN VILLAGE C ON a.VILLAGE_ID=C.VILLAGEID LEFT JOIN CITY D ON a.CITY_ID=D.CITYID LEFT JOIN MEMBERSHIP_CARD e ON a.MEMBERSHIP_ID=e.MEMBERSHIP_ID where NAME LIKE '".$search.'%'."'  ");
    //$query = $this->db->query("SELECT * from PARTIES where NAME LIKE '".'%'.$search.'%'."' ORDER BY NAME,LASTNAME_PREFIX,FATHERSNAME,ADDRESS1,ADDRESS2 ASC ");
    $result = $query->result();
    return $result;
  }
  public function getNominee($search)
  {
     $query = $this->db->query("SELECT DISTINCT * from temp_nominee where NOMINEE_NAME LIKE '".$search.'%'."'  ");
    //$query = $this->db->query("SELECT * from PARTIES where NAME LIKE '".'%'.$search.'%'."' ORDER BY NAME,LASTNAME_PREFIX,FATHERSNAME,ADDRESS1,ADDRESS2 ASC ");
    $result = $query->result();
    return $result;
  }
    public function  get_pledge_list($search)
    {   
        $query = $this->db->query("SELECT * from ITEMS where ITEMNAME LIKE '".'%'.$search.'%'."' ORDER BY ITEMNAME ASC ");
        $result = $query->result();
        return $result;
    }

    public function get_voucher_master_key($lprefix)
    {
        $kname = "VOUCHER_MASTER-".$lprefix;
        $query = $this->other_db->query("SELECT * FROM KEYMASTER WHERE KEYNAME='".$kname."'");
        $result = $query->row();
        return $result;
    }

    public function get_account_payment_key($lprefix)
    {
        $kname = "ACC_PAYMENTS-".$lprefix;
        $query = $this->other_db->query("SELECT * FROM KEYMASTER WHERE KEYNAME='".$kname."'");
        $result = $query->row();
        return $result;
    }

    public function get_loan_key($lprefix)
    {
        $kname = "LOANS-".$lprefix;
        $query = $this->db->query("SELECT * FROM KEYMASTER WHERE KEYNAME='".$kname."'");
        $result = $query->row();
        return $result;
    }

    public function update_loan_keymaster($vname)
    {
        $this->db->reconnect();
        $result  = $this->db->query("UPDATE KEYMASTER SET KEYVALUE=KEYVALUE+1 WHERE KEYNAME='".$vname."'");
        save_query_in_log();
        $this->db->close();
        return $result;
    }
    public function insert_party_ledger($pid,$pname,$vLastName,$vAddress1,$city,$phone)
    {
        $this->other_db->reconnect();
        $result  = $this->other_db->query("INSERT INTO ACC_LEDGERS(LEDGER_SNO,LEDGER_NAME,LASTNAME,GROUP_NAME,GROUP_ID,SUPER_ID,OP_BALANCE,OP_SIDE,CHK_PREDEFINED,DESCRIPTION,COMPANYCODE,ADDRESS,ADDRESS2,CITY,PHONE,ADDED_USER,ADDED_TIME) VALUES('".$pid."','".$pname."','".$vLastName."','LOAN PARTY(S)','10','1',0,'DR','N','','".$_SESSION['COMPANYCODE']."','".$vAddress1."', '','".$city."','".$phone."','".$_SESSION['username']."','".date('Y-m-d H:i:s')."')");
        save_query_in_log();
        $this->other_db->close();
        return $result;   
    }
    public function insert_voucher_master($vMasterSno,$vReceiptSno,$date,$vchrtype,$vTransType,$billno)
    {
        $this->other_db->reconnect();
        $result  = $this->other_db->query("INSERT INTO VOUCHER_MASTER(MASTER_SNO,DETAILS_SNO,TRANSDATE,VOUCHER_TYPE,TRANSTYPE,DESCRIPTION,COMPANYCODE,ADDED_USER,ADDED_TIME,REF_NO,VOUCHER_NO,REMARKS) VALUES('".$vMasterSno."','".$vReceiptSno."','".$date."','".$vchrtype."','".$vTransType."', '".$billno."', '".$_SESSION['COMPANYCODE']."','".$_SESSION['username']."','".date('Y-m-d H:i:s')."','".$billno."','".$billno."','".$billno."')");
        save_query_in_log();
        $this->other_db->close();
        return $result;   
    }
    public function insert_voucher_details($vMasterSno,$vReceiptSno,$date,$i,$pid,$loan_amount,$type_amount,$vchrtype,$vTransType,$billno)
    {
        $this->other_db->reconnect();
        $result  = $this->other_db->query("INSERT INTO VOUCHER_DETAILS(VOUCHER_MASTER_SNO,VOUCHER_SNO,ENDATE,ROWNO,LEDGER_SNO,DEBIT,CREDIT,VOUCHERTYPE,TRANSTYPE,AREFNO) VALUES ('".$vMasterSno."','".$vReceiptSno."','".$date."',".$i.",'".$pid."','".$loan_amount."','".$type_amount."','".$vchrtype."','".$vTransType."','".$billno."')");
        save_query_in_log();
        $this->other_db->close();
        return $result;   
    }
    public function  insert_loan_master_data($data)
    {
        $this->db->reconnect();
        // echo "INSERT INTO LOANS(PID,NAME,BILLNO,LOAN_TYPE,ENDATE,JEWEL_TYPE,MONTHS,INTERESTTYPE,INTEREST,NOMINEE,RELATION,ACTIVE,STATUS,COMPANYCODE,ATTENDED_USER,ADDED_USER,ADDED_TIME,LOAN_STATUS,NOMINEE_ID,TYPE_OF_RECORD) VALUES ('".$data['pid']."','".$data['p_fname']."','".$data['billno']."','".$data['loan_type']."','".$data['loandate']."','".$data['jewel_type']."','".$data['months']."','".$data['interest_type']."','".$data['interest']."','".$data['nominee']."','".$data['relation']."','Y','','".$data['company']."','".$data['attended_user']."','".$data['added_user']."','".$data['added_time']."','0','".$data['nid']."','N')";
        // exit();
        $result  = $this->db->query("INSERT INTO LOANS(PID,NAME,BILLNO,LOAN_TYPE,ENDATE,JEWEL_TYPE,MONTHS,INTERESTTYPE,INTEREST,NOMINEE,RELATION,ACTIVE,STATUS,COMPANYCODE,ATTENDED_USER,ADDED_USER,ADDED_TIME,LOAN_STATUS,NOMINEE_ID,TYPE_OF_RECORD,CHK_VERIFIED) VALUES ('".$data['pid']."','".$data['p_fname']."','".$data['billno']."','".$data['loan_type']."','".$data['loandate']."','".$data['jewel_type']."','".$data['months']."','".$data['interest_type']."','".$data['interest']."','".$data['nominee']."','".$data['relation']."','Y','','".$data['company']."','".$data['attended_user']."','".$data['added_user']."','".$data['added_time']."','0','".$data['nid']."','N','N')");
            save_query_in_log();
       
        
        $this->db->close();
        return $result;   
    }
    public function loan_sub_detail_insert($data)
    {
        $this->db->reconnect();
        
        $result  = $this->db->query("UPDATE LOANS SET AMOUNT='".$data['loan_amount']."', BALANCE='".$data['balance']."', CURRENTRATE='".$data['current_rate']."',PLEDGEINFO='".$data['pledge_info']."', PLEDGE_SUMMARY='".$data['pledge_summary']."', WEIGHT='".$data['add_weight_new_loan']."', STONELESS='".$data['add_stless_new_loan']."', LESS='". $data['add_less_new_loan']."', NETWEIGHT='".$data['add_ntweight_new_loan']."', QUALITY='".$data['add_qual_new_loan'] ."', PERGRAMVALUE='".$data['grm_val']."', TOTALSALESRATE='".$data['sale_rate']."', DCAMOUNT='".$data['doc_charge']."', PROCESSING_CHARGE='".$data['processing_charge']."', LOAN_STATUS=1, PARTY_REC_LOAN_CHG='".$data['party_rec_loan_chg']."',PARTY_REC_SEPARATE_CHG='".$data['party_rec_separate_chg']."',HL_AMOUNT='".$data['hl_amount']."',PARTY_REC_LOAN_ON_ACC='".$data['party_rec_loan_on_acc']."',PARTY_REC_SEPARATE_ON_ACC='".$data['party_rec_separate_on_acc']."', REDEMPTION_PERIOD='".$data['redemption_period']."',NET_PAY='".$data['net_pay']."',ITEM_PHOTO='".$data['item_photo']."',LOAN_SNO='".$data['txtReceiptNo']."'  WHERE PID='".$data['pid']."'  AND BILLNO='".$data['billno']."'");
        save_query_in_log();

        $res=$this->db->query("delete from temp_pledge_info where BILLNO='".$data['billno']."'");

        add_notification(date('Y-m-d H:i:s'), $data['company_code'], $data['process'], $data['header'], $data['message'],'',$data['rec_uid'], $data['rec_vr_status'], $data['billno']);
        $this->db->close();
        return $result;   
    }
    public function loan_get_int_type_id_by_billno($int_tx,$int_tx_len)
      {
        $this->db->reconnect();
        // $result  = $this->db->query("SELECT TOP 1 BILLNO,TYPE_OF_RECORD,COMPANYCODE FROM LOANS WHERE SUBSTRING(LTRIM(BILLNO),1,".$int_tx_len.")='".$int_tx."' ORDER BY ADDED_TIME DESC")->row();
        $result  = $this->db->query("SELECT TOP 1 BILLNO,TYPE_OF_RECORD,COMPANYCODE FROM LOANS WHERE BILLNO LIKE '%".$int_tx."%' AND LOAN_STATUS!=0 ORDER BY ADDED_TIME DESC")->row();
        
        save_query_in_log();
        $this->db->close();
        return $result; 
      }
      public function get_pledge_max_record_by_bill_no($billno)
    {
        $this->db->reconnect();
        $result  = $this->db->query("SELECT MAX(PNO) as max_pledge_no FROM PLEDGEINFO WHERE BILLNO='".$billno."'")->row();
        save_query_in_log();
        $this->db->close();
        return $result;   
    }
     public function insert_pledge_info($pledgedata)
    {
        $this->db->reconnect();
        $result  = $this->db->query("INSERT INTO PLEDGEINFO(PNO, BILLNO, PLEDGENAME, DESCRIPTION, PURITY,WEIGHT, PURITY_PERCENT, TYPE_OF_RECORD, STONEWEIGHT, LESS, NETWEIGHT, IS_DAMAGE, PLEDGE_PHOTO) VALUES('".$pledgedata['pno']."', '".$pledgedata['billno']."','".$pledgedata['pledge_item']."','".$pledgedata['pledge_description']."','".$pledgedata['pledge_purity']."','".$pledgedata['pledge_weight']."','".$pledgedata['pledge_purity_percent']."','".$pledgedata['rec_type']."','".$pledgedata['pledge_stone_weight']."','".$pledgedata['pledge_less']."','".$pledgedata['pledge_net_weight']."','".$pledgedata['pledge_is_damage']."','".$pledgedata['pledge_image']."')");
        save_query_in_log();
        $this->db->close();
        return $result;   
    }
    public function insert_temp_pledge_info($pledgedata)
    {
        $this->db->reconnect();
        $result  = $this->db->query("INSERT INTO temp_pledge_info(PNO, BILLNO, PLEDGENAME, DESCRIPTION, PURITY,WEIGHT, PURITY_PERCENT, TYPE_OF_RECORD, STONEWEIGHT, LESS, NETWEIGHT, IS_DAMAGE, PLEDGE_PHOTO) VALUES('".$pledgedata['pno']."', '".$pledgedata['billno']."','".$pledgedata['pledge_item']."','".$pledgedata['pledge_description']."','".$pledgedata['pledge_purity']."','".$pledgedata['pledge_weight']."','".$pledgedata['pledge_purity_percent']."','".$pledgedata['rec_type']."','".$pledgedata['pledge_stone_weight']."','".$pledgedata['pledge_less']."','".$pledgedata['pledge_net_weight']."','".$pledgedata['pledge_is_damage']."','".$pledgedata['pledge_image']."')");
        save_query_in_log();
        $this->db->close();
        return $result;
    }
    public function delete_temp_pledge_info($pledgedata)
    {
        $this->db->reconnect();
        $result  = $this->db->query("DELETE FROM  temp_pledge_info WHERE PNO='".$pledgedata['pno']."' 
        AND BILLNO ='".$pledgedata['billno']."' AND PLEDGENAME ='".$pledgedata['pledge_item']."' AND
         DESCRIPTION='".$pledgedata['pledge_description']."' AND PURITY='".$pledgedata['pledge_purity']."' 
         AND WEIGHT='".$pledgedata['pledge_weight']."' AND PURITY_PERCENT='".$pledgedata['pledge_purity_percent']."' 
         AND TYPE_OF_RECORD ='".$pledgedata['rec_type']."' AND STONEWEIGHT ='".$pledgedata['pledge_stone_weight']."' AND
          LESS ='".$pledgedata['pledge_less']."' AND NETWEIGHT='".$pledgedata['pledge_net_weight']."' 
          AND IS_DAMAGE='".$pledgedata['pledge_is_damage']."'");
      
      
    //   $result  = $this->db->query("INSERT INTO temp_pledge_info(PNO, BILLNO, PLEDGENAME, DESCRIPTION, PURITY,WEIGHT,
    //      PURITY_PERCENT, TYPE_OF_RECORD, STONEWEIGHT, LESS, NETWEIGHT, IS_DAMAGE, PLEDGE_PHOTO) 
    //      VALUES('".$pledgedata['pno']."', '".$pledgedata['billno']."','".$pledgedata['pledge_item']."',
    //      '".$pledgedata['pledge_description']."','".$pledgedata['pledge_purity']."',
    //      '".$pledgedata['pledge_weight']."','".$pledgedata['pledge_purity_percent']."',
    //      '".$pledgedata['rec_type']."','".$pledgedata['pledge_stone_weight']."',
    //      '".$pledgedata['pledge_less']."','".$pledgedata['pledge_net_weight']."',
    //      '".$pledgedata['pledge_is_damage']."','".$pledgedata['pledge_image']."')");
        save_query_in_log();
        $this->db->close();
        return $result;   
    }
    public function get_loan_by_loan_id($id)
    {
        $this->db->reconnect();
        $result  = $this->db->query("SELECT * FROM LOANS WHERE BILLNO='".$id."'")->row();
        save_query_in_log();
        $this->db->close();
        return $result; 
    }
    public function insert_pay_to_party($data)
    {
         $this->db->reconnect();
        // $result  = $this->db->query("(type_of_payment, amount, party_bank, cheque_ref_no, company_bank, remarks, bill_no, party_id, created_by, created_on) VALUES('".$data['type']."','".$data['amt']."','".$data['p_bank']."','".$data['ref_no']."','".$data['c_bank']."','".$data['det']."','".$data['billno']."','".$data['pid']."','".$data['created_by']."','".$data['created_on']."')");
         $chk_pay=$this->db->query("select * from payment_inward_outward where bill_no='".$data['billno']."' and party_id='".$data['pid']."' and type_of_payment='".$data['type']."'")->row();


        if(count((array)$chk_pay)>0)
        {
            $del_res=$this->db->query("delete from payment_inward_outward where bill_no='".$data['billno']."' and party_id='".$data['pid']."'");
            // $result=$this->db->query("UPDATE payment_inward_outward SET amount=".$data['amt'].", party_bank='".$data['p_bank']."', cheque_ref_no='".$data['ref_no']."', company_bank='".$data['c_bank']."', remarks='".$data['det']."' WHERE bill_no='".$data['billno']."' and party_id='".$data['pid']."' and type_of_payment='".$data['type']."'");
            
            $result  = $this->db->query("INSERT INTO payment_inward_outward(module_name, type_of_payment, amount, party_bank, cheque_ref_no, company_bank, remarks, bill_no, party_id, payment_side, metal_type, quality, purity, weight, pure_metal_weight,  created_by, created_on, record_status) VALUES('New Loan - Pay','".$data['type']."','".$data['amt']."','".$data['p_bank']."','".$data['ref_no']."','".$data['c_bank']."','".$data['det']."','".$data['billno']."','".$data['pid']."','DR','','','','0.00','0.00','".$data['created_by']."','".$data['created_on']."','2')");
        }
        else
        {
             $result  = $this->db->query("INSERT INTO payment_inward_outward(module_name, type_of_payment, amount, party_bank, cheque_ref_no, company_bank, remarks, bill_no, party_id, payment_side, metal_type, quality, purity, weight, pure_metal_weight,  created_by, created_on, record_status) VALUES('New Loan - Pay','".$data['type']."','".$data['amt']."','".$data['p_bank']."','".$data['ref_no']."','".$data['c_bank']."','".$data['det']."','".$data['billno']."','".$data['pid']."','DR','','','','0.00','0.00','".$data['created_by']."','".$data['created_on']."','2')");
            }

        save_query_in_log();
        $this->db->close();
        return $result;  
    }
     public function insert_receive_from_party($data)
    {
         $this->db->reconnect();
        // $result  = $this->db->query("INSERT INTO party_payment_receive(type_of_payment, amount, party_bank, cheque_ref_no, company_bank, remarks, bill_no, party_id, created_by, created_on) VALUES('".$data['type']."','".$data['amt']."','".$data['p_bank']."','".$data['ref_no']."','".$data['c_bank']."','".$data['det']."','".$data['billno']."','".$data['pid']."','".$data['created_by']."','".$data['created_on']."')");
         $result  = $this->db->query("INSERT INTO payment_inward_outward(module_name, type_of_payment, amount, party_bank, cheque_ref_no, company_bank, remarks, bill_no, party_id, payment_side, metal_type, quality, purity, weight, pure_metal_weight,  created_by, created_on, record_status) VALUES('New Loan - Receive','".$data['type']."','".$data['amt']."','".$data['p_bank']."','".$data['ref_no']."','".$data['c_bank']."','".$data['det']."','".$data['billno']."','".$data['pid']."','CR','','','','0.00','0.00','".$data['created_by']."','".$data['created_on']."','0')");
        save_query_in_log();
        $this->db->close();
        return $result;  
    }
    public function get_party_bank_list($pid)
    {
        $query = $this->db->query("SELECT * FROM party_bank_upi_details WHERE party_id='".$pid."'");
        $result = $query->result();
        return $result;
    }
    public function getsearchpartydetails($search)
    {
        $this->db->reconnect();
        $query = $this->db->query("SELECT a.*,e.MEMBERSHIP_NO,B.*,C.*,D.* from PARTIES a LEFT JOIN STREET B ON a.STREET_ID=B.STREETID LEFT JOIN VILLAGE C ON a.VILLAGE_ID=C.VILLAGEID LEFT JOIN CITY D ON a.CITY_ID=D.CITYID LEFT JOIN MEMBERSHIP_CARD e ON a.MEMBERSHIP_ID=e.MEMBERSHIP_ID where NAME LIKE '".$search.'%'."'  ");
   
        $result = $query->result();
        return $result;
    }
    public function getsearchpartydata($partyID)
    {
        $this->db->reconnect();
        $query = $this->db->query("SELECT a.*,b.VILLAGENAME,d.CITYNAME,e.STREETNAME,f.AREANAME,g.* from PARTIES a left join VILLAGE b on b.VILLAGEID =a.VILLAGE_ID
        left join STATE c on c.STATE_ID = a.STATE
        left join CITY d on d.CITYID = a.CITY_ID
        left join STREET e on e.STREETID = a.STREET_ID
        left join AREA f on f.SNO = a.AREA_ID
        left join LOANS g on g.PID = a.PID where g.PID='".$partyID."'");
        /*print_r("SELECT a.*,b.VILLAGENAME,d.CITYNAME,e.STREETNAME,f.AREANAME,g.* from PARTIES a left join VILLAGE b on b.VILLAGEID =a.VILLAGE_ID
        left join STATE c on c.STATE_ID = a.STATE
        left join CITY d on d.CITYID = a.CITY_ID
        left join STREET e on e.STREETID = a.STREET_ID
        left join AREA f on f.SNO = a.AREA_ID
        left join LOANS g on g.PID = a.PID where g.PID='".$partyID."'");exit;*/
        $result = $query->result();
        return $result;
    }
    public function checkloandata($PID){

        $this->db->reconnect();
        $query = $this->db->query("SELECT * FROM LOANS where PID='".$PID."'");
        $result = $query->result();
        return $result;
    }
    public function getpledgedata($PID){

        $this->db->reconnect();
        $query = $this->db->query("SELECT count(a.BILLNO) as itemcount,a.BILLNO,sum(b.NETWEIGHT) as totnetwight,a.DESCRIPTION,a.IS_DAMAGE,a.PURITY_PERCENT,b.LESS,a.STONEWEIGHT,a.PURITY,a.QTY,sum(a.WEIGHT) as totweight,b.COMPANYCODE,c.COMPANYNAME,b.PID FROM PLEDGEINFO a
        join LOANS b on b.BILLNO = a.BILLNO
        left join COMPANY c on c.COMPANYCODE = b.COMPANYCODE
        where b.PID='".$PID."' group by a.DESCRIPTION,a.IS_DAMAGE,a.PURITY_PERCENT,b.LESS,a.STONEWEIGHT,a.PURITY,a.QTY,a.BILLNO,b.NETWEIGHT,b.COMPANYCODE,c.COMPANYNAME,b.PID");
        $result = $query->result_array();
        return $result;
    }


}
?>                        