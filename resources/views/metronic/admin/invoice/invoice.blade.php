@extends('layouts.admin')
@section('extra_css')

<style type="text/css" media="print">
@page {
    size: auto;   /* auto is the initial value */
    margin: 25px;  /* this affects the margin in the printer settings */
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
                    <div class="col-xs-6 invoice-logo-space">
                        <img src="../../../template/metronic/assets/admin/layout4/img/logo-ams.png" class="img-responsive" alt="company logo" style="height:100px"/>
                        <p style="margin: 10px 0 0; font-size: 15px; font-weight: bold;">
                            Fly Hopper (Pvt) Ltd
                        </p>
                        <p style="margin: 0">
                            Phone: +88-09613-360-360
                        </p>
                        <p style="margin: 0">
                            Email: care@flyhopper.com
                        </p>
                        <p>
                            Whats App:
                        </p>
                        <p>
                            SMS:
                        </p>
                    </div>

                    <div class="col-xs-4 col-xs-offset-2 from right">
                        <table id="invoice" style="width:90%">
                            <tr class="different">
                                <td colspan="3" style="text-align: center;" class="different">
                                    INVOICE
                                </td>
                            </tr>
                            <tr>
                                <td>No</td>
                                <td>:</td>
                                <td style="text-align: right">{{ $item->invoice_number }}</td>
                            </tr>
                            <tr>
                                <td>Date</td>
                                <td>:</td>
                                <td style="text-align: right">{{ date('d-m-Y',strtotime($item->invoice_date)) }}</td>
                            </tr>
                            <tr>
                                <td>Customer ID</td>
                                <td>:</td>
                                <td style="text-align: right">{{ date('d-m-Y',strtotime($item->invoice_date)) }}</td>
                            </tr>
                            <tr>
                                <td>PNR</td>
                                <td>:</td>
                                <td style="text-align: right">{{ $item->booking_reference }}</td>
                            </tr>
                            <tr>
                                <td>Ticket Number</td>
                                <td>:</td>
                                <td style="text-align: right">{{ $item->booking_reference }}</td>
                            </tr>
                            {{-- <tr>
                                <td>Issue Date</td>
                                <td>:</td>
                                <td style="text-align: right">{{ date('d-m-Y',strtotime($item->bookin_date)) }}</td>
                            </tr> --}}

                        </table>
                    </div>
                </div>
            </div>

            <hr/>
            <hr  style="border: 1px solid gray; margin-bottom: 7px">
            <hr  style="border: 1px solid gray; margin: 0"><hr/>
            <div class="row">
                <div class="col-xs-8">
                    <h4>To:</h4>
                    <ul class="list-unstyled">
                        <li>
                            <strong style="font-weight: bold ">Company Name: </strong> Hal Travel Services Ltd  {{-- {{$item->customer->company_name}} --}}
                        </li>
                        <li>
                            <strong style="font-weight: bold ">Contact: </strong> Masud  {{-- {{$item->customer->given_name}} --}}
                        </li>
                    </ul>
                </div>

                <div class="col-xs-4 invoice-payment">
                    <h4>Invoice For:</h4>
                    <ul class="list-unstyled">
                        <li>
                            <p style="text-transform: uppercase;">{{ $item->customer->given_name }}</p>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <table id="main_table" class="table table-striped table-hover" border='1'>
                    <thead>
                    <tr class="different" style="border-bottom: 1px solid black">
                        <th style="border-bottom: 1px solid black">
                             Service
                        </th>
                        <th class="hidden-480" style="border-bottom: 1px solid black">
                            Ticket No.
                        </th>
                        <th class="hidden-480" style="border-bottom: 1px solid black">
                             Pax Type
                        </th>
                        <th class="hidden-480" style="border-bottom: 1px solid black">
                             Base Fare
                        </th>
                        <th style="border-bottom: 1px solid black">
                             Taxes
                        </th>
                        <th style="border-bottom: 1px solid black">
                            Total
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>
                            {{$item->passenger->given_name}}
                        </td>
                        <td>
                             {{$item->ticket_number}}
                        </td>
                        <td class="hidden-480">
                            {{$item->sector->name}}
                        </td>
                        <td class="hidden-480" style="text-align: center">
                            {{$item->base_fare}}
                        </td>
                        <td class="hidden-480" style="text-align: center">
                            {{$item->tax}}
                        </td>
                        <td style="text-align: center">
                            {{$item->base_fare + $item->tax }}
                        </td>
                    </tr>

                    </tbody>
                    </table>
                </div>
            </div>
            <hr  style="border: 1px solid gray">
            <div class="row">
                <div class="col-xs-8">
                    {{-- <div class="well"> --}}
                        <p style="padding-left: 5%"><strong style="text-transform: uppercase; font-weight: bold ">In Words:  {{ /*convertNumberToWord*/($item->payable_amount)/* $item->payable_amount*/ }} Taka</strong ></p>
                        {{-- <p><strong style="font-weight: bold ">Note: </strong><br />
                            All payment should be made in favor of "Grasp Travel Services Ltd."<br />
                            This Invoice will not be recognized as paid unless supported by Company Official Receipt.<br />
                            3% Bank Change will be add on total bill amount, if the bill Paid/settled by Debit/Credit Card
                        </p> --}}
                    {{-- </div> --}}
                </div>
                @if($item->vat!=0||$item->ait!=0)
                <div class="col-xs-4">
                    <table id="total" style="width:80%">
                        <tr style="background-color: white">
                            <td>Total Fare</td>
                            <td>:</td>
                            <td style="text-align: right">{{$item->base_fare}}</td>
                        </tr>

                        @if($item->discount_amount!=0 )
                            <tr style="background-color: white">
                                <td>Discount</td>
                                <td>:</td>
                                <td style="text-align: right"> {{$item->discount_amount}}</td>
                            </tr>
                        @endif
                        <tr style="background-color: white">
                            <td>Total Tax</td>
                            <td>:</td>
                            <td style="text-align: right"> {{$item->tax}}</td>
                        </tr>
                        <tr >
                            <td>VAT & AIT</td>
                            <td>:</td>
                            <td style="text-align: right">{{$item->vat + $item->ait}}</td>
                        </tr>
                        <tr class="different" style="background-color: white">
                            <td>Total</td>
                            <td>:</td>
                            <td style="text-align: right">BDT {{$item->payable_amount}}</td>
                        </tr>
                        <input type="hidden" name="invoice_amount" value="{{$item->payable_amount}}">
                    </table>
                </div>
                @endif

                <div class="col-xs-8">
                    <div class="well">
                        {{-- <p><strong style="text-transform: uppercase; font-weight: bold ">In Words:  {{ /*convertNumberToWord*/($item->payable_amount)/* $item->payable_amount*/ }} Taka</strong ></p> --}}
                        <p><strong style="font-weight: bold ">Note: </strong><br />
                            All payment should be made in favor of "<b>Fly Hopper (Pvt) Ltd.</b>"<br />
                            This Invoice will not be recognized as paid unless supported by Company Official Receipt.<br />
                            3% Bank Change will be add on total bill amount, if the bill Paid/settled by Debit/Credit Card.
                        </p>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12 invoice-block text-center">
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
