<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/* ************************************************************************************
		Purpose : To handle all dashboard functions Date    : 23-10-2018 
***************************************************************************************/
class Reports extends CI_Controller 
{

	public function __construct()
	{
		parent::__construct();
    	$this->load->model(array('Reports_model','Akspurchase_model','Realestate_property_model','Chit_model','Accountsgroup_model'));
    	// $this->load->library('excel');
    	$this->load->library('user_agent');

        $fin_year=$this->Accountsgroup_model->get_fin_years_list();
        $db=substr($fin_year->DBNAME,0,strlen($fin_year->DBNAME)-4);
        $db_user=$fin_year->USERNAME?$fin_year->USERNAME:'';
        $db_pass=$fin_year->PASSWORD?$fin_year->PASSWORD:'';
        // echo $db;exit;
        $config_app = switch_db_dynamic($db,$db_user,$db_pass);

      	$this->Reports_model->other_db = $this->load->database($config_app,TRUE);
        $this->Akspurchase_model->other_db = $this->load->database($config_app,TRUE);
        $this->Realestate_property_model->other_db = $this->load->database($config_app,TRUE);
		
		if (isset($this->session->userdata['username']) && $this->session->userdata['username'] == TRUE)
      {
            
      }
      else
      {
         redirect('login'); //if session is not there, redirect to login page
      } 
		date_default_timezone_set("Asia/Kolkata");
		$this->session->set_userdata('comtitle', 'Reports');
	}
	public function loannoticereportexport()
	{
		$data['getcompanyname']         = $this->Reports_model->getcompanyvalue();
		$data['getzonename']            = $this->Reports_model->getzonevalue();
		$data['getareaname']            = $this->Reports_model->getareaname();
		$data['getcityname']            = $this->Reports_model->getcityname();
		$data['getvillagename']         = $this->Reports_model->getvillagename();
		$data['getstreetname']          = $this->Reports_model->getstreetname();
		$data['getintresttype']         = $this->Reports_model->getintresttype();
		
		//filter value's
		$currentdate = date('Y-m-d');
		$companyname = isset($_POST['companyname']) ? $_POST['companyname'] : "";
		$noticetype  = isset($_POST['noticetype']) ? $_POST['noticetype'] : "";
		$schemetype  = isset($_POST['schemetype']) ? $_POST['schemetype'] : "";
		$jeweltype  = isset($_POST['jeweltype']) ? $_POST['jeweltype'] : "";
		$zoneval  = isset($_POST['zoneval']) ? $_POST['zoneval'] : "";
		$areaval  = isset($_POST['areaval']) ? $_POST['areaval'] : "";
		$cityval  = isset($_POST['cityval']) ? $_POST['cityval'] : "";
		$monthly_date_fillter = isset($_POST['monthly_date_fillter']) ? $_POST['monthly_date_fillter'] : "";
		$villageval = isset($_POST['villageval']) ? $_POST['villageval'] : "";
		$streetval = isset($_POST['streetval']) ? $_POST['streetval'] : "";
		
		$fromdate = isset($_POST['from_date_fillter']) ? $_POST['from_date_fillter'] : "";
		$todate = isset($_POST['to_date_fillter']) ? $_POST['to_date_fillter'] : "";


		//print_r($jeweltype);exit;

		$finalfromdate = date("Y-m-d", strtotime($fromdate));
      $finaltodate = date("Y-m-d", strtotime($todate));

		$data['noticeissueloandetails'] = $this->Reports_model->getnoticeissuereports($currentdate,$companyname,$noticetype,$schemetype,$jeweltype,$zoneval,$areaval,$cityval,$monthly_date_fillter,$from_date_fillter,$to_date_fillter,$villageval,$streetval,$finalfromdate,$finaltodate);
		
		$this->load->view('reports/loans/loannoticeexport',$data);
	}

	public function loannoticefilter()
	{
		//print_r($_POST);exit;
		$data['getcompanyname']         = $this->Reports_model->getcompanyvalue();
		$data['getzonename']            = $this->Reports_model->getzonevalue();
		$data['getareaname']            = $this->Reports_model->getareaname();
		$data['getcityname']            = $this->Reports_model->getcityname();
		$data['getvillagename']         = $this->Reports_model->getvillagename();
		$data['getstreetname']          = $this->Reports_model->getstreetname();
		$data['getintresttype']         = $this->Reports_model->getintresttype();
	
		//filter value's
		$currentdate = date('Y-m-d');
		$companyname = isset($_POST['companyname']) ? $_POST['companyname'] : "";
		$noticetype  = isset($_POST['noticetype']) ? $_POST['noticetype'] : "";
		$schemetype  = isset($_POST['schemetype']) ? $_POST['schemetype'] : "";
		$jeweltype  = isset($_POST['jeweltype']) ? $_POST['jeweltype'] : "";
		$zoneval  = isset($_POST['zoneval']) ? $_POST['zoneval'] : "";
		$areaval  = isset($_POST['areaval']) ? $_POST['areaval'] : "";
		$cityval  = isset($_POST['cityval']) ? $_POST['cityval'] : "";
		$monthly_date_fillter = isset($_POST['monthly_date_fillter']) ? $_POST['monthly_date_fillter'] : "";
		$from_date_fillter = isset($_POST['from_date_fillter']) ? $_POST['from_date_fillter'] : "";
		$to_date_fillter = isset($_POST['to_date_fillter']) ? $_POST['to_date_fillter'] : "";
		$villageval = isset($_POST['villageval']) ? $_POST['villageval'] : "";
		$streetval = isset($_POST['streetval']) ? $_POST['streetval'] : "";

		$fromdate = isset($_POST['from_date_fillter']) ? $_POST['from_date_fillter'] : "";
		$todate = isset($_POST['to_date_fillter']) ? $_POST['to_date_fillter'] : "";

		$finalfromdate = date("Y-m-d", strtotime($fromdate));
      $finaltodate = date("Y-m-d", strtotime($todate));


		

		$data['noticeissueloandetails'] = $this->Reports_model->getnoticeissuereports($currentdate,$companyname,$noticetype,$schemetype,$jeweltype,$zoneval,$areaval,$cityval,$monthly_date_fillter,$from_date_fillter,$to_date_fillter,$villageval,$streetval,$finalfromdate,$finaltodate);
		

		$this->load->view('reports/loans/notice_issued',$data);
	}

