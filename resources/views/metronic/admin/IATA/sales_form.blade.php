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
                    <div class="col-xs-2 invoice-logo-space">
                        <img src="../../template/metronic/assets/admin/layout4/img/iata-logo.png" class="img-responsive" alt="company logo" style="height:90px; padding-left: 20%;"/>
                    </div>
                    <div class="col-xs-10 invoice-logo-space">
                        <p style="margin: 10px 0 0; font-size: 20px; font-weight: 500; text-align: left; padding-top: 5px;">
                            Agency Sales Transmital Form<br />
                            BSP Bangladesh
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <table id="main_table" style="width: 50%; border: 1px solid grey">
                        <tr>
                            <td style="padding-bottom: 7px; vertical-align: top; border-right: 1px solid grey; border-bottom: 1px solid grey">
                                Agent Name
                            </td>
                            <td style="padding-bottom: 7px; padding-left: 15px; border-bottom: 1px solid grey">
                                Grasp International Limited
                            </td>
                        </tr>
                        <tr>
                            <td style="padding-bottom: 7px; border-right: 1px solid grey; border-bottom: 1px solid grey">
                                Agent Code
                            </td>
                            <td style="padding-bottom: 7px; padding-left: 15px; border-bottom: 1px solid grey">
                                42310262
                            </td>
                        </tr>
                        <tr>
                            <td style="padding-bottom: 7px; border-right: 1px solid grey; border-bottom: 1px solid grey">
                                Reporting Period
                            </td>
                            <td style="padding-bottom: 7px; padding-left: 15px; border-bottom: 1px solid grey">
                                &nbsp;
                            </td>
                        </tr>
                        <tr>
                            <td style="padding-bottom: 7px; border-right: 1px solid grey; border-bottom: 1px solid grey">
                                Date of issue
                            </td>
                            <td style="padding-bottom: 7px; padding-left: 15px; border-bottom: 1px solid grey">
                                &nbsp;
                            </td>
                        </tr>
                    </table>

                    <table id="main_table" border='0' style="width: 100%; margin-top: 15px;">
                        <tr>
                            <th colspan='23' style="border: 1px solid grey;">
                                <span style="font-weight: 800">Airline Name</span>
                            </th>
                        </tr>
                        <tr>
                            <th style="width: 15%; text-align: left; border-bottom: 1px solid grey; border-right: 1px solid grey; border-left: 1px solid grey">Document</th>
                            <th style="width: 4%; border-bottom: 1px solid grey; border-right: 1px solid grey">AI</th>
                            <th style="border-bottom: 1px solid grey; border-right: 1px solid grey">BG</th>
                            <th style="border-bottom: 1px solid grey; border-right: 1px solid grey">CX</th>
                            <th style="border-bottom: 1px solid grey; border-right: 1px solid grey">CZ</th>
                            <th style="border-bottom: 1px solid grey; border-right: 1px solid grey">EK</th>
                            <th style="border-bottom: 1px solid grey; border-right: 1px solid grey">EY</th>
                            <th style="border-bottom: 1px solid grey; border-right: 1px solid grey">PG</th>
                            <th style="border-bottom: 1px solid grey; border-right: 1px solid grey">MH</th>
                            <th style="border-bottom: 1px solid grey; border-right: 1px solid grey">KU</th>
                            <th style="border-bottom: 1px solid grey; border-right: 1px solid grey">PK</th>
                            <th style="border-bottom: 1px solid grey; border-right: 1px solid grey">QR</th>
                            <th style="border-bottom: 1px solid grey; border-right: 1px solid grey">RX</th>
                            <th style="border-bottom: 1px solid grey; border-right: 1px solid grey">YO</th>
                            <th style="border-bottom: 1px solid grey; border-right: 1px solid grey">HX</th>
                            <th style="border-bottom: 1px solid grey; border-right: 1px solid grey">MU</th>
                            <th style="border-bottom: 1px solid grey; border-right: 1px solid grey">AF</th>
                            <th style="border-bottom: 1px solid grey; border-right: 1px solid grey">MK</th>
                            <th style="border-bottom: 1px solid grey; border-right: 1px solid grey">MJ</th>
                            <th style="border-bottom: 1px solid grey; border-right: 1px solid grey">SQ</th>
                            <th style="border-bottom: 1px solid grey; border-right: 1px solid grey">SV</th>
                            <th style="border-bottom: 1px solid grey; border-right: 1px solid grey">UL</th>
                            <th style="border-bottom: 1px solid grey; border-right: 1px solid grey">WY</th>
                        </tr>
                        <tr>
                            <th colspan='23'>
                                <span style="font-weight: 800">&nbsp;</span>
                            </th>
                        </tr>
                        <tr>
                            <th style="text-align: left; border-top: 1px solid grey; border-bottom: 1px solid grey; border-right: 1px solid grey; border-left: 1px solid grey"><b>Refund<br />Notice/Application</b></th>
                            <th style="border-top: 1px solid grey; border-bottom: 1px solid grey; border-right: 1px solid grey;">&nbsp;</th>
                            <th style="border-top: 1px solid grey; border-bottom: 1px solid grey; border-right: 1px solid grey;">&nbsp;</th>
                            <th style="border-top: 1px solid grey; border-bottom: 1px solid grey; border-right: 1px solid grey;">&nbsp;</th>
                            <th style="border-top: 1px solid grey; border-bottom: 1px solid grey; border-right: 1px solid grey;">&nbsp;</th>
                            <th style="border-top: 1px solid grey; border-bottom: 1px solid grey; border-right: 1px solid grey;">&nbsp;</th>
                            <th style="border-top: 1px solid grey; border-bottom: 1px solid grey; border-right: 1px solid grey;">&nbsp;</th>
                            <th style="border-top: 1px solid grey; border-bottom: 1px solid grey; border-right: 1px solid grey;">&nbsp;</th>
                            <th style="border-top: 1px solid grey; border-bottom: 1px solid grey; border-right: 1px solid grey;">&nbsp;</th>
                            <th style="border-top: 1px solid grey; border-bottom: 1px solid grey; border-right: 1px solid grey;">&nbsp;</th>
                            <th style="border-top: 1px solid grey; border-bottom: 1px solid grey; border-right: 1px solid grey;">&nbsp;</th>
                            <th style="border-top: 1px solid grey; border-bottom: 1px solid grey; border-right: 1px solid grey;">&nbsp;</th>
                            <th style="border-top: 1px solid grey; border-bottom: 1px solid grey; border-right: 1px solid grey;">&nbsp;</th>
                            <th style="border-top: 1px solid grey; border-bottom: 1px solid grey; border-right: 1px solid grey;">&nbsp;</th>
                            <th style="border-top: 1px solid grey; border-bottom: 1px solid grey; border-right: 1px solid grey;">&nbsp;</th>
                            <th style="border-top: 1px solid grey; border-bottom: 1px solid grey; border-right: 1px solid grey;">&nbsp;</th>
                            <th style="border-top: 1px solid grey; border-bottom: 1px solid grey; border-right: 1px solid grey;">&nbsp;</th>
                            <th style="border-top: 1px solid grey; border-bottom: 1px solid grey; border-right: 1px solid grey;">&nbsp;</th>
                            <th style="border-top: 1px solid grey; border-bottom: 1px solid grey; border-right: 1px solid grey;">&nbsp;</th>
                            <th style="border-top: 1px solid grey; border-bottom: 1px solid grey; border-right: 1px solid grey;">&nbsp;</th>
                            <th style="border-top: 1px solid grey; border-bottom: 1px solid grey; border-right: 1px solid grey;">&nbsp;</th>
                            <th style="border-top: 1px solid grey; border-bottom: 1px solid grey; border-right: 1px solid grey;">&nbsp;</th>
                            <th style="border-top: 1px solid grey; border-bottom: 1px solid grey; border-right: 1px solid grey;">&nbsp;</th>
                        </tr>
                        <tr>
                            <th colspan='23'>
                                <span style="font-weight: 800">&nbsp;</span>
                            </th>
                        </tr>
                        <tr>
                            <th style="text-align: left; border-top: 1px solid grey; border-bottom: 1px solid grey; border-right: 1px solid grey; border-left: 1px solid grey"><b>Sales, P-Form &<br />Documents</b></th>
                            <th style="border-top: 1px solid grey; border-bottom: 1px solid grey; border-right: 1px solid grey;">&nbsp;</th>
                            <th style="border-top: 1px solid grey; border-bottom: 1px solid grey; border-right: 1px solid grey;">&nbsp;</th>
                            <th style="border-top: 1px solid grey; border-bottom: 1px solid grey; border-right: 1px solid grey;">&nbsp;</th>
                            <th style="border-top: 1px solid grey; border-bottom: 1px solid grey; border-right: 1px solid grey;">&nbsp;</th>
                            <th style="border-top: 1px solid grey; border-bottom: 1px solid grey; border-right: 1px solid grey;">&nbsp;</th>
                            <th style="border-top: 1px solid grey; border-bottom: 1px solid grey; border-right: 1px solid grey;">&nbsp;</th>
                            <th style="border-top: 1px solid grey; border-bottom: 1px solid grey; border-right: 1px solid grey;">&nbsp;</th>
                            <th style="border-top: 1px solid grey; border-bottom: 1px solid grey; border-right: 1px solid grey;">&nbsp;</th>
                            <th style="border-top: 1px solid grey; border-bottom: 1px solid grey; border-right: 1px solid grey;">&nbsp;</th>
                            <th style="border-top: 1px solid grey; border-bottom: 1px solid grey; border-right: 1px solid grey;">&nbsp;</th>
                            <th style="border-top: 1px solid grey; border-bottom: 1px solid grey; border-right: 1px solid grey;">&nbsp;</th>
                            <th style="border-top: 1px solid grey; border-bottom: 1px solid grey; border-right: 1px solid grey;">&nbsp;</th>
                            <th style="border-top: 1px solid grey; border-bottom: 1px solid grey; border-right: 1px solid grey;">&nbsp;</th>
                            <th style="border-top: 1px solid grey; border-bottom: 1px solid grey; border-right: 1px solid grey;">&nbsp;</th>
                            <th style="border-top: 1px solid grey; border-bottom: 1px solid grey; border-right: 1px solid grey;">&nbsp;</th>
                            <th style="border-top: 1px solid grey; border-bottom: 1px solid grey; border-right: 1px solid grey;">&nbsp;</th>
                            <th style="border-top: 1px solid grey; border-bottom: 1px solid grey; border-right: 1px solid grey;">&nbsp;</th>
                            <th style="border-top: 1px solid grey; border-bottom: 1px solid grey; border-right: 1px solid grey;">&nbsp;</th>
                            <th style="border-top: 1px solid grey; border-bottom: 1px solid grey; border-right: 1px solid grey;">&nbsp;</th>
                            <th style="border-top: 1px solid grey; border-bottom: 1px solid grey; border-right: 1px solid grey;">&nbsp;</th>
                            <th style="border-top: 1px solid grey; border-bottom: 1px solid grey; border-right: 1px solid grey;">&nbsp;</th>
                            <th style="border-top: 1px solid grey; border-bottom: 1px solid grey; border-right: 1px solid grey;">&nbsp;</th>
                        </tr>
                        <tr>
                            <th colspan='23'>
                                <span style="font-weight: 800">&nbsp;</span>
                            </th>
                        </tr>
                        <tr>
                            <th style="text-align: left; border-top: 1px solid grey; border-bottom: 1px solid grey; border-right: 1px solid grey; border-left: 1px solid grey"><b>Re-issue</b><br/></th>
                            <th style="border-top: 1px solid grey; border-bottom: 1px solid grey; border-right: 1px solid grey;">&nbsp;</th>
                            <th style="border-top: 1px solid grey; border-bottom: 1px solid grey; border-right: 1px solid grey;">&nbsp;</th>
                            <th style="border-top: 1px solid grey; border-bottom: 1px solid grey; border-right: 1px solid grey;">&nbsp;</th>
                            <th style="border-top: 1px solid grey; border-bottom: 1px solid grey; border-right: 1px solid grey;">&nbsp;</th>
                            <th style="border-top: 1px solid grey; border-bottom: 1px solid grey; border-right: 1px solid grey;">&nbsp;</th>
                            <th style="border-top: 1px solid grey; border-bottom: 1px solid grey; border-right: 1px solid grey;">&nbsp;</th>
                            <th style="border-top: 1px solid grey; border-bottom: 1px solid grey; border-right: 1px solid grey;">&nbsp;</th>
                            <th style="border-top: 1px solid grey; border-bottom: 1px solid grey; border-right: 1px solid grey;">&nbsp;</th>
                            <th style="border-top: 1px solid grey; border-bottom: 1px solid grey; border-right: 1px solid grey;">&nbsp;</th>
                            <th style="border-top: 1px solid grey; border-bottom: 1px solid grey; border-right: 1px solid grey;">&nbsp;</th>
                            <th style="border-top: 1px solid grey; border-bottom: 1px solid grey; border-right: 1px solid grey;">&nbsp;</th>
                            <th style="border-top: 1px solid grey; border-bottom: 1px solid grey; border-right: 1px solid grey;">&nbsp;</th>
                            <th style="border-top: 1px solid grey; border-bottom: 1px solid grey; border-right: 1px solid grey;">&nbsp;</th>
                            <th style="border-top: 1px solid grey; border-bottom: 1px solid grey; border-right: 1px solid grey;">&nbsp;</th>
                            <th style="border-top: 1px solid grey; border-bottom: 1px solid grey; border-right: 1px solid grey;">&nbsp;</th>
                            <th style="border-top: 1px solid grey; border-bottom: 1px solid grey; border-right: 1px solid grey;">&nbsp;</th>
                            <th style="border-top: 1px solid grey; border-bottom: 1px solid grey; border-right: 1px solid grey;">&nbsp;</th>
                            <th style="border-top: 1px solid grey; border-bottom: 1px solid grey; border-right: 1px solid grey;">&nbsp;</th>
                            <th style="border-top: 1px solid grey; border-bottom: 1px solid grey; border-right: 1px solid grey;">&nbsp;</th>
                            <th style="border-top: 1px solid grey; border-bottom: 1px solid grey; border-right: 1px solid grey;">&nbsp;</th>
                            <th style="border-top: 1px solid grey; border-bottom: 1px solid grey; border-right: 1px solid grey;">&nbsp;</th>
                            <th style="border-top: 1px solid grey; border-bottom: 1px solid grey; border-right: 1px solid grey;">&nbsp;</th>
                        </tr>
                        <tr>
                            <th colspan='23'>
                                <span style="font-weight: 800">&nbsp;</span>
                            </th>
                        </tr>
                        <tr>
                            <th colspan='23'>
                                <span style="font-weight: 800">&nbsp;</span>
                            </th>
                        </tr>

                    </table>

                    <table id="main_table" border='0' style="width: 100%; margin-top: 15px;">

                        <tr>
                            <td colspan='3' style="border: 1px solid grey; padding-bottom: 5%">
                                <span>Submitted By :</span>
                            </td>
                            <td colspan='2' style="padding-bottom: 5%;">&nbsp;</td>
                            <td colspan='3' style="border: 1px solid grey; padding-bottom: 5%">
                                <span>Signature :</span>
                            </td>
                            <td colspan='8' style="padding-bottom: 5%">&nbsp;</td>
                            <td colspan='7' style="border: 1px solid grey; padding-bottom: 5%">
                                <span>Telephone :</span><br />
                                <span>Mobile :</span>
                            </td>
                        </tr>
                    </table>
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
