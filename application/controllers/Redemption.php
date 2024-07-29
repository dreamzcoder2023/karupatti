<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/* ************************************************************************************
        Purpose : To handle all the village functions
***************************************************************************************/
class Redemption extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();


        $this->load->model(array("Redemption_model","Accountsgroup_model",
            "Loan_model","Loanreceipt_model"));
        
        $fin_year=$this->Accountsgroup_model->get_fin_years_list();
        $db=substr($fin_year->DBNAME,0,strlen($fin_year->DBNAME)-4);
        
        $config_app = switch_db_dynamic($db);
        $this->Redemption_model->other_db = $this->load->database($config_app,TRUE);

        //if ($this->session->userdata['username'] == TRUE)
        if (isset($this->session->userdata['username']) && $this->session->userdata['username'] == TRUE)
        {
            

        }else{
            redirect('login'); //if session is not there, redirect to login page
        } 
        date_default_timezone_set("Asia/Kolkata");
        $dt_flag=1;
        $this->session->set_userdata('comtitle', 'Redemption');
    }
    
    public function index()
    {
        $page       = isset($_GET['page']) ? $_GET['page'] : 1;
        $limit      = 25;
        $offset     = ($page - 1) * $limit +1;
        $page_limit=$offset+$limit-1;
        
          $name = $_SESSION['username'];
          
          $tdate="";
          

          $data['today_date_fillter'] = date("Y-m-d");
          $fdate =" AND r.RETURNDATE='".$data['today_date_fillter']."' ";

         
          $data['dt_fill'] = $this->input->post('dt_fill_loan_list');
          // echo $this->input->post('dt_fill_loan_list');
          $data['from_date_fillter'] = $this->input->post('from_date_fillter_loan_list');
          $data['to_date_fillter'] = $this->input->post('to_date_fillter_loan_list');
          $data['company_filter'] = $this->input->post('company_filter');
          $data['status_filter']=$this->input->post('redemp_close_status');
          
          // exit();
          
          // echo $data['company_filter'];
          // echo $data['status_filter'];
          // exit();

          if($data['company_filter']=='all' || $data['company_filter']=='')
          {
            $cmp= "";  
          }
          else
          {
            $cmp= " and L.COMPANYCODE IN('". $data['company_filter']."')";  
          }
          

          if($data['status_filter']=='all' || $data['status_filter']=='')
          {
            $status="";
          }
          else
          {

            $status=" and r.CLOSING_TYPE IN( '".$data['status_filter']."')";
              
          }
          // echo $status;
          // echo $cmp;
          // exit();
          if($data['dt_fill']=="today")
          {
              $data['today_date_fillter'] = date("Y-m-d");
              $fdate =" AND r.RETURNDATE='".$data['today_date_fillter']."' ";
              $tdate ='';
              
          }

          if($data['dt_fill']=="week")
          {
              $today=date('l');
              if($today=="Sunday")
              {
                  $data['week_from_date_fillter']=date(' Y-m-d', strtotime("sunday 0 week"));

                  $data['week_to_date_fillter']=date(' Y-m-d', strtotime("saturday 1 week"));
                  // print_r($data['week_to_date_fillter']);exit;
                  $fdate =" AND r.RETURNDATE>='".$data['week_from_date_fillter']."'";
                  $tdate =" AND r.RETURNDATE<='".$data['week_to_date_fillter']."'";

              }
              else
              {
                  $data['week_from_date_fillter']=date(' Y-m-d', strtotime("sunday -1 week"));

                  $data['week_to_date_fillter']=date(' Y-m-d', strtotime("saturday 0 week"));
                  //  print_r($data['week_to_date_fillter']);exit;
                  $fdate =" AND r.RETURNDATE>='".$data['week_from_date_fillter']."'";
                $tdate =" AND r.RETURNDATE<='".$data['week_to_date_fillter']."'";
              }
          }
          if($data['dt_fill']=="monthly")
          {

              $first=date('Y-m-01');
              $last=date('Y-m-t');
              $fdate =" AND r.RETURNDATE>='".$first."'";
              $tdate ="AND r.RETURNDATE<='".$last."'";
          }
          if($data['dt_fill']=="custom Date")
          {
             

              if($data['from_date_fillter']!='')
              {
                echo "inset";
                $first=date('Y-m-d',strtotime($data['from_date_fillter']));
                $fdate =" AND r.RETURNDATE>='".$first."'";
              }
              else
              {
                $fdate ='';
              }
              if($data['to_date_fillter']!='')
              {
                echo "inside";
                $last=date('Y-m-d',strtotime($data['to_date_fillter']));
                $tdate =" AND r.RETURNDATE<='".$last."'";
              }
              else
              {
                $tdate ='';
              } 
          }
          // echo $fdate."<br>";
          // echo $tdate."<br>";
          // echo "SELECT  * FROM ( SELECT r.*,l.NAME AS CNAME,l.COMPANYCODE,p.RATING,l.JEWEL_TYPE,l.AMOUNT,l.INTERESTTYPE,ROW_NUMBER() OVER (ORDER BY r.RETURNDATE DESC) AS sl FROM REDEMPTIONS r, LOANS l, PARTIES p  WHERE r.BILLNO=l.BILLNO and p.PID=l.PID and p.PID=r.PID $fdate $tdate $status $cmp)N  WHERE sl BETWEEN $offset AND $page_limit  ";

        // exit();
        $data['redemption_list']=$this->db->query("SELECT  * FROM ( SELECT r.*,l.NAME AS CNAME,l.COMPANYCODE,p.RATING,l.JEWEL_TYPE,l.AMOUNT,l.INTERESTTYPE,ROW_NUMBER() OVER (ORDER BY r.RETURNDATE DESC) AS sl FROM REDEMPTIONS r, LOANS l, PARTIES p  WHERE r.BILLNO=l.BILLNO and p.PID=l.PID  $fdate $tdate $status $cmp)N  WHERE sl BETWEEN $offset AND $page_limit  ORDER BY N.RETURNDATE DESC")->result_array();


        $data['min_count']=count((array)$data['redemption_list']);
        $l_count=$this->db->query("SELECT count(*) as count FROM REDEMPTIONS r, LOANS l, PARTIES p  WHERE r.BILLNO=l.BILLNO and p.PID=l.PID  $fdate $tdate $status $cmp")->row();
       $data['redemption_count']=$l_count->count;
       // print_r(  $data);
       // exit();
        $this->load->view('redemption/redemption_list',$data);
    }
   public function redemption_add()
   {
        $data['company_list'] = $this->Loan_model->get_company_list();
        $data['int_grp_list'] = $this->Loan_model->get_interest_group_list();
        $data['item_purity_list'] = $this->Loan_model->get_item_purity_list();
        $this->load->view('redemption/redemption_add',$data);
   }
   public function pledgedList()
      {
        $search =  $_GET['query']; 
        $rows = $this->Redemption_model->get_pledge_list($search);
        $res='[';
        if(count($rows)>0) {
          foreach($rows as $row )
          {
              $title='';
              $name='';
              $itemname=$row->ITEMNAME;
              $title = $itemname;
              $res.='{ "title":"'.$title.'","id": "'.$row->SNO.'","itemname":"'.$itemname.'"},';
              
          }
          $res=rtrim($res,',');
          $res.=']';
        }
        else{
          $res.=']';
        }
        print_r($res);die();
      }
   public function load_pledge_info()
   {
      $bill_no=$this->input->post('bill_no');
      $row=$this->db->query("select * from LOANS WHERE BILLNO='".$bill_no."'")->row();
      $pledge_info=$this->db->query("select * from PLEDGEINFO  WHERE BILLNO='".$bill_no."'")->result_array();
        $data['pl_count']=$pl_count=count((array)$pledge_info);
        $pl_tbody="";
        $per_grm_val=$row->AMOUNT/$row->NETWEIGHT;
        // $per_ln_less=$row->WEIGHT-$row->LESS-$row->STONELESS;
        $pl_less=($row->LESS+$row->STONELESS)/$pl_count;
        $per_pl_less=$row->LESS/$pl_count;
        $per_pl_stone_less=$row->STONELESS/$pl_count;
        $i=0;
        foreach ($pledge_info as $plist) 
        {
            if(isset($plist['IS_DAMAGE']))
            {
                $is_damage=($plist['IS_DAMAGE']=='Y')?'Yes':'No';
            }
            else
            {
              $is_damage='No';
            }
            $pl_val=($plist['WEIGHT'] - $pl_less)*$per_grm_val;

           if($plist['TYPE_OF_RECORD']=='O')
            {
              $pur_res=$this->db->query("select * from ITEMPURITY where ITEMPURITYNAME='".$plist['PURITY']."'")->row();
             $pl_tbody .= "<tr id='tr_id".$i."'><td id='td_id_1".$i."'>".$plist['PLEDGENAME']."<input type='hidden' id='pledge_item_hidden".$i."' name='pledge_item_hidden[]' value='".$plist['PLEDGENAME']."'><input type='hidden' name='old_pl_id[]' id='old_pl_id".$i."' value=".$plist['PLEDGE_ID']."><input type='hidden' name='rec_status[]' id='rec_status".$i."' value='O'></td><td id='td_id_2".$i."' class='ple1'>".$plist['DESCRIPTION']."<input type='hidden' id='pledge_description_hidden".$i."' name='pledge_description_hidden[]' value='".$plist['DESCRIPTION']."'></td><td id='td_id_3".$i."'>".$plist['PURITY']."<input type='hidden' id='pledge_purity_hidden".$i."' name='pledge_purity_hidden[]' value='".$plist['PURITY']."'></td><td id='td_id_4".$i."'>".$pur_res->PERCENTAGE."<input type='hidden' id='pledge_purity_percent_hidden".$i."' name='pledge_purity_percent_hidden[]' value='".$pur_res->PERCENTAGE."'></td><td id='td_id_5".$i."'>".$plist['WEIGHT']."<input type='hidden' id='pledge_weight_hidden".$i."' name='pledge_weight_hidden[]' value='".$plist['WEIGHT']."'></td><td id='td_id_6".$i."'>".round($per_pl_stone_less,3)."<input type='hidden' id='pledge_stone_weight_hidden".$i."' name='pledge_stone_weight_hidden[]' value='".round($per_pl_stone_less,3)."'></td><td id='td_id_7".$i."'>".round($per_pl_less,3)."<input type='hidden' id='pledge_less_hidden".$i."' name='pledge_less_hidden[]' value='".round($per_pl_less,3)."'></td><td id='td_id_8".$i."'>".round(($plist['WEIGHT']-$pl_less),3)."<input type='hidden' id='pledge_net_weight_hidden".$i."' name='pledge_net_weight_hidden[]' value='".round(($plist['WEIGHT']-$pl_less),3)."'></td><td id='td_id_9".$i."'>".$is_damage."<input type='hidden' id='pledge_is_damage_hidden".$i."' name='pledge_is_damage_hidden[]' value='".$is_damage."'></td><td id='td_id_10".$i."'><div class='image-input mt-2 me-6' data-kt-image-input='true'><div class='image-input-wrapper w-40px h-40px' style='background-image: url(assets/images/jewel.jpg)'></div></div></td><td id='td_id_11".$i."'><input type='hidden' class='form-control form-control-lg form-control-solid fs-7' name='old_ln_pl_val[]' id='old_ln_pl_val".$i."' value='".number_format($pl_val, 2, '.', '')."'><input type='text' class='form-control form-control-lg form-control-solid fs-7' name='new_ln_pl_val[]' id='new_ln_pl_val".$i."' onkeyup='calc_val_adjustment(".$i.")' value='".number_format($pl_val, 2, '.', '')."'></td><td id='td_id_12".$i."'><a href='javascript:;' class='btn btn-icon btn-bg-light btn-active-color-primary btn-sm' title='Redeem' onclick='redeem(".$i.")'> <i class='fas fa-hand-holding fs-2' title='Redeem' style='color:black;'></i> </a></td></tr>";
             }
             else
             {
                $pl_tbody .= "<tr id='tr_id".$i."'><td id='td_id_1".$i."'>".$plist['PLEDGENAME']."<input type='hidden' id='pledge_item_hidden".$i."' name='pledge_item_hidden[]' value='".$plist['PLEDGENAME']."'><input type='hidden' name='old_pl_id[]' id='old_pl_id".$i."' value=".$plist['PLEDGE_ID']."><input type='hidden' name='rec_status[]' id='rec_status".$i."' value='N'></td><td id='td_id_2".$i."' class='ple1'>".$plist['DESCRIPTION']."<input type='hidden' id='pledge_description_hidden".$i."' name='pledge_description_hidden[]' value='".$plist['DESCRIPTION']."'></td><td id='td_id_3".$i."'>".$plist['PURITY']."<input type='hidden' id='pledge_purity_hidden".$i."' name='pledge_purity_hidden[]' value='".$plist['PURITY']."'></td><td id='td_id_4".$i."'>".$plist['PURITY_PERCENT']."<input type='hidden' id='pledge_purity_percent_hidden".$i."' name='pledge_purity_percent_hidden[]' value='".$plist['PURITY_PERCENT']."'></td><td id='td_id_5".$i."'>".$plist['WEIGHT']."<input type='hidden' id='pledge_weight_hidden".$i."' name='pledge_weight_hidden[]' value='".$plist['WEIGHT']."'></td><td id='td_id_6".$i."'>".$plist['STONEWEIGHT']."<input type='hidden' id='pledge_stone_weight_hidden".$i."' name='pledge_stone_weight_hidden[]' value='".$plist['STONEWEIGHT']."'></td><td id='td_id_7".$i."'>".$plist['LESS']."<input type='hidden' id='pledge_less_hidden".$i."' name='pledge_less_hidden[]' value='".$plist['LESS']."'></td><td id='td_id_8".$i."'>".$plist['NETWEIGHT']."<input type='hidden' id='pledge_net_weight_hidden".$i."' name='pledge_net_weight_hidden[]' value='".$plist['NETWEIGHT']."'></td><td id='td_id_9".$i."'>".$is_damage."<input type='hidden' id='pledge_is_damage_hidden".$i."' name='pledge_is_damage_hidden[]' value='".$is_damage."'></td><td id='td_id_10".$i."'><div class='image-input mt-2 me-6' data-kt-image-input='true'><div class='image-input-wrapper w-40px h-40px' style='background-image: url(assets/images/jewel.jpg)'></div></div></td><td id='td_id_11".$i."'><input type='hidden' class='form-control form-control-lg form-control-solid fs-7' name='old_ln_pl_val[]' id='old_ln_pl_val".$i."' value='".number_format($pl_val, 2, '.', '')."'><input type='text' class='form-control form-control-lg form-control-solid fs-7' name='new_ln_pl_val[]' id='new_ln_pl_val".$i."' onkeyup='calc_val_adjustment(".$i.")' value='".number_format($pl_val, 2, '.', '')."'></td><td id='td_id_12".$i."'><a href='javascript:;' class='btn btn-icon btn-bg-light btn-active-color-primary btn-sm' title='Redeem' onclick='redeem(".$i.")'> <i class='fas fa-hand-holding fs-2' title='Redeem' style='color:black;'></i> </a></td></tr>";
             }

           $i++;
        }

         $pl_tbody.="<input type='hidden' value='".$i."' name='mj_pl_item_count' id='mj_pl_item_count'>"; 

        $pl_tfoot = "<th class='min-w-150px'></th> <th class='min-w-100px'></th><th class='min-w-80px'></th><th class='min-w-80px'>Total</th><th class='min-w-80px'>".$row->WEIGHT."</th><th class='min-w-100px'>".$row->STONELESS."</th><th class='min-w-80px'>".$row->LESS."</th><th class='min-w-80px'>".$row->NETWEIGHT."</th><th class='min-w-50px'></th><th class='min-w-50px'></th>";

        $pledge_cons_val=$this->db->query("select * from LOANS WHERE BILLNO='".$bill_no."'")->row();

        $pl_weight=$pledge_cons_val->WEIGHT;
        $pl_stone_less=$pledge_cons_val->STONELESS;
        $pl_less=$pledge_cons_val->LESS;
        $pl_netweight=$pledge_cons_val->NETWEIGHT;
        $pl_curr_rate=$pledge_cons_val->CURRENTRATE;
        $pl_quality=$pledge_cons_val->QUALITY;

        $grm_val=$pl_curr_rate*$pl_quality/100;
        $purity_wgt=$pl_netweight*$pl_quality/100;

        $sales_rate=$pl_curr_rate*$purity_wgt;
        $pl_grm_val=$pledge_cons_val->PERGRAMVALUE > 0 ? $pledge_cons_val->PERGRAMVALUE : $grm_val;

        $pl_sale_rate=$pledge_cons_val->TOTALSALESRATE > 0 ? $pledge_cons_val->TOTALSALESRATE : $sales_rate;
        $pl_hl_amount=$pledge_cons_val->HL_AMOUNT;

        echo '||'.$pl_count.'||'.$pl_tbody."||".$pl_tfoot."||".$pl_weight."||".$pl_stone_less."||".$pl_less."||".$pl_netweight."||".$pl_curr_rate."||".$pl_quality."||".$pl_grm_val."||".$pl_sale_rate."||".$pl_hl_amount;
   }

   public function get_exp_int_amt()
    {
        $int_type=$this->input->post('int_type');
        $int_grp=$this->input->post('group_name');
        $ln_dt=date_format(date_create($this->input->post('r_date')),'Y-m-d');
        $ln_amt=$this->input->post('cust_trans_new_ln_loan_amount');

        // exit();
        $result  = $this->db->query("SELECT * from INTERESTLIST where INT_GROUP='".$int_grp."' AND ACTIVE='Y' AND INTID='".$int_type."'")->row();
        if($result->LP_TYPE=='Days')
        { 
          $ex_dt=date('d-m-Y', strtotime($ln_dt. ' +'.round($result->PERIOD).' days'));
          $due_dt1=date('d-m-Y', strtotime($ln_dt. ' + 1 days'));
          $int_1=($ln_amt*$result->INTEREST*$result->PERIOD)/100;
          
        }
        if($result->LP_TYPE=='Months')
        {
          $ex_dt=date('d-m-Y', strtotime($ln_dt. ' +'.round($result->PERIOD).' months'));
          $due_dt1=date('d-m-Y', strtotime($ln_dt. ' + 1 months'));
          $int_1=($ln_amt*$result->INTEREST*$result->PERIOD)/100;
          
        }
        echo '||'.$ex_dt.'||'.$due_dt1.'||'.$int_1;
    }
    public function loanList()
      {
        // echo '1';
        // exit();
        $search =  $_GET['query']; 
        $rows = $this->Redemption_model->getLoan($search);

        // print_r($rows);
        // print_r($rows);
        $res='[';
        if(count($rows)>0) {
          foreach($rows as $row )
          {
              $title='';
              $billno='';
              $member_id='';
              $bill_no=$row->BILLNO;
              $company=$row->COMPANYNAME;
              $loan_dt=date($_SESSION['DATE_PATTERN'],strtotime($row->ENDATE));
              // $ex_dt=date('d-m-Y', strtotime($ln_dt. ' +'.round($result->PERIOD).' months'));
              $expiry_dt=date($_SESSION['DATE_PATTERN'], strtotime($row->ENDATE.' +'.round($row->PERIOD).' months'));
              $loan_amt=$row->AMOUNT;
              $weight=$row->NETWEIGHT;
              $interest=$row->INTERESTTYPE;
              $party=$row->NAME;
              $party_id=$row->PID;
              
              $nominee_det=$this->db->query("select * from  NOMINEE where NOMINEE_ID='".$row->NOMINEE_ID. "' and PID='".$row->PID."'")->row();
              if(isset($nominee_det))
              {
                
                $inom_det=$nominee_det->NOMINEE_NAME." - ".$nominee_det->RELATION." - ".$nominee_det->MOBILE_NO;
                $nom_det=$nominee_det->NOMINEE_NAME;
              }
              else
              {
                $inom_det=$row->NOMINEE." - ".$row->RELATION;
                $nom_det=$row->NOMINEE;
              }
              
              $card_details=$this->db->query("SELECT * FROM MEMBERSHIP_CARD WHERE PID='".$row->PID."'")->row();
              $card_type='';
              if(isset($card_details))
              {
                  if($card_details->CARD_TYPE=='Gold'){
                    $card_type="<span style='background-color:#ffaa00;border-radius: 8px;padding: 5px 15px 5px 15px;'>Gold</span>";
                  // $card_type=$card_details->CARD_TYPE;
                  // $card_type="gold";

                  }
                  else if($card_details->CARD_TYPE=='Silver'){
                    $card_type="<span style='background-color:#d2d4dc;border-radius: 8px;padding: 5px 15px 5px 15px;'>Silver</span>";
                  }
                  else if($card_details->CARD_TYPE=='Platinum')
                  {
                    $card_type="<span style='background-color:#f4fdff;border-radius: 8px;padding: 5px 15px 5px 15px;'>Platinum</span>";
                  }
                  $member_id =$card_details->MEMBERSHIP_NO;
                }
                // Divya (10-11-2023)
            $chit_details=$this->db->query("SELECT * FROM CHIT_LIST WHERE party_id='".$row->PID."' and status='Y' and ava_balance > 0")->row();

            if(isset($chit_details)){
                $chit_count=1;
            }
            else{
                $chit_count=0;
            }
              $pledge_info=$this->db->query("select * from PLEDGEINFO WHERE BILLNO='".$row->BILLNO."'")->result_array();
              $pl_count=count((array)$pledge_info);
              $tbody="";
              foreach ($pledge_info as $plist) {
                $is_damage=($plist['IS_DAMAGE']=='Y')?'Yes':'No';
               $tbody .= "<tr><td>".$plist['PLEDGENAME']."</td><td>".$plist['PURITY']."</td><td>".$plist['PURITY_PERCENT']."</td><td>".$plist['WEIGHT']."</td><td>".$plist['STONEWEIGHT']."</td><td>".$plist['LESS']."</td><td>".$plist['NETWEIGHT']."</td><td><div class='image-input mt-2 me-6' data-kt-image-input='true'><div class='image-input-wrapper w-40px h-40px' style='background-image: url(assets/images/jewel.jpg)'></div></div></td></tr>";
              }

               
              $tfoot = "<th class='min-w-150px'></th> <th class='min-w-100px'></th><th class='min-w-80px'>Total</th><th class='min-w-80px'>".$row->WEIGHT."</th><th class='min-w-100px'>".$row->STONELESS."</th><th class='min-w-80px'>".$row->LESS."</th><th class='min-w-80px'>".$row->NETWEIGHT."</th><th class='min-w-50px'></th>";
              
              $member_points=$row->MEMBERSHIP_POINTS;
              $rating =$row->RATING;
              $phone =$row->PHONE;

              $rowstreetaddress = isset($row->STREETNAME)? $row->STREETNAME : $row->ADDRESS1;
              $rowvillageaddress = isset($row->VILLAGENAME) ? $row->VILLAGENAME : $row->ADDRESS2;
              $rowcityaddress = isset($row->CITYNAME) ? $row->CITYNAME : $row->CITY;

              $address= $rowstreetaddress.','.$rowvillageaddress.','.$rowcityaddress;
              $address1=$row->STREETNAME;
              

              if($row->PHOTO!='')
               {
               $party_photo="<img src='data:image/jpg;charset=utf8;base64,".base64_encode($row->PHOTO)."'  height='125px' width='125px'>";
               }
               else
               {
                $party_photo="<img src='".base_url()."assets/images/party.jpg' height='125px' width='125px' >";
               }

               if($row->ITEM_PHOTO!='')
               {
               $item_photo="<img src='data:image/jpg;charset=utf8;base64,".base64_encode($row->ITEM_PHOTO)."'  height='125px' width='125px'>";
               }
               else
               {
                $item_photo="<img src='".base_url()."assets/images/party.jpg' height='125px' width='125px' >";
               }

              

              $title = $bill_no;
               $res.='{ "title":"'.$title.'","pid": "'.$party_id.'","firstname":"'.$party.'","address":"'.$address.'","address1":"'.$address1.'","rating":"'.$rating.'","phone":"'.$phone.'","member_id":"'.$member_id.'","member_points":"'.$member_points.'","card_type":"'.$card_type.'","inom_det":"'.$inom_det.'","nom_det":"'.$nom_det.'","company":"'.$company.'","loan_amt":"'.$loan_amt.'","interest":"'.$interest.'","weight":"'.$weight.'","pl_count":"'.$pl_count.'","loan_dt":"'.$loan_dt.'","expiry_dt":"'.$expiry_dt.'","loan_amt":"'.$loan_amt.'","party_photo":"'.$party_photo.'","tfoot":"'.$tfoot.'","tbody":"'.$tbody.'","chit_count":"'.$chit_count.'"},';
              // $res.='{ "title":"'.$title.'","pid": "'.$party_id.'","firstname":"'.$party.'","member_id":"'.$member_id.'","member_points":"'.$member_points.'","rating":"'.$rating.'","address":"'.$address.'","inom_det":"'.$inom_det.'","nom_det":"'.$nom_det.'","card_type":"'.$card_type.'","weight":"'.$weight.'","pl_count":"'.$pl_count.'","tfoot":"'.$tfoot.'","tbody":"'.$tbody.'","loan_dt":"'.$loan_dt.'","expiry_dt":"'.$expiry_dt.'","company":"'.$company.'","loan_amt":"'.$loan_amt.'","interest":"'.$interest.'","phone":"'.$phone.'","loan_status":"'.$loan_status.'"},';
             
              
          }
          $res=rtrim($res,',');
          $res.=']';
        }
        else{
          $res.=']';
        }
        if(isset($res))
        {
            print_r($res);die();  
        }
        else
        {
            echo 1;
        }
        
      }
      public function load_other_info()
      {

          $bill_no=$this->input->post("bill_no");
          $pid=$this->input->post("id");
              // if($row->OTHER_PHOTO!='')
              //  {
              //  $id_photo="<img src='data:image/jpg;charset=utf8;base64,".base64_encode($row->OTHER_PHOTO)."'  height='125px' width='125px'>";
              //  }
              //  else
              //  {
              //   $id_photo="<img src='".base_url()."assets/images/idproof.jpg' height='125px' width='125px' >";
              //  }

               
               $receipt_detail=$this->db->query("select top 1 * from RECEIPT_MASTER where BILLNO='".$bill_no."' order by ROWNO DESC")->row();
               if(isset($receipt_detail))
               {
                  $receipt_count=$receipt_detail->ROWNO;
                  $receipt_date= date($_SESSION['DATE_PATTERN'],strtotime($receipt_detail->RECEIPT_DATE));
                  // date($_SESSION['DATE_PATTERN'],strtotime($receipt_detail->RECEIPT_DATE))
               }
               else
               {
                  $receipt_count=0;
                  $receipt_date="-";
               }

                $receipt_detail=$this->db->query("select top 1 * from RECEIPT_MASTER where BILLNO='".$bill_no."' order by ROWNO desc")->row();
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
                $data['lt_recetpt_date'] = $this->Loanreceipt_model->get_loan_receipts_details($bill_no);
                  $ln_dt = $data['lt_recetpt_date'][0]['ENDATE'];
                  $month_number = date("d-M-Y",strtotime($ln_dt));
                  $data['last_recetpt_date'] = $month_number;
                 
              }
              
              $data['loan_receipts_details']=$this->Loanreceipt_model->get_loan_receipts_details($bill_no);
                if ($ln_dt == $data['loan_receipts_details'][0]['ENDATE']) 
                {
                    $endate = $data['loan_receipts_details'][0]['ENDATE'];
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

                $vIntType = $data['loan_receipts_details'][0]['INTERESTTYPE'];
                $vCalcDate=date('Y-m-d');
                $vLoanDate = $data['loan_receipts_details'][0]['ENDATE'];
                $vLoanPeriod = $data['loan_receipts_details'][0]['MONTHS'];

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

              $due_status="<label class='col-form-label fw-bold fs-5 bg-danger' style='border-radius: 8px;padding: 5px 10px 5px 10px;'  >OverDue</label>";

              }
              else
              {
                // $data['lblODStatus']="NORMAL";
                $due_status="<label class='col-form-label fw-bold fs-5 bg-success' style='border-radius: 8px;padding: 5px 10px 5px 10px;'  >Normal</label>";
              }
              $loan_details=$this->db->query("select * from LOANS where BILLNO='".$bill_no."'")->row();

               $lstatus=$this->db->query("SELECT * FROM loan_status WHERE id='".$loan_details->LOAN_STATUS."'")->row();
              if(isset($lstatus))
              {
                    $div_loan_status='<span style="background-color:'.$lstatus->color_code.';border-radius: 8px;padding: 5px 15px 5px 15px;">'.$lstatus->loan_stage.'</span>';
              }
              // $int = ($loan_details->AMOUNT*$loan_details->INTEREST)/100;
              $int=($loan_details->AMOUNT*$loan_details->INTEREST*$loan_details->MONTHS)/100;


              $paid_details=$this->db->query("SELECT SUM(PRINCIPAL) AS PAID_PRINCIPAL,SUM(INT_AMOUNT) AS PAID_INT_AMOUNT FROM RECEIPT_MASTER WHERE BILLNO='".$bill_no."' ")->row();
              if(isset($paid_details))
              {
                $pprinc=$paid_details->PAID_PRINCIPAL;
                $pint=$paid_details->PAID_INT_AMOUNT;
              }
              else
              {
                $pprinc=0;
                $pint=0;
              }

              $rem_princ=$loan_details->AMOUNT - $pprinc;
              $rem_int=$int - $pint;

              if($loan_details->ITEM_PHOTO!='')
               {
               $item_photo="<img src='data:image/jpg;charset=utf8;base64,".base64_encode($loan_details->ITEM_PHOTO)."'  height='125px' width='125px'>";
               }
               else
               {
                $item_photo="<img src='".base_url()."assets/images/idproof.jpg' height='125px' width='125px' >";
               }
               $hl_bal_rem='0.00';
               $hl_res=$this->db->query("select (sum(HL_DEBIT) - sum(HL_CREDIT)) as hl_balance from HL_TRANS where HL_PID='".$pid."'")->row();
               // print_r("select (sum(HL_DEBIT) - sum(HL_CREDIT)) as hl_balance from HL_TRANS where HL_PID='".$pid."'");
              if(count((array)$hl_res)>0 )
              {
                    if($hl_res->hl_balance>0)
                    {
                        $hl_bal_rem=$hl_res->hl_balance." Dr.";
                    }
                   if($hl_res->hl_balance<0)
                    {
                        $hl_bal_rem=-($hl_res->hl_balance)." Cr.";
                    }
              }
             
              echo "||".$due_status."||".$receipt_count."||".$receipt_date."||".$days1."||".$months1."||".$loan_details->AMOUNT."||".$int."||".$pprinc."||".$pint."||".$rem_princ."||".$rem_int."||".$item_photo."||".$div_loan_status."||".$hl_bal_rem;
      }
      public function load_party_bank()
      {
         $pid=$this->input->post('id');
         // select * from  party_bank_upi_details where party_id='C001543'
         $bank_details= $this->db->query("select * from  party_bank_upi_details where party_id='".$pid."'")->result_array();
         $str="<option >Select</option>";
         foreach ($bank_details as $blist) 
         {
            $str.='<option value="'.$blist['type_id'].'">'.$blist['phone_account_no'].'</option>';
         }
         echo "||".$str;
      }
      public function load_popup_receipt_info()
      {

          $bill_no=$this->input->post('bill_no');

          $receipt_details= $this->db->query("select * from RECEIPT_MASTER where BILLNO='".$bill_no."'")->result_array();
          $loan_details=$this->db->query("select * from LOANS where BILLNO='".$bill_no."'")->row();
          // $loan_details->
            
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
            $txtPaidPrincipal=0;
            $txtPaidInterest=0;
            $data['txtPaidPrincipal']=0;
            $data['txtPaidInterest']=0;


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
                
                $data['receipt_details'] = $this->Loanreceipt_model->get_receipt_details($bill_no);

                
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

                         $vpIntStr=$vpIntStr."<tr><td></td><td>".number_format($vLoanIntPercent,2)."</td><td>".number_format(round($loan_details->AMOUNT,2),2)."</td><td>".number_format(round(($loan_details->AMOUNT+$vFInt),2),2)."</td><td>".number_format(($vLoanAmount+$vFInt-$vPaidTotal),2)."</td></tr>";
                        $vPerDayInterest=$vLoanAmount*10/10000;
                        $vNewP=$vLoanAmount+($vLoanPeriod * $vPerDayInterest) - $vPaidTotal;
                        $vNewP2=$vNewP;
                        $vNewPrincipal=$vNewP;
                    }
                    else
                    {
                        // $vIntStr = $vIntStr ."<tr>". "Principal : ".number_format($vLoanAmount,2). " Int : ". number_format($vFInt,2). " Tot : ".number_format(($vLoanAmount+$vFInt),2)." Paid : ".number_format(($vPaidPrincipal+$vPaidInterest),2)." Bal : ".number_format(($vLoanAmount+$vFInt-$vPaidTotal),2). " Period : ".number_format($vLoanPeriod,2)." Months "." Rate : ". number_format($vLoanIntPercent,2)."</tr>";
                       $vIntStr = $vIntStr ."<tr><td></td><td></td><td>".number_format($vLoanIntPercent,2)."</td><td>".number_format(round($vLoanAmount,2),2)."</td><td>".number_format(round($vFInt,2),2)."</td><td>".number_format(($vPaidPrincipal+$vPaidInterest),2)."</td><td>".number_format(($vLoanAmount+$vFInt-$vPaidTotal),2)."</td></tr>";
                       $vpIntStr = $vpIntStr ."<tr><td></td><td>".number_format($vLoanIntPercent,2)."</td><td>".number_format(round($vLoanAmount,2),2)."</td><td>".number_format(round($vFInt,2),2)."</td><td>".number_format(($vLoanAmount+$vFInt-$vPaidTotal),2)."</td></tr>";
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
                      $vpIntStr= "<tr><td></td><td>".number_format($vLoanIntPercent,2)."</td><td>".number_format(round($vLoanAmount,2),2)."</td><td>".number_format(round($vFInt,2),2)."</td><td>".number_format(($vLoanAmount + $vFInt),2)."</td></tr>";
                    }
                    else
                    {
                       // $vIntStr ="<tr>"."Principal : " . number_format($vLoanAmount,2). " Int : " . number_format($vFInt,2). " Tot : " . number_format(($vLoanAmount + $vFInt),2) . " Period : " .number_format( $vLoanPeriod,2). " Months". " Rate : " . number_format($vLoanIntPercent,2)."</tr>";
                     
                      // $receipt_detail=$this->db->query("SELECT TOP 1 * FROM RECEIPT_MASTER where BILLNO='".$bill_no."'")->row();
                      // if(isset($receipt_detail))
                      // {
                      //    $edt=$receipt_detail->RECEIPT_DATE;
                      //    $next_edt=$receipt_detail->RECEIPT_DATE;  

                      // }
                      // else
                      // {
                         $edt=$data['vLoanLastDate'];
                          $next_edt=$data['vLoanLastDate'];
                      // }
                      $vIntStr= "<tr><td>".$edt."</td><td> - </td><td>".number_format($vLoanIntPercent,2)."</td><td>".number_format(round($vLoanAmount,2),2)."</td><td>".number_format(round($vFInt,2),2)."</td><td>0.00</td><td>".number_format(($vLoanAmount + $vFInt),2)."</td></tr>";
                      $vpIntStr= "<tr><td>".$edt."</td><td>".number_format($vLoanIntPercent,2)."</td><td>".number_format(round($vLoanAmount,2),2)."</td><td>".number_format(round($vFInt,2),2)."</td><td>".number_format(($vLoanAmount + $vFInt),2)."</td></tr>";
                        
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
                            
                            if ($GetNewIntPercent >= 3.5){
                                $GetNewIntPercent = 3.5;
                            }
                            
                            $vCalcInt = $GetNewIntPercent;
                            $vCurrentIntPercent = $vCalcInt;
                            
                            $vSInt = ($vNewP * $p * $vCalcInt / 100);
                            $vTotalInt = round($vTotalInt) + $vSInt;
                            // $vIntStr = $vIntStr . " Int : " . number_format($vSInt,2). " Tot : ".number_format(($vNewP + $vSInt),2). " Period : " . $p. " Mnths" . " Rate : " .number_format($vCalcInt,2)."</tr>" ;
                            $next_edt1=date('Y-m-d',strtotime($next_edt.' +'.$p.' months'));
                            $next_edt=$next_edt1;
                            
                            $vIntStr = $vIntStr ."<tr><td>".$next_edt."<br>(".$p." months)</td><td> - </td><td>".number_format($vCalcInt,2)."</td><td>". round($vNewP,2)."</td><td>".number_format(round($vSInt,2),2)."</td><td>0.00</td><td>".number_format(($vNewP + $vSInt),2)."</td></tr>";

                            $vpIntStr = $vpIntStr ."<tr><td>".$next_edt."<br>(".$p." months)</td><td>".number_format($vCalcInt,2)."</td><td>". round($vNewP,2)."</td><td>".number_format(round($vSInt,2),2)."</td><td>".number_format(($vNewP + $vSInt),2)."</td></tr>";

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
                            $next_edt2=date('Y-m-d',strtotime($next_edt1.' +'.$vExtraDays.' days'));

                            $next_edt=$next_edt2;
                            $vIntStr = $vIntStr . "<tr><td>".$next_edt."<br>(".$vExtraDays." days)</td><td> - </td><td>". number_format($vCalcInt,2)."</td><td>".number_format(round($vNewP2,2),2)."</td><td>".number_format(round($vIntforBaldays,2),2)."</td><td>0.00</td><td>".number_format(($vNewP2 + $vIntforBaldays),2)."</td></tr>";
                            $vpIntStr = $vpIntStr . "<tr><td>".$next_edt."<br>(".$vExtraDays." days)</td><td>". number_format($vCalcInt,2)."</td><td>".number_format(round($vNewP2,2),2)."</td><td>".number_format(round($vIntforBaldays,2),2)."</td><td>".number_format(($vNewP2 + $vIntforBaldays),2)."</td></tr>";
                        }
                        else
                        {
                            $vIntforBaldays = $vNewPrincipal * $vIntMonths * $vCalcInt / 100;
                            $vTotalInt = round($vTotalInt) + $vIntforBaldays;
                            // $vIntStr = $vIntStr . "<tr>". "Principal : " . number_format($vNewPrincipal,2). " Int : " .number_format($vIntforBaldays,2). " Tot : ". number_format(($vNewP2 + $vIntforBaldays),2) . " Period : " . $vExtraDays. " days" . " Rate : " . number_format($vCalcInt,2). "</tr>";
                            $next_edt2=date('Y-m-d',strtotime($next_edt1.' +'.$vFullDays.' days'));

                            $next_edt=$next_edt2;
                              $vIntStr = $vIntStr . "<tr><td>".$next_edt."<br>(".$vFullDays." days)</td><td> - </td><td>". number_format($vCalcInt,2)."</td><td>".number_format(round($vNewPrincipal,2),2)."</td><td>".number_format(round($vIntforBaldays,2),2)."</td><td>0.00</td><td>".number_format(($vNewP2 + $vIntforBaldays),2)."</td></tr>";
                              $vpIntStr = $vpIntStr . "<tr><td>".$next_edt."<br>(".$vFullDays." days)</td><td>". number_format($vCalcInt,2)."</td><td>".number_format(round($vNewPrincipal,2),2)."</td><td>".number_format(round($vIntforBaldays,2),2)."</td><td>".number_format(($vNewP2 + $vIntforBaldays),2)."</td></tr>";
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
                            $vpIntStr = $vpIntStr . "<tr><td></td><td> - </td><td>".number_format($vCalcInt,2)."</td><td>".number_format(round($vNewP,2),2)."</td><td>".number_format(round($vSInt,2),2)."</td><td>0.00</td><td>".number_format(($vNewP + $vSInt),2)."</td></tr>";
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
                 $vpIntStr = $vpIntStr . "<tr><td></td><td><b>Total</b> </td> <td><b>".$vLoanAmount."</b></td><td> <b>" . number_format($vTotalInterest,2)."</b></td>";
                // $vIntStr = $vIntStr . "    Total Amount : " .number_format(($vLoanAmount + $vTotalInterest),2)."</td>";
                $vIntStr = $vIntStr ."<td><b>" .number_format($vTotalPaidAmount,2)."</b></td>";
                $vIntStr = $vIntStr ."<td><b>".number_format($vNetAmount,2)."</b></td></tr>";
                $vpIntStr = $vpIntStr ."<td><b>".number_format($vNetAmount,2)."</b></td></tr>";
                
                $data['vIntStr'] = $vIntStr;
                $data['vpIntStr'] = $vpIntStr;
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

                    // $vIntStr = $vIntStr . "<tr><td></td><td>-</td><td>".number_format($vLoanIntPercent,2)."</td><td>".number_format(round($vLoanAmount,2),2)."</td><td>".number_format(round($data['txtInterest'],2),2)."</td><td>0.00</td><td>".number_format(($vLoanAmount + $data['txtInterest']),2)."</td></tr>";

                    $vIntStr = $vIntStr . "<tr><td></td><td>-</td><td>".number_format($vLoanIntPercent,2)."</td><td>".number_format(round($vLoanAmount,2),2)."</td><td>".number_format(round($data['txtInterest'],2),2)."</td>><td>".number_format(($vLoanAmount + $data['txtInterest']),2)."</td></tr>";

                    // $vpIntStr = $vpIntStr . "<tr><td></td><td>".number_format($vIntPerMonth,2)."</td><td>".number_format(round($vLoanAmount,2),2)."</td><td>".number_format(round($data['txtInterest'],2),2)."</td><td>0.00</td><td>".number_format(($vLoanAmount + $data['txtInterest']),2)."</td></tr>";

                    $vpIntStr = $vpIntStr . "<tr><td></td><td>".number_format($vLoanIntPercent,2)."</td><td>".number_format(round($vLoanAmount,2),2)."</td><td>".number_format(round($data['txtInterest'],2),2)."</td><td>".number_format(($vLoanAmount + $data['txtInterest']),2)."</td></tr>";

                    $data['vIntStr'] = $vIntStr;
                    $data['vpIntStr'] = $vpIntStr;
                 }
            }

                              // print_r($vIntStr);
                              // exit();
         echo "||".$vIntStr."||".$vTotalInterest."||".$data['txtPaidPrincipal']."||".$data['txtPaidInterest']."||".$data['txtPaidTotal']."||".$data['txtTotal']."||".$vLoanAmount."||".$vpIntStr;
          
      }
      public function redemption_save()
      {

        // exit();
          $billno=strtoupper( $this->input->post('redemp_bill_no'));
        // $vMasterSno=$_SESSION['LOANPREFIX'].$this->Redemptions_model->get_other_db_master_sno('VOUCHER_MASTER-'.$_SESSION['LOANPREFIX']);
        // $vDetailSno=$_SESSION['LOANPREFIX'].$this->Redemptions_model->get_other_db_master_sno('ACC_RECEIPTS-'.$_SESSION['LOANPREFIX']);
          $loan_details=$this->db->query("select * from LOANS where BILLNO='".$billno."'")->row();
          $vCheckReturned = "N";
          $vCheckReceived = "N";
          $lblBalance=0;
          
          $cls_type=$this->input->post('redemp_radio');

          $loan_prin=$this->input->post('txt_hidden_loan_principal');
          $loan_int=$this->input->post('txt_hidden_loan_interest');
          $paid_prin=$this->input->post('txt_hidden_paid_principal');
          $paid_int=$this->input->post('txt_hidden_paid_interest');
          $bal_prin=$this->input->post('txt_hidden_bal_principal');
          $bal_int=$this->input->post('txt_hidden_bal_interest');

          $txtTotal=$loan_int+$loan_prin;
          $txtNetPay=$bal_prin+$bal_int;
          $txtPaidAmount=$paid_prin+$paid_int;

          $res=$this->db->query("select  top 1 * from REDEMPTIONS where SNO like '".$_SESSION['LOANPREFIX']."%' order by RETURNDATE desc,SNO desc")->row();
          $str=$res->SNO;
          $sub=substr($str, 1);
          $sno=$_SESSION['LOANPREFIX'].($sub+1);
          

          if($cls_type=='redp_cus_c_radio_val')
            {
                $vClosingStatus = "CUSTOMER_CLOSE";
                $closed_by=$this->input->post('cus_close_closed_by');

                $maint_chg=$this->input->post("cust_cls_pap_act_chg");
                $notice_chg=$this->input->post("cust_cls_not_chg");
                $form_chg=$this->input->post("cust_cls_frm_miss_chg");
                $on_acc_chg=$this->input->post("cust_cls_on_acc_chg");
                $disc_chg=$this->input->post("cust_cls_disc_chg");

                if($closed_by=='party')
                {
                    $vClosedBy='CUSTOMER';
                    $vClosedName=$loan_details->NAME;
                }
                else if($closed_by=='nominee')
                {
                    $vClosedBy='NOMINEE';
                    $vClosedName=$loan_details->NOMINEE;
                }
                else if($closed_by=='others')
                {
                    $vClosedBy='OTHERS';
                    $vClosedName=$this->input->post('cust_cls_by_others');
                }
                if($this->input->post('cash_cus_close_paid_from_party_add_radio')==true)
                {
                    $cash_amt=$this->input->post('cust_cls_ppcash_amt');
                    $cash_det=$this->input->post('cust_cls_ppcash_details');
                    
                    $result  = $this->db->query("INSERT INTO payment_inward_outward(module_name, type_of_payment, amount, party_bank, cheque_ref_no, company_bank, remarks, bill_no, party_id, payment_side, metal_type, quality, purity, weight, pure_metal_weight,  created_by, created_on, record_status) VALUES('New Redemption - Customer Close','Cash','".$cash_amt."','','','','".$cash_det."','".$billno."','".$loan_details->PID."','CR','','','','0.00','0.00','".$_SESSION['username']."','".date('Y-m-d H:i:s')."','0')");
                    save_query_in_log();
                }
                if($this->input->post('cheque_cus_close_paid_from_party_add_radio')==true)
                {
                  $chq_amt=$this->input->post('cust_cls_ppchq_amt');
                  $chq_party_bank=$this->input->post('cust_cls_ppchq_party_bank');
                  $chq_ref_no=$this->input->post('cust_cls_ppchq_ref_no');
                  $chq_details=$this->input->post('cust_cls_ppchq_details');

                  $result  = $this->db->query("INSERT INTO payment_inward_outward(module_name, type_of_payment, amount, party_bank, cheque_ref_no, company_bank, remarks, bill_no, party_id, payment_side, metal_type, quality, purity, weight, pure_metal_weight,  created_by, created_on, record_status) VALUES('New Redemption - Customer Close','Cheque','".$chq_amt."','".$chq_party_bank."','".$chq_ref_no."','','".$chq_details."','".$billno."','".$loan_details->PID."','CR','','','','0.00','0.00','".$_SESSION['username']."','".date('Y-m-d H:i:s')."','0')");
                  save_query_in_log();
                }
                if($this->input->post('rtgs_cus_close_paid_from_party_add_radio')==true)
                {
                  $rtgs_amt=$this->input->post('cust_cls_pprtgs_amount');
                  $rtgs_ref_no=$this->input->post('cust_cls_pprtgs_ref_no');
                  $rtgs_comp_bank=$this->input->post('cust_cls_pprtgs_company_bank');
                  $rtgs_details=$this->input->post('cust_cls_pprtgs_details');

                  $result  = $this->db->query("INSERT INTO payment_inward_outward(module_name, type_of_payment, amount, party_bank, cheque_ref_no, company_bank, remarks, bill_no, party_id, payment_side, metal_type, quality, purity, weight, pure_metal_weight,  created_by, created_on, record_status) VALUES('New Redemption - Customer Close','RTGS','".$rtgs_amt."','','".$rtgs_ref_no."','".$rtgs_comp_bank."','".$rtgs_details."','".$billno."','".$loan_details->PID."','CR','','','','0.00','0.00','".$_SESSION['username']."','".date('Y-m-d H:i:s')."','0')");
                    save_query_in_log();
                }

                if($this->input->post('upi_cus_close_paid_from_party_add_radio')==true)
                {
                    $upi_amt=$this->input->post('cust_cls_ppupi_amount');
                    $upi_ref_no=$this->input->post('cust_cls_ppupi_ref_no');
                    $upi_comp_bank=$this->input->post('cust_cls_ppupi_company_bank');
                    $upi_details=$this->input->post('cust_cls_ppupi_details');

                    $result  = $this->db->query("INSERT INTO payment_inward_outward(module_name, type_of_payment, amount, party_bank, cheque_ref_no, company_bank, remarks, bill_no, party_id, payment_side, metal_type, quality, purity, weight, pure_metal_weight,  created_by, created_on, record_status) VALUES('New Redemption - Customer Close','RTGS','".$upi_amt."','','".$upi_ref_no."','".$upi_comp_bank."','".$upi_details."','".$billno."','".$loan_details->PID."','CR','','','','0.00','0.00','".$_SESSION['username']."','".date('Y-m-d H:i:s')."','0')");
                      save_query_in_log();
                }

                if($this->input->post('mcard_cus_close_paid_from_party_add_radio')==true)
                {
                  $mem_amt=$this->input->post('cust_cls_ppmem_red_points');
                  $mem_card_no=$this->input->post('cust_cls_ppmem_card');
                  $mem_details=$this->input->post('cust_cls_ppmem_details');  

                  $result  = $this->db->query("INSERT INTO payment_inward_outward(module_name, type_of_payment, amount, party_bank, cheque_ref_no, company_bank, remarks, bill_no, party_id, payment_side, metal_type, quality, purity, weight, pure_metal_weight,  created_by, created_on, record_status) VALUES('New Redemption - Customer Close','Member Card','".$mem_amt."','','".$mem_card_no."','','".$mem_details."','".$billno."','".$loan_details->PID."','CR','','','','0.00','0.00','".$_SESSION['username']."','".date('Y-m-d H:i:s')."','0')");
                    save_query_in_log();            
                }

                if($this->input->post('chit_cus_close_paid_from_party_add_radio')==true)
                {
                  $chit_amt=$this->input->post('cust_cls_ppchit_red_amount');
                  $chit_scheme=$this->input->post('cust_cls_ppchit_scheme');
                  $chit_number=$this->input->post('cust_cls_ppchit_number');
                  $chit_details=$this->input->post('cust_cls_ppchit_details');

                  $result  = $this->db->query("INSERT INTO payment_inward_outward(module_name, type_of_payment, amount, party_bank, cheque_ref_no, company_bank, remarks, bill_no, party_id, payment_side, metal_type, quality, purity, weight, pure_metal_weight,  created_by, created_on, record_status) VALUES('New Redemption - Customer Close','Chit','".$chit_amt."','".$chit_scheme."','".$chit_number."','','".$chit_details."','".$billno."','".$loan_details->PID."','CR','','','','0.00','0.00','".$_SESSION['username']."','".date('Y-m-d H:i:s')."','0')");
                    save_query_in_log();
                }

                $paid_res=$this->db->query("select SUM(amount) as paid_amount from payment_inward_outward where module_name='New Redemption - Customer Close' and bill_no='".$billno."'")->row();
                
                $txtPaidAmount=$paid_res->paid_amount;

                //for Form miss charge - file upload 
                  if(!empty($_FILES['cust_cls_form_miss_doc']['name']))
                  {   
                      $bill_name=implode('-',(explode('/',$billno)));
                      // echo $bill_name; exit();
                      $ext = pathinfo($_FILES['cust_cls_form_miss_doc']['name'], PATHINFO_EXTENSION);
                      $config['upload_path'] = 'assets/images/redemption_form_miss_doc';
                      $config['allowed_types'] = 'jpg|jpeg|png|doc|docx|pdf';
                      $config['file_name'] = 'FMC-'.$bill_name;
                      $profileName = $config['file_name'].'.'.$ext;
                      // echo $profileName; exit();
                      // $this->upload->initialize($config);
                      $this->load->library('upload',$config);
                      
                      if($this->upload->do_upload('cust_cls_form_miss_doc'))
                      {
                        $uploadData = $this->upload->data();
                        $data['cust_cls_form_miss_doc'] = $profileName;
                      }
                      else
                      {
                        $data['cust_cls_form_miss_doc'] = '';
                      }
                  }
                  else
                  {
                      $data['cust_cls_form_miss_doc'] = '';
                  }

                $res = $this->db->query("INSERT INTO REDEMPTIONS(CLOSED_BY, CLOSED_NAME, CHK_RECEIVED, CHK_RETURNED, BILLNO, RETURNDATE, INTEREST, PAIDINTEREST, PRINCIPAL, PAIDPRINCIPAL, TOTALPAY, MAINTAINCHARGE, FORMCHARGE, NOTICECHARGE, HL_AMOUNT, DISCOUNT, NETPAYABLE, PAIDAMOUNT, BALANCE, CLOSING_TYPE, ADDED_USER, ADDED_TIME, CHK_VERIFIED, PID,NAME,TYPE_OF_RECORD,SNO,FORM_DOC_PATH) VALUES ('".$vClosedBy . "','" . $vClosedName . "','" .$vCheckReceived ."','" . $vCheckReturned . "','" . $billno . "','" .date('Y-m-d') . "',".$loan_int. "," .$paid_int. "," .$loan_prin. "," .$paid_prin. ", " .$txtTotal.",". $maint_chg. ", " .$form_chg . ", " . $notice_chg . "," . $on_acc_chg . "," . $disc_chg . ", " . $txtNetPay. "," . $txtPaidAmount . "," . $lblBalance . ",'" . $vClosingStatus . "','" . $_SESSION['username']. "','" . date('Y-m-d H:i:s') . "','N','".$loan_details->PID."','".$loan_details->NAME."','N','".$sno."','".$data['cust_cls_form_miss_doc']."')");
                save_query_in_log();
               $loan_update=$this->db->query("UPDATE LOANS SET CLOSEDATE='" . date('Y-m-d') . "',ACTIVE='N',CLOSING_STATUS='" .$vClosingStatus. "', LOAN_STATUS=10 WHERE BILLNO='".$billno."'");
               $redemp_payment_update=$this->db->query("UPDATE payment_inward_outward SET record_status=1 WHERE bill_no='".$billno."'");
               save_query_in_log();
          }
          else if($cls_type=='redp_cus_t_radio_val')
          {
              
                $maint_chg=$this->input->post("cust_trans_pap_act_chg");
                $notice_chg=$this->input->post("cust_trans_not_chg");
                $form_chg=$this->input->post("cust_trans_frm_miss_chg");
                $on_acc_chg=$this->input->post("cust_trans_on_acc_chg");
                $disc_chg=$this->input->post("cust_trans_disc_chg");
                $pur_amount=$this->input->post("");
                $closed_by=$this->input->post('cus_trans_closed_by');

              
               $jewel_type=$this->input->post("cust_trans_new_ln_jewel_type");
               $scheme=$this->input->post("cust_trans_new_ln_scheme");
               $int_type=$this->input->post("cust_trans_new_ln_int_type");
               $new_loan_amt=$this->input->post("cust_trans_new_ln_loan_amount");
               $new_redemp_period=$this->input->post("cust_trans_new_ln_redemption_period");
               $new_pro_chg=$this->input->post("cust_trans_new_ln_process_chg");
               $new_doc_chg=$this->input->post("cust_trans_new_ln_doc_chg_hidden");
               $new_remarks=$this->input->post("cust_trans_new_ln_topay_remarks");

                $pid=$this->input->post("r_pid");
                $ln_date= date_format(date_create($this->input->post("r_date")),'Y-m-d');
                $old_billno=$this->input->post("redemp_bill_no");
                $vClosingStatus = "CUSTOMER_TRANSFER";
                $vClosedBy='';
                $vClosedName='';


                 if($closed_by=='party')
                {
                    $vClosedBy='CUSTOMER';
                    $vClosedName=$loan_details->NAME;
                }
                else if($closed_by=='nominee')
                {
                    $vClosedBy='NOMINEE';
                    $vClosedName=$loan_details->NOMINEE;
                }
                else if($closed_by=='others')
                {
                    $vClosedBy='OTHERS';
                    $vClosedName=$this->input->post('cust_trans_by_others');
                }


               $old_data=$this->db->query("select * from LOANS where BILLNO='".$old_billno."'")->row();

                $int_list=$this->db->query("select * from INTERESTLIST where INTID='".$int_type."'")->row();
                $data['months']= round($int_list->PERIOD);
                $data['interest_type']=$int_list->INTNAME;
                $data['interest']=$int_list->INTEREST;
                

                // echo $data['billno'];

                // $tx =$int_list->INTNAME ;
                // $it = explode('-', $tx);
                // $int_tx = $it[0];
                // $int_tx = trim($int_tx);
                // $int_tx_len = strlen($int_tx);

                // $int_txt_lst = $this->Loan_model->loan_get_int_type_id_by_billno($int_tx,$int_tx_len);
                // $d = date("y");
                // if ($int_txt_lst == "") 
                // {
                //   $data['billno']= $int_tx."-0001/".$d;
                // }
                // else
                //   {
                //     $last= $int_txt_lst->BILLNO;
                //     $pattern = "/[-\/]/";
                //     $components = preg_split($pattern, $last);
                //     // echo $components[count($components)-2];
                //     $ls1 = $components[count($components)-2];

                //     if (strlen($ls1)=="2") 
                //     {
                //       $next_value = (int)$ls1 + 1;
                //       $uid=str_pad($next_value,2,0,STR_PAD_LEFT);

                //       $data['billno']= $int_tx."-".$uid."/".$d;
                //     }
                //     elseif (strlen($ls1)=="3") 
                //     {
                //       if ($int_tx == "F") 
                //         { 
                //           // $tx = $_POST['txt'];
                //           // $pattern = "/[-]/";
                //           // $components = preg_split($pattern, $tx);
                //           // $int_t = $components[0]."-NTP";

                //           $next_value = (int)$ls1 + 1;
                //           $uid=str_pad($next_value,3,0,STR_PAD_LEFT);
                //           $data['billno']= $int_tx."-NTP-".$uid."/".$d;
                //         }
                //       else
                //         {
                //           $next_value = (int)$ls1 + 1;
                //           $uid=str_pad($next_value,3,0,STR_PAD_LEFT);
                //           $data['billno']= $int_tx."-".$uid."/".$d;

                //         }
                      
                //     }
                //     else
                //     {
                //       $next_value = (int)$ls1 + 1;
                //       $uid=str_pad($next_value,4,0,STR_PAD_LEFT);

                //       $data['billno']= $int_tx."-".$uid."/".$d;
                //     }
              
                //   }


                  $new_bill_no=$data['billno'];

                  //for Form miss charge - file upload 
                  if(!empty($_FILES['cust_trans_form_miss_doc']['name']))
                  {   
                      $bill_name=implode('-',(explode('/',$billno)));
                      // echo $bill_name; exit();
                      $ext = pathinfo($_FILES['cust_trans_form_miss_doc']['name'], PATHINFO_EXTENSION);
                      $config['upload_path'] = 'assets/images/redemption_form_miss_doc';
                      $config['allowed_types'] = 'jpg|jpeg|png|doc|docx|pdf';
                      $config['file_name'] = 'FMC-'.$bill_name;
                      $profileName = $config['file_name'].'.'.$ext;
                      // echo $profileName; exit();
                      // $this->upload->initialize($config);
                      $this->load->library('upload',$config);
                      
                      if($this->upload->do_upload('cust_trans_form_miss_doc'))
                      {
                        $uploadData = $this->upload->data();
                        $data['cust_trans_form_miss_doc'] = $profileName;
                      }
                      else
                      {
                        $data['cust_trans_form_miss_doc'] = '';
                      }
                  }
                  else
                  {
                      $data['cust_trans_form_miss_doc'] = '';
                  }

                $res = $this->db->query("INSERT INTO REDEMPTIONS(CLOSED_BY, CLOSED_NAME, CHK_RECEIVED, CHK_RETURNED, BILLNO, RETURNDATE, INTEREST, PAIDINTEREST, PRINCIPAL, PAIDPRINCIPAL, TOTALPAY, MAINTAINCHARGE, FORMCHARGE, NOTICECHARGE, HL_AMOUNT, DISCOUNT, NETPAYABLE, PAIDAMOUNT, BALANCE, CLOSING_TYPE, ADDED_USER, ADDED_TIME, CHK_VERIFIED, PID,NAME,TYPE_OF_RECORD, NEWLOANAMOUNT, NEWBILLNO,SNO,FORM_DOC_PATH) VALUES ('".$vClosedBy . "','" . $vClosedName . "','" .$vCheckReceived ."','" . $vCheckReturned . "','" . $billno . "','" .date('Y-m-d') . "',".$loan_int. "," .$paid_int. "," .$loan_prin. "," .$paid_prin. ", " .$txtTotal.",". $maint_chg. ", " .$form_chg . ", " . $notice_chg . "," . $on_acc_chg . "," . $disc_chg . ", " . $txtNetPay. "," . $txtPaidAmount . ",'" . $lblBalance . "','" . $vClosingStatus . "','" . $_SESSION['username']. "','" . date('Y-m-d H:i:s') . "','N','".$loan_details->PID."','".$loan_details->NAME."','N','".$new_loan_amt."','".$new_bill_no."','".$sno."','".$data['cust_trans_form_miss_doc']."')");
                save_query_in_log();
               $loan_update=$this->db->query("UPDATE LOANS SET CLOSEDATE='" . date('Y-m-d') . "',ACTIVE='N',CLOSING_STATUS='" .$vClosingStatus. "',REN_TO_BILLNO='".$new_bill_no."', LOAN_STATUS=10 WHERE BILLNO='" .$billno. "'");
               save_query_in_log();

               //New Loan Add Process
               
                $company = $data['company'] = $this->input->post('r_company_select');


                $tx =$int_list->INTNAME ;
                $it = explode('-', $tx);
                $int_tx = $it[0];
                $int_tx = trim($int_tx);
                $int_tx_len = strlen($int_tx);

                $int_txt_lst = $this->Loan_model->loan_get_int_type_id_by_billno($int_tx,$int_tx_len);
                $d = date("y");
                if(isset($int_txt_lst))
                {

                    if($int_txt_lst->TYPE_OF_RECORD=='O')
                    {
                        $search=$data['company'].'-'.$it[0];
                        // $search=$data['company'].'-'.$int_list->INTNAME;
                        echo $search;
                        $int_txt_lst1  = $this->db->query("SELECT TOP 1 BILLNO,TYPE_OF_RECORD,COMPANYCODE FROM LOANS WHERE BILLNO LIKE '".$search."%'  ORDER BY ADDED_TIME DESC")->row();
                        if(isset($int_txt_lst1))
                        {

                            $last= $int_txt_lst1->BILLNO;
                            $pattern = "/[-\/]/";
                            $components = preg_split($pattern, $last);
                            $ls1 = $components[count($components)-2];

                            
                            if (strlen($ls1)=="2") 
                            {
                              $next_value = (int)$ls1 + 1;
                              $uid=str_pad($next_value,2,0,STR_PAD_LEFT);

                              $data['billno']= $data['company'].'-'.$int_tx."-".$uid."/".$d;
                            }
                            elseif (strlen($ls1)=="3") 
                            {
                                if ($int_tx == "F") 
                                { 
                                  // $tx = $_POST['txt'];
                                  // $pattern = "/[-]/";
                                  // $components = preg_split($pattern, $tx);
                                  // $int_t = $components[0]."-NTP";

                                  $next_value = (int)$ls1 + 1;
                                  $uid=str_pad($next_value,3,0,STR_PAD_LEFT);
                                  $data['billno']= $data['company'].'-'.$int_tx."-NTP-".$uid."/".$d;
                                }
                                else
                                {
                                  $next_value = (int)$ls1 + 1;
                                  $uid=str_pad($next_value,3,0,STR_PAD_LEFT);
                                  $data['billno']= $data['company'].'-'.$int_tx."-".$uid."/".$d;

                                }
                              
                            }
                            else
                            {
                              $next_value = (int)$ls1 + 1;
                              $uid=str_pad($next_value,4,0,STR_PAD_LEFT);

                              $data['billno']= $data['company'].'-'.$int_tx."-".$uid."/".$d;
                            }

                            // if (strlen($ls1)=="2") 
                            // {
                            //   $next_value = (int)$ls1 + 1;
                            //   $uid=str_pad($next_value,2,0,STR_PAD_LEFT);

                            //   $data['billno']= $data['company'].'-'.$int_tx."-".$uid."/".$d;
                            // }
                            // elseif (strlen($ls1)=="3") 
                            // {
                            //   if ($int_tx == "F") 
                            //     { 
                            //       // $tx = $_POST['txt'];
                            //       // $pattern = "/[-]/";
                            //       // $components = preg_split($pattern, $tx);
                            //       // $int_t = $components[0]."-NTP";

                            //       $next_value = (int)$ls1 + 1;
                            //       $uid=str_pad($next_value,3,0,STR_PAD_LEFT);
                            //       $data['billno']= $data['company'].'-'.$int_tx."-NTP-".$uid."/".$d;
                            //     }
                            //   else
                            //     {
                            //       $next_value = (int)$ls1 + 1;
                            //       $uid=str_pad($next_value,3,0,STR_PAD_LEFT);
                            //       $data['billno']= $data['company'].'-'.$int_tx."-".$uid."/".$d;

                            //     }
                              
                            // }
                            // else
                            // {
                            //   $next_value = (int)$ls1 + 1;
                            //   $uid=str_pad($next_value,4,0,STR_PAD_LEFT);

                            //   $data['billno']= $data['company'].'-'.$int_tx."-".$uid."/".$d;
                            // }
                        }
                        else
                        {
                            $data['billno']= $data['company'].'-'.$int_tx."-0001/".$d;
                        }
                    }
                    else if($int_txt_lst->TYPE_OF_RECORD=='N') 
                    {

                        $it = explode('-', $int_list->INTNAME);
                        $int_tx = $it[0];
                        $search=$data['company'].'-'.$it[0];
                        // $search=$data['company'].'-'.$int_list->INTNAME;
                        echo $search;
                        $int_txt_lst  = $this->db->query("SELECT TOP 1 BILLNO,TYPE_OF_RECORD,COMPANYCODE FROM LOANS WHERE BILLNO LIKE '".$search."%'  ORDER BY ADDED_TIME DESC")->row();
                        if(isset($int_txt_lst))
                        {
                            $last= $int_txt_lst->BILLNO;
                            $pattern = "/[-\/]/";
                            $components = preg_split($pattern, $last);
                            // echo $components[count($components)-2];
                            // exit();
                            $ls1 = $components[count($components)-2];


                            if (strlen($ls1)=="2") 
                            {
                              $next_value = (int)$ls1 + 1;
                              $uid=str_pad($next_value,2,0,STR_PAD_LEFT);

                              $data['billno']= $data['company'].'-'.$int_tx."-".$uid."/".$d;
                            }
                            elseif (strlen($ls1)=="3") 
                            {
                                if ($int_tx == "F") 
                                { 
                                  // $tx = $_POST['txt'];
                                  // $pattern = "/[-]/";
                                  // $components = preg_split($pattern, $tx);
                                  // $int_t = $components[0]."-NTP";

                                  $next_value = (int)$ls1 + 1;
                                  $uid=str_pad($next_value,3,0,STR_PAD_LEFT);
                                  $data['billno']= $data['company'].'-'.$int_tx."-NTP-".$uid."/".$d;
                                }
                                else
                                {
                                  $next_value = (int)$ls1 + 1;
                                  $uid=str_pad($next_value,3,0,STR_PAD_LEFT);
                                  $data['billno']= $data['company'].'-'.$int_tx."-".$uid."/".$d;

                                }
                              
                            }
                            else
                            {
                              $next_value = (int)$ls1 + 1;
                              $uid=str_pad($next_value,4,0,STR_PAD_LEFT);

                              $data['billno']= $data['company'].'-'.$int_tx."-".$uid."/".$d;
                            }
                        }
                        else
                        {
                            $data['billno']=$data['company'].'-'. $int_tx."-0001/".$d;
                        }
                    }
                }
                else
                {
                   $data['billno']=$data['company'].'-'. $int_tx."-0001/".$d;
                   // echo $data['billno'];
                }

                $cur_rate=$this->db->query("select * from general_settings")->row();

                $totsalerate=$old_data->NETWEIGHT*$cur_rate->gold_rate*($old_data->QUALITY/100);
                $pergmval=$totsalerate/$old_data->NETWEIGHT;

                $result  = $this->db->query("INSERT INTO LOANS(PID, NAME, BILLNO, LOAN_TYPE, ENDATE, JEWEL_TYPE, MONTHS, INTERESTTYPE, INTEREST, NOMINEE, RELATION, ACTIVE, STATUS, COMPANYCODE, ATTENDED_USER, ADDED_USER, ADDED_TIME, LOAN_STATUS, TYPE_OF_RECORD, CHK_VERIFIED, AMOUNT, BALANCE, CURRENTRATE, PLEDGEINFO, PLEDGE_SUMMARY, WEIGHT, STONELESS, LESS, NETWEIGHT, QUALITY, PERGRAMVALUE, TOTALSALESRATE, PROCESSING_CHARGE, DCAMOUNT, REDEMPTION_PERIOD, NET_PAY) VALUES ('".$old_data->PID."','".$old_data->NAME."','".$data['billno']."','Renewal','".$ln_date."','".$jewel_type."','".$data['months']."','".$data['interest_type']."','".$data['interest']."','".$old_data->NOMINEE."','".$old_data->RELATION."','Y','','".$company."','".$_SESSION['username']."','".$_SESSION['username']."','".date('Y-m-d H:i:s')."','1','N','N','".$new_loan_amt."','".$new_loan_amt."','".$cur_rate->gold_rate."','".$old_data->PLEDGEINFO."','".$old_data->PLEDGE_SUMMARY."','".$old_data->WEIGHT."','".$old_data->STONELESS."','".$old_data->LESS."','".$old_data->NETWEIGHT."','".$old_data->QUALITY."','".$pergmval."','".$totsalerate."','".$new_pro_chg."','".$new_doc_chg."','".$new_redemp_period."','".$new_loan_amt."')");
                
          }
          else if($cls_type=='redp_cmy_sl_radio_val')
          { 
            // exit();
                  $vClosingStatus = "CUSTOMER_SALE";
                  $closed_by=$this->input->post('cus_sale_closed_by');
                  $pur_amount=$this->input->post('r_purhcase_amount');
                  $rem_amount=$this->input->post('r_remaining_amount');

                  $maint_chg=$this->input->post("cust_sale_pap_act_chg");
                  $notice_chg=$this->input->post("cust_sale_not_chg");
                  $form_chg=$this->input->post("cust_sale_frm_miss_chg");
                  $on_acc_chg=$this->input->post("cust_sale_on_acc_chg");
                  $disc_chg=$this->input->post("cust_sale_disc_chg");
                  

                  if($closed_by=='party')
                  {
                      $vClosedBy='CUSTOMER';
                      $vClosedName=$loan_details->NAME;
                  }
                  else if($closed_by=='nominee')
                  {
                      $vClosedBy='NOMINEE';
                      $vClosedName=$loan_details->NOMINEE;
                  }
                  else if($closed_by=='others')
                  {
                      $vClosedBy='OTHERS';
                      $vClosedName=$this->input->post('cust_sale_by_others');
                  }

                  $witness_name =  $this->input->post("w_name") ;
                  $witness_relation = $this->input->post("w_relation");
                  $witness_mobile = $this->input->post("w_phone");
                  $witness_remarks = $this->input->post("w_remarks");
                  $witness_count= count((array)$witness_name);

                  $w_name=$w_relation=$w_mobile=$w_remarks='';

                  // echo $witness_count;
                  // print_r($witness_name);
                  // print_r($witness_relation);
                  // print_r($witness_mobile);
                  // print_r($witness_remarks);
                  
                  for ($i=0;$i<$witness_count; $i++)
                  {
                      if($witness_name[$i]!='')
                      { 
                          if($i==0)
                          {
                              $w_name=$witness_name[$i];
                              $w_relation=$witness_relation[$i];
                              $w_mobile=$witness_mobile[$i];
                              $w_remarks=$witness_remarks[$i];
                          }
                          else
                          {
                              $w_name.=",".$witness_name[$i];
                              $w_relation.=",".$witness_relation[$i];
                              $w_mobile.=",".$witness_mobile[$i];
                              $w_remarks.=",".$witness_remarks[$i];
                          }
                      }
                  }
                    // echo $w_name."<br>";
                    // echo $w_relation."<br>";
                    // echo $w_mobile."<br>";
                    // echo $w_remarks."<br>";
                  
                  // exit();

                  

                  if($this->input->post('cash_cus_sale_paid_from_company_add_radio')==true)
                  {
                      $cash_amt=$this->input->post('cust_sale_cpcash_amt');
                      $cash_det=$this->input->post('cust_sale_cpcash_details');
                      
                      $result  = $this->db->query("INSERT INTO payment_inward_outward(module_name, type_of_payment, amount, party_bank, cheque_ref_no, company_bank, remarks, bill_no, party_id, payment_side, metal_type, quality, purity, weight, pure_metal_weight,  created_by, created_on, record_status) VALUES('New Redemption - Customer Sale','Cash','".$cash_amt."','','','','".$cash_det."','".$billno."','".$loan_details->PID."','DR','','','','0.00','0.00','".$_SESSION['username']."','".date('Y-m-d H:i:s')."','0')");
                      save_query_in_log();
                  }
                  if($this->input->post('cheque_cus_sale_paid_from_company_add_radio')==true)
                  {
                    $chq_amt=$this->input->post('cust_sale_cpchq_amt');
                    $chq_comp_bank=$this->input->post('cust_sale_cpchq_comp_bank');
                    $chq_party_bank=$this->input->post('cust_sale_cpchq_party_bank');
                    $chq_ref_no=$this->input->post('cust_sale_cpchq_no');
                    $chq_details=$this->input->post('cust_sale_cpchq_details');

                    $result  = $this->db->query("INSERT INTO payment_inward_outward(module_name, type_of_payment, amount, party_bank, cheque_ref_no, company_bank, remarks, bill_no, party_id, payment_side, metal_type, quality, purity, weight, pure_metal_weight,  created_by, created_on, record_status) VALUES('New Redemption - Customer Sale','Cheque','".$chq_amt."','".$chq_party_bank."','".$chq_ref_no."','".$chq_comp_bank."','".$chq_details."','".$billno."','".$loan_details->PID."','DR','','','','0.00','0.00','".$_SESSION['username']."','".date('Y-m-d H:i:s')."','0')");
                    save_query_in_log();
                  }
                  if($this->input->post('rtgs_cus_sale_paid_from_company_add_radio')==true)
                  {
                    $rtgs_amt=$this->input->post('cust_sale_cprtgs_amount');
                    $rtgs_ref_no=$this->input->post('cust_sale_cprtgs_ref_no');
                    $rtgs_party_bank=$this->input->post('cust_sale_cprtgs_party_bank');
                    $rtgs_comp_bank=$this->input->post('cust_sale_cprtgs_comp_bank');
                    $rtgs_details=$this->input->post('cust_sale_cprtgs_details');

                    $result  = $this->db->query("INSERT INTO payment_inward_outward(module_name, type_of_payment, amount, party_bank, cheque_ref_no, company_bank, remarks, bill_no, party_id, payment_side, metal_type, quality, purity, weight, pure_metal_weight,  created_by, created_on, record_status) VALUES('New Redemption - Customer Sale','RTGS','".$rtgs_amt."','".$rtgs_party_bank."','".$rtgs_ref_no."','".$rtgs_comp_bank."','".$rtgs_details."','".$billno."','".$loan_details->PID."','DR','','','','0.00','0.00','".$_SESSION['username']."','".date('Y-m-d H:i:s')."','0')");
                      save_query_in_log();
                  }

                  if($this->input->post('upi_cus_sale_paid_from_company_add_radio')==true)
                  {
                      $upi_amt=$this->input->post('cust_sale_cpupi_amount');
                      $upi_ref_no=$this->input->post('cust_sale_cpupi_ref_no');
                      $upi_party_bank=$this->input->post('cust_sale_cpupi_party_bank');
                      $upi_comp_bank=$this->input->post('cust_sale_cpupi_comp_bank');
                      $upi_details=$this->input->post('cust_sale_cpupi_details');

                      $result  = $this->db->query("INSERT INTO payment_inward_outward(module_name, type_of_payment, amount, party_bank, cheque_ref_no, company_bank, remarks, bill_no, party_id, payment_side, metal_type, quality, purity, weight, pure_metal_weight,  created_by, created_on, record_status) VALUES('New Redemption - Customer Sale','RTGS','".$upi_amt."','".$upi_party_bank."','".$upi_ref_no."','".$upi_comp_bank."','".$upi_details."','".$billno."','".$loan_details->PID."','DR','','','','0.00','0.00','".$_SESSION['username']."','".date('Y-m-d H:i:s')."','0')");
                        save_query_in_log();
                  }

                  $nbill=$this->db->query("select top 1 NEWBILLNO from REDEMPTIONS where CLOSING_TYPE = 'CUSTOMER_SALE' and NEWBILLNO like 'DSJ%' order by RETURNDATE desc ")->row();
                  $last_no=$nbill->NEWBILLNO;
                  
                  $seg1=explode('/', $last_no);
                  if($seg1[1] == date('y'))
                  {
                      $seg2=explode('-', $seg1[0]);
                      $spl_cnt =count((array)$seg2);
                      if($spl_cnt == 2)
                      {
                          $val=$seg2[1]+1;  
                      }
                      else if($spl_cnt == 3)
                      {
                          $val=$seg2[2]+1;  
                      }
                      if($spl_cnt == 4)
                      {
                          $val=$seg2[3]+1;  
                      }
                      $new_bill_no="DSJ-".$val."/".date('y');
                  }
                  else
                  {
                      $new_bill_no="DSJ-01/".date('y');
                  }
                  // echo $seg1[0];
                  
                  $lblBalance=$txtNetPay;

                  
                //for Form miss charge - file upload 
                  if(!empty($_FILES['cust_sale_form_miss_doc']['name']))
                  {   
                      $bill_name=implode('-',(explode('/',$billno)));
                      // echo $bill_name; exit();
                      $ext = pathinfo($_FILES['cust_sale_form_miss_doc']['name'], PATHINFO_EXTENSION);
                      $config['upload_path'] = 'assets/images/redemption_form_miss_doc';
                      $config['allowed_types'] = 'jpg|jpeg|png|doc|docx|pdf';
                      $config['file_name'] = 'FMC-'.$bill_name;
                      $profileName = $config['file_name'].'.'.$ext;
                      // echo $profileName; exit();
                      // $this->upload->initialize($config);
                      $this->load->library('upload',$config);
                      
                      if($this->upload->do_upload('cust_sale_form_miss_doc'))
                      {
                        $uploadData = $this->upload->data();
                        $data['cust_sale_form_miss_doc'] = $profileName;
                      }
                      else
                      {
                        $data['cust_sale_form_miss_doc'] = '';
                      }
                  }
                  else
                  {
                      $data['cust_sale_form_miss_doc'] = '';
                  }

                  $res = $this->db->query("INSERT INTO REDEMPTIONS(CLOSED_BY, CLOSED_NAME, CHK_RECEIVED, CHK_RETURNED, BILLNO, RETURNDATE, INTEREST, PAIDINTEREST, PRINCIPAL, PAIDPRINCIPAL, TOTALPAY, MAINTAINCHARGE, FORMCHARGE, NOTICECHARGE, HL_AMOUNT, DISCOUNT, NETPAYABLE, PAIDAMOUNT, BALANCE, CLOSING_TYPE, ADDED_USER, ADDED_TIME, CHK_VERIFIED, PID,NAME,TYPE_OF_RECORD, PURCHASE_AMOUNT, PUR_BALANCE, NEWLOANAMOUNT, NEWBILLNO,SNO, WITNESS_NAME, WITNESS_RELATION, WITNESS_Mobile, WITNESS_REMARKS,FORM_DOC_PATH) VALUES ('".$vClosedBy . "','" . $vClosedName . "','" .$vCheckReceived ."','" . $vCheckReturned . "','" . $billno . "','" .date('Y-m-d') . "',".$loan_int. "," .$paid_int. "," .$loan_prin. "," .$paid_prin. ", " .$txtTotal.",". $maint_chg. ", " .$form_chg . ", " . $notice_chg . "," . $on_acc_chg . "," . $disc_chg . ", " . $txtNetPay. "," . $txtPaidAmount . ",'" . $lblBalance . "','" . $vClosingStatus . "','" . $_SESSION['username']. "','" . date('Y-m-d H:i:s') . "','N','".$loan_details->PID."','".$loan_details->NAME."','N','".$pur_amount."','".$rem_amount."','".$pur_amount."','".$new_bill_no."','".$sno."','".$w_name."','".$w_relation."','".$w_mobile."','".$w_remarks."','".$data['cust_sale_form_miss_doc']."')");
                  save_query_in_log();
                 $loan_update=$this->db->query("UPDATE LOANS SET CLOSEDATE='" . date('Y-m-d') . "',ACTIVE='N',CLOSING_STATUS='" .$vClosingStatus. "',REN_TO_BILLNO='".$new_bill_no."', LOAN_STATUS=11 WHERE BILLNO='" .$billno. "'");
                 save_query_in_log();
          }
          else if($cls_type=='redp_mul_jl_radio_val')
          {
                $vClosingStatus = "MULTI_JEWEL";
                $closed_by=$this->input->post('mul_jewel_closed_by');
                
                  if($closed_by=='party')
                  {
                      $vClosedBy='CUSTOMER';
                      $vClosedName=$loan_details->NAME;
                  }
                  else if($closed_by=='nominee')
                  {
                      $vClosedBy='NOMINEE';
                      $vClosedName=$loan_details->NOMINEE;
                  }
                  else if($closed_by=='others')
                  {
                      $vClosedBy='OTHERS';
                      $vClosedName=$this->input->post('mul_jwl_others');
                  }

                  $maint_chg=$this->input->post("mul_jwl_pap_act_chg");
                  $notice_chg=$this->input->post("mul_jwl_not_chg");
                  $form_chg=$this->input->post("mul_jwl_frm_miss_chg");
                  $on_acc_chg=$this->input->post("mul_jwl_on_acc_chg");
                  $disc_chg=$this->input->post("mul_jwl_disc_chg");
                  
                  //for Form miss charge - file upload 
                  if(!empty($_FILES['mul_jwl_form_miss_doc']['name']))
                  {   
                      $bill_name=implode('-',(explode('/',$billno)));
                      // echo $bill_name; exit();
                      $ext = pathinfo($_FILES['mul_jwl_form_miss_doc']['name'], PATHINFO_EXTENSION);
                      $config['upload_path'] = 'assets/images/redemption_form_miss_doc';
                      $config['allowed_types'] = 'jpg|jpeg|png|doc|docx|pdf';
                      $config['file_name'] = 'FMC-'.$bill_name;
                      $profileName = $config['file_name'].'.'.$ext;
                      // echo $profileName; exit();
                      // $this->upload->initialize($config);
                      $this->load->library('upload',$config);
                      
                      if($this->upload->do_upload('mul_jwl_form_miss_doc'))
                      {
                        $uploadData = $this->upload->data();
                        $data['mul_jwl_form_miss_doc'] = $profileName;
                      }
                      else
                      {
                        $data['mul_jwl_form_miss_doc'] = '';
                      }
                  }
                  else
                  {
                      $data['mul_jwl_form_miss_doc'] = '';
                  }

                  $res = $this->db->query("INSERT INTO REDEMPTIONS(CLOSED_BY, CLOSED_NAME, CHK_RECEIVED, CHK_RETURNED, BILLNO, RETURNDATE, INTEREST, PAIDINTEREST, PRINCIPAL, PAIDPRINCIPAL, TOTALPAY, MAINTAINCHARGE, FORMCHARGE, NOTICECHARGE, HL_AMOUNT, DISCOUNT, NETPAYABLE, PAIDAMOUNT, BALANCE, CLOSING_TYPE, ADDED_USER, ADDED_TIME, CHK_VERIFIED, PID, NAME,TYPE_OF_RECORD, PURCHASE_AMOUNT, PUR_BALANCE, NEWLOANAMOUNT, NEWBILLNO, SNO, FORM_DOC_PATH) VALUES ('".$vClosedBy . "','" . $vClosedName . "','" .$vCheckReceived ."','" . $vCheckReturned . "','" . $billno . "','" .date('Y-m-d') . "',".$loan_int. "," .$paid_int. "," .$loan_prin. "," .$paid_prin. ", " .$txtTotal.",". $maint_chg. ", " .$form_chg . ", " . $notice_chg . "," . $on_acc_chg . "," . $disc_chg . ", " . $txtNetPay. "," . $txtPaidAmount . ",'" . $lblBalance . "','" . $vClosingStatus . "','" . $_SESSION['username']. "','" . date('Y-m-d H:i:s') . "','N','".$loan_details->PID."','".$loan_details->NAME."','N','0','0','0','','".$sno."','".$data['mul_jwl_form_miss_doc']."')");
                  save_query_in_log();
                $loan_update=$this->db->query("UPDATE LOANS SET CLOSEDATE='" . date('Y-m-d') . "', ACTIVE='N', CLOSING_STATUS='" .$vClosingStatus. "', LOAN_STATUS=16 WHERE BILLNO='" .$billno. "'");
                save_query_in_log();

                  //New loan with new pledge
                  $pid=$data['pid']=$this->input->post("r_pid");
                  $name_det=$this->db->query("select * from PARTIES WHERE PID='".$pid."'")->row();
                  $data['p_fname']=$name_det->NAME;
                  $ln_date=$this->input->post("r_date");
                  $old_billno=$this->input->post("redemp_bill_no");

                  $jewel_type=$data['jewel_type']=$this->input->post("mul_jwl_jewel_type");
                 $scheme=$this->input->post("mul_jwl_new_ln_scheme");
                 $int_type=$this->input->post("mul_jwl_new_ln_int_type");
                 $new_loan_amt=$this->input->post("mul_jwl_new_ln_loan_amount");
                 $new_redemp_period=$this->input->post("mul_jwl_new_ln_redemption_period");
                 $new_pro_chg=$this->input->post("mul_jwl_new_ln_process_chg");
                 $new_doc_chg=$this->input->post("mul_jwl_new_ln_doc_chg_hidden");
                 $new_remarks=$this->input->post("mul_jwl_new_ln_topay_remarks");


                  $int_list=$this->db->query("select * from INTERESTLIST where INTID='".$int_type."'")->row();
                  $data['months']= round($int_list->PERIOD);
                  $data['interest_type']=$int_list->INTNAME;
                  $data['interest']=$int_list->INTEREST;

                    $tx =$int_list->INTNAME ;
                    $it = explode('-', $tx);
                    $int_tx = $it[0];
                    $int_tx = trim($int_tx);
                    $int_tx_len = strlen($int_tx);

                    $int_txt_lst = $this->Loan_model->loan_get_int_type_id_by_billno($int_tx,$int_tx_len);
                    $d = date("y");
                    if ($int_txt_lst == "") 
                    {
                      $data['billno']= $int_tx."-0001/".$d;
                    }
                    else
                    {
                        $last= $int_txt_lst->BILLNO;
                        $pattern = "/[-\/]/";
                        $components = preg_split($pattern, $last);
                        // echo $components[count($components)-2];
                        $ls1 = $components[count($components)-2];

                        if (strlen($ls1)=="2") 
                        {
                          $next_value = (int)$ls1 + 1;
                          $uid=str_pad($next_value,2,0,STR_PAD_LEFT);

                          $data['billno']= $int_tx."-".$uid."/".$d;
                        }
                        elseif (strlen($ls1)=="3") 
                        {
                          if ($int_tx == "F") 
                            { 
                              // $tx = $_POST['txt'];
                              // $pattern = "/[-]/";
                              // $components = preg_split($pattern, $tx);
                              // $int_t = $components[0]."-NTP";

                              $next_value = (int)$ls1 + 1;
                              $uid=str_pad($next_value,3,0,STR_PAD_LEFT);
                              $data['billno']= $int_tx."-NTP-".$uid."/".$d;
                            }
                          else
                            {
                              $next_value = (int)$ls1 + 1;
                              $uid=str_pad($next_value,3,0,STR_PAD_LEFT);
                              $data['billno']= $int_tx."-".$uid."/".$d;

                            }
                          
                        }
                        else
                        {
                          $next_value = (int)$ls1 + 1;
                          $uid=str_pad($next_value,4,0,STR_PAD_LEFT);

                          $data['billno']= $int_tx."-".$uid."/".$d;
                        }
                  
                  }
                  $data['company'] = $this->input->post('r_company_select');
                  $data['attended_user'] = $_SESSION['username'];
                  $data['added_user'] = $_SESSION['username'];
                  $data['added_time'] = date('Y-m-d H:i:s');
                  $data['loandate']=date('Y-m-d');


                  if(($loan_details->NOMINEE_ID!='') && (!is_null($loan_details->NOMINEE_ID)))
                  {
                      $nomi_det=$this->db->query("select * from NOMINEE where NOMINEE_ID=".$loan_details->NOMINEE_ID." and PID='".$data['pid']."'")->row();
                      if(isset($nomi_det))
                      {
                          $data['nominee']=$nomi_det->NOMINEE_NAME;
                          $data['relation']=$nomi_det->RELATION;
                          $data['nid']=$loan_details->NOMINEE_ID;
                      }
                      else
                      {
                        $data['nid']='0';
                        $data['nominee']='';
                        $data['relation']='';
                      }

                  }
                  else
                  {
                    $data['nid']='0';
                    $data['nominee']='';
                    $data['relation']='';
                  }

                  $data['item_photo']=$this->input->post('loan_jewel_image_data');
                  if($new_doc_chg=='') $new_doc_chg=0;
                  $redemp_update=$this->db->query("UPDATE REDEMPTIONS SET NEWBILLNO='".$data['billno']."', NEWLOANAMOUNT='".$new_loan_amt."' WHERE BILLNO='" .$billno. "'");
                  save_query_in_log();
                  $old_loan_upd=$this->db->query("UPDATE LOANS SET REN_TO_BILLNO='".$data['billno']."' where BILLNO='".$billno."'");
                  save_query_in_log();
                  $cur_rate=$this->db->query("select * from general_settings")->row();

                 $result  = $this->db->query("INSERT INTO LOANS(PID, NAME, BILLNO, LOAN_TYPE, ENDATE, JEWEL_TYPE, MONTHS, INTERESTTYPE, INTEREST, AMOUNT, BALANCE, CURRENTRATE, QUALITY, PERGRAMVALUE, TOTALSALESRATE, NOMINEE, RELATION, ACTIVE, STATUS, DCAMOUNT, PROCESSING_CHARGE, COMPANYCODE, ATTENDED_USER, ADDED_USER, ADDED_TIME, LOAN_STATUS, NOMINEE_ID, TYPE_OF_RECORD, CHK_VERIFIED, REDEMPTION_PERIOD, NET_PAY, ITEM_PHOTO, REN_FROM_BILLNO) VALUES ('".$data['pid']."','".$data['p_fname']."','".$data['billno']."','NEW','".$data['loandate']."','".$data['jewel_type']."','".$data['months']."','".$data['interest_type']."','".$data['interest']."','".$new_loan_amt."','".$new_loan_amt."','".$cur_rate->gold_rate."','0.00','0.00','0.00','".$data['nominee']."','".$data['relation']."','Y','','".$new_doc_chg."','".$new_pro_chg."','".$data['company']."','".$data['attended_user']."','".$data['added_user']."','".$data['added_time']."','1','".$data['nid']."','N','N','".$new_redemp_period."','".$new_loan_amt."','".$data['item_photo']."','".$billno."')");
                save_query_in_log();
                $redemp_update=$this->db->query("UPDATE REDEMPTIONS SET NEWBILLNO='".$data['billno']."', NEWLOANAMOUNT='".$new_loan_amt."' WHERE BILLNO='" .$billno. "'");
                save_query_in_log();

                  $pledge_item = explode(",",implode(",",$this->input->post('pledge_item_hidden')));
                  $pl_rec_status = explode(",",implode(",",$this->input->post('rec_status')));
                  $pledge_description = explode(",",implode(",",$this->input->post('pledge_description_hidden')));
                  $pledge_purity = explode(",",implode(",",$this->input->post('pledge_purity_hidden')));
                  $pledge_purity_percent = explode(",",implode(",",$this->input->post('pledge_purity_percent_hidden')));
                  $pledge_weight = explode(",",implode(",",$this->input->post('pledge_weight_hidden')));
                  $pledge_stone_weight = explode(",",implode(",",$this->input->post('pledge_stone_weight_hidden')));
                  $pledge_less = explode(",",implode(",",$this->input->post('pledge_less_hidden')));
                  $pledge_net_weight = explode(",",implode(",",$this->input->post('pledge_net_weight_hidden')));
                  $pledge_is_damage = explode(",",implode(",",$this->input->post('pledge_is_damage_hidden')));
                  $old_ln_pl_val = explode(",",implode(",",$this->input->post('old_ln_pl_val')));
                  $new_ln_pl_val = explode(",",implode(",",$this->input->post('new_ln_pl_val')));
                  $pledge_image=$this->input->post('pledge_image_hidden');
                  // $pledge_image = explode(",",implode(",",$this->input->post('pledge_image_hidden')));
                  $subcount = count($this->input->post('pledge_item_hidden'));

                  print_r($pledge_net_weight);
                  // print_r($pledge_stone_weight);

                  $weight=$stone_weight=$less=$net_weight=0;
                  $pledge_info=$pledge_summary='';
                  for($i=0;$i<$subcount;$i++)
                  {
                    
                    if($pl_rec_status[$i]=='R')
                    {
                        // echo "pl_rec_status[$i] = ".$pl_rec_status[$i];
                    } 
                    else
                    {
                      // print_r($i);


                        if($i==0)
                        {
                          $pledge_info = $pledge_item[$i].'('.$pledge_description[$i].')';
                          $pledge_summary = $pledge_purity[$i].'('.$pledge_weight[$i].')';
                        }
                        else
                        {
                          $pledge_info.= ', '.$pledge_item[$i].'('.$pledge_description[$i].')';
                          $pledge_summary.= ', '.$pledge_purity[$i].'('.$pledge_weight[$i].')';
                        }
                        // echo  $weight."   ".$stone_weight."   ".$less."   ".$net_weight."<br>";
                        $weight+=$pledge_weight[$i];
                        $stone_weight+=$pledge_stone_weight[$i];
                        $less+=$pledge_less[$i];
                        $net_weight+=$pledge_net_weight[$i];
                    }

                    
                    // echo  $weight."   ".$stone_weight."   ".$less."   ".$net_weight."<br><br>";

                  }
                  // exit();


                  $data['pledge_info'] = $pledge_info;
                  $data['pledge_summary'] = $pledge_summary;
                  $data['add_weight_new_loan'] = $weight;
                  $data['add_stless_new_loan'] = $stone_weight;
                  $data['add_less_new_loan'] = $less;
                  $data['add_ntweight_new_loan'] = $net_weight;

                $old_data=$this->db->query("select * from LOANS where BILLNO='".$billno."'")->row();
                save_query_in_log();

                $totsalerate=$net_weight*$cur_rate->gold_rate*($old_data->QUALITY/100);
                $pergmval=$totsalerate/$net_weight;

                  $res=$this->db->query("UPDATE LOANS SET PLEDGEINFO='".$data['pledge_info']."', PLEDGE_SUMMARY='".$data['pledge_summary']."',WEIGHT='".$data['add_weight_new_loan']."', STONELESS='".$data['add_stless_new_loan']."',LESS='".$data['add_less_new_loan']."',NETWEIGHT='".$data['add_ntweight_new_loan']."', QUALITY='".$old_data->QUALITY."', PERGRAMVALUE='".$pergmval."', TOTALSALESRATE='".$totsalerate."' where BILLNO='".$data['billno']."'");
                  $pledge_max_record = $this->Loan_model->get_pledge_max_record_by_bill_no($data['billno']);

                  if(!is_null($pledge_max_record->max_pledge_no))
                  {
                    $vMaxPNo = substr($pledge_max_record->max_pledge_no, (strlen($pledge_max_record->max_pledge_no)-1));
                  }
                  else
                  {
                    $vMaxPNo = 0;
                  }

                  $j=1;
                  for($i=0;$i<$subcount;$i++)
                  {
                      if($pl_rec_status[$i]!='R')
                      {
                          if($pledge_item[$i]!='' )
                          {
                              $pledgedata['pno'] = 'P'.($vMaxPNo+$j);
                              $pledgedata['billno'] = $data['billno'];
                              $pledgedata['pledge_item'] = $pledge_item[$i];
                              $pledgedata['pledge_description'] = $pledge_description[$i];
                              $pledgedata['pledge_purity'] = $pledge_purity[$i];
                              $pledgedata['pledge_purity_percent'] = $pledge_purity_percent[$i];
                              // $pledgedata['pledge_quantity'] = $pledge_quantity[$i];
                              $pledgedata['pledge_weight'] = $pledge_weight[$i];
                              $pledgedata['pledge_stone_weight'] = $pledge_stone_weight[$i];
                              $pledgedata['pledge_less'] = $pledge_less[$i];
                              $pledgedata['pledge_net_weight'] = $pledge_net_weight[$i];
                              if($pledge_is_damage[$i]=='Yes') {$pledgedata['pledge_is_damage'] = 'Y';}
                              else if($pledge_is_damage[$i]=='No'){ $pledgedata['pledge_is_damage'] = 'N';}
                              $pledgedata['rec_type'] = 'N';
                              $this->Loan_model->insert_pledge_info($pledgedata);
                          }
                      }
                  }

                  

          }
          else if($cls_type=='redp_cmy_c_radio_val')
          {
                $vClosingStatus = "COMPANY_CLOSE";
                $vClosedBy='';
                $vClosedName='';

                 $nbill=$this->db->query("select top 1 NEWBILLNO from REDEMPTIONS where CLOSING_TYPE = 'COMPANY_CLOSE' and NEWBILLNO like 'CCL%' order by RETURNDATE desc ")->row();
                 if(isset($nbill->NEWBILLNO))
                 {
                    $last_no=$nbill->NEWBILLNO;
                    
                    $seg1=explode('/', $last_no);
                    if($seg1[1] == date('y'))
                    {
                        $seg2=explode('-', $seg1[0]);
                        $spl_cnt =count((array)$seg2);
                        if($spl_cnt == 2)
                        {
                            $val=$seg2[1]+1;  
                        }
                        else if($spl_cnt == 3)
                        {
                            $val=$seg2[2]+1;  
                        }
                        if($spl_cnt == 4)
                        {
                            $val=$seg2[3]+1;  
                        }
                        $new_bill_no="CCL-".$val."/".date('y');
                    }
                    else
                    {
                        $new_bill_no="CCL-01/".date('y');
                    }
                  }
                  else
                  {
                    $new_bill_no="CCL-01/".date('y');
                  }
                $res=$this->db->query("INSERT INTO REDEMPTIONS(CHK_RECEIVED, CHK_RETURNED,  BILLNO, RETURNDATE, INTEREST, PAIDINTEREST, PRINCIPAL, PAIDPRINCIPAL, TOTALPAY, MAINTAINCHARGE, FORMCHARGE, NOTICECHARGE, HL_AMOUNT, DISCOUNT, CLOSING_TYPE, ADDED_USER, ADDED_TIME, CHK_VERIFIED, NETPAYABLE, PAIDAMOUNT, PID, NAME, TYPE_OF_RECORD, NEWBILLNO, SNO) VALUES ('".$vCheckReceived."','".$vCheckReturned."','".$billno."','".date('Y-m-d')."',".$loan_int.",".$paid_int.",".$loan_prin.",".$paid_prin.",".$txtTotal.",0,0,0,0,0,'".$vClosingStatus."','".$_SESSION['username']."','".date('Y-m-d')."','Y','".$txtTotal."','".$txtTotal."','".$loan_details->PID."','".$loan_details->NAME."','Y','".$new_bill_no."','".$sno."')");
                save_query_in_log();
                $loan_update=$this->db->query("UPDATE LOANS SET CLOSEDATE='" . date('Y-m-d') . "',ACTIVE='N',CLOSING_STATUS='" .$vClosingStatus. "',LOAN_STATUS=9 WHERE BILLNO='" .$billno. "'");
                save_query_in_log();
          }
          // $result = $this->Item_model->add_item($data);
        if($res)
        {
            $this->session->set_flashdata('g_success', 'Redemption have been Completed successfully...');
        }else{
           $this->session->set_flashdata('g_err', 'Could not Close the Loan!');
        }
        redirect('redemption');

      }

      public function pay_to_party()
     {
          $data['module_name']=$this->input->post('module_name');
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

          $res=$this->Redemption_model->insert_pay_to_party($data);
          if($res)
          {
            echo 1;
          }
          else
          {
            echo 0;
          }
      
     }
     public function party_payment()
     {
          $data['module_name']="New Redemption - Customer Transfer";
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

          $res=$this->Redemption_model->insert_party_payment($data);
          if($res)
          {
            echo 1;
          }
          else
          {
            echo 0;
          }
      
     }
     public function redeem_pledge()
     {
        $red_actl_val=$this->input->post('redeem_actl_val');
        $calc_val=$this->input->post('redeem_calc_val');
        $pl_id=$this->input->post('pl_id');
        $bill_no=$this->input->post('bill_no');

        $res=$this->db->query("UPDATE PLEDGEINFO SET IS_REDEEM='Y',PL_ACTL_RED_PAID=".$red_actl_val.", PL_CALC_RED_VAL=".$calc_val." where PLEDGE_ID='".$pl_id."' and BILLNO='".$bill_no."'");
        if($res)
        {
          echo '1';
        }
        else
        {
          echo "0";
        }

     }
     public function load_pledge_info_net_pay()
   {
      $bill_no=$this->input->post('bill_no');
      $net_pay=$this->input->post('np');
      $row=$this->db->query("select * from LOANS WHERE BILLNO='".$bill_no."'")->row();
      $pledge_info=$this->db->query("select * from PLEDGEINFO  WHERE BILLNO='".$bill_no."'")->result_array();
        $data['pl_count']=$pl_count=count((array)$pledge_info);
        $pl_tbody="";
        $per_grm_val=$net_pay/$row->NETWEIGHT;
        $pl_less=($row->LESS+$row->STONELESS)/$pl_count;
        $per_pl_less=$row->LESS/$pl_count;
        $per_pl_stone_less=$row->STONELESS/$pl_count;
        $i=0;
        foreach ($pledge_info as $plist) 
        {
            if(isset($plist['IS_DAMAGE']))
            {
                $is_damage=($plist['IS_DAMAGE']=='Y')?'Yes':'No';
            }
            else
            {
              $is_damage='No';
            }
            $pl_val=($plist['WEIGHT'] - $pl_less)*$per_grm_val;

            if($plist['TYPE_OF_RECORD']=='O')
            {
              $pur_res=$this->db->query("select * from ITEMPURITY where ITEMPURITYNAME='".$plist['PURITY']."'")->row();
              print_r($pur_res);exit;
             $pl_tbody .= "<tr id='tr_id".$i."'><td id='td_id_1".$i."'>".$plist['PLEDGENAME']."<input type='hidden' id='pledge_item_hidden".$i."' name='pledge_item_hidden[]' value='".$plist['PLEDGENAME']."'><input type='hidden' name='old_pl_id[]' id='old_pl_id".$i."' value=".$plist['PLEDGE_ID']."><input type='hidden' name='rec_status[]' id='rec_status".$i."' value='O'></td><td id='td_id_2".$i."' class='ple1'>".$plist['DESCRIPTION']."<input type='hidden' id='pledge_description_hidden".$i."' name='pledge_description_hidden[]' value='".$plist['DESCRIPTION']."'></td><td id='td_id_3".$i."'>".$plist['PURITY']."<input type='hidden' id='pledge_purity_hidden".$i."' name='pledge_purity_hidden[]' value='".$plist['PURITY']."'></td><td id='td_id_4".$i."'>".$pur_res->PERCENTAGE."<input type='hidden' id='pledge_purity_percent_hidden".$i."' name='pledge_purity_percent_hidden[]' value='".$pur_res->PERCENTAGE."'></td><td id='td_id_5".$i."'>".$plist['WEIGHT']."<input type='hidden' id='pledge_weight_hidden".$i."' name='pledge_weight_hidden[]' value='".$plist['WEIGHT']."'></td><td id='td_id_6".$i."'>".round($per_pl_stone_less,3)."<input type='hidden' id='pledge_stone_weight_hidden".$i."' name='pledge_stone_weight_hidden[]' value='".round($per_pl_stone_less,3)."'></td><td id='td_id_7".$i."'>".round($per_pl_less,3)."<input type='hidden' id='pledge_less_hidden".$i."' name='pledge_less_hidden[]' value='".round($per_pl_less,3)."'></td><td id='td_id_8".$i."'>".round(($plist['WEIGHT']-$pl_less),3)."<input type='hidden' id='pledge_net_weight_hidden".$i."' name='pledge_net_weight_hidden[]' value='".round(($plist['WEIGHT']-$pl_less),3)."'></td><td id='td_id_9".$i."'>".$is_damage."<input type='hidden' id='pledge_is_damage_hidden".$i."' name='pledge_is_damage_hidden[]' value='".$is_damage."'></td><td id='td_id_10".$i."'><div class='image-input mt-2 me-6' data-kt-image-input='true'><div class='image-input-wrapper w-40px h-40px' style='background-image: url(assets/images/jewel.jpg)'></div></div></td><td id='td_id_11".$i."'><input type='hidden' class='form-control form-control-lg form-control-solid fs-7' name='old_ln_pl_val[]' id='old_ln_pl_val".$i."' value='".number_format($pl_val, 2, '.', '')."'><input type='text' class='form-control form-control-lg form-control-solid fs-7' name='new_ln_pl_val[]' id='new_ln_pl_val".$i."' onkeyup='calc_val_adjustment(".$i.")' value='".number_format($pl_val, 2, '.', '')."'></td><td id='td_id_12".$i."' ><a href='javascript:;' class='btn btn-icon btn-bg-light btn-active-color-primary btn-sm' title='Redeem' onclick='redeem(".$i.")'> <i class='fas fa-hand-holding fs-2' title='Redeem' style='color:black;'></i> </a></td></tr>";
             }
             else
             {
                $pl_tbody .= "<tr id='tr_id".$i."'><td id='td_id_1".$i."'>".$plist['PLEDGENAME']."<input type='hidden' id='pledge_item_hidden".$i."' name='pledge_item_hidden[]' value='".$plist['PLEDGENAME']."'><input type='hidden' name='old_pl_id[]' id='old_pl_id".$i."' value=".$plist['PLEDGE_ID']."><input type='hidden' name='rec_status[]' id='rec_status".$i."' value='N'></td><td id='td_id_2".$i."' class='ple1'>".$plist['DESCRIPTION']."<input type='hidden' id='pledge_description_hidden".$i."' name='pledge_description_hidden[]' value='".$plist['DESCRIPTION']."'></td><td id='td_id_3".$i."'>".$plist['PURITY']."<input type='hidden' id='pledge_purity_hidden".$i."' name='pledge_purity_hidden[]' value='".$plist['PURITY']."'></td><td id='td_id_4".$i."'>".$plist['PURITY_PERCENT']."<input type='hidden' id='pledge_purity_percent_hidden".$i."' name='pledge_purity_percent_hidden[]' value='".$plist['PURITY_PERCENT']."'></td><td id='td_id_5".$i."'>".$plist['WEIGHT']."<input type='hidden' id='pledge_weight_hidden".$i."' name='pledge_weight_hidden[]' value='".$plist['WEIGHT']."'></td><td id='td_id_6".$i."'>".$plist['STONEWEIGHT']."<input type='hidden' id='pledge_stone_weight_hidden".$i."' name='pledge_stone_weight_hidden[]' value='".$plist['STONEWEIGHT']."'></td><td id='td_id_7".$i."'>".$plist['LESS']."<input type='hidden' id='pledge_less_hidden".$i."' name='pledge_less_hidden[]' value='".$plist['LESS']."'></td><td id='td_id_8".$i."'>".$plist['NETWEIGHT']."<input type='hidden' id='pledge_net_weight_hidden".$i."' name='pledge_net_weight_hidden[]' value='".$plist['NETWEIGHT']."'></td><td id='td_id_9".$i."'>".$is_damage."<input type='hidden' id='pledge_is_damage_hidden".$i."' name='pledge_is_damage_hidden[]' value='".$is_damage."'></td><td id='td_id_10".$i."'><div class='image-input mt-2 me-6' data-kt-image-input='true'><div class='image-input-wrapper w-40px h-40px' style='background-image: url(assets/images/jewel.jpg)'></div></div></td><td id='td_id_11".$i."'><input type='hidden' class='form-control form-control-lg form-control-solid fs-7' name='old_ln_pl_val[]' id='old_ln_pl_val".$i."' value='".number_format($pl_val, 2, '.', '')."'><input type='text' class='form-control form-control-lg form-control-solid fs-7' name='new_ln_pl_val[]' id='new_ln_pl_val".$i."' onkeyup='calc_val_adjustment(".$i.")' value='".number_format($pl_val, 2, '.', '')."'></td><td id='td_id_12".$i."'><a href='javascript:;' class='btn btn-icon btn-bg-light btn-active-color-primary btn-sm' title='Redeem' onclick='redeem(".$i.")'> <i class='fas fa-hand-holding fs-2' title='Redeem' style='color:black;'></i> </a></td></tr>";
             }
           $i++;
        }

        $pl_tbody.="<input type='hidden' value='".$i."' name='mj_pl_item_count' id='mj_pl_item_count'>";
         
        $pl_tfoot = "<th class='min-w-150px'></th> <th class='min-w-100px'></th><th class='min-w-80px'></th><th class='min-w-80px'>Total</th><th class='min-w-80px'>".$row->WEIGHT."</th><th class='min-w-100px'>".$row->STONELESS."</th><th class='min-w-80px'>".$row->LESS."</th><th class='min-w-80px'>".$row->NETWEIGHT."</th><th class='min-w-50px'></th><th class='min-w-50px'></th>";

        echo '||'.$pl_tbody."||".$pl_tfoot;
   }

   public function get_int_type_list()
    {
      $val=$this->input->post('group_name');
      $interest_list = $this->Loan_model->get_interest_list($val);
        $option="<option value=''>Select Int. Type</option>";
        foreach ($interest_list as $nlist) {
          $option.='<option value="'.$nlist['INTID'].'">'.$nlist['INTEREST'].'</option>';
        }

      echo $option;
    }
    public  function get_expiry_dt()
    {
        $int_type=$this->input->post('itype');
        $int_grp=$this->input->post('grp');
        $ln_dt=date_format(date_create($this->input->post('loan_dt')),'Y-m-d');

       $result  = $this->db->query("SELECT * from INTERESTLIST where INT_GROUP='".$int_grp."' AND ACTIVE='Y' AND INTID='".$int_type."'")->row();
        if($result->LP_TYPE=='Days')
        { 
          $ex_dt=date('d-m-Y', strtotime($ln_dt. ' +'.round($result->PERIOD).' days'));
        }
        if($result->LP_TYPE=='Months')
        {
          $ex_dt=date('d-m-Y', strtotime($ln_dt. ' +'.round($result->PERIOD).' months'));
        }
        echo '||'.$ex_dt;
    }
    public function redeem_mem_points()
      {
            $pid=$this->input->post('pid'); 
            $points=$this->input->post('points');
            $process="New Loan - Deduction";
            $m_points_ad=-($points);
            $cardno=$this->input->post('mem_card');
            $billno=$this->input->post('bill_no'); 

            $mem_card_point_upd=$this->db->query("UPDATE MEMBERSHIP_CARD SET POINTS=POINTS-".$points." WHERE PID='".$pid."' ");
            $party_mem_point_upd=$this->db->query("UPDATE PARTIES SET MEMBERSHIP_POINTS=MEMBERSHIP_POINTS-".$points." WHERE PID='".$pid."'");
            
            add_member_card_history($cardno,$pid,$process,$m_points_ad,$billno);
      }
       public function receive_from_party()
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
        $res=$this->Redemption_model->insert_receive_from_party($data);
        if($res)
        {
          echo 1;
        }
        else
        {
          echo 0;
        }
    
   }
   public function print_1_legal($billno)
   {

      // $bill_no=$this->input->post('bill_no');
      $bill_no=str_replace('_', '/', $billno);
      $loan_details=$this->db->query("select * from LOANS where BILLNO='".$bill_no."'")->row();
      $pledge_info=$this->db->query("select PLEDGENAME from PLEDGEINFO  WHERE BILLNO='".$bill_no."'")->result_array();
      $party_details=$this->db->query("select * from PARTIES  WHERE PID='".$loan_details->PID."'")->row();
      $company_details=$this->db->query("select * from COMPANY  WHERE COMPANYCODE='".$loan_details->COMPANYCODE."'")->row();
      $from=$party_details->NAME."<br>".$party_details->LASTNAME_PREFIX.", ".$party_details->FATHERSNAME."<br>";
      $from.=$party_details->ADDRESS1.", ".$party_details->ADDRESS2."<br>".$party_details->CITY;

      $data['from']=$from;
//       சி.ஜீவா,
// S/o, செ.சிவராம்,
// விநாயகர் கோவில் தெரு,
// சாயல்குடி,
// ராமநாதபுரம் மாவட்டம் - 623120
      $data['to']=$company_details->COMPANYNAME2."<br>".$company_details->ADDRESSLINE;


      $i=0;
      foreach($pledge_info as $plist)
      { 
          if($i==0)
          {
              $data['pledge_name']=$plist['PLEDGENAME'];
          }
          else
          {
            $data['pledge_name']=$data['pledge_name'].", ".$plist['PLEDGENAME']; 
          }
          $i++;

      }
      $data['party_name']=$loan_details->NAME;
      $data['loan_no']=$loan_details->BILLNO;
      $data['loan_amt']= $loan_details->AMOUNT;
      $data['loan_date']=date_format(date_create($loan_details->ENDATE),'d-m-Y');

      // print_r($data);
      // exit();
      $this->load->view('redemption/form_missing_legal',$data);


   }
   public function print_2_legal($billno)
   {

      // $bill_no=$this->input->post('bill_no');
      $bill_no=str_replace('_', '/', $billno);
      $loan_details=$this->db->query("select * from LOANS where BILLNO='".$bill_no."'")->row();
      $pledge_info=$this->db->query("select PLEDGENAME from PLEDGEINFO  WHERE BILLNO='".$bill_no."'")->result_array();
      $party_details=$this->db->query("select * from PARTIES  WHERE PID='".$loan_details->PID."'")->row();
      $company_details=$this->db->query("select * from COMPANY  WHERE COMPANYCODE='".$loan_details->COMPANYCODE."'")->row();
      $from=$party_details->NAME."<br>".$party_details->LASTNAME_PREFIX.", ".$party_details->FATHERSNAME."<br>";
      $from.=$party_details->ADDRESS1.", ".$party_details->ADDRESS2."<br>".$party_details->CITY;

      $data['from']=$from;
//       சி.ஜீவா,
// S/o, செ.சிவராம்,
// விநாயகர் கோவில் தெரு,
// சாயல்குடி,
// ராமநாதபுரம் மாவட்டம் - 623120
      $data['to']=$company_details->COMPANYNAME2."<br>".$company_details->ADDRESSLINE;


      $i=0;
      foreach($pledge_info as $plist)
      { 
          if($i==0)
          {
              $data['pledge_name']=$plist['PLEDGENAME'];
          }
          else
          {
            $data['pledge_name']=$data['pledge_name'].", ".$plist['PLEDGENAME']; 
          }
          $i++;

      }
      $data['party_name']=$loan_details->NAME;
      $data['loan_no']=$loan_details->BILLNO;
      $data['loan_amt']= $loan_details->AMOUNT;
      $data['loan_date']=date_format(date_create($loan_details->ENDATE),'d-m-Y');

      // print_r($data);
      // exit();
      $this->load->view('redemption/form_missing_bond_a4',$data);


   }
   public function print_3_legal($billno)
   {

      // $bill_no=$this->input->post('bill_no');
      $bill_no=str_replace('_', '/', $billno);
      $loan_details=$this->db->query("select * from LOANS where BILLNO='".$bill_no."'")->row();
      $pledge_info=$this->db->query("select PLEDGENAME from PLEDGEINFO  WHERE BILLNO='".$bill_no."'")->result_array();
      $party_details=$this->db->query("select * from PARTIES  WHERE PID='".$loan_details->PID."'")->row();
      $company_details=$this->db->query("select * from COMPANY  WHERE COMPANYCODE='".$loan_details->COMPANYCODE."'")->row();
      $from=$party_details->NAME."<br>".$party_details->LASTNAME_PREFIX.", ".$party_details->FATHERSNAME."<br>";
      $from.=$party_details->ADDRESS1.", ".$party_details->ADDRESS2."<br>".$party_details->CITY;

      $data['from']=$from;
//       சி.ஜீவா,
// S/o, செ.சிவராம்,
// விநாயகர் கோவில் தெரு,
// சாயல்குடி,
// ராமநாதபுரம் மாவட்டம் - 623120
      $data['to']=$company_details->COMPANYNAME2."<br>".$company_details->ADDRESSLINE;


      $i=0;
      foreach($pledge_info as $plist)
      { 
          if($i==0)
          {
              $data['pledge_name']=$plist['PLEDGENAME'];
          }
          else
          {
            $data['pledge_name']=$data['pledge_name'].", ".$plist['PLEDGENAME']; 
          }
          $i++;

      }
      $data['party_name']=$loan_details->NAME;
      $data['loan_no']=$loan_details->BILLNO;
      $data['loan_amt']= $loan_details->AMOUNT;
      $data['loan_date']=date_format(date_create($loan_details->ENDATE),'d-m-Y');

      // print_r($data);
      // exit();
      $this->load->view('redemption/form_missing_bond',$data);


   }
    public function redemption_view()
    {
        $billno=$this->input->post('bno');

        $bill_no=str_replace('_', '/', $billno);
        
        $data['redemption_details'] = $this->db->query("select * from REDEMPTIONS where BILLNO='".$bill_no."'")->row();

        $data['loan_details'] = $this->db->query("select * from LOANS where BILLNO='".$bill_no."'")->row();
        $data['loan_status'] = $this->db->query("select * from loan_status where id='".$data['loan_details']->LOAN_STATUS."'")->row();
        $data['party_details'] = $this->db->query("select * from PARTIES where PID='".$data['loan_details']->PID."'")->row();
        $data['pledge_details'] = $this->db->query("select * from PLEDGEINFO where BILLNO='".$bill_no."'")->result_array();

        
        $data['membership_details']= $this->db->query("select * from MEMBERSHIP_CARD where PID='".$data['loan_details']->PID."'")->row();
        $data['receipt_details']= $this->db->query("select * from RECEIPT_MASTER where BILLNO='".$bill_no."'")->result_array();
        $this->load->view('redemption/redemption_view',$data);
    }
  public function sd_close_view($id)
{
 // $loan_no = $this->input->post('loan_no');
 $loan_no = str_replace("_","/",$id);
  //  $loan_no = '3TP-122/22';
 // print_r($loan_no);exit;
 $data['party'] = $this->db->query("SELECT PARTIES.PID, PARTIES.NAME, PARTIES.PHONE, PARTIES.ADDRESS1, PARTIES.ADDRESS2, 
 PARTIES.MEMBERSHIP_ID, PARTIES.MEMBERSHIP_POINTS, LOANS.BILLNO, LOANS.COMPANYCODE, LOANS.JEWEL_TYPE, LOANS.BILLNO, 
 LOANS.NETWEIGHT, LOANS.AMOUNT, LOANS.INTEREST, LOANS.INTERESTTYPE, LOANS.NOMINEE, LOANS.RELATION, LOANS.MONTHS,
 COMPANY.COMPANYCODE, LOANS.NETPAYABLE, LOANS.BALANCE, COMPANY.COMPANYNAME
 FROM ((LOANS
 INNER JOIN PARTIES ON PARTIES.PID = LOANS.PID)
 INNER JOIN COMPANY ON COMPANY.COMPANYCODE = LOANS.COMPANYCODE) WHERE LOANS.BILLNO = '".$loan_no."' ")->row();
//   print_r($data['party']);exit;
 $pid = $data['party']->PID;
//   print_r($pid);exit;
 $vNewP = $data['party']->AMOUNT + ($data['party']->AMOUNT * $data['party']->MONTHS * $data['party']->INTEREST / 100);
 $data['vNewp'] = $vNewP;
 $data['amount'] = $data['party']->AMOUNT;
 // print_r($data['amount']);exit;
 $data['party'] = json_decode(json_encode($data['party']), true);
//   $data['party'] = json_decode(json_encode($data['party']), true);
//   print_r($data['party']->NAME);exit;
//    print_r($data['party']);exit;
//   print_r($data['party']->BILLNO);   
//   $data['party'] = json_decode(json_encode($data['party']), true);
//   print_r($data['party']);exit;
 $data['pled'] = $this->db->query("SELECT * FROM PLEDGEINFO WHERE BILLNO = '".$loan_no."' ")->row();
 $data['pled'] = json_decode(json_encode($data['pled']), true);
 $data['rec_mas'] = $this->db->query("SELECT * FROM RECEIPT_MASTER WHERE BILLNO = '".$loan_no."' ")->result_array();
 $data['payment'] = $this->db->query("SELECT * FROM payment_inward_outward WHERE bill_no = '".$loan_no."' AND party_id = '".$pid."' AND module_name = 'New Redemption - Customer Close' ")->result_array();
 if ($data['payment']=='') {
     $data['pay'] = '';
 }
 else
 {
     $data['pay'] = $data['payment'];
 }
 $data['card'] = $this->db->query("SELECT * FROM MEMBERSHIP_CARD WHERE PID = '".$pid."' ")->row();
 $data['card'] = json_decode(json_encode($data['card']), true);

 $party_det=$this->db->query("SELECT PHOTO FROM PARTIES WHERE PID='".$pid."'")->row();
 if($party_det->PHOTO!='')
 {
   $data['party_photo']='<img src="data:image/jpg;charset=utf8;base64,'.base64_encode($party_det->PHOTO).'"  height="150px" width="150px">';
 }
 else
 {
   $data['party_photo']='<img src="'.base_url().'assets/images/party.jpg" height="150px" width="150px" >';
 }
 $loan_det=$this->db->query("SELECT ITEM_PHOTO FROM LOANS WHERE BILLNO = '".$loan_no."'")->row();
 if($loan_det->ITEM_PHOTO!='')
 {
   $data['jewel_photo']='<img src="data:image/jpg;charset=utf8;base64,'.base64_encode($loan_det->ITEM_PHOTO).'"  height="150px" width="150px">';
 }
 else
 {
   $data['jewel_photo']='<img src="'.base_url().'assets/images/party.jpg" height="150px" width="150px" >';
 }


//   
       $receipt_details= $this->db->query("select * from RECEIPT_MASTER where BILLNO='".$loan_no."'")->result_array();
     $loan_details=$this->db->query("select * from LOANS where BILLNO='".$loan_no."'")->row();
     // $loan_details->
       
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

       // $loan_amt_val = [];

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
           
           $data['receipt_details'] = $this->Loanreceipt_model->get_receipt_details($loan_no);

           
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
               $vChkReceipts=$this->Loanreceipt_model->check_receipt_entry($loan_no);
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
               // print_r($data['txtPaidInterest']);exit;
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
                    $vIntStr=$vIntStr."<tr><td>".number_format(round($loan_details->AMOUNT,2),2)."</td><td>".number_format(($vPaidPrincipal+$vPaidInterest),2)."</td><td>".number_format(($vLoanAmount+$vFInt-$vPaidTotal),2)."</td></tr>";
                    $act[] = number_format(round($loan_details->AMOUNT,2),2);
                    $paid[] = number_format(($vPaidPrincipal+$vPaidInterest),2);
                    $bal[] = number_format(($vLoanAmount+$vFInt-$vPaidTotal),2);
                    
                   //  print_r(number_format(round($loan_details->AMOUNT,2),2));    
                   //  print_r(number_format(($vPaidPrincipal+$vPaidInterest),2));
                   //  print_r(number_format(($vLoanAmount+$vFInt-$vPaidTotal),2));
                   $vPerDayInterest=$vLoanAmount*10/10000;
                   $vNewP=$vLoanAmount+($vLoanPeriod * $vPerDayInterest) - $vPaidTotal;
                   $vNewP2=$vNewP;
                   $vNewPrincipal=$vNewP;
               }
               else
               {
                   // $vIntStr = $vIntStr ."<tr>". "Principal : ".number_format($vLoanAmount,2). " Int : ". number_format($vFInt,2). " Tot : ".number_format(($vLoanAmount+$vFInt),2)." Paid : ".number_format(($vPaidPrincipal+$vPaidInterest),2)." Bal : ".number_format(($vLoanAmount+$vFInt-$vPaidTotal),2). " Period : ".number_format($vLoanPeriod,2)." Months "." Rate : ". number_format($vLoanIntPercent,2)."</tr>";
                 
                 $vIntStr = $vIntStr ."<tr><td>".number_format(round($vLoanAmount,2),2)."</td><td>".number_format(($vPaidPrincipal+$vPaidInterest),2)."</td><td>".number_format(($vLoanAmount+$vFInt-$vPaidTotal),2)."</td></tr>";
                 
                 $act[] = number_format(round($vLoanAmount,2),2);
                 $paid[] = number_format(($vPaidPrincipal+$vPaidInterest),2);
                 $bal[] = number_format(($vLoanAmount+$vFInt-$vPaidTotal),2);
                
               //   print_r(number_format(round($vLoanAmount,2),2));    
               //    print_r(number_format(($vPaidPrincipal+$vPaidInterest),2));
               //    print_r(number_format(($vLoanAmount+$vFInt-$vPaidTotal),2));

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
                 $vIntStr= "<tr><td>".number_format(round($vLoanAmount,2),2)."</td><td>0.00</td><td>".number_format(($vLoanAmount + $vFInt),2)."</td></tr>";
                 
                 $act[] = number_format(round($vLoanAmount,2),2);
                 $paid[] = '0.00';
                 $bal[] = number_format(($vLoanAmount + $vFInt),2);
                 
               //   print_r(number_format(round($vLoanAmount,2),2));    
               //   print_r(number_format(($vLoanAmount + $vFInt),2));
               }
               else
               {
                  // $vIntStr ="<tr>"."Principal : " . number_format($vLoanAmount,2). " Int : " . number_format($vFInt,2). " Tot : " . number_format(($vLoanAmount + $vFInt),2) . " Period : " .number_format( $vLoanPeriod,2). " Months". " Rate : " . number_format($vLoanIntPercent,2)."</tr>";
                
                 // $receipt_detail=$this->db->query("SELECT TOP 1 * FROM RECEIPT_MASTER where BILLNO='".$bill_no."'")->row();
                 // if(isset($receipt_detail))
                 // {
                 //    $edt=$receipt_detail->RECEIPT_DATE;
                 //    $next_edt=$receipt_detail->RECEIPT_DATE;  

                 // }
                 // else
                 // {
                    $edt=$data['vLoanLastDate'];
                     $next_edt=$data['vLoanLastDate'];
                 // }
                 $vIntStr= "<tr><td>".number_format(round($vLoanAmount,2),2)."</td><td>0.00</td><td>".number_format(($vLoanAmount + $vFInt),2)."</td></tr>";
                 
                 $act[] = number_format(round($vLoanAmount,2),2);
                 $paid[] = '0.00';
                 $bal[] = number_format(($vLoanAmount + $vFInt),2);
                 
               //   print_r(number_format(round($vLoanAmount,2),2));    
               //   print_r(number_format(($vLoanAmount + $vFInt),2));
                   
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
                       
                       if ($GetNewIntPercent >= 3.5){
                           $GetNewIntPercent = 3.5;
                       }
                       
                       $vCalcInt = $GetNewIntPercent;
                       $vCurrentIntPercent = $vCalcInt;
                       
                       $vSInt = ($vNewP * $p * $vCalcInt / 100);
                       $vTotalInt = round($vTotalInt) + $vSInt;
                       // $vIntStr = $vIntStr . " Int : " . number_format($vSInt,2). " Tot : ".number_format(($vNewP + $vSInt),2). " Period : " . $p. " Mnths" . " Rate : " .number_format($vCalcInt,2)."</tr>" ;
                       $next_edt1=date('Y-m-d',strtotime($next_edt.' +'.$p.' months'));
                       $next_edt=$next_edt1;
                       
                       $vIntStr = $vIntStr ."<tr><td>". round($vNewP,2)."</td><td>0.00</td><td>".number_format(($vNewP + $vSInt),2)."</td></tr>";
                       
                       $act[] = round($vNewP,2);
                       $paid[] = '0.00';
                       $bal[] = number_format(($vNewP + $vSInt),2);   
                       
                       // print_r(round($vNewP,2));    
                       // print_r(number_format(($vNewP + $vSInt),2));

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
                       // $next_edt2=date('Y-m-d',strtotime($next_edt1.' +'.$vExtraDays.' days'));

                       // $next_edt=$next_edt2;
                       $vIntStr = $vIntStr . "<tr><td>".number_format(round($vNewP2,2),2)."</td><td>0.00</td><td>".number_format(($vNewP2 + $vIntforBaldays),2)."</td></tr>";
                       
                       $act[] = number_format(round($vNewP2,2),2);
                       $paid[] = '0.00';
                       $bal[] = number_format(($vNewP2 + $vIntforBaldays),2);
                       
                       // print_r(number_format(round($vNewP2,2),2));    
                       // print_r(number_format(($vNewP2 + $vIntforBaldays),2));
                   }
                   else
                   {
                       $vIntforBaldays = $vNewPrincipal * $vIntMonths * $vCalcInt / 100;
                       $vTotalInt = round($vTotalInt) + $vIntforBaldays;
                       // $vIntStr = $vIntStr . "<tr>". "Principal : " . number_format($vNewPrincipal,2). " Int : " .number_format($vIntforBaldays,2). " Tot : ". number_format(($vNewP2 + $vIntforBaldays),2) . " Period : " . $vExtraDays. " days" . " Rate : " . number_format($vCalcInt,2). "</tr>";
                       // $next_edt2=date('Y-m-d',strtotime($next_edt1.' +'.$vFullDays.' days'));

                       // $next_edt=$next_edt2;
                         $vIntStr = $vIntStr . "<tr><td>".number_format(round($vNewPrincipal,2),2)."</td><td>0.00</td><td>".number_format(($vNewP2 + $vIntforBaldays),2)."</td></tr>";
                         
                       $act[] =  number_format(round($vNewPrincipal,2),2) ;
                       $paid[] = '0.00';
                       $bal[] = number_format(($vNewP2 + $vIntforBaldays),2);
                       
                       // print_r(number_format(round($vNewPrincipal,2),2));    
                       //   print_r(number_format(($vNewP2 + $vIntforBaldays),2));
                   }
               }
               else
               {
                   $vIntforBaldays = 0;
                   $vTotalInt = round($vTotalInt) + $vIntforBaldays;
               }

           }
           // print_r($vIntStr);
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
                       $vIntStr = $vIntStr . "<tr><td>".number_format(round($vNewP,2),2)."</td><td>0.00</td><td>".number_format(($vNewP + $vSInt),2)."</td></tr>";
                       
                       $act[] =  number_format(round($vNewP,2),2);
                       $paid[] ='0.00' ;
                       $bal[] =  number_format(($vNewP + $vSInt),2) ;
                       
                       // print_r(number_format(round($vNewP,2),2));    
                       // print_r(number_format(($vNewP + $vSInt),2));
                       
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
           // print_r($vIntStr);
           $get_receipt_summary = $this->Loanreceipt_model->get_receipt_summary($loan_no, "INT"); 
           $data['txtPaidTotal']=0;
           $vTotalInterest = round($get_receipt_summary) + round($vTotalInt);

           $vTotalPaidAmount=$this->Loanreceipt_model->get_receipt_summary($loan_no, "PAIDAMOUNT");
           $vNetAmount = $vLoanAmount + $vTotalInterest - $vTotalPaidAmount;
           
           // $vIntStr = $vIntStr . "<tr>"."Total Period : " . $vMonths2 ." Months " . ($vDays2+1). " days"."</tr>";
           // $vIntStr = $vIntStr . "<tr>"."Loan Amount : " .number_format($vLoanAmount,2);
           // $vIntStr = $vIntStr . "<tr> <td><b>".$vLoanAmount."</b></td>";
           // // $vIntStr = $vIntStr . "    Total Amount : " .number_format(($vLoanAmount + $vTotalInterest),2)."</td>";
           // $vIntStr = $vIntStr ."<td><b>" .number_format($vTotalPaidAmount,2)."</b></td>";
           // $vIntStr = $vIntStr ."<td><b>".number_format($vNetAmount,2)."</b></td></tr>";
           
           $data['vIntStr'] = $vIntStr;
           // print_r($data['vIntStr']);  
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

               $vIntStr = $vIntStr . "<tr><td>".number_format(round($vLoanAmount,2),2)."</td><td>0.00</td><td>".number_format(($vLoanAmount + $data['txtInterest']),2)."</td></tr>";
               
               $act[] = number_format(round($vLoanAmount,2),2);
               $paid[] = '0.00' ;
               $bal[] = number_format(($vLoanAmount + $data['txtInterest']),2);
               
               // print_r(number_format(round($vLoanAmount,2),2));    
               // print_r(number_format(($vLoanAmount + $data['txtInterest']),2));
            }
       }
       // print_r();exit;
       // print_r($act);
       // print_r($data['paid']);
       // print_r($data['bal']);exit;
       // $arr[];
       $arr = [ 

               'actual' => $act,
               'paidamt' => $paid,
               'balance' => $bal,
       ];
       $data['bal'] = $bal;
       // print_r($arr->act);
       // print_r($arr['actual']);
       // $arr[];
       // print_r($arr['actual'][0]);exit;
       $data['arr'] = $arr;
       // print_r($data['arr']);exit;
       // print_r($data['arr']['act']);exit;
           // print_r($data['act']);
           // print_r($data['paid']);
           // print_r($data['bal']);
           //  exit;

 $this->load->view("redemption/secondary_display_redemp_cus_close",$data);
}

