<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/* ************************************************************************************
        Purpose : To handle all Real_estate functions 2022-04-25
***************************************************************************************/
class Realestateproperty extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model(array("Realestate_property_model","Accountsgroup_model"));
        // $fin_year=$this->Realestate_property_model->get_fin_years_list();
        // $db=substr($fin_year->DBNAME,0,strlen($fin_year->DBNAME)-4);
        // $config_app = switch_db_dynamic($db);
        // $this->Realestate_property_model->other_db = $this->load->database($config_app,TRUE);

        $fin_year=$this->Accountsgroup_model->get_fin_years_list();
        $db=substr($fin_year->DBNAME,0,strlen($fin_year->DBNAME)-4);
        $db_user=$fin_year->USERNAME?$fin_year->USERNAME:'';
        $db_pass=$fin_year->PASSWORD?$fin_year->PASSWORD:'';
        // echo $db;exit;
        $config_app = switch_db_dynamic($db,$db_user,$db_pass);
        
        $this->Realestate_property_model->other_db = $this->load->database($config_app,TRUE);

        if (isset($this->session->userdata['username']) && $this->session->userdata['username'] == TRUE)
        {
        //do something
        }else{
            redirect('login'); //if session is not there, redirect to login page
        } 
        date_default_timezone_set("Asia/Kolkata");
        $this->session->set_userdata('comtitle', 'Realestate Property');
        $this->load->helpers('common_helper');
    }

    public function index()
    {
        $page       = isset($_GET['page']) ? $_GET['page'] : 1;
        $limit      = 50;
        $offset     = ($page - 1) * $limit +1;
        $page_limit =$offset+$limit-1;
       

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
         
       

      $data['pro_por_list'] = $this->Realestate_property_model->get_por_list($pro_type,$ploat_type,$offset,$page_limit,$vaofill,$amenfill);
      $data['vao_group']  = $this->db->query("SELECT * FROM VAO_GROUP WHERE STATUS='Y'  ORDER BY VAO_NAME ASC")->result_array();


     $data['get_pro_type'] = $this->db->query("SELECT * FROM realestate_purchase WHERE property_status='Existing' AND status='Y' ")->result_array();

      //print_r($data['pro_por_list']);exit();


           $data['count'] = count($this->db->query("SELECT * FROM realestate_purchase WHERE property_status='Existing'AND status='Y'  $pro_type $ploat_type $vaofill $amenfill ORDER BY id DESC")->result_array());

           $data['exportreporperty'] = json_encode($this->db->query("SELECT * FROM realestate_purchase WHERE property_status='Existing'AND status='Y'  $pro_type $ploat_type $vaofill $amenfill ORDER BY id DESC")->result_array());

           
           $this->load->view('realestate_property/re_property_list',$data);
    }
     

    

   public function realestate_property_entry(){      
        $data['vao_group']  = $this->db->query("SELECT * FROM VAO_GROUP WHERE STATUS='Y'  ORDER BY VAO_NAME ASC")->result_array();
        $data['agent_list'] = $this->Realestate_property_model->getagentlistdropdown();
        $this->load->view('realestate_property/re_new_property',$data);
        
    }
    public function userList()
      {
        $search =  $_GET['query']; 
        $rows = $this->Realestate_property_model->getUsers($search);

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
      // Folder Save Image ...
      // public function get_photo()
      // {
      //    $pid=$this->input->post('id');
      //    $party_det=$this->db->query("SELECT PHOTO,PARTY_IMAGE FROM PARTIES WHERE PID='".$pid."'")->row();

      //    // print_r($party_det); exit;

      //    if(isset($party_det))
      //    {        

      //       if($party_det->PARTY_IMAGE != "")
      //       { 
      //           $div='<img src="'.$party_det->PARTY_IMAGE.'" height="125px" width="125px" >';
      //       } 
      //       else {                 
            
      //           if($party_det->PHOTO !="")
      //           {
      //               if($party_det->TYPE_OF_RECORD=='N')
      //               {
      //                 $div='<img src="'.$party_det->PHOTO.'" height="125px" width="125px" >';                   
      //               }
      //               else
      //               {
           
      //                   $div='<img src="data:image/jpg;charset=utf8;base64,'.base64_encode($party_det->PHOTO).'" height="125px" width="125px">';
            
      //               }
      //           }
      //           else
      //           {
      //               $div='<img src="'.base_url().'assets/images/party.jpg" height="125px" width="125px" >';
      //           }
      //       }
      //   }
      //   else
      //   {
      //     $div='<img src="'.base_url().'assets/images/party.jpg" height="125px" width="125px" >';
      //   }
      //    echo $div;
      // }
      public function agent_list()
      {
        $search =  $_GET['query']; 

        // echo $search;

        // print_r($search);exit;


        $rows = $this->Realestate_property_model->get_agent_list($search);

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
              $phone=$row['PHONE'];
              $title = $firstname.'   --   '.$lastname.'   --   '.$address.'   --   '.$phone;
              
              $res.='{ "title":"'.$title.'","id": "'.$agent_id.'","firstname":"'.$firstname.'","lastname":"'.$lastname.'","address":"'.$address.'","phone":"'.$phone.'"},';
              
               }
              $res=rtrim($res,',');
              $res.=']';
            }
            else{
              $res.=']';
            }
            print_r($res);die();
      } 


    public function property_save()
    {   

           
           
        
        $data['porp_date']  = $this->input->post('prop_date');

         $last_pid_detail = $this->Realestate_property_model->last_pid_details();
         if($last_pid_detail){

            $last_data= $last_pid_detail? $last_pid_detail->property_id :0;



                $year = substr( date("y"), -2);
                $slice = explode("/", $last_data);
                $result = preg_replace('/[^0-9]/',' ', $slice[0]); 
               

                function request_num ($input, $pad_len = 4  , $prefix = null) {
                    // if ($pad_len <= strlen($input))
                    //     trigger_error('<strong>$pad_len</strong> cannot be less than or equal to the length of <strong>$input</strong> to generate invoice number', E_USER_ERROR);
                
                    if (is_string($prefix))
                        return sprintf("%s%s", $prefix, str_pad($input, $pad_len, "0", STR_PAD_LEFT));
                
                    return str_pad($input, $pad_len, "0", STR_PAD_LEFT);
                }

                $request =  request_num(((int)$result+1), 4, "AREEP-");
                
                $request_id =  $request.'/'.$year;

              $property_id = $request_id;
              }
              else{
                $year = substr( date("y"), -2);
                $property_id=  'AREEP-0001/'.$year;
        }
       

        $data['property_ids']     = $property_id;
        $image_id=str_replace('/','_',$property_id);
        $data['image_id'] = $image_id;

        if (!is_dir('assets/images/realestate_property/base_document/'.$image_id)) {
            mkdir('./assets/images/realestate_property/base_document/'. $image_id, 0777, TRUE);
        
        }
     
            if(!empty($_FILES['base_mul_img']['name']) && count(array_filter($_FILES['base_mul_img']['name'])) > 0){ 
                $filesCount = count($_FILES['base_mul_img']['name']); 
                
                for($i = 0; $i < $filesCount; $i++){ 
                    $_FILES['file']['name'] = $_FILES['base_mul_img']['name'][$i];
                        $_FILES['file']['type'] = $_FILES['base_mul_img']['type'][$i];
                        $_FILES['file']['tmp_name'] = $_FILES['base_mul_img']['tmp_name'][$i];
                        $_FILES['file']['error'] = $_FILES['base_mul_img']['error'][$i];
                        $_FILES['file']['size'] = $_FILES['base_mul_img']['size'][$i];
                              $ext = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
                        $config['upload_path'] = 'assets/images/realestate_property/base_document/'.$image_id; 
                        $config['allowed_types'] = '*';
                        $config['max_size'] = '5000000000000';
                        $config['file_name'] =$_FILES['base_mul_img']['name'][$i] ;
                 
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

            if (!is_dir('assets/images/realestate_property/layout/'.$image_id)) {
                mkdir('./assets/images/realestate_property/layout/' . $image_id, 0777, TRUE);
            
            }
            if(!empty($_FILES['layout_mul_img']['name']) && count(array_filter($_FILES['layout_mul_img']['name'])) > 0){ 
                $filesCount = count($_FILES['layout_mul_img']['name']); 
                
                for($i = 0; $i < $filesCount; $i++){ 
                    $_FILES['file']['name'] = $_FILES['layout_mul_img']['name'][$i];
                        $_FILES['file']['type'] = $_FILES['layout_mul_img']['type'][$i];
                        $_FILES['file']['tmp_name'] = $_FILES['layout_mul_img']['tmp_name'][$i];
                        $_FILES['file']['error'] = $_FILES['layout_mul_img']['error'][$i];
                        $_FILES['file']['size'] = $_FILES['layout_mul_img']['size'][$i];
                              $ext = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
                        $config['upload_path'] = 'assets/images/realestate_property/layout/'.$image_id ; 
                        $config['allowed_types'] = '*';
                        $config['max_size'] = '5000000000000';
                        $config['file_name'] =$_FILES['layout_mul_img']['name'][$i];
                        $this->upload->initialize($config);
                 
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
            if (!is_dir('assets/images/realestate_property/ec/'.$image_id)) {
                mkdir('./assets/images/realestate_property/ec/' . $image_id, 0777, TRUE);
            
            }
            if(!empty($_FILES['ec_mul_img']['name']) && count(array_filter($_FILES['ec_mul_img']['name'])) > 0){ 
                $filesCount = count($_FILES['ec_mul_img']['name']); 
                
                for($i = 0; $i < $filesCount; $i++){ 
                    $_FILES['file']['name'] = $_FILES['ec_mul_img']['name'][$i];
                        $_FILES['file']['type'] = $_FILES['ec_mul_img']['type'][$i];
                        $_FILES['file']['tmp_name'] = $_FILES['ec_mul_img']['tmp_name'][$i];
                        $_FILES['file']['error'] = $_FILES['ec_mul_img']['error'][$i];
                        $_FILES['file']['size'] = $_FILES['ec_mul_img']['size'][$i];
                              $ext = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
                        $config['upload_path'] = 'assets/images/realestate_property/ec/'.$image_id; 
                        $config['allowed_types'] = '*';
                        $config['max_size'] = '5000000000000';
                        $config['file_name'] = $_FILES['ec_mul_img']['name'][$i];
                        $this->upload->initialize($config);
                 
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
            if (!is_dir('assets/images/realestate_property/property/'.$image_id)) {
                mkdir('./assets/images/realestate_property/property/' . $image_id, 0777, TRUE);
            
            }
            if(!empty($_FILES['property_mul_img']['name']) && count(array_filter($_FILES['property_mul_img']['name'])) > 0){ 
                $filesCount = count($_FILES['property_mul_img']['name']); 
                
                for($i = 0; $i < $filesCount; $i++){ 
                    $_FILES['file']['name'] = $_FILES['property_mul_img']['name'][$i];
                        $_FILES['file']['type'] = $_FILES['property_mul_img']['type'][$i];
                        $_FILES['file']['tmp_name'] = $_FILES['property_mul_img']['tmp_name'][$i];
                        $_FILES['file']['error'] = $_FILES['property_mul_img']['error'][$i];
                        $_FILES['file']['size'] = $_FILES['property_mul_img']['size'][$i];
                              $ext = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
                        $config['upload_path'] = 'assets/images/realestate_property/property/'.$image_id; 
                        $config['allowed_types'] = '*';
                        $config['max_size'] = '5000000000000';
                        $config['file_name'] = $_FILES['property_mul_img']['name'][$i];
                        $this->upload->initialize($config);
                 
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
            if (!is_dir('assets/images/realestate_property/others/'.$image_id)) {
                mkdir('./assets/images/realestate_property/others/'.$image_id, 0777, TRUE);
            
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
                        $config['upload_path'] = 'assets/images/realestate_property/others/'.$image_id; 
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
                            Print_r($this->upload->data()); 
                        }
                } 
            }


        
        $data['party_id']                   = $this->input->post('party_id_hidden');
        $data['party_name']                 = $this->input->post('prop_party');
        $data['ref_name']                   = $this->input->post('prop_ref_name');
        $data['land_name']                  = $this->input->post('land_name');
        $data['land_lord']                  = $this->input->post('land_lord');
        $data['pincode']                    = $this->input->post('pincode');
        $data['vao_group']                  = $this->input->post('prop_vao_type');
        $data['register_office']            = $this->input->post('prop_reg');
        $data['property_type']              = $this->input->post('prop_type_prop');
        $data['servey_no']                  = $this->input->post('prop_servey_no');
        $data['partental_dno']              = $this->input->post('prop_pdoc');
        $data['document_curno']             = $this->input->post('prop_curr_doc_no');
        $data['patta_no']                   = $this->input->post('prop_patta_no');
        $data['street']                     = $this->input->post('prop_street');
        $data['area']                       = $this->input->post('prop_area');
        $data['city']                       = $this->input->post('prop_city');
        $data['state']                      = $this->input->post('prop_state');
        $data['lattitude']                  = $this->input->post('prop_lati');
        $data['longtitude']                 = $this->input->post('prop_longi');
        $data['ploat_areano']               = $this->input->post('prop_parea');
        $data['ploat_areatype']             = $this->input->post('prop_parea_type');
        $data['price_per_ploat']            = $this->input->post('prop_price_ppa');
        $data['ploat_no']                   = $this->input->post('prop_ppa_no');
        $data['prop_sts_update']            = $this->input->post('prop_ppa_no');
        $data['ploat_type']                 = $this->input->post('prop_ppa_type');
        $data['pro_amount']                 = $this->input->post('prop_amt_hidden');
        $data['agent_amt_tot']              = $this->input->post('agent_tot_amt_hidden');
        $data['total_property_amount']      =  floatval($data['pro_amount'])+floatval($data['agent_amt_tot']);
        $data['balance_amount']             = $this->input->post('balance_amount_hidden');
        $data['amenities']                  = $this->input->post('prop_amenities_type');
        $data['description']                = $this->input->post('prop_des');
        $data['document_images']            = '1';
        $data['paid_amount']                = $this->input->post('paid_amount_hidden');
        $data['Prop_sts']                   = '1';
        $data['agent_count']                = $this->input->post('agent_count_hidden');
       
        $data['ag_name']                    = $this->input->post('agent_name_hid');
        $data['agent_amt']                  = $this->input->post('agent_amt_hid');

       // By buying
        $data['by_buying_rate']             = $this->input->post('by_buying_rate');
        $data['stamp_paper_charges']        = $this->input->post('stamp_paper_charges');
        $data['duty_charges']               = $this->input->post('duty_charges');
        $data['vendor_charges']             = $this->input->post('vendor_charges');
        $data['process_fees']               = $this->input->post('process_fees');
        // actual buying
        $data['actual_buying_rate']         = $this->input->post('actual_buying_rate');
        $data['actual_stamp_paper_charges'] = $this->input->post('actual_stamp_paper_charges');
        $data['actual_duty_charges']        = $this->input->post('actual_duty_charges');
        $data['actual_vendor_charges']      = $this->input->post('actual_vendor_charges');
        $data['actual_process_fees']        = $this->input->post('actual_process_fees');
        
        $data['Prop_sts']                   = '1';
        $data['property_status']            = 'Existing';
        $data['create_by']                  = $_SESSION['username'];
        $data['create_on']                  = date('Y-m-d H:i:s');
        $data['status']                     = 'Y';

       // print_r($data);exit();

        $data['pay_mode']           = $this->input->post('cash_chk');
        $data['cash_amount']        = $this->input->post('cashamount');
        $data['cash_detail']        = $this->input->post('cashdetail');
        $data['property_id']        = $property_id;
        
        // print_r($cash);exit;
          $data['pay_mode']         = $this->input->post('bank_chk');
           $data['cheque_amt']      = $this->input->post('chequeamount');
            $data['cheque_bk']      = $this->input->post('chequebank');
             $data['cheque_refno']  = $this->input->post('chequerefno');
              $data['cheque_detail']= $this->input->post('chequedetail');
               $data['property_id'] = $property_id;

             $data['pay_mode']      = $this->input->post('upi_chk');
             $data['upi_amt']       = $this->input->post('upiamount');
             $data['upi_refno']     = $this->input->post('upirefno');
             $data['upi_detail']    = $this->input->post('upidetail');
             $data['property_id']   = $property_id;

            //  echo "<pre>";
            // print_r($data);
            // echo "</pre>";

            // exit();
               
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

        // echo 'sq:<br>';        
        // print_r($squareFeet);
        // echo '<br>cent:<br>';
        // print_r($cents);
        // echo '<br>acre:<br>';

        // print_r($acres);

        // exit();
// 
                


          
        $result = $this->Realestate_property_model->property_entry($data);
        // $result = '';

        if ($result) {
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
                       ('".$data['property_ids']."', 
                        '".$agent_name."',
                        '".$agent_id."',
                        '".$data['agent_amt'][$i]."'
                        ,'Realestate Property')"); 
                }
            }
            $cash   = $this->Realestate_property_model->cashsave($data);
            $cheque = $this->Realestate_property_model->chequesave($data);
            $upi    = $this->Realestate_property_model->upisave($data);
            add_notification(date('Y-m-d H:i:s'), '', "Others", "Realestate<br> New Property", $data['property_id']. ' created By ' .$_SESSION['username'],'', $_SESSION['USERID'], '0', $data['property_id']);
        }

       
        // exit();
        if($result)
        {
            $this->session->set_flashdata('g_success', $data['property_ids'].' &nbsp; New Proprety have been added successfully...');
        }else{
           $this->session->set_flashdata('g_err', 'Could not add Property !');
        }
        redirect('Realestateproperty/');
         
    }
    public function realestate_property_view($prop_id)
    {
        
      
        $data['property_view'] = $this->Realestate_property_model->get_por_view($prop_id);



        
        $getid = $this->db->query("SELECT * FROM realestate_purchase where id=".$prop_id." AND status='Y' ")->row();

        $payment_id = $getid?$getid->property_id:'';

        $party_id = $getid?$getid->party_id:'';
        $data['party_details'] = $this->db->query("SELECT * from PARTIES where PID='".$party_id."'  ")->row();

        $data['payment_detail'] = $this->Realestate_property_model->get_payment_details($payment_id);

        $data['cashpay'] = $this->Realestate_property_model->get_cash($payment_id);

        $data['bankpay'] = $this->Realestate_property_model->get_cheque($payment_id);

        
        $data['upipay'] = $this->Realestate_property_model->get_upi($payment_id);

        $data['Agent_view'] = $this->db->query("SELECT * FROM realestate_agents where property_id='".$payment_id."'  ")->result_array();


        $data['sales_view'] = $this->db->query("SELECT * FROM realestate_sale where property_id='".$payment_id."' ")->result_array();

        $ploat_tot = 0;
        $tot_amount = 0;
     

         foreach ($data['sales_view'] as $svlist) {
        
            $ploat_tot  += floatval($svlist['ploat_no']);
            $tot_amount += floatval($svlist['pro_amount']);
           
        }


       
        $data['ploat_total'] =$ploat_tot?$ploat_tot:0;
        $data['total_amount']=$tot_amount?$tot_amount:0;




        // print_r($data['prop_purchase_view']);
        // exit();

        $this->load->view('realestate_property/re_view_property',$data);
    }
    public function re_property_history($prop_id)
    {
        
      
        $data['property_view'] = $this->Realestate_property_model->get_por_view($prop_id);



        
        $getid = $this->db->query("SELECT * FROM realestate_purchase where id=".$prop_id." AND status='Y' ")->row();

        $payment_id = $getid?$getid->property_id:'';

        $party_id = $getid?$getid->party_id:'';
        $data['party_details'] = $this->db->query("SELECT * from PARTIES where PID='".$party_id."'  ")->row();
        $data['Agent_view'] = $this->db->query("SELECT * FROM realestate_agents where property_id='".$payment_id."' ")->result_array();


        $data['sales_view'] = $this->db->query("SELECT * FROM realestate_sale where property_id='".$payment_id."' AND status='Y' ")->result_array();

        $ploat_tot   = 0;
        $tot_amount  = 0;
        $sale_id_get = 0;
        $party_name  = 0;

         foreach ($data['sales_view'] as $svlist) {
        
            $ploat_tot += floatval($svlist['ploat_no']);
            $tot_amount += floatval($svlist['pro_amount']);
            $sale_id_get = $svlist['sale_id'];
            $party_name  =$svlist['party_name'];
           
        }
        // print_r($ploat_tot);exit();


        $data['sales_payment_view'] = $this->db->query("SELECT * FROM realestate_sale_receipt where property_id='".$sale_id_get."' ")->result_array();
       
        $data['party_name_get']=$party_name;
        $data['ploat_total']=$ploat_tot;
        $data['total_amount']=$tot_amount;

        $data['purchase_view'] = $this->db->query("SELECT * FROM realestate_purchase_receipt where property_id='".$payment_id."' ")->result_array();


        $this->load->view('realestate_property/re_property_history',$data);
    }
     public function image_view()
    {
        $id = $_POST['id'];
         $response='<div class="image-input-wrapper w-250px h-250px" style="background-image: url(<?php echo base_url() ?>assets/images/aks_product_image/<?php echo $id; ?>)"></div>';
        
         echo $response;
    }
     public function realestate_property_edit($edit_id){

        $eid = intval($edit_id);
        $data['edit_details'] = $this->db->query("SELECT * FROM realestate_purchase WHERE id=".$eid." AND property_status='Existing'")->row();

        $get_party_id = $data['edit_details']?$data['edit_details']->party_id:'';
        $get_prop_id  = $data['edit_details']?$data['edit_details']->property_id:'';
        
        $data['party_details'] =$this->db->query("SELECT * FROM PARTIES WHERE PID='".$get_party_id."' ")->row();
      
        $data['vao_group'] = $this->db->query("SELECT * FROM VAO_GROUP ORDER BY VAO_NAME ASC")->result_array();

        $agents_details = $this->db->query("SELECT * FROM realestate_agents where property_id='".$get_prop_id."'")->result_array();


         $data['agents_details']  = [];
        for($i=0;$i<10;$i++){
            if (isset($agents_details[$i])) {
                $data['agents_details'][]=$agents_details[$i];
                }
                else{

                   $data['agents_details'][]=[

                    'agent_name'=> '',
                    'amount'=> '',
                    'id'=>'',
                ]; 
                }
        }

        $data['agent_list'] = $this->Realestate_property_model->getagentlistdropdown();

         $data['payment_details'] = $this->db->query("SELECT * FROM payment_inward_outward WHERE bill_no='".$get_prop_id."'")->result_array();
         // echo json_encode($data['payment_details'][0]);

          $data['cash_detail'] = $this->db->query("SELECT * FROM payment_inward_outward WHERE bill_no='".$get_prop_id."' AND type_of_payment='Cash' ")->row();

          $data['upi_detail'] = $this->db->query("SELECT * FROM payment_inward_outward WHERE bill_no='".$get_prop_id."' AND type_of_payment='UPI' ")->row();

          $data['bank_detail'] = $this->db->query("SELECT * FROM payment_inward_outward WHERE bill_no='".$get_prop_id."' AND type_of_payment='Cheque' ")->row();

         $this->load->view('realestate_property/re_edit_property',$data);
        
}
public function property_edit_save(){

        $data['porp_date']  = $this->input->post('prop_date');
        $data['property_id']        = $this->input->post('prop_id_hidden');


        $property_id=$this->input->post('property_sno_hidden');
        $image_id=str_replace('/','_',$property_id);
        $data['image_id'] = $image_id;

        if (!is_dir('assets/images/realestate_property/base_document/'.$image_id)) {
            mkdir('./assets/images/realestate_property/base_document/'. $image_id, 0777, TRUE);
        
        }
     
            if(!empty($_FILES['base_mul_img']['name']) && count(array_filter($_FILES['base_mul_img']['name'])) > 0){ 
                $filesCount = count($_FILES['base_mul_img']['name']); 
                
                for($i = 0; $i < $filesCount; $i++){ 
                    $_FILES['file']['name'] = $_FILES['base_mul_img']['name'][$i];
                        $_FILES['file']['type'] = $_FILES['base_mul_img']['type'][$i];
                        $_FILES['file']['tmp_name'] = $_FILES['base_mul_img']['tmp_name'][$i];
                        $_FILES['file']['error'] = $_FILES['base_mul_img']['error'][$i];
                        $_FILES['file']['size'] = $_FILES['base_mul_img']['size'][$i];
                              $ext = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
                        $config['upload_path'] = 'assets/images/realestate_property/base_document/'.$image_id; 
                        $config['allowed_types'] = '*';
                        $config['max_size'] = '5000000000000';
                        $config['file_name'] =$_FILES['base_mul_img']['name'][$i] ;
                 
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

            if (!is_dir('assets/images/realestate_property/layout/'.$image_id)) {
                mkdir('./assets/images/realestate_property/layout/' . $image_id, 0777, TRUE);
            
            }
            if(!empty($_FILES['layout_mul_img']['name']) && count(array_filter($_FILES['layout_mul_img']['name'])) > 0){ 
                $filesCount = count($_FILES['layout_mul_img']['name']); 
                
                for($i = 0; $i < $filesCount; $i++){ 
                    $_FILES['file']['name'] = $_FILES['layout_mul_img']['name'][$i];
                        $_FILES['file']['type'] = $_FILES['layout_mul_img']['type'][$i];
                        $_FILES['file']['tmp_name'] = $_FILES['layout_mul_img']['tmp_name'][$i];
                        $_FILES['file']['error'] = $_FILES['layout_mul_img']['error'][$i];
                        $_FILES['file']['size'] = $_FILES['layout_mul_img']['size'][$i];
                              $ext = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
                        $config['upload_path'] = 'assets/images/realestate_property/layout/'.$image_id ; 
                        $config['allowed_types'] = '*';
                        $config['max_size'] = '5000000000000';
                        $config['file_name'] =$_FILES['layout_mul_img']['name'][$i];
                        $this->upload->initialize($config);
                 
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
            if (!is_dir('assets/images/realestate_property/ec/'.$image_id)) {
                mkdir('./assets/images/realestate_property/ec/' . $image_id, 0777, TRUE);
            
            }
            if(!empty($_FILES['ec_mul_img']['name']) && count(array_filter($_FILES['ec_mul_img']['name'])) > 0){ 
                $filesCount = count($_FILES['ec_mul_img']['name']); 
                
                for($i = 0; $i < $filesCount; $i++){ 
                    $_FILES['file']['name'] = $_FILES['ec_mul_img']['name'][$i];
                        $_FILES['file']['type'] = $_FILES['ec_mul_img']['type'][$i];
                        $_FILES['file']['tmp_name'] = $_FILES['ec_mul_img']['tmp_name'][$i];
                        $_FILES['file']['error'] = $_FILES['ec_mul_img']['error'][$i];
                        $_FILES['file']['size'] = $_FILES['ec_mul_img']['size'][$i];
                              $ext = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
                        $config['upload_path'] = 'assets/images/realestate_property/ec/'.$image_id; 
                        $config['allowed_types'] = '*';
                        $config['max_size'] = '5000000000000';
                        $config['file_name'] = $_FILES['ec_mul_img']['name'][$i];
                        $this->upload->initialize($config);
                 
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
            if (!is_dir('assets/images/realestate_property/property/'.$image_id)) {
                mkdir('./assets/images/realestate_property/property/' . $image_id, 0777, TRUE);
            
            }
            if(!empty($_FILES['property_mul_img']['name']) && count(array_filter($_FILES['property_mul_img']['name'])) > 0){ 
                $filesCount = count($_FILES['property_mul_img']['name']); 
                
                for($i = 0; $i < $filesCount; $i++){ 
                    $_FILES['file']['name'] = $_FILES['property_mul_img']['name'][$i];
                        $_FILES['file']['type'] = $_FILES['property_mul_img']['type'][$i];
                        $_FILES['file']['tmp_name'] = $_FILES['property_mul_img']['tmp_name'][$i];
                        $_FILES['file']['error'] = $_FILES['property_mul_img']['error'][$i];
                        $_FILES['file']['size'] = $_FILES['property_mul_img']['size'][$i];
                              $ext = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
                        $config['upload_path'] = 'assets/images/realestate_property/property/'.$image_id; 
                        $config['allowed_types'] = '*';
                        $config['max_size'] = '5000000000000';
                        $config['file_name'] = $_FILES['property_mul_img']['name'][$i];
                        $this->upload->initialize($config);
                 
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
            if (!is_dir('assets/images/realestate_property/others/'.$image_id)) {
                mkdir('./assets/images/realestate_property/others/'.$image_id, 0777, TRUE);
            
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
                        $config['upload_path'] = 'assets/images/realestate_property/others/'.$image_id; 
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
                            Print_r($this->upload->data()); 
                        }
                } 
            }



        // $data['party_name']        = $this->input->post('prop_party');
        $data['property_ids']        = $this->input->post('property_sno_hidden');
        $data['ref_name']        = $this->input->post('prop_ref_name');
        $data['land_name']        = $this->input->post('land_name');
        $data['land_lord']        = $this->input->post('land_lord');
        $data['pincode']        = $this->input->post('pincode');
        $data['vao_group']        = $this->input->post('prop_vao_type');
        $data['register_office']        = $this->input->post('prop_reg');
        $data['property_type']        = $this->input->post('prop_type_prop');
        $data['servey_no']        = $this->input->post('prop_servey_no');
        $data['partental_dno']        = $this->input->post('prop_pdoc');
        $data['document_curno']        = $this->input->post('prop_curr_doc_no');
        $data['patta_no']        = $this->input->post('prop_patta_no');
        $data['street']        = $this->input->post('prop_street');
        $data['area']        = $this->input->post('prop_area');
        $data['city']        = $this->input->post('prop_city');
        $data['state']        = $this->input->post('prop_state');
        $data['lattitude']        = $this->input->post('prop_lati');
        $data['longtitude']        = $this->input->post('prop_longi');
        $data['ploat_areano']        = $this->input->post('prop_parea');
        $data['ploat_areatype']        = $this->input->post('prop_parea_type');
        $data['price_per_ploat']        = $this->input->post('prop_price_ppa');
        $data['ploat_no']        = $this->input->post('prop_ppa_no');
        $data['prop_sts_update']        = $this->input->post('prop_ppa_no');
        $data['ploat_type']        = $this->input->post('prop_ppa_type');
        $data['pro_amount']        = $this->input->post('prop_amt_hidden');
        $data['agent_amt'] = $this->input->post('agent_amt_hid');
        $data['total_property_amount'] = floatval($data['pro_amount'])+floatval($data['agent_amt']);
        $data['balance_amount']        = $this->input->post('balance_amount_hidden');
        $data['amenities']        = $this->input->post('prop_amenities_type');
        $data['description']        = $this->input->post('prop_des');
        $data['document_images']    = '1';
        $data['paid_amount']        = $this->input->post('paid_amount_hidden');
        $data['Prop_sts']           = '1';
        $data['agent_count']        = $this->input->post('agent_count_hidden');
        $data['agent_amt_tot']        = $this->input->post('agent_tot_amt_hidden');
        $data['ag_name'] = $this->input->post('agent_name_hid');

       // By buying
        $data['by_buying_rate']             = $this->input->post('by_buying_rate');
        $data['stamp_paper_charges']        = $this->input->post('stamp_paper_charges');
        $data['duty_charges']               = $this->input->post('duty_charges');
        $data['vendor_charges']             = $this->input->post('vendor_charges');
        $data['process_fees']               = $this->input->post('process_fees');
        // Actual buying
        $data['actual_buying_rate']         = $this->input->post('actual_buying_rate');
        $data['actual_stamp_paper_charges'] = $this->input->post('actual_stamp_paper_charges');
        $data['actual_duty_charges']        = $this->input->post('actual_duty_charges');
        $data['actual_vendor_charges']      = $this->input->post('actual_vendor_charges');
        $data['actual_process_fees']        = $this->input->post('actual_process_fees');
        
        $data['Prop_sts']                   = '1';
        $data['property_status']            = 'Existing';
        $data['modify_by']                  = $_SESSION['username'];
        $data['modify_on']                  = date('Y-m-d H:i:s');
        $data['status']                     = 'Y';
        $property_id= $data['property_id'];            

        $data['pay_mode']      = $this->input->post('cash_chk');
        $data['cash_amount']   = $this->input->post('cashamount');
        $data['cash_detail']   = $this->input->post('cashdetail');
        $data['property_id']   = $property_id;
        $data['pay_mode']      = $this->input->post('bank_chk');
        $data['cheque_amt']    = $this->input->post('chequeamount');
        $data['cheque_bk']     = $this->input->post('chequebank');
        $data['cheque_refno']  = $this->input->post('chequerefno');
        $data['cheque_detail'] = $this->input->post('chequedetail');
        $data['property_id']   = $property_id;
        $data['pay_mode']      = $this->input->post('upi_chk');
        $data['upi_amt']       = $this->input->post('upiamount');
        $data['upi_refno']     = $this->input->post('upirefno');
        $data['upi_detail']    = $this->input->post('upidetail');
        $data['property_id']   = $property_id;
        $count  = $this->input->post('agent_count_hidden');
        $ag_id  = $this->input->post('agents_id_hidden');
        
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

        $result = $this->Realestate_property_model->update_property_entry($data);

        if ($result) {

            $cash   = $this->Realestate_property_model->up_cashsave($data);
            $cheque = $this->Realestate_property_model->up_chequesave($data);
            $upi    = $this->Realestate_property_model->up_upisave($data);
             // add_notification(date('Y-m-d H:i:s'), '', "Others", "Realestate<br> Property Updated", $data['property_id']. ' created By ' .$_SESSION['username'],'', $_SESSION['USERID'], '0', $data['property_id']);
            for ($i = 0; $i < 10; $i++) {

                $response = $this->db->query("SELECT * FROM realestate_agents WHERE id = '".$ag_id[$i]."'")->row();
                // print_r($response);
                if ($response) {
                    $res = $this->db->query("UPDATE realestate_agents SET amount = '".$data['agent_amt'][$i]."' WHERE id = '".$ag_id[$i]."'");

                    // print_r($ag_id[$i]);
                } 

                else {

                    $exp = explode('~', $data['ag_name'][$i]);
                    if (!empty($data['ag_name'][$i]) && $data['agent_amt'][$i] > 0) {
                        $agent_name = $exp[0];
                         // print_r($agent_name);
                        $agent_id = $exp[1];
                        $agent_insert = $this->db->query("INSERT INTO realestate_agents (property_id, agent_name, agent_id, amount, Refname) VALUES ('".$data['property_ids']."', '".$agent_name."', '".$agent_id."', '".$data['agent_amt'][$i]."', 'Realestate Property')");

                            // print_r($agent_id);
                    }
                }
            }
        }

       // print_r($result);
        // exit();
        if($result)
        {
            $this->session->set_flashdata('g_success', $data['property_ids'].' &nbsp; Proprety have been Updated successfully...');
        }else{
           $this->session->set_flashdata('g_err', 'Could not add Property !');
        }
        redirect('Realestateproperty/');
  }


  
    public function property_delete()
    {
        $pid = $data['bid']=$_POST['id'];
        $data['proprety_details'] = $this->db->query("SELECT * FROM realestate_purchase WHERE id='".$pid."' AND status='Y' ")->row();
        // print_r($data['pur_detail']);exit;

        $this->load->view('realestate_property/realestate_property_delete',$data);
    }
    public function delete()
    { 
      $bid=$_POST['field'];

    

        $result = $this->Realestate_property_model->prop_delete($bid);

        // $res  = $this->db->query("DELETE FROM payment_inward_outward WHERE bill_no= '".$bid."'");

        if ($result) {
            $this->session->set_flashdata('g_success', $bid.' &nbsp; Proprety has been Deleted successfully.');
        }
        else{
            $this->session->set_flashdata('g_err', 'Something went wrong');
        }

    }
    
  
}
?>


