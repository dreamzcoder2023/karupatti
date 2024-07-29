<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/* ************************************************************************************
		Purpose : To handle all Aksproduct_master functions 2022-08-22
***************************************************************************************/
class Akspurchase extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model(array("Akspurchase_model","Accountsgroup_model"));
    	$this->load->library('user_agent');
       $fin_year=$this->Accountsgroup_model->get_fin_years_list();
        $db=substr($fin_year->DBNAME,0,strlen($fin_year->DBNAME)-4);
        $db_user=$fin_year->USERNAME?$fin_year->USERNAME:'';
        $db_pass=$fin_year->PASSWORD?$fin_year->PASSWORD:'';
        // echo $db;exit;
        $config_app = switch_db_dynamic($db,$db_user,$db_pass);
        
        $this->Akspurchase_model->other_db = $this->load->database($config_app,TRUE);

    	if (isset($this->session->userdata['username']) && $this->session->userdata['username'] == TRUE)
        {
        //do something
        }else{
            redirect('login'); //if session is not there, redirect to login page
        } 
		date_default_timezone_set("Asia/Kolkata");
    	$this->session->set_userdata('comtitle', 'Aks Purchase');
	}

    public function index()
    {
        $page       = isset($_GET['page']) ? $_GET['page'] : 1;
        $limit      = 10;
        $offset     = ($page - 1) * $limit +1;
        $page_limit =$offset+$limit-1;
       
         $data['supplier_name'] = $this->input->post('supplier_name');
         if($data['supplier_name']!=''){
         $sup_name =" AND pur_sup LIKE'%".$data['supplier_name']."%'";
         }
          else{
         $sup_name ='';
        }
        $data['purchase_id'] = $this->input->post('purchase_id');
         if($data['purchase_id']!=''){
         $pur_id =" AND pur_id LIKE'%".$data['purchase_id']."%'";
         }
          else{
         $pur_id ='';
        }

        
        // print_r($data['supplier_name']);exit;

        $data['dt_fill'] = $this->input->post('dt_fill_pur_list');

        $data['from_date_fillter'] = $this->input->post('from_date_fillter_nontag_list');
        $data['to_date_fillter'] = $this->input->post('to_date_fillter_nontag_list');

        // print_r($data['from_date_fillter']);exit;
        $fdate ='';
        $tdate ='';
        //  print_r($data['dt_fill']);exit();
        if($data['dt_fill']=="all"){
            $fdate ='';
            $tdate ='';

        }
      
            if($data['dt_fill']=="today"){
            $data['today_date_fillter'] = date("Y-m-d");
            $fdate =" AND pur_date='".$data['today_date_fillter']."'";
            $tdate ='';
                
            
        }
        if($data['dt_fill']=="week"){
            $today=date('l');
            if($today=="Sunday"){
                $data['week_from_date_fillter']=date(' Y-m-d', strtotime("sunday 0 week"));
           
                $data['week_to_date_fillter']=date(' Y-m-d', strtotime("saturday 1 week"));
               // print_r($data['week_to_date_fillter']);exit;
                    $fdate =" AND pur_date>='".$data['week_from_date_fillter']."'";
                $tdate =" AND pur_date<='".$data['week_to_date_fillter']."'";

            }else{
             $data['week_from_date_fillter']=date(' Y-m-d', strtotime("sunday -1 week"));
           
             $data['week_to_date_fillter']=date('Y-m-d', strtotime("saturday 0 week"));
            //  print_r($data['week_to_date_fillter']);exit;
                 $fdate =" AND pur_date>='".$data['week_from_date_fillter']."'";
             $tdate =" AND pur_date<='".$data['week_to_date_fillter']."'";
            }
                     }
                    if($data['dt_fill']=="monthly"){
                   
                        $first=date('Y-m-01');
                        $last=date('Y-m-t');
                        $fdate =" AND pur_date>='".$first."'";
                        
                       
                            $tdate ="AND pur_date<='".$last."'";
                        }

                if($data['dt_fill']=="custom Date"){

                if($data['from_date_fillter']!=''){

                    $first=date('Y-m-d',strtotime($data['from_date_fillter']));
                    $fdate =" AND pur_date>='".$first."'";
                    
                    }
                    else{
                        $fdate ='';
                    }
                    if($data['dt_fill']=="custom Date"){
                if($data['from_date_fillter']!=''){
                    $first=date('Y-m-d',strtotime($data['from_date_fillter']));
                    $fdate =" AND pur_date>='".$first."'";
                    
                    }
                    else{
                        $fdate ='';
                    }
                    if($data['to_date_fillter']!=''){
                        $last=date('Y-m-d',strtotime($data['to_date_fillter']));
                        $tdate =" AND pur_date<='".$last."'";
                        
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
          
          $data['pur_list'] = $this->Akspurchase_model->get_pur_list($fdate,$tdate,$sup_name,$pur_id,$offset,$page_limit);

           $data['count'] = count($this->db->query("SELECT * FROM AKS_PURCHASE_ENTRY WHERE status='Y' $fdate $tdate $sup_name $pur_id ORDER BY pid DESC")->result_array());

           $data['exportpurchase'] = json_encode($this->db->query("SELECT * FROM AKS_PURCHASE_ENTRY WHERE status='Y' $fdate $tdate $sup_name $pur_id ORDER BY pid DESC")->result_array());

           

          // print_r($data['count']);exit;
          
         // $data['sales_order_list']  = $this->db->query(" SELECT  * FROM  ( SELECT *, ROW_NUMBER() OVER (ORDER BY id DESC) AS sl FROM sales_order WHERE  status!='' $fdate $tdate $cname  )N  WHERE      sl BETWEEN $offset AND $page_limit ")->result_array();
         
        $this->load->view('aks_purchase/aks_purchase_list',$data);
    }
    public function pur_delete()
    {
        $uid = $data['bid']=$_POST['id'];
        $data['pur_detail'] = $this->db->query("SELECT * FROM AKS_PURCHASE_ENTRY WHERE pur_id='".$uid."' ")->row();
        // print_r($data['pur_detail']);exit;
        $this->load->view('aks_purchase/aks_purchase_delete',$data);
    }
    public function delete()
    { 
      $bid=$_POST['field'];

      $data['product_id_get'] = $this->db->query("SELECT * FROM AKS_PURCHASE_CART WHERE pur_id='".$bid."' ")->result_array();

      $kk = $data['product_id_get'];
      foreach ($kk as $val) {
       
          $prdd = $val['product_id'];

          $data['crt_qty'] = $this->db->query("SELECT * FROM AKS_PRD_MASTER WHERE AKS_PRD_MID = '".$prdd."' ")->row();

          $crt_qtys = $data['crt_qty']->PRD_CUR_QTY;
          $wgt      = $val['product_wgt'];
          $tot      = $crt_qtys - $wgt;
          $qtot     = $tot ;
          $ress     = $this->db->query("UPDATE AKS_PRD_MASTER SET PRD_CUR_QTY='".$qtot."' where AKS_PRD_MID=". $prdd);
          $ins_data = array(
                              'prd_id'      =>$prdd,
                              'stk_date'    =>date('Y-m-d'),
                              'stk_cur_qty' =>$crt_qtys,
                              'stk_type'    =>'Purchase Deleted',
                              'stk_status'  =>'OUT',
                              'stk_count'   =>$wgt,
                              'stk_bal_qty' =>$qtot,
                              'created_by'  =>$session['username'],
                              'created_on'  =>date('Y-m-d H:i:s'),
                              'bill_no'     =>$bid,
                             );

         $result = $this->db->insert('AKS_STOCK',$ins_data);
      }
        // print_r(1);exit;
        // $purchase_detail=$this->db->query("select * from AKS_PURCHASE_ENTRY where pur_id='".$bid."'")->result_array();
        // foreach($purchase_detail as $plist){
        // $res1  = $this->db->query("DELETE FROM AKS_STOCK WHERE stk_date= '".$plist['pur_date']."' and created_on='".$plist['create_on']."'");
        // }
        $result   = $this->Akspurchase_model->prd_delete($bid);

        // $res      = $this->db->query("DELETE FROM payment_inward_outward WHERE bill_no= '".$bid."'");
 
        // $results  = $this->db->query("DELETE FROM AKS_PURCHASE_CART WHERE pur_id= '".$bid."'");

        if ($result) {
            $this->session->set_flashdata('g_success', 'Purchase has been Deleted successfully.');
        }
        else{
            $this->session->set_flashdata('g_err', 'Something went wrong');
        }

    }


    public function purchase_view()
    {
        $pid      = $_GET['id'];
        $data     = $this->Akspurchase_model->get_purc_list($pid);
        echo json_encode($data[0]);   
    }
    public function payment_details(){

      $pdid = $_POST['id'];
      // print_r($pdid); exit;
      
      $getid = $this->db->query("SELECT * FROM AKS_PURCHASE_ENTRY where pid='".$pdid."' ")->row();
      $payment_id = $getid->pur_id;

      $data['payment_detail'] = $this->Akspurchase_model->get_payment_details($payment_id);

      // print_r($data['cart_view']); exit;

      // foreach ($data['payment_detail'] as $pur_det) {
  

         $cash = $this->Akspurchase_model->get_cash($payment_id);
         // print_r($cash);exit;

         $cash_amount   =$cash->amount;
         $cash_detail   =$cash->remarks;

         // print_r($cash_detail);exit;
         
          $cheque = $this->Akspurchase_model->get_cheque($payment_id);
         // print_r($cheque);
          $cheque_amount    =$cheque->amount;
          $chq_refno        =$cheque->cheque_ref_no;
          $chq_sup_bank     =$cheque->party_bank;
          $chq_detail       =$cheque->remarks;


          $rtgs = $this->Akspurchase_model->get_rtgs($payment_id);
          // print_r($rtgs);
          $rtgs_amount      =$rtgs->amount;
          $rtgs_refno       =$rtgs->cheque_ref_no;
          $rtgs_cbank       =$rtgs->company_bank;
          $rtgs_detail      =$rtgs->remarks;

           $upi = $this->Akspurchase_model->get_upi($payment_id);
           // print_r($upi);exit;
           $upi_amount      =$upi->amount;
           $upi_refno       =$upi->cheque_ref_no;
           $upi_cbank       =$upi->company_bank;
           $upi_detail      =$upi->remarks;


           if($cash_amount>0){
           $cash_tr='
                    <tr>
                    <td><label class=" fw-semibold fs-5">Cash</label></td>
                    <td><label class=" fw-bold fs-7">'.$cash_amount.'</label></td>
                    <td>-</td>
                    <td>-</td>
                    <td><label class=" fw-bold fs-7">'.$cash_detail.'</label></td>
                    </tr>
                    ';
            }else{
               $cash_tr ='';
            }
            if($cheque_amount>0){
            $cheque_tr='
                    <tr>
                    <td><label class=" fw-semibold fs-5">Cheque</label></td>
                    <td><label class=" fw-bold fs-7">'.$cheque_amount.'</label></td>
                    <td><label class=" fw-bold fs-7">'.$chq_refno.'</label></td>
                    <td><label class=" fw-bold fs-7">'.$chq_sup_bank.'</label></td>
                    <td><label class=" fw-bold fs-7">'.$chq_detail.'</label></td>
                    </tr>';
            }
            else{$cheque_tr=''; }

            if($rtgs_amount>0){
            $rtgs_tr='<tr><td><label class=" fw-semibold fs-5">RTGS</label></td>
                      <td><label class=" fw-bold">'.$rtgs_amount.'</label></td>
                      <td><label class=" fw-bold">'.$rtgs_refno.'</label></td>
                      <td><label class=" fw-bold">'.$rtgs_cbank.'</label></td>
                      <td><label class=" fw-bold">'.$rtgs_detail.'</label></td></tr>';   
            }
            else{
               $rtgs_tr=''; 
            }

            if($upi_amount>0){
            $upi_pay=
                     '<tr><td><label class=" fw-semibold fs-5">UPI</label></td>
                      <td><label class=" fw-bold">'.$upi_amount.'</label></td>
                      <td><label class=" fw-bold">'.$upi_refno.'</label></td>
                      <td><label class=" fw-bold">'.$upi_cbank.'</label></td>
                      <td><label class=" fw-bold">'.$upi_detail.'</label></td></tr>';  
                    // echo  $upi_pay;  
                  }
                  else{
                    $upi_pay='';
                  }
             
                    // print_r($cheque_tr);exit;
             // echo ''.'||'.$cash_tr;


             echo ''.'||'.$cash_tr.'||'.$cheque_tr.'||'.$rtgs_tr.'||'. $upi_pay;   

           // echo ''.'||'.$cash_amount.'||'.$cash_detail.'||'.$cheque_amount.'||'.$chq_refno.'||'.$chq_sup_bank.'||'.$chq_detail.'||'.$rtgs_amount.'||'.$rtgs_refno.'||'.$rtgs_cbank.'||'.$rtgs_detail.'||'.$upi_amount.'||'.$upi_refno.'||'.$upi_cbank.'||'.$upi_detail.'||'.$cash_tr.'||'.$cheque_tr.'||'.$rtgs_tr.'||'. $upi_pay; 

    }
    
    public function supplier_data_get()
    {
        $l_sno = $_POST['id'];

        $data = $this->Akspurchase_model->get_supplier_by_id($l_sno);


        if ($data!='') {

            $name    = $data->LEDGER_NAME?$data->LEDGER_NAME:'';
            $credit  = $data->credit?$data->credit:0;
            $debit   = $data->debit?$data->debit:0;


           echo ''.'||'.$name.'||'.$credit.'||'.$debit;   
        }else{

            return false;
        }
       

        
       
   }

    public function view_table()
    {
        $plid = $_POST['id'];
        // print_r($plid); exit;
        // $count = $_POST['count'];
        $getid = $this->db->query("SELECT * FROM AKS_PURCHASE_ENTRY where pid='".$plid."' ")->row();
        $product_id = $getid->pur_id;
        $data['cart_view'] = $this->Akspurchase_model->get_cart_view($product_id);
         $i=1;
         $row='';
        
        foreach ($data['cart_view'] as $view) {
        $prdname  = $this->db->query("SELECT * FROM AKS_PRD_MASTER WHERE AKS_PRD_MID ='".$view['product_id']."' ")->row();

        $row.='<tr><td>'.($i).'</td><td>'.$prdname->AKS_PRD_NAME.'</td><td>'.$view["product_wgt"].'</td><td>'.$view["pur_price"].'/'.$prdname->AKS_PRD_WT.'</td><td>'.$view["price"].'</td></tr>';
          $i++;

          
        }

        echo $row;
       
   }
    public function add_cart_list()
    {
        $plid = $_POST['id'];
        $count = $_POST['count'];
        $data['cart_list'] = $this->Akspurchase_model->get_cart_list($plid);
        $data['category_list1']  = $this->db->query("SELECT * FROM AKSPRODUCT_CATEGORY  ORDER BY AKSCATEGORY_ID")->result_array();
        // // print_r($data['cart_list']);exit;
         $prd_img       =$data['cart_list']->AKS_PRD_IMG;
         $prd_name      =$data['cart_list']->AKS_PRD_NAME;
         $prd_pur_price =$data['cart_list']->AKS_PUR_PRICE;
         $unit_price    =$data['cart_list']->AKS_PRD_WT;
        

         // $img= '<div style="background-image: url('.base_url().'assets/images/Aks_prd_images/'.$prd_img.'border-radius: 10px;"></div>';

         $image_url =  base_url().'assets/images/aks_product_image/'. $prd_img; 
         if($image_url){
          $img_div='<div class="image-input d-flex align-items-center fs-8" data-kt-image-input="true">
        <div class="image-input-wrapper w-40px h-40px" style="background-image: url('.$image_url.')"></div>
        </div>';
           }
           else{
            $image_url =  base_url().'assets/images/karupatti.jpg'; 
            $img_div='<div class="image-input d-flex align-items-center fs-8" data-kt-image-input="true">
        <div class="image-input-wrapper w-40px h-40px" style="background-image: url('.$image_url.')"></div>
        </div>';
           }
           
         $row='<tr onclick="add_cart()" name="count">
         
          <td>'.($count+1).'<input type="hidden" name="item_count_hidden[]'.$count.'" id="item_count_hidden" value="'.($count+1).'"></td>
        
         

         



         <td class="table_tool">
            <div class="d-flex mb-1">
                <div class="d-flex align-items-center">
                    <div class="symbol symbol-35px me-1">
                        <img src="'.$image_url.'" alt="">
                    </div>
                </div>
                <div class="d-flex align-items-center">
                    <span class="fs-7 fw-semibold">'.$prd_name.'</span>
                </div>
            </div>
            <input type="hidden" name="prd_id_hidden[]" id="prd_id_hidden'.$count.'" value="'.$plid.'">
        </td>

         <td> <div><input type="number" min="0" name="prd_wgt[]" id="prd_wgt'.$count.'" onkeyup="cart_prd_cal('.$count.')" onfocusout="cart_prd_cal_total('.$count.')" onclick="select_value('.$count.')" value="0" class="form-control form-control-lg form-control-solid fs-7" style="width:90px;"></div></td>

         <td onkeyup="cart_prd_cal()" name="lb_prd_price1[]" id="lb_prd_price1'.$count.'" >
             <input type="text" class="form-control form-control-lg form-control-solid fs-7 d-inline-block" style="width:70px;" name="lb_prd_price[]" id="lb_prd_price'.$count.'" value="'.$prd_pur_price.'"  onkeyup="cart_prd_cal('.$count.')" onfocusout="cart_prd_cal_total('.$count.')">/'.$unit_price.'

         <input type="hidden" name="prd_unit[]" id="prd_unit'.$count.'" value="'.$unit_price.'"></td>

         <td id="lbl_price_tot'.$count.'">0.00</td>

         <td>
            <a href="#" name="'.$count.'"  class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm btnDelete" data-bs-toggle="modal" >
                <span class="svg-icon svg-icon-3">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z" fill="currentColor"></path>
                        <path opacity="0.5" d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z" fill="currentColor"></path>
                        <path opacity="0.5" d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z" fill="currentColor"></path>
                    </svg>
                </span>
            </a>
           </td></tr>';
           
           // print_r($row);exit;
           echo $row;
       
       


    }
    public function category_select(){

        $clid = $_POST['id'];

        if($clid != 'all'){
          $result  = $this->db->query("SELECT * FROM AKS_PRD_MASTER WHERE AKS_CAT_NAME = '".$clid."'AND STATUS='Y'")->result_array();
        }else{
          $result  = $this->db->query("SELECT * FROM AKS_PRD_MASTER WHERE STATUS='Y'")->result_array();
        }
        // echo $clid;                    
         $htmlcontent='';                      
         foreach($result as $plist){ 
          $image_url =  base_url().'assets/images/aks_product_image/'.$plist['AKS_PRD_IMG']; 

          
          $htmlcontent = $htmlcontent.'<div class="col-lg-3 fv-row fv-plugins-icon-container" onclick="add_cart('.$plist["AKS_PRD_MID"].')"><a href="javascript:;" id="add_cart"><div class="image-input-wrapper overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover w-90px h-80px me-3" style="background-image: url('.$image_url.'); border-radius: 10px; "> </div> </a><div class="d-flex flex-column"> <a href="javascript:;" id="add_cart" class="text-gray-600 text-hover-primary fs-8">'.$plist["AKS_PRD_NAME"].'</a></div><span  class="fs-6 fw-bold"><i class="fa-sharp fa-solid fa-indian-rupee-sign eyc fs-6" id="add_cart"></i>'.$plist["AKS_PUR_PRICE"].'/g</span></div>';


          

          
         }   

          echo $htmlcontent;           
         // print_r($result);
         // exit;
    }

   public function aks_new_purchase(){

        // $clid = $_POST['id'];
        // $data['category_list1'] = $this->Akspurchase_model->get_category($clid);
       
        $data['category_list1']  = $this->db->query("SELECT * FROM AKSPRODUCT_CATEGORY WHERE Status='Y' ")->result_array();

        // print_r($data['category_list1']);
        // print_r($data['category_list'][1]);exit;
        // $pid = $_POST['id'];
        // $data['pur_price'] = $this->Akspurchase_model->get_pur_price($pid);
        // print_r($data['pur_price']);exit;
         $data['pur_price'] = $this->Akspurchase_model->get_pur_detail();
        // print_r($data['pur_price']);exit;
        $data['suppliers_list'] = $this->Akspurchase_model->getSupplier();

         $this->load->view('aks_purchase/aks_new_purchase',$data);
        
}

    public function purchase_save()
    {   
        
        $data['pur_date']  = $this->input->post('pur_date');

         $last_pid_detail = $this->Akspurchase_model->last_pid_details();
         if($last_pid_detail){

            $last_data= $last_pid_detail? $last_pid_detail->pur_id :0;



                $year = substr( date("y"), -2);
                $slice = explode("/", $last_data);
                $result = preg_replace('/[^0-9]/',' ', $slice[0]); 
                // print_r( $result);

                function request_num ($input, $pad_len = 3  , $prefix = null) {
                    if ($pad_len <= strlen($input))
                        trigger_error('<strong>$pad_len</strong> cannot be less than or equal to the length of <strong>$input</strong> to generate invoice number', E_USER_ERROR);
                
                    if (is_string($prefix))
                        return sprintf("%s%s", $prefix, str_pad($input, $pad_len, "0", STR_PAD_LEFT));
                
                    return str_pad($input, $pad_len, "0", STR_PAD_LEFT);
                }

                $request =  request_num(((int)$result+1), 3, "AKSP-");
                
                $request_id =  $request.'/'.$year;

              $pur_id = $request_id;
              }
              else{
                $year = substr( date("y"), -2);
                $pur_id=  'AKSP-001/'.$year;
              }
        $data['pur_id']         = $pur_id;
        $data['pur_sup']        = $this->input->post('sup_name');
        $data['prd_wgt']        = $this->input->post('prd_wgt');
        $data['pur_price']      = $this->input->post('lb_prd_price');
        $data['unit']           = $this->input->post('prd_unit');
        $data['prd_id']         = $this->input->post('prd_id_hidden');        
        $data['prd_tot_amt']    = $this->input->post('totalamount');
        $data['pur_dis_amt']    = $this->input->post('dis_cart_amt');
        $data['pur_net_amt']    = $this->input->post('netamount');

        $data['pay_mode'] =$this->input->post('cashcheck');
         $data['cash_amount'] =$this->input->post('cashamount');
          $data['cash_detail'] =$this->input->post('cashdetail');
           $data['pur_id'] =$pur_id;

        $cash = $this->Akspurchase_model->cashsave($data);
        // print_r($cash);exit;
          $data['pay_mode'] =$this->input->post('chequechk');
           $data['cheque_amt'] =$this->input->post('chequeamount');
            $data['cheque_supbk'] =$this->input->post('chequesupbank');
             $data['cheque_refno'] =$this->input->post('chequerefno');
              $data['cheque_detail'] =$this->input->post('chequedetail');
               $data['pur_id'] =$pur_id;
          $cheque = $this->Akspurchase_model->chequesave($data);

          $data['pay_mode'] =$this->input->post('rtgschk');
           $data['rtgs_amt'] =$this->input->post('rtgsamount');
            $data['rtgs_refno'] =$this->input->post('rtgsrefno');
             $data['rtgs_bank'] =$this->input->post('rtgsbank');
              $data['rtgs_detail'] =$this->input->post('rtgsdetails');
               $data['pur_id'] =$pur_id; 
           $rtgs = $this->Akspurchase_model->rtgssave($data);

             $data['pay_mode'] =$this->input->post('upichk');
             $data['upi_amt'] =$this->input->post('upiamount');
             $data['upi_refno'] =$this->input->post('upirefno');
             $data['upi_bank'] =$this->input->post('upibank');
             $data['upi_detail'] =$this->input->post('upidetail');
             $data['pur_id'] =$pur_id;
             $upi = $this->Akspurchase_model->upisave($data);

        $data['pur_pay_mode']   = $this->input->post('pay_mode');
        $data['pur_cash']       = $this->input->post('paid_amount');
        $data['balance_cash']   = $this->input->post('balance_amount');
        $data['create_by']      = $_SESSION['username'];
        $data['create_on']      = date('Y-m-d H:i:s');
        $data['status']         = 'Y';
        $count=count( $data['prd_wgt'] );

        $count1 = $count;

        $data['prd_count']   = $count1;

        for($i=0;$i<$count;$i++){

        $wgt        =  $data['prd_wgt'][$i] ;

        $unit_price =  $data['unit'][$i];

        $purprice   = $data['pur_price'][$i];
        
        $tot =( $wgt  / $unit_price  ) * $purprice ;

        // ( prd_wgt / prd_unit  ) * rc_tot;

        $total_price = $tot;
          $res=$this->db->query("INSERT INTO AKS_PURCHASE_CART
            (product_id,product_wgt,pur_price,price,pur_id) values ('".$data['prd_id'][$i]."','".$data['prd_wgt'][$i]."','".$data['pur_price'][$i]."','".$total_price."','".$data['pur_id']."')");
          $prd_ids = $data['prd_id'][$i];
         
          $data['crt_qty'] =($this->db->query("SELECT * FROM AKS_PRD_MASTER WHERE AKS_PRD_MID = '".$prd_ids."' ")->row());
          $crt_qty     = $data['crt_qty']->PRD_CUR_QTY;
          $crt_qty_tot =  $crt_qty;
          $wgts        =  $data['prd_wgt'][$i] ;
          $bal_qty     =  $crt_qty_tot + $wgts ;
          $stk_bal_qty = $bal_qty;
          $max_stock=$data['crt_qty']->AKS_MAX_STK;
            if($bal_qty>$max_stock){
              add_notification(date('Y-m-d H:i:s'), '', "Others", "karupatti<br> Maximum Stock Alert", $data['crt_qty']->AKS_PRD_NAME. ' Maximum stock Reached' .$_SESSION['username'],'', $_SESSION['USERID'], '0', $data['crt_qty']->AKS_PRD_NAME);
            }
            $purc_date = date("Y-m-d",strtotime($data['pur_date'])); 
            $res=$this->db->query("INSERT INTO AKS_STOCK
            (
            prd_id
           ,stk_date
           ,stk_cur_qty
           ,stk_type
           ,stk_status
           ,stk_count
           ,stk_bal_qty
           ,created_by
           ,created_on
           ,bill_no
           )
            values ('".$data['prd_id'][$i]."'
            ,'".$purc_date."'
            ,'".$crt_qty."'
            ,'Purchase'
            ,'IN'
            ,'".$data['prd_wgt'][$i]."'
            ,'".$stk_bal_qty."'
            ,'".$data['create_by']."'
            ,'".$data['create_on']."'
            ,'".$data['pur_id']."')");
         
            $curt_stk = $stk_bal_qty;
            $res = $this->db->query("UPDATE AKS_PRD_MASTER set PRD_CUR_QTY='". $curt_stk."' where AKS_PRD_MID=". $prd_ids);


         }
         

        add_notification(date('Y-m-d H:i:s'), '', "Others", "karupatti<br> New Purchase", $pur_id. ' purchased By ' .$_SESSION['username'],'', $_SESSION['USERID'], '0', $pur_id);

        $data['supplier_id'] = $this->input->post('sup_id');

        $purchase_result = $this->Akspurchase_model->purchase_entry($data);

        if ($purchase_result) {
           
                $old_data =  $this->Akspurchase_model->get_supplier_by_id($data['supplier_id']);

                 if ($old_data !='') {

                    $old_credit = $old_data->credit?$old_data->credit:0;
                    $old_debit  = $old_data->debit?$old_data->debit:0;

                    $old_open   = $old_data->OP_BALANCE?$old_data->OP_BALANCE:0;
                    $old_bal    = $old_data->balance?$old_data->balance:0;

                        $credit_amt = floatval($old_credit) + floatval($data['balance_cash']) ;
                        $debit_amt  = floatval($old_debit)  + floatval($data['pur_cash']) ;

                        $balance    = $old_open + $credit_amt ;
                        // - ($debit_amt + $old_bal)

                        $sup_data = [
                            
                                    'credit'   =>$credit_amt,
                                    'debit'    =>$debit_amt,
                                    'balance'  =>$balance

                                    ];

                 $sup_up = $this->Akspurchase_model->supplier_update($sup_data,$data['supplier_id']);

            }
        }

        // print_r($sup_data); exit();
        if($purchase_result)
        {
            $this->session->set_flashdata('g_success', $pur_id.' New Purchase have been added successfully...');
        }
        else
        {
           $this->session->set_flashdata('g_err', 'Could not add purchase !');
        }
        redirect('Akspurchase/');
         
    }
     public function image_view()
    {
        $id = $_POST['id'];
         $response='<div class="image-input-wrapper w-250px h-250px" style="background-image: url(<?php echo base_url() ?>assets/images/aks_product_image/<?php echo $id; ?>)"></div>';
        
         echo $response;
    }

    public function supplier_list_det()
    {
     
      $search =  $_GET['query']; 
      $rows = $this->Akspurchase_model->getSupplier($search);
      // print_r($rows);
      // exit;
      
      $res='[';
      if(count($rows)>0) {
         foreach($rows as $row )
          {
              $title='';
              $name='';
              
             
              $firstname=$row->LEDGER_NAME;
             
             
              $title = $firstname;
              $res.='{ "title":"'.$title.'","firstname":"'.$firstname.'"},';

              
          }
        $res=rtrim($res,',');
        $res.=']';
      }
      else{
        $res.=']';
      }
      print_r($res);die();
    
      }
  
}
?>


