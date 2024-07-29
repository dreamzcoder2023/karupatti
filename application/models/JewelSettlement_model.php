
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/***************************************************************
    Purpose : To handle all the Loan Receipts database details 2022-11-01
****************************************************************/
class JewelSettlement_model extends CI_Model
{
  function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Calcutta'); 
    }

    public function get_jewel_list($data)
    {
        $this->db->reconnect(); 
        $result  = $this->db->query("SELECT TOP 30 * FROM JEWEL_SETTLEMENT WHERE SNO != '' AND ISSUE_DATE >='".$data['from_date']."' AND ISSUE_DATE <='".$data['to_date']."'" )->result_array();
        save_query_in_log();
        $this->db->close();


        return $result;
    }
    

}
?>                        