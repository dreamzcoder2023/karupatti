<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/* ************************************************************************************
        Purpose : To handle all Department functions 2022-08-19
***************************************************************************************/
class Sales_return extends CI_Controller {

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

    {  $data['company_fill'] = $this->input->post('company_fill');
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

                        $page       = isset($_GET['page']) ? $_GET['page'] : 1;

						$limit      = 10;
						$offset     = ($page - 1) * $limit +1;
						$page_limit=$offset+$limit-1;


        $data['company_list']  = $this->db->query("SELECT * FROM COMPANY WHERE ACTIVE='Y'  ")->result_array();
        $data['count']=count( $this->db->query("SELECT * FROM sales_return WHERE status!='' $fdate $tdate $cname")->result_array());
        $data['sales_return_total']=$this->db->query("SELECT SUM(paid_amount) as tot_paid,SUM(balance_amount) as tot_balance FROM sales_return WHERE status!='' $fdate $tdate $cname")->row();
        // $data['sales_return_list'] = $this->db->query("SELECT * FROM sales_return WHERE status!='' $fdate $tdate $cname")->result_array();
        $data['sales_return_list']  = $this->db->query(" SELECT  * FROM  ( SELECT *, ROW_NUMBER() OVER (ORDER BY id DESC) AS sl FROM sales_return WHERE  status!='' $fdate $tdate $cname  )N  WHERE      sl BETWEEN $offset AND $page_limit ")->result_array();

        $this->load->view('sales_return/salesreturn',$data);

    }

    public function sales_return_add()

    {
        $data['tagentry_list'] = $this->db->query("SELECT * FROM tag_entry WHERE status='A' ")->result_array();
        $data['current_rate']  = $this->db->query("SELECT * FROM SETUP  ")->row();
        $data['purity_list']  = $this->db->query("SELECT * FROM ITEMPURITY WHERE status='0' ")->result_array();  
        $data['company_list']  = $this->db->query("SELECT * FROM COMPANY WHERE ACTIVE='Y'  ")->result_array();
        $data['metal_type_list']  = $this->db->query("SELECT * FROM jewel_type  ")->result_array();
   

        $this->load->view('sales_return/new_sales_return_entry',$data);

    }
    public function sales_return_view($id)

    {
        $data['sales_return']=$this->db->query("SELECT * FROM sales_return WHERE id='".$id."'  ")->row();
        $data['party_detail'] = $this->db->query("SELECT * FROM PARTIES WHERE PID='".$data['sales_return']->party_id."'  ")->row();
        $data['sales_entry']=$this->db->query("SELECT * FROM salesentry WHERE sales_id='".$data['sales_return']->sales_bill_id."'  ")->row();
        $data['sales_return_tagged']=$this->db->query("SELECT * FROM salesentry_detail WHERE sales_return_id='".$data['sales_return']->sales_return_id."' AND tag_no!='-'  ")->result_array();
        $data['sales_return_non_tagged']=$this->db->query("SELECT * FROM salesentry_detail WHERE sales_return_id='".$data['sales_return']->sales_return_id."' AND sale_item_tag='Non tag'  ")->result_array();
        $data['sales_return_old_metal']=$this->db->query("SELECT * FROM salesentry_old_exchange WHERE sales_id='".$data['sales_return']->sales_return_id."'  ")->result_array();
    //print_r($data['sales_return_tagged']);exit();
        $this->load->view('sales_return/new_sales_return_view',$data);

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

            $sales_gold_count=$row['sales_gold_count'];
            $sales_silver_count=$row['sales_silver_count'];
            $sales_gold_weight=$row['sales_gold_weight'];
            $sales_silver_weight=$row['sales_silver_weight'];
            $sales_gold_amount=$row['sales_gold_amount'];
            $sales_silver_amount=$row['sales_silver_amount'];

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
             $item_name1  = $this->db->query("SELECT * FROM ITEMS WHERE  SNO='". $slist['item_name']."' ")->row();
             $item_name=$item_name1->ITEMNAME;
            $item_type=$item_name1->jewel_type_id;
            // print_r( $slist['item_name'] ); exit();
            $subitem =$this->db->query("SELECT * FROM SUBITEM_LIST WHERE SUB_ID='".$slist['subitem_name']."'  ")->row();
             $subitem_name=$subitem->SUBITEM_NAME;
            // $item_name= $slist['item_name'];
            // $subitem_name=$slist['subitem_name'];

            $sid=$slist['id'];
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
             $chech_box='';
            // $chech_box='<label class="form-check form-check-solid is-invalid mt-4"><input class="form-check-input count_checkbox" type="checkbox" name="checkbox[]" id="checkbox'.$i.'" value="'.$tag_no.'"></label>';

            //  $chech_box='<label class='."form-check form-check-solid is-invalid mt-4".'><input class="'."form-check-input count_checkbox".'" type='."checkbox".' name='."checkbox[]".' id='."checkbox$i".' value='."$tag_no".' onclick='."select_all2()".'></label>';
            $sales_row.='<tr><td class='."count_checkbox".' id='."td$i".'>'.$chech_box.'</td><td>'.$tag_no.' <input type='."hidden".' name='."already_sale_type[]".' id='."already_sale_type$i".' value='."$item_type".'  ><input type='."hidden".' name='."sid[]".' id='."sid$i".' value='."$sid".'  ><input type='."hidden".' name='."already_sale_weight[]".' id='."already_sale_weight$i".' value='."$net_weight".'  ><input type='."hidden".' name='."already_sale_amount[]".' id='."already_sale_amount$i".' value='."$total_amount".'  ></td><td>'.$item_name.'</td><td>'.$subitem_name.'</td><td></td><td>'.$quality.'</td><td>'.$purity.'</td><td>'.$weight.'</td><td>'.$stone.'</td><td>'.$net_weight.'</td><td>'.$hc_amount.'</td><td>'.$mc_amount.'</td><td>'.$wc_amount.'</td><td>'.$metal_weight.'</td><td>'.$total_amount.'</td></tr>';
           $i++;
            }

