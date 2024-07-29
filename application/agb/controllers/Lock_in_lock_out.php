<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/* ************************************************************************************
        Purpose : To handle all Department functions 2022-08-19
***************************************************************************************/
class Lock_in_lock_out extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model(array("lock_in_lock_out_model"));
        $this->load->library('user_agent');

        $fin_year=$this->lock_in_lock_out_model->get_fin_years_list();
        $db=substr($fin_year->DBNAME,0,strlen($fin_year->DBNAME)-4);
        // echo $db;exit();

        $config_app = switch_db_dynamic($db);
        $this->lock_in_lock_out_model->other_db = $this->load->database($config_app,TRUE);


        if (isset($this->session->userdata['username']) && $this->session->userdata['username'] == TRUE)
        {
            //do something
        }else{
            redirect('login'); //if session is not there, redirect to login page
        } 
        date_default_timezone_set("Asia/Kolkata");
        $this->session->set_userdata('comtitle', 'Lock_in_lock_out');
    }
    public function index()

    {
        $data['company_list']  = $this->db->query("SELECT * FROM COMPANY WHERE ACTIVE='Y'  ")->result_array();
        $this->load->view('lock_in_lock_out/lockin',$data);
    }
    public function lock_out()

    {
        $data['company_list']  = $this->db->query("SELECT * FROM COMPANY WHERE ACTIVE='Y'  ")->result_array();
        $this->load->view('lock_in_lock_out/lockout',$data);
    }
    public function lock_in()
    {
        $company_id=$this->input->post('company_id');
        $scanned_items=$this->input->post('scanned_items');
        $created_by    = $_SESSION['username'];
        $created_on    = date('Y-m-d H:i:s');
        $last_id_detail=$this->db->query("select * from lock_in where status='Y' order by id desc")->row();
        if(isset($last_id_detail))
        {
            $last_id=$last_id_detail->id+1;
        }
        else
        {
            $last_id=1;
        }
        $count=count($scanned_items);
        $item_count=0;$net_weight=0;$weight=0;
        $lock_reason=$this->input->post('li_reason');;
        $loan_no_list='';
       for($i=0;$i<$count;$i++)
       {
            $loan_details=$this->db->query("select * from LOANS where BILLNO='".$scanned_items[$i]."'")->row();
            $res=$this->db->query("insert into lockin_lockout_history(locked_id,loan_no,locked_status,status)values('".$last_id."','".$scanned_items[$i]."','in','Y')");
            $upd_loan=$this->db->query("UPDATE LOANS set LOAN_STATUS=7 WHERE BILLNO='".$scanned_items[$i]."'");
          $item_count+=1;

          $net_weight+=$loan_details->NETWEIGHT;
          $weight+=$loan_details->WEIGHT;
          if($i==0)
            $loan_no_list=$scanned_items[$i];
          else
            $loan_no_list.=','.$scanned_items[$i];
        }
       $result=$this->db->query("insert into lock_in(company,loan_no,item_count,net_weight,created_on,created_by,status,locked_status,lock_reason,weight)values('".$company_id."','".$loan_no_list."','".$item_count."','".$net_weight."','".$created_on."','".$created_by."','Y','in','".$lock_reason."','".$weight."')");
        redirect('Lock_in_lock_out/history');
    }
    public function lock_out_save()
    {
        $company_id=$this->input->post('company_id');
        $scanned_items=$this->input->post('scanned_items');
        $created_by    = $_SESSION['username'];
        $created_on    = date('Y-m-d H:i:s');
        $last_id_detail=$this->db->query("select * from lock_in where status='Y' order by id desc")->row();
        if(isset($last_id_detail))
        {
            $last_id=$last_id_detail->id+1;
        }
        else
        {
            $last_id=1;
        }
        $count=count($scanned_items);
        $item_count=0;$net_weight=0;$weight=0;
        $lock_reason=$this->input->post('lo_reason');;
        $loan_no_list='';
       for($i=0;$i<$count;$i++)
       {
            $loan_details=$this->db->query("select * from LOANS where BILLNO='".$scanned_items[$i]."'")->row();
            // $res=$this->db->query("insert into lockin_lockout_history(locked_id,loan_no,locked_status,status)values('".$last_id."','".$scanned_items[$i]."','out','Y')");
            $res=$this->db->query("update lockin_lockout_history set locked_status='out' where loan_no='".$scanned_items[$i]."'");

            $upd_loan=$this->db->query("UPDATE LOANS set LOAN_STATUS=8, IS_LOCK_OUT=1 WHERE BILLNO='".$scanned_items[$i]."'");

          $item_count+=1;
          $net_weight+=$loan_details->NETWEIGHT;
          $weight+=$loan_details->WEIGHT;
           if($i==0)
            $loan_no_list=$scanned_items[$i];
          else
            $loan_no_list.=','.$scanned_items[$i];
        }
       $result=$this->db->query("insert into lock_in(company,loan_no,item_count,net_weight,created_on,created_by,status,locked_status,lock_reason,weight)values('".$company_id."','".$loan_no_list."','".$item_count."','".$net_weight."','".$created_on."','".$created_by."','Y','out','".$lock_reason."','".$weight."')");
         redirect('Lock_in_lock_out/lock_out_history');
    }

    public function scanned_item()
    {
        $data['id']=$_POST['id'];
        $rc=$_POST['rc'];

        $loan_details=$this->db->query("select * from LOANS where BILLNO='".$data['id']."'")->row();
        // echo ($loan_details->COMPANYCODE);exit();
        if(isset($loan_details->COMPANYCODE))
        {
            if($loan_details->LOAN_STATUS > 1){
                $company = $this->db->query("SELECT * FROM COMPANY WHERE ACTIVE='Y' AND COMPANYCODE='".$loan_details->COMPANYCODE."' ")->row();
                $tr='<tr id="'.$loan_details->BILLNO.'"><td>'.($rc+1).'</td><td>'.$company->COMPANYNAME.'</td><td><input type="hidden" id="scanned_items_'.($rc+1).'" name="scanned_items[]" value="'.$loan_details->BILLNO.'">'.$loan_details->BILLNO.'</td><td>'.$loan_details->WEIGHT.'</td><td>'.$loan_details->NETWEIGHT.'</td><td><a href="#" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm btnDelete" data-bs-toggle="modal" data-bs-target="#" onclick="delete_row('.$loan_details->BILLNO.')"><i class="fas fa-trash fs-4"></i></a><a  class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm" data-bs-toggle="modal" data-bs-target="#kt_modal_view_individual_pledge_item" onclick="detail_view('."'".$loan_details->BILLNO."'".')" ><i class="bi bi-eye-fill fs-2" ></i></a></td></tr>';
            }
            else{
                $tr='2';
            }
            // echo $tr;
        }
        else
        {
            $tr='0';
        }
      

        echo $tr;
    } 

     public function scanned_item_lock_out()
    {
        $data['id']=$_POST['id'];
        $rc=$_POST['rc'];

        // $check=$this->db->query("select * from lockin_lockout_history where loan_no='".$data['id']."' and locked_status='in'")->row();
        // if(isset($check->loan_no))
        // {
            $loan_details=$this->db->query("select * from LOANS where BILLNO='".$data['id']."'")->row();
            // echo ($loan_details->COMPANYCODE);exit();
            if(isset($loan_details->COMPANYCODE))
            {
               $company = $this->db->query("SELECT * FROM COMPANY WHERE ACTIVE='Y' AND COMPANYCODE='".$loan_details->COMPANYCODE."' ")->row();
                $tr='<tr id="'.$loan_details->BILLNO.'"><td>'.($rc+1).'</td><td>'.$company->COMPANYNAME.'</td><td><input type="hidden" id="scanned_items_'.($rc+1).'" name="scanned_items[]" value="'.$loan_details->BILLNO.'">'.$loan_details->BILLNO.'</td><td>'.$loan_details->WEIGHT.'</td><td>'.$loan_details->NETWEIGHT.'</td><td><a href="#" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm btnDelete" data-bs-toggle="modal" data-bs-target="#" onclick="delete_row('.$loan_details->BILLNO.')"><i class="fas fa-trash fs-4"></i></a><a  class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm" data-bs-toggle="modal" data-bs-target="#kt_modal_view_individual_pledge_item" onclick="detail_view('."'".$loan_details->BILLNO."'".')" ><i class="bi bi-eye-fill fs-2" ></i></a></td></tr>';
                // echo $tr;
            }
            else
            {
                $tr='0';
            }
        // }
        // else
        // {
        //     $tr='1';
        // }
        echo $tr;
    } 
    public function pledge_item_view()
    {
        $id=$_POST['id'];
        $loan_details=$this->db->query("select * from LOANS where BILLNO='".$id."'")->row();
       $company = $this->db->query("SELECT * FROM COMPANY WHERE ACTIVE='Y' AND COMPANYCODE='".$loan_details->COMPANYCODE."' ")->row();

        $pledge_info=$this->db->query("select * from PLEDGEINFO  WHERE BILLNO='".$id."'")->result_array();
        $tr='';
       $i=1; foreach($pledge_info as $plist){
        $pledgename=$plist['PLEDGENAME'];
        $purity=$plist['PURITY'];
        $WEIGHT=$plist['WEIGHT'];
        $STONEWEIGHT=$plist['STONEWEIGHT'];
        $LESS=$plist['LESS'];
        $NETWEIGHT=$plist['NETWEIGHT'];
        $img=$plist['PLEDGE_PHOTO'];

    $tr.='<tr><td>'.$i.'</td><td>'.$pledgename.'</td><td>'.$purity.'</td><td>'.$WEIGHT.'</td><td>'.$STONEWEIGHT.'</td><td>'.$LESS.'</td><td>'.$NETWEIGHT.'</td><td>'.$img.'</td></tr>';
    $i++;
        }
        
        echo $company->COMPANYNAME.'||'.$id.'||'.$loan_details->JEWEL_TYPE.'||'.$loan_details->NETWEIGHT.'||'.$tr;
       

    }
    public function history()
    {
        $data['dt_fill'] = $this->input->post('dt_fill_nontag_wallet_history');

        $data['from_date_fillter'] = $this->input->post('from_date_fillter_nontag_wallet_history');
        $data['to_date_fillter'] = $this->input->post('to_date_fillter_nontag_wallet_history');
        $fdate ='';
        $tdate ='';
    
        if($data['dt_fill']=="all"){
            $fdate ='';
            $tdate ='';
        
        }
        if($data['dt_fill']=="today"){
            $data['today_date_fillter'] = date("Y-m-d");
            $fdate =" AND created_on='".$data['today_date_fillter']."'";
            $tdate ='';
            
                
            
        }
        if($data['dt_fill']=="week"){
            $today=date('l');
            if($today=="Sunday"){
                $data['week_from_date_fillter']=date(' Y-m-d', strtotime("sunday 0 week"));
           
                $data['week_to_date_fillter']=date(' Y-m-d', strtotime("saturday 1 week"));
               // print_r($data['week_to_date_fillter']);exit;
                    $fdate =" AND created_on>='".$data['week_from_date_fillter']."'";
                $tdate =" AND created_on<='".$data['week_to_date_fillter']."'";
        
            }else{
             $data['week_from_date_fillter']=date(' Y-m-d', strtotime("sunday -1 week"));
           
             $data['week_to_date_fillter']=date(' Y-m-d', strtotime("saturday 0 week"));
            //  print_r($data['week_to_date_fillter']);exit;
                 $fdate =" AND created_on>='".$data['week_from_date_fillter']."'";
             $tdate =" AND created_on<='".$data['week_to_date_fillter']."'";
            }
                     }
                    if($data['dt_fill']=="monthly"){
                   
                        $first=date('Y-m-01');
                        $last=date('Y-m-t');
                        $fdate =" AND created_on>='".$first."'";
                        
                       
                            $tdate ="AND created_on<='".$last."'";
                        }
                        if($data['dt_fill']=="custom Date"){
                        if($data['from_date_fillter']!=''){
                            $first=date('Y-m-d',strtotime($data['from_date_fillter']));
                            $fdate =" AND created_on>='".$first."'";
                            
                            }
                            else{
                                $fdate ='';
                            }
                            if($data['to_date_fillter']!=''){
                                $last=date('Y-m-d',strtotime($data['to_date_fillter']));
                                $tdate =" AND created_on<='".$last."'";
                                
                                }
                                else{
                                    $tdate ='';
                                } }
        
                                $data['username'] = $this->input->post('username');
                if($data['username']!=''){
                $uname =" AND created_by ='".$data['username']."'";
                
                }
                else{
                    $uname ='';
                }
                $data['company'] = $this->input->post('company');
                if($data['company']!=''){
                $cname =" AND company ='".$data['company']."'";
                
                }
                else{
                    $cname ='';
                }
                $page       = isset($_GET['page']) ? $_GET['page'] : 1;
        
                $limit      = 10;
                $offset     = ($page - 1) * $limit +1;
                $page_limit=$offset+$limit-1;

        // $data['history_list']=$this->db->query("select * from lock_in where status='Y' $fdate $tdate $uname $cname order by created_on desc")->result_array();
        $data['history_list']  = $this->db->query(" SELECT  * FROM 
        ( SELECT *, ROW_NUMBER() OVER (ORDER BY created_on DESC) AS sl FROM lock_in WHERE  status='Y' and locked_status='in' $fdate $tdate $uname $cname)N 
         WHERE      sl BETWEEN $offset AND $page_limit ")->result_array();
        $data['count']=count($this->db->query("select * from lock_in where status='Y' and locked_status='in' $fdate $tdate $uname $cname order by created_on desc")->result_array());
        $data['company_list']  = $this->db->query("SELECT * FROM COMPANY WHERE ACTIVE='Y'  ")->result_array();
        $data['user_list']=$this->db->query("SELECT * FROM USERLIST ")->result_array();


        // print_r($data['user_list']);exit;
        $this->load->view('lock_in_lock_out/history',$data);
    }
    public function lock_out_history()
    {
        $data['dt_fill'] = $this->input->post('dt_fill_nontag_wallet_history');

        $data['from_date_fillter'] = $this->input->post('from_date_fillter_nontag_wallet_history');
        $data['to_date_fillter'] = $this->input->post('to_date_fillter_nontag_wallet_history');
        $fdate ='';
        $tdate ='';
    
        if($data['dt_fill']=="all"){
            $fdate ='';
            $tdate ='';
        
        }
        if($data['dt_fill']=="today"){
            $data['today_date_fillter'] = date("Y-m-d");
            $fdate =" AND created_on='".$data['today_date_fillter']."'";
            $tdate ='';
            
                
            
        }
        if($data['dt_fill']=="week"){
            $today=date('l');
            if($today=="Sunday"){
                $data['week_from_date_fillter']=date(' Y-m-d', strtotime("sunday 0 week"));
           
                $data['week_to_date_fillter']=date(' Y-m-d', strtotime("saturday 1 week"));
               // print_r($data['week_to_date_fillter']);exit;
                    $fdate =" AND created_on>='".$data['week_from_date_fillter']."'";
                $tdate =" AND created_on<='".$data['week_to_date_fillter']."'";
        
            }else{
             $data['week_from_date_fillter']=date(' Y-m-d', strtotime("sunday -1 week"));
           
             $data['week_to_date_fillter']=date(' Y-m-d', strtotime("saturday 0 week"));
            //  print_r($data['week_to_date_fillter']);exit;
                 $fdate =" AND created_on>='".$data['week_from_date_fillter']."'";
             $tdate =" AND created_on<='".$data['week_to_date_fillter']."'";
            }
                     }
                    if($data['dt_fill']=="monthly"){
                   
                        $first=date('Y-m-01');
                        $last=date('Y-m-t');
                        $fdate =" AND created_on>='".$first."'";
                        
                       
                            $tdate ="AND created_on<='".$last."'";
                        }
                        if($data['dt_fill']=="custom Date"){
                        if($data['from_date_fillter']!=''){
                            $first=date('Y-m-d',strtotime($data['from_date_fillter']));
                            $fdate =" AND created_on>='".$first."'";
                            
                            }
                            else{
                                $fdate ='';
                            }
                            if($data['to_date_fillter']!=''){
                                $last=date('Y-m-d',strtotime($data['to_date_fillter']));
                                $tdate =" AND created_on<='".$last."'";
                                
                                }
                                else{
                                    $tdate ='';
                                } }
        
                                $data['username'] = $this->input->post('username');
                if($data['username']!=''){
                $uname =" AND created_by ='".$data['username']."'";
                
                }
                else{
                    $uname ='';
                }
                $data['company'] = $this->input->post('company');
                if($data['company']!=''){
                $cname =" AND company ='".$data['company']."'";
                
                }
                else{
                    $cname ='';
                }
                $page       = isset($_GET['page']) ? $_GET['page'] : 1;
        
                $limit      = 10;
                $offset     = ($page - 1) * $limit +1;
                $page_limit=$offset+$limit-1;

        // $data['history_list']=$this->db->query("select * from lock_in where status='Y' $fdate $tdate $uname $cname order by created_on desc")->result_array();
        $data['history_list']  = $this->db->query(" SELECT  * FROM 
        ( SELECT *, ROW_NUMBER() OVER (ORDER BY created_on DESC) AS sl FROM lock_in WHERE  status='Y' and locked_status='out' $fdate $tdate $uname $cname)N 
         WHERE      sl BETWEEN $offset AND $page_limit ")->result_array();
        $data['count']=count($this->db->query("select * from lock_in where status='Y' and locked_status='out' $fdate $tdate $uname $cname order by created_on desc")->result_array());
        $data['company_list']  = $this->db->query("SELECT * FROM COMPANY WHERE ACTIVE='Y'  ")->result_array();
        $data['user_list']=$this->db->query("SELECT * FROM USERLIST ")->result_array();


        // print_r($data['user_list']);exit;
        $this->load->view('lock_in_lock_out/lockout_history_view',$data);
    }

    public function view_history($id)
    {
        // print_r(1);
        $data['lock_in_lock_out']=$this->db->query("select * from lock_in where status='Y' and id='".$id."' ")->row();
        $data['lock_in_lock_out_detail']=$this->db->query("select * from lockin_lockout_history where status='Y' and locked_id='".$id."'  ")->result_array();
        $this->load->view('lock_in_lock_out/history_view',$data);
    
    }
    public function lockout_view_history($id)
    {
        // print_r(1);
        $data['lock_in_lock_out']=$this->db->query("select * from lock_in where status='Y' and id='".$id."' ")->row();
        $loan_nos=explode(',', $data['lock_in_lock_out']->loan_no);
        $cnt=count($loan_nos);
        $loan_no_str='';
        for($i=0;$i<$cnt;$i++)
        {
            if($i==0)
                $loan_no_str="'".$loan_nos[$i]."'";
            else
                $loan_no_str.=",'".$loan_nos[$i]."'";
        }
        $data['lock_in_lock_out_detail']=$this->db->query("select * from lockin_lockout_history where loan_no in(".$loan_no_str.")  ")->result_array();
        $this->load->view('lock_in_lock_out/lockout_history_detail_view',$data);
    
    }


}