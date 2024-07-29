<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/* ************************************************************************************
        Purpose : To handle all Mcard_point functions 2022-08-18
***************************************************************************************/
class Mcard_point extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model(array("Mcard_point_model"));
        $this->load->library('user_agent');
        
        if (isset($this->session->userdata['username']) && $this->session->userdata['username'] == TRUE)
        {
            //do something
        }else{
            redirect('login'); //if session is not there, redirect to login page
        } 
        date_default_timezone_set("Asia/Kolkata");
        $this->session->set_userdata('comtitle', 'Property_purchase');
    }
    /* ************************************************************************************
                        Purpose : To handle Mcard_point List function 
            **********************************************************************/
            public function index()
            {
                $data['membership_points'] = $this->Mcard_point_model->membership_point();
                // print_r($data);exit;
                $this->load->view("m_point/membership_points_update",$data);
            }
            public function membership_points()
            {
                $data['membership_points'] = $this->Mcard_point_model->membership_point();
                // print_r($data);exit;
                $this->load->view("m_point/membership_points_update",$data);
            }
            public function membership_points_update()
            {
                $data['sno'] = $this->input->post('sno');
                $data['type'] = $this->input->post('type');
                $data['for_amount'] = $this->input->post('for_amount');
                $data['points'] = $this->input->post('points');
        
                // print_r($data);exit; 
                $data['membership_points'] = $this->Mcard_point_model->membership_points_update($data);
                //  print_r($data);exit; 
                
                // print_r($data);exit;
                // $this->load->view("chit/Mcard_point_update",$data);
                redirect("Mcard_point/membership_points");
            }
        }
        
    