	//Loans Report
	public function  loan_notice_issued()
	{
		$data['getcompanyname']         = $this->Reports_model->getcompanyvalue();
		$data['getzonename']            = $this->Reports_model->getzonevalue();
		$data['getareaname']            = $this->Reports_model->getareaname();
		$data['getcityname']            = $this->Reports_model->getcityname();
		$data['getvillagename']         = $this->Reports_model->getvillagename();
		$data['getstreetname']          = $this->Reports_model->getstreetname();
		$data['getintresttype']         = $this->Reports_model->getintresttype();

		//filter value's
		$currentdate = date('Y-m-d');
		$companyname = isset($_POST['companyname']) ? $_POST['companyname'] : "";
		$noticetype  = isset($_POST['noticetype']) ? $_POST['noticetype'] : "";
		$schemetype  = isset($_POST['schemetype']) ? $_POST['schemetype'] : "";
		$jeweltype  = isset($_POST['jeweltype']) ? $_POST['jeweltype'] : "";
		$zoneval  = isset($_POST['zoneval']) ? $_POST['zoneval'] : "";
		$areaval  = isset($_POST['areaval']) ? $_POST['areaval'] : "";
		$cityval  = isset($_POST['cityval']) ? $_POST['cityval'] : "";
		$monthly_date_fillter = isset($_POST['monthly_date_fillter']) ? $_POST['monthly_date_fillter'] : "";
		$from_date_fillter = isset($_POST['from_date_fillter']) ? $_POST['from_date_fillter'] : "";
		$to_date_fillter = isset($_POST['to_date_fillter']) ? $_POST['to_date_fillter'] : "";
		$villageval = isset($_POST['villageval']) ? $_POST['villageval'] : "";
		$streetval = isset($_POST['streetval']) ? $_POST['streetval'] : "";
		$fromdate = isset($_POST['from_date_fillter']) ? $_POST['from_date_fillter'] : "";
		$todate = isset($_POST['to_date_fillter']) ? $_POST['to_date_fillter'] : "";

		$finalfromdate = date("Y-m-d", strtotime($fromdate));
      $finaltodate = date("Y-m-d", strtotime($todate));

		$data['noticeissueloandetails'] = $this->Reports_model->getnoticeissuereports($currentdate,$companyname,$noticetype,$schemetype,$jeweltype,$zoneval,$areaval,$cityval,$monthly_date_fillter,$from_date_fillter,$to_date_fillter,$villageval,$streetval,$finalfromdate,$finaltodate);

		
		$this->load->view('reports/loans/notice_issued',$data);
		
	}
	public function expiredloanreport()
	{
		$data['getcompanyname']         = $this->Reports_model->getcompanyvalue();
		$data['getzonename']            = $this->Reports_model->getzonevalue();
		$data['getareaname']            = $this->Reports_model->getareaname();
		$data['getcityname']            = $this->Reports_model->getcityname();
		$data['getvillagename']         = $this->Reports_model->getvillagename();
		$data['getstreetname']          = $this->Reports_model->getstreetname();
		$data['getintresttype']         = $this->Reports_model->getintresttype();

		//filter value's
		$currentdate = date('Y-m-d');
		$companyname = isset($_POST['companyname']) ? $_POST['companyname'] : "";
		$noticetype  = isset($_POST['noticetype']) ? $_POST['noticetype'] : "";
		$schemetype  = isset($_POST['schemetype']) ? $_POST['schemetype'] : "";
		$jeweltype  = isset($_POST['jeweltype']) ? $_POST['jeweltype'] : "";
		$zoneval  = isset($_POST['zoneval']) ? $_POST['zoneval'] : "";
		$areaval  = isset($_POST['areaval']) ? $_POST['areaval'] : "";
		$cityval  = isset($_POST['cityval']) ? $_POST['cityval'] : "";
		$monthly_date_fillter = isset($_POST['monthly_date_fillter']) ? $_POST['monthly_date_fillter'] : "";
		$from_date_fillter = isset($_POST['from_date_fillter']) ? $_POST['from_date_fillter'] : "";
		$to_date_fillter = isset($_POST['to_date_fillter']) ? $_POST['to_date_fillter'] : "";
		$villageval = isset($_POST['villageval']) ? $_POST['villageval'] : "";
		$streetval = isset($_POST['streetval']) ? $_POST['streetval'] : "";
		$fromdate = isset($_POST['from_date_fillter']) ? $_POST['from_date_fillter'] : "";
		$todate = isset($_POST['to_date_fillter']) ? $_POST['to_date_fillter'] : "";

		$finalfromdate = date("Y-m-d", strtotime($fromdate));
      $finaltodate = date("Y-m-d", strtotime($todate));



	   $data['getexpiredloandetails'] = $this->Reports_model->getexpiredloan();
		$this->load->view('reports/loans/expired_loan',$data);
		
	}
	public function odreports()
	{
		$data['getcompanyname']         = $this->Reports_model->getcompanyvalue();
		$data['getzonename']            = $this->Reports_model->getzonevalue();
		$data['getareaname']            = $this->Reports_model->getareaname();
		$data['getcityname']            = $this->Reports_model->getcityname();
		$data['getvillagename']         = $this->Reports_model->getvillagename();
		$data['getstreetname']          = $this->Reports_model->getstreetname();
		$data['getintresttype']         = $this->Reports_model->getintresttype();

		
		//filter value's
		$currentdate = date('Y-m-d');
		$companyname = isset($_POST['companyname']) ? $_POST['companyname'] : "";
		$noticetype  = isset($_POST['noticetype']) ? $_POST['noticetype'] : "";
		$schemetype  = isset($_POST['schemetype']) ? $_POST['schemetype'] : "";
		$jeweltype  = isset($_POST['jeweltype']) ? $_POST['jeweltype'] : "";
		$zoneval  = isset($_POST['zoneval']) ? $_POST['zoneval'] : "";
		$areaval  = isset($_POST['areaval']) ? $_POST['areaval'] : "";
		$cityval  = isset($_POST['cityval']) ? $_POST['cityval'] : "";
		$monthly_date_fillter = isset($_POST['monthly_date_fillter']) ? $_POST['monthly_date_fillter'] : "";
		$from_date_fillter = isset($_POST['from_date_fillter']) ? $_POST['from_date_fillter'] : "";
		$to_date_fillter = isset($_POST['to_date_fillter']) ? $_POST['to_date_fillter'] : "";
		$villageval = isset($_POST['villageval']) ? $_POST['villageval'] : "";
		$streetval = isset($_POST['streetval']) ? $_POST['streetval'] : "";
		$fromdate = isset($_POST['from_date_fillter']) ? $_POST['from_date_fillter'] : "";
		$todate = isset($_POST['to_date_fillter']) ? $_POST['to_date_fillter'] : "";

		$finalfromdate = date("Y-m-d", strtotime($fromdate));
      $finaltodate = date("Y-m-d", strtotime($todate));

		

	   $data['getodloandetails'] = $this->Reports_model->getodloan();

		$this->load->view('reports/loans/odreport',$data);
	}
	public function outstandingreports()
	{

		$data['getcompanyname']         = $this->Reports_model->getcompanyvalue();
		$data['getzonename']            = $this->Reports_model->getzonevalue();
		$data['getareaname']            = $this->Reports_model->getareaname();
		$data['getcityname']            = $this->Reports_model->getcityname();
		$data['getvillagename']         = $this->Reports_model->getvillagename();
		$data['getstreetname']          = $this->Reports_model->getstreetname();
		$data['getintresttype']         = $this->Reports_model->getintresttype();

		
		$currentdate = date('Y-m-d');
		$companyname = isset($_POST['companyname']) ? $_POST['companyname'] : "";
		$noticetype  = isset($_POST['noticetype']) ? $_POST['noticetype'] : "";
		$schemetype  = isset($_POST['schemetype']) ? $_POST['schemetype'] : "";
		$jeweltype  = isset($_POST['jeweltype']) ? $_POST['jeweltype'] : "";
		$zoneval  = isset($_POST['zoneval']) ? $_POST['zoneval'] : "";
		$areaval  = isset($_POST['areaval']) ? $_POST['areaval'] : "";
		$cityval  = isset($_POST['cityval']) ? $_POST['cityval'] : "";
		$monthly_date_fillter = isset($_POST['monthly_date_fillter']) ? $_POST['monthly_date_fillter'] : "";
		$from_date_fillter = isset($_POST['from_date_fillter']) ? $_POST['from_date_fillter'] : "";
		$to_date_fillter = isset($_POST['to_date_fillter']) ? $_POST['to_date_fillter'] : "";
		$villageval = isset($_POST['villageval']) ? $_POST['villageval'] : "";
		$streetval = isset($_POST['streetval']) ? $_POST['streetval'] : "";
		$fromdate = isset($_POST['from_date_fillter']) ? $_POST['from_date_fillter'] : "";
		$todate = isset($_POST['to_date_fillter']) ? $_POST['to_date_fillter'] : "";

		$finalfromdate = date("Y-m-d", strtotime($fromdate));
      $finaltodate = date("Y-m-d", strtotime($todate));

		

	   $data['getoutstandingloandetails'] = $this->Reports_model->getoutstandingloandetails();

		$this->load->view('reports/loans/outstanding_report',$data);
	}
	public function financialsummary(){

		$this->load->view('reports/loans/loan_financial_summary');

	}


	//jewellery Reports
	public function supplieroldgold()
	{

		$this->load->view('reports/jewellery/jewellery_lot_og_supplier');

	}
	public function customeroldgold(){

		$this->load->view('reports/jewellery/jewellery_sale_og_customer');
	}
	public function customernontaggeditemsales()
	{
		 $data['sales_entry_detail_nontag'] = $this->Reports_model->getnontaggedsalesdetails();
		 //echo "<pre>";
		//print_r($data['sales_entry_detail_nontag']);
		//echo "</pre>";exit;
		 
		 $this->load->view('reports/jewellery/jewellery_sale_non_tagged_item_customer',$data);
	}

