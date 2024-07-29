<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/* ************************************************************************************
		Purpose : To handle all Real_estate functions 2022-04-25
***************************************************************************************/
class Realestatesale extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model(array("Realestate_sale_model","Accountsgroup_model"));

       $fin_year=$this->Accountsgroup_model->get_fin_years_list();
        $db=substr($fin_year->DBNAME,0,strlen($fin_year->DBNAME)-4);
        $db_user=$fin_year->USERNAME?$fin_year->USERNAME:'';
        $db_pass=$fin_year->PASSWORD?$fin_year->PASSWORD:'';
        // echo $db;exit;
        $config_app = switch_db_dynamic($db,$db_user,$db_pass);
        $this->Realestate_sale_model->other_db = $this->load->database($config_app,TRUE);

    	$this->load->library('user_agent');
    	if (isset($this->session->userdata['username']) && $this->session->userdata['username'] == TRUE)
        {
        //do something
        }else{
            redirect('login'); //if session is not there, redirect to login page
        } 
		date_default_timezone_set("Asia/Kolkata");
    	$this->session->set_userdata('comtitle', 'Realestate Sale');
        $this->load->helpers('common_helper');
	}

    public function index()
    {
        $page       = isset($_GET['page']) ? $_GET['page'] : 1;
        $limit      = 50;
        $offset     = ($page - 1) * $limit +1;
        $page_limit =$offset+$limit-1;
       
         $data['party_name'] = $this->input->post('re_party_name');
         if($data['party_name']!=''){
         $party_name =" AND party_name LIKE'%".$data['party_name']."%'";
         }
          else{
         $party_name ='';
        }

        $data['pro_type'] = $this->input->post('pro_type');
       
         if($data['pro_type']!=''){
         $pro_type =" AND property_type LIKE'%".$data['pro_type']."%'";
         }
          else{
         $pro_type ='';
         }


         $data['ploat_type_fill'] = $this->input->post('ploat_type_fill');
       
         if($data['ploat_type_fill']!=''){
         $ploat_type =" AND ploat_type LIKE'%".$data['ploat_type_fill']."%'";
         }
          else{
         $ploat_type ='';
         }

         $data['vaogroupfill'] = $this->input->post('vaogroupfill');
       
         if($data['vaogroupfill']!=''){
         $vaofill =" AND vao_group LIKE'%".$data['vaogroupfill']."%'";
         }
          else{
         $vaofill ='';
         }       

         $data['amenitiesfill'] = $this->input->post('amenitiesfill');
       
         if($data['amenitiesfill']!=''){
         $amenfill ="AND amenities LIKE'%".$data['amenitiesfill']."%'";
         }
          else{
         $amenfill ='';
         }
         
        $data['dt_fill'] = $this->input->post('dt_fill_sale_list');

        $data['from_date_fillter'] = $this->input->post('from_date_fillter_repor_sale_list');
        $data['to_date_fillter'] = $this->input->post('to_date_fillter_repor_sale_list');

        // print_r($data['from_date_fillter']);
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
           
             $data['week_to_date_fillter']=date('Y-m-d', strtotime("saturday 0 week"));
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
}
                        $this->db->reconnect();
     // $data['pro_sale_list'] = $this->Realestate_sale_model->get_sale_list($fdate,$tdate,$party_name,$pro_type,$ploat_type,$offset,$page_limit);

     // $data['pro_sale_list'] = $this->Realestate_sale_model->get_sale_list($fdate);

      $data['pro_sale_list'] = $this->Realestate_sale_model->get_pur_list($fdate,$tdate,$party_name,$pro_type,$ploat_type,$offset,$page_limit,$vaofill,$amenfill);

       $data['vao_group']  = $this->db->query("SELECT * FROM VAO_GROUP WHERE STATUS='Y'  ORDER BY VAO_NAME ASC")->result_array();
      // print_r($data['pro_pur_list']);exit();


     $data['get_pro_type'] = $this->db->query("SELECT * FROM realestate_sale WHERE status='Y'  ")->result_array();

   $data['count'] = count($this->db->query("SELECT * FROM realestate_sale WHERE status='Y' $fdate $tdate $party_name $pro_type $ploat_type $vaofill $amenfill ORDER BY id DESC")->result_array());

   $data['resalealeexport'] = json_encode($this->db->query("SELECT * FROM realestate_sale WHERE status='Y' $fdate $tdate $party_name $pro_type $ploat_type $vaofill $amenfill  ORDER BY id DESC")->result_array());


         
        $this->load->view('realestate_sale/re_property_sale_list',$data);
    }
    
    public function sales_view($prop_sale_id)
    {
        
    
        $data['prop_sale_view'] = $this->Realestate_sale_model->get_sale_view($prop_sale_id);

        // print_r($data['prop_sale_view']);

        $getid = $this->db->query("SELECT * FROM realestate_sale where id=".$prop_sale_id." ")->row();        


        $payment_id = $getid?$getid->sale_id:'';

         

        $party_id = $getid?$getid->party_id:'';
        $data['party_details'] = $this->db->query("SELECT * from PARTIES where PID='".$party_id."'  ")->row();





        $data['payment_detail'] = $this->Realestate_sale_model->get_payment_details($payment_id);

        // print_r($data['payment_detail']);exit();

        $data['cashpay'] = $this->Realestate_sale_model->get_cash($payment_id);

        $data['bankpay'] = $this->Realestate_sale_model->get_cheque($payment_id);

        $data['upipay'] = $this->Realestate_sale_model->get_upi($payment_id);

        $data['Agent_view'] = $this->db->query("SELECT * FROM realestate_agents where property_id='".$payment_id."' ")->result_array();


         $data['sales_view'] = $this->db->query("SELECT * FROM realestate_sale where property_id='".$payment_id."' AND status='Y' ")->result_array();

        $ploat_tot = 0;
        $tot_amount = 0;
        $sale_id_get = 0;
        $party_name = 0;


        $data['sales_payment_view'] = $this->db->query("SELECT * FROM realestate_sale_receipt where property_id='".$payment_id."' ")->result_array();

        $this->load->view('realestate_sale/re_property_sale_view',$data);
    }
