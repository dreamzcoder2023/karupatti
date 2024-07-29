<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/* ************************************************************************************
		Purpose : To handle all Loan Receipts functions 2022-11-01
***************************************************************************************/
class Loanreceipt extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model(array("Loanreceipt_model","Loan_model"));
    	$this->load->library('user_agent');
    	if (isset($this->session->userdata['username']) && $this->session->userdata['username'] == TRUE)
        {
            //do something
        }else{
            redirect('login'); //if session is not there, redirect to login page
        } 
		date_default_timezone_set("Asia/Kolkata");
    	$this->session->set_userdata('comtitle', 'Loan Receipts');
	}

    public function index()
    {

      $page       = isset($_GET['page']) ? $_GET['page'] : 1;
        $limit      = 25;
        $offset     = ($page - 1) * $limit +1;
        $page_limit=$offset+$limit-1;

        
      $tdate="";


      $data['today_date_fillter'] = date("Y-m-d");
      $fdate =" AND R.RECEIPT_DATE='".$data['today_date_fillter']."' ";

     
      $data['dt_fill'] = $this->input->post('dt_fill_loan_receipt_list');
      // echo $this->input->post('dt_fill_loan_list');
      $data['from_date_fillter'] = $this->input->post('from_date_fillter_loan_receipt_list');
      $data['to_date_fillter'] = $this->input->post('to_date_fillter_loan_receipt_list');
      $data['company_filter'] = $this->input->post('lr_comp_filter');
      
      if($data['company_filter']=='all' || $data['company_filter']=='')
      {
        $cmp= "";  
      }
      else
      {
        $cmp= " and L.COMPANYCODE='". $data['company_filter']."'";  
      }
      

      if($data['dt_fill']=="today")
      {
          $data['today_date_fillter'] = date("Y-m-d");
          $fdate =" AND R.RECEIPT_DATE='".$data['today_date_fillter']."' ";
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
              $fdate =" AND R.RECEIPT_DATE>='".$data['week_from_date_fillter']."'";
              $tdate =" AND R.RECEIPT_DATE<='".$data['week_to_date_fillter']."'";

          }
          else
          {
              $data['week_from_date_fillter']=date(' Y-m-d', strtotime("sunday -1 week"));

              $data['week_to_date_fillter']=date(' Y-m-d', strtotime("saturday 0 week"));
              //  print_r($data['week_to_date_fillter']);exit;
              $fdate =" AND R.RECEIPT_DATE>='".$data['week_from_date_fillter']."'";
            $tdate =" AND R.RECEIPT_DATE<='".$data['week_to_date_fillter']."'";
          }
      }
      if($data['dt_fill']=="monthly")
      {

          $first=date('Y-m-01');
          $last=date('Y-m-t');
          $fdate =" AND R.RECEIPT_DATE>='".$first."'";
          $tdate ="AND R.RECEIPT_DATE<='".$last."'";
      }
      if($data['dt_fill']=="custom Date")
      {
         

          if($data['from_date_fillter']!='')
          {
            $first=date('Y-m-d',strtotime($data['from_date_fillter']));
            $fdate =" AND R.RECEIPT_DATE>='".$first."'";
          }
          else
          {
            $fdate ='';
          }
          if($data['to_date_fillter']!='')
          {
            $last=date('Y-m-d',strtotime($data['to_date_fillter']));
            $tdate =" AND R.RECEIPT_DATE<='".$last."'";
          }
          else
          {
            $tdate ='';
          } 
      }

        

        
            $data['loan_receipt_list']  = $this->Loanreceipt_model->get_loan_receipts_list($fdate,$tdate,$page_limit,$offset,$cmp);
        $res=$this->db->query("SELECT count(*) as receipt_count from RECEIPT_MASTER R, LOANS L WHERE R.RECEIPT_SNO!='' AND L.BILLNO=R.BILLNO $fdate $tdate $cmp")->row();
         $data['receipt_count'] =$res->receipt_count;
        

       
