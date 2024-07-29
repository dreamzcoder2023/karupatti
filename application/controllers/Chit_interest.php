<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/* ************************************************************************************
        Purpose : To handle all Chit_interest functions 2022-08-18
***************************************************************************************/
class Chit_interest extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model(array("Chit_interest_model"));
        $this->load->library('user_agent');
        
        if (isset($this->session->userdata['username']) && $this->session->userdata['username'] == TRUE)
        {
            //do something
        }else{
            redirect('login'); //if session is not there, redirect to login page
        } 
        date_default_timezone_set("Asia/Kolkata");
        $this->session->set_userdata('comtitle', 'Property_purchase');
    }
    /* ************************************************************************************
                        Purpose : To handle Chit_interest List function 
            **********************************************************************/
            public function index()
            {
                $data['chit_interest'] = $this->Chit_interest_model->chit_interest();
                // print_r($data);exit;
                $this->load->view("chit_interest/chit_interest_update",$data);
            }
            public function chit_interest_update()
            {
               
                $chit_list=$this->db->query("SELECT * FROM CHIT_LIST  WHERE scheme_type!='3' " )->result_array();
                foreach($chit_list as $clist){
                    $chit_interest=$this->db->query("SELECT * FROM CHIT_INTEREST_UPDATE WHERE FROM_AMOUNT<='".$clist['ava_balance']."' AND TILL_AMOUNT>='".$clist['ava_balance']."'  ")->row();
                  
                 
                    $interest_amount=$clist['ava_balance']*$chit_interest->PERCENTAGE/100;
                    $clo_bal=$clist['ava_balance']+$interest_amount;
                    $trans_detail=$this->db->query("SELECT * FROM CHIT_TRANSACTION ORDER BY sno DESC")->row(); 
                    $trans=$trans_detail->sno+1;
                    $prefix="TRANS-";
                    $data['trans_id']=$prefix.$trans;
                    $date_time = date("Y-m-d h:i:s");
                    $chit_date = date("Y-m-d");

                    $res = $this->db->query("INSERT INTO CHIT_TRANSACTION (party_id,trans_date,scheme_type,scheme_id,transaction_type,opening_amount,processing_amount,closing_balance,amt_paid,per_gram,status,created_by,created_on,modified_by,modified_on,transaction_id) 
                    VALUES ('".$clist['party_id']."','".$chit_date."','".$clist['scheme_type']."','".$clist['scheme_id']."','1','".$clist['ava_balance']."','".$interest_amount."','".$clo_bal."','0','0','Y','','".$date_time."','','".$date_time."'  ,'".$data['trans_id']."') ");
       
                    $update=$this->db->query("UPDATE CHIT_LIST SET tot_deposit=tot_deposit+".$interest_amount.",ava_balance=ava_balance+".$interest_amount." WHERE scheme_id='".$clist['scheme_id']."' ");
               if($clist['scheme_type']==1){
                $update=$this->db->query("UPDATE CHIT_MASTER SET sm_cash_ava_amt=sm_cash_ava_amt+".$interest_amount." WHERE party_id='".$clist['party_id']."' ");

               }
               if($clist['scheme_type']==2){
                $update=$this->db->query("UPDATE CHIT_MASTER SET tm_cash_ava_amt=tm_cash_ava_amt+".$interest_amount." WHERE party_id='".$clist['party_id']."' ");

               }
               
                }
             
                redirect('Chit_interest');
            }
            public function chit_int_update()
            {
                $data['sno'] = $this->input->post('sno');
                $data['from_amount'] = $this->input->post('from_amount');
                $data['till_amount'] = $this->input->post('till_amount');
                $data['percentage'] = $this->input->post('percentage');

                $data['chit_interest'] = $this->Chit_interest_model->chit_int_update($data);            
        
         
                $date1 = date("Y-m-d", strtotime($this->input->post('interest_date_1')));
                $date2 = date("Y-m-d", strtotime($this->input->post('interest_date_2')));
                $date3 = date("Y-m-d", strtotime($this->input->post('interest_date_3')));
              
                $date_detail1=$this->db->query("SELECT * FROM CHIT_INTEREST_UPDATE_DATE WHERE id='1' ")->row();
                if($date1!=$date_detail1->interest_date){
                $update1=$this->db->query("UPDATE CHIT_INTEREST_UPDATE_DATE SET interest_date='".$date1."',paid_status='unpaid'  WHERE id='1'");
                }
                $date_detail2=$this->db->query("SELECT * FROM CHIT_INTEREST_UPDATE_DATE WHERE id='1' ")->row();
                if($date2!=$date_detail2->interest_date){
                $update2=$this->db->query("UPDATE CHIT_INTEREST_UPDATE_DATE SET interest_date='".$date2."',paid_status='unpaid'  WHERE id='2'");
                }
                $date_detail3=$this->db->query("SELECT * FROM CHIT_INTEREST_UPDATE_DATE WHERE id='1' ")->row();
                if($date3!=$date_detail3->interest_date){
                $update3=$this->db->query("UPDATE CHIT_INTEREST_UPDATE_DATE SET interest_date='".$date3."',paid_status='unpaid'  WHERE id='3'");
                }
                redirect("Chit_interest");
            }
          
        }