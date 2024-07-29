<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/* ************************************************************************************
        Purpose : To handle all Aksproduct_master functions 2022-08-22
***************************************************************************************/
class Akssale extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model(array("Aks_sale_model","Accountsgroup_model","Akssalequotation_model"));
        $this->load->library('user_agent');
        $fin_year=$this->Accountsgroup_model->get_fin_years_list();
        $db=substr($fin_year->DBNAME,0,strlen($fin_year->DBNAME)-4);
        $db_user=$fin_year->USERNAME?$fin_year->USERNAME:'';
        $db_pass=$fin_year->PASSWORD?$fin_year->PASSWORD:'';
        // echo $db;exit;
        $config_app = switch_db_dynamic($db,$db_user,$db_pass);
        
        $this->Aks_sale_model->other_db = $this->load->database($config_app,TRUE);

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

        $delivery_status_alert=$this->db->query("SELECT * FROM AKS_SALE_ENTRY WHERE sale_deliverymode='courier' AND sale_track_id is null AND sale_dl_sts is null AND status='F' OR status='S' ")->result_array();

        foreach($delivery_status_alert as $alert_list){
            
                $not_date = date('Y-m-d');
                    $response=$this->db->query("SELECT * FROM notification WHERE notification_date LIKE '".$not_date.'%'."' AND bill_no ='".$alert_list['sale_id']."' ")->row();
            if ($response!='') {
                
                add_notification(date('Y-m-d H:i:s'), '', "Others", "Karupatti<br> Order doesn't delivered", $alert_list['sale_id']. ' created By ' .$_SESSION['username'],'', $_SESSION['USERID'], '0', $alert_list['sale_id']);

                $update=$this->db->query("UPDATE AKS_SALE_ENTRY SET sale_dl_sts='1' WHERE sale_id ='". $alert_list['sale_id']."'");

            }
            
        }
        
        $page       = isset($_GET['page']) ? $_GET['page'] : 1;
        $limit      = 50;
        $offset     = ($page - 1) * $limit +1;
        $page_limit =$offset+$limit-1;
       
         $data['party_name'] = $this->input->post('party_name');
         if($data['party_name']!=''){
         $party_name =" AND sale_party LIKE'%".$data['party_name']."%'";
         }
          else{
         $party_name ='';
        }
        $data['bill_id'] = $this->input->post('bill_id');
         if($data['bill_id']!=''){
         $sale_id =" AND sale_id LIKE'%".$data['bill_id']."%'";
         }
          else{
         $sale_id ='';
        } 

        $data['statusfill'] = $this->input->post('statusfill');
         if($data['statusfill']!=''){
         $stsfill =" AND status='".$data['statusfill']."'";
         }
          else{
         $stsfill ='';
        } 

          $data['dt_fill'] = $this->input->post('dt_fill_sale_list');

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

           $data['sale_list'] = $this->Aks_sale_model->get_sale_list_fill($fdate,$tdate,$party_name,$sale_id,$offset,$page_limit,$stsfill);
           $data['count'] = count($this->db->query("SELECT * FROM AKS_SALE_ENTRY WHERE status!='N'  $fdate $tdate $party_name 
           $sale_id $stsfill ORDER BY sid DESC")->result_array());

           $data['export_sales'] = json_encode($this->db->query("SELECT * FROM AKS_SALE_ENTRY WHERE status!='N'  $fdate $tdate $party_name $sale_id $stsfill ORDER BY sid DESC")->result_array());

           
            $data['pending'] = $this->db->query("SELECT COUNT(*) as pending FROM AKS_SALE_ENTRY WHERE status ='Y' $fdate $tdate $party_name $sale_id $stsfill ")->row();
            $data['readyforpacking'] = $this->db->query("SELECT COUNT(*) as readyforpacking FROM AKS_SALE_ENTRY WHERE status ='F' $fdate $tdate $party_name $sale_id $stsfill ")->row();
            $data['packed'] = $this->db->query("SELECT COUNT(*) as packed FROM AKS_SALE_ENTRY WHERE status ='S' $fdate $tdate $party_name $sale_id $stsfill ")->row();
            $data['partialpacking'] = $this->db->query("SELECT COUNT(*) as partialpacking FROM AKS_SALE_ENTRY WHERE status ='P' $fdate $tdate $party_name $sale_id $stsfill ")->row();
            $data['hold'] = $this->db->query("SELECT COUNT(*) as hold FROM AKS_SALE_ENTRY WHERE status ='H' $fdate $tdate $party_name $sale_id $stsfill ")->row();


            // print_r($data['hold']->hold); 
            // exit();

            // if (!empty($sale_list)) { 
            // $i = 0;  
            // $pending = 0;
            // $readyforpacking = 0;
            // $packed = 0;
            // $partialpacking = 0;
            // $hold = 0;
            // foreach ($sale_list as $slist) { 


            // // 
            //   // SELECT COUNT(*) as readyforpacking FROM [Bankers].[dbo].[AKS_SALE_ENTRY] WHERE status ='F'
            //   // SELECT COUNT(*) as packed FROM [Bankers].[dbo].[AKS_SALE_ENTRY] WHERE status ='S'
            //   // SELECT COUNT(*) as partialpacking FROM [Bankers].[dbo].[AKS_SALE_ENTRY] WHERE status ='P'
            //   // SELECT COUNT(*) as hold FROM [Bankers].[dbo].[AKS_SALE_ENTRY] WHERE status ='H'

            //     if ($slist['status'] == 'Y') {
            //         $pending++;
            //     }
            //     if ($slist['status'] == 'F') {
            //         $readyforpacking++;
            //     }
            //     if ($slist['status'] == 'S') {
            //         $packed++;
            //     }
            //     if ($slist['status'] == 'P') {
            //         $partialpacking++;
            //     }
            //     if ($slist['status'] == 'H') {
            //         $hold++;
            //     }
            // }
            // }


           // print_r($data['counts']);exit;
           $data['sale_id'] = $data['bill_id'];
        $this->load->view('aks_sale/aks_sale_list',$data);
    }

    public function print_history()
    {
        $sid  = $_POST['id'];

        $data['print_history_list'] = $this->db->query("SELECT
                                                        AKS_SALE_PRINT_HISTORY.created_by,
                                                        MAX(AKS_SALE_PRINT_HISTORY.company_code) as company_code,
                                                        MAX(AKS_SALE_PRINT_HISTORY.created_on) as created_on,
                                                        MAX(COMPANY.COMPANYNAME) as company_name,
                                                        MAX(AKS_SALE_PRINT_HISTORY.status) as status,
                                                        COUNT(*) as entry_count
                                                        FROM
                                                            AKS_SALE_PRINT_HISTORY
                                                        LEFT JOIN
                                                            COMPANY ON AKS_SALE_PRINT_HISTORY.company_code = COMPANY.COMPANYCODE
                                                        WHERE
                                                            AKS_SALE_PRINT_HISTORY.sale_id='".$sid."'
                                                        GROUP BY
                                                            AKS_SALE_PRINT_HISTORY.created_by
                                                        ORDER BY
                                                            created_on DESC")->result_array();

        $this->load->view('aks_sale/aks_print_history',$data);
    }
   
    public function sales_view()
    {
        $sid = $_GET['id'];
        $data = $this->Aks_sale_model->get_sale_list_view($sid);

        // if ($data[0]['supplier_id']=='null') {
        // $old_data =  $this->Akssale_model->get_supplier_by_id($data[0]['supplier_id']);

        // $supplier_name = $old_data->LEDGER_NAME;

        // }else{

        //     $supplier_name = $data[0]['pur_sup'];
        // }

        echo json_encode($data[0]);
    }
    public function aks_party_details(){


        $sid = $_POST['id'];
        $data = $this->Aks_sale_model->get_sale_list_view($sid);
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
                    $city_det=$this->db->query("SELECT * FROM CITY WHERE CITYID='".$row->CITY_ID."'")->row();
                    $CITY=  $city_det?$city_det->CITYNAME:'--';
                }
                if($row->TYPE_OF_RECORD=='O'){
                     $ADDRESS2=($row->ADDRESS2=='')?'--':$row->ADDRESS2;
                }
                else
                {
                    $vil_det =$this->db->query("SELECT * FROM VILLAGE WHERE VILLAGEID='".$row->VILLAGE_ID."'")->row();
                    $ADDRESS2 = $vil_det?$vil_det->VILLAGENAME:'--';
                }

                if($row->TYPE_OF_RECORD=='O'){
                     $ADDRESS1 = ($row->ADDRESS1=='')?'--':$row->ADDRESS1;
                }
                else
                {
                    $street_det=$this->db->query("SELECT * FROM STREET WHERE STREETID='".$row->STREET_ID."'")->row();
                    $ADDRESS1 =  $street_det?$street_det->STREETNAME:'--';
                }
             
                $pin     = $row->PINCODE?'-'.$row->PINCODE:'';
                $address = $ADDRESS1.', '.$ADDRESS2.' ,'.$CITY.$pin;


              $shipping = $this->db->query("SELECT * FROM AKS_SHIPPING_ADDRESS WHERE party_id='".$row->PID."'")->row();
              if(isset($shipping)){
                $ship_add = $shipping->address?$shipping->address.', ':'--';
                $ship_cty = $shipping->city?$shipping->city.' - ':'--';
                $ship_pin = $shipping->pincode?$shipping->pincode:'--';
                $shipment_address= $ship_add.$ship_cty.$ship_pin;                                           
                
              }else{
                $shipment_address=$address;
              }

              $phone=$row->PHONE?$row->PHONE:'-';
              $email=$row->EMAIL?$row->EMAIL:'-';


              echo $row->PID.'||'.$firstname.'||'.$address.'||'.$shipment_address.'||'.$phone.'||'.$email;
          }else{

            echo '';

          }
              
    }

    public function sales_ship_view()
    {
        $sid  = $_POST['id'];
        $data = $this->Aks_sale_model->get_sale_ship_view($sid);

        echo json_encode($data[0]);
    }
    public function billcheck()
    {
        $partyid       = $_POST['id'];
        $saledate      = $_POST['saledate'];       
        $date          = date('Y-m-d',strtotime($saledate));
        $type          = $_POST['type'];

        if ($type==1) {
            $pid = $partyid;
            
        }else{

            $party = $this->db->query("SELECT * FROM PARTIES WHERE PARTY_TYPE='S' AND SUPPLIER_ID='".$partyid."' ")->row();

             if ($party!='') {
                $pid = $party->PID?$party->PID:'';
             }
        }

        // print_r($saledate);
        // print_r($date);
       
        $response   = $this->db->query("SELECT * FROM AKS_SALE_ENTRY WHERE id_party= '".$pid."' AND sale_date='".$date."' AND status!='D' ORDER BY sid DESC")->result_array();

        if ($response) {
            echo 1;
        }else{
            echo 0;
        }
    }
    

    public function sales_ship_sts_chk()
    {
        $sid  = $_POST['id'];
        $data = $this->Aks_sale_model->get_sale_ship_check($sid);

        echo json_encode($data[0]);
    }


    public function sale_view()
    {
        $pid = $_POST['id'];
        $data['pur_details'] = $this->Aks_sale_model->get_sale_list($pid);
        $this->load->view('aks_sale/',$data);
    }

    public function sale_view_table()
    {
        $sid    = $_POST['id'];
        $getid  = $this->db->query("SELECT * FROM AKS_SALE_ENTRY WHERE sid='".$sid."' ")->row();        
        $product_id = $getid?$getid->sale_id:'';
       
        $data['cart_view'] = $this->Aks_sale_model->get_cart_view($product_id);
             

        $this->load->view('aks_sale/view_table_sale_ship',$data);  

   }
   public function sale_view_table_new()
    {
        $sid    = $_POST['id'];
        $getid  = $this->db->query("SELECT * FROM AKS_SALE_ENTRY WHERE sid='".$sid."' ")->row();        
        $product_id = $getid?$getid->sale_id:'';
       
        $data['cart_view'] = $this->Aks_sale_model->get_cart_view($product_id);
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

        $this->load->view('aks_sale/view_table_sale',$data);  

   }
   public function sale_ship_pack_view_table()
    {
        $sid         = $_POST['id'];
        $getid       = $this->db->query("SELECT * FROM AKS_SALE_ENTRY WHERE sid='".$sid."' ")->row();        
        $sale_id_get = $getid?$getid->sale_id:'';       
        $data['cart_view'] = $this->db->query("SELECT * FROM AKS_SALE_ENTRY WHERE sale_id LIKE '".'%'.$sale_id_get.'%'."' ")->result_array(); 
        $this->load->view('aks_sale/packing_shiping_billed_table_view',$data);  

    }
    public function sale_print($sprint)
    {

        
        
      
        $data['sale_print'] = $this->Aks_sale_model->get_sale_print($sprint);
        $getid = $this->db->query("SELECT * FROM AKS_SALE_ENTRY where sid='".$sprint."' ")->row(); 
        $product_id = $getid->sale_id;
        $data['print_cart_view'] = $this->Aks_sale_model->get_cart_print($product_id);
        // $data['party_d'] = $this->db->query("SELECT * FROM PARTIES WHERE id=".$sprint)->row();
        // print_r($data['sale_print']); exit;


        $this->load->view('aks_sale/aks_sales_receipt_print',$data);
    }
    public function sale_print_pos($spos)
    {
       
        $data['sale_pos'] = $this->Aks_sale_model->get_sale_print($spos);
        $getid= $this->db->query("SELECT * FROM AKS_SALE_ENTRY where sid='".$spos."' ")->row();
        $sale_id_get = $getid?$getid->sale_id:'';
        $data['print_cart_view_pos'] = $this->Aks_sale_model->get_cart_pos($sale_id_get);

        if ($sale_id_get) {
            $create_on = date('Y-m-d H:i:s');
            $result = $this->db->query("INSERT INTO AKS_SALE_PRINT_HISTORY
            (sale_id,company_code,created_by,created_on,count,status) values ('".$sale_id_get."','".$_SESSION['COMPANYCODE']."','".$_SESSION['username']."','".$create_on."','1','1')");

            $update = $this->db->query("UPDATE AKS_SALE_ENTRY SET print_count=COALESCE(print_count, 0)+1  WHERE sale_id= '".$sale_id_get."'");
        }


        $this->load->view('aks_sale/aks_shipping_pos',$data);

    }
    public function full_print()
    {
       

            $print_count = $this->input->post('sale_count')?$this->input->post('sale_count'):0;
            $checked     = $this->input->post('checked');
            // print_r($checked); 
            

            $data['print_list'] = [];
            $print='';
            $i=0;
            if (isset($checked)) {
                foreach ($checked as $i => $val) {
                    if(isset($checked[$i])){
                       
                       $data['print_list'][] = $val; 
                       $create_on = date('Y-m-d H:i:s');
                        $result = $this->db->query("INSERT INTO AKS_SALE_PRINT_HISTORY
                        (sale_id,company_code,created_by,created_on,count,status) values ('".$val."','".$_SESSION['COMPANYCODE']."','".$_SESSION['username']."','".$create_on."','1','1')");

                        $update = $this->db->query("UPDATE AKS_SALE_ENTRY SET print_count=COALESCE(print_count, 0)+1  WHERE sale_id= '".$val."'");
                    }
                    $i++;
                }
                // print_r($data['print_list']);
            }

            // exit();
        $this->load->view('aks_sale/printmultiplepos',$data);
    }
    public function full_print_invoice()
    {
       

            $print_count = $this->input->post('sale_count')?$this->input->post('sale_count'):0;
            $checked     = $this->input->post('checked');
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
                // print_r($data['print_list']);
            }

            // exit();
        $this->load->view('aks_sale/printmultipleinvoice',$data);
    }

  public function change_delivery(){


        $sid = $_GET['id'];
        $data = $this->Aks_sale_model->get_sale_list_view($sid);
        echo json_encode($data[0]);
}



    public function  delivery_update(){

       $data['sid'] = $this->input->post('delivery_approved');
       // print_r($data['sid']);exit;
       $sid=$data['sid'];

       // $delivery_approved  = $this->db->query("SELECT * FROM AKS_SALE_ENTRY WHERE sid='".$sid ."' ")->row();
       // // print_r($delivery_approved);exit;
       $data['sale_del_by']         = $this->input->post('del_by');
       // $sale_del_by = $data['sale_del_by'];
       // $delivery_approved = $sale_del_by;
        $res= $this->db->query("UPDATE AKS_SALE_ENTRY set sale_deliverymode='Courier' where sid=". $sid);
       $data['sale_track_id']  = $this->input->post('tracking_id');
       $sale_track_id = $data['sale_track_id'];
       $delivery_approved = $sale_track_id;
        $res= $this->db->query("UPDATE AKS_SALE_ENTRY set sale_track_id='".$delivery_approved."' where sid=". $sid);
       

       // $data['sale_del_by']         = $this->input->post('del_by');
       // $data['sale_track_id']       = $this->input->post('tracking_id');
       redirect('Akssale');
       // $res = $this->Aks_sale_model->del_approve($data);
    }
    

    public function add_cart_list()
    {
        $plid  = intval($_POST['id']);

        $count = $_POST['count'];
        $data['cart_list'] = $this->Aks_sale_model->get_cart_list($plid);
      
        // // print_r($data['cart_list']);exit;

        if (isset($data['cart_list'])) {
         $prd_img =$data['cart_list']->AKS_PRD_IMG;


         $prd_name =$data['cart_list']->AKS_PRD_NAME;
         $prd_hsn =$data['cart_list']->HSN_CODE;
         // print_r($prd_name);exit;
         $prd_sale_price =$data['cart_list']->AKS_PRD_PRICE;
        $unit_price    =$data['cart_list']->AKS_PRD_WT;

         // $img= '<div style="background-image: url('.base_url().'assets/images/Aks_prd_images/'.$prd_img.'border-radius: 10px;"></div>';

         $image_url =  base_url().'assets/images/aks_product_image/'. $prd_img; 
         if($image_url && $prd_img!=''){
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
         $row='<tr  name="count"><td>'.($count+1).'<input type="hidden" name="item_count_hidden[]"  id="item_count_hidden'.$plid.'" value="'.($count+1).'"></td>

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

         <div><input type="text" oninput="this.value = this.value.replace(/[^0-9.]/g, \'\').replace(/(\..*)\./g, \'$1\');" name="sale_wgt[]" id="prd_wgt'.$plid.'" value="1000"  onkeyup="price_update('.$plid.')"  class="form-control form-control-lg form-control-solid fs-7 product_validation"></div></td>

         <td>
            <span name="lb_prd_price" id="lb_prd_price'.$plid.'">'.$prd_sale_price.'/'.$unit_price.'</span>

                <input type="hidden" name="prd_unit[]" id="prd_unit'.$plid.'" value="'.$unit_price.'">           
                <input type="hidden" name="prd_sale_price_hidden[]" id="prd_sale_price_hidden" value="'.$prd_sale_price.'">
                <input type="hidden" name="prd_hsn_hidden[]" id="prd_hsn_hidden" value="'.$prd_hsn.'">

         </td>
          
         <td id="lbl_price_tot'.$plid.'" align="end">0.00</td>
         
         <td>
            <a href="javascript:;" name="'.$plid.'"class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm btnDelete" >
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

    }

    public function aks_new_sale(){

        $data['category_list1']  = $this->db->query("SELECT * FROM AKSPRODUCT_CATEGORY WHERE Status='Y'  ")->result_array();
      
        $data['supplier_list']  = $this->Aks_sale_model->get_supplier_list();
        // print_r($data['supplier_list']); exit();
       
        $data['sale_menu'] = $this->Aks_sale_model->get_sale_detail();
        // print_r($data['supplier_list']);exit;
        $data['sale_price'] = $this->Aks_sale_model->get_sale_detail();
        $data['quotation_lists'] = $this->Aks_sale_model->getquotationlist();

        // print_r($data['pur_price']);exit;

         $this->load->view('aks_sale/aks_new_sale',$data);
        
    }
    public function aks_quo_details()
    {
        $sid     = $_POST['id'];
        // print_r($sid);exit;
        $getdata = $this->Aks_sale_model->get_sale_quo_list($sid);

        if (isset($getdata)) {

            $discount = $getdata->sale_dis_amt?$getdata->sale_dis_amt:0;

            if (isset($getdata->party_type)) {
                if ($getdata->party_type == "supplier") {
                    $row = $this->Akssalequotation_model->get_sale_sup_view($getdata->id_party);
                    if ($row != '') {
                        $title = '';
                        $name  = '';

                        $id_party = $row->LEDGER_SNO;
                        $firstname = $row->LEDGER_NAME ? $row->LEDGER_NAME : '-';
                        $lastname = $row->LASTNAME ? $row->LASTNAME : '';
                        $address1 = $row->ADDRESS ? $row->ADDRESS : '';
                        $address2 = $row->ADDRESS2 ? $row->ADDRESS2 : '';
                        $city = $row->CITY ? $row->CITY : '';
                        $state = $row->STATE ? $row->STATE : '';
                        $phone = $row->PHONE ? $row->PHONE : '';
                        $email = $row->EMAIL ? $row->EMAIL : '';
                        $gst_no = $row->GST_NO ? $row->GST_NO : '';
                        $address = $lastname . $address1 . ' ,' . $address2 . ' ,' . $city . $state;
                        echo ''.'||'.$getdata->party_type . '||' . $id_party . '||' . $firstname . '||' . $address . '||' . $phone . '||' . $email. '||' .'-' . '||' . $lastname . '||' . $address1 . '||' . $address2 . '||' . $city. '||' . $state  .'||'. $gst_no . '||' . $discount;
                    } 
                    else {
                        echo '';
                    }

                    } else if ($getdata->party_type == "party") {
                    $row = $this->Aks_sale_model->getparty_list($getdata->id_party);
                    $firstname = $row->NAME;
                    $id_party = $row->PID;
                    if ($row->TYPE_OF_RECORD == 'O') {
                        $CITY = ($row->CITY == '') ? '--' : $row->CITY;
                    } else {
                        $area_det = $this->db->query("SELECT * FROM CITY WHERE CITYID='" . $row->CITY_ID . "'")->row();
                        $CITY = $area_det->CITYNAME;
                    }
                    if ($row->TYPE_OF_RECORD == 'O') {
                        $ADDRESS2 = ($row->ADDRESS2 == '') ? '--' : $row->ADDRESS2;
                    } else {
                        $area_det = $this->db->query("SELECT * FROM VILLAGE WHERE VILLAGEID='" . $row->VILLAGE_ID . "'")->row();
                        $ADDRESS2 = $area_det->VILLAGENAME;
                    }

                    if ($row->TYPE_OF_RECORD == 'O') {
                        $ADDRESS1 = ($row->ADDRESS1 == '') ? '--' : $row->ADDRESS1;
                    } else {
                        $area_det = $this->db->query("SELECT * FROM STREET WHERE STREETID='" . $row->STREET_ID . "'")->row();
                        $ADDRESS1 = $area_det->STREETNAME;
                    }
                    $address = $ADDRESS1 . ', ' . $CITY;
                   $shipping = $this->db->query("SELECT * FROM AKS_SHIPPING_ADDRESS WHERE party_id='".$row->PID."'")->row();
                      if(isset($shipping)){
                        $ship_add = $shipping->address?$shipping->address.', ':'--';
                        $ship_cty = $shipping->city?$shipping->city.' - ':'--';
                        $ship_pin = $shipping->pincode?$shipping->pincode:'--';
                        $shipment_address= $ship_add.$ship_cty.$ship_pin;                                           
                        
                      }else{
                        $shipment_address=$address;
                      }
                    $phone = $row->PHONE ? $row->PHONE : '-';
                    $email = $row->EMAIL ? $row->EMAIL : '-';
                    echo ''.'||'.$getdata->party_type . '||' . $id_party . '||' . $firstname . '||' . $address . '||' . $phone . '||' . $email . '||' . $shipment_address . '||' . $discount;
                } else {
                    echo '';
                }

            }
        }
    }

    public function add_quo_cart_list()
    {
        $id      = $_POST['id'];
        $getdata = $this->Aks_sale_model->get_sale_quo_list($id);
        // $count = $_POST['count'];
        $data['cart_list'] = $this->Aks_sale_model->get_quo_cart_list($getdata->sale_id);
        // $count = count($data['cart_list']);

         $arr =[];
        $row ="";
        $rows='';
        $array=[];

        foreach ($data['cart_list'] as $count => $clist) {


            $prd_id         = $clist['product_id'];
            $prd_list       = $this->Aks_sale_model->get_cart_list($prd_id);
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


   
    public function image_view()
    {
        $id = $_POST['id'];
         $response='<div class="image-input-wrapper w-250px h-250px" style="background-image: url(<?php echo base_url() ?>assets/images/aks_product_image/<?php echo $id; ?>)"></div>';
        echo $response;
    }
    
  public function category_select(){

        $clid = $_POST['id'];

        if($clid != 'all'){
          $result  = $this->db->query("SELECT * FROM AKS_PRD_MASTER  WHERE AKS_CAT_NAME = '".$clid."' AND IS_SALE=1 ")->result_array();
        }else{
          $result  = $this->db->query("SELECT * FROM AKS_PRD_MASTER  WHERE STATUS='Y' AND IS_SALE=1  ")->result_array();
        }
        // echo $clid;      


                  
                                  
         $menuchange='';                      
         foreach($result as $plist){ 
         

            if($plist['AKS_PRD_IMG']!=''){                   
                    $image_url =  base_url().'assets/images/aks_product_image/'.$plist['AKS_PRD_IMG']; 
                }   
                else{
                  $image_url =  base_url().'assets/images/karupatti.jpg';                
                }
              $product_name = $plist["AKS_PRD_NAME"];
                if (strlen($product_name) > 10) {
                    $product_name = substr($product_name, 0, 10) ."...";
                } 


          
          $menuchange = $menuchange.'<div class="col-lg-3 fv-row fv-plugins-icon-container" onclick="add_cart('.$plist["AKS_PRD_MID"].')"><a href="javascript:;" id="add_cart" class="btn btn-active-primary px-2 py-2" ><div class="image-input-wrapper overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover w-90px h-80px"  style="background-image: url('.$image_url.'); border-radius: 10px; "> </div> </a><div class="d-flex flex-column"> <a href="javascript:;" class="text-gray-600 text-hover-primary fs-7 pdt_tltp"><span>'.$product_name.'</span><span class="pdt_sub_tltp">'.$plist['AKS_PRD_NAME'].'</span>
            </a></div><span  class="fs-6 fw-bold"><i class="fa-sharp fa-solid fa-indian-rupee-sign eyc fs-6" id="add_cart"></i>'.$plist["AKS_PRD_PRICE"].'/'.$plist["AKS_PRD_WT"].'g</span></div>';
          
         }   

          echo $menuchange;           
         // print_r($result);
         // exit;
    }
    
   public function suplier_drop_down()
    {
        $data['supplier_list']  = $this->Aks_sale_model->get_supplier_list();
        echo json_encode($data['supplier_list']);
    }
 public function payment_details(){

      $sdid = $_POST['id'];
      // print_r($sdid); exit;
      
        $getid = $this->db->query("SELECT * FROM AKS_SALE_ENTRY WHERE sid='".$sdid."' ")->row();
      // print_r($getid ); exit;
        $payment_id     = $getid->sale_id;
        $partial_packing= $getid->partial_packing;
        $data['payment_detail'] = $this->Aks_sale_model->get_payment_details($payment_id);

      // print_r($data['payment_detail']); exit;

      // foreach ($data['payment_detail'] as $pur_det) {
  

         $cash = $this->Aks_sale_model->get_cash($payment_id);
         // print_r($cash);exit;

         $cash_amount   = $cash?$cash->amount:0;
         $cash_detail   = $cash?$cash->remarks:'-';

         // print_r($cash_detail);exit;
         
          $cheque = $this->Aks_sale_model->get_cheque($payment_id);
          $cheque_amount    =$cheque?$cheque->amount:0;
          $chq_refno        =$cheque?$cheque->cheque_ref_no:'-';
          $chq_sup_bank     =$cheque?$cheque->party_bank:'';

          $ch_bnk_data = $this->db->query("SELECT * FROM BANKS WHERE SNO='".$chq_sup_bank."' OR BANKNAME='".$chq_sup_bank."'")->row();

           if (isset($ch_bnk_data)) {
                $bank_name_chq    = $ch_bnk_data->BANKNAME?$ch_bnk_data->BANKNAME:'-';
           }else{

                $bank_name_chq    = '-';
           }
           $chq_cbank       = $bank_name_chq;

          
          $chq_detail       =$cheque?$cheque->remarks:'-';


          $rtgs = $this->Aks_sale_model->get_rtgs($payment_id);
          // print_r($rtgs);
          $rtgs_amount      =$rtgs?$rtgs->amount:0;
          $rtgs_refno       =$rtgs?$rtgs->cheque_ref_no:'-';
          $rtgs_cbank       =$rtgs?$rtgs->company_bank:'-';
          $rtgs_detail      =$rtgs?$rtgs->remarks:'-';

           $upi = $this->Aks_sale_model->get_upi($payment_id);
        //    print_r($upi);exit;
           $upi_amount      =$upi?$upi->amount:0;
           $upi_refno       =$upi?$upi->cheque_ref_no:'-';
           $upi_cbank       =$upi?$upi->company_bank:'';
           $upi_detail      =$upi?$upi->remarks:'-';

           $bnk_data = $this->db->query("SELECT * FROM BANKS WHERE SNO='".$upi_cbank."' OR BANKNAME='".$upi_cbank."'")->row();

           if (isset($bnk_data)) {
                $bank_name_upi    = $bnk_data->BANKNAME?$bnk_data->BANKNAME:'-';
           }else{

                $bank_name_upi    = '-';
           }
           $upi_cbank       =$bank_name_upi;
          // print_r($bnk_data);


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
                    <td><label class="col-form-label fw-bold fs-3">Bank</label></td>
                    <td><label class="col-form-label fw-bold fs-7">'.$cheque_amount.'</label></td>
                    <td><label class="col-form-label fw-bold fs-7">'.$chq_refno.'</label></td>
                    <td><label class="col-form-label fw-bold fs-7">'.$chq_cbank.'</label></td>
                    <td><label class="col-form-label fw-bold fs-7">'.$chq_detail.'</label></td>
                    </tr>';
            }
            else{$cheque_tr=''; }

            // if($rtgs_amount>0){
            // $rtgs_tr='<tr><td><label class="col-form-label fw-bold fs-2">RTGS</label></td>
            //           <td><label class="col-form-label fw-bold">'.$rtgs_amount.'</label></td>
            //           <td><label class="col-form-label fw-bold">'.$rtgs_refno.'</label></td>
            //           <td><label class="col-form-label fw-bold">'.$rtgs_cbank.'</label></td>
            //           <td><label class="col-form-label fw-bold">'.$rtgs_detail.'</label></td></tr>';   
            // }
            // else{
            //    $rtgs_tr=''; 
            // }

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


             echo ''.'||'.$cash_tr.'||'.$cheque_tr.'||'.''.'||'. $upi_pay.'||'. $partial_packing; 

    }
    public function order_hold()
    {

        $id = $_POST['id'];

       $get=$this->db->query("SELECT * FROM  AKS_SALE_ENTRY WHERE sid='".$id."'")->row();
       // $data['sale_list_detail']=$this->db->query("SELECT * FROM  AKS_SALE_CART WHERE sale_id='".$data['sale_detail']->sale_id."'")->result_array();
        $data['details'] = $get;
        $this->load->view('aks_sale/onhold_status_change',$data);
    }
    public function order_onhold_view()
    {

        $id = $_POST['id'];

        $get=$this->db->query("SELECT * FROM  AKS_SALE_ENTRY WHERE sid='".$id."'")->row();
        
        if ($get!='') {
        $reason = $get->reason_hold?$get->reason_hold:'-';
        }else{
            $reason = ' - ';
        }

        echo $reason; 
        // $this->load->view('aks_sale/onhold_status_change',$data);
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
     
       //$result = $this->db->select('*')->from('AKS_SALE_ENTRY')->where(["sid" => $id])->set($stop)->update();
       $result = $this->db->query("UPDATE AKS_SALE_ENTRY SET status='".$status."',reason_hold='".$reason."' where sid='".$id."'");
       
        $get=$this->db->query("SELECT * FROM  AKS_SALE_ENTRY WHERE sid='".$id."'")->row();
        $details = $get;
       if ($result) {

             add_notification(date('Y-m-d H:i:s'), '', "Others", "Karupatti<br> Order OnHold", $details->sale_id. ' Hold By ' .$_SESSION['username'],'', $_SESSION['USERID'], '0', $details->sale_id);
             redirect('Akssale');
       }

        
    }
    public function order_unhold()
    {

        $id = $_POST['id'];

       $get=$this->db->query("SELECT * FROM  AKS_SALE_ENTRY WHERE sid='".$id."'")->row();
        $data['details'] = $get;
        $this->load->view('aks_sale/unhold_status_change',$data);
    }

    public function unhold_order()
    {

        $id = $_POST['id'];

        $status = 'Y';

        /*$stop = [

            'status'        => $status,
            'reason_hold'   => '',
        ];*/
     
      // $result  = $this->db->select('*')->from('AKS_SALE_ENTRY')->where(["sid" => $id])->set($stop)->update();
       $result = $this->db->query("UPDATE AKS_SALE_ENTRY SET status='Y',reason_hold='' WHERE sid='".$id."'");
       
        $details = $this->db->query("SELECT * FROM  AKS_SALE_ENTRY WHERE sid='".$id."'")->row();
       if ($result) {

             add_notification(date('Y-m-d H:i:s'), '', "Others", "Karupatti<br> Order Release", $details->sale_id. ' Released By ' .$_SESSION['username'],'', $_SESSION['USERID'], '0', $details->sale_id);
             redirect('Akssale');
       }

        
    }


    public function sale_save()
    {   
        
        
        $value = json_decode($_POST['sale_data'],true); 

        // print_r($value['sale_wgt']);
        // print_r($value);

        // exit();

        $data['type']  = $value['aks_sales_type'];
        $partytype     =  $value['qu_party_type'];

            if ($data['type']=='Quotation') {               

                if ($partytype=='supplier') {


                    $name = $value['qu_party_name'];
                    $lname = $value['qu_party_lname'];
                    $company_name = '';
                    $state = $value['qu_party_state'];
                    $bill_address = $value['qu_party_address'];
                    $town_city = $value['qu_party_city'];
                    // $pincode = $value['pincode'];
                    $mobile = $value['qu_party_phone'];
                    $email = $value['qu_email'];
                    $gst_no = $value['qu_gst'];
                    $sup_id = $value['qu_sup_id'];

                    $response = $this->db->query("SELECT * FROM PARTIES  WHERE PARTY_TYPE='S' AND SUPPLIER_ID='".$sup_id."' ")->row();

                    if ($response!='') {
                         $data['sale_party']      = $response->NAME;
                         $data['id_partys']       = $response->PID;

                    }else{

                    $userlist=$this->db->query("SELECT * FROM USERLIST WHERE NAME='".$_SESSION['username']."' ")->row();
                    $prefix  =$userlist->LOANPREFIX;
                    $id_get  =$this->db->query("SELECT * FROM KEYMASTER WHERE KEYNAME='PARTIES-".$prefix."' ")->row();
                    $suffix  =str_pad($id_get->KEYVALUE+1, 6, '0', STR_PAD_LEFT);
                    $party_id=$prefix.$suffix;             

                    $res     =$this->db->query("INSERT INTO  PARTIES(PID,NAME,FATHERSNAME,COMPANY_NAME,PHONE,STATE,ADDRESS1,CITY,EMAIL,IS_KARUPATTI,GST_NO,PARTY_TYPE,TYPE_OF_RECORD,SUPPLIER_ID) VALUES('".$party_id."','".$name."','".$lname."','".$company_name."','".$mobile."','".$state."','".$bill_address."','".$town_city."','".$email."','1','".$gst_no."','S','O','".$sup_id."')");
                    $update=$this->db->query("UPDATE KEYMASTER SET KEYVALUE= KEYVALUE+1 WHERE KEYNAME='PARTIES-".$prefix."'");

                        $data['sale_party']      = $name;
                        $data['id_partys']       = $party_id;
                       
                    }                  
                    
                   
               }

                else{

                    $data['sale_party']      = $value['qu_party_name'];
                    $data['id_partys']       = $value['qu_party_id'];
                    
                }
            }
            else{

                    $data['sale_party']      = $value['sale_party'];
                    $data['id_partys']       = $value['party_id_hidden'];
                   
               }

           if ($data['type']=='Quotation') { 
                $quotid  = $value['quo_id_name'];
             $get_quo = $this->db->query("SELECT * FROM AKS_SALE_QUTOTATION_ENTRY WHERE sid = " . $quotid)->row();
                $data['other_bill']      = $get_quo->sale_id;
           }else{
             $data['other_bill']      = '';
           }
        $data['sale_date']  = $value['sale_date'];

        $saledate=date('Y-m-d',strtotime($data['sale_date']));

         $last_sid_detail = $this->Aks_sale_model->last_sid_details();

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

                $request =  request_num(((int)$result+1), 3, "AKSS-");
                
                $request_id =  $request.'/'.$year;

              $sale_id = $request_id;
              }
              else{
                $year = substr( date("y"), -2);
                $sale_id=  'AKSS-001/'.$year;
        }

        $data['sale_id']         = $sale_id;



        $data['sale_wgt']        = $value['sale_wgt'];
        $data['sale_price']      = $value['prd_sale_price_hidden'];
        $data['unit']            = $value['prd_unit'];
        $data['prd_id']          = $value['prd_id_hidden'];
        $data['HSN_CODE']        = $value['prd_hsn_hidden'];
        
        // print_r($data); exit;
          $data['sale_deliverymode'] = $value['delvery_mode_get'];

          // $data['sale_delivery'] = $value['del_select'];

            $delivery_by = isset($value['del_select']) ? $value['del_select'] ? $value['del_select'] :'' :'';

            $exp = explode('~', $delivery_by);
                        
            $data['sale_delivery']     = $exp[0];
            $data['del_supplier_id'] = isset($exp[1]) ? $exp[1] ? $exp[1] :'' :''; 
            
          $data['sale_shipment'] = $value['shipment_to']; 

          $data['shipment_charges'] = $value['shipment_charges'];  
          $data['remarks'] = $value['remarks'];  

        $data['sale_prd_tot_amt']    = $value['totalamount'];
        $data['sale_dis_amt']    = $value['dis_cart_amt'];
        $data['sale_net_amt']    = $value['netamount'];
        

        // $data['pay_mode'] =$value['cashcheck'];
         $data['cash_amount'] =$value['cashamount'];
          $data['cash_detail'] =$value['cashdetail'];
           $data['sale_id'] =$sale_id;

        
          // $data['pay_mode'] =$value['chequechk'];
           $data['cheque_amt'] =$value['chequeamount'];
            $data['cheque_supbk'] =$value['chequesupbank'];
             $data['cheque_refno'] =$value['chequerefno'];
              $data['cheque_detail'] =$value['chequedetail'];
               $data['sale_id'] =$sale_id;
          



          // $data['pay_mode'] =$value['rtgschk'];
          //  $data['rtgs_amt'] =$value['rtgsamount'];
          //   $data['rtgs_refno'] =$value['rtgsrefno'];
          //    $data['rtgs_bank'] =$value['rtgsbank'];
          //     $data['rtgs_detail'] =$value['rtgsdetails'];
          //      $data['sale_id'] =$sale_id; 
          //  $rtgs = $this->Aks_sale_model->rtgssave($data);

             // $data['pay_mode'] =$value['upichk'];
             $data['upi_amt'] =$value['upiamount'];
             $data['upi_refno'] =$value['upirefno'];
             $data['upi_bank'] =$value['upibank'];
             $data['upi_detail'] =$value['upidetail'];
             $data['sale_id'] =$sale_id;
        

        // $data['sale_pay_mode']   = $value['pay_mode'];
        $data['sale_cash']       = $value['paid_amount'];
        $data['balance_cash']    = $value['balance_amount'];
        $data['create_by']       = $_SESSION['username'];
        $data['create_on']       = date('Y-m-d H:i:s');
        $data['status']          = 'Y';

        

        $data['sale_del_by']  = isset($value['del_by']) ? $value['del_by'] ? $value['del_by'] :'' :'';

        

        // print_r($data); 

        // exit;
        $data['sale_track_id']       = isset($value['tracking_id']) ? $value['tracking_id'] ? $value['tracking_id'] :'' :'';

        $count=count($data['sale_price']);

        $count1 = $count;

        $data['sale_prd_count']   = $count1;
        
        $result = $this->Aks_sale_model->sale_entry($data,$saledate);
        if ($result) {

            for($i=0;$i<$count1;$i++){

                $wgt        =  $data['sale_wgt'][$i] ;

                $unit_price =  $data['unit'][$i];

                $purprice   = $data['sale_price'][$i];
                
                $tot =( $wgt  / $unit_price  ) * $purprice ;

                $total_price = $tot;
                  
                  $res=$this->db->query("INSERT INTO AKS_SALE_CART
                    (product_id,product_wgt,HSN_CODE,sale_price,price,sale_id,status) values ('".$data['prd_id'][$i]."','".$data['sale_wgt'][$i]."','".$data['HSN_CODE'][$i]."','".$data['sale_price'][$i]."','".$total_price."','".$data['sale_id']."',0)");
                 // print_r($res);exit;

                  $prd_ids = $data['prd_id'][$i];
                 
                  $data['crt_qty'] =($this->db->query("SELECT * FROM AKS_PRD_MASTER WHERE AKS_PRD_MID = '".$prd_ids."' ")->row());
                  // print_r($ress);
                  $crt_qty     = $data['crt_qty']->PRD_CUR_QTY;
                  $crt_qty_tot =  $crt_qty;
                  $wgts        =  $data['sale_wgt'][$i];
                  $bal_qty     =  $crt_qty_tot - $wgts ;
                  $stk_bal_qty = $bal_qty;
                  

                  $min_stock=$data['crt_qty']->AKS_MIN_STK;

                  if($bal_qty< $min_stock){

                    add_notification(date('Y-m-d H:i:s'), '', "Others", "karupatti<br> Minimum Stock Alert", $data['crt_qty']->AKS_PRD_NAME. ' Minimum Stock Reached ' .$_SESSION['username'],'', $_SESSION['USERID'], '0', $data['crt_qty']->AKS_PRD_MID);

                  }

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

                    values (

                    '".$data['prd_id'][$i]."'
                    ,'".$saledate."'
                    ,'".$crt_qty."'
                    ,'Sale'
                    ,'OUT'
                    ,'".$data['sale_wgt'][$i]."'
                    ,'".$stk_bal_qty."'
                    ,'".$data['create_by']."'
                    ,'".$data['create_on']."'
                    ,'".$sale_id."')");
                 
                 
                 
                 $curt_stk = $stk_bal_qty;
                 
                 $res= $this->db->query("UPDATE AKS_PRD_MASTER SET PRD_CUR_QTY='". $curt_stk."' where AKS_PRD_MID=". $prd_ids);


                 }

            $data['type']  = $value['aks_sales_type'];

            $cash = $this->Aks_sale_model->cashsave($data);
            $cheque = $this->Aks_sale_model->chequesave($data);
            $upi = $this->Aks_sale_model->upisave($data);


            if ($data['type']=='Quotation') {

               $quotid  = $value['quo_id_name'];
               $res= $this->db->query("UPDATE AKS_SALE_QUTOTATION_ENTRY SET status='S',saled_id='".$sale_id."' WHERE sid=". $quotid);

            }
            add_notification(date('Y-m-d H:i:s'), '', "Others", "karupatti<br> New Sale", $sale_id. ' created By ' .$_SESSION['username'],'', $_SESSION['USERID'], '0', $sale_id);
        }
        echo $result;
        if($result)
        {
            $this->session->set_flashdata('g_success',  $data['sale_id'].' New Sales have been added successfully...');
        }else{
           $this->session->set_flashdata('g_err', 'Could not add sale !');
        }
        // redirect('Akssale');
         
    }
    
    public function sale_list_det()
    {
     
      $search =  $_GET['query']; 
      $rows   = $this->Aks_sale_model->getParty($search);
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
                    $city_det=$this->db->query("SELECT * FROM CITY WHERE CITYID='".$row->CITY_ID."'")->row();
                    $CITY=  $city_det?$city_det->CITYNAME:'--';
                }
                if($row->TYPE_OF_RECORD=='O'){
                     $ADDRESS2=($row->ADDRESS2=='')?'--':$row->ADDRESS2;
                }
                else
                {
                    $vil_det =$this->db->query("SELECT * FROM VILLAGE WHERE VILLAGEID='".$row->VILLAGE_ID."'")->row();
                    $ADDRESS2 = $vil_det?$vil_det->VILLAGENAME:'--';
                }

                if($row->TYPE_OF_RECORD=='O'){
                     $ADDRESS1 = ($row->ADDRESS1=='')?'--':$row->ADDRESS1;
                }
                else
                {
                    $street_det=$this->db->query("SELECT * FROM STREET WHERE STREETID='".$row->STREET_ID."'")->row();
                    $ADDRESS1 =  $street_det?$street_det->STREETNAME:'--';
                }
             
                $pin     = $row->PINCODE?'-'.$row->PINCODE:'';
                $address = $ADDRESS1.', '.$ADDRESS2.' ,'.$CITY.$pin;


              $shipping = $this->db->query("SELECT * FROM AKS_SHIPPING_ADDRESS WHERE party_id='".$id_party."'")->row();

              // print_r($shipping); 
              // exit();


              if(isset($shipping)){
                $ship_add = $shipping->address?$shipping->address.', ':'--';
                $ship_cty = $shipping->city?$shipping->city.' - ':'--';
                $ship_pin = $shipping->pincode?$shipping->pincode:'--';
                $shipment_address= $ship_add.$ship_cty.$ship_pin;                                           
                
              }else{
                $shipment_address=$address;
              }

              $phone=$row->PHONE?$row->PHONE:'';
              $email=$row->EMAIL?$row->EMAIL:'';
             
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
         $del  = $this->db->query("SELECT * FROM AKS_SALE_ENTRY WHERE sid='".$id ."' ")->row();
         echo $del->sid;   
         //$this->load->view('lotentry/lotentry_approve',$data);
        }

    public function karpatti_party_add(){


        $this->load->view('karupattipartyaddmodal');

    }
    //  Karupati Party Add
    public function add_party()
    {
       $name = $this->input->post('new_party_name');
       $lname = $this->input->post('new_party_lname');
       $company_name = $this->input->post('company_name');
       $country = $this->input->post('country');    
       $state = $this->input->post('state');
       $bill_address = strval($this->input->post('new_party_bill_address'));
       // $bill_address = str_replace("'", '"', $baddress);
       // print_r($bill_address);
       // exit();   
       $town_city = $this->input->post('town_city');
       $pincode   = $this->input->post('pincode');
       $mobile    = $this->input->post('new_party_mobile');
       $altmobile = $this->input->post('al_new_party_mobile');
       $email     = $this->input->post('new_party_email');
       $gst_no    = $this->input->post('new_party_gst_no');
       $other     = $this->input->post('shiping_div');
       $landmark = $this->input->post('new_party_landmark');  
        $create_by      = $_SESSION['username'];
        $create_on     = date('Y-m-d H:i:s');


            // $bill_address = htmlspecialchars_decode($add, ENT_QUOTES, 'UTF-8');
            // $bill_address = htmlspecialchars_decode($add);

            // print_r($add); exit();


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


       $userlist=$this->db->query("SELECT * FROM USERLIST WHERE NAME='".$_SESSION['username']."' ")->row();
       $prefix  =$userlist->LOANPREFIX?$userlist->LOANPREFIX:'';
       $id_get  =$this->db->query("SELECT * FROM KEYMASTER WHERE KEYNAME='PARTIES-".$prefix."' ")->row();
       $suffix  =str_pad($id_get->KEYVALUE+1, 6, '0', STR_PAD_LEFT);
       $party_id=$prefix.$suffix;
       
       $res     =$this->db->query("INSERT INTO  PARTIES(PID,NAME,FATHERSNAME,COMPANY_NAME,PHONE,COUNTRY,STATE,PINCODE,ADDRESS1,CITY,EMAIL,IS_KARUPATTI,GST_NO,PHONE2,LANDMARK,CREATED_ON) VALUES('".$party_id."','".$name."','".$lname."','".$company_name."','".$mobile."','".$country."','".$state."','".$pincode."','".$bill_address."','".$town_city."','".$email."','1','".$gst_no."','".$altmobile."','".$landmark."','".$create_on."')");
        if ($res) {
             $res1=$this->db->query("INSERT INTO  AKS_SHIPPING_ADDRESS (party_id,name,lname,company_name,mobile,country,state,pincode,address,city,email,landmark,altermobile) VALUES('".$party_id."','".$name1."','".$lname1."','".$company_name1."','".$mobile1."','".$country1."','".$state1."','".$pincode1."','".$bill_address1."','".$town_city1."','".$email1."','".$altmobile1."','".$landmark1."')");
             $update=$this->db->query("UPDATE KEYMASTER SET KEYVALUE = KEYVALUE+1 WHERE KEYNAME='PARTIES-".$prefix."'");
         }

        // exit();

        redirect('Karuppattiparty');
    }
    public function shiping_sales_list()
    {

        $data['sale_list']=$this->db->query("SELECT * FROM AKS_SALE_ENTRY WHERE status='S' AND sale_deliverymode='courier' AND sale_track_id is NULL  ORDER BY sid asc")->result_array();
        $data['count']=count($data['sale_list']);
        $data['supplier_list']  = $this->Aks_sale_model->get_supplier_list();

        $this->load->view('aks_sale/shiping_sales_list',$data);
    }

    public function packing_sale_list()
    {

        $data['sale_list']=$this->db->query("SELECT * FROM AKS_SALE_ENTRY WHERE status='F' ORDER BY sid asc")->result_array();
        $data['count']=count($data['sale_list']);
        $this->load->view('aks_sale/packing_sale_list',$data);
    }

    // For packing status Change list wrong function name

    public function shipping_status()
    {
        $id=$_POST['id'];
        $sale_id=str_replace('_','/',$id);

        $packed_by    = $_SESSION['username'];
        $packed_on    = date('Y-m-d H:i:s');

        

        

        $response  =  $this->db->query("SELECT * FROM  AKS_SALE_ENTRY WHERE sale_id='".$sale_id."' ")->row();

        // print_r($response); exit();

        if ($response->sale_deliverymode=='Direct') {

            $data = [
                            
                'packed_by'    =>$packed_by,
                'packed_on'    =>$packed_on,
                'status'       =>'D',
                'shiped_by'    =>$packed_by,
                'shiped_on'    =>$packed_on,


                ];
                $update = $this->db->query("UPDATE AKS_SALE_ENTRY SET packed_by='".$data['packed_by']."',packed_on='".$data['packed_on']."',status='D',shiped_by='".$data['packed_by']."',shiped_on='".$data['packed_on']."' WHERE sale_id='".$sale_id."'");
           
        }else{

            $data = [
                            
                'packed_by'    =>$packed_by,
                'packed_on'    =>$packed_on,
                'status'       =>'S',

                ];

                $update = $this->db->query("UPDATE AKS_SALE_ENTRY SET packed_by='".$data['packed_by']."',packed_on='".$data['packed_on']."',status='S' WHERE sale_id='".$sale_id."'");


        }
        


        
        if ($response) {

            $status= $response->status;

            echo ''.'||'.'true'.'||'.$status;
        }else{
            echo ''.'||'.'false'.'||'.'';
        }
         // $update = $this->db->from('AKS_SALE_ENTRY')->where("sale_id",$sale_id)->set($data)->update();
    }

    public function courier_delivery()
    {

        $tracking_id=$_POST['tracking_id'];
        $charges=$_POST['charges']?$_POST['charges']:0;
        
        $id=$_POST['id'];
        $date=date('Y-m-d');
        $shiped_by    = $_SESSION['username'];
        $shiped_on    = date('Y-m-d H:i:s');
        $sale_id=str_replace('_','/',$id);

        $courier_edit=$_POST['courier_edit'];

        $exp = explode('~', $courier_edit);
                    
        $delagent_name = $exp[0];
        $agent_id      = isset($exp[1]) ? $exp[1] ? $exp[1] :'' :''; 

       


        $update = $this->db->query("UPDATE AKS_SALE_ENTRY SET delivery_by='".$delagent_name."',sale_track_id='".$tracking_id."', actual_delivery_charge='".$charges."', status='D',shiped_by='".$shiped_by."',shiped_on='".$shiped_on."',del_supplier_id='".$agent_id."' WHERE sale_id='".$sale_id."'");

            if ($update) {
               add_notification(date('Y-m-d H:i:s'), '', "Others", "karupatti<br> Shipped", $sale_id. ' Shipped By ' .$_SESSION['username'],'', $_SESSION['USERID'], '0', $sale_id);
            }
        $update=$this->db->query("UPDATE AKS_SALE_CART SET shiped_wgt=packed_wgt,tracking_id='".$tracking_id."',delivery_charges='".$charges."',delivery_date='".$date."' WHERE sale_id='".$sale_id."'  ");

        $update=$this->db->query("UPDATE AKS_SALE_CART SET packed_wgt=0 WHERE sale_id='".$sale_id."'  ");

    }
   
   public function packing($id)
   {
   
        $data['sale_detail']     = $this->db->query("SELECT * FROM  AKS_SALE_ENTRY WHERE sid='".$id."'")->row();
        $data['sale_list_detail']= $this->db->query("SELECT * FROM  AKS_SALE_CART WHERE sale_id='".$data['sale_detail']->sale_id."'")->result_array();
       $this->load->view('aks_sale/aks_sale_packing',$data);
   }
   public function partial_packing()
   {
        

        $sale_id       = $this->input->post('sale_id');
        $cart_id       = $this->input->post('id_hidden');
        $sale_count    = $this->input->post('sale_count');
        $packed_weight = $this->input->post('packed_weight');
        $checked       = $this->input->post('checked');
        $checkbox      = $this->input->post('checkbox');
        $prd_id_hidden = $this->input->post('prd_id_hidden');    
        $count         = count($this->input->post('checkbox'));

        $p_wgt = 0;

        foreach($checkbox as $key => $checkval)
        {
            $p_wgt += $packed_weight[$key];
        }
        if ($p_wgt > 0) {
            $sale_data = $this->db->query("SELECT sum(product_wgt) as product_wgt, sum(packed_wgt) as packed_wgt FROM AKS_SALE_CART WHERE sale_id='".$sale_id."' AND status=0 ")->row();
            if ($sale_data->product_wgt == $p_wgt) {
                $this->db->query("UPDATE  AKS_SALE_ENTRY SET status='F' WHERE sale_id= '".$sale_id."'");
            }else{


                $sale_data = $this->db->query("SELECT sum(product_wgt) as product_wgt, sum(packed_wgt) as packed_wgt FROM AKS_SALE_CART WHERE sale_id='".$sale_id."' AND status=0 ")->row();
                $tot_wgt = $sale_data->packed_wgt+$p_wgt;               
                if ($sale_data->product_wgt == $tot_wgt) {
                    foreach($checkbox as $key => $checkval)
                    { 
                        $weight = $this->db->query("SELECT * FROM  AKS_SALE_CART WHERE id='".$checkval."'")->row();
                        $cur_weight = $packed_weight[$key] + $weight->packed_wgt;
                        $this->db->query("UPDATE AKS_SALE_CART SET packed_wgt='".$cur_weight."'  WHERE id='".$checkval."'");
                    }
                    $this->db->query("UPDATE  AKS_SALE_ENTRY SET status='F' WHERE sale_id= '".$sale_id."'");
                }
                else{

                    foreach($checkbox as $key => $checkval)
                    { 
                        $weight = $this->db->query("SELECT * FROM  AKS_SALE_CART WHERE id='".$checkval."'")->row();
                        $cur_weight = $packed_weight[$key] + $weight->packed_wgt;
                        $this->db->query("UPDATE AKS_SALE_CART SET packed_wgt='".$cur_weight."' WHERE  id='".$checkval."'");
                    }
                    $sale_detail     = $this->db->query("SELECT * FROM AKS_SALE_ENTRY WHERE sale_id= '".$sale_id."'")->row();
                    $last_sid_detail = $this->Aks_sale_model->last_sid_details();      
                    $last_data       = $last_sid_detail? $last_sid_detail->sale_id:0;        
                    $year            = substr(date("y"), -2);
                    $slice           = explode("/", $last_data);
                    $result          = preg_replace('/[^0-9]/',' ', $slice[0]); 
                    function request_num ($input, $pad_len = 3  , $prefix = null) {
                        if ($pad_len <= strlen($input))
                           trigger_error('<strong>$pad_len</strong> cannot be less than or equal to the length of <strong>$input</strong> to generate invoice number', E_USER_ERROR);
                        if (is_string($prefix))
                            return sprintf("%s%s", $prefix, str_pad($input, $pad_len, "0", STR_PAD_LEFT));
                            return str_pad($input, $pad_len, "0", STR_PAD_LEFT);
                    }
                    $get_id=$this->db->query("SELECT * FROM AKS_SALE_ENTRY WHERE sale_id LIKE '".$sale_id."%' ORDER BY sid DESC ")->row();
                    $data = $get_id->sale_id;
                    $slice = explode("-", $data);
                    if(isset($slice[2])){
                        $num = $slice[2]+1;
                        $packing_id =  $slice[0].'-'.$slice[1].'-'.$num;
                    }else{
                        $packing_id =  $slice[0].'-'.$slice[1].'-'.'1';
                    }
                    $created_by    = $_SESSION['username'];
                    $created_on    = date('Y-m-d H:i:s');
                    $today         = date('Y-m-d');
                    $total_amount  = 0; 
                    $total=0;
                    $j=0;
                    foreach($checkbox  as $key => $checkval_insert)
                    {
                        $cart_detail = $this->db->query("SELECT * FROM  AKS_SALE_CART WHERE id='".$checkval_insert."' AND status=0 ")->row();
                        $product_det = $this->db->query("SELECT * FROM AKS_PRD_MASTER WHERE AKS_PRD_MID='".$cart_detail->product_id."'")->row();
                        $prd_price   = $product_det?$product_det->AKS_PRD_PRICE:0;
                        $prd_weight  = $packed_weight[$key];
                        $prd_gram    = $product_det?$product_det->AKS_PRD_WT:0; 
                        $total       = floatval($prd_weight/$prd_gram);
                        $total_price = floatval($total*$prd_price);                      
                        $res=$this->db->query("INSERT INTO AKS_SALE_CART (product_id,product_wgt,packed_wgt,HSN_CODE,sale_price,price,sale_id,status) VALUES ('".$checked[$key]."','".$packed_weight[$key]."','".$packed_weight[$key]."','".$cart_detail->HSN_CODE."','".$cart_detail->sale_price."','".$total_price."','".$packing_id."','0')");
                        $total_amount+=$total_price;
                        $j++;
                    }
                    $result  = $this->db->query("INSERT INTO AKS_SALE_ENTRY (sale_date
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
                    $this->db->query("UPDATE  AKS_SALE_ENTRY SET status='P' WHERE sale_id= '".$sale_id."'");
                }
            

            }
            

        }else{

           // $this->db->query("update  AKS_SALE_ENTRY set status='F' where sale_id= '".$sale_id."'");

        }
  
        redirect('Akssale');
       

   }
   public function full_packing()
   {
    $sale_count  = $this->input->post('sale_count')?$this->input->post('sale_count'):0;
        $checked = $this->input->post('checked') ? $this->input->post('checked') : [];        
            $i=0;
            if (isset($checked)) {
                foreach ($checked as $i => $val) {
                    if(isset($checked[$i])){
                    $response=$this->db->query("SELECT sale_id FROM AKS_SALE_ENTRY WHERE status='Y'  AND sale_id= '".$val."'")->row();

                        if (isset($response)) {
                            $res=$this->db->query("UPDATE AKS_SALE_CART SET packed_wgt=COALESCE(product_wgt, 0)  WHERE sale_id= '".$checked[$i]."'");
                            $update=$this->db->query("UPDATE  AKS_SALE_ENTRY SET status='F' WHERE sale_id= '".$val."'");
                        }else{
                            // print_r('noo<br>');
                        }
                         
                    }
                }
            }
            // exit();
        if($update)
        {
            $this->session->set_flashdata('g_success',  'Generate Packing have been Updated successfully...');
        }else{
           $this->session->set_flashdata('g_err', 'Could not Generate Packing!');
        }    
        redirect('Akssale');
    }

    


    #***************************************Sale Edit Start**********************************************#
    public function  akssaleedit($id){

        $data['category_list1']  = $this->db->query("SELECT * FROM AKSPRODUCT_CATEGORY WHERE Status='Y'  ")->result_array();      
        $data['supplier_list']   = $this->Aks_sale_model->get_supplier_list();       
        $data['sale_menu']       = $this->Aks_sale_model->get_sale_detail();
        $data['sale_price']      = $this->Aks_sale_model->get_sale_detail();
        $data['quotation_lists'] = $this->Aks_sale_model->getquotationlist();

        $data['edit'] = $this->Aks_sale_model->get_sale_edit_list($id);


        if ($data['edit']) {

          $payment_id = $data['edit']->sale_id;

          $data['cash_detail'] = $this->db->query("SELECT * FROM payment_inward_outward WHERE bill_no='".$payment_id."' AND type_of_payment='Cash' ")->row();
          $data['upi_detail']  = $this->db->query("SELECT * FROM payment_inward_outward WHERE bill_no='".$payment_id."' AND type_of_payment='UPI' ")->row();
          $data['cheque_detail'] = $this->db->query("SELECT * FROM payment_inward_outward WHERE bill_no='".$payment_id."' AND type_of_payment='Cheque' ")->row();
            
        }else{

             
             $data['cash_detail']  = '';
             $data['upi_detail']  = '';
             $data['cheque_detail'] = '';
        }
        $this->load->view('aks_sale/aks_edit_sale',$data);
        
    }
   
    public function add_edit_cart_list()
    {
        $id      = $_POST['id'];
        // $getdata = $this->Aks_sale_model->get_sale_quo_list($id);
        // $count = $_POST['count'];
        $data['cart_list'] = $this->Aks_sale_model->get_edit_cart_list($id);
        // $count = count($data['cart_list']);

        $arr =[];
        $row ="";
        $rows='';
        $array='';

        foreach ($data['cart_list'] as $count => $clist) {


            $prd_id         = $clist['product_id'];
            $prd_list       = $this->Aks_sale_model->get_cart_list($prd_id);
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
        
        
        // print_r('s'); 
        // exit();
        $data['sale_date']         = $this->input->post('sale_date');
        $saledate                  = date('Y-m-d',strtotime($data['sale_date']));
        $data['sale_id']           = $this->input->post('sale_id_hidden');
        $data['sale_wgt']          = $this->input->post('sale_wgt');
        $data['sale_price']        = $this->input->post('prd_sale_price_hidden');
        $data['unit']              = $this->input->post('prd_unit');
        $data['prd_id']            = $this->input->post('prd_id_hidden');
        $data['HSN_CODE']          = $this->input->post('prd_hsn_hidden'); 
        $data['sale_deliverymode'] = $this->input->post('delivery_add_mode_courier');
        $data['sale_delivery']     = $this->input->post('del_select');
        $data['sale_shipment']     = $this->input->post('shipment_to'); 
        $data['shipment_charges']  = $this->input->post('shipment_charges');  
        $data['remarks']           = $this->input->post('remarks'); 
        $data['sale_prd_tot_amt']  = $this->input->post('totalamount');
        $data['sale_dis_amt']      = $this->input->post('dis_cart_amt');
        $data['sale_net_amt']      = $this->input->post('netamount');
        $data['sale_cash']         = $this->input->post('paid_amount');
        $data['balance_cash']      = $this->input->post('balance_amount');
        $data['create_by']         = $_SESSION['username'];
        $data['create_on']         = date('Y-m-d H:i:s');

        $data['modified_by']         = $_SESSION['username'];
        $data['modified_on']         = date('Y-m-d H:i:s');

        $data['status']            = 'Y';        
        $data['sale_del_by']       = $this->input->post('del_by');
        $data['sale_track_id']     = $this->input->post('tracking_id');

        #cash
        $data['cash_amount'] =$this->input->post('cashamount');
        $data['cash_detail'] =$this->input->post('cashdetail');
        #cheque
        $data['cheque_amt'] =$this->input->post('chequeamount');
        $data['cheque_supbk'] =$this->input->post('chequesupbank');
        $data['cheque_refno'] =$this->input->post('chequerefno');
        $data['cheque_detail'] =$this->input->post('chequedetail');
        #upi 
        $data['upi_amt'] =$this->input->post('upiamount');
        $data['upi_refno'] =$this->input->post('upirefno');
        $data['upi_bank'] =$this->input->post('upibank');
        $data['upi_detail'] =$this->input->post('upidetail');      

        $count  = count($data['sale_price']);
        $count1 = $count;
        $data['sale_prd_count']   = $count1;
        $cart_ids    = $data['sale_id'];
        $cart_list   = $this->Aks_sale_model->get_edit_cart_list($cart_ids);
        foreach ($cart_list as $si => $val) {

          $cart_id_get   = $val['id'];
          $product_ids   = $val['product_id'] ?$val['product_id']:'';
          $updateoldcart = $this->db->query("UPDATE AKS_SALE_CART SET status = 1 WHERE id = '".$cart_id_get."' AND product_id = ".$product_ids);              
                $up_cur_data    = $this->db->query("SELECT * FROM AKS_PRD_MASTER WHERE AKS_PRD_MID = '".$product_ids."' ")->row();

                $up_crt_qty     = $up_cur_data->PRD_CUR_QTY?$up_cur_data->PRD_CUR_QTY:0;
                $up_crt_qty_tot = $up_crt_qty;
                $up_wgts        = $val['product_wgt']?$val['product_wgt']:0 ;
                $up_bal_qty     = $up_crt_qty_tot + $up_wgts ;
                $stk_up_bal_qty = $up_bal_qty;  

                $updstkhis      = $this->db->query("INSERT INTO AKS_STOCK
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
                    values (

                     '".$product_ids."'
                    ,'".$saledate."'
                    ,'".$up_crt_qty."'
                    ,'Sale Updated'
                    ,'IN'
                    ,'".$up_wgts."'
                    ,'".$stk_up_bal_qty."'
                    ,'".$data['create_by']."'
                    ,'".$data['create_on']."'
                    ,'".$data['sale_id']."')");

                  $up_curt_stk = $stk_up_bal_qty;                 
                  $up_prd_mas  = $this->db->query("UPDATE AKS_PRD_MASTER SET PRD_CUR_QTY='". $up_curt_stk."' WHERE AKS_PRD_MID=". $product_ids);

        }

        $result = $this->Aks_sale_model->sale_update($data,$saledate);
        if ($result) {

            for($i=0;$i<$count1;$i++){

                $wgt         = $data['sale_wgt'][$i] ;
                $unit_price  = $data['unit'][$i];
                $purprice    = $data['sale_price'][$i];                
                $tot         = ( $wgt  / $unit_price  ) * $purprice ;
                $total_price = $tot;
                  
                $res=$this->db->query("INSERT INTO AKS_SALE_CART (product_id,product_wgt,HSN_CODE,sale_price,price,sale_id,status) values ('".$data['prd_id'][$i]."','".$data['sale_wgt'][$i]."','".$data['HSN_CODE'][$i]."','".$data['sale_price'][$i]."','".$total_price."','".$data['sale_id']."',0)");

                  $prd_ids = $data['prd_id'][$i];
                 
                  $data['crt_qty'] = $this->db->query("SELECT * FROM AKS_PRD_MASTER WHERE AKS_PRD_MID = '".$prd_ids."' ")->row();
                  $crt_qty     =  $data['crt_qty']->PRD_CUR_QTY;
                  $crt_qty_tot =  $crt_qty;
                  $wgts        =  $data['sale_wgt'][$i] ;
                  $bal_qty     =  $crt_qty_tot - $wgts ;
                  $stk_bal_qty =  $bal_qty;
                  

                  $min_stock  = $data['crt_qty']->AKS_MIN_STK;

                  if($bal_qty < $min_stock){

                    add_notification(date('Y-m-d H:i:s'), '', "Others", "karupatti<br> Minimum Stock Alert", $data['crt_qty']->AKS_PRD_NAME. 'Minimum Stock Reached ' .$_SESSION['username'],'', $_SESSION['USERID'], '0', $data['crt_qty']->AKS_PRD_NAME);

                  }

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
                    values (

                    '".$data['prd_id'][$i]."'
                    ,'".$saledate."'
                    ,'".$crt_qty."'
                    ,'Sale'
                    ,'OUT'
                    ,'".$data['sale_wgt'][$i]."'
                    ,'".$stk_bal_qty."'
                    ,'".$data['create_by']."'
                    ,'".$data['create_on']."'
                    ,'".$data['sale_id']."')");               
                 
                 
                  $curt_stk = $stk_bal_qty;                 
                  $res      = $this->db->query("UPDATE AKS_PRD_MASTER SET PRD_CUR_QTY='". $curt_stk."' WHERE AKS_PRD_MID=". $product_ids);


                 }


          $cash_detail   = $this->db->query("SELECT * FROM payment_inward_outward WHERE bill_no='".$data['sale_id']."' AND type_of_payment='Cash' ")->row();
          $cheque_detail = $this->db->query("SELECT * FROM payment_inward_outward WHERE bill_no='".$data['sale_id']."' AND type_of_payment='Cheque' ")->row();
          $upi_detail    = $this->db->query("SELECT * FROM payment_inward_outward WHERE bill_no='".$data['sale_id']."' AND type_of_payment='UPI' ")->row();

              if ($cash_detail) {
                $cash   = $this->Aks_sale_model->upcashsave($data);
              }else{
                $cash   = $this->Aks_sale_model->cashsave($data);
              }

              if ($cheque_detail) {
                $cheque = $this->Aks_sale_model->upchequesave($data);
              }else{
                $cheque = $this->Aks_sale_model->chequesave($data);
              }

              if ($upi_detail) {
                $upi    = $this->Aks_sale_model->upupisave($data);
              }else{
                $upi    = $this->Aks_sale_model->upisave($data);
              }
               
            add_notification(date('Y-m-d H:i:s'), '', "Others", "karupatti<br>Sale Update", $data['sale_id']. ' updated By ' .$_SESSION['username'],'', $_SESSION['USERID'], '0', $data['sale_id']);
        }

        // exit;
        if($result)
        {
            $this->session->set_flashdata('g_success',  $data['sale_id'].'Sales have been Updated successfully...');
        }else{
           $this->session->set_flashdata('g_err', 'Could not update sale !');
        }
        redirect('Akssale');
         
    }
    #***************************************Sale Edit End**********************************************#
    #***************************************Sale Delete Start**********************************************#


    public function delete()
    { 
      $id  = $_POST['id'];
      $bid = $_POST['saleid'];   
      $data['modified_by']         = $_SESSION['username'];
      $data['modified_on']         = date('Y-m-d H:i:s');  

      $data['product_id_get'] = $this->db->query("SELECT * FROM AKS_SALE_CART WHERE sale_id='".$bid."' ")->result_array();
      $product = $data['product_id_get'];
      foreach ($product as $val) {
       
          $prdd = $val['product_id']?$val['product_id']:'';
          $data['crt_qty'] = $this->db->query("SELECT * FROM AKS_PRD_MASTER WHERE AKS_PRD_MID = '".$prdd."' ")->row();

          $crt_qtys = $data['crt_qty']->PRD_CUR_QTY;
          $wgt      = $val['product_wgt'];
          $tot      = $crt_qtys + $wgt;
          $qtot     = $tot ;
          $ress     = $this->db->query("UPDATE AKS_PRD_MASTER SET PRD_CUR_QTY='".$qtot."' WHERE AKS_PRD_MID=". $prdd);
          $ins_data = array(
                              'prd_id'      =>$prdd,
                              'stk_date'    =>date('Y-m-d'),
                              'stk_cur_qty' =>$crt_qtys,
                              'stk_type'    =>'Sale Deleted',
                              'stk_status'  =>'IN',
                              'stk_count'   =>$wgt,
                              'stk_bal_qty' =>$qtot,
                              'created_by'  =>$_SESSION['username'],
                              'created_on'  =>date('Y-m-d H:i:s'),
                              'bill_no'     =>$bid,
                             );

         $stkresult = $this->db->insert('AKS_STOCK',$ins_data);
      }
        // exit;
        $result    = $this->db->query("UPDATE AKS_SALE_ENTRY SET status='N',modified_by = '".$data['modified_by']."',
            modified_on = '".$data['modified_on']."'  WHERE sale_id = '".$bid."'");
        echo $result;
        if ($result) {
             add_notification(date('Y-m-d H:i:s'), '', "Others", "karupatti<br>Sale Deleted", $bid. ' Deleted ' .$_SESSION['username'],'', $_SESSION['USERID'], '0', $bid);
            $this->session->set_flashdata('g_success', $bid.' Sale has been Deleted successfully.');
        }
        else{
            $this->session->set_flashdata('g_err', 'Something went wrong');
        }

    }

    #***************************************Sale Delete End**********************************************#




    #*******************************************website*******************************************#
    public function Weblist(){

        $wp_page       = isset($_GET['page']) ? $_GET['page'] : 1;
        $wp_limit      = 50;
        $wp_offset     = ($wp_page - 1) * $wp_limit +1;
        $wp_page_limit = $wp_offset+$wp_limit-1;

        $data['wp_party_name'] = $this->input->post('wp_party_name');
        if($data['wp_party_name']!=''){
            $wp_party_name =" AND party LIKE'%".$data['wp_party_name']."%'";
        }
        else{
            $wp_party_name ='';
        }
     
        $data['wp_dt_fill']           = $this->input->post('wp_dt_fill_sale_list');
        $data['wp_from_date_fillter'] = $this->input->post('wp_from_date_fillter_nontag_list');
        $data['wp_to_date_fillter']   = $this->input->post('wp_to_date_fillter_nontag_list');

        // print_r($data['from_date_fillter']);exit;
        $wp_fdate ='';
        $wp_tdate ='';
        //  print_r($data['dt_fill']);exit();
        if($data['wp_dt_fill']=="all"){

            $wp_fdate ='';
            $wp_tdate ='';

        }
      
        if($data['wp_dt_fill']=="today"){
            $today = date('Y-m-d h:m:s');
            $data['wp_today_date_fillter'] = date('Y-m-d h:m:s',strtotime($today ));
            $wp_fdate =" AND date = '".$data['wp_today_date_fillter']."'";
            $wp_tdate ='';
            
        }


        if($data['wp_dt_fill']=="week"){
            $today=date('l');
            if($today=="Sunday"){
                $data['wp_week_from_date_fillter']=date(' Y-m-d', strtotime("sunday 0 week"));
           
                $data['wp_week_to_date_fillter']=date(' Y-m-d', strtotime("saturday 1 week"));
               // print_r($data['week_to_date_fillter']);exit;
                $wp_fdate =" AND date>='".$data['wp_week_from_date_fillter']."'";
                $wp_tdate =" AND date<='".$data['wp_week_to_date_fillter']."'";

            }else{
                $data['wp_week_from_date_fillter']=date(' Y-m-d', strtotime("sunday -1 week"));
           
                $data['wp_week_to_date_fillter']=date('Y-m-d', strtotime("saturday 0 week"));
                //  print_r($data['week_to_date_fillter']);exit;
                $wp_fdate =" AND date>='".$data['wp_week_from_date_fillter']."'";
                $wp_tdate =" AND date<='".$data['wp_week_to_date_fillter']."'";
            }
        }

        if($data['wp_dt_fill']=="monthly"){
                   
            $first=date('Y-m-01');
            $last=date('Y-m-t');
            $wp_fdate =" AND date>='".$first."'";
            $wp_tdate ="AND date<='".$last."'";
        }

        if($data['wp_dt_fill']=="custom Date"){
            if($data['wp_from_date_fillter']!=''){

                $first=date('Y-m-d',strtotime($data['wp_from_date_fillter']));
                $wp_fdate =" AND date>='".$first."'";
                    
            }
            else{
                $wp_fdate ='';
            }


            if($data['wp_dt_fill']=="custom Date"){
                if($data['wp_from_date_fillter']!=''){
                    $first=date('Y-m-d',strtotime($data['wp_from_date_fillter']));
                    $wp_fdate =" AND date>='".$first."'";
                    
                }
                else{
                    $wp_fdate ='';
                }

                if($data['wp_to_date_fillter']!=''){
                    $last=date('Y-m-d',strtotime($data['wp_to_date_fillter']));
                    $wp_tdate =" AND date<='".$last."'";
                        
                }
                else{
                    $wp_tdate ='';
                } 
            }
        }



        // print_r($wp_fdate);
        // print_r($wp_tdate);
        // print_r($party_name);
        // print_r($wp_offset);
        //print_r($wp_page_limit);exit;
     


        $this->db->reconnect();
        $data['web_sale_list'] = $this->Aks_sale_model->get_web_sale_list_fill($wp_fdate,$wp_tdate,$wp_party_name,$wp_offset,$wp_page_limit);
        
        $data['wp_count'] = count($this->db->query("SELECT * FROM AKS_WEB_SALE_LIST WHERE convert_status = '0'  $wp_fdate $wp_tdate $wp_party_name  ORDER BY wid DESC")->result_array());
        
        
        // print_r( $data['wp_count']);exit;

         // echo json_encode($data['web_sale_list'][0]);
         // exit;

        $this->load->view('aks_sale/aks_web_list',$data);



    }

    public function wp_change_status(){

        $status  = $_POST['status'];
        $id  = $_POST['id'];

        if($status == 'C'){
            $result = $this->db->query(" UPDATE AKS_WEB_SALE_LIST SET status ='".$status ."', convert_status ='1'   WHERE wid ='".$id."'");
            $this->website_sale_save($id);
        }else{
            $result = $this->db->query(" UPDATE AKS_WEB_SALE_LIST SET status ='".$status ."' WHERE wid ='".$id."'");
            $status=['status'=>1];
            echo json_encode($status);
        }
        
        // 
       

    }

    public function Weblist_view()
    {
        $sid = $_GET['id'];

        $results = $this->db->query("SELECT * FROM AKS_WEB_SALE_LIST  WHERE wid ='".$sid."'")->row();
       // echo $sid;

        //  $data = $this->Aks_sale_model->get_sale_list_view($sid);

        // if ($data[0]['supplier_id']=='null') {
        // $old_data =  $this->Akspurchase_model->get_supplier_by_id($data[0]['supplier_id']);

        // $supplier_name = $old_data->LEDGER_NAME;

        // }else{

        //     $supplier_name = $data[0]['pur_sup'];
        // }

        echo json_encode($results);
    }


    public function website_sale_save($web_id)
    {   
        $webdata = $this->db->query("SELECT * FROM AKS_WEB_SALE_LIST WHERE wid = '".$web_id."'  ")->row();

            // Website  Info // 

            $web_info = $webdata;

            // Party Info //

            $party_info = json_decode($webdata->party_info);


            // Billing Info //

            $billing_address = json_decode($webdata->billing_address);

            // Shiping Address Info //

            $shipping_address = json_decode($webdata->shipping_address);

            // Product Details //
            $products_info = json_decode($webdata->products);




            
            $name           = $party_info?$party_info->first_name:"";
            $lname          = $party_info?$party_info->last_name:"";
            $phone          = $web_info?$web_info->mobile:"";
            $email          = $party_info?$party_info->email:"";

            $country        = $party_info?$party_info->country:"";
            $state          = $party_info?$party_info->state:"";
            $city           = $party_info?$party_info->city:"";
            $pincode        = $party_info?$party_info->postcode:"";

            $address1       = $billing_address?$billing_address->billing_address_1:"";
            $address2       = $billing_address?$billing_address->billing_address_2:"";   
            $is_karuppatti  = 1;
            $party_type     = 'W';
            $type_of_record = 'O';
        


            $party_chk = $this->db->query("SELECT * FROM PARTIES  WHERE PARTY_TYPE='W' AND WEBSITE_CUS_ID='".$party_info->customer_id."' ")->row();
            if(!$party_chk){

                $userlist = $this->db->query("SELECT * FROM USERLIST WHERE NAME='".$_SESSION['username']."' ")->row();
                $prefix   = $userlist->LOANPREFIX;
                $id_get   = $this->db->query("SELECT * FROM KEYMASTER WHERE KEYNAME='PARTIES-".$prefix."' ")->row();
                $suffix   = str_pad($id_get->KEYVALUE+1, 6, '0', STR_PAD_LEFT);
                $party_id = $prefix.$suffix; 


                $partiesinsert      = $this->db->query("INSERT INTO  PARTIES(
                                                                    PID,
                                                                    NAME,
                                                                    FATHERSNAME,
                                                                    PHONE,
                                                                    EMAIL,
                                                                    STATE,
                                                                    CITY,
                                                                    PINCODE,
                                                                    ADDRESS1,
                                                                    ADDRESS2,
                                                                    IS_KARUPATTI,
                                                                    PARTY_TYPE,
                                                                    TYPE_OF_RECORD,
                                                                    WEBSITE_CUS_ID
                                                                ) VALUES(
                                                                    '".$party_id."',
                                                                    '".$name."',
                                                                    '".$lname."',
                                                                    '".$phone."',
                                                                    '".$email."',
                                                                    '".$state."',
                                                                    '".$city."',
                                                                    '".$pincode."',
                                                                    '".$address1."',
                                                                    '".$address2."',
                                                                    '".$is_karuppatti."',
                                                                    '".$party_type."',
                                                                    '".$type_of_record."',
                                                                    '".$party_info->customer_id."'
                                                                )");




                $update=$this->db->query("UPDATE KEYMASTER SET KEYVALUE= KEYVALUE+1 WHERE KEYNAME='PARTIES-".$prefix."'");
                $data['sale_party']      = $name;
                $data['id_partys']       = $party_id;




                //Shipping address insert 


                $res1=$this->db->query("INSERT INTO  AKS_SHIPPING_ADDRESS (
                                                                            party_id,
                                                                            name,
                                                                            lname,
                                                                            mobile,
                                                                            email,
                                                                            country,
                                                                            state,
                                                                            city,
                                                                            pincode,
                                                                            address
                                                                        ) VALUES(

                                                                            '".$party_id."',
                                                                            '".$name."',
                                                                            '".$lname."',
                                                                            '".$phone."',
                                                                            '".$email."',
                                                                            '".$country."',
                                                                            '".$state."',
                                                                            '".$city."',
                                                                            '".$pincode."',
                                                                            '".$address1."'
                                                                        )");

            }else{

                $data['sale_party']      = $party_chk->NAME;
                $data['id_partys']       = $party_chk->PID;

            }



        $data['sale_date']  = $web_info->date;
        $saledate = date('Y-m-d',strtotime($data['sale_date']));



        $last_sid_detail = $this->Aks_sale_model->last_sid_details();

        if($last_sid_detail!=''){

            $last_data = $last_sid_detail? $last_sid_detail->sale_id :1;

            $year = substr( date("y"), -2);
            $slice = explode("/", $last_data);
            $result = preg_replace('/[^0-9]/',' ', $slice[0]); 

            function request_num ($input, $pad_len = 3  , $prefix = null) {
               
            
                if (is_string($prefix))
                
                    return sprintf("%s%s", $prefix, str_pad($input, $pad_len, "0", STR_PAD_LEFT));
                
                    return str_pad($input, $pad_len, "0", STR_PAD_LEFT);
                }

                $request =  request_num(((int)$result+1), 3, "AKSS-");
                
                $request_id =  $request.'/'.$year;

              $sale_id = $request_id;
            }

        else{
            $year = substr( date("y"), -2);
            $sale_id=  'AKSS-001/'.$year;
        }

        //Input data 

        $data['sale_id']           = $sale_id;
        $data['type']              = "Website";
        $data['sale_deliverymode'] = $web_info->delivery_mode;
        $data['del_supplier_id']   = ""; 
        $data['shipment_charges']  = $web_info->shipment_charges;  
        $data['remarks']           = $web_info->remarks;
        $data['sale_prd_tot_amt']  = $web_info->sale_prd_tot_amt;
        $data['sale_dis_amt']      = $web_info->sale_dis_amt;
        $data['sale_net_amt']      = $web_info->sale_net_amt;
        $data['sale_cash']         = $web_info->sale_cash;
        $data['balance_cash']      = $web_info->balance_cash;
        $data['create_by']         = $_SESSION['username'];
        $data['create_on']         = date('Y-m-d H:i:s');
        $data['status']            = 'Y';
        $data['upi_amt']           = $web_info->sale_cash;
        $data['upi_refno']         = "";
        $data['upi_bank']          = "";
        $data['upi_detail']        = "";
        $data['sale_id']           = $sale_id;
        $data['sale_prd_count']    = $web_info->sale_prd_count;
        $data['other_bill']        = $webdata->web_id;


        $result = $this->Aks_sale_model->websale_entry($data,$saledate);
        // print_r('resulr'.$result);
        // $result= 1;

        if($result) {

            $upi = $this->Aks_sale_model->upisave($data);
            // print_r('upi'.$upi);


            foreach($products_info as $wprd){

                $wgt            =  preg_replace('/[^0-9\- ]/', '', $wprd->product_weight);
                $unit_price     =  $wprd->product_net_revenue/$wprd->product_quantity;
                $purprice       =  $wprd->product_net_revenue;
                $tot            =  ($wgt/$unit_price) * $purprice ;
                $total_price    =  $tot;
                $webproduct_id  =  $wprd->product_id;
                $webproduct_name  =  preg_replace('/[^A-Za-z0-9\- ]/', '', $wprd->product_name);
                $webproduct_weight  =  preg_replace('/[^0-9\- ]/', '', $wprd->product_weight);
                $webproduct_price  =  $wprd->product_amount;



                $reponse = $this->db->query("SELECT * FROM AKS_PRD_MASTER  WHERE AKS_PRD_MID='".$wprd->product_id."' ")->row();

                if (!$reponse) {                  
                    $product=$this->db->query("INSERT INTO AKS_PRD_MASTER
                                                        (
                                                           AKS_PRD_MID
                                                          ,AKS_CAT_NAME
                                                          ,AKS_PRD_NAME
                                                          ,AKS_PRD_WT
                                                          ,AKS_PRD_PRICE
                                                          ,CREATE_BY
                                                          ,CREATE_ON
                                                          ,STATUS
                                                          ,PRODUCT_TYPE
                                                          ) 
                                                    values (
                                                            '".$webproduct_id."',
                                                            '7',
                                                            '".$webproduct_name."',
                                                            '".$webproduct_weight."',
                                                            '".$unit_price."',
                                                            '".$data['create_by']."',
                                                            '".$data['create_on']."',
                                                            '".$data['status']."',
                                                            'W'
                                                        )");
                    // print_r('Product'.$product);

                }


                $res=$this->db->query("INSERT INTO AKS_SALE_CART
                                                        (
                                                        product_id,
                                                        product_wgt,
                                                        sale_price,
                                                        price,
                                                        sale_id,
                                                        status
                                                        ) 
                                                    values (
                                                            '".$webproduct_id."',
                                                            '".$webproduct_weight."',
                                                            '".$purprice."',
                                                            '".$webproduct_price."',
                                                            '".$data['sale_id']."',
                                                            0
                                                        )");

                                                    // print_r('cart'.$res);
            }

            
        }
        // exit;
        echo $result;
        if($result)
        {
            add_notification(date('Y-m-d H:i:s'), '', "Others", "karupatti<br> New Website Sale", $sale_id. ' created By ' .$_SESSION['username'],'', $_SESSION['USERID'], '0', $sale_id);
            $this->session->set_flashdata('g_success',  $data['sale_id'].' New Sales have been added successfully...');
        }else{
           $this->session->set_flashdata('g_err', 'Could not add sale !');
        }
        // redirect('Akssale');
         
    }
    #******************************************Website Sync **************************************#



   


}


?>


