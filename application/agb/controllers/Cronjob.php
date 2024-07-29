<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/* ************************************************************************************
		Purpose : To handle all Aksproduct_master functions 2022-08-22
***************************************************************************************/
class Cronjob extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model(array("Cron_job_model"));
    	$this->load->library('user_agent');
        $this->load->helpers('common_helper');

		date_default_timezone_set("Asia/Kolkata");
    	$this->session->set_userdata('comtitle','Aks_sale');
	}

    public function index(){
        
        $result =  $this->Cron_job_model->cron_job();

         // print_r($result);
         // exit;
        if($result)
        {
            $this->session->set_flashdata('g_success',  'Website Sync  have been added successfully...');

        }else{
           $this->session->set_flashdata('g_err', 'Could not add sale !');
        }

        redirect('Akssale/Weblist');
    }

    

   


}


?>


