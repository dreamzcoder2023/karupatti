<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/* ************************************************************************************
		Purpose : To handle General Settings functions 2022-08-18
***************************************************************************************/
class Settings extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model(array("Setting_model"));
		date_default_timezone_set("Asia/Kolkata");
     if (isset($this->session->userdata['username']) && $this->session->userdata['username'] == TRUE)
        {
          
       }else{
            redirect('login'); //if session is not there, redirect to login page
        }
	}
	/* ************************************************************************************
						Purpose : To handle admin login function 
	        **********************************************************************/
	public function index()
	{
    // echo $_SESSION['username'];
    // exit;
    $this->session->set_userdata('comtitle', 'General Settings');
    $data['g_settings'] = general_setting_details();
    $this->load->view('settings/general_settings', $data);

	}

	public function general_settings_update()
    {

        // print_r($_POST);exit;
      /*if($this->input->post('submit'))
      {*/
        $g_settings = general_setting_details(); 
        $oldlogo = $this->input->post('oldlogo');
        $oldfav  = $this->input->post('oldfav');

        if(!empty($_FILES['logo']['name'])){ 

          $ext = pathinfo($_FILES['logo']['name'], PATHINFO_EXTENSION);        
          $config['upload_path'] = 'assets/images/';
          $config['allowed_types'] = 'jpg|jpeg|png|gif';
          $config['file_name'] = 'logo';
          $this->load->library('upload',$config);
          $this->upload->initialize($config);
          unlink('assets/images/'.$oldlogo);
          if($this->upload->do_upload('logo')){
            $uploadData = $this->upload->data();
            $data['logo'] = 'logo.'.$ext;
            }else{
            $data['logo'] = 'logo.jpg';
            }
          }else{
            $data['logo'] = $oldlogo;
          }

        if(!empty($_FILES['favicon']['name'])){ 

          $ext = pathinfo($_FILES['favicon']['name'], PATHINFO_EXTENSION);
          //$name = $last_user.'.'.$ext;
          $config['upload_path'] = 'assets/images/';
          $config['allowed_types'] = 'jpg|jpeg|png|gif';
          $config['file_name'] = 'favicon';
          $this->load->library('upload',$config);
          unlink('assets/images/'.$oldfav);
          $this->upload->initialize($config);
          if($this->upload->do_upload('favicon')){
            $uploadData = $this->upload->data();
            $data['favicon'] = 'favicon.'.$ext;
            }else{
            $data['favicon'] = 'favicon.jpg';
            }
          }else{
            $data['favicon'] = $oldfav;
          }
        $data['title'] = $this->input->post('title');
        // $data['contact_person'] = $this->input->post('contact_person');
        $data['date_format'] = $this->input->post('date_format');
        $data['time_zone'] = $this->input->post('timezone');
        $data['modified_on'] = date('Y-m-d H:i:s');
        $data['modified_by'] = 1;
        $id = 1;
        // print_r ($data);
        // exit();
        $result = $this->Setting_model->general_setting_update($data, $id);
        if($result){
        $this->session->set_flashdata('g_success', 'General Setting details have been updated successfully...');
        }else{
             $this->session->set_flashdata('g_err', 'Could not update general setting details!');
        }

      /*}else{
        
      }*/  
    redirect('settings');      
  } 
  /**************************************************************************************
                        Purpose : SMS Setting function - 07-09-2022
     **************************************************************************************/
    public function sms()
  {
    // echo $_SESSION['username'];
    // exit;
    $this->session->set_userdata('comtitle', 'SMS Settings');
    $data['sms_settings'] = $this->Setting_model->sms_setting_details();
    //return($data);
    $this->load->view('sms/sms_api',$data);

  }
  //To save SMS Setting
    public function sms_update()
    {
        
        $sms_settings =  $this->Setting_model->sms_setting_details(); 
        $data['appkey'] = $this->input->post('add_appkey_sms');
        $data['senderid'] = $this->input->post('add_senderid_sms');
        $data['modified_on'] = date('Y-m-d H:i:s');
        $data['modified_by'] = 1;
        $id = 1;

        $result = $this->Setting_model->sms_update($data,$id);

        if($result)
        {
            $this->session->set_flashdata('g_success', 'SMS Setting have been done successfully...');
        }else
        {
           $this->session->set_flashdata('g_err', 'Could not set SMS!');
        }
        redirect('settings');
    }
 /**************************************************************************************
                        Purpose : Email Setting function - 08-09-2022
     **************************************************************************************/
   public function email()
  {
    // echo $_SESSION['username'];
    // exit;
    $this->session->set_userdata('comtitle','Email Settings');
    $data['email_settings'] = $this->Setting_model->email_setting_details();
    //return($data);
    $this->load->view('email/email_api',$data);

  }                    
  //To save email Setting
    public function email_update()
    {
        
        $email_settings =  $this->Setting_model->email_setting_details(); 
        $data['hostname'] = $this->input->post('hostname_email');
        $data['username'] = $this->input->post('uname_email');
        $data['password'] = $this->input->post('passwd_email');
        $data['modified_on'] = date('Y-m-d H:i:s');
        $data['modified_by'] = 1;
        $id = 1;

        $result = $this->Setting_model->email_update($data,$id);

        if($result)
        {
            $this->session->set_flashdata('g_success', 'Email Setting have been done successfully...');
        }else
        {
           $this->session->set_flashdata('g_err', 'Could not set Email!');
        }
        redirect('settings');
    }
    /**************************************************************************************
                        Purpose : WhatsApp Setting function - 08-09-2022
     **************************************************************************************/

    public function whatsapp()
  {
    // echo $_SESSION['username'];
    // exit;
    $this->session->set_userdata('comtitle','WhatsApp Settings');
    $data['whatsapp_settings'] = $this->Setting_model->whatsapp_setting_details();
    //return($data);
    $this->load->view('whatsapp/whatsapp_api',$data);

  }                    
  //To save SMS Setting
    public function whatsapp_update()
    {
        
        $whatsapp_settings =  $this->Setting_model->whatsapp_setting_details(); 
        $data['whatsappkey'] = $this->input->post('whatsappkey');
        $data['whatsappsenderid'] = $this->input->post('whatsappsenderid');
        $data['modified_on'] = date('Y-m-d H:i:s');
        $data['modified_by'] = 1;
        $id = 1;

        $result = $this->Setting_model->whatsapp_update($data,$id);

        if($result)
        {
            $this->session->set_flashdata('g_success', 'WhatsApp Setting have been done successfully...');
        }else
        {
           $this->session->set_flashdata('g_err', 'Could not set WhatsApp!');
        }
        redirect('settings');
    }

  public function mobileapp()
  {
    // echo $_SESSION['username'];
    // exit;
    $this->session->set_userdata('comtitle','MobileApp Settings');
    $data['mobileapp_settings'] = $this->Setting_model->mobileapp_setting_details();
    //return($data);
    $this->load->view('mobileapp/mobileapp_api',$data);

  }                    
  //To save SMS Setting
    public function mobileapp_update()
    {
        
        $mobileapp_settings =  $this->Setting_model->mobileapp_setting_details(); 
        $data['mobileappkey'] = $this->input->post('mobileappkey');
        $data['mobilesenderid'] = $this->input->post('mobilesenderid');
        $data['modified_on'] = date('Y-m-d H:i:s');
        $data['modified_by'] = 1;
        $id = 1;

        $result = $this->Setting_model->mobileapp_update($data,$id);

        if($result)
        {
            $this->session->set_flashdata('g_success','MobileApp Setting have been done successfully...');
        }else
        {
           $this->session->set_flashdata('g_err', 'Could not set MobileApp!');
        }
        redirect('settings');
    }

    public function loandays()
  {
    // echo $_SESSION['username'];
    // exit;
    $this->session->set_userdata('comtitle','Loan Days');
    $data['loan_settings'] = $this->Setting_model->loandays_setting_details();
    //return($data);
    $this->load->view('loandays/loan_days',$data);

  }                    
  //To save SMS Setting
    public function loandays_update()
    {
        
        $loan_settings =  $this->Setting_model->loandays_setting_details(); 
        $data['MIN_INT_DAYS'] = $this->input->post('min_interest');
        $data['MIN_CALC_DAYS'] = $this->input->post('min_calc');
        $data['GRACE_DAYS'] = $this->input->post('gracedays');
        /*$data['modified_on'] = date('Y-m-d H:i:s');
        $data['modified_by'] = 1;*/
        $id = 1;

        $result = $this->Setting_model->loandays_update($data,$id);

        if($result)
        {
            $this->session->set_flashdata('g_success','Loan Days Setting have been done successfully...');
        }else
        {
           $this->session->set_flashdata('g_err', 'Could not set Loan Days!');
        }
        redirect('settings');
    }


    public function notification_update()
    {
        $id=$_POST['id'];
        $update=$this->db->query("UPDATE notification SET receiver_view_read_status='1' WHERE notification_id='".$id."' ");
        
    }
