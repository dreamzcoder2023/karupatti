<?php $this->load->view("common"); ?>
<style>
.dataTables_scroll {
    position: relative;
    overflow: auto;
    max-height: 215px;
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

.pdt_tltp .pdt_sub_tltp {
    display: none;
}

.pdt_tltp:hover .pdt_sub_tltp {
    display: block;
    position: absolute;
    /*margin-top: -2em;*/
    /*margin-left: -3.5em !important;*/
    color: white;
    background: black;
    padding: 3px 13px 3px 10px;
    border-radius: 5px;
    font-size: 12px;
    z-index: 500 !important;
}

.table_tool {
    max-width: 30px !important;
    white-space: nowrap;
    text-overflow: ellipsis;
    overflow: hidden;
}

[role="tooltip"] {
    visibility: hidden;
}

/*Auto complete css start*/

.xdsoft_autocomplete,
.xdsoft_autocomplete div,
.xdsoft_autocomplete span {
    /*	-moz-box-sizing: border-box !important;
			box-sizing: border-box !important;*/
}

.xdsoft_autocomplete {
    display: inline;
    position: relative;
    word-spacing: normal;
    text-transform: none;
    text-indent: 0px;
    text-shadow: none;
    text-align: start;
}

/*.xdsoft_autocomplete_dropdown
		{
			left: 0px !important;
			top: 31px !important;
			margin-left: 0px !important;
			margin-right: 0px !important;
			width: 500px !important;
			display: none !important;
			max-height: 475px !important;
		}*/

.xdsoft_autocomplete .xdsoft_input {
    position: relative;
    z-index: 2;
}

.xdsoft_autocomplete .xdsoft_autocomplete_dropdown {
    position: absolute;
    border: 1px solid #ccc;
    border-top-color: #d9d9d9;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
    -webkit-box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
    cursor: default;
    display: none;
    z-index: 1001;
    margin-top: -1px;
    background-color: #fff;
    /*min-width:100%;*/
    width: 170px !important;
    overflow: auto;
    max-height: 300px !important;
    /*overflow-y: auto !important;
			overflow-x: auto !important;*/
    /*padding-right: 20px !important;*/
}

.xdsoft_autocomplete .xdsoft_autocomplete_hint {
    position: absolute;
    z-index: 1;
    color: #ccc !important;
    -webkit-text-fill-color: #ccc !important;
    text-fill-color: #ccc !important;
    overflow: hidden !important;
    white-space: pre !important;
}

.xdsoft_autocomplete .xdsoft_autocomplete_hint span {
    color: transparent;
    opacity: 0.0;
}

.xdsoft_autocomplete .xdsoft_autocomplete_dropdown>.xdsoft_autocomplete_copyright {
    color: #ddd;
    font-size: 10px;
    text-decoration: none;
    right: 5px;
    position: absolute;
    margin-top: -15px;
    z-index: 1002;
}

.xdsoft_autocomplete .xdsoft_autocomplete_dropdown>div {
    background: #fff;
    white-space: nowrap;
    cursor: pointer;
    line-height: 1.5em;
    padding: 2px 0px 2px 0px;
}

.xdsoft_autocomplete .xdsoft_autocomplete_dropdown>div.active {
    background: #0097CF;
    color: #FFFFFF;
}

/*Auto complete css end*/
</style>


<link href="<?php echo base_url(); ?>assets/jquery.autocomplete.css" rel="stylesheet" type="text/css" />
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
            <?php $this->load->view("sidebar"); ?>
            <!--begin::Wrapper-->
            <div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
                <?php $this->load->view("header"); ?>
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
                                <h1 class="d-flex align-items-center text-dark fw-bold my-1 fs-3">Sale Products
                                    <!--begin::Separator-->
                                    <span class="h-20px border-gray-200 border-start ms-3 mx-2"></span>
                                    <!--end::Separator-->
                                    <!--begin::Description-->
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

                                    <!--begin::Card header-->
                                    <!-- <div class="card-header1 border-0 pt-6">
										</div> -->
                                    <!--end::Card header-->
                                    <!--begin::Card body-->
                                    <div class="card-body py-4">
                                        <div class="row">
                                            <div class="col-lg-7">
                                                <!-- method="POST" autocomplete="off" action="< ?php echo base_url(); ?>Akssale/sale_save" -->
                                                <form id="submit_form" onsubmit="return submit_validation();">
                                                    <div class="row">
                                                        <label
                                                            class="col-lg-2 col-form-label required fw-semibold fs-6">Type</label>
                                                        <div class="col-lg-3 fv-row">
                                                            <select class="form-select form-select-solid"
                                                                name="aks_sales_type" id="aks_sales_type"
                                                                data-control="select2" data-hide-search="false"
                                                                onchange="sales_type_func();">
                                                                <option value="Sales" selected>Sales</option>
                                                                <option value="Quotation">Quotation</option>
                                                            </select>
                                                        </div>
                                                        <label class="col-lg-2 col-form-label required fw-semibold fs-6"
                                                            id="aks_quo_label" style="display:none;">Quotation</label>
                                                        <div class="col-lg-4 fv-row" id="aks_quo_tbox"
                                                            style="display:none;">
                                                            <select class="form-select form-select-solid"
                                                                name="quo_id_name" id="quo_id_name"
                                                                data-control="select2" data-hide-search="false"
                                                                onchange="get_quotation();">
                                                                <option value="">Select</option>
                                                                <?php foreach ($quotation_lists as $qlist) { ?>
                                                                <option value="<?php echo $qlist['sid']; ?>">
                                                                    <?php echo $qlist['sale_id']; ?></option>
                                                                <?php } ?>
                                                            </select>
                                                            <div class="fv-plugins-message-container invalid-feedback"
                                                                name="quo_id_name_err" id="quo_id_name_err"></div>

                                                        </div>
                                                        <label class="col-lg-2 col-form-label fw-semibold fs-6 required"  id="party_lab">Party
                                                            <i class="fa-solid fa-circle-info fs-7 ms-2"
                                                                title="AutoComplete Select Party Name"></i></label>
                                                        <div class="col-lg-4 fv-row fv-plugins-icon-container"
                                                            id="aks_par_tbox">
                                                            <input type="text" name="sale_party" id="sale_party"
                                                                class="form-control form-control-lg form-control-solid me-3"
                                                                placeholder="Select Party Name">
                                                            <div class="fv-plugins-message-container invalid-feedback"
                                                                name="party_err" id="party_err"></div>
                                                            <input type="hidden" name="party_id_hidden"
                                                                id="party_id_hidden" value="">

                                                        </div>
                                                        
                                                        <div class="col-lg-1 text-center mt-1">
                                                            <a href="javascript:;"
                                                                class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#kt_modal_add_party" title="Add Party"
                                                                onclick="karpattiparty_add();">
                                                                <i class="fa fa-user-plus fs-5"></i>
                                                                <!--end::Svg Icon-->
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <label
                                                            class="col-lg-2 col-form-label fw-semibold fs-6">Date</label>
                                                        <div class="col-lg-3 fv-row">
                                                            <div class="d-flex align-items-center">
                                                                <span
                                                                    class="svg-icon position-absolute ms-4 svg-icon-2 dt">
                                                                    <svg width="24" height="24" viewBox="0 0 24 24"
                                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <path opacity="0.3"
                                                                            d="M21 22H3C2.4 22 2 21.6 2 21V5C2 4.4 2.4 4 3 4H21C21.6 4 22 4.4 22 5V21C22 21.6 21.6 22 21 22Z"
                                                                            fill="currentColor" />
                                                                        <path
                                                                            d="M6 6C5.4 6 5 5.6 5 5V3C5 2.4 5.4 2 6 2C6.6 2 7 2.4 7 3V5C7 5.6 6.6 6 6 6ZM11 5V3C11 2.4 10.6 2 10 2C9.4 2 9 2.4 9 3V5C9 5.6 9.4 6 10 6C10.6 6 11 5.6 11 5ZM15 5V3C15 2.4 14.6 2 14 2C13.4 2 13 2.4 13 3V5C13 5.6 13.4 6 14 6C14.6 6 15 5.6 15 5ZM19 5V3C19 2.4 18.6 2 18 2C17.4 2 17 2.4 17 3V5C17 5.6 17.4 6 18 6C18.6 6 19 5.6 19 5Z"
                                                                            fill="currentColor" />
                                                                        <path
                                                                            d="M8.8 13.1C9.2 13.1 9.5 13 9.7 12.8C9.9 12.6 10.1 12.3 10.1 11.9C10.1 11.6 10 11.3 9.8 11.1C9.6 10.9 9.3 10.8 9 10.8C8.8 10.8 8.59999 10.8 8.39999 10.9C8.19999 11 8.1 11.1 8 11.2C7.9 11.3 7.8 11.4 7.7 11.6C7.6 11.8 7.5 11.9 7.5 12.1C7.5 12.2 7.4 12.2 7.3 12.3C7.2 12.4 7.09999 12.4 6.89999 12.4C6.69999 12.4 6.6 12.3 6.5 12.2C6.4 12.1 6.3 11.9 6.3 11.7C6.3 11.5 6.4 11.3 6.5 11.1C6.6 10.9 6.8 10.7 7 10.5C7.2 10.3 7.49999 10.1 7.89999 10C8.29999 9.90003 8.60001 9.80003 9.10001 9.80003C9.50001 9.80003 9.80001 9.90003 10.1 10C10.4 10.1 10.7 10.3 10.9 10.4C11.1 10.5 11.3 10.8 11.4 11.1C11.5 11.4 11.6 11.6 11.6 11.9C11.6 12.3 11.5 12.6 11.3 12.9C11.1 13.2 10.9 13.5 10.6 13.7C10.9 13.9 11.2 14.1 11.4 14.3C11.6 14.5 11.8 14.7 11.9 15C12 15.3 12.1 15.5 12.1 15.8C12.1 16.2 12 16.5 11.9 16.8C11.8 17.1 11.5 17.4 11.3 17.7C11.1 18 10.7 18.2 10.3 18.3C9.9 18.4 9.5 18.5 9 18.5C8.5 18.5 8.1 18.4 7.7 18.2C7.3 18 7 17.8 6.8 17.6C6.6 17.4 6.4 17.1 6.3 16.8C6.2 16.5 6.10001 16.3 6.10001 16.1C6.10001 15.9 6.2 15.7 6.3 15.6C6.4 15.5 6.6 15.4 6.8 15.4C6.9 15.4 7.00001 15.4 7.10001 15.5C7.20001 15.6 7.3 15.6 7.3 15.7C7.5 16.2 7.7 16.6 8 16.9C8.3 17.2 8.6 17.3 9 17.3C9.2 17.3 9.5 17.2 9.7 17.1C9.9 17 10.1 16.8 10.3 16.6C10.5 16.4 10.5 16.1 10.5 15.8C10.5 15.3 10.4 15 10.1 14.7C9.80001 14.4 9.50001 14.3 9.10001 14.3C9.00001 14.3 8.9 14.3 8.7 14.3C8.5 14.3 8.39999 14.3 8.39999 14.3C8.19999 14.3 7.99999 14.2 7.89999 14.1C7.79999 14 7.7 13.8 7.7 13.7C7.7 13.5 7.79999 13.4 7.89999 13.2C7.99999 13 8.2 13 8.5 13H8.8V13.1ZM15.3 17.5V12.2C14.3 13 13.6 13.3 13.3 13.3C13.1 13.3 13 13.2 12.9 13.1C12.8 13 12.7 12.8 12.7 12.6C12.7 12.4 12.8 12.3 12.9 12.2C13 12.1 13.2 12 13.6 11.8C14.1 11.6 14.5 11.3 14.7 11.1C14.9 10.9 15.2 10.6 15.5 10.3C15.8 10 15.9 9.80003 15.9 9.70003C15.9 9.60003 16.1 9.60004 16.3 9.60004C16.5 9.60004 16.7 9.70003 16.8 9.80003C16.9 9.90003 17 10.2 17 10.5V17.2C17 18 16.7 18.4 16.2 18.4C16 18.4 15.8 18.3 15.6 18.2C15.4 18.1 15.3 17.8 15.3 17.5Z"
                                                                            fill="currentColor" />
                                                                    </svg>
                                                                </span>
                                                                <!--end::Svg Icon-->
                                                                <input class="form-control form-control-solid ps-12"
                                                                    name="sale_date" placeholder="Date"
                                                                    id="sale_entry_add_date"
                                                                    value="<?php echo date('d-m-Y'); ?>" />
                                                            </div>
                                                            <div class="fv-plugins-message-container invalid-feedback"
                                                                name="date_err" id="date_err"></div>
                                                        </div>
                                                        <label
                                                            class="col-lg-2 col-form-label fw-semibold fs-6">Party</label>
                                                        <label class="col-lg-4 col-form-label fw-bold fs-6"
                                                            id="party_name_view">XXXXXXXX</label>
                                                        <input type="hidden" name="qu_party_name" id="qu_party_name" value="" class="form-control form-control-lg form-control-solid me-3 xdsoft_input">
                                                        <label
                                                            class="col-lg-2 col-form-label fw-semibold fs-6">Phone</label>
                                                        <label class="col-lg-4 col-form-label fw-bold fs-6"
                                                            id="party_mobile">9999999999</label>
                                                        <label
                                                            class="col-lg-2 col-form-label fw-semibold fs-6">Email</label>
                                                        <label class="col-lg-3 col-form-label fw-bold fs-6"
                                                            id="party_email">XXXXXXXX</label>
                                                        <label
                                                            class="col-lg-2 col-form-label fw-semibold fs-6">Bill.Address</label>
                                                        <label class="col-lg-4 col-form-label fw-bold fs-6"
                                                            id="party_address">No, street, city</label>
                                                        <label
                                                            class="col-lg-2 col-form-label fw-semibold fs-6">Ship.Address</label>
                                                        <label class="col-lg-4 col-form-label fw-bold fs-6"
                                                            id="party_shipment_address">No, street, city</label>

                                                        <input type="hidden" name="qu_party_type" id="qu_party_type"
                                                            value="">
                                                        <input type="hidden" name="qu_party_lname" id="qu_party_lname"
                                                            value="">
                                                        <input type="hidden" name="qu_party_address"
                                                            id="qu_party_address" value="">
                                                        <input type="hidden" name="qu_party_id" id="qu_party_id"
                                                            value="">

                                                        <input type="hidden" name="qu_party_address2"
                                                            id="qu_party_address2" value="">
                                                        <input type="hidden" name="qu_party_city" id="qu_party_city"
                                                            value="">
                                                        <input type="hidden" name="qu_party_state" id="qu_party_state"
                                                            value="">

                                                        <input type="hidden" name="qu_party_phone" id="qu_party_phone"
                                                            value="">
                                                        <input type="hidden" name="qu_sup_id" id="qu_sup_id" value="">
                                                        <input type="hidden" name="qu_email" id="qu_email" value="">
                                                        <input type="hidden" name="qu_gst" id="qu_gst" value="">
                                                    </div>

                                                    <table id="view_table_scroll"
                                                        class="table align-middle table-row-dashed table-striped table-hover fs-7 gy-1 gs-2">
                                                        <thead>
                                                            <tr class="text-start text-muted fw-bold fs-7 gs-0">
                                                                <th class="min-w-25px">Sno</th>
                                                                <th class="min-w-80px">Product</th>
                                                                <th class="min-w-25px">Wgt in g</th>
                                                                <!-- <th class="min-w-25px text-center">Qty</th> -->
                                                                <th class="min-w-25px">Per Price/g</th>
                                                                <th class="min-w-25px" align="end">Price</th>
                                                                <th class="min-w-25px">Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody class="text-gray-600 fw-semibold fs-8" id="table_row">



                                                        </tbody>
                                                    </table>


                                                    <div class="row">

                                                        <div class="col-lg-12">
                                                            <label
                                                                class="col-lg-12 col-form-label fw-bold fs-3 text-start">Mode
                                                                of Delivery</label>
                                                            <div class="row">
                                                                <div class="col-lg-2 d-flex align-items-center">
                                                                    <div class="form-check form-check-custom">
                                                                        <input class="form-check-input2" type="radio"
                                                                            value="courier"
                                                                            name="delivery_add_mode_courier"
                                                                            id="delivery_add_mode_courier"
                                                                            onclick="delivery_mode_courier_radio(1)"
                                                                            checked />
                                                                        <input type="hidden" name="delvery_mode_get"
                                                                            id="delvery_mode_get" value="courier">
                                                                    </div>
                                                                    <div class="d-flex flex-column">
                                                                        <div class="fs-6 fw-semibold text-muted"
                                                                            style="padding-left: 10px;">Courier</div>
                                                                    </div>

                                                                </div>
                                                                <div class="col-lg-2 d-flex align-items-center">
                                                                    <div class="form-check form-check-custom">
                                                                        <input class="form-check-input2" type="radio"
                                                                            id="select_int"
                                                                            name="delivery_add_mode_courier"
                                                                            value="Direct"
                                                                            onclick="delivery_mode_courier_radio(0)" />
                                                                    </div>
                                                                    <div class="d-flex flex-column">
                                                                        <div class="fs-6 fw-semibold text-muted"
                                                                            style="padding-left: 10px;">Direct</div>
                                                                    </div>
                                                                </div>

                                                                <div class="col-lg-4 fv-row fv-plugins-icon-container"
                                                                    id="delivery_par_tbox" style="display:block;">
                                                                    <select class="form-select form-select-solid"
                                                                        data-control="select2" data-hide-search="false"
                                                                        name="del_select">
                                                                        <option value="" selected>Select</option>
                                                                        <?php foreach ($supplier_list as $sllist) { ?>
                                                                        <option
                                                                            value="<?php echo $sllist['LEDGER_NAME'].'~'.$sllist['LEDGER_SNO']; ?>">
                                                                            <?php echo $sllist['LEDGER_NAME']; ?>
                                                                        </option>
                                                                        <?php } ?>
                                                                    </select>
                                                                </div>
                                                                <div class="col-lg-4 fv-row fv-plugins-icon-container"
                                                                    id="shipment_tbox" style="display:block;">

                                                                    <input type="text" name="shipment_charges"
                                                                        id="shipment_charges" value=""
                                                                        class="form-control form-control-lg form-control-solid me-3"
                                                                        placeholder="Shipment charges"
                                                                        onkeyup="total_after_shipment()"
                                                                        oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"
                                                                        onkeyup="pay_to_purchase_calc()">
                                                                </div>
                                                            </div>

                                                        </div>


                                                        <div class="col-lg-12">
                                                            <div class="row mt-8">
                                                                <label
                                                                    class="col-lg-3 col-form-label fw-bold fs-4">Total
                                                                    amount &nbsp;&nbsp;&nbsp;</label>
                                                                <label class="col-lg-2 col-form-label fw-bold fs-3"
                                                                    name="total_amt" id="lbl_tot_pay">0.00</label>



                                                                <label
                                                                    class="col-lg-4 col-form-label fw-bold fs-3">Discount</label>
                                                                <div style="width:90.25px;" class="col-lg-2">
                                                                    <input type="text" name="dis_cart_amt"
                                                                        id="dis_cart_amt"
                                                                        class="col-lg-4 form-control form-control-lg form-control-solid fs-4"
                                                                        onkeyup="cart_prd_totcal(event)" value="0"
                                                                        maxlength="5"
                                                                        oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"
                                                                        onkeyup="pay_to_purchase_calc()">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row ">
                                                        <label class="col-lg-3 col-form-label fw-bold fs-4">Paid amount
                                                            &nbsp;&nbsp;&nbsp;</label>
                                                        <label class="col-lg-2 col-form-label fw-bold fs-3"
                                                            id="label_paid_amount">0.00</label>
                                                        <label class="col-lg-4 col-form-label fw-bold fs-4">Balance
                                                            amount </label>
                                                        <label class="col-lg-3 col-form-label fw-bold fs-3"
                                                            id="label_balance_amount">0.00</label>

                                                    </div>
                                                    <div class="row">

                                                        <label class="col-lg-3 col-form-label fw-bold fs-4"
                                                            id="net_amt">Net Amount &emsp;</label>
                                                        <label class="col-lg-2 col-form-label fw-bold fs-3"
                                                            id="lbl_net_pay" name="net_amount">0.00</label>
                                                        <div class="col-lg-3">
                                                            <textarea class="form-control form-control-solid" rows="1"
                                                                id="remarks" name="remarks"
                                                                placeholder="Enter Remarks"></textarea>

                                                        </div>
                                                        <div class="col-lg-2 mt-3">

                                                            <label
                                                                class=" btn btn-sm btn-outline btn-outline-solid btn-outline-warning btn-active-light-primary ms-3"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#kt_modal_sale_payment" name="pay_btn"
                                                                id="pay_btn">Pay&nbsp;Now</label>
                                                        </div>
                                                        <div class="col-lg-2">
                                                            <button type="submit" class="btn btn-sm btn-primary mt-3"
                                                                id="btn_submit" style="display: none;"
                                                                onclick="submit_validation()">New Sale</button>
                                                        </div>

                                                        <div class="fv-plugins-message-container invalid-feedback text-end"
                                                            id="submit_err"></div>
                                                    </div>
                                                    <input type="hidden" name="shipment_to" id="shipment_to">
                                                    <input type="hidden" name="totalamount" id="totalamount" value="0">
                                                    <input type="hidden" name="netamount" id="netamount">
                                                    <input type="hidden" name="cashcheck" id="cashcheck" value="cash">
                                                    <input type="hidden" name="chequechk" id="chequechk">
                                                    <input type="hidden" name="rtgschk" id="rtgschk">
                                                    <input type="hidden" name="upichk" id="upichk">
                                                    <input type="hidden" name="cashamount" id="cashamount">
                                                    <input type="hidden" name="cashdetail" id="cashdetail">
                                                    <input type="hidden" name="chequeamount" id="chequeamount"
                                                        value="0">
                                                    <input type="hidden" name="chequesupbank" id="chequesupbank"
                                                        value="0">
                                                    <input type="hidden" name="chequerefno" id="chequerefno" value="0">
                                                    <input type="hidden" name="chequedetail" id="chequedetail"
                                                        value="0">
                                                    <!-- <input type="hidden" name="rtgsamount" id="rtgsamount" value="0">
														<input type="hidden" name="rtgsrefno" id="rtgsrefno" value="0">
														<input type="hidden" name="rtgsbank" id="rtgsbank" value="0">
														<input type="hidden" name="rtgsdetails" id="rtgsdetails" value="0"> -->
                                                    <input type="hidden" name="upiamount" id="upiamount" value="0">
                                                    <input type="hidden" name="upirefno" id="upirefno" value="0">
                                                    <input type="hidden" name="upibank" id="upibank" value="0">
                                                    <input type="hidden" name="upidetail" id="upidetail" value="0">
                                                    <input type="hidden" name="paid_amount" id="paid_amount" value="0">
                                                    <input type="hidden" name="balance_amount" id="balance_amount"
                                                        value="0">

                                                </form>
                                                <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

                                                <script>
                                                // add_validation()
                                                function add_validation() {

                                                    $('#cashcheck').val($('#cash_received_add_radio').val());
                                                    $('#chequechk').val($('#cheque_received_add_radio').val());
                                                    $('#rtgschk').val($('#rtgs_received_add_radio').val());
                                                    $('#upichk').val($('#upi_received_add_radio').val());

                                                    $('#cashamount').val($('#cash_amount').val());
                                                    $('#cashdetail').val($('#cash_detail').val());

                                                    $('#chequeamount').val($('#cheque_amount').val());
                                                    $('#chequesupbank').val($('#party_bank').val());
                                                    $('#chequerefno').val($('#cheque_ref_no').val());
                                                    $('#chequedetail').val($('#cheque_details').val());

                                                    // $('#rtgsamount').val($('#rtgs_amount').val());
                                                    // $('#rtgsrefno').val($('#rtgs_ref_no').val());
                                                    // $('#rtgsbank').val($('#rtgs_bank_id').val());
                                                    // $('#rtgsdetails').val($('#rtgs_details').val());

                                                    $('#upiamount').val($('#upi_amount').val());
                                                    $('#upirefno').val($('#upi_ref_no').val());
                                                    $('#upibank').val($('#upi_bank_id').val());
                                                    $('#upidetail').val($('#upi_details').val());


                                                    var err = 0;


                                                    // const cash_received_add_radio = document.getElementById(cash_received_add_radio.value);
                                                    // const cheque_received_add_radio = document.getElementById(cheque_received_add_radio.value);

                                                    var cash_amt = $('#cashamount').val();
                                                    var upi_amt = $('#upiamount').val();
                                                    var cheque_amt = $('#chequeamount').val();

                                                    if ((cash_amt <= 0) && (upi_amt <= 0) && (cheque_amt <= 0)) {

                                                        $('#payment_err').html(
                                                            'Please select Any one of the payment mode and Enter Amount !'
                                                            );
                                                        Swal.fire({
                                                            title: 'Payment Error!',
                                                            text: 'Please select Any one of the payment mode and Enter Amount !',
                                                            icon: 'error',
                                                            confirmButtonText: 'Okay'
                                                        });

                                                        err++;

                                                    } else {
                                                        $('#payment_err').html('');
                                                        // $('#ac_amount_err').html('');
                                                    }

                                                    if (cheque_amt > 0) {

                                                        var chequebank = $('#party_bank').val();
                                                        if (chequebank == "") {

                                                            $('#party_bank_err').html('Please select Bank !');
                                                            err++;
                                                        } else {
                                                            $('#party_bank_err').html('');
                                                        }

                                                        // var chequerefno = $('#cheque_ref_no').val();
                                                        // 	if (chequerefno.trim()=='') {

                                                        //   	$('#cheque_ref_no_err').html('Reference No is Required !');
                                                        // 	err++;
                                                        // }
                                                        // else{
                                                        // 	$('#cheque_ref_no_err').html('');
                                                        // }

                                                    } else {

                                                        $('#party_bank_err').html('');
                                                        $('#cheque_ref_no_err').html('');

                                                    }
                                                    if (upi_amt > 0) {



                                                        // var upirefno = $('#upi_ref_no').val();
                                                        // 	if (upirefno.trim()=='') {

                                                        //   	$('#upi_ref_no_err').html('Transaction No is Required !');
                                                        // 	err++;
                                                        // }
                                                        // else{
                                                        // 	$('#upi_ref_no_err').html('');
                                                        // }
                                                        var upi_bank = $('#upi_bank_id').val();
                                                        if (upi_bank == '') {

                                                            $('#upi_bank_id_err').html('Bank is Required !');
                                                            err++;
                                                        } else {
                                                            $('#upi_bank_id_err').html('');
                                                        }

                                                    } else {
                                                        $('#upi_ref_no_err').html('');
                                                        $('#upi_bank_id_err').html('');

                                                    }
                                                    var paid = $('#paid_amount').val();
                                                    var tot = $('#totalamount').val();

                                                    var paidamthtml = $('#lbl_paid_amt').html();
                                                    var lbl_net_pay1 = $('#lbl_net_pay1').html();

                                                    if (paidamthtml != lbl_net_pay1) {
                                                        $('#submit_err').html('Paid Amount Missmatched !');
                                                        $('#submit2_err').html('Paid Amount Missmatched !');

                                                        if (err == 0) {
                                                            Swal.fire({
                                                                title: 'Amount Mismatch!',
                                                                text: 'Please Check The Enter Amount is Mismatch..',
                                                                icon: 'error',
                                                                confirmButtonText: 'Okay'
                                                            });
                                                        }
                                                        $('#btn_submit').prop('disabled', true);
                                                    } else {
                                                        $('#submit_err').html('');
                                                        $('#submit2_err').html('');
                                                        $('#btn_submit').prop('disabled', false);
                                                    }
                                                    var lbl_tot_pay = parseFloat($('#lbl_tot_pay').html());
                                                    var count = $(".btnDelete").length;
                                                    if (lbl_tot_pay == 0) {
                                                        if (count <= 0) {
                                                            // alert(count)
                                                            $('#submit_err').html('Add Any One Of the Products !');
                                                            $('#btn_submit').prop('disabled', true);
                                                        }


                                                    } else {
                                                        $('#submit_err').html('');
                                                        $('#btn_submit').prop('disabled', false);
                                                    }


                                                    if (err > 0) {

                                                        $("#back_btn").hide();
                                                        $("#cilck_message").hide();
                                                        $("#ok_btn").show();



                                                        return false;


                                                    } else {
                                                        $("#back_btn").show();
                                                        $("#cilck_message").show();
                                                        $("#ok_btn").hide();

                                                        // $(document).ready(function() {
                                                        // var submit_count = 0;

                                                        // 	$('#btn_submit').click(function(){
                                                        // 	    submit_count += 1;

                                                        // 	    if(submit_count == 1) {
                                                        // 	        $('#submit_form').submit();
                                                        // 	    }	
                                                        // 	});

                                                        // });

                                                        return true;

                                                    }



                                                }
                                                </script>


                                                <script>
                                                function submit_validation() {



                                                    var err2 = 0;
                                                    var dateval = $('#sale_entry_add_date').val();
                                                    var search = $('#sale_party').val();



                                                    if (dateval.trim() == '') {
                                                        $('#date_err').html('select date !');
                                                        err2++;
                                                    } else {
                                                        $('#date_err').html('');
                                                    }


                                                    var type = $('#aks_sales_type').val();

                                                    // alert(type)
                                                    if (type == 'Sales') {

                                                        if (search.trim() == '') {
                                                            $('#party_err').html('Select party Name!');
                                                            err2++;
                                                        } else {
                                                            $('#party_err').html('');
                                                        }

                                                        var party = $('#party_id_hidden').val();
                                                        if (party.trim() == '') {
                                                            $('#party_err').html('Enter Valid Party Name!');
                                                            Swal.fire({
                                                                title: 'Error!',
                                                                text: 'Enter Valid Party Name...!',
                                                                icon: 'error',
                                                                confirmButtonText: 'Okay'
                                                            });
                                                            err2++;
                                                        } else {
                                                            $('#party_err').html('');
                                                        }
                                                    } else {

                                                        var quo_id_name = $('#quo_id_name').val();
                                                        if (quo_id_name.trim() == '') {
                                                            $('#quo_id_name_err').html('Please Select Quotation Id!');
                                                            Swal.fire({
                                                                title: 'Error!',
                                                                text: 'Please Select Quotation Id...!',
                                                                icon: 'error',
                                                                confirmButtonText: 'Okay'
                                                            });
                                                            err2++;
                                                        } else {
                                                            $('#quo_id_name_err').html('');
                                                        }

                                                        var party = $('#party_id_hidden').val();
                                                        if (party.trim() == '') {
                                                            $('#party_err').html('Enter Valid Party Name!');
                                                            Swal.fire({
                                                                title: 'Error!',
                                                                text: 'Enter Valid Party Name...!',
                                                                icon: 'error',
                                                                confirmButtonText: 'Okay'
                                                            });
                                                            err2++;
                                                        } else {
                                                            $('#party_err').html('');
                                                        }

                                                    }
                                                    var paid = $('#paid_amount').val();
                                                    var tot = $('#totalamount').val();

                                                    var paidamthtml = $('#lbl_paid_amt').html();
                                                    var lbl_net_pay1 = $('#lbl_net_pay1').html();

                                                    if (paidamthtml != lbl_net_pay1) {
                                                        $('#submit_err').html('Paid Amount Missmatched !');
                                                        Swal.fire({
                                                            title: 'Amount Mismatch!',
                                                            text: 'Please Check The Enter Amount is Mismatch..',
                                                            icon: 'error',
                                                            confirmButtonText: 'Okay'
                                                        });
                                                        err2++;
                                                    } else {
                                                        $('#submit_err').html('');
                                                    }


                                                    var prd_val = $('.product_validation').length;

                                                    if (prd_val < 1) {

                                                        if (err == 0) {
                                                            Swal.fire({
                                                                title: 'Error!',
                                                                text: 'Please Select Any One Of The Product...!',
                                                                icon: 'error',
                                                                confirmButtonText: 'Okay'
                                                            });
                                                            err++;
                                                        }

                                                    }


                                                    $('.product_validation').each(function() {

                                                        var value = $(this).val() ? $(this).val() : 0;
                                                        if (value == 0) {
                                                            // if (err==0) {
                                                            Swal.fire({
                                                                title: 'Error!',
                                                                text: 'Please check the Product weight...!',
                                                                icon: 'error',
                                                                confirmButtonText: 'Okay'
                                                            });
                                                            err++;
                                                            // }
                                                        }
                                                    });

                                                    // alert(err2)
                                                    if (err2 > 0) {
                                                        return false;
                                                    } else {
                                                        return add_validation();
                                                    }



                                                }
                                                </script>

                                            </div>
                                            <div class="col-lg-5">
                                                <!-- <div class="px-4" style="border-radius: 10px;padding-bottom: 10px;box-shadow: 0 5px 10px #00002947;"> -->

                                                <div class="row">
                                                    <div class="col-lg-3">
                                                        <label class="col-form-label fw-semibold fs-6 ">Category</label>
                                                    </div>
                                                    <div class="col-lg-9 fv-row fv-plugins-icon-container">
                                                        <select class="form-select form-select-solid"
                                                            name="category_select" id="category_select"
                                                            data-control="select2" data-hide-search="false"
                                                            onchange="category_selected()">
                                                            <option value="all" selected>All</option>
                                                            <?php foreach ($category_list1 as $category_list) { ?>
                                                            <option
                                                                value="<?php echo $category_list['AKSCATEGORY_ID']; ?>" <?php if ($category_list1 == $category_list['AKSCATEGORY_NAME']) {
																			   echo "selected";
																		   } ?>><?php echo $category_list['AKSCATEGORY_NAME']; ?></option><?php
																	} ?>
                                                            <input type="hidden" name="add_cart" id="add_cart"
                                                                value="<?php echo $category_list['AKSCATEGORY_NAME']; ?>">
                                                        </select>
                                                    </div>
                                                </div>
                                                <div
                                                    style="position: relative;overflow-x: hidden; !important;min-height: 410px !important;max-height: 410px !important;">
                                                    <div class="row mt-4" id="menuchange">
                                                        <?php foreach ($sale_menu as $k => $slist) { ?>
                                                        <div class="col-lg-3 fv-row fv-plugins-icon-container"
                                                            onclick="add_cart(<?php echo $slist['AKS_PRD_MID']; ?>)">

                                                            <?php if($slist['AKS_PRD_IMG']!=''){?>
                                                            <a href="javascript:;" id="add_cart"
                                                                class="btn btn-active-primary px-2 py-2">
                                                                <div class="image-input-wrapper overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover w-90px h-80px"
                                                                    style="background-image: url(<?php echo base_url() ?>assets/images/aks_product_image/<?php echo $slist['AKS_PRD_IMG']; ?>); border-radius: 10px; ">
                                                                </div>
                                                            </a>
                                                            <?php }else{ ?>
                                                            <a href="javascript:;" id="add_cart"
                                                                class="btn btn-active-primary px-2 py-2">
                                                                <div class="image-input-wrapper overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover w-90px h-80px"
                                                                    style="background-image: url(<?php echo base_url() ?>assets/images/karupatti.jpg); border-radius: 10px; ">
                                                                </div>
                                                            </a>
                                                            <?php } ?>
                                                            <div class="d-flex flex-column">
                                                                <?php
																				$product_name = $slist['AKS_PRD_NAME'];
																				if (strlen($product_name) > 10) {
																				  $product_name = substr($product_name, 0, 10) ."...";
																				}
																			?>
                                                                <a href="javascript:;"
                                                                    class="text-gray-600 text-hover-primary fs-7 pdt_tltp">
                                                                    <span><?php echo $product_name; ?></span>
                                                                    <span
                                                                        class="pdt_sub_tltp"><?php echo $slist['AKS_PRD_NAME']; ?></span>
                                                                </a>
                                                            </div>
                                                            <span class="fs-6 fw-bold"><i
                                                                    class="fa-sharp fa-solid fa-indian-rupee-sign eyc fs-6">
                                                                </i><?php echo $slist['AKS_PRD_PRICE']; ?>/<?php echo $slist['AKS_PRD_WT']; ?>
                                                                g</span>
                                                        </div>

                                                        <?php } ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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
                <?php $this->load->view("footer"); ?>
            </div>
            <!--end::Content-->
        </div>
        <!--end::Wrapper-->
    </div>
    <!--end::Page-->
    </div>
    <div class="modal fade" id="kt_modal_sale_payment" tabindex="-1" aria-hidden="true" data-bs-backdrop="static">
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

                <div class="modal-body pt-0 pb-15 px-5 px-xl-20">
                    <!--begin::Heading-->
                    <div class="mb-13 text-center">

                        <h1 class="mb-3">Sale Payment</h1>
                    </div>
                    <!--end::Heading-->
                    <!--end::Heading-->
                    <div class="row">
                        <label class="col-lg-2 col-form-label fw-bold fs-3">Net Amount</label>
                        <label class="col-lg-2 col-form-label fw-bold fs-3" id="lbl_net_pay1">0.00</label>

                    </div>
                    <div class="row">
                        <div class="col-lg-2 fv-row fv-plugins-icon-container fv-plugins-bootstrap5-row-invalid">
                            <div class="d-flex align-items-center mt-1">
                                <label class="form-check form-check-inline form-check-solid me-5 is-invalid">
                                    <input class="form-check-input" name="upi_received_add_radio" type="checkbox"
                                        value="UPI" id="upi_received_add_radio" onclick="upi_ln_recev_add_radio()">
                                </label>
                                <label class="col-form-label fw-semibold fs-6">UPI</label>
                            </div>
                        </div>
                        <div class="col-lg-2 fv-row fv-plugins-icon-container fv-plugins-bootstrap5-row-invalid">
                            <div class="d-flex align-items-center mt-1">
                                <label class="form-check form-check-inline form-check-solid me-5 is-invalid">
                                    <input class="form-check-input" name="cheque_received_add_radio" type="checkbox"
                                        value="Cheque" id="cheque_received_add_radio"
                                        onclick="cheque_ln_recev_add_radio()">
                                </label>
                                <label class="col-form-label fw-semibold fs-6">Bank</label>
                            </div>
                        </div>
                        <div class="col-lg-2 fv-row fv-plugins-icon-container fv-plugins-bootstrap5-row-invalid">
                            <div class="d-flex align-items-center mt-1">
                                <label class="form-check form-check-inline form-check-solid me-5 is-invalid">
                                    <input class="form-check-input" name="cash_received_add_radio" type="checkbox"
                                        value="Cash" id="cash_received_add_radio" onclick="cash_ln_recev_add_radio()">
                                </label>
                                <label class="col-form-label fw-semibold fs-6 me-5">Cash</label>
                            </div>
                        </div>

                        <div class="fv-plugins-message-container invalid-feedback" id="payment_err"></div>
                    </div>
                    <div class="row">
                        <label class="col-lg-1 col-form-label fw-semibold fs-6" id="upi_amt"
                            style="display:none;">UPI</label>
                        <div class="col-lg-2 fv-row fv-plugins-icon-container" id="upi_amt_tbox" style="display:none;">
                            <input type="text" class="form-control form-control-lg form-control-solid"
                                placeholder="Amount"
                                oninput="this.value = this.value.replace(/[^/0-9.]/g, '').replace(/(\..*)\./g, '$1');"
                                onkeyup="pay_to_purchase_calc()" value="0" name="upi_amount" id="upi_amount">
                            <!-- <input type="hidden" name="cash_hidden" id="cash_hidden" value=""> -->
                            <div class="fv-plugins-message-container invalid-feedback"></div>
                        </div>
                        <!-- <label class="col-lg-1 col-form-label fw-semibold fs-6" id="upi_trans_no" style="display:none;">Trans No</label> -->
                        <div class="col-lg-3 fv-row fv-plugins-icon-container" id="upi_trans_no_tbox"
                            style="display:none;">
                            <input type="text" name="upi_ref_no" id="upi_ref_no"
                                class="form-control form-control-lg form-control-solid" placeholder="Trans/Ref Number">
                            <div class="fv-plugins-message-container invalid-feedback" id="upi_ref_no_err"></div>
                        </div>
                        <div class="col-lg-3 fv-row fv-plugins-icon-container" id="upi_bank_tbox" style="display:none;">

                            <select class="form-select form-select-solid" data-dropdown-parent="#kt_modal_sale_payment"
                                data-control="select2" data-hide-search="false" name="upi_bank_id" id="upi_bank_id">
                                <option value="">Select</option>
                                <?php
											$bnk_det = $this->db->query("SELECT * FROM BANKS WHERE ACTIVE='Y' AND COMPANYCODE='003' ")->result_array();
											foreach ($bnk_det as $blist) {
												?>
                                <option value="<?php echo $blist['SNO']; ?>"><?php echo $blist['BANKNAME']; ?></option>
                                <?php
											}
											?>
                            </select>
                            <div class="fv-plugins-message-container invalid-feedback" id="upi_bank_id_err"></div>
                        </div>
                        <!-- <label class="col-lg-1 col-form-label fw-semibold fs-6" id="upi_detail" style="display:none;">Details</label> -->
                        <div class="col-lg-3 fv-row fv-plugins-icon-container" id="upi_detail_tbox"
                            style="display:none;">
                            <textarea class="form-control form-control-solid" rows="1" placeholder="Details"
                                name="upi_details" id="upi_details"></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-lg-1 col-form-label fw-semibold fs-6" id="cheque_amt"
                            style="display:none;">Bank</label>
                        <div class="col-lg-2 fv-row fv-plugins-icon-container" id="cheque_amt_tbox"
                            style="display:none;">
                            <input type="text" class="form-control form-control-lg form-control-solid"
                                placeholder="Amount"
                                oninput="this.value = this.value.replace(/[^/0-9.]/g, '').replace(/(\..*)\./g, '$1');"
                                onkeyup="pay_to_purchase_calc()" value="0" name="cheque_amount" id="cheque_amount">
                        </div>
                        <div class="col-lg-3 fv-row fv-plugins-icon-container" id="cheque_chq_no_tbox"
                            style="display:none;">
                            <input type="text" name="cheque_ref_no" id="cheque_ref_no"
                                class="form-control form-control-lg form-control-solid" placeholder="Trans/Ref Number"
                                oninput="this.value = this.value.replace(/[^A-Za-z/0-9.]/g, '').replace(/(\..*)\./g, '$1');">
                            <div class="fv-plugins-message-container invalid-feedback" id="cheque_ref_no_err"></div>
                        </div>
                        <!-- <label class="col-lg-1 col-form-label fw-semibold fs-6" id="cheque_bank" style="display:none;">Bank</label> -->
                        <div class="col-lg-3 fv-row fv-plugins-icon-container" id="cheque_bank_tbox"
                            style="display:none;">
                            <!-- <input type="text"  class="form-control form-control-lg form-control-solid" placeholder="Enter Party Bank" oninput="this.value = this.value.replace(/[^A-Za-z/0-9.]/g, '').replace(/(\..*)\./g, '$1');"    name="party_bank" id="party_bank" > -->
                            <select class="form-select form-select-solid" data-dropdown-parent="#kt_modal_sale_payment"
                                data-control="select2" data-hide-search="false" name="party_bank" id="party_bank">
                                <option value="">Select</option>
                                <?php
											$bnk_det = $this->db->query("SELECT * FROM BANKS WHERE ACTIVE='Y' AND COMPANYCODE='003' ")->result_array();
											foreach ($bnk_det as $blist) {
												?>
                                <option value="<?php echo $blist['SNO']; ?>"><?php echo $blist['BANKNAME']; ?></option>
                                <?php
											}
											?>
                            </select>
                            <div class="fv-plugins-message-container invalid-feedback" id="party_bank_err"></div>
                            <!-- <input type="hidden" name="cash_hidden" id="cash_hidden" value=""> -->
                        </div>
                        <!-- <label class="col-lg-1 col-form-label fw-semibold fs-6" id="cheque_chq_no" style="display:none;">Cheque no</label> -->

                        <!-- <label class="col-lg-1 col-form-label fw-semibold fs-6" id="cheque_detail" style="display:none;">Details</label> -->
                        <div class="col-lg-3 fv-row fv-plugins-icon-container" id="cheque_detail_tbox"
                            style="display:none;">
                            <textarea class="form-control form-control-solid" rows="1" placeholder="Details"
                                name="cheque_details" id="cheque_details"></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-lg-1 col-form-label fw-semibold fs-6" id="cash_label"
                            style="display:none;">Cash</label>
                        <div class="col-lg-2 fv-row fv-plugins-icon-container" id="cash_label_tbox"
                            style="display:none;">
                            <input type="text" class="form-control form-control-lg form-control-solid"
                                placeholder="Amount"
                                oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"
                                onkeyup="pay_to_purchase_calc()" value="0" name="cash_amount" id="cash_amount">
                            <input type="hidden" name="cash_hidden_rl" id="cash_hidden" value="0">
                            <div class="fv-plugins-message-container invalid-feedback"></div>
                        </div>
                        <div class="col-lg-3 fv-row fv-plugins-icon-container" id="cash_detail_tbox"
                            style="display:none;">
                            <textarea class="form-control form-control-solid" rows="1" placeholder="Details"
                                name="cash_detail" id="cash_detail"></textarea>
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col-lg-6 text-center">
                            <label class="col-form-label fw-bold fs-4">Paid Amount &emsp;</label>
                            <label class="col-form-label fw-bold fs-3" id="lbl_paid_amt">0.00</label>
                        </div>
                        <!-- 
									<div class="col-lg-3 text-center">
										<label class="col-form-label fw-bold fs-4">Paid Amount &emsp;</label>
										<label class="col-form-label fw-bold fs-3">3000.00</label>
									</div> -->
                        <div class="col-lg-6 text-center">
                            <label class="col-form-label fw-bold fs-4">Balance Amount &emsp;</label>
                            <label class="col-form-label fw-bold fs-3" id="lbl_bal_amt">0.00</label>
                        </div>
                    </div>
                    <div class="fv-plugins-message-container invalid-feedback text-end" id="submit2_err"></div>

                    <div class="d-flex justify-content-end mt-6 px-9">
                        <div type="reset" class="btn btn-primary me-3" id="back_btn" style="display: none;"
                            data-bs-dismiss="modal" onclick="payment_mode()">Save </div>


                        <div id="ok_btn" class="btn btn-sm btn-primary" onclick="add_validation()">Ok</div>

                    </div>
                    <div class="fv-plugins-message-container invalid-feedback text-end" id="cilck_message"
                        style="display: none;">Click the save button to continue the process</div>
                    <!-- </div> -->
                    <!--end::Modal body-->

                </div>
                <!--end::Modal content-->
            </div>
            <!--end::Modal dialog-->
        </div>
    </div>

    <div class="modal fade" id="kt_modal_add_party" tabindex="-1" aria-hidden="true">

    </div>

    <input type="hidden" data-bs-toggle="modal" data-bs-target="#pop_up_model_err" id="pop_up_alert_err">
    <div class="modal fade" id="pop_up_model_err" tabindex="-1" aria-hidden="true">
        <!--begin::Modal dialog-->
        <div class="modal-dialog modal-dialog-centered modal-m">
            <!--begin::Modal content-->
            <div class="modal-content rounded">
                <div class="swal2-icon swal2-warning swal2-icon-show" style="display: flex;">
                    <div class="swal2-icon-content">?</div>
                </div>
                <div class="swal2-html-container" id="swal2-html-container" style="display: block;">
                    <span id="messagebill_err"></span>
                </div>
                <div class="d-flex flex-center flex-row-fluid pt-12">
                    <button type="submit" class="btn btn-primary me-3" data-bs-dismiss="modal">Yes</button>
                    <button type="reset" class="btn btn-secondary"><a class="text-dark"
                            href="<?php echo base_url(); ?>Akssale">No</a></button>

                </div><br><br>
            </div>
            <!--end::Modal content-->
        </div>
        <!--end::Modal dialog-->
    </div>

    <!--end::Root-->
    <input type="hidden" id="baseurl" value="<?php echo base_url(); ?>">
    <?php $this->load->view("script"); ?>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!--<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>-->

    <script src="<?php echo base_url(); ?>assets/jquery.autocomplete.js"></script>
    <script>
    // var objDiv = document.getElementById("view_table_scroll");
    // objDiv.scrollTop = objDiv.scrollHeight;
    </script>

    <script>
    document.getElementById("submit_form").addEventListener("submit", function(event) {
        event.preventDefault(); // Prevent the form from submitting normally
        // Perform form validation
        if (submit_validation()) {
            // Disable the submit button to prevent multiple submissions
            document.getElementById("btn_submit").disabled = true;
            // alert('succ');

            // Submit the form
            submitForm();
        }
    });
    var baseurl = $("#baseurl").val();

    function submitForm() {

        const akssalesave = {};
        $('#submit_form input, #submit_form textarea, #submit_form select').each(function() {
            const fieldName = this.name;
            const fieldValue = $(this).val();

            if (fieldName.includes('[]')) {
                const arrayFieldName = fieldName.replace('[]', '');
                if (akssalesave.hasOwnProperty(arrayFieldName)) {
                    akssalesave[arrayFieldName].push(fieldValue);
                } else {
                    akssalesave[arrayFieldName] = [fieldValue];
                }
            } else {
                akssalesave[fieldName] = fieldValue;
            }
        });



        // console.log(akssalesave);


        var formData = new FormData();

        formData.append('sale_data', JSON.stringify(akssalesave));

        // console.log(formData);

        $.ajax({
            url: baseurl + 'Akssale/sale_save',
            type: 'POST',
            data: formData,
            async: false,
            cache: false,
            contentType: false,
            processData: false,
            success: function(response) {
                if (response) {
                    window.location.href = baseurl + 'Akssale';
                }
            }
        });

    }
    </script>


    <script>
    $("#sale_entry_add_date").flatpickr({
        dateFormat: "d-m-Y",
        maxDate: "today"
    });
    </script>
    <script type="text/javascript">
    function karpattiparty_add() {
        var baseurl = $("#baseurl").val();
        // alert(val);
        $.ajax({
            type: "POST",
            url: baseurl + 'Akssale/karpatti_party_add',
            async: false,
            type: "POST",
            success: function(response) {
                $('#kt_modal_add_party').empty().append(response);
                $('#kt_modal_add_party').addClass('show');
            }
        });
    }
    </script>


    <script>
    var baseurl = $("#baseurl").val();


    $("#sale_party").autocomplete({
        valueKey: 'title',
        source: [{
            url: baseurl + 'Akssale/sale_list_det?query=%QUERY%',
            type: 'remote',
            ajax: {
                dataType: 'json',
            }
        }]
    }).on('selected.xdsoft', function(e, suggestion, ui) {
        $("#sale_party").val(suggestion.firstname);
        $('#party_id_hidden').val(suggestion.id_party);

        $("#party_name_view").html(suggestion.firstname);


        $("#party_address").html(suggestion.address);
        $("#shipment_to").html(suggestion.address);
        $("#party_mobile").html(suggestion.phone);
        $("#party_email").html(suggestion.email);
        $("#party_shipment_address").html(suggestion.shipment_address);



        var party_id = $('#party_id_hidden').val();
        var name = $('#sale_party').val();
        var saledate = $('#sale_entry_add_date').val();
        var type = 1;

        // alert(party_id);
        if (party_id.trim() != '') {

            $.ajax({
                type: "POST",
                url: baseurl + 'Akssale/billcheck',
                async: false,
                type: "POST",
                data: "id=" + party_id + "&saledate=" + saledate + "&type=" + type,
                dataType: "html",
                success: function(response) {


                    if (response == 1) {


                        $(document).ready(function() {
                            document.getElementById("pop_up_alert_err").click()
                            $('#messagebill_err').html(
                                'Bill has already been generated for customer <b>' +
                                name + '</b> on <b>' + saledate +
                                '</b>. Create another bill? ');
                        });

                    } else {
                        // alert('nooo')

                    }

                }
            });

        } else {

            // alert('noooo')
        }

    });
    </script>

    <script>
    function diff_address1() {

        var address_div = $('#billing_address_div').clone();
        var checkbox = $("#diff_address");
        var checkbox = document.getElementById("diff_address");
        $('#shiping_address_div').css('display', 'block');

        if (checkbox.checked) {

            $('#shiping_address_div').css('display', 'block');
            $('#shiping_div').val(1);


        } else {

            $('#shiping_address_div').css('display', 'none');
            $('#shiping_div').val(0);


        }

    }
    </script>




    <script>
    $("#view_table_scroll").DataTable({
        //"aaSorting":[],
        "sorting": false,
        "paging": false,
        "info": false,
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
    $('#view_table_scroll').wrap('<div class="dataTables_scroll" />');
    </script>
    <script>
    $("#view_table_scroll").kendoTooltip({
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
    function delivery_mode_courier_radio(id) {
        var delivery_add_mode_courier = document.getElementById("delivery_add_mode_courier");

        // var delivered_label = document.getElementById("delivered_label");	
        var delivery_par_tbox = document.getElementById("delivery_par_tbox");
        // var shipment_label = document.getElementById("shipment_label");
        var shipment_tbox = document.getElementById("shipment_tbox");

        if (id == 1) {
            // delivered_label.style.display = "block";
            delivery_par_tbox.style.display = "block";
            // shipment_label.style.display = "block";
            shipment_tbox.style.display = "block";
            $('#delvery_mode_get').val('courier');
        } else {
            // delivered_label.style.display = "none";
            delivery_par_tbox.style.display = "none";
            // shipment_label.style.display = "none";
            shipment_tbox.style.display = "none";
            $('#delvery_mode_get').val('Direct');
        }

    };
    </script>

    <script>
    function cash_ln_recev_add_radio() {
        var cash_received_add_radio = document.getElementById("cash_received_add_radio");

        var cash_label = document.getElementById("cash_label");
        var cash_label_tbox = document.getElementById("cash_label_tbox");
        var cash_detail_tbox = document.getElementById("cash_detail_tbox");

        if (cash_received_add_radio.checked) {
            cash_label.style.display = "block";
            cash_label_tbox.style.display = "block";
            cash_detail_tbox.style.display = "block";
        } else {
            cash_label.style.display = "none";
            cash_label_tbox.style.display = "none";
            cash_detail_tbox.style.display = "none";
            $('#cash_amount').val('0');
            pay_to_purchase_calc()
        }
    };

    function cheque_ln_recev_add_radio() {
        var cheque_received_add_radio = document.getElementById("cheque_received_add_radio");

        var cheque_amt = document.getElementById("cheque_amt");
        var cheque_amt_tbox = document.getElementById("cheque_amt_tbox");
        // var cheque_bank = document.getElementById("cheque_bank");
        var cheque_bank_tbox = document.getElementById("cheque_bank_tbox");
        // var cheque_chq_no = document.getElementById("cheque_chq_no");
        var cheque_chq_no_tbox = document.getElementById("cheque_chq_no_tbox");
        // var cheque_detail = document.getElementById("cheque_detail");
        var cheque_detail_tbox = document.getElementById("cheque_detail_tbox");

        if (cheque_received_add_radio.checked) {
            cheque_amt.style.display = "block";
            cheque_amt_tbox.style.display = "block";
            // cheque_bank.style.display = "block";
            cheque_bank_tbox.style.display = "block";
            // cheque_chq_no.style.display = "block";
            cheque_chq_no_tbox.style.display = "block";
            // cheque_detail.style.display = "block";
            cheque_detail_tbox.style.display = "block";
        } else {
            cheque_amt.style.display = "none";
            cheque_amt_tbox.style.display = "none";
            // cheque_bank.style.display = "none";
            cheque_bank_tbox.style.display = "none";
            // cheque_chq_no.style.display = "none";
            cheque_chq_no_tbox.style.display = "none";
            // cheque_detail.style.display = "none";
            cheque_detail_tbox.style.display = "none";
            $('#cheque_amount').val('0');
            pay_to_purchase_calc()
        }
    };

    function upi_ln_recev_add_radio() {
        var upi_received_add_radio = document.getElementById("upi_received_add_radio");

        var upi_amt = document.getElementById("upi_amt");
        var upi_amt_tbox = document.getElementById("upi_amt_tbox");
        // var upi_trans_no = document.getElementById("upi_trans_no");
        var upi_trans_no_tbox = document.getElementById("upi_trans_no_tbox");
        var upi_bank_tbox = document.getElementById("upi_bank_tbox");
        var upi_detail_tbox = document.getElementById("upi_detail_tbox");

        if (upi_received_add_radio.checked == true) {
            upi_amt.style.display = "block";
            upi_amt_tbox.style.display = "block";
            // upi_trans_no.style.display = "block";
            upi_trans_no_tbox.style.display = "block";
            upi_bank_tbox.style.display = "block";
            upi_detail_tbox.style.display = "block";
        } else {
            upi_amt.style.display = "none";
            upi_amt_tbox.style.display = "none";
            // upi_trans_no.style.display = "none";
            upi_trans_no_tbox.style.display = "none";
            upi_bank_tbox.style.display = "none";
            upi_detail_tbox.style.display = "none";
            $('#upi_amount').val('0');
            pay_to_purchase_calc()
        }
    };
    </script>

    <script>
    function payment_mode() {

        // var pay_btn = document.getElementById("pay_btn");
        var balance = parseFloat($('#balance_amount').val());
        var paid = parseFloat($('#paid_amount').val());


        // alert(balance);
        // alert(paid);

        var btn_submit = document.getElementById("btn_submit");





        if (paid > 1 && balance == 0) {
            btn_submit.style.display = "block";
        } else {

            btn_submit.style.display = "none";
        }




    }
    </script>

    <script>
    function total_after_shipment() {

        var shipment_charges = parseFloat($('#shipment_charges').val());
        var tot_cart_amt = parseFloat($('#totalamount').val());

        if (isNaN(shipment_charges)) shipment_charges = 0;
        if (isNaN(tot_cart_amt)) tot_cart_amt = 0;
        var total = shipment_charges + tot_cart_amt;

        // alert(total)

        $('#lbl_tot_pay').html(total);


        var tot_cart_amt = parseFloat($('#total_cart_amount').val());
        var dis_cart_amt = parseFloat($('#dis_cart_amt').val());
        var rc_tot = parseFloat(total);
        var net_amt = parseFloat($('#net_amt').html());

        if (isNaN(tot_cart_amt)) tot_cart_amt = 0;
        if (isNaN(dis_cart_amt)) dis_cart_amt = 0;

        var ntot = (rc_tot + tot_cart_amt) - dis_cart_amt;
        var nettot = (rc_tot + tot_cart_amt) - dis_cart_amt;



        $('#lbl_net_pay').html(nettot);
        $('#lbl_net_pay1').html(nettot);
        $('#netamount').val(nettot);
        cart_prd_totcal()
    }
    </script>


    <script>
    var arr = [];

    function get_quotation() {
        var baseurl = $("#baseurl").val();
        var val = $('#quo_id_name').val();
        // alert(val)
        if (val !== '') {
            $.ajax({
                type: "POST",
                url: baseurl + 'Akssale/aks_quo_details',
                async: false,
                data: "id=" + val,
                dataType: "html",
                success: function(response) {
                    if (response) {
                        var res = response.split('||');
                        if (res[1] === 'party') {

                            $("#party_name_view").html(res[3]);
                            $("#sale_party").val(res[3]);

                            $("#party_address").html(res[4]);
                            $("#party_mobile").html(res[5]);
                            $('#party_email').html(res[6]);
                            $("#party_shipment_address").html(res[7]);
                            $("#dis_cart_amt").val(parseFloat(res[8]));
                            // cart_prd_totcal()
                            $("#qu_party_type").val(res[1]);
                            $("#qu_party_name").val(res[3]);
                            $("#qu_party_id").val(res[2]);

                            $("#party_id_hidden").val(res[2]);
                            var party_id = $('#qu_party_id').val();
                            var name = $('#qu_party_name').val();
                            var saledate = $('#sale_entry_add_date').val();
                            var type = 1;
                            // alert(party_id);
                            if (party_id.trim() != '') {

                                $.ajax({
                                    type: "POST",
                                    url: baseurl + 'Akssale/billcheck',
                                    async: false,
                                    type: "POST",
                                    data: "id=" + party_id + "&saledate=" + saledate + "&type=" +
                                        type,
                                    dataType: "html",
                                    success: function(response) {


                                        if (response == 1) {
                                            $(document).ready(function() {
                                                document.getElementById(
                                                    "pop_up_alert_err").click()
                                                $('#messagebill_err').html(
                                                    'Bill has already been generated for customer <b>' +
                                                    name + '</b> on <b>' +
                                                    saledate +
                                                    '</b>. Create another bill? ');
                                            });

                                        } else {
                                            // alert('nooo')

                                        }

                                    }
                                });

                            } else {

                                // alert('noooo')
                                // $('#qu_party_id').val('');
                                // $("#qu_party_lname").val('');
                                // $("#qu_party_address").val('');
                                // $("#qu_party_address2").val('');
                                // $("#qu_party_city").val('');
                                // $("#qu_party_state").val('');
                                // $("#qu_sup_id").val('');
                                // $("#qu_party_phone").val('');
                                // $("#qu_email").val('');
                                // $("#qu_gst").val('');
                            }

                        } else if (res[1] === 'supplier') {

                            $("#party_name_view").html(res[3]);
                            $("#sale_party").val(res[3]);
                            $("#party_address").html(res[4]);
                            $("#party_mobile").html(res[5]);
                            $('#party_email').html(res[6]);
                            $("#party_shipment_address").html(res[7]);

                            $("#qu_party_type").val(res[1]);
                            $("#qu_party_name").val(res[3]);
                            $("#qu_party_lname").val(res[8]);
                            $("#qu_party_address").val(res[9]);
                            $("#qu_party_address2").val(res[10]);
                            $("#qu_party_city").val(res[11]);
                            $("#qu_party_state").val(res[12]);
                            $("#qu_sup_id").val(res[2]);
                            $("#party_id_hidden").val(res[2]);
                            $("#qu_party_phone").val(res[5]);
                            $("#qu_email").val(res[6]);
                            $("#qu_gst").val(res[13]);
                            $("#dis_cart_amt").val(parseFloat(res[14]));
                            var party_id = $('#qu_sup_id').val();
                            var name = $('#qu_party_name').val();
                            var saledate = $('#sale_entry_add_date').val();
                            var type = 2;
                            // alert(party_id);
                            // alert(name)
                            // alert(saledate);
                            if (party_id.trim() != '') {

                                $.ajax({
                                    type: "POST",
                                    url: baseurl + 'Akssale/billcheck',
                                    async: false,
                                    type: "POST",
                                    data: "id=" + party_id + "&saledate=" + saledate + "&type=" +
                                        type,
                                    dataType: "html",
                                    success: function(response) {


                                        if (response == 1) {


                                            $(document).ready(function() {
                                                document.getElementById(
                                                    "pop_up_alert_err").click()
                                                $('#messagebill_err').html(
                                                    'Bill has already been generated for customer <b>' +
                                                    name + '</b> on <b>' +
                                                    saledate +
                                                    '</b>. Create another bill? ');
                                            });

                                        } else {
                                            // alert('nooo')

                                        }

                                    }
                                });
                            }
                            // cart_prd_totcal()
                        } else {

                            $("#party_name_view").html('XXXXXXXXXXXXXXX');
                            $("#party_address").html('No, street, city');
                            $("#party_mobile").html('9999999999');
                            $('#party_email').html('XXXXXXXX');
                            $("#party_shipment_address").html('No, street, city');

                            $("#sale_party").val('');
                            $("#party_id_hidden").val('');

                            $("#table_row").empty().append('');

                            $("#qu_party_type").val('');
                            $("#qu_party_name").val('');
                            $("#qu_party_lname").val('');
                            $("#qu_party_address").val('');
                            $("#qu_party_address2").val('');
                            $("#qu_party_city").val('');
                            $("#qu_party_state").val('');
                            $("#qu_sup_id").val('');
                            $("#qu_party_phone").val('');
                            $("#qu_email").val('');
                            $("#qu_gst").val('');

                            $("#dis_cart_amt").val(0);
                            $("#lbl_tot_pay").html(0);
                            $("#label_balance_amount").html(0);
                            $("#lbl_net_pay").html(0);

                        }
                    }
                    // cart_prd_totcal()
                }
            });
            $.ajax({
                type: "POST",
                url: baseurl + 'Akssale/add_quo_cart_list',
                async: false,
                type: "POST",
                data: "id=" + val,
                dataType: "html",
                success: function(response) {

                    // console.log(response[1]);

                    var res = response.split('||');
                    if (response) {
                        $("#table_row").empty().append(res[1]);
                        arr = JSON.parse(res[2]);
                        const sum = arr.reduce((amt, ob) => {
                            return amt + ob.amount;
                        }, 0);
                        $('#lbl_tot_pay').html(sum);
                        $('#totalamount').val(sum);
                        $('#lbl_net_pay').html(sum);
                        $('#lbl_net_pay1').html(sum);
                        $('#netamount').val(sum);
                    }
                }
            });
        } else {
            $("#party_name_view").html('XXXXXXXXXXXXXXX');
            $("#party_address").html('No, street, city');
            $("#party_mobile").html('9999999999');
            $('#party_email').html('XXXXXXXX');
            $("#party_shipment_address").html('No, street, city');

            $("#sale_party").val('');
            $("#party_id_hidden").val('');

            $("#table_row").empty().append('');

            $("#qu_party_type").val('');
            $("#qu_party_name").val('');
            $("#qu_party_lname").val('');
            $("#qu_party_address").val('');
            $("#qu_party_address2").val('');
            $("#qu_party_city").val('');
            $("#qu_party_state").val('');
            $("#qu_sup_id").val('');
            $("#qu_party_phone").val('');
            $("#qu_email").val('');
            $("#qu_gst").val('');

            $("#dis_cart_amt").val(0);
            $("#lbl_tot_pay").html(0);
            $("#label_balance_amount").html(0);
            $("#lbl_net_pay").html(0);


        }
        cart_prd_totcal()
    }
    </script>

    <script>
    function add_cart(ind) {

        // alert(ind)

        var baseurl = $("#baseurl").val();



        count = $(".btnDelete").length;

        if (isNaN(count)) count = 0;


        if (count > 0) {

            let element = {
                id: ind
            };



            let chk = arr.some(it => it.id == element.id);

            if (chk) {

                var prd_wgt = parseInt($("#prd_wgt" + ind).val());

                if (isNaN(prd_wgt)) prd_wgt = 0;
                $("#prd_wgt" + ind).val(prd_wgt + 1000);

                var j = 1;

            } else {
                var j = 0;
            }


        } else {
            var j = 0;
        }

        if (j == 0) {
            $.ajax({
                type: "POST",
                url: baseurl + 'Akssale/add_cart_list',
                async: false,
                type: "POST",
                data: "id=" + ind + "&count=" + count,
                dataType: "html",
                success: function(response) {
                    if (count == 0) {
                        $("#table_row").empty().append(response);
                        var rowpos = $('#view_table_scroll tr:last').position();
                        $('#table_row').scrollTop(JSON.parse(rowpos).top);
                    } else {
                        $("#table_row").append(response);

                    }
                }
            });
        }



        price_update(ind);

        //cart_prd_cal(count);

        // alert(count)

    }


    function price_update(ind) {



        var val = parseInt(ind);

        if (isNaN(val)) val = 0;

        if (val > 0) {

            var prd_wgt = parseFloat($('#prd_wgt' + ind).val());
            var prd_unit = parseFloat($('#prd_unit' + ind).val());
            var prd_prc = parseFloat($('#lb_prd_price' + ind).html());

            if (isNaN(prd_wgt)) prd_wgt = 0;
            if (isNaN(prd_unit)) prd_unit = 0;
            if (isNaN(prd_prc)) prd_prc = 0;

            var total = parseFloat((prd_wgt / prd_unit) * prd_prc);



            $('#lbl_price_tot' + ind).html(parseFloat(total).toFixed(2));


            let element = {
                id: ind
            };



            let chk = arr.some(it => it.id == element.id);

            if (chk) {

                arr.forEach((element, index) => {
                    if (element.id == ind) {
                        arr[index]['amount'] = total;
                    }
                });

            } else {
                arr.push({
                    id: ind,
                    amount: total
                });
            }

            const sum = arr.reduce((amt, ob) => {
                return amt + ob.amount;
            }, 0);


            $('#lbl_tot_pay').html(sum);
            $('#totalamount').val(sum);
            $('#lbl_net_pay').html(sum);
            $('#lbl_net_pay1').html(sum);
            $('#netamount').val(sum);

        }
        // cart_prd_totcal()
        total_after_shipment();
    }


    $("#table_row").on('click', '.btnDelete', function() {

        $(this).closest('tr').remove();

        let id = $(this).attr("name");

        var data = $.grep(arr, function(e) {

            return e.id != id;
        });

        arr = data;

        const sum = arr.reduce((amt, ob) => {
            return amt + ob.amount;
        }, 0);


        $('#lbl_tot_pay').html(sum);
        $('#totalamount').val(sum);
        $('#lbl_net_pay').html(sum);
        $('#lbl_net_pay1').html(sum);
        $('#netamount').val(sum);

    });
    </script>
    <script>
    function pay_to_purchase_calc() {
        var cash = parseFloat($('#cash_amount').val());
        var cheque = parseFloat($('#cheque_amount').val());
        var upi = parseFloat($('#upi_amount').val());
        var rc_tot = parseFloat($('#lbl_net_pay').html());
        if (isNaN(cash)) cash = 0;
        if (isNaN(cheque)) cheque = 0;
        if (isNaN(upi)) upi = 0;
        if (isNaN(rc_tot)) rc_tot = 0;
        var tot = cash + cheque + upi;
        // alert(tot);
        $('#lbl_paid_amt').html(tot);
        $('#label_paid_amount').html(tot);

        $('#paid_amount').val(tot);

        var diff = rc_tot - parseFloat(tot);
        $('#lbl_bal_amt').html(diff);
        $('#label_balance_amount').html(diff);

        $('#balance_amount').val(diff);

        if (diff < 0) {

            // alert("Please Check The Enter Amount is Exceed");

            Swal.fire({
                title: 'Amount Mismatch!',
                text: 'Please Check The Enter Amount is Exceed..',
                icon: 'error',
                confirmButtonText: 'Okay'
            });

            $('#cash_amount').val('0');
            $('#cheque_amount').val('0');
            $('#upi_amount').val('0');
            $('#lbl_bal_amt').html('0');
            $('#label_balance_amount').html('0');
            $('#label_paid_amount').html('0');
            $('#balance_amount').val('0');
            $('#lbl_paid_amt').html('0');
            $('#label_paid_amount').html('0');
            $("#back_btn").hide();
            $("#cilck_message").hide();

            $("#ok_btn").show();
            $('#net_amount').html('0');
            $('#dis_cart_amt').val('0');


        }

        if (diff > 0) {

            // $("#back_btn").hide(); 
            $("#ok_btn").show();
        }
        // alert(diff);
    }
    </script>
    <script>
    // cart_prd_totcal()

    function cart_prd_totcal() {

        var tot_cart_amt = parseFloat($('#total_cart_amount').val());
        var dis_cart_amt = parseFloat($('#dis_cart_amt').val());
        var rc_tot = parseFloat($('#lbl_tot_pay').html());
        var net_amt = parseFloat($('#net_amt').html());

        if (isNaN(tot_cart_amt)) tot_cart_amt = 0;
        if (isNaN(dis_cart_amt)) dis_cart_amt = 0;
        if (isNaN(net_amt)) net_amt = 0;
        if (isNaN(rc_tot)) rc_tot = 0;




        var ntot = rc_tot - dis_cart_amt;

        var nettot = rc_tot - dis_cart_amt;


        if (nettot < 0 && dis_cart_amt > 0) {

            var rc_tots = parseFloat($('#lbl_tot_pay').html());
            $('#netamount').val(rc_tots);
            $('#dis_cart_amt').val(0);

            $('#lbl_net_pay').html(rc_tots);
            Swal.fire({
                title: 'Amount Mismatch!',
                text: 'Please Check The Discount Amount is Exceed..',
                icon: 'error',
                confirmButtonText: 'Okay'
            });




        } else {

            $('#lbl_net_pay').html(nettot);
            $('#lbl_net_pay1').html(nettot);
            $('#netamount').val(nettot);
            $('#label_balance_amount').html(0);

        }

        // $('#lbl_net_pay').html(nettot);
        // $('#lbl_net_pay1').html(nettot);
        // $('#netamount').val(nettot);

        pay_to_purchase_calc();

    }
    </script>


    <script>
    function sales_type_func()

    {

        // alert('s');
        var aks_sales_type = document.getElementById("aks_sales_type").value;
        var aks_par_label = document.getElementById("party_lab");
        var aks_par_tbox = document.getElementById("aks_par_tbox");
        var aks_quo_label = document.getElementById("aks_quo_label");
        var aks_quo_tbox = document.getElementById("aks_quo_tbox");

        if (aks_sales_type == "Sales") {

            $('#party_id_hidden').val('');
            $("#sale_party").val('');

            aks_quo_label.style.display = "none";
            aks_quo_tbox.style.display = "none";
            // aks_par_label.style.display = "block";
            // aks_par_tbox.style.display = "block";

            $("#party_name_view").html('XXXXXXXXXXXXXXX');
            $("#party_address").html('No, street, city');
            $("#party_mobile").html('9999999999');
            $('#party_email').html('XXXXXXXX');
            $("#party_shipment_address").html('No, street, city');
            $("#sale_party").val('');
            $("#party_id_hidden").val('');

            $("#table_row").empty().append('');

            $("#qu_party_type").val('');
            $("#qu_party_name").val('');
            $("#qu_party_lname").val('');
            $("#qu_party_address").val('');
            $("#qu_party_address2").val('');
            $("#qu_party_city").val('');
            $("#qu_party_state").val('');
            $("#qu_sup_id").val('');
            $("#qu_party_phone").val('');
            $("#qu_email").val('');
            $("#qu_gst").val('');

            $("#dis_cart_amt").val(0);
            $("#lbl_tot_pay").html(0);
            $("#label_balance_amount").html(0);
            $("#lbl_net_pay").html(0);

        } else {
            // alert('Qu')
            $('#party_id_hidden').val('');
            $("#sale_party").val('');
            aks_quo_label.style.display = "block";
            aks_quo_tbox.style.display = "block";
            // aks_par_label.style.display = "none";
            // aks_par_tbox.style.display = "none";
            $('#quo_id_name').val('');

        }
        // get_quotation();
    }
    </script>



    <script>
    function category_selected() {
        var val = $("#category_select").val();
        var baseurl = $("#baseurl").val();
        // alert(val);
        $.ajax({
            type: "POST",
            url: baseurl + 'Akssale/category_select',
            async: false,
            type: "POST",
            data: "id=" + val,
            dataType: "html",
            success: function(response) {
                $("#menuchange").empty().append(response);

            }
        });

    }
    </script>




</body>
<!--end::Body-->

</html>