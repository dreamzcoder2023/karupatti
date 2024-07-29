<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/* ************************************************************************************
		Purpose : To handle all Loan Receipts functions 2022-11-01
***************************************************************************************/
class Repledge extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model(array("Repledge_model"));
    	$this->load->library('user_agent');
    	if (isset($this->session->userdata['username']) && $this->session->userdata['username'] == TRUE)
        {
            //do something
        }else{
            redirect('login'); //if session is not there, redirect to login page
        } 
		date_default_timezone_set("Asia/Kolkata");
    	$this->session->set_userdata('comtitle', 'Jewel Settlement');
	}

    public function index()
    {

       $page       = isset($_GET['page']) ? $_GET['page'] : 1;
        $limit      = 25;
        $offset     = ($page - 1) * $limit +1;
        $page_limit=$offset+$limit-1;

        $tdate="";
      

      $data['today_date_fillter'] = date("Y-m-d");
      $fdate =" AND r.ENDATE='".$data['today_date_fillter']."' ";

     
      $data['dt_fill'] = $this->input->post('dt_fill_loan_list');
      // echo $this->input->post('dt_fill_loan_list');
      $data['from_date_fillter'] = $this->input->post('from_date_fillter_loan_list');
      $data['to_date_fillter'] = $this->input->post('to_date_fillter_loan_list');
      $data['company_filter'] =$this->input->post('company_filter');
      $data['type_filter']=$this->input->post('type_filter');
      $data['bank_filter']=$this->input->post('bank_filter');
      
      // $cnt= count((array)$data['company_filter']);
      // $str='';
      // for ($i=0;$i<$cnt;$i++)
      // {
      //     if($i==0)
      //       $str="'".$data['company_filter'][$i]."'";
      //     else
      //       $str.=",'".$data['company_filter'][$i]."'";
      // }
      // exit();
      
      // echo $data['company_filter'];
      // echo $data['type_filter'];
      // echo $data['dt_fill'] ;
      // exit();

      if($data['company_filter']=='all' || $data['company_filter']=='')
      {
        $cmp= "";  
      }
      else
      {
        $cmp= " and r.COMPANYCODE in('".$data['company_filter'] ."') ";  
      }
      

      if($data['type_filter']=='all' || $data['type_filter']=='')
      {
        $type="";
      }
      else
      {
        $type=" and r.MIXED= '".$data['type_filter']."' ";
          
      }

      if($data['bank_filter']=='all' || $data['bank_filter']=='')
      {
        $bank="";
      }
      else
      {
        $bank=" and r.BANK= '".$data['bank_filter']."' ";
          
      }
      // echo $type;
      // echo $cmp;
      // exit();
      if($data['dt_fill']=="today")
      {
          $data['today_date_fillter'] = date("Y-m-d");
          $fdate =" AND r.ENDATE='".$data['today_date_fillter']."' ";
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
              $fdate =" AND r.ENDATE>='".$data['week_from_date_fillter']."'";
              $tdate =" AND r.ENDATE<='".$data['week_to_date_fillter']."'";

          }
          else
          {
              $data['week_from_date_fillter']=date(' Y-m-d', strtotime("sunday -1 week"));

              $data['week_to_date_fillter']=date(' Y-m-d', strtotime("saturday 0 week"));
              //  print_r($data['week_to_date_fillter']);exit;
              $fdate =" AND r.ENDATE>='".$data['week_from_date_fillter']."'";
            $tdate =" AND r.ENDATE<='".$data['week_to_date_fillter']."'";
          }
      }
      if($data['dt_fill']=="monthly")
      {

          $first=date('Y-m-01');
          $last=date('Y-m-t');
          $fdate =" AND r.ENDATE>='".$first."'";
          $tdate ="AND r.ENDATE<='".$last."'";
      }
      if($data['dt_fill']=="custom_date")
      {

         
          if($data['from_date_fillter']!='')
          {
            echo "inside";
            $first=date('Y-m-d',strtotime($data['from_date_fillter']));
            $fdate =" AND r.ENDATE>='".$first."'";
          }
          else
          {
            $fdate ='';
          }
          if($data['to_date_fillter']!='')
          {
            $last=date('Y-m-d',strtotime($data['to_date_fillter']));
            $tdate =" AND r.ENDATE<='".$last."'";
          }
          else
          {
            $tdate ='';
          } 
      }
      // echo $fdate;
      // echo $tdate;
      // exit();

        $data['company_list'] =  $this->Repledge_model->get_company_list();
        $data['bank_list'] =  $this->Repledge_model->get_bank_list();
        // $data['staff_list'] =  $this->Repledge_model->get_staff_list();
        // $data['interest_list'] =  $this->Repledge_model->get_interest_list();

        // $data['repledge_list'] =  $this->Repledge_model->get_repledge_list();
        // echo "SELECT * FROM (SELECT r.*,ROW_NUMBER() OVER (ORDER BY r.ENDATE DESC) AS sl FROM REPLEDGE_MASTER r WHERE ACTIVE='Y'  $fdate $tdate $type $cmp) N  WHERE sl BETWEEN $offset AND $page_limit ";
        // exit();
        $data['repledge_list'] = $this->db->query("SELECT * FROM (SELECT r.*,ROW_NUMBER() OVER (ORDER BY r.ENDATE DESC) AS sl FROM REPLEDGE_MASTER r WHERE ACTIVE='Y'  $fdate $tdate $type $cmp $bank) N  WHERE sl BETWEEN $offset AND $page_limit ")->result_array();
       //echo "<pre>";
      // print_r( $data['repledge_list']);
       // echo "</pre>";exit;
        $data['min_count']=count((array)$data['repledge_list']);
       $l_count=$this->db->query("SELECT count(r.RP_BILLNO) as count  FROM REPLEDGE_MASTER r WHERE r.ACTIVE='Y' $fdate $tdate $type $cmp $bank")->row();
       $data['loan_count']=$l_count->count;

        $this->load->view('repledge/repledge_list',$data);
    }

    public function repledge_save()
    {
     // $rp_bill_no=$this->input->post('indivalbillnumber');
   
      $res_sno=$this->db->query("select * from KEYMASTER where KEYNAME='REPLEDGE-".$_SESSION['LOANPREFIX']."'")->row();
      $rp_sno=$_SESSION['LOANPREFIX'].($res_sno->KEYVALUE+1);
      
      $rp_date=date_format(date_create($this->input->post('add_repledge_date')),'Y-m-d');
      $rp_company=$this->input->post('company');
      $rp_type=$this->input->post('type');

      
      if($rp_type=='Y')
      {
          $mx_sno=$this->db->query("select TOP 1 RP_BILLNO from REPLEDGE_MASTER where MIXED='Y' order by ENDATE desc, RP_BILLNO desc")->row();
          $sp=explode('-',$mx_sno->RP_BILLNO);
          $sp1=explode('/',$sp[1]);
          $rp_bill_no='MX-'.($sp1[0]+1).'/'.date('y');
      }
      else
      {
        $rp_bill_no=$this->input->post('indivalbillnumber');
      }

      $rp_bank_name=$this->input->post('bank_name');
      $rp_bank_no=$this->input->post('bank_no');

      
      $rp_tot_cnt=$this->input->post('txt_total_pl_count');
      $rp_tot_weight=$this->input->post('txt_total_pl_weight');
      $rp_tot_amt=$this->input->post('txt_total_pl_loan_amount');

      $rp_amt=$this->input->post('add_amount_repledge');
      $rp_other=$this->input->post('add_others_repledge');
      $rp_appr=$this->input->post('add_apprchrge_repledge');

      $rp_int_per=$this->input->post('add_intpercentage_repledge');
      $rp_month=$this->input->post('add_months_repledge');
      $rp_iter_month=$this->input->post('add_iterationmonths_repledge');
      $rp_pl_int=$this->input->post('add_plusinterest_repledge');
      $rp_desc=$this->input->post('description');

      $rp_net_amt=$rp_amt + $rp_other + $rp_appr;
      
      $rp_pl_id=$this->input->post('pl_id');

      $subcnt=count((array)$rp_pl_id);
      for($i=0;$i<$subcnt;$i++)
      { 

        $pledge_det=$this->db->query("select * from PLEDGEINFO where PLEDGE_ID in(".$rp_pl_id[$i].")")->result_array();
        $j=0;$pledge_item=$pledge_id='';
        $pl_qty=$pl_weight=0;
        foreach($pledge_det as $plist)
        {

          $party_det=$this->db->query("select NAME,BILLNO, ENDATE,AMOUNT from LOANS where BILLNO='".$plist['BILLNO']."'")->row();
          $p_name=$party_det->NAME;
          $p_billno=$party_det->BILLNO;
          $p_date=$party_det->ENDATE;
          $p_amt=$party_det->AMOUNT;


              if($j==0)
              {
                  $pledge_item=$plist['PLEDGENAME'];
                  $pledge_no=$plist['PNO'];
              }
              else
              {
                  $pledge_item=$pledge_item.",".$plist['PLEDGENAME'];
                  $pledge_no=$pledge_no.",".$plist['PNO'];
              }
              
              $pl_qty+=$plist['QTY'];
              $pl_weight+=$plist['WEIGHT'];
              // $i++;

          $j++;
        }
       
        

        $rp_det= $this->db->query("INSERT INTO REPLEDGE_DETAILS(RP_SNO,BANKNO,RP_BILLNO,ENDATE,BILLNO,PARTYNAME,LOANDATE,PLEDGES,QTY,WEIGHT,LOANAMOUNT,PLEDGENOS,BANK,AMOUNT,INTEREST,MONTHS,STAFF) VALUES ('".$rp_sno."','".$rp_bank_no."','".$rp_bill_no."','".date('Y-m-d')."','".$p_billno."','".$p_name."','".$p_date."','".$pledge_item."','".$pl_qty."','".$pl_weight."','".$p_amt."','".$pledge_no."','".$rp_bank_name."','".$rp_amt."','".$rp_int_per."','".$rp_month."','".$_SESSION['LOANPREFIX']."')");
          save_query_in_log();

         

          $upd_sts=$this->db->query("UPDATE LOANS set STATUS='BANK',LOAN_STATUS='8' where BILLNO='".$p_billno."'" );
          save_query_in_log();

           
      }

        //print_r($rp_net_amt);
          $res=$this->db->query("INSERT INTO REPLEDGE_MASTER(RP_SNO,BANKNO,RP_BILLNO,ENDATE,NETWEIGHT,NETQTY,NETLOANAMOUNT,BANK,AMOUNT,OTHERS,APP_CHARGE,NETAMOUNT,RECEIVED_CASH,INTEREST,MONTHS,STAFF,ACTIVE,REN_FROM_RPNO,ADDED_USER,ADDED_TIME,COMPANYCODE,MIXED,ITERATION,PLUSINT,CHK_VERIFIED,VOUCHER_SNO,DESCRIPTION) VALUES ('".$rp_sno."','".$rp_bank_no."','".$rp_bill_no."','".$rp_date."','".$rp_tot_weight."','".$rp_tot_cnt."','".$rp_tot_amt."','".$rp_bank_name."','".$rp_amt."','".$rp_other."','".$rp_appr."','".$rp_net_amt."','".$rp_net_amt."','".$rp_int_per."','".$rp_month."','".$_SESSION['username']."','Y','', '".$_SESSION['username']."','".date('Y-m-d H:i:s')."','".$rp_company."','".$rp_type."','".$rp_iter_month."','".$rp_pl_int."','Y','','".$rp_desc."')");
            save_query_in_log();

            

            $upd=$this->db->query("UPDATE PLEDGEINFO set STATUS='BANK' WHERE BILLNO='".$p_billno."'");
           save_query_in_log();

            

            $upd=$this->db->query("UPDATE KEYMASTER set KEYVALUE=KEYVALUE+1 WHERE KEYNAME='REPLEDGE-".$_SESSION['LOANPREFIX']."'");
            save_query_in_log();
            redirect('repledge');

    }
   
    
    //R.babu
    public function repledge_add()
    {
        $data['company_list'] =  $this->Repledge_model->get_company_list();
        $data['bank_list'] =  $this->Repledge_model->get_bank_list();
        $this->load->view('repledge/repledge_add',$data);
    }

    public function bankmaster()
    {

      $data['bankdetails'] = $this->Repledge_model->getbankdetails();
      //print_r($data);exit;
      $this->load->view('repledge/bankmaster',$data);
    }
    
    public function checkbanknameprecentage()
    {
        $banknameval = $_POST['bankname'];
        $bankdetails = $this->Repledge_model->getbankdetailscheck($banknameval);
        $bankdetails1 = $this->Repledge_model->getfinalbankdetails($banknameval);
        //print_r($bankdetails1);exit;
        $bankmonths =$bankdetails1[0]['bankmonths'];
        $bankplusintmonth = $bankdetails1[0]['bankplusintmonth'];
        $bankplusint = $bankdetails1[0]['bankplusint'];
        $option = '<option value="">Select Precentage</option>';
        foreach($bankdetails as $banklist)
        {
            $option.='<option value="'.$banklist['bank_Precentage'].'">'.$banklist['bank_Precentage'].'</option>';
        }
        echo ''.'||'.$option.'||'.$bankmonths.'||'.$bankplusintmonth.'||'.$bankplusint;  
    }
    public function bankdatasave()
    {
      $bankprecentage = explode(',',$_POST['bankprecentage']);


      $bankname         = $this->input->post('bankname');
      $bankbranch       = $this->input->post('bankbranch');
      $banknameaddress  = $this->input->post('bankaddress');
      $bankmonths       = $this->input->post('bankmonths');
      $bankplusintmonth = $this->input->post('bankplusintmonth');
      $bankplusint      = $this->input->post('bankplusint');
      $createdDate      = date('Y-m-d H:i:s');
      $isactiveval      = '1';
    
     // print_r($bankprecentage);exit;
      foreach($bankprecentage as $value)
      {

       // print_r($value);exit;
           $insertbank = $this->db->query("INSERT INTO SUB_REPLEDGE_BANKDETAILS(bank_Name,bank_Precentage,isActive,createdBy,createdDate,modifiedBy,modifiedDate) VALUES ('".$bankname."','".$value."','".$isactiveval."','','".$createdDate."','','')");
         
      }
       
      $insertbank = $this->db->query("INSERT INTO REPLEDGE_BANKDETAILS(bank_Name,bank_Branch,bank_Address,bankmonths,bankplusintmonth,bankplusint,isActive,createdBy,createdDate,modifiedBy,modifiedDate) VALUES ('".$bankname."','".$bankbranch."','".$banknameaddress."','".$bankmonths."','".$bankplusintmonth."','".$bankplusint."','".$isactiveval."','','".$createdDate."','','')
        ");

        if($insertbank!="")
        {
          $data['return_code'] ='0';
          $data['success_msg'] ='success';
          $data['insertdata']  ='Bank Insert successfully.';
           
        }
        else
        {
          $data['return_code'] ='1';
          $data['error_msg'] ='error';
          $data['insertdata']  ='Bank Insert Not successfully.please check';
            
        }
        echo json_encode($data);
    }
    public function repledge_pledge_list()
    {
        $billno=$this->input->post("bno");

        $bill_no=str_replace("_", "/", $billno);
       
        $repledgedata =$this->db->query("SELECT * FROM REPLEDGE_MASTER where RP_BILLNO='".$bill_no."'")->result_array();
      
        $data['loan_details'] = $this->db->query("SELECT * from LOANS where BILLNO='".$bill_no."' AND STATUS!='BANK' AND LOAN_STATUS NOT IN ('8','12','16','17') AND JEWEL_TYPE='GOLD'")->result_array();

        if(count((array)$repledgedata)>0)
        {
            $status = 1;
            echo json_encode($status);
        }
        else
        {
            if(count((array)$data['loan_details'])>0)
            {
                $data['pledge_details']=$this->db->query("SELECT * from PLEDGEINFO where BILLNO='".$data['loan_details'][0]['BILLNO']."'")->result_array();
               
                if(count((array)$data['pledge_details'])>0)
                {
                    $this->load->view('repledge/pledge_select',$data);  
                }
                else
                {
                    $status = 2;
                    echo json_encode($status);
                }
            }
            else
            {
                $status = 0;
                echo json_encode($status);
            }
        }
        
    }

    public function push_selected_pledge()
    {
        // Script submission values start
          // $sel_ple_chk=$this->input->post("pledge_checked");
          // print_r (count((array)$sel_ple_chk));
          // $cnt=$this->input->post("pledge_count");
          // $cnt=count((array)$sel_ple_chk);
          // $str='';
          // for ($i=0;$i<$cnt;$i++)
          // {
              // if($sel_ple_chk[$i]=="on")
              // {
                  // if($str=='')
                  // {
                  //     $str=$sel_ple_chk[$i];
                  // }
                  // else
                  // {
                  //     $str.=','.$sel_ple_chk[$i];
                  // }
              // }
          // }
        // Script submission values end

          $pl_id_str=$this->input->post('pl_id');
          $cnt=$this->input->post('r_cnt');
          $pledge_list=$this->db->query("select l.JEWEL_TYPE,l.AMOUNT,c.COMPANYNAME,p.* from  PLEDGEINFO p,LOANS L, COMPANY c where p.BILLNO=l.BILLNO and l.COMPANYCODE=c.COMPANYCODE and PLEDGE_ID IN(".$pl_id_str.")")->result_array();
          $pledge_item='';
          $pl_qty=0; 
          $pl_weight=0; $i=0;

          foreach($pledge_list as $plist)
          {
              $bill_no=$plist['BILLNO'];
              $company=$plist['COMPANYNAME'];
              $loan_amt=$plist['AMOUNT'];
              $jewel_type=$plist['JEWEL_TYPE'];
              if($i==0)
              {
                  $pledge_item=$plist['PLEDGENAME'];
                  $pledge_id=$plist['PLEDGE_ID'];
              }
              else
              {
                  $pledge_item=$pledge_item.",".$plist['PLEDGENAME'];
                  $pledge_id=$pledge_id.",".$plist['PLEDGE_ID'];
              }
              
              $pl_qty+=$plist['QTY'];
              $pl_weight+=$plist['WEIGHT'];
              $i++;
          }
        $pl_tbody='<tr class="rowcount"><td id="td_bill_no'.$cnt.'">'.$bill_no.'</td><input type="hidden" name="cnt" id="cnt" value='.$cnt.'><input type="hidden" id="bill_noval" name="bill_noval" value=""><td class="ple1"  id="td_company'.$cnt.'">'.$company.'</td> <td class="ple1"  id="td_jewel_type'.$cnt.'">'.$jewel_type.'</td> <td class="ple1"  id="td_pledge_item'.$cnt.'">'.$pledge_item.'</td><input type="hidden" name="pl_id[]" id="pl_id'.$cnt.'" value="'.$pledge_id.'"> <td  id="td_pl_qty'.$cnt.'">'.$pl_qty.'</td> <td  id="td_pl_weight'.$cnt.'">'.$pl_weight.'</td> <td  id="td_loan_amt'.$cnt.'">'.$loan_amt.'</td> <td><a href="#" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm remove" ><i class="fas fa-trash fs-4"></i></a> </td></tr>';
        echo $pl_tbody;
    }
    public function repledge_view($bill_no)
    {
      //print_r($bill_no);exit;
        $billno=str_replace('_', '/', $bill_no);
        $data['repledge_master']=$this->db->query("SELECT * from REPLEDGE_MASTER where RP_BILLNO='".$billno."'")->row();
        $data['repledge_details']= $this->db->query("SELECT * from REPLEDGE_DETAILS where RP_BILLNO='".$billno."'")->result_array();
        //echo "<pre>";
      //  print_r($data);
       // echo "</pre>";exit;
        $this->load->view('repledge/repledge_view',$data);
    }
    public function load_pledge_list()
    {
        $bno=$this->input->post('bno');
        $rp_bill_no=$this->input->post('rp_no');
        $bill_no=str_replace('_', '/', $bno);
        $data['repledge_master']=$this->db->query("select * from REPLEDGE_MASTER where RP_BILLNO='".$rp_bill_no."'")->row();
        $data['loan_details']=$this->db->query("select * from LOANS where BILLNO='".$bill_no."'")->row();
        $data['pledge_info']=$this->db->query("select * from PLEDGEINFO where BILLNO='".$bill_no."'")->result_array();
        $this->load->view('repledge/load_repledge_pledge_list',$data);
    }
    public function repledge_return()
    {
       //Get Session Value
       $ccode = $_SESSION['COMPANYCODE'];
       $name = $_SESSION['username'];

       //Get Current Date Value
       $currentdate  = date("Y-m-d");

       //Page,limit,offset,pagelimit declare
       $page       = isset($_GET['page']) ? $_GET['page'] : 1;
       $limit      = 25;
       $offset     = ($page - 1) * $limit +1;
       $page_limit = $offset+$limit-1;

       //Get Post value in form
       $filterbillno = isset($_POST['filterbillno']) ? $_POST['filterbillno'] : "";
       $dt_fill_loan_list = isset($_POST['dt_fill_loan_list']) ? $_POST['dt_fill_loan_list'] : "";
       $companyname = isset($_POST['company_filter']) ? $_POST['company_filter'] : "";
       $billnofillter = isset($_POST['filterbillno']) ? $_POST['filterbillno'] : "";
       $receipttype = isset($_POST['receipttypefilter']) ? $_POST['receipttypefilter'] : "";
       $banknamefillter = isset($_POST['banknamefilter']) ? $_POST['banknamefilter'] : "";
       $banknumberfilter = isset($_POST['banknumberfilter']) ? $_POST['banknumberfilter'] : "";
       $fromdate = isset($_POST['from_date_fillter_loan_list']) ? $_POST['from_date_fillter_loan_list'] : "";
       $todate = isset($_POST['to_date_fillter_loan_list']) ? $_POST['to_date_fillter_loan_list'] : "";

      // print_r($dt_fill_loan_list);exit;
       //Assign fromdate & Todate
       $fromdatechange = $fromdate;
       $todatechange = $todate;

       //chanage date formate
       $finalfromdate = date("Y-m-d", strtotime($fromdatechange));
       $finaltodate = date("Y-m-d", strtotime($todatechange));

      $weekday =  date('Y-m-d', strtotime("this week"));
      $monthday =  date('Y-m-d', strtotime(date('Y-m-1')));;
      //print_r($monthday);exit;

       if($companyname=='all' || $companyname=='')
       {
         $cmp= "";  
       }
       else
       {
         $cmp= " and c.COMPANYCODE='".$companyname."'";  
       }

       if($dt_fill_loan_list =='')
       {
           $sdate = "a.ADDED_TIME>='".$currentdate."'";
           $edate = "";
           $sodr = ' ORDER BY a.ADDED_TIME DESC';
       }
       else if($dt_fill_loan_list =='all')
       {

           //Sql Query Formate in Assign Variable
           $sdate = "a.ADDED_TIME>='".$currentdate."'";
           $edate = "";
           $sodr = ' ORDER BY a.ADDED_TIME DESC';
       }
       else if($dt_fill_loan_list =='today')
       {
           $sdate = "a.ADDED_TIME>='".$currentdate."'";
           $edate = "";
           $sodr = ' ORDER BY a.ADDED_TIME DESC';
       }
       else if($dt_fill_loan_list =='week')
       {
           $sdate = "a.ADDED_TIME>='".$weekday."'";
           $edate = " AND a.ADDED_TIME<='".$currentdate."'";
           $sodr = ' ORDER BY a.ADDED_TIME DESC';
       }
       else if($dt_fill_loan_list =='monthly')
       {
           $sdate = "a.ADDED_TIME>='".$monthday."'";
           $edate = " AND a.ADDED_TIME<='".$currentdate."'";
           $sodr = ' ORDER BY a.ADDED_TIME DESC';
       }
       else
       {
           //Sql Query Formate in Assign Variable
           $sdate = "a.ADDED_TIME>='".$finalfromdate."'";
           $edate = " AND a.ADDED_TIME<='".$finaltodate."'";
           $sodr = ' ORDER BY a.ADDED_TIME DESC';
       }


      $data['repledge_returndata'] = $this->Repledge_model->get_return_list($sdate,$edate,$sodr,$cmp);
      //print_r($data);exit;
      $this->load->view('repledge/repledge_return',$data);

    }
    public function rp_return_add()
    {
      $this->load->view('repledge/rp_return_add');

    }
    public function rp_return_view($rbno)
    {
      $returnnoval=str_replace('_', '/', $rbno);
      $loan_data = $this->Repledge_model->get_returnloan_data($returnnoval);
      $repledgereturn_data = $this->Repledge_model->get_returnval_data($returnnoval); 
      $repledgereturn_pledgedata = $this->Repledge_model->get_returnrepledge_data($returnnoval);

      $data['returnloan_data']     = $loan_data;
      $data['repledgereturn_data'] = $repledgereturn_data;
      $data['repledgereturn_pledgedata'] = $repledgereturn_pledgedata;

      //echo "<pre>";
       //print_r($data);
      //echo "</pre>";exit;

      $this->load->view('repledge/rp_return_view',$data);
    }
    public function loanList()
    {
       $search =  $_GET['query']; 
       $loan_data = $this->Repledge_model->getLoan($search);
       //print_r($loan_data );exit;
       $res='[';
        if(count($loan_data)>0) {
          foreach($loan_data as $row )
          {
              $title='';
              $name='';
              $BILLNO=$row->BILLNO;
              
              
              $title=$BILLNO;
              $res.='{ "title":"'.$title.'","BILLNO": "'.$BILLNO.'"},';
 
          }
          $res=rtrim($res,',');
          $res.=']';
        }
        else{
          $res.=']';
        }
        print_r($res);die();

    }
    public function getreceiptrbbillno()
    {
        $search =  $_GET['query']; 
        $receipt_data = $this->Repledge_model->getreceiptrbbillno($search);
        //print_r($loan_data );exit;
        $res='[';
        if(count($receipt_data)>0) 
        {
          foreach($receipt_data as $row )
          {
              $title='';
              $name='';
              $BILLNO=$row->BILLNO;
              
              
              $title=$BILLNO;
              $res.='{ "title":"'.$title.'","BILLNO": "'.$BILLNO.'"},';
 
          }
          $res=rtrim($res,',');
          $res.=']';
        }
        else
        {
          $res.=']';
        }
        print_r($res);die();
    }
    public function getreceiptdetailsshow()
    {
        $dataa =[];
        $billnovall = $_POST['billnovall'];
        $receiptpledgedata= $this->Repledge_model->get_viewreceiptrepledge_data($billnovall);
        $dataa['return_code']   = 0;
        $dataa['success_msg']   = 'success';
        $dataa['receiptpledgedata']   = $receiptpledgedata;
        //print_r($data);exit;
        echo json_encode($dataa);
    }
    public function getrepledgereturn_data()
    {

        $RBbillno = $_POST['impbillno'];
       
        //$repledgereturn_data = $this->Repledge_model->get_repledgereturn_data($RBbillno);
        $repledgereturn_data = $this->Repledge_model->get_repledgereturn_data($RBbillno);

   
        $loan_data = $this->Repledge_model->get_returnloan_data($RBbillno);

        if($loan_data)
        {
            $date=date_create($loan_data[0]['ADDED_TIME']);
         
             $endate = date_format($date,"Y-m-d ");
             $sd     = $endate.' '.'00:00:00';
             $e      = date("Y-m-d");
             $ed     = $e.' '.'00:00:00';

             $start  = new DateTime($sd);
             $end    = new DateTime($ed);
             $diff   = $start->diff($end);

             $yearsInMonths = $diff->format('%r%y') * 12;
             $months        = $diff->format('%r%m');
             $days          = $diff->format('%r%d');
             $totalMonths   = $yearsInMonths + $months;
             $months1       = $totalMonths;
             $days1         = $days;

            $data['return_code']   = 0;
            $data['success_msg']   = 'success';
            $data['returnloan_data']     =$loan_data;
            $data['repledgereturn_data'] =  $repledgereturn_data;
            $data['days1'] = $days1;
            $data['months'] = $months1;
        }
        else
        {
            $data['return_code']   = 1;
            $data['error_msg']   = 'error';
        }
        

      
        //echo "<pre>";
       // print_r($data);
        //echo "</pre>";exit;
        echo json_encode($data);
    }
    public function saverepledgereturn()
    {
      $billnumberval = isset($_POST['billnumberval']) ? $_POST['billnumberval'] : "";
      $selectcompany = isset($_POST['selectcompany'])? $_POST['selectcompany'] : "";
      $cl_type = isset($_POST['cl_type']) ? $_POST['cl_type'] : "";
      $loandateval = isset($_POST['loandateval']) ? $_POST['loandateval'] : "";
      $intrestvalue = isset($_POST['intrestvalue']) ? $_POST['intrestvalue'] : "";
      $monthval = isset($_POST['monthval']) ? $_POST['monthval'] : "" ;
      $loanamtvalue = isset($_POST['loanamtvalue']) ? $_POST['loanamtvalue'] : "";
      $banknameval = isset($_POST['banknameval']) ? $_POST['banknameval'] : "";
      $banknoval = isset($_POST['banknoval']) ? $_POST['banknoval'] : "";
      $iterationval = isset($_POST['iterationval']) ? $_POST['iterationval'] : "";
      $plusintrestval = isset($_POST['plusintrestval']) ? $_POST['plusintrestval'] :"";
      $staffnameval = isset($_POST['staffnameval']) ? $_POST['staffnameval'] : "";
      $calmonth =  isset($_POST['calmonth']) ? $_POST['calmonth'] : "";
      $caltotdays =  isset($_POST['caltotdays']) ? $_POST['caltotdays'] : "";
      $caltotamt =  isset($_POST['caltotamt']) ? $_POST['caltotamt'] : "";
      $calpaidamt = isset($_POST['calpaidamt']) ? $_POST['calpaidamt'] : "";
      $calintrestamt = isset($_POST['calintrestamt']) ? $_POST['calintrestamt'] : "";
      $calintrestamttot = isset($_POST['calintrestamttot']) ? $_POST['calintrestamttot'] : "";
      $caltotal = isset($_POST['caltotal']) ? $_POST['caltotal'] : "";
      $calbalanceamt = isset($_POST['calbalanceamt']) ? $_POST['calbalanceamt'] : "";
      $loanfinaltot = isset($_POST['loanfinaltot']) ? $_POST['loanfinaltot'] : "";
      $totalothers = isset($_POST['totalothers']) ? $_POST['totalothers'] : "";
      $totaldiscount = isset($_POST['totaldiscount']) ? $_POST['totaldiscount'] : "";
      $calnetpayamt = isset($_POST['calnetpayamt']) ? $_POST['calnetpayamt'] : "";
      $cashamtval =isset($_POST['cashamtval']) ? $_POST['cashamtval'] : "";
      $totalqty = isset($_POST['totalqty']) ? $_POST['totalqty'] : "";
      $totalweight =  isset($_POST['totalweight']) ? $_POST['totalweight'] : "";
      $totalamtval =  isset($_POST['totalamtval']) ? $_POST['totalamtval'] : "";
      $rp_sno =  isset($_POST['rp_sno']) ? $_POST['rp_sno'] : "";
      $mixed =  isset($_POST['mixed']) ? $_POST['mixed'] : "";
      $voucherno =  isset($_POST['voucherno']) ? $_POST['voucherno'] : "";

      
      $returndatainsert = $this->db->query("INSERT INTO REPLEDGE_RETURN(RP_SNO,RP_BILLNO,BANKNO,BANK,RETURN_DATE,TOTAL_DAYS,LOANAMOUNT,PAIDAMOUNT,LOANBALANCE,INTEREST,OTHERS,DISCOUNT,NETPAY,PAID_CASH,NEW_RP_BILLNO,CLOSING_TYPE,ADDED_USER,ADDED_TIME,MIXED,CHK_VERIFIED,VERIFIED_USER,VOUCHER_SNO) VALUES ('".$rp_sno."','".$billnumberval."','".$banknoval."','".$banknameval."','".$loandateval."','".$caltotdays."','".$loanamtvalue."','".$calpaidamt."','".$calbalanceamt."','".$calintrestamt."','".$totalothers."','".$totaldiscount."','".$calnetpayamt."','".$cashamtval."','".$billnumberval."','".$cl_type."','".$staffnameval."','".date('Y-m-d H:i:s')."','".$mixed."','Y','".$staffnameval."','". $voucherno."')");
      save_query_in_log();

      if(!empty($returndatainsert))
      {
        $data['return_code']   = 0;
        $data['success_msg']   = 'success';   
      }
      else
      {
        $data['return_code']   = 1;
        $data['error_msg']   = 'error';
      }
      echo json_encode($data);
    }
   
}
?>