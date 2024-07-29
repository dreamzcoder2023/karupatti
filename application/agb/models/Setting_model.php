<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/***************************************************************
    Purpose : To handle all the settings database details
****************************************************************/
class Setting_model extends CI_Model
{
	function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Calcutta'); 
    }
    public function general_setting_details()
    {
    	$qry = $this->db->query("SELECT * FROM general_settings")->row();
    	save_query_in_log();
		return $qry;
    }

	public function  general_setting_update($gen_settings, $id)
	{
		// echo "UPDATE general_settings SET title='".$gen_settings['title']."',logo='".$gen_settings['logo']."',favicon='".$gen_settings['favicon']."',timezone='".$gen_settings['time_zone']."',date_format='".$gen_settings['date_format']."',modified_on='".$gen_settings['modified_on']."',modified_by='".$gen_settings['modified_by']."' WHERE gen_set_id='".$id."'";
		// exit;
		$result = $this->db->query("UPDATE general_settings SET title='".$gen_settings['title']."',logo='".$gen_settings['logo']."',favicon='".$gen_settings['favicon']."',timezone='".$gen_settings['time_zone']."',date_format='".$gen_settings['date_format']."',modified_on='".$gen_settings['modified_on']."',modified_by='".$gen_settings['modified_by']."' WHERE gen_set_id='".$id."'");
		save_query_in_log();
		return $result;
	}

	public function sms_setting_details()
    {
        $qry = $this->db->query("SELECT * FROM general_settings")->row();
        save_query_in_log();
        return $qry;
    }

    public function sms_update($gen_settings, $id)
    {
        $result = $this->db->query("UPDATE general_settings SET appkey='".$gen_settings['appkey']."',senderid='".$gen_settings['senderid']."',modified_on='".$gen_settings['modified_on']."',modified_by='".$gen_settings['modified_by']."' WHERE gen_set_id='".$id."'");
        save_query_in_log();
        return $result;
    }
    public function email_setting_details()
    {
        $qry = $this->db->query("SELECT * FROM general_settings")->row();
        save_query_in_log();
        return $qry;
    }
    public function email_update($gen_settings, $id)
    {
        $result = $this->db->query("UPDATE general_settings SET hostname='".$gen_settings['hostname']."',username='".$gen_settings['username']."',password='".$gen_settings['password']."',modified_on='".$gen_settings['modified_on']."',modified_by='".$gen_settings['modified_by']."' WHERE gen_set_id='".$id."'");
        save_query_in_log();
        return $result;
    }
    public function whatsapp_setting_details()
    {
        $qry = $this->db->query("SELECT * FROM general_settings")->row();
        save_query_in_log();
        return $qry;
    }
    public function whatsapp_update($gen_settings, $id)
    {
        $result = $this->db->query("UPDATE general_settings SET whatsappkey='".$gen_settings['whatsappkey']."',whatssenderid='".$gen_settings['whatsappsenderid']."',modified_on='".$gen_settings['modified_on']."',modified_by='".$gen_settings['modified_by']."' WHERE gen_set_id='".$id."'");
        save_query_in_log();
        return $result;
    }
    public function mobileapp_setting_details()
    {
        $qry = $this->db->query("SELECT * FROM general_settings")->row();
        save_query_in_log();
        return $qry;
    }
    public function mobileapp_update($gen_settings, $id)
    {
        $result = $this->db->query("UPDATE general_settings SET mobileappkey='".$gen_settings['mobileappkey']."',mobilesenderid='".$gen_settings['mobilesenderid']."',modified_on='".$gen_settings['modified_on']."',modified_by='".$gen_settings['modified_by']."' WHERE gen_set_id='".$id."'");
        save_query_in_log();
        return $result;
    }
    public function loandays_setting_details()
    {
        $qry = $this->db->query("SELECT * FROM loan_settings")->row();
        save_query_in_log();
        return $qry;
    }
    public function loandays_update($gen_settings, $id)
    {
        $result = $this->db->query("UPDATE loan_settings SET MIN_INT_DAYS='".$gen_settings['MIN_INT_DAYS']."',MIN_CALC_DAYS='".$gen_settings['MIN_CALC_DAYS']."',GRACE_DAYS='".$gen_settings['GRACE_DAYS']."' WHERE SNO='".$id."'");
        save_query_in_log();
        return $result;
    }



    



}
?>