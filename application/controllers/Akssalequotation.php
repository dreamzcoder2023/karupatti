<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/* ************************************************************************************
        Purpose : To handle all Akssalequotation functions 2022-08-22
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
        $this->session->set_userdata('comtitle','Aks Quotation');
    }

    public function index()
    {

        
        
        $page       = isset($_GET['page']) ? $_GET['page'] : 1;
        $limit      = 50;
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


        $this->load->view('akssalequotation/aks_quotation_print',$data);
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

         
         if($prd_img!=''){
            $image_url =  base_url().'assets/images/aks_product_image/'. $prd_img; 
           }
           else{
            $image_url =  base_url().'assets/images/karupatti.jpg'; 
           
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
            <input type="hidden" name="prd_id_hidden[]" id="prd_id_hidden'.$plid.'" value="'.$plid.'">
        </td>
         <td>

            <div>
                <input type="text" oninput="this.value = this.value.replace(/[^0-9.]/g, \'\').replace(/(\..*)\./g, \'$1\');"  name="sale_wgt[]" id="prd_wgt'.$plid.'" value="1000" onkeyup="price_update('.$plid.')" class="form-control form-control-lg form-control-solid fs-7 product_validation">
            </div>
         </td>

         <td><span onkeyup="cart_prd_cal()" name="lb_prd_price" id="lb_prd_price'.$plid.'">'.$prd_sale_price.'/'.$unit_price.
          
         '</span><input type="hidden" name="prd_unit[]" id="prd_unit'.$plid.'" value="'.$unit_price.'">
           
         <input type="hidden" name="prd_sale_price_hidden[]" id="prd_sale_price_hidden" value="'.$prd_sale_price.'">
         <input type="hidden" name="prd_hsn_hidden[]" id="prd_hsn_hidden" value="'.$prd_hsn.'"></td></td>
          
         <td id="lbl_price_tot'.$plid.'" align="end">0.00</td>
         
         <td>
            <a href="#" name="'.$plid.'"  class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm btnDelete" data-bs-toggle="modal">
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
          $result  = $this->db->query("SELECT * FROM AKS_PRD_MASTER WHERE AKS_CAT_NAME = '".$clid."' AND IS_SALE=1 AND PRODUCT_TYPE='P' ")->result_array();
        }else{
          $result  = $this->db->query("SELECT * FROM AKS_PRD_MASTER WHERE STATUS='Y'  AND IS_SALE=1 AND PRODUCT_TYPE='P'")->result_array();
        }
        // echo $clid;      


                  
                                  
         $menuchange='';                      
         foreach($result as $plist){ 
          

            if ($plist['AKS_PRD_IMG']!='') {
                $image_url =  base_url().'assets/images/aks_product_image/'.$plist['AKS_PRD_IMG']; 
            }else{
                $image_url =  base_url().'assets/images/karupatti.jpg'; 
            }

          $product_name = $plist["AKS_PRD_NAME"];
            if (strlen($product_name) > 10) {
                $product_name = substr($product_name, 0, 10) ."...";
            } 

          
          $menuchange = $menuchange.'<div class="col-lg-3 fv-row fv-plugins-icon-container" onclick="add_cart('.$plist["AKS_PRD_MID"].')"><a href="javascript:;" id="add_cart" class="btn btn-active-primary px-2 py-2"><div class="image-input-wrapper overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover w-90px h-80px" style="background-image: url('.$image_url.'); border-radius: 10px; "> </div> </a><div class="d-flex flex-column"> <a href="javascript:;" class="text-gray-600 text-hover-primary fs-7 pdt_tltp"><span>'.$product_name.'</span><span class="pdt_sub_tltp">'.$plist['AKS_PRD_NAME'].'</span>
            </a></div><span  class="fs-6 fw-bold"><i class="fa-sharp fa-solid fa-indian-rupee-sign eyc fs-6" id="add_cart"></i>'.$plist["AKS_PRD_PRICE"].'/'.$plist["AKS_PRD_WT"].'g</span></div>';
          
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
                  }
                  else{
                    $upi_pay='';
                  }


             echo ''.'||'.$cash_tr.'||'.$cheque_tr.'||'.$rtgs_tr.'||'. $upi_pay.'||'. $partial_packing; 

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
                (product_id,product_wgt,HSN_CODE,sale_price,price,sale_id,status) values ('".$data['prd_id'][$i]."','".$data['sale_wgt'][$i]."','".$data['HSN_CODE'][$i]."','".$data['sale_price'][$i]."','".$total_price."','".$data['sale_id']."',0)");

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
    
    #***************************************Sale Quotation Edit Start**********************************************#
    public function  akssalequotation_edit($id){

        $data['category_list1']  = $this->db->query("SELECT * FROM AKSPRODUCT_CATEGORY WHERE Status='Y'  ")->result_array();      
        $data['sale_menu']       = $this->Akssalequotation_model->get_sale_detail();
        $data['sale_price']      = $this->Akssalequotation_model->get_sale_detail();
        $data['suppliers_lists'] = $this->Akssalequotation_model->getSupplier();
        // $data['quotation_lists'] = $this->Akssalequotation_model->getquotationlist();

        $data['edit'] = $this->Akssalequotation_model->get_salequo_edit_list($id);
        // print_r($data['edit']);
        // exit;
        $this->load->view('akssalequotation/akssalequotation_edit',$data);
        
    }
   
    public function add_edit_cart_list()
    {
        $id      = $_POST['id'];
        // $getdata = $this->Akssalequotation_model->get_sale_quo_list($id);
        // $count = $_POST['count'];
        $data['cart_list'] = $this->Akssalequotation_model->get_edit_cart_list($id);
        // $count = count($data['cart_list']);

        // print_r($data['cart_list']); exit;
        $arr =[];
        $row ="";
        $rows='';
        $array='';

        foreach ($data['cart_list'] as $count => $clist) {


            $prd_id         = $clist['product_id'];
            $prd_list       = $this->Akssalequotation_model->get_cart_list($prd_id);
            $prd_img        = $prd_list->AKS_PRD_IMG;
            $prd_name       = $prd_list->AKS_PRD_NAME;
            $prd_hsn        = $prd_list->HSN_CODE;
            $prd_sale_price = $prd_list->AKS_PRD_PRICE;
            $unit_price     = $prd_list->AKS_PRD_WT;


            $img= '<div style="background-image: url('.base_url().'assets/images/Aks_prd_images/'.$prd_img.'border-radius: 10px;"></div>';
             
                if($prd_img!=''){                   
                   $image_url =  base_url().'assets/images/aks_product_image/'.$prd_img; 
                }   
                else{
                  $image_url =  base_url().'assets/images/karupatti.jpg';                
                }


               // print_r($img_div);
               $sale_price = floatval($clist['product_wgt'] * $prd_sale_price) / $unit_price;
            
               $row='<tr  name="count"><td>'.($count+1).'<input type="hidden" name="item_count_hidden[]"  id="item_count_hidden'.$count.'" value="'.($count+1).'"></td>
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
                        <input type="hidden" name="prd_id_hidden[]" id="prd_id_hidden'.$prd_id.'" value="'.$prd_id.'">
                    </td>
                     <td>

                     <div><input type="text" oninput="this.value = this.value.replace(/[^0-9.]/g, \'\').replace(/(\..*)\./g, \'$1\');"  name="sale_wgt[]" id="prd_wgt'.$prd_id.'" value="'.$clist['product_wgt'].'"  onkeyup="price_update('.$prd_id.')" class="form-control form-control-lg form-control-solid fs-7 product_validation"></div></td>

                     <td><span onkeyup="cart_prd_cal()" name="lb_prd_price" id="lb_prd_price'.$prd_id.'">'.$prd_sale_price.'/'.$unit_price.
                      
                     '</span><input type="hidden" name="prd_unit[]" id="prd_unit'.$prd_id.'" value="'.$unit_price.'">
                       
                     <input type="hidden" name="prd_sale_price_hidden[]" id="prd_sale_price_hidden" value="'.$prd_sale_price.'">
                     <input type="hidden" name="prd_hsn_hidden[]" id="prd_hsn_hidden" value="'.$prd_hsn.'"></td></td>


                      
                     <td id="lbl_price_tot'.$prd_id.'" align="end">'.$sale_price.'</td>

                     
                     <td>
                        <a href="#" name="'.$prd_id.'"  class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm btnDelete" data-bs-toggle="modal" >
                            <span class="svg-icon svg-icon-3">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z" fill="currentColor"></path>
                                    <path opacity="0.5" d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z" fill="currentColor"></path>
                                    <path opacity="0.5" d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z" fill="currentColor"></path>
                                </svg>
                            </span>
                        </a>
                       </td></tr>';


                $arr[] = ['id'=> $prd_id ,'amount' => $sale_price];


                $array = json_encode($arr);
                $rows .= $row;

            $count++;
        }

            echo '' . '||' .$rows. '||' . $array;

    }

    public function update()
    {   
        
        
        // print_r($this->input->post()); 
        // exit;
        // 

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



        $data['sale_date']         = $this->input->post('sale_date');
        $saledate                  = date('Y-m-d',strtotime($data['sale_date']));
        $data['sale_id']           = $this->input->post('sale_id_hidden');
        $data['sale_wgt']          = $this->input->post('sale_wgt');
        $data['sale_price']        = $this->input->post('prd_sale_price_hidden');
        $data['unit']              = $this->input->post('prd_unit');
        $data['prd_id']            = $this->input->post('prd_id_hidden');
        $data['HSN_CODE']          = $this->input->post('prd_hsn_hidden'); 
        $data['remarks']           = $this->input->post('remarks'); 
        $data['sale_prd_tot_amt']  = $this->input->post('totalamount');
        $data['sale_dis_amt']      = $this->input->post('dis_cart_amt')?$this->input->post('dis_cart_amt'):0;
        $data['sale_net_amt']      = $this->input->post('netamount');


        $data['create_by']         = $_SESSION['username'];
        $data['create_on']         = date('Y-m-d H:i:s');

        $data['modified_by']         = $_SESSION['username'];
        $data['modified_on']         = date('Y-m-d H:i:s');

        $data['status']            = 'Y';                   

        $count  = count($data['sale_price']);
        $data['sale_prd_count']   = $count?$count:0;


        $result = $this->Akssalequotation_model->salequo_update($data,$saledate);
        if ($result) {

            $cart_ids    = $data['sale_id'];
            $cart_list   = $this->Akssalequotation_model->get_edit_cart_list($cart_ids);
            // print_r($cart_list);
            foreach ($cart_list as $si => $val) {

              $cart_id_get   = $val['id'];
              $product_ids   = $val['product_id'] ?$val['product_id']:'';
              $updateoldcart = $this->db->query("UPDATE AKS_SALE_QUTOTATION_CART SET status = 1 WHERE id = '".$cart_id_get."' AND product_id = ".$product_ids);              
                   

            }
            for($i=0;$i<$count;$i++){

                $wgt         = $data['sale_wgt'][$i] ;
                $unit_price  = $data['unit'][$i];
                $purprice    = $data['sale_price'][$i];                
                $tot         = ( $wgt  / $unit_price  ) * $purprice ;
                $total_price = $tot;
                  
                $res=$this->db->query("INSERT INTO AKS_SALE_QUTOTATION_CART
                (product_id,product_wgt,HSN_CODE,sale_price,price,sale_id,status) values ('".$data['prd_id'][$i]."','".$data['sale_wgt'][$i]."','".$data['HSN_CODE'][$i]."','".$data['sale_price'][$i]."','".$total_price."','".$data['sale_id']."','0')");

             }


        
            // add_notification(date('Y-m-d H:i:s'), '', "Others", "karupatti<br>Quotation Update", $data['sale_id']. ' updated By ' .$_SESSION['username'],'', $_SESSION['USERID'], '0', $data['sale_id']);
        }

        // exit;
        if($result)
        {
            $this->session->set_flashdata('g_success',  $data['sale_id'].' Quotation have been Updated successfully...');
        }else{
           $this->session->set_flashdata('g_err', 'Could not update Quotation !');
        }
        redirect('Akssalequotation');
         
    }
    #***************************************Sale Quotation Edit End**********************************************#
    public function delete()
    { 
      $id  = $_POST['id'];
      $bid = $_POST['saleid'];   
      $data['modified_by']         = $_SESSION['username'];
      $data['modified_on']         = date('Y-m-d H:i:s');  
        // exit;
        $result    = $this->db->query("UPDATE AKS_SALE_QUTOTATION_ENTRY SET status='N',modified_by = '".$data['modified_by']."',
            modified_on = '".$data['modified_on']."'  WHERE sale_id = '".$bid."'");
        echo $result;
        if ($result) {
             add_notification(date('Y-m-d H:i:s'), '', "Others", "karupatti<br>Quotation Deleted", $bid. ' Deleted ' .$_SESSION['username'],'', $_SESSION['USERID'], '0', $bid);
            $this->session->set_flashdata('g_success', $bid.' Quotation has been Deleted successfully.');
        }
        else{
            $this->session->set_flashdata('g_err', 'Something went wrong');
        }

    }

  




   


}


?>