public function get_property_details(){

     $pid=$this->input->post('id');



    $row = $this->db->query("SELECT * FROM realestate_purchase WHERE property_id = '".$pid."'   ")->row();

    $sale_row = $this->db->query("SELECT * FROM realestate_sale WHERE property_id = '".$pid."'  ")->result_array();

     $plot_row = $this->db->query("SELECT * FROM realestate_sale WHERE property_id = '".$pid."'  ")->row();

          $ploat_tot =0;
          $tot_amount=0;
         foreach ($sale_row as $svlist) {
        
            $ploat_tot += $svlist['ploat_no'];
            $tot_amount += $svlist['total_property_amount'];
           
        }

    if (isset($row)) {
    
    $ref_name=$row->ref_name;
    $party_name=$row->party_name;
    $property_type =$row->property_type;
    $ploat_areano =$row->ploat_areano;
    $ploat_areatype =$row->ploat_areatype;
    $price_per_ploat=$row->price_per_ploat;

    $street = $row->street ;
    $area = $row->area ;
    $city = $row->city ;
    $state = $row->state ;
    $pincode = $row->pincode ;
    $amenities =  $row->amenities; 
    $lattitude = $row->lattitude ;
    $longtitude = $row->longtitude ;
    $description = $row->description ;
    $pro_amount = $row->pro_amount ;
    $land_lord = $row->land_lord ;
    $land_name = $row->land_name ;

    $acre = $row->acre?$row->acre:0 ;
    $cent = $row->cent?$row->cent:0 ;
    $square = $row->squarefeet?$row->squarefeet:0 ;
    
    if(isset($row->agent_name1)){
    $agent_name1 = $row->agent_name1 ;
    $agent_amt1 = $row->agent_amt1 ;
     }
  
      $vao_group = $row->vao_group;
      $register_office = $row->register_office;
      $property_type = $row->property_type;
      $servey_no = $row->servey_no;
      $partental_dno = $row->partental_dno;
      $document_curno = $row->document_curno;
      $patta_no = $row->patta_no;
      $ploat_no = $row->ploat_no;
      $ploat_type = $row->ploat_type;
      $total_property_amount = $row->total_property_amount;

      $cur_ploat_no = $ploat_tot;
      $cur_ploat_type = $ploat_type;
      $cur_total_property_amount =$tot_amount;

      
   }

    echo ''.'||'.$ref_name.'||'.$party_name.'||'.$property_type.'||'.$ploat_areano.'||'.$ploat_areatype.'||'.$price_per_ploat.'||'.$street.
            '||'.$area.'||'.$city.'||'.$state.'||'.$amenities.'||'.$lattitude.'||'.$longtitude.'||'.$description.'||'.$pro_amount.
            '||'.$agent_name1.'||'.$agent_amt1.'||'.$vao_group.'||'.$register_office.'||'.$property_type.'||'.$servey_no.'||'.$partental_dno.
            '||'.$document_curno.'||'.$patta_no.'||'.$ploat_no.'||'.$ploat_type.'||'.$total_property_amount.'||'.$cur_ploat_no.'||'.$cur_ploat_type.'||'.$cur_total_property_amount.'||'.$pincode.'||'.$land_lord.'||'.$land_name.'||'.$acre.'||'.$cent.'||'.$square;

    


}
public function userList()
      {
        $search =  $_GET['query']; 
        $rows = $this->Realestate_sale_model->getUsers($search);

        $res='[';
        if(count($rows)>0) {



          foreach($rows as $row )
          {


              $title='';
              $name='';
             
              $firstname=$row->NAME;
              $lastname=$row->LASTNAME_PREFIX.','.$row->FATHERSNAME;
              if($row->TYPE_OF_RECORD=='O'){
                $CITY=  ($row->CITY=='')?'--':$row->CITY;
                }
                else
                {
                    $area_det=$this->db->query("select * from CITY where CITYID='".$row->CITY_ID."'")->row();
                    $CITY=  $area_det->CITYNAME;
                }
                if($row->TYPE_OF_RECORD=='O'){
                     $ADDRESS2=($row->ADDRESS2=='')?'--':$row->ADDRESS2;
                }
                else
                {
                    $area_det =$this->db->query("select * from VILLAGE where VILLAGEID='".$row->VILLAGE_ID."'")->row();
                    $ADDRESS2 = $area_det->VILLAGENAME;
                }

                if($row->TYPE_OF_RECORD=='O'){
                     $ADDRESS1 = ($row->ADDRESS1=='')?'--':$row->ADDRESS1;
                }
                else
                {
                    $area_det=$this->db->query("select * from STREET where STREETID='".$row->STREET_ID."'")->row();
                    $ADDRESS1 =  $area_det->STREETNAME;
                }
              $address=$ADDRESS1.', '.$ADDRESS2.', '.$CITY;
              $member_id=$row->MEMBERSHIP_ID;
              $member_points=$row->MEMBERSHIP_POINTS;
              
              
              $rating=$row->RATING;
              $phone=$row->PHONE;

              $title = $firstname.'   --   '.$lastname.'   --   '.$address.'   --   '.$phone;
              
              $res.='{ "title":"'.$title.'","id": "'.$row->PID.'","firstname":"'.$firstname.'","lastname":"'.$lastname.'","rating":"'.$rating.'","address":"'.$address.'","phone":"'.$phone.'"},';

              
             }
              $res=rtrim($res,',');
              $res.=']';
            }
            else{
              $res.=']';
            }
            print_r($res);die();
      }
      public function get_photo()
    {
        $pid = $this->input->post('id');
        $party_det = $this->db->query("SELECT PARTY_IMAGE,PHOTO, TYPE_OF_RECORD FROM PARTIES WHERE PID='".$pid."'")->row();
        if ($party_det) {
            if ($party_det->TYPE_OF_RECORD == 'N') {
                // print_r($party_det->PARTY_IMAGE);
                // exit;
                if(isset($party_det->PARTY_IMAGE) && $party_det->PARTY_IMAGE !== "") {
                    $div = '<img src="'.$party_det->PARTY_IMAGE.'" height="125px" width="125px">';
                } else {
                     $div = '<img src="'.base_url().'assets/images/party.jpg" height="125px" width="125px">';
                }
            } else {
                // print_r('old');
                // exit;
                if(isset($party_det->PHOTO) && $party_det->PHOTO !== "") {
                    $div = '<img src="data:image/jpg;charset=utf8;base64,'.base64_encode($party_det->PHOTO).'" height="125px" width="125px">';
                } else {
                    $div = '<img src="'.base_url().'assets/images/party.jpg" height="125px" width="125px">';
                }
            }
        } else {
            // print_r('no ');
            $div = '<img src="'.base_url().'assets/images/party.jpg" height="125px" width="125px">';
            // exit;
        }

        echo $div;
    }

      public function agent_list()
      {
        $search =  $_GET['query']; 

        // echo $search;

        // print_r($search);exit;


        $rows = $this->Realestate_sale_model->get_agent_list($search);

        // print_r($rows);exit();
      
        $res='[';
        if(count($rows)>0) {



          foreach($rows as $row )
          {


              $title='';
              $name='';
             
              $agent_id=$row['LEDGER_SNO'];
              $firstname=$row['LEDGER_NAME'];
              $lastname=$row['LASTNAME'];
              $address=$row['ADDRESS'].', '.$row['ADDRESS2'].', '.$row['CITY'].', '.$row['STATE'];
              
          // 
              $phone=$row['PHONE'];
              $title = $firstname.'   --   '.$lastname.'   --   '.$address.'   --   '.$phone;

               // $res.='{ "title":"'.$title.'"},';
              
              $res.='{ "title":"'.$title.'","id": "'.$agent_id.'","firstname":"'.$firstname.'","lastname":"'.$lastname.'","address":"'.$address.'","phone":"'.$phone.'"},';


               // $res.='{ "title":"'.$title.'","id": "'.$agent_id.'","firstname":"'.$firstname.'"},';

              
               }
              $res=rtrim($res,',');
              $res.=']';
            }
            else{
              $res.=']';
            }
            print_r($res);die();
      }

      public function realestate_property_sale_edit($sid){

      $data['edit_details'] = $this->db->query("SELECT * FROM realestate_sale where id='".$sid."' AND status='Y'")->row();

      // print_r($data['edit_details']);exit();

      $getid = $this->db->query("SELECT * FROM realestate_sale where id='".$sid."' AND status='Y' ")->row();

        $get_prop_id = $getid->sale_id;

        $party_id = $getid->party_id;

        $purchase_party = $getid->property_id;

        $data['pur_party_details'] = $this->db->query("SELECT * FROM realestate_purchase WHERE property_id='".$purchase_party."' ")->row();

        $data['party_details'] = $this->db->query("SELECT * from PARTIES where PID='".$party_id."'  ")->row();

       $data['cash_detail'] = $this->db->query("SELECT * FROM payment_inward_outward where bill_no='".$get_prop_id."' AND type_of_payment='Cash' ")->row();

          $data['upi_detail'] = $this->db->query("SELECT * FROM payment_inward_outward where bill_no='".$get_prop_id."' AND type_of_payment='UPI' ")->row();

          $data['bank_detail'] = $this->db->query("SELECT * FROM payment_inward_outward where bill_no='".$get_prop_id."' AND type_of_payment='Cheque' ")->row();

          // Print_r($data['cash_detail']); exit();


         // $plot_row = $this->db->query("SELECT * FROM realestate_sale WHERE property_id = '".$sid."'  ")->row();
          $sale_row = $this->db->query("SELECT * FROM realestate_sale WHERE property_id = '".$purchase_party."'  ")->result_array();
          $ploat_tot =0;
          $tot_amount=0;
         foreach ($sale_row as $svlist) {
        
            $ploat_tot += $svlist['ploat_no'];
            $tot_amount += $svlist['total_property_amount'];
           
        }
      $data['cur_ploat_no'] = $ploat_tot;
      $data['cur_ploat_type'] = $data['edit_details']->ploat_type;
      $data['cur_total_property_amount'] =$tot_amount;

        $data['agents_details'] = $this->db->query("SELECT * FROM realestate_agents where property_id='".$get_prop_id."'")->result_array();

        // print_r($data['agents_details']);exit();

       
        
         $this->load->view('realestate_sale/re_edit_property_sale',$data);
        
      }
     public function property_edit_save()
    {   

           
           
        // print_r('expression');exit();
        $data['porp_date']  = $this->input->post('prop_date');                
                $sale_id=$this->input->post('sale_id_hidden');
                $data['property_id'] = $this->input->post('property_id_ac');
                $data['sale_id']= $sale_id;      
                $data['date']= $this->input->post('prop_date');
                $data['price_per_ploat']= $this->input->post('prop_price_spa');
                $data['ploat_no']= $this->input->post('prop_spa_no');
                $data['ploat_type']= $this->input->post('prop_spa_type');
                $data['total_property_amount'] = $this->input->post('total_prop_amt_hidden');
                $data['balance_amount']        = $this->input->post('balance_amount_hidden');

                $data['pro_amount']        = $this->input->post('prop_amt_hidden');
                $data['paid_amount']= $this->input->post('paid_amount');
               
                $data['agent_amt_total']= $this->input->post('agent_tot_amt_hidden');
                $data['document_images']= $this->input->post('');

                $data['modify_by']      = $_SESSION['username'];
                $data['modify_on']      = date('Y-m-d H:i:s');
                $data['ag_name'] = $this->input->post('agent_name_hid');
                $data['agent_amt'] = $this->input->post('agent_amt_hid');

                
              $count = $this->input->post('agent_count_hidden');
              $ag_id = $this->input->post('agents_id_hidden');
              // print_r($data['agent_amt']);exit();
              // print_r($data);
              // print_r($ag_id); exit();


               for($i=0;$i<$count;$i++){
          
               
                   // print_r($ag_name);
                $res = $this->db->query(" UPDATE realestate_agents  SET  
                                     amount = '".$data['agent_amt'][$i]."'
                                     WHERE id = '".$ag_id[$i]."'");
               
               }

         

                  $image_id=str_replace('/','_',$sale_id);
        $data['image_id'] = $image_id;

        if (!is_dir('assets/images/realestate_sale/kyc/'.$image_id)) {
            mkdir('./assets/images/realestate_sale/kyc/' . $image_id, 0777, TRUE);

        }

            if(!empty($_FILES['kyc_mul_img']['name']) && count(array_filter($_FILES['kyc_mul_img']['name'])) > 0){ 
                $filesCount = count($_FILES['kyc_mul_img']['name']); 
                
                for($i = 0; $i < $filesCount; $i++){ 
                        $_FILES['file']['name'] = $_FILES['kyc_mul_img']['name'][$i];
                        $_FILES['file']['type'] = $_FILES['kyc_mul_img']['type'][$i];
                        $_FILES['file']['tmp_name'] = $_FILES['kyc_mul_img']['tmp_name'][$i];
                        $_FILES['file']['error'] = $_FILES['kyc_mul_img']['error'][$i];
                        $_FILES['file']['size'] = $_FILES['kyc_mul_img']['size'][$i];
                              $ext = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
                        $config['upload_path'] = 'assets/images/realestate_sale/kyc/'.$image_id; 
                        $config['allowed_types'] = '*';
                        $config['max_size'] = '5000000000000';
                        $config['file_name'] =$_FILES['kyc_mul_img']['name'][$i] ;
                 
                        $this->load->library('upload',$config); 
                  
                        if($this->upload->do_upload('file')){
                          $uploadData = $this->upload->data();
                          $filename = $uploadData['file_name'];
                 
                          $data['totalFiles'][] = $filename;
                        } 
                        else{
                            Print_r($this->upload->data()); 
                        }
                } 
            }

            if (!is_dir('assets/images/realestate_sale/others/'.$image_id)) {
                mkdir('./assets/images/realestate_sale/others/' . $image_id, 0777, TRUE);
            
            }
            if(!empty($_FILES['reg_doc_mul']['name']) && count(array_filter($_FILES['reg_doc_mul']['name'])) > 0){ 
                $filesCount = count($_FILES['reg_doc_mul']['name']); 
                
                for($i = 0; $i < $filesCount; $i++){ 
                    $_FILES['file']['name'] = $_FILES['reg_doc_mul']['name'][$i];
                        $_FILES['file']['type'] = $_FILES['reg_doc_mul']['type'][$i];
                        $_FILES['file']['tmp_name'] = $_FILES['reg_doc_mul']['tmp_name'][$i];
                        $_FILES['file']['error'] = $_FILES['reg_doc_mul']['error'][$i];
                        $_FILES['file']['size'] = $_FILES['reg_doc_mul']['size'][$i];
                              $ext = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
                        $config['upload_path'] = 'assets/images/realestate_sale/others/'.$image_id ; 
                        $config['allowed_types'] = '*';
                        $config['max_size'] = '5000000000000';
                        $config['file_name'] =$_FILES['reg_doc_mul']['name'][$i];
                 
                        $this->load->library('upload',$config); 
                  
                        if($this->upload->do_upload('file')){
                          $uploadData = $this->upload->data();
                          $filename = $uploadData['file_name'];
                 
                          $data['totalFiles'][] = $filename;
                        } 
                        else{
                            Print_r($this->upload->data()); 
                        }
                } 
            }
            if (!is_dir('assets/images/realestate_sale/registration_document/'.$image_id)) {
                mkdir('./assets/images/realestate_sale/registration_document/' . $image_id, 0777, TRUE);
            
            }
            if(!empty($_FILES['others_mul_img']['name']) && count(array_filter($_FILES['others_mul_img']['name'])) > 0){ 
                $filesCount = count($_FILES['others_mul_img']['name']); 
                
                for($i = 0; $i < $filesCount; $i++){ 
                    $_FILES['file']['name'] = $_FILES['others_mul_img']['name'][$i];
                        $_FILES['file']['type'] = $_FILES['others_mul_img']['type'][$i];
                        $_FILES['file']['tmp_name'] = $_FILES['others_mul_img']['tmp_name'][$i];
                        $_FILES['file']['error'] = $_FILES['others_mul_img']['error'][$i];
                        $_FILES['file']['size'] = $_FILES['others_mul_img']['size'][$i];
                              $ext = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
                        $config['upload_path'] = 'assets/images/realestate_sale/registration_document/'.$image_id; 
                        $config['allowed_types'] = '*';
                        $config['max_size'] = '5000000000000';
                        $config['file_name'] = $_FILES['others_mul_img']['name'][$i];
                 
                        $this->load->library('upload',$config); 
                  
                        if($this->upload->do_upload('file')){
                          $uploadData = $this->upload->data();
                          $filename = $uploadData['file_name'];
                 
                          $data['totalFiles'][] = $filename;
                        } 
                        else{
                            Print_r($this->upload->data()); 
                        }
                } 
            }

          // print_r($data['total_property_amount']);
       
          // print_r($data['price_per_ploat']);
         // print_r($data);exit();
         $data['pay_mode'] =$this->input->post('cash_chk');
         $data['cash_amount'] =$this->input->post('cashamount');
          $data['cash_detail'] =$this->input->post('cashdetail');
           $data['sale_id'] =$sale_id;
        // if($result>0){
            $cash = $this->Realestate_sale_model->up_cashsave($data);
             // }
        // print_r($cash);exit;
          $data['pay_mode'] =$this->input->post('bank_chk');
           $data['cheque_amt'] =$this->input->post('chequeamount');
            $data['cheque_bk'] =$this->input->post('chequebank');
             $data['cheque_refno'] =$this->input->post('chequerefno');
              $data['cheque_detail'] =$this->input->post('chequedetail');
               $data['sale_id'] =$sale_id;
               // if($result>0){
                  $cheque = $this->Realestate_sale_model->up_chequesave($data);
                // }


        

             $data['pay_mode'] =$this->input->post('upi_chk');
             $data['upi_amt'] =$this->input->post('upiamount');
             $data['upi_refno'] =$this->input->post('upirefno');
             // $data['upi_bank'] =$this->input->post('upibank');
             $data['upi_detail'] =$this->input->post('upidetail');
             $data['sale_id'] =$sale_id;
             // print_r($data['upi_amt']);exit;
             // if($result>0){
            $upi = $this->Realestate_sale_model->up_upisave($data);
              // }
        
        

        // print_r($data);exit();
        
        
         $result = $this->Realestate_sale_model->property_update($data);

         if($result)
        {
          $this->session->set_flashdata('g_success', $data['sale_ids'].' &nbsp;New Property Sale have been Updated successfully...');
        }else{
           $this->session->set_flashdata('g_err', 'Could not Update Sale !');
        }
        redirect('Realestatesale/');
         
    }



   public function realestate_property_sale_entry(){

      $data['purchase_id_get'] = $this->db->query("SELECT * FROM realestate_purchase WHERE prop_sts_update !='0' AND status='Y'  ORDER BY id ")->result_array();
      $data['agent_list'] = $this->Realestate_sale_model->get_agent_list_drop_down();

      // $data['agent_list']  = $this->Realestate_sale_model->get_agent_list();

      // print_r($data['agent_list']);exit();


       
        
         $this->load->view('realestate_sale/re_new_property_sale',$data);
        
      }

   public function property_save()
    {   

           
           
        
        $data['porp_date']  = $this->input->post('prop_date');
        

         $last_pid_detail = $this->Realestate_sale_model->last_pid_details();
         // print_r($last_pid_detail);
         if($last_pid_detail){

            $last_data= $last_pid_detail? $last_pid_detail->id :0;



                $year = substr( date("y"), -2);
                $slice = explode("/", $last_data);
                $resultss = preg_replace('/[^0-9]/',' ', $slice[0]); 
                // print_r( $result);

                function request_num ($input, $pad_len = 4  , $prefix = null) {
                    // if ($pad_len <= strlen($input))
                    //     trigger_error('<strong>$pad_len</strong> cannot be less than or equal to the length of <strong>$input</strong> to generate invoice number', E_USER_ERROR);
                
                    if (is_string($prefix))
                        return sprintf("%s%s", $prefix, str_pad($input, $pad_len, "0", STR_PAD_LEFT));
                
                    return str_pad($input, $pad_len, "0", STR_PAD_LEFT);
                }

                $request =  request_num(((int)$resultss+1), 4, "ARES-");
                
                $request_id =  $request.'/'.$year;

              $sale_id = $request_id;
              }
              else{
                $year = substr( date("y"), -2);
                $sale_id=  'ARES-0001/'.$year;
               }
       
        $image_id=str_replace('/','_',$sale_id);
        $data['image_id'] = $image_id;



            if (!is_dir('assets/images/realestate_sale/kyc/'.$image_id)) {
                mkdir('./assets/images/realestate_sale/kyc/' . $image_id, 0777, TRUE);
            }
            if(!empty($_FILES['kyc_mul_img']['name']) && count(array_filter($_FILES['kyc_mul_img']['name'])) > 0){ 
                $filesCount = count($_FILES['kyc_mul_img']['name']); 
                
                for($i = 0; $i < $filesCount; $i++){ 
                    $_FILES['file']['name'] = $_FILES['kyc_mul_img']['name'][$i];
                        $_FILES['file']['type'] = $_FILES['kyc_mul_img']['type'][$i];
                        $_FILES['file']['tmp_name'] = $_FILES['kyc_mul_img']['tmp_name'][$i];
                        $_FILES['file']['error'] = $_FILES['kyc_mul_img']['error'][$i];
                        $_FILES['file']['size'] = $_FILES['kyc_mul_img']['size'][$i];
                              $ext = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
                        $config['upload_path'] = 'assets/images/realestate_sale/kyc/'.$image_id; 
                        $config['allowed_types'] = '*';
                        $config['max_size'] = '5000000000000';
                        $config['file_name'] =$_FILES['kyc_mul_img']['name'][$i] ;
                 
                        $this->load->library('upload',$config); 
                  
                        if($this->upload->do_upload('file')){
                          $uploadData = $this->upload->data();
                          $filename = $uploadData['file_name'];
                 
                          $data['totalFiles'][] = $filename;
                        } 
                        else{
                            // Print_r($this->upload->data()); 
                        }
                } 
            }

            if (!is_dir('assets/images/realestate_sale/registration_document/'.$image_id)) {
                mkdir('./assets/images/realestate_sale/registration_document/' . $image_id, 0777, TRUE);
            
            }
            if(!empty($_FILES['reg_doc_mul']['name']) && count(array_filter($_FILES['reg_doc_mul']['name'])) > 0){ 
                $filesCount = count($_FILES['reg_doc_mul']['name']); 
                
                for($i = 0; $i < $filesCount; $i++){ 
                    $_FILES['file']['name'] = $_FILES['reg_doc_mul']['name'][$i];
                        $_FILES['file']['type'] = $_FILES['reg_doc_mul']['type'][$i];
                        $_FILES['file']['tmp_name'] = $_FILES['reg_doc_mul']['tmp_name'][$i];
                        $_FILES['file']['error'] = $_FILES['reg_doc_mul']['error'][$i];
                        $_FILES['file']['size'] = $_FILES['reg_doc_mul']['size'][$i];
                              $ext = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
                        $config['upload_path'] = 'assets/images/realestate_sale/registration_document/'.$image_id ; 
                        $config['allowed_types'] = '*';
                        $config['max_size'] = '5000000000000';
                        $config['file_name'] =$_FILES['reg_doc_mul']['name'][$i];
                        $this->upload->initialize($config);
                 
                        $this->load->library('upload',$config); 
                  
                        if($this->upload->do_upload('file')){
                          $uploadData = $this->upload->data();
                          $filename = $uploadData['file_name'];
                 
                          $data['totalFiles'][] = $filename;
                        } 
                        else{
                            // Print_r($this->upload->data()); 
                        }
                } 
            }
            if (!is_dir('assets/images/realestate_sale/others/'.$image_id)) {
                mkdir('./assets/images/realestate_sale/others/' . $image_id, 0777, TRUE);
            
            }
            if(!empty($_FILES['others_mul_img']['name']) && count(array_filter($_FILES['others_mul_img']['name'])) > 0){ 
                $filesCount = count($_FILES['others_mul_img']['name']); 
                
                for($i = 0; $i < $filesCount; $i++){ 
                    $_FILES['file']['name'] = $_FILES['others_mul_img']['name'][$i];
                        $_FILES['file']['type'] = $_FILES['others_mul_img']['type'][$i];
                        $_FILES['file']['tmp_name'] = $_FILES['others_mul_img']['tmp_name'][$i];
                        $_FILES['file']['error'] = $_FILES['others_mul_img']['error'][$i];
                        $_FILES['file']['size'] = $_FILES['others_mul_img']['size'][$i];
                              $ext = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
                        $config['upload_path'] = 'assets/images/realestate_sale/others/'.$image_id; 
                        $config['allowed_types'] = '*';
                        $config['max_size'] = '5000000000000';
                        $config['file_name'] = $_FILES['others_mul_img']['name'][$i];
                        $this->upload->initialize($config);
                 
                        $this->load->library('upload',$config); 
                  
                        if($this->upload->do_upload('file')){
                          $uploadData = $this->upload->data();
                          $filename = $uploadData['file_name'];
                 
                          $data['totalFiles'][] = $filename;
                        } 
                        else{
                            // Print_r($this->upload->data()); 
                        }
                } 
            }




                $data['sale_ids']     = $sale_id;
                $data['property_id'] = $this->input->post('property_id_ac');
                $data['sale_id']= $sale_id;      
                $data['date']= $this->input->post('prop_date');
                $data['party_name']= $this->input->post('prop_party');
                $data['land_name']         = $this->input->post('land_name_hidden');
                $data['land_lord']         = $this->input->post('land_lord_hidden');
                $data['pincode']           = $this->input->post('pincode_hidden');
                $data['prop_sts_update']        = $this->input->post('prop_ppa_no');
                $data['ref_name']= $this->input->post('refname_hidden');
                $data['vao_group']= $this->input->post('vao_group_hidden');
                $data['register_office']= $this->input->post('register_office_hidden');
                $data['property_type']= $this->input->post('property_type_hidden');
                $data['servey_no']= $this->input->post('servey_no_hidden');
                $data['partental_dno']= $this->input->post('partental_dno_hidden');
                $data['document_curno']= $this->input->post('document_curno_hidden');
                $data['patta_no']= $this->input->post('patta_no_hidden');
                $data['street']= $this->input->post('street_hidden');
                $data['area']= $this->input->post('area_hidden');
                $data['city']= $this->input->post('city_hidden');
                $data['state']= $this->input->post('state_hidden');
                $data['lattitude']= $this->input->post('Latitude_hidden');
                $data['longtitude']= $this->input->post('Longtitude_hidden');
                $data['ploat_areano']= $this->input->post('ploat_areano_hidden');
                $data['ploat_areatype']= $this->input->post('ploat_areatype_hidden');
                $data['price_per_ploat']= $this->input->post('prop_price_spa');
                $data['ploat_no']= $this->input->post('prop_spa_no');
                $data['ploat_type']= $this->input->post('prop_spa_type');
                $data['agent_amt'] = $this->input->post('agent_amt_hid');
                $data['pro_amount']        = $this->input->post('prop_amt_hidden');
                $data['agent_amt_total']= $this->input->post('agent_tot_amt_hidden');
                $data['total_property_amount'] =  floatval($data['pro_amount'])+floatval($data['agent_amt_total']);
                $data['balance_amount']        = $this->input->post('balance_amount_hidden');               
                $data['paid_amount']= $this->input->post('paid_amount');
                $data['amenities']= $this->input->post('amenitites_hidden');
                $data['description']= $this->input->post('description_hidden');
                $data['agent_count']= $this->input->post('agent_count_hidden');                
                $data['document_images']= $this->input->post('');
                $data['create_by']      = $_SESSION['username'];
                $data['create_on']      = date('Y-m-d H:i:s');
                $data['status']         = 'Y';
                $data['party_id']= $this->input->post('party_id_hidden');
                $data['actual_buying_rate']= $this->input->post('actual_buying_rate');
                $data['by_buying_rate']= $this->input->post('by_buying_rate');
                $data['ag_name'] = $this->input->post('agent_name_hid');

                $data['pay_mode'] =$this->input->post('cash_chk');
                $data['cash_amount'] =$this->input->post('cashamount');
                $data['cash_detail'] =$this->input->post('cashdetail');
                $data['pay_mode'] =$this->input->post('bank_chk');
                $data['cheque_amt'] =$this->input->post('chequeamount');
                $data['cheque_bk'] =$this->input->post('chequebank');
                $data['cheque_refno'] =$this->input->post('chequerefno');
                $data['cheque_detail'] =$this->input->post('chequedetail'); 



                if ($data['ploat_type']=='Acre') {   
                    $acres      = $data['ploat_no']; // input value in acres
                    $squareFeet = acreToSquareFeet($acres);
                    $cents      = acreToCents($acres);
                }
                else if ($data['ploat_type']=='Cent') {   
                    $cents      = $data['ploat_no']; // input value in cents
                    $acres      = centsToAcres($cents);
                    $squareFeet = centsToSquareFeet($cents);
                }
                else if ($data['ploat_type']=='Sq.ft') {   
                    $squareFeet = $data['ploat_no']; // input value in square feet
                    $acres      = squareFeetToAcres($squareFeet);
                    $cents      = squareFeetToCents($squareFeet);
                }else{

                    $squareFeet = 0; // input value in square feet
                    $acres      = 0;
                    $cents      = 0;

                }

                $data['acre'] = $acres;
                $data['cent'] = $cents;
                $data['squarefeet'] = $squareFeet;  



             $data['pay_mode'] =$this->input->post('upi_chk');
             $data['upi_amt'] =$this->input->post('upiamount');
             $data['upi_refno'] =$this->input->post('upirefno');
             $data['upi_detail'] =$this->input->post('upidetail');
             $data['sale_id'] =$sale_id;
             $data['rec_date']  = $this->input->post('prop_date');
        $rec_date=date('Y-m-d',strtotime($data['rec_date']));
         $last_pid_detail = $this->Realestate_sale_model->last_p_r_id_details();

         // print_r($last_pid_detail);
         if($last_pid_detail){

            $last_data= $last_pid_detail? $last_pid_detail->recepit_id :0;



                $year = substr( date("y"), -2);
                $slice = explode("/", $last_data);
                $resultss = preg_replace('/[^0-9]/',' ', $slice[0]); 
                // print_r($result);

                function request_num_receipt ($input, $pad_len = 3  , $prefix = null) {
                    if ($pad_len <= strlen($input))
                        trigger_error('<strong>$pad_len</strong> cannot be less than or equal to the length of <strong>$input</strong> to generate invoice number', E_USER_ERROR);
                
                    if (is_string($prefix))
                        return sprintf("%s%s", $prefix, str_pad($input, $pad_len, "0", STR_PAD_LEFT));
                
                    return str_pad($input, $pad_len, "0", STR_PAD_LEFT);
                }

                $request =  request_num_receipt(((int)$resultss+1), 3, "ARESR-");
                
                $request_id =  $request.'/'.$year;

              $recepit_id = $request_id;
              // print_r($recepit_id);
              }
              else{
                $year = substr( date("y"), -2);
                $recepit_id=  'ARESR-001/'.$year;
               }

                $data['recepit_id'] =  $recepit_id;

                $data['sale_id_rec'] =  $sale_id;
                $data['net_amount'] = $data['total_property_amount'];
                $data['cr_paid'] = $data['paid_amount'];
                $data['cr_bal'] =  $data['balance_amount'];
                $data['net_payable'] =  $data['balance_amount'];
                $data['rcp_pay_mode'] =$this->input->post('cash_chk');
                $data['rcp_cash_amount'] =$this->input->post('cashamount');
                $data['rcp_cash_detail'] =$this->input->post('cashdetail');
                $data['rcp_pay_mode'] =$this->input->post('bank_chk');
                $data['rcp_cheque_amt'] =$this->input->post('chequeamount');
                $data['rcp_cheque_bk'] =$this->input->post('chequebank');
                $data['rcp_cheque_refno'] =$this->input->post('chequerefno');
                $data['rcp_cheque_detail'] =$this->input->post('chequedetail');
                $data['rcp_pay_mode'] =$this->input->post('upi_chk');
                $data['rcp_upi_amt'] =$this->input->post('upiamount');
                $data['rcp_upi_refno'] =$this->input->post('upirefno');
                $data['rcp_upi_detail'] =$this->input->post('upidetail');
        
            
        $result = $this->Realestate_sale_model->property_entry($data);
        // print_r($data);
        // exit();
        // $result = '';


            if ($result) {

                $cash     = $this->Realestate_sale_model->cashsave($data);
                $cheque   = $this->Realestate_sale_model->chequesave($data);
                $upi      = $this->Realestate_sale_model->upisave($data);
                $rccash   = $this->Realestate_sale_model->rec_cashsave($data);
                $rccheque = $this->Realestate_sale_model->rec_chequesave($data);
                $rcupi    = $this->Realestate_sale_model->rec_upisave($data);
              
                for($i=0;$i<10;$i++){
                    $exp = explode('~', $data['ag_name'][$i]);
                    if($data['ag_name'][$i]!='' && $data['agent_amt'][$i]>0){
                        $agent_name         = $exp[0];
                        $agent_id           = $exp[1];
                        $agent_insert       = $this->db->query("INSERT INTO realestate_agents
                           (property_id
                           ,agent_name
                           ,agent_id
                           ,amount
                           ,Refname)
                        VALUES
                           ('".$data['sale_ids']."', 
                            '".$agent_name."',
                            '".$agent_id."',
                            '".$data['agent_amt'][$i]."'
                            ,'Realestate Sale')"); 
                    }
                    // print_r($data['ag_name']);
                    // print_r($agent_id);
                }

            $recpit_save  = $this->db->query("INSERT INTO realestate_sale_receipt
               (recepit_id
               ,property_id
               ,receipt_date
               ,net_amount
               ,cr_paid_amount
               ,cr_balance_amount
               ,net_payable
               ,status
               ,create_by
               ,create_on
               )
              VALUES
                   ('".$data['recepit_id']."'
                   ,'".$data['sale_id_rec']."'
               
                   ,'".$rec_date."'
                   ,'".$data['net_amount']."'
                   ,'".$data['cr_paid']."'
                   ,'".$data['cr_bal']."'
                   ,'".$data['net_payable']."'
                   
                   ,'Y'
                   , '".$_SESSION['username']."' 
                   ,'".date('Y-m-d H:i:s')."')");  



           // $res = $this->db->query("UPDATE realestate_sale SET balance_amount='".$data['cr_bal']."' where sale_id='".$data['sale_id_rec']."'");

             $get_last_plot = $this->db->query("SELECT * FROM realestate_purchase where property_id='".$data['property_id']."' ")->row();
             if (isset($get_last_plot)) {

                 $old_plot = $get_last_plot->prop_sts_update;
                 $old_acre = $get_last_plot->acre;
                 $old_cent = $get_last_plot->cent;
                 $old_square = $get_last_plot->squarefeet;
             }


             $up_plot = $data['ploat_no'];
             $data['acre'] = $acres;
             $data['cent'] = $cents;
             $data['squarefeet'] = $squareFeet;  


             

             $update    = 1;
             $up_acre   = $old_acre   - $data['acre'];
             $up_cent   = $old_cent   - $data['cent'];
             $up_square = $old_square - $data['squarefeet'];

             if ($up_acre<=0 || $up_cent<=0 || $up_square<=0) {

                $update=0;
                 
             }



                

            $purchase_status_up = $this->db->query("UPDATE realestate_purchase SET prop_sts_update='".$update."',acre='".$up_acre."',cent='".$up_cent."',squarefeet='".$up_square."'where property_id='".$data['property_id']."'");

             add_notification(date('Y-m-d H:i:s'), '', "Others", "Realestate<br> New Sale", $data['sale_ids']. ' created By ' .$_SESSION['username'],'', $_SESSION['USERID'], '0', $data['sale_ids']);

             add_notification(date('Y-m-d H:i:s'), '', "Others", "Realestate<br> New Sale Receipt", $data['recepit_id']. ' created By ' .$_SESSION['username'],'', $_SESSION['USERID'], '0', $data['recepit_id']);

        }

        // print_r($data['property_id']);
        // print_r($update.'up');
        // print_r($up_acre.'ac');
        // print_r($up_cent.'cent');
        // print_r($up_square.'squ');
        // print_r($agent_insert);

        // exit();
        if($result)
        {
          $this->session->set_flashdata('g_success', $data['sale_ids'].' &nbsp;New Property Sale have been added successfully...');
        }else{
           $this->session->set_flashdata('g_err', 'Could not add Sale !');
        }
        redirect('Realestatesale/');
         
    }
    public function property_delete()
    {
        $pid = $data['sid']=$_POST['id'];
        $data['proprety_details'] = $this->db->query("SELECT * FROM realestate_sale WHERE id='".$pid."' ")->row();
        // print_r($data['pur_detail']);exit;

        $this->load->view('realestate_sale/realestate_sale_delete',$data);
    }
    public function delete()
    { 
      $sid=$_POST['field'];

    

        $result = $this->Realestate_sale_model->prop_delete($sid);

        $result = $this->Realestate_sale_model->prop_receipt_delete($sid);

        // $res  = $this->db->query("DELETE FROM payment_inward_outward WHERE bill_no= '".$sid."'");

        if ($result) {
            $this->session->set_flashdata('g_success', $sid.' &nbsp; Sale has been Deleted successfully.');
        }
        else{
            $this->session->set_flashdata('g_err', 'Something went wrong');
        }

    }
    
  
}
?>


