<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/* ************************************************************************************
		Purpose : To handle all the Accountsgroup functions
***************************************************************************************/
class Accountsgroup extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->model(array("Accountsgroup_model"));
        $fin_year=$this->Accountsgroup_model->get_fin_years_list();
        $db=substr($fin_year->DBNAME,0,strlen($fin_year->DBNAME)-4);
        // print_r(substr($fin_year->DBNAME,0,strlen($fin_year->DBNAME)-4));
        // exit;
        $config_app = switch_db_dynamic($db);
        $this->Accountsgroup_model->other_db = $this->load->database($config_app,TRUE);

		//if ($this->session->userdata['username'] == TRUE)
		if (isset($this->session->userdata['username']) && $this->session->userdata['username'] == TRUE)
        {
            

        }else{
            redirect('login'); //if session is not there, redirect to login page
        } 
		date_default_timezone_set("Asia/Kolkata");
		$this->session->set_userdata('comtitle', 'Accounts Group');
	}
	public function index()
	{
        $status = $this->input->post('acc_grp');
        // $status=$_POST['sts'];
        $data['acc_grp'] = $status;
        if($status == '')
        {
            $sts = "";
        }
        else 
        {
            $sts = " AND AC_SUPER_ID= '".$status."' ";
            // echo $data['acc_grp'];
             // echo $sts;exit();
        }

		$data['acc_grp_list'] = $this->Accountsgroup_model->get_acc_group_list($sts);
        $data['under_grp_list'] = $this->Accountsgroup_model->get_under_grp_list();
        $data['prefix_count']=$this->Accountsgroup_model->get_count_value();
        // print_r($data['acc_grp']);
		$this->load->view('accountsgroup/acc_group_list',$data);
	}
    public function get_under_grp_details()
    {
        $grp=$_POST['ug'];
        // echo $grp;exit();
        $u_grp_list = $this->Accountsgroup_model->get_under_grp_details($grp);
        echo $u_grp_list->UNDER_GROUP.'||'.$u_grp_list->AC_SUPER_ID;
    }
    public function get_under_grp_details_edit()
    {
        $grp=$_POST['ug'];
        // echo $grp;exit();
        $u_grp_list = $this->Accountsgroup_model->get_under_grp_details_edit($grp);
        echo $u_grp_list->UNDER_GROUP.'||'.$u_grp_list->AC_SUPER_ID;
    }
    public function accountsgroup_save()
    {
        $data['grp_sno']=$this->input->post('grp_sno');
        $data['grp_name']=strtoupper($this->input->post('grp_name'));
        $data['under_grp']=$this->input->post('under_grp');
        $data['description']=$this->input->post('description');
        $u_grp_list = $this->Accountsgroup_model->get_under_grp_details($data['under_grp']);
        $data['group_id']=$u_grp_list->GROUP_SNO;
        $data['super_id']=$u_grp_list->AC_SUPER_ID;
        $data['grp_level']=$u_grp_list->GROUP_LEVEL;
        $data['grp_side']=$u_grp_list->GROUP_SIDE;
        $data['get_addr']=$u_grp_list->GETADDRESS;
        $data['visible']="Y";
        $data['primary']="N";
        $data['pre_defined']="N";
        // $data['pre_defined']="N";
        // $data['pre_defined']="N";
        // $u_grp_list = $this->Accountsgroup_model->get_under_grp_details($grp);
        $result = $this->Accountsgroup_model->acc_group_save($data);
          if($result){
                $this->session->set_flashdata('g_success', 'Account Group have been Added successfully...');
          }else{
               $this->session->set_flashdata('g_err', 'Could not add Account Group details!');
          }
        redirect('Accountsgroup'); 

    }
     public function acc_grp_unique()
    {
        $val = $_POST['value'];
        // $ccode = $_SESSION['COMPANYCODE'];
        $result = $this->Accountsgroup_model->acc_grp_unique($val);
        echo count((array)$result);
    }
    public function acc_grp_edit()
    {
        // print_r($_POST['id']);
        $cid = $_POST['id'];

        $data['under_grp_list'] = $this->Accountsgroup_model->get_under_grp_list();
        $data['acc_grp_list'] = $this->Accountsgroup_model->get_acc_by_acc_id($cid);
        $ug_name=$data['acc_grp_list']->UNDER_GROUP;
        // echo $ug_name;exit();
        $data['acc_grp_details'] = $this->Accountsgroup_model->get_lbl_text_edit($ug_name);
        $this->load->view('accountsgroup/acc_group_edit',$data);
    }
    public function acc_grp_update()
    {
        $data['grp_sno']=$this->input->post('acc_grp_id_edit');
        $data['grp_name']=strtoupper($this->input->post('grp_name_edit'));
        $data['under_grp']=$this->input->post('under_grp_edit');
        $data['description']=$this->input->post('description_edit');
        $u_grp_list = $this->Accountsgroup_model->get_under_grp_details($data['under_grp']);
        $data['group_id']=$u_grp_list->GROUP_SNO;
        $data['super_id']=$u_grp_list->AC_SUPER_ID;
        $data['grp_level']=$u_grp_list->GROUP_LEVEL;
        $data['grp_side']=$u_grp_list->GROUP_SIDE;
        $data['get_addr']=$u_grp_list->GETADDRESS;

        // $u_grp_list = $this->Accountsgroup_model->get_under_grp_details($grp);
        $result = $this->Accountsgroup_model->acc_grp_update($data);
          if($result){
                $this->session->set_flashdata('g_success', 'Account Group have been Updated successfully...');
          }else{
               $this->session->set_flashdata('g_err', 'Could not update Account Group details!');
          }
        redirect('Accountsgroup'); 

    }
    public function acc_grp_delete()
    {
        $uid = $data['bid']=$_POST['id'];
        $data['acc_grp_details'] = $this->Accountsgroup_model->get_sel_del_data($uid);
        $this->load->view('accountsgroup/acc_group_delete',$data);
    }

    public function delete()
    { 
        $bid=$_POST['field'];
        $result = $this->Accountsgroup_model->acc_grp_delete($bid);
        $res=explode("||", $result);
        if($res[0]>0 || $res[1]>0)
        {
            $msg="There are " .$res[0]. " Group(s) and " .$res[1]." Ledger(s) Under this Group. Delete is not Possible..! ";
            $this->session->set_flashdata('g_err', $msg);
        }
        else if ($result== TRUE) 
        {
            $this->session->set_flashdata('g_success', 'Accounts Group has been Deleted successfully.');
        }
        else
        {
            $this->session->set_flashdata('g_err', 'Accounts Group Could not be Deleted.');
        }
        redirect('Accountsgroup');
       
    }

}
?>