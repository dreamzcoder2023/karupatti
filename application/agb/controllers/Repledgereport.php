<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/* ************************************************************************************
        Purpose : To handle all Department functions 2022-08-19
***************************************************************************************/
class Repledgereport extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model(array("Repledgereport_model"));
        $this->load->library('user_agent');
        if (isset($this->session->userdata['username']) && $this->session->userdata['username'] == TRUE)
        {
            //do something
        }else{
            redirect('login'); //if session is not there, redirect to login page
        } 
        date_default_timezone_set("Asia/Kolkata");
        $this->session->set_userdata('comtitle','Repledgereport');
    }

    public function index()

    {
       
        $data['company_list'] = $this->Repledgereport_model->get_company_list();
        $data['int_list']     = $this->Repledgereport_model->get_interest_list();
        $data['bank_list']    = $this->Repledgereport_model->get_bank_list();
        $data['staff_list']   = $this->Repledgereport_model->get_staff_list();

        $company_replreport   = $this->input->post('company_list_repledgereport');
        $interest_replreport  = $this->input->post('interest_repledgerpt');
        $bank_replreport      = $this->input->post('bank_repledgerpt');
        $staff_repledgerpt    = $this->input->post('staff_repledgerpt');
        $report_view          = $this->input->post('re_re_radio');
        $date_view            = $this->input->post('date_replreport');
        $type_view            = $this->input->post('rp_report_radio');
        $bank_check            = $this->input->post('bank_check');
        $staff_check            = $this->input->post('staff_check');

        $select_replstatus    = $this->input->post('repledge_r_radio');
        $select_replmixed     = $this->input->post('repledge_radio');
        $select_redemp_days   = $this->input->post('int_radio_repl_nor_report');
        $weight               = $this->input->post('wt_radio_tbox_repl_re'); 
        $weight_txtboxone     = $this->input->post('wgt_repl_textboxone');
        $weight_txtboxtwo     = $this->input->post('wgt_repl_textboxtwo');

        $data['company_replreport']   = $company_replreport;
        $data['interest_replreport']  = $interest_replreport;
        $data['bank_replreport']      = $bank_replreport;
        $data['staff_repledgerpt']    = $staff_repledgerpt;
 
        $compid='';
        $companyid ='';
        $interestid='';
        $intid='';
        $bankid='';
        $staffid='';
        $weight_report='';
        $status='';
        $mixstatus ='';
        $days='';
        $date_return='';
        $date='';
        $bank_check=''; 
        $typestatus='';

        if(isset($company_replreport)){

            // print_r($company_recptreport);exit;

            if($company_replreport!='ALL'){

                $companyid = "AND REPLEDGE_MASTER.COMPANYCODE='".$company_replreport."'";      
                    
            }else{
                $compid = 'ALL';
            }

        }

        //  echo $company_replreport;exit;

        if(isset($interest_replreport)){


            if($interest_replreport!='ALL'){

                $interestid = "AND REPLEDGE_MASTER.INTEREST='".$interest_replreport."'";

            }

            else{

            $intid='ALL';

            }
        }

        if(isset($bank_check)){

            if(isset($bank_replreport)){

                if($bank_replreport){

                $bankid = "AND REPLEDGE_MASTER.BANK='".$bank_replreport."'";

            }
        } 

        }
   
        if($staff_check){

             if(isset($staff_repledgerpt)){
            
                if($staff_repledgerpt){

                $staffid = "AND REPLEDGE_MASTER.STAFF='".$staff_repledgerpt."'";
                }
            }

        }
       

        // if($weight == "="){

        //     $weight_report = "AND NETWEIGHT = '".$weight_txtboxone."'";

        //         //echo $weight_txtboxone;exit;

        //     }else if($weight == "<"){

        //         $weight_report = "AND NETWEIGHT < '".$weight_txtboxone."'";

        //     }
     
        //     else if($weight == ">"){

        //         $weight_report = "AND NETWEIGHT > '".$weight_txtboxone."'";
        //     }

        //     else if($weight == "<="){

        //         $weight_report = "AND NETWEIGHT <= '".$weight_txtboxone."'";
        //     }

        //     else if($weight == ">="){

        //         $weight_report = "AND NETWEIGHT <= '".$weight_txtboxone."'";
                
        //     }else if($weight == "between"){

        //         $weight_report = "AND NETWEIGHT BETWEEN '".$weight_txtboxone."' AND '".$weight_txtboxtwo."'";

        //     }


            if(isset($weight)){

                if($weight_txtboxone){
                    if($weight == "between"){

                        $weight_report = "AND NETWEIGHT>=  '".$weight_txtboxone."' AND NETWEIGHT<='".$weight_txtboxtwo."'";
                    
                    }else{
                        $weight_report = "AND NETWEIGHT $weight '".$weight_txtboxone."'";
                    }
                }

            } 

            if(isset($report_view)){

                if($report_view == '1'){

                    $date_return='';
                    $from_date = $this->input->post('from_date');
                    $to_date = $this->input->post('to_date');

                    switch ($date_view){

                        case "daily":
                        
                            $c_from_date = date("Y-m-d",strtotime($from_date));
                            
                            $data['from_date'] = $c_from_date;
                            $date_return = "AND REPLEDGE_RETURN.RETURN_DATE>='".$c_from_date."'";
                        
                        
                        
                        break;

                        case "monthly":
                            $from_date='';
                            $from_month = $this->input->post('from_month');
                            $c_from_date = date("Y-m-d",strtotime($from_month));
                            $data['from_month'] = $c_from_date;
                            $c_from_year = date("Y",strtotime($from_month));
                            $c_from_month = date("m",strtotime($from_month));

                            $date_return = "AND MONTH(REPLEDGE_RETURN.RETURN_DATE)='".$c_from_month."' AND YEAR(REPLEDGE_RETURN.RETURN_DATE)='".$c_from_year."' ";
                       
                        
                        break;

                        case "period":


                            if(isset($select_redemp_days)){

                                if(($select_redemp_days)=='redemption_days'){

                                $c_from_date = date("Y-m-d",strtotime($from_date));
                                $t_to_date = date("Y-m-d",strtotime($to_date));
                                $data['from_date'] = $c_from_date;
                                $data['to_date'] = $t_to_date;
                                $date_return = "AND REPLEDGE_MASTER.ENDATE>= '".$c_from_date."' AND REPLEDGE_RETURN.RETURN_DATE<= '".$t_to_date."'";
                                }
                      
                                else{
                                    $c_from_date = date("Y-m-d",strtotime($from_date));
                                    $t_to_date = date("Y-m-d",strtotime($to_date));
                                    $data['from_date'] = $c_from_date;
                                    $data['to_date'] = $t_to_date;
                                    $date_return = "AND REPLEDGE_RETURN.RETURN_DATE>= '".$c_from_date."' AND REPLEDGE_RETURN.RETURN_DATE<= '".$t_to_date."'";
                                }

                           } 
                        break;

                        }

                }else if($report_view == '2'){

                    $date_return='';
                    $from_date = $this->input->post('from_date');
                    $to_date = $this->input->post('to_date');

                    switch ($date_view){

                        case "daily":
                        
                            $c_from_date = date("Y-m-d",strtotime($from_date));
                            
                            $data['from_date'] = $c_from_date;
                            $date_return = "AND REPLEDGE_DETAILS.ENDATE='".$c_from_date."'";
                        
                        break;

                        case "monthly":
                            $from_date='';
                            $from_month = $this->input->post('from_month');
                            $c_from_date = date("Y-m-d",strtotime($from_month));
                            $data['from_month'] = $c_from_date;
                            $c_from_year = date("Y",strtotime($from_month));
                            $c_from_month = date("m",strtotime($from_month));

                            $date_return = "AND MONTH(REPLEDGE_DETAILS.ENDATE)='".$c_from_month."' AND YEAR(REPLEDGE_DETAILS.ENDATE)='".$c_from_year."' ";

                        break;

                        case "period":

                            $c_from_date = date("Y-m-d",strtotime($from_date));
                            $t_to_date = date("Y-m-d",strtotime($to_date));
                            $data['from_date'] = $c_from_date;
                            $data['to_date'] = $t_to_date;
                            $date_return = "AND REPLEDGE_DETAILS.ENDATE>= '".$c_from_date."' AND REPLEDGE_DETAILS.ENDATE<= '".$t_to_date."'";

                        break;

                        }

                }

                else{

                    $date='';
                    $from_date = $this->input->post('from_date');
                    $to_date = $this->input->post('to_date');

                    switch ($date_view){

                        case "daily":
                        
                            $c_from_date = date("Y-m-d",strtotime($from_date));
                            $data['from_date'] = $c_from_date;
                            $date = "AND REPLEDGE_MASTER.ENDATE>='".$c_from_date."'";
                       
                        
                        break;

                        case "monthly":
                            $from_date='';
                            $from_month = $this->input->post('from_month');
                            $c_from_date = date("Y-m-d",strtotime($from_month));
                            $data['from_month'] = $c_from_date;
                            $c_from_year = date("Y",strtotime($from_month));
                            $c_from_month = date("m",strtotime($from_month));

                            $date = "AND MONTH(REPLEDGE_MASTER.ENDATE)='".$c_from_month."' AND YEAR(REPLEDGE_MASTER.ENDATE)='".$c_from_year."' ";
                       
                        
                        break;

                        case "period":
                  
                            $c_from_date = date("Y-m-d",strtotime($from_date));
                            $t_to_date = date("Y-m-d",strtotime($to_date));
                          
                            $data['from_date'] = $c_from_date;
                            $data['to_date'] = $t_to_date;
                            $date = "AND REPLEDGE_MASTER.ENDATE BETWEEN '".$c_from_date."' AND '".$t_to_date."'";
                        break;

                    }
                }
            }  

            switch ($select_replstatus) {

                case "active_rere":
                    $status = "AND REPLEDGE_MASTER.ACTIVE='Y'";
                break;

                case "closed_rere":
                    $status = "AND REPLEDGE_MASTER.ACTIVE='N'";      
                // print_r($status);exit();
                break;

                case "all_rere":
                    $status = "";      
                // print_r($status);exit();
                break;

            }

            switch ($select_replmixed) {

                case "single":
                    $mixstatus = "AND REPLEDGE_MASTER.MIXED ='N'";
                break;

                case "mixed":
                    $mixstatus = "AND REPLEDGE_MASTER.MIXED ='Y'";      
                // print_r($status);exit();
                break;

                case "all":
                    $mixstatus = "";      
                    // print_r($status);exit();
                break;
            }

            switch ($type_view) {

                case "listview":
                    $typestatus = "L";
                    $data['typestatus']=$typestatus;
                break;

                case "groupview":
                    $typestatus = "G"; 
                    $data['typestatus']=$typestatus;     
                // print_r($status);exit();
                break;

                case "summary":
                    $typestatus = "S";
                    $data['typestatus']=$typestatus;      
                    // print_r($status);exit();
                break;
            }

            if(isset($int_radio_repl_nor_report)){


                if($int_radio_repl_nor_report=='redemption_days'){

                    $days = $select_redemp_days;

                    $c_from_date = date("Y-m-d",strtotime($from_date));
                    $t_to_date = date("Y-m-d",strtotime($to_date));
                    $data['from_date'] = $c_from_date;
                    $data['to_date'] = $t_to_date;
                    $date = "AND REPLEDGE_MASTER.ENDATE BETWEEN '".$c_from_date."' AND '".$t_to_date."'";

                }else{

                    $c_from_date = date("Y-m-d",strtotime($from_date));
                    // $fdexp = explode('-', $from_date);
                    // $from_date = $fdexp[2].'-'.$fdexp[1].'-'.$fdexp[0];
                    $data['from_date'] = $c_from_date;
                    $date = "AND REPLEDGE_MASTER.ENDATE>='".$c_from_date."'";

                }
            }

        if($typestatus!=''||$compid !='' || $companyid !='' || $interestid != '' ||$intid !=''||$bankid!=''||$staffid!='' ||$date!=''||$status!=''||$mixstatus!=''||$date_return!=''||$weight_report!='')
        {
        
        // print_r($alter_remarks);exit();
            $data['repledged_list_view'] = $this->Repledgereport_model->get_repledge_return_list($companyid,$interestid,$bankid,$report_view,$date,$status,$mixstatus,$weight_report,$staffid,$date_return,$typestatus);
        }
        else
        {   
            $data['repledged_list_view'] = array();
        }


        //print_r($data['repledged_list_view']) ;exit();
        $this->load->view('repledgereport/repledgereport',$data);

    }
    
    
}      