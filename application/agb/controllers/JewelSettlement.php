<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/* ************************************************************************************
        Purpose : To handle all the village functions
***************************************************************************************/
class JewelSettlement extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();


        $this->load->model(array("Redemption_model","Accountsgroup_model",
            "Loan_model","Loanreceipt_model","JewelSettlement_model"));
        
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
        $this->session->set_userdata('comtitle', 'Jewel Settlement');
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
      $fdate =" AND R.RETURNDATE='".$data['today_date_fillter']."' ";

     
      $data['dt_fill'] = $this->input->post('dt_fill_loan_list');
      // echo $this->input->post('dt_fill_loan_list');
      $data['from_date_fillter'] = $this->input->post('from_date_fillter_loan_list');
      $data['to_date_fillter'] = $this->input->post('to_date_fillter_loan_list');
      $data['company_filter'] = $this->input->post('company_filter');
      $data['status_filter']=$this->input->post('loan_status_filter');
      $data['loan_no_filter']=$this->input->post('loan_no_filter');
      $data['pname_filter']=$this->input->post('pname_filter');

        // echo $data['dt_fill'];
        // exit();

      if($data['company_filter']=='all' || $data['company_filter']=='')
      {
        $cmp= "";  
      }
      else
      {
        $cmp= " and L.COMPANYCODE='". $data['company_filter']."'";  
      }
      
      if( $data['loan_no_filter']=='')
      {
        $ln_no= "";  
      }
      else
      {
        $ln_no= " and L.BILLNO='". $data['loan_no_filter']."'";  
      }

       if( $data['pname_filter']=='')
      {
        $pname= "";  
      }
      else
      {
        $pname= " and L.NAME='". $data['pname_filter']."'";  
      }

      if($data['status_filter']=='all' || $data['status_filter']=='')
      {
        $status="";
      }
      else
      {
        $status=" and R.CLOSING_TYPE= '".$data['status_filter']."'";
          
      }
