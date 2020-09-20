@extends('layouts.admin')
@section('extra_css')

<style type="text/css" media="print">
@page {
    size: auto;   /* auto is the initial value */
    margin: 0;  /* this affects the margin in the printer settings */
}
</style>
{{--<link href="../../../template/metronic/assets/admin/pages/css/invoice.css" rel="stylesheet" type="text/css"/>--}}
<style type="text/css">
    div.checker {
        margin-top: 2px;
        margin-left: -2px;
    }

    table, tr, td{
        padding: 5px;
    }

    #invoice td, #invoice th {
      padding: 8px;
    }

    #invoice tr:nth-child(odd){background-color: #f2f2f2;}

    #invoice tr:hover {background-color: #ddd;}

    #invoice th {
      padding-top: 12px;
      padding-bottom: 12px;
      text-align: left;
      background-color: #4CAF50;
      color: white;
    }


    #main_table th {
        text-align: center;
    }

    #invoice, #total {
        border: 1px solid #f2f2f2;
    }

    .page-content, .page-container{
        background-color: white;
    }

    #total td, #total th {
      padding: 8px;
    }

    #total tr:nth-child(odd){background-color: #f2f2f2;}

    #total tr:hover {background-color: #ddd;}

    #total th {
      padding-top: 12px;
      padding-bottom: 12px;
      text-align: left;
      background-color: #4CAF50;
      color: white;
    }

    .different{
        background-color: #cacaca;
    }
</style>
@endsection

@section('content')
{{--    <link href="/assets/global/plugins/bootstrap-datepicker/css/datepicker.css" rel="stylesheet">--}}
{{--    <!-- BEGIN PAGE HEAD -->--}}
{{--    <div class="page-head">--}}
{{--        <!-- BEGIN PAGE TITLE -->--}}
{{--        <div class="page-title">--}}
{{--            <h1>Invoice</h1>--}}
{{--        </div>--}}
{{--        <!-- END PAGE TITLE -->--}}

