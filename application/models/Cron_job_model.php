<?php if ( ! defined( 'BASEPATH' ) ) exit( 'No direct script access allowed' );
/***************************************************************
Purpose : To handle all the Cron_job_model database details 2022-08-22
****************************************************************/

class Cron_job_model extends CI_Model
 {
    // public $other_db;

    function __construct()
 {
        parent::__construct();
        date_default_timezone_set( 'Asia/Calcutta' );

        // $config_app = webside_db_connect();

        // $this->other_db = $this->load->database( $config_app, TRUE );

    }

 public function cron_job()
{
    // Connect to WooCommerce database
    $woocommerce_db_config = array(
        'dsn'   => '',
        'hostname' => 'ayyanarkaruppati.com:3306',
        'username' => 'ayyanark_wp214',
        'password' => 'Indian@1984',
        'database' => 'ayyanark_wp214',
        'dbdriver' => 'mysqli',
        'dbprefix' => '',
        'pconnect' => FALSE,
        'db_debug' => (ENVIRONMENT !== 'production'),
        'cache_on' => FALSE,
        'cachedir' => '',
        'char_set' => 'utf8',
        'dbcollat' => 'utf8_general_ci',
        'swap_pre' => '',
        'encrypt' => FALSE,
        'compress' => FALSE,
        'stricton' => FALSE,
        'failover' => array(),
        'save_queries' => TRUE
    );

    $woocommerce_db = $this->load->database($woocommerce_db_config, TRUE);

    // Get the last synced order ID
    $last_order = $this->db->order_by('ORDER_ID', 'DESC')->get('AKS_WEBSITE_SYNC')->row();
    $last_order_id = $last_order ? $last_order->ORDER_ID : 1;

    // Query WooCommerce database for new orders
    $orders_query = "
        SELECT *
        FROM wpew_wc_order_stats
        WHERE status != 'wc-pending' AND order_id > ?
        GROUP BY order_id
        ORDER BY order_id DESC
        LIMIT 50
    ";
    $orders = $woocommerce_db->query($orders_query, array($last_order_id))->result_array();

    $get_data = [];

    foreach ($orders as $ol) {
        // Query WooCommerce database for products in each order
        $products_query = "
            SELECT *
            FROM wpew_wc_order_product_lookup
            WHERE order_id = ?
        ";
        $products = $woocommerce_db->query($products_query, array($ol['order_id']))->result_array();

        $product_data = [];

        foreach ($products as $pl) {
            // Query WooCommerce database for product details
            $product_name_query = "
                SELECT *
                FROM wpew_woocommerce_order_items
                WHERE order_item_id = ?
            ";
            $product_name = $woocommerce_db->query($product_name_query, array($pl['order_item_id']))->row_array();

            // Query WooCommerce database for product weight
            $weight_query = "
                SELECT *
                FROM wpew_woocommerce_order_itemmeta
                WHERE order_item_id = ? AND meta_key = 'weight'
            ";
            $weight_list = $woocommerce_db->query($weight_query, array($pl['order_item_id']))->row_array();
            $total_weight = $weight_list ? $weight_list['meta_value'] : 0;

            // Query WooCommerce database for product metadata
            $product_meta_query = "
                SELECT *
                FROM wpew_wc_product_meta_lookup
                WHERE product_id = ?
            ";
            $product_meta = $woocommerce_db->query($product_meta_query, array($pl['product_id']))->row_array();

            $product_data[] = (object)[
                'order_item_id' => $pl['order_item_id'],
                'product_id' => $pl['product_id'],
                'product_weight' => $total_weight,
                'product_name' => $product_name ? $product_name['order_item_name'] : '-',
                'product_quantity' => $pl['product_qty'],
                'product_net_revenue' => $pl['product_net_revenue'],
                'product_amount' => $pl['product_net_revenue'],
                'coupon_amount' => $pl['coupon_amount'],
                'tax_amount' => $pl['tax_amount'],
                'shipping_amount' => $pl['shipping_amount'],
                'product_sku' => $product_meta['sku'],
                'product_min_price' => $product_meta['min_price'],
                'product_max_price' => $product_meta['max_price']
            ];
        }

        // Query WooCommerce database for customer details
        $customer_query = "
            SELECT *
            FROM wpew_wc_customer_lookup
            WHERE customer_id = ?
        ";
        $customer_info = $woocommerce_db->query($customer_query, array($ol['customer_id']))->row_object();

        // Query WooCommerce database for cart abandonment details
        $cart_query = "
            SELECT *
            FROM wpew_cartflows_ca_cart_abandonment
            WHERE email = ?
            LIMIT 1
        ";
        $cart_list = $woocommerce_db->query($cart_query, array($customer_info->email))->row_array();

        $shipping_address = [];
        $billing_address = [];
        $mobile = '';

        if ($cart_list) {
            $cart_content = unserialize($cart_list['cart_contents']);
            $other_fields = unserialize($cart_list['other_fields']);

            $billing_address = [
                'cart_total' => $cart_list['cart_total'],
                'billing_email' => $cart_list['email'],
                'billing_company' => $other_fields['wcf_billing_company'],
                'billing_address_1' => $other_fields['wcf_billing_address_1'],
                'billing_address_2' => $other_fields['wcf_billing_address_2'],
                'billing_state' => $other_fields['wcf_billing_state'],
                'billing_postcode' => $other_fields['wcf_billing_postcode'],
                'order_comments' => $other_fields['wcf_order_comments']
            ];

            $shipping_address = [
                'wcf_shipping_first_name' => $other_fields['wcf_shipping_first_name'],
                'wcf_shipping_last_name' => $other_fields['wcf_shipping_last_name'],
                'wcf_shipping_company' => $other_fields['wcf_shipping_company'],
                'wcf_shipping_country' => $other_fields['wcf_shipping_country'],
                'wcf_shipping_address_1' => $other_fields['wcf_shipping_address_1'],
                'wcf_shipping_address_2' => $other_fields['wcf_shipping_address_2'],
                'wcf_shipping_city' => $other_fields['wcf_shipping_city'],
                'wcf_shipping_state' => $other_fields['wcf_shipping_state'],
                'wcf_shipping_postcode' => $other_fields['wcf_shipping_postcode']
            ];

            $mobile = $other_fields['wcf_phone_number'];
        }

        $get_data[] = [
            'order_id' => $ol['order_id'],
            'order_date' => $ol['date_created'],
            'total_sold_item' => $ol['num_items_sold'],
            'total_sales_amount' => $ol['total_sales'],
            'tax_total' => $ol['tax_total'],
            'shipping_total' => $ol['shipping_total'],
            'net_total' => $ol['net_total'],
            'status' => $ol['status'],
            'customer_id' => $ol['customer_id'],
            'products_info' => $product_data,
            'customer_info' => $customer_info,
            'billing_address' => $billing_address,
            'shipping_address' => $shipping_address,
            'mobile' => $mobile
        ];

        // Insert data into local database
        $this->db->insert('AKS_WEBSITE_SYNC', [
            'ORDER_ID' => $ol['order_id'],
            'ORDER_DATE' => $ol['date_created'],
            'TOTAL_SOLD_ITEM' => $ol['num_items_sold'],
            'TOTAL_SALES_AMOUNT' => $ol['total_sales'],
            'TAX_TOTAL' => $ol['tax_total'],
            'SHIPPING_TOTAL' => $ol['shipping_total'],
            'NET_TOTAL' => $ol['net_total'],
            'CUSTOMER_ID' => $ol['customer_id'],
            'MOBILE' => $mobile,
            'STATUS' => $ol['status'],
            'PRODUCTS_INFO' => json_encode($product_data, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE),
            'CUSTOMER_INFO' => json_encode($customer_info, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE),
            'BILLING_ADDRESS' => json_encode($billing_address, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE),
            'SHIPPING_ADDRESS' => json_encode($shipping_address, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE),
            'CREATED_AT' => date('Y-m-d H:i:s'),
            'UPDATED_AT' => date('Y-m-d H:i:s')
        ]);
    }

    return $this->WebSaleList(); // Assuming WebSaleList() is a method to display or process the synced data
}




    function request_num ( $input, $pad_len = 3, $prefix = null ) {
        // if ( $pad_len <= strlen( $input ) )
        //     trigger_error( '<strong>'.$pad_len.'</strong> cannot be less than or equal to the length of <strong>'.$input.'</strong> to generate sale number', E_USER_ERROR );

        if ( is_string( $prefix ) )

        return sprintf( '%s%s', $prefix, str_pad( $input, $pad_len, '0', STR_PAD_LEFT ) );

        return str_pad( $input, $pad_len, '0', STR_PAD_LEFT );
    }

    public function WebSaleList() {

        $this->db->reconnect();

        $saledate = date( 'Y-m-d h:m:s' );
        $delivery_mode = 'courier';

        //

        $last_sync_data  = $this->db->query( 'SELECT * FROM AKS_WEB_SALE_LIST ORDER BY wid DESC' )->row();
        $last_sync_id = $last_sync_data ? $last_sync_data->sync_id : 1;

        $results = $this->db->query( "SELECT  * FROM  AKS_WEBSITE_SYNC WHERE ID > '".$last_sync_id."' " )->result_array();

        // print_r( $results );
        // exit();

        foreach ( $results as $data ) {

            $last_wid_detail  = $this->db->query( 'SELECT * FROM AKS_WEB_SALE_LIST  ORDER BY wid DESC' )->row();
            if ( $last_wid_detail ) {
                //  print_r( $last_wid_detail );
                $last_data = $last_wid_detail->web_id;

                $year = substr( date( 'y' ), -2 );
                $slice = explode( '/', $last_data );
                $result = preg_replace( '/[^0-9]/', ' ', $slice[ 0 ] );

                $request = $this->request_num( ( ( int )$result+1 ), 3, 'WS-' );

                $request_id =  $request.'/'.$year;

                $web_id = $request_id;
            } else {
                $year   = substr( date( 'y' ), -2 );
                $web_id =  'WS-001/'.$year;
            }

            //echo json_encode( $data[ 'order_date' ] );

            $customer = json_decode( $data[ 'CUSTOMER_INFO' ] );

            $party =  $customer?$customer->first_name.$customer->last_name:'';

            $response  = $this->db->query( "SELECT * FROM AKS_WEB_SALE_LIST WHERE sync_id='".$data[ 'ID' ]."'" )->row();
            if ( $response ) {

            } else {
                // if ( $response->sync_id != $data[ 'ID' ] ) {
                $this->db->query( "INSERT INTO AKS_WEB_SALE_LIST
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
               '".$data[ 'ORDER_DATE' ]."',
               '".$party."',
               '".$data[ 'MOBILE' ]."',
               '".$data[ 'TOTAL_SOLD_ITEM' ]."',
               '".$delivery_mode."',
               '".$data[ 'TOTAL_SALES_AMOUNT' ]."',
               '0',
               '".$data[ 'NET_TOTAL' ]."',
               '".$data[ 'TOTAL_SALES_AMOUNT' ]."',
               '0',
               '".'Admin'."',
               '".$data[ 'ORDER_DATE' ]."',
               '".'W'."',
               '".$data[ 'SHIPPING_TOTAL' ]."',
               '".''."',
               '0',
               '".$data[ 'PRODUCTS_INFO' ]."',
               '".$data[ 'CUSTOMER_INFO' ]."',
               '".$data[ 'SHIPPING_ADDRESS' ]."',
               '".$data[ 'BILLING_ADDRESS' ]."',
               '".$data[ 'STATUS' ]."',
               '".$data[ 'ID' ]."',
               '".$web_id."'

              )" );
                save_query_in_log();

                // }
            }
        }
        return  '1';

    }

}

?>