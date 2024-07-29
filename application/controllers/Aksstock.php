<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/* ************************************************************************************
		Purpose : To handle all Aksproduct_master functions 2022-08-22
***************************************************************************************/
class AksStock extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model(array("Aks_stock_model"));
    	$this->load->library('user_agent');
    	if (isset($this->session->userdata['username']) && $this->session->userdata['username'] == TRUE)
        {
        //do something
        }else{
            redirect('login'); //if session is not there, redirect to login page
        } 
		date_default_timezone_set("Asia/Kolkata");
    	$this->session->set_userdata('comtitle', 'Aks Stock');
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
          
        $cname =" AND PRD.AKS_CAT_NAME='".$data['category_name']."'";
        }
        else{
         $cname ='';
        }

      // print_r($cname);exit;


       $data['category_fill']  = $this->Aks_stock_model->cat_fill($cname,$offset,$page_limit);
       
      $data['count'] = count($this->db->query("SELECT PRD.AKS_PRD_MID,PRD.AKS_CAT_NAME as AKS_CAT_ID,PRD.AKS_PRD_NAME,PRD.AKS_PRD_WT,PRD.AKS_PRD_PRICE,PRD.AKS_PUR_PRICE,PRD.AKS_MIN_STK,PRD.AKS_MAX_STK,PRD.PRD_CUR_QTY,PRD.AKS_PRD_DETAIL,PRD.AKS_PRD_IMG,PRD.STATUS,PRDC.AKSCATEGORY_NAME, ROW_NUMBER() OVER (ORDER BY PRD.AKS_PRD_MID  DESC) AS sl from   AKS_PRD_MASTER  PRD , AKSPRODUCT_CATEGORY  PRDC  WHERE  PRD.AKS_CAT_NAME=PRDC.AKSCATEGORY_ID $cname ")->result_array());

      $data['export_stock'] = json_encode($this->db->query(" SELECT  PRD.AKS_PRD_MID,PRD.AKS_CAT_NAME as AKS_CAT_ID,PRD.AKS_PRD_NAME,PRD.AKS_PRD_WT,PRD.AKS_PRD_PRICE,PRD.AKS_PUR_PRICE,PRD.AKS_MIN_STK,PRD.PRD_CUR_QTY,PRD.AKS_MAX_STK,PRD.AKS_PRD_DETAIL,PRD.AKS_PRD_IMG,PRD.STATUS,PRDC.AKSCATEGORY_NAME, ROW_NUMBER() OVER (ORDER BY PRD.AKS_PRD_MID  DESC) AS sl from   AKS_PRD_MASTER  PRD , AKSPRODUCT_CATEGORY  PRDC  WHERE  PRD.AKS_CAT_NAME=PRDC.AKSCATEGORY_ID $cname ")->result_array());

      
      
       $cat = $data['category_name'];
       $data['category_list_get']  = $this->db->query("SELECT * FROM AKSPRODUCT_CATEGORY WHERE AKSCATEGORY_ID ='".$cat."' ")->row();

       $data['category_list']  = $this->db->query("SELECT * FROM AKSPRODUCT_CATEGORY  ORDER BY AKSCATEGORY_ID")->result_array();

       $data['category_list1']  = $this->db->query("SELECT * FROM AKSPRODUCT_CATEGORY  ORDER BY AKSCATEGORY_ID")->result_array();
       // $data['category_count'] = $this->db->query("SELECT count(AKSCATEGORY_ID) as count FROM AKSPRODUCT_CATEGORY WHERE status='Y' ")->row();
       // $data['prd_count'] = $this->db->query("SELECT count(AKS_PRD_MID) as count FROM AKS_PRD_MASTER WHERE status='Y' ")->row();
       $data['prd_list'] = $this->Aks_stock_model->get_prd_list();
       // $data['cat_name'] = $this->Aksproductmaster_model->get_cat_name();
       // print_r($data['category_list']);exit();


        $this->load->view('aks_stock/aks_stock_list',$data);
    }
     public function stock_history($prd_ids)
    {


      
        $page       = isset($_GET['page']) ? $_GET['page'] : 1;
        $limit      = 50;
        $offset     = ($page - 1) * $limit +1;
        $page_limit = $offset+$limit-1;
       


         $data['type'] = $this->input->post('stk_type');
         if($data['type']!=''){
         $type =" AND stk_type LIKE'%".$data['type']."%'";
         }
          else{
         $type ='';
        }
        $data['dt_fill'] = $this->input->post('dt_fill_stk_list');

        $data['from_date_fillter'] = $this->input->post('from_date_fillter_stk_list');
        $data['to_date_fillter'] = $this->input->post('to_date_fillter_stk_list');

        // print_r($data['from_date_fillter']);exit;
        $fdate ='';
        $tdate ='';
        //  print_r($data['dt_fill']);exit();
        if($data['dt_fill']==""){
            $fdate ='';
            $tdate ='';

        }
      
            if($data['dt_fill']=="today"){
            $data['today_date_fillter'] = date("Y-m-d");
            $fdate =" AND stk_date='".$data['today_date_fillter']."'";
            $tdate ='';
                
            
        }

        if($data['dt_fill']=="week"){
            $today=date('l');
            if($today=="Sunday"){
                $data['week_from_date_fillter']=date(' Y-m-d', strtotime("sunday 0 week"));
           
                $data['week_to_date_fillter']=date(' Y-m-d', strtotime("saturday 1 week"));
               // print_r($data['week_to_date_fillter']);exit;
                    $fdate =" AND stk_date>='".$data['week_from_date_fillter']."'";
                $tdate =" AND stk_date<='".$data['week_to_date_fillter']."'";

            }else{
             $data['week_from_date_fillter']=date(' Y-m-d', strtotime("sunday -1 week"));
           
             $data['week_to_date_fillter']=date('Y-m-d', strtotime("saturday 0 week"));
            //  print_r($data['week_to_date_fillter']);exit;
                 $fdate =" AND stk_date>='".$data['week_from_date_fillter']."'";
             $tdate =" AND stk_date<='".$data['week_to_date_fillter']."'";
            }
                     }
                    if($data['dt_fill']=="monthly"){
                   
                        $first=date('Y-m-01');
                        $last=date('Y-m-t');
                        $fdate =" AND stk_date>='".$first."'";
                        
                       
                            $tdate ="AND stk_date<='".$last."'";
                        }

                if($data['dt_fill']=="custom Date"){

                if($data['from_date_fillter']!=''){

                    $first=date('Y-m-d',strtotime($data['from_date_fillter']));
                    $fdate =" AND stk_date>='".$first."'";
                    
                    }
                    else{
                        $fdate ='';
                    }
                    if($data['dt_fill']=="custom Date"){
                if($data['from_date_fillter']!=''){
                    $first=date('Y-m-d',strtotime($data['from_date_fillter']));
                    $fdate =" AND stk_date>='".$first."'";
                    
                    }
                    else{
                        $fdate ='';
                    }
                    if($data['to_date_fillter']!=''){
                        $last=date('Y-m-d',strtotime($data['to_date_fillter']));
                        $tdate =" AND stk_date<='".$last."'";
                        
                        }
                        else{
                            $tdate ='';
                        } }
}
                        $this->db->reconnect();
                        // print_r($data['dt_fill']);
                        // print_r($fdate);
                        // print_r($tdate);
                        // exit;

           $data['stk_list'] = $this->Aks_stock_model->get_stk_hst_fill($prd_ids,$type,$fdate,$tdate,$offset,$page_limit);

           $data['count'] = count($this->db->query("SELECT * FROM AKS_STOCK WHERE prd_id='".$prd_ids."' $type $fdate $tdate  order by stk_id desc")->result_array());

            $data['exportstockhistory'] = json_encode($this->db->query("SELECT * FROM AKS_STOCK WHERE prd_id='".$prd_ids."' $type $fdate $tdate  order by stk_id desc")->result_array());



       $data['get_cat'] = $this->Aks_stock_model->get_cat($prd_ids);

      // $data['cat_name']=$data['get_cat'][0]['AKS_PRD_NAME'];
       $data['get_cat_name'] = $data['get_cat'][0]['AKSCATEGORY_NAME'];
      // print_r($data['get_cat']);exit();



      $data['get_prd_name'] = $this->Aks_stock_model->get_prd_name_list($prd_ids);
      $data['prd_name']=$data['get_prd_name'][0]['AKS_PRD_NAME'];

      // print_r($data['get_prd_name']);exit();
      $data['prd_weight']=$data['get_prd_name'][0]['PRD_CUR_QTY'];

      $data['prds_id']=$data['get_prd_name'][0]['AKS_PRD_MID'];


        $this->load->view('aks_stock/aks_stock_history',$data);
    }

    public function stock_adjust()
    {
       $data['category_list1'] = $this->db->query("SELECT * FROM AKSPRODUCT_CATEGORY  ORDER BY AKSCATEGORY_NAME ASC")->result_array();
       $data['prd_list']       = $this->Aks_stock_model->get_prd_list();
        $this->load->view('aks_stock/aks_stock_adjust',$data);
    }


    public function category_select(){

        $clid = $_POST['id'];

        if($clid  != 'all'){
          $result  = $this->db->query("SELECT * FROM AKS_PRD_MASTER WHERE AKS_CAT_NAME = '".$clid."' AND PRD_CUR_QTY>0")->result_array();
        }else{
          $result  = $this->db->query("SELECT * FROM AKS_PRD_MASTER WHERE PRD_CUR_QTY>0 AND STATUS='Y' ")->result_array();
        }
        // echo $clid;  
        // print_r($result);exit;                
           $i=1;

         $cat_change=''; 

         foreach($result as $plist){ 


          
           if ($plist['AKS_PRD_IMG']!='') {
                $image_urls =  base_url().'assets/images/aks_product_image/'.$plist['AKS_PRD_IMG']; 

            }else{
                $image_urls =  base_url().'assets/images/karupatti.jpg'; 
            }

          
          $cat_change = $cat_change.'<tr>

                            <td>'.$i.'<input type="hidden" name="prd_id_hidden[]" id="prd_id_hidden" value="'.$plist['AKS_PRD_MID'].'"></td>                           

                            <td class="table_tool">
                                <div class="d-flex mb-1">
                                    <div class="d-flex align-items-center">
                                        <div class="symbol symbol-35px me-1">
                                            <img src="'.$image_urls.'" alt="">
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <span class="fs-7 fw-semibold">'.$plist["AKS_PRD_NAME"].'</span>
                                    </div>
                                </div>
                            </td>

                            <td>'.$plist["PRD_CUR_QTY"].'</td>
                            <td>
                                <div style="width:80.25px;">
                                  <input type="text" oninput="this.value = this.value.replace(/[^0-9.]/g, \'\').replace(/(\..*)\./g, \'$1\');"  min="0" name="adjust_stk[]" id="adjust_stk'.$i.'" class="form-control form-control-lg form-control-solid" onkeyup="stk_valdidate('.$i.')" value="0">
                                   <input type="hidden"  min="0" name="cur_qty_hidden[]" id="cur_qty_hidden'.$i.'"  onkeyup="stk_valdidate('.$i.')" value="'.$plist["PRD_CUR_QTY"].'">
                                    <input type="hidden"  min="0" name="bal_stk[]" id="bal_stk'.$i.'"  onkeyup="stk_valdidate('.$i.')" value="'.$plist["PRD_CUR_QTY"].'">
                                </div>
                            </td>
                            <td>

                                <textarea class="form-control form-control-solid fs-7" rows="1" placeholder="Enter Description" name="stk_desc[]" id="stk_desc'.$i.'"></textarea>
                            </td>
                            </tr>';
                            $i++;
            }


          echo $cat_change; 
    }
    
    public function stock_update()
    {
       

        $date = date("Y-m-d");
        $data['prd_id']       = $this->input->post('prd_id_hidden');
        $data['adjust_stk']   = $this->input->post('adjust_stk');
        $data['stk_desc']     = $this->input->post('stk_desc');       
        $data['modified_by']  = $_SESSION['username'];
        $data['modified_on']  = date('Y-m-d H:i:s');      
        $count                = count($data['prd_id']); 
            for($i=0;$i<$count;$i++){
                $prd_ids = $data['prd_id'][$i];
                $up_cur_qty = $data['adjust_stk'][$i];
                $data['crt_qty'] =($this->db->query("SELECT * FROM AKS_PRD_MASTER WHERE AKS_PRD_MID = '".$prd_ids."' ")->row());
                $crt_qty    = $data['crt_qty']->PRD_CUR_QTY;
                $update_qty = $crt_qty;
                $crt_qty_tot  = $update_qty;
                $wgts         = $up_cur_qty;
                $up_qty       = $crt_qty_tot - $wgts ;
                $stk_up_qty   = $up_qty;
                $stk_desc     = $data['stk_desc'][$i];
                $adj_stk      = $data['adjust_stk'][$i]; 
                $stk_desc     = $data['stk_desc'][$i]; 
                $stk_date     = date("Y-m-d",strtotime($date));
                if($adj_stk>0){
                    $res=$this->db->query("INSERT INTO AKS_STOCK
                    (
                    prd_id
                   ,stk_date
                   ,stk_cur_qty
                   ,stk_type
                   ,stk_status
                   ,stk_count
                   ,stk_bal_qty
                   ,stk_desc
                   ,modified_by
                   ,modified_on
                   )

                    values ('".$prd_ids."'
                    ,'".$stk_date."'
                    ,'".$update_qty."'
                    ,'Adjust'
                    ,'OUT'
                    ,'".$adj_stk."'
                    ,'".$stk_up_qty."'
                    ,'".$stk_desc."'
                    ,'".$data['modified_by']."'
                    ,'".$data['modified_on']."')");
                    if($res)
                        {
                            $this->session->set_flashdata('g_success', 'Product  have been Adjust successfully...');
                        }else{
                           $this->session->set_flashdata('g_err', 'Could not Adjust Product !');
                        }
                    $curt_stk = $stk_up_qty;
                    $result= $this->db->query("UPDATE AKS_PRD_MASTER set PRD_CUR_QTY='". $curt_stk."' where AKS_PRD_MID=". $prd_ids);
                }
        }
        redirect('AksStock');
    }
   
  
}
?>
