<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/***************************************************************
    Purpose : To handle all the Area database details 2022-08-22
****************************************************************/
class Raisecomplaint_model extends CI_Model
{
	public $other_db;
  function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Calcutta'); 
    }
    public function getraisecomplaint(){

        $getcomplaint = $this->db->query("SELECT * FROM RAISE_COMPLAINT_REPORTS ORDER BY complaint_UID DESC")->result_array();
        return $getcomplaint;
    }

    public function getpasscheck($passvalue)
    {
        $checkpass = $this->db->query("SELECT * FROM STAFFS where TRANSACTION_PWD='".$passvalue."'")->result_array();

        if($checkpass)
        {
            $status=1;
            return $status;
        }
        else
        {
            $status=0;
            return $status;
        }
    }
    public function raisecomplaintadd($raisecomplaint)
    {
       // print_r($raisecomplaint['companynameval']);exit;

        $insertcomplaint = $this->db->query("INSERT INTO RAISE_COMPLAINT_REPORTS (party_id,complaint_Date,billno,company_name,complaint_description,nos_updation,complaintBy,status,complaint_type,remarks,isActive,createdBy,createdDate,modifiedBy,modifiedDate) VALUES ('".$raisecomplaint['party_id']."','".$raisecomplaint['complaint_date']."','".$raisecomplaint['complaintid']."','".$raisecomplaint['companynameval']."','".$raisecomplaint['complaintdescription']."','".$raisecomplaint['nosupdation']."','".$raisecomplaint['complaint_by']."','".$raisecomplaint['status']."','".$raisecomplaint['complaint_type']."','','".$raisecomplaint['status']."','".$raisecomplaint['complaint_by']."','".date('Y-m-d')."','".$raisecomplaint['complaint_by']."','".date('Y-m-d')."')");

        if($insertcomplaint)
        {
            $status=1;
            return $status;
        }
        else
        {
            $status=0;
            return $status;
        }


    }
    public function raisecomplaintupdate($raisecomplaint)
    {
        //$updatecomplaint = $this->db->query("UPDATE RAISE_COMPLAINT_REPORTS SET update_remarks='".$raisecomplaint['complaintdescription']."',updateremarksBy='".$raisecomplaint['updateby']."',updateremark_date='".date('Y-m-d')."' where status=1 AND billno='".$raisecomplaint['complaintid']."'");

        $isactive=1;
        $updatecomplaint = $this->db->query("INSERT INTO RAISECOMPLAINT_REMARKS (complaint_UID,party_id,update_remarks,updateremarksBy,updateremark_date,isActive,createdBy,createdDate,modifiedBy,modifiedDate) VALUES ('".$raisecomplaint['complaintid']."','".$raisecomplaint['party_id']."','".$raisecomplaint['complaintdescription']."','".$raisecomplaint['updateby']."','".$raisecomplaint['createdDate']."','".$isactive."','".$raisecomplaint['createdBy']."','".$raisecomplaint['createdDate']."','".$raisecomplaint['modifiedBy']."','".$raisecomplaint['modifiedDate']."') ");

        if($updatecomplaint)
        {
            $status=1;
            return $status;
        }
        else
        {
            $status=0;
            return $status;
        }
    }
    public function resolvecomplaint($resolvecomplaint)
    {
        $updatecomplaint = $this->db->query("UPDATE RAISE_COMPLAINT_REPORTS SET remarks='".$resolvecomplaint['resolveremarks']."',resolve_Date='".$resolvecomplaint['resolved_date']."',resolvedBy='".$resolvecomplaint['resolved_by']."',status=0 where status=1 AND billno='".$resolvecomplaint['resolvebillid']."'");

        if($updatecomplaint)
        {
            $status=1;
            return $status;
        }
        else
        {
            $status=0;
            return $status;
        }


    }
    public function pickkaruppatticomplaintreasonsadd($pickcomplaint)
    {
        $isactive =1;
        $insertpickcomplaint = $this->db->query("INSERT INTO PICK_COMPLAINTREPORTS (party_id,pickcomplaintreason,pickcomplaintid,companynameval,pickcomplaint_by,status,pickcomplaint_date,pickcomplaint_type,isActive,createdBy,createdDate,modifiedBy,modifiedDate) VALUES ('".$pickcomplaint['party_id']."','".$pickcomplaint['pickcomplaintreason']."','".$pickcomplaint['pickcomplaintid']."','".$pickcomplaint['companynameval']."','".$pickcomplaint['pickcomplaint_by']."','".$pickcomplaint['status']."','".$pickcomplaint['pickcomplaint_date']."','".$pickcomplaint['pickcomplaint_type']."','".$isactive."','".$_SESSION['USERID']."','".date('Y-m-d')."','".$_SESSION['USERID']."','".date('Y-m-d')."')");

        if($insertpickcomplaint)
        {
            $status=1;
            return $status;
        }
        else
        {
            $status=0;
            return $status;
        }

    }
    public function getpicklistcomplaint(){
        $getpicklistcomplaint = $this->db->query("SELECT * FROM PICK_COMPLAINTREPORTS ORDER BY pickcomplaint_UID DESC")->result_array();
        return $getpicklistcomplaint;

    }
    public function getpickcomplaintdata($pickcomplaintidval)
    {

        $getpicklistcomplaint = $this->db->query("SELECT * FROM PICK_COMPLAINTREPORTS where pickcomplaint_UID='".$pickcomplaintidval."'")->result_array();
        return $getpicklistcomplaint;

    }
    public function getricecomplaintdata($complaintid){
        $getpicklistcomplaint = $this->db->query("SELECT * FROM RAISE_COMPLAINT_REPORTS where complaint_UID='".$complaintid."'")->result_array();
        return $getpicklistcomplaint;

    }
    public function addpickcomplaintupdateremarks($remarksupdate)
    {
        $isactive =1;
        $remarksupdate = $this->db->query("INSERT INTO PICKCOMPLAINT_REMARKSUPDATE (pickcomplaint_UID,party_id,remarksdescription,status,isActive,createdBy,createdDate,modifiedBy,modifiedDate) VALUES ('".$remarksupdate['pickcomplaintidval']."','".$remarksupdate['partyid']."','".$remarksupdate['pickcomplaintremarks']."','".$remarksupdate['status']."','".$isactive."','".$remarksupdate['createdBy']."','".$remarksupdate['createdDate']."','".$remarksupdate['modifiedBy']."','".$remarksupdate['modifiedDate']."')");

        if($remarksupdate)
        {
            $status=1;
            return $status;
        }
        else
        {
            $status=0;
            return $status;
        }

    }
    public function pickcomplaintresolve($resolveremarkpickcomplaint)
    {

        $updatecomplaint = $this->db->query("UPDATE PICK_COMPLAINTREPORTS SET remarks='".$resolveremarkpickcomplaint['resolvepickcomplaintremarks']."',resolved_date='".date('Y-m-d')."',resolved_by='".$_SESSION['username']."',status=0 where status=1 AND pickcomplaint_UID='".$resolveremarkpickcomplaint['resolveid']."'");

        if($updatecomplaint)
        {
            $status=1;
            return $status;
        }
        else
        {
            $status=0;
            return $status;
        }



        
    }
}
?>    