<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/***************************************************************
    Purpose : To handle all the User database details 2022-08-18
****************************************************************/
class User_model extends CI_Model
{
  function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Calcutta'); 
    }
 /* ************************************************************************************
                        Purpose : To handle Admin User Function 2022-08-18
            **********************************************************************/

    // To get user details
    public function get_user_list()
    {
        $this->db->reconnect();
        $query  = $this->db->query("SELECT * FROM USERLIST");
        $result = $query->result_array();
        save_query_in_log();
        $this->db->close();
        return $result;

    }

} // class end
