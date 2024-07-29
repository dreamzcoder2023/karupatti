<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/* ************************************************************************************
		Purpose : To handle all Remainder functions 2024-02-03 By Vasanth
***************************************************************************************/
class Remainder extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model(array("Remainder_model"));
    	$this->load->library('user_agent');
    	if (isset($this->session->userdata['username']) && $this->session->userdata['username'] == TRUE)
        {
            //do something
        }else{
            redirect('login'); //if session is not there, redirect to login page
        } 
		date_default_timezone_set("Asia/Kolkata");
    	$this->session->set_userdata('comtitle', 'Remainder');
	}

    public function index()
    {   

        $data['userlist']         = $this->Remainder_model->get_user_list();
        $data['remainder_list']   = $this->Remainder_model->list();
        // $data['todocomplete']     = $this->Remainder_model->todocomplete_list();

        $this->load->view('remainder/remainder_list',$data);  
    }


     public function active_unactive()

    {
        $id = $this->input->post('id');
        $data['status'] = $this->input->post('status');
        $result = $this->db->query("UPDATE REMAINDER SET status = '".$data['status']."' WHERE remainderid = '".$id."'");
        echo $data['status'];
    } 

    //To save REMAINDER
    public function add()
    {

        $data['date']            = $this->input->post('remainder_date');
        $data['type']            = $this->input->post('remain_type');
        $data['selfid']          = $_SESSION['USERID'];
        $data['allocatedto']     = $this->input->post('allocatedto') ? $this->input->post('allocatedto') :[];
        $data['Recurringtype']   = $this->input->post('recur_type');
        if ($data['Recurringtype']==1) {
           $data['daily']           = $this->input->post('remainder_daily');
        }else{
            $data['daily']          = '';

        }
        if ($data['Recurringtype']==2) {
           $data['week']             = $this->input->post('remainder_weekly_time');
           $data['weekdays']         = $this->input->post('weekdays');
        }else{
            $data['week']            = '';
            $data['weekdays']        = '';
            
        }
        if ($data['Recurringtype']==3) {
           $data['month']           = $this->input->post('remainder_monthly');
        }else{
           $data['month']           = '';
            
        }
        if ($data['Recurringtype']==4) {
           $data['specificday']     = $this->input->post('remainder_speicific_date');
        }else{

            $data['specificday']    = '';
        }
        
        
        
        $data['description']     = $this->input->post('remainder_desc');
        $data['created_on']      = date('Y-m-d H:i:s');
        $data['created_by']      = $_SESSION['username'];
        $data['status']          = 1;

        // print_r($data);
        // exit();
        $result = $this->Remainder_model->addremainder($data);  
        
        // exit;
        if($result)
        {
            $this->session->set_flashdata('g_success', 'Remainder have been Added successfully...');
        }else{
           $this->session->set_flashdata('g_err', 'Could not add Remainder details!');
        }
        redirect('Remainder');
    }
    // Complete status 
    public function completemulitple(){

        $checked     = $this->input->post('checked');
        $desc        = $this->input->post('completedesc');
            $i=0;
            if (isset($checked)) {
                foreach ($checked as $i => $val) {
                    if(isset($checked[$i])){
                       
                        print_r($val);
                        if ($val) {
                            $result = $this->db->query("UPDATE REMAINDER SET status = 0 , remark='".$desc."' WHERE remainderid = '".$val."'");
                        }
                     
                    }
                    $i++;
                }
            }

           if ($result) {
                 $this->session->set_flashdata('g_success', 'Remainder has been Completed successfully.');
            }
            else{
                $this->session->set_flashdata('g_err', 'Something went wrong');
            }
            redirect("Remainder");

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
                            $result = $this->db->query("UPDATE REMAINDER SET status = 1 WHERE remainderid = '".$val."'");
                        }
                     
                    }
                    $i++;
                }
            }

            // exit;
           if ($result) {
                 $this->session->set_flashdata('g_success', 'Remainder has been In Completed successfully.');
            }
            else{
                $this->session->set_flashdata('g_err', 'Something went wrong');
            }
            redirect("Remainder");

    }

    //To Delete REMAINDER

    public function delete()
    { 
        $id=$_POST['id'];
        $result   = $this->db->query("UPDATE REMAINDER SET status = 2 WHERE remainderid = '".$id."'");

        echo $result;
        if ($result) {
            $this->session->set_flashdata('g_success', 'Remainder has been Deleted successfully.');
        }
        else{
            $this->session->set_flashdata('g_err', 'Something went wrong');
        }

    }
    // View Remainder 
    public function view()
    {   
        $pid      = $_GET['id'];
        $data     = $this->Remainder_model->viewdata($pid);
        echo json_encode($data[0]);    
    }

    //Remainder  Edit
        public function edit()
        {   

            $id = $_POST['id'];
            $data['edit']      = $this->Remainder_model->editdata($id);
            $data['userlist']  = $this->Remainder_model->get_user_list();

            $this->load->view('remainder/remainder_edit',$data);
        }


    

    //To update remainder
    public function update()
    {
            
            

        $data['edit_id'] = $this->input->post('edit_id');
        $data['date']            = $this->input->post('remainder_date_edit');
        $data['type']            = $this->input->post('remain_type_edit');
        $data['selfid']          = $_SESSION['USERID'];
        if ($data['type']==2) {
            $data['allocatedto']     = $this->input->post('allocatedto_edit') ? $this->input->post('allocatedto_edit') :'[""]';
        }else{

            $data['allocatedto']     ='[""]';
        }
        $data['Recurringtype']   = $this->input->post('recur_type_edit');
        if ($data['Recurringtype']==1) {
           $data['daily']           = $this->input->post('remainder_daily_edit');
        }else{
            $data['daily']          = '';

        }
        if ($data['Recurringtype']==2) {
           $data['week']             = $this->input->post('remainder_weekly_time_edit');
           $data['weekdays']         = $this->input->post('weekdays_edit');
        }else{
            $data['week']            = date("h:i A");
            $data['weekdays']        = '';
            
        }
        if ($data['Recurringtype']==3) {
           $data['month']           = $this->input->post('remainder_monthly_edit');
        }else{
           $data['month']           = date('Y-m-d H:i:s');
            
        }
        if ($data['Recurringtype']==4) {
           $data['specificday']     = $this->input->post('remainder_speicific_date_edit');
        }else{

            $data['specificday']    = date('Y-m-d H:i:s');
        }
        
        
        
        $data['description']     = $this->input->post('remainder_descedit');
        $data['modified_on']   = date('Y-m-d H:i:s');
        $data['modified_by']   = $_SESSION['username'];

        
        // print_r($data);
        // exit();
        $result = $this->Remainder_model->updateremainder($data);    

        if($result)
        {
            $this->session->set_flashdata('g_success', 'Remainder have been Updated successfully...');
        }else{
           $this->session->set_flashdata('g_err', 'Could not update Remainder details!');
        }
        redirect('Remainder');
    }
    public function todopositionsetfunc()
    {
        $position = $_POST['positiondata'];
        $typevalues     =  explode(',',$position,10000);

        $i=1;  
        foreach($typevalues as $valueee)
        {  
            $this->db->reconnect();
            $updatepositions = $this->db->query("UPDATE REMAINDER SET position_order='".$i."' WHERE remainderid='".$valueee."'");
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
            $updatepositions = $this->db->query("UPDATE REMAINDER SET position_order='".$i."' WHERE remainderid='".$valueee."'");
            save_query_in_log();
            $this->db->close();
            $i++;  
        }  
    }

}
?>