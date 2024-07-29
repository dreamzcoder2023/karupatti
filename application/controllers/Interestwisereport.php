<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/* ************************************************************************************
		Purpose : To handle all Department functions 2022-08-19
***************************************************************************************/
class Interestwisereport extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model(array("Interestwise_model"));
    	$this->load->library('user_agent');
    	if (isset($this->session->userdata['username']) && $this->session->userdata['username'] == TRUE)
        {
            //do something
        }else{
            redirect('login'); //if session is not there, redirect to login page
        } 
		date_default_timezone_set("Asia/Kolkata");
    	$this->session->set_userdata('comtitle', 'Interestwisereport');
	}

     public function index()
     {
        $data['interestwise_list'] = $this->Interestwise_model->get_option_list();
      
        $intwisebillno = $this->input->post('intwisebillno');
        $intwiseinttype = $this->input->post('intwiseinttype');
        $intwiseperiod = $this->input->post('intwiseperiod');
        $intwisename = $this->input->post('intwisename');
        $intwiseactive = $this->input->post('intwiseactive');
        $report = $this->input->post('int_report');
        $intwiseamountasc ='';
        $intwiseloandateasc = '';
        $data['intwisebillno'] = $intwisebillno;
        $data['intwiseinttype'] = $intwiseinttype;
        $data['intwiseperiod'] = $intwiseperiod;
        $data['intwisename'] = $intwisename;
        $data['intwiseactive'] = $intwiseactive;
        $data['intwiseloandateasc'] = $intwiseloandateasc;
        $data['intwiseamountasc'] = $intwiseamountasc;

        if( $report== 'loan_amt'){
             
              $intwiseamountasc = $this->input->post('intwiseamountasc');  
            

        }else if( $report== 'int_report'){

             $intwiseloandateasc = $this->input->post('intwiseloandateasc');

        }else{

             $intwiseamountasc ='';
             $intwiseloandateasc = '';

        }
        $query = "";

        // print_r($query);exit();
        if($intwisebillno == 'on')
        {

            $query = "ORDER BY BILLNO ASC";
                 // print_r($query);exit();          
        }

        // print_r( $query );exit();
              
        if($intwiseinttype == 'on')
        {

            if($query == "")

            {

                $query = "ORDER BY INTERESTTYPE ASC";
            }

            else

            {

                $query.=",INTERESTTYPE ASC";

            }  

        }      

        if($intwiseperiod == 'on')
        {

            if($query == "")

            {

                $query = "ORDER BY MONTHS ASC";
            }

            else

            {

                $query.=",MONTHS ASC";

            }  

        }  

        if($intwisename == 'on')

        {
            if($query == "")

            {

                $query = "ORDER BY NAME ASC";
            }

            else

              {

                $query.=",NAME ASC";

              }  

        }  

        // print_r($query);exit();

        if($intwiseactive == 'on')

        {

            if($query == "")

            {

                $query = "ORDER BY ACTIVE ASC";
            }

            else

              {

                $query.=",ACTIVE ASC";

              }  

        }

        // if($intwiseloandateasc == 'on')

        // {

        //     if($query=="")

        //     {

        //         $query = "ORDER BY ENDATE ASC";
        //     }

        //     else

        //     {

        //         $query.=",ENDATE ASC";

        //     }  

        // }

        //  // print_r($query);exit();    

        // if($intwiseloandatedesc == 'on')

        // {

        //     if($query=="")

        //     {

        //         $query = "ORDER BY ENDATE DESC";
        //     }

        //     else

        //     {

        //         $query ="ORDER BY ENDATE DESC";

        //     }  

        // }

        if($intwiseloandateasc == 'Ascending')

        {

            if($query == "")

            {

                $query = "ORDER BY ENDATE ASC";
            }

            else

              {

                $query.=",ENDATE ASC";

              }  

        }

        if($intwiseloandateasc == 'Descending')

        {

            if($query == "")

            {

                $query = "ORDER BY ENDATE DESC";
            }

            else

              {

                $query.=",ENDATE DESC";

              }  

        } 


        if($intwiseamountasc == 'Ascending')

        {

            if($query == "")

            {

                $query = "ORDER BY AMOUNT ASC";
            }

            else

              {

                $query.=",AMOUNT ASC";

              }  

        }
        
        if($intwiseamountasc == 'Descending')

        {

            if($query == "")

            {

                $query = "ORDER BY AMOUNT DESC";
            }

            else

              {

                $query.=",AMOUNT DESC";

              }  

        }


         if($intwisebillno=='on' || $intwiseinttype == 'on' || $intwiseperiod == 'on' || $intwisename == 'on' || $intwiseactive == 'on' || $intwiseloandateasc!= '' || $intwiseamountasc!= '')
        {
            $data['intreport_list'] = $this->Interestwise_model->get_intwisereport_list($query);
        }
        else
        {
            $data['intreport_list'] = array();
        }
       
 
        $this->load->view('interestwisereport/interestwisereport',$data);
       
    }

}
?>