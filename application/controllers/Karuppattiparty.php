<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/* ************************************************************************************
		Purpose : To handle all the Karuppattiparty functions By Vasanth 01/02/2024
***************************************************************************************/
class Karuppattiparty extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model(array("Karuppattiparty_model"));
		//if ($this->session->userdata['username'] == TRUE)
		if (isset($this->session->userdata['username']) && $this->session->userdata['username'] == TRUE)
        {
            //do something
        }else{
            redirect('login'); //if session is not there, redirect to login page
        } 
		date_default_timezone_set("Asia/Kolkata");
		$this->session->set_userdata('comtitle', 'Karuppattiparty');
	}

	
	public function index()
	{
		$page       = isset($_GET['page']) ? $_GET['page'] : 1;
        $limit      = 50;
        $offset     = ($page - 1) * $limit +1;
        $page_limit = $offset+$limit-1;

        $data['partyname'] = $this->input->post('partyname');
        if($data['partyname']!=''){
         $partynamefill =" AND p.NAME LIKE'%".$data['partyname']."%'";
         }
        else{
         $partynamefill ='';
        }
        $data['fathername'] = $this->input->post('fathername');
         if($data['fathername']!=''){
         $fathernamefill =" AND p.FATHERSNAME LIKE'%".$data['fathername']."%'";
         }
          else{
         $fathernamefill ='';
        }
        $data['areafill'] = $this->input->post('areafill');
         if($data['areafill']!=''){
         $area =" AND p.AREA LIKE'%".$data['areafill']."%'";
         }
          else{
         $area ='';
        }
         $data['cityfill'] = $this->input->post('cityfill');
         if($data['cityfill']!=''){
         $city =" AND p.CITY LIKE'%".$data['cityfill']."%'";
         }
          else{
         $city ='';
        }
        
        $data['phonefill'] = $this->input->post('phonefill');
         if($data['phonefill']!=''){
            $phonefill = " AND (p.PHONE LIKE '%" . $data['phonefill'] . "%' OR p.PHONE2 LIKE '%" . $data['phonefill'] . "%')";
         }
          else{
         $phonefill ='';
        }

        $data['party_list'] = $this->db->query("SELECT  * FROM ( SELECT P.*, ROW_NUMBER() OVER (ORDER BY P.CREATED_ON DESC) AS sl FROM PARTIES P  WHERE P.PID!='' $partynamefill $fathernamefill $area $city $phonefill AND P.IS_KARUPATTI=1 AND STATUS='Y' )N WHERE sl BETWEEN $offset AND $page_limit  ")->result_array();

         $data['count'] = count($this->db->query("SELECT count(*) as party_count from PARTIES P WHERE P.PID!='' AND P.IS_KARUPATTI=1  $partynamefill $fathernamefill $area $city $phonefill")->result_array());
		$this->load->view('karupattiparty/party_list',$data);
	}


     public function pincodeList()
    {
        $search =  $_GET['query']; 
        $rows = $this->Karuppattiparty_model->getpincode($search);
        $res='[';
        if(count($rows)>0) {
          foreach($rows as $row )
          {
              $title='';
              // $billno='';
              // $street_id=$row->STREETID;
              $PINCODE = $row->PINCODE;
              

              $title = $PINCODE;
              $res.='{ "title":"'.$title.'","pincode": "'.$PINCODE.'"},';
             
              
          }
          $res=rtrim($res,',');
          $res.=']';
        }
        else{
          $res.=']';
        }
        print_r($res);
        // die();
      }

    //  phone number unique check function
    public function phone_no_unquie_check()
    {
        $data['val']  = $_POST['value'];
        $result       = $this->db->query("SELECT * FROM PARTIES WHERE PHONE='".$data['val']."' AND STATUS='Y'  AND IS_KARUPATTI=1")->row();
        // $this->db->select('*')->from('PARTIES')->where("PHONE", $data['val'])->where("STATUS", "Y")->get()->row();
        echo count((array)$result);
    }
    // phone number unique check function Edit 
    public function phone_no_unquie_check_edit()
    {
        $data['val']  = $_POST['value'];
        $data['id']   = $_POST['id'];
        $result       = $this->db->query("SELECT * FROM PARTIES WHERE PHONE='".$data['val']."' AND PID!='".$data['id']."' AND STATUS='Y' ")->row();
        // $this->db->select('*')->from('PARTIES')->where("PHONE", $data['val'])->where("STATUS", 'Y')->where("PID!=", $data['id'])->get()->row();
        
        echo count((array)$result);
    }
    public function towncityList()
    {
        $search =  $_GET['query']; 
        // $len = strlen($search);
        // if($len>0){

            $rows = $this->Karuppattiparty_model->getcitytown($search);
            $res='[';
            if(count($rows)>0) {
              foreach($rows as $row )
              {
                  $title ='';
                  $city  = $row->CITY ? $row->CITY:'';
                  $title = $city;
                  $res.='{ "title":"'.$title.'","citytown": "'.$city.'"},';
                 
                  
              }
              $res=rtrim($res,',');
              $res.=']';
            }
            else{
              $res.=']';
            }
            print_r($res);
            // die();
    }

    //  Karupati Party Add
    // public function add_party()
    // {
    //    $name = $this->input->post('new_party_name');
    //    $lname = $this->input->post('new_party_lname');
    //    $company_name = $this->input->post('company_name');
    //    $country = $this->input->post('country');    
    //    $state = $this->input->post('state');
    //    $bill_address = strval($this->input->post('new_party_bill_address'));
    //     $town_city = $this->input->post('town_city');
    //     $pincode   = $this->input->post('pincode');
    //     $mobile    = $this->input->post('new_party_mobile');
    //     $altmobile = $this->input->post('al_new_party_mobile');
    //     $email     = $this->input->post('new_party_email');
    //     $gst_no    = $this->input->post('new_party_gst_no');
    //     $other     = $this->input->post('shiping_div');
    //     $landmark = $this->input->post('new_party_landmark');  
    //     $create_by      = $_SESSION['username'];
    //     $create_on     = date('Y-m-d H:i:s');


    //         // $bill_address = htmlspecialchars_decode($add, ENT_QUOTES, 'UTF-8');
    //         // $bill_address = htmlspecialchars_decode($add);

    //         // print_r($name); 
    //     // exit();


    //    if ($other==1) {

    //        $name1 = $this->input->post('new_party_name1');
    //        $lname1 = $this->input->post('new_party_lname1');
    //        $company_name1 = $this->input->post('company_name1');
    //        $country1 = $this->input->post('country1');
    //        $state1 = $this->input->post('state1');
    //        // $bill_address1 = $this->input->post('new_party_bill_address1');
    //        $bill_address1 = strval($this->input->post('new_party_bill_address1'));
    //        // $bill_address1 = str_replace("'", '"', $baddress1);
    //        $town_city1 = $this->input->post('town_city1');
    //        $pincode1 = $this->input->post('pincode1');
    //        $mobile1 = $this->input->post('new_party_mobile1');
    //         $altmobile1 = $this->input->post('al_new_party_mobile1');
    //        $email1 = $this->input->post('new_party_email1');  
    //        $landmark1 = $this->input->post('new_party_landmark1');  

    //    }else{
        
    //        $name1 = $this->input->post('new_party_name');
    //        $lname1 = $this->input->post('new_party_lname');
    //        $company_name1 = $this->input->post('company_name');
    //        $country1 = $this->input->post('country');
    //        $state1 = $this->input->post('state');
    //        // $bill_address1 = $this->input->post('new_party_bill_address');
    //         $bill_address1 = strval($this->input->post('new_party_bill_address'));
    //             // $bill_address1 = str_replace("'", '"', $baddress);
    //        $town_city1 = $this->input->post('town_city');
    //        $pincode1 = $this->input->post('pincode');
    //        $mobile1 = $this->input->post('new_party_mobile');
    //         $altmobile1 = $this->input->post('al_new_party_mobile');
    //        $email1 = $this->input->post('new_party_email');  
    //        $landmark1 = $this->input->post('new_party_landmark');  
    //    }


    //    // $userlist=$this->db->query("SELECT * FROM USERLIST WHERE NAME='".$_SESSION['username']."' ")->row();
    //    // $prefix  =$userlist->LOANPREFIX?$userlist->LOANPREFIX:'';
    //    $id_get  = $this->db->query("SELECT * FROM KEYMASTER WHERE KEYNAME='KARUPATTI_PARTY' ")->row();
    //    $suffix  = str_pad($id_get->KEYVALUE+1, 6, '0', STR_PAD_LEFT);
    //    $party_id= 'KP'.$suffix;
       
    //     $escaped_landmark = str_replace("'", "''", $landmark);
    //     $escaped_address = str_replace("'", "''", $bill_address);

    //    $result     = $this->db->query("INSERT INTO  PARTIES(PID,NAME,FATHERSNAME,COMPANY_NAME,PHONE,COUNTRY,STATE,PINCODE,ADDRESS1,CITY,EMAIL,IS_KARUPATTI,GST_NO,PHONE2,LANDMARK,CREATED_ON) VALUES('".$party_id."','".$name."','".$lname."','".$company_name."','".$mobile."','".$country."','".$state."','".$pincode."','".$escaped_address."','".$town_city."','".$email."','1','".$gst_no."','".$altmobile."','".$escaped_landmark."','".$create_on."')");
    //     if ($result) {
    //         $escaped_landmark1 = str_replace("'", "''", $landmark1);
    //         $escaped_address1 = str_replace("'", "''", $bill_address1);
    //          $res1=$this->db->query("INSERT INTO  AKS_SHIPPING_ADDRESS (party_id,name,lname,company_name,mobile,country,state,pincode,address,city,email,altermobile,landmark) VALUES('".$party_id."','".$name1."','".$lname1."','".$company_name1."','".$mobile1."','".$country1."','".$state1."','".$pincode1."','".$escaped_address1."','".$town_city1."','".$email1."','".$altmobile1."','".$escaped_landmark1."')");
    //          $update=$this->db->query("UPDATE KEYMASTER SET KEYVALUE = KEYVALUE+1 WHERE KEYNAME='KARUPATTI_PARTY' ");
    //      }
    //      // print_r($party_id); 
    //     // exit();
    //     // exit();
    //      if($result){
    //             $this->session->set_flashdata('g_success', $name.' Party have been Added successfully...');
    //       }else{
    //            $this->session->set_flashdata('g_err', 'Could not add Party details!');
    //       }

    //     redirect('Karuppattiparty');
    // }

    public function add_party()
    {
        // Retrieve inputs from POST data
        $name = $this->input->post('new_party_name');
        $lname = $this->input->post('new_party_lname');
        $company_name = $this->input->post('company_name');
        $country = $this->input->post('country');    
        $state = $this->input->post('state');
        $bill_address = $this->input->post('new_party_bill_address');
        $town_city = $this->input->post('town_city');
        $pincode = $this->input->post('pincode');
        $mobile = $this->input->post('new_party_mobile');
        $altmobile = $this->input->post('al_new_party_mobile');
        $email = $this->input->post('new_party_email');
        $gst_no = $this->input->post('new_party_gst_no');
        $other = $this->input->post('shiping_div');
        $landmark = $this->input->post('new_party_landmark');  
        $create_by = $_SESSION['username'];
        $create_on = date('Y-m-d H:i:s');

        // Check if other shipping details are provided
        if ($other==1) {

           $name1 = $this->input->post('new_party_name1');
           $lname1 = $this->input->post('new_party_lname1');
           $company_name1 = $this->input->post('company_name1');
           $country1 = $this->input->post('country1');
           $state1 = $this->input->post('state1');
           // $bill_address1 = $this->input->post('new_party_bill_address1');
           $bill_address1 = strval($this->input->post('new_party_bill_address1'));
           // $bill_address1 = str_replace("'", '"', $baddress1);
           $town_city1 = $this->input->post('town_city1');
           $pincode1 = $this->input->post('pincode1');
           $mobile1 = $this->input->post('new_party_mobile1');
            $altmobile1 = $this->input->post('al_new_party_mobile1');
           $email1 = $this->input->post('new_party_email1');  
           $landmark1 = $this->input->post('new_party_landmark1');  

       }else{
        
           $name1 = $this->input->post('new_party_name');
           $lname1 = $this->input->post('new_party_lname');
           $company_name1 = $this->input->post('company_name');
           $country1 = $this->input->post('country');
           $state1 = $this->input->post('state');
           // $bill_address1 = $this->input->post('new_party_bill_address');
            $bill_address1 = strval($this->input->post('new_party_bill_address'));
                // $bill_address1 = str_replace("'", '"', $baddress);
           $town_city1 = $this->input->post('town_city');
           $pincode1 = $this->input->post('pincode');
           $mobile1 = $this->input->post('new_party_mobile');
            $altmobile1 = $this->input->post('al_new_party_mobile');
           $email1 = $this->input->post('new_party_email');  
           $landmark1 = $this->input->post('new_party_landmark');  
       }


        // Generate Party ID
        $id_get = $this->db->query("SELECT * FROM KEYMASTER WHERE KEYNAME='KARUPATTI_PARTY' ")->row();
        $suffix = str_pad($id_get->KEYVALUE + 1, 6, '0', STR_PAD_LEFT);
        $party_id = 'KP' . $suffix;

        // Sanitize inputs
        $escaped_landmark = str_replace("'", "''", $landmark);
        $escaped_address = str_replace("'", "''", $bill_address);

        // Insert party details into PARTIES table
       $result     = $this->db->query("INSERT INTO  PARTIES(PID,NAME,FATHERSNAME,COMPANY_NAME,PHONE,COUNTRY,STATE,PINCODE,ADDRESS1,CITY,EMAIL,IS_KARUPATTI,GST_NO,PHONE2,LANDMARK,CREATED_ON) VALUES('".$party_id."','".$name."','".$lname."','".$company_name."','".$mobile."','".$country."','".$state."','".$pincode."','".$escaped_address."','".$town_city."','".$email."','1','".$gst_no."','".$altmobile."','".$escaped_landmark."','".$create_on."')");

        // Insert shipping address details into AKS_SHIPPING_ADDRESS table
        if ($result) {

            // Insert shipping address details
            $escaped_landmark1 = str_replace("'", "''", $landmark1);
            $escaped_address1 = str_replace("'", "''", $bill_address1);
             $res1=$this->db->query("INSERT INTO  AKS_SHIPPING_ADDRESS (party_id,name,lname,company_name,mobile,country,state,pincode,address,city,email,altermobile,landmark) VALUES('".$party_id."','".$name1."','".$lname1."','".$company_name1."','".$mobile1."','".$country1."','".$state1."','".$pincode1."','".$escaped_address1."','".$town_city1."','".$email1."','".$altmobile1."','".$escaped_landmark1."')");
             $update=$this->db->query("UPDATE KEYMASTER SET KEYVALUE = KEYVALUE+1 WHERE KEYNAME='KARUPATTI_PARTY' ");

            // Update KEYMASTER table
            $key_up = $this->db->query("UPDATE KEYMASTER SET KEYVALUE = KEYVALUE + 1 WHERE KEYNAME='KARUPATTI_PARTY'");
            
            // Set flash message for success
            $this->session->set_flashdata('g_success', $name . ' Party have been Added successfully...');
        } else {
            // Set flash message for failure
            $this->session->set_flashdata('g_err', 'Could not add Party details!');
        }

        // print_r($res1);

        // Redirect to the appropriate page
        redirect('Karuppattiparty');
    }


    public function karpatti_party_edit(){

        $pid = $_POST['id'];

        $data['edit'] = $this->Karuppattiparty_model->get_party_by_party_id($pid);

        if(isset($data['edit'])){
            $party_id = $data['edit']->PID?$data['edit']->PID:'';
        }else{
            $party_id = '';
        }

        $data['shiping'] = $this->Karuppattiparty_model->get_party_by_shiping_id($party_id);



        $this->load->view('karupattiparty/karupattipartyeditmodal',$data);

    }

    public function update_party(){
        

        $edit_id      = $this->input->post('edit_id');
        $name         = $this->input->post('edit_new_party_name');
        $lname        = $this->input->post('edit_new_party_lname');
        $company_name = $this->input->post('edit_company_name');
        $country      = $this->input->post('edit_country');    
        $state        = $this->input->post('edit_state');
        $bill_address = strval($this->input->post('edit_new_party_bill_address'));
        $town_city    = $this->input->post('edit_town_city');
        $pincode      = $this->input->post('edit_pincode');
        $mobile       = $this->input->post('edit_new_party_mobile');
        $altmobile    = $this->input->post('al_edit_new_party_mobile');
        $email        = $this->input->post('edit_new_party_email');
        $gst_no       = $this->input->post('edit_new_party_gst_no');
        $other        = $this->input->post('edit_shiping_div');
        $landmark     = $this->input->post('edit_new_party_landmark');  
        $modify_by    = $_SESSION['username'];
        $modify_on    = date('Y-m-d H:i:s');




        if ($other==1) {

           $name1          = $this->input->post('edit_new_party_name1');
           $lname1         = $this->input->post('edit_new_party_lname1');
           $company_name1  = $this->input->post('edit_company_name1');
           $country1       = $this->input->post('edit_country1');
           $state1         = $this->input->post('edit_state1');
           $bill_address1  = strval($this->input->post('edit_new_party_bill_address1'));
           $town_city1     = $this->input->post('edit_town_city1');
           $pincode1       = $this->input->post('edit_pincode1');
           $mobile1        = $this->input->post('edit_new_party_mobile1');
           $altmobile1     = $this->input->post('al_edit_new_party_mobile1');
           $email1         = $this->input->post('edit_new_party_email1');  
           $landmark1      = $this->input->post('edit_new_party_landmark1');  

        }else{
        
            $name1           = $this->input->post('edit_new_party_name');
            $lname1          = $this->input->post('edit_new_party_lname');
            $company_name1   = $this->input->post('edit_company_name');
            $country1        = $this->input->post('edit_country');
            $state1          = $this->input->post('edit_state');
            $bill_address1   = strval($this->input->post('edit_new_party_bill_address'));
            $town_city1      = $this->input->post('edit_town_city');
            $pincode1        = $this->input->post('edit_pincode');
            $mobile1         = $this->input->post('edit_new_party_mobile');
            $altmobile1      = $this->input->post('al_edit_new_party_mobile');
            $email1          = $this->input->post('edit_new_party_email');  
            $landmark1       = $this->input->post('edit_new_party_landmark');  
        } 


        // print_r($landmark);
        // exit();
        // Escape single quotes in the $landmark variable
        $escaped_landmark = str_replace("'", "''", $landmark);
        $escaped_address = str_replace("'", "''", $bill_address);

        // Construct the SQL query with the escaped landmark
        $sql_query = "UPDATE PARTIES SET 
                        NAME         = '".$name."',
                        FATHERSNAME  = '".$lname."',
                        COMPANY_NAME = '".$company_name."',
                        PHONE        = '".$mobile."',
                        COUNTRY      = '".$country."',
                        STATE        = '".$state."',
                        PINCODE      = '".$pincode."',
                        ADDRESS1     = '".$escaped_address."',
                        CITY         = '".$town_city."',
                        EMAIL        = '".$email."',
                        IS_KARUPATTI = '1',
                        GST_NO       = '".$gst_no."',
                        PHONE2       = '".$altmobile."',
                        LANDMARK     = '".$escaped_landmark."',  -- Use the escaped landmark here
                        MODIFIED_ON  = '".$modify_on."'
                      WHERE PID = '".$edit_id."'";

        // Execute the SQL query
        $result = $this->db->query($sql_query);
        if ($result) {

             $escaped_landmark1 = str_replace("'", "''", $landmark1);
             $escaped_address1 = str_replace("'", "''", $bill_address1);

            $shipping_result   = $this->db->query("UPDATE AKS_SHIPPING_ADDRESS 
                                                    SET 
                                                    name         = '".$name1."',
                                                    lname        = '".$lname1."',
                                                    company_name = '".$company_name1."',
                                                    mobile       = '".$mobile1."',
                                                    country      = '".$country1."',
                                                    state        =  '".$state1."',
                                                    pincode      = '".$pincode1."',
                                                    address      = '".$bill_address1."',
                                                    city         = '".$town_city1."',
                                                    email        = '".$email1."',
                                                    altermobile  = '".$altmobile1."',
                                                    landmark     = '".$landmark1."'
                                                  WHERE party_id = '".$edit_id."'
                                              ");

            }

            // exit();
        if($result){
            $this->session->set_flashdata('g_success', $name.' Party have been Updated successfully...');
          }else{
               $this->session->set_flashdata('g_err', 'Could not Update Party details!');
          }
        redirect('Karuppattiparty');
    }

    // *********************** Vasanth End ***************************************** //
	
    
	public function party_view($pid)
    {
        // $pid = $_POST['id'];
        $data['party_details'] = $this->Karuppattiparty_model->get_party_by_party_id($pid);
        // print_r($data['party_details']);
        $this->load->view('karupattiparty/party_view',$data);
    }
    public function party_delete()
    {
        $uid = $data['bid']=$_POST['id'];
        $data['party_details'] = $this->db->query("SELECT * FROM PARTIES WHERE PID='".$uid."'")->row();
        $this->load->view('party/party_delete',$data);
    }
  
   
    public function delete()
    { 
        $pid=$_POST['field'];
        $loanqry=$this->db->query(" SELECT COUNT(L.PID) AS LOANCOUNT FROM LOANS L  WHERE L.PID='".$pid."'")->row();
        save_query_in_log();
        $chitqry=$this->db->query(" SELECT COUNT(CH.PID) AS CHITCOUNT FROM CHIT_CUSTOMERS CH  WHERE CH.PID='".$pid."'")->row();
        save_query_in_log();
        $creditqry=$this->db->query(" SELECT COUNT(CR.PID) AS CREDITCOUNT FROM CREDIT_CUSTOMERS CR  WHERE CR.PID='".$pid."'")->row();
        save_query_in_log();
        if($loanqry->LOANCOUNT>0)
        {
            $info="Party Have Loans, could not Delete";
        }
        elseif($chitqry->CHITCOUNT>0)
        {
            $info="Party has Chits, could not Delete";
        }
        elseif($creditqry->CREDITCOUNT>0)
        {
            $info="Party has Credits, could not Delete";
        }
        else
        {
        	$result = $this->Karuppattiparty_model->party_delete($pid);
    	}
        if ($result) {
            $this->session->set_flashdata('g_success', 'Party has been Deleted successfully.');
        }
        else{
            $this->session->set_flashdata('g_err', $info);
        }
    }
    
    // ****************************************************Karupati view**********************************

    public function karupatti_party_view($pid)
    {  
      

     $data['aks_list']       = $this->Karuppattiparty_model->party_aksale_list_view($pid);
     $data['party_det']      = $this->db->query("SELECT * FROM PARTIES WHERE PID='".$pid."'")->row(); 
     $data['party_details']  = $this->db->query("SELECT * FROM PARTIES WHERE PID='".$pid."'")->row();
     $data['PID']            = $pid;
     $this->load->view('karupattiparty/karupatti_party_view',$data);
    }
    // ****************************************************Realestae view**********************************

    

    
}
?>