<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/* ************************************************************************************
		Purpose : To handle all hand_loan functions 2022-08-22
***************************************************************************************/
class Handloan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model(array("Handloan_model"));
    	$this->load->library('user_agent');
    	if (isset($this->session->userdata['username']) && $this->session->userdata['username'] == TRUE)
        {
        //do something
        }else{
            redirect('login'); //if session is not there, redirect to login page
        } 
		date_default_timezone_set("Asia/Kolkata");
    	$this->session->set_userdata('comtitle', 'Handloan');
	}

    public function index()
    {

        $page       = isset($_GET['page']) ? $_GET['page'] : 1;
        $limit      = 10;
        $offset     = ($page - 1) * $limit +1;
        $page_limit = $offset+$limit-1;
        // print($page_limit);
        // print_r($offset);exit();

       


         $data['type'] = $this->input->post('hl_lis_type');
         // print_r($data['type']);exit();
         if($data['type']!=''){
         $type =" AND HL_ENTRY_TYPE LIKE'%".$data['type']."%'";
         }
          else{
         $type ='';
         }
        $data['cmp_code'] = $this->input->post('cmp_fill');
        // print_r($data['cmp_code']);exit();
         if($data['cmp_code']!=''){
         $cmp_code =" AND COMPANYCODE LIKE'%".$data['cmp_code']."%'";
         }
          else{
         $cmp_code ='';
        }
         $data['Hl_no'] = $this->input->post('hand_loan_no');

         if($data['Hl_no']!=''){
         $Hl_no =" AND HL_BILLNO LIKE'%".$data['Hl_no']."%'";
         // print_r($Hl_no);exit();
         }
          else{
         $Hl_no ='';
        }
        $data['party_name'] = $this->input->post('hl_party_name');
        // print_r($data['party_name']);exit();
         if($data['party_name']!=''){
         $party_name =" AND HL_PID LIKE'%".$data['party_name']."%'";
         }
          else{
         $party_name ='';
        }


      // $data['hl_id'] = $hl_id; 

        $data['dt_fill'] = $this->input->post('dt_fill_hloan_list');
        // print_r($data['dt_fill']);exit();
        $data['from_date_fillter'] = $this->input->post('from_date_fillter_hloan_list');
        $data['to_date_fillter'] = $this->input->post('to_date_fillter_hloan_list');

        // print_r($data);exit;
        $fdate ='';
        $tdate ='';
        //  print_r($data['dt_fill']);exit();
        if($data['dt_fill']==""){
            $fdate ='';
            $tdate ='';

        }
      
            if($data['dt_fill']=="today"){
            $data['today_date_fillter'] = date("Y-m-d");
            $fdate =" AND HL_DATE='".$data['today_date_fillter']."'";
            $tdate ='';
                
            
        }

        if($data['dt_fill']=="week"){
            $today=date('l');
            if($today=="Sunday"){
                $data['week_from_date_fillter']=date(' Y-m-d', strtotime("sunday 0 week"));
           
                $data['week_to_date_fillter']=date(' Y-m-d', strtotime("saturday 1 week"));
               // print_r($data['week_to_date_fillter']);exit;
                    $fdate =" AND HL_DATE>='".$data['week_from_date_fillter']."'";
                $tdate =" AND HL_DATE<='".$data['week_to_date_fillter']."'";

            }else{
             $data['week_from_date_fillter']=date(' Y-m-d', strtotime("sunday -1 week"));
           
             $data['week_to_date_fillter']=date('Y-m-d', strtotime("saturday 0 week"));
            //  print_r($data['week_to_date_fillter']);exit;
                 $fdate =" AND HL_DATE>='".$data['week_from_date_fillter']."'";
             $tdate =" AND HL_DATE<='".$data['week_to_date_fillter']."'";
            }
                     }
                    if($data['dt_fill']=="monthly"){
                   
                        $first=date('Y-m-01');
                        $last=date('Y-m-t');
                        $fdate =" AND HL_DATE>='".$first."'";
                        
                       
                            $tdate ="AND HL_DATE<='".$last."'";
                        }

                if($data['dt_fill']=="custom Date"){

                if($data['from_date_fillter']!=''){

                    $first=date('Y-m-d',strtotime($data['from_date_fillter']));
                    $fdate =" AND HL_DATE>='".$first."'";
                    
                    }
                    else{
                        $fdate ='';
                    }
                    if($data['dt_fill']=="custom Date"){
                if($data['from_date_fillter']!=''){
                    $first=date('Y-m-d',strtotime($data['from_date_fillter']));
                    $fdate =" AND HL_DATE>='".$first."'";
                    
                    }
                    else{
                        $fdate ='';
                    }
                    if($data['to_date_fillter']!=''){
                        $last=date('Y-m-d',strtotime($data['to_date_fillter']));
                        $tdate =" AND HL_DATE<='".$last."'";
                        
                        }
                        else{
                            $tdate ='';
                        } }
}
       

        

        $ccat = $data['cmp_code'];
        $data['get_cmp_name_fill'] = $this->db->query("SELECT * FROM COMPANY WHERE COMPANYCODE ='".$ccat."' ")->row();

        $party_list = $this->db->query("SELECT * FROM (SELECT HL_PID as hl_pid, ROW_NUMBER() OVER (ORDER BY MAX(ADDED_TIME) DESC) AS sl FROM HL_TRANS WHERE HL_PID != '' $type $fdate $tdate $cmp_code $Hl_no GROUP BY HL_PID) N WHERE sl BETWEEN $offset AND $page_limit")->result_array();
        // print_r($party_list); exit;

        $data['count'] = count($this->db->query("SELECT HL_PID as hl_pid FROM HL_TRANS WHERE HL_PID!='' $type   $fdate  $tdate $cmp_code $Hl_no   GROUP BY HL_PID ")->result_array());
 

    

   
    $pid=[];

    foreach ($party_list  as $key => $value) {

        // print_r($value);

      $pid[] = $this->db->query("SELECT * FROM HL_TRANS WHERE HL_PID='".$value['hl_pid']."' ORDER BY ADDED_TIME DESC")->row();
      
    }
    // exit;
     $data['pid'] = $pid;
     // print_r($data['pid']);
     // exit;
     // $data['get_user']  = $this->db->query("SELECT DISTINCT ADDED_USER FROM HL_TRANS ")->result_array();

      $data['HL_list_amts']  = $this->db->query("SELECT * FROM HL_TRANS WHERE HL_BILLNO !='' $type   $fdate  $tdate $cmp_code $Hl_no ORDER BY HL_DATE DESC")->result_array();
        $hl_tot_amt = 0;
        $ac_tot_amt = 0;

         foreach ($data['HL_list_amts'] as $hlrlist) {
        
            $hl_tot_amt += $hlrlist['HL_DEBIT'];
            $ac_tot_amt += $hlrlist['HL_CREDIT'];
           
        }


       
        $data['hl_tot_amt']=$hl_tot_amt?$hl_tot_amt:0;
        $data['ac_tot_amt']=$ac_tot_amt?$ac_tot_amt:0;
        $data['company_list'] = $this->Handloan_model->get_company_list();
      

        $this->load->view('hand_loan/hand_loan_list',$data);
    }
    public function handloan_history($hl_id){

        $page       = isset($_GET['page']) ? $_GET['page'] : 1;
        $limit      = 10;
        $offset     = ($page - 1) * $limit +1;
        $page_limit = $offset+$limit-1;
       


         $data['type'] = $this->input->post('hl_type');
         // print_r($data['type']);exit();
         if($data['type']!=''){
         $type =" AND HL_ENTRY_TYPE LIKE'%".$data['type']."%'";
         }
          else{
         $type ='';
         }
        $data['utype'] = $this->input->post('hl_utype');
         if($data['utype']!=''){
         $utype =" AND ADDED_USER LIKE'%".$data['utype']."%'";
         }
          else{
         $utype ='';
        }


      $data['hl_id'] = $hl_id;

        $data['dt_fill'] = $this->input->post('dt_fill_hl_his_list');

        $data['from_date_fillter'] = $this->input->post('from_date_fillter_hl_his_list');
        $data['to_date_fillter'] = $this->input->post('to_date_fillter_hl_his_list');

        // print_r($data);exit;
        $fdate ='';
        $tdate ='';
        //  print_r($data['dt_fill']);exit();
        if($data['dt_fill']==""){
            $fdate ='';
            $tdate ='';

        }
      
            if($data['dt_fill']=="today"){
            $data['today_date_fillter'] = date("Y-m-d");
            $fdate =" AND HL_DATE='".$data['today_date_fillter']."'";
            $tdate ='';
                
            
        }

        if($data['dt_fill']=="week"){
            $today=date('l');
            if($today=="Sunday"){
                $data['week_from_date_fillter']=date(' Y-m-d', strtotime("sunday 0 week"));
           
                $data['week_to_date_fillter']=date(' Y-m-d', strtotime("saturday 1 week"));
               // print_r($data['week_to_date_fillter']);exit;
                    $fdate =" AND HL_DATE>='".$data['week_from_date_fillter']."'";
                $tdate =" AND HL_DATE<='".$data['week_to_date_fillter']."'";

            }else{
             $data['week_from_date_fillter']=date(' Y-m-d', strtotime("sunday -1 week"));
           
             $data['week_to_date_fillter']=date('Y-m-d', strtotime("saturday 0 week"));
            //  print_r($data['week_to_date_fillter']);exit;
                 $fdate =" AND HL_DATE>='".$data['week_from_date_fillter']."'";
             $tdate =" AND HL_DATE<='".$data['week_to_date_fillter']."'";
            }
                     }
                    if($data['dt_fill']=="monthly"){
                   
                        $first=date('Y-m-01');
                        $last=date('Y-m-t');
                        $fdate =" AND HL_DATE>='".$first."'";
                        
                       
                            $tdate ="AND HL_DATE<='".$last."'";
                        }

                if($data['dt_fill']=="custom Date"){

                if($data['from_date_fillter']!=''){

                    $first=date('Y-m-d',strtotime($data['from_date_fillter']));
                    $fdate =" AND HL_DATE>='".$first."'";
                    
                    }
                    else{
                        $fdate ='';
                    }
                    if($data['dt_fill']=="custom Date"){
                if($data['from_date_fillter']!=''){
                    $first=date('Y-m-d',strtotime($data['from_date_fillter']));
                    $fdate =" AND HL_DATE>='".$first."'";
                    
                    }
                    else{
                        $fdate ='';
                    }
                    if($data['to_date_fillter']!=''){
                        $last=date('Y-m-d',strtotime($data['to_date_fillter']));
                        $tdate =" AND HL_DATE<='".$last."'";
                        
                        }
                        else{
                            $tdate ='';
                        } }
}
        $data['HL_historty_list'] = $this->Handloan_model->get_hl_hst_fill($hl_id,$type,$utype,$fdate,$tdate,$offset,$page_limit);
        
        $data['count'] = count($this->db->query("SELECT * FROM HL_TRANS WHERE HL_PID='".$hl_id."' $fdate $tdate $type $utype ORDER BY HL_DATE DESC")->result_array());


        // $data['get_type']  = $this->db->query("SELECT DISTINCT HL_ENTRY_TYPE FROM HL_TRANS ")->result_array();
           $data['get_user']  = $this->db->query("SELECT DISTINCT ADDED_USER FROM HL_TRANS ORDER BY ADDED_USER ASC")->result_array();

        $data['HL_his_list']  = $this->db->query("SELECT * FROM HL_TRANS WHERE HL_PID='".$hl_id."' $fdate $tdate $type $utype ORDER BY HL_DATE DESC ")->result_array();
        $hl_tot_amt = 0;
        $ac_tot_amt = 0;

         foreach ($data['HL_his_list'] as $hlrlist) {
        
            $hl_tot_amt += $hlrlist['HL_DEBIT'];
            $ac_tot_amt += $hlrlist['HL_CREDIT'];
      

            // print_r($data['hl_tot_amt']);
        }


    
        // print_r($data['party_idss']);exit();
        $data['hl_tot_amt']=$hl_tot_amt;
        $data['ac_tot_amt']=$ac_tot_amt;

        $bal_at = $hl_tot_amt - $ac_tot_amt;
        $bal_hl_amt = $bal_at?$bal_at:0;
        $data['bal_hl_amt'] = $bal_hl_amt?$bal_hl_amt:0;
        // exit();

         $data['hl_his'] = $this->db->query("SELECT * FROM PARTIES WHERE PID='".$hl_id."'")->result_array();

         $data['get_party_name'] = $data['hl_his'][0]['NAME'];
        
         $this->load->view('hand_loan/hand_loan_history',$data);


  
}  

   public function handloan_entry(){

        
       $data['company_list'] = $this->Handloan_model->get_company_list();
     
        
         $this->load->view('hand_loan/hand_loan_add',$data);

         
  
}

