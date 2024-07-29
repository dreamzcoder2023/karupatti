<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/* ************************************************************************************
		Purpose : To handle all Systems functions 09-09-2022
***************************************************************************************/
class Systems extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model(array("Systems_model"));
    	$this->load->library('user_agent');
    	if (isset($this->session->userdata['username']) && $this->session->userdata['username'] == TRUE)
        {
            //do something
        }else{
            redirect('login'); //if session is not there, redirect to login page
        } 
		date_default_timezone_set("Asia/Kolkata");
    	$this->session->set_userdata('comtitle', 'Systems');
	}

    public function index()
    {
        $data['systems_list'] = $this->Systems_model->get_systems_list();
        $this->load->view('systems/systems_list',$data);
    }

    public function systems_active()

    {
        $id = $this->input->post('id');
        $data['Active'] = $this->input->post('status');
        $result = $this->Systems_model->systems_active($data,$id);
        echo 1;
    }

    public function systems_save()
    {   
        
        $data['systems_name'] = $this->input->post('systems_name');
        $data['systems_code'] = $this->input->post('systems_code');
        $data['loanprefix'] = $this->input->post('loanprefix');

        $last_sys_id_detail = $this->Systems_model->get_last_sys_id_details();
  
        $last_data= $last_sys_id_detail->SYS_ID;
        //echo $last_data;exit;
        //$exlno = substr($last_data,5);
        $next_value = (int)$last_data + 1;
        $uid=str_pad($next_value,3,0,STR_PAD_LEFT);
        //$s_no=$r_no1;
        $data['sys_id'] = $uid;
        //print_r($data);exit;

        $result = $this->Systems_model->add_systems($data);
        if($result)
        {
            $this->session->set_flashdata('g_success', 'System have been Added successfully...');
        }else{
           $this->session->set_flashdata('g_err', 'Could not add System details!');
        }
        redirect('Systems');
    }

    //To Delete Systems
    public function systems_delete()
    {
        $sys_id = $data['sys_id']=$_POST['id'];
        $data['systems_details'] = $this->db->query("SELECT * FROM SYSTEMS WHERE SYS_ID='".$sys_id."'")->row();
        $this->load->view('systems/systems_delete',$data);
    }

    public function delete()
    { 
        $sys_id=$_POST['field'];
        $result = $this->Systems_model->systems_delete($sys_id);
        if ($result) {
            $this->session->set_flashdata('g_success', 'Systems has been Deleted successfully.');
        }
        else{
            $this->session->set_flashdata('g_err', 'Something went wrong');
        }
    }

//Systems Edit
    public function systems_edit()
    {
        $scid = $_POST['id'];
        $data['systems_details'] = $this->Systems_model->get_systems_by_systems_id($scid);
        $this->load->view('systems/systems_edit',$data);
    }

    public function systems_name_unique()
    {
        $val = $_POST['value'];
        // $sys_id = $_SESSION['sys_id'];
        $result = $this->Systems_model->systems_name_unique($val);
        echo count((array)$result);
    }

    public function systems_code_unique()
    {
        $val = $_POST['value'];
        // $sys_id = $_SESSION['sys_id'];
        $result = $this->Systems_model->systems_code_unique($val);
        echo count((array)$result);
    }

    public function loanprefix_unique()
    {
        $val = $_POST['value'];
        // $sys_id = $_SESSION['sys_id'];
        $result = $this->Systems_model->loanprefix_unique($val);
        echo count((array)$result);
    }


//To update Systems
    public function systems_update()
    {
        $data['sys_id_edit'] = $this->input->post('sys_id_edit');
        $data['systems_name_edit'] = $this->input->post('systems_name_edit');
        $data['systems_code_edit'] = $this->input->post('systems_code_edit');
        $data['loanprefix_edit'] = $this->input->post('loanprefix_edit');
       

        $result = $this->Systems_model->update_systems($data);
        if($result)
        {
            $this->session->set_flashdata('g_success', 'System details have been Updated successfully...');
        }else{
           $this->session->set_flashdata('g_err', 'Could not update System details!');
        }
        redirect('Systems');
    }
//To Check Unique in edit Modal
    public function systems_name_unique_edit()
    {
        $val = $_POST['value'];
        // $scid = $_POST['scid'];
        $result = $this->Systems_model->systems_name_unique_edit($val);
        echo count((array)$result);
    }
    public function systems_code_unique_edit()
    {
        $val = $_POST['value'];
        // $scid = $_POST['scid'];
        $result = $this->Systems_model->systems_code_unique_edit($val);
        echo count((array)$result);
    }
     public function loanprefix_unique_edit()
    {
        $val = $_POST['value'];
        // $scid = $_POST['scid'];
        $result = $this->Systems_model->loanprefix_unique_edit($val);
        echo count((array)$result);
    }

}
?>