<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/* ************************************************************************************
		Purpose : To handle all the village functions
***************************************************************************************/
class Party extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model(array("Party_model"));
		//if ($this->session->userdata['username'] == TRUE)
		if (isset($this->session->userdata['username']) && $this->session->userdata['username'] == TRUE)
        {
            //do something
        }else{
            redirect('login'); //if session is not there, redirect to login page
        } 
		date_default_timezone_set("Asia/Kolkata");
		$this->session->set_userdata('comtitle', 'Party');
	}

	
	public function index()
	{
		$page       = isset($_GET['page']) ? $_GET['page'] : 1;
        $limit      = 50;
        $offset     = ($page - 1) * $limit +1;
        $page_limit = $offset+$limit-1;

        $data['partyname'] = $this->input->post('partyname');
        if($data['partyname']!=''){
         $partynamefill =" AND P.NAME LIKE'%".$data['partyname']."%'";
         }
        else{
         $partynamefill ='';
        }
        $data['fathername'] = $this->input->post('fathername');
         if($data['fathername']!=''){
         $fathernamefill =" AND P.FATHERSNAME LIKE'%".$data['fathername']."%'";
         }
          else{
         $fathernamefill ='';
        }
        $data['areafill'] = $this->input->post('areafill');
         if($data['areafill']!=''){
         $area =" AND P.AREA LIKE'%".$data['areafill']."%'";
         }
          else{
         $area ='';
        }
         $data['cityfill'] = $this->input->post('cityfill');
         if($data['cityfill']!=''){
         $city =" AND P.CITY LIKE'%".$data['cityfill']."%'";
         }
          else{
         $city ='';
        }
        
        $data['phonefill'] = $this->input->post('phonefill');
         if($data['phonefill']!=''){
            $phonefill = " AND (P.PHONE LIKE '%" . $data['phonefill'] . "%' OR P.PHONE2 LIKE '%" . $data['phonefill'] . "%')";
         }
          else{
         $phonefill ='';
        }

        $data['party_list'] = $this->db->query(" SELECT  * FROM ( SELECT P.*, ROW_NUMBER() OVER (ORDER BY P.CREATED_ON DESC) AS sl FROM PARTIES P  WHERE P.PID!='' $partynamefill $fathernamefill $area $city $phonefill )N WHERE sl BETWEEN $offset AND $page_limit  ")->result_array();


        $data['count'] = count($this->db->query("SELECT count(*) as party_count from PARTIES P WHERE P.PID!='' $partynamefill $fathernamefill $area $city $phonefill")->result_array());
        
		$this->load->view('party/party_list',$data);
	}

	public function get_area()
    {
        $zid = $_POST['zoneid'];
        $zone_area = $this->Party_model->get_area_by_zone_id($zid);
        $option = '<option value="">Select Area</option>';
        foreach($zone_area as $arealist)
        {
           
            $option.='<option value="'.$arealist['SNO'].'">'.$arealist['AREANAME'].'</option>';
        }
        echo $option;
    }
    public function get_city()
    {
        $aid = $_POST['areaid'];
        $area_city = $this->Party_model->get_city_by_area_id($aid);

        $option = '<option value="">Select City</option>';
        foreach($area_city as $citylist)
        {
            $option.='<option value="'.$citylist['CITYID'].'">'.$citylist['CITYNAME'].'</option>';
        }
        echo $option;
        // exit();
        //return $option;
    }
    public function get_village()
    {
        $cid = $_POST['cityid'];
        $city_village = $this->Party_model->get_village_by_city_id($cid);

        $option = '<option value="">Select village</option>';
        foreach($city_village as $villagelist)
        {
            $option.='<option value="'.$villagelist['VILLAGEID'].'">'.$villagelist['VILLAGENAME'].'</option>';
        }
        echo $option;
        //return $option;
    }
     public function get_street()
    {
        $cid = $_POST['villageid'];
        $village_street = $this->Party_model->get_street_by_village_id($cid);

        // $option = '<option value="">Select Street</option>';
        // foreach($village_street as $streetlist)
        // {
        //     $option.='<option value="'.$streetlist['STREETID'].'">'.$streetlist['STREETNAME'].'</option>';
        // }
        // echo $option;
        $res=$this->db->query(" delete from  temp_street ");
        foreach($village_street as $slist)
        {
            $res=$this->db->query("INSERT INTO temp_street (STREETID, STREETNAME, ZONEID, AREAID, CITYID, VILLAGEID, CREATED_BY, CREATED_ON) VALUES(".$slist['STREETID'].",'".$slist['STREETNAME']."','".$slist['ZONEID']."','".$slist['AREAID']."',".$slist['CITYID'].",".$slist['VILLAGEID'].",'".$_SESSION['username']."','".date('Y-m-d H:i:s')."')");
        }
        // print_r($res);
        //return $option;
    }
    public function get_area_edit()
    {
        $zid       = $_POST['zoneid'];
        $area_id   = $_POST['areaid'];
        // $area_id   = 003;

        $zone_area = $this->Party_model->get_area_by_zone_id($zid);
        $option    = '<option value="">Select Area</option>';
        foreach($zone_area as $arealist)
        {
             $val = "";
                if ($area_id==$arealist['SNO']) {
                   $val = "selected";
                }
            $option.='<option value="'.$arealist['SNO'].'" '.$val.'>'.$arealist['AREANAME'].'</option>';
        }

        // print_r($option);exit;
        echo $option;
        //return $option;
    }
    public function get_city_edit()
    {
        $aid = $_POST['areaid'];
        $cityid   = $_POST['cityid'];
        $area_city = $this->Party_model->get_city_by_area_id($aid);

        $option = '<option value="">Select City</option>';
        foreach($area_city as $citylist)
        {
            $val = "";
                if ($cityid==$citylist['CITYID']) {
                   $val = "selected";
                }
            $option.='<option value="'.$citylist['CITYID'].'" '.$val.'>'.$citylist['CITYNAME'].'</option>';
        }
        echo $option;
        //return $option;
    }
    public function get_village_edit()
    {
        $cid = $_POST['cityid'];
        $villageid = $_POST['villageid'];
        $city_village = $this->Party_model->get_village_by_city_id($cid);

        $option = '<option value="">Select village</option>';
        foreach($city_village as $villagelist)
        {
             $val = "";
                if ($villageid==$villagelist['VILLAGEID']) {
                   $val = "selected";
                }
            $option.='<option value="'.$villagelist['VILLAGEID'].'" '.$val.'>'.$villagelist['VILLAGENAME'].'</option>';
        }
        echo $option;
        //return $option;
    }
   
    /*RB*/
     public function load_pledge_list()
    {
        $billno=$_POST['billno'];
        $billnoval=str_replace('_', '/', $billno);

        $data['repledge_master']=$this->db->query("select * from REPLEDGE_MASTER where RP_BILLNO='".$billnoval."'")->row();
        $data['loan_details']=$this->db->query("select a.*,b.COMPANYNAME from LOANS a left join COMPANY b on b.COMPANYCODE = a.COMPANYCODE where a.BILLNO='".$billnoval."' AND LOAN_STATUS !=0")->row();
       
        $data['pledge_info'] = $this->Party_model->getviewpledgedata($billnoval);

        /*echo "<pre>";
        print_r($data['pledge_info']);
        echo "<pre>";exit;*/
     
        $this->load->view('party/party_repledge_pledge_list',$data);
    }
   
    public function mergeparty()
    { 
        $this->load->view('party/merge_party');
    }
     public function partydetails()
    {
        $search =  $_GET['query']; 
    
        $rows = $this->Party_model->getpartydata($search);
        $res='[';
        if(count($rows)>0)
        {
           foreach($rows as $row)
           {
               //print_r($row);exit;
               $title='';
               $pid = $row->PID;
               $partyname = $row->NAME;
               
              
             
              
               $title = $partyname;
               $res.='{ "title":"'.$title.'","partyID":"'.$pid.'"},';   
            }
            $res=rtrim($res,',');
            $res.=']';
        }
        else
        {
           $res.=']';
        }
        print_r($res);die();
    }
    public function secpartydetails()
    {
        $search =  $_GET['query']; 
    
        $rows = $this->Party_model->getpartydata($search);
        $res='[';
        
        if(count($rows)>0)
        {
           foreach($rows as $row)
           {
               //print_r($row);exit;
               $title='';
               $pid = $row->PID;
               $partyname = $row->NAME;
               
              
             
              
               $title = $partyname;
               $res.='{ "title":"'.$title.'","partyID":"'.$pid.'"},';   
            }
            $res=rtrim($res,',');
            $res.=']';
        }
        else
        {
           $res.=']';
        }
        print_r($res);die();

    }
    public function getallsecpartydetails()
    {
        $partytwoID = $_POST['partyID'];

        $partydata = $this->Party_model->gettwopartydata($partytwoID);
        $checkpartymerge = $this->Party_model->checkpartymegestatus($partydata[0]->PID);

        
         
        if($checkpartymerge)
        {
            
             $data['return_code']  = 2;
             $data['error_msg']    = 'Error';
             $data['status']       = 'Already Merged Party';
        }
        else 
        {

            $mergepartystatus = $this->Party_model->checkmergedetails($partydata[0]->PID);

             //echo '<pre>';
               // print_r($mergepartystatus);
              //echo '</pre>';exit;
            if($mergepartystatus)
            {

              $data['return_code']  = 2;
              $data['error_msg']    = 'Error';
              $data['status']       = 'Already Merged Party';

            }
            else
            {
                $billno = isset($partydata[0]->BILLNO) ? $partydata[0]->BILLNO :"";
                
                $partyoneID = $_POST['partyoneID'];
                $partytwoID = $_POST['partytwoID'];

                $partyIDval =[];
                $partyIDval =array(
                        'idone'=>$partyoneID,
                        'idtwo'=>$billno
                    );
           
                    foreach($partyIDval as $pID)
                    {
                        $partyname[] = $this->Party_model->getpartyname($pID);

                    
                     }
                
                    $name = $partyname;
           

            
                    if($billno)
                    {
                         $checkloandata  = $this->Party_model->checkloandata($partydata[0]->PID);
                         $getpledgedata  = $this->Party_model->getpledgedata($partydata[0]->PID);
                    }
                    else
                    {
                        $checkloandata = "";
                        $getpledgedata = "";
                    }
                    //print_r($getpledgedata);exit;
                    if(count((array)$partydata) >=0)
                    {
                        $data['return_code']  =  0;
                        $data['success_msg']  =  'successfully';
                        $data['partydetails'] =  $partydata;
                        $data['loandetails']  =  $checkloandata;
                        $data['pledge_info']  =  $getpledgedata;
                        $data['partynameval'] = $name;
                    }
                    else
                    {
                        $data['return_code']  = 1;
                        $data['error_msg']  = 'Error';
                    }
            }
        }
        
        echo json_encode($data);
    }

    public function getallpartydetails()
    {
        $partyIDone = $_POST['partyIDone'];
        $partydata = $this->Party_model->getonepartydata($partyIDone);


      // echo '<pre>';
        //print_r($partydata[0]->PID);
      //echo '</pre>';exit;

        $checkpartymerge = $this->Party_model->checkpartymegestatus($partydata[0]->PID);

        
         
        if($checkpartymerge)
        {
            
             $data['return_code']  = 2;
             $data['error_msg']    = 'Error';
             $data['status']       = 'Already Merged Party';
        }
        else 
        {

            $mergepartystatus = $this->Party_model->checkmergedetails($partydata[0]->PID);

             //echo '<pre>';
               // print_r($mergepartystatus);
              //echo '</pre>';exit;
            if($mergepartystatus)
            {

              $data['return_code']  = 2;
              $data['error_msg']    = 'Error';
              $data['status']       = 'Already Merged Party';

            }
            else
            {

                $billno = isset($partydata[0]->BILLNO) ? $partydata[0]->BILLNO :"";
                if($billno)
                {
                     $checkloandata  = $this->Party_model->checkloandata($partydata[0]->PID);
                     $getpledgedata  = $this->Party_model->getpledgedata($partydata[0]->PID);
                }
                else
                {
                    $checkloandata = "";
                    $getpledgedata = "";
                }
                //print_r($getpledgedata);exit;
                if(count((array)$partydata) >=0)
                {
                    $data['return_code']  =  0;
                    $data['success_msg']  =  'successfully';
                    $data['partydetails'] =  $partydata;
                    $data['loandetails']  =  $checkloandata;
                    $data['pledge_info']  =  $getpledgedata;
                }
                else
                {
                    $data['return_code']  = 1;
                    $data['error_msg']  = 'Error';
                }
            }
        }
        
        echo json_encode($data);
    }
    public function loadtwo_pledge_list()
    {
        $billnotwo=$_POST['billnotwo'];
        $billnotwo=str_replace('_', '/', $billnotwo);

        $data['repledgetwo_master']=$this->db->query("select * from REPLEDGE_MASTER where RP_BILLNO='".$billnotwo."'")->row();
        $data['loantwo_details']=$this->db->query("select a.*,b.COMPANYNAME from LOANS a left join COMPANY b on b.COMPANYCODE = a.COMPANYCODE where BILLNO='".$billnotwo."'")->row();
       
        $data['partytwopledge_info'] = $this->Party_model->getviewpledgedata($billnotwo);

        
        $this->load->view('party/partytwo_repledge_pledge_list',$data);
    }
    function mergepartyconfirmfun()
    {
        //partyone billno
        $partyonebillno=$_POST['partyonebillno'];
        $partyonebillnumber=str_replace('_', '/', $partyonebillno);  

        //partytwo billno
        $partytwobillno=$_POST['partytwobillno'];
        $partytwobillnumber=str_replace('_', '/', $partytwobillno); 

        //party one and two partyID
        $loannopartyoneparyID=$_POST['partyonepartyid'];
        $PartyNamesecoundvalpartyID =$_POST['partytwopartyid'];

        $mergeremarks = $_POST['mergeremarks'];

        //merge ID
        $mergepartyID = $_POST['mergepartyID'];
       
        $mergefinalID = $mergepartyID;
        //check mergeid partybased
        if($mergefinalID==$loannopartyoneparyID)
        {
           $partyPIDval = $PartyNamesecoundvalpartyID;
           $mergeID = $mergepartyID;
        }
        else
        {
            $partyPIDval = $loannopartyoneparyID;
            $mergeID = $mergepartyID;
           
        }
         //print_r($mergefinalID);exit;
       
        //updatemerge party ID
        // $mergeparty = $this->Party_model->mergepartyconfirm($partyPIDval,$billno);

        $partychange =$this->Party_model->partyupdate($partyPIDval,$mergefinalID,$mergeremarks);

        if($partychange)
        {   
            $data['return_code']=0;
            $data['success_msg']='success'; 
        }
        else
        {
            $data['return_code']=1;
            $data['error_msg']='error'; 
        }

        echo json_encode($data);
    }
    /*RBabu*/

    public function party_add()
    {
        // $pid = $_POST['id'];
        // $data['party_details'] = $this->Party_model->get_party_by_party_id($pid);
        $this->load->view('party/party_add');
    }
    public function party_save()
	{
		// print_r($_POST);
		// exit();
        
        $prefix=$_SESSION['LOANPREFIX'];
        $pidqry=$this->db->query("SELECT TOP 1 PID FROM PARTIES WHERE PID LIKE '".$prefix."%' ORDER BY PID DESC");
        $pidres=$pidqry->row();
        $last_data=$pidres->PID;
        $exlno = substr($last_data,1);
        $next_value = (int)$exlno + 1;
        $p_id1=str_pad($next_value,6,0,STR_PAD_LEFT);
        $p_id=$prefix.$p_id1;
		// $data['party_id'] = $this->input->post('party_id');
        $data['party_id'] = $p_id;
        $data['party_name'] = $this->input->post('party_name');
   
        $data['prefix'] = $this->input->post('prefix');
		$data['lname'] = $this->input->post('lname');
		$data['oname'] = $this->input->post('oname');
		$data['mother_name'] = $this->input->post('mother_name');
        $data['zone'] = $this->input->post('zone');
        $data['area'] = $this->input->post('area');
        $data['doorno'] = $this->input->post('doorno');
        $data['address'] = $this->input->post('address');        
        $data['city'] = $this->input->post('city');
        $data['village'] = $this->input->post('village');
        $data['street_val'] = $this->input->post('street');


        
        $target_dir = 'assets/images/party_image/';
        $targetparty_file =  $target_dir.basename($_FILES["party_photo"]["name"]);


      
        $uploadOkparty_photo = move_uploaded_file($_FILES["party_photo"]["tmp_name"], $targetparty_file); 


        $target_dir = 'assets/images/party_sign_image/';
        $targetsignparty_file =  $target_dir.basename($_FILES["sign_photo"]["name"]);


        $uploadOkparty_photo = move_uploaded_file($_FILES["sign_photo"]["tmp_name"], $targetsignparty_file); 


        



        $target_dir = 'assets/images/party_idproof_image/';
        $targetidprood_file =  $target_dir.basename($_FILES["id_photo"]["name"]);


        $uploadOkparty_photo = move_uploaded_file($_FILES["id_photo"]["tmp_name"], $targetidprood_file); 

        


            $modified ="";
            $base_url = (isset($_SERVER['HTTPS']) &&

            $_SERVER['HTTPS']!='off') ? 'https://' : 'http://';

            $tmpURL = dirname(__FILE__);
            $tmpURL = str_replace(chr(92),'/',$tmpURL);
            $tmpURL = str_replace($_SERVER['DOCUMENT_ROOT'],'',$tmpURL);
            $tmpURL = ltrim($tmpURL,'/');
            $tmpURL = rtrim($tmpURL, '/');

            if (strpos($tmpURL,'/')){
               $tmpURL = explode('/',$tmpURL);
               $tmpURL = $tmpURL[0];
            }

            if ($tmpURL !== $_SERVER['HTTP_HOST'])
            $base_url .= $_SERVER['HTTP_HOST'].'/'.$tmpURL.'/';
            else
            $base_url .= $tmpURL.'/';
            $partyimageimageName = $base_url .$targetparty_file;
            $signimageimageName = $base_url .$targetsignparty_file;
            $idproofimageimageName = $base_url .$targetidprood_file;


        $res=$this->db->query("select top 1 * from STREET where ZONEID='".$data['zone']."' and AREAID='".$data['area']."' and CITYID='".$data['city']."' and VILLAGEID='".$data['village']."' and STREETNAME like '%".$data['street_val']."%'")->row();
        if(isset($res->STREETID))
        {
            $data['street']=$res->STREETID;
        }
        else
        {
            $res=$this->db->query("INSERT INTO STREET(STREETNAME, ZONEID, AREAID, CITYID, VILLAGEID, CREATED_BY,CREATED_ON, STATUS) VALUES('".$data['street_val']."','".$data['zone']."','".$data['area']."','".$data['city']."','".$data['village']."','".$_SESSION['USERID']."','".date('Y-m-d H:i:s')."','1')");
            $st_det=$this->db->query("select Top 1 * from STREET where CREATED_BY='".$_SESSION['USERID']."' order by CREATED_ON DESC ")->row();
            $data['street']=$st_det->STREETID;

        }
		$data['landmark'] = $this->input->post('landmark');
		$data['mobile'] = $this->input->post('mobile');
		$data['phone2'] = $this->input->post('phone2');
        $data['w_no']='';
		// $data['w_chk'] = $this->input->post('w_chk');
		if($this->input->post('w_chk')==false)
		{
			$data['w_no'] = $this->input->post('w_no');
		}
		else
		{
			$data['w_no']=$this->input->post('mobile');
		}
		$data['email']    = $this->input->post('email');
		$data['aadhar']   = $this->input->post('aadhar');
		$data['idtype']   = ($this->input->post('idtype')=='Select ID')?'':$this->input->post('idtype');
		$data['id_no']    = $this->input->post('id_no');
		$data['worktype'] = ($this->input->post('worktype')=='Select Work')?'':$this->input->post('worktype');
		$data['rating']   = $this->input->post('rating');
        // $str_photo=str_replace('data:image/jpeg;base64,', '', $this->input->post('party_photo_data'));
        $data['party_photo'] = $this->input->post('party_photo_data');
        $data['sign_photo']  = $this->input->post('sign_photo_data');
        $data['other_photo'] = $this->input->post('other_photo_data');

        $data['party_img_file']=$this->input->post('party_photo');
        $data['sign_img_file']=$this->input->post('sign_photo');
        $data['other_img_file']=$this->input->post('id_photo');
        
          if(!empty($_FILES['party_img_file']['name'])){
            $ext = pathinfo($_FILES['party_img_file']['name'], PATHINFO_EXTENSION);
            
             // print_r($_FILES['party_img_file']['name'][$i]);exit;
            $_FILES['file']['name'] = $_FILES['party_img_file']['name'];
            $_FILES['file']['type'] = $_FILES['party_img_file']['type'];
            $_FILES['file']['tmp_name'] = $_FILES['party_img_file']['tmp_name'];
            $_FILES['file']['error'] = $_FILES['party_img_file']['error'];
            $_FILES['file']['size'] = $_FILES['party_img_file']['size'];
                  $ext = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
            $config['upload_path'] = 'assets/images/party_image'; 
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $config['max_size'] = '50000';
            $config['file_name'] = $data['party_id'];
     
            $this->load->library('upload',$config); 
      
            if($this->upload->do_upload('file')){
              $uploadData = $this->upload->data();
              $filename = $uploadData['file_name'];
     
              $data['totalFiles'] = $filename;
            }
          }
          if($data['party_img_file']!='')
         {
          $data['party_image']=$data['party_id'].".".$ext;;
          }
        else{

            
            $data['party_image'] = $partyimageimageName;
           
          }
        

          if(!empty($_FILES['sign_img_file']['name'])){
            // $ext = pathinfo($_FILES['sign_img_file']['name'], PATHINFO_EXTENSION);
            
            // print_r($_FILES['sign_img_file']['name'][$i]);exit;
            $_FILES['file']['name'] = $_FILES['sign_img_file']['name'];
            $_FILES['file']['type'] = $_FILES['sign_img_file']['type'];
            $_FILES['file']['tmp_name'] = $_FILES['sign_img_file']['tmp_name'];
            $_FILES['file']['error'] = $_FILES['sign_img_file']['error'];
            $_FILES['file']['size'] = $_FILES['sign_img_file']['size'];
                  $ext = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
            $config['upload_path'] = 'assets/images/party_sign_image'; 
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $config['max_size'] = '50000';
            $config['file_name'] = "sign_".$data['party_id'];
     
            $this->load->library('upload',$config); 
      
            if($this->upload->do_upload('file')){
              $uploadData = $this->upload->data();
              $filename = $uploadData['file_name'];
     
              $data['totalFiles'] = $filename;
            }
          }

         if($data['sign_img_file']!='')
         {
          $data['sign_image']="sign_".$data['party_id'].".".$ext;;
         }
          else{

            $data['sign_image'] = $signimageimageName;
           
         }
          if(!empty($_FILES['other_img_file']['name'])){
            // $ext = pathinfo($_FILES['other_img_file']['name'], PATHINFO_EXTENSION);
            
            // print_r($_FILES['other_img_file']['name'][$i]);exit;
            $_FILES['file']['name'] = $_FILES['other_img_file']['name'];
            $_FILES['file']['type'] = $_FILES['other_img_file']['type'];
            $_FILES['file']['tmp_name'] = $_FILES['other_img_file']['tmp_name'];
            $_FILES['file']['error'] = $_FILES['other_img_file']['error'];
            $_FILES['file']['size'] = $_FILES['other_img_file']['size'];
            $ext = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
            $config['upload_path'] = 'assets/images/party_idproof_image'; 
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $config['max_size'] = '50000';
            $config['file_name'] = "id_".$data['party_id'];
     
            $this->load->library('upload',$config); 
      
            if($this->upload->do_upload('file')){
              $uploadData = $this->upload->data();
              $filename = $uploadData['file_name'];
     
              $data['totalFiles'] = $filename;
            }
          }

         if($data['other_img_file']!='')
         {
          $data['id_image']="id_".$data['party_id'].".".$ext;;
        }
         else{
         
            $data['id_image']= $idproofimageimageName;
        }
        // $data['bank_details'] = $this->input->post('bank_details');

        $type=explode(",",implode(",",$this->input->post('add_type')));
        // echo $type. "<br>";
        $bank_name=explode(",",implode(",",$this->input->post('add_bank_name')));
        // echo $bank_name. "<br>";
        $branch_name=explode(",",implode(",",$this->input->post('add_branch_name')));
        // echo $branch_name. "<br>";
        $acc_hol_name=explode(",",implode(",",$this->input->post('add_acc_name')));
        // echo $acc_hol_name. "<br>";
        $acc_no=explode(",",implode(",",$this->input->post('add_acc_no')));
        // echo $acc_no. "<br>";
        $ifsc_code=explode(",",implode(",",$this->input->post('add_ifsc_code')));
        // echo $ifsc_code. "<br>";
        $subcount = count($this->input->post('add_bank_name'));
         
        if($subcount>0)
        {
            for($i=0;$i<$subcount;$i++)
            {
                if($bank_name[$i]=='' || is_null($bank_name[$i]))
               {}
                else
                {
                $res=$this->db->query("INSERT INTO party_bank_upi_details (payment_type, account_name, account_holder_name, phone_account_no, branch_name, ifsc_code, party_id, created_by, created_on) VALUES('".$type[$i]."','".$bank_name[$i]."','".$acc_hol_name[$i]."','".$acc_no[$i]."','".$branch_name[$i]."','".$ifsc_code[$i]."','".$data['party_id']."','".$_SESSION['username']."','".date('Y-m-d H:i:s')."')");
                save_query_in_log();
                }

            }
        }


        $nom_name=explode(",",implode(",",$this->input->post('add_nominee_name')));
        $relation=explode(",",implode(",",$this->input->post('add_relation')));
        $phone_no=explode(",",implode(",",$this->input->post('add_ph_no')));
        $ncount= count($this->input->post('add_nominee_name'));

        if($ncount>0)
        {
            for($j=0;$j<$ncount;$j++)
            {
               if($nom_name[$j]=='' || is_null($nom_name[$j]))
               {}
                else
                {
                $res=$this->db->query("INSERT INTO NOMINEE (NOMINEE_NAME, RELATION, MOBILE_NO, PID, CREATED_BY, CREATED_ON) VALUES('".$nom_name[$j]."','".$relation[$j]."','".$phone_no[$j]."','".$data['party_id']."','".$_SESSION['username']."','".date('Y-m-d H:i:s')."')");
                save_query_in_log();
                }

            }
        }
        $data['modified_on'] = date('Y-m-d H:i:s');
    	$result = $this->Party_model->party_save($data);
        $res=$this->db->query("UPDATE KEYMASTER SET KEYVALUE =KEYVALUE+1 where KEYNAME ='PARTIES-".$_SESSION['LOANPREFIX']."'");
	      if($result){
				$this->session->set_flashdata('g_success', $data['party_id'].' - '.$data['party_name'].' - '.$data['mobile'].' <br> Party have been Added successfully...');
	      }else{
	      	   $this->session->set_flashdata('g_err', 'Could not add Party details!');
	      }
		redirect('party'); 

	}
     public function update()
    {
        $data['edit_id'] = $this->input->post('edit_id');
        
        // $data['party_id'] = $this->input->post('party_id');
        $data['party_id']     = $data['edit_id'];
        $data['party_name']   = $this->input->post('party_name');

        $data['prefix']       = $this->input->post('prefix');
        $data['lname']        = $this->input->post('lname');
        $data['oname']        = $this->input->post('oname');
        $data['mother_name']  = $this->input->post('mother_name');
        $data['zone']         = $this->input->post('zone');
        $data['area']         = $this->input->post('area');
        $data['doorno']       = $this->input->post('doorno');
        $data['address']      = $this->input->post('address');        
        $data['city']         = $this->input->post('city');
        $data['village']      = $this->input->post('village');
        $data['street_val']   = $this->input->post('street');
        $data['landmark']     = $this->input->post('landmark');
        $data['mobile']       = $this->input->post('mobile');
        $data['phone2']       = $this->input->post('phone2');
        $data['w_no']         = $this->input->post('w_no');



         $target_dir = 'assets/images/party_image/';
        $targetparty_file =  $target_dir.basename($_FILES["party_photo"]["name"]);


      
        $uploadOkparty_photo = move_uploaded_file($_FILES["party_photo"]["tmp_name"], $targetparty_file); 


        $target_dir = 'assets/images/party_sign_image/';
        $targetsignparty_file =  $target_dir.basename($_FILES["sign_photo"]["name"]);


        $uploadOkparty_photo = move_uploaded_file($_FILES["sign_photo"]["tmp_name"], $targetsignparty_file); 


        



        $target_dir = 'assets/images/party_idproof_image/';
        $targetidprood_file =  $target_dir.basename($_FILES["id_photo"]["name"]);


        $uploadOkparty_photo = move_uploaded_file($_FILES["id_photo"]["tmp_name"], $targetidprood_file); 

        


            $modified ="";
            $base_url = (isset($_SERVER['HTTPS']) &&

            $_SERVER['HTTPS']!='off') ? 'https://' : 'http://';

            $tmpURL = dirname(__FILE__);
            $tmpURL = str_replace(chr(92),'/',$tmpURL);
            $tmpURL = str_replace($_SERVER['DOCUMENT_ROOT'],'',$tmpURL);
            $tmpURL = ltrim($tmpURL,'/');
            $tmpURL = rtrim($tmpURL, '/');

            if (strpos($tmpURL,'/')){
               $tmpURL = explode('/',$tmpURL);
               $tmpURL = $tmpURL[0];
            }

            if ($tmpURL !== $_SERVER['HTTP_HOST'])
            $base_url .= $_SERVER['HTTP_HOST'].'/'.$tmpURL.'/';
            else
            $base_url .= $tmpURL.'/';
            $partyimageimageName = $base_url .$targetparty_file;
            $signimageimageName = $base_url .$targetsignparty_file;
            $idproofimageimageName = $base_url .$targetidprood_file;


        $res=$this->db->query("select top 1 * from STREET where ZONEID='".$data['zone']."' and AREAID='".$data['area']."' and CITYID='".$data['city']."' and VILLAGEID='".$data['village']."' and STREETNAME like '%".$data['street_val']."%'")->row();
        if(isset($res->STREETID))
        {
            $data['street']=$res->STREETID;
        }
        else
        {
            $res=$this->db->query("INSERT INTO STREET(STREETNAME, ZONEID, AREAID, CITYID, VILLAGEID, CREATED_BY,CREATED_ON, STATUS) VALUES('".$data['street_val']."','".$data['zone']."','".$data['area']."','".$data['city']."','".$data['village']."','".$_SESSION['USERID']."','".date('Y-m-d H:i:s')."','1')");
            $st_det=$this->db->query("select Top 1 * from STREET where CREATED_BY='".$_SESSION['USERID']."' order by CREATED_ON DESC ")->row();
            $data['street']=$st_det->STREETID;

        }
        
        $data['email']          = $this->input->post('email');
        $data['aadhar']         = $this->input->post('aadhar');
        $data['idtype']         = ($this->input->post('idtype')=='Select ID')?'':$this->input->post('idtype');
        $data['id_no']          = $this->input->post('id_no');
        $data['worktype']       = ($this->input->post('worktype')=='Select Work')?'':$this->input->post('worktype');
        $data['rating']         = $this->input->post('rating');
        $data['party_photo']    = $this->input->post('party_photo_data');
        $data['sign_photo']     = $this->input->post('sign_photo_data');
        $data['other_photo']    = $this->input->post('other_photo_data');
        $data['party_img_file'] = $this->input->post('party_photo');
        $data['sign_img_file']  = $this->input->post('sign_photo');
        $data['other_img_file'] = $this->input->post('id_photo');
        $data['modified_on']    = date('Y-m-d H:i:s');

       
          if(!empty($_FILES['party_img_file']['name'])){
            $ext = pathinfo($_FILES['party_img_file']['name'], PATHINFO_EXTENSION);
            // print_r($_FILES['party_img_file']['name'][$i]);exit;
            $_FILES['file']['name'] = $_FILES['party_img_file']['name'];
            $_FILES['file']['type'] = $_FILES['party_img_file']['type'];
            $_FILES['file']['tmp_name'] = $_FILES['party_img_file']['tmp_name'];
            $_FILES['file']['error'] = $_FILES['party_img_file']['error'];
            $_FILES['file']['size'] = $_FILES['party_img_file']['size'];
            $ext = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
            $config['upload_path']   = 'assets/images/party_image'; 
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $config['max_size'] = '50000';
            $config['file_name'] = $data['party_id'];
     
            $this->load->library('upload',$config); 
      
            if($this->upload->do_upload('file')){
              $uploadData = $this->upload->data();
              $filename = $uploadData['file_name'];
     
              $data['totalFiles'] = $filename;
            }
          }
            if($data['party_img_file']!='')
            {
              $data['party_image']=$data['party_id'].".".$ext;;
            }
             else{
                $data['party_image'] = $partyimageimageName;
            }
            if(!empty($_FILES['sign_img_file']['name'])){
                // $ext = pathinfo($_FILES['sign_img_file']['name'], PATHINFO_EXTENSION);
                // print_r($_FILES['sign_img_file']['name'][$i]);exit;
                $_FILES['file']['name'] = $_FILES['sign_img_file']['name'];
                $_FILES['file']['type'] = $_FILES['sign_img_file']['type'];
                $_FILES['file']['tmp_name'] = $_FILES['sign_img_file']['tmp_name'];
                $_FILES['file']['error'] = $_FILES['sign_img_file']['error'];
                $_FILES['file']['size'] = $_FILES['sign_img_file']['size'];
                      $ext = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
                $config['upload_path'] = 'assets/images/party_sign_image'; 
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $config['max_size'] = '50000';
                $config['file_name'] = "sign_".$data['party_id'];
         
                $this->load->library('upload',$config); 
          
                if($this->upload->do_upload('file')){
                  $uploadData = $this->upload->data();
                  $filename = $uploadData['file_name'];
         
                  $data['totalFiles'] = $filename;
                }
            }

            if($data['sign_img_file']!='')
            {
              $data['sign_image']="sign_".$data['party_id'].".".$ext;;
            }
             else
            {
                $data['sign_image'] = $signimageimageName;
            }
              if(!empty($_FILES['other_img_file']['name'])){
                // $ext = pathinfo($_FILES['other_img_file']['name'], PATHINFO_EXTENSION);
                
                // print_r($_FILES['other_img_file']['name'][$i]);exit;
                $_FILES['file']['name'] = $_FILES['other_img_file']['name'];
                $_FILES['file']['type'] = $_FILES['other_img_file']['type'];
                $_FILES['file']['tmp_name'] = $_FILES['other_img_file']['tmp_name'];
                $_FILES['file']['error'] = $_FILES['other_img_file']['error'];
                $_FILES['file']['size'] = $_FILES['other_img_file']['size'];
                $ext = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
                $config['upload_path'] = 'assets/images/party_idproof_image'; 
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $config['max_size'] = '50000';
                $config['file_name'] = "id_".$data['party_id'];
         
                $this->load->library('upload',$config); 
          
                if($this->upload->do_upload('file')){
                  $uploadData = $this->upload->data();
                  $filename = $uploadData['file_name'];
         
                  $data['totalFiles'] = $filename;
                }
              }

             if($data['other_img_file']!='')
             {
              $data['id_image']="id_".$data['party_id'].".".$ext;;
            }
            else
            {
                $data['id_image']= $idproofimageimageName;
            }
             // print_r($data); exit();
            // $data['bank_details'] = $this->input->post('bank_details');

            $type=explode(",",implode(",",$this->input->post('add_type')));
            // echo $type. "<br>";
            $account_name=explode(",",implode(",",$this->input->post('add_bank_name')));
            // echo $bank_name. "<br>";
            $branch_name=explode(",",implode(",",$this->input->post('add_branch_name')));
            // echo $branch_name. "<br>";
            $acc_hol_name=explode(",",implode(",",$this->input->post('add_acc_name')));
            // echo $acc_hol_name. "<br>";
            $acc_no=explode(",",implode(",",$this->input->post('add_acc_no')));
            // echo $acc_no. "<br>";
            $ifsc_code=explode(",",implode(",",$this->input->post('add_ifsc_code')));
            // echo $ifsc_code. "<br>";
            $subcount = count($this->input->post('add_bank_name'));
         
            if($subcount>0)
            {
                for($i=0;$i<$subcount;$i++)
                {
                    if($account_name[$i]=='' || is_null($account_name[$i]))
                   {}
                    else
                    {
                    $pay_ids = intval($this->input->post('pay_id_hidden')[$i]);
                    $resp    = $this->db->query("select * from party_bank_upi_details where type_id='".$pay_ids."'")->row(); 
                    // print_r($resp); exit();   
                    if ($resp) {
                        $pay_id    = $resp->type_id;
                        $payment_update = [
                                            'payment_type'       =>$type[$i], 
                                            'account_name'       =>$account_name[$i], 
                                            'account_holder_name'=>$acc_hol_name[$i], 
                                            'phone_account_no'   =>$acc_no[$i], 
                                            'branch_name'        =>$branch_name[$i],  
                                            'ifsc_code'          =>$ifsc_code[$i], 
                                            'modified_by'        =>$_SESSION['username'], 
                                            'modified_on'        =>date('Y-m-d H:i:s'), 
                                          ];

                        $resp=$this->db->select('*')->from('party_bank_upi_details')->where(["type_id" => $pay_id])->set($payment_update)->update();
                      }else{

                        $resp=$this->db->query("INSERT INTO party_bank_upi_details (payment_type, account_name, account_holder_name, phone_account_no, branch_name, ifsc_code, party_id, created_by, created_on) VALUES('".$type[$i]."','".$account_name[$i]."','".$acc_hol_name[$i]."','".$acc_no[$i]."','".$branch_name[$i]."','".$ifsc_code[$i]."','".$data['party_id']."','".$_SESSION['username']."','".date('Y-m-d H:i:s')."')");
                      }
                    save_query_in_log();
                    }

                }
            }


            $nom_name=explode(",",implode(",",$this->input->post('add_nominee_name')));
            $relation=explode(",",implode(",",$this->input->post('add_relation')));
            $phone_no=explode(",",implode(",",$this->input->post('add_ph_no')));
            $ncount= count($this->input->post('add_nominee_name'));
            if($ncount>0)
            {
                for($j=0;$j<$ncount;$j++)
                {
                   if($nom_name[$j]=='' || is_null($nom_name[$j]))
                   {}else{
                    $nom_id   = intval($this->input->post('nom_hidden')[$j]);
                    $response = $this->db->query("select * from NOMINEE where NOMINEE_ID='".$nom_id."'")->row(); 
                    // print_r($response);   
                    if ($response) {
                        $nid    = $response->NOMINEE_ID;
                        $update = [
                                    'NOMINEE_NAME' =>$nom_name[$j], 
                                    'RELATION'     =>$relation[$j], 
                                    'MOBILE_NO'    =>$phone_no[$j], 
                                    'MODIFIED_BY'  =>$_SESSION['username'], 
                                    'MODIFIED_ON'  =>date('Y-m-d H:i:s'), 
                                  ];

                       $res=$this->db->select('*')->from('NOMINEE')->where(["NOMINEE_ID" => $nid])->set($update)->update();
                      }else{
                        $res=$this->db->query("INSERT INTO NOMINEE (NOMINEE_NAME, RELATION, MOBILE_NO, PID, CREATED_BY, CREATED_ON) VALUES('".$nom_name[$j]."','".$relation[$j]."','".$phone_no[$j]."','".$data['party_id']."','".$_SESSION['username']."','".date('Y-m-d H:i:s')."')");
                      }
                    save_query_in_log();
                    }

                }
            }
           
         $result = $this->Party_model->party_update($data);
         // exit();
          if($result){
                $this->session->set_flashdata('g_success', 'Party have been Updated successfully...');
          }else{
               $this->session->set_flashdata('g_err', 'Could not update party details!');
          }
        redirect('party'); 

    }
	public function party_view($pid)
    {
        // $pid = $_POST['id'];
        $data['party_details'] = $this->Party_model->get_party_by_party_id($pid);
        // print_r($data['party_details']);
        $this->load->view('party/party_view',$data);
    }
    public function party_loan_view($pid)
    {
        
        $data['party_details'] = $this->Party_model->get_party_by_party_id($pid);

        $data['sel_loan_type']=$loan_type=$this->input->post('sel_loan_type');

        if($loan_type=='loan' || $loan_type=='')
        {
            $data['sel_loan_type']='loan';
            $data['loan_details'] = $this->Party_model->get_loans_by_party_id($pid);
        }
        if($loan_type=='receipts')        
        {
            $data['receipt_details'] = $this->Party_model->get_receipts_by_party_id($pid); 
        }
        if($loan_type=='redemption'){
            $data['redemption_details'] = $this->Party_model->get_redemption_by_party_id($pid); 
        }
        // loan
                // receipts
                // redemption
                // repledge
                // mri_loan
                // mri_receipts
                // mri_redemption
                // hand_loan
        $this->load->view('party/party_loan_view',$data);
    }
    public function party_history_view()
    {
        $pid = $_POST['id'];
        $data['party_details'] = $this->Party_model->get_party_by_party_id($pid);
        $this->load->view('party/party_history_detail',$data);
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
        	$result = $this->Party_model->party_delete($pid);
    	}
        if ($result) {
            $this->session->set_flashdata('g_success', 'Party has been Deleted successfully.');
        }
        else{
            $this->session->set_flashdata('g_err', $info);
        }
    }
    //Party Edit
    public function party_edit($pid)
    {
        // print_r($_POST['id']);
        // $cid = $_POST['id'];

        $data['edit'] = $this->Party_model->get_party_by_party_id($pid);

        // print_r($data['edit']);exit;
        
        $street_id = $data['edit']->STREET_ID;
        $data['street'] = $this->db->query("SELECT * FROM STREET WHERE STREETID = '".$street_id."'")->row();
        // print_r($data['street']);exit();
        $this->load->view('party/party_edit_new',$data);
    }
    public function party_update()
    {
        $data['party_id'] = $this->input->post('party_id_edit');
        $data['party_name'] = $this->input->post('party_name_edit');
        $data['prefix'] = $this->input->post('prefix_edit');
        $data['lname'] = $this->input->post('lname_edit');
        $data['oname'] = $this->input->post('oname_edit');
        $data['mother_name'] = $this->input->post('mother_name_edit');
        $data['zone'] = $this->input->post('zone_edit');
        $data['area'] = $this->input->post('area_edit');
        $data['doorno'] = $this->input->post('doorno_edit');
        $data['address'] = $this->input->post('address_edit');        
        $data['city'] = $this->input->post('city_edit');
        $data['village'] = $this->input->post('village_edit');
        $data['landmark'] = $this->input->post('landmark_edit');
        $data['mobile'] = $this->input->post('mobile_edit');
        $data['phone2'] = $this->input->post('phone2_edit');
        // $data['w_chk'] = $this->input->post('w_chk');
        if($this->input->post('w_chk')==false)
        {
            $data['w_no'] = $this->input->post('w_no_edit');
        }
        else
        {
            $data['w_no']=$this->input->post('mobile_edit');
        }
        $data['email'] = $this->input->post('email_edit');
        $data['aadhar'] = $this->input->post('aadhar_edit');
        $data['idtype'] = $this->input->post('idtype_edit');
        $data['id_no'] = $this->input->post('id_no_edit');
        $data['worktype'] = $this->input->post('worktype_edit');
        $data['rating'] = $this->input->post('rating_edit');
        $data['modified_on'] = date('Y-m-d H:i:s');
        
        $result = $this->Party_model->party_update($data);
          if($result){
                $this->session->set_flashdata('g_success', 'Party have been Updated successfully...');
          }else{
               $this->session->set_flashdata('g_err', 'Could not update party details!');
          }
        redirect('party'); 
    }
    // public function get_area_edit()
    // {
    //     $zid = $_POST['zoneid'];
    //     $zone_area = $this->Party_model->get_area_by_zone_id($zid);
    //     $option = '<option value="">Select Area</option>';
    //     foreach($zone_area as $arealist)
    //     {
    //         $option.='<option value="'.$arealist['SNO'].'">'.$arealist['AREANAME'].'</option>';
    //     }
    //     echo $option;
    //     //return $option;
    // }

    public function streetList()
      {
        $search =  $_GET['query']; 
        // $vid =  $_GET['vid']; 
        // $vid =  $this->input->post('village'); 
        // echo $vid;
        // $rows = $this->Party_model->getStreet($search,$vid);
        $rows = $this->Party_model->getStreet($search);
        $res='[';
        if(count($rows)>0) {
          foreach($rows as $row )
          {
              $title='';
              // $billno='';
              $street_id=$row->STREETID;
              $street_name=$row->STREETNAME;
              

              $title = $street_name;
              $res.='{ "title":"'.$title.'","street_id": "'.$street_id.'","street_name":"'.$street_name.'"},';
             
              
          }
          $res=rtrim($res,',');
          $res.=']';
        }
        else{
          $res.=']';
        }
        print_r($res);die();
      }
      public function check_phno_exists()
      {
          $ph=$_POST['mob'];

          $ph_res=$this->db->query("select * from PARTIES WHERE PHONE='".$ph."'")->result_array();
          $tr_data='';
          $cnt=count((array)$ph_res);
          if($cnt>0)
          {
              foreach($ph_res as $plist)
              { 
                    $tr_data.="<tr><td>".$plist['NAME']." - ".$plist['FATHERSNAME']." - ".$plist['CITY']." - ".$plist['PHONE']."</td></tr>";
              }
          }
          else
          {
                $tr_data='0';
          }
          echo $tr_data;
      }
      // ****************************************************JEWEL view**********************************
    public function party_jewel_view($pid)
    {
        $data['party_details'] = $this->Party_model->get_party_by_party_id($pid);
        $data['sel_sale_type']=$sel_sale_type=$this->input->post('sel_sale_type');

        // new
        if($sel_sale_type=='new' || $sel_sale_type=='')
        {
            $data['sel_sale_type']=$sel_sale_type='new';
            $data['sales_entry_list'] = $this->Party_model->get_jewel_by_party_id($pid);
        }
        // receipt
        if($sel_sale_type=='receipt')
        {
            $data['sales_receipt_list']= $this->db->query(" SELECT * FROM sales_receipt WHERE status='Y' AND party_id='".$pid."'ORDER BY id DESC")->result_array();
        }
        // order
        if($sel_sale_type=='order')
        {
            $data['sales_order_list']  = $this->db->query(" SELECT  * FROM  ( SELECT *, ROW_NUMBER() OVER (ORDER BY id DESC) AS sl FROM sales_order WHERE  status!='' and party_id='".$pid."')N ")->result_array();
        }
        // return
        if($sel_sale_type=='return')
        {
            $data['sales_return_list']  = $this->db->query(" SELECT  * FROM  ( SELECT *, ROW_NUMBER() OVER (ORDER BY id DESC) AS sl FROM sales_return WHERE  status!='' and party_id='".$pid."' )N")->result_array();
        }

       $this->load->view('party/jewel_party_view',$data);
    }
    // ****************************************************RATING view**********************************
    public function party_rating_view($pid)
    {
        // $pid = $_POST['id'];
        $data['party_details'] = $this->Party_model->get_party_by_party_id($pid);
        $data['rating_details'] = $this->Party_model->get_rating_by_party_id($pid);

        $this->load->view('party/party_rating_view',$data);
    }
    // ****************************************************Karupati view**********************************

    public function membership_party_view($pid)
    {  
      
     $data['membership_details'] = $this->Party_model->get_membership_by_party_id($pid);
     $data['party_det']      = $this->db->query("SELECT * FROM PARTIES WHERE PID='".$pid."'")->row(); 
     $data['party_details']  = $this->db->query("SELECT * FROM PARTIES WHERE PID='".$pid."'")->row();
     $data['PID']            = $pid;
     $this->load->view('party/party_membership_view',$data);
    }
      // ****************************************************Karupati view**********************************

    public function karupatti_party_view($pid)
    {  
      

     $data['aks_list']       = $this->Party_model->party_aksale_list_view($pid);
     $data['party_det']      = $this->db->query("SELECT * FROM PARTIES WHERE PID='".$pid."'")->row(); 
     $data['party_details']  = $this->db->query("SELECT * FROM PARTIES WHERE PID='".$pid."'")->row();
     $data['PID']            = $pid;
     $this->load->view('party/karupatti_party_view',$data);
    }
    // ****************************************************Realestae view**********************************

     public function realestate_party_view($pid)
    {  

     $data['property_list']  = $this->Party_model->realestate_view_property($pid);
     $data['Purchase_list']  = $this->Party_model->realestate_view_purchase($pid);
     $data['sale_list']      = $this->Party_model->realestate_view_sale($pid);
     // print_r($data['sale_list']); exit();
     $data['party_det']      = $this->db->query("SELECT * FROM PARTIES WHERE PID='".$pid."'")->row(); 
     $data['party_details']  = $this->db->query("SELECT * FROM PARTIES WHERE PID='".$pid."'")->row();
     $data['PID'] = $pid;
     $this->load->view('party/realestate_party_view',$data);

    }
    

    // *********************************************Chit****************************************************//

    public function chit_party_view($pid)
    {
        // $pid = $_POST['pid'];
        $data['chit_det'] = $this->Party_model->get_chit_trans($pid);
        $data['tot_amt']  = $this->db->query("SELECT * FROM CHIT_MASTER WHERE party_id = '".$pid."' ")->row();
        // print_r($data['tot_amt']);exit;
        if (isset($data['tot_amt'])) {
            $data['sm_cash'] = $data['tot_amt']->sm_cash_ava_amt;
            $data['tm_cash'] = $data['tot_amt']->tm_cash_ava_amt;
            $data['tm_gold'] = $data['tot_amt']->tm_gold_ava_amt;
        }else{

            $data['sm_cash'] = 0;
            $data['tm_cash'] = 0;
            $data['tm_gold'] = 0;
        }
        
        $data['party_det']      = $this->db->query("SELECT * FROM PARTIES WHERE PID='".$pid."'")->row(); 
        $data['party_details']  = $this->db->query("SELECT * FROM PARTIES WHERE PID='".$pid."'")->row();
        $part_sm_count = $this->db->query("SELECT COUNT(scheme_type) as sm_count FROM CHIT_LIST WHERE party_id = '".$pid."' AND scheme_type = '1' AND status = 'Y' ")->result_array();
        $part_tmc_count = $this->db->query("SELECT COUNT(scheme_type) as tmc_count FROM CHIT_LIST WHERE party_id = '".$pid."' AND scheme_type = '2' AND status = 'Y' ")->result_array();
        $part_tmg_count = $this->db->query("SELECT COUNT(scheme_type) as tmg_count FROM CHIT_LIST WHERE party_id = '".$pid."' AND scheme_type = '3' AND status = 'Y' ")->result_array();
        // print_r($data['tot_amt']->sm_cash_ava_amt);exit;
        // print_r(array_sum($data['sm']));exit;
        // $data['sm_cash'] = array_sum($data['tot_amt']);
        // print_r($data['sm_cash']);exit;
        // $data['sm_cash'] = array_sum($sm_cash);
        // $data['sm'] = json_decode(json_encode($data['sm']), true);

        $arr = [];
        foreach($data['chit_det'] as $party)
        {

        if ($party['scheme_type']== 1) {
            $scheme = 'Selvamagal';
         }
         else if ($party['scheme_type']== 2) {
            $scheme = 'Thangamagal';
         }
         else
         {
            $scheme = 'Thangamagal';
         }


        if ($party['scheme_type']== 1) 
        {
            $sche_ty = 'Cash';
        }
        else if ($party['scheme_type']== 2) 
        {
            $sche_ty = 'Cash';
        }
        else
        {
            $sche_ty = 'Gold';
        }
        

        if ($party['transaction_type'] == 1) 
            {
                $type = 'Chit';
            }
            else if ($party['transaction_type'] == 2) 
            {
                $type = 'Chit';
            }
            else if ($party['transaction_type'] == 3) 
            {
                $type = 'Chit';
            }
            else if ($party['transaction_type'] == 4) 
            {
                $type = 'Sales';
            }
            else
            {
                $type = 'Loan';
            }

            if ($party['transaction_type'] == 1) 
            {
                $status = '<span style="background-color:#5aad52;border-radius: 8px;padding: 5px 15px 5px 15px;">Deposit</span>';
            }
            else if ($party['transaction_type'] == 2) 
            {
                $status = '<span style="background-color:lightblue;border-radius: 8px;padding: 5px 15px 5px 15px;">Withdraw</span>';
            }
            else if ($party['transaction_type'] == 3) 
            {
                $status = '<span style="background-color:orange;border-radius: 8px;padding: 5px 15px 5px 15px;">Interest-added</span>';
            }
            else if ($party['transaction_type'] == 4) 
            {
                $status = '<span style="background-color:violet;border-radius: 8px;padding: 5px 15px 5px 15px;">Withdraw-Sales</span>';
            }
            else
            {
                $status = '<span style="background-color:yellow;border-radius: 8px;padding: 5px 15px 5px 15px;">Withdraw-Loan</span>';
            }



        {
            $arr[] = [
                'name'=> $party['NAME'],
                'scheme'=> $scheme,
                'sche_ty'=> $sche_ty,
                'type'=> $type,
                'status'=> $status,
                'trans_date'=> $party['trans_date'],
                'created_by'=> $party['created_by'],
                'opening_amount'=> $party['opening_amount'],
                'processing_amount'=> $party['processing_amount'],
                'closing_balance'=> $party['closing_balance'],
                'amt_paid'=> $party['amt_paid'],
                'per_gram'=> $party['per_gram'],
                'scheme_id'=> $party['scheme_id'],
                
            ];
        }
        // print_r($arr);exit;
        // $arr =[];
    }
        // echo json_encode($arr);
            // exit;
        // print_r($data['chit_det']);exit;
                $data['sm_count']  = $part_sm_count[0]['sm_count'];
                $data['tmc_count'] = $part_tmc_count[0]['tmc_count'];
                $data['tmg_count'] = $part_tmg_count[0]['tmg_count'];

        $data['arr'] = $arr;
        // print_r($data['arr']);exit;
        $this->load->view('party/chit_party_view',$data);
    }
    public function redemption_view()
    {
        $billno=$this->input->post('bno');

        $bill_no=str_replace('_', '/', $billno);
        
        $data['redemption_details'] = $this->db->query("select * from REDEMPTIONS where BILLNO='".$bill_no."'")->row();

        $data['loan_details'] = $this->db->query("select * from LOANS where BILLNO='".$bill_no."' AND LOAN_STATUS !=0 ")->row();
        $data['loan_status'] = $this->db->query("select * from loan_status where id='".$data['loan_details']->LOAN_STATUS."'")->row();
        $data['party_details'] = $this->db->query("select * from PARTIES where PID='".$data['loan_details']->PID."'")->row();
        $data['pledge_details'] = $this->db->query("select * from PLEDGEINFO where BILLNO='".$bill_no."'")->result_array();

        
        $data['membership_details']= $this->db->query("select * from MEMBERSHIP_CARD where PID='".$data['loan_details']->PID."'")->row();
        $data['receipt_details']= $this->db->query("select * from RECEIPT_MASTER where BILLNO='".$bill_no."'")->result_array();
        $this->load->view('party_search/redemption_view',$data);
    }
    
}
?>