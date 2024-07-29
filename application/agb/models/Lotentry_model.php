<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/***************************************************************
    Purpose : To handle all the Lotentry database details 2022-08-18
****************************************************************/
class Lotentry_model extends CI_Model
{
    public $other_db;
  function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Calcutta'); 
    }
 /* ************************************************************************************
                        Purpose : To handle Admin Lotentry Function 2022-08-18
            **********************************************************************/

    // To get Lotentry details
    public function get_Lotentry_list()
    {
        $this->db->reconnect();
        $result  = $this->db->query("SELECT * FROM lot_entry WHERE status='Y'  ")->result_array();
        save_query_in_log();
        $this->db->close();
        return $result;
    }
    public function get_supplier_name_list()
    {
        $this->other_db->reconnect();
        $result  = $this->other_db->query("SELECT * FROM ACC_LEDGERS WHERE GROUP_NAME='SUPPLIERS' ORDER BY LEDGER_NAME;")->result_array();
        save_query_in_log();
        $this->other_db->close();

        //print_r($result);exit();
        return $result;
    }
    public function get_banks_list()
    {
        $this->db->reconnect();
        $result  = $this->db->query("SELECT * FROM BANKS")->result_array();
        save_query_in_log();
        $this->db->close();
        return $result;
    }

    
    public function get_item_list()
    {
        $this->db->reconnect();
        $result  = $this->db->query("SELECT ITEMNAME FROM ITEMS")->result_array();
        save_query_in_log();
        $this->db->close();

        //print_r($result);exit();
        return $result;
    }
    public function get_sub_item_list()
    {
        $this->db->reconnect();
        $result  = $this->db->query("SELECT SUBITEM_NAME FROM SUBITEM_LIST")->result_array();
        save_query_in_log();
        $this->db->close();

        //print_r($result);exit();
        return $result;
    }
    

    public function add_lotentry_master($data)
    {
        $this->db->reconnect();
        //print_r($data);exit();
        $res = $this->db->query("INSERT INTO lot_entry (
            supplier,
            lot_date,
            company_id,
            metal_type,
            item_count,
            item_weight,
            pure_metal_weight,
            pure_metal_rate,
            amount,
            charges,
            amount_to_pay,
            cash,
cheque_amt,
cheque_bank,
cheque_number,
rtgs_amt,
rtgs_bank,
rtgs_number,
metal,
metal_amount,
metal_purity,
metal_weight,
cash_detail,
cheque_detail,
rtgs_detail,
            paid_amount,
            balance_amount,
            lot_no,
            img,
            created_on,
            created_by,
            status
            ) VALUES(
            '".$data['supplier_name']."',
            '".date('Y-m-d',strtotime($data['date']))."',
            '".$data['company_id']."',
            '".$data['metal_type']."',
           '".$data['all_count']."',
            '".$data['all_weight']."',
            '".$data['pure_metal_weight1']."',
            '".$data['pure_metal_rate1']."',
            '".$data['t_amount']."',
             '".$data['other_charges']."',
           '".$data['amount_pay']."',
            '".$data['cash_pay']."',
            '".$data['cheq_pay']."',
            '".$data['bank_cheq']."',
            '".$data['cheq_no']."',
            '".$data['rtgs_pay']."',
            '".$data['bank_rtgs']."',
            '".$data['rtgs_trans']."',
            '".$data['metal']."',
            '".$data['metal_pay']."',
            '".$data['purity_pay']."',
            '".$data['met_wgt']."',
            '".$data['cash_detail']."',
            '".$data['cheque_detail']."',
            '".$data['rtgs_detail']."',
            
            '".$data['paid_amount_pay']."',
            '".$data['bal_amount']."',
            '".$data['lot_no']."',
            '".$data['lot_no1']."',
            '".$data['created_on']."',
            '".$data['added_user']."',
            '".$data['status']."')");
        save_query_in_log();
        $this->db->close(); 

        return $res;
    }

        // To add new Lotentry
        public function add_lotentry($data)
        {  
            $this->db->reconnect(); 
           $i=0; 
           foreach ($data['item_name'] as $key => $value) {
               
            $last_sno_detail = $this->db->query("SELECT * FROM PURCHASE_ENTRY ORDER BY SNO DESC")->row();
      
            $last_data= $last_sno_detail->SNO;
            //echo $last_data;exit;
            //$exlno = substr($last_data,5);
            $next_value = (int)$last_data + 1;
            $uid=str_pad($next_value,3,0,STR_PAD_LEFT);
            //$s_no=$r_no1;
            $data['pur_id'] = $uid;
            //print_r($data);exit;
                
    
                $result  = $this->db->query("INSERT INTO PURCHASE_ENTRY (SNO,
                ITEM_NAME,
                SUBITEM_NAME,
                METAL_TYPE,
                COUNT,
                PURITY,
                WEIGHT,
                ENTRY_DATE,
                CREATED_ON,
                CREATED_BY,
                STATUS,
                LOT_ID
                ) VALUES('".$data['pur_id']."',
                '".$value."',
                '".$data['subitem_name'][$i]."',
                '".$data['metal_table']."',
                '".$data['count_table'][$i]."',
                '".$data['purity_table'][$i]."',
                '".$data['weight_table'][$i]."',
                '".$data['entry_date']."',
                '".$data['created_on']."',
                '".$data['added_user']."',
                '".$data['status']."',
                '".$data['lot_id']."')");
            //print_r($result);exit();  
            save_query_in_log();
           
            $i++;
    
           }
               $this->db->close(); 
              return $result;
    
            //$emptyRemoved = remove_empty($data['item_name']);
    
            
        }
        public function get_last_sno_details()
        {
            $this->db->reconnect();
            // $result  = $this->db->query("SELECT TOP 1 * FROM PRODUCTS ORDER BY ITEM_SNO DESC")->row();
            $result  = $this->db->query("SELECT * FROM lot_entry ORDER BY lot_id DESC")->row();
            save_query_in_log();
            $this->db->close(); 
            return $result;
        }
    

} // class end
