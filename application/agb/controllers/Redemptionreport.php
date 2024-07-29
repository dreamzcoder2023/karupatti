<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/* ************************************************************************************
        Purpose : To handle all Department functions 2022-08-19
***************************************************************************************/
class Redemptionreport extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model(array("Redemptionreport_model"));
        $this->load->library('user_agent');
        if (isset($this->session->userdata['username']) && $this->session->userdata['username'] == TRUE)
        {
            //do something
        }else{
            redirect('login'); //if session is not there, redirect to login page
        } 
        date_default_timezone_set("Asia/Kolkata");
        $this->session->set_userdata('comtitle','Redemptionreport');
    }


    public function show_zonelist()

        {
           
            $data['zone_list'] = $this->Redemptionreport_model->get_zone_list();
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

            $data['area_list'] = $this->Redemptionreport_model->get_area_list($sno);
            // $this->load->view('loanlistview/listarea',$data);
            // print_r($data['area_list']);exit();
            echo "<option value=''>Select Area</option>";
            foreach($data['area_list'] as $arealist)
            {
               
                echo  "<option value= {$arealist['AREANAME']}>{$arealist['AREANAME']}</option>";
           
           }

        }

    public function show_citylist()

        {
            $zone_sno  = $_POST['zonevalue'];
            $area_sno  = $_POST['areavalue'];
            $data['city_list'] = $this->Redemptionreport_model->get_city_list($zone_sno,$area_sno);

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
            $data['village_list'] = $this->Redemptionreport_model->get_village_list($zone_sno,$area_sno,$city_sno);

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
            $data['street_list'] = $this->Redemptionreport_model->get_street_list($zone_sno,$area_sno,$city_sno,$village_sno);
            // print_r($data['city_list']);exit();
            echo "<option value=''>Select Street</option>";
            foreach($data['street_list'] as $streetlist)
            {
               echo "<option value= {$streetlist['STREETID']}>{$streetlist['STREETNAME']}</option>";
           
           }

        }

        public function selected_zone($sno)

        {

           return  $this->Redemptionreport_model->get_area_list($sno);

        }

        public function selected_area($zoneid,$areaid)

        {

           return  $this->Redemptionreport_model->get_city_list($zoneid,$areaid);

        }
        public function selected_city($zoneid,$areaid,$cityid)

        {

           return  $this->Redemptionreport_model->get_village_list($zoneid,$areaid,$cityid);

        }

        public function selected_village($zoneid,$areaid,$cityid,$villageid)

        {

           return  $this->Redemptionreport_model->get_street_list($zoneid,$areaid,$cityid,$villageid);

        }
 
    public function index()
    {
           
        $data['company_list'] = $this->Redemptionreport_model->get_company_list();
        $data['zone_list']    = $this->Redemptionreport_model->get_zone_list();
        $data['int_list']     = $this->Redemptionreport_model->get_interest_list();
        $data['int_grp_list'] = $this->Redemptionreport_model->get_interest_group_list();

        $company_redemreport= "";
        $area_redemreport=""; 
        $city_redemreport = "";
        $village_redemreport = "";
        $street_redemreport =  "";
        $status_redemreport = "";
        $interest = "";
        $interest_grp="";
        $redemption_days="";
        $wt_redem_textboxone='';
        $wt_redem_textboxtwo='';
       
        $company_redemreport  = $this->input->post('company_list_redemreport');
        $zone_redemreport     = $this->input->post('zone_list_redemreport');
        $area_redemreport     = $this->input->post('Area_list_redemreport');
        $city_redemreport     = $this->input->post('city_list_redemreport');
        $village_redemreport  = $this->input->post('village_list_redemreport');
        $street_redemreport   = $this->input->post('street_list_redemreport');

        $date_redemreport   = $this->input->post('select_date_redem');
        $int_select         = $this->input->post('int_select');
        $intgrpredem        = $this->input->post('int_group_redem_report_select');
        $redemption_days    = $this->input->post('int_radio_rem_nor_report');  
        $jewel_type         = $this->input->post('jewel_type');
        $loan_type          = $this->input->post('loan_type');
        $redem_bank         = $this->input->post('redem_bank');
        $redem_alter        = $this->input->post('redem_alter');
        $closing_type       = $this->input->post('closing_type');     

        $weight_select = $this->input->post('wt_radio_tbox_red_re'); 
        $weight_txtboxone=$this->input->post('wt_redem_textboxone');
        $weight_txtboxtwo=$this->input->post('wt_redem_textboxtwo');

        $amt = $this->input->post('amt_redem_tbox'); 
        $amt_txtboxone=$this->input->post('amt_redem_textone');
        $amt_txtboxtwo=$this->input->post('amt_redem_texttwo');

        $data['company_list_redemreport'] = $company_redemreport;
        $data['zone_list_redemreport']    = $zone_redemreport;
        $data['Area_list_redemreport']    = $area_redemreport;
        $data['city_list_redemreport']    = $city_redemreport;
        $data['village_list_redemreport'] = $village_redemreport;
        $data['street_list_redemreport']  = $street_redemreport;
        $data['int_select']                    = $int_select;
        $data['intgrpredem']                 = $intgrpredem;
        $date['date_redemreport']            = $date_redemreport;     
        
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
        $intgrpredem='';
        $closing='';
        $closing_all='';
        $intreport_all='';
        $weight_report='';
        $amtvw ='';
        $jewel ='';
        $bank='';
        $alter='';
        $loan='';
        $loan_all='';
        $jewel_all='';
        $date_return='';



       

        if(isset($company_redemreport)){

            // print_r($company_redemreport);exit;

            if($company_redemreport!='ALL'){

                $companyid = "AND LOANS.COMPANYCODE='".$company_redemreport."'";      
                    
            }else{
                $compid = 'ALL';
            }

            if($zone_redemreport!=''){

                $zoneid= "AND PARTIES.ZONE_SNO='".$zone_redemreport."'"; 
                
            }
                
            if($area_redemreport !=''){


                $areaid="AND PARTIES.AREA ='".$area_redemreport."'";

                $value = $this->selected_zone($zone_redemreport);

                $data['area_list'] =  $value;



                if($city_redemreport!=''){

                    $cityid="AND PARTIES.CITY ='".$city_redemreport."'";

                    $value = $this->selected_area($zone_redemreport,$area_redemreport);

                    $data['city_list'] =  $value;


                    if($village_redemreport!=''){

                        $villageid="AND PARTIES.ADDRESS2='".$village_redemreport."'";

                        $value = $this->selected_city($zone_redemreport,$area_redemreport,$city_redemreport);

                        $data['village_list'] = $value;

                        if($street_redemreport!=''){

                            $streetid="AND PARTIES.ADDRESS1='".$street_redemreport."'";

                            $value = $this->selected_village($zone_redemreport,$area_redemreport,$city_redemreport,$village_redemreport);

                            $data['street_list'] =  $value;

                        }

                    }

                }

            }
        }    
                            
                $date='';
                $from_date = $this->input->post('from_date');
                $to_date = $this->input->post('to_date');
                switch ($date_redemreport){

                case "daily":
                
                $c_from_date = date("Y-m-d",strtotime($from_date));
                // $fdexp = explode('-', $from_date);
                // $from_date = $fdexp[2].'-'.$fdexp[1].'-'.$fdexp[0];
                $data['from_date'] = $c_from_date;
                $date = "AND REDEMPTIONS.RETURNDATE ='".$c_from_date."'";
               
                
                break;

                case "monthly":
                $from_date='';
                $from_month = $this->input->post('from_month');
                $c_from_date = date("Y-m-d",strtotime($from_month));
                $data['from_month'] = $c_from_date;
                $c_from_year = date("Y",strtotime($from_month));
                $c_from_month = date("m",strtotime($from_month));

                $date = "AND YEAR(REDEMPTIONS.RETURNDATE)='".$c_from_year."' AND MONTH(REDEMPTIONS.RETURNDATE)='".$c_from_month."'";

                break;

                case "period":
          
                    if(isset($redemption_days)){

                        if(($redemption_days)=='redemption_days'){

                        $c_from_date = date("Y-m-d",strtotime($from_date));
                        $t_to_date = date("Y-m-d",strtotime($to_date));
                        $data['from_date'] = $c_from_date;
                        $data['to_date'] = $t_to_date;
                        $date_return = "AND LOANS.ENDATE>= '".$c_from_date."' AND REDEMPTIONS.RETURNDATE<= '".$t_to_date."'";
                        }
              
                        else{

                            $c_from_date = date("Y-m-d",strtotime($from_date));
                            $t_to_date = date("Y-m-d",strtotime($to_date));
                            $data['from_date'] = $c_from_date;
                            $data['to_date'] = $t_to_date;
                            $date_return = "AND REDEMPTIONS.RETURNDATE >= '".$c_from_date."' AND REDEMPTIONS.RETURNDATE<= '".$t_to_date."'";
                        }

                   } 
                break;
            }

                if($int_select!='ALL')
                    {
                        $intreport = "AND LOANS.INTERESTTYPE='".$int_select."'";
                    }
                    else{
                        $intreport_all = "ALL";
                    }
                    
                if($intgrpredem!='')

                    {
                        $intreport = "";
                        
                        $shortexp = explode("-",$intgrpredem);

                        $shortexp1 = str_split($shortexp[0],3);

                        $shortexp2 = explode(" ",$shortexp1[0]);
                        // print_r($shortexp1[0]);exit();

                        $intgrpredem = "AND LOANS.INTERESTTYPE LIKE '%".$shortexp2[0]."%'";

                         // echo $intgrppa;exit;
                    }

                if($weight_select == "="){

                    $weight_report = "AND LOANS.WEIGHT = '".$weight_txtboxone."'";

                    //echo $weight_txtboxone;exit;

                }else if($weight_select == "<"){

                    $weight_report = "AND LOANS.WEIGHT < '".$weight_txtboxone."'";

                }
         
                else if($weight_select == ">"){

                    $weight_report = "AND LOANS.WEIGHT > '".$weight_txtboxone."'";
                }

                else if($weight_select == "<="){

                    $weight_report = "AND LOANS.WEIGHT <= '".$weight_txtboxone."'";
                }

                else if($weight_select == ">="){

                    $weight_report = "AND LOANS.WEIGHT >= '".$weight_txtboxone."'";
                }  

                else if($weight_select == "between"){

                    $weight_report = "AND LOANS.WEIGHT BETWEEN '".$weight_txtboxone."' AND '".$weight_txtboxtwo."'";
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


                // if(isset($weight)){

                //     if($weight){
                //         if($weight_select == 'between'){

                //             $weight_report = '';
                //         }else{
                //             $weight_report = '';
                //         }
                //     }
                // }
                    
                if(isset($jewel_type)){
                
                    if($jewel_type == "GOLD"){

                            $jewel = "AND LOANS.JEWEL_TYPE='GOLD'";

                        }else if($jewel_type == "SILVER"){

                            $jewel = "AND LOANS.JEWEL_TYPE='SILVER'";

                        }else if($jewel_type == "STONE GOLD"){

                            $jewel = "AND LOANS.JEWEL_TYPE='STONE GOLD'";
                        }

                        else if($jewel_type == "ALL"){

                            $jewel_all = '';

                    }
                }


                if(isset($closing_type)){
                
                    if($closing_type == "pclose"){

                            $closing = "AND REDEMPTIONS.CLOSING_TYPE='CUSTOMER_CLOSE'";

                        }else if($closing_type == "ptransfer"){

                            $closing = "AND REDEMPTIONS.CLOSING_TYPE='CUSTOMER_TRANSFER'";

                        }else if($closing_type == "cclose"){

                            $closing = "AND REDEMPTIONS.CLOSING_TYPE='COMPANY_CLOSE'";
                        }

                        else if($closing_type == "ctransfer"){

                            $closing = "AND REDEMPTIONS.CLOSING_TYPE='COMPANY_TRANSFER'";

                        }
                
                        else if($closing_type == "transfer"){

                            $closing = "AND REDEMPTIONS.CLOSING_TYPE='TRANSFER'";

                        }

                        else if($closing_type == "ALL"){

                            $closing_all = "";

                        }

                }
           

                if(isset($loan_type)){
                
                    if($loan_type == "New"){

                        $loan = "AND LOANS.LOAN_TYPE='NEW'";

                    }else if($loan_type == "Renewal"){

                        $loan = "AND LOANS.LOAN_TYPE='RENEWAL'";

                    }else if($loan_type == "Auctioned"){

                        $loan = "AND LOANS.LOAN_TYPE='AUCTIONED'";
                    }

                    else if($loan_type == "ALL"){

                        $loan_all = '';

                    }
                }

                if(isset($redem_bank)){
                
                    if($redem_bank == "all_bank"){

                        $bank = "";

                    }else if($redem_bank == "bank"){

                        $bank = "AND LOANS.STATUS='BANK'";

                    }else if($redem_bank == "not_bank"){

                        $bank = "AND LOANS.STATUS=''";
                    }
                }

                if(isset($redem_alter)){
                
                    if($redem_alter == "all_alter"){

                        $alter = "";

                    }else if($redem_alter == "alter_altonly"){

                        $alter = "AND LOANS.ALT_REMARKS IS NOT NULL AND LOANS.ALT_REMARKS!=''";

                    }else if($redem_alter == "alter_notalt"){

                        $alter = "AND LOANS.ALT_REMARKS=''";
                    }
                }
                
       
        if($compid !='' || $companyid !='' || $zoneid !='' || $areaid !='' || $cityid !='' || $villageid !='' || $streetid !='' ||$date!='' ||$intreport!=''||$intgrpredem!=''|| $weight_report!='' ||$amtvw!='' ||$closing!='' ||$closing_all!='' ||$jewel!='' ||$jewel_all!='' ||$loan_all!='' ||$loan_type!='' ||$bank!=''||$alter!=''||$intreport_all!='' ||$date_return='')
        {
        
        // print_r($alter_remarks);exit();
            $data['redemption_list_view'] = $this->Redemptionreport_model->get_redemp_list($companyid,$zoneid,$areaid,$cityid,$villageid,$streetid,$date,$intreport,$intgrpredem,$weight_report,$amtvw,$jewel,$closing,$loan,$bank,$alter,$date_return);
        }
        else
        {   
            $data['redemption_list_view'] = array();
        }
    
        //print_r($zoneid);exit;
        $this->load->view('redemptionreport/redemptionreport',$data);

    }
    
}      