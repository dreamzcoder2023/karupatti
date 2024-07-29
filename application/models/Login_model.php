<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/***************************************************************
    Purpose : To handle all the Login database details 2022-08-18
****************************************************************/
class Login_model extends CI_Model
{
  function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Calcutta'); 
    }
 /* ************************************************************************************
                        Purpose : To handle Admin Login Function 2022-08-18
            **********************************************************************/

    // To get company details
    public function get_company_by_company_code($ccode)
    {
        $this->db->reconnect();
        $query  = $this->db->query("SELECT * FROM COMPANY WHERE LOGINCODE = '".$ccode."' AND ACTIVE = 'Y'");
        $result = $query->row();
        save_query_in_log();
        $this->db->close();
        return $result;

    }

   public function get_curr_fin_year()
   {
        $this->db->reconnect();
        $query  = $this->db->query("SELECT TOP 1 * FROM FIN_YEARS  ORDER BY ID DESC");
        $result = $query->row();
        save_query_in_log();
        $this->db->close();
        return $result;
   }
} // class end
