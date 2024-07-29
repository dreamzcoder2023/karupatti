<!--begin::Modal dialog-->
			<div class="modal-dialog modal-xl">
				<!--begin::Modal content-->
				<div class="modal-content rounded">
					<!--begin::Modal header-->
					<div class="modal-header justify-content-end border-0 pb-0">
						<!--begin::Close-->
						<div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
							<!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
							<span class="svg-icon svg-icon-1">
								<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
									<rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="currentColor" />
									<rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="currentColor" />
								</svg>
							</span>
							<!--end::Svg Icon-->
						</div>
						<!--end::Close-->
					</div>
					<!--end::Modal header-->
					<!--begin::Modal body-->
					
					<div class="modal-body pt-0 pb-15 px-5 px-xl-20">
						<!--begin::Heading-->
						<div class="mb-13 text-center">
							<h1 class="mb-3">PAYMENT AND TRANSACTION DETAILS</h1>
							<h2 class="mb-3">RECEIPT</h2>
						</div>
						<!--end::Heading-->
						<!--end::Heading-->
							<div class="row">
							
								<!--begin::Label-->
								<label class="col-lg-2 col-form-label fw-bold fs-4">PAYING AMOUNT:</label>
								<!--end::Label-->
								<!--begin::Col-->
								<!--<div class="col-lg-3 fv-row fv-plugins-icon-container">
									<input type="text" name="company_name" id="company_name" class="form-control form-control-lg form-control-solid" placeholder="Company Name" value="" readonly>
									<div class="fv-plugins-message-container invalid-feedback" id="company_edit_err"></div>
									
								</div> -->


								<label class="col-lg-1 col-form-label fw-bold fs-4" id="p_total_amount"></label>
								<!--end::Col-->
							</div>

								<div class="row">		
									<!--begin::Label-->
									<label class="col-lg-2 col-form-label fw-bold fs-4">INTEREST:</label>
									<!--end::Label-->
									<!--begin::Col-->
								<!-- 	<div class="col-lg-3 fv-row fv-plugins-icon-container">
										<input type="text" name="company_name" id="company_name" class="form-control form-control-lg form-control-solid" placeholder="Company Name" value="" readonly>
										<div class="fv-plugins-message-container invalid-feedback" id="company_edit_err"></div>
										
									</div> -->
									<label class="col-lg-1 col-form-label fw-bold fs-4" id="p_interest"> </label>
									<!--end::Col-->
								</div>
								
								<div class="row">
									<!--begin::Label-->
									<label class="col-lg-2 col-form-label fw-bold fs-4">PRINCIPAL:</label>
									<!--end::Label-->
									<!--begin::Col-->
								<!-- 	<div class="col-lg-3 fv-row fv-plugins-icon-container">
										<input type="text" name="company_name" id="company_name" class="form-control form-control-lg form-control-solid" placeholder="Company Name" value="" readonly>
										<div class="fv-plugins-message-container invalid-feedback" id="company_edit_err"></div>
										
									</div> -->
									<label class="col-lg-1 col-form-label fw-bold fs-4"  id="p_principal"> </label>
									<!--end::Col-->

								</div>		
									
								<div class="row">
									<!--begin::Label-->
									<label class="col-lg-2 col-form-label fw-bold fs-4" >NET PAY:</label>
									<!--end::Label-->
									<!--begin::Col-->
								<!-- 	<div class="col-lg-3 fv-row fv-plugins-icon-container">
										<input type="text" name="company_name" id="company_name" class="form-control form-control-lg form-control-solid" placeholder="Company Name" value="" readonly>
										<div class="fv-plugins-message-container invalid-feedback" id="company_edit_err"></div>
										
									</div> -->
									<label class="col-lg-1 col-form-label fw-bold fs-4" id="p_netpay"> </label>
									<!--end::Col-->

								</div>
									
								
							<div style="padding: 10px 10px 10px 10px !important;box-shadow: 0 3px 6px #00002947;border-radius: 5px;background-color:#f5f5f1 !important;">
								<!-- <div><label class="col-form-label fw-bold fs-6"><u>Payment Details</u></label></div> -->
								<div class="repeater" data-index='0' id="show_more">
								    <div class="row">
								    	<label class="col-lg-1 col-form-label fw-semibold fs-6">Mode</label>
								    	<div class="col-lg-2" >
											<select class="form-select form-select-solid sare-fields" name="p_mode_types[]" data-id="p_mode_types" id="p_mode_types_1"
											>
												
											</select>
											<div class="fv-plugins-message-container invalid-feedback" id="mode_err"></div>
										</div>
								    	<label class="col-lg-1 col-form-label fw-semibold fs-6 data-fields" data-parent="question_type" data-sub="CASH">Amount</label>
										<div class="col-lg-2 data-fields" data-parent="question_type" data-sub="CASH">
											<input type="text" class="form-control form-control-lg form-control-solid" placeholder="Amount" name="pay_amount[]" value="0"   oninput="SetDefault(event);" id='pay_amount' />
											<div class="fv-plugins-message-container invalid-feedback" id="amt_err"></div>
										</div>
										<label class="col-lg-1 col-form-label fw-semibold fs-6">Details</label>
										<div class="col-lg-3">
											<input type="text" class="form-control form-control-lg form-control-solid" placeholder="Details" name="descrips[]"/>
											<div class="fv-plugins-message-container invalid-feedback" id="amt_sales"></div>
										</div>

										<div class="col-lg-1 del">
											<a href="javascript:;" class="btn btn-sm btn-success mt-md-3 " id="add_mode">
											<i class="bi bi-plus fs-6"></i></a>
										</div>
										<!-- <div class="col-lg-1 del">
											<a href="javascript:;" class="btn btn-sm btn-danger mt-md-3 btn-delete">
											<i class="la la-trash-o fs-3"></i></a>
										</div> -->
								    </div>
								</div>
								<!-- <div class="form-group">
									<p  class="btn btn-sm btn-outline btn-outline-solid btn-outline-warning btn-active-light-primary me-2 " id="more_payment" >
									Add</p>
								</div> -->
							</div>
							<div class="row">
								<!--begin::Label-->
								<label class="col-lg-2 col-form-label fw-bold fs-6">RECEIVED CASH</label>
								<!--end::Label-->
								<!--begin::Col-->
									<div class="col-lg-2 fv-row fv-plugins-icon-container">
										<input type="text" name="rec_cash" id="rec_cash" class="form-control form-control-lg form-control-solid" placeholder="" value="0" oninput="checkreceived_cash(event);">
										<div class="fv-plugins-message-container invalid-feedback" id="received_cash_err"></div>	
									</div>
								</div>
							<script>
								// $('#more_payment').click(function(){
								// 	alert("hi");
								// })

								var total_rec_amt = 0;

								let mode_payment = [];

								var arr_mode = ['Card','Bank', 'Cheque','Cash', 'UPI'];
								var str_html = '<option value="">Select</option>';
								arr_mode.map((it)=>{
									 str_html +='<option value="'+it+'" >'+it+'</option>';
								});

								$('#p_mode_types_1').html(str_html);

								$incr = 1;
								$('#add_mode').click(function(e){

									e.preventDefault();


									var val = $('#show_more div div select').attr('id');

									var amt = $('#show_more div div  input').attr('id');

								
									val = $('#'+val).val();
									amt = $('#'+amt).val();
									
									total_rec_amt += parseInt(amt);

									
									let obj = {
									 mode: val,
									 amt: amt,
									 description: ''
									};

									mode_payment.push(obj);


									if(!val){

										$('#mode_err').html('please select your mode');

									}else if(amt == 0){

										$('#amt_err').html('please fill your amount');

									}else{

										$('#mode_err').html('');
										$('#amt_err').html('');

										//mode_payment.push({'mode'=>val,'amount'=>amt})

										$incr = $incr+1;

										$("#show_more").prepend('<div class="row">										    	<label class="col-lg-1 col-form-label fw-semibold fs-6">Mode</label>										    	<div class="col-lg-2" >													<select class="form-select form-select-solid sare-fields" name="p_mode_types[]" data-id="p_mode_types" id="p_mode_types_'+$incr+'"					>														<option value="" >select</option>														<option value="Card" >Card</option>														<option value="Bank" >Bank</option>														<option value="Chaque" >Chaque</option>														<option value="Cash" >Cash</option>													<option value="UPI" >UPI</option>																											</select>													<div class="fv-plugins-message-container invalid-feedback" id="mode_err"></div>												</div>										    	<label class="col-lg-1 col-form-label fw-semibold fs-6 data-fields" data-parent="question_type" data-sub="CASH">Amount</label>												<div class="col-lg-2 data-fields" data-parent="question_type" data-sub="CASH">													<input type="text" class="form-control form-control-lg form-control-solid" placeholder="Amount" name="pay_amount[]" value="0" id="pay_amount_'+$incr+'"  oninput="SetDefault(event);"	/>	<div class="fv-plugins-message-container invalid-feedback" id="amt_err"></div>												</div>												<label class="col-lg-1 col-form-label fw-semibold fs-6">Details</label>												<div class="col-lg-3">													<input type="text" class="form-control form-control-lg form-control-solid" placeholder="Details" name="descrips[]"/>													<div class="fv-plugins-message-container invalid-feedback" id="amt_sales"></div>												</div>												<div class="col-lg-1 del">													<a href="javascript:;" class="btn btn-sm btn-danger mt-md-3 " id="btn_delete">													<i class="la la-trash-o fs-6"></i></a>												</div> 										    </div>');


									}
								});

								$(document).on('click','#btn_delete', function(e){
									e.preventDefault();

									var amt = $('#show_more div div  input').attr('id');
									amt = $('#'+amt).val();

									//alert(amt);


									var rem_amt =  parseInt($('#rec_cash').val()) - parseInt(amt);

									//alert(rem_amt);
										
									$('#rec_cash').val(rem_amt);
									total_rec_amt = rem_amt;
									
									let row = $(this).parent().parent();
									$(row).remove();
								})
								


								// $('#more_payment').on('click', e => {

								// 	var val = $('#p_mode_types').val();

								// 	if(!val){

								// 		$('#mode_err').html('please select your mode');

								// 	}else{
								// 		$('#mode_err').html('');


								//      	let $clone = $('.repeater').first().clone().hide();


								//      	if ($('#more_payment').val() == "1") 
								//      	{
								//      		$('.del').hide();								     	}
								//      	else
								// 	    {
								// 	     	$('.del').show();
								// 	    }
								   
								//     	$clone.insertBefore('.repeater:first').slideDown();
								// 	}

								
								// });

								

								function checkreceived_cash(e){
									e.preventDefault();
							     	console.log(e.target.value);

							     	var receive_cash = e.target.value;
							     	if(receive_cash == 0 || receive_cash == ""){
							     		 
							     		$('#received_cash_err').html('Please enter received cash');
							     	}else{
										$('#received_cash_err').html('');

										let net_pay = $("#p_netpay").html();

										if(receive_cash > net_pay){
											remain = receive_cash - net_pay;
										}else{
											remain = 0;

										}
										$('#balance').val(remain);
										
							     	}

							     	
							    }

							   
							   var total_amt = 0;
								

								function SetDefault(e){

									e.preventDefault();

									//alert(e.target.value);


									var val = $('#show_more div div select').attr('id');

									var amt = $('#show_more div div  input').attr('id');

										
									
									if(!val){

										$('#mode_err').html('please select your mode');

									}else{

										$('#mode_err').html('');

										if(e.target.value == ''){
											var pay_amount = 0;
										}else{
											var pay_amount = e.target.value;
										}

								     	
										total_amt =  parseInt($('#rec_cash').val())+parseInt(pay_amount);
										
										$('#rec_cash').val(pay_amount);
								     	// var receive_cash = $('#rec_cash').val();
								     	// if(receive_cash == 0 || receive_cash == ""){
								     		 
								     	// 	$('#received_cash_err').html('Please enter received cash');

								     	// }else{

										// 	$('#received_cash_err').html('');

											

											// console.log(arr_valu);

											// if(pay_amount >receive_cash ){
											// 	alert("pay amount to large");
											// 	$('#'+e.target.id).val('');


											// }else{
											// 	var balance = receive_cash - pay_amount;
											// 	$('#balance').val(balance);
											// 	$('#cash_return').val(balance);

											// }
											
											
								     	//}
								    }
							     	
							    }


							</script>
							<br>
							<div class="row mb-6"  >
						<!-- 		<div ><b><u>Printer options</b></u></div> -->
													
									<!--begin::Label-->
									<label class="col-lg-1 col-form-label fw-semibold fs-6">Balance</label>
									<!--end::Label-->
									<!--begin::Col-->
									<div class="col-lg-2 fv-row fv-plugins-icon-container">
										<input type="text" name="" id="balance" class="form-control form-control-lg form-control-solid" placeholder="" value="0">
										<div class="fv-plugins-message-container invalid-feedback"></div>
									</div>
									<!--end::Col-->
									<!--begin::Label-->
									<label class="col-lg-2 col-form-label fw-semibold fs-6" id="cash_return">Cash Return</label>
									<!--end::Label-->
									<!--begin::Col-->
									<div class="col-lg-2 fv-row fv-plugins-icon-container">
										<input type="text" name="paddress" id="cash_return_val" onchange="cash_return()" class="form-control form-control-lg form-control-solid" placeholder="" value="0">
										<div class="fv-plugins-message-container invalid-feedback"></div>
									</div>
									<!--end::Col-->
									<!--begin::Label-->
									<label class="col-lg-2 col-form-label fw-semibold fs-6">Net Balance</label>
									<!--end::Label-->
									<!--begin::Col-->
									<div class="col-lg-2 fv-row fv-plugins-icon-container">
										<input type="text" name="netbal_pay" id="netbal_pay" class="form-control form-control-lg form-control-solid" placeholder="" value="0">
										<div class="fv-plugins-message-container invalid-feedback"></div>
									</div>
									<!--end::Col-->				
							</div>
							<!--begin::Actions-->
							<div class="row">
								<div class="col-lg-8"></div>
								<div class="col-lg-3">
									<div class="d-flex flex-center flex-row-fluid pt-12">
										<button type="Submit" class="btn btn-primary me-3" data-bs-target="modal" id="feed" >FEED</button>
									</div>
								</div>
								<!-- <div class="col-lg-2">
									<div class="d-flex flex-center flex-row-fluid pt-12">
										<button type="submit" class="btn btn-success" data-bs-dismiss="modal">Save Changes</button>
									</div>
								</div> -->
							</div>

							<script type="text/javascript">
								function cash_return(){
									$return = $('#balance').val()-$('#cash_return_val').val();
									$('#netbal_pay').val($return)

								}

								$('#feed').click(function(){
									var mode = $('#p_mode_types_1').val();
									var amt =  $('#pay_amount').val();
									

									
									let obj = {
									 mode: mode,
									 amt: amt,
									 description: ''
									};

									mode_payment.push(obj);

									var html_content = "";

									for(var i=0;i< mode_payment.length;i++){
										html_content += '<div class="row"><label class="col-lg-2 col-form-label fw-bold fs-7">Mode</label>													<div class="col-lg-4 fv-row fv-plugins-icon-container">														<select class="form-select form-select-solid" data-control="select2" data-hide-search="true" name="revise_loan" id="revise_loan">															<option value="" selected>'+mode_payment[i].mode+'</option>																													</select>													</div>													<div class="col-lg-4 fv-row fv-plugins-icon-container">														<input type="text" name="interest" id="interest" value="'+mode_payment[i].amt+'" class="form-control form-control-lg form-control-solid">													</div></div>';
									}

									$('#payment_details').html(html_content);

									$('#payment_model').modal('hide');

										var interest  = $('#interest').val();
										var principal = $('#principal').val();

										//rec_cash

										var rec_amt =  $('#rec_cash').val();

										
										if(interest > rec_amt){
											
											$('#interest_amt').val(interest-rec_amt);
											$('#principal_amt').val(0);
										}else{
											var rem = rec_amt-interest;

											$('#principal_amt').val(rem);
										}

										$('#balance_amt').val($('#cal_total').val() - rec_amt);
										

			
										// var remprin   = interest-pay;
										// var total_pre = $('#cal_total').val();
										// var balance = total_pre - pay;
										// $('#principal_amt').val(remprin);
										// $('#interest_amt').val(interest);
										// $('#balance_amt').val(balance);
									// alert(mode_payment);
									
								});

							</script>
					<!--end::Modal body-->
				</div>
				<!--end::Modal content-->
			</div>
			<!--end::Modal dialog-->

