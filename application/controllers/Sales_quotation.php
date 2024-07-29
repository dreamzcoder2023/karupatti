<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/* ************************************************************************************
        Purpose : To handle all Department functions 2022-08-19
***************************************************************************************/
class Sales_quotation extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model(array("Sales_quotation_model","Akssalequotation_model","Accountsgroup_model"));
        // $this->load->library('user_agent');

        // $fin_year=$this->Accountsgroup_model->get_fin_years_list();
        // $db=substr($fin_year->DBNAME,0,strlen($fin_year->DBNAME)-4);
        // //echo $db;exit;
        // $config_app = switch_db_dynamic($db);
        
        // $this->jst_inventory_model->other_db = $this->load->database($config_app,TRUE);
        $fin_year=$this->Accountsgroup_model->get_fin_years_list();
        $db=substr($fin_year->DBNAME,0,strlen($fin_year->DBNAME)-4);
        $db_user=$fin_year->USERNAME?$fin_year->USERNAME:'';
        $db_pass=$fin_year->PASSWORD?$fin_year->PASSWORD:'';
        // echo $db;exit;
        $config_app = switch_db_dynamic($db,$db_user,$db_pass);
        
        $this->Sales_quotation_model->other_db = $this->load->database($config_app,TRUE);

        if (isset($this->session->userdata['username']) && $this->session->userdata['username'] == TRUE)
        {
            //do something
        }else{
            redirect('login'); //if session is not there, redirect to login page
        } 
        date_default_timezone_set("Asia/Kolkata");
        // $this->session->set_userdata('comtitle', 'Tagentry');
    }


    public function index()

    {

       
        $data['company_fill'] = $this->input->post('company_fill');

        if($data['company_fill']!=''){
            $cname =" AND COMPANY_CODE='".$data['company_fill']."'";
        
        }
        else{
            $cname ='';
        }

        $data['dt_fill']            = $this->input->post('dt_fill_sales_list');
        $data['from_date_fillter']  = $this->input->post('from_date_fillter_sales_list');
        $data['to_date_fillter']    = $this->input->post('to_date_fillter_sales_list');
        $fdate ='';
        $tdate ='';

        //  print_r($data['dt_fill']);exit();
        
        if($data['dt_fill']=="today"){
            $data['today_date_fillter'] = date("Y-m-d");
            $fdate =" AND QUOT_DATE='".$data['today_date_fillter']."'";
            $tdate ='';
        }

        if($data['dt_fill']=="week"){
            $today=date('l');
            if($today=="Sunday"){
                $data['week_from_date_fillter']=date(' Y-m-d', strtotime("sunday 0 week"));
                $data['week_to_date_fillter']=date(' Y-m-d', strtotime("saturday 1 week"));
                // print_r($data['week_to_date_fillter']);exit;
                $fdate =" AND QUOT_DATE>='".$data['week_from_date_fillter']."'";
                $tdate =" AND QUOT_DATE<='".$data['week_to_date_fillter']."'";
            }else{
                $data['week_from_date_fillter']=date(' Y-m-d', strtotime("sunday -1 week"));
                $data['week_to_date_fillter']=date(' Y-m-d', strtotime("saturday 0 week"));
                //  print_r($data['week_to_date_fillter']);exit;
                $fdate =" AND QUOT_DATE>='".$data['week_from_date_fillter']."'";
                $tdate =" AND QUOT_DATE<='".$data['week_to_date_fillter']."'";
            }
        }
            
        if($data['dt_fill']=="monthly"){
           
            $first=date('Y-m-01');
            $last=date('Y-m-t');
            $fdate =" AND QUOT_DATE>='".$first."'";
            $tdate ="AND QUOT_DATE<='".$last."'";
        }
                
        if($data['dt_fill']=="custom Date"){
            if($data['from_date_fillter']!=''){
                $first=date('Y-m-d',strtotime($data['from_date_fillter']));
                $fdate =" AND QUOT_DATE>='".$first."'";
                        
            }else{
                $fdate ='';
            }
            
            if($data['to_date_fillter']!=''){
                $last=date('Y-m-d',strtotime($data['to_date_fillter']));
                $tdate =" AND QUOT_DATE<='".$last."'";
            }else{
                $tdate ='';
            } 
        }

        $page       = isset($_GET['page']) ? $_GET['page'] : 1;
        $limit      = 10;
        $offset     = ($page - 1) * $limit +1;
        $page_limit = $offset+$limit-1;

        $data['company_list']  = $this->db->query("SELECT * FROM COMPANY WHERE ACTIVE='Y'  ")->result_array();

        $sales_quotation_list  = $this->db->query("SELECT COUNT(ID) AS COUNT , QUOT_ID  FROM SALES_QUOTATION WHERE STATUS = 0 $fdate $tdate $cname GROUP BY QUOT_ID ORDER BY COUNT DESC  ")->result_array();

        $data['count']= count($this->db->query("SELECT COUNT(ID) AS COUNT , QUOT_ID  FROM SALES_QUOTATION WHERE STATUS = 0 $fdate $tdate $cname GROUP BY QUOT_ID ORDER BY COUNT DESC ")->result_array());

        $data['convert_sale_count']= count($this->db->query("SELECT COUNT(ID) AS COUNT , QUOT_ID FROM SALES_QUOTATION WHERE STATUS = 0 AND IS_SALE ='Y'   $fdate $tdate $cname GROUP BY QUOT_ID ORDER BY COUNT DESC  ")->result_array());
        //print_r($data['sales_quotation_list']);exit;




        $list = [];






        foreach($sales_quotation_list as $ql){


            $qul = $this->db->query("SELECT * FROM SALES_QUOTATION WHERE QUOT_ID='".$ql['QUOT_ID']."'")->row();

           

            $party    = $this->db->query("SELECT * FROM PARTIES WHERE PID='".$qul->PARTY_ID."'")->row();
            $supplier = $this->Sales_quotation_model->get_supplier_info($qul->SUPPLIER_ID);

            $company  = $this->db->query("SELECT * FROM COMPANY WHERE COMPANYCODE ='".$qul->COMPANY_CODE."'")->row();

            $tag_items = $this->db->query("SELECT TAG_ITEMS FROM SALES_QUOTATION WHERE STATUS = 0 AND QUOT_ID='".$qul->QUOT_ID."'")->result_array();

           // $tag_items = json_decode($ql['TAG_ITEMS']);

            $est_amount = 0;

            $cur_rate=$this->db->query("select * from SETUP")->row();

            $current_gold_rate = $cur_rate->BOARD_GOLDRATE;

            foreach($tag_items as $it){
                $items = $this->Sales_quotation_model->get_tag_item($it['TAG_ITEMS']);

                $str = $items->purity   ;
                $items_purity = (int) filter_var($str, FILTER_SANITIZE_NUMBER_INT);

				$tot  = $current_gold_rate * ($items_purity/100);
									// alert(tot);
				$tot_wt = floatval($tot*$items->net_weight);
									
                $est_amount += $tot_wt ;
            }


            $list[]= [
                        "ID"      => $qul->ID,
                        "QUOT_ID" => $qul->QUOT_ID,
                        "QUOT_DATE" => $qul->QUOT_DATE,
                        "QUOT_TYPE" => $qul->QUOT_TYPE,
                        "PARTY_ID" => $qul->PARTY_ID,
                        "PARTY_NAME" => $party?$party->NAME:'',
                        "SUPPLIER_ID" => $qul->SUPPLIER_ID,
                        "SUPPLIER_NAME" => $supplier?$supplier->LEDGER_NAME:'',
                        "COUNT" =>count($tag_items),
                        "EST_AMOUNT" => number_format((float)$est_amount, 2, '.', ''),
                        "IS_SALE" => $qul->IS_SALE,
                        'COMPANY_NAME' => $company?$company->COMPANYNAME:"",
                    ];



        }

        $data['sales_quotation_list'] = $list;

       // print_r($list);exit;

        // $data['sales_order_list']  = $this->db->query(" SELECT  * FROM  ( SELECT *, ROW_NUMBER() OVER (ORDER BY id DESC) AS sl FROM sales_order WHERE  status!='' $fdate $tdate $cname  )N  WHERE      sl BETWEEN $offset AND $page_limit ")->result_array();
        // $data['count']=count($this->db->query("SELECT * FROM sales_order WHERE status!='' $fdate $tdate $cname ORDER BY id DESC  ")->result_array());
        // $data['sales_order_total']  = $this->db->query("SELECT SUM(paid_amount) as tot_paid,SUM(balance_amount) as tot_bal,COUNT(id) as tot_count  FROM sales_order WHERE status!='' $fdate $tdate $cname   ")->row();
        
        
        $this->load->view('sales_quotation/sales_quotation',$data);

    }


    public function add_sales_quotation()
    {
        $data['current_rate']  = $this->db->query("SELECT * FROM SETUP  ")->row();
        $data['metal_type_list']  = $this->db->query("SELECT * FROM jewel_type  ")->result_array();
     //   $data['company_list']  = $this->db->query("SELECT * FROM COMPANY WHERE ACTIVE='Y'  ")->result_array();
        $data['bankers_list']  = $this->db->query("SELECT * FROM BANKS")->result_array();
        $data['purity_list']  = $this->db->query("SELECT * FROM ITEMPURITY WHERE status='0' ")->result_array();  
        $data['gold_item']  = $this->db->query("SELECT * FROM ITEMS  WHERE jewel_type_id='1' ")->result_array();
        $data['silver_item']  = $this->db->query("SELECT * FROM ITEMS WHERE jewel_type_id='2' ")->result_array();

        $data['suppliers_lists'] = $this->Sales_quotation_model->get_supplier_name_list();
        $data['company_list'] = $this->Sales_quotation_model->get_company_list();

        $data['tag_list'] = $this->Sales_quotation_model->get_tag_list();

        // print_r($data['tag_list']);exit;

        $this->load->view('sales_quotation/sales_quotation_new',$data);

    }


    public function sale_list_det()
    {
     
        $search =  $_GET['query']; 
        $rows   = $this->Sales_quotation_model->getParty($search);
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
                $rating=$row->RATING;

                $title = $firstname.'-'.$phone.'-'.$address;
                $res.='{ "title":"'.$title.'","id_party": "'.$row->PID.'","firstname":"'.$firstname.'","address":"'.$address.'","shipment_address":"'.$shipment_address.'","phone":"'.$phone.'","email":"'.$email.'","rating":"'.$rating.'"},';

              
            }
            $res=rtrim($res,',');
            $res.=']';
        }
        else{
            $res.=']';
        }
        print_r($res);die();
      
    }

    public function get_photo()
    {
        $pid = $this->input->post('id');
        $party_det = $this->db->query("SELECT PARTY_IMAGE,PHOTO, TYPE_OF_RECORD FROM PARTIES WHERE PID='".$pid."'")->row();
        if ($party_det) {
            if ($party_det->TYPE_OF_RECORD == 'N') {
                // print_r($party_det->PARTY_IMAGE);
                // exit;
                if(isset($party_det->PARTY_IMAGE) && $party_det->PARTY_IMAGE !== "") {
                    $div = '<img src="'.$party_det->PARTY_IMAGE.'" height="125px" width="125px">';
                } else {
                     $div = '<img src="'.base_url().'assets/images/party.jpg" height="125px" width="125px">';
                }
            } else {
                // print_r('old');
                // exit;
                if(isset($party_det->PHOTO) && $party_det->PHOTO !== "") {
                    $div = '<img src="data:image/jpg;charset=utf8;base64,'.base64_encode($party_det->PHOTO).'" height="125px" width="125px">';
                } else {
                    $div = '<img src="'.base_url().'assets/images/party.jpg" height="125px" width="125px">';
                }
            }
        } else {
            // print_r('no ');
            $div = '<img src="'.base_url().'assets/images/party.jpg" height="125px" width="125px">';
            // exit;
        }

        echo $div;
    }


    public function supplier_info(){

        $sid = $_POST['id'];

        $row = $this->Sales_quotation_model->get_supplier_info($sid);

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

    
    public function get_tag_item(){

        $tag_id = $_POST['tag_id'];
        $row = $this->Sales_quotation_model->get_tag_item($tag_id);

        echo json_encode($row);
    }

   


    public function sales_quotation_save()
    {
        $input_data['quot_date'] = date('Y-m-d',strtotime($this->input->post('date')));
        $input_data['quot_type'] = $this->input->post('quot_type');
        $input_data['sale_party'] = $this->input->post('sale_party');
        $input_data['party_id'] = $this->input->post('party_id_hidden');
        $input_data['supplier_id'] = $this->input->post('supplier_id');
        $input_data['company'] = $this->input->post('company');
        $input_data['item_details'] = $this->input->post('item_details');

        $tag_items = [];

        foreach($input_data['item_details'] as $tag){
            if($tag){
                $tag_items[]=$tag;
            }
        }

       
        $input_data['is_sale']     = 'N';


        $input_data['created_by']  = $_SESSION['username'];
        $input_data['created_on']  = date('Y-m-d H:i:s');
        $input_data['added_user'] = $_SESSION['username'];


        //AUTO GENERATE Quotation ID
        $last_Quotation = $this->Sales_quotation_model->last_sale_quotation_id();

        if($last_Quotation){

            $last_data = $last_Quotation->QUOT_ID;
            $year = substr( date("y"), -2);
            $slice = explode("/", $last_data);
            $result = preg_replace('/[^0-9]/',' ', $slice[0]); 
             
            function request_num ($input, $pad_len = 3  , $prefix = null) {
                           
                if (is_string($prefix))
                   
                return sprintf("%s%s", $prefix, str_pad($input, $pad_len, "0", STR_PAD_LEFT));
               
                return str_pad($input, $pad_len, "0", STR_PAD_LEFT);
            }

            $request =  request_num(((int)$result+1), 3, "SQUO-");
            $request_id =  $request.'/'.$year;
            $quot_id = $request_id;
        }
        else{
            $year = substr( date("y"), -2);
            $quot_id=  'SQUO-001/'.$year;
        }

        $input_data['quot_id'] = $quot_id;

       // $input_data['tag_items']   = json_encode($tag_items);
        foreach($tag_items as $val){
            $input_data['tag_items'] = $val;
            $result = $this->Sales_quotation_model->add_quotation_entry($input_data);
        }




        

        if($result)
        {
            $this->session->set_flashdata('g_success', ' Sales Quotation  have been added successfully...');
        }else{
            $this->session->set_flashdata('g_err', 'Could not add Sales details!');
        }

        redirect('Sales_quotation');

    }


    public function sales_quotation_edit($id)
    {
        $data['suppliers_lists'] = $this->Sales_quotation_model->get_supplier_name_list();
        $data['company_list'] = $this->Sales_quotation_model->get_company_list();
        $data['tag_list'] = $this->Sales_quotation_model->get_tag_list();

        $quotation = $this->Sales_quotation_model->sales_quotation_edit($id);


        if($quotation){

       
            $company  = $this->db->query("SELECT * FROM COMPANY WHERE COMPANYCODE ='".$quotation->COMPANY_CODE."'")->row();

            $tag_items = $this->db->query("SELECT TAG_ITEMS FROM SALES_QUOTATION WHERE STATUS = 0 AND QUOT_ID='".$quotation->QUOT_ID."'")->result_array();
            // $tag_items = json_decode($quotation->TAG_ITEMS);

            $data['item_count'] = count($tag_items);

            $cur_rate=$this->db->query("select * from SETUP")->row();
            $current_gold_rate = $cur_rate->BOARD_GOLDRATE;

            $items = [];

            $selected_values = [];
            $selected_amount = [];
            foreach($tag_items as $it){

                $item = $this->Sales_quotation_model->get_tag_item($it['TAG_ITEMS']);
                $str = $item->purity   ;
                $item_purity = (int) filter_var($str, FILTER_SANITIZE_NUMBER_INT);
                $tot  = $current_gold_rate * ($item_purity/100);             
                $tot_wt = floatval($tot*$item->net_weight);  
                
                
                $selected_amount[] = $tot_wt ;
                $selected_values[] = $item->tag_id;

                $items [] = (object)[

                                'tag_id'       => $item->tag_id,
                                'metal_type'   => $item->metal_type,
                                'item_name'    => $item->item_name,
                                'quality'      => $item->quality,
                                'purity'       => $item->purity,
                                'weight'       => $item->weight,
                                'stone_weight' => $item->stone,
                                'net_weight'   => $item->net_weight,
                                'img'          => $item->img,
                                'est_amount'   => $tot_wt,
                            
                            ]; 


            }

            $data['selected_values'] = $selected_values;
            $data['selected_amount'] = $selected_amount;


            $name    = "";
            $address = "";
            $phone   = "";
            $rating  = "";
            $photo   = "";
    
            if($quotation->PARTY_ID){

                $party    = $this->db->query("SELECT * FROM PARTIES WHERE PID='".$quotation->PARTY_ID."'")->row();

                $name = $party->NAME;

                if($party->TYPE_OF_RECORD == 'O'){
                    $CITY=  ($party->CITY=='')?'--':$party->CITY;
                }
                else
                {
                    $area_det=$this->db->query("select * from CITY where CITYID='".$party->CITY_ID."'")->row();
                    $CITY=  $area_det->CITYNAME;
                }

                if($party->TYPE_OF_RECORD=='O'){
                    $ADDRESS2=($party->ADDRESS2=='')?'--':$party->ADDRESS2;
                }
                else
                {
                    $area_det =$this->db->query("select * from VILLAGE where VILLAGEID='".$party->VILLAGE_ID."'")->row();
                    $ADDRESS2 = $area_det->VILLAGENAME;
                }

                if($party->TYPE_OF_RECORD=='O'){
                    $ADDRESS1 = ($party->ADDRESS1=='')?'--':$party->ADDRESS1;
                }
                else
                {
                    $area_det=$this->db->query("select * from STREET where STREETID='".$party->STREET_ID."'")->row();
                    $ADDRESS1 =  $area_det->STREETNAME;
                }

        
                $address = $ADDRESS1.', '.$CITY;
                $phone   = $party->PHONE;
                $rating  = $party->RATING;

                $party_det=$this->db->query("SELECT PHOTO FROM PARTIES WHERE PID='".$quotation->PARTY_ID."'")->row();
                if($party_det->PHOTO!='')
                {
                    $photo='<img src="data:image/jpg;charset=utf8;base64,'.base64_encode($party_det->PHOTO).'"  height="125px" width="125px">';
                }
                else
                {
                    $photo='<img src="'.base_url().'assets/images/party.jpg" height="125px" width="125px" >';
                }

            }else{

                $supplier = $this->Sales_quotation_model->get_supplier_info($quotation->SUPPLIER_ID);

                $name = $supplier->LEDGER_NAME?$supplier->LEDGER_NAME:'-';
            
                $address1  = $supplier->ADDRESS?$supplier->ADDRESS:'';
                $address2  = $supplier->ADDRESS2?$supplier->ADDRESS2:'';
                $address   = $address1.$address2;

                $city      = $supplier->CITY?$supplier->CITY:'';
                $state     = $supplier->STATE?$supplier->STATE:'';
                $phone     = $supplier->PHONE?$supplier->PHONE:'';
                

            }

            

        
            $data['quotation'] = (object) [

                                    "ID"            => $quotation->ID,
                                    "QUOT_ID"       => $quotation->QUOT_ID,
                                    "QUOT_DATE"     => $quotation->QUOT_DATE,
                                    "QUOT_TYPE"     => $quotation->QUOT_TYPE,
                                    "PARTY_ID"      => $quotation->PARTY_ID,
                                    "NAME"          => $name,
                                    "ADDRESS"       => $address,
                                    "PHONE"         => $phone,
                                    "RATING"        => $rating,
                                    "SUPPLIER_ID"   => $quotation->SUPPLIER_ID,
                                    "IS_SALE"       => $quotation->IS_SALE,
                                    "COMPANY_NAME"  => $company?$company->COMPANYNAME:"",
                                    "COMPANY_CODE"  => $quotation->COMPANY_CODE,
                                    "TAG_ITEMS"     => $items,
                                    "PHOTO"         => $photo
                                ];

   
        
            $this->load->view('sales_quotation/sales_quotation_edit',$data);
        }else{
            redirect('Sales_quotation');
        }



    }

    

    public function sales_quotation_update($id)
    {
        $input_data['id']           = $id;
        $input_data['quot_date']    = date('Y-m-d',strtotime($this->input->post('date')));
        $input_data['quot_type']    = $this->input->post('quot_type');
        $input_data['sale_party']   = $this->input->post('sale_party');
        $input_data['party_id']     = $this->input->post('party_id_hidden');
        $input_data['supplier_id']  = $this->input->post('supplier_id');
        $input_data['company']      = $this->input->post('company');
        $input_data['item_details'] = $this->input->post('item_details');

        $tag_items = [];

        foreach($input_data['item_details'] as $tag){
            if($tag){
                $tag_items[]=$tag;
            }
        }

       


        $input_data['created_by']  = $_SESSION['username'];
        $input_data['created_on']  = date('Y-m-d H:i:s');
        $input_data['added_user'] = $_SESSION['username'];


       
        $quot  = $this->db->query("SELECT * FROM SALES_QUOTATION WHERE ID = '".$id."'")->row();
        $input_data['quot_id'] = $quot ->QUOT_ID;
       
        foreach($tag_items as $val){

            $chk_item  = $this->db->query("SELECT * FROM SALES_QUOTATION WHERE STATUS=0 AND QUOT_ID = '".$input_data['quot_id']."' AND TAG_ITEMS = '".$val."' ")->row();
           
            if(!$chk_item){

                $input_data['tag_items'] = $val;
                $input_data['modified_by']  = $_SESSION['username'];
                $input_data['modified_on']  = date('Y-m-d H:i:s');
                $result = $this->Sales_quotation_model->add_quotation_entry($input_data);


            }else{
                $result = "Success";
            }

        }

        $old_tag_items  = $this->db->query("SELECT TAG_ITEMS FROM SALES_QUOTATION WHERE QUOT_ID = '".$quot->QUOT_ID."'")->result_array();

        $old_items = [];

        foreach($old_tag_items as $tag_old){
           
            $old_items[] = $tag_old['TAG_ITEMS'];
            
        }
        
        

        $update_disables=array_diff($old_items,$tag_items);

              
        

        foreach($update_disables as $tag_id){

            $update_data['tag_id']   = $tag_id;
            $update_data['quot_id']  = $quot->QUOT_ID;
           
            $result = $this->Sales_quotation_model->delete_tag_item($update_data);

        }
     
     

        if($result)
        {
            $this->session->set_flashdata('g_success', ' Sales Quotation  have been updated successfully...');
        }else{
            $this->session->set_flashdata('g_err', 'Could not add Sales details!');
        }

        redirect('Sales_quotation');
    }


    public function sales_quotation_view($id)
    {

        $data['suppliers_lists'] = $this->Sales_quotation_model->get_supplier_name_list();
        $data['company_list'] = $this->Sales_quotation_model->get_company_list();
        $data['tag_list'] = $this->Sales_quotation_model->get_tag_list();

        $quotation = $this->Sales_quotation_model->sales_quotation_edit($id);

       
        $company  = $this->db->query("SELECT * FROM COMPANY WHERE COMPANYCODE ='".$quotation->COMPANY_CODE."'")->row();

        // $tag_items = json_decode($quotation->TAG_ITEMS);
        $tag_items = $this->db->query("SELECT TAG_ITEMS FROM SALES_QUOTATION WHERE STATUS = 0 AND QUOT_ID='".$quotation->QUOT_ID."'")->result_array();

        $data['item_count'] = count($tag_items);

        $cur_rate=$this->db->query("select * from SETUP")->row();
        $current_gold_rate = $cur_rate->BOARD_GOLDRATE;

        $items = [];

        $selected_values = [];
        $selected_amount = [];
        foreach($tag_items as $it){

            $item = $this->Sales_quotation_model->get_tag_item($it['TAG_ITEMS']);
            $str = $item->purity   ;
            $item_purity = (int) filter_var($str, FILTER_SANITIZE_NUMBER_INT);
            $tot  = $current_gold_rate * ($item_purity/100);             
            $tot_wt = floatval($tot*$item->net_weight);  
            
            
            $selected_amount[] = $tot_wt ;
            $selected_values[] = $item->tag_id;

            $items [] = (object)[

                            'tag_id'       => $item->tag_id,
                            'metal_type'   => $item->metal_type,
                            'item_name'    => $item->item_name,
                            'quality'      => $item->quality,
                            'purity'       => $item->purity,
                            'weight'       => $item->weight,
                            'stone_weight' => $item->stone,
                            'net_weight'   => $item->net_weight,
                            'img'          => $item->img,
                            'est_amount'   => $tot_wt,
                           
                        ]; 


        }

        $data['selected_values'] = $selected_values;
        $data['selected_amount'] = $selected_amount;


        $name    = "";
        $address = "";
        $phone   = "";
        $rating  = "";
        $photo   = "";
 
        if($quotation->PARTY_ID){

            $party    = $this->db->query("SELECT * FROM PARTIES WHERE PID='".$quotation->PARTY_ID."'")->row();

            $name = $party->NAME;

            if($party->TYPE_OF_RECORD == 'O'){
                $CITY=  ($party->CITY=='')?'--':$party->CITY;
            }
            else
            {
                $area_det=$this->db->query("select * from CITY where CITYID='".$party->CITY_ID."'")->row();
                $CITY=  $area_det->CITYNAME;
            }

            if($party->TYPE_OF_RECORD=='O'){
                $ADDRESS2=($party->ADDRESS2=='')?'--':$party->ADDRESS2;
            }
            else
            {
                $area_det =$this->db->query("select * from VILLAGE where VILLAGEID='".$party->VILLAGE_ID."'")->row();
                $ADDRESS2 = $area_det->VILLAGENAME;
            }

            if($party->TYPE_OF_RECORD=='O'){
                $ADDRESS1 = ($party->ADDRESS1=='')?'--':$party->ADDRESS1;
            }
            else
            {
                $area_det=$this->db->query("select * from STREET where STREETID='".$party->STREET_ID."'")->row();
                $ADDRESS1 =  $area_det->STREETNAME;
            }

     
            $address = $ADDRESS1.', '.$CITY;
            $phone   = $party->PHONE;
            $rating  = $party->RATING;

            $party_det=$this->db->query("SELECT PHOTO FROM PARTIES WHERE PID='".$quotation->PARTY_ID."'")->row();
            if($party_det->PHOTO!='')
            {
                $photo='<img src="data:image/jpg;charset=utf8;base64,'.base64_encode($party_det->PHOTO).'"  height="125px" width="125px">';
            }
            else
            {
                $photo='<img src="'.base_url().'assets/images/party.jpg" height="125px" width="125px" >';
            }

        }else{

            $supplier = $this->Sales_quotation_model->get_supplier_info($quotation->SUPPLIER_ID);

            $name = $supplier->LEDGER_NAME?$supplier->LEDGER_NAME:'-';
        
            $address1  = $supplier->ADDRESS?$supplier->ADDRESS:'';
            $address2  = $supplier->ADDRESS2?$supplier->ADDRESS2:'';
            $address   = $address1.$address2;

            $city      = $supplier->CITY?$supplier->CITY:'';
            $state     = $supplier->STATE?$supplier->STATE:'';
            $phone     = $supplier->PHONE?$supplier->PHONE:'';
            

        }

        

       
        $data['quotation'] = (object) [

                                "ID"            => $quotation->ID,
                                "QUOT_ID"       => $quotation->QUOT_ID,
                                "QUOT_DATE"     => $quotation->QUOT_DATE,
                                "QUOT_TYPE"     => $quotation->QUOT_TYPE,
                                "PARTY_ID"      => $quotation->PARTY_ID,
                                "NAME"          => $name,
                                "ADDRESS"       => $address,
                                "PHONE"         => $phone,
                                "RATING"        => $rating,
                                "SUPPLIER_ID"   => $quotation->SUPPLIER_ID,
                                "IS_SALE"       => $quotation->IS_SALE,
                                "COMPANY_NAME"  => $company?$company->COMPANYNAME:"",
                                "COMPANY_CODE"  => $quotation->COMPANY_CODE,
                                "TAG_ITEMS"     => $items,
                                "PHOTO"         => $photo
                            ];

        $this->load->view('sales_quotation/sales_quotation_view',$data);
    }

    public function sales_quotation_delete(){
        $quot_id =  $this->input->post('quotation_id');


        $supplier = $this->Sales_quotation_model->delete_quotation($quot_id);

        if($supplier)
        {
            $this->session->set_flashdata('g_success', ' Sales Quotation  have been Deleted  successfully...');
        }else{
            $this->session->set_flashdata('g_err', 'Could not add Sales details!');
        }

        // redirect('Sales_quotation');
        
    }

  

    public function get_purity()
    {
        $type = $_POST['typeid'];
        $typelist=$this->db->query("SELECT * FROM ITEMPURITY WHERE  ITEMPURITYID='".$type."'  ")->row();
        $value=$typelist->PERCENTAGE;
        echo $value;
        
    }

   

}