public function userList()
      {
        $search =  $_GET['query']; 
        $rows = $this->Handloan_model->getUsers($search);

        $res='[';
        if(count($rows)>0) {



          foreach($rows as $row)
          {


              $title='';
              $name='';
             
              $firstname=$row->NAME;
              $lastname=$row->LASTNAME_PREFIX.','.$row->FATHERSNAME;
              if($row->TYPE_OF_RECORD=='O'){
                $CITY=  ($row->CITY=='')?'--':$row->CITY;
                }
                else
                {
                    $area_det=$this->db->query("SELECT * FROM CITY WHERE CITYID='".$row->CITY_ID."'")->row();
                    $CITY=  $area_det?$area_det->CITYNAME:'--';
                }
                if($row->TYPE_OF_RECORD=='O'){
                     $ADDRESS2=($row->ADDRESS2=='')?'--':$row->ADDRESS2;
                }
                else
                {
                    $VILLAGE_det =$this->db->query("SELECT * FROM VILLAGE WHERE VILLAGEID='".$row->VILLAGE_ID."'")->row();
                    $ADDRESS2 = $VILLAGE_det?$VILLAGE_det->VILLAGENAME:'--';
                }

                if($row->TYPE_OF_RECORD=='O'){
                     $ADDRESS1 = ($row->ADDRESS1=='')?'--':$row->ADDRESS1;
                }
                else
                {
                    $street_det=$this->db->query("SELECT * FROM STREET WHERE STREETID='".$row->STREET_ID."'")->row();
                    $ADDRESS1 =  $street_det?$street_det->STREETNAME:'--';
                }

              $address=$ADDRESS1.', '.$ADDRESS2.', '.$CITY;
              $member_id=$row->MEMBERSHIP_ID;
              
              if ($member_id) {
                 $card_details=$this->db->query("SELECT * FROM MEMBERSHIP_CARD WHERE MEMBERSHIP_ID='".$member_id."'")->row();

             }
             if(isset($card_details)){
                    $member_ids   =  $card_details->MEMBERSHIP_NO;
                    $member_points=  $card_details->POINTS;
              }else{

                    $member_ids   = '';
                    $member_points= '';

              }

              # if Party Have Chit Find

              $chitdata = $this->db->query("SELECT * FROM CHIT_LIST WHERE party_id = '".$row->PID."' AND ava_balance>0 ")->row();
                
              if ($chitdata!='') {
                  $getchit = 1;
              }else{
                  $getchit = 0;
              }


              
              
              $rating=$row->RATING;
              $phone=$row->PHONE;
              $party_photo=base64_encode($row->PHOTO);
              $id_photo   =base64_encode($row->OTHER_PHOTO);
              $sign_photo =base64_encode($row->SIGNATURE);
              // $title = $firstname.'&emsp;'.'-'.'&emsp;'.$lastname.'&emsp;'.'-'.'&emsp;'.$address.'&emsp;'.'-'.'&emsp;'.$phone;
              $title = $firstname.'   --   '.$lastname.'   --   '.$address.'   --   '.$phone;

              // $res.='{ "title":"'.$title.'","id": "'.$row->PID.'","firstname":"'.$firstname.'","lastname":"'.$lastname.'","member_id":"'.$member_id.'","member_points":"'.$member_points.'","rating":"'.$rating.'","party":"'.$party_photo.'","idproof":"'.$id_photo.'","sign":"'.$sign_photo.'","address":"'.$address.'","phone":"'.$phone.'"},';

              $res.='{ "title":"'.$title.'","id": "'.$row->PID.'","firstname":"'.$firstname.'","lastname":"'.$lastname.'","member_id":"'.$member_ids.'","member_points":"'.$member_points.'","rating":"'.$rating.'","party":"'.$party_photo.'","idproof":"'.$id_photo.'","sign":"'.$sign_photo.'","address":"'.$address.'","phone":"'.$phone.'","getchit":"'.$getchit.'"},';

              
          }
          $res=rtrim($res,',');
          $res.=']';
        }
        else{
          $res.=']';
        }
        print_r($res);die();
      }
      public function get_card_type()
      {
          $pid=$this->input->post('id');
          $card_type='';
          $card_details=$this->db->query("SELECT * FROM MEMBERSHIP_CARD WHERE PID='".$pid."'")->row();
          if(isset($card_details))
          {
              if($card_details->CARD_TYPE=='Gold'){
                $card_type='<span style="background-color:#ffaa00;border-radius: 8px;padding: 5px 15px 5px 15px;">Gold</span>';
              // $card_type=$card_details->CARD_TYPE;
              // $card_type="gold";

              }
              else if($card_details->CARD_TYPE=='Silver'){
                $card_type='<span style="background-color:#d2d4dc;border-radius: 8px;padding: 5px 15px 5px 15px;">Silver</span>';
              }
              else if($card_details->CARD_TYPE=='Platinum')
              {
                $card_type='<span style="background-color:#f4fdff;border-radius: 8px;padding: 5px 15px 5px 15px;">Platinum</span>';
              }
              echo $card_type;
            }
           
      }
      public function get_nominee_list()
      {
        $pid=$this->input->post('id');
          $nominee_details=$this->db->query("SELECT * FROM NOMINEE WHERE PID='".$pid."'")->result_array();
          $option="<option value=''>Select Nominee</option>";
          if(isset($nominee_details))
          {
            foreach ($nominee_details as $nlist) {
              $option.='<option value="'.$nlist['NOMINEE_ID'].'">'.$nlist['NOMINEE_NAME'].' - '.$nlist['RELATION'].' - '.$nlist['MOBILE_NO'].'</option>';
            }
          }
          else
          {
            $option="<option value=''>Select</option>";
          }
          echo $option;
      }
       public function get_id_photo()
      {
         $pid=$this->input->post('id');
         $party_det=$this->db->query("SELECT OTHER_PHOTO FROM PARTIES WHERE PID='".$pid."'")->row();
         if($party_det->OTHER_PHOTO!='')
         {
         $div='<img src="data:image/jpg;charset=utf8;base64,'.base64_encode($party_det->OTHER_PHOTO).'"  height="125px" width="125px">';
         }
         else
         {
          $div='<img src="'.base_url().'assets/images/party_proof.jpg" height="125px" width="125px" >';
         }

         echo $div;
      }
       public function get_sign_photo()
      {
         $pid=$this->input->post('id');
         $party_det=$this->db->query("SELECT OTHER_PHOTO FROM PARTIES WHERE PID='".$pid."'")->row();
         if(isset($party_det->IDPROOF))
         {
         $div='<img src="data:image/jpg;charset=utf8;base64,'.base64_encode($party_det->IDPROOF).'"  height="125px" width="125px">';
         }
         else
         {
          $div='<img src="'.base_url().'assets/images/signature.jpg" height="125px" width="125px" >';
         }

         echo $div;
      }
    public function get_chit_list()
        {
          // $party_id=$this->input->post('id');
          $party_id = $_POST['pid'];
          $chi_sc_id= $_POST['ccid'];

         $chit_amt = $this->db->query("SELECT * FROM CHIT_LIST WHERE party_id = '".$party_id."' AND scheme_type='".$chi_sc_id."' AND ava_balance>0    ")->result_array();

         // print_r($chit_amt);
         
            
          $option="<option value=''>Select Chit ID</option>";
          if(isset($chit_amt))
          {
         foreach ($chit_amt as $clist) {

              $option.='<option value="'.$clist['chit_id'].'">'.$clist['chit_id'].' - '.number_format($clist['ava_balance'],2,'.',',').'<input type="hidden" name="cur_amt_hidden" id="cur_amt_hidden" value="'.$clist['ava_balance'].'"></option>';
            }
          }
          else
          {
            // print_r($data['scheme_type']);
            $option="<option value=''>Select</option>";
          }
          echo $option;
         
      }
    public function get_chit_amount()
    {
         
        $chit_id   = $_POST['chid'];
        $chit_amt  = $this->db->query("SELECT * FROM CHIT_LIST WHERE chit_id='".$chit_id."' ")->row();

        if(isset($chit_amt))
        {
            $amount = $chit_amt->ava_balance?$chit_amt->ava_balance:0;
        } 
        else
        {
            $amount=0;
        }

        echo $amount;         
    }
      
      public function get_hl_det()
      {
           $pid=$this->input->post('id');


              $amt_det='';
              $deb_amt='';
              

              $amt_det = $this->db->query("SELECT SUM(HL_CREDIT) as CREDIT FROM HL_TRANS WHERE HL_PID='".$pid."'  GROUP BY HL_PID ")->row();
              $deb_amt = $this->db->query("SELECT SUM(HL_DEBIT) as DEBIT FROM HL_TRANS WHERE HL_PID='".$pid."'  GROUP BY HL_PID ")->row();
               

                 if(isset($amt_det)){

                
                 $cr_amt=$amt_det->CREDIT;
                 $db_amt=$deb_amt->DEBIT;
                 $bal_amt = $db_amt - $cr_amt;
                 $bal_hl_amt = $bal_amt;
                 }
                 if(isset($deb_amt)){
                  $cr_amt=$amt_det->CREDIT;
                  $db_amt=$deb_amt->DEBIT;
                  $bal_amt = $db_amt - $cr_amt;
                  $bal_hl_amt = $bal_amt;
                 }
                 

                 


                if($amt_det == ''){
                    // echo $cr_amt.'||'.$db_amt.'||'.$bal_hl_amt;
                 echo  '0.00'.'||'.'0.00'.'||'.'0.00';

                }else

                 // echo  '0.00'.'||'.'0.00'.'||'.'0.00';
                 echo $cr_amt.'||'.$db_amt.'||'.$bal_hl_amt;
                 

                   // echo $cr_amt.'||'.$db_amt.'||'.$bal_hl_amt;

                  // echo $pdet->PID.'||'.$pdet->NAME.'||'.$pdet->LASTNAME_PREFIX.'||'.$pdet->FATHERSNAME.'||'.$pdet->AREA.'||'.$pdet->DOORNO.'||'.$pdet->ADDRESS1.'||'.$pdet->ADDRESS2.'||'.$pdet->CITY.'||'.$pdet->PHONE;
        
      }
       
      public function get_party_bank()
      {
        $pid=$this->input->post('id');
          $party_bank=$this->db->query("SELECT * FROM party_bank_upi_details WHERE party_id='".$pid."'")->result_array();
          $option="<option value=''>Select</option>";
          if(isset($party_bank))
          {
            foreach ($party_bank as $plist) {
              $option.='<option value="'.$plist['phone_account_no'].'">'.$plist['payment_type'].' - '.$plist['account_name'].' - '.$plist['phone_account_no'].'</option>';
            }
          }
          else
          {
            $option="<option value=''>Select</option>";
          }
          echo $option;
      }
      public function get_photo()
    {
        $pid = $this->input->post('id');
        $party_det = $this->db->query("SELECT PARTY_IMAGE,PHOTO, TYPE_OF_RECORD FROM PARTIES WHERE PID='".$pid."'")->row();
        if ($party_det) {
            if ($party_det->TYPE_OF_RECORD == 'N') {
                // print_r($party_det->PARTY_IMAGE);
                // exit;
                if(isset($party_det->PARTY_IMAGE) && $party_det->PARTY_IMAGE !== "") {
                    $div = '<img src="'.$party_det->PARTY_IMAGE.'" height="125px" width="125px">';
                } else {
                     $div = '<img src="'.base_url().'assets/images/party.jpg" height="125px" width="125px">';
                }
            } else {
                // print_r('old');
                // exit;
                if(isset($party_det->PHOTO) && $party_det->PHOTO !== "") {
                    $div = '<img src="data:image/jpg;charset=utf8;base64,'.base64_encode($party_det->PHOTO).'" height="125px" width="125px">';
                } else {
                    $div = '<img src="'.base_url().'assets/images/party.jpg" height="125px" width="125px">';
                }
            }
        } else {
            // print_r('no ');
            $div = '<img src="'.base_url().'assets/images/party.jpg" height="125px" width="125px">';
            // exit;
        }

        echo $div;
    }
      public function update_party_phone_no()
      {
          $party_id=$this->input->post('pid');
          $new_mobile_no=$this->input->post('new_no');

          $res=$this->db->query("update PARTIES set PHONE='".$new_mobile_no."' where PID='".$party_id."'");
          return true;
      }
      public function get_party_details()
    {
        $pid = $_POST['id'];
        $pdet = $this->Handloan_model->get_party_details_by_party_id($pid);
        echo $pdet->PID.'||'.$pdet->NAME.'||'.$pdet->LASTNAME_PREFIX.'||'.$pdet->FATHERSNAME.'||'.$pdet->AREA.'||'.$pdet->DOORNO.'||'.$pdet->ADDRESS1.'||'.$pdet->ADDRESS2.'||'.$pdet->CITY.'||'.$pdet->PHONE;
    }
        public function get_loan_party_list()
    {
        $search =  $_GET['query']; 
        $rows = $this->Handloan_model->get_loan_party_list($search);
        //print_r($rows);exit;
        $res='[';
        if(count($rows)>0) {
          foreach($rows as $row )
          {
              $title='';
              $title = $row->BILLNO;
              $res.='{ "title":"'.$title.'","id": "'.$row->PID.'"},';
              
          }
          $res=rtrim($res,',');
          $res.=']';
        }
        else{
          $res.=']';
        }
        print_r($res);die();
    }

    public function pay_to_party()
   {
        $data['type']=$this->input->post('pay_type');
        $data['amt']=$this->input->post('pay_amt');
        $data['p_bank']=$this->input->post('p_bank');
        $data['ref_no']=$this->input->post('ref_no');
        $data['c_bank']=$this->input->post('c_bank');
        $data['det']=$this->input->post('pay_details');
        $data['billno']=$this->input->post('p_bill_no');
        $data['pid']=$this->input->post('p_pid');
        $data['created_by']=$_SESSION['username'];;
        $data['created_on']=date('Y-m-d');
        $res=$this->Loan_model->insert_pay_to_party($data);
        if($res)
        {
          echo 1;
        }
        else
        {
          echo 0;
        }
   }
    public function handloanentry_save()
    {

        // exit;

      $last_hl_id_detail = $this->Handloan_model->get_hl_id_key_value($_SESSION['LOANPREFIX']);
         if($last_hl_id_detail){

            $last_data= $last_hl_id_detail? $last_hl_id_detail->KEYVALUE :0;



                $year = substr( date("y"), -2);
                $slice = explode("/", $last_data);
                $result = preg_replace('/[^0-9]/',' ', $slice[0]); 
                // print_r( $result);

                function request_num ($input, $pad_len = 3  , $prefix = null) {
                    if ($pad_len <= strlen($input))
                        trigger_error('<strong>$pad_len</strong> cannot be less than or equal to the length of <strong>$input</strong> to generate invoice number', E_USER_ERROR);
                
                    if (is_string($prefix))
                        return sprintf("%s%s", $prefix, str_pad($input, $pad_len, "0", STR_PAD_LEFT));
                
                    return str_pad($input, $pad_len, "0", STR_PAD_LEFT);
                }

                $request =  request_num(((int)$result+1), 4, "HL-");
                
                $request_id =  $request.'/'.$year;

              $HandLoan_id = $request_id;
              }
              else{
                $year = substr( date("y"), -2);
                $HandLoan_id=  'HL-0001/'.$year;
            }

        $data['HandLoan_id']         = $HandLoan_id;

        $data['party_ids'] = $this->input->post('party_id_hidd');


        // $cdate = date('Y-m-d');
        $tdate = $data['h_date'] = $this->input->post('handloandate');

        $hl_dates=date('Y-m-d',strtotime($tdate));

        $data['hl_date'] = $hl_dates;

        $data['hl_pay_date'] = $hl_dates;


        // print_r($data['hl_date']);exit();

        $data['type'] = $this->input->post('hl_type');
        
        
        $pid = $data['party_id'] = $this->input->post('loan_party_id');
        $data['loan_no']         = $this->input->post('loan_party_id');

        $data['hl_amount']  = $this->input->post('hl_amount');
        $data['ac_amount']  = $this->input->post('ac_amount');
        $data['company_id'] = $this->input->post('company');      
        $data['hlremarks']  = $this->input->post('hlremarks');      
        $data['acremarks']  = $this->input->post('acremarks'); 


        if ($data['hl_amount']>0) {                
            $data['remark'] = $data['hlremarks'];
        } else{
            $data['remark'] = $data['hlremarks'];
        }    
         
        
        $data['paid_from'] = $this->input->post('paid_from');
        $paledid = $data['paid_from_id'] = $this->input->post('paid_from_id');        

            
            // ********************Handloan Payment *******************************
            //HandLoan Cash Payment        
            $data['pay_mode'] =$this->input->post('cash_hand_loan_paid_from_company_add_radio');         
            $data['cash_amount'] =$this->input->post('hlcashamount');
            $data['cash_detail'] =$this->input->post('hlcashdetail');
            //HandLoan Cheque Payment
            $data['pay_mode'] =$this->input->post('cheque_hand_loan_paid_from_company_add_radio');
            $data['cheque_amt'] =$this->input->post('hl_chequeamount');
            $data['cheque_refno'] =$this->input->post('hl_chequerefno');
            $data['cheque_cmb'] =$this->input->post('cheque_cmbk');
            $data['cheque_party'] =$this->input->post('bank_details_drop_cq');
            $data['cheque_detail'] =$this->input->post('hl_chequedetail');
            $data['HandLoan_id'] =$HandLoan_id;
            //HandLoan RTGS Payment
            $data['pay_mode'] =$this->input->post('rtgs_hand_loan_paid_from_company_add_radio');
            $data['rtgs_amt'] =$this->input->post('hl_rtgsamount');
            $data['rtgs_refno'] =$this->input->post('hl_rtgsrefno');
            $data['rtgs_cbank'] =$this->input->post('hl_rtgscbank');
            $data['rtgs_party_bk'] =$this->input->post('bank_details_drop_rtgs');
            $data['rtgs_detail'] =$this->input->post('hl_rtgsdetails');
            //HandLoan UPI Payment
            $data['pay_mode'] =$this->input->post('upi_hand_loan_paid_from_company_add_radio');
            $data['upi_amt'] =$this->input->post('hl_upiamount');
            $data['upi_refno'] =$this->input->post('hl_upirefno');
            $data['upi_cbank'] =$this->input->post('hl_upicbank');
            $data['upi_party_bk'] =$this->input->post('bank_details_drop_upi');
            $data['upi_detail'] =$this->input->post('hl_upidetail');
            // ********************on ACCOUNT Payment *******************************
            // on ACCOUNT Cash Payment
            $data['pay_mode'] =$this->input->post('cash_loan_received_add_radio');
            $data['ac_cash_amount'] =$this->input->post('ac_cashamount');
            $data['ac_cash_detail'] =$this->input->post('ac_cashdetail');
            // on ACCOUNT Cheque Payment
            $data['ac_pay_mode'] =$this->input->post('cheque_hd_loan_paid_from_party_add_radio');
            $data['ac_cheque_amt'] =$this->input->post('ac_chequeamount');
            $data['ac_cheque_pbk'] =$this->input->post('party_bank_ac');
            $data['ac_cheque_refno'] =$this->input->post('ac_chequerefno');
            $data['ac_cheque_detail'] =$this->input->post('ac_chequedetail');
            // on ACCOUNT RTGS Payment
            $data['ac_pay_mode'] =$this->input->post('rtgs_hd_loan_paid_from_party_add_radio');
            $data['ac_rtgs_amt'] =$this->input->post('ac_rtgsamount');
            $data['ac_rtgs_refno'] =$this->input->post('ac_rtgsrefno');
            $data['ac_rtgs_cbank'] =$this->input->post('ac_rtgscbank');            
            $data['ac_rtgs_detail'] =$this->input->post('ac_rtgsdetails');          
            // on ACCOUNT upi Payment
            $data['ac_pay_mode'] =$this->input->post('upi_hd_loan_paid_from_party_add_radio');
            $data['ac_upi_amt'] =$this->input->post('ac_upiamount');
            $data['ac_upi_refno'] =$this->input->post('ac_upirefno');
            $data['ac_upi_cbank'] =$this->input->post('ac_upicbank');
            $data['ac_upi_detail'] =$this->input->post('ac_upidetail');

            // Membership Redeem 
            $data['ac_mempay_mode'] =$this->input->post('mcard_hand_loan_paid_from_party_add_radio');
            $data['ac_mem_card_no'] =$this->input->post('ac_mem_card_num');
            $data['ac_mem_red_point'] =$this->input->post('ac_mem_redeem_point')?$this->input->post('ac_mem_redeem_point'):0;
            $data['ac_mem_red_detail'] =$this->input->post('ac_mem_redeem_detail');

            $data['HandLoan_id']    = $HandLoan_id;
            $data['ac_HandLoan_id'] = $HandLoan_id;
        

        // ******************** KEY MASTER KEY UPDATES *********************
        $hltrans_no = $this->Handloan_model->get_hl_trans_key_value($_SESSION['LOANPREFIX']);        
        $hltrans = $hltrans_no->KEYVALUE;     
        
        $data['HL_TRANS_NO'] = $_SESSION['LOANPREFIX'].($hltrans+1);
        $upkey      = $hltrans + 1;
        $update_key = $upkey;

        $tanskey   = "HL_TRANS-".$_SESSION['LOANPREFIX'];
        $hlpay_nos = $this->Handloan_model->get_hl_pay_key_value($_SESSION['LOANPREFIX']);
        $hlpays    = $hlpay_nos->KEYVALUE;
        $upkey     = $hlpays + 1;

        $pay_update_key = $upkey;
         $paykey = "HL_PAYMENTS-".$_SESSION['LOANPREFIX'];
         $data['HL_SNO'] =$_SESSION['LOANPREFIX'].($hlpays+1);
         $hlrec_nos = $this->Handloan_model->get_hl_rec_key_value($_SESSION['LOANPREFIX']);
         $hlrec     = $hlrec_nos->KEYVALUE;
         $upkey     = $hlrec + 1;

        $rec_update_key     = $upkey;
        $payrecepit         = "HL_RECEIPTS-".$_SESSION['LOANPREFIX'];
        $data['HL_SNO_rec'] = $_SESSION['LOANPREFIX'].($hlrec+1);  

        $result = $this->Handloan_model->hl_trans_add($data);

        if($result>0){
          $trans_key_up = $this->db->query("UPDATE KEYMASTER SET KEYVALUE='".$update_key."' WHERE KEYNAME='".$tanskey."' ");

        }
        if($trans_key_up>0){
          $payment_key_up  = $this->db->query("UPDATE KEYMASTER SET KEYVALUE='".$pay_update_key."' WHERE KEYNAME='".$paykey."'");          
        }
        if($payment_key_up>0){

          $receipt_key_up  = $this->db->query("UPDATE KEYMASTER SET KEYVALUE='".$rec_update_key."' WHERE KEYNAME='".$payrecepit."'");
        }
      
       
        if($result>0){

            $results    = $this->Handloan_model->hl_payment_add($data);  


            // ************************** Chit Data Dynamic START********************//
                $chitdata['party_ids']       = $data['party_ids']; //Party Id Get 
                $chitdata['chit_date']       = $data['hl_date']; //Chit date get
                $chitdata['chit_red_amount'] = $this->input->post('chit_red_amt'); //Chit Redeem Amount Box
                $chitdata['chit_id']         = $this->input->post('chit_option');  //Chit Id Get Dropdown
                $chitdata['chit_red_detail'] = $this->input->post('chit_red_det'); //Chit reedem details remark box

                if ($chitdata['chit_red_amount']>0) {

                    $chit_details = $this->db->query("SELECT * FROM CHIT_LIST WHERE chit_id='".$chitdata['chit_id']."' ORDER BY sno DESC")->row();

                    if ($chit_details!='') {                
                        $chitdata['chit_av_amount'] = $chit_details->ava_balance?$chit_details->ava_balance:0;//Chit Avaiable Amount
                        // $chitdata['ava_balance'] 
                    }else{
                        $chitdata['chit_av_amount'] = 0;
                    }
                   
                    $chitdata['ac_HandLoan_id']   = $HandLoan_id; // Chit Transaction Bill ID 

                    //chit avaiable Amount - Redeem Amount
                    $curr_ch_amt                  = floatval($chitdata['chit_av_amount']) - floatval($chitdata['chit_red_amount']);

                    $chitdata['curr_chit_amount'] = $curr_ch_amt; // Current Avaiable Get  

                    // if($chitdata['curr_chit_amount']<0){
                        $chit_list_up  = $this->db->query("UPDATE CHIT_LIST SET ava_balance='".$chitdata['curr_chit_amount']."' WHERE chit_id='".$chitdata['chit_id']."' ");   // Update Chit List Current Ava balance
                    // }

                    // Chit Master Table Updates

                     $chitdata['scm_chit'] = $this->input->post('sch_payment'); // Chit Scheme Type Get

                     $chit_mas         = $this->db->query("SELECT * FROM CHIT_MASTER WHERE party_id = '".$chitdata['party_ids']."' ")->row();

                     $sm_cm_curr_bal   = $chit_mas->sm_cash_ava_amt;

                     $sm_up_amt        = $sm_cm_curr_bal - floatval($chitdata['chit_red_amount']);

                     $tm_cm_curr_bal   = $chit_mas->tm_cash_ava_amt;

                     $tm_up_amt        = $tm_cm_curr_bal - floatval($chitdata['chit_red_amount']);   


                    if($chitdata['scm_chit']=='1'){
                      $chit_mas_up  = $this->db->query("UPDATE CHIT_MASTER  SET sm_cash_ava_amt='".$sm_up_amt."' WHERE party_id = '".$chitdata['party_ids']."' ");// Update CHIT_MASTER Current Ava balance Scheme type Selvamagal cash
                    }

                    if($chitdata['scm_chit']=='2'){
                      $chit_mas_up  = $this->db->query("UPDATE CHIT_MASTER  SET tm_cash_ava_amt='".$tm_up_amt."' WHERE party_id = '".$chitdata['party_ids']."' "); // Update CHIT_MASTER Current Ava balance Scheme type thangamagal cash
                    }
                    // get And update Chit Tranaction Table 

                   $trans_detail = $this->db->query("SELECT * FROM CHIT_TRANSACTION ORDER BY sno DESC")->row(); // Trans Last Id Get
                   if ($trans_detail!='') {
                      $trans=$trans_detail->sno+1;
                   }else{
                    $trans=1;
                   }          

                   $prefix="TRANS-";
                   $chitdata['trans_id']=$prefix.$trans;

                   $sch_id = $this->db->query("SELECT * FROM CHIT_LIST WHERE party_id = '".$chitdata['party_ids']."' AND chit_id='".$chitdata['chit_id']."' AND scheme_type='".$chitdata['scm_chit']."' ")->row(); 

                    if($sch_id!=''){
                        $chitdata['sch_id_chit'] = $sch_id->scheme_id;
                    }else{
                        $chitdata['sch_id_chit'] = '';
                    }

                }
            // ************************** Chit Data Dynamic END*************************//

            // ****************************** Chit REDEEM *********************************

            if ($chitdata['chit_red_amount']>0) {

                $ac_chit    = $this->Handloan_model->chitsave($chitdata);// payment_inward_outward add and get the id
                    if($ac_chit == 1)
                    {
                        $paydata= $this->db->query("SELECT payment_id FROM payment_inward_outward WHERE bill_no='".$chitdata['ac_HandLoan_id']."' ORDER BY payment_id DESC ")->row();
                        $chitdata['chitpid'] = $paydata?$paydata->payment_id?$paydata->payment_id:'':'';
                    }else{
                        $chitdata['chitpid'] = '';
                    }
                $chit_trans = $this->Handloan_model->chittransreddemadd($chitdata);
            }




            // ****************************** MEMBERSHIP REDEEM *********************************

            // Membership Redeem 
            # mem date Process
            $memdata['mem_date']       = $data['hl_date']; //Chit date get
            # Party Id Get
            $memdata['party_ids']      = $data['party_ids']; 
            # module name
            $memdata['mempay_mode']    = 'Membership Redeem';  
            # Membership Card Number
            $memdata['mem_card_no']    = $this->input->post('ac_mem_card_num'); 
            # Reddeem Points
            $memdata['mem_red_point']  = $this->input->post('ac_mem_redeem_point') ? $this->input->post('ac_mem_redeem_point'):0;
            # member Redeem remaks
            $memdata['mem_red_detail'] = $this->input->post('ac_mem_redeem_detail');
            # member Redeem process
            $memdata['process']        = 'HandLoan Redeem';
            $memdata['billno']         = $HandLoan_id; // Bill no

            


            if($memdata['mem_red_point']>0){

               
                # MEMBERSHIP_HISTORY Save
                $mem_card       = $this->Handloan_model->membershipcardhistory($memdata);
                # payment_inward_outward save Details
                $paymentmemsave = $this->Handloan_model->paymentmemsave($memdata);
            }

          // ****************************** MEMBERSHIP REDEEM  END *********************************      

            if($data['hl_amount']>0){
                $hl_cash   = $this->Handloan_model->hl_cashsave($data);
                $hl_cheque = $this->Handloan_model->hl_chequesave($data);
                $hl_upi    = $this->Handloan_model->hl_upisave($data);
                $hl_rtgs   = $this->Handloan_model->hl_rtgssave($data);

                # Notification Add Handloan
                add_notification(date('Y-m-d H:i:s'), $company_code, "Loan", "Loan<br> New Handloan", $HandLoan_id. ' created By ' .$_SESSION['username'],'', $_SESSION['USERID'], '0', $HandLoan_id);
            }
            if($data['ac_amount']>0){
                $ac_cash   = $this->Handloan_model->ac_cashsave($data);
                $ac_cheque = $this->Handloan_model->ac_chequesave($data);
                $ac_rtgs   = $this->Handloan_model->ac_rtgssave($data);
                $ac_upi    = $this->Handloan_model->ac_upisave($data);
                # Notification Add Handloan
                add_notification(date('Y-m-d H:i:s'), $company_code, "Loan", "Loan<br> New Handloan (On Account)", $HandLoan_id. ' created By ' .$_SESSION['username'],'', $_SESSION['USERID'], '0', $HandLoan_id);
            }




        }
        
        
        // exit;   
        if($result>0)
        {
           $this->session->set_flashdata('g_success', 'Hand Loan have been Added successfully...');
        }else{
           $this->session->set_flashdata('g_err', 'Could not add Hand Loan details!');
        }
        redirect('Handloan');
    }
    
    // ******************************************Overall history(17/01/2024)**********************//


    public function handloanoverallhistory(){

        $page       = isset($_GET['page']) ? $_GET['page'] : 1;
        $limit      = 10;
        $offset     = ($page - 1) * $limit +1;
        $page_limit = $offset+$limit-1;  

        $data['type'] = $this->input->post('hl_type');
         
         if($data['type']!=''){

            $type =" AND HL_ENTRY_TYPE LIKE'%".$data['type']."%'";
         }
          else{
         $type ='';
         }
        $data['utype'] = $this->input->post('hl_utype');
        // print_r($data['utype']);exit();
         if($data['utype']!=''){

             $utype =" AND ADDED_USER LIKE'%".$data['utype']."%'";
         }
          else{
         $utype ='';
        }
        $data['dt_fill'] = $this->input->post('dt_fill_hl_his_list');
        $data['from_date_fillter'] = $this->input->post('from_date_fillter_hl_his_list');
        $data['to_date_fillter'] = $this->input->post('to_date_fillter_hl_his_list');
        // print_r($data);exit;
        $fdate ='';
        $tdate ='';
        //  print_r($data['dt_fill']);exit();
        if($data['dt_fill']==""){
            $fdate ='';
            $tdate ='';
        }      
        if($data['dt_fill']=="today"){
            $data['today_date_fillter'] = date("Y-m-d");
            $fdate =" AND HL_DATE='".$data['today_date_fillter']."'";
            $tdate ='';    
        }
        if($data['dt_fill']=="week"){
            $today=date('l');
            if($today=="Sunday"){
                $data['week_from_date_fillter']=date(' Y-m-d', strtotime("sunday 0 week"));
           
                $data['week_to_date_fillter']=date(' Y-m-d', strtotime("saturday 1 week"));
               // print_r($data['week_to_date_fillter']);exit;
                    $fdate =" AND HL_DATE>='".$data['week_from_date_fillter']."'";
                $tdate =" AND HL_DATE<='".$data['week_to_date_fillter']."'";

            }else{
             $data['week_from_date_fillter']=date(' Y-m-d', strtotime("sunday -1 week"));
           
             $data['week_to_date_fillter']=date('Y-m-d', strtotime("saturday 0 week"));
            //  print_r($data['week_to_date_fillter']);exit;
                 $fdate =" AND HL_DATE>='".$data['week_from_date_fillter']."'";
             $tdate =" AND HL_DATE<='".$data['week_to_date_fillter']."'";
            }
        }
        if($data['dt_fill']=="monthly"){
                   
            $first=date('Y-m-01');
            $last=date('Y-m-t');
            $fdate =" AND HL_DATE>='".$first."'";
            $tdate ="AND HL_DATE<='".$last."'";
        }
        if($data['dt_fill']=="custom Date"){
                if($data['from_date_fillter']!=''){

                    $first=date('Y-m-d',strtotime($data['from_date_fillter']));
                    $fdate =" AND HL_DATE>='".$first."'";
                    
                    }
                    else{
                        $fdate ='';
                    }
                    if($data['dt_fill']=="custom Date"){
                if($data['from_date_fillter']!=''){
                    $first=date('Y-m-d',strtotime($data['from_date_fillter']));
                    $fdate =" AND HL_DATE>='".$first."'";
                    
                    }
                    else{
                        $fdate ='';
                    }
                    if($data['to_date_fillter']!=''){
                        $last=date('Y-m-d',strtotime($data['to_date_fillter']));
                        $tdate =" AND HL_DATE<='".$last."'";
                        
                        }
                        else{
                            $tdate ='';
                        } }
        }
        $data['HL_historty_list'] = $this->Handloan_model->overallhistorylist($type,$utype,$fdate,$tdate,$offset,$page_limit);
                
        $data['count'] = count($this->db->query("SELECT * FROM HL_TRANS WHERE HL_PID!=''  $fdate $tdate $type $utype")->result_array());

        // print_r($data['HL_historty_list']);
        // print_r($data['count']);

         // exit;
         $data['get_user']  = $this->db->query("SELECT DISTINCT ADDED_USER FROM HL_TRANS ORDER BY ADDED_USER ASC")->result_array();

        $data['HL_his_list']  = $this->db->query("SELECT * FROM HL_TRANS WHERE HL_BILLNO !='' $fdate $tdate $type $utype ORDER BY HL_DATE DESC")->result_array();
        $hl_tot_amt = 0;
        $ac_tot_amt = 0;

        foreach ($data['HL_his_list'] as $hlrlist) {
                
            $hl_tot_amt += $hlrlist['HL_DEBIT'];
            $ac_tot_amt += $hlrlist['HL_CREDIT'];             

        }
                $data['hl_tot_amt']=$hl_tot_amt?$hl_tot_amt:0;
                $data['ac_tot_amt']=$ac_tot_amt?$ac_tot_amt:0;

                $bal_at = $hl_tot_amt - $ac_tot_amt;
                $bal_hl_amt = $bal_at?$bal_at:0;
                $data['bal_hl_amt'] = $bal_hl_amt?$bal_hl_amt:0;                 
                
            $this->load->view('hand_loan/hand_loan_overall_history',$data);          
    }  
  
}
?>