            $res.='{ "title":"'.$title.'","id": "'.$party_id.'","sales_id":"'.$sales_id.'","firstname":"'.$firstname.'","lastname":"'.$lastname.'","member_id":"'.$member_id.'","member_points":"'.$member_points.'","rating":"'.$rating.'","address":"'.$address.'","phone":"'.$phone.'","card_type":"'.$card_type.'","sales_count":"'.$sales_count.'","sales_weight":"'.$sales_weight.'","sales_net_payable":"'.$sales_net_payable.'","sales_paid_amount":"'.$sales_paid_amount.'","sales_balance_amount":"'.$sales_balance_amount.'","sales_gold_count":"'.$sales_gold_count.'","sales_silver_count":"'.$sales_silver_count.'","sales_gold_weight":"'.$sales_gold_weight.'","sales_silver_weight":"'.$sales_silver_weight.'","sales_gold_amount":"'.$sales_gold_amount.'","sales_silver_amount":"'.$sales_silver_amount.'","sales_row":"'.$sales_row.'"},';

         
        }
        $res=rtrim($res,','); 
        $res.=']';
      }
      else{
        $res.=']';
      }
      print_r($res);die();
    }
    Public function get_tag_detail(){
        $type = $_POST['typeid'];
        
        $typelist=$this->db->query("SELECT * FROM tag_entry  where tag_id='".$type."'")->row();
        $purity  = $this->db->query("SELECT * FROM ITEMPURITY WHERE status='0' AND ITEMPURITYID='".$typelist->quality."' ")->row();  
        $item  = $this->db->query("SELECT * FROM ITEMS WHERE  SNO='".$typelist->item_name."' ")->row();  
        $subitem  = $this->db->query("SELECT * FROM SUBITEM_LIST WHERE  SUB_ID='".$typelist->subitem_name."' ")->row();  
    
        $image_url =  base_url().'tag_img/'. $typelist->img; 
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
        echo ''.'||'.$item->ITEMNAME.'||'.$subitem->SUBITEM_NAME.'||'.$typelist->img.'||'.$typelist->purity.'||'.$typelist->weight.'||'.$typelist->stone.'||'.$typelist->net_weight.'||'.$typelist->hallmark_charges.'||'.$typelist->making_charges.'||'.$typelist->wastage_charges.'||'.$typelist->metal_type.'||'.$typelist->img.'||'.$purity->ITEMPURITYNAME.'||'.$typelist->metal_weight.'||'.$img_view.'||'.$typelist->item_name.'||'.$typelist->subitem_name.'||'.$typelist->quality;
    
    }

    public function get_item()
{
    $type = $_POST['typeid'];
    
    $typelist=$this->db->query("SELECT * FROM ITEMS WHERE jewel_type_id='".$type."'   ")->result_array();
    $option = '<option value="">Select Item</option>';
    foreach($typelist as $tlist)
    {
        $option.='<option value="'.$tlist['SNO'].'">'.$tlist['ITEMNAME'].'</option>';
    }
    echo $option;
    // exit(); 
    //return $option;
}

