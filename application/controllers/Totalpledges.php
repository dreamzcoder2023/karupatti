<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/* ************************************************************************************
        Purpose : To handle all Department functions 2022-08-19
***************************************************************************************/
class Totalpledges extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model(array("Totalpledges_model"));
        $this->load->library('user_agent');
        if (isset($this->session->userdata['username']) && $this->session->userdata['username'] == TRUE)
        {
            //do something
        }else{
            redirect('login'); //if session is not there, redirect to login page
        } 
        date_default_timezone_set("Asia/Kolkata");
        $this->session->set_userdata('comtitle','Totalpledges');
    }


    public function index()
    {

        $data['totalpledges_list_view'] = $this->Totalpledges_model->get_status_list();

        $this->load->view('totalpledges/totalpledges',$data);

       //print_r($data);exit;

   }

}
?>