//footer values
        $data['princ_tot'] =  $data['int_amt_tot'] = $data['charges_tot']= $data['hl_bal_tot'] = $data['paid_amt_tot'] = 0;
        foreach ($data['loan_receipt_list'] as $lrlist) {
            $data['princ_tot'] +=  $lrlist['PRINCIPAL'];
            $data['int_amt_tot'] += $lrlist['INT_AMOUNT'];

            $main = $lrlist['MAINTAINCHARGE']? $lrlist['MAINTAINCHARGE'] : 0;
            $NOTICECHARGE = $lrlist['NOTICECHARGE']? $lrlist['NOTICECHARGE'] : 0;
            $FORMCHARGE = $lrlist['FORMCHARGE']? $lrlist['FORMCHARGE'] : 0;

            $data['charges_tot']  +=$main+$NOTICECHARGE+$FORMCHARGE;
            $data['hl_bal_tot']   += $lrlist['HL_AMOUNT']?$lrlist['HL_AMOUNT']:0;
            $data['paid_amt_tot'] += $lrlist['PAIDAMOUNT']?$lrlist['PAIDAMOUNT']:0;
        }

        // $data['loan_receipts_list_footer'] = $this->Loanreceipts_model->get_loan_receipts_list_footer($fdate,$tdate1);

       $data['company_list'] = $this->Loan_model->get_company_list();

        // $this->load->view('loanreceipts/loan_receipts_list',$data);
            $this->load->view('loanreceipt/loanreceipt_list',$data);


    }
    public function loanList()
      {
        $search =  $_GET['query']; 
        $rows = $this->Loanreceipt_model->getLoan($search);
        $res='[';
        if(count($rows)>0) {
          foreach($rows as $row )
          {
              $title='';
              $billno='';
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
              
              if(isset($row->NOMINEE_ID) && ($row->NOMINEE_ID!=0))
              {
                $nominee_det=$this->db->query("select * from  NOMINEE where NOMINEE_ID=".$row->NOMINEE_ID. " and PID='".$row->PID."'")->row();
                $inom_det=$nominee_det->NOMINEE_NAME." - ".$nominee_det->RELATION." - ".$nominee_det->MOBILE_NO;
                $nom_det=$nominee_det->NOMINEE_NAME;
              }
              else
              {
                $inom_det=$row->NOMINEE." - ".$row->RELATION;
                $nom_det=$row->NOMINEE;
              }


              $member_id='';
              $card_details=$this->db->query("SELECT * FROM MEMBERSHIP_CARD WHERE PID='".$row->PID."'")->row();
              $card_type='';
              if(isset($card_details))
              {
                $member_id =$card_details->MEMBERSHIP_NO;
                  if($card_details->CARD_TYPE=='Gold')
                  {
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
              $pledge_info=$this->db->query("select * from PLEDGEINFO WHERE BILLNO='".$row->BILLNO."'")->result_array();
              $pl_count=count((array)$pledge_info);
              $tbody="";
              foreach ($pledge_info as $plist) {
                $is_damage=($plist['IS_DAMAGE']=='Y')?'Yes':'No';
               $tbody .= "<tr><td>".$plist['PLEDGENAME']."</td><td>".$plist['DESCRIPTION']."</td><td>".$plist['PURITY']."</td><td>".$plist['PURITY_PERCENT']."</td><td>".$plist['WEIGHT']."</td><td>".$plist['STONEWEIGHT']."</td><td>".$plist['LESS']."</td><td>".$plist['NETWEIGHT']."</td><td>".$is_damage."</td><td><div class='image-input mt-2 me-6' data-kt-image-input='true'><div class='image-input-wrapper w-40px h-40px' style='background-image: url(assets/images/jewel.jpg)'></div></div></td></tr>";
              }

               
              $tfoot = "<th class='min-w-150px'></th> <th class='min-w-100px'></th><th class='min-w-80px'></th><th class='min-w-80px'>Total</th><th class='min-w-80px'>".$row->WEIGHT."</th><th class='min-w-100px'>".$row->STONELESS."</th><th class='min-w-80px'>".$row->LESS."</th><th class='min-w-80px'>".$row->NETWEIGHT."</th><th class='min-w-50px'></th><th class='min-w-50px'></th>";
            //   $member_id =$card_details->MEMBERSHIP_NO;
              $member_points=$row->MEMBERSHIP_POINTS;
              $rating =$row->RATING;
              $phone =$row->PHONE;
              $address=$row->STREETNAME.', '.$row->VILLAGENAME.', '.$row->CITYNAME;
              $address1=$row->STREETNAME;
              

              if($row->PHOTO!='')
               {
               $party_photo="<img src='data:image/jpg;charset=utf8;base64,".base64_encode($row->PHOTO)."'  height='125px' width='125px'>";
               }
               else
               {
                $party_photo="<img src='".base_url()."assets/images/party.jpg' height='125px' width='125px' >";
               }

              

              $title = $bill_no;
              $res.='{ "title":"'.$title.'","pid": "'.$party_id.'","firstname":"'.$party.'","member_id":"'.$member_id.'","member_points":"'.$member_points.'","rating":"'.$rating.'","address":"'.$address.'","address1":"'.$address1.'","inom_det":"'.$inom_det.'","nom_det":"'.$nom_det.'","card_type":"'.$card_type.'","weight":"'.$weight.'","pl_count":"'.$pl_count.'","tfoot":"'.$tfoot.'","tbody":"'.$tbody.'","loan_dt":"'.$loan_dt.'","expiry_dt":"'.$expiry_dt.'","company":"'.$company.'","loan_amt":"'.$loan_amt.'","interest":"'.$interest.'","phone":"'.$phone.'","party_photo":"'.$party_photo.'"},';
             
              
          }
          $res=rtrim($res,',');
          $res.=']';
        }
        else{
          $res.=']';
        }
        print_r($res);die();
      }
    
      public function load_other_info()
      {

          $bill_no=$this->input->post("bill_no");
          $pid=$this->input->post("pid");
          
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

                // print_r($receipt_detail);exit;
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
//   print_r($endate);exit;
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

              // print_r($months1);
              // print_r($days1);
              echo "||".$due_status."||".$receipt_count."||".$receipt_date."||".$days1."||".$months1."||".$loan_details->AMOUNT."||".$int."||".$pprinc."||".$pint."||".$rem_princ."||".$rem_int."||".$item_photo;
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
                 print_r($bill_no);       
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
                    print_r($vLoanDate);
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
                   // $vTotalInterest = $vLoanAmount * $vIntpercent;              
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
                        // $vIntStr = $vIntStr . "<tr><td></td><td></td><td>".number_format($vIntPerMonth,2)."</td><td>".number_format(round($vLoanAmount,2),2)."</td><td>".number_format(round($data['txtInterest'],2),2)."</td><td>0.00</td><td>".number_format(($vLoanAmount + $data['txtInterest']),2)."</td></tr>";

                        $vIntStr = $vIntStr . "<tr><td></td><td></td><td>".$loan_details->INTEREST."</td><td>".number_format(round($vLoanAmount,2),2)."</td><td>".number_format(round($data['txtInterest'],2),2)."</td><td>0.00</td><td>".number_format(($vLoanAmount + $data['txtInterest']),2)."</td></tr>";

                        $data['vIntStr'] = $vIntStr;
                    }
                }
                //   $vTotalInterest1  = $vTotalInterest ==0 ? $vIntpercent : $vTotalInterest;
                            
                              // exit();
             echo "||".$vIntStr."||".$vTotalInterest."||".$data['txtPaidPrincipal']."||".$data['txtPaidInterest']."||".$data['txtPaidTotal']."||".$data['txtTotal']."||".$vLoanAmount;
          
      
             }


    public function add_loan_receipt()
    {
          $this->load->view('loanreceipt/loanreceipt_add');
    }
    public function add_loan_receipt_id($id)
    {
        $data['bill_no']=str_replace('_', '/',$id);
        // loanList();
        // load_other_info();
        // load_popup_receipt_info();
        $this->load->view('loanreceipt/loanreceipt_add',$data);   
    }
    public function loan_receipt_save()
    {

            $data['billno']=$bill_no=$this->input->post("bill_no");
            $data['pid']=$p_id=$this->input->post("pid");
            $data['receipt_date'] = date("Y-m-d");
            $data['maint_chg']=$this->input->post("txt_maint_chg");
            $data['notice_chg']=$this->input->post("txt_notice_chg");
            $data['form_chg']=$this->input->post("txt_form_chg");
            $data['discount']=$this->input->post("txt_discount");
            $data['deduct_card_point']=$this->input->post("txt_deduct_from_card");
            $data['on_acc_chg']=$this->input->post("on_acc_charge");
            $data['txt_paid_amount']=$this->input->post("txt_paid_principal");
            // $data['paid_interest']=$this->input->post("txt_paid_interest");
            $data['mem_points']=$this->input->post("m_points_ad");
            $data['pay_principal']=$this->input->post('txt_pay_principal');
            $data['pay_interest']=$this->input->post('txt_pay_interest');
            $data['calc_principal']=$this->input->post('txt_calc_principal');
            $data['calc_interest']=$this->input->post('txt_calc_interest');

            // print_r($data);

            $loan_details=$this->db->query("select * from LOANS where BILLNO='".$bill_no."'")->row();

            // $data['calc_principal']=0;
            // $data['calc_interest']=0;
            $data['int_amount']=($loan_details->AMOUNT*$loan_details->MONTHS*$loan_details->INTEREST)/100;
            $data['principal']=$loan_details->AMOUNT;
            $data['txtPrincipal']=$loan_details->AMOUNT;
            $data['total']=$data['principal']+$data['int_amount'];
            $data['paid_total']=0;
            $data['totalpay']=0;
            $data['netpayable']=0;
            $data['loan_balance']=$data['pay_principal'];
            $data['balance']=0;
            $data['paidamount']=0;
            $data['revised_amount']=0;
            $data['revised_int']=0;
            $data['added_user']=$_SESSION['username'];
            $data['created_on']=date('Y-m-d H:i:s');

            $prefix=$_SESSION['LOANPREFIX'];

            // print_r($prefix);exit;
                // $pidqry=$this->db->query("SELECT TOP 1 RECEIPT_SNO FROM RECEIPT_MASTER WHERE RECEIPT_SNO LIKE '".$prefix."%' ORDER BY RECEIPT_DATE DESC");
            $pidqry=$this->db->query("SELECT * from KEYMASTER where KEYNAME='RECEIPTS-".$prefix."'");
                $pidres=$pidqry->row();
                // $last_data=$pidres->RECEIPT_SNO;
                $last_data=$pidres->KEYVALUE;
                $exlno = substr($last_data,0);
                $next_value = (int)$exlno + 1;
                $p_id1=str_pad($next_value,1,0,STR_PAD_LEFT);
                $data['receipt_sno']=$prefix.$p_id1;



            $cash=$this->input->post('cash_receipt_add_radio');
            $cheque=$this->input->post('cheque_receipt_add_radio');
            $rtgs=$this->input->post('rtgs_receipt_add_radio');
            $upi=$this->input->post('upi_receipt_add_radio');

            if($cash==1)
            {
                $data1['type']="Cash";
                $data1['amt']=$this->input->post('lr_pay_cash');
                $data1['p_bank']='';
                $data1['ref_no']='';
                $data1['c_bank']='';
                $data1['det']='';
                $data1['billno']=$data['receipt_sno'];
                $data1['pid']=$p_id;
                $data1['created_by']=$data['added_user'];
                $data1['created_on']=date('Y-m-d H:i:s');
                $result  = $this->db->query("INSERT INTO payment_inward_outward(module_name, type_of_payment, amount, party_bank, cheque_ref_no, company_bank, remarks, bill_no, party_id, payment_side, metal_type, quality, purity, weight, pure_metal_weight,  created_by, created_on, record_status) VALUES('New Receipt','".$data1['type']."','".$data1['amt']."','".$data1['p_bank']."','".$data1['ref_no']."','".$data1['c_bank']."','".$data1['det']."','".$data1['billno']."','".$data1['pid']."','CR','','','','0.00','0.00','".$data1['created_by']."','".$data1['created_on']."','0')");

                save_query_in_log();
            }
            if($cheque==1)
            {
                $data1['type'] = "Cheque";
                $data1['amt'] = $this->input->post('lr_pay_cheque_amt');
                $data1['p_bank'] = '';
                $data1['ref_no'] = $this->input->post('lr_pay_cheque_no');
                $data1['c_bank'] = $this->input->post('lr_pay_cheque_bank');
                $data1['det'] = $this->input->post('lr_pay_cheque_detail');
                $data1['billno'] = $data['receipt_sno'];
                $data1['pid'] = $p_id;
                $data1['created_by'] = $data['added_user'];
                $data1['created_on'] = date('Y-m-d H:i:s');
                $result = $this->db->query("INSERT INTO payment_inward_outward(module_name, type_of_payment, amount, party_bank, cheque_ref_no, company_bank, remarks, bill_no, party_id, payment_side, metal_type, quality, purity, weight, pure_metal_weight,  created_by, created_on, record_status) VALUES('New Receipt','".$data1['type']."','".$data1['amt']."','".$data1['p_bank']."','".$data1['ref_no']."','".$data1['c_bank']."','".$data1['det']."','".$data1['billno']."','".$data1['pid']."','CR','','','','0.00','0.00','".$data1['created_by']."','".$data1['created_on']."','0')");

                save_query_in_log();
            }
            if($rtgs==1)
            {
                $data1['type'] = "RTGS";
                $data1['amt'] = $this->input->post('lr_pay_rtgs_amt');
                $data1['p_bank'] = '';
                $data1['ref_no'] = $this->input->post('lr_pay_rtgs_no');
                $data1['c_bank'] = $this->input->post('lr_pay_rtgs_bank');
                $data1['det'] = $this->input->post('lr_pay_rtgs_detail');
                $data1['billno'] = $data['receipt_sno'];
                $data1['pid'] = $p_id;
                $data1['created_by'] = $data['added_user'];
                $data1['created_on'] = date('Y-m-d H:i:s');
                $result = $this->db->query("INSERT INTO payment_inward_outward(module_name, type_of_payment, amount, party_bank, cheque_ref_no, company_bank, remarks, bill_no, party_id, payment_side, metal_type, quality, purity, weight, pure_metal_weight,  created_by, created_on, record_status) VALUES('New Receipt','".$data1['type']."','".$data1['amt']."','".$data1['p_bank']."','".$data1['ref_no']."','".$data1['c_bank']."','".$data1['det']."','".$data1['billno']."','".$data1['pid']."','CR','','','','0.00','0.00','".$data1['created_by']."','".$data1['created_on']."','0')");

                save_query_in_log();
            }
            if($upi==1)
            {
                $data1['type'] = "UPI";
                $data1['amt'] = $this->input->post('lr_pay_upi_amt');
                $data1['p_bank'] = '';
                $data1['ref_no'] = $this->input->post('lr_pay_upi_no');
                $data1['c_bank'] = '';
                $data1['det'] = $this->input->post('lr_pay_upi_detail');
                $data1['billno'] = $data['receipt_sno'];
                $data1['pid'] = $p_id;
                $data1['created_by'] = $data['added_user'];
                $data1['created_on'] = date('Y-m-d H:i:s');
                $result = $this->db->query("INSERT INTO payment_inward_outward(module_name, type_of_payment, amount, party_bank, cheque_ref_no, company_bank, remarks, bill_no, party_id, payment_side, metal_type, quality, purity, weight, pure_metal_weight,  created_by, created_on, record_status) VALUES('New Receipt','".$data1['type']."','".$data1['amt']."','".$data1['p_bank']."','".$data1['ref_no']."','".$data1['c_bank']."','".$data1['det']."','".$data1['billno']."','".$data1['pid']."','CR','','','','0.00','0.00','".$data1['created_by']."','".$data1['created_on']."','0')");

                save_query_in_log();
            }
            
                $receipt_detail=$this->db->query("select top 1 * from RECEIPT_MASTER where BILLNO='".$data['billno']."' order by ROWNO desc")->row();
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
                    $ln_dt =$loan_details->ENDATE;
                    $month_number = date("d-M-Y",strtotime($ln_dt));
                    $data['last_recetpt_date'] = $month_number;
                
                }

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
                        $data['months'] = $totalMonths;
                        $data['days'] = $days;
                        
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
                        $data['months'] = $totalMonths;
                        $data['days'] = $days;

                    }
                    //Total (Calculation Part)
                    if ($days > 0 && $days <= 7) 
                    {
                        $tot = 0.25;
                    }
                    else if ($days >= 8 && $days <= 15) 
                    {
                        $tot = 0.5;
                    }
                    else if ($days >= 16 && $days <= 23) 
                    {
                        $tot = 0.75;
                    }
                    else if ($days >= 24 && $days <= 31) 
                    {
                        $tot = 1;
                    }
                    else
                    {
                        $tot = 0;
                    }
                    $data['tot'] = $totalMonths + $tot;

                    //Status
                    $vIntType = $loan_details->INTERESTTYPE;
                    $vCalcDate=date('Y-m-d');
                    $vLoanDate = $loan_details->ENDATE;
                    $vLoanPeriod = $loan_details->MONTHS;
            
                $int = round($loan_details->AMOUNT*$loan_details->INTEREST/100);
                    $data['interest'] = $int;
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

                    if (isset($receipt_detail) )
                    {
                        $paid_value = $this->db->query("SELECT SUM(PRINCIPAL) AS PRINCIPAL,SUM(INT_AMOUNT) AS INT_AMOUNT FROM RECEIPT_MASTER WHERE BILLNO='".$bill_no."' ")->row();
                        $data['paid_amt'] = $paid_value->PRINCIPAL;
                        $data['paid_int'] = $paid_value->INT_AMOUNT;

                    }
                    else
                    {
                        $paid_value = $this->Loanreceipt_model->get_paid_calculation_less($bill_no);
                        
                        $pd_value = explode('_', $paid_value);
                        $pd_value_amt = $paid_value[0];
                        $pd_value_int = $paid_value[2];
                        //print_r($pd_value_int);exit();
                        $data['paid_amt'] = $pd_value_amt;
                        $data['paid_int'] = $pd_value_int;
                        // print_r("else");
                        // print
                    }

                    $data['totalpay']=$data['calc_principal']+$data['calc_interest'];
                    $data['netpayable']=$data['txt_paid_amount'];
                    $data['balance']=$data['totalpay']-$data['txt_paid_amount'];
                    $data['paid_total']=$data['txt_paid_amount'];

        // print_r($data);
                    $new_rating=$this->input->post('lr_cust_rating');
                    $process="New Loan Receipt";
                    // set_customer_rating($new_rating,$p_id,$process,$data['receipt_sno']);

                    $mem_list=$this->db->query("select * from PARTIES where PID='".$p_id."'")->row();
                    $mem_no=(isset($mem_list->MEMBERSHIP_ID) && $mem_list->MEMBERSHIP_ID!='')?$mem_list->MEMBERSHIP_ID:'';
                    $new_mem_points=$this->input->post('m_points_ad');
                    add_member_points($new_mem_points,$p_id);
                    add_member_card_history($mem_no,$p_id,$process,$new_mem_points,$data['receipt_sno']);

                    

                    $result=$this->Loanreceipt_model->loan_receipt_save($data);

                    $result1=$this->Loanreceipt_model->loan_paid_update($data);
                    $res=$this->db->query("UPDATE KEYMASTER SET KEYVALUE=".$p_id1. " WHERE KEYNAME='RECEIPTS-".$_SESSION['LOANPREFIX']."'");
                    $rating=$this->input->post('lr_cust_rating');
                    $pid=$p_id;
                    $billno=$data['billno'];
                    $process="New Loan Receipt";
                    $res=$this->db->query("UPDATE PARTIES SET RATING=".$rating. " WHERE PID='".$pid."'");
                    $rating_history=$this->db->query("INSERT INTO CUSTOMER_RATING_HISTORY (PID, LOG_DATE, PROCESS, RATING, BILLNO, CREATED_BY, CREATED_ON) VALUES('".$pid."','".date('Y-m-d')."','New Loan Receipt','".$rating."','".$billno."','".$_SESSION['username']."','".date('Y-m-d H:i:s')."')");
                    // return TRUE;
                    redirect("loanreceipt");
                // $this->load->view('loanreceipt/loanreceipt_add');
    }
    public function set_customer_rating()
      {
        $rating=$this->input->post('val');
        $pid=$this->input->post('id');
        $billno=$this->input->post('bill_no');
        $process="New Loan Receipt";
        $res=$this->db->query("UPDATE PARTIES SET RATING=".$rating. " WHERE PID='".$pid."'");
        $rating_history=$this->db->query("INSERT INTO CUSTOMER_RATING_HISTORY (PID, LOG_DATE, PROCESS, RATING, BILLNO, CREATED_BY, CREATED_ON) VALUES('".$pid."','".date('Y-m-d')."','New Loan Receipt','".$rating."','".$billno."','".$_SESSION['username']."','".date('Y-m-d H:i:s')."')");
        return TRUE;
      }

  public function loan_receipt_view()
    {
        $lid =$bill_no= $_POST['b_no'];
        $rid =$receipt_no= $_POST['r_no'];
        $data['receipt_sno']=$rid;
        $loan_details = $this->Loan_model->get_loan_by_loan_id($lid);
        // $data['loan_details'] = $this->Loan_model->get_loan_by_loan_id($lid);
        $data['lbl_name']="<i class='fa fa-user fs-6' aria-hidden='true' title=' Name'></i>&emsp;". $loan_details->NAME;

        $party_address=$this->db->query("select * from PARTIES WHERE PID='".$loan_details->PID."'")->row();

        $data['status_details']=$this->db->query("select * from LOAN_STATUS WHERE id='".$loan_details->LOAN_STATUS."'")->row();
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
             //print_r($data['receipt_sno']);exit;
             $pay_res=$this->db->query("select * from payment_inward_outward where bill_no='".$data['receipt_sno']."' ")->result_array();
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
     public function sd_receipt_view($id)
    {
        // print_r($id);exit;
        // $loan_no = $this->input->post('loan_no');
        $loan_no = str_replace("_","/",$id);
        // $loan_no = 'U-1632/13';
        $data['party'] = $this->db->query("SELECT PARTIES.PID, PARTIES.NAME, PARTIES.PHONE, PARTIES.ADDRESS1, PARTIES.ADDRESS2, 
        PARTIES.MEMBERSHIP_ID, PARTIES.MEMBERSHIP_POINTS, LOANS.BILLNO, LOANS.COMPANYCODE, LOANS.JEWEL_TYPE, LOANS.BILLNO, 
        LOANS.NETWEIGHT, LOANS.AMOUNT, LOANS.INTEREST, LOANS.INTERESTTYPE, LOANS.NOMINEE, LOANS.RELATION,
        COMPANY.COMPANYCODE, COMPANY.COMPANYNAME
        FROM ((LOANS
        INNER JOIN PARTIES ON PARTIES.PID = LOANS.PID)
        INNER JOIN COMPANY ON COMPANY.COMPANYCODE = LOANS.COMPANYCODE) WHERE LOANS.BILLNO = '".$loan_no."' ")->row();
        $pid = $data['party']->PID;
        // print_r($pid);exit;
        $data['party'] = json_decode(json_encode($data['party']), true);
        $data['pled'] = $this->db->query("SELECT * FROM PLEDGEINFO WHERE BILLNO = '".$loan_no."' ")->row();
        $data['pled'] = json_decode(json_encode($data['pled']), true);
        $data['rec_mas'] = $this->db->query("SELECT * FROM RECEIPT_MASTER WHERE BILLNO = '".$loan_no."' ")->result_array();
        $data['payment'] = $this->db->query("SELECT * FROM payment_inward_outward WHERE bill_no = '".$loan_no."' AND party_id = '".$pid."' AND module_name = 'New Receipt' ")->result_array();
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
        // print_r($pid);exit;
        $this->load->view("loanreceipt/secondary_display_receipts",$data);
    }
    public function calc_mem_points()
    {
        $loan_amt=$this->input->post('receipt_amount');
        // echo $loan_amt;

        $mem_chg=$this->db->query("select * from MEMBERSHIP_POINTS_UPDATE where TYPE='Loan Receipts'")->row();

        if(isset($mem_chg))
        {
            $val=$loan_amt/$mem_chg->FOR_AMOUNT;
            $points_earned=$val*$mem_chg->POINTS;
            // return $mem_chg->member_points;
            echo $points_earned;
            // return $points_earned;
        }
        else
        {
          echo 0;
          // return 0;
        }
    }
}
?>