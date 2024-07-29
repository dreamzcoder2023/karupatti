<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/* ************************************************************************************
		Purpose : To handle all Raisecomplaint_reports functions 2022-09-28
***************************************************************************************/
class Raisecomplaint_reports extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model("Raisecomplaint_model");
    	if (isset($this->session->userdata['username']) && $this->session->userdata['username'] == TRUE)
        {
            //do something
        }else{
            redirect('login'); //if session is not there, redirect to login page
        } 
		date_default_timezone_set("Asia/Kolkata");
    	$this->session->set_userdata('comtitle', 'Raise Complaint');
	}

    public function index()
    {
        $data['raise_complaintdata'] =$this->Raisecomplaint_model->getraisecomplaint();
       // print_r($data['raise_complaintdata']);exit;
        $this->load->view('complaint/raise_complaint',$data);
    }

    public function pickcomplaint()
    {
        $data['picklist_complaintdata'] =$this->Raisecomplaint_model->getpicklistcomplaint();
     
        $this->load->view('complaint/pick_list_complaint',$data);
    }
    public function pickkaruppatticomplaintreasonsadd()
    {
        $pickcomplaintreason = $_POST['pickcomplaintreason'];
        $pickcomplaintid = $_POST['pickcomplaintid'];
       
       // print_r($_SESSION);exit;
        $companyname    = $this->db->query("SELECT COMPANYNAME FROM COMPANY where COMPANYCODE='".$_SESSION['COMPANYCODE']."'")->row();
        $companynameval = $_SESSION['COMPANYCODE'];
        $getpartyid = $this->db->query("SELECT id_party FROM AKS_SALE_ENTRY where sale_id='".$pickcomplaintid."'")->result_array();
     
        
        $pickcomplaint['pickcomplaintreason']= $pickcomplaintreason;
        $pickcomplaint['pickcomplaintid'] =$pickcomplaintid;
        $pickcomplaint['companynameval'] =$companynameval;
        $pickcomplaint['pickcomplaint_by'] =$_SESSION['username'];
        $pickcomplaint['status'] =1;
        $pickcomplaint['pickcomplaint_date'] =date('Y-m-d');
        $pickcomplaint['resolved_date'] ='';
        $pickcomplaint['resolved_by'] ='';
        $pickcomplaint['pickcomplaint_type'] ='Karuppatti';
        $pickcomplaint['party_id']=$getpartyid[0]['id_party'];

        $insertpickcomplaint =$this->Raisecomplaint_model->pickkaruppatticomplaintreasonsadd($pickcomplaint);
       
        if($insertpickcomplaint==1)
        {

            $data['return_code'] =0;
            $data['success_msg'] ='success';

        }
        else
        {
            $data['return_code'] =1;
            $data['error_msg'] ='error';
        }  
   
        echo json_encode($data);

    }
    public function pickcomplaintremarksupdate()
    {
        $pickcomplaintremarks   = $_POST['pickcomplaintremarks'];
        $pickcomplaintidval     = $_POST['pickcomplaintidval'];

        $getpickcomplaintdetails = $this->Raisecomplaint_model->getpickcomplaintdata($pickcomplaintidval);
       
        $partyid = $getpickcomplaintdetails[0]['party_id'];
        $complaintid =$getpickcomplaintdetails[0]['pickcomplaintid']; 

        $remarksupdate['pickcomplaintremarks']=$pickcomplaintremarks;
        $remarksupdate['partyid']=$partyid;
        $remarksupdate['complaintid']=$complaintid;
        $remarksupdate['status']=1;
        $remarksupdate['createdDate']=date('Y-m-d H:i:s');
        $remarksupdate['createdBy']=$_SESSION['USERID'];
        $remarksupdate['modifiedBy']=$_SESSION['USERID'];
        $remarksupdate['modifiedDate']=date('Y-m-d H:i:s');
        $remarksupdate['pickcomplaintidval']     = $pickcomplaintidval;

        $insertupdateremarks = $this->Raisecomplaint_model->addpickcomplaintupdateremarks($remarksupdate);

        if($insertupdateremarks==1)
        {

            $data['return_code'] =0;
            $data['success_msg'] ='success';

        }
        else
        {
            $data['return_code'] =1;
            $data['error_msg'] ='error';
        }  
   
        echo json_encode($data);




    }


    public function saveraisecomplaint()
    {
        $complaintdescription = $_POST['complaintdesc'];
        $staffpassword        = $_POST['staffpassword'];
        $complaintid          = $_POST['complaintid'];

       //print_r($_SESSION);exit;
       $companyname    = $this->db->query("SELECT COMPANYNAME FROM COMPANY where COMPANYCODE='".$_SESSION['COMPANYCODE']."'")->row();
       $companynameval = $_SESSION['COMPANYCODE'];
       
       $action = 'encrypt';
       $encrypt_method = "AES-256-CBC";
       $secret_key = 'AA74CDCC2BBRT935136HH7B63C27'; // user define private key
       $secret_iv = '5fgf5HJ5g27'; // user define secret key
       $key = hash('sha256', $secret_key);
       $iv = substr(hash('sha256', $secret_iv), 0, 16); // sha256 is hash_hmac_algo
       if ($action == 'encrypt') {
            $passvalue = openssl_encrypt($staffpassword, $encrypt_method, $key, 0, $iv);
            $passvalue = base64_encode($passvalue);
        } else if ($action == 'decrypt') {
            $passvalue = openssl_decrypt(base64_decode($staffpassword), $encrypt_method, $key, 0, $iv);
        }

        $passcheck  = $this->Raisecomplaint_model->getpasscheck($passvalue);
        if($passcheck==1)
        {
            $getpartyid = $this->db->query("SELECT id_party FROM AKS_SALE_ENTRY where sale_id='".$complaintid."'")->result_array();
           // print_r($getpartyid[0]['id_party']);exit;

            $raisecomplaint['complaintdescription']= $complaintdescription;
            $raisecomplaint['complaintid'] =$complaintid;
            $raisecomplaint['companynameval'] =$companynameval;
            $raisecomplaint['nosupdation'] =1;
            $raisecomplaint['complaint_by'] =$_SESSION['username'];
            $raisecomplaint['closed_by'] ='';
            $raisecomplaint['status'] =1;
            $raisecomplaint['complaint_date'] =date('Y-m-d H:i:s');
            $raisecomplaint['resolved_date'] ='';
            $raisecomplaint['resolved_by'] ='';
            $raisecomplaint['complaint_type'] ='Karuppatti';
            $raisecomplaint['party_id']=$getpartyid[0]['id_party'];
           

            $insertraisecomplaint = $this->Raisecomplaint_model->raisecomplaintadd($raisecomplaint);
            if($insertraisecomplaint==1)
            {
                $data['return_code'] =0;
                $data['success_msg'] ='success';

            }
            else
            {
                $data['return_code'] =1;
                $data['error_msg'] ='error';
            }  
        }
        else
        {
            $data['return_code'] =1;
            $data['error_msg'] ='error';
            

        }
        echo json_encode($data);
    }
    public function raisecomplaintupdate(){

        $complaintdescription = $_POST['complaintdesc'];
        $staffpassword        = $_POST['staffpassword'];
        $complaintid          = $_POST['complaintbillno'];

       //print_r($_SESSION);exit;
       $companyname    = $this->db->query("SELECT COMPANYNAME FROM COMPANY where COMPANYCODE='".$_SESSION['COMPANYCODE']."'")->row();
       $companynameval = $_SESSION['COMPANYCODE'];

       $getricecomplaintdetails = $this->Raisecomplaint_model->getricecomplaintdata($complaintid);
       //print_r($getricecomplaintdetails[0]['party_id']);exit;
       
       $action = 'encrypt';
       $encrypt_method = "AES-256-CBC";
       $secret_key = 'AA74CDCC2BBRT935136HH7B63C27'; // user define private key
       $secret_iv = '5fgf5HJ5g27'; // user define secret key
       $key = hash('sha256', $secret_key);
       $iv = substr(hash('sha256', $secret_iv), 0, 16); // sha256 is hash_hmac_algo
       if ($action == 'encrypt') {
            $passvalue = openssl_encrypt($staffpassword, $encrypt_method, $key, 0, $iv);
            $passvalue = base64_encode($passvalue);
        } else if ($action == 'decrypt') {
            $passvalue = openssl_decrypt(base64_decode($staffpassword), $encrypt_method, $key, 0, $iv);
        }

        $passcheck  = $this->Raisecomplaint_model->getpasscheck($passvalue);
        if($passcheck==1)
        {
            $raisecomplaint['complaintdescription']= $complaintdescription;
            $raisecomplaint['complaintid']   =$complaintid;
            $raisecomplaint['updateby']      =$_SESSION['username'];
            $raisecomplaint['party_id']     = $getricecomplaintdetails[0]['party_id'];
            $raisecomplaint['status']         =1;
            $raisecomplaint['createdDate']    =date('Y-m-d H:i:s');
            $raisecomplaint['createdBy']      =$_SESSION['USERID'];
            $raisecomplaint['modifiedBy']     =$_SESSION['USERID'];
            $raisecomplaint['modifiedDate']   =date('Y-m-d H:i:s');
            $raisecomplaint['complaintidval'] = $getricecomplaintdetails[0]['billno'];;
            
            $insertraisecomplaint = $this->Raisecomplaint_model->raisecomplaintupdate($raisecomplaint);
            if($insertraisecomplaint==1)
            {
                $data['return_code'] =0;
                $data['success_msg'] ='success';

            }
            else
            {
                $data['return_code'] =1;
                $data['error_msg'] ='error';
            }  
        }
        else
        {
            $data['return_code'] =1;
            $data['error_msg'] ='error';
            

        }
        echo json_encode($data);
    }
    public function resolvecomplaint()
    {
        $resolveremarks = $_POST['resolveremarks'];
        $staffpassword        = $_POST['staffpassword'];
        $resolvebillid          = $_POST['resolvebillid'];

       //print_r($_SESSION);exit;
       $companyname    = $this->db->query("SELECT COMPANYNAME FROM COMPANY where COMPANYCODE='".$_SESSION['COMPANYCODE']."'")->row();
       $companynameval = $_SESSION['COMPANYCODE'];
       
       $action = 'encrypt';
       $encrypt_method = "AES-256-CBC";
       $secret_key = 'AA74CDCC2BBRT935136HH7B63C27'; // user define private key
       $secret_iv = '5fgf5HJ5g27'; // user define secret key
       $key = hash('sha256', $secret_key);
       $iv = substr(hash('sha256', $secret_iv), 0, 16); // sha256 is hash_hmac_algo
       if ($action == 'encrypt') {
            $passvalue = openssl_encrypt($staffpassword, $encrypt_method, $key, 0, $iv);
            $passvalue = base64_encode($passvalue);
        } else if ($action == 'decrypt') {
            $passvalue = openssl_decrypt(base64_decode($staffpassword), $encrypt_method, $key, 0, $iv);
        }

        $passcheck  = $this->Raisecomplaint_model->getpasscheck($passvalue);
       // print_r($passcheck);exit;
        if($passcheck==1)
        {
            $resolvecomplaint['resolveremarks'] = $resolveremarks;
            $resolvecomplaint['resolvebillid']  = $resolvebillid;
            $resolvecomplaint['resolved_date']  = date('Y-m-d');
            $resolvecomplaint['resolved_by']     = $_SESSION['username'];

          
            
            $insertresolvecomplaint = $this->Raisecomplaint_model->resolvecomplaint($resolvecomplaint);
           // print_r($insertresolvecomplaint);exit;
            if($insertresolvecomplaint==1)
            {
                $data['return_code'] =0;
                $data['success_msg'] ='success';

            }
            else
            {
                $data['return_code'] =1;
                $data['error_msg'] ='error';
            }  
        }
        else
        {
            $data['return_code'] =2;
            $data['error_msg'] ='error';
        }
        echo json_encode($data);
    }
    public function viewraisecomplaint()
    {
        $complaintid = $_POST['complaintID'];
        $partyid = $_POST['partyid'];
        // $partydetails = $this->db->query("SELECT * FROM PARTIES where PID='".$partyid."'")->result_array();
        $rasicomplaintdata = $this->db->query("SELECT * FROM RAISE_COMPLAINT_REPORTS where complaint_UID='".$complaintid."'")->result_array();

        $rasicomplaintdataupdatecount = $this->db->query("SELECT count(complaint_UID) as countnoupdate FROM RAISECOMPLAINT_REMARKS where complaint_UID='".$complaintid."'")->result_array();
      // print_r($rasicomplaintdataupdatecount[0]['countnoupdate']);exit;
        $getcompanyname = $this->db->query("SELECT COMPANYNAME FROM COMPANY where COMPANYCODE='".$rasicomplaintdata[0]['company_name']."'")->row();

        $rc_query_remark = $this->db->query("SELECT RAISECOMPLAINT_REMARKS.*,USERLIST.NAME AS staffname FROM RAISECOMPLAINT_REMARKS LEFT JOIN USERLIST ON USERLIST.USERID=RAISECOMPLAINT_REMARKS.createdBy WHERE RAISECOMPLAINT_REMARKS.complaint_UID='".$complaintid."'")->result_array();


        $rcremarklist='';
        $i=0;
        foreach ($rc_query_remark as $i => $val) {


            $date    = date('d-m-Y',strtotime($val['createdDate']));
            $staff   = $val['staffname'];
            $remark  = $val['update_remarks'];



            $rcremarklist.='  <tr>
                                        <td>'.$date.'</td>
                                        <td class="ple1">'.$staff.'</td>
                                        <td class="ple1">'.$remark.'</td>
                                    </tr>';
          
        $i++; }


       $partydetails = $this->db->query("SELECT * FROM PARTIES WHERE PID='".$partyid."' ")->row();

         $firstname = $partydetails->NAME;
         $lastname  = $partydetails->FATHERSNAME;
         $rating    = $partydetails->RATING;
         $phone     = $partydetails->PHONE;


        if($partydetails->TYPE_OF_RECORD=='O'){
            $CITY=  ($partydetails->CITY=='')?'--':$partydetails->CITY;
        }
        else
        {
            $area_det=$this->db->query("SELECT * FROM CITY WHERE CITYID='".$partydetails->CITY_ID."'")->row();
            $CITY=  $area_det?$area_det->CITYNAME:'-';
        }
        if($partydetails->TYPE_OF_RECORD=='O'){
             $ADDRESS2=($partydetails->ADDRESS2=='')?'--':$partydetails->ADDRESS2;
        }
        else
        {
            $vill_det =$this->db->query("SELECT * FROM VILLAGE WHERE VILLAGEID='".$partydetails->VILLAGE_ID."'")->row();
            $ADDRESS2 = $vill_det?$vill_det->VILLAGENAME:'-';
        }

        if($partydetails->TYPE_OF_RECORD=='O'){
             $ADDRESS1 = ($partydetails->ADDRESS1=='')?'--':$partydetails->ADDRESS1;
        }
        else
        {
            $street_det=$this->db->query("SELECT * FROM STREET WHERE STREETID='".$partydetails->STREET_ID."'")->row();
            $ADDRESS1 =  $street_det?$street_det->STREETNAME:'-';
        }

        $address=$ADDRESS1.', '.$ADDRESS2.', '.$CITY;

        if($partydetails->PHOTO!='')
         {
         $photo='<img src="data:image/jpg;charset=utf8;base64,'.base64_encode($partydetails->PHOTO).'"  height="125px" width="125px">';
         }
         else
         {
          $photo='<img src="'.base_url().'assets/images/party.jpg" height="125px" width="125px" >';
         }



        $getpartydetails =[

            'NAME' =>$firstname,
            'FATHERSNAME' =>$firstname.' '.$lastname,
            'RATING'      =>$rating,
            'ADDRESS'     =>$address,
            'PHONE'       =>$phone,
            'PHOTO'       =>$photo 
        ];

        
        if(!empty($rasicomplaintdata))
        {
            $data['return_code']=0;
            $data['success_msg']='success';
            $data['rasicomplaintdata'] = $rasicomplaintdata;
            $data['partydetails'] = $getpartydetails;
            $data['companyname']=$getcompanyname->COMPANYNAME;
            $data['noupdate']=$rasicomplaintdataupdatecount[0]['countnoupdate'];
            $data['complientremarklist'] = $rcremarklist;
        }
        else
        {
            $data['return_code']=1;
            $data['error_msg']='error';
        }
        echo json_encode($data);
    }
    public function pickcomplaintremarksresolved()
    {

        $resolvepickcomplaintremarks = $_POST['resolvepickcomplaintremarks'];
        $resolveid = $_POST['resolveid'];

        $resolveremarkpickcomplaint['resolvepickcomplaintremarks']=$resolvepickcomplaintremarks;
        $resolveremarkpickcomplaint['resolveid']=$resolveid;

        $updateremarks = $this->Raisecomplaint_model->pickcomplaintresolve($resolveremarkpickcomplaint);

        if($updateremarks==1)
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
    public function viewpicklistcomplaint()
    {
        $picklistcomplaintID = $_POST['picklistcomplaintID'];
        $picklistcomplaintdata = $this->db->query("SELECT * FROM PICK_COMPLAINTREPORTS WHERE pickcomplaint_UID='".$picklistcomplaintID."'")->result_array();
        //print_r($picklistcomplaintdata[0]['companynameval']);exit;
        $partyid = $picklistcomplaintdata[0]['party_id'];
        $companycode = $picklistcomplaintdata[0]['companynameval'];

        $picklistcomplaintdataupdatecount = $this->db->query("SELECT count(pickcomplaint_UID) as countnoupdate FROM PICKCOMPLAINT_REMARKSUPDATE WHERE pickcomplaint_UID='".$picklistcomplaintID."'")->result_array();

        $picklistremarklist_query = $this->db->query("SELECT PICKCOMPLAINT_REMARKSUPDATE.*,USERLIST.NAME AS staffname FROM PICKCOMPLAINT_REMARKSUPDATE LEFT JOIN USERLIST ON USERLIST.USERID=PICKCOMPLAINT_REMARKSUPDATE.createdBy WHERE PICKCOMPLAINT_REMARKSUPDATE.pickcomplaint_UID='".$picklistcomplaintID."'")->result_array();


        $picklistremarklist='';
        $i=0;
        foreach ($picklistremarklist_query as $i => $val) {


            $date    = date('d-m-Y',strtotime($val['createdDate']));
            $staff   = $val['staffname'];
            $remark  = $val['remarksdescription'];



            $picklistremarklist.='  <tr>
                                        <td>'.$date.'</td>
                                        <td class="ple1">'.$staff.'</td>
                                        <td class="ple1">'.$remark.'</td>
                                    </tr>';
          
        $i++; }





        $partydetails = $this->db->query("SELECT * FROM PARTIES WHERE PID='".$partyid."' ")->row();

         $firstname = $partydetails->NAME;
         $lastname  = $partydetails->FATHERSNAME;
         $rating    = $partydetails->RATING;
         $phone     = $partydetails->PHONE;


        if($partydetails->TYPE_OF_RECORD=='O'){
            $CITY=  ($partydetails->CITY=='')?'--':$partydetails->CITY;
        }
        else
        {
            $area_det=$this->db->query("SELECT * FROM CITY WHERE CITYID='".$partydetails->CITY_ID."'")->row();
            $CITY=  $area_det->CITYNAME;
        }
        if($partydetails->TYPE_OF_RECORD=='O'){
             $ADDRESS2=($partydetails->ADDRESS2=='')?'--':$partydetails->ADDRESS2;
        }
        else
        {
            $area_det =$this->db->query("SELECT * FROM VILLAGE WHERE VILLAGEID='".$partydetails->VILLAGE_ID."'")->row();
            $ADDRESS2 = $area_det->VILLAGENAME;
        }

        if($partydetails->TYPE_OF_RECORD=='O'){
             $ADDRESS1 = ($partydetails->ADDRESS1=='')?'--':$partydetails->ADDRESS1;
        }
        else
        {
            $area_det=$this->db->query("SELECT * FROM STREET WHERE STREETID='".$partydetails->STREET_ID."'")->row();
            $ADDRESS1 =  $area_det->STREETNAME;
        }

        $address=$ADDRESS1.', '.$ADDRESS2.', '.$CITY;

        if($partydetails->PHOTO!='')
         {
         $photo='<img src="data:image/jpg;charset=utf8;base64,'.base64_encode($partydetails->PHOTO).'"  height="125px" width="125px">';
         }
         else
         {
          $photo='<img src="'.base_url().'assets/images/party.jpg" height="125px" width="125px" >';
         }



        $getpartydetails =[

            'NAME' =>$firstname,
            'FATHERSNAME' =>$firstname.' '.$lastname,
            'RATING'      =>$rating,
            'ADDRESS'     =>$address,
            'PHONE'       =>$phone,
            'PHOTO'       =>$photo 
        ];


        $getcompanyname = $this->db->query("SELECT COMPANYNAME FROM COMPANY WHERE COMPANYCODE='".$companycode."'")->row();
       // print_r($getcompanyname);exit;
        if(!empty($picklistcomplaintdata))
        {
            $data['return_code']=0;
            $data['success_msg']='success';
            $data['picklistcomplaintdata'] = $picklistcomplaintdata;
            $data['partydetails'] = $getpartydetails;
            $data['companyname']  = $getcompanyname->COMPANYNAME;
            $data['noupdate']     = $picklistcomplaintdataupdatecount[0]['countnoupdate'];
            $data['picklistremarklist'] = $picklistremarklist;

        }
        else
        {
            $data['return_code']=1;
            $data['error_msg']='error';
        }
        echo json_encode($data);

    }
       



}
?>