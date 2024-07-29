<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/***************************************************************
    Purpose : To handle all the Chit database details 2022-08-18
****************************************************************/
class Mcard_point_model extends CI_Model
{
    public $other_db;
  function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Calcutta'); 
    }
 /* ************************************************************************************
                        Purpose : To handle Admin Chit Function 2022-08-18
            **********************************************************************/
        public function membership_point()
        {
            $this->db->reconnect();
            $result  = $this->db->query("SELECT * FROM MEMBERSHIP_POINTS_UPDATE")->result_array();
            save_query_in_log();
            $this->db->close(); 
            return $result;

        }
        public function membership_points_update($data)
        {
            $date_time = date("Y-m-d h:i:s");
            $this->db->reconnect();
            // print_r("UPDATE CHIT_INTEREST_UPDATE SET
            // FROM_AMOUNT = '".$data['from_amount']."',
            // TILL_AMOUNT = '".$data['till_amount']."' ,
            // PERCENTAGE = '".$data['percentage']."' , 
            // CREATED_BY = 'Roshan' , 
            // CREATED_ON = '".$date_time."' , 
            // MODIFIED_BY = 'Roshan' ,
            // MODIFIED_ON = '".$date_time."' 
            // WHERE ID = '".$data['sno']."' ");exit;
            foreach($data['sno'] as $key=>$sno){
                $result  = $this->db->query("UPDATE MEMBERSHIP_POINTS_UPDATE SET
                TYPE = '".$data['type'][$key]."',
                FOR_AMOUNT = '".$data['for_amount'][$key]."' ,
                POINTS = '".$data['points'][$key]."' , 
                CREATED_BY = 'Roshan' , 
                CREATED_ON = '".$date_time."' , 
                MODIFIED_BY = 'Roshan' ,
                MODIFIED_ON = '".$date_time."' 
                WHERE ID = '".$sno."' ");
        
                save_query_in_log();
                
            }
            
            $this->db->close(); 
            return $result;
        
        }
}