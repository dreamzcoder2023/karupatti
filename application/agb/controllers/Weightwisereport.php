<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/* ************************************************************************************
        Purpose : To handle all Department functions 2022-08-19
***************************************************************************************/
class Weightwisereport extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model(array("Weightwisereport_model"));
        $this->load->library('user_agent');
        if (isset($this->session->userdata['username']) && $this->session->userdata['username'] == TRUE)
        {
            //do something
        }else{
            redirect('login'); //if session is not there, redirect to login page
        } 
        date_default_timezone_set("Asia/Kolkata");
        $this->session->set_userdata('comtitle', 'Weightwisereport');
    }


    public function index()
    {
        
        // $data['weight_list'] = $this->Weightwisereport_model->get_weightwise_list();

        $weight_val = '';
        $filter_date = '';

        if(isset($_POST['weight_wghtwise']) && isset($_POST['weight_item_tboxone']) && isset($_POST['weight_item_tboxtwo'])){

            $weight      = $_POST['weight_wghtwise'];
            $weight1     = $_POST['weight_item_tboxone'];
            $weight2     = $_POST['weight_item_tboxtwo'];
                
           if($weight == "="){

                $weight_val = "AND PLEDGEINFO.WEIGHT = '".$weight1."' AND LOANS.ACTIVE='Y'";

            }else if($weight == "<"){

                $weight_val = "AND PLEDGEINFO.WEIGHT < '".$weight1."' AND LOANS.ACTIVE='Y'";

            }
            else if($weight == ">"){

                $weight_val = "AND PLEDGEINFO.WEIGHT > '".$weight1."' AND LOANS.ACTIVE='Y'";
            }

            else if($weight == "<="){

                $weight_val = "AND PLEDGEINFO.WEIGHT <= '".$weight1."'AND LOANS.ACTIVE='Y'";
            }

            else if($weight == ">="){

                $weight_val = "AND PLEDGEINFO.WEIGHT >= '".$weight1."'AND LOANS.ACTIVE='Y'";
            }  

            else if($weight == "between"){

                $weight_val = "AND PLEDGEINFO.WEIGHT BETWEEN '".$weight1."' AND '".$weight2."'AND LOANS.ACTIVE='Y'";
            }

        }


        if(isset($_POST['weight_date'])){

            $date = $_POST['weight_date'];
            $from_date = $_POST['from_date'];
            $to_date =$_POST['to_date'];

            $c_from_date = date("Y-m-d",strtotime($from_date));
            $t_to_date = date("Y-m-d",strtotime($to_date));

            if($date == "all"){

                $filter_date  ="";

            }else if($date == "date"){

                $filter_date  =   "AND LOANS.ENDATE='".$c_from_date."' AND LOANS.ACTIVE='Y'";

            }
            else if($date == "period"){

                $filter_date  = "AND LOANS.ENDATE BETWEEN '".$c_from_date."' AND '".$t_to_date."' AND LOANS.ACTIVE='Y'";

                // print_r($filter_date);exit();
            }else

            {
                 $filter_date  = '';

            }

        }


        if($weight_val!='' || $filter_date!='')
        {
        
        // print_r($search_desc);exit();
        $data['weightwise_list_view'] = $this->Weightwisereport_model->get_status_list($weight_val,$filter_date);
        }
        else
        {
            $data['weightwise_list_view'] = array();
        }

        //print_r($data);

        $this->load->view('weightwisereport/weightwise',$data);

   }

}
?>