/// Customer Close End ///

/// Customer Sale Start ///

public function sd_sale_view($id)
{
  $loan_no = str_replace("_","/",$id);

   // $loan_no = $this->input->post('loan_no');
  //  $loan_no = 'MIP-233/21';
   $data['party'] = $this->db->query("SELECT PARTIES.PID, PARTIES.NAME, PARTIES.PHONE, PARTIES.ADDRESS1, PARTIES.ADDRESS2, 
   PARTIES.MEMBERSHIP_ID, PARTIES.MEMBERSHIP_POINTS, LOANS.BILLNO, LOANS.COMPANYCODE, LOANS.JEWEL_TYPE, LOANS.BILLNO, 
   LOANS.NETWEIGHT, LOANS.AMOUNT, LOANS.INTEREST, LOANS.INTERESTTYPE, LOANS.NOMINEE, LOANS.RELATION,
   COMPANY.COMPANYCODE, COMPANY.COMPANYNAME
   FROM ((LOANS
   INNER JOIN PARTIES ON PARTIES.PID = LOANS.PID)
   INNER JOIN COMPANY ON COMPANY.COMPANYCODE = LOANS.COMPANYCODE) WHERE LOANS.BILLNO = '".$loan_no."' ")->row();
 //  print_r($data['party']);exit;
  $pid = $data['party']->PID;
   
   $data['party'] = json_decode(json_encode($data['party']), true);
 //   $data['party'] = json_decode(json_encode($data['party']), true);
 //   print_r($data['party']->NAME);exit;
 //    print_r($data['party']);
 //   print_r($data['party']->BILLNO);   
 //   $data['party'] = json_decode(json_encode($data['party']), true);
 //   print_r($data['party']);exit;
   $data['pled'] = $this->db->query("SELECT * FROM PLEDGEINFO WHERE BILLNO = '".$loan_no."' ")->row();
   $data['pled'] = json_decode(json_encode($data['pled']), true);
   $data['rec_mas'] = $this->db->query("SELECT * FROM RECEIPT_MASTER WHERE BILLNO = '".$loan_no."' ")->result_array();
   $data['redemp'] = $this->db->query("SELECT * FROM REDEMPTIONS WHERE BILLNO = '".$loan_no."' ")->row();
   $data['redemp'] = json_decode(json_encode($data['redemp']), true);
   // print_r($data['redemp']);
   $data['payment'] = $this->db->query("SELECT * FROM payment_inward_outward WHERE bill_no = '".$loan_no."' AND party_id = '".$pid."' AND module_name = 'New Redemption - Customer Sale' ")->result_array();
   if ($data['payment']=='') {
       $data['pay'] = '';
   }
   else
   {
       $data['pay'] = $data['payment'];
   }
   $data['card'] = $this->db->query("SELECT * FROM MEMBERSHIP_CARD WHERE PID = '".$pid."' ")->row();
   $data['card'] = json_decode(json_encode($data['card']), true);

   $party_det=$this->db->query("SELECT PHOTO FROM PARTIES WHERE PID='".$pid."'")->row();
 if($party_det->PHOTO!='')
 {
   $data['party_photo']='<img src="data:image/jpg;charset=utf8;base64,'.base64_encode($party_det->PHOTO).'"  height="150px" width="150px">';
 }
 else
 {
   $data['party_photo']='<img src="'.base_url().'assets/images/party.jpg" height="150px" width="150px" >';
 }
 $loan_det=$this->db->query("SELECT ITEM_PHOTO FROM LOANS WHERE BILLNO = '".$loan_no."'")->row();
 if($loan_det->ITEM_PHOTO!='')
 {
   $data['jewel_photo']='<img src="data:image/jpg;charset=utf8;base64,'.base64_encode($loan_det->ITEM_PHOTO).'"  height="150px" width="150px">';
 }
 else
 {
   $data['jewel_photo']='<img src="'.base_url().'assets/images/party.jpg" height="150px" width="150px" >';
 }

     $receipt_details= $this->db->query("select * from RECEIPT_MASTER where BILLNO='".$loan_no."'")->result_array();
     $loan_details=$this->db->query("select * from LOANS where BILLNO='".$loan_no."'")->row();
     // $loan_details->
       
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

       // $loan_amt_val = [];

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
           
           $data['receipt_details'] = $this->Loanreceipt_model->get_receipt_details($loan_no);

           
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
               $vChkReceipts=$this->Loanreceipt_model->check_receipt_entry($loan_no);
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
               $vChkReceipts=$this->Loanreceipt_model->check_receipt_entry($loan_no);

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
               $vMaxNo = $this->Loanreceipt_model->get_max_receipt_no($loan_no);
               $data['receipt_row_details']=$this->Loanreceipt_model->get_receipt_rowno($loan_no,$vMaxNo);
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
               // print_r($data['txtPaidInterest']);exit;
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
                    $vIntStr=$vIntStr."<tr><td>".number_format(round($loan_details->AMOUNT,2),2)."</td><td>".number_format(($vPaidPrincipal+$vPaidInterest),2)."</td><td>".number_format(($vLoanAmount+$vFInt-$vPaidTotal),2)."</td></tr>";
                    
                    $act[] = number_format(round($loan_details->AMOUNT,2),2);
                   $paid[] = number_format(($vPaidPrincipal+$vPaidInterest),2);
                   $bal[] = number_format(($vLoanAmount+$vFInt-$vPaidTotal),2);
                  
                   $vPerDayInterest=$vLoanAmount*10/10000;
                   $vNewP=$vLoanAmount+($vLoanPeriod * $vPerDayInterest) - $vPaidTotal;
                   $vNewP2=$vNewP;
                   $vNewPrincipal=$vNewP;
               }
               else
               {
                   // $vIntStr = $vIntStr ."<tr>". "Principal : ".number_format($vLoanAmount,2). " Int : ". number_format($vFInt,2). " Tot : ".number_format(($vLoanAmount+$vFInt),2)." Paid : ".number_format(($vPaidPrincipal+$vPaidInterest),2)." Bal : ".number_format(($vLoanAmount+$vFInt-$vPaidTotal),2). " Period : ".number_format($vLoanPeriod,2)." Months "." Rate : ". number_format($vLoanIntPercent,2)."</tr>";
                  $vIntStr = $vIntStr ."<tr><td>".number_format(round($vLoanAmount,2),2)."</td><td>".number_format(($vPaidPrincipal+$vPaidInterest),2)."</td><td>".number_format(($vLoanAmount+$vFInt-$vPaidTotal),2)."</td></tr>";

                  $act[] = number_format(round($vLoanAmount,2),2);
                  $paid[] = number_format(($vPaidPrincipal+$vPaidInterest),2);
                  $bal[] = number_format(($vLoanAmount+$vFInt-$vPaidTotal),2);

                   $vNewP = $vLoanAmount + ($vLoanAmount * $vLoanPeriod * $vLoanIntPercent / 100) - $vPaidTotal;
                   $vNewP2 = $vNewP;
                   $vNewP3 = $vNewP;
                   $vNewPrincipal = $vNewP;
               }
           }
           else if ($vChkReceipts==true && $vChkOD==true)
           {
               $interest_details=$this->Loanreceipt_model->get_paid_receipt_details($loan_no,$vChkOD,$vLoanPeriod, $vLoanIntPercent);

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
                 $vIntStr= "<tr><td>".number_format(round($vLoanAmount,2),2)."</td><td>0.00</td><td>".number_format(($vLoanAmount + $vFInt),2)."</td></tr>";
                 
                 $act[] = number_format(round($vLoanAmount,2),2);
                  $paid[] = '0.00';
                  $bal[] = number_format(($vLoanAmount + $vFInt),2);
               }
               else
               {
                  // $vIntStr ="<tr>"."Principal : " . number_format($vLoanAmount,2). " Int : " . number_format($vFInt,2). " Tot : " . number_format(($vLoanAmount + $vFInt),2) . " Period : " .number_format( $vLoanPeriod,2). " Months". " Rate : " . number_format($vLoanIntPercent,2)."</tr>";
                
                 // $receipt_detail=$this->db->query("SELECT TOP 1 * FROM RECEIPT_MASTER where BILLNO='".$bill_no."'")->row();
                 // if(isset($receipt_detail))
                 // {
                 //    $edt=$receipt_detail->RECEIPT_DATE;
                 //    $next_edt=$receipt_detail->RECEIPT_DATE;  

                 // }
                 // else
                 // {
                   //  $edt=$data['vLoanLastDate'];
                   //   $next_edt=$data['vLoanLastDate'];
                 // }
                 $vIntStr= "<tr><td>".number_format(round($vLoanAmount,2),2)."</td><td>0.00</td><td>".number_format(($vLoanAmount + $vFInt),2)."</td></tr>";
                
                 $act[] = number_format(round($vLoanAmount,2),2);
                  $paid[] = '0.00';
                  $bal[] = number_format(($vLoanAmount + $vFInt),2);
                   
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
                       
                       if ($GetNewIntPercent >= 3.5){
                           $GetNewIntPercent = 3.5;
                       }
                       
                       $vCalcInt = $GetNewIntPercent;
                       $vCurrentIntPercent = $vCalcInt;
                       
                       $vSInt = ($vNewP * $p * $vCalcInt / 100);
                       $vTotalInt = round($vTotalInt) + $vSInt;
                       // $vIntStr = $vIntStr . " Int : " . number_format($vSInt,2). " Tot : ".number_format(($vNewP + $vSInt),2). " Period : " . $p. " Mnths" . " Rate : " .number_format($vCalcInt,2)."</tr>" ;
                       // $next_edt1=date('Y-m-d',strtotime($next_edt.' +'.$p.' months'));
                       // $next_edt=$next_edt1;
                       
                       $vIntStr = $vIntStr ."<tr><td>". round($vNewP,2)."</td><td>0.00</td><td>".number_format(($vNewP + $vSInt),2)."</td></tr>";

                       $act[] = round($vNewP,2);
                       $paid[] = '0.00';
                       $bal[] = number_format(($vNewP + $vSInt),2);

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
                       // $next_edt2=date('Y-m-d',strtotime($next_edt1.' +'.$vExtraDays.' days'));

                       // $next_edt=$next_edt2;
                       $vIntStr = $vIntStr . "<tr><td>".number_format(round($vNewP2,2),2)."</td><td>0.00</td><td>".number_format(($vNewP2 + $vIntforBaldays),2)."</td></tr>";

                       $act[] = number_format(round($vNewP2,2),2);
                       $paid[] = '0.00';
                       $bal[] = number_format(($vNewP2 + $vIntforBaldays),2);

                   }
                   else
                   {
                       $vIntforBaldays = $vNewPrincipal * $vIntMonths * $vCalcInt / 100;
                       $vTotalInt = round($vTotalInt) + $vIntforBaldays;
                       // $vIntStr = $vIntStr . "<tr>". "Principal : " . number_format($vNewPrincipal,2). " Int : " .number_format($vIntforBaldays,2). " Tot : ". number_format(($vNewP2 + $vIntforBaldays),2) . " Period : " . $vExtraDays. " days" . " Rate : " . number_format($vCalcInt,2). "</tr>";
                       // $next_edt2=date('Y-m-d',strtotime($next_edt1.' +'.$vFullDays.' days'));

                       // $next_edt=$next_edt2;
                         $vIntStr = $vIntStr . "<tr><td>".number_format(round($vNewPrincipal,2),2)."</td><td>0.00</td><td>".number_format(($vNewP2 + $vIntforBaldays),2)."</td></tr>";

                       $act[] = number_format(round($vNewPrincipal,2),2);
                       $paid[] = '0.00';
                       $bal[] = number_format(($vNewP2 + $vIntforBaldays),2);
                       
                   }
               }
               else
               {
                   $vIntforBaldays = 0;
                   $vTotalInt = round($vTotalInt) + $vIntforBaldays;
               }

           }
           // print_r($vIntStr);
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
                       $vIntStr = $vIntStr . "<tr><td>".number_format(round($vNewP,2),2)."</td><td>0.00</td><td>".number_format(($vNewP + $vSInt),2)."</td></tr>";

                       $act[] = number_format(round($vNewP,2),2);
                       $paid[] = '0.00';
                       $bal[] = number_format(($vNewP + $vSInt),2);


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
           // print_r($vIntStr);
           $get_receipt_summary = $this->Loanreceipt_model->get_receipt_summary($loan_no, "INT"); 
           $data['txtPaidTotal']=0;
           $vTotalInterest = round($get_receipt_summary) + round($vTotalInt);

           $vTotalPaidAmount=$this->Loanreceipt_model->get_receipt_summary($loan_no, "PAIDAMOUNT");
           $vNetAmount = $vLoanAmount + $vTotalInterest - $vTotalPaidAmount;
           
           // $vIntStr = $vIntStr . "<tr>"."Total Period : " . $vMonths2 ." Months " . ($vDays2+1). " days"."</tr>";
           // $vIntStr = $vIntStr . "<tr>"."Loan Amount : " .number_format($vLoanAmount,2);
           // $vIntStr = $vIntStr . "<tr> <td><b>".$vLoanAmount."</b></td>";
           // // $vIntStr = $vIntStr . "    Total Amount : " .number_format(($vLoanAmount + $vTotalInterest),2)."</td>";
           // $vIntStr = $vIntStr ."<td><b>" .number_format($vTotalPaidAmount,2)."</b></td>";
           // $vIntStr = $vIntStr ."<td><b>".number_format($vNetAmount,2)."</b></td></tr>";
           
           $data['vIntStr'] = $vIntStr;
           // print_r($data['vIntStr']);  
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

               $vIntStr = $vIntStr . "<tr><td>".number_format(round($vLoanAmount,2),2)."</td><td>0.00</td><td>".number_format(($vLoanAmount + $data['txtInterest']),2)."</td></tr>";

               $act[] = number_format(round($vLoanAmount,2),2);
               $paid[] = '0.00';
               $bal[] = number_format(($vLoanAmount + $data['txtInterest']),2);

               
            }
       }
       
        $arr = [
           'actual' => $act,
           'paidamt' => $paid,
           'balance' => $bal,
        ];

       $data['arr'] = $arr;
// print_r($data['redemp']);exit;
 $this->load->view("redemption/secondary_display_redemp_cus_sale",$data);
}
 
public function redemption_form_miss_img()
{
    $bno=$_POST['bno'];
    $res=$this->db->query("select * from REDEMPTIONS where BILLNO='".$bno."'")->row();
    $resp='<img src="'.base_url().'assets/images/redemption_form_miss_doc/'.$res->FORM_DOC_PATH .'" height="650px" width="950px">';
    echo $resp;
}

}
?>