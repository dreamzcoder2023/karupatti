<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/* ************************************************************************************
        Purpose : To handle all Membershipcardavailable functions 2022-08-19
***************************************************************************************/
class Membershipcardavailable extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        // $this->load->model(array("jst_inventory_model","Accountsgroup_model"));
        // $this->load->library('user_agent');

        // $fin_year=$this->Accountsgroup_model->get_fin_years_list();
        // $db=substr($fin_year->DBNAME,0,strlen($fin_year->DBNAME)-4);
        // //echo $db;exit;
        // $config_app = switch_db_dynamic($db);
        
        // $this->jst_inventory_model->other_db = $this->load->database($config_app,TRUE);

        if (isset($this->session->userdata['username']) && $this->session->userdata['username'] == TRUE)
        {
            //do something
        }else{
            redirect('login'); //if session is not there, redirect to login page
        } 
        date_default_timezone_set("Asia/Kolkata");
        // $this->session->set_userdata('comtitle', 'Tagentry');
    }


    public function index()
{


    $this->load->view('membership_card_available/membership_card_activate');


}


public function list()
{

    $data['card_type_fill'] = $this->input->post('card_type_fill');
        if($data['card_type_fill']!=''){
        $cname =" AND CARD_TYPE='".$data['card_type_fill']."'";
        
        }
        else{
            $cname ='';
        }

        $data['user_fill'] = $this->input->post('user_fill');
        if($data['user_fill']!=''){
        $uname =" AND CREATED_BY='".$data['user_fill']."' OR MODIFIED_BY='".$data['user_fill']."'";
        
        }
        else{
            $uname ='';
        }

        

        $page       = isset($_GET['page']) ? $_GET['page'] : 1;

        $limit      = 10;
        $offset     = ($page - 1) * $limit +1;
        $page_limit=$offset+$limit-1;


        // print_r($uname);exit;
       
        $data['user_list']=$this->db->query("SELECT * FROM USERLIST ")->result_array();
        $data['count']=count( $this->db->query("SELECT * FROM MEMBERSHIP_ACTIVATE WHERE STATUS='Y' $cname $uname")->result_array());
    // $data['activate_list']=$this->db->query("SELECT * FROM MEMBERSHIP_ACTIVATE WHERE STATUS='Y' $cname $uname")->result_array();
    $data['activate_list']  = $this->db->query(" SELECT  * FROM  ( SELECT *, ROW_NUMBER() OVER (ORDER BY ACTIVATE_ID DESC) AS sl FROM MEMBERSHIP_ACTIVATE WHERE  STATUS='Y' $cname $uname )N  WHERE sl BETWEEN $offset AND $page_limit ")->result_array();

// print_r( $data['activate_list'] );exit;
    $this->load->view('membership_card_available/membership_card_activate_list',$data);


}
public function activate()
{
    $type = $this->input->post('type_list');
    $card = $this->input->post('card_list');
    $date = $this->input->post('date_list');
    $today=date('Y-m-d');
    $data['status'] = 'Y';
    $data['added_user'] = $_SESSION['username'];
    $data['created_on'] = date('Y-m-d H:i:s');
    $count=count($card);

        
    for($i=0;$i<$count;$i++){
    $exp_date=date('Y-m-d',strtotime($date[$i])); //date_format($date[$i],"Y-m-d ");
        // $res=$this->db->query("UPDATE MEMBERSHIP_ACTIVATE SET ACTIVATE_DATE='".$today."' ,CARD_TYPE= '".$type[$i]."', EXP_DATE= '".$exp_date."',     MODIFIED_BY ='".$data['added_user']."' ,MODIFIED_ON ='". $data['created_on']."' ,STATUS='".$data['status']."' WHERE MEMBERSHIP_NO= '".$card[$i]."'");
    $res=$this->db->query("INSERT INTO MEMBERSHIP_ACTIVATE(MEMBERSHIP_NO, ACTIVATE_DATE,CARD_TYPE,EXP_DATE,CREATED_ON,CREATED_BY,STATUS)VALUES('".$card[$i]."' ,'".$today."' ,'".$type[$i]."','".$exp_date."','". $data['created_on']."' ,'".$data['added_user']."' ,'".$data['status']."')");

    }
redirect('Membershipcardavailable/list');
}

public function add_scan_card()
{
$id=$_POST['id'];
// print_r($id);exit;
    $result=$this->db->query("SELECT * FROM MEMBERSHIP_ACTIVATE  where  MEMBERSHIP_NO='".$id."'   ")->row();
if(isset($result)){
    echo '2';
}
else{
    echo '1';
}

}

}