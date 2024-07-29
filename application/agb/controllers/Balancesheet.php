<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/* ************************************************************************************
		Purpose : To handle all Balancesheet functions 2022-09-28
***************************************************************************************/
class Balancesheet extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model(array("Balancesheet_model","Accountsgroup_model"));
    	$this->load->library('user_agent');
        $fin_year=$this->Accountsgroup_model->get_fin_years_list();
        $db=substr($fin_year->DBNAME,0,strlen($fin_year->DBNAME)-4);
        //echo $db;exit;
        $config_app = switch_db_dynamic($db);
        
        $this->Balancesheet_model->other_db = $this->load->database($config_app,TRUE);
    	if (isset($this->session->userdata['username']) && $this->session->userdata['username'] == TRUE)
        {
            //do something
        }else{
            redirect('login'); //if session is not there, redirect to login page
        } 
		date_default_timezone_set("Asia/Kolkata");
    	$this->session->set_userdata('comtitle', 'Balancesheet');
	}

    public function index()
    {
        $ccode = $_SESSION['COMPANYCODE'];
        $cdate = date('Y-m-d');

        /*echo "<pre>";
        print_r($_POST);
        exit;*/

        if($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            $month_period = $this->input->post('month_period');
            $stdate = $start_date = $this->input->post('start_date');
            $end_date = $this->input->post('end_date');

            $type = $this->input->post('type');
            $balance_type = $this->input->post('balance_type');

            $data['month_period'] = $month_period;
            $data['start_date'] = $start_date;
            $data['end_date'] = $end_date;
            $data['type'] = $type;
            $data['balance_type'] = $balance_type;
        }
        else
        {
            $cdate = date('Y-m-d');

            $stdate = $start_date = $cdate;
            $end_date = $cdate;

            $month_period = $data['month_period'] = 'month';
            $data['start_date'] = $cdate;
            $data['end_date'] = $cdate;
            $type = $data['type'] = 'detailed';
            $balance_type = $data['balance_type'] = 'all';
        }


        if($month_period=='month')
        {
            $data['start_date'] = $start_date = date('Y-m-01', strtotime($stdate));
            $data['end_date'] = $end_date = date('Y-m-t', strtotime($stdate));
        }
        /*echo $start_date."<br>";
        echo $end_date;exit;*/

        $vOpeningStock = 0;
        $vOpeningStock2 = 0;
        $vOpeningStockValue = 0;
        $vOpeningStockValue2 = 0;

        $gold_op_stock = $this->Balancesheet_model->get_gold_opening_stock();
        if(!is_null($gold_op_stock->gopqty))
        {
            $vOpeningStock = $gold_op_stock->gopqty;
        }
        else
        {
            $vOpeningStock = 0;
        }
        if(!is_null($gold_op_stock->gopval))
        {
            $vOpeningStockValue = $gold_op_stock->gopval;
        }
        else
        {
            $vOpeningStockValue = 0;
        }

        $silver_op_stock = $this->Balancesheet_model->get_silver_opening_stock();
        if(!is_null($silver_op_stock->sopqty))
        {
            $vOpeningStock2 = $silver_op_stock->sopqty;
        }
        else
        {
            $vOpeningStock2 = 0;
        }
        if(!is_null($silver_op_stock->sopval))
        {
            $vOpeningStockValue2 = $silver_op_stock->sopval;
        }
        else
        {
            $vOpeningStockValue2 = 0;
        }

        $vClosingStockValue = 0;
        $vClosingStockValue2 = 0;

        $gold_cs_stock = $this->Balancesheet_model->get_gold_product_list();
        foreach($gold_cs_stock as $gcs)
        {
            $inv_master_rate = $this->Balancesheet_model->get_last_invoice_master_by_item($gcs['ITEM_SNO'],$end_date);
            if(count((array)$inv_master_rate)>0)
            {
                $prev_purchase_rate = $inv_master_rate->RATE;
            }
            else
            {
                $prod_item = $this->Balancesheet_model->get_product_by_item_no($gcs['ITEM_SNO']);
                if(count((array)$prod_item)>0 && !is_null($prod_item->OP_RATE))
                {
                    $prev_purchase_rate = $prod_item->OP_RATE;
                }
                elseif(count((array)$prod_item)>0 && !is_null($prod_item->PURCHASE_RATE))
                {
                    $prev_purchase_rate = $prod_item->PURCHASE_RATE;
                }
                else
                {
                    $prev_purchase_rate = 0;
                }
            }

            $vClosingStockAmt = $gcs['STOCK_QTY'] * $prev_purchase_rate;
            $vClosingStockValue = $vClosingStockValue + $vClosingStockAmt;
        }

        $silver_cs_stock = $this->Balancesheet_model->get_silver_product_list();
        foreach($silver_cs_stock as $scs)
        {
            $inv_master_rate = $this->Balancesheet_model->get_last_invoice_master_by_item($scs['ITEM_SNO'],$end_date);
            if(count((array)$inv_master_rate)>0)
            {
                $prev_purchase_rate = $inv_master_rate->RATE;
            }
            else
            {
                $prod_item = $this->Balancesheet_model->get_product_by_item_no($scs['ITEM_SNO']);
                if(count((array)$prod_item)>0 && !is_null($prod_item->OP_RATE))
                {
                    $prev_purchase_rate = $prod_item->OP_RATE;
                }
                elseif(count((array)$prod_item)>0 && !is_null($prod_item->PURCHASE_RATE))
                {
                    $prev_purchase_rate = $prod_item->PURCHASE_RATE;
                }
                else
                {
                    $prev_purchase_rate = 0;
                }
            }

            $vClosingStockAmt = $scs['STOCK_QTY'] * $prev_purchase_rate;
            $vClosingStockValue = $vClosingStockValue + $vClosingStockAmt;
        }

        $vTotDebits = 0;
        $vTotCredits = 0;

        //Income Ledgers
        $income_ledger_list = $this->Balancesheet_model->get_income_ledger_list();
        if(count((array)$income_ledger_list)>0)
        {
            foreach($income_ledger_list as $ill)
            {
                $income_voucher_master_amount = $this->Balancesheet_model->get_income_voucher_master_amount_by_ledger_no($ill['LEDGER_SNO'],$start_date,$end_date);
                if(count((array)$income_voucher_master_amount)>0)
                {
                    $vTotCredits = $vTotCredits + $income_voucher_master_amount->creditamt;
                }
            }
        }

        //Expense Ledgers
        $expense_ledger_list = $this->Balancesheet_model->get_expense_ledger_list();
        if(count((array)$expense_ledger_list)>0)
        {
            foreach($expense_ledger_list as $ill)
            {
                $expense_voucher_master_amount = $this->Balancesheet_model->get_expense_voucher_master_amount_by_ledger_no($ill['LEDGER_SNO'],$start_date,$end_date);
                if(count((array)$expense_voucher_master_amount)>0)
                {
                    $vTotDebits = $vTotDebits + $expense_voucher_master_amount->debitamt;
                }
            }
        }

        $vTotDebits = $vTotDebits + $vOpeningStockValue + $vOpeningStockValue2;
        $vTotCredits = $vTotCredits + $vClosingStockValue + $vClosingStockValue2;

        if(abs($vTotDebits)<abs($vTotCredits))
        {
            $vNetProfit = abs($vTotCredits)-abs($vTotDebits);
            $vNetLoss = 0;
        }
        else
        {
            $vNetLoss = abs($vTotDebits)-abs($vTotCredits);
            $vNetProfit = 0;
        }

        $data['vOpeningStockValue'] = $vOpeningStockValue;
        $data['vOpeningStockValue2'] = $vOpeningStockValue2;

        $data['vNetProfit'] = $vNetProfit;
        $data['vNetLoss'] = $vNetLoss;

        $data['vClosingStockValue'] = $vClosingStockValue;
        $data['vClosingStockValue2'] = $vClosingStockValue2;

        $data['liabilities_group'] = $this->Balancesheet_model->get_liabilities_group();
        $data['assets_group'] = $this->Balancesheet_model->get_assets_group();

        $this->load->view('balancesheet/balancesheet_list',$data);
    }

}
?>