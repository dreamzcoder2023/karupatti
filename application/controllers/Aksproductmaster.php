<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/* ************************************************************************************
		Purpose : To handle all Aksproductmaster functions 2022-08-22
***************************************************************************************/
class Aksproductmaster extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model(array("Aksproductmaster_model"));
    	$this->load->library('user_agent');
    	if (isset($this->session->userdata['username']) && $this->session->userdata['username'] == TRUE)
        {
        //do something
        }else{
            redirect('login'); //if session is not there, redirect to login page
        } 
		date_default_timezone_set("Asia/Kolkata");
    	$this->session->set_userdata('comtitle', 'Aksproduct Master');
	}

    public function index()
    {

        $page       = isset($_GET['page']) ? $_GET['page'] : 1;
        $limit      = 50;
        $offset     = ($page - 1) * $limit +1;
        $page_limit=$offset+$limit-1;

      // print_r($page_limit);exit;

        $data['category_name'] = $this->input->post('category_name');

        if($data['category_name']!=''){
          
        $cname ="AND PRD.AKS_CAT_NAME='".$data['category_name']."'";
        }
        else{
         $cname ='';
        }

      // print_r($cname);exit;
        $cat = $data['category_name'];

        $data['category_list_get']  = $this->db->query("SELECT * FROM AKSPRODUCT_CATEGORY WHERE AKSCATEGORY_ID ='".$cat."' ")->row(); 

        $data['category_fill']  = $this->Aksproductmaster_model->cat_fill($cname,$offset,$page_limit);

         $data['count'] = count($this->db->query(" SELECT  PRD.AKS_PRD_MID,PRD.AKS_CAT_NAME as AKS_CAT_ID,PRD.AKS_PRD_NAME, PRD.AKS_PRD_WT,PRD.AKS_PRD_PRICE,PRD.AKS_PUR_PRICE,PRD.AKS_MIN_STK,PRD.AKS_MAX_STK,PRD.AKS_PRD_DETAIL,PRD.AKS_PRD_IMG,PRD.STATUS,PRDC.AKSCATEGORY_NAME, PRD.PRODUCT_TYPE,PRD.IS_PURCHASE,PRD.IS_SALE, ROW_NUMBER() OVER (ORDER BY PRD.AKS_PRD_MID  DESC) AS sl from   AKS_PRD_MASTER  PRD , AKSPRODUCT_CATEGORY  PRDC  WHERE  PRD.AKS_CAT_NAME=PRDC.AKSCATEGORY_ID $cname ")->result_array());


       $data['category_list']  = $this->db->query("SELECT * FROM AKSPRODUCT_CATEGORY  ORDER BY AKSCATEGORY_ID")->result_array();
        // print_r($data['category_list']);exit;

       $data['category_count'] = $this->db->query("SELECT count(AKSCATEGORY_ID) as count FROM AKSPRODUCT_CATEGORY WHERE status='Y' ")->row();
       $data['prd_count'] = $this->db->query("SELECT count(AKS_PRD_MID) as count FROM AKS_PRD_MASTER WHERE status='Y' ")->row();
       
       $data['cat_name'] = $this->Aksproductmaster_model->get_cat_name();
            
        $data['export_products'] = json_encode($this->db->query("SELECT PRD.AKS_PRD_MID,PRD.AKS_CAT_NAME as AKS_CAT_ID,PRD.AKS_PRD_NAME,PRD.AKS_PRD_WT,PRD.AKS_PRD_PRICE,PRD.AKS_PUR_PRICE,PRD.AKS_MIN_STK,PRD.HSN_CODE,PRD.AKS_MAX_STK,PRD.AKS_PRD_DETAIL,PRD.AKS_PRD_IMG,PRD.STATUS,PRDC.AKSCATEGORY_NAME, PRD.PRODUCT_TYPE,PRD.IS_PURCHASE,PRD.IS_SALE, ROW_NUMBER() OVER (ORDER BY PRD.AKS_PRD_MID  DESC) AS sl from   AKS_PRD_MASTER  PRD , AKSPRODUCT_CATEGORY  PRDC  WHERE  PRD.AKS_CAT_NAME=PRDC.AKSCATEGORY_ID AND PRD.STATUS='Y' $cname ")->result_array());     



       
        

        $this->load->view('aksproduct_master/aks_product_list',$data);
    }
    

   public function aksaddproduct(){

        
       
        $data['category_list']  = $this->db->query("SELECT * FROM AKSPRODUCT_CATEGORY WHERE Status='Y'  ")->result_array();
         
         // print_r($data['category_list'][1]);exit;
         $this->load->view('aksproduct_master/aks_new_products',$data);

    
  
}
    public function product_save()
    {   

        $aks_id = $this->db->query("SELECT * FROM AKS_PRD_MASTER WHERE PRODUCT_TYPE='P' ORDER BY AKS_PRD_MID DESC")->row();

        $AKS_PRD_ID = $aks_id ? $aks_id->AKS_PRD_MID : 0  ;
        $data['AKS_PRD_ID'] = $AKS_PRD_ID + 1 ;





        $data['cat_name'] = $this->input->post('add_cat_name');
        $data['prd_name'] = $this->input->post('add_prd_name');
        $data['prd_wt'] = $this->input->post('add_prd_wt');
        $data['prd_price'] =$this->input->post('add_prd_price')??0;
        $data['pur_price'] =$this->input->post('add_pur_price')??0;
        $data['prd_min_stk'] = $this->input->post('add_prd_min_stk');
        $data['prd_max_stk'] = $this->input->post('add_prd_max_stk');
        $data['prd_details'] = $this->input->post('add_prd_details');
        $data['web_prd_ids'] = $this->input->post('web_prd_ids');


        $data['ispurchase'] = $this->input->post('ispurchase') ?$this->input->post('ispurchase') : 0;
        $data['issale']     = $this->input->post('issale') ? $this->input->post('issale') : 0;

        // print_r($data); exit;
    

        if($_FILES['prd_img']['name']!=''){
            // print_r(1);exit();
            $_FILES['file']['name'] = $_FILES['prd_img']['name'];
            $_FILES['file']['type'] = $_FILES['prd_img']['type'];
            $_FILES['file']['tmp_name'] = $_FILES['prd_img']['tmp_name'];
            $_FILES['file']['error'] = $_FILES['prd_img']['error'];
            $_FILES['file']['size'] = $_FILES['prd_img']['size'];
            $ext = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
            $config['upload_path'] = 'assets/images/aks_product_image'; 
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $config['max_size'] = '50000';
            $config['file_name'] = $data['AKS_PRD_ID'].'_PRD_IMAGE';
     
            $this->load->library('upload',$config); 
      
            if($this->upload->do_upload('file')){
              $uploadData = $this->upload->data();
              $filename = $uploadData['file_name'];
     
              $data['totalFiles'] = $filename;
          }

            $data['prd_img']=$data['AKS_PRD_ID'].'_PRD_IMAGE'.".".$ext;
         }else{

            $data['prd_img']='';
         }
        
      
        $data['created_by'] = $_SESSION['username'];
        $data['created_on'] = date('Y-m-d H:i:s');
        $data['status'] = 'Y';
        $data['prd_hsn'] = $this->input->post('prd_hsn_code')??'';

      
        $result = $this->Aksproductmaster_model->add_product($data);

        add_notification(date('Y-m-d H:i:s'), '', "Others", "karupatti<br>  New Product", $data['prd_name']. ' created By ' .$_SESSION['username'],'', $_SESSION['USERID'], '0', $data['AKS_PRD_ID']);
        
        if($result)
        {
            $this->session->set_flashdata('g_success', 'product have been added successfully...');
        }else{
           $this->session->set_flashdata('g_err', 'Could not add product !');
        }
        redirect('Aksproductmaster');
         
    }
     public function image_view()
    {
        $id = $_POST['id'];
         $response='<div class="image-input-wrapper w-250px h-250px" style="background-image: url(<?php echo base_url() ?>assets/images/aks_product_image/<?php echo $id; ?>)"></div>';
       
         echo $response;
    }
    public function prd_delete()
    {
        $uid = $data['bid']=$_POST['id'];
        // print_r($uid);exit();
        $data['prd_details'] = $this->db->query("SELECT * FROM AKS_PRD_MASTER WHERE AKS_PRD_MID=".$uid)->row();
        $this->load->view('aksproduct_master/aks_products_delete',$data);
    }
    public function delete()
    { 
        $bid=$_POST['field'];
        $result = $this->Aksproductmaster_model->prd_delete($bid);
        if ($result) {
            $this->session->set_flashdata('g_success', 'Product has been Deleted successfully.');
        }
        else{
            $this->session->set_flashdata('g_err', 'Something went wrong');
        }

    }
    public function edit_prd($prd_edit){

      $data['prd_edetails'] = $this->Aksproductmaster_model->prd_edits($prd_edit);



      $data['category_list']  = $this->db->query("SELECT * FROM AKSPRODUCT_CATEGORY  ORDER BY AKSCATEGORY_ID")->result_array();    
       
        

        
        $this->load->view('aksproduct_master/aks_edit_products',$data);
        // print_r($data);
        // exit;
     }

     public function prd_update()
    {




          $data['pr_edit_hid'] = $this->input->post('pr_edit_hid');
          // print_r($data['pr_edit_hid']);exit();
          $data['edit_prd_hsn'] = $this->input->post('edit_prd_hsn_code')??'';
          // print_r($data['edit_cat_name']);exit();
          $data['edit_cat_id'] = $this->input->post('edit_cat_id');
          $data['edit_prd_name'] = $this->input->post('edit_prd_name');
          $data['edit_prd_wt'] = $this->input->post('edit_prd_wt')??0;
          $data['edit_prdprice'] =$this->input->post('edit_prd_price')??0;
          // print_r($data['edit_prdprice']);exit();
          $data['edit_pur_price'] =$this->input->post('edit_pur_price');
          $data['edit_prd_min_stk'] = $this->input->post('edit_prd_min_stk');
          $data['edit_prd_max_stk'] = $this->input->post('edit_prd_max_stk');
          $data['edit_prd_details'] = $this->input->post('edit_prd_details');
          $data['web_prd_ids'] = $this->input->post('web_prd_ids');
          $data['old_img'] = $this->input->post('old_img');

          $data['ispurchase'] = $this->input->post('ispurchase') ?$this->input->post('ispurchase') : 0;
          $data['issale']     = $this->input->post('issale') ? $this->input->post('issale') : 0;
            
            // print_r($data); exit;
          
          $aks_id = $this->db->query("SELECT * FROM AKS_PRD_MASTER where AKS_PRD_MID='".$data['pr_edit_hid']."' ")->row();

          // print_r($aks_id);exit;

          $data['img_name'] = $aks_id->AKS_PRD_MID;
          $old_img          = $aks_id->AKS_PRD_IMG?$aks_id->AKS_PRD_IMG:'';

          // print_r($_FILES['prd_img']); exit;

         if($_FILES['prd_img']['name']!=''){

            if ($data['old_img']!='') {
                unlink("assets/images/aks_product_image/".$data['old_img']);
            }
            // print_r(1);exit();
            $_FILES['file']['name'] = $_FILES['prd_img']['name'];
            $_FILES['file']['type'] = $_FILES['prd_img']['type'];
            $_FILES['file']['tmp_name'] = $_FILES['prd_img']['tmp_name'];
            $_FILES['file']['error'] = $_FILES['prd_img']['error'];
            $_FILES['file']['size'] = $_FILES['prd_img']['size'];
            $ext = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
            $config['upload_path'] = 'assets/images/aks_product_image'; 
            $config['allowed_types'] = 'jpg|jpeg|png';
            $config['max_size'] = '50000';
            $config['file_name'] = $data['img_name'].'_PRD_IMAGE';
     
            $this->load->library('upload',$config); 
      
            if($this->upload->do_upload('file')){
              $uploadData = $this->upload->data();
              $filename = $uploadData['file_name'];
     
              $data['totalFiles'] = $filename;
            }

            $data['prd_img']=$data['img_name'].'_PRD_IMAGE'.".".$ext;
          }
          else{
                if ($data['old_img']!='') {
                     $data['prd_img']=$data['old_img'];
                 }else{
                     $data['prd_img']='';
                 }
            }
       
          $data['status'] = 'Y';
          $data['modified_by'] = $_SESSION['username'];
          $data['modified_on'] = date('Y-m-d H:i:s');
          $result = $this->Aksproductmaster_model->prd_update($data);

          if ($result) {
               add_notification(date('Y-m-d H:i:s'), '', "Others", "karupatti<br> Product Update", $data['edit_prd_name']. ' updated By ' .$_SESSION['username'],'', $_SESSION['USERID'], '0', $data['AKS_PRD_ID']);
          }

          // exit();
          if($result){
                $this->session->set_flashdata('g_success', 'Product have been Updated successfully...');
          }else{
               $this->session->set_flashdata('g_err', 'Could not update Product details!');
          }
          redirect('Aksproductmaster');
        
    }
  
}
?>
