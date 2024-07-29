<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/* ************************************************************************************
        Purpose : To handle all Department functions 2022-08-19
***************************************************************************************/
class Receiptsreport extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model(array("Receiptsreport_model"));
        $this->load->library('user_agent');
        if (isset($this->session->userdata['username']) && $this->session->userdata['username'] == TRUE)
        {
            //do something
        }else{
            redirect('login'); //if session is not there, redirect to login page
        } 
        date_default_timezone_set("Asia/Kolkata");
        $this->session->set_userdata('comtitle','Receiptsreport');
    }


    public function show_zonelist()

        {
           
            $data['zone_list'] = $this->Receiptsreport_model->get_zone_list();
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

            $data['area_list'] = $this->Receiptsreport_model->get_area_list($sno);
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
            $data['city_list'] = $this->Receiptsreport_model->get_city_list($zone_sno,$area_sno);

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
            $data['village_list'] = $this->Receiptsreport_model->get_village_list($zone_sno,$area_sno,$city_sno);

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
            $data['street_list'] = $this->Receiptsreport_model->get_street_list($zone_sno,$area_sno,$city_sno,$village_sno);
            // print_r($data['city_list']);exit();
            echo "<option value=''>Select Street</option>";
            foreach($data['street_list'] as $streetlist)
            {
               echo "<option value= {$streetlist['STREETID']}>{$streetlist['STREETNAME']}</option>";
           
           }

        }

        public function selected_zone($sno)

        {

           return  $this->Receiptsreport_model->get_area_list($sno);

        }

        public function selected_area($zoneid,$areaid)

        {

           return  $this->Receiptsreport_model->get_city_list($zoneid,$areaid);

        }
        public function selected_city($zoneid,$areaid,$cityid)

        {

           return  $this->Receiptsreport_model->get_village_list($zoneid,$areaid,$cityid);

        }

        public function selected_village($zoneid,$areaid,$cityid,$villageid)

        {

           return  $this->Receiptsreport_model->get_street_list($zoneid,$areaid,$cityid,$villageid);

        }

    
     public function index()
     {
           
        $data['company_list'] = $this->Receiptsreport_model->get_company_list();
        $data['zone_list'] = $this->Receiptsreport_model->get_zone_list();
        $data['int_list'] = $this->Receiptsreport_model->get_interest_list();
        $data['int_grp_list'] = $this->Receiptsreport_model->get_interest_group_list();
        // $data['phone_Receiptsreport'] = $this->Receiptsreport_model->get_phone_list();
        // $data['Jwl_list'] = $this->Receiptsreport_model->get_jewel_list();
        // // // $data['amt_list'] = $this->Receiptsreport->get_amount_list();
        // $data['active_list'] = $this->Receiptsreport_model->get_active_list();
        // $data['closed_list'] = $this->Receiptsreport_model->get_closed_list();


        $company_recptreport= "";
        $area_recptreport=""; 
        $city_recptreport = "";
        $village_recptreport = "";
        $street_recptreport =  "";
        $status_recptreport = "";
        $principal_check = "";
        $interest = "";
        $interest_grp="";
       
        $company_recptreport  = $this->input->post('company_list_receiptsreport');
        $zone_recptreport     = $this->input->post('zone_list_receiptsreport');
        $area_recptreport     = $this->input->post('Area_list_receiptsreport');
        $city_recptreport     = $this->input->post('city_list_receiptsreport');
        $village_recptreport  = $this->input->post('village_list_receiptsreport');
        $street_recptreport   = $this->input->post('street_list_receiptsreport');

        $status_recptreport   = $this->input->post('all_rcptreport');
        $date_recptreport   = $this->input->post('selection_date');
        $principal_check   = $this->input->post('principal_check');
        $interest = $this->input->post('int_radio_tbox_re_re_report');
        $interestgrp = $this->input->post('int_group_radio_tbox_re_re_report');

        $weight = $this->input->post('wt_radio_tbox_re_re'); 
        $weight_txtboxone=$this->input->post('wt_radio_textboxone');
        $weight_txtboxtwo=$this->input->post('wt_radio_textboxtwo');

        $amt = $this->input->post('amount_rptrpt'); 
        $amt_txtboxone=$this->input->post('amount_textone');
        $amt_txtboxtwo=$this->input->post('amount_texttwo');

        $data['company_list_receiptsreport'] = $company_recptreport;
        $data['zone_list_receiptsreport']    = $zone_recptreport;
        $data['Area_list_receiptsreport']    = $area_recptreport;
        $data['city_list_receiptsreport']    = $city_recptreport;
        $data['village_list_receiptsreport'] = $village_recptreport;
        $data['street_list_receiptsreport']  = $street_recptreport;
        $data['status_recptreport']          = $status_recptreport;
        $data['principal_check']             = $principal_check;
        $data['interest']                    = $interest;
        $data['interestgrp']                 = $interestgrp;
        $date['date_recptreport']            = $date_recptreport;     
        

        $compid='';
        $companyid='';
        $zoneid='';
        $areaid='';
        $cityid='';
        $villageid='';
        $streetid='';
        $status='';
        $select_period='';
        $intreport='';
        $intgrprr='';
        $weightreport='';
        $amtvw='';
        $pc='';
       

        if(isset($company_recptreport)){

            // print_r($company_recptreport);exit;

            if($company_recptreport!='ALL'){

                $companyid = "AND LOANS.COMPANYCODE='".$company_recptreport."'";      
                    
            }else{
                $compid = 'ALL';
            }

            if($zone_recptreport!=''){

                $zoneid= "AND PARTIES.ZONE_SNO='".$zone_recptreport."'"; 
                
            }
                
            if($area_recptreport !=''){


                $areaid="AND PARTIES.AREA ='".$area_recptreport."'";

                $value = $this->selected_zone($zone_recptreport);

                $data['area_list'] =  $value;



                if($city_recptreport!=''){

                    $cityid="AND PARTIES.CITY ='".$city_recptreport."'";

                    $value = $this->selected_area($zone_recptreport,$area_recptreport);

                    $data['city_list'] =  $value;


                    if($village_recptreport!=''){

                        $villageid="AND PARTIES.ADDRESS2='".$village_recptreport."'";

                        $value = $this->selected_city($zone_recptreport,$area_recptreport,$city_recptreport);

                        $data['village_list'] = $value;

                        if($street_recptreport!=''){

                            $streetid="AND PARTIES.ADDRESS1='".$street_recptreport."'";

                            $value = $this->selected_village($zone_recptreport,$area_recptreport,$city_recptreport,$village_recptreport);

                            $data['street_list'] =  $value;

                        }

                    }

                }

            }
            
                
            switch ($status_recptreport) {
           
                case "active":
                $status = "AND LOANS.ACTIVE='Y'";
                break;

                case "closed":
                $status = "AND LOANS.ACTIVE='N'";      
                // print_r($status);exit();
                break;
            }


                $date='';
                $from_date = $this->input->post('from_date');
                $to_date = $this->input->post('to_date');
                switch ($date_recptreport){

                case "daily":
                
                $c_from_date = date("Y-m-d",strtotime($from_date));
                // $fdexp = explode('-', $from_date);
                // $from_date = $fdexp[2].'-'.$fdexp[1].'-'.$fdexp[0];
                $data['from_date'] = $c_from_date;
                $date = "AND RECEIPT_MASTER.RECEIPT_DATE='".$c_from_date."'";
               
                
                break;

                case "monthly":
                $from_date='';
                $from_month = $this->input->post('from_month');
                $c_from_date = date("Y-m-d",strtotime($from_month));
                $data['from_month'] = $c_from_date;
                $c_from_year = date("Y",strtotime($from_month));
                $c_from_month = date("m",strtotime($from_month));

                $date = "AND YEAR(RECEIPT_MASTER.RECEIPT_DATE)='".$c_from_year."' AND MONTH(RECEIPT_MASTER.RECEIPT_DATE)='".$c_from_month."'";
               
                
                break;

                case "period":
          
                $c_from_date = date("Y-m-d",strtotime($from_date));
                $t_to_date = date("Y-m-d",strtotime($to_date));
                // $fdexp = explode('-', $from_date);
                // $from_date = $fdexp[2].'-'.$fdexp[1].'-'.$fdexp[0];
                // $to_date = $this->input->post('to_date');
                // $fdexp = explode('-', $to_date);
                // $to_date = $fdexp[2].'-'.$fdexp[1].'-'.$fdexp[0];
                $data['from_date'] = $c_from_date;
                $data['to_date'] = $t_to_date;
                $date = "AND RECEIPT_MASTER.RECEIPT_DATE BETWEEN '".$c_from_date."' AND '".$t_to_date."' ";
                // print_r($date);exit();
                break;

                }

                if($interest!='ALL')
                    {
                        $intreport = "AND LOANS.INTERESTTYPE='".$interest."'";
                    }
                    else{
                        $intreport = "";
                    }
                    
                if($interestgrp!='')

                    {
                        $intreport = "";
                        
                        $shortexp = explode("-",$interestgrp);

                        $shortexp1 = str_split($shortexp[0],3);

                        $shortexp2 =explode(" ",$shortexp1[0]);
                        // print_r($shortexp1[0]);exit();

                        $intgrprr = "AND LOANS.INTERESTTYPE LIKE '%".$shortexp2[0]."%'";

                         // echo $intgrppa;exit;
                    }

                if($weight == "="){

                    $weightreport = "AND LOANS.WEIGHT = '".$weight_txtboxone."'";

                    //echo $weight_txtboxone;exit;

                }else if($weight == "<"){

                    $weightreport = "AND LOANS.WEIGHT < '".$weight_txtboxone."'";

                }
         
                else if($weight == ">"){

                    $weightreport = "AND LOANS.WEIGHT > '".$weight_txtboxone."'";
                }

                else if($weight == "<="){

                    $weightreport = "AND LOANS.WEIGHT <= '".$weight_txtboxone."'";
                }

                else if($weight == ">="){

                    $weightreport = "AND LOANS.WEIGHT >= '".$weight_txtboxone."'";
                }  

                else if($weight == "between"){

                    $weightreport = "AND LOANS.WEIGHT BETWEEN '".$weight_txtboxone."' AND '".$weight_txtboxtwo."'";
                }

                if($amt == "="){

                    $amtvw = "AND LOANS.AMOUNT = '".$amt_txtboxone."'";

                    }else if($amt == "<"){

                        $amtvw = "AND LOANS.AMOUNT < '".$amt_txtboxone."'";
                    }
                 
                    else if($amt == ">"){

                        $amtvw = "AND LOANS.AMOUNT > '".$amt_txtboxone."'";
                    }

                    else if($amt == "<="){

                        $amtvw = "AND LOANS.AMOUNT <= '".$amt_txtboxone."'";
                    }

                    else if($amt == ">="){

                        $amtvw = "AND LOANS.AMOUNT >= '".$amt_txtboxone."'";
                    }  

                    else if($amt == "between"){

                        $amtvw = "AND LOANS.AMOUNT BETWEEN '".$amt_txtboxone."' AND '".$amt_txtboxtwo."'";
                    }

                    if(isset($principal_check)){


                        $pc="AND PRINCIPAL > 0";

                    }


        


        }

       
        if($compid !='' || $companyid !='' || $zoneid !='' || $areaid !='' || $cityid !='' || $villageid !='' || $streetid !='' || $status != ''||$date='' ||$intreport=''||$intgrprr=''|| $weightreport='' ||$amtvw=''||$pc)
        {
        
        // print_r($alter_remarks);exit();
            $data['receipt_list_view'] = $this->Receiptsreport_model->get_receipts_list($companyid,$zoneid,$areaid,$cityid,$villageid,$streetid,$status,$date,$intreport,$intgrprr,$weightreport,$amtvw,$pc);
        }
        else
        {   
            $data['receipt_list_view'] = array();
        }
    

        $this->load->view('receiptsreport/receiptsreport',$data);

    }
    
}      