<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/* ************************************************************************************
        Purpose : To handle all Department functions 2022-08-19
***************************************************************************************/
class Old_gold_audit extends CI_Controller {

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
        $this->session->set_userdata('comtitle', 'Old_gold_audit');
    }


    public function index()

    {

         $data['item_list'] = $this->db->query("SELECT * FROM ITEMS WHERE STATUS='Y'")->result_array();
       
        $this->load->view('old_gold_audit/old_gold_audit',$data);
       
    }


    public function audit_check()

    {
        $id=$_POST['id'];
        $count=$_POST['count'];
        $weight=$_POST['weight'];
        $data['added_user'] = $_SESSION['username'];
        $data['created_on'] = date('Y-m-d H:i:s');
        $date=date('Y-m-d');

        $item_list = $this->db->query("SELECT * FROM ITEMS WHERE SNO='".$id."'")->row();
if(($item_list->OLD_GOLD_COUNT==$count)&&($item_list->OLD_GOLD_WEIGHT-0.1<=$weight)&&($item_list->OLD_GOLD_WEIGHT+0.1>=$weight)){

    $res = $this->db->query("INSERT INTO old_gold_audit_history (
            
        date,
        item,
        count,
        weight,
        additional_status,
        created_on,
        created_by,
        status
    
        ) VALUES(
            '".$date."',
            '".$id."',
            '".$count."',
            '".$weight."',
            'Matched',
             '".$data['created_on']."',
             '".$data['added_user']."',
             'Y'
    )");
    // redirect('Nontag_audit/audit_history');

    $description='';
}
else{

    $res = $this->db->query("INSERT INTO old_gold_audit_history (
            
        date,
        item,
        count,
        weight,
        additional_status,
        created_on,
        created_by,
        status
    
        ) VALUES(
            '".$date."',
            '".$id."',
            '".$count."',
            '".$weight."',
            'Mismatched',
             '".$data['created_on']."',
             '".$data['added_user']."',
             'Y'
    )");

    $description='<div class="row mt-4">
														
    <div class="col-lg-12 d-flex justify-content-center align-items-center">
        <label class="col-form-label fw-semibold fs-1 text-white" style="background-color:#eb5d14;border-radius: 8px;padding: 5px 15px 5px 15px;">Mismatched...</label>
    </div>
</div>
<div class="row mt-4">
    <div class="d-flex justify-content-center align-items-center">
        <label class="col-lg-1 col-form-label fw-semibold fs-6">Descrption</label>
        <div class="col-lg-3 fv-row fv-plugins-icon-container">
            <textarea class="form-control form-control-solid" rows="4" placeholder="" name="update_description" id="update_description"></textarea>
        </div>&emsp;
        <button class="col-lg-1 btn btn-sm btn-primary me-2">Notify</button>
    </div>
</div>';
}
add_notification(date('Y-m-d H:i:s'), '', "Inventory", "New Old Gold Audit ", ' Created By ' .$_SESSION['username'],'', $_SESSION['USERID'], '0', '');

        echo $description;
    }
    public function update_description()
    {

        $description = $this->input->post('update_description');
        $get_id= $this->db->query("SELECT  *  FROM old_gold_audit_history  ORDER BY id DESC ")->row();
        // print_r($get_id->id);exit;
        $res=$this->db->query("UPDATE old_gold_audit_history SET description='".$description."'  WHERE id = '".$get_id->id."'");
        redirect('Old_gold_audit/audit_history');
    }
    public function audit_history()

    {
        $data['dt_fill'] = $this->input->post('dt_fill_nontag_wallet_history');

        $data['from_date_fillter'] = $this->input->post('from_date_fillter_nontag_wallet_history');
        $data['to_date_fillter'] = $this->input->post('to_date_fillter_nontag_wallet_history');
        $fdate ='';
        $tdate ='';
        //  print_r($data['dt_fill']);exit();
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

        $data['audit_history_list']  = $this->db->query(" SELECT  * FROM 
        ( SELECT *, ROW_NUMBER() OVER (ORDER BY id ASC) AS sl FROM old_gold_audit_history WHERE  status!='' $fdate $tdate $uname )N 
         WHERE      sl BETWEEN $offset AND $page_limit ")->result_array();
      $data['count']=count( $this->db->query("SELECT * FROM old_gold_audit_history WHERE status!='' $fdate $tdate  $uname")->result_array());
     
       
        $this->load->view('old_gold_audit/old_gold_audit_history',$data);
       
    }

    public function old_gold_audit_view(){
        
        $id=$_POST['id'];
        $old_gold_audit_view = $this->db->query("SELECT * FROM old_gold_audit_history WHERE id='".$id."'")->row();
        $item_name  = $this->db->query("SELECT * FROM ITEMS WHERE  SNO='". $old_gold_audit_view->item."' ")->row();
        if($old_gold_audit_view->description!=''){
            $description= $old_gold_audit_view->description;
         }
         else{
             $description='-';
         }
 
         echo    ''.'||'.$item_name->ITEMNAME.'||'.$old_gold_audit_view->count.'||'.$old_gold_audit_view->weight.'||'.$description.'||'.$old_gold_audit_view->id;

        // echo    ''.'||'.$item_name->ITEMNAME.'||'.$old_gold_audit_view->count.'||'.$old_gold_audit_view->weight.'||'.$old_gold_audit_view->additional_status;
    }

    public function update_resolve()
    {

        $id = $this->input->post('view_id');
        $resolve = $this->input->post('resolve');
        
        
        $res=$this->db->query("UPDATE old_gold_audit_history SET resolve='".$resolve."',status='R'  WHERE id = '".$id."'");
       
        add_notification(date('Y-m-d H:i:s'), '', "Inventory", "Update resolve Old Gold Audit ",  ' Updated By ' .$_SESSION['username'],'', $_SESSION['USERID'], '0','');
        redirect('Old_gold_audit/audit_history');
    }
}