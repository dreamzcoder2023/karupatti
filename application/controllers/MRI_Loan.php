<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/* ************************************************************************************
		Purpose : To handle all Loan functions 2022-08-19
***************************************************************************************/
class Mri_loan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model(array("Mri_Loan_model","Redemption_model","Loanreceipt_model","Loan_model"));

    $fin_year=$this->Mri_Loan_model->get_fin_years_list();
    $db=substr($fin_year->DBNAME,0,strlen($fin_year->DBNAME)-4);
    //echo $db;exit();
    $config_app = switch_db_dynamic($db);
    $this->Mri_Loan_model->other_db = $this->load->database($config_app,TRUE);

    	$this->load->library('user_agent');
    if (isset($this->session->userdata['username']) && $this->session->userdata['username'] == TRUE)
        {
            //do something
        }else{
            redirect('login'); //if session is not there, redirect to login page
        } 
		date_default_timezone_set("Asia/Kolkata");
    	$this->session->set_userdata('comtitle', 'Mri_loan');
	}
   
   /*Mri LIst*/ 
    public function index()
    {


       
        $page       = isset($_GET['page']) ? $_GET['page'] : 1;
        $limit      = 10;
        $offset     = ($page - 1) * $limit +1;
        $page_limit= $offset+$limit-1;

        $data['company_filter'] = $this->input->post('company_filter');
        // print_r($data['company_filter']);exit();
         if($data['company_filter']!=''){
         $cmp =" AND L.COMPANYCODE LIKE'%".$data['company_filter']."%'";
         }
          else{
         $cmp ='';
        }
      

      

      $data['dt_fill'] = $this->input->post('dt_fill_loan_list');
      // echo $this->input->post('dt_fill_loan_list');
      $data['from_date_fillter'] = $this->input->post('from_date_fillter_loan_list');
      $data['to_date_fillter'] = $this->input->post('to_date_fillter_loan_list');
      

        $fdate ='';
        $tdate ='';
        //  print_r($data['dt_fill']);exit();
        if($data['dt_fill']==""){
            $fdate ='';
            $tdate ='';

        }
      
      if($data['dt_fill']=="today")
      {
          $data['today_date_fillter'] = date("Y-m-d");
          $fdate =" AND L.ENDATE='".$data['today_date_fillter']."' ";
          $tdate ='';
          // print_r(1);//exit();
      }

      if($data['dt_fill']=="week")
      {
          $today=date('l');
          if($today=="Sunday")
          {
              $data['week_from_date_fillter']=date(' Y-m-d', strtotime("sunday 0 week"));

              $data['week_to_date_fillter']=date(' Y-m-d', strtotime("saturday 1 week"));
              // print_r($data['week_to_date_fillter']);exit;
              $fdate =" AND L.ENDATE>='".$data['week_from_date_fillter']."'";
              $tdate =" AND L.ENDATE<='".$data['week_to_date_fillter']."'";

          }
          else
          {
              $data['week_from_date_fillter']=date(' Y-m-d', strtotime("sunday -1 week"));

              $data['week_to_date_fillter']=date(' Y-m-d', strtotime("saturday 0 week"));
              //  print_r($data['week_to_date_fillter']);exit;
              $fdate =" AND L.ENDATE>='".$data['week_from_date_fillter']."'";
            $tdate =" AND L.ENDATE<='".$data['week_to_date_fillter']."'";
          }
      }
      if($data['dt_fill']=="monthly")
      {

          $first=date('Y-m-01');
          $last=date('Y-m-t');
          $fdate =" AND L.ENDATE>='".$first."'";
          $tdate ="AND L.ENDATE<='".$last."'";
      }
      if($data['dt_fill']=="custom Date")
      {
         

          if($data['from_date_fillter']!='')
          {
            $first=date('Y-m-d',strtotime($data['from_date_fillter']));
            $fdate =" AND L.ENDATE>='".$first."'";
          }
          else
          {
            $fdate ='';
          }
          if($data['to_date_fillter']!='')
          {
            $last=date('Y-m-d',strtotime($data['to_date_fillter']));
            $tdate =" AND L.ENDATE<='".$last."'";
          }
          else
          {
            $tdate ='';
          } 
      }


      // print_r($fdate);
      // print_r($tdate);
      // exit();
       $ccat = $data['company_filter'];

      $data['get_cmp_name_fill']  = $this->db->query("SELECT * FROM COMPANY WHERE COMPANYCODE ='".$ccat."' ")->row();
      $data['company_list'] = $this->Mri_Loan_model->get_company_list($cmp);
      

      $data['loan_list'] = $this->db->query("SELECT * FROM ( SELECT (P.ADDRESS1 + ',' + P.ADDRESS2) AS ADDRESS,P.RATING, L.*,
   ROW_NUMBER() OVER (ORDER BY L.ENDATE DESC) AS sl,R.CLOSING_TYPE FROM LOANS_MRI L
  INNER JOIN PARTIES P ON P.PID=L.PID 
  left join   REDEMPTIONS_MRI R  on R.BILLNO = L.BILLNO
  WHERE L.ACTIVE='Y' AND L.PID!='' )N WHERE sl BETWEEN 1 AND 10 ORDER BY N.ENDATE DESC")->result_array();

      $data['loan_count'] =count($this->db->query("SELECT P.RATING,l.BILLNO  FROM LOANS_MRI L INNER JOIN PARTIES P ON P.PID=L.PID WHERE L.ACTIVE='Y'  $fdate $tdate $cmp")->result_array());

      $data['loan_counts'] =count($this->db->query("SELECT *  FROM LOANS_MRI  WHERE ACTIVE='Y' ")->result_array());


      $this->load->view('mri_loan/mri_loan_list',$data);
    }

    /*MRI VIEW*/ 

     public function mri_loan_view()
    {
        $lid = $_POST['id'];
        $data['loan_details'] = $this->Mri_Loan_model->get_loan_by_loan_id($lid);
        
        $this->load->view('mri_loan/mri_loan_view',$data);
    }

