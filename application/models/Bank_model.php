	<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/***************************************************************
    Purpose : To handle all the bank database details
****************************************************************/
class Bank_model extends CI_Model
{
	function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Calcutta'); 
    }

	public function get_bank_list()
	{
		$result = $this->db->query("SELECT * FROM BANKS ")->result_array();
		save_query_in_log();
		return $result;
	}	
	 // To get bank details by bank id
    public function get_bank_by_bank_id($cid)
    {
        $this->db->reconnect();
        $result  = $this->db->query("SELECT * FROM BANKS WHERE SNO = '".$cid."'")->row();
        save_query_in_log();
        $this->db->close();
        return $result;
    }
	
	public function bank_save($data)
	{
		$result = $this->db->query("INSERT INTO BANKS(SNO, BANKNAME, BRANCH, IFSC, COMPANYCODE, ADDRESS, ACCOUNTNO, PERSONNAME) VALUES ('".$data['bank_id']."','".$data['bank_name']."','".$data['branch_name']."','".$data['ifsc']."','".$data['company']."','".$data['address']."','".$data['acc_no']."','".$data['name']."')");
		
		save_query_in_log();
		return $result;
	}

	public function get_bank_by_id($sid)
	{
		$result = $this->db->query("SELECT * FROM BANKS WHERE SNO='".$sid."'")->row();
		save_query_in_log();
		return $result;
	}

	public function bank_update($data)
	{
		$result = $this->db->query("UPDATE BANKS SET BANKNAME='".$data['bank_name']."',BRANCH='".$data['branch_name']."',IFSC='".$data['ifsc']."',COMPANYCODE='".$data['company']."',ADDRESS='".$data['address']."',ACCOUNTNO='".$data['acc_no']."',PERSONNAME='".$data['name']."' where SNO='".$data['bank_id']."'");
		save_query_in_log();
		return $result;
	}
	// To delete department
    public function bank_delete($uid)
    {
        $this->db->reconnect();
        $result  = $this->db->query("UPDATE BANKS SET ACTIVE = 'N' WHERE SNO = '".$uid."'");
        save_query_in_log();
        $this->db->close();
        return $result;
    }
    public function bank_active($data, $id)
	{
		$this->db->reconnect();
		$result = $this->db->query("UPDATE BANKS SET ACTIVE = '".$data['status']."' WHERE SNO = '".$id."'");

		save_query_in_log();
        $this->db->close();
		return $result;
	}
	// To get department unique
    public function bank_unique($val)
    {   
        $this->db->reconnect();
        $result  = $this->db->query("SELECT * FROM BANKS WHERE BANKNAME = '".$val."' ")->row();
        save_query_in_log();
        $this->db->close();
        return $result;
    }
}
?>