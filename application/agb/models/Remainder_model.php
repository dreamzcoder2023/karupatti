<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/***************************************************************************************
    Purpose : To handle all the Remainder_model database details 2024-02-03 By Vasanth
****************************************************************************************/
class Remainder_model extends CI_Model
{
  function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Calcutta'); 
    }


    public function list()
    {
        $this->db->reconnect();
        $firstDayOfMonth = date('Y-m-01');
        $lastDayOfMonth = date('Y-m-t');
        $result = $this->db->query("SELECT * FROM REMAINDER WHERE status<='1' AND created_on >= '$firstDayOfMonth' AND created_on <= '$lastDayOfMonth' ORDER BY remainderid DESC")->result_array();

        save_query_in_log();
        $this->db->close();
        return $result;
    }
    public function todocomplete_list()
    {
        $this->db->reconnect();
         $firstDayOfMonth = date('Y-m-01');
        $lastDayOfMonth = date('Y-m-t');
        $result = $this->db->query("SELECT * FROM REMAINDER WHERE status='0' AND created_on >= '$firstDayOfMonth' AND created_on <= '$lastDayOfMonth' ORDER BY remainderid ASC")->result_array();
        
        save_query_in_log();
        $this->db->close();
        return $result;
    }

    public function get_user_list()
    {
        $this->db->reconnect();
        $result  = $this->db->query("SELECT * FROM STAFFS WHERE Status='Y' ORDER BY STAFFNAME ASC ")->result_array();
        save_query_in_log();
        $this->db->close();
        return $result;
    }

    public function viewdata($id)
    {
        $this->db->reconnect();
        $result  = $this->db->query("SELECT * FROM REMAINDER WHERE remainderid='".$id."' ")->result_array();
        save_query_in_log();
        $this->db->close();
        return $result;
    }
   

    public function addremainder($data)
    {
        $this->db->reconnect();
        $result = $this->db->query("
                                        INSERT INTO REMAINDER (
                                                            date
                                                           ,type
                                                           ,selfid
                                                           ,allocatedto
                                                           ,Recurringtype
                                                           ,daily
                                                           ,week
                                                           ,weekdays
                                                           ,month
                                                           ,specificday
                                                           ,description
                                                           ,status
                                                           ,created_on
                                                           ,created_by
                                                           )
                                                            VALUES
                                                           (

                                                            '".date("Y-m-d",strtotime($data['date']))."', 
                                                            '".$data['type']."', 
                                                            '".$data['selfid']."', 
                                                            '".json_encode($data['allocatedto'])."', 
                                                            '".$data['Recurringtype']."', 
                                                            '".$data['daily']."', 
                                                            '".$data['week']."', 
                                                            '".json_encode($data['weekdays'])."', 
                                                            '".$data['month']."', 
                                                            '".$data['specificday']."', 
                                                            '".$data['description']."', 
                                                            '1',
                                                            '".$data['created_on']."', 
                                                            '".$data['created_by']."'
                                                           )
                                  ");
        save_query_in_log();
        $this->db->close();
        return $result;
    }


    

    public function editdata($id)
    {
        $this->db->reconnect();
        $result  = $this->db->query("SELECT * FROM REMAINDER WHERE remainderid='".$id."' ")->row();
        save_query_in_log();
        $this->db->close();
        return $result;
    }

     public function updateremainder($data)
    {
        $this->db->reconnect();
        $result = $this->db->query("
                                    UPDATE REMAINDER
                                    SET
                                        date          = '".date("Y-m-d",strtotime($data['date']))."',
                                        type          = '".$data['type']."',
                                        description   = '".$data['description']."',
                                        selfid        = '".$data['selfid']."',
                                        allocatedto   = '".json_encode($data['allocatedto'])."',
                                        Recurringtype = '".$data['Recurringtype']."',
                                        daily         = '".$data['daily']."',
                                        week          = '".$data['week']."',
                                        month         = '".$data['month']."',
                                        specificday   = '".$data['specificday']."',
                                        weekdays      = '".json_encode($data['weekdays'])."',
                                        modified_on   = '".$data['modified_on']."',
                                        modified_by   = '".$data['modified_by']."' 
                                    WHERE
                                        remainderid   = '".$data['edit_id']."'
                                ");
        save_query_in_log();
        $this->db->close();
        return $result;
    }

    // To delete announcement
    public function delete($uid)
    {
        $this->db->reconnect();
        $result  = $this->db->query("UPDATE announcement SET STATUS = 'D' WHERE SNO = '".$uid."'");
        save_query_in_log();
        $this->db->close();
        return $result;
    } 


    


}
?>                        