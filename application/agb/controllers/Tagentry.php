<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/* ************************************************************************************
        Purpose : To handle all Department functions 2022-08-19
***************************************************************************************/
class Tagentry extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model(array("Tagentry_model"));
        $this->load->library('user_agent');

        $fin_year=$this->Tagentry_model->get_fin_years_list();
        $db=substr($fin_year->DBNAME,0,strlen($fin_year->DBNAME)-4);
        // echo $db;exit();

        $config_app = switch_db_dynamic($db);
        $this->Tagentry_model->other_db = $this->load->database($config_app,TRUE);


        if (isset($this->session->userdata['username']) && $this->session->userdata['username'] == TRUE)
        {
            //do something
        }else{
            redirect('login'); //if session is not there, redirect to login page
        } 
        date_default_timezone_set("Asia/Kolkata");
        $this->session->set_userdata('comtitle', 'Tagentry');
    }

    // public function __construct()
    // {
    //     parent::__construct();
    //     $this->load->model(array("Lotentry_model"));
    //     $this->load->library('user_agent');
    //     if (isset($this->session->userdata['username']) && $this->session->userdata['username'] == TRUE)
    //     {
    //         //do something
    //     }else{
    //         redirect('login'); //if session is not there, redirect to login page
    //     } 
    //     date_default_timezone_set("Asia/Kolkata");
    //     $this->session->set_userdata('comtitle', 'Lotentry');
    // }

    // public function index()
    // {   
        
    //     $data['tagentry_list'] = $this->Tagentry_model->get_tagentry_list();


    //     $this->load->view('tagentry/tag_entry',$data);
    // }

    public function index()

    {

        $data['jewel_item_fill'] = $this->input->post('jewel_item_fill');
        if($data['jewel_item_fill']!=''){
        $tag_jewel_item =" AND item_name='".$data['jewel_item_fill']."'";
        
        }
        else{
            $tag_jewel_item ='';
        }

        $data['jewel_type_fill'] = $this->input->post('jewel_type_fill');
        if($data['jewel_type_fill']!=''){
        $tag_jewel_type =" AND metal_type='".$data['jewel_type_fill']."'";
        
        }
        else{
            $tag_jewel_type ='';
        }

        $data['dt_fill'] = $this->input->post('dt_fill');
       // $data['dt_fill_no'] = $this->input->post('dt_fill_lot_no');
        $data['from_date_fillter'] = $this->input->post('from_date_fillter');
        $data['to_date_fillter'] = $this->input->post('to_date_fillter');
        $fdate ='';
        $tdate ='';
        // print_r($data['from_date_fillter']);exit();
       
       
        if($data['dt_fill']=="all"){
            $fdate ='';
            $tdate ='';
        
        }
        if($data['dt_fill']=="today"){
            $data['today_date_fillter'] = date("Y-m-d");
            $fdate =" AND tag_date='".$data['today_date_fillter']."'";
            $tdate ='';
            
                
            
        }
        if($data['dt_fill']=="week"){
            $today=date('l');
            if($today=="Sunday"){
                $data['week_from_date_fillter']=date(' Y-m-d', strtotime("sunday 0 week"));
           
                $data['week_to_date_fillter']=date(' Y-m-d', strtotime("saturday 1 week"));
               // print_r($data['week_to_date_fillter']);exit;
                    $fdate =" AND tag_date>='".$data['week_from_date_fillter']."'";
                $tdate =" AND tag_date<='".$data['week_to_date_fillter']."'";
        
            }else{
             $data['week_from_date_fillter']=date(' Y-m-d', strtotime("sunday -1 week"));
           
             $data['week_to_date_fillter']=date(' Y-m-d', strtotime("saturday 0 week"));
            //  print_r($data['week_to_date_fillter']);exit;
                 $fdate =" AND tag_date>='".$data['week_from_date_fillter']."'";
             $tdate =" AND tag_date<='".$data['week_to_date_fillter']."'";
            }
                     }
                    if($data['dt_fill']=="monthly"){
                   
                        $first=date('Y-m-01');
                        $last=date('Y-m-t');
                        $fdate =" AND tag_date>='".$first."'";
                        
                       
                            $tdate ="AND tag_date<='".$last."'";
                        }
                        if($data['dt_fill']=="custom Date"){
                        if($data['from_date_fillter']!=''){
                            $first=date('Y-m-d',strtotime($data['from_date_fillter']));
                            $fdate =" AND tag_date>='".$first."'";
                            
                            }
                            else{
                                $fdate ='';
                            }
                            if($data['to_date_fillter']!=''){
                                $last=date('Y-m-d',strtotime($data['to_date_fillter']));
                                $tdate =" AND tag_date<='".$last."'";
                                
                                }
                                else{
                                    $tdate ='';
                                } }
        
                                $data['company_id'] = $this->input->post('company_id');
                                if($data['company_id']!=''){
                                $cname =" AND company_id='".$data['company_id']."'";
                                
                                }
                                else{
                                    $cname ='';
                                }


        $page       = isset($_GET['page']) ? $_GET['page'] : 1;
        $limit      = 10;
        $offset     = ($page - 1) * $limit +1;
        $page_limit=$offset+$limit-1;
        //  print_r($page_limit);exit();
        //  $data['tagentry_list_tag'] = $this->db->query("SELECT * FROM tag_entry WHERE status='A' order by tag_no ")->result_array();
          $data['tagentry_list_tag']  = $this->db->query(" SELECT  * FROM 
          ( SELECT *, ROW_NUMBER() OVER (ORDER BY tag_no DESC) AS sl FROM tag_entry WHERE  status='A' $fdate $tdate $cname $tag_jewel_type $tag_jewel_item )N 
           WHERE      sl BETWEEN $offset AND $page_limit ORDER BY N.tag_no DESC")->result_array();
       
        $data['count'] =count($this->db->query("SELECT * FROM tag_entry WHERE status='A' $fdate $tdate $cname  $tag_jewel_type $tag_jewel_item order by tag_id ASC ")->result_array());
       
       
       
        $page1       = isset($_GET['page1']) ? $_GET['page1'] : 1;
        $limit1      = 10;
        $offset1     = ($page1 - 1) * $limit +1;
        $page_limit1=$offset1+$limit1-1;

        // $data['tagentry_list'] = $this->db->query("SELECT * FROM tag_entry WHERE status='Y' order by tag_id ")->result_array();
        $data['tagentry_list']  = $this->db->query(" SELECT  * FROM 
        ( SELECT *, ROW_NUMBER() OVER (ORDER BY tag_no DESC) AS sl FROM tag_entry WHERE  status='Y')N 
         WHERE      sl BETWEEN $offset AND $page_limit ORDER BY N.tag_no DESC")->result_array();
     

        $data['count1'] =count($this->db->query("SELECT * FROM tag_entry WHERE status='Y' order by tag_id ")->result_array());
       
        $data['tagentry_list1'] = $this->db->query("SELECT count(tag_no) as count,SUM(net_weight) as t_wgt FROM tag_entry WHERE status='Y' ")->row();
        $data['tagentry_list_tag1'] = $this->db->query("SELECT count(tag_no) as count,SUM(net_weight) as t_wgt FROM tag_entry WHERE status='A' $fdate $tdate   $tag_jewel_type $tag_jewel_item ")->row();
// print_r($data['tagentry_list_tag']);exit();
$data['metal_type_list']  = $this->db->query("SELECT * FROM jewel_type  ")->result_array();
$data['company_list']  = $this->db->query("SELECT * FROM COMPANY WHERE ACTIVE='Y'  ")->result_array();
        $this->load->view('tagentry/tag_entry',$data);
       
    }
    public function tag_entry_waiting_approval()

    {

        $data['jewel_item_fill'] = $this->input->post('jewel_item_fill');
        if($data['jewel_item_fill']!=''){
        $tag_jewel_item =" AND item_name='".$data['jewel_item_fill']."'";
        
        }
        else{
            $tag_jewel_item ='';
        }

        $data['jewel_type_fill'] = $this->input->post('jewel_type_fill');
        if($data['jewel_type_fill']!=''){
        $tag_jewel_type =" AND metal_type='".$data['jewel_type_fill']."'";
        
        }
        else{
            $tag_jewel_type ='';
        }

        $data['dt_fill'] = $this->input->post('dt_fill');
       // $data['dt_fill_no'] = $this->input->post('dt_fill_lot_no');
        $data['from_date_fillter'] = $this->input->post('from_date_fillter');
        $data['to_date_fillter'] = $this->input->post('to_date_fillter');
        $fdate ='';
        $tdate ='';
        // print_r($data['from_date_fillter']);exit();
       
       
        if($data['dt_fill']=="all"){
            $fdate ='';
            $tdate ='';
        
        }
        if($data['dt_fill']=="today"){
            $data['today_date_fillter'] = date("Y-m-d");
            $fdate =" AND tag_date='".$data['today_date_fillter']."'";
            $tdate ='';
            
                
            
        }
        if($data['dt_fill']=="week"){
            $today=date('l');
            if($today=="Sunday"){
                $data['week_from_date_fillter']=date(' Y-m-d', strtotime("sunday 0 week"));
           
                $data['week_to_date_fillter']=date(' Y-m-d', strtotime("saturday 1 week"));
               // print_r($data['week_to_date_fillter']);exit;
                    $fdate =" AND tag_date>='".$data['week_from_date_fillter']."'";
                $tdate =" AND tag_date<='".$data['week_to_date_fillter']."'";
        
            }else{
             $data['week_from_date_fillter']=date(' Y-m-d', strtotime("sunday -1 week"));
           
             $data['week_to_date_fillter']=date(' Y-m-d', strtotime("saturday 0 week"));
            //  print_r($data['week_to_date_fillter']);exit;
                 $fdate =" AND tag_date>='".$data['week_from_date_fillter']."'";
             $tdate =" AND tag_date<='".$data['week_to_date_fillter']."'";
            }
                     }
                    if($data['dt_fill']=="monthly"){
                   
                        $first=date('Y-m-01');
                        $last=date('Y-m-t');
                        $fdate =" AND tag_date>='".$first."'";
                        
                       
                            $tdate ="AND tag_date<='".$last."'";
                        }
                        if($data['dt_fill']=="custom Date"){
                        if($data['from_date_fillter']!=''){
                            $first=date('Y-m-d',strtotime($data['from_date_fillter']));
                            $fdate =" AND tag_date>='".$first."'";
                            
                            }
                            else{
                                $fdate ='';
                            }
                            if($data['to_date_fillter']!=''){
                                $last=date('Y-m-d',strtotime($data['to_date_fillter']));
                                $tdate =" AND tag_date<='".$last."'";
                                
                                }
                                else{
                                    $tdate ='';
                                } }

                                $data['company_id'] = $this->input->post('company_id');
                                if($data['company_id']!=''){
                                $cname =" AND company_id='".$data['company_id']."'";
                                
                                }
                                else{
                                    $cname ='';
                                }

        $page       = isset($_GET['page']) ? $_GET['page'] : 1;

        $limit      = 10;
        $offset     = ($page - 1) * $limit +1;
        $page_limit=$offset+$limit-1;
        //  print_r($page_limit);exit();
        //  $data['tagentry_list_tag'] = $this->db->query("SELECT * FROM tag_entry WHERE status='A' order by tag_no ")->result_array();
          $data['tagentry_list_tag']  = $this->db->query(" SELECT  * FROM 
          ( SELECT *, ROW_NUMBER() OVER (ORDER BY tag_no DESC) AS sl FROM tag_entry WHERE  status='A' )N 
           WHERE      sl BETWEEN $offset AND $page_limit ORDER BY N.tag_no DESC")->result_array();
       
        $data['count'] =count($this->db->query("SELECT * FROM tag_entry WHERE status='A' order by tag_id ASC ")->result_array());
       
       
       
        $page1       = isset($_GET['page1']) ? $_GET['page1'] : 1;
        $limit1      = 10;
        $offset1     = ($page1 - 1) * $limit +1;
        $page_limit1=$offset1+$limit1-1;

        // $data['tagentry_list'] = $this->db->query("SELECT * FROM tag_entry WHERE status='Y' order by tag_id ")->result_array();
        $data['tagentry_list']  = $this->db->query(" SELECT  * FROM 
        ( SELECT *, ROW_NUMBER() OVER (ORDER BY tag_no DESC) AS sl FROM tag_entry WHERE  status!='A' AND status!='N' AND status!='S' $fdate $tdate  $cname  $tag_jewel_type $tag_jewel_item)N 
         WHERE   sl BETWEEN $offset1 AND $page_limit1 ORDER BY N.tag_no DESC")->result_array();
     

        $data['count1'] =count($this->db->query("SELECT * FROM tag_entry WHERE status='Y' AND status!='N' AND status!='S' $fdate $tdate  $cname  $tag_jewel_type $tag_jewel_item order by tag_id ")->result_array());
       
        $data['tagentry_list1'] = $this->db->query("SELECT count(tag_no) as count,SUM(net_weight) as t_wgt FROM tag_entry WHERE status='Y' AND status!='N' AND status!='S'  $fdate $tdate   $tag_jewel_type $tag_jewel_item ")->row();
        $data['tagentry_list_tag1'] = $this->db->query("SELECT count(tag_no) as count,SUM(net_weight) as t_wgt FROM tag_entry WHERE status='A' AND status!='N' AND status!='S' $fdate $tdate  $cname  $tag_jewel_type $tag_jewel_item ")->row();
// print_r($data['tagentry_list_tag']);exit();  
$data['company_list']  = $this->db->query("SELECT * FROM COMPANY WHERE ACTIVE='Y'  ")->result_array();

$data['metal_type_list']  = $this->db->query("SELECT * FROM jewel_type  ")->result_array();

        // $tag_id  = $this->db->query("SELECT * FROM tag_entry WHERE tag_no='". $tag_no."' ")->row();
        
        $this->load->view('tagentry/tag_entry_waiting_approval',$data);




       
    }

    public function tagentry_add($id)
    {
        $sid=explode('_',$id);
        $subitem_count = $this->input->post('subitem_count');
        $data['date_add_tag'] = $this->input->post('date_add_tag');
        $data['lot_id']=$sid[0];
        $data['row_id']=$sid[1];
        if($subitem_count!=''){
            $data['count']=$subitem_count;
        }else{
            $data['count']='0';
        }
        $data['purity_list']       = $this->db->query("SELECT * FROM ITEMPURITY WHERE status='0' ")->result_array();  
        $data['Lotentry']          = $this->db->query("SELECT * FROM lot_entry  WHERE lot_id='".$sid[0] ."' ")->row();
        $data['tag_entry']         = $this->db->query("SELECT * FROM tag_entry ORDER BY tag_no DESC")->row();
        $data['lotentry_details']  = $this->db->query("SELECT * FROM lot_entry_detail WHERE lot_id='".$sid[0]."' ")->result_array();
        $data['company_list']      = $this->db->query("SELECT * FROM COMPANY WHERE ACTIVE='Y'  ")->result_array();

        $this->load->view('tagentry/add_tag_entry',$data);
       
    }
    public function tagentry_save()
    {
        $count = $this->input->post('count');
        $data['company_id'] = $this->input->post('company_id');
        $item_name = $this->input->post('item_name');
        $lot_detail_id = $this->input->post('lot_detail_id');
        $metal_type = $this->input->post('metal_type');
        $date_add_tag = date("Y-m-d", strtotime($this->input->post('date_add_tag')));
       // $this->input->post('date_add_tag');
        $tagno = $this->input->post('tagno');
        $tagid = $this->input->post('tagno1');
        $subitem = $this->input->post('subitem');
        $quality = $this->input->post('quality');
        $purity = $this->input->post('purity');
        $weight = $this->input->post('weight');
        $stone = $this->input->post('stone');
        $net_weight = $this->input->post('net_weight');
        $hallmark_charges = $this->input->post('hallmark_charges');
        $making_charges = $this->input->post('making_charges');
        $wastage_charges = $this->input->post('wastage_charges');
        $metal_weight = $this->input->post('metal_weight');
        $inventory_jewel_image_data = $this->input->post('inventory_jewel_image_data');

        $data['status'] = 'Y';
        $data['added_user'] = $_SESSION['username'];
        $data['created_on'] = date('Y-m-d H:i:s');
        $y = date("y");
     // print_r($date_add_tag);exit;


     

     $ext='png';

for($i=0;$i<$count;$i++){
if($i==0){
    $img_id=str_pad($tagno[$i],4,0,STR_PAD_LEFT);
}
else{
    $img_id1=str_pad($tagno[0],4,0,STR_PAD_LEFT);
    $img_id=$img_id1.''.$i;
}
    //$_FILES['add_party_redemp']['name']=$_FILES['add_party_redemp']['name'][$i];
    //$data['add_party_redemp']=$data['add_party_redemp'][$i];


    // if(!empty($_FILES['add_party_redemp']['name'][$i])){
    
    //     $_FILES['file']['name'] = $_FILES['add_party_redemp']['name'][$i];
    //     $_FILES['file']['type'] = $_FILES['add_party_redemp']['type'][$i];
    //     $_FILES['file']['tmp_name'] = $_FILES['add_party_redemp']['tmp_name'][$i];
    //     $_FILES['file']['error'] = $_FILES['add_party_redemp']['error'][$i];
    //     $_FILES['file']['size'] = $_FILES['add_party_redemp']['size'][$i];
    //           $ext = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
    //     $config['upload_path'] = 'tag_img'; 
    //     $config['allowed_types'] = 'jpg|jpeg|png|gif';
    //     $config['max_size'] = '50000';
    //     $config['file_name'] = $img_id;
 
    //     $this->load->library('upload',$config); 
  
    //     if($this->upload->do_upload('file')){
    //       $uploadData = $this->upload->data();
    //       $filename = $uploadData['file_name'];
 
    //       $data['totalFiles'][] = $filename;
    //     }
    //   }
 
    $uploadpath   = 'tag_img/';
    $parts        = explode(";base64,", $inventory_jewel_image_data[$i]);
    $imageparts   = explode("image/", @$parts[0]);
    $imagetype    = $imageparts[1];
    $imagebase64  = base64_decode($parts[1]);
    $file         = $uploadpath . $img_id .'_'.$y.'.png';
    file_put_contents($file, $imagebase64);

 

   $img=$img_id."_".$y.".". $ext;






        $res = $this->db->query("INSERT INTO tag_entry (
            tag_no,
            tag_id,
            company_id,
            tag_date,
            item_name,
            metal_type,
            subitem_name,
            purity,
            weight,
            stone,
            net_weight,
            created_on,
            created_by,
            status,
            img,
            hallmark_charges,
            making_charges,
            wastage_charges,
            quality,
            metal_weight

) VALUES(
'".$tagno[$i]."',
'".$tagid[$i]."',
'".$data['company_id']."',
'".$date_add_tag."',
'".$item_name."',
'".$metal_type."',
'".$subitem[$i]."',
'".$purity[$i]."',
'".$weight[$i]."',
'".$stone[$i]."',
'".$net_weight[$i]."',
'".$data['created_on']."',
'".$data['added_user']."',
'".$data['status']."',
'".$img."',
'".$hallmark_charges[$i]."',
'".$making_charges[$i]."',
'".$wastage_charges[$i]."',
'".$quality[$i]."',
'".$metal_weight[$i]."'
)");
save_query_in_log();

$res2 = $this->db->query("INSERT INTO nontag_history (
    id_no,
    item_id,
    purity,
    count,
    weight,
    stone_weight,
    net_weight,
    date,
    company,
    type,
    status
) VALUES(
    '".$tagno[$i]."',
'".$item_name."',
'".$purity[$i]."',
'1',
'".$weight[$i]."',
'".$stone[$i]."',
'".$net_weight[$i]."',
'".$date_add_tag."',
'".$data['company_id']."',
'Tag',
'OUT'
)");



$res1  = $this->db->query("UPDATE lot_entry_detail SET tagged = tagged+1, non_tagged= non_tagged-1,tagged_weight = tagged_weight+'".$net_weight[$i]."', non_tagged_weight= non_tagged_weight-'".$net_weight[$i]."' WHERE id ='".$lot_detail_id."' ;");

$update= $this->db->query("UPDATE ITEMS SET COUNT=COUNT-1 ,WEIGHT=WEIGHT-".$net_weight[$i] ."  WHERE SNO= '".$data['item_name'][$i]."'");
save_query_in_log();
add_notification(date('Y-m-d H:i:s'), $data['company_id'], "Inventory", "New Tag", $tagno[$i]. ' Create By ' .$_SESSION['username']. ' is Awaiting Approval ','', $_SESSION['USERID'], '0', $tagno[$i]);

}
redirect('Nontag_entry');

    }


    public function tagentry_approve()
    {

       $data['aid']=$_POST['id'];
       
      $data['tagentry_list'] = $this->db->query("SELECT * FROM tag_entry where tag_no='". $data['aid']."'  ")->row();


        $this->load->view('tagentry/tag_entry_approve',$data);
    }

    public function approve()
    {

        

        $bid=$_POST['field'];
        $res= $this->db->query("UPDATE tag_entry set status='A' where tag_no='". $bid."'  ");
        $tag_id  = $this->db->query("SELECT * FROM tag_entry WHERE tag_no='". $bid."' ")->row();

        add_notification(date('Y-m-d H:i:s'), $tag_id->company_id, "Inventory", "Approve Tag", $tag_id->tag_id. ' Approve By ' .$_SESSION['username']. '  ','', $_SESSION['USERID'], '0', $tag_id->tag_id);
        

        if($res)
        {
            $this->session->set_flashdata('g_success', $tag_id->tag_id.' Tag entry have been approved successfully...');
        }else{
           $this->session->set_flashdata('g_err', 'Could not approve Tag details!');
        }

        redirect('Tagentry');
    }

    public function tagentry_non_approve()
    {

       $data['aid']=$_POST['id'];
       $data['tagentry_list'] = $this->db->query("SELECT * FROM tag_entry where tag_no='". $data['aid']."'  ")->row();
        $this->load->view('tagentry/tag_entry_non_approve',$data);
    }

    public function non_approve()
    {
        $bid=$_POST['field'];
       // print_r($bid);exit;

        $res= $this->db->query("UPDATE tag_entry set status='Y' where tag_no='". $bid."'  ");
        $tag_id  = $this->db->query("SELECT * FROM tag_entry WHERE tag_no='". $bid."' ")->row();
        if($res)
        {
            $this->session->set_flashdata('g_success', $tag_id->tag_id.' Tag entry have been approved successfully...');
        }else{
           $this->session->set_flashdata('g_err', 'Could not approve Tag details!');
        }
        redirect('Tagentry');
    }

    public function tagentry_edit()
    {

       $data['aid']=$_POST['id'];
       $data['tagentry_list'] = $this->db->query("SELECT * FROM tag_entry    WHERE tag_no='". $data['aid']."'  ")->row();
       $data['subitem_list']  = $this->db->query("SELECT * FROM SUBITEM_LIST WHERE item_id='".$data['tagentry_list']->item_name."' ")->result_array();
       // $this->load->view('tagentry/tag_entry_edit',$data);
       // print_r($data['tagentry_list']); 
       // print_r($data['subitem_list']); 
       // exit();
       $this->load->view('tagentry/tag_entry_edit_model',$data);
    }
    public function edit()
    {
        $tag_no  = $this->input->post('tag_no');
        $subitem = $this->input->post('subitem');
        $weight  = $this->input->post('weight');
        $stone   = $this->input->post('stone');
        $net_weight = $this->input->post('net_weight');
        $tag_id  = $this->db->query("SELECT * FROM tag_entry WHERE tag_no='". $tag_no."' ")->row();
 
        $res= $this->db->query("UPDATE tag_entry set subitem_name='". $subitem."',weight='". $weight."',stone='". $stone."',net_weight='". $net_weight."' where tag_no='". $tag_no."'  ");
        if($res)
        {
            $this->session->set_flashdata('g_success', $tag_id->tag_id.' Tag entry have been Updated successfully...');
        }else{
           $this->session->set_flashdata('g_err', 'Could not updated Tag details!');
        }
        redirect('Tagentry/tag_entry_waiting_approval');
    }
    public function get_purity()
    {
        $type = $_POST['typeid'];
       
        $typelist = $this->db->query("SELECT * FROM ITEMPURITY WHERE  ITEMPURITYID='".$type."'  ")->row();
        $value    = $typelist->PERCENTAGE;
        echo $value;
      
    }

    public function tagentry_update_required()
    {

       $data['id']=$_POST['id'];
     // $data['tagentry_list'] = $this->db->query("SELECT * FROM tag_entry where tag_no='". $data['aid']."'  ")->row();
        $this->load->view('tagentry/tag_entry_update_required',$data);
    }

    public function update_required()
    {
       
        $bid=$_POST['field'];
        $update_description=$_POST['update_description'];
        // print_r($bid);
         $res= $this->db->query("UPDATE tag_entry set status='U',update_description='". $update_description."' where tag_no='". $bid."'  ");
         $tag_id  = $this->db->query("SELECT * FROM tag_entry WHERE tag_no='". $bid."' ")->row();
       
    add_notification(date('Y-m-d H:i:s'), $tag_id->company_id, "Inventory", "Update Required Tag", $tag_id->tag_id. ' Update By ' .$_SESSION['username'],'', $_SESSION['USERID'], '0', $tag_id->tag_id);
       
        $res= $this->db->query("UPDATE tag_entry set subitem_name='". $subitem."',weight='". $weight."',stone='". $stone."',net_weight='". $net_weight."' where tag_no='". $tag_no."'  ");
        if($res)
        {
            $this->session->set_flashdata('g_success', $tag_id->tag_id.' Tag entry have been Update Required Added successfully...');
        }else{
           $this->session->set_flashdata('g_err', 'Could not updated Tag details!');
        }
         redirect('Tagentry/tag_entry_waiting_approval');
    }
    public function set_barcode($code) {
     


        $data=[];
		
//bar code generator begin
		//load library
		$this->load->library('zend');
		//load in folder Zend
		$this->zend->load('Zend/Barcode');
		//generate barcode
		$imageResource = Zend_Barcode::factory('code128', 'image', array('text'=>$code), array())->draw();
		imagepng($imageResource, 'lot_img/'.$code.'.png');

		$data['barcode'] = 'lot_img/'.$code.'.png';
//bar code generator end

//img src to file begin
        $base64string = 'data:image/jpeg;base64,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';
        $uploadpath   = 'lot_img/';
        $parts        = explode(";base64,", $base64string);
        $imageparts   = explode("image/", @$parts[0]);
        $imagetype    = $imageparts[1];
        $imagebase64  = base64_decode($parts[1]);
        $file         = $uploadpath . $code . '.png';
        file_put_contents($file, $imagebase64);
        	
//img src to file end


        // print_r($file );exit();
		$this->load->view('tagentry/welcome',$data);


    }

    public function tag_entry_barcode() {

        $data['tagentry_list'] = $this->db->query("SELECT * FROM tag_entry WHERE status='A' order by tag_no ASC ")->result_array();
		$this->load->view('tagentry/tag_entry_barcode_print',$data);

    }

    public function tag_entry_pos() {
        $data['tag_no'] = $this->input->post('checkbox');
        $count=count($data['tag_no']);
        $data['count']=count($data['tag_no']);

for($i=0;$i<$count;$i++){
if(isset($data['tag_no'][$i])){
$s='';
$code=$data['tag_no'][$i];
$code1=str_replace('/','_',$code);
//load library
$this->load->library('zend');
//load in folder Zend
$this->zend->load('Zend/Barcode');
//generate barcode
$imageResource = Zend_Barcode::factory('code128', 'image', array('text'=>$code), array())->draw();
imagepng($imageResource, 'assets/images/barcode/'.$code1.'.png');

// $data['barcode'] = 'assets/images/barcode/'.$data['tag_no'][$i].'.png';
}
   
}


        // print_r($count);exit();

		$this->load->view('tagentry/tag_entry_pos',$data);

    }
   
}
?>