/* MRI Add screen */
    public function mri_loan_add()
    {
       $data['interest_list']=$this->db->query("select * from INTERESTLIST where INTNAME like 'MRI%' order by INTNAME")->result_array();
        $data['company_list']=$this->db->query("select * from  COMPANY where ACTIVE='Y'")->result_array();
      $this->load->view('mri_loan/mri_loan_add',$data);
    }

    public function mri_redemption($str)
    {
        //SELECT * from LOANS_MRI where ACTIVE='Y' AND STATUS='NEW' AND BILLNO LIKE 
        //'$bill_no%' 

        $bill_no=str_replace('_', '/',$str);

        $data['mri_data']=$this->db->query("SELECT * from LOANS_MRI where ACTIVE='Y'  AND BILLNO LIKE 
        '$bill_no%' ")->result_array();
  
        $data['party_details'] = $this->db->query("SELECT l.BILLNO,c.COMPANYNAME,l.LOAN_TYPE,l.ENDATE,l.AMOUNT, i.PERIOD, l.INTERESTTYPE, l.WEIGHT,l.STONELESS,l.LESS,l.NETWEIGHT, l.MONTHS,l.LOANDAYS,l.ITEM_PHOTO,l.NOMINEE, l.RELATION,l.NOMINEE_ID,l.LOAN_STATUS, p.PID, p.NAME,p.ADDRESS1,p.ADDRESS2,p.PHONE,p.CITY, p.MEMBERSHIP_ID,p.MEMBERSHIP_POINTS,p.RATING,p.PHOTO,p.OTHER_PHOTO,r.NEWBILLNO  from LOANS l, PARTIES p, COMPANY c, INTERESTLIST i,REDEMPTIONS r WHERE l.PID=p.PID and i.INTNAME=l.INTERESTTYPE and l.COMPANYCODE=c.COMPANYCODE  and r.BILLNO=l.BILLNO and r.CLOSING_TYPE='company_close' and  l.BILLNO LIKE  '".'%'.$data['mri_data'][0]['OLD_BILLNO'].'%'."' and r.NEWBILLNO not in ( select CCL_BILLNO from LOANS_MRI where TYPE_OF_RECORD='N')")->row();

        $data['company_list']=$this->db->query("select * from  COMPANY where ACTIVE='Y'")->result_array();
        $this->load->view('mri_loan/mri_redemption',$data);
    }
    public function saveredemptionclosefun()
    {
        $mribillno         = $this->input->post('mribillno');
        $company           = $this->input->post('company');
        $mriinttypeval     = $this->input->post('mriinttypeval');
        $mri_endateval     = $this->input->post('mri_endateval');
        $mriloanamount     = $this->input->post('mriloanamount');
        $Balanceamountval  = $this->input->post('Balanceamountval');
        $paidamountvalmri  = $this->input->post('paidamountvalmri');
       
        $paymaribalanceamount = $this->input->post('paymaribalanceamount');
        $formchargeval = $this->input->post('formchargeval');
        $noticechargeval = $this->input->post('noticechargeval');
        $discountval  = $this->input->post('discountval');
        $remarksvalue = $this->input->post('remarksvalue');
        $pidval  = $this->input->post('pidval');
        $statusvalue       = "CUSTOMER_CLOSE";


        $insertmriredemption_close = $this->db->query("INSERT INTO REDEMPTIONS_MRI(SNO,BILLNO,RETURNDATE,INTEREST,PAIDINTEREST,
         PRINCIPAL,PAIDPRINCIPAL,TOTALPAY,MAINTAINCHARGE,NOTICECHARGE,FORMCHARGE,DISCOUNT,NETPAYABLE,PAIDAMOUNT,RECEIVED_CASH,JEWEL_VALUE,PROFIT,LOSS,NEWBILLNO,NEWLOANAMOUNT,ADDED_USER,ADDED_TIME,CHK_VERIFIED,VERIFIED_USER,VOUCHER_SNO,REMARKS,BALANCE,CLOSING_TYPE,BILL_TYPE,BILL_LEDGER_SNO) VALUES ('".$pidval ."','".$mribillno."','".$mri_endateval."','".$mriinttypeval."','".is_numeric($paidamountvalmri)."','".number_format($mriloanamount,2,'.','')."','".number_format($paidamountvalmri,2,'.','')."','".number_format($paymaribalanceamount,2,'.','')."','0','".number_format($formchargeval,2,'.','')."','".number_format($noticechargeval,2,'.','')."','".$discountval."','0','0','".number_format($paymaribalanceamount,2,'.','')."','0','0','0','".$mribillno."','".number_format($paymaribalanceamount,2,'.','')."','','".date('Y-m-d H:i:s')."','N','0','0','".$remarksvalue."','','".$statusvalue."','','')");


        if($insertmriredemption_close)
        {

          $data['return_code'] =0;
          $data['success_msg'] ='success';
        }
        else
        {

          $data['return_code'] =1;
          $data['error_msg'] ='error';
        }
        echo json_encode($data); 
    }
    public function saveredemptiontransferfun()
    {
        echo "saveredemptiontransferfun";exit;
    }

/* MRI Add - Save data */
   public function mri_loan_save()
   {

      $pid         = $this->input->post('pid');
      $billno      = $this->input->post('bill_no');
      $ccl_no      = $this->input->post('ccl_no');
      $int_type    = $this->input->post('int_scheme');
      $cmp         = $this->input->post('company');
      $l_date      = date_format(date_create($this->input->post('kt_datepicker_new_loan_date')),'Y-m-d');
      $loan_amt    = $this->input->post('mri_loan_amt');
      $redemp_days = $this->input->post('add_lnperiod_new_loan');
      $int_paid    = $this->input->post('processing_charge');
      $ren_pay     = $this->input->post('renewal_extra_pay');
      $desc        = $this->input->post('remarks');
      $orginalloannumber = $this->input->post('orginalloannumberval');

      $total_mri_loan_amtval = $this->input->post('total_mri_loan_amtval');
      $final_mri_totalvalue  = $this->input->post('final_mri_totalvalue');

      //print_r($total_mri_loan_amtval);exit;
      if(intval($loan_amt)!=intval($total_mri_loan_amtval))
      {
           $mriActive ='Y';
           $mriStatus ='NEW';
      }
      else
      {
           $mriActive ='C';
           $mriStatus ='MRICLOSE';
      }
      //print_r($mriActive);exit;

      $loan_key    = $this->Mri_Loan_model->get_loan_key($_SESSION['LOANPREFIX']);

      $apkeyval    = $loan_key->KEYVALUE+1;
      $KEYNAME    = $loan_key->KEYNAME;
      $year =     date("y");
      $data['txtReceiptNo'] = 'MRI'.'-'.($apkeyval).'/'.$year;
      
      $mri_bill_no = $data['txtReceiptNo'];
    
      $updatekeyval = $this->db->query("UPDATE KEYMASTER set KEYVALUE='".$apkeyval."' where KEYNAME ='".$KEYNAME."'");

      $loan_details  = $this->db->query("select * from LOANS where BILLNO='".$orginalloannumber."' ")->row();

      $redemption_details=$this->db->query("select * from REDEMPTIONS where BILLNO='".$billno."' ")->row();
      $party_details = $this->db->query("select * from PARTIES where PID='".$pid."' ")->row();
      //print_r($loan_details);exit;
      $pledge_details=$this->db->query("select * from PLEDGEINFO where BILLNO='".$billno."'")->row();
      $interest_list = $this->db->query("select * from INTERESTLIST where INTID='".$int_type."'")->row();


    
    
      $res = $this->db->query("INSERT INTO LOANS_MRI (LOAN_SNO, NAME, BILLNO, LOAN_TYPE, ENDATE, PLEDGEINFO,JEWEL_TYPE, WEIGHT, STONELESS, LESS, NETWEIGHT, QUALITY, CURRENTRATE, PERGRAMVALUE,TOTALSALESRATE, AMOUNT, MONTHS, INTERESTTYPE, INTEREST, NETPAYABLE, MRI_AMOUNT, PAID_CASH,PAIDPRINCIPAL, PAIDINTEREST, BALANCE, LASTRECEIPTMONTH, NOMINEE, RELATION, REN_FROM_BILLNO,OLD_BILLNO, CCL_BILLNO, ACTIVE, STATUS, COMPANYCODE, ATTENDED_USER, ADDED_USER, ADDED_TIME, CHK_VERIFIED, REMARKS, VOUCHER_SNO, PID, LEDGER_SNO) VALUES ('".$loan_details->LOAN_SNO."','".$loan_details->NAME."','".$mri_bill_no."','AUCTIONED','".$l_date."','".$loan_details->PLEDGEINFO."','".$loan_details->JEWEL_TYPE."','".$loan_details->WEIGHT."','".$loan_details->STONELESS."','".$loan_details->LESS."','".$loan_details->NETWEIGHT."','".$loan_details->QUALITY."','".$loan_details->CURRENTRATE."','".$loan_details->PERGRAMVALUE."','".$loan_details->TOTALSALESRATE."','".$total_mri_loan_amtval."',".$interest_list->PERIOD.",'".$interest_list->INTNAME."',".$interest_list->INTEREST.",'".$total_mri_loan_amtval."','".$int_paid."','".$ren_pay."','0.00','".$int_paid."','".$total_mri_loan_amtval."','0','".$loan_details->NOMINEE."','".$loan_details->RELATION."','".$mri_bill_no."','".$orginalloannumber."','".$ccl_no."','".$mriActive."','".$mriStatus."','".$cmp."','".$_SESSION['username']."','".$_SESSION['username']."','".date('Y-m-d H:i:s')."','N','".$desc."','','".$loan_details->PID."','')");
    
    
      redirect("mri_loan");
   }
   public function loanList()
   {
        // echo '1';
        // exit();
        $search =  $_GET['query']; 
        $rows = $this->Mri_Loan_model->getLoan($search);
        $receiptcount = $this->Mri_Loan_model->getreceiptcount($search);
        //print_r($receiptcount);exit;
        $res='[';
        if(count($rows)>0) {
        foreach($rows as $row)
        {
              $title='';
              $billno='';
              $bill_no=$row->NEWBILLNO;
              $company=$row->COMPANYNAME;
              $loan_dt=date($_SESSION['DATE_PATTERN'],strtotime($row->ENDATE));
              // $ex_dt=date('d-m-Y', strtotime($ln_dt. ' +'.round($result->PERIOD).' months'));
              $expiry_dt=date($_SESSION['DATE_PATTERN'], strtotime($row->ENDATE.' +'.round($row->PERIOD).' months'));
              $loan_amt=$row->AMOUNT;
              $weight=$row->NETWEIGHT;
              $interest=$row->INTERESTTYPE;
              $party=$row->NAME;
              $party_id=$row->PID;
              $orginalbillno = $row->BILLNO;
              
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
                }
              $pledge_info=$this->db->query("select * from PLEDGEINFO WHERE BILLNO='".$orginalbillno."'")->result_array();
             
              $pl_count=count((array)$pledge_info);

              $tbody="";
              foreach ($pledge_info as $plist)
              {
                 
                  $is_damage=($plist['IS_DAMAGE']=='Y')?'Yes':'No';

                  $tbody .= "<tr><td>".$plist['PLEDGENAME']."</td><td>".$plist['DESCRIPTION']."</td><td>".$plist['PURITY']."</td><td>".$plist['PURITY_PERCENT']."</td><td>".$plist['WEIGHT']."</td><td>".$plist['STONEWEIGHT']."</td><td>".$plist['LESS']."</td><td>".$plist['NETWEIGHT']."</td><td>".$is_damage."</td><td><div class='image-input mt-2 me-6' data-kt-image-input='true'><div class='image-input-wrapper w-40px h-40px' style='background-image: url(".base_url()."assets/images/jewel.jpg)'></div></div></td></tr>";
              }

              $tfoot = "<th class='min-w-150px'></th> <th class='min-w-100px'></th><th class='min-w-80px'>Total</th><th class='min-w-80px'>".$row->WEIGHT."</th><th class='min-w-100px'>".$row->STONELESS."</th><th class='min-w-80px'>".$row->LESS."</th><th class='min-w-80px'>".$row->NETWEIGHT."</th><th class='min-w-50px'></th>";



              
              $member_id =$row->MEMBERSHIP_ID;
              $member_points=$row->MEMBERSHIP_POINTS;
              $rating =$row->RATING;
              $phone =$row->PHONE;
              $address=$row->ADDRESS1.", ".$row->ADDRESS2;
              

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
                  $item_photo="<img src='".base_url()."assets/images/jewel.jpg' height='125px' width='125px' >";
               }

              

              $title = $row->NEWBILLNO;

               $res.='{ "title":"'.$title.'","pid": "'.$party_id.'","firstname":"'.$party.'","address":"'.$address.'","rating":"'.$rating.'","phone":"'.$phone.'","member_id":"'.$member_id.'","member_points":"'.$member_points.'","card_type":"'.$card_type.'","inom_det":"'.$inom_det.'","nom_det":"'.$nom_det.'","company":"'.$company.'","loan_amt":"'.$loan_amt.'","interest":"'.$interest.'","weight":"'.$weight.'","pl_count":"'.$pl_count.'","loan_dt":"'.$loan_dt.'","expiry_dt":"'.$expiry_dt.'","loan_amt":"'.$loan_amt.'","bill_no":"'.$bill_no.'","party_photo":"'.$party_photo.'","tfoot":"'.$tfoot.'","tbody":"'.$tbody.'","receiptcount":"'.$receiptcount[0]->receiptcount.'","orginalbillno":"'.$orginalbillno.'"},';

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

          //print_r($bill_no);exit;
          $pid=$this->input->post("pid");
             

               $redemp_details=$this->db->query("select * from REDEMPTIONS where BILLNO='".$bill_no."'")->row();
               $receipt_detail=$this->db->query("select top 1 a.*,b.* from RECEIPT_MASTER a left join LOANS b on b.BILLNO=a.BILLNO where a.BILLNO='".$bill_no."' order by a.ROWNO DESC")->result_array();
               if(isset($receipt_detail))
               {
                  
                  $i=1;
                  $receiptdetailsdata="";
                  foreach($receipt_detail as $receiptval)
                  {
                      //print_r($receiptval);exit;
                      $receipt_count=count($receipt_detail);
                       $receipt_date= date($_SESSION['DATE_PATTERN'],strtotime($receiptval['RECEIPT_DATE']));
                      $expiry_dt=date($_SESSION['DATE_PATTERN'], strtotime($receiptval['ENDATE'].' +'.round($receiptval['MONTHS']).' months'));
                      $receiptdetailsdata .="<tr><td>".$i."</td><td>".$expiry_dt."</td><td>".$receipt_date."</td><td>".$receiptval['INTEREST']."</td><td>".$receiptval['AMOUNT']."</td><td>".$receiptval['INT_AMOUNT']."</td><td>".$receiptval['PAID_TOTAL']."</td><td>".$receiptval['LOAN_BALANCE']."</td></tr>";
                      $i++;
                  }
                  

                 
                
                  // date($_SESSION['DATE_PATTERN'],strtotime($receipt_detail->RECEIPT_DATE))
               }
               else
               {
                  $receiptdetailsdata ="";
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
                  if($data['lt_recetpt_date']){

                      $ln_dt = $data['lt_recetpt_date'][0]['ENDATE'];
                      $month_number = date("d-M-Y",strtotime($ln_dt));
                      $data['last_recetpt_date'] = $month_number;
                  }
                  else{

                      $ln_dt ="";
                      $month_number = date("d-M-Y",strtotime($ln_dt));
                      $data['last_recetpt_date'] = $month_number;
                  }
                  
                 
              }
              
              $data['loan_receipts_details']=$this->Loanreceipt_model->get_loan_receipts_details($bill_no);
                if($data['loan_receipts_details']){
                   $loanreceiptdetails =  $data['loan_receipts_details'][0]['ENDATE'];

                   $intresttypeval = $data['loan_receipts_details'][0]['INTERESTTYPE'];

                   $loanmonthval = $data['loan_receipts_details'][0]['MONTHS'];

                }
                else{
                  $loanreceiptdetails = "";
                   $intresttypeval = "";
                   $loanmonthval = "";
                } 

                if ($ln_dt == $loanreceiptdetails) 
                {
                    $endate = $loanreceiptdetails;
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

                $vIntType = $intresttypeval;
                // $vCalcDate=date('Y-m-d');
                $vCalcDate=isset($redemp_details->RETURNDATE) ? $redemp_details->RETURNDATE : "";
                $vLoanDate = $loanreceiptdetails;
                $vLoanPeriod =  $loanmonthval;

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
              $status = isset($loan_details->LOAN_STATUS) ? $loan_details->LOAN_STATUS : "NULL";
              $loan_stage=$this->db->Query("select * from loan_status where id=".$status)->row();
              $colorcode = isset($loan_stage->color_code) ? $loan_stage->color_code : "";
              $loanstage = isset($loan_stage->loan_stage) ? $loan_stage->loan_stage : "";
              $loan_status='<span style="background-color:'.$colorcode.';border-radius: 8px;padding: 5px 15px 5px 15px;">'.$loanstage.'</span>';
              

              // $int = ($loan_details->AMOUNT*$loan_details->INTEREST)/100;

              $amountval = isset($loan_details->AMOUNT) ? $loan_details->AMOUNT : "0";
              $intrestval = isset($loan_details->INTEREST) ? $loan_details->INTEREST : "0";
              $loanmonthvalue = isset($loan_details->MONTHS) ? $loan_details->MONTHS : "0";
              $int=($amountval*$intrestval*$loanmonthvalue)/100;


              $paid_details=$this->db->query("SELECT SUM(PRINCIPAL) AS PAID_PRINCIPAL,SUM(INT_AMOUNT) AS PAID_INT_AMOUNT FROM RECEIPT_MASTER WHERE BILLNO='".$bill_no."' ")->row();
              if(isset($paid_details))
              {
                $principalamont = isset($paid_details->PAID_PRINCIPAL) ? $paid_details->PAID_PRINCIPAL : "0.00";
                $paidamountval = isset($paid_details->PAID_INT_AMOUNT) ? $paid_details->PAID_INT_AMOUNT : "0.00";
                $pprinc=$principalamont;
                $pint= $paidamountval;
              }
              else
              {
                $pprinc=0;
                $pint=0;
              }

              $rem_princ=$amountval - $pprinc;
              $rem_int=$int - $pint;

              if($loan_details->ITEM_PHOTO!='')
               {
               $item_photo="<img src='data:image/jpg;charset=utf8;base64,".base64_encode($loan_details->ITEM_PHOTO)."'  height='125px' width='125px'>";
               }
               else
               {
                $item_photo="<img src='".base_url()."assets/images/idproof.jpg' height='125px' width='125px' >";
               }
               //print_r($loan_details);exit;

               $receiptcountvalue = isset($receipt_count) ? $receipt_count : "0";

              echo "||".$due_status."||".$receiptcountvalue."||".$receipt_date."||".$days1."||".$months1."||".$loan_details->AMOUNT."||".$int."||".$pprinc."||".$pint."||".$rem_princ."||".$rem_int."||".$item_photo."||".$loan_status."||".$loan_details->WEIGHT."||".$loan_details->STONELESS."||".$loan_details->LESS."||".$loan_details->NETWEIGHT."||".$loan_details->CURRENTRATE."||".$loan_details->QUALITY."||".$loan_details->PERGRAMVALUE."||".$loan_details->TOTALSALESRATE."||".$loan_details->HL_AMOUNT."||".$receiptdetailsdata;
      }
         public function load_popup_receipt_info()
      {

          $bill_no=$this->input->post('bill_no');
          $redemp_details= $this->db->query("select * from REDEMPTIONS where BILLNO='".$bill_no."'")->row();
          $receipt_details= $this->db->query("select * from RECEIPT_MASTER where BILLNO='".$bill_no."'")->result_array();
          $loan_details=$this->db->query("select * from LOANS where BILLNO='".$bill_no."'")->row();
          
            
            $vLoanPeriod = isset($loan_details->MONTHS) ? $loan_details->MONTHS : "0";
            $vIntType = isset($loan_details->INTERESTTYPE) ? $loan_details->MONTHS : "";
            
            $vLoanAmount=isset($loan_details->AMOUNT) ? $loan_details->AMOUNT : "0.00";
            $vLoanIntPercent=isset($loan_details->INTEREST) ? $loan_details->INTEREST : "0.00";
            $vPaidPrincipal=isset($loan_details->PAIDPRINCIPAL) ? $loan_details->PAID_PRINCIPAL : "0.00";
            $vPaidInterest=isset($loan_details->PAIDINTEREST) ? $loan_details->PAIDINTEREST : "0.00";
            $vPaidTotal = $vPaidPrincipal + $vPaidInterest;
            $vLoanBalance = isset($loan_details->BALANCE) ? $loan_details->BALANCE : "0.00";
            $vLoanDate = $loan_details->ENDATE;
            // $vCalcDate=date('Y-m-d');
            // $calc_date=date('Y-m-d');
            $vCalcDate=$redemp_details->RETURNDATE;
            $calc_date=$redemp_details->RETURNDATE;
            $vIntStr="";
            $vFInt = 0;
            $vSInt = 0;
            $vTotalInt = 0;
            $txtPaidPrincipal=0;
            $txtPaidInterest=0;

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
                        }
                        else
                        {
                            $vIntforBaldays = $vNewPrincipal * $vIntMonths * $vCalcInt / 100;
                            $vTotalInt = round($vTotalInt) + $vIntforBaldays;
                            // $vIntStr = $vIntStr . "<tr>". "Principal : " . number_format($vNewPrincipal,2). " Int : " .number_format($vIntforBaldays,2). " Tot : ". number_format(($vNewP2 + $vIntforBaldays),2) . " Period : " . $vExtraDays. " days" . " Rate : " . number_format($vCalcInt,2). "</tr>";
                            $next_edt2=date('Y-m-d',strtotime($next_edt1.' +'.$vFullDays.' days'));

                            $next_edt=$next_edt2;
                              $vIntStr = $vIntStr . "<tr><td>".$next_edt."<br>(".$vFullDays." days)</td><td> - </td><td>". number_format($vCalcInt,2)."</td><td>".number_format(round($vNewPrincipal,2),2)."</td><td>".number_format(round($vIntforBaldays,2),2)."</td><td>0.00</td><td>".number_format(($vNewP2 + $vIntforBaldays),2)."</td></tr>";
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

                              // print_r($vIntStr);
                              // exit();
         echo "||".$vIntStr."||".$vTotalInterest."||".$data['txtPaidPrincipal']."||".$data['txtPaidInterest']."||".$data['txtPaidTotal']."||".$data['txtTotal']."||".$vLoanAmount;
          
      }
  
    public function loan_save()
    {
      

      $data['pid']=$this->input->post('first_name_id_hidden');
      $data['billno']=$billno=$this->input->post('bill_no');
      $data['current_rate']=$this->input->post('current_rate');

      
      $pledge_item = explode(",",implode(",",$this->input->post('pledge_item_hidden')));
      $pledge_description = explode(",",implode(",",$this->input->post('pledge_description_hidden')));
      $pledge_purity = explode(",",implode(",",$this->input->post('pledge_purity_hidden')));
      $pledge_purity_percent = explode(",",implode(",",$this->input->post('pledge_purity_percent_hidden')));
      $pledge_weight = explode(",",implode(",",$this->input->post('pledge_weight_hidden')));
      $pledge_stone_weight = explode(",",implode(",",$this->input->post('pledge_stone_weight_hidden')));
      $pledge_less = explode(",",implode(",",$this->input->post('pledge_less_hidden')));
      $pledge_net_weight = explode(",",implode(",",$this->input->post('pledge_net_weight_hidden')));
      $pledge_is_damage = explode(",",implode(",",$this->input->post('pledge_is_damage_hidden')));
      // $pledge_image = explode(",",implode(",",$this->input->post('pledge_image_hidden')));
      $subcount = count($this->input->post('pledge_item_hidden'));

      $weight=$stone_weight=$less=$net_weight=0;
      $pledge_info=$pledge_summary='';
       for($i=0;$i<$subcount;$i++)
      {
        if($i==0){
          $pledge_info = $pledge_item[$i].'('.$pledge_description[$i].')';
          $pledge_summary = $pledge_purity[$i].'('.$pledge_weight[$i].')';
        }
        else
        {
          $pledge_info.= ', '.$pledge_item[$i].'('.$pledge_description[$i].')';
          $pledge_summary.= ', '.$pledge_purity[$i].'('.$pledge_weight[$i].')';
        }
        $weight+=$pledge_weight[$i];
        $stone_weight+=$pledge_stone_weight[$i];
        $less+=$pledge_less[$i];
        $net_weight+=$pledge_net_weight[$i];

      }
      $data['pledge_info'] = $pledge_info;
      $data['pledge_summary'] = $pledge_summary;
      $data['add_weight_new_loan'] = $weight;
      $data['add_stless_new_loan'] = $stone_weight;
      $data['add_less_new_loan'] = $less;
      $data['add_ntweight_new_loan'] = $net_weight;

      $pledge_max_record = $this->Mri_Loan_model->get_pledge_max_record_by_bill_no($billno);

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
        $pledgedata['pno'] = 'P'.($vMaxPNo+$j);
        $pledgedata['billno'] = $billno;
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
        $this->Mri_Loan_model->insert_pledge_info($pledgedata);
      }

      $data['add_qual_new_loan'] = $this->input->post('add_qual_new_loan');
      if($this->input->post('grm_val_hidden')=='')
      {
        $data['grm_val'] = 0;
      }
      else
      {
        $data['grm_val'] = $this->input->post('grm_val_hidden');
      }
      if($this->input->post('sale_rate_hidden')=='')
      {
        $data['sale_rate'] = 0;
      } 
      else
      {
        $data['sale_rate'] = $this->input->post('sale_rate_hidden');
      }
      $data['TYPE_OF_RECORD']='N';
      $data['redemption_period'] = $this->input->post('redemption_period');
      $dc_amount = $data['doc_charge'] = $this->input->post('doc_charge_hidden');
      $processing_charge = $data['processing_charge'] = $this->input->post('processing_charge');
      $onaccount = $data['hl_amount'] = $this->input->post('on_account');
      $net_pay = $data['net_pay'] = $this->input->post('net_pay');
      $paid_amount = $data['paid_cash'] = $this->input->post('paid_cash');
      $m_points_ad = $data['m_points_ad'] = $this->input->post('m_points_ad');
      $process="New Loan";
      if($m_points_ad>0)
      {
         $card_det=$this->db->query("select * from MEMBERSHIP_CARD where PID='".$data['pid']."'")->row();
         if(isset($card_det))
         {
            // $cust_add_m_point=$this->db->query("UPDATE PARTIES SET MEMBERSHIP_POINTS=MEMBERSHIP_POINTS+".$m_points_ad." WHERE PID='".$data['pid']."'");
            // $card_add_m_point=$this->db->query("UPDATE MEMBERSHIP_CARD SET POINTS=POINTS+".$m_points_ad." WHERE PID='".$data['pid']."'");
            add_member_points($m_points_ad,$data['pid']);
            add_member_card_history($card_det->MEMBERSHIP_NO,$data['pid'],$process,$m_points_ad);
            // $card_history=$this->db->query("INSERT INTO MEMBERSHIP_HISTORY (MEMBERSHIP_NO, PID, LOG_DATE, PROCESS, POINTS_EARNED, CREATED_BY, CREATED_ON) VALUES('".$card_det->MEMBERSHIP_NO."','".$data['pid']."','".date('Y-m-d')."','New Loan','".$m_points_ad."','".$_SESSION['username']."','".date('Y-m-d H:i:s')."')");
        }
      }

      // m_points_ad
      // $data['paid_principal'] = 0;
      // $data['paid_interest'] = $this->input->post('add_aint_new_loan_1');
      $data['balance'] = $this->input->post('loan_amount');
      $loan_amount = $data['loan_amount'] = $this->input->post('loan_amount');

      $res=$this->Mri_Loan_model->loan_sub_detail_insert($data);
      
      redirect('loan');
    }
    public function get_document_charge()
    {
        $loan_amt=$this->input->post('ln_amt');
        $doc_chg=$this->db->query("SELECT * FROM DOC_CHARGE WHERE FROM_AMT<=".$loan_amt." AND TO_AMT>=".$loan_amt)->row();
        $res=$this->Mri_Loan_model->get_member_points($loan_amt);
        echo "||".$doc_chg->DC_AMT."||".$res;
    }

    
   
    public function userList()
      {
        $search =  $_GET['query']; 
        $rows = $this->Mri_Loan_model->getUsers($search);
        $res='[';
        if(count($rows)>0) {
          foreach($rows as $row )
          {
              $title='';
              $name='';
              $firstname=$row->NAME;
              $lastname=$row->LASTNAME_PREFIX.','.$row->FATHERSNAME;
              $address=$row->ADDRESS1.', '.$row->ADDRESS2.', '.$row->CITY;
              $member_id=$row->MEMBERSHIP_ID;
              $member_points=$row->MEMBERSHIP_POINTS;
              
              
              $rating=$row->RATING;
              $phone=$row->PHONE;
              // $party_photo=$row->PHOTO;
              // $id_photo=$row->OTHER_PHOTO;
              // $sign_photo=$row->SIGNATURE;
              $party_photo=base64_encode($row->PHOTO);
              $id_photo=base64_encode($row->OTHER_PHOTO);
              $sign_photo=base64_encode($row->SIGNATURE);
              // $title = $firstname.'&emsp;'.'-'.'&emsp;'.$lastname.'&emsp;'.'-'.'&emsp;'.$address.'&emsp;'.'-'.'&emsp;'.$phone;
              $title = $firstname.'   --   '.$lastname.'   --   '.$address.'   --   '.$phone;
              $res.='{ "title":"'.$title.'","id": "'.$row->PID.'","firstname":"'.$firstname.'","lastname":"'.$lastname.'","member_id":"'.$member_id.'","member_points":"'.$member_points.'","rating":"'.$rating.'","party":"'.$party_photo.'","idproof":"'.$id_photo.'","sign":"'.$sign_photo.'","address":"'.$address.'","phone":"'.$phone.'"},';

              
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
      public function get_int_type_list()
      {
          $val=$this->input->post('group_name');
          $interest_list = $this->Mri_Loan_model->get_interest_list($val);
          $option="<option value=''>Select Int. Type</option>";
          foreach ($interest_list as $nlist) {
            $option.='<option value="'.$nlist['INTID'].'">'.$nlist['INTEREST'].'</option>';
          }
          echo $option;
      }
      public function get_int_due_details()
      {
        $int_type=$this->input->post('itype');
        $int_grp=$this->input->post('grp');
        $ln_dt=date_format(date_create($this->input->post('loan_dt')),'Y-m-d');

        // exit();
        $result  = $this->db->query("SELECT * from INTERESTLIST where INT_GROUP='".$int_grp."' AND ACTIVE='Y' AND INTID='".$int_type."'")->row();
        if($result->LP_TYPE=='Days')
        { 
          $ex_dt=date('d-m-Y', strtotime($ln_dt. ' +'.round($result->PERIOD).' days'));
          $due_dt1=date('d-m-Y', strtotime($ln_dt. ' + 1 days'));
          $due_dt2=date('d-m-Y', strtotime($due_dt1. ' + 1 days'));
          $due_dt3=date('d-m-Y', strtotime($due_dt2. ' + 1 days'));
          $int_1=$result->INTEREST;
          if($result->PERIOD>1)
          {
            $int_2=number_format($result->INTEREST,2);
            $int_3=number_format($result->INTEREST,2);
          }
          else
          {
            $int_2=number_format($result->INTEREST +0.5,2);
            if($int_2>3.5)$int_2=number_format(3.5,2);
            $int_3=number_format($int_2+0.5,2); 
            if($int_3>3.5)$int_3=number_format(3.5,2);

          }
        }
        if($result->LP_TYPE=='Months')
        {
          $ex_dt=date('d-m-Y', strtotime($ln_dt. ' +'.round($result->PERIOD).' months'));
          $due_dt1=date('d-m-Y', strtotime($ln_dt. ' + 1 months'));
          $due_dt2=date('d-m-Y', strtotime($due_dt1. ' + 1 months'));
          $due_dt3=date('d-m-Y', strtotime($due_dt2. ' + 1 months'));
          $int_1=$result->INTEREST;
          if($result->PERIOD>1)
          {
            $int_2=number_format($result->INTEREST,2);
            $int_3=number_format($result->INTEREST,2);
          }
          else
          {
            $int_2=number_format($result->INTEREST +0.5,2);
            if($int_2>3.5)$int_2=number_format(3.5,2);
            $int_3=number_format($int_2+0.5,2); 
            if($int_3>3.5)$int_3=number_format(3.5,2);

          }
        }
        echo '||'.$ex_dt.'||'.$due_dt1.'||'.$due_dt2.'||'.$due_dt3.'||'.$int_1.'||'.$int_2.'||'.$int_3;
      }
      public function get_photo()
      {
         $pid=$this->input->post('id');
         $party_det=$this->db->query("SELECT PHOTO FROM PARTIES WHERE PID='".$pid."'")->row();
         if($party_det->PHOTO!='')
         {
         $div='<img src="data:image/jpg;charset=utf8;base64,'.base64_encode($party_det->PHOTO).'"  height="125px" width="125px">';
         }
         else
         {
          $div='<img src="'.base_url().'assets/images/party.jpg" height="125px" width="125px" >';
         }
         echo $div;
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
      public function pledgedList()
      {
        $search =  $_GET['query']; 
        $rows = $this->Mri_Loan_model->get_pledge_list($search);
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
      public function get_purity_percent()
      {
        $id=$this->input->post('id');
        $percent=$this->db->query("select * from ITEMPURITY WHERE ITEMPURITYID='".$id."'")->row();
        echo ''.$percent->PERCENTAGE;
      }
      public function load_interstval(){

        $inttype=$this->input->post('inttype');
        $intrest = $this->Mri_Loan_model->getintrestval($inttype);
        //print_r($intrest);exit;
        echo json_encode($intrest);
      }

     
}

?>
