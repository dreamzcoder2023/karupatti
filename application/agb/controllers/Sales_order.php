<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/* ************************************************************************************
        Purpose : To handle all Department functions 2022-08-19
***************************************************************************************/
class Sales_order extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        // $this->load->model(array("jst_inventory_model","Accountsgroup_model"));
        // $this->load->library('user_agent');

        // $fin_year=$this->Accountsgroup_model->get_fin_years_list();
        // $db=substr($fin_year->DBNAME,0,strlen($fin_year->DBNAME)-4);
        // //echo $db;exit;
        // $config_app = switch_db_dynamic($db);
        
        // $this->jst_inventory_model->other_db = $this->load->database($config_app,TRUE);

        if (isset($this->session->userdata['username']) && $this->session->userdata['username'] == TRUE)
        {
            //do something
        }else{
            redirect('login'); //if session is not there, redirect to login page
        } 
        date_default_timezone_set("Asia/Kolkata");
        // $this->session->set_userdata('comtitle', 'Tagentry');
    }


    public function index()

    {


        $data['company_fill'] = $this->input->post('company_fill');
        if($data['company_fill']!=''){
        $cname =" AND company='".$data['company_fill']."'";
        
        }
        else{
            $cname ='';
        }
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
    $fdate =" AND sales_order_date='".$data['today_date_fillter']."'";
    $tdate ='';
    
        
    
}
if($data['dt_fill']=="week"){
    $today=date('l');
    if($today=="Sunday"){
        $data['week_from_date_fillter']=date(' Y-m-d', strtotime("sunday 0 week"));
   
        $data['week_to_date_fillter']=date(' Y-m-d', strtotime("saturday 1 week"));
       // print_r($data['week_to_date_fillter']);exit;
            $fdate =" AND sales_order_date>='".$data['week_from_date_fillter']."'";
        $tdate =" AND sales_order_date<='".$data['week_to_date_fillter']."'";

    }else{
     $data['week_from_date_fillter']=date(' Y-m-d', strtotime("sunday -1 week"));
   
     $data['week_to_date_fillter']=date(' Y-m-d', strtotime("saturday 0 week"));
    //  print_r($data['week_to_date_fillter']);exit;
         $fdate =" AND sales_order_date>='".$data['week_from_date_fillter']."'";
     $tdate =" AND sales_order_date<='".$data['week_to_date_fillter']."'";
    }
             }
            if($data['dt_fill']=="monthly"){
           
                $first=date('Y-m-01');
                $last=date('Y-m-t');
                $fdate =" AND sales_order_date>='".$first."'";
                
               
                    $tdate ="AND sales_order_date<='".$last."'";
                }
                if($data['dt_fill']=="custom Date"){
                if($data['from_date_fillter']!=''){
                    $first=date('Y-m-d',strtotime($data['from_date_fillter']));
                    $fdate =" AND sales_order_date>='".$first."'";
                    
                    }
                    else{
                        $fdate ='';
                    }
                    if($data['to_date_fillter']!=''){
                        $last=date('Y-m-d',strtotime($data['to_date_fillter']));
                        $tdate =" AND sales_order_date<='".$last."'";
                        
                        }
                        else{
                            $tdate ='';
                        } }

                        $page       = isset($_GET['page']) ? $_GET['page'] : 1;

						$limit      = 10;
						$offset     = ($page - 1) * $limit +1;
						$page_limit=$offset+$limit-1;

        $data['company_list']  = $this->db->query("SELECT * FROM COMPANY WHERE ACTIVE='Y'  ")->result_array();
        // $data['sales_order_list']  = $this->db->query("SELECT * FROM sales_order WHERE status!='' $fdate $tdate $cname ORDER BY id DESC  ")->result_array();
        $data['sales_order_list']  = $this->db->query(" SELECT  * FROM  ( SELECT *, ROW_NUMBER() OVER (ORDER BY id DESC) AS sl FROM sales_order WHERE  status!='' $fdate $tdate $cname  )N  WHERE      sl BETWEEN $offset AND $page_limit ")->result_array();
    $data['count']=count($this->db->query("SELECT * FROM sales_order WHERE status!='' $fdate $tdate $cname ORDER BY id DESC  ")->result_array());
        $data['sales_order_total']  = $this->db->query("SELECT SUM(paid_amount) as tot_paid,SUM(balance_amount) as tot_bal,COUNT(id) as tot_count  FROM sales_order WHERE status!='' $fdate $tdate $cname   ")->row();
        $this->load->view('sales_order/sales_order_entry',$data);
    }


    public function new_sales_order()

    {
    $data['current_rate']  = $this->db->query("SELECT * FROM SETUP  ")->row();
    $data['metal_type_list']  = $this->db->query("SELECT * FROM jewel_type  ")->result_array();
    $data['company_list']  = $this->db->query("SELECT * FROM COMPANY WHERE ACTIVE='Y'  ")->result_array();
    $data['bankers_list']  = $this->db->query("SELECT * FROM BANKS")->result_array();
    $data['purity_list']  = $this->db->query("SELECT * FROM ITEMPURITY WHERE status='0' ")->result_array();  
    $data['gold_item']  = $this->db->query("SELECT * FROM ITEMS  WHERE jewel_type_id='1' ")->result_array();
    $data['silver_item']  = $this->db->query("SELECT * FROM ITEMS WHERE jewel_type_id='2' ")->result_array();

        $this->load->view('sales_order/new_sales_order_entry',$data);
    }
    public function new_sales_order_save()

    {

        // $date = $this->input->post('date');
        $date = date("Y-m-d");

        $party_name = $this->input->post('party_name');
        $party_mobile = $this->input->post('party_mobile');
        $party_address = $this->input->post('party_address');
        $data['company_id'] = $this->input->post('company_id');

        $net_payable = $this->input->post('net_payable');
        $paid_amount = $this->input->post('paid_amount');
        $balance_amount = $this->input->post('balance_amount');
        

        $cash_amt = $this->input->post('cash_amt');
        $cash_details = $this->input->post('cash_details');
        $cheque_amt = $this->input->post('cheque_amt');
        $cheque_bank = $this->input->post('cheque_bank');
        $cheque_no = $this->input->post('cheque_no');
        $cheque_details = $this->input->post('cheque_details');
        $rtgs_amt = $this->input->post('rtgs_amt');
        $rtgs_bank = $this->input->post('rtgs_bank');
        $rtgs_no = $this->input->post('rtgs_no');
        $rtgs_details = $this->input->post('rtgs_details');
        $upi_amt = $this->input->post('upi_amt');
        $upi_trans_no = $this->input->post('upi_trans_no');
        $upi_details = $this->input->post('upi_details');
        $party_id= $this->input->post('party_id');
        $data['status'] = 'Y';
        $y = date("y");
        $data['added_user'] = $_SESSION['username'];
        $data['created_on'] = date('Y-m-d H:i:s');
        

        $item_name = $this->input->post('nt_item');
      
       
        $subitem = $this->input->post('nt_subitem');
        $quality = $this->input->post('nt_quality');
        $purity = $this->input->post('nt_purity');
        $current_rate = $this->input->post('nt_item_rate');
        $weight = $this->input->post('nt_item_weight');
        $narration = $this->input->post('narration');
        $delivery_date = $this->input->post('delivery_date');
        $est_amount = $this->input->post('nt_item_amount');
       


        $net_payable = $this->input->post('net_payable_2');
        $paid_amt = $this->input->post('paid_amount_1');
        $balance_amt = $this->input->post('balance_amount_1');
        $total_amount = $this->input->post('net_payable_1');

        $cr_bal_date = $this->input->post('cr_bal_date');
        $adj_discount = $this->input->post('adj_discount');
        $sales_amt = $this->input->post('sales_amt');
        $img = $this->input->post('img');
        $credit_balance = $this->input->post('credit_balance');
if($credit_balance=='on'){
$credit_balance='YES';

}
else{
    $credit_balance='NO';
}
$sales_gold_count= $this->input->post('sales_gold_count_1');

$sales_gold_weight= $this->input->post('sales_gold_weight_1');
// print_r($sales_gold_weight);exit();
$sales_gold_amount= $this->input->post('sales_gold_amount_1');
$sales_silver_count= $this->input->post('sales_silver_count_1');
     $sales_silver_weight= $this->input->post('sales_silver_weight_1');
$sales_silver_amount= $this->input->post('sales_silver_amount_1');

$oge_gold_count= $this->input->post('oge_gold_count_1');
$oge_gold_weight= $this->input->post('oge_gold_weight_1');
$oge_gold_amount= $this->input->post('oge_gold_total_1');
$oge_silver_count= $this->input->post('oge_silver_count_1');
$oge_silver_weight= $this->input->post('oge_silver_weight_1');
$oge_silver_amount= $this->input->post('oge_silver_total_1');


$oge_item_type = $this->input->post('oge_item_type');
$oge_item = $this->input->post('oge_item');
$oge_subitem = $this->input->post('oge_subitem');
$oge_purity = $this->input->post('oge_purity');
$oge_quality = $this->input->post('oge_quality');
$oge_weight = $this->input->post('oge_weight');
$oge_st_weight = $this->input->post('oge_st_weight');
$oge_less = $this->input->post('oge_less');
$oge_net_weight = $this->input->post('oge_net_weight');
$oge_est_amount = $this->input->post('oge_est_amount');

$mem_card_no = $this->input->post('mem_card_no');
$mem_card_redeem_points = $this->input->post('mem_card_redeem_points');
$mem_card_details = $this->input->post('mem_card_details');
$inventory_jewel_image_data = $this->input->post('inventory_jewel_image_data');
$inventory_jewel_image_data1 = $this->input->post('inventory_jewel_image_data1');


$m_points_ad = $data['m_points_ad'] = $this->input->post('m_points_ad');
$cust_add_m_point=$this->db->query("UPDATE PARTIES SET MEMBERSHIP_POINTS=MEMBERSHIP_POINTS+".$m_points_ad." WHERE PID='".$party_id."'");
$card_add_m_point=$this->db->query("UPDATE MEMBERSHIP_CARD SET POINTS=POINTS+".$m_points_ad." WHERE PID='".$party_id."'");
$card_det=$this->db->query("select * from MEMBERSHIP_CARD where PID='".$party_id."'")->row();


$sales = $this->db->query("SELECT * FROM sales_order order by id desc ")->row();
if(isset($sales)){
$sales_id=$sales->id+1;
}
else{
    $sales_id=1;
}
$prefix="SO-";
$suffix="/".$y;
$data['sales_order_id']=$prefix.str_pad($sales_id,4,0,STR_PAD_LEFT).$suffix;

$billno=$data['sales_order_id'];
$process="New Sales - Deduction";
    $mem_card_point_upd=$this->db->query("UPDATE MEMBERSHIP_CARD SET POINTS=POINTS-".$mem_card_redeem_points." WHERE PID='".$party_id."' ");
    $party_mem_point_upd=$this->db->query("UPDATE PARTIES SET MEMBERSHIP_POINTS=MEMBERSHIP_POINTS-".$mem_card_redeem_points." WHERE PID='".$party_id."'");
    add_member_card_history($mem_card_no,$party_id,$process,$mem_card_redeem_points,$billno);


if($cash_amt>0){
$result  = $this->db->query("INSERT INTO payment_inward_outward(module_name, type_of_payment, amount, party_bank, cheque_ref_no, company_bank, remarks, bill_no, party_id, payment_side, metal_type, quality, purity, weight, pure_metal_weight,  created_by, created_on, record_status) VALUES('Sales Order','Cash','".$cash_amt."','','','','".$cash_details."','".$data['sales_order_id']."','".$party_id."','CR','','','','0.00','0.00','".$_SESSION['username']."','".date('Y-m-d H:i:s')."','0')");
}
if($cheque_amt>0){
$result  = $this->db->query("INSERT INTO payment_inward_outward(module_name, type_of_payment, amount, party_bank, cheque_ref_no, company_bank, remarks, bill_no, party_id, payment_side, metal_type, quality, purity, weight, pure_metal_weight,  created_by, created_on, record_status) VALUES('Sales Order','Cheque','".$cheque_amt."','".$cheque_bank."','".$cheque_no."','','".$cheque_details."','".$data['sales_order_id']."','".$party_id."','CR','','','','0.00','0.00','".$_SESSION['username']."','".date('Y-m-d H:i:s')."','0')");
}
if($rtgs_amt>0){
$result  = $this->db->query("INSERT INTO payment_inward_outward(module_name, type_of_payment, amount, party_bank, cheque_ref_no, company_bank, remarks, bill_no, party_id, payment_side, metal_type, quality, purity, weight, pure_metal_weight,  created_by, created_on, record_status) VALUES('Sales Order','RTGS','".$rtgs_amt."','".$rtgs_bank."','".$rtgs_no."','','".$rtgs_details."','".$data['sales_order_id']."','".$party_id."','CR','','','','0.00','0.00','".$_SESSION['username']."','".date('Y-m-d H:i:s')."','0')");
}
if($upi_amt>0){
$result  = $this->db->query("INSERT INTO payment_inward_outward(module_name, type_of_payment, amount, party_bank, cheque_ref_no, company_bank, remarks, bill_no, party_id, payment_side, metal_type, quality, purity, weight, pure_metal_weight,  created_by, created_on, record_status) VALUES('Sales Order','UPI','".$upi_amt."','".$cheque_bank."','".$upi_trans_no."','','".$upi_details."','".$data['sales_order_id']."','".$party_id."','CR','','','','0.00','0.00','".$_SESSION['username']."','".date('Y-m-d H:i:s')."','0')");
}
if($mem_card_redeem_points>0){
    $result  = $this->db->query("INSERT INTO payment_inward_outward(module_name, type_of_payment, amount, party_bank, cheque_ref_no, company_bank, remarks, bill_no, party_id, payment_side, metal_type, quality, purity, weight, pure_metal_weight,  created_by, created_on, record_status) VALUES('Sales Order','Membership Points','".$mem_card_redeem_points."','','','','".$mem_card_details."','".$data['sales_order_id']."','".$party_id."','CR','','','','0.00','0.00','".$_SESSION['username']."','".date('Y-m-d H:i:s')."','0')");
    }


$result_insert = $this->db->query("INSERT INTO sales_order(
    sales_order_id,
    sales_order_date,
    party_id,
    remain_days,
    company,
sales_gold_count,
sales_silver_count
,sales_gold_weight
      ,sales_gold_amount
     
      ,sales_silver_weight
      ,sales_silver_amount
,old_gold_count
      ,old_gold_weight
      ,old_gold_amount
      ,old_silver_count
      ,old_silver_weight
      ,old_silver_amount
      ,total_amount
      ,discount
      ,net_payable
      ,paid_amount
      ,balance_amount
      ,add_credit_balance
      ,credit_balance_date,
    created_on,
        created_by,
        status)VALUES
        ( '".$data['sales_order_id']."',
            '".$date."',
     '".$party_id."',
     '0',
     '".$data['company_id']."',
     '".$sales_gold_count."',
     '".$sales_silver_count."',
     '".$sales_gold_weight."',
     '".$sales_gold_amount."',
     '".$sales_silver_weight."',
     '".$sales_silver_amount."',
     '".$oge_gold_count."',
     '".$oge_gold_weight."',
     '".$oge_gold_amount."',
     '".$oge_silver_count."',
     '".$oge_silver_weight."',
     '".$oge_silver_amount."',
     '".$total_amount."',
     '".$adj_discount."',
     '".$net_payable."',
     '".$paid_amt."',
     '".$balance_amt."',
     '".$credit_balance."',
     '".$cr_bal_date."',
     
     
     '".$data['created_on']."',
     '".$data['added_user']."',
     '".$data['status']."')");
     
     $ext=0;
    for($i=0;$i<10;$i++){
    
        if($i==0){
            $img_id=str_pad($sales_id,4,0,STR_PAD_LEFT);
        }
        else{
            $img_id1=str_pad($sales_id,4,0,STR_PAD_LEFT);
            $img_id=$img_id1.''.$i;
        }
        // if(!empty($_FILES['add_party_redemp']['name'][$i])){
      
        //     $_FILES['file']['name'] = $_FILES['add_party_redemp']['name'][$i];
        //     $_FILES['file']['type'] = $_FILES['add_party_redemp']['type'][$i];
        //     $_FILES['file']['tmp_name'] = $_FILES['add_party_redemp']['tmp_name'][$i];
        //     $_FILES['file']['error'] = $_FILES['add_party_redemp']['error'][$i];
        //     $_FILES['file']['size'] = $_FILES['add_party_redemp']['size'][$i];
        //           $ext = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
        //     $config['upload_path'] = 'assets/images/sales_order_image'; 
        //     $config['allowed_types'] = 'jpg|jpeg|png|gif';
        //     $config['max_size'] = '50000';
        //     $config['file_name'] = $img_id;
     
        //     $this->load->library('upload',$config); 
      
        //     if($this->upload->do_upload('file')){
        //       $uploadData = $this->upload->data();
        //       $filename = $uploadData['file_name'];
     
        //       $data['totalFiles'][] = $filename;
        //     }
          
        // }
        $ext="png";
        $uploadpath   = 'assets/images/sales_order_image/';
        $parts        = explode(";base64,", $inventory_jewel_image_data[$i]);
        $imageparts   = explode("image/", @$parts[0]);
        $imagetype    = $imageparts[1];
        $imagebase64  = base64_decode($parts[1]);
        $file         = $uploadpath . $img_id .'_'.$y. '.png';
        file_put_contents($file, $imagebase64);

          $img=$img_id."_".$y.".". $ext;

        // $img=$img_id.".". $ext;

        if($item_name[$i]!=''){
        $item_detail=explode('_',$item_name[$i]);
        if($item_detail[0]=='gold'){
            $item_type='1';
        }
else{
    $item_type='2';
}

        $res = $this->db->query("INSERT INTO sales_order_tagged_item (
            sales_order_id,
         
           item_type,
           item,
           subitem,
           quality,
            purity,
          current_rate,
           weight,
         img,
         narration,
         delivery_date,
           est_amount,
           created_on,
        created_by,
           status
        
    ) VALUES(
        '". $data['sales_order_id']."',
   
    
    '".$item_type."',
    '".$item_detail[1]."',
    '".$subitem[$i]."',
    '".$quality[$i]."',
    '".$purity[$i]."',
    '".$current_rate[$i]."',
    '".$weight[$i]."',
    '".$img."',
    '".$narration[$i]."',

    '".$delivery_date[$i]."',
    '".$est_amount[$i]."',
    
   
    '".$data['created_on']."',
    '".$data['added_user']."',
    'Y'
    )");

    }
    }
    
     $ext=0;
    for($i=0;$i<10;$i++){
       
        if(($oge_item_type[$i]!='')&&($oge_item[$i]!='')){
         
            if($i==0){
                $img_id=str_pad($sales_id,4,0,STR_PAD_LEFT);
            }
            else{
                $img_id1=str_pad($sales_id,4,0,STR_PAD_LEFT);
                $img_id=$img_id1.''.$i;
            }
            
           
          
            // if(!empty($_FILES['add_party_redemp1']['name'][$i])){
      
            //     $_FILES['file']['name'] = $_FILES['add_party_redemp1']['name'][$i];
            //     $_FILES['file']['type'] = $_FILES['add_party_redemp1']['type'][$i];
            //     $_FILES['file']['tmp_name'] = $_FILES['add_party_redemp1']['tmp_name'][$i];
            //     $_FILES['file']['error'] = $_FILES['add_party_redemp1']['error'][$i];
            //     $_FILES['file']['size'] = $_FILES['add_party_redemp1']['size'][$i];
            //           $ext = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
            //     $config['upload_path'] = 'assets/images/sales_order_old_metal'; 
            //     $config['allowed_types'] = 'jpg|jpeg|png|gif';
            //     $config['max_size'] = '50000';
            //     $config['file_name'] = $img_id;
         
            //     $this->load->library('upload',$config); 
          
            //     if($this->upload->do_upload('file')){
            //       $uploadData = $this->upload->data();
            //       $filename = $uploadData['file_name'];
         
            //       $data['totalFiles'][] = $filename;
            //     }
              
            // }

            $ext="png";
            $uploadpath   = 'assets/images/sales_order_old_metal/';
            $parts        = explode(";base64,", $inventory_jewel_image_data1[$i]);
            $imageparts   = explode("image/", @$parts[0]);
            $imagetype    = $imageparts[1];
            $imagebase64  = base64_decode($parts[1]);
            $file         = $uploadpath . $img_id .'_'.$y. '.png';
            file_put_contents($file, $imagebase64);
    
              $img=$img_id."_".$y.".". $ext;
            
            //   $img=$img_id.".". $ext;
            

     $res = $this->db->query("INSERT INTO salesentry_old_exchange (
        sales_entry_id,
       company_id,
       item_type,
       item_name,
       subitem_name,
       purity,
       quality,
       weight,
       st_weight,
       less,
       net_weight,
       est_amount,
       img,
       sales_id,
       status
) VALUES(
    '1',    
'".$data['company_id']."',
'".$oge_item_type[$i]."',
'".$oge_item[$i]."',
'".$oge_subitem[$i]."',
'".$oge_purity[$i]."',
'".$oge_quality[$i]."',
'".$oge_weight[$i]."',
'".$oge_st_weight[$i]."',
'".$oge_less[$i]."',
'".$oge_net_weight[$i]."',
'".$oge_est_amount[$i]."',
'".$img."',
'". $data['sales_order_id']."',
'Y'
)");
}
    }



    $data['ac_chitpay_mode'] =$this->input->post('chit_hand_loan_paid_from_party_add_radio');
    $data['ac_chit_red_amount'] =$this->input->post('chit_red_amt');
    $data['chit_id'] =$this->input->post('chit_option');
    $data['ac_chit_red_detail'] =$this->input->post('chit_red_det');
    $data['ac_chit_av_amount'] =$this->input->post('cur_amt_hidden');

    $trans_detail=$this->db->query("SELECT * FROM CHIT_TRANSACTION ORDER BY sno DESC")->row(); 
    $trans=$trans_detail->sno+1;
    $prefix="TRANS-";
    $data['trans_id']=$prefix.$trans;

    


   $chit_pay= $this->db->query("INSERT INTO payment_inward_outward
    (module_name
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
     'Sales_order',
     '".$data['ac_chitpay_mode']."',
     '".$data['ac_chit_red_amount']."',
     '".$data['chit_id']."',
     '',
     '".$data['ac_chit_red_detail']."',
     '".$data['sales_order_id']."',
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
         VALUES ('".$date."',
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
         VALUES ('".$date."',
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
 




    add_notification(date('Y-m-d H:i:s'), $data['company_id'], "Inventory", "New Sales Order ", $data['sales_order_id']. ' Created By ' .$_SESSION['username'],'', $_SESSION['USERID'], '0', $data['sales_order_id']);
       
    if($result_insert)
    {
        $this->session->set_flashdata('g_success', $data['sales_order_id'].' Sales order have been added successfully...');
    }else{
       $this->session->set_flashdata('g_err', 'Could not add Sales order details!');
    }
    
    redirect('Sales_order');
    }
    public function sales_order_view($id)

    {
       $data['sales_order']=$this->db->query("SELECT * FROM sales_order WHERE id='".$id."'  ")->row();
       $data['party_detail'] = $this->db->query("SELECT * FROM PARTIES WHERE PID='".$data['sales_order']->party_id."'  ")->row();
       $data['sales_order_tagged']=$this->db->query("SELECT * FROM sales_order_tagged_item WHERE sales_order_id='".$data['sales_order']->sales_order_id."'  ")->result_array();
       $data['sales_order_old_metal']=$this->db->query("SELECT * FROM salesentry_old_exchange WHERE sales_id='".$data['sales_order']->sales_order_id."'  ")->result_array();
        $this->load->view('sales_order/new_sales_order_view',$data);
    }

    public function get_subitem()
{
    $type = $_POST['typeid'];
  
    $typelist=$this->db->query("SELECT * FROM SUBITEM_LIST WHERE item_id='".$type."'  ")->result_array();
    $option = '<option value="">Select Subitem</option>';
    foreach($typelist as $tlist)
    {
        $option.='<option value="'.$tlist['SUB_ID'].'">'.$tlist['SUBITEM_NAME'].'</option>';
    }
    echo $option;
    
}

public function get_purity()
{
    $type = $_POST['typeid'];
    
    $typelist=$this->db->query("SELECT * FROM ITEMPURITY WHERE  ITEMPURITYID='".$type."'  ")->row();

    $value=$typelist->PERCENTAGE;
    echo $value;
    
}



public function sales_order_tagged_process($id)
{
    $data['sales_order']=$this->db->query("SELECT * FROM sales_order WHERE id='".$id."'  ")->row();
    $data['party_detail'] = $this->db->query("SELECT * FROM PARTIES WHERE PID='".$data['sales_order']->party_id."'  ")->row();
    $data['sales_order_tagged']=$this->db->query("SELECT * FROM sales_order_tagged_item WHERE sales_order_id='".$data['sales_order']->sales_order_id."'  ")->result_array();
    $data['sales_order_old_metal']=$this->db->query("SELECT * FROM salesentry_old_exchange WHERE sales_id='".$data['sales_order']->sales_order_id."'  ")->result_array();
    $data['tagentry_list'] = $this->db->query("SELECT * FROM tag_entry WHERE status='A' ")->result_array();
    

    $this->load->view('sales_order/new_sales_order_process',$data);
}
public function sales_order_maker_process($id)
{
    $data['sales_order']=$this->db->query("SELECT * FROM sales_order WHERE id='".$id."'  ")->row();
    $data['party_detail'] = $this->db->query("SELECT * FROM PARTIES WHERE PID='".$data['sales_order']->party_id."'  ")->row();
    $data['sales_order_tagged']=$this->db->query("SELECT * FROM sales_order_tagged_item WHERE sales_order_id='".$data['sales_order']->sales_order_id."'  ")->result_array();
    $data['sales_order_old_metal']=$this->db->query("SELECT * FROM salesentry_old_exchange WHERE sales_id='".$data['sales_order']->sales_order_id."'  ")->result_array();
    
    $this->load->view('sales_order/new_sales_order_process_maker',$data);
}
public function sales_order_delivered_process($id)
{
    $data['sales_order']=$this->db->query("SELECT * FROM sales_order WHERE id='".$id."'  ")->row();
    $data['party_detail'] = $this->db->query("SELECT * FROM PARTIES WHERE PID='".$data['sales_order']->party_id."'  ")->row();
    $data['sales_order_tagged']=$this->db->query("SELECT * FROM sales_order_tagged_item WHERE sales_order_id='".$data['sales_order']->sales_order_id."'  ")->result_array();
    $data['sales_order_old_metal']=$this->db->query("SELECT * FROM salesentry_old_exchange WHERE sales_id='".$data['sales_order']->sales_order_id."'  ")->result_array();
    
    $this->load->view('sales_order/new_sales_order_process_delivered',$data);
}
public function sales_order_tagged($id)
{
    $tag_no = $this->input->post('tag_no');
    $metal_weight_tag = $this->input->post('metal_weight_tag');
    $sales_amt_tag = $this->input->post('sales_amt_tag');
    $tag_row_id = $this->input->post('tag_row_id');
    $count=count($tag_row_id);
    for($i=0;$i<$count;$i++){
        $update=$this->db->query("UPDATE sales_order_tagged_item SET tag_id='".$tag_no[$i]."',tag_weight='".$metal_weight_tag[$i]."',tag_amount='".$sales_amt_tag[$i]."'  WHERE id='".$tag_row_id[$i]."'");
        $update1= $this->db->query("UPDATE tag_entry SET status='S'  WHERE tag_id= '".$tag_no[$i]."'");
    }
// print_r($i);exit();
    $data['sales_order']=$this->db->query("SELECT * FROM sales_order WHERE id='".$id."'  ")->row();
    $cust_add_m_point=$this->db->query("UPDATE sales_order SET status= 'T' WHERE id='".$id."'");
    redirect('Sales_order');

}
public function sales_order_maker($id)
{
    $data['sales_order']=$this->db->query("SELECT * FROM sales_order WHERE id='".$id."'  ")->row();
    $cust_add_m_point=$this->db->query("UPDATE sales_order SET status= 'M' WHERE id='".$id."'");
    redirect('Sales_order');

}

public function sales_order_delivered($id)
{
    $data['sales_order']=$this->db->query("SELECT * FROM sales_order WHERE id='".$id."'  ")->row();
    $cust_add_m_point=$this->db->query("UPDATE sales_order SET status= 'D' WHERE id='".$id."'");
    redirect('Sales_order');

}
public function sales_order_print($id)
{
    $data['sales_order']=$this->db->query("SELECT * FROM sales_order WHERE id='".$id."'  ")->row();
    $data['party_detail'] = $this->db->query("SELECT * FROM PARTIES WHERE PID='".$data['sales_order']->party_id."'  ")->row();
    $data['company_detail'] = $this->db->query("SELECT * FROM COMPANY WHERE COMPANYCODE='".$data['sales_order']->company."'  ")->row();
    $data['bank_detail'] = $this->db->query("SELECT * FROM BANKS WHERE COMPANYCODE='".$data['sales_order']->company."'  ")->row();
    $data['sales_order_tagged']=$this->db->query("SELECT * FROM sales_order_tagged_item WHERE sales_order_id='".$data['sales_order']->sales_order_id."'  ")->result_array();
    $data['sales_order_old_metal']=$this->db->query("SELECT * FROM salesentry_old_exchange WHERE sales_id='".$data['sales_order']->sales_order_id."'  ")->result_array();

    $this->load->view('sales_order/sales_order_print',$data);
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