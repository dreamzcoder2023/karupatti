<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/***************************************************************
    Purpose : To handle all the Cron_job_model database details 2022-08-22
****************************************************************/
class Cron_job_model extends CI_Model
{
 // public $other_db;
  function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Calcutta');     
        // $config_app = webside_db_connect();    
        // $this->other_db = $this->load->database($config_app,TRUE);
      
    }
    public function cron_job()
    {
      /* woo commerce getting table data */

      // wpew_wc_product_meta_lookup
      // wpew_wc_order_product_lookup
      // wpew_woocommerce_order_itemmeta
      // wpew_woocommerce_order_items
      // wpew_wc_customer_lookup
      // wpew_cartflows_ca_cart_abandonment


      // Local
      // $mysqli = new mysqli("localhost","root","","ayyanark_wp514");


       // $mysqli = new mysqli("ayyanarkaruppati.com:3306", "ayyanark_wp514", "2S08p.@5R1", "ayyanark_wp514");

       // $mysqli = new mysqli("localhost:3306", "ayyanark_wp514", "2S08p.@5R1", "ayyanark_wp514");

       // $mysqli = new mysqli("localhost:3306", "root", "", "ayyanark_wp514");

      // connect server with client local public ip config website c pannel remote sql 
      
       // $mysqli = new mysqli("ayyanarkaruppati.com:3306", "ayyanark_wp514", "2S08p.@5R1", "ayyanark_wp514");

      $mysqli = new mysqli("ayyanarkaruppati.com:3306", "ayyanark_wp214", "Indian@1984", "ayyanark_wp214");


        if ($mysqli->connect_error) {
              die("Failed to connect to MySQL: " . $mysqli->connect_error);
          }

        mysqli_query($mysqli,"set character_set_results='utf8'"); 
        
      
        // echo "connect successfuly";
        // exit;
      // $sql  = "SELECT * FROM wpew_cartflows_ca_cart_abandonment WHERE `time` > SUBDATE( CURRENT_TIMESTAMP, INTERVAL 2 HOUR)";
      // $result = $mysqli->query($sql);

      $last_order  = $this->db->query("SELECT * FROM AKS_WEBSITE_SYNC ORDER BY ORDER_ID DESC")->row();
      // $last_order  = '';
      $last_order_id = $last_order ? $last_order->ORDER_ID : 1;

      $orders = $mysqli->query("SELECT *
                                FROM wpew_wc_order_stats
                                WHERE status = 'wc-completed' AND order_id > '".$last_order_id."'
                                GROUP BY order_id
                                ORDER BY order_id DESC
                                LIMIT 50;");
      // Fetch all
      $orders_list = $orders->fetch_all(MYSQLI_ASSOC);
      //  print_r($orders_list);
      // exit;

      
      $get_data=[];
      


      foreach($orders_list as $key =>  $ol){
        
      
        $products = $mysqli->query("SELECT * FROM wpew_wc_order_product_lookup where order_id ='".$ol['order_id']."'");
        
        // Fetch all
        $products_list = $products -> fetch_all(MYSQLI_ASSOC);

        $product_data= [];

       

        foreach($products_list as $pl){

          $product_name = $mysqli->query("SELECT * FROM wpew_woocommerce_order_items where order_item_id ='".$pl['order_item_id']."'");
          // Fetch all
          $product = $product_name->fetch_all(MYSQLI_ASSOC);
        
         

          $weight = $mysqli->query("SELECT * FROM wpew_woocommerce_order_itemmeta where order_item_id ='".$pl['order_item_id']."' AND meta_key='weight'");
          // Fetch all
          $weight_list = $weight->fetch_all(MYSQLI_ASSOC);

         

          $total_weight = 0;

          if(count($weight_list) > 0){
            $total_weight = $weight_list[0]['meta_value'];
          }else{
            $total_weight = 0;
          }

          $product_wise_info = $mysqli->query("SELECT * FROM wpew_wc_product_meta_lookup where product_id ='".$pl['product_id']."'");
          // Fetch all
          $product_wise_info = $product_wise_info->fetch_all(MYSQLI_ASSOC)[0];
          
         


          $product_data[]= (object) [
                              'order_item_id'  => $pl['order_item_id'], 
                              'product_id'  => $pl['product_id'],
                              'product_weight'  =>  $total_weight,
                              'product_name' =>$product[0]['order_item_name'] , 
                              'product_quantity'  => $pl['product_qty'],     
                              'product_net_revenue'  => $pl['product_net_revenue'],
                              'product_amount'  => $pl['product_net_revenue'],
                              'coupon_amount'  => $pl['coupon_amount'],
                              'tax_amount'  => $pl['tax_amount'],
                              'shipping_amount'  => $pl['shipping_amount'],
                              'product_sku'      =>  $product_wise_info['sku'],
                              'product_min_price'      =>  $product_wise_info['min_price'],
                              'product_max_price'      =>  $product_wise_info['max_price']
                          ];

                                        
        }




     //     echo json_encode($product_data);
     // exit();


        $customer = $mysqli->query("SELECT * FROM wpew_wc_customer_lookup where customer_id ='".$ol['customer_id']."'");
        // Fetch all
        $customer_info = $customer->fetch_all(MYSQLI_ASSOC);


        if(count($customer_info) > 0){
          $customer_info = (object)$customer_info[0];
        }




        //Website Sync DATA GET in Table

        $cart = $mysqli->query("SELECT * FROM wpew_cartflows_ca_cart_abandonment WHERE email ='".$customer_info->email."'  LIMIT 1");
  
        $cart_list = $cart->fetch_all(MYSQLI_ASSOC);

        //print_r($cart_list);exit;

        $shipping_address = [];
        $billing_address  = [];

        $mobile = " ";  
        foreach($cart_list as $data){
         
      
          $cart_content = $data['cart_contents'];
          $other_feilds = $data['other_fields'];
  
          $cart_content_data = preg_replace_callback(
                                                        '/(?<=^|\{|;)s:(\d+):\"(.*?)\";(?=[asbdiO]\:\d|N;|\}|$)/s',
                                                        function($m){
                                                            return 's:' . strlen($m[2]) . ':"' . $m[2] . '";';
                                                        },
                                                        $cart_content
                                                  );

          $other_feilds_data = preg_replace_callback(
                                                      '/(?<=^|\{|;)s:(\d+):\"(.*?)\";(?=[asbdiO]\:\d|N;|\}|$)/s',
                                                      function($m){
                                                          return 's:' . strlen($m[2]) . ':"' . $m[2] . '";';
                                                      },
                                                      $other_feilds
                                                  );

  
          $cart_content = (object)(@unserialize($cart_content_data));
          $other_feilds = (object)(@unserialize($other_feilds_data));


      
         // print_r( $other_feilds);exit;
          $line_total = 0;      
                                          
          foreach($cart_content as $cc){
            
            $line = (object)$cc;
           
            $line_total =$line->line_subtotal; 
           
          }


          if($ol['net_total'] == $line_total){
            $mobile =$other_feilds->wcf_phone_number;
       
            //Getting BIlling Address Details
            $billing_address['cart_total']          = $line_total;
            $billing_address['billing_email']       = $data['email'];
            $billing_address['billing_company']     = $other_feilds->wcf_billing_company;
            $billing_address['billing_address_1']   = $other_feilds->wcf_billing_address_1;
            $billing_address['billing_address_2']   = $other_feilds->wcf_billing_address_2;
            $billing_address['billing_state']       = $other_feilds->wcf_billing_state;
            $billing_address['billing_postcode']    = $other_feilds->wcf_billing_postcode;
            $billing_address['order_comments']      = $other_feilds->wcf_order_comments;
  
  
      
            //Getting Shipping  Address Details
  
            $shipping_address['wcf_shipping_first_name'] = $other_feilds->wcf_shipping_first_name;
            $shipping_address['wcf_shipping_last_name']  = $other_feilds->wcf_shipping_last_name;
            $shipping_address['wcf_shipping_company']    = $other_feilds->wcf_shipping_company;
            $shipping_address['wcf_shipping_country']    = $other_feilds->wcf_shipping_country;
            $shipping_address['wcf_shipping_address_1']  = $other_feilds->wcf_shipping_address_1;
            $shipping_address['wcf_shipping_address_2']  = $other_feilds->wcf_shipping_address_2;
            $shipping_address['wcf_shipping_city']       = $other_feilds->wcf_shipping_city;
            $shipping_address['wcf_shipping_state']      = $other_feilds->wcf_shipping_state;
            $shipping_address['wcf_shipping_postcode']   = $other_feilds->wcf_shipping_postcode;
          }
        }
        $get_data[] = [
                        'order_id'           => $ol['order_id'],
                        'order_date'         => $ol['date_created'],
                        'total_sold_item'    => $ol['num_items_sold'],
                        'total_sales_amount' => $ol['total_sales'],
                        'tax_total'          => $ol['tax_total'],
                        'shipping_total'     => $ol['shipping_total'],
                        'net_total'          => $ol['net_total'],
                        'status'             => $ol['status'],
                        'customer_id'        => $ol['customer_id'],
                        'products_info'      => $product_data,
                        'customer_info'      => $customer_info,
                        'billing_address'    => $billing_address,
                        'shipping_address'   => $shipping_address,
                        'mobile'             => $mobile
                      ]; 

        $file_contents = str_replace("'",'',json_encode($customer_info));
         
        //  $response  = $this->db->query("SELECT * FROM AKS_WEB_SALE_LIST WHERE sync_id='".$data['ID']."'")->row();
        // if ($response) {   

        // }else{
          $sync = $this->db->query("INSERT INTO AKS_WEBSITE_SYNC(
                                                       ORDER_ID
                                                      ,ORDER_DATE
                                                      ,TOTAL_SOLD_ITEM
                                                      ,TOTAL_SALES_AMOUNT
                                                      ,TAX_TOTAL
                                                      ,SHIPPING_TOTAL
                                                      ,NET_TOTAL
                                                      ,CUSTOMER_ID
                                                      ,MOBILE
                                                      ,STATUS
                                                      ,PRODUCTS_INFO
                                                      ,CUSTOMER_INFO
                                                      ,BILLING_ADDRESS
                                                      ,SHIPPING_ADDRESS
                                                      ,CREATED_AT
                                                      ,UPDATED_AT


                                                    )

                                                    VALUES
                                                    (
                                                                '".$ol['order_id']."',
                                                                '".$ol['date_created']."',
                                                                '".$ol['num_items_sold']."',
                                                                '".$ol['total_sales']."',
                                                                '".$ol['tax_total']."',
                                                                '".$ol['shipping_total']."',
                                                                '".$ol['net_total']."',
                                                                '".$ol['customer_id']."',
                                                                '".$mobile."',
                                                                '".$ol['status']."',
                                                                N'".json_encode($product_data)."',
                                                                '".$file_contents."',
                                                                '".json_encode($billing_address)."',
                                                                '".json_encode($shipping_address)."',
                                                                '".date('Y-m-d h:m:s')."',
                                                                '".date('Y-m-d h:m:s')."'
                                                            
                                                    )");         
        
      }

       
      return $this->WebSaleList();
    }


    function request_num ($input, $pad_len = 3  , $prefix = null) {
      // if ($pad_len <= strlen($input))
      //     trigger_error('<strong>'.$pad_len.'</strong> cannot be less than or equal to the length of <strong>'.$input.'</strong> to generate sale number', E_USER_ERROR);
  
      if (is_string($prefix))
      
      return sprintf("%s%s", $prefix, str_pad($input, $pad_len, "0", STR_PAD_LEFT));
  
      return str_pad($input, $pad_len, "0", STR_PAD_LEFT);
  }


    public function WebSaleList(){

      $this->db->reconnect();
      
    

      $saledate=date('Y-m-d h:m:s');
      $delivery_mode = "courier";


      
      // 

      $last_sync_data  = $this->db->query("SELECT * FROM AKS_WEB_SALE_LIST ORDER BY wid DESC")->row();
      $last_sync_id = $last_sync_data ? $last_sync_data->sync_id : 1;

      $results = $this->db->query("SELECT  * FROM  AKS_WEBSITE_SYNC WHERE ID > '".$last_sync_id."' ")->result_array();

      // print_r($results); exit();

      foreach($results as $data){

        
        $last_wid_detail  = $this->db->query("SELECT * FROM AKS_WEB_SALE_LIST  ORDER BY wid DESC")->row();
        if($last_wid_detail){
        //  print_r($last_wid_detail);
          $last_data = $last_wid_detail->web_id;
          
          $year = substr( date("y"), -2);
          $slice = explode("/", $last_data);
          $result = preg_replace('/[^0-9]/',' ', $slice[0]); 
          
          
          $request = $this->request_num(((int)$result+1), 3, "WS-");
          
          $request_id =  $request.'/'.$year;

          $web_id = $request_id;
        }
        else{
              $year   = substr( date("y"), -2);
              $web_id =  'WS-001/'.$year;
        }

        

        //echo json_encode($data['order_date']);

        $customer = json_decode($data['CUSTOMER_INFO']);
     
        $party =  $customer?$customer->first_name.$customer->last_name:'';

        $response  = $this->db->query("SELECT * FROM AKS_WEB_SALE_LIST WHERE sync_id='".$data['ID']."'")->row();
        if ($response) {
          
        }else{
          // if ($response->sync_id!=$data['ID']) {
            $this->db->query("INSERT INTO AKS_WEB_SALE_LIST
              (
                date
                ,party
                ,mobile
                ,sale_prd_count
                ,delivery_mode
                ,sale_prd_tot_amt
                ,sale_dis_amt
                ,sale_net_amt
                ,sale_cash
                ,balance_cash
                ,create_by
                ,create_on
                ,status
                ,shipment_charges
                ,remarks
                ,convert_status
                ,products
                ,party_info
                ,shipping_address
                ,billing_address
                ,other_status
                ,sync_id
                ,web_id
              )
              VALUES
              (
               '".$data['ORDER_DATE']."',
               '".$party."',
               '".$data['MOBILE']."',
               '".$data['TOTAL_SOLD_ITEM']."',
               '".$delivery_mode."',
               '".$data['TOTAL_SALES_AMOUNT']."',
               '0',
               '".$data['NET_TOTAL']."',
               '".$data['TOTAL_SALES_AMOUNT']."',
               '0',
               '".'Admin'."',
               '".$data['ORDER_DATE']."',
               '".'W'."',
               '".$data['SHIPPING_TOTAL']."',
               '".''."',
               '0',
               '".$data['PRODUCTS_INFO']."',
               '".$data['CUSTOMER_INFO']."',
               '".$data['SHIPPING_ADDRESS']."',
               '".$data['BILLING_ADDRESS']."',
               '".$data['STATUS']."',
               '".$data['ID']."',
               '".$web_id."'

              )");
              save_query_in_log();            
          // }
        }
      }
      return  "1";


    }

    
}
 
?>