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
						<div class="mb-7 text-center">
							<h1>Loan Summary</h1>
						</div>
						<!--end::Heading-->
						<div class="row mb-6">
							<div class="col-lg-8">
								<div class="row">
									<!--begin::Label-->
									<label class="col-md-2 col-form-label required fw-bold fs-6">Bill No</label>
									<!--end::Label-->
									<!--begin::Col-->
									<div class="col-lg-3 fv-row fv-plugins-icon-container">
										<input type="text" name="company" class="form-control form-control-lg form-control-solid" placeholder="Bill No" value="DSJ-356/21">
										<div class="fv-plugins-message-container invalid-feedback"></div>
									</div>
									<!--end::Col-->		
									<!--begin::Label-->
									<div class="col-lg-4">
										<label class="col-form-label fw-bold fs-6">Loan Date</label>
										<label class="col-form-label fw-semibold fs-6">: <?php echo date("d M Y"); ?></label>
									</div>
									<!--end::Label-->
									<!--begin::Label-->
									<div class="col-lg-3">
										<label class="col-form-label fw-bold fs-6">Loan Period</label>
										<label class="col-form-label fw-semibold fs-6">: 6 Month</label>
									</div>
									<!--end::Label-->	
								</div>
								<div class="row">	
									<!--begin::Label-->
									<div class="col-lg-5">
										<label class="col-form-label fw-bold fs-6">Name</label>
										<label class="col-form-label fw-semibold fs-6">: Kumar</label>
									</div>
									<!--end::Label-->
									<!--begin::Label-->
									<div class="col-lg-4">
										<label class="col-form-label fw-bold fs-6">Loan Amount</label>
										<label class="col-form-label fw-semibold fs-6">: 2000</label>
									</div>
									<!--end::Label-->
									<!--begin::Label-->
									<div class="col-lg-3">
										<label class="col-form-label fw-bold fs-6">Interest</label>
										<label class="col-form-label fw-semibold fs-6">: 2.5 %</label>
									</div>
									<!--end::Label-->	
								</div>
								<div class="row">	
									<!--begin::Label-->
									<div class="col-lg-5">
										<label class="col-form-label fw-bold fs-6">Address</label>
										<label class="col-form-label fw-semibold fs-6">: Nadutheru Ganthi Nagar</label>
									</div>
									<!--end::Label-->
									<!--begin::Label-->
									<div class="col-lg-4">
										<label class="col-form-label fw-bold fs-6">Renewal TO</label>
										<label class="col-form-label fw-semibold fs-6">: DSJ-16/19</label>
									</div>
									<!--end::Label-->
									<!--begin::Label-->
									<div class="col-lg-3">
										<label class="col-form-label fw-bold fs-6">Net Weight</label>
										<label class="col-form-label fw-semibold fs-6">: 1.80</label>
									</div>
									<!--end::Label-->	
								</div>
								<div class="row">	
									<!--begin::Label-->
									<div class="col-lg-5">
										<label class="col-form-label fw-bold fs-6">Renewal From</label>
										<label class="col-form-label fw-semibold fs-6">:</label>
									</div>
									<!--end::Label-->
									<!--begin::Label-->
									<div class="col-lg-4">
										<label class="col-form-label fw-bold fs-6">Nominee</label>
										<label class="col-form-label fw-semibold fs-6">:</label>
									</div>
									<!--end::Label-->
									<!--begin::Label-->
									<div class="col-lg-3">
										<label class="col-form-label fw-bold fs-6">Relation</label>
										<label class="col-form-label fw-semibold fs-6">:</label>
									</div>
									<!--end::Label-->	
								</div>
								<div class="row">	
									<!--begin::Label-->
									<div class="col-lg-12">
										<label class="col-form-label fw-bold fs-6">Pledge Detail</label>
										<label class="col-form-label fw-semibold fs-6">: Manga Kasu-2(KM Seal 1+1 Rose Stone)</label>
									</div>
									<!--end::Label-->
								</div>
								<div class="row">	
									<!--begin::Label-->
									<label class="col-md-3 col-form-label fw-bold fs-6">Customer Remarks</label>
									<!--end::Label-->
									<!--begin::Col-->
									<div class="col-lg-5 fv-row fv-plugins-icon-container">
										<input type="text" name="company" class="form-control form-control-lg form-control-solid" placeholder="Remarks">
									</div>
									<!--end::Col-->	
									<div class="col-lg-3 d-flex flex-center flex-row-fluid">
										<button type="submit" class="btn btn-success" data-bs-dismiss="modal">Update Remarks</button>
									</div>
								</div>
							</div>
							<div class="col-lg-4">
								<div class="row">
									<!--begin::Label-->
									<div class="col-lg-12">
										<label class="close-form close-form-solid fw-bold text-danger fs-4">Closed</label>
										<label class="close-form close-form-solid fw-bold text-danger fs-4">Customer Transfer</label>
									</div>
									<!--end::Label-->
								</div>
								<div class="row">
									<!--begin::Label-->
									<div class="col-lg-12">
										<label class="col-form-label fw-bold fs-6">Total Period</label>
										<label class="col-form-label fw-semibold fs-6">: 0 Year 0 Month 2 Days</label>
									</div>
									<!--end::Label-->
								</div>
								<div class="row">
									<!--begin::Label-->
									<div class="col-lg-12">
										<label class="col-form-label fw-bold fs-6">Last Receipt Date</label>
										<label class="col-form-label fw-semibold fs-6">: <?php echo date("d M Y"); ?></label>
									</div>
									<!--end::Label-->
								</div>
								<div class="row">
									<!--begin::Label-->
									<div class="col-lg-12">
										<label class="col-form-label fw-bold fs-6">Paid Principal</label>
										<label class="col-form-label fw-semibold fs-6">: 2000.00</label>
									</div>
									<!--end::Label-->
								</div>
								<div class="row">
									<!--begin::Label-->
									<div class="col-lg-12">
										<label class="col-form-label fw-bold fs-6">Paid Interest</label>
										<label class="col-form-label fw-semibold fs-6">: 50.00</label>
									</div>
									<!--end::Label-->
								</div>
								<div class="row">
									<!--begin::Label-->
									<div class="col-lg-12">
										<label class="col-form-label fw-bold fs-6">Loan Balance</label>
										<label class="col-form-label fw-semibold fs-6">:</label>
									</div>
									<!--end::Label-->
								</div>
							</div>
							<!-- <div class="col-lg-4">
								<label class="col-form-label fw-bold fs-6">Loan Amount</label>
								<label class="col-form-label fw-semibold fs-6">: 2000</label>	
							</div> -->
						</div>

						<div class="row fixTableHead_party">
							<table id="kt_datatable_view_particular_party_loan_summary_history_both_scrolls" class="table table-striped border rounded table-hover gs-2 gy-1">
							    <thead>
							        <tr class="fw-bold fs-6 text-gray-800">
							            <th class="min-w-100px cy">Receipt Date</th>
							            <th class="min-w-100px">Receipt No</th>
							            <th class="min-w-100px">Particulars</th>
							            <th class="min-w-80px">Months</th>
							            <th class="min-w-100px">Principal</th>
							            <th class="min-w-80px">Interest</th>
							            <th class="min-w-80px">Others</th>
							            <th class="min-w-100px">Discount</th>
							            <th class="min-w-100px">Total</th>
							        </tr>
							    </thead>
							    <tbody>
							        <tr>
							            <td class="cy">13/06/2021</td>
							            <td></td>
							            <td>Loan</td>
							            <td></td>
							            <td>2000.00</td>
							            <td>0.00</td>
							            <td></td>
							            <td></td>
							            <td>-2000.00</td>
							        </tr>
							        <tr>
							            <td class="cy">15/06/2021</td>
							            <td></td>
							            <td>Redemption</td>
							            <td></td>
							            <td>2000.00</td>
							            <td>50.00</td>
							            <td></td>
							            <td></td>
							            <td>2050.00</td>
							        </tr>
							    </tbody>
							    <!--  <tfoot>
						            <tr class="fw-bold fs-6 text-gray-800">
							           <th class="min-w-100px cy"></th>
							            <th class="min-w-100px"></th>
							            <th class="min-w-100px"></th>
							            <th class="min-w-100px">Total</th>
							            <th class="min-w-100px">0.00</th>
							            <th class="min-w-80px">50.00</th>
							            <th class="min-w-100px"></th>
							            <th class="min-w-100px"></th>
							            <th class="min-w-100px">50.00</th>
							        </tr>
						        </tfoot> -->
							</table>	
						</div>
					</div>
					<!--end::Modal body-->
				</div>
				<!--end::Modal content-->
			</div>
			<!--end::Modal dialog-->