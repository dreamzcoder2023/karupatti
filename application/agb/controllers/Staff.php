<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/* ************************************************************************************
		Purpose : To handle all Department functions 2022-08-19
***************************************************************************************/
class Staff extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model(array("staff_model"));
    	$this->load->library('user_agent');
    	if (isset($this->session->userdata['username']) && $this->session->userdata['username'] == TRUE)
        {
            //do something
        }else{
            redirect('login'); //if session is not there, redirect to login page
        } 
		date_default_timezone_set("Asia/Kolkata");
    	$this->session->set_userdata('comtitle', 'staff');
	}

    public function index()
    {   
         
        $data['company_list'] = $this->staff_model->get_company_list();
        $data['city_list'] = $this->staff_model->get_city_list();
        $data['role_list'] = $this->staff_model->get_role_list();
        $data['staff_list'] = $this->staff_model->get_staff_list();
         $data['department_list'] = $this->db->query("select * from DEPARTMENT where status!=2")->result_array();
        $data['designation_list'] = $this->db->query("select * from DESIGNATION where status!=2")->result_array();
        $this->load->view('staff/staff_list',$data);
    }
    public function staff_add()
    {
        $data['company_list'] = $this->staff_model->get_company_list();
        $data['city_list'] = $this->staff_model->get_city_list();
        $data['role_list'] = $this->staff_model->get_role_list();
        $data['staff_list'] = $this->staff_model->get_staff_list();
         $data['department_list'] = $this->db->query("select * from DEPARTMENT where status!=2")->result_array();
        $data['designation_list'] = $this->db->query("select * from DESIGNATION where status!=2")->result_array();
        $this->load->view('staff/staff_add',$data);   
    }
    public function staff_view1()
    {
        
         $data['department_list'] = $this->db->query("select * from DEPARTMENT where status!=2")->result_array();
        $data['designation_list'] = $this->db->query("select * from DESIGNATION where status!=2")->result_array();
        $stid = $_POST['id'];
        $data['company_list'] = $this->staff_model->get_company_list();
        $data['city_list'] = $this->staff_model->get_city_list();
        $data['role_list'] = $this->staff_model->get_role_list();

        // print_r($staffid);exit;
        $data['stafflist_edit_details'] = $this->staff_model->get_stafflist_by_stafflist_id($stid);
        $roleid=0;
        if(isset($data['stafflist_edit_details']->Role)) $roleid=$data['stafflist_edit_details']->Role;

        $data['menu_list']=$this->db->query("select * from MENU where PARENT_MENU_ID=0 order by MENU_ID asc")->result_array();
        $data['role_details'] =  $this->db->query("SELECT * FROM ROLE WHERE ROLEID = '".$roleid."' AND STATUS!=2")->row();
        $this->load->view('staff/staff_view',$data);   
    }

    public function staff_active()

    {
        $id = $this->input->post('id');
        $data['Status'] = $this->input->post('Status');
        $result = $this->staff_model->staff_active($data,$id);
        echo 1;
    }

    public function generate_staff_id(){


       //$c_code = $this->db->query("SELECT COMPANYNAME FROM COMPANY")->row();
       //echo $company;
       //$cname = explode(" ",$c_code[0]);
        // 001-ST-001/19
        // 001 - company
        // ST - staff
        // 001 - id
        // 19 - joining year
       $staff_id = $this->db->query("SELECT SNO FROM STAFFS ORDER BY SNO DESC")->row();
       $fid=substr($staff_id->SNO,0,1);
       $lid=substr($staff_id->SNO,1);
       $s_id=$fid.$lid+1;
       echo $s_id;

    }

    public function staff_save()
    {   
        //echo $this->input->post('company_list_new');exit;
       
       
        

        $data['staff_company'] = $this->input->post('company_list_new');
        
        $data['staff_name'] = $this->input->post('add_sname_staff_list');
        $data['staff_fname'] = $this->input->post('add_fname_staff_list');
        $data['staff_gender'] = $this->input->post('add_sgender_staff_list');
        $data['staff_aadhar'] = $this->input->post('add_saadharno_staff_list');
        $data['staff_idproof'] = $this->input->post('add_sidproof_staff_list');
        $data['staff_phone'] = $this->input->post('add_sphone_staff_list');
        $data['staff_dob']  =date('Y-m-d',strtotime($this->input->post('add_dob_staff_list')));
        $data['staff_age'] = $this->input->post('add_sage_staff_list');
        $data['staff_doj'] =date('Y-m-d',strtotime($this->input->post('add_doj_staff_list')));
        $data['staff_city'] = $this->input->post('add_city_staff_list');
        $data['staff_relvdate'] =date('Y-m-d',strtotime($this->input->post('add_relvdate_staff_list'))); 
        $data['staff_dept'] = $this->input->post('add_sdept_staff_list');
        $data['staff_desig'] = $this->input->post('add_sdesig_staff_list');
        $data['staff_role'] = $this->input->post('role_list_new');
        $data['staff_uname'] = $this->input->post('add_suname_staff_list');
        $data['staff_passwd'] = encrypt_decrypt($this->input->post('add_spw_staff_list'),'encrypt');
        $data['staff_t_pwd'] = encrypt_decrypt($this->input->post('staff_tpwd'),'encrypt');
        $data['staff_wrkhrs'] = $this->input->post('add_swrkhrs_staff_list');
        $data['staff_minleavedays'] = $this->input->post('add_sminleavedays_staff_list');
        $data['staff_address'] = $this->input->post('add_saddress_staff_list');
        $data['staff_mobappallw'] = $this->input->post('mobileapp_add');
        $data['staff_staffphoto'] = $this->input->post('add_sphoto_staff_list');
        $data['staff_idphoto'] = $this->input->post('add_idphoto_remove_staff_list');
        $data['staff_basicsalry'] = $this->input->post('add_sbassal_staff_list');
        $data['staff_pfpermonth'] = $this->input->post('pfpermonth');
        $data['staff_allwone'] = $this->input->post('allwone');
        $data['staff_allwtwo'] = $this->input->post('allwtwo');
        $data['staff_allwthree'] = $this->input->post('allwthree');
        $data['staff_incentive'] = $this->input->post('incentive');
        $data['staff_leavded'] = $this->input->post('leaveded');
        $data['staff_netsal'] = $this->input->post('add_snetsal_staff_list');



        $last_sno_detail = $this->staff_model->get_last_sno_details();
  
        $last_data  = $last_sno_detail->SNO;
        //echo $last_data;exit;
        //$exlno = substr($last_data,5);
        $next_value = (int)$last_data + 1;

        // 001-ST-001/19
        // 001 - company
        // ST - staff
        // 001 - id
        // 19 - joining year
        $last_staff_id = (int)$last_data + 1;

        // print_r($last_data);
        if($last_sno_detail){
            $year    = substr( date("y"), -2);
            $slice   = explode("/", $last_staff_id);
            $results = preg_replace('/[^0-9]/',' ', $slice[0]); 

            function request_num ($input, $pad_len = 4  , $prefix = null) {
                if ($pad_len <= strlen($input))
                    trigger_error('<strong>$pad_len</strong> cannot be less than or equal to the length of <strong>$input</strong> to generate invoice number', E_USER_ERROR);
            
                if (is_string($prefix))
                    return sprintf("%s%s", $prefix, str_pad($input, $pad_len, "0", STR_PAD_LEFT));
            
                return str_pad($input, $pad_len, "0", STR_PAD_LEFT);
            }

            // $request    =  request_num(((int)$results+1), 4, "ASRS-");

            $request    =  $data['staff_company'].'-'.'ST'.'-'.$last_staff_id;
            
            $request_id =  $request.'/'.$year;

            $staff_id_prefix = $request_id;
            }
            else{
            $year = substr( date("y"), -2);
            $staff_id_prefix =  '001-ST-001/'.$year;
            }

        $data['staff_id'] = $staff_id_prefix;
        $uid=str_pad($next_value,3,0,STR_PAD_LEFT);
        //$s_no=$r_no1;
        $data['sno'] = $uid;
        //print_r($data);exit;

        $result = $this->staff_model->add_staff($data);

        // User Permissions Add - Start
        $menu_id=$this->input->post('menu_id');
        $menuid=explode(",",implode(",",$this->input->post('menuid')));

        // $last_role=$this->db->query("SELECT TOP 1 * FROM ROLE WHERE STATUS!=2 ORDER BY ROLEID DESC ")->row();

        for($i=0;$i<count($menuid);$i++)
        {
            // echo $menuid[$i]."<br>";//29
            $rmenu=$this->input->post('menu_id['.$menuid[$i].']');//29-selected or not
            // echo $rmenu."--->";
            $is_main_menu=$this->db->query("select * from MENU where MENU_ID=".$menuid[$i])->row();

            if($is_main_menu->IS_PARENT=='0' && $is_main_menu->PARENT_MENU_ID=='0')
            {
                $rmenu_view=$this->input->post('Viewpermission['.$menuid[$i].']');
                // $rmenu_view=1;
                if($rmenu_view=='')$rmenu_view=0;
                if($rmenu_view==0)
                {
                    $rmenu_permission='';
                }
                else
                {
                    $rmenu_permission=$rmenu_view;
                }
            }
            else if($is_main_menu->IS_PARENT=='1' && $is_main_menu->PARENT_MENU_ID=='0' && $is_main_menu->VALUE=='View')
            {
                $rmenu_view=$this->input->post('Viewpermission['.$menuid[$i].']');
                // $rmenu_permission=1;
                 if($rmenu_view=='')$rmenu_view=0;
                if($rmenu_view==0)
                {
                    $rmenu_permission='';
                }
                else
                {
                    $rmenu_permission=$rmenu_view;
                }
            }
            else if($is_main_menu->IS_PARENT=='1' && $is_main_menu->PARENT_MENU_ID=='0' && $is_main_menu->VALUE!='View')
            {
                $rmenu_add=$this->input->post('Addpermission['.$menuid[$i].']');
                $rmenu_edit=$this->input->post('Editpermission['.$menuid[$i].']');
                $rmenu_del=$this->input->post('Deletepermission['.$menuid[$i].']');
                $rmenu_view=$this->input->post('Viewpermission['.$menuid[$i].']');
                $rmenu_verify=$this->input->post('Verifypermission['.$menuid[$i].']');

                if($rmenu_add=='') $rmenu_add=0;
                if($rmenu_edit=='')$rmenu_edit=0;
                if($rmenu_del=='')$rmenu_del=0;
                if($rmenu_view=='')$rmenu_view=0;
                if($rmenu_verify=='')$rmenu_verify=0;
                
                if($rmenu_add ==0 && $rmenu_edit==0 && $rmenu_view==0 && $rmenu_del==0 && $rmenu_verify==0)
                {
                    $rmenu_permission='';
                }
                else
                {
                    $rmenu_permission=$rmenu_view."~".$rmenu_add."~".$rmenu_edit."~".$rmenu_del."~".$rmenu_verify;
                }
            }
            elseif($is_main_menu->IS_PARENT=='0' && $is_main_menu->PARENT_MENU_ID>0)
            {
                $rmenu_add=$this->input->post('Addpermission['.$menuid[$i].']');
                $rmenu_edit=$this->input->post('Editpermission['.$menuid[$i].']');
                $rmenu_del=$this->input->post('Deletepermission['.$menuid[$i].']');
                $rmenu_view=$this->input->post('Viewpermission['.$menuid[$i].']');
                $rmenu_verify=$this->input->post('Verifypermission['.$menuid[$i].']');

                if($rmenu_add=='') $rmenu_add=0;
                if($rmenu_edit=='')$rmenu_edit=0;
                if($rmenu_del=='')$rmenu_del=0;
                if($rmenu_view=='')$rmenu_view=0;
                if($rmenu_verify=='')$rmenu_verify=0;
                
                if($rmenu_add ==0 && $rmenu_edit==0 && $rmenu_view==0 && $rmenu_del==0 && $rmenu_verify==0)
                {
                    $rmenu_permission='';
                }
                else
                {
                    $rmenu_permission=$rmenu_view."~".$rmenu_add."~".$rmenu_edit."~".$rmenu_del."~".$rmenu_verify;
                }
            }
            
            if($rmenu_permission!='')
            // echo "INSERT INTO ROLE_PERMISSION (ROLE_ID,MENU_ID,VALUE)VALUES('".$last_role->ROLEID."','".$menuid[$i]."','".$rmenu_permission."')"."<br>";
            $ins_role_permission=$this->db->query("INSERT INTO STAFF_PERMISSION (STAFF_ID,MENU_ID,VALUE)VALUES('".$data['sno']."','".$menuid[$i]."','".$rmenu_permission."')");
           
        }
        // User Permissions Add - End


        $last_userid_detail = $this->staff_model->get_last_userid();
  
        $last_data= $last_userid_detail->USERID;
        //echo $last_data;exit;
        //$exlno = substr($last_data,5);
        $next_value = (int)$last_data + 1;
        $uid=str_pad($next_value,4,0,STR_PAD_LEFT);
        //$s_no=$r_no1;
        $data['userid'] = $uid;
        //print_r($data);exit;


        $result_user = $this->staff_model->add_userlist($data);


        if($result)
        {
            $this->session->set_flashdata('g_success', 'Staff have been Added successfully...');
        }else{
           $this->session->set_flashdata('g_err', 'Could not add Staff details!');
        }
      
        redirect('staff');
    }

    public function staff_permission()
    {
        $roleid=$this->input->post('roleid');
        $data['menu_list']=$this->db->query("select * from MENU where PARENT_MENU_ID=0 order by MENU_ID asc")->result_array();
        $data['role_details'] = $this->db->query("SELECT * FROM ROLE WHERE ROLEID = '".$roleid."' AND STATUS!=2")->row();
        $this->load->view('staff/staff_permission',$data);
    }
    public function fetch_sub_menu_details()
    {
        $menu_id=$this->input->post('value');
        $sub_menu_list=$this->db->query("select * from MENU where PARENT_MENU_ID='".$menu_id."' and IS_PARENT='0'  ")->result_array();
        $count=count($sub_menu_list);
        $idarray=array();
        $parray=array();
        $i=0;
        foreach ($sub_menu_list as $smlist) 
        {
            $idarray[$i]=$smlist['MENU_ID'];
            $parray[$i]=$smlist['VALUE'];
            $i++;
        }

        $sub_menu_ids=implode(",", $idarray);
        $sub_menu_permission=implode(",", $parray);
        echo "||".$sub_menu_ids."||".$sub_menu_permission;
    }
    public function fetch_sub_menu_details1()
    {
        $menu_id=$this->input->post('value');
        $sub_menu_list=$this->db->query("select * from MENU where PARENT_MENU_ID='".$menu_id."' and IS_PARENT!='0'  ")->result_array();
        $count=count($sub_menu_list);
        $idarray=array();
        $parray=array();
        $i=0;
        foreach ($sub_menu_list as $smlist) 
        {
            $idarray[$i]=$smlist['MENU_ID'];
            $parray[$i]=$smlist['VALUE'];
            $i++;
        }

        $sub_menu_ids=implode(",", $idarray);
        $sub_menu_permission=implode(",", $parray);
        echo "||".$sub_menu_ids."||".$sub_menu_permission;
        // echo "select * from MENU where PARENT_MENU_ID='".$menu_id."' and IS_PARENT!='0'  ";
    }
    public function fetch_child_menu_details()
    {
        $menu_id=$this->input->post('value');
        $sub_menu_list=$this->db->query("select * from MENU where PARENT_MENU_ID='".$menu_id."' and IS_PARENT='0'  ")->result_array();
        $count=count($sub_menu_list);
        $idarray=array();
        $parray=array();
        $i=0;
        foreach ($sub_menu_list as $smlist) 
        {
            $idarray[$i]=$smlist['MENU_ID'];
            $parray[$i]=$smlist['VALUE'];
            $i++;
        }

        $sub_menu_ids=implode(",", $idarray);
        $sub_menu_permission=implode(",", $parray);
        echo "||".$sub_menu_ids."||".$sub_menu_permission;
    // print_r("select * from MENU where PARENT_MENU_ID='".$menu_id."' and IS_PARENT!='0'");
    }

    public function select_child_permission()
    {
        $idarray=array();
        $parray=array();
        $i=0;
        $menu_id=$this->input->post('value');
        if(isset($menu_id)){
            $idarray[$i]=$menu_id;
            $i++;
        }
        
        $child_menu_list=$this->db->query("select * from MENU where MENU_ID='".$menu_id."' and IS_PARENT='0'  ")->row();
        if(isset($child_menu_list)){
            $idarray[$i]=$child_menu_list->PARENT_MENU_ID;
            $i++;
        }
        $sub_menu_list=$this->db->query("select * from MENU where MENU_ID='".$child_menu_list->PARENT_MENU_ID."' and IS_PARENT!='0'  ")->row();
        if(isset($sub_menu_list)){
            $idarray[$i]=$sub_menu_list->PARENT_MENU_ID;
            $i++;
        }
    
    $menu_ids=implode(",", $idarray);
    echo "||".$menu_ids;
    }
    public function fetch_menu_permission()
    {
        $menu_id=$this->input->post('value');
        // echo $menu_id;
        $sub_menu_list=$this->db->query("select VALUE from MENU where MENU_ID='".$menu_id."'")->row();
        
        echo "||".$sub_menu_list->VALUE;
    }
    public function staff_permission_edit()
    {
        $roleid=$this->input->post('roleid');
        $data['menu_list']=$this->db->query("select * from MENU where PARENT_MENU_ID=0 order by MENU_ID asc")->result_array();
        $data['role_details'] = $this->db->query("SELECT * FROM ROLE WHERE ROLEID = '".$roleid."' AND STATUS!=2")->row();
        $this->load->view('staff/staff_permission_edit',$data);
    }
    //To Delete Staff
    public function staff_delete()
    {
        $sno = $data['sno']=$_POST['id'];
        $data['stafflist_details'] = $this->db->query("SELECT * FROM STAFFS WHERE SNO='".$sno."'")->row();
        $this->load->view('staff/staff_delete',$data);
    }

    public function delete()
    { 
        $sno=$_POST['field'];
        $result = $this->staff_model->staff_delete($sno);
        if ($result) {
            $this->session->set_flashdata('g_success', 'Staff has been Deleted successfully.');
        }
        else{
            $this->session->set_flashdata('g_err', 'Something went wrong');
        }
    }

    //Staff Edit
    public function staff_edit()
    {
        $stid = $_POST['id'];
        $data['company_list'] = $this->staff_model->get_company_list();
        $data['city_list'] = $this->staff_model->get_city_list();
        $data['role_list'] = $this->staff_model->get_role_list();

        $data['stafflist_edit_details'] = $this->staff_model->get_stafflist_by_stafflist_id($stid);
    //    print_r($data['stafflist_edit_details']->Role);exit;

        $roleid=0;
        if(isset($data['stafflist_edit_details']->Role)) $roleid=$data['stafflist_edit_details']->Role;
       
        $data['menu_list']=$this->db->query("select * from MENU where PARENT_MENU_ID=0 order by MENU_ID asc")->result_array();
        $data['role_details'] =  $this->db->query("SELECT * FROM ROLE WHERE ROLEID = '".$roleid."' AND STATUS!=2")->row();
        $this->load->view('staff/staff_edit',$data);
    }


    //Userlist Edit
    public function user_edit()
    {
        $stid = $_POST['id'];
        //$data['company_list'] = $this->staff_model->get_company_list();
        //$data['city_list'] = $this->staff_model->get_city_list();
        //$data['role_list'] = $this->staff_model->get_role_list();
        // print_r($staffid);exit;
        $data['userlist_edit_details'] = $this->staff_model->get_stafflist_by_id_userlist($stid);

        //$this->load->view('staff/staff_edit',$data);
    }
    //To update Staff
    public function staff_update()
    {    
        $data['edit_staff'] = $this->input->post('edit_staff');       
        $data['edit_staff_company'] = $this->input->post('edit_staff_company'); 
        $data['staff_id_edit'] = $this->input->post('edit_sid_staff_list');
        $data['staff_name_edit'] = $this->input->post('edit_sname_staff_list');
        $data['staff_fname_edit'] = $this->input->post('edit_fname_staff_list');
        $data['staff_gender_edit'] = $this->input->post('edit_staffgender_staff_list');
        $data['staff_city_edit'] = $this->input->post('edit_staff_city'); 
        $data['staff_aadharno_edit'] = $this->input->post('edit_saadharno_staff_list');
        $data['staff_idproof_edit'] = $this->input->post('edit_sidproof_staff_list');
        $data['staff_phone_edit'] = $this->input->post('edit_sphone_staff_list');
        $data['staff_dob_edit'] = $this->input->post('edit_dob_staff_list');
        $data['staff_age_edit'] = $this->input->post('edit_sage_staff_list');
        $data['staff_doj_edit'] = $this->input->post('edit_doj_staff_list');
        $data['staff_relvdate_edit'] = $this->input->post('edit_relvddate_staff_list');
        $data['staff_dept_edit'] = $this->input->post('edit_sdept_staff_list');
        $data['staff_desig_edit'] = $this->input->post('edit_sdesig_staff_list');
        $data['staff_role_edit'] = $this->input->post('edit_staff_role');
        $data['staff_uname_edit'] = $this->input->post('edit_suname_staff_list');
        $data['staff_passwd_edit'] = encrypt_decrypt($this->input->post('edit_spw_staff_list'),'encrypt');
        $data['staff_trans_passwd_edit'] = encrypt_decrypt($this->input->post('edit_staff_tpwd'),'encrypt');
        //$data['staff_passwd_edit'] = $this->input->post('edit_spw_staff_list');
        $data['staff_wrkhrs_edit'] = $this->input->post('edit_swrkhrs_staff_list');
        $data['staff_minleavedays_edit'] = $this->input->post('edit_sminleavedays_staff_list');
        $data['staff_address_edit'] = $this->input->post('edit_saddress_staff_list');
        $data['staff_mobappallw_edit'] = $this->input->post('mobileapp_edit');
        $data['staff_staffphoto_edit'] = $this->input->post('edit_sphoto_staff_list');
        $data['staff_idphoto_edit'] = $this->input->post('edit_id_photo_staff_list');
        $data['staff_basicsalry_edit'] = $this->input->post('edit_sbassal_staff_list');
        $data['staff_pfpermonth_edit'] = $this->input->post('pfpermonth_edit');
        $data['staff_allwone_edit'] = $this->input->post('allwone_edit');
        $data['staff_allwtwo_edit'] = $this->input->post('allwtwo_edit');
        $data['staff_allwthree_edit'] = $this->input->post('allwthree_edit');
        $data['staff_incentive_edit'] = $this->input->post('incentive_edit');
        $data['staff_leavded_edit'] = $this->input->post('leaveded_edit');
        $data['staff_netsal_edit'] = $this->input->post('edit_snetsal_staff_list');
       

 // Staff Permission Edit - Start

        $menu_id=$this->input->post('menu_id_edit');
       
        $menuid=explode(",",implode(",",$this->input->post('menuid')));
        // print_r( $menuid);

        for($i=0;$i<count($menuid);$i++)
        {  
            // print_r($menuid[$i]); 
            // echo $menuid[$i]."<br>";//29
            $rmenu=$this->input->post('menu_id_edit['.$menuid[$i].']');//29-selected or not
            // echo $rmenu."--->";
            $is_main_menu=$this->db->query("select * from MENU where MENU_ID=".$menuid[$i])->row();
            // print_r($is_main_menu->VALUE);
            $value=explode('~',$is_main_menu->VALUE);

            $permission_set='';
            foreach($value as $vlist){
               $v =$this->input->post(''.$vlist.'permission['.$menuid[$i].']');
            //    print_r($menuid[$i]);
            // print_r($v);

            if(isset($v))
            {
                if($permission_set=='')
                {
                    $permission_set=$v;
                }
                else{
                    $permission_set.='~'.$v;
                }               
            }
            else{
                if($permission_set=='')
                {
                    $permission_set='0';
                }
                else{
                    $permission_set.='~0';
                } 

            }

           
            }
            // echo $permission_set;
            $chk_perm_avail=$this->db->query("SELECT * FROM STAFF_PERMISSION WHERE STAFF_ID=".$data['edit_staff']." AND MENU_ID=".$menuid[$i])->row();
            if(isset($chk_perm_avail))
            {
            $update=$this->db->query("UPDATE STAFF_PERMISSION SET  VALUE='".$permission_set."'  WHERE STAFF_ID='".$data['edit_staff']."' AND MENU_ID='".$menuid[$i]."'  ");
            }
            else{
              $insert  =$this->db->query("INSERT INTO STAFF_PERMISSION (STAFF_ID,MENU_ID,VALUE)VALUES('".$data['edit_staff']."','".$menuid[$i]."','".$permission_set."')");
            }
            // print_r('<br>');

            if($is_main_menu->IS_PARENT=='0' && $is_main_menu->PARENT_MENU_ID=='0')
            {
                $rmenu_view=$this->input->post('Viewpermission['.$menuid[$i].']');
                // $rmenu_view=1;
                if($rmenu_view=='')$rmenu_view=0;
                if($rmenu_view==0)
                {
                    $rmenu_permission='';
                }
                else
                {
                    $rmenu_permission=$rmenu_view;
                }
            }
            else if($is_main_menu->IS_PARENT=='1' && $is_main_menu->PARENT_MENU_ID=='0' && $is_main_menu->VALUE=='View')
            {
                $rmenu_view=$this->input->post('Viewpermission['.$menuid[$i].']');
                // $rmenu_permission=1;
                 if($rmenu_view=='')$rmenu_view=0;
                if($rmenu_view==0)
                {
                    $rmenu_permission='';
                }
                else
                {
                    $rmenu_permission=$rmenu_view;
                }
            }
            else if($is_main_menu->IS_PARENT=='1' && $is_main_menu->PARENT_MENU_ID=='0' && $is_main_menu->VALUE!='View')
            {
                $rmenu_add=$this->input->post('Addpermission['.$menuid[$i].']');
                $rmenu_edit=$this->input->post('Editpermission['.$menuid[$i].']');
                $rmenu_del=$this->input->post('Deletepermission['.$menuid[$i].']');
                $rmenu_view=$this->input->post('Viewpermission['.$menuid[$i].']');
                $rmenu_verify=$this->input->post('Verifypermission['.$menuid[$i].']');

                if($rmenu_add=='') $rmenu_add=0;
                if($rmenu_edit=='')$rmenu_edit=0;
                if($rmenu_del=='')$rmenu_del=0;
                if($rmenu_view=='')$rmenu_view=0;
                if($rmenu_verify=='')$rmenu_verify=0;
                
                if($rmenu_add ==0 && $rmenu_edit==0 && $rmenu_view==0 && $rmenu_del==0 && $rmenu_verify==0)
                {
                    $rmenu_permission='';
                }
                else
                {
                    $rmenu_permission=$rmenu_view."~".$rmenu_add."~".$rmenu_edit."~".$rmenu_del."~".$rmenu_verify;
                }
            }
            elseif($is_main_menu->IS_PARENT=='0' && $is_main_menu->PARENT_MENU_ID>0)
            {
                $rmenu_add=$this->input->post('Addpermission['.$menuid[$i].']');
                $rmenu_edit=$this->input->post('Editpermission['.$menuid[$i].']');
                $rmenu_del=$this->input->post('Deletepermission['.$menuid[$i].']');
                $rmenu_view=$this->input->post('Viewpermission['.$menuid[$i].']');
                $rmenu_verify=$this->input->post('Verifypermission['.$menuid[$i].']');

                if($rmenu_add=='') $rmenu_add=0;
                if($rmenu_edit=='')$rmenu_edit=0;
                if($rmenu_del=='')$rmenu_del=0;
                if($rmenu_view=='')$rmenu_view=0;
                if($rmenu_verify=='')$rmenu_verify=0;
                
                if($rmenu_add ==0 && $rmenu_edit==0 && $rmenu_view==0 && $rmenu_del==0 && $rmenu_verify==0)
                {
                    $rmenu_permission='';
                }
                else
                {
                    $rmenu_permission=$rmenu_view."~".$rmenu_add."~".$rmenu_edit."~".$rmenu_del."~".$rmenu_verify;
                }
            }
            

            $chk_perm_avail=$this->db->query("SELECT * FROM STAFF_PERMISSION WHERE STAFF_ID=".$data['edit_staff']." AND MENU_ID=".$menuid[$i])->row();
            if(isset($chk_perm_avail))
            {
                if($rmenu_permission=='')
                {
                    $del_role_permission=$this->db->query("DELETE FROM STAFF_PERMISSION WHERE STAFF_ID='".$data['edit_staff']."' AND MENU_ID='".$menuid[$i]."'");   
              
                }
            }

            if($rmenu_permission!='')
            {
                
                if(isset($chk_perm_avail))
                {
                    // echo "UPDATE ROLE_PERMISSION SET VALUE='".$rmenu_permission. "' WHERE ROLE_ID='".$role_id."' AND MENU_ID='".$menuid[$i]."'"."<br>";
                    // $upd_role_permission=$this->db->query("UPDATE STAFF_PERMISSION SET VALUE='".$rmenu_permission. "' WHERE STAFF_ID='".$data['edit_staff']."' AND MENU_ID='".$menuid[$i]."'");                
            //   print_r("UPDATE STAFF_PERMISSION SET VALUE='".$rmenu_permission. "' WHERE STAFF_ID='".$data['edit_staff']."' AND MENU_ID='".$menuid[$i]."'");
            //   print_r('<br>');
                }
               else
                {
                    // echo "INSERT INTO ROLE_PERMISSION (ROLE_ID,MENU_ID,VALUE)VALUES('".$role_id."','".$menuid[$i]."','".$rmenu_permission."')"."<br>";

                    // $ins_role_permission=$this->db->query("INSERT INTO STAFF_PERMISSION (STAFF_ID,MENU_ID,VALUE)VALUES('".$data['edit_staff']."','".$menuid[$i]."','".$rmenu_permission."')");
                }
            }
            
        }
        // Staff Permission Edit - End

        $result = $this->staff_model->update_staff($data);

       

        $result_usered = $this->staff_model->update_user_ed($data);

        if($result)
        {
            $this->session->set_flashdata('g_success', 'Staff details have been Updated successfully...');
        }else{
           $this->session->set_flashdata('g_err', 'Could not update Staff details!');
        }
        // exit();
        redirect('staff');
    }


    public function staff_phone_unique()
    {
        $val = $_POST['value'];
        $result = $this->staff_model->staff_phone_unique($val);
        echo count((array)$result);
    }
    public function staff_phone_unique_edit()
    {
        $val = $_POST['value'];
        $result = $this->staff_model->staff_phone_unique_edit($val);
        echo count((array)$result);
    }

    // To View the staff Details

    public function staff_view()
    {
        
        $st_vw = $_POST['id'];
        // $data['company_list'] = $this->staff_model->get_company_list();
        // $data['city_list'] = $this->staff_model->get_city_list();
        // $data['role_list'] = $this->staff_model->get_role_list();
        $data['staff_view_details'] = $this->staff_model->get_staff_by_staff_id_view($st_vw);
        $this->load->view('staff/staff_view',$data);

    }
}
?>