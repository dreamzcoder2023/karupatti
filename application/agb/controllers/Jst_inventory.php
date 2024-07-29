<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/* ************************************************************************************
        Purpose : To handle all Jst_inventory functions 2022-02-19
***************************************************************************************/
class Jst_inventory extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model(array("jst_inventory_model","Accountsgroup_model"));
        $this->load->library('user_agent');

        $fin_year=$this->Accountsgroup_model->get_fin_years_list();
        $db=substr($fin_year->DBNAME,0,strlen($fin_year->DBNAME)-4);
        //echo $db;exit;
        $config_app = switch_db_dynamic($db);
        
        $this->jst_inventory_model->other_db = $this->load->database($config_app,TRUE);

        if (isset($this->session->userdata['username']) && $this->session->userdata['username'] == TRUE)
        {
            //do something
        }else{
            redirect('login'); //if session is not there, redirect to login page
        } 
        date_default_timezone_set("Asia/Kolkata");
        $this->session->set_userdata('comtitle', 'Jst Inventory');
    }


    public function index()

    {


        $data['from_company'] = $this->input->post('from_company');
        if($data['from_company']!=''){
        $fcompany =" AND from_company='".$data['from_company']."'";
        
        }
        else{
            $fcompany ='';
        }

        $data['to_company'] = $this->input->post('to_company');
        if($data['to_company']!=''){
        $tcompany =" AND to_company='".$data['to_company']."'";
        
        }
        else{
            $tcompany ='';
        }
        $data['jst_status'] = $this->input->post('jst_status');
        if($data['jst_status']!=''){
        $jstatus =" AND status='".$data['jst_status']."'";
        
        }
        else{
            $jstatus ='';
        }
        $data['jst_user'] = $this->input->post('jst_user');
        if($data['jst_user']!=''){
        $juser =" AND created_by LIKE '%".$data['jst_user']."%'";
        
        }
        else{
            $juser ='';
        }


        $data['dt_fill'] = $this->input->post('dt_fill_sales_list');

        $data['from_date_fillter'] = $this->input->post('from_date_fillter_sales_list');
        $data['to_date_fillter'] = $this->input->post('to_date_fillter_sales_list');
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

                                $page       = isset($_GET['page']) ? $_GET['page'] : 1;

						$limit      = 10;
						$offset     = ($page - 1) * $limit +1;
						$page_limit=$offset+$limit-1;

        $data['company_list']  = $this->db->query("SELECT * FROM COMPANY WHERE ACTIVE='Y'  ")->result_array();
        // $data['jst_list']=$this->db->query("SELECT * FROM jst_inventory WHERE status='Y' $fdate $tdate $fcompany $tcompany $jstatus $juser ORDER BY id DESC ")->result_array();
        $data['jst_list']  = $this->db->query(" SELECT  * FROM  ( SELECT *, ROW_NUMBER() OVER (ORDER BY id DESC) AS sl FROM jst_inventory WHERE status!='' $fdate $tdate $fcompany $tcompany $jstatus $juser )N WHERE      sl BETWEEN $offset AND $page_limit ")->result_array();
        $data['count']=count($this->db->query("SELECT * FROM jst_inventory WHERE status!='' $fdate $tdate $fcompany $tcompany $jstatus $juser ORDER BY id DESC ")->result_array());
        $this->load->view('jst_inventory/jst_inventory',$data);
    }
    public function jst_add()

    {

        $data['company_list']   = $this->db->query("SELECT * FROM COMPANY WHERE ACTIVE='Y'  ")->result_array();
        $data['old_gold_list']  = $this->db->query("SELECT * FROM salesentry WHERE (oge_gold_count>0 OR oge_silver_count>0) AND sale_id!='NULL' ")->result_array();
        $data['staff_list']     = $this->db->query("SELECT * FROM STAFFS WHERE Status='Y' AND USER_ID != '".$_SESSION['USERID']."' ORDER BY STAFFNAME ASC ")->result_array();  

        // print_r($data); exit();
      
        $this->load->view('jst_inventory/jst_inventory_add',$data);
    }
    public function jst_view($id)

    {
        // print_r($id);
       
        $data['jst_id']=$id;
        $data['jst']  = $this->db->query("SELECT * FROM jst_inventory WHERE id='".$id."'  ")->row();

        if ($data['jst']) {
         $data['tagged_detail']  = $this->db->query("SELECT * FROM jst_inventory_tagged WHERE jst_id='".$data['jst']->jst_id."'  ")->result_array();
        $data['old_metal_detail']  = $this->db->query("SELECT * FROM jst_inventory_old_metal WHERE jst_id='".$data['jst']->jst_id."'  ")->result_array();
        }
        
      
        $this->load->view('jst_inventory/jst_inventory_view',$data);
    }
    public function tag_add()

    {

        $id    = $_POST['id'];
        $count = $_POST['count'];
        $tag_detail = $this->db->query("SELECT * FROM tag_entry WHERE tag_id='".$id."' AND status='A'")->row();   

        if (isset($tag_detail)) {
            $jewel_type   = $this->db->query("SELECT * FROM jewel_type   WHERE  jewel_type_id='".$tag_detail->metal_type."'  ")->row();
            $item_name    = $this->db->query("SELECT * FROM ITEMS        WHERE  SNO='". $tag_detail->item_name."' ")->row();
            $subitem_name = $this->db->query("SELECT * FROM SUBITEM_LIST WHERE  SUB_ID='". $tag_detail->subitem_name."' ")->row();
            if( $jewel_type->jewel_type=='Gold'){
                $class='class="gold_count";';
                $id='class="gold_weight";';
            } else {
                $class='class="silver_count";';
                $id='class="silver_weight";';
            }
            $image_url =  base_url().'tag_img/'.$tag_detail->img; 
            if($image_url!=''){
                $img_view=' <div class="image-input mt-2" data-kt-image-input="true">
                    <div class="image-input-wrapper w-40px h-40px" style="background-image: url( '.base_url().'tag_img/'. $tag_detail->img.')"></div>
                </div>';
            } else {
                $img_view=' <div class="image-input mt-2" data-kt-image-input="true">
                    <div class="image-input-wrapper w-40px h-40px" style="background-image: url( '.base_url().'assets/images/Jewel.jpg)"></div>
                </div>';
            }
            $row='<tr class="tag_item"><input type="hidden" name="tag_id[]" id="tag_id_get'.$count.'" value="'.$tag_detail->tag_id.'"><td>'.($count+1).'</td><td>'.$tag_detail->tag_id.'</td><td>'.$img_view.'</td><td '.$class.' >'.$jewel_type->jewel_type.'</td><td>'.$item_name->ITEMNAME.'</td><td>'.$subitem_name->SUBITEM_NAME.'</td><td '.$id.'>'.$tag_detail->net_weight.'</td><td>
                <a href="javascript:;" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm btnDelete" data-bs-toggle="modal" data-bs-target="#">
                    <span class="svg-icon svg-icon-3">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z" fill="currentColor"></path>
                            <path opacity="0.5" d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z" fill="currentColor"></path>
                            <path opacity="0.5" d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z" fill="currentColor"></path>
                        </svg>
                    </span>
                </a>
                </td></tr>';
            echo ''.'||'.$row.'||'.$tag_detail->item_name.'||'.$tag_detail->subitem_name.'||'.$tag_detail->metal_type.'||'.$tag_detail->net_weight;
        }
        else{

            echo '1';
        }



        

    }
    public function jst_save()

    {
		$jst_date = $this->input->post('kt_datepicker_new_loan_date');
        $from_company = $this->input->post('from_company');
        $to_company = $this->input->post('to_company');
        $send_via = $this->input->post('send_via');
        $jst_cash = $this->input->post('jst_cash');
        $tag_id = $this->input->post('tag_id') ? $this->input->post('tag_id') :[];
        $tagged_count=count((array)$tag_id);
        $gold_count = $this->input->post('gold_count1');
        $silver_count = $this->input->post('silver_count1');
        $total_gold_weight = $this->input->post('total_gold_weight1');
        $total_silver_weight = $this->input->post('total_silver_weight1');
        $old_metal_count = $this->input->post('old_metal_count1');
        $old_metal_tot_weight = $this->input->post('old_metal_tot_weight1');
        $checkbox = $this->input->post('old_metal_checkbox');
        $count=count($checkbox);

        $get_id=$this->db->query("SELECT * FROM jst_inventory ORDER BY id DESC ")->row();
        $id=$get_id->id+1;
        $prefix="JST-";
        $suffix="/23";
        $jst_id=$prefix.str_pad($id,4,0,STR_PAD_LEFT).$suffix;
        $data['added_user'] = $_SESSION['username'];
        $data['created_on'] = date('Y-m-d H:i:s');
		$today=date("Y-m-d");

        if (!empty($tag_id)) {
             foreach ($tag_id as $i => $val) {
                if(isset($tag_id[$i])){
              
                $update = $this->db->query("UPDATE tag_entry SET jst_inventory='".$jst_id."' WHERE tag_id='". $tag_id[$i]."'");
                $tag_id_detail = $this->db->query("SELECT * from tag_entry WHERE tag_id='".$tag_id[$i]."' ")->row();
                // print_r($tag_id_detail->metal_type);exit();
                $res = $this->db->query("
                INSERT INTO jst_inventory_tagged (
                    tagged_id,
                    jst_id,
                    item_type,
                    item,
                    subitem,
                    net_weight,
                    created_on,
        			created_by,
                	status)
                values(
                    '".$tag_id[$i]."',
    				'".$jst_id."',
    				'".$tag_id_detail->metal_type."', 
    				'".$tag_id_detail->item_name."',
                    '".$tag_id_detail->subitem_name."',
                    '".$tag_id_detail->net_weight."',
                    '".$data['created_on']."',
                    '".$data['added_user']."',
                    'Y'
                    )");
            }
        }
    }

    // print_r($checkbox);
    // exit;

        $j=0;
        if (!empty($checkbox)) {
            foreach ($checkbox as $i => $val) {
                if(isset($checkbox[$i])){                    
                    $old_metal_detail = $this->db->query("SELECT * from salesentry WHERE sale_id='".$checkbox[$i]."' ")->row();
                    $old_metal_count  = $old_metal_detail->oge_gold_count  + $old_metal_detail->oge_silver_count;
                    $old_metal_weight = $old_metal_detail->oge_gold_weight + $old_metal_detail->oge_silver_weight;
                    $res = $this->db->query("INSERT INTO jst_inventory_old_metal (
                        company,
                        sales_id,
                        count,
                        weight,
                        jst_id,
                        created_on,
                    created_by,
                    status)
                        values(
                        '".$old_metal_detail->company_id."',
                        '".$checkbox[$i]."',
                        '".$old_metal_count."',
                        '".$old_metal_weight."',
                        '".$jst_id."',
                        '".$data['created_on']."',
                        '".$data['added_user']."',
                        'Y'
                        )");
                }   
                $j++;
            }
        }


        // print_r($res);
        // exit();
        $result = $this->db->query("INSERT INTO jst_inventory (
			date,
			from_company,
			to_company,
			send_via,
			cash,
			tagged_item_gold_count,
			tagged_item_gold_weight,
			tagged_item_silver_count,
			tagged_item_silver_weight,
			old_metal_count,
			old_metal_weight,
			
			created_on,
			created_by,
        	status,
            jst_id
			
		
			) VALUES(
				'".$today."',
				'".$from_company."',
				'".$to_company."',
				'".$send_via."',
				'".$jst_cash."',
				'".$gold_count."',
				'".$total_gold_weight."',
				'".$silver_count."',
				'".$total_silver_weight."',
				'".$old_metal_count."',
				'".$old_metal_tot_weight."',				
				'".$data['created_on']."',
        		'".$data['added_user']."',
        		'Y',
                '".$jst_id."'
	
		)");

        // print_r($result);

        // exit();
	
        add_notification(date('Y-m-d H:i:s'), $from_company, "Inventory", "New JST ", $jst_id. ' Created By ' .$_SESSION['username'],'', $_SESSION['USERID'], '0', $jst_id);
       
        if($result)
        {
            $this->session->set_flashdata('g_success',$jst_id.'New JST have been added successfully...');
        }else{
           $this->session->set_flashdata('g_err', 'Could not add JST !');
        }
        redirect('jst_inventory');



    }
    public function jst_missed($id)

    {
        // print_r($id);exit;
        $data['jst']            = $this->db->query("SELECT * FROM jst_inventory WHERE id='".$id."'  ")->row();
        if ($data['jst']) {
          $data['tagged_detail']  = $this->db->query("SELECT * FROM jst_inventory_tagged WHERE jst_id='".$data['jst']->jst_id."'  ")->result_array();
          $data['old_metal_detail']  = $this->db->query("SELECT * FROM jst_inventory_old_metal WHERE jst_id='".$data['jst']->jst_id."'  ")->result_array();
        }
        
      
        $this->load->view('jst_inventory/jst_inventory_add_missed_some',$data);
    }
    public function jst_missed_update($id)

    {

        $description  = $this->input->post('missed_description');
        $update       = $this->db->query("UPDATE jst_inventory SET status='M',description='".$description."'  WHERE id= '".$id."'");
        $data['jst']  = $this->db->query("SELECT * FROM jst_inventory WHERE id='".$id."'  ")->row();
        $checkbox1    = $this->input->post('check_box1');
        $count1       = count((array)$checkbox1);
        $checkbox2    = $this->input->post('check_box2');
        $count2       = count((array)$checkbox2); 

        $i=0;
        if (isset($checkbox1)) {
            foreach ($checkbox1 as $i => $val) {
                if(isset($checkbox1[$i])){
                $result= $this->db->query("UPDATE jst_inventory_tagged SET status='M'  WHERE tagged_id='".$checkbox1[$i]."' AND jst_id='".$data['jst']->jst_id."' ");

                }
                $i++;
            }
        }
        $j=0;
        if (isset($checkbox2)) {
            foreach ($checkbox2 as $i => $val) {
                if(isset($checkbox2[$i])){
                $result= $this->db->query("UPDATE jst_inventory_old_metal SET status='M'  WHERE sales_id= '".$checkbox2[$i]."' AND jst_id= '".$data['jst']->jst_id."'");
                }
                $j++;
            }
        }

        if($result)
        {
            $this->session->set_flashdata('g_success',$jst_id.'JST have been Updated successfully...');
        }else{
           $this->session->set_flashdata('g_err', 'Could not update JST !');
        }

        redirect('jst_inventory');

    }
    public function jst_receive($id){
        // print_r($id);exit();
        $update= $this->db->query("UPDATE jst_inventory SET status='R'  WHERE id= '".$id."'");
        $data['jst']  = $this->db->query("SELECT * FROM jst_inventory WHERE id='".$id."'  ")->row();
        add_notification(date('Y-m-d H:i:s'), $data['jst']->from_company, "Inventory", "Update JST ", $data['jst']->jst_id. ' Updated By ' .$_SESSION['username'],'', $_SESSION['USERID'], '0', $data['jst']->jst_id);
        redirect('jst_inventory');

    }
}