public function bd_gd_update()
    {
        $bgr=$this->input->post('bd_gd_rate');
        $res= $this->db->query("UPDATE SETUP SET BOARD_GOLDRATE=".$bgr);
        return true;
    }
     public function bd_sl_update()
    {
        $bsr=$this->input->post('bd_sl_rate');
        $res= $this->db->query("UPDATE SETUP SET BOARD_SILVERRATE=".$bsr);
        return true;
    }
    public function pr_gd_update()
    {
        $pgr=$this->input->post('pr_gd_rate');
        $res= $this->db->query("UPDATE SETUP SET GOLDRATE=".$pgr);
        return true;
    }
    public function pr_sl_update()
    {
        $psr=$this->input->post('pr_sl_rate');
        $res= $this->db->query("UPDATE SETUP SET SILVERRATE=".$psr);
        return true;
    }
    public function rtgs_gr_update()
    {
        $psr=$this->input->post('rtgs_g_rate');
        $res= $this->db->query("UPDATE SETUP SET RTGS_GOLDRATE=".$psr);
        return true;   
    }
    public function rtgs_sl_update()
    {
        $psr=$this->input->post('rtgs_sl_rate');
        $res= $this->db->query("UPDATE SETUP SET RTGS_SILVERRATE=".$psr);
        return true;
    }

}
?>