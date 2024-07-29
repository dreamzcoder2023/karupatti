<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*******************************************************************************************************
    Purpose : To handle all the Assetmanagement_model database details 2024-01-22 By Vasanth
********************************************************************************************************/
class Assetmanagement_model extends CI_Model
{
  function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Calcutta'); 
    }


    public function list()
    {
        $this->db->reconnect();
        $result  = $this->db->query("SELECT assetmanagement.* , assetcategory.assetcategoryname, assetsubcategory.assetsubcategoryname
         FROM assetmanagement 
         LEFT JOIN assetcategory ON assetmanagement.assetcategoryid = assetcategory.assetcategoryid
         LEFT JOIN assetsubcategory ON assetmanagement.assetsubcategoryid = assetsubcategory.assetsubcategoryid
         WHERE assetmanagement.status!='0' ORDER BY assetmanagementid DESC ")->result_array();
        save_query_in_log();
        $this->db->close();
        return $result;
    }
    public function list_re_main()
    {
        $this->db->reconnect();
        $result  = $this->db->query("SELECT assetmanagement_history.* , assetmanagement.assetdate,
                                    assetmanagement.companycode,
                                    assetmanagement.purchasedate,
                                    assetmanagement.assetnumber,
                                    assetmanagement.assetcategoryid,
                                    assetmanagement.assetsubcategoryid,
                                    assetmanagement.assetname,
                                    assetmanagement.assetvalue,
                                    assetmanagement.allocatedtype,
                                    assetmanagement.allocatedtocompany,
                                    assetmanagement.allocatedtostaff,
                                    assetmanagement.assetperiod,
                                    assetmanagement.assetduration,
                                    assetmanagement.assetimage,
                                    assetmanagement.assetwarranty,
                                    assetmanagement.issuedescription,
                                    assetmanagement.maintenacedescription,
                                    assetmanagement.assetdescription,
                                    assetcategory.assetcategoryname, assetsubcategory.assetsubcategoryname
         FROM assetmanagement_history 
         LEFT JOIN assetmanagement  ON assetmanagement.assetmanagementid  = assetmanagement_history.assetmanagementid
         LEFT JOIN assetcategory    ON assetmanagement.assetcategoryid    = assetcategory.assetcategoryid
         LEFT JOIN assetsubcategory ON assetmanagement.assetsubcategoryid = assetsubcategory.assetsubcategoryid
         WHERE assetmanagement_history.status!='0' AND assetmanagement_history.status!='1' AND assetmanagement_history.status!='6' AND assetmanagement_history.modified_by is null ORDER BY assetmanagement_history.assetmanagement_historyid DESC ")->result_array();
        save_query_in_log();
        $this->db->close();
        return $result;
    }
    
    public function assetcategorylist()
    {
        $this->db->reconnect();
        $result  = $this->db->query("SELECT * FROM assetcategory WHERE status='1' ORDER BY assetcategoryname ASC ")->result_array();
        save_query_in_log();
        $this->db->close();
        return $result;
    }
     public function Group_list()
    {       
        $id = [];

        $ids = $this->db->query("SELECT * FROM assetsubcategory WHERE status='1'  ORDER BY assetsubcategoryname ASC ")->result_array();

        foreach ($ids as $i => $t) {
            $id[] = $t['assetcategoryid'];
        }
        

        $result = [];
        foreach (array_unique($id) as $i => $catid) {

            $scat     = $this->db->query("SELECT * FROM assetcategory WHERE assetcategoryid='".$catid."' ORDER BY assetcategoryname ASC ")->row();
            $catlist  = $this->db->query("SELECT * FROM assetsubcategory WHERE assetcategoryid='".$catid."' AND status='1'  ORDER BY assetsubcategoryname ASC ")->result_array();

            $result[] = [  

                        'assetcategoryname'  => $scat->assetcategoryname,
                        'list'               => $catlist,

                        ];
            
        }
        return $result;
        // print_r($results);
    }
     public function assetsubcategorylist()
    {
        $this->db->reconnect();
        $result  = $this->db->query("SELECT * FROM assetsubcategory WHERE status='1' ORDER BY assetsubcategoryname ASC ")->result_array();
        save_query_in_log();
        $this->db->close();
        return $result;
    }

    public function assetmanagement_active_status($data,$id)
    {
        $this->db->reconnect();
        $result = $this->db->query("UPDATE assetmanagement SET status = '".$data['status']."' WHERE assetmanagementid = '".$id."'");
        save_query_in_log();
        $this->db->close();
        return $result;
    }

    public function add($data)
    {
        $this->db->reconnect();
        $result = $this->db->insert("INSERT INTO assetmanagement (
                                                    assetdate,
                                                    companycode,
                                                    purchasedate,
                                                    assetnumber,
                                                    assetcategoryid,
                                                    assetsubcategoryid,
                                                    assetname,
                                                    assetvalue,
                                                    allocatedtype,
                                                    allocatedtocompany,
                                                    allocatedtostaff,
                                                    assetperiod,
                                                    assetduration,
                                                    assetimage,
                                                    assetwarranty,
                                                    issuedescription,
                                                    maintenacedescription,
                                                    assetdescription,
                                                    created_on,
                                                    created_by,
                                                    status
                                                )
                                                VALUES (
                                                    '".$data['assetdate']."',
                                                    '".$data['companycode']."',
                                                    '".$data['purchasedate']."',
                                                    '".$data['assetnumber']."',
                                                    '".$data['assetcategoryid']."',
                                                    '".$data['assetsubcategoryid']."',
                                                    '".$data['assetname']."',
                                                    '".$data['assetvalue']."',
                                                    '".$data['allocatedtype']."',
                                                    '".$data['allocatedtocompany']."',
                                                    '".$data['allocatedtostaff']."',
                                                    '".$data['assetperiod']."',
                                                    '".$data['assetduration']."',
                                                    '".$data['assetimage']."',
                                                    '".$data['assetwarranty']."',
                                                    '".$data['issuedescription']."',
                                                    '".$data['maintenacedescription']."',
                                                    '".$data['assetdescription']."',
                                                    '".$data['created_on']."',
                                                    '".$data['created_by']."',
                                                    '".$data['status']."')
                                                    ");

        save_query_in_log();
        $this->db->close();
        return $result;
    }




    

    public function editdata($id)
    {
        $this->db->reconnect();
        $result  = $this->db->query("SELECT * FROM assetmanagement WHERE assetmanagementid='".$id."' ")->row();
        save_query_in_log();
        $this->db->close();
        return $result;
    }
    public function viewdata($id)
    {
        $this->db->reconnect();
        $result  = $this->db->query("SELECT assetmanagement.* , assetcategory.assetcategoryname, assetsubcategory.assetsubcategoryname , COMPANY.COMPANYNAME
         FROM assetmanagement 
         LEFT JOIN assetcategory ON assetmanagement.assetcategoryid = assetcategory.assetcategoryid
         LEFT JOIN assetsubcategory ON assetmanagement.assetsubcategoryid = assetsubcategory.assetsubcategoryid
         LEFT JOIN COMPANY ON assetmanagement.companycode = COMPANY.COMPANYCODE
         WHERE assetmanagement.assetmanagementid='".$id."' ORDER BY assetmanagementid DESC ")->result_array();
        save_query_in_log();
        $this->db->close();
        return $result;
    }
    public function history($id)
    {
        $this->db->reconnect();
        $result  = $this->db->query("SELECT assetmanagement.* , assetcategory.assetcategoryname, assetsubcategory.assetsubcategoryname ,COMPANY.COMPANYNAME
         FROM assetmanagement 
         LEFT JOIN assetcategory ON assetmanagement.assetcategoryid = assetcategory.assetcategoryid
         LEFT JOIN assetsubcategory ON assetmanagement.assetsubcategoryid = assetsubcategory.assetsubcategoryid
         LEFT JOIN COMPANY ON assetmanagement.companycode = COMPANY.COMPANYCODE
         WHERE assetmanagement.assetmanagementid='".$id."' AND assetmanagement.status!='0' ORDER BY assetmanagementid DESC ")->row();
        save_query_in_log();
        $this->db->close();
        return $result;
    }
    public function history_list($id)
    {
        $this->db->reconnect();
        $result  = $this->db->query("SELECT * FROM  assetmanagement_history  WHERE assetmanagementid='".$id."' ORDER BY assetmanagement_historyid DESC ")->result_array();
        save_query_in_log();
        $this->db->close();
        return $result;
    }
    

     public function update($data)
    {
        $this->db->reconnect();
        $result = $this->db->query("
                                    UPDATE assetmanagement
                                    SET
                                        assetcategoryid      = '".$data['assetcategoryid']."',
                                        assetmanagementname = '".$data['assetmanagementname']."',
                                        modified_on       = '".$data['modified_on']."',
                                        modified_by       = '".$data['modified_by']."' 
                                    WHERE
                                        assetmanagementid   = '".$data['assetmanagementid']."'
                                ");
        save_query_in_log();
        $this->db->close();
        return $result;
    }

    // To delete assetmanagement
    public function assetmanagement_delete($uid)
    {
        $this->db->reconnect();
        $result  = $this->db->query("UPDATE assetmanagement SET STATUS = '0' WHERE assetmanagementid = '".$uid."'");
        save_query_in_log();
        $this->db->close();
        return $result;
    } 


    


}
?>                        