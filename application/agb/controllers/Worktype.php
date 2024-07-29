<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/* ************************************************************************************
        Purpose : To handle all the worktype functions
***************************************************************************************/
class Worktype extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model(array("Worktype_model"));
        //if ($this->session->userdata['username'] == TRUE)
        if (isset($this->session->userdata['username']) && $this->session->userdata['username'] == TRUE)
        {
            //do something
        }else{
            redirect('login'); //if session is not there, redirect to login page
        } 
        date_default_timezone_set("Asia/Kolkata");
        $this->session->set_userdata('comtitle', 'WORK TYPE');
    }

    //Worktype Edit
    public function worktype_edit()
    {
        $cid = $_POST['id'];
        $data['worktype_details'] = $this->Worktype_model->get_worktype_by_worktype_id($cid);
        $this->load->view('worktype/worktype_edit',$data);
    }

    public function worktype_view()
    {
        $cid = $_POST['id'];
        $data['worktype_details'] = $this->Worktype_model->get_worktype_by_worktype_id($cid);
        $this->load->view('worktype/worktype_view',$data);
    }
    public function index()
    {
        $data['worktype_list'] = $this->Worktype_model->get_worktype_list();
        $this->load->view('worktype/worktype_list',$data);
    }

    // public function worktype_add()
    // {
    //  $data['level_list'] = $this->Worktype_model->get_level_list();
    //  $this->load->view('worktype/worktype_add',$data);
    // }

    public function worktype_save()
    {
        // $data['worktype_id'] = $this->input->post('worktype_id');
        $data['worktype_name'] = $this->input->post('worktype');
        $data['created_on'] = date('Y-m-d H:i:s');
        $data['created_by'] = 1;

        $result = $this->Worktype_model->worktype_save($data);
          if($result){
                $this->session->set_flashdata('g_success', 'Worktype have been Added successfully...');
          }else{
               $this->session->set_flashdata('g_err', 'Could not add worktype details!');
          }
        redirect('Worktype'); 

    }

    public function worktype_update()
    {
        $data['worktype_id'] = $this->input->post('worktype_id');
        $data['worktype_name'] = $this->input->post('worktype_edit_name');
        $data['modified_on'] = date('Y-m-d H:i:s');
        $data['modified_by'] = 1;

        $result = $this->Worktype_model->worktype_update($data);
          if($result){
                $this->session->set_flashdata('g_success', 'Worktype have been Updated successfully...');
          }else{
               $this->session->set_flashdata('g_err', 'Could not update worktype details!');
          }
        redirect('Worktype'); 

    }

    //To Delete Department
    public function worktype_delete()
    {
        $uid = $data['bid']=$_POST['id'];
        $data['worktype_details'] = $this->db->query("SELECT * FROM WORKTYPE WHERE WORKTYPEID=".$uid)->row();
        $this->load->view('worktype/worktype_delete',$data);
    }

    public function delete()
    { 
        $bid=$_POST['field'];
        $result = $this->Worktype_model->worktype_delete($bid);
        if ($result) {
            $this->session->set_flashdata('g_success', 'Worktype has been Deleted successfully.');
        }
        else{
            $this->session->set_flashdata('g_err', 'Something went wrong');
        }
    }

     public function worktype_active(){
        $id = $this->input->post('id');
        $data['status'] = $this->input->post('status');
        $result = $this->Worktype_model->worktype_active($data,$id);
        echo $data['status'];
        if ($result) {
            if ($data['status']==0) {
            $this->session->set_flashdata('g_success', 'Work Type has been Deactive successfully.');
            }else{
                $this->session->set_flashdata('g_success', 'Work Type has been Active successfully.');
            }
        }
        else{
            $this->session->set_flashdata('g_err', 'Something went wrong');
        }
    }
     public function worktype_unique()
    {
        $val = $_POST['value'];
        // $ccode = $_SESSION['COMPANYCODE'];
        $result = $this->Worktype_model->worktype_unique($val);
        echo count((array)$result);
    }
     public function worktype_unique_edit()
    {
        $val = $_POST['value'];
        $dcid = $_POST['dcid'];
        $result = $this->Worktype_model->worktype_unique_edit($val,$dcid);
        echo count((array)$result);
    }

}
?>