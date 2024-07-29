<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/* ************************************************************************************
		Purpose : To handle all Receipt functions 2022-09-28
***************************************************************************************/
class Receipt extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model(array("Receipt_model","Accountsgroup_model"));
    	$this->load->library('user_agent');
        $fin_year=$this->Accountsgroup_model->get_fin_years_list();
        $db=substr($fin_year->DBNAME,0,strlen($fin_year->DBNAME)-4);
        //echo $db;exit;
        $config_app = switch_db_dynamic($db);
        
        $this->Receipt_model->other_db = $this->load->database($config_app,TRUE);
    	if (isset($this->session->userdata['username']) && $this->session->userdata['username'] == TRUE)
        {
            //do something
        }else{
            redirect('login'); //if session is not there, redirect to login page
        } 
		date_default_timezone_set("Asia/Kolkata");
    	$this->session->set_userdata('comtitle', 'Receipt');
	}
    /*--Working Code R.Babu Start---*/
    public function index()
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
        $page_limit=$offset+$limit-1;
        
        
        //Get Post value in form
        
        $filterbillno = isset($_POST['filterbillno']) ? $_POST['filterbillno'] : "";
        $dt_fill_loan_list = isset($_POST['dt_fill_loan_list']) ? $_POST['dt_fill_loan_list'] : "";
        $companyname = isset($_POST['company_filter']) ? $_POST['company_filter'] : "";
        $billnofillter = isset($_POST['filterbillno']) ? $_POST['filterbillno'] : "";
        $receipttype = isset($_POST['receipttypefilter']) ? $_POST['receipttypefilter'] : "";
        $banknamefillter = isset($_POST['banknamefilter']) ? $_POST['banknamefilter'] : "";
        $banknumberfilter = isset($_POST['banknumberfilter']) ? $_POST['banknumberfilter'] : "";
        $fromdate     = isset($_POST['from_date_fillter_loan_list']) ? $_POST['from_date_fillter_loan_list'] : "";
        $todate       = isset($_POST['to_date_fillter_loan_list']) ? $_POST['to_date_fillter_loan_list'] : "";

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
            $sdate = "RECEIPT_DATE>='".$currentdate."'";
            $edate = "";
            $sodr = ' ORDER BY RECEIPT_DATE DESC';
        }
        else if($dt_fill_loan_list =='all')
        {

            //Sql Query Formate in Assign Variable
            $sdate = "RECEIPT_DATE>='".$currentdate."'";
            $edate = "";
            $sodr = ' ORDER BY RECEIPT_DATE DESC';
        }
        else if($dt_fill_loan_list =='today')
        {
            $sdate = "RECEIPT_DATE>='".$currentdate."'";
            $edate = "";
            $sodr = ' ORDER BY RECEIPT_DATE DESC';
        }
        else if($dt_fill_loan_list =='week')
        {
            $sdate = "RECEIPT_DATE>='".$weekday."'";
            $edate = " AND RECEIPT_DATE<='".$currentdate."'";
            $sodr = ' ORDER BY RECEIPT_DATE DESC';
        }
        else if($dt_fill_loan_list =='monthly')
        {
            $sdate = "RECEIPT_DATE>='".$monthday."'";
            $edate = " AND RECEIPT_DATE<='".$currentdate."'";
            $sodr = ' ORDER BY RECEIPT_DATE DESC';
        }
        else
        {
            //Sql Query Formate in Assign Variable
            $sdate = "RECEIPT_DATE>='".$finalfromdate."'";
            $edate = " AND RECEIPT_DATE<='".$finaltodate."'";
            $sodr = ' ORDER BY RECEIPT_DATE DESC';
        }



        //Key Master value get in Model and generate key value
        $keymaster = $this->Receipt_model->get_receipt_key_value($_SESSION['LOANPREFIX']);
        $keval = $keymaster->KEYVALUE;
       
        $data['detail_sno'] = $_SESSION['LOANPREFIX'].($keval+1);
        $akeymaster = $this->Receipt_model->get_account_receipt_key_value($_SESSION['LOANPREFIX']);
        $akeval = $akeymaster->KEYVALUE;
        $data['sno'] = $_SESSION['LOANPREFIX'].($akeval+1);
     
       // print_r($cmp);exit;
        //Receipt Entry Data List
        $data['receipt_list'] = $this->Receipt_model->get_receipt_list($sdate,$edate,$sodr,$cmp);
        $this->load->view('receipt/receipt_list',$data);
    }
    /*--Working Code R.Babu Start---*/
    
    public function savereceiptrepledge()
    {
        $rbbillno = $_POST['rbbillno'];
        $kt_daterangepicker_repledge_add_date = $_POST['kt_daterangepicker_repledge_add_date'];
       
        $selectcompany  = $_POST['selectcompany'];
        $companynameval = $_POST['companynameval'];
        $loanamtvalue   = $_POST['loanamtvalue'];
        $intrestvalue   = $_POST['intrestvalue'];
        $monthvalue     = $_POST['monthvalue'];
        $banknameval    = $_POST['banknameval'];
        $banknoval      = $_POST['banknoval'];
        $paidamtval     = $_POST['paidamtval'];
        $staffnameval   = $_POST['staffnameval'];
        $principalamt   = $_POST['principalamt'];
        $interstamtval  = $_POST['interstamtval'];
        $finaltotalval  = $_POST['finaltotalval'];
        $totalamtvalue  = $_POST['totalamtvalue'];
        $totalweightval = $_POST['totalweightval'];
        $isactive       = $_POST['isactive'];

        $myDateTime     = DateTime::createFromFormat('d-m-Y', $kt_daterangepicker_repledge_add_date);
        $receiptdate    = $myDateTime->format('Y-m-d H:i:s');
        //print_r($receiptdate);exit;

        $getbillno=$this->db->query("SELECT BILLNO from REPLEDGE_DETAILS where RP_BILLNO='".$rbbillno."'")->row();
        $Loan_det=$this->db->query("SELECT a.*,d.RP_BILLNO,c.COMPANYNAME FROM LOANS a 
        left join REPLEDGE_DETAILS d on d.BILLNO = a.BILLNO 
        left join COMPANY c on c.COMPANYCODE =a.COMPANYCODE  WHERE a.BILLNO ='".$getbillno->BILLNO."'")->row();

        //echo "<pre>";
        //print_r($Loan_det);
        //echo "</pre>";exit;
        
        if(!empty($Loan_det))
        {
            $repledgebillno = $Loan_det->RP_BILLNO;

            $alreadyreceipt = $this->Receipt_model->getcheckreceiptdetails($rbbillno);
          
            if($alreadyreceipt !="")
            {
                foreach($alreadyreceipt as $alreadyval)
                {
                    $update =  $this->db->query("UPDATE RECEIPT_MASTER SET LAST_UPDATE_STATUS = '0' WHERE BILLNO ='".$rbbillno."'"); 
                }
            }
            
            $amtvalue = $finaltotalval;
            $amtvalue += floatval($alreadyreceipt ? $alreadyreceipt[0]['PAID_TOTAL'] : 0.000);
           
            $finalamtvaluee =  number_format($amtvalue, 2, '.', '');
            //print_r($finalamtvaluee);exit;

            $repledge_data = $this->Receipt_model->get_repledgemaster_data($repledgebillno);
           
            if($repledge_data[0]['MIXED'] =='Y')
            {
                $RECEIPT_TYPE = 'Mixed';
            }
            else
            {
                $RECEIPT_TYPE = 'Individual'; 
            }

            $date=date_create($receiptdate);
            $receiptdatefinal = date_format($date,"Y-m-d H:i:s");

            $datereturn = date_create($repledge_data[0]['RETURN_DATE']);
            $returndatefinal = date_format($datereturn,"Y-m-d H:i:s");

            $dateaddedtime = date_create($repledge_data[0]['ADDED_TIME']);
            $addeddatefinal = date_format($dateaddedtime,"Y-m-d H:i:s");


            if($RECEIPT_TYPE='Individual')
            {
                    $receiptType = '1';
            }
            else
            {
                    $receiptType = '0';
            }

            $receipt_data = $this->Receipt_model->get_receiptmaster_data();
            //print_r($receipt_data);exit; 
            if($receipt_data=="")
            {
                $receiptno = $repledge_data[0]['RP_SNO'];
                  
            }
            else
            {
                $datafinal = $this->Receipt_model->get_account_receipt_key_value($_SESSION['LOANPREFIX']);

                $keyvalue = $datafinal->KEYVALUE+1;

                $txtReceiptNo = $_SESSION['LOANPREFIX'].($keyvalue);
               
                $receiptno = $txtReceiptNo;
                $updatekey = $this->Receipt_model->updatereceiptkeymaster($keyvalue,$datafinal->KEYNAME); 
            }
           // print_r('babu'.$receiptno);exit; 
            $receipt_data= $this->db->query("INSERT INTO RECEIPT_MASTER(RECEIPT_SNO,BILLNO,RECEIPT_DATE,CALC_PRINCIPAL,CALC_INTEREST,TOTAL,PAID_TOTAL,TOTALPAY,MAINTAINCHARGE,NOTICECHARGE,FORMCHARGE,HL_AMOUNT,DISCOUNT,NETPAYABLE,PAIDAMOUNT,INT_AMOUNT,PRINCIPAL,BALANCE,LOAN_BALANCE,CHK_OD,CHK_REVISED,REVISED_DATE,REVISED_AMOUNT,REVISED_INT,ROWNO,RECEIPT_TYPE,ATTENDED_USER,ADDED_USER,ADDED_TIME,CHK_VERIFIED,VERIFIED_USER,PREV_ROWNO,VOUCHER_SNO,HL_TRANS_SNO,CHK_RETURN_REMAINDER,TYPE_OF_REC,DEDUCT_MEM_CARD,ADD_MEM_POINTS,CREATEDDATE,LAST_UPDATE_STATUS,isActive) VALUES ('".$receiptno."','".$rbbillno."','".$receiptdatefinal."','".$principalamt."','".$interstamtval."','".$loanamtvalue."','".$finalamtvaluee."','".$finalamtvaluee."','0','0','0','0','0','".$finalamtvaluee."','".$finalamtvaluee."','".$interstamtval."','".$principalamt."','0','0','0','0','".$returndatefinal."','".$repledge_data[0]['RECEIVED_CASH']."','".$repledge_data[0]['INTEREST']."','','".$receiptType."','','".$repledge_data[0]['ADDED_USER']."','".$addeddatefinal."','".$repledge_data[0]['CHK_VERIFIED']."','".$repledge_data[0]['VERIFIED_USER']."','0','".$repledge_data[0]['VOUCHER_SNO']."','0','0','0','0','0','".date('Y-m-d H:i:s')."','1','".$isactive."')");
             save_query_in_log();
             
            if($receipt_data)
            {
                $data['return_code']   = 0;
                $data['success_msg']   = 'success';  
            }
            else
            {
                $data['return_code']   = 1;
                $data['success_msg']   = 'success';  
            }
           
        }
        else
        {

            $data['return_code']   = 1;
            $data['error_msg']     = 'error';
            $data['repledge_data'] = 'NULL';
        }
       //print_r($data);exit;
        echo json_encode($data);
    }
    public function getrepledgereceiptdata()
    {
        $billNo = $_POST['billno']; 
        $repledge_data = $this->Receipt_model->get_repledge_data($billNo); 

        if(!empty($repledge_data))
        {
            $repledgedata =array();
            $repledgedata = $repledge_data;
            
            foreach($repledgedata as $repledgevalue)
            {
                $loan_data = $this->Receipt_model->get_loan_data($repledgevalue['RP_BILLNO']);               
            }
            $repledgereceiptdata = $this->Receipt_model->get_repledgereceipt_data($billNo);
            if(!empty($repledgereceiptdata))
            {

                $receiptdata = $repledgereceiptdata;
            }
            else{

                $receiptdata = "";
            }

            $repledgetotalpayamt = $this->Receipt_model->get_repledgepayamt_data($billNo);

         
            //print_r($repledgereceiptdata);exit;  
            $data['return_code']   = 0;
            $data['success_msg']   = 'success';
            $data['loan_data']     = $loan_data;
            $data['repledge_data'] = $repledge_data;
            $data['repledgereceiptdata'] = $receiptdata;
            $data['repledgetotalpayamt'] = $repledgetotalpayamt;

        }
        else
        {

            $data['return_code']   = 1;
            $data['error_msg']     = 'error';
            $data['repledge_data'] = 'NULL';
        }
        //print_r($data);exit;
        echo json_encode($data);
    }
    public function getrbbillno(){

        $search =  $_GET['query']; 
        $RBbill_data = $this->Receipt_model->getrbbillno($search);
       // print_r($RBbill_data);exit;
        $res='[';
         if(count($RBbill_data)>0) {
           foreach($RBbill_data as $row)
           {
               $title='';
               $name='';
               $BILLNO=$row->RP_BILLNO;
               
               
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
    public function rp_receipts_view($receiptno)
    {
        $receiptnoval=str_replace('_', '/', $receiptno);
        $receipt_data = $this->Receipt_model->get_receiptdata($receiptnoval);
       // print_r($receipt_data);exit;
      
        $repledge_data = $this->Receipt_model->get_receipt_repledge_data($receipt_data[0]['BILLNO']); 
         //print_r($repledge_data);exit;
        if(!empty($repledge_data))
        {
            $data['return_code']   = 0;
            $data['success_msg']   = 'success';
            $data['receipts'] = $receipt_data;
            $data['repledge'] = $repledge_data;
        }
        else
        {

            $data['return_code']   = 1;
            $data['error_msg']     = 'error';
            $data['receipts'] = '';
            $data['repledge'] = '';
        }
        $this->load->view('receipt/rp_receipts_view',$data);
    }
    public function load_pledge_list()
    {
        $bno=$this->input->post('bno');
        $rp_bill_no=$this->input->post('rp_no');
        $bill_no=str_replace('_', '/', $bno);
        $data['repledge_master']=$this->db->query("select * from REPLEDGE_MASTER where RP_BILLNO='".$rp_bill_no."'")->row();
        $data['loan_details']=$this->db->query("select * from LOANS where BILLNO='".$bill_no."'")->row();
        $data['pledge_info']=$this->db->query("select * from PLEDGEINFO where BILLNO='".$bill_no."'")->result_array();
        $this->load->view('receipt/load_repledge_pledge_list',$data);
    }
    public function getreceiptdetailsshow()
    {
        $dataa =[];
        $billnovall = $_POST['billnovall'];
        $receiptpledgedata= $this->Receipt_model->get_viewreceiptrepledge_data($billnovall);
        $dataa['return_code']   = 0;
        $dataa['success_msg']   = 'success';
        $dataa['receiptpledgedata']   = $receiptpledgedata;
        //print_r($data);exit;
        echo json_encode($dataa);
    }
    public function repledge_receiptadd()
    {
        $this->load->view('receipt/repledge_receipt_add');
    }

    public function get_receipt_ledger()
    {
        $search =  $_GET['query']; 
        $showparty =  $_GET['showparty']; 
        $rows = $this->Receipt_model->get_receipt_ledger($search,$showparty);
        //print_r($rows);exit;
        $res='[';
        if(count($rows)>0) {
          foreach($rows as $row )
          {
              $title='';
              $title = $row->LEDGER_NAME;
              $opbal = $row->OP_BALANCE.' '.$row->OP_SIDE;
              $res.='{ "title":"'.$title.'","id": "'.$row->LEDGER_SNO.'","opbal": "'.$opbal.'"},';
              
          }
          $res=rtrim($res,',');
          $res.=']';
        }
        else{
          $res.=']';
        }
        print_r($res);die();
    }

    public function get_receipt_paid_ledger()
    {
        $search =  $_GET['query']; 
        $rows = $this->Receipt_model->get_receipt_paid_ledger($search);
        //print_r($rows);exit;
        $res='[';
        if(count($rows)>0) {
          foreach($rows as $row )
          {
              $title='';
              $title = $row->LEDGER_NAME;
              $res.='{ "title":"'.$title.'","id": "'.$row->LEDGER_SNO.'"},';
              
          }
          $res=rtrim($res,',');
          $res.=']';
        }
        else{
          $res.=']';
        }
        print_r($res);die();
    }

    public function receipt_save()
    {
/*echo "<pre>";
        print_r($_POST);exit;*/
        $cdate = date('Y-m-d');
        $tdate = $data['ENDATE'] = $this->input->post('add_date_receipts');
        $data['VOUCHER_SNO'] = $this->input->post('sno');
        $vmsno = $data['VOUCHER_MASTER_SNO'] = $this->input->post('detail_sno');
        $data['VOUCHERTYPE'] = 'RECEIPT';

        $account_led_id = explode(",",implode(",",$this->input->post('account_led_id')));
        $add_amt_receipts = explode(",",implode(",",$this->input->post('add_amt_receipts')));

        $paledid = $data['paid_account_led_id'] = $this->input->post('paid_account_led_id');
        $amt = $data['add_tota_receipts'] = $this->input->post('add_tota_receipts');
        $data['description'] = $this->input->post('description');

        $pldetails = $this->Receipt_model->get_paid_ledger_details($paledid);
        $plgid = $pldetails->GROUP_ID;
        if($plgid == 7 || $plgid == 22)
        {
            $data['TRANSTYPE'] = 'CASH RCPT';
        }
        elseif($plgid==8)
        {
            $data['TRANSTYPE'] = 'BANK RCPT';
        }

        $this->Receipt_model->voucher_master_add($data);

        $subcount = count($this->input->post('account_led_id'));
        $s=1;for($i=0;$i<$subcount;$i++)
        {
            $data['ROWNO'] = $s;
            $data['LEDGER_SNO'] = $account_led_id[$i];
            $data['CREDIT'] = $add_amt_receipts[$i];
//print_r($data);exit;
            $this->Receipt_model->voucher_credit_details_add($data);
        $s++;}

        $data['ROWNO'] = $s;
        $this->Receipt_model->voucher_debit_details_add($data);

        //$this->Receipt_model->voucher_master_add($data);

        /*$kval = $this->input->post('keyval');
        $ukval = $kval+1;*/

        $kname = "ACC_RECEIPTS-".$_SESSION['LOANPREFIX'];
        $vmname = "VOUCHER_MASTER-".$_SESSION['LOANPREFIX'];

        $result = $this->Receipt_model->update_keymaster($kname,$ukval);
        $this->Receipt_model->update_voucher_master_keymaster($vmname);

        if($tdate == $cdate)
        {
            $log['log_date'] = date('Y-m-d H:i:s');
            $log['log_details'] = 'Receipt Voucher No : '.$vmsno.' Amount :'.$amt.' Added';
            $log['log_code'] = 'ACC_RECEIPT-ADD';
            $log['added_user'] = $_SESSION['username'];
            $this->Receipt_model->log_same_date_add($log);
        }
        else
        {
            $log['log_date'] = date('Y-m-d H:i:s');
            $log['log_details'] = 'Receipt Voucher No : '.$vmsno.' Amount :'.$amt.' Added';
            $log['log_code'] = 'ACC_RECEIPT-ADD';
            $log['added_user'] = $_SESSION['username'];
            $log['log_type'] = 'P';
            $this->Receipt_model->log_different_date_add($log);
        }

        if($result)
        {
            $this->session->set_flashdata('g_success', 'Receipt have been Added successfully...');
        }else{
           $this->session->set_flashdata('g_err', 'Could not add Receipt details!');
        }
        redirect('receipt');
    }

    public function receipt_edit()
    {
        $msno = $_POST['id'];

        $data['voucher_master_details'] = $this->Receipt_model->get_voucher_master_details($msno);
        $data['voucher_details'] = $this->Receipt_model->get_voucher_details($msno);
        $this->load->view('receipt/receipt_edit',$data);
    }

    public function receipt_update()
    {
/*echo "<pre>";
        print_r($_POST);exit;*/
        $data['ENDATE'] = $this->input->post('add_date_receipts');
        $data['VOUCHER_SNO'] = $this->input->post('sno');
        $vmsno = $data['VOUCHER_MASTER_SNO'] = $this->input->post('detail_sno');
        $data['VOUCHERTYPE'] = 'RECEIPT';

        $account_led_id = explode(",",implode(",",$this->input->post('account_led_id')));
        $add_amt_receipts = explode(",",implode(",",$this->input->post('add_amt_receipts')));

        $paledid = $data['paid_account_led_id'] = $this->input->post('paid_account_led_id');
        $amt = $data['add_tota_receipts'] = $this->input->post('add_tota_receipts');
        $data['description'] = $this->input->post('description');

        $pldetails = $this->Receipt_model->get_paid_ledger_details($paledid);
        $plgid = $pldetails->GROUP_ID;
        if($plgid == 7 || $plgid == 22)
        {
            $data['TRANSTYPE'] = 'CASH RCPT';
        }
        elseif($plgid==8)
        {
            $data['TRANSTYPE'] = 'BANK RCPT';
        }

        $this->Receipt_model->voucher_master_update($data);

        $this->Receipt_model->delete_voucher_details($vmsno);

        $subcount = count($this->input->post('account_led_id'));
        $s=1;for($i=0;$i<$subcount;$i++)
        {
            $data['ROWNO'] = $s;
            $data['LEDGER_SNO'] = $account_led_id[$i];
            $data['CREDIT'] = $add_amt_receipts[$i];
//print_r($data);exit;
            $this->Receipt_model->voucher_credit_details_add($data);
        $s++;}

        $data['ROWNO'] = $s;
        $result = $this->Receipt_model->voucher_debit_details_add($data);

        //$this->Receipt_model->voucher_master_add($data);

        /*$kval = $this->input->post('keyval');
        $ukval = $kval+1;

        $kname = "ACC_RECEIPTS-".$_SESSION['LOANPREFIX'];*/

        //$result = $this->Receipt_model->update_keymaster($kname,$ukval);

        $log['log_date'] = date('Y-m-d H:i:s');
        $log['log_details'] = 'Receipt Voucher No : '.$vmsno.' Amount :'.$amt.' Modified';
        $log['log_code'] = 'ACC_RECEIPT-EDIT';
        $log['added_user'] = $_SESSION['username'];
        $this->Receipt_model->log_same_date_add($log);

        if($result)
        {
            $this->session->set_flashdata('g_success', 'Receipt have been Updated successfully...');
        }else{
           $this->session->set_flashdata('g_err', 'Could not update Receipt details!');
        }
        redirect('receipt');
    }

    public function receipt_delete()
    {
        $data['bid']=$_POST['id'];
        //$data['receipt_details'] = $this->Area_model->get_receipt_by_receipt_id($uid);
        $this->load->view('receipt/receipt_delete',$data);
    }

    public function delete()
    { 
        $vmsno=$_POST['field'];
        $this->Receipt_model->delete_voucher_details($vmsno);
        $result = $this->Receipt_model->delete_voucher_master($vmsno);

        $log['log_date'] = date('Y-m-d H:i:s');
        $log['log_details'] = 'Receipt Voucher No : '.$vmsno.' Deleted';
        $log['log_code'] = 'ACC_RECEIPT-DELETE';
        $log['added_user'] = $_SESSION['username'];
        $this->Receipt_model->log_same_date_add($log);

        if ($result) {
            $this->session->set_flashdata('g_success', 'Receipt has been Deleted successfully.');
        }
        else{
            $this->session->set_flashdata('g_err', 'Something went wrong');
        }
    }

}
?>