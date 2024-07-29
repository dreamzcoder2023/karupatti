<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/* ************************************************************************************
		Purpose : To handle all User functions 2022-08-18
***************************************************************************************/
class User extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model(array("User_model"));
    	$this->load->library('user_agent');
		date_default_timezone_set("Asia/Kolkata");
    	$this->session->set_userdata('comtitle', 'User');
	}
	/* ************************************************************************************
						Purpose : To handle User List function 
	        **********************************************************************/
	public function index()
	{
		$data['user_list'] = $this->User_model->get_user_list();
		$this->load->view('user/user_list',$data);
	}

}
?>