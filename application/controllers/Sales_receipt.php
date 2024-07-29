<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/* ************************************************************************************
        Purpose : To handle all Department functions 2022-08-19
***************************************************************************************/
class Sales_receipt extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
      
        $this->load->library('user_agent');

     

        if (isset($this->session->userdata['username']) && $this->session->userdata['username'] == TRUE)
        {
            //do something
        }else{
            redirect('login'); //if session is not there, redirect to login page
        } 
        date_default_timezone_set("Asia/Kolkata");
        $this->session->set_userdata('comtitle', 'Tagentry');
    }


    public function index()

    {

        $data['dt_fill'] = $this->input->post('dt_fill_sales_list');

        $data['from_date_fillter'] = $this->input->post('from_date_fillter_sales_list');
        $data['to_date_fillter'] = $this->input->post('to_date_fillter_sales_list');
        $fdate ='';
        $tdate ='';
        //  print_r($data['dt_fill']);exit();
        if($data['dt_fill']=="all"){
            $fdate ='';
            $tdate ='';
        
        }
        if($data['dt_fill']=="today"){
            $data['today_date_fillter'] = date("Y-m-d");
            $fdate =" AND date='".$data['today_date_fillter']."'";
            $tdate ='';
            
                
            
        }
        if($data['dt_fill']=="week"){
            $today=date('l');
            if($today=="Sunday"){
                $data['week_from_date_fillter']=date(' Y-m-d', strtotime("sunday 0 week"));
           
                $data['week_to_date_fillter']=date(' Y-m-d', strtotime("saturday 1 week"));
               // print_r($data['week_to_date_fillter']);exit;
                    $fdate =" AND date>='".$data['week_from_date_fillter']."'";
                $tdate =" AND date<='".$data['week_to_date_fillter']."'";
        
            }else{
             $data['week_from_date_fillter']=date(' Y-m-d', strtotime("sunday -1 week"));
           
             $data['week_to_date_fillter']=date(' Y-m-d', strtotime("saturday 0 week"));
            //  print_r($data['week_to_date_fillter']);exit;
                 $fdate =" AND date>='".$data['week_from_date_fillter']."'";
             $tdate =" AND date<='".$data['week_to_date_fillter']."'";
            }
                     }
                    if($data['dt_fill']=="monthly"){
                   
                        $first=date('Y-m-01');
                        $last=date('Y-m-t');
                        $fdate =" AND date>='".$first."'";
                        
                       
                            $tdate ="AND date<='".$last."'";
                        }
                        if($data['dt_fill']=="custom Date"){
                        if($data['from_date_fillter']!=''){
                            $first=date('Y-m-d',strtotime($data['from_date_fillter']));
                            $fdate =" AND date>='".$first."'";
                            
                            }
                            else{
                                $fdate ='';
                            }
                            if($data['to_date_fillter']!=''){
                                $last=date('Y-m-d',strtotime($data['to_date_fillter']));
                                $tdate =" AND date<='".$last."'";
                                
                                }
                                else{
                                    $tdate ='';
                                } }
        

                                $data['company_id'] = $this->input->post('company_id');
                                if($data['company_id']!=''){
                                $cname =" AND company_id ='".$data['company_id']."'";
                                
                                }
                                else{
                                    $cname ='';
                                }

                                $page       = isset($_GET['page']) ? $_GET['page'] : 1;
        
                                $limit      = 10;
                                $offset     = ($page - 1) * $limit +1;
                                $page_limit=$offset+$limit-1;
                                $data['company_list']  = $this->db->query("SELECT * FROM COMPANY WHERE ACTIVE='Y'  ")->result_array();
        $data['bank_list']  = $this->db->query("SELECT DISTINCT BANKNAME FROM BANKS WHERE ACTIVE='Y' ")->result_array();

        $data['count']=count($this->db->query("SELECT * FROM sales_receipt WHERE status='Y' $fdate $tdate $cname  ")->result_array());
      
        // $data['sales_receipt_list']  = $this->db->query("SELECT * FROM sales_receipt WHERE status='Y' $fdate $tdate $cname  ")->result_array();
        $data['sales_receipt_list']  = $this->db->query(" SELECT  * FROM 
        ( SELECT *, ROW_NUMBER() OVER (ORDER BY id DESC) AS sl FROM sales_receipt WHERE  status!='' $fdate $tdate $cname )N 
         WHERE      sl BETWEEN $offset AND $page_limit ")->result_array();
        $data['sales_receipt_total']  = $this->db->query("SELECT SUM(paid_amount) as total_paid FROM sales_receipt WHERE status='Y' $fdate $tdate $cname  ")->row();
        $this->load->view('sales_receipt/sales_receipts',$data);
    }
    public function sales_receipt_entry()

    {
        $data['bank_list']  = $this->db->query("SELECT DISTINCT BANKNAME FROM BANKS WHERE ACTIVE='Y' ")->result_array();
        $data['company_list']  = $this->db->query("SELECT * FROM COMPANY WHERE ACTIVE='Y'  ")->result_array();
        $this->load->view('sales_receipt/new_sales_receipts_entry',$data);
    }

    public function idList()
    {
   
      $search =  $_GET['query']; 

      $rows = $this->db->query("SELECT * from salesentry where sales_id LIKE '".$search.'%'."'  ")->result_array();
      $res='[';
      if(count($rows)>0) {
       
        foreach($rows as $row )
        {
            $title=$row['sales_id'];
            $name='';
           
            $sales_id=$row['sales_id'];
            $party_id=$row['party_id'];
            $sales_count=$row['sales_gold_count']+$row['sales_silver_count'];
            $sales_weight=$row['sales_gold_weight']+$row['sales_silver_weight'];
            $sales_net_payable=$row['net_payable'];
            $sales_paid_amount=$row['paid_amount'];
            $sales_balance_amount=$row['balance_amount'];

            $party = $this->db->query("SELECT * from PARTIES where PID = '".$party_id."'  ")->row();
            $membership_card = $this->db->query("SELECT * from MEMBERSHIP_CARD where PID = '".$party_id."'  ")->row();
            // print_r($party);
            $firstname=$party->NAME;
            $lastname=$party->LASTNAME_PREFIX.','.$party->FATHERSNAME;
            $address=$party->ADDRESS1.', '.$party->ADDRESS2.', '.$party->CITY;
          $member_id=(isset($party->MEMBERSHIP_ID))?$party->MEMBERSHIP_ID:'';
          $member_points=(isset($party->MEMBERSHIP_POINTS))?$party->MEMBERSHIP_POINTS:'';

        //   $member_points=$party->MEMBERSHIP_POINTS;
            if(isset($membership_card)){
          $card_type=$membership_card->CARD_TYPE;
            }
            else{
                $card_type='';
            }
           $rating=$party->RATING;
            $phone=$party->PHONE;
            // print_r($card_type);
            $sales_detail = $this->db->query("SELECT * from salesentry_detail where sales_entry_id = '".$row['id']."'  ")->result_array();
            $i=1;
            $sales_row='';
            foreach($sales_detail as $slist){
             $tag_no=$slist['tag_no'];
             $item_name  = $this->db->query("SELECT * FROM ITEMS WHERE  SNO='". $slist['item_name']."' ")->row();
             $item_name=$item_name->ITEMNAME;
            $subitem =$this->db->query("SELECT * FROM SUBITEM_LIST WHERE SUB_ID='".$slist['subitem_name']."'  ")->row();
             $subitem_name=$subitem->SUBITEM_NAME;
             $quality=$slist['quality'];
             $purity=$slist['purity'];
             $weight=$slist['weight'];
             $stone=$slist['stone'];
             $net_weight=$slist['net_weight'];
             $mc_amount=$slist['mc_amount'];
             $hc_amount=$slist['hc_amount'];
             $wc_amount=$slist['wc_amount'];
             $metal_weight=$slist['metal_weight'];
             $total_amount=$slist['total_amount'];

             if($slist['tag_no']=='-'){

                $image_url =  base_url().'sales_non_tag_img/'. $slist['total_amount']; 
                if(@getimagesize($image_url)){
                    $img_view=' <div class="image-input mt-2" data-kt-image-input="true">
              <div class="image-input-wrapper w-40px h-40px" style="background-image: url( '.base_url().'tag_img/'. $typelist->img.')"></div>
            </div>';
            
                }
                else{
             $img_view=' <div class="image-input mt-2" data-kt-image-input="true">
              <div class="image-input-wrapper w-40px h-40px" style="background-image: url( '.base_url().'assets/images/sample_jewel.jpg)"></div>
            </div>';
             }

             }
             else{
                $image_url =  base_url().'tag_img/'. $slist['total_amount']; 
                if(@getimagesize($image_url)){
                    $img_view=' <div class="image-input mt-2" data-kt-image-input="true">
              <div class="image-input-wrapper w-40px h-40px" style="background-image: url( '.base_url().'tag_img/'. $typelist->img.')"></div>
            </div>';
            
                }
                else{
             $img_view=' <div class="image-input mt-2" data-kt-image-input="true">
              <div class="image-input-wrapper w-40px h-40px" style="background-image: url( '.base_url().'assets/images/sample_jewel.jpg)"></div>
            </div>';
             }
             }

            $sales_row.='<tr><td>'.$i.'</td><td>'.$tag_no.'</td><td>'.$item_name.'</td><td>'.$subitem_name.'</td><td></td><td>'.$quality.'</td><td>'.$purity.'</td><td>'.$weight.'</td><td>'.$stone.'</td><td>'.$net_weight.'</td><td>'.$hc_amount.'</td><td>'.$mc_amount.'</td><td>'.$wc_amount.'</td><td>'.$metal_weight.'</td><td>'.$total_amount.'</td></tr>';
           $i++;
            }

            $res.='{ "title":"'.$title.'","id": "'.$party_id.'","sales_id":"'.$sales_id.'","firstname":"'.$firstname.'","lastname":"'.$lastname.'","member_id":"'.$member_id.'","member_points":"'.$member_points.'","rating":"'.$rating.'","address":"'.$address.'","phone":"'.$phone.'","card_type":"'.$card_type.'","sales_count":"'.$sales_count.'","sales_weight":"'.$sales_weight.'","sales_net_payable":"'.$sales_net_payable.'","sales_paid_amount":"'.$sales_paid_amount.'","sales_balance_amount":"'.$sales_balance_amount.'","sales_row":"'.$sales_row.'"},';

         
        }
        $res=rtrim($res,',');
        $res.=']';
      }
      else{
        $res.=']';
      }
      print_r($res);die();
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
      public function sales_receipt_save()
      {
        $sales_id=$this->input->post('sales_id');
        $receipt_date=date("Y-m-d", strtotime($this->input->post('receipt_date')));
        $party_id=$this->input->post('party_id');
        // print_r($party_id);exit();
        $company_id=$this->input->post('company_id');
        $paid_amount=$this->input->post('sales_paid_amount2');
        $net_payable=$this->input->post('sales_net_payable2');
        $balance_amount=$this->input->post('sales_balance_amount2');
        $cash_amount=$this->input->post('cash_amount');
        $cash_detail=$this->input->post('cash_detail');
        $cheque_amount=$this->input->post('cheque_amount');
        $cheque_bank=$this->input->post('cheque_bank');
        $cheque_number=$this->input->post('cheque_number');
        $cheque_detail=$this->input->post('cheque_detail');
        $rtgs_amount=$this->input->post('rtgs_amount');
        $rtgs_bank=$this->input->post('rtgs_bank');
        $rtgs_number=$this->input->post('rtgs_number');
        $rtgs_detail=$this->input->post('rtgs_detail');
        $upi_amount=$this->input->post('upi_amount');
        $upi_bank=$this->input->post('upi_bank');
        $upi_number=$this->input->post('upi_number');
        $upi_detail=$this->input->post('cheque_detail');
        $adj_discount=$this->input->post('adj_discount');
        $data['added_user'] = $_SESSION['username'];
        $data['created_on'] = date('Y-m-d H:i:s');

        $mem_card_no = $this->input->post('mem_card_no');
        $mem_card_redeem_points = $this->input->post('mem_card_redeem_points');
        $mem_card_details = $this->input->post('mem_card_details');

        $credit_balance = $this->input->post('credit_balance');
        if($credit_balance=='on'){
        $credit_balance='YES';
        
        }
        else{
            $credit_balance='NO';
        }


        $result_insert = $this->db->query("INSERT INTO sales_receipt (
            sales_bill_id,
            date,
            company_id,
            party_id,
            paid_amount,
            net_payable,
            balance_amount,
            cash_amt,
            cash_details,
            cheque_amt,
            cheque_number,
            cheque_bank,
            cheque_details,
            rtgs_amt,
            rtgs_number,
            rtgs_bank,
            rtgs_details,
            upi_amt,
            upi_number,
            upi_bank,
            upi_details,
            balance_credit,
            created_on,
            created_by,
            status,
            adjustment_discount 
            
        ) VALUES(
            '".$sales_id."',
             '".$receipt_date."',
             '".$company_id."',
             '".$party_id."',
             '".$paid_amount."',
             '".$net_payable."',
             '".$balance_amount."',
             '".$cash_amount."',
             '".$cash_detail."',
             '".$cheque_amount."',
             '".$cheque_number."',
             '".$cheque_bank."',
             '".$cheque_detail."',
             '".$rtgs_amount."',
             '".$rtgs_number."',
             '".$rtgs_bank."',
             '".$rtgs_detail."',
             '".$upi_amount."',
             '".$upi_number."',
             '".$upi_bank."',
             '".$upi_detail."',
             '".$credit_balance."',
            '".$data['created_on']."',
            '".$data['added_user']."',
            'Y',
            '".$adj_discount."'

        )");
        $update= $this->db->query("UPDATE salesentry SET paid_amount=paid_amount+".$paid_amount." ,balance_amount='".$balance_amount."'  WHERE sales_id= '".$sales_id."'");

        $billno=$sales_id;
        $process="New Sales Receipt - Deduction";
        if($mem_card_redeem_points > 0){
            $mem_card_point_upd=$this->db->query("UPDATE MEMBERSHIP_CARD SET POINTS=POINTS-".$mem_card_redeem_points." WHERE PID='".$party_id."' ");
            $party_mem_point_upd=$this->db->query("UPDATE PARTIES SET MEMBERSHIP_POINTS=MEMBERSHIP_POINTS-".$mem_card_redeem_points." WHERE PID='".$party_id."'");
            add_member_card_history($mem_card_no,$party_id,$process,$mem_card_redeem_points,$billno);
        }

        $trans_detail=$this->db->query("SELECT * FROM CHIT_TRANSACTION ORDER BY sno DESC")->row(); 
        $trans=$trans_detail->sno+1;
        $prefix="TRANS-";
        $data['trans_id']=$prefix.$trans;


        $data['ac_chitpay_mode'] =$this->input->post('chit_hand_loan_paid_from_party_add_radio');
        $data['ac_chit_red_amount'] =$this->input->post('chit_red_amt');
        $data['chit_id'] =$this->input->post('chit_option');
        $data['ac_chit_red_detail'] =$this->input->post('chit_red_det');
        $data['ac_chit_av_amount'] =$this->input->post('cur_amt_hidden');
        $chit_pay= $this->db->query("INSERT INTO payment_inward_outward
        (
        module_name
        ,type_of_payment
        ,amount
        ,cheque_ref_no
        ,company_bank
        ,remarks
        ,bill_no
        ,party_id
        ,payment_side
        ,metal_type
        ,quality
        ,purity
        ,weight
        ,pure_metal_weight)
        
        VALUES(
               'Sales_receipt',
               '".$data['ac_chitpay_mode']."',
               '".$data['ac_chit_red_amount']."',
               '".$data['chit_id']."',
               '',
               '".$data['ac_chit_red_detail']."',
               '".$sales_id."',
               '".$party_id."','-','-','-','0','0','0'
              )");

         if($data['scm_chit']=='1')

         {
     
             $closing_amount=$data['ac_chit_av_amount']-$data['ac_chit_red_amount'];
     
             $result=$this->db->query("  INSERT INTO CHIT_TRANSACTION (trans_date
             ,party_id
             ,scheme_type
             ,scheme_id
             ,transaction_type
             ,opening_amount
             ,processing_amount
             ,closing_balance
             ,amt_paid
             ,per_gram
             ,status
             ,created_by
             ,created_on,
             transaction_id)
             VALUES ('".$receipt_date."',
             '".$party_id."',
             '1' ,
             '".$data['sch_id_chit']."',
             '2',
             '".$data['ac_chit_av_amount']."',
             '".$data['ac_chit_red_amount']."',
             '".$closing_amount."',
             '',
             '',
             'Y',
             '".$_SESSION['username']."' ,
             '".date('Y-m-d H:i:s')."',
             '".$data['trans_id']."')
             ");
         }
     
     
     
     
         
         $chit_party_id=$data['chit_id'];
            
            
             
     
            
     
         $chit_ava_bal = $data['ac_chit_av_amount'];
         $chit_amtt = $data['ac_chit_red_amount'];
     
     
         $curr_ch_amt = $chit_ava_bal - $chit_amtt;
     
         $curr_chit_amount = $curr_ch_amt;
     
     
          if($curr_chit_amount>0){
     
           $chit_list_up  = $this->db->query("UPDATE CHIT_LIST SET ava_balance='".$curr_chit_amount."' 
             WHERE chit_id='".$data['chit_id']."' ");
     
           }
     
          $data['scm_chit'] =$this->input->post('sch_payment'); 
     
          $chit_mas = $this->db->query("SELECT * FROM CHIT_MASTER WHERE party_id = '".$party_id."' ")->row();
     
          $sm_cm_curr_bal = $chit_mas->sm_cash_ava_amt;
     
          $sm_up_amt = $sm_cm_curr_bal - $chit_amtt;
     
          $tm_cm_curr_bal = $chit_mas->tm_cash_ava_amt;
     
          $tm_up_amt  = $tm_cm_curr_bal - $chit_amtt;
     
      
     
     
     
           if($data['scm_chit']=='1'){
     
             $chit_mas_up  = $this->db->query("UPDATE CHIT_MASTER  SET sm_cash_ava_amt='".$sm_up_amt."' 
             WHERE party_id = '".$party_id."' ");
     
           }
     
           if($data['scm_chit']=='2'){
             $chit_mas_up  = $this->db->query("UPDATE CHIT_MASTER  SET tm_cash_ava_amt='".$sm_up_amt."' 
             WHERE party_id = '".$party_id."' ");
           }
     
           
     
            $sch_id = $this->db->query("SELECT * FROM CHIT_LIST WHERE party_id = '".$party_id."' AND scheme_type='".$data['scm_chit']."'")->row();
            $data['sch_id_chit'] = $sch_id->scheme_id;
            
     if($data['scm_chit']=='2')
         {
     
             $closing_amount=$data['ava_balance']-$data['ac_chit_red_amount'];
     
             $result=$this->db->query("  INSERT INTO CHIT_TRANSACTION (trans_date
             ,party_id
             ,scheme_type
             ,scheme_id
             ,transaction_type
             ,opening_amount
             ,processing_amount
             ,closing_balance
             ,amt_paid
             ,per_gram
             ,status
             ,created_by
             ,created_on,
             transaction_id)
             VALUES ('".$data['hl_date']."',
             '".$party_id."',
             '2' ,
             '".$data['sch_id_chit']."',
             '2',
             '".$data['ac_chit_av_amount']."',
             '".$data['ac_chit_red_amount']."',
             '".$closing_amount."',
             '',
             '',
             'Y',
             '".$_SESSION['username']."' ,
             '".date('Y-m-d H:i:s')."',
             '".$data['trans_id']."')
             ");
         }
     





  add_notification(date('Y-m-d H:i:s'), $company_id, "Inventory", "New Sales Receipt ", $sales_id. ' Created By ' .$_SESSION['username'],'', $_SESSION['USERID'], '0', $sales_id);
      
  if($result_insert)
{
    $this->session->set_flashdata('g_success', $sales_id.' Sales receipt have been added successfully...');
}else{
   $this->session->set_flashdata('g_err', 'Could not add Sales receipt details!');
}


        redirect('Sales_receipt');
    }
   public function sales_receipt_view(){
    $id=$_POST['id'];

  $sales_receipt  = $this->db->query("SELECT * FROM sales_receipt WHERE status='Y' AND id='".$id."' ")->row();
  $date_format  = $this->db->query("SELECT * FROM general_settings  ")->row();
  $format= $date_format->date_format;
  $date=date("$format", strtotime($sales_receipt->date)); 



  $company  = $this->db->query("SELECT * FROM COMPANY WHERE ACTIVE='Y' AND COMPANYCODE='".$sales_receipt->company_id."' ")->row();
  $party_detail= $this->db->query("SELECT * FROM PARTIES WHERE PID='".$sales_receipt->party_id."'  ")->row();
// echo $sales_receipt->cash_amount;
  echo    ''.'||'.$date.'||'.$company->COMPANYNAME.'||'.$sales_receipt->sales_bill_id.'||'.$party_detail->NAME.'||'.$sales_receipt->cash_amt.'||'.$sales_receipt->cash_details.'||'.$sales_receipt->cheque_amt.'||'.$sales_receipt->cheque_number.'||'.$sales_receipt->cheque_bank.'||'.$sales_receipt->cheque_details.'||'.$sales_receipt->rtgs_amt.'||'.$sales_receipt->rtgs_number.'||'.$sales_receipt->rtgs_bank.'||'.$sales_receipt->rtgs_details.'||'.$sales_receipt->upi_amt.'||'.$sales_receipt->upi_number.'||'.$sales_receipt->upi_bank.'||'.$sales_receipt->upi_details;
 
}

public function sales_receipt_print( $id){

    $data['sales_receipt']       = $this->db->query("SELECT * FROM sales_receipt WHERE status='Y' AND id='".$id."' ")->row();
    $data['company_detail']      = $this->db->query("SELECT * FROM COMPANY WHERE ACTIVE='Y' AND COMPANYCODE='".$data['sales_receipt']->company_id."' ")->row();
    $data['party_detail']        = $this->db->query("SELECT * FROM PARTIES WHERE PID='".$data['sales_receipt']->party_id."'  ")->row();
    $data['sales_receipt_tagged']= $this->db->query("SELECT * FROM salesentry_detail WHERE sales_id='".$data['sales_receipt']->sales_bill_id."'  ")->result_array();


    $this->load->view('sales_receipt/sales_receipt_print',$data);
}
public function get_chit_list()
{
    // $party_id=$this->input->post('id');
    $party_id = $_POST['pid'];
    $chi_sc_id= $_POST['ccid'];
    

      

   $chit_amt = $this->db->query("SELECT * FROM CHIT_LIST WHERE party_id = '".$party_id."' AND scheme_type='".$chi_sc_id."'   ")->result_array();

   // print_r($chit_amt);
   
      
    $option="<option value=''>Select Chit ID</option>";
    if(isset($chit_amt))
    {
   foreach ($chit_amt as $clist) {

        $option.='<option value="'.$clist['chit_id'].'">'.$clist['chit_id'].' - '.$clist['ava_balance'].'.00<input type="hidden" name="cur_amt_hidden" id="cur_amt_hidden" value="'.$clist['ava_balance'].'"></option>';
      }
    }
    else
    {
      // print_r($data['scheme_type']);
      $option="<option value=''>Select</option>";
    }
    echo $option;
   
}

}
