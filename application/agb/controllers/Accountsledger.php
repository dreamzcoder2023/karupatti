<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/* ************************************************************************************
        Purpose : To handle all the village functions
***************************************************************************************/
class Accountsledger extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model(array("Accountsledger_model","Accountsgroup_model"));
        $fin_year=$this->Accountsgroup_model->get_fin_years_list();
        $db=substr($fin_year->DBNAME,0,strlen($fin_year->DBNAME)-4);
        
        $config_app = switch_db_dynamic($db);
        $this->Accountsledger_model->other_db = $this->load->database($config_app,TRUE);

        //if ($this->session->userdata['username'] == TRUE)
        if (isset($this->session->userdata['username']) && $this->session->userdata['username'] == TRUE)
        {
            

        }else{
            redirect('login'); //if session is not there, redirect to login page
        } 
        date_default_timezone_set("Asia/Kolkata");
        $this->session->set_userdata('comtitle', 'Accounts Ledger');
    }
    public function index()
    {
        $acc_type = $this->input->post('acc_grp');
        $acc_main = $this->input->post('acc_main_grp');
        $acc_sub = $this->input->post('acc_sub_grp');
        $party_chk=$this->input->post ('party_chk');
        
        $data['acc_type'] = $acc_type;
        $data['acc_main'] = $acc_main;
        $data['acc_sub'] = $acc_sub;
        $data['show_party'] = $party_chk;

        if($party_chk=="on")
        {
            if($acc_type=='ALL' && $acc_main=='ALL')
            {
                $cond_qry='';
            }
            else if($acc_type=='ALL' && $acc_main!='ALL')
            {
                $cond_qry=" AND GROUP_ID='".$acc_main."' ";
            }
            else if($acc_type!='ALL' && $acc_main=='ALL')
            {
                $cond_qry=" AND SUPER_ID='".$acc_type."' ";
            }
            else if($acc_type!='ALL' && $acc_main!='ALL')
            {
                $cond_qry=" AND GROUP_ID='".$acc_main."' ";
            }

            if($acc_main=='ALL' && $acc_sub!='ALL')
            {
                $cond_qry=" AND GROUP_ID='".$acc_sub."' ";
            }
            else if($acc_main!='ALL' && $acc_sub!='ALL')
            {
                $cond_qry=" AND GROUP_ID='".$acc_sub."' ";
            }
        }
        else
        {
            if($acc_type=='ALL' && $acc_main=='ALL')
            {
                $cond_qry=" AND GROUP_ID <> '10'";
            }
            else if($acc_type=='ALL' && $acc_main!='ALL')
            {
                $cond_qry=" AND GROUP_ID='".$acc_main."' AND GROUP_ID <> '10' ";
            }
            else if($acc_type!='ALL' && $acc_main=='ALL')
            {
                $cond_qry=" AND SUPER_ID='".$acc_type."' AND GROUP_ID <> '10' ";
            }
            else if($acc_type!='ALL' && $acc_main!='ALL')
            {
                $cond_qry=" AND GROUP_ID='".$acc_main."' AND GROUP_ID <> '10' ";
            }

            if($acc_main=='ALL' && $acc_sub!='ALL')
            {
                $cond_qry=" AND GROUP_ID='".$acc_sub."'  AND GROUP_ID <> '10' ";
            }
            else if($acc_main!='ALL' && $acc_sub!='ALL')
            {
                $cond_qry=" AND GROUP_ID='".$acc_sub."'  AND GROUP_ID <> '10' ";
            }
        }
        $cond_qry = $cond_qry. " ORDER BY CHK_PREDEFINED DESC,LEDGER_NAME ";

        $data['acc_ledger_list'] = $this->Accountsledger_model->get_acc_ledgers_list($cond_qry);
        $data['under_grp_list'] = $this->Accountsledger_model->get_under_grp_list();
        $data['prefix_count']=$this->Accountsledger_model->get_count_value();
        // print_r($data['acc_grp']);
        $this->load->view('accountsledger/acc_ledger_list',$data);
    }
    public function get_under_grp_details()
    {
        $grp=$_POST['ug'];
        $u_grp_list = $this->Accountsledger_model->get_under_grp_details($grp);
        echo $u_grp_list->UNDER_GROUP.'||'.$u_grp_list->AC_SUPER_ID.'||'.$u_grp_list->GETADDRESS;
    }
    public function get_under_grp_details_edit()
    {
        $grp=$_POST['ug'];
        // echo $grp;exit();
        $u_grp_list = $this->Accountsledger_model->get_under_grp_details_edit($grp);
        echo $u_grp_list->UNDER_GROUP.'||'.$u_grp_list->AC_SUPER_ID.'||'.$u_grp_list->GETADDRESS;
    }
    public function get_acc_main_grp_list()
    {
        $gid = $_POST['grpid'];
        $main_grp = $this->Accountsledger_model->get_acc_main_grp_list($gid);
        $option = '<option value="ALL">ALL</option>';
        foreach($main_grp as $mglist)
        {
            $option.='<option value="'.$mglist['GROUP_SNO'].'">'.$mglist['GROUP_NAME'].'</option>';
        }
        echo $option;
        //return $option;
    }
    public function get_acc_sub_grp_list()
    {
        $gid = $_POST['grpid'];
        $sub_grp = $this->Accountsledger_model->get_acc_sub_grp_list($gid);
        echo count($sub_grp);
        if(count($sub_grp)>0)
        {
        $option = '<option value="ALL">ALL</option>';
        foreach($sub_grp as $mglist)
            {
            $option.='<option value="'.$mglist['GROUP_SNO'].'">'.$mglist['GROUP_NAME'].'</option>';
        }
        
        }
        else
        {
            $option = '<option value="NOGROUPS">NOGROUPS</option>';
        }
        echo $option;
        //return $option;
    }
    public function accountsledger_save()
    {
        $data['ledger_sno']=$this->input->post('ledger_sno');
        $data['ledger_name']=strtoupper($this->input->post('ledger_name'));
        $data['under_grp']=$this->input->post('under_grp');
        $data['remarks']=$this->input->post('remarks');
        $data['opg_bal']=$this->input->post('opg_bal');
        $data['bal_side']=$this->input->post('bal_side');
        $u_grp_list = $this->Accountsledger_model->get_under_grp_details($data['under_grp']);
        $data['ledger_id']=$u_grp_list->GROUP_SNO;
        $data['super_id']=$u_grp_list->AC_SUPER_ID;
        $data['grp_level']=$u_grp_list->GROUP_LEVEL;
        $data['grp_side']=$u_grp_list->GROUP_SIDE;
        $data['get_addr']=$u_grp_list->GETADDRESS;
        $data['under_grp_name']=$u_grp_list->UNDER_GROUP;
        if($data['get_addr']=='Y')
        {
            $data['address']=$this->input->post('addr');
            $data['city']=$this->input->post('city');
            $data['state']=$this->input->post('state');
            $data['phone']=$this->input->post('phone');
            $data['email']=$this->input->post('email');
            $data['gst']=$this->input->post('gst');
            $data['pan_no']=$this->input->post('pan_no');
        }

        
        $data['pre_defined']="N";
        // $u_grp_list = $this->Accountsledger_model->get_under_grp_details($grp);
        $result = $this->Accountsledger_model->acc_ledger_save($data);
          if($result){
                $this->session->set_flashdata('g_success', 'Account Ledger have been Added successfully...');
          }else{
               $this->session->set_flashdata('g_err', 'Could not add Account Ledger details!');
          }
        redirect('accountsledger'); 

    }
     public function acc_ledger_unique()
    {
        $val = $_POST['value'];
        // $ccode = $_SESSION['COMPANYCODE'];
        $result = $this->Accountsledger_model->acc_ledger_unique($val);
        echo count((array)$result);
    }
      public function acc_ledger_unique_edit()
    {
        $val = $_POST['value'];
        // $ccode = $_SESSION['COMPANYCODE'];
        $result = $this->Accountsledger_model->acc_ledger_unique_edit($val);
        echo count((array)$result);
    }

    public function acc_ledger_edit()
    {
        $cid = $_POST['id'];

        $data['under_grp_list'] = $this->Accountsledger_model->get_under_grp_list();
        $data['acc_ledger_list'] = $this->Accountsledger_model->get_acc_by_acc_id($cid);
        $ug_name=$data['acc_ledger_list']->GROUP_NAME;
        // echo $ug_name;exit();
        $data['acc_ledger_details'] = $this->Accountsledger_model->get_lbl_text_edit($ug_name);
        $this->load->view('accountsledger/acc_ledger_edit',$data);
    }
    
     public function accountsledger_update()
    {
        $data['ledger_sno']=$this->input->post('ledger_sno_edit');
        $data['ledger_name']=strtoupper($this->input->post('ledger_name_edit'));
        $data['under_grp']=$this->input->post('under_grp_edit');
        $data['under_grp_name']=$this->Accountsledger_model->get_acc_sub_grp_name($data['under_grp']);

        $data['remarks']=$this->input->post('remarks_edit');
        $data['opg_bal']=$this->input->post('opg_bal_edit');
        $data['bal_side']=$this->input->post('bal_side_edit');
        $u_grp_list = $this->Accountsledger_model->get_under_grp_details_edit($data['under_grp']);
        $data['ledger_id']=$u_grp_list->GROUP_SNO;
        $data['super_id']=$u_grp_list->AC_SUPER_ID;
        $data['grp_level']=$u_grp_list->GROUP_LEVEL;
        $data['grp_side']=$u_grp_list->GROUP_SIDE;
        $data['get_addr']=$u_grp_list->GETADDRESS;
        // $data['under_grp_name']=$u_grp_list->UNDER_GROUP;
        if($data['get_addr']=='Y')
        {
            $data['address']=$this->input->post('addr_edit');
            $data['city']=$this->input->post('city_edit');
            $data['state']=$this->input->post('state_edit');
            $data['phone']=$this->input->post('phone_edit');
            $data['email']=$this->input->post('email_edit');
            $data['gst']=$this->input->post('gst_edit');
            $data['pan_no']=$this->input->post('pan_no_edit');
        }

        
        $data['pre_defined']="N";
        // print_r($data);
        // exit();
        // $u_grp_list = $this->Accountsledger_model->get_under_grp_details($grp);
        $result = $this->Accountsledger_model->acc_ledger_update($data);
          if($result){
                $this->session->set_flashdata('g_success', 'Account Ledger have been Updated successfully...');
          }else{
               $this->session->set_flashdata('g_err', 'Could not Update Account Ledger details!');
          }
        redirect('accountsledger'); 

    }

    public function acc_ledger_delete()
    {
        $uid = $data['bid']=$_POST['id'];
        $data['acc_ledger_details'] = $this->Accountsledger_model->get_sel_del_data($uid);
        $this->load->view('accountsledger/acc_ledger_delete',$data);
        
    }

    public function delete()
    { 
        $bid=$_POST['field'];
        $result = $this->Accountsledger_model->acc_ledger_delete($bid);
        $res=explode("||", $result);
        if($res[0]>0 || $res[1]>0)
        {
            $msg="There are " .$res[0]. " Ledger(s) and " .$res[1]." Ledger(s) Under this Ledger. Delete is not Possible..! ";
            $this->session->set_flashdata('g_err', $msg);
        }
        else if ($result== TRUE) 
        {
            $this->session->set_flashdata('g_success', 'Accounts Ledger has been Deleted successfully.');
        }
        else
        {
            $this->session->set_flashdata('g_err', 'Accounts Ledger Could not be Deleted.');
        }
        redirect('accountsledger');
       
    }

}
?>