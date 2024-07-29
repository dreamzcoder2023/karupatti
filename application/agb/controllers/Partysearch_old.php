<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/* ************************************************************************************
		Purpose : To handle all Department functions 2022-08-19
***************************************************************************************/
class Partysearch extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model(array("Party_search_model","Accountsgroup_model"));
        $this->load->model(array("Loanreceipt_model"));
       	$this->load->library('user_agent');

           $fin_year=$this->Accountsgroup_model->get_fin_years_list();
        $db=substr($fin_year->DBNAME,0,strlen($fin_year->DBNAME)-4);
        $db_user=$fin_year->USERNAME?$fin_year->USERNAME:'';
        $db_pass=$fin_year->PASSWORD?$fin_year->PASSWORD:'';
        // echo $db;exit;
        $config_app = switch_db_dynamic($db,$db_user,$db_pass);
        $this->Party_search_model->other_db = $this->load->database($config_app,TRUE);


    	if (isset($this->session->userdata['username']) && $this->session->userdata['username'] == TRUE)
        {
            //do something
        }else{
            redirect('login'); //if session is not there, redirect to login page
        } 
		date_default_timezone_set("Asia/Kolkata");
    	$this->session->set_userdata('comtitle', 'Party Search');
	}

    
    public function index()
    {   

        $data['party_search_type'] = $this->input->post('party_search_type');
        $data['party_search']      = $this->input->post('party_search');  
        $data['party_search_id']   = $this->input->post('party_search_id'); 
        // print_r($data['party_search_id']);       


        if($data['party_search_id']==''){

            if($data['party_search_type'] =='2'){
                $party_type_record=$this->db->query("SELECT  TYPE_OF_RECORD FROM PARTIES WHERE PHONE = '".$data['party_search']."' ")->row();

                if($party_type_record->TYPE_OF_RECORD=='N'){
                $data['party_detail'] =$this->db->query("SELECT  A.*,B.AREANAME,C.CITYNAME,D.VILLAGENAME,E.STREETNAME FROM PARTIES a LEFT JOIN AREA B ON A.AREA=B.SNO LEFT JOIN CITY C ON A.CITY=C.CITYID LEFT JOIN VILLAGE D ON A.ADDRESS2=D.VILLAGEID LEFT JOIN  STREET E ON A.STREET_ID=E.STREETID WHERE PHONE = '".$data['party_search']."'  ")->row();
                }
                else{
                    $data['party_detail'] = $this->db->query("SELECT A.*,AREA AS AREANAME,CITY AS CITYNAME,ADDRESS2 AS VILLAGENAME,ADDRESS1 AS  STREETNAME FROM PARTIES a WHERE PHONE = '".$data['party_search']."'  ")->row();
                }
            }
            
            if($data['party_search_type'] =='3'){
                $membership=$this->db->query("SELECT  * FROM MEMBERSHIP_CARD WHERE MEMBERSHIP_NO='".$data['party_search']."' ")->row();
     
                $party_type_record=$this->db->query("SELECT  TYPE_OF_RECORD FROM PARTIES WHERE MEMBERSHIP_ID='".$membership->MEMBERSHIP_ID."' ")->row();
                print_r($party_type_record);
                if($party_type_record->TYPE_OF_RECORD=='N'){
                $data['party_detail'] =$this->db->query("SELECT A.*,B.AREANAME,C.CITYNAME,D.VILLAGENAME,E.STREETNAME FROM PARTIES a LEFT JOIN AREA B ON A.AREA=B.SNO LEFT JOIN CITY C ON A.CITY=C.CITYID LEFT JOIN VILLAGE D ON A.ADDRESS2=D.VILLAGEID LEFT JOIN  STREET E ON A.STREET_ID=E.STREETID WHERE  MEMBERSHIP_ID='".$membership->MEMBERSHIP_ID."'")->row();
                }
                else{
                    $data['party_detail'] = $this->db->query("SELECT A.*,AREA AS AREANAME,CITY AS CITYNAME,ADDRESS2 AS VILLAGENAME,ADDRESS1 AS  STREETNAME FROM PARTIES a WHERE MEMBERSHIP_ID='".$data['party_search']."' ")->row(); 
                }
            }
            if($data['party_search_type'] =='4'){

                $party_id = $this->db->query("SELECT * FROM LOANS WHERE BILLNO = '".$data['party_search']."'")->row();

                $party_type_record=$this->db->query("SELECT  TYPE_OF_RECORD FROM PARTIES WHERE PID='".$party_id->PID."' ")->row();

                if($party_type_record->TYPE_OF_RECORD=='N'){
                $data['party_detail'] =$this->db->query("SELECT A.*,B.AREANAME,C.CITYNAME,D.VILLAGENAME,E.STREETNAME FROM PARTIES a LEFT JOIN AREA B ON A.AREA=B.SNO LEFT JOIN CITY C ON A.CITY=C.CITYID LEFT JOIN VILLAGE D ON A.ADDRESS2=D.VILLAGEID LEFT JOIN  STREET E ON A.STREET_ID=E.STREETID WHERE PID = '".$party_id->PID."'")->row();
                }
                else{
                    $data['party_detail'] = $this->db->query("SELECT A.*,AREA AS AREANAME,CITY AS CITYNAME,ADDRESS2 AS VILLAGENAME,ADDRESS1 AS  STREETNAME FROM PARTIES a WHERE PID = '".$party_id->PID."'")->row(); 
                }
            }
        }
        else{
          
                $party_type_record=$this->db->query("SELECT  TYPE_OF_RECORD FROM PARTIES WHERE PID = '".$data['party_search_id']."'  ")->row();

                if($party_type_record->TYPE_OF_RECORD=='N'){
                $data['party_detail'] = $this->db->query("SELECT A.*,B.AREANAME,C.CITYNAME,D.VILLAGENAME,E.STREETNAME FROM PARTIES a LEFT JOIN AREA B ON A.AREA=B.SNO LEFT JOIN CITY C ON A.CITY=C.CITYID LEFT JOIN VILLAGE D ON A.ADDRESS2=D.VILLAGEID LEFT JOIN  STREET E ON A.STREET_ID=E.STREETID WHERE PID = '".$data['party_search_id']."'  ")->row();
                }
                else{
                    $data['party_detail'] = $this->db->query("SELECT A.*,AREA AS AREANAME,CITY AS CITYNAME,ADDRESS2 AS VILLAGENAME,ADDRESS1 AS  STREETNAME FROM PARTIES a WHERE PID = '".$data['party_search_id']."'  ")->row();
                
                 }
        }
        $this->load->view('party_search/party_search',$data);
    }



    public function loans()
    {
     
        $data['party_search_type'] =$this->input->post('party_search_type');

        $data['party_search'] =$this->input->post('party_search');  

        $data['party_search_id'] =$this->input->post('party_search_id'); 


if($data['party_search_id']==''){
    if($data['party_search_type'] =='2'){
        $data['party_detail'] = $this->db->query("SELECT * FROM PARTIES WHERE PHONE = '".$data['party_search']."'  ")->row();
    }
    if($data['party_search_type'] =='3'){

        $data['party_detail'] = $this->db->query("SELECT * FROM PARTIES WHERE MEMBERSHIP_ID = '".$data['party_search']."'  ")->row();
    }
    if($data['party_search_type'] =='4'){
$party_id=$this->db->query("SELECT * FROM LOANS WHERE BILLNO = '".$data['party_search']."'  ")->row();
        $data['party_detail'] = $this->db->query("SELECT * FROM PARTIES WHERE PID = '".$data['party_search']."'  ")->row();
    }
    
}
else{
    $data['party_detail'] = $this->db->query("SELECT * FROM PARTIES WHERE PID = '".$data['party_search_id']."'  ")->row();
}
if(isset($data['party_detail']->PID)){
$pid=$data['party_detail']->PID;
}
else{
    $pid='0';
}
$data['sel_loan_type']=$loan_type=$this->input->post('sel_loan_type');
if($data['sel_loan_type']==''){
    $data['sel_loan_type']='loan';
}

$data['loan_details'] =$this->db->query("SELECT l.*,c.COMPANYNAME FROM LOANS l,COMPANY c WHERE l.PID = '".$pid."' and  l.COMPANYCODE=c.COMPANYCODE AND LOAN_STATUS !=0 order by l.ENDATE desc ")->result_array();

$data['receipt_details'] =$this->db->query("SELECT c.COMPANYNAME,r.BILLNO,r.RECEIPT_DATE,r.CALC_PRINCIPAL, r.CALC_INTEREST, l.INTERESTTYPE,(r.MAINTAINCHARGE+r.NOTICECHARGE+r.FORMCHARGE)as CHARGES,r.HL_AMOUNT,r.PAIDAMOUNT,r.RECEIPT_SNO FROM  RECEIPT_MASTER r, LOANS l, COMPANY c WHERE l.BILLNO=r.BILLNO and l.COMPANYCODE=c.COMPANYCODE and l.PID='".$pid."' order by RECEIPT_DATE desc")->result_array();

$data['redemption_details'] =$this->db->query("SELECT r.RETURNDATE,l.LOAN_STATUS,c.COMPANYNAME,r.BILLNO,r.RETURNDATE,l.INTERESTTYPE,l.JEWEL_TYPE,COUNT(p.BILLNO) as no_of_item,l.AMOUNT,r.CLOSING_TYPE FROM  REDEMPTIONS r, LOANS l, COMPANY c, PLEDGEINFO p 
WHERE l.BILLNO=r.BILLNO and l.COMPANYCODE=c.COMPANYCODE and p.BILLNO=r.BILLNO and l.PID='".$pid."' group by r.RETURNDATE,c.COMPANYNAME,r.BILLNO,r.RETURNDATE,l.INTERESTTYPE,l.JEWEL_TYPE,l.AMOUNT,r.CLOSING_TYPE,l.LOAN_STATUS ORDER BY r.RETURNDATE desc")->result_array();

        $this->load->view('party_search/party_search_loans',$data);

    }
    public function redemption_view()
    {
        $billno=$this->input->post('bno');

        $bill_no=str_replace('_', '/', $billno);
        
        $data['redemption_details'] = $this->db->query("select * from REDEMPTIONS where BILLNO='".$bill_no."'")->row();

        $data['loan_details'] = $this->db->query("select * from LOANS where BILLNO='".$bill_no."' AND LOAN_STATUS !=0 ")->row();
        $data['loan_status'] = $this->db->query("select * from loan_status where id='".$data['loan_details']->LOAN_STATUS."'")->row();
        $data['party_details'] = $this->db->query("select * from PARTIES where PID='".$data['loan_details']->PID."'")->row();
        $data['pledge_details'] = $this->db->query("select * from PLEDGEINFO where BILLNO='".$bill_no."'")->result_array();

        
        $data['membership_details']= $this->db->query("select * from MEMBERSHIP_CARD where PID='".$data['loan_details']->PID."'")->row();
        $data['receipt_details']= $this->db->query("select * from RECEIPT_MASTER where BILLNO='".$bill_no."'")->result_array();
        $this->load->view('party_search/redemption_view',$data);
    }

    public function jewel()
    {
     
        $data['party_search_type'] =$this->input->post('party_search_type');

        $data['party_search'] =$this->input->post('party_search');  

        $data['party_search_id'] =$this->input->post('party_search_id'); 


        if($data['party_search_id']==''){
            if($data['party_search_type'] =='2'){
                $data['party_detail'] = $this->db->query("SELECT * FROM PARTIES WHERE PHONE = '".$data['party_search']."'  ")->row();
            }
            if($data['party_search_type'] =='3'){

                $data['party_detail'] = $this->db->query("SELECT * FROM PARTIES WHERE MEMBERSHIP_ID = '".$data['party_search']."'  ")->row();
            }
            if($data['party_search_type'] =='4'){
                $party_id=$this->db->query("SELECT * FROM LOANS WHERE BILLNO = '".$data['party_search']."'  ")->row();
                $data['party_detail'] = $this->db->query("SELECT * FROM PARTIES WHERE PID = '".$data['party_search']."'  ")->row();
            }
            
        }
        else{
            $data['party_detail'] = $this->db->query("SELECT * FROM PARTIES WHERE PID = '".$data['party_search_id']."'  ")->row();
        }
        if(isset($data['party_detail']->PID)){
            $pid=$data['party_detail']->PID;
            $data['sales_entry_list']  = $this->db->query("SELECT * FROM salesentry WHERE party_id = '".$pid."' order by created_on desc")->result_array();
            $data['sales_receipt_list']= $this->db->query(" SELECT * FROM sales_receipt WHERE status='Y' AND party_id='".$pid."'ORDER BY id DESC")->result_array();
            $data['sales_order_list']  = $this->db->query("SELECT * FROM sales_order WHERE status='Y' AND party_id='".$pid."'  ORDER BY id DESC  ")->result_array();
            $data['sales_return_list'] = $this->db->query("SELECT * FROM sales_return WHERE status!='' AND party_id='".$pid."'  ORDER BY id DESC  ")->result_array();
        }
        else{
            $pid='';
            $data['sales_entry_list']    = [];
            $data['sales_receipt_list'] = [];
            $data['sales_order_list']    = [];
            $data['sales_return_list']   = [];
        }
        $data['sel_sale_type']=$loan_type=$this->input->post('sel_sale_type');
        if($data['sel_sale_type']=='')
        {
            $data['sel_sale_type']='new';
        }

        


        $this->load->view('party_search/party_search_jewel',$data);

    }

    public function chit()
    {
     
        $data['party_search_type'] =$this->input->post('party_search_type');

        $data['party_search'] =$this->input->post('party_search');  

        $data['party_search_id'] =$this->input->post('party_search_id'); 


        if($data['party_search_id']==''){
            if($data['party_search_type'] =='2'){
                $data['party_detail'] = $this->db->query("SELECT * FROM PARTIES WHERE PHONE = '".$data['party_search']."'  ")->row();
            }
            if($data['party_search_type'] =='3'){
                $data['party_detail'] = $this->db->query("SELECT * FROM PARTIES WHERE MEMBERSHIP_ID = '".$data['party_search']."'  ")->row();
            }
            if($data['party_search_type'] =='4'){
                $party_id=$this->db->query("SELECT * FROM LOANS WHERE BILLNO = '".$data['party_search']."'  ")->row();
                $data['party_detail'] = $this->db->query("SELECT * FROM PARTIES WHERE PID = '".$data['party_search']."'  ")->row();
            }
            
        }
        else{
            $data['party_detail'] = $this->db->query("SELECT * FROM PARTIES WHERE PID = '".$data['party_search_id']."'  ")->row();
        }
        if(isset($data['party_detail']->PID)){

            $data['party_chit_master'] = $this->db->query("SELECT * FROM CHIT_MASTER WHERE party_id = '".$data['party_detail']->PID."'")->row();
            $data['party_chit_detail'] = $this->db->query("SELECT * FROM CHIT_LIST WHERE party_id = '".$data['party_detail']->PID."'  ORDER BY chit_date DESC ")->result_array();
            $pid = $data['party_detail']->PID;
            $part_sm_count = $this->db->query("SELECT COUNT(scheme_type) as sm_count FROM CHIT_LIST WHERE party_id = '".$pid."' AND scheme_type = '1' AND status = 'Y' ")->result_array();
            $part_tmc_count = $this->db->query("SELECT COUNT(scheme_type) as tmc_count FROM CHIT_LIST WHERE party_id = '".$pid."' AND scheme_type = '2' AND status = 'Y' ")->result_array();
            $part_tmg_count = $this->db->query("SELECT COUNT(scheme_type) as tmg_count FROM CHIT_LIST WHERE party_id = '".$pid."' AND scheme_type = '3' AND status = 'Y' ")->result_array();
                    $data['sm_count']  = $part_sm_count[0]['sm_count'];
                    $data['tmc_count'] = $part_tmc_count[0]['tmc_count'];
                    $data['tmg_count'] = $part_tmg_count[0]['tmg_count'];
        }

        $this->load->view('party_search/party_search_chit',$data);

    }
    // ***********************************************karupatti***********************************************************
    public function karupatti()
    {
     
        $data['party_search_type'] = $this->input->post('party_search_type');
        $data['party_search']      = $this->input->post('party_search');  
        $data['party_search_id']   = $this->input->post('party_search_id'); 


        if($data['party_search_id']==''){

            if($data['party_search_type'] =='2'){
                $data['party_detail'] = $this->db->query("SELECT * FROM PARTIES WHERE PHONE = '".$data['party_search']."'  ")->row();
            }

            if($data['party_search_type'] =='3'){

                $data['party_detail'] = $this->db->query("SELECT * FROM PARTIES WHERE MEMBERSHIP_ID = '".$data['party_search']."'  ")->row();
            }

            if($data['party_search_type'] =='4'){
                $party_id=$this->db->query("SELECT * FROM LOANS WHERE BILLNO = '".$data['party_search']."' AND LOAN_STATUS !=0 ")->row();
                $data['party_detail'] = $this->db->query("SELECT * FROM PARTIES WHERE PID = '".$data['party_search']."'  ")->row();
            }
            
        }
        else{
            $data['party_detail'] = $this->db->query("SELECT * FROM PARTIES WHERE PID = '".$data['party_search_id']."'  ")->row();
        }
        if(isset($data['party_detail'])){
            $pid=$data['party_detail']->PID;
        }
        else{
            $pid='';
        }
        
        $data['aks_list']= $this->db->query("SELECT * FROM AKS_SALE_ENTRY WHERE id_party= '".$pid."'  ORDER BY sale_id DESC")->result_array();

                $this->load->view('party_search/party_search_karupatti',$data);

            }
    // ***********************************************Realestate***********************************************************
    public function realestate()
    {
     
        $data['party_search_type'] = $this->input->post('party_search_type');
        $data['party_search'] = $this->input->post('party_search');  
        $data['party_search_id'] = $this->input->post('party_search_id'); 
        if($data['party_search_id']==''){

            if($data['party_search_type'] =='2'){
                $data['party_detail'] = $this->db->query("SELECT * FROM PARTIES WHERE PHONE = '".$data['party_search']."'  ")->row();
            }
            if($data['party_search_type'] =='3'){

                $data['party_detail'] = $this->db->query("SELECT * FROM PARTIES WHERE MEMBERSHIP_ID = '".$data['party_search']."'  ")->row();
            }
            if($data['party_search_type'] =='4'){
                $party_id=$this->db->query("SELECT * FROM LOANS WHERE BILLNO = '".$data['party_search']."'")->row();
                $data['party_detail'] = $this->db->query("SELECT * FROM PARTIES WHERE PID = '".$data['party_search']."'  ")->row();
            }    
        }
        else{
            $data['party_detail'] = $this->db->query("SELECT * FROM PARTIES WHERE PID = '".$data['party_search_id']."'  ")->row();
        }
        if(isset($data['party_detail'])){
            $party_id=$data['party_detail']->PID;
            $data['property_list'] = $this->db->query("SELECT * FROM realestate_purchase WHERE party_id='".$party_id."' AND  property_status='Existing' AND status='Y' ORDER BY id DESC ")->result_array();
            $data['Purchase_list'] = $this->db->query("SELECT * FROM realestate_purchase WHERE party_id='".$party_id."' AND  property_status='New' AND status='Y' ORDER BY id DESC  ")->result_array();
            $data['sale_list'] = $this->db->query("SELECT * FROM realestate_sale WHERE status='Y' AND party_id='".$party_id."' ORDER BY id DESC  ")->result_array();
        }
        else{
            $party_id='';
            $data['property_list'] = [];
            $data['Purchase_list'] = [];
            $data['sale_list']     = [];
        }
        $data['sel_realestate_type']=$loan_type=$this->input->post('sel_realestate_type');
        if($data['sel_realestate_type']=='')
        {
            $data['sel_realestate_type']=='purchase';
        }
        $this->load->view('party_search/party_search_realestate',$data);

    }
    // ***********************************************membership***********************************************************
    public function membership()
    {
     
        $data['party_search_type'] = $this->input->post('party_search_type');
        $data['party_search']      = $this->input->post('party_search');  
        $data['party_search_id']   = $this->input->post('party_search_id'); 
        if($data['party_search_id']==''){
            if($data['party_search_type'] =='2'){
                $data['party_detail'] = $this->db->query("SELECT * FROM PARTIES WHERE PHONE = '".$data['party_search']."'  ")->row();
            }
            if($data['party_search_type'] =='3'){

                $data['party_detail'] = $this->db->query("SELECT * FROM PARTIES WHERE MEMBERSHIP_ID = '".$data['party_search']."'  ")->row();
            }
            if($data['party_search_type'] =='4'){
                $party_id=$this->db->query("SELECT * FROM LOANS WHERE BILLNO = '".$data['party_search']."'  ")->row();
                $data['party_detail'] = $this->db->query("SELECT * FROM PARTIES WHERE PID = '".$data['party_search']."'  ")->row();
            }
            
        }
        else{
            $data['party_detail'] = $this->db->query("SELECT * FROM PARTIES WHERE PID = '".$data['party_search_id']."'  ")->row();
        }
        if(isset($data['party_detail'])){
           $pid=$data['party_detail']->PID;
           $data['membership']=$this->db->query("SELECT c.*,p.NAME FROM MEMBERSHIP_HISTORY c,PARTIES p WHERE c.PID = '".$pid."' and c.PID=p.PID order by c.LOG_DATE desc")->result_array();
        }
        else{
            $party_id='';
             $data['membership']=[];
        }
        $this->load->view('party_search/party_search_membership',$data);

    }
    // ***********************************************rating_history***********************************************************
    public function rating_history()
    {
     
        $data['party_search_type'] =$this->input->post('party_search_type');
        $data['party_search'] =$this->input->post('party_search');  
        $data['party_search_id'] =$this->input->post('party_search_id'); 
        if($data['party_search_id']==''){
            if($data['party_search_type'] =='2'){
                $data['party_detail'] = $this->db->query("SELECT * FROM PARTIES WHERE PHONE = '".$data['party_search']."'  ")->row();
            }
            if($data['party_search_type'] =='3'){

                $data['party_detail'] = $this->db->query("SELECT * FROM PARTIES WHERE MEMBERSHIP_ID = '".$data['party_search']."'  ")->row();
            }
            if($data['party_search_type'] =='4'){
        $party_id=$this->db->query("SELECT * FROM LOANS WHERE BILLNO = '".$data['party_search']."'  ")->row();
                $data['party_detail'] = $this->db->query("SELECT * FROM PARTIES WHERE PID = '".$data['party_search']."'  ")->row();
            }
            
        }
        else{
            $data['party_detail'] = $this->db->query("SELECT * FROM PARTIES WHERE PID = '".$data['party_search_id']."'  ")->row();
        }
        if(isset($data['party_detail'])){
           $pid=$data['party_detail']->PID;
           $data['rating_list'] = $this->db->query("SELECT c.*,p.NAME FROM CUSTOMER_RATING_HISTORY c,PARTIES p WHERE c.PID = '".$pid."' and c.PID=p.PID order by c.CREATED_ON desc")->result_array();
        }
        else{
            $party_id='';
            $data['rating_list']=[];
        }

        $this->load->view('party_search/party_search_rating_history',$data);

    }



    public function userList()
    {

      $type   =  $_GET['type'];
      $search =  $_GET['query']; 
      if($type=='1'){
        $rows   =  $this->Party_search_model->getUsers($search);
      }
      elseif($type=='2'){
         $rows   =  $this->Party_search_model->getUsersPhone($search);
        }
      elseif($type=='3'){
        $rows   =  $this->Party_search_model->getUsersMembership($search);
        }
       elseif($type=='4'){
         $rows   =  $this->Party_search_model->getUsersLoans($search);
        }
      $res='[';

      if(count($rows)>0) {
        
        foreach($rows as $row )
        {
            $title='';
            $name='';
            $firstname=$row->NAME;
            $lastname=$row->LASTNAME_PREFIX.','.$row->FATHERSNAME;


            if($row->TYPE_OF_RECORD =='N'){
                $area = $this->db->query("SELECT * FROM AREA WHERE SNO = '".$row->AREA."'  ")->row();
                $area_name=$area ->AREANAME;
                $city = $this->db->query("SELECT * FROM CITY WHERE CITYID = '".$row->CITY."'  ")->row();
                $city_name=$city->CITYNAME;
                $village = $this->db->query("SELECT * FROM VILLAGE WHERE VILLAGEID = '".$row->ADDRESS2."' ")->row();
                $village_name=$village->VILLAGENAME;
            }
            else{
                $area_name=$row->AREA;
                $city_name=$row->CITY;
                $village_name=$row->ADDRESS2;
            }

           $address=$village_name.', '.$city_name.', '.$area_name;
           $member_id=$row->MEMBERSHIP_ID;
           $member_points=$row->MEMBERSHIP_POINTS;

          $membership_card = $this->db->query("SELECT * FROM MEMBERSHIP_CARD WHERE PID = '".$row->PID."'  ")->row();

          if(isset($membership_card)){
            $card_type=$membership_card->CARD_TYPE;
            $card_no=$membership_card->MEMBERSHIP_NO;
              }
              else{
                  $card_type='';
                  $card_no='';
              }
            
           $rating=$row->RATING;
            $phone=$row->PHONE;
           
            // $title = $firstname.'&emsp;'.'-'.'&emsp;'.$lastname.'&emsp;'.'-'.'&emsp;'.$address.'&emsp;'.'-'.'&emsp;'.$phone;
            $title = $firstname.'   --   '.$lastname.'   --   '.$phone.' --   '.$card_no.'  --   '.$address;
            $res.='{ "title":"'.$title.'","id": "'.$row->PID.'","firstname":"'.$firstname.'","lastname":"'.$lastname.'","member_id":"'.$member_id.'","member_points":"'.$member_points.'","rating":"'.$rating.'","address":"'.$address.'","phone":"'.$phone.'","card_type":"'.$card_type.'"},';

           // $res.='{ "title":"'.$title.'","id": "'.$row->PID.'","firstname":"'.$firstname.'","lastname":"'.$lastname.'","address":"'.$address.'","phone":"'.$phone.'"},';

        //    $res.='{ "title":"'.$title.'","id": "'.$row->PID.'","firstname":"'.$firstname.'","lastname":"'.$lastname.'","rating":"'.$rating.'","address":"'.$address.'","phone":"'.$phone.'"},';
        }
        $res=rtrim($res,',');
        $res.=']';
      }
      else{
        $res.=']';
      }
      print_r($res);die();
    }

    public function loan_receipt_view()
    {
        $lid =$bill_no= $_POST['b_no'];
        $rid =$receipt_no= $_POST['r_no'];
      
        
        $data['receipt_sno']=$rid;
        $loan_details = $this->Party_search_model->get_loan_by_loan_id($lid);
        // $data['loan_details'] = $this->Loan_model->get_loan_by_loan_id($lid);
        $data['lbl_name']="<i class='fa fa-user fs-6' aria-hidden='true' title=' Name'></i>&emsp;". $loan_details->NAME;

        $party_address=$this->db->query("select * from PARTIES WHERE PID='".$loan_details->PID."'")->row();
        $data['status_details']=$this->db->query("select * from LOAN_STATUS WHERE id='".$loan_details->LOAN_STATUS."'")->row();
        // $addr=$party_address->ADDRESS1.", ".$party_address->ADDRESS2.", ".$party_address->CITY.".";
         // $addr=$party_address->ADDRESS1.", ".$party_address->ADDRESS2.", ".$party_address->CITY.".";
         // $data['lbl_address'] = "<i class='fa-solid fa-location-dot fs-6' aria-hidden='true' title='Address'></i>&emsp;".$party_address->ADDRESS2." &nbsp; <span><i class='fas fa-info-circle fs-6' title='".$addr."'></i></span>";
         // $data['lbl_phone']= "<i class='fas fa-mobile-android-alt fs-6' aria-hidden='true' title='Mobile'></i> &emsp;".$party_address->PHONE;
         $data['bill_no']=$loan_details->BILLNO;
         $str="<span><i class='fa-solid fa-star fs-6' style=' ";
          if($party_address->RATING == 3){ $str.= "color:#50cd89;'>";}
          else if($party_address->RATING == 2){$str.= "color:#ffc700;'>";}
          else if($party_address->RATING == 1){$str.= "color:red;'>";}
          else{$str.= "color:#d2d4dc;'>";}
        $str.="</i></span>&nbsp;";
          if($party_address->RATING == 3){$str.= 'Good';}
          else if($party_address->RATING == 2){$str.= 'Average';}
          else if($party_address->RATING == 1){$str.= 'Bad';}
          else{$str.= '-';}
         $data['lbl_rating']=$str;

            // if (is_null($loan_details->NOMINEE_ID))
            // {
            //   $str= "--";
            // }
            // else
            // {
            // $nominee_details=$this->db->query("select * from NOMINEE where NOMINEE_ID=".$loan_details->NOMINEE_ID)->row();
            // if(is_null($nominee_details))
            // {
            //   $str= "--";
            // }
            // else
            // {
            //   $str= $nominee_details->NOMINEE_NAME." - ".$nominee_details->RELATION." - ".$nominee_details->MOBILE_NO;
            // }
            // }

            // $str1=$str."&nbsp; <span><i class='fas fa-info-circle fs-6' title='".$str."'></i></span>";
            // $data['span_nominee'] =$str1;
          if($party_address->PHOTO!='')
         {
         $div='<img src="data:image/jpg;charset=utf8;base64,'.base64_encode($party_address->PHOTO).'"  height="125px" width="125px">';
         }
         else
         {
          $div='<img src="'.base_url().'assets/images/party.jpg" height="125px" width="125px" >';
         }
         $data['div_party_photo']= $div;

         if(isset($loan_details->COMPANYCODE))
          {
          $comp=$this->db->query("select * from COMPANY WHERE COMPANYCODE='".$loan_details->COMPANYCODE."'")->row();
          $data['lbl_companycode'] =$comp->COMPANYNAME;
          }
          else
            {
              $data['lbl_companycode'] = $loan_details->COMPANYCODE;
            }

            $data['lbl_interest_type'] =$loan_details->INTERESTTYPE;

            $receipt_detail=$this->db->query("select top 1 * from RECEIPT_MASTER where BILLNO='".$loan_details->BILLNO."' order by ROWNO desc")->row();
              if(isset($receipt_detail->ROWNO))
              {
                  $data['row_no']=$receipt_detail->ROWNO+1;
                  $ln_dt = $receipt_detail->RECEIPT_DATE;
                  $month_number = date("d-M-Y",strtotime($ln_dt));
                  $data['last_receipt_date'] = $month_number;
                  
              }
              else
              {
                $data['row_no']=1;  
                // $data['lt_recetpt_date'] = $this->Loanreceipt_model->get_loan_receipts_details($bill_no);
                  $ln_dt = $loan_details->ENDATE;
                  $month_number = date("d-M-Y",strtotime($ln_dt));
                  $data['last_recetpt_date'] = $month_number;
                 
              }
                      
            // $data['loan_receipts_details']=$this->Loanreceipt_model->get_loan_receipts_details($bill_no);
              if ($ln_dt == $loan_details->ENDATE) 
              {
                  $endate = $loan_details->ENDATE;
                  $sd = $endate.' '.'00:00:00';
                  $e = date("Y-m-d");
                  $ed = $e.' '.'00:00:00';

                  $start = new DateTime($sd);
                  $end = new DateTime($ed);
                  $diff = $start->diff($end);

                  $yearsInMonths = $diff->format('%r%y') * 12;
                  $months = $diff->format('%r%m');
                  $days = $diff->format('%r%d');
                  $totalMonths = $yearsInMonths + $months;
                  $months1 = $totalMonths;
                  $days1 = $days;
                  
              }
              else
              {
                  $endate = $receipt_detail->RECEIPT_DATE;
                  $sd = $endate.' '.'00:00:00';
                  $e = date("Y-m-d");
                  $ed = $e.' '.'00:00:00';

                  $start = new DateTime($sd);
                  $end = new DateTime($ed);
                  $diff = $start->diff($end);

                  $yearsInMonths = $diff->format('%r%y') * 12;
                  $months = $diff->format('%r%m');
                  $days = $diff->format('%r%d');
                  $totalMonths = $yearsInMonths + $months;
                  $months1 = $totalMonths;
                  $days1 = $days;
                
              }
              
               $vIntType = $loan_details->INTERESTTYPE;
              $vCalcDate=date('Y-m-d');
              $vLoanDate = $loan_details->ENDATE;
              $vLoanPeriod = $loan_details->MONTHS;

             if(substr($vIntType, 0,2)=="F-")
              {
                  $data['vLoanLastDate']=date('Y-m-d',strtotime($vLoanDate."+50 Days"));
              }
              elseif(substr($vIntType, 0,2)=="H-")
              {
                  $data['vLoanLastDate']=date('Y-m-d',strtotime($vLoanDate."+100 Days"));
              }
              else
              {
                  $data['vLoanLastDate']=date('Y-m-d',strtotime($vLoanDate.' +'.$vLoanPeriod.' months'));
              }

              if($data['vLoanLastDate'] < $vCalcDate)
              {
                // $data['lblODStatus']="OVER DUE";

              $data['due_status']="<label class='col-form-label fw-bold fs-5 bg-danger' style='border-radius: 8px;padding: 5px 10px 5px 10px;'  >OverDue</label>";

              }
              else
              {
                // $data['lblODStatus']="NORMAL";
                $data['due_status']="<label class='col-form-label fw-bold fs-5 bg-success' style='border-radius: 8px;padding: 5px 10px 5px 10px;'  >Normal</label>";
              }

              if(isset($loan_details->CLOSING_STATUS))
              {
                  $data['due_status']="<label class='col-form-label fw-bold fs-5 bg-success' style='border-radius: 8px;padding: 5px 10px 5px 10px;'  >Closed</label>";
              }
          $data['lbl_duration']= $months1." Months ". $days1." Days";
        //   print_r($data['lbl_duration']);exit;
          $data['lbl_loan_date']= date_format(date_create($loan_details->ENDATE),'d-m-Y'); 
          $result  = $this->db->query("SELECT * from INTERESTLIST where ACTIVE='Y' AND INTNAME='".$loan_details->INTERESTTYPE."'")->row();
           $ln_dt=$loan_details->ENDATE;
           if($result->LP_TYPE=='Days')
            { 
              $data['lbl_loan_exp_date']=date('d-m-Y', strtotime($ln_dt. ' +'.round($result->PERIOD).' days'));
             
            }
            if($result->LP_TYPE=='Months')
            {
              $data['lbl_loan_exp_date']=date('d-m-Y', strtotime($ln_dt. ' +'.round($result->PERIOD).' months'));
            }
            $data['lbl_loan_amt']= $loan_details->AMOUNT;

            $pl_info=$this->db->query("select * from PLEDGEINFO where BILLNO='".$loan_details->BILLNO."'")->result_array();
            $data['lbl_pledge_count'] =count((array)$pl_info);
            $data['lbl_net_weight']=$loan_details->NETWEIGHT;

            if($loan_details->ITEM_PHOTO!='')
             {
              $div='<img src="data:image/jpg;charset=utf8;base64,'.base64_encode($loan_details->ITEM_PHOTO).'"  height="125px" width="125px">';
             }
             else
             {
                $div='<img src="'.base_url().'assets/images/jewel.jpg" height="125px" width="125px" >';
             }
             $data['div_jewel_photo']=$div;

             $receipt_details= $this->db->query("select * from RECEIPT_MASTER where BILLNO='".$bill_no."'")->result_array();
          // $loan_details=$this->db->query("select * from LOANS where BILLNO='".$bill_no."'")->row();
          // $loan_details->
             $data['lbl_receipt_count']=(isset($receipt_details))?count((array)$receipt_details):'-';
             $last_receipt=$this->db->query("SELECT TOP 1 * FROM RECEIPT_MASTER where BILLNO='".$bill_no."' order by RECEIPT_DATE desc")->row();
            $data['lbl_last_receipt_date']=(isset($last_receipt))?$last_receipt->RECEIPT_DATE:'-';
            $receipt_res=$this->db->query("SELECT * from RECEIPT_MASTER where BILLNO='".$lid."' AND RECEIPT_SNO='".$rid."'")->row();
            $charged=($receipt_res->MAINTAINCHARGE+$receipt_res->FORMCHARGE+$receipt_res->NOTICECHARGE-$receipt_res->DISCOUNT);
            $data['paid_amount']=(isset($receipt_res))?$receipt_res->PAIDAMOUNT:'0';
            $data['net_payable']=(isset($receipt_res))?($receipt_res->NETPAYABLE+$charged):'0';
            $data['payment_net_payable']=(isset($receipt_res))?$receipt_res->NETPAYABLE:'0';
            $data['lbl_maintain_charge']=(isset($receipt_res))?$receipt_res->MAINTAINCHARGE:'0';
            $data['lbl_notice_charge']=(isset($receipt_res))?$receipt_res->NOTICECHARGE:'0';
            $data['lbl_form_missing']=(isset($receipt_res))?$receipt_res->FORMCHARGE:'0';
            $data['lbl_discount']=(isset($receipt_res))?$receipt_res->DISCOUNT:'0';
            $data['lbl_ded_mem_card']=(isset($receipt_res))?$receipt_res->DEDUCT_MEM_CARD:'0';
            $data['lbl_hl_amount']=(isset($receipt_res))?$receipt_res->HL_AMOUNT:'0';

            $data['lbl_total_charge']=$data['lbl_maintain_charge']+$data['lbl_form_missing']+$data['lbl_notice_charge'];

            $data['deduct']=$data['lbl_discount']+$data['lbl_ded_mem_card'];
            $data['lbl_finalised_charge']= $data['lbl_total_charge']-$data['deduct'];

            $mem_points=$this->db->query("select * from  MEMBERSHIP_HISTORY where BILLNO='".$rid."'")->row();
            $data['lbl_mem_points_add']=(isset($mem_points))?$mem_points->POINTS_EARNED:'0';

            $cust_rating=$this->db->query("select * from  CUSTOMER_RATING_HISTORY  where BILLNO='".$rid."'")->row();
            if(isset($cust_rating))
            {
              if($cust_rating->RATING==3) $data['rating']='Good';
              else if($cust_rating->RATING==2) $data['rating']='Average';
              else if($cust_rating->RATING==1) $data['rating']='Bad';

            }
            else
            {
              $data['rating']="Nil";
            }
             $vLoanPeriod = $loan_details->MONTHS;
            $vIntType = $loan_details->INTERESTTYPE;
            
            $vLoanAmount=$loan_details->AMOUNT;
            $vLoanIntPercent=$loan_details->INTEREST;
            $vPaidPrincipal=$loan_details->PAIDPRINCIPAL;
            $vPaidInterest=$loan_details->PAIDINTEREST;
            $vPaidTotal = $vPaidPrincipal + $vPaidInterest;
            $vLoanBalance = $loan_details->BALANCE;
            $vLoanDate = $loan_details->ENDATE;
            $vCalcDate=date('Y-m-d');
            $calc_date=date('Y-m-d');
            $vIntStr="";
            $vFInt = 0;
            $vSInt = 0;
            $vTotalInt = 0;
             $data['txtPrincipal']=0;


            if(substr($vIntType, 0,2)=="F-")
            {
                $data['vLoanLastDate']=date('Y-m-d',strtotime($vLoanDate."+50 Days"));
            }
            elseif(substr($vIntType, 0,2)=="H-")
            {
                $data['vLoanLastDate']=date('Y-m-d',strtotime($vLoanDate."+100 Days"));
            }
            else
            {
                $data['vLoanLastDate']=date('Y-m-d',strtotime($vLoanDate.' +'.$vLoanPeriod.' months'));
            }
          
           if($data['vLoanLastDate'] < $vCalcDate)
           {
                
                $data['receipt_details'] = $this->Loanreceipt_model->get_receipt_details1($bill_no,$rid);

                
                if(is_null($data['receipt_details']))
                {
                    $d1 = new DateTime($calc_date);
                    $d2 = new DateTime($vLoanDate);
                    $interval = $d1->diff($d2);
                    $data['diffInSeconds'] = $interval->s; 
                    $data['diffInMinutes'] = $interval->i; 
                    $data['diffInHours']   = $interval->h; 
                    $data['diffInDays']    = $interval->d; 
                    $data['diffInMonths']  = $interval->m; 
                    $data['diffInYears']   = $interval->y;
                    $vChkReceipts=$this->Loanreceipt_model->check_receipt_entry($bill_no);
                    $vChkRevised=false;
                    $vChkOD = False;
                    
                }
                else
                {
                    $d1 = new DateTime($data['receipt_details']->REVISED_DATE);
                    $d2 = new DateTime($vLoanDate);
                    $interval = $d1->diff($d2);
                    $data['diffInSeconds'] = $interval->s; 
                    $data['diffInMinutes'] = $interval->i; 
                    $data['diffInHours']   = $interval->h; 
                    $data['diffInDays']    = $interval->d; 
                    $data['diffInMonths']  = $interval->m;
                    
                    $data['diffInYears']   = $interval->y;
                    $vChkReceipts=$this->Loanreceipt_model->check_receipt_entry($bill_no);

                    if($data['receipt_details']->CHK_REVISED =='Y')
                    {
                        $vChkRevised=true;
                    }
                    else
                    {
                        $vChkRevised=false;
                    }
                   
                }
                $vYear=$data['diffInYears'];
                $vMonths2=$data['diffInMonths'] +($vYear * 12);
                $vDays2=$data['diffInDays'];
                //  $vMonths =$data['diffInMonths'];
                // $vDays1=$data['diffInDays'];
                $vMonths2 =$data['diffInMonths'];
                $vDays2=$data['diffInDays'];


                $vFullDays = $data['diffInDays'];
                $vFullDays2 = $vFullDays;

                if($vChkReceipts==true)
                {
                    $vMaxNo = $this->Loanreceipt_model->get_max_receipt_no($bill_no);
                    $data['receipt_row_details']=$this->Loanreceipt_model->get_receipt_rowno($bill_no,$vMaxNo);
                    if($data['receipt_row_details']->CHK_OD=='Y')
                    {
                        $vChkOD = True;
                    }
                    else
                    {
                        $vChkOD = False;
                    }
                    $data['txtPaidInterest'] = $loan_details->PAIDINTEREST;
                    $data['txtPaidPrincipal'] = $loan_details->PAIDPRINCIPAL;
                    $data['txtPaidTotal']= $data['txtPaidPrincipal'] + $data['txtPaidInterest'];

                    if($data['receipt_row_details']->CHK_REVISED=='Y')
                    {
                        $vChkRevised = True;
                        $vRevisedInt=$data['receipt_row_details']->REVISED_INT;
                        $vRevisedDate=$data['receipt_row_details']->REVISED_DATE;
                        $vLoanDate = $vRevisedDate;
                    }
                    else
                    {
                        $vChkRevised = False;
                    }
                }

                    $d1 = new DateTime($calc_date);
                    $d2 = new DateTime($vLoanDate);
                    $interval = $d1->diff($d2);
                    $data['diffInSeconds'] = $interval->s; 
                    $data['diffInMinutes'] = $interval->i; 
                    $data['diffInHours']   = $interval->h; 
                    $data['diffInDays']    = $interval->d; 
                    $data['diffInMonths']  = $interval->m; 
                    $data['diffInYears']   = $interval->y;

                    $vYear = $data['diffInYears'];
                    $vMonths = $data['diffInMonths']+ ($vYear * 12);
                    $vDays1 = $data['diffInDays'];

                 $vExtraMonths = $vMonths - $vLoanPeriod;
                if ($vChkRevised == true) {$vExtraMonths = $vMonths; }
                $vExtraMonths1 = $vExtraMonths;
                $vExtraDays = $vDays1;
                // $vExtraDays = $vDays1+1;
                
                $vFullDays = $data['diffInDays'];
                if ($vChkRevised == false){ $vFullDays = $vFullDays - $vLoanPeriod ;}
                $vExtraFdays = $vFullDays;
                $vExtraFdays2 = $vExtraFdays;
                
                
                if($vExtraDays>0 && $vExtraDays<=7)
                {
                    $vIntDays=0.25;
                    $vIntMonths=0.25;
                }
                elseif($vExtraDays>=8 && $vExtraDays<=15)
                {
                    $vIntDays=0.5;   
                    $vIntMonths=0.5;
                }
                elseif($vExtraDays>=16 && $vExtraDays<=23)
                {
                    $vIntDays=0.75;   
                    $vIntMonths=0.75;
                }
                elseif($vExtraDays>=24 && $vExtraDays<=31)
                {
                    $vIntDays=1;   
                    $vIntMonths=1;
                }
                else
                {
                    $vIntDays=0; 
                    $vIntMonths=0; 
                }
                // if($data['diffInMonths']>0)
                // {
                //     $data['IntMonths']=$data['diffInMonths']+$vIntDays;
                // }
                // else
                // {
                //     $data['IntMonths']=$loan_details->MONTHS+$vIntDays;   
                // }

                $vTotalInt =0;
                 $vCurrentIntPercent = $loan_details->INTEREST;
                $vNewP = $loan_details->AMOUNT + ($loan_details->AMOUNT * $loan_details->MONTHS * $loan_details->INTEREST / 100);
                $vNewP2 = $vNewP;
                $vNewPrincipal = $vNewP;

                 $vFInt = ($vLoanAmount * $vLoanPeriod * $vLoanIntPercent / 100);
                $vTotalInt = $vTotalInt + $vFInt;

                if(substr($vIntType, 0,2)=="F-" or substr($vIntType, 0,2)=="H-")
                {
                    $vTotalInt=0;
                    $vPerDayInterest =$vLoanAmount * $loan_details->INTEREST / 3000;
                    $vNewP = $loan_details->AMOUNT + $loan_details->MONTHS * $vPerDayInterest;
                    $vNewP2 = $vNewP;
                    $vNewPrincipal = $vNewP;

                     $vFInt = $loan_details->MONTHS * $vPerDayInterest;
                    $vTotalInt = round($vTotalInt) + $vFInt;
                }
                if($vChkReceipts==true && $vChkOD==false)
                {
                    $vMaxNo = $this->Loanreceipt_model->get_max_receipt_no($bill_no);
                    $interest_details=$this->Loanreceipt_model->get_paid_receipt_details($bill_no,$vChkOD,$vLoanPeriod, $vLoanIntPercent);
                    
                    $data['txtcalculation']=$interest_details;
                    $vIntStr=$vIntStr.$interest_details;


                    if(substr($vIntType, 0,2)=="F-" or substr($vIntType, 0,2)=="H-")
                    {
                        // $vIntStr=$vIntStr."<tr>"."Principal : " .number_format($loan_details->AMOUNT,2). "Int : ".number_format(($loan_details->AMOUNT+$vFInt ),2)." Paid : ".number_format(($vPaidPrincipal+$vPaidInterest),2)." Bal : ".number_format(($vLoanAmount+$vFInt-$vPaidTotal),2)." Period : ".$vLoanPeriod." Days". " Rate : ".number_format($vLoanIntPercent,2)."</tr>";
                         $vIntStr=$vIntStr."<tr><td></td><td></td><td>".number_format($vLoanIntPercent,2)."</td><td>".number_format(round($loan_details->AMOUNT,2),2)."</td><td>".number_format(round(($loan_details->AMOUNT+$vFInt),2),2)."</td><td>".number_format(($vPaidPrincipal+$vPaidInterest),2)."</td><td>".number_format(($vLoanAmount+$vFInt-$vPaidTotal),2)."</td></tr>";
                        $vPerDayInterest=$vLoanAmount*10/10000;
                        $vNewP=$vLoanAmount+($vLoanPeriod * $vPerDayInterest) - $vPaidTotal;
                        $vNewP2=$vNewP;
                        $vNewPrincipal=$vNewP;
                    }
                    else
                    {
                        // $vIntStr = $vIntStr ."<tr>". "Principal : ".number_format($vLoanAmount,2). " Int : ". number_format($vFInt,2). " Tot : ".number_format(($vLoanAmount+$vFInt),2)." Paid : ".number_format(($vPaidPrincipal+$vPaidInterest),2)." Bal : ".number_format(($vLoanAmount+$vFInt-$vPaidTotal),2). " Period : ".number_format($vLoanPeriod,2)." Months "." Rate : ". number_format($vLoanIntPercent,2)."</tr>";
                       $vIntStr = $vIntStr ."<tr><td></td><td></td><td>".number_format($vLoanIntPercent,2)."</td><td>".number_format(round($vLoanAmount,2),2)."</td><td>".number_format(round($vFInt,2),2)."</td><td>".number_format(($vPaidPrincipal+$vPaidInterest),2)."</td><td>".number_format(($vLoanAmount+$vFInt-$vPaidTotal),2)."</td></tr>";

                        $vNewP = $vLoanAmount + ($vLoanAmount * $vLoanPeriod * $vLoanIntPercent / 100) - $vPaidTotal;
                        $vNewP2 = $vNewP;
                        $vNewP3 = $vNewP;
                        $vNewPrincipal = $vNewP;
                    }
                }
                else if ($vChkReceipts==true && $vChkOD==true)
                {
                    $interest_details=$this->Loanreceipt_model->get_paid_receipt_details($bill_no,$vChkOD,$vLoanPeriod, $vLoanIntPercent);

                    $data['txtcalculation']=$interest_details;
                    $vIntStr=$vIntStr.$interest_details;
                    $vCurrentIntPercent = $vRevisedInt - 0.5;
                    $vNewP = $vLoanBalance;
                    $vNewP2 = $vNewP;
                    $vNewP3 = $vNewP;
                    $vNewPrincipal = $vNewP;
                    $vTotalInt = 0;

                }
                else
                {
                    if(substr($vIntType, 0,2)=="F-" or substr($vIntType, 0,2)=="H-")
                    {
                        // $vIntStr= "<tr>"."Principal : ". number_format($vLoanAmount,2). " Int : ".number_format($vFInt,2). " Tot : ".number_format(($vLoanAmount + $vFInt),2). " Period : ".number_format($vLoanPeriod,2)." days "." Rate : ". number_format($vLoanIntPercent,2) . "</tr>";
                      $vIntStr= "<tr><td></td><td> - </td><td>".number_format($vLoanIntPercent,2)."</td><td>".number_format(round($vLoanAmount,2),2)."</td><td>".number_format(round($vFInt,2),2)."</td><td>0.00</td><td>".number_format(($vLoanAmount + $vFInt),2)."</td></tr>";
                    }
                    else
                    {
                       // $vIntStr ="<tr>"."Principal : " . number_format($vLoanAmount,2). " Int : " . number_format($vFInt,2). " Tot : " . number_format(($vLoanAmount + $vFInt),2) . " Period : " .number_format( $vLoanPeriod,2). " Months". " Rate : " . number_format($vLoanIntPercent,2)."</tr>";
                      $vIntStr= "<tr><td></td><td> - </td><td>".number_format($vLoanIntPercent,2)."</td><td>".number_format(round($vLoanAmount,2),2)."</td><td>".number_format(round($vFInt,2),2)."</td><td>0.00</td><td>".number_format(($vLoanAmount + $vFInt),2)."</td></tr>";
                        
                    }

                }
                if (substr($vIntType, 0,2)!="F-" or substr($vIntType, 0,2)!="H-")
                {
                    $vPenalMonths = 3;
                    if($vExtraMonths>0 )
                    {
                         $j = $vExtraMonths / $vPenalMonths;
                        $M = round($j);
                        if ($M == 0) {$M=1;}
                        for($k=1; $k<=$M; $k++)
                        {
                            $N = fmod($vExtraMonths, $vPenalMonths);
                            if( $vExtraMonths >= $vPenalMonths){
                                $p=$vPenalMonths;
                            }
                            else
                            {
                                $p=$N;
                            }
                            
                            if ($vCurrentIntPercent <= 3.5){
                                $GetNewIntPercent = $vCurrentIntPercent + 0.5;
                            }
                            else
                            {
                                $GetNewIntPercent = 3.5;
                            }
                            if ($GetNewIntPercent >= 3.5){
                                $GetNewIntPercent = 3.5;
                            }
                            
                            $vCalcInt = $GetNewIntPercent;
                            $vCurrentIntPercent = $vCalcInt;
                            
                            $vSInt = ($vNewP * $p * $vCalcInt / 100);
                            $vTotalInt = round($vTotalInt) + $vSInt;
                            // $vIntStr = $vIntStr . " Int : " . number_format($vSInt,2). " Tot : ".number_format(($vNewP + $vSInt),2). " Period : " . $p. " Mnths" . " Rate : " .number_format($vCalcInt,2)."</tr>" ;
                            $vIntStr = $vIntStr ."<tr><td></td><td> - </td><td>".number_format($vCalcInt,2)."</td><td>". round($vNewP,2)."</td><td>".number_format(round($vSInt,2),2)."</td><td>0.00</td><td>".number_format(($vNewP + $vSInt),2)."</td></tr>";

                            $vNewP2 = $vNewP2 + ($vNewP * $p * $vCalcInt / 100);
                            if($vExtraMonths >= $vPenalMonths)
                            {
                                $vNewPrincipal = $vNewP2;
                            }
                            else
                            {
                                $vNewPrincipal = $vNewP;
                            }
                            
                            $vExtraMonths = $vExtraMonths - $p;
                            $vNewP = $vNewP2;
                        }
                    }
                    if($vExtraDays>0)
                    {
                        if (fmod($vExtraMonths1,$vPenalMonths) == 0 )
                        {
                            if ($vCurrentIntPercent <= 3.5){
                                $GetNewIntPercent = $vCurrentIntPercent + 0.5;
                            }
                            
                            if ($GetNewIntPercent >= 3.5){
                                $GetNewIntPercent = 3.5;
                            }
                            $vCalcInt = $GetNewIntPercent;
                            $vIntforBaldays = $vNewPrincipal * $vIntMonths * $vCalcInt / 100;
                            $vTotalInt = round($vTotalInt) + $vIntforBaldays;

                            // $vIntStr = $vIntStr . "<tr>"."Principal : " . number_format($vNewP2,2) . " Int : " . number_format($vIntforBaldays,2). " Tot : " .number_format(($vNewP2 + $vIntforBaldays),2) . " Period : " . $vExtraDays. " days". " Rate : " . number_format($vCalcInt,2)."</tr>";

                            $vIntStr = $vIntStr . "<tr><td></td><td> - </td><td>". number_format($vCalcInt,2)."</td><td>".number_format(round($vNewP2,2),2)."</td><td>".number_format(round($vIntforBaldays,2),2)."</td><td>0.00</td><td>".number_format(($vNewP2 + $vIntforBaldays),2)."</td></tr>";
                        }
                        else
                        {
                            $vIntforBaldays = $vNewPrincipal * $vIntMonths * $vCalcInt / 100;
                            $vTotalInt = round($vTotalInt) + $vIntforBaldays;
                            // $vIntStr = $vIntStr . "<tr>". "Principal : " . number_format($vNewPrincipal,2). " Int : " .number_format($vIntforBaldays,2). " Tot : ". number_format(($vNewP2 + $vIntforBaldays),2) . " Period : " . $vExtraDays. " days" . " Rate : " . number_format($vCalcInt,2). "</tr>";
                              $vIntStr = $vIntStr . "<tr><td></td><td> - </td><td>". number_format($vCalcInt,2)."</td><td>".number_format(round($vNewPrincipal,2),2)."</td><td>".number_format(round($vIntforBaldays,2),2)."</td><td>0.00</td><td>".number_format(($vNewP2 + $vIntforBaldays),2)."</td></tr>";
                        }
                    }
                    else
                    {
                        $vIntforBaldays = 0;
                        $vTotalInt = round($vTotalInt) + $vIntforBaldays;
                    }

                }

                if (substr($vIntType, 0,2)=="F-" or substr($vIntType, 0,2)=="H-")
                {
                    if ($vExtraFdays > 0)
                    {
                        $j = $vExtraFdays / $vLoanPeriod;
                        $M = round($j);
                        for($k=1; $k<=$M; $k++)
                        {
                            $N = fmod($vExtraFdays, $vLoanPeriod);
                            if ($vExtraFdays >= $vLoanPeriod){
                                $p = $vLoanPeriod;
                            }
                            else{
                                $p = $N;
                            }
                           
                            if ($vCurrentIntPercent <= 3.5){
                                $GetNewIntPercent = $vCurrentIntPercent + 0.5;
                            }
                            
                            if ($GetNewIntPercent >= 3.5){
                                $GetNewIntPercent = 3.5;
                            }
                            $vCalcInt = $GetNewIntPercent;
                            $vCurrentIntPercent = $vCalcInt;
                            // $vIntStr = $vIntStr + "<tr>"."Principal : " + number_format($vNewP,2);
                            $vPerDayInterest = ($vNewP2 * $vCalcInt) / 3000;
                           
                            $vSInt = ($p * $vPerDayInterest);
                            $vTotalInt = round($vTotalInt) + $vSInt;
                            // $vIntStr = $vIntStr . " Int : " . number_format($vSInt,2). " Tot : ". number_format(($vNewP + $vSInt),2) . " Period : " . $p. " days". " Rate : ".number_format($vCalcInt,2)."</tr>";
                            $vIntStr = $vIntStr . "<tr><td></td><td> - </td><td>".number_format($vCalcInt,2)."</td><td>".number_format(round($vNewP,2),2)."</td><td>".number_format(round($vSInt,2),2)."</td><td>0.00</td><td>".number_format(($vNewP + $vSInt),2)."</td></tr>";
                            $vNewP2 = $vNewP2 + ($p * $vPerDayInterest);
                            if ($vExtraFdays >= $vLoanPeriod ){
                                $vNewPrincipal = $vNewP2;
                            }
                            else{
                                $vNewPrincipal = $vNewP;
                            }
                            $vExtraFdays = $vExtraFdays - $p;
                            $vNewP = $vNewP2;
                        }
                    }
                }

                $get_receipt_summary = $this->Loanreceipt_model->get_receipt_summary($bill_no, "INT"); 
                $data['txtPaidTotal']=0;
                $vTotalInterest = round($get_receipt_summary) + round($vTotalInt);

                $vTotalPaidAmount=$this->Loanreceipt_model->get_receipt_summary($bill_no, "PAIDAMOUNT");
                $vNetAmount = $vLoanAmount + $vTotalInterest - $vTotalPaidAmount;
                
                // $vIntStr = $vIntStr . "<tr>"."Total Period : " . $vMonths2 ." Months " . ($vDays2+1). " days"."</tr>";
                // $vIntStr = $vIntStr . "<tr>"."Loan Amount : " .number_format($vLoanAmount,2);
                $vIntStr = $vIntStr . "<tr><td></td><td></td><td><b>Total</b> </td> <td><b>".$vLoanAmount."</b></td><td> <b>" . number_format($vTotalInterest,2)."</b></td>";
                // $vIntStr = $vIntStr . "    Total Amount : " .number_format(($vLoanAmount + $vTotalInterest),2)."</td>";
                $vIntStr = $vIntStr ."<td><b>" .number_format($vTotalPaidAmount,2)."</b></td>";
                $vIntStr = $vIntStr ."<td><b>".number_format($vNetAmount,2)."</b></td></tr>";
                
                $data['vIntStr'] = $vIntStr;
                $data['lblODStatus']="OVER DUE";

                $data['IntMonths'] =($vMonths + $vIntMonths);
                
                if (substr($vIntType, 0,2)=="F-" or substr($vIntType, 0,2)=="H-")
                {
                    if($vChkOD==true)
                    {
                        $data['IntMonths']="Total : " .$vFullDays. " days";
                    }
                    else
                    {
                        $data['IntMonths']="Total : " .$vFullDays2. " days";
                    }
                    $data['diffInDays']=$vFullDays2." days";
                    $data['diffInMonths']=0;
                }  
                if($vChkReceipts==true and $vChkOD==false)
                {
                    $data['txtInterest'] = round($vTotalInt);
                }
                elseif($vChkReceipts=true && $vChkOD==true)
                {
                    $data['txtPrincipal']=$vLoanAmount;
                    $data['txtInterest']=$vTotalInterest;
                    $data['txtTotal']=$vLoanAmount+$vTotalInterest;
                    $data['txtPaidTotal']=$vTotalPaidAmount;
                    $data['txtTotalPay']=$data['txtTotal']-$data['txtPaidTotal'];
                } 
                elseif($vChkReceipts==false)
                {
                    $data['txtPrincipal']=$vLoanAmount;
                    $data['txtInterest']=round($vNewP2+$vIntforBaldays)-$vLoanAmount;
                }
                $data['txtTotal']=$data['txtPrincipal'] +$data['txtInterest'];
                $data['txtTotalPay']=$data['txtTotal'] -$data['txtPaidTotal'];
            }
            else
            {
                // $data['pledge_details'] = $this->Redemption_model->get_pledge_details($bill_no);
                 // $vIntStr = "";
                 if(strlen($vLoanDate)>7)
                 {
                    $d1 = new DateTime($vLoanDate);
                    $d2 = new DateTime($vCalcDate);
                    $interval = $d1->diff($d2);
                    $data['diffInSeconds'] = $interval->s; 
                    $data['diffInMinutes'] = $interval->i; 
                    $data['diffInHours']   = $interval->h; 
                    $data['diffInDays']    = $interval->d; 
                    $data['diffInMonths']  = $interval->m; 
                    $data['diffInYears']   = $interval->y;
                 }
                
                $vYear = $data['diffInYears'];
                $vMonths = $data['diffInMonths'];
                $vDays = $data['diffInDays'];
                $vFullDays = $data['diffInDays'];
                
                 $data['txtMonths'] = $vMonths;
                 $data['lbldays'] = $vDays;

                $data['txtPaidInterest'] = $loan_details->PAIDINTEREST;
                $data['txtPaidPrincipal'] = $loan_details->PAIDPRINCIPAL;
                $data['txtPaidTotal']= $data['txtPaidPrincipal']+$data['txtPaidInterest'];
                
                $vChkReceipts = $this->Loanreceipt_model->check_receipt_entry($bill_no);
                if($vChkReceipts == true)
                {
                    $vIntStr1= $this->Loanreceipt_model->get_paid_receipt_details1($bill_no);
                    $vIntStr=$vIntStr.$vIntStr1;

                }
                
                if($vMonths==0 && $vDays>=0)
                {
                    $vIntMonths=1;
                }
                else if($vMonths>0 && $vDays==0)
                {
                    $vIntMonths=$vMonths;
                }
                else if($vMonths>0 && $vDays>0)
                {
                    if($vDays>0 && $vDays<=7)
                    {
                        $vIntMonths=$vMonths+0.25;
                    }
                    else if($vDays>=8 && $vDays<=15)
                    {
                        $vIntMonths=$vMonths+0.5;
                    }
                    else if($vDays>=16 && $vDays<=23)
                    {
                        $vIntMonths=$vMonths+0.75;
                    }
                    else if($vDays>=24 && vDays<=31)
                    {
                        $vIntMonths=$vIntMonths+1;
                    }
                }
                
                // Dim vIntpercent As Single, vIntPerMonth As Single
                $data['lblTotalMonths']  = "Total : " . $vIntMonths;
                $vIntpercent = $loan_details->INTEREST/100;
                
                $data['lblODStatus']="NORMAL";
                $data['txtPrincipal'] = $vLoanAmount;
                $data['txtInterest'] = round($vLoanAmount*$vIntMonths*$vIntpercent);
                
                if (substr($vIntType, 0,2)=="F-" or substr($vIntType, 0,2)=="H-")
                {
                    $vPerDayInterest=$vLoanAmount*$vIntpercent/30;
                    if($vFullDays<30)
                    {
                        $data['txtInterest']=round(30*$vPerDayInterest);
                    }
                    else
                    {   
                        $data['txtInterest']=round($vFullDays*$vPerDayInterest);
                    }
                    $data['lbldays']=$vFullDays." days";
                    $data['lblTotalMonths']="Total : ".$vFullDays." days";
                    $data['txtMonths']="0";
                }           
                $data['txtTotal'] =$data['txtPrincipal']+$data['txtInterest'];
                $data['txtTotalPay']=$data['txtTotal']-$data['txtPaidTotal'];
                
                if (substr($vIntType, 0,2)=="F-" or substr($vIntType, 0,2)=="H-")
                {
                    $vIntStr = $vIntStr ."<tr>". "Principal: " .$vLoanAmount + " Daily Int : " + $vPerDayInterest."</tr>";
                    $vIntStr = $vIntStr . $vFullDays. " Days x " .$vPerDayInterest. " = " .$data['txtInterest'];
                    $vIntStr = $vIntStr. " Total: ".$data['txtPrincipal']. $data['txtInterest'];
                    $data['vIntStr'] = $vIntStr;
                }

                 else
                 {
                    $vIntPerMonth = $vLoanAmount * $vIntpercent;
                    // $vIntStr = $vIntStr ."<tr>". " Principal: ". $vLoanAmount . " Monthly Int : ".$vIntPerMonth."</tr>";
                    // $vIntStr = $vIntStr . " Interest : ".$vIntMonths. " Months x " .$vIntPerMonth. " = " .$data['txtInterest'];
                    // $vIntStr = $vIntStr . " Total: ".($data['txtPrincipal'] + $data['txtInterest']);
                    $vIntStr = $vIntStr . "<tr><td></td><td></td><td>".number_format($vIntPerMonth,2)."</td><td>".number_format(round($vLoanAmount,2),2)."</td><td>".number_format(round($data['txtInterest'],2),2)."</td><td>0.00</td><td>".number_format(($vLoanAmount + $data['txtInterest']),2)."</td></tr>";

                    $data['vIntStr'] = $vIntStr;
                 }
            }
            // $data['vTotalInterest']=$vTotalInterest;
            // $data['vTotalInterest']=$vTotalInt;
            // // $data['vTotalPaidAmount']=$vTotalPaidAmount;
            // $data['vPaidInterest']=$vPaidInterest;
            // $data['vPaidPrincipal']=$vPaidPrincipal;
            // $data['vLoanBalance']=$vLoanBalance;
            $res= $this->db->query("SELECT TOP 1 * FROM RECEIPT_MASTER where BILLNO='".$loan_details->BILLNO."' order by ADDED_TIME desc")->row();
            // $data['vNetAmount']=$vNetAmount;
             $data['span_prin_actl_amt'] =number_format($loan_details->AMOUNT,2);
             $data['span_prin_paid_amt']=number_format($vPaidPrincipal,2);
             $data['span_prin_bal_amt']=number_format($res->BALANCE,2);
             $int_amt=($loan_details->AMOUNT*$loan_details->INTEREST*$loan_details->MONTHS)/100;
             $data['span_intr_actl_amt']= number_format($int_amt,2);
             $data['span_intr_paid_amt']=number_format($vPaidInterest,2);
             $data['span_intr_bal_amt']=number_format(round($vTotalInt),2);

          //    $tbody_str="";
          //    foreach ($pl_info as $plist)
          //    {
          //       $sts=($plist['IS_DAMAGE']=='Y')?'Yes':'No';
          //        $tbody_str.="<tr><td>".$plist['PLEDGENAME']."</td><td>".$plist['DESCRIPTION']."</td><td>".$plist['PURITY']."</td><td>".$plist['PURITY']."</td><td>".$plist['WEIGHT']."</td><td>".$plist['STONEWEIGHT']."</td><td>".$plist['LESS']."</td><td>".$plist['NETWEIGHT']."</td><td>".$sts."</td><td><div class='image-input mt-2 me-6' data-kt-image-input='true'>
          //         <div class='image-input-wrapper w-40px h-40px'style='background-image: url(assets/images/jewel.jpg)'></div></div></td></tr>";
          //    } 
          // $data['tbody_fill']=$tbody_str;
          // $tfoot_str="<tr class='text-start text-muted fw-bold fs-4 gs-0'> <th class='min-w-150px'></th> <th class='min-w-100px'></th> <th class='min-w-80px'></th> <th class='min-w-80px'>Total</th> <th class='min-w-80px'>".$loan_details->WEIGHT."</th> <th class='min-w-100px'>".$loan_details->STONELESS."</th> <th class='min-w-80px'>".$loan_details->LESS."</th> <th class='min-w-80px'>". $loan_details->NETWEIGHT."</th> <th class='min-w-50px'></th> <th class='min-w-50px'></th></tr>";
          // $data['tfoot_str']=$tfoot_str;

             $pay_res=$this->db->query("select * from payment_inward_outward where bill_no='".$data['receipt_details']->RECEIPT_SNO."' ")->result_array();
             $pay_div="";
             foreach($pay_res as $plist)
             {
                if($plist['type_of_payment']=='Cash')
                {
                  $pay_div.='<div class="row">
                  <label class="col-lg-1 col-form-label fw-semibold fs-6">Cash</label>
                  <label class="col-lg-2 col-form-label fw-bold fs-5" >'.$plist['amount'].'</label>
                  <label class="col-lg-1 col-form-label fw-semibold fs-6">Details</label>
                  <label class="col-lg-2 col-form-label fw-bold fs-5" >'.$plist['remarks'].'</label>
                </div>';
                }
                if($plist['type_of_payment']=='Cheque')
                {
                  $pay_div.='<div class="row">
                  <label class="col-lg-1 col-form-label fw-semibold fs-6">Cheque</label>
                  <label class="col-lg-2 col-form-label fw-bold fs-5" >'.$plist['amount'].'</label>
                  <label class="col-lg-1 col-form-label fw-semibold fs-6">Party Bank</label>
                  <label class="col-lg-2 col-form-label fw-bold fs-5">'.$plist['company_bank'].'</label>
                  <label class="col-lg-1 col-form-label fw-semibold fs-6">Ref.No</label>
                  <label class="col-lg-2 col-form-label fw-bold fs-5">'.$plist['cheque_ref_no'].'</label>
                  <label class="col-lg-1 col-form-label fw-semibold fs-6">Details</label>
                  <label class="col-lg-2 col-form-label fw-bold fs-5" id="lbl_cheque_details">'.$plist['remarks'].'</label>
                </div>';
              }
              if($plist['type_of_payment']=='RTGS')
              {
                  $pay_div.='<div class="row">
                  <label class="col-lg-1 col-form-label fw-semibold fs-6">RTGS</label>
                  <label class="col-lg-2 col-form-label fw-bold fs-5" id="lbl_rtgs_paid">'.$plist['amount'].'</label>
                  <label class="col-lg-1 col-form-label fw-semibold fs-6">Ref.No</label>
                  <label class="col-lg-2 col-form-label fw-bold fs-5">'.$plist['cheque_ref_no'].'</label>
                  <label class="col-lg-1 col-form-label fw-semibold fs-6">Cmy.Bank</label>
                  <label class="col-lg-2 col-form-label fw-bold fs-5">'.$plist['company_bank'].'</label>
                  <label class="col-lg-1 col-form-label fw-semibold fs-6">Details</label>
                  <label class="col-lg-2 col-form-label fw-bold fs-5" id="lbl_rtgs_details">'.$plist['remarks'].'</label>
                </div>';
                }
              if($plist['type_of_payment']=='UPI')
              {
                  $pay_div.='<div class="row">
                  <label class="col-lg-1 col-form-label fw-semibold fs-6">UPI</label>
                  <label class="col-lg-2 col-form-label fw-bold fs-5" id="lbl_upi_paid">'.$plist['amount'].'</label>
                  <label class="col-lg-1 col-form-label fw-semibold fs-6" >Ref.No</label>
                  <label class="col-lg-2 col-form-label fw-bold fs-5" id="lbl_upi_ref_no">'.$plist['cheque_ref_no'].'</label>
                 
                  <label class="col-lg-1 col-form-label fw-semibold fs-6">Details</label>
                  <label class="col-lg-2 col-form-label fw-bold fs-5" id="lbl_upi_details">'.$plist['remarks'].'</label>
                </div>';
              }


             }
          
                $data['pay_div']=$pay_div;
        //   print_r($data);exit;
        header('Content-type: application/json'); 

      echo json_encode($data);

        // $this->load->view('loan/loan_view',$data);
    }

}