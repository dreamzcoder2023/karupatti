<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/* ************************************************************************************
		Purpose : To handle all login functions 2022-08-18
***************************************************************************************/
class Barcode extends CI_Controller {

	public function __construct()
	{
		// parent::__construct();
		// $this->load->model(array("Login_model"));
    // $this->load->library('user_agent');
		// date_default_timezone_set("Asia/Kolkata");
    // $this->session->set_userdata('comtitle', 'Login');

    
    
    // if (isset($this->session->userdata['username']) && $this->session->userdata['username'] == TRUE)
    //     {
    //         // redirect('dashboard');
    //     }else{
    //         // redirect('login'); //if session is not there, redirect to login page
    //     } 
	}
	/* ************************************************************************************
						Purpose : To handle admin login function 
	        **********************************************************************/
	public function index()
	{
		$this->load->view('barcode/barcode');
	}

	
}
