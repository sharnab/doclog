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
        <div class="invoice" >
            <div>
                <div class="row invoice-logo">
                    <div class="col-xs-8 invoice-logo-space">
                        <p style="margin: 10px 0 0; font-size: 30px; font-weight: bold; text-align: left">
                            Customer Consignment Note
                        </p>
                    </div>
                    <div class="col-xs-4 invoice-logo-space">
                        <img src="../../../template/metronic/assets/admin/layout4/img/scb.jpg" class="img-responsive" alt="company logo" style="height:80px; padding-left: 20%"/>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <table id="main_table" style="width: 100%; border: 1px solid grey">
                        <tr>
                            <td style="padding-bottom: 7px; vertical-align: top; border-bottom: 1px solid black; ">
                                Customer Name
                            </td>
                            <td style="padding-bottom: 7px; padding-left: 15px; border-bottom: 1px solid black; ">
                                <b>Grasp International Limited</b>
                            </td>
                        </tr>
                        <tr>
                            <td style="padding-bottom: 7px; border-bottom: 1px solid black; ">
                                Contact Name
                            </td>
                            <td style="padding-bottom: 7px; padding-left: 15px; border-bottom: 1px solid black; ">
                                &nbsp;
                            </td>
                        </tr>
                        <tr>
                            <td style="padding-bottom: 7px; border-bottom: 1px solid black; ">
                                Total Bags
                            </td>
                            <td style="padding-bottom: 7px; padding-left: 15px; border-bottom: 1px solid black; ">
                                Seal Number/s
                            </td>
                        </tr>
                        <tr rowspan="2">
                            <td style="padding-bottom: 7px; border-bottom: 1px solid black; ">
                                Customer Signature
                            </td>
                            <td style="padding-bottom: 7px; border-bottom: 1px solid black; ; padding-left: 15px; padding-bottom: 30px; border: 1px solid black">
                                Courier Receipt
                            </td>
                        </tr>
                        <tr rowspan="2">
                            <td style="padding-bottom: 7px">
                                &nbsp;
                            </td>
                            <td style="padding-bottom: 7px; padding: 0; border: 1px solid black">
                                <table style="width: 100%;">
                                    <tr>
                                        <td style="padding-left: 15px; padding-top: 3%">
                                            Date
                                        </td>
                                        <td style="border-left: 1px solid black; padding-left: 15px; padding-top: 3%">
                                            Time
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>

                    <table id="main_table" style="width: 100%; margin-top: 15px; border: 1px solid grey;">
                        <tr>
                            <td>
                                <span style="font-weight: 800">FOR BANK USE ONLY</span>
                            </td>
                            <td style="padding-left: 15px; padding-top: 0px; padding-right: 0px">
                                <table style="width: 100%;">
                                    <tr>
                                        <td style="border: 1px solid grey; border-top: 0px; padding-left: 15px; padding-bottom: 10%">
                                            Date
                                        </td>
                                        <td style="border: 1px solid grey; border-top: 0px; border-right: 0px; padding-left: 15px; padding-bottom: 10%">
                                            Time
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td style="padding-bottom: 7px">
                                &nbsp;
                            </td>
                            <td style="padding-bottom: 7px; padding-left: 15px; padding-top: 0px;">
                                Remarks
                            </td>
                        </tr>
                        <tr>
                            <td style="padding-bottom: 7px; padding-top: 40px;">
                                CRS SIGNATURE<br />
                                Standard Chartered Bank, Bangladesh
                            </td>
                            <td style="padding-bottom: 7px; padding-left: 15px; padding-top: 40px;">
                                &nbsp;
                            </td>
                        </tr>
                    </table>
                    <div class="col-xs-8" style="text-align: right">&nbsp;</div>
                    <div class="col-xs-4" style="font-size: 9px; padding-left: 9%; padding-right: 0px; padding-top: 5px;">
                        White: COURIER COPY<br />
                        Green: CUSTOMER COPY/BANK AWCKNOWLEDGEMENT<br />
                        BLUE : CUSTOMER COPY/CUSTOMER TO RETAIN
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
