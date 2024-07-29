<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/* ************************************************************************************
		Purpose : To hANDle all dashboard functions
		Date    : 23-10-2018 
***************************************************************************************/
class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
    	$this->load->model(array('Dashboard_model'));
		
		if (isset($this->session->userdata['username']) && $this->session->userdata['username'] == TRUE)
        {
            
        }else{
            redirect('login'); //if session is not there, redirect to login page
        } 
		date_default_timezone_set("Asia/Kolkata");
		$this->session->set_userdata('comtitle', 'Dashboard');
	}
	
	/* ************************************************************************************
						Purpose : To handle dashboard Functions
	**********************************************************************/
	public function index()
	{
		//loan
		$data['todayloan'] = $this->Dashboard_model->getloantodaycount();
		$data['yesterdayloan'] = $this->Dashboard_model->getloanyesterdaycount();
		$data['overallloan'] = $this->Dashboard_model->getoverallcount();

		//receipt
		$data['todayreceipt'] = $this->Dashboard_model->getreceipttodaycount();
		$data['yesterdayreceipt'] = $this->Dashboard_model->getreceiptyesterdaycount();
		$data['overallreceipt'] = $this->Dashboard_model->getreceiptoverallcount();

		//loan company based amounttotal
		$data['akploantotalamount'] = $this->Dashboard_model->getakploanamt();
		$data['agkloantotalamount'] = $this->Dashboard_model->getagkloanamt();
		$data['agnloantotalamount'] = $this->Dashboard_model->getagnloanamt();
		$data['agbloantotalamount'] = $this->Dashboard_model->getagbloanamt();


		//receipt company based amounttotal
		$data['receiptakploantotalamount'] = $this->Dashboard_model->getreceiptakploanamt();
		$data['receiptagkloantotalamount'] = $this->Dashboard_model->getreceiptagkloanamt();
		$data['receiptagnloantotalamount'] = $this->Dashboard_model->getreceiptagnloanamt();
		$data['receiptagbloantotalamount'] = $this->Dashboard_model->getreceiptagbloanamt();


		//print_r($data['agbloantotalamount']''['totalamt']);exit;
		$this->load->view('dashboard',$data);
	}
	/********************** Start :Realestate Dashboard Controller   **************************************/
	public function real_estate()
	{

		// Get the current month and year
		$current_month = date('m');
		$current_year = date('Y');

		// For properties with property_status as 'Existing'
		$data['property_list'] = $this->db->query("SELECT r.*, p.PHOTO, p.TYPE_OF_RECORD 
		                                           FROM realestate_purchase r
		                                           JOIN PARTIES p ON r.party_id = p.PID
		                                           WHERE r.property_status='Existing' 
		                                           AND r.status='Y' 
		                                           AND YEAR(r.created_on) = $current_year
		                                           AND MONTH(r.created_on) = $current_month
		                                           ORDER BY r.date DESC")->result_array();

		// For properties with property_status as 'New'
		$data['purchase_list'] = $this->db->query("SELECT r.*, p.PHOTO, p.TYPE_OF_RECORD 
		                                           FROM realestate_purchase r
		                                           JOIN PARTIES p ON r.party_id = p.PID
		                                           WHERE r.property_status='New' 
		                                           AND r.status='Y' 
		                                           AND YEAR(r.created_on) = $current_year
		                                           AND MONTH(r.created_on) = $current_month
		                                           ORDER BY r.date DESC")->result_array();

		// For booked properties with balance_amount > 0
		$data['booked_list'] = $this->db->query("SELECT r.*, p.PHOTO, p.TYPE_OF_RECORD 
		                                         FROM realestate_sale r
		                                         JOIN PARTIES p ON r.party_id = p.PID
		                                         WHERE r.status='Y' 
		                                         AND balance_amount > 0 
		                                         AND YEAR(r.created_on) = $current_year
		                                         AND MONTH(r.created_on) = $current_month
		                                         ORDER BY r.date DESC")->result_array();

		// For registered properties with balance_amount <= 0
		$data['registered_list'] = $this->db->query("SELECT r.*, p.PHOTO, p.TYPE_OF_RECORD 
		                                             FROM realestate_sale r
		                                             JOIN PARTIES p ON r.party_id = p.PID
		                                             WHERE r.status='Y' 
		                                             AND balance_amount <= 0 
		                                             AND YEAR(r.created_on) = $current_year
		                                             AND MONTH(r.created_on) = $current_month
		                                             ORDER BY r.date DESC")->result_array();

		// For purchase receipts
		$data['purchase_receipt_list'] = $this->db->query("SELECT * 
		                                                   FROM realestate_purchase_receipt 
		                                                   WHERE status='Y' 
		                                                   AND YEAR(create_on) = $current_year
		                                                   AND MONTH(create_on) = $current_month
		                                                   ORDER BY receipt_date DESC")->result_array();

		// For sale receipts
		$data['sale_receipt_list'] = $this->db->query("SELECT * 
		                                               FROM realestate_sale_receipt 
		                                               WHERE status='Y' 
		                                               AND YEAR(create_on) = $current_year
		                                               AND MONTH(create_on) = $current_month
		                                               ORDER BY receipt_date DESC")->result_array();

		// For purchase receipt balance
		$data['purchase_receipt_balance'] = $this->db->query("SELECT SUM(cr_balance_amount) as amount 
		                                                      FROM realestate_purchase_receipt 
		                                                      WHERE status='Y' 
		                                                      AND YEAR(create_on) = $current_year
		                                                      AND MONTH(create_on) = $current_month")->row();

		// For sale receipt balance
		$data['sale_receipt_balance'] = $this->db->query("SELECT SUM(cr_balance_amount) as amount 
		                                                  FROM realestate_sale_receipt 
		                                                  WHERE status='Y' 
		                                                  AND YEAR(create_on) = $current_year
		                                                  AND MONTH(create_on) = $current_month")->row();


		$data['property_list_count']   = count($data['property_list'] );
		$data['purchase_list_count']   = count($data['purchase_list']); 
		$data['booked_list_count']     = count($data['booked_list']); 
		$data['registered_list_count'] = count($data['registered_list']); 

		
		$monday = strtotime("last sunday");
		$monday = date('w', $monday)==date('w') ? $monday+7*86400 : $monday;
		$sunday = strtotime(date("d-m-Y",$monday)." +6 days");
		$this_week_start = date("d-m-Y",$monday);
		$this_week_end = date("d-m-Y",$sunday);
		// echo "$this_week_start to $this_week_end ";''
		$i=0;
		for($currentDate = strtotime($this_week_start); $currentDate <= strtotime($this_week_end); 
		$currentDate += (86400))
		{

			$data['weekly_purchase_amount'] = $this->db->query("SELECT sum(pro_amount) as amount FROM realestate_purchase WHERE status='Y' AND date='".date('Y-m-d',$currentDate)."' ")->row();
			if($data['weekly_purchase_amount']->amount !=''){
				$data['weekly_purchase'][$i]= $data['weekly_purchase_amount']->amount;
			}
			else{
				$data['weekly_purchase'][$i]= 0;
			}
			$data['weekly_sale_amount'] = $this->db->query("SELECT sum(pro_amount) as amount FROM realestate_sale WHERE status='Y' and date='".date('Y-m-d',$currentDate)."' ")->row();
			if($data['weekly_sale_amount']->amount !=''){
				$data['weekly_sale'][$i]= $data['weekly_sale_amount']->amount;
			}
			else{
				$data['weekly_sale'][$i]= 0;
			}
			$i++;
		}
		$fdate=date('01-m-Y');
		$ldate=date('t-m-Y');
		$i=0;
		for($currentDate = strtotime($fdate); $currentDate <= strtotime($ldate); 
		$currentDate += (86400))
		{
			$data['monthly_sale_amount'] = $this->db->query("SELECT sum(pro_amount) as amount FROM realestate_sale WHERE status='Y' AND date='".date('Y-m-d',$currentDate)."' ")->row();
			if($data['monthly_sale_amount']->amount !=''){
				$data['monthly_sale'][$i]= $data['monthly_sale_amount']->amount;
			}
			else{
				$data['monthly_sale'][$i]= 0;
			}
			$i++;
		}


		$this->load->view('dashboard_real_estate',$data);
	}
	/********************** End   :Realestate Dashboard Controller   **************************************/
	/********************** Start :karupatti Dashboard Controller   **************************************/
	public function karupatti()
	{
		$today=date('Y-m-d');
		$data['sale_list'] = $this->db->query("SELECT sum(c.product_wgt) AS weight,c.product_id FROM AKS_SALE_CART c,AKS_SALE_ENTRY e WHERE e.sale_id=c.sale_id AND e.sale_date='".$today."'  GROUP BY c.product_id ")->result_array();
		$data['top_customers_list']=$this->db->query("SELECT sum(sale_net_amt) AS sale_amount,id_party FROM AKS_SALE_ENTRY WHERE sale_date='".$today."' GROUP BY id_party ORDER BY sale_amount desc")->result_array();
		$data['order_list']=$this->db->query("SELECT * FROM AKS_SALE_CART ")->result_array();

		$data['minimum_stock_list']=$this->db->query("SELECT TOP 5 * 
														FROM AKS_PRD_MASTER 
														WHERE STATUS = 'Y' 
														AND AKS_MIN_STK >= PRD_CUR_QTY 
														ORDER BY PRD_CUR_QTY ASC ")->result_array();

		$data['maximum_stock_list']=$this->db->query("SELECT TOP 5 *  FROM AKS_PRD_MASTER WHERE STATUS='Y' AND AKS_MAX_STK<=PRD_CUR_QTY ORDER BY PRD_CUR_QTY ASC ")->result_array();

		$data['payment_mode_list']=$this->db->query("SELECT 
													SUM(CASE WHEN module_name = 'AKS_PURCHASE' THEN amount ELSE 0 END) AS pamount,
													SUM(CASE WHEN module_name = 'Karupatti Sale' THEN amount ELSE 0 END) AS samount,type_of_payment
													FROM payment_inward_outward WHERE module_name in ('AKS_PURCHASE','Karupatti Sale') 
													AND type_of_payment!='RTGS' 
													AND type_of_payment!='UPI Update' 
													AND type_of_payment!='Cheque Update' 
													AND type_of_payment!='Cash Update'AND 
													CONVERT(date, [created_on]) = CONVERT(date, GETDATE()) 
													GROUP BY type_of_payment")->result_array();



		// $data['packed_order_list']=$this->db->query("SELECT sale_date, COUNT(*) AS pk_count FROM AKS_SALE_ENTRY WHERE packed_by != '' AND status='S' AND sale_date='".$today."' GROUP BY sale_date")->result_array();

		// $data['not_packed_order_list']=$this->db->query("SELECT sale_date, COUNT(*) AS not_pk_count FROM AKS_SALE_ENTRY WHERE packed_by IS NULL AND status='F' GROUP BY sale_date")->result_array();


		$data['packed_order_list']=$this->db->query("SELECT * FROM AKS_SALE_ENTRY WHERE packed_by != '' AND status='S' AND CONVERT(date, [packed_on]) = CONVERT(date, GETDATE()) ")->result_array();

		// print_r($data['packed_order_list']);
		// exit;
		
		$data['not_packed_order_list']=$this->db->query("SELECT sale_date, COUNT(*) AS not_pk_count FROM AKS_SALE_ENTRY WHERE packed_by IS NULL AND status='F' GROUP BY sale_date")->result_array();
		

		// $data['dispatched_order_list']=$this->db->query("SELECT delivery_by, COUNT(*) AS delivery_count FROM AKS_SALE_ENTRY WHERE partial_packing = '0' AND status = 'D' AND delivery_by!='' GROUP BY delivery_by ORDER BY delivery_by ASC")->result_array();

		$data['dispatched_order_list']=$this->db->query("SELECT delivery_by, COUNT(*) AS delivery_count FROM AKS_SALE_ENTRY WHERE partial_packing = '0' AND status = 'D' AND CONVERT(date, [shiped_on]) = CONVERT(date, GETDATE()) AND delivery_by!='' GROUP BY delivery_by ORDER BY delivery_by ASC")->result_array();

		$data['not_dispatched_order_list']=$this->db->query("SELECT * FROM AKS_SALE_ENTRY WHERE status='s' AND sale_deliverymode='courier' AND partial_packing = '0' AND CONVERT(date, [shiped_on]) = CONVERT(date, GETDATE()) AND sale_track_id is NULL  ORDER BY sid ASC")->result_array();

		$data['pa_dispatched_order_list']=$this->db->query("SELECT delivery_by, COUNT(*) AS delivery_count FROM AKS_SALE_ENTRY WHERE partial_packing = '1' AND status = 'D' AND CONVERT(date, [shiped_on]) = CONVERT(date, GETDATE()) AND delivery_by!='' GROUP BY delivery_by ORDER BY delivery_by ASC")->result_array();

		$data['pa_not_dispatched_order_list']=$this->db->query("SELECT * FROM AKS_SALE_ENTRY WHERE status='s' AND sale_deliverymode='courier' AND partial_packing = '1' AND CONVERT(date, [shiped_on]) = CONVERT(date, GETDATE()) AND sale_track_id is NULL  ORDER BY sid ASC")->result_array();

		$data['manualorderlist']=$this->db->query("SELECT sale_net_amt AS totalamount,sale_id,status FROM AKS_SALE_ENTRY WHERE sale_date='".$today."' AND status='D' AND (sale_type='Sales' OR sale_type='Quotation')")->result_array();

		$manualcountget = count($data['manualorderlist']);
		$manualcountget = $manualcountget ? $manualcountget:'0' ;
		$data['manualcount'] = $manualcountget;

		$data['total_manual_amt']=0;
		foreach ($data['manualorderlist'] as $m => $mval) {			
			$data['total_manual_amt'] += floatval($mval['totalamount']?$mval['totalamount']:0);
			$m++;
		}

		$data['pen_manualorderlist']=$this->db->query("SELECT sale_net_amt AS totalamount,sale_id,status FROM AKS_SALE_ENTRY WHERE status!='D' AND sale_date='".$today."' AND status!='N' AND (sale_type='Sales' OR sale_type='Quotation')")->result_array();

		$pmanualcountget = count($data['pen_manualorderlist']);
		$penmanualcountget = $pmanualcountget ? $pmanualcountget:'0' ;
		$data['pen_manualcount'] = $penmanualcountget;

		$data['pen_total_manual_amt']=0;
		foreach ($data['pen_manualorderlist'] as $m => $mval) {			
			$data['pen_total_manual_amt'] += floatval($mval['totalamount']?$mval['totalamount']:0);
			$m++;
		}

		//  Website 
		$data['websiteorderlist']=$this->db->query("SELECT sale_net_amt AS totalamount,sale_id,status FROM AKS_SALE_ENTRY WHERE sale_date='".$today."' AND status='D' AND sale_type='Website' ")->result_array();

		$websitecountget = count($data['websiteorderlist']);
		$websitegetcount = $websitecountget ? $websitecountget:'0' ;
		$data['websitecount'] = $websitegetcount;

		$data['website_total_amount']=0;
		foreach ($data['websiteorderlist'] as $w => $webval) {			
			$data['website_total_amount'] += floatval($webval['totalamount']?$webval['totalamount']:0);
			$w++;
		}

		$data['pen_website_orderlist']=$this->db->query("SELECT sale_net_amt AS totalamount,sale_id,status FROM AKS_SALE_ENTRY WHERE status!='D' AND sale_date='".$today."' AND sale_type='Website' AND status!='N' ")->result_array();

		$pwebsite_countget = count($data['pen_website_orderlist']);
		$penwebsite_countget = $pwebsite_countget ? $pwebsite_countget:'0' ;
		$data['pen_website_count'] = $penwebsite_countget;

		$data['pen_total_website_amt']=0;
		foreach ($data['pen_website_orderlist'] as $m => $mval) {			
			$data['pen_total_website_amt'] += floatval($mval['totalamount']?$mval['totalamount']:0);
			$m++;
		}
		// print_r($data['pen_website_orderlist']);
		// print_r($data['pen_total_website_amt']);
		// print_r($penwebsite_countget); 
		// exit;
		$data['sale_list_count']     = count($data['sale_list']);
		$top_cus = $data['top_customers_list']?$data['top_customers_list']:'';
		// print_r($top_cus);exit;
		// $top_cus = $data['top_customers_list']?$data['top_customers_list']:0;
		$data['top_customers_count'] = count($data['top_customers_list']);
		$min_stk = $data['minimum_stock_list']?$data['minimum_stock_list']:'';
		$data['minimum_stock_count'] = count($data['minimum_stock_list']);
		$max_val= $data['maximum_stock_list']?$data['maximum_stock_list']:'';
		$data['maximum_stock_count'] = count($data['maximum_stock_list']);
		$pay_mode = $data['payment_mode_list']?$data['payment_mode_list']:'';
		$data['payment_mode_count']  = count($data['payment_mode_list']);

		$data['total_packed_count']=count($data['packed_order_list']);
		// foreach ($data['packed_order_list'] as $i => $val) {
			
		// 	$data['total_packed_count'] += intval($val['sale_prd_count']?$val['sale_prd_count']:0);
		// 	$i++;
		// }
		$data['total_not_packed_count']=0;
		foreach ($data['not_packed_order_list'] as $i => $val) {
			
			$data['total_not_packed_count'] += intval($val['not_pk_count']?$val['not_pk_count']:0);
			$i++;
		}

		$data['total_dispatch_count']=0;
		foreach ($data['dispatched_order_list'] as $i => $val) {
			
			$data['total_dispatch_count'] += intval($val['delivery_count']?$val['delivery_count']:0);
			$i++;
		}

		$data['total_not_dispatch_count']  = count($data['not_dispatched_order_list']);

		$data['pa_total_dispatch_count']=0;
		foreach ($data['pa_dispatched_order_list'] as $i => $val) {
			
			$data['pa_total_dispatch_count'] += intval($val['delivery_count']?$val['delivery_count']:0);
			$i++;
		}

		$data['pa_total_not_dispatch_count']  = count($data['pa_not_dispatched_order_list']);



		$this->load->view('dashboard_karupatti',$data);
	}
	/********************** End :karupatti Dashboard Controller   **************************************/
	/********************** Start :Chit Dashboard Controller   ****************************************/
	public function chit()
	{
		$today=date('Y-m-d');

		$monday = strtotime("last sunday");
		$monday = date('w', $monday)==date('w') ? $monday+7*86400 : $monday;
		$sunday = strtotime(date("d-m-Y",$monday)." +6 days");
		$this_week_start = date("d-m-Y",$monday);
		$this_week_end = date("d-m-Y",$sunday);
		// echo "$this_week_start to $this_week_end ";
		$i=0;
		for($currentDate = strtotime($this_week_start); $currentDate <= strtotime($this_week_end); 
		$currentDate += (86400))
		{

			$data['weekly_collection_amount'] = $this->db->query("SELECT sum(chit_amount) as amount FROM CHIT_LIST WHERE status='Y' AND chit_date='".date('Y-m-d',$currentDate)."' ")->row();
			if($data['weekly_collection_amount']->amount !=''){
				$data['weekly_collection'][$i]= $data['weekly_collection_amount']->amount;
			}
			else{
				$data['weekly_collection'][$i]= 0;
			}
			
			$i++;
		}
		$fdate=date('01-m-Y');
		$ldate=date('t-m-Y');
		$i=0;
		for($currentDate = strtotime($fdate); $currentDate <= strtotime($ldate); 
		$currentDate += (86400))
		{
			$data['monthly_collection_amount'] = $this->db->query("SELECT sum(chit_amount) as amount FROM CHIT_LIST WHERE status='Y' AND chit_date='".date('Y-m-d',$currentDate)."' ")->row();
			if($data['monthly_collection_amount']->amount !=''){
				$data['monthly_collection'][$i]= $data['monthly_collection_amount']->amount;
			}
			else{
				$data['monthly_collection'][$i]= 0;
			}
			$i++;
		}
		$this->load->view('dashboard_chit',$data);
	}
	/********************** End :Chit Dashboard Controller   **************************************/

	/********************** Start :Realestate Dashboard Controller   **************************************/
	public function jewellery()
	{

		// sales Order
		$today=date('Y-m-d');
		$data['deliveryorders']=$this->db->query("SELECT sales_order.*,PARTIES.NAME,PARTIES.PHOTO,PARTIES.TYPE_OF_RECORD
															  FROM sales_order 
															  LEFT JOIN PARTIES ON sales_order.party_id = PARTIES.PID
															  WHERE sales_order.status='D' AND sales_order.sales_order_date='".$today."' ORDER BY sales_order.created_on DESC")->result_array();
		$deliveryorders_countget = count($data['deliveryorders']); 
		$deliveryorders_count    = $deliveryorders_countget ? $deliveryorders_countget:'0' ;
		$data['deliveryorders_count'] = $deliveryorders_count;
		$data['pendingorders']=$this->db->query("SELECT sales_order.*,PARTIES.NAME,PARTIES.PHOTO,PARTIES.TYPE_OF_RECORD
															  FROM sales_order 
															  LEFT JOIN PARTIES ON sales_order.party_id = PARTIES.PID
															  WHERE sales_order.status!='D' AND sales_order.sales_order_date='".$today."' ORDER BY sales_order.created_on DESC")->result_array();
		$pendingorders_countget = count($data['pendingorders']);
		$pendingorders_count       = $pendingorders_countget ? $pendingorders_countget:'0' ;
		$data['pendingorders_count'] = $pendingorders_count;

		$data['credit_remainders']=$this->db->query("SELECT sales_order.*,PARTIES.NAME,PARTIES.PHOTO,PARTIES.TYPE_OF_RECORD
																	FROM sales_order 
																	LEFT JOIN PARTIES ON sales_order.party_id = PARTIES.PID
																	WHERE sales_order.status!='D' AND sales_order.add_credit_balance='YES' AND sales_order.balance_amount>0 ")->result_array();
		$credit_remainders_countget    = count($data['credit_remainders']);
		$credit_remainders_count       = $credit_remainders_countget ? $credit_remainders_countget:'0' ;
		$data['credit_remainders_count'] = $credit_remainders_count;
		// sales
		$data['sales']=$this->db->query("SELECT * FROM salesentry WHERE sales_date='".$today."' ORDER BY created_on DESC")->result_array();
		$data['salesgoldweight']=0;
		$data['goldcount']=0;
		$data['salesilverweight']=0;
		$data['silvercount']=0;
		foreach ($data['sales'] as $i => $val) {
				
			if($val['sales_gold_count']>0){

				$data['salesgoldweight']   += floatval($val['sales_gold_weight']?$val['sales_gold_weight']:0);
				$data['goldcount']    += floatval($val['sales_gold_count']?$val['sales_gold_count']:0);
			}

			if($val['sales_silver_count']>0){

				$data['salesilverweight']   += floatval($val['sales_silver_weight']?$val['sales_silver_weight']:0);
				$data['silvercount']    += floatval($val['sales_silver_count']?$val['sales_silver_count']:0);
			}
			
			$i++;
		}

		// lot entry Details

		 $data['lotentry_details']  = $this->db->query(" SELECT lot_entry.*, lot_entry_detail.count, 
		 																 lot_entry_detail.tagged,lot_entry_detail.tagged_weight,lot_entry_detail.non_tagged_weight,lot_entry_detail.weight, lot_entry_detail.non_tagged ,COMPANY.COMPANYNAME
																		FROM lot_entry 
																		LEFT JOIN lot_entry_detail ON lot_entry.lot_id = lot_entry_detail.lot_id  
																		LEFT JOIN COMPANY ON lot_entry.company_id = COMPANY.COMPANYCODE  
																		WHERE lot_entry.status = 'A' 
																		  AND lot_entry.lot_no != '' 
																		  AND lot_entry_detail.non_tagged >0
																		ORDER By lot_entry.created_on DESC
																		  ")->result_array();
		$lotentry_countget = count($data['lotentry_details']);
		$lotentrycount = $lotentry_countget ? $lotentry_countget:'0' ;
		$data['lotentrycount'] = $lotentrycount;

		$data['top_customers_list_sale_order']=$this->db->query("SELECT SUM(s.net_payable) AS netamounttotal, s.party_id,
																				 s.company, MAX(p.NAME) AS party_name,MAX(p.PHONE) AS party_phone,MAX(s.sales_order_id)AS orderid, MAX(s.sales_order_date) AS orderdate,MAX(c.COMPANYNAME) AS company_name ,MAX(s.company) AS company_id
																				FROM sales_order AS s
																				LEFT JOIN PARTIES AS p ON s.party_id = p.PID
																				LEFT JOIN COMPANY AS c ON s.company = c.COMPANYCODE
																				WHERE s.status = 'D'
																				  AND MONTH(s.sales_order_date) = MONTH(GETDATE())
																				  AND YEAR(s.sales_order_date) = YEAR(GETDATE())
																				GROUP BY s.party_id, s.company
																				ORDER BY netamounttotal DESC")->result_array();

		$topcus_countget = count($data['top_customers_list_sale_order']);
		$topcustomersales = $topcus_countget ? $topcus_countget:'0' ;
		$data['topcustomersales'] = $topcustomersales;	

		// Membership Card Issue
		$data['membership_card_issue']=$this->db->query("SELECT M.*,C.COMPANYNAME,P.NAME,P.TYPE_OF_RECORD,P.PHOTO
																					FROM MEMBERSHIP_CARD AS M
																					LEFT JOIN COMPANY AS C ON M.COMPANYCODE = C.COMPANYCODE
																					LEFT JOIN PARTIES AS P ON P.PID = M.PID
																					WHERE M.STATUS = 'Y'
																				 	 AND MONTH(M.ISSUE_DATE) = MONTH(GETDATE())
																				  	 AND YEAR(M.ISSUE_DATE)  = YEAR(GETDATE())
																				   ORDER BY M.CREATED_ON DESC
								  													")->result_array();

		$data['mgoldcount']=0;
		$data['msilvercount']=0;
		$data['mplatinumcount']=0;
		foreach ($data['membership_card_issue'] as $mi => $mival) {

				if ($mival['CARD_TYPE']=='Gold') {

					$data['mgoldcount']++;   
				}
				if ($mival['CARD_TYPE']=='Platinum') {
					$data['mplatinumcount']++;
				}
				if ($mival['CARD_TYPE']=='Silver') {
					$data['msilvercount']++;
				}	    
				  
				$mi++;
		}
		
		$mccount = count($data['membership_card_issue']);
		$membership_card_issue_count = $mccount ? $mccount:'0' ;
		$data['membership_card_issue_count'] = $membership_card_issue_count;	


		// Weekly Sales Graphs

		$monday = strtotime("last sunday");
		$monday = date('w', $monday)==date('w') ? $monday+7*86400 : $monday;
		$sunday = strtotime(date("d-m-Y",$monday)." +6 days");
		$this_week_start = date("d-m-Y",$monday);
		$this_week_end = date("d-m-Y",$sunday);
		$i=0;
		for($currentDate = strtotime($this_week_start); $currentDate <= strtotime($this_week_end); 
		$currentDate += (86400))
		{

			
			$data['weekly_sale_amount'] = $this->db->query("SELECT sum(net_total_amount) as amount FROM salesentry WHERE status='Y' and sales_date='".date('Y-m-d',$currentDate)."' ")->row();
			if($data['weekly_sale_amount']->amount !=''){
				$data['weekly_sale'][$i]= $data['weekly_sale_amount']->amount;
			}
			else{
				$data['weekly_sale'][$i]= 0;
			}

			$data['weekly_board_rate'] = $this->db->query("SELECT * FROM DAILY_GOLD_RATES WHERE DATE='".date('Y-m-d',$currentDate)."' ")->row();
			if(isset($data['weekly_board_rate'])){
				$data['weekly_gold_rate'][$i]    = $data['weekly_board_rate']->BOARD_GOLDRATE;
				$data['weekly_silver_rate'][$i]  = $data['weekly_board_rate']->BOARD_SILVERRATE;
			}
			else{
				$data['weekly_gold_rate'][$i]= 0;
				$data['weekly_silver_rate'][$i]= 0;
			}

			$i++;
		}



		// Payment Transaction 


		$data['trans_payment_mode']=$this->db->query("SELECT 
																			SUM(sales_receipt.cash_amt) AS cash_amount ,
																			SUM(sales_receipt.cheque_amt) AS cheque_amount ,
																			SUM(sales_receipt.rtgs_amt) AS rtgs_amount ,
																			SUM(sales_receipt.upi_amt) AS upi_amount ,
																			MAX(COMPANY.COMPANYNAME) AS company_name,
																			MAX(sales_receipt.company_id) AS company_id
																			FROM sales_receipt 
																			LEFT JOIN COMPANY ON sales_receipt.company_id = COMPANY.COMPANYCODE  
																			WHERE sales_receipt.status = 'Y' 
																			AND sales_receipt.company_id != '' 
																			AND CONVERT(date, [date]) = CONVERT(date, GETDATE())
																			GROUP BY sales_receipt.company_id
						  													")->result_array();
		
		$mccount = count($data['trans_payment_mode']);
		$trans_payment_mode_count = $mccount ? $mccount:'0' ;
		$data['trans_payment_mode_count'] = $trans_payment_mode_count;	


		// JST JEWELL

		$data['jst_jewell']=$this->db->query("  SELECT jst_inventory.*,COMPANY.COMPANYNAME,STAFFS.STAFFNAME
												FROM jst_inventory 
												LEFT JOIN COMPANY ON jst_inventory.from_company = COMPANY.COMPANYCODE  
												LEFT JOIN STAFFS  ON jst_inventory.send_via = STAFFS.SNO  
												WHERE jst_inventory.status = 'Y' 
												AND jst_inventory.from_company!= '' 
												AND CONVERT(date, [date]) = CONVERT(date, GETDATE())
												ORDER BY jst_inventory.created_on DESC
												")->result_array();
		
		$jstcount = count($data['jst_jewell']);
		$jst_today_count = $jstcount ? $jstcount:'0' ;
		$data['jst_today_count'] = $jst_today_count;	

		$this->load->view('dashboard_jewellery',$data);
	}
	/********************** End   :Realestate Dashboard Controller   **************************************/




}
   /*********************** END: Dashboard Controller   *******************************************/


?>