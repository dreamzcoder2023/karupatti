<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/* ************************************************************************************
		Purpose : To handle all Department functions 2022-08-19
***************************************************************************************/
class Loanslistview extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model(array("Loanslistview_model"));
    	$this->load->library('user_agent');
    	if (isset($this->session->userdata['username']) && $this->session->userdata['username'] == TRUE)
        {
            //do something
        }else{
            redirect('login'); //if session is not there, redirect to login page
        } 
		date_default_timezone_set("Asia/Kolkata");
    	$this->session->set_userdata('comtitle', 'Loanslistview');
	}

    public function show_zonelist()

        {
           
            $data['zone_list'] = $this->Loanslistview_model->get_zone_list();
            // $this->load->view('loanlistview/listarea',$data);
            // print_r($data['area_list']);exit();
           //  echo "<option value=''>Select Zone</option>";
           //  foreach($data['zone_list'] as $zonelist)
           //  {
               
           //      echo  "<option value= {$zonelist['SNO']}>{$zonelist['ZONENAME']}</option>";
           
           // }

        }
    public function show_arealist()

        {
            $sno  = $_POST['zone_id'];
            $data['area_list'] = $this->Loanslistview_model->get_area_list($sno );
            // $this->load->view('loanlistview/listarea',$data);
            // print_r($data['area_list']);exit();
            echo "<option value=''>Select Area</option>";
            foreach($data['area_list'] as $arealist)
            {
               
                echo  "<option value= {$arealist['SNO']}>{$arealist['AREANAME']}</option>";
           
           }

        }

        public function show_citylist()

        {
            $zone_sno  = $_POST['zonevalue'];
            $area_sno  = $_POST['areavalue'];
            $data['city_list'] = $this->Loanslistview_model->get_city_list($zone_sno,$area_sno);

            // echo $zone_sno,$area_sno;exit();    
            // print_r($data['city_list']);exit();
            // $empty = "";
             echo "<option value=''>Select City</option>";
            foreach($data['city_list'] as $citylist)
            {
               echo  "<option value= {$citylist['CITYID']}>{$citylist['CITYNAME']}</option>";
           
           }

        } 

        public function show_villagelist()

        {
            $zone_sno  = $_POST['zonevalue'];
            $area_sno  = $_POST['areavalue'];
            $city_sno  = $_POST['cityvalue'];
            $data['village_list'] = $this->Loanslistview_model->get_village_list($zone_sno,$area_sno,$city_sno);

            // echo $zone_sno,$area_sno;exit();    
            // print_r($data['city_list']);exit();
             echo "<option value=''>Select Village</option>";
            foreach($data['village_list'] as $villagelist)
            {
               echo  "<option value= {$villagelist['VILLAGEID']}>{$villagelist['VILLAGENAME']}</option>";
           
           }

        }

        public function show_streetlist()

        {
            $zone_sno  = $_POST['zonevalue'];
            $area_sno  = $_POST['areavalue'];
            $city_sno  = $_POST['cityvalue'];
            $village_sno  = $_POST['villagevalue'];
            $data['street_list'] = $this->Loanslistview_model->get_street_list($zone_sno,$area_sno,$city_sno,$village_sno);

            
            // print_r($data['city_list']);exit();
             echo "<option value=''>Select Street</option>";
            foreach($data['street_list'] as $streetlist)
            {
               echo  "<option value= {$streetlist['STREETID']}>{$streetlist['STREETNAME']}</option>";
           
           }

        } 

    public function index()
    {
        // $data['loanlist_view'] = $this->Loanslistview_model->get_option_list();
        

        // $from_date = $this->input->post('company_list_loanlistview');
        $from_date = '';
        $to_date = '';
        $wghtvw ='';
        $amtvw ='';
        $loan_type_all = '';
        $loan_type_selection = '';
        $status='';
        $company_list_loanlistview = $this->input->post('company_list_loanlistview');
        $zone_list_loanlistview = $this->input->post('zone_list_loanlistview');
        $area_list_loanlistview = $this->input->post('area_list_loanlistview');
        $city_list_loanlistview = $this->input->post('city_list_loanlistview');
        $village_list_loanlistview = $this->input->post('village_list_loanlistview');
        $street_list_loanlistview = $this->input->post('street_list_loanlistview');
        $int_list_loanlistview = $this->input->post('int_list_loanlistview');
        $int_grp_loanlistview = $this->input->post('int_grp_loanlistview');
        $loan_type_all = $this->input->post('loan_type_radio');
        $loan_type_selection = $this->input->post('loantype_loanlist_view_selection');
        $jewel_type_all = $this->input->post('loan_list_jeweltype');
        $jewel_type_selection = $this->input->post('jeweltype_loanlistview');
        $select_period = $this->input->post('loan_list_view_date');
        $amt_loanlistview = $this->input->post('amt_loanlistview'); 
        $amt_loanvw_textboxone = $this->input->post('amt_loanvw_textboxone');
        $amt_loanvw_textboxtwo = $this->input->post('amt_loanvw_textboxtwo');
        $wght_loanlistview = $this->input->post('wght_loanlistview'); 
        $wght_textboxone = $this->input->post('wght_textboxone');
        $wght_textboxtwo = $this->input->post('wght_textboxtwo');
        $select_status = $this->input->post('loanreport_status');
        $select_bank = $this->input->post('loanreport_bank');
        $select_alter = $this->input->post('loanreport_alter');

        // print_r($company_list_loanlistview);exit();

        $data['company_list_loanlistview'] = $company_list_loanlistview;
        $data['zone_list_loanlistview'] = $zone_list_loanlistview;
        $data['area_list_loanlistview'] = $area_list_loanlistview;
        $data['city_list_loanlistview'] = $city_list_loanlistview;
        $data['village_list_loanlistview'] = $village_list_loanlistview;
        $data['street_list_loanlistview'] = $street_list_loanlistview;
        $data['int_list_loanlistview'] = $int_list_loanlistview;
        $data['int_grp_loanlistview'] = $int_grp_loanlistview;
        $data['loan_type_all'] = $loan_type_all;
        $data['loan_type_selection'] = $loan_type_selection;
        $data['jewel_type_all'] = $jewel_type_all;
        $data['jewel_type_selection'] = $jewel_type_selection;
        $data['amt_loanlistview'] = $amt_loanlistview;
        $data['amt_loanvw_textboxone'] = $amt_loanvw_textboxone;
        $data['amt_loanvw_textboxtwo'] = $amt_loanvw_textboxtwo;
        $data['wght_loanlistview'] = $wght_loanlistview;
        $data['wght_textboxone'] = $wght_textboxone;
        $data['wght_textboxtwo'] = $wght_textboxtwo;

        // Select Input list
        $data['company_list'] = $this->Loanslistview_model->get_company_list();
        // $data['zone_list'] = $this->Loanslistview_model->get_zone_list();
        // // $data['area_list'] = $this->Loanslistview_model->get_area_list($zone_list_loanlistview);
        // $data['city_list'] = $this->Loanslistview_model->get_city_list();
        // $data['village_list'] = $this->Loanslistview_model->get_village_list();
        // $data['street_list'] = $this->Loanslistview_model->get_street_list();
        $data['int_list'] = $this->Loanslistview_model->get_interest_list();
        $data['int_grp_list'] = $this->Loanslistview_model->get_interest_group_list();


      //   //To dispaly area list
        

      

        if($company_list_loanlistview != '')
        {
            $cmplstvw = "AND COMPANY.COMPANYCODE='".$company_list_loanlistview."'";

        }
        else
        {
            $cmplstvw = "";
        }

        if($zone_list_loanlistview != '')
        {
            $zonelst = "AND P.ZONE_SNO='".$zone_list_loanlistview."'";

        }
        else
        {
            $zonelst = "";
        }

        if($village_list_loanlistview != '')
        {
            $vlstvw = "AND P.ADDRESS2='".$village_list_loanlistview."'";
        }
        else
        {
            $vlstvw = "";
        }

        // print_r($cmplstvw);exit();
        if($city_list_loanlistview != '')
        {
            $ctyvw = "AND P.CITY ='".$city_list_loanlistview."'";
        }
        else
        {
            $ctyvw = "";
        }

        if($street_list_loanlistview != '')
        {
            $stlstvw = "AND P.ADDRESS1='".$street_list_loanlistview."'";
        }
        else
        {
            $stlstvw = "";
        }

        if($area_list_loanlistview != '')
        {
            $area = "AND P.AREA ='".$area_list_loanlistview."'";
        }
        else
        {
            $area = "";
        }


        if($int_list_loanlistview != '')
        {
            $intlstvw = "AND I.INTNAME='".$int_list_loanlistview."'";
        }
        else{
            $intlstvw = "";
        }
        
        if($int_grp_loanlistview != '')
        {
            $intgrplstvw = "AND I.INT_GROUP='".$int_grp_loanlistview."'";
        }
        else
        {
            $intgrplstvw = "";
        }

        if($loan_type_all != '')
        {
            $loanall = "";
        }
        else
        {
            $loanall = "";
        }


        if($loan_type_selection == "NEW"){

            $loantypselect = "AND LOANS.LOAN_TYPE='NEW'";

        }else if($loan_type_selection == "RENEWAL")

        {

            $loantypselect = "AND LOANS.LOAN_TYPE='RENEWAL'";
        }
        
        else if ($loan_type_selection == "AUCTIONED")
        {
            $loantypselect = "AND LOANS.LOAN_TYPE='AUCTIONED'";
        }

        else
        {
            $loantypselect="";
        }
    

        if($jewel_type_all != '')
        {
            $jwlall = "";
        }
        else
        {
            $jwlall = "";
        }

        if($jewel_type_selection == "GOLD"){

            $jwltypselect = "AND LOANS.JEWEL_TYPE='GOLD'";

        }else if($jewel_type_selection == "SILVER")

        {

            $jwltypselect = "AND LOANS.JEWEL_TYPE='SILVER'";
        }
        
        else if($jewel_type_selection == "STONE GOLD")
        {
            $jwltypselect = "AND LOANS.JEWEL_TYPE='STONE GOLD'";
        }

        else

        {
             $jwltypselect = "";
        }


        if($wght_loanlistview == "="){

            $wghtvw = "AND LOANS.WEIGHT = '".$wght_textboxone."'";

        }else if($wght_loanlistview == "<"){

            $wghtvw = "AND LOANS.WEIGHT < '".$wght_textboxone."'";

        }
     
        else if($wght_loanlistview == ">"){

            $wghtvw = "AND LOANS.WEIGHT > '".$wght_textboxone."'";
        }

        else if($wght_loanlistview == "<="){

            $wghtvw = "AND LOANS.WEIGHT <= '".$wght_textboxone."'";
        }

        else if($wght_loanlistview == ">="){

            $wghtvw = "AND LOANS.WEIGHT >= '".$wght_textboxone."'";
        }  

        else if($wght_loanlistview == "between"){

            $wghtvw = "AND LOANS.WEIGHT BETWEEN '".$wght_textboxone."' AND '".$wght_textboxtwo."'";
        }

      
       if($amt_loanlistview == "="){

        $amtvw = "AND LOANS.AMOUNT = '".$amt_loanvw_textboxone."'";

        }else if($amt_loanlistview == "<"){

            $amtvw = "AND LOANS.AMOUNT < '".$amt_loanvw_textboxone."'";
        }
     
        else if($amt_loanlistview == ">"){

            $amtvw = "AND LOANS.AMOUNT > '".$amt_loanvw_textboxone."'";
        }

        else if($amt_loanlistview == "<="){

            $amtvw = "AND LOANS.AMOUNT <= '".$amt_loanvw_textboxone."'";
        }

        else if($amt_loanlistview == ">="){

            $amtvw = "AND LOANS.AMOUNT >= '".$amt_loanvw_textboxone."'";
        }  

        else if($amt_loanlistview == "between"){

            $amtvw = "AND LOANS.AMOUNT BETWEEN '".$amt_loanvw_textboxone."' AND '".$amt_loanvw_textboxtwo."'";
        }


        $date='';
        switch ($select_period) {
        case "daily":
        $from_date = $this->input->post('start_date');
        $c_from_date = date("Y-m-d",strtotime($from_date));
        // $fdexp = explode('-', $from_date);
        // $from_date = $fdexp[2].'-'.$fdexp[1].'-'.$fdexp[0];
        $data['from_date'] = $c_from_date;
        $date = "AND LOANS.ENDATE='".$c_from_date."'";
        // echo $c_from_date;exit();
        break;

        case "monthly":
        $from_date = $this->input->post('from_date');
        $c_from_date = date("Y-m-d",strtotime($from_date));
        $data['from_date'] = $c_from_date;
        $date = "AND LOANS.ENDATE='".$c_from_date."'";
        break;

        case "period":
        $from_date = $this->input->post('start_date');
        $to_date = $this->input->post('to_date');
        $c_from_date = date("Y-m-d",strtotime($from_date));
        $t_to_date = date("Y-m-d",strtotime($to_date));
        // $fdexp = explode('-', $from_date);
        // $from_date = $fdexp[2].'-'.$fdexp[1].'-'.$fdexp[0];
        // $to_date = $this->input->post('to_date');
        // $fdexp = explode('-', $to_date);
        // $to_date = $fdexp[2].'-'.$fdexp[1].'-'.$fdexp[0];
        $data['from_date'] = $c_from_date;
        $data['to_date'] = $t_to_date;
        $date = "AND LOANS.ENDATE BETWEEN '".$c_from_date."' AND '".$t_to_date."' ";
        // print_r($date);exit();
        break;

        }

       
        switch ($select_status) {
        case "all_status":
        // $from_date = $this->input->post('start_date');
        $status = "AND LOANS.ACTIVE='YN'";
        break;

        case "active_status":
        $status = "AND LOANS.ACTIVE='Y'";
        break;

        case "closed_status":
        $status = "AND LOANS.ACTIVE='N'";      
        // print_r($status);exit();
        break;
        }


        $bank_status='';
        switch ($select_bank) {
        case "all_bank":
        $bank_status = "AND LOANS.STATUS=''";
        break;

        case "bank":
        $bank_status = "AND LOANS.STATUS='BANK'";
        break;

        case "not_bank":
        $bank_status = "AND LOANS.STATUS=''";      
        // print_r($date);exit();
        break;
        }


        $alter_remarks='';
        switch ($select_alter) {
        case "all_alter":
        $alter_remarks = "AND LOANS.ALT_REMARKS=''";
        break;

        case "alter_altonly":
        $alter_remarks = "AND LOANS.ALT_REMARKS IS NOT NULL AND LOANS.ALT_REMARKS!=''";
        break;


        
        case "alter_notalt":
        $alter_remarks = "AND LOANS.ALT_REMARKS=''";      
        // print_r($date);exit();
        break;
        }

        // print_r($alter_remarks);exit();



        
        
        // print_r($alter_remarks);exit();
        $data['loan_list_view'] = $this->Loanslistview_model->get_loanlist_view($cmplstvw,$zonelst,$ctyvw,$vlstvw,$stlstvw,$area,$intlstvw,$intgrplstvw,$loanall,$loantypselect,$jwlall,$jwltypselect,$date,$amtvw,$wghtvw, $status,$bank_status,$alter_remarks);
          
            //$data['loan_list_view'] = array();
        

        // print_r($data);exit();

        $data['zone_list'] = $this->Loanslistview_model->get_zone_list();

        $this->load->view('loanslistview/loanlistview',$data);
       
    }

}
?>