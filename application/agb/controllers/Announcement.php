<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/* ************************************************************************************
		Purpose : To handle all Announcement functions 2024-02-10 By Vasanth
***************************************************************************************/
class Announcement extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model(array("Announcement_model"));
    	$this->load->library('user_agent');
    	if (isset($this->session->userdata['username']) && $this->session->userdata['username'] == TRUE)
        {
            //do something
        }else{
            redirect('login'); //if session is not there, redirect to login page
        } 
		date_default_timezone_set("Asia/Kolkata");
    	$this->session->set_userdata('comtitle', 'Announcement');
	}

    public function index()
    {   

        $data['userlist']         = $this->Announcement_model->get_user_list();
        $data['announcementlist'] = $this->Announcement_model->list();
        $this->load->view('announcement/announcements_list',$data);

       
        // $this->load->view('announcement/announcements_list');
    }


    public function announce_active()

    {
        $id = $this->input->post('id');
        $data['status'] = $this->input->post('status');
        $result = $this->Announcement_model->announce_active_status($data,$id);
        echo 1;
    } 

    //To save announcement
    public function announcementadd()
    {


        $data['statedate']     = $this->input->post('ancts_start_date');
        $data['enddate']       = $this->input->post('ancts_end_date');
        $data['announcement']  = $this->input->post('ancts_txt');
        $data['userid']        = $this->input->post('acnts_users');
        $data['created_on']    = date('Y-m-d H:i:s');
        $data['created_by']    = $_SESSION['username'];
        $data['status']        = 1;
           
        $result = $this->Announcement_model->add($data);
        // exit;
        if($result)
        {
            $this->session->set_flashdata('g_success', 'Announcement have been Added successfully...');
        }else{
           $this->session->set_flashdata('g_err', 'Could not add Announcement details!');
        }
        redirect('Announcement');
    }

    //Announcement Edit
        public function edit()
        {   

            $id = $_POST['id'];
            $data['edit'] = $this->Announcement_model->editdata($id);
            $data['userlist']  = $this->Announcement_model->get_user_list();

            $this->load->view('announcement/announcements_edit',$data);
        }


    

    //To update announcement
    public function update()
    {      
        
        $data['announcementid']= $this->input->post('edit_id');
        $data['statedate']     = $this->input->post('ancts_start_date_edit');
        $data['enddate']       = $this->input->post('ancts_end_date_edit');
        $data['announcement']  = $this->input->post('ancts_txt_edit');
        $data['userid']        = $this->input->post('acnts_users_edit');
        $data['created_on']    = date('Y-m-d H:i:s');
        $data['created_by']    = $_SESSION['username'];
        $data['modified_on']   = date('Y-m-d H:i:s');
        $data['modified_by']   = $_SESSION['username'];
        $data['status']        = 1;
        $result = $this->Announcement_model->update($data);
           

        if($result)
        {
            $this->session->set_flashdata('g_success', 'Announcement have been Updated successfully...');
        }else{
           $this->session->set_flashdata('g_err', 'Could not update Announcement details!');
        }
        redirect('Announcement');
    }

    //To Delete Announcement
    public function announcement_delete()
    {
        $uid = $data['bid']=$_POST['id'];
        $data['details'] = $this->db->query("SELECT * FROM announcement WHERE id='".$uid."'")->row();
        $this->load->view('announcement/announcement_delete',$data);
    }

    public function delete()
    { 
        $bid=$_POST['field'];
        $result = $this->Announcement_model->announcement_delete($bid);
        if ($result) {
            $this->session->set_flashdata('g_success', 'Announcement has been Deleted successfully.');
        }
        else{
            $this->session->set_flashdata('g_err', 'Something went wrong');
        }
    }

}
?>