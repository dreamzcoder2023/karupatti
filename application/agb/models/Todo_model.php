<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*********************************************************************************
    Purpose : To handle all the TODO database details 2024-01-10 By Vasanth
**********************************************************************************/
class Todo_model extends CI_Model
{
  function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Calcutta'); 
    }


    public function todoincomplete_list()
    {
        $this->db->reconnect();
        $firstDayOfMonth = date('Y-m-01');
        $lastDayOfMonth  = date('Y-m-t');
        $currentDateTime = date('Y-m-d H:i:s');

        $result = $this->db->query("SELECT * FROM todo WHERE status='1' AND created_on >= '$firstDayOfMonth' AND created_on <= '$lastDayOfMonth' AND date < '$currentDateTime' ORDER BY position_order ASC")->result_array();


        save_query_in_log();
        $this->db->close();
        return $result;
    }
    public function todocomplete_list()
    {
        $this->db->reconnect();
         $firstDayOfMonth = date('Y-m-01');
        $lastDayOfMonth = date('Y-m-t');
        $result = $this->db->query("SELECT * FROM todo WHERE status='0' AND created_on >= '$firstDayOfMonth' AND created_on <= '$lastDayOfMonth' ORDER BY position_order ASC")->result_array();
        
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
        $result  = $this->db->query("SELECT * FROM todo WHERE todoid='".$id."' ")->result_array();
        save_query_in_log();
        $this->db->close();
        return $result;
    }
    

    public function addtodo($data)
    {
        $this->db->reconnect();
        $result = $this->db->query("
                                    INSERT INTO todo (
                                        date,
                                        type,
                                        description,
                                        allocatedto,
                                        selfid,
                                        status,
                                        created_on,
                                        created_by
                                    )
                                    VALUES (
                                        '".$data['todo_date']."',
                                        '".$data['todo_type']."',
                                        '".$data['tododesc']."',
                                        '".json_encode($data['allocatedto'])."',
                                        '".$_SESSION['USERID']."',
                                        '".$data['status']."',
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
        $result  = $this->db->query("SELECT * FROM todo WHERE todoid='".$id."' ")->row();
        save_query_in_log();
        $this->db->close();
        return $result;
    }

     public function updatetodo($data)
    {
        $this->db->reconnect();
        $result = $this->db->query("
                                    UPDATE todo
                                    SET
                                        date = '".$data['todo_date']."',
                                        type   = '".$data['todo_type']."',
                                        description = '".$data['tododesc']."',
                                        remark = '".$data['todoremark']."',
                                        allocatedto = '".json_encode($data['allocatedto'])."',
                                        selfid = '".$_SESSION['USERID']."',
                                        modified_on      = '".$data['modified_on']."',
                                        modified_by      = '".$data['modified_by']."' 
                                    WHERE
                                        todoid   = '".$data['edit_id']."'
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