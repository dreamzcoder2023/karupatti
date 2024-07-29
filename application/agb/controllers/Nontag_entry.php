<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/* ************************************************************************************
		Purpose : To handle all Nontag_entry functions 2022-08-18
***************************************************************************************/
class Nontag_entry extends CI_Controller {
    
	public function __construct()
	{
		parent::__construct();
		$this->load->model(array("Nontag_entry_model","Accountsgroup_model"));
    	$this->load->library('user_agent');
        $fin_year=$this->Accountsgroup_model->get_fin_years_list();
        $db=substr($fin_year->DBNAME,0,strlen($fin_year->DBNAME)-4);
        //echo $db;exit;
        $config_app = switch_db_dynamic($db);
        
        $this->Nontag_entry_model->other_db = $this->load->database($config_app,TRUE);
    	if (isset($this->session->userdata['username']) && $this->session->userdata['username'] == TRUE)
        {
            //do something
        }else{
            redirect('login'); //if session is not there, redirect to login page
        } 
		date_default_timezone_set("Asia/Kolkata");
    	$this->session->set_userdata('comtitle', 'Bankentry');
	}
    public function index()
	{
        $page       = isset($_GET['page']) ? $_GET['page'] : 1;
        $limit      = 10;
        $offset     = ($page - 1) * $limit +1;
        $page_limit=$offset+$limit-1;
        $data['supplier_name'] = $this->input->post('supplier_name');
        if($data['supplier_name']!=''){
        $sname =" AND supplier='".$data['supplier_name']."'";
        
        }
        else{
            $sname ='';
        }

        $data['company_id'] = $this->input->post('company_id');
        if($data['company_id']!=''){
        $cname =" AND company_id='".$data['company_id']."'";
        
        }
        else{
            $cname ='';
        }

        $data['jewel_type_fill'] = $this->input->post('jewel_type_fill');
        if($data['jewel_type_fill']!=''){
        $data['lot_jewel_type'] =" AND jewel_type_id='".$data['jewel_type_fill']."'";
        
        }
        else{
            $data['lot_jewel_type'] ='';
        }


        $data['dt_fill'] = $this->input->post('dt_fill_select');
        $data['from_date_fillter'] = $this->input->post('from_date_fillter_nontag_list');
$data['to_date_fillter'] = $this->input->post('to_date_fillter_nontag_list');
$fdate ='';
$tdate ='';
// if( $data['dt_fill']==''){
//     $data['dt_fill']="all";
// }
//   print_r($data['jewel_type_fill']);exit();
if($data['dt_fill']=="all"){
    $fdate ='';
    $tdate ='';

}
if($data['dt_fill']=="today"){
    $data['today_date_fillter'] = date("Y-m-d");
    $fdate =" AND lot_date='".$data['today_date_fillter']."'";
    $tdate ='';
    
        
    
}
if($data['dt_fill']=="week"){
    $today=date('l');
    if($today=="Sunday"){
        $data['week_from_date_fillter']=date(' Y-m-d', strtotime("sunday 0 week"));
   
        $data['week_to_date_fillter']=date(' Y-m-d', strtotime("saturday 1 week"));
       
            $fdate =" AND lot_date>='".$data['week_from_date_fillter']."'";
        $tdate =" AND lot_date<='".$data['week_to_date_fillter']."'";

    }else{
     $data['week_from_date_fillter']=date(' Y-m-d', strtotime("sunday -1 week"));
   
     $data['week_to_date_fillter']=date(' Y-m-d', strtotime("saturday 0 week"));
   
         $fdate =" AND lot_date>='".$data['week_from_date_fillter']."'";
     $tdate =" AND lot_date<='".$data['week_to_date_fillter']."'";
    }
             }
            if($data['dt_fill']=="monthly"){
           
                $first=date('Y-m-01');
                $last=date('Y-m-t');
                $fdate =" AND lot_date>='".$first."'";
                
               
                    $tdate ="AND lot_date<='".$last."'";
                 }
                if($data['dt_fill']=="custom Date"){
                if($data['from_date_fillter']!=''){
                    $first=date('Y-m-d',strtotime($data['from_date_fillter']));
                    $fdate =" AND lot_date>='".$first."'";
                    
                    }
                    else{
                        $fdate ='';
                    }
                    if($data['to_date_fillter']!=''){
                        $last=date('Y-m-d',strtotime($data['to_date_fillter']));
                        $tdate =" AND lot_date<='".$last."'";
                        
                        }
                        else{
                            $tdate ='';
                        } }
                       
//  print_r($fdate);print_r($tdate);exit;
// print_r($data['dt_fill']);exit;
      $data['suppliers_list'] = $this->Nontag_entry_model->get_supplier_name_list();
      
      $data['wallet_view'] = $this->input->post('wallet_view');
    if($data['wallet_view']=='1'){
      $data['show']='1';
    }
    else{
        $data['show']='';
    }
$this->db->reconnect();
 //   $data['Lotentry_list']  = $this->db->query("SELECT * FROM  ( SELECT *, ROW_NUMBER() OVER (ORDER BY lot_date DESC) AS sl FROM lot_entry )L WHERE status='A' $cname $sname $fdate $tdate  order by L.lot_date desc")->result_array();
 $data['Lotentry_list']  = $this->db->query(" SELECT  * FROM 
 ( SELECT *, ROW_NUMBER() OVER (ORDER BY lot_date DESC) AS sl FROM lot_entry WHERE  status='A' $cname  $sname $fdate $tdate )L 
  WHERE   sl BETWEEN $offset AND $page_limit ")->result_array();
    $data['count'] = count($this->db->query("SELECT * FROM lot_entry WHERE status='A' $sname $fdate $tdate  order by lot_date desc")->result_array());
    $data['Lotentry_list_total']=$this->db->query("SELECT SUM(item_count) as count,SUM(item_weight) as weight FROM lot_entry WHERE status='A' $sname $cname $fdate $tdate  ")->row();
    $data['Lotentry_item']  = $this->db->query("SELECT item_name FROM lot_entry_detail  GROUP BY item_name ")->result_array();
  //print_r( $data['Lotentry_item']);exit;
  $data['metal_type_list']  = $this->db->query("SELECT * FROM jewel_type  ")->result_array();
		$data['bankers_list'] = $this->db->query("SELECT * FROM BANKS")->result_array();
		$data['item_list'] = $this->db->query("SELECT ITEMNAME FROM ITEMS ")->result_array();
        $data['company_list']  = $this->db->query("SELECT * FROM COMPANY WHERE ACTIVE='Y'  ")->result_array();
        save_query_in_log();
        $this->db->close();
       // print_r($data['item_list']);exit();
        $this->load->view('nontag_entry/non_tag_entry',$data);
    }
    public function non_tag_entry_wallet()
	{
        $page       = isset($_GET['page']) ? $_GET['page'] : 1;
        $limit      = 10;
        $offset     = ($page - 1) * $limit +1;
        $page_limit=$offset+$limit-1;
        $data['supplier_name'] = $this->input->post('supplier_name');
        if($data['supplier_name']!=''){
        $sname =" AND supplier='".$data['supplier_name']."'";
        
        }
        else{
            $sname ='';
        }

        $data['company_id'] = $this->input->post('company_id');
        if($data['company_id']!=''){
        $cname =" AND company_id='".$data['company_id']."'";
        
        }
        else{
            $cname ='';
        }

        $data['jewel_type_fill'] = $this->input->post('jewel_type_fill');
        if($data['jewel_type_fill']!=''){
        $data['lot_jewel_type'] =" AND jewel_type_id='".$data['jewel_type_fill']."'";
        
        }
        else{
            $data['lot_jewel_type'] ='';
        }


        $data['dt_fill'] = $this->input->post('dt_fill_nontag_list');
        $data['from_date_fillter'] = $this->input->post('from_date_fillter_nontag_list');
$data['to_date_fillter'] = $this->input->post('to_date_fillter_nontag_list');
$fdate ='';
$tdate ='';
// if( $data['dt_fill']==''){
//     $data['dt_fill']="all";
// }
//   print_r($data['jewel_type_fill']);exit();
if($data['dt_fill']=="all"){
    $fdate ='';
    $tdate ='';

}
if($data['dt_fill']=="today"){
    $data['today_date_fillter'] = date("Y-m-d");
    $fdate =" AND lot_date='".$data['today_date_fillter']."'";
    $tdate ='';
    
        
    
}
if($data['dt_fill']=="week"){
    $today=date('l');
    if($today=="Sunday"){
        $data['week_from_date_fillter']=date(' Y-m-d', strtotime("sunday 0 week"));
   
        $data['week_to_date_fillter']=date(' Y-m-d', strtotime("saturday 1 week"));
       
            $fdate =" AND lot_date>='".$data['week_from_date_fillter']."'";
        $tdate =" AND lot_date<='".$data['week_to_date_fillter']."'";

    }else{
     $data['week_from_date_fillter']=date(' Y-m-d', strtotime("sunday -1 week"));
   
     $data['week_to_date_fillter']=date(' Y-m-d', strtotime("saturday 0 week"));
   
         $fdate =" AND lot_date>='".$data['week_from_date_fillter']."'";
     $tdate =" AND lot_date<='".$data['week_to_date_fillter']."'";
    }
             }
            if($data['dt_fill']=="monthly"){
           
                $first=date('Y-m-01');
                $last=date('Y-m-t');
                $fdate =" AND lot_date>='".$first."'";
                
               
                    $tdate ="AND lot_date<='".$last."'";
                 }
                if($data['dt_fill']=="custom Date"){
                if($data['from_date_fillter']!=''){
                    $first=date('Y-m-d',strtotime($data['from_date_fillter']));
                    $fdate =" AND lot_date>='".$first."'";
                    
                    }
                    else{
                        $fdate ='';
                    }
                    if($data['to_date_fillter']!=''){
                        $last=date('Y-m-d',strtotime($data['to_date_fillter']));
                        $tdate =" AND lot_date<='".$last."'";
                        
                        }
                        else{
                            $tdate ='';
                        } }
                       
//  print_r($fdate);print_r($tdate);exit;
// print_r($data['dt_fill']);exit;
      $data['suppliers_list'] = $this->Nontag_entry_model->get_supplier_name_list();
      
      $data['wallet_view'] = $this->input->post('wallet_view');
    if($data['wallet_view']=='1'){
      $data['show']='1';
    }
    else{
        $data['show']='';
    }
$this->db->reconnect();
    $data['Lotentry_list']  = $this->db->query("SELECT * FROM  ( SELECT *, ROW_NUMBER() OVER (ORDER BY lot_date DESC) AS sl FROM lot_entry )L WHERE status='A' $cname $sname $fdate $tdate  order by L.lot_date desc")->result_array();
   
    $data['count'] = count($this->db->query("SELECT * FROM lot_entry WHERE status='A' $sname $fdate $tdate  order by lot_id desc")->result_array());
    $data['Lotentry_list_total']=$this->db->query("SELECT SUM(item_count) as count,SUM(item_weight) as weight FROM lot_entry WHERE status='A' $sname $cname $fdate $tdate  ")->row();
    $data['Lotentry_item']  = $this->db->query("SELECT item_name FROM lot_entry_detail  GROUP BY item_name ")->result_array();
  //print_r( $data['Lotentry_item']);exit;
  $data['metal_type_list']  = $this->db->query("SELECT * FROM jewel_type  ")->result_array();
		$data['bankers_list'] = $this->db->query("SELECT * FROM BANKS")->result_array();
		$data['item_list'] = $this->db->query("SELECT ITEMNAME FROM ITEMS ")->result_array();
        $data['company_list']  = $this->db->query("SELECT * FROM COMPANY WHERE ACTIVE='Y'  ")->result_array();
        save_query_in_log();
        $this->db->close();
    //    print_r($data['Lotentry_list_total']);exit();
        $this->load->view('nontag_entry/non_tag_entry_wallet',$data);
    }
    public function nontag_view()
	{
        $data['lid'] = $_POST['id'];
        $data['Lotentry_list_view']  = $this->db->query("SELECT * FROM lot_entry WHERE lot_id='".$data['lid'] ."' ")->row();
        $data['lotentry_details']  = $this->db->query("SELECT * FROM lot_entry_detail WHERE lot_id='".$data['lid']."' ")->result_array();
        $this->load->view('nontag_entry/non_tag_entry_view',$data);
    }
    public function nontag_wallet_view($id)
	{
        $data['company_id'] = $this->input->post('company_id');
        if($data['company_id']!=''){
        $cname =" AND company='".$data['company_id']."'";
        
        }
        else{
            $cname ='';
        }
 
        $data['dt_fill'] = $this->input->post('dt_fill_nontag_wallet_history');
        $data['from_date_fillter'] = $this->input->post('from_date_fillter_nontag_wallet_history');
$data['to_date_fillter'] = $this->input->post('to_date_fillter_nontag_wallet_history');
$fdate ='';
$tdate ='';
// if( $data['dt_fill']==''){
//     $data['dt_fill']="all";
// }
//   print_r($data['from_date_fillter']);exit();
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
       
            $fdate =" AND date>='".$data['week_from_date_fillter']."'";
        $tdate =" AND date<='".$data['week_to_date_fillter']."'";

    }else{
     $data['week_from_date_fillter']=date(' Y-m-d', strtotime("sunday -1 week"));
   
     $data['week_to_date_fillter']=date(' Y-m-d', strtotime("saturday 0 week"));
   
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

                        $data['wallet_view'] = $this->input->post('wallet_view');
                        if(($data['wallet_view']=='1')|| (isset($_GET['page']))){
                          $data['show']='1';
                        }
                        else{
                            $data['show']='';
                        }
                        

        $page       = isset($_GET['page']) ? $_GET['page'] : 1;
        $limit      = 10;
        $offset     = ($page - 1) * $limit +1;
        $page_limit=$offset+$limit-1;
       // print_r($page);exit;
        $data['item_name']=$id;
        $data['get_lot_no']= $this->db->query("SELECT * FROM lot_entry_detail  WHERE item_name='".$id."'  ")->result_array();
        // $data['nontag_history']= $this->db->query("SELECT * FROM nontag_history  WHERE item_id='".$id."' ")->result_array();
        $data['nontag_history']  = $this->db->query(" SELECT  * FROM 
        ( SELECT *, ROW_NUMBER() OVER (ORDER BY date DESC) AS sl FROM nontag_history )N 
         WHERE item_id='".$id."' $fdate $tdate $cname  AND  sl BETWEEN $offset AND $page_limit ")->result_array();
     
        $data['count'] = count($data['nontag_history']);
        $data['company_list']  = $this->db->query("SELECT * FROM COMPANY WHERE ACTIVE='Y'  ")->result_array();
        $this->load->view('nontag_entry/non_tag_wallet_view',$data);
    }
    public function nontag_wallet_history($id)
	{
        $data['company_id'] = $this->input->post('company_id');
        if($data['company_id']!=''){
        $cname =" AND company='".$data['company_id']."'";
        
        }
        else{
            $cname ='';
        }

        $data['dt_fill'] = $this->input->post('dt_fill_nontag_wallet_history');
        $data['from_date_fillter'] = $this->input->post('from_date_fillter_nontag_wallet_history');
$data['to_date_fillter'] = $this->input->post('to_date_fillter_nontag_wallet_history');
$fdate ='';
$tdate ='';
// if( $data['dt_fill']==''){
//     $data['dt_fill']="all";
// }
//   print_r($data['from_date_fillter']);exit();
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
       
            $fdate =" AND date>='".$data['week_from_date_fillter']."'";
        $tdate =" AND date<='".$data['week_to_date_fillter']."'";

    }else{
     $data['week_from_date_fillter']=date(' Y-m-d', strtotime("sunday -1 week"));
   
     $data['week_to_date_fillter']=date(' Y-m-d', strtotime("saturday 0 week"));
   
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

                        $data['wallet_view'] = $this->input->post('wallet_view');
                        if(($data['wallet_view']=='1')|| (isset($_GET['page']))){
                          $data['show']='1';
                        }
                        else{
                            $data['show']='';
                        }
                        

        $page       = isset($_GET['page']) ? $_GET['page'] : 1;
        $limit      = 10;
        $offset     = ($page - 1) * $limit +1;
        $page_limit=$offset+$limit-1;
       // print_r($page);exit;
        $data['item_name']=$id;
        $data['get_lot_no']= $this->db->query("SELECT * FROM lot_entry_detail  WHERE item_name='".$id."'  ")->result_array();
        // $data['nontag_history']= $this->db->query("SELECT * FROM nontag_history  WHERE item_id='".$id."' ")->result_array();
        $data['nontag_history']  = $this->db->query(" SELECT  * FROM 
        ( SELECT *, ROW_NUMBER() OVER (ORDER BY id ASC) AS sl FROM nontag_history )N 
         WHERE item_id='".$id."' $fdate $tdate $cname  AND  sl BETWEEN $offset AND $page_limit ORDER BY N.id DESC")->result_array();
    //  print_r($data['nontag_history']);exit;
        $data['count'] = count($data['nontag_history']);
        $data['company_list']  = $this->db->query("SELECT * FROM COMPANY WHERE ACTIVE='Y'  ")->result_array();
        $this->load->view('nontag_entry/non_tag_wallet_history',$data);
    }
     public function image_view()
    {
        $id = $_POST['id'];
         $response='<div class="image-input-wrapper w-250px h-250px" style="background-image: url(<?php echo base_url(); ?>lot_img/<?php echo $id; ?>)"></div>';
       
         echo $response;
    }
}
?>