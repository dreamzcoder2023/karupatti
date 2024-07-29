<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/* ************************************************************************************
		Purpose : To handle all Assetmanagement functions 2024-01-22 By Vasanth
***************************************************************************************/
class Assetmanagement extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model(array("Assetmanagement_model"));
    	$this->load->library('user_agent');
    	if (isset($this->session->userdata['username']) && $this->session->userdata['username'] == TRUE)
        {
            //do something
        }else{
            redirect('login'); //if session is not there, redirect to login page
        } 
		date_default_timezone_set("Asia/Kolkata");
    	$this->session->set_userdata('comtitle', 'Assetmanagement');
	}

    public function index()
    {   

        $data['assetmanagementlist']  = $this->Assetmanagement_model->list();
        $data['assetcategorylist']    = $this->Assetmanagement_model->assetcategorylist();
        $data['grouplist']            = $this->Assetmanagement_model->Group_list();
        $data['assetsubcategorylist'] = $this->Assetmanagement_model->assetsubcategorylist();
        $data['company_list']         = $this->db->query("SELECT * FROM COMPANY WHERE ACTIVE='Y'  ")->result_array();
        $data['staff_list']           = $this->db->query("SELECT * FROM STAFFS  WHERE Status='Y' ORDER BY STAFFNAME ASC")->result_array();

        // print_r($data['grouplist']); exit;

        $this->load->view('assetmanagement/asset_management_list',$data);
    }


    public function assetmanagement_active()

    {
        $id = $this->input->post('id');
        $data['status'] = $this->input->post('status');
        $result = $this->Assetmanagement_model->assetmanagement_active_status($data,$id);

        // print_r($result); exit;
        echo $data['status'];
    } 

    //To save assetmanagement
    public function assetmanagementadd()
    {  



        // $assetimages = $_FILES['assetimage']['name'];

         // print_r($_FILES['upload']['name']);
         // exit;       

        $count = count(array_filter($this->input->post('assetname')));
        // $ext='png';
        for($i=0; $i < $count; $i++) { 
            $last_sid_detail = $this->db->query("SELECT * FROM assetmanagement ORDER BY assetmanagementid DESC")->row();
            if ($last_sid_detail != '') {
                $last_data = $last_sid_detail ? $last_sid_detail->assetmanagementid : 1;
                $year = substr(date("y"), -2);
                $slice = explode("/", $last_data);
                $result = preg_replace('/[^0-9]/', '', $slice[0]);
                if (!function_exists('request_num')) {
                    function request_num($input, $pad_len = 4, $prefix = null) {
                        if (is_string($prefix)) {
                            return sprintf("%s%s", $prefix, str_pad($input, $pad_len, "0", STR_PAD_LEFT));
                        }
                        return str_pad($input, $pad_len, "0", STR_PAD_LEFT);
                    }
                     $request     = request_num(((int)$result + 1), 4, "AST-");
                     $request_id  = $request . '/' . $year;
                     $assetnumber = $request_id;
                }
               
            } else {
                $year = substr(date("y"), -2);
                $assetnumber = 'AST-0001/' . $year;
            }
            $data['assetnumber'] = $assetnumber;

            $imname = $data['assetnumber'];
            $image_name = str_replace("/", "_", $imname);

            $asset_name = $image_name;
            $logos['asset']      = '';
            $logos['warranty']  = '';
                foreach($_FILES['upload']['name'] as $key => $logo){
                    if($logo){
                        $_FILES['file']['name'] = $_FILES['upload']['name'][$key][$i];
                        $_FILES['file']['type'] = $_FILES['upload']['type'][$key][$i];
                        $_FILES['file']['tmp_name'] = $_FILES['upload']['tmp_name'][$key][$i];
                        $_FILES['file']['error'] = $_FILES['upload']['error'][$key][$i];
                        $_FILES['file']['size'] = $_FILES['upload']['size'][$key][$i];

                        $extent = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);

                        $config['upload_path']   = 'assets/images/assetimages/'.$key; 
                        $config['allowed_types'] = 'jpg|jpeg|png';
                        $config['max_size']      = '50000';
                        $config['file_name']     = $key.$asset_name;

                        $old_logo_path = 'assets/images/assetimages/'.$key.'/'.$key.$asset_name.'.'.$extent; 

                        if (file_exists($old_logo_path)) {
                            unlink($old_logo_path);
                        }


                        $this->load->library('upload', $config); 
                        $this->upload->initialize($config); 

                        if($this->upload->do_upload('file')){ 

                            $logos[$key] =  $key.$asset_name.'.'.$extent; 
                            
                        }   

                       // print_r($logos[$key]);

                    }   
                

                }

                $sub_id = $this->input->post('subcatory_id')[$i];
                $category = $this->db->query("SELECT * FROM assetsubcategory WHERE assetsubcategoryid='".$sub_id."'  ")->row();
                if ($category != '') {
                    $cat = $category->assetcategoryid; // Corrected variable name
                } else {
                    $cat = '';
                }
                               $datas['assetdate']              = date('Y-m-d',strtotime($this->input->post('asset_date')));
                               $datas['companycode']            = $this->input->post('assetcompany');
                               $datas['purchasedate']           = date('Y-m-d',strtotime($this->input->post('asset_pur_date_add')[$i]));
                               $datas['assetnumber']            = $data['assetnumber'];
                               $datas['assetcategoryid']        = $cat;
                               $datas['assetsubcategoryid']     = $this->input->post('subcatory_id')[$i];
                               $datas['assetname']              = $this->input->post('assetname')[$i];
                               $datas['assetvalue']             = $this->input->post('assetvalue')[$i];
                               $datas['allocatedtype']          = $this->input->post('atypechange')[$i];
                               $datas['allocatedtocompany']     = $this->input->post('assetallcompany')[$i];
                               $datas['allocatedtostaff']       = $this->input->post('assetallstaff')[$i];
                               $datas['assetperiod']            = $this->input->post('assetperiod')[$i];
                               $datas['assetduration']          = $this->input->post('assetduration')[$i];
                               $datas['assetimage']             = $logos['asset'];
                               $datas['assetwarranty']          = $logos['warranty'];
                               $datas['issuedescription']       = '';
                               $datas['maintenacedescription']  = '';
                               $datas['assetdescription']       = $this->input->post('remarks')[$i];
                               $datas['created_on']             = date('Y-m-d H:i:s');
                               $datas['created_by']             = $_SESSION['username'];
                               $datas['status']                = 1;
                           
                        $result = $this->db->insert('assetmanagement',$datas);
                        // $result = $this->Assetmanagement_model->add($data); 
            }       
        

          // exit;
        if($result)
        {
            $this->session->set_flashdata('g_success', 'Asset  have been Added successfully...');
        }
        else{
            $this->session->set_flashdata('g_err', 'Could not add Asset  details!');
        }
        redirect('Assetmanagement');
    }
    public function warrantyupload($file, $image_name,$count) {


        $config[]=[''];

        $this->load->library('upload', '');
       
        for ($i=0; $i < $count; $i++) { 

            // $file = $_FILES['warranty'];
            if ($file != '') 
            {
                //     $_FILES['file']['name'] = $_FILES['warranty']['name'][$i];
                //     $_FILES['file']['type'] = $_FILES['warranty']['type'][$i];
                //     $_FILES['file']['tmp_name'] = $_FILES['warranty']['tmp_name'][$i];
                //     $_FILES['file']['error'] = $_FILES['warranty']['error'][$i];
                //     $_FILES['file']['size'] = $_FILES['warranty']['size'][$i];
                //     $ext = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
                //     // $config['upload_path'] = 'assets/images/assetimages/second_folder/';
                //     $config['upload_path'] = 'assets/images/assetimage/warranty/';
                //     $config['allowed_types'] = 'jpg|jpeg|png|gif';
                //     $config['max_size'] = '500000';
                //     $config['file_name'] = $image_name . '_ASTWAR_IMAGE';

                //     $this->load->library('upload', $config);

                //     if ($this->upload->do_upload('file')) {
                //         $uploadData = $this->upload->data();
                //         $filename = $uploadData['file_name'];
                //         $data['totalFiles'] = $filename;
                //     }

                //     $warranty = $image_name . '_ASTWAR_IMAGE' . "." . $ext;
                // } 
                // else {
                //     $warranty = '';
                // }

                // Second Image Upload
                if ($_FILES['warranty']['name'][$i] != '') {
                    $_FILES['file']['name'] = $_FILES['warranty']['name'][$i];
                    $_FILES['file']['type'] = $_FILES['warranty']['type'][$i];
                    $_FILES['file']['tmp_name'] = $_FILES['warranty']['tmp_name'][$i];
                    $_FILES['file']['error'] = $_FILES['warranty']['error'][$i];
                    $_FILES['file']['size'] = $_FILES['warranty']['size'][$i];


                    $ext = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
                    $config['upload_path'] = 'assets/images/assetimage/warranty/'; // Change this to the desired folder path
                    $config['allowed_types'] = 'jpg|jpeg|png|gif';
                    $config['max_size'] = '500000';
                    $config['file_name'] = $image_name . '_ASTWAR_IMAGE';


                    // print_r($config);
                    // print_r($this->load->library(1));
                    // file_exists($this->load->library('upload', $config));

                    $this->load->library('upload', $config);

                    // print_r($this->upload->do_upload('file')); 


                    if ($this->upload->do_upload('file')) {
                        $uploadData = $this->upload->data();
                        $filename = $uploadData['file_name'];

                        $data['totalFiles'] = $filename;

                    }
                    $warranty = $image_name . '_ASTWAR_IMAGE' . "." . $ext;
                } else {
                    $warranty = '';
                }

                // exit;
                return $warranty;
            }
    }
}
    
    //Assetmanagement Edit
        public function edit()
        {   

            $id = $_POST['id'];
            $data['edit'] = $this->Assetmanagement_model->editdata($id);   
            $data['assetcategorylist']    = $this->Assetmanagement_model->assetcategorylist();        

            $this->load->view('assetmanagement/assetmanagement_edit',$data);
        }    

    //To update assetmanagement
    public function update()
    {     

                      
        $data['assetmanagementid']     = $this->input->post('edit_id');
        $data['assetcategoryid']        = $this->input->post('assetcategoryid_edit');        
        $data['assetmanagementname']   = $this->input->post('assetmanagementname_edit');        
        $data['modified_on']   = date('Y-m-d H:i:s');
        $data['modified_by']   = $_SESSION['username'];        
        
        $result = $this->Assetmanagement_model->update($data);

        if($result)
        {
            $this->session->set_flashdata('g_success', 'Asset Sub category have been Updated successfully...');
        }else{
           $this->session->set_flashdata('g_err', 'Could not update Asset Sub category details!');
        }
        redirect('Assetmanagement');
    }

   

    //Assetmanagement view
    public function view()
    {   
        $pid      = $_GET['id'];
        $data     = $this->Assetmanagement_model->viewdata($pid);
        echo json_encode($data[0]);    
    }
    public function tableview()
    {   
        $pid      = $_POST['id'];
        $view     = $this->Assetmanagement_model->history($pid);


        $assetiage_url =  base_url().'assets/images/assetimages/asset/'. $view->assetimage; 
        if($assetiage_url && $view->assetimage!=''){

           $assetimg = '<a class="d-block overlay" target="_blank" href="'.$assetiage_url.'" data-fslightbox="lightbox-basic">
                <!--begin::Image-->
                <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-roundedw-50px h-50px w-50px"
                style="background-image:url('.$assetiage_url.')">
                </div>
                 <div class="overlay-layer card-rounded bg-dark bg-opacity-25 shadow w-50px h-50px">
                    <i class="bi bi-eye-fill text-white fs-2"></i>
                </div>
            </a>';
        }else{
        $assetiage_url =  base_url().'assets/images/asset.jpg'; 
          $assetimg  = ' <a class="d-block overlay"  href="'.$assetiage_url.'">
                        <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-roundedw-50px h-50px w-50px"
                        style="background-image:url('.$assetiage_url.')">
                        </div>
                        <div class="overlay-layer card-rounded bg-dark bg-opacity-25 shadow w-50px h-50px">
                        <i class="bi bi-eye-fill text-white fs-2"></i>
                        </div>
                    </a>';
        }
        $image_urls =  base_url().'assets/images/assetimages/warranty/'. $view->assetwarranty; 
        if($image_urls && $view->assetwarranty!=''){

           $war = '<a class="d-block overlay" target="_blank" href="'.$image_urls.'" data-fslightbox="lightbox-basic">
                <!--begin::Image-->
                <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-roundedw-50px h-50px w-50px"
                style="background-image:url('.$image_urls.')">
                </div>
                 <div class="overlay-layer card-rounded bg-dark bg-opacity-25 shadow w-50px h-50px">
                    <i class="bi bi-eye-fill text-white fs-2"></i>
                </div>
            </a>';
        }else{
        $image_url =  base_url().'assets/images/asset.jpg'; 
          $war  = ' <a class="d-block overlay"  href="'.$image_url.'">
                        <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-roundedw-50px h-50px w-50px"
                        style="background-image:url('.$image_url.')">
                        </div>
                        <div class="overlay-layer card-rounded bg-dark bg-opacity-25 shadow w-50px h-50px">
                        <i class="bi bi-eye-fill text-white fs-2"></i>
                        </div>
                    </a>';
        }

        if ($view->allocatedtype==1) 
        {
            $type = 'Company'; 
        }
        else 
        { 
            $type = 'Staff' ;
        }

        if ($view->allocatedtype==1) {
           $place = $view->allocatedtocompany; 
        } 
        else 
        { 
            if (isset($view->allocatedtostaff)){
                $staff  = $this->db->query("SELECT * FROM STAFFS WHERE SNO='". $view->allocatedtostaff."' ")->row();

                    if(isset($staff)){
                        $place = $staff->STAFFNAME?$staff->STAFFNAME:'-';
                    }else{
                        $place = '-';
                    }

            }else{
                $place = '-';
            }
        }

        $date_format  = $this->db->query("SELECT * FROM general_settings ")->row();
        $format= $date_format->date_format;
        $date = date("$format", strtotime($view->purchasedate));
        $cat = $view->assetcategoryname?$view->assetcategoryname:'-';
        $subcat = $view->assetsubcategoryname?$view->assetsubcategoryname:'-';
        $asset = $view->assetname?$view->assetname:'-';

        $per = $view->assetperiod?$view->assetperiod:'-';
        $dur = $view->assetduration?$view->assetduration:'-';
        $remark = $view->assetdescription?$view->assetdescription:'-';

        if ($dur==1) {
           $durat = $per.' Month';
        }else{
           $durat = $per.' year';
        }

        $row = ' <tr>
                    <td class="ple1">'.$date.'</td>
                    <td class="ple1">'.$cat.'</td>
                    <td class="ple1">'.$subcat.'</td>
                    <td class="ple1">'.$asset.'</td>
                    <td class="ple1">'.number_format($view->assetvalue,2,'.',',').'</td>
                    <td class="ple1">'.$type.'</td>
                    <td class="ple1">'.$place.'</td>
                    <td class="ple1">'.$durat.'</td>
                    <td>'.$assetimg.'</td>
                    <td>'.$war.'</td>                    
                    <td class="ple1">'.$remark.'</td>
                </tr>';
        // print_r($view); exit;
        echo $row;
    }  

       

    //Assetmanagement History
        public function assetmanagementhistory($id)
        {   
           
            $data['view']         = $this->Assetmanagement_model->history($id);
            $data['history_list'] = $this->Assetmanagement_model->history_list($id);

            // print_r($data); 
            // exit();
            $this->load->view('assetmanagement/asset_management_history',$data);
           
        }  
   

    // To Working Status Change

    public function working(){

        $id             = $_POST['id'];
        $data['status'] = 1;
        $statusupdate   = $this->db->query("UPDATE assetmanagement SET status = '".$data['status']."' WHERE assetmanagementid = '".$id."'");

        echo $statusupdate;
        if ($statusupdate) {
            $this->session->set_flashdata('g_success', 'Asset working well has been Added successfully.');
        }
        else{
            $this->session->set_flashdata('g_err', 'Something went wrong');
        }
    }

     // To give maintenance

    public function givemaintenance(){

        $id             = $_POST['id'];
        $text           = $_POST['text'];
        $data['status'] = 2;
        $data['desc']   = $text;
        $data['created_on']            = date('Y-m-d H:i:s');
        $data['created_by']            = $_SESSION['username'];

        $statusupdate   = $this->db->query("UPDATE assetmanagement SET status = '2' WHERE assetmanagementid = '".$id."'");
        if ($statusupdate) {
            
            $historyins = $this->db->query("
                                    INSERT INTO assetmanagement_history (
                                        assetmanagementid,
                                        issue,
                                        issuedescription,
                                        status,
                                        created_on,
                                        created_by
                                    )
                                    VALUES (
                                        '".$id."',
                                        'Maintenance',                                        
                                        '".$data['desc']."',
                                        '".$data['status']."',
                                        '".$data['created_on']."',
                                        '".$data['created_by']."'
                                    )
                                ");
        }
        echo $statusupdate;
        if ($statusupdate) {
            $this->session->set_flashdata('g_success', 'Asset Damage has been Added successfully.');
        }
        else{
            $this->session->set_flashdata('g_err', 'Something went wrong');
        }
    }

    // To repair Status Change

    public function repair(){

        $id             = $_POST['id'];
        $text           = $_POST['text'];
        $data['status'] = 3;
        $data['desc']   = $text;
        $data['created_on']            = date('Y-m-d H:i:s');
        $data['created_by']            = $_SESSION['username'];

        $statusupdate   = $this->db->query("UPDATE assetmanagement SET status = '".$data['status']."', issuedescription='".$data['desc']."' WHERE assetmanagementid = '".$id."'");

        if ($statusupdate) {
            
            $historyins = $this->db->query("
                                    INSERT INTO assetmanagement_history (
                                        assetmanagementid,
                                        issue,
                                        issuedescription,
                                        status,
                                        created_on,
                                        created_by
                                    )
                                    VALUES (
                                        '".$id."',
                                        'Repair',                                        
                                        '".$data['desc']."',
                                        '".$data['status']."',
                                        '".$data['created_on']."',
                                        '".$data['created_by']."'
                                    )
                                ");
        }
        echo $statusupdate;
        if ($statusupdate) {
            $this->session->set_flashdata('g_success', 'Asset Repair has been Added successfully.');
        }
        else{
            $this->session->set_flashdata('g_err', 'Something went wrong');
        }
    }
    // To damage Status Change

    public function damage(){

        $id             = $_POST['id'];
        $text           = $_POST['text'];
        $data['status'] = 4;
        $data['desc']   = $text;
        $data['created_on']            = date('Y-m-d H:i:s');
        $data['created_by']            = $_SESSION['username'];

        $statusupdate   = $this->db->query("UPDATE assetmanagement SET status = '".$data['status']."', issuedescription='".$data['desc']."' WHERE assetmanagementid = '".$id."'");

        if ($statusupdate) {
            
            $historyins = $this->db->query("
                                    INSERT INTO assetmanagement_history (
                                        assetmanagementid,
                                        issue,
                                        issuedescription,
                                        status,
                                        created_on,
                                        created_by
                                    )
                                    VALUES (
                                        '".$id."',
                                        'Damage',                                        
                                        '".$data['desc']."',
                                        '".$data['status']."',
                                        '".$data['created_on']."',
                                        '".$data['created_by']."'
                                    )
                                ");
        }
        echo $statusupdate;
        if ($statusupdate) {
            $this->session->set_flashdata('g_success', 'Asset Damage has been Added successfully.');
        }
        else{
            $this->session->set_flashdata('g_err', 'Something went wrong');
        }
    }   

     // To needchange Status Change

    public function needchange(){

        $id             = $_POST['id'];
        $text           = $_POST['text'];
        $data['status'] = 5;
        $data['desc']   = $text;
        $data['created_on']            = date('Y-m-d H:i:s');
        $data['created_by']            = $_SESSION['username'];

        $statusupdate   = $this->db->query("UPDATE assetmanagement SET status = '".$data['status']."', issuedescription='".$data['desc']."' WHERE assetmanagementid = '".$id."'");

        if ($statusupdate) {
            
            $historyins = $this->db->query("
                                    INSERT INTO assetmanagement_history (
                                        assetmanagementid,
                                        issue,
                                        issuedescription,
                                        status,
                                        created_on,
                                        created_by
                                    )
                                    VALUES (
                                        '".$id."',
                                        'Need To Change',                                        
                                        '".$data['desc']."',
                                        '".$data['status']."',
                                        '".$data['created_on']."',
                                        '".$data['created_by']."'
                                    )
                                ");
        }
        echo $statusupdate;
        if ($statusupdate) {
            $this->session->set_flashdata('g_success', 'Asset need to change has been Added successfully.');
        }
        else{
            $this->session->set_flashdata('g_err', 'Something went wrong');
        }
    }

    // To dead Status Change

    public function dead(){

        $id             = $_POST['id'];
        $text           = $_POST['text'];
        $data['status'] = 6;
        $data['desc']   = $text;
        $data['created_on']            = date('Y-m-d H:i:s');
        $data['created_by']            = $_SESSION['username'];

        $statusupdate   = $this->db->query("UPDATE assetmanagement SET status = '".$data['status']."', issuedescription='".$data['desc']."' WHERE assetmanagementid = '".$id."'");

        if ($statusupdate) {
            
            $historyins = $this->db->query("
                                    INSERT INTO assetmanagement_history (
                                        assetmanagementid,
                                        issue,
                                        issuedescription,
                                        status,
                                        created_on,
                                        created_by
                                    )
                                    VALUES (
                                        '".$id."',
                                        'Dead',                                        
                                        '".$data['desc']."',
                                        '".$data['status']."',
                                        '".$data['created_on']."',
                                        '".$data['created_by']."'
                                    )
                                ");
        }
        echo $statusupdate;
        if ($statusupdate) {
            $this->session->set_flashdata('g_success', 'Asset Dead has been Added successfully.');
        }
        else{
            $this->session->set_flashdata('g_err', 'Something went wrong');
        }
    }

     //To Delete Assetmanagement

    public function delete()
    { 
        $id=$_POST['id'];

        // $result = $this->Assetmanagement_model->assetmanagement_delete($bid);
        $result   = $this->db->query("UPDATE assetmanagement SET status = 0 WHERE assetmanagementid = '".$id."'");

        echo $result;
        if ($result) {
            $this->session->set_flashdata('g_success', 'Asset has been Deleted successfully.');
        }
        else{
            $this->session->set_flashdata('g_err', 'Something went wrong');
        }
    }

    //To print single Assetmanagement

    public function printsingle($id)
    { 
        // $id=$_POST['id'];
        $data['print']     = $this->Assetmanagement_model->history($id);
        $this->load->view('assetmanagement/asset_management_printsingle',$data);
        
    }

    //To print MULTIPLE Assetmanagement

    public function printmulitple()
    { 
        // $id=$_POST['id'];
        
        $print_count = $this->input->post('print_count')?$this->input->post('print_count'):0;
        $checked     = $this->input->post('checked');
        // print_r($checked); 
            $data['print_list'] = [];
            $print='';
            $i=0;
            if (isset($checked)) {
                foreach ($checked as $i => $val) {
                    if(isset($checked[$i])){
                       
                       $data['print_list'][] = $val; 
                    }
                    $i++;
                }
            }
        $this->load->view('assetmanagement/asset_management_printmultiple',$data);
        
    }

    // *******************************************repairmaintenance*************************************//

    public function repairmaintenance()
    {   

        $data['assetmanagementlist']  = $this->Assetmanagement_model->list_re_main();
        // $data['assetcategorylist']    = $this->Assetmanagement_model->assetcategorylist();
        // $data['grouplist']            = $this->Assetmanagement_model->Group_list();
        // $data['assetsubcategorylist'] = $this->Assetmanagement_model->assetsubcategorylist();
        // $data['company_list']         = $this->db->query("SELECT * FROM COMPANY WHERE ACTIVE='Y'  ")->result_array();
        // $data['staff_list']           = $this->db->query("SELECT * FROM STAFFS  WHERE Status='Y' ORDER BY STAFFNAME ASC")->result_array();

        $this->load->view('assetmanagement/repairmaintenance_list',$data);
    }


     // To Working Status Change

    public function rmworking(){

        $id             = $_POST['id'];
        $text           = $_POST['text'];
        $historyid      = $_POST['historyid'];
        $data['status'] = 1;
        $data['desc']   = $text;
        $data['created_on']  = date('Y-m-d H:i:s');
        $data['created_by']  = $_SESSION['username'];
        $statusupdate   = $this->db->query("UPDATE assetmanagement SET status = '".$data['status']."',maintenacedescription='".$data['desc']."' WHERE assetmanagementid = '".$id."'");
        if ($statusupdate) {            
            $historyins = $this->db->query("
                                    UPDATE assetmanagement_history SET status = '".$data['status']."' , remarks='".$data['desc']."', modified_by='".$data['created_by']."', modified_on='".$data['created_on']."'  WHERE assetmanagement_historyid = '".$historyid."'
                                ");
        }
        echo $statusupdate;
        if ($statusupdate) {
            $this->session->set_flashdata('g_success', 'Asset working well has been Added successfully.');
        }
        else{
            $this->session->set_flashdata('g_err', 'Something went wrong');
        }
    }

     // To give maintenance

    public function rmgivemaintenance(){

        $id             = $_POST['id'];
        $text           = $_POST['text'];
        $historyid      = $_POST['historyid'];

        $data['status'] = 2;
        $data['desc']   = $text;
        $data['created_on']            = date('Y-m-d H:i:s');
        $data['created_by']            = $_SESSION['username'];

        $statusupdate   = $this->db->query("UPDATE assetmanagement SET status = '".$data['status']."',maintenacedescription='".$data['desc']."' WHERE assetmanagementid = '".$id."'");
        if ($statusupdate) {            
            $historyins = $this->db->query("
                                    UPDATE assetmanagement_history SET status = '".$data['status']."' , remarks='".$data['desc']."', modified_by='".$data['created_by']."', modified_on='".$data['created_on']."'  WHERE assetmanagement_historyid = '".$historyid."'
                                ");
        }
        echo $statusupdate;
        if ($statusupdate) {
            $this->session->set_flashdata('g_success', 'Asset Damage has been Added successfully.');
        }
        else{
            $this->session->set_flashdata('g_err', 'Something went wrong');
        }
    }

    // To repair Status Change

    public function rmrepair(){

        $id             = $_POST['id'];
        $text           = $_POST['text'];
        $historyid      = $_POST['historyid'];
        $data['status'] = 3;
        $data['desc']   = $text;
        $data['created_on']            = date('Y-m-d H:i:s');
        $data['created_by']            = $_SESSION['username'];

        $statusupdate   = $this->db->query("UPDATE assetmanagement SET status = '".$data['status']."',maintenacedescription='".$data['desc']."' WHERE assetmanagementid = '".$id."'");
        if ($statusupdate) {            
            $historyins = $this->db->query("
                                    UPDATE assetmanagement_history SET status = '".$data['status']."' , remarks='".$data['desc']."', modified_by='".$data['created_by']."', modified_on='".$data['created_on']."'  WHERE assetmanagement_historyid = '".$historyid."'
                                ");
        }
        if ($statusupdate) {
            $this->session->set_flashdata('g_success', 'Asset Repair has been Added successfully.');
        }
        else{
            $this->session->set_flashdata('g_err', 'Something went wrong');
        }
    }
    // To damage Status Change

    public function rmdamage(){

        $id             = $_POST['id'];
        $text           = $_POST['text'];
        $historyid      = $_POST['historyid'];
        $data['status'] = 4;
        $data['desc']   = $text;
        $data['created_on']            = date('Y-m-d H:i:s');
        $data['created_by']            = $_SESSION['username'];

        $statusupdate   = $this->db->query("UPDATE assetmanagement SET status = '".$data['status']."',maintenacedescription='".$data['desc']."' WHERE assetmanagementid = '".$id."'");
        if ($statusupdate) {            
            $historyins = $this->db->query("
                                    UPDATE assetmanagement_history SET status = '".$data['status']."' , remarks='".$data['desc']."', modified_by='".$data['created_by']."', modified_on='".$data['created_on']."'  WHERE assetmanagement_historyid = '".$historyid."'
                                ");
        }
        if ($statusupdate) {
            $this->session->set_flashdata('g_success', 'Asset Damage has been Added successfully.');
        }
        else{
            $this->session->set_flashdata('g_err', 'Something went wrong');
        }
    }   

     // To needchange Status Change

    public function rmneedchange(){

        $id             = $_POST['id'];
        $text           = $_POST['text'];
        $historyid      = $_POST['historyid'];
        $data['status'] = 5;
        $data['desc']   = $text;
        $data['created_on']            = date('Y-m-d H:i:s');
        $data['created_by']            = $_SESSION['username'];

        $statusupdate   = $this->db->query("UPDATE assetmanagement SET status = '".$data['status']."',maintenacedescription='".$data['desc']."' WHERE assetmanagementid = '".$id."'");
        if ($statusupdate) {            
            $historyins = $this->db->query("
                                    UPDATE assetmanagement_history SET status = '".$data['status']."' , remarks='".$data['desc']."', modified_by='".$data['created_by']."', modified_on='".$data['created_on']."'  WHERE assetmanagement_historyid = '".$historyid."'
                                ");
        }
        if ($statusupdate) {
            $this->session->set_flashdata('g_success', 'Asset need to change has been Added successfully.');
        }
        else{
            $this->session->set_flashdata('g_err', 'Something went wrong');
        }
    }

    // To dead Status Change

    public function rmdead(){

        $id             = $_POST['id'];
        $text           = $_POST['text'];
        $historyid      = $_POST['historyid'];
        $data['status'] = 6;
        $data['desc']   = $text;
        $data['created_on']            = date('Y-m-d H:i:s');
        $data['created_by']            = $_SESSION['username'];

        $statusupdate   = $this->db->query("UPDATE assetmanagement SET status = '".$data['status']."',maintenacedescription='".$data['desc']."' WHERE assetmanagementid = '".$id."'");
        if ($statusupdate) {            
            $historyins = $this->db->query("
                                    UPDATE assetmanagement_history SET status = '".$data['status']."' , remarks='".$data['desc']."', modified_by='".$data['created_by']."', modified_on='".$data['created_on']."'  WHERE assetmanagement_historyid = '".$historyid."'
                                ");
        }
        if ($statusupdate) {
            $this->session->set_flashdata('g_success', 'Asset Dead has been Added successfully.');
        }
        else{
            $this->session->set_flashdata('g_err', 'Something went wrong');
        }
    }


   
    

}
?>