<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/* ************************************************************************************
		Purpose : To handle Notifications Area functions 2023-05-30
***************************************************************************************/
class Notifications extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model(array("Notifications_model"));
    	$this->load->library('user_agent');
    	if (isset($this->session->userdata['username']) && $this->session->userdata['username'] == TRUE)
        {
            //do something
        }else{
            redirect('login'); //if session is not there, redirect to login page
        } 
		date_default_timezone_set("Asia/Kolkata");
    	$this->session->set_userdata('comtitle', 'Notifications');
	}
	
    public function index()
    {
    	
        $this->load->view('notifications/notification_page');
    }
	public function notification_update()
    {
		$id = $_POST['id'];
		$result = $this->db->query("UPDATE notification SET receiver_view_read_status = '1' WHERE notification_id = '".$id."' ");
        redirect("Notifications");
    }
	public function notification_all_update()
    {
		$id = $_POST['id'];
		$result = $this->db->query("UPDATE notification SET receiver_view_read_status = '1' WHERE process = '".$id."' ");

		if ($result) {
			
			 redirect("Notifications");
		}
       
    }

}
?>


