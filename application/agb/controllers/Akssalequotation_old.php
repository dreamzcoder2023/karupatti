<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/* ************************************************************************************
        Purpose : To handle all Aksproduct_master functions 2022-08-22
***************************************************************************************/
class Akssalequotation extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model(array("Akssalequotation_model","Accountsgroup_model"));
        $this->load->library('user_agent');
        $fin_year=$this->Accountsgroup_model->get_fin_years_list();
        $db=substr($fin_year->DBNAME,0,strlen($fin_year->DBNAME)-4);
        $db_user=$fin_year->USERNAME?$fin_year->USERNAME:'';
        $db_pass=$fin_year->PASSWORD?$fin_year->PASSWORD:'';
        // echo $db;exit;
        $config_app = switch_db_dynamic($db,$db_user,$db_pass);
        
        $this->Akssalequotation_model->other_db = $this->load->database($config_app,TRUE);

        if (isset($this->session->userdata['username']) && $this->session->userdata['username'] == TRUE)
        {
        //do something
        }else{
            redirect('login'); //if session is not there, redirect to login page
        } 
        date_default_timezone_set("Asia/Kolkata");
        $this->session->set_userdata('comtitle','Aks Sale');
    }

    public function index()
    {

        
        
        $page       = isset($_GET['page']) ? $_GET['page'] : 1;
        $limit      = 10;
        $offset     = ($page - 1) * $limit +1;
        $page_limit =$offset+$limit-1;
       
         
        $data['dt_fill']           = $this->input->post('dt_fill_sale_list');
        $data['from_date_fillter'] = $this->input->post('from_date_fillter_nontag_list');
        $data['to_date_fillter']   = $this->input->post('to_date_fillter_nontag_list');

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
            $fdate =" AND sale_date='".$data['today_date_fillter']."'";
            $tdate ='';
                
            
        }

        if($data['dt_fill']=="week"){
            $today=date('l');
            if($today=="Sunday"){
                $data['week_from_date_fillter']=date(' Y-m-d', strtotime("sunday 0 week"));
           
                $data['week_to_date_fillter']=date(' Y-m-d', strtotime("saturday 1 week"));
               // print_r($data['week_to_date_fillter']);exit;
                    $fdate =" AND sale_date>='".$data['week_from_date_fillter']."'";
                $tdate =" AND sale_date<='".$data['week_to_date_fillter']."'";

            }else{
             $data['week_from_date_fillter']=date(' Y-m-d', strtotime("sunday -1 week"));
           
             $data['week_to_date_fillter']=date('Y-m-d', strtotime("saturday 0 week"));
            //  print_r($data['week_to_date_fillter']);exit;
                 $fdate =" AND sale_date>='".$data['week_from_date_fillter']."'";
             $tdate =" AND sale_date<='".$data['week_to_date_fillter']."'";
            }
                     }
                    if($data['dt_fill']=="monthly"){
                   
                        $first=date('Y-m-01');
                        $last=date('Y-m-t');
                        $fdate =" AND sale_date>='".$first."'";
                        
                       
                            $tdate ="AND sale_date<='".$last."'";
                        }

                if($data['dt_fill']=="custom Date"){

                if($data['from_date_fillter']!=''){

                    $first=date('Y-m-d',strtotime($data['from_date_fillter']));
                    $fdate =" AND sale_date>='".$first."'";
                    
                    }
                    else{
                        $fdate ='';
                    }
                    if($data['dt_fill']=="custom Date"){
                if($data['from_date_fillter']!=''){
                    $first=date('Y-m-d',strtotime($data['from_date_fillter']));
                    $fdate =" AND sale_date>='".$first."'";
                    
                    }
                    else{
                        $fdate ='';
                    }
                    if($data['to_date_fillter']!=''){
                        $last=date('Y-m-d',strtotime($data['to_date_fillter']));
                        $tdate =" AND sale_date<='".$last."'";
                        
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

           $data['sale_list'] = $this->Akssalequotation_model->get_sale_list_fill($fdate,$tdate,$offset,$page_limit);
           $data['count'] = count($this->db->query("SELECT * FROM AKS_SALE_QUTOTATION_ENTRY WHERE status!='N'  $fdate $tdate  ORDER BY sid DESC")->result_array());
            $data['quotationcount'] = count($this->db->query("SELECT * FROM AKS_SALE_QUTOTATION_ENTRY WHERE status!='N' AND status='Y'   $fdate $tdate  ORDER BY sid DESC")->result_array());
            $data['salescount'] = count($this->db->query("SELECT * FROM AKS_SALE_QUTOTATION_ENTRY WHERE status!='N' AND status!='Y'   $fdate $tdate  ORDER BY sid DESC")->result_array());

            $data['exportquotation'] = json_encode($this->db->query("SELECT * FROM AKS_SALE_QUTOTATION_ENTRY WHERE status!='N'  $fdate $tdate  ORDER BY sid DESC")->result_array());

           // print_r($data['counts']);exit;
        $this->load->view('akssalequotation/akssalequotation_list',$data);
    }
   
    public function sales_view()
    {
        $sid  = $_GET['id'];
        $data = $this->Akssalequotation_model->get_sale_list_view($sid);

        echo json_encode($data[0]);
    }
    public function aks_party_details(){


        $sid = $_POST['id'];

        $data = $this->Akssalequotation_model->get_sale_list_view($sid);
        $party_id = $data[0]['id_party'];

        //$row = $this->db->select('*')->from('PARTIES')->where('PID',$party_id)->get()->row();
         $row = $this->db->query("SELECT * FROM PARTIES WHERE PID='".$party_id."' ")->row();

        if ($row!='') {
          
              $title='';
              $name='';
              
             
              $firstname= $row->NAME;
              $id_party = $row->PID;

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
             
              $address=$ADDRESS1.', '.$CITY;


              $shipping = $this->db->query("select * from AKS_SHIPPING_ADDRESS where party_id='".$row->PID."'")->row();
              if(isset($shipping)){
                $shipment_address = $shipping->address.', '.$shipping->city.' ,'.$shipping->state.' - '.$shipping->pincode;
                
              }else{
                 $shipment_address=$ADDRESS1.', '.$CITY;
              }

              $phone=$row->PHONE?$row->PHONE:'-';
              $email=$row->EMAIL?$row->EMAIL:'-';


              echo $row->PID.'||'.$firstname.'||'.$address.'||'.$phone.'||'.$email;
          }else{

            echo '';

          }
              
    }

     public function aks_party_supplier_details(){


        $sid = $_POST['id'];
        $data = $this->Akssalequotation_model->get_sale_list_view($sid);
        $party_id = $data[0]['id_party'];

         $row = $this->Akssalequotation_model->get_sale_sup_view($party_id);

        if ($row!='') {
          
              $title='';
              $name='';
              
              $id_party  = $row->LEDGER_SNO;
              $firstname = $row->LEDGER_NAME?$row->LEDGER_NAME:'-';
              $lastname  = $row->LASTNAME?$row->LASTNAME:'';
              $address1  = $row->ADDRESS?$row->ADDRESS:'';
              $address2  = $row->ADDRESS2?$row->ADDRESS2:'';
              $city      = $row->CITY?$row->CITY:'';
              $state     = $row->STATE?$row->STATE:'';
              $phone     = $row->PHONE?$row->PHONE:'';
              $email     = $row->EMAIL?$row->EMAIL:'';
              $address   = $lastname.$address1.$address2.' ,'.$city.$state;


              echo $id_party.'||'.$firstname.'||'.$address.'||'.$phone.'||'.$email;
          }else{

            echo '';

          }
              
    }
    public function aks_supplier_details(){


        $sid = $_POST['id'];

        $row = $this->Akssalequotation_model->get_sale_sup_view($sid);

        if ($row!='') {
          
              $title='';
              $name='';
              
              $id_party  = $row->LEDGER_SNO;
              $firstname = $row->LEDGER_NAME?$row->LEDGER_NAME:'-';
              $lastname  = $row->LASTNAME?$row->LASTNAME:'';
              $address1  = $row->ADDRESS?$row->ADDRESS:'';
              $address2  = $row->ADDRESS2?$row->ADDRESS2:'';
              $city      = $row->CITY?$row->CITY:'';
              $state     = $row->STATE?$row->STATE:'';
              $phone     = $row->PHONE?$row->PHONE:'';
              $email     = $row->EMAIL?$row->EMAIL:'';
              $address   = $lastname.$address1.$address2.' ,'.$city.$state;


              echo $id_party.'||'.$firstname.'||'.$address.'||'.$phone.'||'.$email;
              
          }else{

            echo '';

          }              
    }

     public function sales_ship_view()
    {
        $sid  = $_POST['id'];
        $data = $this->Akssalequotation_model->get_sale_ship_view($sid);

        echo json_encode($data[0]);
    }

    public function sales_ship_sts_chk()
    {
        $sid  = $_POST['id'];
        $data = $this->Akssalequotation_model->get_sale_ship_check($sid);

        echo json_encode($data[0]);
    }


    public function sale_view()
    {
        $pid = $_POST['id'];
        $data['pur_details'] = $this->Akssalequotation_model->get_sale_list($pid);
        $this->load->view('akssalequotation/',$data);
    }

    public function sale_view_table()
    {
        $sid    = $_POST['id'];
        $getid  = $this->db->query("SELECT * FROM AKS_SALE_QUTOTATION_ENTRY WHERE sid='".$sid."' ")->row();        
        $product_id = $getid?$getid->sale_id:'';
       
        $data['cart_view'] = $this->Akssalequotation_model->get_cart_view($product_id);
         $i=1;
         $row='';
         $tr_id=str_replace('/','_',$product_id);
        
        foreach ($data['cart_view'] as $view)
        {
            // print_r($view['product_id']); 
            
         $prdname  = $this->db->query("SELECT * FROM AKS_PRD_MASTER WHERE AKS_PRD_MID ='".intval($view['product_id'])."' ")->row();
         
         $row.='<tr id="tr"><td>'.($i).'</td><td>'.$prdname->AKS_PRD_NAME.'</td><td>'.$view["product_wgt"].'</td><td>'.$view["sale_price"].'/'.$prdname->AKS_PRD_WT.'</td><td>'.$view["price"].'</td></tr>';
          $i++;
        }
        echo $row;     

        // $this->load->view('akssalequotation/view_table_sale',$data);  

   }
   public function sale_view_table_new()
    {
        $sid    = $_POST['id'];
        $getid  = $this->db->query("SELECT * FROM AKS_SALE_QUTOTATION_ENTRY WHERE sid='".$sid."' ")->row();        
        $product_id = $getid?$getid->sale_id:'';
       
        $data['cart_view'] = $this->Akssalequotation_model->get_cart_view($product_id);
        //  $i=1;
        //  $row='';
        //  $tr_id=str_replace('/','_',$product_id);
        
        // foreach ($data['cart_view'] as $view)
        // {
        //     // print_r($view['product_id']); 
            
        //  $prdname  = $this->db->query("SELECT * FROM AKS_PRD_MASTER WHERE AKS_PRD_MID ='".intval($view['product_id'])."' ")->row();
         
        //  $row.='<tr id="tr"><td>'.($i).'</td><td>'.$prdname->AKS_PRD_NAME.'</td><td>'.$view["product_wgt"].'</td><td>'.$view["sale_price"].'/'.$prdname->AKS_PRD_WT.'</td><td>'.$view["price"].'</td></tr>';
        //   $i++;
        // }
        // echo $row;     

        $this->load->view('akssalequotation/view_table_sale',$data);  

   }
   public function sale_ship_pack_view_table()
    {
        $sid         = $_POST['id'];
        $getid       = $this->db->query("SELECT * FROM AKS_SALE_QUTOTATION_ENTRY WHERE sid='".$sid."' ")->row();        
        $sale_id_get = $getid?$getid->sale_id:'';       
        $data['cart_view'] = $this->db->query("SELECT * FROM AKS_SALE_QUTOTATION_ENTRY WHERE sale_id LIKE '".'%'.$sale_id_get.'%'."' ")->result_array(); 
        $this->load->view('akssalequotation/packing_shiping_billed_table_view',$data);  

    }
    public function sale_print($sprint)
    {

        
        
        // $getid = $this->db->query("SELECT * FROM AKS_SALE_QUTOTATION_ENTRY where sid='".$sprint."' ")->row();

        // $product_id = $getid->sale_id;

       
        // print_r($product_id); exit;
       
        $data['sale_print'] = $this->Akssalequotation_model->get_sale_print($sprint);


        // $pr_id = $data['sale_print'];

        // $product = $pr_id->sale_id;

         $getid = $this->db->query("SELECT * FROM AKS_SALE_QUTOTATION_ENTRY where sid='".$sprint."' ")->row();


        

        $product_id = $getid->sale_id;


        $data['print_cart_view'] = $this->Akssalequotation_model->get_cart_print($product_id);


        // $data['party_d'] = $this->db->query("SELECT * FROM PARTIES WHERE id=".$sprint)->row();
        // print_r($data['sale_print']); exit;


        $this->load->view('akssalequotation/aks_sales_receipt_print',$data);
    }
    public function sale_print_pos($spos)
    {

        
        
        // $getid = $this->db->query("SELECT * FROM AKS_SALE_QUTOTATION_ENTRY where sid='".$spos."' ")->row();

        // $product_id = $getid->sale_id;

       
        // print_r($product_id); exit;
       
        $data['sale_pos'] = $this->Akssalequotation_model->get_sale_print($spos);

        // print_r($data['sale_pos']); exit;
        // $pr_id = $data['sale_print'];

        // $product = $pr_id->sale_id;

         $getid= $this->db->query("SELECT * FROM AKS_SALE_QUTOTATION_ENTRY where sid='".$spos."' ")->row();


        // print_r($data['print_pos_prd_detail']); exit;

        $product_id = $getid->sale_id;


        $data['print_cart_view_pos'] = $this->Akssalequotation_model->get_cart_pos($product_id);


        // $data['party_d'] = $this->db->query("SELECT * FROM PARTIES WHERE id=".$spos)->row();
        // print_r($data['sale_print']); exit;


        $this->load->view('akssalequotation/aks_shipping_pos',$data);
    }

  public function change_delivery(){


        $sid = $_GET['id'];
        $data = $this->Akssalequotation_model->get_sale_list_view($sid);
        echo json_encode($data[0]);
}



    public function  delivery_update(){

       $data['sid'] = $this->input->post('delivery_approved');
       // print_r($data['sid']);exit;
       $sid=$data['sid'];

       // $delivery_approved  = $this->db->query("SELECT * FROM AKS_SALE_QUTOTATION_ENTRY WHERE sid='".$sid ."' ")->row();
       // // print_r($delivery_approved);exit;
       $data['sale_del_by']         = $this->input->post('del_by');
       // $sale_del_by = $data['sale_del_by'];
       // $delivery_approved = $sale_del_by;
        $res= $this->db->query("UPDATE AKS_SALE_QUTOTATION_ENTRY set sale_deliverymode='Courier' where sid=". $sid);

       $data['sale_track_id']         = $this->input->post('tracking_id');
       $sale_track_id = $data['sale_track_id'];
       $delivery_approved = $sale_track_id;
        $res= $this->db->query("UPDATE AKS_SALE_QUTOTATION_ENTRY set sale_track_id='". $delivery_approved."' where sid=". $sid);
       

       // $data['sale_del_by']         = $this->input->post('del_by');
       // $data['sale_track_id']       = $this->input->post('tracking_id');
       redirect('Akssalequotation/');
       // $res = $this->Akssalequotation_model->del_approve($data);
    }
    

    public function add_cart_list()
    {
        $plid  = $_POST['id'];
        $count = $_POST['count'];
        $data['cart_list'] = $this->Akssalequotation_model->get_cart_list($plid);
      
        // // print_r($data['cart_list']);exit;
         $prd_img =$data['cart_list']->AKS_PRD_IMG;


         $prd_name =$data['cart_list']->AKS_PRD_NAME;
         $prd_hsn =$data['cart_list']->HSN_CODE;
         // print_r($prd_name);exit;
         $prd_sale_price =$data['cart_list']->AKS_PRD_PRICE;
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
         $row='<tr onclick="add_cart()" name="count"><td>'.($count+1).'<input type="hidden" name="item_count_hidden[]"  id="item_count_hidden'.$count.'" value="'.($count+1).'"></td>

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
         <td>

         <div><input type="text" name="sale_wgt[]" id="prd_wgt'.$count.'" value="1000"  onkeyup="cart_prd_cal('.$count.')" onfocusout="cart_prd_cal_total('.$count.')" value="0" class="form-control form-control-lg form-control-solid fs-7"></div></td>

         <td><span onkeyup="cart_prd_cal()" name="lb_prd_price" id="lb_prd_price'.$count.'">'.$prd_sale_price.'/'.$unit_price.
          
         '</span><input type="hidden" name="prd_unit[]" id="prd_unit'.$count.'" value="'.$unit_price.'">
           
         <input type="hidden" name="prd_sale_price_hidden[]" id="prd_sale_price_hidden" value="'.$prd_sale_price.'">
         <input type="hidden" name="prd_hsn_hidden[]" id="prd_hsn_hidden" value="'.$prd_hsn.'"></td></td>
          
         <td id="lbl_price_tot'.$count.'">0.00</td>
         
         <td>
            <a href="#" name="'.$count.'"  class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm btnDelete" data-bs-toggle="modal">
                <span class="svg-icon svg-icon-3">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z" fill="currentColor"></path>
                        <path opacity="0.5" d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z" fill="currentColor"></path>
                        <path opacity="0.5" d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z" fill="currentColor"></path>
                    </svg>
                </span>
            </a>
           </td></tr>';
           

           echo $row;

    }

   public function akssalequotation_new(){

        $data['category_list1']  = $this->db->query("SELECT * FROM AKSPRODUCT_CATEGORY WHERE Status='Y'  ")->result_array();       
        $data['sale_menu']       = $this->Akssalequotation_model->get_sale_detail();
        $data['sale_price']      = $this->Akssalequotation_model->get_sale_detail();
        $data['suppliers_lists'] = $this->Akssalequotation_model->getSupplier();
        // print_r($data['pur_price']);exit;

         $this->load->view('akssalequotation/akssalequotation_new',$data);
        
}
   
     public function image_view()
    {
        $id = $_POST['id'];
        $response='<div class="image-input-wrapper w-250px h-250px" style="background-image: url(<?php echo base_url() ?>assets/images/aks_product_image/<?php echo $id; ?>)"></div>';
        echo $response;
    }
    
  public function category_select(){

        $clid = $_POST['id'];

        if($clid != 'all'){
          $result  = $this->db->query("SELECT * FROM AKS_PRD_MASTER WHERE AKS_CAT_NAME = '".$clid."'")->result_array();
        }else{
          $result  = $this->db->query("SELECT * FROM AKS_PRD_MASTER WHERE STATUS='Y'")->result_array();
        }
        // echo $clid;      


                  
                                  
         $menuchange='';                      
         foreach($result as $plist){ 
          $image_url =  base_url().'assets/images/aks_product_image/'.$plist['AKS_PRD_IMG']; 
          $product_name = $plist["AKS_PRD_NAME"];
            if (strlen($product_name) > 10) {
                $product_name = substr($product_name, 0, 10) ."...";
            } 

          
          $menuchange = $menuchange.'<div class="col-lg-3 fv-row fv-plugins-icon-container" onclick="add_cart('.$plist["AKS_PRD_MID"].')"><a href="javascript:;" id="add_cart"><div class="image-input-wrapper overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover w-90px h-80px me-3" style="background-image: url('.$image_url.'); border-radius: 10px; "> </div> </a><div class="d-flex flex-column"> <a href="javascript:;" class="text-gray-600 text-hover-primary fs-7 pdt_tltp"><span>'.$product_name.'</span><span class="pdt_sub_tltp">'.$plist['AKS_PRD_NAME'].'</span>
            </a></div><span  class="fs-6 fw-bold"><i class="fa-sharp fa-solid fa-indian-rupee-sign eyc fs-6" id="add_cart"></i>'.$plist["AKS_PUR_PRICE"].'/g</span></div>';
          
         }   

          echo $menuchange;           
         // print_r($result);
         // exit;
    }
    
   public function suplier_drop_down()
    {
        $data['supplier_list']  = $this->Akssalequotation_model->get_supplier_list();
        echo json_encode($data['supplier_list']);
    }
 public function payment_details(){

      $sdid = $_POST['id'];
      // print_r($sdid); exit;
      
      $getid = $this->db->query("SELECT * FROM AKS_SALE_QUTOTATION_ENTRY WHERE sid='".$sdid."' ")->row();
      // print_r($getid ); exit;
        $payment_id     = $getid->sale_id;
        $partial_packing= $getid->partial_packing;
      $data['payment_detail'] = $this->Akssalequotation_model->get_payment_details($payment_id);

      // print_r($data['payment_detail']); exit;

      // foreach ($data['payment_detail'] as $pur_det) {
  

         $cash = $this->Akssalequotation_model->get_cash($payment_id);
         // print_r($cash);exit;

         $cash_amount   = $cash->amount?$cash->amount:0;
         $cash_detail   = $cash->remarks?$cash->remarks:'-';

         // print_r($cash_detail);exit;
         
          $cheque = $this->Akssalequotation_model->get_cheque($payment_id);
         // print_r($cheque);
          $cheque_amount    =$cheque?$cheque->amount:0;
          $chq_refno        =$cheque?$cheque->cheque_ref_no:'-';
          $chq_sup_bank     =$cheque?$cheque->party_bank:'-';
          $chq_detail       =$cheque?$cheque->remarks:'-';


          $rtgs = $this->Akssalequotation_model->get_rtgs($payment_id);
          // print_r($rtgs);
          $rtgs_amount      =$rtgs?$rtgs->amount:0;
          $rtgs_refno       =$rtgs?$rtgs->cheque_ref_no:'-';
          $rtgs_cbank       =$rtgs?$rtgs->company_bank:'-';
          $rtgs_detail      =$rtgs?$rtgs->remarks:'-';

           $upi = $this->Akssalequotation_model->get_upi($payment_id);
        //    print_r($upi);exit;
           $upi_amount      =$upi?$upi->amount:0;
           $upi_refno       =$upi?$upi->cheque_ref_no:'-';
           $upi_cbank       =$upi?$upi->company_bank:'-';
           $upi_detail      =$upi?$upi->remarks:'-';


           if($cash_amount>0){
           $cash_tr='
                    <tr>
                    <td><label class="col-form-label fw-bold fs-3">Cash</label></td>
                    <td><label class="col-form-label fw-bold fs-7">'.$cash_amount.'</label></td>
                    <td>-</td>
                    <td>-</td>
                    <td><label class="col-form-label fw-bold fs-7">'.$cash_detail.'</label></td>
                    </tr>
                    ';
            }else{
               $cash_tr ='';
            }
            if($cheque_amount>0){
            $cheque_tr='
                    <tr>
                    <td><label class="col-form-label fw-bold fs-3">Cheque</label></td>
                    <td><label class="col-form-label fw-bold fs-7">'.$cheque_amount.'</label></td>
                    <td><label class="col-form-label fw-bold fs-7">'.$chq_refno.'</label></td>
                    <td><label class="col-form-label fw-bold fs-7">'.$chq_sup_bank.'</label></td>
                    <td><label class="col-form-label fw-bold fs-7">'.$chq_detail.'</label></td>
                    </tr>';
            }
            else{$cheque_tr=''; }

            if($rtgs_amount>0){
            $rtgs_tr='<tr><td><label class="col-form-label fw-bold fs-2">RTGS</label></td>
                      <td><label class="col-form-label fw-bold">'.$rtgs_amount.'</label></td>
                      <td><label class="col-form-label fw-bold">'.$rtgs_refno.'</label></td>
                      <td><label class="col-form-label fw-bold">'.$rtgs_cbank.'</label></td>
                      <td><label class="col-form-label fw-bold">'.$rtgs_detail.'</label></td></tr>';   
            }
            else{
               $rtgs_tr=''; 
            }

            if($upi_amount>0){
            $upi_pay=
                     '<tr><td><label class="col-form-label fw-bold fs-3">UPI</label></td>
                      <td><label class="col-form-label fw-bold">'.$upi_amount.'</label></td>
                      <td><label class="col-form-label fw-bold">'.$upi_refno.'</label></td>
                      <td><label class="col-form-label fw-bold">'.$upi_cbank.'</label></td>
                      <td><label class="col-form-label fw-bold">'.$upi_detail.'</label></td></tr>';  
                    // echo  $upi_pay;  
                  }
                  else{
                    $upi_pay='';
                  }
             
                    // print_r($cheque_tr);exit;
             // echo ''.'||'.$cash_tr;


             echo ''.'||'.$cash_tr.'||'.$cheque_tr.'||'.$rtgs_tr.'||'. $upi_pay.'||'. $partial_packing; 

    }
    public function order_hold()
    {

        $id = $_POST['id'];

       $get=$this->db->query("SELECT * FROM  AKS_SALE_QUTOTATION_ENTRY WHERE sid='".$id."'")->row();
       // $data['sale_list_detail']=$this->db->query("SELECT * FROM  AKS_SALE_QUTOTATION_CART WHERE sale_id='".$data['sale_detail']->sale_id."'")->result_array();
        $data['details'] = $get;
        $this->load->view('akssalequotation/onhold_status_change',$data);
    }
    public function order_onhold_view()
    {

        $id = $_POST['id'];

        $get=$this->db->query("SELECT * FROM  AKS_SALE_QUTOTATION_ENTRY WHERE sid='".$id."'")->row();
        
        if ($get!='') {
        $reason = $get->reason_hold?$get->reason_hold:'-';
        }else{
            $reason = ' - ';
        }

        echo $reason; 
        // $this->load->view('akssalequotation/onhold_status_change',$data);
    }

    
    public function hold_order()
    {

        $id     = $_POST['id'];
        $reason = $_POST['reason_hold'];

        $status = 'H';

       /* $stop = [

            'status'        => $status,
            'reason_hold'   => $reason,
        ];*/
     
       //$result = $this->db->select('*')->from('AKS_SALE_QUTOTATION_ENTRY')->where(["sid" => $id])->set($stop)->update();
       $result = $this->db->query("UPDATE AKS_SALE_QUTOTATION_ENTRY SET status='".$status."',reason_hold='".$reason."' where sid='".$id."'");
       
        $get=$this->db->query("SELECT * FROM  AKS_SALE_QUTOTATION_ENTRY WHERE sid='".$id."'")->row();
        $details = $get;
       if ($result) {

             add_notification(date('Y-m-d H:i:s'), '', "Others", "Karupatti<br> Order OnHold", $details->sale_id. ' created By ' .$_SESSION['username'],'', $_SESSION['USERID'], '0', $details->sale_id);
             redirect('Akssalequotation/');
       }

        
    }
    public function order_unhold()
    {

        $id = $_POST['id'];

       $get=$this->db->query("SELECT * FROM  AKS_SALE_QUTOTATION_ENTRY WHERE sid='".$id."'")->row();
        $data['details'] = $get;
        $this->load->view('akssalequotation/unhold_status_change',$data);
    }

    public function unhold_order()
    {

        $id = $_POST['id'];

        $status = 'Y';

        /*$stop = [

            'status'        => $status,
            'reason_hold'   => '',
        ];*/
     
      // $result  = $this->db->select('*')->from('AKS_SALE_QUTOTATION_ENTRY')->where(["sid" => $id])->set($stop)->update();
       $result = $this->db->query("UPDATE AKS_SALE_QUTOTATION_ENTRY SET status='Y',reason_hold='' WHERE sid='".$id."'");
       
        $details = $this->db->query("SELECT * FROM  AKS_SALE_QUTOTATION_ENTRY WHERE sid='".$id."'")->row();
       if ($result) {

             add_notification(date('Y-m-d H:i:s'), '', "Others", "Karupatti<br> Order Release", $details->sale_id. ' created By ' .$_SESSION['username'],'', $_SESSION['USERID'], '0', $details->sale_id);
             redirect('Akssalequotation/');
       }

        
    }


    public function sale_save()
    {   
        
        
        $data['sale_date']  = $this->input->post('sale_date');

        $saledate=date('Y-m-d',strtotime($data['sale_date']));

         $last_sid_detail = $this->Akssalequotation_model->last_sid_details();

         if($last_sid_detail!=''){

            $last_data = $last_sid_detail? $last_sid_detail->sale_id :1;

                $year = substr( date("y"), -2);
                $slice = explode("/", $last_data);
                $result = preg_replace('/[^0-9]/',' ', $slice[0]); 
                function request_num ($input, $pad_len = 3  , $prefix = null) {
                    // if ($pad_len <= strlen($input))
                    //     trigger_error('<strong>'.$pad_len.'</strong> cannot be less than or equal to the length of <strong>'.$input.'</strong> to generate sale number', E_USER_ERROR);
                
                    if (is_string($prefix))
                    
                    return sprintf("%s%s", $prefix, str_pad($input, $pad_len, "0", STR_PAD_LEFT));
                
                    return str_pad($input, $pad_len, "0", STR_PAD_LEFT);
                }

                $request =  request_num(((int)$result+1), 4, "AKSSQ-");
                
                $request_id =  $request.'/'.$year;

              $sale_id = $request_id;
              }
              else{
                $year = substr( date("y"), -2);
                $sale_id=  'AKSSQ-0001/'.$year;
        }


        $data['sale_id']     = $sale_id;

        $data['type']  = $this->input->post('aks_sls_qut_type');

        if ($data['type']=='party') {
            
            $data['sale_party']   = $this->input->post('sale_party');
            $data['id_partys']    = $this->input->post('party_id_hidden');
            $data['party_type']   = 'party';

        }else{

            
            $data['sup_party']  = $this->input->post('supplier_id_name');
            $exp = explode('~', $data['sup_party']);
            $sup_name = $exp[0];
            $sup_id   = $exp[1];

            $data['sale_party']   = $sup_name?$sup_name:'';
            $data['id_partys']    = $sup_id?$sup_id:'';
            $data['party_type']   = 'supplier';
        }


        
        $data['sale_wgt']         = $this->input->post('sale_wgt');
        $data['sale_price']       = $this->input->post('prd_sale_price_hidden');
        $data['unit']             = $this->input->post('prd_unit');
        $data['prd_id']           = $this->input->post('prd_id_hidden');
        $data['HSN_CODE']         = $this->input->post('prd_hsn_hidden');
        $data['remarks']          = $this->input->post('remarks');  
        $data['sale_prd_tot_amt'] = $this->input->post('totalamount');
        $data['sale_dis_amt']     = $this->input->post('dis_cart_amt')?$this->input->post('dis_cart_amt'):0;
        $data['sale_net_amt']     = $this->input->post('netamount');
        // $data['sale_pay_mode']    = $this->input->post('pay_mode');
        $data['sale_cash']        = 0;
        $data['balance_cash']     = 0;
        $data['create_by']        = $_SESSION['username'];
        $data['create_on']        = date('Y-m-d H:i:s');
        $data['status']           = 'Y';
        
        // $data['sale_del_by']         = $this->input->post('del_by');
        // $data['sale_track_id']       = $this->input->post('tracking_id');

        

        $count=count($data['sale_price'] );

        $count1 = $count;

        $data['sale_prd_count']   = $count1;

        $result = $this->Akssalequotation_model->sale_entry($data,$saledate);
        if ($result) {

            for($i=0;$i<$count1;$i++){

            $wgt        =  $data['sale_wgt'][$i] ;

            $unit_price =  $data['unit'][$i];

            $purprice   = $data['sale_price'][$i];
            
            $tot =( $wgt  / $unit_price  ) * $purprice ;

            $total_price = $tot;
              
           
            $res=$this->db->query("INSERT INTO AKS_SALE_QUTOTATION_CART
                (product_id,product_wgt,HSN_CODE,sale_price,price,sale_id) values ('".$data['prd_id'][$i]."','".$data['sale_wgt'][$i]."','".$data['HSN_CODE'][$i]."','".$data['sale_price'][$i]."','".$total_price."','".$data['sale_id']."')");

          }


        }
        
        if ($result) {
            add_notification(date('Y-m-d H:i:s'), '', "Others", "karupatti<br> New Sale Quotation", $sale_id. ' created By ' .$_SESSION['username'],'', $_SESSION['USERID'], '0', $sale_id);
        }

        if($result)
        {
            $this->session->set_flashdata('g_success',  $data['sale_id'].' New Sales have been added successfully...');
        }else{
           $this->session->set_flashdata('g_err', 'Could not add purchase !');
        }
        redirect('Akssalequotation/');
         
    }
    
    public function sale_list_det()
    {
     
      $search =  $_GET['query']; 
      $rows   = $this->Akssalequotation_model->getParty($search);
      // print_r($rows);
      // exit;
      
      $res='[';
      if(count($rows)>0) {
         foreach($rows as $row )
          {
              $title='';
              $name='';
              
             
              $firstname=$row->NAME;
              $id_party=$row->PID;

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
             
              $address=$ADDRESS1.', '.$CITY;


              $shipping = $this->db->query("select * from AKS_SHIPPING_ADDRESS where party_id='".$row->PID."'")->row();
              if(isset($shipping)){
                $shipment_address=$shipping->address.', '.$shipping->city;
                
              }else{
                 $shipment_address=$ADDRESS1.', '.$CITY;
              }
              $phone=$row->PHONE;
              $email=$row->EMAIL;
             
              $title = $firstname.'-'.$phone.'-'.$address;
              $res.='{ "title":"'.$title.'","id_party": "'.$row->PID.'","firstname":"'.$firstname.'","address":"'.$address.'","shipment_address":"'.$shipment_address.'","phone":"'.$phone.'","email":"'.$email.'"},';

              
          }
        $res=rtrim($res,',');
        $res.=']';
      }
      else{
        $res.=']';
      }
      print_r($res);die();
      // print_r($res);
      // print_r($data);
      // exit();
    
      }
      public function delivery_approve()
    {

       $id=$_POST['id'];

      
     $del  = $this->db->query("SELECT * FROM AKS_SALE_QUTOTATION_ENTRY WHERE sid='".$id ."' ")->row();
     echo $del->sid;   
     //$this->load->view('lotentry/lotentry_approve',$data);
    }

    public function add_party()
    {
       $name = $this->input->post('new_party_name');
       $lname = $this->input->post('new_party_lname');
       $company_name = $this->input->post('company_name');
       $country = $this->input->post('country');
       $state = $this->input->post('state');
       $bill_address = $this->input->post('new_party_bill_address');
       $town_city = $this->input->post('town_city');
       $pincode = $this->input->post('pincode');
       $mobile = $this->input->post('new_party_mobile');
       $email = $this->input->post('new_party_email');
       $gst_no = $this->input->post('new_party_gst_no');
       $other = $this->input->post('shiping_div');
       if ($other==1) {

           $name1 = $this->input->post('new_party_name1');
           $lname1 = $this->input->post('new_party_lname1');
           $company_name1 = $this->input->post('company_name1');
           $country1 = $this->input->post('country1');
           $state1 = $this->input->post('state1');
           $bill_address1 = $this->input->post('new_party_bill_address1');
           $town_city1 = $this->input->post('town_city1');
           $pincode1 = $this->input->post('pincode1');
           $mobile1 = $this->input->post('new_party_mobile1');
           $email1 = $this->input->post('new_party_email1');  
       }else{
        
           $name1 = $this->input->post('new_party_name');
           $lname1 = $this->input->post('new_party_lname');
           $company_name1 = $this->input->post('company_name');
           $country1 = $this->input->post('country');
           $state1 = $this->input->post('state');
           $bill_address1 = $this->input->post('new_party_bill_address');
           $town_city1 = $this->input->post('town_city');
           $pincode1 = $this->input->post('pincode');
           $mobile1 = $this->input->post('new_party_mobile');
           $email1 = $this->input->post('new_party_email');  
       }
       $userlist=$this->db->query("SELECT * FROM USERLIST WHERE NAME='".$_SESSION['username']."' ")->row();
       $prefix  =$userlist->LOANPREFIX;
       $id_get  =$this->db->query("SELECT * FROM KEYMASTER WHERE KEYNAME='PARTIES-".$prefix."' ")->row();
       $suffix  =str_pad($id_get->KEYVALUE+1, 6, '0', STR_PAD_LEFT);
       $party_id=$prefix.$suffix;
       // exit();
       $res     =$this->db->query("INSERT INTO  PARTIES(PID,NAME,FATHERSNAME,COMPANY_NAME,PHONE,COUNTRY,STATE,PINCODE,ADDRESS1,CITY,EMAIL,IS_KARUPATTI,GST_NO) VALUES('".$party_id."','".$name."','".$lname."','".$company_name."','".$mobile."','".$country."','".$state."','".$pincode."','".$bill_address."','".$town_city."','".$email."','1','".$gst_no."')");

        $res=$this->db->query("INSERT INTO  AKS_SHIPPING_ADDRESS (party_id,name,lname,company_name,mobile,country,state,pincode,address,city,email) VALUES('".$party_id."','".$name1."','".$lname1."','".$company_name1."','".$mobile1."','".$country1."','".$state1."','".$pincode1."','".$bill_address1."','".$town_city1."','".$email1."')");

        $update=$this->db->query("UPDATE KEYMASTER SET KEYVALUE= KEYVALUE+1 WHERE KEYNAME='PARTIES-".$prefix."'");
        redirect('Akssalequotation/aks_new_sale');
    }
    public function shiping_sales_list()
    {

        $data['sale_list']=$this->db->query("SELECT * FROM AKS_SALE_QUTOTATION_ENTRY WHERE status='s' AND sale_deliverymode='courier' AND sale_track_id is NULL  order by sid asc")->result_array();
        $data['count']=count($data['sale_list']);
        $data['supplier_list']  = $this->Akssalequotation_model->get_supplier_list();

        $this->load->view('akssalequotation/shiping_sales_list',$data);
    }

    public function packing_sale_list()
    {

        $data['sale_list']=$this->db->query("SELECT * FROM AKS_SALE_QUTOTATION_ENTRY WHERE status='f' order by sid asc")->result_array();
        $data['count']=count($data['sale_list']);
        $this->load->view('akssalequotation/packing_sale_list',$data);
    }

    // For packing status Change list wrong function name

    public function shipping_status()
    {
        $id=$_POST['id'];
        $sale_id=str_replace('_','/',$id);

        $packed_by    = $_SESSION['username'];
        $packed_on    = date('Y-m-d H:i:s');

        

        

        $response  =  $this->db->query("SELECT * FROM  AKS_SALE_QUTOTATION_ENTRY WHERE sale_id='".$sale_id."' ")->row();

        // print_r($response); exit();

        if ($response->sale_deliverymode=='Direct') {

            $data = [
                            
                'packed_by'    =>$packed_by,
                'packed_on'    =>$packed_on,
                'status'       =>'S',
                'shiped_by'    =>$packed_by,
                'shiped_on'    =>$packed_on,


                ];
                $update = $this->db->query("UPDATE AKS_SALE_QUTOTATION_ENTRY SET packed_by='".$data['packed_by']."',packed_on='".$data['packed_on']."',status='S',shiped_by='".$data['packed_by']."',shiped_on='".$data['packed_on']."' WHERE sale_id='".$sale_id."'");
           
        }else{

            $data = [
                            
                'packed_by'    =>$packed_by,
                'packed_on'    =>$packed_on,
                'status'       =>'S',

                ];

                $update = $this->db->query("UPDATE AKS_SALE_QUTOTATION_ENTRY SET packed_by='".$data['packed_by']."',packed_on='".$data['packed_on']."',status='S' WHERE sale_id='".$sale_id."'");


        }
        


        
        if ($response) {

            $status= $response->status;

            echo ''.'||'.'true'.'||'.$status;
        }else{
            echo ''.'||'.'false'.'||'.'';
        }
         // $update = $this->db->from('AKS_SALE_QUTOTATION_ENTRY')->where("sale_id",$sale_id)->set($data)->update();
    }

    public function courier_delivery()
    {

        $tracking_id=$_POST['tracking_id'];
        $charges=$_POST['charges']?$_POST['charges']:0;
        $courier_edit=$_POST['courier_edit'];
        $id=$_POST['id'];
        $date=date('Y-m-d');
        $shiped_by    = $_SESSION['username'];
        $shiped_on    = date('Y-m-d H:i:s');
        $sale_id=str_replace('_','/',$id);
        if($courier_edit!=''){
            $update=$this->db->query("UPDATE AKS_SALE_QUTOTATION_ENTRY SET delivery_by='".$courier_edit."'  WHERE sale_id='".$sale_id."'");
        }

       /* $data = [
                            
                'sale_track_id'       =>$tracking_id,
                'shipment_charges'    =>$charges,
                'shiped_by'           =>$shiped_by,
                'shiped_on'           =>$shiped_on,
                'status'              =>'D',

                ];*/

         //$update   = $this->db->from('AKS_SALE_QUTOTATION_ENTRY')->where("sale_id",$sale_id)->set($data)->update();

        $update = $this->db->query("UPDATE AKS_SALE_QUTOTATION_ENTRY SET sale_track_id='".$tracking_id."', shipment_charges='".$charges."', status='D',shiped_by='".$shiped_by."',shiped_on='".$shiped_on."' WHERE sale_id='".$sale_id."'");

        $update=$this->db->query("UPDATE AKS_SALE_QUTOTATION_CART SET shiped_wgt=packed_wgt,tracking_id='".$tracking_id."',delivery_charges='".$charges."',delivery_date='".$date."' WHERE sale_id='".$sale_id."'  ");

        $update=$this->db->query("UPDATE AKS_SALE_QUTOTATION_CART SET packed_wgt=0 WHERE sale_id='".$sale_id."'  ");

    }
   
   public function packing($id)
   {
   
        $data['sale_detail']     = $this->db->query("SELECT * FROM  AKS_SALE_QUTOTATION_ENTRY WHERE sid='".$id."'")->row();
        $data['sale_list_detail']= $this->db->query("SELECT * FROM  AKS_SALE_QUTOTATION_CART WHERE sale_id='".$data['sale_detail']->sale_id."'")->result_array();
       $this->load->view('akssalequotation/aks_sale_packing',$data);
   }
   public function partial_packing()
   {
     // print_r(1);exit;
    $sale_id       = $this->input->post('sale_id');
    $cart_id       = $this->input->post('id_hidden');
    $sale_count    = $this->input->post('sale_count');
    $packed_weight = $this->input->post('packed_weight');
    $checked       = $this->input->post('checked');
    $checkbox      = $this->input->post('checkbox');
    $prd_id_hidden = $this->input->post('prd_id_hidden');    
    $count         = count($this->input->post('checkbox'));
    // print_r($checkbox);
    

    $i=0;
    foreach($checkbox as $key => $checkval)
    {

        // print_r($packed_weight[$key]);
        $res=$this->db->query("UPDATE AKS_SALE_QUTOTATION_CART SET packed_wgt=packed_wgt+'".$packed_weight[$key]."' WHERE  id='".$checkval."' ");
        $i++;

    }


    $sale_data = $this->db->query("SELECT sum(product_wgt) as product_wgt, sum(packed_wgt) as packed_wgt FROM AKS_SALE_QUTOTATION_CART WHERE sale_id='".$sale_id."'")->row();
    $prd_wt = $sale_data?$sale_data->product_wgt:0;
    $pck_wt = $sale_data?$sale_data->packed_wgt:0;

    // print_r($prd_wt);


    // print_r($pck_wt);

     // exit();

    if (($prd_wt >= $pck_wt)) {

        $sale_detail = $this->db->query("SELECT * FROM AKS_SALE_QUTOTATION_ENTRY WHERE sale_id= '".$sale_id."'")->row();

            $last_sid_detail = $this->Akssalequotation_model->last_sid_details();           

            $last_data       = $last_sid_detail? $last_sid_detail->sale_id:0;        
            $year            = substr(date("y"), -2);
            $slice           = explode("/", $last_data);
            $result          = preg_replace('/[^0-9]/',' ', $slice[0]); 

            // print_r( $result);
            // exit;

                function request_num ($input, $pad_len = 3  , $prefix = null) {
                   if ($pad_len <= strlen($input))
                       trigger_error('<strong>$pad_len</strong> cannot be less than or equal to the length of <strong>$input</strong> to generate invoice number', E_USER_ERROR);
                   if (is_string($prefix))
                        return sprintf("%s%s", $prefix, str_pad($input, $pad_len, "0", STR_PAD_LEFT));
               
                   return str_pad($input, $pad_len, "0", STR_PAD_LEFT);
                }

                $get_id=$this->db->query("SELECT * FROM AKS_SALE_QUTOTATION_ENTRY WHERE sale_id LIKE '".$sale_id."%' ORDER BY sid DESC ")->row();
               
                $partial_id=explode('-',$get_id->sale_id);

                 
                // print_r($partial_id);

                if(isset($partial_id[2])){
                  $packing_id=$sale_id.'-1';
                }
                else{
                    if(isset($partial_id[2])){
                        $partial    = $partial_id[2]+1;
                    }else{
                        $partial    = 1;
                    }
                    $packing_id = $sale_id.'-'.$partial;
                }

                // print_r($packing_id);exit;


               $created_by    = $_SESSION['username'];
               $created_on    = date('Y-m-d H:i:s');
               $today         = date('Y-m-d');
               $total_amount  = 0; 

               $total=0;
                $j=0;
                foreach($checkbox  as $key => $checkval_insert)
                {
              
                    // print_r($checkval_insert);


                    $cart_detail = $this->db->query("SELECT * FROM  AKS_SALE_QUTOTATION_CART WHERE id='".$checkval_insert."' ")->row();

                    $product_det = $this->db->query("SELECT * FROM AKS_PRD_MASTER WHERE AKS_PRD_MID='".$cart_detail->product_id."'")->row();
                            
                   
                    // $prd_id     = $product_det?$product_det->AKS_PRD_MID:'';
                    $prd_price  = $product_det?$product_det->AKS_PRD_PRICE:0;
                    $prd_weight = $packed_weight[$key];
                    $prd_gram   = $product_det?$product_det->AKS_PRD_WT:0;    

                    $total       = floatval($prd_weight/$prd_gram);
                    $total_price = floatval($total*$prd_price);
                    $res=$this->db->query("INSERT INTO AKS_SALE_QUTOTATION_CART (product_id,product_wgt,packed_wgt,HSN_CODE,sale_price,price,sale_id) VALUES ('".$checked[$key]."','".$packed_weight[$key]."','".$packed_weight[$key]."','".$cart_detail->HSN_CODE."','".$cart_detail->sale_price."','".$total_price."','".$packing_id."')");                        

                    $total_amount+=$total_price;
                    $j++;
                }

                // exit();
               $result  = $this->db->query("INSERT INTO AKS_SALE_QUTOTATION_ENTRY
                (sale_date
                ,sale_id
                ,sale_party
                ,sale_prd_count
                ,sale_deliverymode
                ,delivery_by
                ,shipment_to
                ,sale_prd_tot_amt
                ,sale_dis_amt
                ,sale_net_amt
                ,sale_cash
                ,balance_cash
                ,create_by
                ,create_on
                ,status
                ,id_party
                ,shipment_charges
                ,partial_packing
                )
                VALUES
                (
                '".$today."',
                '".$packing_id."',
                '".$sale_detail->sale_party."',
                '".$count."',
                '".$sale_detail->sale_deliverymode."',
                '".$sale_detail->delivery_by."',
                '".$sale_detail->shipment_to."',
                '".$total_amount."',
                '0',
                '".$total_amount."',
                '".$sale_detail->sale_cash."',
                '".$sale_detail->balance_cash."',
                '".$created_by."',
                '".$created_on."',
                'F',
                '".$sale_detail->id_party."',
                '0',
                '1'
                )");

        if (($prd_wt == $pck_wt)) {

             $update = $this->db->query("UPDATE  AKS_SALE_QUTOTATION_ENTRY SET status='F' WHERE sale_id='".$sale_id."'");
         }
         else{
            $update = $this->db->query("UPDATE  AKS_SALE_QUTOTATION_ENTRY SET status='P' WHERE sale_id='".$sale_id."'");
         }

    }
    else{

        $update=$this->db->query("UPDATE  AKS_SALE_QUTOTATION_ENTRY SET status='F' WHERE sale_id= '".$sale_id."'");
    }
    
    // exit;

    redirect('Akssalequotation');
   }
   public function full_packing()
   {
    $sale_count = $this->input->post('sale_count')?$this->input->post('sale_count'):0;
        $checked = $this->input->post('checked');
        for($i=0;$i<$sale_count;$i++){

            if(isset($checked[$i])){
                // $res=$this->db->query("UPDATE AKS_SALE_QUTOTATION_CART SET packed_wgt=product_wgt+'".$packed_weight[$i]."' WHERE sale_id= '".$checked[$i]."'");
                // $update=$this->db->query("UPDATE  AKS_SALE_QUTOTATION_ENTRY SET status='F' WHERE sale_id= '".$checked[$i]."'");  

                $res=$this->db->query("UPDATE AKS_SALE_QUTOTATION_CART SET packed_wgt=COALESCE(product_wgt, 0)  WHERE sale_id= '".$checked[$i]."'");
               $update=$this->db->query("UPDATE  AKS_SALE_QUTOTATION_ENTRY SET status='F' WHERE sale_id= '".$checked[$i]."'");  
            }

       }

       // print_r($sale_count); 
       // print_r($checked); 
       // print_r($update); 

       // exit;
   redirect('Akssalequotation');
    }




   


}


?>


