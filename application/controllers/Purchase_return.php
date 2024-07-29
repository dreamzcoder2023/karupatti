<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/* ************************************************************************************
        Purpose : To handle all Department functions 2022-08-19
***************************************************************************************/
class Purchase_return extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
       $this->load->model(array("purchase_return_model"));
        $this->load->library('user_agent');

         $fin_year=$this->purchase_return_model->get_fin_years_list();
        $db=substr($fin_year->DBNAME,0,strlen($fin_year->DBNAME)-4);
        

        $config_app = switch_db_dynamic($db);
        $this->purchase_return_model->other_db = $this->load->database($config_app,TRUE);


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
        $data['suppliers_list'] = $this->purchase_return_model->get_supplier_name_list();
       
        $this->load->view('purchase_return/purchase_return_tag',$data);
       
    }


    public function tag_return_history()

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


        // $data['nontag_return_list'] = $this->db->query("SELECT  *  FROM purchase_return_tag  ORDER BY id DESC ")->result_array();
        $data['nontag_return_list']  = $this->db->query(" SELECT  * FROM 
        ( SELECT *, ROW_NUMBER() OVER (ORDER BY date DESC) AS sl FROM purchase_return_tag WHERE  status!='' $fdate $tdate $uname )N 
         WHERE      sl BETWEEN $offset AND $page_limit ")->result_array();
        $data['count']=count( $this->db->query("SELECT  *  FROM purchase_return_tag WHERE  status!='' $fdate $tdate $uname ORDER BY id DESC ")->result_array());
        $data['user_list']=$this->db->query("SELECT * FROM USERLIST ")->result_array();
     
        $this->load->view('purchase_return/purchase_return_tag_history',$data);
       
    }


    public function nontag_return()

    {
        $data['suppliers_list'] = $this->purchase_return_model->get_supplier_name_list();
        $data['item_list'] = $this->db->query("SELECT * FROM ITEMS WHERE COUNT>0")->result_array();
        $this->load->view('purchase_return/purchase_return_nontag',$data);
       
    }

    public function return_tag_save()
    {
// print_r(1);exit();
        $data['added_user'] = $_SESSION['username'];
        $data['created_on'] = date('Y-m-d H:i:s');
        $date=date('Y-m-d');
        $tag_id_array = $this->input->post('tag_id_array');
      

        $lot_no = $this->input->post('old_gold_lot_convert_lot_no');
		$item_type = $this->input->post('old_gold_lot_convert_item_type');
        if($item_type=='0' || $item_type==''  ){
            $item_type='1';
        }
		$count = $this->input->post('old_gold_lot_convert_count1');
		$weight = $this->input->post('old_gold_lot_convert_weight1');
        //print_r($weight);exit;
		$after_melt_weight = $this->input->post('old_gold_lot_convert_weight_after');
        //   print_r($after_melt_weight); exit();
		$less =$this->input->post('old_gold_lot_convert_weight_less1');
		$purity = $this->input->post('old_gold_lot_convert_purity1');
		$metal_weight = $this->input->post('old_gold_lot_convert_metal_weight1');
		$pure_metal_purity = $this->input->post('old_gold_lot_convert_pure_metal_purity');
		$actual_pure = $this->input->post('old_gold_lot_convert_actual_pure1');
		$converter = $this->input->post('old_gold_lot_converter');
        $today=date("Y-m-d");
        $ext='0';
		
		if(!empty($_FILES['add_party_new_loan']['name'])){
			
            $_FILES['file']['name'] = $_FILES['add_party_new_loan']['name'];
            $_FILES['file']['type'] = $_FILES['add_party_new_loan']['type'];
            $_FILES['file']['tmp_name'] = $_FILES['add_party_new_loan']['tmp_name'];
            $_FILES['file']['error'] = $_FILES['add_party_new_loan']['error'];
            $_FILES['file']['size'] = $_FILES['add_party_new_loan']['size'];
            $ext = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
            $config['upload_path'] = 'assets/images/pure_gold_wallet_img'; 
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $config['max_size'] = '50000';
            $config['file_name'] = $lot_no;
     
            $this->load->library('upload',$config); 
      
            if($this->upload->do_upload('file')){
              $uploadData = $this->upload->data();
              $filename = $uploadData['file_name'];
     
              $data['totalFiles'] = $filename;

            }
          }

         
		  $img=$lot_no.".". $ext;
	
         $res = $this->db->query("INSERT INTO purchase_return_tag(date,count,weight,created_on,created_by,status) VALUES('".$today."','".$count."','".$weight."','".$data['created_on']."','".$data['added_user']."','Y')");
          //print_r($actual_pure);exit;
        $res = $this->db->query("INSERT INTO pure_gold_wallet (date,jewel_type,type,count,weight,after_melt_weight,less,purity,metal_weight,pure_metal_purity,actual_pure,converter,img,CREATED_ON,CREATED_BY,status,ref_no) VALUES('".$today."','".$item_type."','Purchase ','".$count."','".$weight."', '".$after_melt_weight."', '".$less."','".$purity."', '".$metal_weight."','".$pure_metal_purity."','".$actual_pure."', '".$converter."', '".$img."','".$data['created_on']."', '".$data['added_user']."','Y','".$lot_no."')");
        
        $get_id= $this->db->query("SELECT  *  FROM purchase_return_tag  ORDER BY id DESC ")->row();
        for($i=0;$i<$count;$i++)
        {
            $tag_detail=$this->db->query("SELECT  *  FROM tag_entry  WHERE tag_id='".$tag_id_array[$i]."' ")->row();

            $res = $this->db->query("INSERT INTO purchase_return_tag_history(purchase_return_id,date,tag_id,img,item,subitem,company,weight,stone,net_weight,created_on,created_by,status) VALUES('".$get_id->id."','".$date."','".$tag_detail->tag_id."','".$tag_detail->img."','".$tag_detail->item_name."','".$tag_detail->subitem_name."','".$tag_detail->company_id."','".$tag_detail->weight."','".$tag_detail->stone."','".$tag_detail->net_weight."','".$data['created_on']."','".$data['added_user']."','Y')");
            $res = $this->db->query("INSERT INTO pure_gold_wallet_detail(date,item_name,weight) VALUES('".$date."','".$item_id."','".$weight."')");

        }
        add_notification(date('Y-m-d H:i:s'), '', "Inventory", "Purchase Return - Tagged ", $lot_no. ' Created By ' .$_SESSION['username'],'', $_SESSION['USERID'], '0', $lot_no);
        redirect('Purchase_return');
    }
    public function nontag_return_add()
    {
        $data['item'] = $this->input->post('item1');
        $data['item_type'] = $this->input->post('item_type1');
        $data['count'] = $this->input->post('count1');
        $data['weight'] = $this->input->post('weight1');
        $count1=count($data['count']);
       
        
        $data['non_tag_count'] = $this->input->post('non_tag_count');
        $data['non_tag_weight'] = $this->input->post('non_tag_weight');
        $data['tot_count'] = $this->input->post('tot_count2');
        $data['tot_weight'] = $this->input->post('tot_weight2');
        $data['added_user'] = $_SESSION['username'];
        $data['created_on'] = date('Y-m-d H:i:s');
        $date=date('Y-m-d');
        // print_r($data['tot_count']); print_r($data['tot_weight']);exit();

        $lot_no = $this->input->post('old_gold_lot_convert_lot_no');
		$item_type = $this->input->post('old_gold_lot_convert_item_type');
        if($item_type!='0' || $item_type!=''  ){
            $item_type='1';
        }
		$count = $this->input->post('old_gold_lot_convert_count1');
		$weight = $this->input->post('old_gold_lot_convert_weight1');
		$after_melt_weight = $this->input->post('old_gold_lot_convert_weight_after');
		$less =$this->input->post('old_gold_lot_convert_weight_less1');
		$purity = $this->input->post('old_gold_lot_convert_purity1');
		$metal_weight = $this->input->post('old_gold_lot_convert_metal_weight1');
		$pure_metal_purity = $this->input->post('old_gold_lot_convert_pure_metal_purity');
		$actual_pure = $this->input->post('old_gold_lot_convert_actual_pure1');
		$converter = $this->input->post('old_gold_lot_converter');
		
		$today=date("Y-m-d");
        //print_r($purity);exit();

		$ext='0';
		
		if(!empty($_FILES['add_party_new_loan']['name']))
        {
			//print_r(1);
            //$ext = pathinfo($_FILES['party_photo']['name'], PATHINFO_EXTENSION);
            //print_r($_FILES['party_photo']['name'][$i]);exit;

            $_FILES['file']['name'] = $_FILES['add_party_new_loan']['name'];
            $_FILES['file']['type'] = $_FILES['add_party_new_loan']['type'];
            $_FILES['file']['tmp_name'] = $_FILES['add_party_new_loan']['tmp_name'];
            $_FILES['file']['error'] = $_FILES['add_party_new_loan']['error'];
            $_FILES['file']['size'] = $_FILES['add_party_new_loan']['size'];
                  $ext = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
            $config['upload_path'] = 'assets/images/pure_gold_wallet_img'; 
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $config['max_size'] = '50000';
            $config['file_name'] = $lot_no;
     
            $this->load->library('upload',$config); 
      
            if($this->upload->do_upload('file'))
            {
                $uploadData = $this->upload->data();
                $filename = $uploadData['file_name'];
                $data['totalFiles'] = $filename;
            }
          }

         
    	$img=$lot_no.".". $ext;
    	
        $res = $this->db->query("INSERT INTO pure_gold_wallet (date,jewel_type,type,count,weight,after_melt_weight,less,purity,metal_weight,pure_metal_purity,actual_pure,converter,img,CREATED_ON,CREATED_BY,status,ref_no) VALUES('".$today."','".$item_type."','Purchase ','".$count."','".$weight."','".$after_melt_weight."','".$less."','".$purity."','".$metal_weight."','".$pure_metal_purity."','".$actual_pure."','".$converter."','".$img."','".$data['created_on']."',
    	'".$data['added_user']."',
    	'Y',
    	'".$lot_no."'
    	)");

        // print_r( $data['tot_count']);exit;

        $res = $this->db->query("INSERT INTO purchase_return_nontag (date,count,weight,created_on,created_by,status) VALUES('".$date."','".$data['tot_count']."','".$data['tot_weight']."','".$data['created_on']."','".$data['added_user']."','Y'
        )");
        
        $get_id= $this->db->query("SELECT  *  FROM purchase_return_nontag  ORDER BY id DESC ")->row();
        for($i=0;$i<$count1;$i++)
        {
            if($data['count'][$i]>0)
            {
                $item_id = str_pad($data['item'][$i], 3, '0', STR_PAD_LEFT);
                $res = $this->db->query("INSERT INTO purchase_return_nontag_history(
                    purchase_return_id,
                    date,
                    item_type,
                    item,
                    count,
                    weight,
                    created_on,
                    created_by,
                    status

                    ) VALUES(
                        '".$get_id->id."',
                        '".$date."',
                        '".$data['item_type'][$i]."',
                        '".$item_id."',
                        '".$data['count'][$i]."',
                        '".$data['weight'][$i]."',
                         '".$data['created_on']."',
                         '".$data['added_user']."',
                         'Y'
                )");
                $res = $this->db->query("INSERT INTO pure_gold_wallet_detail(
                    date,
                   
                    item_name,
                   
                    weight
                  

                    ) VALUES(
                        '".$date."',
                       
                        '".$item_id."',
                        
                        '".$weight."'
                      
                        
                )");
                $update= $this->db->query("UPDATE ITEMS SET COUNT=COUNT-".$data['count'][$i] ." ,WEIGHT=WEIGHT-".$data['weight'][$i] ."  WHERE SNO= '".$item_id."'");
            }
        }
        add_notification(date('Y-m-d H:i:s'), '', "Inventory", "Purchase Return - Non Tagged ", $lot_no. ' Created By ' .$_SESSION['username'],'', $_SESSION['USERID'], '0', $lot_no);

        redirect('Purchase_return/nontag_return_history');
    }
    public function nontag_return_history()
    {

        $data['dt_fill'] = $this->input->post('dt_fill_nontag_wallet_history');

        $data['from_date_fillter'] = $this->input->post('from_date_fillter_nontag_wallet_history');
        $data['to_date_fillter'] = $this->input->post('to_date_fillter_nontag_wallet_history');
        $fdate ='';
        $tdate ='';

        // print_r($data['dt_fill']);exit();
        if($data['dt_fill']=="all"){
            $fdate ='';
            $tdate ='';
        
        }
        if($data['dt_fill']=="today"){
            $data['today_date_fillter'] = date("Y-m-d");
            $fdate =" AND date='".$data['today_date_fillter']."'";
            $tdate ='';
        }
        if($data['dt_fill']=="week")
        {
            $today=date('l');
            if($today=="Sunday"){
                $data['week_from_date_fillter']=date(' Y-m-d', strtotime("sunday 0 week"));
           
                $data['week_to_date_fillter']=date(' Y-m-d', strtotime("saturday 1 week"));
               // print_r($data['week_to_date_fillter']);exit;
                    $fdate =" AND date>='".$data['week_from_date_fillter']."'";
                $tdate =" AND date<='".$data['week_to_date_fillter']."'";
        
            }else
            {
                $data['week_from_date_fillter']=date(' Y-m-d', strtotime("sunday -1 week"));
                $data['week_to_date_fillter']=date(' Y-m-d', strtotime("saturday 0 week"));
                //print_r($data['week_to_date_fillter']);exit;
                $fdate =" AND date>='".$data['week_from_date_fillter']."'";
                $tdate =" AND date<='".$data['week_to_date_fillter']."'";
            }
        }
        if($data['dt_fill']=="monthly")
        {
       
            $first=date('Y-m-01');
            $last=date('Y-m-t');
            $fdate =" AND date>='".$first."'";
            
           
                $tdate ="AND date<='".$last."'";
        }
        if($data['dt_fill']=="custom Date")
        {
            if($data['from_date_fillter']!='')
            {
                $first=date('Y-m-d',strtotime($data['from_date_fillter']));
                $fdate =" AND date>='".$first."'";
                
            }
            else
            {
                $fdate ='';
            }
            if($data['to_date_fillter']!='')
            {
                $last=date('Y-m-d',strtotime($data['to_date_fillter']));
                $tdate =" AND date<='".$last."'";
                
            }
            else
            {
                $tdate ='';
            } 
        }
        $data['username'] = $this->input->post('username');
        if($data['username']!='')
        {
            $uname =" AND created_by ='".$data['username']."'";
        }
        else
        {
            $uname ='';
        }
        if($data['username']!='')
        {
            $uname =" AND created_by ='".$data['username']."'";
                    
        }
        else
        {
            $uname ='';
        }
        // print_r($data['username']);exit();
        $page       = isset($_GET['page']) ? $_GET['page'] : 1;

        $limit      = 10;
        $offset     = ($page - 1) * $limit +1;
        $page_limit = $offset+$limit-1;
    
    
        // $data['nontag_return_list'] = $this->db->query("SELECT  *  FROM purchase_return_tag  ORDER BY id DESC ")->result_array();
        $data['nontag_return_list']  = $this->db->query(" SELECT  * FROM 
        ( SELECT *, ROW_NUMBER() OVER (ORDER BY date DESC) AS sl FROM purchase_return_nontag WHERE  status!='' $fdate $tdate $uname )N 
         WHERE      sl BETWEEN $offset AND $page_limit ")->result_array();
        $data['count']=count( $this->db->query("SELECT  *  FROM purchase_return_nontag WHERE  status!='' $fdate $tdate $uname ORDER BY id DESC ")->result_array());
        
        $data['user_list']=$this->db->query("SELECT * FROM USERLIST ")->result_array();
   
        $this->load->view('purchase_return/purchase_return_nontag_history',$data);
       
    }
    public function tag_history_view()
    {

        $id=$_POST['id'];
        $tag_return_list = $this->db->query("SELECT  *  FROM purchase_return_tag WHERE id='".$id."'  ORDER BY id DESC ")->row();
        $tag_return_list_view= $this->db->query("SELECT  *  FROM purchase_return_tag_history WHERE purchase_return_id='".$id."'   ")->result_array();
        $i=1;$rows='';
        foreach($tag_return_list_view as $view_list)
        {
            $date_format  = $this->db->query("SELECT * FROM general_settings  ")->row();
            $format= $date_format->date_format;
            $date= date("$format", strtotime($tag_return_list->date));
           
            $item_name  = $this->db->query("SELECT * FROM ITEMS WHERE  SNO='". $view_list['item']."' ")->row();
            $item=$item_name->ITEMNAME;

            $subitem_name  = $this->db->query("SELECT * FROM SUBITEM_LIST WHERE  SUB_ID='". $view_list['subitem']."' ")->row();


            // $company=$view_list['company'];
            $company  = $this->db->query("SELECT * FROM COMPANY WHERE ACTIVE='Y' AND COMPANYCODE='". $view_list['company']."' ")->row();
            // echo $company->COMPANYNAME;
            // $img=$view_list['img'];
            $weight=$view_list['weight'];
            $stone=$view_list['stone'];
            $net_weight=$view_list['net_weight'];
            $tag_id=$view_list['tag_id'];
        
            $image_url =  base_url().'tag_img/'. $view_list['img']; 
            if(@getimagesize($image_url))
            {
	
	
            	$img='<div class="image-input" data-kt-image-input="true"><div class="image-input-wrapper w-40px h-40px" style="background-image: url(<?php echo base_url() ?>tag_img/'. $view_list['img'].')"></div></div>';
            }
            else
            {
     
                $img='<div class="image-input" data-kt-image-input="true"><div class="image-input-wrapper w-40px h-40px" style="background-image: url(<?php echo base_url() ?>assets/media/svg/avatars/blank_jwl.svg)"></div></div>';
    	    }							
            $rows.='<tr><td>'.$i.'</td><td>'.$company->COMPANYNAME.'</td><td>'.$tag_id.'</td><td>'.$img.'</td><td>'.$item.'-'.$subitem_name->SUBITEM_NAME.'</td><td>'.$weight.'</td><td>'.$stone.'</td><td>'.$net_weight.'</td> </tr>';
            $i++; 
        } 

        echo ''.'||'.$date.'||'.$tag_return_list->created_by.'||'.$tag_return_list->created_by.'||'. $tag_return_list->count.'||'.$tag_return_list->weight.'||'.$rows;

    }
    public function nontag_history_view()
    {
        $id=$_POST['id'];
        $nontag_return_list = $this->db->query("SELECT  *  FROM purchase_return_nontag WHERE id='".$id."'  ORDER BY id DESC ")->row();
        $nontag_return_list_view= $this->db->query("SELECT  *  FROM purchase_return_nontag_history WHERE purchase_return_id='".$id."'   ")->result_array();
        $i=1;
        foreach($nontag_return_list_view as $view_list)
        {
            $date_format  = $this->db->query("SELECT * FROM general_settings  ")->row();
            $format= $date_format->date_format;
            $date= date("$format", strtotime($view_list['date']));
            // $date=$view_list['date'];
            $item_name  = $this->db->query("SELECT * FROM ITEMS WHERE  SNO='". $view_list['item']."' ")->row();
            $item=$item_name->ITEMNAME;
            $count=$view_list['count'];
            $weight=$view_list['weight'];

            $rows.='<tr><td>'.$i.'</td><td>'.$date.'</td><td>'.$item.'</td><td>'.$count.'</td><td>'.$weight.'</td> </tr>';
            $i++; 
        } 
        echo ''.'||'.$date.'||'.$nontag_return_list->created_by.'||'. $nontag_return_list->count.'||'.$nontag_return_list->weight.'||'.$rows;
    }

    public function tag_item_add()
    {
        $id=$_POST['id'];
        $rows='';
        $tag_entry=$this->db->query("SELECT * FROM  tag_entry WHERE status!='R' AND status!='S' AND tag_id='".$id."' ")->row();



        //print_r($tag_entry);exit;
       
        if(isset($tag_entry))
        {
            $item_name  = $this->db->query("SELECT * FROM ITEMS WHERE  SNO='". $tag_entry->item_name."' ")->row();

            $company  = $this->db->query("SELECT * FROM COMPANY WHERE ACTIVE='Y' AND COMPANYCODE='". $tag_entry->company_id."' ")->row();

            $image_url =  base_url().'tag_img/'. $tag_entry->img; 

        	if(@getimagesize($image_url))
            {
        		  $img_div='<div class="image-input" data-kt-image-input="true"><div class="image-input-wrapper w-40px h-40px" style="background-image: url('.$image_url.')"></div></div>';

        	}
        	else
            {
        	       $img_div='<div class="image-input" data-kt-image-input="true"><div class="image-input-wrapper w-40px h-40px" style="background-image: url('.base_url().'assets/images/sample_jewel.jpg)"></div></div>';

        	}
           
            $rows.='<tr><td>1</td> <td class="ple1">'. $company->COMPANYNAME.'</td><td>'. $tag_entry->tag_id.'</td><td>'.$img_div.'</td><td class="ple1">'. $item_name->ITEMNAME.'- '. $tag_entry->subitem_name.'</td><td>'. $tag_entry->weight.'</td><td>'. $tag_entry->stone.'</td><td><input type="hidden" name="net_weight[]" id=net_weight[] class="net_weight" value="'. $tag_entry->net_weight.'">'. $tag_entry->net_weight.'</td></tr>';
        }
        echo ''.'||'.$rows.'||'.$tag_entry->weight.'||'.$tag_entry->tag_id;

    }
}