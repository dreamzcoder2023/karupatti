<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/* ************************************************************************************
		Purpose : To handle all Loan Receipts functions 2022-11-01
***************************************************************************************/
class Loanreceipts extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model(array("Loanreceipts_model"));
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

        //$data[' loanreceipts_view_list'] = $this->Loanreceipts_model->get_loanreceipts_view();

        //$data['cal_int'] = 0;
        $data['verify_list'] = $this->Loanreceipts_model->get_verify_stafflist();

        $from_date = $this->input->post('from_date')?$this->input->post('from_date'):date("Y-m-d");
        $to_date = $this->input->post('to_date')?$this->input->post('to_date'):date("Y-m-d");

        $data['from_date'] = $from_date;
        $data['to_date'] = $to_date;

        // $result = $this->db->query("SELECT * FROM LOANS WHERE BILLNO='F-50/22' ")->result_array();

        // echo json_encode($result);exit;


        if($from_date != '')
        {
            // $fdexp = explode('-', $from_date);
            // $fd = $fdexp[2].'-'.$fdexp[1].'-'.$fdexp[0];
            $fdate = "RECEIPT_DATE >='".$from_date."'";
            // $fdate = "CAST(RECEIPT_DATE as DATE)>='".$fd."'";
        }
        else{
            $fdate = "";
        }

        if($to_date != '')
        {
            // $tdexp = explode('-', $to_date);
            // $td = $tdexp[2].'-'.$tdexp[1].'-'.$tdexp[0];
            $tdate = "AND RECEIPT_DATE <='".$to_date."'";
            $tdate1 = "AND RECEIPT_DATE <='".$to_date."' AND";
            //$tdate = "AND CAST(RECEIPT_DATE as DATE)<='".$td."'";
        }
        else{
            $tdate = "";
            $tdate1 = "";
        }

        if($fdate!='' || $tdate!='')
        {
            $result = $this->Loanreceipts_model->get_loan_receipts_list($fdate,$tdate);
        }
        else
        {
            $data['loan_receipts_list'] = array();
        }

        $value = [];



         foreach($result as $key => $val){

          

           $name = $this->db->query("SELECT NAME, MONTHS, LOANDAYS FROM LOANS WHERE BILLNO = '".$val['BILLNO']."'")->row();
                

          $value[]=[

                    'RECEIPT_SNO'=>$val['RECEIPT_SNO'],
                    'RECEIPT_DATE'=>$val['RECEIPT_SNO'],
                    'BILLNO'=>$val['BILLNO'],
                    'NAME'=>$name->NAME,
                    'PERIOD'=>$name->LOANDAYS,
                    'MONTHS'=>$name->MONTHS,
                    'PRINCIPAL'=>$val['CALC_PRINCIPAL'],
                    'INT_AMOUNT'=>$val['CALC_INTEREST'],
                    'MAINTAINCHARGE'=>$val['MAINTAINCHARGE'],
                    'NOTICECHARGE'=>$val['NOTICECHARGE'],
                    'FORMCHARGE'=>$val['FORMCHARGE'],
                   
                    'HL_AMOUNT'=>$val['HL_AMOUNT'],
                    'DISCOUNT'=>$val['DISCOUNT'],
                    'PAIDAMOUNT' => $val['PAIDAMOUNT'],

                   ];

        }

      $data['loan_receipts_list'] = $value;

      

        $data['loan_receipts_list_footer'] = $this->Loanreceipts_model->get_loan_receipts_list_footer($fdate,$tdate1);

        $this->load->view('loanreceipts/loan_receipts_list',$data);


    }
    
    public function add_loan_receipts()
    {
        $this->load->view('loanreceipts/add_loan_receipts');
    }



    public function load_billno_details()
    {

        $bill_no = $_POST['billno_ln_rcpt'];
        $bill_no = trim($bill_no);

        // chk_loan_no
        $data["chk_loan_no"] = $this->Loanreceipts_model->chk_loan_no($bill_no);

        //print_r($data["chk_loan_no"]);exit();
        if ($data["chk_loan_no"] == false || empty($data["chk_loan_no"]))
       
        {
            $data["chk_loan_no"] = false;
        }
        else
        {

            $data['loan_receipts_details'] = $this->Loanreceipts_model->get_loan_receipts_details($bill_no);
    
            $data['receipt_details'] = $this->Loanreceipts_model->get_lt_recetpt_data($bill_no);

            if($data['receipt_details']){

                $data['maintain_charge'] = $data['receipt_details']->MAINTAINCHARGE; 
                $data['notice_charge']   = $data['receipt_details']->NOTICECHARGE; 
                $data['form_charge']     = $data['receipt_details']->FORMCHARGE; 
                $data['discount']        = $data['receipt_details']->DISCOUNT; 
                $data['on_account']      = $data['receipt_details']->HL_AMOUNT;
                $data['calc_principal']  = $data['receipt_details']->CALC_PRINCIPAL;
                $data['calc_interest']   = $data['receipt_details']->CALC_INTEREST;
                $data['paid_principal']  = $data['receipt_details']->PRINCIPAL;
                $data['paid_interest']   = $data['receipt_details']->INT_AMOUNT;
                $data['balance']         = 0;

            }else{

                $data['calc_principal']  = $data['loan_receipts_details'][0]['AMOUNT'];
                $data['paid_principal']  = 0;
                $data['paid_interest']   = 0;

                $data['maintain_charge'] = 0; 
                $data['notice_charge']   = 0; 
                $data['form_charge']     = 0; 
                $data['discount']        = 0; 
                $data['on_account']      = 0;
                $data['paid_amt']        = 0;
                $data['paid_int']        = 0;

            }
        

            $ln_pfx = $_SESSION['LOANPREFIX'];
            $loan_prefix = "RECEIPTS-".$ln_pfx;

            $rep_sln=$this->db->query("SELECT TOP 1 KEYVALUE FROM KEYMASTER WHERE KEYNAME='".$loan_prefix."'")->row();

            $data['receipt_sno']=$ln_pfx.($rep_sln->KEYVALUE+1);

            $pidqry=$this->db->query("SELECT TOP 1 * FROM RECEIPT_MASTER WHERE BILLNO = '".$bill_no."' ORDER BY ROWNO DESC")->row();

 
            if($pidqry){
              $data['row_no'] = $pidqry->ROWNO+1;
            }else{
              $data['row_no'] = 1;
            }



            $data['verify_user'] = $data['loan_receipts_details'][0]['VERIFIED_USER'];
            $data['verify_list'] = $this->Loanreceipts_model->get_verify_stafflist();

            $v_list = "<option value=''>Select verified user</option>";

            foreach($data['verify_list'] as $key => $value)
            {

                if($data['verify_user'] == $value['VERIFIED_USER']){
                    $v_list  .= "<option value = {$value['VERIFIED_USER']} selected  >{$value['VERIFIED_USER']}</option>";
                }else{
                    $v_list  .= "<option value = {$value['VERIFIED_USER']}>{$value['VERIFIED_USER']}</option>";
                }                      
               
            }

            $data['verify_list'] = $v_list;

            $ln_dt = $data['loan_receipts_details'][0]['ENDATE'];
            $loan_dt = $data['loan_receipts_details'][0]['ENDATE'];
            $fdexp = explode('-', $ln_dt);
            $fd = $fdexp[2].'-'.$fdexp[1].'-'.$fdexp[0];
            $month_number = date("d-M-Y",strtotime($fd));
            $data['fd'] = $month_number;
         
            //HL_AMOUNT,
            $pid  = $data['loan_receipts_details'][0]['PID'];
            $data['party_details'] = $this->Loanreceipts_model->get_party_details($pid);
            
            //Receipt No
            $ln_pfx = $_SESSION['LOANPREFIX'];
            $loan_prefix = "RECEIPTS-".$ln_pfx;

            $data['loan_prefix_keyvalue'] =$loan_prefix;
            $data['loan_prefix'] = $data['receipt_sno'];

            // Last Receipt Date
            $data['lt_recetpt_date'] = $this->Loanreceipts_model->get_lt_recetpt_date($bill_no);

            if($data['lt_recetpt_date'] ){
                $ln_dt = $data['lt_recetpt_date']->RECEIPT_DATE;
                $month_number = date("d-M-Y",strtotime($ln_dt));
                $data['last_recetpt_date'] = $month_number;

            }else{
                $month_number = date("d-M-Y");
                $data['last_recetpt_date'] = $month_number;
            }

       
            // Party Photo
            $party_id = $data['loan_receipts_details'][0]['PID'];
            $party_photo = $this->Loanreceipts_model->get_party_photo($party_id);
            if (is_null($party_photo) || empty($party_photo) || $party_photo == false) 
            {
                 $data['party_photo']="";
            }
            else
            {
                $data['party_photo'] = "data:image/jpg;charset=utf8;base64,".(base64_encode($party_photo));
            };

            // Jewel Photo
            $jewel_photo = $this->Loanreceipts_model->get_jewel_photo($bill_no);
            if (is_null($jewel_photo) || empty($jewel_photo)|| $jewel_photo == false)
            {
                 $data['jewel_photo']="";
            }
            else
            {
                 $data['jewel_photo'] = "data:image/jpg;charset=utf8;base64,".(base64_encode($jewel_photo));
            };



            $sd = $ln_dt.' '.'00:00:00';
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


            $total_days = (strtotime($e) - strtotime($ln_dt)) / (60 * 60 * 24); 
            $data['total_days'] = $total_days;



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

            $data['tot'] = $data['months'] + $tot;


            //Status
            $vIntType = $data['loan_receipts_details'][0]['INTERESTTYPE'];
            $vCalcDate=date('Y-m-d',strtotime($_POST['cldate']));
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
              $data['lblODStatus']="OVER DUE";
              $data['loan_Status']= 2;
            }
            else
            {
              $data['lblODStatus']="NORMAL";
              $data['loan_Status']= 1;
            }

            $vIntStr="";

                  
            if($data['loan_Status'] == 1){

                if($data['receipt_details']){
                    if(substr($vIntType, 0,2)=="F-" || substr($vIntType, 0,2)=="H-")
                    {
                        $now = time(); // or your date as well
                        $your_date = strtotime($ln_dt);
                        $datediff = $now - $your_date;
                        $hf_days = floor($datediff / (60 * 60 * 24));
                        $prin_nor = $data['loan_receipts_details'][0]['AMOUNT'];
                        $intst = $data['loan_receipts_details'][0]['INTEREST'];
                        $perday = $prin_nor * $intst / 3000 ;
                        $perday = number_format($perday, 2, '.', '');

                        if ($hf_days < 30) 
                        {
                            $int_nor = 30 * $perday;
                        }
                        else
                        {
                            $int_nor = $hf_days * $perday;
                        }
                        $int_nor = number_format($int_nor, 2, '.', '');

                          // $int_tot_nor = $hf_days * $int_nor;
                          // $int_tot_nor = number_format($int_tot_nor, 2, '.', '');
                        $tot_nor = $prin_nor + $int_nor;
                        $tot_nor = number_format($tot_nor, 2, '.', '');

                        $vIntStr = $vIntStr . "Principal: " . $prin_nor . "&nbsp;" ." Daily Int : " .$perday."\n";
                        $vIntStr = $vIntStr .$hf_days . " Days x " . $perday . " = " . $int_nor;
                          //$vIntStr = $vIntStr . $days . " Days x " . $int_nor . " = " . $int_tot_nor;
                        $vIntStr = $vIntStr . " Total: " . $tot_nor;
                        $data['text_area'] = $vIntStr;
                        $data['cal_int'] = 0;

                    }else{
                        
                        $rp_cal = $this->Loanreceipts_model->get_rp_calculation($bill_no);

                        if ($months == 0 && $days >= 0)
                        {
                          $tot = 1;
                        }
                        else if ($months > 0 && $days = 0) 
                        {
                          $tot = $months;
                        }
                        else if ($months > 0 && $days > 0) 
                        {
                          if($days > 0 && $days <= 7)
                          {
                            $tot = $months + 0.25 ;
                          }
                          else if($days >= 8 && $days <= 15)
                          {
                            $tot = $months + 0.5;
                          }
                          else if($days >= 16 && $days <= 23)
                          {
                            $tot = $months + 0.75;
                          }
                          else if($days >= 24 && $days <= 31)
                          {
                            $tot = $months + 1;
                          }
                        }
                        // print_r($tot);exit();
                        $data['tot'] = $tot;
                        $month_int = $data['loan_receipts_details'][0]['AMOUNT'] * $data['loan_receipts_details'][0]['INTEREST'] / 100;
                        $month_int_tot = $tot * $month_int;
                        $tot_amt = $data['loan_receipts_details'][0]['AMOUNT'] + $month_int_tot;

                        $t_dt = date("Y-m-d");
                        $rcpt_slno = $this->Loanreceipts_model->get_receipts_slno($bill_no);
                        $rcpt_slno = $rcpt_slno -1 ;
                        $data['mx_row_cal'] = $this->Loanreceipts_model->get_rp_calculation_max_row($bill_no,$rcpt_slno,$t_dt);
                        $count = 0;

                        for ($i=1; $i <= $rcpt_slno; $i++) 
                        { 
                          $rp_dt = $data['mx_row_cal'][$count]['RECEIPT_DATE'];
                          $rp_no_dt = explode('-', $rp_dt);
                          $rp_dt = $rp_no_dt[2].'/'.$rp_no_dt[1].'/'.$rp_no_dt[0];

                          $rp_prin = $data['mx_row_cal'][$count]['PRINCIPAL'];
                          $rp_int_amt = $data['mx_row_cal'][$count]['INT_AMOUNT'];

                          $vIntStr = $vIntStr . "As on " . $rp_dt . " *** Paid: " . ($rp_prin + $rp_int_amt)."\n";
                          $count = $count + 1;
                        }

                  
                        $vIntStr = $vIntStr . "Principal: " . $data['loan_receipts_details'][0]['AMOUNT'] . " Monthly Int : " . $month_int."\n";
                        $vIntStr = $vIntStr . "Interest : " . $tot . " Months x " . $month_int . " = " . $month_int_tot;
                        $vIntStr = $vIntStr . " Total: " . $tot_amt;

                        $data['text_area'] = $vIntStr;
                        $data['cal_int'] = $tot;
                        $data['cal_tot'] = $tot_amt; 
                        $data['curr_int'] = $month_int;
                    }
                }else{
                    if(substr($vIntType, 0,2)=="F-" || substr($vIntType, 0,2)=="H-")
                    {
                        $now = time(); // or your date as well
                        $your_date = strtotime($ln_dt);
                        $datediff = $now - $your_date;
                        $hf_days = floor($datediff / (60 * 60 * 24));
                        $prin_nor = $data['loan_receipts_details'][0]['AMOUNT'];
                        $intst = $data['loan_receipts_details'][0]['INTEREST'];
                        $perday = $prin_nor * $intst / 3000 ;
                        $perday = number_format($perday, 2, '.', '');

                        if ($hf_days < 30) 
                        {
                            $int_nor = 30 * $perday;
                        }
                        else
                        {
                            $int_nor = $hf_days * $perday;
                        }
                        $int_nor = number_format($int_nor, 2, '.', '');

                          // $int_tot_nor = $hf_days * $int_nor;
                          // $int_tot_nor = number_format($int_tot_nor, 2, '.', '');
                        $tot_nor = $prin_nor + $int_nor;
                        $tot_nor = number_format($tot_nor, 2, '.', '');

                        $vIntStr = $vIntStr . "Principal: " . $prin_nor . "&nbsp;" ." Daily Int : " .$perday."\n";
                        $vIntStr = $vIntStr .$hf_days . " Days x " . $perday . " = " . $int_nor;
                          //$vIntStr = $vIntStr . $days . " Days x " . $int_nor . " = " . $int_tot_nor;
                        $vIntStr = $vIntStr . " Total: " . $tot_nor;
                        $data['text_area'] = $vIntStr;
                        $data['cal_int'] = 0;

                    }else{
                        
                        $rp_cal = $this->Loanreceipts_model->get_rp_calculation($bill_no);

                        if ($months == 0 && $days >= 0)
                        {
                          $tot = 1;
                        }
                        else if ($months > 0 && $days = 0) 
                        {
                          $tot = $months;
                        }
                        else if ($months > 0 && $days > 0) 
                        {
                          if($days > 0 && $days <= 7)
                          {
                            $tot = $months + 0.25 ;
                          }
                          else if($days >= 8 && $days <= 15)
                          {
                            $tot = $months + 0.5;
                          }
                          else if($days >= 16 && $days <= 23)
                          {
                            $tot = $months + 0.75;
                          }
                          else if($days >= 24 && $days <= 31)
                          {
                            $tot = $months + 1;
                          }
                        }
                        // print_r($tot);exit();
                        $data['tot'] = $tot;
                        $month_int = $data['loan_receipts_details'][0]['AMOUNT'] * $data['loan_receipts_details'][0]['INTEREST'] / 100;
                        $month_int_tot = $tot * $month_int;
                        $tot_amt = $data['loan_receipts_details'][0]['AMOUNT'] + $month_int_tot;

                        $t_dt = date("Y-m-d");
                        $rcpt_slno = $this->Loanreceipts_model->get_receipts_slno($bill_no);
                        $rcpt_slno = $rcpt_slno -1 ;
                        $data['mx_row_cal'] = $this->Loanreceipts_model->get_rp_calculation_max_row($bill_no,$rcpt_slno,$t_dt);
                        $count = 0;

                        for ($i=1; $i <= $rcpt_slno; $i++) 
                        { 
                          $rp_dt = $data['mx_row_cal'][$count]['RECEIPT_DATE'];
                          $rp_no_dt = explode('-', $rp_dt);
                          $rp_dt = $rp_no_dt[2].'/'.$rp_no_dt[1].'/'.$rp_no_dt[0];

                          $rp_prin = $data['mx_row_cal'][$count]['PRINCIPAL'];
                          $rp_int_amt = $data['mx_row_cal'][$count]['INT_AMOUNT'];

                          $vIntStr = $vIntStr . "As on " . $rp_dt . " *** Paid: " . ($rp_prin + $rp_int_amt)."\n";
                          $count = $count + 1;
                        }

                  
                        $vIntStr = $vIntStr . "Principal: " . $data['loan_receipts_details'][0]['AMOUNT'] . " Monthly Int : " . $month_int."\n";
                        $vIntStr = $vIntStr . "Interest : " . $tot . " Months x " . $month_int . " = " . $month_int_tot;
                        $vIntStr = $vIntStr . " Total: " . $tot_amt;

                        $data['text_area'] = $vIntStr;
                        $data['cal_int'] = $tot;
                        $data['cal_tot'] = $tot_amt; 
                        $data['curr_int'] = $month_int;
                    }

                }


            }else if($data['loan_Status'] == 2){

                if($data['receipt_details']){


                    if(substr($vIntType, 0,2)=="F-" || substr($vIntType, 0,2)=="H-")
                    {

                        $last_recepit = $this->db->query("SELECT TOP 1 * FROM RECEIPT_MASTER WHERE BILLNO = '".$bill_no."' ORDER BY ROWNO DESC")->row();

                        $vIntStr =  "As on " . date('d/m/Y',strtotime($last_recepit->RECEIPT_DATE)) . " *** Princi: " .$last_recepit->CALC_PRINCIPAL . " "."Int : "." ".$last_recepit->CALC_INTEREST." " ."Paid : "." ".$last_recepit->PAIDAMOUNT." "."Bal : "." ".$last_recepit->BALANCE.   "\n";
                    

                        $receipts = $this->Loanreceipts_model->get_receipts_slno($bill_no);

                        $sd = $loan_dt.' '.'00:00:00';
                        $e = date("Y-m-d");
                        $ed = $e.' '.'00:00:00';

                        $start = new DateTime($sd);
                        $end = new DateTime($ed);
                        $diff = $start->diff($end);

                        $yearsInMonths = $diff->format('%r%y') * 12;
                        $months = $diff->format('%r%m');
                        $days = $diff->format('%r%d');
                        $totalMonths = $yearsInMonths + $months;
                        $data['total_months'] = $totalMonths;
                        $data['total_days'] = $days;


                        $rpt_mon = $data['months'];

                        $iteration = 1;
                        $remin_mon = 0;
                        $loop_chk  = 0;
                        $rem_check = 0;

                        if($rpt_mon > 3){

                          $iteration = $db_mon / 3;

                          $whole = floor($iteration);

                          if (is_float($iteration)) 
                          {
                            $total_mon = $whole * 3;
                            $remin_mon = $data['months'] - $total_mon;
                          }
                        }else{
                          $whole = floor($iteration);
                          $total_mon = $whole * 3;
                          $remin_mon = $total_mon-$data['months'];
                        }

                        $nxt_int = 3.00;
                        $month_week = 4;
                                  


                        $cur_int = $nxt_int;
                        // $cur_int = number_format($cur_int, 2, '.', '');

                        $nxt_prin = $last_recepit->BALANCE;
                        $total_int =[0];

                        for ($i=2; $i <=$whole; $i++) 
                        {
                            
                            if ($nxt_int >= 3.5) {
                              $nxt_int = 3.5;
                              $nxt_int = number_format($nxt_int, 2, '.', '');
                            }


                            $tot_per_week = ($last_recepit->BALANCE * 3.5 /100) / $month_week;

                            $tot_int = $tot_per_week * $whole ;
                            $tot_int = number_format($tot_int, 2, '.', '');

                            $total_int[] =  $tot_int;

                            $tot_amt = $nxt_prin + $tot_int; 
                            $tot_amt = number_format($tot_amt, 2, '.', '');

                            $loop_chk =$i;

                            $vIntStr = $vIntStr . "Princi: " . $nxt_prin . " Int: " . $tot_int . " Tot: " . $tot_amt . " Period: " . $data['days']." Days" . " Rate: " . $nxt_int."\n";

                        } 

                        if ($data['total_days'] != 0) 
                        {
                            //echo "remin";

                            $r_princi = round($nxt_prin,2);

                            $r_int    = round(($nxt_prin * 3.5) / 3000 * $data['days'],2);
                           
                            $total_int[] = $r_int;


                            $r_total = round($r_princi + $r_int,2);
                            $total_principal = $r_total;


                         
                            $vIntStr = $vIntStr . "Princi: " . $r_princi . " Int: " . $r_int . " Tot: " . $r_total . " Period: " . $data['total_days'] . " days" . " Rate: " . 3.5."\n";

                        }


                        $arr_int_val= $last_recepit->CALC_INTEREST+array_sum($total_int);

                        if ((int) $arr_int_val == $arr_int_val) {
                                //is an integer
                            $arr_int_val = $arr_int_val;
                        }else{
                            $arr_int_val=floor(array_sum($total_int))+1;
                        }


                        $vIntStr = $vIntStr . "Total Period: ". $data['total_months']." Months ". $data['total_days'] . " days"."\n";
                        $vIntStr = $vIntStr . "Loan Amount: ". $last_recepit->CALC_PRINCIPAL."&emsp;"." Total Interest : ". $arr_int_val ."&emsp;". " Total Amount :" .round($last_recepit->CALC_PRINCIPAL+$arr_int_val,2)."\n";
                        $vIntStr = $vIntStr . "Paid Amount : ". $last_recepit->PAIDAMOUNT."&emsp;"." Balance : ". $last_recepit->BALANCE;

                        $data['text_area'] = $vIntStr;
                        // $data['cal_int'] = $tot_fin_int;
                        // $data['cal_tot'] = $fin_tot_amt;
                        // $data['curr_int'] = $nxt_int; 

                    }else{

                        $last_recepit = $this->db->query("SELECT TOP 1 * FROM RECEIPT_MASTER WHERE BILLNO = '".$bill_no."' ORDER BY ROWNO DESC")->row();

                        $vIntStr =  "As on " . date('d/m/Y',strtotime($last_recepit->RECEIPT_DATE)). " *** Princi: " .$last_recepit->CALC_PRINCIPAL . " "."Int : "." ".$last_recepit->CALC_INTEREST." " ."Paid : "." ".$last_recepit->PAIDAMOUNT." "."Bal : "." ".$last_recepit->BALANCE.   "\n";


                        
                        $sd = $last_recepit->RECEIPT_DATE.' '.'00:00:00';
                        $e = date("Y-m-d");
                        $ed = $e.' '.'00:00:00';

                        $start = new DateTime($sd);
                        $end = new DateTime($ed);
                        $diff = $start->diff($end);

                        $yearsInMonths = $diff->format('%r%y') * 12;
                        $months = $diff->format('%r%m');
                        $days = $diff->format('%r%d');
                        $totalMonths = $yearsInMonths + $months;
                        $data['total_months'] = $totalMonths;
                        $data['total_days'] = $days;

                        $loan_mon =  $data['loan_receipts_details'][0]['MONTHS'];
                        $rpt_mon   = $data['months'];
                        $iteration = 0;
                        $remin_mon = 0;
                        $remin_day = $data['days'];
                        $loop_chk  = 0;
                        $rem_check = 0;
                        $whole     = 0;


                        if($rpt_mon > $loan_mon){


                            $iteration = 1;

                            $mon_div = $rpt_mon-$loan_mon;

                            $three_m_div = $mon_div  / 3;

                            $whole = floor($three_m_div);



                            $remin_mon = $mon_div - ($whole * 3);

                            
                            if (is_float($three_m_div)) 
                            {
                                $total_mon_three = $whole * 3;
                                $remin_mon_three = ($data['months'] - $total_mon_three)-$loan_mon;
                            }else{
                                $total_mon_three = $whole * 3;
                                
                            }


                        }

                        $nxt_int = 3;       
                        $cur_int = $nxt_int;
                       
                        $prin     = $last_recepit->BALANCE;


                        $cal_prin = $last_recepit->BALANCE;

                        $cal_prin_days = $cal_prin;

                        $total_int =[];
                       
                        $vIntStr_three = "";
                        $upd_prin = $last_recepit->BALANCE;

                        $upd_prin_rmd = 0;
                        $upd_int = 3;

                        if($iteration >= 1){

                       
                            for ($i=1; $i <=$iteration; $i++) 
                            {
                              

                                $tot_int = ($prin * $nxt_int /100 ) * $loan_mon;
                                $tot_int = number_format($tot_int, 2, '.', '');

                                $total_int[] =  $tot_int;

                                $tot_amt = $prin + $tot_int; 
                                $tot_amt = number_format($tot_amt, 2, '.', '');

                               
                                $vIntStr =  "Princi: " . $prin . " Int: " . $tot_int . " Tot: " . $tot_amt . " Period: " . $loan_mon." Month" . " Rate: " . $nxt_int."\n";

                                $upd_prin = $tot_amt ;

                                $upd_int = $nxt_int+0.5;
                            } 

                        }


                        if($whole >= 1){



                            $inr_prin = $upd_prin;

                        
                            for ($i=1; $i <= $whole; $i++) 
                            {
                                
                                

                                if($nxt_int >= 3.5){
                                    $nxt_int = 3.5;
                                }

                                $nxt_int = $nxt_int + 0.5;

                                $m_tot_int   = (($inr_prin * $nxt_int) / 100 ) * 3;
                                $m_tot_int   = number_format($m_tot_int, 2, '.', '');

                                $total_int[] =  $m_tot_int;

                                $m_tot_amt   = $inr_prin + $m_tot_int; 
                                $m_tot_amt   = number_format($m_tot_amt, 2, '.', '');
                               
                               
                                $vIntStr_three = $vIntStr_three."Princi: " . $inr_prin  . " Int: " . $m_tot_int . " Tot: " . $m_tot_amt . " Period: " . '3'." Month" . " Rate: " . $nxt_int."\n";

                                $inr_prin = $m_tot_amt;



                            }  


                            $vIntStr = $vIntStr.$vIntStr_three ;
                            $upd_prin = $inr_prin;

                            $upd_int = $nxt_int;



                        }

                        if($remin_mon >= 1){



                            if($upd_int != 0){

                                if($nxt_int >= 3.5){
                                    $nxt_int = 3.5;
                                }

                                $nxt_int = $nxt_int+0.5;

                            }else{
                                if($nxt_int >= 3.5){
                                    $nxt_int = 3.5;
                                }

                                $nxt_int = $nxt_int;
                            }

                            

                            $tot_int = ($upd_prin * $nxt_int /100 ) * $remin_mon;

                            $tot_int = number_format($tot_int, 2, '.', '');

                            $total_int[] =  $tot_int;

                            $tot_amt = $upd_prin + $tot_int; 
                            $tot_amt = number_format($tot_amt, 2, '.', '');

                            $vIntStr = $vIntStr . "Princi: " . $upd_prin . " Int: " . $tot_int . " Tot: " . $tot_amt . " Period: " . $remin_mon." Month" . " Rate: " . $nxt_int."\n";

                            $cal_prin_days = $tot_amt;

                            $upd_prin_rmd = $tot_amt ;

                            $upd_int = $nxt_int;

                        }

                        if($remin_day >= 1){


                            if($remin_day < 8 ){
                                $d_int = 1;
                            }else{  
                                if($remin_day < 15){
                                    $d_int = 2;
                                }else if(14 < $remin_day ){
                                    $d_int = 3;
                                }else if(21 < $remin_day){
                                    $d_int = 4;
                                }
                            }



                           

                            // if($upd_int != 0){

                            //     $nxt_int = $nxt_int+0.5;

                            // }else{
                            //     $nxt_int = $nxt_int;
                            // }


                            // if($nxt_int >= 3.5){
                            //         $nxt_int = 3.5;
                            // }

                            // $nxt_int = $nxt_int + 0.5;



   
                            $d_tot_int = ((($upd_prin * $upd_int) /100 ) / 4) * $d_int;
                            $d_tot_int = number_format($d_tot_int, 2, '.', '');

                            

                            $total_int[] =  $d_tot_int;

                            if($upd_prin_rmd == 0){
                               $prin_amt = $upd_prin;
                            }else {
                               $prin_amt = $upd_prin_rmd;
                            }

                            
                            $d_tot_amt = $prin_amt + $d_tot_int;

                            if ((int) $d_tot_amt == $d_tot_amt) {
                                //is an integer
                               $d_tot_amt=$d_tot_amt;
                            }else{
                                $d_tot_amt=floor($d_tot_amt)+1;
                            }


                            $d_tot_amt = number_format($d_tot_amt, 2, '.', '');

                            $vIntStr = $vIntStr . "Princi: " . $upd_prin . " Int: " . $d_tot_int . " Tot: " . $d_tot_amt . " Period: " . $data['days']." Days" . " Rate: " . $upd_int."\n";
                            
                            $tot_amt = $d_tot_amt;
                            

                        }



                        // $rpt_mon = $data['months'];

                        // $iteration = 1;
                        // $remin_mon = 0;
                        // $loop_chk  = 0;
                        // $rem_check = 0;

                        // if($rpt_mon > 3){

                        //   $iteration = $db_mon / 3;

                        //   $whole = floor($iteration);

                        //   if (is_float($iteration)) 
                        //   {
                        //     $total_mon = $whole * 3;
                        //     $remin_mon = $data['months'] - $total_mon;
                        //   }
                        // }else{
                        //   $whole = floor($iteration);
                        //   $total_mon = $whole * 3;
                        //   $remin_mon = $total_mon-$data['months'];
                        // }

                        // $nxt_int = 3.00;
                        // $month_week = 4;
                                  


                        // $cur_int = $nxt_int;
                        // // $cur_int = number_format($cur_int, 2, '.', '');

                        // $nxt_prin = $last_recepit->BALANCE;
                        // $total_int = [];
                    
                        // $total_prin_amt = 0;

                        // for ($i=1; $i <=$whole; $i++) 
                        // {
                            
                        //     if ($nxt_int >= 3.5) {
                        //       $nxt_int = 3.5;
                        //       $nxt_int = number_format($nxt_int, 2, '.', '');
                        //     }




                        //     $tot_per_week = ($last_recepit->BALANCE * $nxt_int /100) / $month_week;

                        //     $tot_int = $tot_per_week * $whole ;
                        //     $tot_int = number_format($tot_int, 2, '.', '');



                        //     $total_int[] =  $tot_int;

                        //     $tot_amt = $nxt_prin + $tot_int; 
                        //     $tot_amt = number_format($tot_amt, 2, '.', '');

                        //     $loop_chk =$i;

                        //     if ((int) $tot_amt == $tot_amt) {
                        //         //is an integer
                        //             $tot_amt=$tot_amt;

                        //     }else{
                        //         $tot_amt=floor($tot_amt)+1;
                        //     }  

                        //     $vIntStr = $vIntStr . "Princi: " . $nxt_prin . " Int: " . $tot_int . " Tot: " . $tot_amt . " Period: " . $data['days']." Days" . " Rate: " . $nxt_int."\n";

                        //     $total_prin_amt = $tot_amt;

                        // }





                        $arr_int_val = (array_sum($total_int)+$last_recepit->CALC_INTEREST);

                        if ((int) $arr_int_val == $arr_int_val) {
                                //is an integer
                            $arr_int_val=$arr_int_val;

                        }else{
                            $arr_int_val=floor($arr_int_val)+1;
                        }            


                        // $vIntStr = $vIntStr . "Total Period: ". $data['total_months']." Months ". $data['total_days'] . " days"."\n";
                        $vIntStr = $vIntStr . "Loan Amount: ". $last_recepit->CALC_PRINCIPAL."&emsp;"." Total Interest : ".$arr_int_val."&emsp;". " Total Amount :" .round($last_recepit->CALC_PRINCIPAL+$arr_int_val,2)."\n";
                        $vIntStr = $vIntStr . "Paid Amount : ". $last_recepit->PAIDAMOUNT."&emsp;"." Balance : ". $tot_amt;



                        $data['text_area']       = $vIntStr;
                        $data['calc_total']      = $data['loan_receipts_details'][0]['AMOUNT'];
                        $data['calc_interest']   = $arr_int_val;
                        $data['curr_int']        = $nxt_int;
                        $data['final_total']     = $tot_amt;


                    }
                  

                }else{
 
                    if(substr($vIntType, 0,2)=="F-" || substr($vIntType, 0,2)=="H-")
                    {
                        $rp_bal = $data['loan_receipts_details'][0]['AMOUNT'];
                        $rp_dt  = $data['loan_receipts_details'][0]['ENDATE'];
                        $rp_int = $data['loan_receipts_details'][0]['INTEREST'];

                        $iteration = $data['total_days'] / 50;
                        $whole = floor($iteration);
                        $total_days = $whole * 50 ;
                          // print_r($total_days);exit();
                        $remain_days = 0;

                        if (is_float($iteration)) 
                        {
                           $total_days = $whole * 50 ;
                           $remain_days = $data['total_days'] - $total_days;
                        }

                        $total_principal = $rp_bal;
                        $nxt_int = $rp_int;
                    
                        $total_int =[];

                        for ($i=1; $i <= $whole; $i++) 
                        { 

                            $cal_int = ($total_principal * $nxt_int /3000) * 50;
                             
                            $total   = round($total_principal + $cal_int,3);
                                                    
                            $cal_int = round($cal_int , 3);

                            $total_int[] =  $cal_int;

                                  
                            $vIntStr = $vIntStr . "Princi: " . $total_principal . " Int: " . $cal_int . " Tot: " . $total  . " Period: " . $data['loan_receipts_details'][0]['LOANDAYS'] . " days" . " Rate: " . $nxt_int."\n";


                            if ($i>=1) 
                            {
                              $nxt_int = $nxt_int + 0.5 ;
                              $total_principal   = round($total_principal + $cal_int,2);

                            }

                            if ($nxt_int > 3.50) {
                              $nxt_int = 3.50;
                            }

                        }

                        if ($remain_days != 0) 
                        {
                            //echo "remin";

                            $r_princi = round($total_principal,2);
                            $r_int    = round(($total_principal * $nxt_int /3000) * $remain_days,3);

                            $total_int[] = $r_int;


                            $r_total = round($r_princi + $r_int,2);
                            $total_principal = $r_total;


                         
                            $vIntStr = $vIntStr . "Princi: " . $r_princi . " Int: " . $r_int . " Tot: " . $r_total . " Period: " . $remain_days . " days" . " Rate: " . $nxt_int."\n";

                        }


                        $vIntStr = $vIntStr . "Total Period: ". $data['months']." Months ". $data['days'] . " days"."\n";

                        $vIntStr = $vIntStr . "Loan Amount: ". $data['loan_receipts_details'][0]['AMOUNT'] ."&emsp;"." Total Interest : ". round(array_sum($total_int)) ."&emsp;". " Total Amount :" .round($total_principal). "\n";

                        $vIntStr = $vIntStr . "Paid Amount : ". '0.00'."&emsp;"." Balance : ". round($total_principal);

                        $data['text_area']       = $vIntStr;                    
                        $data['calc_total']      = $data['loan_receipts_details'][0]['AMOUNT'];
                        $data['calc_interest']   = round(array_sum($total_int));
                        $data['curr_int']        = $nxt_int;

                    }else{


                        $sd = $ln_dt.' '.'00:00:00';
                        $e = date("Y-m-d");
                        $ed = $e.' '.'00:00:00';

                        $start = new DateTime($sd);
                        $end = new DateTime($ed);
                        $diff = $start->diff($end);

                        $yearsInMonths = $diff->format('%r%y') * 12;
                        $months = $diff->format('%r%m');
                        $days = $diff->format('%r%d');
                        $totalMonths = $yearsInMonths + $months;
                        $data['total_months'] = $totalMonths;
                        $data['total_days'] = $days;

                        $loan_mon =  $data['loan_receipts_details'][0]['MONTHS'];
                        $rpt_mon   = $data['months'];
                        $iteration = 0;
                        $remin_mon = 0;
                        $remin_day = $data['days'];
                        $loop_chk  = 0;
                        $rem_check = 0;
                        $whole     = 0;


                  
                        if($rpt_mon > $loan_mon){

                            $iteration = 1;

                            $mon_div = $rpt_mon-$loan_mon;

                            $three_m_div = $mon_div  / 3;

                            $whole = floor($three_m_div);



                            $remin_mon = $mon_div - ($whole * 3);

                            
                            if (is_float($three_m_div)) 
                            {
                                $total_mon_three = $whole * 3;
                                $remin_mon_three = ($data['months'] - $total_mon_three)-$loan_mon;
                            }else{
                                $total_mon_three = $whole * 3;
                                
                            }


                        }
                

                        $nxt_int = $data['loan_receipts_details'][0]['INTEREST'];       
                        $cur_int = $nxt_int;
                       
                        $prin     = $data['loan_receipts_details'][0]['AMOUNT'];

                        $cal_prin = $data['loan_receipts_details'][0]['AMOUNT'];

                        $cal_prin_days = $cal_prin;

                        $total_int =[];
                        $vIntStr  = "";
                        $vIntStr_three = "";
                        $upd_prin = 0;

                        $upd_prin_rmd = 0;
                        $upd_int = 0;

                        if($iteration >= 1){

                        
                            for ($i=1; $i <=$iteration; $i++) 
                            {
                              

                                $tot_int = ($prin * $nxt_int /100 ) * $loan_mon;
                                $tot_int = number_format($tot_int, 2, '.', '');

                                $total_int[] =  $tot_int;

                                $tot_amt = $prin + $tot_int; 
                                $tot_amt = number_format($tot_amt, 2, '.', '');

                               
                                $vIntStr =  "Princi: " . $prin . " Int: " . $tot_int . " Tot: " . $tot_amt . " Period: " . $loan_mon." Month" . " Rate: " . $nxt_int."\n";

                                $upd_prin = $tot_amt ;

                                $upd_int = $nxt_int+0.5;
                            } 

                        }


                        if($whole >= 1){

                            $inr_prin = $upd_prin;

                        
                            for ($i=1; $i <= $whole; $i++) 
                            {
                                
                                

                                if($nxt_int >= 3.5){
                                    $nxt_int = 3.5;
                                }

                                $nxt_int = $nxt_int + 0.5;

                                $m_tot_int   = (($inr_prin * $nxt_int) / 100 ) * 3;
                                $m_tot_int   = number_format($m_tot_int, 2, '.', '');

                                $total_int[] =  $m_tot_int;

                                $m_tot_amt   = $inr_prin + $m_tot_int; 
                                $m_tot_amt   = number_format($m_tot_amt, 2, '.', '');
                               
                               
                                $vIntStr_three = $vIntStr_three."Princi: " . $inr_prin  . " Int: " . $m_tot_int . " Tot: " . $m_tot_amt . " Period: " . '3'." Month" . " Rate: " . $nxt_int."\n";

                                $inr_prin = $m_tot_amt;



                            }  


                            $vIntStr = $vIntStr.$vIntStr_three ;
                            $upd_prin = $inr_prin;

                            $upd_int = $nxt_int;



                        }

                        


                        if($remin_mon >= 1){

                            if($upd_int != 0){

                                if($nxt_int >= 3.5){
                                    $nxt_int = 3.5;
                                }

                                $nxt_int = $nxt_int+0.5;

                            }else{
                                if($nxt_int >= 3.5){
                                    $nxt_int = 3.5;
                                }

                                $nxt_int = $nxt_int;
                            }

                            

                            $tot_int = ($upd_prin * $nxt_int /100 ) * $remin_mon;

                            $tot_int = number_format($tot_int, 2, '.', '');

                            $total_int[] =  $tot_int;

                            $tot_amt = $upd_prin + $tot_int; 
                            $tot_amt = number_format($tot_amt, 2, '.', '');

                            $vIntStr = $vIntStr . "Princi: " . $upd_prin . " Int: " . $tot_int . " Tot: " . $tot_amt . " Period: " . $remin_mon." Month" . " Rate: " . $nxt_int."\n";

                            $cal_prin_days = $tot_amt;

                            $upd_prin_rmd = $tot_amt ;

                            $upd_int = $nxt_int;

                        }


                        if($remin_day >= 1){


                            if($remin_day < 8 ){
                                $d_int = 1;
                            }else{  
                                if($remin_day < 15){
                                    $d_int = 2;
                                }else if(14 < $remin_day ){
                                    $d_int = 3;
                                }else if(21 < $remin_day){
                                    $d_int = 4;
                                }
                            }



                           

                            // if($upd_int != 0){

                            //     $nxt_int = $nxt_int+0.5;

                            // }else{
                            //     $nxt_int = $nxt_int;
                            // }


                            // if($nxt_int >= 3.5){
                            //         $nxt_int = 3.5;
                            // }

                            // $nxt_int = $nxt_int + 0.5;





                            $d_tot_int = ((($upd_prin * $upd_int) /100 ) / 4) * $d_int;
                            $d_tot_int = number_format($d_tot_int, 2, '.', '');

                            

                            $total_int[] =  $d_tot_int;

                            if($upd_prin_rmd == 0){
                               $prin_amt = $upd_prin;
                            }else {
                               $prin_amt = $upd_prin_rmd;
                            }

                            
                            $d_tot_amt = $prin_amt + $d_tot_int;

                            if ((int) $d_tot_amt == $d_tot_amt) {
                                //is an integer
                               $d_tot_amt=$d_tot_amt;
                            }else{
                                $d_tot_amt=floor($d_tot_amt)+1;
                            }


                            $d_tot_amt = number_format($d_tot_amt, 2, '.', '');

                            $vIntStr = $vIntStr . "Princi: " . $upd_prin . " Int: " . $d_tot_int . " Tot: " . $d_tot_amt . " Period: " . $data['days']." Days" . " Rate: " . $upd_int."\n";
                            
                            $tot_amt = $d_tot_amt;
                            

                        }

                        if ((int) array_sum($total_int) == array_sum($total_int)) {
                                //is an integer
                            $ov_tot_int = array_sum($total_int);
                        }else{
                            $ov_tot_int=floor(array_sum($total_int))+1;
                        }


                        $vIntStr = $vIntStr . "Total Period: ". $data['total_months']." Months ". $data['total_days'] . " days"."\n";
                        $vIntStr = $vIntStr . "Loan Amount: ". $data['loan_receipts_details'][0]['AMOUNT']."&emsp;"." Total Interest : ". $ov_tot_int."&emsp;". " Total Amount :" .round($tot_amt,2)."\n";
                        $vIntStr = $vIntStr . "Paid Amount : ". "0.00"."&emsp;"." Balance : ". round($tot_amt,2);

                        $data['text_area']       = $vIntStr;

                        $data['calc_total']      = $data['loan_receipts_details'][0]['AMOUNT'];
                        $data['calc_interest']   = round(array_sum($total_int));
                        $data['curr_int']        = $nxt_int;
                 
                    
                    }

                }
            }

       }
        header('Content-type: application/json'); 
        echo json_encode($data);
    }

    public function add_payment(){

        $bill_no = $_POST['bill_no'];
        $data['loan_receipts_details'] = $this->Loanreceipts_model->get_loan_receipts_details($bill_no);

        $data['receipt_details'] = $this->Loanreceipts_model->get_lt_recetpt_data($bill_no);

        if($data['receipt_details']){

            $data['maintain_charge'] = $data['receipt_details']->MAINTAINCHARGE; 
            $data['notice_charge']   = $data['receipt_details']->NOTICECHARGE; 
            $data['form_charge']     = $data['receipt_details']->FORMCHARGE; 
            $data['discount']        = $data['receipt_details']->DISCOUNT; 
            $data['on_account']      = $data['receipt_details']->HL_AMOUNT;
            $data['calc_principal']  = $data['receipt_details']->CALC_PRINCIPAL;
            $data['calc_interest']   = $data['receipt_details']->CALC_INTEREST;
            $data['paid_principal']  = $data['receipt_details']->PRINCIPAL;
            $data['paid_interest']   = $data['receipt_details']->INT_AMOUNT;
            $data['balance']         = 0;

        }else{

            $data['calc_principal']  = $data['loan_receipts_details'][0]['AMOUNT'];
            $data['paid_principal']  = 0;
            $data['paid_interest']   = 0;

            $data['maintain_charge'] = 0; 
            $data['notice_charge']   = 0; 
            $data['form_charge']     = 0; 
            $data['discount']        = 0; 
            $data['on_account']      = 0;
            $data['paid_amt']        = 0;
            $data['paid_int']        = 0;

        }



        $this->load->view('loanreceipts/add_payment',$data);

    }

    public function receipt_save()
    {   

        $data['billno']               = $this->input->post('bill_no_lr');
        $data['receipt_date']         = date("Y-m-d",strtotime($this->input->post('date')));

        $data['calc_principal']       = $this->input->post('notice_chrge');
        $data['calc_interest']        = $this->input->post('main_charge');
        $data['calc_total']           = $this->input->post('notice_chrge');
        $data['paid_total']           = $this->input->post('total_pay_cal');
        $data['total_pay']            = $this->input->post('total_pay_final');
        
        $data['maintaincharge']       = $this->input->post('main_charge');
        $data['noticecharge']         = $this->input->post('notice_chrge');
        $data['formcharge']           = $this->input->post('form_missing');
        $data['hl_amount']            = $this->input->post('on_account');
        $data['discount']             = $this->input->post('disc_chrge');
        $data['netpayable']           = $this->input->post('net_amount');

        $data['pay_amount']           = $this->input->post('pay_amt_trans_ln_receipts');
        $data['pay_interest']         = $this->input->post('interest_payblock');
        $data['pay_principal']        = $this->input->post('principal_payblock');
        $data['pay_balanace']         = $this->input->post('bal_payblock');
        $data['loan_balanace']        = $data['calc_principal'];
        $data['chk_od']               = "Y";
        $data['chk_revised']          = "Y";
        $data['revised_date']         = $data['receipt_date'];
        $data['revised_amt']          = "";
        $data['revised_int']          = "";
        $data['receipt_type']         = $_SESSION['LOANPREFIX'];
        $data['attended_user']        = $_SESSION['username'];
        $data['added_user']           = "";
        $data['added_time']           = date('Y-m-d H:i:s');
        $data['chk_verified']         = 'NULL';
        $data['verified_user']        = $this->input->post('verify_staff');
        $data['voucher_slno']         = "NULL";
        $data['hl_tans_slno']         = ""; 
        $data['chk_return_remainder'] = 'N';
 

        $ln_pfx = $_SESSION['LOANPREFIX'];
        $loan_prefix = "RECEIPTS-".$ln_pfx;

        $data['key_name'] = $loan_prefix;
        $rep_sln=$this->db->query("SELECT TOP 1 KEYVALUE FROM KEYMASTER WHERE KEYNAME='".$loan_prefix."'")->row();

         
        $data['receipt_sno']=$ln_pfx.($rep_sln->KEYVALUE+1);

        $data['key_value'] = $rep_sln->KEYVALUE+1;

        $old_srl = $ln_pfx.($rep_sln->KEYVALUE);

        $pidqry=$this->db->query("SELECT TOP 1 * FROM RECEIPT_MASTER WHERE BILLNO ='".$data['receipt_billno']."' ROWNO DESC")->row();
            
        if($pidqry){
          $data['row_no'] = $pidqry->ROWNO+1;
          $data['prev_rowno'] = $pidqry->ROWNO;
        }else{
          $data['row_no'] = 1;
          $data['prev_rowno'] = "" ;
        }
           


        $result = $this->Loanreceipts_model->add_loanreceipts_db($data);

        if($result)
        {
            $this->session->set_flashdata('g_success', 'Loan receipt have been added successfully...');
        }else{
           $this->session->set_flashdata('g_err', 'Could not add Loan receipt details!');
        }

        redirect('Loanreceipts');

    }

    
    public function loanreceipts_del()
    {
        $sno = $data['sno']=$_POST['id'];
        $data['loan_receipts_list'] = $this->db->query("SELECT * FROM RECEIPT_MASTER WHERE RECEIPT_SNO='".$sno."'")->row();
        // print_r($data);exit();
        $this->load->view('loanreceipts/loan_receipts_delete',$data);
    }

    public function delete()
    { 
        $sno=$_POST['field'];
        $result = $this->Loanreceipts_model->loanreceipts_delete($sno);
        if ($result) {
            $this->session->set_flashdata('g_success', 'Loanreceipt has been Deleted successfully.');
        }
        else{
            $this->session->set_flashdata('g_err', 'Something went wrong');
        }
    }

    // To View the Loanreceipts Details

    public function loanreceipts_view()
    {
        
        $rpt_view = $_POST['id'];

        $data['bill_no']    = $this->input->post('loanreceipts_view_id');
        $data['receipt_date'] = $this->input->post('loanreceipts_view_date');
      
        $data['loanreceipts_view_list'] = $this->Loanreceipts_model->get_loanreceipts_view($rpt_view);
       // print_r($data);exit;
        $this->load->view('loanreceipts/loan_receipts_view',$data);


    }

    //Loanreceipts Edit
    public function loan_receipts_edit()
    {
        $pdid = $_POST['id'];
        
        //$data['bill_no'] = $pdid;

       

      //  $pdid = $_POST['id'];
        

      

      $result = $this->db->query("SELECT * FROM RECEIPT_MASTER WHERE RECEIPT_SNO='".$pdid ."' ")->row();
        // print_r($result);exit();

      $bill_no =  $result->BILLNO;
      $bill_no = trim($bill_no);

      $data['bill_no'] = $bill_no;
  
      $data['receipt_details'] = $this->Loanreceipts_model->get_lt_recetpt_data($bill_no); 

      $data['receipt_date'] = $data['receipt_details']->RECEIPT_DATE;
    
    

      if($data['receipt_details']){
         $data['maintain_charge'] = $data['receipt_details']->MAINTAINCHARGE; 
         $data['notice_charge'] = $data['receipt_details']->NOTICECHARGE; 
         $data['form_charge'] = $data['receipt_details']->FORMCHARGE; 
         $data['discount'] = $data['receipt_details']->DISCOUNT; 
         $data['on_account'] = $data['receipt_details']->HL_AMOUNT; 
      }else{
          $data['maintain_charge'] =0; 
         $data['notice_charge'] = 0; 
         $data['form_charge'] = 0; 
         $data['discount'] = 0; 
         $data['on_account'] = 0; 
      }

     
      // chk_loan_no
      $data["chk_loan_no"] = $this->Loanreceipts_model->chk_loan_no($bill_no);
      //print_r($data["chk_loan_no"]);exit();
      if ($data["chk_loan_no"] == false || empty($data["chk_loan_no"]))
       {
            $data["chk_loan_no"] = false;
       }
       else
       {
        // $prefix=$_SESSION['LOANPREFIX'];
        // $pidqry=$this->db->query("SELECT TOP 1 RECEIPT_SNO FROM RECEIPT_MASTER WHERE RECEIPT_SNO LIKE '".$prefix."%' ORDER BY RECEIPT_DATE DESC");
        // $pidres=$pidqry->row();
        // $last_data=$pidres->RECEIPT_SNO;
        // $exlno = substr($last_data,1);
        // $next_value = (int)$exlno + 1;
        // $p_id1=str_pad($next_value,4,0,STR_PAD_LEFT);
        

        $ln_pfx = $_SESSION['LOANPREFIX'];
        $loan_prefix = "RECEIPTS-".$ln_pfx;

        $rep_sln=$this->db->query("SELECT TOP 1 KEYVALUE FROM KEYMASTER WHERE KEYNAME='".$loan_prefix."'")->row();

            $data['receipt_sno']=$ln_pfx.(int)$rep_sln->KEYVALUE + 1;

            $data['loan_receipts_details'] = $this->Loanreceipts_model->get_loan_receipts_details($bill_no);

         
            $data['verify_user'] = $data['loan_receipts_details'][0]['VERIFIED_USER'];

            $data['verify_list'] = $this->Loanreceipts_model->get_verify_stafflist();

            $v_list = "<option value=''>Select verified user</option>";

            foreach($data['verify_list'] as $key => $value)
            {

              if($data['verify_user'] == $value['VERIFIED_USER']){
                $v_list  .= "<option value = {$value['VERIFIED_USER']} selected  >{$value['VERIFIED_USER']}</option>";
              }else{
                 $v_list  .= "<option value = {$value['VERIFIED_USER']}>{$value['VERIFIED_USER']}</option>";
              }                      
               
            }

             $data['verify_list'] = $v_list;


          if ($data['loan_receipts_details']) 
          {
            $ln_dt = $data['loan_receipts_details'][0]['ENDATE'];
            $fdexp = explode('-', $ln_dt);
            $fd = $fdexp[2].'-'.$fdexp[1].'-'.$fdexp[0];
            $month_number = date("d-M-Y",strtotime($fd));
            $data['fd'] = $month_number;
           
              //HL_AMOUNT,
            $pid  = $data['loan_receipts_details'][0]['PID'];
            $data['party_details'] = $this->Loanreceipts_model->get_party_details($pid);
           // $data['party_name'] = $data['party_details'][0]['NAME'];
            
          }
          else
          {
            $data["loan_receipts_details"] = false;
          };

          //Receipt No
          $ln_pfx = $_SESSION['LOANPREFIX'];
          $loan_prefix = "RECEIPTS-".$ln_pfx;
          $data['loan_prefix'] = $this->Loanreceipts_model->get_loan_prefix($loan_prefix);
          $loan_pfix  = $data['loan_prefix'][0]['KEYVALUE'];
          $next_value = (int)$loan_pfix + 1;
          $rp_no = $ln_pfx."".$next_value;
          $data['rp_no'] = $rp_no;

          // Last Receipt Date
          $data['lt_recetpt_date'] = $this->Loanreceipts_model->get_lt_recetpt_date($bill_no);
          if (empty($data['lt_recetpt_date']) || is_null($data['lt_recetpt_date']))
          {
            $data['lt_recetpt_date'] = $this->Loanreceipts_model->get_loan_receipts_details($bill_no);
            $ln_dt = $data['lt_recetpt_date'][0]['ENDATE'];
            $month_number = date("d-M-Y",strtotime($ln_dt));
            $data['last_recetpt_date'] = $month_number;
          }
          else
          {
            $ln_dt = $data['lt_recetpt_date']->RECEIPT_DATE;
            $month_number = date("d-M-Y",strtotime($ln_dt));
            $data['last_recetpt_date'] = $month_number;
          };

          // Party Photo
            $party_id = $data['loan_receipts_details'][0]['PID'];
            $party_photo = $this->Loanreceipts_model->get_party_photo($party_id);
            if (is_null($party_photo) || empty($party_photo) || $party_photo == false) 
            {
                 $data['party_photo']="";
            }
            else
            {
                $data['party_photo'] = "data:image/jpg;charset=utf8;base64,".(base64_encode($party_photo));
            };

            // Jewel Photo
            $jewel_photo = $this->Loanreceipts_model->get_jewel_photo($bill_no);
            if (is_null($jewel_photo) || empty($jewel_photo)|| $jewel_photo == false)
            {
                 $data['jewel_photo']="";
            }
            else
            {
                 $data['jewel_photo'] = "data:image/jpg;charset=utf8;base64,".(base64_encode($jewel_photo));
            };

            // Receipts SlNo
          //  $receipts_slno = $this->Loanreceipts_model->get_receipts_slno($bill_no);
            $receipts_sl_no  = $this->db->query("SELECT ROWNO FROM RECEIPT_MASTER WHERE RECEIPT_SNO='".$pdid."'")->row();

          // echo json_encode($receipts_sl_no->ROWNO);

            $receipts_slno = $receipts_sl_no->ROWNO;

            // print_r($receipts_slno);exit();
            $data['receipts_slno'] = $receipts_slno;

            // Interest
            $int = round($data['loan_receipts_details'][0]['AMOUNT']*$data['loan_receipts_details'][0]['INTEREST']/100);
            $data['interest'] = $int;

            //Month and Days (Calculation Part)
              //print_r($ln_dt);
              //print_r($data['loan_receipts_details'][0]['ENDATE']);
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
                $data['months'] = $totalMonths;
                $data['days'] = $days;
                
            }
            else
            {
                $endate = $data['lt_recetpt_date']->RECEIPT_DATE;
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
            $vIntType = $data['loan_receipts_details'][0]['INTERESTTYPE'];
            $vCalcDate=$data['receipt_details']->RECEIPT_DATE;
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
                $data['lblODStatus']="OVER DUE";
              }
              else
              {
                $data['lblODStatus']="NORMAL";
              }

              //Find Max Rowno in Receipt Master Table and Paid Amount, Paid Interest
              // print_r($receipts_slno);exit();
              if ($receipts_slno >= 2) 
              {
                //$receipts_slno = $receipts_slno - 1;
                $paid_value = $this->Loanreceipts_model->get_paid_calculation($bill_no,$vCalcDate,$receipts_slno);
                $data['paid_amt'] = $paid_value->PRINCIPAL;
                $data['paid_int'] = $paid_value->INT_AMOUNT;
                // print_r("if");
                // print_r($paid_value);exit();
              }
              else
              {
                $paid_value = $this->Loanreceipts_model->get_paid_calculation_less($bill_no);
                // print_r($paid_value);exit();
                $pd_value = explode('_', $paid_value);
                $pd_value_amt = $paid_value[0];
                $pd_value_int = $paid_value[2];
                //print_r($pd_value_int);exit();
                $data['paid_amt'] = $pd_value_amt;
                $data['paid_int'] = $pd_value_int;
                // print_r("else");
                // print_r($paid_value);exit();
              }

              // Balance Amt
              $pd_amt = $data['paid_amt'];
              if ($pd_amt > 0) 
              {
                $principal = $data['loan_receipts_details'][0]['AMOUNT'];
                $balance = $principal - $pd_amt;
                $data['balance'] = $balance;
              }
              else
              {
                $data['balance'] = $data['loan_receipts_details'][0]['AMOUNT'];
              }

              //Calculation Part Text Area Field
              $vIntStr="";
              // if ($ln_dt == $data['loan_receipts_details'][0]['ENDATE'] && $data['lblODStatus'] == "NORMAL") 
              //echo $ln_dt."--------".$data['loan_receipts_details'][0]['ENDATE']."--------".$data['lblODStatus'];
              if ((($ln_dt == $data['loan_receipts_details'][0]['ENDATE']) || ($ln_dt != $data['loan_receipts_details'][0]['ENDATE'])) && $data['lblODStatus'] == "NORMAL")
              {
                if(substr($vIntType, 0,2)=="F-" || substr($vIntType, 0,2)=="H-")
                {
                  $endate = $data['loan_receipts_details'][0]['ENDATE'];
                  // $sd = $endate.' '.'00:00:00';
                  // $e = date("Y-m-d");
                  // $ed = $e.' '.'00:00:00';

                  // $start = new DateTime($sd);
                  // $end = new DateTime($ed);
                  // $diff = $start->diff($end);
                  // $days = $diff->format('%r%d');
                  // //print_r($days);exit();


                  $now = time(); // or your date as well
                  $your_date = strtotime($endate);
                  $datediff = $now - $your_date;
                  $hf_days = floor($datediff / (60 * 60 * 24));
                  //echo floor($datediff / (60 * 60 * 24));exit();

                  $prin_nor = $data['loan_receipts_details'][0]['AMOUNT'];
                  $intst = $data['loan_receipts_details'][0]['INTEREST'];
                  $perday = $prin_nor * $intst / 3000 ;
                  $perday = number_format($perday, 2, '.', '');

                  if ($hf_days < 30) 
                  {
                    $int_nor = 30 * $perday;
                  }
                  else
                  {
                    $int_nor = $hf_days * $perday;
                  }
                  $int_nor = number_format($int_nor, 2, '.', '');

                  // $int_tot_nor = $hf_days * $int_nor;
                  // $int_tot_nor = number_format($int_tot_nor, 2, '.', '');
                  $tot_nor = $prin_nor + $int_nor;
                  $tot_nor = number_format($tot_nor, 2, '.', '');

                  $vIntStr = $vIntStr . "Principal: " . $prin_nor . "&nbsp;" ." Daily Int : " .$perday."\n";
                  $vIntStr = $vIntStr .$hf_days . " Days x " . $perday . " = " . $int_nor;
                  //$vIntStr = $vIntStr . $days . " Days x " . $int_nor . " = " . $int_tot_nor;
                  $vIntStr = $vIntStr . " Total: " . $tot_nor;
                  $data['text_area'] = $vIntStr;
                  $data['cal_int'] = 0;

                  

                }
                else
                {
                  $rp_cal = $this->Loanreceipts_model->get_rp_calculation($bill_no);

                  if ($months == 0 && $days >= 0)
                    {
                      $tot = 1;
                    }
                    else if ($months > 0 && $days = 0) 
                    {
                      $tot = $months;
                    }
                    else if ($months > 0 && $days > 0) 
                    {
                      if($days > 0 && $days <= 7)
                      {
                        $tot = $months + 0.25 ;
                      }
                      else if($days >= 8 && $days <= 15)
                      {
                        $tot = $months + 0.5;
                      }
                      else if($days >= 16 && $days <= 23)
                      {
                        $tot = $months + 0.75;
                      }
                      else if($days >= 24 && $days <= 31)
                      {
                        $tot = $months + 1;
                      }
                    }
                    // print_r($tot);exit();
                    $data['tot'] = $tot;
                    $month_int = $data['loan_receipts_details'][0]['AMOUNT'] * $data['loan_receipts_details'][0]['INTEREST'] / 100;
                    $month_int_tot = $tot * $month_int;
                    $tot_amt = $data['loan_receipts_details'][0]['AMOUNT'] + $month_int_tot;

                    $t_dt = date("Y-m-d");
                    $rcpt_slno = $this->Loanreceipts_model->get_receipts_slno($bill_no);
                    $rcpt_slno = $rcpt_slno -1 ;
                    $data['mx_row_cal'] = $this->Loanreceipts_model->get_rp_calculation_max_row($bill_no,$rcpt_slno,$t_dt);
                    $count = 0;

                    for ($i=1; $i <= $rcpt_slno; $i++) 
                    { 
                      $rp_dt = $data['mx_row_cal'][$count]['RECEIPT_DATE'];
                      $rp_no_dt = explode('-', $rp_dt);
                      $rp_dt = $rp_no_dt[2].'/'.$rp_no_dt[1].'/'.$rp_no_dt[0];

                      $rp_prin = $data['mx_row_cal'][$count]['PRINCIPAL'];
                      $rp_int_amt = $data['mx_row_cal'][$count]['INT_AMOUNT'];

                      $vIntStr = $vIntStr . "As on " . $rp_dt . " *** Paid: " . ($rp_prin + $rp_int_amt)."\n";
                      $count = $count + 1;
                    }

                  
                  $vIntStr = $vIntStr . "Principal: " . $data['loan_receipts_details'][0]['AMOUNT'] . " Monthly Int : " . $month_int."\n";
                  $vIntStr = $vIntStr . "Interest : " . $tot . " Months x " . $month_int . " = " . $month_int_tot;
                  $vIntStr = $vIntStr . " Total: " . $tot_amt;

                  $data['text_area'] = $vIntStr;
                  $data['cal_int'] = $tot;
                  $data['cal_tot'] = $tot_amt; 
                  $data['curr_int'] = $month_int;
                }
                //print_r("normal");exit();
              }
              else if(($ln_dt == $data['loan_receipts_details'][0]['ENDATE']) && $data['lblODStatus'] == "OVER DUE")
              {
                if(substr($vIntType, 0,2)=="F-" || substr($vIntType, 0,2)=="H-")
                {
                  $endate = $data['loan_receipts_details'][0]['ENDATE'];
                  $now = time(); 
                  $your_date = strtotime($endate);
                  $datediff = $now - $your_date;

                  $days_tot = $datediff / (60 * 60 * 24);
                  $days_tot = floor($days_tot);
                  $iteration = $days_tot / 50;
                  //print_r($iteration);
                  $whole = floor($iteration);
                  //print_r($whole);exit();
                  $total_days = $whole * 50 ;
                  $remin = "";

                  if (is_float($iteration)) 
                  {
                     $whole = floor($iteration);
                      $total_days = $whole * 50 ;
                      $remin = $days_tot - $total_days;
                  }
                  //echo $total_days."-----".$remin;exit();
                  //$data['txt_ar'] = "";
                  $tot_day = ($data['loan_receipts_details'][0]['AMOUNT'] * $data['loan_receipts_details'][0]['INTEREST'] /3000) * 50;
                    $tot_day = number_format($tot_day, 2, '.', '');
                    $tot_amt = $data['loan_receipts_details'][0]['AMOUNT'] + $tot_day;
                    $nxt_int = $data['loan_receipts_details'][0]['INTEREST'];
                    $nxt_int = number_format($nxt_int, 2, '.', '');
                    $nxt_prin = $data['loan_receipts_details'][0]['AMOUNT'];
                    $t_int = array();
                  for ($i=1; $i <= $whole; $i++) 
                  { 
                    
                    $vIntStr = $vIntStr . "Princi: " . $nxt_prin . " Int: " . $tot_day . " Tot: " . $tot_amt . " Period: " . $data['loan_receipts_details'][0]['LOANDAYS'] . " days" . " Rate: " . $nxt_int."\n";

                    if ($i>=1) 
                    {
                      $nxt_int = $nxt_int + 0.5 ;
                    }
                    if ($nxt_int > 3.5) {
                      $nxt_int = 3.5;
                    }
                    $nxt_int = number_format($nxt_int, 2, '.', '');
                    array_push($t_int, $tot_day);
                    
                    $nxt_prin = $tot_amt;
                    $tot_day = ($nxt_prin * $nxt_int /3000) * 50;
                    $tot_day = number_format($tot_day, 2, '.', '');
                    $tot_amt = $nxt_prin + $tot_day; 
                  }

                  if ($remin != 0) 
                  {
                    $nxt_prin_bal = number_format($nxt_prin, 2, '.', '');
                    $tot_day_bal = ($nxt_prin_bal * $nxt_int /3000) * $remin;
                    $tot_day_bal = number_format($tot_day_bal, 2, '.', '');
                    $tot_amt_bal = $nxt_prin_bal + $tot_day_bal;
                    $tot_amt_bal = number_format($tot_amt_bal, 2, '.', '');

                    $t_int = array_sum($t_int);
                    $fin_int = round($t_int + $tot_day_bal);
                    $fin_int = number_format($fin_int, 2, '.', '');
                    $fin_tot_amt = $data['loan_receipts_details'][0]['AMOUNT'] + $fin_int;

                    if(is_float($fin_int)){

                      $v_fin_int=explode('.',$fin_int);

                      if($v_fin_int[1].length()>=2){

                        $fin_int = number_format($fin_int+1, 2, '.', '');

                      }else{

                      $fin_int = number_format($fin_int, 2, '.', '');
                    }


                    }else{

                      $fin_int = number_format($fin_int, 2, '.', '');
                    } 
                    

                    $fin_paid_amt = $data['loan_receipts_details'][0]['PAIDINTEREST']; 
                    $fin_paid_amt = number_format($fin_paid_amt, 2, '.', '');
                    $fin_bal_amt = $fin_tot_amt - $fin_paid_amt; 
                    $fin_bal_amt = number_format($fin_bal_amt, 2, '.', '');

                    $nxt_prin_bal."<br>".$tot_day_bal."<br>".$tot_amt_bal."<br>".$remin."<br>".$nxt_int;
                    $vIntStr = $vIntStr . "Princi: " . $nxt_prin_bal . " Int: " . $tot_day_bal . " Tot: " . $tot_amt_bal . " Period: " . $remin . " days" . " Rate: " . $nxt_int."\n";
                    $vIntStr = $vIntStr . "Total Period: ". $totalMonths." Months ". $days . " days"."\n";
                    $vIntStr = $vIntStr . "Loan Amount: ". $data['loan_receipts_details'][0]['AMOUNT']."&emsp;"." Total Interest : ". $fin_int ."&emsp;". " Total Amount :" .$fin_tot_amt."\n";
                    $vIntStr = $vIntStr . "Paid Amount : ". $fin_paid_amt."&emsp;"." Balance : ". $fin_bal_amt;
                    
                  }
                  
                  $data['text_area'] = $vIntStr;
                  $data['cal_int'] = $fin_int;
                  $data['cal_tot'] = $fin_tot_amt;  
                  $data['curr_int']= $nxt_int;

                  $data['total_month'] = $totalMonths;
                  $data['total_days'] = $days;
                }
                else
                {
                  // Calculate 3 Months Start
                  // $endate = $data['loan_receipts_details'][0]['ENDATE'];
                  // $endate = explode('-', $endate);
                  // $endate = $endate[2].'-'.$endate[1].'-'.$endate[0];
                  // $dat=date_create($endate);
                  // // $t = $data['loan_receipts_details'][0]['MONTHS']."months";
                  // $t = "3 months";
                  // date_add($dat,date_interval_create_from_date_string($t));
                  // $ln_prd = date_format($dat,"d-m-Y");
                  //echo date_format($dat,"d-m-Y");exit();
                  //Calculate 3 Months End

                  //echo $totalMonths."<br>".$days;exit();
                  $db_mon = $totalMonths - $data['loan_receipts_details'][0]['MONTHS'];
                  $iteration = $db_mon / 3;
                  $whole = floor($iteration);
                  $remin_mon = 0;

                  $loop_chk  = 0;
                  $rem_check = 0;

                  if (is_float($iteration)) 
                  {
                    $whole = floor($iteration);
                    $total_mon = $whole * 3;
                    $remin_mon = $db_mon - $total_mon;
                  }
                  else
                  {
                    $remin_mon = 0;
                  }
                  $tot_per_week = ($data['loan_receipts_details'][0]['AMOUNT'] * $data['loan_receipts_details'][0]['INTEREST'] /100) / 4;
                  $month_week = 4;
                  $tot_int = $tot_per_week * ($month_week * $data['loan_receipts_details'][0]['MONTHS']);
                  $tot_int = number_format($tot_int, 2, '.', '');
                  $tot_amt = $data['loan_receipts_details'][0]['AMOUNT'] + $tot_int;
                  $tot_amt = number_format($tot_amt, 2, '.', '');
                  $nxt_int = $data['loan_receipts_details'][0]['INTEREST'];
                  $nxt_int = number_format($nxt_int, 2, '.', '');
                  $cur_int = $data['loan_receipts_details'][0]['INTEREST'];
                  $cur_int = number_format($cur_int, 2, '.', '');
                  $nxt_prin = $data['loan_receipts_details'][0]['AMOUNT'];
                    $t_int = array();
                   
                   $vIntStr = $vIntStr . "Princi: " . $nxt_prin . " Int: " . $tot_int . " Tot: " . $tot_amt . " Period: " . $data['loan_receipts_details'][0]['MONTHS'] . " Month" . " Rate: " . $nxt_int."\n";
                   $int_sum = $tot_int;
                   $tot_sum = $tot_amt;
                   $t_int = array();

                  for ($i=1; $i <=$whole; $i++) 
                  { 
                    if ($i>=1) 
                    {
                      $nxt_int = $nxt_int + 0.5 ;
                      $nxt_int = number_format($nxt_int, 2, '.', '');
                      $cur_int = $cur_int + 0.5;
                    }
                    if ($nxt_int >= 3.5) {
                      $nxt_int = 3.5;
                      $nxt_int = number_format($nxt_int, 2, '.', '');
                      $cur_int = 3.5;
                    }

                    $nxt_prin = $tot_amt;
                    $nxt_prin = number_format($nxt_prin, 2, '.', '');
                    $tot_int = ($nxt_prin * $nxt_int /100) /4 * 12;

                    // if(is_float($tot_int)){

                    //   $v_tot_int=explode('.',$tot_int);

                    //   if($v_tot_int[1].length()>=2){

                    //     $tot_int = number_format($tot_int+1, 2, '.', '');

                    //   }else{

                    //   $tot_int = number_format($tot_int, 2, '.', '');
                    // }


                    // }else{

                    //   $tot_int = number_format($tot_int, 2, '.', '');
                    // } 

                    $tot_int = number_format($tot_int, 2, '.', '');
                    $tot_amt = $nxt_prin + $tot_int; 
                    $tot_amt = number_format($tot_amt, 2, '.', '');

                    $loop_chk =$i;

                    $vIntStr = $vIntStr . "Princi: " . $nxt_prin . " Int: " . $tot_int . " Tot: " . $tot_amt . " Period: " . "3 Month" . " Rate: " . $nxt_int."\n";
                    array_push($t_int, $tot_int);
                  }
                  $int_sum = $int_sum + array_sum($t_int);
                  $tot_sum = $tot_amt;
                  if ($remin_mon >= 1) 
                  {
                    $rem_check = 1;
                    // if ($i>=1) 
                    // {
                    //   $nxt_int = $nxt_int;
                    //   $nxt_int = number_format($nxt_int, 2, '.', '');
                    // }
                    // if ($nxt_int > 3.5) {
                    //   $nxt_int = 3.5;
                    //   $nxt_int = number_format($nxt_int, 2, '.', '');
                    // }
                    // $nxt_int = $nxt_int + 0.5 ;
                    // $nxt_int = number_format($nxt_int, 2, '.', '');
                    //print_r($loop_chk);exit();
                    if($remin_mon >= 0 && $remin_mon <= 2 && $cur_int < 3.5){
                      $cur_int = $cur_int+0.5;
                      $cur_int = number_format($cur_int, 2, '.', '');
                    }
                    else
                    {
                      $cur_int = $cur_int;
                      $cur_int = number_format($cur_int, 2, '.', '');
                    }

                    $bal_tot_amt = $tot_amt;
                    $tot_per_week = ($tot_amt * $cur_int /100) / 4;
                    $month_week = 4;
                    $tot_int = $tot_per_week * ($month_week * $remin_mon);
                    $tot_int = number_format($tot_int, 2, '.', '');
                    $fin_tot_amt = $tot_amt + $tot_int;

                    $vIntStr = $vIntStr . "Princi: " . $bal_tot_amt . " Int: " . $tot_int . " Tot: " . $fin_tot_amt . " Period: " . $remin_mon . " Month" . " Rate: " . $cur_int."\n";
                  }
                  else
                  {
                    $fin_tot_amt = round($tot_sum);
                    $fin_tot_amt = number_format($fin_tot_amt, 2, '.', '');
                    $tot_int = 0;
                  }
                  $int_sum = $int_sum + $tot_int;
                  if ($days >= 1) 
                  {
                      if($days >=1 && $days <= 7)
                      {
                        $dy = 1;
                      }
                      else if($days >= 8 && $days <= 15)
                      {
                        $dy = 2;
                      }
                      else if($days >= 16 && $days <= 23)
                      {
                        $dy = 3;
                      }
                      else if($days >= 24 && $days <= 31)
                      {
                        $dy = 4;
                      }

                    if($loop_chk > 0)
                    {
                      if($rem_check > 0)
                      {
                         $cur_int = $cur_int;
                         $cur_int = number_format($cur_int, 2, '.', '');

                      }else 
                      {
                        if ($cur_int >= 3.5) 
                        {
                          $curr_int = 3.5;
                          $cur_int = number_format($curr_int, 2, '.', '');
                        }
                        else
                        {
                          $cur_int = $cur_int+0.5;
                          $cur_int = number_format($cur_int, 2, '.', '');
                        }
                         
                      }
                    }

                    $bal_tot_amt = $tot_amt;
                    $tot_per_week = ($tot_amt * $cur_int /100) / 4;
                    //$month_week = 4;
                    $tot_int = $tot_per_week * $dy;
                    $tot_int = number_format($tot_int, 2, '.', '');
                    $fin_tot_amt = round($fin_tot_amt + $tot_int);
                    $fin_tot_amt = number_format($fin_tot_amt, 2, '.', '');

                    $vIntStr = $vIntStr . "Princi: " . $bal_tot_amt . " Int: " . $tot_int . " Tot: " . $fin_tot_amt . " Period: " . $days . " days" . " Rate: " . $cur_int."\n";
                  }
                  else
                  {
                    $fin_tot_amt = round($tot_sum);
                    $fin_tot_amt = number_format($fin_tot_amt, 2, '.', '');
                    $tot_int = 0;
                  }
                  $int_sum = round($int_sum + $tot_int);
                  $int_sum = number_format($int_sum, 2, '.', '');

                  $fin_tot_amt = $data['loan_receipts_details'][0]['AMOUNT'] + $int_sum;

                  $vIntStr = $vIntStr . "Total Period : " . $totalMonths ." Months " . $days . " days "."\n";
                  $vIntStr = $vIntStr . "Loan Amount : " . $data['loan_receipts_details'][0]['AMOUNT'] ." Total Interest : " . $int_sum . " Total Amount : " . $fin_tot_amt . "\n";
                  $vIntStr = $vIntStr . "Paid Amount : " . $data['loan_receipts_details'][0]['PAIDPRINCIPAL'] ."  Balance : " . $fin_tot_amt;

                  $data['text_area'] = $vIntStr;

                  $data['cal_int'] = $int_sum;
                  $data['cal_tot'] = $fin_tot_amt;
                  $data['curr_int'] = $cur_int; 
                   $data['total_month'] = $totalMonths;
                  $data['total_days'] = $days;
                 
                }
              }
              else if(($ln_dt != $data['loan_receipts_details'][0]['ENDATE']) && $data['lblODStatus'] == "OVER DUE")
              {
                if(substr($vIntType, 0,2)=="F-" || substr($vIntType, 0,2)=="H-")
                {

                  $t_dt = date("Y-m-d");
                  $rcpt_slno = $this->Loanreceipts_model->get_receipts_slno($bill_no);
                  $rcpt_slno = $rcpt_slno -1 ;
                  $data['max_row_cal'] = $this->Loanreceipts_model->get_rp_calculation_max_row($bill_no,$rcpt_slno,$t_dt);
                  $count = 0;

                  for ($i=1; $i <= $rcpt_slno; $i++) 
                  { 
                    $rp_dt = $data['max_row_cal'][$count]['RECEIPT_DATE'];
                    $rp_no_dt = explode('-', $rp_dt);
                    $rp_dt = $rp_no_dt[2].'/'.$rp_no_dt[1].'/'.$rp_no_dt[0];

                    $rp_calc_prin = $data['max_row_cal'][$count]['CALC_PRINCIPAL'];
                    $rp_int = $data['max_row_cal'][$count]['CALC_INTEREST'];
                    $rp_prin = $data['max_row_cal'][$count]['PRINCIPAL'];
                    $rp_int_amt = $data['max_row_cal'][$count]['INT_AMOUNT'];
                    $rp_bal = $data['max_row_cal'][$count]['BALANCE'];
                    $rp_paid = $rp_prin + $rp_int_amt;

                    $vIntStr = $vIntStr . "As on " . $rp_dt . " *** Princi: " . $rp_calc_prin . " Int: " . $rp_int . " Paid: " . $rp_paid . " Bal: " . $rp_bal."\n";
                    $count = $count + 1;
                  }

                  // $endate = $data['loan_receipts_details'][0]['ENDATE'];
                  $rp_dt = explode('/', $rp_dt);
                  $rp_dt = $rp_dt[2].'-'.$rp_dt[1].'-'.$rp_dt[0];
                  $now = time(); 
                  $your_date = strtotime($rp_dt);
                  $datediff = $now - $your_date;
                  $days_tot = $datediff / (60 * 60 * 24);
                  $days_tot = floor($days_tot);

                  $iteration = $days_tot / 50;
                  $whole = floor($iteration);
                  $total_days = $whole * 50 ;
                  // print_r($total_days);exit();
                  $remin = "";

                  if (is_float($iteration)) 
                  {
                     $whole = floor($iteration);
                      $total_days = $whole * 50 ;
                      $remin = $days_tot - $total_days;
                  }
                  //print_r($total_days);print_r($remin);exit();

                  $tot_day = ($rp_bal * 3.5 /3000) * 50;
                  $tot_day = number_format($tot_day, 2, '.', '');
                  $tot_amt = $rp_bal + $tot_day;
                  //$nxt_int = $data['loan_receipts_details'][0]['INTEREST'];
                  $nxt_int = 3.50;
                  $nxt_int = number_format($nxt_int, 2, '.', '');
                  //$nxt_prin = $data['loan_receipts_details'][0]['AMOUNT'];
                  $t_int = array();

                  for ($i=1; $i <= $whole; $i++) 
                  { 
                    
                    $vIntStr = $vIntStr . "Princi: " . $rp_bal . " Int: " . $tot_day . " Tot: " . $tot_amt . " Period: " . $data['loan_receipts_details'][0]['LOANDAYS'] . " days" . " Rate: " . $nxt_int."\n";

                    if ($i>=1) 
                    {
                      $nxt_int = $nxt_int + 0.5 ;
                    }
                    if ($nxt_int > 3.50) {
                      $nxt_int = 3.50;
                    }
                    $nxt_int = number_format($nxt_int, 2, '.', '');
                    array_push($t_int, $tot_day);
                    
                    $rp_bal = $tot_amt;
                    $tot_day = ($rp_bal * $nxt_int /3000) * 50;
                    $tot_day = number_format($tot_day, 2, '.', '');
                    $tot_amt = $rp_bal + $tot_day; 
                  }

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

                  if ($remin != 0) 
                  {
                    //echo "remin";
                    $nxt_prin_bal = number_format($rp_bal, 2, '.', '');
                    $tot_day_bal = ($nxt_prin_bal * $nxt_int /3000) * $remin;
                    $tot_day_bal = number_format($tot_day_bal, 2, '.', '');
                    $tot_amt_bal = $nxt_prin_bal + $tot_day_bal;
                    $tot_amt_bal = number_format($tot_amt_bal, 2, '.', '');

                    $t_int = array_sum($t_int);
                    $fin_int = round($t_int + $tot_day_bal);
                    $tot_fin_int = $fin_int + $rp_int;
                    $tot_fin_int = number_format($tot_fin_int, 2, '.', '');
                    $fin_tot_amt = $data['loan_receipts_details'][0]['AMOUNT'] + $tot_fin_int; 
                    $fin_tot_amt = number_format($fin_tot_amt, 2, '.', '');
                    $fin_paid_amt = $data['loan_receipts_details'][0]['PAIDINTEREST']; 
                    $fin_paid_amt = number_format($fin_paid_amt, 2, '.', '');
                    $fin_bal_amt = $fin_tot_amt - $fin_paid_amt; 
                    $fin_bal_amt = number_format($fin_bal_amt, 2, '.', '');

                    $nxt_prin_bal."<br>".$tot_day_bal."<br>".$tot_amt_bal."<br>".$remin."<br>".$nxt_int;
                    $vIntStr = $vIntStr . "Princi: " . $nxt_prin_bal . " Int: " . $tot_day_bal . " Tot: " . $tot_amt_bal . " Period: " . $remin . " days" . " Rate: " . $nxt_int."\n";
                    $vIntStr = $vIntStr . "Total Period: ". $totalMonths." Months ". $days . " days"."\n";
                    $vIntStr = $vIntStr . "Loan Amount: ". $data['loan_receipts_details'][0]['AMOUNT'] ."&emsp;"." Total Interest : ". $tot_fin_int ."&emsp;". " Total Amount :" .$fin_tot_amt. "\n";
                    $vIntStr = $vIntStr . "Paid Amount : ". $fin_paid_amt."&emsp;"." Balance : ". $fin_bal_amt;
                    
                  }
                  //echo $tot_fin_int;exit();

                  $data['text_area'] = $vIntStr;
                  $data['cal_int'] = $tot_fin_int;
                  $data['cal_tot'] = $fin_tot_amt;
                  $data['curr_int'] = $nxt_int;
                   $data['total_month'] = $totalMonths;
                  $data['total_days'] = $days; 
                }
                // else
                // {
                  
                // }
              }
              else
              {
                //print_r("else");exit();
                // $data['text_area'] = 0;
                //print_r("else");exit(); 

              }


       }

            header('Content-type: application/json'); 
            //echo json_encode($data);
            // print_r($data);

          //  $this->load->view('loanreceipts/loan_receipts_edit',$data);
    
            $data['payment_history'] = $vIntStr ;

        $this->load->view('loanreceipts/loan_receipts_edit',$data);
    }


    public function loan_receipts_view()
    {
        $pdid = $_POST['id'];
        

      $bill_no = $pdid;
      $bill_no = trim($bill_no);
      $data['receipt_details'] = $this->Loanreceipts_model->get_lt_recetpt_data($bill_no); 

      if($data['receipt_details']){
         $data['maintain_charge'] = $data['receipt_details']->MAINTAINCHARGE; 
         $data['notice_charge'] = $data['receipt_details']->NOTICECHARGE; 
         $data['form_charge'] = $data['receipt_details']->FORMCHARGE; 
         $data['discount'] = $data['receipt_details']->DISCOUNT; 
         $data['on_account'] = $data['receipt_details']->HL_AMOUNT; 
      }else{
          $data['maintain_charge'] =0; 
         $data['notice_charge'] = 0; 
         $data['form_charge'] = 0; 
         $data['discount'] = 0; 
         $data['on_account'] = 0; 
      }

     
      // chk_loan_no
      $data["chk_loan_no"] = $this->Loanreceipts_model->chk_loan_no($bill_no);
      //print_r($data["chk_loan_no"]);exit();
      if ($data["chk_loan_no"] == false || empty($data["chk_loan_no"]))
       {
            $data["chk_loan_no"] = false;
       }
       else
       {
        $prefix=$_SESSION['LOANPREFIX'];
        $pidqry=$this->db->query("SELECT TOP 1 RECEIPT_SNO FROM RECEIPT_MASTER WHERE RECEIPT_SNO LIKE '".$prefix."%' ORDER BY RECEIPT_DATE DESC");
        $pidres=$pidqry->row();
        $last_data=$pidres->RECEIPT_SNO;
        $exlno = substr($last_data,1);
        $next_value = (int)$exlno + 1;
        $p_id1=str_pad($next_value,4,0,STR_PAD_LEFT);

        $data['receipt_sno']=$prefix.$p_id1;


            $data['loan_receipts_details'] = $this->Loanreceipts_model->get_loan_receipts_details($bill_no);
            $data['verify_user'] = $data['loan_receipts_details'][0]['VERIFIED_USER'];

            $data['verify_list'] = $this->Loanreceipts_model->get_verify_stafflist();

            $v_list = "<option value=''>Select verified user</option>";

            foreach($data['verify_list'] as $key => $value)
            {

              if($data['verify_user'] == $value['VERIFIED_USER']){
                $v_list  .= "<option value = {$value['VERIFIED_USER']} selected  >{$value['VERIFIED_USER']}</option>";
              }else{
                 $v_list  .= "<option value = {$value['VERIFIED_USER']}>{$value['VERIFIED_USER']}</option>";
              }                      
               
            }

             $data['verify_list'] = $v_list;


          if ($data['loan_receipts_details']) 
          {
            $ln_dt = $data['loan_receipts_details'][0]['ENDATE'];
            $fdexp = explode('-', $ln_dt);
            $fd = $fdexp[2].'-'.$fdexp[1].'-'.$fdexp[0];
            $month_number = date("d-M-Y",strtotime($fd));
            $data['fd'] = $month_number;
           
              //HL_AMOUNT,
            $pid  = $data['loan_receipts_details'][0]['PID'];
            $data['party_details'] = $this->Loanreceipts_model->get_party_details($pid);
          }
          else
          {
            $data["loan_receipts_details"] = false;
          };

          //Receipt No
          $ln_pfx = $_SESSION['LOANPREFIX'];
          $loan_prefix = "RECEIPTS-".$ln_pfx;
          $data['loan_prefix'] = $this->Loanreceipts_model->get_loan_prefix($loan_prefix);
          $loan_pfix  = $data['loan_prefix'][0]['KEYVALUE'];
          $next_value = (int)$loan_pfix + 1;
          $rp_no = $ln_pfx."".$next_value;
          $data['rp_no'] = $rp_no;

          // Last Receipt Date
          $data['lt_recetpt_date'] = $this->Loanreceipts_model->get_lt_recetpt_date($bill_no);
          if (empty($data['lt_recetpt_date']) || is_null($data['lt_recetpt_date']))
          {
            $data['lt_recetpt_date'] = $this->Loanreceipts_model->get_loan_receipts_details($bill_no);
            $ln_dt = $data['lt_recetpt_date'][0]['ENDATE'];
            $month_number = date("d-M-Y",strtotime($ln_dt));
            $data['last_recetpt_date'] = $month_number;
          }
          else
          {
            $ln_dt = $data['lt_recetpt_date']->RECEIPT_DATE;
            $month_number = date("d-M-Y",strtotime($ln_dt));
            $data['last_recetpt_date'] = $month_number;
          };

          // Party Photo
            $party_id = $data['loan_receipts_details'][0]['PID'];
            $party_photo = $this->Loanreceipts_model->get_party_photo($party_id);
            if (is_null($party_photo) || empty($party_photo) || $party_photo == false) 
            {
                 $data['party_photo']="";
            }
            else
            {
                $data['party_photo'] = "data:image/jpg;charset=utf8;base64,".(base64_encode($party_photo));
            };

            // Jewel Photo
            $jewel_photo = $this->Loanreceipts_model->get_jewel_photo($bill_no);
            if (is_null($jewel_photo) || empty($jewel_photo)|| $jewel_photo == false)
            {
                 $data['jewel_photo']="";
            }
            else
            {
                 $data['jewel_photo'] = "data:image/jpg;charset=utf8;base64,".(base64_encode($jewel_photo));
            };

            // Receipts SlNo
            $receipts_slno = $this->Loanreceipts_model->get_receipts_slno($bill_no);
            // print_r($receipts_slno);exit();
            $data['receipts_slno'] = $receipts_slno;

            // Interest
            $int = round($data['loan_receipts_details'][0]['AMOUNT']*$data['loan_receipts_details'][0]['INTEREST']/100);
            $data['interest'] = $int;

            //Month and Days (Calculation Part)
              //print_r($ln_dt);
              //print_r($data['loan_receipts_details'][0]['ENDATE']);
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
                $data['months'] = $totalMonths;
                $data['days'] = $days;
                
            }
            else
            {
                $endate = $data['lt_recetpt_date']->RECEIPT_DATE;
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
            $vIntType = $data['loan_receipts_details'][0]['INTERESTTYPE'];
            $vCalcDate=date('Y-m-d',strtotime($_POST['cldate']));
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
                $data['lblODStatus']="OVER DUE";
              }
              else
              {
                $data['lblODStatus']="NORMAL";
              }

              //Find Max Rowno in Receipt Master Table and Paid Amount, Paid Interest
              // print_r($receipts_slno);exit();
              if ($receipts_slno >= 2) 
              {
                //$receipts_slno = $receipts_slno - 1;
                $paid_value = $this->Loanreceipts_model->get_paid_calculation($bill_no,$vCalcDate,$receipts_slno);
                $data['paid_amt'] = $paid_value->PRINCIPAL;
                $data['paid_int'] = $paid_value->INT_AMOUNT;
                // print_r("if");
                // print_r($paid_value);exit();
              }
              else
              {
                $paid_value = $this->Loanreceipts_model->get_paid_calculation_less($bill_no);
                // print_r($paid_value);exit();
                $pd_value = explode('_', $paid_value);
                $pd_value_amt = $paid_value[0];
                $pd_value_int = $paid_value[2];
                //print_r($pd_value_int);exit();
                $data['paid_amt'] = $pd_value_amt;
                $data['paid_int'] = $pd_value_int;
                // print_r("else");
                // print_r($paid_value);exit();
              }

              // Balance Amt
              $pd_amt = $data['paid_amt'];
              if ($pd_amt > 0) 
              {
                $principal = $data['loan_receipts_details'][0]['AMOUNT'];
                $balance = $principal - $pd_amt;
                $data['balance'] = $balance;
              }
              else
              {
                $data['balance'] = $data['loan_receipts_details'][0]['AMOUNT'];
              }

              //Calculation Part Text Area Field
              $vIntStr="";
              // if ($ln_dt == $data['loan_receipts_details'][0]['ENDATE'] && $data['lblODStatus'] == "NORMAL") 
              //echo $ln_dt."--------".$data['loan_receipts_details'][0]['ENDATE']."--------".$data['lblODStatus'];
              if ((($ln_dt == $data['loan_receipts_details'][0]['ENDATE']) || ($ln_dt != $data['loan_receipts_details'][0]['ENDATE'])) && $data['lblODStatus'] == "NORMAL")
              {
                if(substr($vIntType, 0,2)=="F-" || substr($vIntType, 0,2)=="H-")
                {
                  $endate = $data['loan_receipts_details'][0]['ENDATE'];
                  // $sd = $endate.' '.'00:00:00';
                  // $e = date("Y-m-d");
                  // $ed = $e.' '.'00:00:00';

                  // $start = new DateTime($sd);
                  // $end = new DateTime($ed);
                  // $diff = $start->diff($end);
                  // $days = $diff->format('%r%d');
                  // //print_r($days);exit();


                  $now = time(); // or your date as well
                  $your_date = strtotime($endate);
                  $datediff = $now - $your_date;
                  $hf_days = floor($datediff / (60 * 60 * 24));
                  //echo floor($datediff / (60 * 60 * 24));exit();

                  $prin_nor = $data['loan_receipts_details'][0]['AMOUNT'];
                  $intst = $data['loan_receipts_details'][0]['INTEREST'];
                  $perday = $prin_nor * $intst / 3000 ;
                  $perday = number_format($perday, 2, '.', '');

                  if ($hf_days < 30) 
                  {
                    $int_nor = 30 * $perday;
                  }
                  else
                  {
                    $int_nor = $hf_days * $perday;
                  }
                  $int_nor = number_format($int_nor, 2, '.', '');

                  // $int_tot_nor = $hf_days * $int_nor;
                  // $int_tot_nor = number_format($int_tot_nor, 2, '.', '');
                  $tot_nor = $prin_nor + $int_nor;
                  $tot_nor = number_format($tot_nor, 2, '.', '');

                  $vIntStr = $vIntStr . "Principal: " . $prin_nor . "&nbsp;" ." Daily Int : " .$perday."\n";
                  $vIntStr = $vIntStr .$hf_days . " Days x " . $perday . " = " . $int_nor;
                  //$vIntStr = $vIntStr . $days . " Days x " . $int_nor . " = " . $int_tot_nor;
                  $vIntStr = $vIntStr . " Total: " . $tot_nor;
                  $data['text_area'] = $vIntStr;
                  $data['cal_int'] = 0;

                  

                }
                else
                {
                  $rp_cal = $this->Loanreceipts_model->get_rp_calculation($bill_no);

                  if ($months == 0 && $days >= 0)
                    {
                      $tot = 1;
                    }
                    else if ($months > 0 && $days = 0) 
                    {
                      $tot = $months;
                    }
                    else if ($months > 0 && $days > 0) 
                    {
                      if($days > 0 && $days <= 7)
                      {
                        $tot = $months + 0.25 ;
                      }
                      else if($days >= 8 && $days <= 15)
                      {
                        $tot = $months + 0.5;
                      }
                      else if($days >= 16 && $days <= 23)
                      {
                        $tot = $months + 0.75;
                      }
                      else if($days >= 24 && $days <= 31)
                      {
                        $tot = $months + 1;
                      }
                    }
                    // print_r($tot);exit();
                    $data['tot'] = $tot;
                    $month_int = $data['loan_receipts_details'][0]['AMOUNT'] * $data['loan_receipts_details'][0]['INTEREST'] / 100;
                    $month_int_tot = $tot * $month_int;
                    $tot_amt = $data['loan_receipts_details'][0]['AMOUNT'] + $month_int_tot;

                    $t_dt = date("Y-m-d");
                    $rcpt_slno = $this->Loanreceipts_model->get_receipts_slno($bill_no);
                    $rcpt_slno = $rcpt_slno -1 ;
                    $data['mx_row_cal'] = $this->Loanreceipts_model->get_rp_calculation_max_row($bill_no,$rcpt_slno,$t_dt);
                    $count = 0;

                    for ($i=1; $i <= $rcpt_slno; $i++) 
                    { 
                      $rp_dt = $data['mx_row_cal'][$count]['RECEIPT_DATE'];
                      $rp_no_dt = explode('-', $rp_dt);
                      $rp_dt = $rp_no_dt[2].'/'.$rp_no_dt[1].'/'.$rp_no_dt[0];

                      $rp_prin = $data['mx_row_cal'][$count]['PRINCIPAL'];
                      $rp_int_amt = $data['mx_row_cal'][$count]['INT_AMOUNT'];

                      $vIntStr = $vIntStr . "As on " . $rp_dt . " *** Paid: " . ($rp_prin + $rp_int_amt)."\n";
                      $count = $count + 1;
                    }

                  
                  $vIntStr = $vIntStr . "Principal: " . $data['loan_receipts_details'][0]['AMOUNT'] . " Monthly Int : " . $month_int."\n";
                  $vIntStr = $vIntStr . "Interest : " . $tot . " Months x " . $month_int . " = " . $month_int_tot;
                  $vIntStr = $vIntStr . " Total: " . $tot_amt;

                  $data['text_area'] = $vIntStr;
                  $data['cal_int'] = $tot;
                  $data['cal_tot'] = $tot_amt; 
                  $data['curr_int'] = $month_int;
                }
                //print_r("normal");exit();
              }
              else if(($ln_dt == $data['loan_receipts_details'][0]['ENDATE']) && $data['lblODStatus'] == "OVER DUE")
              {
                if(substr($vIntType, 0,2)=="F-" || substr($vIntType, 0,2)=="H-")
                {
                  $endate = $data['loan_receipts_details'][0]['ENDATE'];
                  $now = time(); 
                  $your_date = strtotime($endate);
                  $datediff = $now - $your_date;

                  $days_tot = $datediff / (60 * 60 * 24);
                  $days_tot = floor($days_tot);
                  $iteration = $days_tot / 50;
                  //print_r($iteration);
                  $whole = floor($iteration);
                  //print_r($whole);exit();
                  $total_days = $whole * 50 ;
                  $remin = "";

                  if (is_float($iteration)) 
                  {
                     $whole = floor($iteration);
                      $total_days = $whole * 50 ;
                      $remin = $days_tot - $total_days;
                  }
                  //echo $total_days."-----".$remin;exit();
                  //$data['txt_ar'] = "";
                  $tot_day = ($data['loan_receipts_details'][0]['AMOUNT'] * $data['loan_receipts_details'][0]['INTEREST'] /3000) * 50;
                    $tot_day = number_format($tot_day, 2, '.', '');
                    $tot_amt = $data['loan_receipts_details'][0]['AMOUNT'] + $tot_day;
                    $nxt_int = $data['loan_receipts_details'][0]['INTEREST'];
                    $nxt_int = number_format($nxt_int, 2, '.', '');
                    $nxt_prin = $data['loan_receipts_details'][0]['AMOUNT'];
                    $t_int = array();
                  for ($i=1; $i <= $whole; $i++) 
                  { 
                    
                    $vIntStr = $vIntStr . "Princi: " . $nxt_prin . " Int: " . $tot_day . " Tot: " . $tot_amt . " Period: " . $data['loan_receipts_details'][0]['LOANDAYS'] . " days" . " Rate: " . $nxt_int."\n";

                    if ($i>=1) 
                    {
                      $nxt_int = $nxt_int + 0.5 ;
                    }
                    if ($nxt_int > 3.5) {
                      $nxt_int = 3.5;
                    }
                    $nxt_int = number_format($nxt_int, 2, '.', '');
                    array_push($t_int, $tot_day);
                    
                    $nxt_prin = $tot_amt;
                    $tot_day = ($nxt_prin * $nxt_int /3000) * 50;
                    $tot_day = number_format($tot_day, 2, '.', '');
                    $tot_amt = $nxt_prin + $tot_day; 
                  }

                  if ($remin != 0) 
                  {
                    $nxt_prin_bal = number_format($nxt_prin, 2, '.', '');
                    $tot_day_bal = ($nxt_prin_bal * $nxt_int /3000) * $remin;
                    $tot_day_bal = number_format($tot_day_bal, 2, '.', '');
                    $tot_amt_bal = $nxt_prin_bal + $tot_day_bal;
                    $tot_amt_bal = number_format($tot_amt_bal, 2, '.', '');

                    $t_int = array_sum($t_int);
                    $fin_int = round($t_int + $tot_day_bal);
                    $fin_int = number_format($fin_int, 2, '.', '');
                    $fin_tot_amt = $data['loan_receipts_details'][0]['AMOUNT'] + $fin_int;

                    if(is_float($fin_int)){

                      $v_fin_int=explode('.',$fin_int);

                      if($v_fin_int[1].length()>=2){

                        $fin_int = number_format($fin_int+1, 2, '.', '');

                      }else{

                      $fin_int = number_format($fin_int, 2, '.', '');
                    }


                    }else{

                      $fin_int = number_format($fin_int, 2, '.', '');
                    } 
                    

                    $fin_paid_amt = $data['loan_receipts_details'][0]['PAIDINTEREST']; 
                    $fin_paid_amt = number_format($fin_paid_amt, 2, '.', '');
                    $fin_bal_amt = $fin_tot_amt - $fin_paid_amt; 
                    $fin_bal_amt = number_format($fin_bal_amt, 2, '.', '');

                    $nxt_prin_bal."<br>".$tot_day_bal."<br>".$tot_amt_bal."<br>".$remin."<br>".$nxt_int;
                    $vIntStr = $vIntStr . "Princi: " . $nxt_prin_bal . " Int: " . $tot_day_bal . " Tot: " . $tot_amt_bal . " Period: " . $remin . " days" . " Rate: " . $nxt_int."\n";
                    $vIntStr = $vIntStr . "Total Period: ". $totalMonths." Months ". $days . " days"."\n";
                    $vIntStr = $vIntStr . "Loan Amount: ". $data['loan_receipts_details'][0]['AMOUNT']."&emsp;"." Total Interest : ". $fin_int ."&emsp;". " Total Amount :" .$fin_tot_amt."\n";
                    $vIntStr = $vIntStr . "Paid Amount : ". $fin_paid_amt."&emsp;"." Balance : ". $fin_bal_amt;
                    
                  }
                  
                  $data['text_area'] = $vIntStr;
                  $data['cal_int'] = $fin_int;
                  $data['cal_tot'] = $fin_tot_amt;  
                  $data['curr_int']= $nxt_int;
                   $data['total_month'] = $totalMonths;
                  $data['total_days'] = $days;
                }
                else
                {
                  
                  $db_mon = $totalMonths - $data['loan_receipts_details'][0]['MONTHS'];
                  $iteration = $db_mon / 3;
                  $whole = floor($iteration);
                  $remin_mon = 0;

                  $loop_chk  = 0;
                  $rem_check = 0;

                  if (is_float($iteration)) 
                  {
                    $whole = floor($iteration);
                    $total_mon = $whole * 3;
                    $remin_mon = $db_mon - $total_mon;
                  }
                  else
                  {
                    $remin_mon = 0;
                  }
                  $tot_per_week = ($data['loan_receipts_details'][0]['AMOUNT'] * $data['loan_receipts_details'][0]['INTEREST'] /100) / 4;
                  $month_week = 4;
                  $tot_int = $tot_per_week * ($month_week * $data['loan_receipts_details'][0]['MONTHS']);
                  $tot_int = number_format($tot_int, 2, '.', '');
                  $tot_amt = $data['loan_receipts_details'][0]['AMOUNT'] + $tot_int;
                  $tot_amt = number_format($tot_amt, 2, '.', '');
                  $nxt_int = $data['loan_receipts_details'][0]['INTEREST'];
                  $nxt_int = number_format($nxt_int, 2, '.', '');
                  $cur_int = $data['loan_receipts_details'][0]['INTEREST'];
                  $cur_int = number_format($cur_int, 2, '.', '');
                  $nxt_prin = $data['loan_receipts_details'][0]['AMOUNT'];
                    $t_int = array();
                   
                   $vIntStr = $vIntStr . "Princi: " . $nxt_prin . " Int: " . $tot_int . " Tot: " . $tot_amt . " Period: " . $data['loan_receipts_details'][0]['MONTHS'] . " Month" . " Rate: " . $nxt_int."\n";
                   $int_sum = $tot_int;
                   $tot_sum = $tot_amt;
                   $t_int = array();

                  for ($i=1; $i <=$whole; $i++) 
                  { 
                    if ($i>=1) 
                    {
                      $nxt_int = $nxt_int + 0.5 ;
                      $nxt_int = number_format($nxt_int, 2, '.', '');
                      $cur_int = $cur_int + 0.5;
                    }
                    if ($nxt_int >= 3.5) {
                      $nxt_int = 3.5;
                      $nxt_int = number_format($nxt_int, 2, '.', '');
                      $cur_int = 3.5;
                    }

                    $nxt_prin = $tot_amt;
                    $nxt_prin = number_format($nxt_prin, 2, '.', '');
                    $tot_int = ($nxt_prin * $nxt_int /100) /4 * 12;


                    $tot_int = number_format($tot_int, 2, '.', '');
                    $tot_amt = $nxt_prin + $tot_int; 
                    $tot_amt = number_format($tot_amt, 2, '.', '');

                    $loop_chk =$i;

                    $vIntStr = $vIntStr . "Princi: " . $nxt_prin . " Int: " . $tot_int . " Tot: " . $tot_amt . " Period: " . "3 Month" . " Rate: " . $nxt_int."\n";
                    array_push($t_int, $tot_int);
                  }
                  $int_sum = $int_sum + array_sum($t_int);
                  $tot_sum = $tot_amt;
                  if ($remin_mon >= 1) 
                  {
                    $rem_check = 1;
                    
                    if($remin_mon >= 0 && $remin_mon <= 2 && $cur_int < 3.5){
                      $cur_int = $cur_int+0.5;
                      $cur_int = number_format($cur_int, 2, '.', '');
                    }
                    else
                    {
                      $cur_int = $cur_int;
                      $cur_int = number_format($cur_int, 2, '.', '');
                    }

                    $bal_tot_amt = $tot_amt;
                    $tot_per_week = ($tot_amt * $cur_int /100) / 4;
                    $month_week = 4;
                    $tot_int = $tot_per_week * ($month_week * $remin_mon);
                    $tot_int = number_format($tot_int, 2, '.', '');
                    $fin_tot_amt = $tot_amt + $tot_int;

                    $vIntStr = $vIntStr . "Princi: " . $bal_tot_amt . " Int: " . $tot_int . " Tot: " . $fin_tot_amt . " Period: " . $remin_mon . " Month" . " Rate: " . $cur_int."\n";
                  }
                  else
                  {
                    $fin_tot_amt = round($tot_sum);
                    $fin_tot_amt = number_format($fin_tot_amt, 2, '.', '');
                    $tot_int = 0;
                  }
                  $int_sum = $int_sum + $tot_int;
                  if ($days >= 1) 
                  {
                      if($days >=1 && $days <= 7)
                      {
                        $dy = 1;
                      }
                      else if($days >= 8 && $days <= 15)
                      {
                        $dy = 2;
                      }
                      else if($days >= 16 && $days <= 23)
                      {
                        $dy = 3;
                      }
                      else if($days >= 24 && $days <= 31)
                      {
                        $dy = 4;
                      }

                    if($loop_chk > 0)
                    {
                      if($rem_check > 0)
                      {
                         $cur_int = $cur_int;
                         $cur_int = number_format($cur_int, 2, '.', '');

                      }else 
                      {
                        if ($cur_int >= 3.5) 
                        {
                          $curr_int = 3.5;
                          $cur_int = number_format($curr_int, 2, '.', '');
                        }
                        else
                        {
                          $cur_int = $cur_int+0.5;
                          $cur_int = number_format($cur_int, 2, '.', '');
                        }
                         
                      }
                    }

                    $bal_tot_amt = $tot_amt;
                    $tot_per_week = ($tot_amt * $cur_int /100) / 4;
                    //$month_week = 4;
                    $tot_int = $tot_per_week * $dy;
                    $tot_int = number_format($tot_int, 2, '.', '');
                    $fin_tot_amt = round($fin_tot_amt + $tot_int);
                    $fin_tot_amt = number_format($fin_tot_amt, 2, '.', '');

                    $vIntStr = $vIntStr . "Princi: " . $bal_tot_amt . " Int: " . $tot_int . " Tot: " . $fin_tot_amt . " Period: " . $days . " days" . " Rate: " . $cur_int."\n";
                  }
                  else
                  {
                    $fin_tot_amt = round($tot_sum);
                    $fin_tot_amt = number_format($fin_tot_amt, 2, '.', '');
                    $tot_int = 0;
                  }
                  $int_sum = round($int_sum + $tot_int);
                  $int_sum = number_format($int_sum, 2, '.', '');

                  $fin_tot_amt = $data['loan_receipts_details'][0]['AMOUNT'] + $int_sum;

                  $vIntStr = $vIntStr . "Total Period : " . $totalMonths ." Months " . $days . " days "."\n";
                  $vIntStr = $vIntStr . "Loan Amount : " . $data['loan_receipts_details'][0]['AMOUNT'] ." Total Interest : " . $int_sum . " Total Amount : " . $fin_tot_amt . "\n";
                  $vIntStr = $vIntStr . "Paid Amount : " . $data['loan_receipts_details'][0]['PAIDPRINCIPAL'] ."  Balance : " . $fin_tot_amt;

                  $data['text_area'] = $vIntStr;

                  $data['cal_int'] = $int_sum;
                  $data['cal_tot'] = $fin_tot_amt;
                  $data['curr_int'] = $cur_int;
                   $data['total_month'] = $totalMonths;
                  $data['total_days'] = $days; 
                 
                }
              }
              else if(($ln_dt != $data['loan_receipts_details'][0]['ENDATE']) && $data['lblODStatus'] == "OVER DUE")
              {
                if(substr($vIntType, 0,2)=="F-" || substr($vIntType, 0,2)=="H-")
                {

                  $t_dt = date("Y-m-d");
                  $rcpt_slno = $this->Loanreceipts_model->get_receipts_slno($bill_no);
                  $rcpt_slno = $rcpt_slno -1 ;
                  $data['max_row_cal'] = $this->Loanreceipts_model->get_rp_calculation_max_row($bill_no,$rcpt_slno,$t_dt);
                  $count = 0;

                  for ($i=1; $i <= $rcpt_slno; $i++) 
                  { 
                    $rp_dt = $data['max_row_cal'][$count]['RECEIPT_DATE'];
                    $rp_no_dt = explode('-', $rp_dt);
                    $rp_dt = $rp_no_dt[2].'/'.$rp_no_dt[1].'/'.$rp_no_dt[0];

                    $rp_calc_prin = $data['max_row_cal'][$count]['CALC_PRINCIPAL'];
                    $rp_int = $data['max_row_cal'][$count]['CALC_INTEREST'];
                    $rp_prin = $data['max_row_cal'][$count]['PRINCIPAL'];
                    $rp_int_amt = $data['max_row_cal'][$count]['INT_AMOUNT'];
                    $rp_bal = $data['max_row_cal'][$count]['BALANCE'];
                    $rp_paid = $rp_prin + $rp_int_amt;

                    $vIntStr = $vIntStr . "As on " . $rp_dt . " *** Princi: " . $rp_calc_prin . " Int: " . $rp_int . " Paid: " . $rp_paid . " Bal: " . $rp_bal."\n";
                    $count = $count + 1;
                  }

                  // $endate = $data['loan_receipts_details'][0]['ENDATE'];
                  $rp_dt = explode('/', $rp_dt);
                  $rp_dt = $rp_dt[2].'-'.$rp_dt[1].'-'.$rp_dt[0];
                  $now = time(); 
                  $your_date = strtotime($rp_dt);
                  $datediff = $now - $your_date;
                  $days_tot = $datediff / (60 * 60 * 24);
                  $days_tot = floor($days_tot);

                  $iteration = $days_tot / 50;
                  $whole = floor($iteration);
                  $total_days = $whole * 50 ;
                  // print_r($total_days);exit();
                  $remin = "";

                  if (is_float($iteration)) 
                  {
                     $whole = floor($iteration);
                      $total_days = $whole * 50 ;
                      $remin = $days_tot - $total_days;
                  }
                  //print_r($total_days);print_r($remin);exit();

                  $tot_day = ($rp_bal * 3.5 /3000) * 50;
                  $tot_day = number_format($tot_day, 2, '.', '');
                  $tot_amt = $rp_bal + $tot_day;
                  //$nxt_int = $data['loan_receipts_details'][0]['INTEREST'];
                  $nxt_int = 3.50;
                  $nxt_int = number_format($nxt_int, 2, '.', '');
                  //$nxt_prin = $data['loan_receipts_details'][0]['AMOUNT'];
                  $t_int = array();

                  for ($i=1; $i <= $whole; $i++) 
                  { 
                    
                    $vIntStr = $vIntStr . "Princi: " . $rp_bal . " Int: " . $tot_day . " Tot: " . $tot_amt . " Period: " . $data['loan_receipts_details'][0]['LOANDAYS'] . " days" . " Rate: " . $nxt_int."\n";

                    if ($i>=1) 
                    {
                      $nxt_int = $nxt_int + 0.5 ;
                    }
                    if ($nxt_int > 3.50) {
                      $nxt_int = 3.50;
                    }
                    $nxt_int = number_format($nxt_int, 2, '.', '');
                    array_push($t_int, $tot_day);
                    
                    $rp_bal = $tot_amt;
                    $tot_day = ($rp_bal * $nxt_int /3000) * 50;
                    $tot_day = number_format($tot_day, 2, '.', '');
                    $tot_amt = $rp_bal + $tot_day; 
                  }

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

                  if ($remin != 0) 
                  {
                    //echo "remin";
                    $nxt_prin_bal = number_format($rp_bal, 2, '.', '');
                    $tot_day_bal = ($nxt_prin_bal * $nxt_int /3000) * $remin;
                    $tot_day_bal = number_format($tot_day_bal, 2, '.', '');
                    $tot_amt_bal = $nxt_prin_bal + $tot_day_bal;
                    $tot_amt_bal = number_format($tot_amt_bal, 2, '.', '');

                    $t_int = array_sum($t_int);
                    $fin_int = round($t_int + $tot_day_bal);
                    $tot_fin_int = $fin_int + $rp_int;
                    $tot_fin_int = number_format($tot_fin_int, 2, '.', '');
                    $fin_tot_amt = $data['loan_receipts_details'][0]['AMOUNT'] + $tot_fin_int; 
                    $fin_tot_amt = number_format($fin_tot_amt, 2, '.', '');
                    $fin_paid_amt = $data['loan_receipts_details'][0]['PAIDINTEREST']; 
                    $fin_paid_amt = number_format($fin_paid_amt, 2, '.', '');
                    $fin_bal_amt = $fin_tot_amt - $fin_paid_amt; 
                    $fin_bal_amt = number_format($fin_bal_amt, 2, '.', '');

                    $nxt_prin_bal."<br>".$tot_day_bal."<br>".$tot_amt_bal."<br>".$remin."<br>".$nxt_int;
                    $vIntStr = $vIntStr . "Princi: " . $nxt_prin_bal . " Int: " . $tot_day_bal . " Tot: " . $tot_amt_bal . " Period: " . $remin . " days" . " Rate: " . $nxt_int."\n";
                    $vIntStr = $vIntStr . "Total Period: ". $totalMonths." Months ". $days . " days"."\n";
                    $vIntStr = $vIntStr . "Loan Amount: ". $data['loan_receipts_details'][0]['AMOUNT'] ."&emsp;"." Total Interest : ". $tot_fin_int ."&emsp;". " Total Amount :" .$fin_tot_amt. "\n";
                    $vIntStr = $vIntStr . "Paid Amount : ". $fin_paid_amt."&emsp;"." Balance : ". $fin_bal_amt;
                    
                  }
                  //echo $tot_fin_int;exit();

                  $data['text_area'] = $vIntStr;
                  $data['cal_int'] = $tot_fin_int;
                  $data['cal_tot'] = $fin_tot_amt;
                  $data['curr_int'] = $nxt_int;
                   $data['total_month'] = $totalMonths;
                  $data['total_days'] = $days; 
                }
                // else
                // {
                  
                // }
              }
              else
              {
                //print_r("else");exit();
                // $data['text_area'] = 0;
                //print_r("else");exit(); 

              }


       }
            header('Content-type: application/json'); 
            //echo json_encode($data);
            // print_r($data);

            $this->load->view('loanreceipts/loan_receipts_edit',$data);
    }
    //To update Loanreceipts
    public function loanreceipts_update()
    {    
        $data['receipt_sno']       = $this->input->post('receipt_no');
        $data['receipt_date']      = $this->input->post('date');
        $data['paid_amount']        = $this->input->post('pay_amt_trans_ln_receipts');
        $data['int_amount']        = $this->input->post('interest_payblock');
        $data['principal']         = $this->input->post('principal_payblock');
        $data['balance']             = $this->input->post('bal_payblock');
        $data['revised']             = $this->input->post('revise_loan');
        $data['bill_no']             = $this->input->post('bill_no');

        // $data['jewel_return']     = $this->input->post('jewel_notreturned');
       
      
        $data['added_user_ed']        = $_SESSION['username'];
        $data['company_code_ed']      = $_SESSION['COMPANYCODE'];
        $data['updated_on_ed']         = date('Y-m-d');

        

       
        $result = $this->Loanreceipts_model->update_loanreceipts($data);
        if($result)
        {
            $this->session->set_flashdata('g_success', 'Loanreceipts have been updated successfully...');
        }else{
           $this->session->set_flashdata('g_err', 'Could not update loanreceipt details!');
        }
        redirect('Loanreceipts');
    }

}
?>
