	<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/***************************************************************
    Purpose : To handle all the company database details
****************************************************************/
class Company_model extends CI_Model
{
	function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Calcutta'); 
    }

	public function get_company_list()
	{
		$result = $this->db->query("SELECT * FROM COMPANY WHERE ACTIVE!='D' ORDER BY COMPANYCODE DESC")->result_array();
		save_query_in_log();
		return $result;
	}	
	 // To get company details by company id
    public function get_company_by_company_id($cid)
    {
        $this->db->reconnect();
        $result  = $this->db->query("SELECT * FROM COMPANY WHERE COMPANYCODE = '".$cid."'")->row();
        save_query_in_log();
        $this->db->close();
        return $result;
    }
	
	public function company_save($data)
	{
		// echo "INSERT INTO COMPANY(COMPANYCODE, COMPANYNAME, ADDRESS1, ADDRESS2, CITY, PINCODE, STATE, PHONE, EMAIL, PAN_NO, GST_NO, REGNO, COMPANYNAME2, ADDRESSLINE, LOGINCODE, BUSINESS_TYPE, ACTIVE, COMPANY_LOGO) VALUES ('".$data['company_id']."','".$data['company_name']."','".$data['address1']."','".$data['address2']."','".$data['city']."','".$data['pincode']."','".$data['state']."','".$data['phone']."','".$data['email']."','".$data['pan_no']."','".$data['gst_no']."','".$data['reg_no']."','".$data['pcname']."','".$data['paddress']."','".$data['code']."',".$data['btype'].",'Y')";
		// exit();
		if($data['btype']=='')
		{
			$data['btype']=NULL;	
		}
		$result = $this->db->query("INSERT INTO COMPANY(COMPANYCODE,COMPANY_LOGO, COMPANYNAME, ADDRESS1, ADDRESS2, CITY, PINCODE, STATE, PHONE, EMAIL, PAN_NO, GST_NO, REGNO, COMPANYNAME2, ADDRESSLINE, LOGINCODE, BUSINESS_TYPE, ACTIVE) VALUES ('".$data['company_id']."','".$data['company_logo']."','".$data['company_name']."','".$data['address1']."','".$data['address2']."','".$data['city']."','".$data['pincode']."','".$data['state']."','".$data['phone']."','".$data['email']."','".$data['pan_no']."','".$data['gst_no']."','".$data['reg_no']."','".$data['pcname']."','".$data['paddress']."','".$data['code']."',".$data['btype'].",'Y')");
		
		save_query_in_log();
		return $result;
	}

	public function get_company_by_id($sid)
	{
		$result = $this->db->query("SELECT * FROM COMPANY WHERE COMPANYCODE='".$sid."'")->row();
		save_query_in_log();
		return $result;
	}

	public function company_update($data)
	{
		$result = $this->db->query("UPDATE COMPANY SET COMPANYNAME='".$data['company_name']."',ADDRESS1='".$data['address1']."',ADDRESS2='".$data['address2']."',CITY='".$data['city']."',PINCODE='".$data['pincode']."',STATE='".$data['state']."',PHONE='".$data['phone']."',EMAIL='".$data['email']."', PAN_NO='".$data['pan_no']."', GST_NO='".$data['gst_no']."', REGNO='".$data['reg_no']."', COMPANYNAME2='".$data['pcname']."',ADDRESSLINE='".$data['paddress']."',LOGINCODE='".$data['code']."',BUSINESS_TYPE='".$data['btype']."',COMPANY_LOGO='".$data['company_logo']."' WHERE COMPANYCODE='".$data['company_id']."'");
		save_query_in_log();
		return $result;
	}
	// To delete department
    public function company_delete($uid)
    {
        $this->db->reconnect();
        $result  = $this->db->query("UPDATE COMPANY SET ACTIVE = 'D' WHERE COMPANYCODE = '".$uid."'");
        save_query_in_log();
        $this->db->close();
        return $result;
    }
    public function company_active($data, $id)
	{
		$this->db->reconnect();
		$result = $this->db->query("UPDATE COMPANY SET ACTIVE = '".$data['status']."' WHERE COMPANYCODE = '".$id."'");

		save_query_in_log();
        $this->db->close();
		return $result;
	}
	// To get company unique
    public function company_unique($val)
    {   
        $this->db->reconnect();
        $result  = $this->db->query("SELECT * FROM COMPANY WHERE COMPANYNAME = '".$val."' AND ACTIVE='Y' ")->row();
        save_query_in_log();
        $this->db->close();
        return $result;
    }
     public function company_unique_edit($val,$id)
    {   
        $this->db->reconnect();
        $result  = $this->db->query("SELECT * FROM COMPANY WHERE COMPANYNAME = '".$val."' AND COMPANYCODE != '".$id."'   ")->row();
        save_query_in_log();
        $this->db->close();
        return $result;
    }
    
}
?>