	//*8*****************************************Real Estate Reports***********************************************
	public function agenttotalsumamount()
	{ 
		// $data['agent_list'] = $this->Reports_model->getallagentsdata();
		$data['agent_list'] = $this->Realestate_property_model->getagentlistdropdown();

		$data['agent_fill'] = isset($_POST['agent_fill']) ? $_POST['agent_fill'] : "";
	      if($data['agent_fill']!=''){

	         $agent_fill ="AND a.pur_sup='".$data['agent_fill']."'";
	         }
	          else{
	         $agent_fill ='';
	        }

        $data['dt_fill'] = $this->input->post('dt_fill');

        $data['from_date_fillter'] = $this->input->post('from_date_fillter');
        $data['to_date_fillter'] = $this->input->post('to_date_fillter');

        // print_r($data['from_date_fillter']);exit;
        $fdate ='';
        $tdate ='';
        //  print_r($data['dt_fill']);exit();
        if($data['dt_fill']=="all"){
            $fdate ='';
            $tdate ='';

        }
      
            if($data['dt_fill']=="today"){
            $data['today_date_fillter'] = date("Y-m-d");
           	$dateFilter = " AND b.date='" . date('Y-m-d') . "' AND C.date='" . date('Y-m-d') . "'";

            $tdate ='';
                
            
        }
        if($data['dt_fill']=="week"){
            $today=date('l');
            if($today=="Sunday"){
                $data['week_from_date_fillter']=date(' Y-m-d', strtotime("sunday 0 week"));
           
                $data['week_to_date_fillter']=date(' Y-m-d', strtotime("saturday 1 week"));
               // print_r($data['week_to_date_fillter']);exit;
                    $fdate =" AND b.date>='".$data['week_from_date_fillter']."' ";
                $tdate =" AND b.date<='".$data['week_to_date_fillter']."'";

            }else{
             $data['week_from_date_fillter']=date(' Y-m-d', strtotime("sunday -1 week"));
           
             $data['week_to_date_fillter']=date('Y-m-d', strtotime("saturday 0 week"));
            //  print_r($data['week_to_date_fillter']);exit;
                 $fdate =" AND b.date>='".$data['week_from_date_fillter']."'";
             $tdate =" AND b.date<='".$data['week_to_date_fillter']."'";
            }
                     }
                    if($data['dt_fill']=="monthly"){
                   
                        $first=date('Y-m-01');
                        $last=date('Y-m-t');
                        $fdate =" AND b.date>='".$first."'";
                        
                       
                            $tdate ="AND b.date<='".$last."'";
                        }

                if($data['dt_fill']=="custom Date"){

                if($data['from_date_fillter']!=''){

                    $first=date('Y-m-d',strtotime($data['from_date_fillter']));
                    $fdate =" AND b.date>='".$first."'";
                    
                    }
                    else{
                        $fdate ='';
                    }
                    if($data['dt_fill']=="custom Date"){
                if($data['from_date_fillter']!=''){
                    $first=date('Y-m-d',strtotime($data['from_date_fillter']));
                    $fdate =" AND b.date>='".$first."'";
                    
                    }
                    else{
                        $fdate ='';
                    }
                    if($data['to_date_fillter']!=''){
                        $last=date('Y-m-d',strtotime($data['to_date_fillter']));
                        $tdate =" AND b.date<='".$last."'";
                        
                        }
                        else{
                            $tdate ='';
                        } }
                    }
      


                    $data['fdate'] = $fdate;
                    $data['tdate'] = $tdate;
                    $data['agent_fill'] = $agent_fill;
                   

                    // Advance Check
                    	$data['ad_check'] =isset($_POST['ad_check']) ? $_POST['ad_check'] : "";
                    if ($data['ad_check']==1) {


                     $data['ad_sts'] =isset($_POST['ad_valid']) ? $_POST['ad_valid'] : "";
                     $data['ad_amt'] =isset($_POST['availableamountval']) ? $_POST['availableamountval'] : "";
							$advance_ck ="AND a.pur_cash".$data['ad_sts'].$data['ad_amt']."";
                    	
                    }
                    else{
                    	 	$advance_ck ="";
                    	 	$data['ad_sts'] ='';
                     	$data['ad_amt'] ='';

                    }



		$data['Agent_totnumamount_list'] = $this->Reports_model->getagent_totnumamount_list($fdate,$tdate);

		// echo "<pre>";
		// print_r($data['Agent_totnumamount_list']);
		// echo "</pre>";exit;
		
		$this->load->view('reports/realestate/re_agent_total_sum_of_amt',$data);
	}

	public function filteragenttotalsumamount()
	{ 
		$angetname         = $_POST['agentName'];
		$dt_fill		       = $_POST['dt_fill'];
		$to_date_fillter   = $_POST['to_date_fillter'];
		$from_date_fillter = $_POST['from_date_fillter'];

		$currentdate       = date("Y-m-d");
		$weekday           =  date('Y-m-d', strtotime("this week"));
      $monthday          =  date('Y-m-d', strtotime(date('Y-m-1')));;

		$fromdatechange = $from_date_fillter;
      $todatechange = $to_date_fillter;

      //chanage date formate
      $finalfromdate = date("Y-m-d", strtotime($fromdatechange));
      $finaltodate = date("Y-m-d", strtotime($todatechange));

     
      if($dt_fill =='all')
      {
         //Sql Query Formate in Assign Variable
         $sdate = "a.date>='".$currentdate."'";
         $edate = "";
         $sodr = ' ORDER BY a.date DESC';
      }
      else if($dt_fill =='today')
      {
         $sdate = "a.date>='".$currentdate."'";
         $edate = "";
         $sodr = ' ORDER BY a.date DESC';
      }
      else if($dt_fill =='week')
      {
         $sdate = "a.date>='".$weekday."'";
         $edate = " AND a.date<='".$currentdate."'";
         $sodr = ' ORDER BY a.date DESC';
      }
      else if($dt_fill =='monthly')
      {
         $sdate = "a.date>='".$monthday."'";
         $edate = " AND a.date<='".$currentdate."'";
         $sodr = ' ORDER BY a.date DESC';
      }
      else
      {
         //Sql Query Formate in Assign Variable
         $sdate = "a.date>='".$finalfromdate."'";
         $edate = " AND date<='".$finaltodate."'";
         $sodr = ' ORDER BY date DESC';
      }


		$data['agent_list'] = $this->Reports_model->getallagentsdata();
		$data['Agent_totnumamount_list'] = $this->Reports_model->getfilteragent_totnumamount_list($dt_fill,$angetname,$sdate,$edate,$sodr);
		
		//echo "<pre>";
		//print_r($data['Agent_totnumamount_list']);
		//echo "</pre>";exit;
		$this->load->view('reports/realestate/re_agent_total_sum_of_amt',$data);
	}

