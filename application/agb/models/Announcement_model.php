<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*********************************************************************************
    Purpose : To handle all the Item database details 2024-01-10 By Vasanth
**********************************************************************************/
class Announcement_model extends CI_Model
{
  function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Calcutta'); 
    }


    public function list()
    {
        $this->db->reconnect();
        $result  = $this->db->query("SELECT * FROM announcement WHERE status!='2' ORDER BY id DESC ")->result_array();
        save_query_in_log();
        $this->db->close();
        return $result;
    }
    public function Show()
    {
        $this->db->reconnect();
        $currentdate  = date('Y-m-d');
        $result  = $this->db->query("SELECT * FROM announcement WHERE  status='1' AND startdate = '$currentdate' ORDER BY startdate ASC ")->result_array();
        $result  = $this->db->query("SELECT *
                                    FROM announcement
                                    WHERE startdate = CONVERT(date, GETDATE()) AND status='1' ORDER BY startdate ASC  ")->result_array();



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

    public function announce_active_status($data,$id)
    {
        $this->db->reconnect();
        $result = $this->db->query("UPDATE announcement SET status = '".$data['status']."' WHERE id = '".$id."'");
        save_query_in_log();
        $this->db->close();
        return $result;
    }

    public function last_announce_id()
    {
        $this->db->reconnect();
        $result  = $this->db->query("SELECT * FROM announcement ORDER BY id DESC ")->row();
        save_query_in_log();
        $this->db->close();
        return $result;
    }

    public function add($data)
    {
        $this->db->reconnect();
        $result = $this->db->query("
                                        INSERT INTO announcement (
                                            startdate,
                                            enddate,
                                            announcement,
                                            userid,
                                            status,
                                            created_on,
                                            created_by
                                        )
                                        VALUES (
                                            '".$data['statedate']."',
                                            '".$data['enddate']."',
                                            N'".$data['announcement']."',
                                            '".json_encode($data['userid'])."',
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
        $result  = $this->db->query("SELECT * FROM announcement WHERE id='".$id."' ")->row();
        save_query_in_log();
        $this->db->close();
        return $result;
    }

     public function update($data)
    {
        $this->db->reconnect();
        $result = $this->db->query("
                                    UPDATE announcement
                                    SET
                                        startdate        = '".$data['statedate']."',
                                        enddate          = '".$data['enddate']."',
                                        announcement     =  N'".$data['announcement']."',
                                        userid           = '".json_encode($data['userid'])."',
                                        modified_on      = '".$data['modified_on']."',
                                        modified_by      = '".$data['modified_by']."' 
                                    WHERE
                                        id               = '".$data['announcementid']."'
                                ");
        save_query_in_log();
        $this->db->close();
        return $result;
    }

    // To delete announcement
    public function announcement_delete($uid)
    {
        $this->db->reconnect();
        $result  = $this->db->query("UPDATE announcement SET STATUS = 'D' WHERE SNO = '".$uid."'");
        save_query_in_log();
        $this->db->close();
        return $result;
    } 


    


}
?>                        