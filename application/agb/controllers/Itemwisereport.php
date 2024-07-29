<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/* ************************************************************************************
        Purpose : To handle all Department functions 2022-08-19
***************************************************************************************/
class Itemwisereport extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model(array("Itemwisereport_model"));
        $this->load->library('user_agent');
        if (isset($this->session->userdata['username']) && $this->session->userdata['username'] == TRUE)
        {
            //do something
        }else{
            redirect('login'); //if session is not there, redirect to login page
        } 
        date_default_timezone_set("Asia/Kolkata");
        $this->session->set_userdata('comtitle', 'Itemwisereport');
    }


    public function index()
    {
        
        $data['item_list'] = $this->Itemwisereport_model->get_item_list(); 
        $status = '';
        $status_b = '';
        $weight_val = '';
        $filter_date = '';
        $status = $this->input->post('status_item');
        // $search = $this->input->post('search_item');
        // $search_desc = $this->input->post('search_item_desc');
        $search      = '';
        $search_desc = '';

       
       // $weight = $this->input->post('weight_item');
        // $filter_date = $this->input->post('item_date');

        // $data['status_item'] = $status;
        // $data['search_item'] = $search;
        // $data['weight_item'] = $weight;
        // $data['item_date'] = $filter_date;

        // echo $status;exit();
         if($status != '')
        {
            
            if($status != 'YN'){

                $status = "AND LOANS.ACTIVE ='".$status."'";

            }else{

                $status_b = 'YN';
                $status = '';
            }
            
        } else{

            $status = "";
        }

        if(isset($_POST['search_item']) && isset($_POST['search_item_desc']) ){
            $search      = $_POST['search_item'];
            $search_desc = $_POST['search_item_desc'];
          

            if($search != '')
            {
                if($search_desc != ""){
                    $search_desc = "";
                }
                $search = "AND PLEDGEINFO.PLEDGENAME ='".$search."'";

            }else if($search_desc != ''){

                if($search != ""){
                    $search = "";
                }

                $search_desc = "AND PLEDGEINFO.DESCRIPTION LIKE '".$search_desc."'";

            }

        }


        if(isset($_POST['weight_item']) && isset($_POST['weight_item_tboxone']) && isset($_POST['weight_item_tboxtwo'])){

            $weight      = $_POST['weight_item'];
            $weight1     = $_POST['weight_item_tboxone'];
            $weight2     = $_POST['weight_item_tboxtwo'];
            
           if($weight == "="){

                $weight_val = "AND PLEDGEINFO.WEIGHT = '".$weight1."'";

            }else if($weight == "<"){

                $weight_val = "AND PLEDGEINFO.WEIGHT < '".$weight1."'";

            }
            else if($weight == ">"){

                $weight_val = "AND PLEDGEINFO.WEIGHT > '".$weight1."'";
            }

            else if($weight == "<="){

                $weight_val = "AND PLEDGEINFO.WEIGHT <= '".$weight1."'";
            }

            else if($weight == ">="){

                $weight_val = "AND PLEDGEINFO.WEIGHT >= '".$weight1."'";
            }  

            else if($weight == "between"){

                $weight_val = "AND PLEDGEINFO.WEIGHT BETWEEN '".$weight1."' AND '".$weight2."'";
            }

        }


        if(isset($_POST['item_date'])){

            $date = $_POST['item_date'];
            $from_date = $_POST['from_date'];
            $to_date =$_POST['to_date'];

            $c_from_date = date("Y-m-d",strtotime($from_date));
            $t_to_date = date("Y-m-d",strtotime($to_date));

            if($date == "date"){

                $filter_date  =   "AND LOANS.ENDATE='".$c_from_date."'";

            }
            else if($date == "period"){

                $filter_date  = "AND LOANS.ENDATE BETWEEN '".$c_from_date."' AND '".$t_to_date."' ORDER BY LOANS.ENDATE DESC";

                // print_r($filter_date);exit();
            }

        }


        if($status != '' || $status_b == 'YN' || $search!='' || $search_desc!='' || $weight_val!=''  || $filter_date!='')
        {
        
        // print_r($search_desc);exit();
            $data['item_list_view'] = $this->Itemwisereport_model->get_status_list($status,$search,$search_desc,$weight_val,$filter_date);
        }
        else
        {
            $data['item_list_view'] = array();
        }

        //print_r($data);

        $this->load->view('itemwisereport/itemwisereport',$data);

   }

}
?>