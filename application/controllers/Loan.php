<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/* ************************************************************************************
		Purpose : To handle all Loan functions 2022-08-19
***************************************************************************************/
class Loan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model(array("Loan_model", "Loanreceipt_model"));

    $fin_year=$this->Loan_model->get_fin_years_list();
    $db=substr($fin_year->DBNAME,0,strlen($fin_year->DBNAME)-4);
    //echo $db;exit();
    $config_app = switch_db_dynamic($db);
    $this->Loan_model->other_db = $this->load->database($config_app,TRUE);

    	$this->load->library('user_agent');
    	if (isset($this->session->userdata['username']) && $this->session->userdata['username'] == TRUE)
        {
            //do something
        }else{
            redirect('login'); //if session is not there, redirect to login page
        } 
		date_default_timezone_set("Asia/Kolkata");
    	$this->session->set_userdata('comtitle', 'Loan');
	}
  public function loan_detail_view($id)
  {
      $lid=$bill_no=str_replace('_', '/',$id);
      // $lid = $_POST['id'];
      $data['loan_details'] = $this->Loan_model->get_loan_by_loan_id($lid);

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
            $GetNewIntPercent=0;


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

                              // print_r($vIntStr);
                              // exit();
         // echo "||".$vTotalInterest."||".$vTotalPaidAmount."||".$vNetAmount;
            // $data['vTotalInterest']=$vTotalInterest;
            $data['vTotalInterest']=round($vTotalInt);
            // $data['vTotalPaidAmount']=$vTotalPaidAmount;
            $data['vPaidInterest']=$vPaidInterest;
            $data['vPaidPrincipal']=$vPaidPrincipal;
            $data['vLoanBalance']=$vLoanBalance;

            // $data['vNetAmount']=$vNetAmount;
      $this->load->view('loan/loan_detail_view',$data);
  }
    public function loan_view()
    {
        $lid =$bill_no= $_POST['id'];
        $loan_details = $this->Loan_model->get_loan_by_loan_id($lid);
        // $data['loan_details'] = $this->Loan_model->get_loan_by_loan_id($lid);
        $data['lbl_name']="<i class='fa fa-user fs-6' aria-hidden='true' title=' Name'></i>&emsp;". $loan_details->NAME;

        $party_address=$this->db->query("select * from PARTIES WHERE PID='".$loan_details->PID."'")->row();

        $village = $this->db->query("SELECT * FROM VILLAGE WHERE VILLAGEID = '".$party_address->ADDRESS2."'  ")->row();

        $street = $this->db->query("SELECT * FROM STREET WHERE STREETID = '".$party_address->STREET_ID."'  ")->row();

        $city = $this->db->query("SELECT * FROM CITY WHERE CITYID = '".$party_address->CITY."'  ")->row();

        // $data['address']=$street->STREETNAME.", ".$village->VILLAGENAME;

         $addr=$street->STREETNAME.", ".$village->VILLAGENAME.", ".$city->CITYNAME.".";
         $data['lbl_address'] = "<i class='fa-solid fa-location-dot fs-6' aria-hidden='true' title='Address'></i>&emsp;".$street->STREETNAME." &nbsp; <span><i class='fas fa-info-circle fs-6' title='".$addr."'></i></span>";
         $data['lbl_phone']= "<i class='fas fa-mobile-android-alt fs-6' aria-hidden='true' title='Mobile'></i> &emsp;".$party_address->PHONE;
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

            if (is_null($loan_details->NOMINEE_ID))
            {
              $str= "--";
            }
            else
            {
            $nominee_details=$this->db->query("select * from NOMINEE where NOMINEE_ID=".$loan_details->NOMINEE_ID)->row();
            if(is_null($nominee_details))
            {
              $str= "--";
            }
            else
            {
              $str= $nominee_details->NOMINEE_NAME." - ".$nominee_details->RELATION." - ".$nominee_details->MOBILE_NO;
            }
            }

            $str1=$str."&nbsp; <span><i class='fas fa-info-circle fs-6' title='".$str."'></i></span>";
            $data['span_nominee'] =$str1;
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
            
            $vLoanPeriod = $loan_details->MONTHS;
            $vIntType = $loan_details->INTERESTTYPE;
            
            $vLoanAmount=$loan_details->AMOUNT;
            $vLoanIntPercent=$loan_details->INTEREST;
            $vPaidPrincipal=$loan_details->PAIDPRINCIPAL;
            $vPaidInterest=$loan_details->PAIDINTEREST;
            $vPaidTotal = $vPaidPrincipal + $vPaidInterest;
            // $vLoanBalance = $loan_details->BALANCE;
            $vLoanBalance = $loan_details->AMOUNT - $loan_details->PAIDPRINCIPAL;
            $vLoanDate = $loan_details->ENDATE;
            $vCalcDate=date('Y-m-d');
            $calc_date=date('Y-m-d');
            $vIntStr="";
            $vFInt = 0;
            $vSInt = 0;
            $vTotalInt = 0;


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

            // $data['vNetAmount']=$vNetAmount;
             $data['span_prin_actl_amt'] =number_format($loan_details->AMOUNT,2);
             $data['span_prin_paid_amt']=number_format($vPaidPrincipal,2);
             $data['span_prin_bal_amt']=number_format($vLoanBalance,2);
             $int_amt=($loan_details->AMOUNT*$loan_details->INTEREST*$loan_details->MONTHS)/100;
             $data['span_intr_actl_amt']= number_format($int_amt,2);
             $data['span_intr_paid_amt']=number_format($vPaidInterest,2);
             $data['span_intr_bal_amt']=number_format(round($vTotalInt),2);

             $tbody_str="";
             foreach ($pl_info as $plist)
             {
                $sts=($plist['IS_DAMAGE']=='Y')?'Yes':'No';
                 $tbody_str.="<tr><td>".$plist['PLEDGENAME']."</td><td>".$plist['DESCRIPTION']."</td><td>".$plist['PURITY']."</td><td>".$plist['PURITY']."</td><td>".$plist['WEIGHT']."</td><td>".$plist['STONEWEIGHT']."</td><td>".$plist['LESS']."</td><td>".$plist['NETWEIGHT']."</td><td>".$sts."</td><td><div class='image-input mt-2 me-6' data-kt-image-input='true'>
                  <div class='image-input-wrapper w-40px h-40px'style='background-image: url(assets/images/jewel.jpg)'></div></div></td></tr>";
             } 
          $data['tbody_fill']=$tbody_str;
          $tfoot_str="<tr class='text-start text-muted fw-bold fs-4 gs-0'> <th class='min-w-150px'></th> <th class='min-w-100px'></th> <th class='min-w-80px'></th> <th class='min-w-80px'>Total</th> <th class='min-w-80px'>".$loan_details->WEIGHT."</th> <th class='min-w-100px'>".$loan_details->STONELESS."</th> <th class='min-w-80px'>".$loan_details->LESS."</th> <th class='min-w-80px'>". $loan_details->NETWEIGHT."</th> <th class='min-w-50px'></th> <th class='min-w-50px'></th></tr>";
          $data['tfoot_str']=$tfoot_str;
          $data['loan_status']=$loan_details->LOAN_STATUS;
          $data['curr_loan_value']=$loan_details->NETWEIGHT * $_SESSION['CUR_GOLD_RATE'];
          
        header('Content-type: application/json'); 

      echo json_encode($data);

        // $this->load->view('loan/loan_view',$data);
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
      $fdate =" AND L.ENDATE='".$data['today_date_fillter']."' ";

     
      $data['dt_fill'] = $this->input->post('dt_fill_loan_list');
      // echo $this->input->post('dt_fill_loan_list');
      $data['from_date_fillter'] = $this->input->post('from_date_fillter_loan_list');
      $data['to_date_fillter'] = $this->input->post('to_date_fillter_loan_list');
      $data['company_filter'] = $this->input->post('company_filter');
      $data['status_filter']=$this->input->post('loan_status_filter');
      
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
        $cmp= " and L.COMPANYCODE='". $data['company_filter']."'";  
      }
      

      if($data['status_filter']=='all' || $data['status_filter']=='')
      {
        $status="";
      }
      else
      {
        $status=" and L.LOAN_STATUS= ".$data['status_filter'];
          
      }
      echo $status;
      echo $cmp;
      // exit();
      if($data['dt_fill']=="today")
      {
          $data['today_date_fillter'] = date("Y-m-d");
          $fdate =" AND L.ENDATE='".$data['today_date_fillter']."' ";
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

      $data['company_list'] = $this->Loan_model->get_company_list();
      $data['loan_status'] = $this->Loan_model->get_loan_status();
      

       // echo "SELECT  * FROM ( SELECT (P.ADDRESS1 + ',' + P.ADDRESS2) AS ADDRESS,P.RATING, L.*, ROW_NUMBER() OVER (ORDER BY L.ENDATE DESC) AS sl FROM LOANS L  INNER JOIN PARTIES P ON P.PID=L.PID WHERE L.LOAN_STATUS!=0 AND L.PID!='' $fdate $tdate $status $cmp)N WHERE sl BETWEEN $offset AND $page_limit ";
      // exit;
      $data['loan_list'] = $this->db->query("SELECT  * FROM ( SELECT P.RATING, L.*, ROW_NUMBER() OVER (ORDER BY L.ENDATE DESC) AS sl FROM LOANS L  INNER JOIN PARTIES P ON P.PID=L.PID WHERE L.LOAN_STATUS!=0 AND L.PID!='' $fdate $tdate $status $cmp)N WHERE sl BETWEEN $offset AND $page_limit ")->result_array();

      $data['min_count']=count((array)$data['loan_list']);
       $l_count=$this->db->query("SELECT count(l.BILLNO) as count  FROM LOANS L INNER JOIN PARTIES P ON P.PID=L.PID WHERE L.LOAN_STATUS!=0 AND L.PID!='' $fdate $tdate $status $cmp")->row();
       $data['loan_count']=$l_count->count;
     // print_r($offset);print_r($page_limit);exit();
       // print_r($data['loan_list']);exit();
       //print_r($data);exit;
      $this->load->view('loan/loan_list',$data);
    }

    public function loan_add()
    {
      // $data['party_list']=$this->Loan_model->get_party_details();
      $data['company_list'] = $this->Loan_model->get_company_list();
      $data['int_grp_list'] = $this->Loan_model->get_interest_group_list();
      $data['item_purity_list'] = $this->Loan_model->get_item_purity_list();
      // $data['interest_list'] = $this->Loan_model->get_interest_list();
      $this->load->view('loan/loan_add',$data);
    }

    public function loan_search()
    {
      // $data['party_list']=$this->Loan_model->get_party_details();
      // $data['company_list'] = $this->Loan_model->get_company_list();
      // $data['int_grp_list'] = $this->Loan_model->get_interest_group_list();
      // $data['item_purity_list'] = $this->Loan_model->get_item_purity_list();
      // $data['interest_list'] = $this->Loan_model->get_interest_list();
        $data['sel_bill_no']='';
      $this->load->view('loan/loan_search',$data);
    }
    public function loan_search_fetch_data()
    {
        $data['sel_bill_no']=$this->input->post('billno');
        $data['party_list']=$this->Loan_model->get_party_details();
        $data['company_list'] = $this->Loan_model->get_company_list();
          $data['int_grp_list'] = $this->Loan_model->get_interest_group_list();
          $data['item_purity_list'] = $this->Loan_model->get_item_purity_list();
          $data['interest_list'] = $this->Loan_model->get_interest_list();

    }

    public function loanList()
      {
        $search =  $_GET['query']; 
        $rows = $this->Loan_model->getLoan($search);

        
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
              $interest=$row->INTEREST;
              $jewel_type=$row->JEWEL_TYPE;
              if(isset($row->NOMINEE_ID) && ($row->NOMINEE_ID>0))
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

              // $res=$this->db->query("select * from loan_status where id=".$row->LOAN_STATUS)->row();
              // $cnt=count((array)$res);

             //  if($cnt>0)
             //  {
             //    $loan_status1='<span style='."'".'background-color:'.$res->color_code.';border-radius: 8px;padding: 5px 15px 5px 15px;'."'".'>'.$res->loan_stage.'</span>';
             // }
             // else
             // {
             //    $loan_status1='<span style="background-color:#e3e1e1 ;border-radius: 8px;padding: 5px 15px 5px 15px;">Inactive</span>';  
             // }

              $pledge_info=$this->db->query("select * from PLEDGEINFO WHERE BILLNO='".$row->BILLNO."'")->result_array();
              $pl_count=count((array)$pledge_info);
              $tbody="";
              foreach ($pledge_info as $plist) {
                $is_damage=($plist['IS_DAMAGE']=='Y')?'Yes':'No';
               $tbody .= "<tr><td>".$plist['PLEDGENAME']."</td><td>".$plist['DESCRIPTION']."</td><td>".$plist['PURITY']."</td><td>".$plist['PURITY_PERCENT']."</td><td>".$plist['WEIGHT']."</td><td>".$plist['STONEWEIGHT']."</td><td>".$plist['LESS']."</td><td>".$plist['NETWEIGHT']."</td><td>".$is_damage."</td><td><div class='image-input mt-2 me-6' data-kt-image-input='true'><div class='image-input-wrapper w-40px h-40px' style='background-image: url(assets/images/jewel.jpg)'></div></div></td></tr>";
              }

               
              $tfoot = "<th class='min-w-150px'></th> <th class='min-w-100px'></th><th class='min-w-80px'></th><th class='min-w-80px'>Total</th><th class='min-w-80px'>".$row->WEIGHT."</th><th class='min-w-100px'>".$row->STONELESS."</th><th class='min-w-80px'>".$row->LESS."</th><th class='min-w-80px'>".$row->NETWEIGHT."</th><th class='min-w-50px'></th><th class='min-w-50px'></th>";
              
              $rating =$row->RATING;
              $phone =$row->PHONE;
              $membership_points=$row->MEMBERSHIP_POINTS;
           
            $village = $this->db->query("SELECT * FROM VILLAGE WHERE VILLAGEID = '".$row->ADDRESS2."'  ")->row();

            $street = $this->db->query("SELECT * FROM STREET WHERE STREETID = '".$row->STREET_ID."'  ")->row();

              $address=$street->STREETNAME.", ".$village->VILLAGENAME;
              

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
                $item_photo="<img src='".base_url()."assets/images/Jewel.jpg' height='125px' width='125px' >";
               }
               
                $redemption_details = $this->db->query("select * from REDEMPTIONS where BILLNO='".$bill_no."'")->row();
                     $i=1;
                     $redemptions="";
                 if(isset($redemption_details)){
                     $redemptions="<tr><td>".$i."</td><td>".$redemption_details->RETURNDATE."</td><td>".$company."</td><td>".$redemption_details->BILLNO."</td><td>".$party."</td><td>".$interest."</td><td>".$jewel_type."</td><td>".$pl_count."</td><td>".$loan_amt."</td><td>".$redemption_details->CLOSING_TYPE."</td></tr>";
                 }
                // $redemptions = "<tr><td>".$i."</td><td>".$redemption_details->RETURNDATE."</td><td>".$redemption_details->BILLNO."</td><td>".$party."</td><td>".$interest."</td><td>".$jewel_type."</td><td>".$pl_count."</td><td>".$loan_amt."</td><td>".$redemption_details->CLOSING_TYPE."</td><td><span class='text-end'>
                // <a href='#' class='btn btn-icon btn-bg-light btn-active-color-primary btn-sm' data-bs-toggle='modal' data-bs-target='#kt_modal_view_redemption'><i class='bi bi-eye-fill eyc'></i> </a> </span></td></tr>";
                         
              $title = $bill_no;
              $res.='{ "title":"'.$title.'","pid": "'.$party_id.'","firstname":"'.$party.'","rating":"'.$rating.'","address":"'.$address.'","inom_det":"'.$inom_det.'","nom_det":"'.$nom_det.'","weight":"'.$weight.'","pl_count":"'.$pl_count.'","tfoot":"'.$tfoot.'","tbody":"'.$tbody.'","loan_dt":"'.$loan_dt.'","expiry_dt":"'.$expiry_dt.'","company":"'.$company.'","loan_amt":"'.$loan_amt.'","interest":"'.$interest.'","phone":"'.$phone.'","item_photo":"'.$item_photo.'","party_photo":"'.$party_photo.'","membership_points":"'.$membership_points.'","interest_value":"'.$interest.'","redemptions":"'.$redemptions.'"},';
             
              
          }
          $res=rtrim($res,',');
          $res.=']';
        }
        else{
          $res.=']';
        }
        print_r($res);die();
      }
    public function insert_master()
    {
        $data['pid']=$this->input->post('pid');
        // $data['nid']=$this->input->post('nid');
        $data['nid']=$this->input->post('nom_id');
        // echo $this->input->post('nom_id'); exit();

        $data['p_fname']=$this->input->post('p_fname');
        $data['jtype']=$this->input->post('jtype');
        $data['jewel_type']=$this->input->post('jewel_type');
        $data['loandate']=date_format(date_create($this->input->post('loandate')),'Y-m-d');
        $data['company']=$this->input->post('cmp');
        $data['loan_type']="New";
        $int_grp=$this->input->post('int_grp');
        $int_type=$this->input->post('int_type');

        $int_list=$this->db->query("select * from INTERESTLIST where INTID='".$int_type."'")->row();
        $data['months']= round($int_list->PERIOD);
        $data['interest_type']=$int_list->INTNAME;
        $data['interest']=$int_list->INTEREST;

        if(($data['nid']!='') && (!is_null($data['nid'])))
        {
            $nomi_det=$this->db->query("select * from NOMINEE where NOMINEE_ID=".$data['nid']." and PID='".$data['pid']."'")->row();
            if(isset($nomi_det))
            {
                $data['nominee']=$nomi_det->NOMINEE_NAME;
                $data['relation']=$nomi_det->RELATION;
            }
            else
            {
                $data['nid']='0';

                  $data['nominee']=$this->input->post("nom_name");
                  $data['relation']=$this->input->post("nom_relation");
                  $data['nom_mobile']=$this->input->post("nom_mobile");
            }
        }
        if(($data['nid']=='') || ($data['nid']==0))
        {
          $data['nid']='0';
          $data['nominee']=$this->input->post("nom_name");
          $data['relation']=$this->input->post("nom_relation");
          $data['nom_mobile']=$this->input->post("nom_mobile");
        }

        // echo $data['nid']; 
        // exit();
        if($data['nid']==0)
        {
                $this->db->query("INSERT INTO NOMINEE( NOMINEE_NAME, RELATION, MOBILE_NO, PID, CREATED_BY, CREATED_ON) VALUES('".$data['nominee']."','".$data['relation']."','".$data['nom_mobile']."','".$data['pid']."','".$_SESSION['username']."','".date('Y-m-d H:i:s')."')");
                save_query_in_log();   
                $res=$this->db->query("select top 1 NOMINEE_ID from NOMINEE where PID='".$data['pid']."' order by NOMINEE_ID desc") ->row();
                $data['nid']=$res->NOMINEE_ID;
        }

        // print_r( $data);
        // exit();
       
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
        echo $data['billno'];
        // print_r($int_txt_lst);
         // exit();

        // if ($int_txt_lst == "") 
        // {
        //   $data['billno']=$data['company'].'-'. $int_tx."-0001/".$d;
        // }
        // else
        // {
        //     if($int_txt_lst->TYPE_OF_RECORD=='O')
        //     {
        //         $last= $int_txt_lst->BILLNO;
        //         $pattern = "/[-\/]/";
        //         $components = preg_split($pattern, $last);
        //         // echo $components[count($components)-2];
        //         $ls1 = $components[count($components)-2];

        //         if (strlen($ls1)=="2") 
        //         {
        //           $next_value = (int)$ls1 + 1;
        //           $uid=str_pad($next_value,2,0,STR_PAD_LEFT);

        //           $data['billno']= $data['company'].'-'.$int_tx."-".$uid."/".$d;
        //         }
        //         elseif (strlen($ls1)=="3") 
        //         {
        //           if ($int_tx == "F") 
        //             { 
        //               // $tx = $_POST['txt'];
        //               // $pattern = "/[-]/";
        //               // $components = preg_split($pattern, $tx);
        //               // $int_t = $components[0]."-NTP";

        //               $next_value = (int)$ls1 + 1;
        //               $uid=str_pad($next_value,3,0,STR_PAD_LEFT);
        //               $data['billno']= $data['company'].'-'.$int_tx."-NTP-".$uid."/".$d;
        //             }
        //           else
        //             {
        //               $next_value = (int)$ls1 + 1;
        //               $uid=str_pad($next_value,3,0,STR_PAD_LEFT);
        //               $data['billno']= $data['company'].'-'.$int_tx."-".$uid."/".$d;

        //             }
                  
        //         }
        //         else
        //         {
        //           $next_value = (int)$ls1 + 1;
        //           $uid=str_pad($next_value,4,0,STR_PAD_LEFT);

        //           $data['billno']= $data['company'].'-'.$int_tx."-".$uid."/".$d;
        //         }
        //     }
        //     if($int_txt_lst->TYPE_OF_RECORD=='N')
        //     {
        //         $last= $int_txt_lst->BILLNO;
        //         $pattern = "/[-\/]/";
        //         $components = preg_split($pattern, $last);
        //         echo $components[count($components)-2];
        //         exit();
        //         $ls1 = $components[count($components)-2];

        //         if (strlen($ls1)=="2") 
        //         {
        //           $next_value = (int)$ls1 + 1;
        //           $uid=str_pad($next_value,2,0,STR_PAD_LEFT);

        //           $data['billno']= $int_tx."-".$uid."/".$d;
        //         }
        //         elseif (strlen($ls1)=="3") 
        //         {
        //           if ($int_tx == "F") 
        //             { 
        //               // $tx = $_POST['txt'];
        //               // $pattern = "/[-]/";
        //               // $components = preg_split($pattern, $tx);
        //               // $int_t = $components[0]."-NTP";

        //               $next_value = (int)$ls1 + 1;
        //               $uid=str_pad($next_value,3,0,STR_PAD_LEFT);
        //               $data['billno']= $int_tx."-NTP-".$uid."/".$d;
        //             }
        //           else
        //             {
        //               $next_value = (int)$ls1 + 1;
        //               $uid=str_pad($next_value,3,0,STR_PAD_LEFT);
        //               $data['billno']= $data['company'].'-'.$int_tx."-".$uid."/".$d;

        //             }
                  
        //         }
        //         else
        //         {
        //           $next_value = (int)$ls1 + 1;
        //           $uid=str_pad($next_value,4,0,STR_PAD_LEFT);

        //           $data['billno']= $data['company'].'-'.$int_tx."-".$uid."/".$d;
        //         }
        //     }
      
        // }
      $data['attended_user'] = $_SESSION['username'];
      $data['added_user'] = $_SESSION['username'];
      $data['added_time'] = date('Y-m-d H:i:s');
      // $data['check_verified'] = 'N';
      // print_r($data);
      $res=$this->Loan_model->insert_loan_master_data($data);
      if($res)
      {
        echo '||1||'.$data['billno'];
      }
      else
      {
        echo 0;
      }

    
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
        $res=$this->Loan_model->insert_receive_from_party($data);
        if($res)
        {
          echo 1;
        }
        else
        {
          echo 0;
        }
    
   }
  
    public function loan_save()
    {
          // print_r("1");
          // exit();
          // $voucher_master_key = $this->Loan_model->get_voucher_master_key($_SESSION['LOANPREFIX']);
          // $vmkval = $voucher_master_key->KEYVALUE;
          // $vMasterSno = $data['vMasterSno'] = $_SESSION['LOANPREFIX'].($vmkval+1);

          // $account_payment_key = $this->Loan_model->get_account_payment_key($_SESSION['LOANPREFIX']);
          // $apkeyval = $account_payment_key->KEYVALUE;
          // $vReceiptSno = $data['vReceiptSno'] = $_SESSION['LOANPREFIX'].($apkeyval+1);

          $loan_key = $this->Loan_model->get_loan_key($_SESSION['LOANPREFIX']);
          $apkeyval = $loan_key->KEYVALUE;
          $data['txtReceiptNo'] = $_SESSION['LOANPREFIX'].($apkeyval+1);

          $data['pid']=$this->input->post('first_name_id_hidden');
          $data['billno']=$billno=$this->input->post('bill_no');
          $data['current_rate']=$this->input->post('current_rate');
          $data['item_photo']=$this->input->post('loan_jewel_image_data');

          
          $pledge_item = explode(",",implode(",",$this->input->post('pledge_item_hidden')));
          $pledge_description = explode(",",implode(",",$this->input->post('pledge_description_hidden')));
          $pledge_purity = explode(",",implode(",",$this->input->post('pledge_purity_hidden')));
          $pledge_purity_percent = explode(",",implode(",",$this->input->post('pledge_purity_percent_hidden')));
          $pledge_weight = explode(",",implode(",",$this->input->post('pledge_weight_hidden')));
          $pledge_stone_weight = explode(",",implode(",",$this->input->post('pledge_stone_weight_hidden')));
          $pledge_less = explode(",",implode(",",$this->input->post('pledge_less_hidden')));
          $pledge_net_weight = explode(",",implode(",",$this->input->post('pledge_net_weight_hidden')));
          $pledge_is_damage = explode(",",implode(",",$this->input->post('pledge_is_damage_hidden')));
          $pledge_image=$this->input->post('pledge_image_hidden');
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

          $pledge_max_record = $this->Loan_model->get_pledge_max_record_by_bill_no($billno);

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
            if($pledge_item[$i]!='' )
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
                $pledgedata['pledge_image'] = $pledge_image[$i];
                if($pledge_is_damage[$i]=='Yes') {$pledgedata['pledge_is_damage'] = 'Y';}
                else if($pledge_is_damage[$i]=='No'){ $pledgedata['pledge_is_damage'] = 'N';}
                $pledgedata['rec_type'] = 'N';
                $this->Loan_model->insert_pledge_info($pledgedata);
            }
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
          if($dc_amount==0 || $dc_amount=='')
          {
                $data['doc_charge']=0;
          }
          if($m_points_ad>0)
          {
             $card_det=$this->db->query("select * from MEMBERSHIP_CARD where PID='".$data['pid']."'")->row();
             if(isset($card_det))
             {
                add_member_points($m_points_ad,$data['pid']);
                add_member_card_history($card_det->MEMBERSHIP_NO,$data['pid'],$process,$m_points_ad,$billno);
            }
          }

          // m_points_ad
          // $data['paid_principal'] = 0;
          // $data['paid_interest'] = $this->input->post('add_aint_new_loan_1');
          $data['balance'] = $this->input->post('loan_amount');
          $data['party_rec_loan_chg'] = $this->input->post('charges_loan_pay_amt');
          $data['party_rec_separate_chg'] = $this->input->post('charges_pay_separate_amt');
          $data['party_rec_loan_on_acc'] = $this->input->post('on_acc_loan_pay_amt');
          $data['party_rec_separate_on_acc'] = $this->input->post('on_acc_pay_separate_amt');
          
          
          $loan_amount = $data['loan_amount'] = $this->input->post('loan_amount');


          $data['net_pay']=$loan_amount-($data['party_rec_loan_chg']+$data['party_rec_loan_on_acc']);
          $res=$this->db->query("select COMPANYCODE from LOANS where BILLNO='".$data['bill_no']."'")->row();
          $data['company_code']=$res->COMPANYCODE;
          $data['process']="Loan";
          $data['header']="Loan - Awaiting Approval";
          $data['message']=$data['billno']." Create By ".$_SESSION['username']." is Awaiting Approval";
          $data['rec_uid']='002';
          $data['rec_vr_status']='0';
          

          $res=$this->Loan_model->loan_sub_detail_insert($data);


            $pid=$data['pid'];
        if($res)
        {
            $vname='LOANS-'.$_SESSION['LOANPREFIX'];
            $upd_key=$this->Loan_model->update_loan_keymaster($vname);
            $rating=$this->input->post('cust_rating');
            $res=$this->db->query("UPDATE PARTIES SET RATING=".$rating. " WHERE PID='".$pid."'");
            $rating_history=$this->db->query("INSERT INTO CUSTOMER_RATING_HISTORY (PID, LOG_DATE, PROCESS, RATING, CREATED_BY, CREATED_ON,BILLNO) VALUES('".$pid."','".date('Y-m-d')."','New Loan','".$rating."','".$_SESSION['username']."','".date('Y-m-d H:i:s')."','".$data['bill_no']."')");
        }
        $res=$this->db->query("UPDATE payment_inward_outward SET record_status=0 WHERE bill_no='".$data['billno']."' and party_id='".$pid."' ");
        redirect('loan');
    }
    public function get_document_charge()
    {
        $loan_amt=$this->input->post('ln_amt');
        $doc_chg=$this->db->query("SELECT * FROM DOC_CHARGE WHERE FROM_AMT<=".$loan_amt." AND TO_AMT>=".$loan_amt)->row();
        $d_chg=(isset($doc_chg->DC_AMT)?$doc_chg->DC_AMT:'0');
        $res=$this->Loan_model->get_member_points($loan_amt);
        echo "||".$d_chg."||".$res;
    }

    
   
    public function userList()
    {
        $search =  $_GET['query']; 
       
        $rows = $this->Loan_model->getUsers($search);
        $res='[';
        if(count($rows)>0) {
          foreach($rows as $row )
          {
              $title='';
              $name='';
              $firstname=$row->NAME;
              $lastname=$row->LASTNAME_PREFIX.','.$row->FATHERSNAME;
              $address=$row->STREETNAME.', '.$row->VILLAGENAME.', '.$row->CITYNAME;
              $address_loc=$row->STREETNAME;
              $member_id=$row->MEMBERSHIP_NO;
              $member_points=$row->MEMBERSHIP_POINTS;
              
              $rating=$row->RATING;
              $phone=$row->PHONE;

              //$card_type=$row->CARD_TYPE;
              //print_r($card_type);exit;
              //$party_photo=$row->PHOTO;
              //$id_photo=$row->OTHER_PHOTO;
              //$sign_photo=$row->SIGNATURE;

              $party_photo=base64_encode($row->PHOTO);
              $id_photo=base64_encode($row->OTHER_PHOTO);
              $sign_photo=base64_encode($row->SIGNATURE);

              // $title = $firstname.'&emsp;'.'-'.'&emsp;'.$lastname.'&emsp;'.'-'.'&emsp;'.$address.'&emsp;'.'-'.'&emsp;'.$phone;

              $title = $firstname.'   --   '.$lastname.'   --   '.$address.'   --   '.$phone;
              $res.='{ "title":"'.$title.'","id": "'.$row->PID.'","firstname":"'.$firstname.'","lastname":"'.$lastname.'","member_id":"'.$member_id.'","member_points":"'.$member_points.'","rating":"'.$rating.'","party":"'.$party_photo.'","idproof":"'.$id_photo.'","sign":"'.$sign_photo.'","address":"'.$address.'","phone":"'.$phone.'","location":"'.$address_loc.'"},';

              
          }
          $res=rtrim($res,',');
          $res.=']';
        }
        else{
          $res.=']';
        }
        print_r($res);die();
    }
     public function nomineeList()
    {
        $search =  $_GET['query']; 
        $rows = $this->Loan_model->getNominee($search);
        $res='[';
        if(count($rows)>0) {
          foreach($rows as $row )
          {
              $title='';
              $name='';
              $id=$row->PID;
              $nom_id=$row->NOMINEE_ID;
              $nom_name=$row->NOMINEE_NAME;
              $nom_mobile=$row->MOBILE_NO;
              $nom_relation=$row->RELATION;
              
              // $title = $firstname.'&emsp;'.'-'.'&emsp;'.$lastname.'&emsp;'.'-'.'&emsp;'.$address.'&emsp;'.'-'.'&emsp;'.$phone;
              // $title = $nom_name.'   --   '.$nom_relation.'   --   '.$nom_mobile;
              $title=$nom_name;
              $res.='{ "title":"'.$title.'","nom_id": "'.$nom_id.'","nom_name":"'.$nom_name.'","nom_relation":"'.$nom_relation.'","nom_mobile":"'.$nom_mobile.'"},';

              
          }
          $res=rtrim($res,',');
          $res.=']';
        }
        else{
          $res.=']';
        }
        print_r($res);die();
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
          // if(isset($nominee_details))
          // {
          //   foreach ($nominee_details as $nlist) {
          //     $option.='<option value="'.$nlist['NOMINEE_ID'].'">'.$nlist['NOMINEE_NAME'].' - '.$nlist['RELATION'].' - '.$nlist['MOBILE_NO'].'</option>';
          //   }
          // }
          // else
          // {
          //   $option="<option value=''>Select</option>";
          // }
          $this->db->query("truncate table temp_nominee");
          foreach ($nominee_details as $nlist) {
            $this->db->query("INSERT INTO temp_nominee(NOMINEE_ID, NOMINEE_NAME, RELATION, MOBILE_NO, PID) VALUES(".$nlist['NOMINEE_ID'].",'".$nlist['NOMINEE_NAME']."','".$nlist['RELATION']."','".$nlist['MOBILE_NO']."','".$pid."')");
            }

          $hl_res=$this->db->query("select sum(HL_DEBIT) -sum(HL_CREDIT) as hl_balance from HL_TRANS where HL_PID='".$pid."'")->row();
          if(count((array)$hl_res)>0 )
          {
                if($hl_res->hl_balance>0)
                {
                    $hl_bal=number_format($hl_res->hl_balance,2)." Dr.";
                }
                else
                {
                    $hl_bal=number_format(-($hl_res->hl_balance),2)." Cr.";
                }
          }
          else
          {
            $hl_bal='0.00';
          }
          echo $option .'||'.$hl_balance ;
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
        $rows = $this->Loan_model->get_pledge_list($search);
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
      public function set_customer_rating()
      {
        $rating=$this->input->post('val');
        $pid=$this->input->post('id');
        $res=$this->db->query("UPDATE PARTIES SET RATING=".$rating. " WHERE PID='".$pid."'");
        $rating_history=$this->db->query("INSERT INTO CUSTOMER_RATING_HISTORY (PID, LOG_DATE, PROCESS, RATING, CREATED_BY, CREATED_ON) VALUES('".$pid."','".date('Y-m-d')."','New Loan','".$rating."','".$_SESSION['username']."','".date('Y-m-d H:i:s')."')");
        return TRUE;
      }
      public function update_party_phone_no()
      {
          $party_id=$this->input->post('pid');
          $new_mobile_no=$this->input->post('new_no');

          $res=$this->db->query("update PARTIES set PHONE='".$new_mobile_no."' where PID='".$party_id."'");
          return true;
      }

      public function loan_redo()
      {
          $lid =$bill_no= $_POST['id'];
          $desc=$_POST['redo_description'];
          // $desc="Loan Amount entered need to be corrected";
          $loan_details=$this->db->query("select * from LOANS where BILLNO='".$lid."'")->row();
          $upd_status=$this->db->query("UPDATE LOANS SET LOAN_STATUS=2 where BILLNO='".$lid."'");
           add_notification(date('Y-m-d H:i:s'), $loan_details->COMPANYCODE, "Loan", "Updation Required", $desc,'', '0001', '0', $bill_no);
          echo $upd_status;
      }
       public function loan_direct_approve()
      {
          $lid =$bill_no= $_POST['id'];
          
          $desc=$bill_no." - Loan Approved by ".$_SESSION['username'];
          $loan_details=$this->db->query("select * from LOANS where BILLNO='".$lid."'")->row();
          // print_r($loan_details);
          // exit();
          $upd_status=$this->db->query("UPDATE LOANS SET LOAN_STATUS=6 where BILLNO='".$lid."'");
           add_notification(date('Y-m-d H:i:s'), $loan_details->COMPANYCODE, "Loan", "Approved", $desc,'', '0001', '0', $bill_no);
           add_notification(date('Y-m-d H:i:s'), $loan_details->COMPANYCODE, "Loan", "Approved", $desc, '','002', '0', $bill_no);
          echo $upd_status;
      }
      public function loan_approve_otp()
      {
          $lid =$bill_no= $_POST['id'];
          $otp=rand(0000,9999);
           $desc=$bill_no." - Loan Approval OTP ".$otp."for".$_SESSION['username'];
           $loan_details=$this->db->query("select * from LOANS where BILLNO='".$bill_no."'")->row();
           $res=add_notification(date('Y-m-d H:i:s'), $loan_details->COMPANYCODE, "Loan", "Loan Approve OTP request", $desc,$otp, '002', '0', $bill_no);
           if($res)
           echo "1";
         else
          echo "0";
      }
      public function loan_otp_based_approve()
      {
          $lid =$bill_no= $_POST['id'];
          $otp= $_POST['otp'];

          $otp_verify=$this->db->query("select top 1 * from notification where bill_no='".$bill_no."' and otp_for_user ='".$otp."' order by created_on desc")->row();
          
          if(isset($otp_verify))
          {
            $upd_loan=$this->db->query("update LOANS set LOAN_STATUS=6 where BILLNO='".$bill_no."'");
            echo "1";
          }
          else
          {
            echo "0";
          }
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
              // $int = ($loan_details->AMOUNT*$loan_details->INTEREST)/100;
              $int=($loan_details->AMOUNT*$loan_details->INTEREST*$loan_details->MONTHS)/100;

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

              $res=$this->db->query("select * from  PARTIES where PID ='".$loan_details->PID."'")->row();
              if($res->OTHER_PHOTO!='')
               {
               $other_photo="<img src='data:image/jpg;charset=utf8;base64,".base64_encode($res->other_PHOTO)."'  height='125px' width='125px'>";
               }
               else
               {
                $other_photo="<img src='".base_url()."assets/images/idproof.jpg' height='125px' width='125px' >";
               }

               $res=$this->db->query("select * from loan_status where id='".$loan_details->LOAN_STATUS."'")->row();
               if(isset($res))
               {
                    $loan_status1='<span style='."'".'background-color:'.$res->color_code.';border-radius: 8px;padding: 5px 15px 5px 15px;'."'".'>'.$res->loan_stage.'</span>';
               }
               else
               {
                    $loan_status1='<span style="background-color:#e3e1e1 ;border-radius: 8px;padding: 5px 15px 5px 15px;">Inactive</span>';
               }

              echo "||".$due_status."||".$days1."||".$months1."||".$other_photo."||".$loan_status1."||".$receipt_count;
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
            $interest_details='';
            $data['txtPaidInterest']=0;
            $data['txtPaidPrincipal']=0;

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
                    // $vIntStr=$vIntStr.$interest_details;


                    if(substr($vIntType, 0,2)=="F-" or substr($vIntType, 0,2)=="H-")
                    {
                        // $vIntStr=$vIntStr."<tr>"."Principal : " .number_format($loan_details->AMOUNT,2). "Int : ".number_format(($loan_details->AMOUNT+$vFInt ),2)." Paid : ".number_format(($vPaidPrincipal+$vPaidInterest),2)." Bal : ".number_format(($vLoanAmount+$vFInt-$vPaidTotal),2)." Period : ".$vLoanPeriod." Days". " Rate : ".number_format($vLoanIntPercent,2)."</tr>";
                         // $vIntStr=$vIntStr."<tr><td></td><td></td><td>".number_format($vLoanIntPercent,2)."</td><td>".number_format(round($loan_details->AMOUNT,2),2)."</td><td>".number_format(round(($loan_details->AMOUNT+$vFInt),2),2)."</td><td>".number_format(($vPaidPrincipal+$vPaidInterest),2)."</td><td>".number_format(($vLoanAmount+$vFInt-$vPaidTotal),2)."</td></tr>";
                        $vIntStr=$vIntStr."<tr><td></td><td>".number_format($vLoanIntPercent,2)."</td><td>".number_format(round($loan_details->AMOUNT,2),2)."</td><td>".number_format(round(($loan_details->AMOUNT+$vFInt),2),2)."</td><td>".number_format(($vLoanAmount+$vFInt-$vPaidTotal),2)."</td></tr>";
                        $vPerDayInterest=$vLoanAmount*10/10000;
                        $vNewP=$vLoanAmount+($vLoanPeriod * $vPerDayInterest) - $vPaidTotal;
                        $vNewP2=$vNewP;
                        $vNewPrincipal=$vNewP;
                    }
                    else
                    {
                        // $vIntStr = $vIntStr ."<tr>". "Principal : ".number_format($vLoanAmount,2). " Int : ". number_format($vFInt,2). " Tot : ".number_format(($vLoanAmount+$vFInt),2)." Paid : ".number_format(($vPaidPrincipal+$vPaidInterest),2)." Bal : ".number_format(($vLoanAmount+$vFInt-$vPaidTotal),2). " Period : ".number_format($vLoanPeriod,2)." Months "." Rate : ". number_format($vLoanIntPercent,2)."</tr>";
                       // $vIntStr = $vIntStr ."<tr><td></td><td></td><td>".number_format($vLoanIntPercent,2)."</td><td>".number_format(round($vLoanAmount,2),2)."</td><td>".number_format(round($vFInt,2),2)."</td><td>".number_format(($vPaidPrincipal+$vPaidInterest),2)."</td><td>".number_format(($vLoanAmount+$vFInt-$vPaidTotal),2)."</td></tr>";
                        $vIntStr = $vIntStr ."<tr><td></td><td>".number_format($vLoanIntPercent,2)."</td><td>".number_format(round($vLoanAmount,2),2)."</td><td>".number_format(round($vFInt,2),2)."</td><td>".number_format(($vLoanAmount+$vFInt-$vPaidTotal),2)."</td></tr>";

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
                    // $vIntStr=$vIntStr.$interest_details;
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
                      $vIntStr= "<tr><td></td><td>".number_format($vLoanIntPercent,2)."</td><td>".number_format(round($vLoanAmount,2),2)."</td><td>".number_format(round($vFInt,2),2)."</td><td>".number_format(($vLoanAmount + $vFInt),2)."</td></tr>";
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
                      $vIntStr= "<tr><td>".$edt."</td><td>".number_format($vLoanIntPercent,2)."</td><td>".number_format(round($vLoanAmount,2),2)."</td><td>".number_format(round($vFInt,2),2)."</td><td>".number_format(($vLoanAmount + $vFInt),2)."</td></tr>";
                        
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
                            
                            $vIntStr = $vIntStr ."<tr><td>".$next_edt."<br>(".$p." months)</td><td>".number_format($vCalcInt,2)."</td><td>". round($vNewP,2)."</td><td>".number_format(round($vSInt,2),2)."</td><td>".number_format(($vNewP + $vSInt),2)."</td></tr>";

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
                            // $vIntStr = $vIntStr . "<tr><td>".$next_edt."<br>(".$vExtraDays." days)</td><td> - </td><td>". number_format($vCalcInt,2)."</td><td>".number_format(round($vNewP2,2),2)."</td><td>".number_format(round($vIntforBaldays,2),2)."</td><td>0.00</td><td>".number_format(($vNewP2 + $vIntforBaldays),2)."</td></tr>";
                            $vIntStr = $vIntStr . "<tr><td>".$next_edt."<br>(".$vExtraDays." days)</td><td>". number_format($vCalcInt,2)."</td><td>".number_format(round($vNewP2,2),2)."</td><td>".number_format(round($vIntforBaldays,2),2)."</td><td>".number_format(($vNewP2 + $vIntforBaldays),2)."</td></tr>";
                        }
                        else
                        {
                            $vIntforBaldays = $vNewPrincipal * $vIntMonths * $vCalcInt / 100;
                            $vTotalInt = round($vTotalInt) + $vIntforBaldays;
                            // $vIntStr = $vIntStr . "<tr>". "Principal : " . number_format($vNewPrincipal,2). " Int : " .number_format($vIntforBaldays,2). " Tot : ". number_format(($vNewP2 + $vIntforBaldays),2) . " Period : " . $vExtraDays. " days" . " Rate : " . number_format($vCalcInt,2). "</tr>";
                            $next_edt2=date('Y-m-d',strtotime($next_edt1.' +'.$vFullDays.' days'));

                            $next_edt=$next_edt2;
                              // $vIntStr = $vIntStr . "<tr><td>".$next_edt."<br>(".$vFullDays." days)</td><td> - </td><td>". number_format($vCalcInt,2)."</td><td>".number_format(round($vNewPrincipal,2),2)."</td><td>".number_format(round($vIntforBaldays,2),2)."</td><td>0.00</td><td>".number_format(($vNewP2 + $vIntforBaldays),2)."</td></tr>";
                             $vIntStr = $vIntStr . "<tr><td>".$next_edt."<br>(".$vFullDays." days)</td><td>". number_format($vCalcInt,2)."</td><td>".number_format(round($vNewPrincipal,2),2)."</td><td>".number_format(round($vIntforBaldays,2),2)."</td><td>".number_format(($vNewP2 + $vIntforBaldays),2)."</td></tr>";
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
                $vIntStr = $vIntStr . "<tr><td></td><td><b>Total</b> </td> <td><b>".$vLoanAmount."</b></td><td> <b>" . number_format($vTotalInterest,2)."</b></td>";
                // $vIntStr = $vIntStr . "    Total Amount : " .number_format(($vLoanAmount + $vTotalInterest),2)."</td>";
                // $vIntStr = $vIntStr ."<td><b>" .number_format($vTotalPaidAmount,2)."</b></td>";
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
                    // $vIntStr = $vIntStr . "<tr><td></td><td></td><td>".number_format($vIntPerMonth,2)."</td><td>".number_format(round($vLoanAmount,2),2)."</td><td>".number_format(round($data['txtInterest'],2),2)."</td><td>0.00</td><td>".number_format(($vLoanAmount + $data['txtInterest']),2)."</td></tr>";
                    $vIntStr = $vIntStr . "<tr><td></td><td>".number_format($vIntPerMonth,2)."</td><td>".number_format(round($vLoanAmount,2),2)."</td><td>".number_format(round($data['txtInterest'],2),2)."</td><td>0.00</td><td>".number_format(($vLoanAmount + $data['txtInterest']),2)."</td></tr>";

                    $data['vIntStr'] = $vIntStr;
                 }
            }

                              // print_r($vIntStr);
                              // exit();
         echo "||".$vIntStr."||".$vTotalInterest."||".$data['txtPaidPrincipal']."||".$data['txtPaidInterest']."||".$data['txtPaidTotal']."||".$data['txtTotal']."||".$vLoanAmount."||".$interest_details;
          
      }
      public function load_init_tab_details()
      {
            $billno=$this->input->post('bill_no');

            
           $data['loan_details']=$this->db->query("select * from LOANS where BILLNO='".$billno."'")->row();
           
       
           

            $data['PROCESSING_CHARGE']=floatval($data['loan_details']->PROCESSING_CHARGE) > 0 ? floatval($data['loan_details']->PROCESSING_CHARGE) : "0.00";
            $data['DCAMOUNT']=floatval($data['loan_details']->DCAMOUNT) > 0 ? floatval($data['loan_details']->DCAMOUNT) : "0.00";
            $data['TOTAL_CHARGE']=$data['PROCESSING_CHARGE']+$data['DCAMOUNT'];
            $data['PARTY_REC_LOAN_CHG']=floatval($data['loan_details']->PARTY_REC_LOAN_CHG) > 0 ? floatval($data['loan_details']->PARTY_REC_LOAN_CHG) : "0.00";
            $data['PARTY_REC_SEPERATE_CHG']=floatval($data['loan_details']->PARTY_REC_SEPARATE_CHG) > 0 ? floatval($data['loan_details']->PARTY_REC_SEPARATE_CHG) : "0.00";
            $data['PARTY_REC_LOAN_ON_ACC']=floatval($data['loan_details']->PARTY_REC_LOAN_ON_ACC) > 0 ? floatval($data['loan_details']->PARTY_REC_LOAN_ON_ACC) : "0.00";
            $data['PARTY_REC_SEPERATE_ON_ACC']=floatval($data['loan_details']->PARTY_REC_SEPARATE_ON_ACC)> 0 ? floatval($data['loan_details']->PARTY_REC_SEPARATE_ON_ACC) : "0.00";
            $data['HL_AMOUNT']=floatval($data['loan_details']->HL_AMOUNT)> 0 ? floatval($data['loan_details']->HL_AMOUNT) : "0.00";

            // print_r($data['PROCESSING_CHARGE']);
            $payment_receive=$this->db->query("select * from payment_inward_outward where bill_no='".$billno."' and module_name='New loan - receive'")->result_array();
            $cnt=count((array)$payment_receive);
            // echo $cnt;
            // exit();
            $data['pay_recv_str']='';
            if($cnt>0)
            {   
                foreach ($payment_receive as $plist) 
                {
                    if($plist['type_of_payment']=='Cash')
                    {
                        $data['pay_recv_str'].='<div class="row">
                                <label class="col-lg-1 col-form-label fw-semibold fs-6">Cash</label>
                                <label class="col-lg-2 col-form-label fw-bold fs-5">'.$plist['amount'].'</label>
                                <label class="col-lg-1 col-form-label fw-semibold fs-6">Details</label>
                                <label class="col-lg-2 col-form-label fw-bold fs-5">'.$plist['remarks'].'</label></div>';
                    }
                    elseif ($plist['type_of_payment']=='Cheque') 
                    {
                        $data['pay_recv_str'].='<div class="row">
                                <label class="col-lg-1 col-form-label fw-semibold fs-6">Cheque</label>
                                <label class="col-lg-2 col-form-label fw-bold fs-5">'.$plist['amount'].'</label>
                                <label class="col-lg-1 col-form-label fw-semibold fs-6">Party Bank</label>
                                <label class="col-lg-2 col-form-label fw-bold fs-5">'.$plist['party_bank'].'</label>
                                <label class="col-lg-1 col-form-label fw-semibold fs-6">Ref.No</label>
                                <label class="col-lg-2 col-form-label fw-bold fs-5">'.$plist['cheque_ref_no'].'</label>
                                <label class="col-lg-1 col-form-label fw-semibold fs-6">Details</label>
                                <label class="col-lg-2 col-form-label fw-bold fs-5">'.$plist['remarks'].'</label></div>';
                    }
                    elseif ($plist['type_of_payment']=='RTGS') 
                    {
                        $company_bank_name=$this->db->query("select * from  BANKS where SNO='".$plist['company_bank']."'")->row();
                        $data['pay_recv_str'].='<div class="row">
                                <label class="col-lg-1 col-form-label fw-semibold fs-6">RTGS</label>
                                <label class="col-lg-2 col-form-label fw-bold fs-5">'.$plist['amount'].'</label>
                                <label class="col-lg-1 col-form-label fw-semibold fs-6">Ref.No</label>
                                <label class="col-lg-2 col-form-label fw-bold fs-5">'.$plist['cheque_ref_no'].'</label>
                                <label class="col-lg-1 col-form-label fw-semibold fs-6">Cmy. Bank</label>
                                <label class="col-lg-2 col-form-label fw-bold fs-5">'.$company_bank_name->BANKNAME.' - '.$company_bank_name->PERSONNAME.' - '.$company_bank_name->ACCOUNTNO.'</label>
                                <label class="col-lg-1 col-form-label fw-semibold fs-6">Details</label>
                                <label class="col-lg-2 col-form-label fw-bold fs-5">'.$plist['remarks'].'</label></div>';
                    }
                    elseif ($plist['type_of_payment']=='UPI') 
                    {
                        $company_bank_name=$this->db->query("select * from  BANKS where SNO='".$plist['company_bank']."'")->row();
                        $data['pay_recv_str'].='<div class="row">
                                <label class="col-lg-1 col-form-label fw-semibold fs-6">UPI</label>
                                <label class="col-lg-2 col-form-label fw-bold fs-5">'.$plist['amount'].'</label>
                                <label class="col-lg-1 col-form-label fw-semibold fs-6">Ref.No</label>
                                <label class="col-lg-2 col-form-label fw-bold fs-5">'.$plist['cheque_ref_no'].'</label>
                                <label class="col-lg-1 col-form-label fw-semibold fs-6">Cmy. Bank</label>
                                <label class="col-lg-2 col-form-label fw-bold fs-5">'.$company_bank_name->BANKNAME.' - '.$company_bank_name->PERSONNAME.' - '.$company_bank_name->ACCOUNTNO.'</label>
                                <label class="col-lg-1 col-form-label fw-semibold fs-6">Details</label>
                                <label class="col-lg-2 col-form-label fw-bold fs-5">'.$plist['remarks'].'</label></div>';
                    }
                    elseif ($plist['type_of_payment']=='Membership Card') 
                    {
                        $data['pay_recv_str'].='<div class="row">
                                <label class="col-lg-1 col-form-label fw-semibold fs-6">Mem. Card</label>
                                <label class="col-lg-2 col-form-label fw-bold fs-5">'.$plist['amount'].'</label>
                                <label class="col-lg-1 col-form-label fw-semibold fs-6">Card No</label>
                                <label class="col-lg-2 col-form-label fw-bold fs-5">'.$plist['cheque_ref_no'].'</label>
                                <label class="col-lg-1 col-form-label fw-semibold fs-6">Details</label>
                                <label class="col-lg-2 col-form-label fw-bold fs-5">'.$plist['remarks'].'</label></div>';
                    }
                }
            }
            if($cnt<=0)
            {
                $data['pay_recv_str'].='<div class="row">
                                <label class="col-lg-1 col-form-label fw-semibold fs-6">Cash</label>
                                <label class="col-lg-2 col-form-label fw-bold fs-5">-</label>
                                <label class="col-lg-1 col-form-label fw-semibold fs-6">Details</label>
                                <label class="col-lg-2 col-form-label fw-bold fs-5">-</label>
                            </div>
                            <div class="row">
                                <label class="col-lg-1 col-form-label fw-semibold fs-6">Cheque</label>
                                <label class="col-lg-2 col-form-label fw-bold fs-5">-</label>
                                <label class="col-lg-1 col-form-label fw-semibold fs-6">Party Bank</label>
                                <label class="col-lg-2 col-form-label fw-bold fs-5">-</label>
                                <label class="col-lg-1 col-form-label fw-semibold fs-6">Ref.No</label>
                                <label class="col-lg-2 col-form-label fw-bold fs-5">-</label>
                                <label class="col-lg-1 col-form-label fw-semibold fs-6">Details</label>
                                <label class="col-lg-2 col-form-label fw-bold fs-5">-</label>
                            </div>
                            <div class="row">
                                <label class="col-lg-1 col-form-label fw-semibold fs-6">RTGS</label>
                                <label class="col-lg-2 col-form-label fw-bold fs-5">-</label>
                                <label class="col-lg-1 col-form-label fw-semibold fs-6">Ref.No</label>
                                <label class="col-lg-2 col-form-label fw-bold fs-5">-</label>
                                <label class="col-lg-1 col-form-label fw-semibold fs-6">Cmy.Bank</label>
                                <label class="col-lg-2 col-form-label fw-bold fs-5">-</label>
                                <label class="col-lg-1 col-form-label fw-semibold fs-6">Details</label>
                                <label class="col-lg-2 col-form-label fw-bold fs-5">-</label>
                            </div>
                            <div class="row">
                                <label class="col-lg-1 col-form-label fw-semibold fs-6">UPI</label>
                                <label class="col-lg-2 col-form-label fw-bold fs-5">-</label>
                                <label class="col-lg-1 col-form-label fw-semibold fs-6">Ref.No</label>
                                <label class="col-lg-2 col-form-label fw-bold fs-5">-</label>
                                <label class="col-lg-1 col-form-label fw-semibold fs-6">Cmy.Bank</label>
                                <label class="col-lg-2 col-form-label fw-bold fs-5">-</label>
                                <label class="col-lg-1 col-form-label fw-semibold fs-6">Details</label>
                                <label class="col-lg-2 col-form-label fw-bold fs-5">-</label>
                            </div>
                            <div class="row">
                            <label class="col-lg-1 col-form-label fw-semibold fs-6">Membership card</label>
                            <label class="col-lg-2 col-form-label fw-bold fs-5">-</label>
                            <label class="col-lg-1 col-form-label fw-semibold fs-6">Card No</label>
                            <label class="col-lg-2 col-form-label fw-bold fs-5">-</label>
                            <label class="col-lg-1 col-form-label fw-semibold fs-6">Details</label>
                            <label class="col-lg-2 col-form-label fw-bold fs-5">-</label>
                        </div>';
            }

            $pay_rcv=$this->db->query("select SUM(amount) as recv_amt from payment_inward_outward where bill_no='".$billno."' and module_name='New loan - receive'")->row();
            if(isset($pay_rcv->recv_amt))
            {
                $bal=($data['loan_details']->PARTY_REC_SEPARATE_CHG + $data['loan_details']->PARTY_REC_SEPARATE_ON_ACC )- $pay_rcv->recv_amt;
                $data['pay_recv_str'].='<div class="row mt-4">
                        <div class="col-lg-6 text-center">
                            <label class="col-form-label fw-bold fs-3">Paid Amount &emsp;</label>
                            <label class="col-form-label fw-bold fs-3">'.$pay_rcv->recv_amt.'</label>
                        </div>
                        <div class="col-lg-6 text-center">
                            <label class="col-form-label fw-bold fs-3">Balance Amount &emsp;</label>
                            <label class="col-form-label fw-bold fs-3">'.$bal.'</label>
                        </div>
                    </div>';
            }
            else
            {
                $data['pay_recv_str'].='<div class="row mt-4">
                        <div class="col-lg-6 text-center">
                            <label class="col-form-label fw-bold fs-3">Paid Amount &emsp;</label>
                            <label class="col-form-label fw-bold fs-3">0.00</label>
                        </div>
                        <div class="col-lg-6 text-center">
                            <label class="col-form-label fw-bold fs-3">Balance Amount &emsp;</label>
                            <label class="col-form-label fw-bold fs-3">0.00</label>
                        </div>
                    </div>';

                // $data['pay_recv_str']='<div> 1 </div>';
            }
            
            $to_pay_details=$this->db->query("select * from payment_inward_outward where bill_no='".$billno."' and module_name='New loan - pay'")->result_array();

            $cnt=count((array)$to_pay_details);
            // echo $cnt;
            // exit();
            $data['to_pay_str']='';
            if($cnt>0)
            {   
                foreach ($to_pay_details as $plist) 
                {
                    if($plist['type_of_payment']=='Cash')
                    {
                        $data['to_pay_str'].='<div class="row">
                                <label class="col-lg-1 col-form-label fw-semibold fs-6">Cash</label>
                                <label class="col-lg-2 col-form-label fw-bold fs-5">'.$plist['amount'].'</label>
                                <label class="col-lg-1 col-form-label fw-semibold fs-6">Details</label>
                                <label class="col-lg-2 col-form-label fw-bold fs-5">'.$plist['remarks'].'</label></div>';
                    }
                    elseif ($plist['type_of_payment']=='Cheque') 
                    {
                        $company_bank_name = $this->db->query("select * from  BANKS where SNO='".$plist['company_bank']."'")->row();

                        $data['to_pay_str'].='<div class="row">
                        <div class="col-lg-3"><label class="col-form-label fw-semibold fs-6">Cheque &emsp;</label><label class="col-form-label fw-bold fs-5 text-end">'.$plist['amount'].'</label></div>
                        <div class="col-lg-2">
                            <label class="col-form-label fw-semibold fs-6">Ref.No &emsp;</label>
                            <label class="col-form-label fw-bold fs-5">'.$plist['cheque_ref_no'].'</label></div>
                        <div class="col-lg-2">
                            <label class="col-form-label fw-semibold fs-6">Cmy.bank &emsp;</label>
                            <label class="col-form-label fw-bold fs-5">'.$company_bank_name->BANKNAME.' - '.$company_bank_name->PERSONNAME.' - '.$company_bank_name->ACCOUNTNO.'</label></div>
                        <div class="col-lg-2">
                            <label class="col-form-label fw-semibold fs-6">Party bank &emsp;</label>
                            <label class="col-form-label fw-bold fs-5">-</label></div>
                        <div class="col-lg-3">
                            <label class="col-form-label fw-semibold fs-6">Details &emsp;</label>
                            <label class="col-form-label fw-bold fs-5">'.$plist['remarks'].'</label></div></div>';
                        
                    }
                    elseif($plist['type_of_payment']=='RTGS') 
                    {
                        $company_bank_name= $this->db->query("select * from  BANKS where SNO='".$plist['company_bank']."'")->row();
                        $data['to_pay_str'].='<div class="row">
                        <div class="col-lg-3">
                            <label class="col-form-label fw-semibold fs-6">RTGS &emsp;</label>
                            <label class="col-form-label fw-bold fs-5 text-end">'.$plist['amount'].'</label>
                        </div>
                        <div class="col-lg-2">
                            <label class="col-form-label fw-semibold fs-6">Ref.No &emsp;</label>
                            <label class="col-form-label fw-bold fs-5">'.$plist['cheque_ref_no'].'</label>
                        </div>
                        <div class="col-lg-2">
                            <label class="col-form-label fw-semibold fs-6">Cmy.bank &emsp;</label>
                            <label class="col-form-label fw-bold fs-5">'.$company_bank_name->BANKNAME.' - '.$company_bank_name->PERSONNAME.' - '.$company_bank_name->ACCOUNTNO.'</label>
                        </div>
                        <div class="col-lg-2">
                            <label class="col-form-label fw-semibold fs-6">Party bank &emsp;</label>
                            <label class="col-form-label fw-bold fs-5">-</label>
                        </div>
                        <div class="col-lg-3">
                            <label class="col-form-label fw-semibold fs-6">Details &emsp;</label>
                            <label class="col-form-label fw-bold fs-5">'.$plist['remarks'].'</label>
                        </div>
                    </div>';
                    }
                    elseif ($plist['type_of_payment']=='UPI') 
                    {
                        $company_bank_name=$this->db->query("select * from  BANKS where SNO='".$plist['company_bank']."'")->row();
                        $data['to_pay_str'].='<div class="row">
                        <div class="col-lg-3">
                            <label class="col-form-label fw-semibold fs-6">UPI &emsp;</label>
                            <label class="col-form-label fw-bold fs-5 text-end">'.$plist['amount'].'</label>
                        </div>
                        <div class="col-lg-2">
                            <label class="col-form-label fw-semibold fs-6">Ref.No &emsp;</label>
                            <label class="col-form-label fw-bold fs-5">'.$plist['cheque_ref_no'].'</label>
                        </div>
                        <div class="col-lg-2">
                            <label class="col-form-label fw-semibold fs-6">Cmy.bank &emsp;</label>
                            <label class="col-form-label fw-bold fs-5">'.$company_bank_name->BANKNAME.' - '.$company_bank_name->PERSONNAME.' - '.$company_bank_name->ACCOUNTNO.'</label>
                        </div>
                        <div class="col-lg-2">
                            <label class="col-form-label fw-semibold fs-6">Party bank &emsp;</label>
                            <label class="col-form-label fw-bold fs-5">-</label>
                        </div>
                        <div class="col-lg-3">
                            <label class="col-form-label fw-semibold fs-6">Details &emsp;</label>
                            <label class="col-form-label fw-bold fs-5">'.$plist['remarks'].'</label>
                        </div>
                    </div>';
                    }
                    elseif($plist['type_of_payment']==' Membership Card')
                    {
                        $MEMBERSHIP=$this->db->query("select * from  MEMBERSHIP_ACTIVATE where ACTIVATE_ID='".$plist['cheque_ref_no']."'")->row();
                        $data['to_pay_str'].='<div class="row">
                                <label class="col-lg-1 col-form-label fw-semibold fs-6">Mem. Card</label>
                                <label class="col-lg-2 col-form-label fw-bold fs-5">'.$plist['amount'].'</label>
                                <label class="col-lg-1 col-form-label fw-semibold fs-6">Card No</label>
                                <label class="col-lg-2 col-form-label fw-bold fs-5">'.$MEMBERSHIP->MEMBERSHIP_NO.'</label>
                                <label class="col-lg-1 col-form-label fw-semibold fs-6">Details</label>
                                <label class="col-lg-2 col-form-label fw-bold fs-5">'.$plist['remarks'].'</label></div>';
                    }
                    
                }
            }
            if($cnt<=0)
            {
                $data['to_pay_str'].='<div class="row">
                        <label class="col-lg-1 col-form-label fw-semibold fs-6">Cash</label>
                        <label class="col-lg-2 col-form-label fw-bold fs-5">-</label>
                        <label class="col-lg-1 col-form-label fw-semibold fs-6">Details</label>
                        <label class="col-lg-2 col-form-label fw-bold fs-5">-</label>
                    </div>
                    <div class="row">
                        <div class="col-lg-3">
                            <label class="col-form-label fw-semibold fs-6">Cheque &emsp;</label>
                            <label class="col-form-label fw-bold fs-5 text-end">-</label>
                        </div>
                        <div class="col-lg-2">
                            <label class="col-form-label fw-semibold fs-6">Ref.No &emsp;</label>
                            <label class="col-form-label fw-bold fs-5">-</label>
                        </div>
                        <div class="col-lg-2">
                            <label class="col-form-label fw-semibold fs-6">Cmy.bank &emsp;</label>
                            <label class="col-form-label fw-bold fs-5">-</label>
                        </div>
                        <div class="col-lg-2">
                            <label class="col-form-label fw-semibold fs-6">Party bank &emsp;</label>
                            <label class="col-form-label fw-bold fs-5">-</label>
                        </div>
                        <div class="col-lg-3">
                            <label class="col-form-label fw-semibold fs-6">Details &emsp;</label>
                            <label class="col-form-label fw-bold fs-5">-</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-3">
                            <label class="col-form-label fw-semibold fs-6">RTGS &emsp;</label>
                            <label class="col-form-label fw-bold fs-5 text-end">-</label>
                        </div>
                        <div class="col-lg-2">
                            <label class="col-form-label fw-semibold fs-6">Ref.No &emsp;</label>
                            <label class="col-form-label fw-bold fs-5">-</label>
                        </div>
                        <div class="col-lg-2">
                            <label class="col-form-label fw-semibold fs-6">Cmy.bank &emsp;</label>
                            <label class="col-form-label fw-bold fs-5">-</label>
                        </div>
                        <div class="col-lg-2">
                            <label class="col-form-label fw-semibold fs-6">Party bank &emsp;</label>
                            <label class="col-form-label fw-bold fs-5">-</label>
                        </div>
                        <div class="col-lg-3">
                            <label class="col-form-label fw-semibold fs-6">Details &emsp;</label>
                            <label class="col-form-label fw-bold fs-5">-</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-3">
                            <label class="col-form-label fw-semibold fs-6">UPI &emsp;</label>
                            <label class="col-form-label fw-bold fs-5 text-end">-</label>
                        </div>
                        <div class="col-lg-2">
                            <label class="col-form-label fw-semibold fs-6">Ref.No &emsp;</label>
                            <label class="col-form-label fw-bold fs-5">-</label>
                        </div>
                        <div class="col-lg-2">
                            <label class="col-form-label fw-semibold fs-6">Cmy.bank &emsp;</label>
                            <label class="col-form-label fw-bold fs-5">-</label>
                        </div>
                        <div class="col-lg-2">
                            <label class="col-form-label fw-semibold fs-6">Party bank &emsp;</label>
                            <label class="col-form-label fw-bold fs-5">-</label>
                        </div>
                        <div class="col-lg-3">
                            <label class="col-form-label fw-semibold fs-6">Details &emsp;</label>
                            <label class="col-form-label fw-bold fs-5">-</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-3">
                            <label class="col-form-label fw-semibold fs-6">Membership &emsp;</label>
                            <label class="col-form-label fw-bold fs-5 text-end">-</label>
                        </div>
                        <div class="col-lg-2">
                            <label class="col-form-label fw-semibold fs-6">Card No &emsp;</label>
                            <label class="col-form-label fw-bold fs-5">-</label>
                        </div>
                      
                        <div class="col-lg-3">
                            <label class="col-form-label fw-semibold fs-6">Details &emsp;</label>
                            <label class="col-form-label fw-bold fs-5">-</label>
                        </div>
                    </div>';
            }

            $to_pay_sum=$this->db->query("select SUM(amount) as paid_amt from payment_inward_outward where bill_no='".$billno."' and module_name='New loan - pay'")->row();
            if(isset($to_pay_sum->paid_amt))
            {
                $bal=$data['loan_details']->AMOUNT - $to_pay_sum->paid_amt;
                $data['to_pay_str'].='<div class="row mt-4">
                        <div class="col-lg-6 text-center">
                            <label class="col-form-label fw-bold fs-3">Paid Amount &emsp;</label>
                            <label class="col-form-label fw-bold fs-3">'.$to_pay_sum->paid_amt.'</label>
                        </div>
                        <div class="col-lg-6 text-center">
                            <label class="col-form-label fw-bold fs-3">Balance Amount &emsp;</label>
                            <label class="col-form-label fw-bold fs-3">'.$bal.'</label>
                        </div>
                    </div>';
            }
            else
            {
                $data['to_pay_str'].='<div class="row mt-4">
                        <div class="col-lg-6 text-center">
                            <label class="col-form-label fw-bold fs-3">Paid Amount &emsp;</label>
                            <label class="col-form-label fw-bold fs-3">0.00</label>
                        </div>
                        <div class="col-lg-6 text-center">
                            <label class="col-form-label fw-bold fs-3">Balance Amount &emsp;</label>
                            <label class="col-form-label fw-bold fs-3">0.00</label>
                        </div>
                    </div>';
            }

        //    print_r($data);exit;
            header('Content-type: application/json'); 
            echo json_encode($data);
            // echo $data;
      }
      public function nominee_script()
      {
        $res=$this->db->query("select * from LOANS where RELATION !='' and RELATION is not null and RELATION not in ('NIL','NL','NILL')")->result_array();
            
      }
        public function sd_new_view($id)
      {
        $loan_no = str_replace("_","/",$id);
        // $loan_no = $this->input->post('loan_no');   
        // $loan_no = '3TP-190/22';
        // print_r($loan_no);exit;
        $data['party'] = $this->db->query("SELECT PARTIES.PID, PARTIES.NAME, PARTIES.PHONE, PARTIES.ADDRESS1, PARTIES.ADDRESS2,PARTIES.STREET_ID,  
        PARTIES.MEMBERSHIP_ID, PARTIES.MEMBERSHIP_POINTS, LOANS.BILLNO, LOANS.COMPANYCODE, LOANS.JEWEL_TYPE, LOANS.BILLNO, 
        LOANS.NETWEIGHT, LOANS.AMOUNT, LOANS.INTEREST, LOANS.INTERESTTYPE, LOANS.NOMINEE, LOANS.RELATION,
        COMPANY.COMPANYCODE, COMPANY.COMPANYNAME
        FROM ((LOANS
        INNER JOIN PARTIES ON PARTIES.PID = LOANS.PID)
        INNER JOIN COMPANY ON COMPANY.COMPANYCODE = LOANS.COMPANYCODE) WHERE LOANS.BILLNO = '".$loan_no."' ")->row();

        $village = $this->db->query("SELECT * FROM VILLAGE WHERE VILLAGEID = '".$data['party']->ADDRESS2."'  ")->row();

        $street = $this->db->query("SELECT * FROM STREET WHERE STREETID = '".$data['party']->STREET_ID."'  ")->row();

        $data['address']=$street->STREETNAME.", ".$village->VILLAGENAME;

        $pid = $data['party']->PID;
        $data['party'] = json_decode(json_encode($data['party']), true);
        $data['card'] = $this->db->query("SELECT * FROM MEMBERSHIP_CARD WHERE PID = '".$pid."' ")->row();
        // $data['card'] = json_decode(json_encode($data['card']), true);
        $data['pled'] = $this->db->query("SELECT PLEDGENAME,DESCRIPTION,NETWEIGHT FROM temp_pledge_info WHERE BILLNO = '".$loan_no."' ")->result_array();
        $data['pl_weight']=$this->db->query("SELECT sum(NETWEIGHT) as tot_net_weight, sum(PURITY_PERCENT) as pur_per, count(*) as pl_cnt FROM temp_pledge_info WHERE BILLNO = '".$loan_no."' ")->row();
        $data['payment'] = $this->db->query("SELECT * FROM payment_inward_outward WHERE bill_no = '".$loan_no."' AND party_id = '".$pid."' AND module_name = 'New Loan - Pay' ")->result_array();
        // print_r($data['payment']);exit;
        if ($data['pled'] == '') 
        {    
            $data['pledge'] = '';
        }
        else
        {
            $data['pledge'] = $data['pled'];
        }
        if ($data['payment']=='') {
            $data['pay'] = '';
        }
        else
        {
            $data['pay'] = $data['payment'];
        }
        // $pid=$this->input->post('id');
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
         $data['jewel_photo']='<img src="'.base_url().'assets/images/jewel.jpg" height="150px" width="150px" >';
        }
        //  echo $div;

        // $company_code = $data['party']->COMPANYCODE;
        // print_r($data['party']->COMPANYCODE);exit;
        // if ($data['party']->COMPANYCODE=='') {
        //    $company_code = '';
        // }
        // else
        // {
        //     $company_code = $data['party']->COMPANYCODE;
        // }
        
        // print_r($data['pledge']);exit;
        
        // $data['comp'] = $this->db->query("SELECT * FROM COMPANY WHERE COMPANYCODE = '".$data['party']->COMPANYCODE."' ")->row();
        // print_r($data['party']);exit;
        $this->load->view("loan/secondary_display_loan",$data);
      }
      public function temp_pledge_info()
      {
            $pledgedata['pno'] = '';
            $pledgedata['billno'] = $_POST['bno'];
            $pledgedata['pledge_item'] = $_POST['p_item'];
            $pledgedata['pledge_description'] = $_POST['p_description'];
            $pledgedata['pledge_purity'] = $_POST['p_purity'];
            $pledgedata['pledge_purity_percent'] = $_POST['p_pur_per'];
            // $pledgedata['pledge_quantity'] = $pledge_quantity[$i];
            $pledgedata['pledge_weight'] = $_POST['p_weight'];
            $pledgedata['pledge_stone_weight'] = $_POST['p_st_weight'];
            $pledgedata['pledge_less'] = $_POST['p_less'];
            $pledgedata['pledge_net_weight'] = $_POST['p_weight']-$_POST['p_less']-$_POST['p_st_weight'];
            $pledgedata['pledge_image'] = '';
            $pledgedata['pledge_is_damage'] ='';
            $pledgedata['rec_type'] = 'N';

            // print_r($pledgedata['billno'] );exit;
            $this->Loan_model->insert_temp_pledge_info($pledgedata);
      }

      public function temp_pledge_info_delete()
      {

        
            $pledgedata['pno'] = '';
            $pledgedata['billno'] = $_POST['bno'];
            $pledgedata['pledge_item'] = $_POST['p_item'];
            $pledgedata['pledge_description'] = $_POST['p_description'];
            $pledgedata['pledge_purity'] = $_POST['p_purity'];
            $pledgedata['pledge_purity_percent'] = $_POST['p_pur_per'];
            // $pledgedata['pledge_quantity'] = $pledge_quantity[$i];
            $pledgedata['pledge_weight'] = $_POST['p_weight'];
            $pledgedata['pledge_stone_weight'] = $_POST['p_st_weight'];
            $pledgedata['pledge_less'] = $_POST['p_less'];
            $pledgedata['pledge_net_weight'] = $_POST['p_weight']-$_POST['p_less']-$_POST['p_st_weight'];
            $pledgedata['pledge_image'] = '';
            $pledgedata['pledge_is_damage'] ='';
            $pledgedata['rec_type'] = 'N';

       
            $this->Loan_model->delete_temp_pledge_info($pledgedata);
      }

      public function loan_print($bno)
      {
            $bill_no=implode('/',explode('_',$bno));
            $data['loan_details']=$this->db->query("select * from LOANS where BILLNO='".$bill_no."'")->row();
          $this->load->view("loan/loan_pos",$data);
      }
      public function get_chit_list()
      {
          $pid=$_POST['id'];
          $scheme=$_POST['sch'];
          $chit_list=$this->db->query("select * from CHIT_LIST where party_id='".$pid."' and scheme_type='".$scheme."'")->result_array();
          $option="<option value=''>Select</option>";
          if(count((array)$chit_list)>0)
          {
            foreach($chit_list as $clist)
            {
                $option.='<option value="'.$clist['sno'].'" > '.$clist['scheme_id']." - ".$clist['ava_balance']."</option>";
            }

          }
          echo $option;
      }
      
      public function get_chit_amount()
      {
          $pid=$_POST['id'];
          $scheme=$_POST['sch'];
          $chit_no=$_POST['sch_id'];
          $chit_list=$this->db->query("select * from CHIT_LIST where party_id='".$pid."' and scheme_type='".$scheme."' and sno='".$chit_no."'" )->row();
          
          $option=(isset($chit_list->ava_balance)?$chit_list->ava_balance:'0');
          echo $option; 
      }
      public function get_party_bank_details()
      {
        $pid=$this->input->post('pid');
        $bank_list = $this->Loan_model->get_party_bank_list($pid);
        print_r( $bank_list);
          $option="<option value=''>Select Party Bank</option>";
          foreach ($bank_list as $list) {
            $option.='<option value="'.$list->type_id.'">'.$list->phone_account_no.'-'.$list->account_holder_name.'</option>';
          }
          echo $option;
      }

    public function mergeloan()
    {
        $data['company_list'] = $this->Loan_model->get_company_list();
        $data['loan_status'] = $this->Loan_model->get_loan_status();
        $this->load->view("loan/merge_loan",$data);
    }   
    public function searchpartydetails()
    {

        $search =  $_GET['query']; 
       
        $rows = $this->Loan_model->getsearchpartydetails($search);
        $res='[';
        if(count($rows)>0) {
          foreach($rows as $row )
          {
              $title='';
              $name='';
              $firstname=$row->NAME;
              $lastname=$row->LASTNAME_PREFIX.','.$row->FATHERSNAME;
              $address=$row->STREETNAME.', '.$row->VILLAGENAME.', '.$row->CITYNAME;
              $address_loc=$row->STREETNAME;
              $member_id=$row->MEMBERSHIP_NO;
              $member_points=$row->MEMBERSHIP_POINTS;
              
              $rating=$row->RATING;
              $phone=$row->PHONE;

             // $card_type=$row->CARD_TYPE;
              //print_r($card_type);exit;
              // $party_photo=$row->PHOTO;
              // $id_photo=$row->OTHER_PHOTO;
              // $sign_photo=$row->SIGNATURE;
              $party_photo=base64_encode($row->PHOTO);
              $id_photo=base64_encode($row->OTHER_PHOTO);
              $sign_photo=base64_encode($row->SIGNATURE);
              // $title = $firstname.'&emsp;'.'-'.'&emsp;'.$lastname.'&emsp;'.'-'.'&emsp;'.$address.'&emsp;'.'-'.'&emsp;'.$phone;
              $title = $firstname.'   --   '.$lastname.'   --   '.$address.'   --   '.$phone;
              $res.='{ "title":"'.$title.'","id": "'.$row->PID.'","firstname":"'.$firstname.'","lastname":"'.$lastname.'","member_id":"'.$member_id.'","member_points":"'.$member_points.'","rating":"'.$rating.'","party":"'.$party_photo.'","idproof":"'.$id_photo.'","sign":"'.$sign_photo.'","address":"'.$address.'","phone":"'.$phone.'","location":"'.$address_loc.'"},';

              
          }
          $res=rtrim($res,',');
          $res.=']';
        }
        else{
          $res.=']';
        }
        print_r($res);die();

       
    }
    public function getsearchpartydetails()
    {
        $partyID =$_POST['partyID'];
        $partydata = $this->Loan_model->getsearchpartydata($partyID);
       //echo "<pre>";
       //print_r($partydata);
       //echo "</pre>";exit;
        $billno = isset($partydata[0]->BILLNO) ? $partydata[0]->BILLNO :"";

        if($billno)
        {
             $checkloandata  = $this->Loan_model->checkloandata($partydata[0]->PID);
             $getpledgedata  = $this->Loan_model->getpledgedata($partydata[0]->PID);
        }
        else
        {
            $checkloandata = "";
            $getpledgedata = "";
        }
        if(count((array)$partydata) >=0)
        {
            $data['return_code']  =  0;
            $data['success_msg']  =  'successfully';
            $data['partydetails'] =  $partydata;
            $data['loandetails']  =  $checkloandata;
            $data['pledge_info']  =  $getpledgedata;
        }
        else
        {
            $data['return_code']  = 1;
            $data['error_msg']  = 'Error';
        }
        echo json_encode($data);
    }
      
}
?>
