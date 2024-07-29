<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/* ************************************************************************************
		Purpose : To handle all Nontag_entry functions 2022-08-18
***************************************************************************************/
class Pure_gold_stock extends CI_Controller {
    
	public function __construct()
	{
		parent::__construct();
		$this->load->model(array("Nontag_entry_model","Accountsgroup_model"));
    	$this->load->library('user_agent');
        $fin_year=$this->Accountsgroup_model->get_fin_years_list();
        $db=substr($fin_year->DBNAME,0,strlen($fin_year->DBNAME)-4);
        //echo $db;exit;
        $config_app = switch_db_dynamic($db);
        
        $this->Nontag_entry_model->other_db = $this->load->database($config_app,TRUE);
    	if (isset($this->session->userdata['username']) && $this->session->userdata['username'] == TRUE)
        {
            //do something
        }else{
            redirect('login'); //if session is not there, redirect to login page
        } 
		date_default_timezone_set("Asia/Kolkata");
    	$this->session->set_userdata('comtitle', 'Bankentry');
	}
    public function index()
	{
        
        $this->load->view('pure_gold_stock/pure_gold_stock_list');
    }
   
}