public function get_subitem()
{
    $type = $_POST['typeid'];
  //  print_r($type);
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
public function sales_return_save(){
    $company_id = $this->input->post('company_id');
    $data['company_id'] = $this->input->post('company_id');
     $data['sale_date']= $this->input->post('receipt_date');
      $receipt_date =date('Y-m-d',strtotime($data['sale_date']));
    // $receipt_date = $this->input->post('receipt_date');
    $party_sales = $this->input->post('party_sales');
    $party_id = $this->input->post('party_id');
    
    
    $return_net_payable = $this->input->post('return_net_payable_1');
    $return_paid_amount = $this->input->post('return_paid_amount_1');
    $return_balance_amount = $this->input->post('return_balance_amount_1');

    
    $checkbox = $this->input->post('checkbox');
   $count_checkbox=count($checkbox);
   

    $tag_no = $this->input->post('tag_no');
 
  $item = $this->input->post('item');
  $subitem = $this->input->post('subitem');
  $quality = $this->input->post('quality');
  $purity = $this->input->post('purity');
  $weight = $this->input->post('weight');
  $st_wgt = $this->input->post('st_wgt');
  $net_wgt = $this->input->post('net_wgt');
  $hc_amt = $this->input->post('hc_amt');
  $mc_amt = $this->input->post('mc_amt');
  $wc_amt = $this->input->post('wc_amt');
  $metal_weight = $this->input->post('metal_weight');
  $sales_amt = $this->input->post('sales_amt');
  $img = $this->input->post('img');



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


  $nt_item_type= $this->input->post('nt_item_type');
  $nt_item= $this->input->post('nt_item');
  $nt_subitem= $this->input->post('nt_subitem');
  $nt_quality= $this->input->post('nt_quality');
  $nt_purity= $this->input->post('nt_purity');
  $nt_weight= $this->input->post('nt_weight');
  $nt_stone= $this->input->post('nt_stone');
  $nt_net_weight= $this->input->post('nt_net_weight');
  $nt_hc= $this->input->post('nt_hc');
  $nt_mc= $this->input->post('nt_mc');
  $nt_wc= $this->input->post('nt_wc');
  $nt_metal_weight= $this->input->post('nt_metal_weight');
  $nt_amount= $this->input->post('nt_amount');
  $nt_count= $this->input->post('nt_count1');
  $today=date("Y-m-d");
  $y = date("y");
  $inventory_jewel_image_data = $this->input->post('inventory_jewel_image_data');
  $inventory_jewel_image_data1 = $this->input->post('inventory_jewel_image_data1');

  $sales = $this->db->query("SELECT * FROM sales_return order by id desc ")->row();
  if(isset($sales->id)){
  $sales_id=$sales->id+1;
  }
  else{
    $sales_id=1;
  }
  $prefix="SR-";
  $suffix="/".$y;
  $data['sales_return_id']=$prefix.str_pad($sales_id,4,0,STR_PAD_LEFT).$suffix;

  $paid_from = $this->input->post('paid_from');

  $sales_detail = $this->db->query("SELECT * FROM salesentry WHERE sales_id='".$party_sales."' ")->row();

  $sales_gold_count = $sales_detail->sales_gold_count;
  $sales_silver_count = $sales_detail->sales_gold_count;
  $sales_gold_weight = $sales_detail->sales_gold_weight;
  $sales_silver_weight = $sales_detail->sales_gold_weight;
  $sales_gold_amount = $sales_detail->sales_gold_amount;
  $sales_silver_amount = $sales_detail->sales_gold_amount;

  $replace_gold_count = $this->input->post('sales_gold_count_1');
  $replace_silver_count = $this->input->post('sales_silver_count_1');
  $replace_gold_weight = $this->input->post('sales_gold_weight_1');
  $replace_silver_weight = $this->input->post('sales_silver_weight_1');
  $replace_gold_amount = $this->input->post('sales_gold_amount_1');
  $replace_silver_amount = $this->input->post('sales_silver_amount_1');

  $return_gold_count = $this->input->post('return_gold_count_1');
  $return_silver_count = $this->input->post('return_silver_count_1');
  $return_gold_weight = $this->input->post('return_gold_weight_1');
// $return_gold_weight=1;
  $return_silver_weight = $this->input->post('return_silver_weight_1');
  $return_gold_amount = $this->input->post('return_silver_amount_1');
  $return_silver_amount = $this->input->post('sales_silver_amount_1');

  $exchange_gold_count = $this->input->post('oge_gold_count_1');
  $exchange_silver_count = $this->input->post('oge_silver_total_1');
  $exchange_gold_weight = $this->input->post('oge_gold_weight_1');
  $exchange_silver_weight = $this->input->post('oge_silver_weight_1');
  $exchange_gold_amount = $this->input->post('oge_gold_total_1');
  $exchange_silver_amount = $this->input->post('oge_silver_amount_1');

  $pfc_cash_amt = $this->input->post('pfc_cash_amt');
  $pfc_cash_detail = $this->input->post('pfc_cash_detail');

  $pfc_cheque_amt = $this->input->post('pfc_cheque_amt');
  $pfc_cheque_bank = $this->input->post('pfc_cheque_bank');
  $pfc_cheque_num = $this->input->post('pfc_cheque_num');
  $pfc_cheque_detail = $this->input->post('pfc_cheque_detail');
  $pfc_cheque_pbank = $this->input->post('pfc_cheque_pbank');

  $pfc_rtgs_amt = $this->input->post('pfc_rtgs_amt');
  $pfc_rtgs_bank = $this->input->post('pfc_rtgs_bank');
  $pfc_rtgs_num = $this->input->post('pfc_rtgs_num');
  $pfc_rtgs_detail = $this->input->post('pfc_rtgs_detail');
  $pfc_rtgs_pbank = $this->input->post('pfc_rtgs_pbank');

  $pfc_upi_amt = $this->input->post('pfc_upi_amt');
  $pfc_upi_bank = $this->input->post('pfc_upi_bank');
  $pfc_upi_num = $this->input->post('pfc_upi_num');
  $pfc_upi_detail = $this->input->post('pfc_upi_detail');
  $pfc_upi_pbank = $this->input->post('pfc_upi_pbank');




  $pfp_cash_amt = $this->input->post('pfp_cash_amt');
  $pfp_cash_detail = $this->input->post('pfp_cash_detail');

  $pfp_cheque_amt = $this->input->post('pfp_cheque_amt');
  $pfp_cheque_bank = $this->input->post('pfp_cheque_bank');
  $pfp_cheque_num = $this->input->post('pfp_cheque_num');
  $pfp_cheque_detail = $this->input->post('pfp_cheque_detail');

  $pfp_rtgs_amt = $this->input->post('pfp_rtgs_amt');
  $pfp_rtgs_bank = $this->input->post('pfp_rtgs_bank');
  $pfp_rtgs_num = $this->input->post('pfp_rtgs_num');
  $pfp_rtgs_detail = $this->input->post('pfp_rtgs_detail');

  $pfp_upi_amt = $this->input->post('pfp_upi_amt');
  $pfp_upi_bank = $this->input->post('pfp_upi_bank');
  $pfp_upi_num = $this->input->post('pfp_upi_num');
  $pfp_upi_detail = $this->input->post('pfp_upi_detail');

  $mem_card_no = $this->input->post('mem_card_no');
  $mem_card_redeem_points = $this->input->post('mem_card_redeem_points');
  $mem_card_details = $this->input->post('mem_card_details');


  $billno=$data['sales_return_id'];
    $process="New Sales Return - Deduction";
        $mem_card_point_upd=$this->db->query("UPDATE MEMBERSHIP_CARD SET POINTS=POINTS-".$mem_card_redeem_points." WHERE PID='".$party_id."' ");
        $party_mem_point_upd=$this->db->query("UPDATE PARTIES SET MEMBERSHIP_POINTS=MEMBERSHIP_POINTS-".$mem_card_redeem_points." WHERE PID='".$party_id."'");
        add_member_card_history($mem_card_no,$party_id,$process,$mem_card_redeem_points,$billno);

  for($i=0;$i<$count_checkbox;$i++){
    $update=$this->db->query("UPDATE salesentry_detail SET sales_return_id='".$data['sales_return_id']."' WHERE id='".$checkbox[$i] ."' ");
    // print_r("UPDATE salesentry_detail SET sales_return_id='".$data['sales_return_id']."' WHERE id='".$checkbox[$i] ."' "); 
  $sale_detail=$this->db->query("select * from salesentry_detail where id='".$checkbox[$i]."' ")->row();
    $update= $this->db->query("UPDATE tag_entry SET status='Y'  WHERE tag_id= '".$sale_detail->tag_no."'");
    
}
//    exit();
 

  if($paid_from=='Company'){
    if($pfc_cash_amt>0){
      $result  = $this->db->query("INSERT INTO payment_inward_outward(module_name, type_of_payment, amount, party_bank, cheque_ref_no, company_bank, remarks, bill_no, party_id, payment_side, metal_type, quality, purity, weight, pure_metal_weight,  created_by, created_on, record_status) VALUES('Sales Return','Cash','".$pfc_cash_amt."','','','','".$pfc_cash_detail."','".$data['sales_return_id']."','".$party_id."','CR','','','','0.00','0.00','".$_SESSION['username']."','".date('Y-m-d H:i:s')."','0')");
      }
      if($pfc_cheque_amt>0){
      $result  = $this->db->query("INSERT INTO payment_inward_outward(module_name, type_of_payment, amount, party_bank, cheque_ref_no, company_bank, remarks, bill_no, party_id, payment_side, metal_type, quality, purity, weight, pure_metal_weight,  created_by, created_on, record_status) VALUES('Sales Return','Cheque','".$pfc_cheque_amt."','".$pfc_cheque_pbank."','".$pfc_cheque_num."','".$pfc_cheque_bank."','".$pfc_cheque_detail."','".$data['sales_return_id']."','".$party_id."','CR','','','','0.00','0.00','".$_SESSION['username']."','".date('Y-m-d H:i:s')."','0')");
      }
      if($pfc_rtgs_amt>0){
      $result  = $this->db->query("INSERT INTO payment_inward_outward(module_name, type_of_payment, amount, party_bank, cheque_ref_no, company_bank, remarks, bill_no, party_id, payment_side, metal_type, quality, purity, weight, pure_metal_weight,  created_by, created_on, record_status) VALUES('Sales Return','RTGS','".$pfc_rtgs_amt."','".$pfc_rtgs_pbank."','".$pfc_rtgs_num."','".$pfc_rtgs_bank."','".$pfc_rtgs_detail."','".$data['sales_return_id']."','".$party_id."','CR','','','','0.00','0.00','".$_SESSION['username']."','".date('Y-m-d H:i:s')."','0')");
      }
      if($pfc_upi_amt>0){
      $result  = $this->db->query("INSERT INTO payment_inward_outward(module_name, type_of_payment, amount, party_bank, cheque_ref_no, company_bank, remarks, bill_no, party_id, payment_side, metal_type, quality, purity, weight, pure_metal_weight,  created_by, created_on, record_status) VALUES('Sales Return','UPI','".$pfc_upi_amt."','".$pfc_upi_pbank."','".$pfc_upi_num."','".$pfc_upi_bank."','".$pfc_upi_detail."','".$data['sales_return_id']."','".$party_id."','CR','','','','0.00','0.00','".$_SESSION['username']."','".date('Y-m-d H:i:s')."','0')");
      }
      
  }
  


  if($paid_from=='Party'){
  if($pfp_cash_amt>0){
    $result  = $this->db->query("INSERT INTO payment_inward_outward(module_name, type_of_payment, amount, party_bank, cheque_ref_no, company_bank, remarks, bill_no, party_id, payment_side, metal_type, quality, purity, weight, pure_metal_weight,  created_by, created_on, record_status) VALUES('Sales Return','Cash','".$pfp_cash_amt."','','','','".$pfp_cash_detail."','".$data['sales_return_id']."','".$party_id."','CR','','','','0.00','0.00','".$_SESSION['username']."','".date('Y-m-d H:i:s')."','0')");
    }
    if($pfp_cheque_amt>0){
    $result  = $this->db->query("INSERT INTO payment_inward_outward(module_name, type_of_payment, amount, party_bank, cheque_ref_no, company_bank, remarks, bill_no, party_id, payment_side, metal_type, quality, purity, weight, pure_metal_weight,  created_by, created_on, record_status) VALUES('Sales Return','Cheque','".$pfp_cheque_amt."','','".$pfp_cheque_num."','".$pfp_cheque_bank."','".$pfp_cheque_detail."','".$data['sales_return_id']."','".$party_id."','CR','','','','0.00','0.00','".$_SESSION['username']."','".date('Y-m-d H:i:s')."','0')");
    }
    if($pfp_rtgs_amt>0){
    $result  = $this->db->query("INSERT INTO payment_inward_outward(module_name, type_of_payment, amount, party_bank, cheque_ref_no, company_bank, remarks, bill_no, party_id, payment_side, metal_type, quality, purity, weight, pure_metal_weight,  created_by, created_on, record_status) VALUES('Sales Return','RTGS','".$pfp_rtgs_amt."','','".$pfp_rtgs_num."','".$pfp_rtgs_bank."','".$pfp_rtgs_detail."','".$data['sales_return_id']."','".$party_id."','CR','','','','0.00','0.00','".$_SESSION['username']."','".date('Y-m-d H:i:s')."','0')");
    }
    if($pfp_upi_amt>0){
    $result  = $this->db->query("INSERT INTO payment_inward_outward(module_name, type_of_payment, amount, party_bank, cheque_ref_no, company_bank, remarks, bill_no, party_id, payment_side, metal_type, quality, purity, weight, pure_metal_weight,  created_by, created_on, record_status) VALUES('Sales Return','UPI','".$pfp_upi_amt."','','".$pfp_upi_num."','".$pfp_upi_bank."','".$pfp_upi_detail."','".$data['sales_return_id']."','".$party_id."','CR','','','','0.00','0.00','".$_SESSION['username']."','".date('Y-m-d H:i:s')."','0')");
    }
    if($mem_card_redeem_points>0){
        $result  = $this->db->query("INSERT INTO payment_inward_outward(module_name, type_of_payment, amount, party_bank, cheque_ref_no, company_bank, remarks, bill_no, party_id, payment_side, metal_type, quality, purity, weight, pure_metal_weight,  created_by, created_on, record_status) VALUES('Sales Return','Membership Points','".$mem_card_redeem_points."','','','','".$mem_card_details."','".$data['sales_return_id']."','".$party_id."','CR','','','','0.00','0.00','".$_SESSION['username']."','".date('Y-m-d H:i:s')."','0')");
        }
}



  $result_insert= $this->db->query("INSERT INTO sales_return( company,date,sales_bill_id,party_id,net_pay,paid_amount,balance_amount, created_by, created_on, status,sales_return_id,sales_gold_count
  ,sales_gold_weight
  ,sales_gold_amount
  ,sales_silver_count
  ,sales_silver_weight
  ,sales_silver_amount
  ,return_gold_count
  ,return_gold_weight
  ,return_gold_amount
  ,return_silver_count
  ,return_silver_weight
  ,return_silver_amount
  ,replace_gold_count
  ,replace_gold_weight
  ,replace_gold_amount
  ,replace_silver_count
  ,replace_silver_weight
  ,replace_silver_amount
  ,exchange_gold_count
  ,exchange_gold_weight
  ,exchange_gold_amount
  ,exchange_silver_count
  ,exchange_silver_weight
  ,exchange_silver_amount,
  paid_from)
  VALUES('".$company_id."','".$receipt_date."','".$party_sales."','".$party_id."','".$return_net_payable."','".$return_paid_amount."','".$return_balance_amount."','".$_SESSION['username']."','".date('Y-m-d H:i:s')."','Y','".$data['sales_return_id']."','".$sales_gold_count."'
      ,'".$sales_gold_weight."'
      ,'".$sales_gold_amount."'
      ,'".$sales_silver_count."'
      ,'".$sales_silver_weight."'
      ,'".$sales_silver_amount."'
      ,'".$return_gold_count."'
      ,'".$return_gold_weight."'
      ,'".$return_gold_amount."'
      ,'".$return_silver_count."'
      ,'".$return_silver_weight."'
      ,'".$return_silver_amount."'
      ,'".$replace_gold_count."'
      ,'".$replace_gold_weight."'
      ,'".$replace_gold_amount."'
      ,'".$replace_silver_count."'
      ,'".$replace_silver_weight."'
      ,'".$replace_silver_amount."'
      ,'".$exchange_gold_count."'
      ,'".$exchange_gold_weight."'
      ,'".$exchange_gold_amount."'
      ,'".$exchange_silver_count."'
      ,'".$exchange_silver_weight."'
      ,'".$exchange_silver_amount."'
      ,'".$paid_from."')"); 




  for($i=0;$i<20;$i++){
    if($tag_no[$i]!=''){
        $res = $this->db->query("INSERT INTO salesentry_detail (
            sales_entry_id,
           tag_no,
           item_name,
           subitem_name,
           quality,
           purity,
           weight,
           stone,
           net_weight,
           hc_amount,
           mc_amount,
          
           wc_amount,
           metal_weight,
           total_amount,
           sale_item_tag,
           img,
           sales_id
    ) VALUES(
        '".$sales_id."',    
    '".$tag_no[$i]."',
    '".$item[$i]."',
    '".$subitem[$i]."',
    '".$quality[$i]."',
    '".$purity[$i]."',
    '".$weight[$i]."',
    '".$st_wgt[$i]."',
    '".$net_wgt[$i]."',
    '".$hc_amt[$i]."',
    '".$mc_amt[$i]."',
    
    '".$wc_amt[$i]."',
    '".$metal_weight[$i]."',
    '".$sales_amt[$i]."',
    'Tag',
    '".$img[$i]."',
    '".$data['sales_return_id']."'
    
    )");
    
    $update= $this->db->query("UPDATE tag_entry SET status='S'  WHERE tag_id= '".$tag_no[$i]."'");



    save_query_in_log();
    }
    }
    $ext=0;
    for($i=0;$i<10;$i++){
        
        if(($nt_item_type[$i]!='')){
            
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
            //     $config['upload_path'] = 'assets/images/x`'; 
            //     $config['allowed_types'] = 'jpg|jpeg|png|gif';
            //     $config['max_size'] = '50000';
            //     $config['file_name'] = $img_id;
         
            //     $this->load->library('upload',$config); 
          
            //     if($this->upload->do_upload('file')){
            //       $uploadData = $this->upload->data();
            //       $filename = $uploadData['file_name'];
         
            //       $data['totalFiles'][] = $filename;
            //     }
            //   }
    if($inventory_jewel_image_data[$i]!=''){
            $uploadpath   = 'assets/images/sales_non_tag_img/';
            $parts        = explode(";base64,", $inventory_jewel_image_data[$i]);
            $imageparts   = explode("image/", @$parts[0]);
            $imagetype    = $imageparts[1];
            $imagebase64  = base64_decode($parts[1]);
            $file         = $uploadpath . $img_id .'_'.$y. '.png';
            file_put_contents($file, $imagebase64);
    
              $img=$img_id."_".$y.".". $ext;
            //   $img=$img_id.".". $ext;
    }
    else{
        $img='';
    }
              $res = $this->db->query("INSERT INTO salesentry_detail (
                sales_entry_id,
               tag_no,
               item_type,
               item_name,
               subitem_name,
               quality,
               purity,
               weight,
               stone,
               net_weight,
               mc_amount,
               hc_amount,
               wc_amount,
               metal_weight,
               total_amount,
               sale_item_tag,
               img,
               sales_id
        ) VALUES(
            '".$sales_id."',    
        '-',
        '".$nt_item_type[$i]."',
        '".$nt_item[$i]."',
        '".$nt_subitem[$i]."',
        '".$nt_quality[$i]."',
        '".$nt_purity[$i]."',
        '".$nt_weight[$i]."',
        '".$nt_stone[$i]."',
        '".$nt_net_weight[$i]."',
        '".$nt_mc[$i]."',
        '".$nt_hc[$i]."',
        '".$nt_wc[$i]."',
        '".$nt_metal_weight[$i]."',
        '".$nt_amount[$i]."',
        'Non tag',
        '".$img."',
        '". $data['sales_return_id']."'
        )");
        
    
        $res1 = $this->db->query("INSERT INTO nontag_history (
            id_no,
            item_id,
            purity,
            count,
            weight,
            stone_weight,
            net_weight,
            date,
            company,
            type,
            status
        ) VALUES(
            '". $data['sales_return_id']."',
        '".$nt_item[$i]."',
        '".$nt_purity[$i]."',
        '".$nt_count[$i]."',
        '".$nt_weight[$i]."',
        '".$nt_stone[$i]."',
    
        '".$nt_net_weight[$i]."',
        '".$receipt_date."',
        '".$data['company_id']."',
        'Sales',
        'OUT'
        )");
    
        $update= $this->db->query("UPDATE ITEMS SET COUNT=COUNT-1 ,WEIGHT=WEIGHT-".$nt_net_weight[$i]."  WHERE SNO= '".$nt_item[$i]."'");
        
        save_query_in_log();
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
                //     $config['upload_path'] = 'assets/images/old_gold_exchange_img'; 
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
                $uploadpath   = 'assets/images/old_gold_exchange_img/';
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
                '".$sales_id."',    
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
           '". $data['sales_return_id']."',
           'Y'
            )");
    
           
    
    
    
    
    
    
    
            $update= $this->db->query("UPDATE ITEMS SET OLD_GOLD_COUNT=OLD_GOLD_COUNT+1 ,OLD_GOLD_WEIGHT=OLD_GOLD_WEIGHT+".$oge_net_weight[$i]."  WHERE SNO= '".$oge_item[$i]."'");
         
            
            save_query_in_log();
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
             'Sales_return',
             '".$data['ac_chitpay_mode']."',
             '".$data['ac_chit_red_amount']."',
             '".$data['chit_id']."',
             '',
             '".$data['ac_chit_red_detail']."',
             '".$data['sales_return_id']."',
              '".$party_id."','-','-','-','0','0','0'
             )");
             $data['scm_chit'] =$this->input->post('sch_payment'); 
        
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
                 VALUES ('".$today."',
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
            if(isset($chit_mas)){
              $sm_cm_curr_bal = $chit_mas->sm_cash_ava_amt;
              $tm_cm_curr_bal = $chit_mas->tm_cash_ava_amt;
            }
            else{
                $sm_cm_curr_bal = 0;
                $tm_cm_curr_bal = 0;
            }
              $sm_up_amt = $sm_cm_curr_bal - $chit_amtt;
         
            
         
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
               if(isset($sch_id))
               {
                $data['sch_id_chit'] = $sch_id->scheme_id;
               }
               else{
                $data['sch_id_chit'] =0;
               }
               
                
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
                 VALUES ('".$today."',
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
         



            $m_points_ad = $data['m_points_ad'] = $this->input->post('m_points_ad');
            if($m_points_ad!=''){

            }
            else{
                $m_points_ad = 0 ;
            }
    $cust_add_m_point=$this->db->query("UPDATE PARTIES SET MEMBERSHIP_POINTS=MEMBERSHIP_POINTS+".$m_points_ad." WHERE PID='".$party_id."'");
    $card_add_m_point=$this->db->query("UPDATE MEMBERSHIP_CARD SET POINTS=POINTS+".$m_points_ad." WHERE PID='".$party_id."'");
    $card_det=$this->db->query("select * from MEMBERSHIP_CARD where PID='".$party_id."'")->row();
    // $card_history=$this->db->query("INSERT INTO MEMBERSHIP_HISTORY (MEMBERSHIP_NO, PID, LOG_DATE, PROCESS, POINTS_EARNED, CREATED_BY, CREATED_ON) VALUES('".$card_det->MEMBERSHIP_NO."','".$party_id."','".date('Y-m-d')."','Sales','".$m_points_ad."','".$_SESSION['username']."','".date('Y-m-d H:i:s')."')");
    
    
    
    
     $rating=$this->input->post('rating');
          if($rating!=''){
            $res=$this->db->query("UPDATE PARTIES SET RATING='".$rating. "' WHERE PID='".$party_id."'");
            $rating_history=$this->db->query("INSERT INTO CUSTOMER_RATING_HISTORY (PID, LOG_DATE, PROCESS, RATING, CREATED_BY, CREATED_ON) VALUES('".$party_id."','".date('Y-m-d')."','Sales','".$rating."','".$_SESSION['username']."','".date('Y-m-d H:i:s')."')");
          }
            
  add_notification(date('Y-m-d H:i:s'), $company_id, "Inventory", "New Sales Return ", $data['sales_return_id']. ' Created By ' .$_SESSION['username'],'', $_SESSION['USERID'], '0', $data['sales_return_id']);
  
  
  if($result_insert)
  {
      $this->session->set_flashdata('g_success', $tag_id->tag_id.' Tag entry have been approved successfully...');
  }else{
     $this->session->set_flashdata('g_err', 'Could not approve Lot details!');
  }
  
  
  redirect('Sales_return');
}

public function sales_return_print($id)

{
    $data['sales_return']=$this->db->query("SELECT * FROM sales_return WHERE id='".$id."'  ")->row();
    $data['party_detail'] = $this->db->query("SELECT * FROM PARTIES WHERE PID='".$data['sales_return']->party_id."'  ")->row();
    $data['sales_entry']=$this->db->query("SELECT * FROM salesentry WHERE sales_id='".$data['sales_return']->sales_bill_id."'  ")->row();
    $data['sales_return_tagged']=$this->db->query("SELECT * FROM salesentry_detail WHERE sales_id='".$data['sales_return']->sales_return_id."'   ")->result_array();
    // $data['sales_return_non_tagged']=$this->db->query("SELECT * FROM salesentry_detail WHERE sales_return_id='".$data['sales_return']->sales_return_id."' AND sale_item_tag='Non tag'  ")->result_array();
    $data['sales_return_old_metal']=$this->db->query("SELECT * FROM salesentry_old_exchange WHERE sales_id='".$data['sales_return']->sales_return_id."'  ")->result_array();

    $data['party_detail'] = $this->db->query("SELECT * FROM PARTIES WHERE PID='".$data['sales_return']->party_id."'  ")->row();
    $data['company_detail'] = $this->db->query("SELECT * FROM COMPANY WHERE COMPANYCODE='".$data['sales_return']->company."'  ")->row();
    $data['bank_detail'] = $this->db->query("SELECT * FROM BANKS WHERE COMPANYCODE='".$data['sales_return']->company."'  ")->row();
//   print_r($data['sales_return_tagged']);exit();
    $this->load->view('sales_return/sales_return_print',$data);

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