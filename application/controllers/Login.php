<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/* ************************************************************************************
		Purpose : To handle all login functions 2022-08-18
***************************************************************************************/
class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

	$this->load->model(array("Login_model"));
	// $this->load->model(array('Dashboard_model'));
    $this->load->library('user_agent');
	date_default_timezone_set("Asia/Kolkata");
    $this->session->set_userdata('comtitle', 'Login');
    
    
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
       // $this->load->view('login');
		$this->load->view('adminloginuser');
	}

  public function uservalidates_check()
  {
    $username = $this->input->post('name'); 
    $response = $this->db->query("SELECT * FROM USERLIST WHERE USERNAME='".$username."'")->row();

    if($response!='') 
	{
      echo 1;
    }
	else
	{
      echo 0;
    }
  }
  public function passwordvalidate()
  {
    // $this->load->view('login');
    // $this->load->view('adminloginuser');
    $username = $this->input->post('name'); 
    $response = $this->db->query("SELECT * FROM USERLIST WHERE USERNAME='".$username."' ")->row();

    // print_r($response);

    // exit;
    // if ($response!='') {
      // echo 1;
      $data['name'] = $response->USERNAME;

      $this->load->view('adminloginpassword',$data);
      // $this->load->view('adminloginpassword',$data);

    // }

  }
  

  
	public function forgot_password()
	{
		$this->load->view('forgot_password');
	}

   	// To check admin login
	public function admin_login_verify()
	{ 
	  $username = $this->input->post('name'); 
	  $userin   = $this->input->post('password');
    $company_code   = $this->input->post('company_code');
    $pword = encrypt_decrypt($userin,'encrypt');

    $row_res = $this->db->query("SELECT * FROM USERLIST WHERE USERNAME='".$username."' AND PASSWORD = '".$pword."'")->row();

	  if($username == "" && $userin !='' )
	  {
	    echo 1;
	  }
	  else if($userin==""&&$username!='')
	  {
	    echo 2;
	  }
	  else if($username == "" && $userin == "")
	  {
	    echo 3;
	  }

    elseif($company_code=='')
    {
      echo 5;
    }
	  else if(!empty($row_res))
	  {

      $company_list = $this->Login_model->get_company_by_company_code($company_code);
      $year_list = $this->Login_model->get_curr_fin_year();
	  $gen_set=$this->db->query("SELECT * FROM general_settings")->row();

      $this->session->set_userdata('username', $row_res->USERNAME);
      $this->session->set_userdata('USERID', $row_res->USERID);
      $this->session->set_userdata('USERLEVEL', $row_res->USERLEVEL);
      $this->session->set_userdata('LOANPREFIX', $row_res->LOANPREFIX);
      $this->session->set_userdata('COMPANYCODE', $company_list->COMPANYCODE);
      $this->session->set_userdata('COMPANY_STATUS', $company_list->ACTIVE);
      $this->session->set_userdata('FINYEAR', $year_list->DBNAME);
      $this->session->set_userdata('FINYEAR_STATUS', $year_list->STATUS);
      $this->session->set_userdata('F_START_DATE', $year_list->FDATE);
      $this->session->set_userdata('F_END_DATE', $year_list->LDATE);
	    $this->session->set_userdata('DATE_PATTERN', $gen_set->date_format);

      $curr_rate=$this->db->query("SELECT * FROM SETUP")->row();
      $this->session->set_userdata('CUR_GOLD_RATE',$curr_rate->BOARD_GOLDRATE);
      $this->session->set_userdata('CUR_SILVER_RATE',$curr_rate->BOARD_SILVERRATE);


       $staff_details=$this->db->query("SELECT * FROM STAFFS WHERE USER_ID='".$row_res->USERID."' ")->row(); 
      $staff_id=$staff_details->SNO;
      // print_r($staff_details);exit;

      $this->session->set_userdata('TRANSACTION_PWD',$staff_details->TRANSACTION_PWD);


        $rp=$this->db->query("SELECT  s.STAFF_ID,s.MENU_ID,s.VALUE as SVALUE, m.* from STAFF_PERMISSION s,MENU m where s.MENU_ID=m.MENU_ID AND s.STAFF_ID='".$staff_id."'")->result_array();
        foreach($rp as $p)
        {
            $rpf = explode('~', $p['VALUE']);
            $rpv = explode('~', $p['SVALUE']);
            $crpf = count($rpf);
            for($i=0;$i<$crpf;$i++)
            {
              $this->session->set_userdata($p['MENU_NAME'].$rpf[$i],$rpv[$i]);
            }
        }

      $ip = $_SERVER['REMOTE_ADDR'];
      $txt = "[".date('Y-m-d H:i:s')."] => ".$ip."  -  ".$username."  -  Success";
      $mostRecentFilePath = "";
      $mostRecentFileMTime = 0;

      $iterator = new RecursiveIteratorIterator(new RecursiveDirectoryIterator("logs/login_logs"), RecursiveIteratorIterator::CHILD_FIRST);
      foreach ($iterator as $fileinfo) {
          if ($fileinfo->isFile()) {
              if ($fileinfo->getMTime() > $mostRecentFileMTime) {
                  $mostRecentFileMTime = $fileinfo->getMTime();
                  $mostRecentFilePath = $fileinfo->getPathname();
              }
          }
      }

      $fsize = filesize($mostRecentFilePath);
      if($fsize>1000000)
        $myfile = file_put_contents('logs/login_logs/login_log-'.date("Y-m-d").'.txt', $txt.PHP_EOL , FILE_APPEND | LOCK_EX);
      else
        $myfile = file_put_contents($mostRecentFilePath, $txt.PHP_EOL , FILE_APPEND | LOCK_EX);

      echo '6';
	  }
	  else
	  {

        $ip = $_SERVER['REMOTE_ADDR'];
        $txt = "[".date('Y-m-d H:i:s')."] => ".$ip."  -  ".$username."  -  Incorrect E-mail & Password!";
        $mostRecentFilePath = "";
        $mostRecentFileMTime = 0;

        $iterator = new RecursiveIteratorIterator(new RecursiveDirectoryIterator("logs/login_logs"), RecursiveIteratorIterator::CHILD_FIRST);
        foreach ($iterator as $fileinfo) {
            if ($fileinfo->isFile()) {
                if ($fileinfo->getMTime() > $mostRecentFileMTime) {
                    $mostRecentFileMTime = $fileinfo->getMTime();
                    $mostRecentFilePath = $fileinfo->getPathname();
                }
            }
        }

        $fsize = filesize($mostRecentFilePath);
        if($fsize>1000000)
            $myfile = file_put_contents('logs/login_logs/login_log-'.date("Y-m-d").'.txt', $txt.PHP_EOL , FILE_APPEND | LOCK_EX);
        else
            $myfile = file_put_contents($mostRecentFilePath, $txt.PHP_EOL , FILE_APPEND | LOCK_EX);

	    echo 0;
	  }

	}
	// To logout
	public function logout()
	{
    
	  $user_data = $this->session->all_userdata();
	  foreach ($user_data as $key => $value)
     {
	            $this->session->unset_userdata($key);
	    }

	  redirect(base_url("login"));
	}

  // To logout
  // public function logout()
  // {

  //   $log_history = $this->Login_model->get_active_login_history_by_employee_id($_SESSION['employee_id']);
  //   $user_data = $this->session->all_userdata();
  //   foreach ($user_data as $key => $value) {
  //             $this->session->unset_userdata($key);
  //     }


  //     if(!empty($log_history))
  //     {

  //       $expiry_time = new DateTime($log_history->login_date);
  //       $current_date = new DateTime(date('Y-m-d H:i:s'));
  //       $diff = $expiry_time->diff($current_date);
  //       $duration = $diff->format('%H:%I:%S');

  //       $cip = $this->input->ip_address();
  //       $ip['ip_address'] = $cip;
  //       $ip['logout_date'] = date('Y-m-d H:i:s');
  //       $ip['status'] = 1;
  //       $ip['duration'] = $duration;
  //       $ip['login_history_id'] = $log_history->login_history_id;

  //       $this->Login_model->update_login_details($ip);
  //     }

  //   redirect(base_url("login"));
  // }

	function aes128Decrypt($key, $data) {
  $data = base64_decode($data);
  if(16 !== strlen($key)) $key = hash('MD5', $key, true);
  $data = mcrypt_decrypt(MCRYPT_RIJNDAEL_128, $key, $data, MCRYPT_MODE_CBC, str_repeat("\0", 16));
  $padding = ord($data[strlen($data) - 1]); 
  return substr($data, 0, -$padding); 
  }

  function aes128Encrypt($key, $data) 
  {
    if(16 !== strlen($key)) $key = hash('MD5', $key, true);
    $padding = 16 - (strlen($data) % 16);
    $data .= str_repeat(chr($padding), $padding);
    return base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_128, $key, $data, MCRYPT_MODE_CBC, str_repeat("\0", 16)));
  }

}
