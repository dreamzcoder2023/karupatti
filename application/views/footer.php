		<!--begin::Footer-->

		<div class="loader">
		</div>
		<div class="footer py-4 d-flex flex-lg-column" id="kt_footer">
			<!--begin::Container-->
			<div class="container-fluid d-flex flex-column flex-md-row align-items-center justify-content-between">
				<!--begin::Copyright-->
				<center>
				<div class="text-dark order-2 order-md-1">
					<span class="text-muted fw-semibold me-1">2022©</span>
					<a href="javascript:;" class="text-gray-800 text-hover-primary"><b>Ayyanar Gold Bank</b></a>
				</div>
				</center>
				<!--end::Copyright-->
				<!--begin::Menu-->
				<!-- <ul class="menu menu-gray-600 menu-hover-primary fw-semibold order-1">
					<li class="menu-item">
						<a href="https://keenthemes.com" target="_blank" class="menu-link px-2">About</a>
					</li>
					<li class="menu-item">
						<a href="https://devs.keenthemes.com" target="_blank" class="menu-link px-2">Support</a>
					</li>
					<li class="menu-item">
						<a href="https://1.envato.market/EA4JP" target="_blank" class="menu-link px-2">Purchase</a>
					</li>
				</ul> -->
				<!--end::Menu-->
			</div>
			<!--end::Container-->
		</div>
		<!--end::Footer-->

		<!-- DAILY GOLD RATE UPDATE -->

		<?php 

	     	

	     	$current_data = $this->db->query("SELECT TOP 1 * FROM SETUP ")->row();       	

         	$daily_gold_rate_update  =  $this->db->query("SELECT * FROM DAILY_GOLD_RATES WHERE CONVERT(date, [DATE]) = CONVERT(date, GETDATE())")->row();           

         	if ($current_data!='') {
         			
         			$data = [

         					    'DATE'				=> date('Y-m-d'),
						    	'GOLDRATE'			=> $current_data->GOLDRATE, 
						    	'SILVERRATE'		=> $current_data->SILVERRATE,
						    	'BOARD_GOLDRATE'	=> $current_data->BOARD_GOLDRATE,
						    	'BOARD_SILVERRATE'	=> $current_data->BOARD_SILVERRATE,
						    	'RTGS_GOLDRATE'		=> $current_data->RTGS_GOLDRATE,
						    	'RTGS_SILVERRATE'	=> $current_data->RTGS_SILVERRATE,

         					];
     		}
         if (isset($daily_gold_rate_update)) {

         	 	
         	$update = $this->db->query("UPDATE  DAILY_GOLD_RATES 
     														SET
													            GOLDRATE = '".$data['GOLDRATE']."',
													            SILVERRATE = '".$data['SILVERRATE']."',
													            BOARD_GOLDRATE = '".$data['BOARD_GOLDRATE']."',
													            BOARD_SILVERRATE ='".$data['BOARD_SILVERRATE']."',
													            RTGS_GOLDRATE ='".$data['RTGS_GOLDRATE']."',
													            RTGS_SILVERRATE ='".$data['RTGS_SILVERRATE']."'
												            WHERE DATE = '".$data['DATE']."'
         								 ");


         }else{

         		$insert = $this->db->query("INSERT INTO DAILY_GOLD_RATES
										           (
										           	DATE
										           ,GOLDRATE
										           ,SILVERRATE
										           ,BOARD_GOLDRATE
										           ,BOARD_SILVERRATE
										           ,RTGS_GOLDRATE
										           ,RTGS_SILVERRATE)
										     VALUES
										           (


										           	'".$data['DATE']."',
										           	'".$data['GOLDRATE']."',
										           	'".$data['SILVERRATE']."',
										           	'".$data['BOARD_GOLDRATE']."',
										           	'".$data['BOARD_SILVERRATE']."',
										           	'".$data['RTGS_GOLDRATE']."',
										           	'".$data['RTGS_SILVERRATE']."'
										           	)
         								 ");

         }
	?>


					