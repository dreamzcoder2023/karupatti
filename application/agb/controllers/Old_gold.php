<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/* ************************************************************************************
		Purpose : To handle all the village functions
***************************************************************************************/
class Old_gold extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model(array("Old_gold_model","Accountsgroup_model"));
        $this->load->library('user_agent');

        $fin_year=$this->Accountsgroup_model->get_fin_years_list();
        $db=substr($fin_year->DBNAME,0,strlen($fin_year->DBNAME)-4);
        //echo $db;exit;
        $config_app = switch_db_dynamic($db);
        
        $this->Old_gold_model->other_db = $this->load->database($config_app,TRUE);
		
		//if ($this->session->userdata['username'] == TRUE)
		if (isset($this->session->userdata['username']) && $this->session->userdata['username'] == TRUE)
        {
            //do something
        }else{
            redirect('login'); //if session is not there, redirect to login page
        } 
		date_default_timezone_set("Asia/Kolkata");
		$this->session->set_userdata('comtitle', 'Old_gold');
	}

	
	public function index()
	{
		$data['company_fill'] = $this->input->post('company_fill');
        if($data['company_fill']!=''){
        $cname =" AND company='".$data['company_fill']."'";
        
        }
        else{
            $cname ='';
        }


		$data['type_fill'] = $this->input->post('type_fill');
        if($data['type_fill']!=''){
        $tname =" AND type ='".$data['type_fill']."'";
        
        }
        else{
            $tname ='';
        }

		
		$data['dt_fill'] = $this->input->post('dt_fill_old_gold_list');

$data['from_date_fillter'] = $this->input->post('from_date_fillter_old_gold_list');
$data['to_date_fillter'] = $this->input->post('to_date_fillter_old_gold_list');
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

        // $data['old_gold_list']=$this->db->query("SELECT * FROM  old_gold WHERE company!='' $fdate $tdate $cname $tname ")->result_array();
		$data['old_gold_list']  = $this->db->query(" SELECT  * FROM 
          ( SELECT *, ROW_NUMBER() OVER (ORDER BY id ASC) AS sl FROM old_gold WHERE  company!='' $fdate $tdate $cname $tname )N 
           WHERE      sl BETWEEN $offset AND $page_limit ")->result_array();
$data['count']=count($this->db->query("SELECT * FROM  old_gold WHERE company!='' $fdate $tdate $cname $tname ")->result_array());
		$data['company_list']  = $this->db->query("SELECT * FROM COMPANY WHERE ACTIVE='Y'  ")->result_array();
		$this->load->view('old_gold/old_gold_list',$data);
	}

    public function old_gold_wallet()
	{

		$data['type_fill'] = $this->input->post('type_fill');
        if($data['type_fill']!=''){
        $tname =" AND jewel_type_id ='".$data['type_fill']."'";
        
        }
        else{
            $tname ='';
        }
		$data['item_fill'] = $this->input->post('item_fill');
        if($data['item_fill']!=''){
        $iname =" AND SNO ='".$data['item_fill']."'";
        
        }
        else{
            $iname ='';
        }

        $data['old_gold_wallet']=$this->db->query("SELECT * FROM ITEMS WHERE OLD_GOLD_COUNT>0 $tname $iname ")->result_array();
		$data['old_gold_wallet_gold']=$this->db->query("SELECT SUM(OLD_GOLD_COUNT) as gold_count,SUM(OLD_GOLD_WEIGHT) as gold_weight FROM ITEMS WHERE OLD_GOLD_COUNT>0 AND jewel_type_id='1' $tname $iname ")->row();
		$data['old_gold_wallet_silver']=$this->db->query("SELECT SUM(OLD_GOLD_COUNT) as silver_count,SUM(OLD_GOLD_WEIGHT) as silver_weight FROM ITEMS WHERE OLD_GOLD_COUNT>0 AND jewel_type_id='2' $tname $iname ")->row();
		$data['metal_type_list']  = $this->db->query("SELECT * FROM jewel_type  ")->result_array();

		$data['old_gold_wallet_filter']=$this->db->query("SELECT * FROM ITEMS WHERE OLD_GOLD_COUNT>0  ")->result_array();

		$this->load->view('old_gold/old_gold_wallet',$data);
	}

	public function old_gold_list_view()
    {

       $id=$_POST['id'];
$rows='';
	   $old_gold_list=$this->db->query("SELECT * FROM old_gold WHERE ref_no='".$id ."' ")->row();

	   $date_format  = $this->db->query("SELECT * FROM general_settings  ")->row();
	   $format= $date_format->date_format;
	   $date= date("$format", strtotime($old_gold_list->date));
	   $company  = $this->db->query("SELECT * FROM COMPANY WHERE ACTIVE='Y' AND COMPANYCODE='". $old_gold_list->company."' ")->row();
	
	   $old_gold_list_detail=$this->db->query("SELECT * FROM salesentry_old_exchange WHERE sales_id='".$id ."' ")->result_array();
	   $i=1;
	//    print_r("SELECT * FROM salesentry_old_exchange WHERE sales_id='".$id ."' AND status='Y'");exit;
foreach($old_gold_list_detail as $oglist){
	$sales_id=$oglist['sales_id'];
	//$item_type=$oglist['item_type'];
	$item_type=$this->db->query("SELECT * FROM jewel_type WHERE jewel_type_id='".$oglist['item_type']."'  ")->row();
	//$item_name=$oglist['item_name'];
	$item_name  = $this->db->query("SELECT * FROM ITEMS WHERE  SNO='". $oglist['item_name']."' ")->row();
	$subitem_name=$oglist['subitem_name'];
	//$subitem_name  = $this->db->query("SELECT * FROM SUBITEM_LIST WHERE  SUB_ID='". $oglist['subitem_name']."' ")->row();
	$img=$oglist['img'];
	$weight=$oglist['weight'];
	$st_weight=$oglist['st_weight'];
	$less=$oglist['less'];
	$net_weight=$oglist['net_weight'];

	$image_url =  base_url().'assets/images/old_gold_exchange_img/'. $img; 
	if(@getimagesize($image_url)){
		$img_div='<div class="image-input" data-kt-image-input="true">
		<div class="image-input-wrapper w-40px h-40px" style="background-image: url('.$image_url.')"></div>
	</div>';

	}
	else{
	$img_div='<div class="image-input" data-kt-image-input="true">
												<div class="image-input-wrapper w-40px h-40px" style="background-image: url('.base_url().'assets/images/sample_jewel.jpg)"></div>
											</div>';

	}
$rows.='<tr><td>'.$i.'</td><td>'.$date.'</td><td>'.$sales_id.'</td><td>'.$item_type->jewel_type.'</td><td>'.$img_div.'</td><td>'.$item_name->ITEMNAME.'</td><td>'.$subitem_name.'</td><td>'.$weight.'</td><td>'.$st_weight.'</td><td>'.$less.'</td><td>'.$net_weight.'</td></tr>';

$i++;
}


     echo    ''.'||'.$date.'||'.$company->COMPANYNAME.'||'.$old_gold_list->type.'||'.$old_gold_list->item_count.'||'.$old_gold_list->item_weight.'||'.$rows .'||'. $old_gold_list->CREATED_BY;
	
    }


	public function old_gold_wallet_view()
    {

       $id=$_POST['id'];
	   $old_gold_wallet_list=$this->db->query("SELECT * FROM ITEMS WHERE SNO='".$id."' ")->row();
	   $item_type=$this->db->query("SELECT * FROM jewel_type WHERE jewel_type_id='".$old_gold_wallet_list->jewel_type_id."'  ")->row();



	   $old_gold_list_detail=$this->db->query("SELECT * FROM salesentry_old_exchange WHERE item_name='".$id ."' AND status='Y' ")->result_array();
	   $i=1;
	   $rows='';	  
foreach($old_gold_list_detail as $oglist){
	$sales_id=$oglist['sales_id'];
	
	$item_type=$this->db->query("SELECT * FROM jewel_type WHERE jewel_type_id='".$oglist['item_type']."'  ")->row();
	
	$item_name  = $this->db->query("SELECT * FROM ITEMS WHERE  SNO='". $oglist['item_name']."' ")->row();
	$old_gold  = $this->db->query("SELECT * FROM old_gold WHERE  ref_no='". $oglist['sales_id']."' ")->row();
	
	//$subitem_name  = $this->db->query("SELECT * FROM SUBITEM_LIST WHERE  SUB_ID='". $oglist['subitem_name']."' ")->row();
	$img=$oglist['img'];
	$id=$oglist['id'];
	$weight=$oglist['weight'];
	$st_weight=$oglist['st_weight'];
	$less=$oglist['less'];
	$net_weight=$oglist['net_weight'];

	$date_format  = $this->db->query("SELECT * FROM general_settings  ")->row();
	$format= $date_format->date_format;
	$date=date($format, strtotime($old_gold->date));
	$company  = $this->db->query("SELECT * FROM COMPANY WHERE ACTIVE='Y' AND COMPANYCODE='". $oglist['company_id']."' ")->row();
 

	$image_url =  base_url().'assets/images/old_gold_exchange_img/'. $img; 
	if(@getimagesize($image_url)){
		$img_div='<div class="image-input" data-kt-image-input="true">
		<div class="image-input-wrapper w-40px h-40px" style="background-image: url('.$image_url.')"></div>
	</div>';

	}
	else{
	$img_div='	<div class="image-input" data-kt-image-input="true">
					<div class="image-input-wrapper w-40px h-40px" style="background-image: url('.base_url().'assets/images/Jewel.jpg)">
					</div>
				</div>';

	}
  $check_box='	<div class="fv-row fv-plugins-icon-container fv-plugins-bootstrap5-row-invalid d-flex align-items-center checkbox ">
  <div class="d-flex align-items-center">
	  <label class="form-check form-check-inline form-check-solid is-invalid">
		  <input class="form-check-input" name="checkbox[]" id="checkbox'.$i.'" type="checkbox" value="'.$id.'">
	  </label>
  </div>
</div>';

$i++;
$subitem_name1=$oglist['subitem_name'];
$rows.='<tr><td>'.$check_box.'</td><td>'.$date.'</td><td class="ple1">'.$company->COMPANYNAME.'</td><td>'.$sales_id.'</td><td>'.$img_div.'</td><td>'.$subitem_name1.'</td><td>'.$weight.'</td><td>'.$st_weight.'</td><td>'.$less.'</td><td>'.$net_weight.'</td></tr>';

}
			$type = $item_type->jewel_type?$item_type->jewel_type:'';
			$name = $old_gold_wallet_list->ITEMNAME?$old_gold_wallet_list->ITEMNAME:'';
			$count= $old_gold_wallet_list->OLD_GOLD_COUNT ? $old_gold_wallet_list->OLD_GOLD_COUNT:0;
			$wgt  = $old_gold_wallet_list->OLD_GOLD_WEIGHT? $old_gold_wallet_list->OLD_GOLD_WEIGHT:0;
			$weight = number_format($wgt,3);

	   echo    ''.'||'.$type.'||'.$name.'||'.$count.'||'.$weight.'||'.$rows;
	   
	}


	public function old_gold_add_lot(){

		$lot_no=$_POST['lot_no'];
		$checked=explode(',', $_POST['checked']);
		// print_r($checked);
		if($lot_no==''){
			$get_lot_no  = $this->db->query("SELECT * FROM old_gold_lot ORDER BY id DESC  ")->row();
			if(isset($get_lot_no)){
				$prefix="OLT-";
                $suffix="/23";
				$new_lot_no=str_pad($get_lot_no->id+1, 4, '0', STR_PAD_LEFT);
				$lot_no=$prefix.$new_lot_no.$suffix;
				
			}
			else{

				$prefix="OLT-";
				$suffix="/23";
				$new_lot_no=str_pad(1, 4, '0', STR_PAD_LEFT);
				$lot_no=$prefix.$new_lot_no.$suffix;
			}
			// print_r($lot_no);
			// exit();
		}
		$tot_count=0;
		$tot_weight=0;
		$today=date("Y-m-d");
		$data['added_user'] = $_SESSION['username'];
        $data['created_on'] = date('Y-m-d H:i:s');
		$count=count($checked);
		for($i=0;$i<$count;$i++){
			$res=$this->db->query("UPDATE salesentry_old_exchange SET status='L' WHERE id='".$checked[$i] ."'  ");

			$row_data  = $this->db->query("SELECT * FROM salesentry_old_exchange WHERE  id='". $checked[$i]."' ")->row();
			
			$res = $this->db->query("INSERT INTO old_gold_lot_detail (
				date,
				
				generate_no,
				lot_no,
				item_type,
				item,
				subitem,
				weight,
				stone,
				less,
				net_weight,
				img,
				CREATED_ON,
				CREATED_BY,
			
				status
			
				) VALUES(
					'".$today."',
					
					'".$row_data->sales_id ."',
					'".$lot_no ."',
					'".$row_data->item_type."',
					'".$row_data->item_name."',
					'".$row_data->subitem_name."',
					'".$row_data->weight."',
					'".$row_data->st_weight."',
					'".$row_data->less."',
					'".$row_data->net_weight."',
					'".$row_data->img."',
					 '".$data['created_on']."',
			'".$data['added_user']."',
			
			'Y'
			)");
			$update= $this->db->query("UPDATE ITEMS SET OLD_GOLD_COUNT=OLD_GOLD_COUNT-1 ,OLD_GOLD_WEIGHT=OLD_GOLD_WEIGHT-".$row_data->net_weight."  WHERE SNO= '".$row_data->item_name."'");
            $tot_count+=1;
			$tot_weight+=$row_data->net_weight;
		}

		$check_lot_no  = $this->db->query("SELECT * FROM old_gold_lot WHERE ref_no='".$lot_no ."'  ")->row();
			if(isset($check_lot_no)){
				$update= $this->db->query("UPDATE old_gold_lot SET count=count+".$tot_count." ,weight=weight-".$tot_weight."  WHERE ref_no= '".$lot_no."'");

			}
		else{
		$res = $this->db->query("INSERT INTO old_gold_lot (
			date,
			ref_no,
			item_type,
			count,
			weight,
			CREATED_ON,
			CREATED_BY,
        	status
		
			) VALUES(
				'".$today."',
				'".$lot_no ."',
				'".$row_data->item_type."',
				'".$tot_count."',
				'".$tot_weight."',
				 '".$data['created_on']."',
		'".$data['added_user']."',
		'Y'
		)");
			}
add_notification(date('Y-m-d H:i:s'), '', "Inventory", "Old Gold Lot Conversion  ", $lot_no. ' Created By ' .$_SESSION['username'],'', $_SESSION['USERID'], '0', $lot_no);

	}

	public function old_gold_lot()
    {
		$data['old_gold_lot_status'] = $this->input->post('old_gold_lot_status');
        if($data['old_gold_lot_status']!=''){
			if($data['old_gold_lot_status']=='1'){
        $sname =" AND status='Y'";
			}else{
				$sname =" AND status='C'";

			}

        }
        else{
            $sname ='';
        }


		$data['dt_fill'] = $this->input->post('dt_fill_old_gold_list');

$data['from_date_fillter'] = $this->input->post('from_date_fillter_old_gold_list');
$data['to_date_fillter'] = $this->input->post('to_date_fillter_old_gold_list');
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
						$data['suppliers_list'] = $this->Old_gold_model->get_supplier_name_list();
		$data['old_gold_lot_list']=$this->db->query("SELECT * FROM  old_gold_lot WHERE status!='N' $fdate $tdate  $sname order by date desc ")->result_array();
		$data['count']=count($this->db->query("SELECT * FROM  old_gold_lot WHERE status!='N' $fdate $tdate  $sname ")->result_array());
		$data['old_gold_lot_tot']=$this->db->query("SELECT SUM(count) as tot_count,SUM(weight) as tot_weight FROM  old_gold_lot WHERE status!='N' $fdate $tdate  $sname ")->row();

	
        // $data['supplier_list']  = $this->other_db->query("SELECT *FROM ACC_LEDGERS WHERE GROUP_NAME='SUPPLIERS' ORDER BY LEDGER_NAME;")->result_array();
      
		$this->load->view('old_gold/old_gold_lot',$data);		
	}
	public function pure_gold_wallet()
    {
		$data['type_fillter'] = $this->input->post('type_fillter');
        if($data['type_fillter']!=''){
			
        $type =" AND type='Old Gold Lot'";
		
        }
        else{
            $type ='';
        }
		$data['jewel_type_fillter'] = $this->input->post('jewel_type_fillter');
        if($data['jewel_type_fillter']!=''){
			
        $jewel_type =" AND jewel_type='".$data['jewel_type_fillter']."'";
		
        }
        else{
            $jewel_type ='';
        }
		



		$data['dt_fill'] = $this->input->post('dt_fill_pure_gold_stock_list');

		$data['from_date_fillter'] = $this->input->post('from_date_fillter_pure_gold_stock_list');
		$data['to_date_fillter'] = $this->input->post('to_date_fillter_pure_gold_stock_list');
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

		// $data['pure_gold_wallet']=$this->db->query("SELECT * FROM  pure_gold_wallet WHERE status='Y' $fdate $tdate $type $jewel_type ")->result_array();
		$data['pure_gold_wallet']  = $this->db->query(" SELECT  * FROM 
          ( SELECT *, ROW_NUMBER() OVER (ORDER BY id ASC) AS sl FROM pure_gold_wallet WHERE  status='Y' $fdate $tdate $type $jewel_type )N 
           WHERE      sl BETWEEN $offset AND $page_limit ")->result_array();
		$data['count'] = count($this->db->query("SELECT * FROM  pure_gold_wallet WHERE status='Y' $fdate $tdate $type $jewel_type ")->result_array());
		$data['pure_gold_wallet_gold']=$this->db->query("SELECT SUM(count) as tot_count,SUM(weight) as tot_weight FROM  pure_gold_wallet  WHERE jewel_type='1' $fdate $tdate $type $jewel_type ")->row();
		$data['pure_gold_wallet_silver']=$this->db->query("SELECT SUM(count) as tot_count,SUM(weight) as tot_weight FROM  pure_gold_wallet  WHERE jewel_type='2' $fdate $tdate $type $jewel_type ")->row();

		$this->load->view('old_gold/pure_gold_wallet',$data);		
	}

	public function old_gold_lot_view()
    {
		$rows='';
		$id=$_POST['id'];
		$old_gold_lot_view=$this->db->query("SELECT * FROM  old_gold_lot WHERE ref_no='".$id."' ")->row();
		$item_type=$this->db->query("SELECT * FROM jewel_type WHERE jewel_type_id='".$old_gold_lot_view->item_type."'  ")->row();

		$old_gold_lot_view_list=$this->db->query("SELECT * FROM  old_gold_lot_detail WHERE lot_no='".$id."' ")->result_array();
$i=1;
		foreach($old_gold_lot_view_list as $view_list){
			$date=$view_list['date'];
			$company=$view_list['company_id'];
			$generate_no=$view_list['generate_no'];
			$img=$view_list['img'];
			$item=$view_list['item'];
			$subitem=$view_list['subitem'];
			$weight=$view_list['weight'];
			$stone=$view_list['stone'];
			$less=$view_list['less'];
			$net_weight=$view_list['net_weight'];
			$item_name  = $this->db->query("SELECT * FROM ITEMS WHERE  SNO='". $item."' ")->row();
	      //  $subitem_name  = $this->db->query("SELECT * FROM SUBITEM_LIST WHERE  SUB_ID='". $subitem."' ")->row();
			$image_url =  base_url().'assets/images/old_gold_exchange_img/'. $img; 
	if(@getimagesize($image_url)){
		$img_div='<div class="image-input" data-kt-image-input="true">
		<div class="image-input-wrapper w-40px h-40px" style="background-image: url('.$image_url.')"></div>
	</div>';

	}
	else{
	$img_div='<div class="image-input" data-kt-image-input="true">
												<div class="image-input-wrapper w-40px h-40px" style="background-image: url('.base_url().'assets/images/sample_jewel.jpg)"></div>
											</div>';

	}
	
			$rows.='<tr><td>'.$i.'</td><td>'.$date.'</td><td>'.$company.'</td><td>'.$generate_no.'</td><td>'.$img_div.'</td><td>'.$item_name->ITEMNAME.'</td> <td>'.$subitem.'</td><td>'.$weight.'</td><td>'.$stone.'</td><td>'.$less.'</td><td>'.$net_weight.'</td></tr>';
		$i++;
	}

		echo ''.'||'.$item_type->jewel_type.'||'.$old_gold_lot_view->count.'||'.$old_gold_lot_view->weight.'||'.$rows;
	}


	public function old_gold_lot_convert()
    {
		$id=$_POST['id'];
		$old_gold_lot_view=$this->db->query("SELECT * FROM  old_gold_lot WHERE ref_no='".$id."' ")->row();
		echo ''.'||'.$old_gold_lot_view->count.'||'.$old_gold_lot_view->weight.'||'.$old_gold_lot_view->item_type.'||'.$old_gold_lot_view->ref_no;
	}
	public function old_gold_convert()
    {
		$lot_no = $this->input->post('old_gold_lot_convert_lot_no');
		$item_type = $this->input->post('old_gold_lot_convert_item_type');
		$count = $this->input->post('old_gold_lot_convert_count1');
		$weight = $this->input->post('old_gold_lot_convert_weight1');
		$after_melt_weight = $this->input->post('old_gold_lot_convert_weight_after');
		$less = $this->input->post('old_gold_lot_convert_weight_less1');
		$purity = $this->input->post('old_gold_lot_convert_purity1');
		$metal_weight = $this->input->post('old_gold_lot_convert_metal_weight1');
		$pure_metal_purity = $this->input->post('old_gold_lot_convert_pure_metal_purity');
		$actual_pure = $this->input->post('old_gold_lot_convert_actual_pure1');
		$converter = $this->input->post('old_gold_lot_converter');
		$data['added_user'] = $_SESSION['username'];
        $data['created_on'] = date('Y-m-d H:i:s');
		$today=date("Y-m-d");


		
		$ext='0';
		
		if(!empty($_FILES['add_party_new_loan']['name'])){
			// print_r(1);
            // $ext = pathinfo($_FILES['party_photo']['name'], PATHINFO_EXTENSION);
            
   // print_r($_FILES['party_photo']['name'][$i]);exit;
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
	
	$res = $this->db->query("INSERT INTO pure_gold_wallet (
			date,
			jewel_type,
			type,
			count,
			weight,
			after_melt_weight,
			less,
			purity,
			metal_weight,
			pure_metal_purity,
			actual_pure,
			converter,
			img,
			CREATED_ON,
			CREATED_BY,
        	status,
			ref_no
		
			) VALUES(
				'".$today."',
				'".$item_type."',
				'Old Gold Lot',
				'".$count."',
				'".$weight."',
				'".$after_melt_weight."',
				'".$less."',
				'".$purity."',
				'".$metal_weight."',
				'".$pure_metal_purity."',
				'".$actual_pure."',
				'".$converter."',
				'".$img."',
				 '".$data['created_on']."',
		'".$data['added_user']."',
		'Y',
		'".$lot_no."'
		)");
		$old_gold_lot_list=$this->db->query("SELECT * FROM  old_gold_lot_detail WHERE lot_no='".$lot_no."' ")->result_array();
		foreach($old_gold_lot_list as $lot_list){
			$date=$lot_list['date'];
			$company=$lot_list['company_id'];
			$generate_no=$lot_list['generate_no'];
			$img=$lot_list['img'];
			$item=$lot_list['item'];
			$subitem=$lot_list['subitem'];
			$weight=$lot_list['weight'];
			$stone=$lot_list['stone'];
			$less=$lot_list['less'];
			$net_weight=$lot_list['net_weight'];


			$res = $this->db->query("INSERT INTO pure_gold_wallet_detail(
				date,
				generate_no,
				item_name,
				subitem_name,
				weight,
				stone,
				less,
				net_weight,
				img,
				ref_no
			
				) VALUES(
					'".$today."',
					'".$generate_no."',
					'".$item."',
					'".$subitem."',
					'".$weight."',
					'".$stone."',
					'".$less."',
					'".$net_weight."',
					'".$img."',
					'".$lot_no."'
					
			)");

			$res=$this->db->query("UPDATE old_gold_lot SET status='C' WHERE ref_no='".$lot_no."'  ");

		
		}
add_notification(date('Y-m-d H:i:s'), '', "Inventory", "Pure Gold  Conversion  ", $lot_no. ' Created By ' .$_SESSION['username'],'', $_SESSION['USERID'], '0', $lot_no);

		redirect('Old_gold/old_gold_lot');
	}

	public function pure_gold_wallet_view()
    {
		$id=$_POST['id'];
		$rows='';
		$pure_gold_wallet=$this->db->query("SELECT * FROM  pure_gold_wallet WHERE ref_no='".$id."' ")->row();
		// $item_type=$this->db->query("SELECT * FROM jewel_type WHERE jewel_type_id='".$old_gold_lot_view->item_type."'  ")->row();

		$pure_gold_wallet_list=$this->db->query("SELECT * FROM  pure_gold_wallet_detail WHERE ref_no='".$id."' ")->result_array();
	$supplier_id=$pure_gold_wallet->converter;
		$supplier= $this->Old_gold_model->get_supplier_name($supplier_id);

$i=1;
$date_format  = $this->db->query("SELECT * FROM general_settings")->row();
$format= $date_format->date_format;
$date= date("$format", strtotime($pure_gold_wallet->date));
$img=$pure_gold_wallet->img;


$image_url =  base_url().'assets/images/pure_gold_wallet_img/'. $img; 
if(@getimagesize($image_url)){
	$img_div='<div class="image-input" data-kt-image-input="true">
	<div class="image-input-wrapper w-80px h-80px" style="background-image: url('.$image_url.')"></div>
</div>';

}
else{
$img_div='';

}
$i=1;
foreach($pure_gold_wallet_list as $plist){
	$list_date=date("$format", strtotime($plist['date']));
	$list_generate_no=$plist['generate_no'];
	// $list_item=$plist['item_name'];
	// $list_subitem=$plist['subitem_name'];
	$list_weight=$plist['weight'];
	$list_stone=$plist['stone'];
	$list_less=$plist['less'];
	$list_net_weight=$plist['net_weight'];
	$item_name  = $this->db->query("SELECT * FROM ITEMS WHERE  SNO='". $plist['item_name']."' ")->row();
	$subitem_name=$plist['subitem_name'];
	//$subitem_name  = $this->db->query("SELECT * FROM SUBITEM_LIST WHERE  SUB_ID='". $plist['subitem_name']."' ")->row();

$rows.='<tr><td>'.$i.'</td><td>'.$list_date.'</td><td>'.$list_generate_no.'</td><td>'.$img_div.'</td><td>'.$item_name->ITEMNAME.'</td><td>'.$subitem_name.'</td><td>'.$list_weight.'</td><td>'.$list_stone.'</td><td>'.$list_less.'</td><td>'.$list_net_weight.'</td></tr>';
 $i++; }
		echo ''.'||'.$date.'||'.$pure_gold_wallet->type.'||'.$pure_gold_wallet->jewel_type.'||'.$pure_gold_wallet->count.'||'.$pure_gold_wallet->weight.'||'.$pure_gold_wallet->after_melt_weight.'||'.$pure_gold_wallet->less.'||'.$pure_gold_wallet->purity.'||'.$pure_gold_wallet->metal_weight.'||'.$pure_gold_wallet->pure_metal_purity.'||'.$pure_gold_wallet->actual_pure.'||'.$supplier->LEDGER_NAME.'||'.$img_div.'||'.$rows;

	}
}
?>