// echo $data['dt_fill'];
      
      if($data['dt_fill']=="today")
      {
          $data['today_date_fillter'] = date("Y-m-d");
          $fdate =" AND R.RETURNDATE='".$data['today_date_fillter']."' ";
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
              $fdate =" AND R.RETURNDATE>='".$data['week_from_date_fillter']."'";
              $tdate =" AND R.RETURNDATE<='".$data['week_to_date_fillter']."'";

          }
          else
          {
              $data['week_from_date_fillter']=date(' Y-m-d', strtotime("sunday -1 week"));

              $data['week_to_date_fillter']=date(' Y-m-d', strtotime("saturday 0 week"));
              //  print_r($data['week_to_date_fillter']);exit;
              $fdate =" AND R.RETURNDATE>='".$data['week_from_date_fillter']."'";
            $tdate =" AND R.RETURNDATE<='".$data['week_to_date_fillter']."'";
          }
      }
      if($data['dt_fill']=="monthly")
      {

          $first=date('Y-m-01');
          $last=date('Y-m-t');
          $fdate =" AND R.RETURNDATE>='".$first."'";
          $tdate ="AND R.RETURNDATE<='".$last."'";
      }

      if($data['dt_fill']=="custom Date")
      {
         

          if($data['from_date_fillter']!='')
          {
            $first=date('Y-m-d',strtotime($data['from_date_fillter']));
            $fdate =" AND R.RETURNDATE>='".$first."'";
          }
          else
          {
            $fdate ='';
          }
          if($data['to_date_fillter']!='')
          {
            $last=date('Y-m-d',strtotime($data['to_date_fillter']));
            $tdate =" AND R.RETURNDATE<='".$last."'";
          }
          else
          {
            $tdate ='';
          } 
      }

      // echo $fdate;
      // echo $tdate;
      // exit();
      $data['company_list'] = $this->Loan_model->get_company_list();

      // $data['js_list']=$this->db->query("(SELECT R.RETURNDATE, C.COMPANYNAME, L.BILLNO, P.NAME, P.RATING, L.INTERESTTYPE, L.JEWEL_TYPE, R.PAIDAMOUNT, R.CLOSING_TYPE, R.CHK_RETURNED FROM REDEMPTIONS R, LOANS L, PARTIES P, COMPANY C WHERE L.BILLNO=R.BILLNO AND P.PID=L.PID AND L.COMPANYCODE = C.COMPANYCODE and R.CHK_RETURNED = 'N' and R.CLOSING_TYPE not like '%TRANSFER%') UNION (SELECT R.RETURNDATE, C.COMPANYNAME, L.BILLNO, P.NAME, P.RATING, L.INTERESTTYPE, L.JEWEL_TYPE, R.PAIDAMOUNT, R.CLOSING_TYPE,R.CHK_RETURNED FROM REDEMPTIONS R, LOANS L, PARTIES P, COMPANY C,JEWEL_SETTLEMENT J WHERE L.BILLNO=R.BILLNO AND P.PID=L.PID AND L.COMPANYCODE = C.COMPANYCODE and R.CHK_RETURNED = 'Y' and J.BILLNO=R.BILLNO and R.CLOSING_TYPE not like '%TRANSFER%') order by CHK_RETURNED ")->result_array();

      // $data['js_list']=$this->db->query("select * from ((SELECT R.RETURNDATE, C.COMPANYNAME, L.BILLNO, P.NAME, P.RATING, L.INTERESTTYPE, L.JEWEL_TYPE, R.PAIDAMOUNT, R.CLOSING_TYPE, R.CHK_RETURNED ,ROW_NUMBER() OVER (ORDER BY R.RETURNDATE) AS sl FROM REDEMPTIONS R, LOANS L, PARTIES P, COMPANY C  WHERE L.BILLNO=R.BILLNO AND P.PID=L.PID AND L.COMPANYCODE=C.COMPANYCODE and R.CHK_RETURNED='N'  $fdate $tdate $cmp $status) UNION (SELECT R.RETURNDATE, C.COMPANYNAME, L.BILLNO, P.NAME, P.RATING, L.INTERESTTYPE, L.JEWEL_TYPE, R.PAIDAMOUNT, R.CLOSING_TYPE,R.CHK_RETURNED ,ROW_NUMBER() OVER  (ORDER BY R.RETURNDATE) AS sl  FROM REDEMPTIONS R, LOANS L, PARTIES P, COMPANY C,JEWEL_SETTLEMENT J  WHERE L.BILLNO=R.BILLNO AND P.PID=L.PID AND L.COMPANYCODE=C.COMPANYCODE and R.CHK_RETURNED='Y' and j.BILLNO=r.BILLNO $fdate $tdate $cmp $status))N where sl BETWEEN $offset AND $page_limit  ORDER BY N.CHK_RETURNED ")->result_array();


      // echo "SELECT  * FROM  ( SELECT  *,ROW_NUMBER() OVER (ORDER BY CHK_RETURNED ASC, RETURNDATE DESC ) AS sl  FROM  ( (SELECT R.RETURNDATE, C.COMPANYNAME, L.BILLNO, L.IS_LOCK_OUT, P.NAME, P.RATING, L.INTERESTTYPE, L.JEWEL_TYPE, R.PAIDAMOUNT, R.CLOSING_TYPE, R.CHK_RETURNED  FROM REDEMPTIONS R, LOANS L, PARTIES P, COMPANY C WHERE L.BILLNO=R.BILLNO AND P.PID=L.PID AND L.COMPANYCODE=C.COMPANYCODE and R.CHK_RETURNED='N' and R.CLOSING_TYPE not like '%TRANSFER%' $fdate $tdate $status $cmp $ln_no $pname)  UNION (SELECT R.RETURNDATE, C.COMPANYNAME, L.BILLNO,  L.IS_LOCK_OUT, P.NAME, P.RATING, L.INTERESTTYPE, L.JEWEL_TYPE, R.PAIDAMOUNT, R.CLOSING_TYPE,R.CHK_RETURNED FROM REDEMPTIONS R, LOANS L, PARTIES P, COMPANY C,JEWEL_SETTLEMENT J  WHERE L.BILLNO=R.BILLNO AND P.PID=L.PID AND L.COMPANYCODE=C.COMPANYCODE and R.CHK_RETURNED='Y' and j.BILLNO=r.BILLNO and R.CLOSING_TYPE not like '%TRANSFER%' $fdate $tdate $status $cmp $ln_no $pname) )N  )N  WHERE sl BETWEEN  $offset AND $page_limit";
      // exit();
      $data['js_list']=$this->db->query(" SELECT  * FROM  ( SELECT  *,ROW_NUMBER() OVER (ORDER BY CHK_RETURNED ASC, RETURNDATE DESC ) AS sl  FROM  ( (SELECT R.RETURNDATE, C.COMPANYNAME, L.BILLNO, L.IS_LOCK_OUT, P.NAME, P.RATING, L.INTERESTTYPE, L.JEWEL_TYPE, R.PAIDAMOUNT, R.CLOSING_TYPE, R.CHK_RETURNED,R.TOTALPAY  FROM REDEMPTIONS R, LOANS L, PARTIES P, COMPANY C WHERE L.BILLNO=R.BILLNO AND P.PID=L.PID AND L.COMPANYCODE=C.COMPANYCODE and R.CHK_RETURNED='N' and R.CLOSING_TYPE not like '%TRANSFER%' $fdate $tdate $status $cmp $ln_no $pname)  UNION (SELECT R.RETURNDATE, C.COMPANYNAME, L.BILLNO,  L.IS_LOCK_OUT, P.NAME, P.RATING, L.INTERESTTYPE, L.JEWEL_TYPE, R.PAIDAMOUNT, R.CLOSING_TYPE,R.CHK_RETURNED,R.TOTALPAY FROM REDEMPTIONS R, LOANS L, PARTIES P, COMPANY C,JEWEL_SETTLEMENT J  WHERE L.BILLNO=R.BILLNO AND P.PID=L.PID AND L.COMPANYCODE=C.COMPANYCODE and R.CHK_RETURNED='Y' and j.BILLNO=r.BILLNO and R.CLOSING_TYPE not like '%TRANSFER%' $fdate $tdate $status $cmp $ln_no $pname) )N  )N  WHERE sl BETWEEN  $offset AND $page_limit")->result_array();

      $res_count=$this->db->query("(SELECT R.RETURNDATE, C.COMPANYNAME, L.BILLNO,  L.IS_LOCK_OUT, P.NAME, P.RATING, L.INTERESTTYPE, L.JEWEL_TYPE, R.PAIDAMOUNT, R.CLOSING_TYPE, R.CHK_RETURNED FROM REDEMPTIONS R, LOANS L, PARTIES P, COMPANY C WHERE L.BILLNO=R.BILLNO AND P.PID=L.PID AND L.COMPANYCODE=C.COMPANYCODE and R.CHK_RETURNED='N' and R.CLOSING_TYPE not like '%TRANSFER%' $fdate $tdate $status $cmp $ln_no $pname) UNION (SELECT R.RETURNDATE, C.COMPANYNAME, L.BILLNO, L.IS_LOCK_OUT, P.NAME, P.RATING, L.INTERESTTYPE, L.JEWEL_TYPE, R.PAIDAMOUNT, R.CLOSING_TYPE,R.CHK_RETURNED  FROM REDEMPTIONS R, LOANS L, PARTIES P, COMPANY C,JEWEL_SETTLEMENT J  WHERE L.BILLNO=R.BILLNO AND P.PID=L.PID AND L.COMPANYCODE=C.COMPANYCODE and R.CHK_RETURNED='Y' and j.BILLNO=r.BILLNO and R.CLOSING_TYPE not like '%TRANSFER%' $fdate $tdate $status $cmp $ln_no $pname) ")->result_array();
      $data['row_count']=count((array) $res_count);
        $this->load->view('jewel_settlement/jewel_settlement_list',$data);
        
    }

    public function jewel_settlement_add($id)
    {

        $bill_no=str_replace('_', "/", $id);
       $loan_details=$data['loan_details'] = $this->db->query("select * from LOANS where BILLNO='".$bill_no."'")->row();

       $redemp_details=$data['redemp_details'] = $this->db->query("select * from REDEMPTIONS where BILLNO='".$bill_no."'")->row();
       

       if($loan_details->CLOSING_STATUS=='CUSTOMER_CLOSE')
         $data['due_status']='<span style="background-color:#ffdf6f;border-radius: 8px;padding: 5px 15px 5px 15px;">Customer Close</span>';
        else if($loan_details->CLOSING_STATUS=='COMPANY_CLOSE')
          $data['due_status']='<span style="background-color:#b0dfff;border-radius: 8px;padding: 5px 15px 5px 15px;">Company Close</span>';
        
        else if($loan_details->CLOSING_STATUS=='CUSTOMER_SALE')
          $data['due_status']='<span style="background-color:#fbe2d5;border-radius: 8px;padding: 5px 15px 5px 15px;">Customer Sale</span>';
          
        else if($loan_details->CLOSING_STATUS=='MULTI_JEWEL')
          $data['due_status']='<span style="background-color:#a3ff9b;border-radius: 8px;padding: 5px 15px 5px 15px;">Multi Jewel</span>';
        

       $pledge_details=$data['pledge_details']=$this->db->query("select * from PLEDGEINFO where BILLNO='".$bill_no."'")->result_array();

       $data['pledge_count']=count((array)$data['pledge_details']);
        $data['pl_tbody']="";
              foreach ($pledge_details as $plist) {
                $is_damage=($plist['IS_DAMAGE']=='Y')?'Yes':'No';
               $data['pl_tbody'] .= "<tr><td>".$plist['PLEDGENAME']."</td><td>".$plist['PURITY']."</td><td>".$plist['PURITY_PERCENT']."</td><td>".$plist['WEIGHT']."</td><td>".$plist['STONEWEIGHT']."</td><td>".$plist['LESS']."</td><td>".$plist['NETWEIGHT']."</td><td><div class='image-input mt-2 me-6' data-kt-image-input='true'><div class='image-input-wrapper w-40px h-40px' style='background-image: url(assets/images/jewel.jpg)'></div></div></td></tr>";
              }

               $data['pl_tfoot'] = "<th class='min-w-150px'></th> <th class='min-w-100px'></th><th class='min-w-80px'>Total</th><th class='min-w-80px'>".$loan_details->WEIGHT."</th><th class='min-w-100px'>".$loan_details->STONELESS."</th><th class='min-w-80px'>".$loan_details->LESS."</th><th class='min-w-80px'>".$loan_details->NETWEIGHT."</th><th class='min-w-50px'></th>";
       $bj_count=0;
       foreach ($pledge_details as $plist) {
          if($plist['STATUS']=='BANK')
          {
              $bj_count+=  1;
          }
         
       }
       if($bj_count>1)
       {
          $data['bj_status']='<span class="btn btn-icon btn-circle w-15px h-15px fs-7 fw-bold shadow text-white mb-1" style="background:red;width: 25px !important;height: 25px !important;">BJ</span>';
       }
       else
       {
            $data['bj_status']='<span class="btn btn-icon btn-circle w-15px h-15px fs-7 fw-bold shadow text-white mb-1" style="background:red;width: 25px !important;height: 25px !important;">LI</span>';
       }

       if($redemp_details->CHK_RETURNED=='Y')
       {
          $data['bj_status']='';
       }

       // New loan details fetch after Redemption
       if(isset($redemp_details->NEWBILLNO))
       {
         $new_loan_details=$data['new_loan_details']= $this->db->query("select * from LOANS where BILLNO='".$redemp_details->NEWBILLNO."'")->row();
         // print_r($new_loan_details);
         if(isset($new_loan_details->BILLNO))
         $new_pledge_details=$data['new_pledge_details']=$this->db->query("select * from PLEDGEINFO where BILLNO='".$new_loan_details->BILLNO."'")->result_array();
       }  
       // print_r($new_pledge_details); 
       // exit();
       $nominee_det=$this->db->query("select * from  NOMINEE where NOMINEE_ID='".$loan_details->NOMINEE_ID. "' and PID='".$loan_details->PID."'")->row();
        if(isset($nominee_det))
        {
          
          $data['nom_det']=$nominee_det->NOMINEE_NAME." - ".$nominee_det->RELATION." - ".$nominee_det->MOBILE_NO;
          // $nom_det=$nominee_det->NOMINEE_NAME;
        }
        else
        {
          $data['nom_det']=$loan_details->NOMINEE." - ".$loan_details->RELATION;
          // $nom_det=$row->NOMINEE;
        }
              
       $party_details=$data['party_details'] = $this->db->query("select PID,STREET_ID, NAME, DOORNO, ADDRESS1, ADDRESS2, CITY, AREA, ZONE_SNO, PHONE,PHOTO, OTHER_PHOTO, RATING, TYPE_OF_RECORD, SIGNATURE from PARTIES where PID='".$loan_details->PID."'")->row();
       $card_details=$data['card_details']=$this->db->query("select * from MEMBERSHIP_CARD where PID='".$loan_details->PID."'")->row();

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
            $vpIntStr="";
            $vFInt = 0;
            $vSInt = 0;
            $vTotalInt = 0;
            $txtPaidPrincipal=0;
            $txtPaidInterest=0;
            $data['txtPaidPrincipal']=0;
            $data['txtPaidInterest']=0;
            $p= 0;

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
                            $next_edt=$data['vLoanLastDate'];
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
                            $next_edt=$data['vLoanLastDate'];
                            $next_edt1=date('Y-m-d',strtotime($next_edt.' +'.$p.' months'));
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
                // $vIntStr = $vIntStr . "<tr><td></td><td></td><td><b>Total</b> </td> <td><b>".$vLoanAmount."</b></td><td> <b>" . number_format($vTotalInterest,2)."</b></td>";
                 $vpIntStr = $vpIntStr . "<tr><td></td><td><b>Total</b> </td> <td><b>".$vLoanAmount."</b></td><td> <b>" . number_format($vTotalInterest,2)."</b></td>";
                // $vIntStr = $vIntStr . "    Total Amount : " .number_format(($vLoanAmount + $vTotalInterest),2)."</td>";
                // $vIntStr = $vIntStr ."<td><b>" .number_format($vTotalPaidAmount,2)."</b></td>";
                // $vIntStr = $vIntStr ."<td><b>".number_format($vNetAmount,2)."</b></td></tr>";
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

                    $vIntStr = $vIntStr . "<tr><td></td><td>-</td><td>".number_format($vLoanIntPercent,2)."</td><td>".number_format(round($vLoanAmount,2),2)."</td><td>".number_format(round($data['txtInterest'],2),2)."</td><td>0.00</td><td>".number_format(($vLoanAmount + $data['txtInterest']),2)."</td></tr>";

                    $vpIntStr = $vpIntStr . "<tr><td></td><td>".number_format($vIntPerMonth,2)."</td><td>".number_format(round($vLoanAmount,2),2)."</td><td>".number_format(round($data['txtInterest'],2),2)."</td><td>0.00</td><td>".number_format(($vLoanAmount + $data['txtInterest']),2)."</td></tr>";

                    $data['vIntStr'] = $vIntStr;
                    $data['vpIntStr'] = $vpIntStr;
                 }
            }
         $data['vTotalInterest'] = $vTotalInterest;
         $data['vLoanAmount'] = $vLoanAmount;
         $data['company_list']=$this->Loan_model->get_company_list();
         // echo "||".$vIntStr."||".$vTotalInterest."||".$data['txtPaidPrincipal']."||".$data['txtPaidInterest']."||".$data['txtPaidTotal']."||".$data['txtTotal']."||".$vLoanAmount."||".$vpIntStr;

      $this->load->view('jewel_settlement/jewel_settlement_add',$data);
    }

    public function fsd_view($id)
    {

        $bill_no=str_replace('_', "/", $id);
       $loan_details=$data['loan_details'] = $this->db->query("select * from LOANS where BILLNO='".$bill_no."'")->row();

       $redemp_details=$data['redemp_details'] = $this->db->query("select * from REDEMPTIONS where BILLNO='".$bill_no."'")->row();

       $jewelsettle_details=$data['jewelsettle_details'] = $this->db->query("select * from JEWEL_SETTLEMENT where BILLNO='".$bill_no."'")->row();
       
       $data['membership_details']= $this->db->query("select * from MEMBERSHIP_CARD where PID='".$data['loan_details']->PID."'")->row();

       if($loan_details->CLOSING_STATUS=='CUSTOMER_CLOSE')
         $data['due_status']='<span style="background-color:#ffdf6f;border-radius: 8px;padding: 5px 15px 5px 15px;">Customer Close</span>';
        else if($loan_details->CLOSING_STATUS=='COMPANY_CLOSE')
          $data['due_status']='<span style="background-color:#b0dfff;border-radius: 8px;padding: 5px 15px 5px 15px;">Company Close</span>';
        
        else if($loan_details->CLOSING_STATUS=='CUSTOMER_SALE')
          $data['due_status']='<span style="background-color:#fbe2d5;border-radius: 8px;padding: 5px 15px 5px 15px;">Customer Sale</span>';
          
        else if($loan_details->CLOSING_STATUS=='MULTI_JEWEL')
          $data['due_status']='<span style="background-color:#a3ff9b;border-radius: 8px;padding: 5px 15px 5px 15px;">Multi Jewel</span>';
        

       $pledge_details=$data['pledge_details']=$this->db->query("select * from PLEDGEINFO where BILLNO='".$bill_no."'")->result_array();

       $data['pledge_count']=count((array)$data['pledge_details']);
        $data['pl_tbody']="";
              foreach ($pledge_details as $plist) {
                $is_damage=($plist['IS_DAMAGE']=='Y')?'Yes':'No';
               $data['pl_tbody'] .= "<tr><td>".$plist['PLEDGENAME']."</td><td>".$plist['PURITY']."</td><td>".$plist['PURITY_PERCENT']."</td><td>".$plist['WEIGHT']."</td><td>".$plist['STONEWEIGHT']."</td><td>".$plist['LESS']."</td><td>".$plist['NETWEIGHT']."</td><td><div class='image-input mt-2 me-6' data-kt-image-input='true'><div class='image-input-wrapper w-40px h-40px' style='background-image: url(assets/images/jewel.jpg)'></div></div></td></tr>";
              }

               $data['pl_tfoot'] = "<th class='min-w-150px'></th> <th class='min-w-100px'></th><th class='min-w-80px'>Total</th><th class='min-w-80px'>".$loan_details->WEIGHT."</th><th class='min-w-100px'>".$loan_details->STONELESS."</th><th class='min-w-80px'>".$loan_details->LESS."</th><th class='min-w-80px'>".$loan_details->NETWEIGHT."</th><th class='min-w-50px'></th>";
       $bj_count=0;
       foreach ($pledge_details as $plist) {
          if($plist['STATUS']=='BANK')
          {
              $bj_count+=  1;
          }
         
       }
       if($bj_count>1)
       {
          $data['bj_status']='<span class="btn btn-icon btn-circle w-15px h-15px fs-7 fw-bold shadow text-white mb-1" style="background:red;width: 25px !important;height: 25px !important;">BJ</span>';
       }
       else
       {
            $data['bj_status']='<span class="btn btn-icon btn-circle w-15px h-15px fs-7 fw-bold shadow text-white mb-1" style="background:red;width: 25px !important;height: 25px !important;">LI</span>';
       }

       if($redemp_details->CHK_RETURNED=='Y')
       {
          $data['bj_status']='';
       }

       // New loan details fetch after Redemption
       if(isset($redemp_details->NEWBILLNO))
       {
         $new_loan_details=$data['new_loan_details']= $this->db->query("select * from LOANS where BILLNO='".$redemp_details->NEWBILLNO."'")->row();
         // print_r($new_loan_details);
         if(isset($new_loan_details->BILLNO))
         $new_pledge_details=$data['new_pledge_details']=$this->db->query("select * from PLEDGEINFO where BILLNO='".$new_loan_details->BILLNO."'")->result_array();
       }  
       // print_r($new_pledge_details); 
       // exit();
       $nominee_det=$this->db->query("select * from  NOMINEE where NOMINEE_ID='".$loan_details->NOMINEE_ID. "' and PID='".$loan_details->PID."'")->row();
        if(isset($nominee_det))
        {
          
          $data['nom_det']=$nominee_det->NOMINEE_NAME." - ".$nominee_det->RELATION." - ".$nominee_det->MOBILE_NO;
          // $nom_det=$nominee_det->NOMINEE_NAME;
        }
        else
        {
          $data['nom_det']=$loan_details->NOMINEE." - ".$loan_details->RELATION;
          // $nom_det=$row->NOMINEE;
        }
              
       $party_details=$data['party_details'] = $this->db->query("select PID,STREET_ID, NAME, DOORNO, ADDRESS1, ADDRESS2, CITY, AREA, ZONE_SNO, PHONE,PHOTO, OTHER_PHOTO, RATING, TYPE_OF_RECORD, SIGNATURE from PARTIES where PID='".$loan_details->PID."'")->row();
       $card_details=$data['card_details']=$this->db->query("select * from MEMBERSHIP_CARD where PID='".$loan_details->PID."'")->row();

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
            $vpIntStr="";
            $vFInt = 0;
            $vSInt = 0;
            $vTotalInt = 0;
            $txtPaidPrincipal=0;
            $txtPaidInterest=0;
            $data['txtPaidPrincipal']=0;
            $data['txtPaidInterest']=0;
            $p= 0;

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
                            $next_edt=$data['vLoanLastDate'];
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
                            $next_edt=$data['vLoanLastDate'];
                            $next_edt1=date('Y-m-d',strtotime($next_edt.' +'.$p.' months'));
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
                // $vIntStr = $vIntStr . "<tr><td></td><td></td><td><b>Total</b> </td> <td><b>".$vLoanAmount."</b></td><td> <b>" . number_format($vTotalInterest,2)."</b></td>";
                 $vpIntStr = $vpIntStr . "<tr><td></td><td><b>Total</b> </td> <td><b>".$vLoanAmount."</b></td><td> <b>" . number_format($vTotalInterest,2)."</b></td>";
                // $vIntStr = $vIntStr . "    Total Amount : " .number_format(($vLoanAmount + $vTotalInterest),2)."</td>";
                // $vIntStr = $vIntStr ."<td><b>" .number_format($vTotalPaidAmount,2)."</b></td>";
                // $vIntStr = $vIntStr ."<td><b>".number_format($vNetAmount,2)."</b></td></tr>";
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

                    $vIntStr = $vIntStr . "<tr><td></td><td>-</td><td>".number_format($vLoanIntPercent,2)."</td><td>".number_format(round($vLoanAmount,2),2)."</td><td>".number_format(round($data['txtInterest'],2),2)."</td><td>0.00</td><td>".number_format(($vLoanAmount + $data['txtInterest']),2)."</td></tr>";

                    $vpIntStr = $vpIntStr . "<tr><td></td><td>".number_format($vIntPerMonth,2)."</td><td>".number_format(round($vLoanAmount,2),2)."</td><td>".number_format(round($data['txtInterest'],2),2)."</td><td>0.00</td><td>".number_format(($vLoanAmount + $data['txtInterest']),2)."</td></tr>";

                    $data['vIntStr'] = $vIntStr;
                    $data['vpIntStr'] = $vpIntStr;
                 }
            }
         $data['vTotalInterest'] = $vTotalInterest;
         $data['vLoanAmount'] = $vLoanAmount;
         $data['company_list']=$this->Loan_model->get_company_list();
         // echo "||".$vIntStr."||".$vTotalInterest."||".$data['txtPaidPrincipal']."||".$data['txtPaidInterest']."||".$data['txtPaidTotal']."||".$data['txtTotal']."||".$vLoanAmount."||".$vpIntStr;

         //print_r($data);exit;
      $this->load->view('jewel_settlement/fsd_view',$data);
    }

    public function jewelsettelement_save()
    {
        $type= $this->input->post('close_type');
        $bill_no= $this->input->post('bill_no');
       $sno='';
       $key_val=$this->db->query("select * from KEYMASTER where KEYNAME = 'FSD-".$_SESSION['LOANPREFIX']."'")->row();
       $uid=$key_val->KEYVALUE+1;
       $val=str_pad($uid,2,0,STR_PAD_LEFT);
       $sno=$_SESSION['LOANPREFIX'].$val;
       $red_res=$this->db->query("select * from REDEMPTIONS where BILLNO='".$bill_no."'")->row();
      

        $this->db->query("INSERT INTO JEWEL_SETTLEMENT(BILLNO, PID, NAME, ISSUE_DATE, RETURNDATE,NETPAYABLE, ISSUED_TO, ISSUED_NAME, ADDED_USER,ADDED_TIME,SNO) VALUES('".$bill_no."','".$red_res->PID."','".$red_res->NAME."','".date('Y-m-d')."','".$red_res->RETURNDATE."','".$red_res->TOTALPAY."','".$red_res->CLOSED_BY."','".$red_res->CLOSED_NAME."','".$_SESSION['username']."','".date('Y-m-d H:i:s')."','".$sno."')");
          save_query_in_log();

          $this->db->query("UPDATE REDEMPTIONS SET CHK_RETURNED='Y',JEWEL_RETURN_DATE='".date('Y-m-d')."' where BILLNO='".$bill_no."'");
          save_query_in_log();
          $this->db->query("UPDATE LOANS SET LOAN_STATUS=15 where BILLNO='".$bill_no."'");
          $this->db->query("UPDATE KEYMASTER SET KEYVALUE = KEYVALUE+1 where KEYNAME='FSD-".$_SESSION['LOANPREFIX']."'");
          save_query_in_log();
          $this->load->view('jewel_settlement/jewel_settlement_list',$data);
       
    }
     public function js_update_pledge($id)
    {

        $bill_no=str_replace('_', "/", $id);
        $loan_details=$this->db->query("select * from  REDEMPTIONS where BILLNO='".$bill_no."'")->row();
        $pledge_info= $this->db->query("select * from  REDEMPTIONS where BILLNO='".$bill_no."'")->result_array();
         $data['pl_count']=$pl_count=count((array)$pledge_info);
        $pl_tbody="";
        $per_grm_val=$loan_details->AMOUNT/$loan_details->NETWEIGHT;
        // $per_ln_less=$loan_details->WEIGHT-$loan_details->LESS-$loan_details->STONELESS;
        $pl_less=($loan_details->LESS+$loan_details->STONELESS)/$pl_count;
        $per_pl_less=$loan_details->LESS/$pl_count;
        $per_pl_stone_less=$loan_details->STONELESS/$pl_count;
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

    }
    public function js_lock_out()
    {
        $bno=$this->input->post('billno');
        $res= $this->db->query("UPDATE LOANS SET IS_LOCK_OUT=1 WHERE BILLNO='".$bno."'");
        return $res;

    }
    public function load_pledge_to_update()
    {
        $bill_no=$this->input->post('billno');
        $data['loan_details']=$this->db->query("SELECT * FROM LOANS where BILLNO='".$bill_no."'")->row();
        $chk_upd_pledge=$this->db->query("SELECT * FROM FSD_UPDATED_PLEDGEINFO where BILLNO='".$bill_no."'")->result_array();
        $data['new_count']=count((array)$chk_upd_pledge);
        if(count((array)$chk_upd_pledge)>0)
        {
            $data['pledge_list']=$this->db->query("SELECT * FROM FSD_UPDATED_PLEDGEINFO where BILLNO='".$bill_no."'")->result_array();
        }
        else
        {
          $data['pledge_list']=$this->db->query("SELECT * FROM PLEDGEINFO where BILLNO='".$bill_no."'")->result_array();
        }
        $this->load->view("jewel_settlement/js_load_pledge",$data);
    }
    public function js_load_sale_value_request()
    {
        $bill_no=$this->input->post('billno');
        $data['loan_details']=$loan_details=$this->db->query("SELECT * FROM LOANS where BILLNO='".$bill_no."'")->row();
        $data['redemption_details']=$redemption_details=$this->db->query("SELECT * FROM REDEMPTIONS where BILLNO='".$bill_no."'")->row();
        
        $data['upd_pledge_list']=$this->db->query("SELECT * FROM FSD_UPDATED_PLEDGEINFO where BILLNO='".$bill_no."'")->result_array();

                      $receipt_detail=$this->db->query("select top 1 * from RECEIPT_MASTER where BILLNO='".$loan_details->BILLNO."' order by ROWNO DESC")->row();
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
                              $data['lt_recetpt_date'] = $this->Loanreceipt_model->get_loan_receipts_details($loan_details->BILLNO);
                                $ln_dt = $data['lt_recetpt_date'][0]['ENDATE'];
                                $month_number = date("d-M-Y",strtotime($ln_dt));
                                $data['last_recetpt_date'] = $month_number;
                               
                            }
                            
                            $data['loan_receipts_details']=$this->Loanreceipt_model->get_loan_receipts_details($loan_details->BILLNO);
                              if ($ln_dt == $data['loan_receipts_details'][0]['ENDATE']) 
                              {
                                  $endate = $data['loan_receipts_details'][0]['ENDATE'];
                                  $sd = $endate.' '.'00:00:00';
                                  $e = $redemption_details->RETURNDATE;
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
                                  $e = $redemption_details->RETURNDATE;
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
                      $vCalcDate=$redemption_details->RETURNDATE;
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
                            $bill_no=$loan_details->BILLNO;
                      $vLoanPeriod = $loan_details->MONTHS;
                            $vIntType = $loan_details->INTERESTTYPE;
                            
                            $vLoanAmount=$loan_details->AMOUNT;
                            $vLoanIntPercent=$loan_details->INTEREST;
                            $vPaidPrincipal=$loan_details->PAIDPRINCIPAL;
                            $vPaidInterest=$loan_details->PAIDINTEREST;
                            $vPaidTotal = $vPaidPrincipal + $vPaidInterest;
                            $vLoanBalance = $loan_details->BALANCE;
                            $vLoanDate = $loan_details->ENDATE;
                            $vCalcDate=$redemption_details->RETURNDATE;
                            $calc_date=$redemption_details->RETURNDATE;
                            $vIntStr="";
                            $vFInt = 0;
                            $vSInt = 0;
                            $vTotalInt = 0;
                            $txtPaidPrincipal=0;
                            $txtPaidInterest=0;
                            $data['txtPaidPrincipal']=0;
                            $data['txtPaidInterest']=0;
                            $vpIntStr='-';
                            $vTotalInterest=0;


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
                                $next_edt='';
                                $next_edt1='';
                                $next_edt2='';
                                
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
                                        
                                        $vPerDayInterest=$vLoanAmount*10/10000;
                                        $vNewP=$vLoanAmount+($vLoanPeriod * $vPerDayInterest) - $vPaidTotal;
                                        $vNewP2=$vNewP;
                                        $vNewPrincipal=$vNewP;
                                    }
                                    else
                                    {
                                       
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
                                        
                                    }
                                    else
                                    {
                                         $edt=$data['vLoanLastDate'];
                                          $next_edt=$data['vLoanLastDate'];
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
                                           
                                            $next_edt1=date('Y-m-d',strtotime($next_edt.' +'.$p.' months'));
                                            $next_edt=$next_edt1;
                                            
                                            

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

                                           
                                            $next_edt2=date('Y-m-d',strtotime($next_edt1.' +'.$vExtraDays.' days'));

                                            $next_edt=$next_edt2;
                                           
                                        }
                                        else
                                        {
                                            $vIntforBaldays = $vNewPrincipal * $vIntMonths * $vCalcInt / 100;
                                            $vTotalInt = round($vTotalInt) + $vIntforBaldays;
                                            
                                            $next_edt2=date('Y-m-d',strtotime($next_edt1.' +'.$vFullDays.' days'));

                                            $next_edt=$next_edt2;
                                              
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
                                            
                                            $vPerDayInterest = ($vNewP2 * $vCalcInt) / 3000;
                                           
                                            $vSInt = ($p * $vPerDayInterest);
                                            $vTotalInt = round($vTotalInt) + $vSInt;
                                            
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
                                    else if($vDays>=24 && $vDays<=31)
                                    {
                                        $vIntMonths=$vIntMonths+1;
                                    }
                                }
                                
                                // Dim vIntpercent As Single, vIntPerMonth As Single
                                // $data['lblTotalMonths']  = "Total : " . $vIntMonths;
                                $vIntpercent = $loan_details->INTEREST/100;
                                
                                // $data['lblODStatus']="NORMAL";
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
                                    // $data['lbldays']=$vFullDays." days";
                                    $data['lblTotalMonths']="Total : ".$vFullDays." days";
                                    $data['txtMonths']="0";
                                }           
                                $data['txtTotal'] =$data['txtPrincipal']+$data['txtInterest'];
                                $data['txtTotalPay']=$data['txtTotal']-$data['txtPaidTotal'];
                                
                                
                            }
                            $data['calc_value']=($loan_details->AMOUNT - $data['txtPaidPrincipal']) + ($vTotalInterest - $data['txtPaidInterest']);

        $this->load->view("jewel_settlement/js_sale_list_request",$data);
    }
    public function send_to_ccl_sale_list()
    {
        $bill_no=$this->input->post('bill_no');
        $cmp=$this->input->post('company_code');
        $pid=$this->input->post('party_id');   

        $pl_amt=$this->input->post('p_l_amount');
        $pl_status=$this->input->post('is_profit_loss');
        $ccl_sale_amt=$this->input->post('ccl_sale_amt');
        $orgnl_sale_amt=$this->input->post('orgnl_sale_value');
        $sell_to_company='004';

        $ccl_res= $this->db->query("INSERT INTO ccl_sale_list (ccl_date,company_code,billno,orgnl_sale_amt,curr_sales_amount,is_profit_loss,profit_loss_amount,pid,ccl_status,description,created_on,created_by,status,sell_to_company) VALUES('".date('Y-m-d')."','".$cmp."','".$bill_no."','".$orgnl_sale_amt."','".$ccl_sale_amt."','".$pl_status."','".$pl_amt."','".$pid."','Request','','".date('Y-m-d H:i:s')."','".$_SESSION['username']."',0,'".$sell_to_company."')");

        $last_ccl=$this->db->query("Select top 1 ccl_sale_list_id from ccl_sale_list where billno='".$bill_no."' and pid='".$pid."' order by created_on desc")->row();

        $ccl_hist_res= $this->db->query("INSERT INTO ccl_sale_req_rej_history (ccl_sale_id, req_rej_date,is_req_rej, description, created_on,created_by,status,new_sales_amount) VALUES('".$last_ccl->ccl_sale_list."','".date('Y-m-d H:i:s ')."','Request','','".date('Y-m-d H:i:s')."','".$_SESSION['username']."',0,".$ccl_sale_amt.")");

          $upd=$this->db->query("UPDATE LOANS SET IS_LOCK_OUT=3 WHERE BILLNO='".$bill_no."'");
          $upd=$this->db->query("UPDATE REDEMPTIONS SET CHK_RETURNED='Y' WHERE BILLNO='".$bill_no."'");
          
          save_query_in_log();
          redirect("ccl_sale_list");
    }

    public function fsd_update_pledges()
    {
        $bill_no=$this->input->post('bill_no');
        $pl_name = $this->input->post('pledge_name');
        $pl_desc = $this->input->post('pledge_description');
        $pl_old_id = $this->input->post('old_pledge_id');
        $pl_purity = $this->input->post('pledge_purity');
        $pl_pur_per = $this->input->post('pledge_pur_percent');
        $pl_weight = $this->input->post('pledge_weight');
        $pl_stone_less = $this->input->post('pledge_stone_weight');
        $pl_less = $this->input->post('pledge_less');
        // $pl_net_weight = $this->input->post('pledge_net_weight');
        $pl_old_rate = $this->input->post('old_rate');
        $pl_cur_rate = $this->input->post('cur_rate');
        // $this->input->post('pledge_image');
        $sub_cnt=count((array)$pl_name);
        // echo $sub_cnt;

        $chk_upd_pledge=$this->db->query("SELECT * FROM FSD_UPDATED_PLEDGEINFO where BILLNO='".$bill_no."'")->result_array();
        // $data['new_count']=count((array)$chk_upd_pledge);

        if(count((array)$chk_upd_pledge)>0)
        {
          for($i=0;$i<$sub_cnt;$i++)
          {
            $pl_net_weight= $pl_weight[$i]- $pl_stone_less[$i]- $pl_less[$i] ;
            // echo "UPDATE FSD_UPDATED_PLEDGEINFO SET PURITY='".$pl_purity[$i]."', WEIGHT='".$pl_weight[$i]."', PURITY_PERCENT='".$pl_pur_per[$i]."', STONEWEIGHT='".$pl_stone_less[$i]."', LESS='".$pl_stone_less[$i]."', NETWEIGHT='".$pl_net_weight."',CURRENT_RATE='".$pl_cur_rate."' WHERE  OLD_PLEDGE_ID='".$pl_old_id[$i]."' and BILLNO='".$bill_no."'";
            $res= $this->db->query("UPDATE FSD_UPDATED_PLEDGEINFO SET PURITY='".$pl_purity[$i]."', WEIGHT='".$pl_weight[$i]."', PURITY_PERCENT='".$pl_pur_per[$i]."', STONEWEIGHT='".$pl_stone_less[$i]."', LESS='".$pl_less[$i]."', NETWEIGHT='".$pl_net_weight."',CURRENT_RATE='".$pl_cur_rate."' WHERE  OLD_PLEDGE_ID='".$pl_old_id[$i]."' and BILLNO='".$bill_no."'");
                  save_query_in_log();
          }
        }
        else
        {
            for($i=0;$i<$sub_cnt;$i++)
            {
              $pl_net_weight= $pl_weight[$i]- $pl_stone_less[$i]- $pl_less[$i] ;
                // echo "<br>INSERT INTO FSD_UPDATED_PLEDGEINFO( BILLNO, PLEDGENAME, DESCRIPTION, PURITY,  WEIGHT, PURITY_PERCENT, STONEWEIGHT, LESS, NETWEIGHT,  OLD_PLEDGE_ID, OLD_PLEDGE_RATE, CURRENT_RATE) VALUES('".$bill_no."','".$pl_name[$i]."','".$pl_desc[$i]."','".$pl_purity[$i]."','".$pl_weight[$i]."','".$pl_pur_per[$i]."','".$pl_stone_less[$i]."','".$pl_less[$i]."','".$pl_net_weight[$i]."','".$pl_old_id[$i]."','".$pl_old_rate."','".$pl_cur_rate."')<br>";
                $res= $this->db->query("INSERT INTO FSD_UPDATED_PLEDGEINFO( BILLNO, PLEDGENAME, DESCRIPTION, PURITY,  WEIGHT, PURITY_PERCENT, STONEWEIGHT, LESS, NETWEIGHT,  OLD_PLEDGE_ID, OLD_PLEDGE_RATE, CURRENT_RATE) VALUES('".$bill_no."','".$pl_name[$i]."','".$pl_desc[$i]."','".$pl_purity[$i]."','".$pl_weight[$i]."','".$pl_pur_per[$i]."','".$pl_stone_less[$i]."','".$pl_less[$i]."','".$pl_net_weight."','".$pl_old_id[$i]."','".$pl_old_rate."','".$pl_cur_rate."')");
                  save_query_in_log();
            }
        }
        if($res)
        {
            $upd=$this->db->query("UPDATE LOANS SET IS_LOCK_OUT=2 WHERE BILLNO='".$bill_no."'");
        }
        // echo $pl_old_rate ."<br>".$pl_cur_rate; 
        // exit();;
        redirect("jewelsettlement");
    }
    public function jewel_settlement_save()
    {

      $bill_no=$billno=$this->input->post("bill_no");
      $js_date=$this->input->post("kt_datepicker_new_loan_date");
      $js_company=$this->input->post("js_company");

      $sno_value=$this->db->query("select * from  KEYMASTER where KEYNAME='FSD-".$_SESSION['LOANPREFIX']."'")->row();
      $val=int($sno_value->KEYVALUE)+1;
      $uid=str_pad($val,2,0,STR_PAD_LEFT);
      $js_sno=$_SESSION['LOANPREFIX'].$val;


      $loan_res=$this->db->query("select * from LOANS where BILLNO='".$bill_no."'")->row();
      $redemp_res=$this->db->query("select * from REDEMPTIONS where BILLNO='".$bill_no."'")->row();

      if($loan_res->CLOSING_STATUS=='CUSTOMER_CLOSE')
      {
          //for closed by photo
          if(!empty($_FILES['cust_cls_party']['name']))
          {   
              $bill_name=implode('-',(explode('/',$billno)));
              // echo $bill_name; exit();
              $ext = pathinfo($_FILES['cust_cls_party']['name'], PATHINFO_EXTENSION);
              $config['upload_path'] = 'assets/images/jewel_settlement_img';
              $config['allowed_types'] = 'jpg|jpeg|png|doc|docx|pdf';
              $config['file_name'] = 'JS-P-'.$bill_name;
              $profileName = $config['file_name'].'.'.$ext;
              // echo $profileName; exit();
              // $this->upload->initialize($config);
              $this->load->library('upload',$config);
              
              if($this->upload->do_upload('cust_cls_party'))
              {
                $uploadData = $this->upload->data();
                $data['party_img'] = $profileName;
              }
              else
              {
                $data['party_img'] = '';
              }
          }
          else
          {
              $data['party_img'] = '';
          }


          //for jewel photo

          if(!empty($_FILES['cust_cls_jewel']['name']))
          {   
              $bill_name=implode('-',(explode('/',$billno)));
              // echo $bill_name; exit();
              $ext = pathinfo($_FILES['cust_cls_jewel']['name'], PATHINFO_EXTENSION);
              $config['upload_path'] = 'assets/images/jewel_settlement_img';
              $config['allowed_types'] = 'jpg|jpeg|png|pdf';
              $config['file_name'] = 'JS-J-'.$bill_name;
              $profileName = $config['file_name'].'.'.$ext;
              // echo $profileName; exit();
              // $this->upload->initialize($config);
              $this->load->library('upload',$config);
              
              if($this->upload->do_upload('cust_cls_jewel'))
              {
                $uploadData = $this->upload->data();
                $data['jewel_img'] = $profileName;
              }
              else
              {
                $data['jewel_img'] = '';
              }
          }
          else
          {
              $data['jewel_img'] = '';
          }

          //for document photo

          if(!empty($_FILES['cust_cls_document']['name']))
          {   
              $bill_name=implode('-',(explode('/',$billno)));
              // echo $bill_name; exit();
              $ext = pathinfo($_FILES['cust_cls_document']['name'], PATHINFO_EXTENSION);
              $config['upload_path'] = 'assets/images/jewel_settlement_img';
              $config['allowed_types'] = 'jpg|jpeg|png|doc|docx|pdf';
              $config['file_name'] = 'JS-'.$bill_name;
              $profileName = $config['file_name'].'.'.$ext;
              // echo $profileName; exit();
              // $this->upload->initialize($config);
              $this->load->library('upload',$config);
              
              if($this->upload->do_upload('cust_cls_document'))
              {
                $uploadData = $this->upload->data();
                $data['document_img'] = $profileName;
              }
              else
              {
                $data['document_img'] = '';
              }
          }
          else
          {
              $data['document_img'] = '';
          }
      }

      if($loan_res->CLOSING_STATUS=='MULTI_JEWEL')
      {
          //for closed by photo
          if(!empty($_FILES['mul_jwl_party']['name']))
          {   
              $bill_name=implode('-',(explode('/',$billno)));
              // echo $bill_name; exit();
              $ext = pathinfo($_FILES['mul_jwl_party']['name'], PATHINFO_EXTENSION);
              $config['upload_path'] = 'assets/images/jewel_settlement_img';
              $config['allowed_types'] = 'jpg|jpeg|png|doc|docx|pdf';
              $config['file_name'] = 'JS-P-'.$bill_name;
              $profileName = $config['file_name'].'.'.$ext;
              // echo $profileName; exit();
              // $this->upload->initialize($config);
              $this->load->library('upload',$config);
              
              if($this->upload->do_upload('mul_jwl_party'))
              {
                $uploadData = $this->upload->data();
                $data['party_img'] = $profileName;
              }
              else
              {
                $data['party_img'] = '';
              }
          }
          else
          {
              $data['party_img'] = '';
          }


          //for jewel photo

          if(!empty($_FILES['mul_jwl_jewel']['name']))
          {   
              $bill_name=implode('-',(explode('/',$billno)));
              // echo $bill_name; exit();
              $ext = pathinfo($_FILES['mul_jwl_jewel']['name'], PATHINFO_EXTENSION);
              $config['upload_path'] = 'assets/images/jewel_settlement_img';
              $config['allowed_types'] = 'jpg|jpeg|png|pdf';
              $config['file_name'] = 'JS-J-'.$bill_name;
              $profileName = $config['file_name'].'.'.$ext;
              // echo $profileName; exit();
              // $this->upload->initialize($config);
              $this->load->library('upload',$config);
              
              if($this->upload->do_upload('mul_jwl_jewel'))
              {
                $uploadData = $this->upload->data();
                $data['jewel_img'] = $profileName;
              }
              else
              {
                $data['jewel_img'] = '';
              }
          }
          else
          {
              $data['jewel_img'] = '';
          }

          //for document photo

          if(!empty($_FILES['mul_jwl_document']['name']))
          {   
              $bill_name=implode('-',(explode('/',$billno)));
              // echo $bill_name; exit();
              $ext = pathinfo($_FILES['mul_jwl_document']['name'], PATHINFO_EXTENSION);
              $config['upload_path'] = 'assets/images/jewel_settlement_img';
              $config['allowed_types'] = 'jpg|jpeg|png|doc|docx|pdf';
              $config['file_name'] = 'JS-D-'.$bill_name;
              $profileName = $config['file_name'].'.'.$ext;
              // echo $profileName; exit();
              // $this->upload->initialize($config);
              $this->load->library('upload',$config);
              
              if($this->upload->do_upload('mul_jwl_document'))
              {
                $uploadData = $this->upload->data();
                $data['document_img'] = $profileName;
              }
              else
              {
                $data['document_img'] = '';
              }
          }
          else
          {
              $data['document_img'] = '';
          }
      }
      
      $res=$this->db->query("INSERT INTO JEWEL_SETTLEMENT(BILLNO,ISSUE_DATE,RETURNDATE,NETPAYABLE,ISSUED_TO,ISSUED_NAME,ADDED_USER,ADDED_TIME,SNO) VALUES('".$bill_no."','".$js_date."','".$js_date."','".$redemp_res->NETPAYABLE."','CUSTOMER','".$loan_res->NAME."','".$_SESSION['username']."','".date('Y-m-d H:i:s')."','".$js_sno."')");

      $this->db->query("UPDATE KEYMASTER set KEYVALUE=KEYVALUE+1 WHERE KEYNAME='FSD-".$_SESSION['LOANPREFIX']."'" );
      redirect(jewelsettlement);
    }
    public function upd_loan_sts()
    {
        $bill_no=$this->input->post('billno');
        
        // $chk_lock_in= $this->db->query("select * from lock_in where loan_no like '%".$bill_no."%' and locked_status='in'")->row();
        // if(count((array)$chk_lock_in)>0)
        // {
            $loan_det= $this->db->query("select * from LOANS  WHERE BILLNO='".$bill_no."'")->row();
            $pl_det=$this->db->query("select * from PLEDGEINFO where BILLNO='".$bill_no."'")->result_array();
            $net_weight=0;
            foreach($pl_det as $pl)
            {
              $net_weight+=$pl['WEIGHT'];
            }
            $pl_count=count((array)$pl_det);
            $result=$this->db->query("insert into lock_in(company, loan_no, item_count, net_weight, created_on, created_by, status, locked_status)values('".$loan_det->COMPANYCODE."','".$bill_no."','".$pl_count."','".$net_weight."','".date('Y-m-d H:i:s')."','".$_SESSION['username']."','Y','out')");  
            $upd=$this->db->query("UPDATE LOANS SET IS_LOCK_OUT=1 WHERE BILLNO='".$bill_no."'");
        //     echo 1;
        // }
        // else
        // {
        //     echo 2;
        // }
        
        
    }

    // INSERT INTO ccl_sale_list (ccl_date,company_code,billno,curr_sales_amount,is_profit_loss,profit_loss_amount,pid,ccl_status,description,created_on,created_by,status,sell_to_company) VALUES('2023-08-11','001','MIP-405/22','40000','L','-41,895.00','C001596','Request','','2023-08-11 18:33:14','K','0','004')
}
?>