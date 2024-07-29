<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/* ************************************************************************************
        Purpose : To handle all Gallery functions 2022-08-19
***************************************************************************************/
class Gallery extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        // $this->load->model(array("jst_inventory_model","Accountsgroup_model"));
        // $this->load->library('user_agent');
        // $fin_year=$this->Accountsgroup_model->get_fin_years_list();
        // $db=substr($fin_year->DBNAME,0,strlen($fin_year->DBNAME)-4);
        // $db_user=$fin_year->USERNAME?$fin_year->USERNAME:'';
        // $db_pass=$fin_year->PASSWORD?$fin_year->PASSWORD:'';
        // // echo $db;exit;
        // $config_app = switch_db_dynamic($db,$db_user,$db_pass);
        
        // $this->jst_inventory_model->other_db = $this->load->database($config_app,TRUE);

        if (isset($this->session->userdata['username']) && $this->session->userdata['username'] == TRUE)
        {
        //do something
        }else{
            redirect('login'); //if session is not there, redirect to login page
        } 
        date_default_timezone_set("Asia/Kolkata");
        $this->session->set_userdata('comtitle','Gallery');

    }

    public function index()

    {

        $data['items'] = $this->input->post('item');
        if($data['items']!=''){
            $data['item_detail'] = $data['items'];
        $item_id =" AND GALLERY_MASTER.itemid='".$data['item_detail']."'";
        
        }
        else{
            $item_id ='';
        }

        $data['subitems'] = $this->input->post('subitem');
        if($data['subitems']!=''){
        $subitem_id =" AND GALLERY_MASTER.subitemid='".$data['subitems']."'";        
        }
        else{
            $subitem_id ='';
        }


        // $data['gold_item']    = $this->db->query("SELECT * FROM ITEMS  WHERE  jewel_type_id='1' ")->result_array();
        // $data['silver_item']  = $this->db->query("SELECT * FROM ITEMS  WHERE  jewel_type_id='2' ")->result_array();  

        $data['item']         = $this->db->query("SELECT * FROM ITEMS WHERE STATUS='Y' AND ITEMNAME!=''  ")->result_array(); 
        $data['subitem']      = $this->db->query("SELECT * FROM SUBITEM_LIST WHERE status='Y' ")->result_array(); 

        $data['gallery']      = $this->db->query("SELECT GALLERY_MASTER.*, ITEMS.ITEMNAME AS itemname, 
                                                    SUBITEM_LIST.SUBITEM_NAME AS subitemname 
                                                    FROM GALLERY_MASTER 
                                                    LEFT JOIN ITEMS ON ITEMS.SNO = GALLERY_MASTER.itemid 
                                                    LEFT JOIN SUBITEM_LIST ON SUBITEM_LIST.SUB_ID = GALLERY_MASTER.subitemid 
                                                    WHERE GALLERY_MASTER.status='1' $item_id $subitem_id  ")->result_array();
        // $data['subitem']      = $this->db->query("SELECT * FROM SUBITEM_LIST WHERE status='Y' $item_id $subitem_id ")->result_array();
        $this->load->view('gallery/gallery',$data);

    }
     public function gallery_images($id)
    {
     
        $data['subitem'] = $this->db->query("SELECT * FROM SUBITEM_LIST WHERE status='Y' AND SUB_ID='".$id."'  ")->result_array();
        $this->load->view('gallery/gallery_images',$data);
    }

    public function get_subitem()
    {
        $type  = $_POST['typeid'];
        $subid = $_POST['sub_id'];
        $typelist = $this->db->query("SELECT * FROM SUBITEM_LIST WHERE item_id='".$type."'  ")->result_array();
        $option   = '<option value="">All</option>';
        foreach ($typelist as $tlist) {
            if ($tlist['SUB_ID'] == $subid) {
                $val = 'selected';
            } else {
                $val = '';
            }
            $option .= '<option value="' . $tlist['SUB_ID'] . '" ' . $val . '>' . $tlist['SUBITEM_NAME'] . '</option>';
        }
        echo $option;       
    }

    // ************************ gallery list developed by vasanth 05/02/2024************************
    public function gallerylist()

    {

        $data['item'] = $this->input->post('item');
        if($data['item']!=''){
            $data['item_detail']=explode('_',$data['item']);
        $item_id =" AND item_id='".$data['item_detail'][1]."'";
        
        }
        else{
            $item_id ='';
        }

        $data['subitem'] = $this->input->post('subitem');
        if($data['subitem']!=''){
        $subitem_id =" AND SUB_ID='".$data['subitem']."'";
        
        }
        else{
            $subitem_id ='';
        }

        // ORDER BY ITEMNAME ASC //
        $data['item']         = $this->db->query("SELECT * FROM ITEMS WHERE STATUS='Y' AND ITEMNAME!=''  ")->result_array(); 
        $data['subitem']      = $this->db->query("SELECT * FROM SUBITEM_LIST WHERE status='Y' ")->result_array();
        $data['gallerylist']  = $this->db->query("  SELECT GALLERY_MASTER.*, ITEMS.ITEMNAME AS itemname, 
                                                    SUBITEM_LIST.SUBITEM_NAME AS subitemname 
                                                    FROM GALLERY_MASTER 
                                                    LEFT JOIN ITEMS ON ITEMS.SNO = GALLERY_MASTER.itemid 
                                                    LEFT JOIN SUBITEM_LIST ON SUBITEM_LIST.SUB_ID = GALLERY_MASTER.subitemid 
                                                    WHERE GALLERY_MASTER.status <= 1")->result_array();


        $this->load->view('gallery/gallery_list',$data);

    }


    public function active_unactive()

    {
        $id = $this->input->post('id');
        $data['status'] = $this->input->post('status');
         $result = $this->db->query("UPDATE GALLERY_MASTER SET status = '".$data['status']."' WHERE gallery_master_id = '".$id."'");

        // print_r($result); exit;
        echo $data['status'];
    } 

    

    public function subitemdropdown()
    {
        $type = $_POST['typeid'];
        $typelist=$this->db->query("SELECT * FROM SUBITEM_LIST WHERE item_id='".$type."'  ")->result_array();
        $option = '<option value="">Select</option>';
        foreach($typelist as $tlist)
        {
            $option.='<option value="'.$tlist['SUB_ID'].'">'.$tlist['SUBITEM_NAME'].'</option>';
        }
        echo $option;        
    }

   

    

    public function add(){


        // print_r('sdcsdsds');
        $data['itemid']     = $this->input->post('itemname');
        $data['subitemid']  = $this->input->post('subitemname');
        $data['created_on'] = date('Y-m-d H:i:s');
        $data['created_by'] = $_SESSION['username'];
        $data['status']     = 1;

        if($_FILES['itemimage']['name']!=''){


            $_FILES['file']['name'] = $_FILES['itemimage']['name'];
            $_FILES['file']['type'] = $_FILES['itemimage']['type'];
            $_FILES['file']['tmp_name'] = $_FILES['itemimage']['tmp_name'];
            $_FILES['file']['error'] = $_FILES['itemimage']['error'];
            $_FILES['file']['size'] = $_FILES['itemimage']['size'];
            $ext = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
            $config['upload_path'] = 'assets/gallery'; 
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $config['max_size'] = '50000';
            $config['file_name'] = $data['itemid'].'_'.$data['subitemid'].'_ITEM_IMAGE';
     
            $this->load->library('upload',$config); 
      
            if($this->upload->do_upload('file')){
              $uploadData = $this->upload->data();
              $filename = $uploadData['file_name'];     
              $data['totalFiles'] = $filename;
          }

            $data['itemimage'] = $data['itemid'].'_'.$data['subitemid'].'_ITEM_IMAGE'.".".$ext;
         }else{

            $data['itemimage'] = '';
         }
        
       
        $this->db->reconnect();
        $result = $this->db->query("
                                    INSERT INTO GALLERY_MASTER (
                                        itemid,
                                        subitemid,
                                        itemimage,
                                        status,
                                        created_on,
                                        created_by
                                    )
                                    VALUES (
                                        '".$data['itemid']."',
                                        '".$data['subitemid']."',
                                        '".$data['itemimage']."',
                                        '".$data['status']."',
                                        '".$data['created_on']."',
                                        '".$data['created_by']."'
                                    )
                                ");
        save_query_in_log();
        $this->db->close();

        if($result)
        {
            $this->session->set_flashdata('g_success', 'Gallery have been Added successfully...');
        }else{
            $this->session->set_flashdata('g_err', 'Could not add Gallery details!');
        }
        redirect('Gallery/gallerylist');

    }

    public function edit()
    {   

        $id = $_POST['id'];
        $data['edit'] = $this->db->query("SELECT * FROM GALLERY_MASTER WHERE gallery_master_id='".$id."' ")->row();
        $data['item']=  $this->db->query("SELECT * FROM ITEMS WHERE STATUS='Y' AND ITEMNAME!=''")->result_array(); 
        $data['subitem']      = $this->db->query("SELECT * FROM SUBITEM_LIST WHERE status='Y' ")->result_array();


        $this->load->view('gallery/gallery_edit',$data);
    }

    public function subitemdropdownedit()
    {
        $type  = $_POST['typeid'];
        $subid = $_POST['sub_id'];
        $typelist = $this->db->query("SELECT * FROM SUBITEM_LIST WHERE item_id='".$type."'  ")->result_array();
        $option   = '<option value="">Select</option>';
        foreach ($typelist as $tlist) {
            if ($tlist['SUB_ID'] == $subid) {
                $val = 'selected';
            } else {
                $val = '';
            }
            $option .= '<option value="' . $tlist['SUB_ID'] . '" ' . $val . '>' . $tlist['SUBITEM_NAME'] . '</option>';
        }
        echo $option;
        
    }


    public function update(){

        $data['edit_id']     = $this->input->post('edit_id');
        $data['itemid']      = $this->input->post('itemnameedit');
        $data['subitemid']   = $this->input->post('subitemnameedit');
        $data['old_img']     = $this->input->post('old_img');
        $data['modified_on'] = date('Y-m-d H:i:s');
        $data['modified_by'] = $_SESSION['username'];

        if($_FILES['itemimageedit']['name']!=''){

            if ($data['old_img']!='') {
                unlink("assets/gallery/".$data['old_img']);
            }

            $_FILES['file']['name'] = $_FILES['itemimageedit']['name'];
            $_FILES['file']['type'] = $_FILES['itemimageedit']['type'];
            $_FILES['file']['tmp_name'] = $_FILES['itemimageedit']['tmp_name'];
            $_FILES['file']['error'] = $_FILES['itemimageedit']['error'];
            $_FILES['file']['size'] = $_FILES['itemimageedit']['size'];
            $ext = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
            $config['upload_path'] = 'assets/gallery'; 
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $config['max_size'] = '50000';
            $config['file_name'] = $data['itemid'].'_'.$data['subitemid'].'_ITEM_IMAGE';
     
            $this->load->library('upload',$config); 
      
            if($this->upload->do_upload('file')){
              $uploadData = $this->upload->data();
              $filename = $uploadData['file_name'];     
              $data['totalFiles'] = $filename;
          }

                $data['itemimageedit'] = $data['itemid'].'_'.$data['subitemid'].'_ITEM_IMAGE'.".".$ext;
         }else{

            if ($data['old_img']!='') {
                 $data['itemimageedit'] = $data['old_img'];
             }else{
                 $data['itemimageedit'] = '';
             }
            
         }
        
       // print_r($data);
        $this->db->reconnect();
        $result = $this->db->query("
                                    UPDATE GALLERY_MASTER SET 
                                        itemid      = '".$data['itemid']."',
                                        subitemid   = '".$data['subitemid']."',
                                        itemimage   = '".$data['itemimageedit']."',                                       
                                        modified_on = '".$data['modified_on']."',
                                        modified_by = '".$data['modified_by']."'
                                    WHERE
                                        gallery_master_id='".$data['edit_id']."'
                                ");
        save_query_in_log();
        $this->db->close();

        // exit();
        if($result)
        {
            $this->session->set_flashdata('g_success', 'Gallery have been Updated successfully...');
        }else{
            $this->session->set_flashdata('g_err', 'Could not add Gallery details!');
        }
        redirect('Gallery/gallerylist');

    }


    public function delete()

    {
        $id = $_POST['id'];
        $data['status'] = 2;
        $result = $this->db->query("UPDATE GALLERY_MASTER SET status = '".$data['status']."' WHERE gallery_master_id = '".$id."'");
        echo $result;
    }


   //************************************************************//
}

?>