	//chit reports
	public function chitagenttotalsumamount()
	{
		$data['chittotsumofamt'] = $this->Reports_model->getchittotsumofamt();
		//echo "<pre>";
		//print_r($data);
		////echo "</pre>";exit;
		$this->load->view('reports/chit/chit_agent_total_sum_of_amt',$data);
	}
	//*************************************************************** CHIT REPORTS*******************************************************//
	public function chittransactionsamount()
	{
		   $data['chittransaction'] = $this->Reports_model->getchittransactionsvalue();

		    $data['party_fil'] = $this->input->post('party_fil');
		        if($data['party_fil'] !=''){
		        $party_fil =" AND PARTIES.NAME LIKE '%".$data['party_fil']."%' ";
		        
		        }
		        else{
		            $party_fil ='';
		        }
		        $data['chit_id_fill'] = $this->input->post('chit_id_fill');
		        if($data['chit_id_fill'] !=''){
		        $chit_id_fill =" AND CHIT_LIST.chit_id LIKE '%".$data['chit_id_fill']."%' ";
		        
		        }
		        else{
		            $chit_id_fill ='';
		        }

		        $data['scheme_sel']   = $this->input->post('scheme_sel')?$this->input->post('scheme_sel'):'all';
		        if ($data['scheme_sel']!='all') {

		        	if ($data['scheme_sel']==1) {
		        		$scheme_sel = " AND CHIT_TRANSACTION.scheme_type ='1'";
		        	}else{

		        		$scheme_sel = " AND CHIT_TRANSACTION.scheme_type ='2' OR CHIT_TRANSACTION.scheme_type ='3'";
		        	}
		        }
		        else{

		        	$scheme_sel = "";

		        }

		        $data['sta_sel'] = $this->input->post('sta_sel')?$this->input->post('sta_sel'):'all';		        
		        if($data['sta_sel'] =='all')
		        {
		           $sta_sel = '';
		        }
		        else{
		            
		             $sta_sel = 'AND CHIT_TRANSACTION.transaction_type ='.$data['sta_sel'].' ';
		        }

		        $data['col_type'] = $this->input->post('col_type')?$this->input->post('col_type'):'all';		        
		        if($data['col_type'] =='all')
		        {
		           $col_type = '';
		        }
		        else{
		            
		             $col_type = 'AND CHIT_LIST.collection_type ='.$data['col_type'].' ';
		        }
		    
		        $data['dt_fill'] = $this->input->post('dt_fill');
		        $data['from_date_fillter'] = $this->input->post('from_date_fillter');
		        $data['to_date_fillter'] = $this->input->post('to_date_fillter');

		        // print_r($data['from_date_fillter']);exit;
		        $fdate ='';
		        $tdate ='';
		        //  print_r($data['dt_fill']);exit();
		        if($data['dt_fill']=="all"){
		            $fdate ='';
		            $tdate ='';

		        }
		      
		            if($data['dt_fill']=="today"){
		            $data['today_date_fillter'] = date("Y-m-d");
		            $fdate =" AND CHIT_TRANSACTION.trans_date='".$data['today_date_fillter']."'";
		            $tdate ='';
		                
		            
		        }
		        if($data['dt_fill']=="week"){
		            $today=date('l');
		            if($today=="Sunday"){
		                $data['week_from_date_fillter']=date(' Y-m-d', strtotime("sunday 0 week"));
		           
		                $data['week_to_date_fillter']=date(' Y-m-d', strtotime("saturday 1 week"));
		               // print_r($data['week_to_date_fillter']);exit;
		                    $fdate =" AND CHIT_TRANSACTION.trans_date>='".$data['week_from_date_fillter']."'";
		                $tdate =" AND CHIT_TRANSACTION.trans_date<='".$data['week_to_date_fillter']."'";

		            }else{
		             $data['week_from_date_fillter']=date(' Y-m-d', strtotime("sunday -1 week"));
		           
		             $data['week_to_date_fillter']=date('Y-m-d', strtotime("saturday 0 week"));
		            //  print_r($data['week_to_date_fillter']);exit;
		                 $fdate =" AND CHIT_TRANSACTION.trans_date>='".$data['week_from_date_fillter']."'";
		             $tdate =" AND CHIT_TRANSACTION.trans_date<='".$data['week_to_date_fillter']."'";
		            }
		                     }
		                    if($data['dt_fill']=="monthly"){
		                   
		                        $first=date('Y-m-01');
		                        $last=date('Y-m-t');
		                        $fdate =" AND CHIT_TRANSACTION.trans_date>='".$first."'";
		                        
		                       
		                            $tdate ="AND CHIT_TRANSACTION.trans_date<='".$last."'";
		                        }

		                if($data['dt_fill']=="custom Date"){

		                if($data['from_date_fillter']!=''){

		                    $first=date('Y-m-d',strtotime($data['from_date_fillter']));
		                    $fdate =" AND CHIT_TRANSACTION.trans_date>='".$first."'";
		                    
		                    }
		                    else{
		                        $fdate ='';
		                    }
		                    if($data['dt_fill']=="custom Date"){
		                if($data['from_date_fillter']!=''){
		                    $first=date('Y-m-d',strtotime($data['from_date_fillter']));
		                    $fdate =" AND CHIT_TRANSACTION.trans_date>='".$first."'";
		                    
		                    }
		                    else{
		                        $fdate ='';
		                    }
		                    if($data['to_date_fillter']!=''){
		                        $last=date('Y-m-d',strtotime($data['to_date_fillter']));
		                        $tdate =" AND CHIT_TRANSACTION.trans_date<='".$last."'";
		                        
		                        }
		                        else{
		                            $tdate ='';
		                        } }
		                    }
		      


		                    $data['fdate'] = $fdate;
		                    $data['tdate'] = $tdate;

		                     // Advance Check
                    		$data['ad_check'] =isset($_POST['ad_check']) ? $_POST['ad_check'] : "";
		                    if ($data['ad_check']==1) {


		                     $data['ad_sts'] =isset($_POST['ad_valid']) ? $_POST['ad_valid'] : "";
		                     $data['ad_amt'] =isset($_POST['availableamountval']) ? $_POST['availableamountval'] : "";
							 $advance_ck ="AND CHIT_TRANSACTION.processing_amount".$data['ad_sts'].$data['ad_amt']."";
		                    	
		                    }
		                    else{
		                    	 	$advance_ck ="";
		                    	 	$data['ad_sts'] ='';
		                     		$data['ad_amt'] ='';

		                    }

		                                 // print_r($data['dt_fill']);
		                                 // exit;

		        $data['chit_all_trans_list'] = $this->db->query("SELECT PARTIES.NAME, PARTIES.RATING, PARTIES.PID, 
		        												PARTIES.MEMBERSHIP_POINTS, CHIT_TRANSACTION.sno, CHIT_TRANSACTION.party_id, CHIT_TRANSACTION.trans_date,CHIT_TRANSACTION.scheme_type, CHIT_TRANSACTION.scheme_id, CHIT_TRANSACTION.transaction_type, CHIT_TRANSACTION.opening_amount,CHIT_TRANSACTION.processing_amount, CHIT_TRANSACTION.closing_balance, CHIT_TRANSACTION.amt_paid, CHIT_TRANSACTION.payment_id,CHIT_TRANSACTION.type, CHIT_LIST.chit_id,CHIT_LIST.collection_type, ROW_NUMBER() OVER ( ORDER BY CHIT_TRANSACTION.sno DESC ) AS sl FROM PARTIES INNER JOIN CHIT_TRANSACTION 
															        ON PARTIES.PID = CHIT_TRANSACTION.party_id 
															        INNER JOIN CHIT_LIST ON CHIT_LIST.scheme_id = CHIT_TRANSACTION.scheme_id WHERE CHIT_TRANSACTION.status = 'Y' $party_fil $fdate $tdate $scheme_sel $sta_sel $advance_ck $col_type")->result_array();


		    // $data['chit_all_trans_list'] = $this->Reports_model->get_chit_all_transaction_list( $party_fil,$fdate,$tdate,$scheme_sel,$sta_sel,$chit_id_fill);



		   
		   // echo "<pre>";
		   // print_r($data['chit_all_trans_list']);
		   // echo "</pre>";exit;
			$this->load->view('reports/chit/chit_transaction_statement',$data);
	}
	public function chit_transaction_export()
      {
        // print_r(1);exit;
        $data['party_fil'] = $this->input->post('party_fil');
		        if($data['party_fil'] !=''){
		        $party_fil =" AND PARTIES.NAME LIKE '%".$data['party_fil']."%' ";
		        
		        }
		        else{
		            $party_fil ='';
		        }
		        $data['chit_id_fill'] = $this->input->post('chit_id_fill');
		        if($data['chit_id_fill'] !=''){
		        $chit_id_fill =" AND CHIT_LIST.chit_id LIKE '%".$data['chit_id_fill']."%' ";
		        
		        }
		        else{
		            $chit_id_fill ='';
		        }

		        $data['scheme_sel']   = $this->input->post('scheme_sel')?$this->input->post('scheme_sel'):'all';
		        if ($data['scheme_sel']!='all') {

		        	if ($data['scheme_sel']==1) {
		        		$scheme_sel = " AND CHIT_TRANSACTION.scheme_type ='1'";
		        	}else{

		        		$scheme_sel = " AND CHIT_TRANSACTION.scheme_type ='2' OR CHIT_TRANSACTION.scheme_type ='3'";
		        	}
		        }
		        else{

		        	$scheme_sel = "";

		        }

		        $data['sta_sel'] = $this->input->post('sta_sel')?$this->input->post('sta_sel'):'all';


		        
		        if($data['sta_sel'] =='all')
		        {
		           $sta_sel = '';
		        }
		        else{
		            
		             $sta_sel = 'AND CHIT_TRANSACTION.transaction_type ='.$data['sta_sel'].' ';
		        }
		        $data['col_type'] = $this->input->post('col_type')?$this->input->post('col_type'):'all';

		        if($data['col_type'] =='all')
		        {
		           $col_type = '';
		        }
		        else{
		            
		             $col_type = 'AND CHIT_LIST.collection_type ='.$data['col_type'].' ';
		        }
		    
		        $data['dt_fill'] = $this->input->post('dt_fill');
		        $data['from_date_fillter'] = $this->input->post('from_date_fillter');
		        $data['to_date_fillter'] = $this->input->post('to_date_fillter');

		        // print_r($data['from_date_fillter']);exit;
		        $fdate ='';
		        $tdate ='';
		        //  print_r($data['dt_fill']);exit();
		        if($data['dt_fill']=="all"){
		            $fdate ='';
		            $tdate ='';

		        }
		      
		            if($data['dt_fill']=="today"){
		            $data['today_date_fillter'] = date("Y-m-d");
		            $fdate =" AND CHIT_TRANSACTION.trans_date='".$data['today_date_fillter']."'";
		            $tdate ='';
		                
		            
		        }
		        if($data['dt_fill']=="week"){
		            $today=date('l');
		            if($today=="Sunday"){
		                $data['week_from_date_fillter']=date(' Y-m-d', strtotime("sunday 0 week"));
		           
		                $data['week_to_date_fillter']=date(' Y-m-d', strtotime("saturday 1 week"));
		               // print_r($data['week_to_date_fillter']);exit;
		                    $fdate =" AND CHIT_TRANSACTION.trans_date>='".$data['week_from_date_fillter']."'";
		                $tdate =" AND CHIT_TRANSACTION.trans_date<='".$data['week_to_date_fillter']."'";

		            }else{
		             $data['week_from_date_fillter']=date(' Y-m-d', strtotime("sunday -1 week"));
		           
		             $data['week_to_date_fillter']=date('Y-m-d', strtotime("saturday 0 week"));
		            //  print_r($data['week_to_date_fillter']);exit;
		                 $fdate =" AND CHIT_TRANSACTION.trans_date>='".$data['week_from_date_fillter']."'";
		             $tdate =" AND CHIT_TRANSACTION.trans_date<='".$data['week_to_date_fillter']."'";
		            }
		                     }
		                    if($data['dt_fill']=="monthly"){
		                   
		                        $first=date('Y-m-01');
		                        $last=date('Y-m-t');
		                        $fdate =" AND CHIT_TRANSACTION.trans_date>='".$first."'";
		                        
		                       
		                            $tdate ="AND CHIT_TRANSACTION.trans_date<='".$last."'";
		                        }

		                if($data['dt_fill']=="custom Date"){

		                if($data['from_date_fillter']!=''){

		                    $first=date('Y-m-d',strtotime($data['from_date_fillter']));
		                    $fdate =" AND CHIT_TRANSACTION.trans_date>='".$first."'";
		                    
		                    }
		                    else{
		                        $fdate ='';
		                    }
		                    if($data['dt_fill']=="custom Date"){
		                if($data['from_date_fillter']!=''){
		                    $first=date('Y-m-d',strtotime($data['from_date_fillter']));
		                    $fdate =" AND CHIT_TRANSACTION.trans_date>='".$first."'";
		                    
		                    }
		                    else{
		                        $fdate ='';
		                    }
		                    if($data['to_date_fillter']!=''){
		                        $last=date('Y-m-d',strtotime($data['to_date_fillter']));
		                        $tdate =" AND CHIT_TRANSACTION.trans_date<='".$last."'";
		                        
		                        }
		                        else{
		                            $tdate ='';
		                        } }
		                    }
		      


		                    $data['fdate'] = $fdate;
		                    $data['tdate'] = $tdate;

		                     // Advance Check
                    		$data['ad_check'] =isset($_POST['ad_check']) ? $_POST['ad_check'] : "";
		                    if ($data['ad_check']==1) {


		                     $data['ad_sts'] =isset($_POST['ad_valid']) ? $_POST['ad_valid'] : "";
		                     $data['ad_amt'] =isset($_POST['availableamountval']) ? $_POST['availableamountval'] : "";
							 $advance_ck ="AND CHIT_TRANSACTION.processing_amount".$data['ad_sts'].$data['ad_amt']."";
		                    	
		                    }
		                    else{
		                    	 	$advance_ck ="";
		                    	 	$data['ad_sts'] ='';
		                     		$data['ad_amt'] ='';

		                    }

        $objPHPExcel = new PHPExcel();
		$activeSheet = $objPHPExcel->getActiveSheet();
		$styleArray = array(
				'font' => array(
					'bold' => true,
					'color' => array('rgb' => '000000')
				)
			);

        $objPHPExcel->getActiveSheet()->getStyle('A1')->applyFromArray($styleArray);
		$objPHPExcel->getActiveSheet()->setCellValue('A1', 'Date');
		$objPHPExcel->getActiveSheet()->getStyle('B1')->applyFromArray($styleArray);
		$objPHPExcel->getActiveSheet()->setCellValue('B1', 'Party Info');
        $objPHPExcel->getActiveSheet()->getStyle('C1')->applyFromArray($styleArray);
		$objPHPExcel->getActiveSheet()->setCellValue('C1', 'Chit ID');
		$objPHPExcel->getActiveSheet()->getStyle('D1')->applyFromArray($styleArray);
		$objPHPExcel->getActiveSheet()->setCellValue('D1', 'Scheme ID');
        $objPHPExcel->getActiveSheet()->getStyle('E1')->applyFromArray($styleArray);
		$objPHPExcel->getActiveSheet()->setCellValue('E1', 'Scheme');
        $objPHPExcel->getActiveSheet()->getStyle('F1')->applyFromArray($styleArray);
		$objPHPExcel->getActiveSheet()->setCellValue('F1', 'Collection Type');
        $objPHPExcel->getActiveSheet()->getStyle('G1')->applyFromArray($styleArray);
		$objPHPExcel->getActiveSheet()->setCellValue('G1', 'Open Balance');
        $objPHPExcel->getActiveSheet()->getStyle('H1')->applyFromArray($styleArray);
		$objPHPExcel->getActiveSheet()->setCellValue('H1', 'Process Amount');
        $objPHPExcel->getActiveSheet()->getStyle('I1')->applyFromArray($styleArray);
		$objPHPExcel->getActiveSheet()->setCellValue('I1', 'Closing Balance');
        $objPHPExcel->getActiveSheet()->getStyle('J1')->applyFromArray($styleArray);
		$objPHPExcel->getActiveSheet()->setCellValue('J1', 'Status');

		$result = $this->db->query("SELECT PARTIES.NAME, PARTIES.RATING, PARTIES.PID, PARTIES.MEMBERSHIP_POINTS, CHIT_TRANSACTION.sno, CHIT_TRANSACTION.party_id, CHIT_TRANSACTION.trans_date,CHIT_TRANSACTION.scheme_type, CHIT_TRANSACTION.scheme_id, CHIT_TRANSACTION.transaction_type, CHIT_TRANSACTION.opening_amount,CHIT_TRANSACTION.processing_amount, CHIT_TRANSACTION.closing_balance, CHIT_TRANSACTION.amt_paid, CHIT_TRANSACTION.payment_id,CHIT_TRANSACTION.type, CHIT_LIST.chit_id,CHIT_LIST.collection_type
	        FROM PARTIES
	        INNER JOIN CHIT_TRANSACTION 
	        ON PARTIES.PID = CHIT_TRANSACTION.party_id 
	        INNER JOIN CHIT_LIST 
			ON CHIT_LIST.scheme_id = CHIT_TRANSACTION.scheme_id
	        WHERE CHIT_TRANSACTION.status = 'Y' $party_fil $fdate $tdate $scheme_sel $sta_sel $advance_ck $col_type
	        ORDER BY CHIT_TRANSACTION.sno DESC ")->result_array();

        $data['chit_all_trans_list'] = $result;
        // print_r($result);exit;
        $arr = [];
        foreach($data['chit_all_trans_list'] as $chit)
        {
            $pid = $chit['PID'];

            if($chit['RATING']==1) 
            { $RATING = 'color:#50cd89;'; }
            else if($chit['RATING']==2) 
            { $RATING = 'color:#ffc700;'; }
            else if($chit['RATING']==3) 
            { $RATING = 'color:red;'; }
            else if($chit['RATING']=='' || is_null($chit['RATING'])) 
            { $RATING = 'color:#d2d4dc;'; }
            else 
            { $RATING = ''; }
            if($chit['scheme_type']==3)
            { $SCHEME = "Thangamagal"; }
            elseif($chit['scheme_type']==2)
            { $SCHEME = "Thangamagal"; }
            elseif($chit['scheme_type']==1)
            { $SCHEME = "Selvamagal"; }
            else  
            { $SCHEME = "-"; }

            if($chit['scheme_type']==3)
            { $SCHEME_TYPE = "Gold"; }
            elseif($chit['scheme_type']==2)
            { $SCHEME_TYPE = "Cash"; }
            elseif($chit['scheme_type']==1)
            { $SCHEME_TYPE = "Cash"; }
            else  
            { $SCHEME_TYPE = "-"; }
            $OPEN_AMT = round($chit['opening_amount'],2);

            if($chit['scheme_type']==3)
            {
                $PROCESS_AMT =  round($chit['processing_amount'],2).'/'.round($chit['amt_paid'],2);
            }
            else
            {
                $PROCESS_AMT =  round($chit['processing_amount'],2);
            }
            $CLOSE_AMT = round($chit['closing_balance'],2);

            if($chit['transaction_type']==5)
            { $STATUS = "Withdraw-Loan"; }
            elseif($chit['transaction_type']==4)
            { $STATUS = "Withdraw-Sales"; }
            elseif($chit['transaction_type']==3)
            { $STATUS = "Interest-added"; }
            elseif($chit['transaction_type']==2)
            { $STATUS = "Withdraw"; }
            elseif($chit['transaction_type']==1)
            { $STATUS = "Deposit"; }
            else 
            { $STATUS = "<span>-</span>"; }
            $chit_list = $this->db->query("SELECT * FROM CHIT_LIST WHERE scheme_id = '".$chit['scheme_id']."' ")->row();

            $type = $chit_list->collection_type;
			if ($type==1) {
				$collectiontype='Daily';
			}
			else if($type==2){
				$collectiontype='Weekly';
			}
			else{
				$collectiontype='Monthly';
			}


            $arr[] = [
                'date' => $chit['trans_date'],
                'name' => $chit['NAME'],
                'rating' => $RATING,
                'chit_id' => $chit_list->chit_id,
                'scheme_id' => $chit_list->scheme_id,
                'scheme' => $SCHEME.' '.$SCHEME_TYPE,
                'scheme_type' => $collectiontype,
                'open_amt' => $OPEN_AMT,
                'close_amt' => $CLOSE_AMT,
                'process_amt' => $PROCESS_AMT,
                'status' => $STATUS,
            ];
        }
        // print_r($arr);exit;
	
	
		$i=2;
        foreach($arr as $val){
			$objPHPExcel->getActiveSheet()->setCellValue('A'.$i, $val['date']);
			$objPHPExcel->getActiveSheet()->setCellValue('B'.$i, $val['name']);
			$objPHPExcel->getActiveSheet()->setCellValue('C'.$i, $val['chit_id']);
			$objPHPExcel->getActiveSheet()->setCellValue('D'.$i, $val['scheme_id']);
			$objPHPExcel->getActiveSheet()->setCellValue('E'.$i, $val['scheme']);
			$objPHPExcel->getActiveSheet()->setCellValue('F'.$i, $val['scheme_type']);
			$objPHPExcel->getActiveSheet()->setCellValue('G'.$i, IND_money_format($val['open_amt']));
			$objPHPExcel->getActiveSheet()->setCellValue('H'.$i, IND_money_format($val['process_amt']));
			$objPHPExcel->getActiveSheet()->setCellValue('I'.$i, IND_money_format($val['close_amt']));
			$objPHPExcel->getActiveSheet()->setCellValue('J'.$i, $val['status']);
			// $objPHPExcel->getActiveSheet()->setCellValue('J'.$i, $val['deapth']);
        $i++;
            }

        $filename='Chit Transaction Statement.xlsx'; //save our workbook as this file name
		header('Content-Type: application/vnd.ms-excel'); //mime type
		header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell browser what's the file name
		header('Cache-Control: max-age=0'); //no cache
	
		//save it to Excel5 format (excel 2003 .XLS file), change this to 'Excel2007' (and adjust the filename extension, also the header mime type)
		//if you want to save it as .XLSX Excel 2007 format
		$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007'); 
		$objPHPExcel->setActiveSheetIndex(0);
	
		if (ob_get_contents()) ob_end_clean();
			//force user to download the Excel file without writing it to server's HD
			$objWriter->save('php://output'); 
      }

	//*******************************************karuppatti Reports***************************************//

	public function karuppatisuppliertotamt()
	{

      
		 
      $data['suppler_fill'] = isset($_POST['suppler_fill']) ? $_POST['suppler_fill'] : "";
      if($data['suppler_fill']!=''){

         $suppler_fill ="AND a.pur_sup='".$data['suppler_fill']."'";
         }
          else{
         $suppler_fill ='';
        }

        $data['dt_fill'] = $this->input->post('dt_fill');

        $data['from_date_fillter'] = $this->input->post('from_date_fillter');
        $data['to_date_fillter'] = $this->input->post('to_date_fillter');

        // print_r($data['from_date_fillter']);exit;
        $fdate ='';
        $tdate ='';
        //  print_r($data['dt_fill']);exit();
        if($data['dt_fill']=="all"){
            $fdate ='';
            $tdate ='';

        }
      
            if($data['dt_fill']=="today"){
            $data['today_date_fillter'] = date("Y-m-d");
            $fdate =" AND a.pur_date='".$data['today_date_fillter']."'";
            $tdate ='';
                
            
        }
        if($data['dt_fill']=="week"){
            $today=date('l');
            if($today=="Sunday"){
                $data['week_from_date_fillter']=date(' Y-m-d', strtotime("sunday 0 week"));
           
                $data['week_to_date_fillter']=date(' Y-m-d', strtotime("saturday 1 week"));
               // print_r($data['week_to_date_fillter']);exit;
                    $fdate =" AND a.pur_date>='".$data['week_from_date_fillter']."'";
                $tdate =" AND a.pur_date<='".$data['week_to_date_fillter']."'";

            }else{
             $data['week_from_date_fillter']=date(' Y-m-d', strtotime("sunday -1 week"));
           
             $data['week_to_date_fillter']=date('Y-m-d', strtotime("saturday 0 week"));
            //  print_r($data['week_to_date_fillter']);exit;
                 $fdate =" AND a.pur_date>='".$data['week_from_date_fillter']."'";
             $tdate =" AND a.pur_date<='".$data['week_to_date_fillter']."'";
            }
                     }
                    if($data['dt_fill']=="monthly"){
                   
                        $first=date('Y-m-01');
                        $last=date('Y-m-t');
                        $fdate =" AND a.pur_date>='".$first."'";
                        
                       
                            $tdate ="AND a.pur_date<='".$last."'";
                        }

                if($data['dt_fill']=="custom Date"){

                if($data['from_date_fillter']!=''){

                    $first=date('Y-m-d',strtotime($data['from_date_fillter']));
                    $fdate =" AND a.pur_date>='".$first."'";
                    
                    }
                    else{
                        $fdate ='';
                    }
                    if($data['dt_fill']=="custom Date"){
                if($data['from_date_fillter']!=''){
                    $first=date('Y-m-d',strtotime($data['from_date_fillter']));
                    $fdate =" AND a.pur_date>='".$first."'";
                    
                    }
                    else{
                        $fdate ='';
                    }
                    if($data['to_date_fillter']!=''){
                        $last=date('Y-m-d',strtotime($data['to_date_fillter']));
                        $tdate =" AND a.pur_date<='".$last."'";
                        
                        }
                        else{
                            $tdate ='';
                        } }
                    }
      


                    $data['fdate'] = $fdate;
                    $data['tdate'] = $tdate;
                    $data['supplier_name'] = $suppler_fill;
                   

                    // Advance Check
                    	$data['ad_check'] =isset($_POST['ad_check']) ? $_POST['ad_check'] : "";
                    if ($data['ad_check']==1) {


                     $data['ad_sts'] =isset($_POST['ad_valid']) ? $_POST['ad_valid'] : "";
                     $data['ad_amt'] =isset($_POST['availableamountval']) ? $_POST['availableamountval'] : "";
							$advance_ck ="AND a.pur_cash".$data['ad_sts'].$data['ad_amt']."";
                    	
                    }
                    else{
                    	 	$advance_ck ="";
                    	 	$data['ad_sts'] ='';
                     	$data['ad_amt'] ='';

                    }
                    // Balance Check
                    $data['bal_check'] =isset($_POST['bal_check']) ? $_POST['bal_check'] : "";
                    if ($data['bal_check']==1) {

                     $data['bal_sts'] =isset($_POST['bal_valid']) ? $_POST['bal_valid'] : "";
                     $data['bal_amt'] =isset($_POST['balamountval']) ? $_POST['balamountval'] : "";
							$balance_ck ="AND a.balance_cash".$data['bal_sts'].$data['bal_amt']."";
                    	
                    }
                    else{
                    	 	$balance_ck ="";
                    	 	$data['bal_sts'] ='';
                     	$data['bal_amt'] ='';

                    }

                    // purchase Amount Check
                    $data['pur_check'] =isset($_POST['pur_check']) ? $_POST['pur_check'] : "";
                    if ($data['pur_check']==1) {

                     $data['pur_sts'] =isset($_POST['pur_valid']) ? $_POST['pur_valid'] : "";
                     $data['pur_amt'] =isset($_POST['puramountval']) ? $_POST['puramountval'] : "";
							$purchase_ck ="AND a.pur_net_amt".$data['pur_sts'].$data['pur_amt']."";
                    	
                    }
                    else{
                    	 	$purchase_ck ="";
                    	 	$data['pur_sts'] ='';
                     	$data['pur_amt'] ='';

                    }

			$data['supplier_list']       = $this->Reports_model->getallsupplierdata($fdate,$tdate,$advance_ck,$balance_ck,$purchase_ck,$suppler_fill);

			// print_r($data['supplier_list']); exit();
			$data['suppliers_fill_list'] = $this->Akspurchase_model->getSupplier();
		$this->load->view('reports/karuppatti/karuppati_supplier_total_sum_of_amt',$data);
	}
	
	
	public function karuppati_sales_reports(){

		// ************************************** SALES *****************************************//


		$data['dt_fill'] = $this->input->post('dt_fill');

		$data['report_type'] = $this->input->post('report_type')?$this->input->post('report_type') :'most_sold_products';


        $data['from_date_fillter'] = $this->input->post('from_date_fillter');
        $data['to_date_fillter'] = $this->input->post('to_date_fillter');

        // print_r($data['from_date_fillter']);exit;
        $fdate ='';
        $tdate ='';
        //  print_r($data['dt_fill']);exit();
        if($data['dt_fill']=="all"){
            $fdate ='';
            $tdate ='';

        }
      
            if($data['dt_fill']=="today"){
            $data['today_date_fillter'] = date("Y-m-d");
            $fdate =" AND e.sale_date='".$data['today_date_fillter']."'";
            $tdate ='';
                
            
        }
        if($data['dt_fill']=="week"){
            $today=date('l');
            if($today=="Sunday"){
                $data['week_from_date_fillter']=date(' Y-m-d', strtotime("sunday 0 week"));
           
                $data['week_to_date_fillter']=date(' Y-m-d', strtotime("saturday 1 week"));
               // print_r($data['week_to_date_fillter']);exit;
                    $fdate =" AND e.sale_date>='".$data['week_from_date_fillter']."'";
                $tdate =" AND e.sale_date<='".$data['week_to_date_fillter']."'";

            }else{
             $data['week_from_date_fillter']=date(' Y-m-d', strtotime("sunday -1 week"));
           
             $data['week_to_date_fillter']=date('Y-m-d', strtotime("saturday 0 week"));
            //  print_r($data['week_to_date_fillter']);exit;
                 $fdate =" AND e.sale_date>='".$data['week_from_date_fillter']."'";
             $tdate =" AND e.sale_date<='".$data['week_to_date_fillter']."'";
            }
                     }
                    if($data['dt_fill']=="monthly"){
                   
                        $first=date('Y-m-01');
                        $last=date('Y-m-t');
                        $fdate =" AND e.sale_date>='".$first."'";
                        
                       
                            $tdate ="AND e.sale_date<='".$last."'";
                        }

                if($data['dt_fill']=="custom Date"){

                if($data['from_date_fillter']!=''){

                    $first=date('Y-m-d',strtotime($data['from_date_fillter']));
                    $fdate =" AND e.sale_date>='".$first."'";
                    
                    }
                    else{
                        $fdate ='';
                    }
                    if($data['dt_fill']=="custom Date"){
                if($data['from_date_fillter']!=''){
                    $first=date('Y-m-d',strtotime($data['from_date_fillter']));
                    $fdate =" AND e.sale_date>='".$first."'";
                    
                    }
                    else{
                        $fdate ='';
                    }
                    if($data['to_date_fillter']!=''){
                        $last=date('Y-m-d',strtotime($data['to_date_fillter']));
                        $tdate =" AND e.sale_date<='".$last."'";
                        
                        }
                        else{
                            $tdate ='';
                        } }
                    }    


            $data['fdate'] = $fdate;
            $data['tdate'] = $tdate;

			$data['most_sold_products'] = $this->db->query("
														   SELECT SUM(c.product_wgt) AS weight,SUM(c.price) AS saleprice, c.product_id ,p.AKS_PRD_NAME,pc.AKSCATEGORY_NAME,p.HSN_CODE,p.AKS_PRD_WT,p.AKS_PRD_IMG,p.AKS_PRD_PRICE,p.AKS_PRD_PRICE
															FROM AKS_SALE_CART c, AKS_SALE_ENTRY e ,AKS_PRD_MASTER p ,AKSPRODUCT_CATEGORY pc
															WHERE e.sale_id = c.sale_id 
															AND c.product_id = p.AKS_PRD_MID 
															AND c.product_id = p.AKS_PRD_MID 
															AND p.AKS_CAT_NAME = pc.AKSCATEGORY_ID 
															AND c.product_id !='' $fdate $tdate
															GROUP BY c.product_id , p.AKS_PRD_NAME ,p.HSN_CODE,p.AKS_PRD_WT,p.AKS_PRD_IMG,p.AKS_PRD_PRICE, pc.AKSCATEGORY_NAME 


														")->result_array();

			$frequent_buyers = $this->db->query("
												   SELECT COUNT(e.sale_id) AS totalorder, e.id_party, MAX(e.sale_id) AS max_sale_id, MAX(e.sale_date) AS max_date 
													FROM AKS_SALE_ENTRY AS e
													WHERE e.id_party != '' AND e.status = 'D' $fdate $tdate
													GROUP BY e.id_party
													ORDER BY totalorder DESC


												")->result_array();

			$data['frequent_buyers'] = [];

				foreach ($frequent_buyers as $i => $val) {
				    $saleid = $val['max_sale_id'];

				    $response = $this->db->query("SELECT * FROM AKS_SALE_ENTRY WHERE sale_id = '".$saleid."' AND status = 'D'")->row();

				    $data['frequent_buyers'][$i]['max_sale_date'] = $response->sale_date ? $response->sale_date : '';
				    $data['frequent_buyers'][$i]['max_sale_id'] = $response->sale_id ? $response->sale_id : '';

				    $data['frequent_buyers'][$i]['partyname'] = $response->sale_party ? $response->sale_party : '';
				    $data['frequent_buyers'][$i]['max_sale_prd_count'] = $response->sale_prd_count ? $response->sale_prd_count : '';

				    $data['frequent_buyers'][$i]['max_sale_deliverymode'] = $response->sale_deliverymode ? $response->sale_deliverymode : '';			   

				    if($response->sale_deliverymode=='Direct'){
				    	$delivery_by='Direct';
				    }else{
				    	$delivery_by=$response->delivery_by ? $response->delivery_by : '-';
				    }
				     $data['frequent_buyers'][$i]['max_delivery_by'] = $delivery_by;
				    $data['frequent_buyers'][$i]['max_sale_prd_tot_amt'] = $response->sale_prd_tot_amt ? $response->sale_prd_tot_amt : '';
				    $data['frequent_buyers'][$i]['max_sale_prd_tot_amt'] = $response->sale_prd_tot_amt ? $response->sale_prd_tot_amt : '';
				    $data['frequent_buyers'][$i]['max_shipment_charges'] = $response->shipment_charges ? $response->shipment_charges : '';
				    $data['frequent_buyers'][$i]['max_sale_dis_amt'] = $response->sale_dis_amt ? $response->sale_dis_amt : '';
				    $data['frequent_buyers'][$i]['max_sale_net_amt'] = $response->sale_net_amt ? $response->sale_net_amt : '';
				    $data['frequent_buyers'][$i]['sid'] = $response->sid ? $response->sid : '';

				    $price = floatval($response->sale_net_amt ? $response->sale_net_amt : '0');
					$gst   = 5;
				    $gst_amount  = ($gst * $price) / 100;
				    $gtotal      = $price + $gst_amount;
					// $tot_prices  = $price;
				    $data['frequent_buyers'][$i]['max_sale_grand_amt'] = $gtotal;
				    $data['frequent_buyers'][$i]['totalorders'] = $val['totalorder'];


				}


				$idle_customer = $this->db->query("
												   SELECT COUNT(e.sale_id) AS totalorder, e.id_party, MAX(e.sale_id) AS max_sale_id, MAX(sale_date) AS max_date 
													FROM AKS_SALE_ENTRY AS e
													WHERE e.id_party != '' AND e.status = 'D' $fdate $tdate
													GROUP BY e.id_party
													ORDER BY max_date ASC
												")->result_array();

			$data['idle_customer'] = [];

				foreach ($idle_customer as $i => $val) {
				    $saleid = $val['max_sale_id'];

				    $response = $this->db->query("SELECT * FROM AKS_SALE_ENTRY WHERE sale_id = '".$saleid."' AND status = 'D' ")->row();

				    $data['idle_customer'][$i]['max_sale_date'] = $response->sale_date ? $response->sale_date : '';
				    $data['idle_customer'][$i]['max_sale_id'] = $response->sale_id ? $response->sale_id : '';

				    $data['idle_customer'][$i]['partyname'] = $response->sale_party ? $response->sale_party : '';
				    $data['idle_customer'][$i]['max_sale_prd_count'] = $response->sale_prd_count ? $response->sale_prd_count : '';

				    $data['idle_customer'][$i]['max_sale_deliverymode'] = $response->sale_deliverymode ? $response->sale_deliverymode : '';
				   

				    if($response->sale_deliverymode=='Direct'){
				    	$delivery_by='Direct';
				    }else{
				    	$delivery_by=$response->delivery_by ? $response->delivery_by : '-';
				    }
				    $data['idle_customer'][$i]['max_delivery_by'] = $delivery_by;
				    $data['idle_customer'][$i]['max_sale_prd_tot_amt'] = $response->sale_prd_tot_amt ? $response->sale_prd_tot_amt : '';
				    $data['idle_customer'][$i]['max_sale_prd_tot_amt'] = $response->sale_prd_tot_amt ? $response->sale_prd_tot_amt : '';
				    $data['idle_customer'][$i]['max_shipment_charges'] = $response->shipment_charges ? $response->shipment_charges : '';
				    $data['idle_customer'][$i]['max_sale_dis_amt'] = $response->sale_dis_amt ? $response->sale_dis_amt : '';
				    $data['idle_customer'][$i]['max_sale_net_amt'] = $response->sale_net_amt ? $response->sale_net_amt : '';
				    $data['idle_customer'][$i]['sid'] = $response->sid ? $response->sid : '';

				    $price = floatval($response->sale_net_amt ? $response->sale_net_amt : '0');
					$gst   = 5;
				    $gst_amount  = ($gst * $price) / 100;
				    $gtotal      = $price + $gst_amount;
					// $tot_prices  = $price;
				    $data['idle_customer'][$i]['max_sale_grand_amt'] = $gtotal;
				    $data['idle_customer'][$i]['totalorders'] = $val['totalorder'];

				    $now  	   = time();
					$your_date = strtotime($response->sale_date);
					$datediff  = $now - $your_date;
					$diffdays  = round($datediff / (60 * 60 * 24));

					$remain = $diffdays;

					$data['idle_customer'][$i]['diffdays'] =  $diffdays.' Days';


				}



				$data['shipping'] = $this->db->query("SELECT * FROM AKS_SALE_ENTRY AS e WHERE sale_deliverymode!='Direct' AND status='D' $fdate $tdate ORDER BY sale_date DESC")->result_array();
				
				$data['delivery'] = $this->db->query("SELECT * FROM AKS_SALE_ENTRY AS e WHERE status='D' $fdate $tdate  ORDER BY sid DESC")->result_array();

			

			
			// print_r($data['delivery'][0]);
			// exit();
		$this->load->view('reports/karuppatti/karuppati_sales_reports',$data);
	}

   public function purchase_view()
    {
        $pid      = $_GET['id'];
        $data     = $this->db->query("SELECT * FROM AKS_PURCHASE_ENTRY WHERE pur_id= '".$pid."'")->result_array();
        echo json_encode($data[0]);   
    }
    public function view_table()
    {
        $plid = $_POST['id'];
        // print_r($plid); exit;
        // $count = $_POST['count'];
        $getid = $this->db->query("SELECT * FROM AKS_PURCHASE_ENTRY where pur_id='".$plid."' ")->row();
        $product_id = $getid->pur_id;
        $data['cart_view'] = $this->Akspurchase_model->get_cart_view($product_id);
         $i=1;
         $row='';
        
        foreach ($data['cart_view'] as $view) {
        $prdname  = $this->db->query("SELECT * FROM AKS_PRD_MASTER WHERE AKS_PRD_MID ='".$view['product_id']."' ")->row();

        $row.='<tr><td>'.($i).'</td><td>'.$prdname->AKS_PRD_NAME.'</td><td>'.$view["product_wgt"].'</td><td>'.$view["pur_price"].'/'.$prdname->AKS_PRD_WT.'</td><td>'.$view["price"].'</td></tr>';
          $i++;

          
        }

        echo $row;
       
   }
    public function payment_details(){

      $payment_id = $_POST['id'];
      // print_r($pdid); exit;
      
      $getid = $this->db->query("SELECT * FROM AKS_PURCHASE_ENTRY where pur_id='".$pdid."' ")->row();
      $payment_id = $getid->pur_id;

      $data['payment_detail'] = $this->Akspurchase_model->get_payment_details($payment_id);

      // print_r($data['cart_view']); exit;

      // foreach ($data['payment_detail'] as $pur_det) {
  

         $cash = $this->Akspurchase_model->get_cash($payment_id);
         // print_r($cash);exit;

         $cash_amount   =$cash->amount;
         $cash_detail   =$cash->remarks;

         // print_r($cash_detail);exit;
         
          $cheque = $this->Akspurchase_model->get_cheque($payment_id);
         // print_r($cheque);
          $cheque_amount    =$cheque->amount;
          $chq_refno        =$cheque->cheque_ref_no;
          $chq_sup_bank     =$cheque->party_bank;
          $chq_detail       =$cheque->remarks;


          $rtgs = $this->Akspurchase_model->get_rtgs($payment_id);
          // print_r($rtgs);
          $rtgs_amount      =$rtgs->amount;
          $rtgs_refno       =$rtgs->cheque_ref_no;
          $rtgs_cbank       =$rtgs->company_bank;
          $rtgs_detail      =$rtgs->remarks;

           $upi = $this->Akspurchase_model->get_upi($payment_id);
           // print_r($upi);exit;
           $upi_amount      =$upi->amount;
           $upi_refno       =$upi->cheque_ref_no;
           $upi_cbank       =$upi->company_bank;
           $upi_detail      =$upi->remarks;


           if($cash_amount>0){
           $cash_tr='
                    <tr>
                    <td><label class=" fw-semibold fs-5">Cash</label></td>
                    <td><label class=" fw-bold fs-7">'.$cash_amount.'</label></td>
                    <td>-</td>
                    <td>-</td>
                    <td><label class=" fw-bold fs-7">'.$cash_detail.'</label></td>
                    </tr>
                    ';
            }else{
               $cash_tr ='';
            }
            if($cheque_amount>0){
            $cheque_tr='
                    <tr>
                    <td><label class=" fw-semibold fs-5">Cheque</label></td>
                    <td><label class=" fw-bold fs-7">'.$cheque_amount.'</label></td>
                    <td><label class=" fw-bold fs-7">'.$chq_refno.'</label></td>
                    <td><label class=" fw-bold fs-7">'.$chq_sup_bank.'</label></td>
                    <td><label class=" fw-bold fs-7">'.$chq_detail.'</label></td>
                    </tr>';
            }
            else{$cheque_tr=''; }

            if($rtgs_amount>0){
            $rtgs_tr='<tr><td><label class=" fw-semibold fs-5">RTGS</label></td>
                      <td><label class=" fw-bold">'.$rtgs_amount.'</label></td>
                      <td><label class=" fw-bold">'.$rtgs_refno.'</label></td>
                      <td><label class=" fw-bold">'.$rtgs_cbank.'</label></td>
                      <td><label class=" fw-bold">'.$rtgs_detail.'</label></td></tr>';   
            }
            else{
               $rtgs_tr=''; 
            }

            if($upi_amount>0){
            $upi_pay=
                     '<tr><td><label class=" fw-semibold fs-5">UPI</label></td>
                      <td><label class=" fw-bold">'.$upi_amount.'</label></td>
                      <td><label class=" fw-bold">'.$upi_refno.'</label></td>
                      <td><label class=" fw-bold">'.$upi_cbank.'</label></td>
                      <td><label class=" fw-bold">'.$upi_detail.'</label></td></tr>';  
                    // echo  $upi_pay;  
                  }
                  else{
                    $upi_pay='';
                  }
             
                    // print_r($cheque_tr);exit;
             // echo ''.'||'.$cash_tr;


             echo ''.'||'.$cash_tr.'||'.$cheque_tr.'||'.$rtgs_tr.'||'. $upi_pay;   

           // echo ''.'||'.$cash_amount.'||'.$cash_detail.'||'.$cheque_amount.'||'.$chq_refno.'||'.$chq_sup_bank.'||'.$chq_detail.'||'.$rtgs_amount.'||'.$rtgs_refno.'||'.$rtgs_cbank.'||'.$rtgs_detail.'||'.$upi_amount.'||'.$upi_refno.'||'.$upi_cbank.'||'.$upi_detail.'||'.$cash_tr.'||'.$cheque_tr.'||'.$rtgs_tr.'||'. $upi_pay; 

    }


}
  
?>