{{--    <!-- END PAGE HEAD -->--}}
{{--    </div>--}}
{{--    <!-- END PAGE HEAD -->--}}
{{--    <!-- BEGIN PAGE BREADCRUMB -->--}}
{{--    <ul class="page-breadcrumb breadcrumb">--}}
{{--        <li>&nbsp;</li>--}}
{{--    </ul>--}}
    <!-- END PAGE BREADCRUMB -->
    <!-- BEGIN PAGE CONTENT-->
    <!-- BEGIN PAGE CONTENT-->
    <div class="portlet light">
        <div class="portlet-body">
        <div class="invoice" style="border: 1px solid black">
            <div>
                <div class="row invoice-logo">
                    <div class="col-xs-8 invoice-logo-space">
                        &nbsp;
                    </div>
                    <div class="col-xs-4 invoice-logo-space">
                        <img src="../../../template/metronic/assets/admin/layout4/img/scb.jpg" class="img-responsive" alt="company logo" style="height:90px; padding-left: 20%;"/>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <div class="col-xs-5">
                        <table id="main_table" style="width: 100%; border: 1px solid grey">
                            <tr>
                                <td style="padding-bottom: 0px; vertical-align: top; font-weight: 600; font-size: 16px;">
                                    To:
                                </td>
                                <td style="padding-bottom: 0px; padding-left: 15px; font-weight: 600; font-size: 16px;">
                                    Standard Chartered Bank
                                </td>
                            </tr>
                            <tr>
                                <td style="padding-bottom: 0px; padding-top: 0px;">&nbsp;</td>
                                <td style="padding-bottom: 0px; padding-top: 0px; padding-left: 15px;">
                                    Premium Services Banking
                                </td>
                            </tr>
                            <tr>
                                <td style="padding-bottom: 0px; padding-top: 0px;">&nbsp;</td>
                                <td style="padding-bottom: 0px; padding-top: 0px; padding-left: 15px;">
                                    Corporate Operations
                                </td>
                            </tr>
                            <tr>
                                <td style="padding-bottom: 0px; padding-top: 0px;">&nbsp;</td>
                                <td style="padding-bottom: 0px; padding-top: 0px; padding-left: 15px;">
                                    67 Gulshan Avenue, Gulshan
                                </td>
                            </tr>
                            <tr>
                                <td style="padding-top: 0px;">&nbsp;</td>
                                <td style="padding-top: 0px; padding-left: 15px; padding-bottom: 2%;">
                                    Dhaka-1212, Bangladesh
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-xs-2">&nbsp;</div>
                    <div class="col-xs-5">
                        <table id="main_table" style="width: 100%; border: 1px solid grey;">
                            <tr>
                                <td colspan='2' style="padding-bottom: 22%; vertical-align: top; font-weight: 600; font-size: 16px;">
                                    From:
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-xs-12">&nbsp;</div>
                    <div class="col-xs-12" style="text-decoration: 1px underline; font-size: 18px; font-weight: 700; text-align: center">DELIVER FROM CUSTOMER</div>
                    <div class="col-xs-12">&nbsp;</div>
                    <div class="col-xs-12">
                        <table>
                            <tr>
                                <td>Date :</td>
                                <td style="border: 1px solid black">____/____/________</td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-xs-12">&nbsp;</div>
                    <div class="col-xs-12">
                        <table border='1' style="width: 100%">
                            <tr>
                                <th style="width: 30%; padding-left: 5px">Cheque Deposits</th>
                                <th style="width: 30%; text-align: center">Customer Reference</th>
                                <th style="width: 30%; text-align: center">Customer Count</th>
                                <th style="width: 30%; text-align: center">Bank Count</th>
                            </tr>
                            <tr>
                                <td>BDT Cheques</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                            </tr>
                            <tr>
                                <td>NCS Cheques</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                            </tr>
                            <tr>
                                <td>Foreign Cheques</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                            </tr>
                            <tr>
                                <td>Cheque Book Requisition</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-xs-12">&nbsp;</div>
                    <div class="col-xs-12">
                        <table border='1' style="width: 100%">
                            <tr>
                                <th style="width: 30%; padding-left: 5px">Remittances</th>
                                <th style="width: 30%; text-align: center">Customer Reference</th>
                                <th style="width: 30%; text-align: center">Customer Count</th>
                                <th style="width: 30%; text-align: center">Bank Count</th>
                            </tr>
                            <tr>
                                <td>Draft/ Pay Order/ T.T. Applications</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                            </tr>
                            <tr>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-xs-12">&nbsp;</div>
                    <div class="col-xs-12">
                        <table border='1' style="width: 100%">
                            <tr>
                                <th style="width: 30%; padding-left: 5px">Trade Documents</th>
                                <th style="width: 30%; text-align: center">Customer Reference</th>
                                <th style="width: 30%; text-align: center">Customer Count</th>
                                <th style="width: 30%; text-align: center">Bank Count</th>
                            </tr>
                            <tr>
                                <td>L/C Applications</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                            </tr>
                            <tr>
                                <td>L/C Amendment Applications</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                            </tr>
                            <tr>
                                <td>Shipping Guarantee AIR / SEA</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                            </tr>
                            <tr>
                                <td>Export Document - EC/ LBD</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                            </tr>
                            <tr>
                                <td>Application PRC/NOG / Certificate.</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                            </tr>
                            <tr>
                                <td>Guarantee / Amendment Applications</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                            </tr>
                            <tr>
                                <td>Fund Transfer Letter</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                            </tr>
                            <tr>
                                <td>Acceptance Payment Letter</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                            </tr>
                            <tr>
                                <td>Request - Exp/TR / Indemnity / UC. App.</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                            </tr>
                            <tr>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                            </tr>
                            <tr>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-xs-12">&nbsp;</div>
                    <div class="col-xs-12">
                        <table border='1' style="width: 100%">
                            <tr>
                                <th style="width: 30%; padding-left: 5px">Others (please Specify)</th>
                                <th style="width: 30%; text-align: center">Customer Reference</th>
                                <th style="width: 30%; text-align: center">Customer Count</th>
                                <th style="width: 30%; text-align: center">Bank Count</th>
                            </tr>
                            <tr>
                                <td>Deliver-from-Bank</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                            </tr>
                            <tr>
                                <td>Close Cover Envelop</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                            </tr>
                            <tr>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                            </tr>
                            <tr>
                                <td style="text-align: right">Total Item Count</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-xs-12">&nbsp;</div>
                    <div class="col-xs-12">
                        <table border='1' style="width: 100%">
                            <tr>
                                <th style="width: 30%; padding-left: 5px"><b>Customer Signature</b><br />(To confirm count detailed above)</th>
                                <th style="width: 30%; padding-left: 5px"><b>CSR Signature</b><br />(To confirm count detailed above)</th>
                            </tr>
                        </table>
                    </div>
                    <div class="col-xs-8" style="text-align: right">&nbsp;</div>
                    <div class="col-xs-4" style="font-size: 11px; padding-left: 3%; padding-right: 0px; padding-top: 5px; font-weight: 600">
                        White: CUSTOMER COPY/BANK AWCKNOWLEDGEMENT<br />
                        BLUE : BANK COPY<br />
                        Green: CUSTOMER COPY/BANK AWCKNOWLEDGEMENT
                    </div>
                </div>

            <div class="row">
                <div class="col-xs-12 invoice-block text-center" style="padding-top: 40px">
                    <a class="btn btn-lg blue hidden-print margin-bottom-5" onclick="javascript:window.print();">
                        Print <i class="fa fa-print"></i>
                    </a>
                </div>
            </div>
        </div>
        </div>
    </div>
    <!-- END PAGE CONTENT-->

@endsection
@section('scripts')
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script type="text/javascript">
    $('.datepicker').datepicker({
        dateFormat: 'dd-mm-yy',
        autoclose: true
    });
</script>
@endsection
