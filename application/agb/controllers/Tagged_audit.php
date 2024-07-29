<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/* ************************************************************************************
        Purpose : To handle all Department functions 2022-08-19
***************************************************************************************/
class Tagged_audit extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
      
        $this->load->library('user_agent');

     

        if (isset($this->session->userdata['username']) && $this->session->userdata['username'] == TRUE)
        {
            //do something
        }else{
            redirect('login'); //if session is not there, redirect to login page
        } 
        date_default_timezone_set("Asia/Kolkata");
        $this->session->set_userdata('comtitle', 'Tagentry');
    }


    public function index()

    {

        $data['tagentry_list'] = $this->db->query("SELECT * FROM tag_entry WHERE status!='N' AND status!='S' order by tag_id ")->result_array();
       
        $this->load->view('tagged_audit/tagged_audit',$data);
       
    }

    public function audit_save()

    {
        $description = $this->input->post('audit_description');
        $tag_id = $this->input->post('tag_id_form');
        $count=count($tag_id);
        $data['added_user'] = $_SESSION['username'];
        $data['created_on'] = date('Y-m-d H:i:s');
        $date=date('Y-m-d');
        $get_id=$this->db->query("SELECT * FROM tagged_audit_history order by id desc ")->row();
        if(isset($get_id)){ $audit_id=$get_id->id+1; }else{ $audit_id =1;}
        $tagentry=$this->db->query("SELECT SUM(net_weight) as tot_net_weight,count(net_weight) as count_net_weight FROM tag_entry WHERE status!='N' ")->row();
        $audit_count=0;$audit_weight=0;
        for($i=0;$i<$count;$i++){
        $tagged_detail= $this->db->query("SELECT * FROM tag_entry WHERE tag_id='".$tag_id[$i]."' ")->row();
       
       
       $res = $this->db->query("INSERT INTO tagged_audit_history_detail (
            
            audit_id,
            tag_id,
            item,
            subitem,
            weight,
            net_weight
        
            ) VALUES(
            '".$audit_id."',
            '".$tag_id[$i]."',
            '".$tagged_detail->item_name."',
            '".$tagged_detail->subitem_name."',
            '".$tagged_detail->weight."',
            '".$tagged_detail->net_weight."'
           
        )");
$audit_count+=1;
$audit_weight+=$tagged_detail->net_weight;
       }


       $res1 = $this->db->query("INSERT INTO tagged_audit_history (
            
        date,
        scanned_count,
        scanned_weight,
        bal_count,
        bal_weight,
        description,
        created_on,
        created_by,
        status
    
        ) VALUES(
        '".$date."',
        '".$audit_count."',
        '".$audit_weight."',
        '".($tagentry->count_net_weight-$t_count)."',
        '".($tagentry->tot_net_weight-$audit_weight)."',
        '".$description."',
        '".$data['created_on']."',
        '".$data['added_user']."',
        'Y'
       
    )");

add_notification(date('Y-m-d H:i:s'), '', "Inventory", "New Tagged Audit ", ' Audited By ' .$_SESSION['username'],'', $_SESSION['USERID'], '0', '');

    redirect('Tagged_audit/audit_history');
    }

    public function audit_history()

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
            $fdate =" AND date='".$data['today_date_fillter']."'";
            $tdate ='';
            
                
            
        }
        if($data['dt_fill']=="week"){
            $today=date('l');
            if($today=="Sunday"){
                $data['week_from_date_fillter']=date(' Y-m-d', strtotime("sunday 0 week"));
           
                $data['week_to_date_fillter']=date(' Y-m-d', strtotime("saturday 1 week"));
               // print_r($data['week_to_date_fillter']);exit;
                    $fdate =" AND date>='".$data['week_from_date_fillter']."'";
                $tdate =" AND date<='".$data['week_to_date_fillter']."'";
        
            }else{
             $data['week_from_date_fillter']=date(' Y-m-d', strtotime("sunday -1 week"));
           
             $data['week_to_date_fillter']=date(' Y-m-d', strtotime("saturday 0 week"));
            //  print_r($data['week_to_date_fillter']);exit;
                 $fdate =" AND date>='".$data['week_from_date_fillter']."'";
             $tdate =" AND date<='".$data['week_to_date_fillter']."'";
            }
                     }
                    if($data['dt_fill']=="monthly"){
                   
                        $first=date('Y-m-01');
                        $last=date('Y-m-t');
                        $fdate =" AND date>='".$first."'";
                        
                       
                            $tdate ="AND date<='".$last."'";
                        }
                        if($data['dt_fill']=="custom Date"){
                        if($data['from_date_fillter']!=''){
                            $first=date('Y-m-d',strtotime($data['from_date_fillter']));
                            $fdate =" AND date>='".$first."'";
                            
                            }
                            else{
                                $fdate ='';
                            }
                            if($data['to_date_fillter']!=''){
                                $last=date('Y-m-d',strtotime($data['to_date_fillter']));
                                $tdate =" AND date<='".$last."'";
                                
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
                $page       = isset($_GET['page']) ? $_GET['page'] : 1;
        
                $limit      = 10;
                $offset     = ($page - 1) * $limit +1;
                $page_limit=$offset+$limit-1;

                $data['user_list']=$this->db->query("SELECT * FROM USERLIST ")->result_array();



        // $data['tagged_audit_list'] = $this->db->query("SELECT * FROM tagged_audit_history WHERE status!='' $fdate $tdate $uname  ")->result_array();
        $data['tagged_audit_list']  = $this->db->query(" SELECT  * FROM 
        ( SELECT *, ROW_NUMBER() OVER (ORDER BY id ASC) AS sl FROM tagged_audit_history WHERE  status!='' $fdate $tdate $uname )N 
         WHERE      sl BETWEEN $offset AND $page_limit ")->result_array();
        $data['count']=count($this->db->query("SELECT * FROM tagged_audit_history WHERE status!='' $fdate $tdate $uname  ")->result_array());
        $this->load->view('tagged_audit/tagged_audit_history',$data);
       
    }

    public function tagged_audit_view($id)

    {
        $data['tagged_audit_list'] = $this->db->query("SELECT * FROM tagged_audit_history_detail WHERE audit_id='".$id."'  ")->result_array();
        $data['tagged_audit'] = $this->db->query("SELECT * FROM tagged_audit_history WHERE id='".$id."'  ")->row();
       
        $this->load->view('tagged_audit/tagged_audit_view',$data);
       
    }
    public function tagged_audit_resolve()

    {
        $data['resolve'] = $this->input->post('resolve');
        $data['resolve_id'] = $this->input->post('resolve_id');
         
      
        $res=$this->db->query("UPDATE tagged_audit_history SET resolve='".$data['resolve']."',status='R'  WHERE id = '".$data['resolve_id']."'");
       
add_notification(date('Y-m-d H:i:s'), '', "Inventory", "Resolve Tagged Audit ", ' Resolved By ' .$_SESSION['username'],'', $_SESSION['USERID'], '0', '');
       
        redirect('Tagged_audit/audit_history');
    }

}