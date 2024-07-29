<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/* ************************************************************************************
		Purpose : To handle all Lotentry functions 2022-08-18
***************************************************************************************/
class Lotentry extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model(array("Lotentry_model","Accountsgroup_model"));
    	$this->load->library('user_agent');
        $fin_year=$this->Accountsgroup_model->get_fin_years_list();
        $db=substr($fin_year->DBNAME,0,strlen($fin_year->DBNAME)-4);
        //echo $db;exit;
        $config_app = switch_db_dynamic($db);
        
        $this->Lotentry_model->other_db = $this->load->database($config_app,TRUE);
    	if (isset($this->session->userdata['username']) && $this->session->userdata['username'] == TRUE)
        {
            //do something
        }else{
            redirect('login'); //if session is not there, redirect to login page
        } 
		date_default_timezone_set("Asia/Kolkata");
    	$this->session->set_userdata('comtitle', 'Bankentry');
	}
	/* ************************************************************************************
						Purpose : To handle Lotentry List function 
	        **********************************************************************/
	public function index()
	{
        $page       = isset($_GET['page']) ? $_GET['page'] : 1;
        $limit      = 10;
        $offset     = ($page - 1) * $limit +1;
        $page_limit=$offset+$limit-1;
		//print_r($page_limit);exit;
        $data['supplier_name'] = $this->input->post('supplier_name');
        if($data['supplier_name']!=''){
        $sname =" AND supplier='".$data['supplier_name']."'";

        }
        else{
            $sname ='';
        }
        $data['company_fill'] = $this->input->post('company_fill');
        if($data['company_fill']!=''){
        $cname =" AND company_id='".$data['company_fill']."'";

        }
        else{
            $cname ='';
        }



$data['dt_fill'] = $this->input->post('dt_fill_pur_list');
$data['dt_fill_no'] = $this->input->post('dt_fill_lot_no');
$data['from_date_fillter'] = $this->input->post('from_date_fillter_nontag_list');
$data['to_date_fillter'] = $this->input->post('to_date_fillter_nontag_list');
$fdate ='';
$tdate ='';
// print_r($data['from_date_fillter']);exit();
if($data['dt_fill_no']==""){
    $dt_fill_no ='';
   

}
else{
    $dt_fill_no=" AND lot_no like '%".$data['dt_fill_no']."%'";
}
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
       // print_r($data['week_to_date_fillter']);exit;
            $fdate =" AND lot_date>='".$data['week_from_date_fillter']."'";
        $tdate =" AND lot_date<='".$data['week_to_date_fillter']."'";

    }else{
     $data['week_from_date_fillter']=date(' Y-m-d', strtotime("sunday -1 week"));
   
     $data['week_to_date_fillter']=date(' Y-m-d', strtotime("saturday 0 week"));
    //  print_r($data['week_to_date_fillter']);exit;
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
                        } 
                    }
                                                            
            $this->db->reconnect();
            // exit();
               // $data['Lotentry_list']  = $this->db->query("SELECT ROW_NUMBER() OVER (ORDER BY lot_no DESC) AS row_number,* FROM lot_entry WHERE status!='N' $sname $fdate $tdate $dt_fill_no order by lot_no desc  row_number BETWEEN {$offset} + 1 AND {$limit} + {$offset}")->result_array();
                $data['Lotentry_list']  = $this->db->query(" SELECT  * FROM 
                ( SELECT *, ROW_NUMBER() OVER (ORDER BY lot_id DESC) AS sl FROM lot_entry WHERE  status!='N' $cname  $sname $fdate $tdate $dt_fill_no)L 
                 WHERE   sl BETWEEN $offset AND $page_limit ")->result_array();
                $data['Lotentry_list1']  = $this->db->query("SELECT SUM(pure_metal_weight) as weight,SUM(amount_to_pay) as amount,COUNT(lot_id) as count FROM lot_entry WHERE status!='N' $sname $cname $fdate $tdate $dt_fill_no ")->row();
                $data['count'] = count( $this->db->query("SELECT * FROM lot_entry WHERE status!='N' $sname $fdate $tdate $cname $dt_fill_no order by lot_no desc ")->result_array());
                save_query_in_log();
                    $this->db->close();
		$data['suppliers_list']   = $this->Lotentry_model->get_supplier_name_list();
		$data['bankers_list'] = $this->Lotentry_model->get_banks_list();
		$data['item_list'] = $this->Lotentry_model->get_item_list();
        $data['company_list']  = $this->db->query("SELECT * FROM COMPANY WHERE ACTIVE='Y'  ")->result_array();
	
        $this->load->view('lotentry/lotentry_list',$data);
	}
	public function lotentry_add()
	{

		$data['suppliers_list']   = $this->Lotentry_model->get_supplier_name_list();
		$data['bankers_list']     = $this->Lotentry_model->get_banks_list();
		$data['item_list']        = $this->Lotentry_model->get_item_list();
		$data['subitem_list']     = $this->Lotentry_model->get_sub_item_list();
		$data['current_rate']     = $this->db->query("SELECT * FROM SETUP  ")->row();
        $data['metal_type_list']  = $this->db->query("SELECT * FROM jewel_type  ")->result_array();
        $data['purity_list']      = $this->db->query("SELECT * FROM ITEMPURITY WHERE status='0' ")->result_array();  
        $data['company_list']     = $this->db->query("SELECT * FROM COMPANY WHERE ACTIVE='Y'  ")->result_array();
		//  print_r($data['current_rate']);exit;
		$this->load->view('lotentry/lotentry_add',$data);
	}
	public function lotentry_save()
	{

		$data['item_name'] = array_filter($this->input->post('item_gold'));
       // $data['subitem_name'] = array_filter($this->input->post('subitem_gold'));
       // $data['purity_table'] = array_filter($this->input->post('gold_purity'));
        $data['count_table'] = array_filter($this->input->post('gold_count'));
        $data['weight_table'] = array_filter($this->input->post('gold_weight'));
        $data['gold_purity'] = array_filter($this->input->post('gold_purity'));
        $data['quality'] = array_filter($this->input->post('quality'));
        $data['pure_metal_weight'] = array_filter($this->input->post('pure_metal_weight'));
        $data['pure_metal_rate'] = array_filter($this->input->post('pure_metal_rate'));
        $data['metal_table'] = $this->input->post('metal_new_purchase');
        $data['entry_date'] = $this->input->post('date');
        $data['status'] = 'Y';
        $data['added_user'] = $_SESSION['username'];
        $data['created_on'] = date('Y-m-d H:i:s');
    //   print_r($data['item_name']);exit;
        $date = $this->input->post('date');
        // print_r($date);
		$data['date'] = date("Y-m-d",strtotime($date));

        // print_r($data['date']); exit();

        $data['company_id'] = $this->input->post('company_id');
        $data['supplier_name'] = $this->input->post('supplier_list_newpurchase');
        $data['metal_type'] = $this->input->post('metal_new_purchase');
        $data['all_item_name'] = array_filter($this->input->post('item_gold'));
       
      //  $data['purity_lot'] = array_filter($this->input->post('gold_purity'));
        $data['all_count'] = array_sum($this->input->post('gold_count'));
        $data['all_weight'] = array_sum($this->input->post('gold_weight'));
        $data['pure_metal_weight1'] = array_sum($this->input->post('pure_metal_weight'));
        $data['pure_metal_rate1'] = array_sum($this->input->post('pure_metal_rate'));
        
        $data['img'] = $this->input->post('add_party_redemp');
        $data['t_amount'] = $this->input->post('t_amount');
        $data['other_charges'] = $this->input->post('other_charges');
        $data['amount_pay']    = $this->input->post('amount_pay');
        $data['paid_amount_pay'] = $this->input->post('paid_amount_pay')?$this->input->post('paid_amount_pay'):0;
        $data['bal_amount']    = $this->input->post('bal_amount')?$this->input->post('bal_amount'):0; 
        $data['cash_pay'] = $this->input->post('cash_pay');
        $data['cheq_pay'] = $this->input->post('cheq_pay');
        $data['bank_cheq'] = $this->input->post('bank_cheq');
        $data['cheq_no'] = $this->input->post('cheq_no');
        $data['rtgs_pay'] = $this->input->post('rtgs_pay')?$this->input->post('rtgs_pay'):0;
        $data['bank_rtgs'] = $this->input->post('bank_rtgs');
        $data['rtgs_trans'] = $this->input->post('rtgs_trans');
        $data['purity_pay'] = $this->input->post('purity_pay');
        $data['metal_weight'] = $this->input->post('metal_weight');
        $data['metal'] = $this->input->post('metal');
        $data['metal_pay'] = $this->input->post('metal_pay');
        $data['purity_pay'] = $this->input->post('purity_pay');
        $data['pur_met'] = $this->input->post('pur_met');
        $data['cash_detail'] = $this->input->post('cash_detail');
        $data['cheque_detail'] = $this->input->post('cheque_detail');
        $data['rtgs_detail'] = $this->input->post('rtgs_detail');
        $data['rtgs_detail'] = $this->input->post('rtgs_detail');
        $data['rate_pay'] = $this->input->post('rate_pay');
        $data['met_wgt'] = $this->input->post('met_wgt');

        $data['img'] = $this->input->post('inventory_jewel_image_data');
       
		$last_sno_detail = $this->Lotentry_model->get_last_sno_details();
        
        $last_data= $last_sno_detail ?$last_sno_detail->lot_id :0;

        $y = date("y");

        //echo $last_data;exit;
        //$exlno = substr($last_data,5);
        $next_value = (int)$last_data + 1;
        //$uid=str_pad($next_value,3,0,STR_PAD_LEFT);
        //$s_no=$r_no1;
        $data['lot_id'] = $next_value;
        
        $lot_no=str_pad($next_value,4,0,STR_PAD_LEFT);
        
        $prefix="LOT-";
        $suffix="/".$y;
        $data['lot_no']=$prefix.$lot_no.$suffix;
      // print_r($lot_no1);exit;

        $ext='png';
//       if(!empty($_FILES['add_party_redemp']['name']))
//       {
//           $ext = pathinfo($_FILES['add_party_redemp']['name'], PATHINFO_EXTENSION);
//           $config['upload_path'] = 'lot_img';
//           $config['allowed_types'] = 'jpg|jpeg|png|doc|docx|pdf';
//           $config['file_name'] =   $lot_no;
//           $profileName = $config['file_name'].'.'.$ext;
//           $this->load->library('upload',$config);
//           $this->upload->initialize($config);
//           if($this->upload->do_upload('add_party_redemp'))
//           {
//             $uploadData = $this->upload->data();
//             $data['add_party_redemp'] = $profileName;
//           }
//           else
//           {
//             $data['add_party_redemp'] = 'defaultprofile.jpg';
//           }
//       }
//       else
//       {
//           $data['add_party_redemp'] = 'defaultprofile.jpg';
//       }
      $data['lot_no1']=$lot_no."_".$y.".".$ext;
    
      
        $res = $this->Lotentry_model->add_lotentry_master($data);
             
        if($data['img']!=''){
                $uploadpath   = 'lot_img/';
                $parts        = explode(";base64,", $data['img']);
                $imageparts   = explode("image/", @$parts[0]);
                $imagetype    = $imageparts[1];
                $imagebase64  = base64_decode($parts[1]);
                $file         = $uploadpath . $lot_no .'_'.$y. '.png';
                file_put_contents($file, $imagebase64);
        }
        // if( $next_value>0){
            $mcount = count($data['pure_metal_rate']);
            for($i=0;$i<intval($mcount);$i++){
            //  print_r($data['item_name'][$i]);
            //  print_r($data['count_table'][$i]);
                // if((isset($data['item_name'][$i]))&&(isset($data['count_table'][$i]))){
                  //  print_r($data['item_name'][$i]);exit;
                
                    $this->db->reconnect();
                    $res = $this->db->query("INSERT INTO lot_entry_detail (
                        lot_id,
                        item_name,
                        purity,
                        count,
                        weight,
                        tagged,
                        non_tagged,
                        tagged_weight,
                        non_tagged_weight,
                        quality,
                        metal_weight,
                        metal_amount
                        ) VALUES(
                            '".$data['lot_id']."',
                            '".$data['item_name'][$i]."',
                            '".$data['gold_purity'][$i]."',
                            '".$data['count_table'][$i]."',
                            '".$data['weight_table'][$i]."',
                            '0',
                            '".$data['count_table'][$i]."',
                            '0',
                            '".$data['weight_table'][$i]."',
                            '".$data['quality'][$i]."',
                            '".$data['pure_metal_weight'][$i]."',
                            '".$data['pure_metal_rate'][$i]."'
                        )");

                    $desc='';
                    save_query_in_log();
                    add_notification(date('Y-m-d H:i:s'), $data['company_id'], "Inventory", "New Lot", $data['lot_no']. ' Create By ' .$_SESSION['username']. ' is Awaiting Approval ','', $_SESSION['USERID'], '0', $data['lot_no']);
                      $this->db->close(); 

                // }

            }
            
            

        // }
        $pure_gold=$this->db->query("INSERT INTO pure_gold_wallet (jewel_type,date,type,count,weight,actual_pure) VALUES ('".$data['metal']."','".date('Y-m-d',strtotime($data['date']))."','Lot Purchase','-','".$data['rate_pay']."','".$data['met_wgt']."') ");

        if($res)
        {
            $this->session->set_flashdata('g_success', $data['lot_no'].' Lot entry have been added successfully...');
        }else{
           $this->session->set_flashdata('g_err', 'Could not add Lot details!');
        }

        redirect('Lotentry');

	}

    public function lotentry_pop_up()
	{
        $id='LOT-0001/23';
        $this->session->set_flashdata('g_err', $id.' Lot entry have been added successfully...');

        redirect('Lotentry');

    }

	public function lotentry_edit($lot_id)
	{
		$data['suppliers_list'] = $this->Lotentry_model->get_supplier_name_list();
		$data['bankers_list'] = $this->Lotentry_model->get_banks_list();
		$data['item_list'] = $this->Lotentry_model->get_item_list();
		$data['subitem_list'] = $this->Lotentry_model->get_sub_item_list();
        $data['lotentry']  = $this->db->query("SELECT * FROM lot_entry WHERE lot_id='".$lot_id."' ")->row();
        $data['lotentry_details']  = $this->db->query("SELECT * FROM lot_entry_detail WHERE lot_id='".$lot_id."' ")->result_array();
	
		//print_r("1");exit;
		$this->load->view('lotentry/lotentry_edit',$data);

	}
	public function lotentry_view($lot_id)
	{
	

        $this->db->reconnect();
        $data['suppliers_list'] = $this->Lotentry_model->get_supplier_name_list();
		$data['bankers_list'] = $this->Lotentry_model->get_banks_list();
        $data['lotentry']  = $this->db->query("SELECT * FROM lot_entry WHERE lot_id='".$lot_id."' ")->row();
        $data['lotentry_details']  = $this->db->query("SELECT * FROM lot_entry_detail WHERE lot_id='".$lot_id."' ")->result_array();
       
        //print_r($data['lotentry_details']);exit;
        save_query_in_log();
        $this->db->close();
		$this->load->view('lotentry/lotentry_view',$data);
	}

    public function get_item()
    {
        $type = $_POST['typeid'];
        // $area_city = $this->Party_model->get_city_by_area_id($aid);
        $typelist=$this->db->query("SELECT * FROM ITEMS WHERE  jewel_type_id='".$type."'  ")->result_array();
        $option = '<option value="">Select Item</option>';
        foreach($typelist as $tlist)
        {
            $option.='<option value="'.$tlist['SNO'].'">'.$tlist['ITEMNAME'].'</option>';
        }
        echo $option;
      
    }
    public function get_purity()
    {
        $type = $_POST['typeid'];
        
        $typelist=$this->db->query("SELECT * FROM ITEMPURITY WHERE  ITEMPURITYID='".$type."'  ")->row();
    
        $value=$typelist->PERCENTAGE;
        echo $value;
        
    }
    public function image_view()
	{
        $id = $_POST['id'];
         $response='<div class="image-input-wrapper w-250px h-250px" style="background-image: url(<?php echo base_url() ?>lot_img/<?php echo $id; ?>)"></div>';
        // $data['Lotentry_list_view']  = $this->db->query("SELECT * FROM lot_entry WHERE lot_id='".$data['lid'] ."' ")->row();
        // $data['lotentry_details']  = $this->db->query("SELECT * FROM lot_entry_detail WHERE lot_id='".$data['lid']."' ")->result_array();
       // $this->load->view('Lotentry/lotentry_list_image',$data);
   echo $response;
    }
    public function lotentry_approve()
    {

     $id=$_POST['id'];      
     $Lotentry  = $this->db->query("SELECT * FROM lot_entry WHERE lot_id='".$id ."' ")->row();

     $id= $Lotentry->lot_id;   
     $no= $Lotentry->lot_no;   
     echo ''.'||'.$id.'||'.$no;
     //$this->load->view('lotentry/lotentry_approve',$data);
    }

    public function lotentry_update_required()
    {

       $id=$_POST['id'];
       
       $Lotentry  = $this->db->query("SELECT * FROM lot_entry WHERE lot_id='".$id ."' ")->row();
       $id= $Lotentry->lot_id;   
       $no= $Lotentry->lot_no;   
     echo ''.'||'.$id.'||'.$no;
     // $data['tagentry_list'] = $this->db->query("SELECT * FROM tag_entry where tag_no='". $data['aid']."'  ")->row();
        // $this->load->view('lotentry/lotentry_update_required',$data);
    }
    public function lotentry_update_required_view()
    {

       $id=$_POST['id'];
       $Lotentry_list_view  = $this->db->query("SELECT * FROM lot_entry WHERE lot_id='".$id ."' ")->row();
        // $this->load->view('lotentry/lotentry_update_required_view',$data);
        echo $Lotentry_list_view->update_description;
    }

    public function approve()
    {
       

        $bid=$_POST['field'];
        $no=$_POST['no'];
        // print_r($bid); exit;
        $data['Lotentry']       = $this->db->query("SELECT * FROM lot_entry WHERE lot_id=".$bid)->row();
        $data['Lotentry_list']  = $this->db->query("SELECT * FROM lot_entry_detail WHERE lot_id='".$data['Lotentry']->lot_id ."' ")->result_array();

        foreach($data['Lotentry_list'] as $list)
            $res1 = $this->db->query("INSERT INTO nontag_history (
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
                    ) 
                    VALUES(
                    '".$data['Lotentry']->lot_id."',
                    '".$list['item_name']."',
                    '".$list['purity']."',
                    '".$list['count']."',
                    '".$list['weight']."',
                    '0',
                    '".$list['weight']."',
                    '".$data['Lotentry']->lot_date."',
                    '".$data['Lotentry']->company_id."',
                    'Lot',
                    'IN'
                    )");
            if($list['count']!='' && $list['weight']!='' ){
            $update= $this->db->query("UPDATE ITEMS SET COUNT=COUNT+".$list['count'] ." ,WEIGHT=WEIGHT+".$list['weight'] ."  WHERE SNO= '".$list['item_name']."'");
        }

        $res= $this->db->query("UPDATE lot_entry set status='A' where lot_id='".$data['Lotentry']->lot_id."'  ");
        $lot_id  = $this->db->query("SELECT * FROM lot_entry WHERE lot_id='".$data['Lotentry']->lot_id ."' ")->row();
        add_notification(date('Y-m-d H:i:s'), $lot_id->company_id, "Inventory", "Approve Lot", $lot_id->lot_no. ' Approve By ' .$_SESSION['username']. ' is Update Required ','', $_SESSION['USERID'], '0', $lot_id->lot_no);
        if($res)
        {
            $this->session->set_flashdata('g_success', $no.' Lot  have been Approve successfully...');
        }else{
           $this->session->set_flashdata('g_err', 'Could not Approve Lot !');
        }
        // redirect('Lotentry');
    }
    public function update_required()
    {
       
        $bid=$_POST['field'];
        $no=$_POST['no'];
        $update_description=$_POST['update_description'];
        // print_r($bid);
        $res= $this->db->query("UPDATE lot_entry set status='U',update_description='". $update_description."' where lot_id=". $bid);
        $lot_id  = $this->db->query("SELECT * FROM lot_entry WHERE lot_id='".trim($bid) ."' ")->row();
        add_notification(date('Y-m-d H:i:s'), $lot_id->company_id, "Inventory", "Update Required Lot", $lot_id->lot_no. ' Update By ' .$_SESSION['username'],'', $_SESSION['USERID'], '0', $lot_id->lot_no);
        if($res)
        {
            $this->session->set_flashdata('g_success', $no.' Lot  have been Update Send successfully...');
        }else{
           $this->session->set_flashdata('g_err', 'Could not add Lot Update!');
        }
        // redirect('Lotentry');
    }
}
?>