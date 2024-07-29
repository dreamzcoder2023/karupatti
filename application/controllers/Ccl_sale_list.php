<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/* ************************************************************************************
        Purpose : To handle all the village functions
***************************************************************************************/
class Ccl_sale_list extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();


        $this->load->model(array("Redemption_model","Accountsgroup_model",
            "Loan_model","Loanreceipt_model","JewelSettlement_model"));
        
      
        if (isset($this->session->userdata['username']) && $this->session->userdata['username'] == TRUE)
        {
            

        }else{
            redirect('login'); //if session is not there, redirect to login page
        } 
        date_default_timezone_set("Asia/Kolkata");
      
        $this->session->set_userdata('comtitle', 'CCL Sale List');
    }
    
    public function index()
    {
       
      $data['ccl_pending']=$this->db->query("select  * from ccl_sale_list where ccl_status!='Accept'")->result_array();
      $data['ccl_closing']=$this->db->query("select  * from ccl_sale_list where ccl_status='Accept'")->result_array();
        $this->load->view('Ccl_sale_list/ccl_sale_list',$data);
        
    }
    public function ccl_sale_list_view()
    {
        $bno=$this->input->post('bno');
        // $bill_no=str_replace('_', "/", $bno);
        $data['ccl_sale_list']=$this->db->query("select * from  ccl_sale_list where ccl_sale_list_id=".$bno)->row();
        $data['ccl_sale_details_list']=$this->db->query("select * from  ccl_sale_list where ccl_sale_list_id=".$bno)->result_array();
        $data['updated_pledge_list']=$this->db->query("select * from  FSD_UPDATED_PLEDGEINFO where BILLNO='".$data['ccl_sale_list']->billno."'")->result_array();
        $this->load->view("ccl_sale_list/ccl_sale_view",$data);
    }
    public function ccl_sale_list_edit()
    {
        $bno=$this->input->post('bno');
        // $bill_no=str_replace('_', "/", $bno);
        $data['ccl_sale_list']=$this->db->query("select * from  ccl_sale_list where ccl_sale_list_id=".$bno)->row();
        $data['ccl_sale_details_list']=$this->db->query("select * from  ccl_sale_list where ccl_sale_list_id=".$bno)->result_array();
        $data['updated_pledge_list']=$this->db->query("select * from  FSD_UPDATED_PLEDGEINFO where BILLNO='".$data['ccl_sale_list']->billno."'")->result_array();
        $this->load->view("ccl_sale_list/ccl_sale_edit",$data);
    }
    public function old_gold_purchase()
    {
       
      $data['ccl_list']=$this->db->query("select  * from ccl_sale_list ")->result_array();
      
        $this->load->view('ccl_sale_list/old_gold_purchase_list',$data);
        
    }
    public function send_to_ccl_sale_list()
    {
        $bill_no=$this->input->post('bill_no');
        // $cmp=$this->input->post('company_code');
        $pid=$this->input->post('party_id');   

        $pl_amt=$this->input->post('p_l_amount');
        $pl_status=$this->input->post('is_profit_loss');
        $ccl_sale_amt=$this->input->post('new_sales_amount');
        $orgnl_sale_amt=$this->input->post('ccl_orgnl_amt');
        $sell_to_company='004';

        $ccl_res= $this->db->query("UPDATE ccl_sale_list set orgnl_sale_amt='".$orgnl_sale_amt."',curr_sales_amount ='".$ccl_sale_amt."',is_profit_loss='".$pl_status."',profit_loss_amount='".$pl_amt."',ccl_status='".'Request'."' where billno='".$bill_no."' and pid='".$pid."'");

        $last_ccl=$this->db->query("Select top 1 ccl_sale_list_id from ccl_sale_list where billno='".$bill_no."' and pid='".$pid."' order by created_on desc")->row();

        $ccl_hist_res= $this->db->query("INSERT INTO ccl_sale_req_rej_history (ccl_sale_id, req_rej_date,is_req_rej, description, created_on,created_by,status,new_sales_amount) VALUES('".$last_ccl->ccl_sale_list."','".date('Y-m-d H:i:s ')."','Request','','".date('Y-m-d H:i:s')."','".$_SESSION['username']."',0,".$ccl_sale_amt.")");

          $upd=$this->db->query("UPDATE LOANS SET IS_LOCK_OUT=3 WHERE BILLNO='".$bill_no."'");
          $upd=$this->db->query("UPDATE REDEMPTIONS SET CHK_RETURNED='Y' WHERE BILLNO='".$bill_no."'");
          
          save_query_in_log();
          redirect("ccl_sale_list");
    }
    public function old_gold_purchase_view()
    {
        $bno=$this->input->post('bno');
        // $bill_no=str_replace('_', "/", $bno);
        $data['ccl_sale_list']=$this->db->query("select * from  ccl_sale_list where ccl_sale_list_id=".$bno)->row();
        $data['ccl_sale_details_list']=$this->db->query("select * from  ccl_sale_list where ccl_sale_list_id=".$bno)->result_array();
        $data['updated_pledge_list']=$this->db->query("select * from  FSD_UPDATED_PLEDGEINFO where BILLNO='".$data['ccl_sale_list']->billno."'")->result_array();
        $this->load->view("ccl_sale_list/old_gold_purchase_view",$data);
    }
    public function ccl_reject()
    {
        $bno=$this->input->post('bno');
        $id=$this->input->post('ccl_id');
        $desc=$this->input->post('desc');
        $ccl_sale_amt=$this->input->post('ccl_sale_amt');

        // $ccl_sale_list=$this->db->query("select * from  ccl_sale_list where ccl_sale_list_id=".$id)->row();
        
        $ccl_hist_res= $this->db->query("INSERT INTO ccl_sale_req_rej_history (ccl_sale_id, req_rej_date,is_req_rej, description, created_on,created_by,status,new_sales_amount) VALUES('".$id."','".date('Y-m-d H:i:s ')."','Reject','".$desc."','".date('Y-m-d H:i:s')."','".$_SESSION['username']."','0',".$ccl_sale_amt.")");

        if($ccl_hist_res)
        {
        $ccl_res=$this->db->query("update ccl_sale_list set ccl_status='Reject', description='".$desc."',modified_on='".date('Y-m-d H:i:s ')."',modified_by='".$_SESSION['username']."' where ccl_sale_list_id=".$id);
        }
        // $data['ccl_list']=$this->db->query("select  * from ccl_sale_list ")->result_array();
      
        if($ccl_res)
        {
            echo 1;    
        }
        else
        {
            echo 0;
        }
        
        // $this->load->view('ccl_sale_list/old_gold_purchase_list',$data);
        // redirect("Ccl_sale_list/old_gold_purchase",$data);

         
    }
    public function ccl_accept()
    {
        $bno=$this->input->post('bno');
        $id=$this->input->post('ccl_id');
        $desc=$this->input->post('desc');
        $ccl_sale_amt=$this->input->post('ccl_sale_amt');

        $ccl_hist_res= $this->db->query("INSERT INTO ccl_sale_req_rej_history (ccl_sale_id, req_rej_date,is_req_rej, description, created_on,created_by,status,new_sales_amount) VALUES('".$id."','".date('Y-m-d H:i:s ')."','Accept','".$desc."','".date('Y-m-d H:i:s')."','".$_SESSION['username']."','0',".$ccl_sale_amt.")");

        if($ccl_hist_res)
        {
        $ccl_res=$this->db->query("update ccl_sale_list set ccl_status='Accept', description='".$desc."',modified_on='".date('Y-m-d H:i:s ')."',modified_by='".$_SESSION['username']."' where ccl_sale_list_id=".$id);
        }
              
        if($ccl_res)
        {
            echo 1;    
        }
        else
        {
            echo 0;
        }
        
        // $this->load->view('ccl_sale_list/old_gold_purchase_list',$data);
        // redirect("Ccl_sale_list/old_gold_purchase",$data);

         
    }
    public function ccl_description()

    {
        $id=$this->input->post("id");
        $ccl_res=$this->db->query("select * from ccl_sale_list where ccl_sale_list_id=".$id)->row();
        echo $ccl_res->description;
    }
}
?>