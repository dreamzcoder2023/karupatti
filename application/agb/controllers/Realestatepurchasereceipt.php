<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/* ************************************************************************************
        Purpose : To handle all Realestatepurchasereceipt functions 2022-08-19
***************************************************************************************/
class Realestatepurchasereceipt extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model(array("Realestate_purchase_receipt_model"));
        $this->load->library('user_agent');
        if (isset($this->session->userdata['username']) && $this->session->userdata['username'] == TRUE)
        {
            //do something
        }else{
            redirect('login'); //if session is not there, redirect to login page
        } 
        date_default_timezone_set("Asia/Kolkata");
        $this->session->set_userdata('comtitle', 'Realestate Purchase Receipt');
    }


    public function index()

    {

        $data['dt_fill'] = $this->input->post('dt_fill_prop_pur_recp_list');

        $data['from_date_fillter'] = $this->input->post('from_date_fillter_prop_pur_recp_list');
        $data['to_date_fillter'] = $this->input->post('to_date_fillter_prop_pur_recp_list');
        $fdate ='';
        $tdate ='';
        //  print_r($data['dt_fill']);exit();
        if($data['dt_fill']=="all"){
            $fdate ='';
            $tdate ='';
        
        }
        if($data['dt_fill']=="today"){
            $data['today_date_fillter'] = date("Y-m-d");
            $fdate =" AND receipt_date='".$data['today_date_fillter']."'";
            $tdate ='';
            
                
            
        }
        if($data['dt_fill']=="week"){
            $today=date('l');
            if($today=="Sunday"){
                $data['week_from_date_fillter']=date(' Y-m-d', strtotime("sunday 0 week"));
           
                $data['week_to_date_fillter']=date(' Y-m-d', strtotime("saturday 1 week"));
               // print_r($data['week_to_date_fillter']);exit;
                $fdate =" AND receipt_date>='".$data['week_from_date_fillter']."'";
                $tdate =" AND receipt_date<='".$data['week_to_date_fillter']."'";
        
            }else{
             $data['week_from_date_fillter']=date(' Y-m-d', strtotime("sunday -1 week"));
           
             $data['week_to_date_fillter']=date(' Y-m-d', strtotime("saturday 0 week"));
            //  print_r($data['week_to_date_fillter']);exit;
             $fdate =" AND receipt_date>='".$data['week_from_date_fillter']."'";
             $tdate =" AND receipt_date<='".$data['week_to_date_fillter']."'";
            }
                     }
                    if($data['dt_fill']=="monthly"){
                   
                        $first=date('Y-m-01');
                        $last=date('Y-m-t');
                        $fdate =" AND receipt_date>='".$first."'";
                        
                       
                            $tdate ="AND receipt_date<='".$last."'";
                        }
                        if($data['dt_fill']=="custom Date"){
                        if($data['from_date_fillter']!=''){
                            $first=date('Y-m-d',strtotime($data['from_date_fillter']));
                            $fdate =" AND receipt_date>='".$first."'";
                            
                            }
                            else{
                                $fdate ='';
                            }
                            if($data['to_date_fillter']!=''){
                                $last=date('Y-m-d',strtotime($data['to_date_fillter']));
                                $tdate =" AND receipt_date<='".$last."'";
                                
                                }
                                else{
                                    $tdate ='';
                                } }
        

                               $data['bill_id'] = $this->input->post('bill_id');
                                 if($data['bill_id']!=''){
                                 $property_id =" AND property_id LIKE'%".$data['bill_id']."%'";
                                 }
                                  else{
                                 $property_id ='';
                                }

                                $page       = isset($_GET['page']) ? $_GET['page'] : 1;
        
                                $limit      = 50;
                                $offset     = ($page - 1) * $limit +1;
                                $page_limit=$offset+$limit-1;
       
      
        // $data['re_pur_receipt_list']  = $this->db->query("SELECT * FROM realestate_purchase_receipt WHERE status='Y' $fdate $tdate $property_id  ")->result_array();

        $data['re_pur_receipt_list']  = $this->db->query(" SELECT  * FROM 
        ( SELECT *, ROW_NUMBER() OVER (ORDER BY id DESC) AS sl FROM realestate_purchase_receipt WHERE  status='Y' $fdate $tdate $property_id )N 
         WHERE sl BETWEEN $offset AND $page_limit ")->result_array();

        $data['count'] = count($this->db->query("SELECT * FROM realestate_purchase_receipt WHERE status='Y' $fdate $tdate $property_id ORDER BY id DESC")->result_array());

        $data['exportrepurchasereceipt'] = json_encode($this->db->query("SELECT * FROM realestate_purchase_receipt WHERE status='Y' $fdate $tdate $property_id ORDER BY id DESC")->result_array());

        
        
        $this->load->view('realestatepurchasereceipt/realestate_purchase_receipt_list',$data);
    }
    
    public function newpropertypurchasereceipt()
    {
      $this->load->view('realestatepurchasereceipt/new_prop_purchase_receipt');
    }
    
    public function realestate_purchaes_receipt_view(){

    $sid = $_GET['id'];
        $data = $this->Realestate_purchase_receipt_model->get_pr_list_view($sid);
        echo json_encode($data[0]);

  
 
   }
   public function payment_details(){

      $prid = $_POST['id'];
      // print_r($sdid); exit;
      
      $getid = $this->db->query("SELECT * FROM realestate_purchase_receipt where id='".$prid."' ")->row();
      // print_r($getid ); exit;
      $payment_id = $getid->recepit_id;

      $data['payment_detail'] = $this->Realestate_purchase_receipt_model->get_payment_details($payment_id);

     
  

         $cash = $this->Realestate_purchase_receipt_model->get_cash($payment_id);
         // print_r($cash);exit;

         $cash_amount   =$cash->amount;
         $cash_detail   =$cash->remarks;

         // print_r($cash_detail);exit;
         
          $cheque = $this->Realestate_purchase_receipt_model->get_cheque($payment_id);
         // print_r($cheque);
          $cheque_amount    =$cheque->amount;
          $chq_refno        =$cheque->cheque_ref_no;
          $chq_sup_bank     =$cheque->party_bank;
          $chq_detail       =$cheque->remarks;


         

           $upi = $this->Realestate_purchase_receipt_model->get_upi($payment_id);
           // print_r($upi);exit;
           $upi_amount      =$upi->amount;
           $upi_refno       =$upi->cheque_ref_no;
           $upi_cbank       =$upi->company_bank?$upi->company_bank:'-';
           $upi_detail      =$upi->remarks;


           if($cash_amount>0){
           $cash_tr='
                    <tr>
                    <td><label class="col-form-label fw-bold fs-3">Cash</label></td>
                    <td><label class="col-form-label fw-bold fs-7">'.$cash_amount.'</label></td>
                    <td>-</td>
                    <td>-</td>
                    <td><label class="col-form-label fw-bold fs-7">'.$cash_detail.'</label></td>
                    </tr>
                    ';
            }else{
               $cash_tr ='';
            }
            if($cheque_amount>0){
            $cheque_tr='
                    <tr>
                    <td><label class="col-form-label fw-bold fs-3">Cheque</label></td>
                    <td><label class="col-form-label fw-bold fs-7">'.$cheque_amount.'</label></td>
                    <td><label class="col-form-label fw-bold fs-7">'.$chq_refno.'</label></td>
                    <td><label class="col-form-label fw-bold fs-7">'.$chq_sup_bank.'</label></td>
                    <td><label class="col-form-label fw-bold fs-7">'.$chq_detail.'</label></td>
                    </tr>';
            }
            else{$cheque_tr=''; }


            if($upi_amount>0){
            $upi_pay=
                     '<tr><td><label class="col-form-label fw-bold fs-3">UPI</label></td>
                      <td><label class="col-form-label fw-bold">'.$upi_amount.'</label></td>
                      <td><label class="col-form-label fw-bold">'.$upi_refno.'</label></td>
                      <td><label class="col-form-label fw-bold">'.$upi_cbank.'</label></td>
                      <td><label class="col-form-label fw-bold">'.$upi_detail.'</label></td></tr>';  
                    // echo  $upi_pay;  
                  }
                  else{
                    $upi_pay='';
                  }
             


             echo ''.'||'.$cash_tr.'||'.$cheque_tr.'||'. $upi_pay;  

    }
   

    public function idList()
    {
   
      $search =  $_GET['query']; 
      // print_r($search);exit();
      $rows = $this->db->query("SELECT TOP 20 * FROM realestate_purchase WHERE property_id LIKE '".'%'.$search.'%'."' AND  balance_amount!='0' AND status='Y' AND property_status='New'  ")->result_array();

      $res='[';
        if(count($rows)>0) {



          foreach($rows as $row )
          {

            $title=$row['property_id'];
            $name='';
            $id=$row['id'];
            $property_id=$row['property_id'];
            $date=$row['date'];
            $party_name=$row['party_name'];
            $ref_name=$row['ref_name'];
            $property_type =$row['property_type'];
            $price_per_ploat=$row['price_per_ploat'];
            $street = $row['street'];
            $area = $row['area'];
            $city = $row['city'];
            $state = $row['state'];
            $lattitude = $row['lattitude'];
            $longtitude = $row['longtitude'];
            $description = $row['description'];
            $pro_amount = $row['pro_amount'];
            $paid_amount =$row['paid_amount'];
            $balance_amount =$row['balance_amount'];

            

             


            $address=$street.', '.$area.','.$city.','.$state;

            if(isset($row['agent_name1'])){
            $agent_name1 = $row['agent_name1'];
            $agent_amt1 = $row['agent_amt1'];
             }
            
              $vao_group = $row['vao_group'];
              $register_office = $row['register_office'];
              $servey_no = $row['servey_no'];
              $partental_dno = $row['partental_dno'];
              $document_curno = $row['document_curno'];
              $patta_no = $row['patta_no'];
              $ploat_no = $row['ploat_no'];
              $ploat_type = $row['ploat_type'];
              $total_property_amount = $row['total_property_amount'];

           
        

            $res.='{ "title":"'.$title.'","id": "'.$id.'","property_id":"'.$property_id.'","date":"'.$date.'","party_name":"'.$party_name.'","ref_name":"'.$ref_name.'","property_type":"'.$property_type.'","price_per_ploat":"'.$price_per_ploat.'","address":"'.$address.'","lattitude":"'.$lattitude.'","longtitude":"'.$longtitude.'","description":"'.$description.'","pro_amount":"'.$pro_amount.'","vao_group":"'.$vao_group.'","register_office":"'.$register_office.'","servey_no":"'.$servey_no.'","partental_dno":"'.$partental_dno.'","patta_no":"'.$patta_no.'","ploat_no":"'.$ploat_no.'","ploat_type":"'.$ploat_type.'","paid_amount":"'.$paid_amount.'","balance_amount":"'.$balance_amount.'","total_property_amount":"'.$total_property_amount.'"},';

              
          }
          $res=rtrim($res,',');
          $res.=']';
        }
        else{
          $res.=']';
        }
        print_r($res);die();
  
    }
    
      public function purchase_receipt_save()
      {

      $data['rec_date']  = $this->input->post('recipt_date');
      // print_r($data['rec_date']);

        $rec_date=date('Y-m-d',strtotime($data['rec_date']));
        // print_r($rec_date); exit();
         $last_pid_detail = $this->Realestate_purchase_receipt_model->last_p_r_id_details();
         // print_r($last_pid_detail);
         if($last_pid_detail){

            $last_data= $last_pid_detail? $last_pid_detail->recepit_id :0;



                $year = substr( date("y"), -2);
                $slice = explode("/", $last_data);
                $result = preg_replace('/[^0-9]/',' ', $slice[0]); 
                // print_r($result);

                function request_num ($input, $pad_len = 3  , $prefix = null) {
                    if ($pad_len <= strlen($input))
                        trigger_error('<strong>$pad_len</strong> cannot be less than or equal to the length of <strong>$input</strong> to generate invoice number', E_USER_ERROR);
                
                    if (is_string($prefix))
                        return sprintf("%s%s", $prefix, str_pad($input, $pad_len, "0", STR_PAD_LEFT));
                
                    return str_pad($input, $pad_len, "0", STR_PAD_LEFT);
                }

                $request =  request_num(((int)$result+1), 3, "AREPR-");
                
                $request_id =  $request.'/'.$year;

              $recepit_id = $request_id;
              // print_r($recepit_id);
              }
              else{
                $year = substr( date("y"), -2);
                $recepit_id=  'AREPR-001/'.$year;
               

                // print_r($recepit_id);
                // print_r($data);exit;
               }

                $data['recepit_id'] =  $recepit_id;

                $data['pur_id_rec'] =  $this->input->post('pur_id_rec');
                $data['net_amount'] = $this->input->post('net_payable_amount_lab_hidden');
                $data['cr_paid'] =  $this->input->post('payment_paid_amt_hidden');
                $data['cr_bal'] =  $this->input->post('payment_bal_amt_hidden');
                // $data['cr_bal'] =  $this->input->post('');
                $data['net_payable'] =  $this->input->post('payment_net_payable_amount_lab_hidden');

         $data['pay_mode'] =$this->input->post('cash_chk');
         $data['cash_amount'] =$this->input->post('cashamount');
          $data['cash_detail'] =$this->input->post('cashdetail');
           $data['recepit_id'] =$recepit_id;

        
        // print_r($cash);exit;
          $data['pay_mode'] =$this->input->post('bank_chk');
           $data['cheque_amt'] =$this->input->post('chequeamount');
            $data['cheque_bk'] =$this->input->post('chequebank');
             $data['cheque_refno'] =$this->input->post('chequerefno');
              $data['cheque_detail'] =$this->input->post('chequedetail');
               $data['recepit_id'] =$recepit_id;
          




             $data['pay_mode'] =$this->input->post('upi_chk');
             $data['upi_amt'] =$this->input->post('upiamount');
             $data['upi_refno'] =$this->input->post('upirefno');
             // $data['upi_bank'] =$this->input->post('upibank');
             $data['upi_detail'] =$this->input->post('upidetail');
             $data['recepit_id'] =$recepit_id;
            
        

               
         $result  = $this->db->query("INSERT INTO realestate_purchase_receipt
           (recepit_id
           ,property_id
           ,receipt_date
           ,net_amount
           ,cr_paid_amount
           ,cr_balance_amount
           ,net_payable
           ,status
           ,create_by
           ,create_on
           )
     VALUES
           ('".$data['recepit_id']."'
           ,'".$data['pur_id_rec']."'
       
           , '".$rec_date."'
           ,'".$data['net_amount']."'
           ,'".$data['cr_paid']."'
           ,'".$data['cr_bal']."'
           ,'".$data['net_payable']."'
           
           ,'Y'
           , '".$_SESSION['username']."' 
           ,'".date('Y-m-d H:i:s')."')");  
         // print_r($data['cr_bal']);
         // print_r($data['pur_id_rec']);exit();

         $get_last_paid_amt = $this->db->query("SELECT * FROM realestate_purchase where property_id='".$data['pur_id_rec']."' ")->row();
               $old_paid_amt = $get_last_paid_amt->paid_amount;
               $paying_amt   = $data['cr_paid'];
               $update_amt   = $old_paid_amt + $paying_amt;

         $res= $this->db->query("UPDATE realestate_purchase SET balance_amount='".$data['cr_bal']."',paid_amount='".$update_amt."' where property_id='".$data['pur_id_rec']."'");
         // print_r($res);

         if ($result) {

            $cash   = $this->Realestate_purchase_receipt_model->cashsave($data);
            $cheque = $this->Realestate_purchase_receipt_model->chequesave($data);
            $upi    = $this->Realestate_purchase_receipt_model->upisave($data);

              add_notification(date('Y-m-d H:i:s'), '', "Others", "Realestate<br> New Purchase Receipt", $data['recepit_id']. ' created By ' .$_SESSION['username'],'', $_SESSION['USERID'], '0', $data['recepit_id']);
         }


        if($result)
        {
            $this->session->set_flashdata('g_success',  $data['recepit_id'].' &nbsp;Purchase Receipt have been added successfully...');
        }else{
           $this->session->set_flashdata('g_err', 'Could not add purchase  Receipt !');
        }
        redirect('Realestatepurchasereceipt/');
         
    }



   


}
