<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/* ************************************************************************************
		Purpose : To handle all Todo functions 2024-01-31 By Vasanth
***************************************************************************************/
class Todo extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model(array("Todo_model"));
    	$this->load->library('user_agent');
    	if (isset($this->session->userdata['username']) && $this->session->userdata['username'] == TRUE)
        {
            //do something
        }else{
            redirect('login'); //if session is not there, redirect to login page
        } 
		date_default_timezone_set("Asia/Kolkata");
    	$this->session->set_userdata('comtitle', 'Todo');
	}

    public function index()
    {   

        $data['userlist']         = $this->Todo_model->get_user_list();
        $data['todoincomplete']   = $this->Todo_model->todoincomplete_list();
        $data['todocomplete']     = $this->Todo_model->todocomplete_list();

        $this->load->view('todo/todo_list',$data);  
    }


    public function announce_active()

    {
        $id = $this->input->post('id');
        $data['status'] = $this->input->post('status');
        $result = $this->Todo_model->announce_active_status($data,$id);
        echo 1;
    } 

    //To save TODO
    public function add()
    {
     

        // exit();

        $data['todo_date']     = $this->input->post('todo_date');
        $data['todo_type']     = $this->input->post('todo_type');
        $data['tododesc']      = $this->input->post('toddesc');        
        // $userids               = implode(',',$this->input->post('allocatedto'));
        $data['allocatedto']   = $this->input->post('allocatedto');
        $data['created_on']    = date('Y-m-d H:i:s');
        $data['created_by']    = $_SESSION['username'];
        $data['status']        = 1;

        $result = $this->Todo_model->addtodo($data);  
        
        // exit;
        if($result)
        {
            $this->session->set_flashdata('g_success', 'TO DO have been Added successfully...');
        }else{
           $this->session->set_flashdata('g_err', 'Could not add TO DO details!');
        }
        redirect('Todo');
    }
    // Complete status 
    public function completemulitple(){

        $checked     = $this->input->post('checked');
        $desc        = $this->input->post('completedesc');
            $i=0;
            if (isset($checked)) {
                foreach ($checked as $i => $val) {
                    if(isset($checked[$i])){
                       
                        // print_r($val);
                        if ($val) {
                            $result = $this->db->query("UPDATE todo SET status = 0 , remark='".$desc."' WHERE todoid = '".$val."'");
                        }
                     
                    }
                    $i++;
                }
            }

           if ($result) {
                 $this->session->set_flashdata('g_success', 'TO DO has been Completed successfully.');
            }
            else{
                $this->session->set_flashdata('g_err', 'Something went wrong');
            }
            redirect("Todo");

    }
    // InComplete status 
    public function incompletemulitple(){

        $checked   = $this->input->post('checkednotcom')?$this->input->post('checkednotcom'):[];
        $idget     = $this->input->post('idget');
        // print_r($checked);
        // print_r($idget);
        $arr = array_diff($idget, $checked);

        // print_r($arr);
        // exit;
            $i=0;
            if (isset($arr)) {
                foreach ($arr as $i => $val) {
                    if(isset($arr[$i])){
                        if ($val) {
                            $result = $this->db->query("UPDATE todo SET status = 1 WHERE todoid = '".$val."'");
                        }
                     
                    }
                    $i++;
                }
            }

            // exit;
           if ($result) {
                 $this->session->set_flashdata('g_success', 'ToDo has been In Completed successfully.');
            }
            else{
                $this->session->set_flashdata('g_err', 'Something went wrong');
            }
            redirect("Todo");

    }

    //To Delete TODO

    public function delete()
    { 
        $id=$_POST['id'];
        $result   = $this->db->query("UPDATE todo SET status = 2 WHERE todoid = '".$id."'");

        echo $result;
        if ($result) {
            $this->session->set_flashdata('g_success', 'TO DO has been Deleted successfully.');
        }
        else{
            $this->session->set_flashdata('g_err', 'Something went wrong');
        }

    }
    // View Todo 
    public function view()
    {   
        $pid      = $_GET['id'];
        $data     = $this->Todo_model->viewdata($pid);
        echo json_encode($data[0]);    
    }

    //Todo  Edit
        public function edit()
        {   

            $id = $_POST['id'];
            $data['edit']      = $this->Todo_model->editdata($id);
            $data['userlist']  = $this->Todo_model->get_user_list();

            $this->load->view('todo/todo_edit',$data);
        }


    

    //To update announcement
    public function update()
    {
        

        $data['edit_id'] = $this->input->post('edit_id');
        $data['todo_date']     = $this->input->post('todo_date_edit');
        $data['todo_type']     = $this->input->post('todo_type_edit');
        $data['tododesc']      = $this->input->post('toddesc_edit');        
        $data['todoremark']    = $this->input->post('todoremark_edit');        
        $data['allocatedto']   = $this->input->post('allocatedto_edit');
        $data['modified_on']   = date('Y-m-d H:i:s');
        $data['modified_by']   = $_SESSION['username'];

        
        $result = $this->Todo_model->updatetodo($data);    
        
        //      print_r($data);
        // exit();
        // exit;

        if($result)
        {
            $this->session->set_flashdata('g_success', 'Todo have been Updated successfully...');
        }else{
           $this->session->set_flashdata('g_err', 'Could not update Todo details!');
        }
        redirect('Todo');
    }
    public function todopositionsetfunc()
    {
        $position = $_POST['positiondata'];
        $typevalues     =  explode(',',$position,10000);

        $i=1;  
        foreach($typevalues as $valueee)
        {  
            $this->db->reconnect();
            $updatepositions = $this->db->query("UPDATE todo SET position_order='".$i."' WHERE todoid='".$valueee."'");
            save_query_in_log();
            $this->db->close();
            $i++;  
        }  

    }
    public function todopositioncompletedsetfunc()
    {

        $position = $_POST['positioncompleteddata'];
        $typevalues     =  explode(',',$position,10000);

        $i=1;  
        foreach($typevalues as $valueee)
        {  
            $this->db->reconnect();
            $updatepositions = $this->db->query("UPDATE todo SET position_order='".$i."' WHERE todoid='".$valueee."'");
            save_query_in_log();
            $this->db->close();
            $i++;  
        }  
    }

}
?>