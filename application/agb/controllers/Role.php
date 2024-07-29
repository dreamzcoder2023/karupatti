<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/* ************************************************************************************
        Purpose : To handle all Role functions 2022-08-19
***************************************************************************************/
class Role extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model(array("Role_model"));
        $this->load->library('user_agent');
        if (isset($this->session->userdata['username']) && $this->session->userdata['username'] == TRUE)
        {
            //do something
        }else{
            redirect('login'); //if session is not there, redirect to login page
        } 
        date_default_timezone_set("Asia/Kolkata");
        $this->session->set_userdata('comtitle', 'Role');
    }

    public function index()
    {
        $data['role_list'] = $this->Role_model->get_role_list();
        $this->load->view('role/role_list',$data);
    }

    public function role_active(){
        $id = $this->input->post('id');
        $data['status'] = $this->input->post('status');
        $data['modified_on'] = date('Y-m-d H:i:s');
        $data['modified_by'] = $_SESSION['USERID'];
        $result = $this->Role_model->role_active($data,$id);
        echo $data['status'];
        if ($result) {
            if ($data['status']==1) {
            $this->session->set_flashdata('g_success', 'Role has been Deactive successfully.');
            }else{
                $this->session->set_flashdata('g_success', 'Role has been Active successfully.');
            }
        }
        else{
            $this->session->set_flashdata('g_err', 'Something went wrong');
        }
    }

    public function role_unique()
    {
        $val = $_POST['value'];
        $ccode = $_SESSION['COMPANYCODE'];
        $result = $this->Role_model->role_unique($val,$ccode);
        echo count((array)$result);
    }

    public function role_add()
    {
        $data['menu_list']=$this->db->query("select * from MENU where PARENT_MENU_ID=0 order by MENU_ID asc")->result_array();
        // $data['sub_menu_list']=$this->db->query("select * from MENU where PARENT_MENU_ID>0 order by MENU_ID asc")->result_array();
        $this->load->view('role/role_add',$data);
    }
    public function fetch_sub_menu_details()
    {
        $menu_id=$this->input->post('value');
        $sub_menu_list=$this->db->query("select * from MENU where PARENT_MENU_ID='".$menu_id."'")->result_array();
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
    public function fetch_menu_permission()
    {
        $menu_id=$this->input->post('value');
        // echo $menu_id;
        $sub_menu_list=$this->db->query("select VALUE from MENU where MENU_ID='".$menu_id."'")->row();
        
        echo "||".$sub_menu_list->VALUE;
    }
    //To save Role
    public function role_save()
    {
        $data['role'] = $this->input->post('role');
        $data['company_code'] = $_SESSION['COMPANYCODE'];
        $data['created_on'] = date('Y-m-d H:i:s');
        $data['created_by'] = $_SESSION['USERID'];
        $result = $this->Role_model->add_role($data);

        $menu_id=$this->input->post('menu_id');
        
        $menuid=explode(",",implode(",",$this->input->post('menuid')));
        // print_r( $menuid);
        // echo "<br><br>";
        // $addper=explode(",",implode(",",$this->input->post('Addpermission')));
        // $editper=implode(",",$this->input->post('Editpermission'));
        // $viewper=implode(",",$this->input->post('Deletepermission'));
        // $delper=implode(",",$this->input->post('Viewpermission'));


        $last_role=$this->db->query("SELECT TOP 1 * FROM ROLE WHERE STATUS!=2 ORDER BY ROLEID DESC ")->row();

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
            $ins_role_permission=$this->db->query("INSERT INTO ROLE_PERMISSION (ROLE_ID,MENU_ID,VALUE)VALUES('".$last_role->ROLEID."','".$menuid[$i]."','".$rmenu_permission."')");
            
        }
        
        // exit();

        
        if($result)
        {
            $this->session->set_flashdata('g_success', 'Role have been Added successfully...');
        }else{
           $this->session->set_flashdata('g_err', 'Could not add Role details!');
        }
        redirect('Role');
    }

    //Role Edit
    public function role_edit($cid)
    {
        $data['menu_list']=$this->db->query("select * from MENU where PARENT_MENU_ID=0 order by MENU_ID asc")->result_array();
        $data['role_details'] = $this->Role_model->get_role_by_role_id($cid);
        $this->load->view('role/role_edit',$data);
    }

    public function role_unique_edit()
    {
        $val = $_POST['value'];
        $dcid = $_POST['dcid'];
        $result = $this->Role_model->role_unique_edit($val,$dcid);
        echo count((array)$result);
    }

    //To update Role
    public function role_update()
    {
        $role_id=$this->input->post('role_id');
        $data['role_id'] = $this->input->post('role_id');
        $data['role'] = $this->input->post('role');
        $data['company_code'] = $_SESSION['COMPANYCODE'];
        $data['modified_on'] = date('Y-m-d H:i:s');
        $data['modified_by'] = $_SESSION['USERID'];

        

        $menu_id=$this->input->post('menu_id');        
        $menuid=explode(",",implode(",",$this->input->post('menuid')));
        // print_r( $menuid);
        // echo "<br><br>";
        // $addper=explode(",",implode(",",$this->input->post('Addpermission')));
        // $editper=implode(",",$this->input->post('Editpermission'));
        // $viewper=implode(",",$this->input->post('Deletepermission'));
        // $delper=implode(",",$this->input->post('Viewpermission'));


        // $last_role=$this->db->query("SELECT TOP 1 * FROM ROLE WHERE STATUS!=2 ORDER BY ROLEID DESC ")->row();

        for($i=0;$i<count($menuid);$i++)
        {
            // echo $menuid[$i]."<br>";//29
            $rmenu=$this->input->post('menu_id['.$menuid[$i].']');//29-selected or not
            // echo $rmenu."--->";
            $is_main_menu=$this->db->query("SELECT * FROM MENU WHERE MENU_ID=".$menuid[$i])->row();

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
            

            
            $chk_perm_avail=$this->db->query("SELECT * FROM ROLE_PERMISSION WHERE ROLE_ID=".$role_id." AND MENU_ID=".$menuid[$i])->row();
            if(isset($chk_perm_avail))
            {
                if($rmenu_permission=='')
                {
                   $del_role_permission = $this->db->query("DELETE FROM ROLE_PERMISSION WHERE ROLE_ID=".$role_id." AND MENU_ID=".$menuid[$i]);
 
              
                }
            }

            if($rmenu_permission!='')
            {
                $chk_perm_avail=$this->db->query("SELECT * FROM ROLE_PERMISSION WHERE ROLE_ID=".$role_id." AND MENU_ID=".$menuid[$i])->row();
                if(isset($chk_perm_avail))
                {
                    // print_r("UPDATE ROLE_PERMISSION SET VALUE='".$rmenu_permission. "' WHERE ROLE_ID='".$role_id."' AND MENU_ID='".$menuid[$i]."'");
                    // echo '<br>';    


                    $upd_role_permission=$this->db->query("UPDATE ROLE_PERMISSION SET VALUE='".$rmenu_permission. "' WHERE ROLE_ID='".$role_id."' AND MENU_ID='".$menuid[$i]."'");                
                }
               else
                {
                    // print_r("INSERT INTO ROLE_PERMISSION (ROLE_ID,MENU_ID,VALUE)VALUES('".$role_id."','".$menuid[$i]."','".$rmenu_permission."')");
                    // echo '<br>'; 

                    $ins_role_permission=$this->db->query("INSERT INTO ROLE_PERMISSION (ROLE_ID,MENU_ID,VALUE)VALUES('".$role_id."','".$menuid[$i]."','".$rmenu_permission."')");
                }
            }
            
        }
        // exit();
        $result = $this->Role_model->update_role($data);
        if($result)
        {
            $this->session->set_flashdata('g_success', 'Role have been Updated successfully...');
        }else{
           $this->session->set_flashdata('g_err', 'Could not update Role details!');
        }
        redirect('Role');
    }

    //To Delete Role
    public function role_delete()
    {
        $uid = $data['bid']=$_POST['id'];
        $data['role_details'] = $this->db->query("SELECT * FROM ROLE WHERE ROLEID='".$uid."'")->row();
        $this->load->view('role/role_delete',$data);
    }

    public function delete()
    { 
        $bid=$_POST['field'];
        $result = $this->Role_model->role_delete($bid);
        if ($result) {
            $this->session->set_flashdata('g_success', 'Role has been Deleted successfully.');
        }
        else{
            $this->session->set_flashdata('g_err', 'Something went wrong');
        }
    }

}
?>