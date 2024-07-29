<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/* ************************************************************************************
		Purpose : To handle all Membership functions 2022-08-19
***************************************************************************************/
class Membership extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model(array("Membership_model"));
    	$this->load->library('user_agent');
    	if (isset($this->session->userdata['username']) && $this->session->userdata['username'] == TRUE)
        {
            //do something
        }else{
            redirect('login'); //if session is not there, redirect to login page
        } 
		date_default_timezone_set("Asia/Kolkata");
    	$this->session->set_userdata('comtitle', 'Interest Scheme');
	}

    public function index()
    {
         $drop = $this->input->post('ary');
         // print_r($drop);exit();
         if ($drop[0]!='' ){
         
            $multi = count($drop);
             $qry='AND (';
             for ($i=0; $i < $multi; $i++) 
             { 
                if ($i!='0') {
                   $qry.='OR'; 
                }
                 
                $qry.=" MC.CARD_TYPE='".$drop[$i]."' ";
                  
             }
             $qry.=')';
         }
         else
         {
           
            $qry='';
         }
         // print_r($qry);exit();
         $party_nm_fill = $this->input->post('party_name_fill');
         // print_r($party_nm_fill);exit();
        $data['party_nm_fill'] = $party_nm_fill;
        if($party_nm_fill==""){
            $party_name_fill ='';
        }
        else{
            $party_name_fill=" AND P.NAME like '%".$party_nm_fill."%'";
        }
        // print_r($party_name_fill);exit();
        $page = isset($_GET['page']) ? $_GET['page'] : 1;

                        $limit      = 10;
                        $offset     = ($page - 1) * $limit +1;
                        $page_limit=$offset+$limit-1;

        $data['mem_list'] = $this->db->query(" SELECT * FROM 
          ( SELECT P.NAME,MC.*, ROW_NUMBER() OVER (ORDER BY MC.MEMBERSHIP_ID DESC) AS sl FROM  MEMBERSHIP_CARD MC LEFT JOIN PARTIES P ON P.PID=MC.PID WHERE MC.STATUS='Y' $party_name_fill $qry )N WHERE sl BETWEEN $offset AND $page_limit")->result_array();


        $data['silver_count'] =count($this->db->query("SELECT P.NAME,MC.* FROM MEMBERSHIP_CARD MC LEFT JOIN PARTIES P ON P.PID=MC.PID WHERE MC.CARD_TYPE='Silver' AND MC.STATUS='Y' $party_name_fill")->result_array());
        $data['gold_count'] =count($this->db->query("SELECT P.NAME,MC.* FROM MEMBERSHIP_CARD MC LEFT JOIN PARTIES P ON P.PID=MC.PID WHERE MC.CARD_TYPE='Gold' AND MC.STATUS='Y' $party_name_fill")->result_array());
        $data['platinum_count'] =count($this->db->query("SELECT P.NAME,MC.* FROM MEMBERSHIP_CARD MC LEFT JOIN PARTIES P ON P.PID=MC.PID WHERE MC.CARD_TYPE='Platinum' AND MC.STATUS='Y' $party_name_fill")->result_array());

        $data['count']=count( $this->db->query("SELECT P.NAME,MC.* FROM MEMBERSHIP_CARD MC LEFT JOIN PARTIES P ON P.PID=MC.PID ORDER BY MC.MEMBERSHIP_ID DESC")->result_array());

        $this->load->view('membership/membership_list',$data);    
    }
    public function Partyname()
      {
        $search =  $_GET['query']; 
        $rows = $this->Membership_model->getUsers($search);
        $res='[';
        if(count($rows)>0) {
          foreach($rows as $row )
          {
              $title='';
              $name='';
              $firstname=$row->NAME;
              $title = $firstname;
              $res.='{ "title":"'.$title.'","id": "'.$row->PID.'","firstname":"'.$firstname.'"},';
              
          }
          $res=rtrim($res,',');
          $res.=']';
        }
        else{
          $res.=']';
        }
        print_r($res);die();
      }

    public function membership_save()
    {
        // $data['kt_datepicker_issue_date'] = $this->input->post('kt_datepicker_issue_date');
        // $data['kt_exp_date'] = $this->input->post('kt_exp_date');
        $issue_date = $this->input->post('kt_datepicker_issue_date');
        $data['issue_date'] = $issue_date;
        $iss_dt = explode('-', $issue_date);
        $iss_dt = $iss_dt[2].'-'.$iss_dt[1].'-'.$iss_dt[0];
        $data['issue_date'] = $iss_dt;

        // $exp_date = $this->input->post('kt_exp_date');
        // $data['exp_date'] = $exp_date;
        // $exp_dt = explode('-', $exp_date);
        // $exp_dt = $exp_dt[2].'-'.$exp_dt[1].'-'.$exp_dt[0];
        $exp_date_hid = $this->input->post('exp_date_hid');
        $data['exp_date'] = $exp_date_hid;

        $data['first_name_id_hidden'] = $this->input->post('first_name_id_hidden');
        $data['mem_type'] = $this->input->post('mem_type');
        $data['mem_card_no'] = $this->input->post('mem_card_no');
        $data['mem_add_points'] = $this->input->post('mem_add_points');
        if (empty($data['mem_add_points']))
        {
             $data['mem_add_points'] = '0';
        }
        else{
            $data['mem_add_points'] = $this->input->post('mem_add_points');
        }
        $data['created_on'] = date('Y-m-d H:i:s');
        $data['added_user'] = $_SESSION['username'];
        $process="New Membership";

         $result = $this->Membership_model->membership_save($data);
         add_member_card_history($data['mem_card_no'],$data['first_name_id_hidden'],$process,$data['mem_add_points']);

        $pid = $this->input->post('first_name_id_hidden');
        $data['mem_id'] = $this->Membership_model->get_mem_details_by_mem_id($pid);
        $mem_id = $data['mem_id']->MEMBERSHIP_ID;
        $mem_points_tot = $data['mem_id']->MEMBERSHIP_POINTS + $this->input->post('mem_add_points');
        $add_member_points_in_parties = $this->Membership_model->update_membership_in_parties($mem_points_tot,$mem_id,$pid);

        // $mem_type = $_POST['mem_type'];
        // $mem_card_no = $_POST['mem_card_no'];
        $mem_type = $this->input->post('mem_type');
        $mem_card_no = $this->input->post('mem_card_no');
        $mem_act_id = $this->Membership_model->get_mem_activate_id($mem_type,$mem_card_no);
        // $act_id = $mem_act_id->ACTIVATE_ID;
        // print_r($mem_act_id);exit();
        $update_member_activate = $this->Membership_model->update_membership_activate($mem_act_id);
        $status_type = "In";
        $update_add_member_sts_type = $this->Membership_model->update_add_membership_sts_type($status_type,$data);
        // add_member_points_in_parties($data['mem_id']->MEMBERSHIP_ID,$data['mem_add_points'],$pid);

        if($result){
                $this->session->set_flashdata('g_success', 'New Membership have been Added successfully...');
          }else{
               $this->session->set_flashdata('g_err', 'Could not add Membership details!');
          }

          add_notification(date('Y-m-d H:i:s'), '', "Others", " Membership Card Issue", $mem_card_no. 'Issued By ' .$_SESSION['username']. ' Card Issue ','', $_SESSION['USERID'], '0', $mem_card_no);

        redirect('Membership');
    }

    //To Check Card No unique
    public function card_no_unique()
    {
        $val = $_POST['value'];
        $result = $this->Membership_model->card_no_unique($val);
        echo count((array)$result);
    }

    public function change_membership()
    {

        $memid = $_POST['id'];
        $data['change_mem_details'] = $this->Membership_model->get_mem_details_by_mem_id($memid);

        $this->load->view('membership/change_membership',$data);

    }
    public function get_membership_type()
    {
         $memtype = $_POST['mem_type'];
        $mem_act_list = $this->Membership_model->get_mem_activate_list($memtype); 
        $option.='<option value="">Select Card No</option>';
        foreach($mem_act_list as $memp_type)
        {
            $mno = $memp_type['MEMBERSHIP_NO'];
            $option.='<option value="'.$mno.'">'.$mno.'</option>';
        }
        echo $option;
    }
    public function get_membership_exp_date()
    {
         $mem_card_no = $_POST['mem_card_no'];
        $mem_act_exp_date = $this->Membership_model->get_mem_activate_exp_date($mem_card_no);
         echo $mem_act_exp_date->EXP_DATE;
    }

    // Change membership details stored in DB

    public function get_change_membership_exp_date()
    {
         $change_mem_card_no = $_POST['change_mem_card_no'];
        $mem_act_exp_date = $this->Membership_model->get_mem_activate_exp_date($change_mem_card_no);
         echo $mem_act_exp_date->EXP_DATE;
    }

    public function change_membership_save()
    {
        $data['party_id_change_mem'] = $this->input->post('party_id_change_mem');

        $change_plan = $this->input->post('change_plan_issue_new');
        // print_r($data['change_plan']);exit();

        if ($change_plan == "change_plan_val") 
        {
            $plan_type = 'Change Plan';
            $process = 'Change Plan';
        }
        else
        {
            $plan_type = 'Issue Plan';
            $process = 'Issue Plan';
        }
        $chge_issue_date = $this->input->post('issue_date_change_mem');
        $data['chge_issue_date'] = $chge_issue_date;
        $iss_dt = explode('-', $chge_issue_date);
        $iss_dt = $iss_dt[2].'-'.$iss_dt[1].'-'.$iss_dt[0];
        $data['chge_issue_date'] = $iss_dt;
        $data['change_mem_type'] = $this->input->post('change_mem_type');
        $data['change_mem_card_no'] = $this->input->post('change_mem_card_no');
        $change_exp_date_hid = $this->input->post('change_exp_date_hid');
        $data['change_exp_date_hid'] = $change_exp_date_hid;
        $data['chge_mem_add_points'] = $this->input->post('chge_mem_add_points');
        $chge_mem_points = $this->Membership_model->card_no_unique($data);
        $data['chge_mem_id'] = $chge_mem_points->MEMBERSHIP_ID;
        $data['chge_mem_add_points'] = $chge_mem_points->POINTS + $data['chge_mem_add_points'];
        $data['change_mem_disc'] = $this->input->post('change_mem_disc');
        $data['modified_on'] = date('Y-m-d H:i:s');
        $data['modified_user'] = $_SESSION['username'];
        $status_type = "In";


        $result = $this->Membership_model->change_membership_save($data,$plan_type,$process);

        $update_member_activate = $this->Membership_model->update_change_membership_activate($data);
        $update_change_member_points_in_parties = $this->Membership_model->update_change_membership_in_parties($data);
        add_member_card_history($data['change_mem_card_no'],$data['party_id_change_mem'],$process,$data['chge_mem_add_points']);
        $update_change_member_sts_type = $this->Membership_model->update_change_membership_sts_type($status_type,$data);

        if($result)
        {
            $this->session->set_flashdata('g_success', 'Change Membership have been Updated successfully...');
        }else{
           $this->session->set_flashdata('g_err', 'Could not update Change Membership details!');
        }
        redirect('Membership');
    }

    // change Membership card Type
    public function get_change_membership_type()
    {
         $change_mem_type = $_POST['change_mem_type'];
        $mem_chg_act_list = $this->Membership_model->get_change_mem_activate_list($change_mem_type); 
        $option.='<option value="">Select Card No</option>';
        foreach($mem_chg_act_list as $memp_chg_type)
        {
            $mno = $memp_chg_type['MEMBERSHIP_NO'];
            $option.='<option value="'.$mno.'">'.$mno.'</option>';
        }
        echo $option;
    }

    // Membership history
    public function membership_history($pid)
    {
        // print_r($pid);exit();
        $data['user_fill'] = $this->input->post('user_fill');
        if($data['user_fill']!='')
        {
            $uname =" AND CREATED_BY ='".$data['user_fill']."'";
        }
        else
        {
            $uname ='';
        }

        $data['type_fill'] = $this->input->post('type_fill');
        if($data['type_fill']!='')
        {
            $tname =" AND PROCESS ='".$data['type_fill']."'";
        }
        else
        {
            $tname ='';
        }

        $data['status_fill'] = $this->input->post('status_fill');
        if($data['status_fill']!='')
        {
            $sname =" AND STATUS_TYPE ='".$data['status_fill']."'";
        }
        else
        {
            $sname ='';
        }

        $data['dt_fill'] = $this->input->post('dt_fill_nontag_list');

        $data['from_date_fillter'] = $this->input->post('from_date_fillter_nontag_list');
        $data['to_date_fillter'] = $this->input->post('to_date_fillter_nontag_list');
        $fdate ='';
        $tdate ='';
        //  print_r($data['dt_fill']);exit();
        if($data['dt_fill']=="all"){
            $fdate ='';
            $tdate ='';
        }
        if($data['dt_fill']=="today"){
            $data['today_date_fillter'] = date("Y-m-d");
            $fdate =" AND LOG_DATE='".$data['today_date_fillter']."'";
            $tdate ='';  
        }
        if($data['dt_fill']=="week"){
            $today=date('l');
            if($today=="Sunday"){
                $data['week_from_date_fillter']=date(' Y-m-d', strtotime("sunday 0 week"));
           
                $data['week_to_date_fillter']=date(' Y-m-d', strtotime("saturday 1 week"));
               // print_r($data['week_to_date_fillter']);exit;
                    $fdate =" AND LOG_DATE>='".$data['week_from_date_fillter']."'";
                $tdate =" AND LOG_DATE<='".$data['week_to_date_fillter']."'";
        
            }else{
             $data['week_from_date_fillter']=date(' Y-m-d', strtotime("sunday -1 week"));
           
             $data['week_to_date_fillter']=date(' Y-m-d', strtotime("saturday 0 week"));
            //  print_r($data['week_to_date_fillter']);exit;
                 $fdate =" AND LOG_DATE>='".$data['week_from_date_fillter']."'";
             $tdate =" AND LOG_DATE<='".$data['week_to_date_fillter']."'";
            }
                     }
            if($data['dt_fill']=="monthly"){
           
                $first=date('Y-m-01');
                $last=date('Y-m-t');
                $fdate =" AND LOG_DATE>='".$first."'";
                
               
                    $tdate ="AND LOG_DATE<='".$last."'";
                }
                if($data['dt_fill']=="custom_date"){
                if($data['from_date_fillter']!=''){
                    $first=date('Y-m-d',strtotime($data['from_date_fillter']));
                    $fdate =" AND LOG_DATE>='".$first."'";
                    
                    }
                    else{
                        $fdate ='';
                    }
                    if($data['to_date_fillter']!=''){
                        $last=date('Y-m-d',strtotime($data['to_date_fillter']));
                        $tdate =" AND LOG_DATE<='".$last."'";
                        
                        }
                        else{
                            $tdate ='';
                        } }

        $page = isset($_GET['page']) ? $_GET['page'] : 1;
        $limit      = 10;
        $offset     = ($page - 1) * $limit +1;
        $page_limit=$offset+$limit-1;

        $data['mem_history_list'] = $this->Membership_model->get_mem_history_list($pid,$fdate,$tdate,$uname,$tname,$sname,$offset,$page_limit);


          $data['count']=count($data['mem_history_list']);
          // print_r($data['mem_history_list']);exit();

        $mem_history_party_name = $this->Membership_model->get_mem_history_party_name($pid);
        $data['mem_history_party_name'] = $mem_history_party_name;
        $data['pid'] = $pid;
        $data['user_list_fill'] = $this->Membership_model->get_user_list();
        $data['process_list_fill'] = $this->Membership_model->get_process_list();

        $this->load->view('membership/membership_history',$data);
    }
    

}
?>
