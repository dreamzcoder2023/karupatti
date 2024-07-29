<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/* ************************************************************************************
        Purpose : To handle all Chit functions 2022-08-18
***************************************************************************************/
class Chit extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model(array("Chit_model"));
        $this->load->library('user_agent');
        $this->load->library('excel');
        
        if (isset($this->session->userdata['username']) && $this->session->userdata['username'] == TRUE)
        {
            //do something
        }else{
            redirect('login'); //if session is not there, redirect to login page
        } 
        date_default_timezone_set("Asia/Kolkata");
        $this->session->set_userdata('comtitle','Chit');
    }
    /* ************************************************************************************
                        Purpose : To handle Chit List function 
            **********************************************************************/
    public function index()
    {


        $page       = isset($_GET['page']) ? $_GET['page'] : 1;
        $limit      = 10;
        $offset     = ($page - 1) * $limit +1;
        $page_limit = $offset+$limit-1;

        $data['party_fil'] = $this->input->post('party_fil');
        if($data['party_fil']!=''){
        $party_fil =" AND PARTIES.NAME  LIKE '%".$data['party_fil']."%' ";
        
        }
        else{
            $party_fil ='';
        }

        $data['count'] = count($this->db->query("SELECT PARTIES.NAME, PARTIES.PID, PARTIES.RATING, CHIT_MASTER.party_id
        FROM PARTIES
        INNER JOIN CHIT_MASTER ON PARTIES.PID = CHIT_MASTER.party_id WHERE CHIT_MASTER.status = 'Y' $party_fil ORDER BY CHIT_MASTER.sno DESC ")->result_array());

        $result = $this->Chit_model->get_chit_list($party_fil,$offset,$page_limit);
        // print_r($result);exit;
        $data['chit_list'] = $result;
        
        $arr = [];
        foreach($data['chit_list'] as $chit)
        {
            $pid = $chit['PID'];

            $part_sm_count = $this->db->query("SELECT COUNT(scheme_type) as sm_count FROM CHIT_LIST WHERE party_id = '".$pid."' AND scheme_type = '1' AND status = 'Y' ")->result_array();
            // print_r("SELECT COUNT(scheme_type) as sm_count FROM CHIT_LIST WHERE party_id = '".$pid."' AND scheme_type = '1' AND status = 'Y' ");exit;
            // print_r($part_sm_count);
            $part_tmc_count = $this->db->query("SELECT COUNT(scheme_type) as tmc_count FROM CHIT_LIST WHERE party_id = '".$pid."' AND scheme_type = '2' AND status = 'Y' ")->result_array();
            $part_tmg_count = $this->db->query("SELECT COUNT(scheme_type) as tmg_count FROM CHIT_LIST WHERE party_id = '".$pid."' AND scheme_type = '3' AND status = 'Y' ")->result_array();

            $part_sm_amt = $this->db->query("SELECT SUM(ava_balance) as sm_balance FROM CHIT_LIST WHERE party_id = '".$pid."' AND scheme_type = '1' AND status = 'Y' ")->result_array();
            $part_tmc_amt = $this->db->query("SELECT SUM(ava_balance) as tmc_balance FROM CHIT_LIST WHERE party_id = '".$pid."' AND scheme_type = '2' AND status = 'Y' ")->result_array();
            $part_tmg_amt = $this->db->query("SELECT SUM(ava_balance) as tmg_balance FROM CHIT_LIST WHERE party_id = '".$pid."' AND scheme_type = '3' AND status = 'Y' ")->result_array();


            $arr[] = [
                'pid' => $chit['PID'],
                'name' => $chit['NAME'],
                'rating' => $chit['RATING'],
                // 'balance' => $chit['ava_balance'],
                'sm_count' => $part_sm_count[0]['sm_count'],
                'tmc_count' => $part_tmc_count[0]['tmc_count'],
                'tmg_count' => $part_tmg_count[0]['tmg_count'],
                'sm_ava_balance' => $part_sm_amt[0]['sm_balance'],
                'tmc_ava_balance' => $part_tmc_amt[0]['tmc_balance'],
                'tmg_ava_balance' => $part_tmg_amt[0]['tmg_balance'],
            ];
        }
        // print_r($arr);exit;
        $data['arr'] = $arr;
        $sm_count = $this->db->query("SELECT COUNT(scheme_type) as sm_count FROM CHIT_LIST WHERE scheme_type = '1' AND status = 'Y' ")->result_array();
        // print_r($sm_count);
        $tmc_count = $this->db->query("SELECT COUNT(scheme_type) as tmc_count FROM CHIT_LIST WHERE scheme_type = '2' AND status = 'Y' ")->result_array();
        $tmg_count = $this->db->query("SELECT COUNT(scheme_type) as tmg_count FROM CHIT_LIST WHERE scheme_type = '3' AND status = 'Y' ")->result_array();

        $data['sm_count'] = $sm_count;
        $data['tmc_count'] = $tmc_count;
        $data['tmg_count'] = $tmg_count;
        // print_r($data['sm_count']);
        // $data['sm_count'] = $result['sm_count'][0]['count'] ;
        // $data['tm_c_count'] = $result['tm_c_count'][0]['count'] ;
        // $data['tm_g_count'] = $result['tm_g_count'][0]['count'] ;
      
        $this->load->view('chit/chit_list',$data);
    }
    public function chit_list()
    {

        $page       = isset($_GET['page']) ? $_GET['page'] : 1;
        $limit      = 10;
        $offset     = ($page - 1) * $limit +1;
        $page_limit = $offset+$limit-1;

        $data['party_fil'] = $this->input->post('party_fil');
        if($data['party_fil']!=''){
        $party_fil =" AND PARTIES.NAME  LIKE '%".$data['party_fil']."%'";
        
        }
        else{
            $party_fil ='';
        }

        $data['count'] = count($this->db->query("SELECT PARTIES.NAME, PARTIES.PID, PARTIES.RATING, CHIT_MASTER.party_id
        FROM PARTIES
        INNER JOIN CHIT_MASTER ON PARTIES.PID = CHIT_MASTER.party_id WHERE CHIT_MASTER.status = 'Y' $party_fil ORDER BY CHIT_MASTER.sno DESC ")->result_array());

      
        $result = $this->Chit_model->get_chit_list($party_fil,$offset,$page_limit);
        // print_r($result);exit;
        $data['chit_list'] = $result;
        $arr = [];
        foreach($data['chit_list'] as $chit)
        {
            $pid = $chit['PID'];
            // print_r($pid);
            // print_r("SELECT COUNT(scheme_type) as sm_count FROM CHIT_LIST WHERE party_id = '".$pid."' AND scheme_type = '1' AND status = 'Y' ");exit;
            $part_sm_count = $this->db->query("SELECT COUNT(scheme_type) as sm_count FROM CHIT_LIST WHERE party_id = '".$pid."' AND scheme_type = '1' AND status = 'Y' ")->result_array();
            $part_tmc_count = $this->db->query("SELECT COUNT(scheme_type) as tmc_count FROM CHIT_LIST WHERE party_id = '".$pid."' AND scheme_type = '2' AND status = 'Y' ")->result_array();
            $part_tmg_count = $this->db->query("SELECT COUNT(scheme_type) as tmg_count FROM CHIT_LIST WHERE party_id = '".$pid."' AND scheme_type = '3' AND status = 'Y' ")->result_array();

            $part_sm_amt = $this->db->query("SELECT SUM(ava_balance) as sm_balance FROM CHIT_LIST WHERE party_id = '".$pid."' AND scheme_type = '1' AND status = 'Y' ")->result_array();
            $part_tmc_amt = $this->db->query("SELECT SUM(ava_balance) as tmc_balance FROM CHIT_LIST WHERE party_id = '".$pid."' AND scheme_type = '2' AND status = 'Y' ")->result_array();
            $part_tmg_amt = $this->db->query("SELECT SUM(ava_balance) as tmg_balance FROM CHIT_LIST WHERE party_id = '".$pid."' AND scheme_type = '3' AND status = 'Y' ")->result_array();


            $arr[] = [
                'pid' => $chit['PID'],
                'name' => $chit['NAME'],
                'rating' => $chit['RATING'],
                // 'balance' => $chit['ava_balance'],
                'sm_count' => $part_sm_count[0]['sm_count'],
                'tmc_count' => $part_tmc_count[0]['tmc_count'],
                'tmg_count' => $part_tmg_count[0]['tmg_count'],
                'sm_ava_balance' => $part_sm_amt[0]['sm_balance'],
                'tmc_ava_balance' => $part_tmc_amt[0]['tmc_balance'],
                'tmg_ava_balance' => $part_tmg_amt[0]['tmg_balance'],
            ];
        }
        // print_r($arr);exit;
        $data['arr'] = $arr;
        $sm_count = $this->db->query("SELECT COUNT(scheme_type) as sm_count FROM CHIT_LIST WHERE scheme_type = '1' AND status = 'Y' ")->result_array();
        if(isset($sm_count))
        {
            $data['sm_count'] = $sm_count;
        }
        else
        {
            $data['sm_count'] = '0';
        }
        $tmc_count = $this->db->query("SELECT COUNT(scheme_type) as tmc_count FROM CHIT_LIST WHERE scheme_type = '2' AND status = 'Y' ")->result_array();
        if(isset($tmc_count))
        {
            $data['tmc_count'] = $tmc_count;
        }
        else
        {
            $data['tmc_count'] = '0';
        }
        $tmg_count = $this->db->query("SELECT COUNT(scheme_type) as tmg_count FROM CHIT_LIST WHERE scheme_type = '3' AND status = 'Y' ")->result_array();
        if(isset($tmg_count))
        {
            $data['tmg_count'] = $tmg_count;
        }
        else
        {
            $data['tmg_count'] = '0';
        }
        
        // print_r($data['sm_count']);
        // $data['sm_count'] = $result['sm_count'][0]['count'] ;
        // $data['tm_c_count'] = $result['tm_c_count'][0]['count'] ;
        // $data['tm_g_count'] = $result['tm_g_count'][0]['count'] ;
      
        $this->load->view('chit/chit_list',$data);
    }
    public function chit_modal_list()
    {
        $party_id = $_GET['party_id'];
        // print_r($party_id);exit();
        $data = $this->Chit_model->get_modal_chit_list($party_id);
        echo json_encode($data);
        exit();
        // print_r($data['modal_list']);exit();
        // echo ''.'||'.$date->chit_date;
        // $this->load->view('chit/chit_md_list_view',$data);
        // return $data;
    }
    public function chit_modal_trans()
    {
        $party_id = $_GET['party_id'];
        // print_r($party_id);exit();
        $data = $this->Chit_model->get_modal_trans_list($party_id);
        // print_r($data);
        // exit();
        echo json_encode($data);
        exit();
        // print_r($data);exit();
        // echo ''.'||'.$date->chit_date;
        // $this->load->view('chit/chit_md_list_view',$data);
        // return $data;
    }
    public function chit_add()
    {
        $data['current_rate'] = $this->db->query("SELECT GOLDRATE FROM SETUP")->row();
        // $data = json_decode(json_encode($data),true);
        // print_r($data);exit();
        $this->load->view('chit/chitentry_add',$data);
        // $this->load->view('chit/chitentry_add');
    }
    
    
    public function chitlist_transaction_history()
    {

        $page       = isset($_GET['page']) ? $_GET['page'] : 1;
        $limit      = 10;
        $offset     = ($page - 1) * $limit +1;
        $page_limit = $offset+$limit-1;
        
        
        $data['party_fil'] = $this->input->post('party_fil');
        if($data['party_fil'] !=''){
        $party_fil =" AND PARTIES.NAME LIKE '%".$data['party_fil']."%' ";
        
        }
        else{
            $party_fil ='';
        }
        $data['chit_id_fill'] = $this->input->post('chit_id_fill');
        if($data['chit_id_fill'] !=''){
        $chit_id_fill =" AND CHIT_LIST.chit_id LIKE '%".$data['chit_id_fill']."%' ";
        
        }
        else{
            $chit_id_fill ='';
        }

        $data['scheme_sel']   = $this->input->post('scheme_sel');
        $data['sch_cashgold'] = $this->input->post('sch_cashgold');
       
        
        if($data['scheme_sel'] =='1')
        {
           $scheme_sel = " AND CHIT_TRANSACTION.scheme_type ='1'";
        }
        
        else
        {
            
          if($data['sch_cashgold'] =='1')
          {
            $scheme_sel = " AND CHIT_TRANSACTION.scheme_type ='2'";

          }
          else if($data['sch_cashgold'] =='2')
          {
            $scheme_sel = " AND CHIT_TRANSACTION.scheme_type ='3'";
             
        }
        else{
            $scheme_sel = '';
        }
    }
        $data['sta_sel'] = $this->input->post('sta_sel');
        
        if($data['sta_sel'] =='5')
        {
            $sta_sel = "AND CHIT_TRANSACTION.transaction_type ='5' ";
        }
        else if($data['sta_sel'] =='4')
        {
            $sta_sel = " AND CHIT_TRANSACTION.transaction_type ='4' "; 
        }
        else if($data['sta_sel'] =='3')
        {
            $sta_sel = " AND CHIT_TRANSACTION.transaction_type ='3' ";
          
        }
        else if($data['sta_sel'] =='2')
        {
            $sta_sel = " AND CHIT_TRANSACTION.transaction_type ='2' ";
           
        }
        else if($data['sta_sel'] =='1')
        {
            $sta_sel = " AND CHIT_TRANSACTION.transaction_type ='1' ";
        }
        else{
            $sta_sel = '';
        }
    
        $data['dt_fill'] = $this->input->post('dt_fill_sales_list');
        $data['from_date_fillter'] = $this->input->post('from_date_fillter_sales_list');
        $data['to_date_fillter'] = $this->input->post('to_date_fillter_sales_list');
        $fdate ='';
        $tdate ='';
        
  
        if($data['dt_fill']=="all"){
                $fdate ='';
                $tdate ='';
        }
        if($data['dt_fill']=="today"){
                $data['today_date_fillter'] = date("Y-m-d");
                $fdate =" AND CHIT_TRANSACTION.trans_date='".$data['today_date_fillter']."'";
                $tdate ='';   
        }
        if($data['dt_fill']=="week"){
            $today=date('l');
                if($today=="Sunday"){
                    $data['week_from_date_fillter']=date(' Y-m-d', strtotime("sunday 0 week"));

                    $data['week_to_date_fillter']=date(' Y-m-d', strtotime("saturday 1 week"));
                // print_r($data['week_to_date_fillter']);exit;
                        $fdate =" AND CHIT_TRANSACTION.trans_date>='".$data['week_from_date_fillter']."'";
                    $tdate =" AND CHIT_TRANSACTION.trans_date<='".$data['week_to_date_fillter']."'";

                }else{
                $data['week_from_date_fillter']=date(' Y-m-d', strtotime("sunday -1 week"));

                $data['week_to_date_fillter']=date(' Y-m-d', strtotime("saturday 0 week"));
                //  print_r($data['week_to_date_fillter']);exit;
                    $fdate =" AND CHIT_TRANSACTION.trans_date>='".$data['week_from_date_fillter']."'";
                $tdate =" AND CHIT_TRANSACTION.trans_date<='".$data['week_to_date_fillter']."'";
                }
                }
                if($data['dt_fill']=="monthly"){
            
                    $first=date('Y-m-01');
                    $last=date('Y-m-t');
                    $fdate =" AND CHIT_TRANSACTION.trans_date>='".$first."'";
                    
                
                            $tdate ="AND CHIT_TRANSACTION.trans_date<='".$last."'";
                    }
                    if($data['dt_fill']=="custom Date"){
                    if($data['from_date_fillter']!=''){
                            $first=date('Y-m-d',strtotime($data['from_date_fillter']));
                            $fdate =" AND CHIT_TRANSACTION.trans_date>='".$first."'";
                            
                            }
                            else{
                                $fdate ='';
                            }
                            if($data['to_date_fillter']!=''){
                                $last=date('Y-m-d',strtotime($data['to_date_fillter']));
                                $tdate =" AND CHIT_TRANSACTION.trans_date<='".$last."'";
                                
                                }
                                else{
                                    $tdate ='';
                                } }

        $data['count'] = count($this->db->query("SELECT 
                                                PARTIES.NAME, 
                                                PARTIES.RATING, 
                                                PARTIES.PID, 
                                                PARTIES.MEMBERSHIP_POINTS, 
                                                CHIT_TRANSACTION.sno, 
                                                CHIT_TRANSACTION.party_id, 
                                                CHIT_TRANSACTION.trans_date,
                                                CHIT_TRANSACTION.scheme_type, 
                                                CHIT_TRANSACTION.scheme_id, 
                                                CHIT_TRANSACTION.transaction_type, 
                                                CHIT_TRANSACTION.opening_amount, 
                                                CHIT_TRANSACTION.processing_amount, 
                                                CHIT_TRANSACTION.closing_balance, 
                                                CHIT_TRANSACTION.amt_paid, 
                                                CHIT_TRANSACTION.payment_id,
                                                CHIT_TRANSACTION.type, 
                                                CHIT_LIST.chit_id
                                                FROM 
                                                    PARTIES
                                                INNER JOIN 
                                                    CHIT_TRANSACTION 
                                                    ON PARTIES.PID = CHIT_TRANSACTION.party_id 
                                                INNER JOIN 
                                                    CHIT_LIST 
                                                    ON CHIT_LIST.scheme_id = CHIT_TRANSACTION.scheme_id
                                                WHERE 
                                                    CHIT_TRANSACTION.status = 'Y' 
                                                    $party_fil $fdate $tdate $scheme_sel $sta_sel $chit_id_fill 
                                                ORDER BY 
                                                CHIT_TRANSACTION.sno DESC")->result_array());


    $data['chit_all_trans_list'] = $this->Chit_model->get_all_transaction_list( $party_fil,$fdate,$tdate,$scheme_sel,$sta_sel,$offset,$page_limit,$chit_id_fill);


      $this->load->view('chit/chitlist_trans_his',$data);
    }
    public function chit_transaction_history($pid)
    {
        $page       = isset($_GET['page']) ? $_GET['page'] : 1;
        $limit      = 10;
        $offset     = ($page - 1) * $limit +1;
        $page_limit = $offset+$limit-1;
        
        
        $data['scheme_sel']   = $this->input->post('scheme_sel');
        $data['sch_cashgold'] = $this->input->post('sch_cashgold');
       
        
        if($data['scheme_sel'] =='1')
        {
           $scheme_sel = " AND CHIT_TRANSACTION.scheme_type ='1'";
        }
        
        else
        {
            
          if($data['sch_cashgold'] =='1')
          {
            $scheme_sel = " AND CHIT_TRANSACTION.scheme_type ='2'";

          }
          else if($data['sch_cashgold'] =='2')
          {
            $scheme_sel = " AND CHIT_TRANSACTION.scheme_type ='3'";
             
        }
        else{
            $scheme_sel = '';
        }
         }
        $data['sta_sel'] = $this->input->post('sta_sel');
        
        if($data['sta_sel'] =='5')
        {
            $sta_sel = "AND CHIT_TRANSACTION.transaction_type ='5' ";
        }
        else if($data['sta_sel'] =='4')
        {
            $sta_sel = " AND CHIT_TRANSACTION.transaction_type ='4' "; 
        }
        else if($data['sta_sel'] =='3')
        {
            $sta_sel = " AND CHIT_TRANSACTION.transaction_type ='3' ";
          
        }
        else if($data['sta_sel'] =='2')
        {
            $sta_sel = " AND CHIT_TRANSACTION.transaction_type ='2' ";
           
        }
        else if($data['sta_sel'] =='1')
        {
            $sta_sel = " AND CHIT_TRANSACTION.transaction_type ='1' ";
        }
        else{
            $sta_sel = '';
        }
    
        $data['dt_fill'] = $this->input->post('dt_fill_sales_list');
        $data['from_date_fillter'] = $this->input->post('from_date_fillter_sales_list');
        $data['to_date_fillter'] = $this->input->post('to_date_fillter_sales_list');
        $fdate ='';
        $tdate ='';
        
  
        if($data['dt_fill']=="all"){
                $fdate ='';
                $tdate ='';
        }
        if($data['dt_fill']=="today"){
                $data['today_date_fillter'] = date("Y-m-d");
                $fdate =" AND CHIT_TRANSACTION.trans_date='".$data['today_date_fillter']."'";
                $tdate ='';   
        }
        if($data['dt_fill']=="week"){
            $today=date('l');
                if($today=="Sunday"){
                    $data['week_from_date_fillter']=date(' Y-m-d', strtotime("sunday 0 week"));

                    $data['week_to_date_fillter']=date(' Y-m-d', strtotime("saturday 1 week"));
                // print_r($data['week_to_date_fillter']);exit;
                        $fdate =" AND CHIT_TRANSACTION.trans_date>='".$data['week_from_date_fillter']."'";
                    $tdate =" AND CHIT_TRANSACTION.trans_date<='".$data['week_to_date_fillter']."'";

                }else{
                $data['week_from_date_fillter']=date(' Y-m-d', strtotime("sunday -1 week"));

                $data['week_to_date_fillter']=date(' Y-m-d', strtotime("saturday 0 week"));
                //  print_r($data['week_to_date_fillter']);exit;
                    $fdate =" AND CHIT_TRANSACTION.trans_date>='".$data['week_from_date_fillter']."'";
                $tdate =" AND CHIT_TRANSACTION.trans_date<='".$data['week_to_date_fillter']."'";
                }
                }
                if($data['dt_fill']=="monthly"){
            
                    $first=date('Y-m-01');
                    $last=date('Y-m-t');
                    $fdate =" AND CHIT_TRANSACTION.trans_date>='".$first."'";
                    
                
                            $tdate ="AND CHIT_TRANSACTION.trans_date<='".$last."'";
                    }
                    if($data['dt_fill']=="custom Date"){
                    if($data['from_date_fillter']!=''){
                            $first=date('Y-m-d',strtotime($data['from_date_fillter']));
                            $fdate =" AND CHIT_TRANSACTION.trans_date>='".$first."'";
                            
                            }
                            else{
                                $fdate ='';
                            }
                            if($data['to_date_fillter']!=''){
                                $last=date('Y-m-d',strtotime($data['to_date_fillter']));
                                $tdate =" AND CHIT_TRANSACTION.trans_date<='".$last."'";
                                
                                }
                                else{
                                    $tdate ='';
                                } }

      $data['count'] = count($this->db->query("SELECT PARTIES.NAME, PARTIES.RATING, PARTIES.PID, PARTIES.MEMBERSHIP_POINTS, CHIT_TRANSACTION.sno, CHIT_TRANSACTION.party_id, CHIT_TRANSACTION.trans_date,CHIT_TRANSACTION.scheme_type, CHIT_TRANSACTION.scheme_id, CHIT_TRANSACTION.transaction_type, CHIT_TRANSACTION.opening_amount, CHIT_TRANSACTION.processing_amount, CHIT_TRANSACTION.closing_balance, CHIT_TRANSACTION.amt_paid ,
      CHIT_TRANSACTION.payment_id, CHIT_TRANSACTION.type
      FROM PARTIES
      INNER JOIN CHIT_TRANSACTION 
      ON PARTIES.PID = CHIT_TRANSACTION.party_id 
      WHERE CHIT_TRANSACTION.party_id ='".$pid."' $fdate $tdate $scheme_sel $sta_sel ORDER BY CHIT_TRANSACTION.sno DESC")->result_array());
 

      $data['chit_all_trans_list'] = $this->Chit_model->get_one_transaction_list($fdate,$tdate,$scheme_sel,$sta_sel,$pid,$offset,$page_limit);
      $data['party_id']= $pid;
      $this->load->view('chit/chitlist_trans_his_one',$data);
    }
    public function chit_list_modal()
    {
        $party_id = $_GET['party_id'];
        // print_r($party_id);exit();
        $data = $this->Chit_model->get_chit_modal_list($party_id);
         $arr  = [];
            foreach($data as $val)
            {

                $date_format  = $this->db->query("SELECT * FROM general_settings ")->row();
                $format = $date_format->date_format;
                $date = date("$format", strtotime($val['chit_date']));
                $arr[] = [ 

                      'chit_id'         => $val['chit_id'],
                      'chit_date'       => $date,
                      'scheme_type'     => $val['scheme_type'],
                      'chit_amount'     => $val['chit_amount'],
                      'collection_type' => $val['collection_type'],
                      'collection_day'  => $val['collection_day'],
                      'collection_date' => $val['collection_date'],
                      'tot_deposit'     => $val['tot_deposit'],
                      'tot_withdraw'    => $val['tot_withdraw']?$val['tot_withdraw']:0,
                      'ava_balance'     => $val['ava_balance'],
                      'type'            => $val['type'],
                      'sno'             => $val['sno'],
                ];

            }
            echo json_encode($arr);
            // exit;
    }
    public function chit_transaction_modal()
    {
        $id = $_GET['pay_id'];
        // print_r($id);exit;
        $data = $this->Chit_model->get_chit_modal_transaction($id);
         $arr  = [];
            foreach($data as $val)
            {




                $res = $this->db->query("SELECT * FROM BANKS WHERE SNO = '".$val['party_bank']."' ")->row();
                if(isset($res))
                {
                    $bankname = $res->BANKNAME?$res->BANKNAME:'-';
                }
                else
                {
                    $bankname = '';
                }
                $res2 = $this->db->query("SELECT * FROM BANKS WHERE SNO = '".$val['company_bank']."' ")->row();
                if(isset($res2))
                {
                    $bankname2 = $res2->BANKNAME?$res2->BANKNAME:'-';
                }
                else
                {
                    $bankname2 = '-';
                }

               $arr[] = [ 

                      'type'       => $val['type_of_payment']?$val['type_of_payment']:'-',
                      'amount'     => $val['amount']?$val['amount']:0,
                      'bank'       => $bankname?$bankname:$bankname2,
                      'cheque_no'  => $val['cheque_ref_no']?$val['cheque_ref_no']:'-',
                      'remarks'    => $val['remarks']?$val['remarks']:'-',
                      'amt_type'   => $val['payment_side']?$val['payment_side']:'',
                      'bill_no'    => $val['bill_no']?' - '.$val['bill_no']:'',
                ];

            }
            // print_r($arr);
            echo json_encode($arr);
            exit;
    }
    public function chit_entry_save()
    {


        // exit();
        $data['party_id_hidden'] = $this->input->post('party_id_hidden');
        $data['chit_date'] = $this->input->post('chit_date');
        $data['chit_amount'] = $this->input->post('chit_amount');
        $data['collection_type'] = $this->input->post('collection_type');
        $data['collec_day'] = $this->input->post('collec_day');
        $coll_day = $this->input->post('collec_date');
        $c_date = date("Y-m-d", strtotime($coll_day)); 
        if (!empty($c_date)) {
            $data['collec_date'] = date("j", strtotime($c_date)); // Using strtotime to convert $c_date to a timestamp
        } else {
            $data['collec_date'] = '';
        }

        $data['scheme_type'] = $this->input->post('scheme_type');
        $data['current_gold_rate'] = $this->input->post('current_gold_rate');
        $data['sm_cash_box'] = $this->input->post('sm_cash_box');
        $data['tm_cash_box'] = $this->input->post('tm_cash_box');
        $data['tm_gold_box'] = $this->input->post('tm_gold_box');

        $data['net_gm_lab1'] = $this->input->post('net_gm_lab1');
        $data['created_by'] = $_SESSION['username'];
        $data['modified_by'] = $_SESSION['username'];
      
        if ($data['sm_cash_box'] !='') 
        {
            $tot_deposit = $data['sm_cash_box'];   
        }
        elseif ($data['tm_cash_box'] !='') 
        {
            $tot_deposit = $data['tm_cash_box'];
        }
        elseif ($data['tm_gold_box'] !='') 
        {
            $tot_deposit = $data['net_gm_lab1'];
        }else{
            $tot_deposit = '';
        }       

        $sche_id = $this->db->query("SELECT * FROM CHIT_LIST WHERE scheme_type = '".$data['scheme_type']."' ORDER BY sno DESC  ")->row();
     
         if($sche_id){

            $last_data= $sche_id? $sche_id->scheme_id :0;

                $year = substr( date("y"), -2);
                $slice = explode("/", $last_data);
                $result = preg_replace('/[^0-9]/',' ', $slice[0]); 
                

                function request_num ($input, $pad_len = 4  , $prefix = null) {
                    if ($pad_len <= strlen($input))
                        trigger_error('<strong>$pad_len</strong> cannot be less than or equal to the length of <strong>$input</strong> to generate invoice number', E_USER_ERROR);
                
                    if (is_string($prefix))
                        return sprintf("%s%s", $prefix, str_pad($input, $pad_len, "0", STR_PAD_LEFT));
                
                    return str_pad($input, $pad_len, "0", STR_PAD_LEFT);
                }

                if($data['scheme_type'] == 1)
                {
                    $sale_id=  'ASMC-';
                }else if($data['scheme_type'] == 2)
                {
                    $sale_id=  'ATMC-';
                }else {
                    
                $sale_id=  'ATMG-';
                }
                $request =  request_num(((int)$result+1), 4, $sale_id);
                
                $request_id =  $request.'/'.$year;

              $sale_id = $request_id;
              }
              else{
                $year = substr( date("y"), -2);
                if($data['scheme_type'] == 1)
                {
                    $sale_id=  'ASMC-0001/'.$year;
                }
                else if($data['scheme_type'] == 2)
                {
                    $sale_id=  'ATMC-0001/'.$year;
                }
                else 
                { 
                    $sale_id=  'ATMG-0001/'.$year;
                }
        }
        
        // print_r($sale_id);exit;
        $id = $this->db->query("SELECT sno FROM CHIT_LIST ORDER BY sno DESC")->row();


        $next_value = $id->sno+'1';
      
        $lot_no=str_pad($next_value,4,0,STR_PAD_LEFT);
        
        $prefix="AGBC-";
        $d=date("y");
       
        $data['chit_id']=$prefix.$lot_no."/".$d;
     
        $pid = $this->db->query("SELECT * FROM CHIT_MASTER WHERE party_id = '".$data['party_id_hidden']."' ")->row();

        $result = $this->Chit_model->add_chit_entry( $data, $tot_deposit, $sale_id );
        if($result){
            add_notification(date('Y-m-d H:i:s'), '', "Others", "Chit<br> New Chit Created", $data['chit_id']. ' created By ' .$_SESSION['username'],'', $_SESSION['USERID'], '0', $sale_id);

            $m_id = $this->db->query("SELECT MEMBERSHIP_ID FROM PARTIES WHERE PID = '".$data['chit_id']."' ")->row();
            $data['party_id_hidden']      = $this->input->post('party_id_hidden');
            $data['m_points_ad']          = $this->input->post('m_points_ad');
            $data['cus_rating']           = $this->input->post('cus_rating');
            $data['MEMBERSHIP_NO']        = $this->input->post('mem_card_no_hidden')?$this->input->post('mem_card_no_hidden'):'';
            
            if (isset($m_id)) {

                $data['membership_id_hidden'] = $m_id->MEMBERSHIP_ID?$m_id->MEMBERSHIP_ID:'';
            }
             if ($data['m_points_ad']>0 && $data['MEMBERSHIP_NO']!='') {
                $mpoint = $this->Chit_model->add_mpoint($data);
                $mem_trans_his = [
                                    'MEMBERSHIP_NO' => $data['MEMBERSHIP_NO'], 
                                    'PID'           => $data['party_id_hidden'], 
                                    'LOG_DATE'      => date("Y-m-d",strtotime($data['chit_date'])), 
                                    'PROCESS'       => 'New Chit Deposit', 
                                    'POINTS_EARNED' => $data['m_points_ad']?$data['m_points_ad']:0, 
                                    'CREATED_BY'    => $data['created_by'], 
                                    'CREATED_ON'    => date('Y-m-d H:i:s'),
                                    'STATUS_TYPE'   => 'In',
                                    'BILLNO'        => $data['chit_id'],
                                    'RATING'        => $data['cus_rating']?$data['cus_rating']:0, 
                                ];

                // $mem_trans_result = $this->db->insert('MEMBERSHIP_HISTORY',$mem_trans_his);
                $mem_trans_result = $this->db->query("INSERT INTO MEMBERSHIP_HISTORY (MEMBERSHIP_NO, PID, LOG_DATE, PROCESS, POINTS_EARNED, CREATED_BY, CREATED_ON, STATUS_TYPE, BILLNO, RATING)
                    VALUES (
                        '".$mem_trans_his['MEMBERSHIP_NO']."',
                        '".$mem_trans_his['PID']."',
                        '".$mem_trans_his['LOG_DATE']."',
                        '".$mem_trans_his['PROCESS']."',
                        '".$mem_trans_his['POINTS_EARNED']."',
                        '".$mem_trans_his['CREATED_BY']."',
                        '".$mem_trans_his['CREATED_ON']."',
                        '".$mem_trans_his['STATUS_TYPE']."',
                        '".$mem_trans_his['BILLNO']."',
                        '".$mem_trans_his['RATING']."'
                    )");
            }
            if ($data['cus_rating']!='') {
                $rating_his = [ 
                                    'PID'           => $data['party_id_hidden'], 
                                    'LOG_DATE'      => date("Y-m-d",strtotime($data['chit_date'])), 
                                    'PROCESS'       => 'New Chit Deposit', 
                                    'RATING'        => $data['cus_rating']?$data['cus_rating']:0, 
                                    'COMPANYCODE'   => $_SESSION['COMPANYCODE']?$_SESSION['COMPANYCODE']:'', 
                                    'CREATED_BY'    => $data['created_by'], 
                                    'CREATED_ON'    => date('Y-m-d H:i:s'),
                                    'BILLNO'        => $data['chit_id'],
                                ];
                // $rat_his_result = $this->db->insert('CUSTOMER_RATING_HISTORY',$rating_his);
                $rat_his_result = $this->db->query("INSERT INTO CUSTOMER_RATING_HISTORY (PID, LOG_DATE, PROCESS, RATING, COMPANYCODE, CREATED_BY, CREATED_ON, BILLNO)
                    VALUES (
                        '".$rating_his['PID']."',
                        '".$rating_his['LOG_DATE']."',
                        '".$rating_his['PROCESS']."',
                        '".$rating_his['RATING']."',
                        '".$rating_his['COMPANYCODE']."',
                        '".$rating_his['CREATED_BY']."',
                        '".$rating_his['CREATED_ON']."',
                        '".$rating_his['BILLNO']."')");

                $rat = $this->db->query("UPDATE PARTIES SET RATING='".$data['cus_rating']."' WHERE PID = '".$data['party_id_hidden']."' ");
               
            }
            
            $p_id = $this->db->query("SELECT party_id FROM CHIT_MASTER WHERE party_id = '".$data['party_id_hidden']."' ")->row();
            
            if(isset($p_id))
            { 
               
                $exi_chit_count = $this->Chit_model->up_master_sm($data);
            }
            else {
                
                $exi_chit_count = $this->Chit_model->add_master_sm($data);
            }
            $pid = [];
            $data['cash_val'] = 'Cash';
            $data['cash_amt'] = $this->input->post('cash_amt');
            $data['cash_details'] = $this->input->post('cash_details');
            
            $cash = $this->Chit_model->add_cash_entry($data);
            if($cash == 1)
            {
                $pid[] = $this->db->query("SELECT payment_id FROM payment_inward_outward ORDER BY payment_id DESC ")->row();
            }
            $data['bank_val'] = 'Cheque';
            $data['bank_amt'] = $this->input->post('bank_amt');
            $data['bank_name'] = $this->input->post('bank_name');
            $data['cheque_no'] = $this->input->post('cheque_no');
            $data['bank_details'] = $this->input->post('bank_details');
            // print_r($data['payment_type']);
            $bank = $this->Chit_model->add_bank_entry($data);
            if($bank == 1)
            {
                $pid[] = $this->db->query("SELECT payment_id FROM payment_inward_outward ORDER BY payment_id DESC ")->row();
            }
            $data['rtgs_val']  = 'RTGS';
            $data['rtgs_amt']  = $this->input->post('rtgs_amt');
            $data['rtgs_name'] = $this->input->post('rtgs_name');
            $data['rtgs_no']   = $this->input->post('rtgs_no');
            $data['rtgs_details'] = $this->input->post('rtgs_details');
            // print_r($data['payment_type']);
            $rtgs = $this->Chit_model->add_rtgs_entry($data);
            if($rtgs == 1)
            {
                $pid[] = $this->db->query("SELECT payment_id FROM payment_inward_outward ORDER BY payment_id DESC ")->row();
            }
            $data['upi_val'] = 'UPI';
            $data['upi_amt'] = $this->input->post('upi_amt');
            $data['upi_no'] = $this->input->post('upi_no');
            $data['upi_details'] = $this->input->post('upi_details');
            $upi = $this->Chit_model->add_upi_entry($data);
                if($upi == 1)
                {
                    $pid[] = $this->db->query("SELECT payment_id FROM payment_inward_outward ORDER BY payment_id DESC ")->row();
                }
            // print_r($pid);
                $data = json_decode(json_encode($pid),true);
                // print_r($data);
                $arr = array();
                foreach($data as $i=> $val)
                {
                    $arr[] = implode(",",$val);
                }
            $p = implode(",",$arr);
            // print_r($p);
            $chit_tr = $this->db->query("SELECT * FROM CHIT_TRANSACTION ORDER BY sno DESC")->row();
            $res = $this->db->query("UPDATE CHIT_TRANSACTION SET payment_id = '".$p."' WHERE sno = '".$chit_tr->sno."' ");

    }


        if($result)
        {
            $this->session->set_flashdata('g_success', $sale_id.' New Chit Entered successfully...');
        }else{
            $this->session->set_flashdata('g_err', 'Could not approve Chit Entry!');
        }

        // print_r($result);
        // print_r($sale_id);
        // exit;
        // print_r($res);exit;
        redirect("Chit"); 
    }

    public function chit_deposit_add()
    {
        
        $this->load->view('chit/deposit');
    }
    public function deposit_chit()
    {
      
        $data['party_id_hidden'] = $this->input->post('party_id_hidden');
        $data['chit_date'] = $this->input->post('chit_date');
        $data['chit_id'] = $this->input->post('chit_id');
        $data['ava_balance'] = $this->input->post('ava_balance');
        $data['scheme_id'] = $this->input->post('scheme_id1');
        $data['scheme_type'] = $this->input->post('scheme_type');



        $data['sm_cash_box'] = $this->input->post('sm_cash_box');
        $data['tm_cash_box'] = $this->input->post('tm_cash_box');
        $data['tm_gold_box'] = $this->input->post('tm_gold_box');
        $data['net_gm_lab1'] = $this->input->post('net_gm_lab1');
        $data['created_by']  = $_SESSION['username'];
        $data['modified_by'] = $_SESSION['username'];

        $m_id = $this->db->query("SELECT MEMBERSHIP_ID FROM PARTIES WHERE PID = '".$data['party_id_hidden']."'")->row();
        $data['party_id_hidden'] = $this->input->post('party_id_hidden');
        $data['m_points_ad']     = $this->input->post('m_points_ad');
        $data['cus_rating']      = $this->input->post('cus_rating');
        $data['MEMBERSHIP_NO']   = $this->input->post('mem_card_no_hidden')?$this->input->post('mem_card_no_hidden'):'';
        
      
        
        // print_r($data['tm_gold_box']);exit();
        


        $result = $this->Chit_model->dp_chit_entry($data);

        if ($result) {
            add_notification(date('Y-m-d H:i:s'), '', "Others", "Chit<br> New Deposit", $data['chit_id']. ' created By ' .$_SESSION['username'],'', $_SESSION['USERID'], '0', $data['scheme_id']);
             $data['membership_id_hidden'] = $m_id->MEMBERSHIP_ID?$m_id->MEMBERSHIP_ID:'';
             if ($data['m_points_ad']>0 && $data['MEMBERSHIP_NO']!='') {
                $mpoint = $this->Chit_model->add_mpoint($data);
                $mem_trans_his = [
                                    'MEMBERSHIP_NO' => $data['MEMBERSHIP_NO'], 
                                    'PID'           => $data['party_id_hidden'], 
                                    'LOG_DATE'      => date("Y-m-d",strtotime($data['chit_date'])), 
                                    'PROCESS'       => 'Chit Deposit', 
                                    'POINTS_EARNED' => $data['m_points_ad']?$data['m_points_ad']:0, 
                                    'CREATED_BY'    => $data['created_by'], 
                                    'CREATED_ON'    => date('Y-m-d H:i:s'),
                                    'STATUS_TYPE'   => 'In',
                                    'BILLNO'        => $data['chit_id'],
                                    'RATING'        => $data['cus_rating']?$data['cus_rating']:0, 
                                ];

                // $mem_trans_result = $this->db->insert('MEMBERSHIP_HISTORY',$mem_trans_his);
                $mem_trans_result = $this->db->query("INSERT INTO MEMBERSHIP_HISTORY (MEMBERSHIP_NO, PID, LOG_DATE, PROCESS, POINTS_EARNED, CREATED_BY, CREATED_ON, STATUS_TYPE, BILLNO, RATING)
                VALUES (
                    '".$mem_trans_his['MEMBERSHIP_NO']."',
                    '".$mem_trans_his['PID']."',
                    '".$mem_trans_his['LOG_DATE']."',
                    '".$mem_trans_his['PROCESS']."',
                    '".$mem_trans_his['POINTS_EARNED']."',
                    '".$mem_trans_his['CREATED_BY']."',
                    '".$mem_trans_his['CREATED_ON']."',
                    '".$mem_trans_his['STATUS_TYPE']."',
                    '".$mem_trans_his['BILLNO']."',
                    '".$mem_trans_his['RATING']."'
                )");


            }
            if ($data['cus_rating']!='') {
                $rating_his = [ 
                                    'PID'           => $data['party_id_hidden'], 
                                    'LOG_DATE'      => date("Y-m-d",strtotime($data['chit_date'])), 
                                    'PROCESS'       => 'Chit Deposit', 
                                    'RATING'        => $data['cus_rating']?$data['cus_rating']:0, 
                                    'COMPANYCODE'   => $_SESSION['COMPANYCODE']?$_SESSION['COMPANYCODE']:'', 
                                    'CREATED_BY'    => $data['created_by'], 
                                    'CREATED_ON'    => date('Y-m-d H:i:s'),
                                    'BILLNO'        => $data['chit_id'],
                                ];

                $rat = $this->db->query("UPDATE PARTIES SET RATING='".$data['cus_rating']."' WHERE PID = '".$data['party_id_hidden']."' ");
                // $rat_his_result = $this->db->insert('CUSTOMER_RATING_HISTORY',$rating_his);
                 $rat_his_result = $this->db->query("INSERT INTO CUSTOMER_RATING_HISTORY (PID, LOG_DATE, PROCESS, RATING, COMPANYCODE, CREATED_BY, CREATED_ON, BILLNO)
                VALUES (
                    '".$rating_his['PID']."',
                    '".$rating_his['LOG_DATE']."',
                    '".$rating_his['PROCESS']."',
                    '".$rating_his['RATING']."',
                    '".$rating_his['COMPANYCODE']."',
                    '".$rating_his['CREATED_BY']."',
                    '".$rating_his['CREATED_ON']."',
                    '".$rating_his['BILLNO']."')");
            }
            $result_trans = $this->Chit_model->dp_chit_trans($data);
            $pid = [];
            $data['cash_val'] = 'Cash';
            $data['cash_amt'] = $this->input->post('cash_amt');
            $data['cash_details'] = $this->input->post('cash_details');

            $cash = $this->Chit_model->dp_cash_entry($data);
            if($cash == 1)
            {
                $pid[] = $this->db->query("SELECT payment_id FROM payment_inward_outward ORDER BY payment_id DESC ")->row();
            }
            $data['bank_val']     = 'Cheque';
            $data['bank_amt']     = $this->input->post('bank_amt');
            $data['bank_name']    = $this->input->post('bank_name');
            $data['cheque_no']    = $this->input->post('cheque_no');
            $data['bank_details'] = $this->input->post('bank_details');

            $bank = $this->Chit_model->dp_bank_entry($data);
            if($bank == 1)
            {
                $pid[] = $this->db->query("SELECT payment_id FROM payment_inward_outward ORDER BY payment_id DESC ")->row();
            }
            $data['rtgs_val'] = 'RTGS';
            $data['rtgs_amt'] = $this->input->post('rtgs_amt');
            $data['rtgs_name'] = $this->input->post('rtgs_name');
            $data['rtgs_no'] = $this->input->post('rtgs_no');
            $data['rtgs_details'] = $this->input->post('rtgs_details');
            $rtgs = $this->Chit_model->dp_rtgs_entry($data);
            if($rtgs == 1)
            {
                $pid[] = $this->db->query("SELECT payment_id FROM payment_inward_outward ORDER BY payment_id DESC ")->row();
            }
            $data['upi_val'] = 'UPI';
            $data['upi_amt'] = $this->input->post('upi_amt');
            $data['upi_no'] = $this->input->post('upi_no');
            $data['upi_details'] = $this->input->post('upi_details');
            $upi = $this->Chit_model->dp_upi_entry($data);
            if($upi == 1)
            {
                $pid[] = $this->db->query("SELECT payment_id FROM payment_inward_outward ORDER BY payment_id DESC ")->row();
            }
            // print_r($pid);
            $data = json_decode(json_encode($pid),true);
            // print_r($data);
            $arr = array();
            foreach($data as $i=> $val)
            {
                $arr[] = implode(",",$val);
            }
            // print_r($arr);
            $p = implode(",",$arr);
            // print_r($p);
            $chit_tr = $this->db->query("SELECT * FROM CHIT_TRANSACTION ORDER BY sno DESC")->row();
            $res = $this->db->query("UPDATE CHIT_TRANSACTION SET payment_id = '".$p."' WHERE sno = '".$chit_tr->sno."' ");
            // print_r($res);exit;
        }

        $data['chit_ids']     = $this->input->post('chit_id');

             // print_r($data['chit_ids']);

                if($result)
                {
                    $this->session->set_flashdata('g_success', $data['chit_ids'].' Chit Deposit successfully...');
                }else{
                    $this->session->set_flashdata('g_err', 'Could not approve Deposit Entry!');
                }
      // exit();

        redirect("Chit"); 
       
    }
    public function chit_withdraw_add()
    {
        $this->load->view('chit/withdraw');
    }
    public function withdraw_chit()
    {
       
        $data['party_id_hidden'] = $this->input->post('party_id_hidden');
        $data['chit_date'] = $this->input->post('chit_date');
        $data['chit_id'] = $this->input->post('chit_id');
        $data['ava_balance'] = $this->input->post('ava_balance');
        $data['scheme_id'] = $this->input->post('scheme_id1');
        $data['scheme_type'] = $this->input->post('scheme_type');
        $data['sm_cash_box'] = $this->input->post('sm_cash_box');
        $data['tm_cash_box'] = $this->input->post('tm_cash_box');
        $data['tm_gold_box'] = $this->input->post('tm_gold_box');
        $data['created_by'] = $_SESSION['username'];
        $data['modified_by'] = $_SESSION['username'];
        // Withdraw MemberShip 
        $m_id = $this->db->query("SELECT MEMBERSHIP_ID FROM PARTIES WHERE PID = '".$data['party_id_hidden']."' ")->row();
        $data['m_points_ad']          = $this->input->post('m_points_ad');
        $data['cus_rating']           = $this->input->post('cus_rating');
        $data['MEMBERSHIP_NO']        = $this->input->post('mem_card_no_hidden')?$this->input->post('mem_card_no_hidden'):'';
        $data['membership_id_hidden'] = $m_id->MEMBERSHIP_ID?$m_id->MEMBERSHIP_ID:'';

      
        $result = $this->Chit_model->wt_chit_entry($data);

            if ($result) {            
                add_notification(date('Y-m-d H:i:s'), '', "Others", "Chit<br> New Withdraw", $data['chit_id']. ' created By ' .$_SESSION['username'],'', $_SESSION['USERID'], '0', $data['scheme_id']);
             if ($data['m_points_ad']>0 && $data['MEMBERSHIP_NO']!='') {
                $mpoint = $this->Chit_model->add_mpoint($data);
                $mem_trans_his = [
                                    'MEMBERSHIP_NO' => $data['MEMBERSHIP_NO'], 
                                    'PID'           => $data['party_id_hidden'], 
                                    'LOG_DATE'      => date("Y-m-d",strtotime($data['chit_date'])), 
                                    'PROCESS'       => 'Chit Widthdraw', 
                                    'POINTS_EARNED' => $data['m_points_ad']?$data['m_points_ad']:0, 
                                    'CREATED_BY'    => $data['created_by'], 
                                    'CREATED_ON'    => date('Y-m-d H:i:s'),
                                    'STATUS_TYPE'   => 'OUT',
                                    'BILLNO'        => $data['chit_id'],
                                    'RATING'        => $data['cus_rating']?$data['cus_rating']:0, 
                                ];

                // $mem_trans_result = $this->db->insert('MEMBERSHIP_HISTORY',$mem_trans_his);
                $mem_trans_result = $this->db->query("INSERT INTO MEMBERSHIP_HISTORY (MEMBERSHIP_NO, PID, LOG_DATE, PROCESS, POINTS_EARNED, CREATED_BY, CREATED_ON, STATUS_TYPE, BILLNO, RATING)
                    VALUES (
                        '".$mem_trans_his['MEMBERSHIP_NO']."',
                        '".$mem_trans_his['PID']."',
                        '".$mem_trans_his['LOG_DATE']."',
                        '".$mem_trans_his['PROCESS']."',
                        '".$mem_trans_his['POINTS_EARNED']."',
                        '".$mem_trans_his['CREATED_BY']."',
                        '".$mem_trans_his['CREATED_ON']."',
                        '".$mem_trans_his['STATUS_TYPE']."',
                        '".$mem_trans_his['BILLNO']."',
                        '".$mem_trans_his['RATING']."'
                    )");

                // print_r($mem_trans_his);
            }
            if ($data['cus_rating']!='') {
                $rating_his = [ 
                                    'PID'           => $data['party_id_hidden'], 
                                    'LOG_DATE'      => date("Y-m-d",strtotime($data['chit_date'])), 
                                    'PROCESS'       => 'Chit Deposit', 
                                    'RATING'        => $data['cus_rating']?$data['cus_rating']:0, 
                                    'COMPANYCODE'   => $_SESSION['COMPANYCODE']?$_SESSION['COMPANYCODE']:'', 
                                    'CREATED_BY'    => $data['created_by'], 
                                    'CREATED_ON'    => date('Y-m-d H:i:s'),
                                    'BILLNO'        => $data['chit_id'],
                                ];
                $rat = $this->db->query("UPDATE PARTIES SET RATING='".$data['cus_rating']."' WHERE PID = '".$data['party_id_hidden']."' ");
                // $rat_his_result = $this->db->insert('CUSTOMER_RATING_HISTORY',$rating_his);
                 $rat_his_result = $this->db->query("INSERT INTO CUSTOMER_RATING_HISTORY (PID, LOG_DATE, PROCESS, RATING, COMPANYCODE, CREATED_BY, CREATED_ON, BILLNO)
                    VALUES (
                        '".$rating_his['PID']."',
                        '".$rating_his['LOG_DATE']."',
                        '".$rating_his['PROCESS']."',
                        '".$rating_his['RATING']."',
                        '".$rating_his['COMPANYCODE']."',
                        '".$rating_his['CREATED_BY']."',
                        '".$rating_his['CREATED_ON']."',
                        '".$rating_his['BILLNO']."')");
            }        
            $result_trans = $this->Chit_model->wt_chit_trans($data);
            $pid = [];
            $data['cash_val'] = 'Cash';
            $data['cash_amt'] = $this->input->post('cash_amt')?$this->input->post('cash_amt'):0;
            $data['cash_details'] = $this->input->post('cash_details');

            $cash = $this->Chit_model->wd_cash_entry($data);
            if($cash == 1)
            {
                $pid[] = $this->db->query("SELECT payment_id FROM payment_inward_outward ORDER BY payment_id DESC ")->row();
            }
            $data['bank_val'] = 'Cheque';
            $data['bank_amt'] = $this->input->post('bank_amt');
            $data['bank_name'] = $this->input->post('bank_name');
            $data['cheque_no'] = $this->input->post('cheque_no');
            $data['bank_details'] = $this->input->post('bank_details');

            $bank = $this->Chit_model->wd_bank_entry($data);

            if($bank == 1)
            {
                $pid[] = $this->db->query("SELECT payment_id FROM payment_inward_outward ORDER BY payment_id DESC ")->row();
            }
            $data['rtgs_val'] = 'RTGS';
            $data['rtgs_amt'] = $this->input->post('rtgs_amt');
            $data['rtgs_name'] = $this->input->post('rtgs_name');
            $data['rtgs_no'] = $this->input->post('rtgs_no');
            $data['rtgs_details'] = $this->input->post('rtgs_details');

            $rtgs = $this->Chit_model->wd_rtgs_entry($data);
            if($rtgs == 1)
            {
                $pid[] = $this->db->query("SELECT payment_id FROM payment_inward_outward ORDER BY payment_id DESC ")->row();
            }

            $data['upi_val'] = 'UPI';
            $data['upi_amt'] = $this->input->post('upi_amt');
            $data['upi_no'] = $this->input->post('upi_no');
            $data['upi_details'] = $this->input->post('upi_details');

            $upi = $this->Chit_model->wd_upi_entry($data);
            if($upi == 1)
            {
                $pid[] = $this->db->query("SELECT payment_id FROM payment_inward_outward ORDER BY payment_id DESC ")->row();
            }
            // print_r($pid);
            $data = json_decode(json_encode($pid),true);
            // print_r($data);
            $arr = array();
            foreach($data as $i=> $val)
            {
                $arr[] = implode(",",$val);
            }
            // print_r($arr);
            $p = implode(",",$arr);
            // print_r($p);
            $chit_tr = $this->db->query("SELECT * FROM CHIT_TRANSACTION ORDER BY sno DESC")->row();
            $res = $this->db->query("UPDATE CHIT_TRANSACTION SET payment_id = '".$p."' WHERE sno = '".$chit_tr->sno."' ");
            // print_r($res);exit;

        }

        $data['chit_ids']     = $this->input->post('chit_id');

        if($result)
        {
            $this->session->set_flashdata('g_success', $data['chit_ids'].' Chit Withdrawn successfully...');
        }else{
            $this->session->set_flashdata('g_err', 'Could not approve Withdraw Entry!');
        }
      
        // print_r($result);
        // print_r($data['chit_ids']);
        // exit;
        redirect("Chit");
    }
    public function chit_list_det()
    {
     
      $search =  $_GET['query']; 
      $rows   = $this->Chit_model->getChit($search);
      // print_r($rows);
      // exit;
      
      $res='[';
      if(count($rows)>0) {
        foreach($rows as $row)
        {
            // $title='';
            $chit_id='';
            $chit_id=$row->chit_id;
            $party_id=$row->party_id;
            $scheme_id=$row->scheme_id;
            $collection_type=$row->collection_type;
            $collection_day=$row->collection_day;
            $collection_date=$row->collection_date;
            $data          = $this->db->query("SELECT * FROM PARTIES WHERE PID = '".$party_id."' ")->row();

            // vasanth
           
            $c             = $this->db->query("SELECT * FROM CHIT_MASTER WHERE party_id = '".$party_id."' ")->row();
            $ct            = $this->db->query("SELECT * FROM CHIT_TRANSACTION WHERE party_id = '".$party_id."' ")->row();
            $chit_list     = $this->db->query("SELECT * FROM CHIT_LIST WHERE chit_id = '".$chit_id."' ")->row();

            $smcc = $c->sm_cash_chit_count;
            $tm_cash_chit_count = $c->tm_cash_chit_count;
            $tm_gold_chit_count = $c->tm_gold_chit_count;
            // $party_photo = '<img src="data:image/jpg;charset=utf8;base64,'.base64_encode($data->PHOTO).'"  height="125px" width="125px">';
            // print_r($party_photo);exit;
            $tmcc = $tm_cash_chit_count + $tm_gold_chit_count;
            $cc = $smcc + $tmcc;
            $st = $chit_list->scheme_type;
            $sel_ava_bal = $c->sm_cash_ava_amt;
            $tha_cash_ava_bal = $c->tm_cash_ava_amt;
            $tha_gold_ava_bal = $c->tm_gold_ava_amt;

            $member_id=$data->MEMBERSHIP_ID;
              
              if ($member_id) {
                 $card_details=$this->db->query("SELECT * FROM MEMBERSHIP_CARD WHERE MEMBERSHIP_ID='".$member_id."'")->row();

             }
             if(isset($card_details)){
                    $car_member_no   =  $card_details->MEMBERSHIP_NO;
                    $member_points   =  $card_details->POINTS;
                    $card_type   = $card_details->CARD_TYPE;
              }else{

                    $car_member_no   = '';
                    $member_points= '';
                    $card_type='';

              }

            
                                                                   

           
            $title = $row->chit_id;
            $res.='{ "title":"'.$title.'","chit_id": "'.$row->chit_id.'","party_id": "'.$row->party_id.'","scheme_id": "' .$row->scheme_id.'","collection_type": "'.$row->collection_type.'","collection_day": "'.$row->collection_day.'","collection_date": "'.$row->collection_date.'","party_name": "'.$data->NAME.'", "address": "'.$data->ADDRESS1.$data->ADDRESS2.$data->CITY.'","mobile": "'.$data->PHONE.'","rating": "'.$data->RATING.'", "member_id": "'.$car_member_no.'","member_points": "'.$member_points.'","card_member_type": "'.$card_type.'","scheme_ty": "'.$st.'","tot_sel_trans": "'.$sel_ava_bal.'","tot_tha_cash_trans": "'.$tha_cash_ava_bal.'","tot_tha_gold_trans": "'.$tha_gold_ava_bal.'", "sm_cc": "'.$smcc.'","tm_cc": "'.$tmcc.'","cc": "'.$cc.'","sel_amt": "'.$c->sm_cash_ava_amt.'","tha_amt": "'.$c->tm_cash_ava_amt.'","cash": "'.$chit_list->ava_balance.'"},';
        }
        $res=rtrim($res,',');
        $res.=']';
      }
      else{
        $res.=']';
      }
      
      print_r($res);
    
      exit();
      
    
      }
      public function get_photo()
    {
        $pid = $this->input->post('id');
        $party_det = $this->db->query("SELECT PARTY_IMAGE,PHOTO, TYPE_OF_RECORD FROM PARTIES WHERE PID='".$pid."'")->row();
        if ($party_det) {
            if ($party_det->TYPE_OF_RECORD == 'N') {
                // print_r($party_det->PARTY_IMAGE);
                // exit;
                if(isset($party_det->PARTY_IMAGE) && $party_det->PARTY_IMAGE !== "") {
                    $div = '<img src="'.$party_det->PARTY_IMAGE.'" height="125px" width="125px">';
                } else {
                     $div = '<img src="'.base_url().'assets/images/party.jpg" height="125px" width="125px">';
                }
            } else {
                // print_r('old');
                // exit;
                if(isset($party_det->PHOTO) && $party_det->PHOTO !== "") {
                    $div = '<img src="data:image/jpg;charset=utf8;base64,'.base64_encode($party_det->PHOTO).'" height="125px" width="125px">';
                } else {
                    $div = '<img src="'.base_url().'assets/images/party.jpg" height="125px" width="125px">';
                }
            }
        } else {
            // print_r('no ');
            $div = '<img src="'.base_url().'assets/images/party.jpg" height="125px" width="125px">';
            // exit;
        }

        echo $div;
    }
      public function get_photo2()
      {
         $pid=$this->input->post('id');
         $party_det=$this->db->query("SELECT PHOTO FROM PARTIES WHERE PID='".$pid."'")->row();
         if($party_det->PHOTO!='')
         {
         $div='<img src="data:image/jpg;charset=utf8;base64,'.base64_encode($party_det->PHOTO).'"  height="125px" width="125px">';
         }
         else
         {
          $div='<img src="'.base_url().'assets/images/party.jpg" height="125px" width="125px" >';
         }
         echo $div;
      }
      public function get_photo3()
      {
         $pid=$this->input->post('id');
         $party_det=$this->db->query("SELECT PHOTO FROM PARTIES WHERE PID='".$pid."'")->row();
         if($party_det->PHOTO!='')
         {
         $div='<img src="data:image/jpg;charset=utf8;base64,'.base64_encode($party_det->PHOTO).'"  height="125px" width="125px">';
         }
         else
         {
          $div='<img src="'.base_url().'assets/images/party.jpg" height="125px" width="125px" >';
         }
         echo $div;
      }
    public function chit_party_det()
    {
      $search =  $_GET['query']; 
      $rows = $this->Chit_model->getParty($search);
      $res='[';
      if(count($rows)>0) {
        foreach($rows as $row )
        {
            // $title='';
            $party_id='';
            // $chit_id=$row->chit_id;
            $party_id=$row->party_id;
            $lastname=$row->NAME;
            $address=$row->ADDRESS1.', '.$row->ADDRESS2.', '.$row->CITY;
            $member_id=$row->MEMBERSHIP_ID;
            $member_points=$row->MEMBERSHIP_POINTS;
            // $scheme_id=$row->scheme_id;
            // $collection_type=$row->collection_type;
            // $member_points=$row->MEMBERSHIP_POINTS;

            $rating=$row->RATING;
            $phone=$row->PHONE;
            $party_photo=$row->PHOTO;
            // $id_photo=$row->OTHER_PHOTO;
            // $sign_photo=$row->SIGNATURE;
            // $party_photo=base64_encode($row->PHOTO);
            // $id_photo=base64_encode($row->OTHER_PHOTO);
            // $sign_photo=base64_encode($row->SIGNATURE);
            // $title = $firstname.'&emsp;'.'-'.'&emsp;'.$lastname.'&emsp;'.'-'.'&emsp;'.$address.'&emsp;'.'-'.'&emsp;'.$phone;
            $title = $row->party_id;
            $res.='{ "title":"'.$title.'","id": "'.$row->PID.'","firstname":"'.$firstname.'","firstname":"'.$firstname.'","member_id":"'.$member_id.'","member_points":"'.$member_points.'","rating":"'.$rating.'","party":"'.$party_photo.'","idproof":"'.$id_photo.'","sign":"'.$sign_photo.'","address":"'.$address.'","phone":"'.$phone.'"},';

            
        }
        $res=rtrim($res,',');
        $res.=']';
      }
      else{
        $res.=']';
      }
      // print_r($res);exit();
      print_r($res);die();
    }


      public function userList()
      {
        $search =  $_GET['query']; 
        $rows   = $this->Chit_model->getUsers($search);
        $res='[';
        if(count($rows)>0) {
          foreach($rows as $row )
          {
              $title='';
              $name='';
              $firstname = $row->NAME;
              $lastname=$row->NAME;
              
                if($row->TYPE_OF_RECORD=='O'){
                $CITY=  ($row->CITY=='')?'--':$row->CITY;
                }
                else
                {
                    $area_det=$this->db->query("SELECT * FROM CITY WHERE CITYID='".$row->CITY_ID."'")->row();
                    $CITY=  $area_det->CITYNAME;
                }
                if($row->TYPE_OF_RECORD=='O'){
                     $ADDRESS2=($row->ADDRESS2=='')?'--':$row->ADDRESS2;
                }
                else
                {
                    $area_det =$this->db->query("SELECT * FROM VILLAGE WHERE VILLAGEID='".$row->VILLAGE_ID."'")->row();
                    $ADDRESS2 = $area_det->VILLAGENAME;
                }

                if($row->TYPE_OF_RECORD=='O'){
                     $ADDRESS1 = ($row->ADDRESS1=='')?'--':$row->ADDRESS1;
                }
                else
                {
                    $area_det=$this->db->query("SELECT * FROM STREET WHERE STREETID='".$row->STREET_ID."'")->row();
                    $ADDRESS1 =  $area_det->STREETNAME;
                }

              $address=$ADDRESS1.', '.$ADDRESS2.', '.$CITY;
              $member_id=$row->MEMBERSHIP_ID;
              
              if ($member_id) {
                 $card_details=$this->db->query("SELECT * FROM MEMBERSHIP_CARD WHERE MEMBERSHIP_ID='".$member_id."'")->row();

             }
             if(isset($card_details)){
                    $member_ids   =  $card_details->MEMBERSHIP_NO;
                    $member_points=  $card_details->POINTS;
              }else{

                    $member_ids   = '';
                    $member_points= '';

              }
              


              
              
              $rating=$row->RATING;
              $phone=$row->PHONE;
              $party_photo=base64_encode($row->PHOTO);
              $id_photo   =base64_encode($row->OTHER_PHOTO);
              $sign_photo =base64_encode($row->SIGNATURE);
              // $title = $firstname.'&emsp;'.'-'.'&emsp;'.$lastname.'&emsp;'.'-'.'&emsp;'.$address.'&emsp;'.'-'.'&emsp;'.$phone;
              $title = $row->NAME.'--'.$row->LASTNAME_PREFIX.','.$row->FATHERSNAME.'--'.$ADDRESS1.','.$ADDRESS2.','.$CITY.'--'.$row->PHONE;
              $res.='{ "title":"'.$title.'","id": "'.$row->PID.'","firstname":"'.$firstname.'","lastname":"'.$lastname.'","member_id":"'.$member_ids.'","member_points":"'.$member_points.'","rating":"'.$rating.'","party":"'.$party_photo.'","idproof":"'.$id_photo.'","sign":"'.$sign_photo.'","address":"'.$address.'","phone":"'.$phone.'"},';

              
          }
          $res=rtrim($res,',');
          $res.=']';
        }
        else{
          $res.=']';
        }
        print_r($res);exit();
      }
      public function get_card_type()
      {
          $pid=$this->input->post('id');
          $card_type='';
          $card_details=$this->db->query("SELECT * FROM MEMBERSHIP_CARD WHERE PID='".$pid."'")->row();
          if(isset($card_details))
          {
              if($card_details->CARD_TYPE=='Gold'){
                $card_type='<span style="background-color:#ffaa00;border-radius: 8px;padding: 5px 15px 5px 15px;">Gold</span>';
              // $card_type=$card_details->CARD_TYPE;
              // $card_type="gold";

              }
              else if($card_details->CARD_TYPE=='Silver'){
                $card_type='<span style="background-color:#d2d4dc;border-radius: 8px;padding: 5px 15px 5px 15px;">Silver</span>';
              }
              else if($card_details->CARD_TYPE=='Platinum')
              {
                $card_type='<span style="background-color:#f4fdff;border-radius: 8px;padding: 5px 15px 5px 15px;">Platinum</span>';
              }
              echo $card_type;
            }
           
      }
      public function chit_deposit($id)
      {
        $data['chit'] = $this->db->query("SELECT * FROM CHIT_LIST WHERE sno='".$id."' ")->row();
        if (isset($data['chit'])) {
        $data['party'] = $this->db->query("SELECT * FROM PARTIES WHERE PID = '". $data['chit']->party_id."' ")->row();
        $party_det=$this->db->query("SELECT PHOTO FROM PARTIES WHERE PID='".$data['chit']->party_id."'")->row();
         if($party_det->PHOTO!='')
         {
         $data['div'] = '<img src="data:image/jpg;charset=utf8;base64,'.base64_encode($party_det->PHOTO).'"  height="125px" width="125px">';
         }
         else
         {
          $data['div'] = '<img src="'.base_url().'assets/images/party.jpg" height="125px" width="125px" >';
         }
         $member_id=$data['party']->MEMBERSHIP_ID;
              
            if ($member_id!='') {

             $card_details=$this->db->query("SELECT * FROM MEMBERSHIP_CARD WHERE MEMBERSHIP_ID='".$member_id."'")->row();

            }else{
                $card_details='';
            }
            if($card_details!=''){
                    $data['member_ids']    =  $card_details->MEMBERSHIP_NO;
                    $data['member_points'] =  $card_details->POINTS;
                    $data['card_type']     =  $card_details->CARD_TYPE;
            }else{

                    $data['member_ids']    = '';
                    $data['member_points'] = '';
                    $data['card_type'] = '';
            }
        }
            // print_r($card_details);
            // print_r($data['member_points']);
            // exit;
        $this->load->view('chit/chit_deposit',$data);
      }
      
      public function deposit_chit_id($id)
      {
       
          $data['party_id_hidden'] = $this->input->post('party_id_hidden');
          $data['chit_date']   = $this->input->post('chit_date');
          $data['chit_id']     = $this->input->post('chit_id');
          $data['ava_balance'] = $this->input->post('ava_balance');
          $data['scheme_id'] = $this->input->post('scheme_id1');
        
          $data['scheme_type'] = $this->input->post('scheme_type');
          $data['sm_cash_box'] = $this->input->post('sm_cash_box');
          $data['tm_cash_box'] = $this->input->post('tm_cash_box');
          $data['tm_gold_box'] = $this->input->post('tm_gold_box');
          $data['net_gm_lab1'] = $this->input->post('net_gm_lab1');
          $data['created_by'] = $_SESSION['username'];
          $data['modified_by'] = $_SESSION['username'];  


        $m_id = $this->db->query("SELECT MEMBERSHIP_ID FROM PARTIES WHERE PID = '".$data['party_id_hidden']."' ")->row();
        $data['m_points_ad']          = $this->input->post('m_points_ad')?$this->input->post('m_points_ad'):0;
        $data['cus_rating']           = $this->input->post('cus_rating');
        $data['MEMBERSHIP_NO']        = $this->input->post('mem_card_no_hidden');
        $data['membership_id_hidden'] = $m_id->MEMBERSHIP_ID?$m_id->MEMBERSHIP_ID:'';
  
          $result = $this->Chit_model->dp_chit_entry($data);
          if ($result) {            
            add_notification(date('Y-m-d H:i:s'), '', "Others", "Chit<br> New Deposit", $data['chit_id']. ' created By ' .$_SESSION['username'],'', $_SESSION['USERID'], '0', $data['scheme_id']);
             if ($data['m_points_ad']>0 && $data['MEMBERSHIP_NO']!='') {
            $mpoint = $this->Chit_model->add_mpoint($data);
            $mem_trans_his = [
                                'MEMBERSHIP_NO' => $data['MEMBERSHIP_NO'], 
                                'PID'           => $data['party_id_hidden'], 
                                'LOG_DATE'      => date("Y-m-d",strtotime($data['chit_date'])), 
                                'PROCESS'       => 'Chit Deposit', 
                                'POINTS_EARNED' => $data['m_points_ad']?$data['m_points_ad']:0, 
                                'CREATED_BY'    => $data['created_by'], 
                                'CREATED_ON'    => date('Y-m-d H:i:s'),
                                'STATUS_TYPE'   => 'In',
                                'BILLNO'        => $data['chit_id'],
                                'RATING'        => $data['cus_rating']?$data['cus_rating']:0, 
                            ];
            // $mem_trans_result = $this->db->insert('MEMBERSHIP_HISTORY',$mem_trans_his);
            $mem_trans_result = $this->db->query("INSERT INTO MEMBERSHIP_HISTORY (MEMBERSHIP_NO, PID, LOG_DATE, PROCESS, POINTS_EARNED, CREATED_BY, CREATED_ON, STATUS_TYPE, BILLNO, RATING)
                VALUES (
                    '".$mem_trans_his['MEMBERSHIP_NO']."',
                    '".$mem_trans_his['PID']."',
                    '".$mem_trans_his['LOG_DATE']."',
                    '".$mem_trans_his['PROCESS']."',
                    '".$mem_trans_his['POINTS_EARNED']."',
                    '".$mem_trans_his['CREATED_BY']."',
                    '".$mem_trans_his['CREATED_ON']."',
                    '".$mem_trans_his['STATUS_TYPE']."',
                    '".$mem_trans_his['BILLNO']."',
                    '".$mem_trans_his['RATING']."'
                )");

            }
            if ($data['cus_rating']!='') {
                $rating_his = [ 
                                    'PID'           => $data['party_id_hidden'], 
                                    'LOG_DATE'      => date("Y-m-d",strtotime($data['chit_date'])), 
                                    'PROCESS'       => 'Chit Deposit', 
                                    'RATING'        => $data['cus_rating']?$data['cus_rating']:0, 
                                    'COMPANYCODE'   => $_SESSION['COMPANYCODE']?$_SESSION['COMPANYCODE']:'', 
                                    'CREATED_BY'    => $data['created_by'], 
                                    'CREATED_ON'    => date('Y-m-d H:i:s'),
                                    'BILLNO'        => $data['chit_id'],
                                ];
                $rat = $this->db->query("UPDATE PARTIES SET RATING='".$data['cus_rating']."' WHERE PID = '".$data['party_id_hidden']."' ");
                // $rat_his_result = $this->db->insert('CUSTOMER_RATING_HISTORY',$rating_his);
                 $rat_his_result = $this->db->query("INSERT INTO CUSTOMER_RATING_HISTORY (PID, LOG_DATE, PROCESS, RATING, COMPANYCODE, CREATED_BY, CREATED_ON, BILLNO)
                VALUES (
                    '".$rating_his['PID']."',
                    '".$rating_his['LOG_DATE']."',
                    '".$rating_his['PROCESS']."',
                    '".$rating_his['RATING']."',
                    '".$rating_his['COMPANYCODE']."',
                    '".$rating_his['CREATED_BY']."',
                    '".$rating_his['CREATED_ON']."',
                    '".$rating_his['BILLNO']."')");
            }
              $result_trans = $this->Chit_model->dp_chit_trans($data);
              $pid = [];
              $data['cash_val'] = 'Cash';
              $data['cash_amt'] = $this->input->post('cash_amt')?$this->input->post('cash_amt'):0;
              $data['cash_details'] = $this->input->post('cash_details');
      
              $cash = $this->Chit_model->dp_cash_entry($data);
              if($cash == 1)
              {
                  $pid[] = $this->db->query("SELECT payment_id FROM payment_inward_outward ORDER BY payment_id DESC ")->row();
              }
              $data['bank_val'] = 'Cheque';
              $data['bank_amt'] = $this->input->post('bank_amt')?$this->input->post('bank_amt'):0;
              $data['bank_name'] = $this->input->post('bank_name');
              $data['cheque_no'] = $this->input->post('cheque_no');
              $data['bank_details'] = $this->input->post('bank_details');
      
              $bank = $this->Chit_model->dp_bank_entry($data);
              if($bank == 1)
              {
                  $pid[] = $this->db->query("SELECT payment_id FROM payment_inward_outward ORDER BY payment_id DESC ")->row();
              }
              $data['rtgs_val'] = 'RTGS';
              $data['rtgs_amt'] = $this->input->post('rtgs_amt')?$this->input->post('rtgs_amt'):0;
              $data['rtgs_name'] = $this->input->post('rtgs_name');
              $data['rtgs_no'] = $this->input->post('rtgs_no');
              $data['rtgs_details'] = $this->input->post('rtgs_details');
      
              $rtgs = $this->Chit_model->dp_rtgs_entry($data);
              if($rtgs == 1)
              {
                  $pid[] = $this->db->query("SELECT payment_id FROM payment_inward_outward ORDER BY payment_id DESC ")->row();
              }
              $data['upi_val'] = 'UPI';
              $data['upi_amt'] = $this->input->post('upi_amt')?$this->input->post('upi_amt'):0;
              $data['upi_no']  = $this->input->post('upi_no');
              $data['upi_details'] = $this->input->post('upi_details');
      
              $upi = $this->Chit_model->dp_upi_entry($data);
              if($upi == 1)
              {
                  $pid[] = $this->db->query("SELECT payment_id FROM payment_inward_outward ORDER BY payment_id DESC ")->row();
              }
              // print_r($pid);
                $data = json_decode(json_encode($pid),true);
                // print_r($data);
                $arr = array();
                foreach($data as $i=> $val)
                {
                    $arr[] = implode(",",$val);
                }
                // print_r($arr);
                $p = implode(",",$arr);
                // print_r($p);
                $chit_tr = $this->db->query("SELECT * FROM CHIT_TRANSACTION ORDER BY sno DESC")->row();
                $res = $this->db->query("UPDATE CHIT_TRANSACTION SET payment_id = '".$p."' WHERE sno = '".$chit_tr->sno."' ");
            }
             $data['chit_ids']     = $this->input->post('chit_id');

                if($result)
                {
                    $this->session->set_flashdata('g_success', $data['chit_ids'].' Chit Deposit successfully...');
                }else{
                    $this->session->set_flashdata('g_err', 'Could not approve Deposit Entry!');
                }
                // print_r($_SESSION['g_success']); exit;
          redirect("Chit"); 
         
      }
      public function chit_withdraw($id)
      {

        $data['chit'] = $this->db->query("SELECT * FROM CHIT_LIST WHERE sno='".$id."' AND scheme_type!=3 ")->row();
        if (isset($data['chit'])) {
        $data['party'] = $this->db->query("SELECT * FROM PARTIES WHERE PID = '". $data['chit']->party_id."' ")->row();
         $party_det=$this->db->query("SELECT PHOTO FROM PARTIES WHERE PID='".$data['chit']->party_id."'")->row();
         if($party_det->PHOTO!='')
         {
         $data['div'] = '<img src="data:image/jpg;charset=utf8;base64,'.base64_encode($party_det->PHOTO).'"  height="125px" width="125px">';
         }
         else
         {
          $data['div'] = '<img src="'.base_url().'assets/images/party.jpg" height="125px" width="125px" >';
         }
         $member_id=$data['party']->MEMBERSHIP_ID;
              
            if ($member_id!='') {

             $card_details=$this->db->query("SELECT * FROM MEMBERSHIP_CARD WHERE MEMBERSHIP_ID='".$member_id."'")->row();

            }else{
                $card_details='';
            }
            if($card_details!=''){
                    $data['member_ids']    =  $card_details->MEMBERSHIP_NO;
                    $data['member_points'] =  $card_details->POINTS;
                    $data['card_type']     =  $card_details->CARD_TYPE;
            }else{

                    $data['member_ids']    = '';
                    $data['member_points'] = '';
                    $data['card_type'] = '';
            }
        }
        //  print_r($data['div']);exit;
        $this->load->view('chit/chit_withdraw',$data);
      }
      public function withdraw_chit_id($id)
      {
       
        // print_r(1);exit();
          $data['party_id_hidden'] = $this->input->post('party_id_hidden');
          $data['chit_date']       = $this->input->post('chit_date');
          $data['chit_id']         = $this->input->post('chit_id');
          $data['ava_balance']     = $this->input->post('ava_balance');
          $data['scheme_id']       = $this->input->post('scheme_id1');        
          $data['scheme_type']     = $this->input->post('scheme_type');
          $data['sm_cash_box']     = $this->input->post('sm_cash_box');
          $data['tm_cash_box']     = $this->input->post('tm_cash_box');
          $data['tm_gold_box']     = $this->input->post('tm_gold_box');
          $data['created_by']      = $_SESSION['username'];
          $data['modified_by']     = $_SESSION['username'];   


        $m_id = $this->db->query("SELECT MEMBERSHIP_ID FROM PARTIES WHERE PID = '".$data['party_id_hidden']."' ")->row();
        $data['m_points_ad']          = $this->input->post('m_points_ad')?$this->input->post('m_points_ad'):0;
        $data['cus_rating']           = $this->input->post('cus_rating');
        $data['MEMBERSHIP_NO']        = $this->input->post('mem_card_no_hidden');
        $data['membership_id_hidden'] = $m_id->MEMBERSHIP_ID?$m_id->MEMBERSHIP_ID:'';



        
       
      
  
  
          $result = $this->Chit_model->wt_chit_entry($data);

          if ($result) {            
            add_notification(date('Y-m-d H:i:s'), '', "Others", "Chit<br> New Withdraw", $data['chit_id']. ' created By ' .$_SESSION['username'],'', $_SESSION['USERID'], '0', $data['scheme_id']);

            if ($data['m_points_ad']>0 && $data['MEMBERSHIP_NO']!='') {
            $mpoint = $this->Chit_model->add_mpoint($data);
            $mem_trans_his = [
                                'MEMBERSHIP_NO' => $data['MEMBERSHIP_NO'], 
                                'PID'           => $data['party_id_hidden'], 
                                'LOG_DATE'      => date("Y-m-d",strtotime($data['chit_date'])), 
                                'PROCESS'       => 'Chit Widthdraw', 
                                'POINTS_EARNED' => $data['m_points_ad']?$data['m_points_ad']:0, 
                                'CREATED_BY'    => $data['created_by'], 
                                'CREATED_ON'    => date('Y-m-d H:i:s'),
                                'STATUS_TYPE'   => 'Out',
                                'BILLNO'        => $data['chit_id'],
                                'RATING'        => $data['cus_rating']?$data['cus_rating']:0, 
                            ];

            // $mem_trans_result = $this->db->insert('MEMBERSHIP_HISTORY',$mem_trans_his);
            $mem_trans_result = $this->db->query("INSERT INTO MEMBERSHIP_HISTORY (MEMBERSHIP_NO, PID, LOG_DATE, PROCESS, POINTS_EARNED, CREATED_BY, CREATED_ON, STATUS_TYPE, BILLNO, RATING)
                VALUES (
                    '".$mem_trans_his['MEMBERSHIP_NO']."',
                    '".$mem_trans_his['PID']."',
                    '".$mem_trans_his['LOG_DATE']."',
                    '".$mem_trans_his['PROCESS']."',
                    '".$mem_trans_his['POINTS_EARNED']."',
                    '".$mem_trans_his['CREATED_BY']."',
                    '".$mem_trans_his['CREATED_ON']."',
                    '".$mem_trans_his['STATUS_TYPE']."',
                    '".$mem_trans_his['BILLNO']."',
                    '".$mem_trans_his['RATING']."'
                )");


            }
            if ($data['cus_rating']!='') {
                $rating_his = [ 
                                    'PID'           => $data['party_id_hidden'], 
                                    'LOG_DATE'      => date("Y-m-d",strtotime($data['chit_date'])), 
                                    'PROCESS'       => 'Chit Widthdraw', 
                                    'RATING'        => $data['cus_rating']?$data['cus_rating']:0, 
                                    'COMPANYCODE'   => $_SESSION['COMPANYCODE']?$_SESSION['COMPANYCODE']:'', 
                                    'CREATED_BY'    => $data['created_by'], 
                                    'CREATED_ON'    => date('Y-m-d H:i:s'),
                                    'BILLNO'        => $data['chit_id'],
                                ];
                $rat = $this->db->query("UPDATE PARTIES SET RATING='".$data['cus_rating']."' WHERE PID = '".$data['party_id_hidden']."' ");
                // $rat_his_result = $this->db->insert('CUSTOMER_RATING_HISTORY',$rating_his);
                 $rat_his_result = $this->db->query("INSERT INTO CUSTOMER_RATING_HISTORY (PID, LOG_DATE, PROCESS, RATING, COMPANYCODE, CREATED_BY, CREATED_ON, BILLNO)
                VALUES (
                    '".$rating_his['PID']."',
                    '".$rating_his['LOG_DATE']."',
                    '".$rating_his['PROCESS']."',
                    '".$rating_his['RATING']."',
                    '".$rating_his['COMPANYCODE']."',
                    '".$rating_his['CREATED_BY']."',
                    '".$rating_his['CREATED_ON']."',
                    '".$rating_his['BILLNO']."')");
            }



          
          
  
  
          $result_tran = $this->Chit_model->wt_chit_trans($data);   
          $pid = [];
          $data['cash_val'] = 'Cash';
          $data['cash_amt'] = $this->input->post('cash_amt')?$this->input->post('cash_amt'):0;
          $data['cash_details'] = $this->input->post('cash_details');
  
          $cash = $this->Chit_model->wd_cash_entry($data);
          if($cash == 1)
          {
              $pid[] = $this->db->query("SELECT payment_id FROM payment_inward_outward ORDER BY payment_id DESC ")->row();
          }
          $data['bank_val'] = 'Cheque';
          $data['bank_amt'] = $this->input->post('bank_amt')?$this->input->post('bank_amt'):0;
          $data['bank_name'] = $this->input->post('bank_name');
          $data['cheque_no'] = $this->input->post('cheque_no');
          $data['bank_details'] = $this->input->post('bank_details');
  
          $bank = $this->Chit_model->wd_bank_entry($data);
          if($bank == 1)
          {
              $pid[] = $this->db->query("SELECT payment_id FROM payment_inward_outward ORDER BY payment_id DESC ")->row();
          }
          $data['rtgs_val'] = 'RTGS';
          $data['rtgs_amt'] = $this->input->post('rtgs_amt')?$this->input->post('rtgs_amt'):0;
          $data['rtgs_name'] = $this->input->post('rtgs_name');
          $data['rtgs_no'] = $this->input->post('rtgs_no');
          $data['rtgs_details'] = $this->input->post('rtgs_details');
  
          $rtgs = $this->Chit_model->wd_rtgs_entry($data);
          if($rtgs == 1)
          {
              $pid[] = $this->db->query("SELECT payment_id FROM payment_inward_outward ORDER BY payment_id DESC ")->row();
          }
  
          $data['upi_val'] = 'UPI';
          $data['upi_amt'] = $this->input->post('upi_amt')?$this->input->post('upi_amt'):0;
          $data['upi_no']  = $this->input->post('upi_no');
          $data['upi_details'] = $this->input->post('upi_details'); 
          // print_r($data['upi_amt']);
          $upi = $this->Chit_model->wd_upi_entry($data);
          if($upi == 1)
          {
              $pid[] = $this->db->query("SELECT payment_id FROM payment_inward_outward ORDER BY payment_id DESC ")->row();
          }
            $data = json_decode(json_encode($pid),true);
            $arr = array();
            foreach($data as $i=> $val)
            {
                $arr[] = implode(",",$val);
            }
            // print_r($arr);
            $p = implode(",",$arr);
            // print_r($p);
            $chit_tr = $this->db->query("SELECT * FROM CHIT_TRANSACTION ORDER BY sno DESC")->row();
            $res = $this->db->query("UPDATE CHIT_TRANSACTION SET payment_id = '".$p."' WHERE sno = '".$chit_tr->sno."' ");
            // print_r($res);exit;
    }
                $data['chit_ids']     = $this->input->post('chit_id');

                if($result)
                {
                    $this->session->set_flashdata('g_success', $data['chit_ids'].' Chit Withdrawn successfully...');
                }else{
                    $this->session->set_flashdata('g_err', 'Could not Withdrawn Deposit Entry!');
                }

                // print_r($data['chit_ids']); 
                // exit();
          redirect('Chit'); 
         
      }
      public function edit_chit($id)
      {
        $chit_id = str_replace("_","/",$id);
        // print_r($chit_id);exit;
        $data['chit'] = $this->db->query("SELECT * FROM CHIT_LIST WHERE chit_id = '".$chit_id."' ")->row();
        $ava_amt = $data['chit']->ava_balance;
        $scheme_id = $data['chit']->scheme_id;
        // print_r($scheme_id);exit;
        if($ava_amt == 0)
        {
            $result = $this->Chit_model->edit_chit($chit_id,$scheme_id);
            $this->session->set_flashdata('g_success', $chit_id.' Chit Closed Successfully...');
        }
        else{
            $this->session->set_flashdata('g_err', 'Could not Close the Chit!');
        }
        redirect("Chit");
      }
      public function chit_delete($id)
      {
        $chit_id = str_replace("_","/",$id);
        // print_r("UPDATE CHIT_LIST SET status = 'N' WHERE chit_id = '".$id."' ");
        $list = $this->db->query("SELECT * FROM CHIT_LIST WHERE chit_id = '".$chit_id."' ")->row();
        $chit_list = $this->db->query("UPDATE CHIT_LIST SET status = 'N' WHERE chit_id = '".$chit_id."' ");
        $chit_trans = $this->db->query("UPDATE CHIT_TRANSACTION SET status = 'N' WHERE scheme_id = '".$list->scheme_id."' ");
        // $chit_master = $this->db->query("UPDATE CHIT_MASTER SET status = 'N' WHERE party_id = '".$list->party_id."' ");
        add_notification(date('Y-m-d H:i:s'), '', "Others", "Chit<br> Deleted", $chit_id. ' created By ' .$_SESSION['username'],'', $_SESSION['USERID'], '0', $list->scheme_id);
        redirect("Chit");
      }
      public function chit_list_export()
      {
        // print_r(1);exit;
        $data['party_fil'] = $this->input->post('party_fil');
        if($data['party_fil']!=''){
            $party_fil =" AND PARTIES.NAME  LIKE '%".$data['party_fil']."%' ";
        }
        else{
            $party_fil ='';
        }
        // print_r($party_fil);exit;
        $objPHPExcel = new PHPExcel();
        $activeSheet = $objPHPExcel->getActiveSheet();
        $styleArray  = array(
                'font' => array(
                    'bold' => true,
                    'color' => array('rgb' => '000000')
                )
            );

        $objPHPExcel->getActiveSheet()->getStyle('A1')->applyFromArray($styleArray);
        $objPHPExcel->getActiveSheet()->setCellValue('A1', 'Party Info');
        $objPHPExcel->getActiveSheet()->getStyle('B1');
        $objPHPExcel->getActiveSheet()->setCellValue('B1', 'Selvamagal');
        $objPHPExcel->getActiveSheet()->mergeCells('C1:D1');
        $objPHPExcel->getActiveSheet()->setCellValue('C1', 'Thangamagal');
        $objPHPExcel->getActiveSheet()->getStyle('E1');
        $objPHPExcel->getActiveSheet()->setCellValue('E1', 'Total No of Chit');
        $objPHPExcel->getActiveSheet()->getStyle('B2');
        $objPHPExcel->getActiveSheet()->setCellValue('B2', 'Amount');
        $objPHPExcel->getActiveSheet()->getStyle('C2');
        $objPHPExcel->getActiveSheet()->setCellValue('C2', 'Amount');
        $objPHPExcel->getActiveSheet()->getStyle('D2');
        $objPHPExcel->getActiveSheet()->setCellValue('D2', 'Gold');

        $result = $this->db->query("SELECT PARTIES.NAME, PARTIES.PID, PARTIES.RATING, CHIT_MASTER.party_id
        FROM PARTIES
        INNER JOIN CHIT_MASTER ON PARTIES.PID = CHIT_MASTER.party_id WHERE CHIT_MASTER.status = 'Y' 
        $party_fil ORDER BY CHIT_MASTER.sno DESC ")->result_array();

        $data['chit_list'] = $result;
        $arr = [];
        foreach($data['chit_list'] as $chit)
        {
            $pid = $chit['PID'];

            $part_sm_count = $this->db->query("SELECT COUNT(scheme_type) as sm_count FROM CHIT_LIST WHERE party_id = '".$pid."' AND scheme_type = '1' AND status = 'Y' ")->result_array();
            // print_r("SELECT COUNT(scheme_type) as sm_count FROM CHIT_LIST WHERE party_id = '".$pid."' AND scheme_type = '1' AND status = 'Y' ");exit;
            // print_r($part_sm_count);
            $part_tmc_count = $this->db->query("SELECT COUNT(scheme_type) as tmc_count FROM CHIT_LIST WHERE party_id = '".$pid."' AND scheme_type = '2' AND status = 'Y' ")->result_array();
            $part_tmg_count = $this->db->query("SELECT COUNT(scheme_type) as tmg_count FROM CHIT_LIST WHERE party_id = '".$pid."' AND scheme_type = '3' AND status = 'Y' ")->result_array();

            $part_sm_amt = $this->db->query("SELECT SUM(ava_balance) as sm_balance FROM CHIT_LIST WHERE party_id = '".$pid."' AND scheme_type = '1' AND status = 'Y' ")->result_array();
            $part_tmc_amt = $this->db->query("SELECT SUM(ava_balance) as tmc_balance FROM CHIT_LIST WHERE party_id = '".$pid."' AND scheme_type = '2' AND status = 'Y' ")->result_array();
            $part_tmg_amt = $this->db->query("SELECT SUM(ava_balance) as tmg_balance FROM CHIT_LIST WHERE party_id = '".$pid."' AND scheme_type = '3' AND status = 'Y' ")->result_array();


            $arr[] = [
                'pid' => $chit['PID'],
                'name' => $chit['NAME'],
                'rating' => $chit['RATING'],
                // 'balance' => $chit['ava_balance'],
                'sm_count' => $part_sm_count[0]['sm_count'],
                'tmc_count' => $part_tmc_count[0]['tmc_count'],
                'tmg_count' => $part_tmg_count[0]['tmg_count'],
                'sm_ava_balance' => $part_sm_amt[0]['sm_balance'],
                'tmc_ava_balance' => $part_tmc_amt[0]['tmc_balance'],
                'tmg_ava_balance' => $part_tmg_amt[0]['tmg_balance'],
            ];
        }
    
    
        $i=3;foreach($arr as $val){
            $objPHPExcel->getActiveSheet()->setCellValue('A'.$i, $val['name']);
            $objPHPExcel->getActiveSheet()->setCellValue('B'.$i, $val['sm_count']." - ".$val['sm_ava_balance']);
            $objPHPExcel->getActiveSheet()->setCellValue('C'.$i, $val['tmc_count']." - ".$val['tmc_ava_balance']);
            $objPHPExcel->getActiveSheet()->setCellValue('D'.$i, $val['tmg_count']." - ".$val['tmg_ava_balance']);
            $objPHPExcel->getActiveSheet()->setCellValue('E'.$i, $val['sm_count']+$val['tmc_count']+$val['tmg_count']);
            // $objPHPExcel->getActiveSheet()->setCellValue('F'.$i, $val['brand']);
            // $objPHPExcel->getActiveSheet()->setCellValue('G'.$i, IND_money_format($val['min_price']));
            // $objPHPExcel->getActiveSheet()->setCellValue('H'.$i, $val['length']);
            // $objPHPExcel->getActiveSheet()->setCellValue('I'.$i, $val['breadth']);
            // $objPHPExcel->getActiveSheet()->setCellValue('J'.$i, $val['deapth']);
        $i++;
            }

        $filename='Chit List.xlsx'; //save our workbook as this file name
        header('Content-Type: application/vnd.ms-excel'); //mime type
        header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell browser what's the file name
        header('Cache-Control: max-age=0'); //no cache
    
        //save it to Excel5 format (excel 2003 .XLS file), change this to 'Excel2007' (and adjust the filename extension, also the header mime type)
        //if you want to save it as .XLSX Excel 2007 format
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007'); 
        $objPHPExcel->setActiveSheetIndex(0);
    
        if (ob_get_contents()) ob_end_clean();
            //force user to download the Excel file without writing it to server's HD
            $objWriter->save('php://output'); 
      }

      public function chit_transaction_export()
      {
        // print_r(1);exit;
        $data['party_fil'] = $this->input->post('party_fil');
        if($data['party_fil'] !=''){
        $party_fil =" AND PARTIES.NAME LIKE '%".$data['party_fil']."%' ";
        
        }
        else{
            $party_fil ='';
        }
        // print_r($party_fil);exit;
        $data['scheme_sel'] = $this->input->post('scheme_sel');
        $data['sch_cashgold'] = $this->input->post('sch_cashgold');
            // print_r($data['sch_cashgold']);exit;
            // exit();
       
        
        if($data['scheme_sel'] =='1')
        {
        $scheme_sel = " AND CHIT_TRANSACTION.scheme_type ='1'";
        }
        
        else
        {
            
          if($data['sch_cashgold'] =='1')
          {
            $scheme_sel = " AND CHIT_TRANSACTION.scheme_type ='2'";

          }
          else if($data['sch_cashgold'] =='2')
          {
            $scheme_sel = " AND CHIT_TRANSACTION.scheme_type ='3'";
             
        }
        else{
            $scheme_sel = '';
        }
    }
        $data['sta_sel'] = $this->input->post('sta_sel');
        
        if($data['sta_sel'] =='5')
        {
            $sta_sel = "AND CHIT_TRANSACTION.transaction_type ='5' ";
        }
        else if($data['sta_sel'] =='4')
        {
            $sta_sel = " AND CHIT_TRANSACTION.transaction_type ='4' "; 
        }
        else if($data['sta_sel'] =='3')
        {
            $sta_sel = " AND CHIT_TRANSACTION.transaction_type ='3' ";
          
        }
        else if($data['sta_sel'] =='2')
        {
            $sta_sel = " AND CHIT_TRANSACTION.transaction_type ='2' ";
           
        }
        else if($data['sta_sel'] =='1')
        {
            $sta_sel = " AND CHIT_TRANSACTION.transaction_type ='1' ";
        }
        else{
            $sta_sel = '';
        }
    
        $data['dt_fill'] = $this->input->post('dt_fill_sales_list');
        $data['from_date_fillter'] = $this->input->post('from_date_fillter_sales_list');
        $data['to_date_fillter'] = $this->input->post('to_date_fillter_sales_list');
        $fdate ='';
        $tdate ='';
        
  
        if($data['dt_fill']=="all"){
                $fdate ='';
                $tdate ='';
        }
        if($data['dt_fill']=="today"){
                $data['today_date_fillter'] = date("Y-m-d");
                $fdate =" AND CHIT_TRANSACTION.trans_date='".$data['today_date_fillter']."'";
                $tdate ='';   
        }
        if($data['dt_fill']=="week"){
            $today=date('l');
                if($today=="Sunday"){
                    $data['week_from_date_fillter']=date(' Y-m-d', strtotime("sunday 0 week"));

                    $data['week_to_date_fillter']=date(' Y-m-d', strtotime("saturday 1 week"));
                // print_r($data['week_to_date_fillter']);exit;
                        $fdate =" AND CHIT_TRANSACTION.trans_date>='".$data['week_from_date_fillter']."'";
                    $tdate =" AND CHIT_TRANSACTION.trans_date<='".$data['week_to_date_fillter']."'";

                }else{
                $data['week_from_date_fillter']=date(' Y-m-d', strtotime("sunday -1 week"));

                $data['week_to_date_fillter']=date(' Y-m-d', strtotime("saturday 0 week"));
                //  print_r($data['week_to_date_fillter']);exit;
                    $fdate =" AND CHIT_TRANSACTION.trans_date>='".$data['week_from_date_fillter']."'";
                $tdate =" AND CHIT_TRANSACTION.trans_date<='".$data['week_to_date_fillter']."'";
                }
                }
                if($data['dt_fill']=="monthly"){
            
                    $first=date('Y-m-01');
                    $last=date('Y-m-t');
                    $fdate =" AND CHIT_TRANSACTION.trans_date>='".$first."'";
                    
                
                            $tdate ="AND CHIT_TRANSACTION.trans_date<='".$last."'";
                    }
                    if($data['dt_fill']=="custom Date"){
                    if($data['from_date_fillter']!=''){
                            $first=date('Y-m-d',strtotime($data['from_date_fillter']));
                            $fdate =" AND CHIT_TRANSACTION.trans_date>='".$first."'";
                            
                            }
                            else{
                                $fdate ='';
                            }
                            if($data['to_date_fillter']!=''){
                                $last=date('Y-m-d',strtotime($data['to_date_fillter']));
                                $tdate =" AND CHIT_TRANSACTION.trans_date<='".$last."'";
                                
                                }
                                else{
                                    $tdate ='';
                                } }
        $objPHPExcel = new PHPExcel();
        $activeSheet = $objPHPExcel->getActiveSheet();
        $styleArray = array(
                'font' => array(
                    'bold' => true,
                    'color' => array('rgb' => '000000')
                )
            );

        $objPHPExcel->getActiveSheet()->getStyle('A1')->applyFromArray($styleArray);
        $objPHPExcel->getActiveSheet()->setCellValue('A1', 'Date');
        $objPHPExcel->getActiveSheet()->getStyle('B1')->applyFromArray($styleArray);
        $objPHPExcel->getActiveSheet()->setCellValue('B1', 'Party Info');
        $objPHPExcel->getActiveSheet()->getStyle('C1')->applyFromArray($styleArray);
        $objPHPExcel->getActiveSheet()->setCellValue('C1', 'Chit ID');
        $objPHPExcel->getActiveSheet()->getStyle('D1')->applyFromArray($styleArray);
        $objPHPExcel->getActiveSheet()->setCellValue('D1', 'Scheme');
        $objPHPExcel->getActiveSheet()->getStyle('E1')->applyFromArray($styleArray);
        $objPHPExcel->getActiveSheet()->setCellValue('E1', 'Type');
        $objPHPExcel->getActiveSheet()->getStyle('F1')->applyFromArray($styleArray);
        $objPHPExcel->getActiveSheet()->setCellValue('F1', 'Open Balance');
        $objPHPExcel->getActiveSheet()->getStyle('G1')->applyFromArray($styleArray);
        $objPHPExcel->getActiveSheet()->setCellValue('G1', 'Process Amount');
        $objPHPExcel->getActiveSheet()->getStyle('H1')->applyFromArray($styleArray);
        $objPHPExcel->getActiveSheet()->setCellValue('H1', 'Closing Balance');
        $objPHPExcel->getActiveSheet()->getStyle('I1')->applyFromArray($styleArray);
        $objPHPExcel->getActiveSheet()->setCellValue('I1', 'Status');
        // print_r("SELECT PARTIES.NAME, PARTIES.RATING, PARTIES.PID, PARTIES.MEMBERSHIP_POINTS,
        // CHIT_TRANSACTION.status, CHIT_TRANSACTION.party_id, CHIT_TRANSACTION.trans_date,CHIT_TRANSACTION.scheme_type, 
        // CHIT_TRANSACTION.scheme_id, CHIT_TRANSACTION.transaction_type, CHIT_TRANSACTION.opening_amount, 
        // CHIT_TRANSACTION.processing_amount, CHIT_TRANSACTION.closing_balance, CHIT_TRANSACTION.amt_paid ,
        // CHIT_TRANSACTION.payment_id
        // FROM PARTIES
        // INNER JOIN CHIT_TRANSACTION 
        // ON PARTIES.PID = CHIT_TRANSACTION.party_id 
        // WHERE CHIT_TRANSACTION.status = 'Y' $fdate $tdate $party_fil $scheme_sel $sta_sel ");exit;

        $result = $this->db->query("SELECT PARTIES.NAME, PARTIES.RATING, PARTIES.PID, PARTIES.MEMBERSHIP_POINTS,
        CHIT_TRANSACTION.status, CHIT_TRANSACTION.party_id, CHIT_TRANSACTION.trans_date,CHIT_TRANSACTION.scheme_type, 
        CHIT_TRANSACTION.scheme_id, CHIT_TRANSACTION.transaction_type, CHIT_TRANSACTION.opening_amount, 
        CHIT_TRANSACTION.processing_amount, CHIT_TRANSACTION.closing_balance, CHIT_TRANSACTION.amt_paid ,
        CHIT_TRANSACTION.payment_id
        FROM PARTIES
        INNER JOIN CHIT_TRANSACTION 
        ON PARTIES.PID = CHIT_TRANSACTION.party_id 
        WHERE CHIT_TRANSACTION.status = 'Y' $fdate $tdate $party_fil $scheme_sel $sta_sel ORDER BY CHIT_TRANSACTION.sno DESC ")->result_array();

        $data['chit_all_trans_list'] = $result;
        // print_r($result);exit;
        $arr = [];
        foreach($data['chit_all_trans_list'] as $chit)
        {
            $pid = $chit['PID'];

            if($chit['RATING']==1) 
            { $RATING = 'color:#50cd89;'; }
            else if($chit['RATING']==2) 
            { $RATING = 'color:#ffc700;'; }
            else if($chit['RATING']==3) 
            { $RATING = 'color:red;'; }
            else if($chit['RATING']=='' || is_null($chit['RATING'])) 
            { $RATING = 'color:#d2d4dc;'; }
            else 
            { $RATING = ''; }
            if($chit['scheme_type']==3)
            { $SCHEME = "Thangamagal"; }
            elseif($chit['scheme_type']==2)
            { $SCHEME = "Thangamagal"; }
            elseif($chit['scheme_type']==1)
            { $SCHEME = "Selvamagal"; }
            else  
            { $SCHEME = "-"; }

            if($chit['scheme_type']==3)
            { $SCHEME_TYPE = "Gold"; }
            elseif($chit['scheme_type']==2)
            { $SCHEME_TYPE = "Cash"; }
            elseif($chit['scheme_type']==1)
            { $SCHEME_TYPE = "Cash"; }
            else  
            { $SCHEME_TYPE = "-"; }
            $OPEN_AMT = round($chit['opening_amount'],2);

            if($chit['scheme_type']==3)
            {
                $PROCESS_AMT =  round($chit['processing_amount'],2).'/'.round($chit['amt_paid'],2);
            }
            else
            {
                $PROCESS_AMT =  round($chit['processing_amount'],2);
            }
            $CLOSE_AMT = round($chit['closing_balance'],2);

            if($chit['transaction_type']==5)
            { $STATUS = "Withdraw-Loan"; }
            elseif($chit['transaction_type']==4)
            { $STATUS = "Withdraw-Sales"; }
            elseif($chit['transaction_type']==3)
            { $STATUS = "Interest-added"; }
            elseif($chit['transaction_type']==2)
            { $STATUS = "Withdraw"; }
            elseif($chit['transaction_type']==1)
            { $STATUS = "Deposit"; }
            else 
            { $STATUS = "<span>-</span>"; }
            $chit_list = $this->db->query("SELECT * FROM CHIT_LIST WHERE scheme_id = '".$chit['scheme_id']."' ")->row();


            $arr[] = [
                'date' => $chit['trans_date'],
                'name' => $chit['NAME'],
                'rating' => $RATING,
                'chit_id' => $chit_list->chit_id,
                'scheme' => $SCHEME,
                'scheme_type' => $SCHEME_TYPE,
                'open_amt' => $OPEN_AMT,
                'close_amt' => $CLOSE_AMT,
                'process_amt' => $PROCESS_AMT,
                'status' => $STATUS,
            ];
        }
        // print_r($arr);exit;
    
    
        $i=2;
        foreach($arr as $val){
            $objPHPExcel->getActiveSheet()->setCellValue('A'.$i, $val['date']);
            $objPHPExcel->getActiveSheet()->setCellValue('B'.$i, $val['name']);
            $objPHPExcel->getActiveSheet()->setCellValue('C'.$i, $val['chit_id']);
            $objPHPExcel->getActiveSheet()->setCellValue('D'.$i, $val['scheme']);
            $objPHPExcel->getActiveSheet()->setCellValue('E'.$i, $val['scheme_type']);
            $objPHPExcel->getActiveSheet()->setCellValue('F'.$i, IND_money_format($val['open_amt']));
            $objPHPExcel->getActiveSheet()->setCellValue('G'.$i, IND_money_format($val['process_amt']));
            $objPHPExcel->getActiveSheet()->setCellValue('H'.$i, IND_money_format($val['close_amt']));
            $objPHPExcel->getActiveSheet()->setCellValue('I'.$i, $val['status']);
            // $objPHPExcel->getActiveSheet()->setCellValue('J'.$i, $val['deapth']);
        $i++;
            }

        $filename='Chit Transaction History.xlsx'; //save our workbook as this file name
        header('Content-Type: application/vnd.ms-excel'); //mime type
        header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell browser what's the file name
        header('Cache-Control: max-age=0'); //no cache
    
        //save it to Excel5 format (excel 2003 .XLS file), change this to 'Excel2007' (and adjust the filename extension, also the header mime type)
        //if you want to save it as .XLSX Excel 2007 format
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007'); 
        $objPHPExcel->setActiveSheetIndex(0);
    
        if (ob_get_contents()) ob_end_clean();
            //force user to download the Excel file without writing it to server's HD
            $objWriter->save('php://output'); 
      }
       public function chit_transaction_export_single($id)
      {
        // print_r(1);exit;
        $data['party_fil'] = $this->input->post('party_fil');
        if($data['party_fil'] !=''){
        $party_fil =" AND PARTIES.NAME LIKE '%".$data['party_fil']."%' ";
        
        }
        else{
            $party_fil ='';
        }
        // print_r($party_fil);exit;
        $data['scheme_sel'] = $this->input->post('scheme_sel');
        $data['sch_cashgold'] = $this->input->post('sch_cashgold');
            // print_r($data['sch_cashgold']);exit;
            // exit();
       
        
        if($data['scheme_sel'] =='1')
        {
        $scheme_sel = " AND CHIT_TRANSACTION.scheme_type ='1'";
        }
        
        else
        {
            
          if($data['sch_cashgold'] =='1')
          {
            $scheme_sel = " AND CHIT_TRANSACTION.scheme_type ='2'";

          }
          else if($data['sch_cashgold'] =='2')
          {
            $scheme_sel = " AND CHIT_TRANSACTION.scheme_type ='3'";
             
        }
        else{
            $scheme_sel = '';
        }
    }
        $data['sta_sel'] = $this->input->post('sta_sel');
        
        if($data['sta_sel'] =='5')
        {
            $sta_sel = "AND CHIT_TRANSACTION.transaction_type ='5' ";
        }
        else if($data['sta_sel'] =='4')
        {
            $sta_sel = " AND CHIT_TRANSACTION.transaction_type ='4' "; 
        }
        else if($data['sta_sel'] =='3')
        {
            $sta_sel = " AND CHIT_TRANSACTION.transaction_type ='3' ";
          
        }
        else if($data['sta_sel'] =='2')
        {
            $sta_sel = " AND CHIT_TRANSACTION.transaction_type ='2' ";
           
        }
        else if($data['sta_sel'] =='1')
        {
            $sta_sel = " AND CHIT_TRANSACTION.transaction_type ='1' ";
        }
        else{
            $sta_sel = '';
        }
    
        $data['dt_fill'] = $this->input->post('dt_fill_sales_list');
        $data['from_date_fillter'] = $this->input->post('from_date_fillter_sales_list');
        $data['to_date_fillter'] = $this->input->post('to_date_fillter_sales_list');
        $fdate ='';
        $tdate ='';
        
  
        if($data['dt_fill']=="all"){
                $fdate ='';
                $tdate ='';
        }
        if($data['dt_fill']=="today"){
                $data['today_date_fillter'] = date("Y-m-d");
                $fdate =" AND CHIT_TRANSACTION.trans_date='".$data['today_date_fillter']."'";
                $tdate ='';   
        }
        if($data['dt_fill']=="week"){
            $today=date('l');
                if($today=="Sunday"){
                    $data['week_from_date_fillter']=date(' Y-m-d', strtotime("sunday 0 week"));

                    $data['week_to_date_fillter']=date(' Y-m-d', strtotime("saturday 1 week"));
                // print_r($data['week_to_date_fillter']);exit;
                        $fdate =" AND CHIT_TRANSACTION.trans_date>='".$data['week_from_date_fillter']."'";
                    $tdate =" AND CHIT_TRANSACTION.trans_date<='".$data['week_to_date_fillter']."'";

                }else{
                $data['week_from_date_fillter']=date(' Y-m-d', strtotime("sunday -1 week"));

                $data['week_to_date_fillter']=date(' Y-m-d', strtotime("saturday 0 week"));
                //  print_r($data['week_to_date_fillter']);exit;
                    $fdate =" AND CHIT_TRANSACTION.trans_date>='".$data['week_from_date_fillter']."'";
                $tdate =" AND CHIT_TRANSACTION.trans_date<='".$data['week_to_date_fillter']."'";
                }
                }
                if($data['dt_fill']=="monthly"){
            
                    $first=date('Y-m-01');
                    $last=date('Y-m-t');
                    $fdate =" AND CHIT_TRANSACTION.trans_date>='".$first."'";
                    
                
                            $tdate ="AND CHIT_TRANSACTION.trans_date<='".$last."'";
                    }
                    if($data['dt_fill']=="custom Date"){
                    if($data['from_date_fillter']!=''){
                            $first=date('Y-m-d',strtotime($data['from_date_fillter']));
                            $fdate =" AND CHIT_TRANSACTION.trans_date>='".$first."'";
                            
                            }
                            else{
                                $fdate ='';
                            }
                            if($data['to_date_fillter']!=''){
                                $last=date('Y-m-d',strtotime($data['to_date_fillter']));
                                $tdate =" AND CHIT_TRANSACTION.trans_date<='".$last."'";
                                
                                }
                                else{
                                    $tdate ='';
                                } }
        $objPHPExcel = new PHPExcel();
        $activeSheet = $objPHPExcel->getActiveSheet();
        $styleArray = array(
                'font' => array(
                    'bold' => true,
                    'color' => array('rgb' => '000000')
                )
            );

        $objPHPExcel->getActiveSheet()->getStyle('A1')->applyFromArray($styleArray);
        $objPHPExcel->getActiveSheet()->setCellValue('A1', 'Date');
        $objPHPExcel->getActiveSheet()->getStyle('B1')->applyFromArray($styleArray);
        $objPHPExcel->getActiveSheet()->setCellValue('B1', 'Party Info');
        $objPHPExcel->getActiveSheet()->getStyle('C1')->applyFromArray($styleArray);
        $objPHPExcel->getActiveSheet()->setCellValue('C1', 'Chit ID');
        $objPHPExcel->getActiveSheet()->getStyle('D1')->applyFromArray($styleArray);
        $objPHPExcel->getActiveSheet()->setCellValue('D1', 'Scheme');
        $objPHPExcel->getActiveSheet()->getStyle('E1')->applyFromArray($styleArray);
        $objPHPExcel->getActiveSheet()->setCellValue('E1', 'Type');
        $objPHPExcel->getActiveSheet()->getStyle('F1')->applyFromArray($styleArray);
        $objPHPExcel->getActiveSheet()->setCellValue('F1', 'Open Balance');
        $objPHPExcel->getActiveSheet()->getStyle('G1')->applyFromArray($styleArray);
        $objPHPExcel->getActiveSheet()->setCellValue('G1', 'Process Amount');
        $objPHPExcel->getActiveSheet()->getStyle('H1')->applyFromArray($styleArray);
        $objPHPExcel->getActiveSheet()->setCellValue('H1', 'Closing Balance');
        $objPHPExcel->getActiveSheet()->getStyle('I1')->applyFromArray($styleArray);
        $objPHPExcel->getActiveSheet()->setCellValue('I1', 'Status');
        // print_r("SELECT PARTIES.NAME, PARTIES.RATING, PARTIES.PID, PARTIES.MEMBERSHIP_POINTS,
        // CHIT_TRANSACTION.status, CHIT_TRANSACTION.party_id, CHIT_TRANSACTION.trans_date,CHIT_TRANSACTION.scheme_type, 
        // CHIT_TRANSACTION.scheme_id, CHIT_TRANSACTION.transaction_type, CHIT_TRANSACTION.opening_amount, 
        // CHIT_TRANSACTION.processing_amount, CHIT_TRANSACTION.closing_balance, CHIT_TRANSACTION.amt_paid ,
        // CHIT_TRANSACTION.payment_id
        // FROM PARTIES
        // INNER JOIN CHIT_TRANSACTION 
        // ON PARTIES.PID = CHIT_TRANSACTION.party_id 
        // WHERE CHIT_TRANSACTION.status = 'Y' $fdate $tdate $party_fil $scheme_sel $sta_sel ");exit;

        $result = $this->db->query("SELECT PARTIES.NAME, PARTIES.RATING, PARTIES.PID, PARTIES.MEMBERSHIP_POINTS,
        CHIT_TRANSACTION.status, CHIT_TRANSACTION.party_id, CHIT_TRANSACTION.trans_date,CHIT_TRANSACTION.scheme_type, 
        CHIT_TRANSACTION.scheme_id, CHIT_TRANSACTION.transaction_type, CHIT_TRANSACTION.opening_amount, 
        CHIT_TRANSACTION.processing_amount, CHIT_TRANSACTION.closing_balance, CHIT_TRANSACTION.amt_paid ,
        CHIT_TRANSACTION.payment_id
        FROM PARTIES
        INNER JOIN CHIT_TRANSACTION 
        ON PARTIES.PID = CHIT_TRANSACTION.party_id 
        WHERE CHIT_TRANSACTION.status = 'Y' and CHIT_TRANSACTION.party_id = '".$id."'   $fdate $tdate $party_fil $scheme_sel $sta_sel ORDER BY CHIT_TRANSACTION.sno DESC ")->result_array();

        $data['chit_all_trans_list'] = $result;
        // print_r($result);exit;
        $arr = [];
        foreach($data['chit_all_trans_list'] as $chit)
        {
            $pid = $chit['PID'];

            if($chit['RATING']==1) 
            { $RATING = 'color:#50cd89;'; }
            else if($chit['RATING']==2) 
            { $RATING = 'color:#ffc700;'; }
            else if($chit['RATING']==3) 
            { $RATING = 'color:red;'; }
            else if($chit['RATING']=='' || is_null($chit['RATING'])) 
            { $RATING = 'color:#d2d4dc;'; }
            else 
            { $RATING = ''; }
            if($chit['scheme_type']==3)
            { $SCHEME = "Thangamagal"; }
            elseif($chit['scheme_type']==2)
            { $SCHEME = "Thangamagal"; }
            elseif($chit['scheme_type']==1)
            { $SCHEME = "Selvamagal"; }
            else  
            { $SCHEME = "-"; }

            if($chit['scheme_type']==3)
            { $SCHEME_TYPE = "Gold"; }
            elseif($chit['scheme_type']==2)
            { $SCHEME_TYPE = "Cash"; }
            elseif($chit['scheme_type']==1)
            { $SCHEME_TYPE = "Cash"; }
            else  
            { $SCHEME_TYPE = "-"; }
            $OPEN_AMT = round($chit['opening_amount'],2);

            if($chit['scheme_type']==3)
            {
                $PROCESS_AMT =  round($chit['processing_amount'],2).'/'.round($chit['amt_paid'],2);
            }
            else
            {
                $PROCESS_AMT =  round($chit['processing_amount'],2);
            }
            $CLOSE_AMT = round($chit['closing_balance'],2);

            if($chit['transaction_type']==5)
            { $STATUS = "Withdraw-Loan"; }
            elseif($chit['transaction_type']==4)
            { $STATUS = "Withdraw-Sales"; }
            elseif($chit['transaction_type']==3)
            { $STATUS = "Interest-added"; }
            elseif($chit['transaction_type']==2)
            { $STATUS = "Withdraw"; }
            elseif($chit['transaction_type']==1)
            { $STATUS = "Deposit"; }
            else 
            { $STATUS = "<span>-</span>"; }
            $chit_list = $this->db->query("SELECT * FROM CHIT_LIST WHERE scheme_id = '".$chit['scheme_id']."' ")->row();


            $arr[] = [
                'date' => $chit['trans_date'],
                'name' => $chit['NAME'],
                'rating' => $RATING,
                'chit_id' => $chit_list->chit_id,
                'scheme' => $SCHEME,
                'scheme_type' => $SCHEME_TYPE,
                'open_amt' => $OPEN_AMT,
                'close_amt' => $CLOSE_AMT,
                'process_amt' => $PROCESS_AMT,
                'status' => $STATUS,
            ];
        }
        // print_r($arr);exit;
    
    
        $i=2;
        foreach($arr as $val){
            $objPHPExcel->getActiveSheet()->setCellValue('A'.$i, $val['date']);
            $objPHPExcel->getActiveSheet()->setCellValue('B'.$i, $val['name']);
            $objPHPExcel->getActiveSheet()->setCellValue('C'.$i, $val['chit_id']);
            $objPHPExcel->getActiveSheet()->setCellValue('D'.$i, $val['scheme']);
            $objPHPExcel->getActiveSheet()->setCellValue('E'.$i, $val['scheme_type']);
            $objPHPExcel->getActiveSheet()->setCellValue('F'.$i, IND_money_format($val['open_amt']));
            $objPHPExcel->getActiveSheet()->setCellValue('G'.$i, IND_money_format($val['process_amt']));
            $objPHPExcel->getActiveSheet()->setCellValue('H'.$i, IND_money_format($val['close_amt']));
            $objPHPExcel->getActiveSheet()->setCellValue('I'.$i, $val['status']);
            // $objPHPExcel->getActiveSheet()->setCellValue('J'.$i, $val['deapth']);
        $i++;
            }

        $filename='Chit Transaction History.xlsx'; //save our workbook as this file name
        header('Content-Type: application/vnd.ms-excel'); //mime type
        header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell browser what's the file name
        header('Cache-Control: max-age=0'); //no cache
    
        //save it to Excel5 format (excel 2003 .XLS file), change this to 'Excel2007' (and adjust the filename extension, also the header mime type)
        //if you want to save it as .XLSX Excel 2007 format
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007'); 
        $objPHPExcel->setActiveSheetIndex(0);
    
        if (ob_get_contents()) ob_end_clean();
            //force user to download the Excel file without writing it to server's HD
            $objWriter->save('php://output'); 
      }

}
?>