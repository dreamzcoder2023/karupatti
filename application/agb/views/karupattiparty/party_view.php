<?php $this->load->view("common");?>
<style>
.dataTables_scroll {
    position: relative;
    overflow: auto;
    max-height: 200px;
    /*the maximum height you want to achieve*/
    width: 100%;
}

.dataTables_scroll thead {
    position: -webkit-sticky;
    position: sticky;
    top: 0;
    background-color: #ec9629;
    z-index: 2;
}

.dataTables_scroll_nomiee_bank {
    position: relative;
    overflow: auto;
    height: 140px;
    max-height: 200px;
    /*the maximum height you want to achieve*/
    width: 100%;
}

.dataTables_scroll_nomiee_bank thead {
    position: -webkit-sticky;
    position: sticky;
    top: 0;
    background-color: #ec9629;
    z-index: 2;
}
</style>
<!--begin::Body-->

<body data-kt-name="metronic" id="kt_body"
    class="header-fixed header-tablet-and-mobile-fixed toolbar-enabled toolbar-fixed aside-enabled aside-fixed">
    <!--begin::Theme mode setup on page load-->
    <script>
    if (document.documentElement) {
        const defaultThemeMode = "system";
        const name = document.body.getAttribute("data-kt-name");
        let themeMode = localStorage.getItem("kt_" + (name !== null ? name + "_" : "") + "theme_mode_value");
        if (themeMode === null) {
            if (defaultThemeMode === "system") {
                themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light";
            } else {
                themeMode = defaultThemeMode;
            }
        }
        document.documentElement.setAttribute("data-theme", themeMode);
    }
    </script>
    <!--end::Theme mode setup on page load-->
    <!--begin::Main-->
    <!--begin::Root-->
    <div class="d-flex flex-column flex-root">
        <!--begin::Page-->
        <div class="page d-flex flex-row flex-column-fluid">
            <?php $this->load->view("sidebar");?>
            <!--begin::Wrapper-->
            <div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
                <?php $this->load->view("header");?>
                <!--begin::Toolbar-->
                <div class="toolbar py-2" id="kt_toolbar">
                    <!--begin::Container-->
                    <div id="kt_toolbar_container" class="container-fluid d-flex align-items-center">
                        <!--begin::Page title-->
                        <div class="flex-grow-1 flex-shrink-0 me-5">
                            <!--begin::Page title-->
                            <div data-kt-swapper="true" data-kt-swapper-mode="prepend"
                                data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}"
                                class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
                                <!--begin::Title-->
                                <h1 class="d-flex align-items-center text-dark fw-bold my-1 fs-3">Party
                                    <label class="d-flex align-items-center text-dark fw-bold my-1 fs-3">
                                        <span>&nbsp;-&nbsp; </span>
                                        <?php if(isset($party_details)){ ?>  <span>&nbsp;<?php echo $party_details->NAME;?>&nbsp;<?php echo $party_details->FATHERSNAME; }?></span>
                                    </label>
                                    <!--begin::Separator-->
                                    <span class="h-20px border-gray-400 border-start ms-3 mx-2"></span>
                                </h1>
                                <!--end::Title-->
                            </div>
                            <!--end::Page title-->
                        </div>
                        <!--end::Page title-->

                    </div>
                    <!--end::Container-->
                </div>
                <!--end::Toolbar-->
                <!--begin::Content-->
                <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
                    <!--begin::Container-->
                    <div id="kt_content_container" class="container-xxl">
                        <!--begin::Row-->
                        <div class="row gy-5 g-xl-8">
                            <!--begin::Col-->
                            <div class="col-xxl-8">
                                <!--begin::Tables Widget 9-->
                                <div class="card card-xxl-stretch mb-5 mb-xl-8">
                                    <!-- </div> -->
                                    <!--begin::Card body-->
                                    <?php if(isset($party_details)){ ?>
                                    <div class="card-body py-4">

                                        <div class="mb-5 hover-scroll-x">
                                            <div class="d-grid">
                                                <ul class="nav nav-tabs flex-nowrap text-nowrap" role="tablist">
                                                    <li class="nav-item" role="presentation">
                                                        <a class="nav-link btn btn-active-light btn-color-black-800 btn-active-color-primary rounded-bottom-0 fw-bold fs-6 active"
                                                            data-bs-toggle="tab" href="#kt_tab_pane_party_info"
                                                            aria-selected="true" role="tab">Party Info</a>
                                                    </li>
                                                    <li class="nav-item" role="presentation">
                                                        <a class="nav-link btn btn-active-light btn-color-black-800 btn-active-color-primary rounded-bottom-0 fw-bold fs-6"
                                                            href="<?php echo base_url();?>Karuppattiparty/karupatti_party_view/<?php echo $party_details->PID ;?>"
                                                            aria-selected="false" role="tab" tabindex="-1">Karuppati</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="tab-content" id="myTabContent">
                                            <div class="tab-pane fade active show" id="kt_tab_pane_party_info"
                                                role="tabpanel">
                                                <div class="row mb-6">
                                                    <label class="text-muted fw-bold fs-6"
                                                        style="text-align: right !important;">Party ID:
                                                        <span class="badge badge-sm badge-primary fs-2"><?php echo $party_details->PID;?></span>
                                                    </label>
                                                </div>  
                                                <div class="row mb-6">
																							    <label class="col-lg-1 col-form-label fw-semibold fs-6">Name</label>
																							    <label class="col-lg-3 col-form-label fw-bold fs-6"><?php echo $party_details->NAME; ?></label>
																							    
																							    <label class="col-lg-1 col-form-label fw-semibold fs-6">L.Name</label>
																							    <label class="col-lg-3 col-form-label fw-bold fs-6"><?php echo !empty($party_details->FATHERSNAME) ? $party_details->FATHERSNAME : '-'; ?></label>
																							    
																							    <label class="col-lg-1 col-form-label fw-semibold fs-6">Company</label>
																							    <label class="col-lg-3 col-form-label fw-bold fs-6"><?php echo $party_details->COMPANY_NAME ? $party_details->COMPANY_NAME : '-'; ?></label>
																							    
																							    <label class="col-lg-1 col-form-label fw-semibold fs-6">Mobile</label>
																							    <label class="col-lg-3 col-form-label fw-bold fs-6"><?php echo $party_details->PHONE ?? '-'; ?></label>
																							    
																							    <label class="col-lg-1 col-form-label fw-semibold fs-6">Alt.Mobile</label>
																							    <label class="col-lg-3 col-form-label fw-bold fs-6"><?php echo !empty($party_details->PHONE2) ? $party_details->PHONE2 : '-'; ?></label>

																							    <label class="col-lg-1 col-form-label fw-semibold fs-6">Email</label>
																							    <label class="col-lg-3 col-form-label fw-bold fs-6"><?php echo !empty($party_details->EMAIL) ? $party_details->EMAIL : '-'; ?></label>
																							    
																							    <label class="col-lg-1 col-form-label fw-semibold fs-6">Street</label>
																							    <label class="col-lg-3 col-form-label fw-bold fs-6"><?php echo $party_details->ADDRESS1 ? $party_details->ADDRESS1 : '-'; ?></label>
																							    
																							    <label class="col-lg-1 col-form-label fw-semibold fs-6">City</label>
																							    <label class="col-lg-3 col-form-label fw-bold fs-6"><?php echo $party_details->CITY ? $party_details->CITY : '-'; ?></label>
																							    
																							    <label class="col-lg-1 col-form-label fw-semibold fs-6">State</label>
																							    <label class="col-lg-3 col-form-label fw-bold fs-6"><?php echo $party_details->STATE ? $party_details->STATE : '-'; ?></label>
																							    
																							    <label class="col-lg-1 col-form-label fw-semibold fs-6">Country</label>
																							    <label class="col-lg-3 col-form-label fw-bold fs-6"><?php echo $party_details->COUNTRY ? $party_details->COUNTRY : '-'; ?></label>
																							    
																							    <label class="col-lg-1 col-form-label fw-semibold fs-6">Pincode</label>
																							    <label class="col-lg-3 col-form-label fw-bold fs-6"><?php echo $party_details->PINCODE ?? ''; ?></label>
																							    
																							    <label class="col-lg-1 col-form-label fw-semibold fs-6">Landmark</label>
																							    <label class="col-lg-3 col-form-label fw-bold fs-6"><?php echo $party_details->LANDMARK ?? '-'; ?></label>
																							    
																							    <label class="col-lg-1 col-form-label fw-semibold fs-6">GST NO</label>
																							    <label class="col-lg-3 col-form-label fw-bold fs-6"><?php echo $party_details->GST_NO ?? '-'; ?></label>
</div>

                                                
                                            </div>

                                        </div>
                                    </div>
                                    <?php } ?>
                                </div>

                                <!--end::Card body-->
                            </div>
                            <!--end::Tables Widget 9-->
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Row-->
                </div>
                <!--end::Container-->
                <?php $this->load->view("footer");?>
            </div>
            <!--end::Content-->
        </div>
        <!--end::Wrapper-->
    </div>
    <!--end::Page-->
    </div>

    <!--begin::Modal - view karupati sales details-->
    <div class="modal fade" id="kt_modal_view_sale" tabindex="-1" aria-hidden="true">
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
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1"
                                    transform="rotate(-45 6 17.3137)" fill="currentColor" />
                                <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)"
                                    fill="currentColor" />
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                    </div>
                    <!--end::Close-->
                </div>
                <!--end::Modal header-->
                <!--begin::Modal body-->
                <div class="modal-body pt-0 pb-5 px-1 px-xl-20">
                    <div class="mb-3 text-center">
                        <h1>View Sale Details</h1>
                    </div>
                    <div class="row">
                        <label class="col-lg-1 col-form-label fw-semibold fs-6">Date</label>
                        <label class="col-lg-2 col-form-label fw-bold fs-5">06-04-2023</label>
                        <label class="col-lg-1 col-form-label fw-semibold fs-6">Sale Id</label>
                        <label class="col-lg-2 col-form-label fw-bold fs-5">AKSS-005/23</label>
                        <label class="col-lg-1 col-form-label  fw-semibold fs-6">Party</label>
                        <label class="col-lg-3 col-form-label fw-bold fs-5">ROSEMERI</label>
                        <label class="col-lg-2 col-form-label fw-bold fs-5 text-center d-flex justify-content-center"
                            style="background-color:#46dcf9;border-radius: 8px;">
                            <span>Courier</span>&nbsp;-&nbsp;
                            <span>Pending</span>
                        </label>
                        <!-- <label class="col-lg-2 col-form-label fw-bold fs-5 text-center d-flex justify-content-center" style="background-color:#B6BD4F;border-radius: 8px;">
								<span>Direct</span>&nbsp;-&nbsp;
								<span>Delivered</span>
							</label> -->
                    </div>
                    <div class="row">
                        <label class="col-lg-1 col-form-label fw-semibold fs-6">Tot.Items</label>
                        <label class="col-lg-2 col-form-label fw-bold fs-5">2</label>
                        <label class="col-lg-1 col-form-label fw-semibold fs-6">Tot.Price</label>
                        <label class="col-lg-2 col-form-label fw-bold fs-5">54.00</label>
                        <div class="col-lg-6">
                            <label class="col-form-label fw-semibold fs-6 me-3">Delivered By</label>
                            <label class="col-form-label fw-bold fs-5">Professional Courier Service</label>
                        </div>
                        <div class="col-lg-4">
                            <label class="col-form-label fw-semibold fs-6 me-2">Tracking ID</label>
                            <label class="col-form-label fw-bold fs-5">PCD12345678</label>
                        </div>

                    </div>
                    <div class="row">
                        <label class="col-form-label fw-bold fs-2">Product Details</label>
                        <table class="table align-middle table-row-dashed table-striped table-hover fs-7 gy-4 gs-2"
                            id="kt_datatable_karuppati_view_table">
                            <thead>
                                <tr class="text-start text-muted fw-bold fs-7 gs-0">
                                    <th class="min-w-25px">Sno</th>
                                    <th class="min-w-25px">Product</th>
                                    <th class="min-w-80px">Wgt/gms</th>
                                    <th class="min-w-100px">Price Per Grams</th>
                                    <th class="min-w-100px">Price</th>
                                </tr>
                            </thead>
                            <tbody class="text-gray-600 fw-semibold">
                                <tr>
                                    <td>1</td>
                                    <td>Old Jaggery</td>
                                    <td>100</td>
                                    <td>25/100</td>
                                    <td>25</td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Palm Candy</td>
                                    <td>500</td>
                                    <td>60/1000</td>
                                    <td>30</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <label class="col-form-label fw-semibold fs-5">Total Amount</label>&emsp;
                            <label class="col-form-label fw-bold fs-3 text-end">55.00</label>
                        </div>
                        <div class="col-lg-4">
                            <label class="col-form-label  fw-semibold fs-5">Discount</label>&emsp;
                            <label class="col-form-label fw-bold fs-3 text-end">1.00</label>
                        </div>
                        <div class="col-lg-4">
                            <label class="col-form-label  fw-semibold fs-5">Net Amount</label>&emsp;
                            <label class="col-form-label fw-bold fs-3 text-end">54.00</label>
                        </div>
                        <!-- <div class="col-lg-3">
								<label class="col-form-label fw-semibold fs-5">Delivery Details</label>&emsp;
								<label class="col-form-label fw-bold fs-3 text-end">Courier</label>
					 	  </div> -->
                    </div>
                    <div class="row">
                        <label class="col-form-label fw-bold fs-2">Payment Details</label>
                        <table class="table align-middle fs-7 gy-1 gs-2" id="kt_datatable_karuppati_view_payment_table">
                            <thead>
                                <tr class="text-start text-muted fw-bold fs-7 gs-0">
                                    <th class="min-w-50px">Payment Mode</th>
                                    <th class="min-w-100px">Amount</th>
                                    <th class="min-w-100px">Reference No</th>
                                    <th class="min-w-100px">Bank</th>
                                    <th class="min-w-100px">Details</th>
                                </tr>
                            </thead>
                            <tbody class="text-gray-600 fw-bold fs-5">
                                <tr>
                                    <td>Cash</td>
                                    <td>50.00</td>
                                    <td>587496</td>
                                    <td>SBI</td>
                                    <td>Sample</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 text-center">
                            <label class="col-form-label fw-bold fs-2">Paid Amount  </label>
                            <label class="col-form-label fw-bold fs-3">50</label>
                        </div>
                        <div class="col-lg-6 text-center">
                            <label class="col-form-label fw-bold fs-2">Balance Amount  </label>
                            <label class="col-form-label fw-bold fs-3">4</label>
                        </div>
                    </div>
                </div>
                <!--end::Modal body-->
            </div>
            <!--end::Modal content-->
        </div>
        <!--end::Modal dialog-->
    </div>
    <!--end::Modal -view karupati sales details-->
    </div>
    <!--end::Modal - view sales receipt-->

    <?php $this->load->view("script");?>
    <input type="hidden" id="baseurl" value="<?php echo base_url();?>">
    <!-- <script src="js/products-list.js"></script> -->
    <!-- tagged list approved day fillter start -->

    <script>
    var title = $('title').text() + ' | ' + 'Party View';
    $(document).attr("title", title);
    </script>
    <script>
    $("#view_sales_recpt_pyt_receive_frm_party").DataTable({
        //"aaSorting":[],
        "sorting": false,
        "paging": false,
        // "responsive": true,
        "language": {
            "lengthMenu": "Show _MENU_",
        },
        "dom": "<'row'" +
            // "<'col-sm-6 d-flex align-items-center justify-conten-start'l>" +
            ">" +

            "<'table-responsive'tr>" +

            "<'row'" +
            // "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
            // "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
            ">"
    });
    // $('#view_sales_recpt_pyt_receive_frm_party').wrap('<div class="dataTables_scroll" />');
    </script>
    <script>
    $("#view_ln_dels_pyt_receive_frm_party").DataTable({
        //"aaSorting":[],
        "sorting": false,
        "paging": false,
        // "responsive": true,
        "language": {
            "lengthMenu": "Show _MENU_",
        },
        "dom": "<'row'" +
            // "<'col-sm-6 d-flex align-items-center justify-conten-start'l>" +
            ">" +

            "<'table-responsive'tr>" +

            "<'row'" +
            // "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
            // "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
            ">"
    });
    // $('#view_ln_dels_pyt_receive_frm_party').wrap('<div class="dataTables_scroll" />');
    </script>
    <script>
    function date_fill_tagged_approved() {
        var dt_fill_tagged_approved = document.getElementById('dt_fill_tagged_approved').value;
        var today_dt_tagged_approved = document.getElementById('today_dt_tagged_approved');
        var week_from_dt_tagged_approved = document.getElementById('week_from_dt_tagged_approved');
        var week_to_dt_tagged_approved = document.getElementById('week_to_dt_tagged_approved');
        var monthly_dt_tagged_approved = document.getElementById('monthly_dt_tagged_approved');
        var from_dt_tagged_approved = document.getElementById('from_dt_tagged_approved');
        var to_dt_tagged_approved = document.getElementById('to_dt_tagged_approved');
        var from_date_fillter_tagged_approved = document.getElementById('from_date_fillter_tagged_approved');
        var to_date_fillter_tagged_approved = document.getElementById('to_date_fillter_tagged_approved');

        if (dt_fill_tagged_approved == "today") {
            today_dt_tagged_approved.style.display = "block";
            monthly_dt_tagged_approved.style.display = "none";
            from_dt_tagged_approved.style.display = "none";
            to_dt_tagged_approved.style.display = "none";
            week_from_dt_tagged_approved.style.display = "none";
            week_to_dt_tagged_approved.style.display = "none";
            $("#today_date_fillter_tagged_approved").flatpickr({
                dateFormat: "d-m-Y",
            });
        } else if (dt_fill_tagged_approved == "week") {
            today_dt_tagged_approved.style.display = "none";
            week_from_dt_tagged_approved.style.display = "block";
            week_to_dt_tagged_approved.style.display = "block";
            monthly_dt_tagged_approved.style.display = "none";
            from_dt_tagged_approved.style.display = "none";
            to_dt_tagged_approved.style.display = "none";

            var curr = new Date; // get current date
            var first = curr.getDate() - curr.getDay(); // First day is the day of the month - the day of the week
            var last = first + 6; // last day is the first day + 6

            var firstday = new Date(curr.setDate(first)).toISOString().slice(0, 10);
            firstday = firstday.split("-").reverse().join("-");
            var lastday = new Date(curr.setDate(last)).toISOString().slice(0, 10);
            lastday = lastday.split("-").reverse().join("-");
            $('#week_from_date_fillter_tagged_approved').val(firstday);
            $('#week_to_date_fillter_tagged_approved').val(lastday);

        } else if (dt_fill_tagged_approved == "monthly") {
            today_dt_tagged_approved.style.display = "none";
            monthly_dt_tagged_approved.style.display = "block";
            from_dt_tagged_approved.style.display = "none";
            to_dt_tagged_approved.style.display = "none";
            week_from_dt_tagged_approved.style.display = "none";
            week_to_dt_tagged_approved.style.display = "none";
            $("#monthly_date_fillter_tagged_approved").flatpickr({
                dateFormat: "m-Y",
            });
        } else if (dt_fill_tagged_approved == "custom Date") {
            today_dt_tagged_approved.style.display = "none";
            monthly_dt_tagged_approved.style.display = "none";
            from_dt_tagged_approved.style.display = "block";
            to_dt_tagged_approved.style.display = "block";
            week_from_dt_tagged_approved.style.display = "none";
            week_to_dt_tagged_approved.style.display = "none";

            $("#from_date_fillter_tagged_approved").flatpickr({
                dateFormat: "d-m-Y",
            });
            $("#to_date_fillter_tagged_approved").flatpickr({
                dateFormat: "d-m-Y",
            });
        } else {
            today_dt_tagged_approved.style.display = "none";
            monthly_dt_tagged_approved.style.display = "none";
            from_dt_tagged_approved.style.display = "none";
            to_dt_tagged_approved.style.display = "none";
            week_from_dt_tagged_approved.style.display = "none";
            week_to_dt_tagged_approved.style.display = "none";
        }
    }
    </script>
    <!-- tagged list approved day fillter end -->

    <!-- tagged list waiting approved day fillter start -->
    <script>
    function date_fill_tagged_waiting_approved() {
        var dt_fill_tagged_waiting_approved = document.getElementById('dt_fill_tagged_waiting_approved').value;
        var today_dt_tagged_waiting_approved = document.getElementById('today_dt_tagged_waiting_approved');
        var week_from_dt_tagged_waiting_approved = document.getElementById('week_from_dt_tagged_waiting_approved');
        var week_to_dt_tagged_waiting_approved = document.getElementById('week_to_dt_tagged_waiting_approved');
        var monthly_dt_tagged_waiting_approved = document.getElementById('monthly_dt_tagged_waiting_approved');
        var from_dt_tagged_waiting_approved = document.getElementById('from_dt_tagged_waiting_approved');
        var to_dt_tagged_waiting_approved = document.getElementById('to_dt_tagged_waiting_approved');
        var from_date_fillter_tagged_waiting_approved = document.getElementById(
            'from_date_fillter_tagged_waiting_approved');
        var to_date_fillter_tagged_waiting_approved = document.getElementById(
        'to_date_fillter_tagged_waiting_approved');

        if (dt_fill_tagged_waiting_approved == "today") {
            today_dt_tagged_waiting_approved.style.display = "block";
            monthly_dt_tagged_waiting_approved.style.display = "none";
            from_dt_tagged_waiting_approved.style.display = "none";
            to_dt_tagged_waiting_approved.style.display = "none";
            week_from_dt_tagged_waiting_approved.style.display = "none";
            week_to_dt_tagged_waiting_approved.style.display = "none";
            $("#today_date_fillter_tagged_waiting_approved").flatpickr({
                dateFormat: "d-m-Y",
            });
        } else if (dt_fill_tagged_waiting_approved == "week") {
            today_dt_tagged_waiting_approved.style.display = "none";
            week_from_dt_tagged_waiting_approved.style.display = "block";
            week_to_dt_tagged_waiting_approved.style.display = "block";
            monthly_dt_tagged_waiting_approved.style.display = "none";
            from_dt_tagged_waiting_approved.style.display = "none";
            to_dt_tagged_waiting_approved.style.display = "none";

            var curr = new Date; // get current date
            var first = curr.getDate() - curr.getDay(); // First day is the day of the month - the day of the week
            var last = first + 6; // last day is the first day + 6

            var firstday = new Date(curr.setDate(first)).toISOString().slice(0, 10);
            firstday = firstday.split("-").reverse().join("-");
            var lastday = new Date(curr.setDate(last)).toISOString().slice(0, 10);
            lastday = lastday.split("-").reverse().join("-");
            $('#week_from_date_fillter_tagged_waiting_approved').val(firstday);
            $('#week_to_date_fillter_tagged_waiting_approved').val(lastday);

        } else if (dt_fill_tagged_waiting_approved == "monthly") {
            today_dt_tagged_waiting_approved.style.display = "none";
            monthly_dt_tagged_waiting_approved.style.display = "block";
            from_dt_tagged_waiting_approved.style.display = "none";
            to_dt_tagged_waiting_approved.style.display = "none";
            week_from_dt_tagged_waiting_approved.style.display = "none";
            week_to_dt_tagged_waiting_approved.style.display = "none";
            $("#monthly_date_fillter_tagged_waiting_approved").flatpickr({
                dateFormat: "m-Y",
            });
        } else if (dt_fill_tagged_waiting_approved == "custom Date") {
            today_dt_tagged_waiting_approved.style.display = "none";
            monthly_dt_tagged_waiting_approved.style.display = "none";
            from_dt_tagged_waiting_approved.style.display = "block";
            to_dt_tagged_waiting_approved.style.display = "block";
            week_from_dt_tagged_waiting_approved.style.display = "none";
            week_to_dt_tagged_waiting_approved.style.display = "none";

            $("#from_date_fillter_tagged_waiting_approved").flatpickr({
                dateFormat: "d-m-Y",
            });
            $("#to_date_fillter_tagged_waiting_approved").flatpickr({
                dateFormat: "d-m-Y",
            });
        } else {
            today_dt_tagged_waiting_approved.style.display = "none";
            monthly_dt_tagged_waiting_approved.style.display = "none";
            from_dt_tagged_waiting_approved.style.display = "none";
            to_dt_tagged_waiting_approved.style.display = "none";
            week_from_dt_tagged_waiting_approved.style.display = "none";
            week_to_dt_tagged_waiting_approved.style.display = "none";
        }
    }
    </script>
    <!-- tagged list waiting approved day fillter end -->
    <script>
    $("#kt_datatable_responsive_approved").kendoTooltip({
        filter: "td",
        show: function(e) {
            if (this.content.text() != "") {
                $('[role="tooltip"]').css("visibility", "visible");
            }
        },
        hide: function() {
            $('[role="tooltip"]').css("visibility", "hidden");
        },
        content: function(e) {
            var element = e.target[0];
            if (element.offsetWidth < element.scrollWidth) {
                return e.target.text();
            } else {
                return "";
            }
        }
    })
    </script>
    <script>
    $("#kt_datatable_responsive_not_approved").kendoTooltip({
        filter: "td",
        show: function(e) {
            if (this.content.text() != "") {
                $('[role="tooltip"]').css("visibility", "visible");
            }
        },
        hide: function() {
            $('[role="tooltip"]').css("visibility", "hidden");
        },
        content: function(e) {
            var element = e.target[0];
            if (element.offsetWidth < element.scrollWidth) {
                return e.target.text();
            } else {
                return "";
            }
        }
    })
    </script>
    <script>
    $("#party_hand_loan").kendoTooltip({
        filter: "td",
        show: function(e) {
            if (this.content.text() != "") {
                $('[role="tooltip"]').css("visibility", "visible");
            }
        },
        hide: function() {
            $('[role="tooltip"]').css("visibility", "hidden");
        },
        content: function(e) {
            var element = e.target[0];
            if (element.offsetWidth < element.scrollWidth) {
                return e.target.text();
            } else {
                return "";
            }
        }
    })
    </script>
    <script>
    $("#party_mri_loan_redemption").kendoTooltip({
        filter: "td",
        show: function(e) {
            if (this.content.text() != "") {
                $('[role="tooltip"]').css("visibility", "visible");
            }
        },
        hide: function() {
            $('[role="tooltip"]').css("visibility", "hidden");
        },
        content: function(e) {
            var element = e.target[0];
            if (element.offsetWidth < element.scrollWidth) {
                return e.target.text();
            } else {
                return "";
            }
        }
    })
    </script>
    <script>
    $("#party_mri_loan_receipts").kendoTooltip({
        filter: "td",
        show: function(e) {
            if (this.content.text() != "") {
                $('[role="tooltip"]').css("visibility", "visible");
            }
        },
        hide: function() {
            $('[role="tooltip"]').css("visibility", "hidden");
        },
        content: function(e) {
            var element = e.target[0];
            if (element.offsetWidth < element.scrollWidth) {
                return e.target.text();
            } else {
                return "";
            }
        }
    })
    </script>
    <script>
    $("#party_mri_loan").kendoTooltip({
        filter: "td",
        show: function(e) {
            if (this.content.text() != "") {
                $('[role="tooltip"]').css("visibility", "visible");
            }
        },
        hide: function() {
            $('[role="tooltip"]').css("visibility", "hidden");
        },
        content: function(e) {
            var element = e.target[0];
            if (element.offsetWidth < element.scrollWidth) {
                return e.target.text();
            } else {
                return "";
            }
        }
    })
    </script>
    <script>
    $("#nominee_table").kendoTooltip({
        filter: "td",
        show: function(e) {
            if (this.content.text() != "") {
                $('[role="tooltip"]').css("visibility", "visible");
            }
        },
        hide: function() {
            $('[role="tooltip"]').css("visibility", "hidden");
        },
        content: function(e) {
            var element = e.target[0];
            if (element.offsetWidth < element.scrollWidth) {
                return e.target.text();
            } else {
                return "";
            }
        }
    })
    </script>
    <script>
    $("#kt_datatable_karuppati_view_table").kendoTooltip({
        filter: "td",
        show: function(e) {
            if (this.content.text() != "") {
                $('[role="tooltip"]').css("visibility", "visible");
            }
        },
        hide: function() {
            $('[role="tooltip"]').css("visibility", "hidden");
        },
        content: function(e) {
            var element = e.target[0];
            if (element.offsetWidth < element.scrollWidth) {
                return e.target.text();
            } else {
                return "";
            }
        }
    })
    </script>
    <script>
    $("#kt_datatable_karuppati_view_payment_table").kendoTooltip({
        filter: "td",
        show: function(e) {
            if (this.content.text() != "") {
                $('[role="tooltip"]').css("visibility", "visible");
            }
        },
        hide: function() {
            $('[role="tooltip"]').css("visibility", "hidden");
        },
        content: function(e) {
            var element = e.target[0];
            if (element.offsetWidth < element.scrollWidth) {
                return e.target.text();
            } else {
                return "";
            }
        }
    })
    </script>
    <script>
    $("#bank_acc_table").kendoTooltip({
        filter: "td",
        show: function(e) {
            if (this.content.text() != "") {
                $('[role="tooltip"]').css("visibility", "visible");
            }
        },
        hide: function() {
            $('[role="tooltip"]').css("visibility", "hidden");
        },
        content: function(e) {
            var element = e.target[0];
            if (element.offsetWidth < element.scrollWidth) {
                return e.target.text();
            } else {
                return "";
            }
        }
    })
    </script>
    <script>
    $("#karuppati_list_lable").kendoTooltip({
        filter: "td",
        show: function(e) {
            if (this.content.text() != "") {
                $('[role="tooltip"]').css("visibility", "visible");
            }
        },
        hide: function() {
            $('[role="tooltip"]').css("visibility", "hidden");
        },
        content: function(e) {
            var element = e.target[0];
            if (element.offsetWidth < element.scrollWidth) {
                return e.target.text();
            } else {
                return "";
            }
        }
    })
    </script>
    <script>
    $("#party_loan").kendoTooltip({
        filter: "td",
        show: function(e) {
            if (this.content.text() != "") {
                $('[role="tooltip"]').css("visibility", "visible");
            }
        },
        hide: function() {
            $('[role="tooltip"]').css("visibility", "hidden");
        },
        content: function(e) {
            var element = e.target[0];
            if (element.offsetWidth < element.scrollWidth) {
                return e.target.text();
            } else {
                return "";
            }
        }
    })
    </script>
    <script>
    $("#party_loan_receipts").kendoTooltip({
        filter: "td",
        show: function(e) {
            if (this.content.text() != "") {
                $('[role="tooltip"]').css("visibility", "visible");
            }
        },
        hide: function() {
            $('[role="tooltip"]').css("visibility", "hidden");
        },
        content: function(e) {
            var element = e.target[0];
            if (element.offsetWidth < element.scrollWidth) {
                return e.target.text();
            } else {
                return "";
            }
        }
    })
    </script>
    <script>
    $("#party_loan_redemption").kendoTooltip({
        filter: "td",
        show: function(e) {
            if (this.content.text() != "") {
                $('[role="tooltip"]').css("visibility", "visible");
            }
        },
        hide: function() {
            $('[role="tooltip"]').css("visibility", "hidden");
        },
        content: function(e) {
            var element = e.target[0];
            if (element.offsetWidth < element.scrollWidth) {
                return e.target.text();
            } else {
                return "";
            }
        }
    })
    </script>
    <script>
    $("#sales_table").kendoTooltip({
        filter: "td",
        show: function(e) {
            if (this.content.text() != "") {
                $('[role="tooltip"]').css("visibility", "visible");
            }
        },
        hide: function() {
            $('[role="tooltip"]').css("visibility", "hidden");
        },
        content: function(e) {
            var element = e.target[0];
            if (element.offsetWidth < element.scrollWidth) {
                return e.target.text();
            } else {
                return "";
            }
        }
    })
    </script>
    <script>
    $("#sales_receipts_table").kendoTooltip({
        filter: "td",
        show: function(e) {
            if (this.content.text() != "") {
                $('[role="tooltip"]').css("visibility", "visible");
            }
        },
        hide: function() {
            $('[role="tooltip"]').css("visibility", "hidden");
        },
        content: function(e) {
            var element = e.target[0];
            if (element.offsetWidth < element.scrollWidth) {
                return e.target.text();
            } else {
                return "";
            }
        }
    })
    </script>
    <script>
    $("#sales_order_table").kendoTooltip({
        filter: "td",
        show: function(e) {
            if (this.content.text() != "") {
                $('[role="tooltip"]').css("visibility", "visible");
            }
        },
        hide: function() {
            $('[role="tooltip"]').css("visibility", "hidden");
        },
        content: function(e) {
            var element = e.target[0];
            if (element.offsetWidth < element.scrollWidth) {
                return e.target.text();
            } else {
                return "";
            }
        }
    })
    </script>
    <script>
    $("#sales_return_table").kendoTooltip({
        filter: "td",
        show: function(e) {
            if (this.content.text() != "") {
                $('[role="tooltip"]').css("visibility", "visible");
            }
        },
        hide: function() {
            $('[role="tooltip"]').css("visibility", "hidden");
        },
        content: function(e) {
            var element = e.target[0];
            if (element.offsetWidth < element.scrollWidth) {
                return e.target.text();
            } else {
                return "";
            }
        }
    })
    </script>
    <script>
    $("#view_redemp_cus_sale_witness").kendoTooltip({
        filter: "td",
        show: function(e) {
            if (this.content.text() != "") {
                $('[role="tooltip"]').css("visibility", "visible");
            }
        },
        hide: function() {
            $('[role="tooltip"]').css("visibility", "hidden");
        },
        content: function(e) {
            var element = e.target[0];
            if (element.offsetWidth < element.scrollWidth) {
                return e.target.text();
            } else {
                return "";
            }
        }
    })
    </script>
    <script>
    $("#view_redemp_hand_ln_pyt_receive_frm_party").DataTable({
        //"aaSorting":[],
        "sorting": false,
        // "paging": false,
        // "responsive": true,
        "language": {
            "lengthMenu": "Show _MENU_",
        },
        "dom": "<'row'" +
            // "<'col-sm-6 d-flex align-items-center justify-conten-start'l>" +
            // "<'col-sm-6 d-flex align-items-center justify-content-end'f>" +
            ">" +

            "<'table-responsive'tr>" +

            "<'row'" +
            // "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
            // "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
            ">"
    });
    // $('#view_redemp_hand_ln_pyt_receive_frm_party').wrap('<div class="dataTables_scroll" />');
    </script>
    <script>
    $("#view_redemp_hand_ln_to_pay_frm_cmy").DataTable({
        //"aaSorting":[],
        "sorting": false,
        // "paging": false,
        // "responsive": true,
        "language": {
            "lengthMenu": "Show _MENU_",
        },
        "dom": "<'row'" +
            // "<'col-sm-6 d-flex align-items-center justify-conten-start'l>" +
            // "<'col-sm-6 d-flex align-items-center justify-content-end'f>" +
            ">" +

            "<'table-responsive'tr>" +

            "<'row'" +
            // "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
            // "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
            ">"
    });
    // $('#view_redemp_hand_ln_to_pay_frm_cmy').wrap('<div class="dataTables_scroll" />');
    </script>
    <script>
    $("#view_redemp_multi_jwl_to_pay_frm_cmy").DataTable({
        //"aaSorting":[],
        "sorting": false,
        // "paging": false,
        // "responsive": true,
        "language": {
            "lengthMenu": "Show _MENU_",
        },
        "dom": "<'row'" +
            // "<'col-sm-6 d-flex align-items-center justify-conten-start'l>" +
            // "<'col-sm-6 d-flex align-items-center justify-content-end'f>" +
            ">" +

            "<'table-responsive'tr>" +

            "<'row'" +
            // "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
            // "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
            ">"
    });
    // $('#view_redemp_multi_jwl_to_pay_frm_cmy').wrap('<div class="dataTables_scroll" />');
    </script>
    <script>
    $("#view_redemp_multi_jwl_pledge_info").DataTable({
        //"aaSorting":[],
        "sorting": false,
        // "paging": false,
        // "responsive": true,
        "language": {
            "lengthMenu": "Show _MENU_",
        },
        "dom": "<'row'" +
            // "<'col-sm-6 d-flex align-items-center justify-conten-start'l>" +
            // "<'col-sm-6 d-flex align-items-center justify-content-end'f>" +
            ">" +

            "<'table-responsive'tr>" +

            "<'row'" +
            "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
            // "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
            ">"
    });
    $('#view_redemp_multi_jwl_pledge_info').wrap('<div class="dataTables_scroll" />');
    </script>
    <script>
    $("#view_redemp_cus_sale_to_pay_frm_cmy").DataTable({
        //"aaSorting":[],
        "sorting": false,
        // "paging": false,
        // "responsive": true,
        "language": {
            "lengthMenu": "Show _MENU_",
        },
        "dom": "<'row'" +
            // "<'col-sm-6 d-flex align-items-center justify-conten-start'l>" +
            // "<'col-sm-6 d-flex align-items-center justify-content-end'f>" +
            ">" +

            "<'table-responsive'tr>" +

            "<'row'" +
            // "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
            // "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
            ">"
    });
    // $('#view_redemp_cus_sale_to_pay_frm_cmy').wrap('<div class="dataTables_scroll" />');
    </script>
    <script>
    $("#view_redemp_cus_sale_witness").DataTable({
        //"aaSorting":[],
        "sorting": false,
        "paging": false,
        // "responsive": true,
        "language": {
            "lengthMenu": "Show _MENU_",
        },
        "dom": "<'row'" +
            // "<'col-sm-6 d-flex align-items-center justify-conten-start'l>" +
            ">" +

            "<'table-responsive'tr>" +

            "<'row'" +
            // "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
            // "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
            ">"
    });
    // $('#view_redemp_cus_sale_witness').wrap('<div class="dataTables_scroll" />');
    </script>
    <script>
    $("#view_redemp_cus_trans_to_pay_frm_cmy").DataTable({
        //"aaSorting":[],
        "sorting": false,
        // "paging": false,
        // "responsive": true,
        "language": {
            "lengthMenu": "Show _MENU_",
        },
        "dom": "<'row'" +
            // "<'col-sm-6 d-flex align-items-center justify-conten-start'l>" +
            // "<'col-sm-6 d-flex align-items-center justify-content-end'f>" +
            ">" +

            "<'table-responsive'tr>" +

            "<'row'" +
            // "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
            // "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
            ">"
    });
    // $('#view_redemp_cus_trans_to_pay_frm_cmy').wrap('<div class="dataTables_scroll" />');
    </script>
    <script>
    $("#view_redemp_cus_trans_pyt_receive_frm_party").DataTable({
        //"aaSorting":[],
        "sorting": false,
        // "paging": false,
        // "responsive": true,
        "language": {
            "lengthMenu": "Show _MENU_",
        },
        "dom": "<'row'" +
            // "<'col-sm-6 d-flex align-items-center justify-conten-start'l>" +
            // "<'col-sm-6 d-flex align-items-center justify-content-end'f>" +
            ">" +

            "<'table-responsive'tr>" +

            "<'row'" +
            // "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
            // "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
            ">"
    });
    // $('#view_redemp_cus_trans_pyt_receive_frm_party').wrap('<div class="dataTables_scroll" />');
    </script>
    <script>
    $("#view_redemp_cus_close_pyt_receive_frm_party").DataTable({
        //"aaSorting":[],
        "sorting": false,
        // "paging": false,
        // "responsive": true,
        "language": {
            "lengthMenu": "Show _MENU_",
        },
        "dom": "<'row'" +
            // "<'col-sm-6 d-flex align-items-center justify-conten-start'l>" +
            // "<'col-sm-6 d-flex align-items-center justify-content-end'f>" +
            ">" +

            "<'table-responsive'tr>" +

            "<'row'" +
            // "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
            // "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
            ">"
    });
    // $('#view_redemp_cus_close_pyt_receive_frm_party').wrap('<div class="dataTables_scroll" />');
    </script>
    <script>
    $("#redemp_pledge_info").DataTable({
        //"aaSorting":[],
        "sorting": false,
        // "paging": false,
        // "responsive": true,
        "language": {
            "lengthMenu": "Show _MENU_",
        },
        "dom": "<'row'" +
            // "<'col-sm-6 d-flex align-items-center justify-conten-start'l>" +
            // "<'col-sm-6 d-flex align-items-center justify-content-end'f>" +
            ">" +

            "<'table-responsive'tr>" +

            "<'row'" +
            "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
            // "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
            ">"
    });
    $('#redemp_pledge_info').wrap('<div class="dataTables_scroll" />');
    </script>
    <script>
    $("#kt_datatable_karuppati_view_table").DataTable({
        //"aaSorting":[],
        "sorting": false,
        // "paging": false,
        // "responsive": true,
        "language": {
            "lengthMenu": "Show _MENU_",
        },
        "dom": "<'row'" +
            // "<'col-sm-6 d-flex align-items-center justify-conten-start'l>" +
            // "<'col-sm-6 d-flex align-items-center justify-content-end'f>" +
            ">" +

            "<'table-responsive'tr>" +

            "<'row'" +
            "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
            // "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
            ">"
    });
    $('#kt_datatable_karuppati_view_table').wrap('<div class="dataTables_scroll" />');
    </script>
    <script>
    $("#kt_datatable_karuppati_view_payment_table").DataTable({
        //"aaSorting":[],
        "sorting": false,
        // "paging": false,
        // "responsive": true,
        "language": {
            "lengthMenu": "Show _MENU_",
        },
        "dom": "<'row'" +
            // "<'col-sm-6 d-flex align-items-center justify-conten-start'l>" +
            // "<'col-sm-6 d-flex align-items-center justify-content-end'f>" +
            ">" +

            "<'table-responsive'tr>" +

            "<'row'" +
            // "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
            // "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
            ">"
    });
    $('#kt_datatable_karuppati_view_payment_table').wrap('<div class="dataTables_scroll" />');
    </script>
    <script>
    $("#sales_table").DataTable({
        //"aaSorting":[],
        "sorting": false,
        // "paging": false,
        // "responsive": true,
        "language": {
            "lengthMenu": "Show _MENU_",
        },
        "dom": "<'row'" +
            "<'col-sm-6 d-flex align-items-center justify-conten-start'l>" +
            "<'col-sm-6 d-flex align-items-center justify-content-end'f>" +
            ">" +

            "<'table-responsive'tr>" +

            "<'row'" +
            "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
            "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
            ">"
    });
    // $('#sales_table').wrap('<div class="dataTables_scroll" />');
    </script>
    <script>
    $("#sales_order_table").DataTable({
        //"aaSorting":[],
        "sorting": false,
        // "paging": false,
        // "responsive": true,
        "language": {
            "lengthMenu": "Show _MENU_",
        },
        "dom": "<'row'" +
            "<'col-sm-6 d-flex align-items-center justify-conten-start'l>" +
            "<'col-sm-6 d-flex align-items-center justify-content-end'f>" +
            ">" +

            "<'table-responsive'tr>" +

            "<'row'" +
            "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
            "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
            ">"
    });
    // $('#sales_order_table').wrap('<div class="dataTables_scroll" />');
    </script>
    <script>
    $("#sales_receipts_table").DataTable({
        //"aaSorting":[],
        "sorting": false,
        // "paging": false,
        // "responsive": true,
        "language": {
            "lengthMenu": "Show _MENU_",
        },
        "dom": "<'row'" +
            "<'col-sm-6 d-flex align-items-center justify-conten-start'l>" +
            "<'col-sm-6 d-flex align-items-center justify-content-end'f>" +
            ">" +

            "<'table-responsive'tr>" +

            "<'row'" +
            "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
            "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
            ">"
    });
    // $('#sales_receipts_table').wrap('<div class="dataTables_scroll" />');
    </script>
    <script>
    $("#sales_return_table").DataTable({
        //"aaSorting":[],
        "sorting": false,
        // "paging": false,
        // "responsive": true,
        "language": {
            "lengthMenu": "Show _MENU_",
        },
        "dom": "<'row'" +
            "<'col-sm-6 d-flex align-items-center justify-conten-start'l>" +
            "<'col-sm-6 d-flex align-items-center justify-content-end'f>" +
            ">" +

            "<'table-responsive'tr>" +

            "<'row'" +
            "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
            "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
            ">"
    });
    // $('#sales_return_table').wrap('<div class="dataTables_scroll" />');
    </script>
    <script>
    $("#party_hand_loan").DataTable({
        //"aaSorting":[],
        "sorting": false,
        // "paging": false,
        // "responsive": true,
        "language": {
            "lengthMenu": "Show _MENU_",
        },
        "dom": "<'row'" +
            "<'col-sm-6 d-flex align-items-center justify-conten-start'l>" +
            "<'col-sm-6 d-flex align-items-center justify-content-end'f>" +
            ">" +

            "<'table-responsive'tr>" +

            "<'row'" +
            "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
            "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
            ">"
    });
    // $('#party_hand_loan').wrap('<div class="dataTables_scroll" />');
    </script>
    <script>
    $("#party_mri_loan_redemption").DataTable({
        //"aaSorting":[],
        "sorting": false,
        // "paging": false,
        // "responsive": true,
        "language": {
            "lengthMenu": "Show _MENU_",
        },
        "dom": "<'row'" +
            "<'col-sm-6 d-flex align-items-center justify-conten-start'l>" +
            "<'col-sm-6 d-flex align-items-center justify-content-end'f>" +
            ">" +

            "<'table-responsive'tr>" +

            "<'row'" +
            "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
            "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
            ">"
    });
    // $('#party_mri_loan_redemption').wrap('<div class="dataTables_scroll" />');
    </script>
    <script>
    $("#party_mri_loan_receipts").DataTable({
        //"aaSorting":[],
        "sorting": false,
        // "paging": false,
        // "responsive": true,
        "language": {
            "lengthMenu": "Show _MENU_",
        },
        "dom": "<'row'" +
            "<'col-sm-6 d-flex align-items-center justify-conten-start'l>" +
            "<'col-sm-6 d-flex align-items-center justify-content-end'f>" +
            ">" +

            "<'table-responsive'tr>" +

            "<'row'" +
            "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
            "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
            ">"
    });
    // $('#party_mri_loan_receipts').wrap('<div class="dataTables_scroll" />');
    </script>
    <script>
    $("#party_mri_loan").DataTable({
        //"aaSorting":[],
        "sorting": false,
        // "paging": false,
        // "responsive": true,
        "language": {
            "lengthMenu": "Show _MENU_",
        },
        "dom": "<'row'" +
            "<'col-sm-6 d-flex align-items-center justify-conten-start'l>" +
            "<'col-sm-6 d-flex align-items-center justify-content-end'f>" +
            ">" +

            "<'table-responsive'tr>" +

            "<'row'" +
            "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
            "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
            ">"
    });
    // $('#party_mri_loan').wrap('<div class="dataTables_scroll" />');
    </script>
    <script>
    $("#party_loan_redemption").DataTable({
        //"aaSorting":[],
        "sorting": false,
        // "paging": false,
        // "responsive": true,
        "language": {
            "lengthMenu": "Show _MENU_",
        },
        "dom": "<'row'" +
            "<'col-sm-6 d-flex align-items-center justify-conten-start'l>" +
            "<'col-sm-6 d-flex align-items-center justify-content-end'f>" +
            ">" +

            "<'table-responsive'tr>" +

            "<'row'" +
            "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
            "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
            ">"
    });
    // $('#party_loan_redemption').wrap('<div class="dataTables_scroll" />');
    </script>
    <script>
    $("#karuppati_list_lable").DataTable({
        //"aaSorting":[],
        "sorting": false,
        // "paging": false,
        // "responsive": true,
        "language": {
            "lengthMenu": "Show _MENU_",
        },
        "dom": "<'row'" +
            "<'col-sm-6 d-flex align-items-center justify-conten-start'l>" +
            "<'col-sm-6 d-flex align-items-center justify-content-end'f>" +
            ">" +

            "<'table-responsive'tr>" +

            "<'row'" +
            "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
            "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
            ">"
    });
    // $('#karuppati_list_lable').wrap('<div class="dataTables_scroll" />');
    </script>
    <script>
    $("#party_loan").DataTable({
        //"aaSorting":[],
        "sorting": false,
        // "paging": false,
        // "responsive": true,
        "language": {
            "lengthMenu": "Show _MENU_",
        },
        "dom": "<'row'" +
            "<'col-sm-6 d-flex align-items-center justify-conten-start'l>" +
            "<'col-sm-6 d-flex align-items-center justify-content-end'f>" +
            ">" +

            "<'table-responsive'tr>" +

            "<'row'" +
            "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
            "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
            ">"
    });
    // $('#party_loan').wrap('<div class="dataTables_scroll" />');
    </script>
    <script>
    $("#party_loan_receipts").DataTable({
        //"aaSorting":[],
        "sorting": false,
        // "paging": false,
        // "responsive": true,
        "language": {
            "lengthMenu": "Show _MENU_",
        },
        "dom": "<'row'" +
            "<'col-sm-6 d-flex align-items-center justify-conten-start'l>" +
            "<'col-sm-6 d-flex align-items-center justify-content-end'f>" +
            ">" +

            "<'table-responsive'tr>" +

            "<'row'" +
            "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
            "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
            ">"
    });
    // $('#party_loan_receipts').wrap('<div class="dataTables_scroll" />');
    </script>
    <script>
    $("#nominee_table").DataTable({
        //"aaSorting":[],
        "sorting": false,
        "paging": false,
        // "responsive": true,
        "language": {
            "lengthMenu": "Show _MENU_",
        },
        "dom": "<'row'" +
            // "<'col-sm-6 d-flex align-items-center justify-conten-start'l>" +
            ">" +

            "<'table-responsive'tr>" +

            "<'row'" +
            "<'col-sm-12 col-md-12 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
            // "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
            ">"
    });
    $('#nominee_table').wrap('<div class="dataTables_scroll_nomiee_bank" />');
    </script>
    <script>
    $("#bank_acc_table").DataTable({
        //"aaSorting":[],
        "sorting": false,
        "paging": false,
        // "responsive": true,
        "language": {
            "lengthMenu": "Show _MENU_",
        },
        "dom": "<'row'" +
            // "<'col-sm-6 d-flex align-items-center justify-conten-start'l>" +
            ">" +

            "<'table-responsive'tr>" +

            "<'row'" +
            "<'col-sm-12 col-md-12 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
            // "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
            ">"
    });
    $('#bank_acc_table').wrap('<div class="dataTables_scroll_nomiee_bank" />');
    </script>
    <script>
    $("#add_tagentry_date").flatpickr({
        dateFormat: "d-m-Y",
    });
    </script>
    <script>
    $("#add_tagentry_table").DataTable({
        //"aaSorting":[],
        "sorting": false,
        "paging": false,
        // "responsive": true,
        "language": {
            "lengthMenu": "Show _MENU_",
        },
        "dom": "<'row'" +
            "<'col-sm-6 d-flex align-items-center justify-conten-start'l>" +
            ">" +

            "<'table-responsive'tr>" +

            "<'row'" +
            "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
            "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
            ">"
    });
    $('#add_tagentry_table').wrap('<div class="dataTables_scroll" />');
    </script>
    <!-- tagged day fillter start -->
    <script>
    function date_fill() {
        var dt_fill = document.getElementById('dt_fill').value;
        var today_dt = document.getElementById('today_dt');
        var week_from_dt = document.getElementById('week_from_dt');
        var week_to_dt = document.getElementById('week_to_dt');
        var monthly_dt = document.getElementById('monthly_dt');
        var from_dt = document.getElementById('from_dt');
        var to_dt = document.getElementById('to_dt');
        var from_date_fillter = document.getElementById('from_date_fillter');
        var to_date_fillter = document.getElementById('to_date_fillter');

        if (dt_fill == "today") {
            today_dt.style.display = "block";
            monthly_dt.style.display = "none";
            from_dt.style.display = "none";
            to_dt.style.display = "none";
            week_from_dt.style.display = "none";
            week_to_dt.style.display = "none";
            $("#today_date_fillter").flatpickr({
                dateFormat: "d-m-Y",
            });
        } else if (dt_fill == "week") {
            today_dt.style.display = "none";
            week_from_dt.style.display = "block";
            week_to_dt.style.display = "block";
            monthly_dt.style.display = "none";
            from_dt.style.display = "none";
            to_dt.style.display = "none";

            var curr = new Date; // get current date
            var first = curr.getDate() - curr.getDay(); // First day is the day of the month - the day of the week
            var last = first + 6; // last day is the first day + 6

            var firstday = new Date(curr.setDate(first)).toISOString().slice(0, 10);
            firstday = firstday.split("-").reverse().join("-");
            var lastday = new Date(curr.setDate(last)).toISOString().slice(0, 10);
            lastday = lastday.split("-").reverse().join("-");
            $('#week_from_date_fillter').val(firstday);
            $('#week_to_date_fillter').val(lastday);

        } else if (dt_fill == "monthly") {
            today_dt.style.display = "none";
            monthly_dt.style.display = "block";
            from_dt.style.display = "none";
            to_dt.style.display = "none";
            week_from_dt.style.display = "none";
            week_to_dt.style.display = "none";
            $("#monthly_date_fillter").flatpickr({
                dateFormat: "m-Y",
            });
        } else if (dt_fill == "custom Date") {
            today_dt.style.display = "none";
            monthly_dt.style.display = "none";
            from_dt.style.display = "block";
            to_dt.style.display = "block";
            week_from_dt.style.display = "none";
            week_to_dt.style.display = "none";

            $("#from_date_fillter").flatpickr({
                dateFormat: "d-m-Y",
            });
            $("#to_date_fillter").flatpickr({
                dateFormat: "d-m-Y",
            });
        } else {
            today_dt.style.display = "none";
            monthly_dt.style.display = "none";
            from_dt.style.display = "none";
            to_dt.style.display = "none";
            week_from_dt.style.display = "none";
            week_to_dt.style.display = "none";
        }
    }
    </script>
    <!-- tagged day fillter end -->
    <!-- waiting tagged day fillter start -->
    <script>
    function date_fill_wait() {
        var dt_fill_wait = document.getElementById('dt_fill_wait').value;
        var today_dt_wait = document.getElementById('today_dt_wait');
        var week_from_dt_wait = document.getElementById('week_from_dt_wait');
        var week_to_dt_wait = document.getElementById('week_to_dt_wait');
        var monthly_dt_wait = document.getElementById('monthly_dt_wait');
        var from_dt_wait = document.getElementById('from_dt_wait');
        var to_dt_wait = document.getElementById('to_dt_wait');
        var from_date_fillter_wait = document.getElementById('from_date_fillter_wait');
        var to_date_fillter_wait = document.getElementById('to_date_fillter_wait');

        if (dt_fill_wait == "today") {
            today_dt_wait.style.display = "block";
            monthly_dt_wait.style.display = "none";
            from_dt_wait.style.display = "none";
            to_dt_wait.style.display = "none";
            week_from_dt_wait.style.display = "none";
            week_to_dt_wait.style.display = "none";
            $("#today_date_fillter_wait").flatpickr({
                dateFormat: "d-m-Y",
            });
        } else if (dt_fill_wait == "week") {
            today_dt_wait.style.display = "none";
            week_from_dt_wait.style.display = "block";
            week_to_dt_wait.style.display = "block";
            monthly_dt_wait.style.display = "none";
            from_dt_wait.style.display = "none";
            to_dt_wait.style.display = "none";

            var curr = new Date; // get current date
            var first = curr.getDate() - curr.getDay(); // First day is the day of the month - the day of the week
            var last = first + 6; // last day is the first day + 6

            var firstday = new Date(curr.setDate(first)).toISOString().slice(0, 10);
            firstday = firstday.split("-").reverse().join("-");
            var lastday = new Date(curr.setDate(last)).toISOString().slice(0, 10);
            lastday = lastday.split("-").reverse().join("-");
            $('#week_from_date_fillter_wait').val(firstday);
            $('#week_to_date_fillter_wait').val(lastday);

        } else if (dt_fill_wait == "monthly") {
            today_dt_wait.style.display = "none";
            monthly_dt_wait.style.display = "block";
            from_dt_wait.style.display = "none";
            to_dt_wait.style.display = "none";
            week_from_dt_wait.style.display = "none";
            week_to_dt_wait.style.display = "none";
            $("#monthly_date_fillter_wait").flatpickr({
                dateFormat: "m-Y",
            });
        } else if (dt_fill_wait == "custom Date") {
            today_dt_wait.style.display = "none";
            monthly_dt_wait.style.display = "none";
            from_dt_wait.style.display = "block";
            to_dt_wait.style.display = "block";
            week_from_dt_wait.style.display = "none";
            week_to_dt_wait.style.display = "none";

            $("#from_date_fillter_wait").flatpickr({
                dateFormat: "d-m-Y",
            });
            $("#to_date_fillter_wait").flatpickr({
                dateFormat: "d-m-Y",
            });
        } else {
            today_dt_wait.style.display = "none";
            monthly_dt_wait.style.display = "none";
            from_dt_wait.style.display = "none";
            to_dt_wait.style.display = "none";
            week_from_dt_wait.style.display = "none";
            week_to_dt_wait.style.display = "none";
        }
    }
    </script>
    <!-- waiting tagged day fillter end -->
    <script>
    // $("#from_date_fillter").flatpickr({
    // 					dateFormat: "d-m-Y",
    // 				});
    // $("#to_date_fillter").flatpickr({
    // 					dateFormat: "d-m-Y",
    // 				});



    $("#kt_daterangepicker_lot_entry_from").flatpickr({
        dateFormat: "d-m-Y",
    });
    $("#kt_daterangepicker_lot_entry_to").flatpickr({
        dateFormat: "d-m-Y",
    });
    $("#kt_daterangepicker_lot_entry_add_date").flatpickr({
        dateFormat: "d-m-Y",
    });
    $("#kt_daterangepicker_lot_entry_edit_date").flatpickr({
        dateFormat: "d-m-Y",
    });
    $("#kt_daterangepicker_lot_entry_view_date").flatpickr({
        dateFormat: "d-m-Y",
    });

    $("#kt_datatable_responsive_approved").DataTable({

        "responsive": true,
        "aaSorting": [],
        "language": {
            "lengthMenu": "Show _MENU_",
        },
        "dom": "<'row'" +
            "<'col-sm-6 d-flex align-items-center justify-conten-start'l>" +
            "<'col-sm-6 d-flex align-items-center justify-content-end'f>" +
            ">" +

            "<'table-responsive'tr>" +

            "<'row'" +
            "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
            "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
            ">"
    });

    $("#kt_datatable_responsive_not_approved").DataTable({

        "responsive": true,
        "aaSorting": [],
        "language": {
            "lengthMenu": "Show _MENU_",
        },
        "dom": "<'row'" +
            "<'col-sm-6 d-flex align-items-center justify-conten-start'l>" +
            "<'col-sm-6 d-flex align-items-center justify-content-end'f>" +
            ">" +

            "<'table-responsive'tr>" +

            "<'row'" +
            "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
            "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
            ">"
    });
    </script>
    <script>
    $("#kt_daterangepicker_lot_entry_from").flatpickr({
        dateFormat: "d-m-Y",
    });
    $("#kt_daterangepicker_lot_entry_to").flatpickr({
        dateFormat: "d-m-Y",
    });
    $("#kt_daterangepicker_lot_entry_add_date").flatpickr({
        dateFormat: "d-m-Y",
    });
    $("#kt_daterangepicker_lot_entry_edit_date").flatpickr({
        dateFormat: "d-m-Y",
    });
    $("#kt_daterangepicker_lot_entry_view_date").flatpickr({
        dateFormat: "d-m-Y",
    });

    $("#kt_datatable_responsive").DataTable({

        "responsive": true,
        "aaSorting": [],
        "language": {
            "lengthMenu": "Show _MENU_",
        },
        "dom": "<'row'" +
            "<'col-sm-6 d-flex align-items-center justify-conten-start'l>" +
            "<'col-sm-6 d-flex align-items-center justify-content-end'f>" +
            ">" +

            "<'table-responsive'tr>" +

            "<'row'" +
            "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
            "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
            ">"
    });
    </script>
    <!-- Membership Script -->
    <script>
    function date_fill_nontag_wallet_history() {
        var dt_fill_nontag_wallet_history = document.getElementById('dt_fill_nontag_wallet_history').value;
        var today_dt_nontag_wallet_history = document.getElementById('today_dt_nontag_wallet_history');
        var week_from_dt_nontag_wallet_history = document.getElementById('week_from_dt_nontag_wallet_history');
        var week_to_dt_nontag_wallet_history = document.getElementById('week_to_dt_nontag_wallet_history');
        var monthly_dt_nontag_wallet_history = document.getElementById('monthly_dt_nontag_wallet_history');
        var from_dt_nontag_wallet_history = document.getElementById('from_dt_nontag_wallet_history');
        var to_dt_nontag_wallet_history = document.getElementById('to_dt_nontag_wallet_history');
        var from_date_fillter_nontag_wallet_history = document.getElementById(
        'from_date_fillter_nontag_wallet_history');
        var to_date_fillter_nontag_wallet_history = document.getElementById('to_date_fillter_nontag_wallet_history');

        if (dt_fill_nontag_wallet_history == "today") {
            today_dt_nontag_wallet_history.style.display = "block";
            monthly_dt_nontag_wallet_history.style.display = "none";
            from_dt_nontag_wallet_history.style.display = "none";
            to_dt_nontag_wallet_history.style.display = "none";
            week_from_dt_nontag_wallet_history.style.display = "none";
            week_to_dt_nontag_wallet_history.style.display = "none";
            $("#today_date_fillter_nontag_wallet_history").flatpickr({
                dateFormat: "d-m-Y",
            });
        } else if (dt_fill_nontag_wallet_history == "week") {
            today_dt_nontag_wallet_history.style.display = "none";
            week_from_dt_nontag_wallet_history.style.display = "block";
            week_to_dt_nontag_wallet_history.style.display = "block";
            monthly_dt_nontag_wallet_history.style.display = "none";
            from_dt_nontag_wallet_history.style.display = "none";
            to_dt_nontag_wallet_history.style.display = "none";

            var curr = new Date; // get current date
            var first = curr.getDate() - curr.getDay(); // First day is the day of the month - the day of the week
            var last = first + 6; // last day is the first day + 6

            var firstday = new Date(curr.setDate(first)).toISOString().slice(0, 10);
            firstday = firstday.split("-").reverse().join("-");
            var lastday = new Date(curr.setDate(last)).toISOString().slice(0, 10);
            lastday = lastday.split("-").reverse().join("-");
            $('#week_from_date_fillter_nontag_wallet_history').val(firstday);
            $('#week_to_date_fillter_nontag_wallet_history').val(lastday);

        } else if (dt_fill_nontag_wallet_history == "monthly") {
            today_dt_nontag_wallet_history.style.display = "none";
            monthly_dt_nontag_wallet_history.style.display = "block";
            from_dt_nontag_wallet_history.style.display = "none";
            to_dt_nontag_wallet_history.style.display = "none";
            week_from_dt_nontag_wallet_history.style.display = "none";
            week_to_dt_nontag_wallet_history.style.display = "none";
            $("#monthly_date_fillter_nontag_wallet_history").flatpickr({
                dateFormat: "m-Y",
            });
        } else if (dt_fill_nontag_wallet_history == "custom Date") {
            today_dt_nontag_wallet_history.style.display = "none";
            monthly_dt_nontag_wallet_history.style.display = "none";
            from_dt_nontag_wallet_history.style.display = "block";
            to_dt_nontag_wallet_history.style.display = "block";
            week_from_dt_nontag_wallet_history.style.display = "none";
            week_to_dt_nontag_wallet_history.style.display = "none";

            $("#from_date_fillter_nontag_wallet_history").flatpickr({
                dateFormat: "d-m-Y",
            });
            $("#to_date_fillter_nontag_wallet_history").flatpickr({
                dateFormat: "d-m-Y",
            });
        } else {
            today_dt_nontag_wallet_history.style.display = "none";
            monthly_dt_nontag_wallet_history.style.display = "none";
            from_dt_nontag_wallet_history.style.display = "none";
            to_dt_nontag_wallet_history.style.display = "none";
            week_from_dt_nontag_wallet_history.style.display = "none";
            week_to_dt_nontag_wallet_history.style.display = "none";
        }
    }
    </script>
    <!-- non tag wallet history day fillter end -->
    <script>
    $("#kt_datatable_audit_tagged_entry").kendoTooltip({
        filter: "td",
        show: function(e) {
            if (this.content.text() != "") {
                $('[role="tooltip"]').css("visibility", "visible");
            }
        },
        hide: function() {
            $('[role="tooltip"]').css("visibility", "hidden");
        },
        content: function(e) {
            var element = e.target[0];
            if (element.offsetWidth < element.scrollWidth) {
                return e.target.text();
            } else {
                return "";
            }
        }
    });
    $("#kt_datatable_audit_tagged_entry_scanned").kendoTooltip({
        filter: "td",
        show: function(e) {
            if (this.content.text() != "") {
                $('[role="tooltip"]').css("visibility", "visible");
            }
        },
        hide: function() {
            $('[role="tooltip"]').css("visibility", "hidden");
        },
        content: function(e) {
            var element = e.target[0];
            if (element.offsetWidth < element.scrollWidth) {
                return e.target.text();
            } else {
                return "";
            }
        }
    });
    </script>

    <script>
    $("#kt_datatable_audit_tagged_entry").DataTable({
        "aaSorting": [],
        // "sorting":false,
        // "paging": false,
        // "responsive": true,
        "iDisplayLength": "25",
        "language": {
            "lengthMenu": "Show _MENU_",
        },
        "dom": "<'row'" +
            // "<'col-sm-6 d-flex align-items-center justify-conten-start'l>" +
            // "<'col-sm-6 d-flex align-items-center justify-content-end'f>" +
            ">" +

            "<'table-responsive'tr>" +

            "<'row'" +
            "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
            // "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
            ">"
    });
    $('#kt_datatable_audit_tagged_entry').wrap('<div class="dataTables_scroll" />');

    $("#kt_datatable_audit_tagged_entry_scanned").DataTable({
        "aaSorting": [],
        // "sorting":false,
        // "paging": false,
        // "responsive": true,
        "iDisplayLength": "25",
        "language": {
            "lengthMenu": "Show _MENU_",
        },
        "dom": "<'row'" +
            // "<'col-sm-6 d-flex align-items-center justify-conten-start'l>" +
            // "<'col-sm-6 d-flex align-items-center justify-content-end'f>" +
            ">" +

            "<'table-responsive'tr>" +

            "<'row'" +
            "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
            // "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
            ">"
    });
    $('#kt_datatable_audit_tagged_entry_scanned').wrap('<div class="dataTables_scroll" />');
    </script>
    <script>
    $("#kt_datatable_rating_history").DataTable({
        "aaSorting": [],
        // "sorting":false,
        // "paging": false,
        // "responsive": true,
        "iDisplayLength": "25",
        "language": {
            "lengthMenu": "Show _MENU_",
        },
        "dom": "<'row'" +
            "<'col-sm-6 d-flex align-items-center justify-conten-start'l>" +
            "<'col-sm-6 d-flex align-items-center justify-content-end'f>" +
            ">" +

            "<'table-responsive'tr>" +

            "<'row'" +
            "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
            "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
            ">"
    });
    // $('#view_nontag_wallet_table').wrap('<div class="dataTables_scroll" />');
    </script>

    <script>
    $("#kt_datatable_membership_history").DataTable({
        "aaSorting": [],
        // "sorting":false,
        // "paging": false,
        // "responsive": true,
        "iDisplayLength": "25",
        "language": {
            "lengthMenu": "Show _MENU_",
        },
        "dom": "<'row'" +
            "<'col-sm-6 d-flex align-items-center justify-conten-start'l>" +
            "<'col-sm-6 d-flex align-items-center justify-content-end'f>" +
            ">" +

            "<'table-responsive'tr>" +

            "<'row'" +
            "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
            "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
            ">"
    });
    // $('#view_nontag_wallet_table').wrap('<div class="dataTables_scroll" />');
    </script>
    <!-- Chit Transaction Script -->
    <script>
    $("#view_salesentry_table").DataTable({
        //"aaSorting":[],
        "sorting": false,
        "paging": false,
        // "responsive": true,
        "language": {
            "lengthMenu": "Show _MENU_",
        },
        "dom": "<'row'" +
            "<'col-sm-6 d-flex align-items-center justify-conten-start'l>" +
            ">" +

            "<'table-responsive'tr>" +

            "<'row'" +
            "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
            "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
            ">"
    });
    $('#view_salesentry_table').wrap('<div class="dataTables_scroll" />');
    </script>
    <script>
    $("#view_oldjewel_entry_table").DataTable({
        //"aaSorting":[],
        "sorting": false,
        "paging": false,
        // "responsive": true,
        "language": {
            "lengthMenu": "Show _MENU_",
        },
        "dom": "<'row'" +
            "<'col-sm-6 d-flex align-items-center justify-conten-start'l>" +
            ">" +

            "<'table-responsive'tr>" +

            "<'row'" +
            "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
            "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
            ">"
    });
    $('#view_oldjewel_entry_table').wrap('<div class="dataTables_scroll" />');
    </script>

    <script>
    $("#view_puregold_entry_table").DataTable({
        //"aaSorting":[],
        "sorting": false,
        "paging": false,
        // "responsive": true,
        "language": {
            "lengthMenu": "Show _MENU_",
        },
        "dom": "<'row'" +
            "<'col-sm-6 d-flex align-items-center justify-conten-start'l>" +
            ">" +

            "<'table-responsive'tr>" +

            "<'row'" +
            "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
            "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
            ">"
    });
    $('#view_puregold_entry_table').wrap('<div class="dataTables_scroll" />');
    </script>
    <!-- Sales list day fillter start -->
    <script>
    function date_fill_sales_list() {
        var dt_fill_sales_list = document.getElementById('dt_fill_sales_list').value;
        var today_dt_sales_list = document.getElementById('today_dt_sales_list');
        var week_from_dt_sales_list = document.getElementById('week_from_dt_sales_list');
        var week_to_dt_sales_list = document.getElementById('week_to_dt_sales_list');
        var monthly_dt_sales_list = document.getElementById('monthly_dt_sales_list');
        var from_dt_sales_list = document.getElementById('from_dt_sales_list');
        var to_dt_sales_list = document.getElementById('to_dt_sales_list');
        var from_date_fillter_sales_list = document.getElementById('from_date_fillter_sales_list');
        var to_date_fillter_sales_list = document.getElementById('to_date_fillter_sales_list');

        if (dt_fill_sales_list == "today") {
            today_dt_sales_list.style.display = "block";
            monthly_dt_sales_list.style.display = "none";
            from_dt_sales_list.style.display = "none";
            to_dt_sales_list.style.display = "none";
            week_from_dt_sales_list.style.display = "none";
            week_to_dt_sales_list.style.display = "none";
            $("#today_date_fillter_sales_list").flatpickr({
                dateFormat: "d-m-Y",
            });
        } else if (dt_fill_sales_list == "week") {
            today_dt_sales_list.style.display = "none";
            week_from_dt_sales_list.style.display = "block";
            week_to_dt_sales_list.style.display = "block";
            monthly_dt_sales_list.style.display = "none";
            from_dt_sales_list.style.display = "none";
            to_dt_sales_list.style.display = "none";

            var curr = new Date; // get current date
            var first = curr.getDate() - curr.getDay(); // First day is the day of the month - the day of the week

            var last = first + 6; // last day is the first day + 6

            var firstday = new Date(curr.setDate(first)).toISOString().slice(0, 10);
            firstday = firstday.split("-").reverse().join("-");
            var lastday = new Date(curr.setDate(last)).toISOString().slice(0, 10);
            lastday = lastday.split("-").reverse().join("-");
            $('#week_from_date_fillter_sales_list').val(firstday);
            $('#week_to_date_fillter_sales_list').val(lastday);

        } else if (dt_fill_sales_list == "monthly") {
            today_dt_sales_list.style.display = "none";
            monthly_dt_sales_list.style.display = "block";
            from_dt_sales_list.style.display = "none";
            to_dt_sales_list.style.display = "none";
            week_from_dt_sales_list.style.display = "none";
            week_to_dt_sales_list.style.display = "none";
            $("#monthly_date_fillter_sales_list").flatpickr({
                dateFormat: "m-Y",
            });
        } else if (dt_fill_sales_list == "custom Date") {
            today_dt_sales_list.style.display = "none";
            monthly_dt_sales_list.style.display = "none";
            from_dt_sales_list.style.display = "block";
            to_dt_sales_list.style.display = "block";
            week_from_dt_sales_list.style.display = "none";
            week_to_dt_sales_list.style.display = "none";

            $("#from_date_fillter_sales_list").flatpickr({
                dateFormat: "d-m-Y",
            });
            $("#to_date_fillter_sales_list").flatpickr({
                dateFormat: "d-m-Y",
            });
        } else {
            today_dt_sales_list.style.display = "none";
            monthly_dt_sales_list.style.display = "none";
            from_dt_sales_list.style.display = "none";
            to_dt_sales_list.style.display = "none";
            week_from_dt_sales_list.style.display = "none";
            week_to_dt_sales_list.style.display = "none";
        }
    }
    </script>
    <!-- Sales list day fillter end -->
    <script>
    function itm_ty() {
        var item_type = document.getElementById("item_type").value;

        var lot_gold = document.getElementById("lot_gold");
        var lot_silver = document.getElementById("lot_silver");
        if (item_type == "") {
            lot_gold.style.display = "none";
            lot_silver.style.display = "none";
        } else if (item_type == "gold") {
            lot_gold.style.display = "block";
            lot_silver.style.display = "none";
        } else {
            lot_gold.style.display = "none";
            lot_silver.style.display = "block";
        }

    };

    function itm_ty_edit() {
        var item_type_edit = document.getElementById("item_type_edit").value;

        var lot_gold_edit = document.getElementById("lot_gold_edit");
        var lot_silver_edit = document.getElementById("lot_silver_edit");
        if (item_type_edit == "") {
            lot_gold_edit.style.display = "none";
            lot_silver_edit.style.display = "none";
        } else if (item_type_edit == "gold") {
            lot_gold_edit.style.display = "block";
            lot_silver_edit.style.display = "none";
        } else {
            lot_gold_edit.style.display = "none";
            lot_silver_edit.style.display = "block";
        }

    };

    function itm_ty_view() {
        var item_type_view = document.getElementById("item_type_view").value;

        var lot_gold_view = document.getElementById("lot_gold_view");
        var lot_silver_view = document.getElementById("lot_silver_view");
        if (item_type_view == "") {
            lot_gold_view.style.display = "none";
            lot_silver_view.style.display = "none";
        } else if (item_type_view == "gold") {
            lot_gold_view.style.display = "block";
            lot_silver_view.style.display = "none";
        } else {
            lot_gold_view.style.display = "none";
            lot_silver_view.style.display = "block";
        }

    };
    </script>
    <script>
    function cash_lt_ey_radio() {
        var cash_lot_entry_radio = document.getElementById("cash_lot_entry_radio");

        var cash_lt_ey_label = document.getElementById("cash_lt_ey_label");
        var cash_lt_ey_tbox = document.getElementById("cash_lt_ey_tbox");

        if (cash_lot_entry_radio.checked == true) {
            cash_lt_ey_label.style.display = "block";
            cash_lt_ey_tbox.style.display = "block";
        } else {
            cash_lt_ey_label.style.display = "none";
            cash_lt_ey_tbox.style.display = "none";
        }
    };

    function cheque_lt_ey_radio() {
        var cheque_lot_entry_radio = document.getElementById("cheque_lot_entry_radio");

        var cheque_lt_ey_label = document.getElementById("cheque_lt_ey_label");
        var cheque_lt_ey_tbox = document.getElementById("cheque_lt_ey_tbox");

        if (cheque_lot_entry_radio.checked == true) {
            cheque_lt_ey_label.style.display = "block";
            cheque_lt_ey_tbox.style.display = "block";
        } else {
            cheque_lt_ey_label.style.display = "none";
            cheque_lt_ey_tbox.style.display = "none";
        }
    };

    function rtgs_lt_ey_radio() {
        var rtgs_lot_entry_radio = document.getElementById("rtgs_lot_entry_radio");

        var rtgs_lt_ey_label = document.getElementById("rtgs_lt_ey_label");
        var rtgs_lt_ey_tbox = document.getElementById("rtgs_lt_ey_tbox");
        var bank_lt_ey_label = document.getElementById("bank_lt_ey_label");
        var bank_lt_ey_tbox = document.getElementById("bank_lt_ey_tbox");

        if (rtgs_lot_entry_radio.checked == true) {
            rtgs_lt_ey_label.style.display = "block";
            rtgs_lt_ey_tbox.style.display = "block";
            bank_lt_ey_label.style.display = "block";
            bank_lt_ey_tbox.style.display = "block";
        } else {
            rtgs_lt_ey_label.style.display = "none";
            rtgs_lt_ey_tbox.style.display = "none";
            bank_lt_ey_label.style.display = "none";
            bank_lt_ey_tbox.style.display = "none";
        }
    };

    function metal_lt_ey_radio() {
        var metal_lot_entry_radio = document.getElementById("metal_lot_entry_radio");

        var metal_lt_ey_label = document.getElementById("metal_lt_ey_label");
        var metal_lt_ey_tbox = document.getElementById("metal_lt_ey_tbox");
        var purity_lt_ey_label = document.getElementById("purity_lt_ey_label");
        var purity_lt_ey_tbox = document.getElementById("purity_lt_ey_tbox");
        var rate_lt_ey_label = document.getElementById("rate_lt_ey_label");
        var rate_lt_ey_tbox = document.getElementById("rate_lt_ey_tbox");
        var mtamt_lt_ey_label = document.getElementById("mtamt_lt_ey_label");
        var mtamt_lt_ey_tbox = document.getElementById("mtamt_lt_ey_tbox");

        if (metal_lot_entry_radio.checked == true) {
            metal_lt_ey_label.style.display = "block";
            metal_lt_ey_tbox.style.display = "block";
            purity_lt_ey_label.style.display = "block";
            purity_lt_ey_tbox.style.display = "block";

            rate_lt_ey_label.style.display = "block";
            rate_lt_ey_tbox.style.display = "block";
            mtamt_lt_ey_label.style.display = "block";
            mtamt_lt_ey_tbox.style.display = "block";
        } else {
            metal_lt_ey_label.style.display = "none";
            metal_lt_ey_tbox.style.display = "none";
            purity_lt_ey_label.style.display = "none";
            purity_lt_ey_tbox.style.display = "none";

            rate_lt_ey_label.style.display = "none";
            rate_lt_ey_tbox.style.display = "none";
            mtamt_lt_ey_label.style.display = "none";
            mtamt_lt_ey_tbox.style.display = "none";
        }
    };
    </script>
    <script>
    function cash_lt_ey_radio_edit() {
        var cash_lot_entry_radio_edit = document.getElementById("cash_lot_entry_radio_edit");

        var cash_lt_ey_label_edit = document.getElementById("cash_lt_ey_label_edit");
        var cash_lt_ey_tbox_edit = document.getElementById("cash_lt_ey_tbox_edit");

        if (cash_lot_entry_radio_edit.checked == true) {
            cash_lt_ey_label_edit.style.display = "block";
            cash_lt_ey_tbox_edit.style.display = "block";
        } else {
            cash_lt_ey_label_edit.style.display = "none";
            cash_lt_ey_tbox_edit.style.display = "none";
        }
    };

    function cheque_lt_ey_radio_edit() {
        var cheque_lot_entry_radio_edit = document.getElementById("cheque_lot_entry_radio_edit");

        var cheque_lt_ey_label_edit = document.getElementById("cheque_lt_ey_label_edit");
        var cheque_lt_ey_tbox_edit = document.getElementById("cheque_lt_ey_tbox_edit");

        if (cheque_lot_entry_radio_edit.checked == true) {
            cheque_lt_ey_label_edit.style.display = "block";
            cheque_lt_ey_tbox_edit.style.display = "block";
        } else {
            cheque_lt_ey_label_edit.style.display = "none";
            cheque_lt_ey_tbox_edit.style.display = "none";
        }
    };

    function rtgs_lt_ey_radio_edit() {
        var rtgs_lot_entry_radio_edit = document.getElementById("rtgs_lot_entry_radio_edit");

        var rtgs_lt_ey_label_edit = document.getElementById("rtgs_lt_ey_label_edit");
        var rtgs_lt_ey_tbox_edit = document.getElementById("rtgs_lt_ey_tbox_edit");
        var bank_lt_ey_label_edit = document.getElementById("bank_lt_ey_label_edit");
        var bank_lt_ey_tbox_edit = document.getElementById("bank_lt_ey_tbox_edit");

        if (rtgs_lot_entry_radio_edit.checked == true) {
            rtgs_lt_ey_label_edit.style.display = "block";
            rtgs_lt_ey_tbox_edit.style.display = "block";
            bank_lt_ey_label_edit.style.display = "block";
            bank_lt_ey_tbox_edit.style.display = "block";
        } else {
            rtgs_lt_ey_label_edit.style.display = "none";
            rtgs_lt_ey_tbox_edit.style.display = "none";
            bank_lt_ey_label_edit.style.display = "none";
            bank_lt_ey_tbox_edit.style.display = "none";
        }
    };

    function metal_lt_ey_radio_edit() {
        var metal_lot_entry_radio_edit = document.getElementById("metal_lot_entry_radio_edit");

        var metal_lt_ey_label_edit = document.getElementById("metal_lt_ey_label_edit");
        var metal_lt_ey_tbox_edit = document.getElementById("metal_lt_ey_tbox_edit");
        var purity_lt_ey_label_edit = document.getElementById("purity_lt_ey_label_edit");
        var purity_lt_ey_tbox_edit = document.getElementById("purity_lt_ey_tbox_edit");
        var rate_lt_ey_label_edit = document.getElementById("rate_lt_ey_label_edit");
        var rate_lt_ey_tbox_edit = document.getElementById("rate_lt_ey_tbox_edit");
        var mtamt_lt_ey_label_edit = document.getElementById("mtamt_lt_ey_label_edit");
        var mtamt_lt_ey_tbox_edit = document.getElementById("mtamt_lt_ey_tbox_edit");

        if (metal_lot_entry_radio_edit.checked == true) {
            metal_lt_ey_label_edit.style.display = "block";
            metal_lt_ey_tbox_edit.style.display = "block";
            purity_lt_ey_label_edit.style.display = "block";
            purity_lt_ey_tbox_edit.style.display = "block";

            rate_lt_ey_label_edit.style.display = "block";
            rate_lt_ey_tbox_edit.style.display = "block";
            mtamt_lt_ey_label_edit.style.display = "block";
            mtamt_lt_ey_tbox_edit.style.display = "block";
        } else {
            metal_lt_ey_label_edit.style.display = "none";
            metal_lt_ey_tbox_edit.style.display = "none";
            purity_lt_ey_label_edit.style.display = "none";
            purity_lt_ey_tbox_edit.style.display = "none";

            rate_lt_ey_label_edit.style.display = "none";
            rate_lt_ey_tbox_edit.style.display = "none";
            mtamt_lt_ey_label_edit.style.display = "none";
            mtamt_lt_ey_tbox_edit.style.display = "none";
        }
    };
    </script>
    <script>
    function cash_lt_ey_radio_view() {
        var cash_lot_entry_radio_view = document.getElementById("cash_lot_entry_radio_view");

        var cash_lt_ey_label_view = document.getElementById("cash_lt_ey_label_view");
        var cash_lt_ey_tbox_view = document.getElementById("cash_lt_ey_tbox_view");

        if (cash_lot_entry_radio_view.checked == true) {
            cash_lt_ey_label_view.style.display = "block";
            cash_lt_ey_tbox_view.style.display = "block";
        } else {
            cash_lt_ey_label_view.style.display = "none";
            cash_lt_ey_tbox_view.style.display = "none";
        }
    };

    function cheque_lt_ey_radio_view() {
        var cheque_lot_entry_radio_view = document.getElementById("cheque_lot_entry_radio_view");

        var cheque_lt_ey_label_view = document.getElementById("cheque_lt_ey_label_view");
        var cheque_lt_ey_tbox_view = document.getElementById("cheque_lt_ey_tbox_view");

        if (cheque_lot_entry_radio_view.checked == true) {
            cheque_lt_ey_label_view.style.display = "block";
            cheque_lt_ey_tbox_view.style.display = "block";
        } else {
            cheque_lt_ey_label_view.style.display = "none";
            cheque_lt_ey_tbox_view.style.display = "none";
        }
    };

    function rtgs_lt_ey_radio_view() {
        var rtgs_lot_entry_radio_view = document.getElementById("rtgs_lot_entry_radio_view");

        var rtgs_lt_ey_label_view = document.getElementById("rtgs_lt_ey_label_view");
        var rtgs_lt_ey_tbox_view = document.getElementById("rtgs_lt_ey_tbox_view");
        var bank_lt_ey_label_view = document.getElementById("bank_lt_ey_label_view");
        var bank_lt_ey_tbox_view = document.getElementById("bank_lt_ey_tbox_view");

        if (rtgs_lot_entry_radio_view.checked == true) {
            rtgs_lt_ey_label_view.style.display = "block";
            rtgs_lt_ey_tbox_view.style.display = "block";
            bank_lt_ey_label_view.style.display = "block";
            bank_lt_ey_tbox_view.style.display = "block";
        } else {
            rtgs_lt_ey_label_view.style.display = "none";
            rtgs_lt_ey_tbox_view.style.display = "none";
            bank_lt_ey_label_view.style.display = "none";
            bank_lt_ey_tbox_view.style.display = "none";
        }
    };

    function metal_lt_ey_radio_view() {
        var metal_lot_entry_radio_view = document.getElementById("metal_lot_entry_radio_view");

        var metal_lt_ey_label_view = document.getElementById("metal_lt_ey_label_view");
        var metal_lt_ey_tbox_view = document.getElementById("metal_lt_ey_tbox_view");
        var purity_lt_ey_label_view = document.getElementById("purity_lt_ey_label_view");
        var purity_lt_ey_tbox_view = document.getElementById("purity_lt_ey_tbox_view");
        var rate_lt_ey_label_view = document.getElementById("rate_lt_ey_label_view");
        var rate_lt_ey_tbox_view = document.getElementById("rate_lt_ey_tbox_view");
        var mtamt_lt_ey_label_view = document.getElementById("mtamt_lt_ey_label_view");
        var mtamt_lt_ey_tbox_view = document.getElementById("mtamt_lt_ey_tbox_view");

        if (metal_lot_entry_radio_view.checked == true) {
            metal_lt_ey_label_view.style.display = "block";
            metal_lt_ey_tbox_view.style.display = "block";
            purity_lt_ey_label_view.style.display = "block";
            purity_lt_ey_tbox_view.style.display = "block";

            rate_lt_ey_label_view.style.display = "block";
            rate_lt_ey_tbox_view.style.display = "block";
            mtamt_lt_ey_label_view.style.display = "block";
            mtamt_lt_ey_tbox_view.style.display = "block";
        } else {
            metal_lt_ey_label_view.style.display = "none";
            metal_lt_ey_tbox_view.style.display = "none";
            purity_lt_ey_label_view.style.display = "none";
            purity_lt_ey_tbox_view.style.display = "none";

            rate_lt_ey_label_view.style.display = "none";
            rate_lt_ey_tbox_view.style.display = "none";
            mtamt_lt_ey_label_view.style.display = "none";
            mtamt_lt_ey_tbox_view.style.display = "none";
        }
    };
    </script>
    <script>
    $('#kt_docs_repeater_basic_silver_add').repeater({
        initEmpty: false,

        defaultValues: {
            'text-input': 'foo'
        },

        show: function() {
            $(this).slideDown();
        },

        hide: function(deleteElement) {
            $(this).slideUp(deleteElement);
        }
    });
    $('#kt_docs_repeater_basic_gold_add').repeater({
        initEmpty: false,

        defaultValues: {
            'text-input': 'foo'
        },

        show: function() {
            $(this).slideDown();
        },

        hide: function(deleteElement) {
            $(this).slideUp(deleteElement);
        }
    });
    </script>
    <script>
    $('#kt_docs_repeater_basic_silver_edit').repeater({
        initEmpty: false,

        defaultValues: {
            'text-input': 'foo'
        },

        show: function() {
            $(this).slideDown();
        },

        hide: function(deleteElement) {
            $(this).slideUp(deleteElement);
        }
    });
    $('#kt_docs_repeater_basic_gold_edit').repeater({
        initEmpty: false,

        defaultValues: {
            'text-input': 'foo'
        },

        show: function() {
            $(this).slideDown();
        },

        hide: function(deleteElement) {
            $(this).slideUp(deleteElement);
        }
    });
    </script>
    <script>
    $('#kt_docs_repeater_basic_silver_view').repeater({
        initEmpty: false,

        defaultValues: {
            'text-input': 'foo'
        },

        show: function() {
            $(this).slideDown();
        },

        hide: function(deleteElement) {
            $(this).slideUp(deleteElement);
        }
    });
    $('#kt_docs_repeater_basic_gold_view').repeater({
        initEmpty: false,

        defaultValues: {
            'text-input': 'foo'
        },

        show: function() {
            $(this).slideDown();
        },

        hide: function(deleteElement) {
            $(this).slideUp(deleteElement);
        }
    });
    </script>
    <script>
    $("#kt_daterangepicker_lot_entry_from").flatpickr({
        dateFormat: "d-m-Y",
    });
    $("#kt_daterangepicker_lot_entry_to").flatpickr({
        dateFormat: "d-m-Y",
    });
    $("#kt_daterangepicker_lot_entry_add_date").flatpickr({
        dateFormat: "d-m-Y",
    });
    $("#kt_daterangepicker_lot_entry_edit_date").flatpickr({
        dateFormat: "d-m-Y",
    });
    $("#kt_daterangepicker_lot_entry_view_date").flatpickr({
        dateFormat: "d-m-Y",
    });

    // $("#kt_datatable_responsive").DataTable({

    // 	"responsive": true,
    // 	"aaSorting":[],
    // 	 "language": {
    // 	  "lengthMenu": "Show _MENU_",
    // 	 },
    // 	 "dom":
    // 	  "<'row'" +
    // 	  "<'col-sm-6 d-flex align-items-center justify-conten-start'l>" +
    // 	  "<'col-sm-6 d-flex align-items-center justify-content-end'f>" +
    // 	  ">" +

    // 	  "<'table-responsive'tr>" +

    // 	  "<'row'" +
    // 	  "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
    // 	  "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
    // 	  ">"
    // 	});
    </script>

</body>
<!--end::Body-->

</html>